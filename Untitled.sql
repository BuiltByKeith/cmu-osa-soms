CREATE TABLE `acad_year`  (
  `id` int NOT NULL,
  `description` varchar(255) NULL,
  PRIMARY KEY (`id`)
);

CREATE TABLE `ay_sem`  (
  `id` int NOT NULL,
  `description` varchar(255) NULL,
  `acad_year_id` int NULL,
  PRIMARY KEY (`id`)
);

CREATE TABLE `colleges`  (
  `id` int NOT NULL,
  `description` varchar(255) NULL,
  PRIMARY KEY (`id`)
);

CREATE TABLE `employees`  (
  `id` int NOT NULL,
  `user_id` int NULL,
  `firstname` varchar(255) NULL,
  `middlename` varchar(255) NULL,
  `lastname` varchar(255) NULL,
  `extname` varchar(255) NULL,
  `contact` varchar(255) NULL,
  `sex` varchar(255) NULL,
  PRIMARY KEY (`id`)
);

CREATE TABLE `position`  (
  `id` int NOT NULL,
  `description` varchar(255) NULL,
  PRIMARY KEY (`id`)
);

CREATE TABLE `programs`  (
  `id` int NOT NULL,
  `description` varchar(255) NULL,
  `college_id` int NULL,
  PRIMARY KEY (`id`)
);

CREATE TABLE `prop_act_details`  (
  `prop_act_id` int NOT NULL,
  `item_name` varchar(255) NULL,
  `unit` varchar(255) NULL,
  `cost` decimal(10, 2) NULL,
  PRIMARY KEY (`prop_act_id`)
);

CREATE TABLE `proposed_activities`  (
  `id` int NOT NULL,
  `student_org_reg_id` int NULL,
  `act_name` varchar(255) NULL,
  `budget` varchar(255) NULL,
  `inclusive_date` datetime NULL,
  `status` varchar(255) NULL,
  PRIMARY KEY (`id`)
);

CREATE TABLE `role`  (
  `id` int NOT NULL,
  `description` varchar(255) NULL,
  PRIMARY KEY (`id`)
);

CREATE TABLE `student_org`  (
  `id` int NOT NULL,
  `student_org_name` varchar(255) NULL,
  `type_of_org_id` int NULL,
  `date_established` datetime NULL,
  `CBL` varchar(255) NULL,
  `acronym` varchar(255) NULL,
  PRIMARY KEY (`id`)
);

CREATE TABLE `student_org_adviser`  (
  `id` int NOT NULL,
  `employee_id` int NULL,
  `student_org_reg_id` int NULL,
  PRIMARY KEY (`id`)
);

CREATE TABLE `student_org_members`  (
  `id` int NOT NULL,
  `student_id` int NULL,
  `student_org_red_id` int NULL,
  PRIMARY KEY (`id`)
);

CREATE TABLE `student_org_officers`  (
  `id` int NOT NULL,
  `student_id` int NULL,
  `position_id` int NULL,
  `student_org_reg_id` int NULL,
  PRIMARY KEY (`id`)
);

CREATE TABLE `student_org_reg`  (
  `id` int NOT NULL,
  `student_org_id` int NULL,
  `reg_type_id` int NULL,
  `acad_year_id` int NULL,
  `or_no` int NULL,
  `amount` varchar(255) NULL,
  `status` varchar(255) NULL,
  `date_applied` datetime NULL,
  `date_approved` datetime NULL,
  PRIMARY KEY (`id`)
);

CREATE TABLE `students`  (
  `id` int NOT NULL,
  `firstname` varchar(255) NULL,
  `middlename` varchar(255) NULL,
  `lastname` varchar(255) NULL,
  `extname` varchar(255) NULL,
  `sex` varchar(255) NULL,
  `contact` varchar(255) NULL,
  `program_id` int NULL,
  PRIMARY KEY (`id`)
);

CREATE TABLE `type_of_org`  (
  `id` int NOT NULL,
  `description` varchar(255) NULL,
  PRIMARY KEY (`id`)
);

CREATE TABLE `type_of_reg`  (
  `id` int NOT NULL,
  `description` varchar(255) NULL,
  PRIMARY KEY (`id`)
);

CREATE TABLE `user`  (
  `id` int NOT NULL,
  `email` varchar(255) NULL,
  `password` varchar(255) NULL,
  PRIMARY KEY (`id`)
);

CREATE TABLE `user_role`  (
  `user_id` int NOT NULL,
  `role_id` int NULL
);

ALTER TABLE `ay_sem` ADD FOREIGN KEY (`acad_year_id`) REFERENCES `acad_year` (`id`) ON DELETE CASCADE;
ALTER TABLE `employees` ADD FOREIGN KEY (`user_id`) REFERENCES `user` (`id`) ON DELETE CASCADE;
ALTER TABLE `programs` ADD FOREIGN KEY (`college_id`) REFERENCES `colleges` (`id`) ON DELETE CASCADE;
ALTER TABLE `prop_act_details` ADD FOREIGN KEY (`prop_act_id`) REFERENCES `proposed_activities` (`id`) ON DELETE CASCADE;
ALTER TABLE `proposed_activities` ADD FOREIGN KEY (`student_org_reg_id`) REFERENCES `student_org_reg` (`id`) ON DELETE CASCADE;
ALTER TABLE `student_org` ADD FOREIGN KEY (`type_of_org_id`) REFERENCES `type_of_org` (`id`) ON DELETE CASCADE;
ALTER TABLE `student_org_adviser` ADD FOREIGN KEY (`employee_id`) REFERENCES `employees` (`id`) ON DELETE CASCADE;
ALTER TABLE `student_org_adviser` ADD FOREIGN KEY (`student_org_reg_id`) REFERENCES `student_org_reg` (`id`) ON DELETE CASCADE;
ALTER TABLE `student_org_members` ADD FOREIGN KEY (`student_id`) REFERENCES `students` (`id`) ON DELETE CASCADE;
ALTER TABLE `student_org_members` ADD FOREIGN KEY (`student_org_red_id`) REFERENCES `student_org_reg` (`id`) ON DELETE CASCADE;
ALTER TABLE `student_org_officers` ADD FOREIGN KEY (`student_id`) REFERENCES `students` (`id`) ON DELETE CASCADE;
ALTER TABLE `student_org_officers` ADD FOREIGN KEY (`student_org_reg_id`) REFERENCES `student_org_reg` (`id`) ON DELETE CASCADE;
ALTER TABLE `student_org_officers` ADD FOREIGN KEY (`position_id`) REFERENCES `position` (`id`) ON DELETE CASCADE;
ALTER TABLE `student_org_reg` ADD FOREIGN KEY (`student_org_id`) REFERENCES `student_org` (`id`) ON DELETE CASCADE;
ALTER TABLE `student_org_reg` ADD FOREIGN KEY (`reg_type_id`) REFERENCES `type_of_reg` (`id`) ON DELETE CASCADE;
ALTER TABLE `student_org_reg` ADD FOREIGN KEY (`acad_year_id`) REFERENCES `acad_year` (`id`) ON DELETE CASCADE;
ALTER TABLE `students` ADD FOREIGN KEY (`program_id`) REFERENCES `programs` (`id`) ON DELETE CASCADE;
ALTER TABLE `user_role` ADD FOREIGN KEY (`user_id`) REFERENCES `user` (`id`) ON DELETE CASCADE;
ALTER TABLE `user_role` ADD FOREIGN KEY (`role_id`) REFERENCES `role` (`id`) ON DELETE CASCADE;

