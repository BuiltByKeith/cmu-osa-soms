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

 Date: 13/08/2024 12:46:56
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

-- ----------------------------
-- Table structure for act_attachments
-- ----------------------------
DROP TABLE IF EXISTS `act_attachments`;
CREATE TABLE `act_attachments`  (
  `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT,
  `activity_id` bigint UNSIGNED NOT NULL,
  `document_category_id` bigint UNSIGNED NOT NULL,
  `document_name` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `status` int NOT NULL,
  `isSeen` int NOT NULL,
  `status_approved_date` datetime NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`) USING BTREE,
  INDEX `act_attachments_activity_id_foreign`(`activity_id` ASC) USING BTREE,
  INDEX `act_attachments_document_category_id_foreign`(`document_category_id` ASC) USING BTREE,
  CONSTRAINT `act_attachments_activity_id_foreign` FOREIGN KEY (`activity_id`) REFERENCES `activities` (`id`) ON DELETE RESTRICT ON UPDATE RESTRICT,
  CONSTRAINT `act_attachments_document_category_id_foreign` FOREIGN KEY (`document_category_id`) REFERENCES `document_categories` (`id`) ON DELETE RESTRICT ON UPDATE RESTRICT
) ENGINE = InnoDB AUTO_INCREMENT = 34 CHARACTER SET = utf8mb4 COLLATE = utf8mb4_unicode_ci ROW_FORMAT = DYNAMIC;

-- ----------------------------
-- Records of act_attachments
-- ----------------------------

-- ----------------------------
-- Table structure for activities
-- ----------------------------
DROP TABLE IF EXISTS `activities`;
CREATE TABLE `activities`  (
  `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT,
  `student_organization_id` bigint UNSIGNED NOT NULL,
  `activity_name` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `budget_allocation` double NULL DEFAULT NULL,
  `type_of_activity_id` bigint UNSIGNED NOT NULL,
  `activity_category_id` bigint UNSIGNED NOT NULL,
  `venue` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `reach_of_activity_id` bigint UNSIGNED NOT NULL,
  `date_time_start` datetime NULL DEFAULT NULL,
  `date_time_end` datetime NULL DEFAULT NULL,
  `ay_semester_id` bigint UNSIGNED NOT NULL,
  `acad_year_id` bigint NULL DEFAULT NULL,
  `activity_status_id` bigint UNSIGNED NOT NULL,
  `deadline` datetime NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`) USING BTREE,
  INDEX `activities_student_organization_id_foreign`(`student_organization_id` ASC) USING BTREE,
  INDEX `activities_type_of_activity_id_foreign`(`type_of_activity_id` ASC) USING BTREE,
  INDEX `activities_activity_category_id_foreign`(`activity_category_id` ASC) USING BTREE,
  INDEX `activities_reach_of_activity_id_foreign`(`reach_of_activity_id` ASC) USING BTREE,
  INDEX `activities_ay_semester_id_foreign`(`ay_semester_id` ASC) USING BTREE,
  INDEX `activities_activity_status_id_foreign`(`activity_status_id` ASC) USING BTREE,
  CONSTRAINT `activities_activity_category_id_foreign` FOREIGN KEY (`activity_category_id`) REFERENCES `activity_categories` (`id`) ON DELETE RESTRICT ON UPDATE RESTRICT,
  CONSTRAINT `activities_activity_status_id_foreign` FOREIGN KEY (`activity_status_id`) REFERENCES `activity_statuses` (`id`) ON DELETE RESTRICT ON UPDATE RESTRICT,
  CONSTRAINT `activities_ay_semester_id_foreign` FOREIGN KEY (`ay_semester_id`) REFERENCES `ay_semesters` (`id`) ON DELETE RESTRICT ON UPDATE RESTRICT,
  CONSTRAINT `activities_reach_of_activity_id_foreign` FOREIGN KEY (`reach_of_activity_id`) REFERENCES `reach_of_activities` (`id`) ON DELETE RESTRICT ON UPDATE RESTRICT,
  CONSTRAINT `activities_student_organization_id_foreign` FOREIGN KEY (`student_organization_id`) REFERENCES `student_organizations` (`id`) ON DELETE RESTRICT ON UPDATE RESTRICT,
  CONSTRAINT `activities_type_of_activity_id_foreign` FOREIGN KEY (`type_of_activity_id`) REFERENCES `type_of_activities` (`id`) ON DELETE RESTRICT ON UPDATE RESTRICT
) ENGINE = InnoDB AUTO_INCREMENT = 44 CHARACTER SET = utf8mb4 COLLATE = utf8mb4_unicode_ci ROW_FORMAT = DYNAMIC;

-- ----------------------------
-- Records of activities
-- ----------------------------

-- ----------------------------
-- Table structure for activity_budget_breakdowns
-- ----------------------------
DROP TABLE IF EXISTS `activity_budget_breakdowns`;
CREATE TABLE `activity_budget_breakdowns`  (
  `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT,
  `activity_id` bigint UNSIGNED NOT NULL,
  `item_name` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `quantity` bigint NOT NULL,
  `cost` double NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`) USING BTREE,
  INDEX `activity_budget_breakdowns_activity_id_foreign`(`activity_id` ASC) USING BTREE,
  CONSTRAINT `activity_budget_breakdowns_activity_id_foreign` FOREIGN KEY (`activity_id`) REFERENCES `activities` (`id`) ON DELETE RESTRICT ON UPDATE RESTRICT
) ENGINE = InnoDB AUTO_INCREMENT = 1 CHARACTER SET = utf8mb4 COLLATE = utf8mb4_unicode_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Records of activity_budget_breakdowns
-- ----------------------------

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

-- ----------------------------
-- Table structure for attachment_comments
-- ----------------------------
DROP TABLE IF EXISTS `attachment_comments`;
CREATE TABLE `attachment_comments`  (
  `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT,
  `act_attachment_id` bigint UNSIGNED NOT NULL,
  `user_id` bigint UNSIGNED NOT NULL,
  `comment_details` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`) USING BTREE,
  INDEX `attachment_comments_act_attachment_id_foreign`(`act_attachment_id` ASC) USING BTREE,
  INDEX `attachment_comments_user_id_foreign`(`user_id` ASC) USING BTREE,
  CONSTRAINT `attachment_comments_act_attachment_id_foreign` FOREIGN KEY (`act_attachment_id`) REFERENCES `act_attachments` (`id`) ON DELETE CASCADE ON UPDATE RESTRICT,
  CONSTRAINT `attachment_comments_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE ON UPDATE RESTRICT
) ENGINE = InnoDB AUTO_INCREMENT = 30 CHARACTER SET = utf8mb4 COLLATE = utf8mb4_unicode_ci ROW_FORMAT = DYNAMIC;

-- ----------------------------
-- Records of attachment_comments
-- ----------------------------

-- ----------------------------
-- Table structure for attachments
-- ----------------------------
DROP TABLE IF EXISTS `attachments`;
CREATE TABLE `attachments`  (
  `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT,
  `act_attachment_id` bigint UNSIGNED NOT NULL,
  `file_name` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `file_path` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`) USING BTREE,
  INDEX `attachments_act_attachment_id_foreign`(`act_attachment_id` ASC) USING BTREE,
  CONSTRAINT `attachments_act_attachment_id_foreign` FOREIGN KEY (`act_attachment_id`) REFERENCES `act_attachments` (`id`) ON DELETE RESTRICT ON UPDATE RESTRICT
) ENGINE = InnoDB AUTO_INCREMENT = 48 CHARACTER SET = utf8mb4 COLLATE = utf8mb4_unicode_ci ROW_FORMAT = DYNAMIC;

-- ----------------------------
-- Records of attachments
-- ----------------------------

-- ----------------------------
-- Table structure for ay_semesters
-- ----------------------------
DROP TABLE IF EXISTS `ay_semesters`;
CREATE TABLE `ay_semesters`  (
  `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT,
  `description` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `acad_year_id` bigint UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`) USING BTREE,
  INDEX `ay_semesters_acad_year_id_foreign`(`acad_year_id` ASC) USING BTREE,
  CONSTRAINT `ay_semesters_acad_year_id_foreign` FOREIGN KEY (`acad_year_id`) REFERENCES `acad_years` (`id`) ON DELETE RESTRICT ON UPDATE RESTRICT
) ENGINE = InnoDB AUTO_INCREMENT = 3 CHARACTER SET = utf8mb4 COLLATE = utf8mb4_unicode_ci ROW_FORMAT = DYNAMIC;

-- ----------------------------
-- Records of ay_semesters
-- ----------------------------
INSERT INTO `ay_semesters` VALUES (1, '1st Semester', 1, '2023-08-14 20:30:37', '2023-08-14 20:30:37');
INSERT INTO `ay_semesters` VALUES (2, '2nd Semester', 1, '2024-01-08 20:30:59', '2024-01-08 20:30:59');

-- ----------------------------
-- Table structure for colleges
-- ----------------------------
DROP TABLE IF EXISTS `colleges`;
CREATE TABLE `colleges`  (
  `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT,
  `college_name` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`) USING BTREE
) ENGINE = InnoDB AUTO_INCREMENT = 11 CHARACTER SET = utf8mb4 COLLATE = utf8mb4_unicode_ci ROW_FORMAT = DYNAMIC;

-- ----------------------------
-- Records of colleges
-- ----------------------------
INSERT INTO `colleges` VALUES (1, 'College of Agriculture', NULL, NULL);
INSERT INTO `colleges` VALUES (2, 'College of Arts and Sciences', NULL, NULL);
INSERT INTO `colleges` VALUES (3, 'College of Business and Management', NULL, NULL);
INSERT INTO `colleges` VALUES (4, 'College of Education', NULL, NULL);
INSERT INTO `colleges` VALUES (5, 'College of Engineering', NULL, NULL);
INSERT INTO `colleges` VALUES (6, 'College of Forestry and Environmental Science', NULL, NULL);
INSERT INTO `colleges` VALUES (7, 'College of Human Ecology', NULL, NULL);
INSERT INTO `colleges` VALUES (8, 'College of Information Sciences and Computing', NULL, NULL);
INSERT INTO `colleges` VALUES (9, 'College of Nursing', NULL, NULL);
INSERT INTO `colleges` VALUES (10, 'College of Veterinary Medicine', NULL, NULL);

-- ----------------------------
-- Table structure for document_categories
-- ----------------------------
DROP TABLE IF EXISTS `document_categories`;
CREATE TABLE `document_categories`  (
  `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT,
  `description` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`) USING BTREE
) ENGINE = InnoDB AUTO_INCREMENT = 4 CHARACTER SET = utf8mb4 COLLATE = utf8mb4_unicode_ci ROW_FORMAT = DYNAMIC;

-- ----------------------------
-- Records of document_categories
-- ----------------------------
INSERT INTO `document_categories` VALUES (1, 'Pre-Activity Document', NULL, NULL);
INSERT INTO `document_categories` VALUES (2, 'Post-Activity Document', NULL, NULL);
INSERT INTO `document_categories` VALUES (3, 'Term End Report', NULL, NULL);

-- ----------------------------
-- Table structure for document_templates
-- ----------------------------
DROP TABLE IF EXISTS `document_templates`;
CREATE TABLE `document_templates`  (
  `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT,
  `document_name` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `file_path` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `document_category_id` bigint UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`) USING BTREE,
  INDEX `document_templates_document_category_id_foreign`(`document_category_id` ASC) USING BTREE,
  CONSTRAINT `document_templates_document_category_id_foreign` FOREIGN KEY (`document_category_id`) REFERENCES `document_categories` (`id`) ON DELETE RESTRICT ON UPDATE RESTRICT
) ENGINE = InnoDB AUTO_INCREMENT = 52 CHARACTER SET = utf8mb4 COLLATE = utf8mb4_unicode_ci ROW_FORMAT = DYNAMIC;

-- ----------------------------
-- Records of document_templates
-- ----------------------------

-- ----------------------------
-- Table structure for documents
-- ----------------------------
DROP TABLE IF EXISTS `documents`;
CREATE TABLE `documents`  (
  `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT,
  `document_name` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `document_category_id` bigint UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`) USING BTREE,
  INDEX `documents_document_category_id_foreign`(`document_category_id` ASC) USING BTREE,
  CONSTRAINT `documents_document_category_id_foreign` FOREIGN KEY (`document_category_id`) REFERENCES `document_categories` (`id`) ON DELETE RESTRICT ON UPDATE RESTRICT
) ENGINE = InnoDB AUTO_INCREMENT = 5 CHARACTER SET = utf8mb4 COLLATE = utf8mb4_unicode_ci ROW_FORMAT = DYNAMIC;

-- ----------------------------
-- Records of documents
-- ----------------------------

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

-- ----------------------------
-- Table structure for failed_jobs
-- ----------------------------
DROP TABLE IF EXISTS `failed_jobs`;
CREATE TABLE `failed_jobs`  (
  `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT,
  `uuid` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `connection` text CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `queue` text CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `payload` longtext CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `exception` longtext CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `failed_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`) USING BTREE,
  UNIQUE INDEX `failed_jobs_uuid_unique`(`uuid` ASC) USING BTREE
) ENGINE = InnoDB AUTO_INCREMENT = 1 CHARACTER SET = utf8mb4 COLLATE = utf8mb4_unicode_ci ROW_FORMAT = DYNAMIC;

-- ----------------------------
-- Records of failed_jobs
-- ----------------------------

-- ----------------------------
-- Table structure for migrations
-- ----------------------------
DROP TABLE IF EXISTS `migrations`;
CREATE TABLE `migrations`  (
  `id` int UNSIGNED NOT NULL AUTO_INCREMENT,
  `migration` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `batch` int NOT NULL,
  PRIMARY KEY (`id`) USING BTREE
) ENGINE = InnoDB AUTO_INCREMENT = 35 CHARACTER SET = utf8mb4 COLLATE = utf8mb4_unicode_ci ROW_FORMAT = DYNAMIC;

-- ----------------------------
-- Records of migrations
-- ----------------------------
INSERT INTO `migrations` VALUES (1, '2014_10_12_100000_create_password_reset_tokens_table', 1);
INSERT INTO `migrations` VALUES (2, '2014_10_12_100000_create_password_resets_table', 1);
INSERT INTO `migrations` VALUES (3, '2018_08_08_100000_create_telescope_entries_table', 1);
INSERT INTO `migrations` VALUES (4, '2019_08_19_000000_create_failed_jobs_table', 1);
INSERT INTO `migrations` VALUES (5, '2019_12_14_000001_create_personal_access_tokens_table', 1);
INSERT INTO `migrations` VALUES (6, '2024_04_02_184904_create_type_of_organizations_table', 1);
INSERT INTO `migrations` VALUES (7, '2024_04_02_184926_create_type_of_activities_table', 1);
INSERT INTO `migrations` VALUES (8, '2024_04_02_184936_create_reach_of_activities_table', 1);
INSERT INTO `migrations` VALUES (9, '2024_04_02_184944_create_activity_statuses_table', 1);
INSERT INTO `migrations` VALUES (10, '2024_04_02_185006_create_activity_categories_table', 1);
INSERT INTO `migrations` VALUES (11, '2024_04_02_185011_create_colleges_table', 1);
INSERT INTO `migrations` VALUES (12, '2024_04_02_185014_create_programs_table', 1);
INSERT INTO `migrations` VALUES (13, '2024_04_02_185021_create_students_table', 1);
INSERT INTO `migrations` VALUES (14, '2024_04_02_185029_create_positions_table', 1);
INSERT INTO `migrations` VALUES (15, '2024_04_02_185036_create_roles_table', 1);
INSERT INTO `migrations` VALUES (16, '2024_04_02_185045_create_acad_years_table', 1);
INSERT INTO `migrations` VALUES (17, '2024_04_02_185051_create_ay_semesters_table', 1);
INSERT INTO `migrations` VALUES (18, '2024_04_02_185054_create_employees_table', 1);
INSERT INTO `migrations` VALUES (19, '2024_04_02_185059_create_users_table', 1);
INSERT INTO `migrations` VALUES (20, '2024_04_02_185106_create_user_roles_table', 1);
INSERT INTO `migrations` VALUES (21, '2024_04_02_185114_create_student_organizations_table', 1);
INSERT INTO `migrations` VALUES (22, '2024_04_02_185122_create_activities_table', 1);
INSERT INTO `migrations` VALUES (23, '2024_04_02_185131_create_student_org_members_table', 1);
INSERT INTO `migrations` VALUES (24, '2024_04_02_185146_create_activity_budget_breakdowns_table', 1);
INSERT INTO `migrations` VALUES (25, '2024_04_02_185934_create_document_categories_table', 1);
INSERT INTO `migrations` VALUES (26, '2024_04_02_190034_create_documents_table', 1);
INSERT INTO `migrations` VALUES (27, '2024_04_02_190050_create_act_attachments_table', 1);
INSERT INTO `migrations` VALUES (28, '2024_04_02_190054_create_attachments_table', 1);
INSERT INTO `migrations` VALUES (29, '2024_04_02_190101_create_temporary_images_table', 1);
INSERT INTO `migrations` VALUES (30, '2024_04_02_190108_create_org_registrations_table', 1);
INSERT INTO `migrations` VALUES (31, '2024_04_02_190118_create_attachment_comments_table', 1);
INSERT INTO `migrations` VALUES (32, '2024_04_03_084914_create_document_templates_table', 2);
INSERT INTO `migrations` VALUES (33, '2024_04_12_144225_create_student_org_advisers_table', 3);
INSERT INTO `migrations` VALUES (34, '2024_04_21_131001_create_student_org_registration_documents_table', 4);

-- ----------------------------
-- Table structure for org_registrations
-- ----------------------------
DROP TABLE IF EXISTS `org_registrations`;
CREATE TABLE `org_registrations`  (
  `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT,
  `image_path` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NULL DEFAULT NULL,
  `organization_name` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NULL DEFAULT NULL,
  `acronym` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NULL DEFAULT NULL,
  `accreditation_no` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NULL DEFAULT NULL,
  `type_of_org_id` bigint UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`) USING BTREE,
  INDEX `org_registrations_type_of_org_id_foreign`(`type_of_org_id` ASC) USING BTREE,
  CONSTRAINT `org_registrations_type_of_org_id_foreign` FOREIGN KEY (`type_of_org_id`) REFERENCES `type_of_organizations` (`id`) ON DELETE RESTRICT ON UPDATE RESTRICT
) ENGINE = InnoDB AUTO_INCREMENT = 1 CHARACTER SET = utf8mb4 COLLATE = utf8mb4_unicode_ci ROW_FORMAT = DYNAMIC;

-- ----------------------------
-- Records of org_registrations
-- ----------------------------

-- ----------------------------
-- Table structure for password_reset_tokens
-- ----------------------------
DROP TABLE IF EXISTS `password_reset_tokens`;
CREATE TABLE `password_reset_tokens`  (
  `email` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`email`) USING BTREE
) ENGINE = InnoDB CHARACTER SET = utf8mb4 COLLATE = utf8mb4_unicode_ci ROW_FORMAT = DYNAMIC;

-- ----------------------------
-- Records of password_reset_tokens
-- ----------------------------

-- ----------------------------
-- Table structure for password_resets
-- ----------------------------
DROP TABLE IF EXISTS `password_resets`;
CREATE TABLE `password_resets`  (
  `email` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  INDEX `password_resets_email_index`(`email` ASC) USING BTREE
) ENGINE = InnoDB CHARACTER SET = utf8mb4 COLLATE = utf8mb4_unicode_ci ROW_FORMAT = DYNAMIC;

-- ----------------------------
-- Records of password_resets
-- ----------------------------

-- ----------------------------
-- Table structure for personal_access_tokens
-- ----------------------------
DROP TABLE IF EXISTS `personal_access_tokens`;
CREATE TABLE `personal_access_tokens`  (
  `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT,
  `tokenable_type` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `tokenable_id` bigint UNSIGNED NOT NULL,
  `name` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(64) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `abilities` text CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NULL,
  `last_used_at` timestamp NULL DEFAULT NULL,
  `expires_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`) USING BTREE,
  UNIQUE INDEX `personal_access_tokens_token_unique`(`token` ASC) USING BTREE,
  INDEX `personal_access_tokens_tokenable_type_tokenable_id_index`(`tokenable_type` ASC, `tokenable_id` ASC) USING BTREE
) ENGINE = InnoDB AUTO_INCREMENT = 1 CHARACTER SET = utf8mb4 COLLATE = utf8mb4_unicode_ci ROW_FORMAT = DYNAMIC;

-- ----------------------------
-- Records of personal_access_tokens
-- ----------------------------

-- ----------------------------
-- Table structure for programs
-- ----------------------------
DROP TABLE IF EXISTS `programs`;
CREATE TABLE `programs`  (
  `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT,
  `college_id` bigint UNSIGNED NOT NULL,
  `program_name` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`) USING BTREE,
  INDEX `programs_college_id_foreign`(`college_id` ASC) USING BTREE,
  CONSTRAINT `programs_college_id_foreign` FOREIGN KEY (`college_id`) REFERENCES `colleges` (`id`) ON DELETE RESTRICT ON UPDATE RESTRICT
) ENGINE = InnoDB AUTO_INCREMENT = 49 CHARACTER SET = utf8mb4 COLLATE = utf8mb4_unicode_ci ROW_FORMAT = DYNAMIC;

-- ----------------------------
-- Records of programs
-- ----------------------------
INSERT INTO `programs` VALUES (1, 1, 'BS Agriculture Major in AgriBio Sciences', NULL, NULL);
INSERT INTO `programs` VALUES (2, 1, 'BS Agriculture Major in Agricultural Economics', NULL, NULL);
INSERT INTO `programs` VALUES (3, 1, 'BS Agriculture Major in Agricultural Extension', NULL, NULL);
INSERT INTO `programs` VALUES (4, 1, 'BS Agriculture Major in Animal Science', NULL, NULL);
INSERT INTO `programs` VALUES (5, 1, 'BS Agriculture Major in Soil Science', NULL, NULL);
INSERT INTO `programs` VALUES (6, 1, 'BS Agriculture Major in Crop Protection', NULL, NULL);
INSERT INTO `programs` VALUES (7, 1, 'BS Agriculture Major in Crop Science', NULL, NULL);
INSERT INTO `programs` VALUES (9, 1, 'BS Agribusiness Management', NULL, NULL);
INSERT INTO `programs` VALUES (10, 1, 'BS Development Communication', NULL, NULL);
INSERT INTO `programs` VALUES (11, 2, 'BA English and Language Studies', NULL, NULL);
INSERT INTO `programs` VALUES (12, 2, 'BA History', NULL, NULL);
INSERT INTO `programs` VALUES (13, 2, 'BA Political Science', NULL, NULL);
INSERT INTO `programs` VALUES (14, 2, 'BS Psychology', NULL, NULL);
INSERT INTO `programs` VALUES (15, 2, 'BA Sociology', NULL, NULL);
INSERT INTO `programs` VALUES (16, 2, 'BS Biology', NULL, NULL);
INSERT INTO `programs` VALUES (17, 2, 'BS Chemistry', NULL, NULL);
INSERT INTO `programs` VALUES (18, 2, 'BS Mathematics', NULL, NULL);
INSERT INTO `programs` VALUES (19, 2, 'BS Physics', NULL, NULL);
INSERT INTO `programs` VALUES (20, 3, 'BS Accountancy', NULL, NULL);
INSERT INTO `programs` VALUES (21, 3, 'BS Accounting Information System', NULL, NULL);
INSERT INTO `programs` VALUES (22, 3, 'BS Internal Auditing', NULL, NULL);
INSERT INTO `programs` VALUES (23, 3, 'BS Management Accounting', NULL, NULL);
INSERT INTO `programs` VALUES (27, 3, 'BS Office Administration', NULL, NULL);
INSERT INTO `programs` VALUES (28, 3, 'BS Business Administration Major in Marketing Management', NULL, NULL);
INSERT INTO `programs` VALUES (29, 3, 'BS Business Administration Major in Financial Management', NULL, NULL);
INSERT INTO `programs` VALUES (30, 3, 'BS Business Administration Major in Operations Management', NULL, NULL);
INSERT INTO `programs` VALUES (31, 4, 'Bachelor of Physical Education', NULL, NULL);
INSERT INTO `programs` VALUES (32, 4, 'BSEd English', NULL, NULL);
INSERT INTO `programs` VALUES (33, 4, 'BSEd Filipino', NULL, NULL);
INSERT INTO `programs` VALUES (34, 4, 'BSEd Sciences', NULL, NULL);
INSERT INTO `programs` VALUES (35, 4, 'BSEd Mathematics', NULL, NULL);
INSERT INTO `programs` VALUES (36, 5, 'BS Agriculture and Biosystems Engineering', NULL, NULL);
INSERT INTO `programs` VALUES (37, 5, 'BS Electrical Engineering', NULL, NULL);
INSERT INTO `programs` VALUES (38, 5, 'BS Civil Engineering', NULL, NULL);
INSERT INTO `programs` VALUES (39, 5, 'BS Mechanical Engineering', NULL, NULL);
INSERT INTO `programs` VALUES (40, 6, 'BS Environmental Science', NULL, NULL);
INSERT INTO `programs` VALUES (41, 6, 'BS Forestry', NULL, NULL);
INSERT INTO `programs` VALUES (42, 7, 'BS Home Economics', NULL, NULL);
INSERT INTO `programs` VALUES (43, 7, 'BS Food Technology', NULL, NULL);
INSERT INTO `programs` VALUES (44, 7, 'BS Nutrition and Dietetics', NULL, NULL);
INSERT INTO `programs` VALUES (45, 7, 'BS Hospitality Management', NULL, NULL);
INSERT INTO `programs` VALUES (46, 8, 'BS Information Technology', NULL, NULL);
INSERT INTO `programs` VALUES (47, 9, 'BS Nursing', NULL, NULL);
INSERT INTO `programs` VALUES (48, 10, 'Doctor of Veterinary Medicine', NULL, NULL);

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

-- ----------------------------
-- Table structure for roles
-- ----------------------------
DROP TABLE IF EXISTS `roles`;
CREATE TABLE `roles`  (
  `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT,
  `role_name` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`) USING BTREE
) ENGINE = InnoDB AUTO_INCREMENT = 3 CHARACTER SET = utf8mb4 COLLATE = utf8mb4_unicode_ci ROW_FORMAT = DYNAMIC;

-- ----------------------------
-- Records of roles
-- ----------------------------
INSERT INTO `roles` VALUES (1, 'osa', NULL, NULL);
INSERT INTO `roles` VALUES (2, 'organization', NULL, NULL);

-- ----------------------------
-- Table structure for student_org_advisers
-- ----------------------------
DROP TABLE IF EXISTS `student_org_advisers`;
CREATE TABLE `student_org_advisers`  (
  `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT,
  `employee_id` bigint UNSIGNED NOT NULL,
  `student_organization_id` bigint UNSIGNED NOT NULL,
  `ay_semester_id` bigint UNSIGNED NOT NULL,
  `acad_year_id` bigint UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`) USING BTREE,
  INDEX `student_org_advisers_employee_id_foreign`(`employee_id` ASC) USING BTREE,
  INDEX `student_org_advisers_student_organization_id_foreign`(`student_organization_id` ASC) USING BTREE,
  INDEX `student_org_advisers_ay_semester_id_foreign`(`ay_semester_id` ASC) USING BTREE,
  INDEX `student_org_advisers_acad_year_id_foreign`(`acad_year_id` ASC) USING BTREE,
  CONSTRAINT `student_org_advisers_acad_year_id_foreign` FOREIGN KEY (`acad_year_id`) REFERENCES `acad_years` (`id`) ON DELETE RESTRICT ON UPDATE RESTRICT,
  CONSTRAINT `student_org_advisers_ay_semester_id_foreign` FOREIGN KEY (`ay_semester_id`) REFERENCES `ay_semesters` (`id`) ON DELETE RESTRICT ON UPDATE RESTRICT,
  CONSTRAINT `student_org_advisers_employee_id_foreign` FOREIGN KEY (`employee_id`) REFERENCES `employees` (`id`) ON DELETE RESTRICT ON UPDATE RESTRICT,
  CONSTRAINT `student_org_advisers_student_organization_id_foreign` FOREIGN KEY (`student_organization_id`) REFERENCES `student_organizations` (`id`) ON DELETE RESTRICT ON UPDATE RESTRICT
) ENGINE = InnoDB AUTO_INCREMENT = 13 CHARACTER SET = utf8mb4 COLLATE = utf8mb4_unicode_ci ROW_FORMAT = DYNAMIC;

-- ----------------------------
-- Records of student_org_advisers
-- ----------------------------

-- ----------------------------
-- Table structure for student_org_members
-- ----------------------------
DROP TABLE IF EXISTS `student_org_members`;
CREATE TABLE `student_org_members`  (
  `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT,
  `student_id` bigint UNSIGNED NOT NULL,
  `student_organization_id` bigint UNSIGNED NOT NULL,
  `ay_semester_id` bigint UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `acad_year_id` bigint NULL DEFAULT NULL,
  `position` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NULL DEFAULT NULL,
  PRIMARY KEY (`id`) USING BTREE,
  INDEX `student_org_members_student_id_foreign`(`student_id` ASC) USING BTREE,
  INDEX `student_org_members_student_organization_id_foreign`(`student_organization_id` ASC) USING BTREE,
  INDEX `student_org_members_ay_semester_id_foreign`(`ay_semester_id` ASC) USING BTREE,
  CONSTRAINT `student_org_members_ay_semester_id_foreign` FOREIGN KEY (`ay_semester_id`) REFERENCES `ay_semesters` (`id`) ON DELETE RESTRICT ON UPDATE RESTRICT,
  CONSTRAINT `student_org_members_student_id_foreign` FOREIGN KEY (`student_id`) REFERENCES `students` (`id`) ON DELETE RESTRICT ON UPDATE RESTRICT,
  CONSTRAINT `student_org_members_student_organization_id_foreign` FOREIGN KEY (`student_organization_id`) REFERENCES `student_organizations` (`id`) ON DELETE RESTRICT ON UPDATE RESTRICT
) ENGINE = InnoDB AUTO_INCREMENT = 30 CHARACTER SET = utf8mb4 COLLATE = utf8mb4_unicode_ci ROW_FORMAT = DYNAMIC;

-- ----------------------------
-- Records of student_org_members
-- ----------------------------

-- ----------------------------
-- Table structure for student_org_registration_documents
-- ----------------------------
DROP TABLE IF EXISTS `student_org_registration_documents`;
CREATE TABLE `student_org_registration_documents`  (
  `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT,
  `student_org_id` bigint UNSIGNED NOT NULL,
  `ay_semester_id` bigint UNSIGNED NOT NULL,
  `acad_year_id` bigint UNSIGNED NOT NULL,
  `file_path` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `file_name` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`) USING BTREE,
  INDEX `student_org_registration_documents_student_org_id_foreign`(`student_org_id` ASC) USING BTREE,
  INDEX `student_org_registration_documents_ay_semester_id_foreign`(`ay_semester_id` ASC) USING BTREE,
  INDEX `student_org_registration_documents_acad_year_id_foreign`(`acad_year_id` ASC) USING BTREE,
  CONSTRAINT `student_org_registration_documents_acad_year_id_foreign` FOREIGN KEY (`acad_year_id`) REFERENCES `acad_years` (`id`) ON DELETE RESTRICT ON UPDATE RESTRICT,
  CONSTRAINT `student_org_registration_documents_ay_semester_id_foreign` FOREIGN KEY (`ay_semester_id`) REFERENCES `ay_semesters` (`id`) ON DELETE RESTRICT ON UPDATE RESTRICT,
  CONSTRAINT `student_org_registration_documents_student_org_id_foreign` FOREIGN KEY (`student_org_id`) REFERENCES `student_organizations` (`id`) ON DELETE RESTRICT ON UPDATE RESTRICT
) ENGINE = InnoDB AUTO_INCREMENT = 4 CHARACTER SET = utf8mb4 COLLATE = utf8mb4_unicode_ci ROW_FORMAT = DYNAMIC;

-- ----------------------------
-- Records of student_org_registration_documents
-- ----------------------------

-- ----------------------------
-- Table structure for student_organizations
-- ----------------------------
DROP TABLE IF EXISTS `student_organizations`;
CREATE TABLE `student_organizations`  (
  `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT,
  `user_id` bigint UNSIGNED NULL DEFAULT NULL,
  `accreditation_no` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NULL DEFAULT NULL,
  `organization_name` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NULL DEFAULT NULL,
  `acronym` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NULL DEFAULT NULL,
  `type_of_org_id` bigint UNSIGNED NOT NULL,
  `registration_status` int NOT NULL,
  `clearance_status` int NOT NULL,
  `image_path` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`) USING BTREE
) ENGINE = InnoDB AUTO_INCREMENT = 103 CHARACTER SET = utf8mb4 COLLATE = utf8mb4_unicode_ci ROW_FORMAT = DYNAMIC;

-- ----------------------------
-- Records of student_organizations
-- ----------------------------
INSERT INTO `student_organizations` VALUES (1, 1, 'CMU-R-OSA-UW-001', 'Supreme Student Council', 'SSC', 1, 1, 1, 'studentOrgProfilePics66275f4128d636.41220259/ssclogo.jpg', NULL, '2024-05-20 16:32:59');
INSERT INTO `student_organizations` VALUES (2, 2, 'CMU-R-OSA-UW-002', 'University Senior Students\' Council', 'USSCO', 1, 1, 1, NULL, NULL, '2024-05-20 16:32:59');
INSERT INTO `student_organizations` VALUES (3, 3, 'CMU-R-OSA-UW-003', 'The Central Post', 'CP', 1, 1, 1, 'studentOrgProfilePics6623df599bb203.82075746/292490790_417807530364094_7074753344281186969_n.jpg', NULL, '2024-05-20 16:32:59');
INSERT INTO `student_organizations` VALUES (4, 4, 'CMU-R-OSA-UW-004', 'Siglakas Club', 'SC', 1, 1, 1, NULL, NULL, '2024-05-20 16:32:59');
INSERT INTO `student_organizations` VALUES (5, 5, 'CMU-R-OSA-UW-005', 'BLAZER 2024', 'BLAZER', 1, 1, 1, NULL, NULL, '2024-05-20 16:20:23');
INSERT INTO `student_organizations` VALUES (6, 6, 'CMU-R-OSA-UW-006', 'Association of Recognized Student Organization ', 'ARSO', 1, 1, 1, NULL, NULL, '2024-05-20 16:32:59');
INSERT INTO `student_organizations` VALUES (7, 7, 'CMU-R-OSA-CC-001', 'College of Education Student Council Organization', 'COEDSCO', 2, 1, 1, NULL, NULL, '2024-05-20 16:32:59');
INSERT INTO `student_organizations` VALUES (8, 8, 'CMU-R-OSA-CC-002', 'College of Nursing Student Council Organization', 'CONSCO', 2, 1, 1, NULL, NULL, '2024-05-20 16:32:59');
INSERT INTO `student_organizations` VALUES (9, 9, 'CMU-R-OSA-CC-003', 'College of Human Ecology Student Council Organization', 'COHESCO', 2, 1, 1, NULL, NULL, '2024-05-20 16:32:59');
INSERT INTO `student_organizations` VALUES (10, 10, 'CMU-R-OSA-CC-004', 'College of Arts and Sciences Student Council Organization', 'CASSCO', 2, 1, 1, NULL, NULL, '2024-05-20 16:32:59');
INSERT INTO `student_organizations` VALUES (11, 11, 'CMU-R-OSA-CC-005', 'College of Agriculture Student Council Organization', 'COASCO', 2, 1, 1, NULL, NULL, '2024-05-20 16:32:59');
INSERT INTO `student_organizations` VALUES (12, 12, 'CMU-R-OSA-CC-006', 'College of Forestry and Environmental Science Student Council Organization', 'COFESSCO', 2, 1, 1, NULL, NULL, '2024-05-20 16:32:59');
INSERT INTO `student_organizations` VALUES (13, 13, 'CMU-R-OSA-CC-007', 'College of Engineering Student Council Organization', 'COESCO', 2, 1, 1, NULL, NULL, '2024-05-20 16:32:59');
INSERT INTO `student_organizations` VALUES (14, 14, 'CMU-R-OSA-CC-008', 'College of Veterinary Medicine Student Council Organization', 'CVMSCO', 2, 1, 1, NULL, NULL, '2024-05-20 16:32:59');
INSERT INTO `student_organizations` VALUES (15, 15, 'CMU-R-OSA-CC-009', 'College of Information Sciences & Computing Student Council Organization', 'CISCO', 2, 1, 1, NULL, NULL, '2024-05-20 16:32:59');
INSERT INTO `student_organizations` VALUES (16, 16, 'CMU-R-OSA-CC-010', 'College of Business and Management Student Council Organization', 'CBMSCO', 2, 1, 1, NULL, NULL, '2024-05-20 16:32:59');
INSERT INTO `student_organizations` VALUES (17, 17, 'CMU-R-OSA-CO-001', 'Science Education Society', 'SCIEDSOC', 3, 1, 1, NULL, NULL, '2024-05-20 16:32:59');
INSERT INTO `student_organizations` VALUES (18, 18, 'CMU-R-OSA-CO-002', 'Biological Sciences Graduate Students\' Association', 'BSGSA', 3, 1, 1, NULL, NULL, '2024-05-20 16:32:59');
INSERT INTO `student_organizations` VALUES (19, 19, 'CMU-R-OSA-CO-003', 'Civil Engineering Student Society ', 'CESS', 3, 1, 1, NULL, NULL, '2024-05-20 16:32:59');
INSERT INTO `student_organizations` VALUES (20, 20, 'CMU-R-OSA-CO-004', 'Junior Philippine Institute of Civil Engineers Central Mindanao University Chapter', 'JPICE-CMUC', 3, 1, 1, NULL, NULL, '2024-05-20 16:32:59');
INSERT INTO `student_organizations` VALUES (21, 21, 'CMU-R-OSA-CO-005', 'Operation Management Students Association', 'OMSA', 3, 1, 1, NULL, NULL, '2024-05-20 16:32:59');
INSERT INTO `student_organizations` VALUES (22, 22, 'CMU-R-OSA-CO-006', 'Le Sociology Society', 'LeSoS', 3, 1, 1, NULL, NULL, '2024-05-20 16:32:59');
INSERT INTO `student_organizations` VALUES (23, 23, 'CMU-R-OSA-CO-007', 'League of Political Science Students', 'LPSS', 3, 1, 1, NULL, NULL, '2024-05-20 16:32:59');
INSERT INTO `student_organizations` VALUES (24, 24, 'CMU-R-OSA-CO-008', 'Philippine Association Nutrition-Alpha Pi Chapter', 'PAN-AP', 3, 1, 1, NULL, NULL, '2024-05-20 16:32:59');
INSERT INTO `student_organizations` VALUES (25, 25, 'CMU-R-OSA-CO-009', 'Veterinary Medical Students\' Association-International Veterinary Students\' Association', 'VMSA-IVSA', 3, 1, 1, NULL, NULL, '2024-05-20 16:32:59');
INSERT INTO `student_organizations` VALUES (26, 26, 'CMU-R-OSA-CO-010', 'Psychology Student Circle', 'PSC', 3, 1, 1, NULL, NULL, '2024-05-20 16:32:59');
INSERT INTO `student_organizations` VALUES (27, 27, 'CMU-R-OSA-CO-011', 'Circle of Dynamic Language Education Students', 'CODLES', 3, 1, 1, NULL, NULL, '2024-05-20 16:32:59');
INSERT INTO `student_organizations` VALUES (28, 28, 'CMU-R-OSA-CO-012', 'Organization of Animal Science Major Students', 'ORGASMS', 3, 1, 1, NULL, NULL, '2024-05-20 16:32:59');
INSERT INTO `student_organizations` VALUES (29, 29, 'CMU-R-OSA-CO-013', 'Junior Philippine Association for Home Economics in State Colleges and Universities', 'JPAHESCU', 3, 1, 1, NULL, NULL, '2024-05-20 16:32:59');
INSERT INTO `student_organizations` VALUES (30, 30, 'CMU-R-OSA-CO-014', 'CMU-Biological Society', 'BIOSOC', 3, 1, 1, NULL, NULL, '2024-05-20 16:32:59');
INSERT INTO `student_organizations` VALUES (31, 31, 'CMU-R-OSA-CO-015', 'Philippine Economic Society', 'PES', 3, 1, 1, NULL, NULL, '2024-05-20 16:32:59');
INSERT INTO `student_organizations` VALUES (32, 32, 'CMU-R-OSA-CO-016', 'Junior Finance Executives-CMU', 'JFINEX', 3, 1, 1, NULL, NULL, '2024-05-20 16:32:59');
INSERT INTO `student_organizations` VALUES (33, 33, 'CMU-R-OSA-CO-017', 'Central Mindanao University-Junior Marketing Association', 'JMA', 3, 1, 1, NULL, NULL, '2024-05-20 16:32:59');
INSERT INTO `student_organizations` VALUES (34, 34, 'CMU-R-OSA-CO-018', 'CMU-Plant Pathology Society', 'CMU-PPS', 3, 1, 1, NULL, NULL, '2024-05-20 16:32:59');
INSERT INTO `student_organizations` VALUES (35, 35, 'CMU-R-OSA-CO-019', 'Association of Filipino Forestry Students', 'AFFS', 3, 1, 1, NULL, NULL, '2024-05-20 16:32:59');
INSERT INTO `student_organizations` VALUES (36, 36, 'CMU-R-OSA-CO-020', 'CMU-Chemical Society', 'CHEMSOC', 3, 1, 1, NULL, NULL, '2024-05-20 16:32:59');
INSERT INTO `student_organizations` VALUES (37, 37, 'CMU-R-OSA-CO-021', 'The Association of Language Erudite', 'TALE', 3, 1, 1, NULL, NULL, '2024-05-20 16:32:59');
INSERT INTO `student_organizations` VALUES (38, 38, 'CMU-R-OSA-CO-022', 'Philippine Society of Agricultural and Biosystems Engineering-Pre-Professional Group', 'PSABE-PPG', 3, 1, 1, NULL, NULL, '2024-05-20 16:32:59');
INSERT INTO `student_organizations` VALUES (39, 39, 'CMU-R-OSA-CO-023', 'Junior Agribusiness Executive Society', 'JABES', 3, 1, 1, NULL, NULL, '2024-05-20 16:32:59');
INSERT INTO `student_organizations` VALUES (40, 40, 'CMU-R-OSA-CO-024', 'Les Toque Society', 'LTS', 3, 1, 1, NULL, NULL, '2024-05-20 16:32:59');
INSERT INTO `student_organizations` VALUES (41, 41, 'CMU-R-OSA-CO-025', 'Society of Electrical Engineering Students', 'SEES', 3, 1, 1, NULL, NULL, '2024-05-20 16:32:59');
INSERT INTO `student_organizations` VALUES (42, 42, 'CMU-R-OSA-CO-026', 'Mathematics Society', 'MATHSOC', 3, 1, 1, NULL, NULL, '2024-05-20 16:32:59');
INSERT INTO `student_organizations` VALUES (43, 43, 'CMU-R-OSA-CO-027', 'Philippine Association of Food Technologist Sigma Chapter', 'PAFT-Sigma ', 3, 1, 1, NULL, NULL, '2024-05-20 16:32:59');
INSERT INTO `student_organizations` VALUES (44, 44, 'CMU-R-OSA-CO-028', 'Institute of Integrated Electrical Engineers-Council of Student Chapters', 'IIEE-CSC', 3, 1, 1, NULL, NULL, '2024-05-20 16:32:59');
INSERT INTO `student_organizations` VALUES (45, 45, 'CMU-R-OSA-CO-029', 'Mechanical Engineering Student Association', 'MESA', 3, 1, 1, NULL, NULL, '2024-05-20 16:32:59');
INSERT INTO `student_organizations` VALUES (46, 46, 'CMU-R-OSA-CO-030', 'CMU Banwang Pangkasaysayan', 'CMU-BAKAS', 3, 1, 1, NULL, NULL, '2024-05-20 16:32:59');
INSERT INTO `student_organizations` VALUES (47, 47, 'CMU-R-OSA-CO-031', 'Environmental Science Student Society', 'ENVIROSS', 3, 1, 1, NULL, NULL, '2024-05-20 16:32:59');
INSERT INTO `student_organizations` VALUES (48, 48, 'CMU-R-OSA-CO-032', 'Central Mindanao University Entomological Society', 'CMU-ENTOMSOC', 3, 1, 1, NULL, NULL, '2024-05-20 16:32:59');
INSERT INTO `student_organizations` VALUES (49, 49, 'CMU-R-OSA-CO-033', 'Central Mindanao University Soil Science Society', 'CMUSSS', 3, 1, 1, NULL, NULL, '2024-05-20 16:32:59');
INSERT INTO `student_organizations` VALUES (50, 50, 'CMU-R-OSA-CO-034', 'Junior Philippine Society of Mechanical Engineers-CMU Chapter', 'JPSME', 3, 1, 1, NULL, NULL, '2024-05-20 16:32:59');
INSERT INTO `student_organizations` VALUES (51, 51, 'CMU-R-OSA-CO-035', 'Horticulture United Student Society', 'HORTUSS', 3, 1, 1, NULL, NULL, '2024-05-20 16:32:59');
INSERT INTO `student_organizations` VALUES (52, 52, 'CMU-R-OSA-CO-036', 'Philippine Association of Students in Office Administration', 'PASOA', 3, 1, 1, NULL, NULL, '2024-05-20 16:32:59');
INSERT INTO `student_organizations` VALUES (53, 53, 'CMU-R-OSA-CO-037', 'Society of Agricultural Engineering Students', 'SAGES', 3, 1, 1, NULL, NULL, '2024-05-20 16:32:59');
INSERT INTO `student_organizations` VALUES (54, 54, 'CMU-R-OSA-CO-038', 'Plant Breeding and Agronomy Student Society', 'PBASS', 3, 1, 1, NULL, NULL, '2024-05-20 16:32:59');
INSERT INTO `student_organizations` VALUES (55, 55, 'CMU-R-OSA-CO-039', 'Business Management Association of the Philippines', 'BMAP', 3, 1, 1, NULL, NULL, '2024-05-20 16:32:59');
INSERT INTO `student_organizations` VALUES (56, 56, 'CMU-R-OSA-CO-040', 'Society of Agricultural Educators and Extensionists', 'SAEEx', 3, 1, 1, NULL, NULL, '2024-05-20 16:32:59');
INSERT INTO `student_organizations` VALUES (57, 57, 'CMU-R-OSA-CO-041', 'Junior Philippine Institute of Accountants', 'JPIA', 3, 1, 1, NULL, NULL, '2024-05-20 16:32:59');
INSERT INTO `student_organizations` VALUES (58, 58, 'CMU-R-OSA-CO-042', 'Philalethia Guild', 'Philalethia Guild', 3, 1, 1, NULL, NULL, '2024-05-20 16:32:59');
INSERT INTO `student_organizations` VALUES (59, 59, 'CMU-R-OSA-CO-043', 'Central Mindanao University-Physics Society', 'CMUPS', 3, 1, 1, NULL, NULL, '2024-05-20 16:32:59');
INSERT INTO `student_organizations` VALUES (60, 60, 'CMU-R-OSA-CO-044', 'Human Kinetics Club ', 'HKC', 3, 1, 1, NULL, NULL, '2024-05-20 16:32:59');
INSERT INTO `student_organizations` VALUES (61, 61, 'CMU-R-OSA-CO-045', 'Development Communication', 'CMU-DC', 3, 1, 1, NULL, NULL, '2024-05-20 16:32:59');
INSERT INTO `student_organizations` VALUES (62, 62, 'CMU-R-OSA-NC-001', 'ARTIZAN', 'ARTIZAN', 4, 1, 1, NULL, NULL, '2024-05-20 16:32:59');
INSERT INTO `student_organizations` VALUES (63, 63, 'CMU-R-OSA-NC-002', 'Lakas Angkan Youth Fellowship', 'LAYF', 4, 1, 1, NULL, NULL, '2024-05-20 16:32:59');
INSERT INTO `student_organizations` VALUES (64, 64, 'CMU-R-OSA-NC-003', 'Vet Posse Comitatus D.O.D.G.E', 'VPC-DODGE', 4, 1, 1, NULL, NULL, '2024-05-20 16:32:59');
INSERT INTO `student_organizations` VALUES (65, 65, 'CMU-R-OSA-NC-004', 'Central Mindanao University College Red Cross Youth Council', 'CMU-CRCYC', 4, 1, 1, NULL, NULL, '2024-05-20 16:32:59');
INSERT INTO `student_organizations` VALUES (66, 66, 'CMU-R-OSA-NC-005', 'CMU Association of DOST-SEI Scholars', 'CADS', 4, 1, 1, NULL, NULL, '2024-05-20 16:32:59');
INSERT INTO `student_organizations` VALUES (67, 67, 'CMU-R-OSA-NC-006', 'Society for the Advancement of Animal Science ', 'SAAS', 4, 1, 1, NULL, NULL, '2024-05-20 16:32:59');
INSERT INTO `student_organizations` VALUES (68, 68, 'CMU-R-OSA-NC-007', 'Christian Students\' Fellowship', 'CSF', 4, 1, 1, NULL, NULL, '2024-05-20 16:32:59');
INSERT INTO `student_organizations` VALUES (69, 69, 'CMU-R-OSA-NC-008', 'Philippine Student Alliance Lay Movement Inc.', 'PSALM INC.', 4, 1, 1, NULL, NULL, '2024-05-20 16:32:59');
INSERT INTO `student_organizations` VALUES (70, 70, 'CMU-R-OSA-NC-009', 'Philippine Association of Aggies Incorporated', 'PAAI-CMU', 4, 1, 1, NULL, NULL, '2024-05-20 16:32:59');
INSERT INTO `student_organizations` VALUES (71, 71, 'CMU-R-OSA-NC-010', 'CMU-Musuan Karate Do Club ', 'CMUMKDC', 4, 1, 1, NULL, NULL, '2024-05-20 16:32:59');
INSERT INTO `student_organizations` VALUES (72, 72, 'CMU-R-OSA-NC-011', 'Halad to Health in Central Mindanao University', 'HTHCMU', 4, 1, 1, NULL, NULL, '2024-05-20 16:32:59');
INSERT INTO `student_organizations` VALUES (73, 73, 'CMU-R-OSA-NC-012', 'Crisis Intervention Team', 'CIT', 4, 1, 1, NULL, NULL, '2024-05-20 16:32:59');
INSERT INTO `student_organizations` VALUES (74, 74, 'CMU-R-OSA-NC-013', 'Environmental Conservation Organization-Venture Club Philippines, Incorporated Central Mindanao University Chapter', 'ECO-VENTURE', 4, 1, 1, NULL, NULL, '2024-05-20 16:32:59');
INSERT INTO `student_organizations` VALUES (75, 75, 'CMU-R-OSA-NC-014', 'Christian on Campus', 'COC', 4, 1, 1, NULL, NULL, '2024-05-20 16:32:59');
INSERT INTO `student_organizations` VALUES (76, 76, 'CMU-R-OSA-NC-015', 'CFC-YFC CAMPUS BASED', 'CFC-YFC', 4, 1, 1, NULL, NULL, '2024-05-20 16:32:59');
INSERT INTO `student_organizations` VALUES (77, 77, 'CMU-R-OSA-NC-016', 'Movement of Adventist Student-Adventist Ministry to College and University Student', 'MAS-AMICUS', 4, 1, 1, NULL, NULL, '2024-05-20 16:32:59');
INSERT INTO `student_organizations` VALUES (78, 78, 'CMU-R-OSA-NC-017', 'Tertiary Education Subsidy Grantees Organization', 'TESGO', 4, 1, 1, NULL, NULL, '2024-05-20 16:32:59');
INSERT INTO `student_organizations` VALUES (79, 79, 'CMU-R-OSA-NC-018', 'Central Mindanao University-Debate Varsity', 'CDV', 4, 1, 1, NULL, NULL, '2024-05-20 16:32:59');
INSERT INTO `student_organizations` VALUES (80, 80, 'CMU-R-OSA-NC-019', 'Christ\'s Youth in Action -CMU Unit', 'CYA', 4, 1, 1, NULL, NULL, '2024-05-20 16:32:59');
INSERT INTO `student_organizations` VALUES (81, 81, 'CMU-R-OSA-NC-020', 'Christian Brotherhood International', 'CBI', 4, 1, 1, NULL, NULL, '2024-05-20 16:32:59');
INSERT INTO `student_organizations` VALUES (82, 82, 'CMU-R-OSA-NC-021', 'CMU-DOST Strand Scholar\'s Organization', 'CDSSO', 4, 1, 1, NULL, NULL, '2024-05-20 16:32:59');
INSERT INTO `student_organizations` VALUES (83, 83, 'CMU-R-OSA-NC-022', 'RANCHER Club Philippines', 'RANCHER', 4, 1, 1, NULL, NULL, '2024-05-20 16:32:59');
INSERT INTO `student_organizations` VALUES (84, 84, 'CMU-R-OSA-NC-023', 'VOX Veterinarius', 'VOX', 4, 1, 1, NULL, NULL, '2024-05-20 16:32:59');
INSERT INTO `student_organizations` VALUES (85, 85, 'CMU-R-OSA-NC-024', 'CMU Peer Counselors', 'CMU PC', 4, 1, 1, NULL, NULL, '2024-05-20 16:32:59');
INSERT INTO `student_organizations` VALUES (86, 86, 'CMU-R-OSA-NC-025', 'CMU E-Sport', 'CMUES', 4, 1, 1, NULL, NULL, '2024-05-20 16:32:59');
INSERT INTO `student_organizations` VALUES (87, 87, 'CMU-R-OSA-GO-001', 'Venerable Knight and Lady Veterinarians', 'VKV-VLV', 5, 1, 1, NULL, NULL, '2024-05-20 16:32:59');
INSERT INTO `student_organizations` VALUES (88, 88, 'CMU-R-OSA-GO-002', 'Delta Fraternity and Sorority International 1961', 'DELTANS', 5, 1, 1, NULL, NULL, '2024-05-20 16:32:59');
INSERT INTO `student_organizations` VALUES (89, 89, 'CMU-R-OSA-GO-003', 'Beta Delta Rho', 'BARONS', 5, 1, 1, NULL, NULL, '2024-05-20 16:32:59');
INSERT INTO `student_organizations` VALUES (90, 90, 'CMU-R-OSA-GO-004', 'Alpha Phi Omega', 'APO', 5, 1, 1, NULL, NULL, '2024-05-20 16:32:59');
INSERT INTO `student_organizations` VALUES (91, 91, 'CMU-R-OSA-GO-005', 'Beta Sigma Fraternity/Sigma Beta Sorority', 'BETANS', 5, 1, 1, NULL, NULL, '2024-05-20 16:32:59');
INSERT INTO `student_organizations` VALUES (92, 92, 'CMU-R-OSA-GO-006', 'Tau Gamma Phi/Tau Gamma Sigma Triskelion\'s Grand Fraternity and Sorority', 'TRISKELIONS', 5, 1, 1, NULL, NULL, '2024-05-20 16:32:59');
INSERT INTO `student_organizations` VALUES (93, 93, 'CMU-R-OSA-GO-007', 'Gamma Phi Omicron Fraternity and Sorority', 'GAPHO', 5, 1, 1, NULL, NULL, '2024-05-20 16:33:00');
INSERT INTO `student_organizations` VALUES (94, 94, 'CMU-R-OSA-GO-008', 'Gamma Kappa Rho-Sigma Gamma Lambda', 'GAMMANS', 5, 1, 1, NULL, NULL, '2024-05-20 16:33:00');
INSERT INTO `student_organizations` VALUES (95, 95, 'CMU-R-OSA-GO-009', 'Alpha Sigma Phi Philippines, International Collegiate Service Organization, Inc.', 'ALPHANS', 5, 1, 1, NULL, NULL, '2024-05-20 17:11:37');
INSERT INTO `student_organizations` VALUES (96, 96, 'CMU-R-OSA-GO-010', 'THETA SIGMA PHI-SIGMA THETA PHI', 'THETANS', 5, 1, 1, NULL, NULL, '2024-05-20 16:33:00');
INSERT INTO `student_organizations` VALUES (97, 97, 'CMU-R-OSA-GO-011', 'Sigma Upsilon-Upsilon Lambda International Service Fraternity/Sorority', 'SU-UL', 5, 1, 1, NULL, NULL, '2024-05-20 16:33:00');
INSERT INTO `student_organizations` VALUES (98, 100, 'special-access-6969', 'Software Development Department', 'SDD', 1, 1, 1, 'orgsPics662732bb43a074.67647207/SDD LOGO.png', '2024-04-23 12:03:22', '2024-05-20 16:33:00');
INSERT INTO `student_organizations` VALUES (99, 101, 'CMU - 2323423', 'Playoffs fanboys', 'PF', 1, 1, 1, 'orgsPics6628727e4080f4.87113489/colors.png', '2024-04-24 10:49:28', '2024-05-20 16:33:00');
INSERT INTO `student_organizations` VALUES (100, 102, 'CMU-0001111', 'Software Development Babies', 'SDB', 4, 1, 1, 'orgsPics6628b2bc8047b8.18088128/426396316_677804957765413_4027801608816599133_n.png', '2024-04-24 15:21:52', '2024-05-20 16:33:00');
INSERT INTO `student_organizations` VALUES (101, 103, '8795612345', 'Movement of Adventist Student Society', 'MASS', 4, 1, 1, NULL, '2024-04-30 10:17:53', '2024-05-20 16:33:00');
INSERT INTO `student_organizations` VALUES (102, 104, NULL, 'Sample Organization', 'SO', 4, 1, 1, 'orgsPics664b0215d69044.91507758/person (8).png', '2024-05-20 15:56:33', '2024-05-20 16:33:00');

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
  `image_path` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`) USING BTREE,
  INDEX `students_program_id_foreign`(`program_id` ASC) USING BTREE,
  CONSTRAINT `students_program_id_foreign` FOREIGN KEY (`program_id`) REFERENCES `programs` (`id`) ON DELETE RESTRICT ON UPDATE RESTRICT
) ENGINE = InnoDB AUTO_INCREMENT = 28 CHARACTER SET = utf8mb4 COLLATE = utf8mb4_unicode_ci ROW_FORMAT = DYNAMIC;

-- ----------------------------
-- Records of students
-- ----------------------------
INSERT INTO `students` VALUES (12, '2020305555', 'Ken Bien Mar', 'L', 'Caballes', NULL, 1, '09123456789', 16, 'membersPics66235bb3299225.10699141/R.jpg', '2024-04-20 14:08:32', '2024-04-20 14:08:32');
INSERT INTO `students` VALUES (13, '2020305556', 'Gen Francy', 'A', 'Evangelista', NULL, 0, '09123456789', 46, 'membersPics66235befda9cd0.79462986/R.jpg', '2024-04-20 14:09:24', '2024-04-20 14:09:24');
INSERT INTO `students` VALUES (14, '2020305557', 'Fiona Caith', 'D', 'Penaso', NULL, 1, '09123456789', 38, 'membersPics66235c2bdc9096.27431887/R.jpg', '2024-04-20 14:10:24', '2024-04-20 14:10:24');
INSERT INTO `students` VALUES (15, '2020305558', 'Judy Ann', 'P', 'Cuaresma', NULL, 0, '09123456789', 14, 'membersPics66235c5dd4d702.40838429/R.jpg', '2024-04-20 14:11:16', '2024-04-20 14:11:16');
INSERT INTO `students` VALUES (16, '2020305559', 'Christian Rey', 'B', 'Cuyos', NULL, 1, '09123456789', 20, 'membersPics66235c936dd119.99742589/R.jpg', '2024-04-20 14:12:16', '2024-04-20 14:12:16');
INSERT INTO `students` VALUES (17, '2020305560', 'Ness Angela', 'P', 'Presbitero', NULL, 0, '09123123123', 23, 'membersPics66235cd0a45aa0.06670976/R.jpg', '2024-04-20 14:13:04', '2024-04-20 14:13:04');
INSERT INTO `students` VALUES (18, '2020305061', 'Kier Vincent', 'S', 'Sevillejo', NULL, 1, '09123456789', 1, 'membersPics66235d03ea9f81.75721505/R.jpg', '2024-04-20 14:14:03', '2024-04-20 14:14:03');
INSERT INTO `students` VALUES (19, '2020305062', 'Angelie', 'P', 'Salisid', NULL, 1, '09123123123', 23, 'membersPics66235d3c2ccbb8.06732593/R.jpg', '2024-04-20 14:14:46', '2024-04-20 14:14:46');
INSERT INTO `students` VALUES (20, '2020302269', 'Allen Keith', 'Anib', 'Aradillos', NULL, 1, '09096743922', 46, 'membersPics6624ad4eb7d1e1.95418132/5R-4.JPG', '2024-04-21 14:08:30', '2024-04-21 14:08:30');
INSERT INTO `students` VALUES (21, '2020302213', 'Alan Ignatius', 'Kaamiño', 'Monicit', NULL, 1, '123123123', 14, 'membersPics6629bcfc2e5140.46317816/430294754_3809683902598020_6863872859887185559_n.jpg', '2024-04-25 10:17:02', '2024-04-25 10:17:02');
INSERT INTO `students` VALUES (22, '2020302213', 'Alan Ignatius', 'Kaamiño', 'Monicit', NULL, 1, '3453543535', 14, 'membersPics6629bd672239d1.99120648/430294754_3809683902598020_6863872859887185559_n.jpg', '2024-04-25 10:18:23', '2024-04-25 10:18:23');
INSERT INTO `students` VALUES (23, '2020301634', 'Alyanna Claire', 'Kaamiño', 'Monicit', NULL, 0, '3453543535', 46, 'membersPics6629c0f1d57272.28982289/408369526_896583502177223_7422374962545898272_n.jpg', '2024-04-25 10:33:24', '2024-04-25 10:33:24');
INSERT INTO `students` VALUES (24, '2020301635', 'Mae Therese', 'Kaamiño', 'Monicit', NULL, 0, '3453543535', 47, 'membersPics6629c33b4f13c5.42299466/355503555_3428610917406940_3655412798900031821_n.jpg', '2024-04-25 10:43:22', '2024-04-25 10:43:22');
INSERT INTO `students` VALUES (25, '2020302567', 'Sample', 'Student', 'Data', NULL, 1, '09123456788', 46, 'membersPics664abdf6818f03.40143908/R.jpg', '2024-05-20 11:05:31', '2024-05-20 11:05:31');
INSERT INTO `students` VALUES (26, '2020302212', 'Allen Keith', 'Anib', 'Aradillos', NULL, 1, '09123456789', 46, 'membersPics664b00144bf327.60249603/asd.jpg', '2024-05-20 15:48:31', '2024-05-20 15:48:31');
INSERT INTO `students` VALUES (27, '2020300007', 'Ricah', 'Sebial', 'Pareja', NULL, 0, '09154151643', 13, 'membersPics664b0337476268.89736385/ias act 8.png', '2024-05-20 16:01:43', '2024-05-20 16:01:43');

-- ----------------------------
-- Table structure for telescope_entries
-- ----------------------------
DROP TABLE IF EXISTS `telescope_entries`;
CREATE TABLE `telescope_entries`  (
  `sequence` bigint UNSIGNED NOT NULL AUTO_INCREMENT,
  `uuid` char(36) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `batch_id` char(36) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `family_hash` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NULL DEFAULT NULL,
  `should_display_on_index` tinyint(1) NOT NULL DEFAULT 1,
  `type` varchar(20) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `content` longtext CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` datetime NULL DEFAULT NULL,
  PRIMARY KEY (`sequence`) USING BTREE,
  UNIQUE INDEX `telescope_entries_uuid_unique`(`uuid` ASC) USING BTREE,
  INDEX `telescope_entries_batch_id_index`(`batch_id` ASC) USING BTREE,
  INDEX `telescope_entries_family_hash_index`(`family_hash` ASC) USING BTREE,
  INDEX `telescope_entries_created_at_index`(`created_at` ASC) USING BTREE,
  INDEX `telescope_entries_type_should_display_on_index_index`(`type` ASC, `should_display_on_index` ASC) USING BTREE
) ENGINE = InnoDB AUTO_INCREMENT = 194 CHARACTER SET = utf8mb4 COLLATE = utf8mb4_unicode_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Records of telescope_entries
-- ----------------------------

-- ----------------------------
-- Table structure for telescope_entries_tags
-- ----------------------------
DROP TABLE IF EXISTS `telescope_entries_tags`;
CREATE TABLE `telescope_entries_tags`  (
  `entry_uuid` char(36) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `tag` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  PRIMARY KEY (`entry_uuid`, `tag`) USING BTREE,
  INDEX `telescope_entries_tags_tag_index`(`tag` ASC) USING BTREE,
  CONSTRAINT `telescope_entries_tags_entry_uuid_foreign` FOREIGN KEY (`entry_uuid`) REFERENCES `telescope_entries` (`uuid`) ON DELETE CASCADE ON UPDATE RESTRICT
) ENGINE = InnoDB CHARACTER SET = utf8mb4 COLLATE = utf8mb4_unicode_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Records of telescope_entries_tags
-- ----------------------------

-- ----------------------------
-- Table structure for telescope_monitoring
-- ----------------------------
DROP TABLE IF EXISTS `telescope_monitoring`;
CREATE TABLE `telescope_monitoring`  (
  `tag` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  PRIMARY KEY (`tag`) USING BTREE
) ENGINE = InnoDB CHARACTER SET = utf8mb4 COLLATE = utf8mb4_unicode_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Records of telescope_monitoring
-- ----------------------------

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

-- ----------------------------
-- Table structure for type_of_organizations
-- ----------------------------
DROP TABLE IF EXISTS `type_of_organizations`;
CREATE TABLE `type_of_organizations`  (
  `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT,
  `description` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`) USING BTREE
) ENGINE = InnoDB AUTO_INCREMENT = 6 CHARACTER SET = utf8mb4 COLLATE = utf8mb4_unicode_ci ROW_FORMAT = DYNAMIC;

-- ----------------------------
-- Records of type_of_organizations
-- ----------------------------
INSERT INTO `type_of_organizations` VALUES (1, 'University Wide', NULL, NULL);
INSERT INTO `type_of_organizations` VALUES (2, 'College Council', NULL, NULL);
INSERT INTO `type_of_organizations` VALUES (3, 'Class', NULL, NULL);
INSERT INTO `type_of_organizations` VALUES (4, 'Non-Class', NULL, NULL);
INSERT INTO `type_of_organizations` VALUES (5, 'Greek', NULL, NULL);

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

-- ----------------------------
-- Table structure for users
-- ----------------------------
DROP TABLE IF EXISTS `users`;
CREATE TABLE `users`  (
  `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT,
  `employee_id` bigint UNSIGNED NOT NULL,
  `name` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `password` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `remember_token` varchar(100) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`) USING BTREE,
  UNIQUE INDEX `users_email_unique`(`email` ASC) USING BTREE,
  INDEX `users_employee_id_foreign`(`employee_id` ASC) USING BTREE,
  CONSTRAINT `users_employee_id_foreign` FOREIGN KEY (`employee_id`) REFERENCES `employees` (`id`) ON DELETE RESTRICT ON UPDATE RESTRICT
) ENGINE = InnoDB AUTO_INCREMENT = 105 CHARACTER SET = utf8mb4 COLLATE = utf8mb4_unicode_ci ROW_FORMAT = DYNAMIC;

-- ----------------------------
-- Records of users
-- ----------------------------
INSERT INTO `users` VALUES (1, 1, 'SSC', 'ssc_cmu@gmail.com', '2024-03-01 13:42:42', '$2y$12$w0SpcDhTyN7HxZ.i.9YSluQsiCJlydDrR3t8EdYsan2ZfrO/IPj56', NULL, NULL, '2024-04-20 23:07:28');
INSERT INTO `users` VALUES (2, 2, 'USSCO', 'ussco_cmu@gmail.com', '2024-03-01 13:42:42', '$2y$12$Pr9jix8Ub9YJ6.s8RQOXhunMV7IehkAH6/17cIuj9CTFAs97z3Q/q', NULL, NULL, NULL);
INSERT INTO `users` VALUES (3, 3, 'CP', 'cp_cmu@gmail.com', '2024-03-01 13:42:58', '$2y$12$Pr9jix8Ub9YJ6.s8RQOXhunMV7IehkAH6/17cIuj9CTFAs97z3Q/q', NULL, NULL, NULL);
INSERT INTO `users` VALUES (4, 4, 'SC', 'sc_cmu@gmail.com', '2024-03-01 13:43:01', '$2y$12$Pr9jix8Ub9YJ6.s8RQOXhunMV7IehkAH6/17cIuj9CTFAs97z3Q/q', NULL, NULL, NULL);
INSERT INTO `users` VALUES (5, 5, 'BLAZER', 'blazer_cmu@gmail.com', '2024-03-01 13:43:03', '$2y$12$Pr9jix8Ub9YJ6.s8RQOXhunMV7IehkAH6/17cIuj9CTFAs97z3Q/q', NULL, NULL, NULL);
INSERT INTO `users` VALUES (6, 6, 'ARSO', 'arso_cmu@gmail.com', '2024-03-01 13:43:04', '$2y$12$Pr9jix8Ub9YJ6.s8RQOXhunMV7IehkAH6/17cIuj9CTFAs97z3Q/q', NULL, NULL, NULL);
INSERT INTO `users` VALUES (7, 7, 'COEDSCO', 'coedsco_cmu@gmail.com', '2024-03-01 13:43:08', '$2y$12$Pr9jix8Ub9YJ6.s8RQOXhunMV7IehkAH6/17cIuj9CTFAs97z3Q/q', NULL, NULL, NULL);
INSERT INTO `users` VALUES (8, 8, 'CONSCO', 'consco_cmu@gmail.com', '2024-03-01 13:43:10', '$2y$12$Pr9jix8Ub9YJ6.s8RQOXhunMV7IehkAH6/17cIuj9CTFAs97z3Q/q', NULL, NULL, NULL);
INSERT INTO `users` VALUES (9, 9, 'COHESCO', 'cohesco_cmu@gmail.com', '2024-03-01 13:43:11', '$2y$12$Pr9jix8Ub9YJ6.s8RQOXhunMV7IehkAH6/17cIuj9CTFAs97z3Q/q', NULL, NULL, NULL);
INSERT INTO `users` VALUES (10, 10, 'CASSCO', 'cassco_cmu@gmail.com', '2024-03-01 13:43:12', '$2y$12$Pr9jix8Ub9YJ6.s8RQOXhunMV7IehkAH6/17cIuj9CTFAs97z3Q/q', NULL, NULL, NULL);
INSERT INTO `users` VALUES (11, 11, 'COASCO', 'coasco_cmu@gmail.com', '2024-03-01 13:43:12', '$2y$2y$12$Pr9jix8Ub9YJ6.s8RQOXhunMV7IehkAH6/17cIuj9CTFAs97z3Q/q', NULL, NULL, NULL);
INSERT INTO `users` VALUES (12, 12, 'COFESSCO', 'cofessco_cmu@gmail.com', '2024-03-01 13:43:12', '$2y$12$Pr9jix8Ub9YJ6.s8RQOXhunMV7IehkAH6/17cIuj9CTFAs97z3Q/q', NULL, NULL, NULL);
INSERT INTO `users` VALUES (13, 13, 'COESCO', 'coesco_cmu@gmail.com', '2024-03-01 13:43:14', '$2y$12$Pr9jix8Ub9YJ6.s8RQOXhunMV7IehkAH6/17cIuj9CTFAs97z3Q/q', NULL, NULL, NULL);
INSERT INTO `users` VALUES (14, 14, 'CVMSCO', 'cvmsco_cmu@gmail.com', '2024-03-01 13:43:14', '$2y$12$Pr9jix8Ub9YJ6.s8RQOXhunMV7IehkAH6/17cIuj9CTFAs97z3Q/q', NULL, NULL, NULL);
INSERT INTO `users` VALUES (15, 15, 'CISCO', 'cisco_cmu@gmail.com', '2024-03-01 13:43:15', '$2y$12$Pr9jix8Ub9YJ6.s8RQOXhunMV7IehkAH6/17cIuj9CTFAs97z3Q/q', NULL, NULL, NULL);
INSERT INTO `users` VALUES (16, 16, 'CBMSCO', 'cbmsco_cmu@gmail.com', '2024-03-01 13:43:15', '$2y$12$Pr9jix8Ub9YJ6.s8RQOXhunMV7IehkAH6/17cIuj9CTFAs97z3Q/q', NULL, NULL, NULL);
INSERT INTO `users` VALUES (17, 17, 'SCIEDSOC', 'sciedsoc_cmu@gmail.com', '2024-03-01 13:43:16', '$2y$12$Pr9jix8Ub9YJ6.s8RQOXhunMV7IehkAH6/17cIuj9CTFAs97z3Q/q', NULL, NULL, NULL);
INSERT INTO `users` VALUES (18, 18, 'BSGSA', 'bsgsa_cmu@gmail.com', '2024-03-01 13:43:18', '$2y$12$Pr9jix8Ub9YJ6.s8RQOXhunMV7IehkAH6/17cIuj9CTFAs97z3Q/q', NULL, NULL, NULL);
INSERT INTO `users` VALUES (19, 19, 'CESS', 'cess_cmu@gmail.com', '2024-03-01 13:43:19', '$2y$12$Pr9jix8Ub9YJ6.s8RQOXhunMV7IehkAH6/17cIuj9CTFAs97z3Q/q', NULL, NULL, NULL);
INSERT INTO `users` VALUES (20, 20, 'JPICE-CMUC', 'jpice_cmuc_cmu@gmail.com', '2024-03-01 13:43:19', '$2y$12$Pr9jix8Ub9YJ6.s8RQOXhunMV7IehkAH6/17cIuj9CTFAs97z3Q/q', NULL, NULL, NULL);
INSERT INTO `users` VALUES (21, 21, 'OMSA', 'omsa_cmu@gmail.com', '2024-03-01 13:43:19', '$2y$12$Pr9jix8Ub9YJ6.s8RQOXhunMV7IehkAH6/17cIuj9CTFAs97z3Q/q', NULL, NULL, NULL);
INSERT INTO `users` VALUES (22, 22, 'LeSoS', 'lesos_cmu@gmail.com', '2024-03-01 13:43:21', '$2y$12$Pr9jix8Ub9YJ6.s8RQOXhunMV7IehkAH6/17cIuj9CTFAs97z3Q/q', NULL, NULL, NULL);
INSERT INTO `users` VALUES (23, 23, 'LPSS', 'lpss_cmu@gmail.com', '2024-03-01 13:43:22', '$2y$12$Pr9jix8Ub9YJ6.s8RQOXhunMV7IehkAH6/17cIuj9CTFAs97z3Q/q', NULL, NULL, NULL);
INSERT INTO `users` VALUES (24, 24, 'PAN-AP', 'pan_ap_cmu@gmail.com', '2024-03-01 13:43:22', '$2y$12$Pr9jix8Ub9YJ6.s8RQOXhunMV7IehkAH6/17cIuj9CTFAs97z3Q/q', NULL, NULL, NULL);
INSERT INTO `users` VALUES (25, 25, 'VMSA-IVSA', 'vmsa_ivsa_cmu@gmail.com', '2024-03-01 13:43:25', '$2y$12$Pr9jix8Ub9YJ6.s8RQOXhunMV7IehkAH6/17cIuj9CTFAs97z3Q/q', NULL, NULL, NULL);
INSERT INTO `users` VALUES (26, 26, 'PSC', 'psc_cmu@gmail.com', '2024-03-01 13:43:25', '$2y$12$Pr9jix8Ub9YJ6.s8RQOXhunMV7IehkAH6/17cIuj9CTFAs97z3Q/q', NULL, NULL, NULL);
INSERT INTO `users` VALUES (27, 27, 'CODLES', 'codles_cmu@gmail.com', '2024-03-01 13:43:26', '$2y$12$Pr9jix8Ub9YJ6.s8RQOXhunMV7IehkAH6/17cIuj9CTFAs97z3Q/q', NULL, NULL, NULL);
INSERT INTO `users` VALUES (28, 28, 'ORGASMS', 'orgasms_cmu@gmail.com', '2024-03-01 13:43:26', '$2y$12$Pr9jix8Ub9YJ6.s8RQOXhunMV7IehkAH6/17cIuj9CTFAs97z3Q/q', NULL, NULL, NULL);
INSERT INTO `users` VALUES (29, 29, 'JPAHESCU', 'jpahescu_cmu@gmail.com', '2024-03-01 13:43:27', '$2y$12$Pr9jix8Ub9YJ6.s8RQOXhunMV7IehkAH6/17cIuj9CTFAs97z3Q/q', NULL, NULL, NULL);
INSERT INTO `users` VALUES (30, 30, 'BIOSOC', 'biosoc_cmu@gmail.com', '2024-03-01 13:43:27', '$2y$12$Pr9jix8Ub9YJ6.s8RQOXhunMV7IehkAH6/17cIuj9CTFAs97z3Q/q', NULL, NULL, NULL);
INSERT INTO `users` VALUES (31, 31, 'PES', 'pes_cmu@gmail.com', '2024-03-01 13:43:28', '$2y$12$Pr9jix8Ub9YJ6.s8RQOXhunMV7IehkAH6/17cIuj9CTFAs97z3Q/q', NULL, NULL, NULL);
INSERT INTO `users` VALUES (32, 32, 'JFINEX', 'jfinex_cmu@gmail.com', '2024-03-01 13:43:28', '$2y$12$Pr9jix8Ub9YJ6.s8RQOXhunMV7IehkAH6/17cIuj9CTFAs97z3Q/q', NULL, NULL, NULL);
INSERT INTO `users` VALUES (33, 33, 'JMA', 'jma_cmu@gmail.com', '2024-03-01 13:43:28', '$2y$12$Pr9jix8Ub9YJ6.s8RQOXhunMV7IehkAH6/17cIuj9CTFAs97z3Q/q', NULL, NULL, NULL);
INSERT INTO `users` VALUES (34, 34, 'CMU-PPS', 'cmu_pps_cmu@gmail.com', '2024-03-01 13:43:29', '1234$2y$12$Pr9jix8Ub9YJ6.s8RQOXhunMV7IehkAH6/17cIuj9CTFAs97z3Q/q', NULL, NULL, NULL);
INSERT INTO `users` VALUES (35, 35, 'AFFS', 'affs_cmu@gmail.com', '2024-03-01 13:43:29', '$2y$12$Pr9jix8Ub9YJ6.s8RQOXhunMV7IehkAH6/17cIuj9CTFAs97z3Q/q', NULL, NULL, NULL);
INSERT INTO `users` VALUES (36, 36, 'CHEMSOC', 'chemsoc_cmu@gmail.com', '2024-03-01 13:43:29', '$2y$12$Pr9jix8Ub9YJ6.s8RQOXhunMV7IehkAH6/17cIuj9CTFAs97z3Q/q', NULL, NULL, NULL);
INSERT INTO `users` VALUES (37, 37, 'TALE', 'tale_cmu@gmail.com', '2024-03-01 13:43:32', '$2y$12$Pr9jix8Ub9YJ6.s8RQOXhunMV7IehkAH6/17cIuj9CTFAs97z3Q/q', NULL, NULL, NULL);
INSERT INTO `users` VALUES (38, 38, 'PSABE-PPG', 'psabe_ppg_cmu@gmail.com', '2024-03-01 13:43:33', '$2y$12$Pr9jix8Ub9YJ6.s8RQOXhunMV7IehkAH6/17cIuj9CTFAs97z3Q/q', NULL, NULL, NULL);
INSERT INTO `users` VALUES (39, 39, 'JABES', 'jabes_cmu@gmail.com', '2024-03-01 13:43:34', '$2y$12$Pr9jix8Ub9YJ6.s8RQOXhunMV7IehkAH6/17cIuj9CTFAs97z3Q/q', NULL, NULL, NULL);
INSERT INTO `users` VALUES (40, 40, 'LTS', 'lts_cmu@gmail.com', '2024-03-01 13:43:35', '$2y$12$Pr9jix8Ub9YJ6.s8RQOXhunMV7IehkAH6/17cIuj9CTFAs97z3Q/q', NULL, NULL, NULL);
INSERT INTO `users` VALUES (41, 41, 'SEES', 'sees_cmu@gmail.com', '2024-03-01 13:43:36', '$2y$12$Pr9jix8Ub9YJ6.s8RQOXhunMV7IehkAH6/17cIuj9CTFAs97z3Q/q', NULL, NULL, NULL);
INSERT INTO `users` VALUES (42, 42, 'MATHSOC', 'mathsoc_cmu@gmail.com', '2024-03-01 13:43:35', '$2y$12$Pr9jix8Ub9YJ6.s8RQOXhunMV7IehkAH6/17cIuj9CTFAs97z3Q/q', NULL, NULL, NULL);
INSERT INTO `users` VALUES (43, 43, 'PAFT-Sigma ', 'paft_sigma _cmu@gmail.com', '2024-03-01 13:43:36', '$2y$12$Pr9jix8Ub9YJ6.s8RQOXhunMV7IehkAH6/17cIuj9CTFAs97z3Q/q', NULL, NULL, NULL);
INSERT INTO `users` VALUES (44, 44, 'IIEE-CSC', 'iiee-csc_cmu@gmail.com', '2024-03-01 13:43:36', '$2y$12$Pr9jix8Ub9YJ6.s8RQOXhunMV7IehkAH6/17cIuj9CTFAs97z3Q/q', NULL, NULL, NULL);
INSERT INTO `users` VALUES (45, 45, 'MESA', 'mesa_cmu@gmail.com', '2024-03-01 13:43:37', '$2y$12$Pr9jix8Ub9YJ6.s8RQOXhunMV7IehkAH6/17cIuj9CTFAs97z3Q/q', NULL, NULL, NULL);
INSERT INTO `users` VALUES (46, 46, 'CMU-BAKAS', 'cmu_bakas_cmu@gmail.com', '2024-03-01 13:43:37', '$2y$12$Pr9jix8Ub9YJ6.s8RQOXhunMV7IehkAH6/17cIuj9CTFAs97z3Q/q', NULL, NULL, NULL);
INSERT INTO `users` VALUES (47, 47, 'ENVIROSS', 'enviross_cmu@gmail.com', '2024-03-01 13:43:39', '$2y$12$Pr9jix8Ub9YJ6.s8RQOXhunMV7IehkAH6/17cIuj9CTFAs97z3Q/q', NULL, NULL, NULL);
INSERT INTO `users` VALUES (48, 48, 'CMU-ENTOMSOC', 'cmu_entomsoc_cmu@gmail.com', '2024-03-01 13:43:40', '$2y$12$Pr9jix8Ub9YJ6.s8RQOXhunMV7IehkAH6/17cIuj9CTFAs97z3Q/q', NULL, NULL, NULL);
INSERT INTO `users` VALUES (49, 49, 'CMUSSS', 'cmusss_cmu@gmail.com', '2024-03-01 13:43:40', '$2y$12$Pr9jix8Ub9YJ6.s8RQOXhunMV7IehkAH6/17cIuj9CTFAs97z3Q/q', NULL, NULL, NULL);
INSERT INTO `users` VALUES (50, 50, 'JPSME', 'jpsme_cmu@gmail.com', '2024-03-01 13:43:41', '$2y$12$Pr9jix8Ub9YJ6.s8RQOXhunMV7IehkAH6/17cIuj9CTFAs97z3Q/q', NULL, NULL, NULL);
INSERT INTO `users` VALUES (51, 51, 'HORTUSS', 'hortuss_cmu@gmail.com', '2024-03-01 13:43:41', '$2y$12$Pr9jix8Ub9YJ6.s8RQOXhunMV7IehkAH6/17cIuj9CTFAs97z3Q/q', NULL, NULL, NULL);
INSERT INTO `users` VALUES (52, 52, 'PASOA', 'pasoa_cmu@gmail.com', '2024-03-01 13:43:44', '$2y$12$Pr9jix8Ub9YJ6.s8RQOXhunMV7IehkAH6/17cIuj9CTFAs97z3Q/q', NULL, NULL, NULL);
INSERT INTO `users` VALUES (53, 53, 'SAGES', 'sages_cmu@gmail.com', '2024-03-01 13:43:44', '$2y$12$Pr9jix8Ub9YJ6.s8RQOXhunMV7IehkAH6/17cIuj9CTFAs97z3Q/q', NULL, NULL, NULL);
INSERT INTO `users` VALUES (54, 54, 'PBASS', 'pbass_cmu@gmail.com', '2024-03-01 13:43:45', '$2y$12$Pr9jix8Ub9YJ6.s8RQOXhunMV7IehkAH6/17cIuj9CTFAs97z3Q/q', NULL, NULL, NULL);
INSERT INTO `users` VALUES (55, 55, 'BMAP', 'bmap_cmu@gmail.com', '2024-03-01 13:43:45', '$2y$12$Pr9jix8Ub9YJ6.s8RQOXhunMV7IehkAH6/17cIuj9CTFAs97z3Q/q', NULL, NULL, NULL);
INSERT INTO `users` VALUES (56, 56, 'SAEEx', 'saeex_cmu@gmail.com', '2024-03-01 13:43:46', '$2y$12$Pr9jix8Ub9YJ6.s8RQOXhunMV7IehkAH6/17cIuj9CTFAs97z3Q/q', NULL, NULL, NULL);
INSERT INTO `users` VALUES (57, 57, 'JPIA', 'jpia_cmu@gmail.com', '2024-03-01 13:43:47', '$2y$12$Pr9jix8Ub9YJ6.s8RQOXhunMV7IehkAH6/17cIuj9CTFAs97z3Q/q', NULL, NULL, NULL);
INSERT INTO `users` VALUES (58, 58, 'Philalethia Guild', 'philalethia_guild_cmu@gmail.com', '2024-03-01 13:43:47', '$2y$12$Pr9jix8Ub9YJ6.s8RQOXhunMV7IehkAH6/17cIuj9CTFAs97z3Q/q', NULL, NULL, NULL);
INSERT INTO `users` VALUES (59, 59, 'CMUPS', 'cmups_cmu@gmail.com', '2024-03-01 13:43:48', '$2y$12$Pr9jix8Ub9YJ6.s8RQOXhunMV7IehkAH6/17cIuj9CTFAs97z3Q/q', NULL, NULL, NULL);
INSERT INTO `users` VALUES (60, 60, 'HKC', 'hkc_cmu@gmail.com', '2024-03-01 13:43:49', '$2y$12$Pr9jix8Ub9YJ6.s8RQOXhunMV7IehkAH6/17cIuj9CTFAs97z3Q/q', NULL, NULL, NULL);
INSERT INTO `users` VALUES (61, 61, 'CMU-DC', 'cmu_dc_cmu@gmail.com', '2024-03-01 13:43:50', '$2y$12$Pr9jix8Ub9YJ6.s8RQOXhunMV7IehkAH6/17cIuj9CTFAs97z3Q/q', NULL, NULL, NULL);
INSERT INTO `users` VALUES (62, 62, 'ARTIZAN', 'artizan_cmu@gmail.com', '2024-03-01 13:43:50', '$2y$12$Pr9jix8Ub9YJ6.s8RQOXhunMV7IehkAH6/17cIuj9CTFAs97z3Q/q', NULL, NULL, NULL);
INSERT INTO `users` VALUES (63, 63, 'LAYF', 'layf_cmu@gmail.com', '2024-03-01 13:43:51', '$2y$12$Pr9jix8Ub9YJ6.s8RQOXhunMV7IehkAH6/17cIuj9CTFAs97z3Q/q', NULL, NULL, NULL);
INSERT INTO `users` VALUES (64, 64, 'VPC-DODGE', 'vpc_dodge_cmu@gmail.com', '2024-03-01 13:43:51', '$2y$12$Pr9jix8Ub9YJ6.s8RQOXhunMV7IehkAH6/17cIuj9CTFAs97z3Q/q', NULL, NULL, NULL);
INSERT INTO `users` VALUES (65, 65, 'CMU-CRCYC', 'cmu_crcyc_cmu@gmail.com', '2024-03-01 13:43:52', '$2y$12$Pr9jix8Ub9YJ6.s8RQOXhunMV7IehkAH6/17cIuj9CTFAs97z3Q/q', NULL, NULL, NULL);
INSERT INTO `users` VALUES (66, 66, 'CADS', 'cads_cmu@gmail.com', '2024-03-01 13:43:52', '$2y$12$Pr9jix8Ub9YJ6.s8RQOXhunMV7IehkAH6/17cIuj9CTFAs97z3Q/q', NULL, NULL, NULL);
INSERT INTO `users` VALUES (67, 67, 'SAAS', 'saas_cmu@gmail.com', '2024-03-01 13:43:53', '$2y$12$Pr9jix8Ub9YJ6.s8RQOXhunMV7IehkAH6/17cIuj9CTFAs97z3Q/q', NULL, NULL, NULL);
INSERT INTO `users` VALUES (68, 68, 'CSF', 'csf_cmu@gmail.com', '2024-03-01 13:43:53', '1234$2y$12$Pr9jix8Ub9YJ6.s8RQOXhunMV7IehkAH6/17cIuj9CTFAs97z3Q/q', NULL, NULL, NULL);
INSERT INTO `users` VALUES (69, 69, 'PSALM INC.', 'psalm_inc_cmu@gmail.com', '2024-03-01 13:43:55', '$2y$12$Pr9jix8Ub9YJ6.s8RQOXhunMV7IehkAH6/17cIuj9CTFAs97z3Q/q', NULL, NULL, NULL);
INSERT INTO `users` VALUES (70, 70, 'PAAI-CMU', 'paai_cmu_cmu@gmail.com', '2024-03-01 13:43:56', '$2y$12$Pr9jix8Ub9YJ6.s8RQOXhunMV7IehkAH6/17cIuj9CTFAs97z3Q/q', NULL, NULL, NULL);
INSERT INTO `users` VALUES (71, 71, 'CMUMKDC', 'cmumkdc_cmu@gmail.com', '2024-03-01 13:43:56', '$2y$12$Pr9jix8Ub9YJ6.s8RQOXhunMV7IehkAH6/17cIuj9CTFAs97z3Q/q', NULL, NULL, NULL);
INSERT INTO `users` VALUES (72, 72, 'HTHCMU', 'hthcmu_cmu@gmail.com', '2024-03-01 13:43:56', '$2y$12$Pr9jix8Ub9YJ6.s8RQOXhunMV7IehkAH6/17cIuj9CTFAs97z3Q/q', NULL, NULL, NULL);
INSERT INTO `users` VALUES (73, 73, 'CIT', 'cit_cmu@gmail.com', '2024-03-01 13:43:57', '$2y$12$Pr9jix8Ub9YJ6.s8RQOXhunMV7IehkAH6/17cIuj9CTFAs97z3Q/q', NULL, NULL, NULL);
INSERT INTO `users` VALUES (74, 74, 'ECO-VENTURE', 'eco_venture_cmu@gmail.com', '2024-03-01 13:43:57', '$2y$12$Pr9jix8Ub9YJ6.s8RQOXhunMV7IehkAH6/17cIuj9CTFAs97z3Q/q', NULL, NULL, NULL);
INSERT INTO `users` VALUES (75, 75, 'COC', 'coc_cmu@gmail.com', '2024-03-01 13:43:58', '$2y$12$Pr9jix8Ub9YJ6.s8RQOXhunMV7IehkAH6/17cIuj9CTFAs97z3Q/q', NULL, NULL, NULL);
INSERT INTO `users` VALUES (76, 76, 'CFC-YFC', 'cfc_yfc_cmu@gmail.com', '2024-03-01 13:43:59', '$2y$12$Pr9jix8Ub9YJ6.s8RQOXhunMV7IehkAH6/17cIuj9CTFAs97z3Q/q', NULL, NULL, NULL);
INSERT INTO `users` VALUES (77, 77, 'MAS-AMICUS', 'mas_amicus_cmu@gmail.com', '2024-03-01 13:43:59', '$2y$12$Pr9jix8Ub9YJ6.s8RQOXhunMV7IehkAH6/17cIuj9CTFAs97z3Q/q', NULL, NULL, NULL);
INSERT INTO `users` VALUES (78, 78, 'TESGO', 'tesgo_cmu@gmail.com', '2024-03-01 13:44:00', '$2y$12$Pr9jix8Ub9YJ6.s8RQOXhunMV7IehkAH6/17cIuj9CTFAs97z3Q/q', NULL, NULL, NULL);
INSERT INTO `users` VALUES (79, 79, 'CDV', 'cdv_cmu@gmail.com', '2024-03-01 13:44:00', '1234$2y$12$Pr9jix8Ub9YJ6.s8RQOXhunMV7IehkAH6/17cIuj9CTFAs97z3Q/q', NULL, NULL, NULL);
INSERT INTO `users` VALUES (80, 80, 'CYA', 'cya_cmu@gmail.com', '2024-03-01 13:44:01', '$2y$12$Pr9jix8Ub9YJ6.s8RQOXhunMV7IehkAH6/17cIuj9CTFAs97z3Q/q', NULL, NULL, NULL);
INSERT INTO `users` VALUES (81, 81, 'CBI', 'cbi_cmu@gmail.com', '2024-03-01 13:44:02', '$2y$12$Pr9jix8Ub9YJ6.s8RQOXhunMV7IehkAH6/17cIuj9CTFAs97z3Q/q', NULL, NULL, NULL);
INSERT INTO `users` VALUES (82, 82, 'CDSSO', 'cdsso_cmu@gmail.com', '2024-03-01 13:44:02', '$2y$12$Pr9jix8Ub9YJ6.s8RQOXhunMV7IehkAH6/17cIuj9CTFAs97z3Q/q', NULL, NULL, NULL);
INSERT INTO `users` VALUES (83, 83, 'RANCHER', 'rancher_cmu@gmail.com', '2024-03-01 13:44:02', '$2y$12$Pr9jix8Ub9YJ6.s8RQOXhunMV7IehkAH6/17cIuj9CTFAs97z3Q/q', NULL, NULL, NULL);
INSERT INTO `users` VALUES (84, 84, 'VOX', 'vox_cmu@gmail.com', '2024-03-01 13:44:03', '$2y$12$Pr9jix8Ub9YJ6.s8RQOXhunMV7IehkAH6/17cIuj9CTFAs97z3Q/q', NULL, NULL, NULL);
INSERT INTO `users` VALUES (85, 85, 'CMU PC', 'cmu_pc_cmu@gmail.com', '2024-03-01 13:44:10', '$2y$12$Pr9jix8Ub9YJ6.s8RQOXhunMV7IehkAH6/17cIuj9CTFAs97z3Q/q', NULL, NULL, NULL);
INSERT INTO `users` VALUES (86, 86, 'CMUES', 'cmues_cmu@gmail.com', '2024-03-01 13:44:11', '$2y$12$Pr9jix8Ub9YJ6.s8RQOXhunMV7IehkAH6/17cIuj9CTFAs97z3Q/q', NULL, NULL, NULL);
INSERT INTO `users` VALUES (87, 87, 'VKV-VLV', 'vkv_vlv_cmu@gmail.com', '2024-03-01 13:44:11', '$2y$12$Pr9jix8Ub9YJ6.s8RQOXhunMV7IehkAH6/17cIuj9CTFAs97z3Q/q', NULL, NULL, NULL);
INSERT INTO `users` VALUES (88, 88, 'DELTANS', 'deltans_cmu@gmail.com', '2024-03-01 13:44:12', '$2y$12$Pr9jix8Ub9YJ6.s8RQOXhunMV7IehkAH6/17cIuj9CTFAs97z3Q/q', NULL, NULL, NULL);
INSERT INTO `users` VALUES (89, 89, 'BARONS', 'barons_cmu@gmail.com', '2024-03-01 13:44:12', '$2y$12$Pr9jix8Ub9YJ6.s8RQOXhunMV7IehkAH6/17cIuj9CTFAs97z3Q/q', NULL, NULL, NULL);
INSERT INTO `users` VALUES (90, 90, 'APO', 'apo_cmu@gmail.com', '2024-03-01 13:44:14', '$2y$12$Pr9jix8Ub9YJ6.s8RQOXhunMV7IehkAH6/17cIuj9CTFAs97z3Q/q', NULL, NULL, NULL);
INSERT INTO `users` VALUES (91, 91, 'BETANS', 'betans_cmu@gmail.com', '2024-03-01 13:44:14', '$2y$12$Pr9jix8Ub9YJ6.s8RQOXhunMV7IehkAH6/17cIuj9CTFAs97z3Q/q', NULL, NULL, NULL);
INSERT INTO `users` VALUES (92, 92, 'TRISKELIONS', 'triskelions_cmu@gmail.com', '2024-03-01 13:44:14', '$2y$12$Pr9jix8Ub9YJ6.s8RQOXhunMV7IehkAH6/17cIuj9CTFAs97z3Q/q', NULL, NULL, NULL);
INSERT INTO `users` VALUES (93, 93, 'GAPHO', 'gapho_cmu@gmail.com', '2024-03-01 13:44:15', '$2y$12$Pr9jix8Ub9YJ6.s8RQOXhunMV7IehkAH6/17cIuj9CTFAs97z3Q/q', NULL, NULL, NULL);
INSERT INTO `users` VALUES (94, 94, 'GAMMANS', 'gammans_cmu@gmail.com', '2024-03-01 13:44:16', '$2y$12$Pr9jix8Ub9YJ6.s8RQOXhunMV7IehkAH6/17cIuj9CTFAs97z3Q/q', NULL, NULL, NULL);
INSERT INTO `users` VALUES (95, 95, 'ALPHANS', 'alphans_cmu@gmail.com', '2024-03-01 13:44:16', '$2y$12$Pr9jix8Ub9YJ6.s8RQOXhunMV7IehkAH6/17cIuj9CTFAs97z3Q/q', NULL, NULL, NULL);
INSERT INTO `users` VALUES (96, 96, 'THETANS', 'thetans_cmu@gmail.com', '2024-03-01 13:44:17', '$2y$12$Pr9jix8Ub9YJ6.s8RQOXhunMV7IehkAH6/17cIuj9CTFAs97z3Q/q', NULL, NULL, NULL);
INSERT INTO `users` VALUES (97, 97, 'SU-UL', 'su_ul_cmu@gmail.com', '2024-03-01 13:44:17', '$2y$12$Pr9jix8Ub9YJ6.s8RQOXhunMV7IehkAH6/17cIuj9CTFAs97z3Q/q', NULL, NULL, NULL);
INSERT INTO `users` VALUES (98, 98, 'Jasmin Ombao', 'osa_cmu@gmail.com', '2024-03-01 13:53:31', '$2y$12$Pr9jix8Ub9YJ6.s8RQOXhunMV7IehkAH6/17cIuj9CTFAs97z3Q/q', NULL, NULL, NULL);
INSERT INTO `users` VALUES (99, 98, 'Jasmin Ombao', 'jasmin.ombao@gmail.com', NULL, '$2y$12$Pr9jix8Ub9YJ6.s8RQOXhunMV7IehkAH6/17cIuj9CTFAs97z3Q/q', NULL, '2024-03-01 05:59:23', '2024-05-20 10:44:15');
INSERT INTO `users` VALUES (100, 104, 'SDD', 'sdd_cmu@gmail.com', NULL, '$2y$12$W7Ac56LVE75eXI2NLE8DNeCX.cWr/ViOkuXY7nZVAAROGDG8wwigi', NULL, '2024-04-23 12:03:22', '2024-04-23 12:03:22');
INSERT INTO `users` VALUES (101, 105, 'PF', 'admin@gmail.com', NULL, '$2y$12$wINJvnLVBRSfqc7AP5ixnO/TAKe1FHPSbCQTzZsvcJ0JD46p8rg0W', NULL, '2024-04-24 10:49:28', '2024-04-24 10:49:28');
INSERT INTO `users` VALUES (102, 106, '\"SDB\"', 'ilovetaeyeon@gmail.com', NULL, '$2y$12$dk395Yl0DeiMTS56JCL1Ye7nq1pFub4E.lBnSzdFZogdx63xruXoe', NULL, '2024-04-24 15:21:52', '2024-04-24 15:21:52');
INSERT INTO `users` VALUES (103, 109, 'MASS', 'mass@gmail.com', NULL, '$2y$12$Bnv8ZB1Ow8GqgLWJmGLJ5uOIcObfgp5Kf0E39b5MylCgta.hf0nUy', NULL, '2024-04-30 10:17:53', '2024-04-30 10:17:53');
INSERT INTO `users` VALUES (104, 112, 'SO', 'sample_org@gmail.com', NULL, '$2y$12$n09EL3laFmB0gXlxaZhPfeYWq5yTUb1b/T30LAxwqlSYQtcfE6GU2', NULL, '2024-05-20 15:56:33', '2024-05-20 15:56:33');

SET FOREIGN_KEY_CHECKS = 1;
