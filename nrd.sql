-- phpMyAdmin SQL Dump
-- version 3.4.5
-- http://www.phpmyadmin.net
--
-- Host: localhost
-- Generation Time: Aug 17, 2020 at 11:40 AM
-- Server version: 5.5.16
-- PHP Version: 5.3.8

SET SQL_MODE="NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `nrd`
--

-- --------------------------------------------------------

--
-- Table structure for table `register`
--

CREATE TABLE IF NOT EXISTS `register` (
  `no` int(11) NOT NULL AUTO_INCREMENT,
  `srno` int(9) NOT NULL,
  `id_no` int(8) NOT NULL,
  `typ` varchar(16) NOT NULL,
  `applicant` varchar(35) NOT NULL,
  `sex` varchar(6) NOT NULL,
  `dob` date NOT NULL,
  `pob` varchar(25) NOT NULL,
  `father` varchar(35) NOT NULL,
  `mother` varchar(35) NOT NULL,
  `phone` int(10) NOT NULL,
  `drecorded` date NOT NULL,
  `dreceived` date NOT NULL,
  `image` blob NOT NULL,
  `imageSize` varchar(255) NOT NULL,
  `recordedBy` varchar(255) NOT NULL,
  `remarks` varchar(255) NOT NULL,
  PRIMARY KEY (`no`),
  UNIQUE KEY `srno` (`srno`,`id_no`),
  KEY `typ` (`typ`,`applicant`,`sex`,`dob`,`pob`,`father`,`mother`,`phone`),
  KEY `Date Recorded` (`drecorded`),
  KEY `Date received` (`dreceived`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=2 ;

--
-- Dumping data for table `register`
--

INSERT INTO `register` (`no`, `srno`, `id_no`, `typ`, `applicant`, `sex`, `dob`, `pob`, `father`, `mother`, `phone`, `drecorded`, `dreceived`, `image`, `imageSize`, `recordedBy`, `remarks`) VALUES
(1, 234510789, 0, 'NPR', 'ANTONY BRAVO', 'MALE', '2000-04-22', 'NAKURU', '', '', 712912192, '2020-08-17', '0000-00-00', 0x62622e6a7067, '5f3a6932534156.77174256.jpg', 'solder', '');

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE IF NOT EXISTS `user` (
  `no` int(11) NOT NULL AUTO_INCREMENT,
  `username` varchar(32) NOT NULL,
  `password` varchar(7) NOT NULL,
  PRIMARY KEY (`no`),
  KEY `username` (`username`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=3 ;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`no`, `username`, `password`) VALUES
(1, 'solder', 'sold123'),
(2, 'alex', 'qwerty1');

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
