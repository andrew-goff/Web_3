-- phpMyAdmin SQL Dump
-- version 3.3.10.4
-- http://www.phpmyadmin.net
--
-- Host: mysql.ccacolchester.com
-- Generation Time: Dec 02, 2015 at 06:58 AM
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
-- Table structure for table `eBook`
--

CREATE TABLE IF NOT EXISTS `eBook` (
  `sin` int(11) NOT NULL AUTO_INCREMENT,
  `authorid` int(11) DEFAULT NULL,
  `title` varchar(30) NOT NULL,
  `synopsis` varchar(50) NOT NULL,
  `author` varchar(30) NOT NULL,
  `genre` varchar(30) NOT NULL,
  `publisher` varchar(30) NOT NULL,
  `price` decimal(3,2) DEFAULT NULL,
  `format` varchar(30) NOT NULL,
  `publicationdate` datetime DEFAULT NULL,
  PRIMARY KEY (`sin`),
  KEY `authorid` (`authorid`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=101562146 ;

--
-- Dumping data for table `eBook`
--

INSERT INTO `eBook` (`sin`, `authorid`, `title`, `synopsis`, `author`, `genre`, `publisher`, `price`, `format`, `publicationdate`) VALUES
(101015634, 15, '-Hunters in the Dark', 'It is 2553, and the three-decade-long Covenant War', 'Al Grant	', 'Science-Fiction Fantasy', 'Titan Books', 4.80, 'PDF', '2015-11-16 06:22:39'),
(101562141, 1, 'Halo: Last Light', 'A', 'Troy Denning', 'Science-Fiction', 'Titan Books', 6.00, 'PDF', '2015-09-30 12:30:00'),
(101562144, 17, 'PHP Crash Course	', 'Learn PHP the quick and easy way!', 'Miles Motchen	', 'Non-Fiction', 'Nixon Publishing', 4.30, 'PDF', '2015-12-02 03:39:01'),
(101562145, 16, 'PHP and MySQL ineasysteps', 'Plain English and easy to follow. No technical jar', 'Andros Likel', 'Non-Fiction', 'In Easy Steps Limited', 4.80, 'PDF', '2015-12-02 06:40:02');
