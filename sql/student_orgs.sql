/*
 Navicat Premium Data Transfer

 Source Server         : osa
 Source Server Type    : MySQL
 Source Server Version : 80033
 Source Host           : 172.16.0.69:3306
 Source Schema         : ojt_osa

 Target Server Type    : MySQL
 Target Server Version : 80033
 File Encoding         : 65001

 Date: 28/02/2024 15:32:18
*/

SET NAMES utf8mb4;
SET FOREIGN_KEY_CHECKS = 0;

-- ----------------------------
-- Table structure for student_orgs
-- ----------------------------
DROP TABLE IF EXISTS `student_orgs`;
CREATE TABLE `student_orgs`  (
  `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT,
  `accreditation_no` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `student_org_name` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `acronym` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NULL DEFAULT NULL,
  `type_of_org_id` bigint UNSIGNED NOT NULL,
  `date_established` datetime NULL DEFAULT NULL,
  `CBL` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`) USING BTREE,
  INDEX `student_orgs_type_of_org_id_foreign`(`type_of_org_id` ASC) USING BTREE,
  CONSTRAINT `student_orgs_type_of_org_id_foreign` FOREIGN KEY (`type_of_org_id`) REFERENCES `type_of_orgs` (`id`) ON DELETE RESTRICT ON UPDATE RESTRICT
) ENGINE = InnoDB AUTO_INCREMENT = 1 CHARACTER SET = utf8mb4 COLLATE = utf8mb4_unicode_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Records of student_orgs
-- ----------------------------
INSERT INTO `student_orgs` VALUES (1, 'CMU-R-OSA-UW-001', 'Supreme Student Organization', 'SSC', 1, NULL, NULL, NULL, NULL);
INSERT INTO `student_orgs` VALUES (2, 'CMU-R-OSA-UW-002', 'University Senior Students\' Council', 'USSCO', 1, NULL, NULL, NULL, NULL);
INSERT INTO `student_orgs` VALUES (3, 'CMU-R-OSA-UW-003', 'Central Post', 'CP', 1, NULL, NULL, NULL, NULL);
INSERT INTO `student_orgs` VALUES (4, 'CMU-R-OSA-UW-004', 'Siglakas Club', 'SC', 1, NULL, NULL, NULL, NULL);
INSERT INTO `student_orgs` VALUES (5, 'CMU-R-OSA-UW-005', 'BLAZER 2024', 'BLAZER', 1, NULL, NULL, NULL, NULL);
INSERT INTO `student_orgs` VALUES (6, 'CMU-R-OSA-UW-006', 'Association of Recognized Student Organization ', 'ARSO', 1, NULL, NULL, NULL, NULL);
INSERT INTO `student_orgs` VALUES (7, 'CMU-R-OSA-CC-001', 'College of Education Student Council Organization', 'COEDSCO', 2, NULL, NULL, NULL, NULL);
INSERT INTO `student_orgs` VALUES (8, 'CMU-R-OSA-CC-002', 'College of Nursing Student Council Organization', 'CONSCO', 2, NULL, NULL, NULL, NULL);
INSERT INTO `student_orgs` VALUES (9, 'CMU-R-OSA-CC-003', 'College of Human Ecology Student Council Organization', 'COHESCO', 2, NULL, NULL, NULL, NULL);
INSERT INTO `student_orgs` VALUES (10, 'CMU-R-OSA-CC-004', 'College of Arts and Sciences Student Council Organization', 'CASSCO', 2, NULL, NULL, NULL, NULL);
INSERT INTO `student_orgs` VALUES (11, 'CMU-R-OSA-CC-005', 'College of Agriculture Student Council Organization', 'COASCO', 2, NULL, NULL, NULL, NULL);
INSERT INTO `student_orgs` VALUES (12, 'CMU-R-OSA-CC-006', 'College of Forestry and Environmental Science Student Council Organization', 'COFESSCO', 2, NULL, NULL, NULL, NULL);
INSERT INTO `student_orgs` VALUES (13, 'CMU-R-OSA-CC-007', 'College of Engineering Student Council Organization', 'COESCO', 2, NULL, NULL, NULL, NULL);
INSERT INTO `student_orgs` VALUES (14, 'CMU-R-OSA-CC-008', 'College of Veterinary Medicine Student Council Organization', 'CVMSCO', 2, NULL, NULL, NULL, NULL);
INSERT INTO `student_orgs` VALUES (15, 'CMU-R-OSA-CC-009', 'College of Information Sciences & Computing Student Council Organization', 'CISCO', 2, NULL, NULL, NULL, NULL);
INSERT INTO `student_orgs` VALUES (16, 'CMU-R-OSA-CC-010', 'College of Business and Management Student Council Organization', 'CBMSCO', 2, NULL, NULL, NULL, NULL);
INSERT INTO `student_orgs` VALUES (17, 'CMU-R-OSA-CO-001', 'Science Education Society', 'SCIEDSOC', 3, NULL, NULL, NULL, NULL);
INSERT INTO `student_orgs` VALUES (18, 'CMU-R-OSA-CO-002', 'Biological Sciences Graduate Students\' Association', 'BSGSA', 3, NULL, NULL, NULL, NULL);
INSERT INTO `student_orgs` VALUES (19, 'CMU-R-OSA-CO-003', 'Civil Engineering Student Society ', 'CESS', 3, NULL, NULL, NULL, NULL);
INSERT INTO `student_orgs` VALUES (20, 'CMU-R-OSA-CO-004', 'Junior Philippine Institute of Civil Engineers Central Mindanao University Chapter', 'JPICE-CMUC', 3, NULL, NULL, NULL, NULL);
INSERT INTO `student_orgs` VALUES (21, 'CMU-R-OSA-CO-005', 'Operation Management Students Association', 'OMSA', 3, NULL, NULL, NULL, NULL);
INSERT INTO `student_orgs` VALUES (22, 'CMU-R-OSA-CO-006', 'Le Sociology Society', 'LeSoS', 3, NULL, NULL, NULL, NULL);
INSERT INTO `student_orgs` VALUES (23, 'CMU-R-OSA-CO-007', 'League of Political Science Students', 'LPSS', 3, NULL, NULL, NULL, NULL);
INSERT INTO `student_orgs` VALUES (24, 'CMU-R-OSA-CO-008', 'Philippine Association Nutrition-Alpha Pi Chapter', 'PAN-AP', 3, NULL, NULL, NULL, NULL);
INSERT INTO `student_orgs` VALUES (25, 'CMU-R-OSA-CO-009', 'Veterinary Medical Students\' Association-International Veterinary Students\' Association', 'VMSA-IVSA', 3, NULL, NULL, NULL, NULL);
INSERT INTO `student_orgs` VALUES (26, 'CMU-R-OSA-CO-010', 'Psychology Student Circle', 'PSC', 3, NULL, NULL, NULL, NULL);
INSERT INTO `student_orgs` VALUES (27, 'CMU-R-OSA-CO-011', 'Circle of Dynamic Language Education Students', 'CODLES', 3, NULL, NULL, NULL, NULL);
INSERT INTO `student_orgs` VALUES (28, 'CMU-R-OSA-CO-012', 'Organization of Animal Science Major Students', 'ORGASMS', 3, NULL, NULL, NULL, NULL);
INSERT INTO `student_orgs` VALUES (29, 'CMU-R-OSA-CO-013', 'Junior Philippine Association for Home Economics in State Colleges and Universities', 'JPAHESCU', 3, NULL, NULL, NULL, NULL);
INSERT INTO `student_orgs` VALUES (30, 'CMU-R-OSA-CO-014', 'CMU-Biological Society', 'BIOSOC', 3, NULL, NULL, NULL, NULL);
INSERT INTO `student_orgs` VALUES (31, 'CMU-R-OSA-CO-015', 'Philippine Economic Society', 'PES', 3, NULL, NULL, NULL, NULL);
INSERT INTO `student_orgs` VALUES (32, 'CMU-R-OSA-CO-016', 'Junior Finance Executives-CMU', 'JFINEX', 3, NULL, NULL, NULL, NULL);
INSERT INTO `student_orgs` VALUES (33, 'CMU-R-OSA-CO-017', 'Central Mindanao University-Junior Marketing Association', 'JMA', 3, NULL, NULL, NULL, NULL);
INSERT INTO `student_orgs` VALUES (34, 'CMU-R-OSA-CO-018', 'CMU-Plant Pathology Society', 'CMU-PPS', 3, NULL, NULL, NULL, NULL);
INSERT INTO `student_orgs` VALUES (35, 'CMU-R-OSA-CO-019', 'Association of Filipino Forestry Students', 'AFFS', 3, NULL, NULL, NULL, NULL);
INSERT INTO `student_orgs` VALUES (36, 'CMU-R-OSA-CO-020', 'CMU-Chemical Society', 'CHEMSOC', 3, NULL, NULL, NULL, NULL);
INSERT INTO `student_orgs` VALUES (37, 'CMU-R-OSA-CO-021', 'The Association of Language Erudite', 'TALE', 3, NULL, NULL, NULL, NULL);
INSERT INTO `student_orgs` VALUES (38, 'CMU-R-OSA-CO-022', 'Philippine Society of Agricultural and Biosystems Engineering-Pre-Professional Group', 'PSABE-PPG', 3, NULL, NULL, NULL, NULL);
INSERT INTO `student_orgs` VALUES (39, 'CMU-R-OSA-CO-023', 'Junior Agribusiness Executive Society', 'JABES', 3, NULL, NULL, NULL, NULL);
INSERT INTO `student_orgs` VALUES (40, 'CMU-R-OSA-CO-024', 'Les Toque Society', 'LTS', 3, NULL, NULL, NULL, NULL);
INSERT INTO `student_orgs` VALUES (41, 'CMU-R-OSA-CO-025', 'Society of Electrical Engineering Students', 'SEES', 3, NULL, NULL, NULL, NULL);
INSERT INTO `student_orgs` VALUES (42, 'CMU-R-OSA-CO-026', 'Mathematics Society', 'MATHSOC', 3, NULL, NULL, NULL, NULL);
INSERT INTO `student_orgs` VALUES (43, 'CMU-R-OSA-CO-027', 'Philippine Association of Food Technologist Sigma Chapter', 'PAFT-Sigma ', 3, NULL, NULL, NULL, NULL);
INSERT INTO `student_orgs` VALUES (44, 'CMU-R-OSA-CO-028', 'Institute of Integrated Electrical Engineers-Council of Student Chapters', 'IIEE-CSC', 3, NULL, NULL, NULL, NULL);
INSERT INTO `student_orgs` VALUES (45, 'CMU-R-OSA-CO-029', 'Mechanical Engineering Student Association', 'MESA', 3, NULL, NULL, NULL, NULL);
INSERT INTO `student_orgs` VALUES (46, 'CMU-R-OSA-CO-030', 'CMU Banwang Pangkasaysayan', 'CMU-BAKAS', 3, NULL, NULL, NULL, NULL);
INSERT INTO `student_orgs` VALUES (47, 'CMU-R-OSA-CO-031', 'Environmental Science Student Society', 'ENVIROSS', 3, NULL, NULL, NULL, NULL);
INSERT INTO `student_orgs` VALUES (48, 'CMU-R-OSA-CO-032', 'Central Mindanao University Entomological Society', 'CMU-ENTOMSOC', 3, NULL, NULL, NULL, NULL);
INSERT INTO `student_orgs` VALUES (49, 'CMU-R-OSA-CO-033', 'Central Mindanao University Soil Science Society', 'CMUSSS', 3, NULL, NULL, NULL, NULL);
INSERT INTO `student_orgs` VALUES (50, 'CMU-R-OSA-CO-034', 'Junior Philippine Society of Mechanical Engineers-CMU Chapter', 'JPSME', 3, NULL, NULL, NULL, NULL);
INSERT INTO `student_orgs` VALUES (51, 'CMU-R-OSA-CO-035', 'Horticulture United Student Society', 'HORTUSS', 3, NULL, NULL, NULL, NULL);
INSERT INTO `student_orgs` VALUES (52, 'CMU-R-OSA-CO-036', 'Philippine Association of Students in Office Administration', 'PASOA', 3, NULL, NULL, NULL, NULL);
INSERT INTO `student_orgs` VALUES (53, 'CMU-R-OSA-CO-037', 'Society of Agricultural Engineering Students', 'SAGES', 3, NULL, NULL, NULL, NULL);
INSERT INTO `student_orgs` VALUES (54, 'CMU-R-OSA-CO-038', 'Plant Breeding and Agronomy Student Society', 'PBASS', 3, NULL, NULL, NULL, NULL);
INSERT INTO `student_orgs` VALUES (55, 'CMU-R-OSA-CO-039', 'Business Management Association of the Philippines', 'BMAP', 3, NULL, NULL, NULL, NULL);
INSERT INTO `student_orgs` VALUES (56, 'CMU-R-OSA-CO-040', 'Society of Agricultural Educators and Extensionists', 'SAEEx', 3, NULL, NULL, NULL, NULL);
INSERT INTO `student_orgs` VALUES (57, 'CMU-R-OSA-CO-041', 'Junior Philippine Institute of Accountants', 'JPIA', 3, NULL, NULL, NULL, NULL);
INSERT INTO `student_orgs` VALUES (58, 'CMU-R-OSA-CO-042', 'Philalethia Guild', 'Philalethia Guild', 3, NULL, NULL, NULL, NULL);
INSERT INTO `student_orgs` VALUES (59, 'CMU-R-OSA-CO-043', 'Central Mindanao University-Physics Society', 'CMUPS', 3, NULL, NULL, NULL, NULL);
INSERT INTO `student_orgs` VALUES (60, 'CMU-R-OSA-CO-044', 'Human Kinetics Club ', 'HKC', 3, NULL, NULL, NULL, NULL);
INSERT INTO `student_orgs` VALUES (61, 'CMU-R-OSA-CO-045', 'Development Communication', 'CMU-DC', 3, NULL, NULL, NULL, NULL);
INSERT INTO `student_orgs` VALUES (62, 'CMU-R-OSA-NC-001', 'ARTIZAN', 'ARTIZAN', 4, NULL, NULL, NULL, NULL);
INSERT INTO `student_orgs` VALUES (63, 'CMU-R-OSA-NC-002', 'Lakas Angkan Youth Fellowship', 'LAYF', 4, NULL, NULL, NULL, NULL);
INSERT INTO `student_orgs` VALUES (64, 'CMU-R-OSA-NC-003', 'Vet Posse Comitatus D.O.D.G.E', 'VPC-DODGE', 4, NULL, NULL, NULL, NULL);
INSERT INTO `student_orgs` VALUES (65, 'CMU-R-OSA-NC-004', 'Central Mindanao University College Red Cross Youth Council', 'CMU-CRCYC', 4, NULL, NULL, NULL, NULL);
INSERT INTO `student_orgs` VALUES (66, 'CMU-R-OSA-NC-005', 'CMU Association of DOST-SEI Scholars', 'CADS', 4, NULL, NULL, NULL, NULL);
INSERT INTO `student_orgs` VALUES (67, 'CMU-R-OSA-NC-006', 'Society for the Advancement of Animal Science ', 'SAAS', 4, NULL, NULL, NULL, NULL);
INSERT INTO `student_orgs` VALUES (68, 'CMU-R-OSA-NC-007', 'Christian Students\' Fellowship', 'CSF', 4, NULL, NULL, NULL, NULL);
INSERT INTO `student_orgs` VALUES (69, 'CMU-R-OSA-NC-008', 'Philippine Student Alliance Lay Movement Inc.', 'PSALM INC.', 4, NULL, NULL, NULL, NULL);
INSERT INTO `student_orgs` VALUES (70, 'CMU-R-OSA-NC-009', 'Philippine Association of Aggies Incorporated', 'PAAI-CMU', 4, NULL, NULL, NULL, NULL);
INSERT INTO `student_orgs` VALUES (71, 'CMU-R-OSA-NC-010', 'CMU-Musuan Karate Do Club ', NULL, 4, NULL, NULL, NULL, NULL);
INSERT INTO `student_orgs` VALUES (72, 'CMU-R-OSA-NC-011', 'Halad to Health in Central Mindanao University', 'HTHCMU', 4, NULL, NULL, NULL, NULL);
INSERT INTO `student_orgs` VALUES (73, 'CMU-R-OSA-NC-012', 'Crisis Intervention Team', 'CIT', 4, NULL, NULL, NULL, NULL);
INSERT INTO `student_orgs` VALUES (74, 'CMU-R-OSA-NC-013', 'Environmental Conservation Organization-Venture Club Philippines, Incorporated Central Mindanao University Chapter', 'ECO-VENTURE', 4, NULL, NULL, NULL, NULL);
INSERT INTO `student_orgs` VALUES (75, 'CMU-R-OSA-NC-014', 'Christian on Campus', 'COC', 4, NULL, NULL, NULL, NULL);
INSERT INTO `student_orgs` VALUES (76, 'CMU-R-OSA-NC-015', 'CFC-YFC CAMPUS BASED', 'CFC-YFC', 4, NULL, NULL, NULL, NULL);
INSERT INTO `student_orgs` VALUES (77, 'CMU-R-OSA-NC-016', 'Movement of Adventist Student-Adventist Ministry to College and University Student', 'MAS-AMICUS', 4, NULL, NULL, NULL, NULL);
INSERT INTO `student_orgs` VALUES (78, 'CMU-R-OSA-NC-017', 'Tertiary Education Subsidy Grantees Organization', 'TESGO', 4, NULL, NULL, NULL, NULL);
INSERT INTO `student_orgs` VALUES (79, 'CMU-R-OSA-NC-018', 'Central Mindanao University-Debate Varsity', 'CDV', 4, NULL, NULL, NULL, NULL);
INSERT INTO `student_orgs` VALUES (80, 'CMU-R-OSA-NC-019', 'Christ\'s Youth in Action -CMU Unit', 'CYA', 4, NULL, NULL, NULL, NULL);
INSERT INTO `student_orgs` VALUES (81, 'CMU-R-OSA-NC-020', 'Christian Brotherhood International', 'CBI', 4, NULL, NULL, NULL, NULL);
INSERT INTO `student_orgs` VALUES (82, 'CMU-R-OSA-NC-021', 'CMU-DOST Strand Scholar\'s Organization', 'CDSSO', 4, NULL, NULL, NULL, NULL);
INSERT INTO `student_orgs` VALUES (83, 'CMU-R-OSA-NC-022', 'RANCHER Club Philippines', 'RANCHER', 4, NULL, NULL, NULL, NULL);
INSERT INTO `student_orgs` VALUES (84, 'CMU-R-OSA-NC-023', 'VOX Veterinarius', 'VOX', 4, NULL, NULL, NULL, NULL);
INSERT INTO `student_orgs` VALUES (85, 'CMU-R-OSA-NC-024', 'CMU Peer Counselors', 'CMU PC', 4, NULL, NULL, NULL, NULL);
INSERT INTO `student_orgs` VALUES (86, 'CMU-R-OSA-NC-025', 'CMU E-Sport', NULL, 4, NULL, NULL, NULL, NULL);
INSERT INTO `student_orgs` VALUES (87, 'CMU-R-OSA-GO-001', 'Venerable Knight and Lady Veterinarians', 'VKV-VLV', 5, NULL, NULL, NULL, NULL);
INSERT INTO `student_orgs` VALUES (88, 'CMU-R-OSA-GO-002', 'Delta Fraternity and Sorority International 1961', 'DELTANS', 5, NULL, NULL, NULL, NULL);
INSERT INTO `student_orgs` VALUES (89, 'CMU-R-OSA-GO-003', 'Beta Delta Rho', 'BARONS', 5, NULL, NULL, NULL, NULL);
INSERT INTO `student_orgs` VALUES (90, 'CMU-R-OSA-GO-004', 'Alpha Phi Omega', 'APO', 5, NULL, NULL, NULL, NULL);
INSERT INTO `student_orgs` VALUES (91, 'CMU-R-OSA-GO-005', 'Beta Sigma Fraternity/Sigma Beta Sorority', 'BETANS', 5, NULL, NULL, NULL, NULL);
INSERT INTO `student_orgs` VALUES (92, 'CMU-R-OSA-GO-006', 'Tau Gamma Phi/Tau Gamma Sigma Triskelion\'s Grand Fraternity and Sorority', 'TRISKELIONS', 5, NULL, NULL, NULL, NULL);
INSERT INTO `student_orgs` VALUES (93, 'CMU-R-OSA-GO-007', 'Gamma Phi Omicron Fraternity and Sorority', 'GAPHO', 5, NULL, NULL, NULL, NULL);
INSERT INTO `student_orgs` VALUES (94, 'CMU-R-OSA-GO-008', 'Gamma Kappa Rho-Sigma Gamma Lambda', 'GAMMANS', 5, NULL, NULL, NULL, NULL);
INSERT INTO `student_orgs` VALUES (95, 'CMU-R-OSA-GO-009', 'Alpha Sigma Phi Philippines, international Collegiate Service Ogranization, Inc.', 'ALPHANS', 5, NULL, NULL, NULL, NULL);
INSERT INTO `student_orgs` VALUES (96, 'CMU-R-OSA-GO-010', 'THETA SIGMA PHI-SIGMA THETA PHI', 'THETANS', 5, NULL, NULL, NULL, NULL);
INSERT INTO `student_orgs` VALUES (97, 'CMU-R-OSA-GO-011', 'Sigma Upsilon-Upsilon Lambda International Service Fraternity/Sorority', 'SU-UL', 5, NULL, NULL, NULL, NULL);

SET FOREIGN_KEY_CHECKS = 1;
