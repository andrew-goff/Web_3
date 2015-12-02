-- phpMyAdmin SQL Dump
-- version 3.3.10.4
-- http://www.phpmyadmin.net
--
-- Host: mysql.ccacolchester.com
-- Generation Time: Dec 02, 2015 at 08:14 AM
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
-- Table structure for table `Purchase`
--

CREATE TABLE IF NOT EXISTS `Purchase` (
  `paymentid` int(11) NOT NULL AUTO_INCREMENT,
  `customerid` int(10) NOT NULL,
  `sessionid` varchar(32) NOT NULL,
  `purchasepaymenttype` enum('Mastercard','Visa','American Express') DEFAULT NULL,
  `purchasedate` datetime NOT NULL,
  `cardnumber` char(16) NOT NULL,
  `cardname` char(20) NOT NULL,
  `validfrom` datetime NOT NULL,
  `validto` datetime NOT NULL,
  PRIMARY KEY (`paymentid`),
  KEY `customerid` (`customerid`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 AUTO_INCREMENT=17 ;

--
-- Dumping data for table `Purchase`
--

INSERT INTO `Purchase` (`paymentid`, `customerid`, `sessionid`, `purchasepaymenttype`, `purchasedate`, `cardnumber`, `cardname`, `validfrom`, `validto`) VALUES
(1, 1, 'zeLfRwplzY034C1btwRc-1', 'Mastercard', '2015-10-16 12:45:00', '4678342143212455', 'Mr A Kees', '2013-08-30 00:00:00', '2016-09-27 00:00:00'),
(11, 16, 'itz4BMnv3XIRCMRX688tc3', 'Mastercard', '2015-11-27 12:45:00', '4278342343231411', 'Mr A Nicholson', '2012-03-27 00:00:00', '2015-06-27 00:00:00');
