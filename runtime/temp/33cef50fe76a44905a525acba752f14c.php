<?php if (!defined('THINK_PATH')) exit(); /*a:2:{s:89:"D:\PHP\phpstudy_pro\WWW\tpshop\public/../application/admin\view\manager\manager_list.html";i:1678178020;s:65:"D:\PHP\phpstudy_pro\WWW\tpshop\application\admin\view\layout.html";i:1678171100;}*/ ?>
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
              <i class="icon-user icon-white"></i> admin
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
                  href="javascript:void(0);"
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

  <!-- 右 -->
<div class="content">
    <div class="header">
        <h1 class="page-title">管理员列表</h1>
    </div>

    <div class="well">
        <!-- search button -->
        <form
            action=""
            method="get"
            class="form-search"
        >
            <div
                class="row-fluid"
                style="text-align: left;"
            >
                <div class="pull-left span4 unstyled">
                    <p> 用户名：<input
                            class="input-medium"
                            name=""
                            type="text"
                        ></p>
                </div>
            </div>
            <button
                type="submit"
                class="btn"
            >查找</button>
            <a
                class="btn btn-primary"
                href="#"
            >新增</a>
        </form>
    </div>
    <div class="well">
        <!-- table -->
        <table class="table table-bordered table-hover table-condensed">
            <thead>
                <tr>
                    <th>编号</th>
                    <th>用户名</th>
                    <th>昵称</th>
                    <th>邮箱</th>
                    <th>是否可用</th>
                    <th>上次登录时间</th>
                    <th>操作</th>
                </tr>
            </thead>
            <tbody>
                <tr class="success">
                    <td>1</td>
                    <td>admin</td>
                    <td>好吃的橙子</td>
                    <td>admin@itcast.cn</td>
                    <td>可用</td>
                    <td>2017-04-01 08:00:00</td>
                    <td>
                        <a href="javascript:void(0);"> 编辑 </a>
                        <a
                            href="javascript:void(0);"
                            onclick="if(confirm('确认删除？')) location.href='#'"
                        > 删除 </a>
                        <a href="javascript:void(0);"> 重置密码 </a>
                    </td>
                </tr>
                <tr class="error">
                    <td>2</td>
                    <td>developer</td>
                    <td>好吃的橙子</td>
                    <td>developer@itcast.cn</td>
                    <td>可用</td>
                    <td>2017-04-01 08:00:00</td>
                    <td>
                        <a href="javascript:void(0);"> 编辑 </a>
                        <a
                            href="javascript:void(0);"
                            onclick="if(confirm('确认删除？')) location.href='#'"
                        > 删除 </a>
                        <a href="javascript:void(0);"> 重置密码 </a>
                    </td>
                </tr>
                <tr class="warning">
                    <td>3</td>
                    <td>test</td>
                    <td>好吃的橙子</td>
                    <td>test@itcast.cn</td>
                    <td>可用</td>
                    <td>2017-04-01 08:00:00</td>
                    <td>
                        <a href="javascript:void(0);"> 编辑 </a>
                        <a
                            href="javascript:void(0);"
                            onclick="if(confirm('确认删除？')) location.href='#'"
                        > 删除 </a>
                        <a href="javascript:void(0);"> 重置密码 </a>
                    </td>
                </tr>
                <tr class="info">
                    <td>4</td>
                    <td>user</td>
                    <td>好吃的橙子</td>
                    <td>user@itcast.cn</td>
                    <td>可用</td>
                    <td>2017-04-01 08:00:00</td>
                    <td>
                        <a href="javascript:void(0);"> 编辑 </a>
                        <a
                            href="javascript:void(0);"
                            onclick="if(confirm('确认删除？')) location.href='#'"
                        > 删除 </a>
                        <a href="javascript:void(0);"> 重置密码 </a>
                    </td>
                </tr>
            </tbody>
        </table>
        <!-- pagination -->
        <div class="pagination">
            <ul>
                <li><a href="#">Prev</a></li>
                <li><a href="#">1</a></li>
                <li><a href="#">2</a></li>
                <li><a href="#">3</a></li>
                <li><a href="#">4</a></li>
                <li><a href="#">Next</a></li>
            </ul>
        </div>
    </div>
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