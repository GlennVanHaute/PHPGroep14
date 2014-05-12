-- phpMyAdmin SQL Dump
-- version 4.1.12
-- http://www.phpmyadmin.net
--
-- Host: localhost:8889
-- Generation Time: May 08, 2014 at 10:12 PM
-- Server version: 5.5.34
-- PHP Version: 5.5.10

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `restoapp`
--

-- --------------------------------------------------------

--
-- Table structure for table `tafelbeheer`
--

CREATE TABLE `tafelbeheer` (
  `ID` int(5) NOT NULL AUTO_INCREMENT,
  `Tafelnummer` varchar(5) NOT NULL,
  `MaxPersonen` int(5) NOT NULL,
  `Opmerkingen` varchar(250) NOT NULL,
  PRIMARY KEY (`ID`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=9 ;

--
-- Dumping data for table `tafelbeheer`
--

INSERT INTO `tafelbeheer` (`ID`, `Tafelnummer`, `MaxPersonen`, `Opmerkingen`) VALUES
(2, '1', 2, ' '),
(3, '2', 4, 'aan het raam'),
(4, '3A', 10, 'familietafel'),
(5, '3B', 2, ' '),
(6, '4', 4, ' '),
(7, '5', 2, ' '),
(8, '6', 4, 'aan het raam');

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
