-- phpMyAdmin SQL Dump
-- version 4.6.5.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Gegenereerd op: 03 jul 2017 om 21:48
-- Serverversie: 10.1.21-MariaDB
-- PHP-versie: 5.6.30

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `toolsforever`
--

-- --------------------------------------------------------

--
-- Tabelstructuur voor tabel `gebruikers`
--

CREATE TABLE `gebruikers` (
  `id` int(11) NOT NULL,
  `gebruikersnaam` varchar(255) NOT NULL,
  `wachtwoord` varchar(255) NOT NULL,
  `voorletters` varchar(255) NOT NULL,
  `tussenvoegsel` varchar(255) NOT NULL,
  `voornaam` varchar(255) NOT NULL,
  `achternaam` varchar(255) NOT NULL,
  `rol` varchar(100) NOT NULL,
  `winkelid` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Gegevens worden geëxporteerd voor tabel `gebruikers`
--

INSERT INTO `gebruikers` (`id`, `gebruikersnaam`, `wachtwoord`, `voorletters`, `tussenvoegsel`, `voornaam`, `achternaam`, `rol`, `winkelid`) VALUES
(1, 'krijn', 'krijn', '', 'J', 'Krijn', 'Krijn', 'Beheerder', 1),
(2, 'ilias', 'ilias', '', 'I', 'Ilias', 'Ilias', 'Medewerker', 2);

-- --------------------------------------------------------

--
-- Tabelstructuur voor tabel `producten`
--

CREATE TABLE `producten` (
  `id` int(11) NOT NULL,
  `productnaam` varchar(255) NOT NULL,
  `producttype` varchar(255) NOT NULL,
  `verkoopprijs` decimal(10,2) NOT NULL,
  `inkoopprijs` decimal(10,2) NOT NULL,
  `winkelid` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 ROW_FORMAT=COMPACT;

--
-- Gegevens worden geëxporteerd voor tabel `producten`
--

INSERT INTO `producten` (`id`, `productnaam`, `producttype`, `verkoopprijs`, `inkoopprijs`, `winkelid`) VALUES
(3, 'Hamer Groot 2', 'Hamers', '45.00', '23.25', 2),
(5, 'Spijker A', 'Spijkers', '40.00', '4.00', 1),
(6, 'Boormachine Bosch', 'Boormachines', '60.00', '20.00', 2);

-- --------------------------------------------------------

--
-- Tabelstructuur voor tabel `winkels`
--

CREATE TABLE `winkels` (
  `winkelid` int(11) NOT NULL,
  `winkelnaam` varchar(255) NOT NULL,
  `locatie` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 ROW_FORMAT=COMPACT;

--
-- Gegevens worden geëxporteerd voor tabel `winkels`
--

INSERT INTO `winkels` (`winkelid`, `winkelnaam`, `locatie`) VALUES
(1, 'ToolsForEver 1', 'Haarlem'),
(2, 'ToolsForEver 2', 'Amsterdam');

--
-- Indexen voor geëxporteerde tabellen
--

--
-- Indexen voor tabel `gebruikers`
--
ALTER TABLE `gebruikers`
  ADD PRIMARY KEY (`id`),
  ADD KEY `winkelid` (`winkelid`);

--
-- Indexen voor tabel `producten`
--
ALTER TABLE `producten`
  ADD PRIMARY KEY (`id`),
  ADD KEY `winkelid` (`winkelid`) USING BTREE;

--
-- Indexen voor tabel `winkels`
--
ALTER TABLE `winkels`
  ADD PRIMARY KEY (`winkelid`);

--
-- AUTO_INCREMENT voor geëxporteerde tabellen
--

--
-- AUTO_INCREMENT voor een tabel `gebruikers`
--
ALTER TABLE `gebruikers`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT voor een tabel `producten`
--
ALTER TABLE `producten`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;
--
-- AUTO_INCREMENT voor een tabel `winkels`
--
ALTER TABLE `winkels`
  MODIFY `winkelid` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
--
-- Beperkingen voor geëxporteerde tabellen
--

--
-- Beperkingen voor tabel `gebruikers`
--
ALTER TABLE `gebruikers`
  ADD CONSTRAINT `gebruikers_ibfk_1` FOREIGN KEY (`winkelid`) REFERENCES `winkels` (`winkelid`);

--
-- Beperkingen voor tabel `producten`
--
ALTER TABLE `producten`
  ADD CONSTRAINT `producten_ibfk_1` FOREIGN KEY (`winkelid`) REFERENCES `winkels` (`winkelid`) ON UPDATE CASCADE;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
