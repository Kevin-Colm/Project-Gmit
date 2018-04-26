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

-- Dumping data for table gigguide.band: ~8 rows (approximately)
/*!40000 ALTER TABLE `band` DISABLE KEYS */;
INSERT INTO `band` (`id`, `name`, `image`, `bio`, `rating`) VALUES
	(59, 'Prince', 'Images/prince.jpg', 'This the artist page for prince', 4.29),
	(60, 'Christy Moore', 'Images/christy_moore.jpg', 'This is the Christy Moore artist Page', 4),
	(61, 'Bob Marley', 'Images/bob-marley.jpg', 'This is the Bob Marley Artist page', 4.36),
	(62, 'James T. Brown', 'Images/james-brown.jpg', 'This is the James Brown Page', NULL),
	(64, 'Janice Joplin', 'Images/janis-joplin.jpg', 'This is the Janice Joplin Artist Page', 3.75),
	(65, 'The Police', 'Images/police.jpg', 'This Is the Police Artist Page', 4),
	(68, 'Metallica', 'Images/metallica.jpg', 'This is the Metallica home page.', 4),
	(78, 'Peter Tosh', 'Images/peter.jpg', 'This is the Peter Tosh Home Page.', NULL);
/*!40000 ALTER TABLE `band` ENABLE KEYS */;

-- Dumping structure for table gigguide.comments
CREATE TABLE IF NOT EXISTS `comments` (
  `eventId` int(11) DEFAULT NULL,
  `userId` int(11) DEFAULT NULL,
  `comment` longtext,
  `date` date DEFAULT NULL,
  KEY `FK_comments_event` (`eventId`),
  KEY `FK_comments_event_2` (`userId`),
  CONSTRAINT `FK_comments_event` FOREIGN KEY (`eventId`) REFERENCES `event` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  CONSTRAINT `FK_comments_event_2` FOREIGN KEY (`userId`) REFERENCES `users` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- Dumping data for table gigguide.comments: ~18 rows (approximately)
/*!40000 ALTER TABLE `comments` DISABLE KEYS */;
INSERT INTO `comments` (`eventId`, `userId`, `comment`, `date`) VALUES
	(3, 52, 'This was a great show!!!!', '2018-04-24'),
	(3, 49, 'I was at the show in Cor in 1988 had a blast...', '2018-04-24'),
	(2, 49, 'What a band!!!!!', '2018-04-24'),
	(2, 51, 'Great time at the gig!!!!!!', '2018-04-24'),
	(5, 52, 'gdfgdfgdfgd', '2018-04-24'),
	(5, 49, 'Test comment', '2018-04-24'),
	(2, 52, 'test comment\r\n', '2018-04-25'),
	(7, 52, 'this is a test of multi line comment.\r\nThis should got o another line. ', '2018-04-25'),
	(9, 52, 'This is a test of a rating being shown in the comments section.', '2018-04-25'),
	(11, 52, 'This is another test of the rating being displayed.', '2018-04-25'),
	(10, 52, 'Great night had by all ', '2018-04-25'),
	(2, 54, 'Amazing Sound and music', '2018-04-25'),
	(3, 54, 'Purple Rain!!!!!', '2018-04-25'),
	(7, 54, 'test of venue\'s', '2018-04-25'),
	(8, 52, 'Jammin ', '2018-04-25'),
	(6, 52, 'What a show!!!', '2018-04-25'),
	(2, 45, 'Hello this is another test of the comment section\'s input.$$$', '2018-04-26'),
	(3, 45, 'Good stuff ', '2018-04-26'),
	(5, 45, 'Test comment', '2018-04-26'),
	(6, 45, 'Test of order of ratings', '2018-04-26'),
	(9, 77, 'Here is a comment from Gerrard.', '2018-04-26');
/*!40000 ALTER TABLE `comments` ENABLE KEYS */;

-- Dumping structure for table gigguide.customer
CREATE TABLE IF NOT EXISTS `customer` (
  `id` int(11) NOT NULL,
  `bio` longtext,
  `name` varchar(50) DEFAULT NULL,
  `image` varchar(200) DEFAULT NULL,
  PRIMARY KEY (`id`),
  CONSTRAINT `FK_customer_users` FOREIGN KEY (`id`) REFERENCES `users` (`id`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- Dumping data for table gigguide.customer: ~13 rows (approximately)
/*!40000 ALTER TABLE `customer` DISABLE KEYS */;
INSERT INTO `customer` (`id`, `bio`, `name`, `image`) VALUES
	(45, 'Hello my name is Kevin.', 'Kâ‚¬v!n', 'Images/random-user_imageM36.jpg'),
	(46, 'Hi My name is John.', 'John Kelly', 'Images/random-user_imageM44.jpg'),
	(47, 'Hi My name is Michelle.', 'Michelle Marley', 'Images/random-user_imageF35.jpg'),
	(48, 'Hello My name is Jackie.', 'Jackie Kennedy', 'Images/random-user_imageF45.jpg'),
	(49, 'Hello there my name is Frank Boyle.', 'Frank Boyle', 'Images/random-user_imageM42.jpg'),
	(50, 'Hello my name is David.', 'David Madden', 'Images/random-user_imageM40.jpg'),
	(51, 'Hello My Name is Francis.', 'Francis Black', 'Images/random-user_imageF12.jpg'),
	(52, 'Hello My name is Rory', 'Rory O\'Gleasoin', 'Images/random-user_imageM29.jpg'),
	(53, 'Hello My name is Bridey.', 'Bridey Murphy', 'Images/random-user_imageF9.jpg'),
	(54, 'This is a text of venue\'s', 'Jannett O\'Connell', 'Images/random-user_imageF16.jpg'),
	(66, 'My name is Patrick Viera. I once played against Roy Keane and lost.', 'Patrick Viera', 'Images/random-user_imageM40.jpg'),
	(76, 'Roberts home page', 'Roberts', 'Images/crane-bar.jpg'),
	(77, 'Hello my name is Gerrard', 'Gerrard', 'Images/random-user_imageM40.jpg');
/*!40000 ALTER TABLE `customer` ENABLE KEYS */;

-- Dumping structure for table gigguide.event
CREATE TABLE IF NOT EXISTS `event` (
  `venueId` int(11) DEFAULT NULL,
  `userId` int(11) DEFAULT NULL,
  `description` longtext,
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `date` date DEFAULT NULL,
  `bandId` int(11) DEFAULT NULL,
  `name` varchar(250) DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `FK_event_venue` (`venueId`),
  KEY `FK_event_band` (`bandId`),
  KEY `FK_event_users` (`userId`),
  CONSTRAINT `FK_event_band` FOREIGN KEY (`bandId`) REFERENCES `band` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  CONSTRAINT `FK_event_venue` FOREIGN KEY (`venueId`) REFERENCES `venue` (`id`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=15 DEFAULT CHARSET=latin1;

-- Dumping data for table gigguide.event: ~13 rows (approximately)
/*!40000 ALTER TABLE `event` DISABLE KEYS */;
INSERT INTO `event` (`venueId`, `userId`, `description`, `id`, `date`, `bandId`, `name`) VALUES
	(55, NULL, 'Bob Marley is Live fro One Night only', 2, '2018-04-02', 61, 'Bob Marley Live'),
	(55, NULL, 'Prince back from the dead for one night only.', 3, '2018-04-06', 59, 'Prince Live at Vicar Street'),
	(56, NULL, 'James Brown is Back', 4, '2018-05-23', 62, 'James Brown Live'),
	(55, NULL, 'Chirtsy more live ', 5, '2018-04-03', 60, 'Krishty'),
	(57, NULL, 'Janice is live from the Rosin Doubh.', 6, '2018-04-25', 64, 'Janice Joplin Live'),
	(67, NULL, 'thdfa', 7, '2018-04-19', 65, 'the police live'),
	(58, NULL, 'Bob Marley is live tonight in Monroes of Galway.', 8, '2018-04-13', 61, 'Bob Marley Live tonight'),
	(55, NULL, 'This is a test of updating the event with moving the date. It should now be in the past evenets page.', 9, '2018-04-24', 64, 'Janice Joplin'),
	(58, NULL, 'Metallica are playing live tonight!!!!', 10, '2018-04-20', 68, 'Mettallica Live'),
	(55, NULL, 'Metallicat Live', 11, '2018-04-09', 68, 'metallica'),
	(55, NULL, 'Brown was born on May 3, 1933, in Barnwell, South Carolina, to 16-year-old Susie (nÃ©e Behling, 1917â€“2003) and 22-year-old Joseph Gardner Brown (1911â€“1993), in a small wooden shack.[15] Brown\'s name was supposed to have been Joseph James Brown, Jr., but his first and middle names were mistakenly reversed on his birth certificate', 12, '2018-04-28', 62, 'James Brown Live'),
	(56, NULL, 'Peter tosh is live for one night only.', 13, '2018-04-30', 78, 'Peter Tosh'),
	(55, NULL, 'The police are live at Vicar street', 14, '2018-04-17', 65, 'The Police Live');
/*!40000 ALTER TABLE `event` ENABLE KEYS */;

-- Dumping structure for table gigguide.ratings
CREATE TABLE IF NOT EXISTS `ratings` (
  `rating` double DEFAULT NULL,
  `id` int(11) DEFAULT NULL,
  `userId` int(11) DEFAULT NULL,
  `eventId` int(11) DEFAULT NULL,
  KEY `id` (`id`),
  KEY `userId` (`userId`),
  KEY `eventId` (`eventId`),
  CONSTRAINT `FK_ratings_event` FOREIGN KEY (`eventId`) REFERENCES `event` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  CONSTRAINT `FK_ratings_users` FOREIGN KEY (`userId`) REFERENCES `users` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  CONSTRAINT `FK_ratings_usertype` FOREIGN KEY (`id`) REFERENCES `usertype` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- Dumping data for table gigguide.ratings: ~58 rows (approximately)
/*!40000 ALTER TABLE `ratings` DISABLE KEYS */;
INSERT INTO `ratings` (`rating`, `id`, `userId`, `eventId`) VALUES
	(5, 59, 52, 3),
	(5, 61, 52, 2),
	(5, 55, 52, 2),
	(1, 55, 52, 3),
	(3, 60, 52, 5),
	(4, 55, 52, 5),
	(5, 61, 53, 2),
	(4, 55, 53, 2),
	(4, 59, 53, 3),
	(3, 55, 53, 3),
	(4, 61, 46, 2),
	(2, 55, 46, 2),
	(3, 55, 46, 3),
	(4, 59, 46, 3),
	(4, 60, 46, 5),
	(1, 55, 46, 5),
	(5, 61, 52, 8),
	(5, 58, 52, 8),
	(4, 61, 66, 2),
	(5, 55, 66, 2),
	(4, 59, 66, 3),
	(4, 55, 66, 3),
	(4, 60, 66, 5),
	(5, 55, 66, 5),
	(4, 61, 66, 8),
	(5, 58, 66, 8),
	(5, 61, 49, 2),
	(5, 55, 49, 2),
	(5, 64, 52, 9),
	(5, 55, 52, 9),
	(5, 55, 45, 2),
	(5, 61, 45, 2),
	(5, 68, 76, 10),
	(4, 58, 76, 10),
	(5, 55, 76, 2),
	(3, 61, 76, 2),
	(5, 58, 52, 10),
	(5, 68, 52, 10),
	(5, 59, 49, 3),
	(4, 55, 49, 3),
	(5, 61, 51, 2),
	(1, 55, 51, 2),
	(5, 60, 49, 5),
	(5, 55, 49, 5),
	(5, 65, 52, 7),
	(5, 67, 52, 7),
	(2, 68, 52, 11),
	(3, 55, 52, 11),
	(3, 55, 54, 2),
	(3, 61, 54, 2),
	(3, 59, 54, 3),
	(2, 55, 54, 3),
	(3, 65, 54, 7),
	(3, 67, 54, 7),
	(2, 57, 52, 6),
	(4, 64, 52, 6),
	(4, 55, 45, 3),
	(5, 59, 45, 3),
	(2, 55, 45, 5),
	(4, 60, 45, 5),
	(3, 64, 45, 6),
	(4, 57, 45, 6),
	(3, 64, 77, 9),
	(5, 55, 77, 9);
/*!40000 ALTER TABLE `ratings` ENABLE KEYS */;

-- Dumping structure for table gigguide.users
CREATE TABLE IF NOT EXISTS `users` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `username` varchar(50) DEFAULT NULL,
  `userPassword` varchar(50) DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `username` (`username`)
) ENGINE=InnoDB AUTO_INCREMENT=79 DEFAULT CHARSET=latin1;

-- Dumping data for table gigguide.users: ~26 rows (approximately)
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
	(58, 'Monroes', '1111'),
	(59, 'prince', '1111'),
	(60, 'christy', '1111'),
	(61, 'bob', '1111'),
	(62, 'james', '1111'),
	(64, 'janice', '1111'),
	(65, 'police', '1111'),
	(66, 'patrick', '1111'),
	(67, 'greg', '1111'),
	(68, 'Metallica', '1111'),
	(76, 'Robert', '111111'),
	(77, 'Gerrard', '111111'),
	(78, 'peter', '111111');
/*!40000 ALTER TABLE `users` ENABLE KEYS */;

-- Dumping structure for table gigguide.usertype
CREATE TABLE IF NOT EXISTS `usertype` (
  `id` int(11) DEFAULT NULL,
  `type` varchar(50) DEFAULT NULL,
  UNIQUE KEY `id` (`id`),
  CONSTRAINT `FK_usertype_users` FOREIGN KEY (`id`) REFERENCES `users` (`id`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- Dumping data for table gigguide.usertype: ~26 rows (approximately)
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
	(58, 'venue'),
	(59, 'band'),
	(60, 'band'),
	(61, 'band'),
	(62, 'band'),
	(64, 'band'),
	(65, 'band'),
	(66, 'customer'),
	(67, 'venue'),
	(68, 'band'),
	(76, 'customer'),
	(77, 'customer'),
	(78, 'band');
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

-- Dumping data for table gigguide.venue: ~5 rows (approximately)
/*!40000 ALTER TABLE `venue` DISABLE KEYS */;
INSERT INTO `venue` (`id`, `name`, `address`, `image`, `bio`, `rating`) VALUES
	(55, 'Vicar Street', '49 Thomas Street Dublin 8.', 'Images/vicar.jpg', 'Vicar Street is  a Venue in Dublin', 3.58),
	(56, 'Three Arena', 'No1 Docklands Dublin.', 'Images/3arena.jpg', 'Three arena is the biggest venue in Dublin.', NULL),
	(57, 'Rosin Doubh', 'Somewhere in Galway city.', 'Images/Roisin_Dubh.jpg', 'The Rosin Doubh is one of the finest venues in Ireland.', 3),
	(58, 'Monroes', 'Galway City', 'Images/Monroes.jpg', 'Monroes is one of the finest places in Galway to see a Live Show.', 4.75),
	(67, 'Greg Venu', '1 main street', 'Images/blackBox.jpg', 'This is the b io', 4);
/*!40000 ALTER TABLE `venue` ENABLE KEYS */;

/*!40101 SET SQL_MODE=IFNULL(@OLD_SQL_MODE, '') */;
/*!40014 SET FOREIGN_KEY_CHECKS=IF(@OLD_FOREIGN_KEY_CHECKS IS NULL, 1, @OLD_FOREIGN_KEY_CHECKS) */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
