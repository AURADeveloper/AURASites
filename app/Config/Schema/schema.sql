

DROP TABLE IF EXISTS `cakephp`.`abouts`;
DROP TABLE IF EXISTS `cakephp`.`businesses`;
DROP TABLE IF EXISTS `cakephp`.`contacts`;
DROP TABLE IF EXISTS `cakephp`.`contents`;
DROP TABLE IF EXISTS `cakephp`.`homes`;
DROP TABLE IF EXISTS `cakephp`.`samples`;
DROP TABLE IF EXISTS `cakephp`.`service_styles`;
DROP TABLE IF EXISTS `cakephp`.`services`;
DROP TABLE IF EXISTS `cakephp`.`styles`;
DROP TABLE IF EXISTS `cakephp`.`widgets`;


CREATE TABLE `cakephp`.`abouts` (
	`id` int(11) NOT NULL AUTO_INCREMENT,
	`text` varchar(1023) CHARACTER SET latin1 COLLATE latin1_swedish_ci DEFAULT NULL,
	`image` varchar(45) CHARACTER SET latin1 COLLATE latin1_swedish_ci DEFAULT NULL,	PRIMARY KEY  (`id`)) 	DEFAULT CHARSET=latin1,
	COLLATE=latin1_swedish_ci,
	ENGINE=InnoDB;

CREATE TABLE `cakephp`.`businesses` (
	`id` int(11) NOT NULL AUTO_INCREMENT,
	`trading_name` varchar(45) CHARACTER SET latin1 COLLATE latin1_swedish_ci NOT NULL,
	`abn` varchar(45) CHARACTER SET latin1 COLLATE latin1_swedish_ci DEFAULT NULL,
	`phone` varchar(45) CHARACTER SET latin1 COLLATE latin1_swedish_ci DEFAULT NULL,
	`fax` varchar(45) CHARACTER SET latin1 COLLATE latin1_swedish_ci DEFAULT NULL,
	`address_street1` varchar(45) CHARACTER SET latin1 COLLATE latin1_swedish_ci DEFAULT NULL,
	`address_street2` varchar(45) CHARACTER SET latin1 COLLATE latin1_swedish_ci DEFAULT NULL,
	`address_suburb` varchar(45) CHARACTER SET latin1 COLLATE latin1_swedish_ci DEFAULT NULL,
	`address_state` varchar(45) CHARACTER SET latin1 COLLATE latin1_swedish_ci DEFAULT NULL,
	`address_postcode` varchar(45) CHARACTER SET latin1 COLLATE latin1_swedish_ci DEFAULT NULL,
	`social_plus` varchar(45) CHARACTER SET latin1 COLLATE latin1_swedish_ci DEFAULT NULL,
	`social_facebook` varchar(45) CHARACTER SET latin1 COLLATE latin1_swedish_ci DEFAULT NULL,
	`social_twitter` varchar(45) CHARACTER SET latin1 COLLATE latin1_swedish_ci DEFAULT NULL,
	`map_url` varchar(511) CHARACTER SET latin1 COLLATE latin1_swedish_ci DEFAULT NULL,	PRIMARY KEY  (`id`)) 	DEFAULT CHARSET=latin1,
	COLLATE=latin1_swedish_ci,
	ENGINE=InnoDB;

CREATE TABLE `cakephp`.`contacts` (
	`id` int(11) NOT NULL AUTO_INCREMENT,
	`host` varchar(45) CHARACTER SET latin1 COLLATE latin1_swedish_ci DEFAULT 'ssl://smtp.gmail.com',
	`port` int(11) DEFAULT 465,
	`username` varchar(45) CHARACTER SET latin1 COLLATE latin1_swedish_ci DEFAULT NULL,
	`password` varchar(45) CHARACTER SET latin1 COLLATE latin1_swedish_ci DEFAULT NULL,
	`transport` varchar(45) CHARACTER SET latin1 COLLATE latin1_swedish_ci DEFAULT 'smtp',
	`receiver_email` varchar(45) CHARACTER SET latin1 COLLATE latin1_swedish_ci DEFAULT NULL,
	`receiver_name` varchar(45) CHARACTER SET latin1 COLLATE latin1_swedish_ci DEFAULT NULL,	PRIMARY KEY  (`id`)) 	DEFAULT CHARSET=latin1,
	COLLATE=latin1_swedish_ci,
	ENGINE=InnoDB;

CREATE TABLE `cakephp`.`contents` (
	`business_id` int(11) NOT NULL,
	`id` varchar(45) CHARACTER SET latin1 COLLATE latin1_swedish_ci NOT NULL,
	`enabled` int(11) DEFAULT 1 NOT NULL,
	`order` int(11) NOT NULL,	PRIMARY KEY  (`id`)) 	DEFAULT CHARSET=latin1,
	COLLATE=latin1_swedish_ci,
	ENGINE=InnoDB;

CREATE TABLE `cakephp`.`homes` (
	`id` int(11) NOT NULL AUTO_INCREMENT,
	`slogan` varchar(1023) CHARACTER SET latin1 COLLATE latin1_swedish_ci DEFAULT 'What would you tell your customers in one line?',
	`cover` varchar(4095) CHARACTER SET latin1 COLLATE latin1_swedish_ci DEFAULT NULL,
	`cover_bg` varchar(45) CHARACTER SET latin1 COLLATE latin1_swedish_ci DEFAULT 'themed',
	`cover_image` varchar(45) CHARACTER SET latin1 COLLATE latin1_swedish_ci DEFAULT 'page_banner.jpg',	PRIMARY KEY  (`id`)) 	DEFAULT CHARSET=latin1,
	COLLATE=latin1_swedish_ci,
	ENGINE=InnoDB;

CREATE TABLE `cakephp`.`samples` (
	`id` int(11) NOT NULL AUTO_INCREMENT,
	`business_id` int(11) NOT NULL,
	`image` varchar(45) CHARACTER SET latin1 COLLATE latin1_swedish_ci DEFAULT NULL,
	`title` varchar(127) CHARACTER SET latin1 COLLATE latin1_swedish_ci DEFAULT NULL,
	`caption` varchar(1023) CHARACTER SET latin1 COLLATE latin1_swedish_ci DEFAULT NULL,	PRIMARY KEY  (`id`)) 	DEFAULT CHARSET=latin1,
	COLLATE=latin1_swedish_ci,
	ENGINE=InnoDB;

CREATE TABLE `cakephp`.`service_styles` (
	`id` int(11) NOT NULL AUTO_INCREMENT,
	`per_row` int(11) DEFAULT 1 NOT NULL,	PRIMARY KEY  (`id`)) 	DEFAULT CHARSET=latin1,
	COLLATE=latin1_swedish_ci,
	ENGINE=InnoDB;

CREATE TABLE `cakephp`.`services` (
	`id` int(11) NOT NULL AUTO_INCREMENT,
	`business_id` int(11) NOT NULL,
	`image` varchar(45) CHARACTER SET latin1 COLLATE latin1_swedish_ci DEFAULT NULL,
	`heading` varchar(45) CHARACTER SET latin1 COLLATE latin1_swedish_ci DEFAULT NULL,
	`description` varchar(1023) CHARACTER SET latin1 COLLATE latin1_swedish_ci DEFAULT NULL,
	`button` varchar(45) CHARACTER SET latin1 COLLATE latin1_swedish_ci DEFAULT NULL,
	`order` int(11) DEFAULT NULL,	PRIMARY KEY  (`id`)) 	DEFAULT CHARSET=latin1,
	COLLATE=latin1_swedish_ci,
	ENGINE=InnoDB;

CREATE TABLE `cakephp`.`styles` (
	`id` int(11) NOT NULL AUTO_INCREMENT,
	`brand_primary` varchar(6) CHARACTER SET latin1 COLLATE latin1_swedish_ci DEFAULT '428bca' NOT NULL,
	`brand_success` varchar(6) CHARACTER SET latin1 COLLATE latin1_swedish_ci DEFAULT '5cb85c' NOT NULL,
	`brand_info` varchar(6) CHARACTER SET latin1 COLLATE latin1_swedish_ci DEFAULT '5bc0de' NOT NULL,
	`brand_warning` varchar(6) CHARACTER SET latin1 COLLATE latin1_swedish_ci DEFAULT 'f0ad4e' NOT NULL,
	`brand_danger` varchar(6) CHARACTER SET latin1 COLLATE latin1_swedish_ci DEFAULT 'd9534f' NOT NULL,
	`img_logo` varchar(45) CHARACTER SET latin1 COLLATE latin1_swedish_ci DEFAULT 'logo.png',
	`img_logo_bang` varchar(45) CHARACTER SET latin1 COLLATE latin1_swedish_ci DEFAULT 'logo_bang.png',
	`full_span` int(11) DEFAULT 0 NOT NULL,	PRIMARY KEY  (`id`)) 	DEFAULT CHARSET=latin1,
	COLLATE=latin1_swedish_ci,
	ENGINE=InnoDB;

CREATE TABLE `cakephp`.`widgets` (
	`business_id` int(11) NOT NULL,
	`id` int(11) NOT NULL,
	`image` varchar(45) CHARACTER SET latin1 COLLATE latin1_swedish_ci DEFAULT NULL,
	`caption` varchar(45) CHARACTER SET latin1 COLLATE latin1_swedish_ci DEFAULT NULL,
	`text` varchar(1023) CHARACTER SET latin1 COLLATE latin1_swedish_ci DEFAULT NULL,
	`button` varchar(45) CHARACTER SET latin1 COLLATE latin1_swedish_ci DEFAULT NULL,
	`link` varchar(45) CHARACTER SET latin1 COLLATE latin1_swedish_ci DEFAULT NULL,
	`order` int(11) DEFAULT NULL,	PRIMARY KEY  (`id`, `business_id`)) 	DEFAULT CHARSET=latin1,
	COLLATE=latin1_swedish_ci,
	ENGINE=InnoDB;

