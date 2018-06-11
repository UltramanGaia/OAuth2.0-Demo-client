# Host: localhost  (Version: 5.5.53)
# Date: 2018-06-11 23:08:21
# Generator: MySQL-Front 5.3  (Build 4.234)

/*!40101 SET NAMES utf8 */;

#
# Structure for table "auth"
#

DROP TABLE IF EXISTS `auth`;
CREATE TABLE `auth` (
  `Id` int(11) NOT NULL AUTO_INCREMENT,
  `email` varchar(255) NOT NULL DEFAULT '',
  `accessToken` varchar(255) DEFAULT NULL,
  `refreshToken` varchar(255) DEFAULT NULL,
  `firstName` varchar(255) DEFAULT NULL,
  `lastName` varchar(255) DEFAULT NULL,
  PRIMARY KEY (`Id`)
) ENGINE=MyISAM AUTO_INCREMENT=2 DEFAULT CHARSET=utf8;

#
# Data for table "auth"
#

/*!40000 ALTER TABLE `auth` DISABLE KEYS */;
INSERT INTO `auth` VALUES (1,'ggboy@qq.com','tKEoBmBH01tudaWd','oBzg7mk9xKf2oYHU',NULL,NULL),(2,'ggboy@qq.com','Hb4NTZOXfY3qpPMT','mbP4gKyaWYkspHF1',NULL,NULL),(3,'ggboy@qq.com','5X2znyiEF2MownOO','NAXL2vsE4zNrDb6f',NULL,NULL),(4,'ggboy@qq.com','92ZToaE8DaAVCjLE','NZFOhzutniLp2GjP',NULL,NULL),(5,'ggboy@qq.com','hgY7jQAmuMsLxX9G','Us6WKFhVQTt6S19i',NULL,NULL);
/*!40000 ALTER TABLE `auth` ENABLE KEYS */;
