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

 Date: 13/08/2024 12:54:27
*/

SET NAMES utf8mb4;
SET FOREIGN_KEY_CHECKS = 0;

-- ----------------------------
-- Table structure for students
-- ----------------------------
DROP TABLE IF EXISTS `students`;
CREATE TABLE `students`  (
  `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT,
  `student_id` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `firstname` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `middlename` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `lastname` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NULL DEFAULT NULL,
  `extname` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NULL DEFAULT NULL,
  `sex` int NOT NULL,
  `contact_no` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `program_id` bigint UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`) USING BTREE,
  INDEX `students_program_id_foreign`(`program_id` ASC) USING BTREE,
  CONSTRAINT `students_program_id_foreign` FOREIGN KEY (`program_id`) REFERENCES `programs` (`id`) ON DELETE RESTRICT ON UPDATE RESTRICT
) ENGINE = InnoDB AUTO_INCREMENT = 28 CHARACTER SET = utf8mb4 COLLATE = utf8mb4_unicode_ci ROW_FORMAT = DYNAMIC;

-- ----------------------------
-- Records of students
-- ----------------------------
INSERT INTO `students` VALUES (12, '2020305555', 'Ken Bien Mar', 'L', 'Caballes', NULL, 1, '09123456789', 16, '2024-04-20 14:08:32', '2024-04-20 14:08:32');
INSERT INTO `students` VALUES (13, '2020305556', 'Gen Francy', 'A', 'Evangelista', NULL, 0, '09123456789', 46, '2024-04-20 14:09:24', '2024-04-20 14:09:24');
INSERT INTO `students` VALUES (14, '2020305557', 'Fiona Caith', 'D', 'Penaso', NULL, 1, '09123456789', 38, '2024-04-20 14:10:24', '2024-04-20 14:10:24');
INSERT INTO `students` VALUES (15, '2020305558', 'Judy Ann', 'P', 'Cuaresma', NULL, 0, '09123456789', 14, '2024-04-20 14:11:16', '2024-04-20 14:11:16');
INSERT INTO `students` VALUES (16, '2020305559', 'Christian Rey', 'B', 'Cuyos', NULL, 1, '09123456789', 20, '2024-04-20 14:12:16', '2024-04-20 14:12:16');
INSERT INTO `students` VALUES (17, '2020305560', 'Ness Angela', 'P', 'Presbitero', NULL, 0, '09123123123', 23, '2024-04-20 14:13:04', '2024-04-20 14:13:04');
INSERT INTO `students` VALUES (18, '2020305061', 'Kier Vincent', 'S', 'Sevillejo', NULL, 1, '09123456789', 1, '2024-04-20 14:14:03', '2024-04-20 14:14:03');
INSERT INTO `students` VALUES (19, '2020305062', 'Angelie', 'P', 'Salisid', NULL, 1, '09123123123', 23, '2024-04-20 14:14:46', '2024-04-20 14:14:46');
INSERT INTO `students` VALUES (20, '2020302269', 'Allen Keith', 'Anib', 'Aradillos', NULL, 1, '09096743922', 46, '2024-04-21 14:08:30', '2024-04-21 14:08:30');
INSERT INTO `students` VALUES (21, '2020302213', 'Alan Ignatius', 'Kaamiño', 'Monicit', NULL, 1, '123123123', 14, '2024-04-25 10:17:02', '2024-04-25 10:17:02');
INSERT INTO `students` VALUES (22, '2020302213', 'Alan Ignatius', 'Kaamiño', 'Monicit', NULL, 1, '3453543535', 14, '2024-04-25 10:18:23', '2024-04-25 10:18:23');
INSERT INTO `students` VALUES (23, '2020301634', 'Alyanna Claire', 'Kaamiño', 'Monicit', NULL, 0, '3453543535', 46, '2024-04-25 10:33:24', '2024-04-25 10:33:24');
INSERT INTO `students` VALUES (24, '2020301635', 'Mae Therese', 'Kaamiño', 'Monicit', NULL, 0, '3453543535', 47, '2024-04-25 10:43:22', '2024-04-25 10:43:22');
INSERT INTO `students` VALUES (25, '2020302567', 'Sample', 'Student', 'Data', NULL, 1, '09123456788', 46, '2024-05-20 11:05:31', '2024-05-20 11:05:31');
INSERT INTO `students` VALUES (26, '2020302212', 'Allen Keith', 'Anib', 'Aradillos', NULL, 1, '09123456789', 46, '2024-05-20 15:48:31', '2024-05-20 15:48:31');
INSERT INTO `students` VALUES (27, '2020300007', 'Ricah', 'Sebial', 'Pareja', NULL, 0, '09154151643', 13, '2024-05-20 16:01:43', '2024-05-20 16:01:43');

SET FOREIGN_KEY_CHECKS = 1;
