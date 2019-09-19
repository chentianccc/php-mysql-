<?php
/**
 * User: Xingkong
 * Date: 2018/11/13 0013
 * Time: 17:17
 */
error_reporting(0);
header("Content-Type: text/html;charset=utf-8");
require_once "../includes/db.class.php";
$db=new db();
$id=$_GET['id'];
$act=$_GET['act'];
switch ($act) {
    case "add"://添加信息
        if($_POST['title']!=null&&$_FILES["file"]["name"]!=null){
            // 允许上传的图片后缀
            $allowedExts = array("gif", "jpeg", "jpg", "png");
            $temp = explode(".", $_FILES["file"]["name"]);
            $extension = end($temp);     // 获取文件后缀名
            if ((($_FILES["file"]["type"] == "image/gif")
                    || ($_FILES["file"]["type"] == "image/jpeg")
                    || ($_FILES["file"]["type"] == "image/jpg")
                    || ($_FILES["file"]["type"] == "image/pjpeg")
                    || ($_FILES["file"]["type"] == "image/x-png")
                    || ($_FILES["file"]["type"] == "image/png"))
                && ($_FILES["file"]["size"] < 2048000)   // 小于 2000 kb
                && in_array($extension, $allowedExts))
            {
                if ($_FILES["file"]["error"] > 0)
                {
                    echo "错误：: " . $_FILES["file"]["error"] . "<br>";
                }else{
                    // 如果 images 目录不存在该文件则将文件上传到 images 目录下
                    move_uploaded_file($_FILES["file"]["tmp_name"], "../images/" . $_FILES["file"]["name"]);
                    //echo "文件存储在: " . "../images/" . $_FILES["file"]["name"];
                    $sql='INSERT INTO `banner` (title,img) VALUES ("'.$_POST['title'].'","images/'.$_FILES["file"]["name"].'");';
                    $res=$db->insert($sql);
                    if($res['flag']&&$res['row']!=0){
                        echo "<script>alert('添加成功！');location.href='banner-list.php';</script>";
                    }else{
                        echo "<script>alert('添加失败！');location.href='banner-edit.php?act=add';</script>";
                    }
                }
            }else{
                echo "<script>alert('非法文件格式！');</script>";
            }
        }
        break;
    case "updata"://修改信息
        if($id!=null){//根据ID查询
            $sql="SELECT * FROM `banner` WHERE id='$id'";
            $data=$db->count($sql,true);
        }else if($_POST['id']!=null&&$_POST['title']!=null){//修改信息（不修改图片）
            $sql='UPDATE `banner` SET title="'.$_POST['title'].'" WHERE id="'.$_POST['id'].'"';
            $res=$db->insert($sql);
            if($res['flag']&&$res['row']!=0){
                echo "<script>alert('修改成功！');location.href='banner-edit.php?act=updata&id=".$_POST['id']."';</script>";
            }else{
                echo "<script>alert('修改失败！');location.href='banner-edit.php?act=updata&id=".$_POST['id']."';</script>";
            }
        }else if($_POST['id']!=null&&$_POST['title']!=null&&$_FILES["file"]["name"]!=null){//修改信息（全部）
            // 允许上传的图片后缀
            $allowedExts = array("gif", "jpeg", "jpg", "png");
            $temp = explode(".", $_FILES["file"]["name"]);
            $extension = end($temp);     // 获取文件后缀名
            if ((($_FILES["file"]["type"] == "image/gif")
                    || ($_FILES["file"]["type"] == "image/jpeg")
                    || ($_FILES["file"]["type"] == "image/jpg")
                    || ($_FILES["file"]["type"] == "image/pjpeg")
                    || ($_FILES["file"]["type"] == "image/x-png")
                    || ($_FILES["file"]["type"] == "image/png"))
                && ($_FILES["file"]["size"] < 2048000)   // 小于 2000 kb
                && in_array($extension, $allowedExts))
            {
                if ($_FILES["file"]["error"] > 0)
                {
                    echo "错误：: " . $_FILES["file"]["error"] . "<br>";
                }else{
                    // 如果 images 目录不存在该文件则将文件上传到 images 目录下
                    move_uploaded_file($_FILES["file"]["tmp_name"], "../images/" . $_FILES["file"]["name"]);
                    //echo "文件存储在: " . "../images/" . $_FILES["file"]["name"];
                    $sql='UPDATE `banner` SET title="'.$_POST['title'].'",img="images/'.$_FILES["file"]["name"].'" WHERE id="'.$_POST['id'].'"';
                    $res=$db->insert($sql);
                    if($res['flag']&&$res['row']!=0){
                        echo "<script>alert('修改成功！');location.href='banner-edit.php?act=updata&id=".$_POST['id']."';</script>";
                    }else{
                        echo "<script>alert('修改失败！');location.href='banner-edit.php?act=updata&id=".$_POST['id']."';</script>";
                    }
                }
            }else{
                echo "<script>alert('非法文件格式！');</script>";
            }
        }
    break;
    default:
        $arr=array('code'=>'-1','msg' => '小老弟干什么呢？');
        echo json_encode($arr);
}
?>
<!doctype html>
<html class="no-js">
<head>
  <title>轮播图-管理</title>
</head>
<body>
<?php include ("head.php") ?>
  <!-- content start -->
  <div class="admin-content">
    <div class="admin-content-body">
      <div class="am-cf am-padding am-padding-bottom-0">
        <div class="am-fl am-cf"><strong class="am-text-primary am-text-lg">轮播图</strong> / <small>管理</small></div>
      </div>
      <hr/>
      <div class="am-g">
        <div class="am-u-sm-12 am-u-md-4 am-u-md-push-8">
        </div>
        <div class="am-u-sm-12 am-u-md-8 am-u-md-pull-4">
          <form class="am-form am-form-horizontal" action="banner-edit.php?act=<?php echo $_GET['act']?>" method="post" enctype="multipart/form-data">
            <div class="am-form-group">
              <label for="user-name" class="am-u-sm-3 am-form-label">轮播标题</label>
              <div class="am-u-sm-9">
                <input type="hidden" name="id" value="<?php echo $data['id']?>">
                <input required type="text" name="title" value="<?php echo $data['title']?>" id="user-name" placeholder="轮播图标题">
                <small>输入轮播标题，更好分辨它</small>
              </div>
            </div>

            <div class="am-form-group">
                <label for="file" class="am-u-sm-3 am-form-label">轮播图片</label>
                <div class="am-u-sm-9">
                    <?php if($_GET['act']=="updata"):?>
                        <img src="../<?php echo $data['img']?>" width="400" height="200">
                        </br> </br>
                        <input type="file" name="file" id="file">
                    <?php else:?>
                        <input required type="file" name="file" id="file">
                    <?php endif ?>
                    <p class="am-form-help">请选择要上传的文件...</p>
                </div>
            </div>

            <div class="am-form-group">
              <div class="am-u-sm-9 am-u-sm-push-3">
                <button type="submit" class="am-btn am-btn-primary">保存修改</button>
              </div>
            </div>
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
<script src="http://libs.baidu.com/jquery/1.11.3/jquery.min.js"></script>
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
