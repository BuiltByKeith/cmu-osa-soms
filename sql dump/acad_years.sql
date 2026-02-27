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

 Date: 13/08/2024 12:56:10
*/

SET NAMES utf8mb4;
SET FOREIGN_KEY_CHECKS = 0;

-- ----------------------------
-- Table structure for acad_years
-- ----------------------------
DROP TABLE IF EXISTS `acad_years`;
CREATE TABLE `acad_years`  (
  `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT,
  `description` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `date_start` date NOT NULL,
  `date_end` date NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`) USING BTREE
) ENGINE = InnoDB AUTO_INCREMENT = 3 CHARACTER SET = utf8mb4 COLLATE = utf8mb4_unicode_ci ROW_FORMAT = DYNAMIC;

-- ----------------------------
-- Records of acad_years
-- ----------------------------
INSERT INTO `acad_years` VALUES (1, 'AY 2023-2024', '2023-08-08', '2024-06-15', '2023-08-08 20:16:50', '2024-06-15 20:17:04');
INSERT INTO `acad_years` VALUES (2, 'AY 2022-2023', '2022-08-08', '2023-06-16', NULL, NULL);

SET FOREIGN_KEY_CHECKS = 1;
