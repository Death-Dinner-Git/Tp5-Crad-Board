<?php
// +----------------------------------------------------------------------
// | ThinkPHP [ WE CAN DO IT JUST THINK ]
// +----------------------------------------------------------------------
// | Copyright (c) 2006~2016 http://thinkphp.cn All rights reserved.
// +----------------------------------------------------------------------
// | Licensed ( http://www.apache.org/licenses/LICENSE-2.0 )
// +----------------------------------------------------------------------
// | Author: liu21st <liu21st@gmail.com>
// +----------------------------------------------------------------------

//define some const for Api to connect the mysql
defined('DB_TYPE') or define('DB_TYPE', 'mysql');
defined('DB_HOST') or define('DB_HOST', '127.0.0.1');
defined('DB_USER') or define('DB_USER', 'root'); //数据库用户名
defined('DB_PWD') or define('DB_PWD', 'root'); //数据库密码
defined('DB_NAME') or define('DB_NAME', 'wf_database'); //数据库
defined('DB_PORT') or define('DB_PORT','3306');
defined('DB_CODE') or define('DB_CODE','utf8');
defined('DB_TB_PREFIX') or define('DB_TB_PREFIX','wf_');

//table name
defined('DB_TB_MESSAGE_BOARD') or define('DB_TB_MESSAGE_BOARD', DB_TB_PREFIX.'message_board');
defined('DB_TB_USER') or define('DB_TB_USER', DB_TB_PREFIX.'user');
defined('DB_TB_USER_LOG') or define('DB_TB_USER_LOG', DB_TB_PREFIX.'user_log');

return [
    // 数据库类型
    'type'            => DB_TYPE,
    // 服务器地址
    'hostname'        => DB_HOST,
    // 数据库名
    'database'        => DB_NAME,
    // 用户名
    'username'        => DB_USER,
    // 密码
    'password'        => DB_PWD,
    // 端口
    'hostport'        => DB_PORT,
    // 连接dsn
    'dsn'             => '',
    // 数据库连接参数
    'params'          => [],
    // 数据库编码默认采用utf8
    'charset'         => DB_CODE,
    // 数据库表前缀
    'prefix'          => DB_TB_PREFIX,
    // 数据库调试模式
    'debug'           => true,
    // 数据库部署方式:0 集中式(单一服务器),1 分布式(主从服务器)
    'deploy'          => 0,
    // 数据库读写是否分离 主从式有效
    'rw_separate'     => false,
    // 读写分离后 主服务器数量
    'master_num'      => 1,
    // 指定从服务器序号
    'slave_no'        => '',
    // 是否严格检查字段是否存在
    'fields_strict'   => true,
    // 数据集返回类型
    'resultset_type'  => 'array',
    // 自动写入时间戳字段
    'auto_timestamp'  => false,
    // 时间字段取出后的默认时间格式
    'datetime_format' => 'Y-m-d H:i:s',
    // 是否需要进行SQL性能分析
    'sql_explain'     => false,
    // Builder类
    'builder'         => '',
    // Query类
    'query'           => '\\think\\db\\Query',
];
