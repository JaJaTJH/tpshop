<?php
// +----------------------------------------------------------------------
// | ThinkPHP [ WE CAN DO IT JUST THINK ]
// +----------------------------------------------------------------------
// | Copyright (c) 2006-2016 http://thinkphp.cn All rights reserved.
// +----------------------------------------------------------------------
// | Licensed ( http://www.apache.org/licenses/LICENSE-2.0 )
// +----------------------------------------------------------------------
// | Author: 流年 <liu21st@gmail.com>
// +----------------------------------------------------------------------

// 应用公共文件

//判断密码是否加密
if (!function_exists('encrypt_password')) {
  //密码加密的函数
  function encrypt_password($string)
  {
    //加盐
    $salt = 'sane1m41asd5sd4f2sd55';
    //返回加密的密码
    return md5($salt . md5($string));
  }
}
