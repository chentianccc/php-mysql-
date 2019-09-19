<?php
header("Content-Type: text/html;charset=utf-8");
//数据库类操作类
require_once "./includes/db.class.php";
$db=new db();
$sql='SELECT img FROM banner';
$data=$db->query($sql);
//print_r($data);
/**
 * User: Xingkong
 * Date: 2018/12/20 0020
 * Time: 20:27
 */?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="css/style.css">
    <link rel="stylesheet" href="css/public.css">
    <!-- 引入头部和导航css -->
    <link rel="stylesheet" href="css/swiper.min.css">
    <link rel="stylesheet" href="css/footer.css">
    <!-- 引入底部css -->
    <script type="text/javascript" src="js/jquery.min.js"></script>
    <script type="text/javascript" src="js/swiper.min.js"></script>
    <script type="text/javascript">
        // bunner轮播
        $(document).ready(function () {

            $("#menu2 li a").wrapInner('<p class="out"></p>');

            $("#menu2 li a").each(function () {
                $('<p class="over">' + $(this).text() + '</p>').appendTo(this);
            });

            $("#menu2 li a").hover(function () {
                $(".out", this).stop().animate({
                    'top': '48px'
                }, 300); // move down - hide
                $(".over", this).stop().animate({
                    'top': '0px'
                }, 300); // move down - show

            }, function () {
                $(".out", this).stop().animate({
                    'top': '0px'
                }, 300); // move up - show
                $(".over", this).stop().animate({
                    'top': '-48px'
                }, 300); // move up - hide
            });

            // 轮播图
            var swiper = new Swiper('.swiper-container', {
                pagination: {
                    el: '.swiper-pagination',
                    clickable: true,
                    renderBullet: function (index, className) {
                        return '<p class="' + className + '"></p>';
                    },
                },
                navigation: {
                    nextEl: '.swiper-button-next',
                    prevEl: '.swiper-button-prev',
                },
                autoplay: {
                    delay: 2700,
                    disableOnInteraction: false,
                },
            });

        });

        // 小框轮播
        $(document).ready(function () {
            var length,
                currentIndex = 0,
                interval,
                hasStarted = false, //是否已经开始轮播
                t = 2000; //轮播时间间隔
            length = $('.slider-panel').length;

            //将除了第一张图片隐藏
            $('.slider-panel:not(:first)').hide();
            //将第一个slider-item设为激活状态
            $('.slider-item:first').addClass('slider-item-selected');
            //隐藏向前、向后翻按钮
            $('.slider-page').hide();

            //鼠标上悬时显示向前、向后翻按钮,停止滑动，鼠标离开时隐藏向前、向后翻按钮，开始滑动
            $('.slider-panel, .slider-pre, .slider-next').hover(function () {
                stop();
                $('.slider-page').show();
            }, function () {
                $('.slider-page').hide();
                start();
            });

            $('.slider-item').hover(function (e) {
                stop();
                var preIndex = $(".slider-item").filter(".slider-item-selected").index();
                currentIndex = $(this).index();
                play(preIndex, currentIndex);
            }, function () {
                start();
            });

            $('.slider-pre').unbind('click');
            $('.slider-pre').bind('click', function () {
                pre();
            });
            $('.slider-next').unbind('click');
            $('.slider-next').bind('click', function () {
                next();
            });

            /**
             * 向前翻页
             */
            function pre() {
                var preIndex = currentIndex;
                currentIndex = (--currentIndex + length) % length;
                play(preIndex, currentIndex);
            }
            /**
             * 向后翻页
             */
            function next() {
                var preIndex = currentIndex;
                currentIndex = ++currentIndex % length;
                play(preIndex, currentIndex);
            }
            /**
             * 从preIndex页翻到currentIndex页
             * preIndex 整数，翻页的起始页
             * currentIndex 整数，翻到的那页
             */
            function play(preIndex, currentIndex) {
                $('.slider-panel').eq(preIndex).fadeOut(500)
                    .parent().children().eq(currentIndex).fadeIn(1000);
                $('.slider-item').removeClass('slider-item-selected');
                $('.slider-item').eq(currentIndex).addClass('slider-item-selected');
            }

            /**
             * 开始轮播
             */
            function start() {
                if (!hasStarted) {
                    hasStarted = true;
                    interval = setInterval(next, t);
                }
            }
            /**
             * 停止轮播
             */
            function stop() {
                clearInterval(interval);
                hasStarted = false;
            }

            //开始轮播
            start();
        });
    </script>
</head>

<body>
<!--页头开始-->
<div class="header">
    <div class="header-nav">
        <a class="header-logo" href="/">
            <img src="images/logo111_03.png" alt="加一蛋糕" style="width: 90px;height: 80px;margin-left: 50px; margin-top:-10px" />
            <!-- <img src="images/logo_1.png" alt=""> -->
        </a>
        <ul class="nav-box">
            <li><a href="index.php">首页</a></li>
            <li><a href="cake.php" target="_self">蛋糕</a></li>
            <li><a href="break.php" target="_self">面包</a></li>
            <li><a href="coco.php" target="_self">咖啡下午茶</a></li>
            <li><a href="enterprise custom.php" target="_self">企业专区</a></li>
        </ul>
        <div class="right-city-user">
            <p class="not-login"><a href="/passport-login.do">登录</a>/<a href="/passport-sign_up.do">注册</a></p>
            <a href="/member.html" class="header-user" data-id='header-user'>

                <img src="images/user-img.png" alt="21cake user icon" />
                <!-- <img src="images/user-img_1.png" alt=""> -->
            </a>
            <a href="/cart.do" class="header-cart" id="cart-count-icon">
                <i></i>
            </a>

            <ul class="header-user-list  header-select" id="header-user">
                <li><a href="/passport-logout.do" target="_self">退出登录</a></li>
            </ul>
            <ul class="message-list-header  header-select" id="messageList">
                <li><a href="/message/center.html" target="_blank">通知</a></li>
                <li><a href="/message/center.html?#delivery" target="_blank">物流</a></li>
            </ul>
            <dl class="app-list  header-select" id="app-list">
                <dt>


                    <!-- <img src="images/app.jpg" alt=""> -->
                </dt>
                <dd>下载享更多优惠</dd>
            </dl>
        </div>
    </div>
</div>
</div>

<ul class="cart-sales cart-area" style="position: absolute; top:80px;left:50%;margin-left: -600px;z-index: 100000;">
    <li>
        <ul id="cart-events-box">
        </ul>
    </li>
</ul>
<!--页头结束-->
<!--焦点幻灯开始-->
<!-- 轮播图 -->
<div class="swiper-container" id="toubu">
    <div class="swiper-wrapper">
        <div class="swiper-slide">
            <img src="<?php echo $data[0]['img'] ?>" />
        </div>
        <div class="swiper-slide">
            <img src="<?php echo $data[1]['img'] ?>" />
        </div>
        <div class="swiper-slide">
            <img src="<?php echo $data[2]['img'] ?>" />
        </div>
        <div class="swiper-slide">
            <img src="<?php echo $data[3]['img'] ?>" />
        </div>
        <div class="swiper-slide">
            <img src="<?php echo $data[4]['img'] ?>" />
        </div>
    </div>
    <!-- Add Pagination -->
    <div class="swiper-pagination"></div>
    <!-- Add Arrows -->
    <div class="swiper-button-next"></div>
    <div class="swiper-button-prev"></div>
</div>
<!--焦点幻灯结束-->
</body>
</html>
