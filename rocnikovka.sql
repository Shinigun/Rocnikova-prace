-- phpMyAdmin SQL Dump
-- version 4.4.14
-- http://www.phpmyadmin.net
--
-- Počítač: 127.0.0.1
-- Vytvořeno: Úte 12. dub 2016, 11:40
-- Verze serveru: 5.6.26
-- Verze PHP: 5.6.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Databáze: `rocnikovka`
--

-- --------------------------------------------------------

--
-- Struktura tabulky `obory`
--

CREATE TABLE IF NOT EXISTS `obory` (
  `id` int(10) unsigned NOT NULL,
  `Nazev` varchar(45) NOT NULL,
  `DelkaStudia` tinyint(5) DEFAULT NULL
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=utf8;

--
-- Vypisuji data pro tabulku `obory`
--

INSERT INTO `obory` (`id`, `Nazev`, `DelkaStudia`) VALUES
(1, 'Automechanik', 3),
(2, 'Informační technologie', 4),
(3, 'Elektrikář', 3),
(4, 'Prodavač', 2);

-- --------------------------------------------------------

--
-- Struktura tabulky `studenti`
--

CREATE TABLE IF NOT EXISTS `studenti` (
  `id` int(10) unsigned NOT NULL,
  `Jmeno` varchar(45) DEFAULT NULL,
  `Prijmeni` varchar(45) NOT NULL,
  `DatumNarozeni` date DEFAULT NULL,
  `Obor` int(10) unsigned NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=9 DEFAULT CHARSET=utf8;

--
-- Vypisuji data pro tabulku `studenti`
--

INSERT INTO `studenti` (`id`, `Jmeno`, `Prijmeni`, `DatumNarozeni`, `Obor`) VALUES
(4, 'Pavel', 'Kos', '1997-08-20', 1),
(5, 'Petr', 'Pevel', '1999-04-08', 2),
(6, 'Vanesa', 'Veselá', '2000-10-05', 4),
(7, 'Lukaš', 'Moris', '1998-09-26', 3),
(8, 'Marie', 'Červáková', '1996-07-24', 2);

--
-- Klíče pro exportované tabulky
--

--
-- Klíče pro tabulku `obory`
--
ALTER TABLE `obory`
  ADD PRIMARY KEY (`id`);

--
-- Klíče pro tabulku `studenti`
--
ALTER TABLE `studenti`
  ADD PRIMARY KEY (`id`),
  ADD KEY `fk_Studenti_Obory_idx` (`Obor`);

--
-- AUTO_INCREMENT pro tabulky
--

--
-- AUTO_INCREMENT pro tabulku `obory`
--
ALTER TABLE `obory`
  MODIFY `id` int(10) unsigned NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=5;
--
-- AUTO_INCREMENT pro tabulku `studenti`
--
ALTER TABLE `studenti`
  MODIFY `id` int(10) unsigned NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=9;
--
-- Omezení pro exportované tabulky
--

--
-- Omezení pro tabulku `studenti`
--
ALTER TABLE `studenti`
  ADD CONSTRAINT `fk_Studenti_Obory` FOREIGN KEY (`Obor`) REFERENCES `obory` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
