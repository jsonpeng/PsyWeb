/*
Navicat MySQL Data Transfer

Source Server         : 127.0.0.1
Source Server Version : 50714
Source Host           : localhost:3306
Source Database       : psyweb

Target Server Type    : MYSQL
Target Server Version : 50714
File Encoding         : 65001

Date: 2018-04-06 17:35:40
*/

SET FOREIGN_KEY_CHECKS=0;

-- ----------------------------
-- Table structure for menu_items
-- ----------------------------
#DROP TABLE IF EXISTS `menu_items`;


-- ----------------------------
-- Records of menu_items
-- ----------------------------
INSERT INTO `menu_items` VALUES ('1', '小小白', null, 'http://127.0.0.2/cat/1', null, '1', '2018-04-06 14:20:42', '2018-04-06 14:36:35', '2018-04-06 14:36:35');
INSERT INTO `menu_items` VALUES ('2', '首页', '0', 'http://127.0.0.2', null, '1', '2018-04-06 14:20:51', '2018-04-06 14:36:35', null);
INSERT INTO `menu_items` VALUES ('3', '大学成长', '1', 'http://127.0.0.2/cat/2', null, '1', '2018-04-06 14:20:58', '2018-04-06 14:36:35', null);
INSERT INTO `menu_items` VALUES ('4', '学习心理', '0', 'http://127.0.0.2/cat/3', '3', '1', '2018-04-06 14:20:59', '2018-04-06 14:36:35', null);
INSERT INTO `menu_items` VALUES ('5', '恋爱心理', '1', 'http://127.0.0.2/cat/4', '3', '1', '2018-04-06 14:20:59', '2018-04-06 14:36:35', null);
INSERT INTO `menu_items` VALUES ('6', '校园社交', '2', 'http://127.0.0.2/cat/5', null, '1', '2018-04-06 14:21:55', '2018-04-06 14:36:35', null);
INSERT INTO `menu_items` VALUES ('7', '舍友关系', '0', 'http://127.0.0.2/cat/6', '6', '1', '2018-04-06 14:21:56', '2018-04-06 14:36:35', null);
INSERT INTO `menu_items` VALUES ('8', '同学关系', '1', 'http://127.0.0.2/cat/7', '6', '1', '2018-04-06 14:21:57', '2018-04-06 14:36:35', null);
INSERT INTO `menu_items` VALUES ('9', '每日心理学', '3', 'http://127.0.0.2/cat/9', '6', '1', '2018-04-06 14:21:58', '2018-04-06 14:36:35', null);
INSERT INTO `menu_items` VALUES ('10', '每日心理学', '3', 'http://127.0.0.2/cat/9', null, '1', '2018-04-06 14:22:03', '2018-04-06 14:36:35', null);
INSERT INTO `menu_items` VALUES ('11', '心理测评', '0', 'http://127.0.0.2/cat/10', '10', '1', '2018-04-06 14:22:04', '2018-04-06 14:36:35', null);
INSERT INTO `menu_items` VALUES ('12', '心理指导', '1', 'http://127.0.0.2/cat/11', '10', '1', '2018-04-06 14:22:05', '2018-04-06 14:36:35', null);
INSERT INTO `menu_items` VALUES ('13', '心灵鸡汤', '4', 'http://127.0.0.2/cat/12', null, '1', '2018-04-06 14:22:06', '2018-04-06 14:40:20', null);
INSERT INTO `menu_items` VALUES ('14', '小小白', null, 'http://127.0.0.2/cat/1', null, '1', '2018-04-06 14:25:02', '2018-04-06 14:36:35', '2018-04-06 14:36:35');


/*
Navicat MySQL Data Transfer

Source Server         : 127.0.0.1
Source Server Version : 50714
Source Host           : localhost:3306
Source Database       : psyweb

Target Server Type    : MYSQL
Target Server Version : 50714
File Encoding         : 65001

Date: 2018-04-06 17:52:24
*/

SET FOREIGN_KEY_CHECKS=0;

-- ----------------------------
-- Table structure for banner_items
-- ----------------------------
DROP TABLE IF EXISTS `banner_items`;
CREATE TABLE `banner_items` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `image` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL COMMENT '图片',
  `link` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL COMMENT '跳转链接',
  `sort` int(11) DEFAULT NULL COMMENT '排序',
  `banner_id` int(10) unsigned NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL,
  `word` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `banner_items_banner_id_foreign` (`banner_id`)
) ENGINE=MyISAM AUTO_INCREMENT=5 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- ----------------------------
-- Records of banner_items
-- ----------------------------
INSERT INTO `banner_items` VALUES ('1', 'http://127.0.0.2/uploads/lp.jpg', null, null, '1', '2018-04-06 17:13:21', '2018-04-06 17:13:21', null, null);
INSERT INTO `banner_items` VALUES ('2', 'http://127.0.0.2/uploads/rBACE1PCcx7hhDPnAAMoRClvDvc721.jpg', null, null, '1', '2018-04-06 17:13:34', '2018-04-06 17:13:34', null, null);
INSERT INTO `banner_items` VALUES ('3', 'http://127.0.0.2/uploads/learn.jpg', null, null, '1', '2018-04-06 17:19:30', '2018-04-06 17:19:30', null, null);
INSERT INTO `banner_items` VALUES ('4', 'http://127.0.0.2/uploads/50219257341399599081.jpg', null, null, '1', '2018-04-06 17:19:36', '2018-04-06 17:19:36', null, null);

