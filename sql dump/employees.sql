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

 Date: 13/08/2024 12:55:29
*/

SET NAMES utf8mb4;
SET FOREIGN_KEY_CHECKS = 0;

-- ----------------------------
-- Table structure for employees
-- ----------------------------
DROP TABLE IF EXISTS `employees`;
CREATE TABLE `employees`  (
  `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT,
  `employee_id` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `firstname` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `middlename` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `lastname` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `extname` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NULL DEFAULT NULL,
  `sex` int NOT NULL,
  `contact_no` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`) USING BTREE
) ENGINE = InnoDB AUTO_INCREMENT = 113 CHARACTER SET = utf8mb4 COLLATE = utf8mb4_unicode_ci ROW_FORMAT = DYNAMIC;

-- ----------------------------
-- Records of employees
-- ----------------------------
INSERT INTO `employees` VALUES (1, '2020301112', 'Employee', 'Sa', 'CMU', '', 1, '9123456789', NULL, NULL);
INSERT INTO `employees` VALUES (2, '2020301112', 'Employee', 'Sa', 'CMU', '', 1, '9123456789', NULL, NULL);
INSERT INTO `employees` VALUES (3, '2020301112', 'Employee', 'Sa', 'CMU', '', 1, '9123456789', NULL, NULL);
INSERT INTO `employees` VALUES (4, '2020301112', 'Employee', 'Sa', 'CMU', '', 1, '9123456789', NULL, NULL);
INSERT INTO `employees` VALUES (5, '2020301112', 'Employee', 'Sa', 'CMU', '', 0, '9123456789', NULL, NULL);
INSERT INTO `employees` VALUES (6, '2020301112', 'Employee', 'Sa', 'CMU', '', 0, '9123456789', NULL, NULL);
INSERT INTO `employees` VALUES (7, '2020301112', 'Employee', 'Sa', 'CMU', '', 0, '9123456789', NULL, NULL);
INSERT INTO `employees` VALUES (8, '2020301112', 'Employee', 'Sa', 'CMU', '', 0, '9123456789', NULL, NULL);
INSERT INTO `employees` VALUES (9, '2020301112', 'Employee', 'Sa', 'CMU', '', 0, '9123456789', NULL, NULL);
INSERT INTO `employees` VALUES (10, '2020301112', 'Employee', 'Sa', 'CMU', '', 1, '9123456789', NULL, NULL);
INSERT INTO `employees` VALUES (11, '2020301112', 'Employee', 'Sa', 'CMU', '', 1, '9123456789', NULL, NULL);
INSERT INTO `employees` VALUES (12, '2020301112', 'Employee', 'Sa', 'CMU', '', 1, '9123456789', NULL, NULL);
INSERT INTO `employees` VALUES (13, '2020301112', 'Employee', 'Sa', 'CMU', '', 1, '9123456789', NULL, NULL);
INSERT INTO `employees` VALUES (14, '2020301112', 'Employee', 'Sa', 'CMU', '', 1, '9123456789', NULL, NULL);
INSERT INTO `employees` VALUES (15, '2020301112', 'Employee', 'Sa', 'CMU', '', 1, '9123456789', NULL, NULL);
INSERT INTO `employees` VALUES (16, '2020301112', 'Employee', 'Sa', 'CMU', '', 1, '9123456789', NULL, NULL);
INSERT INTO `employees` VALUES (17, '2020301112', 'Employee', 'Sa', 'CMU', '', 1, '9123456789', NULL, NULL);
INSERT INTO `employees` VALUES (18, '2020301112', 'Employee', 'Sa', 'CMU', '', 1, '9123456789', NULL, NULL);
INSERT INTO `employees` VALUES (19, '2020301112', 'Employee', 'Sa', 'CMU', '', 1, '9123456789', NULL, NULL);
INSERT INTO `employees` VALUES (20, '2020301112', 'Employee', 'Sa', 'CMU', '', 1, '9123456789', NULL, NULL);
INSERT INTO `employees` VALUES (21, '2020301112', 'Employee', 'Sa', 'CMU', '', 1, '9123456789', NULL, NULL);
INSERT INTO `employees` VALUES (22, '2020301112', 'Employee', 'Sa', 'CMU', '', 1, '9123456789', NULL, NULL);
INSERT INTO `employees` VALUES (23, '2020301112', 'Employee', 'Sa', 'CMU', '', 1, '9123456789', NULL, NULL);
INSERT INTO `employees` VALUES (24, '2020301112', 'Employee', 'Sa', 'CMU', '', 1, '9123456789', NULL, NULL);
INSERT INTO `employees` VALUES (25, '2020301112', 'Employee', 'Sa', 'CMU', '', 1, '9123456789', NULL, NULL);
INSERT INTO `employees` VALUES (26, '2020301112', 'Employee', 'Sa', 'CMU', '', 1, '9123456789', NULL, NULL);
INSERT INTO `employees` VALUES (27, '2020301112', 'Employee', 'Sa', 'CMU', '', 1, '9123456789', NULL, NULL);
INSERT INTO `employees` VALUES (28, '2020301112', 'Employee', 'Sa', 'CMU', '', 1, '9123456789', NULL, NULL);
INSERT INTO `employees` VALUES (29, '2020301112', 'Employee', 'Sa', 'CMU', '', 1, '9123456789', NULL, NULL);
INSERT INTO `employees` VALUES (30, '2020301112', 'Employee', 'Sa', 'CMU', '', 1, '9123456789', NULL, NULL);
INSERT INTO `employees` VALUES (31, '2020301112', 'Employee', 'Sa', 'CMU', '', 1, '9123456789', NULL, NULL);
INSERT INTO `employees` VALUES (32, '2020301112', 'Employee', 'Sa', 'CMU', '', 1, '9123456789', NULL, NULL);
INSERT INTO `employees` VALUES (33, '2020301112', 'Employee', 'Sa', 'CMU', '', 1, '9123456789', NULL, NULL);
INSERT INTO `employees` VALUES (34, '2020301112', 'Employee', 'Sa', 'CMU', '', 1, '9123456789', NULL, NULL);
INSERT INTO `employees` VALUES (35, '2020301112', 'Employee', 'Sa', 'CMU', '', 1, '9123456789', NULL, NULL);
INSERT INTO `employees` VALUES (36, '2020301112', 'Employee', 'Sa', 'CMU', '', 1, '9123456789', NULL, NULL);
INSERT INTO `employees` VALUES (37, '2020301112', 'Employee', 'Sa', 'CMU', '', 1, '9123456789', NULL, NULL);
INSERT INTO `employees` VALUES (38, '2020301112', 'Employee', 'Sa', 'CMU', '', 1, '9123456789', NULL, NULL);
INSERT INTO `employees` VALUES (39, '2020301112', 'Employee', 'Sa', 'CMU', '', 1, '9123456789', NULL, NULL);
INSERT INTO `employees` VALUES (40, '2020301112', 'Employee', 'Sa', 'CMU', '', 1, '9123456789', NULL, NULL);
INSERT INTO `employees` VALUES (41, '2020301112', 'Employee', 'Sa', 'CMU', '', 1, '9123456789', NULL, NULL);
INSERT INTO `employees` VALUES (42, '2020301112', 'Employee', 'Sa', 'CMU', '', 1, '9123456789', NULL, NULL);
INSERT INTO `employees` VALUES (43, '2020301112', 'Employee', 'Sa', 'CMU', '', 1, '9123456789', NULL, NULL);
INSERT INTO `employees` VALUES (44, '2020301112', 'Employee', 'Sa', 'CMU', '', 1, '9123456789', NULL, NULL);
INSERT INTO `employees` VALUES (45, '2020301112', 'Employee', 'Sa', 'CMU', '', 0, '9123456789', NULL, NULL);
INSERT INTO `employees` VALUES (46, '2020301112', 'Employee', 'Sa', 'CMU', '', 0, '9123456789', NULL, NULL);
INSERT INTO `employees` VALUES (47, '2020301112', 'Employee', 'Sa', 'CMU', '', 0, '9123456789', NULL, NULL);
INSERT INTO `employees` VALUES (48, '2020301112', 'Employee', 'Sa', 'CMU', '', 0, '9123456789', NULL, NULL);
INSERT INTO `employees` VALUES (49, '2020301112', 'Employee', 'Sa', 'CMU', '', 0, '9123456789', NULL, NULL);
INSERT INTO `employees` VALUES (50, '2020301112', 'Employee', 'Sa', 'CMU', '', 0, '9123456789', NULL, NULL);
INSERT INTO `employees` VALUES (51, '2020301112', 'Employee', 'Sa', 'CMU', '', 0, '9123456789', NULL, NULL);
INSERT INTO `employees` VALUES (52, '2020301112', 'Employee', 'Sa', 'CMU', '', 0, '9123456789', NULL, NULL);
INSERT INTO `employees` VALUES (53, '2020301112', 'Employee', 'Sa', 'CMU', '', 0, '9123456789', NULL, NULL);
INSERT INTO `employees` VALUES (54, '2020301112', 'Employee', 'Sa', 'CMU', '', 0, '9123456789', NULL, NULL);
INSERT INTO `employees` VALUES (55, '2020301112', 'Employee', 'Sa', 'CMU', '', 0, '9123456789', NULL, NULL);
INSERT INTO `employees` VALUES (56, '2020301112', 'Employee', 'Sa', 'CMU', '', 0, '9123456789', NULL, NULL);
INSERT INTO `employees` VALUES (57, '2020301112', 'Employee', 'Sa', 'CMU', '', 0, '9123456789', NULL, NULL);
INSERT INTO `employees` VALUES (58, '2020301112', 'Employee', 'Sa', 'CMU', '', 0, '9123456789', NULL, NULL);
INSERT INTO `employees` VALUES (59, '2020301112', 'Employee', 'Sa', 'CMU', '', 0, '9123456789', NULL, NULL);
INSERT INTO `employees` VALUES (60, '2020301112', 'Employee', 'Sa', 'CMU', '', 0, '9123456789', NULL, NULL);
INSERT INTO `employees` VALUES (61, '2020301112', 'Employee', 'Sa', 'CMU', '', 1, '9123456789', NULL, NULL);
INSERT INTO `employees` VALUES (62, '2020301112', 'Employee', 'Sa', 'CMU', '', 1, '9123456789', NULL, NULL);
INSERT INTO `employees` VALUES (63, '2020301112', 'Employee', 'Sa', 'CMU', '', 1, '9123456789', NULL, NULL);
INSERT INTO `employees` VALUES (64, '2020301112', 'Employee', 'Sa', 'CMU', '', 1, '9123456789', NULL, NULL);
INSERT INTO `employees` VALUES (65, '2020301112', 'Employee', 'Sa', 'CMU', '', 1, '9123456789', NULL, NULL);
INSERT INTO `employees` VALUES (66, '2020301112', 'Employee', 'Sa', 'CMU', '', 1, '9123456789', NULL, NULL);
INSERT INTO `employees` VALUES (67, '2020301112', 'Employee', 'Sa', 'CMU', '', 1, '9123456789', NULL, NULL);
INSERT INTO `employees` VALUES (68, '2020301112', 'Employee', 'Sa', 'CMU', '', 1, '9123456789', NULL, NULL);
INSERT INTO `employees` VALUES (69, '2020301112', 'Employee', 'Sa', 'CMU', '', 1, '9123456789', NULL, NULL);
INSERT INTO `employees` VALUES (70, '2020301112', 'Employee', 'Sa', 'CMU', '', 1, '9123456789', NULL, NULL);
INSERT INTO `employees` VALUES (71, '2020301112', 'Employee', 'Sa', 'CMU', '', 1, '9123456789', NULL, NULL);
INSERT INTO `employees` VALUES (72, '2020301112', 'Employee', 'Sa', 'CMU', '', 1, '9123456789', NULL, NULL);
INSERT INTO `employees` VALUES (73, '2020301112', 'Employee', 'Sa', 'CMU', '', 1, '9123456789', NULL, NULL);
INSERT INTO `employees` VALUES (74, '2020301112', 'Employee', 'Sa', 'CMU', '', 0, '9123456789', NULL, NULL);
INSERT INTO `employees` VALUES (75, '2020301112', 'Employee', 'Sa', 'CMU', '', 0, '9123456789', NULL, NULL);
INSERT INTO `employees` VALUES (76, '2020301112', 'Employee', 'Sa', 'CMU', '', 0, '9123456789', NULL, NULL);
INSERT INTO `employees` VALUES (77, '2020301112', 'Employee', 'Sa', 'CMU', '', 0, '9123456789', NULL, NULL);
INSERT INTO `employees` VALUES (78, '2020301112', 'Employee', 'Sa', 'CMU', '', 0, '9123456789', NULL, NULL);
INSERT INTO `employees` VALUES (79, '2020301112', 'Employee', 'Sa', 'CMU', '', 0, '9123456789', NULL, NULL);
INSERT INTO `employees` VALUES (80, '2020301112', 'Employee', 'Sa', 'CMU', '', 0, '9123456789', NULL, NULL);
INSERT INTO `employees` VALUES (81, '2020301112', 'Employee', 'Sa', 'CMU', '', 0, '9123456789', NULL, NULL);
INSERT INTO `employees` VALUES (82, '2020301112', 'Employee', 'Sa', 'CMU', '', 0, '9123456789', NULL, NULL);
INSERT INTO `employees` VALUES (83, '2020301112', 'Employee', 'Sa', 'CMU', '', 0, '9123456789', NULL, NULL);
INSERT INTO `employees` VALUES (84, '2020301112', 'Employee', 'Sa', 'CMU', '', 0, '9123456789', NULL, NULL);
INSERT INTO `employees` VALUES (85, '2020301112', 'Employee', 'Sa', 'CMU', '', 0, '9123456789', NULL, NULL);
INSERT INTO `employees` VALUES (86, '2020301112', 'Employee', 'Sa', 'CMU', '', 0, '9123456789', NULL, NULL);
INSERT INTO `employees` VALUES (87, '2020301112', 'Employee', 'Sa', 'CMU', '', 0, '9123456789', NULL, NULL);
INSERT INTO `employees` VALUES (88, '2020301112', 'Employee', 'Sa', 'CMU', '', 0, '9123456789', NULL, NULL);
INSERT INTO `employees` VALUES (89, '2020301112', 'Employee', 'Sa', 'CMU', '', 0, '9123456789', NULL, NULL);
INSERT INTO `employees` VALUES (90, '2020301112', 'Employee', 'Sa', 'CMU', '', 0, '9123456789', NULL, NULL);
INSERT INTO `employees` VALUES (91, '2020301112', 'Employee', 'Sa', 'CMU', '', 0, '9123456789', NULL, NULL);
INSERT INTO `employees` VALUES (92, '2020301112', 'Employee', 'Sa', 'CMU', '', 0, '9123456789', NULL, NULL);
INSERT INTO `employees` VALUES (93, '2020301112', 'Employee', 'Sa', 'CMU', '', 0, '9123456789', NULL, NULL);
INSERT INTO `employees` VALUES (94, '2020301112', 'Employee', 'Sa', 'CMU', '', 0, '9123456789', NULL, NULL);
INSERT INTO `employees` VALUES (95, '2020301112', 'Employee', 'Sa', 'CMU', '', 0, '9123456789', NULL, NULL);
INSERT INTO `employees` VALUES (96, '2020301112', 'Employee', 'Sa', 'CMU', '', 0, '9123456789', NULL, NULL);
INSERT INTO `employees` VALUES (97, '2020301112', 'Employee', 'Sa', 'CMU', '', 0, '9123456789', NULL, NULL);
INSERT INTO `employees` VALUES (98, '2020301234', 'Jasmin', 'A', 'Ombao', NULL, 0, '09123456789', NULL, '2024-04-24 16:40:35');
INSERT INTO `employees` VALUES (102, '2020301165', 'Divine Grace', 'O', 'Ampong', NULL, 0, '09091234566', '2024-04-19 16:02:04', '2024-04-19 16:02:04');
INSERT INTO `employees` VALUES (103, '2020305432', 'Alain Kenneth', 'O', 'Bebillo', NULL, 1, '09091234567', '2024-04-20 13:38:50', '2024-04-20 13:38:50');
INSERT INTO `employees` VALUES (104, '0000000000', 'Employee', 'of', 'CMU', '', 1, '00000000000', '2024-04-23 12:03:22', '2024-04-23 12:03:22');
INSERT INTO `employees` VALUES (105, '0000000000', 'Employee', 'of', 'CMU', '', 1, '00000000000', '2024-04-24 10:49:28', '2024-04-24 10:49:28');
INSERT INTO `employees` VALUES (106, '0000000000', 'Employee', 'of', 'CMU', '', 1, '00000000000', '2024-04-24 15:21:52', '2024-04-24 15:21:52');
INSERT INTO `employees` VALUES (107, '20242504', 'Alyanna Claire', 'Kaamiño', 'Monicit', NULL, 0, '098888888o', '2024-04-25 10:01:05', '2024-04-25 10:01:05');
INSERT INTO `employees` VALUES (108, '20242505', 'Mae Therese', 'Kaamiño', 'Monicit', NULL, 0, '0988898988', '2024-04-25 10:05:40', '2024-04-25 10:05:40');
INSERT INTO `employees` VALUES (109, '0000000000', 'Employee', 'of', 'CMU', '', 1, '00000000000', '2024-04-30 10:17:52', '2024-04-30 10:17:52');
INSERT INTO `employees` VALUES (110, '09653125211', 'Jack', 'Lik', 'Dimpsey', 'Dimpsy', 1, '0987654321', '2024-04-30 16:14:22', '2024-04-30 16:14:22');
INSERT INTO `employees` VALUES (111, '2020301241', 'Lorie', 'M', 'Cagalitan', NULL, 1, '09123456789', '2024-05-20 15:46:33', '2024-05-20 15:46:33');
INSERT INTO `employees` VALUES (112, '0000000000', 'Employee', 'of', 'CMU', '', 1, '00000000000', '2024-05-20 15:56:33', '2024-05-20 15:56:33');

SET FOREIGN_KEY_CHECKS = 1;
