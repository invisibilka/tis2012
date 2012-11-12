-- phpMyAdmin SQL Dump
-- version 3.3.9
-- http://www.phpmyadmin.net
--
-- Hostiteľ: localhost
-- Vygenerované:: 12.Nov, 2012 - 10:30
-- Verzia serveru: 5.1.53
-- Verzia PHP: 5.3.4

SET SQL_MODE="NO_AUTO_VALUE_ON_ZERO";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Databáza: `tis`
--

--
-- Sťahujem dáta pre tabuľku `tis_tasks`
--

INSERT INTO `tis_tasks` (`id`, `user_id`, `name`, `is_public`, `html`, `rating`) VALUES
(1, 4, 'jedna', 0, 'tato uloha je pre vsetkych', 1),
(2, 2, 'dva', 1, 'verejna uloha, 2+2 = ?', 0),
(6, 3, 'styri', 0, '10-2', 2),
(5, 1, 'tri', 1, '5+5', 3),
(7, 1, 'uloha 6', 0, '4a - 3b = 25\r\n2a + 8b = 106', 3),
(8, 2, 'cislo7', 1, 'auto ide rychlostou 50 +- 0,1 km/h.\r\nza t = 10 +- 0,1 hodina prejde drahu 500 km... vypocitajte disperziu.', 1),
(9, 3, 'pat', 0, 'pomocou newtonovej interpolacie vypocitajte rychlost auta v case t = 10 s, ak v case t=1 preslo auto 5 m, t= 3 20m a t= 15 100 m.', 2),
(10, 4, 'osem', 1, 'mame 8 hrannu kocku. chceme aby 3krat zo 7 pokusov padla 4. aka je pravdepodobnost?\r\n', 5);
