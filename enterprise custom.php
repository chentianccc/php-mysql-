<?php
error_reporting(0);
header("Content-Type: text/html;charset=utf-8");
//数据库类操作类
require_once "./includes/db.class.php";
$db=new db();
if($_POST['title']!=null&&$_POST['name']!=null&&$_POST['email']!=null&&$_POST['content']!=null){
    $sql1='INSERT INTO `user` (title,NAME,tel,qq,email,TEXT) VALUES ("'.$_POST['title'].'","'.$_POST['name'].'","'.$_POST['tel'].'","'.$_POST['qq'].'","'.$_POST['email'].'","'.$_POST['content'].'")';
    $res1=$db->insert($sql1);
    if ($res1['flag']&&$res1['row']!=0){
        echo "<script>alert('提交成功！');location.href='enterprise custom.php';</script>";
    }else{
        echo "<script>alert('提交失败！');location.href='enterprise custom.php';</script>";

    }
}

//print_r($data1);
/**
 * User: Xingkong
 * Date: 2018/12/20 0020
 * Time: 20:27
 */?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
    <title>企业专区</title>
    <link rel="stylesheet" href="css/enterprise custom.css" />
</head>
<?php include ("head.php") ?>
<body>
    <!--给我留言区域开始-->
    <!--main开始-->
    <div class="main">
        <!--左侧slide-->
        <div class="right">
            <h1>尊享企业礼品卡兑换</h1>
            <div class="top1">
                    <img src="images/qy_05.png" alt="">
                    <img src="images/qy_07.png" alt="">
                    <img src="images/qy_09.png" alt=""><br>
                    <img src="images/qy_15.png" alt="" class="ont">
                    <img src="images/qy_17.png" alt="" class="ont">
                    <img src="images/1.png" alt="" class="ont">
            </div>
            <h1>普通企业礼品卡兑换</h1>
            <div class="top2">
                    <img src="images/qy_22.png" alt="" class="tow"><br>
                    <img src="images/qy_26.png" alt="">
                    <img src="images/qy_27.png" alt="">
            </div>
            <div class="guestbook_content">
                <form name="enterprise custom.php" id="form1" action="" method="post">
                    <ul>
                        <li class="title"><span class="muat">*</span>标题：
                        <input name="title" type="text" id="title" />
                    </ul>
                    <ul>
                        <li class="title"><span class="must">*</span>称呼：
                        <input name="name" type="text" id="name" />
                    </ul>
                    <ul>
                        <li class="title" style="margin-left: 7px;">手机：
                        <input name="tel" type="text" id="tel" />
                    </ul>
                    <ul>
                        <li class="title">&nbsp;QQ：
                        <input name="qq" type="text" id="qq" />
                    </ul>
                    <ul>
                        <li class="title"><span class="must">*</span>邮箱：
                        <input name="email" type="text" id="email" />
                    </ul>
                    <ul class="ct">
                        <li class="title"><span class="must">*</span>内容：
                            <textarea name="content" cols="60" rows="5" id="content"></textarea>
                    </ul>
                    <div class="button">
                        <input type="image" src="img/submit.png" />
                    </div>
                </form>
            </div>
            <!--right结束-->
        </div>
        <!--main结束-->
        <!--给我留言区域结束-->
<?php include ("foot.php") ?>
</body>
</html>