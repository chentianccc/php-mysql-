<?php
error_reporting(0);
header("Content-Type: text/html;charset=utf-8");
//数据库类操作类
require_once "../includes/db.class.php";
$db=new db();
$sql1='SELECT * FROM cake';
$data1=$db->query($sql1);
$sql2='SELECT COUNT(1) FROM `cake`';
$data2=$db->count($sql2);
//print_r($data);
if($_GET['id']!=null){
    $sql='DELETE FROM `cake` WHERE id ="'.$_GET['id'].'";';
    $res=$db->insert($sql);
    if($res['flag']&&$res['row']!=0){
        echo "<script>alert('删除成功！');location.href='cake-list.php';</script>";
    }else{
        echo "<script>alert('删除失败！');location.href='cake-list.php';</script>";
    }
}
?>
<!doctype html>
<html class="no-js">
<head>
  <title>加一烘焙-后台管理</title>
</head>
<body>
<?php include ("head.php") ?>
  <!-- content start -->
<div class="admin-content">
    <div class="admin-content-body">
        <div class="am-cf am-padding am-padding-bottom-0">
            <div class="am-fl am-cf"><strong class="am-text-primary am-text-lg">蛋糕</strong> / <small>管理</small></div>

            <div class="am-btn-toolbar">
                <div class="am-btn-group am-btn-group-xs">
                    <button onclick="window.location.href='cake-edit.php?act=add';" type="button" class="am-btn am-btn-default" ><span class="am-icon-plus"></span> 新增</button>
                </div>
            </div>

        </div>
        <hr>

      <div class="am-g">
        <div class="am-u-sm-12">
            <table class="am-table am-table-striped am-table-hover table-main">
              <thead>
              <tr>
                <th class="table-id">ID</th>
                <th class="table-title">名称</th>
                <th class="table-type">描述</th>
                <th class="table-author am-hide-sm-only">图片地址</th>
                <th class="table-set">操作</th>
              </tr>
              </thead>
              <tbody>
              <?php foreach($data1 as $k=>$v){?>
              <tr>
                <td><?php echo $v['id'] ?></td>
                <td><?php echo $v['name'] ?></td>
                <td><?php echo $v['miaoshu'] ?></td>
                <td class="am-hide-sm-only"><?php echo $v['img'] ?></td>
                <td>
                  <div class="am-btn-toolbar">
                    <div class="am-btn-group am-btn-group-xs">
                        <button class="am-btn am-btn-default am-btn-xs am-text-secondary"><a href="cake-edit.php?act=updata&id=<?php echo $v['id'] ?>"><span class="am-icon-pencil-square-o"></span>编辑</a></button>
                        <button class="am-btn am-btn-default am-btn-xs am-text-danger am-hide-sm-only"><a href="cake-list.php?id=<?php echo $v['id'] ?>"><span class="am-icon-trash-o"></span>删除</a></button>
                    </div>
                  </div>
                </td>
              </tr>
              <?php }?>
              </tbody>
            </table>
            <div class="am-cf">
              共 <?php echo $data2[0]; ?> 条记录
              <div class="am-fr">
                <ul class="am-pagination">
                  <li class="am-disabled"><a href="#">«</a></li>
                  <li class="am-active"><a href="#">1</a></li>
                  <li><a href="#">»</a></li>
                </ul>
              </div>
            </div>
            <hr />
          </form>
        </div>

      </div>
    </div>

    <footer class="admin-content-footer">
        <hr>
        <p class="am-padding-left">© 2018 by：陈甜.</p>
    </footer>

  </div>
  <!-- content end -->
</div>

<a href="#" class="am-icon-btn am-icon-th-list am-show-sm-only admin-menu" data-am-offcanvas="{target: '#admin-offcanvas'}"></a>

<footer class="admin-content-footer">
    <hr>
    <p class="am-padding-left">© 2018 by：陈甜.</p>
</footer>

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
