-- --------------------------------------------------------
-- Host:                         127.0.0.1
-- Server version:               5.7.19 - MySQL Community Server (GPL)
-- Server OS:                    Win64
-- HeidiSQL Version:             9.5.0.5196
-- --------------------------------------------------------

/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET NAMES utf8 */;
/*!50503 SET NAMES utf8mb4 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;

DROP DATABASE gigguide;
-- Dumping database structure for gigguide
CREATE DATABASE IF NOT EXISTS `gigguide` /*!40100 DEFAULT CHARACTER SET latin1 */;
USE `gigguide`;

-- Dumping structure for table gigguide.band
CREATE TABLE IF NOT EXISTS `band` (
  `type` varchar(200) NOT NULL DEFAULT 'band',
  `name` varchar(200) NOT NULL DEFAULT '',
  `image` varchar(200) NOT NULL DEFAULT '',
  `bio` varchar(2000) NOT NULL DEFAULT '',
  `id` int(11) NOT NULL,
  KEY `Band_fk0` (`type`),
  KEY `Band_fk1` (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

-- Dumping data for table gigguide.band: 1 rows
/*!40000 ALTER TABLE `band` DISABLE KEYS */;
INSERT INTO `band` (`type`, `name`, `image`, `bio`, `id`) VALUES
	('band', '', '', '', 1);
/*!40000 ALTER TABLE `band` ENABLE KEYS */;

-- Dumping structure for table gigguide.customer
CREATE TABLE IF NOT EXISTS `customer` (
  `type` varchar(200) NOT NULL DEFAULT 'customer',
  `name` varchar(200) NOT NULL DEFAULT '""',
  `image` varchar(200) NOT NULL DEFAULT '""',
  `review` varchar(2000) NOT NULL DEFAULT '""',
  `rating` float NOT NULL DEFAULT '0',
  `id` int(11) NOT NULL,
  KEY `Customer_fk0` (`type`),
  KEY `Customer_fk1` (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

-- Dumping data for table gigguide.customer: 2 rows
/*!40000 ALTER TABLE `customer` DISABLE KEYS */;
INSERT INTO `customer` (`type`, `name`, `image`, `review`, `rating`, `id`) VALUES
	('customer', '', '', '', 0, 1),
	('customer', '', '', '', 0, 2);
/*!40000 ALTER TABLE `customer` ENABLE KEYS */;

-- Dumping structure for table gigguide.event
CREATE TABLE IF NOT EXISTS `event` (
  `date` date NOT NULL,
  `time` time NOT NULL,
  `price` float NOT NULL DEFAULT '0',
  `band` varchar(200) NOT NULL DEFAULT 'band',
  `venu` varchar(200) NOT NULL DEFAULT 'venu',
  `description` varchar(2000) NOT NULL DEFAULT '',
  KEY `Event_fk0` (`band`),
  KEY `Event_fk1` (`venu`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

-- Dumping data for table gigguide.event: 0 rows
/*!40000 ALTER TABLE `event` DISABLE KEYS */;
/*!40000 ALTER TABLE `event` ENABLE KEYS */;

-- Dumping structure for table gigguide.users
CREATE TABLE IF NOT EXISTS `users` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `userName` varchar(200) NOT NULL,
  `userPassword` varchar(200) NOT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `userName` (`userName`)
) ENGINE=MyISAM AUTO_INCREMENT=3 DEFAULT CHARSET=latin1;

-- Dumping data for table gigguide.users: 2 rows
/*!40000 ALTER TABLE `users` DISABLE KEYS */;
INSERT INTO `users` (`id`, `userName`, `userPassword`) VALUES
	(1, 'Kevin', '1111'),
	(2, 'john', '1111');
/*!40000 ALTER TABLE `users` ENABLE KEYS */;

-- Dumping structure for table gigguide.usertype
CREATE TABLE IF NOT EXISTS `usertype` (
  `type` varchar(200) NOT NULL DEFAULT '',
  `id` int(11) NOT NULL,
  PRIMARY KEY (`type`),
  KEY `UserType_fk0` (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

-- Dumping data for table gigguide.usertype: 3 rows
/*!40000 ALTER TABLE `usertype` DISABLE KEYS */;
INSERT INTO `usertype` (`type`, `id`) VALUES
	('customer', 2),
	('band', 1),
	('venue', 1);
/*!40000 ALTER TABLE `usertype` ENABLE KEYS */;

-- Dumping structure for table gigguide.venue
CREATE TABLE IF NOT EXISTS `venue` (
  `type` varchar(200) NOT NULL DEFAULT 'venu',
  `name` varchar(200) NOT NULL DEFAULT '',
  `address` varchar(800) NOT NULL DEFAULT '',
  `image` varchar(800) NOT NULL DEFAULT '',
  `description` varchar(2000) NOT NULL DEFAULT '',
  `id` int(11) NOT NULL,
  UNIQUE KEY `name` (`name`),
  UNIQUE KEY `address` (`address`),
  KEY `Venu_fk0` (`type`),
  KEY `Venu_fk1` (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

-- Dumping data for table gigguide.venue: 1 rows
/*!40000 ALTER TABLE `venue` DISABLE KEYS */;
INSERT INTO `venue` (`type`, `name`, `address`, `image`, `description`, `id`) VALUES
	('venu', '', '', '', '', 1);
/*!40000 ALTER TABLE `venue` ENABLE KEYS */;

/*!40101 SET SQL_MODE=IFNULL(@OLD_SQL_MODE, '') */;
/*!40014 SET FOREIGN_KEY_CHECKS=IF(@OLD_FOREIGN_KEY_CHECKS IS NULL, 1, @OLD_FOREIGN_KEY_CHECKS) */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
