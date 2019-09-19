<?php
header("Content-Type: text/html;charset=utf-8");
//数据库类操作类
require_once "./includes/db.class.php";
$db=new db();
$sql1='SELECT * FROM cake WHERE fenlei=1';
$data1=$db->query($sql1);
$sql2='SELECT * FROM cake WHERE fenlei=2';
$data2=$db->query($sql2);
$sql3='SELECT * FROM cake WHERE fenlei=3';
$data3=$db->query($sql3);
//print_r($data);
/**
 * User: Xingkong
 * Date: 2018/12/20 0020
 * Time: 20:27
 */?>
<!-- 加一蛋糕，你的美味之选
    Jayicake,Your delicious choice
-->
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<body>
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
    <title>加一烘焙首页</title>
</head>
<?php include ("head.php") ?>
    <!--焦点幻灯结束-->
    <!--"新闻动态、关于我们、最新产品"形成的横向区域开始-->
    <div class="content-box">
        <div class="home-module home-menu">
            <a href="#1" name="menu_1">

                <img src="images/d349da941efba219856d5983958bdd81.jpg" alt="新品" title="新品" />
            </a>
            <a href="#2" name="menu_2">

                <img src="images/b6f731149b7076b524114c0d7c387da0.png" alt="生日" title="生日" />
            </a>
            <a href="#4" name="menu_3">

                <img src="images/0b331caf72a856549a98cf94d22cf3b3.png" alt="儿童" title="儿童" />
            </a>
            <a href="#5" name="menu_4">

                <img src="images/78c8a0592d41612c1f01ebe226d8b399.png" alt="聚会" title="聚会" />
            </a>
            <a href="#6" name="menu_5">

                <img src="images/82e473d51470b7151981ba05c81f5b6d.png" alt="活动专区" title="活动专区" />
            </a>
        </div>
        <div class="content_tow">
            <h1>新品/专区</h1>
            <img src="images/ommodity.png" alt="" style="margin-left:30px;">
            <div class="right">
                <!-- <div class="submenu"><a href="index.html">首页</a>-><a href="cpzs.html">面包</a></div> -->
                <div class="produce_content">
                <div class="produce_one">
                    <?php foreach($data1 as $k=>$v){?>
                        <div class="pro_box"><a href=""><img src="<?php echo $v['img'] ?>" /><br>
                                <p><?php echo $v['name'] ?></p>
                                <br><p class="produce_p"><?php echo $v['miaoshu'] ?></p>
                            </a></div>
                    <?php }?>

                </div>    
                    <!-- <div class="pro_box"><a href=""><img src="images/ommodity_23.png" /></a></div> -->
                <div class="produce_tow">
                <h1>生日/专区</h1>
                    <div class="pro_box"><a href=""><img src="images/ommodity_41.png" />
                    </a></div>
                    <?php foreach($data2 as $k=>$v){?>
                        <div class="pro_box"><a href=""><img src="<?php echo $v['img'] ?>" /><br>
                                <p><?php echo $v['name'] ?></p>
                                <br><p class="produce_p"><?php echo $v['miaoshu'] ?></p>
                            </a></div>
                    <?php }?>
                </div>  
                <div class="produce_four"> 
                <h1>儿童/专区</h1>    
                    <div class="pro_box"><a href=""><img src="images/ommodity_28.png" /></a></div>
                    <?php foreach($data3 as $k=>$v){?>
                        <div class="pro_box"><a href=""><img src="<?php echo $v['img'] ?>" /><br>
                                <p><?php echo $v['name'] ?></p>
                                <br><p class="produce_p"><?php echo $v['miaoshu'] ?></p>
                            </a></div>
                    <?php }?>
                </div>    
                    <!-- <div class="pro_box"><a href=""><img src="images/ommodity_.png" /></a></div> -->
                </div>
                <!-- <div class="page">
                    <a href="">|<</a> <a href="">
                            <<</a> <a href="">1</a>
                    <a href="">2</a>
                    <a href="">>></a>
                    <a href="">>|</a>
                </div> -->
            </div>
            <!--right结束-->
        </div>
    </div>
    <!--"新闻动态、关于我们、最新产品"形成的横向区域结束-->
    <!--页尾结束-->
<?php include ("foot.php") ?>
</body>

</html>