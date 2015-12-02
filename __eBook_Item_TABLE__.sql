-- phpMyAdmin SQL Dump
-- version 3.3.10.4
-- http://www.phpmyadmin.net
--
-- Host: mysql.ccacolchester.com
-- Generation Time: Dec 02, 2015 at 06:56 AM
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
-- Table structure for table `Item`
--

CREATE TABLE IF NOT EXISTS `Item` (
  `paymentid` int(11) NOT NULL AUTO_INCREMENT,
  `sin` char(10) DEFAULT NULL,
  `amountdue` decimal(3,2) DEFAULT NULL,
  `licence` varchar(30) NOT NULL DEFAULT '',
  `url` char(230) DEFAULT NULL,
  KEY `paymentid` (`paymentid`),
  KEY `sin` (`sin`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 AUTO_INCREMENT=17 ;

--
-- Dumping data for table `Item`
--

INSERT INTO `Item` (`paymentid`, `sin`, `amountdue`, `licence`, `url`) VALUES
(11, '101015634', 4.80, 'Proprietary', 'http:///customerid/101015634'),
(1, '101015634', 4.80, 'Proprietary', 'NULL'),
(14, '101015634', 4.80, 'Proprietary', 'http:///customerid/101015634'),
(15, '101562141', 6.00, 'Proprietary', 'http:///customerid/101562141'),
(16, '101015634', 4.80, 'Proprietary', 'http:///customerid/101015634');
