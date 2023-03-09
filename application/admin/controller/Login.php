<?php

namespace app\admin\controller;

use think\captcha\Captcha;
use think\Controller;
use think\Request;

class Login extends Controller
{
    //登录
    public function login()
    {
        // 一个方法处理两个业务逻辑：页面展示 页面逻辑
        if (request()->isPost()) {
            //post请求 表单提交
            //接收参数
            $params = input();
            //参数的检测（表单验证）
            $rule = [
                'username' => 'require',
                'password' => 'require',
                'code' => 'require|captcha'
            ];
            $res = $this->validate($params, $rule);
            if ($res !== true) {
                $this->error('失败');
            }
            //验证码手动验证
            // if (!captcha_check($params['code'])) {
            //     $this->error('验证码错误');
            // }
            //查询管理员用户表
            $password = encrypt_password($params['password']);
            $manager = \app\admin\model\Manager::where([
                'username' => $params['username'],
                'password' => $password,
            ])->find();
            if ($manager) {
                //登录成功
                //设置登录标识到session
                session('manager_info', $manager->toArray());
                //页面跳转
                $this->success('登陆成功', 'admin/index/index');
            } else {
                //用户名或密码为空
                $this->error('登录失败');
            }
        } else {
            //get请求 页面展示
            //临时关闭全局模板布局
            $this->view->engine->layout(false);
            return view();
        }
    }

    public function logout()
    {
        //退出登录
        //清空session
        session(null);
        $this->redirect('admin/login/login');
    }
}
