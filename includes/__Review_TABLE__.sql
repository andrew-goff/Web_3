-- phpMyAdmin SQL Dump
-- version 3.3.10.4
-- http://www.phpmyadmin.net
--
-- Host: mysql.ccacolchester.com
-- Generation Time: Dec 02, 2015 at 08:13 AM
-- Server version: 5.6.25
-- PHP Version: 5.5.26

SET SQL_MODE="NO_AUTO_VALUE_ON_ZERO";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `andrewg8460`
--

-- --------------------------------------------------------

--
-- Table structure for table `Review`
--

CREATE TABLE IF NOT EXISTS `Review` (
  `customerid` int(11) NOT NULL AUTO_INCREMENT,
  `bookheading` varchar(30) NOT NULL,
  `bookcomments` varchar(80) NOT NULL,
  `bookrating` int(11) NOT NULL,
  `reviewdate` datetime DEFAULT NULL,
  KEY `customerid` (`customerid`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 AUTO_INCREMENT=3 ;

--
-- Dumping data for table `Review`
--

INSERT INTO `Review` (`customerid`, `bookheading`, `bookcomments`, `bookrating`, `reviewdate`) VALUES
(1, 'Halo: Last Light', 'Good Book. Recommendable for others.', 4, '2015-10-18 21:30:00'),
(2, 'Halo: Hunters in the Dark', 'Reasonably good book. Quite good overall. Would be suitable for other people.', 4, '2015-11-25 09:27:06');
