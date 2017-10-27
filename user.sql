# Host: localhost  (Version: 5.5.53)
# Date: 2017-10-27 18:27:23
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
) ENGINE=MyISAM AUTO_INCREMENT=72 DEFAULT CHARSET=utf8;

#
# Data for table "tbl_banner"
#

/*!40000 ALTER TABLE `tbl_banner` DISABLE KEYS */;
INSERT INTO `tbl_banner` VALUES (1,'http://www.boyaa_api.com/Boyaa/Common/banner024.png','https://www.boyaa.com','五四青年运动中啊啊',1),(36,'http://www.boyaa_api.com/Boyaa/Common/banner024.png','https://www.baidu.com','天才少年',3),(64,'http://www.boyaa_api.com/Boyaa/Common/img/1508904114.jpeg','1111','111111',2),(65,'http://www.boyaa_api.com/Boyaa/Common/img/1508912649.jpeg','https://www.baidu.com','非常少年',4),(70,'http://www.boyaa_api.com/Boyaa/Common/img/1508913957.jpeg','1231312','321321231231',5);
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
  `name` varchar(25) DEFAULT NULL,
  `phone` bigint(16) DEFAULT NULL,
  `role1` int(11) DEFAULT NULL,
  `role2` int(11) DEFAULT NULL,
  `role3` int(11) DEFAULT NULL,
  PRIMARY KEY (`Id`)
) ENGINE=MyISAM AUTO_INCREMENT=7 DEFAULT CHARSET=utf8 COMMENT='用户';

#
# Data for table "tbl_user"
#

/*!40000 ALTER TABLE `tbl_user` DISABLE KEYS */;
INSERT INTO `tbl_user` VALUES (1,'abcd123','abcd12345','2017-10-16 12:19:35','agdf','陈一',13011110000,2,6,NULL),(2,'adcd12345','adcd123456','2017-10-16 12:19:35','oude','陈二',13100001111,2,1,NULL),(3,'adcd1234566','andd123456','2017-10-16 12:19:35','cqwe','陈三',15000001111,3,1,1),(5,'abc12345','absc1213114','2017-10-16 12:19:35','escd','陈四',13100022222,3,6,1),(6,'admin','admin','2017-10-16 12:19:35','abcd','陈老板',13300000000,1,NULL,NULL);
/*!40000 ALTER TABLE `tbl_user` ENABLE KEYS */;
