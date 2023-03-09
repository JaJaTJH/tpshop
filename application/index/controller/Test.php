<?php
//命名空间
namespace app\index\controller;
//引入基类控制器
use think\Controller;
//定义当前控制器
class Test extends Controller
{
  public function index()
  {
    echo 'Hello World';
    die;
  }
}
