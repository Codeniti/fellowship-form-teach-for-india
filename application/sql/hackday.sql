-- phpMyAdmin SQL Dump
-- version 4.1.6
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: Mar 01, 2014 at 02:19 PM
-- Server version: 5.6.16
-- PHP Version: 5.5.9

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `hackday`
--

-- --------------------------------------------------------

--
-- Table structure for table `essay`
--

CREATE TABLE IF NOT EXISTS `essay` (
  `question` text NOT NULL,
  `response` text NOT NULL,
  `essayId` varchar(10) NOT NULL,
  PRIMARY KEY (`essayId`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `essayuser`
--

CREATE TABLE IF NOT EXISTS `essayuser` (
  `userId` varchar(10) NOT NULL,
  `essayId` varchar(10) NOT NULL,
  KEY `userId` (`userId`),
  KEY `essayId` (`essayId`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `gendata`
--

CREATE TABLE IF NOT EXISTS `gendata` (
  `name` varchar(50) NOT NULL,
  `email` varchar(255) NOT NULL,
  `pwd` varchar(50) NOT NULL,
  `prof` int(11) NOT NULL,
  PRIMARY KEY (`email`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `references`
--

CREATE TABLE IF NOT EXISTS `references` (
  `refName` varchar(50) NOT NULL,
  `contactNo` varchar(11) NOT NULL,
  `refEmail` varchar(255) NOT NULL,
  `jobTitle` varchar(25) NOT NULL,
  `org` varchar(25) NOT NULL,
  KEY `refEmail` (`refEmail`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `essayuser`
--
ALTER TABLE `essayuser`
  ADD CONSTRAINT `essayuser_ibfk_3` FOREIGN KEY (`essayId`) REFERENCES `essay` (`essayId`),
  ADD CONSTRAINT `essayuser_ibfk_1` FOREIGN KEY (`userId`) REFERENCES `gendata` (`email`),
  ADD CONSTRAINT `essayuser_ibfk_2` FOREIGN KEY (`userId`) REFERENCES `gendata` (`email`);

--
-- Constraints for table `references`
--
ALTER TABLE `references`
  ADD CONSTRAINT `references_ibfk_1` FOREIGN KEY (`refEmail`) REFERENCES `gendata` (`email`);

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
