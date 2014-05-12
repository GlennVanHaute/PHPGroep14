-- phpMyAdmin SQL Dump
-- version 4.1.6
-- http://www.phpmyadmin.net
--
-- Machine: 127.0.0.1
-- Gegenereerd op: 12 mei 2014 om 19:44
-- Serverversie: 5.6.16
-- PHP-versie: 5.5.9

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Databank: `restoapp`
--

-- --------------------------------------------------------

--
-- Tabelstructuur voor tabel `tblreservatie`
--

CREATE TABLE IF NOT EXISTS `tblreservatie` (
  `ReservatieID` int(11) NOT NULL AUTO_INCREMENT,
  `Persoon` varchar(200) NOT NULL,
  `Hoeveel` int(5) NOT NULL,
  `Datum` varchar(50) NOT NULL,
  `Beginuur` varchar(20) NOT NULL,
  `Einduur` varchar(20) NOT NULL,
  `Tafelnummer` varchar(11) NOT NULL,
  PRIMARY KEY (`ReservatieID`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=25 ;

--
-- Gegevens worden uitgevoerd voor tabel `tblreservatie`
--

INSERT INTO `tblreservatie` (`ReservatieID`, `Persoon`, `Hoeveel`, `Datum`, `Beginuur`, `Einduur`, `Tafelnummer`) VALUES
(14, 'Rutger', 20, '14 juni', '12u30', '', ''),
(15, 'zefze', 0, 'zefzef', '11u30', '', ''),
(16, 'Rutger', 6, '14 januari', '12u00', '', ''),
(17, 'Rutger', 20, '14 juni', '14u00', '', ''),
(18, 'Bram Rutten', 25, '14 Juni', '20u00', '', ''),
(19, 'Lisa Smets', 5, '13 augustus', '16u00', '', ''),
(20, 'Bram Rutten', 12, '2 maart', '12u00', '', ''),
(21, 'Bram Rutten', 12, '2 maart', '12u00', '', ''),
(22, 'Dirk ', 2, '20 juni', '15u30', '', ''),
(23, 'Test', 40, '3 mei', '14u30', '', ''),
(24, 'Rutger', 15, '08/06/2014', '15u30', '', '');

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
