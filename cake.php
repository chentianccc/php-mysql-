<?php
header("Content-Type: text/html;charset=utf-8");
//数据库类操作类
require_once "./includes/db.class.php";
$db=new db();
$sql1='SELECT * FROM cake';
$data1=$db->query($sql1);
//print_r($data1);
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
    <title>加一烘焙首页</title>
</head>
<body>
<?php include ("head.php")?>
<div class="content_tow">
    <div class="right">
        <div class="produce_content">
            <div class="produce_one">
                <?php foreach($data1 as $k=>$v){?>
                    <div class="pro_box"><a href=""><img src="<?php echo $v['img'] ?>" /><br>
                            <p><?php echo $v['name'] ?></p>
                            <br><p class="produce_p"><?php echo $v['miaoshu'] ?></p>
                        </a></div>
                <?php }?>
            </div>
        </div>
    </div>
</div>
<?php include ("foot.php") ?>
</body>
</html>