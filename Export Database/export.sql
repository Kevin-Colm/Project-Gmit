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


-- Dumping database structure for gigguide
DROP DATABASE IF EXISTS `gigguide`;
CREATE DATABASE IF NOT EXISTS `gigguide` /*!40100 DEFAULT CHARACTER SET latin1 */;
USE `gigguide`;

-- Dumping structure for table gig`event`guide.band
DROP TABLE IF EXISTS `band`;
CREATE TABLE IF NOT EXISTS `band` (
  `id` int(11) NOT NULL,
  `name` varchar(200) DEFAULT NULL,
  `image` varchar(200) DEFAULT NULL,
  `bio` longtext,
  `rating` float DEFAULT NULL,
  PRIMARY KEY (`id`),
  CONSTRAINT `FK_band_users` FOREIGN KEY (`id`) REFERENCES `users` (`id`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- Dumping data for table gigguide.band: ~2 rows (approximately)
/*!40000 ALTER TABLE `band` DISABLE KEYS */;
INSERT INTO `band` (`id`, `name`, `image`, `bio`, `rating`) VALUES
	(41, 'Metallica', NULL, NULL, NULL),
	(42, 'Pearl Jam', NULL, NULL, NULL);
/*!40000 ALTER TABLE `band` ENABLE KEYS */;

-- Dumping structure for table gigguide.customer
DROP TABLE IF EXISTS `customer`;
CREATE TABLE IF NOT EXISTS `customer` (
  `id` int(11) NOT NULL,
  `name` varchar(50) DEFAULT NULL,
  `image` varchar(200) DEFAULT NULL,
  PRIMARY KEY (`id`),
  CONSTRAINT `FK_customer_users` FOREIGN KEY (`id`) REFERENCES `users` (`id`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- Dumping data for table gigguide.customer: ~2 rows (approximately)
/*!40000 ALTER TABLE `customer` DISABLE KEYS */;
INSERT INTO `customer` (`id`, `name`, `image`) VALUES
	(37, 'Frank Bruno', 'Images/PegSolitaire_1000.gif'),
	(39, 'johhhny 5er', 'Images/thubmnail.png');
/*!40000 ALTER TABLE `customer` ENABLE KEYS */;

-- Dumping structure for table gigguide.event
DROP TABLE IF EXISTS `event`;
CREATE TABLE IF NOT EXISTS `event` (
  `venueId` int(11) DEFAULT NULL,
  `rateVenue` float DEFAULT NULL,
  `rateBand` float DEFAULT NULL,
  `review` longtext,
  `description` longtext,
  `date` date DEFAULT NULL,
  `bandId` int(11) DEFAULT NULL,
  `name` varchar(250) DEFAULT NULL,
  KEY `FK_event_venue` (`venueId`),
  KEY `FK_event_band` (`bandId`),
  CONSTRAINT `FK_event_band` FOREIGN KEY (`bandId`) REFERENCES `band` (`id`),
  CONSTRAINT `FK_event_venue` FOREIGN KEY (`venueId`) REFERENCES `venue` (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- Dumping data for table gigguide.event: ~3 rows (approximately)
/*!40000 ALTER TABLE `event` DISABLE KEYS */;
INSERT INTO `event` (`venueId`, `rateVenue`, `rateBand`, `review`, `description`, `date`, `bandId`, `name`) VALUES
	(36, NULL, NULL, NULL, 'dfgdfgdfgdfgdf', '2018-03-19', NULL, 'sfgfgdfgdfg'),
	(36, NULL, NULL, NULL, 'Dropdown added to the form', '2018-03-23', NULL, 'another test of event'),
	(36, NULL, NULL, NULL, 'Dropdown added to the form', '2018-03-23', NULL, 'another test of event'),
	(36, NULL, NULL, NULL, 'dfgdfgdfgdfgdf', '2018-03-19', NULL, 'sfgfgdfgdfg'),
	(36, NULL, NULL, NULL, 'Dropdown added to the form', '2018-03-23', NULL, 'another test of event'),
	(36, NULL, NULL, NULL, 'Dropdown added to the form', '2018-03-23', NULL, 'another test of event'),
	(36, NULL, NULL, NULL, 'sdgsdgsdgs', '2018-03-22', NULL, 'sdgsdgdsg'),
	(36, NULL, NULL, NULL, 'dfgdfgdfgdfgdf', '2018-03-19', NULL, 'sfgfgdfgdfg'),
	(36, NULL, NULL, NULL, 'Dropdown added to the form', '2018-03-23', NULL, 'another test of event'),
	(36, NULL, NULL, NULL, 'Dropdown added to the form', '2018-03-23', NULL, 'another test of event');
/*!40000 ALTER TABLE `event` ENABLE KEYS */;

-- Dumping structure for table gigguide.ratings
DROP TABLE IF EXISTS `ratings`;
CREATE TABLE IF NOT EXISTS `ratings` (
  `bandId` int(11) DEFAULT NULL,
  `venueId` int(11) DEFAULT NULL,
  `rating` float DEFAULT NULL,
  KEY `FK_ratings_band` (`bandId`),
  KEY `FK_ratings_venue` (`venueId`),
  CONSTRAINT `FK_ratings_band` FOREIGN KEY (`bandId`) REFERENCES `band` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  CONSTRAINT `FK_ratings_venue` FOREIGN KEY (`venueId`) REFERENCES `venue` (`id`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- Dumping data for table gigguide.ratings: ~0 rows (approximately)
/*!40000 ALTER TABLE `ratings` DISABLE KEYS */;
/*!40000 ALTER TABLE `ratings` ENABLE KEYS */;

-- Dumping structure for table gigguide.users
DROP TABLE IF EXISTS `users`;
CREATE TABLE IF NOT EXISTS `users` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `username` varchar(50) DEFAULT NULL,
  `userPassword` varchar(50) DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `username` (`username`)
) ENGINE=InnoDB AUTO_INCREMENT=43 DEFAULT CHARSET=latin1;

-- Dumping data for table gigguide.users: ~7 rows (approximately)
/*!40000 ALTER TABLE `users` DISABLE KEYS */;
INSERT INTO `users` (`id`, `username`, `userPassword`) VALUES
	(36, 'kevin', '1111'),
	(37, 'frank', '1111'),
	(38, 'dave', '1111'),
	(39, 'jhonny5', '1111'),
	(40, 'harold', '1111'),
	(41, 'greg', '1111'),
	(42, 'Karl', '1111');
/*!40000 ALTER TABLE `users` ENABLE KEYS */;

-- Dumping structure for table gigguide.usertype
DROP TABLE IF EXISTS `usertype`;
CREATE TABLE IF NOT EXISTS `usertype` (
  `id` int(11) DEFAULT NULL,
  `type` varchar(50) DEFAULT NULL,
  UNIQUE KEY `id` (`id`),
  CONSTRAINT `FK_usertype_users` FOREIGN KEY (`id`) REFERENCES `users` (`id`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- Dumping data for table gigguide.usertype: ~7 rows (approximately)
/*!40000 ALTER TABLE `usertype` DISABLE KEYS */;
INSERT INTO `usertype` (`id`, `type`) VALUES
	(36, 'venue'),
	(37, 'customer'),
	(38, 'venue'),
	(39, 'customer'),
	(40, 'venue'),
	(41, 'band'),
	(42, 'band');
/*!40000 ALTER TABLE `usertype` ENABLE KEYS */;

-- Dumping structure for table gigguide.venue
DROP TABLE IF EXISTS `venue`;
CREATE TABLE IF NOT EXISTS `venue` (
  `id` int(11) NOT NULL,
  `name` varchar(250) DEFAULT NULL,
  `address` mediumtext,
  `image` varchar(200) DEFAULT NULL,
  `description` longtext,
  `rating` float DEFAULT NULL,
  PRIMARY KEY (`id`),
  CONSTRAINT `FK_venue_users` FOREIGN KEY (`id`) REFERENCES `users` (`id`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- Dumping data for table gigguide.venue: ~3 rows (approximately)
/*!40000 ALTER TABLE `venue` DISABLE KEYS */;
INSERT INTO `venue` (`id`, `name`, `address`, `image`, `description`, `rating`) VALUES
	(36, 'kevin gleeson', NULL, 'Images/logo.png', NULL, NULL),
	(38, 'dave rave', NULL, 'Images/PegSolitaire_1000.gif', NULL, NULL),
	(40, NULL, NULL, NULL, NULL, NULL);
/*!40000 ALTER TABLE `venue` ENABLE KEYS */;

/*!40101 SET SQL_MODE=IFNULL(@OLD_SQL_MODE, '') */;
/*!40014 SET FOREIGN_KEY_CHECKS=IF(@OLD_FOREIGN_KEY_CHECKS IS NULL, 1, @OLD_FOREIGN_KEY_CHECKS) */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
