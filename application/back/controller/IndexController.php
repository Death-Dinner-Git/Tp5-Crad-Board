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
namespace app\back\controller;

use app\back\controller\BackController;

/**
 * 后台默认控制器
 * @author Sir Fu
 */
class IndexController extends BackController
{
    /**
     * 默认方法
     * @author Sir Fu
     */
    public function indexAction()
    {
        $index_count['module'] = model('Back/Module')->count();
        $index_count['addon']  = model('Back/Addon')->count();
        $index_count['users']  = model('Back/User')->count();

        // 查询今天注册用户
        $start_date         = strtotime(date('Y-m-d', time())); //今天
        $end_date           = $start_date + 86400;
        $map['registered_at'] = array(
            array('egt', $start_date),
            array('lt', $end_date),
        );
        $index_count['today'] = model('Back/User')->where($map)->count();

        // 查询实时在线用户
        $con                   = array();
        $con['update_time']    = array('gt', time() - 180);
        $con['uid']            = array('gt', 0);
        $index_count['online'] = model('back/session')->where($con)->count();

        // 模板赋值
        $this->assign('index_count', $index_count);
        $this->assign('meta_title', "留言板");
        return view('home');
    }

    /**
     * 删除缓存
     * @author Sir Fu
     */
    public function removeRuntimeAction()
    {
        $file   = new \wf\File();
        $result = $file->del_dir(RUNTIME_PATH);
        if ($result) {
            $this->success("缓存清理成功");
        } else {
            $this->error("缓存清理失败");
        }
    }
}
