-- phpMyAdmin SQL Dump
-- version 4.0.9
-- http://www.phpmyadmin.net
--
-- Machine: 127.0.0.1
-- Genereertijd: 12 mei 2014 om 22:53
-- Serverversie: 5.6.14
-- PHP-versie: 5.5.6

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
-- Tabelstructuur voor tabel `tblusers`
--

CREATE TABLE IF NOT EXISTS `tblusers` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `voornaam` varchar(255) NOT NULL,
  `naam` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `code` varchar(255) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=15 ;

--
-- Gegevens worden uitgevoerd voor tabel `tblusers`
--

INSERT INTO `tblusers` (`id`, `voornaam`, `naam`, `email`, `password`, `code`) VALUES
(1, '', 'glenn', 'glenn@hotmail.com', '20735262ac36152d7ce07afde819a460', ''),
(2, 'glenn', 'vanhaute', 'glenn@hotmail.com', '976b6d5627b1e27ae8d2e08d3cc79980', 'admin'),
(3, 'glenn', 'vanhaute', 'glennvanhaute@hotmail.com', '976b6d5627b1e27ae8d2e08d3cc79980', 'admin'),
(4, 'nick', 'vh', 'nick@camixo.be', '815e295da3102c41b04379c78725f430', 'burb'),
(5, 'gg', 'wp', 'surrender@20.com', 'afa6787ac948f392e0de65318aa0e8ac', 'admin'),
(6, 'gewoon', 'user', 'werk@test.be', 'f8643f61dcce240a4f44ce90c5d3068e', ''),
(7, 'glenn', 'van haute', 'glenn@hotmai.com', '20735262ac36152d7ce07afde819a460', ''),
(8, 'glenn', 'van haute', 'glennvanhuate@hotmail.com', '815e295da3102c41b04379c78725f430', ''),
(9, 'glenn', 'glenn', '123@hotmail.com', '815e295da3102c41b04379c78725f430', ''),
(10, 'glenn', 'vanhaute', 'glenn@test.be', '815e295da3102c41b04379c78725f430', ''),
(11, 'glenn', 'vanhaute', 'glenn@hhhh.com', '815e295da3102c41b04379c78725f430', ''),
(12, 'last', 'test', 'test@123.com', '815e295da3102c41b04379c78725f430', ''),
(13, 'glenn', 'vanhaute', 'gg@fml.com', '815e295da3102c41b04379c78725f430', ''),
(14, 'haaaaaaaaaaahahha', 'ahahahah', 'ahahahahhaah@c.com', '4893cff751f30ca421f78381a2ff74c4', '');

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
