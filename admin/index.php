<?php
error_reporting(0);
header("Content-Type: text/html;charset=utf-8");
//数据库类操作类
require_once "../includes/db.class.php";
$db=new db();
$sql1='SELECT COUNT(1) FROM `cake`';
$data1=$db->count($sql1);
$sql2='SELECT COUNT(1) FROM `bread`';
$data2=$db->count($sql2);
$sql3='SELECT COUNT(1) FROM `coffee`';
$data3=$db->count($sql3);
$sql4='SELECT COUNT(1) FROM `user`';
$data4=$db->count($sql4);
//print_r($data);
?>
<!doctype html>
<html class="no-js fixed-layout">
<head>
  <title>加一烘焙-后台管理</title>
</head>
<body>
<?php include ("head.php") ?>
  <!-- content start -->
  <div class="admin-content">
    <div class="admin-content-body">
      <div class="am-cf am-padding">
        <div class="am-fl am-cf"><strong class="am-text-primary am-text-lg">首页</strong> / <small>一些常用模块</small></div>
      </div>

      <ul class="am-avg-sm-1 am-avg-md-4 am-margin am-padding am-text-center admin-content-list ">
        <li><a href="#" class="am-text-success"><span class="am-icon-btn am-icon-birthday-cake"></span><br/>蛋糕数量<br/><?php echo $data1[0]; ?></a></li>
        <li><a href="#" class="am-text-warning"><span class="am-icon-btn am-icon-cubes"></span><br/>面包数量<br/><?php echo $data2[0]; ?></a></li>
        <li><a href="#" class="am-text-danger"><span class="am-icon-btn am-icon-coffee"></span><br/>咖啡数量<br/><?php echo $data3[0]; ?></a></li>
        <li><a href="#" class="am-text-secondary"><span class="am-icon-btn am-icon-user"></span><br/>用户信息<br/><?php echo $data4[0]; ?></a></li>
      </ul>

      <div class="am-g">
        <div class="am-u-md-6">
          <div class="am-panel am-panel-default">
            <div class="am-panel-hd am-cf" data-am-collapse="{target: '#collapse-panel-1'}">服务器信息<span class="am-icon-chevron-down am-fr" ></span></div>
            <div class="am-panel-bd am-collapse am-in" id="collapse-panel-1">
              <ul class="am-list admin-content-file">
                <li>
                    <strong><span class="am-icon-check"></span> 服务器软件：<?php echo $_SERVER['SERVER_SOFTWARE']; ?></strong>
                </li>
                <li>
                    <strong><span class="am-icon-upload"></span> PHP版本：<?php echo PHP_VERSION; ?></strong>
                </li>
                <li>
                  <strong><span class="am-icon-check"></span> 服务器空间允许上传最大文件：<?php echo ini_get('upload_max_filesize'); ?></strong>
                </li>
              </ul>
            </div>
          </div>
        </div>
  </div>
  <!-- content end -->
      <footer class="admin-content-footer">
        <hr>
        <p class="am-padding-left">© 2018 by：陈甜.</p>
      </footer>
</div>
<a href="#" class="am-icon-btn am-icon-th-list am-show-sm-only admin-menu" data-am-offcanvas="{target: '#admin-offcanvas'}"></a>
<!--[if lt IE 9]>
<script src="http://libs.baidu.com/jquery/1.11.1/jquery.min.js"></script>
<script src="http://cdn.staticfile.org/modernizr/2.8.3/modernizr.js"></script>
<script src="assets/js/amazeui.ie8polyfill.min.js"></script>
<![endif]-->
<!--[if (gte IE 9)|!(IE)]><!-->
<script src="assets/js/jquery.min.js"></script>
<!--<![endif]-->
<script src="assets/js/amazeui.min.js"></script>
<script src="assets/js/app.js"></script>
</body>
</html>
