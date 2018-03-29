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
CREATE DATABASE IF NOT EXISTS `gigguide` /*!40100 DEFAULT CHARACTER SET latin1 */;
USE `gigguide`;

-- Dumping structure for table gigguide.band
CREATE TABLE IF NOT EXISTS `band` (
  `id` int(11) NOT NULL,
  `name` varchar(200) DEFAULT NULL,
  `image` varchar(200) DEFAULT NULL,
  `bio` longtext,
  `rating` double DEFAULT NULL,
  PRIMARY KEY (`id`),
  CONSTRAINT `FK_band_users` FOREIGN KEY (`id`) REFERENCES `users` (`id`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- Dumping data for table gigguide.band: ~0 rows (approximately)
/*!40000 ALTER TABLE `band` DISABLE KEYS */;
/*!40000 ALTER TABLE `band` ENABLE KEYS */;

-- Dumping structure for table gigguide.customer
CREATE TABLE IF NOT EXISTS `customer` (
  `id` int(11) NOT NULL,
  `bio` longtext,
  `name` varchar(50) DEFAULT NULL,
  `image` varchar(200) DEFAULT NULL,
  PRIMARY KEY (`id`),
  CONSTRAINT `FK_customer_users` FOREIGN KEY (`id`) REFERENCES `users` (`id`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- Dumping data for table gigguide.customer: ~10 rows (approximately)
/*!40000 ALTER TABLE `customer` DISABLE KEYS */;
INSERT INTO `customer` (`id`, `bio`, `name`, `image`) VALUES
	(45, 'Hello my name is Kevin.', 'Kevin Gleeson', 'Images/random-user_imageM36.jpg'),
	(46, 'Hi My name is John.', 'John Kelly', 'Images/random-user_imageM44.jpg'),
	(47, 'Hi My name is Michelle.', 'Michelle Marley', 'Images/random-user_imageF35.jpg'),
	(48, 'Hello My name is Jackie.', 'Jackie Kennedy', 'Images/random-user_imageF45.jpg'),
	(49, 'Hello there my name is Frank Boyle.', 'Frank Boyle', 'Images/random-user_imageM42.jpg'),
	(50, 'Hello my name is David.', 'David Madden', 'Images/random-user_imageM40.jpg'),
	(51, 'Hello My Name is Francis.', 'Francis Black', 'Images/random-user_imageF12.jpg'),
	(52, 'Hello My name is Rory', 'Rory Magin', 'Images/random-user_imageM29.jpg'),
	(53, 'Hello My name is Bridey.', 'Bridey Murphy', 'Images/random-user_imageF9.jpg'),
	(54, 'Hi My name is Jannett.', 'Jannett Conlan', 'Images/random-user_imageF16.jpg');
/*!40000 ALTER TABLE `customer` ENABLE KEYS */;

-- Dumping structure for table gigguide.event
CREATE TABLE IF NOT EXISTS `event` (
  `venueId` int(11) DEFAULT NULL,
  `rateVenue` float DEFAULT NULL,
  `rateBand` float DEFAULT NULL,
  `review` longtext,
  `description` longtext,
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `date` date DEFAULT NULL,
  `bandId` int(11) DEFAULT NULL,
  `name` varchar(250) DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `FK_event_venue` (`venueId`),
  KEY `FK_event_band` (`bandId`),
  CONSTRAINT `FK_event_band` FOREIGN KEY (`bandId`) REFERENCES `band` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  CONSTRAINT `FK_event_venue` FOREIGN KEY (`venueId`) REFERENCES `venue` (`id`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=latin1;

-- Dumping data for table gigguide.event: ~0 rows (approximately)
/*!40000 ALTER TABLE `event` DISABLE KEYS */;
/*!40000 ALTER TABLE `event` ENABLE KEYS */;

-- Dumping structure for table gigguide.ratings
CREATE TABLE IF NOT EXISTS `ratings` (
  `rating` double DEFAULT NULL,
  `id` int(11) DEFAULT NULL,
  KEY `id` (`id`),
  CONSTRAINT `FK_ratings_usertype` FOREIGN KEY (`id`) REFERENCES `usertype` (`id`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- Dumping data for table gigguide.ratings: ~0 rows (approximately)
/*!40000 ALTER TABLE `ratings` DISABLE KEYS */;
/*!40000 ALTER TABLE `ratings` ENABLE KEYS */;

-- Dumping structure for table gigguide.users
CREATE TABLE IF NOT EXISTS `users` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `username` varchar(50) DEFAULT NULL,
  `userPassword` varchar(50) DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `username` (`username`)
) ENGINE=InnoDB AUTO_INCREMENT=59 DEFAULT CHARSET=latin1;

-- Dumping data for table gigguide.users: ~14 rows (approximately)
/*!40000 ALTER TABLE `users` DISABLE KEYS */;
INSERT INTO `users` (`id`, `username`, `userPassword`) VALUES
	(45, 'kevin', '1111'),
	(46, 'John', '1111'),
	(47, 'Michelle', '1111'),
	(48, 'Jackie', '1111'),
	(49, 'Frank', '1111'),
	(50, 'David', '1111'),
	(51, 'Francis', '1111'),
	(52, 'Rory', '1111'),
	(53, 'Bridey', '1111'),
	(54, 'Jannett', '1111'),
	(55, 'vicar', '1111'),
	(56, 'three', '1111'),
	(57, 'rosin', '1111'),
	(58, 'Monroes', '1111');
/*!40000 ALTER TABLE `users` ENABLE KEYS */;

-- Dumping structure for table gigguide.usertype
CREATE TABLE IF NOT EXISTS `usertype` (
  `id` int(11) DEFAULT NULL,
  `type` varchar(50) DEFAULT NULL,
  UNIQUE KEY `id` (`id`),
  CONSTRAINT `FK_usertype_users` FOREIGN KEY (`id`) REFERENCES `users` (`id`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- Dumping data for table gigguide.usertype: ~14 rows (approximately)
/*!40000 ALTER TABLE `usertype` DISABLE KEYS */;
INSERT INTO `usertype` (`id`, `type`) VALUES
	(45, 'customer'),
	(46, 'customer'),
	(47, 'customer'),
	(48, 'customer'),
	(49, 'customer'),
	(50, 'customer'),
	(51, 'customer'),
	(52, 'customer'),
	(53, 'customer'),
	(54, 'customer'),
	(55, 'venue'),
	(56, 'venue'),
	(57, 'venue'),
	(58, 'venue');
/*!40000 ALTER TABLE `usertype` ENABLE KEYS */;

-- Dumping structure for table gigguide.venue
CREATE TABLE IF NOT EXISTS `venue` (
  `id` int(11) NOT NULL,
  `name` varchar(250) DEFAULT NULL,
  `address` mediumtext,
  `image` varchar(200) DEFAULT NULL,
  `bio` longtext,
  `rating` double DEFAULT NULL,
  PRIMARY KEY (`id`),
  CONSTRAINT `FK_venue_users` FOREIGN KEY (`id`) REFERENCES `users` (`id`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- Dumping data for table gigguide.venue: ~4 rows (approximately)
/*!40000 ALTER TABLE `venue` DISABLE KEYS */;
INSERT INTO `venue` (`id`, `name`, `address`, `image`, `bio`, `rating`) VALUES
	(55, 'Vicar Street', '49 Thomas Street Dublin 8.', 'Images/vicar.jpg', 'Vicar Street is a venue in Dublin Ireland.', NULL),
	(56, 'Three Arena', 'No1 Docklands Dublin.', 'Images/3arena.jpg', 'Three arena is the biggest venue in Dublin.', NULL),
	(57, 'Rosin Doubh', 'Somewhere in Galway city.', 'Images/Roisin_Dubh.jpg', 'The Rosin Doubh is one of the finest venues in Ireland.', NULL),
	(58, 'Monroes', 'Galway City', 'Images/Monroes.jpg', 'Monroes is one of the finest places in Galway to see a Live Show.', NULL);
/*!40000 ALTER TABLE `venue` ENABLE KEYS */;

/*!40101 SET SQL_MODE=IFNULL(@OLD_SQL_MODE, '') */;
/*!40014 SET FOREIGN_KEY_CHECKS=IF(@OLD_FOREIGN_KEY_CHECKS IS NULL, 1, @OLD_FOREIGN_KEY_CHECKS) */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
