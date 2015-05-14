-- phpMyAdmin SQL Dump
-- version 4.0.10deb1
-- http://www.phpmyadmin.net
--
-- Host: localhost
-- Generation Time: May 13, 2015 at 10:04 PM
-- Server version: 5.5.43-0ubuntu0.14.04.1
-- PHP Version: 5.5.9-1ubuntu4.9

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `cointheguild`
--

-- --------------------------------------------------------

--
-- Table structure for table `events`
--

CREATE TABLE IF NOT EXISTS `events` (
  `eid` int(11) NOT NULL,
  `gid` int(11) NOT NULL,
  `owner` int(11) NOT NULL,
  `name` varchar(45) CHARACTER SET latin1 NOT NULL,
  `description` text CHARACTER SET latin1 NOT NULL,
  `startdate` date NOT NULL,
  `starttime` time NOT NULL,
  `enddate` date NOT NULL,
  `endtime` time NOT NULL,
  `occurence` int(11) NOT NULL,
  UNIQUE KEY `FK_guild_event` (`gid`),
  UNIQUE KEY `FK_owner_event` (`owner`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `forums`
--

CREATE TABLE IF NOT EXISTS `forums` (
  `fid` int(11) NOT NULL AUTO_INCREMENT,
  `gid` int(11) NOT NULL,
  `name` varchar(45) NOT NULL,
  `description` text NOT NULL,
  PRIMARY KEY (`fid`),
  UNIQUE KEY `FK_forum_guild` (`gid`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `guilds`
--

CREATE TABLE IF NOT EXISTS `guilds` (
  `gid` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(45) COLLATE utf8_unicode_ci NOT NULL,
  `owner` int(11) NOT NULL,
  `motto` text COLLATE utf8_unicode_ci NOT NULL,
  `description` text COLLATE utf8_unicode_ci,
  `created` datetime NOT NULL,
  `game` varchar(45) COLLATE utf8_unicode_ci NOT NULL,
  PRIMARY KEY (`gid`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `membership`
--

CREATE TABLE IF NOT EXISTS `membership` (
  `gid` int(11) NOT NULL,
  `uid` int(11) NOT NULL,
  KEY `FK_guild_user` (`gid`),
  KEY `FK_user_guild` (`uid`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `replies`
--

CREATE TABLE IF NOT EXISTS `replies` (
  `rid` int(11) NOT NULL AUTO_INCREMENT,
  `tid` int(11) NOT NULL,
  `poster` int(11) NOT NULL,
  `content` text NOT NULL,
  `posted` datetime NOT NULL,
  `edited` datetime NOT NULL,
  `original` text NOT NULL,
  PRIMARY KEY (`rid`),
  UNIQUE KEY `FK_reply_user` (`poster`),
  UNIQUE KEY `FK_reply_thread` (`tid`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `threads`
--

CREATE TABLE IF NOT EXISTS `threads` (
  `tid` int(11) NOT NULL AUTO_INCREMENT,
  `title` text NOT NULL,
  `poster` int(11) NOT NULL,
  `content` text NOT NULL,
  `posted` datetime NOT NULL,
  `edited` datetime DEFAULT NULL,
  `original` text,
  `fid` int(11) DEFAULT NULL,
  PRIMARY KEY (`tid`),
  UNIQUE KEY `FK_poster_user` (`poster`),
  KEY `tid` (`tid`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE IF NOT EXISTS `users` (
  `uid` int(10) NOT NULL AUTO_INCREMENT,
  `username` varchar(20) COLLATE utf8_unicode_ci NOT NULL,
  `password` varchar(30) COLLATE utf8_unicode_ci NOT NULL,
  `email` varchar(254) COLLATE utf8_unicode_ci NOT NULL,
  `joined` datetime NOT NULL,
  `lastlogin` datetime NOT NULL,
  PRIMARY KEY (`uid`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=1 ;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `events`
--
ALTER TABLE `events`
  ADD CONSTRAINT `events_ibfk_2` FOREIGN KEY (`owner`) REFERENCES `users` (`uid`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `events_ibfk_1` FOREIGN KEY (`gid`) REFERENCES `guilds` (`gid`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Constraints for table `forums`
--
ALTER TABLE `forums`
  ADD CONSTRAINT `forums_ibfk_1` FOREIGN KEY (`gid`) REFERENCES `guilds` (`gid`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Constraints for table `membership`
--
ALTER TABLE `membership`
  ADD CONSTRAINT `membership_ibfk_2` FOREIGN KEY (`uid`) REFERENCES `users` (`uid`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `membership_ibfk_1` FOREIGN KEY (`gid`) REFERENCES `guilds` (`gid`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Constraints for table `replies`
--
ALTER TABLE `replies`
  ADD CONSTRAINT `replies_ibfk_2` FOREIGN KEY (`poster`) REFERENCES `threads` (`poster`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `replies_ibfk_1` FOREIGN KEY (`tid`) REFERENCES `threads` (`tid`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Constraints for table `threads`
--
ALTER TABLE `threads`
  ADD CONSTRAINT `threads_ibfk_1` FOREIGN KEY (`poster`) REFERENCES `users` (`uid`) ON DELETE NO ACTION ON UPDATE NO ACTION;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
