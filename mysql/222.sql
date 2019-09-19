/*
SQLyog Ultimate v11.3 (32 bit)
MySQL - 5.0.41-community-nt : Database - cake
*********************************************************************
*/

/*!40101 SET NAMES utf8 */;

/*!40101 SET SQL_MODE=''*/;

/*!40014 SET @OLD_UNIQUE_CHECKS=@@UNIQUE_CHECKS, UNIQUE_CHECKS=0 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;
/*!40111 SET @OLD_SQL_NOTES=@@SQL_NOTES, SQL_NOTES=0 */;
/*Table structure for table `banner` */

DROP TABLE IF EXISTS `banner`;

CREATE TABLE `banner` (
  `id` int(11) NOT NULL auto_increment,
  `title` varchar(255) default NULL,
  `img` varchar(255) default NULL,
  PRIMARY KEY  (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

/*Data for the table `banner` */

insert  into `banner`(`id`,`title`,`img`) values (1,'第一张轮播图','images/banner1.jpg'),(2,'第二张轮播图','images/banner2.jpg'),(3,'第三张轮播图','images/banner3.jpg'),(4,'第四张轮播图','images/banner5.jpg'),(5,'第五张轮播图','images/banner4.jpg');

/*Table structure for table `bread` */

DROP TABLE IF EXISTS `bread`;

CREATE TABLE `bread` (
  `id` int(10) unsigned NOT NULL auto_increment,
  `name` varchar(20) default NULL COMMENT '面包名字',
  `img` varchar(100) default NULL COMMENT '面包图片',
  PRIMARY KEY  (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

/*Data for the table `bread` */

insert  into `bread`(`id`,`name`,`img`) values (1,'熊抱巧克力吐司（整条）','images/br1.png'),(2,'熊抱原味匠心吐司','images/br2.png'),(3,'熊抱吐司经典套餐','images/br3.png'),(4,'熊抱吐司尊享套餐','images/br4.png'),(5,'熊抱吐司尊享套餐','images/br4.png'),(6,'熊抱吐司尊享套餐','images/br4.png'),(7,'熊抱巧克力吐司','images/bre_05.png'),(8,'熊抱原味吐司','images/bre_07.png'),(9,'熊抱原味吐司','images/bre_09.png'),(10,'熊抱栗子吐司（半条）','images/bre_15.png'),(11,'熊抱栗子吐司（整条）','images/bre_16.png'),(12,'熊抱莓粉吐司（草莓风味半条装）','images/bre_17.png'),(13,'熊抱莓粉吐司','images/bre_18.png'),(14,'莓你不行吐司','images/bre_23.png'),(15,'熊抱吐司超值套餐','images/bre_24.png'),(16,'熊抱栗子吐司（半条）','images/bre_15.png'),(17,'熊抱巧克力吐司（半条）','images/bre_03.png'),(18,'熊抱吐司超值套餐','images/bre_24.png');

/*Table structure for table `cake` */

DROP TABLE IF EXISTS `cake`;

CREATE TABLE `cake` (
  `id` int(10) NOT NULL auto_increment,
  `name` varchar(20) default NULL COMMENT '蛋糕名字',
  `miaoshu` varchar(100) default NULL COMMENT '蛋糕描述',
  `img` varchar(100) default NULL COMMENT '蛋糕图片',
  `fenlei` tinyint(4) default NULL COMMENT '蛋糕分类',
  PRIMARY KEY  (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

/*Data for the table `cake` */

insert  into `cake`(`id`,`name`,`miaoshu`,`img`,`fenlei`) values (1,'黑森林1','樱桃酒味，乐享滋味1','images/ommodity_03.png',1),(2,'平安夜','一层雪下，全享丝滑','images/ommodity_05.png',1),(3,'小重组','均一，千鹤，千层酥','images/ommodity_07.png',1),(4,'百利甜情人','新切的水果与刚折的玫瑰，甜美、渐浓','images/ommodity_09.png',1),(5,'榴莲香飘','丰厚乳脂奶油，打入足量榴莲果肉','images/ommodity_49.png',1),(6,'黑白巧克力','卡通定制撒粉，简单、柔软','images/ommodity_19.png',1),(7,'枣儿','红枣奶油戚风，与姜撞奶慕斯','images/ommodity_17.png',1),(8,'6口味切块','多口味，精装小份','images/ommodity_21.png',1),(9,'黑白巧克力慕斯','白巧克力慕斯的甜，与黑巧克力酱的苦','images/ommodity_36.png',2),(10,'朗姆芝士','清香柠檬与乳酪夹心，微苦、微醺','images/ommodity_45.png',2),(11,'冻慕斯与焗芝士','马斯卡彭慕斯，叠加法国软芝士','images/ommodity_47.png',2),(12,'冻慕斯与焗芝士','马斯卡彭慕斯，叠加法国软芝士','images/ommodity_49.png',2),(13,'黑白巧克力慕斯 彼尔德（Party）','孩子的世界，简单到非黑即白','images/ommodity_30.png',3),(14,'芒果奶油蛋糕','21cake配方芒果百香果慕斯夹心','images/ommodity_32.png',3),(15,'百香果酸乳酪慕斯（木糖醇','冰淇淋口感，不同层次的酸与冰凉','images/ommodity_34.png',3);

/*Table structure for table `coffee` */

DROP TABLE IF EXISTS `coffee`;

CREATE TABLE `coffee` (
  `id` int(10) unsigned NOT NULL auto_increment,
  `name` varchar(20) default NULL,
  `miaoshu` varchar(100) default NULL,
  `img` varchar(100) default NULL,
  PRIMARY KEY  (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

/*Data for the table `coffee` */

insert  into `coffee`(`id`,`name`,`miaoshu`,`img`) values (1,'经典-意大利500G','油脂丰富·浓香拼配','images/kf21_03.png'),(2,'经典-蓝山风味500G','口感顺滑均衡·富有水果味道','images/kf21_05.png'),(3,'经典-曼特宁500G','风味香浓·口感强烈','images/kf21_07.jpg');

/*Table structure for table `user` */

DROP TABLE IF EXISTS `user`;

CREATE TABLE `user` (
  `id` int(10) unsigned NOT NULL auto_increment,
  `title` varchar(255) default NULL,
  `name` varchar(255) default NULL,
  `tel` varchar(11) default NULL,
  `qq` varchar(10) default NULL,
  `email` varchar(100) default NULL,
  `text` varchar(1000) default NULL,
  PRIMARY KEY  (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

/*Data for the table `user` */

insert  into `user`(`id`,`title`,`name`,`tel`,`qq`,`email`,`text`) values (1,'问题咨询','陈甜','15136358062','8502221534','850222153@qq.com','啊啊啊啊啊啊啊');

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;
