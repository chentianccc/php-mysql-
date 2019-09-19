<?php
/**
 * User: Xingkong
 * Date: 2018/11/13 0013
 * Time: 15:13
 */
header("Content-Type: text/html;charset=utf-8");
session_start();
require ("../includes/system.php");
require ("../includes/config.php");
$username = $_POST['user'];
$password = $_POST['password'];
if($username!=null&&$password!=null){
    if ($username == Config::$username && $password == Config::$password) {
        $_SESSION['user'] = Config::$username ;
        exit("<script language='javascript'>alert('登陆管理中心成功！');window.location.href='./';</script>");
    }
    else{
        exit("<script>alert('账号或密码不正确！');location.href='login.php';</script>");
    }
}
//注销登录
if($_GET['action']=="logout"){
    unset($_SESSION['user']);
    exit("<script>alert('您已经注销本次登录！');location.href='login.php';</script>");
}
?>
<!DOCTYPE html>
<html>
<head lang="en">
  <meta charset="UTF-8">
  <title>加一烘焙-后台管理</title>
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <meta name="format-detection" content="telephone=no">
  <meta name="renderer" content="webkit">
  <meta http-equiv="Cache-Control" content="no-siteapp" />
  <link rel="alternate icon" type="image/png" href="assets/i/favicon.png">
  <link rel="stylesheet" href="assets/css/amazeui.min.css"/>
  <style>
    .header {
      text-align: center;
    }
    .header h1 {
      font-size: 200%;
      color: #333;
      margin-top: 30px;
    }
    .header p {
      font-size: 14px;
    }
  </style>
</head>
<body>
<div class="header">
  <div class="am-g">
    <h1>加一烘焙</h1>
    <p>后台管理系统</p>
  </div>
  <hr />
</div>
<div class="am-g">
  <div class="am-u-lg-6 am-u-md-8 am-u-sm-centered">
    <h3>登录</h3>
    <hr>
    <form method="post" class="am-form" action="login.php">
      <label for="user">账号:</label>
      <input type="text" name="user" id="user" value="">
      <br>
      <label for="password">密码:</label>
      <input type="password" name="password" id="password" value="">
      <br>
      <label for="remember-me">
        <input id="remember-me" type="checkbox">
        记住密码
      </label>
      <br />
      <div class="am-cf">
        <input type="submit" value="登 录" class="am-btn am-btn-primary am-btn-sm am-fl">
      </div>
    </form>
    <hr>
    <p>© 2018 by：陈甜</p>
  </div>
</div>
</body>
</html>
