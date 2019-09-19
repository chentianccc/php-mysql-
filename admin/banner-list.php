<?php
error_reporting(0);
header("Content-Type: text/html;charset=utf-8");
//数据库类操作类
require_once "../includes/db.class.php";
$db=new db();
$sql1='SELECT * FROM banner';
$data1=$db->query($sql1);
//print_r($data);
if($_GET['id']!=null&&$_GET['img']!=null){
    $sql='DELETE FROM `banner` WHERE id ="'.$_GET['id'].'";';
    $res=$db->insert($sql);
    if($res['flag']&&$res['row']!=0){
        echo "<script>alert('删除成功！');location.href='banner-list.php';</script>";
    }else{
        echo "<script>alert('删除失败！');location.href='banner-list.php';</script>";
    }
}
?>
<!doctype html>
<html class="no-js">
<head>
  <title>轮播图-列表</title>
</head>
<body>
<?php include ("head.php") ?>
  <!-- content start -->
  <div class="admin-content">
    <div class="admin-content-body">
      <div class="am-cf am-padding am-padding-bottom-0">
        <div class="am-fl am-cf"><strong class="am-text-primary am-text-lg">轮播图</strong> / <small>管理</small></div>

          <div class="am-btn-toolbar">
              <div class="am-btn-group am-btn-group-xs">
                  <button onclick="window.location.href='banner-edit.php?act=add';" type="button" class="am-btn am-btn-default" ><span class="am-icon-plus"></span> 新增</button>
              </div>
          </div>

      </div>
      <hr>

      <div class="am-g">
        <div class="am-u-sm-12">
          <form class="am-form">
            <table class="am-table am-table-striped am-table-hover table-main">
              <thead>
              <tr>
                  <th class="table-id">ID</th>
                  <th class="table-title">图片</th>
                  <th class="table-title">标题</th>
<!--              <th class="table-title">图片地址</th>-->
                  <th class="table-set">操作</th>
              </tr>
              <tbody>
              <?php foreach($data1 as $k=>$v){?>
              <tr class="am-text-middle">
                <td><?php echo $v['id'] ?></td>
                <td><img src="../<?php echo $v['img'] ?>" width="200" height="80"></td>
                <td><?php echo $v['title'] ?></td>
<!--            <td>--><?php //echo $v['img'] ?><!--</td>-->
                <td>
                  <div class="am-btn-toolbar">
                    <div class="am-btn-group am-btn-group-xs">
                      <button class="am-btn am-btn-default am-btn-xs am-text-secondary"><a href="banner-edit.php?act=updata&id=<?php echo $v['id'] ?>"><span class="am-icon-pencil-square-o"></span>编辑</a></button>
                      <button class="am-btn am-btn-default am-btn-xs am-text-danger am-hide-sm-only"><a href="banner-list.php?img=<?php echo $v['img'] ?>&id=<?php echo $v['id'] ?>"><span class="am-icon-trash-o"></span>删除</a></button>
                    </div>
                  </div>
                </td>
              </tr>
              <?php }?>
              </tbody>
            </table>
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
<script src="assets/js/amazeui.ie8polyfill.min.js"></script>
<![endif]-->

<!--[if (gte IE 9)|!(IE)]><!-->
<script src="assets/js/jquery.min.js"></script>
<!--<![endif]-->
<script src="assets/js/amazeui.min.js"></script>
<script src="assets/js/app.js"></script>
</body>
</html>
