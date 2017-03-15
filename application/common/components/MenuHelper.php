<?php

namespace backend\components;

use Yii;
use yii\caching\TagDependency;
use backend\models\Menu;
use yii\helpers\ArrayHelper;
use backend\components\Configs;

/**
 * MenuHelper used to generate menu depend of user role.
 * Usage
 * 
 * ~~~
 * use backend\components\MenuHelper;
 * use yii\bootstrap\Nav;
 *
 * echo Nav::widget([
 *    'items' => MenuHelper::getAssignedMenu(Yii::$app->user->id)
 * ]);
 * ~~~
 * 
 * To reformat returned, provide callback to method.
 * 
 * ~~~
 * $callback = function ($menu) {
 *    $data = eval($menu['data']);
 *    return [
 *        'label' => $menu['name'],
 *        'url' => [$menu['route']],
 *        'options' => $data,
 *        'items' => $menu['children']
 *        ]
 *    ]
 * }
 *
 * $items = MenuHelper::getAssignedMenu(Yii::$app->user->id, null, $callback);
 * ~~~
 */
class MenuHelper
{
    /**
     * Use to get assigned menu of user.
     * @param mixed $userId
     * @param integer $root
     * @param \Closure $callback use to reformat output.
     * callback should have format like
     * 
     * ~~~
     * function ($menu) {
     *    return [
     *        'label' => $menu['name'],
     *        'url' => [$menu['route']],
     *        'options' => $data,
     *        'items' => $menu['children']
     *        ]
     *    ]
     * }
     * ~~~
     * @param boolean  $refresh
     * @return array
     */
    public static function getAssignedMenu($userId, $root = null, $callback = null, $refresh = false)
    {
        $config = Configs::instance();

        /* @var $manager \yii\rbac\BaseManager */
        $manager = Yii::$app->getAuthManager();
        $menus = Menu::find()->where(['type'=>'1'])->asArray()->indexBy('id')->all();
        $key = [__METHOD__, $userId, $manager->defaultRoles];
        $cache = $config->cache;

        if ($refresh || $cache === null || ($assigned = $cache->get($key)) === false) {
            $routes = $filter1 = $filter2 = [];
            if ($userId !== null) {
                foreach ($manager->getPermissionsByUser($userId) as $name => $value) {
                    if ($name[0] === '/') {
                        if (substr($name, -2) === '/*') {
                            $name = substr($name, 0, -1);
                        }
                        $routes[] = $name;
                    }
                }
            }
            foreach ($manager->defaultRoles as $role) {
                foreach ($manager->getPermissionsByRole($role) as $name => $value) {
                    if ($name[0] === '/') {
                        if (substr($name, -2) === '/*') {
                            $name = substr($name, 0, -1);
                        }
                        $routes[] = $name;
                    }
                }
            }
            $routes = array_unique($routes);
            sort($routes);
            $prefix = '\\';
            foreach ($routes as $route) {
                if (strpos($route, $prefix) !== 0) {
                    if (substr($route, -1) === '/') {
                        $prefix = $route;
                        $filter1[] = $route . '%';
                    } else {
                        $filter2[] = $route;
                    }
                }
            }
            $assigned = [];
            $query = Menu::find()->where(['type'=>'1'])->select(['id'])->asArray();
            if (count($filter2)) {
                $assigned = $query->where(['route' => $filter2])->column();
            }
            if (count($filter1)) {
                $query->where('route like :filter');
                foreach ($filter1 as $filter) {
                    $assigned = array_merge($assigned, $query->params([':filter' => $filter])->column());
                }
            }
            $assigned = static::requiredParent($assigned, $menus);
            if ($cache !== null) {
                $cache->set($key, $assigned, $config->cacheDuration, new TagDependency([
                    'tags' => Configs::CACHE_TAG
                ]));
            }
            asort($assigned);
        }

        $key = [__METHOD__, $assigned, $root];
        $cache = null;
        if ($refresh || $callback !== null || $cache === null || (($result = $cache->get($key)) === false)) {

            $result = static::normalizeMenu($assigned, $menus, $callback, $root);
            if ($cache !== null && $callback === null) {
                $cache->set($key, $result, $config->cacheDuration, new TagDependency([
                    'tags' => Configs::CACHE_TAG
                ]));
            }
        }
        return $result;
    }

    /**
     * Use to get assigned menu of user.
     * @param mixed $userId
     * @param integer $root
     * @param \Closure $callback use to reformat output.
     * callback should have format like
     *
     * ~~~
     * function ($menu) {
     *    return [
     *        'label' => $menu['name'],
     *        'url' => [$menu['route']],
     *        'options' => $data,
     *        'items' => $menu['children']
     *        ]
     *    ]
     * }
     * ~~~
     * @param boolean  $refresh
     * @param array  $where
     * @return array
     */
    public static function getMenu($userId, $root = null, $callback = null, $refresh = false, $where = ['type'=>'1'] )
    {
        $config = Configs::instance();

        /* @var $manager \yii\rbac\BaseManager */
        $manager = Yii::$app->getAuthManager();
        $menus = Menu::find()->where($where)->asArray()->indexBy('id')->orderBy('id ASC')->all();
        $key = [__METHOD__, $userId, $manager->defaultRoles];
        $cache = $config->cache;

        if ($refresh || $cache === null || ($assigned = $cache->get($key)) === false) {

            $assigned = Menu::find()->where($where)->select(['id'])->asArray()->column();

            if ($cache !== null) {
                $cache->set($key, $assigned, $config->cacheDuration, new TagDependency([
                    'tags' => Configs::CACHE_TAG
                ]));
            }
        }

        $key = [__METHOD__, $assigned, $root];
        $cache = null;
        if ($refresh || $callback !== null || $cache === null || (($result = $cache->get($key)) === false)) {
            $result = static::normalizeMenu($assigned, $menus, $callback, $root);
            if ($cache !== null && $callback === null) {
                $cache->set($key, $result, $config->cacheDuration, new TagDependency([
                    'tags' => Configs::CACHE_TAG
                ]));
            }
        }

        return $result;
    }

    /**
     * Ensure all item menu has parent.
     * @param  array $assigned
     * @param  array $menus
     * @return array
     */
    private static function requiredParent($assigned, &$menus)
    {
        $l = count($assigned);
        for ($i = 0; $i < $l; $i++) {
            $id = $assigned[$i];
            $parent_id = $menus[$id]['parent'];
            if ($parent_id !== null && !in_array($parent_id, $assigned)) {
                $assigned[$l++] = $parent_id;
            }
        }

        return $assigned;
    }

    /**
     * Parse route
     * @param  string $route
     * @return mixed
     */
    public static function parseRoute($route)
    {
        if (!empty($route)) {
            $url = [];
            $r = explode('&', $route);
            $url[0] = $r[0];
            unset($r[0]);
            foreach ($r as $part) {
                $part = explode('=', $part);
                $url[$part[0]] = isset($part[1]) ? $part[1] : '';
            }
            return $url;
        }

        return 'javascript:void(0);';
    }

    /**
     * Parse data
     * @param  string $data
     * @return mixed
     */
    public static function parseData($data)
    {
        if (!empty($data)) {
            $res = [];
            if ($d = @json_decode($data)){
                if (is_object($d)){
                    foreach ($d as $key => $value){
                        $res[$key] = $value;
                    }
                }
            }
            unset($d);
            return $res;
        }

        return null;
    }

    /**
     * Normalize menu
     * @param  array $assigned
     * @param  array $menus
     * @param  Closure $callback
     * @param  integer $parent
     * @return array
     */
    private static function normalizeMenu(&$assigned, &$menus, $callback, $parent = null)
    {
        $result = [];
        $order = [];
        foreach ($assigned as $id) {
            $menu = ArrayHelper::getValue($menus, $id);
            if ($menu['parent'] == $parent) {
                $menu['children'] = static::normalizeMenu($assigned, $menus, $callback, $id);
                if ($callback !== null) {
                    $item = call_user_func($callback, $menu);
                } else {
                    $item = [
                        'id' => $menu['id'],
                        'parent' => $menu['parent'],
                        'order' => $menu['order'],
                        'text' => $menu['name'],
                        'url' => static::parseRoute($menu['route']),
                        'data' => static::parseData($menu['data']),
                    ];
                    if ($menu['children'] != []) {
                        $item['children'] = $menu['children'];
                    }
                }
                $result[] = $item;
                $order[] = $menu['order'];
            }
        }
        if ($result != []) {
            array_multisort($order, $result);
        }

        return $result;
    }

    /**
     * generate the assigned  of menu for this user.
     * @param mixed $userId
     * @param integer $root
     * @param \Closure $callback use to reformat output.
     * callback should have format like
     *
     * ~~~
     * function ($menu) {
     *    return [
     *        'label' => $menu['name'],
     *        'url' => [$menu['route']],
     *        'options' => $data,
     *        'items' => $menu['children']
     *        ]
     *    ]
     * }
     * ~~~
     * @param boolean  $refresh
     * @return string
     */
    public static function generateMenu($userId, $options = [], $refresh = true)
    {
        $menus = self::getAssignedMenu($userId, null ,null ,$refresh);
        if ($menus){
            $menus = self::generateMenuItem($menus);
        }else{
            Yii::$app->user->logout();
            throw new \yii\web\ForbiddenHttpException(Yii::t('yii', '该账号未激活!请联系管理员!'));
        }
        $attr = '';
        if (!empty($options)){
            foreach ($options as $key => $value){
                $attr .= ' ' . $key . '="' . $value . '"';
            }
        }
        $menus = '<ul '.$attr.'>'.$menus.'</ul>';
        return $menus;
    }

    /**
     * generate the item of menu.
     * @param array  $menuItem
     * @return string
     */
    public static function generateMenuItem($menuItems)
    {
        if($menuItems){
            $item = '';
            foreach ($menuItems as $menuItem){
                foreach ($menuItem['data'] as $key => $value){
                    if (empty($value)){
                        $menuItem['data'][$key] = '';
                    }
                }
                $url = '/back/index.php?r=';
                if (is_array($menuItem['url'])){
                    foreach ($menuItem['url'] as $kr => $vr){
                       switch ($kr){
                           case 'url' : {  $url .= substr($vr, 1); } break;
                           default : {  $url .= '&' . $kr . '=' . $vr ; } break;
                       }
                    }
                }else{
                    $url = 'javascript:void(0);';
                }
                $new = '';
                if (!isset($menuItem['children'])){
                    $item .= '<li class="'.$menuItem['data']['li.class'].'">
                                <a class="'.$menuItem['data']['a.class'].'" href="'.$url.'">
                                <i class="' . $menuItem['data']['i.class'] . '"></i>
                                <span class="title">' . $menuItem['text'] . '</span>
                                </a>
                             </li>';
                }else{
                    $item .= '<li class="'.$menuItem['data']['li.class'].'">
                                 <a class="'.$menuItem['data']['a.class'].'" href="'.$url.'">
                                    <i class="' . $menuItem['data']['i.class'] . '"></i>
                                    <span class="title">' . $menuItem['text'] . '</span>
                                    <span class="arrow "></span>'.$new.'
                                </a>
                                <ul class="sub-menu">
                                    ' . self::generateMenuItem($menuItem['children']) . '
                                </ul>
                            </li>';
                }
            }
        }
        if (!isset($item)){
            $item = '';
        }
        return $item;
    }
}
