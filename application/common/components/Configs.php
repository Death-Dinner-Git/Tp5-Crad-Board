<?php

namespace app\common\components;

/**
 * Class Configs
 * @package app\common\components
 */
class Configs
{
    /**
     * @return \app\back\model\User
     */
    private static $_backUser = '\app\back\model\User';
    
    /**
     * @return \app\home\model\User
     */
    private static $_homeUser = '\app\home\model\User';

    /**
     * @return \app\back\model\Menu
     */
    private static $_menu = '\app\back\model\Menu';

    /**
     * @return \app\back\model\BackLog
     */
    private static $_backLog = '\app\back\model\BackLog';

    /**
     * @return \app\back\model\User | null
     */
    public static function getBackUser(){
        if (!class_exists(self::$_backUser)){
            return null;
        }
        return new self::$_backUser();
    }

    /**
     * @return \app\home\model\User | null
     */
    public static function getHomeUser(){
        if (!class_exists(self::$_homeUser)){
            return null;
        }
        return new self::$_homeUser;
    }

    /**
     * @return \app\back\model\Menu | null
     */
    public static function getMenu(){
        if (!class_exists(self::$_menu)){
            return null;
        }
        return new self::$_menu;
    }

    /**
     * @return \app\back\model\BackLog | null
     */
    public static function getBackLog(){
        if (!class_exists(self::$_backLog)){
            return null;
        }
        return new self::$_backLog;
    }

}
