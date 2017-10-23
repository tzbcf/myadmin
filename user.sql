# Host: localhost  (Version: 5.5.53)
# Date: 2017-10-19 18:29:48
# Generator: MySQL-Front 5.3  (Build 4.234)

/*!40101 SET NAMES utf8 */;

#
# Structure for table "tbl_banner"
#

DROP TABLE IF EXISTS `tbl_banner`;
CREATE TABLE `tbl_banner` (
  `Id` int(11) NOT NULL AUTO_INCREMENT,
  `img_src` varchar(255) DEFAULT NULL,
  `link` varchar(255) DEFAULT NULL,
  `banner_title` varchar(255) DEFAULT NULL,
  `sort` int(11) DEFAULT NULL,
  PRIMARY KEY (`Id`)
) ENGINE=MyISAM AUTO_INCREMENT=13 DEFAULT CHARSET=utf8;

#
# Data for table "tbl_banner"
#

/*!40000 ALTER TABLE `tbl_banner` DISABLE KEYS */;
INSERT INTO `tbl_banner` VALUES (1,'http://www.boyaa_api.com/Boyaa/Common/banner024.png','https://www.baidu.com','五四青年运动',1),(36,'http://www.boyaa_api.com/Boyaa/Common/banner024.png','https://www.baidu.com','天才少年',3);
/*!40000 ALTER TABLE `tbl_banner` ENABLE KEYS */;

#
# Structure for table "tbl_user"
#

DROP TABLE IF EXISTS `tbl_user`;
CREATE TABLE `tbl_user` (
  `Id` int(11) NOT NULL AUTO_INCREMENT,
  `username` varchar(255) DEFAULT NULL COMMENT '用户名',
  `password` varchar(255) DEFAULT NULL,
  `time` datetime DEFAULT NULL,
  `coding` varchar(4) DEFAULT NULL,
  `uid` int(11) DEFAULT NULL,
  PRIMARY KEY (`Id`)
) ENGINE=MyISAM AUTO_INCREMENT=4 DEFAULT CHARSET=utf8 COMMENT='用户';

#
# Data for table "tbl_user"
#

/*!40000 ALTER TABLE `tbl_user` DISABLE KEYS */;
INSERT INTO `tbl_user` VALUES (1,'abcd123','abcd12345','2017-10-16 12:19:35','agdf',2),(2,'adcd12345','adcd123456','2017-10-16 12:19:35','oude',1),(3,'adcd1234566','andd123456','2017-10-16 12:19:35','cqwe',3);
/*!40000 ALTER TABLE `tbl_user` ENABLE KEYS */;
