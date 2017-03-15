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
 * 留言板 模型
 * @author Sir Fu
 */
class CardBoard extends Model
{
    /**
     * 数据库表名
     * @author Sir Fu
     */
    protected $table = 'home_card_board';

    /**
     * 自动验证规则
     * @author Sir Fu
     */
    protected $_validate = array(
        array('from_id', 'require', '留言人不能为空', 'regex',),
        array('content', 'require', '留言 不能为空', 'regex',),
    );

    /**
     * 自动完成规则
     * @author Sir Fu
     */
    protected $_auto = array(
        array('created_at', 'time',  'function'),
        array('updated_at', 'time',  'function'),
        array('order', '0', ),
    );

}
