-- --------------------------------------------------------
-- Host:                         127.0.0.1
-- Server version:               5.7.14 - MySQL Community Server (GPL)
-- Server OS:                    Win64
-- HeidiSQL Version:             9.4.0.5125
-- --------------------------------------------------------

/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET NAMES utf8 */;
/*!50503 SET NAMES utf8mb4 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;


-- Dumping database structure for cointheguild
DROP DATABASE IF EXISTS `cointheguild`;
CREATE DATABASE IF NOT EXISTS `cointheguild` /*!40100 DEFAULT CHARACTER SET latin1 */;
USE `cointheguild`;


-- Data exporting was unselected.
-- Dumping structure for table cointheguild.users
DROP TABLE IF EXISTS `users`;
CREATE TABLE IF NOT EXISTS `users` (
  `uid` int(10) NOT NULL AUTO_INCREMENT,
  `username` varchar(20) COLLATE utf8_unicode_ci NOT NULL,
  `password` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `email` varchar(254) COLLATE utf8_unicode_ci NOT NULL,
  `joined` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `last_on` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`uid`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- Data exporting was unselected.
-- Dumping structure for table cointheguild.guilds
DROP TABLE IF EXISTS `guilds`;
CREATE TABLE IF NOT EXISTS `guilds` (
  `gid` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(45) COLLATE utf8_unicode_ci NOT NULL,
  `owner` int(11) NOT NULL,
  `description` text COLLATE utf8_unicode_ci,
  `about` text COLLATE utf8_unicode_ci,
  `rules` varchar(255) COLLATE utf8_unicode_ci DEFAULT '[]',
  `join` varchar(255) COLLATE utf8_unicode_ci DEFAULT ' ',
  `created` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`gid`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- Data exporting was unselected.
-- Dumping structure for table cointheguild.forums
DROP TABLE IF EXISTS `forums`;
CREATE TABLE IF NOT EXISTS `forums` (
  `fid` int(11) NOT NULL AUTO_INCREMENT,
  `gid` int(11) NOT NULL,
  `name` varchar(45) NOT NULL,
  `description` text NOT NULL,
  PRIMARY KEY (`fid`),
  UNIQUE KEY `FK_forum_guild` (`gid`),
  CONSTRAINT `forums_ibfk_1` FOREIGN KEY (`gid`) REFERENCES `guilds` (`gid`) ON DELETE NO ACTION ON UPDATE NO ACTION
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=latin1;


-- Data exporting was unselected.
-- Dumping structure for table cointheguild.membership
DROP TABLE IF EXISTS `membership`;
CREATE TABLE IF NOT EXISTS `membership` (
  `gid` int(11) NOT NULL,
  `uid` int(11) NOT NULL,
  `role` int(11) NOT NULL DEFAULT '3',
  `motto` varchar(45) COLLATE utf8_unicode_ci DEFAULT NULL,
  `location` varchar(45) COLLATE utf8_unicode_ci DEFAULT NULL,
  `avatar` varchar(50) COLLATE utf8_unicode_ci NOT NULL DEFAULT 'default.png',
  `joined` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `quit` datetime DEFAULT NULL,
  `posts` int(11) NOT NULL DEFAULT '0',
  KEY `FK_guild_user` (`gid`),
  KEY `FK_user_guild` (`uid`),
  CONSTRAINT `membership_ibfk_1` FOREIGN KEY (`gid`) REFERENCES `guilds` (`gid`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  CONSTRAINT `membership_ibfk_2` FOREIGN KEY (`uid`) REFERENCES `users` (`uid`) ON DELETE NO ACTION ON UPDATE NO ACTION
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- Data exporting was unselected.
-- Dumping structure for table cointheguild.replies
DROP TABLE IF EXISTS `replies`;
CREATE TABLE IF NOT EXISTS `replies` (
  `rid` int(11) NOT NULL AUTO_INCREMENT,
  `tid` int(11) NOT NULL,
  `poster` int(11) NOT NULL,
  `content` text NOT NULL,
  `posted` datetime NOT NULL,
  `edited` datetime NOT NULL,
  `original` text NOT NULL,
  PRIMARY KEY (`rid`),
  KEY `FK_reply_user` (`poster`),
  KEY `FK_reply_thread` (`tid`),
  CONSTRAINT `replies_ibfk_1` FOREIGN KEY (`tid`) REFERENCES `threads` (`tid`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  CONSTRAINT `replies_ibfk_2` FOREIGN KEY (`poster`) REFERENCES `users` (`uid`) ON DELETE NO ACTION ON UPDATE NO ACTION
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- Data exporting was unselected.
-- Dumping structure for table cointheguild.threads
DROP TABLE IF EXISTS `threads`;
CREATE TABLE IF NOT EXISTS `threads` (
  `tid` int(11) NOT NULL AUTO_INCREMENT,
  `fid` int(11) DEFAULT NULL,
  `title` text NOT NULL,
  `poster` int(11) NOT NULL,
  `content` text NOT NULL,
  `blog` enum('Y','N') DEFAULT 'N',
  `posted` datetime NOT NULL,
  `edited` datetime DEFAULT NULL,
  `original` text,
  PRIMARY KEY (`tid`),
  KEY `tid` (`tid`),
  KEY `threads_ibfk_2` (`fid`),
  KEY `FK_poster_user` (`poster`),
  CONSTRAINT `threads_ibfk_1` FOREIGN KEY (`poster`) REFERENCES `users` (`uid`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  CONSTRAINT `threads_ibfk_2` FOREIGN KEY (`fid`) REFERENCES `forums` (`fid`) ON DELETE NO ACTION ON UPDATE NO ACTION
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=latin1;

-- Dumping structure for table cointheguild.events
DROP TABLE IF EXISTS `events`;
CREATE TABLE IF NOT EXISTS `events` (
  `eid` int(11) NOT NULL,
  `gid` int(11) NOT NULL,
  `owner` int(11) NOT NULL,
  `name` varchar(45) CHARACTER SET latin1 NOT NULL,
  `description` text CHARACTER SET latin1 NOT NULL,
  `location` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `startdate` date NOT NULL,
  `starttime` time NOT NULL,
  `enddate` date NOT NULL,
  `endtime` time NOT NULL,
  `occurence` int(11) NOT NULL,
  KEY `FK_owner_event` (`owner`),
  KEY `FK_guild_event` (`gid`),
  CONSTRAINT `events_ibfk_1` FOREIGN KEY (`gid`) REFERENCES `guilds` (`gid`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  CONSTRAINT `events_ibfk_2` FOREIGN KEY (`owner`) REFERENCES `users` (`uid`) ON DELETE NO ACTION ON UPDATE NO ACTION
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- Data exporting was unselected.
/*!40101 SET SQL_MODE=IFNULL(@OLD_SQL_MODE, '') */;
/*!40014 SET FOREIGN_KEY_CHECKS=IF(@OLD_FOREIGN_KEY_CHECKS IS NULL, 1, @OLD_FOREIGN_KEY_CHECKS) */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
