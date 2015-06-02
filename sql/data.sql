-- phpMyAdmin SQL Dump
-- version 4.1.14
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: Jun 02, 2015 at 06:25 AM
-- Server version: 5.6.17
-- PHP Version: 5.5.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `cointheguild`
--
CREATE DATABASE IF NOT EXISTS `cointheguild` DEFAULT CHARACTER SET utf8 COLLATE utf8_unicode_ci;
USE `cointheguild`;

--
-- Dumping data for table `events`
--

INSERT INTO `events` (`eid`, `gid`, `owner`, `name`, `description`, `startdate`, `starttime`, `enddate`, `endtime`, `occurence`) VALUES
(0, 1, 1, 'Weekly Drop Party', 'Friday party', '2015-06-01', '00:18:00', '2015-08-02', '00:18:30', 7),
(0, 1, 1, 'Daily Dungeon', 'Drop party', '2015-06-01', '00:18:00', '2015-08-02', '00:18:30', 1),
(0, 1, 1, 'Weekly Drop Party', 'Drop party', '2015-06-01', '00:18:00', '2015-08-02', '00:18:30', 7);

--
-- Dumping data for table `forums`
--

INSERT INTO `forums` (`fid`, `gid`, `name`, `description`) VALUES
(1, 1, 'Game', 'Discussions about the game');

--
-- Dumping data for table `guilds`
--

INSERT INTO `guilds` (`gid`, `name`, `owner`, `motto`, `description`, `created`, `game`) VALUES
(1, 'Hyperion', 1, 'You Lose', NULL, '0000-00-00 00:00:00', 'TERA');

--
-- Dumping data for table `membership`
--

INSERT INTO `membership` (`gid`, `uid`, `displayas`, `joined`, `quit`) VALUES
(1, 1, 'Satoshi', '2015-06-01 21:51:24', '0000-00-00 00:00:00'),
(1, 2, '000F', '2015-06-01 21:51:38', '0000-00-00 00:00:00'),
(1, 3, NULL, '2015-06-01 21:53:58', '0000-00-00 00:00:00');

--
-- Dumping data for table `replies`
--

INSERT INTO `replies` (`rid`, `tid`, `poster`, `content`, `posted`, `edited`, `original`) VALUES
(2, 2, 3, 'This is a very good guide', '2015-06-01 23:20:25', '0000-00-00 00:00:00', ''),
(3, 2, 2, 'I agree with this comment', '2015-06-01 23:20:51', '0000-00-00 00:00:00', '');

--
-- Dumping data for table `threads`
--

INSERT INTO `threads` (`tid`, `fid`, `title`, `poster`, `content`, `posted`, `edited`, `original`) VALUES
(2, 1, '[GUIDE] How to die', 2, 'This is how you die', '2015-06-01 21:55:34', '0000-00-00 00:00:00', NULL),
(7, 1, 'This is a test', 2, 'Thi sis  a aihediohdrg huierghuierghuiergrhuihuilghuiedrguiedrghuirghu', '2015-06-01 23:07:01', '0000-00-00 00:00:00', NULL);

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`uid`, `username`, `password`, `email`, `joined`, `lastlogin`) VALUES
(1, 'satoshi', 'password', 'no@no.com', '2015-06-01 21:14:10', '2015-06-01 21:14:11'),
(2, '0001', 'password', 'yes@yes.com', '2015-06-01 21:14:28', '2015-06-01 21:14:29'),
(3, '12egg', 'password', 'maybe@maybe.com', '2015-06-01 21:28:50', '2015-06-01 21:28:50');

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
