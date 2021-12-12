-- --------------------------------------------------------
-- Host:                         192.168.0.119
-- Server version:               5.6.17 - MySQL Community Server (GPL)
-- Server OS:                    Win64
-- HeidiSQL Version:             9.5.0.5196
-- --------------------------------------------------------

/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET NAMES utf8 */;
/*!50503 SET NAMES utf8mb4 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;

-- Dumping structure for table rms_makro_home_stage.account_type
DROP TABLE IF EXISTS `account_type`;
CREATE TABLE IF NOT EXISTS `account_type` (
  `acc_type_id` int(11) NOT NULL AUTO_INCREMENT,
  `acc_type` varchar(255) DEFAULT NULL,
  `acc_status` int(11) NOT NULL DEFAULT '1',
  `create_by` int(11) NOT NULL,
  `create_date` datetime NOT NULL,
  `modified_by` int(11) NOT NULL,
  `modified_date` datetime NOT NULL,
  `description` varchar(255) DEFAULT NULL,
  PRIMARY KEY (`acc_type_id`)
) ENGINE=InnoDB AUTO_INCREMENT=41 DEFAULT CHARSET=utf8;

-- Dumping data for table rms_makro_home_stage.account_type: ~13 rows (approximately)
DELETE FROM `account_type`;
/*!40000 ALTER TABLE `account_type` DISABLE KEYS */;
INSERT INTO `account_type` (`acc_type_id`, `acc_type`, `acc_status`, `create_by`, `create_date`, `modified_by`, `modified_date`, `description`) VALUES
	(1, 'Master Card', 1, 19, '0000-00-00 00:00:00', 19, '2018-12-19 00:00:00', 'CARD MASTER'),
	(2, 'ATM', 1, 19, '2018-12-19 00:00:00', 19, '2018-12-19 00:00:00', ''),
	(5, 'ATM Gold', 1, 19, '0000-00-00 00:00:00', 19, '0000-00-00 00:00:00', ''),
	(6, 'Diner Club', 1, 19, '0000-00-00 00:00:00', 19, '0000-00-00 00:00:00', ''),
	(7, 'Discover', 1, 19, '0000-00-00 00:00:00', 19, '0000-00-00 00:00:00', ''),
	(8, 'VISA', 1, 19, '0000-00-00 00:00:00', 19, '0000-00-00 00:00:00', ''),
	(9, 'UnionPay', 1, 19, '0000-00-00 00:00:00', 19, '0000-00-00 00:00:00', ''),
	(10, 'JCB', 1, 19, '0000-00-00 00:00:00', 19, '0000-00-00 00:00:00', ''),
	(11, 'ACLEDA ToanChet', 1, 19, '0000-00-00 00:00:00', 19, '0000-00-00 00:00:00', ''),
	(12, 'Pi Pay', 1, 19, '0000-00-00 00:00:00', 19, '0000-00-00 00:00:00', ''),
	(38, 'Unoin Pay', 1, 19, '2018-12-27 00:00:00', 19, '2018-12-27 00:00:00', '565665'),
	(39, 'PayPal', 1, 19, '2018-12-27 00:00:00', 19, '2018-12-27 00:00:00', NULL),
	(40, 'testss', 0, 19, '2018-12-28 00:00:00', 19, '2018-12-28 00:00:00', '');
/*!40000 ALTER TABLE `account_type` ENABLE KEYS */;

-- Dumping structure for table rms_makro_home_stage.alert_status
DROP TABLE IF EXISTS `alert_status`;
CREATE TABLE IF NOT EXISTS `alert_status` (
  `alert_id` int(11) NOT NULL AUTO_INCREMENT,
  `alert_stock_id` int(11) DEFAULT NULL,
  `alert_expire_date` date DEFAULT NULL,
  `alert_user_id` int(11) DEFAULT NULL,
  `alert_item_id` int(11) DEFAULT NULL,
  PRIMARY KEY (`alert_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- Dumping data for table rms_makro_home_stage.alert_status: ~0 rows (approximately)
DELETE FROM `alert_status`;
/*!40000 ALTER TABLE `alert_status` DISABLE KEYS */;
/*!40000 ALTER TABLE `alert_status` ENABLE KEYS */;

-- Dumping structure for table rms_makro_home_stage.branch
DROP TABLE IF EXISTS `branch`;
CREATE TABLE IF NOT EXISTS `branch` (
  `branch_id` int(11) NOT NULL AUTO_INCREMENT,
  `branch_name` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `branch_location` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `branch_phone` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `branch_created_date` date NOT NULL,
  `branch_created_by` int(11) NOT NULL,
  `branch_modified_by` int(11) DEFAULT NULL,
  `branch_modified_date` date DEFAULT NULL,
  `branch_des` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `branch_status` tinyint(1) DEFAULT '1',
  `branch_email` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `branch_wifi_password` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `sale_offline_cash_id` int(11) DEFAULT '0',
  `sale_offline_date` date DEFAULT NULL,
  `cashier_id` int(11) DEFAULT NULL,
  PRIMARY KEY (`branch_id`)
) ENGINE=InnoDB AUTO_INCREMENT=42 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci COMMENT='status =1 '' ACTIVE ''  ; status=0 ''DELETE''';

-- Dumping data for table rms_makro_home_stage.branch: ~0 rows (approximately)
DELETE FROM `branch`;
/*!40000 ALTER TABLE `branch` DISABLE KEYS */;
INSERT INTO `branch` (`branch_id`, `branch_name`, `branch_location`, `branch_phone`, `branch_created_date`, `branch_created_by`, `branch_modified_by`, `branch_modified_date`, `branch_des`, `branch_status`, `branch_email`, `branch_wifi_password`, `sale_offline_cash_id`, `sale_offline_date`, `cashier_id`) VALUES
	(41, 'STEAK BENGAL', 'Makro Siem Reap', '086340372', '2019-01-23', 19, 19, '2019-01-24', NULL, 1, NULL, '55559999', 0, NULL, NULL);
/*!40000 ALTER TABLE `branch` ENABLE KEYS */;

-- Dumping structure for table rms_makro_home_stage.cash_register
DROP TABLE IF EXISTS `cash_register`;
CREATE TABLE IF NOT EXISTS `cash_register` (
  `cash_id` int(11) NOT NULL AUTO_INCREMENT,
  `cash_user_id` int(11) DEFAULT NULL,
  `cash_amount` decimal(10,2) DEFAULT NULL,
  `cash_amount_kh` decimal(10,0) DEFAULT NULL,
  `cash_real_us` decimal(10,2) unsigned DEFAULT NULL,
  `cash_real_kh` decimal(10,0) unsigned DEFAULT NULL,
  `cash_startdate` datetime DEFAULT NULL,
  `cash_enddate` datetime DEFAULT NULL,
  `cash_branch_id` int(11) DEFAULT NULL,
  `cash_status` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `cash_note` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  PRIMARY KEY (`cash_id`)
) ENGINE=InnoDB AUTO_INCREMENT=9 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- Dumping data for table rms_makro_home_stage.cash_register: ~7 rows (approximately)
DELETE FROM `cash_register`;
/*!40000 ALTER TABLE `cash_register` DISABLE KEYS */;
INSERT INTO `cash_register` (`cash_id`, `cash_user_id`, `cash_amount`, `cash_amount_kh`, `cash_real_us`, `cash_real_kh`, `cash_startdate`, `cash_enddate`, `cash_branch_id`, `cash_status`, `cash_note`) VALUES
	(1, 19, 0.00, 0, 20.00, 500, '2019-01-24 21:12:33', '2019-01-25 08:51:28', 41, 'FINISH', ''),
	(2, 38, 150.00, 200000, NULL, NULL, '2019-01-25 06:37:03', NULL, 41, 'ACTIVE', ''),
	(3, 19, 0.00, 0, 352.00, 108000, '2019-01-25 08:59:42', '2019-01-25 17:14:16', 41, 'FINISH', ''),
	(4, 39, 80.00, 0, NULL, NULL, '2019-01-25 17:21:48', NULL, 41, 'ACTIVE', ''),
	(5, 19, 0.00, 0, 422.00, 398700, '2019-01-25 21:06:24', '2019-01-25 22:36:49', 41, 'FINISH', ''),
	(6, 19, 0.00, 0, 1.00, 1, '2019-01-26 12:00:03', '2019-01-26 17:00:41', 41, 'FINISH', ''),
	(7, 19, 0.00, 0, 1.00, 1, '2019-01-26 17:41:07', '2019-01-26 19:02:03', 41, 'FINISH', ''),
	(8, 19, 0.00, 0, NULL, NULL, '2019-02-07 15:24:41', NULL, 41, 'ACTIVE', '');
/*!40000 ALTER TABLE `cash_register` ENABLE KEYS */;

-- Dumping structure for table rms_makro_home_stage.category
DROP TABLE IF EXISTS `category`;
CREATE TABLE IF NOT EXISTS `category` (
  `category_id` int(11) NOT NULL AUTO_INCREMENT,
  `category_name` varchar(100) COLLATE utf8_unicode_ci DEFAULT NULL,
  `category_photo` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `category_description` text COLLATE utf8_unicode_ci,
  `category_created_date` date DEFAULT NULL,
  `category_created_by` int(11) DEFAULT NULL,
  `category_modified_date` date DEFAULT NULL,
  `category_modified_by` int(11) DEFAULT NULL,
  PRIMARY KEY (`category_id`)
) ENGINE=InnoDB AUTO_INCREMENT=7 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- Dumping data for table rms_makro_home_stage.category: ~2 rows (approximately)
DELETE FROM `category`;
/*!40000 ALTER TABLE `category` DISABLE KEYS */;
INSERT INTO `category` (`category_id`, `category_name`, `category_photo`, `category_description`, `category_created_date`, `category_created_by`, `category_modified_date`, `category_modified_by`) VALUES
	(2, 'DRINK', NULL, '                                ', '2018-12-26', 19, NULL, NULL),
	(6, 'Food', NULL, '                                                                ', '2019-01-23', 19, '2019-01-24', 19);
/*!40000 ALTER TABLE `category` ENABLE KEYS */;

-- Dumping structure for table rms_makro_home_stage.ci_sessions
DROP TABLE IF EXISTS `ci_sessions`;
CREATE TABLE IF NOT EXISTS `ci_sessions` (
  `session_id` varchar(40) COLLATE utf8_bin NOT NULL DEFAULT '0',
  `ip_address` varchar(16) COLLATE utf8_bin NOT NULL DEFAULT '0',
  `user_agent` varchar(150) COLLATE utf8_bin NOT NULL,
  `last_activity` int(10) unsigned NOT NULL DEFAULT '0',
  `user_data` text COLLATE utf8_bin NOT NULL,
  PRIMARY KEY (`session_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin;

-- Dumping data for table rms_makro_home_stage.ci_sessions: ~0 rows (approximately)
DELETE FROM `ci_sessions`;
/*!40000 ALTER TABLE `ci_sessions` DISABLE KEYS */;
/*!40000 ALTER TABLE `ci_sessions` ENABLE KEYS */;

-- Dumping structure for table rms_makro_home_stage.company_profile
DROP TABLE IF EXISTS `company_profile`;
CREATE TABLE IF NOT EXISTS `company_profile` (
  `company_profile_id` int(11) NOT NULL AUTO_INCREMENT,
  `company_profile_name` text CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `company_profile_phone` varchar(20) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `company_profile_email` varchar(100) CHARACTER SET utf8 COLLATE utf8_unicode_ci DEFAULT NULL,
  `company_profile_address` text CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `company_profile_image` varchar(200) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `company_profile_created_by` int(11) NOT NULL,
  `company_profile_created_date` datetime NOT NULL,
  `company_profile_modified_by` int(11) DEFAULT NULL,
  `company_profile_date_modified` datetime DEFAULT NULL,
  `company_profile_branch_id` int(11) DEFAULT NULL,
  `company_profile_modified_date` date DEFAULT NULL,
  `company_profile_wifi` varchar(255) DEFAULT NULL,
  `company_profile_set_up_point` int(11) DEFAULT NULL,
  PRIMARY KEY (`company_profile_id`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=latin1;

-- Dumping data for table rms_makro_home_stage.company_profile: ~0 rows (approximately)
DELETE FROM `company_profile`;
/*!40000 ALTER TABLE `company_profile` DISABLE KEYS */;
INSERT INTO `company_profile` (`company_profile_id`, `company_profile_name`, `company_profile_phone`, `company_profile_email`, `company_profile_address`, `company_profile_image`, `company_profile_created_by`, `company_profile_created_date`, `company_profile_modified_by`, `company_profile_date_modified`, `company_profile_branch_id`, `company_profile_modified_date`, `company_profile_wifi`, `company_profile_set_up_point`) VALUES
	(1, 'Home Noodles and Steak', '', '', '#153, St 289, BK01, TK, PP', '154839246220190125_050102photo_2019-01-25_12-00-19.jpg', 1, '2019-01-24 00:00:00', 19, NULL, 1, '2019-01-25', '', NULL);
/*!40000 ALTER TABLE `company_profile` ENABLE KEYS */;

-- Dumping structure for table rms_makro_home_stage.cookie
DROP TABLE IF EXISTS `cookie`;
CREATE TABLE IF NOT EXISTS `cookie` (
  `cookie_id` int(11) NOT NULL AUTO_INCREMENT,
  `cookie_user_id` int(11) DEFAULT NULL,
  `cookie_user_data` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `cookie_status` tinyint(2) DEFAULT NULL,
  `cookie_remember` tinyint(2) DEFAULT NULL,
  PRIMARY KEY (`cookie_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- Dumping data for table rms_makro_home_stage.cookie: ~0 rows (approximately)
DELETE FROM `cookie`;
/*!40000 ALTER TABLE `cookie` DISABLE KEYS */;
/*!40000 ALTER TABLE `cookie` ENABLE KEYS */;

-- Dumping structure for table rms_makro_home_stage.customer
DROP TABLE IF EXISTS `customer`;
CREATE TABLE IF NOT EXISTS `customer` (
  `customer_id` int(11) NOT NULL AUTO_INCREMENT,
  `customer_type_id` int(11) NOT NULL,
  `customer_name` varchar(255) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `customer_email` varchar(255) NOT NULL,
  `customer_gender` varchar(255) NOT NULL,
  `customer_picture` varchar(255) NOT NULL,
  `customer_dob` date DEFAULT NULL,
  `customer_address` varchar(255) DEFAULT NULL,
  `customer_phone` varchar(255) DEFAULT NULL,
  `customer_created_date` datetime DEFAULT NULL,
  `customer_created_by` int(11) DEFAULT NULL,
  `customer_modified_by` int(11) DEFAULT NULL,
  `customer_modified_date` datetime DEFAULT NULL,
  `isdiscount` int(11) DEFAULT '0' COMMENT '0',
  `customer_status` tinyint(1) DEFAULT '1' COMMENT 'status =0 ''DELETE'' ; status 1=''ACTIVE''',
  `customer_enable` tinyint(1) DEFAULT '1' COMMENT 'status =0 ''DISABLE'' ; status 1=''ENABLE''',
  `customer_branch_id` int(11) DEFAULT NULL,
  `customer_card_number` varchar(50) DEFAULT NULL,
  `customer_card_serial` varchar(50) DEFAULT NULL,
  `customer_chip` varchar(50) DEFAULT NULL,
  `customer_balance` decimal(10,2) DEFAULT '0.00',
  `customer_point` int(11) DEFAULT NULL,
  `customer_card_expired` date DEFAULT NULL,
  `customer_discount` int(11) DEFAULT NULL,
  `customer_card_expired_alert` date DEFAULT NULL,
  `customer_amount_remain_alert` decimal(10,2) DEFAULT NULL,
  `customer_card_created_date` datetime DEFAULT NULL,
  `customer_card_created_by` int(11) DEFAULT NULL,
  `customer_card_modified_date` datetime DEFAULT NULL,
  `customer_card_modified_by` int(11) DEFAULT NULL,
  PRIMARY KEY (`customer_id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- Dumping data for table rms_makro_home_stage.customer: ~0 rows (approximately)
DELETE FROM `customer`;
/*!40000 ALTER TABLE `customer` DISABLE KEYS */;
/*!40000 ALTER TABLE `customer` ENABLE KEYS */;

-- Dumping structure for table rms_makro_home_stage.customer_credit
DROP TABLE IF EXISTS `customer_credit`;
CREATE TABLE IF NOT EXISTS `customer_credit` (
  `customer_credit_id` int(11) NOT NULL AUTO_INCREMENT,
  `customer_id` int(11) NOT NULL,
  `customer_credit_modified_by` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `customer_credit_modified_date` datetime NOT NULL,
  `customer_credit_recieve_amount` decimal(10,2) NOT NULL,
  `customer_credit_total` decimal(10,2) NOT NULL,
  `customer_credit_discount` decimal(10,2) NOT NULL,
  `customer_credit_amount_credit` decimal(10,2) NOT NULL,
  `customer_credit_invoice_no` int(11) DEFAULT NULL,
  `customer_credit_paid_amount` decimal(10,2) DEFAULT NULL,
  `credit_credit_sale_type` varchar(50) COLLATE utf8_unicode_ci DEFAULT NULL,
  `customer_credit_due_amount` decimal(10,2) DEFAULT NULL,
  `customer_credit_status` varchar(100) COLLATE utf8_unicode_ci DEFAULT NULL,
  `customer_credit_note` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `customer_credit_created_by` int(11) DEFAULT NULL,
  `customer_credit_created_date` date DEFAULT NULL,
  `customer_credit_pay_date` date DEFAULT NULL,
  `branch_id` int(11) DEFAULT NULL,
  PRIMARY KEY (`customer_credit_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- Dumping data for table rms_makro_home_stage.customer_credit: ~0 rows (approximately)
DELETE FROM `customer_credit`;
/*!40000 ALTER TABLE `customer_credit` DISABLE KEYS */;
/*!40000 ALTER TABLE `customer_credit` ENABLE KEYS */;

-- Dumping structure for table rms_makro_home_stage.customer_type
DROP TABLE IF EXISTS `customer_type`;
CREATE TABLE IF NOT EXISTS `customer_type` (
  `customer_type_id` int(11) NOT NULL AUTO_INCREMENT,
  `customer_type_name` varchar(255) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `customer_type_des` varchar(255) DEFAULT NULL,
  `customer_type_created_date` date DEFAULT NULL,
  `customer_type_created_by` int(11) DEFAULT NULL,
  `customer_type_modified_by` int(11) DEFAULT NULL,
  `customer_type_modified_date` date DEFAULT NULL,
  `customer_type_status` tinyint(1) DEFAULT '1',
  PRIMARY KEY (`customer_type_id`)
) ENGINE=InnoDB AUTO_INCREMENT=8 DEFAULT CHARSET=latin1 COMMENT='status=1''ACTIVE''  ; status=0''DELETE''';

-- Dumping data for table rms_makro_home_stage.customer_type: ~2 rows (approximately)
DELETE FROM `customer_type`;
/*!40000 ALTER TABLE `customer_type` DISABLE KEYS */;
INSERT INTO `customer_type` (`customer_type_id`, `customer_type_name`, `customer_type_des`, `customer_type_created_date`, `customer_type_created_by`, `customer_type_modified_by`, `customer_type_modified_date`, `customer_type_status`) VALUES
	(6, 'General', '', '2018-11-08', 19, NULL, NULL, 1),
	(7, 'VIP', 'This is VIP Position', '2018-11-08', 19, 19, '0000-00-00', 1);
/*!40000 ALTER TABLE `customer_type` ENABLE KEYS */;

-- Dumping structure for table rms_makro_home_stage.employee
DROP TABLE IF EXISTS `employee`;
CREATE TABLE IF NOT EXISTS `employee` (
  `employee_id` int(11) NOT NULL AUTO_INCREMENT,
  `employee_brand_id` int(11) NOT NULL DEFAULT '0',
  `employee_position_id` varchar(255) DEFAULT NULL,
  `employee_name` varchar(255) CHARACTER SET utf8 COLLATE utf8_unicode_ci DEFAULT NULL,
  `employee_sex` varchar(255) DEFAULT NULL,
  `employee_email` varchar(255) DEFAULT NULL,
  `employee_dob` date DEFAULT NULL,
  `employee_address` varchar(255) DEFAULT NULL,
  `employee_phone` varchar(255) DEFAULT NULL,
  `employee_shift_id` int(11) DEFAULT NULL,
  `employee_note` varchar(255) DEFAULT NULL,
  `employee_hired_date` date DEFAULT NULL,
  `employee_salary` int(11) DEFAULT NULL,
  `employee_created_date` date DEFAULT NULL,
  `employee_created_by` int(11) DEFAULT NULL,
  `employee_modified_by` int(11) DEFAULT NULL,
  `employee_modified_date` date DEFAULT NULL,
  `employee_stock_location_id` int(11) DEFAULT NULL,
  `employee_is_seller` tinyint(4) DEFAULT NULL,
  `employee_card` varchar(255) CHARACTER SET utf8 DEFAULT NULL,
  `status` tinyint(1) NOT NULL DEFAULT '1',
  PRIMARY KEY (`employee_id`)
) ENGINE=InnoDB AUTO_INCREMENT=40 DEFAULT CHARSET=latin1;

-- Dumping data for table rms_makro_home_stage.employee: ~9 rows (approximately)
DELETE FROM `employee`;
/*!40000 ALTER TABLE `employee` DISABLE KEYS */;
INSERT INTO `employee` (`employee_id`, `employee_brand_id`, `employee_position_id`, `employee_name`, `employee_sex`, `employee_email`, `employee_dob`, `employee_address`, `employee_phone`, `employee_shift_id`, `employee_note`, `employee_hired_date`, `employee_salary`, `employee_created_date`, `employee_created_by`, `employee_modified_by`, `employee_modified_date`, `employee_stock_location_id`, `employee_is_seller`, `employee_card`, `status`) VALUES
	(19, 41, '43', 'admin', 'Male', '', '1985-06-01', 'Phnom Penh', '095659666', 5, '', '2018-07-02', 0, '2017-06-01', 11, 19, '2019-01-24', 1, NULL, '', 1),
	(32, 1, '43', 'Vichet', 'Male', '', '2018-12-26', 'PP', '0162447716', 6, '', '2019-01-04', 0, '2018-12-26', 19, 32, '2019-01-05', 1, 1, '123456789', 0),
	(33, 1, '43', 'Cheang', 'Male', 'abc@abc.com', '2018-12-27', 'pp', '0162447716', 6, '', '2019-01-04', 0, '2018-12-27', 19, 19, '2018-12-27', 1, 1, '123456', 0),
	(34, 39, '47', 'chet', 'Male', '', '2019-01-16', '', '01124546', 5, '', '2019-01-04', 0, '2019-01-04', 19, 19, '2019-01-04', 2, 1, '', 0),
	(35, 41, '43', 'dara', 'Male', 'heam@gmail.com', '2019-01-01', '', '012675980', 5, '', '2019-01-04', 0, '2019-01-23', 19, NULL, NULL, 3, 1, '567', 0),
	(36, 41, '49', 'chan rasy', 'Male', 'chanrasy2018@gmail.com', '2018-12-04', '', '086340372', 6, '', '2019-01-04', 0, '2019-01-23', 19, NULL, NULL, 3, 1, '001', 0),
	(37, 41, '49', 'pean englay', 'Male', 'nan@gmail.com', '2018-10-03', '', '095404742', 7, '', '2019-01-04', 0, '2019-01-23', 19, NULL, NULL, 3, 1, '002', 0),
	(38, 41, '49', 'chan rasy', 'Female', '', '2019-01-01', '', '012', 6, '', '2019-01-04', 0, '2019-01-24', 19, 19, '2019-01-24', 3, 1, '', 1),
	(39, 41, '49', 'pean englay', 'Female', '', '2019-01-01', '', '013', 7, '', '2019-01-04', 0, '2019-01-24', 19, 19, '2019-01-24', 3, 1, '', 1);
/*!40000 ALTER TABLE `employee` ENABLE KEYS */;

-- Dumping structure for table rms_makro_home_stage.expense
DROP TABLE IF EXISTS `expense`;
CREATE TABLE IF NOT EXISTS `expense` (
  `expense_id` int(11) NOT NULL AUTO_INCREMENT,
  `expense_no` int(11) NOT NULL DEFAULT '0',
  `expense_type_id` int(255) DEFAULT NULL,
  `expense_detail_id` int(255) DEFAULT NULL,
  `expense_des` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `expense_date` date DEFAULT NULL,
  `expense_created_by` int(255) NOT NULL,
  `expense_created_date` date NOT NULL,
  `expense_modified_by` int(11) DEFAULT NULL,
  `expense_modified_date` datetime DEFAULT NULL,
  `expense_status` text COLLATE utf8_unicode_ci,
  `expense_amount` decimal(10,2) DEFAULT NULL,
  `expense_branch_id` int(11) DEFAULT NULL,
  PRIMARY KEY (`expense_id`)
) ENGINE=InnoDB AUTO_INCREMENT=35 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- Dumping data for table rms_makro_home_stage.expense: ~16 rows (approximately)
DELETE FROM `expense`;
/*!40000 ALTER TABLE `expense` DISABLE KEYS */;
INSERT INTO `expense` (`expense_id`, `expense_no`, `expense_type_id`, `expense_detail_id`, `expense_des`, `expense_date`, `expense_created_by`, `expense_created_date`, `expense_modified_by`, `expense_modified_date`, `expense_status`, `expense_amount`, `expense_branch_id`) VALUES
	(3, 2, 2, 2, '', '2019-01-03', 19, '2019-01-03', NULL, NULL, 'DONE', 10.00, NULL),
	(19, 1, 2, 15, '', '2019-01-26', 19, '2019-01-26', NULL, NULL, 'DONE', 4.50, 41),
	(20, 2, 2, 20, '', '2019-01-26', 19, '2019-01-26', NULL, NULL, 'DONE', 3.00, 41),
	(21, 3, 2, 22, '', '2019-01-26', 19, '2019-01-26', NULL, NULL, 'DONE', 7.87, 41),
	(22, 4, 2, 18, '', '2019-01-26', 19, '2019-01-26', NULL, NULL, 'DONE', 16.00, 41),
	(23, 5, 2, 17, '', '2019-01-26', 19, '2019-01-26', NULL, NULL, 'DONE', 6.50, 41),
	(24, 6, 2, 16, '', '2019-01-26', 19, '2019-01-26', NULL, NULL, 'DONE', 3.87, 41),
	(25, 7, 2, 19, '', '2019-01-26', 19, '2019-01-26', NULL, NULL, 'DONE', 5.50, 41),
	(26, 8, 2, 23, '', '2019-01-26', 19, '2019-01-26', NULL, NULL, 'DONE', 9.50, 41),
	(27, 9, 2, 24, '', '2019-01-26', 19, '2019-01-26', NULL, NULL, 'DONE', 4.90, 41),
	(28, 10, 2, 25, '', '2019-01-26', 19, '2019-01-26', NULL, NULL, 'DONE', 8.10, 41),
	(30, 11, 2, 26, '', '2019-01-26', 19, '2019-01-26', NULL, NULL, 'DONE', 3.00, 41),
	(31, 12, 2, 27, '', '2019-01-26', 19, '2019-01-26', NULL, NULL, 'DONE', 1.87, 41),
	(32, 13, 2, 16, '', '2019-01-26', 19, '2019-01-26', NULL, NULL, 'DONE', 8.50, 41),
	(33, 14, 2, 19, '', '2019-01-26', 19, '2019-01-26', NULL, NULL, 'DONE', 5.75, 41),
	(34, 15, 2, 28, '', '2019-01-26', 19, '2019-01-26', NULL, NULL, 'DONE', 1.75, 41);
/*!40000 ALTER TABLE `expense` ENABLE KEYS */;

-- Dumping structure for table rms_makro_home_stage.expense_detail
DROP TABLE IF EXISTS `expense_detail`;
CREATE TABLE IF NOT EXISTS `expense_detail` (
  `expense_detail_id` int(11) NOT NULL AUTO_INCREMENT,
  `expense_type_id` int(11) NOT NULL DEFAULT '0',
  `expense_detail_name` varchar(50) COLLATE utf8_unicode_ci NOT NULL DEFAULT '0',
  `expense_chart_number` varchar(50) COLLATE utf8_unicode_ci NOT NULL DEFAULT '0',
  `expense_detail_created_date` date NOT NULL DEFAULT '0000-00-00',
  `expense_detail_created_by` int(11) NOT NULL DEFAULT '0',
  `expense_detail_modified_date` datetime NOT NULL DEFAULT '0000-00-00 00:00:00',
  `expense_detail_modified_by` int(11) NOT NULL DEFAULT '0',
  `expense_detail_status` tinyint(4) DEFAULT '1',
  PRIMARY KEY (`expense_detail_id`)
) ENGINE=InnoDB AUTO_INCREMENT=29 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- Dumping data for table rms_makro_home_stage.expense_detail: ~28 rows (approximately)
DELETE FROM `expense_detail`;
/*!40000 ALTER TABLE `expense_detail` DISABLE KEYS */;
INSERT INTO `expense_detail` (`expense_detail_id`, `expense_type_id`, `expense_detail_name`, `expense_chart_number`, `expense_detail_created_date`, `expense_detail_created_by`, `expense_detail_modified_date`, `expense_detail_modified_by`, `expense_detail_status`) VALUES
	(1, 2, 'Utilities', '10008', '2018-12-26', 19, '2018-12-26 14:30:53', 0, 0),
	(2, 2, 'Salary', '100010', '2018-12-26', 19, '2018-12-26 02:31:19', 19, 0),
	(3, 2, 'gas', '001', '2019-01-23', 19, '2019-01-23 15:27:06', 0, 0),
	(4, 3, 'dara', '45', '2019-01-23', 19, '2019-01-23 15:29:32', 0, 0),
	(5, 2, '', 'Noodle', '2019-01-24', 19, '2019-01-24 15:41:33', 0, 0),
	(6, 2, 'Water Supplier ', '011', '2019-01-24', 19, '2019-01-24 15:42:34', 0, 0),
	(7, 2, 'beef', '#1', '2019-01-24', 19, '2019-01-24 15:48:25', 0, 0),
	(8, 5, 'paper', '#2', '2019-01-24', 19, '2019-01-24 15:57:09', 0, 0),
	(9, 5, 'chair', '#3', '2019-01-24', 19, '2019-01-24 16:05:10', 0, 0),
	(10, 2, 'gas', '#4', '2019-01-24', 19, '2019-01-24 16:09:23', 0, 0),
	(11, 3, 'dara', '#5', '2019-01-24', 19, '2019-01-24 16:11:30', 0, 0),
	(12, 5, 'tv', '#6', '2019-01-24', 19, '2019-01-24 16:13:37', 0, 0),
	(13, 2, 'bread', '#7', '2019-01-24', 19, '2019-01-24 16:15:17', 0, 0),
	(14, 3, 'sopy', '#8', '2019-01-24', 19, '2019-01-24 16:20:07', 0, 0),
	(15, 2, 'coconut', '#10', '2019-01-26', 19, '2019-01-26 08:38:19', 0, 1),
	(16, 2, 'beef', '#11', '2019-01-26', 19, '2019-01-26 08:39:15', 0, 1),
	(17, 2, 'pork ribs', '#12', '2019-01-26', 19, '2019-01-26 08:40:07', 0, 1),
	(18, 2, 'pork', '#13', '2019-01-26', 19, '2019-01-26 08:40:41', 0, 1),
	(19, 2, 'beef bone ', '#14', '2019-01-26', 19, '2019-01-26 08:49:10', 0, 1),
	(20, 2, 'purple cabbage', '#15', '2019-01-26', 19, '2019-01-26 08:55:10', 0, 1),
	(21, 2, 'baby tomatoes', '#16', '2019-01-26', 19, '2019-01-26 08:55:50', 0, 1),
	(22, 2, 'salad', '#17', '2019-01-26', 19, '2019-01-26 08:56:31', 0, 1),
	(23, 2, 'beef ribs', '#18', '2019-01-26', 19, '2019-01-26 09:04:58', 0, 1),
	(24, 2, 'fish sauce', '#19', '2019-01-26', 19, '2019-01-26 09:05:51', 0, 1),
	(25, 2, 'Tissue', '#21', '2019-01-26', 19, '2019-01-26 09:43:11', 0, 1),
	(26, 2, 'staff water', '#22', '2019-01-26', 19, '2019-01-26 10:21:05', 0, 1),
	(27, 2, 'herb', '#23', '2019-01-26', 19, '2019-01-26 10:22:23', 0, 1),
	(28, 2, 'other', '#24', '2019-01-26', 19, '2019-01-26 10:23:04', 0, 1);
/*!40000 ALTER TABLE `expense_detail` ENABLE KEYS */;

-- Dumping structure for table rms_makro_home_stage.expense_type
DROP TABLE IF EXISTS `expense_type`;
CREATE TABLE IF NOT EXISTS `expense_type` (
  `expense_type_id` int(11) NOT NULL AUTO_INCREMENT,
  `expense_chart_number` int(11) DEFAULT NULL,
  `expense_type_name` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `expense_type_des` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `expense_type_created_by` int(255) NOT NULL,
  `expense_type_created_date` date NOT NULL,
  `expense_type_modified_by` int(11) DEFAULT NULL,
  `expense_type_modified_date` datetime DEFAULT NULL,
  PRIMARY KEY (`expense_type_id`)
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- Dumping data for table rms_makro_home_stage.expense_type: ~3 rows (approximately)
DELETE FROM `expense_type`;
/*!40000 ALTER TABLE `expense_type` DISABLE KEYS */;
INSERT INTO `expense_type` (`expense_type_id`, `expense_chart_number`, `expense_type_name`, `expense_type_des`, `expense_type_created_by`, `expense_type_created_date`, `expense_type_modified_by`, `expense_type_modified_date`) VALUES
	(2, NULL, 'kitchen', '', 19, '2018-12-26', 19, '2019-01-23 03:25:45'),
	(3, NULL, 'salary', '', 19, '2019-01-23', NULL, NULL),
	(5, NULL, 'cashier', '', 19, '2019-01-24', NULL, NULL);
/*!40000 ALTER TABLE `expense_type` ENABLE KEYS */;

-- Dumping structure for table rms_makro_home_stage.floor
DROP TABLE IF EXISTS `floor`;
CREATE TABLE IF NOT EXISTS `floor` (
  `floor_id` int(11) NOT NULL AUTO_INCREMENT,
  `floor_name` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `floor_location_x` float NOT NULL,
  `floor_location_y` float NOT NULL,
  `floor_tab_index` int(11) NOT NULL,
  `floor_branch_id` int(11) NOT NULL,
  `layout_is_car_wash` tinyint(4) NOT NULL,
  `floor_created_date` date NOT NULL,
  `floor_created_by` int(11) NOT NULL,
  `status` tinyint(1) DEFAULT '1',
  PRIMARY KEY (`floor_id`)
) ENGINE=InnoDB AUTO_INCREMENT=62 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- Dumping data for table rms_makro_home_stage.floor: ~22 rows (approximately)
DELETE FROM `floor`;
/*!40000 ALTER TABLE `floor` DISABLE KEYS */;
INSERT INTO `floor` (`floor_id`, `floor_name`, `floor_location_x`, `floor_location_y`, `floor_tab_index`, `floor_branch_id`, `layout_is_car_wash`, `floor_created_date`, `floor_created_by`, `status`) VALUES
	(30, 'Hall 1', 0, 0, 0, 1, 0, '2018-12-26', 19, 1),
	(31, 'Hall 2', 0, 0, 0, 1, 0, '2018-12-26', 19, 1),
	(32, 'VIP', 0, 0, 0, 1, 0, '2018-12-26', 19, 1),
	(33, 'floor4', 0, 0, 0, 1, 0, '2018-10-11', 19, 0),
	(38, 'floor2', 0, 0, 0, 2, 0, '2018-10-11', 19, 1),
	(39, 'floor1', 0, 0, 0, 2, 0, '2018-07-06', 19, 1),
	(40, 'Test', 0, 0, 0, 1, 0, '2018-11-07', 19, 0),
	(41, 'tests', 0, 0, 0, 1, 0, '2018-11-07', 19, 0),
	(42, 'kk', 0, 0, 0, 1, 0, '2018-11-07', 19, 0),
	(49, 'Floor C', 0, 0, 0, 2, 0, '2018-11-07', 19, 0),
	(50, 'Table Bro', 0, 0, 0, 1, 0, '2018-11-08', 19, 0),
	(51, 'test', 0, 0, 0, 1, 0, '2018-11-08', 19, 0),
	(52, 'sfsdsdf', 0, 0, 0, 1, 0, '2018-11-08', 19, 0),
	(53, '', 0, 0, 0, 1, 0, '2018-11-10', 19, 0),
	(54, '4111', 0, 0, 0, 1, 0, '2018-11-10', 19, 0),
	(55, '', 0, 0, 0, 1, 0, '2018-11-10', 19, 0),
	(56, '', 0, 0, 0, 1, 0, '2018-11-10', 19, 0),
	(57, '', 0, 0, 0, 1, 0, '2018-11-10', 19, 0),
	(58, 'Hall 1', 0, 0, 0, 39, 0, '2018-12-26', 19, 1),
	(59, 'Hall3', 0, 0, 0, 1, 0, '2019-01-14', 19, 0),
	(60, 'Hall 2', 0, 0, 0, 39, 0, '2019-01-14', 19, 1),
	(61, 'Noodle', 0, 0, 0, 41, 0, '2019-01-24', 19, 1);
/*!40000 ALTER TABLE `floor` ENABLE KEYS */;

-- Dumping structure for table rms_makro_home_stage.floor_table_layout
DROP TABLE IF EXISTS `floor_table_layout`;
CREATE TABLE IF NOT EXISTS `floor_table_layout` (
  `layout_id` int(11) NOT NULL AUTO_INCREMENT,
  `floor_id` int(11) NOT NULL,
  `layout_name` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `layout_location_x` float NOT NULL,
  `layout_location_y` float NOT NULL,
  `layout_tab_index` int(11) NOT NULL,
  `layout_type` text COLLATE utf8_unicode_ci NOT NULL,
  `layout_branch_id` int(11) NOT NULL,
  `layout_created_date` date NOT NULL,
  `layout_created_by` int(11) NOT NULL,
  `layout_manage_by` int(11) NOT NULL,
  `status` tinyint(1) DEFAULT '1',
  PRIMARY KEY (`layout_id`)
) ENGINE=InnoDB AUTO_INCREMENT=192 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- Dumping data for table rms_makro_home_stage.floor_table_layout: ~86 rows (approximately)
DELETE FROM `floor_table_layout`;
/*!40000 ALTER TABLE `floor_table_layout` DISABLE KEYS */;
INSERT INTO `floor_table_layout` (`layout_id`, `floor_id`, `layout_name`, `layout_location_x`, `layout_location_y`, `layout_tab_index`, `layout_type`, `layout_branch_id`, `layout_created_date`, `layout_created_by`, `layout_manage_by`, `status`) VALUES
	(101, 30, '1', 26, 14, 0, 'TABLE', 1, '2018-07-06', 19, 0, 1),
	(102, 30, '2', 132, 15, 0, 'TABLE', 1, '2018-07-06', 19, 0, 1),
	(103, 30, '3', 243, 14, 0, 'TABLE', 1, '2018-07-21', 19, 0, 1),
	(104, 30, '4', 359, 18, 0, 'TABLE', 1, '2018-07-21', 19, 0, 1),
	(105, 30, '5', 465, 18, 0, 'TABLE', 1, '2018-07-21', 19, 0, 1),
	(106, 30, '6', 570, 19, 0, 'TABLE', 1, '2018-07-21', 19, 0, 1),
	(107, 30, '7', 676, 18, 0, 'TABLE', 1, '2018-07-21', 19, 0, 1),
	(108, 30, '8', 781, 18, 0, 'TABLE', 1, '2018-07-21', 19, 0, 1),
	(109, 30, '9', 887, 18, 0, 'TABLE', 1, '2018-07-21', 19, 0, 1),
	(110, 30, '10', 994, 17, 0, 'TABLE', 1, '2018-07-21', 19, 0, 1),
	(111, 30, '11', 1098, 16, 0, 'TABLE', 1, '2018-07-21', 19, 0, 1),
	(112, 30, '12', 1203, 16, 0, 'TABLE', 1, '2018-07-21', 19, 0, 1),
	(113, 30, '13', 22, 118, 0, 'TABLE', 1, '2018-07-21', 19, 0, 1),
	(114, 30, '14', 132, 119, 0, 'TABLE', 1, '2018-07-21', 19, 0, 1),
	(115, 30, '15', 243, 121, 0, 'TABLE', 1, '2018-07-21', 19, 0, 1),
	(116, 30, '16', 357, 117, 0, 'TABLE', 1, '2018-07-21', 19, 0, 1),
	(117, 30, '17', 464, 116, 0, 'TABLE', 1, '2018-07-21', 19, 0, 1),
	(118, 30, '18', 569, 117, 0, 'TABLE', 1, '2018-07-21', 19, 0, 1),
	(119, 30, '19', 672, 116, 0, 'TABLE', 1, '2018-07-21', 19, 0, 1),
	(120, 30, '20', 778, 117, 0, 'TABLE', 1, '2018-07-21', 19, 0, 1),
	(121, 30, '21', 886, 116, 0, 'TABLE', 1, '2018-07-21', 19, 0, 1),
	(122, 30, '22', 994, 116, 0, 'TABLE', 1, '2018-07-21', 19, 0, 1),
	(123, 30, '23', 1098, 116, 0, 'TABLE', 1, '2018-07-21', 19, 0, 1),
	(124, 30, '24', 1205, 117, 0, 'TABLE', 1, '2018-07-21', 19, 0, 1),
	(125, 30, '25', 23, 217, 0, 'TABLE', 1, '2018-07-21', 19, 0, 1),
	(126, 30, '26', 136, 217, 0, 'TABLE', 1, '2018-07-21', 19, 0, 1),
	(127, 30, '27', 244, 215, 0, 'TABLE', 1, '2018-07-21', 19, 0, 1),
	(128, 30, '28', 349, 217, 0, 'TABLE', 1, '2018-07-21', 19, 0, 1),
	(129, 30, '29', 469, 216, 0, 'TABLE', 1, '2018-07-21', 19, 0, 1),
	(130, 30, '30', 581, 214, 0, 'TABLE', 1, '2018-07-21', 19, 0, 1),
	(131, 30, '31', 684, 215, 0, 'TABLE', 1, '2018-07-21', 19, 0, 1),
	(132, 30, '32', 788, 216, 0, 'TABLE', 1, '2018-07-21', 19, 0, 1),
	(133, 30, '33', 891, 214, 0, 'TABLE', 1, '2018-07-21', 19, 0, 1),
	(134, 30, '34', 996, 214, 0, 'TABLE', 1, '2018-07-21', 19, 0, 1),
	(135, 30, '35', 1103, 218, 0, 'TABLE', 1, '2018-07-21', 19, 0, 1),
	(136, 30, '36', 1207, 216, 0, 'TABLE', 1, '2018-07-21', 19, 0, 1),
	(137, 33, 'TABLE1', 31, 8, 0, 'TABLE', 1, '2018-10-11', 19, 0, 0),
	(138, 33, 'TABLE2', 138, 7, 0, 'TABLE', 1, '2018-10-11', 19, 0, 0),
	(139, 33, 'TABLE3', 251, 8, 0, 'TABLE', 1, '2018-10-11', 19, 0, 0),
	(140, 33, 'TABLE4', 359, 10, 0, 'TABLE', 1, '2018-10-11', 19, 0, 0),
	(141, 33, 'TABLE5', 467, 7, 0, 'TABLE', 1, '2018-10-11', 19, 0, 0),
	(147, 31, 'test 1', 661, 48, 0, 'TABLE', 1, '2018-11-09', 19, 0, 1),
	(148, 31, 'test 2', 144, 62, 0, 'TABLE', 1, '2018-11-09', 19, 0, 1),
	(149, 31, 'Test 1', 0, 0, 0, 'TABLE', 1, '2018-11-09', 19, 0, 0),
	(150, 31, 'Test 2ffdgf', 0, 0, 0, 'TABLE', 1, '2018-11-09', 19, 0, 0),
	(151, 31, 'Test 3', 7, 57, 0, 'TABLE', 1, '2018-11-09', 19, 0, 1),
	(152, 31, 'Test 4', 378, 47, 0, 'TABLE', 1, '2018-11-09', 19, 0, 1),
	(153, 31, 'Test 5', 254, 60, 0, 'TABLE', 1, '2018-11-09', 19, 0, 1),
	(154, 31, 'Ok 1', 528, 63, 0, 'TABLE', 1, '2018-11-09', 19, 0, 1),
	(155, 38, 'Loy  1', 0, 22, 0, 'TABLE', 2, '2018-11-09', 19, 0, 1),
	(156, 38, 'Loy  2', 109, 24, 0, 'TABLE', 2, '2018-11-09', 19, 0, 1),
	(157, 38, 'Loy  3', 214, 23, 0, 'TABLE', 2, '2018-11-09', 19, 0, 1),
	(158, 31, 'ok  1', 0, 0, 0, 'TABLE', 1, '2018-11-09', 19, 0, 0),
	(159, 31, 'ok  2', 0, 0, 0, 'TABLE', 1, '2018-11-09', 19, 0, 0),
	(160, 31, 'sdfsd 1', 831, 61, 0, 'TABLE', 1, '2018-11-10', 19, 0, 1),
	(161, 58, 'T 1', 35, 51, 0, 'TABLE', 39, '2018-12-26', 19, 0, 1),
	(162, 58, 'T 2', 254, 51, 0, 'TABLE', 39, '2018-12-26', 19, 0, 1),
	(163, 58, 'T 3', 388, 51, 0, 'TABLE', 39, '2018-12-26', 19, 0, 1),
	(164, 58, 'T 4', 518, 51, 0, 'TABLE', 39, '2018-12-26', 19, 0, 1),
	(165, 58, 'T 5', 122, 217, 0, 'TABLE', 39, '2018-12-26', 19, 0, 1),
	(166, 58, 'T 6', 256, 214, 0, 'TABLE', 39, '2018-12-26', 19, 0, 1),
	(167, 58, 'T 7', 383, 214, 0, 'TABLE', 39, '2018-12-26', 19, 0, 1),
	(168, 58, 'T 8', 502, 213, 0, 'TABLE', 39, '2018-12-26', 19, 0, 1),
	(169, 58, 'T 9', 620, 211, 0, 'TABLE', 39, '2018-12-26', 19, 0, 1),
	(170, 58, 'T 10', 750, 213, 0, 'TABLE', 39, '2018-12-26', 19, 0, 1),
	(171, 32, 'VIP 1', 145, 15, 0, 'TABLE', 1, '2018-12-26', 19, 0, 1),
	(172, 32, 'VIP 2', 248, 16, 0, 'TABLE', 1, '2018-12-26', 19, 0, 1),
	(173, 32, 'VIP 3', 354, 13, 0, 'TABLE', 1, '2018-12-26', 19, 0, 1),
	(174, 32, 'VIP 4', 457, 14, 0, 'TABLE', 1, '2018-12-26', 19, 0, 1),
	(175, 32, 'VIP 5', 559, 16, 0, 'TABLE', 1, '2018-12-26', 19, 0, 1),
	(176, 59, 'Nika 1', 251, 31, 0, 'TABLE', 1, '2019-01-14', 19, 0, 0),
	(177, 59, 'Nika 2', 0, 0, 0, 'TABLE', 1, '2019-01-14', 19, 0, 0),
	(178, 61, 'Table 1', 0, 0, 0, 'TABLE', 41, '2019-01-24', 19, 0, 1),
	(179, 61, 'Table 2', 572.969, 120.972, 0, 'TABLE', 41, '2019-01-24', 19, 0, 1),
	(180, 61, 'Table 3', 563.976, 0.989578, 0, 'TABLE', 41, '2019-01-24', 19, 0, 1),
	(181, 61, 'Table 4', 448.976, 258.993, 0, 'TABLE', 41, '2019-01-24', 19, 0, 1),
	(182, 61, 'Table 5', 178.993, 265.99, 0, 'TABLE', 41, '2019-01-24', 19, 0, 1),
	(183, 61, 'Table 6', 428.993, 125.955, 0, 'TABLE', 41, '2019-01-24', 19, 0, 1),
	(184, 61, 'Table 7', 420, 1.99652, 0, 'TABLE', 41, '2019-01-24', 19, 0, 1),
	(185, 61, 'Table 8', 296.979, 127.951, 0, 'TABLE', 41, '2019-01-24', 19, 0, 1),
	(186, 61, 'Table 9', 285.99, 3.97569, 0, 'TABLE', 41, '2019-01-24', 19, 0, 1),
	(187, 61, 'Table 10', 178.993, 265.99, 0, 'TABLE', 41, '2019-01-24', 19, 0, 1),
	(188, 61, 'Table 11', 41.9965, 268.993, 0, 'TABLE', 41, '2019-01-24', 19, 0, 1),
	(189, 61, 'Table 12', 7.98611, 131.997, 0, 'TABLE', 41, '2019-01-24', 19, 0, 1),
	(190, 61, 'Table 13', 153.976, 112.951, 0, 'TABLE', 41, '2019-01-24', 19, 0, 1),
	(191, 61, 'Table 14', 140, 0.989578, 0, 'TABLE', 41, '2019-01-24', 19, 0, 1);
/*!40000 ALTER TABLE `floor_table_layout` ENABLE KEYS */;

-- Dumping structure for table rms_makro_home_stage.floor_template
DROP TABLE IF EXISTS `floor_template`;
CREATE TABLE IF NOT EXISTS `floor_template` (
  `floor_template_id` int(11) NOT NULL AUTO_INCREMENT,
  `floor_template_width` int(11) NOT NULL,
  `floor_template_height` int(11) NOT NULL,
  `floor_template_bg_color` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `floor_template_fore_color` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `floor_template_outline_color` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `floor_template_font_size` int(11) NOT NULL,
  `floor_template_outline_width` int(11) NOT NULL,
  `floor_template_branch_id` int(11) NOT NULL,
  `floor_template_created_by` int(11) NOT NULL,
  `floor_template_created_date` date NOT NULL,
  PRIMARY KEY (`floor_template_id`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- Dumping data for table rms_makro_home_stage.floor_template: ~0 rows (approximately)
DELETE FROM `floor_template`;
/*!40000 ALTER TABLE `floor_template` DISABLE KEYS */;
INSERT INTO `floor_template` (`floor_template_id`, `floor_template_width`, `floor_template_height`, `floor_template_bg_color`, `floor_template_fore_color`, `floor_template_outline_color`, `floor_template_font_size`, `floor_template_outline_width`, `floor_template_branch_id`, `floor_template_created_by`, `floor_template_created_date`) VALUES
	(1, 100, 80, '#800000', '#ffffff', '#ffff00', 24, 2, 1, 19, '2018-11-05');
/*!40000 ALTER TABLE `floor_template` ENABLE KEYS */;

-- Dumping structure for table rms_makro_home_stage.gift
DROP TABLE IF EXISTS `gift`;
CREATE TABLE IF NOT EXISTS `gift` (
  `gift_id` int(11) NOT NULL AUTO_INCREMENT,
  `gift_name` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `gift_point` int(11) DEFAULT '0',
  `gift_image` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `last_modifier` int(11) DEFAULT NULL,
  `last_modified_date` date DEFAULT NULL,
  PRIMARY KEY (`gift_id`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- Dumping data for table rms_makro_home_stage.gift: ~0 rows (approximately)
DELETE FROM `gift`;
/*!40000 ALTER TABLE `gift` DISABLE KEYS */;
INSERT INTO `gift` (`gift_id`, `gift_name`, `gift_point`, `gift_image`, `last_modifier`, `last_modified_date`) VALUES
	(1, 'SD', 0, 'NULL', 19, '2018-10-11');
/*!40000 ALTER TABLE `gift` ENABLE KEYS */;

-- Dumping structure for table rms_makro_home_stage.happy_hour
DROP TABLE IF EXISTS `happy_hour`;
CREATE TABLE IF NOT EXISTS `happy_hour` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `happy_hour_name` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `happy_hour_from_date` date DEFAULT NULL,
  `happy_hour_start_time` time DEFAULT NULL,
  `happy_hour_to_date` date DEFAULT NULL,
  `happy_hour_end_time` time DEFAULT NULL,
  `happy_hour_discount` int(11) DEFAULT NULL,
  `happy_hour_description` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `happy_hour_item_type_id` int(11) DEFAULT NULL,
  `happy_hour_status` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `happy_hour_brand_id` int(11) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- Dumping data for table rms_makro_home_stage.happy_hour: ~2 rows (approximately)
DELETE FROM `happy_hour`;
/*!40000 ALTER TABLE `happy_hour` DISABLE KEYS */;
INSERT INTO `happy_hour` (`id`, `happy_hour_name`, `happy_hour_from_date`, `happy_hour_start_time`, `happy_hour_to_date`, `happy_hour_end_time`, `happy_hour_discount`, `happy_hour_description`, `happy_hour_item_type_id`, `happy_hour_status`, `happy_hour_brand_id`) VALUES
	(1, 'Enterprise Promotion1', '2019-01-08', '08:00:00', '2019-01-31', '19:00:00', 10, '', NULL, NULL, 1),
	(2, 'Brand SR Promotion', '2019-01-08', '08:00:00', '2019-01-31', '20:00:00', 20, '', NULL, NULL, 39);
/*!40000 ALTER TABLE `happy_hour` ENABLE KEYS */;

-- Dumping structure for table rms_makro_home_stage.ingredient
DROP TABLE IF EXISTS `ingredient`;
CREATE TABLE IF NOT EXISTS `ingredient` (
  `ingredient_id` int(11) NOT NULL AUTO_INCREMENT,
  `ingredient_no` int(11) NOT NULL DEFAULT '0',
  `ingredient_item_detail_id` int(11) DEFAULT NULL,
  `ingredient_item_ingredient_id` int(11) DEFAULT NULL,
  `ingredient_measure_id` int(11) DEFAULT NULL,
  `ingredient_qty` int(11) DEFAULT NULL,
  `ingredient_desc` text,
  `ingredient_created_date` date DEFAULT NULL,
  `ingredient_created_by` int(11) DEFAULT NULL,
  `ingredient_modified_by` int(11) DEFAULT NULL,
  `ingredient_modified_date` date DEFAULT NULL,
  `ingredient_status` varchar(50) DEFAULT NULL,
  PRIMARY KEY (`ingredient_id`)
) ENGINE=InnoDB AUTO_INCREMENT=7 DEFAULT CHARSET=latin1;

-- Dumping data for table rms_makro_home_stage.ingredient: ~6 rows (approximately)
DELETE FROM `ingredient`;
/*!40000 ALTER TABLE `ingredient` DISABLE KEYS */;
INSERT INTO `ingredient` (`ingredient_id`, `ingredient_no`, `ingredient_item_detail_id`, `ingredient_item_ingredient_id`, `ingredient_measure_id`, `ingredient_qty`, `ingredient_desc`, `ingredient_created_date`, `ingredient_created_by`, `ingredient_modified_by`, `ingredient_modified_date`, `ingredient_status`) VALUES
	(1, 1, 8, 14, NULL, 50, NULL, '2019-01-09', 19, 19, '2019-01-11', NULL),
	(2, 0, 8, 15, NULL, 50, NULL, '2019-01-09', 19, 19, '2019-01-09', NULL),
	(3, 1, 16, 14, NULL, 100, NULL, '2019-01-14', 19, NULL, NULL, NULL),
	(4, 1, 16, 15, NULL, 100, NULL, '2019-01-14', 19, NULL, NULL, NULL),
	(5, 1, 5, 3, NULL, 200, NULL, '2019-01-23', 19, NULL, NULL, NULL),
	(6, 1, 5, 4, NULL, 100, NULL, '2019-01-23', 19, NULL, NULL, NULL);
/*!40000 ALTER TABLE `ingredient` ENABLE KEYS */;

-- Dumping structure for table rms_makro_home_stage.item_detail
DROP TABLE IF EXISTS `item_detail`;
CREATE TABLE IF NOT EXISTS `item_detail` (
  `item_detail_id` int(11) NOT NULL AUTO_INCREMENT,
  `item_type_id` int(11) DEFAULT NULL,
  `item_detail_name` text CHARACTER SET utf8 COLLATE utf8_unicode_ci,
  `item_detail_part_number` varchar(255) CHARACTER SET utf8 COLLATE utf8_unicode_ci DEFAULT NULL,
  `item_detail_des` varchar(255) DEFAULT NULL,
  `item_detail_created_date` date DEFAULT NULL,
  `item_detail_created_by` int(11) DEFAULT NULL,
  `item_detail_modified_by` int(11) DEFAULT NULL,
  `item_detail_modified_date` date DEFAULT NULL,
  `item_detail_whole_price` decimal(10,2) DEFAULT NULL,
  `item_detail_retail_price` decimal(10,2) DEFAULT NULL,
  `item_detail_photo` varchar(255) DEFAULT NULL,
  `item_detail_cut_stock` tinyint(4) DEFAULT NULL,
  `item_detail_remain_alert` int(11) DEFAULT NULL,
  `item_detail_printer_location_id` int(11) DEFAULT '0',
  `item_detail_like_count` int(11) DEFAULT '0',
  `measure_id` int(11) DEFAULT '0',
  `color` varchar(255) CHARACTER SET utf8 COLLATE utf8_unicode_ci DEFAULT NULL,
  `item_detail_status` tinyint(1) DEFAULT '1',
  PRIMARY KEY (`item_detail_id`)
) ENGINE=InnoDB AUTO_INCREMENT=69 DEFAULT CHARSET=latin1 COMMENT='1="Active"  or  -1="Delete"';

-- Dumping data for table rms_makro_home_stage.item_detail: ~49 rows (approximately)
DELETE FROM `item_detail`;
/*!40000 ALTER TABLE `item_detail` DISABLE KEYS */;
INSERT INTO `item_detail` (`item_detail_id`, `item_type_id`, `item_detail_name`, `item_detail_part_number`, `item_detail_des`, `item_detail_created_date`, `item_detail_created_by`, `item_detail_modified_by`, `item_detail_modified_date`, `item_detail_whole_price`, `item_detail_retail_price`, `item_detail_photo`, `item_detail_cut_stock`, `item_detail_remain_alert`, `item_detail_printer_location_id`, `item_detail_like_count`, `measure_id`, `color`, `item_detail_status`) VALUES
	(19, 12, 'សាច់ជ្រូកអាំង', '234', '', '2019-01-23', 19, 19, '2019-01-25', 0.00, 6.00, '154837252320190124_2328431.jpg', 0, 0, 3, 0, NULL, '#000000', 1),
	(21, 12, 'សាច់ជ្រូកអាំងប៊េនហ្គល', '#02', '', '2019-01-24', 19, 19, '2019-01-25', 0.00, 7.00, '154831360520190124_070645bengal.jpg', 0, 0, 3, 0, NULL, '#000000', 1),
	(22, 12, 'សាច់ជ្រូកអាំងជាមួយឈីស', '#03', '', '2019-01-24', 19, 19, '2019-01-25', 0.00, 7.50, '154837257220190124_2329322.jpg', 0, 0, 3, 0, NULL, '#000000', 1),
	(23, 12, 'សាច់ជ្រូកអាំង Pork Chop', '#04', '', '2019-01-24', 19, 19, '2019-01-25', 0.00, 9.00, '154837258320190124_2329433.jpg', 0, 0, 3, 0, NULL, '#000000', 1),
	(24, 12, 'សាច់ជ្រូកអាំងប៊េនហ្គលនៅលើចានក្តៅ', '#05', '', '2019-01-24', 19, 19, '2019-01-25', 0.00, 8.00, '154831362720190124_070707bengalporkon.jpg', 0, 0, 3, 0, NULL, '#000000', 1),
	(25, 13, 'សាច់គោអាំង Striploin', '#06', '', '2019-01-24', 19, 19, '2019-01-25', 0.00, 17.00, '154831383320190124_0710332.jpg', 0, 0, 3, 0, NULL, '#000000', 1),
	(26, 13, 'សាច់គោអាំង​Rib eye ', '#07', '', '2019-01-24', 19, 19, '2019-01-25', 0.00, 17.00, '154831384320190124_0710433.jpg', 0, 0, 3, 0, NULL, '#000000', 1),
	(27, 15, 'Spicy chicken steak', '#08', '', '2019-01-24', 19, 19, '2019-01-24', 0.00, 5.00, '154831385820190124_0710581.jpg', 0, 0, 3, 0, NULL, '#000000', 1),
	(28, 15, 'Teriyaki Chicken steak ', '#9', '', '2019-01-24', 19, 19, '2019-01-24', 0.00, 5.00, '154831386420190124_0711042.jpg', 0, 0, 3, 0, NULL, '#000000', 1),
	(29, 16, 'Vegetable Salad', '#10', '', '2019-01-24', 19, 19, '2019-01-24', 0.00, 4.00, '154831388020190124_0711201.jpg', 0, 0, 3, 0, NULL, '#000000', 1),
	(30, 16, 'Sausage Salad', '#11', '', '2019-01-24', 19, 19, '2019-01-24', 0.00, 5.00, '154831388520190124_0711252.jpg', 0, 0, 3, 0, NULL, '#000000', 1),
	(31, 16, 'Chicken salad', '#12', '', '2019-01-24', 19, 19, '2019-01-24', 0.00, 6.00, '154837261520190124_2330154.jpg', 0, 0, 3, 0, NULL, '#000000', 1),
	(32, 14, 'ឈុតសាច់ក្រកសាច់ជ្រូក', '#13', '', '2019-01-24', 19, 19, '2019-01-25', 0.00, 6.00, '154837260220190124_2330025.jpg', 0, 0, 3, 0, NULL, '#000000', 1),
	(33, 17, 'Crispy dory fish steak', '#14', '', '2019-01-24', 19, 19, '2019-01-24', 0.00, 6.00, '154831400120190124_0713211.jpg', 0, 0, 3, 0, NULL, '#000000', 1),
	(34, 17, 'Salmon Steak', '#15', '', '2019-01-24', 19, 19, '2019-01-24', 0.00, 8.50, '154831400720190124_0713272.jpg', 0, 0, 3, 0, NULL, '#000000', 1),
	(35, 18, 'Spaghetti Carbonara', '#16', '', '2019-01-24', 19, 19, '2019-01-24', 0.00, 5.00, '154831402220190124_0713421.jpg', 0, 0, 3, 0, NULL, '#000000', 1),
	(36, 18, 'Spaghetti with pork sauce', '#17', '', '2019-01-24', 19, 19, '2019-01-24', 0.00, 5.00, '154831402820190124_0713482.jpg', 0, 0, 3, 0, NULL, '#000000', 1),
	(37, 19, 'Bacon pineapple pizza ', '#18', '', '2019-01-24', 19, 19, '2019-01-24', 0.00, 9.00, '154831404520190124_0714051.jpg', 0, 0, 3, 0, NULL, '#000000', 1),
	(38, 19, 'Sausage and crab stick pizza', '#19', '', '2019-01-24', 19, 19, '2019-01-24', 0.00, 9.00, '154831405220190124_0714122.jpg', 0, 0, 3, 0, NULL, '#000000', 1),
	(39, 20, 'Garlic bread', '#20', '', '2019-01-24', 19, 19, '2019-01-24', 0.00, 2.00, '154831407820190124_0714381.jpg', 0, 0, 3, 0, NULL, '#000000', 1),
	(40, 20, 'Mash potato ', '#21', '', '2019-01-24', 19, 19, '2019-01-24', 0.00, 3.00, '154831408520190124_0714452.jpg', 0, 0, 3, 0, NULL, '#000000', 1),
	(41, 20, 'Mash potato with cheese', '#22', '', '2019-01-24', 19, 19, '2019-01-24', 0.00, 4.00, '154831409020190124_0714503.jpg', 0, 0, 3, 0, NULL, '#000000', 1),
	(42, 20, 'French fries', '#23', '', '2019-01-24', 19, 19, '2019-01-24', 0.00, 3.00, '154831410920190124_0715094.jpg', 0, 0, 3, 0, NULL, '#000000', 1),
	(43, 20, 'New orleans chicken', '#24', '', '2019-01-24', 19, 19, '2019-01-24', 0.00, 4.00, '154831411520190124_0715155.jpg', 0, 0, 3, 0, NULL, '#000000', 1),
	(44, 20, 'Spinach with cheese', '#25', '', '2019-01-24', 19, 19, '2019-01-24', 0.00, 4.50, '154831412520190124_0715256.jpg', 0, 0, 3, 0, NULL, '#000000', 1),
	(45, 21, 'Pork+Spicy chicken steak', '#26', '', '2019-01-24', 19, 19, '2019-01-24', 0.00, 10.50, '154831414220190124_0715421.jpg', 0, 0, 3, 0, NULL, '#000000', 1),
	(46, 21, 'Pork+Teriyaki chicken steak', '#27', '', '2019-01-24', 19, 19, '2019-01-24', 0.00, 10.50, '154831414820190124_0715482.jpg', 0, 0, 3, 0, NULL, '#000000', 1),
	(47, 21, 'Pork+Crispy dory steak', '#28', '', '2019-01-24', 19, 19, '2019-01-24', 0.00, 11.50, '154831415320190124_0715533.jpg', 0, 0, 3, 0, NULL, '#000000', 1),
	(48, 21, 'Pork+ Sausage pork ', '#29', '', '2019-01-24', 19, 19, '2019-01-24', 0.00, 8.50, '154831415820190124_0715584.jpg', 0, 0, 3, 0, NULL, '#000000', 1),
	(49, 21, 'Bengal pork+Sausage pork ', '#30', '', '2019-01-24', 19, 19, '2019-01-24', 0.00, 9.50, '154831416520190124_0716055.jpg', 0, 0, 3, 0, NULL, '#000000', 1),
	(50, 21, 'Spicy chicken +crispy dory fish', '#31', '', '2019-01-24', 19, 19, '2019-01-24', 0.00, 10.50, '154831417520190124_0716156.jpg', 0, 0, 3, 0, NULL, '#000000', 1),
	(51, 21, 'Teriyaki Chicken+crispy dory fish', '#32', '', '2019-01-24', 19, 19, '2019-01-24', 0.00, 10.50, '154831418320190124_0716237.jpg', 0, 0, 3, 0, NULL, '#000000', 1),
	(52, 21, 'spicy chicken+sausage pork', '#33', '', '2019-01-24', 19, 19, '2019-01-24', 0.00, 7.50, '154831419320190124_0716338.jpg', 0, 0, 3, 0, NULL, '#000000', 1),
	(53, 21, 'Teriyaki Chicken+sausage pork', '#34', '', '2019-01-24', 19, 19, '2019-01-24', 0.00, 7.50, '154831420120190124_0716419.jpg', 0, 0, 3, 0, NULL, '#000000', 1),
	(54, 21, 'Crispy dory fish +sausage pork', '#35', '', '2019-01-24', 19, 19, '2019-01-24', 0.00, 8.50, '154831421120190124_07165110.jpg', 0, 0, 3, 0, NULL, '#000000', 1),
	(55, 23, 'មីស៊ុបសាច់ជ្រូក', '#36', '', '2019-01-24', 19, 19, '2019-01-25', 0.00, 2.50, '154831425620190124_0717361.jpg', 0, 0, 3, 0, NULL, '#000000', 1),
	(56, 23, 'Beef thicken soup noodles pork(Jumbo)', '#37', '', '2019-01-24', 19, 19, '2019-01-25', 0.00, 3.00, '154837274120190124_233221154833045720190124_1147371.jpg', 0, 0, 3, 0, NULL, '#000000', 1),
	(57, 23, 'Beef thicken soup noodle beef(regular)', '#38', '', '2019-01-24', 19, 19, '2019-01-25', 0.00, 2.50, '154831440620190124_0720064.jpg', 0, 0, 3, 0, NULL, '#000000', 1),
	(58, 23, 'Beef thicken soup noodle beef(Jumbo)', '#39', '', '2019-01-24', 19, 19, '2019-01-25', 0.00, 3.00, '154837280320190124_233323154833048920190124_1148094.jpg', 0, 0, 3, 0, NULL, '#000000', 1),
	(59, 23, 'Pork meatballs soup (Reguar)', '#40', '', '2019-01-24', 19, 19, '2019-01-24', 0.00, 3.00, '154831435420190124_0719143.jpg', 0, 0, 3, 0, NULL, '#000000', 1),
	(60, 23, 'Pork meatballs soup (Jumbo)', '#41', '', '2019-01-24', 19, 19, '2019-01-24', 0.00, 3.50, '154831439620190124_0719563.jpg', 0, 0, 3, 0, NULL, '#000000', 1),
	(61, 23, 'Beef meatballs soup (Regular)', '#42', '', '2019-01-24', 19, 19, '2019-01-24', 0.00, 3.00, '154837282120190124_233341154831445720190124_0720576.jpg', 0, 0, 3, 0, NULL, '#000000', 1),
	(62, 23, 'Beef meatballs soup (jumbo)', '#43', '', '2019-01-24', 19, 19, '2019-01-24', 0.00, 3.50, '154837283420190124_233354154837282120190124_233341154831445720190124_0720576.jpg', 0, 0, 3, 0, NULL, '#000000', 1),
	(63, 23, 'Boiled pork ball ', '#44', '', '2019-01-24', 19, 19, '2019-01-24', 0.00, 2.00, '154831444720190124_0720475.jpg', 0, 0, 3, 0, NULL, '#000000', 1),
	(64, 23, 'Boiled beef ball', '#45', '', '2019-01-24', 19, 19, '2019-01-24', 0.00, 2.00, '154831445720190124_0720576.jpg', 0, 0, 3, 0, NULL, '#000000', 1),
	(65, 23, 'Rice', '#46', '', '2019-01-24', 19, 19, '2019-01-24', 0.00, 0.50, '154831446620190124_0721067.jpg', 0, 0, 3, 0, NULL, '#000000', 1),
	(66, 25, 'Water', '#90', '', '2019-01-24', 19, 19, '2019-01-25', 0.00, 0.50, '154831454620190124_07222621.jpg', 0, 0, 3, 0, NULL, '#000000', 1),
	(67, 25, 'Soft Drink', '#91', '', '2019-01-24', 19, 19, '2019-01-25', 0.00, 0.70, '154831455420190124_07223420.jpg', 0, 0, 3, 0, NULL, '#000000', 1),
	(68, 25, 'Herbal Drink', '#92', '', '2019-01-24', 19, 19, '2019-01-24', 0.00, 1.00, '154831456220190124_07224222.jpg', 0, 0, 3, 0, NULL, '#000000', 1);
/*!40000 ALTER TABLE `item_detail` ENABLE KEYS */;

-- Dumping structure for table rms_makro_home_stage.item_note
DROP TABLE IF EXISTS `item_note`;
CREATE TABLE IF NOT EXISTS `item_note` (
  `item_note_id` int(11) NOT NULL AUTO_INCREMENT,
  `item_note_name` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `item_note_price` decimal(10,2) DEFAULT NULL,
  `item_note_des` text COLLATE utf8_unicode_ci,
  `item_note_branch_id` int(11) DEFAULT NULL,
  `item_note_created_date` date DEFAULT NULL,
  `item_note_created_by` int(11) DEFAULT NULL,
  `item_note_modified_by` int(11) DEFAULT NULL,
  `item_note_modified_date` date DEFAULT NULL,
  `item_note_status` tinyint(1) DEFAULT '1',
  PRIMARY KEY (`item_note_id`)
) ENGINE=InnoDB AUTO_INCREMENT=17 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci COMMENT='Status=1=> ''ACTIVE'' , Status=0 =>''DELETE''';

-- Dumping data for table rms_makro_home_stage.item_note: ~16 rows (approximately)
DELETE FROM `item_note`;
/*!40000 ALTER TABLE `item_note` DISABLE KEYS */;
INSERT INTO `item_note` (`item_note_id`, `item_note_name`, `item_note_price`, `item_note_des`, `item_note_branch_id`, `item_note_created_date`, `item_note_created_by`, `item_note_modified_by`, `item_note_modified_date`, `item_note_status`) VALUES
	(1, 'Sugar 50%', 0.00, '', 1, '2018-12-26', 19, 37, '2019-01-24', 0),
	(2, 'Sugar 80%', 0.02, '', 1, '2018-12-26', 19, 19, '2018-12-28', 0),
	(3, 'Sugar 50%', 0.00, '', 1, '2018-12-28', 19, 19, '2018-12-28', 0),
	(4, 'Sugar 80%', 0.02, '', 1, '2018-12-28', 19, 19, '2018-12-28', 0),
	(5, 'Sugar 80%', 0.02, '', 1, '2018-12-28', 19, 37, '2019-01-24', 0),
	(6, 'no sugar', 0.00, '', 1, '2019-01-23', 19, 37, '2019-01-24', 0),
	(7, 'no ice', 0.00, '', 1, '2019-01-23', 19, 37, '2019-01-24', 0),
	(8, 'Gravy Brown Sauce', 0.00, '', 41, '2019-01-24', 37, NULL, NULL, 1),
	(9, 'Black Pepper Gravy', 0.00, '', 41, '2019-01-24', 37, NULL, NULL, 1),
	(10, 'Rice stick noodles', 0.00, '', 41, '2019-01-24', 19, NULL, NULL, 1),
	(11, 'Egg noodles', 0.00, '', 41, '2019-01-24', 19, NULL, NULL, 1),
	(12, 'Big flat noodles', 0.00, '', 41, '2019-01-24', 19, NULL, NULL, 1),
	(13, 'Glass noodles', 0.00, '', 41, '2019-01-24', 19, NULL, NULL, 1),
	(14, 'Rice vermicelli', 0.00, '', 41, '2019-01-24', 19, NULL, NULL, 1),
	(15, 'Instant noodles', 0.00, '', 41, '2019-01-24', 19, NULL, NULL, 1),
	(16, 'beef', 0.00, '', 41, '2019-01-25', 38, NULL, NULL, 1);
/*!40000 ALTER TABLE `item_note` ENABLE KEYS */;

-- Dumping structure for table rms_makro_home_stage.item_type
DROP TABLE IF EXISTS `item_type`;
CREATE TABLE IF NOT EXISTS `item_type` (
  `item_type_id` int(11) NOT NULL AUTO_INCREMENT,
  `item_type_name` varchar(255) CHARACTER SET utf8 COLLATE utf8_unicode_ci DEFAULT NULL,
  `category_id` int(11) DEFAULT NULL,
  `item_type_des` varchar(255) DEFAULT NULL,
  `item_type_is_ingredient` tinyint(4) DEFAULT '0',
  `item_type_is_car_wash` tinyint(4) DEFAULT '0',
  `item_type_created_date` date DEFAULT NULL,
  `item_type_created_by` int(11) DEFAULT NULL,
  `item_type_modified_by` int(11) DEFAULT NULL,
  `item_type_modified_date` date DEFAULT NULL,
  `item_type_is_point` tinyint(4) DEFAULT NULL,
  `item_type_photo` varchar(255) DEFAULT NULL,
  PRIMARY KEY (`item_type_id`)
) ENGINE=InnoDB AUTO_INCREMENT=26 DEFAULT CHARSET=latin1;

-- Dumping data for table rms_makro_home_stage.item_type: ~12 rows (approximately)
DELETE FROM `item_type`;
/*!40000 ALTER TABLE `item_type` DISABLE KEYS */;
INSERT INTO `item_type` (`item_type_id`, `item_type_name`, `category_id`, `item_type_des`, `item_type_is_ingredient`, `item_type_is_car_wash`, `item_type_created_date`, `item_type_created_by`, `item_type_modified_by`, `item_type_modified_date`, `item_type_is_point`, `item_type_photo`) VALUES
	(12, 'សាច់ជ្រូកអាំង', 6, '', 0, NULL, '2019-01-24', 19, 19, '2019-01-25', NULL, '1548372501.jpg'),
	(13, 'សាច់គោអាំង', 6, '', 0, NULL, '2019-01-24', 19, 19, '2019-01-25', NULL, '1548312919.jpg'),
	(14, 'សាច់ក្រក', 6, '', 0, NULL, '2019-01-24', 19, 19, '2019-01-25', NULL, '1548372630.jpg'),
	(15, 'សាច់មាន់អាំង', 6, '', 0, NULL, '2019-01-24', 19, 19, '2019-01-25', NULL, '1548313434.jpg'),
	(16, 'សាទ្បាត់', 6, '', 0, NULL, '2019-01-24', 19, 19, '2019-01-25', NULL, '1548313449.jpg'),
	(17, 'សាច់ត្រីអាំង', 6, '', 0, NULL, '2019-01-24', 19, 19, '2019-01-25', NULL, '1548313465.jpg'),
	(18, 'មីអ៊ីតាលី', 2, '', 0, NULL, '2019-01-24', 19, 19, '2019-01-25', NULL, '1548313474.jpg'),
	(19, 'ភីហ្សា', 6, '', 0, NULL, '2019-01-24', 19, 19, '2019-01-25', NULL, '1548313490.jpg'),
	(20, 'របស់ហូបលេង', 6, '', 0, NULL, '2019-01-24', 19, 19, '2019-01-25', NULL, '1548313500.jpg'),
	(21, 'ឈុត', 6, '', 0, NULL, '2019-01-24', 19, 19, '2019-01-25', NULL, '1548313510.jpg'),
	(23, 'មីស៊ុប', 6, '', 0, NULL, '2019-01-24', 19, 19, '2019-01-25', NULL, '1548313540.jpg'),
	(25, 'ភេសជ្ជះ', 6, '', 0, NULL, '2019-01-24', 19, 19, '2019-01-25', NULL, '1548313558.jpg');
/*!40000 ALTER TABLE `item_type` ENABLE KEYS */;

-- Dumping structure for table rms_makro_home_stage.measure
DROP TABLE IF EXISTS `measure`;
CREATE TABLE IF NOT EXISTS `measure` (
  `measure_id` int(11) NOT NULL AUTO_INCREMENT,
  `measure_name` varchar(50) COLLATE utf8_unicode_ci DEFAULT NULL,
  `measure_qty` int(11) DEFAULT NULL,
  `measure_note` text COLLATE utf8_unicode_ci NOT NULL,
  `measure_created_by` int(11) NOT NULL,
  `measure_created_date` date NOT NULL,
  `measure_modifed_date` date NOT NULL,
  `measure_modified_by` int(11) NOT NULL,
  `status` tinyint(1) NOT NULL DEFAULT '1' COMMENT '1=active,0=deleted',
  PRIMARY KEY (`measure_id`)
) ENGINE=InnoDB AUTO_INCREMENT=8 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- Dumping data for table rms_makro_home_stage.measure: ~7 rows (approximately)
DELETE FROM `measure`;
/*!40000 ALTER TABLE `measure` DISABLE KEYS */;
INSERT INTO `measure` (`measure_id`, `measure_name`, `measure_qty`, `measure_note`, `measure_created_by`, `measure_created_date`, `measure_modifed_date`, `measure_modified_by`, `status`) VALUES
	(1, 'Unit', 1, '', 19, '2018-07-02', '0000-00-00', 0, 1),
	(2, 'Case x 24', 24, 'This is update', 19, '2018-10-11', '0000-00-00', 0, 1),
	(3, 'test', 1, '', 19, '2018-11-13', '0000-00-00', 0, 0),
	(4, '1 L', 1000, '1L = 1000ml', 19, '2018-12-26', '0000-00-00', 0, 1),
	(5, '6 pcs', 6, '', 19, '2018-12-28', '0000-00-00', 0, 1),
	(6, '1kg=1000g', 1000, '', 19, '2019-01-09', '0000-00-00', 0, 1),
	(7, 'pack*6', 6, '', 19, '2019-01-23', '0000-00-00', 0, 1);
/*!40000 ALTER TABLE `measure` ENABLE KEYS */;

-- Dumping structure for table rms_makro_home_stage.page
DROP TABLE IF EXISTS `page`;
CREATE TABLE IF NOT EXISTS `page` (
  `page_id` int(11) NOT NULL AUTO_INCREMENT,
  `page_name` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `page_id_parent` int(11) NOT NULL DEFAULT '0',
  `page_ordering` int(11) NOT NULL DEFAULT '0',
  `page_img` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `page_url` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `page_clazz` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `page_controller` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `page_active` tinyint(1) NOT NULL DEFAULT '1',
  `page_name_kh` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  PRIMARY KEY (`page_id`)
) ENGINE=InnoDB AUTO_INCREMENT=173 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- Dumping data for table rms_makro_home_stage.page: ~93 rows (approximately)
DELETE FROM `page`;
/*!40000 ALTER TABLE `page` DISABLE KEYS */;
INSERT INTO `page` (`page_id`, `page_name`, `page_id_parent`, `page_ordering`, `page_img`, `page_url`, `page_clazz`, `page_controller`, `page_active`, `page_name_kh`) VALUES
	(9, 'Management', 1, 0, '', '', 'icon_bag', '', 1, 'ការគ្រប់គ្រង'),
	(11, 'Company Profile', 1, 1, '', 'company_profile', '', '', 1, 'ពត៍មានក្រុមហ៊ុន'),
	(12, 'Company Profile', 1, 2, '', 'company_profile_', '', '', 0, 'ពត៍មានក្រុមហ៊ុន'),
	(13, 'Vat', 1, 3, '', 'vat', '', '', 1, 'ពន្ធអាករណ៏តម្លៃបន្ថែម'),
	(14, 'Exchange Rate', 1, 4, '', 'rate', '', '', 1, 'អត្រាប្តូរប្រាក់'),
	(15, 'Measure', 1, 5, '', 'measure', '', '', 1, 'ខ្នាត'),
	(18, 'Product', 4, 0, '', '', 'icon_gift', '', 1, 'ផលិតផល'),
	(19, 'Item Type', 4, 2, '', 'item_type', '', '', 1, 'ប្រភេទទំនិញ'),
	(20, 'Item Detail', 4, 4, '', 'item_detail', '', '', 1, 'ទំនិញលម្អិត'),
	(22, 'Purchase', 5, 0, '', '', 'icon_cart', '', 1, 'កាទិញចូល'),
	(23, 'Supplier', 5, 1, '', 'supplier', '', '', 1, 'អ្នកផ្គត់ផ្គង់'),
	(24, 'Purchase Detail', 5, 3, '', 'report_purchase_detail', '', '', 1, 'ទិញចូល'),
	(25, 'Purchase Summary', 5, 2, '', 'purchase', '', '', 1, 'កាទិញលម្អិត'),
	(28, 'Inventory', 6, 0, '', '', 'icon_drive', '', 1, 'ឃ្លាំង'),
	(30, 'Stock Increase', 6, 3, '', 'stock/adjust_list', '', '', 1, 'កែតំរូវឃ្លាំង'),
	(31, 'Stock Waste / Loss', 6, 4, '', 'stock/waste_list', '', '', 1, 'ទំនិញខូច'),
	(32, 'Stock In Hand', 6, 2, '', 'report_stock', '', '', 1, 'ពិនិត្យទំនិញក្នុងឃ្លាំង'),
	(34, 'Sale', 7, 0, '', '', 'icon_cart_alt', '', 1, 'កាលក់'),
	(35, 'Employee', 2, 0, '', '', 'icon_contacts_alt', '', 1, 'បុគ្គលិក'),
	(39, 'Expense', 8, 0, '', '', 'icon_target', '', 1, 'ចំនាយ'),
	(40, 'Account Type', 8, 1, '', 'expense_type', '', '', 1, 'ប្រភេទនៃកាចំនាយ'),
	(41, 'Expense Summary', 8, 3, '', 'expense', '', '', 1, 'ការចំណាយ'),
	(43, 'Shift Time', 2, 1, '', 'shift', '', '', 1, 'វេន'),
	(44, 'Position', 2, 2, '', 'group_position', '', '', 1, 'តួនាទី'),
	(45, 'Employee Register', 2, 3, '', 'employee', '', '', 1, 'កាចុះឈ្មោះបុគ្គលិក'),
	(46, 'User', 2, 4, '', 'user', '', '', 1, 'អ្នកប្រើប្រាស់'),
	(48, 'Contact', 3, 0, '', '', 'icon_contacts', '', 1, 'អតិថិជន'),
	(49, 'Customer Type', 3, 1, '', 'customer_type', '', '', 1, 'ប្រភេទអតិថិជន'),
	(50, 'Customer Register', 3, 2, '', 'customer', '', '', 1, 'កាចុះឈ្មោះអតិថិជន'),
	(52, 'Report', 9, 0, '', '', 'icon_calendar', '', 1, 'របាយការណ៏'),
	(55, 'Profit and Loss', 9, 1, '', 'report_profitandlost', '', '', 1, 'ចំនូលចំនាយ'),
	(56, 'Permission', 1, 6, '', 'permission', '', '', 1, 'ការផ្តល់សិទ្ធិ'),
	(67, 'Sale Summary', 7, 1, '', 'report_sale_summary', '', '', 1, 'លក់សង្ខេប'),
	(68, 'Stock Transffer', 6, 5, '', 'stock_transffer', '', '', 1, 'ផ្ទេទិញ'),
	(69, 'Sale Detail', 7, 2, '', 'report_sale_detail', '', '', 1, 'លក់លម្អិត'),
	(71, 'Sale By Table', 7, 3, '', 'report_sale_summary_by_table', '', '', 1, 'សង្ខេបតាមតុ'),
	(72, 'Sale By Category', 7, 4, '', 'report_sale_by_category', '', '', 1, 'លក់តាមប្រភេទទំនិញ'),
	(73, 'Floor Table Layout', 1, 7, '', 'floor_layout', '', '', 1, 'ប្លង់តុ'),
	(75, 'Setup Point', 1, 8, '', 'point', '', '', 0, 'កំណត់ពិន្ទុ'),
	(79, 'Item Note', 4, 5, '', 'item_note', '', '', 1, 'កត់ចំណាំទំនិញ'),
	(81, 'Sale By Cashier', 7, 5, '', 'report_sale_summary_by_cashier', '', '', 1, 'លក់តាមអ្នកគិតលុយ'),
	(83, 'Printer Location', 1, 9, '', 'printer_location', '', '', 1, 'ទីតាំងម៉ាសីុនព្រីន'),
	(84, 'Void Item List', 7, 6, '', 'report_void_item', '', '', 1, 'បោះបង់ចោល'),
	(88, 'Cashier', 10, 0, '', '0', '', '', 1, 'អ្នកលក់'),
	(89, 'Cash In/Out', 10, 2, '', '0', '', '', 1, 'ដាក់/ដកប្រាក់'),
	(90, 'Sale Data', 10, 5, '', '0', '', '', 1, 'ទិន្នន័យលក់'),
	(91, 'Extra Item', 10, 6, '', '0', '', '', 1, 'មុខទំនិញបន្ថែម'),
	(95, 'Sale Order', 11, 0, '', '0', '', '', 1, 'ការបញ្ជាលក់'),
	(96, 'Delete Item', 11, 2, '', '0', '', '', 1, 'លុបទំនិញ'),
	(97, 'Discount', 11, 1, '', '0', '', '', 1, 'បញ្ចុះតំលៃ'),
	(99, 'Move Table', 11, 4, '', '0', '', '', 1, 'ប្ដូរទីតាំងតុ'),
	(100, 'Split Table', 11, 5, '', '0', '', '', 1, 'ដកតុ'),
	(101, 'Merge Table', 11, 6, '', '0', '', '', 1, 'បញ្ជូលតុ'),
	(102, 'Split Invoice', 11, 7, '', '0', '', '', 1, 'ដកវិក័យបត្រ'),
	(103, 'Order', 11, 8, '', '0', '', '', 1, 'ព្រីនទៅចង្រ្គាន'),
	(104, 'Pay', 11, 9, '', '0', '', '', 1, 'បង់ប្រាក់សុទ្ធ'),
	(105, 'Table Start', 10, 7, '', '0', '', '', 1, 'តុរវល់'),
	(110, 'Pay By Membership', 11, 10, '', '0', '', '', 1, 'បង់ប្រាក់តាមកាត'),
	(111, 'Pay Print Receipt', 11, 12, '', '0', '', '', 1, 'បង់ប្រាក់ហើយព្រីន'),
	(113, 'Item Note', 11, 14, '', '0', '', '', 1, 'ទំនិញកត់ចំណាំ'),
	(115, 'Void Invoice', 11, 15, '', '0', '', '', 1, 'បោះបង់វិក័យបត្រ'),
	(117, 'Delete after Print Bill', 11, 16, '', '0', '', '', 1, 'លុបបន្ទាប់ពីព្រីន'),
	(126, 'Delete After Order', 11, 11, '', '0', '', '', 1, 'លុបបន្ទាប់ពីព្រីនទៅចង្រ្គាន'),
	(130, 'Chart Of Account', 8, 2, '', 'expense_detail', '', '', 1, 'មុខទំនិញចំណាយ'),
	(131, 'Ingredient Recipes', 4, 6, '', 'ingredient', '', '', 0, 'គ្រឿងផ្សំ'),
	(138, 'Stock In Hand Summary', 6, 1, '', 'report_stock_sum', '', '', 1, NULL),
	(139, 'Happy Hour', 1, 10, '', 'happy_hour', '', '', 1, 'បង្កើត Promotion'),
	(140, 'A/P', 5, 4, '', 'report_supplier_debt', '', '', 1, 'សង់លុយទៅអ្នកផ្គត់ផ្គង់'),
	(141, 'Supplier On Credit', 5, 5, '', 'report_purchase_dept', '', '', 1, 'ជំពាក់អ្នកផ្គត់ផ្គង់'),
	(142, 'Stock in/out', 6, 6, '', 'report_stock_in_out', '', '', 0, 'ចំនួនទំនិញចេញចូល'),
	(144, 'Expense', 8, 4, '', 'report_expense', '', '', 1, 'ចំណាយលំអិត'),
	(146, 'Monthly Expense', 8, 5, '', 'report_monthly_expense', '', '', 1, 'របាយការណ៍ចំណាយ'),
	(148, 'Sale By Member Card', 7, 7, '', 'report_sale_summary_detail', '', '', 1, 'លក់តាមកាត'),
	(149, 'Sale Costing & Margin', 7, 8, '', 'report_sale_summary_margin', '', '', 1, 'ថ្លៃដើម និង ចំណេញ'),
	(150, 'Main Category', 4, 1, '', 'category', '', '', 1, 'ផ្នែកធំៗនៃទំនិញ'),
	(151, 'Sale By Shift', 7, 9, '', 'report_close_shift', '', '', 1, 'លក់តាមវេន'),
	(152, 'Card Topup', 3, 4, '', 'card_topup', '', '', 1, 'ការបញ្ចូលលុយក្នុងកាត'),
	(153, 'Card Expense', 3, 5, '', 'card_expense', '', '', 1, 'ការចំណាយតាមកាត'),
	(154, 'Card Need Topup', 3, 7, '', 'card_need', '', '', 1, 'កាតត្រូវបញ្ចូលលុយ'),
	(155, 'Void Sale Data', 10, 8, '', '0', '', '', 1, 'លុបទិន្នន័យលក់'),
	(157, 'Print Sale Data', 10, 9, '', '0', '', '', 1, 'print ទិន្នន័យ'),
	(160, 'Card Balance', 3, 3, '', 'card_balance', '', '', 1, 'លុយក្នុងកាត់'),
	(162, 'Stock  Location', 1, 11, '', 'stock_location', '', '', 1, 'ឃ្លាំងទំនិញ'),
	(163, 'Card Transaction', 3, 6, '', 'card_transaction', '', '', 1, 'ប្រតិបត្តិការលក់នៃកាត'),
	(164, 'Gift', 1, 12, '', 'gift', '', '', 0, 'ការប្តូរយករង្វាន់'),
	(165, 'Item Main', 4, 3, '', 'item_main', '', '', 0, 'ទំនិញ'),
	(166, 'Card Return', 3, 8, '', 'card_return', '', '', 1, 'ដកលុយកាត'),
	(167, 'Payment Type', 1, 13, '', 'payment_type', '', '', 1, 'ប្រភេទបង់ប្រាក់'),
	(168, 'Customer', 10, 1, '', '0', '', '', 1, 'អតិថិជន'),
	(169, 'Sale Return', 7, 10, '', 'report_sale_return', '', '', 1, 'ដូរការលក់'),
	(170, 'Sale Order Return', 11, 17, '', '0', '', '', 1, 'ដូរការលក់'),
	(171, 'Update Cash', 10, 10, '', '0', '', '', 1, 'អាប់ដេត Cash'),
	(172, 'Sale Offiline', 7, 11, '', 'sale_offline', '', '', 0, 'ការលក់ Offline');
/*!40000 ALTER TABLE `page` ENABLE KEYS */;

-- Dumping structure for table rms_makro_home_stage.permissions
DROP TABLE IF EXISTS `permissions`;
CREATE TABLE IF NOT EXISTS `permissions` (
  `permission_id` int(11) NOT NULL AUTO_INCREMENT,
  `permission_page_id` int(11) NOT NULL DEFAULT '0',
  `position_id` int(11) DEFAULT NULL,
  `permission_enable` tinyint(4) NOT NULL DEFAULT '1',
  `permission_add` tinyint(4) NOT NULL DEFAULT '0',
  `permission_edit` tinyint(4) NOT NULL DEFAULT '0',
  `permission_delete` tinyint(4) NOT NULL DEFAULT '0',
  `permission_viewall` tinyint(4) DEFAULT '0',
  `permission_follow_by` int(11) DEFAULT NULL,
  `permission_page_only` tinyint(4) DEFAULT NULL,
  PRIMARY KEY (`permission_id`)
) ENGINE=InnoDB AUTO_INCREMENT=793 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- Dumping data for table rms_makro_home_stage.permissions: ~372 rows (approximately)
DELETE FROM `permissions`;
/*!40000 ALTER TABLE `permissions` DISABLE KEYS */;
INSERT INTO `permissions` (`permission_id`, `permission_page_id`, `position_id`, `permission_enable`, `permission_add`, `permission_edit`, `permission_delete`, `permission_viewall`, `permission_follow_by`, `permission_page_only`) VALUES
	(1, 9, 43, 1, 0, 0, 0, 0, NULL, NULL),
	(2, 11, 43, 1, 1, 1, 1, 0, NULL, NULL),
	(3, 12, 43, 0, 1, 1, 1, NULL, NULL, NULL),
	(4, 13, 43, 1, 1, 1, 1, 0, NULL, NULL),
	(5, 14, 43, 1, 1, 1, 1, 0, NULL, NULL),
	(6, 15, 43, 1, 1, 1, 1, 0, NULL, NULL),
	(7, 56, 43, 1, 1, 1, 1, 0, NULL, NULL),
	(8, 73, 43, 1, 1, 1, 1, 0, NULL, NULL),
	(9, 75, 43, 0, 1, 1, 1, NULL, NULL, NULL),
	(10, 83, 43, 1, 1, 1, 1, 0, NULL, NULL),
	(11, 139, 43, 1, 1, 1, 1, 0, NULL, NULL),
	(12, 162, 43, 1, 1, 1, 1, 0, NULL, NULL),
	(13, 164, 43, 0, 1, 1, 1, NULL, NULL, NULL),
	(14, 167, 43, 1, 1, 1, 1, 0, NULL, NULL),
	(15, 35, 43, 1, 0, 0, 0, 0, NULL, NULL),
	(16, 43, 43, 1, 1, 1, 1, 0, NULL, NULL),
	(17, 44, 43, 1, 1, 1, 1, 0, NULL, NULL),
	(18, 45, 43, 1, 1, 1, 1, 0, NULL, NULL),
	(19, 46, 43, 1, 1, 1, 1, 0, NULL, NULL),
	(20, 48, 43, 1, 0, 0, 0, 0, NULL, NULL),
	(21, 49, 43, 1, 1, 1, 1, 0, NULL, NULL),
	(22, 50, 43, 1, 1, 1, 1, 0, NULL, NULL),
	(23, 160, 43, 1, 1, 1, 1, 0, NULL, NULL),
	(24, 152, 43, 1, 1, 1, 1, 0, NULL, NULL),
	(25, 153, 43, 1, 1, 1, 1, 0, NULL, NULL),
	(26, 163, 43, 1, 1, 1, 1, 0, NULL, NULL),
	(27, 154, 43, 1, 1, 1, 1, 0, NULL, NULL),
	(28, 166, 43, 1, 1, 1, 1, 0, NULL, NULL),
	(29, 18, 43, 1, 0, 0, 0, 0, NULL, NULL),
	(30, 150, 43, 1, 1, 1, 1, 0, NULL, NULL),
	(31, 19, 43, 1, 1, 1, 1, 0, NULL, NULL),
	(32, 165, 43, 1, 1, 1, 1, 0, NULL, NULL),
	(33, 20, 43, 1, 1, 1, 1, 0, NULL, NULL),
	(34, 79, 43, 1, 1, 1, 1, 0, NULL, NULL),
	(35, 131, 43, 1, 1, 1, 1, 0, NULL, NULL),
	(36, 22, 43, 1, 0, 0, 0, 0, NULL, NULL),
	(37, 23, 43, 1, 1, 1, 1, 0, NULL, NULL),
	(38, 25, 43, 1, 1, 1, 1, 0, NULL, NULL),
	(39, 24, 43, 1, 1, 1, 1, 0, NULL, NULL),
	(40, 140, 43, 1, 1, 1, 1, 0, NULL, NULL),
	(41, 141, 43, 1, 1, 1, 1, 0, NULL, NULL),
	(42, 28, 43, 1, 0, 0, 0, 0, NULL, NULL),
	(43, 138, 43, 1, 1, 1, 1, 0, NULL, NULL),
	(44, 32, 43, 1, 1, 1, 1, 0, NULL, NULL),
	(45, 30, 43, 1, 1, 1, 1, 0, NULL, NULL),
	(46, 31, 43, 1, 1, 1, 1, 0, NULL, NULL),
	(47, 68, 43, 1, 1, 1, 1, 0, NULL, NULL),
	(48, 142, 43, 0, 1, 1, 1, NULL, NULL, NULL),
	(49, 34, 43, 1, 0, 0, 0, 0, NULL, NULL),
	(50, 67, 43, 1, 1, 1, 1, 0, NULL, NULL),
	(51, 69, 43, 1, 1, 1, 1, 0, NULL, NULL),
	(52, 71, 43, 1, 1, 1, 1, 0, NULL, NULL),
	(53, 72, 43, 1, 1, 1, 1, 0, NULL, NULL),
	(54, 81, 43, 1, 1, 1, 1, 0, NULL, NULL),
	(55, 84, 43, 1, 1, 1, 1, 0, NULL, NULL),
	(56, 148, 43, 1, 1, 1, 1, 0, NULL, NULL),
	(57, 149, 43, 1, 1, 1, 1, 0, NULL, NULL),
	(58, 151, 43, 1, 1, 1, 1, 0, NULL, NULL),
	(59, 39, 43, 1, 0, 0, 0, 0, NULL, NULL),
	(60, 40, 43, 1, 1, 1, 1, 0, NULL, NULL),
	(61, 130, 43, 1, 1, 1, 1, 0, NULL, NULL),
	(62, 41, 43, 1, 1, 1, 1, 0, NULL, NULL),
	(63, 144, 43, 1, 1, 1, 1, 0, NULL, NULL),
	(64, 146, 43, 1, 1, 1, 1, 0, NULL, NULL),
	(65, 52, 43, 1, 0, 0, 0, 0, NULL, NULL),
	(66, 55, 43, 1, 1, 1, 1, 0, NULL, NULL),
	(67, 88, 43, 1, 0, 0, 0, 0, NULL, NULL),
	(68, 168, 43, 1, 0, 0, 0, 0, NULL, NULL),
	(69, 89, 43, 1, 0, 0, 0, 0, NULL, NULL),
	(70, 90, 43, 1, 0, 0, 0, 0, NULL, NULL),
	(71, 91, 43, 1, 0, 0, 0, 0, NULL, NULL),
	(72, 105, 43, 1, 0, 0, 0, 0, NULL, NULL),
	(73, 155, 43, 1, 0, 0, 0, 0, NULL, NULL),
	(74, 157, 43, 1, 0, 0, 0, 0, NULL, NULL),
	(75, 95, 43, 1, 0, 0, 0, 0, NULL, NULL),
	(76, 97, 43, 1, 0, 0, 0, 0, NULL, NULL),
	(77, 96, 43, 1, 0, 0, 0, 0, NULL, NULL),
	(79, 99, 43, 1, 0, 0, 0, 0, NULL, NULL),
	(80, 100, 43, 1, 0, 0, 0, 0, NULL, NULL),
	(81, 101, 43, 1, 0, 0, 0, 0, NULL, NULL),
	(82, 102, 43, 1, 0, 0, 0, 0, NULL, NULL),
	(83, 103, 43, 1, 0, 0, 0, 0, NULL, NULL),
	(84, 104, 43, 1, 0, 0, 0, 0, NULL, NULL),
	(85, 110, 43, 1, 0, 0, 0, 0, NULL, NULL),
	(86, 126, 43, 1, 0, 0, 0, 0, NULL, NULL),
	(87, 111, 43, 1, 0, 0, 0, 0, NULL, NULL),
	(89, 113, 43, 1, 0, 0, 0, 0, NULL, NULL),
	(90, 115, 43, 1, 0, 0, 0, 0, NULL, NULL),
	(91, 117, 43, 1, 0, 0, 0, 0, NULL, NULL),
	(255, 169, 43, 1, 1, 1, 1, 1, NULL, NULL),
	(256, 170, 43, 1, 0, 0, 0, 0, NULL, NULL),
	(257, 171, 43, 1, 0, 0, 0, 0, NULL, NULL),
	(385, 172, 43, 1, 1, 1, 1, 0, NULL, NULL),
	(514, 9, 49, 0, 0, 0, 0, 0, NULL, NULL),
	(515, 11, 49, 0, 0, 0, 0, 0, NULL, NULL),
	(516, 12, 49, 0, 0, 0, 0, NULL, NULL, NULL),
	(517, 13, 49, 0, 0, 0, 0, 0, NULL, NULL),
	(518, 14, 49, 0, 0, 0, 0, 0, NULL, NULL),
	(519, 15, 49, 0, 0, 0, 0, 0, NULL, NULL),
	(520, 56, 49, 0, 0, 0, 0, 0, NULL, NULL),
	(521, 73, 49, 0, 0, 0, 0, 0, NULL, NULL),
	(522, 75, 49, 0, 0, 0, 0, NULL, NULL, NULL),
	(523, 83, 49, 0, 0, 0, 0, 0, NULL, NULL),
	(524, 139, 49, 0, 0, 0, 0, 0, NULL, NULL),
	(525, 162, 49, 0, 0, 0, 0, 0, NULL, NULL),
	(526, 164, 49, 0, 0, 0, 0, NULL, NULL, NULL),
	(527, 167, 49, 0, 0, 0, 0, 0, NULL, NULL),
	(528, 35, 49, 0, 0, 0, 0, 0, NULL, NULL),
	(529, 43, 49, 0, 0, 0, 0, 0, NULL, NULL),
	(530, 44, 49, 0, 0, 0, 0, 0, NULL, NULL),
	(531, 45, 49, 0, 0, 0, 0, 0, NULL, NULL),
	(532, 46, 49, 0, 0, 0, 0, 0, NULL, NULL),
	(533, 48, 49, 0, 0, 0, 0, 0, NULL, NULL),
	(534, 49, 49, 0, 0, 0, 0, 0, NULL, NULL),
	(535, 50, 49, 0, 0, 0, 0, 0, NULL, NULL),
	(536, 160, 49, 0, 0, 0, 0, 0, NULL, NULL),
	(537, 152, 49, 0, 0, 0, 0, 0, NULL, NULL),
	(538, 153, 49, 0, 0, 0, 0, 0, NULL, NULL),
	(539, 163, 49, 0, 0, 0, 0, 0, NULL, NULL),
	(540, 154, 49, 0, 0, 0, 0, 0, NULL, NULL),
	(541, 166, 49, 0, 0, 0, 0, 0, NULL, NULL),
	(542, 18, 49, 0, 0, 0, 0, 0, NULL, NULL),
	(543, 150, 49, 0, 0, 0, 0, 0, NULL, NULL),
	(544, 19, 49, 0, 0, 0, 0, 0, NULL, NULL),
	(545, 165, 49, 0, 0, 0, 0, 0, NULL, NULL),
	(546, 20, 49, 0, 0, 0, 0, 0, NULL, NULL),
	(547, 79, 49, 0, 0, 0, 0, 0, NULL, NULL),
	(548, 131, 49, 0, 0, 0, 0, 0, NULL, NULL),
	(549, 22, 49, 0, 0, 0, 0, 0, NULL, NULL),
	(550, 23, 49, 0, 0, 0, 0, 0, NULL, NULL),
	(551, 25, 49, 0, 0, 0, 0, 0, NULL, NULL),
	(552, 24, 49, 0, 0, 0, 0, 0, NULL, NULL),
	(553, 140, 49, 0, 0, 0, 0, 0, NULL, NULL),
	(554, 141, 49, 0, 0, 0, 0, 0, NULL, NULL),
	(555, 28, 49, 0, 0, 0, 0, 0, NULL, NULL),
	(556, 138, 49, 0, 0, 0, 0, 0, NULL, NULL),
	(557, 32, 49, 0, 0, 0, 0, 0, NULL, NULL),
	(558, 30, 49, 0, 0, 0, 0, 0, NULL, NULL),
	(559, 31, 49, 0, 0, 0, 0, 0, NULL, NULL),
	(560, 68, 49, 0, 0, 0, 0, 0, NULL, NULL),
	(561, 142, 49, 0, 0, 0, 0, NULL, NULL, NULL),
	(562, 34, 49, 0, 0, 0, 0, 0, NULL, NULL),
	(563, 67, 49, 0, 0, 0, 0, 0, NULL, NULL),
	(564, 69, 49, 0, 0, 0, 0, 0, NULL, NULL),
	(565, 71, 49, 0, 0, 0, 0, 0, NULL, NULL),
	(566, 72, 49, 0, 0, 0, 0, 0, NULL, NULL),
	(567, 81, 49, 0, 0, 0, 0, 0, NULL, NULL),
	(568, 84, 49, 0, 0, 0, 0, 0, NULL, NULL),
	(569, 148, 49, 0, 0, 0, 0, 0, NULL, NULL),
	(570, 149, 49, 0, 0, 0, 0, 0, NULL, NULL),
	(571, 151, 49, 0, 0, 0, 0, 0, NULL, NULL),
	(572, 169, 49, 0, 0, 0, 0, 0, NULL, NULL),
	(573, 172, 49, 0, 0, 0, 0, 0, NULL, NULL),
	(574, 39, 49, 0, 0, 0, 0, 0, NULL, NULL),
	(575, 40, 49, 0, 0, 0, 0, 0, NULL, NULL),
	(576, 130, 49, 0, 0, 0, 0, 0, NULL, NULL),
	(577, 41, 49, 0, 0, 0, 0, 0, NULL, NULL),
	(578, 144, 49, 0, 0, 0, 0, 0, NULL, NULL),
	(579, 146, 49, 0, 0, 0, 0, 0, NULL, NULL),
	(580, 52, 49, 0, 0, 0, 0, 0, NULL, NULL),
	(581, 55, 49, 0, 0, 0, 0, 0, NULL, NULL),
	(582, 88, 49, 1, 0, 0, 0, 0, NULL, NULL),
	(583, 168, 49, 1, 0, 0, 0, 0, NULL, NULL),
	(584, 89, 49, 1, 0, 0, 0, 0, NULL, NULL),
	(585, 90, 49, 1, 0, 0, 0, 0, NULL, NULL),
	(586, 91, 49, 1, 0, 0, 0, 0, NULL, NULL),
	(587, 105, 49, 1, 0, 0, 0, 0, NULL, NULL),
	(588, 155, 49, 1, 0, 0, 0, 0, NULL, NULL),
	(589, 157, 49, 1, 0, 0, 0, 0, NULL, NULL),
	(590, 171, 49, 1, 0, 0, 0, 0, NULL, NULL),
	(591, 95, 49, 1, 0, 0, 0, 0, NULL, NULL),
	(592, 97, 49, 1, 0, 0, 0, 0, NULL, NULL),
	(593, 96, 49, 1, 0, 0, 0, 0, NULL, NULL),
	(594, 99, 49, 1, 0, 0, 0, 0, NULL, NULL),
	(595, 100, 49, 1, 0, 0, 0, 0, NULL, NULL),
	(596, 101, 49, 1, 0, 0, 0, 0, NULL, NULL),
	(597, 102, 49, 1, 0, 0, 0, 0, NULL, NULL),
	(598, 103, 49, 1, 0, 0, 0, 0, NULL, NULL),
	(599, 104, 49, 1, 0, 0, 0, 0, NULL, NULL),
	(600, 110, 49, 1, 0, 0, 0, 0, NULL, NULL),
	(601, 126, 49, 0, 0, 0, 0, 0, NULL, NULL),
	(602, 111, 49, 1, 0, 0, 0, 0, NULL, NULL),
	(603, 113, 49, 1, 0, 0, 0, 0, NULL, NULL),
	(604, 115, 49, 1, 0, 0, 0, 0, NULL, NULL),
	(605, 117, 49, 0, 0, 0, 0, 0, NULL, NULL),
	(606, 170, 49, 0, 0, 0, 0, 0, NULL, NULL),
	(607, 9, 50, 1, 0, 0, 0, NULL, NULL, NULL),
	(608, 11, 50, 1, 0, 0, 0, NULL, NULL, NULL),
	(609, 12, 50, 0, 0, 0, 0, NULL, NULL, NULL),
	(610, 13, 50, 1, 0, 0, 0, NULL, NULL, NULL),
	(611, 14, 50, 1, 0, 0, 0, NULL, NULL, NULL),
	(612, 15, 50, 1, 0, 0, 0, NULL, NULL, NULL),
	(613, 56, 50, 1, 0, 0, 0, NULL, NULL, NULL),
	(614, 73, 50, 1, 0, 0, 0, NULL, NULL, NULL),
	(615, 75, 50, 0, 0, 0, 0, NULL, NULL, NULL),
	(616, 83, 50, 1, 0, 0, 0, NULL, NULL, NULL),
	(617, 139, 50, 1, 0, 0, 0, NULL, NULL, NULL),
	(618, 162, 50, 1, 0, 0, 0, NULL, NULL, NULL),
	(619, 164, 50, 0, 0, 0, 0, NULL, NULL, NULL),
	(620, 167, 50, 1, 0, 0, 0, NULL, NULL, NULL),
	(621, 35, 50, 1, 0, 0, 0, NULL, NULL, NULL),
	(622, 43, 50, 1, 0, 0, 0, NULL, NULL, NULL),
	(623, 44, 50, 1, 0, 0, 0, NULL, NULL, NULL),
	(624, 45, 50, 1, 0, 0, 0, NULL, NULL, NULL),
	(625, 46, 50, 1, 0, 0, 0, NULL, NULL, NULL),
	(626, 48, 50, 1, 0, 0, 0, NULL, NULL, NULL),
	(627, 49, 50, 1, 0, 0, 0, NULL, NULL, NULL),
	(628, 50, 50, 1, 0, 0, 0, NULL, NULL, NULL),
	(629, 160, 50, 1, 0, 0, 0, NULL, NULL, NULL),
	(630, 152, 50, 1, 0, 0, 0, NULL, NULL, NULL),
	(631, 153, 50, 1, 0, 0, 0, NULL, NULL, NULL),
	(632, 163, 50, 1, 0, 0, 0, NULL, NULL, NULL),
	(633, 154, 50, 1, 0, 0, 0, NULL, NULL, NULL),
	(634, 166, 50, 1, 0, 0, 0, NULL, NULL, NULL),
	(635, 18, 50, 1, 0, 0, 0, NULL, NULL, NULL),
	(636, 150, 50, 1, 0, 0, 0, NULL, NULL, NULL),
	(637, 19, 50, 1, 0, 0, 0, NULL, NULL, NULL),
	(638, 165, 50, 1, 0, 0, 0, NULL, NULL, NULL),
	(639, 20, 50, 1, 0, 0, 0, NULL, NULL, NULL),
	(640, 79, 50, 1, 0, 0, 0, NULL, NULL, NULL),
	(641, 131, 50, 1, 0, 0, 0, NULL, NULL, NULL),
	(642, 22, 50, 1, 0, 0, 0, NULL, NULL, NULL),
	(643, 23, 50, 1, 0, 0, 0, NULL, NULL, NULL),
	(644, 25, 50, 1, 0, 0, 0, NULL, NULL, NULL),
	(645, 24, 50, 1, 0, 0, 0, NULL, NULL, NULL),
	(646, 140, 50, 1, 0, 0, 0, NULL, NULL, NULL),
	(647, 141, 50, 1, 0, 0, 0, NULL, NULL, NULL),
	(648, 28, 50, 1, 0, 0, 0, NULL, NULL, NULL),
	(649, 138, 50, 1, 0, 0, 0, NULL, NULL, NULL),
	(650, 32, 50, 1, 0, 0, 0, NULL, NULL, NULL),
	(651, 30, 50, 1, 0, 0, 0, NULL, NULL, NULL),
	(652, 31, 50, 1, 0, 0, 0, NULL, NULL, NULL),
	(653, 68, 50, 1, 0, 0, 0, NULL, NULL, NULL),
	(654, 142, 50, 0, 0, 0, 0, NULL, NULL, NULL),
	(655, 34, 50, 1, 0, 0, 0, NULL, NULL, NULL),
	(656, 67, 50, 1, 0, 0, 0, NULL, NULL, NULL),
	(657, 69, 50, 1, 0, 0, 0, NULL, NULL, NULL),
	(658, 71, 50, 1, 0, 0, 0, NULL, NULL, NULL),
	(659, 72, 50, 1, 0, 0, 0, NULL, NULL, NULL),
	(660, 81, 50, 1, 0, 0, 0, NULL, NULL, NULL),
	(661, 84, 50, 1, 0, 0, 0, NULL, NULL, NULL),
	(662, 148, 50, 1, 0, 0, 0, NULL, NULL, NULL),
	(663, 149, 50, 1, 0, 0, 0, NULL, NULL, NULL),
	(664, 151, 50, 1, 0, 0, 0, NULL, NULL, NULL),
	(665, 169, 50, 1, 0, 0, 0, NULL, NULL, NULL),
	(666, 172, 50, 1, 0, 0, 0, NULL, NULL, NULL),
	(667, 39, 50, 1, 0, 0, 0, NULL, NULL, NULL),
	(668, 40, 50, 1, 0, 0, 0, NULL, NULL, NULL),
	(669, 130, 50, 1, 0, 0, 0, NULL, NULL, NULL),
	(670, 41, 50, 1, 0, 0, 0, NULL, NULL, NULL),
	(671, 144, 50, 1, 0, 0, 0, NULL, NULL, NULL),
	(672, 146, 50, 1, 0, 0, 0, NULL, NULL, NULL),
	(673, 52, 50, 1, 0, 0, 0, NULL, NULL, NULL),
	(674, 55, 50, 1, 0, 0, 0, NULL, NULL, NULL),
	(675, 88, 50, 1, 0, 0, 0, NULL, NULL, NULL),
	(676, 168, 50, 1, 0, 0, 0, NULL, NULL, NULL),
	(677, 89, 50, 1, 0, 0, 0, NULL, NULL, NULL),
	(678, 90, 50, 1, 0, 0, 0, NULL, NULL, NULL),
	(679, 91, 50, 1, 0, 0, 0, NULL, NULL, NULL),
	(680, 105, 50, 1, 0, 0, 0, NULL, NULL, NULL),
	(681, 155, 50, 1, 0, 0, 0, NULL, NULL, NULL),
	(682, 157, 50, 1, 0, 0, 0, NULL, NULL, NULL),
	(683, 171, 50, 1, 0, 0, 0, NULL, NULL, NULL),
	(684, 95, 50, 1, 0, 0, 0, NULL, NULL, NULL),
	(685, 97, 50, 1, 0, 0, 0, NULL, NULL, NULL),
	(686, 96, 50, 1, 0, 0, 0, NULL, NULL, NULL),
	(687, 99, 50, 1, 0, 0, 0, NULL, NULL, NULL),
	(688, 100, 50, 1, 0, 0, 0, NULL, NULL, NULL),
	(689, 101, 50, 1, 0, 0, 0, NULL, NULL, NULL),
	(690, 102, 50, 1, 0, 0, 0, NULL, NULL, NULL),
	(691, 103, 50, 1, 0, 0, 0, NULL, NULL, NULL),
	(692, 104, 50, 1, 0, 0, 0, NULL, NULL, NULL),
	(693, 110, 50, 1, 0, 0, 0, NULL, NULL, NULL),
	(694, 126, 50, 1, 0, 0, 0, NULL, NULL, NULL),
	(695, 111, 50, 1, 0, 0, 0, NULL, NULL, NULL),
	(696, 113, 50, 1, 0, 0, 0, NULL, NULL, NULL),
	(697, 115, 50, 1, 0, 0, 0, NULL, NULL, NULL),
	(698, 117, 50, 1, 0, 0, 0, NULL, NULL, NULL),
	(699, 170, 50, 1, 0, 0, 0, NULL, NULL, NULL),
	(700, 9, 51, 1, 0, 0, 0, NULL, NULL, NULL),
	(701, 11, 51, 1, 0, 0, 0, NULL, NULL, NULL),
	(702, 12, 51, 0, 0, 0, 0, NULL, NULL, NULL),
	(703, 13, 51, 1, 0, 0, 0, NULL, NULL, NULL),
	(704, 14, 51, 1, 0, 0, 0, NULL, NULL, NULL),
	(705, 15, 51, 1, 0, 0, 0, NULL, NULL, NULL),
	(706, 56, 51, 1, 0, 0, 0, NULL, NULL, NULL),
	(707, 73, 51, 1, 0, 0, 0, NULL, NULL, NULL),
	(708, 75, 51, 0, 0, 0, 0, NULL, NULL, NULL),
	(709, 83, 51, 1, 0, 0, 0, NULL, NULL, NULL),
	(710, 139, 51, 1, 0, 0, 0, NULL, NULL, NULL),
	(711, 162, 51, 1, 0, 0, 0, NULL, NULL, NULL),
	(712, 164, 51, 0, 0, 0, 0, NULL, NULL, NULL),
	(713, 167, 51, 1, 0, 0, 0, NULL, NULL, NULL),
	(714, 35, 51, 1, 0, 0, 0, NULL, NULL, NULL),
	(715, 43, 51, 1, 0, 0, 0, NULL, NULL, NULL),
	(716, 44, 51, 1, 0, 0, 0, NULL, NULL, NULL),
	(717, 45, 51, 1, 0, 0, 0, NULL, NULL, NULL),
	(718, 46, 51, 1, 0, 0, 0, NULL, NULL, NULL),
	(719, 48, 51, 1, 0, 0, 0, NULL, NULL, NULL),
	(720, 49, 51, 1, 0, 0, 0, NULL, NULL, NULL),
	(721, 50, 51, 1, 0, 0, 0, NULL, NULL, NULL),
	(722, 160, 51, 1, 0, 0, 0, NULL, NULL, NULL),
	(723, 152, 51, 1, 0, 0, 0, NULL, NULL, NULL),
	(724, 153, 51, 1, 0, 0, 0, NULL, NULL, NULL),
	(725, 163, 51, 1, 0, 0, 0, NULL, NULL, NULL),
	(726, 154, 51, 1, 0, 0, 0, NULL, NULL, NULL),
	(727, 166, 51, 1, 0, 0, 0, NULL, NULL, NULL),
	(728, 18, 51, 1, 0, 0, 0, NULL, NULL, NULL),
	(729, 150, 51, 1, 0, 0, 0, NULL, NULL, NULL),
	(730, 19, 51, 1, 0, 0, 0, NULL, NULL, NULL),
	(731, 165, 51, 1, 0, 0, 0, NULL, NULL, NULL),
	(732, 20, 51, 1, 0, 0, 0, NULL, NULL, NULL),
	(733, 79, 51, 1, 0, 0, 0, NULL, NULL, NULL),
	(734, 131, 51, 1, 0, 0, 0, NULL, NULL, NULL),
	(735, 22, 51, 1, 0, 0, 0, NULL, NULL, NULL),
	(736, 23, 51, 1, 0, 0, 0, NULL, NULL, NULL),
	(737, 25, 51, 1, 0, 0, 0, NULL, NULL, NULL),
	(738, 24, 51, 1, 0, 0, 0, NULL, NULL, NULL),
	(739, 140, 51, 1, 0, 0, 0, NULL, NULL, NULL),
	(740, 141, 51, 1, 0, 0, 0, NULL, NULL, NULL),
	(741, 28, 51, 1, 0, 0, 0, NULL, NULL, NULL),
	(742, 138, 51, 1, 0, 0, 0, NULL, NULL, NULL),
	(743, 32, 51, 1, 0, 0, 0, NULL, NULL, NULL),
	(744, 30, 51, 1, 0, 0, 0, NULL, NULL, NULL),
	(745, 31, 51, 1, 0, 0, 0, NULL, NULL, NULL),
	(746, 68, 51, 1, 0, 0, 0, NULL, NULL, NULL),
	(747, 142, 51, 0, 0, 0, 0, NULL, NULL, NULL),
	(748, 34, 51, 1, 0, 0, 0, NULL, NULL, NULL),
	(749, 67, 51, 1, 0, 0, 0, NULL, NULL, NULL),
	(750, 69, 51, 1, 0, 0, 0, NULL, NULL, NULL),
	(751, 71, 51, 1, 0, 0, 0, NULL, NULL, NULL),
	(752, 72, 51, 1, 0, 0, 0, NULL, NULL, NULL),
	(753, 81, 51, 1, 0, 0, 0, NULL, NULL, NULL),
	(754, 84, 51, 1, 0, 0, 0, NULL, NULL, NULL),
	(755, 148, 51, 1, 0, 0, 0, NULL, NULL, NULL),
	(756, 149, 51, 1, 0, 0, 0, NULL, NULL, NULL),
	(757, 151, 51, 1, 0, 0, 0, NULL, NULL, NULL),
	(758, 169, 51, 1, 0, 0, 0, NULL, NULL, NULL),
	(759, 172, 51, 1, 0, 0, 0, NULL, NULL, NULL),
	(760, 39, 51, 1, 0, 0, 0, NULL, NULL, NULL),
	(761, 40, 51, 1, 0, 0, 0, NULL, NULL, NULL),
	(762, 130, 51, 1, 0, 0, 0, NULL, NULL, NULL),
	(763, 41, 51, 1, 0, 0, 0, NULL, NULL, NULL),
	(764, 144, 51, 1, 0, 0, 0, NULL, NULL, NULL),
	(765, 146, 51, 1, 0, 0, 0, NULL, NULL, NULL),
	(766, 52, 51, 1, 0, 0, 0, NULL, NULL, NULL),
	(767, 55, 51, 1, 0, 0, 0, NULL, NULL, NULL),
	(768, 88, 51, 1, 0, 0, 0, NULL, NULL, NULL),
	(769, 168, 51, 1, 0, 0, 0, NULL, NULL, NULL),
	(770, 89, 51, 1, 0, 0, 0, NULL, NULL, NULL),
	(771, 90, 51, 1, 0, 0, 0, NULL, NULL, NULL),
	(772, 91, 51, 1, 0, 0, 0, NULL, NULL, NULL),
	(773, 105, 51, 1, 0, 0, 0, NULL, NULL, NULL),
	(774, 155, 51, 1, 0, 0, 0, NULL, NULL, NULL),
	(775, 157, 51, 1, 0, 0, 0, NULL, NULL, NULL),
	(776, 171, 51, 1, 0, 0, 0, NULL, NULL, NULL),
	(777, 95, 51, 1, 0, 0, 0, NULL, NULL, NULL),
	(778, 97, 51, 1, 0, 0, 0, NULL, NULL, NULL),
	(779, 96, 51, 1, 0, 0, 0, NULL, NULL, NULL),
	(780, 99, 51, 1, 0, 0, 0, NULL, NULL, NULL),
	(781, 100, 51, 1, 0, 0, 0, NULL, NULL, NULL),
	(782, 101, 51, 1, 0, 0, 0, NULL, NULL, NULL),
	(783, 102, 51, 1, 0, 0, 0, NULL, NULL, NULL),
	(784, 103, 51, 1, 0, 0, 0, NULL, NULL, NULL),
	(785, 104, 51, 1, 0, 0, 0, NULL, NULL, NULL),
	(786, 110, 51, 1, 0, 0, 0, NULL, NULL, NULL),
	(787, 126, 51, 1, 0, 0, 0, NULL, NULL, NULL),
	(788, 111, 51, 1, 0, 0, 0, NULL, NULL, NULL),
	(789, 113, 51, 1, 0, 0, 0, NULL, NULL, NULL),
	(790, 115, 51, 1, 0, 0, 0, NULL, NULL, NULL),
	(791, 117, 51, 1, 0, 0, 0, NULL, NULL, NULL),
	(792, 170, 51, 1, 0, 0, 0, NULL, NULL, NULL);
/*!40000 ALTER TABLE `permissions` ENABLE KEYS */;

-- Dumping structure for table rms_makro_home_stage.point
DROP TABLE IF EXISTS `point`;
CREATE TABLE IF NOT EXISTS `point` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `point` int(11) NOT NULL,
  `froms` int(11) NOT NULL,
  `tos` int(11) NOT NULL,
  `date_created` date NOT NULL,
  `created_by` int(11) NOT NULL,
  `date_modified` date NOT NULL,
  `modified_by` int(11) NOT NULL,
  `desc` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `enabled` tinyint(4) NOT NULL DEFAULT '1',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- Dumping data for table rms_makro_home_stage.point: ~0 rows (approximately)
DELETE FROM `point`;
/*!40000 ALTER TABLE `point` DISABLE KEYS */;
/*!40000 ALTER TABLE `point` ENABLE KEYS */;

-- Dumping structure for table rms_makro_home_stage.position
DROP TABLE IF EXISTS `position`;
CREATE TABLE IF NOT EXISTS `position` (
  `position_id` int(11) NOT NULL AUTO_INCREMENT,
  `position_name` varchar(255) DEFAULT NULL,
  `position_note` varchar(255) DEFAULT NULL,
  `position_is_car_wash` tinyint(4) DEFAULT NULL,
  `position_created_date` date DEFAULT NULL,
  `position_created_by` int(11) DEFAULT NULL,
  `position_modified_by` int(11) DEFAULT NULL,
  `position_modified_date` date DEFAULT NULL,
  `status` tinyint(1) DEFAULT '1',
  PRIMARY KEY (`position_id`)
) ENGINE=InnoDB AUTO_INCREMENT=52 DEFAULT CHARSET=latin1;

-- Dumping data for table rms_makro_home_stage.position: ~7 rows (approximately)
DELETE FROM `position`;
/*!40000 ALTER TABLE `position` DISABLE KEYS */;
INSERT INTO `position` (`position_id`, `position_name`, `position_note`, `position_is_car_wash`, `position_created_date`, `position_created_by`, `position_modified_by`, `position_modified_date`, `status`) VALUES
	(43, 'Admin', 'Default', NULL, '2018-12-14', 19, NULL, NULL, 1),
	(46, 'Cashier', 'This is testing', NULL, '2018-12-27', 19, NULL, NULL, 0),
	(47, 'Accounting', '', NULL, '2019-01-04', 19, NULL, NULL, 0),
	(48, 'assistant manager', '', NULL, '2019-01-23', 19, NULL, NULL, 0),
	(49, 'cashier', '', NULL, '2019-01-23', 19, NULL, NULL, 1),
	(50, 'Service', '', NULL, '2019-01-24', 19, NULL, NULL, 1),
	(51, 'assistant ', '', NULL, '2019-01-24', 19, NULL, NULL, 1);
/*!40000 ALTER TABLE `position` ENABLE KEYS */;

-- Dumping structure for table rms_makro_home_stage.printer
DROP TABLE IF EXISTS `printer`;
CREATE TABLE IF NOT EXISTS `printer` (
  `printer_id` int(11) NOT NULL AUTO_INCREMENT,
  `printer_name` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `printer_print_bill` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `printer_print_receipt` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `printer_print_bill_time` int(11) DEFAULT NULL,
  `printer_print_receipt_time` int(11) DEFAULT NULL,
  `printer_print_kitchen` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `printer_is_counter` int(255) DEFAULT NULL,
  `printer_branch_id` int(11) DEFAULT NULL,
  `printer_print_kitchen_time` int(11) DEFAULT NULL,
  `printer_location_id` int(11) DEFAULT NULL,
  `printer_label` int(11) DEFAULT '0',
  PRIMARY KEY (`printer_id`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- Dumping data for table rms_makro_home_stage.printer: ~3 rows (approximately)
DELETE FROM `printer`;
/*!40000 ALTER TABLE `printer` DISABLE KEYS */;
INSERT INTO `printer` (`printer_id`, `printer_name`, `printer_print_bill`, `printer_print_receipt`, `printer_print_bill_time`, `printer_print_receipt_time`, `printer_print_kitchen`, `printer_is_counter`, `printer_branch_id`, `printer_print_kitchen_time`, `printer_location_id`, `printer_label`) VALUES
	(1, 'Cashier', 'Code Soft 32xx Series', '192.168.1.87', NULL, NULL, 'Code Soft 32xx Series', 1, 1, 1, 1, 0),
	(2, 'Bar', '', NULL, NULL, NULL, '', 0, 1, 1, 2, 0),
	(3, 'Kitchen', '192.168.0.124', 'Code Soft 32xx Series', NULL, NULL, '192.168.0.124', 1, 1, 1, 3, 0);
/*!40000 ALTER TABLE `printer` ENABLE KEYS */;

-- Dumping structure for table rms_makro_home_stage.printer_location
DROP TABLE IF EXISTS `printer_location`;
CREATE TABLE IF NOT EXISTS `printer_location` (
  `printer_location_id` int(11) NOT NULL AUTO_INCREMENT,
  `printer_location_name` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `printer_location_is_counter` tinyint(4) DEFAULT '0',
  `printer_location_desc` text COLLATE utf8_unicode_ci,
  `printer_location_created_date` date DEFAULT NULL,
  `printer_location_created_by` date DEFAULT NULL,
  `status` tinyint(1) DEFAULT '1' COMMENT '1=active,0=delete',
  PRIMARY KEY (`printer_location_id`)
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- Dumping data for table rms_makro_home_stage.printer_location: ~4 rows (approximately)
DELETE FROM `printer_location`;
/*!40000 ALTER TABLE `printer_location` DISABLE KEYS */;
INSERT INTO `printer_location` (`printer_location_id`, `printer_location_name`, `printer_location_is_counter`, `printer_location_desc`, `printer_location_created_date`, `printer_location_created_by`, `status`) VALUES
	(1, 'Cashier', 1, 'Cashier Printer', '2018-12-26', '0000-00-00', 1),
	(2, 'Bar', 0, 'Bar Location', '2018-07-02', '0000-00-00', 0),
	(3, 'Kitchen', 1, 'Kitchen Printer', '2019-01-24', '0000-00-00', 1),
	(5, 'Cooktail', NULL, '', '2018-12-26', '0000-00-00', 0);
/*!40000 ALTER TABLE `printer_location` ENABLE KEYS */;

-- Dumping structure for table rms_makro_home_stage.purchase
DROP TABLE IF EXISTS `purchase`;
CREATE TABLE IF NOT EXISTS `purchase` (
  `purchase_no` int(11) NOT NULL AUTO_INCREMENT,
  `refference_no` varchar(50) COLLATE utf8_unicode_ci NOT NULL DEFAULT '0',
  `purchase_supplier_id` int(255) NOT NULL,
  `purchase_created_date` date NOT NULL,
  `purchase_created_by` int(11) NOT NULL,
  `purchase_modified_by` int(11) DEFAULT NULL,
  `purchase_modified_date` date DEFAULT NULL,
  `purchase_branch_id` int(11) NOT NULL,
  `purchase_due_date` date NOT NULL,
  `purchase_deposit` double(11,2) DEFAULT '0.00',
  `purchase_discount` double(11,2) DEFAULT NULL,
  `purchase_note` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `purchase_vat` int(11) DEFAULT '0',
  `purchase_total_amount` double(11,2) DEFAULT NULL,
  `status` tinyint(50) DEFAULT '1',
  PRIMARY KEY (`purchase_no`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- Dumping data for table rms_makro_home_stage.purchase: ~0 rows (approximately)
DELETE FROM `purchase`;
/*!40000 ALTER TABLE `purchase` DISABLE KEYS */;
/*!40000 ALTER TABLE `purchase` ENABLE KEYS */;

-- Dumping structure for table rms_makro_home_stage.purchase_detail
DROP TABLE IF EXISTS `purchase_detail`;
CREATE TABLE IF NOT EXISTS `purchase_detail` (
  `purchase_detail_id` int(11) NOT NULL AUTO_INCREMENT,
  `purchase_no` int(11) NOT NULL DEFAULT '0',
  `purchase_detail_item_detail_id` int(11) NOT NULL,
  `measure_id` int(11) NOT NULL,
  `measure_qty` int(11) NOT NULL DEFAULT '0',
  `purchase_detail_unit_cost` decimal(10,2) NOT NULL DEFAULT '0.00',
  `purchase_detail_qty` int(11) NOT NULL DEFAULT '0',
  `purchase_detail_total_amount` decimal(10,2) DEFAULT '0.00',
  `purchase_created_date` date NOT NULL,
  `purchase_created_by` int(11) NOT NULL,
  `purchase_modified_by` int(11) DEFAULT NULL,
  `purchase_modified_date` date DEFAULT NULL,
  `purchase_detail_note` text COLLATE utf8_unicode_ci,
  `status` tinyint(50) NOT NULL,
  `stock_location_id` int(11) NOT NULL,
  `purchase_detail_item_alert_date` date DEFAULT NULL,
  `purchase_detail_item_expired_date` date DEFAULT NULL,
  `purchase_detail_convert_qty` int(11) DEFAULT NULL,
  `purchase_detail_date` datetime DEFAULT NULL,
  PRIMARY KEY (`purchase_detail_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- Dumping data for table rms_makro_home_stage.purchase_detail: ~0 rows (approximately)
DELETE FROM `purchase_detail`;
/*!40000 ALTER TABLE `purchase_detail` DISABLE KEYS */;
/*!40000 ALTER TABLE `purchase_detail` ENABLE KEYS */;

-- Dumping structure for table rms_makro_home_stage.purchase_pay
DROP TABLE IF EXISTS `purchase_pay`;
CREATE TABLE IF NOT EXISTS `purchase_pay` (
  `purchase_pay_id` int(11) NOT NULL AUTO_INCREMENT,
  `purchase_no` int(11) NOT NULL,
  `purchase_pay_date` date NOT NULL,
  `purchase_pay_amount` decimal(10,2) NOT NULL,
  `purchase_pay_note` text COLLATE utf8_unicode_ci NOT NULL,
  `purchase_pay_created_by` int(11) NOT NULL,
  `purchase_pay_created_date` date NOT NULL,
  `purchase_pay_modified_by` int(11) NOT NULL,
  `purchase_pay_modified_date` date NOT NULL,
  PRIMARY KEY (`purchase_pay_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- Dumping data for table rms_makro_home_stage.purchase_pay: ~0 rows (approximately)
DELETE FROM `purchase_pay`;
/*!40000 ALTER TABLE `purchase_pay` DISABLE KEYS */;
/*!40000 ALTER TABLE `purchase_pay` ENABLE KEYS */;

-- Dumping structure for table rms_makro_home_stage.purchase_return
DROP TABLE IF EXISTS `purchase_return`;
CREATE TABLE IF NOT EXISTS `purchase_return` (
  `purchase_return_id` int(11) NOT NULL AUTO_INCREMENT,
  `purchase_no` int(11) NOT NULL,
  `purchase_return_item_detail_id` int(11) NOT NULL,
  `stock_location_id` int(11) NOT NULL,
  `measure_id` int(11) NOT NULL,
  `measure_qty` int(11) DEFAULT '0',
  `purchase_return_unit_cost` decimal(10,2) DEFAULT '0.00',
  `purchase_return_qty` int(11) DEFAULT '0',
  `purchase_return_total_amount` decimal(10,2) DEFAULT '0.00',
  `purchase_return_date` datetime NOT NULL,
  `purchase_return_created_by` int(11) NOT NULL,
  `purchase_return_note` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `status` tinyint(4) DEFAULT '1',
  PRIMARY KEY (`purchase_return_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- Dumping data for table rms_makro_home_stage.purchase_return: ~0 rows (approximately)
DELETE FROM `purchase_return`;
/*!40000 ALTER TABLE `purchase_return` DISABLE KEYS */;
/*!40000 ALTER TABLE `purchase_return` ENABLE KEYS */;

-- Dumping structure for table rms_makro_home_stage.rate
DROP TABLE IF EXISTS `rate`;
CREATE TABLE IF NOT EXISTS `rate` (
  `rate_id` int(255) NOT NULL AUTO_INCREMENT,
  `rate_amount` int(11) NOT NULL,
  `rate_amount_return` int(11) DEFAULT NULL,
  `rate_created_date` date DEFAULT NULL,
  `rate_created_by` int(11) DEFAULT NULL,
  `rate_modified_by` int(11) DEFAULT NULL,
  `rate_modified_date` date DEFAULT NULL,
  `rate_des` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  PRIMARY KEY (`rate_id`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- Dumping data for table rms_makro_home_stage.rate: ~0 rows (approximately)
DELETE FROM `rate`;
/*!40000 ALTER TABLE `rate` DISABLE KEYS */;
INSERT INTO `rate` (`rate_id`, `rate_amount`, `rate_amount_return`, `rate_created_date`, `rate_created_by`, `rate_modified_by`, `rate_modified_date`, `rate_des`) VALUES
	(1, 4000, 4100, '2016-05-23', 1, 19, '2018-12-26', 'This is rate');
/*!40000 ALTER TABLE `rate` ENABLE KEYS */;

-- Dumping structure for table rms_makro_home_stage.sale_detail
DROP TABLE IF EXISTS `sale_detail`;
CREATE TABLE IF NOT EXISTS `sale_detail` (
  `sale_detail_id` int(11) NOT NULL AUTO_INCREMENT,
  `sale_master_id` int(11) NOT NULL,
  `sale_detail_item_id` int(11) NOT NULL,
  `sale_detail_qty` int(11) DEFAULT '0',
  `sale_detail_unit_price` decimal(10,2) DEFAULT '0.00',
  `sale_detail_dis_us` decimal(10,2) DEFAULT '0.00',
  `sale_detail_dis_percent` decimal(10,2) DEFAULT '0.00',
  `sale_detail_printed` tinyint(1) DEFAULT '0',
  `sale_detail_note` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `sale_detail_status` tinyint(1) DEFAULT '1',
  `sale_detail_costing` decimal(10,2) DEFAULT NULL,
  `sale_detail_costing_json` varchar(500) COLLATE utf8_unicode_ci DEFAULT NULL,
  `sale_detail_create_date` datetime NOT NULL,
  `sale_detail_create_by` int(11) NOT NULL,
  `sale_detail_modified_date` datetime NOT NULL,
  `sale_detail_modified_by` int(11) NOT NULL,
  PRIMARY KEY (`sale_detail_id`)
) ENGINE=InnoDB AUTO_INCREMENT=317 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- Dumping data for table rms_makro_home_stage.sale_detail: ~305 rows (approximately)
DELETE FROM `sale_detail`;
/*!40000 ALTER TABLE `sale_detail` DISABLE KEYS */;
INSERT INTO `sale_detail` (`sale_detail_id`, `sale_master_id`, `sale_detail_item_id`, `sale_detail_qty`, `sale_detail_unit_price`, `sale_detail_dis_us`, `sale_detail_dis_percent`, `sale_detail_printed`, `sale_detail_note`, `sale_detail_status`, `sale_detail_costing`, `sale_detail_costing_json`, `sale_detail_create_date`, `sale_detail_create_by`, `sale_detail_modified_date`, `sale_detail_modified_by`) VALUES
	(1, 1, 20, 1, 6.00, 0.00, 0.00, 1, NULL, 0, NULL, NULL, '2019-01-24 20:14:36', 19, '2019-01-24 20:14:36', 19),
	(2, 1, 20, 1, 6.00, 0.00, 0.00, 1, NULL, 1, 0.00, '[]', '2019-01-24 20:18:22', 19, '2019-01-24 20:18:22', 19),
	(3, 1, 21, 1, 7.00, 0.00, 0.00, 1, NULL, 1, 0.00, '[]', '2019-01-24 20:18:23', 19, '2019-01-24 20:18:23', 19),
	(4, 1, 20, 1, 6.00, 0.00, 0.00, 1, NULL, 1, 0.00, '[]', '2019-01-24 21:12:46', 19, '2019-01-24 21:12:46', 19),
	(5, 2, 37, 1, 9.00, 0.00, 0.00, 1, NULL, 1, 0.00, '[]', '2019-01-24 21:27:50', 19, '2019-01-24 21:27:50', 19),
	(6, 2, 38, 1, 9.00, 0.00, 0.00, 1, NULL, 1, 0.00, '[]', '2019-01-24 21:27:50', 19, '2019-01-24 21:27:50', 19),
	(7, 3, 24, 1, 8.00, 0.00, 0.00, 1, NULL, 1, 0.00, '[]', '2019-01-24 21:28:15', 19, '2019-01-24 21:28:15', 19),
	(8, 3, 20, 1, 6.00, 0.00, 0.00, 1, NULL, 1, 0.00, '[]', '2019-01-24 21:28:15', 19, '2019-01-24 21:28:15', 19),
	(9, 4, 38, 1, 9.00, 0.00, 0.00, 1, NULL, 1, 0.00, '[]', '2019-01-24 21:33:05', 19, '2019-01-24 21:33:05', 19),
	(10, 4, 37, 1, 9.00, 0.00, 0.00, 1, NULL, 1, 0.00, '[]', '2019-01-24 21:33:06', 19, '2019-01-24 21:33:06', 19),
	(11, 5, 21, 1, 7.00, 0.00, 0.00, 1, NULL, 1, 0.00, '[]', '2019-01-24 21:39:15', 19, '2019-01-24 21:39:15', 19),
	(12, 5, 21, 1, 7.00, 0.00, 0.00, 1, NULL, 1, 0.00, '[]', '2019-01-24 21:39:15', 19, '2019-01-24 21:39:15', 19),
	(13, 6, 21, 1, 7.00, 0.00, 0.00, 1, NULL, 1, 0.00, '[]', '2019-01-24 21:44:45', 19, '2019-01-24 21:44:45', 19),
	(14, 6, 22, 1, 7.50, 0.00, 0.00, 1, NULL, 1, 0.00, '[]', '2019-01-24 21:44:45', 19, '2019-01-24 21:44:45', 19),
	(15, 6, 23, 1, 9.00, 0.00, 0.00, 1, NULL, 1, 0.00, '[]', '2019-01-24 21:44:45', 19, '2019-01-24 21:44:45', 19),
	(16, 6, 21, 1, 7.00, 0.00, 0.00, 1, NULL, 1, 0.00, '[]', '2019-01-24 21:44:46', 19, '2019-01-24 21:44:46', 19),
	(17, 7, 21, 1, 7.00, 0.00, 0.00, 1, NULL, 1, 0.00, '[]', '2019-01-24 21:46:14', 19, '2019-01-24 21:46:14', 19),
	(18, 7, 21, 1, 7.00, 0.00, 0.00, 1, NULL, 1, 0.00, '[]', '2019-01-24 21:46:14', 19, '2019-01-24 21:46:14', 19),
	(19, 7, 21, 1, 7.00, 0.00, 0.00, 1, NULL, 1, 0.00, '[]', '2019-01-24 21:46:14', 19, '2019-01-24 21:46:14', 19),
	(20, 8, 33, 1, 6.00, 0.00, 0.00, 1, NULL, 1, 0.00, '[]', '2019-01-24 21:47:07', 19, '2019-01-24 21:47:07', 19),
	(21, 8, 21, 1, 7.00, 0.00, 0.00, 1, NULL, 1, 0.00, '[]', '2019-01-24 21:51:04', 19, '2019-01-24 21:51:04', 19),
	(22, 9, 21, 1, 7.00, 0.00, 0.00, 1, NULL, 1, 0.00, '[]', '2019-01-24 21:52:50', 19, '2019-01-24 21:52:50', 19),
	(23, 9, 21, 1, 7.00, 0.00, 0.00, 1, NULL, 1, 0.00, '[]', '2019-01-24 21:52:50', 19, '2019-01-24 21:52:50', 19),
	(24, 10, 21, 1, 7.00, 0.00, 0.00, 1, NULL, 1, 0.00, '[]', '2019-01-24 21:56:31', 19, '2019-01-24 21:56:31', 19),
	(25, 10, 21, 1, 7.00, 0.00, 0.00, 1, NULL, 1, 0.00, '[]', '2019-01-24 21:56:31', 19, '2019-01-24 21:56:31', 19),
	(26, 11, 21, 1, 7.00, 0.00, 0.00, 1, NULL, 1, 0.00, '[]', '2019-01-24 21:56:53', 19, '2019-01-24 21:56:53', 19),
	(27, 11, 21, 1, 7.00, 0.00, 0.00, 1, NULL, 1, 0.00, '[]', '2019-01-24 21:56:53', 19, '2019-01-24 21:56:53', 19),
	(28, 12, 21, 1, 7.00, 0.00, 0.00, 1, NULL, 1, 0.00, '[]', '2019-01-24 21:57:25', 19, '2019-01-24 21:57:25', 19),
	(29, 12, 24, 1, 8.00, 0.00, 0.00, 1, NULL, 1, 0.00, '[]', '2019-01-24 21:57:29', 19, '2019-01-24 21:57:29', 19),
	(30, 13, 21, 1, 7.00, 0.00, 0.00, 1, NULL, 0, NULL, NULL, '2019-01-25 06:26:22', 19, '2019-01-25 06:26:22', 19),
	(31, 13, 19, 1, 6.00, 0.00, 0.00, 1, NULL, 0, NULL, NULL, '2019-01-25 06:34:53', 19, '2019-01-25 06:34:53', 19),
	(32, 13, 25, 1, 17.00, 0.00, 0.00, 1, NULL, 0, NULL, NULL, '2019-01-25 06:35:26', 19, '2019-01-25 06:35:26', 19),
	(33, 13, 19, 1, 6.00, 0.00, 0.00, 1, NULL, 1, 0.00, '[]', '2019-01-25 06:37:13', 38, '2019-01-25 06:37:13', 38),
	(34, 13, 19, 1, 6.00, 0.00, 0.00, 0, NULL, 0, NULL, NULL, '2019-01-25 06:38:54', 38, '2019-01-25 06:38:54', 38),
	(35, 13, 24, 1, 8.00, 0.00, 0.00, 0, NULL, 0, NULL, NULL, '2019-01-25 06:39:14', 38, '2019-01-25 06:39:14', 38),
	(36, 14, 22, 1, 7.50, 0.00, 0.00, 1, NULL, 1, 0.00, '[]', '2019-01-25 06:40:18', 38, '2019-01-25 06:40:18', 38),
	(37, 15, 29, 1, 4.00, 0.00, 0.00, 1, NULL, 1, 0.00, '[]', '2019-01-25 06:41:23', 38, '2019-01-25 06:41:23', 38),
	(38, 15, 33, 1, 6.00, 0.00, 0.00, 1, NULL, 1, 0.00, '[]', '2019-01-25 06:41:33', 38, '2019-01-25 06:41:33', 38),
	(39, 15, 39, 1, 2.00, 0.00, 0.00, 1, NULL, 1, 0.00, '[]', '2019-01-25 06:42:20', 38, '2019-01-25 06:42:20', 38),
	(40, 15, 44, 1, 4.50, 0.00, 0.00, 1, NULL, 1, 0.00, '[]', '2019-01-25 06:42:21', 38, '2019-01-25 06:42:21', 38),
	(41, 15, 43, 1, 4.00, 0.00, 0.00, 1, NULL, 1, 0.00, '[]', '2019-01-25 06:42:22', 38, '2019-01-25 06:42:22', 38),
	(42, 15, 43, 1, 4.00, 0.00, 0.00, 1, NULL, 1, 0.00, '[]', '2019-01-25 06:42:28', 38, '2019-01-25 06:42:28', 38),
	(43, 17, 19, 1, 6.00, 0.00, 0.00, 1, NULL, 1, 0.00, '[]', '2019-01-25 06:45:53', 38, '2019-01-25 06:45:53', 38),
	(44, 20, 21, 1, 7.00, 0.00, 0.00, 1, NULL, 1, 0.00, '[]', '2019-01-25 06:45:54', 38, '2019-01-25 06:45:54', 38),
	(45, 20, 22, 1, 7.50, 0.00, 0.00, 1, NULL, 1, 0.00, '[]', '2019-01-25 06:45:55', 38, '2019-01-25 06:45:55', 38),
	(46, 19, 26, 1, 17.00, 0.00, 0.00, 1, NULL, 1, 0.00, '[]', '2019-01-25 06:48:04', 38, '2019-01-25 06:48:04', 38),
	(47, 18, 29, 1, 4.00, 0.00, 0.00, 1, NULL, 1, 0.00, '[]', '2019-01-25 06:48:08', 38, '2019-01-25 06:48:08', 38),
	(48, 18, 38, 1, 9.00, 0.00, 0.00, 1, NULL, 1, 0.00, '[]', '2019-01-25 06:48:11', 38, '2019-01-25 06:48:11', 38),
	(49, 19, 66, 1, 1.00, 0.00, 0.00, 1, NULL, 1, 0.00, '[]', '2019-01-25 06:48:14', 38, '2019-01-25 06:48:14', 38),
	(50, 21, 25, 1, 17.00, 0.00, 0.00, 1, NULL, 1, 0.00, '[]', '2019-01-25 07:03:53', 38, '2019-01-25 07:03:53', 38),
	(51, 22, 19, 1, 6.00, 0.00, 0.00, 1, NULL, 1, 0.00, '[]', '2019-01-25 07:04:18', 38, '2019-01-25 07:04:18', 38),
	(52, 22, 21, 1, 7.00, 0.00, 0.00, 1, NULL, 1, 0.00, '[]', '2019-01-25 07:05:40', 38, '2019-01-25 07:05:40', 38),
	(53, 23, 19, 1, 6.00, 0.00, 0.00, 1, NULL, 1, 0.00, '[]', '2019-01-25 07:06:08', 38, '2019-01-25 07:06:08', 38),
	(54, 24, 19, 1, 6.00, 0.00, 0.00, 1, NULL, 1, 0.00, '[]', '2019-01-25 07:06:51', 38, '2019-01-25 07:06:51', 38),
	(55, 25, 19, 1, 6.00, 0.00, 0.00, 1, NULL, 1, 0.00, '[]', '2019-01-25 07:08:21', 38, '2019-01-25 07:08:21', 38),
	(56, 26, 19, 1, 6.00, 0.00, 0.00, 1, NULL, 1, 0.00, '[]', '2019-01-25 07:08:40', 38, '2019-01-25 07:08:40', 38),
	(57, 27, 31, 1, 6.00, 0.00, 0.00, 1, NULL, 1, 0.00, '[]', '2019-01-25 07:18:43', 38, '2019-01-25 07:18:43', 38),
	(58, 27, 28, 1, 5.00, 0.00, 0.00, 1, NULL, 1, 0.00, '[]', '2019-01-25 07:19:07', 38, '2019-01-25 07:19:07', 38),
	(59, 27, 26, 1, 17.00, 0.00, 0.00, 1, NULL, 1, 0.00, '[]', '2019-01-25 07:19:27', 38, '2019-01-25 07:19:27', 38),
	(60, 28, 31, 1, 6.00, 0.00, 0.00, 1, NULL, 1, 0.00, '[]', '2019-01-25 07:27:43', 38, '2019-01-25 07:27:43', 38),
	(61, 28, 66, 2, 1.00, 0.00, 0.00, 2, NULL, 1, 0.00, '[]', '2019-01-25 07:28:02', 38, '2019-01-25 07:28:02', 38),
	(62, 28, 42, 1, 3.00, 0.00, 0.00, 1, NULL, 1, 0.00, '[]', '2019-01-25 07:28:21', 38, '2019-01-25 07:28:21', 38),
	(63, 29, 50, 1, 10.50, 0.00, 0.00, 1, NULL, 1, 0.00, '[]', '2019-01-25 07:47:53', 38, '2019-01-25 07:47:53', 38),
	(64, 29, 67, 1, 1.00, 0.00, 0.00, 1, NULL, 1, 0.00, '[]', '2019-01-25 07:48:05', 38, '2019-01-25 07:48:05', 38),
	(65, 29, 43, 1, 4.00, 0.00, 0.00, 1, NULL, 1, 0.00, '[]', '2019-01-25 07:48:16', 38, '2019-01-25 07:48:16', 38),
	(66, 29, 22, 1, 7.50, 0.00, 0.00, 1, NULL, 1, 0.00, '[]', '2019-01-25 07:48:42', 38, '2019-01-25 07:48:42', 38),
	(67, 30, 38, 1, 9.00, 0.00, 0.00, 1, NULL, 1, 0.00, '[]', '2019-01-25 07:51:49', 38, '2019-01-25 07:51:49', 38),
	(68, 30, 37, 3, 9.00, 0.00, 0.00, 3, NULL, 1, 0.00, '[]', '2019-01-25 07:52:00', 38, '2019-01-25 07:52:00', 38),
	(69, 30, 35, 2, 5.00, 0.00, 0.00, 2, NULL, 1, 0.00, '[]', '2019-01-25 07:52:39', 38, '2019-01-25 07:52:39', 38),
	(70, 30, 67, 3, 1.00, 0.00, 0.00, 3, NULL, 1, 0.00, '[]', '2019-01-25 07:52:52', 38, '2019-01-25 07:52:52', 38),
	(71, 31, 21, 1, 7.00, 0.00, 0.00, 1, NULL, 1, 0.00, '[]', '2019-01-25 07:56:42', 38, '2019-01-25 07:56:42', 38),
	(72, 31, 28, 1, 5.00, 0.00, 0.00, 1, NULL, 1, 0.00, '[]', '2019-01-25 07:56:48', 38, '2019-01-25 07:56:48', 38),
	(73, 31, 66, 1, 1.00, 0.00, 0.00, 1, NULL, 1, 0.00, '[]', '2019-01-25 07:56:53', 38, '2019-01-25 07:56:53', 38),
	(74, 32, 67, 1, 1.00, 0.00, 0.00, 1, NULL, 1, 0.00, '[]', '2019-01-25 07:59:44', 38, '2019-01-25 07:59:44', 38),
	(75, 32, 38, 1, 9.00, 0.00, 0.00, 1, NULL, 1, 0.00, '[]', '2019-01-25 07:59:50', 38, '2019-01-25 07:59:50', 38),
	(76, 32, 42, 1, 3.00, 0.00, 0.00, 1, NULL, 1, 0.00, '[]', '2019-01-25 08:02:36', 38, '2019-01-25 08:02:36', 38),
	(77, 33, 58, 3, 3.00, 0.00, 0.00, 3, NULL, 1, 0.00, '[]', '2019-01-25 08:23:49', 38, '2019-01-25 08:23:49', 38),
	(78, 33, 56, 1, 3.00, 0.00, 0.00, 1, NULL, 1, 0.00, '[]', '2019-01-25 08:24:10', 38, '2019-01-25 08:24:10', 38),
	(79, 34, 55, 1, 2.50, 0.00, 0.00, 0, NULL, 0, NULL, NULL, '2019-01-25 08:29:07', 38, '2019-01-25 08:29:07', 38),
	(80, 34, 60, 1, 3.50, 0.00, 0.00, 0, NULL, 0, NULL, NULL, '2019-01-25 08:30:17', 38, '2019-01-25 08:30:17', 38),
	(81, 34, 55, 1, 2.50, 0.00, 0.00, 0, NULL, 0, NULL, NULL, '2019-01-25 08:34:57', 19, '2019-01-25 08:34:57', 19),
	(82, 34, 56, 1, 3.00, 0.00, 0.00, 0, NULL, 0, NULL, NULL, '2019-01-25 08:35:01', 19, '2019-01-25 08:35:01', 19),
	(83, 34, 57, 1, 2.50, 0.00, 0.00, 0, NULL, 0, NULL, NULL, '2019-01-25 08:35:04', 19, '2019-01-25 08:35:04', 19),
	(84, 34, 58, 1, 3.00, 0.00, 0.00, 0, NULL, 0, NULL, NULL, '2019-01-25 08:35:07', 19, '2019-01-25 08:35:07', 19),
	(85, 33, 66, 2, 1.00, 0.00, 0.00, 2, NULL, 1, 0.00, '[]', '2019-01-25 08:37:34', 19, '2019-01-25 08:37:34', 19),
	(86, 35, 58, 1, 3.00, 0.00, 0.00, 1, NULL, 1, 0.00, '[]', '2019-01-25 09:00:10', 19, '2019-01-25 09:00:10', 19),
	(87, 35, 66, 1, 1.00, 0.00, 0.00, 1, NULL, 1, 0.00, '[]', '2019-01-25 09:01:34', 19, '2019-01-25 09:01:34', 19),
	(88, 36, 57, 2, 2.50, 0.00, 0.00, 2, NULL, 1, 0.00, '[]', '2019-01-25 09:47:28', 19, '2019-01-25 09:47:28', 19),
	(89, 36, 66, 2, 1.00, 0.00, 0.00, 2, NULL, 1, 0.00, '[]', '2019-01-25 09:54:24', 19, '2019-01-25 09:54:24', 19),
	(90, 37, 58, 1, 3.00, 0.00, 0.00, 1, NULL, 1, 0.00, '[]', '2019-01-25 09:55:15', 19, '2019-01-25 09:55:15', 19),
	(91, 37, 66, 1, 1.00, 0.00, 0.00, 1, NULL, 1, 0.00, '[]', '2019-01-25 09:55:44', 19, '2019-01-25 09:55:44', 19),
	(92, 37, 46, 1, 10.50, 0.00, 0.00, 1, NULL, 1, 0.00, '[]', '2019-01-25 09:56:41', 19, '2019-01-25 09:56:41', 19),
	(93, 38, 58, 2, 3.00, 0.00, 0.00, 2, NULL, 1, 0.00, '[]', '2019-01-25 10:19:06', 19, '2019-01-25 10:19:06', 19),
	(94, 38, 66, 2, 1.00, 0.00, 0.00, 2, NULL, 1, 0.00, '[]', '2019-01-25 10:19:50', 19, '2019-01-25 10:19:50', 19),
	(95, 39, 56, 1, 3.00, 0.00, 0.00, 1, NULL, 1, 0.00, '[]', '2019-01-25 10:35:28', 19, '2019-01-25 10:35:28', 19),
	(96, 40, 57, 2, 2.50, 0.00, 0.00, 2, NULL, 1, 0.00, '[]', '2019-01-25 11:08:02', 19, '2019-01-25 11:08:02', 19),
	(97, 40, 67, 2, 1.00, 0.00, 0.00, 2, NULL, 1, 0.00, '[]', '2019-01-25 11:08:12', 19, '2019-01-25 11:08:12', 19),
	(98, 41, 34, 1, 8.50, 0.00, 0.00, 1, NULL, 0, NULL, NULL, '2019-01-25 11:19:46', 19, '2019-01-25 11:19:46', 19),
	(99, 41, 57, 2, 2.50, 0.00, 0.00, 2, NULL, 0, NULL, NULL, '2019-01-25 11:19:54', 19, '2019-01-25 11:19:54', 19),
	(100, 41, 66, 2, 1.00, 0.00, 0.00, 2, NULL, 0, NULL, NULL, '2019-01-25 11:20:00', 19, '2019-01-25 11:20:00', 19),
	(101, 41, 34, 1, 8.50, 0.00, 0.00, 1, NULL, 1, 0.00, '[]', '2019-01-25 11:23:23', 19, '2019-01-25 11:23:23', 19),
	(102, 41, 57, 2, 2.50, 0.00, 0.00, 2, NULL, 0, NULL, NULL, '2019-01-25 11:23:30', 19, '2019-01-25 11:23:30', 19),
	(103, 41, 66, 2, 1.00, 0.00, 0.00, 2, NULL, 0, NULL, NULL, '2019-01-25 11:23:38', 19, '2019-01-25 11:23:38', 19),
	(104, 41, 57, 2, 2.50, 0.00, 0.00, 2, NULL, 1, 0.00, '[]', '2019-01-25 11:24:13', 19, '2019-01-25 11:24:13', 19),
	(105, 41, 66, 2, 1.00, 0.00, 0.00, 2, NULL, 1, 0.00, '[]', '2019-01-25 11:24:21', 19, '2019-01-25 11:24:21', 19),
	(106, 42, 57, 1, 2.50, 0.00, 0.00, 1, NULL, 1, 0.00, '[]', '2019-01-25 11:26:25', 19, '2019-01-25 11:26:25', 19),
	(107, 42, 66, 1, 1.00, 0.00, 0.00, 1, NULL, 1, 0.00, '[]', '2019-01-25 11:26:34', 19, '2019-01-25 11:26:34', 19),
	(108, 43, 55, 1, 2.50, 0.00, 0.00, 1, NULL, 1, 0.00, '[]', '2019-01-25 11:44:30', 19, '2019-01-25 11:44:30', 19),
	(109, 44, 58, 1, 3.00, 0.00, 0.00, 1, NULL, 1, 0.00, '[]', '2019-01-25 11:46:41', 19, '2019-01-25 11:46:41', 19),
	(110, 44, 26, 1, 17.00, 0.00, 0.00, 1, NULL, 1, 0.00, '[]', '2019-01-25 11:46:49', 19, '2019-01-25 11:46:49', 19),
	(111, 44, 58, 1, 3.00, 0.00, 0.00, 1, NULL, 1, 0.00, '[]', '2019-01-25 11:47:30', 19, '2019-01-25 11:47:30', 19),
	(112, 44, 55, 1, 2.50, 0.00, 0.00, 1, NULL, 1, 0.00, '[]', '2019-01-25 11:47:40', 19, '2019-01-25 11:47:40', 19),
	(113, 44, 34, 1, 8.50, 0.00, 0.00, 1, NULL, 1, 0.00, '[]', '2019-01-25 11:48:08', 19, '2019-01-25 11:48:08', 19),
	(114, 45, 58, 1, 3.00, 0.00, 0.00, 1, NULL, 1, 0.00, '[]', '2019-01-25 11:56:01', 19, '2019-01-25 11:56:01', 19),
	(115, 45, 66, 1, 1.00, 0.00, 0.00, 1, NULL, 1, 0.00, '[]', '2019-01-25 11:56:05', 19, '2019-01-25 11:56:05', 19),
	(116, 46, 21, 1, 7.00, 0.00, 0.00, 1, NULL, 0, NULL, NULL, '2019-01-25 11:58:48', 19, '2019-01-25 11:58:48', 19),
	(117, 46, 28, 1, 5.00, 0.00, 0.00, 1, NULL, 1, 0.00, '[]', '2019-01-25 11:59:18', 19, '2019-01-25 11:59:18', 19),
	(118, 46, 67, 1, 1.00, 0.00, 0.00, 1, NULL, 1, 0.00, '[]', '2019-01-25 12:01:18', 19, '2019-01-25 12:01:18', 19),
	(119, 46, 66, 1, 1.00, 0.00, 0.00, 1, NULL, 1, 0.00, '[]', '2019-01-25 12:01:20', 19, '2019-01-25 12:01:20', 19),
	(120, 45, 23, 1, 9.00, 0.00, 0.00, 1, NULL, 1, 0.00, '[]', '2019-01-25 12:04:37', 19, '2019-01-25 12:04:37', 19),
	(121, 45, 58, 1, 3.00, 0.00, 0.00, 1, NULL, 1, 0.00, '[]', '2019-01-25 12:04:52', 19, '2019-01-25 12:04:52', 19),
	(122, 45, 39, 1, 2.00, 0.00, 0.00, 1, NULL, 0, NULL, NULL, '2019-01-25 12:05:06', 19, '2019-01-25 12:05:06', 19),
	(123, 46, 24, 1, 8.00, 0.00, 0.00, 1, NULL, 1, 0.00, '[]', '2019-01-25 12:12:14', 38, '2019-01-25 12:12:14', 38),
	(124, 44, 66, 4, 1.00, 0.00, 0.00, 4, NULL, 1, 0.00, '[]', '2019-01-25 12:21:03', 19, '2019-01-25 12:21:03', 19),
	(125, 47, 27, 1, 5.00, 0.00, 0.00, 1, NULL, 1, 0.00, '[]', '2019-01-25 12:46:26', 19, '2019-01-25 12:46:26', 19),
	(126, 47, 44, 1, 4.50, 0.00, 0.00, 1, NULL, 1, 0.00, '[]', '2019-01-25 12:47:01', 19, '2019-01-25 12:47:01', 19),
	(127, 47, 44, 1, 4.50, 0.00, 0.00, 1, NULL, 0, NULL, NULL, '2019-01-25 12:47:03', 19, '2019-01-25 12:47:03', 19),
	(128, 47, 19, 2, 6.00, 0.00, 0.00, 2, NULL, 1, 0.00, '[]', '2019-01-25 12:47:24', 19, '2019-01-25 12:47:24', 19),
	(129, 47, 19, 1, 6.00, 0.00, 0.00, 1, NULL, 0, NULL, NULL, '2019-01-25 12:47:28', 19, '2019-01-25 12:47:28', 19),
	(130, 47, 25, 1, 17.00, 0.00, 0.00, 1, NULL, 1, 0.00, '[]', '2019-01-25 12:47:51', 19, '2019-01-25 12:47:51', 19),
	(131, 47, 45, 1, 10.50, 0.00, 0.00, 1, NULL, 1, 0.00, '[]', '2019-01-25 12:48:02', 19, '2019-01-25 12:48:02', 19),
	(132, 47, 24, 1, 8.00, 0.00, 0.00, 1, NULL, 1, 0.00, '[]', '2019-01-25 12:48:16', 19, '2019-01-25 12:48:16', 19),
	(133, 48, 58, 1, 3.00, 0.00, 0.00, 1, NULL, 1, 0.00, '[]', '2019-01-25 12:50:49', 19, '2019-01-25 12:50:49', 19),
	(134, 49, 56, 1, 3.00, 0.00, 0.00, 1, NULL, 1, 0.00, '[]', '2019-01-25 12:53:56', 19, '2019-01-25 12:53:56', 19),
	(135, 47, 66, 2, 1.00, 0.00, 0.00, 2, NULL, 1, 0.00, '[]', '2019-01-25 12:54:52', 19, '2019-01-25 12:54:52', 19),
	(136, 47, 67, 2, 1.00, 0.00, 0.00, 4, NULL, 1, 0.00, '[]', '2019-01-25 12:54:57', 19, '2019-01-25 12:54:57', 19),
	(137, 50, 55, 1, 2.50, 0.00, 0.00, 1, NULL, 1, 0.00, '[]', '2019-01-25 13:25:44', 19, '2019-01-25 13:25:44', 19),
	(138, 50, 44, 2, 4.50, 0.00, 0.00, 2, NULL, 1, 0.00, '[]', '2019-01-25 13:26:38', 19, '2019-01-25 13:26:38', 19),
	(139, 50, 66, 1, 1.00, 0.00, 0.00, 1, NULL, 1, 0.00, '[]', '2019-01-25 13:52:22', 19, '2019-01-25 13:52:22', 19),
	(140, 51, 55, 1, 2.50, 0.00, 0.00, 1, NULL, 0, NULL, NULL, '2019-01-25 13:53:53', 19, '2019-01-25 13:53:53', 19),
	(141, 51, 57, 2, 2.50, 0.00, 0.00, 2, NULL, 1, 0.00, '[]', '2019-01-25 13:54:17', 19, '2019-01-25 13:54:17', 19),
	(142, 52, 26, 1, 17.00, 0.00, 0.00, 1, NULL, 1, 0.00, '[]', '2019-01-25 13:56:13', 19, '2019-01-25 13:56:13', 19),
	(143, 53, 44, 1, 4.50, 0.00, 0.00, 1, NULL, 1, 0.00, '[]', '2019-01-25 14:10:52', 19, '2019-01-25 14:10:52', 19),
	(144, 53, 23, 1, 9.00, 0.00, 0.00, 1, NULL, 1, 0.00, '[]', '2019-01-25 14:11:41', 19, '2019-01-25 14:11:41', 19),
	(145, 53, 27, 1, 5.00, 0.00, 0.00, 1, NULL, 1, 0.00, '[]', '2019-01-25 14:12:01', 19, '2019-01-25 14:12:01', 19),
	(146, 53, 66, 2, 1.00, 0.00, 0.00, 2, NULL, 1, 0.00, '[]', '2019-01-25 14:12:08', 19, '2019-01-25 14:12:08', 19),
	(147, 53, 61, 1, 3.00, 0.00, 0.00, 1, NULL, 1, 0.00, '[]', '2019-01-25 14:12:20', 19, '2019-01-25 14:12:20', 19),
	(148, 54, 58, 1, 3.00, 0.00, 0.00, 0, NULL, 0, NULL, NULL, '2019-01-25 14:29:57', 19, '2019-01-25 14:29:57', 19),
	(149, 55, 44, 1, 4.50, 0.00, 0.00, 0, NULL, 0, NULL, NULL, '2019-01-25 14:31:55', 19, '2019-01-25 14:31:55', 19),
	(150, 55, 19, 1, 6.00, 0.00, 0.00, 0, NULL, 0, NULL, NULL, '2019-01-25 14:32:32', 19, '2019-01-25 14:32:32', 19),
	(151, 55, 27, 1, 5.00, 0.00, 0.00, 0, NULL, 0, NULL, NULL, '2019-01-25 14:32:55', 19, '2019-01-25 14:32:55', 19),
	(152, 55, 66, 1, 1.00, 0.00, 0.00, 0, NULL, 0, NULL, NULL, '2019-01-25 14:33:00', 19, '2019-01-25 14:33:00', 19),
	(153, 56, 27, 1, 5.00, 0.00, 0.00, 1, NULL, 1, 0.00, '[]', '2019-01-25 14:34:49', 19, '2019-01-25 14:34:49', 19),
	(154, 56, 67, 1, 1.00, 0.00, 0.00, 1, NULL, 1, 0.00, '[]', '2019-01-25 14:34:54', 19, '2019-01-25 14:34:54', 19),
	(155, 57, 55, 1, 2.50, 0.00, 0.00, 0, NULL, 0, NULL, NULL, '2019-01-25 14:43:27', 19, '2019-01-25 14:43:27', 19),
	(156, 57, 57, 1, 2.50, 0.00, 0.00, 0, NULL, 0, NULL, NULL, '2019-01-25 14:43:50', 19, '2019-01-25 14:43:50', 19),
	(157, 58, 24, 1, 8.00, 0.00, 0.00, 0, NULL, 0, NULL, NULL, '2019-01-25 14:55:18', 19, '2019-01-25 14:55:18', 19),
	(158, 59, 19, 1, 6.00, 0.00, 0.00, 0, NULL, 0, NULL, NULL, '2019-01-25 15:00:53', 19, '2019-01-25 15:00:53', 19),
	(159, 62, 19, 1, 6.00, 0.00, 0.00, 0, NULL, 0, NULL, NULL, '2019-01-25 15:03:03', 19, '2019-01-25 15:03:03', 19),
	(160, 60, 24, 1, 8.00, 0.00, 0.00, 0, NULL, 0, NULL, NULL, '2019-01-25 15:03:16', 19, '2019-01-25 15:03:16', 19),
	(161, 63, 57, 1, 2.50, 0.00, 0.00, 1, NULL, 1, 0.00, '[]', '2019-01-25 15:22:10', 19, '2019-01-25 15:22:10', 19),
	(162, 63, 55, 1, 2.50, 0.00, 0.00, 1, NULL, 1, 0.00, '[]', '2019-01-25 15:22:46', 19, '2019-01-25 15:22:46', 19),
	(163, 63, 57, 1, 2.50, 0.00, 0.00, 1, NULL, 1, 0.00, '[]', '2019-01-25 15:23:17', 19, '2019-01-25 15:23:17', 19),
	(164, 64, 44, 1, 4.50, 0.00, 0.00, 1, NULL, 1, 0.00, '[]', '2019-01-25 15:41:56', 19, '2019-01-25 15:41:56', 19),
	(165, 64, 55, 1, 2.50, 0.00, 0.00, 1, NULL, 1, 0.00, '[]', '2019-01-25 15:42:04', 19, '2019-01-25 15:42:04', 19),
	(166, 64, 37, 1, 9.00, 0.00, 0.00, 1, NULL, 1, 0.00, '[]', '2019-01-25 15:42:17', 19, '2019-01-25 15:42:17', 19),
	(167, 64, 61, 1, 3.00, 0.00, 0.00, 1, NULL, 1, 0.00, '[]', '2019-01-25 15:42:48', 19, '2019-01-25 15:42:48', 19),
	(168, 64, 55, 1, 2.50, 0.00, 0.00, 1, NULL, 1, 0.00, '[]', '2019-01-25 16:08:10', 19, '2019-01-25 16:08:10', 19),
	(169, 64, 55, 1, 2.50, 0.00, 0.00, 1, NULL, 1, 0.00, '[]', '2019-01-25 16:08:10', 19, '2019-01-25 16:08:10', 19),
	(170, 65, 58, 1, 3.00, 0.00, 0.00, 1, NULL, 1, 0.00, '[]', '2019-01-25 16:27:07', 19, '2019-01-25 16:27:07', 19),
	(171, 65, 66, 1, 1.00, 0.00, 0.00, 1, NULL, 1, 0.00, '[]', '2019-01-25 16:27:11', 19, '2019-01-25 16:27:11', 19),
	(172, 66, 27, 1, 5.00, 0.00, 0.00, 1, NULL, 0, NULL, NULL, '2019-01-25 16:36:11', 19, '2019-01-25 16:36:11', 19),
	(173, 66, 25, 1, 17.00, 0.00, 0.00, 1, NULL, 0, NULL, NULL, '2019-01-25 16:36:30', 19, '2019-01-25 16:36:30', 19),
	(174, 66, 57, 2, 2.50, 0.00, 0.00, 2, NULL, 1, 0.00, '[]', '2019-01-25 16:48:29', 19, '2019-01-25 16:48:29', 19),
	(175, 66, 66, 2, 1.00, 0.00, 0.00, 2, NULL, 1, 0.00, '[]', '2019-01-25 16:48:38', 19, '2019-01-25 16:48:38', 19),
	(176, 67, 55, 2, 2.50, 0.00, 0.00, 2, NULL, 1, 0.00, '[]', '2019-01-25 17:22:28', 39, '2019-01-25 17:22:28', 39),
	(177, 67, 66, 1, 1.00, 0.00, 0.00, 1, NULL, 0, NULL, NULL, '2019-01-25 17:22:37', 39, '2019-01-25 17:22:37', 39),
	(178, 67, 67, 1, 1.00, 0.00, 0.00, 1, NULL, 1, 0.00, '[]', '2019-01-25 17:22:49', 39, '2019-01-25 17:22:49', 39),
	(179, 68, 26, 1, 17.00, 0.00, 0.00, 1, NULL, 1, 0.00, '[]', '2019-01-25 18:24:49', 39, '2019-01-25 18:24:49', 39),
	(180, 68, 42, 1, 3.00, 0.00, 0.00, 1, NULL, 1, 0.00, '[]', '2019-01-25 18:25:32', 39, '2019-01-25 18:25:32', 39),
	(181, 68, 66, 1, 1.00, 0.00, 0.00, 1, NULL, 1, 0.00, '[]', '2019-01-25 18:25:36', 39, '2019-01-25 18:25:36', 39),
	(182, 69, 55, 3, 2.50, 0.00, 0.00, 3, NULL, 1, 0.00, '[]', '2019-01-25 18:58:27', 39, '2019-01-25 18:58:27', 39),
	(183, 69, 66, 3, 1.00, 0.00, 0.00, 3, NULL, 1, 0.00, '[]', '2019-01-25 18:58:37', 39, '2019-01-25 18:58:37', 39),
	(184, 70, 55, 2, 2.50, 0.00, 0.00, 2, NULL, 1, 0.00, '[]', '2019-01-25 18:59:03', 39, '2019-01-25 18:59:03', 39),
	(185, 70, 66, 1, 1.00, 0.00, 0.00, 1, NULL, 1, 0.00, '[]', '2019-01-25 18:59:10', 39, '2019-01-25 18:59:10', 39),
	(186, 71, 55, 1, 2.50, 0.00, 0.00, 1, NULL, 1, 0.00, '[]', '2019-01-25 18:59:46', 39, '2019-01-25 18:59:46', 39),
	(187, 71, 55, 1, 2.50, 0.00, 0.00, 1, NULL, 1, 0.00, '[]', '2019-01-25 19:01:42', 39, '2019-01-25 19:01:42', 39),
	(188, 72, 55, 6, 2.50, 0.00, 0.00, 6, NULL, 0, NULL, NULL, '2019-01-25 19:02:49', 39, '2019-01-25 19:02:49', 39),
	(189, 72, 59, 6, 3.00, 0.00, 0.00, 6, NULL, 1, 0.00, '[]', '2019-01-25 19:03:07', 39, '2019-01-25 19:03:07', 39),
	(190, 73, 55, 1, 2.50, 0.00, 0.00, 1, NULL, 0, NULL, NULL, '2019-01-25 19:07:35', 39, '2019-01-25 19:07:35', 39),
	(191, 73, 55, 2, 2.50, 0.00, 0.00, 2, NULL, 1, 0.00, '[]', '2019-01-25 19:07:53', 39, '2019-01-25 19:07:53', 39),
	(192, 73, 66, 1, 1.00, 0.00, 0.00, 1, NULL, 1, 0.00, '[]', '2019-01-25 19:07:59', 39, '2019-01-25 19:07:59', 39),
	(193, 74, 57, 3, 2.50, 0.00, 0.00, 3, NULL, 1, 0.00, '[]', '2019-01-25 19:09:58', 39, '2019-01-25 19:09:58', 39),
	(194, 74, 38, 1, 9.00, 0.00, 0.00, 1, NULL, 1, 0.00, '[]', '2019-01-25 19:10:14', 39, '2019-01-25 19:10:14', 39),
	(195, 74, 67, 3, 1.00, 0.00, 0.00, 3, NULL, 1, 0.00, '[]', '2019-01-25 19:10:22', 39, '2019-01-25 19:10:22', 39),
	(196, 75, 55, 2, 2.50, 0.00, 0.00, 2, NULL, 1, 0.00, '[]', '2019-01-25 19:10:49', 39, '2019-01-25 19:10:49', 39),
	(197, 75, 28, 1, 5.00, 0.00, 0.00, 1, NULL, 1, 0.00, '[]', '2019-01-25 19:11:12', 39, '2019-01-25 19:11:12', 39),
	(198, 76, 57, 1, 2.50, 0.00, 0.00, 3, NULL, 1, 0.00, '[]', '2019-01-25 19:14:09', 39, '2019-01-25 19:14:09', 39),
	(199, 77, 55, 3, 2.50, 0.00, 0.00, 3, NULL, 1, 0.00, '[]', '2019-01-25 19:17:03', 39, '2019-01-25 19:17:03', 39),
	(200, 77, 56, 1, 3.00, 0.00, 0.00, 1, NULL, 1, 0.00, '[]', '2019-01-25 19:17:15', 39, '2019-01-25 19:17:15', 39),
	(201, 78, 57, 1, 2.50, 0.00, 0.00, 1, NULL, 1, 0.00, '[]', '2019-01-25 19:18:07', 39, '2019-01-25 19:18:07', 39),
	(202, 78, 66, 1, 1.00, 0.00, 0.00, 1, NULL, 1, 0.00, '[]', '2019-01-25 19:18:13', 39, '2019-01-25 19:18:13', 39),
	(203, 79, 55, 3, 2.50, 0.00, 0.00, 3, NULL, 1, 0.00, '[]', '2019-01-25 19:21:50', 39, '2019-01-25 19:21:50', 39),
	(204, 79, 66, 2, 1.00, 1.00, 0.00, 2, NULL, 1, 0.00, '[]', '2019-01-25 19:21:53', 39, '2019-01-25 19:21:53', 39),
	(205, 80, 55, 2, 2.50, 0.00, 0.00, 2, NULL, 1, 0.00, '[]', '2019-01-25 19:22:45', 39, '2019-01-25 19:22:45', 39),
	(206, 80, 66, 2, 1.00, 1.00, 0.00, 2, NULL, 1, 0.00, '[]', '2019-01-25 19:22:49', 39, '2019-01-25 19:22:49', 39),
	(207, 76, 55, 3, 2.50, 0.00, 0.00, 3, NULL, 1, 0.00, '[]', '2019-01-25 19:24:30', 39, '2019-01-25 19:24:30', 39),
	(208, 81, 55, 1, 2.50, 0.00, 0.00, 1, NULL, 1, 0.00, '[]', '2019-01-25 19:26:31', 39, '2019-01-25 19:26:31', 39),
	(209, 81, 55, 1, 2.50, 0.00, 0.00, 1, NULL, 0, NULL, NULL, '2019-01-25 19:26:39', 39, '2019-01-25 19:26:39', 39),
	(210, 81, 56, 1, 3.00, 0.00, 0.00, 1, NULL, 1, 0.00, '[]', '2019-01-25 19:26:44', 39, '2019-01-25 19:26:44', 39),
	(211, 81, 66, 1, 1.00, 0.00, 0.00, 1, NULL, 1, 0.00, '[]', '2019-01-25 19:27:34', 39, '2019-01-25 19:27:34', 39),
	(212, 81, 67, 1, 1.00, 0.00, 0.00, 1, NULL, 1, 0.00, '[]', '2019-01-25 19:27:36', 39, '2019-01-25 19:27:36', 39),
	(213, 82, 55, 4, 2.50, 0.00, 0.00, 4, NULL, 1, 0.00, '[]', '2019-01-25 19:27:54', 39, '2019-01-25 19:27:54', 39),
	(214, 90, 55, 3, 2.50, 0.00, 0.00, 3, NULL, 1, 0.00, '[]', '2019-01-25 19:38:23', 39, '2019-01-25 19:38:23', 39),
	(215, 102, 59, 3, 3.00, 0.00, 0.00, 3, NULL, 0, NULL, NULL, '2019-01-25 19:44:14', 39, '2019-01-25 19:44:14', 39),
	(216, 102, 22, 1, 7.50, 0.00, 0.00, 1, NULL, 0, NULL, NULL, '2019-01-25 19:45:45', 39, '2019-01-25 19:45:45', 39),
	(217, 84, 57, 4, 2.50, 0.00, 0.00, 4, NULL, 1, 0.00, '[]', '2019-01-25 19:46:22', 39, '2019-01-25 19:46:22', 39),
	(218, 85, 55, 3, 2.50, 0.00, 0.00, 4, NULL, 1, 0.00, '[]', '2019-01-25 19:46:56', 39, '2019-01-25 19:46:56', 39),
	(219, 86, 55, 1, 2.50, 0.00, 0.00, 2, NULL, 1, 0.00, '[]', '2019-01-25 19:50:16', 39, '2019-01-25 19:50:16', 39),
	(220, 86, 66, 1, 1.00, 0.00, 0.00, 1, NULL, 1, 0.00, '[]', '2019-01-25 19:50:21', 39, '2019-01-25 19:50:21', 39),
	(221, 86, 67, 2, 1.00, 0.00, 0.00, 2, NULL, 1, 0.00, '[]', '2019-01-25 19:50:27', 39, '2019-01-25 19:50:27', 39),
	(222, 82, 55, 1, 2.50, 0.00, 0.00, 1, NULL, 0, NULL, NULL, '2019-01-25 19:50:42', 39, '2019-01-25 19:50:42', 39),
	(223, 74, 66, 2, 1.00, 0.00, 0.00, 2, NULL, 1, 0.00, '[]', '2019-01-25 19:56:30', 39, '2019-01-25 19:56:30', 39),
	(224, 87, 57, 2, 2.50, 0.00, 0.00, 2, NULL, 1, 0.00, '[]', '2019-01-25 20:01:59', 39, '2019-01-25 20:01:59', 39),
	(225, 88, 66, 1, 1.00, 0.00, 0.00, 1, NULL, 1, 0.00, '[]', '2019-01-25 20:04:32', 39, '2019-01-25 20:04:32', 39),
	(226, 88, 55, 2, 2.50, 0.00, 0.00, 2, NULL, 1, 0.00, '[]', '2019-01-25 20:04:46', 39, '2019-01-25 20:04:46', 39),
	(227, 105, 26, 1, 17.00, 0.00, 0.00, 1, NULL, 1, 0.00, '[]', '2019-01-25 20:09:03', 39, '2019-01-25 20:09:03', 39),
	(228, 84, 66, 1, 1.00, 0.00, 0.00, 1, NULL, 1, 0.00, '[]', '2019-01-25 20:11:46', 39, '2019-01-25 20:11:46', 39),
	(229, 98, 30, 1, 5.00, 0.00, 0.00, 1, NULL, 1, 0.00, '[]', '2019-01-25 20:15:06', 39, '2019-01-25 20:15:06', 39),
	(230, 98, 28, 1, 5.00, 0.00, 0.00, 1, NULL, 1, 0.00, '[]', '2019-01-25 20:15:38', 39, '2019-01-25 20:15:38', 39),
	(231, 98, 34, 1, 8.50, 0.00, 0.00, 1, NULL, 1, 0.00, '[]', '2019-01-25 20:16:16', 39, '2019-01-25 20:16:16', 39),
	(232, 90, 66, 1, 1.00, 0.00, 0.00, 1, NULL, 1, 0.00, '[]', '2019-01-25 20:19:11', 39, '2019-01-25 20:19:11', 39),
	(233, 90, 67, 1, 1.00, 0.00, 0.00, 1, NULL, 1, 0.00, '[]', '2019-01-25 20:19:17', 39, '2019-01-25 20:19:17', 39),
	(234, 92, 55, 1, 2.50, 0.00, 0.00, 1, NULL, 0, NULL, NULL, '2019-01-25 20:21:35', 39, '2019-01-25 20:21:35', 39),
	(235, 93, 55, 1, 2.50, 0.00, 0.00, 1, NULL, 0, NULL, NULL, '2019-01-25 20:22:24', 39, '2019-01-25 20:22:24', 39),
	(236, 94, 19, 1, 6.00, 0.00, 0.00, 1, NULL, 1, 0.00, '[]', '2019-01-25 20:22:55', 39, '2019-01-25 20:22:55', 39),
	(237, 94, 26, 1, 17.00, 0.00, 0.00, 1, NULL, 1, 0.00, '[]', '2019-01-25 20:23:07', 39, '2019-01-25 20:23:07', 39),
	(238, 101, 66, 2, 1.00, 0.00, 0.00, 2, NULL, 0, NULL, NULL, '2019-01-25 20:23:12', 39, '2019-01-25 20:23:12', 39),
	(239, 97, 55, 1, 2.50, 0.00, 0.00, 1, NULL, 0, NULL, NULL, '2019-01-25 20:24:08', 39, '2019-01-25 20:24:08', 39),
	(240, 95, 66, 1, 1.00, 0.50, 0.00, 1, NULL, 1, 0.00, '[]', '2019-01-25 20:24:13', 39, '2019-01-25 20:24:13', 39),
	(241, 95, 67, 1, 1.00, 0.30, 0.00, 5, NULL, 1, 0.00, '[]', '2019-01-25 20:24:15', 39, '2019-01-25 20:24:15', 39),
	(242, 96, 34, 1, 8.50, 0.00, 0.00, 1, NULL, 1, 0.00, '[]', '2019-01-25 20:24:33', 39, '2019-01-25 20:24:33', 39),
	(243, 104, 67, 4, 1.00, 0.00, 0.00, 4, NULL, 1, 0.00, '[]', '2019-01-25 20:33:40', 39, '2019-01-25 20:33:40', 39),
	(244, 99, 66, 1, 0.50, 0.00, 0.00, 1, NULL, 1, 0.00, '[]', '2019-01-25 20:41:05', 39, '2019-01-25 20:41:05', 39),
	(245, 93, 38, 1, 9.00, 0.00, 0.00, 1, NULL, 1, 0.00, '[]', '2019-01-25 20:44:03', 39, '2019-01-25 20:44:03', 39),
	(246, 93, 66, 3, 0.50, 0.00, 0.00, 3, NULL, 1, 0.00, '[]', '2019-01-25 20:44:06', 39, '2019-01-25 20:44:06', 39),
	(247, 93, 66, 1, 0.50, 0.00, 0.00, 1, NULL, 0, NULL, NULL, '2019-01-25 20:44:06', 39, '2019-01-25 20:44:06', 39),
	(248, 100, 66, 1, 0.50, 0.00, 0.00, 1, NULL, 1, 0.00, '[]', '2019-01-25 20:44:45', 39, '2019-01-25 20:44:45', 39),
	(249, 83, 37, 1, 9.00, 0.00, 0.00, 1, NULL, 1, 0.00, '[]', '2019-01-25 20:51:01', 39, '2019-01-25 20:51:01', 39),
	(250, 83, 22, 1, 7.50, 0.00, 0.00, 1, NULL, 1, 0.00, '[]', '2019-01-25 20:51:05', 39, '2019-01-25 20:51:05', 39),
	(251, 104, 38, 1, 9.00, 0.00, 0.00, 1, NULL, 1, 0.00, '[]', '2019-01-25 20:52:18', 39, '2019-01-25 20:52:18', 39),
	(252, 104, 66, 2, 0.50, 0.00, 0.00, 2, NULL, 1, 0.00, '[]', '2019-01-25 20:52:25', 39, '2019-01-25 20:52:25', 39),
	(253, 105, 55, 3, 2.50, 0.00, 0.00, 3, NULL, 1, 0.00, '[]', '2019-01-25 20:55:03', 39, '2019-01-25 20:55:03', 39),
	(254, 105, 66, 1, 0.50, 0.00, 0.00, 1, NULL, 1, 0.00, '[]', '2019-01-25 20:55:15', 39, '2019-01-25 20:55:15', 39),
	(255, 103, 38, 1, 9.00, 0.00, 0.00, 1, NULL, 1, 0.00, '[]', '2019-01-25 20:56:47', 39, '2019-01-25 20:56:47', 39),
	(256, 103, 28, 4, 5.00, 0.00, 0.00, 4, NULL, 1, 0.00, '[]', '2019-01-25 20:57:14', 39, '2019-01-25 20:57:14', 39),
	(257, 103, 25, 1, 17.00, 0.00, 0.00, 1, NULL, 1, 0.00, '[]', '2019-01-25 20:57:22', 39, '2019-01-25 20:57:22', 39),
	(258, 103, 67, 6, 0.70, 0.00, 0.00, 6, NULL, 1, 0.00, '[]', '2019-01-25 20:57:36', 39, '2019-01-25 20:57:36', 39),
	(259, 103, 26, 2, 17.00, 0.00, 0.00, 2, NULL, 1, 0.00, '[]', '2019-01-25 20:57:43', 39, '2019-01-25 20:57:43', 39),
	(260, 103, 19, 1, 6.00, 0.00, 0.00, 1, NULL, 0, NULL, NULL, '2019-01-25 20:57:55', 39, '2019-01-25 20:57:55', 39),
	(261, 103, 21, 1, 7.00, 0.00, 0.00, 1, NULL, 1, 0.00, '[]', '2019-01-25 20:58:30', 39, '2019-01-25 20:58:30', 39),
	(262, 103, 42, 3, 3.00, 0.00, 0.00, 3, NULL, 1, 0.00, '[]', '2019-01-25 20:58:45', 39, '2019-01-25 20:58:45', 39),
	(263, 105, 42, 1, 3.00, 0.00, 0.00, 1, NULL, 0, NULL, NULL, '2019-01-25 21:05:48', 39, '2019-01-25 21:05:48', 39),
	(264, 103, 66, 5, 0.50, 0.00, 0.00, 5, NULL, 1, 0.00, '[]', '2019-01-25 21:07:53', 19, '2019-01-25 21:07:53', 19),
	(265, 106, 19, 1, 6.00, 0.00, 0.00, 1, NULL, 1, 0.00, '[]', '2019-01-25 21:12:25', 19, '2019-01-25 21:12:25', 19),
	(266, 106, 25, 1, 17.00, 0.00, 0.00, 1, NULL, 1, 0.00, '[]', '2019-01-25 21:13:29', 19, '2019-01-25 21:13:29', 19),
	(267, 101, 34, 1, 8.50, 0.00, 0.00, 1, NULL, 1, 0.00, '[]', '2019-01-25 21:23:40', 19, '2019-01-25 21:23:40', 19),
	(268, 101, 67, 1, 0.70, 0.00, 0.00, 1, NULL, 1, 0.00, '[]', '2019-01-25 21:23:45', 19, '2019-01-25 21:23:45', 19),
	(269, 107, 38, 1, 9.00, 0.00, 0.00, 1, NULL, 1, 0.00, '[]', '2019-01-25 21:26:07', 19, '2019-01-25 21:26:07', 19),
	(270, 107, 67, 1, 0.70, 0.00, 0.00, 1, NULL, 1, 0.00, '[]', '2019-01-25 21:26:12', 19, '2019-01-25 21:26:12', 19),
	(271, 108, 37, 1, 9.00, 0.00, 0.00, 1, NULL, 1, 0.00, '[]', '2019-01-25 21:31:28', 19, '2019-01-25 21:31:28', 19),
	(272, 108, 67, 2, 0.70, 0.00, 0.00, 2, NULL, 1, 0.00, '[]', '2019-01-25 21:31:36', 19, '2019-01-25 21:31:36', 19),
	(273, 108, 21, 1, 7.00, 0.00, 0.00, 1, NULL, 1, 0.00, '[]', '2019-01-25 21:31:51', 19, '2019-01-25 21:31:51', 19),
	(274, 108, 21, 1, 7.00, 0.00, 0.00, 1, NULL, 0, NULL, NULL, '2019-01-25 21:32:19', 19, '2019-01-25 21:32:19', 19),
	(275, 108, 66, 1, 0.50, 0.00, 0.00, 1, NULL, 1, 0.00, '[]', '2019-01-25 21:32:24', 19, '2019-01-25 21:32:24', 19),
	(276, 102, 38, 1, 9.00, 0.00, 0.00, 1, NULL, 1, 0.00, '[]', '2019-01-25 21:35:06', 19, '2019-01-25 21:35:06', 19),
	(277, 102, 28, 1, 5.00, 0.00, 0.00, 1, NULL, 1, 0.00, '[]', '2019-01-25 21:35:16', 19, '2019-01-25 21:35:16', 19),
	(278, 102, 67, 3, 0.70, 0.00, 0.00, 3, NULL, 1, 0.00, '[]', '2019-01-25 21:38:53', 19, '2019-01-25 21:38:53', 19),
	(279, 103, 28, 1, 5.00, 0.00, 0.00, 1, NULL, 0, NULL, NULL, '2019-01-25 21:43:42', 19, '2019-01-25 21:43:42', 19),
	(280, 107, 66, 1, 0.50, 0.00, 0.00, 1, NULL, 1, 0.00, '[]', '2019-01-25 21:56:39', 19, '2019-01-25 21:56:39', 19),
	(281, 109, 67, 2, 0.70, 0.00, 0.00, 2, NULL, 1, 0.00, '[]', '2019-01-25 22:00:16', 19, '2019-01-25 22:00:16', 19),
	(282, 110, 67, 1, 0.70, 0.00, 0.00, 1, NULL, 1, 0.00, '[]', '2019-01-25 22:02:18', 19, '2019-01-25 22:02:18', 19),
	(283, 111, 66, 1, 0.50, 0.00, 0.00, 1, NULL, 1, 0.00, '[]', '2019-01-25 22:09:26', 19, '2019-01-25 22:09:26', 19),
	(284, 112, 66, 1, 0.50, 0.00, 0.00, 1, NULL, 1, 0.00, '[]', '2019-01-25 22:10:23', 19, '2019-01-25 22:10:23', 19),
	(285, 113, 57, 2, 2.50, 0.00, 0.00, 2, NULL, 1, 0.00, '[]', '2019-01-26 09:35:12', 38, '2019-01-26 09:35:12', 38),
	(286, 113, 57, 1, 2.50, 0.00, 0.00, 1, NULL, 1, 0.00, '[]', '2019-01-26 09:35:20', 38, '2019-01-26 09:35:20', 38),
	(287, 113, 66, 1, 0.50, 0.00, 0.00, 1, NULL, 1, 0.00, '[]', '2019-01-26 09:54:50', 38, '2019-01-26 09:54:50', 38),
	(288, 114, 55, 1, 2.50, 0.00, 0.00, 1, NULL, 1, 0.00, '[]', '2019-01-26 10:30:27', 38, '2019-01-26 10:30:27', 38),
	(289, 114, 57, 1, 2.50, 0.00, 0.00, 1, NULL, 1, 0.00, '[]', '2019-01-26 10:30:32', 38, '2019-01-26 10:30:32', 38),
	(290, 114, 44, 1, 4.50, 0.00, 0.00, 1, NULL, 1, 0.00, '[]', '2019-01-26 10:30:39', 38, '2019-01-26 10:30:39', 38),
	(291, 114, 66, 1, 0.50, 0.00, 0.00, 1, NULL, 1, 0.00, '[]', '2019-01-26 10:33:49', 38, '2019-01-26 10:33:49', 38),
	(292, 115, 55, 1, 2.50, 0.00, 0.00, 0, NULL, 0, NULL, NULL, '2019-01-26 11:41:51', 38, '2019-01-26 11:41:51', 38),
	(293, 116, 56, 4, 3.00, 0.00, 0.00, 4, NULL, 1, 0.00, '[]', '2019-01-26 11:44:48', 38, '2019-01-26 11:44:48', 38),
	(294, 116, 66, 1, 0.50, 0.00, 0.00, 1, NULL, 1, 0.00, '[]', '2019-01-26 11:44:56', 38, '2019-01-26 11:44:56', 38),
	(295, 117, 19, 1, 6.00, 0.00, 0.00, 1, NULL, 0, NULL, NULL, '2019-01-26 12:02:08', 19, '2019-01-26 12:02:08', 19),
	(296, 117, 21, 1, 7.00, 0.00, 0.00, 1, NULL, 0, NULL, NULL, '2019-01-26 12:14:21', 19, '2019-01-26 12:14:21', 19),
	(297, 118, 37, 1, 9.00, 0.00, 0.00, 1, NULL, 1, NULL, NULL, '2019-01-26 12:15:56', 19, '2019-01-26 12:15:56', 19),
	(298, 119, 44, 1, 4.50, 0.00, 0.00, 1, NULL, 0, NULL, NULL, '2019-01-26 12:16:20', 19, '2019-01-26 12:16:20', 19),
	(299, 118, 44, 1, 4.50, 0.00, 0.00, 1, NULL, 1, NULL, NULL, '2019-01-26 12:16:52', 19, '2019-01-26 12:16:52', 19),
	(300, 118, 28, 1, 5.00, 0.00, 0.00, 1, NULL, 1, NULL, NULL, '2019-01-26 12:16:58', 19, '2019-01-26 12:16:58', 19),
	(301, 118, 19, 1, 6.00, 0.00, 0.00, 1, NULL, 1, NULL, NULL, '2019-01-26 12:17:04', 19, '2019-01-26 12:17:04', 19),
	(302, 118, 66, 2, 0.50, 0.00, 0.00, 2, NULL, 1, NULL, NULL, '2019-01-26 12:17:10', 19, '2019-01-26 12:17:10', 19),
	(303, 120, 19, 1, 6.00, 0.00, 0.00, 1, NULL, 1, NULL, NULL, '2019-01-26 12:32:05', 19, '2019-01-26 12:32:05', 19),
	(304, 120, 21, 2, 7.00, 0.00, 0.00, 2, NULL, 1, NULL, NULL, '2019-01-26 12:32:06', 19, '2019-01-26 12:32:06', 19),
	(305, 121, 21, 1, 7.00, 0.00, 0.00, 0, NULL, 1, NULL, NULL, '2019-01-26 12:32:11', 19, '2019-01-26 12:32:11', 19),
	(306, 121, 21, 1, 7.00, 0.00, 0.00, 0, NULL, 1, NULL, NULL, '2019-01-26 12:32:11', 19, '2019-01-26 12:32:11', 19),
	(307, 119, 19, 1, 6.00, 0.00, 0.00, 1, NULL, 1, 0.00, '[]', '2019-01-26 16:46:36', 19, '2019-01-26 16:46:36', 19),
	(308, 119, 21, 1, 7.00, 0.00, 0.00, 1, NULL, 1, 0.00, '[]', '2019-01-26 16:46:37', 19, '2019-01-26 16:46:37', 19),
	(309, 122, 19, 1, 6.00, 3.00, 0.00, 1, NULL, 1, 0.00, '[]', '2019-01-26 17:41:11', 19, '2019-01-26 17:41:11', 19),
	(310, 122, 21, 1, 7.00, 0.00, 10.00, 1, NULL, 1, 0.00, '[]', '2019-01-26 17:41:12', 19, '2019-01-26 17:41:12', 19),
	(311, 123, 19, 1, 6.00, 0.00, 0.00, 1, NULL, 1, 0.00, '[]', '2019-01-26 17:42:35', 19, '2019-01-26 17:42:35', 19),
	(312, 123, 21, 1, 7.00, 0.00, 0.00, 1, NULL, 1, 0.00, '[]', '2019-01-26 17:42:35', 19, '2019-01-26 17:42:35', 19),
	(313, 123, 22, 1, 7.50, 0.00, 0.00, 1, NULL, 1, 0.00, '[]', '2019-01-26 17:42:36', 19, '2019-01-26 17:42:36', 19),
	(314, 124, 38, 4, 9.00, 0.00, 0.00, 4, NULL, 1, NULL, NULL, '2019-02-07 15:24:52', 19, '2019-02-07 15:24:52', 19),
	(315, 124, 37, 2, 9.00, 0.00, 0.00, 2, NULL, 1, NULL, NULL, '2019-02-07 15:24:53', 19, '2019-02-07 15:24:53', 19),
	(316, 115, 21, 1, 7.00, 0.00, 0.00, 0, NULL, 1, NULL, NULL, '2019-02-12 08:24:09', 19, '2019-02-12 08:24:09', 19);
/*!40000 ALTER TABLE `sale_detail` ENABLE KEYS */;

-- Dumping structure for table rms_makro_home_stage.sale_master
DROP TABLE IF EXISTS `sale_master`;
CREATE TABLE IF NOT EXISTS `sale_master` (
  `sale_master_id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `sale_master_invoice_no` int(11) DEFAULT '0',
  `sale_master_start_date` datetime NOT NULL,
  `sale_master_end_date` datetime DEFAULT NULL,
  `sale_master_branch_id` int(11) NOT NULL,
  `sale_master_customer_id` int(11) DEFAULT NULL,
  `sale_master_layout_id` int(11) NOT NULL,
  `sale_master_cash_id` int(11) NOT NULL,
  `sale_master_seller_id` int(11) DEFAULT NULL,
  `sale_master_cashier_id` int(11) NOT NULL,
  `sale_master_pax` int(11) DEFAULT '1',
  `sale_master_tax` decimal(10,2) DEFAULT '0.00',
  `sale_master_exchange_rate` decimal(10,2) DEFAULT '0.00',
  `sale_master_service_charge` decimal(10,2) DEFAULT '0.00',
  `sale_master_discount_percent` decimal(11,2) DEFAULT '0.00',
  `sale_master_pay_kh` int(11) DEFAULT '0',
  `sale_master_pay_us` decimal(10,2) DEFAULT '0.00',
  `sale_master_account_type` int(11) DEFAULT NULL,
  `sale_master_other_card` decimal(10,2) DEFAULT '0.00',
  `sale_master_member_discount` decimal(10,2) DEFAULT '0.00',
  `sale_master_member_pay` decimal(10,2) DEFAULT '0.00',
  `sale_master_total` decimal(10,2) DEFAULT NULL,
  `sale_master_grand_total` decimal(10,2) DEFAULT '0.00',
  `sale_master_create_date` datetime NOT NULL,
  `sale_master_create_by` int(11) NOT NULL,
  `sale_master_status` tinyint(1) DEFAULT '1' COMMENT '1="ACTIVE"/2="PAID"/-1="CANCEL"',
  `sale_master_void_reason` varchar(50) COLLATE utf8_unicode_ci DEFAULT NULL,
  `sale_master_print` tinyint(4) DEFAULT '0',
  `sale_matster_note` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `sale_master_offline_by` int(11) DEFAULT '0',
  `sale_master_offline_date` datetime DEFAULT NULL,
  PRIMARY KEY (`sale_master_id`)
) ENGINE=InnoDB AUTO_INCREMENT=125 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- Dumping data for table rms_makro_home_stage.sale_master: ~106 rows (approximately)
DELETE FROM `sale_master`;
/*!40000 ALTER TABLE `sale_master` DISABLE KEYS */;
INSERT INTO `sale_master` (`sale_master_id`, `sale_master_invoice_no`, `sale_master_start_date`, `sale_master_end_date`, `sale_master_branch_id`, `sale_master_customer_id`, `sale_master_layout_id`, `sale_master_cash_id`, `sale_master_seller_id`, `sale_master_cashier_id`, `sale_master_pax`, `sale_master_tax`, `sale_master_exchange_rate`, `sale_master_service_charge`, `sale_master_discount_percent`, `sale_master_pay_kh`, `sale_master_pay_us`, `sale_master_account_type`, `sale_master_other_card`, `sale_master_member_discount`, `sale_master_member_pay`, `sale_master_total`, `sale_master_grand_total`, `sale_master_create_date`, `sale_master_create_by`, `sale_master_status`, `sale_master_void_reason`, `sale_master_print`, `sale_matster_note`, `sale_master_offline_by`, `sale_master_offline_date`) VALUES
	(1, 1, '2019-01-24 20:14:36', '2019-01-24 21:14:13', 41, NULL, 178, 1, 19, 19, 1, 5.00, 4000.00, 0.00, 0.00, 0, 0.00, 12, 19.95, 0.00, 0.00, NULL, 0.00, '2019-01-24 20:14:36', 19, 2, NULL, 2, NULL, 0, NULL),
	(2, 2, '2019-01-24 21:27:50', '2019-01-24 21:28:00', 41, NULL, 182, 1, 19, 19, 1, 10.00, 4000.00, 0.00, 0.00, 0, 0.00, 9, 19.80, 0.00, 0.00, NULL, 0.00, '2019-01-24 21:27:50', 19, 2, NULL, 2, NULL, 0, NULL),
	(3, 3, '2019-01-24 21:28:15', '2019-01-24 21:28:20', 41, NULL, 182, 1, 19, 19, 1, 10.00, 4000.00, 0.00, 0.00, 0, 0.00, 12, 15.40, 0.00, 0.00, NULL, 0.00, '2019-01-24 21:28:15', 19, 2, NULL, 1, NULL, 0, NULL),
	(4, 4, '2019-01-24 21:33:05', '2019-01-24 21:33:11', 41, NULL, 183, 1, 19, 19, 1, 10.00, 4000.00, 0.00, 0.00, 0, 0.00, 12, 19.80, 0.00, 0.00, NULL, 0.00, '2019-01-24 21:33:05', 19, 2, NULL, 1, NULL, 0, NULL),
	(5, 5, '2019-01-24 21:39:15', '2019-01-24 21:44:21', 41, NULL, 181, 1, 19, 19, 1, 10.00, 4000.00, 0.00, 0.00, 0, 0.00, 12, 15.40, 0.00, 0.00, NULL, 0.00, '2019-01-24 21:39:15', 19, 2, NULL, 2, NULL, 0, NULL),
	(6, 9, '2019-01-24 21:44:45', '2019-01-25 06:25:43', 41, NULL, 185, 1, 19, 19, 1, 10.00, 4000.00, 0.00, 0.00, 0, 0.00, 38, 33.55, 0.00, 0.00, NULL, 0.00, '2019-01-24 21:44:45', 19, 2, NULL, 2, NULL, 0, NULL),
	(7, 11, '2019-01-24 21:46:14', '2019-01-25 06:26:04', 41, NULL, 187, 1, 19, 19, 1, 10.00, 4000.00, 0.00, 0.00, 0, 0.00, 10, 23.10, 0.00, 0.00, NULL, 0.00, '2019-01-24 21:46:14', 19, 2, NULL, 2, NULL, 0, NULL),
	(8, 6, '2019-01-24 21:47:07', '2019-01-24 21:51:13', 41, NULL, 181, 1, 19, 19, 1, 10.00, 4000.00, 0.00, 0.00, 0, 0.00, 12, 14.30, 0.00, 0.00, NULL, 0.00, '2019-01-24 21:47:07', 19, 2, NULL, 2, NULL, 0, NULL),
	(9, 7, '2019-01-24 21:52:50', '2019-01-24 21:52:53', 41, NULL, 186, 1, 19, 19, 1, 10.00, 4000.00, 0.00, 0.00, 0, 0.00, 12, 15.40, 0.00, 0.00, NULL, 0.00, '2019-01-24 21:52:50', 19, 2, NULL, 1, NULL, 0, NULL),
	(10, 8, '2019-01-24 21:56:31', '2019-01-25 06:25:25', 41, NULL, 183, 1, 19, 19, 1, 10.00, 4000.00, 0.00, 0.00, 0, 0.00, 39, 15.40, 0.00, 0.00, NULL, 0.00, '2019-01-24 21:56:31', 19, 2, NULL, 1, NULL, 0, NULL),
	(11, 10, '2019-01-24 21:56:53', '2019-01-25 06:25:53', 41, NULL, 180, 1, 19, 19, 1, 10.00, 4000.00, 0.00, 0.00, 0, 0.00, 10, 15.40, 0.00, 0.00, NULL, 0.00, '2019-01-24 21:56:53', 19, 2, NULL, 1, NULL, 0, NULL),
	(12, 12, '2019-01-24 21:57:25', '2019-01-25 06:26:13', 41, NULL, 179, 1, 19, 19, 1, 10.00, 4000.00, 0.00, 0.00, 0, 0.00, 12, 16.50, 0.00, 0.00, NULL, 0.00, '2019-01-24 21:57:25', 19, 2, NULL, 1, NULL, 0, NULL),
	(13, 13, '2019-01-25 06:26:22', '2019-01-25 06:39:57', 41, NULL, 180, 2, 38, 19, 1, 10.00, 4000.00, 0.00, 0.00, 0, 7.00, NULL, 0.00, 0.00, 0.00, NULL, 0.00, '2019-01-25 06:26:22', 19, 2, NULL, 2, NULL, 0, NULL),
	(14, 14, '2019-01-25 06:40:18', '2019-01-25 06:40:45', 41, NULL, 180, 2, 38, 38, 1, 10.00, 4000.00, 0.00, 0.00, 0, 10.00, NULL, 0.00, 0.00, 0.00, NULL, 0.00, '2019-01-25 06:40:18', 38, 2, NULL, 2, NULL, 0, NULL),
	(15, 15, '2019-01-25 06:41:23', '2019-01-25 06:45:00', 41, NULL, 179, 2, 38, 38, 1, 10.00, 4000.00, 0.00, 0.00, 0, 30.00, NULL, 0.00, 0.00, 0.00, NULL, 0.00, '2019-01-25 06:41:23', 38, 2, NULL, 2, NULL, 0, NULL),
	(17, 19, '2019-01-25 06:46:52', '2019-01-25 06:52:34', 41, NULL, 182, 2, 38, 38, 1, 10.00, 4000.00, 0.00, 0.00, 0, 50.00, NULL, 0.00, 0.00, 0.00, NULL, 0.00, '2019-01-25 06:46:52', 38, 2, NULL, 1, NULL, 0, NULL),
	(18, 17, '2019-01-25 06:48:04', '2019-01-25 06:51:17', 41, NULL, 178, 2, 38, 38, 1, 10.00, 4000.00, 0.00, 0.00, 0, 15.00, NULL, 0.00, 0.00, 0.00, NULL, 0.00, '2019-01-25 06:48:04', 38, 2, NULL, 2, NULL, 0, NULL),
	(19, 16, '2019-01-25 06:48:32', '2019-01-25 06:50:49', 41, NULL, 178, 2, 38, 38, 1, 10.00, 4000.00, 0.00, 0.00, 0, 20.00, NULL, 0.00, 0.00, 0.00, NULL, 0.00, '2019-01-25 06:48:32', 38, 2, NULL, 3, NULL, 0, NULL),
	(20, 18, '2019-01-25 06:51:55', '2019-01-25 06:52:21', 41, NULL, 186, 2, 38, 38, 1, 10.00, 4000.00, 0.00, 0.00, 0, 50.00, NULL, 0.00, 0.00, 0.00, NULL, 0.00, '2019-01-25 06:51:55', 38, 2, NULL, 1, NULL, 0, NULL),
	(21, 20, '2019-01-25 07:03:53', '2019-01-25 07:03:56', 41, NULL, 181, 2, 38, 38, 1, 10.00, 4000.00, 0.00, 0.00, 0, 0.00, 12, 18.70, 0.00, 0.00, NULL, 0.00, '2019-01-25 07:03:53', 38, 2, NULL, 1, NULL, 0, NULL),
	(22, 24, '2019-01-25 07:04:18', '2019-01-25 07:25:23', 41, NULL, 182, 2, 38, 38, 1, 10.00, 4000.00, 0.00, 0.00, 0, 20.00, NULL, 0.00, 0.00, 0.00, NULL, 0.00, '2019-01-25 07:04:18', 38, 2, NULL, 4, NULL, 0, NULL),
	(23, 21, '2019-01-25 07:06:08', '2019-01-25 07:06:23', 41, NULL, 185, 2, 38, 38, 1, 10.00, 4000.00, 0.00, 0.00, 0, 0.00, 12, 6.60, 0.00, 0.00, NULL, 0.00, '2019-01-25 07:06:08', 38, 2, NULL, 2, NULL, 0, NULL),
	(24, 22, '2019-01-25 07:06:51', '2019-01-25 07:07:02', 41, NULL, 183, 2, 38, 38, 1, 10.00, 4000.00, 0.00, 0.00, 0, 0.00, 38, 6.60, 0.00, 0.00, NULL, 0.00, '2019-01-25 07:06:51', 38, 2, NULL, 2, NULL, 0, NULL),
	(25, 23, '2019-01-25 07:08:21', '2019-01-25 07:08:31', 41, NULL, 180, 2, 38, 38, 1, 10.00, 4000.00, 0.00, 0.00, 0, 0.00, 38, 6.60, 0.00, 0.00, NULL, 0.00, '2019-01-25 07:08:21', 38, 2, NULL, 2, NULL, 0, NULL),
	(26, 25, '2019-01-25 07:08:40', '2019-01-25 07:25:45', 41, NULL, 180, 2, 38, 38, 1, 10.00, 4000.00, 0.00, 0.00, 0, 70.00, NULL, 0.00, 0.00, 0.00, NULL, 0.00, '2019-01-25 07:08:40', 38, 2, NULL, 3, NULL, 0, NULL),
	(27, 26, '2019-01-25 07:18:43', '2019-01-25 07:35:25', 41, NULL, 178, 2, 38, 38, 1, 10.00, 4000.00, 0.00, 0.00, 3200, 50.00, NULL, 0.00, 0.00, 0.00, NULL, 0.00, '2019-01-25 07:18:43', 38, 2, NULL, 3, NULL, 0, NULL),
	(28, 27, '2019-01-25 07:27:43', '2019-01-25 07:38:03', 41, NULL, 184, 2, 38, 38, 1, 10.00, 4000.00, 0.00, 0.00, 0, 0.00, 9, 12.10, 0.00, 0.00, NULL, 0.00, '2019-01-25 07:27:43', 38, 2, NULL, 2, NULL, 0, NULL),
	(29, 29, '2019-01-25 07:47:53', '2019-01-25 07:56:05', 41, NULL, 187, 2, 38, 38, 1, 10.00, 4000.00, 0.00, 0.00, 0, 50.00, NULL, 0.00, 0.00, 0.00, NULL, 0.00, '2019-01-25 07:47:53', 38, 2, NULL, 2, NULL, 0, NULL),
	(30, 28, '2019-01-25 07:51:49', '2019-01-25 07:55:33', 41, NULL, 182, 2, 38, 38, 1, 10.00, 4000.00, 0.00, 0.00, 0, 60.00, NULL, 0.00, 0.00, 0.00, NULL, 0.00, '2019-01-25 07:51:49', 38, 2, NULL, 2, NULL, 0, NULL),
	(31, 30, '2019-01-25 07:56:42', '2019-01-25 07:58:00', 41, NULL, 178, 2, 38, 38, 1, 10.00, 4000.00, 0.00, 0.00, 2000, 20.00, NULL, 0.00, 0.00, 0.00, NULL, 0.00, '2019-01-25 07:56:42', 38, 2, NULL, 2, NULL, 0, NULL),
	(32, 31, '2019-01-25 07:59:44', '2019-01-25 08:03:45', 41, NULL, 184, 2, 38, 38, 1, 10.00, 4000.00, 0.00, 0.00, 0, 20.00, NULL, 0.00, 0.00, 0.00, NULL, 0.00, '2019-01-25 07:59:44', 38, 2, NULL, 1, NULL, 0, NULL),
	(33, 32, '2019-01-25 08:23:49', '2019-01-25 08:50:50', 41, NULL, 178, 1, 19, 38, 1, 10.00, 4000.00, 0.00, 10.00, 0, 13.86, NULL, 0.00, 0.00, 0.00, NULL, 0.00, '2019-01-25 08:23:49', 38, 2, NULL, 3, NULL, 0, NULL),
	(35, 33, '2019-01-25 09:00:10', '2019-01-25 09:19:07', 41, NULL, 182, 3, 19, 19, 1, 10.00, 4000.00, 0.00, 10.00, 17000, 0.00, NULL, 0.00, 0.00, 0.00, NULL, 0.00, '2019-01-25 09:00:10', 19, 2, NULL, 2, NULL, 0, NULL),
	(36, 35, '2019-01-25 09:47:28', '2019-01-25 10:10:20', 41, NULL, 181, 3, 19, 19, 1, 10.00, 4000.00, 0.00, 10.00, 0, 10.00, NULL, 0.00, 0.00, 0.00, NULL, 0.00, '2019-01-25 09:47:28', 19, 2, NULL, 3, NULL, 0, NULL),
	(37, 34, '2019-01-25 09:55:15', '2019-01-25 09:57:26', 41, NULL, 182, 3, 19, 19, 1, 10.00, 4000.00, 0.00, 6.00, 0, 15.00, NULL, 0.00, 0.00, 0.00, NULL, 0.00, '2019-01-25 09:55:15', 19, 2, NULL, 1, NULL, 0, NULL),
	(38, 36, '2019-01-25 10:19:06', '2019-01-25 10:41:43', 41, NULL, 181, 3, 19, 19, 1, 10.00, 4000.00, 0.00, 10.00, 0, 10.00, NULL, 0.00, 0.00, 0.00, NULL, 0.00, '2019-01-25 10:19:06', 19, 2, NULL, 2, NULL, 0, NULL),
	(39, 37, '2019-01-25 10:35:28', '2019-01-25 10:48:34', 41, NULL, 187, 3, 19, 19, 1, 10.00, 4000.00, 0.00, 10.00, 0, 3.00, NULL, 0.00, 0.00, 0.00, NULL, 0.00, '2019-01-25 10:35:28', 19, 2, NULL, 2, NULL, 0, NULL),
	(40, 39, '2019-01-25 11:08:02', '2019-01-25 11:32:30', 41, NULL, 186, 3, 19, 19, 1, 10.00, 4000.00, 0.00, 10.00, 50000, 0.00, NULL, 0.00, 0.00, 0.00, NULL, 0.00, '2019-01-25 11:08:02', 19, 2, NULL, 2, NULL, 0, NULL),
	(41, 41, '2019-01-25 11:19:46', '2019-01-25 11:57:14', 41, NULL, 182, 3, 19, 19, 1, 10.00, 4000.00, 0.00, 10.00, 0, 16.00, NULL, 0.00, 0.00, 0.00, NULL, 0.00, '2019-01-25 11:19:46', 19, 2, NULL, 2, NULL, 0, NULL),
	(42, 38, '2019-01-25 11:26:25', '2019-01-25 11:28:14', 41, NULL, 183, 3, 19, 19, 1, 10.00, 4000.00, 0.00, 10.00, 0, 10.00, NULL, 0.00, 0.00, 0.00, NULL, 0.00, '2019-01-25 11:26:25', 19, 2, NULL, 2, NULL, 0, NULL),
	(43, 40, '2019-01-25 11:44:30', '2019-01-25 11:45:02', 41, NULL, 189, 3, 19, 19, 1, 10.00, 4000.00, 0.00, 10.00, 1000, 0.00, NULL, 0.00, 0.00, 0.00, NULL, 0.00, '2019-01-25 11:44:30', 19, 2, NULL, 2, NULL, 0, NULL),
	(44, 42, '2019-01-25 11:46:41', '2019-01-25 12:23:10', 41, NULL, 187, 3, 19, 19, 1, 10.00, 4000.00, 0.00, 10.00, 0, 100.00, NULL, 0.00, 0.00, 0.00, NULL, 0.00, '2019-01-25 11:46:41', 19, 2, NULL, 3, NULL, 0, NULL),
	(45, 44, '2019-01-25 11:56:01', '2019-01-25 12:49:57', 41, NULL, 178, 3, 19, 19, 1, 10.00, 4000.00, 0.00, 10.00, 0, 20.00, NULL, 0.00, 0.00, 0.00, NULL, 0.00, '2019-01-25 11:56:01', 19, 2, NULL, 2, NULL, 0, NULL),
	(46, 43, '2019-01-25 11:58:48', '2019-01-25 12:27:28', 41, NULL, 186, 3, 19, 19, 1, 10.00, 4000.00, 0.00, 10.00, 0, 15.00, NULL, 0.00, 0.00, 0.00, NULL, 0.00, '2019-01-25 11:58:48', 19, 2, NULL, 2, NULL, 0, NULL),
	(47, 46, '2019-01-25 12:46:26', '2019-01-25 13:28:57', 41, NULL, 185, 3, 19, 19, 1, 10.00, 4000.00, 0.00, 10.00, 0, 100.00, NULL, 0.00, 0.00, 0.00, NULL, 0.00, '2019-01-25 12:46:26', 19, 2, NULL, 2, NULL, 0, NULL),
	(48, 45, '2019-01-25 12:50:49', '2019-01-25 13:25:14', 41, NULL, 186, 3, 19, 19, 1, 10.00, 4000.00, 0.00, 10.00, 0, 20.00, NULL, 0.00, 0.00, 0.00, NULL, 0.00, '2019-01-25 12:50:49', 19, 2, NULL, 2, NULL, 0, NULL),
	(49, 47, '2019-01-25 12:53:56', '2019-01-25 13:30:21', 41, NULL, 180, 3, 19, 19, 1, 10.00, 4000.00, 0.00, 10.00, 0, 3.00, NULL, 0.00, 0.00, 0.00, NULL, 0.00, '2019-01-25 12:53:56', 19, 2, NULL, 2, NULL, 0, NULL),
	(50, 48, '2019-01-25 13:25:44', '2019-01-25 14:00:12', 41, NULL, 178, 3, 19, 19, 1, 10.00, 4000.00, 0.00, 10.00, 0, 13.00, NULL, 0.00, 0.00, 0.00, NULL, 0.00, '2019-01-25 13:25:44', 19, 2, NULL, 2, NULL, 0, NULL),
	(51, 50, '2019-01-25 13:53:53', '2019-01-25 14:09:48', 41, NULL, 181, 3, 19, 19, 1, 10.00, 4000.00, 0.00, 10.00, 0, 10.00, NULL, 0.00, 0.00, 0.00, NULL, 0.00, '2019-01-25 13:53:53', 19, 2, NULL, 2, NULL, 0, NULL),
	(52, 49, '2019-01-25 13:56:13', '2019-01-25 14:00:56', 41, NULL, 183, 3, 19, 19, 1, 10.00, 4000.00, 0.00, 20.00, 0, 20.00, NULL, 0.00, 0.00, 0.00, NULL, 0.00, '2019-01-25 13:56:13', 19, 2, NULL, 2, NULL, 0, NULL),
	(53, 51, '2019-01-25 14:10:52', '2019-01-25 15:21:01', 41, NULL, 182, 3, 19, 19, 1, 10.00, 4000.00, 0.00, 10.00, 20000, 20.00, NULL, 0.00, 0.00, 0.00, NULL, 0.00, '2019-01-25 14:10:52', 19, 2, NULL, 2, NULL, 0, NULL),
	(56, 52, '2019-01-25 14:34:49', '2019-01-25 15:28:05', 41, NULL, 187, 3, 19, 19, 1, 10.00, 4000.00, 0.00, 10.00, 0, 6.00, NULL, 0.00, 0.00, 0.00, NULL, 0.00, '2019-01-25 14:34:49', 19, 2, NULL, 2, NULL, 0, NULL),
	(63, 53, '2019-01-25 15:22:10', '2019-01-25 15:40:39', 41, NULL, 186, 3, 19, 19, 1, 10.00, 4000.00, 0.00, 10.00, 0, 100.00, NULL, 0.00, 0.00, 0.00, NULL, 0.00, '2019-01-25 15:22:10', 19, 2, NULL, 2, NULL, 0, NULL),
	(64, 55, '2019-01-25 15:41:56', '2019-01-25 16:49:09', 41, NULL, 178, 3, 19, 19, 1, 10.00, 4000.00, 0.00, 10.00, 0, 100.00, NULL, 0.00, 0.00, 0.00, NULL, 0.00, '2019-01-25 15:41:56', 19, 2, NULL, 3, NULL, 0, NULL),
	(65, 54, '2019-01-25 16:27:07', '2019-01-25 16:48:04', 41, NULL, 181, 3, 19, 19, 1, 10.00, 4000.00, 0.00, 10.00, 0, 4.00, NULL, 0.00, 0.00, 0.00, NULL, 0.00, '2019-01-25 16:27:07', 19, 2, NULL, 2, NULL, 0, NULL),
	(66, 56, '2019-01-25 16:36:11', '2019-01-25 17:11:07', 41, NULL, 179, 3, 19, 19, 1, 10.00, 4000.00, 0.00, 10.00, 0, 6.93, NULL, 0.00, 0.00, 0.00, NULL, 0.00, '2019-01-25 16:36:11', 19, 2, NULL, 2, NULL, 0, NULL),
	(67, 57, '2019-01-25 17:22:28', '2019-01-25 17:24:10', 41, NULL, 181, 4, 39, 39, 1, 10.00, 4000.00, 0.00, 10.00, 0, 10.00, NULL, 0.00, 0.00, 0.00, NULL, 0.00, '2019-01-25 17:22:28', 39, 2, NULL, 1, NULL, 0, NULL),
	(68, 58, '2019-01-25 18:24:49', '2019-01-25 19:06:36', 41, NULL, 187, 4, 39, 39, 1, 10.00, 4000.00, 0.00, 10.00, 0, 21.00, NULL, 0.00, 0.00, 0.00, NULL, 0.00, '2019-01-25 18:24:49', 39, 2, NULL, 3, NULL, 0, NULL),
	(69, 60, '2019-01-25 18:58:27', '2019-01-25 19:19:15', 41, NULL, 183, 4, 39, 39, 1, 10.00, 4000.00, 0.00, 10.00, 0, 50.00, NULL, 0.00, 0.00, 0.00, NULL, 0.00, '2019-01-25 18:58:27', 39, 2, NULL, 2, NULL, 0, NULL),
	(70, 59, '2019-01-25 18:59:03', '2019-01-25 19:14:27', 41, NULL, 178, 4, 39, 39, 1, 10.00, 4000.00, 0.00, 10.00, 0, 10.00, NULL, 0.00, 0.00, 0.00, NULL, 0.00, '2019-01-25 18:59:03', 39, 2, NULL, 2, NULL, 0, NULL),
	(71, 61, '2019-01-25 18:59:46', '2019-01-25 19:20:54', 41, NULL, 185, 4, 39, 39, 1, 10.00, 4000.00, 0.00, 10.00, 0, 10.00, NULL, 0.00, 0.00, 0.00, NULL, 0.00, '2019-01-25 18:59:46', 39, 2, NULL, 2, NULL, 0, NULL),
	(72, 63, '2019-01-25 19:02:49', '2019-01-25 19:36:16', 41, NULL, 182, 4, 39, 39, 1, 10.00, 4000.00, 0.00, 10.00, 0, 18.00, NULL, 0.00, 0.00, 0.00, NULL, 0.00, '2019-01-25 19:02:49', 39, 2, NULL, 2, NULL, 0, NULL),
	(73, 65, '2019-01-25 19:07:35', '2019-01-25 19:40:00', 41, NULL, 179, 4, 39, 39, 1, 10.00, 4000.00, 0.00, 10.00, 0, 10.00, NULL, 0.00, 0.00, 0.00, NULL, 0.00, '2019-01-25 19:07:35', 39, 2, NULL, 3, NULL, 0, NULL),
	(74, 68, '2019-01-25 19:09:58', '2019-01-25 19:59:18', 41, NULL, 184, 4, 39, 39, 1, 10.00, 4000.00, 0.00, 10.00, 5000, 21.00, NULL, 0.00, 0.00, 0.00, NULL, 0.00, '2019-01-25 19:09:58', 39, 2, NULL, 3, NULL, 0, NULL),
	(75, 62, '2019-01-25 19:10:49', '2019-01-25 19:31:01', 41, NULL, 180, 4, 39, 39, 1, 10.00, 4000.00, 0.00, 10.00, 0, 10.00, NULL, 0.00, 0.00, 0.00, NULL, 0.00, '2019-01-25 19:10:49', 39, 2, NULL, 2, NULL, 0, NULL),
	(76, 75, '2019-01-25 19:14:09', '2019-01-25 20:20:38', 41, NULL, 186, 4, 39, 39, 1, 10.00, 4000.00, 0.00, 10.00, 0, 10.00, NULL, 0.00, 0.00, 0.00, NULL, 0.00, '2019-01-25 19:14:09', 39, 2, NULL, 3, NULL, 0, NULL),
	(77, 67, '2019-01-25 19:17:03', '2019-01-25 19:54:42', 41, NULL, 181, 4, 39, 39, 1, 10.00, 4000.00, 0.00, 10.00, 50000, 0.00, NULL, 0.00, 0.00, 0.00, NULL, 0.00, '2019-01-25 19:17:03', 39, 2, NULL, 2, NULL, 0, NULL),
	(78, 64, '2019-01-25 19:18:07', '2019-01-25 19:38:50', 41, NULL, 178, 4, 39, 39, 1, 10.00, 4000.00, 0.00, 10.00, 50000, 0.00, NULL, 0.00, 0.00, 0.00, NULL, 0.00, '2019-01-25 19:18:07', 39, 2, NULL, 3, NULL, 0, NULL),
	(79, 74, '2019-01-25 19:21:50', '2019-01-25 20:18:04', 41, NULL, 187, 4, 39, 39, 1, 10.00, 4000.00, 0.00, 0.00, 42000, 0.00, NULL, 0.00, 0.00, 0.00, NULL, 0.00, '2019-01-25 19:21:50', 39, 2, NULL, 5, NULL, 0, NULL),
	(80, 66, '2019-01-25 19:23:03', '2019-01-25 19:49:39', 41, NULL, 178, 4, 39, 39, 1, 10.00, 4000.00, 0.00, 0.00, 0, 7.00, NULL, 0.00, 0.00, 0.00, NULL, 0.00, '2019-01-25 19:23:03', 39, 2, NULL, 3, NULL, 0, NULL),
	(81, 69, '2019-01-25 19:26:31', '2019-01-25 20:00:58', 41, NULL, 183, 4, 39, 39, 1, 10.00, 4000.00, 0.00, 10.00, 30000, 0.00, NULL, 0.00, 0.00, 0.00, NULL, 0.00, '2019-01-25 19:26:31', 39, 2, NULL, 2, NULL, 0, NULL),
	(82, 72, '2019-01-25 19:27:54', '2019-01-25 20:08:29', 41, NULL, 185, 4, 39, 39, 1, 10.00, 4000.00, 0.00, 10.00, 40000, 0.00, NULL, 0.00, 0.00, 0.00, NULL, 0.00, '2019-01-25 19:27:54', 39, 2, NULL, 3, NULL, 0, NULL),
	(83, 87, '2019-01-25 19:44:13', '2019-01-25 21:30:19', 41, NULL, 180, 5, 19, 39, 1, 10.00, 4000.00, 0.00, 10.00, 70000, 0.00, NULL, 0.00, 0.00, 0.00, NULL, 0.00, '2019-01-25 19:44:13', 39, 2, NULL, 2, NULL, 0, NULL),
	(84, 73, '2019-01-25 19:46:22', '2019-01-25 20:12:15', 41, NULL, 182, 4, 39, 39, 1, 10.00, 4000.00, 0.00, 0.00, 0, 20.00, NULL, 0.00, 0.00, 0.00, NULL, 0.00, '2019-01-25 19:46:22', 39, 2, NULL, 2, NULL, 0, NULL),
	(85, 79, '2019-01-25 19:46:56', '2019-01-25 20:39:13', 41, NULL, 179, 4, 39, 39, 1, 10.00, 4000.00, 0.00, 10.00, 0, 20.00, NULL, 0.00, 0.00, 0.00, NULL, 0.00, '2019-01-25 19:46:56', 39, 2, NULL, 5, NULL, 0, NULL),
	(86, 77, '2019-01-25 19:50:16', '2019-01-25 20:23:45', 41, NULL, 178, 4, 39, 39, 1, 10.00, 4000.00, 0.00, 20.00, 0, 10.00, NULL, 0.00, 0.00, 0.00, NULL, 0.00, '2019-01-25 19:50:16', 39, 2, NULL, 2, NULL, 0, NULL),
	(87, 70, '2019-01-25 20:01:59', '2019-01-25 20:03:41', 41, NULL, 186, 4, 39, 39, 1, 10.00, 4000.00, 0.00, 10.00, 0, 5.00, NULL, 0.00, 0.00, 0.00, NULL, 0.00, '2019-01-25 20:01:59', 39, 2, NULL, 3, NULL, 0, NULL),
	(88, 71, '2019-01-25 20:04:46', '2019-01-25 20:05:30', 41, NULL, 179, 4, 39, 39, 1, 10.00, 4000.00, 0.00, 0.00, 0, 10.00, NULL, 0.00, 0.00, 0.00, NULL, 0.00, '2019-01-25 20:04:46', 39, 2, NULL, 2, NULL, 0, NULL),
	(90, 76, '2019-01-25 20:14:00', '2019-01-25 20:21:04', 41, NULL, 187, 4, 39, 39, 1, 10.00, 4000.00, 0.00, 20.00, 40000, 0.00, NULL, 0.00, 0.00, 0.00, NULL, 0.00, '2019-01-25 20:14:00', 39, 2, NULL, 2, NULL, 0, NULL),
	(93, 85, '2019-01-25 20:22:24', '2019-01-25 21:11:57', 41, NULL, 178, 5, 19, 39, 1, 10.00, 4000.00, 0.00, 10.00, 2000, 10.00, NULL, 0.00, 0.00, 0.00, NULL, 0.00, '2019-01-25 20:22:24', 39, 2, NULL, 2, NULL, 0, NULL),
	(94, 83, '2019-01-25 20:22:55', '2019-01-25 20:49:35', 41, NULL, 186, 4, 39, 39, 1, 10.00, 4000.00, 0.00, 10.00, 0, 30.00, NULL, 0.00, 0.00, 0.00, NULL, 0.00, '2019-01-25 20:22:55', 39, 2, NULL, 3, NULL, 0, NULL),
	(95, 78, '2019-01-25 20:24:08', '2019-01-25 20:35:46', 41, NULL, 182, 4, 39, 39, 1, 10.00, 4000.00, 0.00, 0.00, 0, 2.00, NULL, 0.00, 0.00, 0.00, NULL, 0.00, '2019-01-25 20:24:08', 39, 2, NULL, 2, NULL, 0, NULL),
	(96, 82, '2019-01-25 20:24:33', '2019-01-25 20:48:41', 41, NULL, 181, 4, 39, 39, 1, 10.00, 4000.00, 0.00, 10.00, 0, 10.00, NULL, 0.00, 0.00, 0.00, NULL, 0.00, '2019-01-25 20:24:33', 39, 2, NULL, 2, NULL, 0, NULL),
	(98, 84, '2019-01-25 20:40:21', '2019-01-25 20:53:00', 41, NULL, 184, 4, 39, 39, 1, 10.00, 4000.00, 0.00, 0.00, 0, 40.00, NULL, 0.00, 0.00, 0.00, NULL, 0.00, '2019-01-25 20:40:21', 39, 2, NULL, 4, NULL, 0, NULL),
	(99, 80, '2019-01-25 20:41:05', '2019-01-25 20:41:15', 41, NULL, 190, 4, 39, 39, 1, 10.00, 4000.00, 0.00, 0.00, 0, 2.00, NULL, 0.00, 0.00, 0.00, NULL, 0.00, '2019-01-25 20:41:05', 39, 2, NULL, 1, NULL, 0, NULL),
	(100, 81, '2019-01-25 20:44:45', '2019-01-25 20:44:58', 41, NULL, 188, 4, 39, 39, 1, 10.00, 4000.00, 0.00, 0.00, 2000, 0.00, NULL, 0.00, 0.00, 0.00, NULL, 0.00, '2019-01-25 20:44:45', 39, 2, NULL, 1, NULL, 0, NULL),
	(101, 88, '2019-01-25 20:48:06', '2019-01-25 21:54:03', 41, NULL, 186, 5, 19, 39, 1, 10.00, 4000.00, 0.00, 10.00, 0, 50.00, NULL, 0.00, 0.00, 0.00, NULL, 0.00, '2019-01-25 20:48:06', 39, 2, NULL, 2, NULL, 0, NULL),
	(102, 97, '2019-01-25 20:51:24', '2019-01-25 22:18:02', 41, NULL, 180, 5, 19, 39, 1, 10.00, 4000.00, 0.00, 10.00, 0, 20.00, NULL, 0.00, 0.00, 0.00, NULL, 0.00, '2019-01-25 20:51:24', 39, 2, NULL, 3, NULL, 0, NULL),
	(103, 93, '2019-01-25 20:56:47', '2019-01-25 22:04:56', 41, NULL, 187, 5, 19, 39, 1, 10.00, 4000.00, 0.00, 10.00, 0, 102.00, NULL, 0.00, 0.00, 0.00, NULL, 0.00, '2019-01-25 20:56:47', 39, 2, NULL, 2, NULL, 0, NULL),
	(104, 86, '2019-01-25 21:02:07', '2019-01-25 21:24:51', 41, NULL, 182, 5, 19, 39, 1, 10.00, 4000.00, 0.00, 10.00, 20000, 10.00, NULL, 0.00, 0.00, 0.00, NULL, 0.00, '2019-01-25 21:02:07', 39, 2, NULL, 2, NULL, 0, NULL),
	(105, 98, '2019-01-25 21:05:48', '2019-01-26 08:25:32', 41, NULL, 185, 2, 38, 39, 1, 10.00, 4000.00, 0.00, 100.00, 0, 0.00, NULL, 0.00, 0.00, 0.00, NULL, 0.00, '2019-01-25 21:05:48', 39, 2, NULL, 2, NULL, 0, NULL),
	(106, 89, '2019-01-25 21:12:25', '2019-01-25 21:56:06', 41, NULL, 181, 5, 19, 19, 1, 10.00, 4000.00, 0.00, 10.00, 92000, 0.00, NULL, 0.00, 0.00, 0.00, NULL, 0.00, '2019-01-25 21:12:25', 19, 2, NULL, 2, NULL, 0, NULL),
	(107, 90, '2019-01-25 21:26:07', '2019-01-25 21:58:27', 41, NULL, 184, 5, 19, 19, 1, 10.00, 4000.00, 0.00, 10.00, 0, 20.00, NULL, 0.00, 0.00, 0.00, NULL, 0.00, '2019-01-25 21:26:07', 19, 2, NULL, 2, NULL, 0, NULL),
	(108, 96, '2019-01-25 21:31:28', '2019-01-25 22:11:21', 41, NULL, 178, 5, 19, 19, 1, 10.00, 4000.00, 0.00, 10.00, 0, 20.00, NULL, 0.00, 0.00, 0.00, NULL, 0.00, '2019-01-25 21:31:28', 19, 2, NULL, 2, NULL, 0, NULL),
	(109, 91, '2019-01-25 22:00:16', '2019-01-25 22:00:48', 41, NULL, 179, 5, 19, 19, 1, 10.00, 4000.00, 0.00, 0.00, 0, 2.00, NULL, 0.00, 0.00, 0.00, NULL, 0.00, '2019-01-25 22:00:16', 19, 2, NULL, 2, NULL, 0, NULL),
	(110, 92, '2019-01-25 22:02:18', '2019-01-25 22:02:42', 41, NULL, 179, 5, 19, 19, 1, 10.00, 4000.00, 0.00, 0.00, 3000, 0.00, NULL, 0.00, 0.00, 0.00, NULL, 0.00, '2019-01-25 22:02:18', 19, 2, NULL, 2, NULL, 0, NULL),
	(111, 94, '2019-01-25 22:09:26', '2019-01-25 22:10:06', 41, NULL, 179, 5, 19, 19, 1, 10.00, 4000.00, 0.00, 0.00, 2200, 0.00, NULL, 0.00, 0.00, 0.00, NULL, 0.00, '2019-01-25 22:09:26', 19, 2, NULL, 2, NULL, 0, NULL),
	(112, 95, '2019-01-25 22:10:23', '2019-01-25 22:10:58', 41, NULL, 179, 5, 19, 19, 1, 10.00, 4000.00, 0.00, 0.00, 220, 0.00, NULL, 0.00, 0.00, 0.00, NULL, 0.00, '2019-01-25 22:10:23', 19, 2, NULL, 2, NULL, 0, NULL),
	(113, 99, '2019-01-26 09:35:12', '2019-01-26 09:56:43', 41, NULL, 187, 2, 38, 38, 1, 10.00, 4000.00, 0.00, 10.00, 0, 10.00, NULL, 0.00, 0.00, 0.00, NULL, 0.00, '2019-01-26 09:35:12', 38, 2, NULL, 2, NULL, 0, NULL),
	(114, 100, '2019-01-26 10:30:27', '2019-01-26 10:57:23', 41, NULL, 180, 2, 38, 38, 1, 10.00, 4000.00, 0.00, 10.00, 50000, 0.00, NULL, 0.00, 0.00, 0.00, NULL, 0.00, '2019-01-26 10:30:27', 38, 2, NULL, 3, NULL, 0, NULL),
	(115, 0, '2019-01-26 11:41:50', NULL, 41, NULL, 178, 2, NULL, 38, 1, 10.00, 4000.00, 0.00, 0.00, 0, 0.00, NULL, 0.00, 0.00, 0.00, NULL, 0.00, '2019-01-26 11:41:51', 38, 1, NULL, 1, NULL, 0, NULL),
	(116, 101, '2019-01-26 11:44:48', '2019-01-26 12:17:58', 41, NULL, 186, 6, 19, 38, 1, 10.00, 4000.00, 0.00, 10.00, 0, 12.38, NULL, 0.00, 0.00, 0.00, NULL, 0.00, '2019-01-26 11:44:48', 38, 2, NULL, 3, NULL, 0, NULL),
	(117, 0, '2019-01-26 12:02:08', NULL, 41, NULL, 184, 6, NULL, 19, 1, 10.00, 4000.00, 0.00, 0.00, 0, 0.00, NULL, 0.00, 0.00, 0.00, NULL, 0.00, '2019-01-26 12:02:08', 19, 1, NULL, 2, NULL, 0, NULL),
	(118, 0, '2019-01-26 12:15:56', NULL, 41, NULL, 180, 6, NULL, 19, 1, 10.00, 4000.00, 0.00, 0.00, 0, 0.00, NULL, 0.00, 0.00, 0.00, NULL, 0.00, '2019-01-26 12:15:56', 19, 1, NULL, 1, NULL, 0, NULL),
	(119, 102, '2019-01-26 12:16:20', '2019-01-26 17:00:07', 41, NULL, 181, 6, 19, 19, 1, 10.00, 4000.00, 0.00, 10.00, 0, 13.00, NULL, 0.00, 0.00, 0.00, NULL, 0.00, '2019-01-26 12:16:20', 19, 2, NULL, 1, NULL, 0, NULL),
	(120, 0, '2019-01-26 12:32:05', NULL, 41, NULL, 179, 6, NULL, 19, 1, 10.00, 4000.00, 0.00, 0.00, 0, 0.00, NULL, 0.00, 0.00, 0.00, NULL, 0.00, '2019-01-26 12:32:05', 19, 1, NULL, 1, NULL, 0, NULL),
	(121, 0, '2019-01-26 12:32:11', NULL, 41, NULL, 182, 6, NULL, 19, 1, 10.00, 4000.00, 0.00, 0.00, 0, 0.00, NULL, 0.00, 0.00, 0.00, NULL, 0.00, '2019-01-26 12:32:11', 19, 1, NULL, 0, NULL, 0, NULL),
	(122, 103, '2019-01-26 17:41:11', '2019-01-26 17:42:01', 41, NULL, 181, 7, 19, 19, 1, 10.00, 4000.00, 0.00, 0.00, 0, 11.00, NULL, 0.00, 0.00, 0.00, NULL, 0.00, '2019-01-26 17:41:11', 19, 2, NULL, 1, NULL, 0, NULL),
	(123, 104, '2019-01-26 17:42:35', '2019-01-26 17:42:48', 41, NULL, 183, 7, 19, 19, 1, 10.00, 4000.00, 0.00, 25.00, 0, 20.00, NULL, 0.00, 0.00, 0.00, NULL, 0.00, '2019-01-26 17:42:35', 19, 2, NULL, 1, NULL, 0, NULL),
	(124, 0, '2019-02-07 15:24:52', NULL, 41, NULL, 183, 8, NULL, 19, 1, 10.00, 4000.00, 0.00, 0.00, 0, 0.00, NULL, 0.00, 0.00, 0.00, NULL, 0.00, '2019-02-07 15:24:52', 19, 1, NULL, 3, NULL, 0, NULL);
/*!40000 ALTER TABLE `sale_master` ENABLE KEYS */;

-- Dumping structure for table rms_makro_home_stage.sale_note
DROP TABLE IF EXISTS `sale_note`;
CREATE TABLE IF NOT EXISTS `sale_note` (
  `sale_note_id` int(11) NOT NULL AUTO_INCREMENT,
  `sale_note_detail_id` int(11) DEFAULT NULL,
  `sale_note_item_note_id` int(11) DEFAULT NULL,
  `sale_note_qty` int(11) DEFAULT NULL,
  `sale_note_unit_price` decimal(10,2) DEFAULT '0.00',
  `sale_note_status` tinyint(1) DEFAULT '1',
  `sale_note_desc` varchar(255) COLLATE utf8_unicode_ci DEFAULT '1',
  PRIMARY KEY (`sale_note_id`)
) ENGINE=InnoDB AUTO_INCREMENT=25 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- Dumping data for table rms_makro_home_stage.sale_note: ~24 rows (approximately)
DELETE FROM `sale_note`;
/*!40000 ALTER TABLE `sale_note` DISABLE KEYS */;
INSERT INTO `sale_note` (`sale_note_id`, `sale_note_detail_id`, `sale_note_item_note_id`, `sale_note_qty`, `sale_note_unit_price`, `sale_note_status`, `sale_note_desc`) VALUES
	(1, 1, 7, 1, 0.00, 0, '1'),
	(2, 1, 2, 1, 0.02, 0, '1'),
	(3, 3, 8, 1, 0.00, 1, '1'),
	(4, 20, 8, 1, 0.00, 1, '1'),
	(5, 32, 8, 1, 0.00, 0, '1'),
	(6, 32, 15, 1, 0.00, 0, '1'),
	(7, 59, 9, 1, 0.00, 1, '1'),
	(8, 60, 8, 1, 0.00, 1, '1'),
	(9, 66, 9, 1, 0.00, 0, '1'),
	(10, 93, 10, 2, 0.00, 1, '1'),
	(11, 95, 10, 1, 0.00, 1, '1'),
	(12, 109, 12, 1, 0.00, 1, '1'),
	(13, 134, 10, 1, 0.00, 0, '1'),
	(14, 155, 15, 1, 0.00, 0, '1'),
	(15, 156, 10, 1, 0.00, 0, '1'),
	(16, 162, 13, 1, 0.00, 1, '1'),
	(17, 163, 9, 1, 0.00, 0, '1'),
	(18, 163, 13, 1, 0.00, 1, '1'),
	(19, 169, 10, 1, 0.00, 1, '1'),
	(20, 172, 9, 1, 0.00, 0, '1'),
	(21, 173, 9, 1, 0.00, 0, '1'),
	(22, 191, 16, 2, 0.00, 1, '1'),
	(23, 286, 13, 1, 0.00, 0, '1'),
	(24, 286, 10, 1, 0.00, 1, '1');
/*!40000 ALTER TABLE `sale_note` ENABLE KEYS */;

-- Dumping structure for table rms_makro_home_stage.sale_order_return
DROP TABLE IF EXISTS `sale_order_return`;
CREATE TABLE IF NOT EXISTS `sale_order_return` (
  `sale_return_id` int(11) NOT NULL AUTO_INCREMENT,
  `sale_return_master_id` int(11) DEFAULT NULL,
  `sale_return_detail_id` int(11) DEFAULT NULL,
  `sale_return_qty` int(11) DEFAULT NULL,
  `sale_return_created_by` int(11) DEFAULT NULL,
  `sale_return_created_date` datetime DEFAULT NULL,
  PRIMARY KEY (`sale_return_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- Dumping data for table rms_makro_home_stage.sale_order_return: ~0 rows (approximately)
DELETE FROM `sale_order_return`;
/*!40000 ALTER TABLE `sale_order_return` DISABLE KEYS */;
/*!40000 ALTER TABLE `sale_order_return` ENABLE KEYS */;

-- Dumping structure for table rms_makro_home_stage.sale_return
DROP TABLE IF EXISTS `sale_return`;
CREATE TABLE IF NOT EXISTS `sale_return` (
  `sale_return_id` int(11) NOT NULL AUTO_INCREMENT,
  `sale_return_no` int(11) NOT NULL,
  `item_detail_id` int(11) NOT NULL,
  `measure_id` int(11) NOT NULL,
  `sale_return_qty` int(11) NOT NULL,
  `sale_return_price` decimal(10,2) NOT NULL,
  `sale_return_date` date NOT NULL,
  `sale_return_refund_date` date NOT NULL,
  `customer_id` int(11) NOT NULL,
  `sale_return_total` decimal(10,2) NOT NULL,
  `sale_return_created_by` int(11) NOT NULL,
  `sale_return_created_date` date NOT NULL,
  `sale_return_status` varchar(30) COLLATE utf8_unicode_ci NOT NULL,
  `sale_return_note` text COLLATE utf8_unicode_ci NOT NULL,
  `branch_id` text COLLATE utf8_unicode_ci NOT NULL,
  `sale_return_to_stock` int(11) NOT NULL,
  PRIMARY KEY (`sale_return_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- Dumping data for table rms_makro_home_stage.sale_return: ~0 rows (approximately)
DELETE FROM `sale_return`;
/*!40000 ALTER TABLE `sale_return` DISABLE KEYS */;
/*!40000 ALTER TABLE `sale_return` ENABLE KEYS */;

-- Dumping structure for table rms_makro_home_stage.shift
DROP TABLE IF EXISTS `shift`;
CREATE TABLE IF NOT EXISTS `shift` (
  `shift_id` int(11) NOT NULL AUTO_INCREMENT,
  `shift_name` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `shift_from` time DEFAULT NULL,
  `shift_until` time DEFAULT NULL,
  `shift_note` text COLLATE utf8_unicode_ci,
  `shift_created_date` date DEFAULT NULL,
  `shift_created_by` int(11) DEFAULT NULL,
  `shift_modified_date` date DEFAULT NULL,
  `shift_modified_by` int(11) DEFAULT NULL,
  `status` tinyint(1) DEFAULT '1' COMMENT '1=active , 0=deleted',
  PRIMARY KEY (`shift_id`)
) ENGINE=InnoDB AUTO_INCREMENT=8 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- Dumping data for table rms_makro_home_stage.shift: ~3 rows (approximately)
DELETE FROM `shift`;
/*!40000 ALTER TABLE `shift` DISABLE KEYS */;
INSERT INTO `shift` (`shift_id`, `shift_name`, `shift_from`, `shift_until`, `shift_note`, `shift_created_date`, `shift_created_by`, `shift_modified_date`, `shift_modified_by`, `status`) VALUES
	(5, 'Full Time', '08:00:00', '22:00:00', 'Full Time Shift', '2019-01-24', 19, NULL, NULL, 1),
	(6, 'Morning', '08:00:00', '16:00:00', '', '2019-01-24', 19, NULL, NULL, 1),
	(7, 'evening', '16:00:00', '22:00:00', '', '2019-01-24', 19, NULL, NULL, 1);
/*!40000 ALTER TABLE `shift` ENABLE KEYS */;

-- Dumping structure for table rms_makro_home_stage.slide_image
DROP TABLE IF EXISTS `slide_image`;
CREATE TABLE IF NOT EXISTS `slide_image` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `images` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=8 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- Dumping data for table rms_makro_home_stage.slide_image: 3 rows
DELETE FROM `slide_image`;
/*!40000 ALTER TABLE `slide_image` DISABLE KEYS */;
INSERT INTO `slide_image` (`id`, `name`, `images`) VALUES
	(1, 'Phnom Penh Happy Time', '1548129159download.jpg'),
	(2, 'Boy', '1548129612njspmissingkidjpg-f5c1145486f98ae0.jpg'),
	(3, 'Apple', '1548129664download.jpg');
/*!40000 ALTER TABLE `slide_image` ENABLE KEYS */;

-- Dumping structure for table rms_makro_home_stage.stock
DROP TABLE IF EXISTS `stock`;
CREATE TABLE IF NOT EXISTS `stock` (
  `stock_id` int(11) NOT NULL AUTO_INCREMENT,
  `branch_id` int(11) NOT NULL DEFAULT '0',
  `stock_qty` int(11) NOT NULL,
  `stock_item_id` int(11) NOT NULL,
  `measure_id` int(11) NOT NULL,
  `stock_expire_date` date NOT NULL,
  `stock_alert_date` date NOT NULL,
  `stock_modified_date` date NOT NULL,
  `stock_modified_by` int(11) NOT NULL,
  `stock_created_date` datetime NOT NULL,
  `stock_created_by` int(11) NOT NULL,
  `stock_location_id` int(11) DEFAULT NULL,
  `stock_costing` decimal(10,3) DEFAULT '0.000',
  `po_detail_id` int(11) DEFAULT NULL,
  PRIMARY KEY (`stock_id`)
) ENGINE=InnoDB AUTO_INCREMENT=11 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- Dumping data for table rms_makro_home_stage.stock: ~8 rows (approximately)
DELETE FROM `stock`;
/*!40000 ALTER TABLE `stock` DISABLE KEYS */;
INSERT INTO `stock` (`stock_id`, `branch_id`, `stock_qty`, `stock_item_id`, `measure_id`, `stock_expire_date`, `stock_alert_date`, `stock_modified_date`, `stock_modified_by`, `stock_created_date`, `stock_created_by`, `stock_location_id`, `stock_costing`, `po_detail_id`) VALUES
	(3, 39, 141, 1, 2, '2019-01-31', '2019-01-31', '0000-00-00', 0, '2019-01-23 10:54:24', 19, 2, 0.625, 1),
	(4, 41, 27, 1, 0, '2019-01-31', '2019-01-20', '0000-00-00', 0, '2019-01-23 13:48:15', 19, 1, 0.625, 1),
	(5, 41, 6, 1, 0, '2019-01-31', '2019-01-24', '0000-00-00', 0, '2019-01-23 13:51:13', 19, 5, 0.625, 1),
	(6, 41, 5200, 3, 6, '0000-00-00', '0000-00-00', '0000-00-00', 0, '2019-01-23 16:08:04', 19, 1, 0.002, 2),
	(7, 41, 7600, 4, 4, '0000-00-00', '0000-00-00', '0000-00-00', 0, '2019-01-23 16:08:04', 19, 1, 0.007, 3),
	(8, 39, 10, 2, 1, '2019-02-23', '2019-02-03', '0000-00-00', 0, '2019-01-24 15:30:12', 19, 2, 2.000, 4),
	(9, 39, 30, 1, 1, '2019-02-23', '2019-01-01', '0000-00-00', 0, '2019-01-24 15:30:12', 19, 2, 1.000, 5),
	(10, 41, 10, 2, 0, '2019-02-23', '2019-02-03', '0000-00-00', 0, '2019-01-24 15:39:06', 19, 5, 2.000, 4);
/*!40000 ALTER TABLE `stock` ENABLE KEYS */;

-- Dumping structure for table rms_makro_home_stage.stock_adjust
DROP TABLE IF EXISTS `stock_adjust`;
CREATE TABLE IF NOT EXISTS `stock_adjust` (
  `stock_adjust_id` int(11) NOT NULL AUTO_INCREMENT,
  `stock_adjust_item_id` int(11) NOT NULL,
  `stock_adjust_qty` int(11) NOT NULL,
  `measure_id` int(11) NOT NULL,
  `stock_adjust_note` text COLLATE utf8_unicode_ci NOT NULL,
  `stock_adjust_created_by` int(11) NOT NULL,
  `stock_adjust_created_date` date NOT NULL,
  `stock_adjust_modified_by` int(11) NOT NULL,
  `stock_adjust_modified_date` date NOT NULL,
  `stock_adjust_branch_id` int(11) NOT NULL,
  `stock_location_id` int(11) NOT NULL,
  PRIMARY KEY (`stock_adjust_id`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- Dumping data for table rms_makro_home_stage.stock_adjust: ~2 rows (approximately)
DELETE FROM `stock_adjust`;
/*!40000 ALTER TABLE `stock_adjust` DISABLE KEYS */;
INSERT INTO `stock_adjust` (`stock_adjust_id`, `stock_adjust_item_id`, `stock_adjust_qty`, `measure_id`, `stock_adjust_note`, `stock_adjust_created_by`, `stock_adjust_created_date`, `stock_adjust_modified_by`, `stock_adjust_modified_date`, `stock_adjust_branch_id`, `stock_location_id`) VALUES
	(1, 1, 30, 1, '', 19, '2019-01-23', 0, '0000-00-00', 39, 2),
	(2, 2, 10, 1, 'Increase 10 qty', 19, '2019-01-24', 0, '0000-00-00', 39, 2);
/*!40000 ALTER TABLE `stock_adjust` ENABLE KEYS */;

-- Dumping structure for table rms_makro_home_stage.stock_location
DROP TABLE IF EXISTS `stock_location`;
CREATE TABLE IF NOT EXISTS `stock_location` (
  `stock_location_id` int(11) NOT NULL AUTO_INCREMENT,
  `stock_location_name` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `stock_location_note` text COLLATE utf8_unicode_ci,
  `stock_location_branch_id` int(11) DEFAULT NULL,
  `stock_location_created_date` date DEFAULT NULL,
  `stock_location_created_by` int(11) DEFAULT NULL,
  `stock_location_modified_date` date DEFAULT NULL,
  `stock_location_modified_by` int(11) DEFAULT NULL,
  `status` tinyint(1) DEFAULT '1' COMMENT '1=active,0=deleted',
  PRIMARY KEY (`stock_location_id`)
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- Dumping data for table rms_makro_home_stage.stock_location: ~5 rows (approximately)
DELETE FROM `stock_location`;
/*!40000 ALTER TABLE `stock_location` DISABLE KEYS */;
INSERT INTO `stock_location` (`stock_location_id`, `stock_location_name`, `stock_location_note`, `stock_location_branch_id`, `stock_location_created_date`, `stock_location_created_by`, `stock_location_modified_date`, `stock_location_modified_by`, `status`) VALUES
	(1, 'Main Stock', '', 41, '2018-12-26', 19, '2019-01-23', 19, 1),
	(2, 'SR Main Stock', '', 39, '2018-12-27', 19, NULL, NULL, 1),
	(3, 'Fridge terrace', '', 1, '2019-01-14', 19, NULL, NULL, 0),
	(4, 'Fridge 2', '', 1, '2019-01-14', 19, NULL, NULL, 0),
	(5, 'st pp 2', '', 41, '2019-01-23', 19, NULL, NULL, 1);
/*!40000 ALTER TABLE `stock_location` ENABLE KEYS */;

-- Dumping structure for table rms_makro_home_stage.stock_transfer
DROP TABLE IF EXISTS `stock_transfer`;
CREATE TABLE IF NOT EXISTS `stock_transfer` (
  `stock_transffer_id` int(11) NOT NULL AUTO_INCREMENT,
  `stock_transffer_location_from` int(11) DEFAULT '0',
  `stock_transffer_location_to` int(11) DEFAULT '0',
  `stock_transffer_branch_id_from` int(11) DEFAULT '0',
  `stock_transffer_branch_id_to` int(11) DEFAULT '0',
  `stock_transffer_item_detail_id` int(11) DEFAULT '0',
  `stock_transffer_qty` int(11) DEFAULT '0',
  `stock_transffer_measure_id` int(11) DEFAULT '0',
  `stock_transffer_measure_qty` int(11) DEFAULT '0',
  `stock_transffer_status` varchar(50) COLLATE utf8_unicode_ci DEFAULT '0',
  `stock_transffer_created_by` int(11) DEFAULT '0',
  `stock_transffer_created_date` datetime DEFAULT '0000-00-00 00:00:00',
  `stock_transffer_modified_by` int(11) DEFAULT '0',
  `stock_transffer_modified_date` datetime DEFAULT '0000-00-00 00:00:00',
  `stock_transffer_note` text COLLATE utf8_unicode_ci,
  PRIMARY KEY (`stock_transffer_id`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- Dumping data for table rms_makro_home_stage.stock_transfer: ~4 rows (approximately)
DELETE FROM `stock_transfer`;
/*!40000 ALTER TABLE `stock_transfer` DISABLE KEYS */;
INSERT INTO `stock_transfer` (`stock_transffer_id`, `stock_transffer_location_from`, `stock_transffer_location_to`, `stock_transffer_branch_id_from`, `stock_transffer_branch_id_to`, `stock_transffer_item_detail_id`, `stock_transffer_qty`, `stock_transffer_measure_id`, `stock_transffer_measure_qty`, `stock_transffer_status`, `stock_transffer_created_by`, `stock_transffer_created_date`, `stock_transffer_modified_by`, `stock_transffer_modified_date`, `stock_transffer_note`) VALUES
	(1, 2, 1, 39, 41, 1, 4, 1, 1, '1', 19, '2019-01-23 11:52:11', 19, '2019-01-23 13:48:15', ''),
	(2, 2, 5, 39, 41, 1, 6, 1, 1, '1', 19, '2019-01-23 13:51:07', 19, '2019-01-23 13:51:13', ''),
	(3, 2, 1, 39, 41, 1, 2, 2, 24, '1', 19, '2019-01-23 17:16:43', 19, '2019-01-23 17:16:47', ''),
	(4, 2, 5, 39, 41, 2, 10, 1, 1, '1', 19, '2019-01-24 15:38:29', 19, '2019-01-24 15:39:06', '');
/*!40000 ALTER TABLE `stock_transfer` ENABLE KEYS */;

-- Dumping structure for table rms_makro_home_stage.stock_waste
DROP TABLE IF EXISTS `stock_waste`;
CREATE TABLE IF NOT EXISTS `stock_waste` (
  `stock_waste_id` int(11) NOT NULL AUTO_INCREMENT,
  `stock_waste_item_id` int(11) NOT NULL,
  `stock_waste_qty` int(11) NOT NULL,
  `measure_id` int(11) NOT NULL,
  `stock_waste_note` text COLLATE utf8_unicode_ci NOT NULL,
  `stock_waste_created_by` int(11) NOT NULL,
  `stock_waste_created_date` date NOT NULL,
  `stock_waste_modified_by` int(11) NOT NULL,
  `stock_waste_modified_date` date NOT NULL,
  `stock_waste_branch_id` int(11) NOT NULL,
  `stock_location_id` int(11) NOT NULL,
  PRIMARY KEY (`stock_waste_id`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- Dumping data for table rms_makro_home_stage.stock_waste: ~2 rows (approximately)
DELETE FROM `stock_waste`;
/*!40000 ALTER TABLE `stock_waste` DISABLE KEYS */;
INSERT INTO `stock_waste` (`stock_waste_id`, `stock_waste_item_id`, `stock_waste_qty`, `measure_id`, `stock_waste_note`, `stock_waste_created_by`, `stock_waste_created_date`, `stock_waste_modified_by`, `stock_waste_modified_date`, `stock_waste_branch_id`, `stock_location_id`) VALUES
	(1, 1, 60, 1, '', 19, '2019-01-23', 0, '0000-00-00', 39, 2),
	(2, 2, 10, 1, 'Lose', 19, '2019-01-24', 0, '0000-00-00', 39, 2);
/*!40000 ALTER TABLE `stock_waste` ENABLE KEYS */;

-- Dumping structure for table rms_makro_home_stage.supplier
DROP TABLE IF EXISTS `supplier`;
CREATE TABLE IF NOT EXISTS `supplier` (
  `supplier_id` int(11) NOT NULL AUTO_INCREMENT,
  `supplier_name` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `supplier_address` text COLLATE utf8_unicode_ci,
  `supplier_phone` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `supplier_note` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `supplier_created_date` date DEFAULT NULL,
  `supplier_created_by` int(11) DEFAULT NULL,
  `supplier_modified_by` int(11) DEFAULT NULL,
  `supplier_modified_date` date DEFAULT NULL,
  `supplier_status` tinyint(1) DEFAULT '1',
  PRIMARY KEY (`supplier_id`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci COMMENT='status=1 "ACTIVE"  ;  status=0 "DELETE"';

-- Dumping data for table rms_makro_home_stage.supplier: ~3 rows (approximately)
DELETE FROM `supplier`;
/*!40000 ALTER TABLE `supplier` DISABLE KEYS */;
INSERT INTO `supplier` (`supplier_id`, `supplier_name`, `supplier_address`, `supplier_phone`, `supplier_note`, `supplier_created_date`, `supplier_created_by`, `supplier_modified_by`, `supplier_modified_date`, `supplier_status`) VALUES
	(1, 'ABC Extra Stout', 'PP', '016247716', '', '2018-12-26', 19, NULL, NULL, 1),
	(2, 'cocala', '', '012568567', '', '2019-01-23', 19, NULL, NULL, 1),
	(3, 'general supplier', '', '01256734', '', '2019-01-23', 19, NULL, NULL, 1);
/*!40000 ALTER TABLE `supplier` ENABLE KEYS */;

-- Dumping structure for table rms_makro_home_stage.table_template
DROP TABLE IF EXISTS `table_template`;
CREATE TABLE IF NOT EXISTS `table_template` (
  `table_template_id` int(11) NOT NULL AUTO_INCREMENT,
  `table_template_width` float NOT NULL,
  `table_template_height` float NOT NULL,
  `table_template_bg_color` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `table_template_fore_color` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `table_template_outline_color` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `table_template_outline_width` float NOT NULL,
  `table_template_busy_color` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `table_template_booking_color` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `table_template_split_color` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `table_template_printed_color` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `table_template_branch_id` int(11) NOT NULL,
  `table_template_created_by` int(11) NOT NULL,
  `table_template_created_date` date NOT NULL,
  `table_template_font_size` int(11) NOT NULL,
  PRIMARY KEY (`table_template_id`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- Dumping data for table rms_makro_home_stage.table_template: ~0 rows (approximately)
DELETE FROM `table_template`;
/*!40000 ALTER TABLE `table_template` DISABLE KEYS */;
INSERT INTO `table_template` (`table_template_id`, `table_template_width`, `table_template_height`, `table_template_bg_color`, `table_template_fore_color`, `table_template_outline_color`, `table_template_outline_width`, `table_template_busy_color`, `table_template_booking_color`, `table_template_split_color`, `table_template_printed_color`, `table_template_branch_id`, `table_template_created_by`, `table_template_created_date`, `table_template_font_size`) VALUES
	(1, 100, 90, '#0000a0', '#ffffff', '#8080ff', 3, '#ff0000', '#ff8040', '#8000ff', '#408080', 1, 19, '2018-11-06', 24);
/*!40000 ALTER TABLE `table_template` ENABLE KEYS */;

-- Dumping structure for table rms_makro_home_stage.tax
DROP TABLE IF EXISTS `tax`;
CREATE TABLE IF NOT EXISTS `tax` (
  `tax_id` int(255) NOT NULL AUTO_INCREMENT,
  `tax_amount` int(11) NOT NULL,
  `tax_created_date` date DEFAULT NULL,
  `tax_created_by` int(11) DEFAULT NULL,
  `tax_modified_by` int(11) DEFAULT NULL,
  `tax_modified_date` date DEFAULT NULL,
  `tax_des` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  PRIMARY KEY (`tax_id`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- Dumping data for table rms_makro_home_stage.tax: ~0 rows (approximately)
DELETE FROM `tax`;
/*!40000 ALTER TABLE `tax` DISABLE KEYS */;
INSERT INTO `tax` (`tax_id`, `tax_amount`, `tax_created_date`, `tax_created_by`, `tax_modified_by`, `tax_modified_date`, `tax_des`) VALUES
	(1, 10, '2016-05-23', 1, 19, '2019-01-25', 'kkkkk');
/*!40000 ALTER TABLE `tax` ENABLE KEYS */;

-- Dumping structure for table rms_makro_home_stage.transaction
DROP TABLE IF EXISTS `transaction`;
CREATE TABLE IF NOT EXISTS `transaction` (
  `transaction_id` int(11) NOT NULL AUTO_INCREMENT,
  `transaction_customer_id` int(11) NOT NULL,
  `transaction_by` int(11) NOT NULL,
  `transaction_date` datetime NOT NULL,
  `transaction_amount` decimal(10,2) NOT NULL DEFAULT '0.00',
  `transaction_balance` decimal(10,2) NOT NULL DEFAULT '0.00',
  `transaction_remain` decimal(10,2) NOT NULL DEFAULT '0.00',
  `transaction_action` tinyint(1) NOT NULL,
  `cash_id` int(11) NOT NULL,
  `branch_id` int(11) NOT NULL,
  PRIMARY KEY (`transaction_id`)
) ENGINE=InnoDB AUTO_INCREMENT=20 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci COMMENT='2=RETURN/1=TOP/0=SPEND';

-- Dumping data for table rms_makro_home_stage.transaction: ~19 rows (approximately)
DELETE FROM `transaction`;
/*!40000 ALTER TABLE `transaction` DISABLE KEYS */;
INSERT INTO `transaction` (`transaction_id`, `transaction_customer_id`, `transaction_by`, `transaction_date`, `transaction_amount`, `transaction_balance`, `transaction_remain`, `transaction_action`, `cash_id`, `branch_id`) VALUES
	(1, 1, 19, '2018-12-26 11:18:47', 10.00, 10.00, 0.00, 1, 0, 1),
	(2, 1, 19, '2018-12-26 11:19:28', 10.00, 20.00, 10.00, 1, 0, 1),
	(3, 1, 19, '2018-12-26 14:20:19', 10.00, 30.00, 20.00, 1, 2, 1),
	(4, 1, 19, '2018-12-28 11:35:48', 47.72, 102.28, 150.00, 0, 4, 1),
	(5, 1, 19, '2018-12-28 11:36:31', 9.92, 92.36, 102.28, 0, 4, 1),
	(6, 2, 19, '2018-12-28 16:08:58', 100.00, 100.00, 0.00, 1, 0, 1),
	(7, 2, 19, '2018-12-28 16:09:18', 100.00, 100.00, 0.00, 1, 0, 1),
	(8, 2, 19, '2018-12-28 16:10:45', 50.00, 50.00, 100.00, 2, 0, 1),
	(9, 1, 19, '2018-12-29 11:25:36', 1.00, 11.00, 10.00, 1, 20, 1),
	(10, 1, 19, '2018-12-29 11:26:38', 1.00, 12.00, 11.00, 1, 20, 1),
	(11, 1, 19, '2018-12-29 11:27:10', 1.00, 13.00, 12.00, 1, 20, 1),
	(12, 4, 19, '2018-12-29 11:32:36', 11.00, 11.00, 0.00, 1, 20, 1),
	(13, 4, 19, '2018-12-29 11:33:56', 11.00, 11.00, 0.00, 1, 20, 1),
	(14, 4, 19, '2018-12-29 11:34:03', 11.00, 11.00, 0.00, 1, 20, 1),
	(15, 1, 19, '2018-12-31 15:22:05', 13.00, 0.00, 13.00, 2, 32, 1),
	(16, 1, 19, '2018-12-31 15:24:06', 11.00, 11.00, 0.00, 1, 0, 1),
	(17, 1, 19, '2018-12-31 15:56:37', 24.33, 975.67, 1000.00, 0, 32, 1),
	(18, 1, 19, '2019-01-14 11:42:24', 10.00, 985.67, 975.67, 1, 47, 1),
	(19, 2, 19, '2019-01-14 11:44:13', 20.00, 70.00, 50.00, 1, 47, 1);
/*!40000 ALTER TABLE `transaction` ENABLE KEYS */;

-- Dumping structure for table rms_makro_home_stage.transaction_alert
DROP TABLE IF EXISTS `transaction_alert`;
CREATE TABLE IF NOT EXISTS `transaction_alert` (
  `transaction_id` int(11) DEFAULT NULL,
  `transaction_customer_id` int(11) DEFAULT NULL,
  `transaction_by` int(11) DEFAULT NULL,
  `transaction_date` datetime DEFAULT NULL,
  `transaction_amount` decimal(10,2) NOT NULL DEFAULT '0.00',
  `transaction_balance` decimal(10,2) DEFAULT NULL,
  `transaction_remain` decimal(10,2) DEFAULT NULL,
  `transaction_action` tinyint(1) DEFAULT NULL,
  `cash_id` int(11) DEFAULT NULL,
  `branch_id` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- Dumping data for table rms_makro_home_stage.transaction_alert: ~0 rows (approximately)
DELETE FROM `transaction_alert`;
/*!40000 ALTER TABLE `transaction_alert` DISABLE KEYS */;
/*!40000 ALTER TABLE `transaction_alert` ENABLE KEYS */;

-- Dumping structure for table rms_makro_home_stage.user
DROP TABLE IF EXISTS `user`;
CREATE TABLE IF NOT EXISTS `user` (
  `user_id` int(11) NOT NULL AUTO_INCREMENT,
  `employee_id` int(11) NOT NULL,
  `user_name` varchar(255) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `user_password` varchar(255) NOT NULL,
  `user_note` text,
  `user_created_date` date DEFAULT NULL,
  `user_created_by` int(11) DEFAULT NULL,
  `user_modified_by` int(11) DEFAULT NULL,
  `user_modified_date` date DEFAULT NULL,
  `user_printer_location_id` int(11) DEFAULT NULL,
  `is_supper_user` tinyint(1) DEFAULT '0',
  `status` tinyint(1) DEFAULT '1' COMMENT '1=active,0=deleted',
  PRIMARY KEY (`user_id`)
) ENGINE=InnoDB AUTO_INCREMENT=43 DEFAULT CHARSET=latin1;

-- Dumping data for table rms_makro_home_stage.user: ~5 rows (approximately)
DELETE FROM `user`;
/*!40000 ALTER TABLE `user` DISABLE KEYS */;
INSERT INTO `user` (`user_id`, `employee_id`, `user_name`, `user_password`, `user_note`, `user_created_date`, `user_created_by`, `user_modified_by`, `user_modified_date`, `user_printer_location_id`, `is_supper_user`, `status`) VALUES
	(24, 19, 'admin', 'CSsIeDZFdGFPH52IS6qe3GccQBhKtBQtmC1zb3eOFzuE2nVn8JOHMmBVEkn1cbnFzH23ypqkwAtbTMlKYEwNAQ==', '', '2019-01-24', 19, NULL, NULL, 1, 1, 1),
	(39, 36, 'rasy', 'CZWfbIYyxsdbLDMZky/FJ2rqBNQtXRRU7klGFLDfdzrtVc1z0F+ahSDVvw8rQLZvDaqS1fnKS9g3uetTKrOPdQ==', '', '2019-01-24', 19, NULL, NULL, 1, 0, 1),
	(40, 37, 'englay', 'wVX5WLv/IK9NO+rgkL7RdyXIf0yJzcR/Ht1FyL02/oL+E5yJfO/0p9hUOsj5P65TS3T3/0I5Phb6RgYx+Jmo5A==', '', '2019-01-24', 19, NULL, NULL, 1, 0, 1),
	(41, 38, 'rasy', 'xoDRPVYuMso+jpJC3cXJXc8mJZID7SMU4Vob2L1zcKQltBJ6r1z3UBVvlM4rxNK/y0ZgLPMHQbbwxyPeSyfMJA==', '', '2019-01-24', 19, NULL, NULL, 1, 0, 1),
	(42, 39, 'lay', 'vVmf2VsOjA/MO50sxFnAID9yTz9Ky7wRcWOMdge230fsKTXrP/o2LP60WNk/Iy9Z9c9mBdTzNpnD8qdiG5IwYQ==', '', '2019-01-24', 19, NULL, NULL, 1, 0, 1);
/*!40000 ALTER TABLE `user` ENABLE KEYS */;

-- Dumping structure for table rms_makro_home_stage.user_autologin
DROP TABLE IF EXISTS `user_autologin`;
CREATE TABLE IF NOT EXISTS `user_autologin` (
  `key_id` char(32) COLLATE utf8_bin NOT NULL,
  `user_id` int(11) NOT NULL DEFAULT '0',
  `user_agent` varchar(150) COLLATE utf8_bin NOT NULL,
  `last_ip` varchar(40) COLLATE utf8_bin NOT NULL,
  `last_login` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  PRIMARY KEY (`key_id`,`user_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin;

-- Dumping data for table rms_makro_home_stage.user_autologin: ~0 rows (approximately)
DELETE FROM `user_autologin`;
/*!40000 ALTER TABLE `user_autologin` DISABLE KEYS */;
/*!40000 ALTER TABLE `user_autologin` ENABLE KEYS */;

-- Dumping structure for table rms_makro_home_stage.user_type
DROP TABLE IF EXISTS `user_type`;
CREATE TABLE IF NOT EXISTS `user_type` (
  `user_type_id` int(11) NOT NULL AUTO_INCREMENT,
  `user_type_name` varchar(255) NOT NULL,
  `user_type_des` varchar(255) DEFAULT NULL,
  `user_type_created_date` date DEFAULT NULL,
  `user_type_created_by` int(11) DEFAULT NULL,
  `user_type_modified_by` int(11) DEFAULT NULL,
  `user_type_modified_date` date DEFAULT NULL,
  PRIMARY KEY (`user_type_id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- Dumping data for table rms_makro_home_stage.user_type: ~0 rows (approximately)
DELETE FROM `user_type`;
/*!40000 ALTER TABLE `user_type` DISABLE KEYS */;
/*!40000 ALTER TABLE `user_type` ENABLE KEYS */;

-- Dumping structure for view rms_makro_home_stage.permission
DROP VIEW IF EXISTS `permission`;
-- Creating temporary table to overcome VIEW dependency errors
CREATE TABLE `permission` (
	`permission_id` INT(11) NOT NULL,
	`permission_page_id` INT(11) NOT NULL,
	`position_id` INT(11) NULL,
	`permission_enable` TINYINT(4) NOT NULL,
	`permission_add` TINYINT(4) NOT NULL,
	`permission_edit` TINYINT(4) NOT NULL,
	`permission_delete` TINYINT(4) NOT NULL,
	`permission_viewall` TINYINT(4) NULL,
	`permission_follow_by` INT(11) NULL,
	`permission_page_only` TINYINT(4) NULL,
	`permission_name` VARCHAR(255) NOT NULL COLLATE 'utf8_unicode_ci',
	`permission_page_id_parent` INT(11) NOT NULL,
	`permission_ordering` INT(11) NOT NULL,
	`permission_control` VARCHAR(255) NOT NULL COLLATE 'utf8_unicode_ci',
	`permission_class` VARCHAR(255) NOT NULL COLLATE 'utf8_unicode_ci',
	`permission_active` TINYINT(1) NOT NULL,
	`permission_name_kh` VARCHAR(255) NULL COLLATE 'utf8_unicode_ci',
	`page_controller` VARCHAR(255) NOT NULL COLLATE 'utf8_unicode_ci',
	`page_img` VARCHAR(255) NOT NULL COLLATE 'utf8_unicode_ci'
) ENGINE=MyISAM;

-- Dumping structure for view rms_makro_home_stage.v_cash_register
DROP VIEW IF EXISTS `v_cash_register`;
-- Creating temporary table to overcome VIEW dependency errors
CREATE TABLE `v_cash_register` (
	`cash_id` INT(11) NOT NULL,
	`cash_user_id` INT(11) NULL,
	`cash_startdate` DATETIME NULL,
	`cash_enddate` DATETIME NULL,
	`cash_branch_id` INT(11) NULL,
	`user_name` VARCHAR(500) NULL COLLATE 'utf8_unicode_ci',
	`cash_amount` DECIMAL(10,2) NOT NULL,
	`cash_amount_kh` DECIMAL(10,0) NOT NULL,
	`cash_note` VARCHAR(255) NULL COLLATE 'utf8_unicode_ci',
	`total_invoice` BIGINT(21) NULL,
	`paid_invoice` BIGINT(21) NULL,
	`void_invoice` BIGINT(21) NULL,
	`total_member_pay` DECIMAL(32,2) NOT NULL
) ENGINE=MyISAM;

-- Dumping structure for view rms_makro_home_stage.v_cash_register_active
DROP VIEW IF EXISTS `v_cash_register_active`;
-- Creating temporary table to overcome VIEW dependency errors
CREATE TABLE `v_cash_register_active` (
	`cash_id` INT(11) NOT NULL,
	`cash_user_id` INT(11) NULL,
	`cash_amount` DECIMAL(10,2) NULL,
	`cash_startdate` DATETIME NULL,
	`cash_enddate` DATETIME NULL,
	`cash_branch_id` INT(11) NULL,
	`cash_status` VARCHAR(255) NULL COLLATE 'utf8_unicode_ci'
) ENGINE=MyISAM;

-- Dumping structure for view rms_makro_home_stage.v_category
DROP VIEW IF EXISTS `v_category`;
-- Creating temporary table to overcome VIEW dependency errors
CREATE TABLE `v_category` (
	`category_id` INT(11) NOT NULL,
	`category_name` VARCHAR(100) NULL COLLATE 'utf8_unicode_ci',
	`category_description` TEXT NULL COLLATE 'utf8_unicode_ci',
	`recorder` VARCHAR(500) NULL COLLATE 'utf8_unicode_ci',
	`category_created_date` DATE NULL,
	`category_photo` VARCHAR(255) NULL COLLATE 'utf8_unicode_ci'
) ENGINE=MyISAM;

-- Dumping structure for view rms_makro_home_stage.v_customer_detail
DROP VIEW IF EXISTS `v_customer_detail`;
-- Creating temporary table to overcome VIEW dependency errors
CREATE TABLE `v_customer_detail` (
	`customer_id` INT(11) NOT NULL,
	`customer_name` VARCHAR(255) NOT NULL COLLATE 'utf8_unicode_ci',
	`customer_gender` VARCHAR(255) NOT NULL COLLATE 'latin1_swedish_ci',
	`customer_type_id` INT(11) NOT NULL,
	`customer_address` VARCHAR(255) NULL COLLATE 'latin1_swedish_ci',
	`customer_email` VARCHAR(255) NOT NULL COLLATE 'latin1_swedish_ci',
	`customer_dob` DATE NULL,
	`customer_phone` VARCHAR(255) NULL COLLATE 'latin1_swedish_ci',
	`customer_created_date` DATETIME NULL,
	`customer_created_by` VARCHAR(255) NULL COLLATE 'utf8_unicode_ci',
	`branch_name` VARCHAR(255) NOT NULL COLLATE 'utf8_unicode_ci'
) ENGINE=MyISAM;

-- Dumping structure for view rms_makro_home_stage.v_employee
DROP VIEW IF EXISTS `v_employee`;
-- Creating temporary table to overcome VIEW dependency errors
CREATE TABLE `v_employee` (
	`employee_id` INT(11) NOT NULL,
	`employee_brand_id` INT(11) NOT NULL,
	`employee_position_id` VARCHAR(255) NULL COLLATE 'latin1_swedish_ci',
	`employee_shift_id` INT(11) NULL,
	`employee_name` VARCHAR(255) NULL COLLATE 'utf8_unicode_ci',
	`employee_sex` VARCHAR(255) NULL COLLATE 'latin1_swedish_ci',
	`employee_email` VARCHAR(255) NULL COLLATE 'latin1_swedish_ci',
	`employee_dob` DATE NULL,
	`employee_address` VARCHAR(255) NULL COLLATE 'latin1_swedish_ci',
	`employee_phone` VARCHAR(255) NULL COLLATE 'latin1_swedish_ci',
	`employee_note` VARCHAR(255) NULL COLLATE 'latin1_swedish_ci',
	`employee_salary` INT(11) NULL,
	`employee_hired_date` DATE NULL,
	`branch_name` VARCHAR(255) NOT NULL COLLATE 'utf8_unicode_ci',
	`position_name` VARCHAR(255) NULL COLLATE 'latin1_swedish_ci',
	`shift_name` VARCHAR(255) NULL COLLATE 'utf8_unicode_ci',
	`employee_is_seller` TINYINT(4) NULL,
	`employee_stock_location_id` INT(11) NULL,
	`stock_location_name` VARCHAR(255) NULL COLLATE 'utf8_unicode_ci',
	`employee_card` VARCHAR(255) NULL COLLATE 'utf8_general_ci',
	`status` TINYINT(1) NOT NULL
) ENGINE=MyISAM;

-- Dumping structure for view rms_makro_home_stage.v_expense
DROP VIEW IF EXISTS `v_expense`;
-- Creating temporary table to overcome VIEW dependency errors
CREATE TABLE `v_expense` (
	`expense_id` INT(11) NOT NULL,
	`expense_detail_id` INT(11) NULL,
	`expense_nos` VARCHAR(7) NOT NULL COLLATE 'utf8mb4_general_ci',
	`expense_no_prefix` VARCHAR(265) NULL COLLATE 'utf8_bin',
	`expense_no` INT(11) NOT NULL,
	`expense_chart_number` VARCHAR(50) NULL COLLATE 'utf8_unicode_ci',
	`expense_detail_name` VARCHAR(50) NULL COLLATE 'utf8_unicode_ci',
	`expense_date` DATE NULL,
	`expense_type_id` INT(255) NULL,
	`expense_type_name` VARCHAR(255) NULL COLLATE 'utf8_unicode_ci',
	`expense_amount` DECIMAL(10,2) NULL,
	`expense_created_date` DATE NOT NULL,
	`expense_modified_date` DATETIME NULL,
	`expense_status` TEXT NULL COLLATE 'utf8_unicode_ci',
	`recorder` VARCHAR(255) NULL COLLATE 'utf8_unicode_ci',
	`expense_note` VARCHAR(255) NULL COLLATE 'utf8_unicode_ci',
	`expense_branch_id` INT(11) NULL,
	`branch_name` VARCHAR(255) NULL COLLATE 'utf8_unicode_ci',
	`expense_created_by` INT(255) NOT NULL,
	`modified_by` VARCHAR(255) NULL COLLATE 'utf8_unicode_ci'
) ENGINE=MyISAM;

-- Dumping structure for view rms_makro_home_stage.v_expense_detail
DROP VIEW IF EXISTS `v_expense_detail`;
-- Creating temporary table to overcome VIEW dependency errors
CREATE TABLE `v_expense_detail` (
	`expense_detail_id` INT(11) NOT NULL,
	`expense_type_id` INT(11) NOT NULL,
	`expense_type_name` VARCHAR(255) NOT NULL COLLATE 'utf8_unicode_ci',
	`expense_detail_name` VARCHAR(50) NOT NULL COLLATE 'utf8_unicode_ci',
	`expense_chart_number` VARCHAR(50) NOT NULL COLLATE 'utf8_unicode_ci',
	`expense_detail_created_date` DATE NOT NULL,
	`employee_name` VARCHAR(255) NULL COLLATE 'utf8_unicode_ci',
	`expense_detail_modified_by` VARCHAR(255) NULL COLLATE 'utf8_unicode_ci',
	`expense_detail_modified_date` DATETIME NOT NULL,
	`expense_detail_status` TINYINT(4) NULL
) ENGINE=MyISAM;

-- Dumping structure for view rms_makro_home_stage.v_expense_type
DROP VIEW IF EXISTS `v_expense_type`;
-- Creating temporary table to overcome VIEW dependency errors
CREATE TABLE `v_expense_type` (
	`expense_type_id` INT(11) NOT NULL,
	`expense_chart_number` INT(11) NULL,
	`expense_type_name` VARCHAR(255) NOT NULL COLLATE 'utf8_unicode_ci',
	`expense_type_des` VARCHAR(255) NOT NULL COLLATE 'utf8_unicode_ci',
	`expense_type_created_by` INT(255) NOT NULL,
	`expense_type_created_date` DATE NOT NULL,
	`expense_type_modified_by` INT(11) NULL,
	`expense_type_modified_date` DATETIME NULL,
	`recorder` VARCHAR(255) NULL COLLATE 'utf8_unicode_ci',
	`modified_by` VARCHAR(255) NULL COLLATE 'utf8_unicode_ci'
) ENGINE=MyISAM;

-- Dumping structure for view rms_makro_home_stage.v_floor_table_layout
DROP VIEW IF EXISTS `v_floor_table_layout`;
-- Creating temporary table to overcome VIEW dependency errors
CREATE TABLE `v_floor_table_layout` (
	`layout_id` INT(11) NOT NULL,
	`floor_id` INT(11) NOT NULL,
	`floor_name` VARCHAR(255) NOT NULL COLLATE 'utf8_unicode_ci',
	`layout_name` VARCHAR(255) NOT NULL COLLATE 'utf8_unicode_ci',
	`layout_manage_by` INT(11) NOT NULL,
	`employee_name` VARCHAR(255) NULL COLLATE 'utf8_unicode_ci'
) ENGINE=MyISAM;

-- Dumping structure for view rms_makro_home_stage.v_happy_hour
DROP VIEW IF EXISTS `v_happy_hour`;
-- Creating temporary table to overcome VIEW dependency errors
CREATE TABLE `v_happy_hour` (
	`id` INT(11) NOT NULL,
	`item_type_id` INT(11) NOT NULL,
	`happy_hour_name` VARCHAR(255) NULL COLLATE 'utf8_unicode_ci',
	`item_type_name` VARCHAR(255) NULL COLLATE 'utf8_unicode_ci',
	`happy_hour_date` DATE NULL,
	`happy_hour_start_time` TIME NULL,
	`happy_hour_end_time` TIME NULL,
	`happy_hour_discount` INT(11) NULL,
	`happy_hour_description` VARCHAR(255) NULL COLLATE 'utf8_unicode_ci',
	`happy_hour_status` VARCHAR(255) NULL COLLATE 'utf8_unicode_ci'
) ENGINE=MyISAM;

-- Dumping structure for view rms_makro_home_stage.v_ingredient
DROP VIEW IF EXISTS `v_ingredient`;
-- Creating temporary table to overcome VIEW dependency errors
CREATE TABLE `v_ingredient` (
	`ingredient_id` INT(11) NOT NULL,
	`item_name` MEDIUMTEXT NULL COLLATE 'utf8_bin',
	`item_detail_name` TEXT NULL COLLATE 'utf8_unicode_ci',
	`item_detail_part_number` VARCHAR(5) NULL COLLATE 'utf8_unicode_ci',
	`ingredient_name` TEXT NULL COLLATE 'utf8_unicode_ci',
	`item_detail_retail_price` DECIMAL(10,2) NULL,
	`ingredient_qty` VARCHAR(47) NULL COLLATE 'utf8mb4_general_ci',
	`costing` VARCHAR(62) NULL COLLATE 'utf8mb4_general_ci',
	`total_cost` DECIMAL(10,2) NULL,
	`measure_name` VARCHAR(50) NULL COLLATE 'utf8_unicode_ci',
	`measure_id` INT(11) NULL,
	`recorder` VARCHAR(255) NULL COLLATE 'utf8_unicode_ci',
	`modified_by` VARCHAR(255) NULL COLLATE 'utf8_unicode_ci',
	`ingredient_modified_date` DATE NULL,
	`ingredient_created_date` DATE NULL,
	`ingredient_status` VARCHAR(50) NULL COLLATE 'latin1_swedish_ci',
	`ingredient_no` INT(11) NOT NULL,
	`ingredient_desc` TEXT NULL COLLATE 'latin1_swedish_ci',
	`item_detail_id` INT(11) NULL,
	`ingredient_item_detail_id` INT(11) NULL,
	`item_main_retail_price` DECIMAL(10,2) NULL
) ENGINE=MyISAM;

-- Dumping structure for view rms_makro_home_stage.v_item_detail
DROP VIEW IF EXISTS `v_item_detail`;
-- Creating temporary table to overcome VIEW dependency errors
CREATE TABLE `v_item_detail` (
	`item_type_id` INT(11) NULL,
	`item_type_name` VARCHAR(255) NULL COLLATE 'utf8_unicode_ci',
	`item_type_is_car_wash` TINYINT(4) NULL,
	`item_type_is_ingredient` TINYINT(4) NULL,
	`item_detail_part_number` VARCHAR(255) NULL COLLATE 'utf8_unicode_ci',
	`item_detail_id` INT(11) NOT NULL,
	`item_detail_name` TEXT NULL COLLATE 'utf8_unicode_ci',
	`item_detail_whole_price` DECIMAL(10,2) NULL,
	`item_detail_retail_price` DECIMAL(10,2) NULL,
	`item_detail_created_by` INT(11) NULL,
	`item_detail_created_date` DATE NULL,
	`item_detail_des` VARCHAR(255) NULL COLLATE 'latin1_swedish_ci',
	`item_detail_modified_by` INT(11) NULL,
	`item_detail_modified_date` DATE NULL,
	`recorder` VARCHAR(255) NULL COLLATE 'utf8_unicode_ci',
	`item_detail_photo` VARCHAR(255) NULL COLLATE 'latin1_swedish_ci',
	`printer_location_name` VARCHAR(255) NULL COLLATE 'utf8_unicode_ci',
	`item_detail_printer_location_id` INT(11) NULL,
	`item_detail_like_count` INT(11) NULL,
	`item_detail_remain_alert` INT(11) NULL,
	`item_detail_cut_stock` TINYINT(4) NULL,
	`measure_id` INT(11) NULL,
	`measure_name` VARCHAR(50) NULL COLLATE 'utf8_unicode_ci',
	`measure_note` TEXT NULL COLLATE 'utf8_unicode_ci',
	`measure_qty` INT(11) NULL,
	`color` VARCHAR(255) NULL COLLATE 'utf8_unicode_ci'
) ENGINE=MyISAM;

-- Dumping structure for view rms_makro_home_stage.v_item_type
DROP VIEW IF EXISTS `v_item_type`;
-- Creating temporary table to overcome VIEW dependency errors
CREATE TABLE `v_item_type` (
	`item_type_id` INT(11) NOT NULL,
	`category_id` INT(11) NULL,
	`category_name` VARCHAR(100) NULL COLLATE 'utf8_unicode_ci',
	`item_type_name` VARCHAR(255) NULL COLLATE 'utf8_unicode_ci',
	`item_type_des` VARCHAR(255) NULL COLLATE 'latin1_swedish_ci',
	`item_type_created_date` DATE NULL,
	`item_type_created_by` INT(11) NULL,
	`item_type_is_ingredient` TINYINT(4) NULL,
	`item_type_is_car_wash` TINYINT(4) NULL,
	`item_type_modified_by` INT(11) NULL,
	`item_type_modified_date` DATE NULL,
	`recorder` VARCHAR(255) NULL COLLATE 'utf8_unicode_ci'
) ENGINE=MyISAM;

-- Dumping structure for view rms_makro_home_stage.v_measure
DROP VIEW IF EXISTS `v_measure`;
-- Creating temporary table to overcome VIEW dependency errors
CREATE TABLE `v_measure` (
	`measure_id` INT(11) NOT NULL,
	`measure_name` VARCHAR(50) NULL COLLATE 'utf8_unicode_ci',
	`measure_qty` INT(11) NULL,
	`measure_note` TEXT NOT NULL COLLATE 'utf8_unicode_ci',
	`date_entry` DATE NOT NULL,
	`employee_name` VARCHAR(255) NULL COLLATE 'utf8_unicode_ci'
) ENGINE=MyISAM;

-- Dumping structure for view rms_makro_home_stage.v_point
DROP VIEW IF EXISTS `v_point`;
-- Creating temporary table to overcome VIEW dependency errors
CREATE TABLE `v_point` (
	`id` INT(11) NOT NULL,
	`point` INT(11) NOT NULL,
	`froms` INT(11) NOT NULL,
	`tos` INT(11) NOT NULL,
	`date_created` DATE NOT NULL,
	`created_by` INT(11) NOT NULL,
	`desc` VARCHAR(255) NOT NULL COLLATE 'utf8_unicode_ci',
	`employee_brand_id` INT(11) NOT NULL,
	`employee_name` VARCHAR(255) NULL COLLATE 'utf8_unicode_ci'
) ENGINE=MyISAM;

-- Dumping structure for view rms_makro_home_stage.v_position
DROP VIEW IF EXISTS `v_position`;
-- Creating temporary table to overcome VIEW dependency errors
CREATE TABLE `v_position` (
	`position_id` INT(11) NOT NULL,
	`position_name` VARCHAR(255) NULL COLLATE 'latin1_swedish_ci',
	`position_note` VARCHAR(255) NULL COLLATE 'latin1_swedish_ci',
	`date_entry` DATE NULL,
	`employee_name` VARCHAR(255) NULL COLLATE 'utf8_unicode_ci',
	`status` TINYINT(1) NULL
) ENGINE=MyISAM;

-- Dumping structure for view rms_makro_home_stage.v_purchase
DROP VIEW IF EXISTS `v_purchase`;
-- Creating temporary table to overcome VIEW dependency errors
CREATE TABLE `v_purchase` (
	`purchase_no` INT(11) NOT NULL,
	`refference_no` VARCHAR(50) NOT NULL COLLATE 'utf8_unicode_ci',
	`purchase_supplier_id` INT(255) NOT NULL,
	`supplier_name` VARCHAR(255) NULL COLLATE 'utf8_unicode_ci',
	`supplier_phone` VARCHAR(255) NULL COLLATE 'utf8_unicode_ci',
	`supplier_address` TEXT NULL COLLATE 'utf8_unicode_ci',
	`purchase_created_date` DATE NOT NULL,
	`purchase_created_by` INT(11) NOT NULL,
	`purchase_modified_by` INT(11) NULL,
	`purchase_modified_date` DATE NULL,
	`purchase_branch_id` INT(11) NOT NULL,
	`branch_name` VARCHAR(255) NOT NULL COLLATE 'utf8_unicode_ci',
	`purchase_due_date` DATE NOT NULL,
	`purchase_deposit` DOUBLE(11,2) NULL,
	`purchase_discount` DOUBLE(11,2) NULL,
	`purchase_note` VARCHAR(255) NULL COLLATE 'utf8_unicode_ci',
	`purchase_vat` INT(11) NULL,
	`purchase_total_amount` DOUBLE(11,2) NULL,
	`status` TINYINT(50) NULL,
	`purchase_credit` DOUBLE(23,6) NULL,
	`created_by` VARCHAR(500) NULL COLLATE 'utf8_unicode_ci'
) ENGINE=MyISAM;

-- Dumping structure for view rms_makro_home_stage.v_purchase_detail
DROP VIEW IF EXISTS `v_purchase_detail`;
-- Creating temporary table to overcome VIEW dependency errors
CREATE TABLE `v_purchase_detail` (
	`purchase_no` INT(11) NOT NULL,
	`po_supplier` VARCHAR(277) NULL COLLATE 'utf8_bin',
	`purchase_detail_id` INT(11) NOT NULL,
	`purchase_detail_item_detail_id` INT(11) NOT NULL,
	`item_detail_name` TEXT NULL COLLATE 'utf8_unicode_ci',
	`measure_id` INT(11) NOT NULL,
	`measure_name` VARCHAR(50) NULL COLLATE 'utf8_unicode_ci',
	`measure_qty` INT(11) NOT NULL,
	`purchase_detail_unit_cost` DECIMAL(10,2) NOT NULL,
	`purchase_detail_qty` INT(11) NOT NULL,
	`purchase_detail_total_amount` DECIMAL(10,2) NULL,
	`purchase_created_date` DATE NOT NULL,
	`purchase_created_by` INT(11) NOT NULL,
	`purchase_modified_by` INT(11) NULL,
	`purchase_modified_date` DATE NULL,
	`purchase_detail_note` TEXT NULL COLLATE 'utf8_unicode_ci',
	`status` TINYINT(50) NOT NULL,
	`branch_id` INT(11) NULL,
	`branch_name` VARCHAR(255) NULL COLLATE 'utf8_unicode_ci',
	`stock_location_id` INT(11) NOT NULL,
	`stock_location_name` VARCHAR(255) NULL COLLATE 'utf8_unicode_ci',
	`item_detail_part_number` VARCHAR(255) NULL COLLATE 'utf8_unicode_ci',
	`supplier_name` VARCHAR(255) NULL COLLATE 'utf8_unicode_ci',
	`purchase_supplier_id` INT(255) NOT NULL,
	`expired_date` DATE NULL,
	`expired_alert` DATE NULL
) ENGINE=MyISAM;

-- Dumping structure for view rms_makro_home_stage.v_purchase_pay
DROP VIEW IF EXISTS `v_purchase_pay`;
-- Creating temporary table to overcome VIEW dependency errors
CREATE TABLE `v_purchase_pay` (
	`purchase_pay_id` INT(11) NOT NULL,
	`purchase_no` INT(11) NOT NULL,
	`supplier_name` VARCHAR(255) NULL COLLATE 'utf8_unicode_ci',
	`purchase_pay_date` DATE NOT NULL,
	`purchase_pay_amount` DECIMAL(10,2) NOT NULL,
	`purchase_pay_credit_amount` DECIMAL(10,2) NULL,
	`purchase_pay_note` TEXT NOT NULL COLLATE 'utf8_unicode_ci',
	`purchase_pay_created_by` INT(11) NOT NULL,
	`purchase_pay_created_date` DATE NOT NULL,
	`purchase_pay_modified_by` INT(11) NOT NULL,
	`purchase_pay_modified_date` DATE NOT NULL,
	`purchase_branch_id` INT(11) NOT NULL,
	`branch_name` VARCHAR(255) NULL COLLATE 'utf8_unicode_ci',
	`recorder` VARCHAR(500) NULL COLLATE 'utf8_unicode_ci'
) ENGINE=MyISAM;

-- Dumping structure for view rms_makro_home_stage.v_purchase_return
DROP VIEW IF EXISTS `v_purchase_return`;
-- Creating temporary table to overcome VIEW dependency errors
CREATE TABLE `v_purchase_return` (
	`purchase_pay_id` INT(11) NOT NULL,
	`purchase_no` INT(11) NOT NULL,
	`purchase_pay_date` DATE NOT NULL,
	`purchase_pay_amount` DECIMAL(10,2) NOT NULL,
	`purchase_pay_note` TEXT NOT NULL COLLATE 'utf8_unicode_ci',
	`purchase_pay_created_by` INT(11) NOT NULL,
	`purchase_pay_created_date` DATE NOT NULL,
	`purchase_pay_modified_by` INT(11) NOT NULL,
	`purchase_pay_modified_date` DATE NOT NULL
) ENGINE=MyISAM;

-- Dumping structure for view rms_makro_home_stage.v_sale_detail
DROP VIEW IF EXISTS `v_sale_detail`;
-- Creating temporary table to overcome VIEW dependency errors
CREATE TABLE `v_sale_detail` (
	`sale_master_id` INT(10) UNSIGNED NOT NULL,
	`sale_detail_id` INT(11) NOT NULL,
	`invoice_no` VARCHAR(6) NULL COLLATE 'utf8mb4_general_ci',
	`recorder` VARCHAR(255) NULL COLLATE 'utf8_unicode_ci',
	`checkin_date` DATETIME NOT NULL,
	`checkout_date` DATETIME NULL,
	`cash_id` INT(11) NOT NULL,
	`sale_master_branch_id` INT(11) NOT NULL,
	`customer_type` VARCHAR(255) NULL COLLATE 'utf8_unicode_ci',
	`sale_master_customer_id` INT(11) NULL,
	`customer_name` VARCHAR(255) NULL COLLATE 'utf8_unicode_ci',
	`customer_phone` VARCHAR(255) NULL COLLATE 'latin1_swedish_ci',
	`customer_address` VARCHAR(255) NULL COLLATE 'latin1_swedish_ci',
	`part_number` VARCHAR(255) NULL COLLATE 'utf8_unicode_ci',
	`sale_detail_item_id` INT(11) NOT NULL,
	`item_detail_name` TEXT NULL COLLATE 'utf8_unicode_ci',
	`cut_stock` TINYINT(4) NULL,
	`sale_detail_qty` INT(11) NULL,
	`sale_detail_dis_us` DECIMAL(10,2) NULL,
	`sale_detail_dis_percent` DECIMAL(10,2) NULL,
	`sale_detail_unit_price` DECIMAL(10,2) NULL,
	`discount` DECIMAL(10,3) NULL,
	`vat` DECIMAL(10,3) NULL,
	`subtotal` DECIMAL(10,3) NULL,
	`grandtotal` DECIMAL(10,3) NULL,
	`sale_master_status` TINYINT(1) NULL COMMENT '1="ACTIVE"/2="PAID"/-1="CANCEL"',
	`sale_detail_status` TINYINT(1) NULL,
	`printer_id` INT(11) NULL,
	`printer_name` VARCHAR(255) NULL COLLATE 'utf8_unicode_ci',
	`printer_print_kitchen` VARCHAR(255) NULL COLLATE 'utf8_unicode_ci',
	`printer_print_kitchen_time` INT(11) NULL,
	`layout_name` VARCHAR(255) NULL COLLATE 'utf8_unicode_ci',
	`sale_detail_printed` TINYINT(1) NULL
) ENGINE=MyISAM;

-- Dumping structure for view rms_makro_home_stage.v_sale_detail_note
DROP VIEW IF EXISTS `v_sale_detail_note`;
-- Creating temporary table to overcome VIEW dependency errors
CREATE TABLE `v_sale_detail_note` (
	`sale_note_id` INT(11) NOT NULL,
	`sale_note_detail_id` INT(11) NULL,
	`sale_note_item_note_id` INT(11) NULL,
	`item_note_name` VARCHAR(255) NULL COLLATE 'utf8_unicode_ci',
	`sale_note_qty` INT(11) NULL,
	`sale_note_unit_price` DECIMAL(10,2) NULL,
	`sale_note_status` TINYINT(1) NULL
) ENGINE=MyISAM;

-- Dumping structure for view rms_makro_home_stage.v_sale_order_return
DROP VIEW IF EXISTS `v_sale_order_return`;
-- Creating temporary table to overcome VIEW dependency errors
CREATE TABLE `v_sale_order_return` (
	`sale_return_id` INT(11) NOT NULL,
	`sale_master_id` INT(10) UNSIGNED NOT NULL,
	`sale_master_invoice_no` INT(11) NULL,
	`sale_master_end_date` DATETIME NULL,
	`sale_master_start_date` DATETIME NOT NULL,
	`sale_detail_item_id` INT(11) NOT NULL,
	`item_detail_name` TEXT NULL COLLATE 'utf8_unicode_ci',
	`sale_return_qty` INT(11) NULL,
	`sale_detail_unit_price` DECIMAL(10,2) NULL,
	`sub_total` DECIMAL(20,2) NULL,
	`sale_return_created_date` DATETIME NULL,
	`employee_name` VARCHAR(255) NULL COLLATE 'utf8_unicode_ci',
	`layout_name` VARCHAR(255) NOT NULL COLLATE 'utf8_unicode_ci',
	`sale_master_branch_id` INT(11) NOT NULL,
	`branch_name` VARCHAR(255) NOT NULL COLLATE 'utf8_unicode_ci',
	`invoice_no` VARCHAR(6) NULL COLLATE 'utf8mb4_general_ci'
) ENGINE=MyISAM;

-- Dumping structure for view rms_makro_home_stage.v_sale_return
DROP VIEW IF EXISTS `v_sale_return`;
-- Creating temporary table to overcome VIEW dependency errors
CREATE TABLE `v_sale_return` (
	`item_detail_id` INT(11) NOT NULL,
	`measure_id` INT(11) NOT NULL,
	`sale_return_id` INT(11) NOT NULL,
	`sale_return_no` INT(11) NOT NULL,
	`item_detail_name` TEXT NULL COLLATE 'utf8_unicode_ci',
	`recorder` VARCHAR(255) NULL COLLATE 'utf8_unicode_ci',
	`customer_name` VARCHAR(255) NULL COLLATE 'utf8_unicode_ci',
	`branch_name` VARCHAR(255) NOT NULL COLLATE 'utf8_unicode_ci',
	`sale_return_qty` INT(11) NOT NULL,
	`sale_return_price` DECIMAL(10,2) NOT NULL,
	`sale_return_date` DATE NOT NULL,
	`sale_return_created_date` DATE NOT NULL,
	`sale_return_note` TEXT NOT NULL COLLATE 'utf8_unicode_ci',
	`sale_return_status` VARCHAR(30) NOT NULL COLLATE 'utf8_unicode_ci',
	`employee_brand_id` INT(11) NOT NULL,
	`sale_return_to_stock` INT(11) NOT NULL
) ENGINE=MyISAM;

-- Dumping structure for view rms_makro_home_stage.v_sale_summary
DROP VIEW IF EXISTS `v_sale_summary`;
-- Creating temporary table to overcome VIEW dependency errors
CREATE TABLE `v_sale_summary` (
	`sale_master_id` INT(10) UNSIGNED NOT NULL,
	`sale_detail_id` INT(11) NOT NULL,
	`invoice_no` VARCHAR(6) NULL COLLATE 'utf8mb4_general_ci',
	`floor_name` VARCHAR(255) NULL COLLATE 'utf8_unicode_ci',
	`table_name` VARCHAR(255) NULL COLLATE 'utf8_unicode_ci',
	`cashier` VARCHAR(255) NULL COLLATE 'utf8_unicode_ci',
	`checkin_date` DATETIME NOT NULL,
	`checkout_date` DATETIME NULL,
	`cash_id` INT(11) NOT NULL,
	`sale_master_branch_id` INT(11) NOT NULL,
	`branch_name` VARCHAR(255) NOT NULL COLLATE 'utf8_unicode_ci',
	`customer_type` VARCHAR(255) NULL COLLATE 'utf8_unicode_ci',
	`sale_master_customer_id` INT(11) NULL,
	`customer_name` VARCHAR(255) NULL COLLATE 'utf8_unicode_ci',
	`customer_phone` VARCHAR(255) NULL COLLATE 'latin1_swedish_ci',
	`customer_address` VARCHAR(255) NULL COLLATE 'latin1_swedish_ci',
	`costing` DECIMAL(32,2) NULL,
	`discount` DECIMAL(10,2) NULL,
	`tax` DECIMAL(10,2) NULL,
	`SubTotal` DECIMAL(10,2) NULL,
	`grandtotal` DECIMAL(10,2) NULL,
	`sale_master_pay_us` DECIMAL(10,2) NULL,
	`sale_master_pay_kh` INT(11) NULL,
	`account_type_id` INT(11) NULL,
	`acc_type` VARCHAR(255) NULL COLLATE 'utf8_general_ci',
	`other_card_pay` DECIMAL(10,2) NULL,
	`sale_master_member_discount` DECIMAL(10,2) NULL,
	`member_pay` DECIMAL(10,2) NULL,
	`sale_master_status` TINYINT(1) NULL COMMENT '1="ACTIVE"/2="PAID"/-1="CANCEL"',
	`ex_rate` DECIMAL(10,2) NULL
) ENGINE=MyISAM;

-- Dumping structure for view rms_makro_home_stage.v_shift
DROP VIEW IF EXISTS `v_shift`;
-- Creating temporary table to overcome VIEW dependency errors
CREATE TABLE `v_shift` (
	`shift_id` INT(11) NOT NULL,
	`shift_name` VARCHAR(255) NULL COLLATE 'utf8_unicode_ci',
	`shift_from` TIME NULL,
	`shift_until` TIME NULL,
	`shift_note` TEXT NULL COLLATE 'utf8_unicode_ci',
	`recorder` VARCHAR(255) NULL COLLATE 'utf8_unicode_ci',
	`date_entry` DATE NULL,
	`shift_modified_date` DATE NULL
) ENGINE=MyISAM;

-- Dumping structure for view rms_makro_home_stage.v_stock
DROP VIEW IF EXISTS `v_stock`;
-- Creating temporary table to overcome VIEW dependency errors
CREATE TABLE `v_stock` (
	`stock_id` INT(11) NOT NULL,
	`branch_name` VARCHAR(255) NOT NULL COLLATE 'utf8_unicode_ci',
	`stock_location_name` VARCHAR(255) NULL COLLATE 'utf8_unicode_ci',
	`stock_item_id` INT(11) NOT NULL,
	`item_detail_name` TEXT NULL COLLATE 'utf8_unicode_ci',
	`stock_qty` INT(11) NOT NULL,
	`stock_costing_by_measure_qty` DECIMAL(10,3) NULL,
	`total_costing_by_measure_qty` DECIMAL(20,3) NULL,
	`measure_qty` INT(11) NULL,
	`measure_note` TEXT NULL COLLATE 'utf8_unicode_ci',
	`measure_name` VARCHAR(50) NULL COLLATE 'utf8_unicode_ci',
	`stock_expire_date` DATE NOT NULL,
	`stock_alert_date` DATE NOT NULL,
	`stock_modified_date` DATE NOT NULL,
	`stock_modified_by` INT(11) NOT NULL,
	`stock_created_date` DATETIME NOT NULL,
	`stock_created_by` INT(11) NOT NULL,
	`stock_location_id` INT(11) NULL,
	`measure_id` INT(11) NOT NULL,
	`branch_id` INT(11) NOT NULL,
	`item_type_name` VARCHAR(255) NULL COLLATE 'utf8_unicode_ci',
	`item_type_id` INT(11) NOT NULL,
	`item_detail_part_number` VARCHAR(255) NULL COLLATE 'utf8_unicode_ci'
) ENGINE=MyISAM;

-- Dumping structure for view rms_makro_home_stage.v_stock_adjust
DROP VIEW IF EXISTS `v_stock_adjust`;
-- Creating temporary table to overcome VIEW dependency errors
CREATE TABLE `v_stock_adjust` (
	`stock_adjust_id` INT(11) NOT NULL,
	`stock_adjust_item_id` INT(11) NOT NULL,
	`measure_id` INT(11) NOT NULL,
	`item_detail_part_number` VARCHAR(255) NULL COLLATE 'utf8_unicode_ci',
	`item_detail_name` TEXT NULL COLLATE 'utf8_unicode_ci',
	`branch_name` VARCHAR(255) NOT NULL COLLATE 'utf8_unicode_ci',
	`branch_id` INT(11) NOT NULL,
	`stock_adjust_qty` INT(11) NOT NULL,
	`stock_adjust_note` TEXT NOT NULL COLLATE 'utf8_unicode_ci',
	`measure_name` VARCHAR(50) NULL COLLATE 'utf8_unicode_ci',
	`date_entry` DATE NOT NULL,
	`date_modified` DATE NOT NULL,
	`recorder` VARCHAR(255) NULL COLLATE 'utf8_unicode_ci',
	`stock_location_name` VARCHAR(255) NULL COLLATE 'utf8_unicode_ci',
	`stock_location_id` INT(11) NOT NULL
) ENGINE=MyISAM;

-- Dumping structure for view rms_makro_home_stage.v_stock_detail
DROP VIEW IF EXISTS `v_stock_detail`;
-- Creating temporary table to overcome VIEW dependency errors
CREATE TABLE `v_stock_detail` (
	`stock_id` INT(11) NOT NULL,
	`item_type_name` VARCHAR(255) NULL COLLATE 'utf8_unicode_ci',
	`item_type_id` INT(11) NOT NULL,
	`item_detail_name` TEXT NULL COLLATE 'utf8_unicode_ci',
	`item_detail_id` INT(11) NOT NULL,
	`item_detail_part_number` VARCHAR(255) NULL COLLATE 'utf8_unicode_ci',
	`item_detail_remain_alert` INT(11) NULL,
	`item_detail_retail_price` VARCHAR(49) NULL COLLATE 'utf8mb4_general_ci',
	`item_detail_whole_price` VARCHAR(49) NULL COLLATE 'utf8mb4_general_ci',
	`stock_qty` INT(11) NOT NULL,
	`purchase_detail_unit_cost` VARCHAR(49) NOT NULL COLLATE 'utf8mb4_general_ci',
	`total` VARCHAR(62) NOT NULL COLLATE 'utf8mb4_general_ci',
	`recorder` VARCHAR(255) NULL COLLATE 'utf8_unicode_ci',
	`employee_id` INT(11) NOT NULL,
	`branch_name` VARCHAR(255) NOT NULL COLLATE 'utf8_unicode_ci',
	`branch_id` INT(11) NOT NULL,
	`stock_location_name` VARCHAR(255) NULL COLLATE 'utf8_unicode_ci',
	`stock_location_id` INT(11) NOT NULL
) ENGINE=MyISAM;

-- Dumping structure for view rms_makro_home_stage.v_stock_location
DROP VIEW IF EXISTS `v_stock_location`;
-- Creating temporary table to overcome VIEW dependency errors
CREATE TABLE `v_stock_location` (
	`stock_location_id` INT(11) NOT NULL,
	`stock_location_name` VARCHAR(255) NULL COLLATE 'utf8_unicode_ci',
	`stock_location_created_date` DATE NULL,
	`stock_location_modified_date` DATE NULL,
	`stock_location_note` TEXT NULL COLLATE 'utf8_unicode_ci',
	`branch_id` INT(11) NOT NULL,
	`branch_name` VARCHAR(255) NOT NULL COLLATE 'utf8_unicode_ci',
	`recorder` VARCHAR(255) NULL COLLATE 'utf8_unicode_ci',
	`status` TINYINT(1) NULL COMMENT '1=active,0=deleted'
) ENGINE=MyISAM;

-- Dumping structure for view rms_makro_home_stage.v_stock_summary
DROP VIEW IF EXISTS `v_stock_summary`;
-- Creating temporary table to overcome VIEW dependency errors
CREATE TABLE `v_stock_summary` (
	`stock_item_id` INT(11) NOT NULL,
	`part_num` VARCHAR(255) NULL COLLATE 'utf8_unicode_ci',
	`item` TEXT NULL COLLATE 'utf8_unicode_ci',
	`item_type_id` INT(11) NULL,
	`item_type` VARCHAR(255) NULL COLLATE 'utf8_unicode_ci',
	`branch_id` INT(11) NOT NULL,
	`branch_name` VARCHAR(255) NULL COLLATE 'utf8_unicode_ci',
	`qty` DECIMAL(32,0) NULL,
	`stock_location_id` INT(11) NULL,
	`stock_location_name` VARCHAR(255) NULL COLLATE 'utf8_unicode_ci',
	`total_costing` DECIMAL(42,3) NULL
) ENGINE=MyISAM;

-- Dumping structure for view rms_makro_home_stage.v_stock_transfered
DROP VIEW IF EXISTS `v_stock_transfered`;
-- Creating temporary table to overcome VIEW dependency errors
CREATE TABLE `v_stock_transfered` (
	`stock_transffer_id` INT(11) NOT NULL,
	`stock_location_from` VARCHAR(255) NULL COLLATE 'utf8_unicode_ci',
	`stock_transffer_branch_id_to` INT(11) NULL,
	`stock_transffer_branch_id_from` INT(11) NULL,
	`stock_transffer_location_from` INT(11) NULL,
	`stock_transffer_location_to` INT(11) NULL,
	`stock_location_to` VARCHAR(255) NULL COLLATE 'utf8_unicode_ci',
	`from_branch` VARCHAR(255) NOT NULL COLLATE 'utf8_unicode_ci',
	`to_branch` VARCHAR(255) NOT NULL COLLATE 'utf8_unicode_ci',
	`transfer_by` VARCHAR(255) NULL COLLATE 'utf8_unicode_ci',
	`item_detail_part_number` VARCHAR(255) NULL COLLATE 'utf8_unicode_ci',
	`stock_transffer_item_detail_id` INT(11) NULL,
	`item_detail_name` TEXT NULL COLLATE 'utf8_unicode_ci',
	`stock_transffer_qty` INT(11) NULL,
	`total_qty` BIGINT(21) NULL,
	`measure_name` VARCHAR(50) NULL COLLATE 'utf8_unicode_ci',
	`stock_transffer_status` VARCHAR(50) NULL COLLATE 'utf8_unicode_ci',
	`stock_transffer_created_date` DATETIME NULL,
	`stock_transffer_modified_date` DATETIME NULL,
	`stock_transffer_note` TEXT NULL COLLATE 'utf8_unicode_ci'
) ENGINE=MyISAM;

-- Dumping structure for view rms_makro_home_stage.v_stock_waste
DROP VIEW IF EXISTS `v_stock_waste`;
-- Creating temporary table to overcome VIEW dependency errors
CREATE TABLE `v_stock_waste` (
	`stock_waste_id` INT(11) NOT NULL,
	`stock_waste_item_id` INT(11) NOT NULL,
	`measure_id` INT(11) NOT NULL,
	`item_detail_part_number` VARCHAR(255) NULL COLLATE 'utf8_unicode_ci',
	`item_detail_name` TEXT NULL COLLATE 'utf8_unicode_ci',
	`branch_name` VARCHAR(255) NOT NULL COLLATE 'utf8_unicode_ci',
	`branch_id` INT(11) NOT NULL,
	`stock_waste_qty` INT(11) NOT NULL,
	`stock_waste_note` TEXT NOT NULL COLLATE 'utf8_unicode_ci',
	`measure_name` VARCHAR(50) NULL COLLATE 'utf8_unicode_ci',
	`date_entry` DATE NOT NULL,
	`date_modified` DATE NOT NULL,
	`recorder` VARCHAR(255) NULL COLLATE 'utf8_unicode_ci',
	`stock_location_id` INT(11) NOT NULL,
	`stock_location_name` VARCHAR(255) NULL COLLATE 'utf8_unicode_ci'
) ENGINE=MyISAM;

-- Dumping structure for view rms_makro_home_stage.v_supplier
DROP VIEW IF EXISTS `v_supplier`;
-- Creating temporary table to overcome VIEW dependency errors
CREATE TABLE `v_supplier` (
	`supplier_id` INT(11) NOT NULL,
	`supplier_name` VARCHAR(255) NULL COLLATE 'utf8_unicode_ci',
	`supplier_address` TEXT NULL COLLATE 'utf8_unicode_ci',
	`supplier_phone` VARCHAR(255) NULL COLLATE 'utf8_unicode_ci',
	`supplier_note` VARCHAR(255) NULL COLLATE 'utf8_unicode_ci',
	`supplier_created_date` DATE NULL,
	`recorder` VARCHAR(255) NULL COLLATE 'utf8_unicode_ci',
	`supplier_modified_date` DATE NULL
) ENGINE=MyISAM;

-- Dumping structure for view rms_makro_home_stage.v_user
DROP VIEW IF EXISTS `v_user`;
-- Creating temporary table to overcome VIEW dependency errors
CREATE TABLE `v_user` (
	`user_id` INT(11) NOT NULL,
	`employee_id` INT(11) NOT NULL,
	`employee_position_id` VARCHAR(255) NULL COLLATE 'latin1_swedish_ci',
	`employee_name` VARCHAR(255) NULL COLLATE 'utf8_unicode_ci',
	`employee_brand_id` INT(11) NOT NULL,
	`branch_name` VARCHAR(255) NOT NULL COLLATE 'utf8_unicode_ci',
	`user_name` VARCHAR(255) NOT NULL COLLATE 'utf8_unicode_ci',
	`user_password` VARCHAR(255) NOT NULL COLLATE 'latin1_swedish_ci',
	`employee_stock_location_id` INT(11) NULL,
	`user_note` TEXT NULL COLLATE 'latin1_swedish_ci',
	`printer_location_name` VARCHAR(255) NULL COLLATE 'utf8_unicode_ci',
	`user_printer_location_id` INT(11) NULL,
	`is_supper_user` TINYINT(1) NULL,
	`status` TINYINT(1) NULL COMMENT '1=active,0=deleted'
) ENGINE=MyISAM;

-- Dumping structure for procedure rms_makro_home_stage.p_cash_out
DROP PROCEDURE IF EXISTS `p_cash_out`;
DELIMITER //
CREATE  PROCEDURE `p_cash_out`(IN `cash_id` INT



)
BEGIN
CREATE TEMPORARY TABLE IF NOT EXISTS Dataset
SELECT
	sale_master.sale_master_id,
	sale_master.sale_master_cash_id,
	sale_detail.sale_detail_id,
	sale_detail.sale_detail_qty,
	sale_detail.sale_detail_unit_price,
	item_type.item_type_name,
	item_type.item_type_id,
	item_detail.item_detail_name,
	sale_detail.sale_detail_item_id,
	sale_master.sale_master_exchange_rate,
	employee.employee_name,
	printer.printer_print_receipt as printer_ip,
	(select ifnull(sum(ifnull(sale_note.sale_note_qty * sale_note.sale_note_unit_price,0)),0) from sale_note where sale_note.sale_note_status=1 and sale_note.sale_note_detail_id=sale_detail.sale_detail_id) as sale_note_total,
	sale_detail.sale_detail_unit_price*sale_detail.sale_detail_qty as subtotal
	FROM
	sale_master
	LEFT JOIN sale_detail ON sale_master.sale_master_id = sale_detail.sale_master_id
	LEFT JOIN item_detail ON sale_detail.sale_detail_item_id = item_detail.item_detail_id
	LEFT JOIN item_type ON item_type.item_type_id = item_detail.item_type_id
	LEFT JOIN cash_register ON sale_master.sale_master_cash_id = cash_register.cash_id
	LEFT JOIN employee ON cash_register.cash_user_id = employee.employee_id
	left join user on user.employee_id=employee.employee_id
	left join printer on printer.printer_location_id=user.user_printer_location_id
	WHERE sale_master.sale_master_cash_id=cash_id and sale_master.sale_master_status in (2) and sale_detail.sale_detail_status in (1);
SELECT 
	sale_master_id,
	sale_master_cash_id,
	sale_detail_id,
	sum(sale_detail_qty) as sale_detail_qty,
	sale_detail_unit_price,
	item_type_name,
	item_detail_name,
	item_type_id,
	sale_detail_item_id,
	sale_master_exchange_rate,
	employee_name,
	printer_ip,
   sum(sale_note_total) as sale_note_total,
	sum(subtotal) + ifnull(sum(sale_note_total),0) as subtotal
FROM Dataset
GROUP BY sale_detail_item_id
ORDER BY item_type_name;
DROP TEMPORARY TABLE IF EXISTS Dataset;
END//
DELIMITER ;

-- Dumping structure for procedure rms_makro_home_stage.p_cash_register
DROP PROCEDURE IF EXISTS `p_cash_register`;
DELIMITER //
BEGIN
	
	SELECT
	`cr`.`cash_id` AS `cash_id`,
	`cr`.`cash_user_id` AS `cash_user_id`,
	`cr`.`cash_startdate` AS `cash_startdate`,
	`cr`.`cash_enddate` AS `cash_enddate`,
	`cr`.`cash_branch_id` AS `cash_branch_id`,
	printer.printer_print_receipt,
	`get_employee_name` (`cr`.`cash_user_id`) AS `user_name`,
	ifnull(`cr`.`cash_amount`, 0) AS `cash_amount`,
	ifnull(`cr`.`cash_amount_kh`, 0) AS `cash_amount_kh`,
	ifnull(`cr`.`cash_real_us`, 0) AS `cash_real_us`,
	ifnull(`cr`.cash_real_kh , 0) AS `cash_real_kh`,
	`cr`.`cash_note` AS `cash_note`,
	(
		SELECT
			count(0)
		FROM
			`sale_master` `sm`
		WHERE
			(
				(
					`sm`.`sale_master_status` IN (2, -1)
				)
				AND (
					`sm`.`sale_master_cash_id` = `cr`.`cash_id`
				)
			)
	) AS `total_invoice`,
	(
		SELECT
			count(0)
		FROM
			`sale_master` `sm`
		WHERE
			(
				(
					`sm`.`sale_master_status` = 2
				)
				AND (
					`sm`.`sale_master_cash_id` = `cr`.`cash_id`
				)
			)
	) AS `paid_invoice`,
	(
		SELECT
			count(0)
		FROM
			`sale_master` `sm`
		WHERE
			(
				(
					`sm`.`sale_master_status` = -1
				)
				AND (
					`sm`.`sale_master_cash_id` = `cr`.`cash_id`
				)
			)
	) AS `void_invoice`
FROM
	`cash_register` `cr`
	left join user on user.employee_id=cr.cash_user_id
	left join printer on printer.printer_location_id=user.user_printer_location_id
WHERE
	(
		`cr`.`cash_status` = 'FINISH'
		and
		cr.cash_id=shift_id
	);
	
END//
DELIMITER ;

-- Dumping structure for procedure rms_makro_home_stage.p_permission
DROP PROCEDURE IF EXISTS `p_permission`;
DELIMITER //
CREATE  PROCEDURE `p_permission`(IN `parent_id` INT, IN `position_id` INT
)
BEGIN
	SET @sql = NULL;
	SELECT
	  GROUP_CONCAT(DISTINCT
	    CONCAT(
	      'GROUP_CONCAT((CASE pa.page_ordering when ',
	      pa.page_ordering,
	      ' then p.permission_enable else NULL END)) `',
	      pa.page_name,'`'
	    )
	  ) INTO @sql
	from permission p
	inner join page pa on p.permission_page_id=pa.page_id
	where pa.page_id_parent=parent_id and p.position_id=position_id;
	
	SET @sql = CONCAT('SELECT ', @sql, ' 
	                  from permission p
							inner join page pa on p.permission_page_id=pa.page_id
							where pa.page_id_parent=',parent_id,' and p.position_id=',position_id,'
	                   GROUP BY pa.page_id_parent');
	
	PREPARE stmt FROM @sql;
	EXECUTE stmt;
	DEALLOCATE PREPARE stmt;
END//
DELIMITER ;

-- Dumping structure for procedure rms_makro_home_stage.p_sale_category
DROP PROCEDURE IF EXISTS `p_sale_category`;
DELIMITER //
CREATE  PROCEDURE `p_sale_category`(IN `ParamArrary` VARCHAR(255)

)
BEGIN
	set @sql = concat("SELECT 
		ittype.item_type_id,
		ittype.item_type_name,
		idt.item_detail_id,
		idt.item_detail_part_number as part_number,
		idt.item_detail_name,
		sum(sd.sale_detail_qty) as qty,
		cast(((((sum((sd.sale_detail_qty * sd.sale_detail_unit_price)*(1-sd.sale_detail_dis_percent/100) - sd.sale_detail_dis_us) + get_sale_note_summary(sm.sale_master_id))*sm.sale_master_discount_percent)/100) +sum((sd.sale_detail_qty * sd.sale_detail_unit_price)*(sd.sale_detail_dis_percent/100) + sd.sale_detail_dis_us)+ ((cast(sum((sd.sale_detail_qty * sd.sale_detail_unit_price)*(1-sd.sale_detail_dis_percent/100) - sd.sale_detail_dis_us) + get_sale_note_summary(sm.sale_master_id) as decimal(10,2)))-((cast(sum((sd.sale_detail_qty * sd.sale_detail_unit_price)*(1-sd.sale_detail_dis_percent/100) - sd.sale_detail_dis_us) + get_sale_note_summary(sm.sale_master_id) as decimal(10,2))*sm.sale_master_discount_percent)/100))*(sm.sale_master_member_discount/100))as decimal(10,2)) AS discount,
		cast(((sum(sd.sale_detail_qty * sd.sale_detail_unit_price) + get_sale_note_summary(sm.sale_master_id))-(((((sum((sd.sale_detail_qty * sd.sale_detail_unit_price)*(1-sd.sale_detail_dis_percent/100) - sd.sale_detail_dis_us) + get_sale_note_summary(sm.sale_master_id))*sm.sale_master_discount_percent)/100) +sum((sd.sale_detail_qty * sd.sale_detail_unit_price)*(sd.sale_detail_dis_percent/100) + sd.sale_detail_dis_us)+ (((sum((sd.sale_detail_qty * sd.sale_detail_unit_price)*(1-sd.sale_detail_dis_percent/100) - sd.sale_detail_dis_us) + get_sale_note_summary(sm.sale_master_id)))-(((sum((sd.sale_detail_qty * sd.sale_detail_unit_price)*(1-sd.sale_detail_dis_percent/100) - sd.sale_detail_dis_us) + get_sale_note_summary(sm.sale_master_id))*sm.sale_master_discount_percent)/100))*(sm.sale_master_member_discount/100))))*(sm.sale_master_tax/100) as decimal(10,2))  AS tax,
		cast(sum(sd.sale_detail_qty * sd.sale_detail_unit_price) + get_sale_note_summary(sm.sale_master_id) as decimal(10,2)) AS SubTotal,
		cast((sum(sd.sale_detail_qty * sd.sale_detail_unit_price) + get_sale_note_summary(sm.sale_master_id)) - (((((sum((sd.sale_detail_qty * sd.sale_detail_unit_price)*(1-sd.sale_detail_dis_percent/100) - sd.sale_detail_dis_us) + get_sale_note_summary(sm.sale_master_id))*sm.sale_master_discount_percent)/100) +sum((sd.sale_detail_qty * sd.sale_detail_unit_price)*(sd.sale_detail_dis_percent/100) + sd.sale_detail_dis_us)+ (((sum((sd.sale_detail_qty * sd.sale_detail_unit_price)*(1-sd.sale_detail_dis_percent/100) - sd.sale_detail_dis_us) + get_sale_note_summary(sm.sale_master_id)))-(((sum((sd.sale_detail_qty * sd.sale_detail_unit_price)*(1-sd.sale_detail_dis_percent/100) - sd.sale_detail_dis_us) + get_sale_note_summary(sm.sale_master_id))*sm.sale_master_discount_percent)/100))*(sm.sale_master_member_discount/100))) + (((sum(sd.sale_detail_qty * sd.sale_detail_unit_price) + get_sale_note_summary(sm.sale_master_id))-(((((sum((sd.sale_detail_qty * sd.sale_detail_unit_price)*(1-sd.sale_detail_dis_percent/100) - sd.sale_detail_dis_us) + get_sale_note_summary(sm.sale_master_id) )*sm.sale_master_discount_percent)/100) +sum((sd.sale_detail_qty * sd.sale_detail_unit_price)*(sd.sale_detail_dis_percent/100) + sd.sale_detail_dis_us)+ (((sum((sd.sale_detail_qty * sd.sale_detail_unit_price)*(1-sd.sale_detail_dis_percent/100) - sd.sale_detail_dis_us) + get_sale_note_summary(sm.sale_master_id)))-(((sum((sd.sale_detail_qty * sd.sale_detail_unit_price)*(1-sd.sale_detail_dis_percent/100) - sd.sale_detail_dis_us) + get_sale_note_summary(sm.sale_master_id))*sm.sale_master_discount_percent)/100))*(sm.sale_master_member_discount/100))))*(sm.sale_master_tax/100)) as decimal(10,2) )AS grandtotal,	
		`sm`.`sale_master_status` AS `sale_master_status`,
		`sm`.`sale_master_branch_id` AS `sale_master_branch_id`,
		sm.sale_master_cash_id,
		br.branch_name
FROM `sale_master` `sm`
JOIN `sale_detail` `sd` ON `sm`.`sale_master_id` = `sd`.sale_master_id
LEFT JOIN `item_detail` `idt` ON `idt`.`item_detail_id` = `sd`.`sale_detail_item_id`
LEFT JOIN `item_type` ittype ON `idt`.item_type_id=ittype.item_type_id
INNER JOIN `branch` br ON sm.sale_master_branch_id=br.branch_id
WHERE `sm`.sale_master_status in (2) AND `sd`.sale_detail_status in (1) ",ParamArrary," GROUP BY `idt`.item_detail_id"
);
PREPARE stmt FROM @sql;
EXECUTE stmt;
END//
DELIMITER ;

-- Dumping structure for procedure rms_makro_home_stage.p_sale_cut_stock
DROP PROCEDURE IF EXISTS `p_sale_cut_stock`;
DELIMITER //
CREATE  PROCEDURE `p_sale_cut_stock`(IN `cash_id` INT, IN `branch_id` INT, IN `stock_location_id` INT)
BEGIN
	select ifnull((select sum(stock.stock_qty) from stock where stock.stock_item_id=id.item_detail_id AND stock.branch_id=branch_id AND stock.stock_location_id=stock_location_id),0) as stock_qty,id.item_detail_name,id.item_detail_id,sum(sd.sale_detail_qty) as cut_qty from sale_detail sd
	inner join sale_master sm on sm.sale_master_id=sd.sale_master_id
	inner join item_detail id on id.item_detail_id=sd.sale_detail_item_id
	where sm.sale_master_status=2 and sd.sale_detail_status=1 and id.item_detail_cut_stock=1 and sm.sale_master_cash_id=cash_id
	group by id.item_detail_id;
END//
DELIMITER ;

-- Dumping structure for procedure rms_makro_home_stage.p_sale_detail
DROP PROCEDURE IF EXISTS `p_sale_detail`;
DELIMITER //
CREATE  PROCEDURE `p_sale_detail`(IN `ArrayString` VARCHAR(255)


)
BEGIN
	set @sql = concat("SELECT * FROM (SELECT 
		`sm`.`sale_master_id` AS `sale_master_id`, 
		sm.sale_master_cash_id as sale_master_cash_id,
		`sd`.`sale_detail_id` AS `sale_detail_id`,
		LPAD(`sm`.`sale_master_invoice_no`,6,0) AS `invoice_no`,
		cs.customer_name,
		sm.sale_master_start_date AS checkin_date,
		sm.sale_master_end_date AS checkout_date,
		sd.sale_detail_item_id AS item_detail_id,
		it.item_detail_part_number AS part_number,
		it.item_detail_name,
		sd.sale_detail_qty AS qty,
		sd.sale_detail_qty * ifnull(m.measure_qty,1) AS real_qty,
		sd.sale_detail_unit_price AS unit_price,
		ifnull(sd.sale_detail_costing,0) AS costing,
		sd.sale_detail_qty * sd.sale_detail_unit_price AS total,
		((sd.sale_detail_qty * sd.sale_detail_unit_price) * sd.sale_detail_dis_percent/100 + sd.sale_detail_dis_us) + (((sd.sale_detail_qty * sd.sale_detail_unit_price) * (1 - sd.sale_detail_dis_percent/100) - sd.sale_detail_dis_us) * sm.sale_master_discount_percent/100) + (((sd.sale_detail_qty * sd.sale_detail_unit_price) * (1 - sd.sale_detail_dis_percent/100) - sd.sale_detail_dis_us) *(1 - sm.sale_master_discount_percent/100)) * sm.sale_master_member_discount/100 AS discount,
		((((sd.sale_detail_qty * sd.sale_detail_unit_price)*(1 - sd.sale_detail_dis_percent/100) - sd.sale_detail_dis_us)*(1 - sm.sale_master_discount_percent/100))*(1 - sm.sale_master_member_discount/100))* sm.sale_master_tax/100 AS `tax`,
		cast(((sd.sale_detail_qty * sd.sale_detail_unit_price)*(1 - sd.sale_detail_dis_percent/100) - sd.sale_detail_dis_us)*(1 - sm.sale_master_discount_percent/100)*(1 - sm.sale_master_member_discount/100)*(1 + sm.sale_master_tax/100) as decimal(10,2)) AS grandtotal,  
		sm.sale_master_branch_id AS brand_id,
		br.branch_name AS brand_name
FROM `sale_master` `sm`
INNER JOIN `sale_detail` `sd` ON `sm`.`sale_master_id` = `sd`.sale_master_id
INNER JOIN `item_detail` it ON sd.sale_detail_item_id = it.item_detail_id
LEFT JOIN `customer` `cs` ON `cs`.`customer_id` = `sm`.`sale_master_customer_id` 
LEFT join measure m on m.measure_id=it.measure_id
INNER JOIN `branch` br ON sm.sale_master_branch_id=br.branch_id
WHERE `sm`.sale_master_status in (2) AND `sd`.sale_detail_status in (1) ",ArrayString," 
UNION ALL
SELECT
	`sm`.`sale_master_id` AS `sale_master_id`, 
	sm.sale_master_cash_id as sale_master_cash_id,
	`sd`.`sale_detail_id` AS `sale_detail_id`,
	LPAD(`sm`.`sale_master_invoice_no`,6,0) AS `invoice_no`,
	cs.customer_name,
	sm.sale_master_start_date AS checkin_date,
	sm.sale_master_end_date AS checkout_date,
	(sn.sale_note_item_note_id*-1) AS item_detail_id,
	'' AS part_number,
	concat(' * ',inote.item_note_name) AS item_detail_name,
	sn.sale_note_qty AS qty,
	sn.sale_note_qty AS real_qty,
	sn.sale_note_unit_price AS unit_price,
	0.000 as costing,
	sn.sale_note_qty * sn.sale_note_unit_price AS total,
	(sn.sale_note_qty * sn.sale_note_unit_price) * sm.sale_master_discount_percent/100 + ((sn.sale_note_qty * sn.sale_note_unit_price)*(1 - sm.sale_master_discount_percent/100)) * sm.sale_master_member_discount/100 AS discount,
	((sn.sale_note_qty * sn.sale_note_unit_price) *(1 - sm.sale_master_discount_percent/100)* (1 - sm.sale_master_member_discount/100)) * sm.sale_master_member_discount/100 AS `tax`,
	cast((((sn.sale_note_qty * sn.sale_note_unit_price)*(1 - sm.sale_master_discount_percent/100)) * (1 -sm.sale_master_member_discount/100)) * (1 + sm.sale_master_tax/100) as decimal(10,2)) AS grandtotal,
	sm.sale_master_branch_id AS brand_id,
	br.branch_name AS brand_name
FROM sale_note sn
INNER JOIN item_note inote ON sn.sale_note_item_note_id = inote.item_note_id
INNER JOIN sale_detail sd ON sn.sale_note_detail_id=sd.sale_detail_id
INNER JOIN sale_master sm ON sd.sale_master_id = sm.sale_master_id
LEFT JOIN `customer` `cs` ON `cs`.`customer_id` = `sm`.`sale_master_customer_id`
INNER JOIN branch br ON sm.sale_master_branch_id= br.branch_id
WHERE `sm`.sale_master_status in (2) AND `sd`.sale_detail_status in (1) ",ArrayString,") AS temp_table
ORDER BY sale_master_id,sale_detail_id
");
PREPARE stmt FROM @sql;
EXECUTE stmt;
END//
DELIMITER ;

-- Dumping structure for procedure rms_makro_home_stage.p_sale_detail_void
DROP PROCEDURE IF EXISTS `p_sale_detail_void`;
DELIMITER //
CREATE  PROCEDURE `p_sale_detail_void`(IN `ArrayString` VARCHAR(255))
BEGIN
	set @sql = concat("SELECT * FROM (SELECT 
		`sm`.`sale_master_id` AS `sale_master_id`, 
		sm.sale_master_cash_id as sale_master_cash_id,
		`sd`.`sale_detail_id` AS `sale_detail_id`,
		LPAD(`sm`.`sale_master_invoice_no`,6,0) AS `invoice_no`,
		cs.customer_name,
		sm.sale_master_start_date AS checkin_date,
		sm.sale_master_end_date AS checkout_date,
		sd.sale_detail_item_id AS item_detail_id,
		it.item_detail_part_number AS part_number,
		it.item_detail_name,
		sd.sale_detail_qty AS qty,
		sd.sale_detail_qty * ifnull(m.measure_qty,1) AS real_qty,
		sd.sale_detail_unit_price AS unit_price,
		ifnull(sd.sale_detail_costing,0) AS costing,
		sd.sale_detail_qty * sd.sale_detail_unit_price AS total,
		((sd.sale_detail_qty * sd.sale_detail_unit_price) * sd.sale_detail_dis_percent/100 + sd.sale_detail_dis_us) + (((sd.sale_detail_qty * sd.sale_detail_unit_price) * (1 - sd.sale_detail_dis_percent/100) - sd.sale_detail_dis_us) * sm.sale_master_discount_percent/100) + (((sd.sale_detail_qty * sd.sale_detail_unit_price) * (1 - sd.sale_detail_dis_percent/100) - sd.sale_detail_dis_us) *(1 - sm.sale_master_discount_percent/100)) * sm.sale_master_member_discount/100 AS discount,
		((((sd.sale_detail_qty * sd.sale_detail_unit_price)*(1 - sd.sale_detail_dis_percent/100) - sd.sale_detail_dis_us)*(1 - sm.sale_master_discount_percent/100))*(1 - sm.sale_master_member_discount/100))* sm.sale_master_tax/100 AS `tax`,
		cast(((sd.sale_detail_qty * sd.sale_detail_unit_price)*(1 - sd.sale_detail_dis_percent/100) - sd.sale_detail_dis_us)*(1 - sm.sale_master_discount_percent/100)*(1 - sm.sale_master_member_discount/100)*(1 + sm.sale_master_tax/100) as decimal(10,2)) AS grandtotal,  
		sm.sale_master_branch_id AS brand_id,
		br.branch_name AS brand_name
FROM `sale_master` `sm`
INNER JOIN `sale_detail` `sd` ON `sm`.`sale_master_id` = `sd`.sale_master_id
INNER JOIN `item_detail` it ON sd.sale_detail_item_id = it.item_detail_id
LEFT JOIN `customer` `cs` ON `cs`.`customer_id` = `sm`.`sale_master_customer_id` 
LEFT join measure m on m.measure_id=it.measure_id
INNER JOIN `branch` br ON sm.sale_master_branch_id=br.branch_id
WHERE `sm`.sale_master_status in (-1) AND `sd`.sale_detail_status in (-1) ",ArrayString," 
UNION ALL
SELECT
	`sm`.`sale_master_id` AS `sale_master_id`, 
	sm.sale_master_cash_id as sale_master_cash_id,
	`sd`.`sale_detail_id` AS `sale_detail_id`,
	LPAD(`sm`.`sale_master_invoice_no`,6,0) AS `invoice_no`,
	cs.customer_name,
	sm.sale_master_start_date AS checkin_date,
	sm.sale_master_end_date AS checkout_date,
	(sn.sale_note_item_note_id*-1) AS item_detail_id,
	'' AS part_number,
	concat(' * ',inote.item_note_name) AS item_detail_name,
	sn.sale_note_qty AS qty,
	sn.sale_note_qty AS real_qty,
	sn.sale_note_unit_price AS unit_price,
	0.000 as costing,
	sn.sale_note_qty * sn.sale_note_unit_price AS total,
	(sn.sale_note_qty * sn.sale_note_unit_price) * sm.sale_master_discount_percent/100 + ((sn.sale_note_qty * sn.sale_note_unit_price)*(1 - sm.sale_master_discount_percent/100)) * sm.sale_master_member_discount/100 AS discount,
	((sn.sale_note_qty * sn.sale_note_unit_price) *(1 - sm.sale_master_discount_percent/100)* (1 - sm.sale_master_member_discount/100)) * sm.sale_master_member_discount/100 AS `tax`,
	cast((((sn.sale_note_qty * sn.sale_note_unit_price)*(1 - sm.sale_master_discount_percent/100)) * (1 -sm.sale_master_member_discount/100)) * (1 + sm.sale_master_tax/100) as decimal(10,2)) AS grandtotal,
	sm.sale_master_branch_id AS brand_id,
	br.branch_name AS brand_name
FROM sale_note sn
INNER JOIN item_note inote ON sn.sale_note_item_note_id = inote.item_note_id
INNER JOIN sale_detail sd ON sn.sale_note_detail_id=sd.sale_detail_id
INNER JOIN sale_master sm ON sd.sale_master_id = sm.sale_master_id
LEFT JOIN `customer` `cs` ON `cs`.`customer_id` = `sm`.`sale_master_customer_id`
INNER JOIN branch br ON sm.sale_master_branch_id= br.branch_id
WHERE `sm`.sale_master_status in (-1) AND `sd`.sale_detail_status in (-1) ",ArrayString,") AS temp_table
ORDER BY sale_master_id,sale_detail_id
");
PREPARE stmt FROM @sql;
EXECUTE stmt;
END//
DELIMITER ;

-- Dumping structure for procedure rms_makro_home_stage.p_sale_summary
DROP PROCEDURE IF EXISTS `p_sale_summary`;
DELIMITER //
CREATE  PROCEDURE `p_sale_summary`(IN `ArrayString` VARCHAR(250)












)
BEGIN
	set @sql = concat("SELECT 
		`sm`.`sale_master_id` AS `sale_master_id`, 
		`sd`.`sale_detail_id` AS `sale_detail_id`,
		LPAD(`sm`.`sale_master_invoice_no`,6,0) AS `invoice_no`,
		fl.floor_name,
		`ftl`.layout_name AS table_name,
		`em`.`employee_name` AS `cashier`,
		`sm`.sale_master_start_date as checkin_date,
		`sm`.sale_master_end_date AS checkout_date,
		`sm`.sale_master_cash_id AS cash_id,
		`sm`.`sale_master_branch_id` AS `sale_master_branch_id`,
		br.branch_name,
		`ct`.`customer_type_name` AS `customer_type`,
		`sm`.`sale_master_customer_id` AS `sale_master_customer_id`,
		`cs`.customer_name,
		`cs`.`customer_phone` AS `customer_phone`,
		`cs`.`customer_address` AS `customer_address`,
		ifnull(sum(sd.sale_detail_costing),0) AS costing,
		cast(((((sum((sd.sale_detail_qty * sd.sale_detail_unit_price)*(1-sd.sale_detail_dis_percent/100) - sd.sale_detail_dis_us) + get_sale_note_summary(sm.sale_master_id))*sm.sale_master_discount_percent)/100) +sum((sd.sale_detail_qty * sd.sale_detail_unit_price)*(sd.sale_detail_dis_percent/100) + sd.sale_detail_dis_us)+ ((cast(sum((sd.sale_detail_qty * sd.sale_detail_unit_price)*(1-sd.sale_detail_dis_percent/100) - sd.sale_detail_dis_us) + get_sale_note_summary(sm.sale_master_id) as decimal(10,2)))-((cast(sum((sd.sale_detail_qty * sd.sale_detail_unit_price)*(1-sd.sale_detail_dis_percent/100) - sd.sale_detail_dis_us) + get_sale_note_summary(sm.sale_master_id) as decimal(10,2))*sm.sale_master_discount_percent)/100))*(sm.sale_master_member_discount/100))as decimal(10,2)) AS discount,
		cast(((sum(sd.sale_detail_qty * sd.sale_detail_unit_price) + get_sale_note_summary(sm.sale_master_id))-(((((sum((sd.sale_detail_qty * sd.sale_detail_unit_price)*(1-sd.sale_detail_dis_percent/100) - sd.sale_detail_dis_us) + get_sale_note_summary(sm.sale_master_id))*sm.sale_master_discount_percent)/100) +sum((sd.sale_detail_qty * sd.sale_detail_unit_price)*(sd.sale_detail_dis_percent/100) + sd.sale_detail_dis_us)+ (((sum((sd.sale_detail_qty * sd.sale_detail_unit_price)*(1-sd.sale_detail_dis_percent/100) - sd.sale_detail_dis_us) + get_sale_note_summary(sm.sale_master_id)))-(((sum((sd.sale_detail_qty * sd.sale_detail_unit_price)*(1-sd.sale_detail_dis_percent/100) - sd.sale_detail_dis_us) + get_sale_note_summary(sm.sale_master_id))*sm.sale_master_discount_percent)/100))*(sm.sale_master_member_discount/100))))*(sm.sale_master_tax/100) as decimal(10,2))  AS tax,
		cast(sum(sd.sale_detail_qty * sd.sale_detail_unit_price) + get_sale_note_summary(sm.sale_master_id) as decimal(10,2)) AS SubTotal,
		cast((sum(sd.sale_detail_qty * sd.sale_detail_unit_price) + get_sale_note_summary(sm.sale_master_id)) - (((((sum((sd.sale_detail_qty * sd.sale_detail_unit_price)*(1-sd.sale_detail_dis_percent/100) - sd.sale_detail_dis_us) + get_sale_note_summary(sm.sale_master_id))*sm.sale_master_discount_percent)/100) +sum((sd.sale_detail_qty * sd.sale_detail_unit_price)*(sd.sale_detail_dis_percent/100) + sd.sale_detail_dis_us)+ (((sum((sd.sale_detail_qty * sd.sale_detail_unit_price)*(1-sd.sale_detail_dis_percent/100) - sd.sale_detail_dis_us) + get_sale_note_summary(sm.sale_master_id)))-(((sum((sd.sale_detail_qty * sd.sale_detail_unit_price)*(1-sd.sale_detail_dis_percent/100) - sd.sale_detail_dis_us) + get_sale_note_summary(sm.sale_master_id))*sm.sale_master_discount_percent)/100))*(sm.sale_master_member_discount/100))) + (((sum(sd.sale_detail_qty * sd.sale_detail_unit_price) + get_sale_note_summary(sm.sale_master_id))-(((((sum((sd.sale_detail_qty * sd.sale_detail_unit_price)*(1-sd.sale_detail_dis_percent/100) - sd.sale_detail_dis_us) + get_sale_note_summary(sm.sale_master_id) )*sm.sale_master_discount_percent)/100) +sum((sd.sale_detail_qty * sd.sale_detail_unit_price)*(sd.sale_detail_dis_percent/100) + sd.sale_detail_dis_us)+ (((sum((sd.sale_detail_qty * sd.sale_detail_unit_price)*(1-sd.sale_detail_dis_percent/100) - sd.sale_detail_dis_us) + get_sale_note_summary(sm.sale_master_id)))-(((sum((sd.sale_detail_qty * sd.sale_detail_unit_price)*(1-sd.sale_detail_dis_percent/100) - sd.sale_detail_dis_us) + get_sale_note_summary(sm.sale_master_id))*sm.sale_master_discount_percent)/100))*(sm.sale_master_member_discount/100))))*(sm.sale_master_tax/100)) as decimal(10,2) )AS grandtotal,
		`sm`.`sale_master_pay_us` AS `sale_master_pay_us`,
		`sm`.`sale_master_pay_kh` AS `sale_master_pay_kh`,
		sm.sale_master_account_type AS account_type_id,
		`ac`.acc_type,
		`sm`.sale_master_other_card AS other_card_pay,
		`sm`.sale_master_member_discount,
		`sm`.sale_master_member_pay AS member_pay,	
		`sm`.`sale_master_status` AS `sale_master_status`,
		sm.sale_master_exchange_rate as ex_rate
	FROM `sale_master` `sm`
	JOIN `sale_detail` `sd` ON `sm`.`sale_master_id` = `sd`.sale_master_id
	LEFT JOIN `employee` `em` ON `em`.`employee_id` = `sm`.sale_master_cashier_id
	LEFT JOIN `item_detail` `idt` ON `idt`.`item_detail_id` = `sd`.`sale_detail_item_id`
	LEFT JOIN `customer` `cs` ON `cs`.`customer_id` = `sm`.`sale_master_customer_id`
	LEFT JOIN `customer_type` `ct` ON `ct`.customer_type_id = `cs`.customer_type_id
	LEFT JOIN `floor_table_layout` ftl ON sm.sale_master_layout_id=ftl.layout_id
	LEFT JOIN `floor` fl ON ftl.floor_id=fl.floor_id
	LEFT JOIN `account_type` `ac` ON sm.sale_master_account_type=ac.acc_type_id
	INNER JOIN `branch` br ON sm.sale_master_branch_id=br.branch_id
	WHERE `sm`.sale_master_status in (2) AND `sd`.sale_detail_status in (1)",ArrayString,
	" GROUP BY `sm`.sale_master_id ;");
PREPARE stmt FROM @sql;
EXECUTE stmt;
END//
DELIMITER ;

-- Dumping structure for procedure rms_makro_home_stage.p_sale_summary_void
DROP PROCEDURE IF EXISTS `p_sale_summary_void`;
DELIMITER //
CREATE  PROCEDURE `p_sale_summary_void`(IN `ArrayString` varCHAR(255))
BEGIN
	set @sql = concat("SELECT 
		`sm`.`sale_master_id` AS `sale_master_id`, 
		`sd`.`sale_detail_id` AS `sale_detail_id`,
		LPAD(`sm`.`sale_master_invoice_no`,6,0) AS `invoice_no`,
		fl.floor_name,
		`ftl`.layout_name AS table_name,
		`em`.`employee_name` AS `cashier`,
		`sm`.sale_master_start_date as checkin_date,
		`sm`.sale_master_end_date AS checkout_date,
		`sm`.sale_master_cash_id AS cash_id,
		`sm`.`sale_master_branch_id` AS `sale_master_branch_id`,
		br.branch_name,
		`ct`.`customer_type_name` AS `customer_type`,
		`sm`.`sale_master_customer_id` AS `sale_master_customer_id`,
		`cs`.customer_name,
		`cs`.`customer_phone` AS `customer_phone`,
		`cs`.`customer_address` AS `customer_address`,
		sum(sd.sale_detail_costing) AS costing,
		cast(((((sum((sd.sale_detail_qty * sd.sale_detail_unit_price)*(1-sd.sale_detail_dis_percent/100) - sd.sale_detail_dis_us) + get_sale_note_summary(sm.sale_master_id))*sm.sale_master_discount_percent)/100) +sum((sd.sale_detail_qty * sd.sale_detail_unit_price)*(sd.sale_detail_dis_percent/100) + sd.sale_detail_dis_us)+ ((cast(sum((sd.sale_detail_qty * sd.sale_detail_unit_price)*(1-sd.sale_detail_dis_percent/100) - sd.sale_detail_dis_us) + get_sale_note_summary(sm.sale_master_id) as decimal(10,2)))-((cast(sum((sd.sale_detail_qty * sd.sale_detail_unit_price)*(1-sd.sale_detail_dis_percent/100) - sd.sale_detail_dis_us) + get_sale_note_summary(sm.sale_master_id) as decimal(10,2))*sm.sale_master_discount_percent)/100))*(sm.sale_master_member_discount/100))as decimal(10,2)) AS discount,
		cast(((sum(sd.sale_detail_qty * sd.sale_detail_unit_price) + get_sale_note_summary(sm.sale_master_id))-(((((sum((sd.sale_detail_qty * sd.sale_detail_unit_price)*(1-sd.sale_detail_dis_percent/100) - sd.sale_detail_dis_us) + get_sale_note_summary(sm.sale_master_id))*sm.sale_master_discount_percent)/100) +sum((sd.sale_detail_qty * sd.sale_detail_unit_price)*(sd.sale_detail_dis_percent/100) + sd.sale_detail_dis_us)+ (((sum((sd.sale_detail_qty * sd.sale_detail_unit_price)*(1-sd.sale_detail_dis_percent/100) - sd.sale_detail_dis_us) + get_sale_note_summary(sm.sale_master_id)))-(((sum((sd.sale_detail_qty * sd.sale_detail_unit_price)*(1-sd.sale_detail_dis_percent/100) - sd.sale_detail_dis_us) + get_sale_note_summary(sm.sale_master_id))*sm.sale_master_discount_percent)/100))*(sm.sale_master_member_discount/100))))*(sm.sale_master_tax/100) as decimal(10,2))  AS tax,
		cast(sum(sd.sale_detail_qty * sd.sale_detail_unit_price) + get_sale_note_summary(sm.sale_master_id) as decimal(10,2)) AS SubTotal,
		cast((sum(sd.sale_detail_qty * sd.sale_detail_unit_price) + get_sale_note_summary(sm.sale_master_id)) - (((((sum((sd.sale_detail_qty * sd.sale_detail_unit_price)*(1-sd.sale_detail_dis_percent/100) - sd.sale_detail_dis_us) + get_sale_note_summary(sm.sale_master_id))*sm.sale_master_discount_percent)/100) +sum((sd.sale_detail_qty * sd.sale_detail_unit_price)*(sd.sale_detail_dis_percent/100) + sd.sale_detail_dis_us)+ (((sum((sd.sale_detail_qty * sd.sale_detail_unit_price)*(1-sd.sale_detail_dis_percent/100) - sd.sale_detail_dis_us) + get_sale_note_summary(sm.sale_master_id)))-(((sum((sd.sale_detail_qty * sd.sale_detail_unit_price)*(1-sd.sale_detail_dis_percent/100) - sd.sale_detail_dis_us) + get_sale_note_summary(sm.sale_master_id))*sm.sale_master_discount_percent)/100))*(sm.sale_master_member_discount/100))) + (((sum(sd.sale_detail_qty * sd.sale_detail_unit_price) + get_sale_note_summary(sm.sale_master_id))-(((((sum((sd.sale_detail_qty * sd.sale_detail_unit_price)*(1-sd.sale_detail_dis_percent/100) - sd.sale_detail_dis_us) + get_sale_note_summary(sm.sale_master_id) )*sm.sale_master_discount_percent)/100) +sum((sd.sale_detail_qty * sd.sale_detail_unit_price)*(sd.sale_detail_dis_percent/100) + sd.sale_detail_dis_us)+ (((sum((sd.sale_detail_qty * sd.sale_detail_unit_price)*(1-sd.sale_detail_dis_percent/100) - sd.sale_detail_dis_us) + get_sale_note_summary(sm.sale_master_id)))-(((sum((sd.sale_detail_qty * sd.sale_detail_unit_price)*(1-sd.sale_detail_dis_percent/100) - sd.sale_detail_dis_us) + get_sale_note_summary(sm.sale_master_id))*sm.sale_master_discount_percent)/100))*(sm.sale_master_member_discount/100))))*(sm.sale_master_tax/100)) as decimal(10,2) )AS grandtotal,
		`sm`.`sale_master_pay_us` AS `sale_master_pay_us`,
		`sm`.`sale_master_pay_kh` AS `sale_master_pay_kh`,
		sm.sale_master_account_type AS account_type_id,
		`ac`.acc_type,
		`sm`.sale_master_other_card AS other_card_pay,
		`sm`.sale_master_member_discount,
		`sm`.sale_master_member_pay AS member_pay,	
		`sm`.`sale_master_status` AS `sale_master_status`,
		sm.sale_master_exchange_rate as ex_rate
	FROM `sale_master` `sm`
	JOIN `sale_detail` `sd` ON `sm`.`sale_master_id` = `sd`.sale_master_id
	LEFT JOIN `employee` `em` ON `em`.`employee_id` = `sm`.sale_master_cashier_id
	LEFT JOIN `item_detail` `idt` ON `idt`.`item_detail_id` = `sd`.`sale_detail_item_id`
	LEFT JOIN `customer` `cs` ON `cs`.`customer_id` = `sm`.`sale_master_customer_id`
	LEFT JOIN `customer_type` `ct` ON `ct`.customer_type_id = `cs`.customer_type_id
	LEFT JOIN `floor_table_layout` ftl ON sm.sale_master_layout_id=ftl.layout_id
	LEFT JOIN `floor` fl ON ftl.floor_id=fl.floor_id
	LEFT JOIN `account_type` `ac` ON sm.sale_master_account_type=ac.acc_type_id
	INNER JOIN `branch` br ON sm.sale_master_branch_id=br.branch_id
	WHERE `sm`.sale_master_status in (-1) AND `sd`.sale_detail_status in (-1)",ArrayString,
	" GROUP BY `sm`.sale_master_id ;");
PREPARE stmt FROM @sql;
EXECUTE stmt;
END//
DELIMITER ;

-- Dumping structure for procedure rms_makro_home_stage.p_void_item_list
DROP PROCEDURE IF EXISTS `p_void_item_list`;
DELIMITER //
CREATE  PROCEDURE `p_void_item_list`(IN `ArrayString` VARCHAR(255)

)
BEGIN
	set @sql = concat("SELECT * FROM (SELECT 
		`sm`.`sale_master_id` AS `sale_master_id`, 
		`sd`.`sale_detail_id` AS `sale_detail_id`,
		LPAD(`sm`.`sale_master_invoice_no`,6,0) AS `invoice_no`,
		cs.customer_name,
		sm.sale_master_start_date AS checkin_date,
		sm.sale_master_end_date AS checkout_date,
		sd.sale_detail_item_id AS item_detail_id,
		it.item_detail_part_number AS part_number,
		it.item_detail_name,
		sd.sale_detail_qty AS qty,
		sd.sale_detail_unit_price AS unit_price,
		sd.sale_detail_qty * sd.sale_detail_unit_price AS total,
		((sd.sale_detail_qty * sd.sale_detail_unit_price) * sd.sale_detail_dis_percent/100 + sd.sale_detail_dis_us) + (((sd.sale_detail_qty * sd.sale_detail_unit_price) * (1 - sd.sale_detail_dis_percent/100) - sd.sale_detail_dis_us) * sm.sale_master_discount_percent/100) + (((sd.sale_detail_qty * sd.sale_detail_unit_price) * (1 - sd.sale_detail_dis_percent/100) - sd.sale_detail_dis_us) *(1 - sm.sale_master_discount_percent/100)) * sm.sale_master_member_discount/100 AS discount,
		((((sd.sale_detail_qty * sd.sale_detail_unit_price)*(1 - sd.sale_detail_dis_percent/100) - sd.sale_detail_dis_us)*(1 - sm.sale_master_discount_percent/100))*(1 - sm.sale_master_member_discount/100))* sm.sale_master_tax/100 AS `tax`,
		((sd.sale_detail_qty * sd.sale_detail_unit_price)*(1 - sd.sale_detail_dis_percent/100) - sd.sale_detail_dis_us)*(1 - sm.sale_master_discount_percent/100)*(1 - sm.sale_master_member_discount/100)*(1 + sm.sale_master_tax/100) AS grandtotal,  
		sm.sale_master_branch_id AS brand_id,
		br.branch_name AS brand_name,
		fl.layout_name as layout_name
FROM `sale_master` `sm`
LEFT JOIN `sale_detail` `sd` ON `sm`.`sale_master_id` = `sd`.sale_master_id

INNER JOIN `item_detail` it ON sd.sale_detail_item_id = it.item_detail_id
LEFT JOIN `customer` `cs` ON `cs`.`customer_id` = `sm`.`sale_master_customer_id` 
INNER JOIN `branch` br ON sm.sale_master_branch_id=br.branch_id
left join floor_table_layout fl on fl.layout_id=sm.sale_master_layout_id
WHERE `sm`.sale_master_status in (2,0,-1) AND `sd`.sale_detail_status in (-1,0) ",ArrayString," 
UNION ALL
SELECT
	`sm`.`sale_master_id` AS `sale_master_id`, 
	`sd`.`sale_detail_id` AS `sale_detail_id`,
	LPAD(`sm`.`sale_master_invoice_no`,6,0) AS `invoice_no`,
	cs.customer_name,
	sm.sale_master_start_date AS checkin_date,
	sm.sale_master_end_date AS checkout_date,
	(sn.sale_note_item_note_id*-1) AS item_detail_id,
	'' AS part_number,
	concat(' * ',inote.item_note_name) AS item_detail_name,
	sn.sale_note_qty AS qty,
	sn.sale_note_unit_price AS unit_price,
	sn.sale_note_qty * sn.sale_note_unit_price AS total,
	(sn.sale_note_qty * sn.sale_note_unit_price) * sm.sale_master_discount_percent/100 + ((sn.sale_note_qty * sn.sale_note_unit_price)*(1 - sm.sale_master_discount_percent/100)) * sm.sale_master_member_discount/100 AS discount,
	((sn.sale_note_qty * sn.sale_note_unit_price) *(1 - sm.sale_master_discount_percent/100)* (1 - sm.sale_master_member_discount/100)) * sm.sale_master_member_discount/100 AS `tax`,
	(((sn.sale_note_qty * sn.sale_note_unit_price)*(1 - sm.sale_master_discount_percent/100)) * (1 -sm.sale_master_member_discount/100)) * (1 + sm.sale_master_tax/100) AS grandtotal,
	sm.sale_master_branch_id AS brand_id,
	br.branch_name AS brand_name,
	fl.layout_name as layout_name
FROM sale_note sn
INNER JOIN item_note inote ON sn.sale_note_item_note_id = inote.item_note_id

INNER JOIN sale_detail sd ON sn.sale_note_detail_id=sd.sale_detail_id
INNER JOIN sale_master sm ON sd.sale_master_id = sm.sale_master_id
LEFT JOIN `customer` `cs` ON `cs`.`customer_id` = `sm`.`sale_master_customer_id`
left join floor_table_layout fl on fl.layout_id=sm.sale_master_layout_id
INNER JOIN branch br ON sm.sale_master_branch_id= br.branch_id
WHERE `sm`.sale_master_status in (2,0,-1) AND `sd`.sale_detail_status in (-1,0,1) AND sn.sale_note_status in (-1,0) ",ArrayString,") AS temp_table
ORDER BY sale_master_id,sale_detail_id
");
PREPARE stmt FROM @sql;
EXECUTE stmt;
END//
DELIMITER ;

-- Dumping structure for function rms_makro_home_stage.get_acc_type
DROP FUNCTION IF EXISTS `get_acc_type`;
DELIMITER //
CREATE  FUNCTION `get_acc_type`(`id` int) RETURNS varchar(255) CHARSET utf8
BEGIN
	DECLARE cash, member, card VARCHAR(100);
set cash='';
set member='';
set card='';
 if (SELECT ifnull(sale_master.sale_master_pay_us,0) from sale_master where sale_master.sale_master_id=`id`) >0 OR
(SELECT ifnull(sale_master.sale_master_pay_kh,0) from sale_master where sale_master.sale_master_id=`id`) >0
THEN SET cash='Cash'; END IF;
if (SELECT ifnull(sale_master.sale_master_member_pay,0) from sale_master where sale_master.sale_master_id=`id`) >0 
THEN  SET member= 'Member Card'; END IF;
if (SELECT ifnull(sale_master.sale_master_card_pay,0) from sale_master where sale_master.sale_master_id=`id`) >0 
THEN SET card = (SELECT account_type.acc_type from sale_master INNER JOIN
account_type on sale_master.sale_master_account_type=account_type.acc_type_id
where sale_master.sale_master_id=`id`); END IF;
RETURN concat(cash,' ', member, ' ', card);
END//
DELIMITER ;

-- Dumping structure for function rms_makro_home_stage.get_category_name
DROP FUNCTION IF EXISTS `get_category_name`;
DELIMITER //
CREATE  FUNCTION `get_category_name`(`category_id` int) RETURNS varchar(255) CHARSET utf8
BEGIN 
  DECLARE re VARCHAR(500);
	
  SET re = (select category.category_name from category where category.category_id=category_id);
 
	RETURN re;
END//
DELIMITER ;

-- Dumping structure for function rms_makro_home_stage.get_costing_by_item
DROP FUNCTION IF EXISTS `get_costing_by_item`;
DELIMITER //
CREATE  FUNCTION `get_costing_by_item`(`item_id` int) RETURNS decimal(10,2)
BEGIN
	DECLARE R DECIMAL(10,2);
	set R=ifnull((select stock.stock_costing from stock where stock.stock_item_id=item_id limit 1),0);

	RETURN R;
END//
DELIMITER ;

-- Dumping structure for function rms_makro_home_stage.get_costing_invoice
DROP FUNCTION IF EXISTS `get_costing_invoice`;
DELIMITER //
CREATE  FUNCTION `get_costing_invoice`(`sale_master_id` int) RETURNS decimal(11,2)
BEGIN
			DECLARE done INT DEFAULT 0;
			DECLARE result DECIMAL(11,2);
			declare item int;
			declare my_avg decimal(11,2);
			DECLARE measure_qty DECIMAL(11,2);
			DECLARE qty int;
			DECLARE total_ingredient_costing DECIMAL(11,2);

			declare mycur cursor for (select invoice_finished.item_id,invoice_finished.qty from invoice_finished where master_id=sale_master_id);
			DECLARE CONTINUE HANDLER FOR NOT FOUND SET done = 1;
			set result=0;
		

			open mycur;
							 my_cur_loop:loop
									fetch mycur into item,qty;
									 IF done = 1 THEN
												LEAVE my_cur_loop;
										END IF;
									set total_ingredient_costing=(select ifnull(v_ingredient.total_cost,0) from v_ingredient where v_ingredient.item_detail_id=item LIMIT 1);
									set measure_qty=(select ifnull(v_item_detail.measure_qty,1) from v_item_detail where v_item_detail.item_detail_id=item);
									set my_avg=(select ifnull((avg(purchase_detail_unit_cost)/measure_qty)*qty,0) as costing from purchase_detail where purchase_detail_item_detail_id=item);
									set result=ifnull(my_avg+result+(ifnull(total_ingredient_costing*qty,0)),0);
						
							END loop;
			close mycur;

      return result;
END//
DELIMITER ;

-- Dumping structure for function rms_makro_home_stage.get_cost_by_date
DROP FUNCTION IF EXISTS `get_cost_by_date`;
DELIMITER //
CREATE  FUNCTION `get_cost_by_date`(`item_id` int, `stock_id` int, `check_date` date) RETURNS decimal(18,2)
BEGIN

	DECLARE R DECIMAL(18,2);
	DECLARE total_ingredient_costing DECIMAL(18,2);

	set total_ingredient_costing=(select ifnull(v_ingredient.total_cost,0) from v_ingredient where v_ingredient.ingredient_item_detail_id=item_id LIMIT 1);
	set R=(select ifnull(avg(purchase_detail_unit_cost/measure_qty),0) as costing from purchase_detail where purchase_detail_item_detail_id=item_id and stock_location_id=stock_id and cast(purchase_created_date as date)<=cast(check_date as date));
	

	RETURN ifnull(R,0)+ifnull(total_ingredient_costing,0);
END//
DELIMITER ;

-- Dumping structure for function rms_makro_home_stage.get_credit_by_po_pay
DROP FUNCTION IF EXISTS `get_credit_by_po_pay`;
DELIMITER //
CREATE  FUNCTION `get_credit_by_po_pay`(`po_id` int, `po_pay_id` int) RETURNS decimal(10,2)
BEGIN
	DECLARE po_master DECIMAL(10,2);
	DECLARE po_pay DECIMAL(10,2);
	DECLARE dis_dep DECIMAL(10,2);
	set po_master=(select purchase.purchase_total_amount from purchase where purchase.purchase_no=po_id);
	set dis_dep=(select (purchase.purchase_deposit+((purchase.purchase_discount/100)*po_master)) from purchase where purchase.purchase_no=po_id);
	set po_pay=(select ifnull(sum(purchase_pay.purchase_pay_amount),0) from purchase_pay where purchase_pay.purchase_pay_id<po_pay_id and purchase_pay.purchase_no=po_id);
	
RETURN po_master-(po_pay+dis_dep);
END//
DELIMITER ;

-- Dumping structure for function rms_makro_home_stage.get_customer_chip
DROP FUNCTION IF EXISTS `get_customer_chip`;
DELIMITER //
CREATE  FUNCTION `get_customer_chip`(`cus_id` int) RETURNS varchar(50) CHARSET utf8 COLLATE utf8_unicode_ci
BEGIN
	DECLARE rs VARCHAR(50);
	set rs=(select customer_account.customer_chip from customer_account where customer_account.customer_id=cus_id limit 1);

	RETURN rs;
END//
DELIMITER ;

-- Dumping structure for function rms_makro_home_stage.get_customer_name
DROP FUNCTION IF EXISTS `get_customer_name`;
DELIMITER //
CREATE  FUNCTION `get_customer_name`(`id` int) RETURNS varchar(500) CHARSET utf8 COLLATE utf8_unicode_ci
BEGIN
  DECLARE cus VARCHAR(500);
  SET cus = (select customer.customer_name from customer where customer.customer_id=`id`);
  RETURN cus;
END//
DELIMITER ;

-- Dumping structure for function rms_makro_home_stage.get_customer_name_acc
DROP FUNCTION IF EXISTS `get_customer_name_acc`;
DELIMITER //
CREATE  FUNCTION `get_customer_name_acc`(`acc_id` INT) RETURNS varchar(500) CHARSET utf8 COLLATE utf8_unicode_ci
BEGIN
	DECLARE cus_name VARCHAR(500);
	DECLARE cus_id int;
	set cus_id = (SELECT customer_account.customer_id from customer_account where customer_account.customer_acc_id=acc_id);
  SET cus_name = (select customer.customer_name from customer where customer.customer_id=cus_id);
  RETURN cus_name;
END//
DELIMITER ;

-- Dumping structure for function rms_makro_home_stage.get_customer_type
DROP FUNCTION IF EXISTS `get_customer_type`;
DELIMITER //
CREATE  FUNCTION `get_customer_type`(`id` INT) RETURNS text CHARSET utf8
BEGIN 
  DECLARE re VARCHAR(500);
	 SET re = (select customer_type.customer_type_name from customer_type where customer_type.customer_type_id=id);
  

	RETURN re;
END//
DELIMITER ;

-- Dumping structure for function rms_makro_home_stage.get_employee_name
DROP FUNCTION IF EXISTS `get_employee_name`;
DELIMITER //
CREATE  FUNCTION `get_employee_name`(`emp_id` int) RETURNS varchar(500) CHARSET utf8 COLLATE utf8_unicode_ci
BEGIN
	DECLARE re VARCHAR(500);
  SET re = (select employee.employee_name from employee where employee.employee_id=emp_id);
  RETURN re;
END//
DELIMITER ;

-- Dumping structure for function rms_makro_home_stage.get_invoice_type
DROP FUNCTION IF EXISTS `get_invoice_type`;
DELIMITER //
CREATE  FUNCTION `get_invoice_type`(`master_id` int) RETURNS int(11)
BEGIN
	#Routine body goes here...
	DECLARE C INT;
	DECLARE R INT;
	SET C = (select count(*) from sale_detail sd where sd.sale_detail_sale_master_id=master_id and sd.sale_detail_status in('ACTIVE','PAID','CREDIT','UNPAID') and sd.sale_detail_item_id in (select item_detail_id from item_detail where item_type_id in(select item_type_id from item_type where item_type_is_car_wash=1)));
	SET R = (select count(*) from sale_detail sd where sd.sale_detail_sale_master_id=master_id and sd.sale_detail_status in('ACTIVE','PAID','CREDIT','UNPAID') and sd.sale_detail_item_id in (select item_detail_id from item_detail where item_type_id in(select item_type_id from item_type where item_type_is_car_wash=0 or item_type_is_car_wash is null)));
	if C>0 then set C=1; END IF;
	if R>0 then set R=1; END IF;
	if R=1 and C=0 then return 0; END IF;
	if R=0 and C=1 then return 1; END IF;
	if R=1 and C=1 then return 2; END IF;
	RETURN 0;
END//
DELIMITER ;

-- Dumping structure for function rms_makro_home_stage.get_item_detail_count
DROP FUNCTION IF EXISTS `get_item_detail_count`;
DELIMITER //
CREATE  FUNCTION `get_item_detail_count`(`sale_master_id` int,`item_detail_id` int) RETURNS int(10)
BEGIN
	#Routine body goes here...
	DECLARE R INT;
	set R = (select count(*) from sale_detail where sale_detail_master_id=sale_master_id and sale_detail_item_id=item_detail_id);
	RETURN R;
END//
DELIMITER ;

-- Dumping structure for function rms_makro_home_stage.get_item_detail_name
DROP FUNCTION IF EXISTS `get_item_detail_name`;
DELIMITER //
CREATE  FUNCTION `get_item_detail_name`(`id` integer) RETURNS varchar(255) CHARSET utf8
BEGIN
	DECLARE name VARCHAR(255);
  SET name = (select item_detail.item_detail_name from item_detail where item_detail.item_detail_id=`id`);
  RETURN name;
END//
DELIMITER ;

-- Dumping structure for function rms_makro_home_stage.get_item_name
DROP FUNCTION IF EXISTS `get_item_name`;
DELIMITER //
CREATE  FUNCTION `get_item_name`(item_id  int) RETURNS varchar(500) CHARSET utf8
BEGIN 
  DECLARE re VARCHAR(500);
 IF item_id<=0 THEN SET re = (select item_note.item_note_name from item_note where item_note.item_note_id=-item_id);
  ELSE SET re = (select item_detail.item_detail_name from item_detail where item_detail.item_detail_id=item_id);
  END IF;
 RETURN re;
END//
DELIMITER ;

-- Dumping structure for function rms_makro_home_stage.get_item_name_mobile
DROP FUNCTION IF EXISTS `get_item_name_mobile`;
DELIMITER //
CREATE  FUNCTION `get_item_name_mobile`(`id` INT) RETURNS text CHARSET utf8 COLLATE utf8_unicode_ci
BEGIN
  DECLARE name VARCHAR(500);
  SET name = (select item_detail_mobile.item_detail_name from item_detail_mobile where item_detail_mobile.item_detail_id=`id`);
  RETURN name;
END//
DELIMITER ;

-- Dumping structure for function rms_makro_home_stage.get_lost_qty
DROP FUNCTION IF EXISTS `get_lost_qty`;
DELIMITER //
CREATE  FUNCTION `get_lost_qty`(`item_id` int,location_id int) RETURNS int(11)
BEGIN
	#Routine body goes here...
	DECLARE lost_qty double;
	set lost_qty = (SELECT sum(stock_waste_qty) as waste_qty FROM v_stock_waste where stock_waste_item_id = item_id and stock_location_id = location_id GROUP BY stock_waste_item_id);
	RETURN ifnull(lost_qty,0);
END//
DELIMITER ;

-- Dumping structure for function rms_makro_home_stage.get_measure_qty
DROP FUNCTION IF EXISTS `get_measure_qty`;
DELIMITER //
CREATE  FUNCTION `get_measure_qty`(
	`m_id` INT
) RETURNS float
BEGIN
	DECLARE m FLOAT;
  SET m = (select measure.measure_qty from measure where measure.measure_id=m_id);
  RETURN m;
END//
DELIMITER ;

-- Dumping structure for function rms_makro_home_stage.get_note_price
DROP FUNCTION IF EXISTS `get_note_price`;
DELIMITER //
CREATE  FUNCTION `get_note_price`(`sale_detail_id` int) RETURNS double
BEGIN
	#Routine body goes here...
	DECLARE R double;
	set R = (select sum(sale_note_qty*sale_note_unit_price) from sale_note where sale_note_detail_id=sale_detail_id);
	RETURN ifnull(R,0);
END//
DELIMITER ;

-- Dumping structure for function rms_makro_home_stage.get_plate_no
DROP FUNCTION IF EXISTS `get_plate_no`;
DELIMITER //
CREATE  FUNCTION `get_plate_no`(`cus_id` INT) RETURNS varchar(500) CHARSET utf8 COLLATE utf8_unicode_ci
BEGIN
  DECLARE re VARCHAR(500);
  SET re = (select customer_account.customer_chip from customer_account where customer_account.customer_acc_id=cus_id);
  RETURN re;
END//
DELIMITER ;

-- Dumping structure for function rms_makro_home_stage.get_po_pay
DROP FUNCTION IF EXISTS `get_po_pay`;
DELIMITER //
CREATE  FUNCTION `get_po_pay`(`po_id` int) RETURNS decimal(10,2)
BEGIN
	#Routine body goes here...
	DECLARE R DECIMAL(18,2);
	set R=(select sum(purchase_pay.purchase_pay_amount) from purchase_pay where purchase_pay.purchase_no=po_id);

	RETURN R;
END//
DELIMITER ;

-- Dumping structure for function rms_makro_home_stage.get_price_type
DROP FUNCTION IF EXISTS `get_price_type`;
DELIMITER //
CREATE  FUNCTION `get_price_type`(`id` INT) RETURNS text CHARSET utf8 COLLATE utf8_unicode_ci
BEGIN
  DECLARE type_name VARCHAR(500);
  SET type_name = (select t.price_type_name from item_detail_price_type t where t.price_type_id=id);
  RETURN type_name;
END//
DELIMITER ;

-- Dumping structure for function rms_makro_home_stage.get_printer_location_name
DROP FUNCTION IF EXISTS `get_printer_location_name`;
DELIMITER //
CREATE  FUNCTION `get_printer_location_name`(`id` int) RETURNS varchar(255) CHARSET utf8
BEGIN
	DECLARE p_name VARCHAR(500);
  SET p_name = (select printer_location_name from printer_location where printer_location_id=`id`);
  RETURN p_name;
END//
DELIMITER ;

-- Dumping structure for function rms_makro_home_stage.get_printer_name
DROP FUNCTION IF EXISTS `get_printer_name`;
DELIMITER //
CREATE  FUNCTION `get_printer_name`(`id` INT) RETURNS text CHARSET utf8 COLLATE utf8_unicode_ci
BEGIN
  DECLARE p_name VARCHAR(500);
  SET p_name = (select printer.printer_print_kitchen from printer where printer.printer_location_id=`id`);
  RETURN p_name;
END//
DELIMITER ;

-- Dumping structure for function rms_makro_home_stage.get_sale_note_summary
DROP FUNCTION IF EXISTS `get_sale_note_summary`;
DELIMITER //
CREATE  FUNCTION `get_sale_note_summary`(
	`master_id` INT

) RETURNS decimal(10,3)
BEGIN
	DECLARE R DECIMAL(10,3);
	SET R = (select ifnull(sum(sale_note_qty*sale_note_unit_price),0) as sale_note from sale_note where sale_note_detail_id in(select sale_detail_id from sale_detail where sale_master_id=master_id and sale_detail_status=1) and sale_note_status=1);
	RETURN R;
END//
DELIMITER ;

-- Dumping structure for function rms_makro_home_stage.get_stock_increase_qty
DROP FUNCTION IF EXISTS `get_stock_increase_qty`;
DELIMITER //
CREATE  FUNCTION `get_stock_increase_qty`(`item_id` int,location_id int) RETURNS int(11)
BEGIN
	#Routine body goes here...
	DECLARE increase_qty double;
	set increase_qty = (SELECT sum(stock_adjust_qty) as increase_qty FROM stock_adjust  where stock_adjust_item_id = item_id and stock_location_id = location_id GROUP BY stock_adjust_item_id);
	RETURN ifnull(increase_qty,0);
END//
DELIMITER ;

-- Dumping structure for function rms_makro_home_stage.get_table_name
DROP FUNCTION IF EXISTS `get_table_name`;
DELIMITER //
CREATE  FUNCTION `get_table_name`(`id` int) RETURNS varchar(500) CHARSET utf8 COLLATE utf8_unicode_ci
BEGIN
  DECLARE re VARCHAR(500);
  SET re = (select layout_name from floor_table_layout where layout_id=`id`);
  RETURN re;
END//
DELIMITER ;

-- Dumping structure for function rms_makro_home_stage.get_table_status
DROP FUNCTION IF EXISTS `get_table_status`;
DELIMITER //
CREATE  FUNCTION `get_table_status`(`layout_id` int) RETURNS text CHARSET utf8 COLLATE utf8_unicode_ci
BEGIN
	#Routine body goes here...
	DECLARE INVOICE_NO INT;
	DECLARE BOOKING INT;
	DECLARE SPLIT INT;
	DECLARE PRINTED INT;
	SET INVOICE_NO = (select sale_master_id from sale_master where sale_master_layout_id=layout_id and sale_master_status=1 limit 1);
	SET PRINTED = (select IFNULL(sale_master_print,0) from sale_master where sale_master_id=INVOICE_NO);
	IF PRINTED > 0 THEN RETURN 'PRINTED';
  END IF;
	
	SET SPLIT = (select count(*) from sale_master where sale_master_layout_id=layout_id and sale_master_status=1);
	IF SPLIT > 1 THEN RETURN 'SPLIT';
  END IF;

	IF INVOICE_NO > 0 THEN RETURN 'BUSY';
	END IF;

	#SET BOOKING = (select booking_id from booking where booking_layout_id=layout_id and booking_datetime>=now() and booking_status=1);
	#IF BOOKING > 0 THEN RETURN 'BOOKING';
	#END IF;

	RETURN 'FREE';
END//
DELIMITER ;

-- Dumping structure for function rms_makro_home_stage.get_total_ingredient_costing_by_item
DROP FUNCTION IF EXISTS `get_total_ingredient_costing_by_item`;
DELIMITER //
CREATE  FUNCTION `get_total_ingredient_costing_by_item`(`item_detail_id` int) RETURNS decimal(10,2)
BEGIN
	#Routine body goes here...
	DECLARE re DECIMAL(10,2);
	set re=(select sum(ig.ingredient_qty * get_costing_by_item(ingredient_item_ingredient_id)) FROM ingredient ig
			WHERE ig.ingredient_item_detail_id=item_detail_id);
	RETURN ifnull(re,0);
END//
DELIMITER ;

-- Dumping structure for function rms_makro_home_stage.get_total_sale
DROP FUNCTION IF EXISTS `get_total_sale`;
DELIMITER //
CREATE  FUNCTION `get_total_sale`(`sale_master_id` int) RETURNS decimal(65,2)
BEGIN
	#Routine body goes here...
	DECLARE R INT;
	set R = (select sum((sale_detail_qty*IFNULL(sale_detail_unit_price,0))-IFNULL(sale_detail_discount_dollar,0)
				-(sale_detail_qty*IFNULL(sale_detail_unit_price,0)*IFNULL(sale_detail_discount_percent,0)/100)
				+((sale_detail_qty*IFNULL(sale_detail_unit_price,0)-IFNULL(sale_detail_discount_dollar,0)
				-(sale_detail_qty*IFNULL(sale_detail_unit_price,0)*IFNULL(sale_detail_discount_percent,0)/100))*IFNULL(SM.sale_master_tax,0)/100)) from sale_detail inner join sale_master sm where sale_detail_master_id=sale_master_id);
		
	RETURN if(R is null,0,R);
END//
DELIMITER ;

-- Dumping structure for function rms_makro_home_stage.get_total_sold_qty
DROP FUNCTION IF EXISTS `get_total_sold_qty`;
DELIMITER //
CREATE  FUNCTION `get_total_sold_qty`(`item_id` int, `stock_location_id` int) RETURNS int(11)
BEGIN
	#Routine body goes here...
	DECLARE lost_qty double;
	set lost_qty = (select sum(sale_stock_qty) FROM sale_stock WHERE sale_stock_detail_id = item_id and sale_stock_stock_id = stock_location_id);
	RETURN ifnull(lost_qty,0);
END//
DELIMITER ;

-- Dumping structure for function rms_makro_home_stage.get_tranfer_qty
DROP FUNCTION IF EXISTS `get_tranfer_qty`;
DELIMITER //
CREATE  FUNCTION `get_tranfer_qty`(`item_id` int, `stock_location_id` int) RETURNS int(11)
BEGIN
	#Routine body goes here...
	/*DECLARE tranffered_qty double;
	set tranffered_qty = (SELECT if(stock_transffer_location_from = stock_location_id,concat('-',sum(stock_transffer_qty)),sum(stock_transffer_qty)) as qty FROM stock_transfer where stock_transffer_item_detail_id = item_id ORDER BY stock_transffer_item_detail_id);
	RETURN ifnull(tranffered_qty,0);*/
	DECLARE tranffered_qty double;
	set tranffered_qty = (SELECT sum(stock_transffer_qty) as qty FROM stock_transfer where stock_transffer_item_detail_id = item_id and stock_transffer_location_from =stock_location_id ORDER BY stock_transffer_item_detail_id);
	RETURN ifnull(tranffered_qty,0);
END//
DELIMITER ;

-- Dumping structure for function rms_makro_home_stage.get_type_name_by_item
DROP FUNCTION IF EXISTS `get_type_name_by_item`;
DELIMITER //
CREATE  FUNCTION `get_type_name_by_item`(`item_id` int) RETURNS varchar(500) CHARSET utf8 COLLATE utf8_unicode_ci
BEGIN 
  DECLARE re VARCHAR(500);
	SET re = (select item_type.item_type_name from item_detail inner join item_type on item_type.item_type_id=item_detail.item_type_id where item_detail.item_detail_id=item_id);
	RETURN re;
END//
DELIMITER ;

-- Dumping structure for function rms_makro_home_stage.get_user_name
DROP FUNCTION IF EXISTS `get_user_name`;
DELIMITER //
CREATE  FUNCTION `get_user_name`(`user_id` int) RETURNS varchar(500) CHARSET utf8 COLLATE utf8_unicode_ci
BEGIN
  DECLARE re VARCHAR(500);
  SET re = (select `user`.user_name from `user` where `user`.user_id=`user_id`);
  RETURN re;
END//
DELIMITER ;

-- Dumping structure for function rms_makro_home_stage.is_car_wash
DROP FUNCTION IF EXISTS `is_car_wash`;
DELIMITER //
CREATE  FUNCTION `is_car_wash`(`item_id` int) RETURNS int(11)
BEGIN
	DECLARE R INT;
	set R = (select item_type_is_car_wash from item_type where item_type_id=(select item_type_id from item_detail where item_detail_id=item_id limit 1));
	RETURN IFNULL(R,0);
END//
DELIMITER ;

-- Dumping structure for function rms_makro_home_stage.SPLIT_STR
DROP FUNCTION IF EXISTS `SPLIT_STR`;
DELIMITER //
CREATE  FUNCTION `SPLIT_STR`(
  x VARCHAR(255),
  delim VARCHAR(12),
  pos INT
) RETURNS varchar(255) CHARSET utf8 COLLATE utf8_unicode_ci
RETURN REPLACE(SUBSTRING(SUBSTRING_INDEX(x, delim, pos),
       LENGTH(SUBSTRING_INDEX(x, delim, pos -1)) + 1),
       delim, '')//
DELIMITER ;

-- Dumping structure for view rms_makro_home_stage.permission
DROP VIEW IF EXISTS `permission`;
-- Removing temporary table and create final VIEW structure
DROP TABLE IF EXISTS `permission`;
CREATE   SQL SECURITY DEFINER VIEW `permission` AS select `pm`.`permission_id` AS `permission_id`,`pm`.`permission_page_id` AS `permission_page_id`,`pm`.`position_id` AS `position_id`,`pm`.`permission_enable` AS `permission_enable`,`pm`.`permission_add` AS `permission_add`,`pm`.`permission_edit` AS `permission_edit`,`pm`.`permission_delete` AS `permission_delete`,`pm`.`permission_viewall` AS `permission_viewall`,`pm`.`permission_follow_by` AS `permission_follow_by`,`pm`.`permission_page_only` AS `permission_page_only`,`pg`.`page_name` AS `permission_name`,`pg`.`page_id_parent` AS `permission_page_id_parent`,`pg`.`page_ordering` AS `permission_ordering`,`pg`.`page_url` AS `permission_control`,`pg`.`page_clazz` AS `permission_class`,`pg`.`page_active` AS `permission_active`,`pg`.`page_name_kh` AS `permission_name_kh`,`pg`.`page_controller` AS `page_controller`,`pg`.`page_img` AS `page_img` from (`permissions` `pm` join `page` `pg` on((`pg`.`page_id` = `pm`.`permission_page_id`))) ;

-- Dumping structure for view rms_makro_home_stage.v_cash_register
DROP VIEW IF EXISTS `v_cash_register`;
-- Removing temporary table and create final VIEW structure
DROP TABLE IF EXISTS `v_cash_register`;
CREATE   SQL SECURITY DEFINER VIEW `v_cash_register` AS select `cr`.`cash_id` AS `cash_id`,`cr`.`cash_user_id` AS `cash_user_id`,`cr`.`cash_startdate` AS `cash_startdate`,`cr`.`cash_enddate` AS `cash_enddate`,`cr`.`cash_branch_id` AS `cash_branch_id`,`get_employee_name`(`cr`.`cash_user_id`) AS `user_name`,ifnull(`cr`.`cash_amount`,0) AS `cash_amount`,ifnull(`cr`.`cash_amount_kh`,0) AS `cash_amount_kh`,`cr`.`cash_note` AS `cash_note`,(select count(0) from `sale_master` `sm` where ((`sm`.`sale_master_status` in ('PAID','CANCEL')) and (`sm`.`sale_master_cash_id` = `cr`.`cash_id`))) AS `total_invoice`,(select count(0) from `sale_master` `sm` where ((`sm`.`sale_master_status` = 'PAID') and (`sm`.`sale_master_cash_id` = `cr`.`cash_id`))) AS `paid_invoice`,(select count(0) from `sale_master` `sm` where ((`sm`.`sale_master_status` = 'CANCEL') and (`sm`.`sale_master_cash_id` = `cr`.`cash_id`))) AS `void_invoice`,ifnull((select sum(`sm`.`sale_master_member_pay`) from `sale_master` `sm` where ((`sm`.`sale_master_status` = 'PAID') and (`sm`.`sale_master_cash_id` = `cr`.`cash_id`))),0) AS `total_member_pay` from `cash_register` `cr` where (`cr`.`cash_status` = 'FINISH') ;

-- Dumping structure for view rms_makro_home_stage.v_cash_register_active
DROP VIEW IF EXISTS `v_cash_register_active`;
-- Removing temporary table and create final VIEW structure
DROP TABLE IF EXISTS `v_cash_register_active`;
CREATE   SQL SECURITY DEFINER VIEW `v_cash_register_active` AS select `c`.`cash_id` AS `cash_id`,`c`.`cash_user_id` AS `cash_user_id`,`c`.`cash_amount` AS `cash_amount`,`c`.`cash_startdate` AS `cash_startdate`,`c`.`cash_enddate` AS `cash_enddate`,`c`.`cash_branch_id` AS `cash_branch_id`,`c`.`cash_status` AS `cash_status` from `cash_register` `c` where (`c`.`cash_status` = 'ACTIVE') ;

-- Dumping structure for view rms_makro_home_stage.v_category
DROP VIEW IF EXISTS `v_category`;
-- Removing temporary table and create final VIEW structure
DROP TABLE IF EXISTS `v_category`;
CREATE   SQL SECURITY DEFINER VIEW `v_category` AS select `category`.`category_id` AS `category_id`,`category`.`category_name` AS `category_name`,`category`.`category_description` AS `category_description`,`get_employee_name`(`category`.`category_created_by`) AS `recorder`,`category`.`category_created_date` AS `category_created_date`,`category`.`category_photo` AS `category_photo` from `category` ;

-- Dumping structure for view rms_makro_home_stage.v_customer_detail
DROP VIEW IF EXISTS `v_customer_detail`;
-- Removing temporary table and create final VIEW structure
DROP TABLE IF EXISTS `v_customer_detail`;
CREATE   SQL SECURITY DEFINER VIEW `v_customer_detail` AS select `c`.`customer_id` AS `customer_id`,`c`.`customer_name` AS `customer_name`,`c`.`customer_gender` AS `customer_gender`,`c`.`customer_type_id` AS `customer_type_id`,`c`.`customer_address` AS `customer_address`,`c`.`customer_email` AS `customer_email`,`c`.`customer_dob` AS `customer_dob`,`c`.`customer_phone` AS `customer_phone`,`c`.`customer_created_date` AS `customer_created_date`,`e`.`employee_name` AS `customer_created_by`,`b`.`branch_name` AS `branch_name` from (((`customer` `c` join `employee` `e` on((`c`.`customer_created_by` = `e`.`employee_id`))) join `customer_type` `ct` on((`c`.`customer_type_id` = `ct`.`customer_type_id`))) join `branch` `b` on((`c`.`customer_branch_id` = `b`.`branch_id`))) ;

-- Dumping structure for view rms_makro_home_stage.v_employee
DROP VIEW IF EXISTS `v_employee`;
-- Removing temporary table and create final VIEW structure
DROP TABLE IF EXISTS `v_employee`;
CREATE   SQL SECURITY DEFINER VIEW `v_employee` AS select `e`.`employee_id` AS `employee_id`,`e`.`employee_brand_id` AS `employee_brand_id`,`e`.`employee_position_id` AS `employee_position_id`,`e`.`employee_shift_id` AS `employee_shift_id`,`e`.`employee_name` AS `employee_name`,`e`.`employee_sex` AS `employee_sex`,`e`.`employee_email` AS `employee_email`,`e`.`employee_dob` AS `employee_dob`,`e`.`employee_address` AS `employee_address`,`e`.`employee_phone` AS `employee_phone`,`e`.`employee_note` AS `employee_note`,`e`.`employee_salary` AS `employee_salary`,`e`.`employee_hired_date` AS `employee_hired_date`,`b`.`branch_name` AS `branch_name`,`p`.`position_name` AS `position_name`,`s`.`shift_name` AS `shift_name`,`e`.`employee_is_seller` AS `employee_is_seller`,`e`.`employee_stock_location_id` AS `employee_stock_location_id`,`sl`.`stock_location_name` AS `stock_location_name`,`e`.`employee_card` AS `employee_card`,`e`.`status` AS `status` from ((((`employee` `e` join `branch` `b` on((`e`.`employee_brand_id` = `b`.`branch_id`))) join `position` `p` on((`e`.`employee_position_id` = `p`.`position_id`))) join `shift` `s` on((`e`.`employee_shift_id` = `s`.`shift_id`))) left join `stock_location` `sl` on((`e`.`employee_stock_location_id` = `sl`.`stock_location_id`))) where ((`b`.`branch_status` = 1) and (`p`.`status` = 1)) ;

-- Dumping structure for view rms_makro_home_stage.v_expense
DROP VIEW IF EXISTS `v_expense`;
-- Removing temporary table and create final VIEW structure
DROP TABLE IF EXISTS `v_expense`;
CREATE   SQL SECURITY DEFINER VIEW `v_expense` AS select `e`.`expense_id` AS `expense_id`,`ve`.`expense_detail_id` AS `expense_detail_id`,concat('E',convert(lpad(`e`.`expense_no`,6,0) using utf8mb4)) AS `expense_nos`,concat('E',convert(lpad(`e`.`expense_no`,6,0) using utf8),' / ',`b`.`branch_name`) AS `expense_no_prefix`,`e`.`expense_no` AS `expense_no`,ifnull(`ve`.`expense_chart_number`,`ve`.`expense_detail_id`) AS `expense_chart_number`,`ve`.`expense_detail_name` AS `expense_detail_name`,`e`.`expense_date` AS `expense_date`,`e`.`expense_type_id` AS `expense_type_id`,`et`.`expense_type_name` AS `expense_type_name`,`e`.`expense_amount` AS `expense_amount`,`e`.`expense_created_date` AS `expense_created_date`,`e`.`expense_modified_date` AS `expense_modified_date`,`e`.`expense_status` AS `expense_status`,`ep`.`employee_name` AS `recorder`,`e`.`expense_des` AS `expense_note`,`e`.`expense_branch_id` AS `expense_branch_id`,`b`.`branch_name` AS `branch_name`,`e`.`expense_created_by` AS `expense_created_by`,`em`.`employee_name` AS `modified_by` from (((((`expense` `e` left join `expense_detail` `ve` on((`ve`.`expense_detail_id` = `e`.`expense_detail_id`))) left join `employee` `ep` on((`ep`.`employee_id` = `e`.`expense_created_by`))) left join `employee` `em` on((`em`.`employee_id` = `e`.`expense_modified_by`))) left join `expense_type` `et` on((`et`.`expense_type_id` = `ve`.`expense_type_id`))) left join `branch` `b` on((`b`.`branch_id` = `e`.`expense_branch_id`))) order by `e`.`expense_id` desc ;

-- Dumping structure for view rms_makro_home_stage.v_expense_detail
DROP VIEW IF EXISTS `v_expense_detail`;
-- Removing temporary table and create final VIEW structure
DROP TABLE IF EXISTS `v_expense_detail`;
CREATE   SQL SECURITY DEFINER VIEW `v_expense_detail` AS select `ed`.`expense_detail_id` AS `expense_detail_id`,`ed`.`expense_type_id` AS `expense_type_id`,`et`.`expense_type_name` AS `expense_type_name`,`ed`.`expense_detail_name` AS `expense_detail_name`,`ed`.`expense_chart_number` AS `expense_chart_number`,`ed`.`expense_detail_created_date` AS `expense_detail_created_date`,`e`.`employee_name` AS `employee_name`,`em`.`employee_name` AS `expense_detail_modified_by`,`ed`.`expense_detail_modified_date` AS `expense_detail_modified_date`,`ed`.`expense_detail_status` AS `expense_detail_status` from (((`expense_detail` `ed` join `expense_type` `et` on((`ed`.`expense_type_id` = `et`.`expense_type_id`))) left join `employee` `e` on((`ed`.`expense_detail_created_by` = `e`.`employee_id`))) left join `employee` `em` on((`em`.`employee_id` = `ed`.`expense_detail_modified_by`))) order by `ed`.`expense_detail_id` desc ;

-- Dumping structure for view rms_makro_home_stage.v_expense_type
DROP VIEW IF EXISTS `v_expense_type`;
-- Removing temporary table and create final VIEW structure
DROP TABLE IF EXISTS `v_expense_type`;
CREATE   SQL SECURITY DEFINER VIEW `v_expense_type` AS select `et`.`expense_type_id` AS `expense_type_id`,`et`.`expense_chart_number` AS `expense_chart_number`,`et`.`expense_type_name` AS `expense_type_name`,`et`.`expense_type_des` AS `expense_type_des`,`et`.`expense_type_created_by` AS `expense_type_created_by`,`et`.`expense_type_created_date` AS `expense_type_created_date`,`et`.`expense_type_modified_by` AS `expense_type_modified_by`,`et`.`expense_type_modified_date` AS `expense_type_modified_date`,`e`.`employee_name` AS `recorder`,`em`.`employee_name` AS `modified_by` from ((`expense_type` `et` left join `employee` `e` on((('' = '') and (`et`.`expense_type_created_by` = `e`.`employee_id`)))) left join `employee` `em` on((`em`.`employee_id` = `et`.`expense_type_modified_by`))) ;

-- Dumping structure for view rms_makro_home_stage.v_floor_table_layout
DROP VIEW IF EXISTS `v_floor_table_layout`;
-- Removing temporary table and create final VIEW structure
DROP TABLE IF EXISTS `v_floor_table_layout`;
CREATE   SQL SECURITY DEFINER VIEW `v_floor_table_layout` AS select `ftl`.`layout_id` AS `layout_id`,`ftl`.`floor_id` AS `floor_id`,`f`.`floor_name` AS `floor_name`,`ftl`.`layout_name` AS `layout_name`,`ftl`.`layout_manage_by` AS `layout_manage_by`,`e`.`employee_name` AS `employee_name` from ((`floor_table_layout` `ftl` join `floor` `f` on((`ftl`.`floor_id` = `f`.`floor_id`))) left join `employee` `e` on((`ftl`.`layout_manage_by` = `e`.`employee_id`))) ;

-- Dumping structure for view rms_makro_home_stage.v_happy_hour
DROP VIEW IF EXISTS `v_happy_hour`;
-- Removing temporary table and create final VIEW structure
DROP TABLE IF EXISTS `v_happy_hour`;
CREATE   SQL SECURITY DEFINER VIEW `v_happy_hour` AS select `hh`.`id` AS `id`,`it`.`item_type_id` AS `item_type_id`,`hh`.`happy_hour_name` AS `happy_hour_name`,`it`.`item_type_name` AS `item_type_name`,`hh`.`happy_hour_from_date` AS `happy_hour_date`,`hh`.`happy_hour_start_time` AS `happy_hour_start_time`,`hh`.`happy_hour_end_time` AS `happy_hour_end_time`,`hh`.`happy_hour_discount` AS `happy_hour_discount`,`hh`.`happy_hour_description` AS `happy_hour_description`,`hh`.`happy_hour_status` AS `happy_hour_status` from (`happy_hour` `hh` join `item_type` `it` on((`hh`.`happy_hour_item_type_id` = `it`.`item_type_id`))) ;

-- Dumping structure for view rms_makro_home_stage.v_ingredient
DROP VIEW IF EXISTS `v_ingredient`;
-- Removing temporary table and create final VIEW structure
DROP TABLE IF EXISTS `v_ingredient`;
CREATE   SQL SECURITY DEFINER VIEW `v_ingredient` AS select `ig`.`ingredient_id` AS `ingredient_id`,concat(convert(lpad(`id`.`item_detail_part_number`,5,0) using utf8),':',`id`.`item_detail_name`) AS `item_name`,`id`.`item_detail_name` AS `item_detail_name`,lpad(`idg`.`item_detail_part_number`,5,0) AS `item_detail_part_number`,`idg`.`item_detail_name` AS `ingredient_name`,`idg`.`item_detail_retail_price` AS `item_detail_retail_price`,format(`ig`.`ingredient_qty`,2) AS `ingredient_qty`,format((`ig`.`ingredient_qty` * `get_costing_by_item`(`ig`.`ingredient_item_ingredient_id`)),5) AS `costing`,`get_total_ingredient_costing_by_item`(`ig`.`ingredient_item_detail_id`) AS `total_cost`,`m`.`measure_name` AS `measure_name`,`m`.`measure_id` AS `measure_id`,`e`.`employee_name` AS `recorder`,`em`.`employee_name` AS `modified_by`,`ig`.`ingredient_modified_date` AS `ingredient_modified_date`,`ig`.`ingredient_created_date` AS `ingredient_created_date`,`ig`.`ingredient_status` AS `ingredient_status`,`ig`.`ingredient_no` AS `ingredient_no`,`ig`.`ingredient_desc` AS `ingredient_desc`,`idg`.`item_detail_id` AS `item_detail_id`,`ig`.`ingredient_item_detail_id` AS `ingredient_item_detail_id`,`id`.`item_detail_retail_price` AS `item_main_retail_price` from (((((`ingredient` `ig` left join `item_detail` `id` on((`ig`.`ingredient_item_detail_id` = `id`.`item_detail_id`))) left join `item_detail` `idg` on((`idg`.`item_detail_id` = `ig`.`ingredient_item_ingredient_id`))) left join `employee` `e` on((`e`.`employee_id` = `ig`.`ingredient_created_by`))) left join `employee` `em` on((`em`.`employee_id` = `ig`.`ingredient_modified_by`))) left join `measure` `m` on((`ig`.`ingredient_measure_id` = `m`.`measure_id`))) ;

-- Dumping structure for view rms_makro_home_stage.v_item_detail
DROP VIEW IF EXISTS `v_item_detail`;
-- Removing temporary table and create final VIEW structure
DROP TABLE IF EXISTS `v_item_detail`;
CREATE   SQL SECURITY DEFINER VIEW `v_item_detail` AS select `id`.`item_type_id` AS `item_type_id`,`it`.`item_type_name` AS `item_type_name`,`it`.`item_type_is_car_wash` AS `item_type_is_car_wash`,`it`.`item_type_is_ingredient` AS `item_type_is_ingredient`,`id`.`item_detail_part_number` AS `item_detail_part_number`,`id`.`item_detail_id` AS `item_detail_id`,`id`.`item_detail_name` AS `item_detail_name`,`id`.`item_detail_whole_price` AS `item_detail_whole_price`,`id`.`item_detail_retail_price` AS `item_detail_retail_price`,`id`.`item_detail_created_by` AS `item_detail_created_by`,`id`.`item_detail_created_date` AS `item_detail_created_date`,`id`.`item_detail_des` AS `item_detail_des`,`id`.`item_detail_modified_by` AS `item_detail_modified_by`,`id`.`item_detail_modified_date` AS `item_detail_modified_date`,`e`.`employee_name` AS `recorder`,`id`.`item_detail_photo` AS `item_detail_photo`,`pl`.`printer_location_name` AS `printer_location_name`,`id`.`item_detail_printer_location_id` AS `item_detail_printer_location_id`,`id`.`item_detail_like_count` AS `item_detail_like_count`,`id`.`item_detail_remain_alert` AS `item_detail_remain_alert`,`id`.`item_detail_cut_stock` AS `item_detail_cut_stock`,`id`.`measure_id` AS `measure_id`,`m`.`measure_name` AS `measure_name`,`m`.`measure_note` AS `measure_note`,`m`.`measure_qty` AS `measure_qty`,`id`.`color` AS `color` from ((((`item_detail` `id` left join `item_type` `it` on((`id`.`item_type_id` = `it`.`item_type_id`))) left join `employee` `e` on((`id`.`item_detail_created_by` = `e`.`employee_id`))) left join `printer_location` `pl` on((`pl`.`printer_location_id` = `id`.`item_detail_printer_location_id`))) left join `measure` `m` on((`id`.`measure_id` = `m`.`measure_id`))) ;

-- Dumping structure for view rms_makro_home_stage.v_item_type
DROP VIEW IF EXISTS `v_item_type`;
-- Removing temporary table and create final VIEW structure
DROP TABLE IF EXISTS `v_item_type`;
CREATE   SQL SECURITY DEFINER VIEW `v_item_type` AS select `it`.`item_type_id` AS `item_type_id`,`c`.`category_id` AS `category_id`,`c`.`category_name` AS `category_name`,`it`.`item_type_name` AS `item_type_name`,`it`.`item_type_des` AS `item_type_des`,`it`.`item_type_created_date` AS `item_type_created_date`,`it`.`item_type_created_by` AS `item_type_created_by`,`it`.`item_type_is_ingredient` AS `item_type_is_ingredient`,`it`.`item_type_is_car_wash` AS `item_type_is_car_wash`,`it`.`item_type_modified_by` AS `item_type_modified_by`,`it`.`item_type_modified_date` AS `item_type_modified_date`,`e`.`employee_name` AS `recorder` from ((`item_type` `it` left join `employee` `e` on((`it`.`item_type_created_by` = `e`.`employee_id`))) left join `category` `c` on((`c`.`category_id` = `it`.`category_id`))) ;

-- Dumping structure for view rms_makro_home_stage.v_measure
DROP VIEW IF EXISTS `v_measure`;
-- Removing temporary table and create final VIEW structure
DROP TABLE IF EXISTS `v_measure`;
CREATE   SQL SECURITY DEFINER VIEW `v_measure` AS select `m`.`measure_id` AS `measure_id`,`m`.`measure_name` AS `measure_name`,`m`.`measure_qty` AS `measure_qty`,`m`.`measure_note` AS `measure_note`,`m`.`measure_created_date` AS `date_entry`,`em`.`employee_name` AS `employee_name` from (`measure` `m` left join `employee` `em` on((`em`.`employee_id` = `m`.`measure_created_by`))) ;

-- Dumping structure for view rms_makro_home_stage.v_point
DROP VIEW IF EXISTS `v_point`;
-- Removing temporary table and create final VIEW structure
DROP TABLE IF EXISTS `v_point`;
CREATE   SQL SECURITY DEFINER VIEW `v_point` AS select `p`.`id` AS `id`,`p`.`point` AS `point`,`p`.`froms` AS `froms`,`p`.`tos` AS `tos`,`p`.`date_created` AS `date_created`,`p`.`created_by` AS `created_by`,`p`.`desc` AS `desc`,`e`.`employee_brand_id` AS `employee_brand_id`,`e`.`employee_name` AS `employee_name` from (`point` `p` join `employee` `e` on((('' = '') and (`p`.`created_by` = `e`.`employee_id`)))) where (`e`.`employee_brand_id` = 1) ;

-- Dumping structure for view rms_makro_home_stage.v_position
DROP VIEW IF EXISTS `v_position`;
-- Removing temporary table and create final VIEW structure
DROP TABLE IF EXISTS `v_position`;
CREATE   SQL SECURITY DEFINER VIEW `v_position` AS select `g`.`position_id` AS `position_id`,`g`.`position_name` AS `position_name`,`g`.`position_note` AS `position_note`,`g`.`position_created_date` AS `date_entry`,`em`.`employee_name` AS `employee_name`,`g`.`status` AS `status` from (`position` `g` join `employee` `em` on((`em`.`employee_id` = `g`.`position_created_by`))) ;

-- Dumping structure for view rms_makro_home_stage.v_purchase
DROP VIEW IF EXISTS `v_purchase`;
-- Removing temporary table and create final VIEW structure
DROP TABLE IF EXISTS `v_purchase`;
CREATE   SQL SECURITY DEFINER VIEW `v_purchase` AS select `purchase`.`purchase_no` AS `purchase_no`,`purchase`.`refference_no` AS `refference_no`,`purchase`.`purchase_supplier_id` AS `purchase_supplier_id`,`supplier`.`supplier_name` AS `supplier_name`,`supplier`.`supplier_phone` AS `supplier_phone`,`supplier`.`supplier_address` AS `supplier_address`,`purchase`.`purchase_created_date` AS `purchase_created_date`,`purchase`.`purchase_created_by` AS `purchase_created_by`,`purchase`.`purchase_modified_by` AS `purchase_modified_by`,`purchase`.`purchase_modified_date` AS `purchase_modified_date`,`purchase`.`purchase_branch_id` AS `purchase_branch_id`,`b`.`branch_name` AS `branch_name`,`purchase`.`purchase_due_date` AS `purchase_due_date`,`purchase`.`purchase_deposit` AS `purchase_deposit`,`purchase`.`purchase_discount` AS `purchase_discount`,`purchase`.`purchase_note` AS `purchase_note`,`purchase`.`purchase_vat` AS `purchase_vat`,`purchase`.`purchase_total_amount` AS `purchase_total_amount`,`purchase`.`status` AS `status`,(`purchase`.`purchase_total_amount` - ((ifnull(`get_po_pay`(`purchase`.`purchase_no`),0) + `purchase`.`purchase_deposit`) + ((`purchase`.`purchase_discount` / 100) * `purchase`.`purchase_total_amount`))) AS `purchase_credit`,`get_employee_name`(`purchase`.`purchase_created_by`) AS `created_by` from ((`purchase` left join `supplier` on((`supplier`.`supplier_id` = `purchase`.`purchase_supplier_id`))) join `branch` `b` on((`b`.`branch_id` = `purchase`.`purchase_branch_id`))) order by `purchase`.`purchase_no` desc ;

-- Dumping structure for view rms_makro_home_stage.v_purchase_detail
DROP VIEW IF EXISTS `v_purchase_detail`;
-- Removing temporary table and create final VIEW structure
DROP TABLE IF EXISTS `v_purchase_detail`;
CREATE   SQL SECURITY DEFINER VIEW `v_purchase_detail` AS select `p`.`purchase_no` AS `purchase_no`,concat(convert(lpad(`p`.`purchase_no`,6,'0') using utf8),' : ',`s`.`supplier_name`,' / ',`p`.`purchase_created_date`) AS `po_supplier`,`pd`.`purchase_detail_id` AS `purchase_detail_id`,`pd`.`purchase_detail_item_detail_id` AS `purchase_detail_item_detail_id`,`im`.`item_detail_name` AS `item_detail_name`,`pd`.`measure_id` AS `measure_id`,`ms`.`measure_name` AS `measure_name`,`pd`.`measure_qty` AS `measure_qty`,`pd`.`purchase_detail_unit_cost` AS `purchase_detail_unit_cost`,`pd`.`purchase_detail_qty` AS `purchase_detail_qty`,`pd`.`purchase_detail_total_amount` AS `purchase_detail_total_amount`,`pd`.`purchase_created_date` AS `purchase_created_date`,`pd`.`purchase_created_by` AS `purchase_created_by`,`pd`.`purchase_modified_by` AS `purchase_modified_by`,`pd`.`purchase_modified_date` AS `purchase_modified_date`,`pd`.`purchase_detail_note` AS `purchase_detail_note`,`pd`.`status` AS `status`,`b`.`branch_id` AS `branch_id`,`b`.`branch_name` AS `branch_name`,`pd`.`stock_location_id` AS `stock_location_id`,`sl`.`stock_location_name` AS `stock_location_name`,`im`.`item_detail_part_number` AS `item_detail_part_number`,`s`.`supplier_name` AS `supplier_name`,`p`.`purchase_supplier_id` AS `purchase_supplier_id`,`pd`.`purchase_detail_item_expired_date` AS `expired_date`,`pd`.`purchase_detail_item_expired_date` AS `expired_alert` from ((((((`purchase` `p` join `purchase_detail` `pd` on((`p`.`purchase_no` = `pd`.`purchase_no`))) left join `item_detail` `im` on((`im`.`item_detail_id` = `pd`.`purchase_detail_item_detail_id`))) left join `supplier` `s` on((`p`.`purchase_supplier_id` = `s`.`supplier_id`))) left join `stock_location` `sl` on((`pd`.`stock_location_id` = `sl`.`stock_location_id`))) left join `measure` `ms` on((`pd`.`measure_id` = `ms`.`measure_id`))) left join `branch` `b` on((`b`.`branch_id` = `p`.`purchase_branch_id`))) ;

-- Dumping structure for view rms_makro_home_stage.v_purchase_pay
DROP VIEW IF EXISTS `v_purchase_pay`;
-- Removing temporary table and create final VIEW structure
DROP TABLE IF EXISTS `v_purchase_pay`;
CREATE   SQL SECURITY DEFINER VIEW `v_purchase_pay` AS select `purchase_pay`.`purchase_pay_id` AS `purchase_pay_id`,`purchase_pay`.`purchase_no` AS `purchase_no`,`s`.`supplier_name` AS `supplier_name`,`purchase_pay`.`purchase_pay_date` AS `purchase_pay_date`,`purchase_pay`.`purchase_pay_amount` AS `purchase_pay_amount`,`get_credit_by_po_pay`(`purchase`.`purchase_no`,`purchase_pay`.`purchase_pay_id`) AS `purchase_pay_credit_amount`,`purchase_pay`.`purchase_pay_note` AS `purchase_pay_note`,`purchase_pay`.`purchase_pay_created_by` AS `purchase_pay_created_by`,`purchase_pay`.`purchase_pay_created_date` AS `purchase_pay_created_date`,`purchase_pay`.`purchase_pay_modified_by` AS `purchase_pay_modified_by`,`purchase_pay`.`purchase_pay_modified_date` AS `purchase_pay_modified_date`,`purchase`.`purchase_branch_id` AS `purchase_branch_id`,`b`.`branch_name` AS `branch_name`,`get_employee_name`(`purchase_pay`.`purchase_pay_created_by`) AS `recorder` from (((`purchase_pay` join `purchase` on((`purchase`.`purchase_no` = `purchase_pay`.`purchase_no`))) left join `supplier` `s` on((`s`.`supplier_id` = `purchase`.`purchase_supplier_id`))) left join `branch` `b` on((`b`.`branch_id` = `purchase`.`purchase_branch_id`))) order by `purchase_pay`.`purchase_pay_id` desc ;

-- Dumping structure for view rms_makro_home_stage.v_purchase_return
DROP VIEW IF EXISTS `v_purchase_return`;
-- Removing temporary table and create final VIEW structure
DROP TABLE IF EXISTS `v_purchase_return`;
CREATE   SQL SECURITY DEFINER VIEW `v_purchase_return` AS select `purchase_pay`.`purchase_pay_id` AS `purchase_pay_id`,`purchase_pay`.`purchase_no` AS `purchase_no`,`purchase_pay`.`purchase_pay_date` AS `purchase_pay_date`,`purchase_pay`.`purchase_pay_amount` AS `purchase_pay_amount`,`purchase_pay`.`purchase_pay_note` AS `purchase_pay_note`,`purchase_pay`.`purchase_pay_created_by` AS `purchase_pay_created_by`,`purchase_pay`.`purchase_pay_created_date` AS `purchase_pay_created_date`,`purchase_pay`.`purchase_pay_modified_by` AS `purchase_pay_modified_by`,`purchase_pay`.`purchase_pay_modified_date` AS `purchase_pay_modified_date` from `purchase_pay` ;

-- Dumping structure for view rms_makro_home_stage.v_sale_detail
DROP VIEW IF EXISTS `v_sale_detail`;
-- Removing temporary table and create final VIEW structure
DROP TABLE IF EXISTS `v_sale_detail`;
CREATE   SQL SECURITY DEFINER VIEW `v_sale_detail` AS select `sm`.`sale_master_id` AS `sale_master_id`,`sd`.`sale_detail_id` AS `sale_detail_id`,lpad(`sm`.`sale_master_invoice_no`,6,0) AS `invoice_no`,`em`.`employee_name` AS `recorder`,`sm`.`sale_master_start_date` AS `checkin_date`,`sm`.`sale_master_end_date` AS `checkout_date`,`sm`.`sale_master_cash_id` AS `cash_id`,`sm`.`sale_master_branch_id` AS `sale_master_branch_id`,`ct`.`customer_type_name` AS `customer_type`,`sm`.`sale_master_customer_id` AS `sale_master_customer_id`,`cs`.`customer_name` AS `customer_name`,`cs`.`customer_phone` AS `customer_phone`,`cs`.`customer_address` AS `customer_address`,`idt`.`item_detail_part_number` AS `part_number`,`sd`.`sale_detail_item_id` AS `sale_detail_item_id`,`idt`.`item_detail_name` AS `item_detail_name`,`idt`.`item_detail_cut_stock` AS `cut_stock`,`sd`.`sale_detail_qty` AS `sale_detail_qty`,`sd`.`sale_detail_dis_us` AS `sale_detail_dis_us`,`sd`.`sale_detail_dis_percent` AS `sale_detail_dis_percent`,`sd`.`sale_detail_unit_price` AS `sale_detail_unit_price`,cast((((`sd`.`sale_detail_qty` * `sd`.`sale_detail_unit_price`) * (`sd`.`sale_detail_dis_percent` / 100)) + `sd`.`sale_detail_dis_us`) as decimal(10,3)) AS `discount`,cast(((((`sd`.`sale_detail_qty` * `sd`.`sale_detail_unit_price`) * (1 - (`sd`.`sale_detail_dis_percent` / 100))) - `sd`.`sale_detail_dis_us`) * (`sm`.`sale_master_tax` / 100)) as decimal(10,3)) AS `vat`,cast((`sd`.`sale_detail_qty` * `sd`.`sale_detail_unit_price`) as decimal(10,3)) AS `subtotal`,cast(((((`sd`.`sale_detail_qty` * `sd`.`sale_detail_unit_price`) * (1 - (`sd`.`sale_detail_dis_percent` / 100))) - `sd`.`sale_detail_dis_us`) * (1 + (`sm`.`sale_master_tax` / 100))) as decimal(10,3)) AS `grandtotal`,`sm`.`sale_master_status` AS `sale_master_status`,`sd`.`sale_detail_status` AS `sale_detail_status`,`pr`.`printer_id` AS `printer_id`,`pr`.`printer_name` AS `printer_name`,`pr`.`printer_print_kitchen` AS `printer_print_kitchen`,`pr`.`printer_print_kitchen_time` AS `printer_print_kitchen_time`,`ftl`.`layout_name` AS `layout_name`,`sd`.`sale_detail_printed` AS `sale_detail_printed` from ((((((((`sale_detail` `sd` join `sale_master` `sm` on((`sm`.`sale_master_id` = `sd`.`sale_master_id`))) left join `employee` `em` on((`em`.`employee_id` = `sm`.`sale_master_cashier_id`))) left join `item_detail` `idt` on((`idt`.`item_detail_id` = `sd`.`sale_detail_item_id`))) left join `customer` `cs` on((`cs`.`customer_id` = `sm`.`sale_master_customer_id`))) left join `customer_type` `ct` on((`ct`.`customer_type_id` = `cs`.`customer_type_id`))) left join `printer_location` `prl` on((`idt`.`item_detail_printer_location_id` = `prl`.`printer_location_id`))) left join `printer` `pr` on((`prl`.`printer_location_id` = `pr`.`printer_location_id`))) left join `floor_table_layout` `ftl` on((`sm`.`sale_master_layout_id` = `ftl`.`layout_id`))) where ((`sm`.`sale_master_status` in (1,2)) and (`sd`.`sale_detail_status` = 1)) ;

-- Dumping structure for view rms_makro_home_stage.v_sale_detail_note
DROP VIEW IF EXISTS `v_sale_detail_note`;
-- Removing temporary table and create final VIEW structure
DROP TABLE IF EXISTS `v_sale_detail_note`;
CREATE   SQL SECURITY DEFINER VIEW `v_sale_detail_note` AS select `sn`.`sale_note_id` AS `sale_note_id`,`sn`.`sale_note_detail_id` AS `sale_note_detail_id`,`sn`.`sale_note_item_note_id` AS `sale_note_item_note_id`,`itn`.`item_note_name` AS `item_note_name`,`sn`.`sale_note_qty` AS `sale_note_qty`,`sn`.`sale_note_unit_price` AS `sale_note_unit_price`,`sn`.`sale_note_status` AS `sale_note_status` from (`sale_note` `sn` left join `item_note` `itn` on((`sn`.`sale_note_item_note_id` = `itn`.`item_note_id`))) ;

-- Dumping structure for view rms_makro_home_stage.v_sale_order_return
DROP VIEW IF EXISTS `v_sale_order_return`;
-- Removing temporary table and create final VIEW structure
DROP TABLE IF EXISTS `v_sale_order_return`;
CREATE   SQL SECURITY DEFINER VIEW `v_sale_order_return` AS select `sr`.`sale_return_id` AS `sale_return_id`,`sm`.`sale_master_id` AS `sale_master_id`,`sm`.`sale_master_invoice_no` AS `sale_master_invoice_no`,`sm`.`sale_master_end_date` AS `sale_master_end_date`,`sm`.`sale_master_start_date` AS `sale_master_start_date`,`sd`.`sale_detail_item_id` AS `sale_detail_item_id`,`id`.`item_detail_name` AS `item_detail_name`,`sr`.`sale_return_qty` AS `sale_return_qty`,`sd`.`sale_detail_unit_price` AS `sale_detail_unit_price`,(`sd`.`sale_detail_unit_price` * `sr`.`sale_return_qty`) AS `sub_total`,`sr`.`sale_return_created_date` AS `sale_return_created_date`,`em`.`employee_name` AS `employee_name`,`fl`.`layout_name` AS `layout_name`,`sm`.`sale_master_branch_id` AS `sale_master_branch_id`,`b`.`branch_name` AS `branch_name`,lpad(`sm`.`sale_master_invoice_no`,6,0) AS `invoice_no` from ((((((`sale_order_return` `sr` join `sale_master` `sm` on((`sm`.`sale_master_id` = `sr`.`sale_return_master_id`))) join `sale_detail` `sd` on((`sd`.`sale_detail_id` = `sr`.`sale_return_detail_id`))) join `item_detail` `id` on((`id`.`item_detail_id` = `sd`.`sale_detail_item_id`))) join `employee` `em` on((`em`.`employee_id` = `sr`.`sale_return_created_by`))) join `floor_table_layout` `fl` on((`fl`.`layout_id` = `sm`.`sale_master_layout_id`))) join `branch` `b` on((`b`.`branch_id` = `sm`.`sale_master_branch_id`))) ;

-- Dumping structure for view rms_makro_home_stage.v_sale_return
DROP VIEW IF EXISTS `v_sale_return`;
-- Removing temporary table and create final VIEW structure
DROP TABLE IF EXISTS `v_sale_return`;
CREATE   SQL SECURITY DEFINER VIEW `v_sale_return` AS select `sr`.`item_detail_id` AS `item_detail_id`,`sr`.`measure_id` AS `measure_id`,`sr`.`sale_return_id` AS `sale_return_id`,`sr`.`sale_return_no` AS `sale_return_no`,`id`.`item_detail_name` AS `item_detail_name`,`e`.`employee_name` AS `recorder`,`s`.`customer_name` AS `customer_name`,`b`.`branch_name` AS `branch_name`,`sr`.`sale_return_qty` AS `sale_return_qty`,`sr`.`sale_return_price` AS `sale_return_price`,`sr`.`sale_return_date` AS `sale_return_date`,`sr`.`sale_return_created_date` AS `sale_return_created_date`,`sr`.`sale_return_note` AS `sale_return_note`,`sr`.`sale_return_status` AS `sale_return_status`,`e`.`employee_brand_id` AS `employee_brand_id`,`sr`.`sale_return_to_stock` AS `sale_return_to_stock` from ((((`sale_return` `sr` join `item_detail` `id` on((`id`.`item_detail_id` = `sr`.`item_detail_id`))) join `employee` `e` on((`e`.`employee_id` = `sr`.`sale_return_created_by`))) left join `customer` `s` on((`s`.`customer_id` = `sr`.`customer_id`))) join `branch` `b` on((`b`.`branch_id` = `sr`.`branch_id`))) ;

-- Dumping structure for view rms_makro_home_stage.v_sale_summary
DROP VIEW IF EXISTS `v_sale_summary`;
-- Removing temporary table and create final VIEW structure
DROP TABLE IF EXISTS `v_sale_summary`;
CREATE   SQL SECURITY DEFINER VIEW `v_sale_summary` AS select `sm`.`sale_master_id` AS `sale_master_id`,`sd`.`sale_detail_id` AS `sale_detail_id`,lpad(`sm`.`sale_master_invoice_no`,6,0) AS `invoice_no`,`fl`.`floor_name` AS `floor_name`,`ftl`.`layout_name` AS `table_name`,`em`.`employee_name` AS `cashier`,`sm`.`sale_master_start_date` AS `checkin_date`,`sm`.`sale_master_end_date` AS `checkout_date`,`sm`.`sale_master_cash_id` AS `cash_id`,`sm`.`sale_master_branch_id` AS `sale_master_branch_id`,`br`.`branch_name` AS `branch_name`,`ct`.`customer_type_name` AS `customer_type`,`sm`.`sale_master_customer_id` AS `sale_master_customer_id`,`cs`.`customer_name` AS `customer_name`,`cs`.`customer_phone` AS `customer_phone`,`cs`.`customer_address` AS `customer_address`,sum(`sd`.`sale_detail_costing`) AS `costing`,cast((((((sum((((`sd`.`sale_detail_qty` * `sd`.`sale_detail_unit_price`) * (1 - (`sd`.`sale_detail_dis_percent` / 100))) - `sd`.`sale_detail_dis_us`)) + `get_sale_note_summary`(`sm`.`sale_master_id`)) * `sm`.`sale_master_discount_percent`) / 100) + sum((((`sd`.`sale_detail_qty` * `sd`.`sale_detail_unit_price`) * (`sd`.`sale_detail_dis_percent` / 100)) + `sd`.`sale_detail_dis_us`))) + ((cast((sum((((`sd`.`sale_detail_qty` * `sd`.`sale_detail_unit_price`) * (1 - (`sd`.`sale_detail_dis_percent` / 100))) - `sd`.`sale_detail_dis_us`)) + `get_sale_note_summary`(`sm`.`sale_master_id`)) as decimal(10,2)) - ((cast((sum((((`sd`.`sale_detail_qty` * `sd`.`sale_detail_unit_price`) * (1 - (`sd`.`sale_detail_dis_percent` / 100))) - `sd`.`sale_detail_dis_us`)) + `get_sale_note_summary`(`sm`.`sale_master_id`)) as decimal(10,2)) * `sm`.`sale_master_discount_percent`) / 100)) * (`sm`.`sale_master_member_discount` / 100))) as decimal(10,2)) AS `discount`,cast((((sum((`sd`.`sale_detail_qty` * `sd`.`sale_detail_unit_price`)) + `get_sale_note_summary`(`sm`.`sale_master_id`)) - (((((sum((((`sd`.`sale_detail_qty` * `sd`.`sale_detail_unit_price`) * (1 - (`sd`.`sale_detail_dis_percent` / 100))) - `sd`.`sale_detail_dis_us`)) + `get_sale_note_summary`(`sm`.`sale_master_id`)) * `sm`.`sale_master_discount_percent`) / 100) + sum((((`sd`.`sale_detail_qty` * `sd`.`sale_detail_unit_price`) * (`sd`.`sale_detail_dis_percent` / 100)) + `sd`.`sale_detail_dis_us`))) + (((sum((((`sd`.`sale_detail_qty` * `sd`.`sale_detail_unit_price`) * (1 - (`sd`.`sale_detail_dis_percent` / 100))) - `sd`.`sale_detail_dis_us`)) + `get_sale_note_summary`(`sm`.`sale_master_id`)) - (((sum((((`sd`.`sale_detail_qty` * `sd`.`sale_detail_unit_price`) * (1 - (`sd`.`sale_detail_dis_percent` / 100))) - `sd`.`sale_detail_dis_us`)) + `get_sale_note_summary`(`sm`.`sale_master_id`)) * `sm`.`sale_master_discount_percent`) / 100)) * (`sm`.`sale_master_member_discount` / 100)))) * (`sm`.`sale_master_tax` / 100)) as decimal(10,2)) AS `tax`,cast((sum((`sd`.`sale_detail_qty` * `sd`.`sale_detail_unit_price`)) + `get_sale_note_summary`(`sm`.`sale_master_id`)) as decimal(10,2)) AS `SubTotal`,cast((((sum((`sd`.`sale_detail_qty` * `sd`.`sale_detail_unit_price`)) + `get_sale_note_summary`(`sm`.`sale_master_id`)) - (((((sum((((`sd`.`sale_detail_qty` * `sd`.`sale_detail_unit_price`) * (1 - (`sd`.`sale_detail_dis_percent` / 100))) - `sd`.`sale_detail_dis_us`)) + `get_sale_note_summary`(`sm`.`sale_master_id`)) * `sm`.`sale_master_discount_percent`) / 100) + sum((((`sd`.`sale_detail_qty` * `sd`.`sale_detail_unit_price`) * (`sd`.`sale_detail_dis_percent` / 100)) + `sd`.`sale_detail_dis_us`))) + (((sum((((`sd`.`sale_detail_qty` * `sd`.`sale_detail_unit_price`) * (1 - (`sd`.`sale_detail_dis_percent` / 100))) - `sd`.`sale_detail_dis_us`)) + `get_sale_note_summary`(`sm`.`sale_master_id`)) - (((sum((((`sd`.`sale_detail_qty` * `sd`.`sale_detail_unit_price`) * (1 - (`sd`.`sale_detail_dis_percent` / 100))) - `sd`.`sale_detail_dis_us`)) + `get_sale_note_summary`(`sm`.`sale_master_id`)) * `sm`.`sale_master_discount_percent`) / 100)) * (`sm`.`sale_master_member_discount` / 100)))) + (((sum((`sd`.`sale_detail_qty` * `sd`.`sale_detail_unit_price`)) + `get_sale_note_summary`(`sm`.`sale_master_id`)) - (((((sum((((`sd`.`sale_detail_qty` * `sd`.`sale_detail_unit_price`) * (1 - (`sd`.`sale_detail_dis_percent` / 100))) - `sd`.`sale_detail_dis_us`)) + `get_sale_note_summary`(`sm`.`sale_master_id`)) * `sm`.`sale_master_discount_percent`) / 100) + sum((((`sd`.`sale_detail_qty` * `sd`.`sale_detail_unit_price`) * (`sd`.`sale_detail_dis_percent` / 100)) + `sd`.`sale_detail_dis_us`))) + (((sum((((`sd`.`sale_detail_qty` * `sd`.`sale_detail_unit_price`) * (1 - (`sd`.`sale_detail_dis_percent` / 100))) - `sd`.`sale_detail_dis_us`)) + `get_sale_note_summary`(`sm`.`sale_master_id`)) - (((sum((((`sd`.`sale_detail_qty` * `sd`.`sale_detail_unit_price`) * (1 - (`sd`.`sale_detail_dis_percent` / 100))) - `sd`.`sale_detail_dis_us`)) + `get_sale_note_summary`(`sm`.`sale_master_id`)) * `sm`.`sale_master_discount_percent`) / 100)) * (`sm`.`sale_master_member_discount` / 100)))) * (`sm`.`sale_master_tax` / 100))) as decimal(10,2)) AS `grandtotal`,`sm`.`sale_master_pay_us` AS `sale_master_pay_us`,`sm`.`sale_master_pay_kh` AS `sale_master_pay_kh`,`sm`.`sale_master_account_type` AS `account_type_id`,`ac`.`acc_type` AS `acc_type`,`sm`.`sale_master_other_card` AS `other_card_pay`,`sm`.`sale_master_member_discount` AS `sale_master_member_discount`,`sm`.`sale_master_member_pay` AS `member_pay`,`sm`.`sale_master_status` AS `sale_master_status`,`sm`.`sale_master_exchange_rate` AS `ex_rate` from (((((((((`sale_master` `sm` join `sale_detail` `sd` on((`sm`.`sale_master_id` = `sd`.`sale_master_id`))) left join `employee` `em` on((`em`.`employee_id` = `sm`.`sale_master_cashier_id`))) left join `item_detail` `idt` on((`idt`.`item_detail_id` = `sd`.`sale_detail_item_id`))) left join `customer` `cs` on((`cs`.`customer_id` = `sm`.`sale_master_customer_id`))) left join `customer_type` `ct` on((`ct`.`customer_type_id` = `cs`.`customer_type_id`))) left join `floor_table_layout` `ftl` on((`sm`.`sale_master_layout_id` = `ftl`.`layout_id`))) left join `floor` `fl` on((`ftl`.`floor_id` = `fl`.`floor_id`))) left join `account_type` `ac` on((`sm`.`sale_master_account_type` = `ac`.`acc_type_id`))) join `branch` `br` on((`sm`.`sale_master_branch_id` = `br`.`branch_id`))) where ((`sm`.`sale_master_status` = 2) and (`sd`.`sale_detail_status` = 1)) group by `sm`.`sale_master_id` ;

-- Dumping structure for view rms_makro_home_stage.v_shift
DROP VIEW IF EXISTS `v_shift`;
-- Removing temporary table and create final VIEW structure
DROP TABLE IF EXISTS `v_shift`;
CREATE   SQL SECURITY DEFINER VIEW `v_shift` AS select `s`.`shift_id` AS `shift_id`,`s`.`shift_name` AS `shift_name`,`s`.`shift_from` AS `shift_from`,`s`.`shift_until` AS `shift_until`,`s`.`shift_note` AS `shift_note`,`e`.`employee_name` AS `recorder`,`s`.`shift_created_date` AS `date_entry`,`s`.`shift_modified_date` AS `shift_modified_date` from (`shift` `s` left join `employee` `e` on((`s`.`shift_created_by` = `e`.`employee_id`))) ;

-- Dumping structure for view rms_makro_home_stage.v_stock
DROP VIEW IF EXISTS `v_stock`;
-- Removing temporary table and create final VIEW structure
DROP TABLE IF EXISTS `v_stock`;
CREATE   SQL SECURITY DEFINER VIEW `v_stock` AS select `s`.`stock_id` AS `stock_id`,`b`.`branch_name` AS `branch_name`,`sl`.`stock_location_name` AS `stock_location_name`,`s`.`stock_item_id` AS `stock_item_id`,`im`.`item_detail_name` AS `item_detail_name`,`s`.`stock_qty` AS `stock_qty`,`s`.`stock_costing` AS `stock_costing_by_measure_qty`,(`s`.`stock_costing` * `s`.`stock_qty`) AS `total_costing_by_measure_qty`,`m`.`measure_qty` AS `measure_qty`,`m`.`measure_note` AS `measure_note`,`m`.`measure_name` AS `measure_name`,`s`.`stock_expire_date` AS `stock_expire_date`,`s`.`stock_alert_date` AS `stock_alert_date`,`s`.`stock_modified_date` AS `stock_modified_date`,`s`.`stock_modified_by` AS `stock_modified_by`,`s`.`stock_created_date` AS `stock_created_date`,`s`.`stock_created_by` AS `stock_created_by`,`s`.`stock_location_id` AS `stock_location_id`,`s`.`measure_id` AS `measure_id`,`s`.`branch_id` AS `branch_id`,`it`.`item_type_name` AS `item_type_name`,`it`.`item_type_id` AS `item_type_id`,`im`.`item_detail_part_number` AS `item_detail_part_number` from (((((`stock` `s` join `item_detail` `im` on((`s`.`stock_item_id` = `im`.`item_detail_id`))) join `branch` `b` on((`b`.`branch_id` = `s`.`branch_id`))) left join `measure` `m` on((`m`.`measure_id` = `s`.`measure_id`))) join `stock_location` `sl` on((`sl`.`stock_location_id` = `s`.`stock_location_id`))) join `item_type` `it` on((`it`.`item_type_id` = `im`.`item_type_id`))) where (`im`.`item_detail_status` = 1) ;

-- Dumping structure for view rms_makro_home_stage.v_stock_adjust
DROP VIEW IF EXISTS `v_stock_adjust`;
-- Removing temporary table and create final VIEW structure
DROP TABLE IF EXISTS `v_stock_adjust`;
CREATE   SQL SECURITY DEFINER VIEW `v_stock_adjust` AS select `sa`.`stock_adjust_id` AS `stock_adjust_id`,`sa`.`stock_adjust_item_id` AS `stock_adjust_item_id`,`sa`.`measure_id` AS `measure_id`,`im`.`item_detail_part_number` AS `item_detail_part_number`,`im`.`item_detail_name` AS `item_detail_name`,`b`.`branch_name` AS `branch_name`,`b`.`branch_id` AS `branch_id`,`sa`.`stock_adjust_qty` AS `stock_adjust_qty`,`sa`.`stock_adjust_note` AS `stock_adjust_note`,`m`.`measure_name` AS `measure_name`,`sa`.`stock_adjust_created_date` AS `date_entry`,`sa`.`stock_adjust_modified_date` AS `date_modified`,`e`.`employee_name` AS `recorder`,`sl`.`stock_location_name` AS `stock_location_name`,`sa`.`stock_location_id` AS `stock_location_id` from (((((`stock_adjust` `sa` join `item_detail` `im` on((`im`.`item_detail_id` = `sa`.`stock_adjust_item_id`))) join `branch` `b` on((`sa`.`stock_adjust_branch_id` = `b`.`branch_id`))) left join `measure` `m` on((`sa`.`measure_id` = `m`.`measure_id`))) join `employee` `e` on((`sa`.`stock_adjust_created_by` = `e`.`employee_id`))) join `stock_location` `sl` on((`sa`.`stock_location_id` = `sl`.`stock_location_id`))) ;

-- Dumping structure for view rms_makro_home_stage.v_stock_detail
DROP VIEW IF EXISTS `v_stock_detail`;
-- Removing temporary table and create final VIEW structure
DROP TABLE IF EXISTS `v_stock_detail`;
CREATE   SQL SECURITY DEFINER VIEW `v_stock_detail` AS select `s`.`stock_id` AS `stock_id`,`ip`.`item_type_name` AS `item_type_name`,`ip`.`item_type_id` AS `item_type_id`,`it`.`item_detail_name` AS `item_detail_name`,`it`.`item_detail_id` AS `item_detail_id`,`it`.`item_detail_part_number` AS `item_detail_part_number`,`it`.`item_detail_remain_alert` AS `item_detail_remain_alert`,format(`it`.`item_detail_retail_price`,2) AS `item_detail_retail_price`,format(`it`.`item_detail_whole_price`,2) AS `item_detail_whole_price`,`s`.`stock_qty` AS `stock_qty`,format(`pd`.`purchase_detail_unit_cost`,2) AS `purchase_detail_unit_cost`,format((`s`.`stock_qty` * `pd`.`purchase_detail_unit_cost`),2) AS `total`,`e`.`employee_name` AS `recorder`,`e`.`employee_id` AS `employee_id`,`bn`.`branch_name` AS `branch_name`,`bn`.`branch_id` AS `branch_id`,`sl`.`stock_location_name` AS `stock_location_name`,`sl`.`stock_location_id` AS `stock_location_id` from ((((((`stock` `s` join `item_detail` `it` on((`s`.`stock_item_id` = `it`.`item_detail_id`))) join `item_type` `ip` on((`it`.`item_type_id` = `ip`.`item_type_id`))) join `purchase_detail` `pd` on((`s`.`stock_item_id` = `pd`.`purchase_detail_item_detail_id`))) join `employee` `e` on((`s`.`stock_created_by` = `e`.`employee_id`))) join `branch` `bn` on((`s`.`branch_id` = `bn`.`branch_id`))) join `stock_location` `sl` on((`s`.`stock_location_id` = `sl`.`stock_location_id`))) group by `it`.`item_detail_id`,`sl`.`stock_location_id` ;

-- Dumping structure for view rms_makro_home_stage.v_stock_location
DROP VIEW IF EXISTS `v_stock_location`;
-- Removing temporary table and create final VIEW structure
DROP TABLE IF EXISTS `v_stock_location`;
CREATE   SQL SECURITY DEFINER VIEW `v_stock_location` AS select `sl`.`stock_location_id` AS `stock_location_id`,`sl`.`stock_location_name` AS `stock_location_name`,`sl`.`stock_location_created_date` AS `stock_location_created_date`,`sl`.`stock_location_modified_date` AS `stock_location_modified_date`,`sl`.`stock_location_note` AS `stock_location_note`,`b`.`branch_id` AS `branch_id`,`b`.`branch_name` AS `branch_name`,`e`.`employee_name` AS `recorder`,`sl`.`status` AS `status` from ((`stock_location` `sl` join `employee` `e` on((`sl`.`stock_location_created_by` = `e`.`employee_id`))) join `branch` `b` on((`sl`.`stock_location_branch_id` = `b`.`branch_id`))) order by `sl`.`stock_location_id` desc ;

-- Dumping structure for view rms_makro_home_stage.v_stock_summary
DROP VIEW IF EXISTS `v_stock_summary`;
-- Removing temporary table and create final VIEW structure
DROP TABLE IF EXISTS `v_stock_summary`;
CREATE   SQL SECURITY DEFINER VIEW `v_stock_summary` AS select `st`.`stock_item_id` AS `stock_item_id`,`im`.`item_detail_part_number` AS `part_num`,`im`.`item_detail_name` AS `item`,`im`.`item_type_id` AS `item_type_id`,`it`.`item_type_name` AS `item_type`,`st`.`branch_id` AS `branch_id`,`b`.`branch_name` AS `branch_name`,sum(`st`.`stock_qty`) AS `qty`,`st`.`stock_location_id` AS `stock_location_id`,`sl`.`stock_location_name` AS `stock_location_name`,sum((`st`.`stock_costing` * `st`.`stock_qty`)) AS `total_costing` from ((((`stock` `st` left join `item_detail` `im` on((`im`.`item_detail_id` = `st`.`stock_item_id`))) left join `item_type` `it` on((`it`.`item_type_id` = `im`.`item_type_id`))) left join `stock_location` `sl` on((`sl`.`stock_location_id` = `st`.`stock_location_id`))) left join `branch` `b` on((`b`.`branch_id` = `st`.`branch_id`))) where (`im`.`item_detail_status` = 1) group by `st`.`stock_item_id`,`st`.`branch_id`,`st`.`stock_location_id` ;

-- Dumping structure for view rms_makro_home_stage.v_stock_transfered
DROP VIEW IF EXISTS `v_stock_transfered`;
-- Removing temporary table and create final VIEW structure
DROP TABLE IF EXISTS `v_stock_transfered`;
CREATE   SQL SECURITY DEFINER VIEW `v_stock_transfered` AS select `st`.`stock_transffer_id` AS `stock_transffer_id`,`slf`.`stock_location_name` AS `stock_location_from`,`st`.`stock_transffer_branch_id_to` AS `stock_transffer_branch_id_to`,`st`.`stock_transffer_branch_id_from` AS `stock_transffer_branch_id_from`,`st`.`stock_transffer_location_from` AS `stock_transffer_location_from`,`st`.`stock_transffer_location_to` AS `stock_transffer_location_to`,`slt`.`stock_location_name` AS `stock_location_to`,`bf`.`branch_name` AS `from_branch`,`bt`.`branch_name` AS `to_branch`,`e`.`employee_name` AS `transfer_by`,`im`.`item_detail_part_number` AS `item_detail_part_number`,`st`.`stock_transffer_item_detail_id` AS `stock_transffer_item_detail_id`,`im`.`item_detail_name` AS `item_detail_name`,`st`.`stock_transffer_qty` AS `stock_transffer_qty`,(`st`.`stock_transffer_qty` * `st`.`stock_transffer_measure_qty`) AS `total_qty`,`m`.`measure_name` AS `measure_name`,`st`.`stock_transffer_status` AS `stock_transffer_status`,`st`.`stock_transffer_created_date` AS `stock_transffer_created_date`,`st`.`stock_transffer_modified_date` AS `stock_transffer_modified_date`,`st`.`stock_transffer_note` AS `stock_transffer_note` from (((((((`stock_transfer` `st` join `item_detail` `im` on((`st`.`stock_transffer_item_detail_id` = `im`.`item_detail_id`))) join `branch` `bf` on((`bf`.`branch_id` = `st`.`stock_transffer_branch_id_from`))) join `branch` `bt` on((`bt`.`branch_id` = `st`.`stock_transffer_branch_id_to`))) join `employee` `e` on((`e`.`employee_id` = `st`.`stock_transffer_created_by`))) join `stock_location` `slf` on((`slf`.`stock_location_id` = `st`.`stock_transffer_location_from`))) join `stock_location` `slt` on((`slt`.`stock_location_id` = `st`.`stock_transffer_location_to`))) left join `measure` `m` on((`m`.`measure_id` = `st`.`stock_transffer_measure_id`))) order by `st`.`stock_transffer_id` desc ;

-- Dumping structure for view rms_makro_home_stage.v_stock_waste
DROP VIEW IF EXISTS `v_stock_waste`;
-- Removing temporary table and create final VIEW structure
DROP TABLE IF EXISTS `v_stock_waste`;
CREATE   SQL SECURITY DEFINER VIEW `v_stock_waste` AS select `sw`.`stock_waste_id` AS `stock_waste_id`,`sw`.`stock_waste_item_id` AS `stock_waste_item_id`,`sw`.`measure_id` AS `measure_id`,`im`.`item_detail_part_number` AS `item_detail_part_number`,`im`.`item_detail_name` AS `item_detail_name`,`b`.`branch_name` AS `branch_name`,`b`.`branch_id` AS `branch_id`,`sw`.`stock_waste_qty` AS `stock_waste_qty`,`sw`.`stock_waste_note` AS `stock_waste_note`,`m`.`measure_name` AS `measure_name`,`sw`.`stock_waste_created_date` AS `date_entry`,`sw`.`stock_waste_modified_date` AS `date_modified`,`e`.`employee_name` AS `recorder`,`sw`.`stock_location_id` AS `stock_location_id`,`sl`.`stock_location_name` AS `stock_location_name` from (((((`stock_waste` `sw` join `item_detail` `im` on((`im`.`item_detail_id` = `sw`.`stock_waste_item_id`))) join `branch` `b` on((`sw`.`stock_waste_branch_id` = `b`.`branch_id`))) left join `measure` `m` on((`sw`.`measure_id` = `m`.`measure_id`))) join `employee` `e` on((`sw`.`stock_waste_created_by` = `e`.`employee_id`))) join `stock_location` `sl` on((`sl`.`stock_location_id` = `sw`.`stock_location_id`))) ;

-- Dumping structure for view rms_makro_home_stage.v_supplier
DROP VIEW IF EXISTS `v_supplier`;
-- Removing temporary table and create final VIEW structure
DROP TABLE IF EXISTS `v_supplier`;
CREATE   SQL SECURITY DEFINER VIEW `v_supplier` AS select `s`.`supplier_id` AS `supplier_id`,`s`.`supplier_name` AS `supplier_name`,`s`.`supplier_address` AS `supplier_address`,`s`.`supplier_phone` AS `supplier_phone`,`s`.`supplier_note` AS `supplier_note`,`s`.`supplier_created_date` AS `supplier_created_date`,`e`.`employee_name` AS `recorder`,`s`.`supplier_modified_date` AS `supplier_modified_date` from (`supplier` `s` join `employee` `e` on((`s`.`supplier_created_by` = `e`.`employee_id`))) where (`s`.`supplier_status` = 1) ;

-- Dumping structure for view rms_makro_home_stage.v_user
DROP VIEW IF EXISTS `v_user`;
-- Removing temporary table and create final VIEW structure
DROP TABLE IF EXISTS `v_user`;
CREATE   SQL SECURITY DEFINER VIEW `v_user` AS select `u`.`user_id` AS `user_id`,`u`.`employee_id` AS `employee_id`,`e`.`employee_position_id` AS `employee_position_id`,`e`.`employee_name` AS `employee_name`,`e`.`employee_brand_id` AS `employee_brand_id`,`b`.`branch_name` AS `branch_name`,`u`.`user_name` AS `user_name`,`u`.`user_password` AS `user_password`,`e`.`employee_stock_location_id` AS `employee_stock_location_id`,`u`.`user_note` AS `user_note`,`pl`.`printer_location_name` AS `printer_location_name`,`u`.`user_printer_location_id` AS `user_printer_location_id`,`u`.`is_supper_user` AS `is_supper_user`,`u`.`status` AS `status` from (((`user` `u` join `employee` `e` on((`u`.`employee_id` = `e`.`employee_id`))) join `printer_location` `pl` on((`u`.`user_printer_location_id` = `pl`.`printer_location_id`))) join `branch` `b` on((`b`.`branch_id` = `e`.`employee_brand_id`))) where ((`u`.`status` = 1) and (`b`.`branch_status` = 1) and (`e`.`status` = 1)) ;

/*!40101 SET SQL_MODE=IFNULL(@OLD_SQL_MODE, '') */;
/*!40014 SET FOREIGN_KEY_CHECKS=IF(@OLD_FOREIGN_KEY_CHECKS IS NULL, 1, @OLD_FOREIGN_KEY_CHECKS) */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
