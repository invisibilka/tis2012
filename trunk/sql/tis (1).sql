-- phpMyAdmin SQL Dump
-- version 3.3.9
-- http://www.phpmyadmin.net
--
-- Hostiteľ: localhost
-- Vygenerované:: 13.Dec, 2012 - 22:02
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
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 AUTO_INCREMENT=5 ;

--
-- Sťahujem dáta pre tabuľku `tis_keywords`
--

INSERT INTO `tis_keywords` (`id`, `name`) VALUES
(4, 'zvieratka'),
(3, 'obrazky');

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
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 AUTO_INCREMENT=125 ;

--
-- Sťahujem dáta pre tabuľku `tis_students_lists`
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
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 AUTO_INCREMENT=11 ;

--
-- Sťahujem dáta pre tabuľku `tis_student_lists`
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
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 AUTO_INCREMENT=21 ;

--
-- Sťahujem dáta pre tabuľku `tis_tasks`
--

INSERT INTO `tis_tasks` (`id`, `user_id`, `name`, `is_public`, `html`, `rating`) VALUES
(19, 1, 'Testovacia uloha na test', 0, '<p>Ktory obrazok je najkrajsi?</p>\r\n<p>a)</p>\r\n<p><img src="/tis/uploads/74b1eb3acb_9219863_o24.jpg" alt="" width="118" height="87" /></p>\r\n<p>b)</p>\r\n<p><img src="/tis/uploads/2252e88c75_9219929_o2.jpg" alt="" width="116" height="124" /></p>\r\n<p>c)</p>\r\n<p><img src="/tis/uploads/a6fd70bfbf_9219952_o2.jpg" alt="" width="122" height="105" /></p>', 3),
(20, 1, 'Zvieratka', 0, '<p>Ktore zviera je zaba?</p>\r\n<p>(Ak si nieste isty, zaba je zelena)</p>\r\n<p>1)<img src="/tis/uploads/Ranajky_IV2.jpg" alt="" width="137" height="91" />&nbsp;2)<img src="/tis/uploads/Mam_te_22-12-20112.jpg" alt="" width="94" height="89" />&nbsp;3)&nbsp;<img src="/tis/uploads/No_Mr_Bond1.jpg" alt="" width="108" height="90" /></p>', 0);

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
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 AUTO_INCREMENT=4 ;

--
-- Sťahujem dáta pre tabuľku `tis_tasks_comments`
--

INSERT INTO `tis_tasks_comments` (`id`, `task_id`, `user_id`, `date`, `text`) VALUES
(3, 19, 1, '2012-12-13', 'Velmi dobra uloha');

-- --------------------------------------------------------

--
-- Štruktúra tabuľky pre tabuľku `tis_tasks_keywords`
--

CREATE TABLE IF NOT EXISTS `tis_tasks_keywords` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `task_id` int(11) NOT NULL,
  `keyword_id` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 AUTO_INCREMENT=12 ;

--
-- Sťahujem dáta pre tabuľku `tis_tasks_keywords`
--

INSERT INTO `tis_tasks_keywords` (`id`, `task_id`, `keyword_id`) VALUES
(11, 20, 4),
(10, 20, 3),
(9, 19, 3);

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
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 AUTO_INCREMENT=8 ;

--
-- Sťahujem dáta pre tabuľku `tis_tasks_rating`
--

INSERT INTO `tis_tasks_rating` (`id`, `task_id`, `user_id`, `rating`) VALUES
(7, 19, 1, 3);

-- --------------------------------------------------------

--
-- Štruktúra tabuľky pre tabuľku `tis_tests`
--

CREATE TABLE IF NOT EXISTS `tis_tests` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `user_id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 AUTO_INCREMENT=8 ;

--
-- Sťahujem dáta pre tabuľku `tis_tests`
--

INSERT INTO `tis_tests` (`id`, `user_id`, `name`) VALUES
(7, 1, 'Pisomka pre intelektualov');

-- --------------------------------------------------------

--
-- Štruktúra tabuľky pre tabuľku `tis_tests_tasks`
--

CREATE TABLE IF NOT EXISTS `tis_tests_tasks` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `test_id` int(11) NOT NULL,
  `task_id` int(11) NOT NULL,
  `task_index` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 AUTO_INCREMENT=17 ;

--
-- Sťahujem dáta pre tabuľku `tis_tests_tasks`
--

INSERT INTO `tis_tests_tasks` (`id`, `test_id`, `task_id`, `task_index`) VALUES
(15, 7, 19, 1),
(16, 7, 20, 2);

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
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 AUTO_INCREMENT=6 ;

--
-- Sťahujem dáta pre tabuľku `tis_users`
--

INSERT INTO `tis_users` (`id`, `username`, `full_name`, `password`, `email`, `permissions`, `about`) VALUES
(1, 'admin', 'admin', '$2a$07$4EFr8dIYFyF77ifcYYsC4uDrFKsaWSDKoZkIaBh3z0coT3AJayCTO', 'admin@jurenka.sk', 1, '');
