<?php
// +----------------------------------------------------------------------
// | 零云 [ 简单 高效 卓越 ]
// +----------------------------------------------------------------------
// | Copyright (c) 2016 http://www.lingyun.net All rights reserved.
// +----------------------------------------------------------------------
// | Author: Sir Fu
// +----------------------------------------------------------------------
// | 版权申明：零云不是一个自由软件，是零云官方推出的商业源码，严禁在未经许可的情况下
// | 拷贝、复制、传播、使用零云的任意代码，如有违反，请立即删除，否则您将面临承担相应
// | 法律责任的风险。如果需要取得官方授权，请联系官方http://www.lingyun.net
// +----------------------------------------------------------------------
namespace app\back\model;

use app\common\model\Model;

/**
 * 部门模型
 * @author Sir Fu
 */
class Group extends Model
{
    /**
     * 数据库表名
     * @author Sir Fu
     */
    protected $table = 'back_group';

    /**
     * 自动验证规则
     * @author Sir Fu
     */
    protected $_validate = array(
        array('title', 'require', '部门名称不能为空', 'regex',),
        array('title', '1,32', '部门名称长度为1-32个字符', 'length'),
        array('title', '', '部门名称已经存在', 'unique'),
        array('menu_auth', 'require', '权限不能为空', 'regex'),
    );

    /**
     * 自动完成规则
     * @author Sir Fu
     */
    protected $_auto = array(
        array('create_time', 'time', 'function'),
        array('update_time', 'time', 'function'),
        array('status', '1'),
    );

    /**
     * 检查部门功能权限
     * @author Sir Fu
     */
    public function checkMenuAuth()
    {
        return true;
        $current_menu = model('back/Module')->getCurrentMenu(); // 当前菜单
        $user_group   = model('back/Access')->getFieldByUid(session('user_auth.uid'), 'group'); // 获得当前登录用户信息
        if ($user_group !== '1') {
            $group_info = $this->find($user_group);
            // 获得当前登录用户所属部门的权限列表
            $group_auth = json_decode($group_info['menu_auth'], true);
            if (in_array($current_menu['id'], $group_auth[request()->module()])) {
                return true;
            }
        } else {
            return true; // 超级管理员无需验证
        }
        return false;
    }
}
