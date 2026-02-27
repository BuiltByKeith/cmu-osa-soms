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

 Date: 13/08/2024 12:55:53
*/

SET NAMES utf8mb4;
SET FOREIGN_KEY_CHECKS = 0;

-- ----------------------------
-- Table structure for activity_statuses
-- ----------------------------
DROP TABLE IF EXISTS `activity_statuses`;
CREATE TABLE `activity_statuses`  (
  `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT,
  `description` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`) USING BTREE
) ENGINE = InnoDB AUTO_INCREMENT = 6 CHARACTER SET = utf8mb4 COLLATE = utf8mb4_unicode_ci ROW_FORMAT = DYNAMIC;

-- ----------------------------
-- Records of activity_statuses
-- ----------------------------
INSERT INTO `activity_statuses` VALUES (1, 'Pending', NULL, NULL);
INSERT INTO `activity_statuses` VALUES (2, 'In Progress', NULL, NULL);
INSERT INTO `activity_statuses` VALUES (3, 'Completed', NULL, NULL);
INSERT INTO `activity_statuses` VALUES (4, 'Closed', NULL, NULL);
INSERT INTO `activity_statuses` VALUES (5, 'Cleared', NULL, NULL);

SET FOREIGN_KEY_CHECKS = 1;
