-- phpMyAdmin SQL Dump
-- version 3.3.9
-- http://www.phpmyadmin.net
--
-- Hostiteľ: localhost
-- Vygenerované:: 15.Okt, 2012 - 16:23
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
CREATE DATABASE `tis` DEFAULT CHARACTER SET utf8 COLLATE utf8_general_ci;
USE `tis`;

-- --------------------------------------------------------

--
-- Štruktúra tabuľky pre tabuľku `tis_invitations`
--

CREATE TABLE IF NOT EXISTS `tis_invitations` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `email` varchar(255) NOT NULL,
  `hash` varchar(255) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;

--
-- Sťahujem dáta pre tabuľku `tis_invitations`
--


-- --------------------------------------------------------

--
-- Štruktúra tabuľky pre tabuľku `tis_keywords`
--

CREATE TABLE IF NOT EXISTS `tis_keywords` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(255) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;

--
-- Sťahujem dáta pre tabuľku `tis_keywords`
--


-- --------------------------------------------------------

--
-- Štruktúra tabuľky pre tabuľku `tis_student_lists`
--

CREATE TABLE IF NOT EXISTS `tis_student_lists` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `user_id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;

--
-- Sťahujem dáta pre tabuľku `tis_student_lists`
--


-- --------------------------------------------------------

--
-- Štruktúra tabuľky pre tabuľku `tis_students`
--

CREATE TABLE IF NOT EXISTS `tis_students` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `user_id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;

--
-- Sťahujem dáta pre tabuľku `tis_students`
--


-- --------------------------------------------------------

--
-- Štruktúra tabuľky pre tabuľku `tis_students_lists`
--

CREATE TABLE IF NOT EXISTS `tis_students_lists` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `student_id` int(11) NOT NULL,
  `list_id` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;

--
-- Sťahujem dáta pre tabuľku `tis_students_lists`
--


-- --------------------------------------------------------

--
-- Štruktúra tabuľky pre tabuľku `tis_tasks`
--

CREATE TABLE IF NOT EXISTS `tis_tasks` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `user_id` int(11) NOT NULL,
  `name` varchar(256) NOT NULL,
  `is_public` tinyint(1) NOT NULL DEFAULT '0',
  `html` text NOT NULL,
  `rating` double NOT NULL DEFAULT '0',
  PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;

--
-- Sťahujem dáta pre tabuľku `tis_tasks`
--


-- --------------------------------------------------------

--
-- Štruktúra tabuľky pre tabuľku `tis_tasks_comments`
--

CREATE TABLE IF NOT EXISTS `tis_tasks_comments` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `task_id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `date` date NOT NULL,
  `text` text NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;

--
-- Sťahujem dáta pre tabuľku `tis_tasks_comments`
--


-- --------------------------------------------------------

--
-- Štruktúra tabuľky pre tabuľku `tis_tasks_keywords`
--

CREATE TABLE IF NOT EXISTS `tis_tasks_keywords` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `task_id` int(11) NOT NULL,
  `keyword_id` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;

--
-- Sťahujem dáta pre tabuľku `tis_tasks_keywords`
--


-- --------------------------------------------------------

--
-- Štruktúra tabuľky pre tabuľku `tis_tasks_rating`
--

CREATE TABLE IF NOT EXISTS `tis_tasks_rating` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `task_id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `rating` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;

--
-- Sťahujem dáta pre tabuľku `tis_tasks_rating`
--


-- --------------------------------------------------------

--
-- Štruktúra tabuľky pre tabuľku `tis_tests`
--

CREATE TABLE IF NOT EXISTS `tis_tests` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `user_id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;

--
-- Sťahujem dáta pre tabuľku `tis_tests`
--


-- --------------------------------------------------------

--
-- Štruktúra tabuľky pre tabuľku `tis_tests_taks`
--

CREATE TABLE IF NOT EXISTS `tis_tests_taks` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `test_id` int(11) NOT NULL,
  `task_id` int(11) NOT NULL,
  `task_index` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;

--
-- Sťahujem dáta pre tabuľku `tis_tests_taks`
--


-- --------------------------------------------------------

--
-- Štruktúra tabuľky pre tabuľku `tis_users`
--

CREATE TABLE IF NOT EXISTS `tis_users` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `username` varchar(255) NOT NULL,
  `full_name` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `permissions` tinyint(4) NOT NULL,
  `about` text NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 AUTO_INCREMENT=2 ;

--
-- Sťahujem dáta pre tabuľku `tis_users`
--

INSERT INTO `tis_users` (`id`, `username`, `full_name`, `password`, `email`, `permissions`, `about`) VALUES
(1, 'admin', 'admin', '$2a$07$4EFr8dIYFyF77ifcYYsC4uDrFKsaWSDKoZkIaBh3z0coT3AJayCTO', 'admin@jurenka.sk', 1, '');
