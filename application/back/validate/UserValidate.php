<?php

namespace app\back\validate;

use think\Validate;

class UserValidate extends Validate
{
    protected $password;
    protected $password_rep;

    /**
     * @var array
     */
    protected $rule = [
        '__token__' =>  ['token'],
        'username'  =>  ['require','max'=>25,'min'=>4],
        'email' =>  ['email'],
        'password' =>  ['require','max'=>32,'min'=>6],
        'password_rep' =>  ['require','comparePassword:password','max'=>32,'min'=>6 ],
    ];

    /**
     * @var array
     */
    protected $message = [
        '__token__.token'  =>  '数据无效',
        'username.require'  =>  '用户名 不能为空',
        'password.require'  =>  '登录密码 不能为空',
        'password_rep.require'  =>  '确认密码 不能为空',
        'password_rep.comparePassword'  =>  '两次密码 不一致',
        'email' =>  '邮箱 不合法',
    ];

    /**
     * @var array
     */
    protected $scene = [
        'create'   =>  ['username','password'],
        'update'  =>  ['email'],
        'save'  =>  [],
        'login'  =>  ['username','password','__token__'],
        'signUp'  =>  ['username','password'],
        'register'  =>  ['username','password','password_rep','__token__'],
    ];

    /**
     * @description 自定义验证规则
     * @access protected
     * @param mixed     $value  字段值
     * @param mixed     $rule  验证规则
     * @param array     $data  数据
     * @return bool|string
     */
    protected function comparePassword($value, $rule, $data)
    {
        $rule = !empty($rule) ? $rule : 'password';
        if (!isset($data[$rule]) || empty($value)) {
            // 两次密码 不一致
            return false;
        }

        // 密码对比
        if (isset($data[$rule]) && $value === $data[$rule]) {
            return true;
        }
        return false;
    }

}