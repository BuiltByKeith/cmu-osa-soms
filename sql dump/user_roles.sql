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

 Date: 13/08/2024 12:54:47
*/

SET NAMES utf8mb4;
SET FOREIGN_KEY_CHECKS = 0;

-- ----------------------------
-- Table structure for user_roles
-- ----------------------------
DROP TABLE IF EXISTS `user_roles`;
CREATE TABLE `user_roles`  (
  `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT,
  `user_id` bigint UNSIGNED NOT NULL,
  `role_id` bigint UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`) USING BTREE,
  INDEX `user_roles_user_id_foreign`(`user_id` ASC) USING BTREE,
  INDEX `user_roles_role_id_foreign`(`role_id` ASC) USING BTREE,
  CONSTRAINT `user_roles_role_id_foreign` FOREIGN KEY (`role_id`) REFERENCES `roles` (`id`) ON DELETE RESTRICT ON UPDATE RESTRICT,
  CONSTRAINT `user_roles_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE RESTRICT ON UPDATE RESTRICT
) ENGINE = InnoDB AUTO_INCREMENT = 105 CHARACTER SET = utf8mb4 COLLATE = utf8mb4_unicode_ci ROW_FORMAT = DYNAMIC;

-- ----------------------------
-- Records of user_roles
-- ----------------------------
INSERT INTO `user_roles` VALUES (1, 1, 2, NULL, NULL);
INSERT INTO `user_roles` VALUES (2, 2, 2, NULL, NULL);
INSERT INTO `user_roles` VALUES (3, 3, 2, NULL, NULL);
INSERT INTO `user_roles` VALUES (4, 4, 2, NULL, NULL);
INSERT INTO `user_roles` VALUES (5, 5, 2, NULL, NULL);
INSERT INTO `user_roles` VALUES (6, 6, 2, NULL, NULL);
INSERT INTO `user_roles` VALUES (7, 7, 2, NULL, NULL);
INSERT INTO `user_roles` VALUES (8, 8, 2, NULL, NULL);
INSERT INTO `user_roles` VALUES (9, 9, 2, NULL, NULL);
INSERT INTO `user_roles` VALUES (10, 10, 2, NULL, NULL);
INSERT INTO `user_roles` VALUES (11, 11, 2, NULL, NULL);
INSERT INTO `user_roles` VALUES (12, 12, 2, NULL, NULL);
INSERT INTO `user_roles` VALUES (13, 13, 2, NULL, NULL);
INSERT INTO `user_roles` VALUES (14, 14, 2, NULL, NULL);
INSERT INTO `user_roles` VALUES (15, 15, 2, NULL, NULL);
INSERT INTO `user_roles` VALUES (16, 16, 2, NULL, NULL);
INSERT INTO `user_roles` VALUES (17, 17, 2, NULL, NULL);
INSERT INTO `user_roles` VALUES (18, 18, 2, NULL, NULL);
INSERT INTO `user_roles` VALUES (19, 19, 2, NULL, NULL);
INSERT INTO `user_roles` VALUES (20, 20, 2, NULL, NULL);
INSERT INTO `user_roles` VALUES (21, 21, 2, NULL, NULL);
INSERT INTO `user_roles` VALUES (22, 22, 2, NULL, NULL);
INSERT INTO `user_roles` VALUES (23, 23, 2, NULL, NULL);
INSERT INTO `user_roles` VALUES (24, 24, 2, NULL, NULL);
INSERT INTO `user_roles` VALUES (25, 25, 2, NULL, NULL);
INSERT INTO `user_roles` VALUES (26, 26, 2, NULL, NULL);
INSERT INTO `user_roles` VALUES (27, 27, 2, NULL, NULL);
INSERT INTO `user_roles` VALUES (28, 28, 2, NULL, NULL);
INSERT INTO `user_roles` VALUES (29, 29, 2, NULL, NULL);
INSERT INTO `user_roles` VALUES (30, 30, 2, NULL, NULL);
INSERT INTO `user_roles` VALUES (31, 31, 2, NULL, NULL);
INSERT INTO `user_roles` VALUES (32, 32, 2, NULL, NULL);
INSERT INTO `user_roles` VALUES (33, 33, 2, NULL, NULL);
INSERT INTO `user_roles` VALUES (34, 34, 2, NULL, NULL);
INSERT INTO `user_roles` VALUES (35, 35, 2, NULL, NULL);
INSERT INTO `user_roles` VALUES (36, 36, 2, NULL, NULL);
INSERT INTO `user_roles` VALUES (37, 37, 2, NULL, NULL);
INSERT INTO `user_roles` VALUES (38, 38, 2, NULL, NULL);
INSERT INTO `user_roles` VALUES (39, 39, 2, NULL, NULL);
INSERT INTO `user_roles` VALUES (40, 40, 2, NULL, NULL);
INSERT INTO `user_roles` VALUES (41, 41, 2, NULL, NULL);
INSERT INTO `user_roles` VALUES (42, 42, 2, NULL, NULL);
INSERT INTO `user_roles` VALUES (43, 43, 2, NULL, NULL);
INSERT INTO `user_roles` VALUES (44, 44, 2, NULL, NULL);
INSERT INTO `user_roles` VALUES (45, 45, 2, NULL, NULL);
INSERT INTO `user_roles` VALUES (46, 46, 2, NULL, NULL);
INSERT INTO `user_roles` VALUES (47, 47, 2, NULL, NULL);
INSERT INTO `user_roles` VALUES (48, 48, 2, NULL, NULL);
INSERT INTO `user_roles` VALUES (49, 49, 2, NULL, NULL);
INSERT INTO `user_roles` VALUES (50, 50, 2, NULL, NULL);
INSERT INTO `user_roles` VALUES (51, 51, 2, NULL, NULL);
INSERT INTO `user_roles` VALUES (52, 52, 2, NULL, NULL);
INSERT INTO `user_roles` VALUES (53, 53, 2, NULL, NULL);
INSERT INTO `user_roles` VALUES (54, 54, 2, NULL, NULL);
INSERT INTO `user_roles` VALUES (55, 55, 2, NULL, NULL);
INSERT INTO `user_roles` VALUES (56, 56, 2, NULL, NULL);
INSERT INTO `user_roles` VALUES (57, 57, 2, NULL, NULL);
INSERT INTO `user_roles` VALUES (58, 58, 2, NULL, NULL);
INSERT INTO `user_roles` VALUES (59, 59, 2, NULL, NULL);
INSERT INTO `user_roles` VALUES (60, 60, 2, NULL, NULL);
INSERT INTO `user_roles` VALUES (61, 61, 2, NULL, NULL);
INSERT INTO `user_roles` VALUES (62, 62, 2, NULL, NULL);
INSERT INTO `user_roles` VALUES (63, 63, 2, NULL, NULL);
INSERT INTO `user_roles` VALUES (64, 64, 2, NULL, NULL);
INSERT INTO `user_roles` VALUES (65, 65, 2, NULL, NULL);
INSERT INTO `user_roles` VALUES (66, 66, 2, NULL, NULL);
INSERT INTO `user_roles` VALUES (67, 67, 2, NULL, NULL);
INSERT INTO `user_roles` VALUES (68, 68, 2, NULL, NULL);
INSERT INTO `user_roles` VALUES (69, 69, 2, NULL, NULL);
INSERT INTO `user_roles` VALUES (70, 70, 2, NULL, NULL);
INSERT INTO `user_roles` VALUES (71, 71, 2, NULL, NULL);
INSERT INTO `user_roles` VALUES (72, 72, 2, NULL, NULL);
INSERT INTO `user_roles` VALUES (73, 73, 2, NULL, NULL);
INSERT INTO `user_roles` VALUES (74, 74, 2, NULL, NULL);
INSERT INTO `user_roles` VALUES (75, 75, 2, NULL, NULL);
INSERT INTO `user_roles` VALUES (76, 76, 2, NULL, NULL);
INSERT INTO `user_roles` VALUES (77, 77, 2, NULL, NULL);
INSERT INTO `user_roles` VALUES (78, 78, 2, NULL, NULL);
INSERT INTO `user_roles` VALUES (79, 79, 2, NULL, NULL);
INSERT INTO `user_roles` VALUES (80, 80, 2, NULL, NULL);
INSERT INTO `user_roles` VALUES (81, 81, 2, NULL, NULL);
INSERT INTO `user_roles` VALUES (82, 82, 2, NULL, NULL);
INSERT INTO `user_roles` VALUES (83, 83, 2, NULL, NULL);
INSERT INTO `user_roles` VALUES (84, 84, 2, NULL, NULL);
INSERT INTO `user_roles` VALUES (85, 85, 2, NULL, NULL);
INSERT INTO `user_roles` VALUES (86, 86, 2, NULL, NULL);
INSERT INTO `user_roles` VALUES (87, 87, 2, NULL, NULL);
INSERT INTO `user_roles` VALUES (88, 88, 2, NULL, NULL);
INSERT INTO `user_roles` VALUES (89, 89, 2, NULL, NULL);
INSERT INTO `user_roles` VALUES (90, 90, 2, NULL, NULL);
INSERT INTO `user_roles` VALUES (91, 91, 2, NULL, NULL);
INSERT INTO `user_roles` VALUES (92, 92, 2, NULL, NULL);
INSERT INTO `user_roles` VALUES (93, 93, 2, NULL, NULL);
INSERT INTO `user_roles` VALUES (94, 94, 2, NULL, NULL);
INSERT INTO `user_roles` VALUES (95, 95, 2, NULL, NULL);
INSERT INTO `user_roles` VALUES (96, 96, 2, NULL, NULL);
INSERT INTO `user_roles` VALUES (97, 97, 2, NULL, NULL);
INSERT INTO `user_roles` VALUES (98, 98, 1, NULL, NULL);
INSERT INTO `user_roles` VALUES (99, 99, 1, NULL, NULL);
INSERT INTO `user_roles` VALUES (100, 100, 2, '2024-04-23 12:03:22', '2024-04-23 12:03:22');
INSERT INTO `user_roles` VALUES (101, 101, 2, '2024-04-24 10:49:28', '2024-04-24 10:49:28');
INSERT INTO `user_roles` VALUES (102, 102, 2, '2024-04-24 15:21:52', '2024-04-24 15:21:52');
INSERT INTO `user_roles` VALUES (103, 103, 2, '2024-04-30 10:17:53', '2024-04-30 10:17:53');
INSERT INTO `user_roles` VALUES (104, 104, 2, '2024-05-20 15:56:33', '2024-05-20 15:56:33');

SET FOREIGN_KEY_CHECKS = 1;
