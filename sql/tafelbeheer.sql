-- phpMyAdmin SQL Dump
-- version 3.3.10.4
-- http://www.phpmyadmin.net
--
-- Machine: mysql.dorienthys.com
-- Genereertijd: 12 Mei 2014 om 03:15
-- Serverversie: 5.1.53
-- PHP-Versie: 5.3.27

SET SQL_MODE="NO_AUTO_VALUE_ON_ZERO";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `restoapp`
--

-- --------------------------------------------------------

--
-- Tabelstructuur voor tabel `tafelbeheer`
--

CREATE TABLE IF NOT EXISTS `tafelbeheer` (
  `ID` int(5) NOT NULL AUTO_INCREMENT,
  `Tafelnummer` varchar(5) NOT NULL,
  `MaxPersonen` int(5) NOT NULL,
  `Opmerkingen` varchar(250) DEFAULT NULL,
  PRIMARY KEY (`ID`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=9 ;

--
-- Gegevens worden uitgevoerd voor tabel `tafelbeheer`
--

INSERT INTO `tafelbeheer` (`ID`, `Tafelnummer`, `MaxPersonen`, `Opmerkingen`) VALUES
(2, '1', 2, ' '),
(3, '2', 4, 'aan het raam'),
(4, '3A', 10, 'familietafel'),
(5, '3B', 2, ' '),
(6, '4', 4, ' '),
(7, '5', 2, ' '),
(8, '6', 4, 'aan het raam');
