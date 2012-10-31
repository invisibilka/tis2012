-- phpMyAdmin SQL Dump
-- version 3.3.9
-- http://www.phpmyadmin.net
--
-- Hostiteľ: localhost
-- Vygenerované:: 31.Okt, 2012 - 14:49
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
-- Sťahujem dáta pre tabuľku `tis_invitations`
--


--
-- Sťahujem dáta pre tabuľku `tis_keywords`
--


--
-- Sťahujem dáta pre tabuľku `tis_students`
--


--
-- Sťahujem dáta pre tabuľku `tis_students_lists`
--


--
-- Sťahujem dáta pre tabuľku `tis_student_lists`
--


--
-- Sťahujem dáta pre tabuľku `tis_tasks`
--

INSERT INTO `tis_tasks` (`id`, `user_id`, `name`, `is_public`, `html`, `rating`) VALUES
(1, 4, 'jedna', 0, 'tato uloha je pre vsetkych', 1),
(2, 2, 'dva', 1, 'verejna uloha, 2+2 = ?', 0),
(6, 3, 'styri', 0, '10-2', 2),
(5, 1, 'tri', 1, '5+5', 3);

--
-- Sťahujem dáta pre tabuľku `tis_tasks_comments`
--


--
-- Sťahujem dáta pre tabuľku `tis_tasks_keywords`
--


--
-- Sťahujem dáta pre tabuľku `tis_tasks_rating`
--


--
-- Sťahujem dáta pre tabuľku `tis_tests`
--

INSERT INTO `tis_tests` (`id`, `user_id`, `name`) VALUES
(1, 2, 'cislo1'),
(2, 3, 'cislo2');

--
-- Sťahujem dáta pre tabuľku `tis_tests_tasks`
--

INSERT INTO `tis_tests_tasks` (`id`, `test_id`, `task_id`, `task_index`) VALUES
(1, 1, 2, 1),
(2, 1, 6, 2),
(3, 2, 5, 1),
(4, 2, 6, 2);

--
-- Sťahujem dáta pre tabuľku `tis_users`
--

INSERT INTO `tis_users` (`id`, `username`, `full_name`, `password`, `email`, `permissions`, `about`) VALUES
(1, 'admin', 'admin', '$2a$07$4EFr8dIYFyF77ifcYYsC4uDrFKsaWSDKoZkIaBh3z0coT3AJayCTO', 'admin@jurenka.sk', 1, ''),
(2, 'katka', 'katka', 'katka', 'invisibilka@gmail.com', 1, ''),
(3, 'marek', 'marek', 'marek', 'mare.orave@gmail.com', 1, ''),
(4, 'evka', 'evka', 'evka', '', 0, 'aaaaa'),
(5, 'milos', 'milos', 'milos', '', 0, 'bbbbbb');
