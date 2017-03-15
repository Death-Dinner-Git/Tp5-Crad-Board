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

defined('APP_HTTP') or define("APP_HTTP", 'http');  //协议
defined('APP_HOST') or define("APP_HOST", 'www.app.cc');  //域名
defined('APP_PORT') or define("APP_PORT", '80');  //端口
defined('APP_FULL_URL') or define("APP_FULL_URL", APP_HTTP.'://'.APP_HOST.':'.APP_PORT );  //完整请求地址
defined('APP_HOME') or define("APP_HOME", APP_FULL_URL );  //主页
defined('APP_TILTE_EXT') or define("APP_TILTE_EXT", '[ WF ]' );  //默认页面标题后缀

//对外路径
defined('APP_PUBLIC_CSS_URL') or define("APP_PUBLIC_CSS_URL", APP_FULL_URL.'/public/css/');  //CSS URL
defined('APP_PUBLIC_FONTS_URL') or define("APP_PUBLIC_FONTS_URL", APP_FULL_URL.'/public/fonts/');  //字体 URL
defined('APP_PUBLIC_IMAGES_URL') or define("APP_PUBLIC_IMAGES_URL", APP_FULL_URL.'/public/images/');  //图片 URL
defined('APP_PUBLIC_JS_URL') or define("APP_PUBLIC_JS_URL", APP_FULL_URL.'/public/js/');  //javascript URL
defined('APP_PUBLIC_UPLOAD_URL') or define("APP_PUBLIC_UPLOAD_URL", APP_FULL_URL.'/public/static/uploads/');  //上传图片URL
defined('APP_PUBLIC_PLUGINS_URL') or define("APP_PUBLIC_PLUGINS_URL", APP_FULL_URL.'/public/plugins/');  //前端插件 URL

//内部使用绝对路径
defined('APP_PUBLIC_PATH') or define("APP_PUBLIC_PATH", pathinfo(__DIR__,PATHINFO_DIRNAME).DS.'public'.DS.'static');  //公共资源根目录 绝对路径
defined('APP_PUBLIC_CSS_PATH') or define("APP_PUBLIC_CSS_PATH", APP_PUBLIC_PATH.DS.'css');  //CSS 绝对路径
defined('APP_PUBLIC_FONTS_PATH') or define("APP_PUBLIC_FONTS_PATH", APP_PUBLIC_PATH.DS.'fonts');  //字体 绝对路径
defined('APP_PUBLIC_IMAGES_PATH') or define("APP_PUBLIC_IMAGES_PATH", APP_PUBLIC_PATH.DS.'images');  //图片 绝对路径
defined('APP_PUBLIC_JS_PATH') or define("APP_PUBLIC_JS_PATH", APP_PUBLIC_PATH.DS.'js');  //javascript 绝对路径
defined('APP_PUBLIC_UPLOAD_PATH') or define("APP_PUBLIC_UPLOAD_PATH", APP_PUBLIC_PATH.DS.'uploads');  //上传图片 绝对路径
defined('APP_PUBLIC_PLUGINS_PATH') or define("APP_PUBLIC_PLUGINS_PATH", APP_PUBLIC_PATH.DS.'plugins');  //前端插件 绝对路径

//短信验证码
defined('PHONE_APP_KEY') or define("PHONE_APP_KEY", 'xxx');  //待发送的第三方识别码(appKey)。
defined('PHONE_MASTER_SECRET') or define("PHONE_MASTER_SECRET", 'xxx');  //API MasterSecret
defined('PHONE_EXTEND') or define("PHONE_EXTEND", 'xxx'); //Extend
defined('PHONE_SMS_TYPE') or define("PHONE_SMS_TYPE", 'normal');  //SmsType
defined('PHONE_PRODUCT') or define("PHONE_PRODUCT", 'XXX');   //product  APP产品名
defined('PHONE_DURATION') or define("PHONE_DURATION", '1800');  //短信有效时间。单位秒，默认为1800秒，即30分钟
//注册
defined('PHONE_SMS_FREE_SIGN_NAME_LOGIN') or define("PHONE_SMS_FREE_SIGN_NAME_LOGIN", '注册验证');   //SmsFreeSignName验证签名
defined('PHONE_SMS_TEMPLATE_CODE_LOGIN') or define("PHONE_SMS_TEMPLATE_CODE_LOGIN", 'SMS_12980145');  //SmsTemplateCode  短信模板编号
//找回或变更 身份验证
defined('PHONE_SMS_FREE_SIGN_NAME_GET') or define("PHONE_SMS_FREE_SIGN_NAME_GET", '变更验证');   //SmsFreeSignName验证签名
defined('PHONE_SMS_TEMPLATE_CODE_GET') or define("PHONE_SMS_TEMPLATE_CODE_GET", 'SMS_12980149');  //SmsTemplateCode  短信模板编号
//激活 后台
defined('PHONE_SMS_FREE_SIGN_NAME_ALIVE') or define("PHONE_SMS_FREE_SIGN_NAME_ALIVE", '身份验证');   //SmsFreeSignName验证签名
defined('PHONE_SMS_TEMPLATE_CODE_ALIVE') or define("PHONE_SMS_TEMPLATE_CODE_ALIVE", 'SMS_34000270');  //SmsTemplateCode  短信模板编号

//推送配置
defined('PUSH_APP_KEY') or define("PUSH_APP_KEY", 'xxx');  //待发送的应用程序(appKey)，只能填一个。
defined('PUSH_MASTER_SECRET') or define("PUSH_MASTER_SECRET", 'xxx'); //主密码
defined('PUSH_URL') or define("PUSH_URL", 'https://api.jpush.cn/v3/push'); //推送的地址

//邮件配置
defined('MAILER_FROM_NAME') or define("MAILER_FROM_NAME", '【 XXX 】');  //邮件发送者名称
defined('MAILER_FROM_EMAIL') or define("MAILER_FROM_EMAIL", 'xxx@163.com');  //发送的邮箱
defined('MAILER_USERNAME') or define("MAILER_USERNAME", 'xxx@163.com');  //邮件发送账号
defined('MAILER_PASSWORD') or define("MAILER_PASSWORD", 'xxx'); // 邮件发送号登录密码
defined('MAILER_HOST') or define("MAILER_HOST", 'smtp.163.com');  //每种邮箱的host配置不一样
defined('MAILER_PORT') or define("MAILER_PORT", '25');

return [
    // +----------------------------------------------------------------------
    // | 应用设置
    // +----------------------------------------------------------------------

    // 应用命名空间
    'app_namespace'          => 'app',
    // 应用调试模式
    'app_debug'              => true,
    // 应用Trace
    'app_trace'              => false,
    // 应用模式状态
    'app_status'             => '',
    // 是否支持多模块
    'app_multi_module'       => true,
    // 入口自动绑定模块
    'auto_bind_module'       => false,
    // 注册的根命名空间
    'root_namespace'         => [],
    // 扩展函数文件
    'extra_file_list'        => [THINK_PATH . 'helper' . EXT],
    // 默认输出类型
    'default_return_type'    => 'html',
    // 默认AJAX 数据返回格式,可选json xml ...
    'default_ajax_return'    => 'json',
    // 默认JSONP格式返回的处理方法
    'default_jsonp_handler'  => 'jsonpReturn',
    // 默认JSONP处理方法
    'var_jsonp_handler'      => 'callback',
    // 默认时区
    'default_timezone'       => 'PRC',
    // 是否开启多语言
    'lang_switch_on'         => false,
    // 默认全局过滤方法 用逗号分隔多个
    'default_filter'         => '',
    // 默认语言
    'default_lang'           => 'zh-cn',
    // 默认编码
    'default_charset'       => 'UTF-8',
    // 应用类库后缀
    'class_suffix'           => false,
    // 控制器类后缀
    'controller_suffix'      => 'controller',

    // +----------------------------------------------------------------------
    // | 模块设置
    // +----------------------------------------------------------------------

    // 默认模块名
    'default_module'         => 'back',
    // 禁止访问模块
    'deny_module_list'       => ['common'],
    // 默认控制器名
    'default_controller'     => 'Index',
    // 默认操作名
    'default_action'         => 'index',
    // 默认验证器
    'default_validate'       => '',
    // 默认的空控制器名
    'empty_controller'       => 'Error',
    // 操作方法后缀
    'action_suffix'          => 'Action',
    // 自动搜索控制器
    'controller_auto_search' => false,

    // +----------------------------------------------------------------------
    // | URL设置
    // +----------------------------------------------------------------------

    // PATHINFO变量名 用于兼容模式
    'var_pathinfo'           => 's',
    // 兼容PATH_INFO获取
    'pathinfo_fetch'         => ['ORIG_PATH_INFO', 'REDIRECT_PATH_INFO', 'REDIRECT_URL'],
    // pathinfo分隔符
    'pathinfo_depr'          => '/',
    // URL伪静态后缀
    'url_html_suffix'        => 'html',
    // URL普通方式参数 用于自动生成
    'url_common_param'       => false,
    // URL参数方式 0 按名称成对解析 1 按顺序解析
    'url_param_type'         => 0,
    // 是否开启路由
    'url_route_on'           => true,
    // 路由使用完整匹配
    'route_complete_match'   => false,
    // 路由配置文件（支持配置多个）
    'route_config_file'      => ['route'],
    // 是否强制使用路由
    'url_route_must'         => false,
    // 域名部署
    'url_domain_deploy'      => false,
    // 域名根，如thinkphp.cn
    'url_domain_root'        => '',
    // 是否自动转换URL中的控制器和操作名
    'url_convert'            => true,
    // 默认的访问控制器层
    'url_controller_layer'   => 'controller',
    // 表单请求类型伪装变量
    'var_method'             => '_method',
    // 表单ajax伪装变量
    'var_ajax'               => '_ajax',
    // 表单pjax伪装变量
    'var_pjax'               => '_pjax',
    // 是否开启请求缓存 true自动缓存 支持设置请求缓存规则
    'request_cache'          => false,
    // 请求缓存有效期
    'request_cache_expire'   => null,

    // +----------------------------------------------------------------------
    // | 模板设置
    // +----------------------------------------------------------------------

    'template'               => [

//        // 模板引擎类型 支持 Angular 支持扩展
//        'type'             => 'Angular',
//        // 是否开启调试
//        'debug'            => false,
//        // 模板根目录
//        'tpl_path'         => './view/',
//        // 模板缓存目录
//        'tpl_cache_path'   => './cache/',
//        // 模板后缀
//        'tpl_suffix'       => '.html',
//        // 模板缓存后缀
//        'tpl_cache_suffix' => '.php',
//        // 指令前缀
//        'directive_prefix' => 'php-',
//        // 指令的最大解析次数
//        'directive_max'    => 10000,

        // 模板引擎类型 支持 php think 支持扩展
        'type'         => 'Think',
        // 模板路径
        'view_path'    => '',
        // 模板后缀
        'view_suffix'  => 'html',
        // 模板文件名分隔符
        'view_depr'    => DS,
        // 模板引擎普通标签开始标记
        'tpl_begin'    => '{',
        // 模板引擎普通标签结束标记
        'tpl_end'      => '}',
        // 标签库标签开始标记
        'taglib_begin' => '{',
        // 标签库标签结束标记
        'taglib_end'   => '}',

        'layout_on'     =>  true,
        'layout_name'   =>  'layouts/main',
        'layout_item'   =>  '{__CONTENT__}'
    ],

    // 视图输出字符串内容替换

    'view_replace_str'       => [
        '_CSS_'=>'/static/css',
        '_JS_'=>'/public/static/js',
        '_ICON_'=>'/static/images/shortcut-icon-logo.png',
        '_TITLE_'=>APP_TILTE_EXT,
    ],
    // 默认跳转页面对应的模板文件
    'dispatch_success_tmpl'  => THINK_PATH . 'tpl' . DS . 'diy_dispatch_jump.tpl',
    'dispatch_error_tmpl'    => THINK_PATH . 'tpl' . DS . 'diy_dispatch_jump.tpl',

    // +----------------------------------------------------------------------
    // | 异常及错误设置
    // +----------------------------------------------------------------------

    // 异常页面的模板文件
    'exception_tmpl'         => THINK_PATH . 'tpl' . DS . 'think_exception.tpl',

    // 错误显示信息,非调试模式有效
    'error_message'          => '页面错误！请稍后再试～',
    // 显示错误信息
    'show_error_msg'         => false,
    // 异常处理handle类 留空使用 \think\exception\Handle
    'exception_handle'       => '',

    // +----------------------------------------------------------------------
    // | 日志设置
    // +----------------------------------------------------------------------

    'log'                    => [
        // 日志记录方式，内置 file socket 支持扩展
        'type'  => 'File',
        // 日志保存目录
        'path'  => LOG_PATH,
        // 日志记录级别
        'level' => [],
    ],

    // +----------------------------------------------------------------------
    // | Trace设置 开启 app_trace 后 有效
    // +----------------------------------------------------------------------
    'trace'                  => [
        // 内置Html Console 支持扩展
        'type' => 'Html',
    ],

    // +----------------------------------------------------------------------
    // | 缓存设置
    // +----------------------------------------------------------------------

    'cache'                  => [
        // 驱动方式
        'type'   => 'File',
        // 缓存保存目录
        'path'   => CACHE_PATH,
        // 缓存前缀
        'prefix' => '',
        // 缓存有效期 0表示永久缓存
        'expire' => 0,
    ],

    // +----------------------------------------------------------------------
    // | 会话设置
    // +----------------------------------------------------------------------

    'session'                => [
        'id'             => '',
        // SESSION_ID的提交变量,解决flash上传跨域
        'var_session_id' => '',
        // SESSION 前缀
        'prefix'         => 'think',
        // 驱动方式 支持redis memcache memcached
        'type'           => '',
        // 是否自动开启 SESSION
        'auto_start'     => true,
        // SESSION 有效时间
        'expire'    => 1800,
    ],

    // +----------------------------------------------------------------------
    // | Cookie设置
    // +----------------------------------------------------------------------
    'cookie'                 => [
        // cookie 名称前缀
        'prefix'    => '',
        // cookie 保存时间
        'expire'    => 0,
        // cookie 保存路径
        'path'      => '/',
        // cookie 有效域名
        'domain'    => '',
        //  cookie 启用安全传输
        'secure'    => false,
        // httponly设置
        'httponly'  => '',
        // 是否使用 setcookie
        'setcookie' => true,
    ],

    //分页配置
    'paginate'               => [
        'type'      => 'bootstrap',
        'var_page'  => 'page',
        'list_rows' => 15,
    ],

    // +----------------------------------------------------------------------
    // |
    // 用户设置
    // +----------------------------------------------------------------------

    'user'                    => [
        // User 位置
        'default_user_model'  => '\app\back\model\UserModel',
        // 登录路由
        'loginUrl'  => 'back/login/login',
        // 退出路由
        'logoutUrl'  => 'back/login/logout',
        // 注册路由
        'registerUrl'  => 'back/login/register',
        // 当前用户对象SESSION　key
        '_identity'  => '__USER__',
        // 当前用户 自动登录 SESSION　key
        '_auth_key'  => '__AUTH_KEY__',
        // 当前用户 登录有效期 SESSION　key
        '_duration'  => '__DURATION__',
        // 当前用户 登录 默认有效期时间
        '_default_duration'  => '1440',
        // 记住我 当前用户 登录 默认有效期时间
        '_rememberMe_duration'  => 60*60*24*7,
        // 重置密码 默认有效期时间
        '_passwordResetTokenExpire'  => 60*60*2,
        // 登录成功 返回URL
        '_back_url'  => '__BACK_URL__',
        // 是否自动登录
        '_auto_login'  => true,
    ],

    // +----------------------------------------------------------------------
    // |
    // 验证码设置
    // +----------------------------------------------------------------------

    'captcha'                    => [
        // 验证码加密密钥
        'seKey'    => 'www.app.cc',
        // 验证码字符集合
        'codeSet'  => '2345678abcdefhijkmnpqrstuvwxyzABCDEFGHJKLMNPQRTUVWXY',
        // 验证码过期时间（s）
        'expire'   => 1440,
        // 使用中文验证码
        'useZh'    => false,
        // 中文验证码字符串
        'zhSet'    => '',
        // 使用背景图片
        'useImgBg' => false,
        // 验证码字体大小(px)
        'fontSize' => 25,
        // 是否画混淆曲线
        'useCurve' => true,
        // 是否添加杂点
        'useNoise' => true,
        // 验证码图片高度
        'imageH'   => 0,
        // 验证码图片宽度
        'imageW'   => 0,
        // 验证码位数
        'length'   => 5,
        // 验证码字体，不设置随机获取
        'fontttf'  => '',
        // 背景颜色
        'bg'       => [243, 251, 254],
        // 验证成功后是否重置
        'reset'    => true,
    ],
];
