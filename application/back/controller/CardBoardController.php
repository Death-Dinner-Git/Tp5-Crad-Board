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
use app\back\model\CardBoard;
use app\common\components\Configs;

/**
 * 后台默认控制器
 * @author Sir Fu
 */
class CardBoardController extends BackController
{
    /**
     * 默认方法
     * @author Sir Fu
     */
    public function indexAction()
    {
        $model = new CardBoard();
        if (request()->isAjax()){
            $res = ['code'=>0,'msg'=>'更新出错'];
            $messages = input('messages');
            if ($messages == ''){
                $res['msg'] = '留言为空';
            }else if ($this->create($messages)){
                $res = ['code'=>1,'msg'=>'更新成功'];
            }
            return json($res);
        }
        $dataProvider = $model::all();

        // 模板赋值
        $this->assign('dataProvider', $dataProvider);
        $this->assign('meta_title', "留言板");
        return view('home');
    }

    /**
     * 创建留言
     * @param $messages
     * @author Sir Fu
     * @return bool
     */
    public function create($messages = '')
    {
        if ($messages != ''){
            $data = [
                'from_id'=>Configs::getBackUser()->isGuest(),
                'content'=>$messages,
                'created_at'=>time(),
                'updated_at'=>time(),
            ];
            if (CardBoard::create($data)){
                return true;
            }
        }
        return false;
    }

}
