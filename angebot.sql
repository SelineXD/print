-- phpMyAdmin SQL Dump
-- version 4.7.4
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Erstellungszeit: 11. Apr 2018 um 16:20
-- Server-Version: 10.1.26-MariaDB
-- PHP-Version: 7.1.9

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Datenbank: `print`
--

-- --------------------------------------------------------

--
-- Tabellenstruktur für Tabelle `angebot`
--

CREATE TABLE `angebot` (
  `Format` varchar(2) DEFAULT NULL,
  `doppelseitig` varchar(12) DEFAULT NULL,
  `Farbe` varchar(13) DEFAULT NULL,
  `Papier` varchar(5) DEFAULT NULL,
  `Preis` int(2) DEFAULT NULL,
  `Waehrung` varchar(3) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Daten für Tabelle `angebot`
--

INSERT INTO `angebot` (`Format`, `doppelseitig`, `Farbe`, `Papier`, `Preis`, `Waehrung`) VALUES
('A2', 'doppelseitig', 'schwarz/weiss', 'matt', 16, 'CHF'),
('A2', 'doppelseitig', 'cmyk', 'matt', 8, 'CHF'),
('A2', 'einseitig', 'schwarz/weiss', 'matt', 4, 'CHF'),
('A2', 'einseitig', 'cmyk', 'matt', 8, 'CHF'),
('A2', 'doppelseitig', 'schwarz/weiss', 'glanz', 8, 'CHF'),
('A2', 'doppelseitig', 'cmyk', 'glanz', 16, 'CHF'),
('A2', 'einseitig', 'schwarz/weiss', 'glanz', 4, 'CHF'),
('A2', 'einseitig', 'cmyk', 'glanz', 8, 'CHF'),
('A3', 'doppelseitig', 'schwarz/weiss', 'matt', 8, 'CHF'),
('A3', 'doppelseitig', 'cmyk', 'matt', 4, 'CHF'),
('A3', 'einseitig', 'schwarz/weiss', 'matt', 2, 'CHF'),
('A3', 'einseitig', 'cmyk', 'matt', 4, 'CHF'),
('A3', 'doppelseitig', 'schwarz/weiss', 'glanz', 4, 'CHF'),
('A3', 'doppelseitig', 'cmyk', 'glanz', 8, 'CHF'),
('A3', 'einseitig', 'schwarz/weiss', 'glanz', 2, 'CHF'),
('A3', 'einseitig', 'cmyk', 'glanz', 4, 'CHF'),
('A4', 'doppelseitig', 'schwarz/weiss', 'matt', 4, 'CHF'),
('A4', 'doppelseitig', 'cmyk', 'matt', 2, 'CHF'),
('A4', 'einseitig', 'schwarz/weiss', 'matt', 1, 'CHF'),
('A4', 'einseitig', 'cmyk', 'matt', 2, 'CHF'),
('A4', 'doppelseitig', 'schwarz/weiss', 'glanz', 2, 'CHF'),
('A4', 'doppelseitig', 'cmyk', 'glanz', 4, 'CHF'),
('A4', 'einseitig', 'schwarz/weiss', 'glanz', 1, 'CHF'),
('A4', 'einseitig', 'cmyk', 'glanz', 2, 'CHF'),
('A5', 'doppelseitig', 'schwarz/weiss', 'matt', 7, 'CHF'),
('A5', 'doppelseitig', 'cmyk', 'matt', 3, 'CHF'),
('A5', 'einseitig', 'schwarz/weiss', 'matt', 1, 'CHF'),
('A5', 'einseitig', 'cmyk', 'matt', 3, 'CHF'),
('A5', 'doppelseitig', 'schwarz/weiss', 'glanz', 3, 'CHF'),
('A5', 'doppelseitig', 'cmyk', 'glanz', 7, 'CHF'),
('A5', 'einseitig', 'schwarz/weiss', 'glanz', 1, 'CHF'),
('A5', 'einseitig', 'cmyk', 'glanz', 3, 'CHF'),
('A6', 'doppelseitig', 'schwarz/weiss', 'matt', 6, 'CHF'),
('A6', 'doppelseitig', 'cmyk', 'matt', 3, 'CHF'),
('A6', 'einseitig', 'schwarz/weiss', 'matt', 1, 'CHF'),
('A6', 'einseitig', 'cmyk', 'matt', 3, 'CHF'),
('A6', 'doppelseitig', 'schwarz/weiss', 'glanz', 3, 'CHF'),
('A6', 'doppelseitig', 'cmyk', 'glanz', 6, 'CHF'),
('A6', 'einseitig', 'schwarz/weiss', 'glanz', 1, 'CHF'),
('A6', 'einseitig', 'cmyk', 'glanz', 3, 'CHF');
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
