<?php if (!defined('THINK_PATH')) exit(); /*a:2:{s:80:"D:\PHP\phpstudy_pro\WWW\tpshop\public/../application/admin\view\index\index.html";i:1678174874;s:65:"D:\PHP\phpstudy_pro\WWW\tpshop\application\admin\view\layout.html";i:1678332624;}*/ ?>
<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8">
    <title>后台管理系统</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="">
    <meta name="author" content="">
    <link href="/static/admin/css/main.css" rel="stylesheet" type="text/css"/>
    <link href="/static/admin/css/bootstrap.min.css" rel="stylesheet" type="text/css"/>
    <link href="/static/admin/css/bootstrap-responsive.min.css" rel="stylesheet" type="text/css"/>
    <script src="/static/admin/js/jquery-1.8.1.min.js"></script>
    <script src="/static/admin/js/bootstrap.min.js"></script>
</head>

<body>
  <!-- 上 -->
  <div class="navbar">
    <div class="navbar-inner">
      <div class="container-fluid">
        <ul class="nav pull-right">
          <li
            id="fat-menu"
            class="dropdown"
          >
            <a
              href="#"
              id="drop3"
              role="button"
              class="dropdown-toggle"
              data-toggle="dropdown"
            >
              <i class="icon-user icon-white"></i> <?php echo \think\Session::get('manager_info.username'); ?>
              <i class="icon-caret-down"></i>
            </a>
            <ul class="dropdown-menu">
              <li><a
                  tabindex="-1"
                  href="javascript:void(0);"
                >修改密码</a></li>
              <li class="divider"></li>
              <li><a
                  tabindex="-1"
                  href="<?php echo url('admin/login/logout'); ?>"
                >安全退出</a></li>
            </ul>
          </li>
        </ul>
        <a
          class="brand"
          href="index.html"
        ><span class="first">后台管理系统</span></a>
        <ul class="nav">
          <li class="active"><a href="javascript:void(0);">首页</a></li>
          <li><a href="javascript:void(0);">系统管理</a></li>
          <li><a href="javascript:void(0);">权限管理</a></li>
        </ul>
      </div>
    </div>
  </div>
  <!-- 左 -->
  <div class="sidebar-nav">
    <a
      href="#error-menu"
      class="nav-header collapsed"
      data-toggle="collapse"
    ><i class="icon-exclamation-sign"></i>权限管理</a>
    <ul
      id="error-menu"
      class="nav nav-list collapse"
    >
      <li><a href="javascript:void(0);">管理员列表</a></li>
      <li><a href="javascript:void(0);">管理员新增</a></li>
      <li><a href="javascript:void(0);">角色管理</a></li>
      <li><a href="javascript:void(0);">权限管理</a></li>
    </ul>
    <a
      href="#accounts-menu"
      class="nav-header"
      data-toggle="collapse"
    ><i class="icon-exclamation-sign"></i>商品管理</a>
    <ul
      id="accounts-menu"
      class="nav nav-list collapse in"
    >
      <li><a href="javascript:void(0);">商品列表</a></li>
      <li><a href="javascript:void(0);">商品新增</a></li>
      <li><a href="javascript:void(0);">商品类型</a></li>
      <li><a href="javascript:void(0);">商品分类</a></li>
    </ul>
    <a
      href="#accounts-menu"
      class="nav-header"
      data-toggle="collapse"
    ><i class="icon-exclamation-sign"></i>订单管理</a>
    <ul
      id="accounts-menu"
      class="nav nav-list collapse"
    >
      <li><a href="javascript:void(0);">订单列表</a></li>
      <li><a href="javascript:void(0);">订单新增</a></li>
    </ul>
    <a
      href="#accounts-menu"
      class="nav-header"
      data-toggle="collapse"
    ><i class="icon-exclamation-sign"></i>会员管理</a>
    <ul
      id="accounts-menu"
      class="nav nav-list collapse"
    >
      <li><a href="javascript:void(0);">用户列表</a></li>
      <li><a href="javascript:void(0);">用户新增</a></li>
    </ul>
    <a
      href="#dashboard-menu"
      class="nav-header"
      data-toggle="collapse"
    ><i class="icon-exclamation-sign"></i>系统管理</a>
    <ul
      id="dashboard-menu"
      class="nav nav-list collapse"
    >
      <li><a href="javascript:void(0);">密码修改</a></li>
    </ul>
  </div>

  <script src="/static/admin/js/highcharts.js"></script>
<script src="/static/admin/js/exporting.js"></script>
<script src="/static/admin/js/draw.js"></script>
<!-- 右 -->
<div class="content">
  <!-- header -->
  <div class="header">
    <h1 class="page-title">天气</h1>
  </div>
  <!-- highchat show -->
  <div
    id="container"
    style="min-width: 310px; height: 400px; margin: 0 auto"
  ></div>
  <!-- footer -->
  <footer>
    <hr>
    <p>© 2017 <a
        href="javascript:void(0);"
        target="_blank"
      >ADMIN</a></p>
  </footer>
</div>

</body>

</html>