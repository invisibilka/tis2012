-- phpMyAdmin SQL Dump
-- version 3.5.1
-- http://www.phpmyadmin.net
--
-- Hostiteľ: localhost
-- Vygenerované: Po 19.Nov 2012, 12:14
-- Verzia serveru: 5.5.24-log
-- Verzia PHP: 5.3.13

SET SQL_MODE="NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


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

-- --------------------------------------------------------

--
-- Štruktúra tabuľky pre tabuľku `tis_keywords`
--

CREATE TABLE IF NOT EXISTS `tis_keywords` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(255) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 AUTO_INCREMENT=3 ;

--
-- Sťahujem dáta pre tabuľku `tis_keywords`
--

INSERT INTO `tis_keywords` (`id`, `name`) VALUES
(1, 'verejna'),
(2, 'sucet');

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
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 AUTO_INCREMENT=7 ;

--
-- Sťahujem dáta pre tabuľku `tis_students`
--

INSERT INTO `tis_students` (`id`, `user_id`, `name`, `email`) VALUES
(1, 1, 'jurko', 'jurko@gmail.com'),
(2, 1, 'janka', 'janka@gmail.com'),
(3, 2, 'michal', 'michal@gmail.com'),
(4, 2, 'jano', 'jano@gmail.com'),
(5, 1, 'vlado', 'jurenka@jurenka.sk'),
(6, 1, 'katka', 'invisibilka@gmail.com');

-- --------------------------------------------------------

--
-- Štruktúra tabuľky pre tabuľku `tis_students_lists`
--

CREATE TABLE IF NOT EXISTS `tis_students_lists` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `student_id` int(11) NOT NULL,
  `list_id` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 AUTO_INCREMENT=7 ;

--
-- Sťahujem dáta pre tabuľku `tis_students_lists`
--

INSERT INTO `tis_students_lists` (`id`, `student_id`, `list_id`) VALUES
(1, 1, 1),
(2, 2, 1),
(3, 5, 1),
(4, 6, 1),
(5, 3, 2),
(6, 4, 2);

-- --------------------------------------------------------

--
-- Štruktúra tabuľky pre tabuľku `tis_student_lists`
--

CREATE TABLE IF NOT EXISTS `tis_student_lists` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `user_id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 AUTO_INCREMENT=3 ;

--
-- Sťahujem dáta pre tabuľku `tis_student_lists`
--

INSERT INTO `tis_student_lists` (`id`, `user_id`, `name`) VALUES
(1, 1, 'prvaci'),
(2, 2, 'informatici');

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
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 AUTO_INCREMENT=19 ;

--
-- Sťahujem dáta pre tabuľku `tis_tasks`
--

INSERT INTO `tis_tasks` (`id`, `user_id`, `name`, `is_public`, `html`, `rating`) VALUES
(1, 4, 'jedna', 0, 'tato uloha je pre vsetkych', 1),
(2, 2, 'dva', 1, 'verejna uloha, 2+2 = ?', 3),
(6, 3, 'styri', 0, '10-2', 2),
(5, 1, 'tri', 1, '<p><img src="/tis2012/uploads/29420_433517146708352_1526912834_n1.jpg" alt="" /></p>', 3),
(7, 1, 'uloha 6', 0, '<p><img title="&Uacute;žasn&yacute;" src="/tis2012/assets/d9cb467c/plugins/emotions/img/smiley-cool.gif" alt="&Uacute;žasn&yacute;" border="0" />4a - 3b = 25 2a + 8b = 106</p>', 3),
(8, 2, 'cislo7', 1, 'auto ide rychlostou 50 +- 0,1 km/h.\r\nza t = 10 +- 0,1 hodina prejde drahu 500 km... vypocitajte disperziu.', 4),
(9, 3, 'pat', 0, 'pomocou newtonovej interpolacie vypocitajte rychlost auta v case t = 10 s, ak v case t=1 preslo auto 5 m, t= 3 20m a t= 15 100 m.', 2),
(10, 4, 'osem', 1, 'mame 8 hrannu kocku. chceme aby 3krat zo 7 pokusov padla 4. aka je pravdepodobnost?\r\n', 5),
(11, 5, 'devat', 0, 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Nullam libero orci, sollicitudin at interdum vel, convallis at metus. Vivamus rutrum, eros euismod vulputate commodo, diam arcu blandit ligula, sed porttitor libero purus quis neque. Nullam cursus urna id eros blandit iaculis.', 1),
(12, 5, 'desat', 1, 'Suspendisse fermentum metus a sem semper eu aliquam erat iaculis. Integer rhoncus aliquet tempus. Vestibulum et sem neque, at molestie eros. Sed vehicula, leo quis fermentum facilisis, enim purus cursus nibh, at lobortis risus lectus at ligula. Praesent ut purus nec lacus rhoncus tristique. Class aptent taciti sociosqu ad litora torquent per conubia nostra, per inceptos himenaeos. Vivamus imperdiet consectetur iaculis. Phasellus consequat sem ac neque bibendum accumsan.', 3),
(13, 1, 'jedenast', 1, '<p>Quisque tincidunt, nibh ac sagittis molestie, diam metus dapibus nunc, vestibulum dictum diam eros quis diam. Proin dignissim volutpat lacus quis mattis. Vestibulum ante ipsum primis in faucibus orci luctus et ultrices posuere cubilia Curae; Praesent quam velit, molestie at accumsan et, auctor in leo.</p>', 1.6666666666667),
(14, 1, 'dvanast', 0, ' Praesent sem nisi, faucibus non varius id, elementum id elit. Aliquam condimentum pulvinar leo et semper. Praesent odio nibh, auctor id pretium vitae, volutpat quis ante. Vestibulum tempus blandit vulputate.', 1),
(15, 2, 'trinast', 1, 'Praesent libero mauris, dapibus tincidunt dictum at, ultricies imperdiet libero. In a turpis neque, nec venenatis nunc. Aliquam aliquet eleifend erat, vel iaculis nibh dignissim ac. Donec aliquam facilisis justo, id pulvinar erat fermentum elementum. Lorem ipsum dolor sit amet, consectetur adipiscing elit.', 4),
(16, 2, 'strnast', 0, 'Etiam eleifend accumsan erat nec mollis. Cras neque sem, laoreet a dignissim id, venenatis vel felis. Fusce blandit, lorem rhoncus luctus tempus, est libero dictum felis, at lobortis diam libero ut justo. Donec massa mauris, sodales eget convallis volutpat, ultrices non ante. Integer commodo sapien ut orci molestie iaculis. Mauris consequat adipiscing leo, a commodo risus auctor et. Nam leo leo, blandit vitae commodo quis, tincidunt bibendum elit.', 2),
(17, 3, 'patnast', 0, 'Ut consequat faucibus tristique. Nam lacinia eleifend aliquet. Ut eu urna tellus, non interdum neque. Ut placerat placerat nisi ut euismod. Quisque lacus quam, tincidunt bibendum eleifend vel, ultricies quis justo.', 0),
(18, 3, 'sestnast', 0, ' Fusce fringilla elit ut erat egestas iaculis. Suspendisse condimentum odio ac nisl ullamcorper rhoncus vestibulum neque sollicitudin. Nulla in dictum augue. Suspendisse varius rhoncus neque a eleifend. Sed vitae elit quis arcu interdum gravida a a enim. Etiam a purus tellus. Morbi vel purus erat. In ut tortor tortor, quis convallis lectus.', 4);

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
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 AUTO_INCREMENT=3 ;

--
-- Sťahujem dáta pre tabuľku `tis_tasks_comments`
--

INSERT INTO `tis_tasks_comments` (`id`, `task_id`, `user_id`, `date`, `text`) VALUES
(1, 1, 1, '2012-11-16', 'no toto:D'),
(2, 1, 2, '2012-11-16', 'jej :)');

-- --------------------------------------------------------

--
-- Štruktúra tabuľky pre tabuľku `tis_tasks_keywords`
--

CREATE TABLE IF NOT EXISTS `tis_tasks_keywords` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `task_id` int(11) NOT NULL,
  `keyword_id` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 AUTO_INCREMENT=9 ;

--
-- Sťahujem dáta pre tabuľku `tis_tasks_keywords`
--

INSERT INTO `tis_tasks_keywords` (`id`, `task_id`, `keyword_id`) VALUES
(1, 2, 1),
(2, 6, 1),
(3, 8, 1),
(4, 10, 1),
(5, 12, 1),
(6, 15, 1),
(7, 5, 2),
(8, 8, 2);

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
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 AUTO_INCREMENT=7 ;

--
-- Sťahujem dáta pre tabuľku `tis_tasks_rating`
--

INSERT INTO `tis_tasks_rating` (`id`, `task_id`, `user_id`, `rating`) VALUES
(1, 13, 2, 2),
(2, 13, 3, 1),
(3, 13, 1, 2),
(4, 8, 1, 4),
(5, 15, 1, 4),
(6, 2, 1, 3);

-- --------------------------------------------------------

--
-- Štruktúra tabuľky pre tabuľku `tis_tests`
--

CREATE TABLE IF NOT EXISTS `tis_tests` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `user_id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 AUTO_INCREMENT=5 ;

--
-- Sťahujem dáta pre tabuľku `tis_tests`
--

INSERT INTO `tis_tests` (`id`, `user_id`, `name`) VALUES
(1, 2, 'cislo1'),
(2, 3, 'cislo2'),
(3, 3, 'november'),
(4, 1, 'zima');

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
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 AUTO_INCREMENT=12 ;

--
-- Sťahujem dáta pre tabuľku `tis_tests_tasks`
--

INSERT INTO `tis_tests_tasks` (`id`, `test_id`, `task_id`, `task_index`) VALUES
(1, 1, 2, 1),
(2, 1, 6, 2),
(3, 2, 5, 1),
(4, 2, 6, 2),
(5, 3, 9, 1),
(6, 3, 17, 2),
(7, 3, 18, 3),
(8, 4, 8, 1),
(9, 4, 10, 2),
(10, 4, 12, 3),
(11, 4, 14, 4);

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
(1, 'admin', 'admin', '$2a$07$4EFr8dIYFyF77ifcYYsC4uDrFKsaWSDKoZkIaBh3z0coT3AJayCTO', 'admin@jurenka.sk', 1, ''),
(2, 'katka', 'katka', '$2a$07$0V7z7La5gD94R1.qHJopBOPwP9hwR3l/.sBh7HkvV5ZzgJghLa9cG', 'invisibilka@gmail.com', 1, ''),
(3, 'marek', 'marek', '$2a$07$Iy545k.aOsnnOdq5JyOXwOMtSwyI7J2sEjoo/aMNU0imlACnPLGX.', 'mare.orave@gmail.com', 1, ''),
(4, 'evka', 'evka', '$2a$07$r8z1f6fwwTNhwWF4DD8O1Oo/gZ2AlFe4UyW4WCVkdSfB6eSiEy8Fy', '', 0, 'aaaaa'),
(5, 'milos', 'milos', '$2a$07$6YTa4GzASFstaPyxR5otxesOZGotUDp1xd/xEQyDCNNVHTKYvp7oO', '', 0, 'bbbbbb');

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
