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

 Date: 13/08/2024 12:55:58
*/

SET NAMES utf8mb4;
SET FOREIGN_KEY_CHECKS = 0;

-- ----------------------------
-- Table structure for activity_categories
-- ----------------------------
DROP TABLE IF EXISTS `activity_categories`;
CREATE TABLE `activity_categories`  (
  `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT,
  `description` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`) USING BTREE
) ENGINE = InnoDB AUTO_INCREMENT = 4 CHARACTER SET = utf8mb4 COLLATE = utf8mb4_unicode_ci ROW_FORMAT = DYNAMIC;

-- ----------------------------
-- Records of activity_categories
-- ----------------------------
INSERT INTO `activity_categories` VALUES (1, 'Calendar of Activity', NULL, NULL);
INSERT INTO `activity_categories` VALUES (2, 'Unincluded Activity', NULL, NULL);
INSERT INTO `activity_categories` VALUES (3, 'Operational Expenses', NULL, NULL);

SET FOREIGN_KEY_CHECKS = 1;
