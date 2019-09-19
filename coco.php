<?php
header("Content-Type: text/html;charset=utf-8");
//数据库类操作类
require_once "./includes/db.class.php";
$db=new db();
$sql1='SELECT * FROM coffee';
$data1=$db->query($sql1);
/**
 * User: Xingkong
 * Date: 2018/12/20 0020
 * Time: 20:27
 */?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
    <title>咖啡下午茶</title>
    <link rel="stylesheet" href="css/coffee.css"/>
</head>
<body>
<?php include ("head.php") ?>
    <br/>
<h1>经典系列</h1>
    <div class="img"><img src="images/off33.png" width="990" height="524" /></div>
<div class="tp">
    <?php foreach($data1 as $k=>$v){?>
        <div class="tp1"><img src="<?php echo $v['img'] ?>" width="317" height="317" />
            <P><?php echo $v['name'] ?></P><br/>
            <P><p class="produce_p"></P>
        </div>
    <?php }?>
</div>
<div class="img2"><img src="images/off66.png" width="990" height="572" /></div>    
<!--产品展示结束-->
<?php include ("foot.php") ?>
</body>
</html>