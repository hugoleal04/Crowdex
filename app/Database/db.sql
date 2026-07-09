/*M!999999\- enable the sandbox mode */ 
-- MariaDB dump 10.19-11.7.2-MariaDB, for Win64 (AMD64)
--
-- Host: 172.24.135.129    Database: Crowdex
-- ------------------------------------------------------
-- Server version	11.8.6-MariaDB-5 from Ubuntu

/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;
/*!40103 SET @OLD_TIME_ZONE=@@TIME_ZONE */;
/*!40103 SET TIME_ZONE='+00:00' */;
/*!40014 SET @OLD_UNIQUE_CHECKS=@@UNIQUE_CHECKS, UNIQUE_CHECKS=0 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;
/*M!100616 SET @OLD_NOTE_VERBOSITY=@@NOTE_VERBOSITY, NOTE_VERBOSITY=0 */;

--
-- Table structure for table `Band`
--

DROP TABLE IF EXISTS `Band`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8mb4 */;
CREATE TABLE `Band` (
  `idBand` int(11) NOT NULL AUTO_INCREMENT,
  `Name` varchar(150) NOT NULL,
  `Description` mediumtext DEFAULT NULL,
  `ProfileImage` varchar(255) DEFAULT 'uploads/profile_pictures/default_band.webp',
  `CoverImage` varchar(255) DEFAULT NULL,
  `FormedYear` year(4) DEFAULT NULL,
  `DisbandYear` year(4) DEFAULT NULL,
  `Verified` tinyint(4) DEFAULT 0,
  `Website` varchar(255) DEFAULT NULL,
  `SpotifyURL` varchar(255) DEFAULT NULL,
  `YoutubeURL` varchar(255) DEFAULT NULL,
  `InstagramUrl` varchar(255) DEFAULT NULL,
  `FacebookUrl` varchar(255) DEFAULT NULL,
  `TiktokUrl` varchar(255) DEFAULT NULL,
  `CreatedAt` timestamp NULL DEFAULT NULL,
  `UpdatedAt` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`idBand`)
) ENGINE=InnoDB AUTO_INCREMENT=27 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_uca1400_ai_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `Band`
--

LOCK TABLES `Band` WRITE;
/*!40000 ALTER TABLE `Band` DISABLE KEYS */;
INSERT INTO `Band` VALUES
(1,'Coldplay','British rock band formed in London, known for stadium anthems and melodic alternative rock.','uploads/profile_pictures/default_band.webp',NULL,1997,NULL,1,'https://www.coldplay.com','https://open.spotify.com/artist/4gzpq5DPGxSnKTe4SA8HAU','https://www.youtube.com/@coldplay','https://www.instagram.com/coldplay','https://www.facebook.com/coldplay','https://www.tiktok.com/@coldplay','2026-07-08 12:25:30','2026-07-08 12:25:30'),
(2,'Bring Me The Horizon','British rock band blending metalcore, alternative rock and electronic music.','uploads/profile_pictures/default_band.webp',NULL,2004,NULL,1,'https://www.bmthofficial.com','https://open.spotify.com/artist/1Ffb6ejR6Fe5IamqA5oRUF','https://www.youtube.com/@bmthofficial','https://www.instagram.com/bringmethehorizon','https://www.facebook.com/bmthofficial','https://www.tiktok.com/@bmthofficial','2026-07-08 12:25:30','2026-07-08 12:25:30'),
(3,'Sleep Token','Anonymous British rock band mixing progressive metal, ambient and R&B influences.','uploads/profile_pictures/default_band.webp',NULL,2016,NULL,1,'https://www.sleep-token.com','https://open.spotify.com/artist/2n2RSaZqBuUUukhbLlpnE6','https://www.youtube.com/@Sleep-Token','https://www.instagram.com/sleep_token','https://www.facebook.com/sleeptoken','https://www.tiktok.com/@sleep_token','2026-07-08 12:25:30','2026-07-08 12:25:30'),
(4,'Linkin Park','American rock band known for combining alternative rock, nu metal and electronic music.','uploads/profile_pictures/default_band.webp',NULL,1996,NULL,1,'https://linkinpark.com','https://open.spotify.com/artist/6XyY86QOPPrYVGvF9ch6wz','https://www.youtube.com/@linkinpark','https://www.instagram.com/linkinpark','https://www.facebook.com/linkinpark','https://www.tiktok.com/@linkinpark','2026-07-08 12:25:30','2026-07-08 12:25:30'),
(5,'Architects','British metalcore band recognized for technical musicianship and modern metal sound.','uploads/profile_pictures/default_band.webp',NULL,2004,NULL,1,'https://architectsofficial.com','https://open.spotify.com/artist/3ZztVuWxHzNpl0THurTFCv','https://www.youtube.com/@architects','https://www.instagram.com/architects','https://www.facebook.com/architectsuk','https://www.tiktok.com/@architects','2026-07-08 12:25:30','2026-07-08 12:25:30'),
(6,'Ghost','Swedish rock band famous for theatrical performances and occult-inspired imagery.','uploads/profile_pictures/default_band.webp',NULL,2006,NULL,1,'https://ghost-official.com','https://open.spotify.com/artist/1Qp56T7n950O3EGMsSl81D','https://www.youtube.com/@thebandghost','https://www.instagram.com/thebandghost','https://www.facebook.com/thebandghost','https://www.tiktok.com/@thebandghost','2026-07-08 12:25:30','2026-07-08 12:25:30'),
(7,'Imagine Dragons','American pop rock band from Las Vegas known for arena rock hits.','uploads/profile_pictures/default_band.webp',NULL,2008,NULL,1,'https://www.imaginedragonsmusic.com','https://open.spotify.com/artist/53XhwfbYqKCa1cC15pYq2q','https://www.youtube.com/@ImagineDragons','https://www.instagram.com/imaginedragons','https://www.facebook.com/ImagineDragons','https://www.tiktok.com/@imaginedragons','2026-07-08 12:25:30','2026-07-08 12:25:30'),
(8,'Metallica','American heavy metal band regarded as one of the most influential metal bands of all time.','uploads/profile_pictures/default_band.webp',NULL,1981,NULL,1,'https://www.metallica.com','https://open.spotify.com/artist/2ye2Wgw4gimLv2eAKyk1NB','https://www.youtube.com/@metallica','https://www.instagram.com/metallica','https://www.facebook.com/Metallica','https://www.tiktok.com/@metallica','2026-07-08 12:25:30','2026-07-08 12:25:30'),
(9,'Slipknot','American heavy metal band known for aggressive music and distinctive masks.','uploads/profile_pictures/default_band.webp',NULL,1995,NULL,1,'https://slipknot1.com','https://open.spotify.com/artist/05fG473iIaoy82BF1aGhL8','https://www.youtube.com/@slipknot','https://www.instagram.com/slipknot','https://www.facebook.com/slipknot','https://www.tiktok.com/@slipknot','2026-07-08 12:25:30','2026-07-08 12:25:30'),
(10,'Foo Fighters','American rock band founded by Dave Grohl after the dissolution of Nirvana.','uploads/profile_pictures/default_band.webp',NULL,1994,NULL,1,'https://foofighters.com','https://open.spotify.com/artist/7jy3rLJdDQY21OgRLCZ9sD','https://www.youtube.com/@foofighters','https://www.instagram.com/foofighters','https://www.facebook.com/foofighters','https://www.tiktok.com/@foofighters','2026-07-08 12:25:30','2026-07-08 12:25:30'),
(11,'Green Day','American punk rock band formed in California and pioneers of modern pop punk.','uploads/profile_pictures/default_band.webp',NULL,1987,NULL,1,'https://greenday.com','https://open.spotify.com/artist/7oPftvlwr6VrsViSDV7fJY','https://www.youtube.com/@GreenDay','https://www.instagram.com/greenday','https://www.facebook.com/GreenDay','https://www.tiktok.com/@greenday','2026-07-08 12:25:30','2026-07-08 12:25:30'),
(12,'Muse','English rock band known for progressive rock, electronic influences and spectacular live shows.','uploads/profile_pictures/default_band.webp',NULL,1994,NULL,1,'https://www.muse.mu','https://open.spotify.com/artist/12Chz98pHFMPJEknJQMWvI','https://www.youtube.com/@muse','https://www.instagram.com/muse','https://www.facebook.com/muse','https://www.tiktok.com/@muse','2026-07-08 12:25:30','2026-07-08 12:25:30'),
(13,'Twenty One Pilots','American musical duo blending alternative rock, hip hop and electronic music.','uploads/profile_pictures/default_band.webp',NULL,2009,NULL,1,'https://www.twentyonepilots.com','https://open.spotify.com/artist/3YQKmKGau1PzlVlkL1iodx','https://www.youtube.com/@twentyonepilots','https://www.instagram.com/twentyonepilots','https://www.facebook.com/twentyonepilots','https://www.tiktok.com/@twentyonepilots','2026-07-08 12:25:30','2026-07-08 12:25:30'),
(14,'The Killers','American rock band from Las Vegas famous for indie rock and alternative anthems.','uploads/profile_pictures/default_band.webp',NULL,2001,NULL,1,'https://www.thekillersmusic.com','https://open.spotify.com/artist/0C0XlULifJtAgn6ZNCW2eu','https://www.youtube.com/@TheKillersMusic','https://www.instagram.com/thekillers','https://www.facebook.com/thekillers','https://www.tiktok.com/@thekillers','2026-07-08 12:25:30','2026-07-08 12:25:30'),
(15,'Royal Blood','English rock duo known for their heavy bass-driven sound.','uploads/profile_pictures/default_band.webp',NULL,2011,NULL,1,'https://www.royalbloodband.com','https://open.spotify.com/artist/2S3ajOf5X1E7RHPGD7YuXx','https://www.youtube.com/@RoyalBloodUK','https://www.instagram.com/royalblooduk','https://www.facebook.com/RoyalBloodUK','https://www.tiktok.com/@royalblood','2026-07-08 12:25:30','2026-07-08 12:25:30'),
(16,'Arctic Monkeys','English indie rock band formed in Sheffield.','uploads/profile_pictures/default_band.webp',NULL,2002,NULL,1,'https://www.arcticmonkeys.com','https://open.spotify.com/artist/7Ln80lUS6He07XvHI8qqHH','https://www.youtube.com/@ArcticMonkeys','https://www.instagram.com/arcticmonkeys','https://www.facebook.com/ArcticMonkeys','https://www.tiktok.com/@arcticmonkeys','2026-07-08 12:25:30','2026-07-08 12:25:30'),
(17,'Rammstein','German industrial metal band famous for theatrical live shows.','uploads/profile_pictures/default_band.webp',NULL,1994,NULL,1,'https://www.rammstein.de','https://open.spotify.com/artist/6wWVKhxIU2cEi0K81v7HvP','https://www.youtube.com/@RammsteinOfficial','https://www.instagram.com/rammsteinofficial','https://www.facebook.com/Rammstein','https://www.tiktok.com/@rammstein','2026-07-08 12:25:30','2026-07-08 12:25:30'),
(18,'Iron Maiden','English heavy metal band formed in London.','uploads/profile_pictures/default_band.webp',NULL,1975,NULL,1,'https://www.ironmaiden.com','https://open.spotify.com/artist/6mdiAmATAx73kdxrNrnlao','https://www.youtube.com/@ironmaiden','https://www.instagram.com/ironmaiden','https://www.facebook.com/ironmaiden','https://www.tiktok.com/@ironmaiden','2026-07-08 12:25:30','2026-07-08 12:25:30'),
(19,'System Of A Down','Armenian-American alternative metal band.','uploads/profile_pictures/default_band.webp',NULL,1994,NULL,1,'https://systemofadown.com','https://open.spotify.com/artist/5eAWCfyUhZtHHtBdNk56l1','https://www.youtube.com/@systemofadown','https://www.instagram.com/systemofadown','https://www.facebook.com/systemofadown','https://www.tiktok.com/@systemofadown','2026-07-08 12:25:30','2026-07-08 12:25:30'),
(20,'Red Hot Chili Peppers','American funk rock band.','uploads/profile_pictures/default_band.webp',NULL,1982,NULL,1,'https://redhotchilipeppers.com','https://open.spotify.com/artist/0L8ExT028jH3ddEcZwqJJ5','https://www.youtube.com/@RedHotChiliPeppers','https://www.instagram.com/chilipeppers','https://www.facebook.com/ChiliPeppers','https://www.tiktok.com/@redhotchilipeppers','2026-07-08 12:25:30','2026-07-08 12:25:30'),
(21,'Billie Eilish','American singer-songwriter.','uploads/profile_pictures/default_band.webp',NULL,2015,NULL,1,'https://billieeilish.com','https://open.spotify.com/artist/6qqNVTkY8uBg9cP3Jd7DAH','https://www.youtube.com/@BillieEilish','https://www.instagram.com/billieeilish','https://www.facebook.com/billieeilish','https://www.tiktok.com/@billieeilish','2026-07-08 12:25:30','2026-07-08 12:25:30'),
(22,'Olivia Rodrigo','American singer-songwriter and actress.','uploads/profile_pictures/default_band.webp',NULL,2021,NULL,1,'https://www.oliviarodrigo.com','https://open.spotify.com/artist/1McMsnEElThX1knmY4oliG','https://www.youtube.com/@OliviaRodrigo','https://www.instagram.com/oliviarodrigo','https://www.facebook.com/OliviaRodrigo','https://www.tiktok.com/@oliviarodrigo','2026-07-08 12:25:30','2026-07-08 12:25:30'),
(23,'The Weeknd','Canadian singer, songwriter and producer.','uploads/profile_pictures/default_band.webp',NULL,2010,NULL,1,'https://www.theweeknd.com','https://open.spotify.com/artist/1Xyo4u8uXC1ZmMpatF05PJ','https://www.youtube.com/@TheWeeknd','https://www.instagram.com/theweeknd','https://www.facebook.com/theweeknd','https://www.tiktok.com/@theweeknd','2026-07-08 12:25:30','2026-07-08 12:25:30'),
(24,'Bad Omens','American metalcore band.','uploads/profile_pictures/default_band.webp',NULL,2015,NULL,1,'https://badomensofficial.com','https://open.spotify.com/artist/3Ri4H12KFyu98LMjSoij5V','https://www.youtube.com/@BadOmensOfficial','https://www.instagram.com/badomensofficial','https://www.facebook.com/badomensofficial','https://www.tiktok.com/@badomensofficial','2026-07-08 12:25:30','2026-07-08 12:25:30'),
(25,'Spiritbox','Canadian progressive metalcore band.','uploads/profile_pictures/default_band.webp',NULL,2017,NULL,1,'https://spiritbox.com','https://open.spotify.com/artist/4MzJMcHQBl9SIYSjwWn8QW','https://www.youtube.com/@SpiritboxBand','https://www.instagram.com/spiritboxmusic','https://www.facebook.com/spiritboxmusic','https://www.tiktok.com/@spiritbox','2026-07-08 12:25:30','2026-07-08 12:25:30'),
(26,'Sabaton','Swedish power metal band.','uploads/profile_pictures/default_band.webp',NULL,1999,NULL,1,'https://www.sabaton.net','https://open.spotify.com/artist/3o2dn2O0FCVsWDFSh8qxgG','https://www.youtube.com/@sabaton','https://www.instagram.com/sabatonofficial','https://www.facebook.com/sabaton','https://www.tiktok.com/@sabatonofficial','2026-07-08 12:25:30','2026-07-08 12:25:30');
/*!40000 ALTER TABLE `Band` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `Band_has_Genre`
--

DROP TABLE IF EXISTS `Band_has_Genre`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8mb4 */;
CREATE TABLE `Band_has_Genre` (
  `Band_idBand` int(11) NOT NULL,
  `Genre_idGenre` int(11) NOT NULL,
  PRIMARY KEY (`Band_idBand`,`Genre_idGenre`),
  KEY `fk_Band_has_Genre_Genre1_idx` (`Genre_idGenre`),
  KEY `fk_Band_has_Genre_Band_idx` (`Band_idBand`),
  CONSTRAINT `fk_Band_has_Genre_Band` FOREIGN KEY (`Band_idBand`) REFERENCES `Band` (`idBand`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  CONSTRAINT `fk_Band_has_Genre_Genre1` FOREIGN KEY (`Genre_idGenre`) REFERENCES `Genre` (`idGenre`) ON DELETE NO ACTION ON UPDATE NO ACTION
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_uca1400_ai_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `Band_has_Genre`
--

LOCK TABLES `Band_has_Genre` WRITE;
/*!40000 ALTER TABLE `Band_has_Genre` DISABLE KEYS */;
INSERT INTO `Band_has_Genre` VALUES
(1,1),
(12,1),
(14,1),
(1,2),
(4,2),
(7,2),
(10,2),
(15,2),
(16,2),
(19,2),
(20,2),
(1,3),
(7,3),
(21,3),
(22,3),
(23,3),
(7,4),
(13,4),
(22,4),
(2,5),
(3,5),
(17,5),
(19,5),
(24,5),
(6,6),
(8,6),
(9,6),
(18,6),
(26,6),
(2,7),
(5,7),
(24,7),
(25,7),
(3,9),
(5,9),
(12,9),
(25,9),
(6,10),
(10,10),
(15,10),
(20,10),
(4,11),
(9,11),
(19,11),
(11,12),
(11,13),
(14,14),
(16,14),
(2,15),
(3,15),
(4,15),
(12,15),
(13,15),
(21,15),
(23,15),
(13,18),
(3,20),
(21,20),
(23,20),
(17,28),
(24,28),
(6,34),
(8,36),
(18,38),
(26,38);
/*!40000 ALTER TABLE `Band_has_Genre` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `City`
--

DROP TABLE IF EXISTS `City`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8mb4 */;
CREATE TABLE `City` (
  `idCity` int(11) NOT NULL AUTO_INCREMENT,
  `Timezone` varchar(20) NOT NULL,
  `Name` varchar(255) NOT NULL,
  `Country_idCountry` int(11) NOT NULL,
  PRIMARY KEY (`idCity`),
  KEY `fk_City_Country1_idx` (`Country_idCountry`),
  CONSTRAINT `fk_City_Country1` FOREIGN KEY (`Country_idCountry`) REFERENCES `Country` (`idCountry`) ON DELETE NO ACTION ON UPDATE NO ACTION
) ENGINE=InnoDB AUTO_INCREMENT=54 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_uca1400_ai_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `City`
--

LOCK TABLES `City` WRITE;
/*!40000 ALTER TABLE `City` DISABLE KEYS */;
INSERT INTO `City` VALUES
(1,'Europe/Lisbon','Lisboa',1),
(2,'Europe/Lisbon','Porto',1),
(3,'Europe/Lisbon','Braga',1),
(4,'Europe/Lisbon','Coimbra',1),
(5,'Europe/Lisbon','Faro',1),
(6,'Atlantic/Azores','Ponta Delgada',1),
(7,'Atlantic/Azores','Angra do Heroísmo',1),
(8,'Europe/Madrid','Madrid',2),
(9,'Europe/Madrid','Barcelona',2),
(10,'Europe/Madrid','Bilbao',2),
(11,'Europe/Madrid','Valencia',2),
(12,'Europe/Madrid','Sevilha',2),
(13,'Europe/Paris','Paris',3),
(14,'Europe/Paris','Lyon',3),
(15,'Europe/Paris','Marselha',3),
(16,'Europe/Berlin','Berlim',4),
(17,'Europe/Berlin','Hamburgo',4),
(18,'Europe/Berlin','Munique',4),
(19,'Europe/Berlin','Colónia',4),
(20,'Europe/Rome','Roma',5),
(21,'Europe/Rome','Milão',5),
(22,'Europe/Rome','Bolonha',5),
(23,'Europe/Brussels','Bruxelas',6),
(24,'Europe/Brussels','Antuérpia',6),
(25,'Europe/Amsterdam','Amesterdão',7),
(26,'Europe/Amsterdam','Roterdão',7),
(27,'Europe/Dublin','Dublin',10),
(28,'Europe/London','Londres',21),
(29,'Europe/London','Manchester',21),
(30,'Europe/London','Birmingham',21),
(31,'Europe/London','Glasgow',21),
(32,'Europe/Stockholm','Estocolmo',24),
(33,'Europe/Stockholm','Gotemburgo',24),
(34,'Europe/Copenhagen','Copenhaga',25),
(35,'Europe/Warsaw','Varsóvia',26),
(36,'Europe/Warsaw','Cracóvia',26),
(37,'Europe/Prague','Praga',27),
(38,'Europe/Budapest','Budapeste',28),
(39,'Europe/Vienna','Viena',9),
(40,'Europe/Zurich','Zurique',22),
(41,'Europe/Oslo','Oslo',23),
(42,'Europe/Helsinki','Helsínquia',11),
(43,'America/New_York','New York',33),
(44,'America/Chicago','Chicago',33),
(45,'America/Los_Angeles','Los Angeles',33),
(46,'America/Denver','Denver',33),
(47,'America/Detroit','Detroit',33),
(48,'America/Toronto','Toronto',34),
(49,'America/Vancouver','Vancouver',34),
(50,'Asia/Tokyo','Tokyo',40),
(51,'Asia/Seoul','Seoul',41),
(52,'Australia/Sydney','Sydney',45),
(53,'Australia/Melbourne','Melbourne',45);
/*!40000 ALTER TABLE `City` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `Concert`
--

DROP TABLE IF EXISTS `Concert`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8mb4 */;
CREATE TABLE `Concert` (
  `idConcert` int(11) NOT NULL AUTO_INCREMENT,
  `Band_idBand` int(11) NOT NULL,
  `Event_idEvent` int(11) NOT NULL,
  `Stage` varchar(100) DEFAULT NULL,
  `StartDateTime` datetime DEFAULT NULL,
  `EndDateTime` datetime DEFAULT NULL,
  PRIMARY KEY (`idConcert`),
  KEY `fk_Concert_Band1_idx` (`Band_idBand`),
  KEY `fk_Concert_Event1_idx` (`Event_idEvent`),
  CONSTRAINT `fk_Concert_Band1` FOREIGN KEY (`Band_idBand`) REFERENCES `Band` (`idBand`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  CONSTRAINT `fk_Concert_Event1` FOREIGN KEY (`Event_idEvent`) REFERENCES `Event` (`idEvent`) ON DELETE NO ACTION ON UPDATE NO ACTION
) ENGINE=InnoDB AUTO_INCREMENT=60 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_uca1400_ai_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `Concert`
--

LOCK TABLES `Concert` WRITE;
/*!40000 ALTER TABLE `Concert` DISABLE KEYS */;
INSERT INTO `Concert` VALUES
(1,1,1,'Main Stage','2026-08-21 20:30:00','2026-08-21 23:15:00'),
(2,7,2,'Main Stage','2026-09-05 21:00:00','2026-09-05 23:30:00'),
(3,5,3,'Main Stage','2026-10-08 20:00:00','2026-10-08 22:45:00'),
(4,15,4,'Main Stage','2026-11-12 21:00:00','2026-11-12 23:00:00'),
(5,6,5,'Main Stage','2026-11-25 20:30:00','2026-11-25 23:00:00'),
(6,2,6,'Main Stage','2026-09-04 20:30:00','2026-09-04 23:10:00'),
(7,12,7,'Main Stage','2026-09-18 21:00:00','2026-09-18 23:30:00'),
(8,4,8,'Main Stage','2026-10-15 20:00:00','2026-10-15 23:00:00'),
(9,3,9,'Main Stage','2026-09-18 20:30:00','2026-09-18 23:00:00'),
(10,13,10,'Main Stage','2026-10-02 20:00:00','2026-10-02 22:45:00'),
(11,8,11,'Main Stage','2026-07-12 18:30:00','2026-07-12 23:30:00'),
(12,9,12,'Main Stage','2026-11-07 20:30:00','2026-11-07 23:00:00'),
(13,11,13,'Main Stage','2026-08-30 20:00:00','2026-08-30 22:45:00'),
(14,26,14,'Main Stage','2026-12-05 20:00:00','2026-12-05 23:00:00'),
(15,23,15,'Main Stage','2026-10-20 20:30:00','2026-10-20 23:30:00'),
(16,1,16,'Palco Mundo','2027-06-20 22:00:00','2027-06-20 23:45:00'),
(17,10,16,'Palco Mundo','2027-06-20 20:00:00','2027-06-20 21:30:00'),
(18,7,16,'Palco Mundo','2027-06-20 18:00:00','2027-06-20 19:30:00'),
(19,20,16,'Galp Stage','2027-06-20 19:00:00','2027-06-20 20:15:00'),
(20,14,17,'NOS Stage','2027-07-09 22:00:00','2027-07-09 23:45:00'),
(21,12,17,'NOS Stage','2027-07-09 20:00:00','2027-07-09 21:30:00'),
(22,15,17,'Heineken Stage','2027-07-09 19:00:00','2027-07-09 20:00:00'),
(23,13,17,'NOS Stage','2027-07-09 17:30:00','2027-07-09 18:45:00'),
(24,8,18,'Main Stage','2027-06-12 22:00:00','2027-06-12 23:50:00'),
(25,9,18,'Main Stage','2027-06-12 20:00:00','2027-06-12 21:30:00'),
(26,5,18,'Main Stage','2027-06-12 18:00:00','2027-06-12 19:15:00'),
(27,2,18,'Second Stage','2027-06-12 20:15:00','2027-06-12 21:30:00'),
(28,24,18,'Second Stage','2027-06-12 18:15:00','2027-06-12 19:30:00'),
(29,25,18,'Second Stage','2027-06-12 16:45:00','2027-06-12 17:45:00'),
(30,26,18,'Second Stage','2027-06-12 15:15:00','2027-06-12 16:15:00'),
(31,16,19,'Main Stage','2027-07-15 22:00:00','2027-07-15 23:30:00'),
(32,12,19,'Main Stage','2027-07-15 20:00:00','2027-07-15 21:30:00'),
(33,14,19,'Main Stage','2027-07-15 18:15:00','2027-07-15 19:30:00'),
(34,16,20,'Main Stage','2027-06-05 22:00:00','2027-06-05 23:30:00'),
(35,14,20,'Main Stage','2027-06-05 20:00:00','2027-06-05 21:30:00'),
(36,10,20,'Main Stage','2027-06-05 18:00:00','2027-06-05 19:15:00'),
(37,17,21,'Main Stage','2027-05-22 22:00:00','2027-05-22 23:45:00'),
(38,8,21,'Main Stage','2027-05-22 20:00:00','2027-05-22 21:30:00'),
(39,18,21,'Main Stage','2027-05-22 18:15:00','2027-05-22 19:30:00'),
(40,6,21,'Temple','2027-05-22 21:00:00','2027-05-22 22:00:00'),
(41,1,22,'Main Stage','2027-07-03 22:00:00','2027-07-03 23:45:00'),
(42,7,22,'Main Stage','2027-07-03 20:00:00','2027-07-03 21:30:00'),
(43,10,22,'Main Stage','2027-07-03 18:00:00','2027-07-03 19:30:00'),
(44,23,23,'Main Stage','2027-08-14 22:00:00','2027-08-14 23:30:00'),
(45,21,23,'Main Stage','2027-08-14 20:00:00','2027-08-14 21:15:00'),
(46,22,23,'Main Stage','2027-08-14 18:30:00','2027-08-14 19:30:00'),
(47,23,24,'Main Stage','2027-09-04 21:30:00','2027-09-04 23:00:00'),
(48,21,24,'Main Stage','2027-09-04 19:45:00','2027-09-04 21:00:00'),
(49,17,25,'Main Stage','2027-10-08 21:00:00','2027-10-08 23:30:00'),
(50,10,26,'Main Stage','2027-03-18 20:00:00','2027-03-18 23:00:00'),
(51,21,27,'Main Stage','2027-04-10 20:30:00','2027-04-10 23:00:00'),
(52,22,28,'Main Stage','2027-05-03 20:30:00','2027-05-03 23:15:00'),
(53,20,29,'Main Stage','2027-04-24 20:00:00','2027-04-24 23:00:00'),
(54,7,30,'Main Stage','2027-02-17 20:00:00','2027-02-17 22:45:00'),
(55,17,31,'Main Stage','2027-08-22 20:30:00','2027-08-22 23:30:00'),
(56,16,32,'Main Stage','2027-05-18 20:30:00','2027-05-18 23:00:00'),
(57,14,33,'Main Stage','2027-03-12 20:00:00','2027-03-12 22:45:00'),
(58,18,34,'Main Stage','2027-09-17 20:00:00','2027-09-17 23:15:00'),
(59,19,35,'Main Stage','2027-10-30 20:00:00','2027-10-30 23:10:00');
/*!40000 ALTER TABLE `Concert` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `Country`
--

DROP TABLE IF EXISTS `Country`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8mb4 */;
CREATE TABLE `Country` (
  `idCountry` int(11) NOT NULL AUTO_INCREMENT,
  `Name` varchar(255) NOT NULL,
  `ISO2` char(2) DEFAULT NULL,
  `ISO3` char(3) DEFAULT NULL,
  `Currency_idCurrency` int(11) NOT NULL,
  PRIMARY KEY (`idCountry`),
  KEY `fk_Country_Currency1_idx` (`Currency_idCurrency`),
  CONSTRAINT `fk_Country_Currency1` FOREIGN KEY (`Currency_idCurrency`) REFERENCES `Currency` (`idCurrency`) ON DELETE NO ACTION ON UPDATE NO ACTION
) ENGINE=InnoDB AUTO_INCREMENT=51 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_uca1400_ai_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `Country`
--

LOCK TABLES `Country` WRITE;
/*!40000 ALTER TABLE `Country` DISABLE KEYS */;
INSERT INTO `Country` VALUES
(1,'Portugal','PT',NULL,1),
(2,'Espanha','ES',NULL,1),
(3,'França','FR',NULL,1),
(4,'Alemanha','DE',NULL,1),
(5,'Itália','IT',NULL,1),
(6,'Bélgica','BE',NULL,1),
(7,'Países Baixos','NL',NULL,1),
(8,'Luxemburgo','LU',NULL,1),
(9,'Áustria','AT',NULL,1),
(10,'Irlanda','IE',NULL,1),
(11,'Finlândia','FI',NULL,1),
(12,'Grécia','GR',NULL,1),
(13,'Malta','MT',NULL,1),
(14,'Chipre','CY',NULL,1),
(15,'Eslováquia','SK',NULL,1),
(16,'Eslovénia','SI',NULL,1),
(17,'Estónia','EE',NULL,1),
(18,'Letónia','LV',NULL,1),
(19,'Lituânia','LT',NULL,1),
(20,'Croácia','HR',NULL,1),
(21,'Reino Unido','GB',NULL,2),
(22,'Suíça','CH',NULL,3),
(23,'Noruega','NO',NULL,4),
(24,'Suécia','SE',NULL,5),
(25,'Dinamarca','DK',NULL,6),
(26,'Polónia','PL',NULL,7),
(27,'Chéquia','CZ',NULL,8),
(28,'Hungria','HU',NULL,9),
(29,'Roménia','RO',NULL,10),
(30,'Bulgária','BG',NULL,11),
(31,'Sérvia','RS',NULL,12),
(32,'Turquia','TR',NULL,13),
(33,'Estados Unidos','US',NULL,14),
(34,'Canadá','CA',NULL,15),
(35,'México','MX',NULL,16),
(36,'Brasil','BR',NULL,17),
(37,'Argentina','AR',NULL,18),
(38,'Chile','CL',NULL,19),
(39,'Colômbia','CO',NULL,20),
(40,'Japão','JP',NULL,21),
(41,'Coreia do Sul','KR',NULL,22),
(42,'China','CN',NULL,23),
(43,'Índia','IN',NULL,24),
(44,'Singapura','SG',NULL,25),
(45,'Austrália','AU',NULL,26),
(46,'Nova Zelândia','NZ',NULL,27),
(47,'Emirados Árabes Unidos','AE',NULL,28),
(48,'Arábia Saudita','SA',NULL,29),
(49,'África do Sul','ZA',NULL,30),
(50,'Marrocos','MA',NULL,31);
/*!40000 ALTER TABLE `Country` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `Currency`
--

DROP TABLE IF EXISTS `Currency`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8mb4 */;
CREATE TABLE `Currency` (
  `idCurrency` int(11) NOT NULL AUTO_INCREMENT,
  `Name` varchar(255) NOT NULL,
  `ISO3` char(3) NOT NULL,
  `Symbol` varchar(8) NOT NULL,
  PRIMARY KEY (`idCurrency`)
) ENGINE=InnoDB AUTO_INCREMENT=32 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_uca1400_ai_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `Currency`
--

LOCK TABLES `Currency` WRITE;
/*!40000 ALTER TABLE `Currency` DISABLE KEYS */;
INSERT INTO `Currency` VALUES
(1,'Euro','EUR','€'),
(2,'Libra Esterlina','GBP','£'),
(3,'Franco Suíço','CHF','CHF'),
(4,'Coroa Norueguesa','NOK','kr'),
(5,'Coroa Sueca','SEK','kr'),
(6,'Coroa Dinamarquesa','DKK','kr'),
(7,'Złoty','PLN','zł'),
(8,'Coroa Checa','CZK','Kč'),
(9,'Forint','HUF','Ft'),
(10,'Leu Romeno','RON','lei'),
(11,'Lev Búlgaro','BGN','лв'),
(12,'Dinar Sérvio','RSD','дин'),
(13,'Lira Turca','TRY','₺'),
(14,'Dólar Americano','USD','$'),
(15,'Dólar Canadiano','CAD','C$'),
(16,'Peso Mexicano','MXN','$'),
(17,'Real Brasileiro','BRL','R$'),
(18,'Peso Argentino','ARS','$'),
(19,'Peso Chileno','CLP','$'),
(20,'Peso Colombiano','COP','$'),
(21,'Iene','JPY','¥'),
(22,'Won Sul-Coreano','KRW','₩'),
(23,'Yuan Renminbi','CNY','¥'),
(24,'Rupia Indiana','INR','₹'),
(25,'Dólar de Singapura','SGD','S$'),
(26,'Dólar Australiano','AUD','A$'),
(27,'Dólar Neozelandês','NZD','NZ$'),
(28,'Dirham','AED','د.إ'),
(29,'Riyal Saudita','SAR','﷼'),
(30,'Rand','ZAR','R'),
(31,'Dirham Marroquino','MAD','د.م.');
/*!40000 ALTER TABLE `Currency` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `Event`
--

DROP TABLE IF EXISTS `Event`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8mb4 */;
CREATE TABLE `Event` (
  `idEvent` int(11) NOT NULL AUTO_INCREMENT,
  `Venue_idVenue` int(11) NOT NULL,
  `Title` varchar(150) NOT NULL,
  `Description` mediumtext DEFAULT NULL,
  `StartDateTime` datetime NOT NULL,
  `EndDateTime` datetime DEFAULT NULL,
  `MinimumAge` tinyint(4) DEFAULT NULL,
  `Capacity` int(11) DEFAULT NULL,
  `BannerImage` varchar(255) DEFAULT NULL,
  `TicketUrl` varchar(255) DEFAULT NULL,
  `Status` enum('draft','published','cancelled','postponed','finished') DEFAULT NULL,
  `CreatedAt` timestamp NULL DEFAULT NULL,
  `UpdatedAt` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`idEvent`),
  KEY `fk_Event_Venue1_idx` (`Venue_idVenue`),
  CONSTRAINT `fk_Event_Venue1` FOREIGN KEY (`Venue_idVenue`) REFERENCES `Venue` (`idVenue`) ON DELETE NO ACTION ON UPDATE NO ACTION
) ENGINE=InnoDB AUTO_INCREMENT=36 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_uca1400_ai_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `Event`
--

LOCK TABLES `Event` WRITE;
/*!40000 ALTER TABLE `Event` DISABLE KEYS */;
INSERT INTO `Event` VALUES
(1,1,'Coldplay - Music Of The Spheres Tour','European Tour','2026-08-21 20:30:00','2026-08-21 23:15:00',6,20000,NULL,NULL,'published','2026-07-08 12:25:30','2026-07-08 12:25:30'),
(2,2,'Imagine Dragons World Tour','Live in Porto','2026-09-05 21:00:00','2026-09-05 23:30:00',6,12000,NULL,NULL,'published','2026-07-08 12:25:30','2026-07-08 12:25:30'),
(3,3,'Architects European Tour','2026 Tour','2026-10-08 20:00:00','2026-10-08 22:45:00',12,12000,NULL,NULL,'published','2026-07-08 12:25:30','2026-07-08 12:25:30'),
(4,5,'Royal Blood Live','Special Show','2026-11-12 21:00:00','2026-11-12 23:00:00',12,8500,NULL,NULL,'published','2026-07-08 12:25:30','2026-07-08 12:25:30'),
(5,6,'Ghost World Tour','Impera Tour','2026-11-25 20:30:00','2026-11-25 23:00:00',12,4000,NULL,NULL,'published','2026-07-08 12:25:30','2026-07-08 12:25:30'),
(6,8,'Bring Me The Horizon','European Arena Tour','2026-09-04 20:30:00','2026-09-04 23:10:00',14,17000,NULL,NULL,'published','2026-07-08 12:25:30','2026-07-08 12:25:30'),
(7,9,'Muse World Tour','Barcelona','2026-09-18 21:00:00','2026-09-18 23:30:00',6,17000,NULL,NULL,'published','2026-07-08 12:25:30','2026-07-08 12:25:30'),
(8,12,'Linkin Park Reunion Tour','Paris','2026-10-15 20:00:00','2026-10-15 23:00:00',12,20000,NULL,NULL,'published','2026-07-08 12:25:30','2026-07-08 12:25:30'),
(9,14,'Sleep Token','Even In Arcadia Tour','2026-09-18 20:30:00','2026-09-18 23:00:00',12,17000,NULL,NULL,'published','2026-07-08 12:25:30','2026-07-08 12:25:30'),
(10,18,'Twenty One Pilots','Clancy Tour','2026-10-02 20:00:00','2026-10-02 22:45:00',6,17000,NULL,NULL,'published','2026-07-08 12:25:30','2026-07-08 12:25:30'),
(11,20,'Metallica M72 Tour','London','2026-07-12 18:30:00','2026-07-12 23:30:00',12,90000,NULL,NULL,'published','2026-07-08 12:25:30','2026-07-08 12:25:30'),
(12,21,'Slipknot','Here Comes The Pain','2026-11-07 20:30:00','2026-11-07 23:00:00',16,20000,NULL,NULL,'published','2026-07-08 12:25:30','2026-07-08 12:25:30'),
(13,22,'Green Day','Saviors Tour','2026-08-30 20:00:00','2026-08-30 22:45:00',6,21000,NULL,NULL,'published','2026-07-08 12:25:30','2026-07-08 12:25:30'),
(14,25,'Sabaton Tour','The Legendary Tour','2026-12-05 20:00:00','2026-12-05 23:00:00',12,16000,NULL,NULL,'published','2026-07-08 12:25:30','2026-07-08 12:25:30'),
(15,31,'The Weeknd','After Hours Til Dawn','2026-10-20 20:30:00','2026-10-20 23:30:00',12,21000,NULL,NULL,'published','2026-07-08 12:25:30','2026-07-08 12:25:30'),
(16,1,'Rock in Rio Lisboa 2027','One of Europe\'s biggest music festivals.','2027-06-20 15:00:00','2027-06-21 02:00:00',6,80000,NULL,NULL,'published','2026-07-08 12:25:30','2026-07-08 12:25:30'),
(17,1,'NOS Alive 2027','Three days of music at Passeio Marítimo de Algés.','2027-07-09 15:00:00','2027-07-10 03:00:00',6,55000,NULL,NULL,'published','2026-07-08 12:25:30','2026-07-08 12:25:30'),
(18,20,'Download Festival UK','The biggest rock and metal festival in the UK.','2027-06-12 12:00:00','2027-06-12 23:59:00',16,90000,NULL,NULL,'published','2026-07-08 12:25:30','2026-07-08 12:25:30'),
(19,8,'Mad Cool Festival','Madrid Summer Festival.','2027-07-15 16:00:00','2027-07-16 02:30:00',12,70000,NULL,NULL,'published','2026-07-08 12:25:30','2026-07-08 12:25:30'),
(20,9,'Primavera Sound Barcelona','International music festival.','2027-06-05 15:00:00','2027-06-06 02:00:00',12,70000,NULL,NULL,'published','2026-07-08 12:25:30','2026-07-08 12:25:30'),
(21,12,'Hellfest Warm Up','Metal celebration in Paris.','2027-05-22 16:00:00','2027-05-22 23:59:00',16,25000,NULL,NULL,'published','2026-07-08 12:25:30','2026-07-08 12:25:30'),
(22,27,'Rock Werchter','Belgian rock festival.','2027-07-03 14:00:00','2027-07-04 02:00:00',12,88000,NULL,NULL,'published','2026-07-08 12:25:30','2026-07-08 12:25:30'),
(23,37,'Summer Sonic Tokyo','One of Japan\'s biggest festivals.','2027-08-14 14:00:00','2027-08-15 01:00:00',12,65000,NULL,NULL,'published','2026-07-08 12:25:30','2026-07-08 12:25:30'),
(24,38,'Seoul Music Festival','International artists in Seoul.','2027-09-04 16:00:00','2027-09-05 00:30:00',6,30000,NULL,NULL,'published','2026-07-08 12:25:30','2026-07-08 12:25:30'),
(25,40,'Melbourne Rock Night','Rock legends in Australia.','2027-10-08 18:30:00','2027-10-08 23:45:00',12,18000,NULL,NULL,'published','2026-07-08 12:25:30','2026-07-08 12:25:30'),
(26,31,'Foo Fighters Live','One night only.','2027-03-18 20:00:00','2027-03-18 23:00:00',12,21000,NULL,NULL,'published','2026-07-08 12:25:30','2026-07-08 12:25:30'),
(27,34,'Billie Eilish - Hit Me Hard And Soft Tour','Los Angeles.','2027-04-10 20:30:00','2027-04-10 23:00:00',6,20000,NULL,NULL,'published','2026-07-08 12:25:30','2026-07-08 12:25:30'),
(28,33,'Olivia Rodrigo - GUTS Tour','Los Angeles.','2027-05-03 20:30:00','2027-05-03 23:15:00',6,17500,NULL,NULL,'published','2026-07-08 12:25:30','2026-07-08 12:25:30'),
(29,35,'Red Hot Chili Peppers','Toronto.','2027-04-24 20:00:00','2027-04-24 23:00:00',12,19000,NULL,NULL,'published','2026-07-08 12:25:30','2026-07-08 12:25:30'),
(30,39,'Imagine Dragons Australia','Sydney.','2027-02-17 20:00:00','2027-02-17 22:45:00',6,21000,NULL,NULL,'published','2026-07-08 12:25:30','2026-07-08 12:25:30'),
(31,30,'Rammstein Live','Vienna.','2027-08-22 20:30:00','2027-08-22 23:30:00',16,16000,NULL,NULL,'published','2026-07-08 12:25:30','2026-07-08 12:25:30'),
(32,28,'Arctic Monkeys','Milan.','2027-05-18 20:30:00','2027-05-18 23:00:00',6,12500,NULL,NULL,'published','2026-07-08 12:25:30','2026-07-08 12:25:30'),
(33,18,'The Killers','Amsterdam.','2027-03-12 20:00:00','2027-03-12 22:45:00',6,17000,NULL,NULL,'published','2026-07-08 12:25:30','2026-07-08 12:25:30'),
(34,16,'Iron Maiden','Munich.','2027-09-17 20:00:00','2027-09-17 23:15:00',12,15000,NULL,NULL,'published','2026-07-08 12:25:30','2026-07-08 12:25:30'),
(35,21,'System Of A Down','London.','2027-10-30 20:00:00','2027-10-30 23:10:00',16,20000,NULL,NULL,'published','2026-07-08 12:25:30','2026-07-08 12:25:30');
/*!40000 ALTER TABLE `Event` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `Follow`
--

DROP TABLE IF EXISTS `Follow`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8mb4 */;
CREATE TABLE `Follow` (
  `idFollower` int(11) NOT NULL,
  `idFollowing` int(11) NOT NULL,
  `CreatedAt` datetime NOT NULL DEFAULT current_timestamp(),
  PRIMARY KEY (`idFollower`,`idFollowing`),
  KEY `idFollowing` (`idFollowing`),
  CONSTRAINT `Follow_ibfk_1` FOREIGN KEY (`idFollower`) REFERENCES `User` (`idUser`),
  CONSTRAINT `Follow_ibfk_2` FOREIGN KEY (`idFollowing`) REFERENCES `User` (`idUser`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_uca1400_ai_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `Follow`
--

LOCK TABLES `Follow` WRITE;
/*!40000 ALTER TABLE `Follow` DISABLE KEYS */;
INSERT INTO `Follow` VALUES
(1,6,'2026-07-09 12:02:28'),
(1,29,'2026-07-09 12:05:53'),
(42,1,'2026-07-09 10:47:54'),
(42,2,'2026-07-09 11:33:55'),
(42,3,'2026-07-09 11:33:56'),
(42,7,'2026-07-09 11:33:59'),
(42,8,'2026-07-09 11:33:58');
/*!40000 ALTER TABLE `Follow` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `Genre`
--

DROP TABLE IF EXISTS `Genre`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8mb4 */;
CREATE TABLE `Genre` (
  `idGenre` int(11) NOT NULL AUTO_INCREMENT,
  `Name` varchar(100) NOT NULL,
  PRIMARY KEY (`idGenre`)
) ENGINE=InnoDB AUTO_INCREMENT=44 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_uca1400_ai_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `Genre`
--

LOCK TABLES `Genre` WRITE;
/*!40000 ALTER TABLE `Genre` DISABLE KEYS */;
INSERT INTO `Genre` VALUES
(1,'Alternative Rock'),
(2,'Rock'),
(3,'Pop'),
(4,'Pop Rock'),
(5,'Metal'),
(6,'Heavy Metal'),
(7,'Metalcore'),
(8,'Deathcore'),
(9,'Progressive Metal'),
(10,'Hard Rock'),
(11,'Nu Metal'),
(12,'Punk Rock'),
(13,'Pop Punk'),
(14,'Indie Rock'),
(15,'Electronic'),
(16,'Synthwave'),
(17,'EDM'),
(18,'Hip Hop'),
(19,'Rap'),
(20,'R&B'),
(21,'Jazz'),
(22,'Blues'),
(23,'Country'),
(24,'Folk'),
(25,'Classical'),
(26,'Reggae'),
(27,'Ska'),
(28,'Industrial'),
(29,'Ambient'),
(30,'Post Rock'),
(31,'Grunge'),
(32,'Shoegaze'),
(33,'Emo'),
(34,'Symphonic Metal'),
(35,'Black Metal'),
(36,'Thrash Metal'),
(37,'Doom Metal'),
(38,'Power Metal'),
(39,'Alternative Metal'),
(40,'Post Hardcore'),
(41,'Indie Pop'),
(42,'Industrial Metal'),
(43,'Progressive Rock');
/*!40000 ALTER TABLE `Genre` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `Group`
--

DROP TABLE IF EXISTS `Group`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8mb4 */;
CREATE TABLE `Group` (
  `idGroup` int(11) NOT NULL AUTO_INCREMENT,
  `Event_idEvent` int(11) NOT NULL,
  `User_idUser_Owner` int(11) NOT NULL,
  `Name` varchar(45) NOT NULL,
  `Description` varchar(45) DEFAULT NULL,
  `MaxMembers` varchar(45) DEFAULT '10',
  `CreatedAt` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`idGroup`),
  KEY `fk_Group_Event1_idx` (`Event_idEvent`),
  KEY `fk_Group_User1_idx` (`User_idUser_Owner`),
  CONSTRAINT `fk_Group_Event1` FOREIGN KEY (`Event_idEvent`) REFERENCES `Event` (`idEvent`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  CONSTRAINT `fk_Group_User1` FOREIGN KEY (`User_idUser_Owner`) REFERENCES `User` (`idUser`) ON DELETE NO ACTION ON UPDATE NO ACTION
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_uca1400_ai_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `Group`
--

LOCK TABLES `Group` WRITE;
/*!40000 ALTER TABLE `Group` DISABLE KEYS */;
/*!40000 ALTER TABLE `Group` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `Group_has_User`
--

DROP TABLE IF EXISTS `Group_has_User`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8mb4 */;
CREATE TABLE `Group_has_User` (
  `Group_idGroup` int(11) NOT NULL,
  `User_idUser` int(11) NOT NULL,
  `JoinedAt` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`Group_idGroup`,`User_idUser`),
  KEY `fk_Group_has_User_User1_idx` (`User_idUser`),
  KEY `fk_Group_has_User_Group1_idx` (`Group_idGroup`),
  CONSTRAINT `fk_Group_has_User_Group1` FOREIGN KEY (`Group_idGroup`) REFERENCES `Group` (`idGroup`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  CONSTRAINT `fk_Group_has_User_User1` FOREIGN KEY (`User_idUser`) REFERENCES `User` (`idUser`) ON DELETE NO ACTION ON UPDATE NO ACTION
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_uca1400_ai_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `Group_has_User`
--

LOCK TABLES `Group_has_User` WRITE;
/*!40000 ALTER TABLE `Group_has_User` DISABLE KEYS */;
/*!40000 ALTER TABLE `Group_has_User` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `Message`
--

DROP TABLE IF EXISTS `Message`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8mb4 */;
CREATE TABLE `Message` (
  `idMessage` int(11) NOT NULL AUTO_INCREMENT,
  `Group_idGroup` int(11) NOT NULL,
  `User_idUser` int(11) NOT NULL,
  `Content` varchar(255) DEFAULT NULL,
  `SentAt` timestamp NULL DEFAULT NULL,
  `EditedAt` timestamp NULL DEFAULT NULL,
  `DeletedAt` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`idMessage`),
  KEY `fk_Message_Group1_idx` (`Group_idGroup`),
  KEY `fk_Message_User1_idx` (`User_idUser`),
  CONSTRAINT `fk_Message_Group1` FOREIGN KEY (`Group_idGroup`) REFERENCES `Group` (`idGroup`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  CONSTRAINT `fk_Message_User1` FOREIGN KEY (`User_idUser`) REFERENCES `User` (`idUser`) ON DELETE NO ACTION ON UPDATE NO ACTION
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_uca1400_ai_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `Message`
--

LOCK TABLES `Message` WRITE;
/*!40000 ALTER TABLE `Message` DISABLE KEYS */;
/*!40000 ALTER TABLE `Message` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `Notification`
--

DROP TABLE IF EXISTS `Notification`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8mb4 */;
CREATE TABLE `Notification` (
  `idNotification` int(11) NOT NULL AUTO_INCREMENT,
  `idUser` int(11) DEFAULT NULL,
  `Text` varchar(100) NOT NULL,
  `CreatedAt` datetime NOT NULL DEFAULT current_timestamp(),
  PRIMARY KEY (`idNotification`),
  KEY `Notification_User_FK` (`idUser`),
  CONSTRAINT `Notification_User_FK` FOREIGN KEY (`idUser`) REFERENCES `User` (`idUser`) ON DELETE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=13 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_uca1400_ai_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `Notification`
--

LOCK TABLES `Notification` WRITE;
/*!40000 ALTER TABLE `Notification` DISABLE KEYS */;
INSERT INTO `Notification` VALUES
(11,6,'João Silva started following you.','2026-07-09 12:02:28'),
(12,29,'João Silva started following you.','2026-07-09 12:05:53');
/*!40000 ALTER TABLE `Notification` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `Photo`
--

DROP TABLE IF EXISTS `Photo`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8mb4 */;
CREATE TABLE `Photo` (
  `idPhoto` int(11) NOT NULL AUTO_INCREMENT,
  `Description` varchar(45) DEFAULT NULL,
  `Photo` varchar(255) NOT NULL,
  `User_idUser` int(11) NOT NULL,
  `Concert_idConcert` int(11) NOT NULL,
  PRIMARY KEY (`idPhoto`),
  KEY `fk_Photo_User1_idx` (`User_idUser`),
  KEY `fk_Photo_Concert1_idx` (`Concert_idConcert`),
  CONSTRAINT `fk_Photo_Concert1` FOREIGN KEY (`Concert_idConcert`) REFERENCES `Concert` (`idConcert`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  CONSTRAINT `fk_Photo_User1` FOREIGN KEY (`User_idUser`) REFERENCES `User` (`idUser`) ON DELETE NO ACTION ON UPDATE NO ACTION
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_uca1400_ai_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `Photo`
--

LOCK TABLES `Photo` WRITE;
/*!40000 ALTER TABLE `Photo` DISABLE KEYS */;
/*!40000 ALTER TABLE `Photo` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `Review`
--

DROP TABLE IF EXISTS `Review`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8mb4 */;
CREATE TABLE `Review` (
  `idReview` int(11) NOT NULL AUTO_INCREMENT,
  `User_idUser` int(11) NOT NULL,
  `Concert_idConcert` int(11) NOT NULL,
  `Rating` decimal(2,1) NOT NULL,
  `Text` text NOT NULL,
  `CreatedAt` datetime NOT NULL DEFAULT current_timestamp(),
  PRIMARY KEY (`idReview`),
  KEY `fk_Review_User` (`User_idUser`),
  KEY `fk_Review_Concert` (`Concert_idConcert`),
  CONSTRAINT `fk_Review_Concert` FOREIGN KEY (`Concert_idConcert`) REFERENCES `Concert` (`idConcert`) ON DELETE CASCADE ON UPDATE CASCADE,
  CONSTRAINT `fk_Review_User` FOREIGN KEY (`User_idUser`) REFERENCES `User` (`idUser`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_uca1400_ai_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `Review`
--

LOCK TABLES `Review` WRITE;
/*!40000 ALTER TABLE `Review` DISABLE KEYS */;
INSERT INTO `Review` VALUES
(1,42,2,3.0,'teste','2026-07-09 14:45:38'),
(2,42,2,1.5,'a','2026-07-09 14:51:05');
/*!40000 ALTER TABLE `Review` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `User`
--

DROP TABLE IF EXISTS `User`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8mb4 */;
CREATE TABLE `User` (
  `idUser` int(11) NOT NULL AUTO_INCREMENT,
  `Name` varchar(255) NOT NULL,
  `Email` varchar(255) NOT NULL,
  `Password` varchar(255) NOT NULL,
  `PFP` varchar(255) DEFAULT 'uploads/profile_pictures/default.webp',
  `Birthday` date NOT NULL,
  `Country_idCountry` int(11) NOT NULL,
  `Verified` tinyint(4) DEFAULT 0,
  `Type` varchar(45) NOT NULL DEFAULT 'User',
  `Username` varchar(45) NOT NULL,
  `RememberToken` varchar(64) DEFAULT NULL,
  PRIMARY KEY (`idUser`),
  UNIQUE KEY `Username_UNIQUE` (`Username`),
  UNIQUE KEY `Email_UNIQUE` (`Email`),
  KEY `fk_User_Country1_idx` (`Country_idCountry`),
  CONSTRAINT `fk_User_Country1` FOREIGN KEY (`Country_idCountry`) REFERENCES `Country` (`idCountry`) ON DELETE NO ACTION ON UPDATE NO ACTION
) ENGINE=InnoDB AUTO_INCREMENT=43 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_uca1400_ai_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `User`
--

LOCK TABLES `User` WRITE;
/*!40000 ALTER TABLE `User` DISABLE KEYS */;
INSERT INTO `User` VALUES
(1,'João Silva','joao.silva@crowdex.test','$2y$12$ahGdSL/ghzdT5FEiuKS3xODBEGcI2ykuT.0bNhLOszWIiunkJc1oy','uploads/profile_pictures/default.webp','2001-03-14',1,1,'User','joaosilva',NULL),
(2,'Maria Costa','maria.costa@crowdex.test','$2y$12$ahGdSL/ghzdT5FEiuKS3xODBEGcI2ykuT.0bNhLOszWIiunkJc1oy','uploads/profile_pictures/default.webp','1999-08-22',1,1,'User','mariacosta',NULL),
(3,'Pedro Fernandes','pedro.fernandes@crowdex.test','$2y$12$ahGdSL/ghzdT5FEiuKS3xODBEGcI2ykuT.0bNhLOszWIiunkJc1oy','uploads/profile_pictures/default.webp','1998-01-11',1,1,'User','pedrof',NULL),
(4,'Ana Martins','ana.martins@crowdex.test','$2y$12$ahGdSL/ghzdT5FEiuKS3xODBEGcI2ykuT.0bNhLOszWIiunkJc1oy','uploads/profile_pictures/default.webp','2002-05-30',1,1,'User','anamartins',NULL),
(5,'Lucas Pereira','lucas.pereira@crowdex.test','$2y$12$ahGdSL/ghzdT5FEiuKS3xODBEGcI2ykuT.0bNhLOszWIiunkJc1oy','uploads/profile_pictures/default.webp','2000-11-18',1,1,'User','lucasp',NULL),
(6,'Tiago Rocha','tiago.rocha@crowdex.test','$2y$12$ahGdSL/ghzdT5FEiuKS3xODBEGcI2ykuT.0bNhLOszWIiunkJc1oy','uploads/profile_pictures/default.webp','1997-07-06',1,1,'User','tiagor',NULL),
(7,'Sofia Almeida','sofia.almeida@crowdex.test','$2y$12$ahGdSL/ghzdT5FEiuKS3xODBEGcI2ykuT.0bNhLOszWIiunkJc1oy','uploads/profile_pictures/default.webp','2003-02-17',1,1,'User','sofiaalmeida',NULL),
(8,'Miguel Sousa','miguel.sousa@crowdex.test','$2y$12$ahGdSL/ghzdT5FEiuKS3xODBEGcI2ykuT.0bNhLOszWIiunkJc1oy','uploads/profile_pictures/default.webp','1996-09-04',1,1,'User','miguels',NULL),
(9,'Inês Ferreira','ines.ferreira@crowdex.test','$2y$12$ahGdSL/ghzdT5FEiuKS3xODBEGcI2ykuT.0bNhLOszWIiunkJc1oy','uploads/profile_pictures/default.webp','2004-06-25',1,1,'User','inesf',NULL),
(10,'Carlos Mendes','carlos.mendes@crowdex.test','$2y$12$ahGdSL/ghzdT5FEiuKS3xODBEGcI2ykuT.0bNhLOszWIiunkJc1oy','uploads/profile_pictures/default.webp','1995-10-10',1,1,'User','carlosm',NULL),
(11,'Emily Brown','emily.brown@crowdex.test','$2y$12$ahGdSL/ghzdT5FEiuKS3xODBEGcI2ykuT.0bNhLOszWIiunkJc1oy','uploads/profile_pictures/default.webp','2000-04-20',21,1,'User','emilybrown',NULL),
(12,'Oliver Smith','oliver.smith@crowdex.test','$2y$12$ahGdSL/ghzdT5FEiuKS3xODBEGcI2ykuT.0bNhLOszWIiunkJc1oy','uploads/profile_pictures/default.webp','1998-12-08',21,1,'User','olivers',NULL),
(13,'Emma Taylor','emma.taylor@crowdex.test','$2y$12$ahGdSL/ghzdT5FEiuKS3xODBEGcI2ykuT.0bNhLOszWIiunkJc1oy','uploads/profile_pictures/default.webp','2002-03-02',21,1,'User','emmataylor',NULL),
(14,'James Carter','james.carter@crowdex.test','$2y$12$ahGdSL/ghzdT5FEiuKS3xODBEGcI2ykuT.0bNhLOszWIiunkJc1oy','uploads/profile_pictures/default.webp','1997-05-16',21,1,'User','jamescarter',NULL),
(15,'Charlotte Hall','charlotte.hall@crowdex.test','$2y$12$ahGdSL/ghzdT5FEiuKS3xODBEGcI2ykuT.0bNhLOszWIiunkJc1oy','uploads/profile_pictures/default.webp','1999-08-13',21,1,'User','charhall',NULL),
(16,'Liam Scott','liam.scott@crowdex.test','$2y$12$ahGdSL/ghzdT5FEiuKS3xODBEGcI2ykuT.0bNhLOszWIiunkJc1oy','uploads/profile_pictures/default.webp','2001-09-29',21,1,'User','liamscott',NULL),
(17,'Noah Walker','noah.walker@crowdex.test','$2y$12$ahGdSL/ghzdT5FEiuKS3xODBEGcI2ykuT.0bNhLOszWIiunkJc1oy','uploads/profile_pictures/default.webp','2003-01-09',33,1,'User','noahwalker',NULL),
(18,'Mia Cooper','mia.cooper@crowdex.test','$2y$12$ahGdSL/ghzdT5FEiuKS3xODBEGcI2ykuT.0bNhLOszWIiunkJc1oy','uploads/profile_pictures/default.webp','2004-07-14',33,1,'User','miacooper',NULL),
(19,'Olivia Green','olivia.green@crowdex.test','$2y$12$ahGdSL/ghzdT5FEiuKS3xODBEGcI2ykuT.0bNhLOszWIiunkJc1oy','uploads/profile_pictures/default.webp','1998-11-03',33,1,'User','oliviag',NULL),
(20,'Daniel Wilson','daniel.wilson@crowdex.test','$2y$12$ahGdSL/ghzdT5FEiuKS3xODBEGcI2ykuT.0bNhLOszWIiunkJc1oy','uploads/profile_pictures/default.webp','1996-06-06',33,1,'User','danwilson',NULL),
(21,'Alex Johnson','alex.johnson@crowdex.test','$2y$12$ahGdSL/ghzdT5FEiuKS3xODBEGcI2ykuT.0bNhLOszWIiunkJc1oy','uploads/profile_pictures/default.webp','2000-02-27',33,1,'User','alexjohnson',NULL),
(22,'Benjamin Lee','benjamin.lee@crowdex.test','$2y$12$ahGdSL/ghzdT5FEiuKS3xODBEGcI2ykuT.0bNhLOszWIiunkJc1oy','uploads/profile_pictures/default.webp','1997-04-18',34,1,'User','benlee',NULL),
(23,'Ethan Moore','ethan.moore@crowdex.test','$2y$12$ahGdSL/ghzdT5FEiuKS3xODBEGcI2ykuT.0bNhLOszWIiunkJc1oy','uploads/profile_pictures/default.webp','2002-09-11',34,1,'User','ethanmoore',NULL),
(24,'Isabella Young','isabella.young@crowdex.test','$2y$12$ahGdSL/ghzdT5FEiuKS3xODBEGcI2ykuT.0bNhLOszWIiunkJc1oy','uploads/profile_pictures/default.webp','2003-12-20',3,1,'User','isabellay',NULL),
(25,'Nathan Martin','nathan.martin@crowdex.test','$2y$12$ahGdSL/ghzdT5FEiuKS3xODBEGcI2ykuT.0bNhLOszWIiunkJc1oy','uploads/profile_pictures/default.webp','1995-08-30',3,1,'User','nathanmartin',NULL),
(26,'Julien Bernard','julien.bernard@crowdex.test','$2y$12$ahGdSL/ghzdT5FEiuKS3xODBEGcI2ykuT.0bNhLOszWIiunkJc1oy','uploads/profile_pictures/default.webp','1998-01-22',3,1,'User','julienb',NULL),
(27,'Hans Müller','hans.mueller@crowdex.test','$2y$12$ahGdSL/ghzdT5FEiuKS3xODBEGcI2ykuT.0bNhLOszWIiunkJc1oy','uploads/profile_pictures/default.webp','1996-03-18',4,1,'User','hansmueller',NULL),
(28,'Luca Rossi','luca.rossi@crowdex.test','$2y$12$ahGdSL/ghzdT5FEiuKS3xODBEGcI2ykuT.0bNhLOszWIiunkJc1oy','uploads/profile_pictures/default.webp','2001-05-01',5,1,'User','lucarossi',NULL),
(29,'Yuki Tanaka','yuki.tanaka@crowdex.test','$2y$12$ahGdSL/ghzdT5FEiuKS3xODBEGcI2ykuT.0bNhLOszWIiunkJc1oy','uploads/profile_pictures/default.webp','1999-10-27',40,1,'User','yukitanaka',NULL),
(30,'Min-Jun Kim','minjun.kim@crowdex.test','$2y$12$ahGdSL/ghzdT5FEiuKS3xODBEGcI2ykuT.0bNhLOszWIiunkJc1oy','uploads/profile_pictures/default.webp','2002-02-12',41,1,'User','minjunkim',NULL),
(31,'João Costa','joao.costa2@crowdex.test','$2y$12$ahGdSL/ghzdT5FEiuKS3xODBEGcI2ykuT.0bNhLOszWIiunkJc1oy','uploads/profile_pictures/default.webp','1999-04-18',1,1,'User','joaocosta',NULL),
(32,'Maria Silva','maria.silva2@crowdex.test','$2y$12$ahGdSL/ghzdT5FEiuKS3xODBEGcI2ykuT.0bNhLOszWIiunkJc1oy','uploads/profile_pictures/default.webp','2001-01-30',1,1,'User','mariasilva',NULL),
(33,'Pedro Costa','pedro.costa2@crowdex.test','$2y$12$ahGdSL/ghzdT5FEiuKS3xODBEGcI2ykuT.0bNhLOszWIiunkJc1oy','uploads/profile_pictures/default.webp','1998-07-09',1,1,'User','pedrocosta',NULL),
(34,'Ana Costa','ana.costa2@crowdex.test','$2y$12$ahGdSL/ghzdT5FEiuKS3xODBEGcI2ykuT.0bNhLOszWIiunkJc1oy','uploads/profile_pictures/default.webp','2000-12-15',1,1,'User','anacosta',NULL),
(35,'Miguel Silva','miguel.silva2@crowdex.test','$2y$12$ahGdSL/ghzdT5FEiuKS3xODBEGcI2ykuT.0bNhLOszWIiunkJc1oy','uploads/profile_pictures/default.webp','1997-10-02',1,1,'User','miguelsilva',NULL),
(36,'Coldplay Fan','coldplayfan@crowdex.test','$2y$12$ahGdSL/ghzdT5FEiuKS3xODBEGcI2ykuT.0bNhLOszWIiunkJc1oy','uploads/profile_pictures/default.webp','2000-03-15',1,1,'User','coldplayfan',NULL),
(37,'Sleep Token Addict','sleeptoken@crowdex.test','$2y$12$ahGdSL/ghzdT5FEiuKS3xODBEGcI2ykuT.0bNhLOszWIiunkJc1oy','uploads/profile_pictures/default.webp','1999-08-20',1,1,'User','sleepytoken',NULL),
(38,'Metallica Forever','metallica@crowdex.test','$2y$12$ahGdSL/ghzdT5FEiuKS3xODBEGcI2ykuT.0bNhLOszWIiunkJc1oy','uploads/profile_pictures/default.webp','1998-06-11',1,1,'User','metalhead99',NULL),
(39,'Ghost Fan','ghostfan@crowdex.test','$2y$12$ahGdSL/ghzdT5FEiuKS3xODBEGcI2ykuT.0bNhLOszWIiunkJc1oy','uploads/profile_pictures/default.webp','2001-11-03',1,1,'User','ghostlover',NULL),
(40,'BMTH Fan','bmth@crowdex.test','$2y$12$ahGdSL/ghzdT5FEiuKS3xODBEGcI2ykuT.0bNhLOszWIiunkJc1oy','uploads/profile_pictures/default.webp','2002-02-18',1,1,'User','bmthlover',NULL),
(41,'Muse Lover','muse@crowdex.test','$2y$12$ahGdSL/ghzdT5FEiuKS3xODBEGcI2ykuT.0bNhLOszWIiunkJc1oy','uploads/profile_pictures/default.webp','1997-07-01',1,1,'User','muselover',NULL),
(42,'Hugo Leal','hugo.leal7755@gmail.com','$2y$12$Nx3r2GmWXJGyHsZAPXwr2eAkZlQoWjP3u1vX7YippxSPtPvi./z6u','uploads/profile_pictures/997520585f21e1af9f80cb6362da2e41.webp','2026-07-16',42,0,'User','admin','6a4ae6a15919399d606eb4d491aef4eeab1b64fcb8f9d071949da93c050c6c7b');
/*!40000 ALTER TABLE `User` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `User_has_Event`
--

DROP TABLE IF EXISTS `User_has_Event`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8mb4 */;
CREATE TABLE `User_has_Event` (
  `User_idUser` int(11) NOT NULL,
  `Event_idEvent` int(11) NOT NULL,
  PRIMARY KEY (`User_idUser`,`Event_idEvent`),
  KEY `fk_User_has_Event_Event1_idx` (`Event_idEvent`),
  KEY `fk_User_has_Event_User1_idx` (`User_idUser`),
  CONSTRAINT `fk_User_has_Event_Event1` FOREIGN KEY (`Event_idEvent`) REFERENCES `Event` (`idEvent`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  CONSTRAINT `fk_User_has_Event_User1` FOREIGN KEY (`User_idUser`) REFERENCES `User` (`idUser`) ON DELETE NO ACTION ON UPDATE NO ACTION
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_uca1400_ai_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `User_has_Event`
--

LOCK TABLES `User_has_Event` WRITE;
/*!40000 ALTER TABLE `User_has_Event` DISABLE KEYS */;
/*!40000 ALTER TABLE `User_has_Event` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `Venue`
--

DROP TABLE IF EXISTS `Venue`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8mb4 */;
CREATE TABLE `Venue` (
  `idVenue` int(11) NOT NULL AUTO_INCREMENT,
  `City_idCity` int(11) NOT NULL,
  `Name` varchar(255) DEFAULT NULL,
  `Address` varchar(255) NOT NULL,
  `ZipCode` varchar(255) NOT NULL,
  `Latitude` decimal(9,6) NOT NULL,
  `Longitude` decimal(9,6) NOT NULL,
  PRIMARY KEY (`idVenue`),
  KEY `fk_Venue_City1_idx` (`City_idCity`),
  CONSTRAINT `fk_Venue_City1` FOREIGN KEY (`City_idCity`) REFERENCES `City` (`idCity`) ON DELETE NO ACTION ON UPDATE NO ACTION
) ENGINE=InnoDB AUTO_INCREMENT=41 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_uca1400_ai_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `Venue`
--

LOCK TABLES `Venue` WRITE;
/*!40000 ALTER TABLE `Venue` DISABLE KEYS */;
INSERT INTO `Venue` VALUES
(1,1,'MEO Arena','Rossio dos Olivais, Lote 2.13.01','1990-231',38.768900,-9.101700),
(2,2,'Super Bock Arena','Rua de Júlio Dinis','4050-318',41.149600,-8.610900),
(3,3,'Altice Forum Braga','Praça do Município','4700-435',41.550200,-8.426500),
(4,2,'Coliseu do Porto','Rua de Passos Manuel 137','4000-385',41.145600,-8.612600),
(5,1,'Campo Pequeno','Praça do Campo Pequeno','1000-082',38.745000,-9.136600),
(6,1,'Coliseu dos Recreios','Rua das Portas de Santo Antão 96','1150-269',38.715900,-9.139200),
(7,3,'Multiusos de Guimarães','Alameda Cidade de Lisboa','4810-445',41.444700,-8.291900),
(8,8,'Movistar Arena','Avenida Felipe II','28009',40.423100,-3.668800),
(9,9,'Palau Sant Jordi','Passeig Olímpic','08038',41.366000,2.152200),
(10,10,'Bilbao Arena','Askatasuna Hiribidea','48003',43.262700,-2.935000),
(11,8,'Cívitas Metropolitano','Av. de Luis Aragonés','28022',40.436200,-3.599500),
(12,13,'Accor Arena','8 Boulevard de Bercy','75012',48.838100,2.378800),
(13,13,'Paris La Défense Arena','99 Jardins de l\'Arche','92000',48.891000,2.240100),
(14,16,'Uber Arena','Mercedes Platz 1','10243',52.507600,13.443300),
(15,17,'Barclays Arena','Sylvesterallee 10','22525',53.587000,9.898300),
(16,18,'Olympiahalle','Spiridon-Louis-Ring 21','80809',48.181200,11.554500),
(17,19,'Lanxess Arena','Willy-Brandt-Platz 3','50679',50.938200,6.982200),
(18,25,'Ziggo Dome','De Passage 100','1101 AX',52.312500,4.944200),
(19,25,'Johan Cruijff Arena','Johan Cruijff Boulevard 1','1101 AX',52.314400,4.941100),
(20,29,'Wembley Stadium','Wembley Park','HA9 0WS',51.556000,-0.279600),
(21,29,'The O2','Peninsula Square','SE10 0DX',51.503000,0.003200),
(22,30,'AO Arena','Victoria Station','M3 1AR',53.488000,-2.243500),
(23,31,'Utilita Arena Birmingham','King Edwards Road','B1 2AA',52.479700,-1.916200),
(24,32,'OVO Hydro','Exhibition Way','G3 8YW',55.860700,-4.287100),
(25,33,'Avicii Arena','Globentorget 2','12177',59.293000,18.083900),
(26,35,'Royal Arena','Hannemanns Allé 18','2300',55.628000,12.580700),
(27,23,'Sportpaleis','Schijnpoortweg 119','2170',51.230400,4.441600),
(28,21,'Mediolanum Forum','Via Giuseppe di Vittorio 6','20090',45.478000,9.145000),
(29,39,'Hallenstadion','Wallisellenstrasse 45','8050',47.411400,8.551300),
(30,38,'Wiener Stadthalle','Roland-Rainer-Platz 1','1150',48.202700,16.337500),
(31,43,'Madison Square Garden','4 Pennsylvania Plaza','10001',40.750500,-73.993400),
(32,44,'United Center','1901 W Madison St','60612',41.880700,-87.674200),
(33,45,'Kia Forum','3900 W Manchester Blvd','90305',33.958000,-118.341700),
(34,45,'Crypto.com Arena','1111 S Figueroa St','90015',34.043000,-118.267300),
(35,48,'Scotiabank Arena','40 Bay St','M5J 2X2',43.643500,-79.379100),
(36,49,'Rogers Arena','800 Griffiths Way','V6B 6G1',49.277800,-123.108900),
(37,50,'Tokyo Dome','1-3-61 Koraku','112-0004',35.705600,139.751400),
(38,51,'KSPO Dome','Olympic-ro 424','05540',37.520700,127.124300),
(39,52,'Qudos Bank Arena','19 Edwin Flack Ave','2127',-33.847400,151.063200),
(40,53,'Rod Laver Arena','Batman Ave','3004',-37.821000,144.978700);
/*!40000 ALTER TABLE `Venue` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Dumping routines for database 'Crowdex'
--
/*!40103 SET TIME_ZONE=@OLD_TIME_ZONE */;

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
/*M!100616 SET NOTE_VERBOSITY=@OLD_NOTE_VERBOSITY */;

-- Dump completed on 2026-07-09 15:02:23
