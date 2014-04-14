-- phpMyAdmin SQL Dump
-- version 3.5.7
-- http://www.phpmyadmin.net
--
-- Machine: localhost
-- Genereertijd: 14 apr 2014 om 12:25
-- Serverversie: 5.5.29
-- PHP-versie: 5.4.10

SET SQL_MODE="NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Databank: `restoapp`
--
CREATE DATABASE `restoapp` DEFAULT CHARACTER SET latin1 COLLATE latin1_swedish_ci;
USE `restoapp`;

-- --------------------------------------------------------

--
-- Tabelstructuur voor tabel `tafelbeheer`
--

DROP TABLE IF EXISTS `tafelbeheer`;
CREATE TABLE `tafelbeheer` (
  `ID` int(5) NOT NULL AUTO_INCREMENT,
  `Tafelnummer` varchar(5) NOT NULL,
  `MaxPersonen` int(5) NOT NULL,
  `Opmerkingen` varchar(250) NOT NULL,
  PRIMARY KEY (`ID`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=6 ;

--
-- Gegevens worden uitgevoerd voor tabel `tafelbeheer`
--

INSERT INTO `tafelbeheer` (`ID`, `Tafelnummer`, `MaxPersonen`, `Opmerkingen`) VALUES
(2, '1', 14, ' '),
(3, '2', 4, 'aan het raam'),
(4, '3A', 10, 'familietafel'),
(5, '3B', 2, ' ');

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
