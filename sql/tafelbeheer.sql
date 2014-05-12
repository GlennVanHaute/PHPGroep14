-- phpMyAdmin SQL Dump
-- version 4.0.6
-- http://www.phpmyadmin.net
--
-- Host: localhost
-- Generation Time: May 12, 2014 at 10:35 PM
-- Server version: 5.5.33
-- PHP Version: 5.5.3

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";

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
  `Opmerkingen` varchar(250) DEFAULT NULL,
  PRIMARY KEY (`ID`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=13 ;

--
-- Dumping data for table `tafelbeheer`
--

INSERT INTO `tafelbeheer` (`ID`, `Tafelnummer`, `MaxPersonen`, `Opmerkingen`) VALUES
(2, '1', 2, 'Buiten'),
(3, '2', 4, 'aan het raam'),
(4, '3A', 5, 'buiten'),
(5, '3B', 2, NULL),
(6, '4', 4, NULL),
(7, '5', 2, ' binnen'),
(8, '6', 4, 'aan het raam');
