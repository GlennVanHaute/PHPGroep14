-- phpMyAdmin SQL Dump
-- version 4.0.6
-- http://www.phpmyadmin.net
--
-- Host: localhost
-- Generation Time: May 08, 2014 at 10:20 PM
-- Server version: 5.5.33
-- PHP Version: 5.5.3

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";

--
-- Database: `restoapp`
--

-- --------------------------------------------------------

--
-- Table structure for table `nieuwMenu`
--

CREATE TABLE `nieuwMenu` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `Naam` varchar(225) NOT NULL,
  `Details` varchar(225) DEFAULT NULL,
  `Prijs` int(5) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=69 ;

--
-- Dumping data for table `nieuwMenu`
--

INSERT INTO `nieuwMenu` (`id`, `Naam`, `Details`, `Prijs`) VALUES
(60, 'Kip', 'met currysaus', 20),
(66, 'Pizza', 'Vegetarisch', 10),
(67, 'Spaghettig Bolognaise', 'Met varkensvlees', 12);