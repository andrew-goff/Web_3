-- phpMyAdmin SQL Dump
-- version 3.3.10.4
-- http://www.phpmyadmin.net
--
-- Host: mysql.ccacolchester.com
-- Generation Time: Dec 02, 2015 at 08:10 AM
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
-- Table structure for table `Author`
--

CREATE TABLE IF NOT EXISTS `Author` (
  `authorid` int(11) NOT NULL AUTO_INCREMENT,
  `authorfirstname` varchar(20) NOT NULL,
  `authorlastname` varchar(20) NOT NULL,
  `authoremail` varchar(50) NOT NULL,
  `authorbiography` varchar(100) DEFAULT NULL,
  `authorpassword` text NOT NULL,
  PRIMARY KEY (`authorid`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 AUTO_INCREMENT=27 ;

--
-- Dumping data for table `Author`
--

INSERT INTO `Author` (`authorid`, `authorfirstname`, `authorlastname`, `authoremail`, `authorbiography`, `authorpassword`) VALUES
(1, 'James', 'Eagle', 'James.eagle@gmail.com', '', '5baa61e4c9b93f3f0682250b6cf8331b7ee68fd8'),
(15, 'Al', 'Grant', 'al.grant@gmail.com', NULL, '5baa61e4c9b93f3f0682250b6cf8331b7ee68fd8'),
(14, 'Adrian', 'Grange', 'Adrian.grange@gmail.com', NULL, '5baa61e4c9b93f3f0682250b6cf8331b7ee68fd8'),
(16, 'Andros', 'Likel', 'Andros.likel@gmail.com', NULL, '5baa61e4c9b93f3f0682250b6cf8331b7ee68fd8'),
(17, 'Miles', 'Motchen', 'Milesmotchen@yahoo.com', NULL, '5baa61e4c9b93f3f0682250b6cf8331b7ee68fd8'),
(18, 'Adam', 'Alk', 'Adam.alk@hotmail.com', NULL, '5baa61e4c9b93f3f0682250b6cf8331b7ee68fd8'),
(19, 'Adam', 'Gates', 'Agates@gmail.com', NULL, '5baa61e4c9b93f3f0682250b6cf8331b7ee68fd8'),
(20, 'Adam', 'Glee', 'Adam.glee@hotmail.com', NULL, '5baa61e4c9b93f3f0682250b6cf8331b7ee68fd8'),
(21, 'Luke', 'Denning', 'Luke.denning@hotmail.com', NULL, '5baa61e4c9b93f3f0682250b6cf8331b7ee68fd8'),
(22, 'Adam', 'Alkwood', 'Adam.alkwood@hotmail.com', NULL, '5baa61e4c9b93f3f0682250b6cf8331b7ee68fd8'),
(23, 'John', 'Goff', 'linepro@compuserve.com', NULL, '5baa61e4c9b93f3f0682250b6cf8331b7ee68fd8'),
(24, 'Allan', 'Grant', 'Allan.grant@hotmail.com', NULL, '5baa61e4c9b93f3f0682250b6cf8331b7ee68fd8'),
(25, 'Ackon', 'Lally', 'Ackon.lally@hotmail.co.uk', NULL, '5baa61e4c9b93f3f0682250b6cf8331b7ee68fd8');
