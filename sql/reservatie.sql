-- phpMyAdmin SQL Dump
-- version 4.0.6
-- http://www.phpmyadmin.net
--
-- Host: localhost
-- Generation Time: May 12, 2014 at 07:09 PM
-- Server version: 5.5.33
-- PHP Version: 5.5.3

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";

--
-- Database: `restoapp`
--

-- --------------------------------------------------------

--
-- Table structure for table `reservatie`
--

CREATE TABLE `reservatie` (
  `id` int(225) NOT NULL AUTO_INCREMENT,
  `Tafelnummer` int(11) NOT NULL,
  `Personen` int(225) NOT NULL,
  `Datum` date NOT NULL,
  `Uur` time NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=57 ;

--
-- Dumping data for table `reservatie`
--

INSERT INTO `reservatie` (`id`, `Tafelnummer`, `Personen`, `Datum`, `Uur`) VALUES
(56, 3, 4, '2014-05-14', '06:00:00');
