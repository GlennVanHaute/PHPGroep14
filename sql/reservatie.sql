-- phpMyAdmin SQL Dump
-- version 4.0.6
-- http://www.phpmyadmin.net
--
-- Host: localhost
-- Generation Time: May 12, 2014 at 03:47 PM
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
  `Datum` date NOT NULL,
  `Uur` time NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=40 ;

--
-- Dumping data for table `reservatie`
--

INSERT INTO `reservatie` (`id`, `Tafelnummer`, `Datum`, `Uur`) VALUES
(27, 6, '0000-00-00', '18:00:00'),
(28, 6, '0000-00-00', '18:00:00'),
(29, 6, '0000-00-00', '18:00:00'),
(30, 6, '0000-00-00', '18:00:00'),
(31, 6, '2014-05-13', '18:00:00'),
(32, 6, '2014-05-13', '18:00:00'),
(33, 6, '2014-05-13', '18:00:00'),
(34, 6, '2014-05-13', '18:00:00'),
(35, 6, '2014-05-13', '18:00:00'),
(36, 6, '2014-05-13', '18:00:00'),
(37, 6, '2014-05-13', '18:00:00'),
(38, 4, '2014-05-11', '16:00:00'),
(39, 1, '2014-05-12', '18:00:00');