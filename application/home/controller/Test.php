<?php

namespace app\home\controller;

use think\Controller;
use think\Request;

class Test extends Controller
{
    /**
     * 显示资源列表
     *
     * @return \think\Response
     */
    public function index()
    {
        /*
        //获取请求对象
        $request = Request::instance();
        $request = request();
        //接收参数
        $params = $request->param();
        echo '<hr>';
        var_dump($params);
        echo '<hr>';
        dump($params);
        // 单独接收某一个
        $id = $request->param('id');
        dump($id);

        //input函数
        $data = input();
        dump($data);
        $name = input('name');
        dump($name);
        */

        //get route param区别
        $request = request();
        $get = $request->get();
        $param = $request->param();
        $route = $request->route();
        dump($get);  //只能接受？后面的
        dump($param); //可以接受所有的
        dump($route); //只能接受路径形式的
    }

    /**
     * 显示创建资源表单页.
     *
     * @return \think\Response
     */
    public function create()
    {
        //
    }

    /**
     * 保存新建的资源
     *
     * @param  \think\Request  $request
     * @return \think\Response
     */
    public function save(Request $request)
    {
        $name = $request->param('name');
        dump($name);
    }

    /**
     * 显示指定的资源
     *
     * @param  int  $id
     * @return \think\Response
     */
    public function read($id) //参数就是url参数 $xx就是接受xx
    {
        dump($id);
    }

    /**
     * 显示编辑资源表单页.
     *
     * @param  int  $id
     * @return \think\Response
     */
    public function edit($id)
    {
        //渲染模板
        // return view();
        // return view('edit');
        // return $this->fetch('edit');
        //变量赋值及渲染模板
        // $user = ['id'=>100,'username'=>'zhangsan'];
        // $this->assign('user',$user);
        // return view();
        // return $this->fetch();

        //使用view进行变量赋值
        $user = ['id' => 100, 'username' => 'zhangsan'];
        $age = 30;
        // return view('edit', ['user' => $user, 'age' => $age]);
        // return $this->fetch('edit', ['user' => $user, 'age' => $age]);

        //php的函数 compact
        //想要得到数组['user'=>$user;'age'=>$age];就可以使用compact
        dump(compact('user','age'));
        return view('edit',compact('user','age'));
    }

    /**
     * 保存更新的资源
     *
     * @param  \think\Request  $request
     * @param  int  $id
     * @return \think\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * 删除指定资源
     *
     * @param  int  $id
     * @return \think\Response
     */
    public function delete($id)
    {
        //
    }
}
