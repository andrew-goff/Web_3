-- phpMyAdmin SQL Dump
-- version 3.3.10.4
-- http://www.phpmyadmin.net
--
-- Host: mysql.ccacolchester.com
-- Generation Time: Dec 02, 2015 at 08:09 AM
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
-- Table structure for table `eBook_Customer`
--

CREATE TABLE IF NOT EXISTS `eBook_Customer` (
  `customerid` int(11) NOT NULL AUTO_INCREMENT,
  `customerfirstname` varchar(30) NOT NULL DEFAULT '',
  `customerlastname` varchar(30) NOT NULL DEFAULT '',
  `customeraddress` varchar(40) NOT NULL DEFAULT '',
  `customeremail` varchar(50) NOT NULL DEFAULT '',
  `customerpassword` text NOT NULL,
  PRIMARY KEY (`customerid`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 AUTO_INCREMENT=29 ;

--
-- Dumping data for table `eBook_Customer`
--

INSERT INTO `eBook_Customer` (`customerid`, `customerfirstname`, `customerlastname`, `customeraddress`, `customeremail`, `customerpassword`) VALUES
(1, 'Alan', 'Kees', '28 Hill Close, Lanark', 'Alan.kees@yahoo.com', '5baa61e4c9b93f3f0682250b6cf8331b7ee68fd8'),
(2, 'Alan', 'Mike', '2 High Lane, Macclesfield', 'Alan.mike@gmail.com', '5baa61e4c9b93f3f0682250b6cf8331b7ee68fd8'),
(3, 'Mike', 'Mundon', '23 Long Hill, Laindon', 'Mike.mundon@hotmail.com', '5baa61e4c9b93f3f0682250b6cf8331b7ee68fd8'),
(4, 'Alan', 'Kees', '23 Highwood Close, Wycombe', 'Alan.kees@gmail.com', '5baa61e4c9b93f3f0682250b6cf8331b7ee68fd8'),
(11, 'Elk', 'Gates', '23 Long Road, Laindon', 'Elk.gates@gmail.com', '5baa61e4c9b93f3f0682250b6cf8331b7ee68fd8'),
(10, 'Alan', 'Mundon', '23 Cold Chase, Cannock', 'Alan.Mundon@gmail.com', '5baa61e4c9b93f3f0682250b6cf8331b7ee68fd8'),
(12, 'Alan', 'Smith', '241 High Street, Shrewsbury', 'Alan.smith@hotmail.co.uk', '5baa61e4c9b93f3f0682250b6cf8331b7ee68fd8'),
(13, 'Adrian', 'Kees', '233 Long Road, Derby', 'Adrian.kees@yahoo.com', '5baa61e4c9b93f3f0682250b6cf8331b7ee68fd8'),
(16, 'Allan', 'Nicholson', '2 Chase Avenue, Clacton', 'Allan.nicholson@gmail.com', '5baa61e4c9b93f3f0682250b6cf8331b7ee68fd8'),
(17, 'Mark', 'Holl', '23 Church Lane, Buckingham', 'Mark.holl@hotmail.co.uk', '5baa61e4c9b93f3f0682250b6cf8331b7ee68fd8'),
(18, 'John', 'Goff', '23 Howard Drive', 'linepro@compuserve.com', '5baa61e4c9b93f3f0682250b6cf8331b7ee68fd8'),
(19, 'Adrian', 'Li', '231 Main Road, Macclesfield', 'Adrianli.@gmail.com', '5baa61e4c9b93f3f0682250b6cf8331b7ee68fd8'),
(20, 'Alan', 'Grill', '23 Hill Lane, Wokingham', 'Al.grill@hotmail.com', '5baa61e4c9b93f3f0682250b6cf8331b7ee68fd8'),
(23, 'Allan', 'Gates', '12 Main Street, Clacton', 'Allan.gates@gmail.com', '5baa61e4c9b93f3f0682250b6cf8331b7ee68fd8'),
(22, 'Alan', 'Mike', '23 North Street, Wokingham', 'Al.mike@hotmail.com', '5baa61e4c9b93f3f0682250b6cf8331b7ee68fd8'),
(26, 'James', 'Gall', '44 The Chase, Rochester', 'James@gmail.com', '5baa61e4c9b93f3f0682250b6cf8331b7ee68fd8'),
(25, 'James', 'Gates', '79 The Chase, Cannock', 'James@gmail.com', '5baa61e4c9b93f3f0682250b6cf8331b7ee68fd8'),
(27, 'James', 'Adam', '44 The Chase, Rochester', 'James.adam@gmail.com', '5baa61e4c9b93f3f0682250b6cf8331b7ee68fd8'),
(28, 'Adrian', 'White', '42 Main Road, Macclesfield', 'Adrianwhite.@gmail.com', '5baa61e4c9b93f3f0682250b6cf8331b7ee68fd8');
