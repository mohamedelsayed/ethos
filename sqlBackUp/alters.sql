ALTER TABLE `team_members` CHANGE `linkedin` `linkedin` VARCHAR(255) CHARACTER SET utf8 COLLATE utf8_general_ci NULL DEFAULT NULL;
ALTER TABLE `users` CHANGE `group_id` `group_id` INT(11) NOT NULL DEFAULT '0';
ALTER TABLE `settings` ADD `vacancies_url` VARCHAR(255) NULL AFTER `carrers_developments_paging_limit`;
