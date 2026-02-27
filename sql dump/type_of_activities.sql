/*
 Navicat Premium Data Transfer

 Source Server         : local
 Source Server Type    : MySQL
 Source Server Version : 80031
 Source Host           : localhost:3306
 Source Schema         : ojt_osa

 Target Server Type    : MySQL
 Target Server Version : 80031
 File Encoding         : 65001

 Date: 13/08/2024 12:54:37
*/

SET NAMES utf8mb4;
SET FOREIGN_KEY_CHECKS = 0;

-- ----------------------------
-- Table structure for type_of_activities
-- ----------------------------
DROP TABLE IF EXISTS `type_of_activities`;
CREATE TABLE `type_of_activities`  (
  `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT,
  `description` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`) USING BTREE
) ENGINE = InnoDB AUTO_INCREMENT = 7 CHARACTER SET = utf8mb4 COLLATE = utf8mb4_unicode_ci ROW_FORMAT = DYNAMIC;

-- ----------------------------
-- Records of type_of_activities
-- ----------------------------
INSERT INTO `type_of_activities` VALUES (1, 'Assembly', NULL, NULL);
INSERT INTO `type_of_activities` VALUES (2, 'Meeting', NULL, NULL);
INSERT INTO `type_of_activities` VALUES (3, 'Gathering', NULL, NULL);
INSERT INTO `type_of_activities` VALUES (4, 'Mass', NULL, NULL);
INSERT INTO `type_of_activities` VALUES (5, 'Research', NULL, NULL);
INSERT INTO `type_of_activities` VALUES (6, 'Seminar', NULL, NULL);

SET FOREIGN_KEY_CHECKS = 1;
