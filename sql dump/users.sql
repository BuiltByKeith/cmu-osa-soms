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

 Date: 13/08/2024 12:54:51
*/

SET NAMES utf8mb4;
SET FOREIGN_KEY_CHECKS = 0;

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
