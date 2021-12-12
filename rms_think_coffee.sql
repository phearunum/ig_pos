-- --------------------------------------------------------
-- Host:                         127.0.0.1
-- Server version:               5.7.21 - MySQL Community Server (GPL)
-- Server OS:                    Win64
-- HeidiSQL Version:             8.3.0.4696
-- --------------------------------------------------------

/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET NAMES utf8 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;

-- Dumping structure for table rms_web_basic.account_type
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
) ENGINE=InnoDB AUTO_INCREMENT=21 DEFAULT CHARSET=utf8;

-- Dumping data for table rms_web_basic.account_type: ~18 rows (approximately)
DELETE FROM `account_type`;
/*!40000 ALTER TABLE `account_type` DISABLE KEYS */;
INSERT INTO `account_type` (`acc_type_id`, `acc_type`, `acc_status`, `create_by`, `create_date`, `modified_by`, `modified_date`, `description`) VALUES
	(1, 'ABA Transfer', 0, 19, '2019-09-16 00:00:00', 19, '2019-09-16 00:00:00', NULL),
	(2, 'PI PAY', 0, 19, '2019-10-02 00:00:00', 19, '2019-10-02 00:00:00', NULL),
	(3, 'អេស៊ីលីដាទាន់ចិត្ត', 0, 19, '2019-10-07 00:00:00', 19, '2019-10-07 00:00:00', NULL),
	(4, 'ABA Payment', 1, 19, '2020-03-11 00:00:00', 19, '2020-03-11 00:00:00', NULL),
	(5, 'Asia Wei Luy', 1, 19, '2020-03-11 00:00:00', 19, '2020-03-13 00:00:00', ''),
	(6, 'បុគ្គលិកឡាន', 1, 19, '2020-03-11 00:00:00', 19, '2020-03-11 00:00:00', NULL),
	(7, 'B. Mom', 1, 19, '2020-03-11 00:00:00', 19, '2020-03-12 00:00:00', ''),
	(8, 'B. Somnang', 1, 19, '2020-03-11 00:00:00', 19, '2020-03-12 00:00:00', ''),
	(9, 'B. Da', 1, 19, '2020-03-11 00:00:00', 19, '2020-03-12 00:00:00', ''),
	(10, 'B. Muoy', 1, 19, '2020-03-11 00:00:00', 19, '2020-03-13 00:00:00', ''),
	(11, 'B. Sros', 1, 19, '2020-03-11 00:00:00', 19, '2020-03-13 00:00:00', ''),
	(12, 'B. Bunsong', 1, 19, '2020-03-11 00:00:00', 19, '2020-03-13 00:00:00', ''),
	(13, 'Hea Tin', 1, 19, '2020-03-11 00:00:00', 19, '2020-03-13 00:00:00', ''),
	(14, 'Srey Nich', 1, 19, '2020-03-11 00:00:00', 19, '2020-03-13 00:00:00', ''),
	(15, 'Srey Nga', 1, 19, '2020-03-11 00:00:00', 19, '2020-03-13 00:00:00', ''),
	(16, 'Dalin', 1, 19, '2020-03-11 00:00:00', 19, '2020-03-13 00:00:00', ''),
	(17, 'Heang  ', 1, 19, '2020-03-11 00:00:00', 19, '2020-04-11 00:00:00', ''),
	(18, 'Heang', 1, 19, '2020-03-11 00:00:00', 19, '2020-03-13 00:00:00', ''),
	(19, 'Security Guard', 1, 19, '2020-03-11 00:00:00', 19, '2020-03-13 00:00:00', ''),
	(20, 'B. Pheak', 1, 19, '2020-03-16 00:00:00', 19, '2020-03-16 00:00:00', NULL);
/*!40000 ALTER TABLE `account_type` ENABLE KEYS */;


-- Dumping structure for table rms_web_basic.alert_status
DROP TABLE IF EXISTS `alert_status`;
CREATE TABLE IF NOT EXISTS `alert_status` (
  `alert_id` int(11) NOT NULL AUTO_INCREMENT,
  `alert_stock_id` int(11) DEFAULT NULL,
  `alert_expire_date` date DEFAULT NULL,
  `alert_user_id` int(11) DEFAULT NULL,
  `alert_item_id` int(11) DEFAULT NULL,
  PRIMARY KEY (`alert_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- Dumping data for table rms_web_basic.alert_status: ~0 rows (approximately)
DELETE FROM `alert_status`;
/*!40000 ALTER TABLE `alert_status` DISABLE KEYS */;
/*!40000 ALTER TABLE `alert_status` ENABLE KEYS */;


-- Dumping structure for table rms_web_basic.branch
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

-- Dumping data for table rms_web_basic.branch: ~0 rows (approximately)
DELETE FROM `branch`;
/*!40000 ALTER TABLE `branch` DISABLE KEYS */;
INSERT INTO `branch` (`branch_id`, `branch_name`, `branch_location`, `branch_phone`, `branch_created_date`, `branch_created_by`, `branch_modified_by`, `branch_modified_date`, `branch_des`, `branch_status`, `branch_email`, `branch_wifi_password`, `sale_offline_cash_id`, `sale_offline_date`, `cashier_id`) VALUES
	(41, 'Chbar Ompov', 'National Road 01, Chbar Ompov, PP', '070-992-092 / 077-992-092', '2019-01-23', 19, 19, '2020-03-05', NULL, 1, NULL, 'think9999', 0, NULL, NULL);
/*!40000 ALTER TABLE `branch` ENABLE KEYS */;


-- Dumping structure for table rms_web_basic.cash_register
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
) ENGINE=InnoDB AUTO_INCREMENT=41 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- Dumping data for table rms_web_basic.cash_register: ~40 rows (approximately)
DELETE FROM `cash_register`;
/*!40000 ALTER TABLE `cash_register` DISABLE KEYS */;
INSERT INTO `cash_register` (`cash_id`, `cash_user_id`, `cash_amount`, `cash_amount_kh`, `cash_real_us`, `cash_real_kh`, `cash_startdate`, `cash_enddate`, `cash_branch_id`, `cash_status`, `cash_note`) VALUES
	(1, 19, 0.00, 0, 10.00, 14500, '2020-03-10 09:15:17', '2020-03-10 19:39:40', 41, 'FINISH', ''),
	(2, 19, 0.00, 0, 5.00, 84000, '2020-03-11 07:39:23', '2020-03-11 19:18:46', 41, 'FINISH', ''),
	(3, 19, 0.00, 0, 21.00, 76300, '2020-03-12 07:16:19', '2020-03-12 19:49:10', 41, 'FINISH', ''),
	(4, 19, 0.00, 0, 2.00, 130600, '2020-03-13 07:47:55', '2020-03-13 19:33:52', 41, 'FINISH', ''),
	(5, 19, 0.00, 0, 1.00, 55000, '2020-03-14 07:54:45', '2020-03-14 19:28:21', 41, 'FINISH', ''),
	(6, 19, 0.00, 0, 20.00, 25000, '2020-03-15 08:33:25', '2020-03-15 19:47:00', 41, 'FINISH', ''),
	(7, 19, 100.00, 0, 4.00, 26000, '2020-03-16 07:38:44', '2020-03-16 19:49:35', 41, 'FINISH', ''),
	(8, 19, 0.00, 91000, 12.00, 57500, '2020-03-17 07:22:16', '2020-03-17 19:25:08', 41, 'FINISH', ''),
	(9, 19, 0.00, 0, 20.00, 16500, '2020-03-18 07:50:57', '2020-03-18 20:09:06', 41, 'FINISH', ''),
	(10, 19, 0.00, 91000, 20.00, 53200, '2020-03-19 07:58:07', '2020-03-19 19:36:32', 41, 'FINISH', ''),
	(11, 19, 0.00, 95000, 45.00, 4000, '2020-03-20 07:25:06', '2020-03-20 20:00:14', 41, 'FINISH', ''),
	(12, 19, 0.00, 0, 30.00, 40000, '2020-03-21 07:31:08', '2020-03-21 19:40:36', 41, 'FINISH', ''),
	(13, 19, 0.00, 9200, 10.00, 51000, '2020-03-22 07:12:29', '2020-03-22 19:53:10', 41, 'FINISH', ''),
	(14, 19, 0.00, 90000, 26.00, 51000, '2020-03-23 06:57:49', '2020-03-23 18:57:30', 41, 'FINISH', ''),
	(15, 19, 0.00, 91000, 26.00, 55000, '2020-03-23 19:11:48', '2020-03-23 19:13:13', 41, 'FINISH', ''),
	(16, 19, 0.00, 107110, 45.00, 118000, '2020-03-24 07:23:39', '2020-03-24 19:08:47', 41, 'FINISH', ''),
	(17, 19, 0.00, 171000, 43.00, 2500, '2020-03-25 07:19:42', '2020-03-25 18:57:19', 41, 'FINISH', ''),
	(18, 19, 0.00, 171000, 15.00, 40000, '2020-03-26 07:14:48', '2020-03-26 19:03:08', 41, 'FINISH', ''),
	(19, 19, 0.00, 186400, 30.00, 31500, '2020-03-27 07:27:33', '2020-03-27 19:13:27', 41, 'FINISH', ''),
	(20, 19, 0.00, 170000, 10.50, 130000, '2020-03-28 07:25:04', '2020-03-28 19:10:05', 41, 'FINISH', ''),
	(21, 19, 0.00, 169500, 50.00, 8000, '2020-03-29 07:29:31', '2020-03-29 19:15:36', 41, 'FINISH', ''),
	(22, 19, 0.00, 170000, 12.00, 41300, '2020-03-30 10:31:46', '2020-03-30 19:01:31', 41, 'FINISH', ''),
	(23, 19, 0.00, 170000, 26.00, 65000, '2020-03-31 07:24:41', '2020-03-31 18:53:10', 41, 'FINISH', ''),
	(24, 19, 0.00, 170000, 14.00, 110000, '2020-04-01 07:04:20', '2020-04-01 19:19:58', 41, 'FINISH', ''),
	(25, 19, 0.00, 170000, 20.00, 73500, '2020-04-02 07:32:41', '2020-04-02 19:06:42', 41, 'FINISH', ''),
	(26, 19, 0.00, 170000, 10.00, 3200, '2020-04-03 07:10:25', '2020-04-03 19:01:20', 41, 'FINISH', ''),
	(27, 19, 0.00, 170000, 40.00, 25500, '2020-04-04 07:18:14', '2020-04-04 19:29:15', 41, 'FINISH', ''),
	(28, 19, 0.00, 170000, 1.00, 322800, '2020-04-05 07:18:14', '2020-04-05 19:51:32', 41, 'FINISH', ''),
	(29, 19, 0.00, 170000, 10.00, 151200, '2020-04-06 07:14:17', '2020-04-06 19:36:14', 41, 'FINISH', ''),
	(30, 19, 0.00, 170000, 42.00, 56600, '2020-04-07 07:31:56', '2020-04-07 18:51:02', 41, 'FINISH', ''),
	(31, 19, 0.00, 170000, 20.00, 35500, '2020-04-08 07:21:18', '2020-04-08 19:15:05', 41, 'FINISH', ''),
	(32, 19, 0.00, 170000, 21.00, 61000, '2020-04-09 07:27:31', '2020-04-09 19:11:57', 41, 'FINISH', ''),
	(33, 19, 0.00, 170000, 39.00, 52000, '2020-04-10 07:14:52', '2020-04-10 19:23:28', 41, 'FINISH', ''),
	(34, 19, 0.00, 170000, 23.00, 60000, '2020-04-11 07:14:12', '2020-04-11 17:25:27', 41, 'FINISH', ''),
	(35, 19, 0.00, 182000, 20.00, 1600, '2020-04-17 07:20:10', '2020-04-17 19:05:20', 41, 'FINISH', ''),
	(36, 19, 0.00, 170000, 25.00, 91000, '2020-04-18 07:18:03', '2020-04-18 19:18:27', 41, 'FINISH', ''),
	(37, 19, 0.00, 170000, 3.00, 53400, '2020-04-19 07:11:16', '2020-04-19 20:40:21', 41, 'FINISH', ''),
	(38, 19, 35.00, 30000, 30.00, 86300, '2020-04-20 07:10:41', '2020-04-20 19:14:18', 41, 'FINISH', ''),
	(39, 19, 20.00, 90000, 25.00, 197000, '2020-04-21 06:46:55', '2020-04-21 18:54:13', 41, 'FINISH', ''),
	(40, 19, 0.00, 160000, NULL, NULL, '2020-04-22 07:06:32', NULL, 41, 'ACTIVE', '');
/*!40000 ALTER TABLE `cash_register` ENABLE KEYS */;


-- Dumping structure for table rms_web_basic.category
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
) ENGINE=InnoDB AUTO_INCREMENT=21 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- Dumping data for table rms_web_basic.category: ~8 rows (approximately)
DELETE FROM `category`;
/*!40000 ALTER TABLE `category` DISABLE KEYS */;
INSERT INTO `category` (`category_id`, `category_name`, `category_photo`, `category_description`, `category_created_date`, `category_created_by`, `category_modified_date`, `category_modified_by`) VALUES
	(10, 'Coffee', NULL, '                                                                ', '2020-03-05', 19, '2020-03-05', 19),
	(12, 'Foods', NULL, '                                                                ', '2020-03-05', 19, '2020-03-05', 19),
	(13, 'Bakery', NULL, '                                ', '2020-03-05', 19, NULL, NULL),
	(14, 'Soft Drinks', NULL, '                                ', '2020-03-05', 19, NULL, NULL),
	(15, 'Brewing', NULL, '                                                                                                                                                                                                ', '2020-03-05', 19, '2020-03-05', 19),
	(16, 'Tea Shake', NULL, '                                                                ', '2020-03-05', 19, '2020-03-05', 19),
	(17, 'Soda', NULL, '                                                                ', '2020-03-05', 19, '2020-03-05', 19),
	(18, 'Smoothie & Frappe', NULL, '                                                                ', '2020-03-05', 19, '2020-03-12', 19),
	(20, 'Fresh Juice', NULL, '                                ', '2020-03-11', 19, NULL, NULL);
/*!40000 ALTER TABLE `category` ENABLE KEYS */;


-- Dumping structure for table rms_web_basic.ci_sessions
DROP TABLE IF EXISTS `ci_sessions`;
CREATE TABLE IF NOT EXISTS `ci_sessions` (
  `session_id` varchar(40) COLLATE utf8_bin NOT NULL DEFAULT '0',
  `ip_address` varchar(16) COLLATE utf8_bin NOT NULL DEFAULT '0',
  `user_agent` varchar(150) COLLATE utf8_bin NOT NULL,
  `last_activity` int(10) unsigned NOT NULL DEFAULT '0',
  `user_data` text COLLATE utf8_bin NOT NULL,
  PRIMARY KEY (`session_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin;

-- Dumping data for table rms_web_basic.ci_sessions: ~0 rows (approximately)
DELETE FROM `ci_sessions`;
/*!40000 ALTER TABLE `ci_sessions` DISABLE KEYS */;
/*!40000 ALTER TABLE `ci_sessions` ENABLE KEYS */;


-- Dumping structure for table rms_web_basic.company_profile
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

-- Dumping data for table rms_web_basic.company_profile: ~0 rows (approximately)
DELETE FROM `company_profile`;
/*!40000 ALTER TABLE `company_profile` DISABLE KEYS */;
INSERT INTO `company_profile` (`company_profile_id`, `company_profile_name`, `company_profile_phone`, `company_profile_email`, `company_profile_address`, `company_profile_image`, `company_profile_created_by`, `company_profile_created_date`, `company_profile_modified_by`, `company_profile_date_modified`, `company_profile_branch_id`, `company_profile_modified_date`, `company_profile_wifi`, `company_profile_set_up_point`) VALUES
	(1, 'THINK CAFE', '0165467461', 'chatang@gmail.com', '#153, St 289, BK01, TK, PP', '158346397820200306_030618logo.png', 1, '2019-01-24 00:00:00', 19, NULL, 41, '2020-03-06', '', NULL);
/*!40000 ALTER TABLE `company_profile` ENABLE KEYS */;


-- Dumping structure for table rms_web_basic.cookie
DROP TABLE IF EXISTS `cookie`;
CREATE TABLE IF NOT EXISTS `cookie` (
  `cookie_id` int(11) NOT NULL AUTO_INCREMENT,
  `cookie_user_id` int(11) DEFAULT NULL,
  `cookie_user_data` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `cookie_status` tinyint(2) DEFAULT NULL,
  `cookie_remember` tinyint(2) DEFAULT NULL,
  PRIMARY KEY (`cookie_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- Dumping data for table rms_web_basic.cookie: ~0 rows (approximately)
DELETE FROM `cookie`;
/*!40000 ALTER TABLE `cookie` DISABLE KEYS */;
/*!40000 ALTER TABLE `cookie` ENABLE KEYS */;


-- Dumping structure for table rms_web_basic.customer
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

-- Dumping data for table rms_web_basic.customer: ~0 rows (approximately)
DELETE FROM `customer`;
/*!40000 ALTER TABLE `customer` DISABLE KEYS */;
/*!40000 ALTER TABLE `customer` ENABLE KEYS */;


-- Dumping structure for table rms_web_basic.customer_credit
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

-- Dumping data for table rms_web_basic.customer_credit: ~0 rows (approximately)
DELETE FROM `customer_credit`;
/*!40000 ALTER TABLE `customer_credit` DISABLE KEYS */;
/*!40000 ALTER TABLE `customer_credit` ENABLE KEYS */;


-- Dumping structure for table rms_web_basic.customer_type
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
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=latin1 COMMENT='status=1''ACTIVE''  ; status=0''DELETE''';

-- Dumping data for table rms_web_basic.customer_type: ~2 rows (approximately)
DELETE FROM `customer_type`;
/*!40000 ALTER TABLE `customer_type` DISABLE KEYS */;
INSERT INTO `customer_type` (`customer_type_id`, `customer_type_name`, `customer_type_des`, `customer_type_created_date`, `customer_type_created_by`, `customer_type_modified_by`, `customer_type_modified_date`, `customer_type_status`) VALUES
	(1, 'CLASSIC', 'Increase 5 more', '2019-10-02', 19, NULL, NULL, 1),
	(2, 'VIP', '', '2019-10-02', 19, NULL, NULL, 1);
/*!40000 ALTER TABLE `customer_type` ENABLE KEYS */;


-- Dumping structure for table rms_web_basic.employee
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
) ENGINE=InnoDB AUTO_INCREMENT=20 DEFAULT CHARSET=latin1;

-- Dumping data for table rms_web_basic.employee: ~1 rows (approximately)
DELETE FROM `employee`;
/*!40000 ALTER TABLE `employee` DISABLE KEYS */;
INSERT INTO `employee` (`employee_id`, `employee_brand_id`, `employee_position_id`, `employee_name`, `employee_sex`, `employee_email`, `employee_dob`, `employee_address`, `employee_phone`, `employee_shift_id`, `employee_note`, `employee_hired_date`, `employee_salary`, `employee_created_date`, `employee_created_by`, `employee_modified_by`, `employee_modified_date`, `employee_stock_location_id`, `employee_is_seller`, `employee_card`, `status`) VALUES
	(19, 41, '43', 'admin', 'Male', '', '1985-06-01', 'Phnom Penh', '095659666', 5, '', '2018-07-02', 0, '2017-06-01', 11, 19, '2019-11-15', 1, 1, '344342', 1);
/*!40000 ALTER TABLE `employee` ENABLE KEYS */;


-- Dumping structure for table rms_web_basic.expense
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
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- Dumping data for table rms_web_basic.expense: ~0 rows (approximately)
DELETE FROM `expense`;
/*!40000 ALTER TABLE `expense` DISABLE KEYS */;
/*!40000 ALTER TABLE `expense` ENABLE KEYS */;


-- Dumping structure for table rms_web_basic.expense_detail
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
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- Dumping data for table rms_web_basic.expense_detail: ~0 rows (approximately)
DELETE FROM `expense_detail`;
/*!40000 ALTER TABLE `expense_detail` DISABLE KEYS */;
/*!40000 ALTER TABLE `expense_detail` ENABLE KEYS */;


-- Dumping structure for table rms_web_basic.expense_type
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
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- Dumping data for table rms_web_basic.expense_type: ~4 rows (approximately)
DELETE FROM `expense_type`;
/*!40000 ALTER TABLE `expense_type` DISABLE KEYS */;
INSERT INTO `expense_type` (`expense_type_id`, `expense_chart_number`, `expense_type_name`, `expense_type_des`, `expense_type_created_by`, `expense_type_created_date`, `expense_type_modified_by`, `expense_type_modified_date`) VALUES
	(1, NULL, 'Salary', 'Salary', 19, '2019-10-03', NULL, NULL),
	(2, NULL, 'Utility Expense', '', 19, '2019-10-03', NULL, NULL),
	(3, NULL, 'Expense Food', '', 19, '2019-10-03', NULL, NULL),
	(4, NULL, 'Equipment', '', 19, '2019-10-11', NULL, NULL);
/*!40000 ALTER TABLE `expense_type` ENABLE KEYS */;


-- Dumping structure for table rms_web_basic.floor
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
  `is_delivery` tinyint(4) NOT NULL DEFAULT '0',
  `dis` decimal(10,2) NOT NULL DEFAULT '0.00',
  `status` tinyint(1) DEFAULT '1',
  PRIMARY KEY (`floor_id`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- Dumping data for table rms_web_basic.floor: ~3 rows (approximately)
DELETE FROM `floor`;
/*!40000 ALTER TABLE `floor` DISABLE KEYS */;
INSERT INTO `floor` (`floor_id`, `floor_name`, `floor_location_x`, `floor_location_y`, `floor_tab_index`, `floor_branch_id`, `layout_is_car_wash`, `floor_created_date`, `floor_created_by`, `is_delivery`, `dis`, `status`) VALUES
	(1, 'Ground Floor', 0, 0, 0, 41, 0, '2020-02-19', 19, 0, 0.00, 1),
	(2, 'FLOOR 1', 0, 0, 0, 41, 0, '2020-03-05', 19, 0, 0.00, 1);
/*!40000 ALTER TABLE `floor` ENABLE KEYS */;


-- Dumping structure for table rms_web_basic.floor_table_layout
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
) ENGINE=InnoDB AUTO_INCREMENT=60 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- Dumping data for table rms_web_basic.floor_table_layout: ~38 rows (approximately)
DELETE FROM `floor_table_layout`;
/*!40000 ALTER TABLE `floor_table_layout` DISABLE KEYS */;
INSERT INTO `floor_table_layout` (`layout_id`, `floor_id`, `layout_name`, `layout_location_x`, `layout_location_y`, `layout_tab_index`, `layout_type`, `layout_branch_id`, `layout_created_date`, `layout_created_by`, `layout_manage_by`, `status`) VALUES
	(1, 1, ' 1', 21, 28, 0, 'TABLE', 41, '2020-03-04', 19, 0, 1),
	(2, 1, ' 2', 155, 26, 0, 'TABLE', 41, '2020-03-04', 19, 0, 1),
	(3, 1, ' 3', 292, 26, 0, 'TABLE', 41, '2020-03-04', 19, 0, 1),
	(4, 1, ' 4', 434, 24, 0, 'TABLE', 41, '2020-03-04', 19, 0, 1),
	(5, 1, ' 5', 292, 26, 0, 'TABLE', 41, '2020-03-04', 19, 0, 1),
	(6, 1, 'Take Away 1', 0, 0, 0, 'TABLE', 41, '2020-03-04', 19, 0, 0),
	(7, 1, 'Take away 2', 0, 0, 0, 'TABLE', 41, '2020-03-04', 19, 0, 0),
	(8, 1, 'Take away 3', 0, 0, 0, 'TABLE', 41, '2020-03-04', 19, 0, 0),
	(9, 1, 'Take away 4', 500, 171, 0, 'TABLE', 41, '2020-03-04', 19, 0, 0),
	(31, 2, ' 1', 60, 38, 0, 'TABLE', 41, '2020-03-09', 19, 0, 1),
	(32, 2, ' 2', 205, 35, 0, 'TABLE', 41, '2020-03-09', 19, 0, 1),
	(33, 2, ' 3', 348, 38, 0, 'TABLE', 41, '2020-03-09', 19, 0, 1),
	(34, 2, ' 4', 506, 34, 0, 'TABLE', 41, '2020-03-09', 19, 0, 1),
	(35, 2, ' 5', 651, 32, 0, 'TABLE', 41, '2020-03-09', 19, 0, 1),
	(36, 2, ' 6', 67, 171, 0, 'TABLE', 41, '2020-03-09', 19, 0, 1),
	(37, 2, ' 7', 210, 169, 0, 'TABLE', 41, '2020-03-09', 19, 0, 1),
	(38, 2, ' 8', 357, 168, 0, 'TABLE', 41, '2020-03-09', 19, 0, 1),
	(39, 2, ' 9', 503, 165, 0, 'TABLE', 41, '2020-03-09', 19, 0, 1),
	(40, 2, ' 10', 656, 169, 0, 'TABLE', 41, '2020-03-09', 19, 0, 1),
	(41, 1, 'Take away 5', 0, 0, 0, 'TABLE', 41, '2020-03-11', 19, 0, 0),
	(42, 1, 'TA1', 0, 0, 0, 'TABLE', 41, '2020-03-11', 19, 0, 0),
	(43, 1, 'TA2', 0, 0, 0, 'TABLE', 41, '2020-03-11', 19, 0, 0),
	(44, 1, 'TA3', 0, 0, 0, 'TABLE', 41, '2020-03-11', 19, 0, 0),
	(45, 1, 'TA4', 0, 0, 0, 'TABLE', 41, '2020-03-11', 19, 0, 0),
	(46, 1, 'TA5', 0, 0, 0, 'TABLE', 41, '2020-03-11', 19, 0, 0),
	(47, 1, 'T 01', 0, 0, 0, 'TABLE', 41, '2020-03-11', 19, 0, 0),
	(48, 1, 'TA 2', 212, 137, 0, 'TABLE', 41, '2020-03-11', 19, 0, 0),
	(49, 1, 'TA 3', 354, 137, 0, 'TABLE', 41, '2020-03-11', 19, 0, 0),
	(50, 1, 'TA 4', 0, 0, 0, 'TABLE', 41, '2020-03-11', 19, 0, 0),
	(51, 1, 'TA 5', 0, 0, 0, 'TABLE', 41, '2020-03-11', 19, 0, 0),
	(52, 1, 'Staff', 368, 278, 0, 'TABLE', 41, '2020-03-12', 19, 0, 1),
	(53, 1, 'T 5', 640, 153, 0, 'TABLE', 41, '2020-03-12', 19, 0, 1),
	(54, 1, 'T 4', 502, 156, 0, 'TABLE', 41, '2020-03-12', 19, 0, 1),
	(55, 1, '6', 706, 24, 0, 'TABLE', 41, '2020-04-21', 19, 0, 1),
	(56, 1, 'T 1', 91, 156, 0, 'TABLE', 41, '2020-04-21', 19, 0, 1),
	(57, 1, 'T 2', 228, 155, 0, 'TABLE', 41, '2020-04-21', 19, 0, 1),
	(58, 1, 'T 3', 365, 155, 0, 'TABLE', 41, '2020-04-21', 19, 0, 1),
	(59, 1, '5', 569, 24, 0, 'TABLE', 41, '2020-04-21', 19, 0, 1);
/*!40000 ALTER TABLE `floor_table_layout` ENABLE KEYS */;


-- Dumping structure for table rms_web_basic.floor_template
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

-- Dumping data for table rms_web_basic.floor_template: ~0 rows (approximately)
DELETE FROM `floor_template`;
/*!40000 ALTER TABLE `floor_template` DISABLE KEYS */;
INSERT INTO `floor_template` (`floor_template_id`, `floor_template_width`, `floor_template_height`, `floor_template_bg_color`, `floor_template_fore_color`, `floor_template_outline_color`, `floor_template_font_size`, `floor_template_outline_width`, `floor_template_branch_id`, `floor_template_created_by`, `floor_template_created_date`) VALUES
	(1, 100, 80, '#800000', '#ffffff', '#ffff00', 24, 2, 1, 19, '2018-11-05');
/*!40000 ALTER TABLE `floor_template` ENABLE KEYS */;


-- Dumping structure for table rms_web_basic.gift
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

-- Dumping data for table rms_web_basic.gift: ~0 rows (approximately)
DELETE FROM `gift`;
/*!40000 ALTER TABLE `gift` DISABLE KEYS */;
INSERT INTO `gift` (`gift_id`, `gift_name`, `gift_point`, `gift_image`, `last_modifier`, `last_modified_date`) VALUES
	(1, 'SD', 0, 'NULL', 19, '2018-10-11');
/*!40000 ALTER TABLE `gift` ENABLE KEYS */;


-- Dumping structure for table rms_web_basic.happy_hour
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
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- Dumping data for table rms_web_basic.happy_hour: ~3 rows (approximately)
DELETE FROM `happy_hour`;
/*!40000 ALTER TABLE `happy_hour` DISABLE KEYS */;
INSERT INTO `happy_hour` (`id`, `happy_hour_name`, `happy_hour_from_date`, `happy_hour_start_time`, `happy_hour_to_date`, `happy_hour_end_time`, `happy_hour_discount`, `happy_hour_description`, `happy_hour_item_type_id`, `happy_hour_status`, `happy_hour_brand_id`) VALUES
	(1, 'Enterprise Promotion1', '2019-01-08', '08:00:00', '2019-01-31', '19:00:00', 10, '', NULL, NULL, 41),
	(2, 'Promotion 15%', '2020-04-10', '06:00:00', '2020-05-10', '21:00:00', 15, '', NULL, NULL, 41),
	(3, 'Khmer Foods', '2019-06-01', '00:00:00', '2019-06-30', '20:00:00', 5, '', NULL, NULL, 42);
/*!40000 ALTER TABLE `happy_hour` ENABLE KEYS */;


-- Dumping structure for table rms_web_basic.ingredient
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
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- Dumping data for table rms_web_basic.ingredient: ~0 rows (approximately)
DELETE FROM `ingredient`;
/*!40000 ALTER TABLE `ingredient` DISABLE KEYS */;
/*!40000 ALTER TABLE `ingredient` ENABLE KEYS */;


-- Dumping structure for table rms_web_basic.item_detail
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
  `item_detail_hide_show` tinyint(4) DEFAULT '1',
  `item_detail_remain_alert` int(11) DEFAULT NULL,
  `item_detail_printer_location_id` int(11) DEFAULT '0',
  `item_detail_like_count` int(11) DEFAULT '0',
  `measure_id` int(11) DEFAULT '0',
  `color` varchar(255) CHARACTER SET utf8 COLLATE utf8_unicode_ci DEFAULT NULL,
  `item_detail_status` tinyint(1) DEFAULT '1',
  PRIMARY KEY (`item_detail_id`)
) ENGINE=InnoDB AUTO_INCREMENT=233 DEFAULT CHARSET=latin1 COMMENT='1="Active"  or  -1="Delete"';

-- Dumping data for table rms_web_basic.item_detail: ~111 rows (approximately)
DELETE FROM `item_detail`;
/*!40000 ALTER TABLE `item_detail` DISABLE KEYS */;
INSERT INTO `item_detail` (`item_detail_id`, `item_type_id`, `item_detail_name`, `item_detail_part_number`, `item_detail_des`, `item_detail_created_date`, `item_detail_created_by`, `item_detail_modified_by`, `item_detail_modified_date`, `item_detail_whole_price`, `item_detail_retail_price`, `item_detail_photo`, `item_detail_cut_stock`, `item_detail_hide_show`, `item_detail_remain_alert`, `item_detail_printer_location_id`, `item_detail_like_count`, `measure_id`, `color`, `item_detail_status`) VALUES
	(86, 14, 'Americano (H)', 'C01H', '', '2020-03-05', 19, 19, '2020-03-11', 0.00, 1.90, '158380881920200310_025339americano_h.jpg', 0, 1, NULL, 1, 0, NULL, '#000000', 1),
	(87, 14, 'Cappuccino (H)', 'C02H', '', '2020-03-05', 19, 19, '2020-03-11', 0.00, 2.30, '158380670920200310_021829cappuccino_h.jpg', 0, 1, NULL, 1, 0, NULL, '#000000', 1),
	(88, 14, 'Espresso', 'C03H', '', '2020-03-05', 19, 19, '2020-03-16', 0.00, 1.50, '158380713820200310_022538espresso.jpg', 0, 1, NULL, 1, 0, NULL, '#000000', 1),
	(89, 14, 'Latte (H)', 'C04H', '', '2020-03-05', 19, 19, '2020-03-11', 0.00, 2.30, '158380827220200310_024432latte_h.jpg', 0, 1, NULL, 1, 0, NULL, '#000000', 1),
	(90, 14, 'Mocha (H)', 'C05H', '', '2020-03-05', 19, 19, '2020-03-11', 0.00, 2.30, '158380852620200310_024846mocha_h.jpg', 0, 1, NULL, 1, 0, NULL, '#000000', 1),
	(91, 14, 'Think Café (H)', 'C06H', '', '2020-03-05', 19, 19, '2020-03-11', 0.00, 2.30, '158380864020200310_025040think_cafe_h.jpg', 0, 1, NULL, 1, 0, NULL, '#000000', 1),
	(92, 26, 'Chocolate Latte (H)', 'B01H', '', '2020-03-05', 19, 19, '2020-03-11', 0.00, 2.30, '', 0, 1, NULL, 1, 0, NULL, '#000000', 1),
	(101, 29, 'Chocolate Latte (R)', 'B01R', '', '2020-03-06', 19, 19, '2020-03-10', 0.00, 2.50, '', 0, 1, NULL, 1, 0, NULL, '#000000', 1),
	(102, 30, 'Chocolate Latte (L)', 'B01L', '', '2020-03-06', 19, 19, '2020-03-11', 0.00, 2.90, '', 0, 1, NULL, 1, 0, NULL, '#000000', 1),
	(103, 29, 'Chocolate Milk (R)', 'B02R', '', '2020-03-06', 19, 19, '2020-03-10', 0.00, 2.50, '', 0, 1, NULL, 1, 0, NULL, '#000000', 1),
	(104, 30, 'Chocolate Milk (L)', 'B02L', '', '2020-03-06', 19, 19, '2020-03-11', 0.00, 2.90, '', 0, 1, NULL, 1, 0, NULL, '#000000', 1),
	(107, 31, 'Mango Tea Shake (R)', 'T01R', '', '2020-03-06', 19, 19, '2020-03-11', 0.00, 2.50, '', 0, 1, NULL, 1, 0, NULL, '#000000', 1),
	(109, 31, 'Passion Tea Shake (R)', 'T02R', '', '2020-03-06', 19, 19, '2020-03-11', 0.00, 2.50, '', 0, 1, NULL, 1, 0, NULL, '#000000', 1),
	(111, 31, 'Peach Tea Shake (R)', 'T03R', '', '2020-03-06', 19, 19, '2020-03-11', 0.00, 2.50, '', 0, 1, NULL, 1, 0, NULL, '#000000', 1),
	(113, 31, 'Strawberry Tea Shake (R)', 'T04R', '', '2020-03-06', 19, 19, '2020-03-11', 0.00, 2.50, '', 0, 1, NULL, 1, 0, NULL, '#000000', 1),
	(119, 31, 'Wild Berry Tea Shake (R)', 'T05R', '', '2020-03-06', 19, 19, '2020-03-11', 0.00, 2.50, '', 0, 1, NULL, 1, 0, NULL, '#000000', 1),
	(120, 33, 'Mango Tea Shake (L)', 'T01L', '', '2020-03-06', 19, 19, '2020-03-11', 0.00, 2.90, '', 0, 1, NULL, 1, 0, NULL, '#000000', 1),
	(121, 33, 'Passion Tea Shake (L)', 'T02L', '', '2020-03-06', 19, 19, '2020-03-11', 0.00, 2.90, '', 0, 1, NULL, 1, 0, NULL, '#000000', 1),
	(122, 33, 'Peach Tea Shake (L)', 'T03L', '', '2020-03-06', 19, 19, '2020-03-11', 0.00, 2.90, '', 0, 1, NULL, 1, 0, NULL, '#000000', 1),
	(123, 33, 'Strawberry Tea Shake (L)', 'T04L', '', '2020-03-06', 19, 19, '2020-03-11', 0.00, 2.90, '', 0, 1, NULL, 1, 0, NULL, '#000000', 1),
	(124, 33, 'Wild Berry Tea Shake (L)', 'T05L', '', '2020-03-06', 19, 19, '2020-03-11', 0.00, 2.90, '', 0, 1, NULL, 1, 0, NULL, '#000000', 1),
	(125, 36, 'Mango Smoothie (R)', 'S01R', '', '2020-03-06', 19, 19, '2020-03-11', 0.00, 2.80, '', 0, 1, NULL, 1, 0, NULL, '#000000', 1),
	(126, 36, 'Passion Smoothie (R)', 'S02R', '', '2020-03-06', 19, 19, '2020-03-11', 0.00, 2.80, '', 0, 1, NULL, 1, 0, NULL, '#000000', 1),
	(127, 36, 'Peach Smoothie (R)', 'S03R', '', '2020-03-06', 19, 19, '2020-03-11', 0.00, 2.80, '', 0, 1, NULL, 1, 0, NULL, '#000000', 1),
	(128, 36, 'Strawberry Smoothie (R)', 'S04R', '', '2020-03-06', 19, 19, '2020-03-11', 0.00, 2.80, '', 0, 1, NULL, 1, 0, NULL, '#000000', 1),
	(129, 36, 'Wild Berry Smoothie (R)', 'S05R', '', '2020-03-06', 19, 19, '2020-03-11', 0.00, 2.80, '', 0, 1, NULL, 1, 0, NULL, '#000000', 1),
	(135, 34, 'Mango Mojito Soda (R)', 'SO01R', '', '2020-03-08', 19, 19, '2020-03-11', 0.00, 2.50, '', 0, 1, NULL, 1, 0, NULL, '#000000', 1),
	(136, 34, 'Passion Mojito Soda (R)', 'SO02R', '', '2020-03-08', 19, 19, '2020-03-11', 0.00, 2.50, '', 0, 1, NULL, 1, 0, NULL, '#000000', 1),
	(137, 34, 'Peach Mojito Soda (R)', 'SO03R', '', '2020-03-08', 19, 19, '2020-03-11', 0.00, 2.50, '', 0, 1, NULL, 1, 0, NULL, '#000000', 1),
	(138, 34, 'Strawberry Mojito Soda (R)', 'SO04R', '', '2020-03-08', 19, 19, '2020-03-11', 0.00, 2.50, '', 0, 1, NULL, 1, 0, NULL, '#000000', 1),
	(139, 34, 'Wild Berry Mojito Soda (R)', 'SO05R', '', '2020-03-08', 19, 19, '2020-03-11', 0.00, 2.50, '', 0, 1, NULL, 1, 0, NULL, '#000000', 1),
	(140, 35, 'Mango Mojito Soda (L)', 'SO01L', '', '2020-03-08', 19, 19, '2020-03-11', 0.00, 2.90, '', 0, 1, NULL, 1, 0, NULL, '#000000', 1),
	(141, 35, 'Passion Mojito Soda (L)', 'SO02L', '', '2020-03-08', 19, 19, '2020-03-11', 0.00, 2.90, '', 0, 1, NULL, 1, 0, NULL, '#000000', 1),
	(142, 35, 'Peach Mojito Soda (L)', 'SO03L', '', '2020-03-08', 19, 19, '2020-03-11', 0.00, 2.90, '', 0, 1, NULL, 1, 0, NULL, '#000000', 1),
	(143, 35, 'Strawberry Mojito Soda (L)', 'SO04L', '', '2020-03-08', 19, 19, '2020-03-11', 0.00, 2.90, '', 0, 1, NULL, 1, 0, NULL, '#000000', 1),
	(144, 35, 'Wild Berry Mojito Soda (L)', 'SO05L', '', '2020-03-08', 19, 19, '2020-03-11', 0.00, 2.90, '', 0, 1, NULL, 1, 0, NULL, '#000000', 1),
	(145, 15, 'Americano (R)', 'C01R', '', '2020-03-08', 19, 19, '2020-03-21', 0.00, 2.20, '', 0, 1, NULL, 1, 0, NULL, '#000000', 1),
	(146, 15, 'Cappuccino (R)', 'C02R', '', '2020-03-08', 19, 19, '2020-03-10', 0.00, 2.50, '', 0, 1, NULL, 1, 0, NULL, '#000000', 1),
	(147, 15, 'Latte (R)', 'C03R', '', '2020-03-08', 19, 19, '2020-03-10', 0.00, 2.50, '', 0, 1, NULL, 1, 0, NULL, '#000000', 1),
	(148, 15, 'Mocha (R)', 'C04R', '', '2020-03-10', 19, NULL, NULL, 0.00, 2.50, '', 0, 1, NULL, 1, 0, NULL, '#000000', 1),
	(149, 15, 'Think Café (R)', 'C05R', '', '2020-03-10', 19, NULL, NULL, 0.00, 2.50, '', 0, 1, NULL, 1, 0, NULL, '#000000', 1),
	(150, 25, 'Americano (L)', 'C01L', '', '2020-03-10', 19, 19, '2020-03-11', 0.00, 2.50, '', 0, 1, NULL, 1, 0, NULL, '#000000', 1),
	(151, 25, 'Cappuccino (L)', 'C02L', '', '2020-03-10', 19, 19, '2020-03-10', 0.00, 2.90, '', 0, 1, NULL, 1, 0, NULL, '#000000', 1),
	(152, 25, 'Latte (L)', 'C03L', '', '2020-03-10', 19, 19, '2020-03-11', 0.00, 2.90, '', 0, 1, NULL, 1, 0, NULL, '#000000', 1),
	(153, 25, 'Mocha (L)', 'C04L', '', '2020-03-10', 19, 19, '2020-03-11', 0.00, 2.90, '', 0, 1, NULL, 1, 0, NULL, '#000000', 1),
	(154, 25, 'Think Café (L)', 'C05L', '', '2020-03-10', 19, 19, '2020-03-11', 0.00, 2.90, '', 0, 1, NULL, 1, 0, NULL, '#000000', 1),
	(155, 24, 'Cappuccino (F)', 'C02F', '', '2020-03-10', 19, 19, '2020-03-13', 0.00, 2.80, '', 0, 0, NULL, 1, 0, NULL, '#000000', 1),
	(156, 24, 'Latte (F)', 'C04F', '', '2020-03-10', 19, 19, '2020-03-19', 0.00, 2.80, '', 0, 0, NULL, 1, 0, NULL, '#000000', 1),
	(157, 24, 'Mocha (F)', 'C05F', '', '2020-03-10', 19, 19, '2020-03-11', 0.00, 2.80, '', 0, 1, NULL, 1, 0, NULL, '#000000', 1),
	(158, 24, 'Think Café (F)', 'C06F', '', '2020-03-10', 19, 19, '2020-03-11', 0.00, 2.80, '', 0, 1, NULL, 1, 0, NULL, '#000000', 1),
	(159, 38, 'Chocolate Latte (F)', 'F01', '', '2020-03-10', 19, 19, '2020-03-11', 0.00, 2.80, '', 0, 1, NULL, 1, 0, NULL, '#000000', 1),
	(160, 38, 'Chocolate Milk (F)', 'F02', '', '2020-03-10', 19, 19, '2020-03-11', 0.00, 2.80, '', 0, 1, NULL, 1, 0, NULL, '#000000', 1),
	(161, 26, 'Chocolate Milk (H)', 'B02H', '', '2020-03-10', 19, 19, '2020-03-21', 0.00, 2.30, '', 0, 1, NULL, 1, 0, NULL, '#000000', 1),
	(162, 26, 'Fresh MIlk (H)', 'B03H', '', '2020-03-10', 19, 19, '2020-03-21', 0.00, 1.60, '', 0, 1, NULL, 1, 0, NULL, '#000000', 1),
	(163, 26, 'Green Milk Tea (H)', 'B04H', '', '2020-03-10', 19, 19, '2020-03-21', 0.00, 2.30, '', 0, 1, NULL, 1, 0, NULL, '#000000', 1),
	(164, 26, 'Lemon Tea (H)', 'B05H', '', '2020-03-10', 19, NULL, NULL, 0.00, 2.00, '', 0, 1, NULL, 1, 0, NULL, '#000000', 1),
	(165, 26, 'Matcha Tea Latte (H)', 'B06H', '', '2020-03-10', 19, 19, '2020-03-21', 0.00, 2.30, '', 0, 1, NULL, 1, 0, NULL, '#000000', 1),
	(166, 26, 'Thai Milk Tea (H)', 'B08H', '', '2020-03-10', 19, 19, '2020-03-21', 0.00, 2.30, '', 0, 1, NULL, 1, 0, NULL, '#000000', 1),
	(167, 29, 'Fresh MIlk (R)', 'B03R', '', '2020-03-10', 19, 19, '2020-03-21', 0.00, 1.80, '', 0, 1, NULL, 1, 0, NULL, '#000000', 1),
	(168, 29, 'Green Milk Tea (R)', 'B04R', '', '2020-03-10', 19, NULL, NULL, 0.00, 2.50, '', 0, 1, NULL, 1, 0, NULL, '#000000', 1),
	(169, 29, 'Lemon Tea (R)', 'B05R', '', '2020-03-10', 19, NULL, NULL, 0.00, 2.50, '', 0, 1, NULL, 1, 0, NULL, '#000000', 1),
	(170, 29, 'Matcha Tea Latte (R)', 'B06R', '', '2020-03-10', 19, NULL, NULL, 0.00, 2.50, '', 0, 1, NULL, 1, 0, NULL, '#000000', 1),
	(171, 29, 'Peach Tea (R)', 'B07R', '', '2020-03-10', 19, NULL, NULL, 0.00, 2.50, '', 0, 1, NULL, 1, 0, NULL, '#000000', 1),
	(172, 29, 'Thai Milk Tea (R)', 'B08R', '', '2020-03-10', 19, NULL, NULL, 0.00, 2.50, '', 0, 1, NULL, 1, 0, NULL, '#000000', 1),
	(173, 30, 'Fresh Milk (L)', 'B03L', '', '2020-03-10', 19, 19, '2020-03-21', 0.00, 2.00, '', 0, 1, NULL, 1, 0, NULL, '#000000', 1),
	(174, 30, 'Green MIlk Tea (L)', 'B04L', '', '2020-03-10', 19, 19, '2020-03-21', 0.00, 2.90, '', 0, 1, NULL, 1, 0, NULL, '#000000', 1),
	(175, 30, 'Lemon Tea (L)', 'B05L', '', '2020-03-10', 19, 19, '2020-03-21', 0.00, 2.90, '', 0, 1, NULL, 1, 0, NULL, '#000000', 1),
	(176, 41, 'Water Kulen', 'D07', '', '2020-03-10', 19, 19, '2020-03-30', 0.00, 0.75, '158556104420200330_093724kulen.png', 0, 1, NULL, 1, 0, NULL, '#000000', 1),
	(177, 30, 'Matcha Tea Latte (L)', 'B06L', '', '2020-03-10', 19, 19, '2020-03-21', 0.00, 2.90, '', 0, 1, NULL, 1, 0, NULL, '#000000', 1),
	(178, 30, 'Peach Tea (L)', 'B07L', '', '2020-03-10', 19, 19, '2020-03-21', 0.00, 2.90, '', 0, 1, NULL, 1, 0, NULL, '#000000', 1),
	(179, 30, 'Thai Milk Tea (L)', 'B08L', '', '2020-03-10', 19, 19, '2020-03-21', 0.00, 2.90, '', 0, 1, NULL, 1, 0, NULL, '#000000', 1),
	(180, 38, 'Green Milk Tea (F)', 'F03', '', '2020-03-10', 19, 19, '2020-03-11', 0.00, 2.80, '', 0, 1, NULL, 1, 0, NULL, '#000000', 1),
	(181, 38, 'Matcha Tea (F)', 'F04', '', '2020-03-10', 19, 19, '2020-03-11', 0.00, 2.80, '', 0, 1, NULL, 1, 0, NULL, '#000000', 1),
	(182, 38, 'Thai MIlk Tea (F)', 'F05', '', '2020-03-10', 19, 19, '2020-03-11', 0.00, 2.80, '', 0, 1, NULL, 1, 0, NULL, '#000000', 1),
	(183, 41, 'Bacchus', 'D01', '', '2020-03-10', 19, 19, '2020-03-30', 0.00, 1.00, '158556112520200330_093845bacchus.png', 0, 1, NULL, 1, 0, NULL, '#000000', 1),
	(184, 41, 'Carabao', 'D02', '', '2020-03-10', 19, 19, '2020-03-30', 0.00, 1.00, '158556114020200330_093900carabao.jpg', 0, 1, NULL, 1, 0, NULL, '#000000', 1),
	(185, 41, 'Coca Cola', 'D03', '', '2020-03-10', 19, 19, '2020-03-30', 0.00, 1.00, '158556318020200330_101300Coca-Cola-555x555.jpg', 0, 1, NULL, 1, 0, NULL, '#000000', 1),
	(186, 41, 'Pocari Sweat', 'D04', '', '2020-03-10', 19, 19, '2020-03-30', 0.00, 1.50, '158556117320200330_093933pocari_sweat.jpg', 0, 1, NULL, 1, 0, NULL, '#000000', 1),
	(187, 41, 'RedBull', 'D05', '', '2020-03-10', 19, 19, '2020-03-30', 0.00, 1.00, '158556126120200330_094101redbull.jpg', 0, 1, NULL, 1, 0, NULL, '#000000', 1),
	(188, 41, 'Sting', 'D06', '', '2020-03-10', 19, 19, '2020-03-30', 0.00, 1.00, '158556319420200330_101314sting.jpg', 0, 1, NULL, 1, 0, NULL, '#000000', 1),
	(189, 41, 'Oishi', 'D08', '', '2020-03-10', 19, 19, '2020-03-30', 0.00, 1.00, '158556347420200330_101754oishi.jpg', 0, 1, NULL, 1, 0, NULL, '#000000', 1),
	(190, 41, 'Vigor', 'D09', '', '2020-03-10', 19, 19, '2020-03-30', 0.00, 1.00, '158556321120200330_101331vigor.jpg', 0, 1, NULL, 1, 0, NULL, '#000000', 1),
	(191, 41, 'Pepsi', 'D10', '', '2020-03-10', 19, 19, '2020-03-30', 0.00, 1.00, '158556348920200330_101809Pepsi-320ml.jpg', 0, 1, NULL, 1, 0, NULL, '#000000', 1),
	(192, 36, 'Avocado Smoothie', 'S06R', '', '2020-03-11', 19, NULL, NULL, 0.00, 3.00, '', 0, 1, NULL, 1, 0, NULL, '#000000', 1),
	(193, 42, 'Apple Juice (R)', 'J01R', '', '2020-03-11', 19, 19, '2020-03-11', 0.00, 3.00, '', 0, 1, NULL, 1, 0, NULL, '#000000', 1),
	(194, 42, 'Carrot Juice (R)', 'J02R', '', '2020-03-11', 19, NULL, NULL, 0.00, 3.00, '', 0, 1, NULL, 1, 0, NULL, '#000000', 1),
	(195, 42, 'Orange Juice (R)', 'J03R', '', '2020-03-11', 19, 19, '2020-03-11', 0.00, 3.00, '', 0, 1, NULL, 1, 0, NULL, '#000000', 1),
	(202, 41, '7 Up', 'D11', '', '2020-03-11', 19, 19, '2020-03-30', 0.00, 1.00, '158556350720200330_1018277up.jpg', 0, 1, NULL, 1, 0, NULL, '#000000', 1),
	(203, 29, 'Passion Milk (R)', 'B09R', '', '2020-03-11', 19, NULL, NULL, 0.00, 2.50, '', 0, 1, NULL, 1, 0, NULL, '#000000', 1),
	(204, 30, 'Passion Milk (L)', 'B09L', '', '2020-03-11', 19, NULL, NULL, 0.00, 2.90, '', 0, 1, NULL, 1, 0, NULL, '#000000', 1),
	(205, 28, 'បាយឆាគ្រឿងសមុទ្ទ', 'F3101', '', '2020-03-14', 19, 19, '2020-03-14', 0.00, 3.75, '158416999420200314_0713141.png', 0, 1, NULL, 3, 0, NULL, '#000000', 1),
	(206, 28, 'ផាត់ថៃ', 'F3102', '', '2020-03-14', 19, 19, '2020-03-14', 0.00, 3.75, '158416991120200314_0711512.png', 0, 1, NULL, 3, 0, NULL, '#000000', 1),
	(207, 28, 'មីឆាសាច់គោ', 'F3103', '', '2020-03-14', 19, NULL, NULL, 0.00, 3.50, '158416995520200314_0712353.png', 0, 1, NULL, 3, 0, NULL, '#000000', 1),
	(208, 38, 'Passion Milk (F)', 'F06', '', '2020-03-14', 19, NULL, NULL, 0.00, 2.80, '', 0, 1, NULL, 1, 0, NULL, '#000000', 1),
	(209, 27, 'គុយទាវសាច់ជ្រូក', 'K01', '', '2020-03-16', 19, 19, '2020-03-30', 0.00, 3.50, '158556493020200330_104210kuyteav_kua.png', 0, 1, NULL, 6, 0, NULL, '#000000', 1),
	(211, 27, 'គុយទាវគ្រឿងសមុទ្ទ', 'K03', '', '2020-03-16', 19, 19, '2020-03-30', 0.00, 3.50, '158556503720200330_104357kuyteav_sea.png', 0, 1, NULL, 6, 0, NULL, '#000000', 1),
	(212, 27, 'គុយទាវពិសេស', 'K04', '', '2020-03-16', 19, 19, '2020-03-30', 0.00, 4.00, '158556505520200330_104415kuyteav_sea.png', 0, 1, NULL, 6, 0, NULL, '#000000', 1),
	(213, 14, 'Double Espresso', 'C03H2', '', '2020-03-16', 19, NULL, NULL, 0.00, 1.80, '158435758720200316_111947espresso.jpg', 0, 1, NULL, 1, 0, NULL, '#000000', 1),
	(214, 28, 'បាយសាច់មាន់', 'FO01', '', '2020-03-17', 19, 19, '2020-03-30', 0.00, 3.50, '158556394120200330_102541chicken.png', 0, 1, NULL, 3, 0, NULL, '#000000', 1),
	(215, 28, 'បាយសាច់ជ្រូក', 'FO02', '', '2020-03-17', 19, 19, '2020-03-30', 0.00, 3.00, '158556463120200330_103711pork.png', 0, 1, NULL, 3, 0, NULL, '#000000', 1),
	(216, 28, 'បាយឡុកឡាក់សាច់គោ', 'FO03', '', '2020-03-17', 19, 19, '2020-03-30', 0.00, 3.50, '158556445920200330_103419LukLak.png', 0, 1, NULL, 3, 0, NULL, '#000000', 1),
	(217, 28, 'មីម៉ាម៉ាកំប៉ុង', 'mama', '', '2020-03-18', 19, 19, '2020-03-30', 0.00, 1.00, '158556450120200330_103501mama.jpg', 0, 1, NULL, 1, 0, NULL, '#000000', 1),
	(218, 44, 'Sandwich Small', 'SW01', '', '2020-03-20', 19, NULL, NULL, 0.00, 1.00, '', 0, 1, NULL, 1, 0, NULL, '#000000', 1),
	(219, 44, 'Sandwich Big', 'SW02', '', '2020-03-20', 19, NULL, NULL, 0.00, 1.80, '', 0, 1, NULL, 1, 0, NULL, '#000000', 1),
	(220, 41, 'ទឹកល្ពៅ / ទឹកសណ្ដែក', 'D012', '', '2020-03-20', 19, 19, '2020-04-21', 0.00, 1.00, '158563748120200331_065121lpov.jpg', 0, 1, NULL, 1, 0, NULL, '#000000', 1),
	(221, 45, 'Almond Croissant ', 'BAK01', '', '2020-03-24', 19, 19, '2020-03-31', 0.00, 1.80, '158563768920200331_065449Almond-croissant-frozen.jpg', 0, 1, NULL, 1, 0, NULL, '#000000', 1),
	(222, 45, 'Almond Croissant Mini', 'BAK02', '', '2020-03-24', 19, 19, '2020-03-31', 0.00, 0.85, '158563770920200331_0655091371597381858.jpeg', 0, 1, NULL, 1, 0, NULL, '#000000', 1),
	(223, 45, 'Danish Pastry', 'BAK03', '', '2020-03-25', 19, 19, '2020-03-31', 0.00, 1.80, '158563789220200331_065812danish.jpg', 0, 1, NULL, 1, 0, NULL, '#000000', 1),
	(224, 45, 'Danish Pastry Mini', 'BAK04', '', '2020-03-25', 19, 19, '2020-03-31', 0.00, 0.85, '158563802520200331_070025danishmini.jpg', 0, 1, NULL, 1, 0, NULL, '#000000', 1),
	(225, 45, 'Croissant Mini', 'BAK05', '', '2020-03-25', 19, 19, '2020-03-31', 0.00, 0.75, '158563829020200331_0704502018_Flaky-Butter-Croissants_3986_Desktop.jpg', 0, 1, NULL, 1, 0, NULL, '#000000', 1),
	(226, 45, 'Croissant', 'BAK06', '', '2020-03-25', 19, 19, '2020-03-31', 0.00, 1.25, '158563840420200331_070644mini-butter-croissants-feature-720x720.jpg', 0, 1, NULL, 1, 0, NULL, '#000000', 1),
	(227, 45, 'Chocolatine', 'BAK07', '', '2020-03-28', 19, 19, '2020-03-31', 0.00, 1.80, '158563865220200331_071052bigstock-Pain-Au-Chocolat-137130179.jpg', 0, 1, NULL, 1, 0, NULL, '#000000', 1),
	(228, 45, 'Raisin Roll', 'BAK08', '', '2020-03-28', 19, 19, '2020-03-31', 0.00, 1.80, '158563850420200331_070824S4241.jpg', 0, 1, NULL, 1, 0, NULL, '#000000', 1),
	(229, 27, 'គុយទាវសាច់គោ', 'K02', '', '2020-03-30', 19, NULL, NULL, 0.00, 3.50, '158556502320200330_104343kuyteav_kua.png', 0, 1, NULL, 1, 0, NULL, '#000000', 1),
	(230, 28, 'បាយឆាកាពិ', 'FO04', '', '2020-04-04', 19, 19, '2020-04-04', 0.00, 3.75, '', 0, 1, NULL, 1, 0, NULL, '#000000', 1),
	(231, 42, 'បង្អែមព្រិលត្រចៀកកាំ', 'De01', '', '2020-04-20', 19, NULL, NULL, 0.00, 3.00, '', 0, 1, NULL, 1, 0, NULL, '#000000', 1),
	(232, 28, 'បាយឆាម្រះព្រៅ', 'FF07', '', '2020-04-21', 19, NULL, NULL, 0.00, 3.50, '', 0, 1, NULL, 1, 0, NULL, '#000000', 1);
/*!40000 ALTER TABLE `item_detail` ENABLE KEYS */;


-- Dumping structure for table rms_web_basic.item_note
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
) ENGINE=InnoDB AUTO_INCREMENT=35 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci COMMENT='Status=1=> ''ACTIVE'' , Status=0 =>''DELETE''';

-- Dumping data for table rms_web_basic.item_note: ~30 rows (approximately)
DELETE FROM `item_note`;
/*!40000 ALTER TABLE `item_note` DISABLE KEYS */;
INSERT INTO `item_note` (`item_note_id`, `item_note_name`, `item_note_price`, `item_note_des`, `item_note_branch_id`, `item_note_created_date`, `item_note_created_by`, `item_note_modified_by`, `item_note_modified_date`, `item_note_status`) VALUES
	(1, 'PERL ', 0.60, '', 41, '2019-09-11', 19, 66, '2020-01-21', 0),
	(2, 'ICE', 0.00, '', 41, '2019-09-11', 19, 66, '2020-01-21', 0),
	(3, 'SUGAR', 0.00, '', 41, '2019-09-11', 19, 66, '2020-01-21', 0),
	(4, 'រសជាតិហិរ', 0.00, '', 41, '2019-10-07', 19, 66, '2020-01-21', 0),
	(5, 'ថែមពងទា១', 0.50, '', 41, '2019-10-07', 19, 66, '2020-01-21', 0),
	(6, 'a', 1.00, '', 41, '2020-01-13', 19, 66, '2020-01-21', 0),
	(7, 'អត់យកស្ករ', 0.00, '', 41, '2020-01-21', 66, 19, '2020-04-04', 1),
	(8, 'ស្ករ ៨០%', 0.00, '', 41, '2020-01-21', 66, 19, '2020-04-04', 1),
	(9, 'ស្ករ ៥០%', 0.00, '', 41, '2020-01-21', 66, 19, '2020-04-04', 1),
	(10, 'ស្ករ ៣០%', 0.00, '', 41, '2020-01-21', 66, 19, '2020-04-04', 1),
	(11, 'ថែមគុជ', 0.00, '', 41, '2020-01-21', 66, 19, '2020-03-05', 0),
	(12, 'កាហ្វេចាស់', 0.00, '', 41, '2020-01-21', 66, 19, '2020-03-11', 1),
	(13, 'ស្ករតិច', 0.00, '', 41, '2020-01-21', 66, 19, '2020-03-05', 0),
	(14, 'អត់ហឹរ', 0.00, '', 41, '2020-01-21', 66, 19, '2020-03-05', 0),
	(15, 'ហឹរតិច', 0.00, '', 41, '2020-01-21', 66, 19, '2020-03-05', 0),
	(16, 'អត់យកបន្លែ', 0.00, '', 41, '2020-01-21', 66, 19, '2020-03-05', 0),
	(17, 'ថែមបន្លែគ្រប់មុខ', 0.45, '', 41, '2020-01-21', 66, 19, '2020-03-05', 0),
	(18, 'ថែម​ប្រហិតត្រី', 1.00, '', 41, '2020-01-21', 66, 19, '2020-03-05', 0),
	(19, 'ថែមជ្រក់ស្វាយ', 0.45, '', 41, '2020-01-21', 66, 19, '2020-03-05', 0),
	(20, 'ទិកឃ្មុំ', 0.50, '', 41, '2020-02-03', 19, 19, '2020-03-05', 0),
	(21, 'ទិកត្រីបន្តិច', 0.00, '', 41, '2020-02-07', 19, 19, '2020-03-05', 0),
	(22, 'សាច់ស្រួយ', 0.50, '', 41, '2020-02-10', 19, 19, '2020-03-05', 0),
	(23, 'ប្រហិតសាច់គោ', 0.50, '', 41, '2020-02-10', 19, 19, '2020-03-05', 0),
	(24, 'Sugar 10%', 0.00, '', 41, '2020-02-13', 19, 19, '2020-03-05', 0),
	(25, 'Sugar 100%', 0.00, '', 41, '2020-03-05', 19, 19, '2020-03-05', 0),
	(26, 'Sugar 100%', 0.00, '', 41, '2020-03-05', 19, 19, '2020-03-05', 0),
	(27, 'កាហ្វេស្ដើង', 0.00, '', 41, '2020-03-05', 19, 19, '2020-03-11', 1),
	(28, 'Iced', 0.00, '', 41, '2020-03-05', 19, 19, '2020-03-11', 0),
	(29, 'ខ្ចប់', 0.00, '', 41, '2020-03-21', 19, NULL, NULL, 1),
	(30, 'បន្លែ​ x ២', 0.00, '', 41, '2020-03-21', 19, 19, '2020-04-04', 1),
	(31, 'អត់យកសាច់', 0.00, '', 41, '2020-03-21', 19, NULL, NULL, 1),
	(32, 'ពងចៀន', 0.50, '', 41, '2020-03-21', 19, 19, '2020-04-11', 1),
	(33, 'Extra Shot', 0.50, '', 41, '2020-04-04', 19, NULL, NULL, 1),
	(34, 'ដូររង្វាន់', 0.12, '', 41, '2020-04-04', 19, 19, '2020-04-04', 1);
/*!40000 ALTER TABLE `item_note` ENABLE KEYS */;


-- Dumping structure for table rms_web_basic.item_type
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
) ENGINE=InnoDB AUTO_INCREMENT=46 DEFAULT CHARSET=latin1;

-- Dumping data for table rms_web_basic.item_type: ~18 rows (approximately)
DELETE FROM `item_type`;
/*!40000 ALTER TABLE `item_type` DISABLE KEYS */;
INSERT INTO `item_type` (`item_type_id`, `item_type_name`, `category_id`, `item_type_des`, `item_type_is_ingredient`, `item_type_is_car_wash`, `item_type_created_date`, `item_type_created_by`, `item_type_modified_by`, `item_type_modified_date`, `item_type_is_point`, `item_type_photo`) VALUES
	(14, 'Café (H)', 10, '', 0, NULL, '2020-02-10', 19, 19, '2020-03-14', NULL, '1584169285.png'),
	(15, 'Café (R)', 10, '', 0, NULL, '2020-02-10', 19, 19, '2020-03-14', NULL, '1584169293.png'),
	(24, 'Café (F)', 10, '', 0, NULL, '2020-03-05', 19, 19, '2020-03-14', NULL, '1584169299.png'),
	(25, 'Café (L)', 10, '', 0, NULL, '2020-03-05', 19, 19, '2020-03-14', NULL, '1584169308.png'),
	(26, 'Brewing (H)', 15, '', 0, NULL, '2020-03-05', 19, 19, '2020-03-14', NULL, '1584169315.png'),
	(27, 'គុយទាវ', 12, '', 0, NULL, '2020-03-05', 19, 19, '2020-03-16', NULL, '1584169322.png'),
	(28, 'Foods', 12, '', 0, NULL, '2020-03-05', 19, 19, '2020-03-30', NULL, '1584169330.png'),
	(29, 'Brewing (R)', 15, '', 0, NULL, '2020-03-05', 19, 19, '2020-03-14', NULL, '1584169343.png'),
	(30, 'Brewing (L)', 15, '', 0, NULL, '2020-03-05', 19, 19, '2020-03-14', NULL, '1584169350.png'),
	(31, 'Tea Shake (R)', 16, '', 0, NULL, '2020-03-05', 19, 19, '2020-03-14', NULL, '1584169357.png'),
	(33, 'Tea Shake (L)', 16, '', 0, NULL, '2020-03-05', 19, 19, '2020-03-14', NULL, '1584169366.png'),
	(34, 'Soda (R)', 17, '', 0, NULL, '2020-03-05', 19, 19, '2020-03-14', NULL, '1584169378.png'),
	(35, 'Soda (L)', 17, '', 0, NULL, '2020-03-05', 19, 19, '2020-03-14', NULL, '1584169387.png'),
	(36, 'Smoothie (R)', 18, '', 0, NULL, '2020-03-05', 19, 19, '2020-03-14', NULL, '1584169399.png'),
	(38, 'Frappe (F)', 18, '', 0, NULL, '2020-03-05', 19, 19, '2020-03-14', NULL, '1584169424.png'),
	(41, 'Soft Drinks', 14, '', 0, NULL, '2020-03-10', 19, 19, '2020-03-14', NULL, '1584169432.png'),
	(42, 'Fresh Juice (R)', 20, '', 0, NULL, '2020-03-11', 19, 19, '2020-03-14', NULL, '1584169442.png'),
	(44, 'Sandwich', 13, '', 0, NULL, '2020-03-20', 19, 19, '2020-03-30', NULL, '1585565128.png'),
	(45, 'Bakery', 13, '', 0, NULL, '2020-03-24', 19, 19, '2020-03-30', NULL, '1585565153.png');
/*!40000 ALTER TABLE `item_type` ENABLE KEYS */;


-- Dumping structure for table rms_web_basic.measure
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
) ENGINE=InnoDB AUTO_INCREMENT=12 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- Dumping data for table rms_web_basic.measure: ~11 rows (approximately)
DELETE FROM `measure`;
/*!40000 ALTER TABLE `measure` DISABLE KEYS */;
INSERT INTO `measure` (`measure_id`, `measure_name`, `measure_qty`, `measure_note`, `measure_created_by`, `measure_created_date`, `measure_modifed_date`, `measure_modified_by`, `status`) VALUES
	(1, 'Unit', 1, '', 19, '2018-07-02', '0000-00-00', 0, 1),
	(2, 'Case x 24', 24, 'This is update', 19, '2018-10-11', '0000-00-00', 0, 1),
	(3, 'test', 1, '', 19, '2018-11-13', '0000-00-00', 0, 0),
	(4, 'L', 1000, '1L = 1000ml', 19, '2018-12-26', '0000-00-00', 0, 1),
	(5, '6 pcs', 6, '', 19, '2018-12-28', '0000-00-00', 0, 1),
	(6, '1kg=1000g', 1000, '', 19, '2019-01-09', '0000-00-00', 0, 1),
	(7, 'pack*6', 6, '', 19, '2019-01-23', '0000-00-00', 0, 1),
	(8, '1ឡូ x 12', 12, '', 19, '2019-07-16', '0000-00-00', 0, 1),
	(9, 'g', 1, '1g', 19, '2019-09-26', '0000-00-00', 0, 1),
	(10, 'ml', 1, '1ml', 19, '2019-09-26', '0000-00-00', 0, 1),
	(11, 'lo', 12, '', 19, '2020-02-07', '0000-00-00', 0, 1);
/*!40000 ALTER TABLE `measure` ENABLE KEYS */;


-- Dumping structure for table rms_web_basic.page
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
) ENGINE=InnoDB AUTO_INCREMENT=178 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- Dumping data for table rms_web_basic.page: ~98 rows (approximately)
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
	(131, 'Ingredient Recipes', 4, 6, '', 'ingredient', '', '', 1, 'គ្រឿងផ្សំ'),
	(138, 'Stock In Hand Summary', 6, 1, '', 'report_stock_sum', '', '', 1, 'គ្រឿងផ្សំ'),
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
	(172, 'Sale Offiline', 7, 11, '', 'sale_offline', '', '', 0, 'ការលក់ Offline'),
	(173, 'Stock In/Out', 6, 7, '', 'report_stock_in_out', '', '', 1, 'ស្តុកនាំចូលនាំចេញ'),
	(174, 'Image Slide', 1, 14, '', 'image_slide', '', '', 1, 'រូបភាពចលនា'),
	(175, 'Cash Register', 7, 12, '', 'report_cash_register', '', '', 1, 'វេនចូលលក់'),
	(176, 'Report Sale Credit', 7, 13, '', 'report_sale_credit', '', '', 1, 'ប្រាក់ត្រូវសង'),
	(177, 'Promotion', 1, 10, '', 'promotion', '', '', 1, 'Promotion');
/*!40000 ALTER TABLE `page` ENABLE KEYS */;


-- Dumping structure for table rms_web_basic.permissions
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
) ENGINE=InnoDB AUTO_INCREMENT=1248 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- Dumping data for table rms_web_basic.permissions: ~294 rows (approximately)
DELETE FROM `permissions`;
/*!40000 ALTER TABLE `permissions` DISABLE KEYS */;
INSERT INTO `permissions` (`permission_id`, `permission_page_id`, `position_id`, `permission_enable`, `permission_add`, `permission_edit`, `permission_delete`, `permission_viewall`, `permission_follow_by`, `permission_page_only`) VALUES
	(1, 9, 43, 1, 0, 0, 0, 0, NULL, NULL),
	(2, 11, 43, 1, 1, 1, 1, 1, NULL, NULL),
	(3, 12, 43, 0, 1, 1, 1, NULL, NULL, NULL),
	(4, 13, 43, 1, 1, 1, 1, 1, NULL, NULL),
	(5, 14, 43, 1, 1, 1, 1, 1, NULL, NULL),
	(6, 15, 43, 1, 1, 1, 1, 1, NULL, NULL),
	(7, 56, 43, 1, 1, 1, 1, 1, NULL, NULL),
	(8, 73, 43, 1, 1, 1, 1, 1, NULL, NULL),
	(9, 75, 43, 0, 1, 1, 1, NULL, NULL, NULL),
	(10, 83, 43, 1, 1, 1, 1, 1, NULL, NULL),
	(11, 139, 43, 1, 1, 1, 1, 1, NULL, NULL),
	(12, 162, 43, 1, 1, 1, 1, 1, NULL, NULL),
	(13, 164, 43, 0, 1, 1, 1, NULL, NULL, NULL),
	(14, 167, 43, 1, 1, 1, 1, 1, NULL, NULL),
	(15, 35, 43, 1, 0, 0, 0, 0, NULL, NULL),
	(16, 43, 43, 1, 1, 1, 1, 1, NULL, NULL),
	(17, 44, 43, 1, 1, 1, 1, 1, NULL, NULL),
	(18, 45, 43, 1, 1, 1, 1, 1, NULL, NULL),
	(19, 46, 43, 1, 1, 1, 1, 1, NULL, NULL),
	(20, 48, 43, 1, 0, 0, 0, 0, NULL, NULL),
	(21, 49, 43, 1, 1, 1, 1, 1, NULL, NULL),
	(22, 50, 43, 1, 1, 1, 1, 1, NULL, NULL),
	(23, 160, 43, 1, 1, 1, 1, 1, NULL, NULL),
	(24, 152, 43, 1, 1, 1, 1, 1, NULL, NULL),
	(25, 153, 43, 1, 1, 1, 1, 1, NULL, NULL),
	(26, 163, 43, 1, 1, 1, 1, 1, NULL, NULL),
	(27, 154, 43, 1, 1, 1, 1, 1, NULL, NULL),
	(28, 166, 43, 1, 1, 1, 1, 1, NULL, NULL),
	(29, 18, 43, 1, 0, 0, 0, 0, NULL, NULL),
	(30, 150, 43, 1, 1, 1, 1, 1, NULL, NULL),
	(31, 19, 43, 1, 1, 1, 1, 1, NULL, NULL),
	(32, 165, 43, 1, 1, 1, 1, 0, NULL, NULL),
	(33, 20, 43, 1, 1, 1, 1, 1, NULL, NULL),
	(34, 79, 43, 1, 1, 1, 1, 1, NULL, NULL),
	(35, 131, 43, 1, 1, 1, 1, 1, NULL, NULL),
	(36, 22, 43, 1, 0, 0, 0, 0, NULL, NULL),
	(37, 23, 43, 1, 1, 1, 1, 1, NULL, NULL),
	(38, 25, 43, 1, 1, 1, 1, 1, NULL, NULL),
	(39, 24, 43, 1, 1, 1, 1, 1, NULL, NULL),
	(40, 140, 43, 1, 1, 1, 1, 1, NULL, NULL),
	(41, 141, 43, 1, 1, 1, 1, 1, NULL, NULL),
	(42, 28, 43, 1, 0, 0, 0, 0, NULL, NULL),
	(43, 138, 43, 1, 1, 1, 1, 1, NULL, NULL),
	(44, 32, 43, 1, 1, 1, 1, 1, NULL, NULL),
	(45, 30, 43, 1, 1, 1, 1, 1, NULL, NULL),
	(46, 31, 43, 1, 1, 1, 1, 1, NULL, NULL),
	(47, 68, 43, 1, 1, 1, 1, 1, NULL, NULL),
	(48, 142, 43, 0, 1, 1, 1, NULL, NULL, NULL),
	(49, 34, 43, 1, 0, 0, 0, 0, NULL, NULL),
	(50, 67, 43, 1, 1, 1, 1, 1, NULL, NULL),
	(51, 69, 43, 1, 1, 1, 1, 1, NULL, NULL),
	(52, 71, 43, 1, 1, 1, 1, 1, NULL, NULL),
	(53, 72, 43, 1, 1, 1, 1, 1, NULL, NULL),
	(54, 81, 43, 1, 1, 1, 1, 1, NULL, NULL),
	(55, 84, 43, 1, 1, 1, 1, 1, NULL, NULL),
	(56, 148, 43, 1, 1, 1, 1, 1, NULL, NULL),
	(57, 149, 43, 1, 1, 1, 1, 1, NULL, NULL),
	(58, 151, 43, 1, 1, 1, 1, 1, NULL, NULL),
	(59, 39, 43, 1, 0, 0, 0, 0, NULL, NULL),
	(60, 40, 43, 1, 1, 1, 1, 1, NULL, NULL),
	(61, 130, 43, 1, 1, 1, 1, 1, NULL, NULL),
	(62, 41, 43, 1, 1, 1, 1, 1, NULL, NULL),
	(63, 144, 43, 1, 1, 1, 1, 1, NULL, NULL),
	(64, 146, 43, 1, 1, 1, 1, 1, NULL, NULL),
	(65, 52, 43, 1, 0, 0, 0, 0, NULL, NULL),
	(66, 55, 43, 1, 1, 1, 1, 1, NULL, NULL),
	(67, 88, 43, 1, 0, 0, 0, 0, NULL, NULL),
	(68, 168, 43, 1, 0, 0, 0, 0, NULL, NULL),
	(69, 89, 43, 1, 0, 0, 0, 0, NULL, NULL),
	(70, 90, 43, 1, 0, 0, 0, 0, NULL, NULL),
	(71, 91, 43, 1, 0, 0, 0, 0, NULL, NULL),
	(72, 105, 43, 1, 0, 0, 0, 0, NULL, NULL),
	(73, 155, 43, 1, 0, 0, 0, 0, NULL, NULL),
	(74, 157, 43, 1, 1, 1, 1, 0, NULL, NULL),
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
	(793, 173, 43, 1, 1, 1, 1, 1, NULL, NULL),
	(921, 174, 43, 1, 1, 1, 1, 1, NULL, NULL),
	(922, 175, 43, 1, 1, 1, 1, 1, NULL, NULL),
	(923, 176, 43, 1, 1, 1, 1, 1, NULL, NULL),
	(924, 9, 54, 1, 0, 0, 0, NULL, NULL, NULL),
	(925, 11, 54, 1, 0, 0, 0, NULL, NULL, NULL),
	(926, 12, 54, 0, 0, 0, 0, NULL, NULL, NULL),
	(927, 13, 54, 1, 0, 0, 0, NULL, NULL, NULL),
	(928, 14, 54, 1, 0, 0, 0, NULL, NULL, NULL),
	(929, 15, 54, 1, 0, 0, 0, NULL, NULL, NULL),
	(930, 56, 54, 1, 0, 0, 0, NULL, NULL, NULL),
	(931, 73, 54, 1, 0, 0, 0, NULL, NULL, NULL),
	(932, 75, 54, 0, 0, 0, 0, NULL, NULL, NULL),
	(933, 83, 54, 1, 0, 0, 0, NULL, NULL, NULL),
	(934, 139, 54, 1, 0, 0, 0, NULL, NULL, NULL),
	(935, 162, 54, 1, 0, 0, 0, NULL, NULL, NULL),
	(936, 164, 54, 0, 0, 0, 0, NULL, NULL, NULL),
	(937, 167, 54, 1, 0, 0, 0, NULL, NULL, NULL),
	(938, 174, 54, 1, 0, 0, 0, NULL, NULL, NULL),
	(939, 35, 54, 1, 0, 0, 0, NULL, NULL, NULL),
	(940, 43, 54, 1, 0, 0, 0, NULL, NULL, NULL),
	(941, 44, 54, 1, 0, 0, 0, NULL, NULL, NULL),
	(942, 45, 54, 1, 0, 0, 0, NULL, NULL, NULL),
	(943, 46, 54, 1, 0, 0, 0, NULL, NULL, NULL),
	(944, 48, 54, 1, 0, 0, 0, NULL, NULL, NULL),
	(945, 49, 54, 1, 0, 0, 0, NULL, NULL, NULL),
	(946, 50, 54, 1, 0, 0, 0, NULL, NULL, NULL),
	(947, 160, 54, 1, 0, 0, 0, NULL, NULL, NULL),
	(948, 152, 54, 1, 0, 0, 0, NULL, NULL, NULL),
	(949, 153, 54, 1, 0, 0, 0, NULL, NULL, NULL),
	(950, 163, 54, 1, 0, 0, 0, NULL, NULL, NULL),
	(951, 154, 54, 1, 0, 0, 0, NULL, NULL, NULL),
	(952, 166, 54, 1, 0, 0, 0, NULL, NULL, NULL),
	(953, 18, 54, 1, 0, 0, 0, NULL, NULL, NULL),
	(954, 150, 54, 1, 0, 0, 0, NULL, NULL, NULL),
	(955, 19, 54, 1, 0, 0, 0, NULL, NULL, NULL),
	(956, 165, 54, 0, 0, 0, 0, NULL, NULL, NULL),
	(957, 20, 54, 1, 0, 0, 0, NULL, NULL, NULL),
	(958, 79, 54, 1, 0, 0, 0, NULL, NULL, NULL),
	(959, 131, 54, 1, 0, 0, 0, NULL, NULL, NULL),
	(960, 22, 54, 1, 0, 0, 0, NULL, NULL, NULL),
	(961, 23, 54, 1, 0, 0, 0, NULL, NULL, NULL),
	(962, 25, 54, 1, 0, 0, 0, NULL, NULL, NULL),
	(963, 24, 54, 1, 0, 0, 0, NULL, NULL, NULL),
	(964, 140, 54, 1, 0, 0, 0, NULL, NULL, NULL),
	(965, 141, 54, 1, 0, 0, 0, NULL, NULL, NULL),
	(966, 28, 54, 1, 0, 0, 0, NULL, NULL, NULL),
	(967, 138, 54, 1, 0, 0, 0, NULL, NULL, NULL),
	(968, 32, 54, 1, 0, 0, 0, NULL, NULL, NULL),
	(969, 30, 54, 1, 0, 0, 0, NULL, NULL, NULL),
	(970, 31, 54, 1, 0, 0, 0, NULL, NULL, NULL),
	(971, 68, 54, 1, 0, 0, 0, NULL, NULL, NULL),
	(972, 142, 54, 0, 0, 0, 0, NULL, NULL, NULL),
	(973, 173, 54, 1, 0, 0, 0, NULL, NULL, NULL),
	(974, 34, 54, 1, 0, 0, 0, NULL, NULL, NULL),
	(975, 67, 54, 1, 0, 0, 0, NULL, NULL, NULL),
	(976, 69, 54, 1, 0, 0, 0, NULL, NULL, NULL),
	(977, 71, 54, 1, 0, 0, 0, NULL, NULL, NULL),
	(978, 72, 54, 1, 0, 0, 0, NULL, NULL, NULL),
	(979, 81, 54, 1, 0, 0, 0, NULL, NULL, NULL),
	(980, 84, 54, 1, 0, 0, 0, NULL, NULL, NULL),
	(981, 148, 54, 1, 0, 0, 0, NULL, NULL, NULL),
	(982, 149, 54, 1, 0, 0, 0, NULL, NULL, NULL),
	(983, 151, 54, 1, 0, 0, 0, NULL, NULL, NULL),
	(984, 169, 54, 1, 0, 0, 0, NULL, NULL, NULL),
	(985, 172, 54, 0, 0, 0, 0, NULL, NULL, NULL),
	(986, 175, 54, 1, 0, 0, 0, NULL, NULL, NULL),
	(987, 176, 54, 1, 0, 0, 0, NULL, NULL, NULL),
	(988, 39, 54, 1, 0, 0, 0, NULL, NULL, NULL),
	(989, 40, 54, 1, 0, 0, 0, NULL, NULL, NULL),
	(990, 130, 54, 1, 0, 0, 0, NULL, NULL, NULL),
	(991, 41, 54, 1, 0, 0, 0, NULL, NULL, NULL),
	(992, 144, 54, 1, 0, 0, 0, NULL, NULL, NULL),
	(993, 146, 54, 1, 0, 0, 0, NULL, NULL, NULL),
	(994, 52, 54, 1, 0, 0, 0, NULL, NULL, NULL),
	(995, 55, 54, 1, 0, 0, 0, NULL, NULL, NULL),
	(996, 88, 54, 1, 0, 0, 0, NULL, NULL, NULL),
	(997, 168, 54, 1, 0, 0, 0, NULL, NULL, NULL),
	(998, 89, 54, 1, 0, 0, 0, NULL, NULL, NULL),
	(999, 90, 54, 1, 0, 0, 0, NULL, NULL, NULL),
	(1000, 91, 54, 1, 0, 0, 0, NULL, NULL, NULL),
	(1001, 105, 54, 1, 0, 0, 0, NULL, NULL, NULL),
	(1002, 155, 54, 1, 0, 0, 0, NULL, NULL, NULL),
	(1003, 157, 54, 1, 1, 1, 1, 0, NULL, NULL),
	(1004, 171, 54, 1, 0, 0, 0, NULL, NULL, NULL),
	(1005, 95, 54, 1, 0, 0, 0, NULL, NULL, NULL),
	(1006, 97, 54, 1, 0, 0, 0, NULL, NULL, NULL),
	(1007, 96, 54, 1, 0, 0, 0, NULL, NULL, NULL),
	(1008, 99, 54, 1, 0, 0, 0, NULL, NULL, NULL),
	(1009, 100, 54, 1, 0, 0, 0, NULL, NULL, NULL),
	(1010, 101, 54, 1, 0, 0, 0, NULL, NULL, NULL),
	(1011, 102, 54, 1, 0, 0, 0, NULL, NULL, NULL),
	(1012, 103, 54, 1, 0, 0, 0, NULL, NULL, NULL),
	(1013, 104, 54, 1, 0, 0, 0, NULL, NULL, NULL),
	(1014, 110, 54, 1, 0, 0, 0, NULL, NULL, NULL),
	(1015, 126, 54, 1, 0, 0, 0, NULL, NULL, NULL),
	(1016, 111, 54, 1, 0, 0, 0, NULL, NULL, NULL),
	(1017, 113, 54, 1, 0, 0, 0, NULL, NULL, NULL),
	(1018, 115, 54, 1, 0, 0, 0, NULL, NULL, NULL),
	(1019, 117, 54, 1, 0, 0, 0, NULL, NULL, NULL),
	(1020, 170, 54, 1, 0, 0, 0, NULL, NULL, NULL),
	(1148, 9, 56, 0, 0, 0, 0, 0, NULL, NULL),
	(1149, 11, 56, 0, 0, 0, 0, 0, NULL, NULL),
	(1150, 12, 56, 0, 0, 0, 0, NULL, NULL, NULL),
	(1151, 13, 56, 0, 0, 0, 0, 0, NULL, NULL),
	(1152, 14, 56, 0, 0, 0, 0, 0, NULL, NULL),
	(1153, 15, 56, 0, 0, 0, 0, 0, NULL, NULL),
	(1154, 56, 56, 0, 0, 0, 0, 0, NULL, NULL),
	(1155, 73, 56, 0, 0, 0, 0, 0, NULL, NULL),
	(1156, 75, 56, 0, 0, 0, 0, NULL, NULL, NULL),
	(1157, 83, 56, 0, 0, 0, 0, 0, NULL, NULL),
	(1158, 139, 56, 0, 0, 0, 0, 0, NULL, NULL),
	(1159, 162, 56, 0, 0, 0, 0, 0, NULL, NULL),
	(1160, 164, 56, 0, 0, 0, 0, NULL, NULL, NULL),
	(1161, 167, 56, 0, 0, 0, 0, 0, NULL, NULL),
	(1162, 174, 56, 0, 0, 0, 0, 0, NULL, NULL),
	(1163, 35, 56, 0, 0, 0, 0, 0, NULL, NULL),
	(1164, 43, 56, 0, 0, 0, 0, 0, NULL, NULL),
	(1165, 44, 56, 0, 0, 0, 0, 0, NULL, NULL),
	(1166, 45, 56, 0, 0, 0, 0, 0, NULL, NULL),
	(1167, 46, 56, 0, 0, 0, 0, 0, NULL, NULL),
	(1168, 48, 56, 0, 0, 0, 0, 0, NULL, NULL),
	(1169, 49, 56, 0, 0, 0, 0, 0, NULL, NULL),
	(1170, 50, 56, 0, 0, 0, 0, 0, NULL, NULL),
	(1171, 160, 56, 0, 0, 0, 0, 0, NULL, NULL),
	(1172, 152, 56, 0, 0, 0, 0, 0, NULL, NULL),
	(1173, 153, 56, 0, 0, 0, 0, 0, NULL, NULL),
	(1174, 163, 56, 0, 0, 0, 0, 0, NULL, NULL),
	(1175, 154, 56, 0, 0, 0, 0, 0, NULL, NULL),
	(1176, 166, 56, 0, 0, 0, 0, 0, NULL, NULL),
	(1177, 18, 56, 0, 0, 0, 0, 0, NULL, NULL),
	(1178, 150, 56, 0, 0, 0, 0, 0, NULL, NULL),
	(1179, 19, 56, 0, 0, 0, 0, 0, NULL, NULL),
	(1180, 165, 56, 0, 0, 0, 0, NULL, NULL, NULL),
	(1181, 20, 56, 0, 0, 0, 0, 0, NULL, NULL),
	(1182, 79, 56, 0, 0, 0, 0, 0, NULL, NULL),
	(1183, 131, 56, 0, 0, 0, 0, 0, NULL, NULL),
	(1184, 22, 56, 0, 0, 0, 0, 0, NULL, NULL),
	(1185, 23, 56, 0, 0, 0, 0, 0, NULL, NULL),
	(1186, 25, 56, 0, 0, 0, 0, 0, NULL, NULL),
	(1187, 24, 56, 0, 0, 0, 0, 0, NULL, NULL),
	(1188, 140, 56, 0, 0, 0, 0, 0, NULL, NULL),
	(1189, 141, 56, 0, 0, 0, 0, 0, NULL, NULL),
	(1190, 28, 56, 0, 0, 0, 0, 0, NULL, NULL),
	(1191, 138, 56, 0, 0, 0, 0, 0, NULL, NULL),
	(1192, 32, 56, 0, 0, 0, 0, 0, NULL, NULL),
	(1193, 30, 56, 0, 0, 0, 0, 0, NULL, NULL),
	(1194, 31, 56, 0, 0, 0, 0, 0, NULL, NULL),
	(1195, 68, 56, 0, 0, 0, 0, 0, NULL, NULL),
	(1196, 142, 56, 0, 0, 0, 0, NULL, NULL, NULL),
	(1197, 173, 56, 0, 0, 0, 0, 0, NULL, NULL),
	(1198, 34, 56, 0, 0, 0, 0, 0, NULL, NULL),
	(1199, 67, 56, 0, 0, 0, 0, 0, NULL, NULL),
	(1200, 69, 56, 0, 0, 0, 0, 0, NULL, NULL),
	(1201, 71, 56, 0, 0, 0, 0, 0, NULL, NULL),
	(1202, 72, 56, 0, 0, 0, 0, 0, NULL, NULL),
	(1203, 81, 56, 0, 0, 0, 0, 0, NULL, NULL),
	(1204, 84, 56, 0, 0, 0, 0, 0, NULL, NULL),
	(1205, 148, 56, 0, 0, 0, 0, 0, NULL, NULL),
	(1206, 149, 56, 0, 0, 0, 0, 0, NULL, NULL),
	(1207, 151, 56, 0, 0, 0, 0, 0, NULL, NULL),
	(1208, 169, 56, 0, 0, 0, 0, 0, NULL, NULL),
	(1209, 172, 56, 0, 0, 0, 0, NULL, NULL, NULL),
	(1210, 175, 56, 0, 0, 0, 0, 0, NULL, NULL),
	(1211, 176, 56, 0, 0, 0, 0, 0, NULL, NULL),
	(1212, 39, 56, 0, 0, 0, 0, 0, NULL, NULL),
	(1213, 40, 56, 0, 0, 0, 0, 0, NULL, NULL),
	(1214, 130, 56, 0, 0, 0, 0, 0, NULL, NULL),
	(1215, 41, 56, 0, 0, 0, 0, 0, NULL, NULL),
	(1216, 144, 56, 0, 0, 0, 0, 0, NULL, NULL),
	(1217, 146, 56, 0, 0, 0, 0, 0, NULL, NULL),
	(1218, 52, 56, 0, 0, 0, 0, 0, NULL, NULL),
	(1219, 55, 56, 0, 0, 0, 0, 0, NULL, NULL),
	(1220, 88, 56, 1, 0, 0, 0, 0, NULL, NULL),
	(1221, 168, 56, 1, 0, 0, 0, 0, NULL, NULL),
	(1222, 89, 56, 1, 0, 0, 0, 0, NULL, NULL),
	(1223, 90, 56, 1, 0, 0, 0, 0, NULL, NULL),
	(1224, 91, 56, 1, 0, 0, 0, 0, NULL, NULL),
	(1225, 105, 56, 1, 0, 0, 0, 0, NULL, NULL),
	(1226, 155, 56, 1, 0, 0, 0, 0, NULL, NULL),
	(1227, 157, 56, 1, 0, 0, 0, 0, NULL, NULL),
	(1228, 171, 56, 1, 0, 0, 0, 0, NULL, NULL),
	(1229, 95, 56, 1, 0, 0, 0, 0, NULL, NULL),
	(1230, 97, 56, 1, 0, 0, 0, 0, NULL, NULL),
	(1231, 96, 56, 1, 0, 0, 0, 0, NULL, NULL),
	(1232, 99, 56, 1, 0, 0, 0, 0, NULL, NULL),
	(1233, 100, 56, 1, 0, 0, 0, 0, NULL, NULL),
	(1234, 101, 56, 1, 0, 0, 0, 0, NULL, NULL),
	(1235, 102, 56, 1, 0, 0, 0, 0, NULL, NULL),
	(1236, 103, 56, 1, 0, 0, 0, 0, NULL, NULL),
	(1237, 104, 56, 1, 0, 0, 0, 0, NULL, NULL),
	(1238, 110, 56, 1, 0, 0, 0, 0, NULL, NULL),
	(1239, 126, 56, 0, 0, 0, 0, 0, NULL, NULL),
	(1240, 111, 56, 1, 0, 0, 0, 0, NULL, NULL),
	(1241, 113, 56, 1, 0, 0, 0, 0, NULL, NULL),
	(1242, 115, 56, 1, 0, 0, 0, 0, NULL, NULL),
	(1243, 117, 56, 0, 0, 0, 0, 0, NULL, NULL),
	(1244, 170, 56, 1, 0, 0, 0, 0, NULL, NULL),
	(1245, 177, 43, 1, 1, 1, 1, 1, NULL, NULL),
	(1246, 177, 54, 1, 0, 0, 0, NULL, NULL, NULL),
	(1247, 177, 56, 0, 0, 0, 0, 0, NULL, NULL);
/*!40000 ALTER TABLE `permissions` ENABLE KEYS */;


-- Dumping structure for table rms_web_basic.point
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

-- Dumping data for table rms_web_basic.point: ~0 rows (approximately)
DELETE FROM `point`;
/*!40000 ALTER TABLE `point` DISABLE KEYS */;
/*!40000 ALTER TABLE `point` ENABLE KEYS */;


-- Dumping structure for table rms_web_basic.position
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
) ENGINE=InnoDB AUTO_INCREMENT=59 DEFAULT CHARSET=latin1;

-- Dumping data for table rms_web_basic.position: ~4 rows (approximately)
DELETE FROM `position`;
/*!40000 ALTER TABLE `position` DISABLE KEYS */;
INSERT INTO `position` (`position_id`, `position_name`, `position_note`, `position_is_car_wash`, `position_created_date`, `position_created_by`, `position_modified_by`, `position_modified_date`, `status`) VALUES
	(43, 'Admin', 'Super User', NULL, '2018-12-14', 19, NULL, NULL, 1),
	(56, 'Cashier', '', NULL, '2019-10-03', 19, NULL, NULL, 1),
	(57, 'stock', '', NULL, '2020-01-13', 19, NULL, NULL, 0),
	(58, 'Order', '', NULL, '2020-02-17', 19, NULL, NULL, 0);
/*!40000 ALTER TABLE `position` ENABLE KEYS */;


-- Dumping structure for table rms_web_basic.printer
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

-- Dumping data for table rms_web_basic.printer: ~3 rows (approximately)
DELETE FROM `printer`;
/*!40000 ALTER TABLE `printer` DISABLE KEYS */;
INSERT INTO `printer` (`printer_id`, `printer_name`, `printer_print_bill`, `printer_print_receipt`, `printer_print_bill_time`, `printer_print_receipt_time`, `printer_print_kitchen`, `printer_is_counter`, `printer_branch_id`, `printer_print_kitchen_time`, `printer_location_id`, `printer_label`) VALUES
	(1, 'Cashier', '', 'POS-80C', NULL, NULL, '', 1, 1, 1, 1, 0),
	(2, 'Bar', '', NULL, NULL, NULL, '192.168.1.100', 0, 2, 1, 6, 0),
	(3, 'Kitchen', '', '', NULL, NULL, '192.168.1.101', 1, 1, 1, 3, 0);
/*!40000 ALTER TABLE `printer` ENABLE KEYS */;


-- Dumping structure for table rms_web_basic.printer_location
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
) ENGINE=InnoDB AUTO_INCREMENT=7 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- Dumping data for table rms_web_basic.printer_location: ~3 rows (approximately)
DELETE FROM `printer_location`;
/*!40000 ALTER TABLE `printer_location` DISABLE KEYS */;
INSERT INTO `printer_location` (`printer_location_id`, `printer_location_name`, `printer_location_is_counter`, `printer_location_desc`, `printer_location_created_date`, `printer_location_created_by`, `status`) VALUES
	(1, 'Cashier', 1, 'Cashier Printer', '2019-04-26', '0000-00-00', 1),
	(3, 'Kitchen', 1, 'Kitchen Printer', '2020-03-16', '0000-00-00', 1),
	(6, 'Small Kitchen', 1, 'Good for drink', '2020-03-16', '0000-00-00', 1);
/*!40000 ALTER TABLE `printer_location` ENABLE KEYS */;


-- Dumping structure for table rms_web_basic.promotion
DROP TABLE IF EXISTS `promotion`;
CREATE TABLE IF NOT EXISTS `promotion` (
  `promotion_id` int(11) NOT NULL AUTO_INCREMENT,
  `promotion_name` varchar(255) CHARACTER SET utf8 COLLATE utf8_unicode_ci DEFAULT NULL,
  `from_date` date DEFAULT NULL,
  `until_date` date DEFAULT NULL,
  `from_time` time DEFAULT NULL,
  `until_time` time DEFAULT NULL,
  `description` varchar(500) CHARACTER SET utf8 COLLATE utf8_unicode_ci DEFAULT NULL,
  `created_date` datetime DEFAULT NULL,
  `created_by` int(11) DEFAULT NULL,
  PRIMARY KEY (`promotion_id`)
) ENGINE=InnoDB AUTO_INCREMENT=7 DEFAULT CHARSET=latin1;

-- Dumping data for table rms_web_basic.promotion: ~0 rows (approximately)
DELETE FROM `promotion`;
/*!40000 ALTER TABLE `promotion` DISABLE KEYS */;
INSERT INTO `promotion` (`promotion_id`, `promotion_name`, `from_date`, `until_date`, `from_time`, `until_time`, `description`, `created_date`, `created_by`) VALUES
	(6, 'ថែមជូនពិសេស', '2020-01-17', '2020-01-18', '13:00:00', '15:00:00', 'មានការថែមជូនពិសេស១០%គ្រប់មុខ', '2020-01-17 09:45:12', 19);
/*!40000 ALTER TABLE `promotion` ENABLE KEYS */;


-- Dumping structure for table rms_web_basic.promotion_detail
DROP TABLE IF EXISTS `promotion_detail`;
CREATE TABLE IF NOT EXISTS `promotion_detail` (
  `promotion_detail_id` int(11) NOT NULL AUTO_INCREMENT,
  `promotion_id` int(11) DEFAULT NULL,
  `item_detail_id` int(11) DEFAULT NULL,
  `p_discount` decimal(10,2) DEFAULT '0.00' COMMENT 'Percentage Discount',
  `d_discount` decimal(10,2) DEFAULT '0.00' COMMENT 'USD Discount',
  `modified_date` datetime DEFAULT NULL,
  `modified_by` int(11) DEFAULT '0',
  PRIMARY KEY (`promotion_detail_id`),
  KEY `promotion_id` (`promotion_id`)
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=latin1;

-- Dumping data for table rms_web_basic.promotion_detail: ~2 rows (approximately)
DELETE FROM `promotion_detail`;
/*!40000 ALTER TABLE `promotion_detail` DISABLE KEYS */;
INSERT INTO `promotion_detail` (`promotion_detail_id`, `promotion_id`, `item_detail_id`, `p_discount`, `d_discount`, `modified_date`, `modified_by`) VALUES
	(4, 6, 65, 10.00, 0.00, '2020-01-17 09:45:21', 19),
	(5, 6, 58, 10.00, 0.00, '2020-01-17 09:45:40', 19);
/*!40000 ALTER TABLE `promotion_detail` ENABLE KEYS */;


-- Dumping structure for table rms_web_basic.purchase
DROP TABLE IF EXISTS `purchase`;
CREATE TABLE IF NOT EXISTS `purchase` (
  `purchase_no` int(11) NOT NULL AUTO_INCREMENT,
  `refference_no` varchar(50) COLLATE utf8_unicode_ci DEFAULT '0',
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

-- Dumping data for table rms_web_basic.purchase: ~0 rows (approximately)
DELETE FROM `purchase`;
/*!40000 ALTER TABLE `purchase` DISABLE KEYS */;
/*!40000 ALTER TABLE `purchase` ENABLE KEYS */;


-- Dumping structure for table rms_web_basic.purchase_detail
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

-- Dumping data for table rms_web_basic.purchase_detail: ~0 rows (approximately)
DELETE FROM `purchase_detail`;
/*!40000 ALTER TABLE `purchase_detail` DISABLE KEYS */;
/*!40000 ALTER TABLE `purchase_detail` ENABLE KEYS */;


-- Dumping structure for table rms_web_basic.purchase_pay
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

-- Dumping data for table rms_web_basic.purchase_pay: ~0 rows (approximately)
DELETE FROM `purchase_pay`;
/*!40000 ALTER TABLE `purchase_pay` DISABLE KEYS */;
/*!40000 ALTER TABLE `purchase_pay` ENABLE KEYS */;


-- Dumping structure for table rms_web_basic.purchase_return
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

-- Dumping data for table rms_web_basic.purchase_return: ~0 rows (approximately)
DELETE FROM `purchase_return`;
/*!40000 ALTER TABLE `purchase_return` DISABLE KEYS */;
/*!40000 ALTER TABLE `purchase_return` ENABLE KEYS */;


-- Dumping structure for table rms_web_basic.rate
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

-- Dumping data for table rms_web_basic.rate: ~0 rows (approximately)
DELETE FROM `rate`;
/*!40000 ALTER TABLE `rate` DISABLE KEYS */;
INSERT INTO `rate` (`rate_id`, `rate_amount`, `rate_amount_return`, `rate_created_date`, `rate_created_by`, `rate_modified_by`, `rate_modified_date`, `rate_des`) VALUES
	(1, 4000, 4100, '2016-05-23', 1, 19, '2020-02-04', 'Exchange rate.');
/*!40000 ALTER TABLE `rate` ENABLE KEYS */;


-- Dumping structure for table rms_web_basic.sale_detail
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
) ENGINE=InnoDB AUTO_INCREMENT=1143 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- Dumping data for table rms_web_basic.sale_detail: ~1,142 rows (approximately)
DELETE FROM `sale_detail`;
/*!40000 ALTER TABLE `sale_detail` DISABLE KEYS */;
INSERT INTO `sale_detail` (`sale_detail_id`, `sale_master_id`, `sale_detail_item_id`, `sale_detail_qty`, `sale_detail_unit_price`, `sale_detail_dis_us`, `sale_detail_dis_percent`, `sale_detail_printed`, `sale_detail_note`, `sale_detail_status`, `sale_detail_costing`, `sale_detail_costing_json`, `sale_detail_create_date`, `sale_detail_create_by`, `sale_detail_modified_date`, `sale_detail_modified_by`) VALUES
	(1, 1, 147, 1, 2.50, 0.00, 20.00, 0, NULL, 1, 0.00, '[]', '2020-03-10 09:35:30', 19, '2020-03-10 09:35:30', 19),
	(2, 2, 147, 1, 2.50, 0.00, 0.00, 0, NULL, 1, 0.00, '[]', '2020-03-10 10:18:08', 19, '2020-03-10 10:18:08', 19),
	(3, 3, 86, 1, 2.00, 0.00, 0.00, 0, NULL, -1, NULL, NULL, '2020-03-10 11:16:04', 19, '2020-03-10 11:16:04', 19),
	(4, 3, 176, 1, 0.75, 0.00, 0.00, 0, NULL, -1, NULL, NULL, '2020-03-10 12:16:49', 19, '2020-03-10 12:16:49', 19),
	(5, 4, 176, 1, 0.75, 0.00, 0.00, 0, NULL, -1, NULL, NULL, '2020-03-10 12:18:59', 19, '2020-03-10 12:18:59', 19),
	(6, 4, 172, 1, 2.50, 0.00, 0.00, 0, NULL, -1, NULL, NULL, '2020-03-10 12:47:33', 19, '2020-03-10 12:47:33', 19),
	(7, 4, 176, 1, 0.75, 0.00, 0.00, 0, NULL, -1, NULL, NULL, '2020-03-10 13:09:12', 19, '2020-03-10 13:09:12', 19),
	(8, 5, 176, 1, 0.75, 0.00, 0.00, 0, NULL, 1, 0.00, '[]', '2020-03-10 13:10:25', 19, '2020-03-10 13:10:25', 19),
	(9, 6, 89, 1, 1.90, 0.00, 0.00, 0, NULL, 1, 0.00, '[]', '2020-03-10 13:47:07', 19, '2020-03-10 13:47:07', 19),
	(10, 7, 151, 1, 2.90, 0.00, 50.00, 0, NULL, 1, 0.00, '[]', '2020-03-10 15:29:03', 19, '2020-03-10 15:29:03', 19),
	(11, 8, 147, 1, 2.50, 0.00, 20.00, 0, NULL, 1, 0.00, '[]', '2020-03-10 15:52:49', 19, '2020-03-10 15:52:49', 19),
	(12, 9, 147, 1, 2.50, 0.00, 20.00, 0, NULL, 1, 0.00, '[]', '2020-03-10 16:55:05', 19, '2020-03-10 16:55:05', 19),
	(13, 9, 129, 1, 2.50, 0.00, 20.00, 0, NULL, 1, 0.00, '[]', '2020-03-10 17:09:51', 19, '2020-03-10 17:09:51', 19),
	(14, 10, 145, 1, 2.00, 0.00, 50.00, 0, NULL, 1, 0.00, '[]', '2020-03-11 07:39:54', 19, '2020-03-11 07:39:54', 19),
	(15, 10, 149, 1, 2.50, 0.00, 50.00, 0, NULL, 1, 0.00, '[]', '2020-03-11 07:40:05', 19, '2020-03-11 07:40:05', 19),
	(16, 11, 184, 1, 1.00, 0.00, 50.00, 0, NULL, 1, 0.00, '[]', '2020-03-11 08:00:08', 19, '2020-03-11 08:00:08', 19),
	(17, 12, 149, 1, 2.50, 0.00, 0.00, 0, NULL, 0, NULL, NULL, '2020-03-11 10:23:38', 19, '2020-03-11 10:23:38', 19),
	(18, 12, 136, 1, 2.50, 0.00, 50.00, 0, NULL, 1, 0.00, '[]', '2020-03-11 10:26:12', 19, '2020-03-11 10:26:12', 19),
	(19, 12, 184, 1, 1.00, 0.00, 50.00, 0, NULL, 1, 0.00, '[]', '2020-03-11 10:26:23', 19, '2020-03-11 10:26:23', 19),
	(20, 13, 149, 1, 2.50, 0.00, 5.00, 0, NULL, 0, NULL, NULL, '2020-03-11 10:28:03', 19, '2020-03-11 10:28:03', 19),
	(21, 13, 149, 1, 2.50, 0.00, 50.00, 0, NULL, 1, 0.00, '[]', '2020-03-11 10:29:31', 19, '2020-03-11 10:29:31', 19),
	(22, 14, 149, 1, 2.50, 0.00, 50.00, 0, NULL, 1, 0.00, '[]', '2020-03-11 10:30:11', 19, '2020-03-11 10:30:11', 19),
	(23, 15, 169, 1, 2.50, 0.00, 50.00, 0, NULL, 1, 0.00, '[]', '2020-03-11 10:31:08', 19, '2020-03-11 10:31:08', 19),
	(24, 16, 184, 1, 1.00, 0.00, 0.00, 0, NULL, 0, NULL, NULL, '2020-03-11 10:38:48', 19, '2020-03-11 10:38:48', 19),
	(25, 17, 183, 1, 1.00, 0.00, 0.00, 0, NULL, 0, NULL, NULL, '2020-03-11 10:49:09', 19, '2020-03-11 10:49:09', 19),
	(26, 16, 89, 1, 2.30, 0.00, 30.00, 0, NULL, 1, 0.00, '[]', '2020-03-11 12:21:59', 19, '2020-03-11 12:21:59', 19),
	(27, 16, 86, 1, 1.90, 0.00, 30.00, 0, NULL, 1, 0.00, '[]', '2020-03-11 12:22:58', 19, '2020-03-11 12:22:58', 19),
	(28, 16, 136, 1, 2.50, 0.00, 30.00, 0, NULL, 1, 0.00, '[]', '2020-03-11 12:30:08', 19, '2020-03-11 12:30:08', 19),
	(29, 16, 169, 1, 2.50, 0.00, 30.00, 0, NULL, 1, 0.00, '[]', '2020-03-11 12:30:21', 19, '2020-03-11 12:30:21', 19),
	(30, 17, 188, 5, 1.00, 0.00, 50.00, 0, NULL, 1, 0.00, '[]', '2020-03-11 13:28:15', 19, '2020-03-11 13:28:15', 19),
	(31, 18, 146, 1, 2.50, 0.00, 50.00, 0, NULL, 1, 0.00, '[]', '2020-03-11 13:28:47', 19, '2020-03-11 13:28:47', 19),
	(32, 19, 188, 2, 1.00, 0.00, 50.00, 0, NULL, 1, 0.00, '[]', '2020-03-11 13:49:54', 19, '2020-03-11 13:49:54', 19),
	(33, 20, 149, 1, 2.50, 0.00, 100.00, 0, NULL, 1, 0.00, '[]', '2020-03-11 13:53:10', 19, '2020-03-11 13:53:10', 19),
	(34, 20, 101, 1, 2.50, 0.00, 100.00, 0, NULL, 1, 0.00, '[]', '2020-03-11 13:54:04', 19, '2020-03-11 13:54:04', 19),
	(35, 21, 188, 3, 1.00, 0.00, 50.00, 0, NULL, 1, 0.00, '[]', '2020-03-11 14:03:05', 19, '2020-03-11 14:03:05', 19),
	(36, 22, 147, 1, 2.50, 0.00, 100.00, 0, NULL, 1, 0.00, '[]', '2020-03-11 14:54:35', 19, '2020-03-11 14:54:35', 19),
	(37, 23, 203, 1, 2.50, 0.00, 20.00, 0, NULL, 1, 0.00, '[]', '2020-03-11 17:27:46', 19, '2020-03-11 17:27:46', 19),
	(38, 24, 184, 1, 1.00, 0.00, 50.00, 0, NULL, 1, 0.00, '[]', '2020-03-11 19:10:59', 19, '2020-03-11 19:10:59', 19),
	(39, 24, 188, 1, 1.00, 0.00, 50.00, 0, NULL, 1, 0.00, '[]', '2020-03-11 19:11:03', 19, '2020-03-11 19:11:03', 19),
	(40, 25, 145, 1, 2.10, 0.00, 50.00, 0, NULL, 1, 0.00, '[]', '2020-03-12 07:42:24', 19, '2020-03-12 07:42:24', 19),
	(41, 26, 149, 1, 2.50, 0.00, 0.00, 0, NULL, 0, NULL, NULL, '2020-03-12 07:49:49', 19, '2020-03-12 07:49:49', 19),
	(42, 26, 149, 1, 2.50, 0.00, 0.00, 0, NULL, 1, 0.00, '[]', '2020-03-12 07:51:22', 19, '2020-03-12 07:51:22', 19),
	(43, 27, 188, 1, 1.00, 0.00, 50.00, 0, NULL, 1, 0.00, '[]', '2020-03-12 07:54:11', 19, '2020-03-12 07:54:11', 19),
	(44, 28, 145, 1, 2.10, 0.00, 50.00, 0, NULL, 1, 0.00, '[]', '2020-03-12 08:01:47', 19, '2020-03-12 08:01:47', 19),
	(45, 29, 149, 1, 2.50, 0.00, 50.00, 0, NULL, 1, 0.00, '[]', '2020-03-12 08:04:23', 19, '2020-03-12 08:04:23', 19),
	(46, 30, 184, 1, 1.00, 0.00, 50.00, 0, NULL, 1, 0.00, '[]', '2020-03-12 08:06:02', 19, '2020-03-12 08:06:02', 19),
	(47, 31, 149, 1, 2.50, 0.00, 0.00, 0, NULL, 0, NULL, NULL, '2020-03-12 08:08:17', 19, '2020-03-12 08:08:17', 19),
	(48, 31, 184, 1, 1.00, 0.00, 50.00, 0, NULL, 1, 0.00, '[]', '2020-03-12 09:35:10', 19, '2020-03-12 09:35:10', 19),
	(49, 32, 146, 1, 2.50, 0.00, 0.00, 0, NULL, 0, NULL, NULL, '2020-03-12 10:08:12', 19, '2020-03-12 10:08:12', 19),
	(50, 32, 168, 1, 2.50, 0.00, 0.00, 0, NULL, 1, 0.00, '[]', '2020-03-12 10:08:27', 19, '2020-03-12 10:08:27', 19),
	(51, 32, 203, 1, 2.50, 0.00, 0.00, 0, NULL, 1, 0.00, '[]', '2020-03-12 10:08:39', 19, '2020-03-12 10:08:39', 19),
	(52, 32, 149, 1, 2.50, 0.00, 0.00, 0, NULL, 0, NULL, NULL, '2020-03-12 10:08:46', 19, '2020-03-12 10:08:46', 19),
	(53, 32, 147, 1, 2.50, 0.00, 0.00, 0, NULL, 1, 0.00, '[]', '2020-03-12 10:08:54', 19, '2020-03-12 10:08:54', 19),
	(54, 33, 86, 1, 1.90, 0.00, 20.00, 0, NULL, 1, 0.00, '[]', '2020-03-12 10:15:07', 19, '2020-03-12 10:15:07', 19),
	(55, 33, 147, 2, 2.50, 0.00, 20.00, 0, NULL, 1, 0.00, '[]', '2020-03-12 10:15:25', 19, '2020-03-12 10:15:25', 19),
	(56, 34, 149, 1, 2.50, 0.00, 0.00, 0, NULL, 0, NULL, NULL, '2020-03-12 10:24:39', 19, '2020-03-12 10:24:39', 19),
	(57, 34, 146, 1, 2.50, 0.00, 0.00, 0, NULL, 0, NULL, NULL, '2020-03-12 10:24:44', 19, '2020-03-12 10:24:44', 19),
	(58, 34, 151, 1, 2.90, 0.00, 50.00, 0, NULL, 1, 0.00, '[]', '2020-03-12 10:24:51', 19, '2020-03-12 10:24:51', 19),
	(59, 35, 156, 1, 2.80, 0.00, 0.00, 0, NULL, 0, NULL, NULL, '2020-03-12 11:20:02', 19, '2020-03-12 11:20:02', 19),
	(60, 35, 180, 1, 2.80, 0.00, 0.00, 0, NULL, 0, NULL, NULL, '2020-03-12 11:48:09', 19, '2020-03-12 11:48:09', 19),
	(61, 35, 145, 1, 2.10, 0.00, 0.00, 0, NULL, 0, NULL, NULL, '2020-03-12 12:17:21', 19, '2020-03-12 12:17:21', 19),
	(62, 35, 184, 2, 1.00, 0.00, 50.00, 0, NULL, 1, 0.00, '[]', '2020-03-12 12:57:59', 19, '2020-03-12 12:57:59', 19),
	(63, 36, 188, 1, 1.00, 0.00, 50.00, 0, NULL, 1, 0.00, '[]', '2020-03-12 13:25:38', 19, '2020-03-12 13:25:38', 19),
	(64, 37, 184, 3, 1.00, 0.00, 50.00, 0, NULL, 1, 0.00, '[]', '2020-03-12 13:31:27', 19, '2020-03-12 13:31:27', 19),
	(65, 37, 188, 1, 1.00, 0.00, 50.00, 0, NULL, 1, 0.00, '[]', '2020-03-12 13:31:57', 19, '2020-03-12 13:31:57', 19),
	(66, 38, 181, 1, 2.80, 0.00, 100.00, 0, NULL, 1, 0.00, '[]', '2020-03-12 13:52:14', 19, '2020-03-12 13:52:14', 19),
	(67, 39, 188, 1, 1.00, 0.00, 50.00, 0, NULL, 1, 0.00, '[]', '2020-03-12 14:15:10', 19, '2020-03-12 14:15:10', 19),
	(68, 40, 183, 1, 1.00, 0.00, 50.00, 0, NULL, 1, 0.00, '[]', '2020-03-12 14:19:56', 19, '2020-03-12 14:19:56', 19),
	(69, 41, 188, 2, 1.00, 0.00, 20.00, 0, NULL, 1, 0.00, '[]', '2020-03-12 14:21:30', 19, '2020-03-12 14:21:30', 19),
	(70, 41, 169, 1, 2.50, 0.00, 20.00, 0, NULL, 1, 0.00, '[]', '2020-03-12 15:09:26', 19, '2020-03-12 15:09:26', 19),
	(71, 41, 149, 1, 2.50, 0.00, 100.00, 0, NULL, 0, NULL, NULL, '2020-03-12 15:25:32', 19, '2020-03-12 15:25:32', 19),
	(72, 42, 149, 1, 2.50, 0.00, 100.00, 0, NULL, 1, 0.00, '[]', '2020-03-12 15:29:24', 19, '2020-03-12 15:29:24', 19),
	(73, 43, 154, 1, 2.90, 0.00, 100.00, 0, NULL, 1, 0.00, '[]', '2020-03-12 15:57:38', 19, '2020-03-12 15:57:38', 19),
	(74, 44, 181, 2, 2.80, 0.00, 0.00, 0, NULL, 1, 0.00, '[]', '2020-03-12 16:42:06', 19, '2020-03-12 16:42:06', 19),
	(75, 44, 152, 1, 2.90, 0.00, 0.00, 0, NULL, 0, NULL, NULL, '2020-03-12 16:56:08', 19, '2020-03-12 16:56:08', 19),
	(76, 44, 154, 1, 2.90, 0.00, 0.00, 0, NULL, 1, 0.00, '[]', '2020-03-12 16:58:59', 19, '2020-03-12 16:58:59', 19),
	(77, 45, 186, 1, 1.50, 0.00, 20.00, 0, NULL, 1, 0.00, '[]', '2020-03-12 17:08:01', 19, '2020-03-12 17:08:01', 19),
	(78, 46, 169, 1, 2.50, 0.00, 20.00, 0, NULL, 1, 0.00, '[]', '2020-03-12 17:17:12', 19, '2020-03-12 17:17:12', 19),
	(79, 47, 184, 1, 1.00, 0.00, 100.00, 0, NULL, 1, 0.00, '[]', '2020-03-12 19:44:23', 19, '2020-03-12 19:44:23', 19),
	(80, 48, 149, 1, 2.50, 0.00, 0.00, 0, NULL, 0, NULL, NULL, '2020-03-12 19:46:22', 19, '2020-03-12 19:46:22', 19),
	(81, 48, 145, 1, 2.10, 0.00, 50.00, 0, NULL, 1, 0.00, '[]', '2020-03-13 07:48:08', 19, '2020-03-13 07:48:08', 19),
	(82, 49, 184, 1, 1.00, 0.00, 50.00, 0, NULL, 1, 0.00, '[]', '2020-03-13 07:49:45', 19, '2020-03-13 07:49:45', 19),
	(83, 50, 184, 1, 1.00, 0.00, 50.00, 0, NULL, 1, 0.00, '[]', '2020-03-13 07:51:07', 19, '2020-03-13 07:51:07', 19),
	(84, 51, 155, 1, 2.80, 0.00, 0.00, 0, NULL, 0, NULL, NULL, '2020-03-13 08:06:24', 19, '2020-03-13 08:06:24', 19),
	(85, 51, 155, 1, 2.80, 0.00, 50.00, 0, NULL, 0, NULL, NULL, '2020-03-13 08:07:29', 19, '2020-03-13 08:07:29', 19),
	(86, 51, 183, 1, 1.00, 0.00, 50.00, 0, NULL, 1, 0.00, '[]', '2020-03-13 08:40:06', 19, '2020-03-13 08:40:06', 19),
	(87, 52, 149, 1, 2.50, 0.00, 20.00, 0, NULL, 0, NULL, NULL, '2020-03-13 08:46:54', 19, '2020-03-13 08:46:54', 19),
	(88, 52, 149, 1, 2.50, 0.00, 20.00, 0, NULL, 0, NULL, NULL, '2020-03-13 08:47:42', 19, '2020-03-13 08:47:42', 19),
	(89, 52, 161, 1, 2.00, 0.00, 0.00, 0, NULL, 0, NULL, NULL, '2020-03-13 08:57:59', 19, '2020-03-13 08:57:59', 19),
	(90, 52, 169, 1, 2.50, 0.00, 50.00, 0, NULL, 1, 0.00, '[]', '2020-03-13 08:58:21', 19, '2020-03-13 08:58:21', 19),
	(91, 53, 151, 1, 2.90, 0.00, 50.00, 0, NULL, 0, NULL, NULL, '2020-03-13 10:14:22', 19, '2020-03-13 10:14:22', 19),
	(92, 53, 147, 2, 2.50, 0.00, 20.00, 0, NULL, 0, NULL, NULL, '2020-03-13 10:19:35', 19, '2020-03-13 10:19:35', 19),
	(93, 53, 136, 1, 2.50, 0.00, 20.00, 0, NULL, 1, 0.00, '[]', '2020-03-13 10:29:10', 19, '2020-03-13 10:29:10', 19),
	(94, 54, 184, 1, 1.00, 0.00, 50.00, 0, NULL, 1, 0.00, '[]', '2020-03-13 11:02:14', 19, '2020-03-13 11:02:14', 19),
	(95, 55, 126, 1, 2.80, 0.00, 20.00, 0, NULL, 1, 0.00, '[]', '2020-03-13 11:03:39', 19, '2020-03-13 11:03:39', 19),
	(96, 56, 126, 1, 2.80, 0.00, 100.00, 0, NULL, 1, 0.00, '[]', '2020-03-13 11:14:30', 19, '2020-03-13 11:14:30', 19),
	(97, 57, 176, 2, 0.75, 0.00, 100.00, 0, NULL, 1, 0.00, '[]', '2020-03-13 11:23:17', 19, '2020-03-13 11:23:17', 19),
	(98, 55, 183, 1, 1.00, 0.00, 20.00, 0, NULL, 1, 0.00, '[]', '2020-03-13 11:38:21', 19, '2020-03-13 11:38:21', 19),
	(99, 58, 176, 3, 0.75, 0.00, 20.00, 0, NULL, 1, 0.00, '[]', '2020-03-13 13:04:57', 19, '2020-03-13 13:04:57', 19),
	(100, 59, 184, 1, 1.00, 0.00, 50.00, 0, NULL, 1, 0.00, '[]', '2020-03-13 13:20:45', 19, '2020-03-13 13:20:45', 19),
	(101, 59, 183, 1, 1.00, 0.00, 50.00, 0, NULL, 1, 0.00, '[]', '2020-03-13 13:20:48', 19, '2020-03-13 13:20:48', 19),
	(102, 60, 188, 1, 1.00, 0.00, 50.00, 0, NULL, 1, 0.00, '[]', '2020-03-13 13:27:00', 19, '2020-03-13 13:27:00', 19),
	(103, 61, 149, 2, 2.50, 0.00, 100.00, 0, NULL, 1, 0.00, '[]', '2020-03-13 13:39:30', 19, '2020-03-13 13:39:30', 19),
	(104, 62, 188, 3, 1.00, 0.00, 50.00, 0, NULL, 1, 0.00, '[]', '2020-03-13 13:40:22', 19, '2020-03-13 13:40:22', 19),
	(105, 63, 164, 1, 2.00, 0.00, 100.00, 0, NULL, 1, 0.00, '[]', '2020-03-13 13:49:04', 19, '2020-03-13 13:49:04', 19),
	(106, 64, 176, 1, 0.75, 0.00, 20.00, 0, NULL, 0, NULL, NULL, '2020-03-13 13:50:07', 19, '2020-03-13 13:50:07', 19),
	(107, 64, 187, 1, 1.00, 0.00, 0.00, 0, NULL, 0, NULL, NULL, '2020-03-13 13:56:59', 19, '2020-03-13 13:56:59', 19),
	(108, 64, 188, 1, 1.00, 0.00, 50.00, 0, NULL, 1, 0.00, '[]', '2020-03-13 13:57:04', 19, '2020-03-13 13:57:04', 19),
	(109, 65, 188, 1, 1.00, 0.00, 50.00, 0, NULL, 1, 0.00, '[]', '2020-03-13 14:02:43', 19, '2020-03-13 14:02:43', 19),
	(110, 66, 145, 1, 2.10, 0.00, 20.00, 0, NULL, 0, NULL, NULL, '2020-03-13 14:10:03', 19, '2020-03-13 14:10:03', 19),
	(111, 66, 155, 1, 2.80, 0.00, 0.00, 0, NULL, 0, NULL, NULL, '2020-03-13 14:30:10', 19, '2020-03-13 14:30:10', 19),
	(112, 66, 175, 1, 3.00, 0.00, 100.00, 0, NULL, 1, 0.00, '[]', '2020-03-13 14:58:09', 19, '2020-03-13 14:58:09', 19),
	(113, 67, 188, 1, 1.00, 0.00, 50.00, 0, NULL, 1, 0.00, '[]', '2020-03-13 15:08:11', 19, '2020-03-13 15:08:11', 19),
	(114, 68, 190, 1, 1.00, 0.00, 0.00, 0, NULL, -1, NULL, NULL, '2020-03-13 15:17:10', 19, '2020-03-13 15:17:10', 19),
	(115, 68, 113, 1, 2.50, 0.00, 20.00, 0, NULL, -1, NULL, NULL, '2020-03-13 15:29:04', 19, '2020-03-13 15:29:04', 19),
	(116, 69, 175, 1, 3.00, 0.00, 20.00, 0, NULL, 0, NULL, NULL, '2020-03-13 15:56:47', 19, '2020-03-13 15:56:47', 19),
	(117, 68, 167, 1, 2.50, 0.00, 0.00, 0, NULL, -1, NULL, NULL, '2020-03-13 15:59:04', 19, '2020-03-13 15:59:04', 19),
	(118, 68, 123, 1, 2.90, 0.00, 0.00, 0, NULL, -1, NULL, NULL, '2020-03-13 15:59:14', 19, '2020-03-13 15:59:14', 19),
	(119, 68, 138, 1, 2.50, 0.00, 0.00, 0, NULL, -1, NULL, NULL, '2020-03-13 15:59:24', 19, '2020-03-13 15:59:24', 19),
	(120, 70, 136, 1, 2.50, 0.00, 0.00, 0, NULL, 0, NULL, NULL, '2020-03-13 17:22:29', 19, '2020-03-13 17:22:29', 19),
	(121, 70, 135, 1, 2.50, 0.00, 0.00, 0, NULL, 1, 0.00, '[]', '2020-03-13 17:22:43', 19, '2020-03-13 17:22:43', 19),
	(122, 71, 188, 1, 1.00, 0.00, 50.00, 0, NULL, 1, 0.00, '[]', '2020-03-13 17:33:24', 19, '2020-03-13 17:33:24', 19),
	(123, 72, 91, 1, 2.30, 0.00, 20.00, 0, NULL, -1, NULL, NULL, '2020-03-13 17:44:23', 19, '2020-03-13 17:44:23', 19),
	(124, 72, 159, 1, 2.80, 0.00, 20.00, 0, NULL, -1, NULL, NULL, '2020-03-13 17:47:06', 19, '2020-03-13 17:47:06', 19),
	(125, 73, 187, 1, 1.00, 0.00, 50.00, 0, NULL, 1, 0.00, '[]', '2020-03-14 07:55:02', 19, '2020-03-14 07:55:02', 19),
	(126, 74, 145, 1, 2.10, 0.00, 50.00, 0, NULL, 1, 0.00, '[]', '2020-03-14 08:01:41', 19, '2020-03-14 08:01:41', 19),
	(127, 75, 145, 1, 2.10, 0.00, 0.00, 0, NULL, 0, NULL, NULL, '2020-03-14 08:58:46', 19, '2020-03-14 08:58:46', 19),
	(128, 75, 152, 1, 2.90, 0.00, 20.00, 0, NULL, 0, NULL, NULL, '2020-03-14 08:59:00', 19, '2020-03-14 08:59:00', 19),
	(129, 75, 126, 1, 2.80, 0.00, 100.00, 0, NULL, 1, 0.00, '[]', '2020-03-14 10:26:05', 19, '2020-03-14 10:26:05', 19),
	(130, 76, 149, 1, 2.50, 0.00, 20.00, 0, NULL, 0, NULL, NULL, '2020-03-14 10:53:51', 19, '2020-03-14 10:53:51', 19),
	(131, 76, 145, 1, 2.10, 0.00, 20.00, 0, NULL, 0, NULL, NULL, '2020-03-14 10:53:54', 19, '2020-03-14 10:53:54', 19),
	(132, 76, 188, 1, 1.00, 0.00, 50.00, 0, NULL, 1, 0.00, '[]', '2020-03-14 12:57:08', 19, '2020-03-14 12:57:08', 19),
	(133, 77, 185, 1, 1.00, 0.00, 50.00, 0, NULL, 1, 0.00, '[]', '2020-03-14 13:02:38', 19, '2020-03-14 13:02:38', 19),
	(134, 78, 151, 1, 2.90, 0.00, 50.00, 0, NULL, 1, 0.00, '[]', '2020-03-14 14:50:59', 19, '2020-03-14 14:50:59', 19),
	(135, 79, 208, 2, 2.80, 0.00, 100.00, 0, NULL, 1, 0.00, '[]', '2020-03-14 14:53:42', 19, '2020-03-14 14:53:42', 19),
	(136, 80, 141, 1, 2.90, 0.00, 20.00, 0, NULL, 0, NULL, NULL, '2020-03-14 15:10:39', 19, '2020-03-14 15:10:39', 19),
	(137, 80, 205, 1, 3.75, 0.00, 0.00, 0, NULL, 0, NULL, NULL, '2020-03-14 16:13:15', 19, '2020-03-14 16:13:15', 19),
	(138, 80, 141, 1, 2.90, 0.00, 20.00, 0, NULL, 1, 0.00, '[]', '2020-03-14 17:12:36', 19, '2020-03-14 17:12:36', 19),
	(139, 81, 149, 1, 2.50, 0.00, 100.00, 0, NULL, 1, 0.00, '[]', '2020-03-15 08:50:02', 19, '2020-03-15 08:50:02', 19),
	(140, 82, 151, 1, 2.90, 0.00, 50.00, 0, NULL, 1, 0.00, '[]', '2020-03-15 09:04:30', 19, '2020-03-15 09:04:30', 19),
	(141, 83, 159, 1, 2.80, 0.00, 0.00, 0, NULL, 0, NULL, NULL, '2020-03-15 09:35:47', 19, '2020-03-15 09:35:47', 19),
	(142, 83, 185, 1, 1.00, 0.00, 50.00, 0, NULL, 1, 0.00, '[]', '2020-03-15 09:52:50', 19, '2020-03-15 09:52:50', 19),
	(143, 84, 149, 2, 2.50, 0.00, 20.00, 0, NULL, 1, 0.00, '[]', '2020-03-15 10:30:07', 19, '2020-03-15 10:30:07', 19),
	(144, 85, 176, 1, 0.75, 0.00, 20.00, 0, NULL, 1, 0.00, '[]', '2020-03-15 10:32:56', 19, '2020-03-15 10:32:56', 19),
	(145, 84, 203, 1, 2.50, 0.00, 20.00, 0, NULL, 1, 0.00, '[]', '2020-03-15 10:37:01', 19, '2020-03-15 10:37:01', 19),
	(146, 86, 149, 1, 2.50, 0.00, 0.00, 0, NULL, -1, NULL, NULL, '2020-03-15 11:18:11', 19, '2020-03-15 11:18:11', 19),
	(147, 87, 147, 1, 2.50, 0.00, 20.00, 0, NULL, 1, 0.00, '[]', '2020-03-15 11:32:16', 19, '2020-03-15 11:32:16', 19),
	(148, 87, 207, 1, 3.50, 0.00, 20.00, 0, NULL, 1, 0.00, '[]', '2020-03-15 11:32:30', 19, '2020-03-15 11:32:30', 19),
	(149, 88, 89, 1, 2.30, 0.00, 20.00, 0, NULL, 1, 0.00, '[]', '2020-03-15 11:36:47', 19, '2020-03-15 11:36:47', 19),
	(150, 89, 207, 1, 3.50, 0.00, 0.00, 0, NULL, -1, NULL, NULL, '2020-03-15 11:44:59', 19, '2020-03-15 11:44:59', 19),
	(151, 89, 207, 1, 3.50, 0.00, 2.00, 0, NULL, -1, NULL, NULL, '2020-03-15 11:48:24', 19, '2020-03-15 11:48:24', 19),
	(152, 90, 136, 1, 2.50, 0.00, 100.00, 0, NULL, 1, 0.00, '[]', '2020-03-15 11:57:57', 19, '2020-03-15 11:57:57', 19),
	(153, 91, 185, 1, 1.00, 0.00, 50.00, 0, NULL, 1, 0.00, '[]', '2020-03-15 12:18:12', 19, '2020-03-15 12:18:12', 19),
	(154, 92, 147, 1, 2.50, 0.00, 20.00, 0, NULL, 1, 0.00, '[]', '2020-03-15 12:20:47', 19, '2020-03-15 12:20:47', 19),
	(155, 93, 188, 1, 1.00, 0.00, 20.00, 0, NULL, 0, NULL, NULL, '2020-03-15 13:28:09', 19, '2020-03-15 13:28:09', 19),
	(156, 93, 183, 2, 1.00, 0.00, 20.00, 0, NULL, 1, 0.00, '[]', '2020-03-15 13:28:13', 19, '2020-03-15 13:28:13', 19),
	(157, 93, 185, 1, 1.00, 0.00, 20.00, 0, NULL, 1, 0.00, '[]', '2020-03-15 13:29:07', 19, '2020-03-15 13:29:07', 19),
	(158, 94, 185, 1, 1.00, 0.00, 20.00, 0, NULL, 1, 0.00, '[]', '2020-03-15 13:43:45', 19, '2020-03-15 13:43:45', 19),
	(159, 95, 152, 1, 2.90, 0.00, 20.00, 0, NULL, 1, 0.00, '[]', '2020-03-15 13:47:54', 19, '2020-03-15 13:47:54', 19),
	(160, 96, 208, 2, 2.80, 0.00, 100.00, 0, NULL, 1, 0.00, '[]', '2020-03-15 14:40:13', 19, '2020-03-15 14:40:13', 19),
	(161, 97, 208, 1, 2.80, 0.00, 100.00, 0, NULL, 1, 0.00, '[]', '2020-03-15 14:41:23', 19, '2020-03-15 14:41:23', 19),
	(162, 98, 186, 1, 1.50, 0.00, 20.00, 0, NULL, 1, 0.00, '[]', '2020-03-15 16:25:33', 19, '2020-03-15 16:25:33', 19),
	(163, 99, 152, 1, 2.90, 0.00, 20.00, 0, NULL, 1, 0.00, '[]', '2020-03-15 17:23:12', 19, '2020-03-15 17:23:12', 19),
	(164, 100, 210, 1, 3.50, 0.00, 20.00, 1, NULL, 1, 0.00, '[]', '2020-03-16 08:14:27', 19, '2020-03-16 08:14:27', 19),
	(165, 101, 210, 1, 3.50, 0.00, 20.00, 1, NULL, -1, NULL, NULL, '2020-03-16 08:30:10', 19, '2020-03-16 08:30:10', 19),
	(166, 102, 136, 1, 2.50, 0.00, 20.00, 0, NULL, 1, 0.00, '[]', '2020-03-16 08:38:16', 19, '2020-03-16 08:38:16', 19),
	(167, 103, 145, 1, 2.10, 0.00, 20.00, 0, NULL, 1, 0.00, '[]', '2020-03-16 08:51:41', 19, '2020-03-16 08:51:41', 19),
	(168, 104, 149, 1, 2.50, 0.00, 100.00, 0, NULL, 1, 0.00, '[]', '2020-03-16 13:22:28', 19, '2020-03-16 13:22:28', 19),
	(169, 105, 151, 1, 2.90, 0.00, 50.00, 0, NULL, 1, 0.00, '[]', '2020-03-16 14:35:57', 19, '2020-03-16 14:35:57', 19),
	(170, 106, 136, 1, 2.50, 0.00, 20.00, 0, NULL, 1, 0.00, '[]', '2020-03-16 17:36:55', 19, '2020-03-16 17:36:55', 19),
	(171, 107, 209, 1, 3.50, 0.00, 20.00, 1, NULL, 1, 0.00, '[]', '2020-03-17 07:24:31', 19, '2020-03-17 07:24:31', 19),
	(172, 108, 147, 2, 2.50, 0.00, 100.00, 0, NULL, 1, 0.00, '[]', '2020-03-17 07:30:48', 19, '2020-03-17 07:30:48', 19),
	(173, 109, 187, 1, 1.00, 0.00, 50.00, 0, NULL, 1, 0.00, '[]', '2020-03-17 08:13:06', 19, '2020-03-17 08:13:06', 19),
	(174, 110, 145, 1, 2.10, 0.00, 50.00, 0, NULL, 1, 0.00, '[]', '2020-03-17 08:39:20', 19, '2020-03-17 08:39:20', 19),
	(175, 110, 183, 1, 1.00, 0.00, 50.00, 0, NULL, 1, 0.00, '[]', '2020-03-17 08:39:29', 19, '2020-03-17 08:39:29', 19),
	(176, 111, 187, 2, 1.00, 0.00, 50.00, 0, NULL, 1, 0.00, '[]', '2020-03-17 08:44:48', 19, '2020-03-17 08:44:48', 19),
	(177, 112, 187, 1, 1.00, 0.00, 50.00, 0, NULL, 1, 0.00, '[]', '2020-03-17 08:50:28', 19, '2020-03-17 08:50:28', 19),
	(178, 113, 187, 1, 1.00, 0.00, 50.00, 0, NULL, 1, 0.00, '[]', '2020-03-17 09:02:53', 19, '2020-03-17 09:02:53', 19),
	(179, 114, 187, 1, 1.00, 0.00, 50.00, 0, NULL, 0, NULL, NULL, '2020-03-17 09:37:54', 19, '2020-03-17 09:37:54', 19),
	(180, 114, 149, 1, 2.50, 0.00, 100.00, 0, NULL, 1, 0.00, '[]', '2020-03-17 10:08:55', 19, '2020-03-17 10:08:55', 19),
	(181, 115, 136, 1, 2.50, 0.00, 20.00, 0, NULL, 1, 0.00, '[]', '2020-03-17 10:25:29', 19, '2020-03-17 10:25:29', 19),
	(182, 116, 206, 1, 3.75, 0.00, 20.00, 1, NULL, 1, 0.00, '[]', '2020-03-17 10:39:36', 19, '2020-03-17 10:39:36', 19),
	(183, 116, 207, 1, 3.50, 0.00, 20.00, 1, NULL, 1, 0.00, '[]', '2020-03-17 10:39:44', 19, '2020-03-17 10:39:44', 19),
	(184, 116, 186, 1, 1.50, 0.00, 20.00, 0, NULL, 1, 0.00, '[]', '2020-03-17 10:41:54', 19, '2020-03-17 10:41:54', 19),
	(185, 117, 187, 1, 1.00, 0.00, 50.00, 0, NULL, 1, 0.00, '[]', '2020-03-17 11:41:16', 19, '2020-03-17 11:41:16', 19),
	(186, 118, 183, 2, 1.00, 0.00, 50.00, 0, NULL, 1, 0.00, '[]', '2020-03-17 11:49:52', 19, '2020-03-17 11:49:52', 19),
	(187, 119, 206, 1, 3.75, 0.00, 20.00, 1, NULL, 1, 0.00, '[]', '2020-03-17 12:54:52', 19, '2020-03-17 12:54:52', 19),
	(188, 120, 136, 1, 2.50, 0.00, 20.00, 0, NULL, 1, 0.00, '[]', '2020-03-17 13:58:38', 19, '2020-03-17 13:58:38', 19),
	(189, 121, 188, 1, 1.00, 0.00, 0.00, 0, NULL, 0, NULL, NULL, '2020-03-17 14:07:57', 19, '2020-03-17 14:07:57', 19),
	(190, 121, 187, 1, 1.00, 0.00, 50.00, 0, NULL, 1, 0.00, '[]', '2020-03-17 14:08:03', 19, '2020-03-17 14:08:03', 19),
	(191, 122, 109, 3, 2.50, 0.00, 100.00, 0, NULL, 1, 0.00, '[]', '2020-03-17 15:10:11', 19, '2020-03-17 15:10:11', 19),
	(192, 123, 146, 1, 2.50, 0.00, 50.00, 0, NULL, 0, NULL, NULL, '2020-03-17 15:12:16', 19, '2020-03-17 15:12:16', 19),
	(193, 123, 151, 1, 2.90, 0.00, 50.00, 0, NULL, 1, 0.00, '[]', '2020-03-17 15:12:47', 19, '2020-03-17 15:12:47', 19),
	(194, 124, 152, 1, 2.90, 0.00, 20.00, 0, NULL, 1, 0.00, '[]', '2020-03-17 16:22:35', 19, '2020-03-17 16:22:35', 19),
	(195, 125, 202, 1, 1.00, 0.00, 50.00, 0, NULL, 1, 0.00, '[]', '2020-03-18 08:11:29', 19, '2020-03-18 08:11:29', 19),
	(196, 126, 186, 7, 1.50, 0.00, 100.00, 0, NULL, 1, 0.00, '[]', '2020-03-18 08:32:05', 19, '2020-03-18 08:32:05', 19),
	(197, 127, 187, 1, 1.00, 0.00, 50.00, 0, NULL, 1, 0.00, '[]', '2020-03-18 09:09:19', 19, '2020-03-18 09:09:19', 19),
	(198, 128, 104, 1, 2.90, 0.00, 20.00, 0, NULL, 1, 0.00, '[]', '2020-03-18 09:30:46', 19, '2020-03-18 09:30:46', 19),
	(199, 128, 205, 1, 3.75, 0.00, 20.00, 0, NULL, 1, 0.00, '[]', '2020-03-18 09:31:03', 19, '2020-03-18 09:31:03', 19),
	(200, 129, 87, 1, 2.30, 0.00, 20.00, 0, NULL, 1, 0.00, '[]', '2020-03-18 09:37:56', 19, '2020-03-18 09:37:56', 19),
	(201, 130, 147, 1, 2.50, 0.00, 20.00, 0, NULL, 1, 0.00, '[]', '2020-03-18 10:12:24', 19, '2020-03-18 10:12:24', 19),
	(202, 130, 167, 1, 2.50, 0.00, 20.00, 0, NULL, 1, 0.00, '[]', '2020-03-18 10:12:32', 19, '2020-03-18 10:12:32', 19),
	(203, 131, 136, 2, 2.50, 0.00, 20.00, 0, NULL, 1, 0.00, '[]', '2020-03-18 10:21:30', 19, '2020-03-18 10:21:30', 19),
	(204, 132, 126, 1, 2.80, 0.00, 100.00, 0, NULL, 1, 0.00, '[]', '2020-03-18 10:26:57', 19, '2020-03-18 10:26:57', 19),
	(205, 133, 125, 1, 2.80, 0.00, 100.00, 0, NULL, 1, 0.00, '[]', '2020-03-18 11:47:01', 19, '2020-03-18 11:47:01', 19),
	(206, 134, 154, 1, 2.90, 0.00, 20.00, 0, NULL, 1, 0.00, '[]', '2020-03-18 16:22:58', 19, '2020-03-18 16:22:58', 19),
	(207, 135, 207, 1, 3.50, 0.00, 20.00, 0, NULL, 1, 0.00, '[]', '2020-03-18 16:37:39', 19, '2020-03-18 16:37:39', 19),
	(208, 136, 176, 1, 0.75, 0.00, 20.00, 0, NULL, 1, 0.00, '[]', '2020-03-18 18:05:35', 19, '2020-03-18 18:05:35', 19),
	(209, 137, 187, 1, 1.00, 0.00, 50.00, 0, NULL, 1, 0.00, '[]', '2020-03-18 18:29:49', 19, '2020-03-18 18:29:49', 19),
	(210, 138, 187, 2, 1.00, 0.00, 50.00, 0, NULL, 1, 0.00, '[]', '2020-03-19 08:02:04', 19, '2020-03-19 08:02:04', 19),
	(211, 139, 145, 1, 2.10, 0.00, 50.00, 0, NULL, 1, 0.00, '[]', '2020-03-19 08:06:15', 19, '2020-03-19 08:06:15', 19),
	(212, 140, 147, 1, 2.50, 0.00, 50.00, 0, NULL, 0, NULL, NULL, '2020-03-19 08:07:24', 19, '2020-03-19 08:07:24', 19),
	(213, 140, 147, 1, 2.50, 0.00, 20.00, 0, NULL, 1, 0.00, '[]', '2020-03-19 08:07:55', 19, '2020-03-19 08:07:55', 19),
	(214, 141, 210, 2, 3.50, 0.00, 20.00, 0, NULL, 1, 0.00, '[]', '2020-03-19 08:50:31', 19, '2020-03-19 08:50:31', 19),
	(215, 141, 207, 1, 3.50, 0.00, 20.00, 0, NULL, 1, 0.00, '[]', '2020-03-19 09:02:56', 19, '2020-03-19 09:02:56', 19),
	(216, 142, 164, 1, 2.00, 0.00, 50.00, 0, NULL, 1, 0.00, '[]', '2020-03-19 09:30:45', 19, '2020-03-19 09:30:45', 19),
	(217, 143, 136, 1, 2.50, 0.00, 20.00, 0, NULL, 1, 0.00, '[]', '2020-03-19 10:01:18', 19, '2020-03-19 10:01:18', 19),
	(218, 144, 168, 1, 2.50, 0.00, 0.00, 0, NULL, 0, NULL, NULL, '2020-03-19 10:49:11', 19, '2020-03-19 10:49:11', 19),
	(219, 144, 170, 1, 2.50, 0.00, 100.00, 0, NULL, 1, 0.00, '[]', '2020-03-19 10:49:23', 19, '2020-03-19 10:49:23', 19),
	(220, 145, 119, 1, 2.50, 0.00, 100.00, 0, NULL, 1, 0.00, '[]', '2020-03-19 12:40:27', 19, '2020-03-19 12:40:27', 19),
	(221, 146, 206, 2, 3.75, 0.00, 20.00, 2, NULL, 1, 0.00, '[]', '2020-03-19 13:38:58', 19, '2020-03-19 13:38:58', 19),
	(222, 146, 205, 1, 3.75, 0.00, 0.00, 0, NULL, 0, NULL, NULL, '2020-03-19 13:40:41', 19, '2020-03-19 13:40:41', 19),
	(223, 147, 205, 1, 3.75, 0.00, 20.00, 1, NULL, 1, 0.00, '[]', '2020-03-19 13:40:53', 19, '2020-03-19 13:40:53', 19),
	(224, 148, 147, 2, 2.50, 0.00, 20.00, 0, NULL, 0, NULL, NULL, '2020-03-19 13:50:20', 19, '2020-03-19 13:50:20', 19),
	(225, 149, 169, 1, 2.50, 0.00, 20.00, 0, NULL, -1, NULL, NULL, '2020-03-19 14:11:10', 19, '2020-03-19 14:11:10', 19),
	(226, 148, 206, 1, 3.75, 0.00, 20.00, 0, NULL, 0, NULL, NULL, '2020-03-19 14:16:19', 19, '2020-03-19 14:16:19', 19),
	(227, 149, 206, 1, 3.75, 0.00, 20.00, 0, NULL, -1, NULL, NULL, '2020-03-19 14:23:47', 19, '2020-03-19 14:23:47', 19),
	(228, 148, 150, 1, 2.50, 0.00, 20.00, 0, NULL, 1, 0.00, '[]', '2020-03-19 14:48:40', 19, '2020-03-19 14:48:40', 19),
	(229, 150, 147, 1, 2.50, 0.00, 20.00, 0, NULL, 1, 0.00, '[]', '2020-03-19 16:31:12', 19, '2020-03-19 16:31:12', 19),
	(230, 151, 152, 1, 2.90, 0.00, 20.00, 0, NULL, 1, 0.00, '[]', '2020-03-19 17:31:30', 19, '2020-03-19 17:31:30', 19),
	(231, 152, 187, 2, 1.00, 0.00, 50.00, 0, NULL, 1, 0.00, '[]', '2020-03-19 18:39:23', 19, '2020-03-19 18:39:23', 19),
	(232, 153, 145, 1, 2.10, 0.00, 50.00, 0, NULL, 1, 0.00, '[]', '2020-03-20 07:25:14', 19, '2020-03-20 07:25:14', 19),
	(233, 154, 136, 1, 2.50, 0.00, 20.00, 0, NULL, 1, 0.00, '[]', '2020-03-20 09:15:19', 19, '2020-03-20 09:15:19', 19),
	(234, 155, 147, 1, 2.50, 0.00, 20.00, 0, NULL, 0, NULL, NULL, '2020-03-20 09:33:17', 19, '2020-03-20 09:33:17', 19),
	(235, 155, 203, 1, 2.50, 0.00, 20.00, 0, NULL, 0, NULL, NULL, '2020-03-20 09:33:49', 19, '2020-03-20 09:33:49', 19),
	(236, 155, 203, 1, 2.50, 0.00, 20.00, 0, NULL, 1, 0.00, '[]', '2020-03-20 09:34:10', 19, '2020-03-20 09:34:10', 19),
	(237, 155, 136, 1, 2.50, 0.00, 20.00, 0, NULL, 1, 0.00, '[]', '2020-03-20 09:34:17', 19, '2020-03-20 09:34:17', 19),
	(238, 154, 168, 1, 2.50, 0.00, 20.00, 0, NULL, 1, 0.00, '[]', '2020-03-20 10:01:25', 19, '2020-03-20 10:01:25', 19),
	(239, 154, 111, 1, 2.50, 0.00, 20.00, 0, NULL, 1, 0.00, '[]', '2020-03-20 10:01:47', 19, '2020-03-20 10:01:47', 19),
	(240, 156, 147, 1, 2.50, 0.00, 20.00, 0, NULL, 1, 0.00, '[]', '2020-03-20 10:08:31', 19, '2020-03-20 10:08:31', 19),
	(241, 157, 164, 1, 2.00, 0.00, 0.00, 0, NULL, -1, NULL, NULL, '2020-03-20 10:29:58', 19, '2020-03-20 10:29:58', 19),
	(242, 157, 175, 1, 3.00, 0.00, 20.00, 0, NULL, -1, NULL, NULL, '2020-03-20 10:30:21', 19, '2020-03-20 10:30:21', 19),
	(243, 158, 122, 1, 2.90, 0.00, 20.00, 0, NULL, 1, 0.00, '[]', '2020-03-20 11:48:41', 19, '2020-03-20 11:48:41', 19),
	(244, 158, 124, 1, 2.90, 0.00, 20.00, 0, NULL, 1, 0.00, '[]', '2020-03-20 11:48:45', 19, '2020-03-20 11:48:45', 19),
	(245, 159, 120, 1, 2.90, 0.00, 100.00, 0, NULL, 1, 0.00, '[]', '2020-03-20 11:54:22', 19, '2020-03-20 11:54:22', 19),
	(246, 160, 220, 1, 1.00, 0.00, 50.00, 0, NULL, 1, 0.00, '[]', '2020-03-20 12:22:07', 19, '2020-03-20 12:22:07', 19),
	(247, 161, 124, 1, 2.90, 0.00, 20.00, 1, NULL, 1, 0.00, '[]', '2020-03-20 12:26:28', 19, '2020-03-20 12:26:28', 19),
	(248, 162, 187, 1, 1.00, 0.00, 50.00, 0, NULL, 1, 0.00, '[]', '2020-03-20 13:08:40', 19, '2020-03-20 13:08:40', 19),
	(249, 156, 169, 1, 2.50, 0.00, 20.00, 0, NULL, 1, 0.00, '[]', '2020-03-20 13:09:38', 19, '2020-03-20 13:09:38', 19),
	(250, 163, 164, 2, 2.00, 0.00, 20.00, 0, NULL, 1, 0.00, '[]', '2020-03-20 13:25:26', 19, '2020-03-20 13:25:26', 19),
	(251, 164, 126, 1, 2.80, 0.00, 20.00, 0, NULL, 0, NULL, NULL, '2020-03-20 13:30:44', 19, '2020-03-20 13:30:44', 19),
	(252, 164, 164, 1, 2.00, 0.00, 20.00, 0, NULL, 0, NULL, NULL, '2020-03-20 13:31:05', 19, '2020-03-20 13:31:05', 19),
	(253, 165, 206, 1, 3.75, 0.00, 20.00, 0, NULL, 1, 0.00, '[]', '2020-03-20 13:31:32', 19, '2020-03-20 13:31:32', 19),
	(254, 165, 169, 1, 2.50, 0.00, 20.00, 0, NULL, 1, 0.00, '[]', '2020-03-20 13:32:28', 19, '2020-03-20 13:32:28', 19),
	(255, 156, 207, 1, 3.50, 0.00, 20.00, 0, NULL, 1, 0.00, '[]', '2020-03-20 13:46:54', 19, '2020-03-20 13:46:54', 19),
	(256, 166, 151, 1, 2.90, 0.00, 50.00, 0, NULL, 1, 0.00, '[]', '2020-03-20 14:04:45', 19, '2020-03-20 14:04:45', 19),
	(257, 167, 187, 1, 1.00, 0.00, 50.00, 0, NULL, 1, 0.00, '[]', '2020-03-20 14:44:03', 19, '2020-03-20 14:44:03', 19),
	(258, 167, 183, 1, 1.00, 0.00, 50.00, 0, NULL, 1, 0.00, '[]', '2020-03-20 14:44:06', 19, '2020-03-20 14:44:06', 19),
	(259, 168, 193, 1, 3.00, 0.00, 0.00, 0, NULL, 0, NULL, NULL, '2020-03-20 14:50:34', 19, '2020-03-20 14:50:34', 19),
	(260, 168, 186, 1, 1.50, 0.00, 50.00, 0, NULL, 1, 0.00, '[]', '2020-03-20 15:21:47', 19, '2020-03-20 15:21:47', 19),
	(261, 169, 218, 1, 1.00, 0.00, 50.00, 0, NULL, 1, 0.00, '[]', '2020-03-20 15:27:28', 19, '2020-03-20 15:27:28', 19),
	(262, 161, 206, 1, 3.75, 0.00, 20.00, 1, NULL, 1, 0.00, '[]', '2020-03-20 15:47:03', 19, '2020-03-20 15:47:03', 19),
	(263, 170, 220, 2, 1.00, 0.00, 20.00, 0, NULL, 1, 0.00, '[]', '2020-03-20 17:59:11', 19, '2020-03-20 17:59:11', 19),
	(264, 171, 207, 1, 3.50, 0.00, 2.00, 0, NULL, 1, 0.00, '[]', '2020-03-20 18:19:10', 19, '2020-03-20 18:19:10', 19),
	(265, 172, 217, 1, 1.00, 0.00, 50.00, 0, NULL, 1, 0.00, '[]', '2020-03-21 07:31:32', 19, '2020-03-21 07:31:32', 19),
	(266, 173, 145, 1, 2.10, 0.00, 50.00, 0, NULL, 1, 0.00, '[]', '2020-03-21 07:35:01', 19, '2020-03-21 07:35:01', 19),
	(267, 174, 109, 1, 2.50, 0.00, 50.00, 0, NULL, 1, 0.00, '[]', '2020-03-21 07:57:08', 19, '2020-03-21 07:57:08', 19),
	(268, 175, 181, 1, 2.80, 0.00, 100.00, 0, NULL, 1, 0.00, '[]', '2020-03-21 08:15:30', 19, '2020-03-21 08:15:30', 19),
	(269, 176, 147, 2, 2.50, 0.00, 20.00, 0, NULL, 0, NULL, NULL, '2020-03-21 09:58:28', 19, '2020-03-21 09:58:28', 19),
	(270, 176, 206, 1, 3.75, 0.00, 20.00, 1, NULL, 0, NULL, NULL, '2020-03-21 11:00:43', 19, '2020-03-21 11:00:43', 19),
	(271, 176, 136, 1, 2.50, 0.00, 20.00, 0, NULL, 0, NULL, NULL, '2020-03-21 11:01:26', 19, '2020-03-21 11:01:26', 19),
	(272, 176, 186, 1, 1.50, 0.00, 20.00, 0, NULL, 0, NULL, NULL, '2020-03-21 11:14:15', 19, '2020-03-21 11:14:15', 19),
	(273, 177, 186, 1, 1.50, 0.00, 20.00, 0, NULL, 1, 0.00, '[]', '2020-03-21 11:14:43', 19, '2020-03-21 11:14:43', 19),
	(274, 176, 86, 1, 1.90, 0.00, 0.00, 0, NULL, 0, NULL, NULL, '2020-03-21 11:54:56', 19, '2020-03-21 11:54:56', 19),
	(275, 178, 146, 1, 2.50, 0.00, 20.00, 0, NULL, 1, 0.00, '[]', '2020-03-21 11:56:47', 19, '2020-03-21 11:56:47', 19),
	(276, 177, 86, 1, 1.90, 0.00, 20.00, 0, NULL, 1, 0.00, '[]', '2020-03-21 11:57:13', 19, '2020-03-21 11:57:13', 19),
	(277, 179, 145, 1, 2.10, 0.00, 20.00, 0, NULL, 1, 0.00, '[]', '2020-03-21 12:22:36', 19, '2020-03-21 12:22:36', 19),
	(278, 180, 181, 1, 2.80, 0.00, 20.00, 0, NULL, 1, 0.00, '[]', '2020-03-21 12:34:14', 19, '2020-03-21 12:34:14', 19),
	(279, 164, 141, 1, 2.90, 0.00, 20.00, 0, NULL, 1, 0.00, '[]', '2020-03-21 12:59:12', 19, '2020-03-21 12:59:12', 19),
	(280, 176, 151, 1, 2.90, 0.00, 50.00, 0, NULL, 1, 0.00, '[]', '2020-03-21 13:32:14', 19, '2020-03-21 13:32:14', 19),
	(281, 181, 126, 1, 2.80, 0.00, 100.00, 0, NULL, 1, 0.00, '[]', '2020-03-21 14:00:56', 19, '2020-03-21 14:00:56', 19),
	(282, 181, 159, 1, 2.80, 0.00, 100.00, 0, NULL, 1, 0.00, '[]', '2020-03-21 14:01:26', 19, '2020-03-21 14:01:26', 19),
	(283, 181, 181, 1, 2.80, 0.00, 100.00, 0, NULL, 1, 0.00, '[]', '2020-03-21 14:01:33', 19, '2020-03-21 14:01:33', 19),
	(284, 182, 159, 1, 2.80, 0.00, 100.00, 0, NULL, 1, 0.00, '[]', '2020-03-21 14:09:43', 19, '2020-03-21 14:09:43', 19),
	(285, 183, 176, 1, 0.75, 0.00, 0.00, 0, NULL, 0, NULL, NULL, '2020-03-21 14:34:12', 19, '2020-03-21 14:34:12', 19),
	(286, 183, 176, 7, 0.75, 0.00, 100.00, 0, NULL, 1, 0.00, '[]', '2020-03-21 14:34:21', 19, '2020-03-21 14:34:21', 19),
	(287, 184, 159, 1, 2.80, 0.00, 20.00, 0, NULL, 1, 0.00, '[]', '2020-03-21 14:39:27', 19, '2020-03-21 14:39:27', 19),
	(288, 185, 157, 1, 2.80, 0.00, 0.00, 0, NULL, 0, NULL, NULL, '2020-03-21 15:27:17', 19, '2020-03-21 15:27:17', 19),
	(289, 185, 136, 1, 2.50, 0.00, 20.00, 0, NULL, 0, NULL, NULL, '2020-03-21 15:35:51', 19, '2020-03-21 15:35:51', 19),
	(290, 185, 109, 2, 2.50, 0.00, 20.00, 0, NULL, 0, NULL, NULL, '2020-03-21 15:39:56', 19, '2020-03-21 15:39:56', 19),
	(291, 185, 154, 1, 2.90, 0.00, 0.00, 0, NULL, 0, NULL, NULL, '2020-03-21 15:42:18', 19, '2020-03-21 15:42:18', 19),
	(292, 186, 150, 1, 2.50, 0.00, 0.00, 0, NULL, 0, NULL, NULL, '2020-03-21 15:42:40', 19, '2020-03-21 15:42:40', 19),
	(293, 186, 109, 1, 2.50, 0.00, 50.00, 0, NULL, 0, NULL, NULL, '2020-03-21 15:46:33', 19, '2020-03-21 15:46:33', 19),
	(294, 185, 109, 1, 2.50, 0.00, 0.00, 0, NULL, 0, NULL, NULL, '2020-03-21 15:47:34', 19, '2020-03-21 15:47:34', 19),
	(295, 186, 109, 1, 2.50, 0.00, 0.00, 0, NULL, 0, NULL, NULL, '2020-03-21 15:48:14', 19, '2020-03-21 15:48:14', 19),
	(296, 187, 109, 1, 2.50, 0.00, 0.00, 0, NULL, 1, 0.00, '[]', '2020-03-21 15:48:30', 19, '2020-03-21 15:48:30', 19),
	(297, 185, 192, 1, 3.00, 0.00, 20.00, 1, NULL, 1, 0.00, '[]', '2020-03-21 15:55:23', 19, '2020-03-21 15:55:23', 19),
	(298, 185, 119, 1, 2.50, 0.00, 20.00, 1, NULL, 1, 0.00, '[]', '2020-03-21 16:05:38', 19, '2020-03-21 16:05:38', 19),
	(299, 186, 206, 2, 3.75, 0.00, 20.00, 1, NULL, 1, 0.00, '[]', '2020-03-21 17:20:58', 19, '2020-03-21 17:20:58', 19),
	(300, 186, 207, 1, 3.50, 0.00, 0.00, 0, NULL, 0, NULL, NULL, '2020-03-21 17:25:42', 19, '2020-03-21 17:25:42', 19),
	(301, 185, 206, 1, 3.75, 0.00, 20.00, 1, NULL, 1, 0.00, '[]', '2020-03-21 17:44:20', 19, '2020-03-21 17:44:20', 19),
	(302, 185, 207, 1, 3.50, 0.00, 20.00, 1, NULL, 1, 0.00, '[]', '2020-03-21 17:44:29', 19, '2020-03-21 17:44:29', 19),
	(303, 188, 205, 1, 3.75, 0.00, 100.00, 1, NULL, 1, 0.00, '[]', '2020-03-21 17:52:18', 19, '2020-03-21 17:52:18', 19),
	(304, 189, 207, 1, 3.50, 0.00, 20.00, 0, NULL, 1, 0.00, '[]', '2020-03-21 19:02:17', 19, '2020-03-21 19:02:17', 19),
	(305, 190, 217, 1, 1.00, 0.00, 50.00, 0, NULL, 1, 0.00, '[]', '2020-03-22 07:35:20', 19, '2020-03-22 07:35:20', 19),
	(306, 191, 187, 1, 1.00, 0.00, 50.00, 0, NULL, 1, 0.00, '[]', '2020-03-22 08:14:23', 19, '2020-03-22 08:14:23', 19),
	(307, 192, 187, 2, 1.00, 0.00, 50.00, 0, NULL, 1, 0.00, '[]', '2020-03-22 08:19:13', 19, '2020-03-22 08:19:13', 19),
	(308, 193, 145, 1, 2.20, 0.00, 50.00, 0, NULL, 1, 0.00, '[]', '2020-03-22 08:41:14', 19, '2020-03-22 08:41:14', 19),
	(309, 193, 183, 1, 1.00, 0.00, 50.00, 0, NULL, 1, 0.00, '[]', '2020-03-22 08:41:19', 19, '2020-03-22 08:41:19', 19),
	(310, 193, 187, 1, 1.00, 0.00, 50.00, 0, NULL, 1, 0.00, '[]', '2020-03-22 08:41:19', 19, '2020-03-22 08:41:19', 19),
	(311, 194, 181, 1, 2.80, 0.00, 0.00, 0, NULL, 1, 0.00, '[]', '2020-03-22 09:15:49', 19, '2020-03-22 09:15:49', 19),
	(312, 195, 183, 1, 1.00, 0.00, 50.00, 0, NULL, 1, 0.00, '[]', '2020-03-22 09:29:07', 19, '2020-03-22 09:29:07', 19),
	(313, 196, 208, 1, 2.80, 0.00, 0.00, 0, NULL, 1, 0.00, '[]', '2020-03-22 10:38:38', 19, '2020-03-22 10:38:38', 19),
	(314, 196, 147, 1, 2.50, 0.00, 0.00, 0, NULL, 1, 0.00, '[]', '2020-03-22 10:45:56', 19, '2020-03-22 10:45:56', 19),
	(315, 197, 164, 1, 2.00, 0.00, 0.00, 0, NULL, 1, 0.00, '[]', '2020-03-22 11:06:39', 19, '2020-03-22 11:06:39', 19),
	(316, 198, 206, 1, 3.75, 0.00, 100.00, 1, NULL, 1, 0.00, '[]', '2020-03-22 12:20:08', 19, '2020-03-22 12:20:08', 19),
	(317, 199, 151, 1, 2.90, 0.00, 50.00, 0, NULL, 1, 0.00, '[]', '2020-03-22 12:36:39', 19, '2020-03-22 12:36:39', 19),
	(318, 200, 169, 1, 2.50, 0.00, 50.00, 0, NULL, 1, 0.00, '[]', '2020-03-22 12:46:21', 19, '2020-03-22 12:46:21', 19),
	(319, 201, 169, 1, 2.50, 0.00, 0.00, 0, NULL, 1, 0.00, '[]', '2020-03-22 13:42:27', 19, '2020-03-22 13:42:27', 19),
	(320, 202, 147, 1, 2.50, 0.00, 0.00, 0, NULL, 1, 0.00, '[]', '2020-03-22 14:57:13', 19, '2020-03-22 14:57:13', 19),
	(321, 203, 147, 1, 2.50, 0.00, 0.00, 0, NULL, 1, 0.00, '[]', '2020-03-22 15:27:26', 19, '2020-03-22 15:27:26', 19),
	(322, 204, 147, 1, 2.50, 0.00, 0.00, 0, NULL, 1, 0.00, '[]', '2020-03-22 15:34:40', 19, '2020-03-22 15:34:40', 19),
	(323, 205, 164, 1, 2.00, 0.00, 50.00, 0, NULL, 1, 0.00, '[]', '2020-03-22 15:48:47', 19, '2020-03-22 15:48:47', 19),
	(324, 206, 138, 1, 2.50, 0.00, 0.00, 0, NULL, 1, 0.00, '[]', '2020-03-22 16:29:57', 19, '2020-03-22 16:29:57', 19),
	(325, 207, 147, 1, 2.50, 0.00, 0.00, 0, NULL, 1, 0.00, '[]', '2020-03-22 16:54:16', 19, '2020-03-22 16:54:16', 19),
	(326, 208, 206, 1, 3.75, 0.00, 0.00, 1, NULL, 1, 0.00, '[]', '2020-03-22 17:27:55', 19, '2020-03-22 17:27:55', 19),
	(327, 208, 217, 1, 1.00, 0.00, 0.00, 0, NULL, 0, NULL, NULL, '2020-03-22 17:31:15', 19, '2020-03-22 17:31:15', 19),
	(328, 209, 217, 1, 1.00, 0.00, 50.00, 0, NULL, 1, 0.00, '[]', '2020-03-22 17:31:38', 19, '2020-03-22 17:31:38', 19),
	(329, 210, 210, 1, 3.50, 0.00, 0.00, 0, NULL, 0, NULL, NULL, '2020-03-23 06:57:56', 19, '2020-03-23 06:57:56', 19),
	(330, 210, 205, 1, 3.75, 0.00, 0.00, 1, NULL, 1, 0.00, '[]', '2020-03-23 06:58:06', 19, '2020-03-23 06:58:06', 19),
	(331, 210, 86, 1, 1.90, 0.00, 0.00, 0, NULL, 1, 0.00, '[]', '2020-03-23 06:58:16', 19, '2020-03-23 06:58:16', 19),
	(332, 211, 205, 1, 3.75, 0.00, 0.00, 0, NULL, 0, NULL, NULL, '2020-03-23 07:36:58', 19, '2020-03-23 07:36:58', 19),
	(333, 211, 86, 1, 1.90, 0.00, 0.00, 0, NULL, 0, NULL, NULL, '2020-03-23 07:37:53', 19, '2020-03-23 07:37:53', 19),
	(334, 211, 217, 1, 1.00, 0.00, 50.00, 0, NULL, 1, 0.00, '[]', '2020-03-23 07:57:54', 19, '2020-03-23 07:57:54', 19),
	(335, 212, 183, 3, 1.00, 0.00, 50.00, 0, NULL, 1, 0.00, '[]', '2020-03-23 08:15:01', 19, '2020-03-23 08:15:01', 19),
	(336, 213, 145, 1, 2.20, 0.00, 50.00, 0, NULL, 0, NULL, NULL, '2020-03-23 08:17:44', 19, '2020-03-23 08:17:44', 19),
	(337, 213, 145, 1, 2.20, 0.00, 50.00, 0, NULL, 1, 0.00, '[]', '2020-03-23 08:18:35', 19, '2020-03-23 08:18:35', 19),
	(338, 214, 183, 1, 1.00, 0.00, 50.00, 0, NULL, 1, 0.00, '[]', '2020-03-23 08:19:17', 19, '2020-03-23 08:19:17', 19),
	(339, 215, 146, 1, 2.50, 0.00, 0.00, 0, NULL, 0, NULL, NULL, '2020-03-23 08:28:33', 19, '2020-03-23 08:28:33', 19),
	(340, 215, 147, 1, 2.50, 0.00, 0.00, 0, NULL, 1, 0.00, '[]', '2020-03-23 08:28:39', 19, '2020-03-23 08:28:39', 19),
	(341, 216, 157, 1, 2.80, 0.00, 0.00, 0, NULL, 0, NULL, NULL, '2020-03-23 08:36:15', 19, '2020-03-23 08:36:15', 19),
	(342, 216, 92, 1, 2.30, 0.00, 0.00, 0, NULL, 1, 0.00, '[]', '2020-03-23 08:36:46', 19, '2020-03-23 08:36:46', 19),
	(343, 217, 183, 1, 1.00, 0.00, 50.00, 0, NULL, 1, 0.00, '[]', '2020-03-23 08:44:10', 19, '2020-03-23 08:44:10', 19),
	(344, 218, 183, 1, 1.00, 0.00, 50.00, 0, NULL, 1, 0.00, '[]', '2020-03-23 08:46:30', 19, '2020-03-23 08:46:30', 19),
	(345, 219, 119, 1, 2.50, 0.00, 50.00, 0, NULL, 1, 0.00, '[]', '2020-03-23 09:20:50', 19, '2020-03-23 09:20:50', 19),
	(346, 220, 126, 1, 2.80, 0.00, 0.00, 0, NULL, 0, NULL, NULL, '2020-03-23 09:29:11', 19, '2020-03-23 09:29:11', 19),
	(347, 220, 208, 1, 2.80, 0.00, 100.00, 0, NULL, 1, 0.00, '[]', '2020-03-23 09:29:29', 19, '2020-03-23 09:29:29', 19),
	(348, 221, 164, 1, 2.00, 0.00, 0.00, 0, NULL, 1, 0.00, '[]', '2020-03-23 11:14:30', 19, '2020-03-23 11:14:30', 19),
	(349, 222, 111, 1, 2.50, 0.00, 100.00, 0, NULL, 1, 0.00, '[]', '2020-03-23 12:11:05', 19, '2020-03-23 12:11:05', 19),
	(350, 223, 145, 1, 2.20, 0.00, 0.00, 0, NULL, 1, 0.00, '[]', '2020-03-23 12:22:11', 19, '2020-03-23 12:22:11', 19),
	(351, 224, 151, 1, 2.90, 0.00, 50.00, 0, NULL, 1, 0.00, '[]', '2020-03-23 13:26:09', 19, '2020-03-23 13:26:09', 19),
	(352, 225, 149, 2, 2.50, 0.00, 0.00, 0, NULL, 1, 0.00, '[]', '2020-03-23 13:43:12', 19, '2020-03-23 13:43:12', 19),
	(353, 225, 181, 1, 2.80, 0.00, 0.00, 0, NULL, 1, 0.00, '[]', '2020-03-23 13:44:28', 19, '2020-03-23 13:44:28', 19),
	(354, 226, 145, 1, 2.20, 0.00, 50.00, 0, NULL, 1, 0.00, '[]', '2020-03-23 13:48:35', 19, '2020-03-23 13:48:35', 19),
	(355, 227, 217, 2, 1.00, 0.00, 50.00, 0, NULL, 1, 0.00, '[]', '2020-03-23 14:02:28', 19, '2020-03-23 14:02:28', 19),
	(356, 228, 217, 1, 1.00, 0.00, 50.00, 0, NULL, 1, 0.00, '[]', '2020-03-23 14:06:21', 19, '2020-03-23 14:06:21', 19),
	(357, 229, 217, 1, 1.00, 0.00, 50.00, 0, NULL, 1, 0.00, '[]', '2020-03-23 14:15:08', 19, '2020-03-23 14:15:08', 19),
	(358, 230, 217, 1, 1.00, 0.00, 50.00, 0, NULL, 1, 0.00, '[]', '2020-03-23 14:42:39', 19, '2020-03-23 14:42:39', 19),
	(359, 231, 217, 1, 1.00, 0.00, 50.00, 0, NULL, 1, 0.00, '[]', '2020-03-23 14:50:09', 19, '2020-03-23 14:50:09', 19),
	(360, 232, 147, 1, 2.50, 0.00, 0.00, 0, NULL, 1, 0.00, '[]', '2020-03-23 14:52:56', 19, '2020-03-23 14:52:56', 19),
	(361, 233, 183, 1, 1.00, 0.00, 50.00, 0, NULL, 1, 0.00, '[]', '2020-03-23 15:23:52', 19, '2020-03-23 15:23:52', 19),
	(362, 234, 207, 1, 3.50, 0.00, 20.00, 1, NULL, 1, 0.00, '[]', '2020-03-23 17:15:41', 19, '2020-03-23 17:15:41', 19),
	(363, 235, 136, 1, 2.50, 0.00, 20.00, 0, NULL, 1, 0.00, '[]', '2020-03-23 17:36:05', 19, '2020-03-23 17:36:05', 19),
	(364, 236, 145, 1, 2.20, 0.00, 50.00, 0, NULL, 1, 0.00, '[]', '2020-03-24 07:32:01', 19, '2020-03-24 07:32:01', 19),
	(365, 237, 188, 1, 1.00, 0.00, 50.00, 0, NULL, 1, 0.00, '[]', '2020-03-24 07:41:54', 19, '2020-03-24 07:41:54', 19),
	(366, 237, 184, 2, 1.00, 0.00, 50.00, 0, NULL, 1, 0.00, '[]', '2020-03-24 07:44:18', 19, '2020-03-24 07:44:18', 19),
	(367, 238, 217, 1, 1.00, 0.00, 50.00, 0, NULL, 1, 0.00, '[]', '2020-03-24 07:51:32', 19, '2020-03-24 07:51:32', 19),
	(368, 239, 217, 1, 1.00, 0.00, 50.00, 0, NULL, 1, 0.00, '[]', '2020-03-24 08:03:32', 19, '2020-03-24 08:03:32', 19),
	(369, 240, 159, 1, 2.80, 0.00, 100.00, 0, NULL, 1, 0.00, '[]', '2020-03-24 08:16:11', 19, '2020-03-24 08:16:11', 19),
	(370, 241, 188, 1, 1.00, 0.00, 50.00, 0, NULL, 1, 0.00, '[]', '2020-03-24 08:23:12', 19, '2020-03-24 08:23:12', 19),
	(371, 242, 188, 1, 1.00, 0.00, 50.00, 0, NULL, 1, 0.00, '[]', '2020-03-24 08:28:06', 19, '2020-03-24 08:28:06', 19),
	(372, 243, 188, 2, 1.00, 0.00, 50.00, 0, NULL, 1, 0.00, '[]', '2020-03-24 08:32:50', 19, '2020-03-24 08:32:50', 19),
	(373, 244, 151, 1, 2.90, 0.00, 50.00, 0, NULL, 1, 0.00, '[]', '2020-03-24 08:54:46', 19, '2020-03-24 08:54:46', 19),
	(374, 245, 212, 1, 4.00, 0.00, 0.00, 1, NULL, 1, 0.00, '[]', '2020-03-24 09:27:55', 19, '2020-03-24 09:27:55', 19),
	(375, 245, 86, 1, 1.90, 0.00, 0.00, 0, NULL, 0, NULL, NULL, '2020-03-24 09:30:31', 19, '2020-03-24 09:30:31', 19),
	(376, 245, 91, 1, 2.30, 0.00, 0.00, 0, NULL, 1, 0.00, '[]', '2020-03-24 09:36:50', 19, '2020-03-24 09:36:50', 19),
	(377, 246, 147, 1, 2.50, 0.00, 0.00, 0, NULL, 1, 0.00, '[]', '2020-03-24 09:37:08', 19, '2020-03-24 09:37:08', 19),
	(378, 247, 147, 1, 2.50, 0.00, 0.00, 0, NULL, 1, 0.00, '[]', '2020-03-24 09:58:43', 19, '2020-03-24 09:58:43', 19),
	(379, 248, 208, 1, 2.80, 0.00, 50.00, 0, NULL, 1, 0.00, '[]', '2020-03-24 10:03:54', 19, '2020-03-24 10:03:54', 19),
	(380, 249, 147, 1, 2.50, 0.00, 0.00, 0, NULL, 1, 0.00, '[]', '2020-03-24 10:14:54', 19, '2020-03-24 10:14:54', 19),
	(381, 250, 147, 1, 2.50, 0.00, 0.00, 0, NULL, 1, 0.00, '[]', '2020-03-24 10:26:38', 19, '2020-03-24 10:26:38', 19),
	(382, 251, 87, 1, 2.30, 0.00, 0.00, 0, NULL, 1, 0.00, '[]', '2020-03-24 10:57:46', 19, '2020-03-24 10:57:46', 19),
	(383, 251, 217, 1, 1.00, 0.00, 0.00, 0, NULL, 1, 0.00, '[]', '2020-03-24 10:57:51', 19, '2020-03-24 10:57:51', 19),
	(384, 252, 191, 1, 1.00, 0.00, 0.00, 0, NULL, 0, NULL, NULL, '2020-03-24 11:53:03', 19, '2020-03-24 11:53:03', 19),
	(385, 252, 188, 1, 1.00, 0.00, 50.00, 0, NULL, 1, 0.00, '[]', '2020-03-24 11:53:08', 19, '2020-03-24 11:53:08', 19),
	(386, 253, 206, 1, 3.75, 0.00, 0.00, 1, NULL, 1, 0.00, '[]', '2020-03-24 11:55:21', 19, '2020-03-24 11:55:21', 19),
	(387, 253, 205, 2, 3.75, 0.00, 0.00, 2, NULL, 1, 0.00, '[]', '2020-03-24 11:57:13', 19, '2020-03-24 11:57:13', 19),
	(388, 254, 88, 1, 1.50, 0.00, 0.00, 0, NULL, 0, NULL, NULL, '2020-03-24 12:08:02', 19, '2020-03-24 12:08:02', 19),
	(389, 254, 164, 1, 2.00, 0.00, 0.00, 0, NULL, 1, 0.00, '[]', '2020-03-24 12:08:19', 19, '2020-03-24 12:08:19', 19),
	(390, 255, 183, 1, 1.00, 0.00, 50.00, 0, NULL, 1, 0.00, '[]', '2020-03-24 12:20:16', 19, '2020-03-24 12:20:16', 19),
	(391, 255, 188, 1, 1.00, 0.00, 50.00, 0, NULL, 1, 0.00, '[]', '2020-03-24 12:20:56', 19, '2020-03-24 12:20:56', 19),
	(392, 253, 136, 3, 2.50, 0.00, 0.00, 0, NULL, 1, 0.00, '[]', '2020-03-24 12:33:51', 19, '2020-03-24 12:33:51', 19),
	(393, 256, 205, 1, 3.75, 0.00, 100.00, 0, NULL, 1, 0.00, '[]', '2020-03-24 12:53:34', 19, '2020-03-24 12:53:34', 19),
	(394, 256, 124, 1, 2.90, 0.00, 100.00, 0, NULL, 1, 0.00, '[]', '2020-03-24 12:54:09', 19, '2020-03-24 12:54:09', 19),
	(395, 257, 206, 1, 3.75, 0.00, 0.00, 1, NULL, 0, NULL, NULL, '2020-03-24 13:02:29', 19, '2020-03-24 13:02:29', 19),
	(396, 258, 222, 2, 1.20, 0.00, 0.00, 0, NULL, 1, 0.00, '[]', '2020-03-24 13:32:36', 19, '2020-03-24 13:32:36', 19),
	(397, 258, 147, 1, 2.50, 0.00, 0.00, 0, NULL, 1, 0.00, '[]', '2020-03-24 13:32:43', 19, '2020-03-24 13:32:43', 19),
	(398, 257, 147, 1, 2.50, 0.00, 0.00, 0, NULL, 1, 0.00, '[]', '2020-03-24 13:43:44', 19, '2020-03-24 13:43:44', 19),
	(399, 259, 136, 1, 2.50, 0.00, 100.00, 0, NULL, 1, 0.00, '[]', '2020-03-24 14:21:36', 19, '2020-03-24 14:21:36', 19),
	(400, 260, 154, 1, 2.90, 0.00, 0.00, 0, NULL, 1, 0.00, '[]', '2020-03-24 14:41:09', 19, '2020-03-24 14:41:09', 19),
	(401, 260, 128, 1, 2.80, 0.00, 0.00, 0, NULL, 1, 0.00, '[]', '2020-03-24 14:41:32', 19, '2020-03-24 14:41:32', 19),
	(402, 260, 129, 1, 2.80, 0.00, 0.00, 0, NULL, 1, 0.00, '[]', '2020-03-24 14:41:59', 19, '2020-03-24 14:41:59', 19),
	(403, 260, 159, 1, 2.80, 0.00, 0.00, 0, NULL, 1, 0.00, '[]', '2020-03-24 14:42:12', 19, '2020-03-24 14:42:12', 19),
	(404, 261, 153, 1, 2.90, 0.00, 100.00, 0, NULL, 1, 0.00, '[]', '2020-03-24 14:42:43', 19, '2020-03-24 14:42:43', 19),
	(405, 262, 184, 1, 1.00, 0.00, 50.00, 0, NULL, 1, 0.00, '[]', '2020-03-24 15:17:43', 19, '2020-03-24 15:17:43', 19),
	(406, 263, 126, 1, 2.80, 0.00, 100.00, 0, NULL, 1, 0.00, '[]', '2020-03-24 15:20:39', 19, '2020-03-24 15:20:39', 19),
	(407, 264, 184, 3, 1.00, 0.00, 50.00, 0, NULL, 1, 0.00, '[]', '2020-03-24 17:32:30', 19, '2020-03-24 17:32:30', 19),
	(408, 265, 145, 1, 2.20, 0.00, 50.00, 0, NULL, 1, 0.00, '[]', '2020-03-25 07:19:51', 19, '2020-03-25 07:19:51', 19),
	(409, 266, 183, 1, 1.00, 0.00, 0.00, 0, NULL, 0, NULL, NULL, '2020-03-25 07:23:04', 19, '2020-03-25 07:23:04', 19),
	(410, 266, 184, 1, 1.00, 0.00, 50.00, 0, NULL, 1, 0.00, '[]', '2020-03-25 07:23:13', 19, '2020-03-25 07:23:13', 19),
	(411, 267, 188, 1, 1.00, 0.00, 50.00, 0, NULL, 1, 0.00, '[]', '2020-03-25 07:48:21', 19, '2020-03-25 07:48:21', 19),
	(412, 268, 208, 1, 2.80, 0.00, 100.00, 0, NULL, 1, 0.00, '[]', '2020-03-25 07:55:55', 19, '2020-03-25 07:55:55', 19),
	(413, 269, 217, 1, 1.00, 0.00, 50.00, 0, NULL, 1, 0.00, '[]', '2020-03-25 08:14:12', 19, '2020-03-25 08:14:12', 19),
	(414, 270, 184, 1, 1.00, 0.00, 50.00, 0, NULL, 1, 0.00, '[]', '2020-03-25 08:14:47', 19, '2020-03-25 08:14:47', 19),
	(415, 271, 89, 1, 2.30, 0.00, 0.00, 0, NULL, 1, 0.00, '[]', '2020-03-25 08:30:18', 19, '2020-03-25 08:30:18', 19),
	(416, 272, 217, 1, 1.00, 0.00, 50.00, 0, NULL, 1, 0.00, '[]', '2020-03-25 08:33:49', 19, '2020-03-25 08:33:49', 19),
	(417, 273, 169, 1, 2.50, 0.00, 50.00, 0, NULL, 1, 0.00, '[]', '2020-03-25 08:39:32', 19, '2020-03-25 08:39:32', 19),
	(418, 274, 188, 1, 1.00, 0.00, 50.00, 0, NULL, 1, 0.00, '[]', '2020-03-25 08:43:34', 19, '2020-03-25 08:43:34', 19),
	(419, 275, 164, 1, 2.00, 0.00, 0.00, 1, NULL, 1, 0.00, '[]', '2020-03-25 08:52:29', 19, '2020-03-25 08:52:29', 19),
	(420, 275, 206, 1, 3.75, 0.00, 0.00, 1, NULL, 1, 0.00, '[]', '2020-03-25 08:58:10', 19, '2020-03-25 08:58:10', 19),
	(421, 276, 184, 2, 1.00, 0.00, 50.00, 0, NULL, 1, 0.00, '[]', '2020-03-25 09:25:02', 19, '2020-03-25 09:25:02', 19),
	(422, 277, 184, 2, 1.00, 0.00, 50.00, 0, NULL, 1, 0.00, '[]', '2020-03-25 09:29:17', 19, '2020-03-25 09:29:17', 19),
	(423, 277, 188, 1, 1.00, 0.00, 50.00, 0, NULL, 1, 0.00, '[]', '2020-03-25 09:29:19', 19, '2020-03-25 09:29:19', 19),
	(424, 278, 184, 1, 1.00, 0.00, 50.00, 0, NULL, 1, 0.00, '[]', '2020-03-25 09:30:25', 19, '2020-03-25 09:30:25', 19),
	(425, 279, 154, 1, 2.90, 0.00, 20.00, 0, NULL, 1, 0.00, '[]', '2020-03-25 09:39:45', 19, '2020-03-25 09:39:45', 19),
	(426, 280, 206, 4, 3.75, 0.00, 20.00, 0, NULL, 0, NULL, NULL, '2020-03-25 11:43:45', 19, '2020-03-25 11:43:45', 19),
	(427, 280, 216, 7, 3.50, 0.00, 20.00, 0, NULL, 0, NULL, NULL, '2020-03-25 11:44:15', 19, '2020-03-25 11:44:15', 19),
	(428, 280, 216, 7, 3.50, 0.00, 20.00, 0, NULL, 1, 0.00, '[]', '2020-03-25 11:45:03', 19, '2020-03-25 11:45:03', 19),
	(429, 280, 206, 4, 3.75, 0.00, 20.00, 0, NULL, 1, 0.00, '[]', '2020-03-25 11:45:08', 19, '2020-03-25 11:45:08', 19),
	(430, 281, 128, 1, 2.80, 0.00, 100.00, 0, NULL, 1, 0.00, '[]', '2020-03-25 12:11:24', 19, '2020-03-25 12:11:24', 19),
	(431, 282, 188, 2, 1.00, 0.00, 50.00, 0, NULL, 1, 0.00, '[]', '2020-03-25 13:18:55', 19, '2020-03-25 13:18:55', 19),
	(432, 283, 221, 1, 1.80, 0.00, 50.00, 0, NULL, 1, 0.00, '[]', '2020-03-25 13:22:21', 19, '2020-03-25 13:22:21', 19),
	(433, 284, 184, 1, 1.00, 0.00, 50.00, 0, NULL, 1, 0.00, '[]', '2020-03-25 13:30:59', 19, '2020-03-25 13:30:59', 19),
	(434, 285, 188, 1, 1.00, 0.00, 50.00, 0, NULL, 1, 0.00, '[]', '2020-03-25 15:30:27', 19, '2020-03-25 15:30:27', 19),
	(435, 286, 225, 1, 0.75, 0.00, 0.00, 0, NULL, 1, 0.00, '[]', '2020-03-25 16:17:55', 19, '2020-03-25 16:17:55', 19),
	(436, 287, 126, 1, 2.80, 0.00, 100.00, 0, NULL, 1, 0.00, '[]', '2020-03-25 17:21:34', 19, '2020-03-25 17:21:34', 19),
	(437, 288, 207, 1, 3.50, 0.00, 0.00, 1, NULL, 1, 0.00, '[]', '2020-03-26 07:25:46', 19, '2020-03-26 07:25:46', 19),
	(438, 288, 205, 1, 3.75, 0.00, 0.00, 1, NULL, 1, 0.00, '[]', '2020-03-26 07:25:59', 19, '2020-03-26 07:25:59', 19),
	(439, 289, 151, 1, 2.90, 0.00, 50.00, 0, NULL, 1, 0.00, '[]', '2020-03-26 08:40:22', 19, '2020-03-26 08:40:22', 19),
	(440, 290, 168, 1, 2.50, 0.00, 50.00, 0, NULL, 1, 0.00, '[]', '2020-03-26 08:45:47', 19, '2020-03-26 08:45:47', 19),
	(441, 291, 183, 1, 1.00, 0.00, 50.00, 0, NULL, 1, 0.00, '[]', '2020-03-26 09:13:42', 19, '2020-03-26 09:13:42', 19),
	(442, 291, 187, 1, 1.00, 0.00, 50.00, 0, NULL, 1, 0.00, '[]', '2020-03-26 09:13:55', 19, '2020-03-26 09:13:55', 19),
	(443, 292, 184, 1, 1.00, 0.00, 0.00, 0, NULL, 0, NULL, NULL, '2020-03-26 09:35:58', 19, '2020-03-26 09:35:58', 19),
	(444, 293, 184, 2, 1.00, 0.00, 50.00, 0, NULL, 1, 0.00, '[]', '2020-03-26 09:40:47', 19, '2020-03-26 09:40:47', 19),
	(445, 292, 147, 1, 2.50, 0.00, 100.00, 0, NULL, 1, 0.00, '[]', '2020-03-26 09:59:02', 19, '2020-03-26 09:59:02', 19),
	(446, 294, 165, 1, 2.30, 0.00, 100.00, 0, NULL, 1, 0.00, '[]', '2020-03-26 11:12:26', 19, '2020-03-26 11:12:26', 19),
	(447, 295, 152, 1, 2.90, 0.00, 0.00, 0, NULL, 1, 0.00, '[]', '2020-03-26 11:28:56', 19, '2020-03-26 11:28:56', 19),
	(448, 296, 136, 1, 2.50, 0.00, 100.00, 0, NULL, 1, 0.00, '[]', '2020-03-26 12:00:19', 19, '2020-03-26 12:00:19', 19),
	(449, 297, 88, 1, 1.50, 0.00, 0.00, 0, NULL, 1, 0.00, '[]', '2020-03-26 13:15:59', 19, '2020-03-26 13:15:59', 19),
	(450, 293, 217, 2, 1.00, 0.00, 50.00, 0, NULL, 1, 0.00, '[]', '2020-03-26 14:35:44', 19, '2020-03-26 14:35:44', 19),
	(451, 293, 188, 1, 1.00, 0.00, 50.00, 0, NULL, 1, 0.00, '[]', '2020-03-26 14:35:57', 19, '2020-03-26 14:35:57', 19),
	(452, 293, 190, 1, 1.00, 0.00, 50.00, 0, NULL, 1, 0.00, '[]', '2020-03-26 14:36:02', 19, '2020-03-26 14:36:02', 19),
	(453, 298, 152, 1, 2.90, 0.00, 0.00, 0, NULL, 1, 0.00, '[]', '2020-03-26 14:36:27', 19, '2020-03-26 14:36:27', 19),
	(454, 298, 154, 1, 2.90, 0.00, 0.00, 0, NULL, 1, 0.00, '[]', '2020-03-26 14:36:41', 19, '2020-03-26 14:36:41', 19),
	(455, 299, 190, 3, 1.00, 0.00, 50.00, 0, NULL, 1, 0.00, '[]', '2020-03-26 15:08:47', 19, '2020-03-26 15:08:47', 19),
	(456, 299, 184, 1, 1.00, 0.00, 100.00, 0, NULL, 1, 0.00, '[]', '2020-03-26 15:22:53', 19, '2020-03-26 15:22:53', 19),
	(457, 299, 188, 1, 1.00, 0.00, 50.00, 0, NULL, 1, 0.00, '[]', '2020-03-26 15:22:55', 19, '2020-03-26 15:22:55', 19),
	(458, 300, 192, 1, 3.00, 0.00, 0.00, 0, NULL, 0, NULL, NULL, '2020-03-26 15:43:55', 19, '2020-03-26 15:43:55', 19),
	(459, 300, 184, 1, 1.00, 0.00, 50.00, 0, NULL, 1, 0.00, '[]', '2020-03-27 07:33:38', 19, '2020-03-27 07:33:38', 19),
	(460, 301, 147, 1, 2.50, 0.00, 0.00, 0, NULL, 1, 0.00, '[]', '2020-03-27 07:38:59', 19, '2020-03-27 07:38:59', 19),
	(461, 302, 176, 1, 0.75, 0.00, 0.00, 0, NULL, 1, 0.00, '[]', '2020-03-27 07:40:08', 19, '2020-03-27 07:40:08', 19),
	(462, 303, 136, 1, 2.50, 0.00, 0.00, 0, NULL, 1, 0.00, '[]', '2020-03-27 07:56:54', 19, '2020-03-27 07:56:54', 19),
	(463, 304, 190, 1, 1.00, 0.00, 50.00, 0, NULL, 1, 0.00, '[]', '2020-03-27 08:23:16', 19, '2020-03-27 08:23:16', 19),
	(464, 305, 188, 1, 1.00, 0.00, 50.00, 0, NULL, 1, 0.00, '[]', '2020-03-27 08:23:42', 19, '2020-03-27 08:23:42', 19),
	(465, 306, 145, 1, 2.20, 0.00, 50.00, 0, NULL, 1, 0.00, '[]', '2020-03-27 08:26:25', 19, '2020-03-27 08:26:25', 19),
	(466, 307, 190, 1, 1.00, 0.00, 50.00, 0, NULL, 1, 0.00, '[]', '2020-03-27 08:28:10', 19, '2020-03-27 08:28:10', 19),
	(467, 308, 183, 1, 1.00, 0.00, 50.00, 0, NULL, 1, 0.00, '[]', '2020-03-27 08:28:54', 19, '2020-03-27 08:28:54', 19),
	(468, 309, 113, 1, 2.50, 0.00, 100.00, 0, NULL, 1, 0.00, '[]', '2020-03-27 08:33:47', 19, '2020-03-27 08:33:47', 19),
	(469, 310, 145, 1, 2.20, 0.00, 0.00, 0, NULL, 1, 0.00, '[]', '2020-03-27 08:39:51', 19, '2020-03-27 08:39:51', 19),
	(470, 311, 188, 1, 1.00, 0.00, 50.00, 0, NULL, 1, 0.00, '[]', '2020-03-27 08:42:10', 19, '2020-03-27 08:42:10', 19),
	(471, 312, 181, 1, 2.80, 0.00, 50.00, 0, NULL, 1, 0.00, '[]', '2020-03-27 08:54:22', 19, '2020-03-27 08:54:22', 19),
	(472, 313, 188, 2, 1.00, 0.00, 50.00, 0, NULL, 1, 0.00, '[]', '2020-03-27 09:06:15', 19, '2020-03-27 09:06:15', 19),
	(473, 314, 190, 1, 1.00, 0.00, 50.00, 0, NULL, 1, 0.00, '[]', '2020-03-27 09:12:36', 19, '2020-03-27 09:12:36', 19),
	(474, 315, 181, 1, 2.80, 0.00, 0.00, 0, NULL, 1, 0.00, '[]', '2020-03-27 09:23:25', 19, '2020-03-27 09:23:25', 19),
	(475, 316, 159, 1, 2.80, 0.00, 0.00, 0, NULL, 1, 0.00, '[]', '2020-03-27 10:10:12', 19, '2020-03-27 10:10:12', 19),
	(476, 317, 152, 1, 2.90, 0.00, 0.00, 0, NULL, 1, 0.00, '[]', '2020-03-27 10:17:36', 19, '2020-03-27 10:17:36', 19),
	(477, 318, 154, 1, 2.90, 0.00, 0.00, 0, NULL, 1, 0.00, '[]', '2020-03-27 10:30:59', 19, '2020-03-27 10:30:59', 19),
	(478, 319, 149, 1, 2.50, 0.00, 0.00, 0, NULL, 1, 0.00, '[]', '2020-03-27 12:44:38', 19, '2020-03-27 12:44:38', 19),
	(479, 320, 185, 1, 1.00, 0.00, 50.00, 0, NULL, 1, 0.00, '[]', '2020-03-27 12:47:57', 19, '2020-03-27 12:47:57', 19),
	(480, 321, 184, 2, 1.00, 0.00, 0.00, 0, NULL, 0, NULL, NULL, '2020-03-27 13:23:02', 19, '2020-03-27 13:23:02', 19),
	(481, 321, 184, 1, 1.00, 0.00, 0.00, 0, NULL, 0, NULL, NULL, '2020-03-27 13:23:08', 19, '2020-03-27 13:23:08', 19),
	(482, 321, 183, 2, 1.00, 0.00, 50.00, 0, NULL, 1, 0.00, '[]', '2020-03-27 13:23:15', 19, '2020-03-27 13:23:15', 19),
	(483, 321, 185, 1, 1.00, 0.00, 50.00, 0, NULL, 1, 0.00, '[]', '2020-03-27 13:23:20', 19, '2020-03-27 13:23:20', 19),
	(484, 322, 185, 1, 1.00, 0.00, 50.00, 0, NULL, 1, 0.00, '[]', '2020-03-27 13:34:16', 19, '2020-03-27 13:34:16', 19),
	(485, 323, 190, 1, 1.00, 0.00, 0.00, 0, NULL, 1, 0.00, '[]', '2020-03-27 13:52:28', 19, '2020-03-27 13:52:28', 19),
	(486, 324, 125, 1, 2.80, 0.00, 0.00, 0, NULL, 1, 0.00, '[]', '2020-03-27 13:52:41', 19, '2020-03-27 13:52:41', 19),
	(487, 325, 183, 1, 1.00, 0.00, 50.00, 0, NULL, 1, 0.00, '[]', '2020-03-27 13:56:07', 19, '2020-03-27 13:56:07', 19),
	(488, 326, 188, 1, 1.00, 0.00, 50.00, 0, NULL, 1, 0.00, '[]', '2020-03-27 14:42:32', 19, '2020-03-27 14:42:32', 19),
	(489, 327, 188, 1, 1.00, 0.00, 50.00, 0, NULL, 1, 0.00, '[]', '2020-03-27 14:48:48', 19, '2020-03-27 14:48:48', 19),
	(490, 328, 152, 1, 2.90, 0.00, 0.00, 0, NULL, 1, 0.00, '[]', '2020-03-27 15:11:23', 19, '2020-03-27 15:11:23', 19),
	(491, 329, 147, 1, 2.50, 0.00, 50.00, 0, NULL, 1, 0.00, '[]', '2020-03-27 15:14:08', 19, '2020-03-27 15:14:08', 19),
	(492, 330, 217, 1, 1.00, 0.00, 50.00, 0, NULL, 1, 0.00, '[]', '2020-03-27 15:34:44', 19, '2020-03-27 15:34:44', 19),
	(493, 331, 190, 1, 1.00, 0.00, 50.00, 0, NULL, 1, 0.00, '[]', '2020-03-27 15:45:58', 19, '2020-03-27 15:45:58', 19),
	(494, 332, 136, 1, 2.50, 0.00, 20.00, 0, NULL, 1, 0.00, '[]', '2020-03-27 16:23:34', 19, '2020-03-27 16:23:34', 19),
	(495, 332, 192, 1, 3.00, 0.00, 20.00, 0, NULL, 1, 0.00, '[]', '2020-03-27 16:24:31', 19, '2020-03-27 16:24:31', 19),
	(496, 333, 223, 1, 1.80, 0.00, 20.00, 0, NULL, 1, 0.00, '[]', '2020-03-27 16:25:07', 19, '2020-03-27 16:25:07', 19),
	(497, 333, 152, 2, 2.90, 0.00, 20.00, 0, NULL, 1, 0.00, '[]', '2020-03-27 16:25:48', 19, '2020-03-27 16:25:48', 19),
	(498, 334, 141, 1, 2.90, 0.00, 20.00, 0, NULL, 1, 0.00, '[]', '2020-03-27 16:58:36', 19, '2020-03-27 16:58:36', 19),
	(499, 335, 217, 2, 1.00, 0.00, 20.00, 0, NULL, 1, 0.00, '[]', '2020-03-27 18:17:19', 19, '2020-03-27 18:17:19', 19),
	(500, 336, 145, 1, 2.20, 0.00, 50.00, 0, NULL, 1, 0.00, '[]', '2020-03-28 07:48:18', 19, '2020-03-28 07:48:18', 19),
	(501, 336, 190, 1, 1.00, 0.00, 50.00, 0, NULL, 1, 0.00, '[]', '2020-03-28 07:49:07', 19, '2020-03-28 07:49:07', 19),
	(502, 337, 190, 1, 1.00, 0.00, 50.00, 0, NULL, 1, 0.00, '[]', '2020-03-28 08:28:02', 19, '2020-03-28 08:28:02', 19),
	(503, 338, 149, 1, 2.50, 0.00, 0.00, 0, NULL, 1, 0.00, '[]', '2020-03-28 08:37:00', 19, '2020-03-28 08:37:00', 19),
	(504, 339, 164, 1, 2.00, 0.00, 0.00, 0, NULL, 1, 0.00, '[]', '2020-03-28 08:51:27', 19, '2020-03-28 08:51:27', 19),
	(505, 340, 169, 1, 2.50, 0.00, 0.00, 0, NULL, 1, 0.00, '[]', '2020-03-28 09:07:31', 19, '2020-03-28 09:07:31', 19),
	(506, 341, 169, 1, 2.50, 0.00, 0.00, 0, NULL, 1, 0.00, '[]', '2020-03-28 09:30:28', 19, '2020-03-28 09:30:28', 19),
	(507, 342, 152, 1, 2.90, 0.00, 0.00, 0, NULL, 1, 0.00, '[]', '2020-03-28 09:37:32', 19, '2020-03-28 09:37:32', 19),
	(508, 342, 125, 1, 2.80, 0.00, 0.00, 0, NULL, 1, 0.00, '[]', '2020-03-28 09:38:06', 19, '2020-03-28 09:38:06', 19),
	(509, 343, 141, 1, 2.90, 0.00, 0.00, 0, NULL, 1, 0.00, '[]', '2020-03-28 09:48:20', 19, '2020-03-28 09:48:20', 19),
	(510, 344, 217, 1, 1.00, 0.00, 50.00, 0, NULL, 1, 0.00, '[]', '2020-03-28 09:54:32', 19, '2020-03-28 09:54:32', 19),
	(511, 344, 185, 1, 1.00, 0.00, 50.00, 0, NULL, 1, 0.00, '[]', '2020-03-28 09:57:00', 19, '2020-03-28 09:57:00', 19),
	(512, 345, 157, 1, 2.80, 0.00, 0.00, 0, NULL, 1, 0.00, '[]', '2020-03-28 10:23:53', 19, '2020-03-28 10:23:53', 19),
	(513, 346, 125, 1, 2.80, 0.00, 50.00, 0, NULL, 1, 0.00, '[]', '2020-03-28 10:35:11', 19, '2020-03-28 10:35:11', 19),
	(514, 346, 203, 1, 2.50, 0.00, 50.00, 0, NULL, 1, 0.00, '[]', '2020-03-28 10:36:04', 19, '2020-03-28 10:36:04', 19),
	(515, 346, 203, 1, 2.50, 0.00, 50.00, 0, NULL, 1, 0.00, '[]', '2020-03-28 10:36:53', 19, '2020-03-28 10:36:53', 19),
	(516, 346, 216, 1, 3.50, 0.00, 0.00, 0, NULL, 0, NULL, NULL, '2020-03-28 10:37:48', 19, '2020-03-28 10:37:48', 19),
	(517, 346, 152, 1, 2.90, 0.00, 50.00, 0, NULL, 0, NULL, NULL, '2020-03-28 10:37:59', 19, '2020-03-28 10:37:59', 19),
	(518, 347, 216, 1, 3.50, 0.00, 50.00, 0, NULL, 1, 0.00, '[]', '2020-03-28 10:39:00', 19, '2020-03-28 10:39:00', 19),
	(519, 347, 152, 1, 2.90, 0.00, 100.00, 0, NULL, 1, 0.00, '[]', '2020-03-28 10:39:37', 19, '2020-03-28 10:39:37', 19),
	(520, 348, 147, 1, 2.50, 0.00, 0.00, 0, NULL, 1, 0.00, '[]', '2020-03-28 11:04:57', 19, '2020-03-28 11:04:57', 19),
	(521, 349, 185, 2, 1.00, 0.00, 50.00, 0, NULL, 1, 0.00, '[]', '2020-03-28 11:06:20', 19, '2020-03-28 11:06:20', 19),
	(522, 349, 190, 2, 1.00, 0.00, 50.00, 0, NULL, 1, 0.00, '[]', '2020-03-28 11:23:13', 19, '2020-03-28 11:23:13', 19),
	(523, 350, 145, 1, 2.20, 0.00, 0.00, 0, NULL, 1, 0.00, '[]', '2020-03-28 12:36:01', 19, '2020-03-28 12:36:01', 19),
	(524, 351, 175, 1, 2.90, 0.00, 0.00, 0, NULL, 0, NULL, NULL, '2020-03-28 12:58:32', 19, '2020-03-28 12:58:32', 19),
	(525, 351, 169, 1, 2.50, 0.00, 0.00, 0, NULL, 1, 0.00, '[]', '2020-03-28 12:59:20', 19, '2020-03-28 12:59:20', 19),
	(526, 352, 151, 1, 2.90, 0.00, 0.00, 0, NULL, 1, 0.00, '[]', '2020-03-28 13:21:49', 19, '2020-03-28 13:21:49', 19),
	(527, 352, 143, 1, 2.90, 0.00, 0.00, 0, NULL, 1, 0.00, '[]', '2020-03-28 13:22:23', 19, '2020-03-28 13:22:23', 19),
	(528, 353, 190, 1, 1.00, 0.00, 50.00, 0, NULL, 1, 0.00, '[]', '2020-03-28 14:40:03', 19, '2020-03-28 14:40:03', 19),
	(529, 349, 151, 1, 2.90, 0.00, 50.00, 0, NULL, 1, 0.00, '[]', '2020-03-28 14:49:28', 19, '2020-03-28 14:49:28', 19),
	(530, 354, 180, 1, 2.80, 0.00, 100.00, 0, NULL, 1, 0.00, '[]', '2020-03-28 15:21:35', 19, '2020-03-28 15:21:35', 19),
	(531, 355, 220, 1, 1.00, 0.00, 0.00, 0, NULL, 1, 0.00, '[]', '2020-03-28 15:31:34', 19, '2020-03-28 15:31:34', 19),
	(532, 355, 223, 1, 1.80, 0.00, 0.00, 0, NULL, 1, 0.00, '[]', '2020-03-28 15:31:41', 19, '2020-03-28 15:31:41', 19),
	(533, 356, 220, 1, 1.00, 0.00, 0.00, 0, NULL, 0, NULL, NULL, '2020-03-28 15:33:07', 19, '2020-03-28 15:33:07', 19),
	(534, 357, 157, 1, 2.80, 0.00, 0.00, 0, NULL, 1, 0.00, '[]', '2020-03-28 15:59:32', 19, '2020-03-28 15:59:32', 19),
	(535, 356, 220, 4, 1.00, 0.00, 0.00, 0, NULL, 1, 0.00, '[]', '2020-03-28 16:09:59', 19, '2020-03-28 16:09:59', 19),
	(536, 358, 220, 2, 1.00, 0.00, 0.00, 0, NULL, 1, 0.00, '[]', '2020-03-28 16:34:27', 19, '2020-03-28 16:34:27', 19),
	(537, 359, 145, 1, 2.20, 0.00, 50.00, 0, NULL, 1, 0.00, '[]', '2020-03-29 07:29:42', 19, '2020-03-29 07:29:42', 19),
	(538, 360, 147, 1, 2.50, 0.00, 100.00, 0, NULL, 1, 0.00, '[]', '2020-03-29 07:54:26', 19, '2020-03-29 07:54:26', 19),
	(539, 361, 217, 1, 1.00, 0.00, 50.00, 0, NULL, 1, 0.00, '[]', '2020-03-29 07:54:55', 19, '2020-03-29 07:54:55', 19),
	(540, 362, 190, 1, 1.00, 0.00, 50.00, 0, NULL, 1, 0.00, '[]', '2020-03-29 08:28:59', 19, '2020-03-29 08:28:59', 19),
	(541, 363, 147, 1, 2.50, 0.00, 0.00, 0, NULL, 1, 0.00, '[]', '2020-03-29 09:16:37', 19, '2020-03-29 09:16:37', 19),
	(542, 364, 147, 1, 2.50, 0.00, 0.00, 0, NULL, 1, 0.00, '[]', '2020-03-29 09:32:48', 19, '2020-03-29 09:32:48', 19),
	(543, 364, 214, 1, 3.50, 0.00, 0.00, 0, NULL, 1, 0.00, '[]', '2020-03-29 09:38:22', 19, '2020-03-29 09:38:22', 19),
	(544, 359, 190, 1, 1.00, 0.00, 50.00, 0, NULL, 1, 0.00, '[]', '2020-03-29 10:08:11', 19, '2020-03-29 10:08:11', 19),
	(545, 359, 185, 3, 1.00, 0.00, 50.00, 0, NULL, 1, 0.00, '[]', '2020-03-29 10:08:15', 19, '2020-03-29 10:08:15', 19),
	(546, 365, 186, 2, 1.50, 0.00, 20.00, 0, NULL, 0, NULL, NULL, '2020-03-29 10:15:51', 19, '2020-03-29 10:15:51', 19),
	(547, 365, 186, 3, 1.50, 0.00, 20.00, 0, NULL, 1, 0.00, '[]', '2020-03-29 10:16:22', 19, '2020-03-29 10:16:22', 19),
	(548, 365, 226, 1, 1.25, 0.00, 20.00, 0, NULL, 1, 0.00, '[]', '2020-03-29 10:16:51', 19, '2020-03-29 10:16:51', 19),
	(549, 366, 186, 1, 1.50, 0.00, 20.00, 0, NULL, 0, NULL, NULL, '2020-03-29 10:20:27', 19, '2020-03-29 10:20:27', 19),
	(550, 366, 147, 1, 2.50, 0.00, 20.00, 0, NULL, 1, 0.00, '[]', '2020-03-29 10:43:56', 19, '2020-03-29 10:43:56', 19),
	(551, 367, 152, 1, 2.90, 0.00, 0.00, 0, NULL, 1, 0.00, '[]', '2020-03-29 11:07:35', 19, '2020-03-29 11:07:35', 19),
	(552, 367, 174, 1, 2.90, 0.00, 0.00, 0, NULL, 1, 0.00, '[]', '2020-03-29 11:08:03', 19, '2020-03-29 11:08:03', 19),
	(553, 368, 89, 1, 2.30, 0.00, 0.00, 0, NULL, 1, 0.00, '[]', '2020-03-29 11:20:30', 19, '2020-03-29 11:20:30', 19),
	(554, 369, 152, 1, 2.90, 0.00, 0.00, 0, NULL, 1, 0.00, '[]', '2020-03-29 11:21:09', 19, '2020-03-29 11:21:09', 19),
	(555, 370, 86, 1, 1.90, 0.00, 0.00, 0, NULL, 1, 0.00, '[]', '2020-03-29 11:55:11', 19, '2020-03-29 11:55:11', 19),
	(556, 371, 176, 1, 0.75, 0.00, 0.00, 0, NULL, 1, 0.00, '[]', '2020-03-29 12:49:59', 19, '2020-03-29 12:49:59', 19),
	(557, 372, 154, 1, 2.90, 0.00, 0.00, 0, NULL, 1, 0.00, '[]', '2020-03-29 13:24:23', 19, '2020-03-29 13:24:23', 19),
	(558, 372, 150, 2, 2.50, 0.00, 0.00, 0, NULL, 1, 0.00, '[]', '2020-03-29 13:24:43', 19, '2020-03-29 13:24:43', 19),
	(559, 372, 91, 1, 2.30, 0.00, 0.00, 0, NULL, 1, 0.00, '[]', '2020-03-29 13:25:55', 19, '2020-03-29 13:25:55', 19),
	(560, 373, 175, 1, 2.90, 0.00, 0.00, 0, NULL, 1, 0.00, '[]', '2020-03-29 14:23:28', 19, '2020-03-29 14:23:28', 19),
	(561, 374, 175, 1, 2.90, 0.00, 0.00, 0, NULL, 1, 0.00, '[]', '2020-03-29 14:30:48', 19, '2020-03-29 14:30:48', 19),
	(562, 375, 220, 4, 1.00, 0.00, 0.00, 0, NULL, 1, 0.00, '[]', '2020-03-29 14:57:16', 19, '2020-03-29 14:57:16', 19),
	(563, 376, 180, 1, 2.80, 0.00, 100.00, 0, NULL, 1, 0.00, '[]', '2020-03-29 15:07:46', 19, '2020-03-29 15:07:46', 19),
	(564, 377, 190, 1, 1.00, 0.00, 20.00, 0, NULL, 0, NULL, NULL, '2020-03-29 15:42:50', 19, '2020-03-29 15:42:50', 19),
	(565, 377, 188, 1, 1.00, 0.00, 0.00, 0, NULL, 0, NULL, NULL, '2020-03-29 15:43:04', 19, '2020-03-29 15:43:04', 19),
	(566, 378, 192, 1, 3.00, 0.00, 0.00, 0, NULL, 1, 0.00, '[]', '2020-03-29 15:47:25', 19, '2020-03-29 15:47:25', 19),
	(567, 379, 176, 1, 0.75, 0.00, 0.00, 0, NULL, 1, 0.00, '[]', '2020-03-29 16:26:01', 19, '2020-03-29 16:26:01', 19),
	(568, 377, 141, 1, 2.90, 0.00, 20.00, 0, NULL, 1, 0.00, '[]', '2020-03-29 16:28:50', 19, '2020-03-29 16:28:50', 19),
	(569, 377, 228, 1, 1.80, 0.00, 20.00, 0, NULL, 1, 0.00, '[]', '2020-03-29 16:35:37', 19, '2020-03-29 16:35:37', 19),
	(570, 380, 136, 1, 2.50, 0.00, 100.00, 0, NULL, 1, 0.00, '[]', '2020-03-29 18:27:56', 19, '2020-03-29 18:27:56', 19),
	(571, 380, 168, 2, 2.50, 0.00, 100.00, 0, NULL, 1, 0.00, '[]', '2020-03-29 18:28:09', 19, '2020-03-29 18:28:09', 19),
	(572, 380, 147, 1, 2.50, 0.00, 100.00, 0, NULL, 1, 0.00, '[]', '2020-03-29 18:28:25', 19, '2020-03-29 18:28:25', 19),
	(573, 380, 113, 1, 2.50, 0.00, 100.00, 0, NULL, 1, 0.00, '[]', '2020-03-29 18:28:43', 19, '2020-03-29 18:28:43', 19),
	(574, 381, 152, 1, 2.90, 0.00, 0.00, 0, NULL, 1, 0.00, '[]', '2020-03-30 10:40:17', 19, '2020-03-30 10:40:17', 19),
	(575, 381, 154, 2, 2.90, 0.00, 0.00, 0, NULL, 1, 0.00, '[]', '2020-03-30 10:40:20', 19, '2020-03-30 10:40:20', 19),
	(576, 382, 184, 10, 1.00, 0.00, 50.00, 1, NULL, 1, 0.00, '[]', '2020-03-30 10:41:00', 19, '2020-03-30 10:41:00', 19),
	(577, 382, 176, 1, 0.75, 0.00, 0.00, 0, NULL, 0, NULL, NULL, '2020-03-30 10:41:03', 19, '2020-03-30 10:41:03', 19),
	(578, 382, 188, 1, 1.00, 0.00, 50.00, 1, NULL, 1, 0.00, '[]', '2020-03-30 10:41:05', 19, '2020-03-30 10:41:05', 19),
	(579, 382, 217, 2, 1.00, 0.00, 50.00, 1, NULL, 1, 0.00, '[]', '2020-03-30 11:21:51', 19, '2020-03-30 11:21:51', 19),
	(580, 383, 87, 1, 2.30, 0.00, 0.00, 0, NULL, 1, 0.00, '[]', '2020-03-30 11:55:45', 19, '2020-03-30 11:55:45', 19),
	(581, 384, 141, 2, 2.90, 0.00, 0.00, 0, NULL, 1, 0.00, '[]', '2020-03-30 13:24:59', 19, '2020-03-30 13:24:59', 19),
	(582, 385, 220, 1, 1.00, 0.00, 100.00, 0, NULL, 1, 0.00, '[]', '2020-03-30 13:30:20', 19, '2020-03-30 13:30:20', 19),
	(583, 386, 159, 1, 2.80, 0.00, 100.00, 0, NULL, 1, 0.00, '[]', '2020-03-30 13:31:25', 19, '2020-03-30 13:31:25', 19),
	(584, 387, 175, 1, 2.90, 0.00, 0.00, 0, NULL, 1, 0.00, '[]', '2020-03-30 14:27:24', 19, '2020-03-30 14:27:24', 19),
	(585, 388, 220, 1, 1.00, 0.00, 0.00, 0, NULL, 1, 0.00, '[]', '2020-03-30 15:03:55', 19, '2020-03-30 15:03:55', 19),
	(586, 389, 148, 1, 2.50, 0.00, 100.00, 0, NULL, 1, 0.00, '[]', '2020-03-30 16:13:51', 19, '2020-03-30 16:13:51', 19),
	(587, 390, 149, 1, 2.50, 0.00, 100.00, 0, NULL, 1, 0.00, '[]', '2020-03-30 16:14:45', 19, '2020-03-30 16:14:45', 19),
	(588, 391, 87, 1, 2.30, 0.00, 0.00, 0, NULL, 1, 0.00, '[]', '2020-03-30 16:41:40', 19, '2020-03-30 16:41:40', 19),
	(589, 392, 124, 1, 2.90, 0.00, 100.00, 0, NULL, 1, 0.00, '[]', '2020-03-30 16:52:15', 19, '2020-03-30 16:52:15', 19),
	(590, 382, 207, 1, 3.50, 0.00, 0.00, 1, NULL, 0, NULL, NULL, '2020-03-30 17:23:34', 19, '2020-03-30 17:23:34', 19),
	(591, 393, 145, 1, 2.20, 0.00, 50.00, 0, NULL, 1, 0.00, '[]', '2020-03-31 07:30:54', 19, '2020-03-31 07:30:54', 19),
	(592, 394, 126, 1, 2.80, 0.00, 100.00, 0, NULL, 1, 0.00, '[]', '2020-03-31 07:59:29', 19, '2020-03-31 07:59:29', 19),
	(593, 395, 89, 1, 2.30, 0.00, 0.00, 0, NULL, 1, 0.00, '[]', '2020-03-31 08:02:14', 19, '2020-03-31 08:02:14', 19),
	(594, 396, 217, 1, 1.00, 0.00, 50.00, 0, NULL, 1, 0.00, '[]', '2020-03-31 08:10:24', 19, '2020-03-31 08:10:24', 19),
	(595, 397, 217, 1, 1.00, 0.00, 50.00, 0, NULL, 1, 0.00, '[]', '2020-03-31 08:10:42', 19, '2020-03-31 08:10:42', 19),
	(596, 393, 184, 7, 1.00, 0.00, 50.00, 0, NULL, 1, 0.00, '[]', '2020-03-31 09:07:22', 19, '2020-03-31 09:07:22', 19),
	(597, 398, 186, 2, 1.50, 0.00, 0.00, 0, NULL, 1, 0.00, '[]', '2020-03-31 09:21:01', 19, '2020-03-31 09:21:01', 19),
	(598, 398, 226, 1, 1.25, 0.00, 0.00, 0, NULL, 1, 0.00, '[]', '2020-03-31 09:21:44', 19, '2020-03-31 09:21:44', 19),
	(599, 398, 221, 1, 1.80, 0.00, 0.00, 0, NULL, 1, 0.00, '[]', '2020-03-31 09:21:50', 19, '2020-03-31 09:21:50', 19),
	(600, 399, 141, 1, 2.90, 0.00, 0.00, 0, NULL, 1, 0.00, '[]', '2020-03-31 09:33:48', 19, '2020-03-31 09:33:48', 19),
	(601, 399, 220, 1, 1.00, 0.00, 0.00, 0, NULL, 1, 0.00, '[]', '2020-03-31 09:43:50', 19, '2020-03-31 09:43:50', 19),
	(602, 400, 223, 1, 1.80, 0.00, 0.00, 0, NULL, 1, 0.00, '[]', '2020-03-31 10:30:53', 19, '2020-03-31 10:30:53', 19),
	(603, 401, 126, 1, 2.80, 0.00, 0.00, 0, NULL, 1, 0.00, '[]', '2020-03-31 10:50:57', 19, '2020-03-31 10:50:57', 19),
	(604, 393, 157, 1, 2.80, 0.00, 0.00, 0, NULL, 0, NULL, NULL, '2020-03-31 12:27:13', 19, '2020-03-31 12:27:13', 19),
	(605, 402, 220, 1, 1.00, 0.00, 50.00, 0, NULL, 1, 0.00, '[]', '2020-03-31 12:53:10', 19, '2020-03-31 12:53:10', 19),
	(606, 393, 184, 2, 1.00, 0.00, 100.00, 0, NULL, 1, 0.00, '[]', '2020-03-31 12:59:17', 19, '2020-03-31 12:59:17', 19),
	(607, 403, 192, 1, 3.00, 0.00, 0.00, 0, NULL, 1, 0.00, '[]', '2020-03-31 13:22:08', 19, '2020-03-31 13:22:08', 19),
	(608, 404, 141, 1, 2.90, 0.00, 0.00, 0, NULL, 1, 0.00, '[]', '2020-03-31 14:05:03', 19, '2020-03-31 14:05:03', 19),
	(609, 405, 152, 1, 2.90, 0.00, 0.00, 0, NULL, 1, 0.00, '[]', '2020-03-31 14:12:25', 19, '2020-03-31 14:12:25', 19),
	(610, 406, 154, 1, 2.90, 0.00, 0.00, 0, NULL, 1, 0.00, '[]', '2020-03-31 14:56:47', 19, '2020-03-31 14:56:47', 19),
	(611, 407, 90, 1, 2.30, 0.00, 0.00, 0, NULL, 1, 0.00, '[]', '2020-03-31 14:58:13', 19, '2020-03-31 14:58:13', 19),
	(612, 408, 188, 1, 1.00, 0.00, 50.00, 0, NULL, 1, 0.00, '[]', '2020-03-31 15:22:21', 19, '2020-03-31 15:22:21', 19),
	(613, 409, 141, 1, 2.90, 0.00, 50.00, 0, NULL, 0, NULL, NULL, '2020-03-31 15:29:51', 19, '2020-03-31 15:29:51', 19),
	(614, 409, 141, 2, 2.90, 0.00, 20.00, 0, NULL, 1, 0.00, '[]', '2020-03-31 16:33:09', 19, '2020-03-31 16:33:09', 19),
	(615, 410, 177, 1, 2.90, 0.00, 0.00, 0, NULL, 1, 0.00, '[]', '2020-03-31 17:08:12', 19, '2020-03-31 17:08:12', 19),
	(616, 411, 177, 1, 2.90, 0.00, 0.00, 0, NULL, 1, 0.00, '[]', '2020-03-31 17:16:35', 19, '2020-03-31 17:16:35', 19),
	(617, 393, 164, 1, 2.00, 0.00, 50.00, 0, NULL, 1, 0.00, '[]', '2020-03-31 17:59:21', 19, '2020-03-31 17:59:21', 19),
	(618, 412, 86, 1, 1.90, 0.00, 0.00, 0, NULL, 1, 0.00, '[]', '2020-04-01 07:04:26', 19, '2020-04-01 07:04:26', 19),
	(619, 413, 184, 1, 1.00, 0.00, 50.00, 0, NULL, 1, 0.00, '[]', '2020-04-01 07:28:40', 19, '2020-04-01 07:28:40', 19),
	(620, 413, 217, 3, 1.00, 0.00, 50.00, 0, NULL, 1, 0.00, '[]', '2020-04-01 07:28:45', 19, '2020-04-01 07:28:45', 19),
	(621, 414, 180, 1, 2.80, 0.00, 100.00, 0, NULL, 1, 0.00, '[]', '2020-04-01 08:02:40', 19, '2020-04-01 08:02:40', 19),
	(622, 415, 184, 1, 1.00, 0.00, 50.00, 0, NULL, 1, 0.00, '[]', '2020-04-01 08:11:29', 19, '2020-04-01 08:11:29', 19),
	(623, 416, 217, 1, 1.00, 0.00, 50.00, 0, NULL, 1, 0.00, '[]', '2020-04-01 08:11:48', 19, '2020-04-01 08:11:48', 19),
	(624, 417, 150, 1, 2.50, 0.00, 50.00, 0, NULL, 1, 0.00, '[]', '2020-04-01 08:18:25', 19, '2020-04-01 08:18:25', 19),
	(625, 418, 86, 1, 1.90, 0.00, 0.00, 0, NULL, 1, 0.00, '[]', '2020-04-01 09:02:29', 19, '2020-04-01 09:02:29', 19),
	(626, 419, 205, 2, 3.75, 0.00, 0.00, 1, NULL, 1, 0.00, '[]', '2020-04-01 10:37:36', 19, '2020-04-01 10:37:36', 19),
	(627, 420, 205, 2, 3.75, 0.00, 0.00, 0, NULL, 0, NULL, NULL, '2020-04-01 10:42:11', 19, '2020-04-01 10:42:11', 19),
	(628, 420, 205, 1, 3.75, 0.00, 50.00, 0, NULL, 0, NULL, NULL, '2020-04-01 10:43:53', 19, '2020-04-01 10:43:53', 19),
	(629, 417, 190, 1, 1.00, 0.00, 50.00, 0, NULL, 1, 0.00, '[]', '2020-04-01 11:13:49', 19, '2020-04-01 11:13:49', 19),
	(630, 417, 184, 3, 1.00, 0.00, 50.00, 0, NULL, 1, 0.00, '[]', '2020-04-01 11:57:19', 19, '2020-04-01 11:57:19', 19),
	(631, 420, 184, 1, 1.00, 0.00, 50.00, 0, NULL, 1, 0.00, '[]', '2020-04-01 13:19:30', 19, '2020-04-01 13:19:30', 19),
	(632, 421, 168, 2, 2.50, 0.00, 0.00, 0, NULL, 1, 0.00, '[]', '2020-04-01 13:47:29', 19, '2020-04-01 13:47:29', 19),
	(633, 422, 149, 1, 2.50, 0.00, 0.00, 0, NULL, 1, 0.00, '[]', '2020-04-01 13:49:35', 19, '2020-04-01 13:49:35', 19),
	(634, 422, 145, 1, 2.20, 0.00, 0.00, 0, NULL, 1, 0.00, '[]', '2020-04-01 13:50:12', 19, '2020-04-01 13:50:12', 19),
	(635, 423, 86, 1, 1.90, 0.00, 0.00, 0, NULL, 1, 0.00, '[]', '2020-04-01 14:20:10', 19, '2020-04-01 14:20:10', 19),
	(636, 424, 208, 1, 2.80, 0.00, 100.00, 0, NULL, 1, 0.00, '[]', '2020-04-01 14:36:17', 19, '2020-04-01 14:36:17', 19),
	(637, 425, 159, 1, 2.80, 0.00, 100.00, 0, NULL, 1, 0.00, '[]', '2020-04-01 14:37:01', 19, '2020-04-01 14:37:01', 19),
	(638, 417, 188, 1, 1.00, 0.00, 50.00, 0, NULL, 1, 0.00, '[]', '2020-04-01 14:50:00', 19, '2020-04-01 14:50:00', 19),
	(639, 426, 182, 1, 2.80, 0.00, 0.00, 0, NULL, 0, NULL, NULL, '2020-04-01 14:52:01', 19, '2020-04-01 14:52:01', 19),
	(640, 426, 180, 1, 2.80, 0.00, 0.00, 0, NULL, 1, 0.00, '[]', '2020-04-01 14:58:40', 19, '2020-04-01 14:58:40', 19),
	(641, 427, 138, 1, 2.50, 0.00, 0.00, 0, NULL, 0, NULL, NULL, '2020-04-01 15:03:59', 19, '2020-04-01 15:03:59', 19),
	(642, 428, 216, 1, 3.50, 0.00, 0.00, 1, NULL, 1, 0.00, '[]', '2020-04-01 15:07:54', 19, '2020-04-01 15:07:54', 19),
	(643, 429, 147, 1, 2.50, 0.00, 100.00, 0, NULL, 1, 0.00, '[]', '2020-04-01 15:45:44', 19, '2020-04-01 15:45:44', 19),
	(644, 430, 149, 1, 2.50, 0.00, 100.00, 0, NULL, 1, 0.00, '[]', '2020-04-01 15:47:45', 19, '2020-04-01 15:47:45', 19),
	(645, 431, 205, 1, 3.75, 0.00, 0.00, 1, NULL, 1, 0.00, '[]', '2020-04-01 15:53:28', 19, '2020-04-01 15:53:28', 19),
	(646, 431, 141, 2, 2.90, 0.00, 0.00, 0, NULL, 1, 0.00, '[]', '2020-04-01 15:55:06', 19, '2020-04-01 15:55:06', 19),
	(647, 426, 176, 1, 0.75, 0.00, 0.00, 0, NULL, 0, NULL, NULL, '2020-04-01 16:17:52', 19, '2020-04-01 16:17:52', 19),
	(648, 426, 138, 1, 2.50, 0.00, 0.00, 0, NULL, 1, 0.00, '[]', '2020-04-01 16:18:10', 19, '2020-04-01 16:18:10', 19),
	(649, 427, 220, 1, 1.00, 0.00, 0.00, 0, NULL, 1, 0.00, '[]', '2020-04-01 17:14:17', 19, '2020-04-01 17:14:17', 19),
	(650, 432, 111, 1, 2.50, 0.00, 100.00, 0, NULL, 1, 0.00, '[]', '2020-04-01 17:19:47', 19, '2020-04-01 17:19:47', 19),
	(651, 433, 136, 1, 2.50, 0.00, 100.00, 0, NULL, 1, 0.00, '[]', '2020-04-01 17:20:22', 19, '2020-04-01 17:20:22', 19),
	(652, 434, 145, 1, 2.20, 0.00, 50.00, 0, NULL, 1, 0.00, '[]', '2020-04-02 07:32:46', 19, '2020-04-02 07:32:46', 19),
	(653, 434, 184, 9, 1.00, 0.00, 50.00, 0, NULL, 1, 0.00, '[]', '2020-04-02 07:32:59', 19, '2020-04-02 07:32:59', 19),
	(654, 435, 184, 2, 1.00, 0.00, 50.00, 0, NULL, 1, 0.00, '[]', '2020-04-02 07:33:15', 19, '2020-04-02 07:33:15', 19),
	(655, 436, 184, 1, 1.00, 0.00, 100.00, 0, NULL, 1, 0.00, '[]', '2020-04-02 07:49:23', 19, '2020-04-02 07:49:23', 19),
	(656, 434, 188, 4, 1.00, 0.00, 50.00, 0, NULL, 1, 0.00, '[]', '2020-04-02 08:06:26', 19, '2020-04-02 08:06:26', 19),
	(657, 437, 152, 1, 2.90, 0.00, 0.00, 0, NULL, 1, 0.00, '[]', '2020-04-02 08:20:51', 19, '2020-04-02 08:20:51', 19),
	(658, 434, 147, 2, 2.50, 0.00, 50.00, 0, NULL, 1, 0.00, '[]', '2020-04-02 08:35:45', 19, '2020-04-02 08:35:45', 19),
	(659, 438, 152, 1, 2.90, 0.00, 50.00, 0, NULL, 0, NULL, NULL, '2020-04-02 08:37:12', 19, '2020-04-02 08:37:12', 19),
	(660, 438, 147, 1, 2.50, 0.00, 0.00, 0, NULL, 1, 0.00, '[]', '2020-04-02 09:21:52', 19, '2020-04-02 09:21:52', 19),
	(661, 439, 184, 1, 1.00, 0.00, 50.00, 0, NULL, 1, 0.00, '[]', '2020-04-02 09:59:59', 19, '2020-04-02 09:59:59', 19),
	(662, 440, 208, 1, 2.80, 0.00, 100.00, 0, NULL, 1, 0.00, '[]', '2020-04-02 10:20:11', 19, '2020-04-02 10:20:11', 19),
	(663, 441, 226, 1, 1.25, 0.00, 0.00, 0, NULL, 1, 0.00, '[]', '2020-04-02 10:26:31', 19, '2020-04-02 10:26:31', 19),
	(664, 442, 150, 1, 2.50, 0.00, 0.00, 0, NULL, 0, NULL, NULL, '2020-04-02 10:51:11', 19, '2020-04-02 10:51:11', 19),
	(665, 442, 151, 1, 2.90, 0.00, 50.00, 0, NULL, 1, 0.00, '[]', '2020-04-02 10:51:17', 19, '2020-04-02 10:51:17', 19),
	(666, 443, 169, 2, 2.50, 0.00, 0.00, 0, NULL, 1, 0.00, '[]', '2020-04-02 11:05:45', 19, '2020-04-02 11:05:45', 19),
	(667, 434, 217, 1, 1.00, 0.00, 50.00, 0, NULL, 1, 0.00, '[]', '2020-04-02 11:33:03', 19, '2020-04-02 11:33:03', 19),
	(668, 444, 205, 1, 3.75, 0.00, 0.00, 0, NULL, 1, 0.00, '[]', '2020-04-02 11:43:12', 19, '2020-04-02 11:43:12', 19),
	(669, 444, 141, 1, 2.90, 0.00, 0.00, 0, NULL, 0, NULL, NULL, '2020-04-02 11:51:43', 19, '2020-04-02 11:51:43', 19),
	(670, 444, 151, 2, 2.90, 0.00, 0.00, 0, NULL, 1, 0.00, '[]', '2020-04-02 11:51:52', 19, '2020-04-02 11:51:52', 19),
	(671, 445, 206, 1, 3.75, 0.00, 0.00, 0, NULL, 1, 0.00, '[]', '2020-04-02 12:04:28', 19, '2020-04-02 12:04:28', 19),
	(672, 445, 141, 1, 2.90, 0.00, 0.00, 0, NULL, 1, 0.00, '[]', '2020-04-02 12:04:33', 19, '2020-04-02 12:04:33', 19),
	(673, 446, 136, 1, 2.50, 0.00, 100.00, 0, NULL, 1, 0.00, '[]', '2020-04-02 14:31:00', 19, '2020-04-02 14:31:00', 19),
	(674, 447, 146, 1, 2.50, 0.00, 0.00, 0, NULL, 1, 0.00, '[]', '2020-04-02 14:49:19', 19, '2020-04-02 14:49:19', 19),
	(675, 448, 101, 1, 2.50, 0.00, 100.00, 0, NULL, 1, 0.00, '[]', '2020-04-02 15:15:02', 19, '2020-04-02 15:15:02', 19),
	(676, 449, 152, 1, 2.90, 0.00, 0.00, 0, NULL, 1, 0.00, '[]', '2020-04-02 15:42:06', 19, '2020-04-02 15:42:06', 19),
	(677, 450, 158, 1, 2.80, 0.00, 0.00, 0, NULL, 1, 0.00, '[]', '2020-04-02 15:46:56', 19, '2020-04-02 15:46:56', 19),
	(678, 451, 187, 1, 1.00, 0.00, 0.00, 0, NULL, 1, 0.00, '[]', '2020-04-02 15:47:05', 19, '2020-04-02 15:47:05', 19),
	(679, 434, 190, 2, 1.00, 0.00, 50.00, 0, NULL, 1, 0.00, '[]', '2020-04-02 16:40:39', 19, '2020-04-02 16:40:39', 19),
	(680, 452, 103, 1, 2.50, 0.00, 0.00, 0, NULL, 1, 0.00, '[]', '2020-04-02 16:54:36', 19, '2020-04-02 16:54:36', 19),
	(681, 453, 109, 1, 2.50, 0.00, 0.00, 0, NULL, 1, 0.00, '[]', '2020-04-02 17:40:05', 19, '2020-04-02 17:40:05', 19),
	(682, 454, 190, 1, 1.00, 0.00, 50.00, 0, NULL, 1, 0.00, '[]', '2020-04-03 07:10:33', 19, '2020-04-03 07:10:33', 19),
	(683, 454, 145, 1, 2.20, 0.00, 50.00, 0, NULL, 1, 0.00, '[]', '2020-04-03 07:16:56', 19, '2020-04-03 07:16:56', 19),
	(684, 455, 217, 1, 1.00, 0.00, 50.00, 0, NULL, 1, 0.00, '[]', '2020-04-03 07:37:48', 19, '2020-04-03 07:37:48', 19),
	(685, 456, 151, 1, 2.90, 0.00, 0.00, 0, NULL, 1, 0.00, '[]', '2020-04-03 07:50:56', 19, '2020-04-03 07:50:56', 19),
	(686, 457, 147, 1, 2.50, 0.00, 0.00, 0, NULL, 1, 0.00, '[]', '2020-04-03 07:52:43', 19, '2020-04-03 07:52:43', 19),
	(687, 458, 149, 1, 2.50, 0.00, 100.00, 0, NULL, 1, 0.00, '[]', '2020-04-03 08:27:37', 19, '2020-04-03 08:27:37', 19),
	(688, 454, 185, 1, 1.00, 0.00, 50.00, 0, NULL, 1, 0.00, '[]', '2020-04-03 09:01:51', 19, '2020-04-03 09:01:51', 19),
	(689, 459, 154, 1, 2.90, 0.00, 0.00, 0, NULL, 1, 0.00, '[]', '2020-04-03 09:02:57', 19, '2020-04-03 09:02:57', 19),
	(690, 454, 188, 9, 1.00, 0.00, 50.00, 0, NULL, 1, 0.00, '[]', '2020-04-03 09:18:38', 19, '2020-04-03 09:18:38', 19),
	(691, 460, 226, 1, 1.25, 0.00, 50.00, 0, NULL, 0, NULL, NULL, '2020-04-03 09:50:41', 19, '2020-04-03 09:50:41', 19),
	(692, 460, 223, 1, 1.80, 0.00, 50.00, 0, NULL, 1, 0.00, '[]', '2020-04-03 09:54:08', 19, '2020-04-03 09:54:08', 19),
	(693, 461, 150, 2, 2.50, 0.00, 0.00, 0, NULL, 1, 0.00, '[]', '2020-04-03 10:12:56', 19, '2020-04-03 10:12:56', 19),
	(694, 462, 152, 1, 2.90, 0.00, 0.00, 0, NULL, 1, 0.00, '[]', '2020-04-03 11:02:48', 19, '2020-04-03 11:02:48', 19),
	(695, 463, 141, 1, 2.90, 0.00, 0.00, 0, NULL, 1, 0.00, '[]', '2020-04-03 11:24:05', 19, '2020-04-03 11:24:05', 19),
	(696, 464, 152, 1, 2.90, 0.00, 100.00, 0, NULL, 1, 0.00, '[]', '2020-04-03 11:40:36', 19, '2020-04-03 11:40:36', 19),
	(697, 464, 216, 1, 3.50, 0.00, 100.00, 0, NULL, 1, 0.00, '[]', '2020-04-03 11:40:44', 19, '2020-04-03 11:40:44', 19),
	(698, 464, 192, 1, 3.00, 0.00, 100.00, 0, NULL, 1, 0.00, '[]', '2020-04-03 11:52:51', 19, '2020-04-03 11:52:51', 19),
	(699, 465, 145, 1, 2.20, 0.00, 0.00, 0, NULL, 1, 0.00, '[]', '2020-04-03 12:21:14', 19, '2020-04-03 12:21:14', 19),
	(700, 466, 147, 1, 2.50, 0.00, 100.00, 0, NULL, 1, 0.00, '[]', '2020-04-03 12:49:22', 19, '2020-04-03 12:49:22', 19),
	(701, 467, 151, 1, 2.90, 0.00, 50.00, 0, NULL, 0, NULL, NULL, '2020-04-03 13:30:38', 19, '2020-04-03 13:30:38', 19),
	(702, 454, 151, 1, 2.90, 0.00, 50.00, 0, NULL, 1, 0.00, '[]', '2020-04-03 13:31:27', 19, '2020-04-03 13:31:27', 19),
	(703, 467, 208, 1, 2.80, 0.00, 100.00, 0, NULL, 1, 0.00, '[]', '2020-04-03 14:02:06', 19, '2020-04-03 14:02:06', 19),
	(704, 454, 184, 6, 1.00, 0.00, 50.00, 0, NULL, 1, 0.00, '[]', '2020-04-03 14:21:33', 19, '2020-04-03 14:21:33', 19),
	(705, 454, 217, 2, 1.00, 0.00, 50.00, 0, NULL, 1, 0.00, '[]', '2020-04-03 14:23:14', 19, '2020-04-03 14:23:14', 19),
	(706, 468, 145, 1, 2.20, 0.00, 0.00, 0, NULL, 1, 0.00, '[]', '2020-04-03 15:35:53', 19, '2020-04-03 15:35:53', 19),
	(707, 454, 228, 1, 1.80, 0.00, 50.00, 0, NULL, 1, 0.00, '[]', '2020-04-03 16:33:14', 19, '2020-04-03 16:33:14', 19),
	(708, 454, 149, 1, 2.50, 0.00, 100.00, 0, NULL, 1, 0.00, '[]', '2020-04-03 18:38:23', 19, '2020-04-03 18:38:23', 19),
	(709, 469, 188, 4, 1.00, 0.00, 50.00, 0, NULL, 1, 0.00, '[]', '2020-04-04 08:21:57', 19, '2020-04-04 08:21:57', 19),
	(710, 470, 184, 1, 1.00, 0.00, 50.00, 0, NULL, 1, 0.00, '[]', '2020-04-04 08:40:33', 19, '2020-04-04 08:40:33', 19),
	(711, 471, 221, 1, 1.80, 0.00, 50.00, 0, NULL, 1, 0.00, '[]', '2020-04-04 08:52:18', 19, '2020-04-04 08:52:18', 19),
	(712, 472, 184, 1, 1.00, 0.00, 50.00, 0, NULL, 1, 0.00, '[]', '2020-04-04 08:58:54', 19, '2020-04-04 08:58:54', 19),
	(713, 473, 128, 1, 2.80, 0.00, 100.00, 0, NULL, 1, 0.00, '[]', '2020-04-04 09:15:45', 19, '2020-04-04 09:15:45', 19),
	(714, 474, 185, 1, 1.00, 0.00, 0.00, 0, NULL, 1, 0.00, '[]', '2020-04-04 10:02:53', 19, '2020-04-04 10:02:53', 19),
	(715, 475, 152, 1, 2.90, 0.00, 0.00, 0, NULL, 1, 0.00, '[]', '2020-04-04 10:31:16', 19, '2020-04-04 10:31:16', 19),
	(716, 476, 147, 1, 2.50, 0.00, 0.00, 0, NULL, 1, 0.00, '[]', '2020-04-04 11:20:03', 19, '2020-04-04 11:20:03', 19),
	(717, 469, 184, 1, 1.00, 0.00, 50.00, 0, NULL, 1, 0.00, '[]', '2020-04-04 11:40:00', 19, '2020-04-04 11:40:00', 19),
	(718, 477, 213, 1, 1.80, 0.00, 0.00, 0, NULL, 1, 0.00, '[]', '2020-04-04 12:30:13', 19, '2020-04-04 12:30:13', 19),
	(719, 478, 174, 1, 2.90, 0.00, 0.00, 0, NULL, 1, 0.00, '[]', '2020-04-04 12:41:06', 19, '2020-04-04 12:41:06', 19),
	(720, 479, 184, 8, 1.00, 0.00, 50.00, 0, NULL, 1, 0.00, '[]', '2020-04-04 12:51:00', 19, '2020-04-04 12:51:00', 19),
	(721, 480, 213, 1, 1.80, 0.00, 0.00, 0, NULL, 0, NULL, NULL, '2020-04-04 13:38:47', 19, '2020-04-04 13:38:47', 19),
	(722, 480, 180, 1, 2.80, 0.00, 0.00, 0, NULL, 1, 0.00, '[]', '2020-04-04 13:43:03', 19, '2020-04-04 13:43:03', 19),
	(723, 481, 147, 1, 2.50, 0.00, 100.00, 0, NULL, 1, 0.00, '[]', '2020-04-04 13:54:35', 19, '2020-04-04 13:54:35', 19),
	(724, 482, 152, 1, 2.90, 0.00, 0.00, 0, NULL, 1, 0.00, '[]', '2020-04-04 13:59:29', 19, '2020-04-04 13:59:29', 19),
	(725, 483, 89, 1, 2.30, 0.00, 0.00, 0, NULL, 1, 0.00, '[]', '2020-04-04 14:18:18', 19, '2020-04-04 14:18:18', 19),
	(726, 484, 205, 2, 3.75, 0.00, 0.00, 0, NULL, 0, NULL, NULL, '2020-04-04 14:46:17', 19, '2020-04-04 14:46:17', 19),
	(727, 484, 143, 1, 2.90, 0.00, 0.00, 0, NULL, 1, 0.00, '[]', '2020-04-04 14:46:56', 19, '2020-04-04 14:46:56', 19),
	(728, 484, 152, 1, 2.90, 0.00, 0.00, 0, NULL, 1, 0.00, '[]', '2020-04-04 14:51:11', 19, '2020-04-04 14:51:11', 19),
	(729, 484, 230, 2, 3.75, 0.00, 0.00, 0, NULL, 1, 0.00, '[]', '2020-04-04 15:03:55', 19, '2020-04-04 15:03:55', 19),
	(730, 485, 230, 1, 3.75, 0.00, 0.00, 0, NULL, 0, NULL, NULL, '2020-04-04 15:46:19', 19, '2020-04-04 15:46:19', 19),
	(731, 485, 205, 1, 3.75, 0.00, 50.00, 0, NULL, 1, 0.00, '[]', '2020-04-04 15:46:24', 19, '2020-04-04 15:46:24', 19),
	(732, 486, 147, 1, 2.50, 0.00, 100.00, 0, NULL, 1, 0.00, '[]', '2020-04-04 15:47:58', 19, '2020-04-04 15:47:58', 19),
	(733, 484, 220, 1, 1.00, 0.00, 0.00, 0, NULL, 1, 0.00, '[]', '2020-04-04 16:48:29', 19, '2020-04-04 16:48:29', 19),
	(734, 479, 184, 1, 1.00, 0.00, 100.00, 0, NULL, 1, 0.00, '[]', '2020-04-04 17:02:48', 19, '2020-04-04 17:02:48', 19),
	(735, 487, 207, 1, 3.50, 0.00, 0.00, 0, NULL, 1, 0.00, '[]', '2020-04-04 17:05:29', 19, '2020-04-04 17:05:29', 19),
	(736, 479, 188, 1, 1.00, 0.00, 0.00, 0, NULL, 0, NULL, NULL, '2020-04-04 17:09:41', 19, '2020-04-04 17:09:41', 19),
	(737, 488, 220, 1, 1.00, 0.00, 0.00, 0, NULL, 1, 0.00, '[]', '2020-04-04 18:34:37', 19, '2020-04-04 18:34:37', 19),
	(738, 489, 152, 1, 2.90, 0.00, 0.00, 0, NULL, 1, 0.00, '[]', '2020-04-04 18:57:21', 19, '2020-04-04 18:57:21', 19),
	(739, 489, 216, 1, 3.50, 0.00, 0.00, 0, NULL, 1, 0.00, '[]', '2020-04-04 18:59:32', 19, '2020-04-04 18:59:32', 19),
	(740, 490, 217, 1, 1.00, 0.00, 50.00, 0, NULL, 1, 0.00, '[]', '2020-04-05 07:18:22', 19, '2020-04-05 07:18:22', 19),
	(741, 491, 184, 7, 1.00, 0.00, 50.00, 0, NULL, 1, 0.00, '[]', '2020-04-05 07:39:20', 19, '2020-04-05 07:39:20', 19),
	(742, 492, 136, 1, 2.50, 0.00, 0.00, 0, NULL, 1, 0.00, '[]', '2020-04-05 07:39:35', 19, '2020-04-05 07:39:35', 19),
	(743, 491, 217, 3, 1.00, 0.00, 50.00, 0, NULL, 1, 0.00, '[]', '2020-04-05 08:06:59', 19, '2020-04-05 08:06:59', 19),
	(744, 493, 217, 1, 1.00, 0.00, 0.00, 0, NULL, 1, 0.00, '[]', '2020-04-05 08:25:55', 19, '2020-04-05 08:25:55', 19),
	(745, 493, 153, 1, 2.90, 0.00, 0.00, 0, NULL, 1, 0.00, '[]', '2020-04-05 08:26:21', 19, '2020-04-05 08:26:21', 19),
	(746, 494, 216, 1, 3.50, 0.00, 0.00, 1, NULL, 1, 0.00, '[]', '2020-04-05 08:47:29', 19, '2020-04-05 08:47:29', 19),
	(747, 495, 152, 1, 2.90, 0.00, 0.00, 0, NULL, 1, 0.00, '[]', '2020-04-05 09:34:16', 19, '2020-04-05 09:34:16', 19),
	(748, 496, 154, 1, 2.90, 0.00, 0.00, 0, NULL, 1, 0.00, '[]', '2020-04-05 09:42:20', 19, '2020-04-05 09:42:20', 19),
	(749, 497, 151, 1, 2.90, 0.00, 0.00, 0, NULL, 1, 0.00, '[]', '2020-04-05 09:42:29', 19, '2020-04-05 09:42:29', 19),
	(750, 497, 215, 1, 3.00, 0.00, 0.00, 0, NULL, 1, 0.00, '[]', '2020-04-05 09:42:36', 19, '2020-04-05 09:42:36', 19),
	(751, 498, 203, 1, 2.50, 0.00, 0.00, 0, NULL, 1, 0.00, '[]', '2020-04-05 10:22:31', 19, '2020-04-05 10:22:31', 19),
	(752, 499, 176, 2, 0.75, 0.00, 0.00, 0, NULL, 1, 0.00, '[]', '2020-04-05 10:23:05', 19, '2020-04-05 10:23:05', 19),
	(753, 500, 147, 2, 2.50, 0.00, 0.00, 0, NULL, 1, 0.00, '[]', '2020-04-05 10:28:21', 19, '2020-04-05 10:28:21', 19),
	(754, 500, 216, 1, 3.50, 0.00, 0.00, 0, NULL, 1, 0.00, '[]', '2020-04-05 10:38:43', 19, '2020-04-05 10:38:43', 19),
	(755, 500, 217, 1, 1.00, 0.00, 0.00, 0, NULL, 1, 0.00, '[]', '2020-04-05 10:40:08', 19, '2020-04-05 10:40:08', 19),
	(756, 491, 185, 3, 1.00, 0.00, 50.00, 0, NULL, 1, 0.00, '[]', '2020-04-05 10:41:40', 19, '2020-04-05 10:41:40', 19),
	(757, 501, 208, 1, 2.80, 0.00, 100.00, 0, NULL, 1, 0.00, '[]', '2020-04-05 10:52:53', 19, '2020-04-05 10:52:53', 19),
	(758, 502, 103, 1, 2.50, 0.00, 100.00, 0, NULL, 1, 0.00, '[]', '2020-04-05 11:05:03', 19, '2020-04-05 11:05:03', 19),
	(759, 503, 151, 1, 2.90, 0.00, 0.00, 0, NULL, 1, 0.00, '[]', '2020-04-05 11:10:40', 19, '2020-04-05 11:10:40', 19),
	(760, 504, 152, 1, 2.90, 0.00, 0.00, 0, NULL, 1, 0.00, '[]', '2020-04-05 11:10:59', 19, '2020-04-05 11:10:59', 19),
	(761, 504, 87, 1, 2.30, 0.00, 0.00, 0, NULL, 1, 0.00, '[]', '2020-04-05 11:11:08', 19, '2020-04-05 11:11:08', 19),
	(762, 505, 152, 1, 2.90, 0.00, 0.00, 0, NULL, 0, NULL, NULL, '2020-04-05 11:12:58', 19, '2020-04-05 11:12:58', 19),
	(763, 494, 89, 1, 2.30, 0.00, 0.00, 0, NULL, 1, 0.00, '[]', '2020-04-05 11:26:53', 19, '2020-04-05 11:26:53', 19),
	(764, 491, 190, 1, 1.00, 0.00, 50.00, 0, NULL, 1, 0.00, '[]', '2020-04-05 11:32:54', 19, '2020-04-05 11:32:54', 19),
	(765, 491, 188, 1, 1.00, 0.00, 50.00, 0, NULL, 1, 0.00, '[]', '2020-04-05 11:44:13', 19, '2020-04-05 11:44:13', 19),
	(766, 491, 169, 1, 2.50, 0.00, 50.00, 0, NULL, 1, 0.00, '[]', '2020-04-05 12:04:12', 19, '2020-04-05 12:04:12', 19),
	(767, 505, 147, 1, 2.50, 0.00, 100.00, 0, NULL, 1, 0.00, '[]', '2020-04-05 12:26:07', 19, '2020-04-05 12:26:07', 19),
	(768, 506, 154, 1, 2.90, 0.00, 0.00, 0, NULL, 1, 0.00, '[]', '2020-04-05 12:50:09', 19, '2020-04-05 12:50:09', 19),
	(769, 507, 176, 1, 0.75, 0.00, 0.00, 0, NULL, 1, 0.00, '[]', '2020-04-05 12:54:07', 19, '2020-04-05 12:54:07', 19),
	(770, 508, 141, 3, 2.90, 0.00, 0.00, 0, NULL, 1, 0.00, '[]', '2020-04-05 13:04:09', 19, '2020-04-05 13:04:09', 19),
	(771, 509, 152, 1, 2.90, 0.00, 0.00, 0, NULL, 1, 0.00, '[]', '2020-04-05 13:19:31', 19, '2020-04-05 13:19:31', 19),
	(772, 510, 220, 1, 1.00, 0.00, 0.00, 0, NULL, 1, 0.00, '[]', '2020-04-05 13:23:48', 19, '2020-04-05 13:23:48', 19),
	(773, 491, 151, 1, 2.90, 0.00, 50.00, 0, NULL, 1, 0.00, '[]', '2020-04-05 13:47:11', 19, '2020-04-05 13:47:11', 19),
	(774, 491, 184, 1, 1.00, 0.00, 100.00, 0, NULL, 1, 0.00, '[]', '2020-04-05 14:00:18', 19, '2020-04-05 14:00:18', 19),
	(775, 491, 203, 1, 2.50, 0.00, 50.00, 0, NULL, 1, 0.00, '[]', '2020-04-05 14:03:41', 19, '2020-04-05 14:03:41', 19),
	(776, 511, 207, 1, 3.50, 0.00, 0.00, 0, NULL, 1, 0.00, '[]', '2020-04-05 14:45:10', 19, '2020-04-05 14:45:10', 19),
	(777, 512, 208, 1, 2.80, 0.00, 100.00, 0, NULL, 1, 0.00, '[]', '2020-04-05 14:49:02', 19, '2020-04-05 14:49:02', 19),
	(778, 513, 151, 1, 2.90, 0.00, 0.00, 0, NULL, 1, 0.00, '[]', '2020-04-05 15:31:21', 19, '2020-04-05 15:31:21', 19),
	(779, 514, 226, 1, 1.25, 0.00, 100.00, 0, NULL, 1, 0.00, '[]', '2020-04-05 16:27:16', 19, '2020-04-05 16:27:16', 19),
	(780, 514, 223, 1, 1.80, 0.00, 100.00, 0, NULL, 1, 0.00, '[]', '2020-04-05 16:27:24', 19, '2020-04-05 16:27:24', 19),
	(781, 491, 149, 1, 2.50, 0.00, 50.00, 0, NULL, 1, 0.00, '[]', '2020-04-05 16:35:44', 19, '2020-04-05 16:35:44', 19),
	(782, 515, 205, 1, 3.75, 0.00, 50.00, 0, NULL, 1, 0.00, '[]', '2020-04-05 16:36:33', 19, '2020-04-05 16:36:33', 19),
	(783, 516, 206, 2, 3.75, 0.00, 0.00, 0, NULL, 1, 0.00, '[]', '2020-04-05 16:37:44', 19, '2020-04-05 16:37:44', 19),
	(784, 517, 188, 1, 1.00, 0.00, 50.00, 0, NULL, 1, 0.00, '[]', '2020-04-05 16:46:47', 19, '2020-04-05 16:46:47', 19),
	(785, 518, 136, 1, 2.50, 0.00, 100.00, 0, NULL, 1, 0.00, '[]', '2020-04-05 16:57:39', 19, '2020-04-05 16:57:39', 19),
	(786, 519, 228, 1, 1.80, 0.00, 50.00, 0, NULL, 1, 0.00, '[]', '2020-04-05 17:41:47', 19, '2020-04-05 17:41:47', 19),
	(787, 519, 217, 2, 1.00, 0.00, 50.00, 0, NULL, 1, 0.00, '[]', '2020-04-05 17:42:46', 19, '2020-04-05 17:42:46', 19),
	(788, 520, 184, 3, 1.00, 0.00, 50.00, 0, NULL, 1, 0.00, '[]', '2020-04-05 19:28:04', 19, '2020-04-05 19:28:04', 19),
	(789, 521, 186, 1, 1.50, 0.00, 0.00, 0, NULL, 1, 0.00, '[]', '2020-04-05 19:46:42', 19, '2020-04-05 19:46:42', 19),
	(790, 522, 188, 4, 1.00, 0.00, 50.00, 0, NULL, 1, 0.00, '[]', '2020-04-06 07:14:26', 19, '2020-04-06 07:14:26', 19),
	(791, 522, 184, 7, 1.00, 0.00, 50.00, 0, NULL, 1, 0.00, '[]', '2020-04-06 07:14:31', 19, '2020-04-06 07:14:31', 19),
	(792, 523, 149, 1, 2.50, 0.00, 0.00, 0, NULL, 1, 0.00, '[]', '2020-04-06 08:51:39', 19, '2020-04-06 08:51:39', 19),
	(793, 523, 221, 1, 1.80, 0.00, 0.00, 0, NULL, 1, 0.00, '[]', '2020-04-06 08:52:40', 19, '2020-04-06 08:52:40', 19),
	(794, 523, 223, 1, 1.80, 0.00, 0.00, 0, NULL, 1, 0.00, '[]', '2020-04-06 08:52:42', 19, '2020-04-06 08:52:42', 19),
	(795, 523, 226, 1, 1.25, 0.00, 0.00, 0, NULL, 1, 0.00, '[]', '2020-04-06 08:52:52', 19, '2020-04-06 08:52:52', 19),
	(796, 522, 190, 2, 1.00, 0.00, 50.00, 0, NULL, 1, 0.00, '[]', '2020-04-06 08:58:59', 19, '2020-04-06 08:58:59', 19),
	(797, 524, 91, 1, 2.30, 0.00, 0.00, 0, NULL, 1, 0.00, '[]', '2020-04-06 09:09:20', 19, '2020-04-06 09:09:20', 19),
	(798, 525, 186, 1, 1.50, 0.00, 0.00, 0, NULL, 1, 0.00, '[]', '2020-04-06 09:46:21', 19, '2020-04-06 09:46:21', 19),
	(799, 525, 217, 1, 1.00, 0.00, 0.00, 0, NULL, 1, 0.00, '[]', '2020-04-06 09:46:25', 19, '2020-04-06 09:46:25', 19),
	(800, 522, 187, 1, 1.00, 0.00, 50.00, 0, NULL, 1, 0.00, '[]', '2020-04-06 09:57:06', 19, '2020-04-06 09:57:06', 19),
	(801, 522, 217, 4, 1.00, 0.00, 50.00, 0, NULL, 1, 0.00, '[]', '2020-04-06 09:59:07', 19, '2020-04-06 09:59:07', 19),
	(802, 526, 91, 1, 2.30, 0.00, 0.00, 0, NULL, 1, 0.00, '[]', '2020-04-06 10:11:47', 19, '2020-04-06 10:11:47', 19),
	(803, 527, 147, 1, 2.50, 0.00, 0.00, 0, NULL, 1, 0.00, '[]', '2020-04-06 11:02:47', 19, '2020-04-06 11:02:47', 19),
	(804, 527, 168, 1, 2.50, 0.00, 0.00, 0, NULL, 1, 0.00, '[]', '2020-04-06 11:03:24', 19, '2020-04-06 11:03:24', 19),
	(805, 528, 180, 1, 2.80, 0.00, 0.00, 0, NULL, 1, 0.00, '[]', '2020-04-06 11:29:11', 19, '2020-04-06 11:29:11', 19),
	(806, 529, 208, 1, 2.80, 0.00, 0.00, 0, NULL, 1, 0.00, '[]', '2020-04-06 12:00:58', 19, '2020-04-06 12:00:58', 19),
	(807, 530, 147, 2, 2.50, 0.00, 0.00, 0, NULL, 1, 0.00, '[]', '2020-04-06 13:32:31', 19, '2020-04-06 13:32:31', 19),
	(808, 530, 151, 1, 2.90, 0.00, 0.00, 0, NULL, 1, 0.00, '[]', '2020-04-06 14:17:42', 19, '2020-04-06 14:17:42', 19),
	(809, 531, 157, 1, 2.80, 0.00, 0.00, 0, NULL, 1, 0.00, '[]', '2020-04-06 16:02:03', 19, '2020-04-06 16:02:03', 19),
	(810, 532, 149, 1, 2.50, 0.00, 100.00, 0, NULL, 1, 0.00, '[]', '2020-04-06 16:17:12', 19, '2020-04-06 16:17:12', 19),
	(811, 533, 168, 1, 2.50, 0.00, 0.00, 0, NULL, 1, 0.00, '[]', '2020-04-06 16:34:25', 19, '2020-04-06 16:34:25', 19),
	(812, 533, 147, 1, 2.50, 0.00, 0.00, 0, NULL, 0, NULL, NULL, '2020-04-06 16:44:39', 19, '2020-04-06 16:44:39', 19),
	(813, 533, 145, 1, 2.20, 0.00, 0.00, 0, NULL, 1, 0.00, '[]', '2020-04-06 16:44:51', 19, '2020-04-06 16:44:51', 19),
	(814, 534, 88, 1, 1.50, 0.00, 0.00, 0, NULL, 1, 0.00, '[]', '2020-04-06 16:48:15', 19, '2020-04-06 16:48:15', 19),
	(815, 534, 89, 1, 2.30, 0.00, 0.00, 0, NULL, 0, NULL, NULL, '2020-04-06 16:48:52', 19, '2020-04-06 16:48:52', 19),
	(816, 534, 147, 1, 2.50, 0.00, 0.00, 0, NULL, 1, 0.00, '[]', '2020-04-06 16:49:08', 19, '2020-04-06 16:49:08', 19),
	(817, 535, 207, 1, 3.50, 0.00, 0.00, 0, NULL, 1, 0.00, '[]', '2020-04-06 16:55:03', 19, '2020-04-06 16:55:03', 19),
	(818, 536, 168, 1, 2.50, 0.00, 0.00, 0, NULL, 1, 0.00, '[]', '2020-04-06 17:01:04', 19, '2020-04-06 17:01:04', 19),
	(819, 537, 137, 1, 2.50, 0.00, 100.00, 0, NULL, 1, 0.00, '[]', '2020-04-06 17:09:47', 19, '2020-04-06 17:09:47', 19),
	(820, 538, 208, 1, 2.80, 0.00, 100.00, 0, NULL, 1, 0.00, '[]', '2020-04-06 17:11:37', 19, '2020-04-06 17:11:37', 19),
	(821, 539, 101, 1, 2.50, 0.00, 100.00, 0, NULL, 1, 0.00, '[]', '2020-04-06 17:12:09', 19, '2020-04-06 17:12:09', 19),
	(822, 539, 203, 1, 2.50, 0.00, 100.00, 0, NULL, 1, 0.00, '[]', '2020-04-06 17:12:20', 19, '2020-04-06 17:12:20', 19),
	(823, 540, 147, 1, 2.50, 0.00, 0.00, 0, NULL, 1, 0.00, '[]', '2020-04-07 07:35:42', 19, '2020-04-07 07:35:42', 19),
	(824, 541, 217, 2, 1.00, 0.00, 50.00, 0, NULL, 1, 0.00, '[]', '2020-04-07 07:54:08', 19, '2020-04-07 07:54:08', 19),
	(825, 541, 183, 2, 1.00, 0.00, 0.00, 0, NULL, 0, NULL, NULL, '2020-04-07 07:58:25', 19, '2020-04-07 07:58:25', 19),
	(826, 541, 190, 4, 1.00, 0.00, 50.00, 0, NULL, 1, 0.00, '[]', '2020-04-07 07:58:30', 19, '2020-04-07 07:58:30', 19),
	(827, 541, 145, 1, 2.20, 0.00, 50.00, 0, NULL, 1, 0.00, '[]', '2020-04-07 08:07:42', 19, '2020-04-07 08:07:42', 19),
	(828, 541, 221, 1, 1.80, 0.00, 50.00, 0, NULL, 1, 0.00, '[]', '2020-04-07 08:17:57', 19, '2020-04-07 08:17:57', 19),
	(829, 542, 208, 1, 2.80, 0.00, 100.00, 0, NULL, 1, 0.00, '[]', '2020-04-07 08:34:05', 19, '2020-04-07 08:34:05', 19),
	(830, 543, 147, 1, 2.50, 0.00, 0.00, 0, NULL, 1, 0.00, '[]', '2020-04-07 09:09:27', 19, '2020-04-07 09:09:27', 19),
	(831, 544, 154, 3, 2.90, 0.00, 0.00, 0, NULL, 1, 0.00, '[]', '2020-04-07 09:37:05', 19, '2020-04-07 09:37:05', 19),
	(832, 541, 188, 8, 1.00, 0.00, 50.00, 0, NULL, 1, 0.00, '[]', '2020-04-07 09:49:33', 19, '2020-04-07 09:49:33', 19),
	(833, 545, 145, 2, 2.20, 0.00, 0.00, 0, NULL, 1, 0.00, '[]', '2020-04-07 10:13:09', 19, '2020-04-07 10:13:09', 19),
	(834, 545, 147, 2, 2.50, 0.00, 0.00, 0, NULL, 1, 0.00, '[]', '2020-04-07 10:13:46', 19, '2020-04-07 10:13:46', 19),
	(835, 546, 164, 1, 2.00, 0.00, 0.00, 0, NULL, 1, 0.00, '[]', '2020-04-07 10:31:25', 19, '2020-04-07 10:31:25', 19),
	(836, 547, 152, 1, 2.90, 0.00, 0.00, 0, NULL, 1, 0.00, '[]', '2020-04-07 10:34:58', 19, '2020-04-07 10:34:58', 19),
	(837, 548, 103, 1, 2.50, 0.00, 100.00, 0, NULL, 1, 0.00, '[]', '2020-04-07 11:21:49', 19, '2020-04-07 11:21:49', 19),
	(838, 549, 215, 1, 3.00, 0.00, 0.00, 0, NULL, 1, 0.00, '[]', '2020-04-07 11:37:48', 19, '2020-04-07 11:37:48', 19),
	(839, 550, 208, 1, 2.80, 0.00, 100.00, 0, NULL, 1, 0.00, '[]', '2020-04-07 11:42:22', 19, '2020-04-07 11:42:22', 19),
	(840, 549, 145, 1, 2.20, 0.00, 0.00, 0, NULL, 1, 0.00, '[]', '2020-04-07 11:47:33', 19, '2020-04-07 11:47:33', 19),
	(841, 551, 154, 1, 2.90, 0.00, 0.00, 0, NULL, 0, NULL, NULL, '2020-04-07 11:51:55', 19, '2020-04-07 11:51:55', 19),
	(842, 551, 149, 1, 2.50, 0.00, 0.00, 0, NULL, 1, 0.00, '[]', '2020-04-07 11:52:05', 19, '2020-04-07 11:52:05', 19),
	(843, 552, 220, 1, 1.00, 0.00, 0.00, 0, NULL, 1, 0.00, '[]', '2020-04-07 12:08:19', 19, '2020-04-07 12:08:19', 19),
	(844, 553, 227, 1, 1.80, 0.00, 0.00, 0, NULL, 0, NULL, NULL, '2020-04-07 12:14:36', 19, '2020-04-07 12:14:36', 19),
	(845, 541, 227, 1, 1.80, 0.00, 50.00, 0, NULL, 1, 0.00, '[]', '2020-04-07 12:14:57', 19, '2020-04-07 12:14:57', 19),
	(846, 541, 187, 4, 1.00, 0.00, 50.00, 0, NULL, 1, 0.00, '[]', '2020-04-07 12:20:38', 19, '2020-04-07 12:20:38', 19),
	(847, 553, 150, 1, 2.50, 0.00, 0.00, 0, NULL, 0, NULL, NULL, '2020-04-07 12:24:24', 19, '2020-04-07 12:24:24', 19),
	(848, 553, 136, 1, 2.50, 0.00, 0.00, 0, NULL, 0, NULL, NULL, '2020-04-07 12:30:15', 19, '2020-04-07 12:30:15', 19),
	(849, 554, 136, 1, 2.50, 0.00, 0.00, 0, NULL, 1, 0.00, '[]', '2020-04-07 12:31:07', 19, '2020-04-07 12:31:07', 19),
	(850, 555, 138, 1, 2.50, 0.00, 0.00, 0, NULL, 1, 0.00, '[]', '2020-04-07 12:35:58', 19, '2020-04-07 12:35:58', 19),
	(851, 554, 216, 1, 3.50, 0.00, 0.00, 0, NULL, 1, 0.00, '[]', '2020-04-07 12:38:57', 19, '2020-04-07 12:38:57', 19),
	(852, 556, 159, 1, 2.80, 0.00, 0.00, 0, NULL, 1, 0.00, '[]', '2020-04-07 14:25:30', 19, '2020-04-07 14:25:30', 19),
	(853, 541, 180, 1, 2.80, 0.00, 50.00, 0, NULL, 1, 0.00, '[]', '2020-04-07 14:38:47', 19, '2020-04-07 14:38:47', 19),
	(854, 557, 159, 1, 2.80, 0.00, 100.00, 0, NULL, 1, 0.00, '[]', '2020-04-07 15:20:25', 19, '2020-04-07 15:20:25', 19),
	(855, 541, 208, 1, 2.80, 0.00, 50.00, 0, NULL, 1, 0.00, '[]', '2020-04-07 15:29:54', 19, '2020-04-07 15:29:54', 19),
	(856, 541, 164, 1, 2.00, 0.00, 50.00, 0, NULL, 1, 0.00, '[]', '2020-04-07 15:31:52', 19, '2020-04-07 15:31:52', 19),
	(857, 558, 149, 1, 2.50, 0.00, 100.00, 0, NULL, 1, 0.00, '[]', '2020-04-07 15:40:25', 19, '2020-04-07 15:40:25', 19),
	(858, 541, 228, 1, 1.80, 0.00, 50.00, 0, NULL, 1, 0.00, '[]', '2020-04-07 16:13:46', 19, '2020-04-07 16:13:46', 19),
	(859, 554, 223, 1, 1.80, 0.00, 0.00, 0, NULL, 1, 0.00, '[]', '2020-04-07 16:35:46', 19, '2020-04-07 16:35:46', 19),
	(860, 559, 136, 1, 2.50, 0.00, 0.00, 0, NULL, 1, 0.00, '[]', '2020-04-07 16:36:47', 19, '2020-04-07 16:36:47', 19),
	(861, 560, 227, 1, 1.80, 0.00, 50.00, 0, NULL, 1, 0.00, '[]', '2020-04-08 07:40:34', 19, '2020-04-08 07:40:34', 19),
	(862, 561, 86, 1, 1.90, 0.00, 0.00, 0, NULL, 1, 0.00, '[]', '2020-04-08 07:45:52', 19, '2020-04-08 07:45:52', 19),
	(863, 561, 184, 1, 1.00, 0.00, 100.00, 0, NULL, 0, NULL, NULL, '2020-04-08 07:51:28', 19, '2020-04-08 07:51:28', 19),
	(864, 560, 184, 1, 1.00, 0.00, 100.00, 0, NULL, 1, 0.00, '[]', '2020-04-08 07:51:51', 19, '2020-04-08 07:51:51', 19),
	(865, 560, 190, 1, 1.00, 0.00, 50.00, 0, NULL, 1, 0.00, '[]', '2020-04-08 07:59:25', 19, '2020-04-08 07:59:25', 19),
	(866, 560, 188, 4, 1.00, 0.00, 50.00, 0, NULL, 1, 0.00, '[]', '2020-04-08 08:01:51', 19, '2020-04-08 08:01:51', 19),
	(867, 560, 145, 1, 2.20, 0.00, 50.00, 0, NULL, 1, 0.00, '[]', '2020-04-08 08:37:47', 19, '2020-04-08 08:37:47', 19),
	(868, 562, 208, 1, 2.80, 0.00, 100.00, 0, NULL, 1, 0.00, '[]', '2020-04-08 08:37:58', 19, '2020-04-08 08:37:58', 19),
	(869, 560, 169, 2, 2.50, 0.00, 50.00, 0, NULL, 1, 0.00, '[]', '2020-04-08 09:10:26', 19, '2020-04-08 09:10:26', 19),
	(870, 563, 147, 1, 2.50, 0.00, 0.00, 0, NULL, 1, 0.00, '[]', '2020-04-08 10:56:12', 19, '2020-04-08 10:56:12', 19),
	(871, 564, 145, 1, 2.20, 0.00, 0.00, 0, NULL, 1, 0.00, '[]', '2020-04-08 11:04:05', 19, '2020-04-08 11:04:05', 19),
	(872, 565, 147, 1, 2.50, 0.00, 0.00, 0, NULL, 1, 0.00, '[]', '2020-04-08 11:40:44', 19, '2020-04-08 11:40:44', 19),
	(873, 566, 154, 1, 2.90, 0.00, 0.00, 0, NULL, 0, NULL, NULL, '2020-04-08 12:23:11', 19, '2020-04-08 12:23:11', 19),
	(874, 566, 158, 1, 2.80, 0.00, 0.00, 0, NULL, 1, 0.00, '[]', '2020-04-08 12:23:39', 19, '2020-04-08 12:23:39', 19),
	(875, 560, 185, 2, 1.00, 0.00, 50.00, 0, NULL, 1, 0.00, '[]', '2020-04-08 12:31:44', 19, '2020-04-08 12:31:44', 19),
	(876, 567, 149, 1, 2.50, 0.00, 100.00, 0, NULL, 1, 0.00, '[]', '2020-04-08 13:25:05', 19, '2020-04-08 13:25:05', 19),
	(877, 560, 187, 2, 1.00, 0.00, 50.00, 0, NULL, 1, 0.00, '[]', '2020-04-08 13:53:48', 19, '2020-04-08 13:53:48', 19),
	(878, 568, 149, 1, 2.50, 0.00, 100.00, 0, NULL, 1, 0.00, '[]', '2020-04-08 14:07:27', 19, '2020-04-08 14:07:27', 19),
	(879, 569, 146, 1, 2.50, 0.00, 0.00, 0, NULL, 1, 0.00, '[]', '2020-04-08 14:27:35', 19, '2020-04-08 14:27:35', 19),
	(880, 569, 186, 1, 1.50, 0.00, 0.00, 0, NULL, 1, 0.00, '[]', '2020-04-08 14:27:57', 19, '2020-04-08 14:27:57', 19),
	(881, 570, 182, 1, 2.80, 0.00, 0.00, 0, NULL, 0, NULL, NULL, '2020-04-08 15:05:17', 19, '2020-04-08 15:05:17', 19),
	(882, 570, 180, 1, 2.80, 0.00, 100.00, 0, NULL, 1, 0.00, '[]', '2020-04-08 15:05:26', 19, '2020-04-08 15:05:26', 19),
	(883, 571, 145, 1, 2.20, 0.00, 0.00, 0, NULL, 1, 0.00, '[]', '2020-04-08 15:32:19', 19, '2020-04-08 15:32:19', 19),
	(884, 572, 136, 2, 2.50, 0.00, 0.00, 0, NULL, 1, 0.00, '[]', '2020-04-08 15:42:19', 19, '2020-04-08 15:42:19', 19),
	(885, 573, 220, 1, 1.00, 0.00, 0.00, 0, NULL, 1, 0.00, '[]', '2020-04-08 17:47:11', 19, '2020-04-08 17:47:11', 19),
	(886, 574, 217, 1, 1.00, 0.00, 50.00, 0, NULL, 1, 0.00, '[]', '2020-04-09 07:38:53', 19, '2020-04-09 07:38:53', 19),
	(887, 574, 187, 6, 1.00, 0.00, 50.00, 0, NULL, 1, 0.00, '[]', '2020-04-09 08:06:53', 19, '2020-04-09 08:06:53', 19),
	(888, 574, 188, 5, 1.00, 0.00, 50.00, 0, NULL, 1, 0.00, '[]', '2020-04-09 08:08:52', 19, '2020-04-09 08:08:52', 19),
	(889, 574, 185, 2, 1.00, 0.00, 50.00, 0, NULL, 1, 0.00, '[]', '2020-04-09 08:43:04', 19, '2020-04-09 08:43:04', 19),
	(890, 574, 190, 2, 1.00, 0.00, 50.00, 0, NULL, 1, 0.00, '[]', '2020-04-09 08:56:04', 19, '2020-04-09 08:56:04', 19),
	(891, 575, 180, 1, 2.80, 0.00, 100.00, 0, NULL, 1, 0.00, '[]', '2020-04-09 09:19:45', 19, '2020-04-09 09:19:45', 19),
	(892, 576, 180, 1, 2.80, 0.00, 100.00, 0, NULL, 1, 0.00, '[]', '2020-04-09 09:20:18', 19, '2020-04-09 09:20:18', 19),
	(893, 577, 188, 1, 1.00, 0.00, 0.00, 0, NULL, 0, NULL, NULL, '2020-04-09 09:22:14', 19, '2020-04-09 09:22:14', 19),
	(894, 577, 180, 1, 2.80, 0.00, 100.00, 0, NULL, 1, 0.00, '[]', '2020-04-09 09:24:33', 19, '2020-04-09 09:24:33', 19),
	(895, 574, 103, 1, 2.50, 0.00, 50.00, 0, NULL, 1, 0.00, '[]', '2020-04-09 09:29:40', 19, '2020-04-09 09:29:40', 19),
	(896, 578, 87, 1, 2.30, 0.00, 0.00, 0, NULL, 1, 0.00, '[]', '2020-04-09 09:46:47', 19, '2020-04-09 09:46:47', 19),
	(897, 574, 174, 1, 2.90, 0.00, 0.00, 0, NULL, 0, NULL, NULL, '2020-04-09 10:47:33', 19, '2020-04-09 10:47:33', 19),
	(898, 574, 226, 1, 1.25, 0.00, 50.00, 0, NULL, 1, 0.00, '[]', '2020-04-09 10:49:59', 19, '2020-04-09 10:49:59', 19),
	(899, 579, 147, 2, 2.50, 0.00, 0.00, 0, NULL, 1, 0.00, '[]', '2020-04-09 12:04:55', 19, '2020-04-09 12:04:55', 19),
	(900, 579, 144, 1, 2.90, 0.00, 0.00, 0, NULL, 1, 0.00, '[]', '2020-04-09 12:05:01', 19, '2020-04-09 12:05:01', 19),
	(901, 580, 147, 1, 2.50, 0.00, 0.00, 0, NULL, 1, 0.00, '[]', '2020-04-09 13:04:42', 19, '2020-04-09 13:04:42', 19),
	(902, 581, 206, 2, 3.75, 0.00, 0.00, 0, NULL, 1, 0.00, '[]', '2020-04-09 13:14:33', 19, '2020-04-09 13:14:33', 19),
	(903, 582, 149, 1, 2.50, 0.00, 100.00, 0, NULL, 1, 0.00, '[]', '2020-04-09 13:37:01', 19, '2020-04-09 13:37:01', 19),
	(904, 583, 149, 1, 2.50, 0.00, 100.00, 0, NULL, 1, 0.00, '[]', '2020-04-09 14:00:34', 19, '2020-04-09 14:00:34', 19),
	(905, 584, 152, 1, 2.90, 0.00, 0.00, 0, NULL, 1, 0.00, '[]', '2020-04-09 14:27:44', 19, '2020-04-09 14:27:44', 19),
	(906, 585, 113, 1, 2.50, 0.00, 100.00, 0, NULL, 1, 0.00, '[]', '2020-04-09 14:57:16', 19, '2020-04-09 14:57:16', 19),
	(907, 586, 141, 1, 2.90, 0.00, 0.00, 0, NULL, 1, 0.00, '[]', '2020-04-09 15:13:43', 19, '2020-04-09 15:13:43', 19),
	(908, 587, 174, 1, 2.90, 0.00, 0.00, 0, NULL, 1, 0.00, '[]', '2020-04-09 15:56:28', 19, '2020-04-09 15:56:28', 19),
	(909, 574, 174, 1, 2.90, 0.00, 50.00, 0, NULL, 1, 0.00, '[]', '2020-04-09 15:57:46', 19, '2020-04-09 15:57:46', 19),
	(910, 588, 217, 1, 1.00, 0.00, 0.00, 0, NULL, 1, 0.00, '[]', '2020-04-09 16:54:17', 19, '2020-04-09 16:54:17', 19),
	(911, 589, 136, 1, 2.50, 0.00, 0.00, 0, NULL, 0, NULL, NULL, '2020-04-09 16:57:41', 19, '2020-04-09 16:57:41', 19),
	(912, 589, 188, 1, 1.00, 0.00, 50.00, 0, NULL, 1, 0.00, '[]', '2020-04-10 07:15:00', 19, '2020-04-10 07:15:00', 19),
	(913, 590, 217, 4, 1.00, 0.00, 50.00, 0, NULL, 1, 0.00, '[]', '2020-04-10 08:07:54', 19, '2020-04-10 08:07:54', 19),
	(914, 591, 214, 1, 3.50, 0.00, 0.00, 0, NULL, 1, 0.00, '[]', '2020-04-10 08:18:53', 19, '2020-04-10 08:18:53', 19),
	(915, 592, 92, 1, 2.30, 0.00, 0.00, 0, NULL, 1, 0.00, '[]', '2020-04-10 08:48:50', 19, '2020-04-10 08:48:50', 19),
	(916, 593, 145, 1, 2.20, 0.00, 0.00, 0, NULL, 0, NULL, NULL, '2020-04-10 09:28:19', 19, '2020-04-10 09:28:19', 19),
	(917, 590, 145, 3, 2.20, 0.00, 50.00, 0, NULL, 1, 0.00, '[]', '2020-04-10 09:28:32', 19, '2020-04-10 09:28:32', 19),
	(918, 594, 190, 1, 1.00, 0.00, 0.00, 0, NULL, 1, 0.00, '[]', '2020-04-10 09:36:44', 19, '2020-04-10 09:36:44', 19),
	(919, 594, 88, 1, 1.50, 0.00, 0.00, 0, NULL, 0, NULL, NULL, '2020-04-10 09:37:04', 19, '2020-04-10 09:37:04', 19),
	(920, 594, 213, 1, 1.80, 0.00, 0.00, 0, NULL, 1, 0.00, '[]', '2020-04-10 09:42:32', 19, '2020-04-10 09:42:32', 19),
	(921, 594, 145, 1, 2.20, 0.00, 0.00, 0, NULL, 0, NULL, NULL, '2020-04-10 09:44:45', 19, '2020-04-10 09:44:45', 19),
	(922, 593, 126, 1, 2.80, 0.00, 100.00, 0, NULL, 1, 0.00, '[]', '2020-04-10 10:15:03', 19, '2020-04-10 10:15:03', 19),
	(923, 595, 175, 1, 2.90, 0.00, 15.00, 0, NULL, 1, 0.00, '[]', '2020-04-10 11:26:09', 19, '2020-04-10 11:26:09', 19),
	(924, 590, 169, 1, 2.50, 0.00, 50.00, 0, NULL, 1, 0.00, '[]', '2020-04-10 11:35:50', 19, '2020-04-10 11:35:50', 19),
	(925, 590, 187, 2, 1.00, 0.00, 50.00, 0, NULL, 1, 0.00, '[]', '2020-04-10 12:24:02', 19, '2020-04-10 12:24:02', 19),
	(926, 596, 136, 1, 2.50, 0.00, 15.00, 0, NULL, 1, 0.00, '[]', '2020-04-10 12:32:13', 19, '2020-04-10 12:32:13', 19),
	(927, 597, 216, 1, 3.50, 0.00, 15.00, 0, NULL, 1, 0.00, '[]', '2020-04-10 12:36:27', 19, '2020-04-10 12:36:27', 19),
	(928, 598, 214, 1, 3.50, 0.00, 15.00, 0, NULL, 1, 0.00, '[]', '2020-04-10 12:42:05', 19, '2020-04-10 12:42:05', 19),
	(929, 598, 164, 1, 2.00, 0.00, 15.00, 0, NULL, 1, 0.00, '[]', '2020-04-10 12:45:57', 19, '2020-04-10 12:45:57', 19),
	(930, 590, 151, 1, 2.90, 0.00, 50.00, 0, NULL, 1, 0.00, '[]', '2020-04-10 12:48:30', 19, '2020-04-10 12:48:30', 19),
	(931, 599, 149, 1, 2.50, 0.00, 100.00, 0, NULL, 1, 0.00, '[]', '2020-04-10 13:06:42', 19, '2020-04-10 13:06:42', 19),
	(932, 600, 157, 1, 2.80, 0.00, 0.00, 0, NULL, 0, NULL, NULL, '2020-04-10 13:11:18', 19, '2020-04-10 13:11:18', 19),
	(933, 601, 152, 1, 2.90, 0.00, 20.00, 0, NULL, 1, 0.00, '[]', '2020-04-10 13:27:21', 19, '2020-04-10 13:27:21', 19),
	(934, 601, 206, 1, 3.75, 0.00, 20.00, 0, NULL, 1, 0.00, '[]', '2020-04-10 13:28:36', 19, '2020-04-10 13:28:36', 19),
	(935, 590, 220, 1, 1.00, 0.00, 50.00, 0, NULL, 1, 0.00, '[]', '2020-04-10 13:31:08', 19, '2020-04-10 13:31:08', 19),
	(936, 602, 151, 1, 2.90, 0.00, 0.00, 0, NULL, 1, 0.00, '[]', '2020-04-10 13:51:49', 19, '2020-04-10 13:51:49', 19),
	(937, 603, 175, 1, 2.90, 0.00, 0.00, 0, NULL, 1, 0.00, '[]', '2020-04-10 14:08:08', 19, '2020-04-10 14:08:08', 19),
	(938, 603, 195, 1, 3.00, 0.00, 0.00, 0, NULL, 1, 0.00, '[]', '2020-04-10 14:08:17', 19, '2020-04-10 14:08:17', 19),
	(939, 604, 176, 1, 0.75, 0.00, 0.00, 0, NULL, 1, 0.00, '[]', '2020-04-10 14:31:28', 19, '2020-04-10 14:31:28', 19),
	(940, 605, 87, 1, 2.30, 0.00, 0.00, 0, NULL, 1, 0.00, '[]', '2020-04-10 15:17:57', 19, '2020-04-10 15:17:57', 19),
	(941, 590, 184, 2, 1.00, 0.00, 50.00, 0, NULL, 1, 0.00, '[]', '2020-04-10 15:26:05', 19, '2020-04-10 15:26:05', 19),
	(942, 606, 192, 1, 3.00, 0.00, 0.00, 0, NULL, 1, 0.00, '[]', '2020-04-10 15:26:20', 19, '2020-04-10 15:26:20', 19),
	(943, 607, 141, 1, 2.90, 0.00, 0.00, 0, NULL, 1, 0.00, '[]', '2020-04-10 15:30:17', 19, '2020-04-10 15:30:17', 19),
	(944, 590, 188, 1, 1.00, 0.00, 50.00, 0, NULL, 1, 0.00, '[]', '2020-04-10 16:48:13', 19, '2020-04-10 16:48:13', 19),
	(945, 608, 216, 1, 3.50, 0.00, 0.00, 0, NULL, 1, 0.00, '[]', '2020-04-10 17:01:52', 19, '2020-04-10 17:01:52', 19),
	(946, 608, 228, 1, 1.80, 0.00, 0.00, 0, NULL, 1, 0.00, '[]', '2020-04-10 17:02:03', 19, '2020-04-10 17:02:03', 19),
	(947, 609, 176, 1, 0.75, 0.00, 0.00, 0, NULL, 1, 0.00, '[]', '2020-04-10 17:27:18', 19, '2020-04-10 17:27:18', 19),
	(948, 610, 86, 1, 1.90, 0.00, 0.00, 0, NULL, 1, 0.00, '[]', '2020-04-11 07:29:12', 19, '2020-04-11 07:29:12', 19),
	(949, 611, 217, 5, 1.00, 0.00, 50.00, 0, NULL, 1, 0.00, '[]', '2020-04-11 07:29:27', 19, '2020-04-11 07:29:27', 19),
	(950, 612, 146, 1, 2.50, 0.00, 0.00, 0, NULL, 1, 0.00, '[]', '2020-04-11 07:47:29', 19, '2020-04-11 07:47:29', 19),
	(951, 611, 184, 8, 1.00, 0.00, 50.00, 0, NULL, 1, 0.00, '[]', '2020-04-11 07:59:13', 19, '2020-04-11 07:59:13', 19),
	(952, 611, 149, 1, 2.50, 0.00, 50.00, 0, NULL, 1, 0.00, '[]', '2020-04-11 08:26:24', 19, '2020-04-11 08:26:24', 19),
	(953, 613, 203, 1, 2.50, 0.00, 100.00, 0, NULL, 1, 0.00, '[]', '2020-04-11 09:01:10', 19, '2020-04-11 09:01:10', 19),
	(954, 611, 188, 2, 1.00, 0.00, 50.00, 0, NULL, 1, 0.00, '[]', '2020-04-11 09:17:02', 19, '2020-04-11 09:17:02', 19),
	(955, 614, 216, 1, 3.50, 0.00, 0.00, 0, NULL, 1, 0.00, '[]', '2020-04-11 09:28:39', 19, '2020-04-11 09:28:39', 19),
	(956, 615, 152, 1, 2.90, 0.00, 0.00, 0, NULL, 1, 0.00, '[]', '2020-04-11 10:13:58', 19, '2020-04-11 10:13:58', 19),
	(957, 616, 89, 1, 2.30, 0.00, 0.00, 0, NULL, 1, 0.00, '[]', '2020-04-11 11:16:54', 19, '2020-04-11 11:16:54', 19),
	(958, 617, 149, 1, 2.50, 0.00, 100.00, 0, NULL, 1, 0.00, '[]', '2020-04-11 11:33:35', 19, '2020-04-11 11:33:35', 19),
	(959, 618, 207, 1, 3.50, 0.00, 0.00, 0, NULL, 1, 0.00, '[]', '2020-04-11 12:28:11', 19, '2020-04-11 12:28:11', 19),
	(960, 611, 183, 1, 1.00, 0.00, 50.00, 0, NULL, 1, 0.00, '[]', '2020-04-11 12:49:36', 19, '2020-04-11 12:49:36', 19),
	(961, 619, 170, 1, 2.50, 0.00, 0.00, 0, NULL, 1, 0.00, '[]', '2020-04-11 13:08:55', 19, '2020-04-11 13:08:55', 19),
	(962, 620, 145, 1, 2.20, 0.00, 0.00, 0, NULL, 1, 0.00, '[]', '2020-04-11 13:14:56', 19, '2020-04-11 13:14:56', 19),
	(963, 621, 180, 1, 2.80, 0.00, 100.00, 0, NULL, 1, 0.00, '[]', '2020-04-11 13:56:45', 19, '2020-04-11 13:56:45', 19),
	(964, 622, 101, 1, 2.50, 0.00, 100.00, 0, NULL, 1, 0.00, '[]', '2020-04-11 14:11:10', 19, '2020-04-11 14:11:10', 19),
	(965, 622, 192, 1, 3.00, 0.00, 100.00, 0, NULL, 1, 0.00, '[]', '2020-04-11 14:11:20', 19, '2020-04-11 14:11:20', 19),
	(966, 623, 149, 1, 2.50, 0.00, 100.00, 0, NULL, 1, 0.00, '[]', '2020-04-11 14:15:44', 19, '2020-04-11 14:15:44', 19),
	(967, 624, 136, 1, 2.50, 0.00, 0.00, 0, NULL, 1, 0.00, '[]', '2020-04-11 15:00:18', 19, '2020-04-11 15:00:18', 19),
	(968, 624, 141, 1, 2.90, 0.00, 0.00, 0, NULL, 1, 0.00, '[]', '2020-04-11 15:08:04', 19, '2020-04-11 15:08:04', 19),
	(969, 611, 204, 1, 2.90, 0.00, 50.00, 0, NULL, 1, 0.00, '[]', '2020-04-11 15:26:53', 19, '2020-04-11 15:26:53', 19),
	(970, 625, 141, 1, 2.90, 0.00, 0.00, 0, NULL, 1, 0.00, '[]', '2020-04-11 15:50:29', 19, '2020-04-11 15:50:29', 19),
	(971, 626, 217, 1, 1.00, 0.00, 50.00, 0, NULL, 1, 0.00, '[]', '2020-04-11 16:47:16', 19, '2020-04-11 16:47:16', 19),
	(972, 627, 168, 1, 2.50, 0.00, 50.00, 0, NULL, 1, 0.00, '[]', '2020-04-11 17:13:06', 19, '2020-04-11 17:13:06', 19),
	(973, 628, 184, 6, 1.00, 0.00, 50.00, 0, NULL, 1, 0.00, '[]', '2020-04-17 07:20:18', 19, '2020-04-17 07:20:18', 19),
	(974, 629, 227, 1, 1.80, 0.00, 50.00, 0, NULL, 1, 0.00, '[]', '2020-04-17 07:58:35', 19, '2020-04-17 07:58:35', 19),
	(975, 629, 190, 3, 1.00, 0.00, 50.00, 0, NULL, 1, 0.00, '[]', '2020-04-17 08:02:25', 19, '2020-04-17 08:02:25', 19),
	(976, 629, 184, 2, 1.00, 0.00, 100.00, 0, NULL, 1, 0.00, '[]', '2020-04-17 08:08:44', 19, '2020-04-17 08:08:44', 19),
	(977, 630, 183, 1, 1.00, 0.00, 0.00, 0, NULL, 1, 0.00, '[]', '2020-04-17 09:07:20', 19, '2020-04-17 09:07:20', 19),
	(978, 631, 215, 1, 3.00, 0.00, 0.00, 0, NULL, 1, 0.00, '[]', '2020-04-17 09:09:51', 19, '2020-04-17 09:09:51', 19),
	(979, 629, 187, 1, 1.00, 0.00, 50.00, 0, NULL, 1, 0.00, '[]', '2020-04-17 09:25:07', 19, '2020-04-17 09:25:07', 19),
	(980, 629, 185, 1, 1.00, 0.00, 0.00, 0, NULL, 0, NULL, NULL, '2020-04-17 09:28:05', 19, '2020-04-17 09:28:05', 19),
	(981, 629, 188, 10, 1.00, 0.00, 50.00, 0, NULL, 1, 0.00, '[]', '2020-04-17 09:28:09', 19, '2020-04-17 09:28:09', 19),
	(982, 629, 145, 1, 2.20, 0.00, 50.00, 0, NULL, 1, 0.00, '[]', '2020-04-17 09:48:46', 19, '2020-04-17 09:48:46', 19),
	(983, 632, 103, 1, 2.50, 0.00, 0.00, 0, NULL, 1, 0.00, '[]', '2020-04-17 09:53:55', 19, '2020-04-17 09:53:55', 19),
	(984, 633, 228, 1, 1.80, 0.00, 0.00, 0, NULL, 1, 0.00, '[]', '2020-04-17 10:10:47', 19, '2020-04-17 10:10:47', 19),
	(985, 634, 168, 1, 2.50, 0.00, 100.00, 0, NULL, 1, 0.00, '[]', '2020-04-17 10:23:17', 19, '2020-04-17 10:23:17', 19),
	(986, 635, 203, 1, 2.50, 0.00, 100.00, 0, NULL, 1, 0.00, '[]', '2020-04-17 10:25:34', 19, '2020-04-17 10:25:34', 19),
	(987, 636, 205, 1, 3.75, 0.00, 0.00, 0, NULL, 0, NULL, NULL, '2020-04-17 10:33:54', 19, '2020-04-17 10:33:54', 19),
	(988, 632, 205, 1, 3.75, 0.00, 0.00, 0, NULL, 1, 0.00, '[]', '2020-04-17 10:34:04', 19, '2020-04-17 10:34:04', 19),
	(989, 637, 190, 1, 1.00, 0.00, 0.00, 0, NULL, 1, 0.00, '[]', '2020-04-17 11:04:05', 19, '2020-04-17 11:04:05', 19),
	(990, 629, 184, 4, 1.00, 0.00, 50.00, 0, NULL, 1, 0.00, '[]', '2020-04-17 13:09:13', 19, '2020-04-17 13:09:13', 19),
	(991, 629, 149, 1, 2.50, 0.00, 50.00, 0, NULL, 1, 0.00, '[]', '2020-04-17 13:09:21', 19, '2020-04-17 13:09:21', 19),
	(992, 629, 223, 1, 1.80, 0.00, 50.00, 0, NULL, 1, 0.00, '[]', '2020-04-17 14:11:36', 19, '2020-04-17 14:11:36', 19),
	(993, 636, 195, 2, 3.00, 0.00, 0.00, 0, NULL, 1, 0.00, '[]', '2020-04-17 14:45:17', 19, '2020-04-17 14:45:17', 19),
	(994, 638, 221, 1, 1.80, 0.00, 0.00, 0, NULL, 1, 0.00, '[]', '2020-04-17 15:47:15', 19, '2020-04-17 15:47:15', 19),
	(995, 638, 190, 1, 1.00, 0.00, 0.00, 0, NULL, 1, 0.00, '[]', '2020-04-17 15:47:21', 19, '2020-04-17 15:47:21', 19),
	(996, 638, 119, 1, 2.50, 0.00, 0.00, 0, NULL, 1, 0.00, '[]', '2020-04-17 15:47:27', 19, '2020-04-17 15:47:27', 19),
	(997, 639, 186, 1, 1.50, 0.00, 0.00, 0, NULL, 1, 0.00, '[]', '2020-04-17 16:50:31', 19, '2020-04-17 16:50:31', 19),
	(998, 640, 207, 1, 3.50, 0.00, 0.00, 0, NULL, 1, 0.00, '[]', '2020-04-17 17:17:34', 19, '2020-04-17 17:17:34', 19),
	(999, 641, 192, 1, 3.00, 0.00, 100.00, 0, NULL, 1, 0.00, '[]', '2020-04-17 18:57:44', 19, '2020-04-17 18:57:44', 19),
	(1000, 642, 190, 1, 1.00, 0.00, 50.00, 0, NULL, 1, 0.00, '[]', '2020-04-18 07:46:54', 19, '2020-04-18 07:46:54', 19),
	(1001, 642, 187, 2, 1.00, 0.00, 50.00, 0, NULL, 1, 0.00, '[]', '2020-04-18 08:08:44', 19, '2020-04-18 08:08:44', 19),
	(1002, 642, 147, 1, 2.50, 0.00, 50.00, 0, NULL, 1, 0.00, '[]', '2020-04-18 08:27:14', 19, '2020-04-18 08:27:14', 19),
	(1003, 642, 183, 1, 1.00, 0.00, 50.00, 0, NULL, 1, 0.00, '[]', '2020-04-18 08:57:05', 19, '2020-04-18 08:57:05', 19),
	(1004, 643, 213, 1, 1.80, 0.00, 0.00, 0, NULL, 1, 0.00, '[]', '2020-04-18 09:02:02', 19, '2020-04-18 09:02:02', 19),
	(1005, 644, 147, 1, 2.50, 0.00, 0.00, 0, NULL, 1, 0.00, '[]', '2020-04-18 09:40:58', 19, '2020-04-18 09:40:58', 19),
	(1006, 642, 217, 1, 1.00, 0.00, 50.00, 0, NULL, 0, NULL, NULL, '2020-04-18 09:55:15', 19, '2020-04-18 09:55:15', 19),
	(1007, 642, 226, 1, 1.25, 0.00, 50.00, 0, NULL, 1, 0.00, '[]', '2020-04-18 09:56:19', 19, '2020-04-18 09:56:19', 19),
	(1008, 645, 147, 1, 2.50, 0.00, 0.00, 0, NULL, 1, 0.00, '[]', '2020-04-18 10:22:19', 19, '2020-04-18 10:22:19', 19),
	(1009, 642, 220, 1, 1.00, 0.00, 50.00, 0, NULL, 1, 0.00, '[]', '2020-04-18 10:23:11', 19, '2020-04-18 10:23:11', 19),
	(1010, 646, 205, 1, 3.75, 0.00, 0.00, 0, NULL, 1, 0.00, '[]', '2020-04-18 10:36:28', 19, '2020-04-18 10:36:28', 19),
	(1011, 647, 220, 4, 1.00, 0.00, 0.00, 0, NULL, 0, NULL, NULL, '2020-04-18 10:39:17', 19, '2020-04-18 10:39:17', 19),
	(1012, 648, 216, 1, 3.50, 0.00, 0.00, 0, NULL, 1, 0.00, '[]', '2020-04-18 11:11:37', 19, '2020-04-18 11:11:37', 19),
	(1013, 642, 217, 2, 1.00, 0.00, 50.00, 0, NULL, 1, 0.00, '[]', '2020-04-18 12:52:01', 19, '2020-04-18 12:52:01', 19),
	(1014, 642, 184, 5, 1.00, 0.00, 50.00, 0, NULL, 1, 0.00, '[]', '2020-04-18 13:29:53', 19, '2020-04-18 13:29:53', 19),
	(1015, 649, 149, 2, 2.50, 0.00, 100.00, 0, NULL, 1, 0.00, '[]', '2020-04-18 13:31:17', 19, '2020-04-18 13:31:17', 19),
	(1016, 650, 136, 1, 2.50, 0.00, 0.00, 0, NULL, 1, 0.00, '[]', '2020-04-18 14:23:24', 19, '2020-04-18 14:23:24', 19),
	(1017, 651, 180, 1, 2.80, 0.00, 0.00, 0, NULL, 1, 0.00, '[]', '2020-04-18 14:26:17', 19, '2020-04-18 14:26:17', 19),
	(1018, 652, 147, 1, 2.50, 0.00, 0.00, 0, NULL, 1, 0.00, '[]', '2020-04-18 14:30:00', 19, '2020-04-18 14:30:00', 19),
	(1019, 642, 188, 3, 1.00, 0.00, 50.00, 0, NULL, 1, 0.00, '[]', '2020-04-18 15:03:05', 19, '2020-04-18 15:03:05', 19),
	(1020, 653, 146, 1, 2.50, 0.00, 0.00, 0, NULL, 0, NULL, NULL, '2020-04-18 15:30:36', 19, '2020-04-18 15:30:36', 19),
	(1021, 654, 136, 1, 2.50, 0.00, 100.00, 0, NULL, 1, 0.00, '[]', '2020-04-18 15:31:38', 19, '2020-04-18 15:31:38', 19),
	(1022, 655, 202, 1, 1.00, 0.00, 0.00, 0, NULL, 0, NULL, NULL, '2020-04-18 17:05:12', 19, '2020-04-18 17:05:12', 19),
	(1023, 655, 220, 2, 1.00, 0.00, 0.00, 0, NULL, 1, 0.00, '[]', '2020-04-18 17:05:20', 19, '2020-04-18 17:05:20', 19),
	(1024, 655, 206, 1, 3.75, 0.00, 0.00, 0, NULL, 1, 0.00, '[]', '2020-04-18 17:05:40', 19, '2020-04-18 17:05:40', 19),
	(1025, 655, 214, 1, 3.50, 0.00, 0.00, 0, NULL, 1, 0.00, '[]', '2020-04-18 17:05:43', 19, '2020-04-18 17:05:43', 19),
	(1026, 655, 165, 1, 2.30, 0.00, 0.00, 0, NULL, 1, 0.00, '[]', '2020-04-18 17:06:06', 19, '2020-04-18 17:06:06', 19),
	(1027, 655, 87, 1, 2.30, 0.00, 0.00, 0, NULL, 1, 0.00, '[]', '2020-04-18 17:06:13', 19, '2020-04-18 17:06:13', 19),
	(1028, 656, 220, 1, 1.00, 0.00, 0.00, 0, NULL, 1, 0.00, '[]', '2020-04-18 17:54:34', 19, '2020-04-18 17:54:34', 19),
	(1029, 642, 223, 1, 1.80, 0.00, 50.00, 0, NULL, 1, 0.00, '[]', '2020-04-18 19:04:39', 19, '2020-04-18 19:04:39', 19),
	(1030, 642, 228, 1, 1.80, 0.00, 50.00, 0, NULL, 1, 0.00, '[]', '2020-04-18 19:04:45', 19, '2020-04-18 19:04:45', 19),
	(1031, 653, 176, 1, 0.75, 0.00, 0.00, 0, NULL, 1, 0.00, '[]', '2020-04-19 07:12:16', 19, '2020-04-19 07:12:16', 19),
	(1032, 647, 217, 1, 1.00, 0.00, 50.00, 0, NULL, 1, 0.00, '[]', '2020-04-19 07:32:18', 19, '2020-04-19 07:32:18', 19),
	(1033, 647, 184, 5, 1.00, 0.00, 50.00, 0, NULL, 1, 0.00, '[]', '2020-04-19 07:51:24', 19, '2020-04-19 07:51:24', 19),
	(1034, 657, 180, 1, 2.80, 0.00, 100.00, 0, NULL, 1, 0.00, '[]', '2020-04-19 08:12:28', 19, '2020-04-19 08:12:28', 19),
	(1035, 658, 214, 1, 3.50, 0.00, 0.00, 0, NULL, 0, NULL, NULL, '2020-04-19 09:31:42', 19, '2020-04-19 09:31:42', 19),
	(1036, 658, 192, 1, 3.00, 0.00, 0.00, 0, NULL, 0, NULL, NULL, '2020-04-19 09:31:50', 19, '2020-04-19 09:31:50', 19),
	(1037, 658, 154, 2, 2.90, 0.00, 0.00, 0, NULL, 1, 0.00, '[]', '2020-04-19 09:59:43', 19, '2020-04-19 09:59:43', 19),
	(1038, 659, 205, 1, 3.75, 0.00, 0.00, 0, NULL, 1, 0.00, '[]', '2020-04-19 10:52:27', 19, '2020-04-19 10:52:27', 19),
	(1039, 659, 206, 1, 3.75, 0.00, 0.00, 0, NULL, 1, 0.00, '[]', '2020-04-19 10:52:29', 19, '2020-04-19 10:52:29', 19),
	(1040, 647, 188, 2, 1.00, 0.00, 50.00, 0, NULL, 1, 0.00, '[]', '2020-04-19 12:39:34', 19, '2020-04-19 12:39:34', 19),
	(1041, 660, 152, 1, 2.90, 0.00, 0.00, 0, NULL, 1, 0.00, '[]', '2020-04-19 12:39:44', 19, '2020-04-19 12:39:44', 19),
	(1042, 661, 149, 1, 2.50, 0.00, 100.00, 0, NULL, 1, 0.00, '[]', '2020-04-19 13:08:37', 19, '2020-04-19 13:08:37', 19),
	(1043, 662, 149, 1, 2.50, 0.00, 100.00, 0, NULL, 1, 0.00, '[]', '2020-04-19 13:09:36', 19, '2020-04-19 13:09:36', 19),
	(1044, 647, 183, 2, 1.00, 0.00, 50.00, 0, NULL, 1, 0.00, '[]', '2020-04-19 13:28:14', 19, '2020-04-19 13:28:14', 19),
	(1045, 647, 169, 2, 2.50, 0.00, 50.00, 0, NULL, 1, 0.00, '[]', '2020-04-19 13:57:24', 19, '2020-04-19 13:57:24', 19),
	(1046, 663, 220, 1, 1.00, 0.00, 0.00, 0, NULL, 0, NULL, NULL, '2020-04-19 14:34:58', 19, '2020-04-19 14:34:58', 19),
	(1047, 647, 190, 1, 1.00, 0.00, 50.00, 0, NULL, 1, 0.00, '[]', '2020-04-19 14:35:17', 19, '2020-04-19 14:35:17', 19),
	(1048, 663, 152, 1, 2.90, 0.00, 0.00, 0, NULL, 1, 0.00, '[]', '2020-04-19 14:40:17', 19, '2020-04-19 14:40:17', 19),
	(1049, 664, 217, 1, 1.00, 0.00, 50.00, 0, NULL, 1, 0.00, '[]', '2020-04-20 07:29:45', 19, '2020-04-20 07:29:45', 19),
	(1050, 665, 86, 1, 1.90, 0.00, 15.00, 0, NULL, 1, 0.00, '[]', '2020-04-20 07:54:00', 19, '2020-04-20 07:54:00', 19),
	(1051, 666, 152, 1, 2.90, 0.00, 15.00, 0, NULL, 1, 0.00, '[]', '2020-04-20 08:05:00', 19, '2020-04-20 08:05:00', 19),
	(1052, 667, 188, 1, 1.00, 0.00, 50.00, 0, NULL, 1, 0.00, '[]', '2020-04-20 08:09:55', 19, '2020-04-20 08:09:55', 19),
	(1053, 668, 151, 1, 2.90, 0.00, 15.00, 0, NULL, 1, 0.00, '[]', '2020-04-20 08:32:05', 19, '2020-04-20 08:32:05', 19),
	(1054, 669, 205, 2, 3.75, 0.00, 15.00, 2, NULL, 1, 0.00, '[]', '2020-04-20 09:12:59', 19, '2020-04-20 09:12:59', 19),
	(1055, 669, 207, 1, 3.50, 0.00, 15.00, 0, NULL, 1, 0.00, '[]', '2020-04-20 09:28:47', 19, '2020-04-20 09:28:47', 19),
	(1056, 670, 183, 1, 1.00, 0.00, 0.00, 0, NULL, 0, NULL, NULL, '2020-04-20 09:54:02', 19, '2020-04-20 09:54:02', 19),
	(1057, 670, 184, 1, 1.00, 0.00, 0.00, 0, NULL, 0, NULL, NULL, '2020-04-20 09:54:07', 19, '2020-04-20 09:54:07', 19),
	(1058, 670, 184, 1, 1.00, 0.00, 50.00, 0, NULL, 1, 0.00, '[]', '2020-04-20 09:54:38', 19, '2020-04-20 09:54:38', 19),
	(1059, 670, 183, 1, 1.00, 0.00, 50.00, 0, NULL, 1, 0.00, '[]', '2020-04-20 09:54:39', 19, '2020-04-20 09:54:39', 19),
	(1060, 671, 126, 1, 2.80, 0.00, 100.00, 0, NULL, 1, 0.00, '[]', '2020-04-20 09:59:20', 19, '2020-04-20 09:59:20', 19),
	(1061, 672, 149, 1, 2.50, 0.00, 15.00, 0, NULL, 1, 0.00, '[]', '2020-04-20 10:51:32', 19, '2020-04-20 10:51:32', 19),
	(1062, 673, 217, 2, 1.00, 0.00, 50.00, 0, NULL, 1, 0.00, '[]', '2020-04-20 11:54:46', 19, '2020-04-20 11:54:46', 19),
	(1063, 674, 205, 1, 3.75, 0.00, 15.00, 0, NULL, -1, NULL, NULL, '2020-04-20 12:26:30', 19, '2020-04-20 12:26:30', 19),
	(1064, 674, 141, 1, 2.90, 0.00, 15.00, 0, NULL, -1, NULL, NULL, '2020-04-20 12:46:26', 19, '2020-04-20 12:46:26', 19),
	(1065, 675, 164, 1, 2.00, 0.00, 15.00, 0, NULL, 1, 0.00, '[]', '2020-04-20 12:55:04', 19, '2020-04-20 12:55:04', 19),
	(1066, 676, 216, 1, 3.50, 0.00, 15.00, 0, NULL, 1, 0.00, '[]', '2020-04-20 13:07:24', 19, '2020-04-20 13:07:24', 19),
	(1067, 677, 124, 1, 2.90, 0.00, 100.00, 0, NULL, 1, 0.00, '[]', '2020-04-20 13:31:29', 19, '2020-04-20 13:31:29', 19),
	(1068, 678, 184, 2, 1.00, 0.00, 50.00, 0, NULL, 1, 0.00, '[]', '2020-04-20 13:50:06', 19, '2020-04-20 13:50:06', 19),
	(1069, 679, 149, 1, 2.50, 0.00, 100.00, 0, NULL, 1, 0.00, '[]', '2020-04-20 14:01:46', 19, '2020-04-20 14:01:46', 19),
	(1070, 680, 149, 1, 2.50, 0.00, 100.00, 0, NULL, 1, 0.00, '[]', '2020-04-20 14:02:13', 19, '2020-04-20 14:02:13', 19),
	(1071, 681, 184, 1, 1.00, 0.00, 50.00, 0, NULL, 1, 0.00, '[]', '2020-04-20 14:03:36', 19, '2020-04-20 14:03:36', 19),
	(1072, 681, 217, 1, 1.00, 0.00, 50.00, 0, NULL, 1, 0.00, '[]', '2020-04-20 14:03:41', 19, '2020-04-20 14:03:41', 19),
	(1073, 682, 195, 1, 3.00, 0.00, 15.00, 0, NULL, 1, 0.00, '[]', '2020-04-20 14:11:02', 19, '2020-04-20 14:11:02', 19),
	(1074, 676, 186, 1, 1.50, 0.00, 15.00, 0, NULL, 1, 0.00, '[]', '2020-04-20 15:03:48', 19, '2020-04-20 15:03:48', 19),
	(1075, 683, 178, 2, 2.90, 0.00, 15.00, 0, NULL, 1, 0.00, '[]', '2020-04-20 15:12:34', 19, '2020-04-20 15:12:34', 19),
	(1076, 684, 148, 1, 2.50, 0.00, 15.00, 0, NULL, 1, 0.00, '[]', '2020-04-20 15:29:27', 19, '2020-04-20 15:29:27', 19),
	(1077, 684, 145, 1, 2.20, 0.00, 15.00, 0, NULL, 1, 0.00, '[]', '2020-04-20 15:29:30', 19, '2020-04-20 15:29:30', 19),
	(1078, 684, 223, 1, 1.80, 0.00, 15.00, 0, NULL, 1, 0.00, '[]', '2020-04-20 15:29:38', 19, '2020-04-20 15:29:38', 19),
	(1079, 685, 147, 1, 2.50, 0.00, 0.00, 0, NULL, 1, 0.00, '[]', '2020-04-20 15:32:36', 19, '2020-04-20 15:32:36', 19),
	(1080, 686, 184, 2, 1.00, 0.00, 50.00, 0, NULL, 1, 0.00, '[]', '2020-04-20 15:54:52', 19, '2020-04-20 15:54:52', 19),
	(1081, 676, 176, 1, 0.75, 0.00, 15.00, 0, NULL, 1, 0.00, '[]', '2020-04-20 16:22:51', 19, '2020-04-20 16:22:51', 19),
	(1082, 676, 217, 1, 1.00, 0.00, 15.00, 0, NULL, 1, 0.00, '[]', '2020-04-20 16:22:56', 19, '2020-04-20 16:22:56', 19),
	(1083, 687, 231, 1, 3.00, 0.00, 0.00, 0, NULL, 1, 0.00, '[]', '2020-04-20 16:40:46', 19, '2020-04-20 16:40:46', 19),
	(1084, 676, 107, 1, 2.50, 0.00, 15.00, 0, NULL, 1, 0.00, '[]', '2020-04-20 18:48:39', 19, '2020-04-20 18:48:39', 19),
	(1085, 686, 188, 1, 1.00, 0.00, 50.00, 0, NULL, 1, 0.00, '[]', '2020-04-20 19:00:35', 19, '2020-04-20 19:00:35', 19),
	(1086, 688, 152, 1, 2.90, 0.00, 0.00, 0, NULL, 1, 0.00, '[]', '2020-04-21 07:38:05', 19, '2020-04-21 07:38:05', 19),
	(1087, 689, 89, 1, 2.30, 0.00, 0.00, 0, NULL, 1, 0.00, '[]', '2020-04-21 08:04:47', 19, '2020-04-21 08:04:47', 19),
	(1088, 690, 207, 1, 3.50, 0.00, 0.00, 0, NULL, 1, 0.00, '[]', '2020-04-21 08:30:28', 19, '2020-04-21 08:30:28', 19),
	(1089, 691, 183, 2, 1.00, 0.00, 50.00, 0, NULL, 1, 0.00, '[]', '2020-04-21 09:02:18', 19, '2020-04-21 09:02:18', 19),
	(1090, 691, 188, 5, 1.00, 0.00, 50.00, 0, NULL, 1, 0.00, '[]', '2020-04-21 09:02:20', 19, '2020-04-21 09:02:20', 19),
	(1091, 691, 149, 1, 2.50, 0.00, 50.00, 0, NULL, 1, 0.00, '[]', '2020-04-21 09:02:28', 19, '2020-04-21 09:02:28', 19),
	(1092, 691, 184, 7, 1.00, 0.00, 50.00, 0, NULL, 1, 0.00, '[]', '2020-04-21 09:14:38', 19, '2020-04-21 09:14:38', 19),
	(1093, 692, 180, 1, 2.80, 0.00, 0.00, 0, NULL, 1, 0.00, '[]', '2020-04-21 09:23:38', 19, '2020-04-21 09:23:38', 19),
	(1094, 693, 208, 1, 2.80, 0.00, 100.00, 0, NULL, 1, 0.00, '[]', '2020-04-21 09:51:20', 19, '2020-04-21 09:51:20', 19),
	(1095, 691, 217, 1, 1.00, 0.00, 50.00, 0, NULL, 1, 0.00, '[]', '2020-04-21 10:22:33', 19, '2020-04-21 10:22:33', 19),
	(1096, 694, 216, 1, 3.50, 0.00, 0.00, 0, NULL, 0, NULL, NULL, '2020-04-21 10:27:16', 19, '2020-04-21 10:27:16', 19),
	(1097, 694, 215, 1, 3.00, 0.00, 0.00, 0, NULL, 0, NULL, NULL, '2020-04-21 10:27:18', 19, '2020-04-21 10:27:18', 19),
	(1098, 694, 122, 1, 2.90, 0.00, 0.00, 0, NULL, 1, 0.00, '[]', '2020-04-21 10:27:34', 19, '2020-04-21 10:27:34', 19),
	(1099, 694, 214, 1, 3.50, 0.00, 0.00, 0, NULL, 1, 0.00, '[]', '2020-04-21 10:30:30', 19, '2020-04-21 10:30:30', 19),
	(1100, 694, 206, 1, 3.75, 0.00, 0.00, 0, NULL, 1, 0.00, '[]', '2020-04-21 10:30:32', 19, '2020-04-21 10:30:32', 19),
	(1101, 695, 228, 1, 1.80, 0.00, 0.00, 0, NULL, 1, 0.00, '[]', '2020-04-21 10:51:26', 19, '2020-04-21 10:51:26', 19),
	(1102, 691, 185, 1, 1.00, 0.00, 50.00, 0, NULL, 1, 0.00, '[]', '2020-04-21 10:54:01', 19, '2020-04-21 10:54:01', 19),
	(1103, 696, 147, 1, 2.50, 0.00, 100.00, 0, NULL, 1, 0.00, '[]', '2020-04-21 12:17:51', 19, '2020-04-21 12:17:51', 19),
	(1104, 697, 221, 1, 1.80, 0.00, 50.00, 0, NULL, 1, 0.00, '[]', '2020-04-21 12:26:59', 19, '2020-04-21 12:26:59', 19),
	(1105, 698, 152, 2, 2.90, 0.00, 15.00, 0, NULL, 1, 0.00, '[]', '2020-04-21 12:31:33', 19, '2020-04-21 12:31:33', 19),
	(1106, 698, 207, 1, 3.50, 0.00, 15.00, 0, NULL, 1, 0.00, '[]', '2020-04-21 12:34:48', 19, '2020-04-21 12:34:48', 19),
	(1107, 699, 231, 1, 3.00, 0.00, 0.00, 0, NULL, 1, 0.00, '[]', '2020-04-21 12:36:37', 19, '2020-04-21 12:36:37', 19),
	(1108, 700, 231, 3, 3.00, 0.00, 100.00, 0, NULL, 1, 0.00, '[]', '2020-04-21 13:03:17', 19, '2020-04-21 13:03:17', 19),
	(1109, 701, 214, 1, 3.50, 0.00, 0.00, 0, NULL, 1, 0.00, '[]', '2020-04-21 13:06:31', 19, '2020-04-21 13:06:31', 19),
	(1110, 701, 207, 1, 3.50, 0.00, 0.00, 0, NULL, 1, 0.00, '[]', '2020-04-21 13:06:57', 19, '2020-04-21 13:06:57', 19),
	(1111, 702, 232, 1, 3.50, 0.00, 0.00, 0, NULL, 0, NULL, NULL, '2020-04-21 13:15:08', 19, '2020-04-21 13:15:08', 19),
	(1112, 703, 128, 1, 2.80, 0.00, 0.00, 0, NULL, 1, 0.00, '[]', '2020-04-21 13:17:07', 19, '2020-04-21 13:17:07', 19),
	(1113, 701, 232, 1, 3.50, 0.00, 0.00, 0, NULL, 1, 0.00, '[]', '2020-04-21 13:42:39', 19, '2020-04-21 13:42:39', 19),
	(1114, 691, 190, 2, 1.00, 0.00, 50.00, 0, NULL, 1, 0.00, '[]', '2020-04-21 14:03:46', 19, '2020-04-21 14:03:46', 19),
	(1115, 702, 145, 1, 2.20, 0.00, 0.00, 0, NULL, 1, 0.00, '[]', '2020-04-21 14:10:56', 19, '2020-04-21 14:10:56', 19),
	(1116, 704, 205, 2, 3.75, 0.00, 0.00, 0, NULL, 1, 0.00, '[]', '2020-04-21 15:36:44', 19, '2020-04-21 15:36:44', 19),
	(1117, 691, 174, 1, 2.90, 0.00, 50.00, 0, NULL, 0, NULL, NULL, '2020-04-21 15:59:50', 19, '2020-04-21 15:59:50', 19),
	(1118, 705, 174, 1, 2.90, 0.00, 0.00, 0, NULL, 1, 0.00, '[]', '2020-04-21 16:02:46', 19, '2020-04-21 16:02:46', 19),
	(1119, 706, 195, 1, 3.00, 0.00, 0.00, 0, NULL, 1, 0.00, '[]', '2020-04-21 16:20:37', 19, '2020-04-21 16:20:37', 19),
	(1120, 707, 220, 2, 1.00, 0.00, 0.00, 0, NULL, 1, 0.00, '[]', '2020-04-21 17:57:20', 19, '2020-04-21 17:57:20', 19),
	(1121, 707, 231, 1, 3.00, 0.00, 0.00, 0, NULL, 1, 0.00, '[]', '2020-04-21 17:57:42', 19, '2020-04-21 17:57:42', 19),
	(1122, 708, 205, 1, 3.75, 0.00, 0.00, 0, NULL, -1, NULL, NULL, '2020-04-21 18:14:37', 19, '2020-04-21 18:14:37', 19),
	(1123, 709, 184, 7, 1.00, 0.00, 50.00, 0, NULL, 1, NULL, NULL, '2020-04-22 07:37:14', 19, '2020-04-22 07:37:14', 19),
	(1124, 710, 180, 1, 2.80, 0.00, 100.00, 0, NULL, 1, 0.00, '[]', '2020-04-22 08:04:02', 19, '2020-04-22 08:04:02', 19),
	(1125, 709, 220, 1, 1.00, 0.00, 50.00, 0, NULL, 1, NULL, NULL, '2020-04-22 08:15:14', 19, '2020-04-22 08:15:14', 19),
	(1126, 709, 149, 1, 2.50, 0.00, 50.00, 0, NULL, 1, NULL, NULL, '2020-04-22 08:35:43', 19, '2020-04-22 08:35:43', 19),
	(1127, 709, 184, 1, 1.00, 0.00, 100.00, 0, NULL, 1, NULL, NULL, '2020-04-22 08:44:32', 19, '2020-04-22 08:44:32', 19),
	(1128, 711, 152, 2, 2.90, 0.00, 0.00, 0, NULL, 1, 0.00, '[]', '2020-04-22 10:02:19', 19, '2020-04-22 10:02:19', 19),
	(1129, 711, 206, 1, 3.75, 0.00, 0.00, 0, NULL, 1, 0.00, '[]', '2020-04-22 10:02:23', 19, '2020-04-22 10:02:23', 19),
	(1130, 712, 152, 1, 2.90, 0.00, 0.00, 0, NULL, 0, NULL, NULL, '2020-04-22 10:32:44', 19, '2020-04-22 10:32:44', 19),
	(1131, 713, 220, 1, 1.00, 0.00, 100.00, 0, NULL, 1, 0.00, '[]', '2020-04-22 10:36:33', 19, '2020-04-22 10:36:33', 19),
	(1132, 714, 220, 1, 1.00, 0.00, 15.00, 0, NULL, 1, NULL, NULL, '2020-04-22 11:01:14', 19, '2020-04-22 11:01:14', 19),
	(1133, 715, 220, 1, 1.00, 0.00, 0.00, 0, NULL, 1, 0.00, '[]', '2020-04-22 11:05:21', 19, '2020-04-22 11:05:21', 19),
	(1134, 716, 204, 1, 2.90, 0.00, 15.00, 0, NULL, 1, 0.00, '[]', '2020-04-22 11:22:12', 19, '2020-04-22 11:22:12', 19),
	(1135, 709, 185, 1, 1.00, 0.00, 50.00, 0, NULL, 1, NULL, NULL, '2020-04-22 11:43:05', 19, '2020-04-22 11:43:05', 19),
	(1136, 717, 149, 1, 2.50, 0.00, 100.00, 0, NULL, 1, 0.00, '[]', '2020-04-22 12:23:30', 19, '2020-04-22 12:23:30', 19),
	(1137, 718, 149, 1, 2.50, 0.00, 100.00, 0, NULL, 1, 0.00, '[]', '2020-04-22 12:23:48', 19, '2020-04-22 12:23:48', 19),
	(1138, 719, 207, 1, 3.50, 0.00, 0.00, 0, NULL, 1, 0.00, '[]', '2020-04-22 12:28:02', 19, '2020-04-22 12:28:02', 19),
	(1139, 720, 152, 1, 2.90, 0.00, 0.00, 0, NULL, 1, 0.00, '[]', '2020-04-22 13:02:32', 19, '2020-04-22 13:02:32', 19),
	(1140, 721, 147, 1, 2.50, 0.00, 0.00, 0, NULL, 1, 0.00, '[]', '2020-04-22 13:36:04', 19, '2020-04-22 13:36:04', 19),
	(1141, 722, 176, 1, 0.75, 0.00, 0.00, 0, NULL, 1, 0.00, '[]', '2020-04-22 13:45:25', 19, '2020-04-22 13:45:25', 19),
	(1142, 712, 149, 1, 2.50, 0.00, 100.00, 0, NULL, 1, 0.00, '[]', '2020-04-22 14:21:11', 19, '2020-04-22 14:21:11', 19);
/*!40000 ALTER TABLE `sale_detail` ENABLE KEYS */;


-- Dumping structure for table rms_web_basic.sale_master
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
  `sale_order_number` int(11) DEFAULT NULL,
  `sale_master_pax` int(11) DEFAULT '1',
  `sale_master_tax` decimal(10,2) DEFAULT '0.00',
  `sale_master_exchange_rate` decimal(10,2) DEFAULT '0.00',
  `sale_master_service_charge` decimal(10,2) DEFAULT '0.00',
  `sale_master_discount_percent` decimal(11,2) DEFAULT '0.00',
  `sale_master_discount_dollar` decimal(11,2) DEFAULT '0.00',
  `sale_master_pay_kh` int(11) DEFAULT '0',
  `sale_master_pay_us` decimal(10,2) DEFAULT '0.00',
  `sale_master_account_type` int(11) DEFAULT NULL,
  `sale_master_other_card` decimal(10,2) DEFAULT '0.00',
  `sale_master_member_discount` decimal(10,2) DEFAULT '0.00',
  `sale_master_member_pay` decimal(10,2) DEFAULT '0.00',
  `sale_master_credit_payment` decimal(10,2) DEFAULT '0.00',
  `sale_master_total` decimal(10,2) DEFAULT NULL,
  `sale_master_grand_total` decimal(10,2) DEFAULT '0.00',
  `sale_master_create_date` datetime NOT NULL,
  `sale_master_create_by` int(11) NOT NULL,
  `sale_master_status` tinyint(1) DEFAULT '1' COMMENT '1="ACTIVE"/2="PAID"/3 = CREDIT/-1="CANCEL"',
  `sale_master_void_reason` varchar(50) COLLATE utf8_unicode_ci DEFAULT NULL,
  `sale_master_print` tinyint(4) DEFAULT '0',
  `sale_matster_note` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `sale_master_offline_by` int(11) DEFAULT '0',
  `sale_master_offline_date` datetime DEFAULT NULL,
  `sale_master_order_number` int(11) DEFAULT NULL,
  `sale_master_modified` datetime NOT NULL,
  `sale_master_modified_by` int(11) NOT NULL,
  PRIMARY KEY (`sale_master_id`)
) ENGINE=InnoDB AUTO_INCREMENT=723 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- Dumping data for table rms_web_basic.sale_master: ~722 rows (approximately)
DELETE FROM `sale_master`;
/*!40000 ALTER TABLE `sale_master` DISABLE KEYS */;
INSERT INTO `sale_master` (`sale_master_id`, `sale_master_invoice_no`, `sale_master_start_date`, `sale_master_end_date`, `sale_master_branch_id`, `sale_master_customer_id`, `sale_master_layout_id`, `sale_master_cash_id`, `sale_master_seller_id`, `sale_master_cashier_id`, `sale_order_number`, `sale_master_pax`, `sale_master_tax`, `sale_master_exchange_rate`, `sale_master_service_charge`, `sale_master_discount_percent`, `sale_master_discount_dollar`, `sale_master_pay_kh`, `sale_master_pay_us`, `sale_master_account_type`, `sale_master_other_card`, `sale_master_member_discount`, `sale_master_member_pay`, `sale_master_credit_payment`, `sale_master_total`, `sale_master_grand_total`, `sale_master_create_date`, `sale_master_create_by`, `sale_master_status`, `sale_master_void_reason`, `sale_master_print`, `sale_matster_note`, `sale_master_offline_by`, `sale_master_offline_date`, `sale_master_order_number`, `sale_master_modified`, `sale_master_modified_by`) VALUES
	(1, 1, '2020-03-10 09:35:30', '2020-03-10 09:37:08', 41, NULL, 5, 1, 19, 19, 1, 1, 0.00, 4000.00, 0.00, 0.00, 0.00, 10000, 0.00, NULL, 0.00, 0.00, 0.00, 0.00, NULL, 0.00, '2020-03-10 09:35:30', 19, 2, NULL, 2, NULL, 0, NULL, NULL, '0000-00-00 00:00:00', 0),
	(2, 2, '2020-03-10 10:18:08', '2020-03-10 11:06:08', 41, NULL, 4, 1, 19, 19, 2, 1, 0.00, 4000.00, 0.00, 20.00, 0.00, 10000, 0.00, NULL, 0.00, 0.00, 0.00, 0.00, NULL, 0.00, '2020-03-10 10:18:08', 19, 2, NULL, 2, NULL, 0, NULL, NULL, '0000-00-00 00:00:00', 0),
	(3, 3, '2020-03-10 11:16:04', '2020-03-10 12:21:28', 41, NULL, 1, 1, NULL, 19, 2, 1, 0.00, 4000.00, 0.00, 20.00, 0.00, 0, 0.00, NULL, 0.00, 0.00, 0.00, 0.00, NULL, 0.00, '2020-03-10 11:16:04', 19, -1, NULL, 0, NULL, 0, NULL, NULL, '0000-00-00 00:00:00', 0),
	(4, 4, '2020-03-10 12:18:59', '2020-03-10 13:10:02', 41, NULL, 2, 1, NULL, 19, 2, 1, 0.00, 4000.00, 0.00, 0.00, 0.00, 0, 0.00, NULL, 0.00, 0.00, 0.00, 0.00, NULL, 0.00, '2020-03-10 12:18:59', 19, -1, NULL, 1, NULL, 0, NULL, NULL, '0000-00-00 00:00:00', 0),
	(5, 5, '2020-03-10 13:10:25', '2020-03-10 13:32:25', 41, NULL, 3, 1, 19, 19, 3, 1, 0.00, 4000.00, 0.00, 20.00, 0.00, 5000, 0.00, NULL, 0.00, 0.00, 0.00, 0.00, NULL, 0.00, '2020-03-10 13:10:25', 19, 2, NULL, 2, NULL, 0, NULL, NULL, '0000-00-00 00:00:00', 0),
	(6, 6, '2020-03-10 13:47:07', '2020-03-10 15:15:43', 41, NULL, 1, 1, 19, 19, 4, 1, 0.00, 4000.00, 0.00, 20.00, 0.00, 0, 1.52, NULL, 0.00, 0.00, 0.00, 0.00, NULL, 0.00, '2020-03-10 13:47:07', 19, 2, NULL, 4, NULL, 0, NULL, NULL, '0000-00-00 00:00:00', 0),
	(7, 7, '2020-03-10 15:29:03', '2020-03-10 16:21:25', 41, NULL, 4, 1, 19, 19, 5, 1, 0.00, 4000.00, 0.00, 0.00, 0.00, 10000, 0.00, NULL, 0.00, 0.00, 0.00, 0.00, NULL, 0.00, '2020-03-10 15:29:03', 19, 2, NULL, 2, NULL, 0, NULL, NULL, '0000-00-00 00:00:00', 0),
	(8, 8, '2020-03-10 15:52:49', '2020-03-10 16:21:55', 41, NULL, 6, 1, 19, 19, 6, 1, 0.00, 4000.00, 0.00, 0.00, 0.00, 10000, 0.00, NULL, 0.00, 0.00, 0.00, 0.00, NULL, 0.00, '2020-03-10 15:52:49', 19, 2, NULL, 3, NULL, 0, NULL, NULL, '0000-00-00 00:00:00', 0),
	(9, 9, '2020-03-10 16:55:05', '2020-03-10 17:26:41', 41, NULL, 4, 1, 19, 19, 7, 2, 0.00, 4000.00, 0.00, 0.00, 0.00, 0, 10.00, NULL, 0.00, 0.00, 0.00, 0.00, NULL, 0.00, '2020-03-10 16:55:05', 19, 2, NULL, 3, NULL, 0, NULL, NULL, '0000-00-00 00:00:00', 0),
	(10, 10, '2020-03-11 07:39:54', '2020-03-11 07:43:20', 41, NULL, 1, 2, 19, 19, 1, 2, 0.00, 4000.00, 0.00, 0.00, 0.00, 20000, 0.00, NULL, 0.00, 0.00, 0.00, 0.00, NULL, 0.00, '2020-03-11 07:39:54', 19, 2, NULL, 2, NULL, 0, NULL, NULL, '0000-00-00 00:00:00', 0),
	(11, 11, '2020-03-11 08:00:08', '2020-03-11 08:00:30', 41, NULL, 1, 2, 19, 19, 2, 1, 0.00, 4000.00, 0.00, 0.00, 0.00, 2000, 0.00, NULL, 0.00, 0.00, 0.00, 0.00, NULL, 0.00, '2020-03-11 08:00:08', 19, 2, NULL, 1, NULL, 0, NULL, NULL, '0000-00-00 00:00:00', 0),
	(12, 12, '2020-03-11 10:23:38', '2020-03-11 10:26:41', 41, NULL, 1, 2, 19, 19, 3, 1, 0.00, 4000.00, 0.00, 0.00, 0.00, 7000, 0.00, NULL, 0.00, 0.00, 0.00, 0.00, NULL, 0.00, '2020-03-11 10:23:38', 19, 2, NULL, 1, NULL, 0, NULL, NULL, '0000-00-00 00:00:00', 0),
	(13, 13, '2020-03-11 10:28:03', '2020-03-11 10:29:57', 41, NULL, 1, 2, 19, 19, 4, 1, 0.00, 4000.00, 0.00, 0.00, 0.00, 5000, 0.00, NULL, 0.00, 0.00, 0.00, 0.00, NULL, 0.00, '2020-03-11 10:28:03', 19, 2, NULL, 1, NULL, 0, NULL, NULL, '0000-00-00 00:00:00', 0),
	(14, 14, '2020-03-11 10:30:11', '2020-03-11 10:30:49', 41, NULL, 2, 2, 19, 19, 5, 1, 0.00, 4000.00, 0.00, 0.00, 0.00, 5000, 0.00, NULL, 0.00, 0.00, 0.00, 0.00, NULL, 0.00, '2020-03-11 10:30:11', 19, 2, NULL, 1, NULL, 0, NULL, NULL, '0000-00-00 00:00:00', 0),
	(15, 15, '2020-03-11 10:31:08', '2020-03-11 10:31:24', 41, NULL, 1, 2, 19, 19, 6, 1, 0.00, 4000.00, 0.00, 0.00, 0.00, 5000, 0.00, NULL, 0.00, 0.00, 0.00, 0.00, NULL, 0.00, '2020-03-11 10:31:08', 19, 2, NULL, 1, NULL, 0, NULL, NULL, '0000-00-00 00:00:00', 0),
	(16, 16, '2020-03-11 10:38:48', '2020-03-11 13:19:13', 41, NULL, 1, 2, 19, 19, 7, 1, 0.00, 4000.00, 0.00, 0.00, 0.00, 30000, 0.00, NULL, 0.00, 0.00, 0.00, 0.00, NULL, 0.00, '2020-03-11 10:38:48', 19, 2, NULL, 3, NULL, 0, NULL, NULL, '0000-00-00 00:00:00', 0),
	(17, 18, '2020-03-11 10:49:09', '2020-03-11 13:43:21', 41, NULL, 4, 2, 19, 19, 9, 1, 0.00, 4000.00, 0.00, 0.00, 0.00, 0, 0.00, 6, 2.50, 0.00, 0.00, 0.00, NULL, 0.00, '2020-03-11 10:49:09', 19, 2, NULL, 3, NULL, 0, NULL, NULL, '0000-00-00 00:00:00', 0),
	(18, 17, '2020-03-11 13:28:47', '2020-03-11 13:29:20', 41, NULL, 9, 2, 19, 19, 8, 1, 0.00, 4000.00, 0.00, 0.00, 0.00, 0, 0.00, 6, 1.25, 0.00, 0.00, 0.00, NULL, 0.00, '2020-03-11 13:28:47', 19, 2, NULL, 1, NULL, 0, NULL, NULL, '0000-00-00 00:00:00', 0),
	(19, 19, '2020-03-11 13:49:54', '2020-03-11 13:52:00', 41, NULL, 5, 2, 19, 19, 10, 1, 0.00, 4000.00, 0.00, 0.00, 0.00, 0, 0.00, 6, 1.00, 0.00, 0.00, 0.00, NULL, 0.00, '2020-03-11 13:49:54', 19, 2, NULL, 1, NULL, 0, NULL, NULL, '0000-00-00 00:00:00', 0),
	(20, 20, '2020-03-11 13:53:10', '2020-03-11 13:55:16', 41, NULL, 1, 2, 19, 19, 11, 2, 0.00, 4000.00, 0.00, 0.00, 0.00, 0, 0.00, NULL, 0.00, 0.00, 0.00, 0.00, NULL, 0.00, '2020-03-11 13:53:10', 19, 2, NULL, 1, NULL, 0, NULL, NULL, '0000-00-00 00:00:00', 0),
	(21, 21, '2020-03-11 14:03:05', '2020-03-11 14:03:23', 41, NULL, 5, 2, 19, 19, 12, 3, 0.00, 4000.00, 0.00, 0.00, 0.00, 0, 0.00, 6, 1.50, 0.00, 0.00, 0.00, NULL, 0.00, '2020-03-11 14:03:05', 19, 2, NULL, 1, NULL, 0, NULL, NULL, '0000-00-00 00:00:00', 0),
	(22, 22, '2020-03-11 14:54:35', '2020-03-11 14:54:58', 41, NULL, 5, 2, 19, 19, 13, 11, 0.00, 4000.00, 0.00, 0.00, 0.00, 0, 0.00, 8, 0.00, 0.00, 0.00, 0.00, NULL, 0.00, '2020-03-11 14:54:35', 19, 2, NULL, 1, NULL, 0, NULL, NULL, '0000-00-00 00:00:00', 0),
	(23, 23, '2020-03-11 17:27:46', '2020-03-11 17:49:51', 41, NULL, 3, 2, 19, 19, 14, 1, 0.00, 4000.00, 0.00, 0.00, 0.00, 0, 5.00, NULL, 0.00, 0.00, 0.00, 0.00, NULL, 0.00, '2020-03-11 17:27:46', 19, 2, NULL, 2, NULL, 0, NULL, NULL, '0000-00-00 00:00:00', 0),
	(24, 24, '2020-03-11 19:10:59', '2020-03-11 19:13:32', 41, NULL, 51, 2, 19, 19, 15, 12, 0.00, 4000.00, 0.00, 0.00, 0.00, 0, 0.00, 6, 1.00, 0.00, 0.00, 0.00, NULL, 0.00, '2020-03-11 19:10:59', 19, 2, NULL, 1, NULL, 0, NULL, NULL, '0000-00-00 00:00:00', 0),
	(25, 25, '2020-03-12 07:42:24', '2020-03-12 07:44:09', 41, NULL, 31, 3, 19, 19, 1, 1, 0.00, 4000.00, 0.00, 0.00, 0.00, 10000, 0.00, NULL, 0.00, 0.00, 0.00, 0.00, NULL, 0.00, '2020-03-12 07:42:24', 19, 2, NULL, 1, NULL, 0, NULL, NULL, '0000-00-00 00:00:00', 0),
	(26, 26, '2020-03-12 07:49:49', '2020-03-12 07:51:46', 41, NULL, 2, 3, 19, 19, 2, 1, 0.00, 4000.00, 0.00, 0.00, 0.00, 0, 0.00, 8, 2.50, 0.00, 0.00, 0.00, NULL, 0.00, '2020-03-12 07:49:49', 19, 2, NULL, 1, NULL, 0, NULL, NULL, '0000-00-00 00:00:00', 0),
	(27, 27, '2020-03-12 07:54:11', '2020-03-12 07:56:07', 41, NULL, 1, 3, 19, 19, 3, 1, 0.00, 4000.00, 0.00, 0.00, 0.00, 0, 0.00, 6, 0.50, 0.00, 0.00, 0.00, NULL, 0.00, '2020-03-12 07:54:11', 19, 2, NULL, 2, NULL, 0, NULL, NULL, '0000-00-00 00:00:00', 0),
	(28, 28, '2020-03-12 08:01:47', '2020-03-12 08:02:19', 41, NULL, 1, 3, 19, 19, 4, 1, 0.00, 4000.00, 0.00, 0.00, 0.00, 0, 0.00, 6, 1.05, 0.00, 0.00, 0.00, NULL, 0.00, '2020-03-12 08:01:47', 19, 2, NULL, 1, NULL, 0, NULL, NULL, '0000-00-00 00:00:00', 0),
	(29, 29, '2020-03-12 08:04:23', '2020-03-12 08:05:39', 41, NULL, 1, 3, 19, 19, 5, 1, 0.00, 4000.00, 0.00, 0.00, 0.00, 0, 0.00, 6, 1.25, 0.00, 0.00, 0.00, NULL, 0.00, '2020-03-12 08:04:23', 19, 2, NULL, 1, NULL, 0, NULL, NULL, '0000-00-00 00:00:00', 0),
	(30, 30, '2020-03-12 08:06:02', '2020-03-12 08:06:17', 41, NULL, 1, 3, 19, 19, 6, 1, 0.00, 4000.00, 0.00, 0.00, 0.00, 0, 0.00, 6, 0.50, 0.00, 0.00, 0.00, NULL, 0.00, '2020-03-12 08:06:02', 19, 2, NULL, 1, NULL, 0, NULL, NULL, '0000-00-00 00:00:00', 0),
	(31, 31, '2020-03-12 08:08:17', '2020-03-12 09:35:49', 41, NULL, 1, 3, 19, 19, 7, 1, 0.00, 4000.00, 0.00, 0.00, 0.00, 0, 0.00, 15, 0.50, 0.00, 0.00, 0.00, NULL, 0.00, '2020-03-12 08:08:17', 19, 2, NULL, 1, NULL, 0, NULL, NULL, '0000-00-00 00:00:00', 0),
	(32, 32, '2020-03-12 10:08:12', '2020-03-12 10:09:08', 41, NULL, 1, 3, 19, 19, 8, 1, 0.00, 4000.00, 0.00, 0.00, 0.00, 0, 10.00, NULL, 0.00, 0.00, 0.00, 0.00, NULL, 0.00, '2020-03-12 10:08:12', 19, 2, NULL, 2, NULL, 0, NULL, NULL, '0000-00-00 00:00:00', 0),
	(33, 33, '2020-03-12 10:15:07', '2020-03-12 10:15:47', 41, NULL, 1, 3, 19, 19, 9, 4, 0.00, 4000.00, 0.00, 0.00, 0.00, 0, 10.00, NULL, 0.00, 0.00, 0.00, 0.00, NULL, 0.00, '2020-03-12 10:15:07', 19, 2, NULL, 1, NULL, 0, NULL, NULL, '0000-00-00 00:00:00', 0),
	(34, 34, '2020-03-12 10:24:39', '2020-03-12 10:26:27', 41, NULL, 1, 3, 19, 19, 10, 1, 0.00, 4000.00, 0.00, 0.00, 0.00, 0, 0.00, 6, 1.45, 0.00, 0.00, 0.00, NULL, 0.00, '2020-03-12 10:24:39', 19, 2, NULL, 1, NULL, 0, NULL, NULL, '0000-00-00 00:00:00', 0),
	(35, 35, '2020-03-12 11:20:02', '2020-03-12 12:58:40', 41, NULL, 1, 3, 19, 19, 11, 1, 0.00, 4000.00, 0.00, 0.00, 0.00, 0, 0.00, 6, 1.00, 0.00, 0.00, 0.00, NULL, 0.00, '2020-03-12 11:20:02', 19, 2, NULL, 2, NULL, 0, NULL, NULL, '0000-00-00 00:00:00', 0),
	(36, 36, '2020-03-12 13:25:38', '2020-03-12 13:27:27', 41, NULL, 1, 3, 19, 19, 12, 1, 0.00, 4000.00, 0.00, 0.00, 0.00, 0, 0.00, 6, 0.50, 0.00, 0.00, 0.00, NULL, 0.00, '2020-03-12 13:25:38', 19, 2, NULL, 1, NULL, 0, NULL, NULL, '0000-00-00 00:00:00', 0),
	(37, 37, '2020-03-12 13:31:27', '2020-03-12 13:32:19', 41, NULL, 2, 3, 19, 19, 13, 1, 0.00, 4000.00, 0.00, 0.00, 0.00, 0, 0.00, 6, 2.00, 0.00, 0.00, 0.00, NULL, 0.00, '2020-03-12 13:31:27', 19, 2, NULL, 1, NULL, 0, NULL, NULL, '0000-00-00 00:00:00', 0),
	(38, 38, '2020-03-12 13:52:14', '2020-03-12 13:52:41', 41, NULL, 1, 3, 19, 19, 14, 1, 0.00, 4000.00, 0.00, 0.00, 0.00, 0, 0.00, 11, 0.00, 0.00, 0.00, 0.00, NULL, 0.00, '2020-03-12 13:52:14', 19, 2, NULL, 1, NULL, 0, NULL, NULL, '0000-00-00 00:00:00', 0),
	(39, 39, '2020-03-12 14:15:10', '2020-03-12 14:15:35', 41, NULL, 47, 3, 19, 19, 15, 1, 0.00, 4000.00, 0.00, 0.00, 0.00, 0, 0.00, 6, 0.50, 0.00, 0.00, 0.00, NULL, 0.00, '2020-03-12 14:15:10', 19, 2, NULL, 1, NULL, 0, NULL, NULL, '0000-00-00 00:00:00', 0),
	(40, 40, '2020-03-12 14:19:56', '2020-03-12 14:20:29', 41, NULL, 47, 3, 19, 19, 16, 1, 0.00, 4000.00, 0.00, 0.00, 0.00, 0, 0.00, 6, 0.50, 0.00, 0.00, 0.00, NULL, 0.00, '2020-03-12 14:19:56', 19, 2, NULL, 1, NULL, 0, NULL, NULL, '0000-00-00 00:00:00', 0),
	(41, 46, '2020-03-12 14:21:30', '2020-03-12 19:44:06', 41, NULL, 52, 3, 19, 19, 22, 1, 0.00, 4000.00, 0.00, 0.00, 0.00, 0, 0.00, 6, 3.60, 0.00, 0.00, 0.00, NULL, 0.00, '2020-03-12 14:21:30', 19, 2, NULL, 1, NULL, 0, NULL, NULL, '0000-00-00 00:00:00', 0),
	(42, 41, '2020-03-12 15:29:24', '2020-03-12 15:29:50', 41, NULL, 53, 3, 19, 19, 17, 100, 0.00, 4000.00, 0.00, 0.00, 0.00, 0, 0.00, 10, 0.00, 0.00, 0.00, 0.00, NULL, 0.00, '2020-03-12 15:29:24', 19, 2, NULL, 1, NULL, 0, NULL, NULL, '0000-00-00 00:00:00', 0),
	(43, 42, '2020-03-12 15:57:38', '2020-03-12 15:57:52', 41, NULL, 1, 3, 19, 19, 18, 1, 0.00, 4000.00, 0.00, 0.00, 0.00, 0, 0.00, 7, 0.00, 0.00, 0.00, 0.00, NULL, 0.00, '2020-03-12 15:57:38', 19, 2, NULL, 1, NULL, 0, NULL, NULL, '0000-00-00 00:00:00', 0),
	(44, 43, '2020-03-12 16:42:06', '2020-03-12 17:05:01', 41, NULL, 5, 3, 19, 19, 19, 2, 0.00, 4000.00, 0.00, 0.00, 0.00, 0, 0.00, 7, 8.50, 0.00, 0.00, 0.00, NULL, 0.00, '2020-03-12 16:42:06', 19, 2, NULL, 1, NULL, 0, NULL, NULL, '0000-00-00 00:00:00', 0),
	(45, 44, '2020-03-12 17:08:01', '2020-03-12 17:18:30', 41, NULL, 51, 3, 19, 19, 20, 1, 0.00, 4000.00, 0.00, 0.00, 0.00, 0, 0.00, 8, 1.20, 0.00, 0.00, 0.00, NULL, 0.00, '2020-03-12 17:08:01', 19, 2, NULL, 1, NULL, 0, NULL, NULL, '0000-00-00 00:00:00', 0),
	(46, 45, '2020-03-12 17:17:12', '2020-03-12 17:33:55', 41, NULL, 5, 3, 19, 19, 21, 1, 0.00, 4000.00, 0.00, 0.00, 0.00, 10000, 0.00, NULL, 0.00, 0.00, 0.00, 0.00, NULL, 0.00, '2020-03-12 17:17:12', 19, 2, NULL, 2, NULL, 0, NULL, NULL, '0000-00-00 00:00:00', 0),
	(47, 47, '2020-03-12 19:44:23', '2020-03-12 19:45:42', 41, NULL, 52, 3, 19, 19, 23, 1, 0.00, 4000.00, 0.00, 0.00, 0.00, 0, 0.00, 9, 0.00, 0.00, 0.00, 0.00, NULL, 0.00, '2020-03-12 19:44:23', 19, 2, NULL, 1, NULL, 0, NULL, NULL, '0000-00-00 00:00:00', 0),
	(48, 48, '2020-03-12 19:46:22', '2020-03-13 07:48:30', 41, NULL, 1, 4, 19, 19, 1, 2, 0.00, 4000.00, 0.00, 0.00, 0.00, 0, 0.00, 6, 1.05, 0.00, 0.00, 0.00, NULL, 0.00, '2020-03-12 19:46:22', 19, 2, NULL, 1, NULL, 0, NULL, NULL, '0000-00-00 00:00:00', 0),
	(49, 49, '2020-03-13 07:49:45', '2020-03-13 07:50:58', 41, NULL, 1, 4, 19, 19, 2, 1, 0.00, 4000.00, 0.00, 0.00, 0.00, 0, 0.00, 14, 0.50, 0.00, 0.00, 0.00, NULL, 0.00, '2020-03-13 07:49:45', 19, 2, NULL, 1, NULL, 0, NULL, NULL, '0000-00-00 00:00:00', 0),
	(50, 50, '2020-03-13 07:51:07', '2020-03-13 07:51:21', 41, NULL, 1, 4, 19, 19, 3, 1, 0.00, 4000.00, 0.00, 0.00, 0.00, 0, 0.00, 15, 0.50, 0.00, 0.00, 0.00, NULL, 0.00, '2020-03-13 07:51:07', 19, 2, NULL, 1, NULL, 0, NULL, NULL, '0000-00-00 00:00:00', 0),
	(51, 51, '2020-03-13 08:06:24', '2020-03-13 08:40:46', 41, NULL, 1, 4, 19, 19, 4, 1, 0.00, 4000.00, 0.00, 0.00, 0.00, 0, 0.00, 6, 0.50, 0.00, 0.00, 0.00, NULL, 0.00, '2020-03-13 08:06:24', 19, 2, NULL, 1, NULL, 0, NULL, NULL, '0000-00-00 00:00:00', 0),
	(52, 52, '2020-03-13 08:46:54', '2020-03-13 08:58:43', 41, NULL, 1, 4, 19, 19, 5, 1, 0.00, 4000.00, 0.00, 0.00, 0.00, 0, 0.00, 6, 1.25, 0.00, 0.00, 0.00, NULL, 0.00, '2020-03-13 08:46:54', 19, 2, NULL, 3, NULL, 0, NULL, NULL, '0000-00-00 00:00:00', 0),
	(53, 54, '2020-03-13 10:14:22', '2020-03-13 11:14:14', 41, NULL, 1, 4, 19, 19, 7, 1, 0.00, 4000.00, 0.00, 0.00, 0.00, 0, 10.00, NULL, 0.00, 0.00, 0.00, 0.00, NULL, 0.00, '2020-03-13 10:14:22', 19, 2, NULL, 6, NULL, 0, NULL, NULL, '0000-00-00 00:00:00', 0),
	(54, 53, '2020-03-13 11:02:14', '2020-03-13 11:02:32', 41, NULL, 5, 4, 19, 19, 6, 1, 0.00, 4000.00, 0.00, 0.00, 0.00, 0, 0.00, 6, 0.50, 0.00, 0.00, 0.00, NULL, 0.00, '2020-03-13 11:02:14', 19, 2, NULL, 1, NULL, 0, NULL, NULL, '0000-00-00 00:00:00', 0),
	(55, 57, '2020-03-13 11:03:39', '2020-03-13 11:42:37', 41, NULL, 2, 4, 19, 19, 10, 1, 0.00, 4000.00, 0.00, 0.00, 0.00, 15000, 0.00, NULL, 0.00, 0.00, 0.00, 0.00, NULL, 0.00, '2020-03-13 11:03:39', 19, 2, NULL, 2, NULL, 0, NULL, NULL, '0000-00-00 00:00:00', 0),
	(56, 55, '2020-03-13 11:14:30', '2020-03-13 11:15:04', 41, NULL, 1, 4, 19, 19, 8, 1, 0.00, 4000.00, 0.00, 0.00, 0.00, 0, 0.00, 11, 0.00, 0.00, 0.00, 0.00, NULL, 0.00, '2020-03-13 11:14:30', 19, 2, NULL, 1, NULL, 0, NULL, NULL, '0000-00-00 00:00:00', 0),
	(57, 56, '2020-03-13 11:23:17', '2020-03-13 11:23:38', 41, NULL, 1, 4, 19, 19, 9, 1, 0.00, 4000.00, 0.00, 0.00, 0.00, 0, 0.00, 7, 0.00, 0.00, 0.00, 0.00, NULL, 0.00, '2020-03-13 11:23:17', 19, 2, NULL, 1, NULL, 0, NULL, NULL, '0000-00-00 00:00:00', 0),
	(58, 58, '2020-03-13 13:04:57', '2020-03-13 13:06:08', 41, NULL, 1, 4, 19, 19, 11, 1, 0.00, 4000.00, 0.00, 0.00, 0.00, 7200, 0.00, NULL, 0.00, 0.00, 0.00, 0.00, NULL, 0.00, '2020-03-13 13:04:57', 19, 2, NULL, 1, NULL, 0, NULL, NULL, '0000-00-00 00:00:00', 0),
	(59, 59, '2020-03-13 13:20:45', '2020-03-13 13:21:06', 41, NULL, 1, 4, 19, 19, 12, 1, 0.00, 4000.00, 0.00, 0.00, 0.00, 0, 0.00, 6, 1.00, 0.00, 0.00, 0.00, NULL, 0.00, '2020-03-13 13:20:45', 19, 2, NULL, 1, NULL, 0, NULL, NULL, '0000-00-00 00:00:00', 0),
	(60, 60, '2020-03-13 13:27:00', '2020-03-13 13:27:11', 41, NULL, 1, 4, 19, 19, 13, 1, 0.00, 4000.00, 0.00, 0.00, 0.00, 0, 0.00, 6, 0.50, 0.00, 0.00, 0.00, NULL, 0.00, '2020-03-13 13:27:00', 19, 2, NULL, 1, NULL, 0, NULL, NULL, '0000-00-00 00:00:00', 0),
	(61, 61, '2020-03-13 13:39:30', '2020-03-13 13:40:06', 41, NULL, 1, 4, 19, 19, 14, 1, 0.00, 4000.00, 0.00, 0.00, 0.00, 0, 0.00, 10, 0.00, 0.00, 0.00, 0.00, NULL, 0.00, '2020-03-13 13:39:30', 19, 2, NULL, 1, NULL, 0, NULL, NULL, '0000-00-00 00:00:00', 0),
	(62, 62, '2020-03-13 13:40:22', '2020-03-13 13:40:45', 41, NULL, 1, 4, 19, 19, 15, 1, 0.00, 4000.00, 0.00, 0.00, 0.00, 0, 0.00, 6, 1.50, 0.00, 0.00, 0.00, NULL, 0.00, '2020-03-13 13:40:22', 19, 2, NULL, 1, NULL, 0, NULL, NULL, '0000-00-00 00:00:00', 0),
	(63, 63, '2020-03-13 13:49:04', '2020-03-13 13:49:21', 41, NULL, 1, 4, 19, 19, 16, 1, 0.00, 4000.00, 0.00, 0.00, 0.00, 0, 0.00, 7, 0.00, 0.00, 0.00, 0.00, NULL, 0.00, '2020-03-13 13:49:04', 19, 2, NULL, 1, NULL, 0, NULL, NULL, '0000-00-00 00:00:00', 0),
	(64, 64, '2020-03-13 13:50:07', '2020-03-13 13:57:16', 41, NULL, 1, 4, 19, 19, 17, 1, 0.00, 4000.00, 0.00, 0.00, 0.00, 0, 0.00, 6, 0.50, 0.00, 0.00, 0.00, NULL, 0.00, '2020-03-13 13:50:07', 19, 2, NULL, 3, NULL, 0, NULL, NULL, '0000-00-00 00:00:00', 0),
	(65, 65, '2020-03-13 14:02:43', '2020-03-13 14:02:54', 41, NULL, 1, 4, 19, 19, 18, 1, 0.00, 4000.00, 0.00, 0.00, 0.00, 0, 0.00, 6, 0.50, 0.00, 0.00, 0.00, NULL, 0.00, '2020-03-13 14:02:43', 19, 2, NULL, 1, NULL, 0, NULL, NULL, '0000-00-00 00:00:00', 0),
	(66, 66, '2020-03-13 14:10:03', '2020-03-13 14:58:24', 41, NULL, 1, 4, 19, 19, 19, 1, 0.00, 4000.00, 0.00, 0.00, 0.00, 0, 0.00, 7, 0.00, 0.00, 0.00, 0.00, NULL, 0.00, '2020-03-13 14:10:03', 19, 2, NULL, 3, NULL, 0, NULL, NULL, '0000-00-00 00:00:00', 0),
	(67, 67, '2020-03-13 15:08:11', '2020-03-13 15:08:20', 41, NULL, 1, 4, 19, 19, 20, 1, 0.00, 4000.00, 0.00, 0.00, 0.00, 0, 0.00, 6, 0.50, 0.00, 0.00, 0.00, NULL, 0.00, '2020-03-13 15:08:11', 19, 2, NULL, 1, NULL, 0, NULL, NULL, '0000-00-00 00:00:00', 0),
	(68, 69, '2020-03-13 15:17:10', '2020-03-13 19:29:24', 41, NULL, 5, 4, NULL, 19, 20, 1, 0.00, 4000.00, 0.00, 0.00, 0.00, 0, 0.00, NULL, 0.00, 0.00, 0.00, 0.00, NULL, 0.00, '2020-03-13 15:17:10', 19, -1, NULL, 1, NULL, 0, NULL, NULL, '0000-00-00 00:00:00', 0),
	(69, 0, '2020-03-13 15:56:47', NULL, 41, NULL, 9, 4, NULL, 19, 20, 1, 0.00, 4000.00, 0.00, 0.00, 0.00, 0, 0.00, NULL, 0.00, 0.00, 0.00, 0.00, NULL, 0.00, '2020-03-13 15:56:47', 19, 1, NULL, 2, NULL, 0, NULL, NULL, '0000-00-00 00:00:00', 0),
	(70, 68, '2020-03-13 17:22:29', '2020-03-13 17:23:35', 41, NULL, 2, 4, 19, 19, 21, 1, 0.00, 4000.00, 0.00, 0.00, 0.00, 0, 2.50, NULL, 0.00, 0.00, 0.00, 0.00, NULL, 0.00, '2020-03-13 17:22:29', 19, 2, NULL, 1, NULL, 0, NULL, NULL, '0000-00-00 00:00:00', 0),
	(71, 70, '2020-03-13 17:33:24', '2020-03-13 19:30:00', 41, NULL, 3, 4, 19, 19, 22, 1, 0.00, 4000.00, 0.00, 0.00, 0.00, 0, 0.00, 6, 0.50, 0.00, 0.00, 0.00, NULL, 0.00, '2020-03-13 17:33:24', 19, 2, NULL, 2, NULL, 0, NULL, NULL, '0000-00-00 00:00:00', 0),
	(72, 71, '2020-03-13 17:44:23', '2020-03-13 19:31:52', 41, NULL, 4, 4, NULL, 19, 21, 1, 0.00, 4000.00, 0.00, 0.00, 0.00, 0, 0.00, NULL, 0.00, 0.00, 0.00, 0.00, NULL, 0.00, '2020-03-13 17:44:23', 19, -1, NULL, 0, NULL, 0, NULL, NULL, '0000-00-00 00:00:00', 0),
	(73, 72, '2020-03-14 07:55:02', '2020-03-14 07:55:28', 41, NULL, 1, 5, 19, 19, 1, 1, 0.00, 4000.00, 0.00, 0.00, 0.00, 0, 0.00, 14, 0.50, 0.00, 0.00, 0.00, NULL, 0.00, '2020-03-14 07:55:02', 19, 2, NULL, 2, NULL, 0, NULL, NULL, '0000-00-00 00:00:00', 0),
	(74, 73, '2020-03-14 08:01:41', '2020-03-14 08:03:23', 41, NULL, 52, 5, 19, 19, 2, 1, 0.00, 4000.00, 0.00, 0.00, 0.00, 0, 0.00, 6, 1.05, 0.00, 0.00, 0.00, NULL, 0.00, '2020-03-14 08:01:41', 19, 2, NULL, 1, NULL, 0, NULL, NULL, '0000-00-00 00:00:00', 0),
	(75, 74, '2020-03-14 08:58:46', '2020-03-14 10:26:24', 41, NULL, 1, 5, 19, 19, 3, 1, 0.00, 4000.00, 0.00, 0.00, 0.00, 0, 0.00, 11, 0.00, 0.00, 0.00, 0.00, NULL, 0.00, '2020-03-14 08:58:46', 19, 2, NULL, 3, NULL, 0, NULL, NULL, '0000-00-00 00:00:00', 0),
	(76, 75, '2020-03-14 10:53:51', '2020-03-14 12:57:17', 41, NULL, 1, 5, 19, 19, 4, 1, 0.00, 4000.00, 0.00, 0.00, 0.00, 0, 0.00, 6, 0.50, 0.00, 0.00, 0.00, NULL, 0.00, '2020-03-14 10:53:51', 19, 2, NULL, 3, NULL, 0, NULL, NULL, '0000-00-00 00:00:00', 0),
	(77, 76, '2020-03-14 13:02:38', '2020-03-14 13:03:05', 41, NULL, 52, 5, 19, 19, 5, 1, 0.00, 4000.00, 0.00, 0.00, 0.00, 0, 0.00, 6, 0.50, 0.00, 0.00, 0.00, NULL, 0.00, '2020-03-14 13:02:38', 19, 2, NULL, 1, NULL, 0, NULL, NULL, '0000-00-00 00:00:00', 0),
	(78, 77, '2020-03-14 14:50:59', '2020-03-14 14:51:48', 41, NULL, 53, 5, 19, 19, 6, 1, 0.00, 4000.00, 0.00, 0.00, 0.00, 0, 0.00, 6, 1.45, 0.00, 0.00, 0.00, NULL, 0.00, '2020-03-14 14:50:59', 19, 2, NULL, 1, NULL, 0, NULL, NULL, '0000-00-00 00:00:00', 0),
	(79, 78, '2020-03-14 14:53:42', '2020-03-14 14:54:14', 41, NULL, 4, 5, 19, 19, 7, 1, 0.00, 4000.00, 0.00, 0.00, 0.00, 0, 0.00, 10, 0.00, 0.00, 0.00, 0.00, NULL, 0.00, '2020-03-14 14:53:42', 19, 2, NULL, 1, NULL, 0, NULL, NULL, '0000-00-00 00:00:00', 0),
	(80, 79, '2020-03-14 15:10:39', '2020-03-14 18:16:47', 41, NULL, 5, 5, 19, 19, 8, 1, 0.00, 4000.00, 0.00, 0.00, 0.00, 9300, 0.00, NULL, 0.00, 0.00, 0.00, 0.00, NULL, 0.00, '2020-03-14 15:10:39', 19, 2, NULL, 4, NULL, 0, NULL, NULL, '0000-00-00 00:00:00', 0),
	(81, 80, '2020-03-15 08:50:02', '2020-03-15 08:50:30', 41, NULL, 1, 6, 19, 19, 1, 1, 0.00, 4000.00, 0.00, 0.00, 0.00, 0, 0.00, 8, 0.00, 0.00, 0.00, 0.00, NULL, 0.00, '2020-03-15 08:50:02', 19, 2, NULL, 1, NULL, 0, NULL, NULL, '0000-00-00 00:00:00', 0),
	(82, 81, '2020-03-15 09:04:30', '2020-03-15 09:24:32', 41, NULL, 1, 6, 19, 19, 2, 1, 0.00, 4000.00, 0.00, 0.00, 0.00, 0, 0.00, 6, 1.45, 0.00, 0.00, 0.00, NULL, 0.00, '2020-03-15 09:04:30', 19, 2, NULL, 1, NULL, 0, NULL, NULL, '0000-00-00 00:00:00', 0),
	(83, 82, '2020-03-15 09:35:47', '2020-03-15 09:52:58', 41, NULL, 1, 6, 19, 19, 3, 1, 0.00, 4000.00, 0.00, 0.00, 0.00, 0, 0.00, 6, 0.50, 0.00, 0.00, 0.00, NULL, 0.00, '2020-03-15 09:35:47', 19, 2, NULL, 1, NULL, 0, NULL, NULL, '0000-00-00 00:00:00', 0),
	(84, 84, '2020-03-15 10:30:07', '2020-03-15 10:40:56', 41, NULL, 1, 6, 19, 19, 5, 3, 0.00, 4000.00, 0.00, 0.00, 0.00, 0, 20.00, NULL, 0.00, 0.00, 0.00, 0.00, NULL, 0.00, '2020-03-15 10:30:07', 19, 2, NULL, 3, NULL, 0, NULL, NULL, '0000-00-00 00:00:00', 0),
	(85, 83, '2020-03-15 10:32:56', '2020-03-15 10:33:06', 41, NULL, 2, 6, 19, 19, 4, 1, 0.00, 4000.00, 0.00, 0.00, 0.00, 0, 1.00, NULL, 0.00, 0.00, 0.00, 0.00, NULL, 0.00, '2020-03-15 10:32:56', 19, 2, NULL, 1, NULL, 0, NULL, NULL, '0000-00-00 00:00:00', 0),
	(86, 85, '2020-03-15 11:18:11', '2020-03-15 11:18:52', 41, NULL, 1, 6, NULL, 19, 5, 1, 0.00, 4000.00, 0.00, 0.00, 0.00, 0, 0.00, NULL, 0.00, 0.00, 0.00, 0.00, NULL, 0.00, '2020-03-15 11:18:11', 19, -1, NULL, 0, NULL, 0, NULL, NULL, '0000-00-00 00:00:00', 0),
	(87, 95, '2020-03-15 11:32:16', '2020-03-15 15:24:09', 41, NULL, 1, 6, 19, 19, 14, 1, 0.00, 4000.00, 0.00, 0.00, 0.00, 20000, 0.00, NULL, 0.00, 0.00, 0.00, 0.00, NULL, 0.00, '2020-03-15 11:32:16', 19, 2, NULL, 2, NULL, 0, NULL, NULL, '0000-00-00 00:00:00', 0),
	(88, 86, '2020-03-15 11:36:47', '2020-03-15 11:43:32', 41, NULL, 2, 6, 19, 19, 6, 1, 0.00, 4000.00, 0.00, 0.00, 0.00, 10000, 0.00, NULL, 0.00, 0.00, 0.00, 0.00, NULL, 0.00, '2020-03-15 11:36:47', 19, 2, NULL, 3, NULL, 0, NULL, NULL, '0000-00-00 00:00:00', 0),
	(89, 87, '2020-03-15 11:44:59', '2020-03-15 11:51:31', 41, NULL, 2, 6, NULL, 19, 6, 1, 0.00, 4000.00, 0.00, 0.00, 0.00, 0, 0.00, NULL, 0.00, 0.00, 0.00, 0.00, NULL, 0.00, '2020-03-15 11:44:59', 19, -1, NULL, 1, NULL, 0, NULL, NULL, '0000-00-00 00:00:00', 0),
	(90, 88, '2020-03-15 11:57:57', '2020-03-15 11:58:15', 41, NULL, 2, 6, 19, 19, 7, 1, 0.00, 4000.00, 0.00, 0.00, 0.00, 0, 0.00, 18, 0.00, 0.00, 0.00, 0.00, NULL, 0.00, '2020-03-15 11:57:57', 19, 2, NULL, 1, NULL, 0, NULL, NULL, '0000-00-00 00:00:00', 0),
	(91, 89, '2020-03-15 12:18:12', '2020-03-15 12:18:26', 41, NULL, 2, 6, 19, 19, 8, 1, 0.00, 4000.00, 0.00, 0.00, 0.00, 0, 0.00, 6, 0.50, 0.00, 0.00, 0.00, NULL, 0.00, '2020-03-15 12:18:12', 19, 2, NULL, 1, NULL, 0, NULL, NULL, '0000-00-00 00:00:00', 0),
	(92, 90, '2020-03-15 12:20:47', '2020-03-15 12:21:04', 41, NULL, 2, 6, 19, 19, 9, 1, 0.00, 4000.00, 0.00, 0.00, 0.00, 20000, 0.00, NULL, 0.00, 0.00, 0.00, 0.00, NULL, 0.00, '2020-03-15 12:20:47', 19, 2, NULL, 1, NULL, 0, NULL, NULL, '0000-00-00 00:00:00', 0),
	(93, 91, '2020-03-15 13:28:09', '2020-03-15 13:57:31', 41, NULL, 52, 6, 19, 19, 10, 1, 0.00, 4000.00, 0.00, 0.00, 0.00, 0, 0.00, 6, 2.40, 0.00, 0.00, 0.00, NULL, 0.00, '2020-03-15 13:28:09', 19, 2, NULL, 1, NULL, 0, NULL, NULL, '0000-00-00 00:00:00', 0),
	(94, 92, '2020-03-15 13:43:45', '2020-03-15 14:04:32', 41, NULL, 5, 6, 19, 19, 11, 1, 0.00, 4000.00, 0.00, 0.00, 0.00, 0, 0.80, NULL, 0.00, 0.00, 0.00, 0.00, NULL, 0.00, '2020-03-15 13:43:45', 19, 2, NULL, 2, NULL, 0, NULL, NULL, '0000-00-00 00:00:00', 0),
	(95, 96, '2020-03-15 13:47:54', '2020-03-15 16:05:09', 41, NULL, 4, 6, 19, 19, 15, 1, 0.00, 4000.00, 0.00, 0.00, 0.00, 0, 10.00, NULL, 0.00, 0.00, 0.00, 0.00, NULL, 0.00, '2020-03-15 13:47:54', 19, 2, NULL, 1, NULL, 0, NULL, NULL, '0000-00-00 00:00:00', 0),
	(96, 93, '2020-03-15 14:40:13', '2020-03-15 14:40:53', 41, NULL, 53, 6, 19, 19, 12, 19, 0.00, 4000.00, 0.00, 0.00, 0.00, 0, 0.00, 9, 0.00, 0.00, 0.00, 0.00, NULL, 0.00, '2020-03-15 14:40:13', 19, 2, NULL, 1, NULL, 0, NULL, NULL, '0000-00-00 00:00:00', 0),
	(97, 94, '2020-03-15 14:41:23', '2020-03-15 14:47:35', 41, NULL, 52, 6, 19, 19, 13, 1, 0.00, 4000.00, 0.00, 0.00, 0.00, 0, 0.00, 11, 0.00, 0.00, 0.00, 0.00, NULL, 0.00, '2020-03-15 14:41:23', 19, 2, NULL, 1, NULL, 0, NULL, NULL, '0000-00-00 00:00:00', 0),
	(98, 97, '2020-03-15 16:25:33', '2020-03-15 17:01:28', 41, NULL, 3, 6, 19, 19, 16, 1, 0.00, 4000.00, 0.00, 0.00, 0.00, 5000, 0.00, NULL, 0.00, 0.00, 0.00, 0.00, NULL, 0.00, '2020-03-15 16:25:33', 19, 2, NULL, 1, NULL, 0, NULL, NULL, '0000-00-00 00:00:00', 0),
	(99, 98, '2020-03-15 17:23:12', '2020-03-15 17:28:17', 41, NULL, 5, 6, 19, 19, 17, 1, 0.00, 4000.00, 0.00, 0.00, 0.00, 0, 20.00, NULL, 0.00, 0.00, 0.00, 0.00, NULL, 0.00, '2020-03-15 17:23:12', 19, 2, NULL, 1, NULL, 0, NULL, NULL, '0000-00-00 00:00:00', 0),
	(100, 102, '2020-03-16 08:14:27', '2020-03-16 12:07:48', 41, NULL, 4, 7, 19, 19, 3, 1, 0.00, 4000.00, 0.00, 0.00, 0.00, 0, 3.00, NULL, 0.00, 0.00, 0.00, 0.00, NULL, 0.00, '2020-03-16 08:14:27', 19, 2, NULL, 2, NULL, 0, NULL, NULL, '0000-00-00 00:00:00', 0),
	(101, 99, '2020-03-16 08:30:10', '2020-03-16 08:38:04', 41, NULL, 5, 7, NULL, 19, 0, 1, 0.00, 4000.00, 0.00, 0.00, 0.00, 0, 0.00, NULL, 0.00, 0.00, 0.00, 0.00, NULL, 0.00, '2020-03-16 08:30:10', 19, -1, NULL, 0, NULL, 0, NULL, NULL, '0000-00-00 00:00:00', 0),
	(102, 100, '2020-03-16 08:38:16', '2020-03-16 09:20:18', 41, NULL, 1, 7, 19, 19, 1, 1, 0.00, 4000.00, 0.00, 0.00, 0.00, 0, 20.00, NULL, 0.00, 0.00, 0.00, 0.00, NULL, 0.00, '2020-03-16 08:38:16', 19, 2, NULL, 2, NULL, 0, NULL, NULL, '0000-00-00 00:00:00', 0),
	(103, 101, '2020-03-16 08:51:41', '2020-03-16 09:55:20', 41, NULL, 2, 7, 19, 19, 2, 1, 0.00, 4000.00, 0.00, 0.00, 0.00, 0, 2.00, NULL, 0.00, 0.00, 0.00, 0.00, NULL, 0.00, '2020-03-16 08:51:41', 19, 2, NULL, 2, NULL, 0, NULL, NULL, '0000-00-00 00:00:00', 0),
	(104, 103, '2020-03-16 13:22:28', '2020-03-16 13:22:49', 41, NULL, 5, 7, 19, 19, 4, 1, 0.00, 4000.00, 0.00, 0.00, 0.00, 0, 0.00, 20, 0.00, 0.00, 0.00, 0.00, NULL, 0.00, '2020-03-16 13:22:28', 19, 2, NULL, 1, NULL, 0, NULL, NULL, '0000-00-00 00:00:00', 0),
	(105, 104, '2020-03-16 14:35:57', '2020-03-16 14:56:47', 41, NULL, 52, 7, 19, 19, 5, 1, 0.00, 4000.00, 0.00, 0.00, 0.00, 0, 0.00, 6, 1.45, 0.00, 0.00, 0.00, NULL, 0.00, '2020-03-16 14:35:57', 19, 2, NULL, 1, NULL, 0, NULL, NULL, '0000-00-00 00:00:00', 0),
	(106, 105, '2020-03-16 17:36:55', '2020-03-16 17:37:30', 41, NULL, 4, 7, 19, 19, 6, 1, 0.00, 4000.00, 0.00, 0.00, 0.00, 0, 2.00, NULL, 0.00, 0.00, 0.00, 0.00, NULL, 0.00, '2020-03-16 17:36:55', 19, 2, NULL, 1, NULL, 0, NULL, NULL, '0000-00-00 00:00:00', 0),
	(107, 106, '2020-03-17 07:24:31', '2020-03-17 07:34:39', 41, NULL, 1, 8, 19, 19, 1, 1, 0.00, 4000.00, 0.00, 0.00, 0.00, 0, 5.00, NULL, 0.00, 0.00, 0.00, 0.00, NULL, 0.00, '2020-03-17 07:24:31', 19, 2, NULL, 3, NULL, 0, NULL, NULL, '0000-00-00 00:00:00', 0),
	(108, 107, '2020-03-17 07:30:48', '2020-03-17 07:35:00', 41, NULL, 2, 8, 19, 19, 2, 1, 0.00, 4000.00, 0.00, 0.00, 0.00, 0, 0.00, 8, 0.00, 0.00, 0.00, 0.00, NULL, 0.00, '2020-03-17 07:30:48', 19, 2, NULL, 1, NULL, 0, NULL, NULL, '0000-00-00 00:00:00', 0),
	(109, 108, '2020-03-17 08:13:06', '2020-03-17 08:14:14', 41, NULL, 1, 8, 19, 19, 3, 1, 0.00, 4000.00, 0.00, 0.00, 0.00, 0, 0.00, 6, 0.50, 0.00, 0.00, 0.00, NULL, 0.00, '2020-03-17 08:13:06', 19, 2, NULL, 1, NULL, 0, NULL, NULL, '0000-00-00 00:00:00', 0),
	(110, 109, '2020-03-17 08:39:20', '2020-03-17 08:39:41', 41, NULL, 1, 8, 19, 19, 4, 1, 0.00, 4000.00, 0.00, 0.00, 0.00, 0, 0.00, 6, 1.55, 0.00, 0.00, 0.00, NULL, 0.00, '2020-03-17 08:39:20', 19, 2, NULL, 1, NULL, 0, NULL, NULL, '0000-00-00 00:00:00', 0),
	(111, 110, '2020-03-17 08:44:48', '2020-03-17 08:49:32', 41, NULL, 1, 8, 19, 19, 5, 1, 0.00, 4000.00, 0.00, 0.00, 0.00, 0, 1.00, NULL, 0.00, 0.00, 0.00, 0.00, NULL, 0.00, '2020-03-17 08:44:48', 19, 2, NULL, 1, NULL, 0, NULL, NULL, '0000-00-00 00:00:00', 0),
	(112, 111, '2020-03-17 08:50:28', '2020-03-17 08:50:48', 41, NULL, 1, 8, 19, 19, 6, 1, 0.00, 4000.00, 0.00, 0.00, 0.00, 0, 0.00, 6, 0.50, 0.00, 0.00, 0.00, NULL, 0.00, '2020-03-17 08:50:28', 19, 2, NULL, 1, NULL, 0, NULL, NULL, '0000-00-00 00:00:00', 0),
	(113, 112, '2020-03-17 09:02:53', '2020-03-17 09:03:05', 41, NULL, 1, 8, 19, 19, 7, 1, 0.00, 4000.00, 0.00, 0.00, 0.00, 0, 0.00, 14, 0.50, 0.00, 0.00, 0.00, NULL, 0.00, '2020-03-17 09:02:53', 19, 2, NULL, 1, NULL, 0, NULL, NULL, '0000-00-00 00:00:00', 0),
	(114, 113, '2020-03-17 09:37:54', '2020-03-17 10:09:34', 41, NULL, 1, 8, 19, 19, 8, 1, 0.00, 4000.00, 0.00, 0.00, 0.00, 0, 0.00, 13, 0.00, 0.00, 0.00, 0.00, NULL, 0.00, '2020-03-17 09:37:54', 19, 2, NULL, 2, NULL, 0, NULL, NULL, '0000-00-00 00:00:00', 0),
	(115, 114, '2020-03-17 10:25:29', '2020-03-17 10:51:25', 41, NULL, 1, 8, 19, 19, 9, 1, 0.00, 4000.00, 0.00, 0.00, 0.00, 0, 20.00, NULL, 0.00, 0.00, 0.00, 0.00, NULL, 0.00, '2020-03-17 10:25:29', 19, 2, NULL, 1, NULL, 0, NULL, NULL, '0000-00-00 00:00:00', 0),
	(116, 115, '2020-03-17 10:39:36', '2020-03-17 11:22:23', 41, NULL, 3, 8, 19, 19, 10, 2, 0.00, 4000.00, 0.00, 0.00, 0.00, 0, 7.00, NULL, 0.00, 0.00, 0.00, 0.00, NULL, 0.00, '2020-03-17 10:39:36', 19, 2, NULL, 3, NULL, 0, NULL, NULL, '0000-00-00 00:00:00', 0),
	(117, 116, '2020-03-17 11:41:16', '2020-03-17 11:41:47', 41, NULL, 1, 8, 19, 19, 11, 1, 0.00, 4000.00, 0.00, 0.00, 0.00, 0, 0.00, 6, 0.50, 0.00, 0.00, 0.00, NULL, 0.00, '2020-03-17 11:41:16', 19, 2, NULL, 1, NULL, 0, NULL, NULL, '0000-00-00 00:00:00', 0),
	(118, 117, '2020-03-17 11:49:52', '2020-03-17 11:50:11', 41, NULL, 1, 8, 19, 19, 12, 1, 0.00, 4000.00, 0.00, 0.00, 0.00, 0, 0.00, 6, 1.00, 0.00, 0.00, 0.00, NULL, 0.00, '2020-03-17 11:49:52', 19, 2, NULL, 1, NULL, 0, NULL, NULL, '0000-00-00 00:00:00', 0),
	(119, 118, '2020-03-17 12:54:52', '2020-03-17 13:07:12', 41, NULL, 1, 8, 19, 19, 13, 1, 0.00, 4000.00, 0.00, 0.00, 0.00, 0, 3.00, NULL, 0.00, 0.00, 0.00, 0.00, NULL, 0.00, '2020-03-17 12:54:52', 19, 2, NULL, 2, NULL, 0, NULL, NULL, '0000-00-00 00:00:00', 0),
	(120, 119, '2020-03-17 13:58:38', '2020-03-17 13:59:02', 41, NULL, 1, 8, 19, 19, 14, 1, 0.00, 4000.00, 0.00, 0.00, 0.00, 10000, 0.00, NULL, 0.00, 0.00, 0.00, 0.00, NULL, 0.00, '2020-03-17 13:58:38', 19, 2, NULL, 1, NULL, 0, NULL, NULL, '0000-00-00 00:00:00', 0),
	(121, 120, '2020-03-17 14:07:57', '2020-03-17 15:09:51', 41, NULL, 1, 8, 19, 19, 15, 1, 0.00, 4000.00, 0.00, 0.00, 0.00, 0, 0.00, 6, 0.50, 0.00, 0.00, 0.00, NULL, 0.00, '2020-03-17 14:07:57', 19, 2, NULL, 1, NULL, 0, NULL, NULL, '0000-00-00 00:00:00', 0),
	(122, 121, '2020-03-17 15:10:11', '2020-03-17 15:11:28', 41, NULL, 1, 8, 19, 19, 16, 1, 0.00, 4000.00, 0.00, 0.00, 0.00, 0, 0.00, 10, 0.00, 0.00, 0.00, 0.00, NULL, 0.00, '2020-03-17 15:10:11', 19, 2, NULL, 2, NULL, 0, NULL, NULL, '0000-00-00 00:00:00', 0),
	(123, 122, '2020-03-17 15:12:16', '2020-03-17 15:12:59', 41, NULL, 1, 8, 19, 19, 17, 1, 0.00, 4000.00, 0.00, 0.00, 0.00, 0, 0.00, 6, 1.45, 0.00, 0.00, 0.00, NULL, 0.00, '2020-03-17 15:12:16', 19, 2, NULL, 1, NULL, 0, NULL, NULL, '0000-00-00 00:00:00', 0),
	(124, 123, '2020-03-17 16:22:35', '2020-03-17 16:25:28', 41, NULL, 5, 8, 19, 19, 18, 1, 0.00, 4000.00, 0.00, 0.00, 0.00, 5000, 2.00, NULL, 0.00, 0.00, 0.00, 0.00, NULL, 0.00, '2020-03-17 16:22:35', 19, 2, NULL, 1, NULL, 0, NULL, NULL, '0000-00-00 00:00:00', 0),
	(125, 124, '2020-03-18 08:11:29', '2020-03-18 08:11:41', 41, NULL, 1, 9, 19, 19, 1, 1, 0.00, 4000.00, 0.00, 0.00, 0.00, 0, 0.00, 6, 0.50, 0.00, 0.00, 0.00, NULL, 0.00, '2020-03-18 08:11:29', 19, 2, NULL, 1, NULL, 0, NULL, NULL, '0000-00-00 00:00:00', 0),
	(126, 125, '2020-03-18 08:32:05', '2020-03-18 08:32:24', 41, NULL, 1, 9, 19, 19, 2, 1, 0.00, 4000.00, 0.00, 0.00, 0.00, 0, 0.00, 7, 0.00, 0.00, 0.00, 0.00, NULL, 0.00, '2020-03-18 08:32:05', 19, 2, NULL, 1, NULL, 0, NULL, NULL, '0000-00-00 00:00:00', 0),
	(127, 126, '2020-03-18 09:09:19', '2020-03-18 09:09:31', 41, NULL, 1, 9, 19, 19, 3, 1, 0.00, 4000.00, 0.00, 0.00, 0.00, 0, 0.00, 14, 0.50, 0.00, 0.00, 0.00, NULL, 0.00, '2020-03-18 09:09:19', 19, 2, NULL, 1, NULL, 0, NULL, NULL, '0000-00-00 00:00:00', 0),
	(128, 127, '2020-03-18 09:30:46', '2020-03-18 09:51:27', 41, NULL, 1, 9, 19, 19, 4, 1, 0.00, 4000.00, 0.00, 0.00, 0.00, 0, 10.00, NULL, 0.00, 0.00, 0.00, 0.00, NULL, 0.00, '2020-03-18 09:30:46', 19, 2, NULL, 2, NULL, 0, NULL, NULL, '0000-00-00 00:00:00', 0),
	(129, 131, '2020-03-18 09:37:56', '2020-03-18 11:04:09', 41, NULL, 2, 9, 19, 19, 8, 1, 0.00, 4000.00, 0.00, 0.00, 0.00, 0, 2.00, NULL, 0.00, 0.00, 0.00, 0.00, NULL, 0.00, '2020-03-18 09:37:56', 19, 2, NULL, 2, NULL, 0, NULL, NULL, '0000-00-00 00:00:00', 0),
	(130, 128, '2020-03-18 10:12:24', '2020-03-18 10:14:35', 41, NULL, 5, 9, 19, 19, 5, 1, 0.00, 4000.00, 0.00, 0.00, 0.00, 0, 10.00, NULL, 0.00, 0.00, 0.00, 0.00, NULL, 0.00, '2020-03-18 10:12:24', 19, 2, NULL, 1, NULL, 0, NULL, NULL, '0000-00-00 00:00:00', 0),
	(131, 129, '2020-03-18 10:21:30', '2020-03-18 10:23:10', 41, NULL, 1, 9, 19, 19, 6, 1, 0.00, 4000.00, 0.00, 0.00, 0.00, 0, 10.00, NULL, 0.00, 0.00, 0.00, 0.00, NULL, 0.00, '2020-03-18 10:21:30', 19, 2, NULL, 2, NULL, 0, NULL, NULL, '0000-00-00 00:00:00', 0),
	(132, 130, '2020-03-18 10:26:57', '2020-03-18 10:27:18', 41, NULL, 1, 9, 19, 19, 7, 1, 0.00, 4000.00, 0.00, 0.00, 0.00, 0, 0.00, 11, 0.00, 0.00, 0.00, 0.00, NULL, 0.00, '2020-03-18 10:26:57', 19, 2, NULL, 1, NULL, 0, NULL, NULL, '0000-00-00 00:00:00', 0),
	(133, 132, '2020-03-18 11:47:01', '2020-03-18 11:47:31', 41, NULL, 1, 9, 19, 19, 9, 1, 0.00, 4000.00, 0.00, 0.00, 0.00, 0, 0.00, 18, 0.00, 0.00, 0.00, 0.00, NULL, 0.00, '2020-03-18 11:47:01', 19, 2, NULL, 1, NULL, 0, NULL, NULL, '0000-00-00 00:00:00', 0),
	(134, 133, '2020-03-18 16:22:58', '2020-03-18 16:57:29', 41, NULL, 5, 9, 19, 19, 10, 1, 0.00, 4000.00, 0.00, 0.00, 0.00, 10000, 0.00, NULL, 0.00, 0.00, 0.00, 0.00, NULL, 0.00, '2020-03-18 16:22:58', 19, 2, NULL, 2, NULL, 0, NULL, NULL, '0000-00-00 00:00:00', 0),
	(135, 134, '2020-03-18 16:37:38', '2020-03-18 17:18:20', 41, NULL, 2, 9, 19, 19, 11, 1, 0.00, 4000.00, 0.00, 0.00, 0.00, 20000, 0.00, NULL, 0.00, 0.00, 0.00, 0.00, NULL, 0.00, '2020-03-18 16:37:39', 19, 2, NULL, 2, NULL, 0, NULL, NULL, '0000-00-00 00:00:00', 0),
	(136, 135, '2020-03-18 18:05:35', '2020-03-18 18:27:27', 41, NULL, 5, 9, 19, 19, 12, 1, 0.00, 4000.00, 0.00, 0.00, 0.00, 10000, 0.00, NULL, 0.00, 0.00, 0.00, 0.00, NULL, 0.00, '2020-03-18 18:05:35', 19, 2, NULL, 2, NULL, 0, NULL, NULL, '0000-00-00 00:00:00', 0),
	(137, 136, '2020-03-18 18:29:49', '2020-03-18 18:50:49', 41, NULL, 52, 9, 19, 19, 13, 1, 0.00, 4000.00, 0.00, 0.00, 0.00, 0, 0.00, 6, 0.50, 0.00, 0.00, 0.00, NULL, 0.00, '2020-03-18 18:29:49', 19, 2, NULL, 1, NULL, 0, NULL, NULL, '0000-00-00 00:00:00', 0),
	(138, 137, '2020-03-19 08:02:04', '2020-03-19 08:02:15', 41, NULL, 2, 10, 19, 19, 1, 1, 0.00, 4000.00, 0.00, 0.00, 0.00, 0, 0.00, 6, 1.00, 0.00, 0.00, 0.00, NULL, 0.00, '2020-03-19 08:02:04', 19, 2, NULL, 1, NULL, 0, NULL, NULL, '0000-00-00 00:00:00', 0),
	(139, 138, '2020-03-19 08:06:15', '2020-03-19 08:07:06', 41, NULL, 1, 10, 19, 19, 2, 1, 0.00, 4000.00, 0.00, 0.00, 0.00, 0, 0.00, 6, 1.05, 0.00, 0.00, 0.00, NULL, 0.00, '2020-03-19 08:06:15', 19, 2, NULL, 1, NULL, 0, NULL, NULL, '0000-00-00 00:00:00', 0),
	(140, 139, '2020-03-19 08:07:24', '2020-03-19 08:16:26', 41, NULL, 1, 10, 19, 19, 3, 1, 0.00, 4000.00, 0.00, 0.00, 0.00, 0, 5.00, NULL, 0.00, 0.00, 0.00, 0.00, NULL, 0.00, '2020-03-19 08:07:24', 19, 2, NULL, 1, NULL, 0, NULL, NULL, '0000-00-00 00:00:00', 0),
	(141, 140, '2020-03-19 08:50:31', '2020-03-19 09:19:36', 41, NULL, 1, 10, 19, 19, 4, 1, 0.00, 4000.00, 0.00, 0.00, 0.00, 50000, 0.00, NULL, 0.00, 0.00, 0.00, 0.00, NULL, 0.00, '2020-03-19 08:50:31', 19, 2, NULL, 2, NULL, 0, NULL, NULL, '0000-00-00 00:00:00', 0),
	(142, 141, '2020-03-19 09:30:45', '2020-03-19 09:32:37', 41, NULL, 1, 10, 19, 19, 5, 1, 0.00, 4000.00, 0.00, 0.00, 0.00, 0, 0.00, 6, 1.00, 0.00, 0.00, 0.00, NULL, 0.00, '2020-03-19 09:30:45', 19, 2, NULL, 1, NULL, 0, NULL, NULL, '0000-00-00 00:00:00', 0),
	(143, 142, '2020-03-19 10:01:18', '2020-03-19 10:47:40', 41, NULL, 1, 10, 19, 19, 6, 1, 0.00, 4000.00, 0.00, 0.00, 0.00, 0, 2.00, NULL, 0.00, 0.00, 0.00, 0.00, NULL, 0.00, '2020-03-19 10:01:18', 19, 2, NULL, 2, NULL, 0, NULL, NULL, '0000-00-00 00:00:00', 0),
	(144, 143, '2020-03-19 10:49:11', '2020-03-19 10:49:54', 41, NULL, 1, 10, 19, 19, 7, 1, 0.00, 4000.00, 0.00, 0.00, 0.00, 0, 0.00, 11, 0.00, 0.00, 0.00, 0.00, NULL, 0.00, '2020-03-19 10:49:11', 19, 2, NULL, 1, NULL, 0, NULL, NULL, '0000-00-00 00:00:00', 0),
	(145, 144, '2020-03-19 12:40:27', '2020-03-19 12:40:44', 41, NULL, 1, 10, 19, 19, 8, 1, 0.00, 4000.00, 0.00, 0.00, 0.00, 0, 0.00, 12, 0.00, 0.00, 0.00, 0.00, NULL, 0.00, '2020-03-19 12:40:27', 19, 2, NULL, 1, NULL, 0, NULL, NULL, '0000-00-00 00:00:00', 0),
	(146, 145, '2020-03-19 13:38:58', '2020-03-19 14:09:56', 41, NULL, 1, 10, 19, 19, 9, 2, 0.00, 4000.00, 0.00, 0.00, 0.00, 0, 10.00, NULL, 0.00, 0.00, 0.00, 0.00, NULL, 0.00, '2020-03-19 13:38:58', 19, 2, NULL, 2, NULL, 0, NULL, NULL, '0000-00-00 00:00:00', 0),
	(147, 146, '2020-03-19 13:40:53', '2020-03-19 14:13:22', 41, NULL, 5, 10, 19, 19, 10, 1, 0.00, 4000.00, 0.00, 0.00, 0.00, 0, 3.00, NULL, 0.00, 0.00, 0.00, 0.00, NULL, 0.00, '2020-03-19 13:40:53', 19, 2, NULL, 2, NULL, 0, NULL, NULL, '0000-00-00 00:00:00', 0),
	(148, 147, '2020-03-19 13:50:20', '2020-03-19 16:23:57', 41, NULL, 2, 10, 19, 19, 11, 1, 0.00, 4000.00, 0.00, 0.00, 0.00, 0, 2.00, NULL, 0.00, 0.00, 0.00, 0.00, NULL, 0.00, '2020-03-19 13:50:20', 19, 2, NULL, 3, NULL, 0, NULL, NULL, '0000-00-00 00:00:00', 0),
	(149, 152, '2020-03-19 14:11:10', '2020-03-20 08:28:17', 41, NULL, 1, 10, NULL, 19, 9, 1, 0.00, 4000.00, 0.00, 0.00, 0.00, 0, 0.00, NULL, 0.00, 0.00, 0.00, 0.00, NULL, 0.00, '2020-03-19 14:11:10', 19, -1, NULL, 0, NULL, 0, NULL, NULL, '0000-00-00 00:00:00', 0),
	(150, 148, '2020-03-19 16:31:12', '2020-03-19 16:31:33', 41, NULL, 4, 10, 19, 19, 12, 1, 0.00, 4000.00, 0.00, 0.00, 0.00, 0, 10.00, NULL, 0.00, 0.00, 0.00, 0.00, NULL, 0.00, '2020-03-19 16:31:12', 19, 2, NULL, 1, NULL, 0, NULL, NULL, '0000-00-00 00:00:00', 0),
	(151, 149, '2020-03-19 17:31:30', '2020-03-19 18:07:01', 41, NULL, 3, 10, 19, 19, 13, 1, 0.00, 4000.00, 0.00, 0.00, 0.00, 10000, 0.00, NULL, 0.00, 0.00, 0.00, 0.00, NULL, 0.00, '2020-03-19 17:31:30', 19, 2, NULL, 2, NULL, 0, NULL, NULL, '0000-00-00 00:00:00', 0),
	(152, 150, '2020-03-19 18:39:23', '2020-03-19 18:39:42', 41, NULL, 50, 10, 19, 19, 14, 1, 0.00, 4000.00, 0.00, 0.00, 0.00, 0, 0.00, 6, 1.00, 0.00, 0.00, 0.00, NULL, 0.00, '2020-03-19 18:39:23', 19, 2, NULL, 1, NULL, 0, NULL, NULL, '0000-00-00 00:00:00', 0),
	(153, 151, '2020-03-20 07:25:14', '2020-03-20 07:25:25', 41, NULL, 2, 11, 19, 19, 1, 1, 0.00, 4000.00, 0.00, 0.00, 0.00, 0, 0.00, 6, 1.05, 0.00, 0.00, 0.00, NULL, 0.00, '2020-03-20 07:25:14', 19, 2, NULL, 1, NULL, 0, NULL, NULL, '0000-00-00 00:00:00', 0),
	(154, 153, '2020-03-20 09:15:19', '2020-03-20 10:16:48', 41, NULL, 1, 11, 19, 19, 10, 1, 0.00, 4000.00, 0.00, 0.00, 0.00, 30000, 0.00, NULL, 0.00, 0.00, 0.00, 0.00, NULL, 0.00, '2020-03-20 09:15:19', 19, 2, NULL, 2, NULL, 0, NULL, NULL, '0000-00-00 00:00:00', 0),
	(155, 154, '2020-03-20 09:33:17', '2020-03-20 10:36:38', 41, NULL, 3, 11, 19, 19, 11, 1, 0.00, 4000.00, 0.00, 0.00, 0.00, 16000, 0.00, NULL, 0.00, 0.00, 0.00, 0.00, NULL, 0.00, '2020-03-20 09:33:17', 19, 2, NULL, 2, NULL, 0, NULL, NULL, '0000-00-00 00:00:00', 0),
	(156, 161, '2020-03-20 10:08:31', '2020-03-20 14:00:50', 41, NULL, 5, 11, 19, 19, 17, 1, 0.00, 4000.00, 0.00, 0.00, 0.00, 0, 10.00, NULL, 0.00, 0.00, 0.00, 0.00, NULL, 0.00, '2020-03-20 10:08:31', 19, 2, NULL, 2, NULL, 0, NULL, NULL, '0000-00-00 00:00:00', 0),
	(157, 156, '2020-03-20 10:29:58', '2020-03-20 11:54:04', 41, NULL, 1, 11, NULL, 19, 10, 1, 0.00, 4000.00, 0.00, 0.00, 0.00, 0, 0.00, NULL, 0.00, 0.00, 0.00, 0.00, NULL, 0.00, '2020-03-20 10:29:58', 19, -1, NULL, 1, NULL, 0, NULL, NULL, '0000-00-00 00:00:00', 0),
	(158, 155, '2020-03-20 11:48:41', '2020-03-20 11:53:06', 41, NULL, 3, 11, 19, 19, 12, 1, 0.00, 4000.00, 0.00, 0.00, 0.00, 0, 5.00, NULL, 0.00, 0.00, 0.00, 0.00, NULL, 0.00, '2020-03-20 11:48:41', 19, 2, NULL, 2, NULL, 0, NULL, NULL, '0000-00-00 00:00:00', 0),
	(159, 157, '2020-03-20 11:54:22', '2020-03-20 11:54:31', 41, NULL, 1, 11, 19, 19, 13, 1, 0.00, 4000.00, 0.00, 0.00, 0.00, 0, 0.00, 11, 0.00, 0.00, 0.00, 0.00, NULL, 0.00, '2020-03-20 11:54:22', 19, 2, NULL, 1, NULL, 0, NULL, NULL, '0000-00-00 00:00:00', 0),
	(160, 158, '2020-03-20 12:22:07', '2020-03-20 12:22:29', 41, NULL, 1, 11, 19, 19, 14, 1, 0.00, 4000.00, 0.00, 0.00, 0.00, 0, 0.00, 16, 0.50, 0.00, 0.00, 0.00, NULL, 0.00, '2020-03-20 12:22:07', 19, 2, NULL, 1, NULL, 0, NULL, NULL, '0000-00-00 00:00:00', 0),
	(161, 167, '2020-03-20 12:26:28', '2020-03-20 17:11:48', 41, NULL, 1, 11, 19, 19, 23, 1, 0.00, 4000.00, 0.00, 0.00, 0.00, 50000, 0.00, NULL, 0.00, 0.00, 0.00, 0.00, NULL, 0.00, '2020-03-20 12:26:28', 19, 2, NULL, 5, NULL, 0, NULL, NULL, '0000-00-00 00:00:00', 0),
	(162, 159, '2020-03-20 13:08:40', '2020-03-20 13:09:05', 41, NULL, 2, 11, 19, 19, 15, 1, 0.00, 4000.00, 0.00, 0.00, 0.00, 0, 0.00, 19, 0.50, 0.00, 0.00, 0.00, NULL, 0.00, '2020-03-20 13:08:40', 19, 2, NULL, 1, NULL, 0, NULL, NULL, '0000-00-00 00:00:00', 0),
	(163, 160, '2020-03-20 13:25:26', '2020-03-20 13:44:53', 41, NULL, 2, 11, 19, 19, 16, 2, 0.00, 4000.00, 0.00, 0.00, 0.00, 20000, 0.00, NULL, 0.00, 0.00, 0.00, 0.00, NULL, 0.00, '2020-03-20 13:25:26', 19, 2, NULL, 2, NULL, 0, NULL, NULL, '0000-00-00 00:00:00', 0),
	(164, 178, '2020-03-20 13:30:44', '2020-03-21 13:25:46', 41, NULL, 51, 12, 19, 19, 9, 1, 0.00, 4000.00, 0.00, 0.00, 0.00, 0, 3.00, NULL, 0.00, 0.00, 0.00, 0.00, NULL, 0.00, '2020-03-20 13:30:44', 19, 2, NULL, 3, NULL, 0, NULL, NULL, '0000-00-00 00:00:00', 0),
	(165, 162, '2020-03-20 13:31:32', '2020-03-20 14:04:11', 41, NULL, 4, 11, 19, 19, 18, 1, 0.00, 4000.00, 0.00, 0.00, 0.00, 0, 5.00, NULL, 0.00, 0.00, 0.00, 0.00, NULL, 0.00, '2020-03-20 13:31:32', 19, 2, NULL, 2, NULL, 0, NULL, NULL, '0000-00-00 00:00:00', 0),
	(166, 163, '2020-03-20 14:04:45', '2020-03-20 14:12:37', 41, NULL, 2, 11, 19, 19, 19, 1, 0.00, 4000.00, 0.00, 0.00, 0.00, 6000, 0.00, NULL, 0.00, 0.00, 0.00, 0.00, NULL, 0.00, '2020-03-20 14:04:45', 19, 2, NULL, 1, NULL, 0, NULL, NULL, '0000-00-00 00:00:00', 0),
	(167, 164, '2020-03-20 14:44:03', '2020-03-20 14:44:16', 41, NULL, 2, 11, 19, 19, 20, 1, 0.00, 4000.00, 0.00, 0.00, 0.00, 0, 0.00, 6, 1.00, 0.00, 0.00, 0.00, NULL, 0.00, '2020-03-20 14:44:03', 19, 2, NULL, 1, NULL, 0, NULL, NULL, '0000-00-00 00:00:00', 0),
	(168, 165, '2020-03-20 14:50:34', '2020-03-20 15:22:03', 41, NULL, 2, 11, 19, 19, 21, 1, 0.00, 4000.00, 0.00, 0.00, 0.00, 0, 0.00, 6, 0.75, 0.00, 0.00, 0.00, NULL, 0.00, '2020-03-20 14:50:34', 19, 2, NULL, 1, NULL, 0, NULL, NULL, '0000-00-00 00:00:00', 0),
	(169, 166, '2020-03-20 15:27:28', '2020-03-20 15:27:44', 41, NULL, 2, 11, 19, 19, 22, 1, 0.00, 4000.00, 0.00, 0.00, 0.00, 0, 0.00, 14, 0.50, 0.00, 0.00, 0.00, NULL, 0.00, '2020-03-20 15:27:28', 19, 2, NULL, 1, NULL, 0, NULL, NULL, '0000-00-00 00:00:00', 0),
	(170, 169, '2020-03-20 17:59:11', '2020-03-20 18:37:42', 41, NULL, 1, 11, 19, 19, 25, 1, 0.00, 4000.00, 0.00, 0.00, 0.00, 0, 1.60, NULL, 0.00, 0.00, 0.00, 0.00, NULL, 0.00, '2020-03-20 17:59:11', 19, 2, NULL, 1, NULL, 0, NULL, NULL, '0000-00-00 00:00:00', 0),
	(171, 168, '2020-03-20 18:19:10', '2020-03-20 18:21:03', 41, NULL, 2, 11, 19, 19, 24, 1, 0.00, 4000.00, 0.00, 0.00, 0.00, 0, 3.43, NULL, 0.00, 0.00, 0.00, 0.00, NULL, 0.00, '2020-03-20 18:19:10', 19, 2, NULL, 2, NULL, 0, NULL, NULL, '0000-00-00 00:00:00', 0),
	(172, 170, '2020-03-21 07:31:32', '2020-03-21 07:31:43', 41, NULL, 1, 12, 19, 19, 1, 1, 0.00, 4000.00, 0.00, 0.00, 0.00, 0, 0.00, 14, 0.50, 0.00, 0.00, 0.00, NULL, 0.00, '2020-03-21 07:31:32', 19, 2, NULL, 1, NULL, 0, NULL, NULL, '0000-00-00 00:00:00', 0),
	(173, 171, '2020-03-21 07:35:01', '2020-03-21 07:35:11', 41, NULL, 1, 12, 19, 19, 2, 1, 0.00, 4000.00, 0.00, 0.00, 0.00, 0, 0.00, 6, 1.05, 0.00, 0.00, 0.00, NULL, 0.00, '2020-03-21 07:35:01', 19, 2, NULL, 1, NULL, 0, NULL, NULL, '0000-00-00 00:00:00', 0),
	(174, 172, '2020-03-21 07:57:08', '2020-03-21 07:57:34', 41, NULL, 1, 12, 19, 19, 3, 1, 0.00, 4000.00, 0.00, 0.00, 0.00, 0, 0.00, 6, 1.25, 0.00, 0.00, 0.00, NULL, 0.00, '2020-03-21 07:57:08', 19, 2, NULL, 1, NULL, 0, NULL, NULL, '0000-00-00 00:00:00', 0),
	(175, 173, '2020-03-21 08:15:30', '2020-03-21 08:16:01', 41, NULL, 47, 12, 19, 19, 4, 1, 0.00, 4000.00, 0.00, 0.00, 0.00, 0, 0.00, 10, 0.00, 0.00, 0.00, 0.00, NULL, 0.00, '2020-03-21 08:15:30', 19, 2, NULL, 1, NULL, 0, NULL, NULL, '0000-00-00 00:00:00', 0),
	(176, 179, '2020-03-21 09:58:28', '2020-03-21 13:32:53', 41, NULL, 1, 12, 19, 19, 10, 1, 0.00, 4000.00, 0.00, 0.00, 0.00, 0, 0.00, 6, 1.45, 0.00, 0.00, 0.00, NULL, 0.00, '2020-03-21 09:58:28', 19, 2, NULL, 4, NULL, 0, NULL, NULL, '0000-00-00 00:00:00', 0),
	(177, 175, '2020-03-21 11:14:43', '2020-03-21 12:19:25', 41, NULL, 2, 12, 19, 19, 6, 1, 0.00, 4000.00, 0.00, 0.00, 0.00, 10880, 2.72, NULL, 0.00, 0.00, 0.00, 0.00, NULL, 0.00, '2020-03-21 11:14:43', 19, 2, NULL, 2, NULL, 0, NULL, NULL, '0000-00-00 00:00:00', 0),
	(178, 174, '2020-03-21 11:56:47', '2020-03-21 12:03:36', 41, NULL, 3, 12, 19, 19, 5, 1, 0.00, 4000.00, 0.00, 0.00, 0.00, 8000, 2.00, NULL, 0.00, 0.00, 0.00, 0.00, NULL, 0.00, '2020-03-21 11:56:47', 19, 2, NULL, 2, NULL, 0, NULL, NULL, '0000-00-00 00:00:00', 0),
	(179, 176, '2020-03-21 12:22:36', '2020-03-21 12:50:34', 41, NULL, 2, 12, 19, 19, 7, 1, 0.00, 4000.00, 0.00, 0.00, 0.00, 10000, 0.00, NULL, 0.00, 0.00, 0.00, 0.00, NULL, 0.00, '2020-03-21 12:22:36', 19, 2, NULL, 2, NULL, 0, NULL, NULL, '0000-00-00 00:00:00', 0),
	(180, 177, '2020-03-21 12:34:14', '2020-03-21 13:03:48', 41, NULL, 3, 12, 19, 19, 8, 1, 0.00, 4000.00, 0.00, 0.00, 0.00, 20000, 0.00, NULL, 0.00, 0.00, 0.00, 0.00, NULL, 0.00, '2020-03-21 12:34:14', 19, 2, NULL, 2, NULL, 0, NULL, NULL, '0000-00-00 00:00:00', 0),
	(181, 180, '2020-03-21 14:00:56', '2020-03-21 14:01:58', 41, NULL, 1, 12, 19, 19, 11, 1, 0.00, 4000.00, 0.00, 0.00, 0.00, 0, 0.00, 9, 0.00, 0.00, 0.00, 0.00, NULL, 0.00, '2020-03-21 14:00:56', 19, 2, NULL, 1, NULL, 0, NULL, NULL, '0000-00-00 00:00:00', 0),
	(182, 181, '2020-03-21 14:09:43', '2020-03-21 14:09:56', 41, NULL, 1, 12, 19, 19, 12, 1, 0.00, 4000.00, 0.00, 0.00, 0.00, 0, 0.00, 14, 0.00, 0.00, 0.00, 0.00, NULL, 0.00, '2020-03-21 14:09:43', 19, 2, NULL, 1, NULL, 0, NULL, NULL, '0000-00-00 00:00:00', 0),
	(183, 182, '2020-03-21 14:34:12', '2020-03-21 14:34:50', 41, NULL, 1, 12, 19, 19, 13, 1, 0.00, 4000.00, 0.00, 0.00, 0.00, 0, 0.00, 6, 0.00, 0.00, 0.00, 0.00, NULL, 0.00, '2020-03-21 14:34:12', 19, 2, NULL, 1, NULL, 0, NULL, NULL, '0000-00-00 00:00:00', 0),
	(184, 183, '2020-03-21 14:39:27', '2020-03-21 14:44:43', 41, NULL, 1, 12, 19, 19, 14, 1, 0.00, 4000.00, 0.00, 0.00, 0.00, 8960, 2.24, NULL, 0.00, 0.00, 0.00, 0.00, NULL, 0.00, '2020-03-21 14:39:27', 19, 2, NULL, 2, NULL, 0, NULL, NULL, '0000-00-00 00:00:00', 0),
	(185, 186, '2020-03-21 15:27:17', '2020-03-21 18:48:53', 41, NULL, 4, 12, 19, 19, 17, 1, 0.00, 4000.00, 0.00, 0.00, 0.00, 0, 20.00, NULL, 0.00, 0.00, 0.00, 0.00, NULL, 0.00, '2020-03-21 15:27:17', 19, 2, NULL, 3, NULL, 0, NULL, NULL, '0000-00-00 00:00:00', 0),
	(186, 185, '2020-03-21 15:42:40', '2020-03-21 17:35:23', 41, NULL, 5, 12, 19, 19, 16, 1, 0.00, 4000.00, 0.00, 0.00, 0.00, 0, 10.00, NULL, 0.00, 0.00, 0.00, 0.00, NULL, 0.00, '2020-03-21 15:42:40', 19, 2, NULL, 2, NULL, 0, NULL, NULL, '0000-00-00 00:00:00', 0),
	(187, 184, '2020-03-21 15:48:30', '2020-03-21 16:22:53', 41, NULL, 1, 12, 19, 19, 15, 1, 0.00, 4000.00, 0.00, 20.00, 0.00, 0, 5.00, NULL, 0.00, 0.00, 0.00, 0.00, NULL, 0.00, '2020-03-21 15:48:30', 19, 2, NULL, 2, NULL, 0, NULL, NULL, '0000-00-00 00:00:00', 0),
	(188, 188, '2020-03-21 17:52:18', '2020-03-21 19:39:15', 41, NULL, 5, 12, 19, 19, 19, 1, 0.00, 4000.00, 0.00, 0.00, 0.00, 0, 0.00, 12, 0.00, 0.00, 0.00, 0.00, NULL, 0.00, '2020-03-21 17:52:18', 19, 2, NULL, 1, NULL, 0, NULL, NULL, '0000-00-00 00:00:00', 0),
	(189, 187, '2020-03-21 19:02:17', '2020-03-21 19:31:35', 41, NULL, 1, 12, 19, 19, 18, 1, 0.00, 4000.00, 0.00, 0.00, 0.00, 20000, 0.00, NULL, 0.00, 0.00, 0.00, 0.00, NULL, 0.00, '2020-03-21 19:02:17', 19, 2, NULL, 2, NULL, 0, NULL, NULL, '0000-00-00 00:00:00', 0),
	(190, 189, '2020-03-22 07:35:20', '2020-03-22 07:35:34', 41, NULL, 1, 13, 19, 19, 1, 1, 0.00, 4000.00, 0.00, 0.00, 0.00, 0, 0.00, 14, 0.50, 0.00, 0.00, 0.00, NULL, 0.00, '2020-03-22 07:35:20', 19, 2, NULL, 1, NULL, 0, NULL, NULL, '0000-00-00 00:00:00', 0),
	(191, 190, '2020-03-22 08:14:23', '2020-03-22 08:14:39', 41, NULL, 1, 13, 19, 19, 2, 1, 0.00, 4000.00, 0.00, 0.00, 0.00, 0, 0.00, 6, 0.50, 0.00, 0.00, 0.00, NULL, 0.00, '2020-03-22 08:14:23', 19, 2, NULL, 1, NULL, 0, NULL, NULL, '0000-00-00 00:00:00', 0),
	(192, 191, '2020-03-22 08:19:13', '2020-03-22 08:20:02', 41, NULL, 2, 13, 19, 19, 3, 1, 0.00, 4000.00, 0.00, 0.00, 0.00, 0, 0.00, 6, 1.00, 0.00, 0.00, 0.00, NULL, 0.00, '2020-03-22 08:19:13', 19, 2, NULL, 1, NULL, 0, NULL, NULL, '0000-00-00 00:00:00', 0),
	(193, 192, '2020-03-22 08:41:14', '2020-03-22 08:41:36', 41, NULL, 1, 13, 19, 19, 4, 1, 0.00, 4000.00, 0.00, 0.00, 0.00, 0, 0.00, 6, 2.10, 0.00, 0.00, 0.00, NULL, 0.00, '2020-03-22 08:41:14', 19, 2, NULL, 1, NULL, 0, NULL, NULL, '0000-00-00 00:00:00', 0),
	(194, 194, '2020-03-22 09:15:49', '2020-03-22 09:56:53', 41, NULL, 1, 13, 19, 19, 6, 1, 0.00, 4000.00, 0.00, 20.00, 0.00, 8960, 2.24, NULL, 0.00, 0.00, 0.00, 0.00, NULL, 0.00, '2020-03-22 09:15:49', 19, 2, NULL, 2, NULL, 0, NULL, NULL, '0000-00-00 00:00:00', 0),
	(195, 193, '2020-03-22 09:29:07', '2020-03-22 09:29:16', 41, NULL, 2, 13, 19, 19, 5, 1, 0.00, 4000.00, 0.00, 0.00, 0.00, 0, 0.00, 6, 0.50, 0.00, 0.00, 0.00, NULL, 0.00, '2020-03-22 09:29:07', 19, 2, NULL, 1, NULL, 0, NULL, NULL, '0000-00-00 00:00:00', 0),
	(196, 195, '2020-03-22 10:38:38', '2020-03-22 11:00:17', 41, NULL, 1, 13, 19, 19, 7, 1, 0.00, 4000.00, 0.00, 20.00, 0.00, 16960, 4.24, NULL, 0.00, 0.00, 0.00, 0.00, NULL, 0.00, '2020-03-22 10:38:38', 19, 2, NULL, 2, NULL, 0, NULL, NULL, '0000-00-00 00:00:00', 0),
	(197, 196, '2020-03-22 11:06:39', '2020-03-22 11:49:39', 41, NULL, 1, 13, 19, 19, 8, 1, 0.00, 4000.00, 0.00, 20.00, 0.00, 6400, 1.60, NULL, 0.00, 0.00, 0.00, 0.00, NULL, 0.00, '2020-03-22 11:06:39', 19, 2, NULL, 2, NULL, 0, NULL, NULL, '0000-00-00 00:00:00', 0),
	(198, 199, '2020-03-22 12:20:08', '2020-03-22 12:57:36', 41, NULL, 1, 13, 19, 19, 11, 1, 0.00, 4000.00, 0.00, 0.00, 0.00, 0, 0.00, 12, 0.00, 0.00, 0.00, 0.00, NULL, 0.00, '2020-03-22 12:20:08', 19, 2, NULL, 1, NULL, 0, NULL, NULL, '0000-00-00 00:00:00', 0),
	(199, 197, '2020-03-22 12:36:39', '2020-03-22 12:36:49', 41, NULL, 2, 13, 19, 19, 9, 1, 0.00, 4000.00, 0.00, 0.00, 0.00, 0, 0.00, 6, 1.45, 0.00, 0.00, 0.00, NULL, 0.00, '2020-03-22 12:36:39', 19, 2, NULL, 1, NULL, 0, NULL, NULL, '0000-00-00 00:00:00', 0),
	(200, 198, '2020-03-22 12:46:21', '2020-03-22 12:46:31', 41, NULL, 2, 13, 19, 19, 10, 1, 0.00, 4000.00, 0.00, 0.00, 0.00, 0, 0.00, 6, 1.25, 0.00, 0.00, 0.00, NULL, 0.00, '2020-03-22 12:46:21', 19, 2, NULL, 1, NULL, 0, NULL, NULL, '0000-00-00 00:00:00', 0),
	(201, 200, '2020-03-22 13:42:27', '2020-03-22 14:09:46', 41, NULL, 1, 13, 19, 19, 12, 1, 0.00, 4000.00, 0.00, 20.00, 0.00, 8000, 2.00, NULL, 0.00, 0.00, 0.00, 0.00, NULL, 0.00, '2020-03-22 13:42:27', 19, 2, NULL, 2, NULL, 0, NULL, NULL, '0000-00-00 00:00:00', 0),
	(202, 201, '2020-03-22 14:57:13', '2020-03-22 15:44:36', 41, NULL, 1, 13, 19, 19, 13, 1, 0.00, 4000.00, 0.00, 20.00, 0.00, 8000, 2.00, NULL, 0.00, 0.00, 0.00, 0.00, NULL, 0.00, '2020-03-22 14:57:13', 19, 2, NULL, 2, NULL, 0, NULL, NULL, '0000-00-00 00:00:00', 0),
	(203, 203, '2020-03-22 15:27:26', '2020-03-22 16:09:26', 41, NULL, 2, 13, 19, 19, 15, 1, 0.00, 4000.00, 0.00, 20.00, 0.00, 8000, 2.00, NULL, 0.00, 0.00, 0.00, 0.00, NULL, 0.00, '2020-03-22 15:27:26', 19, 2, NULL, 2, NULL, 0, NULL, NULL, '0000-00-00 00:00:00', 0),
	(204, 204, '2020-03-22 15:34:40', '2020-03-22 16:22:56', 41, NULL, 3, 13, 19, 19, 16, 1, 0.00, 4000.00, 0.00, 20.00, 0.00, 0, 2.00, NULL, 0.00, 0.00, 0.00, 0.00, NULL, 0.00, '2020-03-22 15:34:40', 19, 2, NULL, 2, NULL, 0, NULL, NULL, '0000-00-00 00:00:00', 0),
	(205, 202, '2020-03-22 15:48:47', '2020-03-22 15:49:04', 41, NULL, 1, 13, 19, 19, 14, 1, 0.00, 4000.00, 0.00, 0.00, 0.00, 0, 0.00, 6, 1.00, 0.00, 0.00, 0.00, NULL, 0.00, '2020-03-22 15:48:47', 19, 2, NULL, 1, NULL, 0, NULL, NULL, '0000-00-00 00:00:00', 0),
	(206, 205, '2020-03-22 16:29:57', '2020-03-22 16:52:00', 41, NULL, 5, 13, 19, 19, 17, 1, 0.00, 4000.00, 0.00, 20.00, 0.00, 10000, 0.00, NULL, 0.00, 0.00, 0.00, 0.00, NULL, 0.00, '2020-03-22 16:29:57', 19, 2, NULL, 2, NULL, 0, NULL, NULL, '0000-00-00 00:00:00', 0),
	(207, 206, '2020-03-22 16:54:16', '2020-03-22 16:54:51', 41, NULL, 5, 13, 19, 19, 18, 1, 0.00, 4000.00, 0.00, 20.00, 0.00, 0, 2.00, NULL, 0.00, 0.00, 0.00, 0.00, NULL, 0.00, '2020-03-22 16:54:16', 19, 2, NULL, 1, NULL, 0, NULL, NULL, '0000-00-00 00:00:00', 0),
	(208, 207, '2020-03-22 17:27:55', '2020-03-22 18:13:54', 41, NULL, 1, 13, 19, 19, 19, 1, 0.00, 4000.00, 0.00, 20.00, 0.00, 0, 3.00, NULL, 0.00, 0.00, 0.00, 0.00, NULL, 0.00, '2020-03-22 17:27:55', 19, 2, NULL, 2, NULL, 0, NULL, NULL, '0000-00-00 00:00:00', 0),
	(209, 208, '2020-03-22 17:31:38', '2020-03-22 18:36:45', 41, NULL, 54, 13, 19, 19, 20, 1, 0.00, 4000.00, 0.00, 0.00, 0.00, 0, 0.00, 6, 0.50, 0.00, 0.00, 0.00, NULL, 0.00, '2020-03-22 17:31:38', 19, 2, NULL, 1, NULL, 0, NULL, NULL, '0000-00-00 00:00:00', 0),
	(210, 209, '2020-03-23 06:57:56', '2020-03-23 07:32:45', 41, NULL, 1, 14, 19, 19, 1, 1, 0.00, 4000.00, 0.00, 20.00, 0.00, 18080, 4.52, NULL, 0.00, 0.00, 0.00, 0.00, NULL, 0.00, '2020-03-23 06:57:56', 19, 2, NULL, 2, NULL, 0, NULL, NULL, '0000-00-00 00:00:00', 0),
	(211, 210, '2020-03-23 07:36:58', '2020-03-23 07:58:08', 41, NULL, 1, 14, 19, 19, 2, 1, 0.00, 4000.00, 0.00, 0.00, 0.00, 0, 0.00, 14, 0.50, 0.00, 0.00, 0.00, NULL, 0.00, '2020-03-23 07:36:58', 19, 2, NULL, 1, NULL, 0, NULL, NULL, '0000-00-00 00:00:00', 0),
	(212, 211, '2020-03-23 08:15:01', '2020-03-23 08:15:21', 41, NULL, 1, 14, 19, 19, 3, 1, 0.00, 4000.00, 0.00, 0.00, 0.00, 0, 0.00, 6, 1.50, 0.00, 0.00, 0.00, NULL, 0.00, '2020-03-23 08:15:01', 19, 2, NULL, 1, NULL, 0, NULL, NULL, '0000-00-00 00:00:00', 0),
	(213, 212, '2020-03-23 08:17:44', '2020-03-23 08:18:46', 41, NULL, 1, 14, 19, 19, 4, 1, 0.00, 4000.00, 0.00, 0.00, 0.00, 0, 0.00, 6, 1.10, 0.00, 0.00, 0.00, NULL, 0.00, '2020-03-23 08:17:44', 19, 2, NULL, 1, NULL, 0, NULL, NULL, '0000-00-00 00:00:00', 0),
	(214, 213, '2020-03-23 08:19:17', '2020-03-23 08:19:27', 41, NULL, 1, 14, 19, 19, 5, 1, 0.00, 4000.00, 0.00, 0.00, 0.00, 0, 0.00, 6, 0.50, 0.00, 0.00, 0.00, NULL, 0.00, '2020-03-23 08:19:17', 19, 2, NULL, 1, NULL, 0, NULL, NULL, '0000-00-00 00:00:00', 0),
	(215, 216, '2020-03-23 08:28:33', '2020-03-23 08:59:23', 41, NULL, 1, 14, 19, 19, 8, 1, 0.00, 4000.00, 0.00, 20.00, 0.00, 8000, 2.00, NULL, 0.00, 0.00, 0.00, 0.00, NULL, 0.00, '2020-03-23 08:28:33', 19, 2, NULL, 2, NULL, 0, NULL, NULL, '0000-00-00 00:00:00', 0),
	(216, 217, '2020-03-23 08:36:15', '2020-03-23 09:01:11', 41, NULL, 2, 14, 19, 19, 9, 1, 0.00, 4000.00, 0.00, 20.00, 0.00, 7360, 1.84, NULL, 0.00, 0.00, 0.00, 0.00, NULL, 0.00, '2020-03-23 08:36:15', 19, 2, NULL, 2, NULL, 0, NULL, NULL, '0000-00-00 00:00:00', 0),
	(217, 214, '2020-03-23 08:44:10', '2020-03-23 08:44:20', 41, NULL, 3, 14, 19, 19, 6, 1, 0.00, 4000.00, 0.00, 0.00, 0.00, 0, 0.00, 6, 0.50, 0.00, 0.00, 0.00, NULL, 0.00, '2020-03-23 08:44:10', 19, 2, NULL, 1, NULL, 0, NULL, NULL, '0000-00-00 00:00:00', 0),
	(218, 215, '2020-03-23 08:46:30', '2020-03-23 08:46:39', 41, NULL, 3, 14, 19, 19, 7, 1, 0.00, 4000.00, 0.00, 0.00, 0.00, 0, 0.00, 6, 0.50, 0.00, 0.00, 0.00, NULL, 0.00, '2020-03-23 08:46:30', 19, 2, NULL, 1, NULL, 0, NULL, NULL, '0000-00-00 00:00:00', 0),
	(219, 218, '2020-03-23 09:20:50', '2020-03-23 09:21:03', 41, NULL, 1, 14, 19, 19, 10, 1, 0.00, 4000.00, 0.00, 0.00, 0.00, 0, 0.00, 6, 1.25, 0.00, 0.00, 0.00, NULL, 0.00, '2020-03-23 09:20:50', 19, 2, NULL, 1, NULL, 0, NULL, NULL, '0000-00-00 00:00:00', 0),
	(220, 219, '2020-03-23 09:29:11', '2020-03-23 09:29:48', 41, NULL, 1, 14, 19, 19, 11, 1, 0.00, 4000.00, 0.00, 0.00, 0.00, 0, 0.00, 10, 0.00, 0.00, 0.00, 0.00, NULL, 0.00, '2020-03-23 09:29:11', 19, 2, NULL, 1, NULL, 0, NULL, NULL, '0000-00-00 00:00:00', 0),
	(221, 220, '2020-03-23 11:14:30', '2020-03-23 11:15:28', 41, NULL, 1, 14, 19, 19, 12, 1, 0.00, 4000.00, 0.00, 20.00, 0.00, 6400, 1.60, NULL, 0.00, 0.00, 0.00, 0.00, NULL, 0.00, '2020-03-23 11:14:30', 19, 2, NULL, 2, NULL, 0, NULL, NULL, '0000-00-00 00:00:00', 0),
	(222, 221, '2020-03-23 12:11:05', '2020-03-23 12:11:14', 41, NULL, 1, 14, 19, 19, 13, 1, 0.00, 4000.00, 0.00, 0.00, 0.00, 0, 0.00, 9, 0.00, 0.00, 0.00, 0.00, NULL, 0.00, '2020-03-23 12:11:05', 19, 2, NULL, 1, NULL, 0, NULL, NULL, '0000-00-00 00:00:00', 0),
	(223, 222, '2020-03-23 12:22:11', '2020-03-23 12:41:50', 41, NULL, 1, 14, 19, 19, 14, 1, 0.00, 4000.00, 0.00, 20.00, 0.00, 7040, 1.76, NULL, 0.00, 0.00, 0.00, 0.00, NULL, 0.00, '2020-03-23 12:22:11', 19, 2, NULL, 2, NULL, 0, NULL, NULL, '0000-00-00 00:00:00', 0),
	(224, 223, '2020-03-23 13:26:09', '2020-03-23 13:28:47', 41, NULL, 1, 14, 19, 19, 15, 1, 0.00, 4000.00, 0.00, 0.00, 0.00, 0, 0.00, 6, 1.45, 0.00, 0.00, 0.00, NULL, 0.00, '2020-03-23 13:26:09', 19, 2, NULL, 1, NULL, 0, NULL, NULL, '0000-00-00 00:00:00', 0),
	(225, 225, '2020-03-23 13:43:12', '2020-03-23 13:57:59', 41, NULL, 1, 14, 19, 19, 17, 1, 0.00, 4000.00, 0.00, 20.00, 0.00, 24960, 6.24, NULL, 0.00, 0.00, 0.00, 0.00, NULL, 0.00, '2020-03-23 13:43:12', 19, 2, NULL, 2, NULL, 0, NULL, NULL, '0000-00-00 00:00:00', 0),
	(226, 224, '2020-03-23 13:48:35', '2020-03-23 13:48:45', 41, NULL, 2, 14, 19, 19, 16, 1, 0.00, 4000.00, 0.00, 0.00, 0.00, 0, 0.00, 6, 1.10, 0.00, 0.00, 0.00, NULL, 0.00, '2020-03-23 13:48:35', 19, 2, NULL, 1, NULL, 0, NULL, NULL, '0000-00-00 00:00:00', 0),
	(227, 226, '2020-03-23 14:02:28', '2020-03-23 14:02:38', 41, NULL, 1, 14, 19, 19, 18, 1, 0.00, 4000.00, 0.00, 0.00, 0.00, 0, 0.00, 6, 1.00, 0.00, 0.00, 0.00, NULL, 0.00, '2020-03-23 14:02:28', 19, 2, NULL, 1, NULL, 0, NULL, NULL, '0000-00-00 00:00:00', 0),
	(228, 227, '2020-03-23 14:06:21', '2020-03-23 14:06:29', 41, NULL, 1, 14, 19, 19, 19, 1, 0.00, 4000.00, 0.00, 0.00, 0.00, 0, 0.00, 6, 0.50, 0.00, 0.00, 0.00, NULL, 0.00, '2020-03-23 14:06:21', 19, 2, NULL, 1, NULL, 0, NULL, NULL, '0000-00-00 00:00:00', 0),
	(229, 228, '2020-03-23 14:15:08', '2020-03-23 14:15:15', 41, NULL, 1, 14, 19, 19, 20, 1, 0.00, 4000.00, 0.00, 0.00, 0.00, 0, 0.00, 6, 0.50, 0.00, 0.00, 0.00, NULL, 0.00, '2020-03-23 14:15:08', 19, 2, NULL, 1, NULL, 0, NULL, NULL, '0000-00-00 00:00:00', 0),
	(230, 229, '2020-03-23 14:42:39', '2020-03-23 14:42:47', 41, NULL, 1, 14, 19, 19, 21, 1, 0.00, 4000.00, 0.00, 0.00, 0.00, 0, 0.00, 6, 0.50, 0.00, 0.00, 0.00, NULL, 0.00, '2020-03-23 14:42:39', 19, 2, NULL, 1, NULL, 0, NULL, NULL, '0000-00-00 00:00:00', 0),
	(231, 230, '2020-03-23 14:50:09', '2020-03-23 14:50:27', 41, NULL, 1, 14, 19, 19, 22, 1, 0.00, 4000.00, 0.00, 0.00, 0.00, 0, 0.00, 10, 0.50, 0.00, 0.00, 0.00, NULL, 0.00, '2020-03-23 14:50:09', 19, 2, NULL, 1, NULL, 0, NULL, NULL, '0000-00-00 00:00:00', 0),
	(232, 231, '2020-03-23 14:52:56', '2020-03-23 15:02:44', 41, NULL, 1, 14, 19, 19, 23, 1, 0.00, 4000.00, 0.00, 20.00, 0.00, 8000, 2.00, NULL, 0.00, 0.00, 0.00, 0.00, NULL, 0.00, '2020-03-23 14:52:56', 19, 2, NULL, 2, NULL, 0, NULL, NULL, '0000-00-00 00:00:00', 0),
	(233, 232, '2020-03-23 15:23:52', '2020-03-23 15:24:00', 41, NULL, 1, 14, 19, 19, 24, 1, 0.00, 4000.00, 0.00, 0.00, 0.00, 0, 0.00, 6, 0.50, 0.00, 0.00, 0.00, NULL, 0.00, '2020-03-23 15:23:52', 19, 2, NULL, 1, NULL, 0, NULL, NULL, '0000-00-00 00:00:00', 0),
	(234, 234, '2020-03-23 17:15:41', '2020-03-23 17:50:21', 41, NULL, 1, 14, 19, 19, 26, 1, 0.00, 4000.00, 0.00, 0.00, 0.00, 0, 2.80, NULL, 0.00, 0.00, 0.00, 0.00, NULL, 0.00, '2020-03-23 17:15:41', 19, 2, NULL, 2, NULL, 0, NULL, NULL, '0000-00-00 00:00:00', 0),
	(235, 233, '2020-03-23 17:36:05', '2020-03-23 17:50:03', 41, NULL, 2, 14, 19, 19, 25, 1, 0.00, 4000.00, 0.00, 0.00, 0.00, 0, 2.00, NULL, 0.00, 0.00, 0.00, 0.00, NULL, 0.00, '2020-03-23 17:36:05', 19, 2, NULL, 2, NULL, 0, NULL, NULL, '0000-00-00 00:00:00', 0),
	(236, 235, '2020-03-24 07:32:01', '2020-03-24 07:32:09', 41, NULL, 1, 16, 19, 19, 1, 1, 0.00, 4000.00, 0.00, 0.00, 0.00, 0, 0.00, 6, 1.10, 0.00, 0.00, 0.00, NULL, 0.00, '2020-03-24 07:32:01', 19, 2, NULL, 1, NULL, 0, NULL, NULL, '0000-00-00 00:00:00', 0),
	(237, 236, '2020-03-24 07:41:54', '2020-03-24 07:44:33', 41, NULL, 1, 16, 19, 19, 2, 1, 0.00, 4000.00, 0.00, 0.00, 0.00, 0, 0.00, 6, 1.50, 0.00, 0.00, 0.00, NULL, 0.00, '2020-03-24 07:41:54', 19, 2, NULL, 1, NULL, 0, NULL, NULL, '0000-00-00 00:00:00', 0),
	(238, 237, '2020-03-24 07:51:32', '2020-03-24 07:51:42', 41, NULL, 1, 16, 19, 19, 3, 1, 0.00, 4000.00, 0.00, 0.00, 0.00, 0, 0.00, 15, 0.50, 0.00, 0.00, 0.00, NULL, 0.00, '2020-03-24 07:51:32', 19, 2, NULL, 1, NULL, 0, NULL, NULL, '0000-00-00 00:00:00', 0),
	(239, 238, '2020-03-24 08:03:32', '2020-03-24 08:03:43', 41, NULL, 1, 16, 19, 19, 4, 1, 0.00, 4000.00, 0.00, 0.00, 0.00, 0, 0.00, 14, 0.50, 0.00, 0.00, 0.00, NULL, 0.00, '2020-03-24 08:03:32', 19, 2, NULL, 1, NULL, 0, NULL, NULL, '0000-00-00 00:00:00', 0),
	(240, 239, '2020-03-24 08:16:11', '2020-03-24 08:16:27', 41, NULL, 1, 16, 19, 19, 5, 1, 0.00, 4000.00, 0.00, 0.00, 0.00, 0, 0.00, 10, 0.00, 0.00, 0.00, 0.00, NULL, 0.00, '2020-03-24 08:16:11', 19, 2, NULL, 1, NULL, 0, NULL, NULL, '0000-00-00 00:00:00', 0),
	(241, 240, '2020-03-24 08:23:12', '2020-03-24 08:23:20', 41, NULL, 1, 16, 19, 19, 6, 1, 0.00, 4000.00, 0.00, 0.00, 0.00, 0, 0.00, 6, 0.50, 0.00, 0.00, 0.00, NULL, 0.00, '2020-03-24 08:23:12', 19, 2, NULL, 1, NULL, 0, NULL, NULL, '0000-00-00 00:00:00', 0),
	(242, 241, '2020-03-24 08:28:06', '2020-03-24 08:28:13', 41, NULL, 1, 16, 19, 19, 7, 1, 0.00, 4000.00, 0.00, 0.00, 0.00, 0, 0.00, 6, 0.50, 0.00, 0.00, 0.00, NULL, 0.00, '2020-03-24 08:28:06', 19, 2, NULL, 1, NULL, 0, NULL, NULL, '0000-00-00 00:00:00', 0),
	(243, 242, '2020-03-24 08:32:50', '2020-03-24 08:32:58', 41, NULL, 1, 16, 19, 19, 8, 1, 0.00, 4000.00, 0.00, 0.00, 0.00, 0, 0.00, 6, 1.00, 0.00, 0.00, 0.00, NULL, 0.00, '2020-03-24 08:32:50', 19, 2, NULL, 1, NULL, 0, NULL, NULL, '0000-00-00 00:00:00', 0),
	(244, 243, '2020-03-24 08:54:46', '2020-03-24 08:54:56', 41, NULL, 1, 16, 19, 19, 9, 1, 0.00, 4000.00, 0.00, 0.00, 0.00, 0, 0.00, 6, 1.45, 0.00, 0.00, 0.00, NULL, 0.00, '2020-03-24 08:54:46', 19, 2, NULL, 1, NULL, 0, NULL, NULL, '0000-00-00 00:00:00', 0),
	(245, 246, '2020-03-24 09:27:55', '2020-03-24 10:07:33', 41, NULL, 1, 16, 19, 19, 12, 1, 0.00, 4000.00, 0.00, 20.00, 0.00, 20160, 5.04, NULL, 0.00, 0.00, 0.00, 0.00, NULL, 0.00, '2020-03-24 09:27:55', 19, 2, NULL, 3, NULL, 0, NULL, NULL, '0000-00-00 00:00:00', 0),
	(246, 244, '2020-03-24 09:37:08', '2020-03-24 09:42:55', 41, NULL, 2, 16, 19, 19, 10, 1, 0.00, 4000.00, 0.00, 20.00, 0.00, 8000, 2.00, NULL, 0.00, 0.00, 0.00, 0.00, NULL, 0.00, '2020-03-24 09:37:08', 19, 2, NULL, 2, NULL, 0, NULL, NULL, '0000-00-00 00:00:00', 0),
	(247, 245, '2020-03-24 09:58:43', '2020-03-24 10:00:10', 41, NULL, 2, 16, 19, 19, 11, 1, 0.00, 4000.00, 0.00, 20.00, 0.00, 8000, 2.00, NULL, 0.00, 0.00, 0.00, 0.00, NULL, 0.00, '2020-03-24 09:58:43', 19, 2, NULL, 2, NULL, 0, NULL, NULL, '0000-00-00 00:00:00', 0),
	(248, 247, '2020-03-24 10:03:54', '2020-03-24 10:08:27', 41, NULL, 2, 16, 19, 19, 13, 1, 0.00, 4000.00, 0.00, 0.00, 0.00, 0, 0.00, 6, 1.40, 0.00, 0.00, 0.00, NULL, 0.00, '2020-03-24 10:03:54', 19, 2, NULL, 2, NULL, 0, NULL, NULL, '0000-00-00 00:00:00', 0),
	(249, 248, '2020-03-24 10:14:54', '2020-03-24 10:29:24', 41, NULL, 1, 16, 19, 19, 14, 1, 0.00, 4000.00, 0.00, 20.00, 0.00, 8000, 2.00, NULL, 0.00, 0.00, 0.00, 0.00, NULL, 0.00, '2020-03-24 10:14:54', 19, 2, NULL, 2, NULL, 0, NULL, NULL, '0000-00-00 00:00:00', 0),
	(250, 250, '2020-03-24 10:26:38', '2020-03-24 11:23:23', 41, NULL, 2, 16, 19, 19, 16, 1, 0.00, 4000.00, 0.00, 20.00, 0.00, 8000, 0.00, NULL, 0.00, 0.00, 0.00, 0.00, NULL, 0.00, '2020-03-24 10:26:38', 19, 2, NULL, 2, NULL, 0, NULL, NULL, '0000-00-00 00:00:00', 0),
	(251, 249, '2020-03-24 10:57:46', '2020-03-24 11:15:41', 41, NULL, 1, 16, 19, 19, 15, 1, 0.00, 4000.00, 0.00, 20.00, 0.00, 20000, 0.00, NULL, 0.00, 0.00, 0.00, 0.00, NULL, 0.00, '2020-03-24 10:57:46', 19, 2, NULL, 1, NULL, 0, NULL, NULL, '0000-00-00 00:00:00', 0),
	(252, 251, '2020-03-24 11:53:03', '2020-03-24 11:53:16', 41, NULL, 1, 16, 19, 19, 17, 1, 0.00, 4000.00, 0.00, 0.00, 0.00, 0, 0.00, 6, 0.50, 0.00, 0.00, 0.00, NULL, 0.00, '2020-03-24 11:53:03', 19, 2, NULL, 1, NULL, 0, NULL, NULL, '0000-00-00 00:00:00', 0),
	(253, 254, '2020-03-24 11:55:21', '2020-03-24 12:42:41', 41, NULL, 1, 16, 19, 19, 20, 1, 0.00, 4000.00, 0.00, 20.00, 0.00, 80000, 0.00, NULL, 0.00, 0.00, 0.00, 0.00, NULL, 0.00, '2020-03-24 11:55:21', 19, 2, NULL, 2, NULL, 0, NULL, NULL, '0000-00-00 00:00:00', 0),
	(254, 252, '2020-03-24 12:08:02', '2020-03-24 12:18:23', 41, NULL, 2, 16, 19, 19, 18, 1, 0.00, 4000.00, 0.00, 20.00, 0.00, 6400, 0.00, NULL, 0.00, 0.00, 0.00, 0.00, NULL, 0.00, '2020-03-24 12:08:02', 19, 2, NULL, 1, NULL, 0, NULL, NULL, '0000-00-00 00:00:00', 0),
	(255, 253, '2020-03-24 12:20:16', '2020-03-24 12:21:41', 41, NULL, 2, 16, 19, 19, 19, 1, 0.00, 4000.00, 0.00, 0.00, 0.00, 0, 0.00, 6, 1.00, 0.00, 0.00, 0.00, NULL, 0.00, '2020-03-24 12:20:16', 19, 2, NULL, 1, NULL, 0, NULL, NULL, '0000-00-00 00:00:00', 0),
	(256, 256, '2020-03-24 12:53:34', '2020-03-24 13:44:03', 41, NULL, 5, 16, 19, 19, 22, 1, 0.00, 4000.00, 0.00, 0.00, 0.00, 0, 0.00, 12, 0.00, 0.00, 0.00, 0.00, NULL, 0.00, '2020-03-24 12:53:34', 19, 2, NULL, 1, NULL, 0, NULL, NULL, '0000-00-00 00:00:00', 0),
	(257, 258, '2020-03-24 13:02:29', '2020-03-24 14:33:45', 41, NULL, 1, 16, 19, 19, 24, 1, 0.00, 4000.00, 0.00, 20.00, 0.00, 8000, 0.00, NULL, 0.00, 0.00, 0.00, 0.00, NULL, 0.00, '2020-03-24 13:02:29', 19, 2, NULL, 2, NULL, 0, NULL, NULL, '0000-00-00 00:00:00', 0),
	(258, 255, '2020-03-24 13:32:36', '2020-03-24 13:33:05', 41, NULL, 4, 16, 19, 19, 21, 1, 0.00, 4000.00, 0.00, 20.00, 0.00, 20000, 0.00, NULL, 0.00, 0.00, 0.00, 0.00, NULL, 0.00, '2020-03-24 13:32:36', 19, 2, NULL, 1, NULL, 0, NULL, NULL, '0000-00-00 00:00:00', 0),
	(259, 257, '2020-03-24 14:21:36', '2020-03-24 14:22:18', 41, NULL, 2, 16, 19, 19, 23, 1, 0.00, 4000.00, 0.00, 0.00, 0.00, 0, 0.00, 11, 0.00, 0.00, 0.00, 0.00, NULL, 0.00, '2020-03-24 14:21:36', 19, 2, NULL, 1, NULL, 0, NULL, NULL, '0000-00-00 00:00:00', 0),
	(260, 261, '2020-03-24 14:41:09', '2020-03-24 15:35:01', 41, NULL, 5, 16, 19, 19, 27, 1, 0.00, 4000.00, 0.00, 20.00, 0.00, 0, 10.00, NULL, 0.00, 0.00, 0.00, 0.00, NULL, 0.00, '2020-03-24 14:41:09', 19, 2, NULL, 2, NULL, 0, NULL, NULL, '0000-00-00 00:00:00', 0),
	(261, 263, '2020-03-24 14:42:43', '2020-03-24 19:07:48', 41, NULL, 1, 16, 19, 19, 29, 1, 0.00, 4000.00, 0.00, 0.00, 0.00, 0, 0.00, NULL, 0.00, 0.00, 0.00, 0.00, NULL, 0.00, '2020-03-24 14:42:43', 19, 2, NULL, 1, NULL, 0, NULL, NULL, '0000-00-00 00:00:00', 0),
	(262, 259, '2020-03-24 15:17:43', '2020-03-24 15:17:51', 41, NULL, 2, 16, 19, 19, 25, 1, 0.00, 4000.00, 0.00, 0.00, 0.00, 0, 0.00, 6, 0.50, 0.00, 0.00, 0.00, NULL, 0.00, '2020-03-24 15:17:43', 19, 2, NULL, 1, NULL, 0, NULL, NULL, '0000-00-00 00:00:00', 0),
	(263, 260, '2020-03-24 15:20:39', '2020-03-24 15:20:48', 41, NULL, 2, 16, 19, 19, 26, 1, 0.00, 4000.00, 0.00, 0.00, 0.00, 0, 0.00, 9, 0.00, 0.00, 0.00, 0.00, NULL, 0.00, '2020-03-24 15:20:39', 19, 2, NULL, 1, NULL, 0, NULL, NULL, '0000-00-00 00:00:00', 0),
	(264, 262, '2020-03-24 17:32:30', '2020-03-24 18:59:15', 41, NULL, 54, 16, 19, 19, 28, 1, 0.00, 4000.00, 0.00, 0.00, 0.00, 0, 0.00, 6, 1.50, 0.00, 0.00, 0.00, NULL, 0.00, '2020-03-24 17:32:30', 19, 2, NULL, 1, NULL, 0, NULL, NULL, '0000-00-00 00:00:00', 0),
	(265, 264, '2020-03-25 07:19:51', '2020-03-25 07:20:01', 41, NULL, 1, 17, 19, 19, 1, 1, 0.00, 4000.00, 0.00, 0.00, 0.00, 0, 0.00, 6, 1.10, 0.00, 0.00, 0.00, NULL, 0.00, '2020-03-25 07:19:51', 19, 2, NULL, 1, NULL, 0, NULL, NULL, '0000-00-00 00:00:00', 0),
	(266, 265, '2020-03-25 07:23:04', '2020-03-25 07:23:25', 41, NULL, 1, 17, 19, 19, 2, 1, 0.00, 4000.00, 0.00, 0.00, 0.00, 0, 0.00, 6, 0.50, 0.00, 0.00, 0.00, NULL, 0.00, '2020-03-25 07:23:04', 19, 2, NULL, 1, NULL, 0, NULL, NULL, '0000-00-00 00:00:00', 0),
	(267, 266, '2020-03-25 07:48:21', '2020-03-25 07:48:42', 41, NULL, 1, 17, 19, 19, 3, 1, 0.00, 4000.00, 0.00, 0.00, 0.00, 0, 0.00, 6, 0.50, 0.00, 0.00, 0.00, NULL, 0.00, '2020-03-25 07:48:21', 19, 2, NULL, 1, NULL, 0, NULL, NULL, '0000-00-00 00:00:00', 0),
	(268, 267, '2020-03-25 07:55:55', '2020-03-25 07:56:09', 41, NULL, 1, 17, 19, 19, 4, 1, 0.00, 4000.00, 0.00, 0.00, 0.00, 0, 0.00, 10, 0.00, 0.00, 0.00, 0.00, NULL, 0.00, '2020-03-25 07:55:55', 19, 2, NULL, 1, NULL, 0, NULL, NULL, '0000-00-00 00:00:00', 0),
	(269, 268, '2020-03-25 08:14:12', '2020-03-25 08:14:21', 41, NULL, 1, 17, 19, 19, 5, 1, 0.00, 4000.00, 0.00, 0.00, 0.00, 0, 0.00, 14, 0.50, 0.00, 0.00, 0.00, NULL, 0.00, '2020-03-25 08:14:12', 19, 2, NULL, 1, NULL, 0, NULL, NULL, '0000-00-00 00:00:00', 0),
	(270, 269, '2020-03-25 08:14:47', '2020-03-25 08:14:58', 41, NULL, 1, 17, 19, 19, 6, 1, 0.00, 4000.00, 0.00, 0.00, 0.00, 0, 0.00, 15, 0.50, 0.00, 0.00, 0.00, NULL, 0.00, '2020-03-25 08:14:47', 19, 2, NULL, 1, NULL, 0, NULL, NULL, '0000-00-00 00:00:00', 0),
	(271, 273, '2020-03-25 08:30:18', '2020-03-25 09:13:03', 41, NULL, 1, 17, 19, 19, 10, 1, 0.00, 4000.00, 0.00, 20.00, 0.00, 10000, 0.00, NULL, 0.00, 0.00, 0.00, 0.00, NULL, 0.00, '2020-03-25 08:30:18', 19, 2, NULL, 2, NULL, 0, NULL, NULL, '0000-00-00 00:00:00', 0),
	(272, 270, '2020-03-25 08:33:49', '2020-03-25 08:33:57', 41, NULL, 2, 17, 19, 19, 7, 1, 0.00, 4000.00, 0.00, 0.00, 0.00, 0, 0.00, 6, 0.50, 0.00, 0.00, 0.00, NULL, 0.00, '2020-03-25 08:33:49', 19, 2, NULL, 1, NULL, 0, NULL, NULL, '0000-00-00 00:00:00', 0),
	(273, 271, '2020-03-25 08:39:32', '2020-03-25 08:39:40', 41, NULL, 2, 17, 19, 19, 8, 1, 0.00, 4000.00, 0.00, 0.00, 0.00, 0, 0.00, 6, 1.25, 0.00, 0.00, 0.00, NULL, 0.00, '2020-03-25 08:39:32', 19, 2, NULL, 1, NULL, 0, NULL, NULL, '0000-00-00 00:00:00', 0),
	(274, 272, '2020-03-25 08:43:34', '2020-03-25 08:43:42', 41, NULL, 2, 17, 19, 19, 9, 1, 0.00, 4000.00, 0.00, 0.00, 0.00, 0, 0.00, 6, 0.50, 0.00, 0.00, 0.00, NULL, 0.00, '2020-03-25 08:43:34', 19, 2, NULL, 1, NULL, 0, NULL, NULL, '0000-00-00 00:00:00', 0),
	(275, 274, '2020-03-25 08:52:29', '2020-03-25 09:19:44', 41, NULL, 2, 17, 19, 19, 11, 1, 0.00, 4000.00, 0.00, 20.00, 0.00, 18400, 0.00, NULL, 0.00, 0.00, 0.00, 0.00, NULL, 0.00, '2020-03-25 08:52:29', 19, 2, NULL, 2, NULL, 0, NULL, NULL, '0000-00-00 00:00:00', 0),
	(276, 275, '2020-03-25 09:25:02', '2020-03-25 09:25:14', 41, NULL, 1, 17, 19, 19, 12, 1, 0.00, 4000.00, 0.00, 0.00, 0.00, 0, 0.00, 6, 1.00, 0.00, 0.00, 0.00, NULL, 0.00, '2020-03-25 09:25:02', 19, 2, NULL, 1, NULL, 0, NULL, NULL, '0000-00-00 00:00:00', 0),
	(277, 276, '2020-03-25 09:29:17', '2020-03-25 09:29:34', 41, NULL, 1, 17, 19, 19, 13, 1, 0.00, 4000.00, 0.00, 0.00, 0.00, 0, 0.00, 6, 1.50, 0.00, 0.00, 0.00, NULL, 0.00, '2020-03-25 09:29:17', 19, 2, NULL, 1, NULL, 0, NULL, NULL, '0000-00-00 00:00:00', 0),
	(278, 277, '2020-03-25 09:30:25', '2020-03-25 09:30:33', 41, NULL, 1, 17, 19, 19, 14, 1, 0.00, 4000.00, 0.00, 0.00, 0.00, 0, 0.00, 6, 0.50, 0.00, 0.00, 0.00, NULL, 0.00, '2020-03-25 09:30:25', 19, 2, NULL, 1, NULL, 0, NULL, NULL, '0000-00-00 00:00:00', 0),
	(279, 278, '2020-03-25 09:39:45', '2020-03-25 09:40:14', 41, NULL, 1, 17, 19, 19, 15, 1, 0.00, 4000.00, 0.00, 0.00, 0.00, 0, 2.32, NULL, 0.00, 0.00, 0.00, 0.00, NULL, 0.00, '2020-03-25 09:39:45', 19, 2, NULL, 1, NULL, 0, NULL, NULL, '0000-00-00 00:00:00', 0),
	(280, 279, '2020-03-25 11:43:45', '2020-03-25 11:46:33', 41, NULL, 1, 17, 19, 19, 16, 1, 0.00, 4000.00, 0.00, 0.00, 0.00, 0, 31.60, NULL, 0.00, 0.00, 0.00, 0.00, NULL, 0.00, '2020-03-25 11:43:45', 19, 2, NULL, 1, NULL, 0, NULL, NULL, '0000-00-00 00:00:00', 0),
	(281, 280, '2020-03-25 12:11:24', '2020-03-25 12:11:39', 41, NULL, 1, 17, 19, 19, 17, 1, 0.00, 4000.00, 0.00, 0.00, 0.00, 0, 0.00, 9, 0.00, 0.00, 0.00, 0.00, NULL, 0.00, '2020-03-25 12:11:24', 19, 2, NULL, 1, NULL, 0, NULL, NULL, '0000-00-00 00:00:00', 0),
	(282, 281, '2020-03-25 13:18:55', '2020-03-25 13:19:08', 41, NULL, 1, 17, 19, 19, 18, 1, 0.00, 4000.00, 0.00, 0.00, 0.00, 0, 0.00, 6, 1.00, 0.00, 0.00, 0.00, NULL, 0.00, '2020-03-25 13:18:55', 19, 2, NULL, 1, NULL, 0, NULL, NULL, '0000-00-00 00:00:00', 0),
	(283, 282, '2020-03-25 13:22:21', '2020-03-25 13:23:13', 41, NULL, 1, 17, 19, 19, 19, 1, 0.00, 4000.00, 0.00, 0.00, 0.00, 0, 0.00, 18, 0.90, 0.00, 0.00, 0.00, NULL, 0.00, '2020-03-25 13:22:21', 19, 2, NULL, 1, NULL, 0, NULL, NULL, '0000-00-00 00:00:00', 0),
	(284, 283, '2020-03-25 13:30:59', '2020-03-25 13:31:18', 41, NULL, 1, 17, 19, 19, 20, 1, 0.00, 4000.00, 0.00, 0.00, 0.00, 0, 0.00, 6, 0.50, 0.00, 0.00, 0.00, NULL, 0.00, '2020-03-25 13:30:59', 19, 2, NULL, 1, NULL, 0, NULL, NULL, '0000-00-00 00:00:00', 0),
	(285, 284, '2020-03-25 15:30:27', '2020-03-25 15:30:37', 41, NULL, 5, 17, 19, 19, 21, 1, 0.00, 4000.00, 0.00, 0.00, 0.00, 0, 0.00, 6, 0.50, 0.00, 0.00, 0.00, NULL, 0.00, '2020-03-25 15:30:27', 19, 2, NULL, 1, NULL, 0, NULL, NULL, '0000-00-00 00:00:00', 0),
	(286, 285, '2020-03-25 16:17:55', '2020-03-25 16:18:08', 41, NULL, 5, 17, 19, 19, 22, 1, 0.00, 4000.00, 0.00, 20.00, 0.00, 0, 1.00, NULL, 0.00, 0.00, 0.00, 0.00, NULL, 0.00, '2020-03-25 16:17:55', 19, 2, NULL, 1, NULL, 0, NULL, NULL, '0000-00-00 00:00:00', 0),
	(287, 286, '2020-03-25 17:21:34', '2020-03-25 17:21:47', 41, NULL, 52, 17, 19, 19, 23, 1, 0.00, 4000.00, 0.00, 0.00, 0.00, 0, 0.00, 11, 0.00, 0.00, 0.00, 0.00, NULL, 0.00, '2020-03-25 17:21:34', 19, 2, NULL, 1, NULL, 0, NULL, NULL, '0000-00-00 00:00:00', 0),
	(288, 287, '2020-03-26 07:25:46', '2020-03-26 08:01:25', 41, NULL, 1, 18, 19, 19, 1, 2, 0.00, 4000.00, 0.00, 20.00, 0.00, 30000, 0.00, NULL, 0.00, 0.00, 0.00, 0.00, NULL, 0.00, '2020-03-26 07:25:46', 19, 2, NULL, 1, NULL, 0, NULL, NULL, '0000-00-00 00:00:00', 0),
	(289, 288, '2020-03-26 08:40:22', '2020-03-26 08:40:39', 41, NULL, 5, 18, 19, 19, 2, 1, 0.00, 4000.00, 0.00, 0.00, 0.00, 0, 10.00, NULL, 0.00, 0.00, 0.00, 0.00, NULL, 0.00, '2020-03-26 08:40:22', 19, 2, NULL, 1, NULL, 0, NULL, NULL, '0000-00-00 00:00:00', 0),
	(290, 289, '2020-03-26 08:45:47', '2020-03-26 08:49:36', 41, NULL, 52, 18, 19, 19, 3, 1, 0.00, 4000.00, 0.00, 0.00, 0.00, 20000, 0.00, NULL, 0.00, 0.00, 0.00, 0.00, NULL, 0.00, '2020-03-26 08:45:47', 19, 2, NULL, 2, NULL, 0, NULL, NULL, '0000-00-00 00:00:00', 0),
	(291, 290, '2020-03-26 09:13:42', '2020-03-26 09:15:23', 41, NULL, 52, 18, 19, 19, 4, 1, 0.00, 4000.00, 0.00, 0.00, 0.00, 0, 0.00, 6, 1.00, 0.00, 0.00, 0.00, NULL, 0.00, '2020-03-26 09:13:42', 19, 2, NULL, 1, NULL, 0, NULL, NULL, '0000-00-00 00:00:00', 0),
	(292, 291, '2020-03-26 09:35:58', '2020-03-26 09:59:55', 41, NULL, 1, 18, 19, 19, 5, 1, 0.00, 4000.00, 0.00, 0.00, 0.00, 0, 0.00, 10, 0.00, 0.00, 0.00, 0.00, NULL, 0.00, '2020-03-26 09:35:58', 19, 2, NULL, 1, NULL, 0, NULL, NULL, '0000-00-00 00:00:00', 0),
	(293, 296, '2020-03-26 09:40:47', '2020-03-26 14:36:17', 41, NULL, 54, 18, 19, 19, 10, 1, 0.00, 4000.00, 0.00, 0.00, 0.00, 0, 0.00, 6, 3.00, 0.00, 0.00, 0.00, NULL, 0.00, '2020-03-26 09:40:47', 19, 2, NULL, 1, NULL, 0, NULL, NULL, '0000-00-00 00:00:00', 0),
	(294, 292, '2020-03-26 11:12:26', '2020-03-26 11:12:35', 41, NULL, 1, 18, 19, 19, 6, 1, 0.00, 4000.00, 0.00, 0.00, 0.00, 0, 0.00, 7, 0.00, 0.00, 0.00, 0.00, NULL, 0.00, '2020-03-26 11:12:26', 19, 2, NULL, 1, NULL, 0, NULL, NULL, '0000-00-00 00:00:00', 0),
	(295, 293, '2020-03-26 11:28:56', '2020-03-26 11:29:22', 41, NULL, 5, 18, 19, 19, 7, 1, 0.00, 4000.00, 0.00, 20.00, 0.00, 0, 10.00, NULL, 0.00, 0.00, 0.00, 0.00, NULL, 0.00, '2020-03-26 11:28:56', 19, 2, NULL, 1, NULL, 0, NULL, NULL, '0000-00-00 00:00:00', 0),
	(296, 294, '2020-03-26 12:00:19', '2020-03-26 12:00:34', 41, NULL, 52, 18, 19, 19, 8, 1, 0.00, 4000.00, 0.00, 0.00, 0.00, 0, 0.00, 18, 0.00, 0.00, 0.00, 0.00, NULL, 0.00, '2020-03-26 12:00:19', 19, 2, NULL, 1, NULL, 0, NULL, NULL, '0000-00-00 00:00:00', 0),
	(297, 295, '2020-03-26 13:15:59', '2020-03-26 13:16:22', 41, NULL, 5, 18, 19, 19, 9, 1, 0.00, 4000.00, 0.00, 20.00, 0.00, 10000, 0.00, NULL, 0.00, 0.00, 0.00, 0.00, NULL, 0.00, '2020-03-26 13:15:59', 19, 2, NULL, 1, NULL, 0, NULL, NULL, '0000-00-00 00:00:00', 0),
	(298, 298, '2020-03-26 14:36:27', '2020-03-26 16:24:15', 41, NULL, 1, 18, 19, 19, 12, 2, 0.00, 4000.00, 0.00, 20.00, 0.00, 0, 5.00, NULL, 0.00, 0.00, 0.00, 0.00, NULL, 0.00, '2020-03-26 14:36:27', 19, 2, NULL, 2, NULL, 0, NULL, NULL, '0000-00-00 00:00:00', 0),
	(299, 297, '2020-03-26 15:08:47', '2020-03-26 15:23:42', 41, NULL, 52, 18, 19, 19, 11, 1, 0.00, 4000.00, 0.00, 0.00, 0.00, 0, 0.00, 6, 2.00, 0.00, 0.00, 0.00, NULL, 0.00, '2020-03-26 15:08:47', 19, 2, NULL, 1, NULL, 0, NULL, NULL, '0000-00-00 00:00:00', 0),
	(300, 299, '2020-03-26 15:43:55', '2020-03-27 07:33:54', 41, NULL, 2, 19, 19, 19, 1, 2, 0.00, 4000.00, 0.00, 0.00, 0.00, 0, 0.00, 6, 0.50, 0.00, 0.00, 0.00, NULL, 0.00, '2020-03-26 15:43:55', 19, 2, NULL, 1, NULL, 0, NULL, NULL, '0000-00-00 00:00:00', 0),
	(301, 301, '2020-03-27 07:38:59', '2020-03-27 08:07:30', 41, NULL, 1, 19, 19, 19, 3, 1, 0.00, 4000.00, 0.00, 20.00, 0.00, 40000, 0.00, NULL, 0.00, 0.00, 0.00, 0.00, NULL, 0.00, '2020-03-27 07:38:59', 19, 2, NULL, 2, NULL, 0, NULL, NULL, '0000-00-00 00:00:00', 0),
	(302, 302, '2020-03-27 07:40:08', '2020-03-27 08:22:56', 41, NULL, 2, 19, 19, 19, 4, 1, 0.00, 4000.00, 0.00, 20.00, 0.00, 0, 0.00, 6, 0.60, 0.00, 0.00, 0.00, NULL, 0.00, '2020-03-27 07:40:08', 19, 2, NULL, 2, NULL, 0, NULL, NULL, '0000-00-00 00:00:00', 0),
	(303, 300, '2020-03-27 07:56:54', '2020-03-27 08:05:47', 41, NULL, 3, 19, 19, 19, 2, 1, 0.00, 4000.00, 0.00, 20.00, 0.00, 10000, 0.00, NULL, 0.00, 0.00, 0.00, 0.00, NULL, 0.00, '2020-03-27 07:56:54', 19, 2, NULL, 2, NULL, 0, NULL, NULL, '0000-00-00 00:00:00', 0),
	(304, 303, '2020-03-27 08:23:16', '2020-03-27 08:23:28', 41, NULL, 1, 19, 19, 19, 5, 1, 0.00, 4000.00, 0.00, 0.00, 0.00, 0, 0.00, 6, 0.50, 0.00, 0.00, 0.00, NULL, 0.00, '2020-03-27 08:23:16', 19, 2, NULL, 1, NULL, 0, NULL, NULL, '0000-00-00 00:00:00', 0),
	(305, 304, '2020-03-27 08:23:42', '2020-03-27 08:24:18', 41, NULL, 1, 19, 19, 19, 6, 1, 0.00, 4000.00, 0.00, 0.00, 0.00, 0, 0.00, 6, 0.50, 0.00, 0.00, 0.00, NULL, 0.00, '2020-03-27 08:23:42', 19, 2, NULL, 1, NULL, 0, NULL, NULL, '0000-00-00 00:00:00', 0),
	(306, 305, '2020-03-27 08:26:25', '2020-03-27 08:26:36', 41, NULL, 1, 19, 19, 19, 7, 1, 0.00, 4000.00, 0.00, 0.00, 0.00, 0, 0.00, 6, 1.10, 0.00, 0.00, 0.00, NULL, 0.00, '2020-03-27 08:26:25', 19, 2, NULL, 1, NULL, 0, NULL, NULL, '0000-00-00 00:00:00', 0),
	(307, 306, '2020-03-27 08:28:10', '2020-03-27 08:28:22', 41, NULL, 1, 19, 19, 19, 8, 1, 0.00, 4000.00, 0.00, 0.00, 0.00, 0, 0.00, 6, 0.50, 0.00, 0.00, 0.00, NULL, 0.00, '2020-03-27 08:28:10', 19, 2, NULL, 1, NULL, 0, NULL, NULL, '0000-00-00 00:00:00', 0),
	(308, 307, '2020-03-27 08:28:54', '2020-03-27 08:29:02', 41, NULL, 1, 19, 19, 19, 9, 1, 0.00, 4000.00, 0.00, 0.00, 0.00, 0, 0.00, 6, 0.50, 0.00, 0.00, 0.00, NULL, 0.00, '2020-03-27 08:28:54', 19, 2, NULL, 1, NULL, 0, NULL, NULL, '0000-00-00 00:00:00', 0),
	(309, 308, '2020-03-27 08:33:47', '2020-03-27 08:34:05', 41, NULL, 1, 19, 19, 19, 10, 1, 0.00, 4000.00, 0.00, 0.00, 0.00, 0, 0.00, 9, 0.00, 0.00, 0.00, 0.00, NULL, 0.00, '2020-03-27 08:33:47', 19, 2, NULL, 1, NULL, 0, NULL, NULL, '0000-00-00 00:00:00', 0),
	(310, 311, '2020-03-27 08:39:51', '2020-03-27 09:01:31', 41, NULL, 1, 19, 19, 19, 13, 1, 0.00, 4000.00, 0.00, 20.00, 0.00, 20000, 0.00, NULL, 0.00, 0.00, 0.00, 0.00, NULL, 0.00, '2020-03-27 08:39:51', 19, 2, NULL, 2, NULL, 0, NULL, NULL, '0000-00-00 00:00:00', 0),
	(311, 309, '2020-03-27 08:42:10', '2020-03-27 08:42:23', 41, NULL, 2, 19, 19, 19, 11, 1, 0.00, 4000.00, 0.00, 0.00, 0.00, 0, 0.00, 6, 0.50, 0.00, 0.00, 0.00, NULL, 0.00, '2020-03-27 08:42:10', 19, 2, NULL, 1, NULL, 0, NULL, NULL, '0000-00-00 00:00:00', 0),
	(312, 310, '2020-03-27 08:54:22', '2020-03-27 08:54:32', 41, NULL, 2, 19, 19, 19, 12, 1, 0.00, 4000.00, 0.00, 0.00, 0.00, 0, 0.00, 6, 1.40, 0.00, 0.00, 0.00, NULL, 0.00, '2020-03-27 08:54:22', 19, 2, NULL, 1, NULL, 0, NULL, NULL, '0000-00-00 00:00:00', 0),
	(313, 312, '2020-03-27 09:06:15', '2020-03-27 09:06:28', 41, NULL, 1, 19, 19, 19, 14, 1, 0.00, 4000.00, 0.00, 0.00, 0.00, 0, 0.00, 6, 1.00, 0.00, 0.00, 0.00, NULL, 0.00, '2020-03-27 09:06:15', 19, 2, NULL, 1, NULL, 0, NULL, NULL, '0000-00-00 00:00:00', 0),
	(314, 313, '2020-03-27 09:12:36', '2020-03-27 09:12:50', 41, NULL, 1, 19, 19, 19, 15, 1, 0.00, 4000.00, 0.00, 0.00, 0.00, 0, 0.00, 6, 0.50, 0.00, 0.00, 0.00, NULL, 0.00, '2020-03-27 09:12:36', 19, 2, NULL, 1, NULL, 0, NULL, NULL, '0000-00-00 00:00:00', 0),
	(315, 314, '2020-03-27 09:23:25', '2020-03-27 10:11:15', 41, NULL, 1, 19, 19, 19, 16, 1, 0.00, 4000.00, 0.00, 20.00, 0.00, 20000, 0.00, NULL, 0.00, 0.00, 0.00, 0.00, NULL, 0.00, '2020-03-27 09:23:25', 19, 2, NULL, 2, NULL, 0, NULL, NULL, '0000-00-00 00:00:00', 0),
	(316, 315, '2020-03-27 10:10:12', '2020-03-27 10:16:10', 41, NULL, 2, 19, 19, 19, 17, 1, 0.00, 4000.00, 0.00, 20.00, 0.00, 0, 3.00, NULL, 0.00, 0.00, 0.00, 0.00, NULL, 0.00, '2020-03-27 10:10:12', 19, 2, NULL, 2, NULL, 0, NULL, NULL, '0000-00-00 00:00:00', 0),
	(317, 316, '2020-03-27 10:17:36', '2020-03-27 10:40:07', 41, NULL, 1, 19, 19, 19, 18, 1, 0.00, 4000.00, 0.00, 20.00, 0.00, 12000, 0.00, NULL, 0.00, 0.00, 0.00, 0.00, NULL, 0.00, '2020-03-27 10:17:36', 19, 2, NULL, 2, NULL, 0, NULL, NULL, '0000-00-00 00:00:00', 0),
	(318, 317, '2020-03-27 10:30:59', '2020-03-27 11:13:07', 41, NULL, 2, 19, 19, 19, 19, 1, 0.00, 4000.00, 0.00, 20.00, 0.00, 20000, 0.00, NULL, 0.00, 0.00, 0.00, 0.00, NULL, 0.00, '2020-03-27 10:30:59', 19, 2, NULL, 2, NULL, 0, NULL, NULL, '0000-00-00 00:00:00', 0),
	(319, 320, '2020-03-27 12:44:38', '2020-03-27 13:27:15', 41, NULL, 1, 19, 19, 19, 22, 1, 0.00, 4000.00, 0.00, 20.00, 0.00, 10000, 0.00, NULL, 0.00, 0.00, 0.00, 0.00, NULL, 0.00, '2020-03-27 12:44:38', 19, 2, NULL, 2, NULL, 0, NULL, NULL, '0000-00-00 00:00:00', 0),
	(320, 318, '2020-03-27 12:47:57', '2020-03-27 12:48:09', 41, NULL, 2, 19, 19, 19, 20, 1, 0.00, 4000.00, 0.00, 0.00, 0.00, 0, 0.00, 6, 0.50, 0.00, 0.00, 0.00, NULL, 0.00, '2020-03-27 12:47:57', 19, 2, NULL, 1, NULL, 0, NULL, NULL, '0000-00-00 00:00:00', 0),
	(321, 319, '2020-03-27 13:23:02', '2020-03-27 13:23:40', 41, NULL, 2, 19, 19, 19, 21, 1, 0.00, 4000.00, 0.00, 0.00, 0.00, 0, 0.00, 6, 1.50, 0.00, 0.00, 0.00, NULL, 0.00, '2020-03-27 13:23:02', 19, 2, NULL, 2, NULL, 0, NULL, NULL, '0000-00-00 00:00:00', 0),
	(322, 321, '2020-03-27 13:34:16', '2020-03-27 13:34:24', 41, NULL, 1, 19, 19, 19, 23, 1, 0.00, 4000.00, 0.00, 0.00, 0.00, 0, 0.00, 6, 0.50, 0.00, 0.00, 0.00, NULL, 0.00, '2020-03-27 13:34:16', 19, 2, NULL, 1, NULL, 0, NULL, NULL, '0000-00-00 00:00:00', 0),
	(323, 323, '2020-03-27 13:52:28', '2020-03-27 14:14:55', 41, NULL, 1, 19, 19, 19, 25, 1, 0.00, 4000.00, 0.00, 20.00, 0.00, 4000, 0.00, NULL, 0.00, 0.00, 0.00, 0.00, NULL, 0.00, '2020-03-27 13:52:28', 19, 2, NULL, 1, NULL, 0, NULL, NULL, '0000-00-00 00:00:00', 0),
	(324, 330, '2020-03-27 13:52:41', '2020-03-27 16:18:01', 41, NULL, 3, 19, 19, 19, 32, 1, 0.00, 4000.00, 0.00, 20.00, 0.00, 0, 2.24, NULL, 0.00, 0.00, 0.00, 0.00, NULL, 0.00, '2020-03-27 13:52:41', 19, 2, NULL, 2, NULL, 0, NULL, NULL, '0000-00-00 00:00:00', 0),
	(325, 322, '2020-03-27 13:56:07', '2020-03-27 13:56:16', 41, NULL, 2, 19, 19, 19, 24, 1, 0.00, 4000.00, 0.00, 0.00, 0.00, 0, 0.00, 6, 0.50, 0.00, 0.00, 0.00, NULL, 0.00, '2020-03-27 13:56:07', 19, 2, NULL, 1, NULL, 0, NULL, NULL, '0000-00-00 00:00:00', 0),
	(326, 324, '2020-03-27 14:42:32', '2020-03-27 14:42:40', 41, NULL, 1, 19, 19, 19, 26, 1, 0.00, 4000.00, 0.00, 0.00, 0.00, 0, 0.00, 6, 0.50, 0.00, 0.00, 0.00, NULL, 0.00, '2020-03-27 14:42:32', 19, 2, NULL, 1, NULL, 0, NULL, NULL, '0000-00-00 00:00:00', 0),
	(327, 325, '2020-03-27 14:48:48', '2020-03-27 14:49:24', 41, NULL, 2, 19, 19, 19, 27, 1, 0.00, 4000.00, 0.00, 0.00, 0.00, 0, 0.00, 6, 0.50, 0.00, 0.00, 0.00, NULL, 0.00, '2020-03-27 14:48:48', 19, 2, NULL, 1, NULL, 0, NULL, NULL, '0000-00-00 00:00:00', 0),
	(328, 326, '2020-03-27 15:11:23', '2020-03-27 15:12:07', 41, NULL, 1, 19, 19, 19, 28, 1, 0.00, 4000.00, 0.00, 20.00, 0.00, 20000, 0.00, NULL, 0.00, 0.00, 0.00, 0.00, NULL, 0.00, '2020-03-27 15:11:23', 19, 2, NULL, 2, NULL, 0, NULL, NULL, '0000-00-00 00:00:00', 0),
	(329, 327, '2020-03-27 15:14:08', '2020-03-27 15:15:30', 41, NULL, 1, 19, 19, 19, 29, 1, 0.00, 4000.00, 0.00, 0.00, 0.00, 0, 0.00, 6, 1.25, 0.00, 0.00, 0.00, NULL, 0.00, '2020-03-27 15:14:08', 19, 2, NULL, 1, NULL, 0, NULL, NULL, '0000-00-00 00:00:00', 0),
	(330, 328, '2020-03-27 15:34:44', '2020-03-27 15:34:54', 41, NULL, 1, 19, 19, 19, 30, 1, 0.00, 4000.00, 0.00, 0.00, 0.00, 0, 0.00, 6, 0.50, 0.00, 0.00, 0.00, NULL, 0.00, '2020-03-27 15:34:44', 19, 2, NULL, 1, NULL, 0, NULL, NULL, '0000-00-00 00:00:00', 0),
	(331, 329, '2020-03-27 15:45:58', '2020-03-27 15:46:06', 41, NULL, 1, 19, 19, 19, 31, 1, 0.00, 4000.00, 0.00, 0.00, 0.00, 0, 0.00, 6, 0.50, 0.00, 0.00, 0.00, NULL, 0.00, '2020-03-27 15:45:58', 19, 2, NULL, 1, NULL, 0, NULL, NULL, '0000-00-00 00:00:00', 0),
	(332, 332, '2020-03-27 16:23:34', '2020-03-27 17:23:54', 41, NULL, 1, 19, 19, 19, 34, 1, 0.00, 4000.00, 0.00, 0.00, 0.00, 0, 4.40, NULL, 0.00, 0.00, 0.00, 0.00, NULL, 0.00, '2020-03-27 16:23:34', 19, 2, NULL, 2, NULL, 0, NULL, NULL, '0000-00-00 00:00:00', 0),
	(333, 333, '2020-03-27 16:25:07', '2020-03-27 17:24:24', 41, NULL, 2, 19, 19, 19, 35, 1, 0.00, 4000.00, 0.00, 0.00, 0.00, 0, 6.08, NULL, 0.00, 0.00, 0.00, 0.00, NULL, 0.00, '2020-03-27 16:25:07', 19, 2, NULL, 1, NULL, 0, NULL, NULL, '0000-00-00 00:00:00', 0),
	(334, 331, '2020-03-27 16:58:36', '2020-03-27 17:23:21', 41, NULL, 3, 19, 19, 19, 33, 1, 0.00, 4000.00, 0.00, 0.00, 0.00, 0, 2.32, NULL, 0.00, 0.00, 0.00, 0.00, NULL, 0.00, '2020-03-27 16:58:36', 19, 2, NULL, 1, NULL, 0, NULL, NULL, '0000-00-00 00:00:00', 0),
	(335, 334, '2020-03-27 18:17:19', '2020-03-27 18:17:50', 41, NULL, 1, 19, 19, 19, 36, 1, 0.00, 4000.00, 0.00, 0.00, 0.00, 0, 1.60, NULL, 0.00, 0.00, 0.00, 0.00, NULL, 0.00, '2020-03-27 18:17:19', 19, 2, NULL, 1, NULL, 0, NULL, NULL, '0000-00-00 00:00:00', 0),
	(336, 335, '2020-03-28 07:48:18', '2020-03-28 07:49:15', 41, NULL, 1, 20, 19, 19, 1, 1, 0.00, 4000.00, 0.00, 0.00, 0.00, 0, 0.00, 6, 1.60, 0.00, 0.00, 0.00, NULL, 0.00, '2020-03-28 07:48:18', 19, 2, NULL, 1, NULL, 0, NULL, NULL, '0000-00-00 00:00:00', 0),
	(337, 336, '2020-03-28 08:28:02', '2020-03-28 08:36:47', 41, NULL, 5, 20, 19, 19, 2, 1, 0.00, 4000.00, 0.00, 0.00, 0.00, 0, 0.00, 6, 0.50, 0.00, 0.00, 0.00, NULL, 0.00, '2020-03-28 08:28:02', 19, 2, NULL, 1, NULL, 0, NULL, NULL, '0000-00-00 00:00:00', 0),
	(338, 339, '2020-03-28 08:37:00', '2020-03-28 09:25:20', 41, NULL, 1, 20, 19, 19, 5, 1, 0.00, 4000.00, 0.00, 20.00, 0.00, 8000, 0.00, NULL, 0.00, 0.00, 0.00, 0.00, NULL, 0.00, '2020-03-28 08:37:00', 19, 2, NULL, 2, NULL, 0, NULL, NULL, '0000-00-00 00:00:00', 0),
	(339, 337, '2020-03-28 08:51:27', '2020-03-28 09:08:52', 41, NULL, 2, 20, 19, 19, 3, 1, 0.00, 4000.00, 0.00, 20.00, 0.00, 7000, 0.00, NULL, 0.00, 0.00, 0.00, 0.00, NULL, 0.00, '2020-03-28 08:51:27', 19, 2, NULL, 2, NULL, 0, NULL, NULL, '0000-00-00 00:00:00', 0),
	(340, 338, '2020-03-28 09:07:31', '2020-03-28 09:25:03', 41, NULL, 3, 20, 19, 19, 4, 1, 0.00, 4000.00, 0.00, 20.00, 0.00, 40000, 0.00, NULL, 0.00, 0.00, 0.00, 0.00, NULL, 0.00, '2020-03-28 09:07:31', 19, 2, NULL, 2, NULL, 0, NULL, NULL, '0000-00-00 00:00:00', 0),
	(341, 343, '2020-03-28 09:30:28', '2020-03-28 10:18:03', 41, NULL, 5, 20, 19, 19, 9, 1, 0.00, 4000.00, 0.00, 20.00, 0.00, 0, 5.00, NULL, 0.00, 0.00, 0.00, 0.00, NULL, 0.00, '2020-03-28 09:30:28', 19, 2, NULL, 2, NULL, 0, NULL, NULL, '0000-00-00 00:00:00', 0),
	(342, 340, '2020-03-28 09:37:32', '2020-03-28 09:38:24', 41, NULL, 1, 20, 19, 19, 6, 1, 0.00, 4000.00, 0.00, 20.00, 0.00, 0, 5.00, NULL, 0.00, 0.00, 0.00, 0.00, NULL, 0.00, '2020-03-28 09:37:32', 19, 2, NULL, 1, NULL, 0, NULL, NULL, '0000-00-00 00:00:00', 0),
	(343, 342, '2020-03-28 09:48:20', '2020-03-28 10:11:20', 41, NULL, 1, 20, 19, 19, 8, 1, 0.00, 4000.00, 0.00, 20.00, 0.00, 10000, 0.00, NULL, 0.00, 0.00, 0.00, 0.00, NULL, 0.00, '2020-03-28 09:48:20', 19, 2, NULL, 2, NULL, 0, NULL, NULL, '0000-00-00 00:00:00', 0),
	(344, 341, '2020-03-28 09:54:32', '2020-03-28 09:57:08', 41, NULL, 52, 20, 19, 19, 7, 1, 0.00, 4000.00, 0.00, 0.00, 0.00, 0, 0.00, 6, 1.00, 0.00, 0.00, 0.00, NULL, 0.00, '2020-03-28 09:54:32', 19, 2, NULL, 1, NULL, 0, NULL, NULL, '0000-00-00 00:00:00', 0),
	(345, 345, '2020-03-28 10:23:53', '2020-03-28 10:42:40', 41, NULL, 53, 20, 19, 19, 11, 1, 0.00, 4000.00, 0.00, 20.00, 0.00, 0, 5.00, NULL, 0.00, 0.00, 0.00, 0.00, NULL, 0.00, '2020-03-28 10:23:53', 19, 2, NULL, 1, NULL, 0, NULL, NULL, '0000-00-00 00:00:00', 0),
	(346, 357, '2020-03-28 10:35:11', '2020-03-28 18:30:18', 41, NULL, 5, 20, 19, 19, 23, 3, 0.00, 4000.00, 0.00, 0.00, 0.00, 0, 3.90, NULL, 0.00, 0.00, 0.00, 0.00, NULL, 0.00, '2020-03-28 10:35:11', 19, 2, NULL, 1, NULL, 0, NULL, NULL, '0000-00-00 00:00:00', 0),
	(347, 344, '2020-03-28 10:39:00', '2020-03-28 10:39:47', 41, NULL, 1, 20, 19, 19, 10, 1, 0.00, 4000.00, 0.00, 0.00, 0.00, 0, 5.00, NULL, 0.00, 0.00, 0.00, 0.00, NULL, 0.00, '2020-03-28 10:39:00', 19, 2, NULL, 1, NULL, 0, NULL, NULL, '0000-00-00 00:00:00', 0),
	(348, 346, '2020-03-28 11:04:57', '2020-03-28 11:05:21', 41, NULL, 1, 20, 19, 19, 12, 1, 0.00, 4000.00, 0.00, 20.00, 0.00, 50000, 0.00, NULL, 0.00, 0.00, 0.00, 0.00, NULL, 0.00, '2020-03-28 11:04:57', 19, 2, NULL, 1, NULL, 0, NULL, NULL, '0000-00-00 00:00:00', 0),
	(349, 356, '2020-03-28 11:06:20', '2020-03-28 16:39:22', 41, NULL, 52, 20, 19, 19, 22, 1, 0.00, 4000.00, 0.00, 0.00, 0.00, 0, 0.00, 6, 3.45, 0.00, 0.00, 0.00, NULL, 0.00, '2020-03-28 11:06:20', 19, 2, NULL, 1, NULL, 0, NULL, NULL, '0000-00-00 00:00:00', 0),
	(350, 347, '2020-03-28 12:36:01', '2020-03-28 13:10:17', 41, NULL, 1, 20, 19, 19, 13, 1, 0.00, 4000.00, 0.00, 20.00, 0.00, 10000, 0.00, NULL, 0.00, 0.00, 0.00, 0.00, NULL, 0.00, '2020-03-28 12:36:01', 19, 2, NULL, 2, NULL, 0, NULL, NULL, '0000-00-00 00:00:00', 0),
	(351, 349, '2020-03-28 12:58:32', '2020-03-28 13:36:15', 41, NULL, 2, 20, 19, 19, 15, 1, 0.00, 4000.00, 0.00, 20.00, 0.00, 0, 2.00, NULL, 0.00, 0.00, 0.00, 0.00, NULL, 0.00, '2020-03-28 12:58:32', 19, 2, NULL, 2, NULL, 0, NULL, NULL, '0000-00-00 00:00:00', 0),
	(352, 348, '2020-03-28 13:21:49', '2020-03-28 13:22:42', 41, NULL, 3, 20, 19, 19, 14, 2, 0.00, 4000.00, 0.00, 20.00, 0.00, 0, 100.00, NULL, 0.00, 0.00, 0.00, 0.00, NULL, 0.00, '2020-03-28 13:21:49', 19, 2, NULL, 1, NULL, 0, NULL, NULL, '0000-00-00 00:00:00', 0),
	(353, 350, '2020-03-28 14:40:03', '2020-03-28 14:40:14', 41, NULL, 1, 20, 19, 19, 16, 1, 0.00, 4000.00, 0.00, 0.00, 0.00, 0, 0.00, 15, 0.50, 0.00, 0.00, 0.00, NULL, 0.00, '2020-03-28 14:40:03', 19, 2, NULL, 1, NULL, 0, NULL, NULL, '0000-00-00 00:00:00', 0),
	(354, 351, '2020-03-28 15:21:35', '2020-03-28 15:21:46', 41, NULL, 1, 20, 19, 19, 17, 1, 0.00, 4000.00, 0.00, 0.00, 0.00, 0, 0.00, 10, 0.00, 0.00, 0.00, 0.00, NULL, 0.00, '2020-03-28 15:21:35', 19, 2, NULL, 1, NULL, 0, NULL, NULL, '0000-00-00 00:00:00', 0),
	(355, 352, '2020-03-28 15:31:34', '2020-03-28 15:32:02', 41, NULL, 1, 20, 19, 19, 18, 1, 0.00, 4000.00, 0.00, 20.00, 0.00, 10000, 0.00, NULL, 0.00, 0.00, 0.00, 0.00, NULL, 0.00, '2020-03-28 15:31:34', 19, 2, NULL, 1, NULL, 0, NULL, NULL, '0000-00-00 00:00:00', 0),
	(356, 354, '2020-03-28 15:33:07', '2020-03-28 16:10:34', 41, NULL, 1, 20, 19, 19, 20, 1, 0.00, 4000.00, 0.00, 20.00, 0.00, 15000, 0.00, NULL, 0.00, 0.00, 0.00, 0.00, NULL, 0.00, '2020-03-28 15:33:07', 19, 2, NULL, 1, NULL, 0, NULL, NULL, '0000-00-00 00:00:00', 0),
	(357, 353, '2020-03-28 15:59:32', '2020-03-28 16:02:30', 41, NULL, 2, 20, 19, 19, 19, 1, 0.00, 4000.00, 0.00, 20.00, 0.00, 50000, 0.00, NULL, 0.00, 0.00, 0.00, 0.00, NULL, 0.00, '2020-03-28 15:59:32', 19, 2, NULL, 2, NULL, 0, NULL, NULL, '0000-00-00 00:00:00', 0),
	(358, 355, '2020-03-28 16:34:27', '2020-03-28 16:35:19', 41, NULL, 1, 20, 19, 19, 21, 1, 0.00, 4000.00, 0.00, 20.00, 0.00, 6400, 0.00, NULL, 0.00, 0.00, 0.00, 0.00, NULL, 0.00, '2020-03-28 16:34:27', 19, 2, NULL, 1, NULL, 0, NULL, NULL, '0000-00-00 00:00:00', 0),
	(359, 379, '2020-03-29 07:29:42', '2020-03-29 18:58:18', 41, NULL, 52, 21, 19, 19, 22, 1, 0.00, 4000.00, 0.00, 0.00, 0.00, 0, 0.00, 6, 3.10, 0.00, 0.00, 0.00, NULL, 0.00, '2020-03-29 07:29:42', 19, 2, NULL, 1, NULL, 0, NULL, NULL, '0000-00-00 00:00:00', 0),
	(360, 358, '2020-03-29 07:54:26', '2020-03-29 07:54:39', 41, NULL, 1, 21, 19, 19, 1, 1, 0.00, 4000.00, 0.00, 0.00, 0.00, 0, 0.00, 9, 0.00, 0.00, 0.00, 0.00, NULL, 0.00, '2020-03-29 07:54:26', 19, 2, NULL, 1, NULL, 0, NULL, NULL, '0000-00-00 00:00:00', 0),
	(361, 359, '2020-03-29 07:54:55', '2020-03-29 07:55:03', 41, NULL, 1, 21, 19, 19, 2, 1, 0.00, 4000.00, 0.00, 0.00, 0.00, 0, 0.00, 14, 0.50, 0.00, 0.00, 0.00, NULL, 0.00, '2020-03-29 07:54:55', 19, 2, NULL, 1, NULL, 0, NULL, NULL, '0000-00-00 00:00:00', 0),
	(362, 360, '2020-03-29 08:28:59', '2020-03-29 08:29:08', 41, NULL, 1, 21, 19, 19, 3, 1, 0.00, 4000.00, 0.00, 0.00, 0.00, 0, 0.00, 15, 0.50, 0.00, 0.00, 0.00, NULL, 0.00, '2020-03-29 08:28:59', 19, 2, NULL, 1, NULL, 0, NULL, NULL, '0000-00-00 00:00:00', 0),
	(363, 361, '2020-03-29 09:16:37', '2020-03-29 09:51:12', 41, NULL, 1, 21, 19, 19, 4, 1, 0.00, 4000.00, 0.00, 20.00, 0.00, 50000, 0.00, NULL, 0.00, 0.00, 0.00, 0.00, NULL, 0.00, '2020-03-29 09:16:37', 19, 2, NULL, 2, NULL, 0, NULL, NULL, '0000-00-00 00:00:00', 0),
	(364, 362, '2020-03-29 09:32:48', '2020-03-29 10:07:18', 41, NULL, 2, 21, 19, 19, 5, 1, 0.00, 4000.00, 0.00, 20.00, 0.00, 19200, 0.00, NULL, 0.00, 0.00, 0.00, 0.00, NULL, 0.00, '2020-03-29 09:32:48', 19, 2, NULL, 2, NULL, 0, NULL, NULL, '0000-00-00 00:00:00', 0),
	(365, 363, '2020-03-29 10:15:51', '2020-03-29 10:17:23', 41, NULL, 1, 21, 19, 19, 6, 1, 0.00, 4000.00, 0.00, 0.00, 0.00, 0, 4.60, NULL, 0.00, 0.00, 0.00, 0.00, NULL, 0.00, '2020-03-29 10:15:51', 19, 2, NULL, 1, NULL, 0, NULL, NULL, '0000-00-00 00:00:00', 0),
	(366, 366, '2020-03-29 10:20:27', '2020-03-29 11:47:52', 41, NULL, 1, 21, 19, 19, 9, 1, 0.00, 4000.00, 0.00, 0.00, 0.00, 10000, 0.00, NULL, 0.00, 0.00, 0.00, 0.00, NULL, 0.00, '2020-03-29 10:20:27', 19, 2, NULL, 2, NULL, 0, NULL, NULL, '0000-00-00 00:00:00', 0),
	(367, 364, '2020-03-29 11:07:35', '2020-03-29 11:08:48', 41, NULL, 2, 21, 19, 19, 7, 1, 0.00, 4000.00, 0.00, 20.00, 0.00, 0, 5.00, NULL, 0.00, 0.00, 0.00, 0.00, NULL, 0.00, '2020-03-29 11:07:35', 19, 2, NULL, 1, NULL, 0, NULL, NULL, '0000-00-00 00:00:00', 0),
	(368, 370, '2020-03-29 11:20:30', '2020-03-29 14:34:22', 41, NULL, 2, 21, 19, 19, 13, 1, 0.00, 4000.00, 0.00, 20.00, 0.00, 80000, 0.00, NULL, 0.00, 0.00, 0.00, 0.00, NULL, 0.00, '2020-03-29 11:20:30', 19, 2, NULL, 3, NULL, 0, NULL, NULL, '0000-00-00 00:00:00', 0),
	(369, 365, '2020-03-29 11:21:09', '2020-03-29 11:22:10', 41, NULL, 3, 21, 19, 19, 8, 1, 0.00, 4000.00, 0.00, 20.00, 0.00, 1500, 2.00, NULL, 0.00, 0.00, 0.00, 0.00, NULL, 0.00, '2020-03-29 11:21:09', 19, 2, NULL, 1, NULL, 0, NULL, NULL, '0000-00-00 00:00:00', 0),
	(370, 367, '2020-03-29 11:55:11', '2020-03-29 11:55:44', 41, NULL, 1, 21, 19, 19, 10, 2, 0.00, 4000.00, 0.00, 20.00, 0.00, 0, 10.00, NULL, 0.00, 0.00, 0.00, 0.00, NULL, 0.00, '2020-03-29 11:55:11', 19, 2, NULL, 1, NULL, 0, NULL, NULL, '0000-00-00 00:00:00', 0),
	(371, 368, '2020-03-29 12:49:59', '2020-03-29 12:50:15', 41, NULL, 3, 21, 19, 19, 11, 1, 0.00, 4000.00, 0.00, 20.00, 0.00, 0, 0.60, NULL, 0.00, 0.00, 0.00, 0.00, NULL, 0.00, '2020-03-29 12:49:59', 19, 2, NULL, 1, NULL, 0, NULL, NULL, '0000-00-00 00:00:00', 0),
	(372, 369, '2020-03-29 13:24:23', '2020-03-29 13:26:54', 41, NULL, 1, 21, 19, 19, 12, 1, 0.00, 4000.00, 0.00, 20.00, 0.00, 35000, 0.00, NULL, 0.00, 0.00, 0.00, 0.00, NULL, 0.00, '2020-03-29 13:24:23', 19, 2, NULL, 1, NULL, 0, NULL, NULL, '0000-00-00 00:00:00', 0),
	(373, 371, '2020-03-29 14:23:28', '2020-03-29 14:36:14', 41, NULL, 5, 21, 19, 19, 14, 1, 0.00, 4000.00, 0.00, 20.00, 0.00, 50000, 0.00, NULL, 0.00, 0.00, 0.00, 0.00, NULL, 0.00, '2020-03-29 14:23:28', 19, 2, NULL, 2, NULL, 0, NULL, NULL, '0000-00-00 00:00:00', 0),
	(374, 372, '2020-03-29 14:30:48', '2020-03-29 14:55:42', 41, NULL, 48, 21, 19, 19, 15, 1, 0.00, 4000.00, 0.00, 20.00, 0.00, 40000, 0.00, NULL, 0.00, 0.00, 0.00, 0.00, NULL, 0.00, '2020-03-29 14:30:48', 19, 2, NULL, 2, NULL, 0, NULL, NULL, '0000-00-00 00:00:00', 0),
	(375, 373, '2020-03-29 14:57:16', '2020-03-29 14:57:40', 41, NULL, 5, 21, 19, 19, 16, 1, 0.00, 4000.00, 0.00, 20.00, 0.00, 0, 10.00, NULL, 0.00, 0.00, 0.00, 0.00, NULL, 0.00, '2020-03-29 14:57:16', 19, 2, NULL, 1, NULL, 0, NULL, NULL, '0000-00-00 00:00:00', 0),
	(376, 374, '2020-03-29 15:07:46', '2020-03-29 15:07:54', 41, NULL, 1, 21, 19, 19, 17, 1, 0.00, 4000.00, 0.00, 0.00, 0.00, 0, 0.00, 10, 0.00, 0.00, 0.00, 0.00, NULL, 0.00, '2020-03-29 15:07:46', 19, 2, NULL, 1, NULL, 0, NULL, NULL, '0000-00-00 00:00:00', 0),
	(377, 377, '2020-03-29 15:42:50', '2020-03-29 17:18:27', 41, NULL, 1, 21, 19, 19, 20, 1, 0.00, 4000.00, 0.00, 0.00, 0.00, 50000, 0.00, NULL, 0.00, 0.00, 0.00, 0.00, NULL, 0.00, '2020-03-29 15:42:50', 19, 2, NULL, 2, NULL, 0, NULL, NULL, '0000-00-00 00:00:00', 0),
	(378, 375, '2020-03-29 15:47:25', '2020-03-29 15:47:44', 41, NULL, 5, 21, 19, 19, 18, 1, 0.00, 4000.00, 0.00, 20.00, 0.00, 0, 3.00, NULL, 0.00, 0.00, 0.00, 0.00, NULL, 0.00, '2020-03-29 15:47:25', 19, 2, NULL, 1, NULL, 0, NULL, NULL, '0000-00-00 00:00:00', 0),
	(379, 376, '2020-03-29 16:26:01', '2020-03-29 16:26:23', 41, NULL, 5, 21, 19, 19, 19, 1, 0.00, 4000.00, 0.00, 20.00, 0.00, 5000, 0.00, NULL, 0.00, 0.00, 0.00, 0.00, NULL, 0.00, '2020-03-29 16:26:01', 19, 2, NULL, 1, NULL, 0, NULL, NULL, '0000-00-00 00:00:00', 0),
	(380, 378, '2020-03-29 18:27:56', '2020-03-29 18:28:57', 41, NULL, 54, 21, 19, 19, 21, 1, 0.00, 4000.00, 0.00, 0.00, 0.00, 0, 0.00, 12, 0.00, 0.00, 0.00, 0.00, NULL, 0.00, '2020-03-29 18:27:56', 19, 2, NULL, 1, NULL, 0, NULL, NULL, '0000-00-00 00:00:00', 0),
	(381, 380, '2020-03-30 10:40:17', '2020-03-30 10:40:43', 41, NULL, 1, 22, 19, 19, 1, 1, 0.00, 4000.00, 0.00, 20.00, 0.00, 0, 7.00, NULL, 0.00, 0.00, 0.00, 0.00, NULL, 0.00, '2020-03-30 10:40:17', 19, 2, NULL, 1, NULL, 0, NULL, NULL, '0000-00-00 00:00:00', 0),
	(382, 391, '2020-03-30 10:41:00', '2020-03-30 18:56:06', 41, NULL, 52, 22, 19, 19, 12, 1, 0.00, 4000.00, 0.00, 0.00, 0.00, 0, 0.00, 6, 6.50, 0.00, 0.00, 0.00, NULL, 0.00, '2020-03-30 10:41:00', 19, 2, NULL, 1, NULL, 0, NULL, NULL, '0000-00-00 00:00:00', 0),
	(383, 381, '2020-03-30 11:55:45', '2020-03-30 12:32:59', 41, NULL, 5, 22, 19, 19, 2, 1, 0.00, 4000.00, 0.00, 20.00, 0.00, 10000, 0.00, NULL, 0.00, 0.00, 0.00, 0.00, NULL, 0.00, '2020-03-30 11:55:45', 19, 2, NULL, 2, NULL, 0, NULL, NULL, '0000-00-00 00:00:00', 0),
	(384, 384, '2020-03-30 13:24:59', '2020-03-30 13:43:37', 41, NULL, 5, 22, 19, 19, 5, 2, 0.00, 4000.00, 0.00, 20.00, 0.00, 20000, 0.00, NULL, 0.00, 0.00, 0.00, 0.00, NULL, 0.00, '2020-03-30 13:24:59', 19, 2, NULL, 2, NULL, 0, NULL, NULL, '0000-00-00 00:00:00', 0),
	(385, 382, '2020-03-30 13:30:20', '2020-03-30 13:30:42', 41, NULL, 54, 22, 19, 19, 3, 1, 0.00, 4000.00, 0.00, 0.00, 0.00, 0, 0.00, 18, 0.00, 0.00, 0.00, 0.00, NULL, 0.00, '2020-03-30 13:30:20', 19, 2, NULL, 1, NULL, 0, NULL, NULL, '0000-00-00 00:00:00', 0),
	(386, 383, '2020-03-30 13:31:25', '2020-03-30 13:31:50', 41, NULL, 54, 22, 19, 19, 4, 1, 0.00, 4000.00, 0.00, 0.00, 0.00, 0, 0.00, 10, 0.00, 0.00, 0.00, 0.00, NULL, 0.00, '2020-03-30 13:31:25', 19, 2, NULL, 2, NULL, 0, NULL, NULL, '0000-00-00 00:00:00', 0),
	(387, 385, '2020-03-30 14:27:24', '2020-03-30 14:57:56', 41, NULL, 5, 22, 19, 19, 6, 1, 0.00, 4000.00, 0.00, 20.00, 0.00, 0, 5.00, NULL, 0.00, 0.00, 0.00, 0.00, NULL, 0.00, '2020-03-30 14:27:24', 19, 2, NULL, 2, NULL, 0, NULL, NULL, '0000-00-00 00:00:00', 0),
	(388, 386, '2020-03-30 15:03:55', '2020-03-30 15:04:25', 41, NULL, 53, 22, 19, 19, 7, 1, 0.00, 4000.00, 0.00, 20.00, 0.00, 5000, 0.00, NULL, 0.00, 0.00, 0.00, 0.00, NULL, 0.00, '2020-03-30 15:03:55', 19, 2, NULL, 1, NULL, 0, NULL, NULL, '0000-00-00 00:00:00', 0),
	(389, 387, '2020-03-30 16:13:51', '2020-03-30 16:14:13', 41, NULL, 54, 22, 19, 19, 8, 1, 0.00, 4000.00, 0.00, 0.00, 0.00, 0, 0.00, 18, 0.00, 0.00, 0.00, 0.00, NULL, 0.00, '2020-03-30 16:13:51', 19, 2, NULL, 1, NULL, 0, NULL, NULL, '0000-00-00 00:00:00', 0),
	(390, 388, '2020-03-30 16:14:45', '2020-03-30 16:14:55', 41, NULL, 54, 22, 19, 19, 9, 1, 0.00, 4000.00, 0.00, 0.00, 0.00, 0, 0.00, 19, 0.00, 0.00, 0.00, 0.00, NULL, 0.00, '2020-03-30 16:14:45', 19, 2, NULL, 1, NULL, 0, NULL, NULL, '0000-00-00 00:00:00', 0),
	(391, 389, '2020-03-30 16:41:40', '2020-03-30 17:32:18', 41, NULL, 5, 22, 19, 19, 10, 1, 0.00, 4000.00, 0.00, 20.00, 0.00, 0, 2.00, NULL, 0.00, 0.00, 0.00, 0.00, NULL, 0.00, '2020-03-30 16:41:40', 19, 2, NULL, 2, NULL, 0, NULL, NULL, '0000-00-00 00:00:00', 0),
	(392, 390, '2020-03-30 16:52:15', '2020-03-30 17:54:26', 41, NULL, 1, 22, 19, 19, 11, 1, 0.00, 4000.00, 0.00, 0.00, 0.00, 0, 0.00, 12, 0.00, 0.00, 0.00, 0.00, NULL, 0.00, '2020-03-30 16:52:15', 19, 2, NULL, 1, NULL, 0, NULL, NULL, '0000-00-00 00:00:00', 0),
	(393, 410, '2020-03-31 07:30:54', '2020-03-31 18:45:16', 41, NULL, 52, 23, 19, 19, 19, 1, 0.00, 4000.00, 0.00, 0.00, 0.00, 0, 0.00, 6, 5.60, 0.00, 0.00, 0.00, NULL, 0.00, '2020-03-31 07:30:54', 19, 2, NULL, 2, NULL, 0, NULL, NULL, '0000-00-00 00:00:00', 0),
	(394, 392, '2020-03-31 07:59:29', '2020-03-31 08:01:52', 41, NULL, 1, 23, 19, 19, 1, 1, 0.00, 4000.00, 0.00, 0.00, 0.00, 0, 0.00, 10, 0.00, 0.00, 0.00, 0.00, NULL, 0.00, '2020-03-31 07:59:29', 19, 2, NULL, 1, NULL, 0, NULL, NULL, '0000-00-00 00:00:00', 0),
	(395, 395, '2020-03-31 08:02:14', '2020-03-31 08:37:57', 41, NULL, 1, 23, 19, 19, 4, 1, 0.00, 4000.00, 0.00, 20.00, 0.00, 20000, 0.00, NULL, 0.00, 0.00, 0.00, 0.00, NULL, 0.00, '2020-03-31 08:02:14', 19, 2, NULL, 2, NULL, 0, NULL, NULL, '0000-00-00 00:00:00', 0),
	(396, 393, '2020-03-31 08:10:24', '2020-03-31 08:10:33', 41, NULL, 2, 23, 19, 19, 2, 1, 0.00, 4000.00, 0.00, 0.00, 0.00, 0, 0.00, 15, 0.50, 0.00, 0.00, 0.00, NULL, 0.00, '2020-03-31 08:10:24', 19, 2, NULL, 1, NULL, 0, NULL, NULL, '0000-00-00 00:00:00', 0),
	(397, 394, '2020-03-31 08:10:42', '2020-03-31 08:10:54', 41, NULL, 2, 23, 19, 19, 3, 1, 0.00, 4000.00, 0.00, 0.00, 0.00, 0, 0.00, 14, 0.50, 0.00, 0.00, 0.00, NULL, 0.00, '2020-03-31 08:10:42', 19, 2, NULL, 1, NULL, 0, NULL, NULL, '0000-00-00 00:00:00', 0),
	(398, 396, '2020-03-31 09:21:01', '2020-03-31 09:24:07', 41, NULL, 1, 23, 19, 19, 5, 1, 0.00, 4000.00, 0.00, 20.00, 0.00, 20000, 0.00, NULL, 0.00, 0.00, 0.00, 0.00, NULL, 0.00, '2020-03-31 09:21:01', 19, 2, NULL, 2, NULL, 0, NULL, NULL, '0000-00-00 00:00:00', 0),
	(399, 397, '2020-03-31 09:33:48', '2020-03-31 10:21:46', 41, NULL, 1, 23, 19, 19, 6, 1, 0.00, 4000.00, 0.00, 20.00, 0.00, 20000, 0.00, NULL, 0.00, 0.00, 0.00, 0.00, NULL, 0.00, '2020-03-31 09:33:48', 19, 2, NULL, 2, NULL, 0, NULL, NULL, '0000-00-00 00:00:00', 0),
	(400, 399, '2020-03-31 10:30:53', '2020-03-31 11:03:49', 41, NULL, 1, 23, 19, 19, 8, 1, 0.00, 4000.00, 0.00, 20.00, 0.00, 8000, 0.00, NULL, 0.00, 0.00, 0.00, 0.00, NULL, 0.00, '2020-03-31 10:30:53', 19, 2, NULL, 2, NULL, 0, NULL, NULL, '0000-00-00 00:00:00', 0),
	(401, 398, '2020-03-31 10:50:57', '2020-03-31 10:51:08', 41, NULL, 2, 23, 19, 19, 7, 1, 0.00, 4000.00, 0.00, 20.00, 0.00, 20000, 0.00, NULL, 0.00, 0.00, 0.00, 0.00, NULL, 0.00, '2020-03-31 10:50:57', 19, 2, NULL, 1, NULL, 0, NULL, NULL, '0000-00-00 00:00:00', 0),
	(402, 400, '2020-03-31 12:53:10', '2020-03-31 12:53:17', 41, NULL, 1, 23, 19, 19, 9, 1, 0.00, 4000.00, 0.00, 0.00, 0.00, 0, 0.00, 14, 0.50, 0.00, 0.00, 0.00, NULL, 0.00, '2020-03-31 12:53:10', 19, 2, NULL, 1, NULL, 0, NULL, NULL, '0000-00-00 00:00:00', 0),
	(403, 401, '2020-03-31 13:22:08', '2020-03-31 13:22:16', 41, NULL, 1, 23, 19, 19, 10, 1, 0.00, 4000.00, 0.00, 20.00, 0.00, 20000, 0.00, NULL, 0.00, 0.00, 0.00, 0.00, NULL, 0.00, '2020-03-31 13:22:08', 19, 2, NULL, 1, NULL, 0, NULL, NULL, '0000-00-00 00:00:00', 0),
	(404, 403, '2020-03-31 14:05:03', '2020-03-31 14:32:34', 41, NULL, 5, 23, 19, 19, 12, 1, 0.00, 4000.00, 0.00, 20.00, 0.00, 50000, 0.00, NULL, 0.00, 0.00, 0.00, 0.00, NULL, 0.00, '2020-03-31 14:05:03', 19, 2, NULL, 2, NULL, 0, NULL, NULL, '0000-00-00 00:00:00', 0),
	(405, 402, '2020-03-31 14:12:25', '2020-03-31 14:12:42', 41, NULL, 3, 23, 19, 19, 11, 1, 0.00, 4000.00, 0.00, 20.00, 0.00, 10000, 0.00, NULL, 0.00, 0.00, 0.00, 0.00, NULL, 0.00, '2020-03-31 14:12:25', 19, 2, NULL, 1, NULL, 0, NULL, NULL, '0000-00-00 00:00:00', 0),
	(406, 404, '2020-03-31 14:56:47', '2020-03-31 14:56:59', 41, NULL, 1, 23, 19, 19, 13, 1, 0.00, 4000.00, 0.00, 20.00, 0.00, 40000, 0.00, NULL, 0.00, 0.00, 0.00, 0.00, NULL, 0.00, '2020-03-31 14:56:47', 19, 2, NULL, 1, NULL, 0, NULL, NULL, '0000-00-00 00:00:00', 0),
	(407, 405, '2020-03-31 14:58:13', '2020-03-31 14:58:48', 41, NULL, 1, 23, 19, 19, 14, 1, 0.00, 4000.00, 0.00, 20.00, 0.00, 10000, 0.00, NULL, 0.00, 0.00, 0.00, 0.00, NULL, 0.00, '2020-03-31 14:58:13', 19, 2, NULL, 1, NULL, 0, NULL, NULL, '0000-00-00 00:00:00', 0),
	(408, 406, '2020-03-31 15:22:21', '2020-03-31 15:22:30', 41, NULL, 1, 23, 19, 19, 15, 1, 0.00, 4000.00, 0.00, 0.00, 0.00, 0, 0.00, 15, 0.50, 0.00, 0.00, 0.00, NULL, 0.00, '2020-03-31 15:22:21', 19, 2, NULL, 1, NULL, 0, NULL, NULL, '0000-00-00 00:00:00', 0),
	(409, 409, '2020-03-31 15:29:51', '2020-03-31 18:34:02', 41, NULL, 1, 23, 19, 19, 18, 1, 0.00, 4000.00, 0.00, 0.00, 0.00, 0, 5.00, NULL, 0.00, 0.00, 0.00, 0.00, NULL, 0.00, '2020-03-31 15:29:51', 19, 2, NULL, 2, NULL, 0, NULL, NULL, '0000-00-00 00:00:00', 0),
	(410, 407, '2020-03-31 17:08:12', '2020-03-31 17:08:28', 41, NULL, 5, 23, 19, 19, 16, 1, 0.00, 4000.00, 0.00, 20.00, 0.00, 0, 5.00, NULL, 0.00, 0.00, 0.00, 0.00, NULL, 0.00, '2020-03-31 17:08:12', 19, 2, NULL, 1, NULL, 0, NULL, NULL, '0000-00-00 00:00:00', 0),
	(411, 408, '2020-03-31 17:16:35', '2020-03-31 17:16:48', 41, NULL, 5, 23, 19, 19, 17, 1, 0.00, 4000.00, 0.00, 20.00, 0.00, 10000, 0.00, NULL, 0.00, 0.00, 0.00, 0.00, NULL, 0.00, '2020-03-31 17:16:35', 19, 2, NULL, 1, NULL, 0, NULL, NULL, '0000-00-00 00:00:00', 0),
	(412, 411, '2020-04-01 07:04:26', '2020-04-01 07:18:20', 41, NULL, 1, 24, 19, 19, 1, 1, 0.00, 4000.00, 0.00, 20.00, 0.00, 20000, 0.00, NULL, 0.00, 0.00, 0.00, 0.00, NULL, 0.00, '2020-04-01 07:04:26', 19, 2, NULL, 2, NULL, 0, NULL, NULL, '0000-00-00 00:00:00', 0),
	(413, 412, '2020-04-01 07:28:40', '2020-04-01 07:29:00', 41, NULL, 1, 24, 19, 19, 2, 1, 0.00, 4000.00, 0.00, 0.00, 0.00, 0, 0.00, 10, 2.00, 0.00, 0.00, 0.00, NULL, 0.00, '2020-04-01 07:28:40', 19, 2, NULL, 1, NULL, 0, NULL, NULL, '0000-00-00 00:00:00', 0),
	(414, 413, '2020-04-01 08:02:40', '2020-04-01 08:02:54', 41, NULL, 1, 24, 19, 19, 3, 1, 0.00, 4000.00, 0.00, 0.00, 0.00, 0, 0.00, 9, 0.00, 0.00, 0.00, 0.00, NULL, 0.00, '2020-04-01 08:02:40', 19, 2, NULL, 1, NULL, 0, NULL, NULL, '0000-00-00 00:00:00', 0),
	(415, 414, '2020-04-01 08:11:29', '2020-04-01 08:11:39', 41, NULL, 1, 24, 19, 19, 4, 1, 0.00, 4000.00, 0.00, 0.00, 0.00, 0, 0.00, 15, 0.50, 0.00, 0.00, 0.00, NULL, 0.00, '2020-04-01 08:11:29', 19, 2, NULL, 1, NULL, 0, NULL, NULL, '0000-00-00 00:00:00', 0),
	(416, 415, '2020-04-01 08:11:48', '2020-04-01 08:11:56', 41, NULL, 1, 24, 19, 19, 5, 1, 0.00, 4000.00, 0.00, 0.00, 0.00, 0, 0.00, 14, 0.50, 0.00, 0.00, 0.00, NULL, 0.00, '2020-04-01 08:11:48', 19, 2, NULL, 1, NULL, 0, NULL, NULL, '0000-00-00 00:00:00', 0),
	(417, 432, '2020-04-01 08:18:25', '2020-04-01 19:03:33', 41, NULL, 52, 24, 19, 19, 22, 1, 0.00, 4000.00, 0.00, 0.00, 0.00, 0, 0.00, 6, 3.75, 0.00, 0.00, 0.00, NULL, 0.00, '2020-04-01 08:18:25', 19, 2, NULL, 1, NULL, 0, NULL, NULL, '0000-00-00 00:00:00', 0),
	(418, 416, '2020-04-01 09:02:29', '2020-04-01 09:12:26', 41, NULL, 1, 24, 19, 19, 6, 1, 0.00, 4000.00, 0.00, 20.00, 0.00, 20000, 0.00, NULL, 0.00, 0.00, 0.00, 0.00, NULL, 0.00, '2020-04-01 09:02:29', 19, 2, NULL, 2, NULL, 0, NULL, NULL, '0000-00-00 00:00:00', 0),
	(419, 417, '2020-04-01 10:37:36', '2020-04-01 10:39:40', 41, NULL, 1, 24, 19, 19, 7, 1, 0.00, 4000.00, 0.00, 20.00, 0.00, 24000, 0.00, NULL, 0.00, 0.00, 0.00, 0.00, NULL, 0.00, '2020-04-01 10:37:36', 19, 2, NULL, 1, NULL, 0, NULL, NULL, '0000-00-00 00:00:00', 0),
	(420, 418, '2020-04-01 10:42:11', '2020-04-01 13:19:43', 41, NULL, 1, 24, 19, 19, 8, 1, 0.00, 4000.00, 0.00, 0.00, 0.00, 0, 0.00, 14, 0.50, 0.00, 0.00, 0.00, NULL, 0.00, '2020-04-01 10:42:11', 19, 2, NULL, 2, NULL, 0, NULL, NULL, '0000-00-00 00:00:00', 0),
	(421, 419, '2020-04-01 13:47:29', '2020-04-01 13:48:42', 41, NULL, 5, 24, 19, 19, 9, 2, 0.00, 4000.00, 0.00, 20.00, 0.00, 0, 10.00, NULL, 0.00, 0.00, 0.00, 0.00, NULL, 0.00, '2020-04-01 13:47:29', 19, 2, NULL, 2, NULL, 0, NULL, NULL, '0000-00-00 00:00:00', 0),
	(422, 420, '2020-04-01 13:49:35', '2020-04-01 13:50:22', 41, NULL, 1, 24, 19, 19, 10, 1, 0.00, 4000.00, 0.00, 20.00, 0.00, 20000, 0.00, NULL, 0.00, 0.00, 0.00, 0.00, NULL, 0.00, '2020-04-01 13:49:35', 19, 2, NULL, 1, NULL, 0, NULL, NULL, '0000-00-00 00:00:00', 0),
	(423, 423, '2020-04-01 14:20:10', '2020-04-01 14:40:50', 41, NULL, 1, 24, 19, 19, 13, 1, 0.00, 4000.00, 0.00, 20.00, 0.00, 8000, 0.00, NULL, 0.00, 0.00, 0.00, 0.00, NULL, 0.00, '2020-04-01 14:20:10', 19, 2, NULL, 2, NULL, 0, NULL, NULL, '0000-00-00 00:00:00', 0),
	(424, 421, '2020-04-01 14:36:17', '2020-04-01 14:36:25', 41, NULL, 2, 24, 19, 19, 11, 1, 0.00, 4000.00, 0.00, 0.00, 0.00, 0, 0.00, 10, 0.00, 0.00, 0.00, 0.00, NULL, 0.00, '2020-04-01 14:36:17', 19, 2, NULL, 1, NULL, 0, NULL, NULL, '0000-00-00 00:00:00', 0),
	(425, 422, '2020-04-01 14:37:01', '2020-04-01 14:37:17', 41, NULL, 2, 24, 19, 19, 12, 1, 0.00, 4000.00, 0.00, 0.00, 0.00, 0, 0.00, 18, 0.00, 0.00, 0.00, 0.00, NULL, 0.00, '2020-04-01 14:37:01', 19, 2, NULL, 1, NULL, 0, NULL, NULL, '0000-00-00 00:00:00', 0),
	(426, 428, '2020-04-01 14:52:01', '2020-04-01 16:18:23', 41, NULL, 1, 24, 19, 19, 18, 1, 0.00, 4000.00, 0.00, 20.00, 0.00, 0, 5.00, NULL, 0.00, 0.00, 0.00, 0.00, NULL, 0.00, '2020-04-01 14:52:01', 19, 2, NULL, 1, NULL, 0, NULL, NULL, '0000-00-00 00:00:00', 0),
	(427, 431, '2020-04-01 15:03:59', '2020-04-01 17:42:59', 41, NULL, 2, 24, 19, 19, 21, 1, 0.00, 4000.00, 0.00, 20.00, 0.00, 0, 1.00, NULL, 0.00, 0.00, 0.00, 0.00, NULL, 0.00, '2020-04-01 15:03:59', 19, 2, NULL, 2, NULL, 0, NULL, NULL, '0000-00-00 00:00:00', 0),
	(428, 424, '2020-04-01 15:07:54', '2020-04-01 15:40:19', 41, NULL, 3, 24, 19, 19, 14, 1, 0.00, 4000.00, 0.00, 20.00, 0.00, 12000, 0.00, NULL, 0.00, 0.00, 0.00, 0.00, NULL, 0.00, '2020-04-01 15:07:54', 19, 2, NULL, 2, NULL, 0, NULL, NULL, '0000-00-00 00:00:00', 0),
	(429, 425, '2020-04-01 15:45:44', '2020-04-01 15:46:14', 41, NULL, 54, 24, 19, 19, 15, 1, 0.00, 4000.00, 0.00, 0.00, 0.00, 0, 0.00, 8, 0.00, 0.00, 0.00, 0.00, NULL, 0.00, '2020-04-01 15:45:44', 19, 2, NULL, 1, NULL, 0, NULL, NULL, '0000-00-00 00:00:00', 0),
	(430, 426, '2020-04-01 15:47:45', '2020-04-01 15:48:00', 41, NULL, 54, 24, 19, 19, 16, 1, 0.00, 4000.00, 0.00, 0.00, 0.00, 0, 0.00, 20, 0.00, 0.00, 0.00, 0.00, NULL, 0.00, '2020-04-01 15:47:45', 19, 2, NULL, 1, NULL, 0, NULL, NULL, '0000-00-00 00:00:00', 0),
	(431, 427, '2020-04-01 15:53:28', '2020-04-01 16:03:47', 41, NULL, 3, 24, 19, 19, 17, 1, 0.00, 4000.00, 0.00, 20.00, 0.00, 32000, 0.00, NULL, 0.00, 0.00, 0.00, 0.00, NULL, 0.00, '2020-04-01 15:53:28', 19, 2, NULL, 2, NULL, 0, NULL, NULL, '0000-00-00 00:00:00', 0),
	(432, 429, '2020-04-01 17:19:47', '2020-04-01 17:19:59', 41, NULL, 54, 24, 19, 19, 19, 1, 0.00, 4000.00, 0.00, 0.00, 0.00, 0, 0.00, 18, 0.00, 0.00, 0.00, 0.00, NULL, 0.00, '2020-04-01 17:19:47', 19, 2, NULL, 1, NULL, 0, NULL, NULL, '0000-00-00 00:00:00', 0),
	(433, 430, '2020-04-01 17:20:22', '2020-04-01 17:20:34', 41, NULL, 54, 24, 19, 19, 20, 1, 0.00, 4000.00, 0.00, 0.00, 0.00, 0, 0.00, 11, 0.00, 0.00, 0.00, 0.00, NULL, 0.00, '2020-04-01 17:20:22', 19, 2, NULL, 1, NULL, 0, NULL, NULL, '0000-00-00 00:00:00', 0),
	(434, 452, '2020-04-02 07:32:46', '2020-04-02 19:01:21', 41, NULL, 52, 25, 19, 19, 20, 1, 0.00, 4000.00, 0.00, 0.00, 0.00, 0, 0.00, 6, 11.60, 0.00, 0.00, 0.00, NULL, 0.00, '2020-04-02 07:32:46', 19, 2, NULL, 2, NULL, 0, NULL, NULL, '0000-00-00 00:00:00', 0),
	(435, 435, '2020-04-02 07:33:15', '2020-04-02 09:12:05', 41, NULL, 1, 25, 19, 19, 3, 1, 0.00, 4000.00, 0.00, 0.00, 0.00, 0, 0.00, 10, 1.00, 0.00, 0.00, 0.00, NULL, 0.00, '2020-04-02 07:33:15', 19, 2, NULL, 1, NULL, 0, NULL, NULL, '0000-00-00 00:00:00', 0),
	(436, 433, '2020-04-02 07:49:23', '2020-04-02 07:49:32', 41, NULL, 2, 25, 19, 19, 1, 1, 0.00, 4000.00, 0.00, 0.00, 0.00, 0, 0.00, 15, 0.00, 0.00, 0.00, 0.00, NULL, 0.00, '2020-04-02 07:49:23', 19, 2, NULL, 1, NULL, 0, NULL, NULL, '0000-00-00 00:00:00', 0),
	(437, 434, '2020-04-02 08:20:51', '2020-04-02 08:21:06', 41, NULL, 2, 25, 19, 19, 2, 1, 0.00, 4000.00, 0.00, 20.00, 0.00, 50000, 0.00, NULL, 0.00, 0.00, 0.00, 0.00, NULL, 0.00, '2020-04-02 08:20:51', 19, 2, NULL, 2, NULL, 0, NULL, NULL, '0000-00-00 00:00:00', 0),
	(438, 436, '2020-04-02 08:37:12', '2020-04-02 09:21:59', 41, NULL, 2, 25, 19, 19, 4, 1, 0.00, 4000.00, 0.00, 0.00, 0.00, 0, 0.00, 8, 2.50, 0.00, 0.00, 0.00, NULL, 0.00, '2020-04-02 08:37:12', 19, 2, NULL, 1, NULL, 0, NULL, NULL, '0000-00-00 00:00:00', 0),
	(439, 437, '2020-04-02 09:59:59', '2020-04-02 10:00:07', 41, NULL, 1, 25, 19, 19, 5, 1, 0.00, 4000.00, 0.00, 0.00, 0.00, 0, 0.00, 14, 0.50, 0.00, 0.00, 0.00, NULL, 0.00, '2020-04-02 09:59:59', 19, 2, NULL, 1, NULL, 0, NULL, NULL, '0000-00-00 00:00:00', 0),
	(440, 438, '2020-04-02 10:20:11', '2020-04-02 10:20:22', 41, NULL, 1, 25, 19, 19, 6, 1, 0.00, 4000.00, 0.00, 0.00, 0.00, 0, 0.00, 9, 0.00, 0.00, 0.00, 0.00, NULL, 0.00, '2020-04-02 10:20:11', 19, 2, NULL, 1, NULL, 0, NULL, NULL, '0000-00-00 00:00:00', 0),
	(441, 439, '2020-04-02 10:26:31', '2020-04-02 10:27:58', 41, NULL, 1, 25, 19, 19, 7, 1, 0.00, 4000.00, 0.00, 20.00, 0.00, 0, 1.00, NULL, 0.00, 0.00, 0.00, 0.00, NULL, 0.00, '2020-04-02 10:26:31', 19, 2, NULL, 2, NULL, 0, NULL, NULL, '0000-00-00 00:00:00', 0),
	(442, 440, '2020-04-02 10:51:11', '2020-04-02 10:51:27', 41, NULL, 1, 25, 19, 19, 8, 1, 0.00, 4000.00, 0.00, 0.00, 0.00, 0, 0.00, 6, 1.45, 0.00, 0.00, 0.00, NULL, 0.00, '2020-04-02 10:51:11', 19, 2, NULL, 1, NULL, 0, NULL, NULL, '0000-00-00 00:00:00', 0),
	(443, 441, '2020-04-02 11:05:45', '2020-04-02 11:33:16', 41, NULL, 1, 25, 19, 19, 9, 1, 0.00, 4000.00, 0.00, 20.00, 0.00, 50000, 0.00, NULL, 0.00, 0.00, 0.00, 0.00, NULL, 0.00, '2020-04-02 11:05:45', 19, 2, NULL, 2, NULL, 0, NULL, NULL, '0000-00-00 00:00:00', 0),
	(444, 442, '2020-04-02 11:43:12', '2020-04-02 13:19:01', 41, NULL, 1, 25, 19, 19, 10, 1, 0.00, 4000.00, 0.00, 20.00, 0.00, 30560, 0.00, NULL, 0.00, 0.00, 0.00, 0.00, NULL, 0.00, '2020-04-02 11:43:12', 19, 2, NULL, 2, NULL, 0, NULL, NULL, '0000-00-00 00:00:00', 0),
	(445, 443, '2020-04-02 12:04:28', '2020-04-02 13:19:22', 41, NULL, 2, 25, 19, 19, 11, 1, 0.00, 4000.00, 0.00, 20.00, 0.00, 0, 5.32, NULL, 0.00, 0.00, 0.00, 0.00, NULL, 0.00, '2020-04-02 12:04:28', 19, 2, NULL, 3, NULL, 0, NULL, NULL, '0000-00-00 00:00:00', 0),
	(446, 444, '2020-04-02 14:31:00', '2020-04-02 14:31:09', 41, NULL, 1, 25, 19, 19, 12, 1, 0.00, 4000.00, 0.00, 0.00, 0.00, 0, 0.00, 10, 0.00, 0.00, 0.00, 0.00, NULL, 0.00, '2020-04-02 14:31:00', 19, 2, NULL, 1, NULL, 0, NULL, NULL, '0000-00-00 00:00:00', 0),
	(447, 446, '2020-04-02 14:49:19', '2020-04-02 15:25:46', 41, NULL, 1, 25, 19, 19, 14, 1, 0.00, 4000.00, 0.00, 20.00, 0.00, 0, 10.00, NULL, 0.00, 0.00, 0.00, 0.00, NULL, 0.00, '2020-04-02 14:49:19', 19, 2, NULL, 2, NULL, 0, NULL, NULL, '0000-00-00 00:00:00', 0),
	(448, 445, '2020-04-02 15:15:02', '2020-04-02 15:15:17', 41, NULL, 2, 25, 19, 19, 13, 1, 0.00, 4000.00, 0.00, 0.00, 0.00, 0, 0.00, 17, 0.00, 0.00, 0.00, 0.00, NULL, 0.00, '2020-04-02 15:15:02', 19, 2, NULL, 1, NULL, 0, NULL, NULL, '0000-00-00 00:00:00', 0),
	(449, 448, '2020-04-02 15:42:06', '2020-04-02 16:37:30', 41, NULL, 1, 25, 19, 19, 16, 1, 0.00, 4000.00, 0.00, 20.00, 0.00, 0, 10.00, NULL, 0.00, 0.00, 0.00, 0.00, NULL, 0.00, '2020-04-02 15:42:06', 19, 2, NULL, 2, NULL, 0, NULL, NULL, '0000-00-00 00:00:00', 0),
	(450, 447, '2020-04-02 15:46:56', '2020-04-02 16:27:49', 41, NULL, 2, 25, 19, 19, 15, 1, 0.00, 4000.00, 0.00, 20.00, 0.00, 20000, 0.00, NULL, 0.00, 0.00, 0.00, 0.00, NULL, 0.00, '2020-04-02 15:46:56', 19, 2, NULL, 2, NULL, 0, NULL, NULL, '0000-00-00 00:00:00', 0),
	(451, 449, '2020-04-02 15:47:05', '2020-04-02 16:42:33', 41, NULL, 3, 25, 19, 19, 17, 1, 0.00, 4000.00, 0.00, 20.00, 0.00, 50000, 0.00, NULL, 0.00, 0.00, 0.00, 0.00, NULL, 0.00, '2020-04-02 15:47:05', 19, 2, NULL, 2, NULL, 0, NULL, NULL, '0000-00-00 00:00:00', 0),
	(452, 450, '2020-04-02 16:54:36', '2020-04-02 16:58:25', 41, NULL, 4, 25, 19, 19, 18, 1, 0.00, 4000.00, 0.00, 20.00, 0.00, 0, 5.00, NULL, 0.00, 0.00, 0.00, 0.00, NULL, 0.00, '2020-04-02 16:54:36', 19, 2, NULL, 2, NULL, 0, NULL, NULL, '0000-00-00 00:00:00', 0),
	(453, 451, '2020-04-02 17:40:05', '2020-04-02 17:40:16', 41, NULL, 51, 25, 19, 19, 19, 1, 0.00, 4000.00, 0.00, 20.00, 0.00, 0, 0.00, 18, 2.00, 0.00, 0.00, 0.00, NULL, 0.00, '2020-04-02 17:40:05', 19, 2, NULL, 1, NULL, 0, NULL, NULL, '0000-00-00 00:00:00', 0),
	(454, 467, '2020-04-03 07:10:33', '2020-04-03 18:38:44', 41, NULL, 52, 26, 19, 19, 15, 1, 0.00, 4000.00, 0.00, 0.00, 0.00, 0, 0.00, 6, 12.95, 0.00, 0.00, 0.00, NULL, 0.00, '2020-04-03 07:10:33', 19, 2, NULL, 1, NULL, 0, NULL, NULL, '0000-00-00 00:00:00', 0),
	(455, 453, '2020-04-03 07:37:48', '2020-04-03 07:37:56', 41, NULL, 1, 26, 19, 19, 1, 1, 0.00, 4000.00, 0.00, 0.00, 0.00, 0, 0.00, 15, 0.50, 0.00, 0.00, 0.00, NULL, 0.00, '2020-04-03 07:37:48', 19, 2, NULL, 1, NULL, 0, NULL, NULL, '0000-00-00 00:00:00', 0),
	(456, 454, '2020-04-03 07:50:56', '2020-04-03 07:51:02', 41, NULL, 1, 26, 19, 19, 2, 1, 0.00, 4000.00, 0.00, 20.00, 0.00, 20000, 0.00, NULL, 0.00, 0.00, 0.00, 0.00, NULL, 0.00, '2020-04-03 07:50:56', 19, 2, NULL, 1, NULL, 0, NULL, NULL, '0000-00-00 00:00:00', 0),
	(457, 455, '2020-04-03 07:52:43', '2020-04-03 08:21:39', 41, NULL, 1, 26, 19, 19, 3, 1, 0.00, 4000.00, 0.00, 20.00, 0.00, 20000, 0.00, NULL, 0.00, 0.00, 0.00, 0.00, NULL, 0.00, '2020-04-03 07:52:43', 19, 2, NULL, 2, NULL, 0, NULL, NULL, '0000-00-00 00:00:00', 0),
	(458, 456, '2020-04-03 08:27:37', '2020-04-03 08:27:45', 41, NULL, 1, 26, 19, 19, 4, 1, 0.00, 4000.00, 0.00, 0.00, 0.00, 0, 0.00, 10, 0.00, 0.00, 0.00, 0.00, NULL, 0.00, '2020-04-03 08:27:37', 19, 2, NULL, 1, NULL, 0, NULL, NULL, '0000-00-00 00:00:00', 0),
	(459, 457, '2020-04-03 09:02:57', '2020-04-03 09:03:37', 41, NULL, 1, 26, 19, 19, 5, 1, 0.00, 4000.00, 0.00, 20.00, 0.00, 10000, 0.00, NULL, 0.00, 0.00, 0.00, 0.00, NULL, 0.00, '2020-04-03 09:02:57', 19, 2, NULL, 1, NULL, 0, NULL, NULL, '0000-00-00 00:00:00', 0),
	(460, 458, '2020-04-03 09:50:41', '2020-04-03 09:54:39', 41, NULL, 1, 26, 19, 19, 6, 1, 0.00, 4000.00, 0.00, 0.00, 0.00, 0, 0.00, 14, 0.90, 0.00, 0.00, 0.00, NULL, 0.00, '2020-04-03 09:50:41', 19, 2, NULL, 1, NULL, 0, NULL, NULL, '0000-00-00 00:00:00', 0),
	(461, 460, '2020-04-03 10:12:56', '2020-04-03 11:18:54', 41, NULL, 1, 26, 19, 19, 8, 1, 0.00, 4000.00, 0.00, 20.00, 0.00, 50000, 0.00, NULL, 0.00, 0.00, 0.00, 0.00, NULL, 0.00, '2020-04-03 10:12:56', 19, 2, NULL, 2, NULL, 0, NULL, NULL, '0000-00-00 00:00:00', 0),
	(462, 459, '2020-04-03 11:02:48', '2020-04-03 11:03:02', 41, NULL, 2, 26, 19, 19, 7, 1, 0.00, 4000.00, 0.00, 20.00, 0.00, 9300, 0.00, NULL, 0.00, 0.00, 0.00, 0.00, NULL, 0.00, '2020-04-03 11:02:48', 19, 2, NULL, 1, NULL, 0, NULL, NULL, '0000-00-00 00:00:00', 0),
	(463, 461, '2020-04-03 11:24:05', '2020-04-03 11:53:14', 41, NULL, 1, 26, 19, 19, 9, 1, 0.00, 4000.00, 0.00, 20.00, 0.00, 20000, 0.00, NULL, 0.00, 0.00, 0.00, 0.00, NULL, 0.00, '2020-04-03 11:24:05', 19, 2, NULL, 1, NULL, 0, NULL, NULL, '0000-00-00 00:00:00', 0),
	(464, 466, '2020-04-03 11:40:36', '2020-04-03 15:45:47', 41, NULL, 2, 26, 19, 19, 14, 1, 0.00, 4000.00, 0.00, 0.00, 0.00, 0, 0.00, 7, 0.00, 0.00, 0.00, 0.00, NULL, 0.00, '2020-04-03 11:40:36', 19, 2, NULL, 1, NULL, 0, NULL, NULL, '0000-00-00 00:00:00', 0),
	(465, 463, '2020-04-03 12:21:14', '2020-04-03 13:06:55', 41, NULL, 1, 26, 19, 19, 11, 1, 0.00, 4000.00, 0.00, 20.00, 0.00, 20000, 0.00, NULL, 0.00, 0.00, 0.00, 0.00, NULL, 0.00, '2020-04-03 12:21:14', 19, 2, NULL, 2, NULL, 0, NULL, NULL, '0000-00-00 00:00:00', 0),
	(466, 462, '2020-04-03 12:49:22', '2020-04-03 12:49:44', 41, NULL, 3, 26, 19, 19, 10, 1, 0.00, 4000.00, 0.00, 0.00, 0.00, 0, 0.00, 20, 0.00, 0.00, 0.00, 0.00, NULL, 0.00, '2020-04-03 12:49:22', 19, 2, NULL, 1, NULL, 0, NULL, NULL, '0000-00-00 00:00:00', 0),
	(467, 464, '2020-04-03 13:30:38', '2020-04-03 14:02:13', 41, NULL, 1, 26, 19, 19, 12, 1, 0.00, 4000.00, 0.00, 0.00, 0.00, 0, 0.00, 9, 0.00, 0.00, 0.00, 0.00, NULL, 0.00, '2020-04-03 13:30:38', 19, 2, NULL, 1, NULL, 0, NULL, NULL, '0000-00-00 00:00:00', 0),
	(468, 465, '2020-04-03 15:35:53', '2020-04-03 15:39:10', 41, NULL, 1, 26, 19, 19, 13, 1, 0.00, 4000.00, 0.00, 20.00, 0.00, 8000, 0.00, NULL, 0.00, 0.00, 0.00, 0.00, NULL, 0.00, '2020-04-03 15:35:53', 19, 2, NULL, 2, NULL, 0, NULL, NULL, '0000-00-00 00:00:00', 0),
	(469, 477, '2020-04-04 08:21:57', '2020-04-04 12:48:52', 41, NULL, 52, 27, 19, 19, 10, 1, 0.00, 4000.00, 0.00, 0.00, 0.00, 10000, 0.00, NULL, 0.00, 0.00, 0.00, 0.00, NULL, 0.00, '2020-04-04 08:21:57', 19, 2, NULL, 1, NULL, 0, NULL, NULL, '0000-00-00 00:00:00', 0),
	(470, 468, '2020-04-04 08:40:33', '2020-04-04 08:40:41', 41, NULL, 1, 27, 19, 19, 1, 1, 0.00, 4000.00, 0.00, 0.00, 0.00, 0, 0.00, 15, 0.50, 0.00, 0.00, 0.00, NULL, 0.00, '2020-04-04 08:40:33', 19, 2, NULL, 1, NULL, 0, NULL, NULL, '0000-00-00 00:00:00', 0),
	(471, 469, '2020-04-04 08:52:18', '2020-04-04 08:52:29', 41, NULL, 1, 27, 19, 19, 2, 1, 0.00, 4000.00, 0.00, 0.00, 0.00, 0, 0.00, 14, 0.90, 0.00, 0.00, 0.00, NULL, 0.00, '2020-04-04 08:52:18', 19, 2, NULL, 1, NULL, 0, NULL, NULL, '0000-00-00 00:00:00', 0),
	(472, 470, '2020-04-04 08:58:54', '2020-04-04 08:59:10', 41, NULL, 1, 27, 19, 19, 3, 1, 0.00, 4000.00, 0.00, 0.00, 0.00, 0, 0.00, 14, 0.50, 0.00, 0.00, 0.00, NULL, 0.00, '2020-04-04 08:58:54', 19, 2, NULL, 1, NULL, 0, NULL, NULL, '0000-00-00 00:00:00', 0),
	(473, 471, '2020-04-04 09:15:45', '2020-04-04 09:16:02', 41, NULL, 1, 27, 19, 19, 4, 1, 0.00, 4000.00, 0.00, 0.00, 0.00, 0, 0.00, 10, 0.00, 0.00, 0.00, 0.00, NULL, 0.00, '2020-04-04 09:15:45', 19, 2, NULL, 1, NULL, 0, NULL, NULL, '0000-00-00 00:00:00', 0),
	(474, 473, '2020-04-04 10:02:53', '2020-04-04 10:41:38', 41, NULL, 1, 27, 19, 19, 6, 1, 0.00, 4000.00, 0.00, 20.00, 0.00, 5000, 0.00, NULL, 0.00, 0.00, 0.00, 0.00, NULL, 0.00, '2020-04-04 10:02:53', 19, 2, NULL, 1, NULL, 0, NULL, NULL, '0000-00-00 00:00:00', 0),
	(475, 472, '2020-04-04 10:31:16', '2020-04-04 10:31:22', 41, NULL, 2, 27, 19, 19, 5, 1, 0.00, 4000.00, 0.00, 20.00, 0.00, 20000, 0.00, NULL, 0.00, 0.00, 0.00, 0.00, NULL, 0.00, '2020-04-04 10:31:16', 19, 2, NULL, 1, NULL, 0, NULL, NULL, '0000-00-00 00:00:00', 0),
	(476, 474, '2020-04-04 11:20:03', '2020-04-04 11:20:32', 41, NULL, 1, 27, 19, 19, 7, 1, 0.00, 4000.00, 0.00, 20.00, 0.00, 10000, 0.00, NULL, 0.00, 0.00, 0.00, 0.00, NULL, 0.00, '2020-04-04 11:20:03', 19, 2, NULL, 1, NULL, 0, NULL, NULL, '0000-00-00 00:00:00', 0),
	(477, 475, '2020-04-04 12:30:13', '2020-04-04 12:34:27', 41, NULL, 1, 27, 19, 19, 8, 1, 0.00, 4000.00, 0.00, 20.00, 0.00, 0, 2.00, NULL, 0.00, 0.00, 0.00, 0.00, NULL, 0.00, '2020-04-04 12:30:13', 19, 2, NULL, 1, NULL, 0, NULL, NULL, '0000-00-00 00:00:00', 0),
	(478, 476, '2020-04-04 12:41:06', '2020-04-04 12:41:18', 41, NULL, 1, 27, 19, 19, 9, 1, 0.00, 4000.00, 0.00, 20.00, 0.00, 10000, 0.00, NULL, 0.00, 0.00, 0.00, 0.00, NULL, 0.00, '2020-04-04 12:41:06', 19, 2, NULL, 1, NULL, 0, NULL, NULL, '0000-00-00 00:00:00', 0),
	(479, 488, '2020-04-04 12:51:00', '2020-04-04 19:27:29', 41, NULL, 52, 27, 19, 19, 21, 1, 0.00, 4000.00, 0.00, 0.00, 0.00, 0, 0.00, 6, 4.12, 0.00, 0.00, 0.00, NULL, 0.00, '2020-04-04 12:51:00', 19, 2, NULL, 1, NULL, 0, NULL, NULL, '0000-00-00 00:00:00', 0),
	(480, 479, '2020-04-04 13:38:47', '2020-04-04 14:09:40', 41, NULL, 1, 27, 19, 19, 12, 1, 0.00, 4000.00, 0.00, 20.00, 0.00, 20000, 0.00, NULL, 0.00, 0.00, 0.00, 0.00, NULL, 0.00, '2020-04-04 13:38:47', 19, 2, NULL, 2, NULL, 0, NULL, NULL, '0000-00-00 00:00:00', 0),
	(481, 478, '2020-04-04 13:54:35', '2020-04-04 13:54:46', 41, NULL, 2, 27, 19, 19, 11, 1, 0.00, 4000.00, 0.00, 0.00, 0.00, 0, 0.00, 9, 0.00, 0.00, 0.00, 0.00, NULL, 0.00, '2020-04-04 13:54:35', 19, 2, NULL, 1, NULL, 0, NULL, NULL, '0000-00-00 00:00:00', 0),
	(482, 480, '2020-04-04 13:59:29', '2020-04-04 14:31:41', 41, NULL, 5, 27, 19, 19, 13, 1, 0.00, 4000.00, 0.00, 20.00, 0.00, 10000, 0.00, NULL, 0.00, 0.00, 0.00, 0.00, NULL, 0.00, '2020-04-04 13:59:29', 19, 2, NULL, 2, NULL, 0, NULL, NULL, '0000-00-00 00:00:00', 0),
	(483, 481, '2020-04-04 14:18:18', '2020-04-04 14:45:36', 41, NULL, 1, 27, 19, 19, 14, 1, 0.00, 4000.00, 0.00, 20.00, 0.00, 0, 5.00, NULL, 0.00, 0.00, 0.00, 0.00, NULL, 0.00, '2020-04-04 14:18:18', 19, 2, NULL, 2, NULL, 0, NULL, NULL, '0000-00-00 00:00:00', 0),
	(484, 484, '2020-04-04 14:46:17', '2020-04-04 16:50:48', 41, NULL, 5, 27, 19, 19, 17, 2, 0.00, 4000.00, 0.00, 20.00, 0.00, 0, 50.00, NULL, 0.00, 0.00, 0.00, 0.00, NULL, 0.00, '2020-04-04 14:46:17', 19, 2, NULL, 1, NULL, 0, NULL, NULL, '0000-00-00 00:00:00', 0),
	(485, 482, '2020-04-04 15:46:19', '2020-04-04 15:47:25', 41, NULL, 1, 27, 19, 19, 15, 1, 0.00, 4000.00, 0.00, 0.00, 0.00, 0, 0.00, 14, 1.88, 0.00, 0.00, 0.00, NULL, 0.00, '2020-04-04 15:46:19', 19, 2, NULL, 1, NULL, 0, NULL, NULL, '0000-00-00 00:00:00', 0),
	(486, 483, '2020-04-04 15:47:58', '2020-04-04 15:48:23', 41, NULL, 1, 27, 19, 19, 16, 1, 0.00, 4000.00, 0.00, 0.00, 0.00, 0, 0.00, 8, 0.00, 0.00, 0.00, 0.00, NULL, 0.00, '2020-04-04 15:47:58', 19, 2, NULL, 1, NULL, 0, NULL, NULL, '0000-00-00 00:00:00', 0),
	(487, 485, '2020-04-04 17:05:29', '2020-04-04 17:39:10', 41, NULL, 5, 27, 19, 19, 18, 1, 0.00, 4000.00, 0.00, 20.00, 0.00, 20000, 0.00, NULL, 0.00, 0.00, 0.00, 0.00, NULL, 0.00, '2020-04-04 17:05:29', 19, 2, NULL, 2, NULL, 0, NULL, NULL, '0000-00-00 00:00:00', 0),
	(488, 486, '2020-04-04 18:34:37', '2020-04-04 18:35:36', 41, NULL, 5, 27, 19, 19, 19, 1, 0.00, 4000.00, 0.00, 20.00, 0.00, 3200, 0.00, NULL, 0.00, 0.00, 0.00, 0.00, NULL, 0.00, '2020-04-04 18:34:37', 19, 2, NULL, 1, NULL, 0, NULL, NULL, '0000-00-00 00:00:00', 0),
	(489, 487, '2020-04-04 18:57:21', '2020-04-04 19:00:05', 41, NULL, 5, 27, 19, 19, 20, 1, 0.00, 4000.00, 0.00, 20.00, 0.00, 500, 5.00, NULL, 0.00, 0.00, 0.00, 0.00, NULL, 0.00, '2020-04-04 18:57:21', 19, 2, NULL, 1, NULL, 0, NULL, NULL, '0000-00-00 00:00:00', 0),
	(490, 489, '2020-04-05 07:18:22', '2020-04-05 07:18:32', 41, NULL, 1, 28, 19, 19, 1, 1, 0.00, 4000.00, 0.00, 0.00, 0.00, 0, 0.00, 10, 0.50, 0.00, 0.00, 0.00, NULL, 0.00, '2020-04-05 07:18:22', 19, 2, NULL, 1, NULL, 0, NULL, NULL, '0000-00-00 00:00:00', 0),
	(491, 514, '2020-04-05 07:39:20', '2020-04-05 16:44:39', 41, NULL, 52, 28, 19, 19, 26, 1, 0.00, 4000.00, 0.00, 0.00, 0.00, 0, 0.00, 6, 12.70, 0.00, 0.00, 0.00, NULL, 0.00, '2020-04-05 07:39:20', 19, 2, NULL, 1, NULL, 0, NULL, NULL, '0000-00-00 00:00:00', 0),
	(492, 490, '2020-04-05 07:39:35', '2020-04-05 07:39:53', 41, NULL, 1, 28, 19, 19, 2, 1, 0.00, 4000.00, 0.00, 20.00, 0.00, 0, 10.00, NULL, 0.00, 0.00, 0.00, 0.00, NULL, 0.00, '2020-04-05 07:39:35', 19, 2, NULL, 1, NULL, 0, NULL, NULL, '0000-00-00 00:00:00', 0),
	(493, 491, '2020-04-05 08:25:55', '2020-04-05 09:13:45', 41, NULL, 1, 28, 19, 19, 3, 1, 0.00, 4000.00, 0.00, 20.00, 0.00, 50000, 0.00, NULL, 0.00, 0.00, 0.00, 0.00, NULL, 0.00, '2020-04-05 08:25:55', 19, 2, NULL, 2, NULL, 0, NULL, NULL, '0000-00-00 00:00:00', 0),
	(494, 501, '2020-04-05 08:47:29', '2020-04-05 11:32:14', 41, NULL, 2, 28, 19, 19, 13, 1, 0.00, 4000.00, 0.00, 20.00, 0.00, 20000, 0.00, NULL, 0.00, 0.00, 0.00, 0.00, NULL, 0.00, '2020-04-05 08:47:29', 19, 2, NULL, 2, NULL, 0, NULL, NULL, '0000-00-00 00:00:00', 0),
	(495, 493, '2020-04-05 09:34:16', '2020-04-05 10:08:40', 41, NULL, 1, 28, 19, 19, 5, 1, 0.00, 4000.00, 0.00, 20.00, 0.00, 10000, 0.00, NULL, 0.00, 0.00, 0.00, 0.00, NULL, 0.00, '2020-04-05 09:34:16', 19, 2, NULL, 1, NULL, 0, NULL, NULL, '0000-00-00 00:00:00', 0),
	(496, 492, '2020-04-05 09:42:20', '2020-04-05 09:46:56', 41, NULL, 3, 28, 19, 19, 4, 1, 0.00, 4000.00, 0.00, 20.00, 0.00, 40000, 0.00, NULL, 0.00, 0.00, 0.00, 0.00, NULL, 0.00, '2020-04-05 09:42:20', 19, 2, NULL, 1, NULL, 0, NULL, NULL, '0000-00-00 00:00:00', 0),
	(497, 495, '2020-04-05 09:42:29', '2020-04-05 10:33:43', 41, NULL, 4, 28, 19, 19, 7, 1, 0.00, 4000.00, 0.00, 20.00, 0.00, 20000, 0.00, NULL, 0.00, 0.00, 0.00, 0.00, NULL, 0.00, '2020-04-05 09:42:29', 19, 2, NULL, 2, NULL, 0, NULL, NULL, '0000-00-00 00:00:00', 0),
	(498, 494, '2020-04-05 10:22:31', '2020-04-05 10:29:10', 41, NULL, 1, 28, 19, 19, 6, 1, 0.00, 4000.00, 0.00, 20.00, 0.00, 0, 2.00, NULL, 0.00, 0.00, 0.00, 0.00, NULL, 0.00, '2020-04-05 10:22:31', 19, 2, NULL, 1, NULL, 0, NULL, NULL, '0000-00-00 00:00:00', 0),
	(499, 499, '2020-04-05 10:23:05', '2020-04-05 11:07:21', 41, NULL, 3, 28, 19, 19, 11, 1, 0.00, 4000.00, 0.00, 20.00, 0.00, 10000, 0.00, NULL, 0.00, 0.00, 0.00, 0.00, NULL, 0.00, '2020-04-05 10:23:05', 19, 2, NULL, 1, NULL, 0, NULL, NULL, '0000-00-00 00:00:00', 0),
	(500, 497, '2020-04-05 10:28:21', '2020-04-05 10:59:29', 41, NULL, 5, 28, 19, 19, 9, 1, 0.00, 4000.00, 0.00, 20.00, 0.00, 50000, 0.00, NULL, 0.00, 0.00, 0.00, 0.00, NULL, 0.00, '2020-04-05 10:28:21', 19, 2, NULL, 2, NULL, 0, NULL, NULL, '0000-00-00 00:00:00', 0),
	(501, 496, '2020-04-05 10:52:53', '2020-04-05 10:53:01', 41, NULL, 1, 28, 19, 19, 8, 1, 0.00, 4000.00, 0.00, 0.00, 0.00, 0, 0.00, 9, 0.00, 0.00, 0.00, 0.00, NULL, 0.00, '2020-04-05 10:52:53', 19, 2, NULL, 1, NULL, 0, NULL, NULL, '0000-00-00 00:00:00', 0),
	(502, 498, '2020-04-05 11:05:03', '2020-04-05 11:05:16', 41, NULL, 1, 28, 19, 19, 10, 1, 0.00, 4000.00, 0.00, 0.00, 0.00, 0, 0.00, 18, 0.00, 0.00, 0.00, 0.00, NULL, 0.00, '2020-04-05 11:05:03', 19, 2, NULL, 1, NULL, 0, NULL, NULL, '0000-00-00 00:00:00', 0),
	(503, 502, '2020-04-05 11:10:40', '2020-04-05 11:57:24', 41, NULL, 3, 28, 19, 19, 14, 1, 0.00, 4000.00, 0.00, 20.00, 0.00, 10000, 0.00, NULL, 0.00, 0.00, 0.00, 0.00, NULL, 0.00, '2020-04-05 11:10:40', 19, 2, NULL, 2, NULL, 0, NULL, NULL, '0000-00-00 00:00:00', 0),
	(504, 500, '2020-04-05 11:10:59', '2020-04-05 11:12:36', 41, NULL, 1, 28, 19, 19, 12, 1, 0.00, 4000.00, 0.00, 20.00, 0.00, 0, 4.16, NULL, 0.00, 0.00, 0.00, 0.00, NULL, 0.00, '2020-04-05 11:10:59', 19, 2, NULL, 1, NULL, 0, NULL, NULL, '0000-00-00 00:00:00', 0),
	(505, 503, '2020-04-05 11:12:58', '2020-04-05 12:26:19', 41, NULL, 4, 28, 19, 19, 15, 1, 0.00, 4000.00, 0.00, 0.00, 0.00, 0, 0.00, 20, 0.00, 0.00, 0.00, 0.00, NULL, 0.00, '2020-04-05 11:12:58', 19, 2, NULL, 1, NULL, 0, NULL, NULL, '0000-00-00 00:00:00', 0),
	(506, 504, '2020-04-05 12:50:09', '2020-04-05 13:15:21', 41, NULL, 1, 28, 19, 19, 16, 1, 0.00, 4000.00, 0.00, 20.00, 0.00, 50000, 0.00, NULL, 0.00, 0.00, 0.00, 0.00, NULL, 0.00, '2020-04-05 12:50:09', 19, 2, NULL, 2, NULL, 0, NULL, NULL, '0000-00-00 00:00:00', 0),
	(507, 506, '2020-04-05 12:54:07', '2020-04-05 13:28:50', 41, NULL, 2, 28, 19, 19, 18, 1, 0.00, 4000.00, 0.00, 20.00, 0.00, 10000, 0.00, NULL, 0.00, 0.00, 0.00, 0.00, NULL, 0.00, '2020-04-05 12:54:07', 19, 2, NULL, 1, NULL, 0, NULL, NULL, '0000-00-00 00:00:00', 0),
	(508, 505, '2020-04-05 13:04:09', '2020-04-05 13:27:19', 41, NULL, 3, 28, 19, 19, 17, 1, 0.00, 4000.00, 0.00, 20.00, 0.00, 0, 10.00, NULL, 0.00, 0.00, 0.00, 0.00, NULL, 0.00, '2020-04-05 13:04:09', 19, 2, NULL, 1, NULL, 0, NULL, NULL, '0000-00-00 00:00:00', 0),
	(509, 507, '2020-04-05 13:19:31', '2020-04-05 14:04:29', 41, NULL, 1, 28, 19, 19, 19, 1, 0.00, 4000.00, 0.00, 20.00, 0.00, 50000, 0.00, NULL, 0.00, 0.00, 0.00, 0.00, NULL, 0.00, '2020-04-05 13:19:31', 19, 2, NULL, 2, NULL, 0, NULL, NULL, '0000-00-00 00:00:00', 0),
	(510, 510, '2020-04-05 13:23:48', '2020-04-05 16:10:51', 41, NULL, 4, 28, 19, 19, 22, 1, 0.00, 4000.00, 0.00, 20.00, 0.00, 3200, 0.00, NULL, 0.00, 0.00, 0.00, 0.00, NULL, 0.00, '2020-04-05 13:23:48', 19, 2, NULL, 1, NULL, 0, NULL, NULL, '0000-00-00 00:00:00', 0),
	(511, 509, '2020-04-05 14:45:10', '2020-04-05 15:11:27', 41, NULL, 1, 28, 19, 19, 21, 1, 0.00, 4000.00, 0.00, 20.00, 0.00, 20000, 0.00, NULL, 0.00, 0.00, 0.00, 0.00, NULL, 0.00, '2020-04-05 14:45:10', 19, 2, NULL, 2, NULL, 0, NULL, NULL, '0000-00-00 00:00:00', 0),
	(512, 508, '2020-04-05 14:49:02', '2020-04-05 14:49:23', 41, NULL, 2, 28, 19, 19, 20, 1, 0.00, 4000.00, 0.00, 0.00, 0.00, 0, 0.00, 10, 0.00, 0.00, 0.00, 0.00, NULL, 0.00, '2020-04-05 14:49:02', 19, 2, NULL, 1, NULL, 0, NULL, NULL, '0000-00-00 00:00:00', 0),
	(513, 511, '2020-04-05 15:31:21', '2020-04-05 16:11:59', 41, NULL, 1, 28, 19, 19, 23, 1, 0.00, 4000.00, 0.00, 20.00, 0.00, 20000, 0.00, NULL, 0.00, 0.00, 0.00, 0.00, NULL, 0.00, '2020-04-05 15:31:21', 19, 2, NULL, 2, NULL, 0, NULL, NULL, '0000-00-00 00:00:00', 0),
	(514, 512, '2020-04-05 16:27:16', '2020-04-05 16:27:35', 41, NULL, 1, 28, 19, 19, 24, 1, 0.00, 4000.00, 0.00, 0.00, 0.00, 0, 0.00, 7, 0.00, 0.00, 0.00, 0.00, NULL, 0.00, '2020-04-05 16:27:16', 19, 2, NULL, 1, NULL, 0, NULL, NULL, '0000-00-00 00:00:00', 0),
	(515, 513, '2020-04-05 16:36:33', '2020-04-05 16:36:47', 41, NULL, 1, 28, 19, 19, 25, 1, 0.00, 4000.00, 0.00, 0.00, 0.00, 0, 0.00, 14, 1.88, 0.00, 0.00, 0.00, NULL, 0.00, '2020-04-05 16:36:33', 19, 2, NULL, 1, NULL, 0, NULL, NULL, '0000-00-00 00:00:00', 0),
	(516, 517, '2020-04-05 16:37:44', '2020-04-05 17:19:04', 41, NULL, 1, 28, 19, 19, 29, 1, 0.00, 4000.00, 0.00, 20.00, 0.00, 0, 6.00, NULL, 0.00, 0.00, 0.00, 0.00, NULL, 0.00, '2020-04-05 16:37:44', 19, 2, NULL, 2, NULL, 0, NULL, NULL, '0000-00-00 00:00:00', 0),
	(517, 515, '2020-04-05 16:46:47', '2020-04-05 16:52:03', 41, NULL, 52, 28, 19, 19, 27, 1, 0.00, 4000.00, 0.00, 0.00, 0.00, 0, 0.00, 6, 0.50, 0.00, 0.00, 0.00, NULL, 0.00, '2020-04-05 16:46:47', 19, 2, NULL, 1, NULL, 0, NULL, NULL, '0000-00-00 00:00:00', 0),
	(518, 516, '2020-04-05 16:57:39', '2020-04-05 16:57:47', 41, NULL, 2, 28, 19, 19, 28, 1, 0.00, 4000.00, 0.00, 0.00, 0.00, 0, 0.00, 11, 0.00, 0.00, 0.00, 0.00, NULL, 0.00, '2020-04-05 16:57:39', 19, 2, NULL, 1, NULL, 0, NULL, NULL, '0000-00-00 00:00:00', 0),
	(519, 518, '2020-04-05 17:41:47', '2020-04-05 18:06:06', 41, NULL, 53, 28, 19, 19, 30, 1, 0.00, 4000.00, 0.00, 0.00, 0.00, 0, 1.90, NULL, 0.00, 0.00, 0.00, 0.00, NULL, 0.00, '2020-04-05 17:41:47', 19, 2, NULL, 1, NULL, 0, NULL, NULL, '0000-00-00 00:00:00', 0),
	(520, 519, '2020-04-05 19:28:04', '2020-04-05 19:28:34', 41, NULL, 52, 28, 19, 19, 31, 1, 0.00, 4000.00, 0.00, 0.00, 0.00, 0, 1.50, NULL, 0.00, 0.00, 0.00, 0.00, NULL, 0.00, '2020-04-05 19:28:04', 19, 2, NULL, 1, NULL, 0, NULL, NULL, '0000-00-00 00:00:00', 0),
	(521, 520, '2020-04-05 19:46:42', '2020-04-05 19:48:15', 41, NULL, 1, 28, 19, 19, 32, 1, 0.00, 4000.00, 0.00, 20.00, 0.00, 0, 1.20, NULL, 0.00, 0.00, 0.00, 0.00, NULL, 0.00, '2020-04-05 19:46:42', 19, 2, NULL, 1, NULL, 0, NULL, NULL, '0000-00-00 00:00:00', 0),
	(522, 532, '2020-04-06 07:14:26', '2020-04-06 17:09:26', 41, NULL, 52, 29, 19, 19, 12, 1, 0.00, 4000.00, 0.00, 0.00, 0.00, 0, 0.00, 6, 9.00, 0.00, 0.00, 0.00, NULL, 0.00, '2020-04-06 07:14:26', 19, 2, NULL, 1, NULL, 0, NULL, NULL, '0000-00-00 00:00:00', 0),
	(523, 521, '2020-04-06 08:51:39', '2020-04-06 09:28:08', 41, NULL, 5, 29, 19, 19, 1, 2, 0.00, 4000.00, 0.00, 20.00, 0.00, 50000, 0.00, NULL, 0.00, 0.00, 0.00, 0.00, NULL, 0.00, '2020-04-06 08:51:39', 19, 2, NULL, 2, NULL, 0, NULL, NULL, '0000-00-00 00:00:00', 0),
	(524, 522, '2020-04-06 09:09:20', '2020-04-06 09:35:19', 41, NULL, 1, 29, 19, 19, 2, 1, 0.00, 4000.00, 0.00, 20.00, 0.00, 0, 5.00, NULL, 0.00, 0.00, 0.00, 0.00, NULL, 0.00, '2020-04-06 09:09:20', 19, 2, NULL, 2, NULL, 0, NULL, NULL, '0000-00-00 00:00:00', 0),
	(525, 523, '2020-04-06 09:46:21', '2020-04-06 10:22:19', 41, NULL, 5, 29, 19, 19, 3, 1, 0.00, 4000.00, 0.00, 20.00, 0.00, 0, 5.00, NULL, 0.00, 0.00, 0.00, 0.00, NULL, 0.00, '2020-04-06 09:46:21', 19, 2, NULL, 1, NULL, 0, NULL, NULL, '0000-00-00 00:00:00', 0),
	(526, 524, '2020-04-06 10:11:47', '2020-04-06 10:56:48', 41, NULL, 1, 29, 19, 19, 4, 1, 0.00, 4000.00, 0.00, 20.00, 0.00, 10000, 0.00, NULL, 0.00, 0.00, 0.00, 0.00, NULL, 0.00, '2020-04-06 10:11:47', 19, 2, NULL, 2, NULL, 0, NULL, NULL, '0000-00-00 00:00:00', 0),
	(527, 525, '2020-04-06 11:02:47', '2020-04-06 11:03:45', 41, NULL, 5, 29, 19, 19, 5, 1, 0.00, 4000.00, 0.00, 20.00, 0.00, 50000, 0.00, NULL, 0.00, 0.00, 0.00, 0.00, NULL, 0.00, '2020-04-06 11:02:47', 19, 2, NULL, 1, NULL, 0, NULL, NULL, '0000-00-00 00:00:00', 0),
	(528, 526, '2020-04-06 11:29:11', '2020-04-06 11:59:56', 41, NULL, 5, 29, 19, 19, 6, 1, 0.00, 4000.00, 0.00, 20.00, 0.00, 20000, 0.00, NULL, 0.00, 0.00, 0.00, 0.00, NULL, 0.00, '2020-04-06 11:29:11', 19, 2, NULL, 2, NULL, 0, NULL, NULL, '0000-00-00 00:00:00', 0),
	(529, 527, '2020-04-06 12:00:58', '2020-04-06 12:01:06', 41, NULL, 54, 29, 19, 19, 7, 1, 0.00, 4000.00, 0.00, 20.00, 0.00, 0, 0.00, 10, 2.24, 0.00, 0.00, 0.00, NULL, 0.00, '2020-04-06 12:00:58', 19, 2, NULL, 1, NULL, 0, NULL, NULL, '0000-00-00 00:00:00', 0),
	(530, 528, '2020-04-06 13:32:31', '2020-04-06 15:03:51', 41, NULL, 5, 29, 19, 19, 8, 2, 0.00, 4000.00, 0.00, 20.00, 0.00, 50000, 0.00, NULL, 0.00, 0.00, 0.00, 0.00, NULL, 0.00, '2020-04-06 13:32:31', 19, 2, NULL, 2, NULL, 0, NULL, NULL, '0000-00-00 00:00:00', 0),
	(531, 529, '2020-04-06 16:02:03', '2020-04-06 16:16:40', 41, NULL, 5, 29, 19, 19, 9, 1, 0.00, 4000.00, 0.00, 20.00, 0.00, 10000, 0.00, NULL, 0.00, 0.00, 0.00, 0.00, NULL, 0.00, '2020-04-06 16:02:03', 19, 2, NULL, 2, NULL, 0, NULL, NULL, '0000-00-00 00:00:00', 0),
	(532, 530, '2020-04-06 16:17:12', '2020-04-06 16:22:27', 41, NULL, 54, 29, 19, 19, 10, 1, 0.00, 4000.00, 0.00, 0.00, 0.00, 0, 0.00, 20, 0.00, 0.00, 0.00, 0.00, NULL, 0.00, '2020-04-06 16:17:12', 19, 2, NULL, 1, NULL, 0, NULL, NULL, '0000-00-00 00:00:00', 0),
	(533, 536, '2020-04-06 16:34:25', '2020-04-06 18:03:45', 41, NULL, 5, 29, 19, 19, 16, 1, 0.00, 4000.00, 0.00, 20.00, 0.00, 20000, 0.00, NULL, 0.00, 0.00, 0.00, 0.00, NULL, 0.00, '2020-04-06 16:34:25', 19, 2, NULL, 3, NULL, 0, NULL, NULL, '0000-00-00 00:00:00', 0),
	(534, 537, '2020-04-06 16:48:15', '2020-04-06 18:14:32', 41, NULL, 48, 29, 19, 19, 17, 1, 0.00, 4000.00, 0.00, 20.00, 0.00, 0, 5.00, NULL, 0.00, 0.00, 0.00, 0.00, NULL, 0.00, '2020-04-06 16:48:15', 19, 2, NULL, 1, NULL, 0, NULL, NULL, '0000-00-00 00:00:00', 0),
	(535, 531, '2020-04-06 16:55:03', '2020-04-06 16:55:13', 41, NULL, 49, 29, 19, 19, 11, 1, 0.00, 4000.00, 0.00, 20.00, 0.00, 20000, 0.00, NULL, 0.00, 0.00, 0.00, 0.00, NULL, 0.00, '2020-04-06 16:55:03', 19, 2, NULL, 1, NULL, 0, NULL, NULL, '0000-00-00 00:00:00', 0),
	(536, 538, '2020-04-06 17:01:04', '2020-04-06 19:31:25', 41, NULL, 1, 29, 19, 19, 18, 1, 0.00, 4000.00, 0.00, 20.00, 0.00, 0, 2.00, NULL, 0.00, 0.00, 0.00, 0.00, NULL, 0.00, '2020-04-06 17:01:04', 19, 2, NULL, 3, NULL, 0, NULL, NULL, '0000-00-00 00:00:00', 0),
	(537, 533, '2020-04-06 17:09:47', '2020-04-06 17:10:03', 41, NULL, 54, 29, 19, 19, 13, 1, 0.00, 4000.00, 0.00, 0.00, 0.00, 0, 0.00, 11, 0.00, 0.00, 0.00, 0.00, NULL, 0.00, '2020-04-06 17:09:47', 19, 2, NULL, 1, NULL, 0, NULL, NULL, '0000-00-00 00:00:00', 0),
	(538, 534, '2020-04-06 17:11:37', '2020-04-06 17:11:50', 41, NULL, 54, 29, 19, 19, 14, 1, 0.00, 4000.00, 0.00, 0.00, 0.00, 0, 0.00, 9, 0.00, 0.00, 0.00, 0.00, NULL, 0.00, '2020-04-06 17:11:37', 19, 2, NULL, 1, NULL, 0, NULL, NULL, '0000-00-00 00:00:00', 0),
	(539, 535, '2020-04-06 17:12:09', '2020-04-06 17:12:30', 41, NULL, 54, 29, 19, 19, 15, 1, 0.00, 4000.00, 0.00, 0.00, 0.00, 0, 0.00, 18, 0.00, 0.00, 0.00, 0.00, NULL, 0.00, '2020-04-06 17:12:09', 19, 2, NULL, 1, NULL, 0, NULL, NULL, '0000-00-00 00:00:00', 0),
	(540, 539, '2020-04-07 07:35:42', '2020-04-07 08:03:35', 41, NULL, 1, 30, 19, 19, 1, 1, 0.00, 4000.00, 0.00, 20.00, 0.00, 50000, 0.00, NULL, 0.00, 0.00, 0.00, 0.00, NULL, 0.00, '2020-04-07 07:35:42', 19, 2, NULL, 2, NULL, 0, NULL, NULL, '0000-00-00 00:00:00', 0),
	(541, 557, '2020-04-07 07:54:08', '2020-04-07 18:31:01', 41, NULL, 52, 30, 19, 19, 19, 1, 0.00, 4000.00, 0.00, 0.00, 0.00, 0, 0.00, 6, 16.60, 0.00, 0.00, 0.00, NULL, 0.00, '2020-04-07 07:54:08', 19, 2, NULL, 1, NULL, 0, NULL, NULL, '0000-00-00 00:00:00', 0),
	(542, 540, '2020-04-07 08:34:05', '2020-04-07 08:34:12', 41, NULL, 1, 30, 19, 19, 2, 1, 0.00, 4000.00, 0.00, 0.00, 0.00, 0, 0.00, 9, 0.00, 0.00, 0.00, 0.00, NULL, 0.00, '2020-04-07 08:34:05', 19, 2, NULL, 1, NULL, 0, NULL, NULL, '0000-00-00 00:00:00', 0),
	(543, 541, '2020-04-07 09:09:27', '2020-04-07 09:09:39', 41, NULL, 1, 30, 19, 19, 3, 1, 0.00, 4000.00, 0.00, 20.00, 0.00, 40000, 0.00, NULL, 0.00, 0.00, 0.00, 0.00, NULL, 0.00, '2020-04-07 09:09:27', 19, 2, NULL, 1, NULL, 0, NULL, NULL, '0000-00-00 00:00:00', 0),
	(544, 542, '2020-04-07 09:37:05', '2020-04-07 09:45:58', 41, NULL, 1, 30, 19, 19, 4, 1, 0.00, 4000.00, 0.00, 20.00, 0.00, 200000, 0.00, NULL, 0.00, 0.00, 0.00, 0.00, NULL, 0.00, '2020-04-07 09:37:05', 19, 2, NULL, 2, NULL, 0, NULL, NULL, '0000-00-00 00:00:00', 0),
	(545, 543, '2020-04-07 10:13:09', '2020-04-07 10:17:47', 41, NULL, 1, 30, 19, 19, 5, 1, 0.00, 4000.00, 0.00, 20.00, 0.00, 40000, 0.00, NULL, 0.00, 0.00, 0.00, 0.00, NULL, 0.00, '2020-04-07 10:13:09', 19, 2, NULL, 1, NULL, 0, NULL, NULL, '0000-00-00 00:00:00', 0),
	(546, 544, '2020-04-07 10:31:25', '2020-04-07 11:03:08', 41, NULL, 1, 30, 19, 19, 6, 1, 0.00, 4000.00, 0.00, 20.00, 0.00, 10000, 0.00, NULL, 0.00, 0.00, 0.00, 0.00, NULL, 0.00, '2020-04-07 10:31:25', 19, 2, NULL, 2, NULL, 0, NULL, NULL, '0000-00-00 00:00:00', 0),
	(547, 545, '2020-04-07 10:34:58', '2020-04-07 11:19:30', 41, NULL, 2, 30, 19, 19, 7, 1, 0.00, 4000.00, 0.00, 20.00, 0.00, 10000, 0.00, NULL, 0.00, 0.00, 0.00, 0.00, NULL, 0.00, '2020-04-07 10:34:58', 19, 2, NULL, 2, NULL, 0, NULL, NULL, '0000-00-00 00:00:00', 0),
	(548, 546, '2020-04-07 11:21:49', '2020-04-07 11:21:58', 41, NULL, 1, 30, 19, 19, 8, 1, 0.00, 4000.00, 0.00, 0.00, 0.00, 0, 0.00, 18, 0.00, 0.00, 0.00, 0.00, NULL, 0.00, '2020-04-07 11:21:49', 19, 2, NULL, 1, NULL, 0, NULL, NULL, '0000-00-00 00:00:00', 0),
	(549, 550, '2020-04-07 11:37:48', '2020-04-07 12:20:54', 41, NULL, 1, 30, 19, 19, 12, 1, 0.00, 4000.00, 0.00, 20.00, 0.00, 20000, 0.00, NULL, 0.00, 0.00, 0.00, 0.00, NULL, 0.00, '2020-04-07 11:37:48', 19, 2, NULL, 2, NULL, 0, NULL, NULL, '0000-00-00 00:00:00', 0),
	(550, 547, '2020-04-07 11:42:22', '2020-04-07 11:42:33', 41, NULL, 2, 30, 19, 19, 9, 1, 0.00, 4000.00, 0.00, 0.00, 0.00, 0, 0.00, 11, 0.00, 0.00, 0.00, 0.00, NULL, 0.00, '2020-04-07 11:42:22', 19, 2, NULL, 1, NULL, 0, NULL, NULL, '0000-00-00 00:00:00', 0),
	(551, 549, '2020-04-07 11:51:55', '2020-04-07 12:12:53', 41, NULL, 2, 30, 19, 19, 11, 1, 0.00, 4000.00, 0.00, 20.00, 0.00, 8000, 0.00, NULL, 0.00, 0.00, 0.00, 0.00, NULL, 0.00, '2020-04-07 11:51:55', 19, 2, NULL, 2, NULL, 0, NULL, NULL, '0000-00-00 00:00:00', 0),
	(552, 548, '2020-04-07 12:08:19', '2020-04-07 12:09:36', 41, NULL, 3, 30, 19, 19, 10, 1, 0.00, 4000.00, 0.00, 20.00, 0.00, 5000, 0.00, NULL, 0.00, 0.00, 0.00, 0.00, NULL, 0.00, '2020-04-07 12:08:19', 19, 2, NULL, 1, NULL, 0, NULL, NULL, '0000-00-00 00:00:00', 0),
	(553, 0, '2020-04-07 12:14:36', NULL, 41, NULL, 6, 30, NULL, 19, 11, 1, 0.00, 4000.00, 0.00, 20.00, 0.00, 0, 0.00, NULL, 0.00, 0.00, 0.00, 0.00, NULL, 0.00, '2020-04-07 12:14:36', 19, 1, NULL, 0, NULL, 0, NULL, NULL, '0000-00-00 00:00:00', 0),
	(554, 556, '2020-04-07 12:31:07', '2020-04-07 18:10:32', 41, NULL, 1, 30, 19, 19, 18, 1, 0.00, 4000.00, 0.00, 20.00, 0.00, 1000, 6.00, NULL, 0.00, 0.00, 0.00, 0.00, NULL, 0.00, '2020-04-07 12:31:07', 19, 2, NULL, 1, NULL, 0, NULL, NULL, '0000-00-00 00:00:00', 0),
	(555, 551, '2020-04-07 12:35:58', '2020-04-07 12:41:35', 41, NULL, 3, 30, 19, 19, 13, 1, 0.00, 4000.00, 0.00, 20.00, 0.00, 8000, 0.00, NULL, 0.00, 0.00, 0.00, 0.00, NULL, 0.00, '2020-04-07 12:35:58', 19, 2, NULL, 1, NULL, 0, NULL, NULL, '0000-00-00 00:00:00', 0),
	(556, 552, '2020-04-07 14:25:30', '2020-04-07 14:26:15', 41, NULL, 5, 30, 19, 19, 14, 1, 0.00, 4000.00, 0.00, 20.00, 0.00, 0, 10.00, NULL, 0.00, 0.00, 0.00, 0.00, NULL, 0.00, '2020-04-07 14:25:30', 19, 2, NULL, 1, NULL, 0, NULL, NULL, '0000-00-00 00:00:00', 0),
	(557, 553, '2020-04-07 15:20:25', '2020-04-07 15:20:33', 41, NULL, 3, 30, 19, 19, 15, 1, 0.00, 4000.00, 0.00, 0.00, 0.00, 0, 0.00, 10, 0.00, 0.00, 0.00, 0.00, NULL, 0.00, '2020-04-07 15:20:25', 19, 2, NULL, 1, NULL, 0, NULL, NULL, '0000-00-00 00:00:00', 0),
	(558, 554, '2020-04-07 15:40:25', '2020-04-07 15:40:39', 41, NULL, 3, 30, 19, 19, 16, 1, 0.00, 4000.00, 0.00, 0.00, 0.00, 0, 0.00, 20, 0.00, 0.00, 0.00, 0.00, NULL, 0.00, '2020-04-07 15:40:25', 19, 2, NULL, 1, NULL, 0, NULL, NULL, '0000-00-00 00:00:00', 0),
	(559, 555, '2020-04-07 16:36:47', '2020-04-07 16:51:37', 41, NULL, 5, 30, 19, 19, 17, 1, 0.00, 4000.00, 0.00, 20.00, 0.00, 10000, 0.00, NULL, 0.00, 0.00, 0.00, 0.00, NULL, 0.00, '2020-04-07 16:36:47', 19, 2, NULL, 2, NULL, 0, NULL, NULL, '0000-00-00 00:00:00', 0),
	(560, 571, '2020-04-08 07:40:34', '2020-04-08 19:13:22', 41, NULL, 52, 31, 19, 19, 14, 1, 0.00, 4000.00, 0.00, 0.00, 0.00, 0, 0.00, 6, 9.12, 0.00, 0.00, 0.00, NULL, 0.00, '2020-04-08 07:40:34', 19, 2, NULL, 1, NULL, 0, NULL, NULL, '0000-00-00 00:00:00', 0),
	(561, 558, '2020-04-08 07:45:52', '2020-04-08 08:16:17', 41, NULL, 1, 31, 19, 19, 1, 1, 0.00, 4000.00, 0.00, 0.00, 0.00, 10000, 0.00, NULL, 0.00, 0.00, 0.00, 0.00, NULL, 0.00, '2020-04-08 07:45:52', 19, 2, NULL, 1, NULL, 0, NULL, NULL, '0000-00-00 00:00:00', 0),
	(562, 559, '2020-04-08 08:37:58', '2020-04-08 08:38:05', 41, NULL, 1, 31, 19, 19, 2, 1, 0.00, 4000.00, 0.00, 0.00, 0.00, 0, 0.00, 10, 0.00, 0.00, 0.00, 0.00, NULL, 0.00, '2020-04-08 08:37:58', 19, 2, NULL, 1, NULL, 0, NULL, NULL, '0000-00-00 00:00:00', 0),
	(563, 560, '2020-04-08 10:56:12', '2020-04-08 11:20:58', 41, NULL, 1, 31, 19, 19, 3, 1, 0.00, 4000.00, 0.00, 20.00, 0.00, 10000, 0.00, NULL, 0.00, 0.00, 0.00, 0.00, NULL, 0.00, '2020-04-08 10:56:12', 19, 2, NULL, 2, NULL, 0, NULL, NULL, '0000-00-00 00:00:00', 0),
	(564, 562, '2020-04-08 11:04:05', '2020-04-08 11:48:09', 41, NULL, 2, 31, 19, 19, 5, 1, 0.00, 4000.00, 0.00, 20.00, 0.00, 10000, 0.00, NULL, 0.00, 0.00, 0.00, 0.00, NULL, 0.00, '2020-04-08 11:04:05', 19, 2, NULL, 2, NULL, 0, NULL, NULL, '0000-00-00 00:00:00', 0),
	(565, 561, '2020-04-08 11:40:44', '2020-04-08 11:45:37', 41, NULL, 1, 31, 19, 19, 4, 1, 0.00, 4000.00, 0.00, 20.00, 0.00, 10000, 0.00, NULL, 0.00, 0.00, 0.00, 0.00, NULL, 0.00, '2020-04-08 11:40:44', 19, 2, NULL, 2, NULL, 0, NULL, NULL, '0000-00-00 00:00:00', 0),
	(566, 563, '2020-04-08 12:23:11', '2020-04-08 13:11:33', 41, NULL, 1, 31, 19, 19, 6, 1, 0.00, 4000.00, 0.00, 20.00, 0.00, 50000, 0.00, NULL, 0.00, 0.00, 0.00, 0.00, NULL, 0.00, '2020-04-08 12:23:11', 19, 2, NULL, 2, NULL, 0, NULL, NULL, '0000-00-00 00:00:00', 0),
	(567, 564, '2020-04-08 13:25:05', '2020-04-08 13:25:17', 41, NULL, 1, 31, 19, 19, 7, 1, 0.00, 4000.00, 0.00, 0.00, 0.00, 0, 0.00, 8, 0.00, 0.00, 0.00, 0.00, NULL, 0.00, '2020-04-08 13:25:05', 19, 2, NULL, 1, NULL, 0, NULL, NULL, '0000-00-00 00:00:00', 0),
	(568, 565, '2020-04-08 14:07:27', '2020-04-08 14:07:55', 41, NULL, 1, 31, 19, 19, 8, 1, 0.00, 4000.00, 0.00, 0.00, 0.00, 0, 0.00, 20, 0.00, 0.00, 0.00, 0.00, NULL, 0.00, '2020-04-08 14:07:27', 19, 2, NULL, 1, NULL, 0, NULL, NULL, '0000-00-00 00:00:00', 0),
	(569, 566, '2020-04-08 14:27:35', '2020-04-08 14:28:05', 41, NULL, 1, 31, 19, 19, 9, 2, 0.00, 4000.00, 0.00, 20.00, 0.00, 20000, 0.00, NULL, 0.00, 0.00, 0.00, 0.00, NULL, 0.00, '2020-04-08 14:27:35', 19, 2, NULL, 1, NULL, 0, NULL, NULL, '0000-00-00 00:00:00', 0),
	(570, 567, '2020-04-08 15:05:17', '2020-04-08 15:05:33', 41, NULL, 1, 31, 19, 19, 10, 1, 0.00, 4000.00, 0.00, 0.00, 0.00, 0, 0.00, 9, 0.00, 0.00, 0.00, 0.00, NULL, 0.00, '2020-04-08 15:05:17', 19, 2, NULL, 1, NULL, 0, NULL, NULL, '0000-00-00 00:00:00', 0),
	(571, 569, '2020-04-08 15:32:19', '2020-04-08 16:21:50', 41, NULL, 5, 31, 19, 19, 12, 1, 0.00, 4000.00, 0.00, 20.00, 0.00, 10000, 0.00, NULL, 0.00, 0.00, 0.00, 0.00, NULL, 0.00, '2020-04-08 15:32:19', 19, 2, NULL, 2, NULL, 0, NULL, NULL, '0000-00-00 00:00:00', 0),
	(572, 568, '2020-04-08 15:42:19', '2020-04-08 15:42:39', 41, NULL, 1, 31, 19, 19, 11, 2, 0.00, 4000.00, 0.00, 20.00, 0.00, 0, 10.00, NULL, 0.00, 0.00, 0.00, 0.00, NULL, 0.00, '2020-04-08 15:42:19', 19, 2, NULL, 1, NULL, 0, NULL, NULL, '0000-00-00 00:00:00', 0),
	(573, 570, '2020-04-08 17:47:11', '2020-04-08 18:06:01', 41, NULL, 1, 31, 19, 19, 13, 1, 0.00, 4000.00, 0.00, 20.00, 0.00, 10000, 0.00, NULL, 0.00, 0.00, 0.00, 0.00, NULL, 0.00, '2020-04-08 17:47:11', 19, 2, NULL, 1, NULL, 0, NULL, NULL, '0000-00-00 00:00:00', 0),
	(574, 586, '2020-04-09 07:38:53', '2020-04-09 19:10:20', 41, NULL, 52, 32, 19, 19, 15, 1, 0.00, 4000.00, 0.00, 0.00, 0.00, 0, 0.00, 6, 11.32, 0.00, 0.00, 0.00, NULL, 0.00, '2020-04-09 07:38:53', 19, 2, NULL, 1, NULL, 0, NULL, NULL, '0000-00-00 00:00:00', 0),
	(575, 572, '2020-04-09 09:19:45', '2020-04-09 09:19:52', 41, NULL, 1, 32, 19, 19, 1, 1, 0.00, 4000.00, 0.00, 0.00, 0.00, 0, 0.00, 10, 0.00, 0.00, 0.00, 0.00, NULL, 0.00, '2020-04-09 09:19:45', 19, 2, NULL, 1, NULL, 0, NULL, NULL, '0000-00-00 00:00:00', 0),
	(576, 573, '2020-04-09 09:20:18', '2020-04-09 09:20:25', 41, NULL, 1, 32, 19, 19, 2, 1, 0.00, 4000.00, 0.00, 0.00, 0.00, 0, 0.00, 9, 0.00, 0.00, 0.00, 0.00, NULL, 0.00, '2020-04-09 09:20:18', 19, 2, NULL, 1, NULL, 0, NULL, NULL, '0000-00-00 00:00:00', 0),
	(577, 574, '2020-04-09 09:22:14', '2020-04-09 09:24:43', 41, NULL, 1, 32, 19, 19, 3, 1, 0.00, 4000.00, 0.00, 0.00, 0.00, 0, 0.00, 10, 0.00, 0.00, 0.00, 0.00, NULL, 0.00, '2020-04-09 09:22:14', 19, 2, NULL, 4, NULL, 0, NULL, NULL, '0000-00-00 00:00:00', 0),
	(578, 575, '2020-04-09 09:46:47', '2020-04-09 10:29:32', 41, NULL, 1, 32, 19, 19, 4, 1, 0.00, 4000.00, 0.00, 20.00, 0.00, 50000, 0.00, NULL, 0.00, 0.00, 0.00, 0.00, NULL, 0.00, '2020-04-09 09:46:47', 19, 2, NULL, 2, NULL, 0, NULL, NULL, '0000-00-00 00:00:00', 0),
	(579, 576, '2020-04-09 12:04:55', '2020-04-09 12:56:34', 41, NULL, 1, 32, 19, 19, 5, 1, 0.00, 4000.00, 0.00, 20.00, 0.00, 80000, 0.00, NULL, 0.00, 0.00, 0.00, 0.00, NULL, 0.00, '2020-04-09 12:04:55', 19, 2, NULL, 2, NULL, 0, NULL, NULL, '0000-00-00 00:00:00', 0),
	(580, 578, '2020-04-09 13:04:42', '2020-04-09 13:56:19', 41, NULL, 1, 32, 19, 19, 7, 1, 0.00, 4000.00, 0.00, 20.00, 0.00, 10000, 0.00, NULL, 0.00, 0.00, 0.00, 0.00, NULL, 0.00, '2020-04-09 13:04:42', 19, 2, NULL, 2, NULL, 0, NULL, NULL, '0000-00-00 00:00:00', 0),
	(581, 580, '2020-04-09 13:14:33', '2020-04-09 14:05:33', 41, NULL, 5, 32, 19, 19, 9, 2, 0.00, 4000.00, 0.00, 20.00, 0.00, 24000, 0.00, NULL, 0.00, 0.00, 0.00, 0.00, NULL, 0.00, '2020-04-09 13:14:33', 19, 2, NULL, 2, NULL, 0, NULL, NULL, '0000-00-00 00:00:00', 0),
	(582, 577, '2020-04-09 13:37:01', '2020-04-09 13:37:13', 41, NULL, 2, 32, 19, 19, 6, 1, 0.00, 4000.00, 0.00, 0.00, 0.00, 0, 0.00, 8, 0.00, 0.00, 0.00, 0.00, NULL, 0.00, '2020-04-09 13:37:01', 19, 2, NULL, 1, NULL, 0, NULL, NULL, '0000-00-00 00:00:00', 0),
	(583, 579, '2020-04-09 14:00:34', '2020-04-09 14:00:52', 41, NULL, 1, 32, 19, 19, 8, 1, 0.00, 4000.00, 0.00, 0.00, 0.00, 0, 0.00, 20, 0.00, 0.00, 0.00, 0.00, NULL, 0.00, '2020-04-09 14:00:34', 19, 2, NULL, 1, NULL, 0, NULL, NULL, '0000-00-00 00:00:00', 0),
	(584, 581, '2020-04-09 14:27:44', '2020-04-09 14:43:34', 41, NULL, 1, 32, 19, 19, 10, 1, 0.00, 4000.00, 0.00, 20.00, 0.00, 10000, 0.00, NULL, 0.00, 0.00, 0.00, 0.00, NULL, 0.00, '2020-04-09 14:27:44', 19, 2, NULL, 2, NULL, 0, NULL, NULL, '0000-00-00 00:00:00', 0),
	(585, 582, '2020-04-09 14:57:16', '2020-04-09 14:57:25', 41, NULL, 1, 32, 19, 19, 11, 1, 0.00, 4000.00, 0.00, 0.00, 0.00, 0, 0.00, 9, 0.00, 0.00, 0.00, 0.00, NULL, 0.00, '2020-04-09 14:57:16', 19, 2, NULL, 1, NULL, 0, NULL, NULL, '0000-00-00 00:00:00', 0),
	(586, 583, '2020-04-09 15:13:43', '2020-04-09 15:46:48', 41, NULL, 1, 32, 19, 19, 12, 1, 0.00, 4000.00, 0.00, 20.00, 0.00, 50000, 0.00, NULL, 0.00, 0.00, 0.00, 0.00, NULL, 0.00, '2020-04-09 15:13:43', 19, 2, NULL, 2, NULL, 0, NULL, NULL, '0000-00-00 00:00:00', 0),
	(587, 584, '2020-04-09 15:56:28', '2020-04-09 15:59:07', 41, NULL, 1, 32, 19, 19, 13, 1, 0.00, 4000.00, 0.00, 20.00, 0.00, 10000, 0.00, NULL, 0.00, 0.00, 0.00, 0.00, NULL, 0.00, '2020-04-09 15:56:28', 19, 2, NULL, 1, NULL, 0, NULL, NULL, '0000-00-00 00:00:00', 0),
	(588, 585, '2020-04-09 16:54:17', '2020-04-09 17:02:18', 41, NULL, 5, 32, 19, 19, 14, 1, 0.00, 4000.00, 0.00, 20.00, 0.00, 0, 1.00, NULL, 0.00, 0.00, 0.00, 0.00, NULL, 0.00, '2020-04-09 16:54:17', 19, 2, NULL, 2, NULL, 0, NULL, NULL, '0000-00-00 00:00:00', 0),
	(589, 587, '2020-04-09 16:57:41', '2020-04-10 07:15:11', 41, NULL, 3, 33, 19, 19, 1, 1, 0.00, 4000.00, 0.00, 0.00, 0.00, 0, 0.00, 15, 0.50, 0.00, 0.00, 0.00, NULL, 0.00, '2020-04-09 16:57:41', 19, 2, NULL, 1, NULL, 0, NULL, NULL, '0000-00-00 00:00:00', 0),
	(590, 606, '2020-04-10 08:07:54', '2020-04-10 19:18:44', 41, NULL, 52, 33, 19, 19, 20, 1, 0.00, 4000.00, 0.00, 0.00, 0.00, 0, 0.00, 6, 11.00, 0.00, 0.00, 0.00, NULL, 0.00, '2020-04-10 08:07:54', 19, 2, NULL, 6, NULL, 0, NULL, NULL, '0000-00-00 00:00:00', 0),
	(591, 588, '2020-04-10 08:18:53', '2020-04-10 08:57:41', 41, NULL, 1, 33, 19, 19, 2, 1, 0.00, 4000.00, 0.00, 0.00, 0.00, 40000, 0.00, NULL, 0.00, 0.00, 0.00, 0.00, NULL, 0.00, '2020-04-10 08:18:53', 19, 2, NULL, 2, NULL, 0, NULL, NULL, '0000-00-00 00:00:00', 0),
	(592, 589, '2020-04-10 08:48:50', '2020-04-10 09:22:16', 41, NULL, 2, 33, 19, 19, 3, 1, 0.00, 4000.00, 0.00, 0.00, 0.00, 9200, 0.00, NULL, 0.00, 0.00, 0.00, 0.00, NULL, 0.00, '2020-04-10 08:48:50', 19, 2, NULL, 2, NULL, 0, NULL, NULL, '0000-00-00 00:00:00', 0),
	(593, 591, '2020-04-10 09:28:19', '2020-04-10 10:15:10', 41, NULL, 1, 33, 19, 19, 5, 1, 0.00, 4000.00, 0.00, 0.00, 0.00, 0, 0.00, 10, 0.00, 0.00, 0.00, 0.00, NULL, 0.00, '2020-04-10 09:28:19', 19, 2, NULL, 1, NULL, 0, NULL, NULL, '0000-00-00 00:00:00', 0),
	(594, 590, '2020-04-10 09:36:44', '2020-04-10 10:13:40', 41, NULL, 2, 33, 19, 19, 4, 1, 0.00, 4000.00, 0.00, 0.00, 0.00, 11200, 0.00, NULL, 0.00, 0.00, 0.00, 0.00, NULL, 0.00, '2020-04-10 09:36:44', 19, 2, NULL, 3, NULL, 0, NULL, NULL, '0000-00-00 00:00:00', 0),
	(595, 592, '2020-04-10 11:26:09', '2020-04-10 12:02:38', 41, NULL, 1, 33, 19, 19, 6, 1, 0.00, 4000.00, 0.00, 0.00, 0.00, 10000, 0.00, NULL, 0.00, 0.00, 0.00, 0.00, NULL, 0.00, '2020-04-10 11:26:09', 19, 2, NULL, 3, NULL, 0, NULL, NULL, '0000-00-00 00:00:00', 0),
	(596, 593, '2020-04-10 12:32:13', '2020-04-10 13:04:59', 41, NULL, 1, 33, 19, 19, 7, 1, 0.00, 4000.00, 0.00, 0.00, 0.00, 10000, 0.00, NULL, 0.00, 0.00, 0.00, 0.00, NULL, 0.00, '2020-04-10 12:32:13', 19, 2, NULL, 2, NULL, 0, NULL, NULL, '0000-00-00 00:00:00', 0),
	(597, 596, '2020-04-10 12:36:27', '2020-04-10 13:27:11', 41, NULL, 2, 33, 19, 19, 10, 1, 0.00, 4000.00, 0.00, 0.00, 0.00, 11900, 0.00, NULL, 0.00, 0.00, 0.00, 0.00, NULL, 0.00, '2020-04-10 12:36:27', 19, 2, NULL, 2, NULL, 0, NULL, NULL, '0000-00-00 00:00:00', 0),
	(598, 595, '2020-04-10 12:42:05', '2020-04-10 13:09:22', 41, NULL, 3, 33, 19, 19, 9, 1, 0.00, 4000.00, 0.00, 0.00, 0.00, 0, 5.00, NULL, 0.00, 0.00, 0.00, 0.00, NULL, 0.00, '2020-04-10 12:42:05', 19, 2, NULL, 2, NULL, 0, NULL, NULL, '0000-00-00 00:00:00', 0),
	(599, 594, '2020-04-10 13:06:42', '2020-04-10 13:07:02', 41, NULL, 53, 33, 19, 19, 8, 1, 0.00, 4000.00, 0.00, 0.00, 0.00, 0, 0.00, 8, 0.00, 0.00, 0.00, 0.00, NULL, 0.00, '2020-04-10 13:06:42', 19, 2, NULL, 1, NULL, 0, NULL, NULL, '0000-00-00 00:00:00', 0),
	(600, 0, '2020-04-10 13:11:18', NULL, 41, NULL, 7, 33, NULL, 19, 9, 1, 0.00, 4000.00, 0.00, 15.00, 0.00, 0, 0.00, NULL, 0.00, 0.00, 0.00, 0.00, NULL, 0.00, '2020-04-10 13:11:18', 19, 1, NULL, 0, NULL, 0, NULL, NULL, '0000-00-00 00:00:00', 0),
	(601, 597, '2020-04-10 13:27:21', '2020-04-10 13:30:06', 41, NULL, 5, 33, 19, 19, 11, 1, 0.00, 4000.00, 0.00, 0.00, 0.00, 1300, 20.00, NULL, 0.00, 0.00, 0.00, 0.00, NULL, 0.00, '2020-04-10 13:27:21', 19, 2, NULL, 1, NULL, 0, NULL, NULL, '0000-00-00 00:00:00', 0),
	(602, 599, '2020-04-10 13:51:49', '2020-04-10 14:46:14', 41, NULL, 1, 33, 19, 19, 13, 1, 0.00, 4000.00, 0.00, 15.00, 0.00, 20000, 0.00, NULL, 0.00, 0.00, 0.00, 0.00, NULL, 0.00, '2020-04-10 13:51:49', 19, 2, NULL, 3, NULL, 0, NULL, NULL, '0000-00-00 00:00:00', 0),
	(603, 598, '2020-04-10 14:08:08', '2020-04-10 14:08:46', 41, NULL, 5, 33, 19, 19, 12, 2, 0.00, 4000.00, 0.00, 15.00, 0.00, 50000, 0.00, NULL, 0.00, 0.00, 0.00, 0.00, NULL, 0.00, '2020-04-10 14:08:08', 19, 2, NULL, 1, NULL, 0, NULL, NULL, '0000-00-00 00:00:00', 0),
	(604, 600, '2020-04-10 14:31:28', '2020-04-10 15:00:45', 41, NULL, 2, 33, 19, 19, 14, 1, 0.00, 4000.00, 0.00, 15.00, 0.00, 50000, 0.00, NULL, 0.00, 0.00, 0.00, 0.00, NULL, 0.00, '2020-04-10 14:31:28', 19, 2, NULL, 2, NULL, 0, NULL, NULL, '0000-00-00 00:00:00', 0),
	(605, 602, '2020-04-10 15:17:57', '2020-04-10 15:59:56', 41, NULL, 1, 33, 19, 19, 16, 1, 0.00, 4000.00, 0.00, 15.00, 0.00, 8000, 0.00, NULL, 0.00, 0.00, 0.00, 0.00, NULL, 0.00, '2020-04-10 15:17:57', 19, 2, NULL, 2, NULL, 0, NULL, NULL, '0000-00-00 00:00:00', 0),
	(606, 601, '2020-04-10 15:26:20', '2020-04-10 15:26:37', 41, NULL, 2, 33, 19, 19, 15, 1, 0.00, 4000.00, 0.00, 15.00, 0.00, 20000, 0.00, NULL, 0.00, 0.00, 0.00, 0.00, NULL, 0.00, '2020-04-10 15:26:20', 19, 2, NULL, 1, NULL, 0, NULL, NULL, '0000-00-00 00:00:00', 0),
	(607, 603, '2020-04-10 15:30:17', '2020-04-10 16:08:43', 41, NULL, 2, 33, 19, 19, 17, 1, 0.00, 4000.00, 0.00, 15.00, 0.00, 10000, 0.00, NULL, 0.00, 0.00, 0.00, 0.00, NULL, 0.00, '2020-04-10 15:30:17', 19, 2, NULL, 2, NULL, 0, NULL, NULL, '0000-00-00 00:00:00', 0),
	(608, 605, '2020-04-10 17:01:52', '2020-04-10 17:30:45', 41, NULL, 5, 33, 19, 19, 19, 2, 0.00, 4000.00, 0.00, 15.00, 0.00, 0, 5.00, NULL, 0.00, 0.00, 0.00, 0.00, NULL, 0.00, '2020-04-10 17:01:52', 19, 2, NULL, 2, NULL, 0, NULL, NULL, '0000-00-00 00:00:00', 0),
	(609, 604, '2020-04-10 17:27:18', '2020-04-10 17:27:58', 41, NULL, 3, 33, 19, 19, 18, 1, 0.00, 4000.00, 0.00, 15.00, 0.00, 2500, 0.00, NULL, 0.00, 0.00, 0.00, 0.00, NULL, 0.00, '2020-04-10 17:27:18', 19, 2, NULL, 2, NULL, 0, NULL, NULL, '0000-00-00 00:00:00', 0),
	(610, 607, '2020-04-11 07:29:12', '2020-04-11 08:05:34', 41, NULL, 1, 34, 19, 19, 1, 1, 0.00, 4000.00, 0.00, 15.00, 0.00, 10000, 0.00, NULL, 0.00, 0.00, 0.00, 0.00, NULL, 0.00, '2020-04-11 07:29:12', 19, 2, NULL, 1, NULL, 0, NULL, NULL, '0000-00-00 00:00:00', 0),
	(611, 622, '2020-04-11 07:29:27', '2020-04-11 16:45:46', 41, NULL, 52, 34, 19, 19, 16, 1, 0.00, 4000.00, 0.00, 0.00, 0.00, 0, 0.00, 6, 10.70, 0.00, 0.00, 0.00, NULL, 0.00, '2020-04-11 07:29:27', 19, 2, NULL, 2, NULL, 0, NULL, NULL, '0000-00-00 00:00:00', 0),
	(612, 608, '2020-04-11 07:47:29', '2020-04-11 08:16:01', 41, NULL, 2, 34, 19, 19, 2, 1, 0.00, 4000.00, 0.00, 15.00, 0.00, 80000, 0.00, NULL, 0.00, 0.00, 0.00, 0.00, NULL, 0.00, '2020-04-11 07:47:29', 19, 2, NULL, 2, NULL, 0, NULL, NULL, '0000-00-00 00:00:00', 0),
	(613, 609, '2020-04-11 09:01:10', '2020-04-11 09:01:20', 41, NULL, 1, 34, 19, 19, 3, 1, 0.00, 4000.00, 0.00, 0.00, 0.00, 0, 0.00, 10, 0.00, 0.00, 0.00, 0.00, NULL, 0.00, '2020-04-11 09:01:10', 19, 2, NULL, 1, NULL, 0, NULL, NULL, '0000-00-00 00:00:00', 0),
	(614, 610, '2020-04-11 09:28:39', '2020-04-11 10:01:49', 41, NULL, 1, 34, 19, 19, 4, 1, 0.00, 4000.00, 0.00, 15.00, 0.00, 50000, 0.00, NULL, 0.00, 0.00, 0.00, 0.00, NULL, 0.00, '2020-04-11 09:28:39', 19, 2, NULL, 2, NULL, 0, NULL, NULL, '0000-00-00 00:00:00', 0),
	(615, 611, '2020-04-11 10:13:58', '2020-04-11 10:46:53', 41, NULL, 1, 34, 19, 19, 5, 1, 0.00, 4000.00, 0.00, 15.00, 0.00, 20000, 0.00, NULL, 0.00, 0.00, 0.00, 0.00, NULL, 0.00, '2020-04-11 10:13:58', 19, 2, NULL, 2, NULL, 0, NULL, NULL, '0000-00-00 00:00:00', 0),
	(616, 612, '2020-04-11 11:16:54', '2020-04-11 11:19:06', 41, NULL, 1, 34, 19, 19, 6, 1, 0.00, 4000.00, 0.00, 15.00, 0.00, 40000, 0.00, NULL, 0.00, 0.00, 0.00, 0.00, NULL, 0.00, '2020-04-11 11:16:54', 19, 2, NULL, 1, NULL, 0, NULL, NULL, '0000-00-00 00:00:00', 0),
	(617, 613, '2020-04-11 11:33:35', '2020-04-11 11:33:45', 41, NULL, 1, 34, 19, 19, 7, 1, 0.00, 4000.00, 0.00, 0.00, 0.00, 0, 0.00, 8, 0.00, 0.00, 0.00, 0.00, NULL, 0.00, '2020-04-11 11:33:35', 19, 2, NULL, 1, NULL, 0, NULL, NULL, '0000-00-00 00:00:00', 0),
	(618, 617, '2020-04-11 12:28:11', '2020-04-11 14:05:19', 41, NULL, 1, 34, 19, 19, 11, 1, 0.00, 4000.00, 0.00, 15.00, 0.00, 20000, 0.00, NULL, 0.00, 0.00, 0.00, 0.00, NULL, 0.00, '2020-04-11 12:28:11', 19, 2, NULL, 2, NULL, 0, NULL, NULL, '0000-00-00 00:00:00', 0),
	(619, 614, '2020-04-11 13:08:55', '2020-04-11 13:09:02', 41, NULL, 2, 34, 19, 19, 8, 1, 0.00, 4000.00, 0.00, 15.00, 0.00, 20000, 0.00, NULL, 0.00, 0.00, 0.00, 0.00, NULL, 0.00, '2020-04-11 13:08:55', 19, 2, NULL, 1, NULL, 0, NULL, NULL, '0000-00-00 00:00:00', 0),
	(620, 615, '2020-04-11 13:14:56', '2020-04-11 13:15:23', 41, NULL, 5, 34, 19, 19, 9, 1, 0.00, 4000.00, 0.00, 15.00, 0.00, 10000, 0.00, NULL, 0.00, 0.00, 0.00, 0.00, NULL, 0.00, '2020-04-11 13:14:56', 19, 2, NULL, 1, NULL, 0, NULL, NULL, '0000-00-00 00:00:00', 0),
	(621, 616, '2020-04-11 13:56:45', '2020-04-11 13:57:07', 41, NULL, 53, 34, 19, 19, 10, 1, 0.00, 4000.00, 0.00, 0.00, 0.00, 0, 0.00, 10, 0.00, 0.00, 0.00, 0.00, NULL, 0.00, '2020-04-11 13:56:45', 19, 2, NULL, 2, NULL, 0, NULL, NULL, '0000-00-00 00:00:00', 0),
	(622, 618, '2020-04-11 14:11:10', '2020-04-11 14:11:31', 41, NULL, 1, 34, 19, 19, 12, 1, 0.00, 4000.00, 0.00, 0.00, 0.00, 0, 0.00, 17, 0.00, 0.00, 0.00, 0.00, NULL, 0.00, '2020-04-11 14:11:10', 19, 2, NULL, 1, NULL, 0, NULL, NULL, '0000-00-00 00:00:00', 0),
	(623, 619, '2020-04-11 14:15:44', '2020-04-11 14:15:55', 41, NULL, 1, 34, 19, 19, 13, 1, 0.00, 4000.00, 0.00, 0.00, 0.00, 0, 0.00, 20, 0.00, 0.00, 0.00, 0.00, NULL, 0.00, '2020-04-11 14:15:44', 19, 2, NULL, 1, NULL, 0, NULL, NULL, '0000-00-00 00:00:00', 0),
	(624, 620, '2020-04-11 15:00:18', '2020-04-11 15:16:38', 41, NULL, 5, 34, 19, 19, 14, 1, 0.00, 4000.00, 0.00, 15.00, 0.00, 0, 5.00, NULL, 0.00, 0.00, 0.00, 0.00, NULL, 0.00, '2020-04-11 15:00:18', 19, 2, NULL, 2, NULL, 0, NULL, NULL, '0000-00-00 00:00:00', 0),
	(625, 621, '2020-04-11 15:50:29', '2020-04-11 16:14:40', 41, NULL, 5, 34, 19, 19, 15, 1, 0.00, 4000.00, 0.00, 15.00, 0.00, 80000, 0.00, NULL, 0.00, 0.00, 0.00, 0.00, NULL, 0.00, '2020-04-11 15:50:29', 19, 2, NULL, 1, NULL, 0, NULL, NULL, '0000-00-00 00:00:00', 0),
	(626, 623, '2020-04-11 16:47:16', '2020-04-11 16:47:31', 41, NULL, 52, 34, 19, 19, 17, 1, 0.00, 4000.00, 0.00, 0.00, 0.00, 0, 0.00, 6, 0.50, 0.00, 0.00, 0.00, NULL, 0.00, '2020-04-11 16:47:16', 19, 2, NULL, 1, NULL, 0, NULL, NULL, '0000-00-00 00:00:00', 0),
	(627, 624, '2020-04-11 17:13:06', '2020-04-11 17:15:14', 41, NULL, 52, 34, 19, 19, 18, 1, 0.00, 4000.00, 0.00, 0.00, 0.00, 0, 0.00, 14, 1.25, 0.00, 0.00, 0.00, NULL, 0.00, '2020-04-11 17:13:06', 19, 2, NULL, 1, NULL, 0, NULL, NULL, '0000-00-00 00:00:00', 0),
	(628, 625, '2020-04-17 07:20:18', '2020-04-17 07:20:34', 41, NULL, 1, 35, 19, 19, 1, 1, 0.00, 4000.00, 0.00, 0.00, 0.00, 0, 0.00, 6, 3.00, 0.00, 0.00, 0.00, NULL, 0.00, '2020-04-17 07:20:18', 19, 2, NULL, 1, NULL, 0, NULL, NULL, '0000-00-00 00:00:00', 0),
	(629, 637, '2020-04-17 07:58:35', '2020-04-17 18:57:05', 41, NULL, 52, 35, 19, 19, 13, 1, 0.00, 4000.00, 0.00, 0.00, 0.00, 0, 0.00, 6, 13.39, 0.00, 0.00, 0.00, NULL, 0.00, '2020-04-17 07:58:35', 19, 2, NULL, 1, NULL, 0, NULL, NULL, '0000-00-00 00:00:00', 0),
	(630, 626, '2020-04-17 09:07:20', '2020-04-17 09:47:17', 41, NULL, 1, 35, 19, 19, 2, 1, 0.00, 4000.00, 0.00, 15.00, 0.00, 10000, 0.00, NULL, 0.00, 0.00, 0.00, 0.00, NULL, 0.00, '2020-04-17 09:07:20', 19, 2, NULL, 2, NULL, 0, NULL, NULL, '0000-00-00 00:00:00', 0),
	(631, 630, '2020-04-17 09:09:51', '2020-04-17 10:43:45', 41, NULL, 2, 35, 19, 19, 6, 1, 0.00, 4000.00, 0.00, 15.00, 0.00, 10200, 0.00, NULL, 0.00, 0.00, 0.00, 0.00, NULL, 0.00, '2020-04-17 09:09:51', 19, 2, NULL, 2, NULL, 0, NULL, NULL, '0000-00-00 00:00:00', 0),
	(632, 631, '2020-04-17 09:53:55', '2020-04-17 10:43:57', 41, NULL, 1, 35, 19, 19, 7, 1, 0.00, 4000.00, 0.00, 15.00, 0.00, 40000, 0.00, NULL, 0.00, 0.00, 0.00, 0.00, NULL, 0.00, '2020-04-17 09:53:55', 19, 2, NULL, 2, NULL, 0, NULL, NULL, '0000-00-00 00:00:00', 0),
	(633, 628, '2020-04-17 10:10:47', '2020-04-17 10:23:39', 41, NULL, 3, 35, 19, 19, 4, 1, 0.00, 4000.00, 0.00, 15.00, 0.00, 50000, 0.00, NULL, 0.00, 0.00, 0.00, 0.00, NULL, 0.00, '2020-04-17 10:10:47', 19, 2, NULL, 2, NULL, 0, NULL, NULL, '0000-00-00 00:00:00', 0),
	(634, 627, '2020-04-17 10:23:17', '2020-04-17 10:23:27', 41, NULL, 4, 35, 19, 19, 3, 1, 0.00, 4000.00, 0.00, 0.00, 0.00, 0, 0.00, 7, 0.00, 0.00, 0.00, 0.00, NULL, 0.00, '2020-04-17 10:23:17', 19, 2, NULL, 1, NULL, 0, NULL, NULL, '0000-00-00 00:00:00', 0),
	(635, 629, '2020-04-17 10:25:34', '2020-04-17 10:25:44', 41, NULL, 3, 35, 19, 19, 5, 1, 0.00, 4000.00, 0.00, 0.00, 0.00, 0, 0.00, 9, 0.00, 0.00, 0.00, 0.00, NULL, 0.00, '2020-04-17 10:25:34', 19, 2, NULL, 1, NULL, 0, NULL, NULL, '0000-00-00 00:00:00', 0),
	(636, 633, '2020-04-17 10:33:54', '2020-04-17 15:12:56', 41, NULL, 3, 35, 19, 19, 9, 1, 0.00, 4000.00, 0.00, 15.00, 0.00, 20500, 0.00, NULL, 0.00, 0.00, 0.00, 0.00, NULL, 0.00, '2020-04-17 10:33:54', 19, 2, NULL, 2, NULL, 0, NULL, NULL, '0000-00-00 00:00:00', 0),
	(637, 632, '2020-04-17 11:04:05', '2020-04-17 11:05:23', 41, NULL, 1, 35, 19, 19, 8, 1, 0.00, 4000.00, 0.00, 15.00, 0.00, 10000, 0.00, NULL, 0.00, 0.00, 0.00, 0.00, NULL, 0.00, '2020-04-17 11:04:05', 19, 2, NULL, 1, NULL, 0, NULL, NULL, '0000-00-00 00:00:00', 0),
	(638, 634, '2020-04-17 15:47:15', '2020-04-17 15:47:44', 41, NULL, 1, 35, 19, 19, 10, 1, 0.00, 4000.00, 0.00, 15.00, 0.00, 0, 20.00, NULL, 0.00, 0.00, 0.00, 0.00, NULL, 0.00, '2020-04-17 15:47:15', 19, 2, NULL, 2, NULL, 0, NULL, NULL, '0000-00-00 00:00:00', 0),
	(639, 635, '2020-04-17 16:50:31', '2020-04-17 16:51:01', 41, NULL, 5, 35, 19, 19, 11, 1, 0.00, 4000.00, 0.00, 15.00, 0.00, 5100, 0.00, NULL, 0.00, 0.00, 0.00, 0.00, NULL, 0.00, '2020-04-17 16:50:31', 19, 2, NULL, 1, NULL, 0, NULL, NULL, '0000-00-00 00:00:00', 0),
	(640, 636, '2020-04-17 17:17:34', '2020-04-17 18:02:16', 41, NULL, 5, 35, 19, 19, 12, 1, 0.00, 4000.00, 0.00, 15.00, 0.00, 0, 5.00, NULL, 0.00, 0.00, 0.00, 0.00, NULL, 0.00, '2020-04-17 17:17:34', 19, 2, NULL, 2, NULL, 0, NULL, NULL, '0000-00-00 00:00:00', 0),
	(641, 638, '2020-04-17 18:57:44', '2020-04-17 18:57:56', 41, NULL, 52, 35, 19, 19, 14, 1, 0.00, 4000.00, 0.00, 0.00, 0.00, 0, 0.00, 10, 0.00, 0.00, 0.00, 0.00, NULL, 0.00, '2020-04-17 18:57:44', 19, 2, NULL, 1, NULL, 0, NULL, NULL, '0000-00-00 00:00:00', 0),
	(642, 651, '2020-04-18 07:46:54', '2020-04-18 19:16:42', 41, NULL, 1, 36, 19, 19, 13, 1, 0.00, 4000.00, 0.00, 0.00, 0.00, 0, 0.00, 6, 11.18, 0.00, 0.00, 0.00, NULL, 0.00, '2020-04-18 07:46:54', 19, 2, NULL, 1, NULL, 0, NULL, NULL, '0000-00-00 00:00:00', 0),
	(643, 639, '2020-04-18 09:02:02', '2020-04-18 09:39:22', 41, NULL, 1, 36, 19, 19, 1, 1, 0.00, 4000.00, 0.00, 15.00, 0.00, 20000, 0.00, NULL, 0.00, 0.00, 0.00, 0.00, NULL, 0.00, '2020-04-18 09:02:02', 19, 2, NULL, 2, NULL, 0, NULL, NULL, '0000-00-00 00:00:00', 0),
	(644, 643, '2020-04-18 09:40:58', '2020-04-18 12:39:28', 41, NULL, 1, 36, 19, 19, 5, 1, 0.00, 4000.00, 0.00, 15.00, 0.00, 10000, 0.00, NULL, 0.00, 0.00, 0.00, 0.00, NULL, 0.00, '2020-04-18 09:40:58', 19, 2, NULL, 2, NULL, 0, NULL, NULL, '0000-00-00 00:00:00', 0),
	(645, 642, '2020-04-18 10:22:19', '2020-04-18 12:39:17', 41, NULL, 2, 36, 19, 19, 4, 1, 0.00, 4000.00, 0.00, 15.00, 0.00, 50000, 0.00, NULL, 0.00, 0.00, 0.00, 0.00, NULL, 0.00, '2020-04-18 10:22:19', 19, 2, NULL, 2, NULL, 0, NULL, NULL, '0000-00-00 00:00:00', 0),
	(646, 640, '2020-04-18 10:36:28', '2020-04-18 11:14:45', 41, NULL, 3, 36, 19, 19, 2, 1, 0.00, 4000.00, 0.00, 15.00, 0.00, 50000, 0.00, NULL, 0.00, 0.00, 0.00, 0.00, NULL, 0.00, '2020-04-18 10:36:28', 19, 2, NULL, 2, NULL, 0, NULL, NULL, '0000-00-00 00:00:00', 0),
	(647, 659, '2020-04-18 10:39:17', '2020-04-19 20:22:28', 41, NULL, 53, 37, 19, 19, 8, 1, 0.00, 4000.00, 0.00, 0.00, 0.00, 0, 8.00, NULL, 0.00, 0.00, 0.00, 0.00, NULL, 0.00, '2020-04-18 10:39:17', 19, 2, NULL, 1, NULL, 0, NULL, NULL, '0000-00-00 00:00:00', 0),
	(648, 641, '2020-04-18 11:11:37', '2020-04-18 11:38:34', 41, NULL, 5, 36, 19, 19, 3, 1, 0.00, 4000.00, 0.00, 15.00, 0.00, 20000, 0.00, NULL, 0.00, 0.00, 0.00, 0.00, NULL, 0.00, '2020-04-18 11:11:37', 19, 2, NULL, 2, NULL, 0, NULL, NULL, '0000-00-00 00:00:00', 0),
	(649, 644, '2020-04-18 13:31:17', '2020-04-18 13:31:33', 41, NULL, 1, 36, 19, 19, 6, 1, 0.00, 4000.00, 0.00, 0.00, 0.00, 0, 0.00, 8, 0.00, 0.00, 0.00, 0.00, NULL, 0.00, '2020-04-18 13:31:17', 19, 2, NULL, 1, NULL, 0, NULL, NULL, '0000-00-00 00:00:00', 0),
	(650, 645, '2020-04-18 14:23:24', '2020-04-18 14:34:01', 41, NULL, 1, 36, 19, 19, 7, 1, 0.00, 4000.00, 0.00, 15.00, 0.00, 10000, 0.00, NULL, 0.00, 0.00, 0.00, 0.00, NULL, 0.00, '2020-04-18 14:23:24', 19, 2, NULL, 2, NULL, 0, NULL, NULL, '0000-00-00 00:00:00', 0),
	(651, 647, '2020-04-18 14:26:17', '2020-04-18 15:20:04', 41, NULL, 2, 36, 19, 19, 9, 1, 0.00, 4000.00, 0.00, 15.00, 0.00, 12000, 0.00, NULL, 0.00, 0.00, 0.00, 0.00, NULL, 0.00, '2020-04-18 14:26:17', 19, 2, NULL, 2, NULL, 0, NULL, NULL, '0000-00-00 00:00:00', 0),
	(652, 646, '2020-04-18 14:30:00', '2020-04-18 14:57:06', 41, NULL, 3, 36, 19, 19, 8, 1, 0.00, 4000.00, 0.00, 15.00, 0.00, 10000, 0.00, NULL, 0.00, 0.00, 0.00, 0.00, NULL, 0.00, '2020-04-18 14:30:00', 19, 2, NULL, 2, NULL, 0, NULL, NULL, '0000-00-00 00:00:00', 0),
	(653, 652, '2020-04-18 15:30:36', '2020-04-19 07:49:23', 41, NULL, 54, 37, 19, 19, 1, 1, 0.00, 4000.00, 0.00, 15.00, 0.00, 5000, 0.00, NULL, 0.00, 0.00, 0.00, 0.00, NULL, 0.00, '2020-04-18 15:30:36', 19, 2, NULL, 3, NULL, 0, NULL, NULL, '0000-00-00 00:00:00', 0),
	(654, 648, '2020-04-18 15:31:38', '2020-04-18 15:31:46', 41, NULL, 2, 36, 19, 19, 10, 1, 0.00, 4000.00, 0.00, 0.00, 0.00, 0, 0.00, 11, 0.00, 0.00, 0.00, 0.00, NULL, 0.00, '2020-04-18 15:31:38', 19, 2, NULL, 1, NULL, 0, NULL, NULL, '0000-00-00 00:00:00', 0),
	(655, 649, '2020-04-18 17:05:12', '2020-04-18 17:06:47', 41, NULL, 5, 36, 19, 19, 11, 1, 0.00, 4000.00, 0.00, 15.00, 0.00, 0, 20.00, NULL, 0.00, 0.00, 0.00, 0.00, NULL, 0.00, '2020-04-18 17:05:12', 19, 2, NULL, 1, NULL, 0, NULL, NULL, '0000-00-00 00:00:00', 0),
	(656, 650, '2020-04-18 17:54:34', '2020-04-18 17:54:59', 41, NULL, 5, 36, 19, 19, 12, 1, 0.00, 4000.00, 0.00, 15.00, 0.00, 5000, 0.00, NULL, 0.00, 0.00, 0.00, 0.00, NULL, 0.00, '2020-04-18 17:54:34', 19, 2, NULL, 1, NULL, 0, NULL, NULL, '0000-00-00 00:00:00', 0),
	(657, 653, '2020-04-19 08:12:28', '2020-04-19 08:12:42', 41, NULL, 1, 37, 19, 19, 2, 1, 0.00, 4000.00, 0.00, 0.00, 0.00, 0, 0.00, 10, 0.00, 0.00, 0.00, 0.00, NULL, 0.00, '2020-04-19 08:12:28', 19, 2, NULL, 1, NULL, 0, NULL, NULL, '0000-00-00 00:00:00', 0),
	(658, 654, '2020-04-19 09:31:42', '2020-04-19 10:04:45', 41, NULL, 1, 37, 19, 19, 3, 1, 0.00, 4000.00, 0.00, 15.00, 0.00, 20000, 0.00, NULL, 0.00, 0.00, 0.00, 0.00, NULL, 0.00, '2020-04-19 09:31:42', 19, 2, NULL, 1, NULL, 0, NULL, NULL, '0000-00-00 00:00:00', 0),
	(659, 655, '2020-04-19 10:52:27', '2020-04-19 11:25:19', 41, NULL, 1, 37, 19, 19, 4, 1, 0.00, 4000.00, 0.00, 15.00, 0.00, 25500, 0.00, NULL, 0.00, 0.00, 0.00, 0.00, NULL, 0.00, '2020-04-19 10:52:27', 19, 2, NULL, 2, NULL, 0, NULL, NULL, '0000-00-00 00:00:00', 0),
	(660, 658, '2020-04-19 12:39:44', '2020-04-19 13:29:05', 41, NULL, 1, 37, 19, 19, 7, 1, 0.00, 4000.00, 0.00, 15.00, 0.00, 20000, 0.00, NULL, 0.00, 0.00, 0.00, 0.00, NULL, 0.00, '2020-04-19 12:39:44', 19, 2, NULL, 2, NULL, 0, NULL, NULL, '0000-00-00 00:00:00', 0),
	(661, 656, '2020-04-19 13:08:37', '2020-04-19 13:08:49', 41, NULL, 2, 37, 19, 19, 5, 1, 0.00, 4000.00, 0.00, 0.00, 0.00, 0, 0.00, 8, 0.00, 0.00, 0.00, 0.00, NULL, 0.00, '2020-04-19 13:08:37', 19, 2, NULL, 1, NULL, 0, NULL, NULL, '0000-00-00 00:00:00', 0),
	(662, 657, '2020-04-19 13:09:36', '2020-04-19 13:10:07', 41, NULL, 2, 37, 19, 19, 6, 1, 0.00, 4000.00, 0.00, 0.00, 0.00, 0, 0.00, 20, 0.00, 0.00, 0.00, 0.00, NULL, 0.00, '2020-04-19 13:09:36', 19, 2, NULL, 1, NULL, 0, NULL, NULL, '0000-00-00 00:00:00', 0),
	(663, 660, '2020-04-19 14:34:58', '2020-04-19 20:34:10', 41, NULL, 1, 37, 19, 19, 9, 1, 0.00, 4000.00, 0.00, 15.00, 0.00, 7800, 0.00, NULL, 0.00, 0.00, 0.00, 0.00, NULL, 0.00, '2020-04-19 14:34:58', 19, 2, NULL, 1, NULL, 0, NULL, NULL, '0000-00-00 00:00:00', 0),
	(664, 661, '2020-04-20 07:29:45', '2020-04-20 07:31:00', 41, NULL, 1, 38, 19, 19, 1, 1, 0.00, 4000.00, 0.00, 0.00, 0.00, 0, 0.00, 6, 0.50, 0.00, 0.00, 0.00, NULL, 0.00, '2020-04-20 07:29:45', 19, 2, NULL, 1, NULL, 0, NULL, NULL, '0000-00-00 00:00:00', 0),
	(665, 664, '2020-04-20 07:54:00', '2020-04-20 08:16:09', 41, NULL, 1, 38, 19, 19, 4, 1, 0.00, 4000.00, 0.00, 0.00, 0.00, 0, 2.00, NULL, 0.00, 0.00, 0.00, 0.00, NULL, 0.00, '2020-04-20 07:54:00', 19, 2, NULL, 1, NULL, 0, NULL, NULL, '0000-00-00 00:00:00', 0),
	(666, 662, '2020-04-20 08:05:00', '2020-04-20 08:05:18', 41, NULL, 2, 38, 19, 19, 2, 1, 0.00, 4000.00, 0.00, 0.00, 0.00, 0, 5.00, NULL, 0.00, 0.00, 0.00, 0.00, NULL, 0.00, '2020-04-20 08:05:00', 19, 2, NULL, 1, NULL, 0, NULL, NULL, '0000-00-00 00:00:00', 0),
	(667, 663, '2020-04-20 08:09:55', '2020-04-20 08:10:21', 41, NULL, 2, 38, 19, 19, 3, 1, 0.00, 4000.00, 0.00, 0.00, 0.00, 0, 0.00, 6, 0.50, 0.00, 0.00, 0.00, NULL, 0.00, '2020-04-20 08:09:55', 19, 2, NULL, 1, NULL, 0, NULL, NULL, '0000-00-00 00:00:00', 0),
	(668, 665, '2020-04-20 08:32:05', '2020-04-20 08:32:22', 41, NULL, 1, 38, 19, 19, 5, 1, 0.00, 4000.00, 0.00, 0.00, 0.00, 0, 10.00, NULL, 0.00, 0.00, 0.00, 0.00, NULL, 0.00, '2020-04-20 08:32:05', 19, 2, NULL, 1, NULL, 0, NULL, NULL, '0000-00-00 00:00:00', 0),
	(669, 666, '2020-04-20 09:12:59', '2020-04-20 09:43:17', 41, NULL, 1, 38, 19, 19, 6, 2, 0.00, 4000.00, 0.00, 0.00, 0.00, 40000, 0.00, NULL, 0.00, 0.00, 0.00, 0.00, NULL, 0.00, '2020-04-20 09:12:59', 19, 2, NULL, 2, NULL, 0, NULL, NULL, '0000-00-00 00:00:00', 0),
	(670, 667, '2020-04-20 09:54:02', '2020-04-20 09:55:15', 41, NULL, 1, 38, 19, 19, 7, 1, 0.00, 4000.00, 0.00, 0.00, 0.00, 0, 0.00, 6, 1.00, 0.00, 0.00, 0.00, NULL, 0.00, '2020-04-20 09:54:02', 19, 2, NULL, 1, NULL, 0, NULL, NULL, '0000-00-00 00:00:00', 0),
	(671, 668, '2020-04-20 09:59:20', '2020-04-20 09:59:31', 41, NULL, 1, 38, 19, 19, 8, 1, 0.00, 4000.00, 0.00, 0.00, 0.00, 0, 0.00, 10, 0.00, 0.00, 0.00, 0.00, NULL, 0.00, '2020-04-20 09:59:20', 19, 2, NULL, 1, NULL, 0, NULL, NULL, '0000-00-00 00:00:00', 0),
	(672, 678, '2020-04-20 10:51:32', '2020-04-20 14:41:32', 41, NULL, 1, 38, 19, 19, 17, 1, 0.00, 4000.00, 0.00, 0.00, 0.00, 20000, 0.00, NULL, 0.00, 0.00, 0.00, 0.00, NULL, 0.00, '2020-04-20 10:51:32', 19, 2, NULL, 2, NULL, 0, NULL, NULL, '0000-00-00 00:00:00', 0),
	(673, 669, '2020-04-20 11:54:46', '2020-04-20 11:55:07', 41, NULL, 2, 38, 19, 19, 9, 1, 0.00, 4000.00, 0.00, 0.00, 0.00, 0, 0.00, 6, 1.00, 0.00, 0.00, 0.00, NULL, 0.00, '2020-04-20 11:54:46', 19, 2, NULL, 1, NULL, 0, NULL, NULL, '0000-00-00 00:00:00', 0),
	(674, 672, '2020-04-20 12:26:30', '2020-04-20 13:41:20', 41, NULL, 3, 38, NULL, 19, 9, 1, 0.00, 4000.00, 0.00, 0.00, 0.00, 0, 0.00, NULL, 0.00, 0.00, 0.00, 0.00, NULL, 0.00, '2020-04-20 12:26:30', 19, -1, NULL, 0, NULL, 0, NULL, NULL, '0000-00-00 00:00:00', 0),
	(675, 670, '2020-04-20 12:55:04', '2020-04-20 13:26:01', 41, NULL, 5, 38, 19, 19, 10, 1, 0.00, 4000.00, 0.00, 0.00, 0.00, 20000, 0.00, NULL, 0.00, 0.00, 0.00, 0.00, NULL, 0.00, '2020-04-20 12:55:04', 19, 2, NULL, 2, NULL, 0, NULL, NULL, '0000-00-00 00:00:00', 0),
	(676, 683, '2020-04-20 13:07:24', '2020-04-20 19:05:58', 41, NULL, 2, 38, 19, 19, 22, 1, 0.00, 4000.00, 0.00, 0.00, 0.00, 0, 10.00, NULL, 0.00, 0.00, 0.00, 0.00, NULL, 0.00, '2020-04-20 13:07:24', 19, 2, NULL, 5, NULL, 0, NULL, NULL, '0000-00-00 00:00:00', 0),
	(677, 671, '2020-04-20 13:31:29', '2020-04-20 13:31:41', 41, NULL, 4, 38, 19, 19, 11, 1, 0.00, 4000.00, 0.00, 0.00, 0.00, 0, 0.00, 12, 0.00, 0.00, 0.00, 0.00, NULL, 0.00, '2020-04-20 13:31:29', 19, 2, NULL, 1, NULL, 0, NULL, NULL, '0000-00-00 00:00:00', 0),
	(678, 673, '2020-04-20 13:50:06', '2020-04-20 13:50:20', 41, NULL, 3, 38, 19, 19, 12, 1, 0.00, 4000.00, 0.00, 0.00, 0.00, 0, 0.00, 6, 1.00, 0.00, 0.00, 0.00, NULL, 0.00, '2020-04-20 13:50:06', 19, 2, NULL, 1, NULL, 0, NULL, NULL, '0000-00-00 00:00:00', 0),
	(679, 674, '2020-04-20 14:01:46', '2020-04-20 14:02:02', 41, NULL, 5, 38, 19, 19, 13, 1, 0.00, 4000.00, 0.00, 0.00, 0.00, 0, 0.00, 8, 0.00, 0.00, 0.00, 0.00, NULL, 0.00, '2020-04-20 14:01:46', 19, 2, NULL, 1, NULL, 0, NULL, NULL, '0000-00-00 00:00:00', 0),
	(680, 675, '2020-04-20 14:02:13', '2020-04-20 14:02:39', 41, NULL, 3, 38, 19, 19, 14, 1, 0.00, 4000.00, 0.00, 0.00, 0.00, 0, 0.00, 20, 0.00, 0.00, 0.00, 0.00, NULL, 0.00, '2020-04-20 14:02:13', 19, 2, NULL, 1, NULL, 0, NULL, NULL, '0000-00-00 00:00:00', 0),
	(681, 676, '2020-04-20 14:03:36', '2020-04-20 14:03:55', 41, NULL, 5, 38, 19, 19, 15, 1, 0.00, 4000.00, 0.00, 0.00, 0.00, 0, 0.00, 6, 1.00, 0.00, 0.00, 0.00, NULL, 0.00, '2020-04-20 14:03:36', 19, 2, NULL, 1, NULL, 0, NULL, NULL, '0000-00-00 00:00:00', 0),
	(682, 677, '2020-04-20 14:11:02', '2020-04-20 14:34:03', 41, NULL, 5, 38, 19, 19, 16, 1, 0.00, 4000.00, 0.00, 0.00, 0.00, 10500, 0.00, NULL, 0.00, 0.00, 0.00, 0.00, NULL, 0.00, '2020-04-20 14:11:02', 19, 2, NULL, 2, NULL, 0, NULL, NULL, '0000-00-00 00:00:00', 0),
	(683, 679, '2020-04-20 15:12:34', '2020-04-20 15:12:55', 41, NULL, 5, 38, 19, 19, 18, 2, 0.00, 4000.00, 0.00, 0.00, 0.00, 50000, 0.00, NULL, 0.00, 0.00, 0.00, 0.00, NULL, 0.00, '2020-04-20 15:12:34', 19, 2, NULL, 1, NULL, 0, NULL, NULL, '0000-00-00 00:00:00', 0),
	(684, 680, '2020-04-20 15:29:27', '2020-04-20 15:31:34', 41, NULL, 3, 38, 19, 19, 19, 1, 0.00, 4000.00, 0.00, 0.00, 0.00, 22200, 0.00, NULL, 0.00, 0.00, 0.00, 0.00, NULL, 0.00, '2020-04-20 15:29:27', 19, 2, NULL, 2, NULL, 0, NULL, NULL, '0000-00-00 00:00:00', 0),
	(685, 681, '2020-04-20 15:32:36', '2020-04-20 16:34:16', 41, NULL, 5, 38, 19, 19, 20, 1, 0.00, 4000.00, 0.00, 15.00, 0.00, 10000, 0.00, NULL, 0.00, 0.00, 0.00, 0.00, NULL, 0.00, '2020-04-20 15:32:36', 19, 2, NULL, 3, NULL, 0, NULL, NULL, '0000-00-00 00:00:00', 0),
	(686, 684, '2020-04-20 15:54:52', '2020-04-20 19:09:49', 41, NULL, 52, 38, 19, 19, 23, 1, 0.00, 4000.00, 0.00, 0.00, 0.00, 0, 1.50, NULL, 0.00, 0.00, 0.00, 0.00, NULL, 0.00, '2020-04-20 15:54:52', 19, 2, NULL, 1, NULL, 0, NULL, NULL, '0000-00-00 00:00:00', 0),
	(687, 682, '2020-04-20 16:40:46', '2020-04-20 17:05:09', 41, NULL, 5, 38, 19, 19, 21, 1, 0.00, 4000.00, 0.00, 0.00, 0.00, 0, 3.00, NULL, 0.00, 0.00, 0.00, 0.00, NULL, 0.00, '2020-04-20 16:40:46', 19, 2, NULL, 2, NULL, 0, NULL, NULL, '0000-00-00 00:00:00', 0),
	(688, 685, '2020-04-21 07:38:05', '2020-04-21 07:38:15', 41, NULL, 1, 39, 19, 19, 1, 1, 0.00, 4000.00, 0.00, 15.00, 0.00, 50000, 0.00, NULL, 0.00, 0.00, 0.00, 0.00, NULL, 0.00, '2020-04-21 07:38:05', 19, 2, NULL, 1, NULL, 0, NULL, NULL, '0000-00-00 00:00:00', 0),
	(689, 686, '2020-04-21 08:04:47', '2020-04-21 08:16:25', 41, NULL, 2, 39, 19, 19, 2, 1, 0.00, 4000.00, 0.00, 15.00, 0.00, 20000, 0.00, NULL, 0.00, 0.00, 0.00, 0.00, NULL, 0.00, '2020-04-21 08:04:47', 19, 2, NULL, 1, NULL, 0, NULL, NULL, '0000-00-00 00:00:00', 0),
	(690, 687, '2020-04-21 08:30:28', '2020-04-21 08:58:41', 41, NULL, 1, 39, 19, 19, 3, 1, 0.00, 4000.00, 0.00, 15.00, 0.00, 20000, 0.00, NULL, 0.00, 0.00, 0.00, 0.00, NULL, 0.00, '2020-04-21 08:30:28', 19, 2, NULL, 2, NULL, 0, NULL, NULL, '0000-00-00 00:00:00', 0),
	(691, 704, '2020-04-21 09:02:18', '2020-04-21 18:50:57', 41, NULL, 52, 39, 19, 19, 20, 1, 0.00, 4000.00, 0.00, 0.00, 0.00, 0, 0.00, 6, 10.25, 0.00, 0.00, 0.00, NULL, 0.00, '2020-04-21 09:02:18', 19, 2, NULL, 1, NULL, 0, NULL, NULL, '0000-00-00 00:00:00', 0),
	(692, 688, '2020-04-21 09:23:38', '2020-04-21 09:46:15', 41, NULL, 1, 39, 19, 19, 4, 1, 0.00, 4000.00, 0.00, 15.00, 0.00, 20000, 0.00, NULL, 0.00, 0.00, 0.00, 0.00, NULL, 0.00, '2020-04-21 09:23:38', 19, 2, NULL, 2, NULL, 0, NULL, NULL, '0000-00-00 00:00:00', 0),
	(693, 689, '2020-04-21 09:51:20', '2020-04-21 09:51:31', 41, NULL, 1, 39, 19, 19, 5, 1, 0.00, 4000.00, 0.00, 0.00, 0.00, 0, 0.00, 10, 0.00, 0.00, 0.00, 0.00, NULL, 0.00, '2020-04-21 09:51:20', 19, 2, NULL, 1, NULL, 0, NULL, NULL, '0000-00-00 00:00:00', 0),
	(694, 690, '2020-04-21 10:27:16', '2020-04-21 11:04:42', 41, NULL, 1, 39, 19, 19, 6, 1, 0.00, 4000.00, 0.00, 15.00, 0.00, 0, 10.00, NULL, 0.00, 0.00, 0.00, 0.00, NULL, 0.00, '2020-04-21 10:27:16', 19, 2, NULL, 2, NULL, 0, NULL, NULL, '0000-00-00 00:00:00', 0),
	(695, 691, '2020-04-21 10:51:26', '2020-04-21 11:29:00', 41, NULL, 5, 39, 19, 19, 7, 1, 0.00, 4000.00, 0.00, 15.00, 0.00, 6100, 0.00, NULL, 0.00, 0.00, 0.00, 0.00, NULL, 0.00, '2020-04-21 10:51:26', 19, 2, NULL, 2, NULL, 0, NULL, NULL, '0000-00-00 00:00:00', 0),
	(696, 692, '2020-04-21 12:17:51', '2020-04-21 12:18:18', 41, NULL, 2, 39, 19, 19, 8, 1, 0.00, 4000.00, 0.00, 0.00, 0.00, 0, 0.00, 19, 0.00, 0.00, 0.00, 0.00, NULL, 0.00, '2020-04-21 12:17:51', 19, 2, NULL, 1, NULL, 0, NULL, NULL, '0000-00-00 00:00:00', 0),
	(697, 693, '2020-04-21 12:26:59', '2020-04-21 12:29:15', 41, NULL, 1, 39, 19, 19, 9, 1, 0.00, 4000.00, 0.00, 0.00, 0.00, 0, 0.00, 10, 0.90, 0.00, 0.00, 0.00, NULL, 0.00, '2020-04-21 12:26:59', 19, 2, NULL, 1, NULL, 0, NULL, NULL, '0000-00-00 00:00:00', 0),
	(698, 695, '2020-04-21 12:31:33', '2020-04-21 13:19:18', 41, NULL, 1, 39, 19, 19, 11, 1, 0.00, 4000.00, 0.00, 0.00, 0.00, 40000, 0.00, NULL, 0.00, 0.00, 0.00, 0.00, NULL, 0.00, '2020-04-21 12:31:33', 19, 2, NULL, 2, NULL, 0, NULL, NULL, '0000-00-00 00:00:00', 0),
	(699, 694, '2020-04-21 12:36:37', '2020-04-21 12:37:20', 41, NULL, 2, 39, 19, 19, 10, 1, 0.00, 4000.00, 0.00, 15.00, 0.00, 10200, 0.00, NULL, 0.00, 0.00, 0.00, 0.00, NULL, 0.00, '2020-04-21 12:36:37', 19, 2, NULL, 1, NULL, 0, NULL, NULL, '0000-00-00 00:00:00', 0),
	(700, 696, '2020-04-21 13:03:17', '2020-04-21 13:43:41', 41, NULL, 2, 39, 19, 19, 12, 2, 0.00, 4000.00, 0.00, 0.00, 0.00, 0, 0.00, 7, 0.00, 0.00, 0.00, 0.00, NULL, 0.00, '2020-04-21 13:03:17', 19, 2, NULL, 1, NULL, 0, NULL, NULL, '0000-00-00 00:00:00', 0),
	(701, 697, '2020-04-21 13:06:31', '2020-04-21 13:57:25', 41, NULL, 3, 39, 19, 19, 13, 1, 0.00, 4000.00, 0.00, 15.00, 0.00, 39100, 0.00, NULL, 0.00, 0.00, 0.00, 0.00, NULL, 0.00, '2020-04-21 13:06:31', 19, 2, NULL, 2, NULL, 0, NULL, NULL, '0000-00-00 00:00:00', 0),
	(702, 699, '2020-04-21 13:15:08', '2020-04-21 14:17:43', 41, NULL, 5, 39, 19, 19, 15, 1, 0.00, 4000.00, 0.00, 15.00, 0.00, 10000, 0.00, NULL, 0.00, 0.00, 0.00, 0.00, NULL, 0.00, '2020-04-21 13:15:08', 19, 2, NULL, 1, NULL, 0, NULL, NULL, '0000-00-00 00:00:00', 0),
	(703, 698, '2020-04-21 13:17:07', '2020-04-21 14:00:59', 41, NULL, 4, 39, 19, 19, 14, 1, 0.00, 4000.00, 0.00, 15.00, 0.00, 10000, 0.00, NULL, 0.00, 0.00, 0.00, 0.00, NULL, 0.00, '2020-04-21 13:17:07', 19, 2, NULL, 3, NULL, 0, NULL, NULL, '0000-00-00 00:00:00', 0),
	(704, 700, '2020-04-21 15:36:44', '2020-04-21 15:37:56', 41, NULL, 1, 39, 19, 19, 16, 1, 0.00, 4000.00, 0.00, 15.00, 0.00, 30000, 0.00, NULL, 0.00, 0.00, 0.00, 0.00, NULL, 0.00, '2020-04-21 15:36:44', 19, 2, NULL, 1, NULL, 0, NULL, NULL, '0000-00-00 00:00:00', 0),
	(705, 701, '2020-04-21 16:02:46', '2020-04-21 16:05:11', 41, NULL, 1, 39, 19, 19, 17, 1, 0.00, 4000.00, 0.00, 15.00, 0.00, 10000, 0.00, NULL, 0.00, 0.00, 0.00, 0.00, NULL, 0.00, '2020-04-21 16:02:46', 19, 2, NULL, 1, NULL, 0, NULL, NULL, '0000-00-00 00:00:00', 0),
	(706, 702, '2020-04-21 16:20:37', '2020-04-21 17:03:25', 41, NULL, 5, 39, 19, 19, 18, 1, 0.00, 4000.00, 0.00, 15.00, 0.00, 0, 2.55, NULL, 0.00, 0.00, 0.00, 0.00, NULL, 0.00, '2020-04-21 16:20:37', 19, 2, NULL, 2, NULL, 0, NULL, NULL, '0000-00-00 00:00:00', 0),
	(707, 703, '2020-04-21 17:57:20', '2020-04-21 17:58:02', 41, NULL, 1, 39, 19, 19, 19, 1, 0.00, 4000.00, 0.00, 15.00, 0.00, 0, 5.00, NULL, 0.00, 0.00, 0.00, 0.00, NULL, 0.00, '2020-04-21 17:57:20', 19, 2, NULL, 1, NULL, 0, NULL, NULL, '0000-00-00 00:00:00', 0),
	(708, 705, '2020-04-21 18:14:37', '2020-04-22 07:11:12', 41, NULL, 1, 39, NULL, 19, 19, 1, 0.00, 4000.00, 0.00, 15.00, 0.00, 0, 0.00, NULL, 0.00, 0.00, 0.00, 0.00, NULL, 0.00, '2020-04-21 18:14:37', 19, -1, NULL, 0, NULL, 0, NULL, NULL, '0000-00-00 00:00:00', 0),
	(709, 0, '2020-04-22 07:37:14', NULL, 41, NULL, 52, 40, NULL, 19, 19, 1, 0.00, 4000.00, 0.00, 0.00, 0.00, 0, 0.00, NULL, 0.00, 0.00, 0.00, 0.00, NULL, 0.00, '2020-04-22 07:37:14', 19, 1, NULL, 0, NULL, 0, NULL, NULL, '0000-00-00 00:00:00', 0),
	(710, 706, '2020-04-22 08:04:02', '2020-04-22 08:04:15', 41, NULL, 1, 40, 19, 19, 20, 1, 0.00, 4000.00, 0.00, 0.00, 0.00, 0, 0.00, 10, 0.00, 0.00, 0.00, 0.00, NULL, 0.00, '2020-04-22 08:04:02', 19, 2, NULL, 1, NULL, 0, NULL, NULL, '0000-00-00 00:00:00', 0),
	(711, 715, '2020-04-22 10:02:19', '2020-04-22 14:15:10', 41, NULL, 1, 40, 19, 19, 29, 1, 0.00, 4000.00, 0.00, 15.00, 0.00, 40000, 0.00, NULL, 0.00, 0.00, 0.00, 0.00, NULL, 0.00, '2020-04-22 10:02:19', 19, 2, NULL, 3, NULL, 0, NULL, NULL, '0000-00-00 00:00:00', 0),
	(712, 717, '2020-04-22 10:32:44', '2020-04-22 14:21:22', 41, NULL, 2, 40, 19, 19, 31, 1, 0.00, 4000.00, 0.00, 0.00, 0.00, 0, 0.00, 5, 0.00, 0.00, 0.00, 0.00, NULL, 0.00, '2020-04-22 10:32:44', 19, 2, NULL, 4, NULL, 0, NULL, NULL, '0000-00-00 00:00:00', 0),
	(713, 707, '2020-04-22 10:36:33', '2020-04-22 10:36:52', 41, NULL, 55, 40, 19, 19, 21, 1, 0.00, 4000.00, 0.00, 0.00, 0.00, 0, 0.00, 12, 0.00, 0.00, 0.00, 0.00, NULL, 0.00, '2020-04-22 10:36:33', 19, 2, NULL, 1, NULL, 0, NULL, NULL, '0000-00-00 00:00:00', 0),
	(714, 0, '2020-04-22 11:01:14', NULL, 41, NULL, 5, 40, NULL, 19, 21, 1, 0.00, 4000.00, 0.00, 0.00, 0.00, 0, 0.00, NULL, 0.00, 0.00, 0.00, 0.00, NULL, 0.00, '2020-04-22 11:01:14', 19, 1, NULL, 0, NULL, 0, NULL, NULL, '0000-00-00 00:00:00', 0),
	(715, 708, '2020-04-22 11:05:21', '2020-04-22 11:30:52', 41, NULL, 3, 40, 19, 19, 22, 1, 0.00, 4000.00, 0.00, 15.00, 0.00, 5000, 0.00, NULL, 0.00, 0.00, 0.00, 0.00, NULL, 0.00, '2020-04-22 11:05:21', 19, 2, NULL, 2, NULL, 0, NULL, NULL, '0000-00-00 00:00:00', 0),
	(716, 709, '2020-04-22 11:22:12', '2020-04-22 11:38:14', 41, NULL, 55, 40, 19, 19, 23, 1, 0.00, 4000.00, 0.00, 0.00, 0.00, 10000, 0.00, NULL, 0.00, 0.00, 0.00, 0.00, NULL, 0.00, '2020-04-22 11:22:12', 19, 2, NULL, 2, NULL, 0, NULL, NULL, '0000-00-00 00:00:00', 0),
	(717, 710, '2020-04-22 12:23:30', '2020-04-22 12:23:39', 41, NULL, 3, 40, 19, 19, 24, 1, 0.00, 4000.00, 0.00, 0.00, 0.00, 0, 0.00, 8, 0.00, 0.00, 0.00, 0.00, NULL, 0.00, '2020-04-22 12:23:30', 19, 2, NULL, 1, NULL, 0, NULL, NULL, '0000-00-00 00:00:00', 0),
	(718, 711, '2020-04-22 12:23:48', '2020-04-22 12:23:58', 41, NULL, 3, 40, 19, 19, 25, 1, 0.00, 4000.00, 0.00, 0.00, 0.00, 0, 0.00, 20, 0.00, 0.00, 0.00, 0.00, NULL, 0.00, '2020-04-22 12:23:48', 19, 2, NULL, 1, NULL, 0, NULL, NULL, '0000-00-00 00:00:00', 0),
	(719, 712, '2020-04-22 12:28:02', '2020-04-22 13:06:54', 41, NULL, 3, 40, 19, 19, 26, 1, 0.00, 4000.00, 0.00, 15.00, 0.00, 20000, 0.00, NULL, 0.00, 0.00, 0.00, 0.00, NULL, 0.00, '2020-04-22 12:28:02', 19, 2, NULL, 1, NULL, 0, NULL, NULL, '0000-00-00 00:00:00', 0),
	(720, 714, '2020-04-22 13:02:32', '2020-04-22 13:36:50', 41, NULL, 55, 40, 19, 19, 28, 1, 0.00, 4000.00, 0.00, 15.00, 0.00, 10000, 0.00, NULL, 0.00, 0.00, 0.00, 0.00, NULL, 0.00, '2020-04-22 13:02:32', 19, 2, NULL, 2, NULL, 0, NULL, NULL, '0000-00-00 00:00:00', 0),
	(721, 713, '2020-04-22 13:36:04', '2020-04-22 13:36:22', 41, NULL, 3, 40, 19, 19, 27, 1, 0.00, 4000.00, 0.00, 15.00, 0.00, 10000, 0.00, NULL, 0.00, 0.00, 0.00, 0.00, NULL, 0.00, '2020-04-22 13:36:04', 19, 2, NULL, 1, NULL, 0, NULL, NULL, '0000-00-00 00:00:00', 0),
	(722, 716, '2020-04-22 13:45:25', '2020-04-22 14:18:21', 41, NULL, 3, 40, 19, 19, 30, 1, 0.00, 4000.00, 0.00, 15.00, 0.00, 5000, 0.00, NULL, 0.00, 0.00, 0.00, 0.00, NULL, 0.00, '2020-04-22 13:45:25', 19, 2, NULL, 2, NULL, 0, NULL, NULL, '0000-00-00 00:00:00', 0);
/*!40000 ALTER TABLE `sale_master` ENABLE KEYS */;


-- Dumping structure for table rms_web_basic.sale_note
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
) ENGINE=InnoDB AUTO_INCREMENT=35 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- Dumping data for table rms_web_basic.sale_note: ~34 rows (approximately)
DELETE FROM `sale_note`;
/*!40000 ALTER TABLE `sale_note` DISABLE KEYS */;
INSERT INTO `sale_note` (`sale_note_id`, `sale_note_detail_id`, `sale_note_item_note_id`, `sale_note_qty`, `sale_note_unit_price`, `sale_note_status`, `sale_note_desc`) VALUES
	(1, 33, 27, 1, 0.00, 1, '1'),
	(2, 41, 7, 1, 0.00, 0, '1'),
	(3, 230, 9, 1, 0.00, 1, '1'),
	(4, 299, 29, 2, 0.00, 1, '1'),
	(5, 302, 30, 1, 0.00, 1, '1'),
	(6, 301, 31, 1, 0.00, 1, '1'),
	(7, 302, 32, 1, 0.00, 1, '1'),
	(8, 301, 32, 1, 0.00, 1, '1'),
	(9, 438, 32, 1, 0.00, 1, '1'),
	(10, 437, 30, 1, 0.00, 1, '1'),
	(11, 437, 32, 1, 0.00, 1, '1'),
	(12, 437, 31, 1, 0.00, 1, '1'),
	(13, 498, 7, 1, 0.00, 0, '1'),
	(14, 507, 9, 1, 0.00, 1, '1'),
	(15, 514, 9, 1, 0.00, 1, '1'),
	(16, 517, 9, 1, 0.00, 0, '1'),
	(17, 520, 9, 1, 0.00, 1, '1'),
	(18, 721, 33, 1, 0.50, 0, '1'),
	(19, 721, 33, 1, 0.50, 0, '1'),
	(20, 734, 34, 1, 0.00, 0, '1'),
	(21, 734, 34, 1, 0.12, 1, '1'),
	(22, 808, 8, 1, 0.00, 1, '1'),
	(23, 864, 34, 1, 0.12, 1, '1'),
	(24, 933, 9, 1, 0.00, 1, '1'),
	(25, 959, 32, 1, 0.00, 0, '1'),
	(26, 959, 32, 1, 0.50, 1, '1'),
	(27, 976, 34, 2, 0.12, 1, '1'),
	(28, 1025, 32, 1, 0.50, 1, '1'),
	(29, 1024, 32, 1, 0.50, 1, '1'),
	(30, 1109, 32, 1, 0.50, 1, '1'),
	(31, 1110, 29, 1, 0.00, 0, '1'),
	(32, 1110, 32, 1, 0.50, 1, '1'),
	(33, 1127, 34, 1, 0.12, 1, '1'),
	(34, 1138, 32, 1, 0.50, 1, '1');
/*!40000 ALTER TABLE `sale_note` ENABLE KEYS */;


-- Dumping structure for table rms_web_basic.sale_order_return
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

-- Dumping data for table rms_web_basic.sale_order_return: ~0 rows (approximately)
DELETE FROM `sale_order_return`;
/*!40000 ALTER TABLE `sale_order_return` DISABLE KEYS */;
/*!40000 ALTER TABLE `sale_order_return` ENABLE KEYS */;


-- Dumping structure for table rms_web_basic.sale_return
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

-- Dumping data for table rms_web_basic.sale_return: ~0 rows (approximately)
DELETE FROM `sale_return`;
/*!40000 ALTER TABLE `sale_return` DISABLE KEYS */;
/*!40000 ALTER TABLE `sale_return` ENABLE KEYS */;


-- Dumping structure for table rms_web_basic.shift
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
) ENGINE=InnoDB AUTO_INCREMENT=10 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- Dumping data for table rms_web_basic.shift: ~4 rows (approximately)
DELETE FROM `shift`;
/*!40000 ALTER TABLE `shift` DISABLE KEYS */;
INSERT INTO `shift` (`shift_id`, `shift_name`, `shift_from`, `shift_until`, `shift_note`, `shift_created_date`, `shift_created_by`, `shift_modified_date`, `shift_modified_by`, `status`) VALUES
	(5, 'Full Time', '06:00:00', '13:00:00', '', '2019-09-23', 19, NULL, NULL, 1),
	(7, 'Part Time Morning', '05:30:00', '11:00:00', '', '2019-09-23', 19, NULL, NULL, 1),
	(8, 'Full Time Evening', '13:00:00', '22:00:00', '', '2019-09-11', 19, NULL, NULL, 1),
	(9, 'Part Time Evening', '13:00:00', '18:00:00', '', '2019-09-23', 19, NULL, NULL, 1);
/*!40000 ALTER TABLE `shift` ENABLE KEYS */;


-- Dumping structure for table rms_web_basic.slide_image
DROP TABLE IF EXISTS `slide_image`;
CREATE TABLE IF NOT EXISTS `slide_image` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `desc` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `images` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=23 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- Dumping data for table rms_web_basic.slide_image: 1 rows
DELETE FROM `slide_image`;
/*!40000 ALTER TABLE `slide_image` DISABLE KEYS */;
INSERT INTO `slide_image` (`id`, `name`, `desc`, `images`) VALUES
	(22, 'Delivery', '', '158711044620200417_080046photo_2020-04-11_14-41-48.jpg');
/*!40000 ALTER TABLE `slide_image` ENABLE KEYS */;


-- Dumping structure for table rms_web_basic.stock
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
  `note_id` int(11) DEFAULT NULL,
  PRIMARY KEY (`stock_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- Dumping data for table rms_web_basic.stock: ~0 rows (approximately)
DELETE FROM `stock`;
/*!40000 ALTER TABLE `stock` DISABLE KEYS */;
/*!40000 ALTER TABLE `stock` ENABLE KEYS */;


-- Dumping structure for table rms_web_basic.stock_adjust
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
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- Dumping data for table rms_web_basic.stock_adjust: ~0 rows (approximately)
DELETE FROM `stock_adjust`;
/*!40000 ALTER TABLE `stock_adjust` DISABLE KEYS */;
/*!40000 ALTER TABLE `stock_adjust` ENABLE KEYS */;


-- Dumping structure for table rms_web_basic.stock_location
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
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- Dumping data for table rms_web_basic.stock_location: ~1 rows (approximately)
DELETE FROM `stock_location`;
/*!40000 ALTER TABLE `stock_location` DISABLE KEYS */;
INSERT INTO `stock_location` (`stock_location_id`, `stock_location_name`, `stock_location_note`, `stock_location_branch_id`, `stock_location_created_date`, `stock_location_created_by`, `stock_location_modified_date`, `stock_location_modified_by`, `status`) VALUES
	(1, 'Main Stock', 'Main stock for import product.', 41, '2019-12-31', 19, '2020-03-11', 19, 1);
/*!40000 ALTER TABLE `stock_location` ENABLE KEYS */;


-- Dumping structure for table rms_web_basic.stock_transfer
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
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- Dumping data for table rms_web_basic.stock_transfer: ~0 rows (approximately)
DELETE FROM `stock_transfer`;
/*!40000 ALTER TABLE `stock_transfer` DISABLE KEYS */;
/*!40000 ALTER TABLE `stock_transfer` ENABLE KEYS */;


-- Dumping structure for table rms_web_basic.stock_waste
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
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- Dumping data for table rms_web_basic.stock_waste: ~0 rows (approximately)
DELETE FROM `stock_waste`;
/*!40000 ALTER TABLE `stock_waste` DISABLE KEYS */;
/*!40000 ALTER TABLE `stock_waste` ENABLE KEYS */;


-- Dumping structure for table rms_web_basic.supplier
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

-- Dumping data for table rms_web_basic.supplier: ~2 rows (approximately)
DELETE FROM `supplier`;
/*!40000 ALTER TABLE `supplier` DISABLE KEYS */;
INSERT INTO `supplier` (`supplier_id`, `supplier_name`, `supplier_address`, `supplier_phone`, `supplier_note`, `supplier_created_date`, `supplier_created_by`, `supplier_modified_by`, `supplier_modified_date`, `supplier_status`) VALUES
	(1, 'ABC Vendor', 'pp', '15156421', '', '2019-09-11', 19, 19, '0000-00-00', 0),
	(2, 'Saller', 'PP', '01', '100% Cotton', '2019-10-02', 19, 19, '0000-00-00', 0),
	(3, 'Depo', 'PP', '', '', '2020-03-11', 19, NULL, NULL, 1);
/*!40000 ALTER TABLE `supplier` ENABLE KEYS */;


-- Dumping structure for table rms_web_basic.table_template
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

-- Dumping data for table rms_web_basic.table_template: ~0 rows (approximately)
DELETE FROM `table_template`;
/*!40000 ALTER TABLE `table_template` DISABLE KEYS */;
INSERT INTO `table_template` (`table_template_id`, `table_template_width`, `table_template_height`, `table_template_bg_color`, `table_template_fore_color`, `table_template_outline_color`, `table_template_outline_width`, `table_template_busy_color`, `table_template_booking_color`, `table_template_split_color`, `table_template_printed_color`, `table_template_branch_id`, `table_template_created_by`, `table_template_created_date`, `table_template_font_size`) VALUES
	(1, 100, 90, '#0000a0', '#ffffff', '#8080ff', 3, '#ff0000', '#ff8040', '#8000ff', '#408080', 1, 19, '2018-11-06', 24);
/*!40000 ALTER TABLE `table_template` ENABLE KEYS */;


-- Dumping structure for table rms_web_basic.tax
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

-- Dumping data for table rms_web_basic.tax: ~0 rows (approximately)
DELETE FROM `tax`;
/*!40000 ALTER TABLE `tax` DISABLE KEYS */;
INSERT INTO `tax` (`tax_id`, `tax_amount`, `tax_created_date`, `tax_created_by`, `tax_modified_by`, `tax_modified_date`, `tax_des`) VALUES
	(1, 0, '2016-05-23', 1, 19, '2020-02-04', 'Tax for product. ');
/*!40000 ALTER TABLE `tax` ENABLE KEYS */;


-- Dumping structure for table rms_web_basic.transaction
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
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci COMMENT='2=RETURN/1=TOP/0=SPEND';

-- Dumping data for table rms_web_basic.transaction: ~0 rows (approximately)
DELETE FROM `transaction`;
/*!40000 ALTER TABLE `transaction` DISABLE KEYS */;
/*!40000 ALTER TABLE `transaction` ENABLE KEYS */;


-- Dumping structure for table rms_web_basic.transaction_alert
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

-- Dumping data for table rms_web_basic.transaction_alert: ~0 rows (approximately)
DELETE FROM `transaction_alert`;
/*!40000 ALTER TABLE `transaction_alert` DISABLE KEYS */;
/*!40000 ALTER TABLE `transaction_alert` ENABLE KEYS */;


-- Dumping structure for table rms_web_basic.user
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
) ENGINE=InnoDB AUTO_INCREMENT=50 DEFAULT CHARSET=latin1;

-- Dumping data for table rms_web_basic.user: ~2 rows (approximately)
DELETE FROM `user`;
/*!40000 ALTER TABLE `user` DISABLE KEYS */;
INSERT INTO `user` (`user_id`, `employee_id`, `user_name`, `user_password`, `user_note`, `user_created_date`, `user_created_by`, `user_modified_by`, `user_modified_date`, `user_printer_location_id`, `is_supper_user`, `status`) VALUES
	(24, 19, 'admin', 'Roe+FsRQyG3jhq/nGCx+BV8I4KIh0hSeVw6tM2emL+sXKu2/mO9MRPuAYc7KakgcCPy1aBqZRO0FnYCcnYsT8g==', '', '2019-04-27', 19, NULL, NULL, 1, 1, 1),
	(49, 48, 'chomreun', 'Db2MVxmlDgeAHYhqIJoe0rgKYjRo5uv8QHVK293x4Tg1eC+tYn4ZbClAmOjg2zIxatzwfiXPHRey/mm45a5KFA==', '', '2019-10-03', 19, NULL, NULL, 1, 0, 1);
/*!40000 ALTER TABLE `user` ENABLE KEYS */;


-- Dumping structure for table rms_web_basic.user_autologin
DROP TABLE IF EXISTS `user_autologin`;
CREATE TABLE IF NOT EXISTS `user_autologin` (
  `key_id` char(32) COLLATE utf8_bin NOT NULL,
  `user_id` int(11) NOT NULL DEFAULT '0',
  `user_agent` varchar(150) COLLATE utf8_bin NOT NULL,
  `last_ip` varchar(40) COLLATE utf8_bin NOT NULL,
  `last_login` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  PRIMARY KEY (`key_id`,`user_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin;

-- Dumping data for table rms_web_basic.user_autologin: ~0 rows (approximately)
DELETE FROM `user_autologin`;
/*!40000 ALTER TABLE `user_autologin` DISABLE KEYS */;
/*!40000 ALTER TABLE `user_autologin` ENABLE KEYS */;


-- Dumping structure for table rms_web_basic.user_type
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

-- Dumping data for table rms_web_basic.user_type: ~0 rows (approximately)
DELETE FROM `user_type`;
/*!40000 ALTER TABLE `user_type` DISABLE KEYS */;
/*!40000 ALTER TABLE `user_type` ENABLE KEYS */;


-- Dumping structure for view rms_web_basic.permission
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


-- Dumping structure for view rms_web_basic.v_cash_register
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


-- Dumping structure for view rms_web_basic.v_cash_register_active
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


-- Dumping structure for view rms_web_basic.v_category
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


-- Dumping structure for view rms_web_basic.v_company
DROP VIEW IF EXISTS `v_company`;
-- Creating temporary table to overcome VIEW dependency errors
CREATE TABLE `v_company` (
	`company_id` INT(11) NOT NULL,
	`company_name` TEXT NOT NULL COLLATE 'utf8_unicode_ci',
	`company_address` TEXT NOT NULL COLLATE 'utf8_unicode_ci',
	`branch_name` VARCHAR(255) NOT NULL COLLATE 'utf8_unicode_ci',
	`branch_location` VARCHAR(255) NOT NULL COLLATE 'utf8_unicode_ci',
	`branch_phone` VARCHAR(255) NOT NULL COLLATE 'utf8_unicode_ci'
) ENGINE=MyISAM;


-- Dumping structure for view rms_web_basic.v_customer_detail
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


-- Dumping structure for view rms_web_basic.v_employee
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


-- Dumping structure for view rms_web_basic.v_expense
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


-- Dumping structure for view rms_web_basic.v_expense_detail
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


-- Dumping structure for view rms_web_basic.v_expense_type
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


-- Dumping structure for view rms_web_basic.v_floor_table_layout
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


-- Dumping structure for view rms_web_basic.v_happy_hour
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


-- Dumping structure for view rms_web_basic.v_ingredient
DROP VIEW IF EXISTS `v_ingredient`;
-- Creating temporary table to overcome VIEW dependency errors
CREATE TABLE `v_ingredient` (
	`ingredient_id` INT(11) NOT NULL,
	`item_name` MEDIUMTEXT NULL COLLATE 'utf8_bin',
	`item_detail_name` TEXT NULL COLLATE 'utf8_unicode_ci',
	`item_detail_part_number` VARCHAR(5) NULL COLLATE 'utf8_unicode_ci',
	`ingredient_name` TEXT NULL COLLATE 'utf8_unicode_ci',
	`item_detail_retail_price` DECIMAL(10,2) NULL,
	`ingredient_qty` VARCHAR(47) NULL COLLATE 'utf8_general_ci',
	`costing` VARCHAR(62) NULL COLLATE 'utf8_general_ci',
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


-- Dumping structure for view rms_web_basic.v_item_detail
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
	`item_detail_hide_show` TINYINT(4) NULL,
	`item_detail_cut_stock` TINYINT(4) NULL,
	`measure_id` INT(11) NULL,
	`measure_name` VARCHAR(50) NULL COLLATE 'utf8_unicode_ci',
	`measure_note` TEXT NULL COLLATE 'utf8_unicode_ci',
	`measure_qty` INT(11) NULL,
	`color` VARCHAR(255) NULL COLLATE 'utf8_unicode_ci'
) ENGINE=MyISAM;


-- Dumping structure for view rms_web_basic.v_item_type
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


-- Dumping structure for view rms_web_basic.v_measure
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


-- Dumping structure for view rms_web_basic.v_point
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


-- Dumping structure for view rms_web_basic.v_position
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


-- Dumping structure for view rms_web_basic.v_purchase
DROP VIEW IF EXISTS `v_purchase`;
-- Creating temporary table to overcome VIEW dependency errors
CREATE TABLE `v_purchase` (
	`purchase_no` INT(11) NOT NULL,
	`refference_no` VARCHAR(50) NULL COLLATE 'utf8_unicode_ci',
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


-- Dumping structure for view rms_web_basic.v_purchase_detail
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
	`purchase_deposit` DOUBLE(11,2) NULL,
	`status` DOUBLE(23,6) NULL,
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


-- Dumping structure for view rms_web_basic.v_purchase_detail_
DROP VIEW IF EXISTS `v_purchase_detail_`;
-- Creating temporary table to overcome VIEW dependency errors
CREATE TABLE `v_purchase_detail_` (
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


-- Dumping structure for view rms_web_basic.v_purchase_pay
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


-- Dumping structure for view rms_web_basic.v_purchase_return
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


-- Dumping structure for view rms_web_basic.v_sale_detail
DROP VIEW IF EXISTS `v_sale_detail`;
-- Creating temporary table to overcome VIEW dependency errors
CREATE TABLE `v_sale_detail` (
	`sale_master_id` INT(10) UNSIGNED NOT NULL,
	`sale_order_number` INT(11) NULL,
	`sale_detail_id` INT(11) NOT NULL,
	`invoice_no` VARCHAR(6) NULL COLLATE 'utf8_general_ci',
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
	`sale_master_status` TINYINT(1) NULL COMMENT '1="ACTIVE"/2="PAID"/3 = CREDIT/-1="CANCEL"',
	`sale_detail_status` TINYINT(1) NULL,
	`printer_id` INT(11) NULL,
	`printer_name` VARCHAR(255) NULL COLLATE 'utf8_unicode_ci',
	`printer_print_kitchen` VARCHAR(255) NULL COLLATE 'utf8_unicode_ci',
	`printer_print_kitchen_time` INT(11) NULL,
	`layout_name` VARCHAR(255) NULL COLLATE 'utf8_unicode_ci',
	`sale_detail_printed` TINYINT(1) NULL
) ENGINE=MyISAM;


-- Dumping structure for view rms_web_basic.v_sale_detail_note
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


-- Dumping structure for view rms_web_basic.v_sale_order_return
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
	`invoice_no` VARCHAR(6) NULL COLLATE 'utf8_general_ci'
) ENGINE=MyISAM;


-- Dumping structure for view rms_web_basic.v_sale_return
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


-- Dumping structure for view rms_web_basic.v_sale_summary
DROP VIEW IF EXISTS `v_sale_summary`;
-- Creating temporary table to overcome VIEW dependency errors
CREATE TABLE `v_sale_summary` (
	`sale_master_id` INT(10) UNSIGNED NOT NULL,
	`sale_detail_id` INT(11) NOT NULL,
	`invoice_no` VARCHAR(6) NULL COLLATE 'utf8_general_ci',
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
	`sale_master_status` TINYINT(1) NULL COMMENT '1="ACTIVE"/2="PAID"/3 = CREDIT/-1="CANCEL"',
	`ex_rate` DECIMAL(10,2) NULL
) ENGINE=MyISAM;


-- Dumping structure for view rms_web_basic.v_shift
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


-- Dumping structure for view rms_web_basic.v_stock
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


-- Dumping structure for view rms_web_basic.v_stock2
DROP VIEW IF EXISTS `v_stock2`;
-- Creating temporary table to overcome VIEW dependency errors
CREATE TABLE `v_stock2` (
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


-- Dumping structure for view rms_web_basic.v_stock_adjust
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


-- Dumping structure for view rms_web_basic.v_stock_detail
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
	`item_detail_retail_price` VARCHAR(49) NULL COLLATE 'utf8_general_ci',
	`item_detail_whole_price` VARCHAR(49) NULL COLLATE 'utf8_general_ci',
	`stock_qty` INT(11) NOT NULL,
	`purchase_detail_unit_cost` VARCHAR(49) NOT NULL COLLATE 'utf8_general_ci',
	`total` VARCHAR(62) NOT NULL COLLATE 'utf8_general_ci',
	`recorder` VARCHAR(255) NULL COLLATE 'utf8_unicode_ci',
	`employee_id` INT(11) NOT NULL,
	`branch_name` VARCHAR(255) NOT NULL COLLATE 'utf8_unicode_ci',
	`branch_id` INT(11) NOT NULL,
	`stock_location_name` VARCHAR(255) NULL COLLATE 'utf8_unicode_ci',
	`stock_location_id` INT(11) NOT NULL
) ENGINE=MyISAM;


-- Dumping structure for view rms_web_basic.v_stock_in_out
DROP VIEW IF EXISTS `v_stock_in_out`;
-- Creating temporary table to overcome VIEW dependency errors
CREATE TABLE `v_stock_in_out` (
	`stock_item_id` INT(11) NOT NULL,
	`item_detail_part_number` VARCHAR(255) NULL COLLATE 'utf8_unicode_ci',
	`item_detail_name` TEXT NULL COLLATE 'utf8_unicode_ci',
	`item_type_id` INT(11) NULL,
	`item_type_name` VARCHAR(255) NULL COLLATE 'utf8_unicode_ci',
	`stock_location_id` INT(11) NULL,
	`branch_id` INT(11) NOT NULL,
	`branch_name` VARCHAR(255) NULL COLLATE 'utf8_unicode_ci',
	`stock_adjust_created_date` DATE NULL,
	`sold_qty` DECIMAL(32,0) NOT NULL,
	`waste_qty` DECIMAL(32,0) NOT NULL,
	`increase_qty` DECIMAL(32,0) NOT NULL,
	`transfer_qty` DECIMAL(32,0) NOT NULL,
	`stock_in_hand` INT(11) NOT NULL,
	`stock_costing` DECIMAL(10,3) NULL,
	`total_stock_costing` DECIMAL(20,3) NULL,
	`stock_location_name` VARCHAR(255) NULL COLLATE 'utf8_unicode_ci',
	`measure_name` VARCHAR(50) NULL COLLATE 'utf8_unicode_ci'
) ENGINE=MyISAM;


-- Dumping structure for view rms_web_basic.v_stock_location
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


-- Dumping structure for view rms_web_basic.v_stock_summary
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


-- Dumping structure for view rms_web_basic.v_stock_transfered
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


-- Dumping structure for view rms_web_basic.v_stock_waste
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


-- Dumping structure for view rms_web_basic.v_supplier
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


-- Dumping structure for view rms_web_basic.v_user
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


-- Dumping structure for procedure rms_web_basic.p_cash_out
DROP PROCEDURE IF EXISTS `p_cash_out`;
DELIMITER //
CREATE DEFINER=`root`@`localhost` PROCEDURE `p_cash_out`(IN `cash_id` INT



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


-- Dumping structure for procedure rms_web_basic.p_cash_register
DROP PROCEDURE IF EXISTS `p_cash_register`;
DELIMITER //
CREATE DEFINER=`root`@`localhost` PROCEDURE `p_cash_register`(
	IN `shift_id` INT

)
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


-- Dumping structure for procedure rms_web_basic.p_permission
DROP PROCEDURE IF EXISTS `p_permission`;
DELIMITER //
CREATE DEFINER=`root`@`localhost` PROCEDURE `p_permission`(IN `parent_id` INT, IN `position_id` INT
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


-- Dumping structure for procedure rms_web_basic.p_sale_category
DROP PROCEDURE IF EXISTS `p_sale_category`;
DELIMITER //
CREATE DEFINER=`root`@`localhost` PROCEDURE `p_sale_category`(
	IN `ParamArrary` VARCHAR(255)



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


-- Dumping structure for procedure rms_web_basic.p_sale_category_c
DROP PROCEDURE IF EXISTS `p_sale_category_c`;
DELIMITER //
CREATE DEFINER=`root`@`localhost` PROCEDURE `p_sale_category_c`(IN `ParamArrary` VARCHAR(255)



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
WHERE `sm`.sale_master_status in (2) AND `sd`.sale_detail_status in (1) ",ParamArrary," GROUP BY ittype.item_type_id"

);
PREPARE stmt FROM @sql;
EXECUTE stmt;
END//
DELIMITER ;


-- Dumping structure for procedure rms_web_basic.p_sale_category__
DROP PROCEDURE IF EXISTS `p_sale_category__`;
DELIMITER //
CREATE DEFINER=`root`@`localhost` PROCEDURE `p_sale_category__`(
	IN `ParamArrary` VARCHAR(255)



)
BEGIN
	set @sql = concat("SELECT 
		sm.sale_master_id,
		sd.sale_detail_id,
		ittype.item_type_id,
		ittype.item_type_name,
		idt.item_detail_id,
		idt.item_detail_part_number as part_number,
		idt.item_detail_name,
		sum(sd.sale_detail_qty) as qty,
		cast(sum(sd.sale_detail_qty*sd.sale_detail_unit_price+get_sale_note_total(sd.sale_detail_id)) as decimal(10,2)) SubTotal,
		cast(sum((sd.sale_detail_qty*sd.sale_detail_unit_price)-(((sd.sale_detail_qty*sd.sale_detail_unit_price)*(1-sd.sale_detail_dis_percent/100)) - sd.sale_detail_dis_us)+(((sd.sale_detail_qty*sd.sale_detail_unit_price)-((sd.sale_detail_qty*sd.sale_detail_unit_price)-(((sd.sale_detail_qty*sd.sale_detail_unit_price)*(1-sd.sale_detail_dis_percent/100)) - sd.sale_detail_dis_us)))*(sm.sale_master_discount_percent/100))+get_sale_note_total(sd.sale_detail_id)*(sm.sale_master_discount_percent/100) ) as decimal(10,2)) as discount,
		cast(sum(((sd.sale_detail_qty*sd.sale_detail_unit_price)-((sd.sale_detail_qty*sd.sale_detail_unit_price)-(((sd.sale_detail_qty*sd.sale_detail_unit_price)*(1-sd.sale_detail_dis_percent/100)) - sd.sale_detail_dis_us)+(((sd.sale_detail_qty*sd.sale_detail_unit_price)-((sd.sale_detail_qty*sd.sale_detail_unit_price)-(((sd.sale_detail_qty*sd.sale_detail_unit_price)*(1-sd.sale_detail_dis_percent/100)) - sd.sale_detail_dis_us)))*(sm.sale_master_discount_percent/100))))*(sm.sale_master_tax_detail/100)+(get_sale_note_total(sd.sale_detail_id)*(sm.sale_master_tax/100))) as decimal(10,2)) tax,
			
			cast(sum((((sd.sale_detail_qty*sd.sale_detail_unit_price)+get_sale_note_total(sd.sale_detail_id))-((sd.sale_detail_qty*sd.sale_detail_unit_price)-(((sd.sale_detail_qty*sd.sale_detail_unit_price)*(1-sd.sale_detail_dis_percent/100)) - sd.sale_detail_dis_us)+(((sd.sale_detail_qty*sd.sale_detail_unit_price)-((sd.sale_detail_qty*sd.sale_detail_unit_price)-(((sd.sale_detail_qty*sd.sale_detail_unit_price)*(1-sd.sale_detail_dis_percent/100)) - sd.sale_detail_dis_us)))*(sm.sale_master_discount_percent/100)))+get_sale_note_total(sd.sale_detail_id)*(sm.sale_master_discount_percent/100))*(1+sm.sale_master_tax/100)) as decimal(10,2)) grandtotal,
			

		sd.sale_detail_qty,
		sd.sale_detail_unit_price,
		sm.sale_master_tax,
		sm.sale_master_discount_percent,
		sd.sale_detail_dis_us,
		sd.sale_detail_dis_percent,
		`sm`.`sale_master_status` AS `sale_master_status`,
		`sm`.`sale_master_branch_id` AS `sale_master_branch_id`,
		sm.sale_master_cash_id,
		br.branch_name
FROM `sale_master` `sm`
JOIN `sale_detail` `sd` ON `sm`.`sale_master_id` = `sd`.sale_master_id
LEFT JOIN `item_detail` `idt` ON `idt`.`item_detail_id` = `sd`.`sale_detail_item_id`
LEFT JOIN `item_type` ittype ON `idt`.item_type_id=ittype.item_type_id
INNER JOIN `branch` br ON sm.sale_master_branch_id=br.branch_id
WHERE `sm`.sale_master_status in (2) AND `sd`.sale_detail_status in (1) ",ParamArrary," GROUP BY idt.item_detail_id"
);
PREPARE stmt FROM @sql;
EXECUTE stmt;
END//
DELIMITER ;


-- Dumping structure for procedure rms_web_basic.p_sale_credit
DROP PROCEDURE IF EXISTS `p_sale_credit`;
DELIMITER //
CREATE DEFINER=`root`@`localhost` PROCEDURE `p_sale_credit`(
	IN `ArrayString` VARCHAR(255)





)
BEGIN
	set @sql = concat("SELECT 
		`sm`.`sale_master_id` AS `sale_master_id`, 
		`sd`.`sale_detail_id` AS `sale_detail_id`,
		LPAD(`sm`.`sale_master_invoice_no`,6,0) AS `invoice_no`,
		fl.floor_name,
		`ftl`.layout_name AS table_name,
		`sm`.sale_master_modified,
		`em`.`employee_name` AS `cashier`,
		`sm`.sale_master_start_date as checkin_date,
		`sm`.sale_master_end_date AS checkout_date,
		`sm`.sale_master_cash_id AS cash_id,
		sm.sale_master_modified_by,
		e.employee_name AS paid,
		`sm`.`sale_master_branch_id` AS `sale_master_branch_id`,
		br.branch_name,
		`ct`.`customer_type_name` AS `customer_type`,
		`sm`.`sale_master_customer_id` AS `sale_master_customer_id`,
		`cs`.customer_name,
		`cs`.`customer_phone` AS `customer_phone`,
		`cs`.`customer_address` AS `customer_address`,
		ifnull(sum(sd.sale_detail_costing),0) AS costing,
		
		
		cast(((((sum((sd.sale_detail_qty * sd.sale_detail_unit_price)*(1-sd.sale_detail_dis_percent/100) - sd.sale_detail_dis_us*sd.sale_detail_qty) + get_sale_note_summary(sm.sale_master_id))*sm.sale_master_discount_percent)/100)+ sm.sale_master_discount_dollar +sum((sd.sale_detail_qty * sd.sale_detail_unit_price)*(sd.sale_detail_dis_percent/100) + sd.sale_detail_dis_us*sd.sale_detail_qty)+ ((cast(sum((sd.sale_detail_qty * sd.sale_detail_unit_price)*(1-sd.sale_detail_dis_percent/100) - sd.sale_detail_dis_us*sd.sale_detail_qty) + get_sale_note_summary(sm.sale_master_id) as decimal(10,4)))-((cast(sum((sd.sale_detail_qty * sd.sale_detail_unit_price)*(1-sd.sale_detail_dis_percent/100) - sd.sale_detail_dis_us*sd.sale_detail_qty) + get_sale_note_summary(sm.sale_master_id) as decimal(10,4))*sm.sale_master_discount_percent)/100))*(sm.sale_master_member_discount/100))as decimal(10,4)) AS discount,

cast(((sum(sd.sale_detail_qty * sd.sale_detail_unit_price) + get_sale_note_summary(sm.sale_master_id))-(((((sum((sd.sale_detail_qty * sd.sale_detail_unit_price)*(1-sd.sale_detail_dis_percent/100) - sd.sale_detail_dis_us) + get_sale_note_summary(sm.sale_master_id))*sm.sale_master_discount_percent)/100)+ sm.sale_master_discount_dollar +sum((sd.sale_detail_qty * sd.sale_detail_unit_price)*(sd.sale_detail_dis_percent/100) + sd.sale_detail_dis_us)+ (((sum((sd.sale_detail_qty * sd.sale_detail_unit_price)*(1-sd.sale_detail_dis_percent/100) - sd.sale_detail_dis_us) + get_sale_note_summary(sm.sale_master_id)))-(((sum((sd.sale_detail_qty * sd.sale_detail_unit_price)*(1-sd.sale_detail_dis_percent/100) - sd.sale_detail_dis_us) + get_sale_note_summary(sm.sale_master_id))*sm.sale_master_discount_percent)/100))*(sm.sale_master_member_discount/100))))*(sm.sale_master_tax/100) as decimal(10,4))  AS tax,

		cast(sum(sd.sale_detail_qty * sd.sale_detail_unit_price) + get_sale_note_summary(sm.sale_master_id) as decimal(10,4)) AS SubTotal,
		cast((sum(sd.sale_detail_qty * sd.sale_detail_unit_price) + get_sale_note_summary(sm.sale_master_id)) - (((((sum((sd.sale_detail_qty * sd.sale_detail_unit_price)*(1-sd.sale_detail_dis_percent/100) - sd.sale_detail_dis_us) + get_sale_note_summary(sm.sale_master_id))*sm.sale_master_discount_percent)/100) +sum((sd.sale_detail_qty * sd.sale_detail_unit_price)*(sd.sale_detail_dis_percent/100) + sd.sale_detail_dis_us)+ (((sum((sd.sale_detail_qty * sd.sale_detail_unit_price)*(1-sd.sale_detail_dis_percent/100) - sd.sale_detail_dis_us) + get_sale_note_summary(sm.sale_master_id)))-(((sum((sd.sale_detail_qty * sd.sale_detail_unit_price)*(1-sd.sale_detail_dis_percent/100) - sd.sale_detail_dis_us) + get_sale_note_summary(sm.sale_master_id))*sm.sale_master_discount_percent)/100))*(sm.sale_master_member_discount/100))) + (((sum(sd.sale_detail_qty * sd.sale_detail_unit_price) + get_sale_note_summary(sm.sale_master_id))-(((((sum((sd.sale_detail_qty * sd.sale_detail_unit_price)*(1-sd.sale_detail_dis_percent/100) - sd.sale_detail_dis_us) + get_sale_note_summary(sm.sale_master_id) )*sm.sale_master_discount_percent)/100) +sum((sd.sale_detail_qty * sd.sale_detail_unit_price)*(sd.sale_detail_dis_percent/100) + sd.sale_detail_dis_us)+ (((sum((sd.sale_detail_qty * sd.sale_detail_unit_price)*(1-sd.sale_detail_dis_percent/100) - sd.sale_detail_dis_us) + get_sale_note_summary(sm.sale_master_id)))-(((sum((sd.sale_detail_qty * sd.sale_detail_unit_price)*(1-sd.sale_detail_dis_percent/100) - sd.sale_detail_dis_us) + get_sale_note_summary(sm.sale_master_id))*sm.sale_master_discount_percent)/100))*(sm.sale_master_member_discount/100))))*(sm.sale_master_tax/100))- ifnull(sum(sd.sale_detail_costing),0)  as decimal(10,4) ) as margin,
		
		
		cast((sum(sd.sale_detail_qty * sd.sale_detail_unit_price) + get_sale_note_summary(sm.sale_master_id)) - (((((sum((sd.sale_detail_qty * sd.sale_detail_unit_price)*(1-sd.sale_detail_dis_percent/100) - sd.sale_detail_dis_us) + get_sale_note_summary(sm.sale_master_id))*sm.sale_master_discount_percent)/100)+ sm.sale_master_discount_dollar +sum((sd.sale_detail_qty * sd.sale_detail_unit_price)*(sd.sale_detail_dis_percent/100) + sd.sale_detail_dis_us)+ (((sum((sd.sale_detail_qty * sd.sale_detail_unit_price)*(1-sd.sale_detail_dis_percent/100) - sd.sale_detail_dis_us) + get_sale_note_summary(sm.sale_master_id)))-(((sum((sd.sale_detail_qty * sd.sale_detail_unit_price)*(1-sd.sale_detail_dis_percent/100) - sd.sale_detail_dis_us) + get_sale_note_summary(sm.sale_master_id))*sm.sale_master_discount_percent)/100))*(sm.sale_master_member_discount/100))) + (((sum(sd.sale_detail_qty * sd.sale_detail_unit_price) + get_sale_note_summary(sm.sale_master_id))-(((((sum((sd.sale_detail_qty * sd.sale_detail_unit_price)*(1-sd.sale_detail_dis_percent/100) - sd.sale_detail_dis_us) + get_sale_note_summary(sm.sale_master_id) )*sm.sale_master_discount_percent)/100)+ sm.sale_master_discount_dollar +sum((sd.sale_detail_qty * sd.sale_detail_unit_price)*(sd.sale_detail_dis_percent/100) + sd.sale_detail_dis_us)+ (((sum((sd.sale_detail_qty * sd.sale_detail_unit_price)*(1-sd.sale_detail_dis_percent/100) - sd.sale_detail_dis_us) + get_sale_note_summary(sm.sale_master_id)))-(((sum((sd.sale_detail_qty * sd.sale_detail_unit_price)*(1-sd.sale_detail_dis_percent/100) - sd.sale_detail_dis_us) + get_sale_note_summary(sm.sale_master_id))*sm.sale_master_discount_percent)/100))*(sm.sale_master_member_discount/100))))*(sm.sale_master_tax/100)) as decimal(10,4) )AS grandtotal,
		
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
	LEFT JOIN employee e ON e.employee_id = sm.sale_master_modified_by 
	LEFT JOIN `item_detail` `idt` ON `idt`.`item_detail_id` = `sd`.`sale_detail_item_id`
	LEFT JOIN `customer` `cs` ON `cs`.`customer_id` = `sm`.`sale_master_customer_id`
	LEFT JOIN `customer_type` `ct` ON `ct`.customer_type_id = `cs`.customer_type_id
	LEFT JOIN `floor_table_layout` ftl ON sm.sale_master_layout_id=ftl.layout_id
	LEFT JOIN `floor` fl ON ftl.floor_id=fl.floor_id
	LEFT JOIN `account_type` `ac` ON sm.sale_master_account_type=ac.acc_type_id
	INNER JOIN `branch` br ON sm.sale_master_branch_id=br.branch_id
	WHERE `sm`.sale_master_status in (3,4) AND `sd`.sale_detail_status in (1)",ArrayString,
	" GROUP BY `sm`.sale_master_id ;");
PREPARE stmt FROM @sql;
EXECUTE stmt;
END//
DELIMITER ;


-- Dumping structure for procedure rms_web_basic.p_sale_cut_stock
DROP PROCEDURE IF EXISTS `p_sale_cut_stock`;
DELIMITER //
CREATE DEFINER=`root`@`localhost` PROCEDURE `p_sale_cut_stock`(IN `cash_id` INT, IN `branch_id` INT, IN `stock_location_id` INT)
BEGIN
	select ifnull((select sum(stock.stock_qty) from stock where stock.stock_item_id=id.item_detail_id AND stock.branch_id=branch_id AND stock.stock_location_id=stock_location_id),0) as stock_qty,id.item_detail_name,id.item_detail_id,sum(sd.sale_detail_qty) as cut_qty from sale_detail sd
	inner join sale_master sm on sm.sale_master_id=sd.sale_master_id
	inner join item_detail id on id.item_detail_id=sd.sale_detail_item_id
	where sm.sale_master_status=2 and sd.sale_detail_status=1 and id.item_detail_cut_stock=1 and sm.sale_master_cash_id=cash_id
	group by id.item_detail_id;
END//
DELIMITER ;


-- Dumping structure for procedure rms_web_basic.p_sale_detail
DROP PROCEDURE IF EXISTS `p_sale_detail`;
DELIMITER //
CREATE DEFINER=`root`@`localhost` PROCEDURE `p_sale_detail`(IN `ArrayString` VARCHAR(255)









)
BEGIN
	set @sql = concat("SELECT * FROM (SELECT 
		`sm`.`sale_master_id` AS `sale_master_id`, 
		sm.sale_master_cash_id as sale_master_cash_id,
		sm.sale_master_discount_dollar as discount_dollar,
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
		
		((sd.sale_detail_qty * sd.sale_detail_unit_price) * sd.sale_detail_dis_percent/100 + sd.sale_detail_dis_us*sd.sale_detail_qty) + (((sd.sale_detail_qty * sd.sale_detail_unit_price) * (1 - sd.sale_detail_dis_percent/100) - sd.sale_detail_dis_us*sd.sale_detail_qty) * sm.sale_master_discount_percent/100) + (((sd.sale_detail_qty * sd.sale_detail_unit_price) * (1 - sd.sale_detail_dis_percent/100) - sd.sale_detail_dis_us*sd.sale_detail_qty) *(1 - sm.sale_master_discount_percent/100)) * sm.sale_master_member_discount/100 AS discount,
		
	
		
		((((sd.sale_detail_qty * sd.sale_detail_unit_price)*(1 - sd.sale_detail_dis_percent/100) - sd.sale_detail_dis_us*sd.sale_detail_qty)*(1 - sm.sale_master_discount_percent/100))*(1 - sm.sale_master_member_discount/100))* sm.sale_master_tax/100 AS `tax`,
		
		cast(((sd.sale_detail_qty * sd.sale_detail_unit_price)*(1 - sd.sale_detail_dis_percent/100) - sd.sale_detail_dis_us*sd.sale_detail_qty)*(1 - sm.sale_master_discount_percent/100)*(1 - sm.sale_master_member_discount/100)*(1 + sm.sale_master_tax/100) as decimal(10,4)) AS grandtotal,  
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
	sm.sale_master_discount_dollar as discount_dollar,
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
	
(sn.sale_note_qty * sn.sale_note_unit_price) *(1 - sm.sale_master_discount_percent/100)* (1 - sm.sale_master_member_discount/100) *(1 - sm.sale_master_member_discount/100)* sm.sale_master_tax/100 AS `tax`,
	
	cast((((sn.sale_note_qty * sn.sale_note_unit_price)*(1 - sm.sale_master_discount_percent/100)) * (1 -sm.sale_master_member_discount/100)) * (1 + sm.sale_master_tax/100) as decimal(10,4)) AS grandtotal,
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


-- Dumping structure for procedure rms_web_basic.p_sale_detail_
DROP PROCEDURE IF EXISTS `p_sale_detail_`;
DELIMITER //
CREATE DEFINER=`root`@`localhost` PROCEDURE `p_sale_detail_`(
	IN `ArrayString` VARCHAR(255)






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
	
(sn.sale_note_qty * sn.sale_note_unit_price) *(1 - sm.sale_master_discount_percent/100)* (1 - sm.sale_master_member_discount/100) *(1 - sm.sale_master_member_discount/100)* sm.sale_master_tax/100 AS `tax`,

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


-- Dumping structure for procedure rms_web_basic.p_sale_detail_summary
DROP PROCEDURE IF EXISTS `p_sale_detail_summary`;
DELIMITER //
CREATE DEFINER=`root`@`localhost` PROCEDURE `p_sale_detail_summary`()
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
		it.item_type_id,
		itt.item_type_name,
		SUM(sd.sale_detail_qty) AS qty,
		SUM(sd.sale_detail_qty * ifnull(m.measure_qty,1)) AS real_qty,
		sd.sale_detail_unit_price AS unit_price,
		SUM(ifnull(sd.sale_detail_costing,0)) AS costing,
		SUM(sd.sale_detail_qty * sd.sale_detail_unit_price) AS total,
		SUM( ((sd.sale_detail_qty * sd.sale_detail_unit_price) * sd.sale_detail_dis_percent/100 + sd.sale_detail_dis_us) + (((sd.sale_detail_qty * sd.sale_detail_unit_price) * (1 - sd.sale_detail_dis_percent/100) - sd.sale_detail_dis_us) * sm.sale_master_discount_percent/100) + (((sd.sale_detail_qty * sd.sale_detail_unit_price) * (1 - sd.sale_detail_dis_percent/100) - sd.sale_detail_dis_us) *(1 - sm.sale_master_discount_percent/100)) * sm.sale_master_member_discount/100 ) AS discount,
		SUM( ((((sd.sale_detail_qty * sd.sale_detail_unit_price)*(1 - sd.sale_detail_dis_percent/100) - sd.sale_detail_dis_us)*(1 - sm.sale_master_discount_percent/100))*(1 - sm.sale_master_member_discount/100))* sm.sale_master_tax/100 ) AS `tax`,
		cast(SUM(((sd.sale_detail_qty * sd.sale_detail_unit_price)*(1 - sd.sale_detail_dis_percent/100) - sd.sale_detail_dis_us)*(1 - sm.sale_master_discount_percent/100)*(1 - sm.sale_master_member_discount/100)*(1 + sm.sale_master_tax/100)) as decimal(10,2)) AS grandtotal,  
		sm.sale_master_branch_id AS brand_id,
		br.branch_name AS brand_name
FROM `sale_master` `sm`
INNER JOIN `sale_detail` `sd` ON `sm`.`sale_master_id` = `sd`.sale_master_id
INNER JOIN `item_detail` it ON sd.sale_detail_item_id = it.item_detail_id
INNER JOIN item_type itt ON it.item_type_id = itt.item_type_id
LEFT JOIN `customer` `cs` ON `cs`.`customer_id` = `sm`.`sale_master_customer_id` 
LEFT join measure m on m.measure_id=it.measure_id
INNER JOIN `branch` br ON sm.sale_master_branch_id=br.branch_id
WHERE `sm`.sale_master_status in (2) AND `sd`.sale_detail_status in (1) ",ArrayString," 
GROUP BY it.item_type_id
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
	sn.sale_note_detail_id AS `sale_detail_id`,
	concat(' * ',inote.item_note_name) AS item_type_name,
	SUM( sn.sale_note_qty ) AS qty,
	SUM( sn.sale_note_qty ) AS real_qty,
	sn.sale_note_unit_price AS unit_price,
	0.000 as costing,
	SUM( sn.sale_note_qty * sn.sale_note_unit_price ) AS total,
	SUM( (sn.sale_note_qty * sn.sale_note_unit_price) * sm.sale_master_discount_percent/100 + ((sn.sale_note_qty * sn.sale_note_unit_price)*(1 - sm.sale_master_discount_percent/100)) * sm.sale_master_member_discount/100 ) AS discount,
	SUM( ((sn.sale_note_qty * sn.sale_note_unit_price) *(1 - sm.sale_master_discount_percent/100)* (1 - sm.sale_master_member_discount/100)) * sm.sale_master_member_discount/100 ) AS `tax`,
	cast(SUM( (((sn.sale_note_qty * sn.sale_note_unit_price)*(1 - sm.sale_master_discount_percent/100)) * (1 -sm.sale_master_member_discount/100)) * (1 + sm.sale_master_tax/100) ) as decimal(10,2)) AS grandtotal,
	sm.sale_master_branch_id AS brand_id,
	br.branch_name AS brand_name
FROM sale_note sn
INNER JOIN item_note inote ON sn.sale_note_item_note_id = inote.item_note_id
INNER JOIN sale_detail sd ON sn.sale_note_detail_id=sd.sale_detail_id
INNER JOIN sale_master sm ON sd.sale_master_id = sm.sale_master_id
LEFT JOIN `customer` `cs` ON `cs`.`customer_id` = `sm`.`sale_master_customer_id`
INNER JOIN branch br ON sm.sale_master_branch_id= br.branch_id
WHERE `sm`.sale_master_status in (2) AND `sd`.sale_detail_status in (1) ",ArrayString,"
GROUP BY sn.sale_note_detail_id
) AS temp_table
ORDER BY sale_master_id,sale_detail_id
");
PREPARE stmt FROM @sql;
EXECUTE stmt;
END//
DELIMITER ;


-- Dumping structure for procedure rms_web_basic.p_sale_detail_void
DROP PROCEDURE IF EXISTS `p_sale_detail_void`;
DELIMITER //
CREATE DEFINER=`root`@`localhost` PROCEDURE `p_sale_detail_void`(IN `ArrayString` VARCHAR(255))
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


-- Dumping structure for procedure rms_web_basic.p_sale_summary
DROP PROCEDURE IF EXISTS `p_sale_summary`;
DELIMITER //
CREATE DEFINER=`root`@`localhost` PROCEDURE `p_sale_summary`(IN `ArrayString` VARCHAR(250)





















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
		sm.sale_master_credit_payment as credit_payment,
		br.branch_name,
		`ct`.`customer_type_name` AS `customer_type`,
		`sm`.`sale_master_customer_id` AS `sale_master_customer_id`,
		`cs`.customer_name,
		`cs`.`customer_phone` AS `customer_phone`,
		`cs`.`customer_address` AS `customer_address`,
		ifnull(sum(sd.sale_detail_costing),0) AS costing,
		
		
		cast(((((sum((sd.sale_detail_qty * sd.sale_detail_unit_price)*(1-sd.sale_detail_dis_percent/100) - sd.sale_detail_dis_us*sd.sale_detail_qty) + get_sale_note_summary(sm.sale_master_id))*sm.sale_master_discount_percent)/100)+ sm.sale_master_discount_dollar +sum((sd.sale_detail_qty * sd.sale_detail_unit_price)*(sd.sale_detail_dis_percent/100) + sd.sale_detail_dis_us*sd.sale_detail_qty)+ ((cast(sum((sd.sale_detail_qty * sd.sale_detail_unit_price)*(1-sd.sale_detail_dis_percent/100) - sd.sale_detail_dis_us*sd.sale_detail_qty) + get_sale_note_summary(sm.sale_master_id) as decimal(10,4)))-((cast(sum((sd.sale_detail_qty * sd.sale_detail_unit_price)*(1-sd.sale_detail_dis_percent/100) - sd.sale_detail_dis_us*sd.sale_detail_qty) + get_sale_note_summary(sm.sale_master_id) as decimal(10,4))*sm.sale_master_discount_percent)/100))*(sm.sale_master_member_discount/100))as decimal(10,4)) AS discount,

cast(((sum(sd.sale_detail_qty * sd.sale_detail_unit_price) + get_sale_note_summary(sm.sale_master_id))-(((((sum((sd.sale_detail_qty * sd.sale_detail_unit_price)*(1-sd.sale_detail_dis_percent/100) - sd.sale_detail_dis_us) + get_sale_note_summary(sm.sale_master_id))*sm.sale_master_discount_percent)/100)+ sm.sale_master_discount_dollar +sum((sd.sale_detail_qty * sd.sale_detail_unit_price)*(sd.sale_detail_dis_percent/100) + sd.sale_detail_dis_us)+ (((sum((sd.sale_detail_qty * sd.sale_detail_unit_price)*(1-sd.sale_detail_dis_percent/100) - sd.sale_detail_dis_us) + get_sale_note_summary(sm.sale_master_id)))-(((sum((sd.sale_detail_qty * sd.sale_detail_unit_price)*(1-sd.sale_detail_dis_percent/100) - sd.sale_detail_dis_us) + get_sale_note_summary(sm.sale_master_id))*sm.sale_master_discount_percent)/100))*(sm.sale_master_member_discount/100))))*(sm.sale_master_tax/100) as decimal(10,4))  AS tax,

		cast(sum(sd.sale_detail_qty * sd.sale_detail_unit_price) + get_sale_note_summary(sm.sale_master_id) as decimal(10,4)) AS SubTotal,
		cast((sum(sd.sale_detail_qty * sd.sale_detail_unit_price) + get_sale_note_summary(sm.sale_master_id)) - (((((sum((sd.sale_detail_qty * sd.sale_detail_unit_price)*(1-sd.sale_detail_dis_percent/100) - sd.sale_detail_dis_us) + get_sale_note_summary(sm.sale_master_id))*sm.sale_master_discount_percent)/100) +sum((sd.sale_detail_qty * sd.sale_detail_unit_price)*(sd.sale_detail_dis_percent/100) + sd.sale_detail_dis_us)+ (((sum((sd.sale_detail_qty * sd.sale_detail_unit_price)*(1-sd.sale_detail_dis_percent/100) - sd.sale_detail_dis_us) + get_sale_note_summary(sm.sale_master_id)))-(((sum((sd.sale_detail_qty * sd.sale_detail_unit_price)*(1-sd.sale_detail_dis_percent/100) - sd.sale_detail_dis_us) + get_sale_note_summary(sm.sale_master_id))*sm.sale_master_discount_percent)/100))*(sm.sale_master_member_discount/100))) + (((sum(sd.sale_detail_qty * sd.sale_detail_unit_price) + get_sale_note_summary(sm.sale_master_id))-(((((sum((sd.sale_detail_qty * sd.sale_detail_unit_price)*(1-sd.sale_detail_dis_percent/100) - sd.sale_detail_dis_us) + get_sale_note_summary(sm.sale_master_id) )*sm.sale_master_discount_percent)/100) +sum((sd.sale_detail_qty * sd.sale_detail_unit_price)*(sd.sale_detail_dis_percent/100) + sd.sale_detail_dis_us)+ (((sum((sd.sale_detail_qty * sd.sale_detail_unit_price)*(1-sd.sale_detail_dis_percent/100) - sd.sale_detail_dis_us) + get_sale_note_summary(sm.sale_master_id)))-(((sum((sd.sale_detail_qty * sd.sale_detail_unit_price)*(1-sd.sale_detail_dis_percent/100) - sd.sale_detail_dis_us) + get_sale_note_summary(sm.sale_master_id))*sm.sale_master_discount_percent)/100))*(sm.sale_master_member_discount/100))))*(sm.sale_master_tax/100))- ifnull(sum(sd.sale_detail_costing),0)  as decimal(10,4) ) as margin,
		
		
		cast((sum(sd.sale_detail_qty * sd.sale_detail_unit_price) + get_sale_note_summary(sm.sale_master_id)) - (((((sum((sd.sale_detail_qty * sd.sale_detail_unit_price)*(1-sd.sale_detail_dis_percent/100) - sd.sale_detail_dis_us) + get_sale_note_summary(sm.sale_master_id))*sm.sale_master_discount_percent)/100)+ sm.sale_master_discount_dollar +sum((sd.sale_detail_qty * sd.sale_detail_unit_price)*(sd.sale_detail_dis_percent/100) + sd.sale_detail_dis_us)+ (((sum((sd.sale_detail_qty * sd.sale_detail_unit_price)*(1-sd.sale_detail_dis_percent/100) - sd.sale_detail_dis_us) + get_sale_note_summary(sm.sale_master_id)))-(((sum((sd.sale_detail_qty * sd.sale_detail_unit_price)*(1-sd.sale_detail_dis_percent/100) - sd.sale_detail_dis_us) + get_sale_note_summary(sm.sale_master_id))*sm.sale_master_discount_percent)/100))*(sm.sale_master_member_discount/100))) + (((sum(sd.sale_detail_qty * sd.sale_detail_unit_price) + get_sale_note_summary(sm.sale_master_id))-(((((sum((sd.sale_detail_qty * sd.sale_detail_unit_price)*(1-sd.sale_detail_dis_percent/100) - sd.sale_detail_dis_us) + get_sale_note_summary(sm.sale_master_id) )*sm.sale_master_discount_percent)/100)+ sm.sale_master_discount_dollar +sum((sd.sale_detail_qty * sd.sale_detail_unit_price)*(sd.sale_detail_dis_percent/100) + sd.sale_detail_dis_us)+ (((sum((sd.sale_detail_qty * sd.sale_detail_unit_price)*(1-sd.sale_detail_dis_percent/100) - sd.sale_detail_dis_us) + get_sale_note_summary(sm.sale_master_id)))-(((sum((sd.sale_detail_qty * sd.sale_detail_unit_price)*(1-sd.sale_detail_dis_percent/100) - sd.sale_detail_dis_us) + get_sale_note_summary(sm.sale_master_id))*sm.sale_master_discount_percent)/100))*(sm.sale_master_member_discount/100))))*(sm.sale_master_tax/100)) as decimal(10,4) )AS grandtotal,
				if(sm.sale_master_status=2,cast((sum(sd.sale_detail_qty * sd.sale_detail_unit_price) + get_sale_note_summary(sm.sale_master_id)) - (((((sum((sd.sale_detail_qty * sd.sale_detail_unit_price)*(1-sd.sale_detail_dis_percent/100) - sd.sale_detail_dis_us) + get_sale_note_summary(sm.sale_master_id))*sm.sale_master_discount_percent)/100)+ sm.sale_master_discount_dollar +sum((sd.sale_detail_qty * sd.sale_detail_unit_price)*(sd.sale_detail_dis_percent/100) + sd.sale_detail_dis_us)+ (((sum((sd.sale_detail_qty * sd.sale_detail_unit_price)*(1-sd.sale_detail_dis_percent/100) - sd.sale_detail_dis_us) + get_sale_note_summary(sm.sale_master_id)))-(((sum((sd.sale_detail_qty * sd.sale_detail_unit_price)*(1-sd.sale_detail_dis_percent/100) - sd.sale_detail_dis_us) + get_sale_note_summary(sm.sale_master_id))*sm.sale_master_discount_percent)/100))*(sm.sale_master_member_discount/100))) + (((sum(sd.sale_detail_qty * sd.sale_detail_unit_price) + get_sale_note_summary(sm.sale_master_id))-(((((sum((sd.sale_detail_qty * sd.sale_detail_unit_price)*(1-sd.sale_detail_dis_percent/100) - sd.sale_detail_dis_us) + get_sale_note_summary(sm.sale_master_id) )*sm.sale_master_discount_percent)/100)+ sm.sale_master_discount_dollar +sum((sd.sale_detail_qty * sd.sale_detail_unit_price)*(sd.sale_detail_dis_percent/100) + sd.sale_detail_dis_us)+ (((sum((sd.sale_detail_qty * sd.sale_detail_unit_price)*(1-sd.sale_detail_dis_percent/100) - sd.sale_detail_dis_us) + get_sale_note_summary(sm.sale_master_id)))-(((sum((sd.sale_detail_qty * sd.sale_detail_unit_price)*(1-sd.sale_detail_dis_percent/100) - sd.sale_detail_dis_us) + get_sale_note_summary(sm.sale_master_id))*sm.sale_master_discount_percent)/100))*(sm.sale_master_member_discount/100))))*(sm.sale_master_tax/100)) as decimal(10,4) ),0.00)AS cash_payment,
				if(sm.sale_master_status=3,cast((sum(sd.sale_detail_qty * sd.sale_detail_unit_price) + get_sale_note_summary(sm.sale_master_id)) - (((((sum((sd.sale_detail_qty * sd.sale_detail_unit_price)*(1-sd.sale_detail_dis_percent/100) - sd.sale_detail_dis_us) + get_sale_note_summary(sm.sale_master_id))*sm.sale_master_discount_percent)/100)+ sm.sale_master_discount_dollar +sum((sd.sale_detail_qty * sd.sale_detail_unit_price)*(sd.sale_detail_dis_percent/100) + sd.sale_detail_dis_us)+ (((sum((sd.sale_detail_qty * sd.sale_detail_unit_price)*(1-sd.sale_detail_dis_percent/100) - sd.sale_detail_dis_us) + get_sale_note_summary(sm.sale_master_id)))-(((sum((sd.sale_detail_qty * sd.sale_detail_unit_price)*(1-sd.sale_detail_dis_percent/100) - sd.sale_detail_dis_us) + get_sale_note_summary(sm.sale_master_id))*sm.sale_master_discount_percent)/100))*(sm.sale_master_member_discount/100))) + (((sum(sd.sale_detail_qty * sd.sale_detail_unit_price) + get_sale_note_summary(sm.sale_master_id))-(((((sum((sd.sale_detail_qty * sd.sale_detail_unit_price)*(1-sd.sale_detail_dis_percent/100) - sd.sale_detail_dis_us) + get_sale_note_summary(sm.sale_master_id) )*sm.sale_master_discount_percent)/100)+ sm.sale_master_discount_dollar +sum((sd.sale_detail_qty * sd.sale_detail_unit_price)*(sd.sale_detail_dis_percent/100) + sd.sale_detail_dis_us)+ (((sum((sd.sale_detail_qty * sd.sale_detail_unit_price)*(1-sd.sale_detail_dis_percent/100) - sd.sale_detail_dis_us) + get_sale_note_summary(sm.sale_master_id)))-(((sum((sd.sale_detail_qty * sd.sale_detail_unit_price)*(1-sd.sale_detail_dis_percent/100) - sd.sale_detail_dis_us) + get_sale_note_summary(sm.sale_master_id))*sm.sale_master_discount_percent)/100))*(sm.sale_master_member_discount/100))))*(sm.sale_master_tax/100)) as decimal(10,4) ),0.00)AS credit_payment,
		if(sm.sale_master_status=4,cast((sum(sd.sale_detail_qty * sd.sale_detail_unit_price) + get_sale_note_summary(sm.sale_master_id)) - (((((sum((sd.sale_detail_qty * sd.sale_detail_unit_price)*(1-sd.sale_detail_dis_percent/100) - sd.sale_detail_dis_us) + get_sale_note_summary(sm.sale_master_id))*sm.sale_master_discount_percent)/100)+ sm.sale_master_discount_dollar +sum((sd.sale_detail_qty * sd.sale_detail_unit_price)*(sd.sale_detail_dis_percent/100) + sd.sale_detail_dis_us)+ (((sum((sd.sale_detail_qty * sd.sale_detail_unit_price)*(1-sd.sale_detail_dis_percent/100) - sd.sale_detail_dis_us) + get_sale_note_summary(sm.sale_master_id)))-(((sum((sd.sale_detail_qty * sd.sale_detail_unit_price)*(1-sd.sale_detail_dis_percent/100) - sd.sale_detail_dis_us) + get_sale_note_summary(sm.sale_master_id))*sm.sale_master_discount_percent)/100))*(sm.sale_master_member_discount/100))) + (((sum(sd.sale_detail_qty * sd.sale_detail_unit_price) + get_sale_note_summary(sm.sale_master_id))-(((((sum((sd.sale_detail_qty * sd.sale_detail_unit_price)*(1-sd.sale_detail_dis_percent/100) - sd.sale_detail_dis_us) + get_sale_note_summary(sm.sale_master_id) )*sm.sale_master_discount_percent)/100)+ sm.sale_master_discount_dollar +sum((sd.sale_detail_qty * sd.sale_detail_unit_price)*(sd.sale_detail_dis_percent/100) + sd.sale_detail_dis_us)+ (((sum((sd.sale_detail_qty * sd.sale_detail_unit_price)*(1-sd.sale_detail_dis_percent/100) - sd.sale_detail_dis_us) + get_sale_note_summary(sm.sale_master_id)))-(((sum((sd.sale_detail_qty * sd.sale_detail_unit_price)*(1-sd.sale_detail_dis_percent/100) - sd.sale_detail_dis_us) + get_sale_note_summary(sm.sale_master_id))*sm.sale_master_discount_percent)/100))*(sm.sale_master_member_discount/100))))*(sm.sale_master_tax/100)) as decimal(10,4) ),0.00)AS credit_paid,
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
	WHERE `sm`.sale_master_status in (2,3,4) AND `sd`.sale_detail_status in (1)",ArrayString,
	" GROUP BY `sm`.sale_master_id ;");
PREPARE stmt FROM @sql;
EXECUTE stmt;
END//
DELIMITER ;


-- Dumping structure for procedure rms_web_basic.p_sale_summary_void
DROP PROCEDURE IF EXISTS `p_sale_summary_void`;
DELIMITER //
CREATE DEFINER=`root`@`localhost` PROCEDURE `p_sale_summary_void`(IN `ArrayString` varCHAR(255))
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


-- Dumping structure for procedure rms_web_basic.p_void_item_list
DROP PROCEDURE IF EXISTS `p_void_item_list`;
DELIMITER //
CREATE DEFINER=`root`@`localhost` PROCEDURE `p_void_item_list`(
	IN `ArrayString` VARCHAR(255)



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


-- Dumping structure for procedure rms_web_basic.p_void_item_list__
DROP PROCEDURE IF EXISTS `p_void_item_list__`;
DELIMITER //
CREATE DEFINER=`root`@`localhost` PROCEDURE `p_void_item_list__`(
	IN `ArrayString` VARCHAR(255)






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
	ifnull(sn.sale_note_qty*sn.sale_note_tax,0) AS `tax`,
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


-- Dumping structure for function rms_web_basic.get_acc_type
DROP FUNCTION IF EXISTS `get_acc_type`;
DELIMITER //
CREATE DEFINER=`root`@`localhost` FUNCTION `get_acc_type`(`id` int) RETURNS varchar(255) CHARSET utf8
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


-- Dumping structure for function rms_web_basic.get_category_name
DROP FUNCTION IF EXISTS `get_category_name`;
DELIMITER //
CREATE DEFINER=`root`@`localhost` FUNCTION `get_category_name`(`category_id` int) RETURNS varchar(255) CHARSET utf8
BEGIN 
  DECLARE re VARCHAR(500);
	
  SET re = (select category.category_name from category where category.category_id=category_id);
 
	RETURN re;
END//
DELIMITER ;


-- Dumping structure for function rms_web_basic.get_costing_by_item
DROP FUNCTION IF EXISTS `get_costing_by_item`;
DELIMITER //
CREATE DEFINER=`root`@`localhost` FUNCTION `get_costing_by_item`(`item_id` int) RETURNS decimal(10,2)
BEGIN
	DECLARE R DECIMAL(10,2);
	set R=ifnull((select stock.stock_costing from stock where stock.stock_item_id=item_id limit 1),0);

	RETURN R;
END//
DELIMITER ;


-- Dumping structure for function rms_web_basic.get_costing_invoice
DROP FUNCTION IF EXISTS `get_costing_invoice`;
DELIMITER //
CREATE DEFINER=`root`@`localhost` FUNCTION `get_costing_invoice`(`sale_master_id` int) RETURNS decimal(11,2)
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


-- Dumping structure for function rms_web_basic.get_cost_by_date
DROP FUNCTION IF EXISTS `get_cost_by_date`;
DELIMITER //
CREATE DEFINER=`root`@`localhost` FUNCTION `get_cost_by_date`(`item_id` int, `stock_id` int, `check_date` date) RETURNS decimal(18,2)
BEGIN

	DECLARE R DECIMAL(18,2);
	DECLARE total_ingredient_costing DECIMAL(18,2);

	set total_ingredient_costing=(select ifnull(v_ingredient.total_cost,0) from v_ingredient where v_ingredient.ingredient_item_detail_id=item_id LIMIT 1);
	set R=(select ifnull(avg(purchase_detail_unit_cost/measure_qty),0) as costing from purchase_detail where purchase_detail_item_detail_id=item_id and stock_location_id=stock_id and cast(purchase_created_date as date)<=cast(check_date as date));
	

	RETURN ifnull(R,0)+ifnull(total_ingredient_costing,0);
END//
DELIMITER ;


-- Dumping structure for function rms_web_basic.get_credit_by_po_pay
DROP FUNCTION IF EXISTS `get_credit_by_po_pay`;
DELIMITER //
CREATE DEFINER=`root`@`localhost` FUNCTION `get_credit_by_po_pay`(`po_id` int, `po_pay_id` int) RETURNS decimal(10,2)
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


-- Dumping structure for function rms_web_basic.get_customer_chip
DROP FUNCTION IF EXISTS `get_customer_chip`;
DELIMITER //
CREATE DEFINER=`root`@`localhost` FUNCTION `get_customer_chip`(`cus_id` int) RETURNS varchar(50) CHARSET utf8 COLLATE utf8_unicode_ci
BEGIN
	DECLARE rs VARCHAR(50);
	set rs=(select customer_account.customer_chip from customer_account where customer_account.customer_id=cus_id limit 1);

	RETURN rs;
END//
DELIMITER ;


-- Dumping structure for function rms_web_basic.get_customer_name
DROP FUNCTION IF EXISTS `get_customer_name`;
DELIMITER //
CREATE DEFINER=`root`@`localhost` FUNCTION `get_customer_name`(`id` int) RETURNS varchar(500) CHARSET utf8 COLLATE utf8_unicode_ci
BEGIN
  DECLARE cus VARCHAR(500);
  SET cus = (select customer.customer_name from customer where customer.customer_id=`id`);
  RETURN cus;
END//
DELIMITER ;


-- Dumping structure for function rms_web_basic.get_customer_name_acc
DROP FUNCTION IF EXISTS `get_customer_name_acc`;
DELIMITER //
CREATE DEFINER=`root`@`localhost` FUNCTION `get_customer_name_acc`(`acc_id` INT) RETURNS varchar(500) CHARSET utf8 COLLATE utf8_unicode_ci
BEGIN
	DECLARE cus_name VARCHAR(500);
	DECLARE cus_id int;
	set cus_id = (SELECT customer_account.customer_id from customer_account where customer_account.customer_acc_id=acc_id);
  SET cus_name = (select customer.customer_name from customer where customer.customer_id=cus_id);
  RETURN cus_name;
END//
DELIMITER ;


-- Dumping structure for function rms_web_basic.get_customer_type
DROP FUNCTION IF EXISTS `get_customer_type`;
DELIMITER //
CREATE DEFINER=`root`@`localhost` FUNCTION `get_customer_type`(`id` INT) RETURNS text CHARSET utf8
BEGIN 
  DECLARE re VARCHAR(500);
	 SET re = (select customer_type.customer_type_name from customer_type where customer_type.customer_type_id=id);
  

	RETURN re;
END//
DELIMITER ;


-- Dumping structure for function rms_web_basic.get_employee_name
DROP FUNCTION IF EXISTS `get_employee_name`;
DELIMITER //
CREATE DEFINER=`root`@`localhost` FUNCTION `get_employee_name`(`emp_id` int) RETURNS varchar(500) CHARSET utf8 COLLATE utf8_unicode_ci
BEGIN
	DECLARE re VARCHAR(500);
  SET re = (select employee.employee_name from employee where employee.employee_id=emp_id);
  RETURN re;
END//
DELIMITER ;


-- Dumping structure for function rms_web_basic.get_invoice_type
DROP FUNCTION IF EXISTS `get_invoice_type`;
DELIMITER //
CREATE DEFINER=`root`@`localhost` FUNCTION `get_invoice_type`(`master_id` int) RETURNS int(11)
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


-- Dumping structure for function rms_web_basic.get_item_detail_count
DROP FUNCTION IF EXISTS `get_item_detail_count`;
DELIMITER //
CREATE DEFINER=`root`@`localhost` FUNCTION `get_item_detail_count`(`sale_master_id` int,`item_detail_id` int) RETURNS int(10)
BEGIN
	#Routine body goes here...
	DECLARE R INT;
	set R = (select count(*) from sale_detail where sale_detail_master_id=sale_master_id and sale_detail_item_id=item_detail_id);
	RETURN R;
END//
DELIMITER ;


-- Dumping structure for function rms_web_basic.get_item_detail_name
DROP FUNCTION IF EXISTS `get_item_detail_name`;
DELIMITER //
CREATE DEFINER=`root`@`localhost` FUNCTION `get_item_detail_name`(`id` integer) RETURNS varchar(255) CHARSET utf8
BEGIN
	DECLARE name VARCHAR(255);
  SET name = (select item_detail.item_detail_name from item_detail where item_detail.item_detail_id=`id`);
  RETURN name;
END//
DELIMITER ;


-- Dumping structure for function rms_web_basic.get_item_name
DROP FUNCTION IF EXISTS `get_item_name`;
DELIMITER //
CREATE DEFINER=`root`@`localhost` FUNCTION `get_item_name`(item_id  int) RETURNS varchar(500) CHARSET utf8
BEGIN 
  DECLARE re VARCHAR(500);
 IF item_id<=0 THEN SET re = (select item_note.item_note_name from item_note where item_note.item_note_id=-item_id);
  ELSE SET re = (select item_detail.item_detail_name from item_detail where item_detail.item_detail_id=item_id);
  END IF;
 RETURN re;
END//
DELIMITER ;


-- Dumping structure for function rms_web_basic.get_item_name_mobile
DROP FUNCTION IF EXISTS `get_item_name_mobile`;
DELIMITER //
CREATE DEFINER=`root`@`localhost` FUNCTION `get_item_name_mobile`(`id` INT) RETURNS text CHARSET utf8 COLLATE utf8_unicode_ci
BEGIN
  DECLARE name VARCHAR(500);
  SET name = (select item_detail_mobile.item_detail_name from item_detail_mobile where item_detail_mobile.item_detail_id=`id`);
  RETURN name;
END//
DELIMITER ;


-- Dumping structure for function rms_web_basic.get_lost_qty
DROP FUNCTION IF EXISTS `get_lost_qty`;
DELIMITER //
CREATE DEFINER=`root`@`localhost` FUNCTION `get_lost_qty`(`item_id` int,location_id int) RETURNS int(11)
BEGIN
	#Routine body goes here...
	DECLARE lost_qty double;
	set lost_qty = (SELECT sum(stock_waste_qty) as waste_qty FROM v_stock_waste where stock_waste_item_id = item_id and stock_location_id = location_id GROUP BY stock_waste_item_id);
	RETURN ifnull(lost_qty,0);
END//
DELIMITER ;


-- Dumping structure for function rms_web_basic.get_measure_qty
DROP FUNCTION IF EXISTS `get_measure_qty`;
DELIMITER //
CREATE DEFINER=`root`@`localhost` FUNCTION `get_measure_qty`(
	`m_id` INT
) RETURNS float
BEGIN
	DECLARE m FLOAT;
  SET m = (select measure.measure_qty from measure where measure.measure_id=m_id);
  RETURN m;
END//
DELIMITER ;


-- Dumping structure for function rms_web_basic.get_note_price
DROP FUNCTION IF EXISTS `get_note_price`;
DELIMITER //
CREATE DEFINER=`root`@`localhost` FUNCTION `get_note_price`(`sale_detail_id` int) RETURNS double
BEGIN
	#Routine body goes here...
	DECLARE R double;
	set R = (select sum(sale_note_qty*sale_note_unit_price) from sale_note where sale_note_detail_id=sale_detail_id);
	RETURN ifnull(R,0);
END//
DELIMITER ;


-- Dumping structure for function rms_web_basic.get_plate_no
DROP FUNCTION IF EXISTS `get_plate_no`;
DELIMITER //
CREATE DEFINER=`root`@`localhost` FUNCTION `get_plate_no`(`cus_id` INT) RETURNS varchar(500) CHARSET utf8 COLLATE utf8_unicode_ci
BEGIN
  DECLARE re VARCHAR(500);
  SET re = (select customer_account.customer_chip from customer_account where customer_account.customer_acc_id=cus_id);
  RETURN re;
END//
DELIMITER ;


-- Dumping structure for function rms_web_basic.get_po_pay
DROP FUNCTION IF EXISTS `get_po_pay`;
DELIMITER //
CREATE DEFINER=`root`@`localhost` FUNCTION `get_po_pay`(`po_id` int) RETURNS decimal(10,2)
BEGIN
	#Routine body goes here...
	DECLARE R DECIMAL(18,2);
	set R=(select sum(purchase_pay.purchase_pay_amount) from purchase_pay where purchase_pay.purchase_no=po_id);

	RETURN R;
END//
DELIMITER ;


-- Dumping structure for function rms_web_basic.get_price_type
DROP FUNCTION IF EXISTS `get_price_type`;
DELIMITER //
CREATE DEFINER=`root`@`localhost` FUNCTION `get_price_type`(`id` INT) RETURNS text CHARSET utf8 COLLATE utf8_unicode_ci
BEGIN
  DECLARE type_name VARCHAR(500);
  SET type_name = (select t.price_type_name from item_detail_price_type t where t.price_type_id=id);
  RETURN type_name;
END//
DELIMITER ;


-- Dumping structure for function rms_web_basic.get_printer_location_name
DROP FUNCTION IF EXISTS `get_printer_location_name`;
DELIMITER //
CREATE DEFINER=`root`@`localhost` FUNCTION `get_printer_location_name`(`id` int) RETURNS varchar(255) CHARSET utf8
BEGIN
	DECLARE p_name VARCHAR(500);
  SET p_name = (select printer_location_name from printer_location where printer_location_id=`id`);
  RETURN p_name;
END//
DELIMITER ;


-- Dumping structure for function rms_web_basic.get_printer_name
DROP FUNCTION IF EXISTS `get_printer_name`;
DELIMITER //
CREATE DEFINER=`root`@`localhost` FUNCTION `get_printer_name`(`id` INT) RETURNS text CHARSET utf8 COLLATE utf8_unicode_ci
BEGIN
  DECLARE p_name VARCHAR(500);
  SET p_name = (select printer.printer_print_kitchen from printer where printer.printer_location_id=`id`);
  RETURN p_name;
END//
DELIMITER ;


-- Dumping structure for function rms_web_basic.get_sale_note_summary
DROP FUNCTION IF EXISTS `get_sale_note_summary`;
DELIMITER //
CREATE DEFINER=`root`@`localhost` FUNCTION `get_sale_note_summary`(
	`master_id` INT

) RETURNS decimal(10,3)
BEGIN
	DECLARE R DECIMAL(10,3);
	SET R = (select ifnull(sum(sale_note_qty*sale_note_unit_price),0) as sale_note from sale_note where sale_note_detail_id in(select sale_detail_id from sale_detail where sale_master_id=master_id and sale_detail_status=1) and sale_note_status=1);
	RETURN R;
END//
DELIMITER ;


-- Dumping structure for function rms_web_basic.get_stock_increase_qty
DROP FUNCTION IF EXISTS `get_stock_increase_qty`;
DELIMITER //
CREATE DEFINER=`root`@`localhost` FUNCTION `get_stock_increase_qty`(`item_id` int,location_id int) RETURNS int(11)
BEGIN
	#Routine body goes here...
	DECLARE increase_qty double;
	set increase_qty = (SELECT sum(stock_adjust_qty) as increase_qty FROM stock_adjust  where stock_adjust_item_id = item_id and stock_location_id = location_id GROUP BY stock_adjust_item_id);
	RETURN ifnull(increase_qty,0);
END//
DELIMITER ;


-- Dumping structure for function rms_web_basic.get_table_name
DROP FUNCTION IF EXISTS `get_table_name`;
DELIMITER //
CREATE DEFINER=`root`@`localhost` FUNCTION `get_table_name`(`id` int) RETURNS varchar(500) CHARSET utf8 COLLATE utf8_unicode_ci
BEGIN
  DECLARE re VARCHAR(500);
  SET re = (select layout_name from floor_table_layout where layout_id=`id`);
  RETURN re;
END//
DELIMITER ;


-- Dumping structure for function rms_web_basic.get_table_status
DROP FUNCTION IF EXISTS `get_table_status`;
DELIMITER //
CREATE DEFINER=`root`@`localhost` FUNCTION `get_table_status`(`layout_id` int) RETURNS text CHARSET utf8 COLLATE utf8_unicode_ci
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


-- Dumping structure for function rms_web_basic.get_total_ingredient_costing_by_item
DROP FUNCTION IF EXISTS `get_total_ingredient_costing_by_item`;
DELIMITER //
CREATE DEFINER=`root`@`localhost` FUNCTION `get_total_ingredient_costing_by_item`(`item_detail_id` int) RETURNS decimal(10,2)
BEGIN
	#Routine body goes here...
	DECLARE re DECIMAL(10,2);
	set re=(select sum(ig.ingredient_qty * get_costing_by_item(ingredient_item_ingredient_id)) FROM ingredient ig
			WHERE ig.ingredient_item_detail_id=item_detail_id);
	RETURN ifnull(re,0);
END//
DELIMITER ;


-- Dumping structure for function rms_web_basic.get_total_sale
DROP FUNCTION IF EXISTS `get_total_sale`;
DELIMITER //
CREATE DEFINER=`root`@`localhost` FUNCTION `get_total_sale`(`sale_master_id` int) RETURNS decimal(65,2)
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


-- Dumping structure for function rms_web_basic.get_total_sold_qty
DROP FUNCTION IF EXISTS `get_total_sold_qty`;
DELIMITER //
CREATE DEFINER=`root`@`localhost` FUNCTION `get_total_sold_qty`(`item_id` int, `stock_location_id` int) RETURNS int(11)
BEGIN
	#Routine body goes here...
	DECLARE lost_qty double;
	set lost_qty = (select sum(sale_stock_qty) FROM sale_stock WHERE sale_stock_detail_id = item_id and sale_stock_stock_id = stock_location_id);
	RETURN ifnull(lost_qty,0);
END//
DELIMITER ;


-- Dumping structure for function rms_web_basic.get_tranfer_qty
DROP FUNCTION IF EXISTS `get_tranfer_qty`;
DELIMITER //
CREATE DEFINER=`root`@`localhost` FUNCTION `get_tranfer_qty`(`item_id` int, `stock_location_id` int) RETURNS int(11)
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


-- Dumping structure for function rms_web_basic.get_type_name_by_item
DROP FUNCTION IF EXISTS `get_type_name_by_item`;
DELIMITER //
CREATE DEFINER=`root`@`localhost` FUNCTION `get_type_name_by_item`(`item_id` int) RETURNS varchar(500) CHARSET utf8 COLLATE utf8_unicode_ci
BEGIN 
  DECLARE re VARCHAR(500);
	SET re = (select item_type.item_type_name from item_detail inner join item_type on item_type.item_type_id=item_detail.item_type_id where item_detail.item_detail_id=item_id);
	RETURN re;
END//
DELIMITER ;


-- Dumping structure for function rms_web_basic.get_user_name
DROP FUNCTION IF EXISTS `get_user_name`;
DELIMITER //
CREATE DEFINER=`root`@`localhost` FUNCTION `get_user_name`(`user_id` int) RETURNS varchar(500) CHARSET utf8 COLLATE utf8_unicode_ci
BEGIN
  DECLARE re VARCHAR(500);
  SET re = (select `user`.user_name from `user` where `user`.user_id=`user_id`);
  RETURN re;
END//
DELIMITER ;


-- Dumping structure for function rms_web_basic.is_car_wash
DROP FUNCTION IF EXISTS `is_car_wash`;
DELIMITER //
CREATE DEFINER=`root`@`localhost` FUNCTION `is_car_wash`(`item_id` int) RETURNS int(11)
BEGIN
	DECLARE R INT;
	set R = (select item_type_is_car_wash from item_type where item_type_id=(select item_type_id from item_detail where item_detail_id=item_id limit 1));
	RETURN IFNULL(R,0);
END//
DELIMITER ;


-- Dumping structure for function rms_web_basic.SPLIT_STR
DROP FUNCTION IF EXISTS `SPLIT_STR`;
DELIMITER //
CREATE DEFINER=`root`@`localhost` FUNCTION `SPLIT_STR`(
  x VARCHAR(255),
  delim VARCHAR(12),
  pos INT
) RETURNS varchar(255) CHARSET utf8 COLLATE utf8_unicode_ci
RETURN REPLACE(SUBSTRING(SUBSTRING_INDEX(x, delim, pos),
       LENGTH(SUBSTRING_INDEX(x, delim, pos -1)) + 1),
       delim, '')//
DELIMITER ;


-- Dumping structure for view rms_web_basic.permission
DROP VIEW IF EXISTS `permission`;
-- Removing temporary table and create final VIEW structure
DROP TABLE IF EXISTS `permission`;
CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` SQL SECURITY DEFINER VIEW `permission` AS select `pm`.`permission_id` AS `permission_id`,`pm`.`permission_page_id` AS `permission_page_id`,`pm`.`position_id` AS `position_id`,`pm`.`permission_enable` AS `permission_enable`,`pm`.`permission_add` AS `permission_add`,`pm`.`permission_edit` AS `permission_edit`,`pm`.`permission_delete` AS `permission_delete`,`pm`.`permission_viewall` AS `permission_viewall`,`pm`.`permission_follow_by` AS `permission_follow_by`,`pm`.`permission_page_only` AS `permission_page_only`,`pg`.`page_name` AS `permission_name`,`pg`.`page_id_parent` AS `permission_page_id_parent`,`pg`.`page_ordering` AS `permission_ordering`,`pg`.`page_url` AS `permission_control`,`pg`.`page_clazz` AS `permission_class`,`pg`.`page_active` AS `permission_active`,`pg`.`page_name_kh` AS `permission_name_kh`,`pg`.`page_controller` AS `page_controller`,`pg`.`page_img` AS `page_img` from (`permissions` `pm` join `page` `pg` on((`pg`.`page_id` = `pm`.`permission_page_id`)));


-- Dumping structure for view rms_web_basic.v_cash_register
DROP VIEW IF EXISTS `v_cash_register`;
-- Removing temporary table and create final VIEW structure
DROP TABLE IF EXISTS `v_cash_register`;
CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` SQL SECURITY DEFINER VIEW `v_cash_register` AS select `cr`.`cash_id` AS `cash_id`,`cr`.`cash_user_id` AS `cash_user_id`,`cr`.`cash_startdate` AS `cash_startdate`,`cr`.`cash_enddate` AS `cash_enddate`,`cr`.`cash_branch_id` AS `cash_branch_id`,`get_employee_name`(`cr`.`cash_user_id`) AS `user_name`,ifnull(`cr`.`cash_amount`,0) AS `cash_amount`,ifnull(`cr`.`cash_amount_kh`,0) AS `cash_amount_kh`,`cr`.`cash_note` AS `cash_note`,(select count(0) from `sale_master` `sm` where ((`sm`.`sale_master_status` in ('PAID','CANCEL')) and (`sm`.`sale_master_cash_id` = `cr`.`cash_id`))) AS `total_invoice`,(select count(0) from `sale_master` `sm` where ((`sm`.`sale_master_status` = 'PAID') and (`sm`.`sale_master_cash_id` = `cr`.`cash_id`))) AS `paid_invoice`,(select count(0) from `sale_master` `sm` where ((`sm`.`sale_master_status` = 'CANCEL') and (`sm`.`sale_master_cash_id` = `cr`.`cash_id`))) AS `void_invoice`,ifnull((select sum(`sm`.`sale_master_member_pay`) from `sale_master` `sm` where ((`sm`.`sale_master_status` = 'PAID') and (`sm`.`sale_master_cash_id` = `cr`.`cash_id`))),0) AS `total_member_pay` from `cash_register` `cr` where (`cr`.`cash_status` = 'FINISH');


-- Dumping structure for view rms_web_basic.v_cash_register_active
DROP VIEW IF EXISTS `v_cash_register_active`;
-- Removing temporary table and create final VIEW structure
DROP TABLE IF EXISTS `v_cash_register_active`;
CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` SQL SECURITY DEFINER VIEW `v_cash_register_active` AS select `c`.`cash_id` AS `cash_id`,`c`.`cash_user_id` AS `cash_user_id`,`c`.`cash_amount` AS `cash_amount`,`c`.`cash_startdate` AS `cash_startdate`,`c`.`cash_enddate` AS `cash_enddate`,`c`.`cash_branch_id` AS `cash_branch_id`,`c`.`cash_status` AS `cash_status` from `cash_register` `c` where (`c`.`cash_status` = 'ACTIVE');


-- Dumping structure for view rms_web_basic.v_category
DROP VIEW IF EXISTS `v_category`;
-- Removing temporary table and create final VIEW structure
DROP TABLE IF EXISTS `v_category`;
CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` SQL SECURITY DEFINER VIEW `v_category` AS select `category`.`category_id` AS `category_id`,`category`.`category_name` AS `category_name`,`category`.`category_description` AS `category_description`,`get_employee_name`(`category`.`category_created_by`) AS `recorder`,`category`.`category_created_date` AS `category_created_date`,`category`.`category_photo` AS `category_photo` from `category`;


-- Dumping structure for view rms_web_basic.v_company
DROP VIEW IF EXISTS `v_company`;
-- Removing temporary table and create final VIEW structure
DROP TABLE IF EXISTS `v_company`;
CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` SQL SECURITY DEFINER VIEW `v_company` AS select `cp`.`company_profile_id` AS `company_id`,`cp`.`company_profile_name` AS `company_name`,`cp`.`company_profile_address` AS `company_address`,`b`.`branch_name` AS `branch_name`,`b`.`branch_location` AS `branch_location`,`b`.`branch_phone` AS `branch_phone` from (`company_profile` `cp` join `branch` `b` on((`cp`.`company_profile_branch_id` = `cp`.`company_profile_id`)));


-- Dumping structure for view rms_web_basic.v_customer_detail
DROP VIEW IF EXISTS `v_customer_detail`;
-- Removing temporary table and create final VIEW structure
DROP TABLE IF EXISTS `v_customer_detail`;
CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` SQL SECURITY DEFINER VIEW `v_customer_detail` AS select `c`.`customer_id` AS `customer_id`,`c`.`customer_name` AS `customer_name`,`c`.`customer_gender` AS `customer_gender`,`c`.`customer_type_id` AS `customer_type_id`,`c`.`customer_address` AS `customer_address`,`c`.`customer_email` AS `customer_email`,`c`.`customer_dob` AS `customer_dob`,`c`.`customer_phone` AS `customer_phone`,`c`.`customer_created_date` AS `customer_created_date`,`e`.`employee_name` AS `customer_created_by`,`b`.`branch_name` AS `branch_name` from (((`customer` `c` join `employee` `e` on((`c`.`customer_created_by` = `e`.`employee_id`))) join `customer_type` `ct` on((`c`.`customer_type_id` = `ct`.`customer_type_id`))) join `branch` `b` on((`c`.`customer_branch_id` = `b`.`branch_id`)));


-- Dumping structure for view rms_web_basic.v_employee
DROP VIEW IF EXISTS `v_employee`;
-- Removing temporary table and create final VIEW structure
DROP TABLE IF EXISTS `v_employee`;
CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` SQL SECURITY DEFINER VIEW `v_employee` AS select `e`.`employee_id` AS `employee_id`,`e`.`employee_brand_id` AS `employee_brand_id`,`e`.`employee_position_id` AS `employee_position_id`,`e`.`employee_shift_id` AS `employee_shift_id`,`e`.`employee_name` AS `employee_name`,`e`.`employee_sex` AS `employee_sex`,`e`.`employee_email` AS `employee_email`,`e`.`employee_dob` AS `employee_dob`,`e`.`employee_address` AS `employee_address`,`e`.`employee_phone` AS `employee_phone`,`e`.`employee_note` AS `employee_note`,`e`.`employee_salary` AS `employee_salary`,`e`.`employee_hired_date` AS `employee_hired_date`,`b`.`branch_name` AS `branch_name`,`p`.`position_name` AS `position_name`,`s`.`shift_name` AS `shift_name`,`e`.`employee_is_seller` AS `employee_is_seller`,`e`.`employee_stock_location_id` AS `employee_stock_location_id`,`sl`.`stock_location_name` AS `stock_location_name`,`e`.`employee_card` AS `employee_card`,`e`.`status` AS `status` from ((((`employee` `e` join `branch` `b` on((`e`.`employee_brand_id` = `b`.`branch_id`))) join `position` `p` on((`e`.`employee_position_id` = `p`.`position_id`))) join `shift` `s` on((`e`.`employee_shift_id` = `s`.`shift_id`))) left join `stock_location` `sl` on((`e`.`employee_stock_location_id` = `sl`.`stock_location_id`))) where ((`b`.`branch_status` = 1) and (`p`.`status` = 1));


-- Dumping structure for view rms_web_basic.v_expense
DROP VIEW IF EXISTS `v_expense`;
-- Removing temporary table and create final VIEW structure
DROP TABLE IF EXISTS `v_expense`;
CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` SQL SECURITY DEFINER VIEW `v_expense` AS select `e`.`expense_id` AS `expense_id`,`ve`.`expense_detail_id` AS `expense_detail_id`,concat('E',convert(lpad(`e`.`expense_no`,6,0) using utf8mb4)) AS `expense_nos`,concat('E',convert(lpad(`e`.`expense_no`,6,0) using utf8),' / ',`b`.`branch_name`) AS `expense_no_prefix`,`e`.`expense_no` AS `expense_no`,ifnull(`ve`.`expense_chart_number`,`ve`.`expense_detail_id`) AS `expense_chart_number`,`ve`.`expense_detail_name` AS `expense_detail_name`,`e`.`expense_date` AS `expense_date`,`e`.`expense_type_id` AS `expense_type_id`,`et`.`expense_type_name` AS `expense_type_name`,`e`.`expense_amount` AS `expense_amount`,`e`.`expense_created_date` AS `expense_created_date`,`e`.`expense_modified_date` AS `expense_modified_date`,`e`.`expense_status` AS `expense_status`,`ep`.`employee_name` AS `recorder`,`e`.`expense_des` AS `expense_note`,`e`.`expense_branch_id` AS `expense_branch_id`,`b`.`branch_name` AS `branch_name`,`e`.`expense_created_by` AS `expense_created_by`,`em`.`employee_name` AS `modified_by` from (((((`expense` `e` left join `expense_detail` `ve` on((`ve`.`expense_detail_id` = `e`.`expense_detail_id`))) left join `employee` `ep` on((`ep`.`employee_id` = `e`.`expense_created_by`))) left join `employee` `em` on((`em`.`employee_id` = `e`.`expense_modified_by`))) left join `expense_type` `et` on((`et`.`expense_type_id` = `ve`.`expense_type_id`))) left join `branch` `b` on((`b`.`branch_id` = `e`.`expense_branch_id`))) order by `e`.`expense_id` desc;


-- Dumping structure for view rms_web_basic.v_expense_detail
DROP VIEW IF EXISTS `v_expense_detail`;
-- Removing temporary table and create final VIEW structure
DROP TABLE IF EXISTS `v_expense_detail`;
CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` SQL SECURITY DEFINER VIEW `v_expense_detail` AS select `ed`.`expense_detail_id` AS `expense_detail_id`,`ed`.`expense_type_id` AS `expense_type_id`,`et`.`expense_type_name` AS `expense_type_name`,`ed`.`expense_detail_name` AS `expense_detail_name`,`ed`.`expense_chart_number` AS `expense_chart_number`,`ed`.`expense_detail_created_date` AS `expense_detail_created_date`,`e`.`employee_name` AS `employee_name`,`em`.`employee_name` AS `expense_detail_modified_by`,`ed`.`expense_detail_modified_date` AS `expense_detail_modified_date`,`ed`.`expense_detail_status` AS `expense_detail_status` from (((`expense_detail` `ed` join `expense_type` `et` on((`ed`.`expense_type_id` = `et`.`expense_type_id`))) left join `employee` `e` on((`ed`.`expense_detail_created_by` = `e`.`employee_id`))) left join `employee` `em` on((`em`.`employee_id` = `ed`.`expense_detail_modified_by`))) order by `ed`.`expense_detail_id` desc;


-- Dumping structure for view rms_web_basic.v_expense_type
DROP VIEW IF EXISTS `v_expense_type`;
-- Removing temporary table and create final VIEW structure
DROP TABLE IF EXISTS `v_expense_type`;
CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` SQL SECURITY DEFINER VIEW `v_expense_type` AS select `et`.`expense_type_id` AS `expense_type_id`,`et`.`expense_chart_number` AS `expense_chart_number`,`et`.`expense_type_name` AS `expense_type_name`,`et`.`expense_type_des` AS `expense_type_des`,`et`.`expense_type_created_by` AS `expense_type_created_by`,`et`.`expense_type_created_date` AS `expense_type_created_date`,`et`.`expense_type_modified_by` AS `expense_type_modified_by`,`et`.`expense_type_modified_date` AS `expense_type_modified_date`,`e`.`employee_name` AS `recorder`,`em`.`employee_name` AS `modified_by` from ((`expense_type` `et` left join `employee` `e` on((('' = '') and (`et`.`expense_type_created_by` = `e`.`employee_id`)))) left join `employee` `em` on((`em`.`employee_id` = `et`.`expense_type_modified_by`)));


-- Dumping structure for view rms_web_basic.v_floor_table_layout
DROP VIEW IF EXISTS `v_floor_table_layout`;
-- Removing temporary table and create final VIEW structure
DROP TABLE IF EXISTS `v_floor_table_layout`;
CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` SQL SECURITY DEFINER VIEW `v_floor_table_layout` AS select `ftl`.`layout_id` AS `layout_id`,`ftl`.`floor_id` AS `floor_id`,`f`.`floor_name` AS `floor_name`,`ftl`.`layout_name` AS `layout_name`,`ftl`.`layout_manage_by` AS `layout_manage_by`,`e`.`employee_name` AS `employee_name` from ((`floor_table_layout` `ftl` join `floor` `f` on((`ftl`.`floor_id` = `f`.`floor_id`))) left join `employee` `e` on((`ftl`.`layout_manage_by` = `e`.`employee_id`)));


-- Dumping structure for view rms_web_basic.v_happy_hour
DROP VIEW IF EXISTS `v_happy_hour`;
-- Removing temporary table and create final VIEW structure
DROP TABLE IF EXISTS `v_happy_hour`;
CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` SQL SECURITY DEFINER VIEW `v_happy_hour` AS select `hh`.`id` AS `id`,`it`.`item_type_id` AS `item_type_id`,`hh`.`happy_hour_name` AS `happy_hour_name`,`it`.`item_type_name` AS `item_type_name`,`hh`.`happy_hour_from_date` AS `happy_hour_date`,`hh`.`happy_hour_start_time` AS `happy_hour_start_time`,`hh`.`happy_hour_end_time` AS `happy_hour_end_time`,`hh`.`happy_hour_discount` AS `happy_hour_discount`,`hh`.`happy_hour_description` AS `happy_hour_description`,`hh`.`happy_hour_status` AS `happy_hour_status` from (`happy_hour` `hh` join `item_type` `it` on((`hh`.`happy_hour_item_type_id` = `it`.`item_type_id`)));


-- Dumping structure for view rms_web_basic.v_ingredient
DROP VIEW IF EXISTS `v_ingredient`;
-- Removing temporary table and create final VIEW structure
DROP TABLE IF EXISTS `v_ingredient`;
CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` SQL SECURITY DEFINER VIEW `v_ingredient` AS select `ig`.`ingredient_id` AS `ingredient_id`,concat(convert(lpad(`id`.`item_detail_part_number`,5,0) using utf8),':',`id`.`item_detail_name`) AS `item_name`,`id`.`item_detail_name` AS `item_detail_name`,lpad(`idg`.`item_detail_part_number`,5,0) AS `item_detail_part_number`,`idg`.`item_detail_name` AS `ingredient_name`,`idg`.`item_detail_retail_price` AS `item_detail_retail_price`,format(`ig`.`ingredient_qty`,2) AS `ingredient_qty`,format((`ig`.`ingredient_qty` * `get_costing_by_item`(`ig`.`ingredient_item_ingredient_id`)),5) AS `costing`,`get_total_ingredient_costing_by_item`(`ig`.`ingredient_item_detail_id`) AS `total_cost`,`m`.`measure_name` AS `measure_name`,`m`.`measure_id` AS `measure_id`,`e`.`employee_name` AS `recorder`,`em`.`employee_name` AS `modified_by`,`ig`.`ingredient_modified_date` AS `ingredient_modified_date`,`ig`.`ingredient_created_date` AS `ingredient_created_date`,`ig`.`ingredient_status` AS `ingredient_status`,`ig`.`ingredient_no` AS `ingredient_no`,`ig`.`ingredient_desc` AS `ingredient_desc`,`idg`.`item_detail_id` AS `item_detail_id`,`ig`.`ingredient_item_detail_id` AS `ingredient_item_detail_id`,`id`.`item_detail_retail_price` AS `item_main_retail_price` from (((((`ingredient` `ig` left join `item_detail` `id` on((`ig`.`ingredient_item_detail_id` = `id`.`item_detail_id`))) left join `item_detail` `idg` on((`idg`.`item_detail_id` = `ig`.`ingredient_item_ingredient_id`))) left join `employee` `e` on((`e`.`employee_id` = `ig`.`ingredient_created_by`))) left join `employee` `em` on((`em`.`employee_id` = `ig`.`ingredient_modified_by`))) left join `measure` `m` on((`ig`.`ingredient_measure_id` = `m`.`measure_id`)));


-- Dumping structure for view rms_web_basic.v_item_detail
DROP VIEW IF EXISTS `v_item_detail`;
-- Removing temporary table and create final VIEW structure
DROP TABLE IF EXISTS `v_item_detail`;
CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` SQL SECURITY DEFINER VIEW `v_item_detail` AS select `id`.`item_type_id` AS `item_type_id`,`it`.`item_type_name` AS `item_type_name`,`it`.`item_type_is_car_wash` AS `item_type_is_car_wash`,`it`.`item_type_is_ingredient` AS `item_type_is_ingredient`,`id`.`item_detail_part_number` AS `item_detail_part_number`,`id`.`item_detail_id` AS `item_detail_id`,`id`.`item_detail_name` AS `item_detail_name`,`id`.`item_detail_whole_price` AS `item_detail_whole_price`,`id`.`item_detail_retail_price` AS `item_detail_retail_price`,`id`.`item_detail_created_by` AS `item_detail_created_by`,`id`.`item_detail_created_date` AS `item_detail_created_date`,`id`.`item_detail_des` AS `item_detail_des`,`id`.`item_detail_modified_by` AS `item_detail_modified_by`,`id`.`item_detail_modified_date` AS `item_detail_modified_date`,`e`.`employee_name` AS `recorder`,`id`.`item_detail_photo` AS `item_detail_photo`,`pl`.`printer_location_name` AS `printer_location_name`,`id`.`item_detail_printer_location_id` AS `item_detail_printer_location_id`,`id`.`item_detail_like_count` AS `item_detail_like_count`,`id`.`item_detail_remain_alert` AS `item_detail_remain_alert`,`id`.`item_detail_hide_show` AS `item_detail_hide_show`,`id`.`item_detail_cut_stock` AS `item_detail_cut_stock`,`id`.`measure_id` AS `measure_id`,`m`.`measure_name` AS `measure_name`,`m`.`measure_note` AS `measure_note`,`m`.`measure_qty` AS `measure_qty`,`id`.`color` AS `color` from ((((`item_detail` `id` left join `item_type` `it` on((`id`.`item_type_id` = `it`.`item_type_id`))) left join `employee` `e` on((`id`.`item_detail_created_by` = `e`.`employee_id`))) left join `printer_location` `pl` on((`pl`.`printer_location_id` = `id`.`item_detail_printer_location_id`))) left join `measure` `m` on((`id`.`measure_id` = `m`.`measure_id`)));


-- Dumping structure for view rms_web_basic.v_item_type
DROP VIEW IF EXISTS `v_item_type`;
-- Removing temporary table and create final VIEW structure
DROP TABLE IF EXISTS `v_item_type`;
CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` SQL SECURITY DEFINER VIEW `v_item_type` AS select `it`.`item_type_id` AS `item_type_id`,`c`.`category_id` AS `category_id`,`c`.`category_name` AS `category_name`,`it`.`item_type_name` AS `item_type_name`,`it`.`item_type_des` AS `item_type_des`,`it`.`item_type_created_date` AS `item_type_created_date`,`it`.`item_type_created_by` AS `item_type_created_by`,`it`.`item_type_is_ingredient` AS `item_type_is_ingredient`,`it`.`item_type_is_car_wash` AS `item_type_is_car_wash`,`it`.`item_type_modified_by` AS `item_type_modified_by`,`it`.`item_type_modified_date` AS `item_type_modified_date`,`e`.`employee_name` AS `recorder` from ((`item_type` `it` left join `employee` `e` on((`it`.`item_type_created_by` = `e`.`employee_id`))) left join `category` `c` on((`c`.`category_id` = `it`.`category_id`)));


-- Dumping structure for view rms_web_basic.v_measure
DROP VIEW IF EXISTS `v_measure`;
-- Removing temporary table and create final VIEW structure
DROP TABLE IF EXISTS `v_measure`;
CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` SQL SECURITY DEFINER VIEW `v_measure` AS select `m`.`measure_id` AS `measure_id`,`m`.`measure_name` AS `measure_name`,`m`.`measure_qty` AS `measure_qty`,`m`.`measure_note` AS `measure_note`,`m`.`measure_created_date` AS `date_entry`,`em`.`employee_name` AS `employee_name` from (`measure` `m` left join `employee` `em` on((`em`.`employee_id` = `m`.`measure_created_by`)));


-- Dumping structure for view rms_web_basic.v_point
DROP VIEW IF EXISTS `v_point`;
-- Removing temporary table and create final VIEW structure
DROP TABLE IF EXISTS `v_point`;
CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` SQL SECURITY DEFINER VIEW `v_point` AS select `p`.`id` AS `id`,`p`.`point` AS `point`,`p`.`froms` AS `froms`,`p`.`tos` AS `tos`,`p`.`date_created` AS `date_created`,`p`.`created_by` AS `created_by`,`p`.`desc` AS `desc`,`e`.`employee_brand_id` AS `employee_brand_id`,`e`.`employee_name` AS `employee_name` from (`point` `p` join `employee` `e` on((('' = '') and (`p`.`created_by` = `e`.`employee_id`)))) where (`e`.`employee_brand_id` = 1);


-- Dumping structure for view rms_web_basic.v_position
DROP VIEW IF EXISTS `v_position`;
-- Removing temporary table and create final VIEW structure
DROP TABLE IF EXISTS `v_position`;
CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` SQL SECURITY DEFINER VIEW `v_position` AS select `g`.`position_id` AS `position_id`,`g`.`position_name` AS `position_name`,`g`.`position_note` AS `position_note`,`g`.`position_created_date` AS `date_entry`,`em`.`employee_name` AS `employee_name`,`g`.`status` AS `status` from (`position` `g` join `employee` `em` on((`em`.`employee_id` = `g`.`position_created_by`)));


-- Dumping structure for view rms_web_basic.v_purchase
DROP VIEW IF EXISTS `v_purchase`;
-- Removing temporary table and create final VIEW structure
DROP TABLE IF EXISTS `v_purchase`;
CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` SQL SECURITY DEFINER VIEW `v_purchase` AS select `purchase`.`purchase_no` AS `purchase_no`,`purchase`.`refference_no` AS `refference_no`,`purchase`.`purchase_supplier_id` AS `purchase_supplier_id`,`supplier`.`supplier_name` AS `supplier_name`,`supplier`.`supplier_phone` AS `supplier_phone`,`supplier`.`supplier_address` AS `supplier_address`,`purchase`.`purchase_created_date` AS `purchase_created_date`,`purchase`.`purchase_created_by` AS `purchase_created_by`,`purchase`.`purchase_modified_by` AS `purchase_modified_by`,`purchase`.`purchase_modified_date` AS `purchase_modified_date`,`purchase`.`purchase_branch_id` AS `purchase_branch_id`,`b`.`branch_name` AS `branch_name`,`purchase`.`purchase_due_date` AS `purchase_due_date`,`purchase`.`purchase_deposit` AS `purchase_deposit`,`purchase`.`purchase_discount` AS `purchase_discount`,`purchase`.`purchase_note` AS `purchase_note`,`purchase`.`purchase_vat` AS `purchase_vat`,`purchase`.`purchase_total_amount` AS `purchase_total_amount`,`purchase`.`status` AS `status`,(`purchase`.`purchase_total_amount` - ((ifnull(`get_po_pay`(`purchase`.`purchase_no`),0) + `purchase`.`purchase_deposit`) + ((`purchase`.`purchase_discount` / 100) * `purchase`.`purchase_total_amount`))) AS `purchase_credit`,`get_employee_name`(`purchase`.`purchase_created_by`) AS `created_by` from ((`purchase` left join `supplier` on((`supplier`.`supplier_id` = `purchase`.`purchase_supplier_id`))) join `branch` `b` on((`b`.`branch_id` = `purchase`.`purchase_branch_id`))) order by `purchase`.`purchase_no` desc;


-- Dumping structure for view rms_web_basic.v_purchase_detail
DROP VIEW IF EXISTS `v_purchase_detail`;
-- Removing temporary table and create final VIEW structure
DROP TABLE IF EXISTS `v_purchase_detail`;
CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` SQL SECURITY DEFINER VIEW `v_purchase_detail` AS select `p`.`purchase_no` AS `purchase_no`,concat(convert(lpad(`p`.`purchase_no`,6,'0') using utf8),' : ',`s`.`supplier_name`,' / ',`p`.`purchase_created_date`) AS `po_supplier`,`pd`.`purchase_detail_id` AS `purchase_detail_id`,`pd`.`purchase_detail_item_detail_id` AS `purchase_detail_item_detail_id`,`im`.`item_detail_name` AS `item_detail_name`,`pd`.`measure_id` AS `measure_id`,`ms`.`measure_name` AS `measure_name`,`pd`.`measure_qty` AS `measure_qty`,`pd`.`purchase_detail_unit_cost` AS `purchase_detail_unit_cost`,`pd`.`purchase_detail_qty` AS `purchase_detail_qty`,`pd`.`purchase_detail_total_amount` AS `purchase_detail_total_amount`,`pd`.`purchase_created_date` AS `purchase_created_date`,`pd`.`purchase_created_by` AS `purchase_created_by`,`pd`.`purchase_modified_by` AS `purchase_modified_by`,`pd`.`purchase_modified_date` AS `purchase_modified_date`,`pd`.`purchase_detail_note` AS `purchase_detail_note`,`p`.`purchase_deposit` AS `purchase_deposit`,(`p`.`purchase_total_amount` - ((ifnull(`get_po_pay`(`p`.`purchase_no`),0) + `p`.`purchase_deposit`) + ((`p`.`purchase_discount` / 100) * `p`.`purchase_total_amount`))) AS `status`,`b`.`branch_id` AS `branch_id`,`b`.`branch_name` AS `branch_name`,`pd`.`stock_location_id` AS `stock_location_id`,`sl`.`stock_location_name` AS `stock_location_name`,`im`.`item_detail_part_number` AS `item_detail_part_number`,`s`.`supplier_name` AS `supplier_name`,`p`.`purchase_supplier_id` AS `purchase_supplier_id`,`pd`.`purchase_detail_item_expired_date` AS `expired_date`,`pd`.`purchase_detail_item_expired_date` AS `expired_alert` from ((((((`purchase` `p` join `purchase_detail` `pd` on((`p`.`purchase_no` = `pd`.`purchase_no`))) left join `item_detail` `im` on((`im`.`item_detail_id` = `pd`.`purchase_detail_item_detail_id`))) left join `supplier` `s` on((`p`.`purchase_supplier_id` = `s`.`supplier_id`))) left join `stock_location` `sl` on((`pd`.`stock_location_id` = `sl`.`stock_location_id`))) left join `measure` `ms` on((`pd`.`measure_id` = `ms`.`measure_id`))) left join `branch` `b` on((`b`.`branch_id` = `p`.`purchase_branch_id`)));


-- Dumping structure for view rms_web_basic.v_purchase_detail_
DROP VIEW IF EXISTS `v_purchase_detail_`;
-- Removing temporary table and create final VIEW structure
DROP TABLE IF EXISTS `v_purchase_detail_`;
CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` SQL SECURITY DEFINER VIEW `v_purchase_detail_` AS select `p`.`purchase_no` AS `purchase_no`,concat(convert(lpad(`p`.`purchase_no`,6,'0') using utf8),' : ',`s`.`supplier_name`,' / ',`p`.`purchase_created_date`) AS `po_supplier`,`pd`.`purchase_detail_id` AS `purchase_detail_id`,`pd`.`purchase_detail_item_detail_id` AS `purchase_detail_item_detail_id`,`im`.`item_detail_name` AS `item_detail_name`,`pd`.`measure_id` AS `measure_id`,`ms`.`measure_name` AS `measure_name`,`pd`.`measure_qty` AS `measure_qty`,`pd`.`purchase_detail_unit_cost` AS `purchase_detail_unit_cost`,`pd`.`purchase_detail_qty` AS `purchase_detail_qty`,`pd`.`purchase_detail_total_amount` AS `purchase_detail_total_amount`,`pd`.`purchase_created_date` AS `purchase_created_date`,`pd`.`purchase_created_by` AS `purchase_created_by`,`pd`.`purchase_modified_by` AS `purchase_modified_by`,`pd`.`purchase_modified_date` AS `purchase_modified_date`,`pd`.`purchase_detail_note` AS `purchase_detail_note`,`pd`.`status` AS `status`,`b`.`branch_id` AS `branch_id`,`b`.`branch_name` AS `branch_name`,`pd`.`stock_location_id` AS `stock_location_id`,`sl`.`stock_location_name` AS `stock_location_name`,`im`.`item_detail_part_number` AS `item_detail_part_number`,`s`.`supplier_name` AS `supplier_name`,`p`.`purchase_supplier_id` AS `purchase_supplier_id`,`pd`.`purchase_detail_item_expired_date` AS `expired_date`,`pd`.`purchase_detail_item_expired_date` AS `expired_alert` from ((((((`purchase` `p` join `purchase_detail` `pd` on((`p`.`purchase_no` = `pd`.`purchase_no`))) left join `item_detail` `im` on((`im`.`item_detail_id` = `pd`.`purchase_detail_item_detail_id`))) left join `supplier` `s` on((`p`.`purchase_supplier_id` = `s`.`supplier_id`))) left join `stock_location` `sl` on((`pd`.`stock_location_id` = `sl`.`stock_location_id`))) left join `measure` `ms` on((`pd`.`measure_id` = `ms`.`measure_id`))) left join `branch` `b` on((`b`.`branch_id` = `p`.`purchase_branch_id`)));


-- Dumping structure for view rms_web_basic.v_purchase_pay
DROP VIEW IF EXISTS `v_purchase_pay`;
-- Removing temporary table and create final VIEW structure
DROP TABLE IF EXISTS `v_purchase_pay`;
CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` SQL SECURITY DEFINER VIEW `v_purchase_pay` AS select `purchase_pay`.`purchase_pay_id` AS `purchase_pay_id`,`purchase_pay`.`purchase_no` AS `purchase_no`,`s`.`supplier_name` AS `supplier_name`,`purchase_pay`.`purchase_pay_date` AS `purchase_pay_date`,`purchase_pay`.`purchase_pay_amount` AS `purchase_pay_amount`,`get_credit_by_po_pay`(`purchase`.`purchase_no`,`purchase_pay`.`purchase_pay_id`) AS `purchase_pay_credit_amount`,`purchase_pay`.`purchase_pay_note` AS `purchase_pay_note`,`purchase_pay`.`purchase_pay_created_by` AS `purchase_pay_created_by`,`purchase_pay`.`purchase_pay_created_date` AS `purchase_pay_created_date`,`purchase_pay`.`purchase_pay_modified_by` AS `purchase_pay_modified_by`,`purchase_pay`.`purchase_pay_modified_date` AS `purchase_pay_modified_date`,`purchase`.`purchase_branch_id` AS `purchase_branch_id`,`b`.`branch_name` AS `branch_name`,`get_employee_name`(`purchase_pay`.`purchase_pay_created_by`) AS `recorder` from (((`purchase_pay` join `purchase` on((`purchase`.`purchase_no` = `purchase_pay`.`purchase_no`))) left join `supplier` `s` on((`s`.`supplier_id` = `purchase`.`purchase_supplier_id`))) left join `branch` `b` on((`b`.`branch_id` = `purchase`.`purchase_branch_id`))) order by `purchase_pay`.`purchase_pay_id` desc;


-- Dumping structure for view rms_web_basic.v_purchase_return
DROP VIEW IF EXISTS `v_purchase_return`;
-- Removing temporary table and create final VIEW structure
DROP TABLE IF EXISTS `v_purchase_return`;
CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` SQL SECURITY DEFINER VIEW `v_purchase_return` AS select `purchase_pay`.`purchase_pay_id` AS `purchase_pay_id`,`purchase_pay`.`purchase_no` AS `purchase_no`,`purchase_pay`.`purchase_pay_date` AS `purchase_pay_date`,`purchase_pay`.`purchase_pay_amount` AS `purchase_pay_amount`,`purchase_pay`.`purchase_pay_note` AS `purchase_pay_note`,`purchase_pay`.`purchase_pay_created_by` AS `purchase_pay_created_by`,`purchase_pay`.`purchase_pay_created_date` AS `purchase_pay_created_date`,`purchase_pay`.`purchase_pay_modified_by` AS `purchase_pay_modified_by`,`purchase_pay`.`purchase_pay_modified_date` AS `purchase_pay_modified_date` from `purchase_pay`;


-- Dumping structure for view rms_web_basic.v_sale_detail
DROP VIEW IF EXISTS `v_sale_detail`;
-- Removing temporary table and create final VIEW structure
DROP TABLE IF EXISTS `v_sale_detail`;
CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` SQL SECURITY DEFINER VIEW `v_sale_detail` AS select `sm`.`sale_master_id` AS `sale_master_id`,`sm`.`sale_order_number` AS `sale_order_number`,`sd`.`sale_detail_id` AS `sale_detail_id`,lpad(`sm`.`sale_master_invoice_no`,6,0) AS `invoice_no`,`em`.`employee_name` AS `recorder`,`sm`.`sale_master_start_date` AS `checkin_date`,`sm`.`sale_master_end_date` AS `checkout_date`,`sm`.`sale_master_cash_id` AS `cash_id`,`sm`.`sale_master_branch_id` AS `sale_master_branch_id`,`ct`.`customer_type_name` AS `customer_type`,`sm`.`sale_master_customer_id` AS `sale_master_customer_id`,`cs`.`customer_name` AS `customer_name`,`cs`.`customer_phone` AS `customer_phone`,`cs`.`customer_address` AS `customer_address`,`idt`.`item_detail_part_number` AS `part_number`,`sd`.`sale_detail_item_id` AS `sale_detail_item_id`,`idt`.`item_detail_name` AS `item_detail_name`,`idt`.`item_detail_cut_stock` AS `cut_stock`,`sd`.`sale_detail_qty` AS `sale_detail_qty`,`sd`.`sale_detail_dis_us` AS `sale_detail_dis_us`,`sd`.`sale_detail_dis_percent` AS `sale_detail_dis_percent`,`sd`.`sale_detail_unit_price` AS `sale_detail_unit_price`,cast((((`sd`.`sale_detail_qty` * `sd`.`sale_detail_unit_price`) * (`sd`.`sale_detail_dis_percent` / 100)) + `sd`.`sale_detail_dis_us`) as decimal(10,3)) AS `discount`,cast(((((`sd`.`sale_detail_qty` * `sd`.`sale_detail_unit_price`) * (1 - (`sd`.`sale_detail_dis_percent` / 100))) - `sd`.`sale_detail_dis_us`) * (`sm`.`sale_master_tax` / 100)) as decimal(10,3)) AS `vat`,cast((`sd`.`sale_detail_qty` * `sd`.`sale_detail_unit_price`) as decimal(10,3)) AS `subtotal`,cast(((((`sd`.`sale_detail_qty` * `sd`.`sale_detail_unit_price`) * (1 - (`sd`.`sale_detail_dis_percent` / 100))) - `sd`.`sale_detail_dis_us`) * (1 + (`sm`.`sale_master_tax` / 100))) as decimal(10,3)) AS `grandtotal`,`sm`.`sale_master_status` AS `sale_master_status`,`sd`.`sale_detail_status` AS `sale_detail_status`,`pr`.`printer_id` AS `printer_id`,`pr`.`printer_name` AS `printer_name`,`pr`.`printer_print_kitchen` AS `printer_print_kitchen`,`pr`.`printer_print_kitchen_time` AS `printer_print_kitchen_time`,`ftl`.`layout_name` AS `layout_name`,`sd`.`sale_detail_printed` AS `sale_detail_printed` from ((((((((`sale_detail` `sd` join `sale_master` `sm` on((`sm`.`sale_master_id` = `sd`.`sale_master_id`))) left join `employee` `em` on((`em`.`employee_id` = `sm`.`sale_master_cashier_id`))) left join `item_detail` `idt` on((`idt`.`item_detail_id` = `sd`.`sale_detail_item_id`))) left join `customer` `cs` on((`cs`.`customer_id` = `sm`.`sale_master_customer_id`))) left join `customer_type` `ct` on((`ct`.`customer_type_id` = `cs`.`customer_type_id`))) left join `printer_location` `prl` on((`idt`.`item_detail_printer_location_id` = `prl`.`printer_location_id`))) left join `printer` `pr` on((`prl`.`printer_location_id` = `pr`.`printer_location_id`))) left join `floor_table_layout` `ftl` on((`sm`.`sale_master_layout_id` = `ftl`.`layout_id`))) where ((`sm`.`sale_master_status` in (1,2,3,4)) and (`sd`.`sale_detail_status` = 1));


-- Dumping structure for view rms_web_basic.v_sale_detail_note
DROP VIEW IF EXISTS `v_sale_detail_note`;
-- Removing temporary table and create final VIEW structure
DROP TABLE IF EXISTS `v_sale_detail_note`;
CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` SQL SECURITY DEFINER VIEW `v_sale_detail_note` AS select `sn`.`sale_note_id` AS `sale_note_id`,`sn`.`sale_note_detail_id` AS `sale_note_detail_id`,`sn`.`sale_note_item_note_id` AS `sale_note_item_note_id`,`itn`.`item_note_name` AS `item_note_name`,`sn`.`sale_note_qty` AS `sale_note_qty`,`sn`.`sale_note_unit_price` AS `sale_note_unit_price`,`sn`.`sale_note_status` AS `sale_note_status` from (`sale_note` `sn` left join `item_note` `itn` on((`sn`.`sale_note_item_note_id` = `itn`.`item_note_id`)));


-- Dumping structure for view rms_web_basic.v_sale_order_return
DROP VIEW IF EXISTS `v_sale_order_return`;
-- Removing temporary table and create final VIEW structure
DROP TABLE IF EXISTS `v_sale_order_return`;
CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` SQL SECURITY DEFINER VIEW `v_sale_order_return` AS select `sr`.`sale_return_id` AS `sale_return_id`,`sm`.`sale_master_id` AS `sale_master_id`,`sm`.`sale_master_invoice_no` AS `sale_master_invoice_no`,`sm`.`sale_master_end_date` AS `sale_master_end_date`,`sm`.`sale_master_start_date` AS `sale_master_start_date`,`sd`.`sale_detail_item_id` AS `sale_detail_item_id`,`id`.`item_detail_name` AS `item_detail_name`,`sr`.`sale_return_qty` AS `sale_return_qty`,`sd`.`sale_detail_unit_price` AS `sale_detail_unit_price`,(`sd`.`sale_detail_unit_price` * `sr`.`sale_return_qty`) AS `sub_total`,`sr`.`sale_return_created_date` AS `sale_return_created_date`,`em`.`employee_name` AS `employee_name`,`fl`.`layout_name` AS `layout_name`,`sm`.`sale_master_branch_id` AS `sale_master_branch_id`,`b`.`branch_name` AS `branch_name`,lpad(`sm`.`sale_master_invoice_no`,6,0) AS `invoice_no` from ((((((`sale_order_return` `sr` join `sale_master` `sm` on((`sm`.`sale_master_id` = `sr`.`sale_return_master_id`))) join `sale_detail` `sd` on((`sd`.`sale_detail_id` = `sr`.`sale_return_detail_id`))) join `item_detail` `id` on((`id`.`item_detail_id` = `sd`.`sale_detail_item_id`))) join `employee` `em` on((`em`.`employee_id` = `sr`.`sale_return_created_by`))) join `floor_table_layout` `fl` on((`fl`.`layout_id` = `sm`.`sale_master_layout_id`))) join `branch` `b` on((`b`.`branch_id` = `sm`.`sale_master_branch_id`)));


-- Dumping structure for view rms_web_basic.v_sale_return
DROP VIEW IF EXISTS `v_sale_return`;
-- Removing temporary table and create final VIEW structure
DROP TABLE IF EXISTS `v_sale_return`;
CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` SQL SECURITY DEFINER VIEW `v_sale_return` AS select `sr`.`item_detail_id` AS `item_detail_id`,`sr`.`measure_id` AS `measure_id`,`sr`.`sale_return_id` AS `sale_return_id`,`sr`.`sale_return_no` AS `sale_return_no`,`id`.`item_detail_name` AS `item_detail_name`,`e`.`employee_name` AS `recorder`,`s`.`customer_name` AS `customer_name`,`b`.`branch_name` AS `branch_name`,`sr`.`sale_return_qty` AS `sale_return_qty`,`sr`.`sale_return_price` AS `sale_return_price`,`sr`.`sale_return_date` AS `sale_return_date`,`sr`.`sale_return_created_date` AS `sale_return_created_date`,`sr`.`sale_return_note` AS `sale_return_note`,`sr`.`sale_return_status` AS `sale_return_status`,`e`.`employee_brand_id` AS `employee_brand_id`,`sr`.`sale_return_to_stock` AS `sale_return_to_stock` from ((((`sale_return` `sr` join `item_detail` `id` on((`id`.`item_detail_id` = `sr`.`item_detail_id`))) join `employee` `e` on((`e`.`employee_id` = `sr`.`sale_return_created_by`))) left join `customer` `s` on((`s`.`customer_id` = `sr`.`customer_id`))) join `branch` `b` on((`b`.`branch_id` = `sr`.`branch_id`)));


-- Dumping structure for view rms_web_basic.v_sale_summary
DROP VIEW IF EXISTS `v_sale_summary`;
-- Removing temporary table and create final VIEW structure
DROP TABLE IF EXISTS `v_sale_summary`;
CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` SQL SECURITY DEFINER VIEW `v_sale_summary` AS select `sm`.`sale_master_id` AS `sale_master_id`,`sd`.`sale_detail_id` AS `sale_detail_id`,lpad(`sm`.`sale_master_invoice_no`,6,0) AS `invoice_no`,`fl`.`floor_name` AS `floor_name`,`ftl`.`layout_name` AS `table_name`,`em`.`employee_name` AS `cashier`,`sm`.`sale_master_start_date` AS `checkin_date`,`sm`.`sale_master_end_date` AS `checkout_date`,`sm`.`sale_master_cash_id` AS `cash_id`,`sm`.`sale_master_branch_id` AS `sale_master_branch_id`,`br`.`branch_name` AS `branch_name`,`ct`.`customer_type_name` AS `customer_type`,`sm`.`sale_master_customer_id` AS `sale_master_customer_id`,`cs`.`customer_name` AS `customer_name`,`cs`.`customer_phone` AS `customer_phone`,`cs`.`customer_address` AS `customer_address`,sum(`sd`.`sale_detail_costing`) AS `costing`,cast((((((sum((((`sd`.`sale_detail_qty` * `sd`.`sale_detail_unit_price`) * (1 - (`sd`.`sale_detail_dis_percent` / 100))) - `sd`.`sale_detail_dis_us`)) + `get_sale_note_summary`(`sm`.`sale_master_id`)) * `sm`.`sale_master_discount_percent`) / 100) + sum((((`sd`.`sale_detail_qty` * `sd`.`sale_detail_unit_price`) * (`sd`.`sale_detail_dis_percent` / 100)) + `sd`.`sale_detail_dis_us`))) + ((cast((sum((((`sd`.`sale_detail_qty` * `sd`.`sale_detail_unit_price`) * (1 - (`sd`.`sale_detail_dis_percent` / 100))) - `sd`.`sale_detail_dis_us`)) + `get_sale_note_summary`(`sm`.`sale_master_id`)) as decimal(10,2)) - ((cast((sum((((`sd`.`sale_detail_qty` * `sd`.`sale_detail_unit_price`) * (1 - (`sd`.`sale_detail_dis_percent` / 100))) - `sd`.`sale_detail_dis_us`)) + `get_sale_note_summary`(`sm`.`sale_master_id`)) as decimal(10,2)) * `sm`.`sale_master_discount_percent`) / 100)) * (`sm`.`sale_master_member_discount` / 100))) as decimal(10,2)) AS `discount`,cast((((sum((`sd`.`sale_detail_qty` * `sd`.`sale_detail_unit_price`)) + `get_sale_note_summary`(`sm`.`sale_master_id`)) - (((((sum((((`sd`.`sale_detail_qty` * `sd`.`sale_detail_unit_price`) * (1 - (`sd`.`sale_detail_dis_percent` / 100))) - `sd`.`sale_detail_dis_us`)) + `get_sale_note_summary`(`sm`.`sale_master_id`)) * `sm`.`sale_master_discount_percent`) / 100) + sum((((`sd`.`sale_detail_qty` * `sd`.`sale_detail_unit_price`) * (`sd`.`sale_detail_dis_percent` / 100)) + `sd`.`sale_detail_dis_us`))) + (((sum((((`sd`.`sale_detail_qty` * `sd`.`sale_detail_unit_price`) * (1 - (`sd`.`sale_detail_dis_percent` / 100))) - `sd`.`sale_detail_dis_us`)) + `get_sale_note_summary`(`sm`.`sale_master_id`)) - (((sum((((`sd`.`sale_detail_qty` * `sd`.`sale_detail_unit_price`) * (1 - (`sd`.`sale_detail_dis_percent` / 100))) - `sd`.`sale_detail_dis_us`)) + `get_sale_note_summary`(`sm`.`sale_master_id`)) * `sm`.`sale_master_discount_percent`) / 100)) * (`sm`.`sale_master_member_discount` / 100)))) * (`sm`.`sale_master_tax` / 100)) as decimal(10,2)) AS `tax`,cast((sum((`sd`.`sale_detail_qty` * `sd`.`sale_detail_unit_price`)) + `get_sale_note_summary`(`sm`.`sale_master_id`)) as decimal(10,2)) AS `SubTotal`,cast((((sum((`sd`.`sale_detail_qty` * `sd`.`sale_detail_unit_price`)) + `get_sale_note_summary`(`sm`.`sale_master_id`)) - (((((sum((((`sd`.`sale_detail_qty` * `sd`.`sale_detail_unit_price`) * (1 - (`sd`.`sale_detail_dis_percent` / 100))) - `sd`.`sale_detail_dis_us`)) + `get_sale_note_summary`(`sm`.`sale_master_id`)) * `sm`.`sale_master_discount_percent`) / 100) + sum((((`sd`.`sale_detail_qty` * `sd`.`sale_detail_unit_price`) * (`sd`.`sale_detail_dis_percent` / 100)) + `sd`.`sale_detail_dis_us`))) + (((sum((((`sd`.`sale_detail_qty` * `sd`.`sale_detail_unit_price`) * (1 - (`sd`.`sale_detail_dis_percent` / 100))) - `sd`.`sale_detail_dis_us`)) + `get_sale_note_summary`(`sm`.`sale_master_id`)) - (((sum((((`sd`.`sale_detail_qty` * `sd`.`sale_detail_unit_price`) * (1 - (`sd`.`sale_detail_dis_percent` / 100))) - `sd`.`sale_detail_dis_us`)) + `get_sale_note_summary`(`sm`.`sale_master_id`)) * `sm`.`sale_master_discount_percent`) / 100)) * (`sm`.`sale_master_member_discount` / 100)))) + (((sum((`sd`.`sale_detail_qty` * `sd`.`sale_detail_unit_price`)) + `get_sale_note_summary`(`sm`.`sale_master_id`)) - (((((sum((((`sd`.`sale_detail_qty` * `sd`.`sale_detail_unit_price`) * (1 - (`sd`.`sale_detail_dis_percent` / 100))) - `sd`.`sale_detail_dis_us`)) + `get_sale_note_summary`(`sm`.`sale_master_id`)) * `sm`.`sale_master_discount_percent`) / 100) + sum((((`sd`.`sale_detail_qty` * `sd`.`sale_detail_unit_price`) * (`sd`.`sale_detail_dis_percent` / 100)) + `sd`.`sale_detail_dis_us`))) + (((sum((((`sd`.`sale_detail_qty` * `sd`.`sale_detail_unit_price`) * (1 - (`sd`.`sale_detail_dis_percent` / 100))) - `sd`.`sale_detail_dis_us`)) + `get_sale_note_summary`(`sm`.`sale_master_id`)) - (((sum((((`sd`.`sale_detail_qty` * `sd`.`sale_detail_unit_price`) * (1 - (`sd`.`sale_detail_dis_percent` / 100))) - `sd`.`sale_detail_dis_us`)) + `get_sale_note_summary`(`sm`.`sale_master_id`)) * `sm`.`sale_master_discount_percent`) / 100)) * (`sm`.`sale_master_member_discount` / 100)))) * (`sm`.`sale_master_tax` / 100))) as decimal(10,2)) AS `grandtotal`,`sm`.`sale_master_pay_us` AS `sale_master_pay_us`,`sm`.`sale_master_pay_kh` AS `sale_master_pay_kh`,`sm`.`sale_master_account_type` AS `account_type_id`,`ac`.`acc_type` AS `acc_type`,`sm`.`sale_master_other_card` AS `other_card_pay`,`sm`.`sale_master_member_discount` AS `sale_master_member_discount`,`sm`.`sale_master_member_pay` AS `member_pay`,`sm`.`sale_master_status` AS `sale_master_status`,`sm`.`sale_master_exchange_rate` AS `ex_rate` from (((((((((`sale_master` `sm` join `sale_detail` `sd` on((`sm`.`sale_master_id` = `sd`.`sale_master_id`))) left join `employee` `em` on((`em`.`employee_id` = `sm`.`sale_master_cashier_id`))) left join `item_detail` `idt` on((`idt`.`item_detail_id` = `sd`.`sale_detail_item_id`))) left join `customer` `cs` on((`cs`.`customer_id` = `sm`.`sale_master_customer_id`))) left join `customer_type` `ct` on((`ct`.`customer_type_id` = `cs`.`customer_type_id`))) left join `floor_table_layout` `ftl` on((`sm`.`sale_master_layout_id` = `ftl`.`layout_id`))) left join `floor` `fl` on((`ftl`.`floor_id` = `fl`.`floor_id`))) left join `account_type` `ac` on((`sm`.`sale_master_account_type` = `ac`.`acc_type_id`))) join `branch` `br` on((`sm`.`sale_master_branch_id` = `br`.`branch_id`))) where ((`sm`.`sale_master_status` = 2) and (`sd`.`sale_detail_status` = 1)) group by `sm`.`sale_master_id`;


-- Dumping structure for view rms_web_basic.v_shift
DROP VIEW IF EXISTS `v_shift`;
-- Removing temporary table and create final VIEW structure
DROP TABLE IF EXISTS `v_shift`;
CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` SQL SECURITY DEFINER VIEW `v_shift` AS select `s`.`shift_id` AS `shift_id`,`s`.`shift_name` AS `shift_name`,`s`.`shift_from` AS `shift_from`,`s`.`shift_until` AS `shift_until`,`s`.`shift_note` AS `shift_note`,`e`.`employee_name` AS `recorder`,`s`.`shift_created_date` AS `date_entry`,`s`.`shift_modified_date` AS `shift_modified_date` from (`shift` `s` left join `employee` `e` on((`s`.`shift_created_by` = `e`.`employee_id`)));


-- Dumping structure for view rms_web_basic.v_stock
DROP VIEW IF EXISTS `v_stock`;
-- Removing temporary table and create final VIEW structure
DROP TABLE IF EXISTS `v_stock`;
CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` SQL SECURITY DEFINER VIEW `v_stock` AS select `s`.`stock_id` AS `stock_id`,`b`.`branch_name` AS `branch_name`,`sl`.`stock_location_name` AS `stock_location_name`,`s`.`stock_item_id` AS `stock_item_id`,`im`.`item_detail_name` AS `item_detail_name`,`s`.`stock_qty` AS `stock_qty`,`s`.`stock_costing` AS `stock_costing_by_measure_qty`,(`s`.`stock_costing` * `s`.`stock_qty`) AS `total_costing_by_measure_qty`,`m`.`measure_qty` AS `measure_qty`,`m`.`measure_note` AS `measure_note`,`m`.`measure_name` AS `measure_name`,`s`.`stock_expire_date` AS `stock_expire_date`,`s`.`stock_alert_date` AS `stock_alert_date`,`s`.`stock_modified_date` AS `stock_modified_date`,`s`.`stock_modified_by` AS `stock_modified_by`,`s`.`stock_created_date` AS `stock_created_date`,`s`.`stock_created_by` AS `stock_created_by`,`s`.`stock_location_id` AS `stock_location_id`,`s`.`measure_id` AS `measure_id`,`s`.`branch_id` AS `branch_id`,`it`.`item_type_name` AS `item_type_name`,`it`.`item_type_id` AS `item_type_id`,`im`.`item_detail_part_number` AS `item_detail_part_number` from (((((`stock` `s` join `item_detail` `im` on((`s`.`stock_item_id` = `im`.`item_detail_id`))) join `branch` `b` on((`b`.`branch_id` = `s`.`branch_id`))) left join `measure` `m` on((`m`.`measure_id` = `s`.`measure_id`))) join `stock_location` `sl` on((`sl`.`stock_location_id` = `s`.`stock_location_id`))) join `item_type` `it` on((`it`.`item_type_id` = `im`.`item_type_id`))) where (`im`.`item_detail_status` = 1);


-- Dumping structure for view rms_web_basic.v_stock2
DROP VIEW IF EXISTS `v_stock2`;
-- Removing temporary table and create final VIEW structure
DROP TABLE IF EXISTS `v_stock2`;
CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` SQL SECURITY DEFINER VIEW `v_stock2` AS select `s`.`stock_id` AS `stock_id`,`b`.`branch_name` AS `branch_name`,`sl`.`stock_location_name` AS `stock_location_name`,`s`.`stock_item_id` AS `stock_item_id`,`im`.`item_detail_name` AS `item_detail_name`,`s`.`stock_qty` AS `stock_qty`,`s`.`stock_costing` AS `stock_costing_by_measure_qty`,(`s`.`stock_costing` * `s`.`stock_qty`) AS `total_costing_by_measure_qty`,`m`.`measure_qty` AS `measure_qty`,`m`.`measure_note` AS `measure_note`,`m`.`measure_name` AS `measure_name`,`s`.`stock_expire_date` AS `stock_expire_date`,`s`.`stock_alert_date` AS `stock_alert_date`,`s`.`stock_modified_date` AS `stock_modified_date`,`s`.`stock_modified_by` AS `stock_modified_by`,`s`.`stock_created_date` AS `stock_created_date`,`s`.`stock_created_by` AS `stock_created_by`,`s`.`stock_location_id` AS `stock_location_id`,`s`.`measure_id` AS `measure_id`,`s`.`branch_id` AS `branch_id`,`it`.`item_type_name` AS `item_type_name`,`it`.`item_type_id` AS `item_type_id`,`im`.`item_detail_part_number` AS `item_detail_part_number` from (((((`stock` `s` join `item_detail` `im` on((`s`.`stock_item_id` = `im`.`item_detail_id`))) join `branch` `b` on((`b`.`branch_id` = `s`.`branch_id`))) left join `measure` `m` on((`m`.`measure_id` = `s`.`measure_id`))) join `stock_location` `sl` on((`sl`.`stock_location_id` = `s`.`stock_location_id`))) join `item_type` `it` on((`it`.`item_type_id` = `im`.`item_type_id`))) where (`im`.`item_detail_status` = 1);


-- Dumping structure for view rms_web_basic.v_stock_adjust
DROP VIEW IF EXISTS `v_stock_adjust`;
-- Removing temporary table and create final VIEW structure
DROP TABLE IF EXISTS `v_stock_adjust`;
CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` SQL SECURITY DEFINER VIEW `v_stock_adjust` AS select `sa`.`stock_adjust_id` AS `stock_adjust_id`,`sa`.`stock_adjust_item_id` AS `stock_adjust_item_id`,`sa`.`measure_id` AS `measure_id`,`im`.`item_detail_part_number` AS `item_detail_part_number`,`im`.`item_detail_name` AS `item_detail_name`,`b`.`branch_name` AS `branch_name`,`b`.`branch_id` AS `branch_id`,`sa`.`stock_adjust_qty` AS `stock_adjust_qty`,`sa`.`stock_adjust_note` AS `stock_adjust_note`,`m`.`measure_name` AS `measure_name`,`sa`.`stock_adjust_created_date` AS `date_entry`,`sa`.`stock_adjust_modified_date` AS `date_modified`,`e`.`employee_name` AS `recorder`,`sl`.`stock_location_name` AS `stock_location_name`,`sa`.`stock_location_id` AS `stock_location_id` from (((((`stock_adjust` `sa` join `item_detail` `im` on((`im`.`item_detail_id` = `sa`.`stock_adjust_item_id`))) join `branch` `b` on((`sa`.`stock_adjust_branch_id` = `b`.`branch_id`))) left join `measure` `m` on((`sa`.`measure_id` = `m`.`measure_id`))) join `employee` `e` on((`sa`.`stock_adjust_created_by` = `e`.`employee_id`))) join `stock_location` `sl` on((`sa`.`stock_location_id` = `sl`.`stock_location_id`)));


-- Dumping structure for view rms_web_basic.v_stock_detail
DROP VIEW IF EXISTS `v_stock_detail`;
-- Removing temporary table and create final VIEW structure
DROP TABLE IF EXISTS `v_stock_detail`;
CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` SQL SECURITY DEFINER VIEW `v_stock_detail` AS select `s`.`stock_id` AS `stock_id`,`ip`.`item_type_name` AS `item_type_name`,`ip`.`item_type_id` AS `item_type_id`,`it`.`item_detail_name` AS `item_detail_name`,`it`.`item_detail_id` AS `item_detail_id`,`it`.`item_detail_part_number` AS `item_detail_part_number`,`it`.`item_detail_remain_alert` AS `item_detail_remain_alert`,format(`it`.`item_detail_retail_price`,2) AS `item_detail_retail_price`,format(`it`.`item_detail_whole_price`,2) AS `item_detail_whole_price`,`s`.`stock_qty` AS `stock_qty`,format(`pd`.`purchase_detail_unit_cost`,2) AS `purchase_detail_unit_cost`,format((`s`.`stock_qty` * `pd`.`purchase_detail_unit_cost`),2) AS `total`,`e`.`employee_name` AS `recorder`,`e`.`employee_id` AS `employee_id`,`bn`.`branch_name` AS `branch_name`,`bn`.`branch_id` AS `branch_id`,`sl`.`stock_location_name` AS `stock_location_name`,`sl`.`stock_location_id` AS `stock_location_id` from ((((((`stock` `s` join `item_detail` `it` on((`s`.`stock_item_id` = `it`.`item_detail_id`))) join `item_type` `ip` on((`it`.`item_type_id` = `ip`.`item_type_id`))) join `purchase_detail` `pd` on((`s`.`stock_item_id` = `pd`.`purchase_detail_item_detail_id`))) join `employee` `e` on((`s`.`stock_created_by` = `e`.`employee_id`))) join `branch` `bn` on((`s`.`branch_id` = `bn`.`branch_id`))) join `stock_location` `sl` on((`s`.`stock_location_id` = `sl`.`stock_location_id`))) group by `it`.`item_detail_id`,`sl`.`stock_location_id`;


-- Dumping structure for view rms_web_basic.v_stock_in_out
DROP VIEW IF EXISTS `v_stock_in_out`;
-- Removing temporary table and create final VIEW structure
DROP TABLE IF EXISTS `v_stock_in_out`;
CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` SQL SECURITY DEFINER VIEW `v_stock_in_out` AS select `st`.`stock_item_id` AS `stock_item_id`,`it`.`item_detail_part_number` AS `item_detail_part_number`,`it`.`item_detail_name` AS `item_detail_name`,`ity`.`item_type_id` AS `item_type_id`,`ity`.`item_type_name` AS `item_type_name`,`st`.`stock_location_id` AS `stock_location_id`,`st`.`branch_id` AS `branch_id`,`b`.`branch_name` AS `branch_name`,`saj`.`stock_adjust_created_date` AS `stock_adjust_created_date`,ifnull((select sum(`s`.`sale_detail_qty`) from (`sale_detail` `s` join `sale_master` `sm`) where ((`st`.`stock_item_id` = `s`.`sale_detail_item_id`) and (`sm`.`sale_master_id` = `s`.`sale_master_id`))),0) AS `sold_qty`,ifnull((select sum(`stock_waste`.`stock_waste_qty`) from `stock_waste` where ((`stock_waste`.`stock_waste_item_id` = `st`.`stock_item_id`) and (`stock_waste`.`stock_location_id` = `st`.`stock_location_id`))),0) AS `waste_qty`,ifnull((select sum(`stock_adjust`.`stock_adjust_qty`) from `stock_adjust` where ((`stock_adjust`.`stock_adjust_item_id` = `st`.`stock_item_id`) and (`stock_adjust`.`stock_location_id` = `st`.`stock_location_id`))),0) AS `increase_qty`,ifnull((select sum(`stock_transfer`.`stock_transffer_qty`) from `stock_transfer` where ((`stock_transfer`.`stock_transffer_item_detail_id` = `st`.`stock_item_id`) and (`stock_transfer`.`stock_transffer_location_from` = `st`.`stock_location_id`))),0) AS `transfer_qty`,`st`.`stock_qty` AS `stock_in_hand`,`st`.`stock_costing` AS `stock_costing`,(`st`.`stock_qty` * `st`.`stock_costing`) AS `total_stock_costing`,`sl`.`stock_location_name` AS `stock_location_name`,`m`.`measure_name` AS `measure_name` from ((((((`stock` `st` left join `item_detail` `it` on((`st`.`stock_item_id` = `it`.`item_detail_id`))) left join `item_type` `ity` on((`it`.`item_type_id` = `ity`.`item_type_id`))) left join `stock_location` `sl` on((`st`.`stock_location_id` = `sl`.`stock_location_id`))) left join `measure` `m` on((`st`.`measure_id` = `m`.`measure_id`))) left join `branch` `b` on((`st`.`branch_id` = `b`.`branch_id`))) left join `stock_adjust` `saj` on((`st`.`measure_id` = `saj`.`stock_adjust_id`)));


-- Dumping structure for view rms_web_basic.v_stock_location
DROP VIEW IF EXISTS `v_stock_location`;
-- Removing temporary table and create final VIEW structure
DROP TABLE IF EXISTS `v_stock_location`;
CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` SQL SECURITY DEFINER VIEW `v_stock_location` AS select `sl`.`stock_location_id` AS `stock_location_id`,`sl`.`stock_location_name` AS `stock_location_name`,`sl`.`stock_location_created_date` AS `stock_location_created_date`,`sl`.`stock_location_modified_date` AS `stock_location_modified_date`,`sl`.`stock_location_note` AS `stock_location_note`,`b`.`branch_id` AS `branch_id`,`b`.`branch_name` AS `branch_name`,`e`.`employee_name` AS `recorder`,`sl`.`status` AS `status` from ((`stock_location` `sl` join `employee` `e` on((`sl`.`stock_location_created_by` = `e`.`employee_id`))) join `branch` `b` on((`sl`.`stock_location_branch_id` = `b`.`branch_id`))) order by `sl`.`stock_location_id` desc;


-- Dumping structure for view rms_web_basic.v_stock_summary
DROP VIEW IF EXISTS `v_stock_summary`;
-- Removing temporary table and create final VIEW structure
DROP TABLE IF EXISTS `v_stock_summary`;
CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` SQL SECURITY DEFINER VIEW `v_stock_summary` AS select `st`.`stock_item_id` AS `stock_item_id`,`im`.`item_detail_part_number` AS `part_num`,`im`.`item_detail_name` AS `item`,`im`.`item_type_id` AS `item_type_id`,`it`.`item_type_name` AS `item_type`,`st`.`branch_id` AS `branch_id`,`b`.`branch_name` AS `branch_name`,sum(`st`.`stock_qty`) AS `qty`,`st`.`stock_location_id` AS `stock_location_id`,`sl`.`stock_location_name` AS `stock_location_name`,sum((`st`.`stock_costing` * `st`.`stock_qty`)) AS `total_costing` from ((((`stock` `st` left join `item_detail` `im` on((`im`.`item_detail_id` = `st`.`stock_item_id`))) left join `item_type` `it` on((`it`.`item_type_id` = `im`.`item_type_id`))) left join `stock_location` `sl` on((`sl`.`stock_location_id` = `st`.`stock_location_id`))) left join `branch` `b` on((`b`.`branch_id` = `st`.`branch_id`))) where (`im`.`item_detail_status` = 1) group by `st`.`stock_item_id`,`st`.`branch_id`,`st`.`stock_location_id`;


-- Dumping structure for view rms_web_basic.v_stock_transfered
DROP VIEW IF EXISTS `v_stock_transfered`;
-- Removing temporary table and create final VIEW structure
DROP TABLE IF EXISTS `v_stock_transfered`;
CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` SQL SECURITY DEFINER VIEW `v_stock_transfered` AS select `st`.`stock_transffer_id` AS `stock_transffer_id`,`slf`.`stock_location_name` AS `stock_location_from`,`st`.`stock_transffer_branch_id_to` AS `stock_transffer_branch_id_to`,`st`.`stock_transffer_branch_id_from` AS `stock_transffer_branch_id_from`,`st`.`stock_transffer_location_from` AS `stock_transffer_location_from`,`st`.`stock_transffer_location_to` AS `stock_transffer_location_to`,`slt`.`stock_location_name` AS `stock_location_to`,`bf`.`branch_name` AS `from_branch`,`bt`.`branch_name` AS `to_branch`,`e`.`employee_name` AS `transfer_by`,`im`.`item_detail_part_number` AS `item_detail_part_number`,`st`.`stock_transffer_item_detail_id` AS `stock_transffer_item_detail_id`,`im`.`item_detail_name` AS `item_detail_name`,`st`.`stock_transffer_qty` AS `stock_transffer_qty`,(`st`.`stock_transffer_qty` * `st`.`stock_transffer_measure_qty`) AS `total_qty`,`m`.`measure_name` AS `measure_name`,`st`.`stock_transffer_status` AS `stock_transffer_status`,`st`.`stock_transffer_created_date` AS `stock_transffer_created_date`,`st`.`stock_transffer_modified_date` AS `stock_transffer_modified_date`,`st`.`stock_transffer_note` AS `stock_transffer_note` from (((((((`stock_transfer` `st` join `item_detail` `im` on((`st`.`stock_transffer_item_detail_id` = `im`.`item_detail_id`))) join `branch` `bf` on((`bf`.`branch_id` = `st`.`stock_transffer_branch_id_from`))) join `branch` `bt` on((`bt`.`branch_id` = `st`.`stock_transffer_branch_id_to`))) join `employee` `e` on((`e`.`employee_id` = `st`.`stock_transffer_created_by`))) join `stock_location` `slf` on((`slf`.`stock_location_id` = `st`.`stock_transffer_location_from`))) join `stock_location` `slt` on((`slt`.`stock_location_id` = `st`.`stock_transffer_location_to`))) left join `measure` `m` on((`m`.`measure_id` = `st`.`stock_transffer_measure_id`))) order by `st`.`stock_transffer_id` desc;


-- Dumping structure for view rms_web_basic.v_stock_waste
DROP VIEW IF EXISTS `v_stock_waste`;
-- Removing temporary table and create final VIEW structure
DROP TABLE IF EXISTS `v_stock_waste`;
CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` SQL SECURITY DEFINER VIEW `v_stock_waste` AS select `sw`.`stock_waste_id` AS `stock_waste_id`,`sw`.`stock_waste_item_id` AS `stock_waste_item_id`,`sw`.`measure_id` AS `measure_id`,`im`.`item_detail_part_number` AS `item_detail_part_number`,`im`.`item_detail_name` AS `item_detail_name`,`b`.`branch_name` AS `branch_name`,`b`.`branch_id` AS `branch_id`,`sw`.`stock_waste_qty` AS `stock_waste_qty`,`sw`.`stock_waste_note` AS `stock_waste_note`,`m`.`measure_name` AS `measure_name`,`sw`.`stock_waste_created_date` AS `date_entry`,`sw`.`stock_waste_modified_date` AS `date_modified`,`e`.`employee_name` AS `recorder`,`sw`.`stock_location_id` AS `stock_location_id`,`sl`.`stock_location_name` AS `stock_location_name` from (((((`stock_waste` `sw` join `item_detail` `im` on((`im`.`item_detail_id` = `sw`.`stock_waste_item_id`))) join `branch` `b` on((`sw`.`stock_waste_branch_id` = `b`.`branch_id`))) left join `measure` `m` on((`sw`.`measure_id` = `m`.`measure_id`))) join `employee` `e` on((`sw`.`stock_waste_created_by` = `e`.`employee_id`))) join `stock_location` `sl` on((`sl`.`stock_location_id` = `sw`.`stock_location_id`)));


-- Dumping structure for view rms_web_basic.v_supplier
DROP VIEW IF EXISTS `v_supplier`;
-- Removing temporary table and create final VIEW structure
DROP TABLE IF EXISTS `v_supplier`;
CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` SQL SECURITY DEFINER VIEW `v_supplier` AS select `s`.`supplier_id` AS `supplier_id`,`s`.`supplier_name` AS `supplier_name`,`s`.`supplier_address` AS `supplier_address`,`s`.`supplier_phone` AS `supplier_phone`,`s`.`supplier_note` AS `supplier_note`,`s`.`supplier_created_date` AS `supplier_created_date`,`e`.`employee_name` AS `recorder`,`s`.`supplier_modified_date` AS `supplier_modified_date` from (`supplier` `s` join `employee` `e` on((`s`.`supplier_created_by` = `e`.`employee_id`))) where (`s`.`supplier_status` = 1);


-- Dumping structure for view rms_web_basic.v_user
DROP VIEW IF EXISTS `v_user`;
-- Removing temporary table and create final VIEW structure
DROP TABLE IF EXISTS `v_user`;
CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` SQL SECURITY DEFINER VIEW `v_user` AS select `u`.`user_id` AS `user_id`,`u`.`employee_id` AS `employee_id`,`e`.`employee_position_id` AS `employee_position_id`,`e`.`employee_name` AS `employee_name`,`e`.`employee_brand_id` AS `employee_brand_id`,`b`.`branch_name` AS `branch_name`,`u`.`user_name` AS `user_name`,`u`.`user_password` AS `user_password`,`e`.`employee_stock_location_id` AS `employee_stock_location_id`,`u`.`user_note` AS `user_note`,`pl`.`printer_location_name` AS `printer_location_name`,`u`.`user_printer_location_id` AS `user_printer_location_id`,`u`.`is_supper_user` AS `is_supper_user`,`u`.`status` AS `status` from (((`user` `u` join `employee` `e` on((`u`.`employee_id` = `e`.`employee_id`))) join `printer_location` `pl` on((`u`.`user_printer_location_id` = `pl`.`printer_location_id`))) join `branch` `b` on((`b`.`branch_id` = `e`.`employee_brand_id`))) where ((`u`.`status` = 1) and (`b`.`branch_status` = 1) and (`e`.`status` = 1));
/*!40101 SET SQL_MODE=IFNULL(@OLD_SQL_MODE, '') */;
/*!40014 SET FOREIGN_KEY_CHECKS=IF(@OLD_FOREIGN_KEY_CHECKS IS NULL, 1, @OLD_FOREIGN_KEY_CHECKS) */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
