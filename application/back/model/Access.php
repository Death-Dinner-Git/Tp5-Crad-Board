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
 * 管理员与用户组对应关系模型
 * @author Sir Fu
 */
class Access extends Model
{
    /**
     * 数据库表名
     * @author Sir Fu
     */
    protected $table = 'back_access';

    /**
     * 自动验证规则
     * @author Sir Fu
     */
    protected $_validate = array(
        array('uid', 'require', 'UID不能为空', 'regex',),
        array('group', 'require', '部门不能为空', 'regex',),
        array('uid', 'checkUser', '该用户不存在', 'callback',),
    );

    /**
     * 自动完成规则
     * @author Sir Fu
     */
    protected $_auto = array(
        array('create_time', 'time',  'function'),
        array('update_time', 'time',  'function'),
        array('sort', '0', ),
        array('status', '1',),
    );

    /**
     * 检查用户是否存在
     * @author Sir Fu
     */
    protected function checkUser($uid)
    {
        $user_info = D('User')->find($uid);
        if ($user_info) {
            return true;
        }
        return false;
    }
}
