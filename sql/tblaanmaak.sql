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
-- Tabelstructuur voor tabel `tblaanmaak`
--

CREATE TABLE IF NOT EXISTS `tblaanmaak` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `Naam` varchar(100) NOT NULL,
  `Adres` varchar(100) NOT NULL,
  `Postcode` varchar(100) NOT NULL,
  `Gemeente` varchar(100) NOT NULL,
  `Emailadres` varchar(100) NOT NULL,
  `Telefoonnummer` varchar(100) NOT NULL,
  `Faxnummer` varchar(100) NOT NULL,
  `BTWnummer` varchar(100) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=21 ;

--
-- Gegevens worden uitgevoerd voor tabel `tblaanmaak`
--

INSERT INTO `tblaanmaak` (`id`, `Naam`, `Adres`, `Postcode`, `Gemeente`, `Emailadres`, `Telefoonnummer`, `Faxnummer`, `BTWnummer`) VALUES
(1, 'Hallo', 'Teststraat 14', '2800', 'Mechelen', 'Testresto@gmail.com', '0499999999', '015555555', 'BE123456789');

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
