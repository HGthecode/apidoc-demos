/*
Navicat MySQL Data Transfer

Source Server         : hg
Source Server Version : 50726
Source Host           : localhost:3306
Source Database       : apidoc_demo

Target Server Type    : MYSQL
Target Server Version : 50726
File Encoding         : 65001

Date: 2022-11-02 16:56:23
*/

SET FOREIGN_KEY_CHECKS=0;

-- ----------------------------
-- Table structure for articles
-- ----------------------------
DROP TABLE IF EXISTS `articles`;
CREATE TABLE `articles` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(32) COLLATE utf8mb4_unicode_ci NOT NULL COMMENT '姓名',
  `age` int(11) NOT NULL COMMENT '年龄',
  `sex` tinyint(4) NOT NULL COMMENT '性别',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=12 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- ----------------------------
-- Records of articles
-- ----------------------------
INSERT INTO `articles` VALUES ('4', '张三', '20', '1', '2022-02-11 08:13:23', '2022-02-11 08:13:23');
INSERT INTO `articles` VALUES ('2', '李四', '19', '1', '2022-02-11 07:55:50', '2022-02-11 07:55:50');
INSERT INTO `articles` VALUES ('3', '王五', '20', '1', '2022-02-11 07:55:58', '2022-02-11 07:55:58');
INSERT INTO `articles` VALUES ('5', '张三1', '20', '1', '2022-02-11 08:21:23', '2022-02-11 08:21:23');
INSERT INTO `articles` VALUES ('6', '张三1', '201', '1', '2022-02-11 08:21:28', '2022-02-11 08:21:28');
INSERT INTO `articles` VALUES ('7', '张三2', '201', '1', '2022-02-11 08:26:22', '2022-02-11 08:26:22');
INSERT INTO `articles` VALUES ('10', 'd', '21', '2', '2022-03-01 14:22:51', '2022-03-01 14:23:39');
INSERT INTO `articles` VALUES ('11', 'a', '1', '2', '2022-03-01 14:23:07', '2022-03-01 14:23:07');

-- ----------------------------
-- Table structure for auth_function
-- ----------------------------
DROP TABLE IF EXISTS `auth_function`;
CREATE TABLE `auth_function` (
  `id` int(11) NOT NULL AUTO_INCREMENT COMMENT '唯一id',
  `name` varchar(32) NOT NULL COMMENT '名称',
  `value` varchar(32) NOT NULL COMMENT '权限值',
  `pid` int(11) DEFAULT NULL COMMENT '父级id',
  `sort` int(10) NOT NULL DEFAULT '0' COMMENT '排序',
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=71 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of auth_function
-- ----------------------------
INSERT INTO `auth_function` VALUES ('5', '文档编辑', 'doc', null, '1');
INSERT INTO `auth_function` VALUES ('47', '新增', 'add', '17', '1');
INSERT INTO `auth_function` VALUES ('12', '用户管理', 'user', null, '20');
INSERT INTO `auth_function` VALUES ('13', '新增', 'add', '12', '1');
INSERT INTO `auth_function` VALUES ('14', '编辑', 'edit', '12', '2');
INSERT INTO `auth_function` VALUES ('15', '删除', 'del', '12', '3');
INSERT INTO `auth_function` VALUES ('16', '重置密码', 'reset', '12', '4');
INSERT INTO `auth_function` VALUES ('17', '角色管理', 'role', null, '30');
INSERT INTO `auth_function` VALUES ('18', '系统设置', 'set', null, '60');
INSERT INTO `auth_function` VALUES ('20', '系统参数', 'sysparam', '18', '0');
INSERT INTO `auth_function` VALUES ('50', '删除', 'del', '17', '3');
INSERT INTO `auth_function` VALUES ('49', '编辑', 'edit', '17', '2');
INSERT INTO `auth_function` VALUES ('48', '查看', 'view', '17', '0');
INSERT INTO `auth_function` VALUES ('46', '新增', 'add', '42', '1');
INSERT INTO `auth_function` VALUES ('45', '删除', 'del', '42', '3');
INSERT INTO `auth_function` VALUES ('44', '编辑', 'edit', '42', '2');
INSERT INTO `auth_function` VALUES ('43', '查看', 'view', '42', '0');
INSERT INTO `auth_function` VALUES ('42', '文章', 'article', null, '10');
INSERT INTO `auth_function` VALUES ('41', '删除', 'del', '5', '3');
INSERT INTO `auth_function` VALUES ('40', '编辑', 'edit', '5', '2');
INSERT INTO `auth_function` VALUES ('39', '新增', 'add', '5', '1');
INSERT INTO `auth_function` VALUES ('38', '查看', 'view', '5', '0');

-- ----------------------------
-- Table structure for goods
-- ----------------------------
DROP TABLE IF EXISTS `goods`;
CREATE TABLE `goods` (
  `id` bigint(20) NOT NULL AUTO_INCREMENT,
  `shop_id` bigint(20) NOT NULL COMMENT '店铺ID',
  `admin_user_id` bigint(20) NOT NULL,
  `goods_cate_id` int(11) DEFAULT NULL COMMENT '分类ID',
  `name` varchar(200) COLLATE utf8_unicode_ci NOT NULL COMMENT '商品名',
  `description` varchar(1000) COLLATE utf8_unicode_ci DEFAULT '2' COMMENT '简介',
  `content` text COLLATE utf8_unicode_ci COMMENT '内容',
  `test_id` int(11) DEFAULT '1',
  PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- ----------------------------
-- Records of goods
-- ----------------------------

-- ----------------------------
-- Table structure for lang
-- ----------------------------
DROP TABLE IF EXISTS `lang`;
CREATE TABLE `lang` (
  `id` int(11) NOT NULL AUTO_INCREMENT COMMENT 'id',
  `title` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL COMMENT '标题，lang(apidoc.table.lang.title)',
  `name` varchar(32) COLLATE utf8_unicode_ci DEFAULT NULL COMMENT '姓名，lang(apidoc.table.lang.name)',
  `sex` tinyint(1) DEFAULT NULL COMMENT '性别，lang(apidoc.table.lang.sex)',
  `age` int(3) DEFAULT NULL COMMENT '年龄，lang(apidoc.table.lang.age)',
  PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- ----------------------------
-- Records of lang
-- ----------------------------

-- ----------------------------
-- Table structure for order
-- ----------------------------
DROP TABLE IF EXISTS `order`;
CREATE TABLE `order` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `ddno` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL COMMENT '单号',
  `userid` int(11) DEFAULT NULL COMMENT '用户id',
  `money` decimal(11,2) DEFAULT NULL COMMENT '金额',
  `name` varchar(32) COLLATE utf8_unicode_ci DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=4 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- ----------------------------
-- Records of order
-- ----------------------------
INSERT INTO `order` VALUES ('1', 'a1', '33', '1.00', '张三');
INSERT INTO `order` VALUES ('2', 'a2', '34', '2.00', '李四');
INSERT INTO `order` VALUES ('3', 'a3', '33', '3.00', '张三');

-- ----------------------------
-- Table structure for roster
-- ----------------------------
DROP TABLE IF EXISTS `roster`;
CREATE TABLE `roster` (
  `id` int(11) NOT NULL AUTO_INCREMENT COMMENT '唯一id',
  `name` varchar(32) COLLATE utf8_unicode_ci NOT NULL COMMENT '姓名',
  `sex` int(1) DEFAULT NULL COMMENT '性别；1=男，2=女',
  `age` int(3) DEFAULT NULL COMMENT '年龄',
  `phone` varchar(11) COLLATE utf8_unicode_ci NOT NULL COMMENT '手机号码',
  `create_time` int(10) DEFAULT NULL COMMENT '创建时间',
  `update_time` int(10) DEFAULT NULL COMMENT '最后修改时间',
  `delete_time` int(10) DEFAULT NULL,
  `money` float(8,2) DEFAULT NULL COMMENT '余额',
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=6 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- ----------------------------
-- Records of roster
-- ----------------------------
INSERT INTO `roster` VALUES ('1', '张三', '1', '19', '1597779888', '1609336721', '1609336721', null, null);
INSERT INTO `roster` VALUES ('3', '李四1', '1', '22', '12345678999', '1610941886', '1610941886', null, null);
INSERT INTO `roster` VALUES ('4', 'varchar(32)', '1', '10', 'varchar(11)', '1611278464', '1611278464', null, null);
INSERT INTO `roster` VALUES ('5', '多多', '1', '25', '123456789', '1612965106', '1612965106', null, null);

-- ----------------------------
-- Table structure for user
-- ----------------------------
DROP TABLE IF EXISTS `user`;
CREATE TABLE `user` (
  `id` int(11) NOT NULL AUTO_INCREMENT COMMENT '用户id',
  `username` varchar(64) DEFAULT NULL COMMENT '用户名mock(@name)',
  `nickname` varchar(64) DEFAULT NULL COMMENT '昵称mock(@cname)',
  `password` char(64) NOT NULL COMMENT '登录密码',
  `avatar` varchar(255) DEFAULT NULL COMMENT '头像',
  `regip` bigint(11) DEFAULT NULL COMMENT '注册IP',
  `update_time` int(11) unsigned DEFAULT NULL COMMENT '更新时间',
  `state` tinyint(1) DEFAULT '1' COMMENT '状态',
  `phone` char(32) DEFAULT NULL COMMENT '联系电话',
  `create_time` int(10) DEFAULT NULL COMMENT '创建时间',
  `sex` tinyint(1) unsigned DEFAULT '0' COMMENT '性别,lang(apidoc.lang.sex)',
  `delete_time` int(10) DEFAULT NULL COMMENT '删除时间',
  `role` varchar(64) DEFAULT NULL COMMENT '角色mdRef="/docs/apiDesc.md#role字段"',
  `name` varchar(64) DEFAULT NULL COMMENT '姓名',
  `created_at` timestamp NULL DEFAULT NULL ON UPDATE CURRENT_TIMESTAMP,
  `updated_at` timestamp NULL DEFAULT NULL ON UPDATE CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=41 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of user
-- ----------------------------
INSERT INTO `user` VALUES ('33', 'test10', '测试10', 'c54731e6344dbe60c5092f120dd7d9b0', null, null, '1607321361', '1', null, '1607321361', '1', null, null, null, null, null);
INSERT INTO `user` VALUES ('34', 'test11', '测试11', 'c54731e6344dbe60c5092f120dd7d9b0', null, null, '1607321383', '1', null, '1607321383', '2', null, null, null, null, null);
INSERT INTO `user` VALUES ('35', 'test12', '测试12', 'c54731e6344dbe60c5092f120dd7d9b0', null, null, '1607321398', '1', null, '1607321398', '2', null, null, null, null, null);
INSERT INTO `user` VALUES ('36', 'test1311', '测试1311', 'c54731e6344dbe60c5092f120dd7d9b0', null, null, '1607321418', '1', null, '1607321418', '1', null, null, null, '2022-06-20 10:45:37', '2022-06-20 02:45:37');
