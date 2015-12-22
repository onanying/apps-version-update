/*
Navicat MySQL Data Transfer

Source Server         : localhost_3306
Source Server Version : 50626
Source Host           : localhost:3306
Source Database       : jianliu_appsversionupdate

Target Server Type    : MYSQL
Target Server Version : 50626
File Encoding         : 65001

Date: 2015-12-22 09:38:14
*/

SET FOREIGN_KEY_CHECKS=0;

-- ----------------------------
-- Table structure for `apps`
-- ----------------------------
DROP TABLE IF EXISTS `apps`;
CREATE TABLE `apps` (
  `id` smallint(5) unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(20) NOT NULL COMMENT '名称',
  `desc` varchar(60) NOT NULL COMMENT '描述',
  `sort` smallint(5) unsigned NOT NULL COMMENT '排序',
  `datetime` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8 COMMENT='APP列表';

-- ----------------------------
-- Records of apps
-- ----------------------------
INSERT INTO `apps` VALUES ('1', '我的APP', '我需要自动更新的APP', '0', '2015-12-21 09:04:38');

-- ----------------------------
-- Table structure for `manager`
-- ----------------------------
DROP TABLE IF EXISTS `manager`;
CREATE TABLE `manager` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `account` varchar(16) NOT NULL COMMENT '账号',
  `password` varchar(40) NOT NULL COMMENT '密码',
  `name` varchar(16) NOT NULL COMMENT '用户名',
  `level` tinyint(1) unsigned NOT NULL COMMENT '等级',
  PRIMARY KEY (`id`),
  UNIQUE KEY `account` (`account`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8 COMMENT='管理用户表';

-- ----------------------------
-- Records of manager
-- ----------------------------
INSERT INTO `manager` VALUES ('1', 'admin', '7c4a8d09ca3762af61e59520943dc26494f8941b', '管理员', '0');

-- ----------------------------
-- Table structure for `versions`
-- ----------------------------
DROP TABLE IF EXISTS `versions`;
CREATE TABLE `versions` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `apps_id` smallint(5) unsigned NOT NULL COMMENT 'apps表的id',
  `file_name` varchar(100) NOT NULL COMMENT '文件名',
  `version` varchar(20) NOT NULL COMMENT '版本号',
  `code` int(6) NOT NULL COMMENT '版本编号',
  `file_size` int(10) unsigned NOT NULL COMMENT '文件大小',
  `content_cn` varchar(500) NOT NULL COMMENT '更新内容-中文',
  `content_en` varchar(500) NOT NULL COMMENT '更新内容-英文',
  `compel` tinyint(1) NOT NULL COMMENT '强制更新',
  `datetime` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP COMMENT '更新时间',
  PRIMARY KEY (`id`),
  KEY `apps_id_code` (`apps_id`,`code`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COMMENT='安卓app版本列表';
