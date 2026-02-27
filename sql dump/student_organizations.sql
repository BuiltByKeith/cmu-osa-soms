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

 Date: 13/08/2024 12:53:54
*/

SET NAMES utf8mb4;
SET FOREIGN_KEY_CHECKS = 0;

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

SET FOREIGN_KEY_CHECKS = 1;
