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

 Date: 13/08/2024 12:55:13
*/

SET NAMES utf8mb4;
SET FOREIGN_KEY_CHECKS = 0;

-- ----------------------------
-- Table structure for reach_of_activities
-- ----------------------------
DROP TABLE IF EXISTS `reach_of_activities`;
CREATE TABLE `reach_of_activities`  (
  `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT,
  `description` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`) USING BTREE
) ENGINE = InnoDB AUTO_INCREMENT = 5 CHARACTER SET = utf8mb4 COLLATE = utf8mb4_unicode_ci ROW_FORMAT = DYNAMIC;

-- ----------------------------
-- Records of reach_of_activities
-- ----------------------------
INSERT INTO `reach_of_activities` VALUES (1, 'University Wide', NULL, NULL);
INSERT INTO `reach_of_activities` VALUES (2, 'College Wide', NULL, NULL);
INSERT INTO `reach_of_activities` VALUES (3, 'Organization Wide', NULL, NULL);
INSERT INTO `reach_of_activities` VALUES (4, 'Batch Wide', NULL, NULL);

SET FOREIGN_KEY_CHECKS = 1;
