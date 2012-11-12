-- phpMyAdmin SQL Dump
-- version 3.3.9
-- http://www.phpmyadmin.net
--
-- Hostiteľ: localhost
-- Vygenerované:: 12.Nov, 2012 - 11:00
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
(5, 1, 'tri', 1, '5+5', 3),
(7, 1, 'uloha 6', 0, '4a - 3b = 25\r\n2a + 8b = 106', 3),
(8, 2, 'cislo7', 1, 'auto ide rychlostou 50 +- 0,1 km/h.\r\nza t = 10 +- 0,1 hodina prejde drahu 500 km... vypocitajte disperziu.', 1),
(9, 3, 'pat', 0, 'pomocou newtonovej interpolacie vypocitajte rychlost auta v case t = 10 s, ak v case t=1 preslo auto 5 m, t= 3 20m a t= 15 100 m.', 2),
(10, 4, 'osem', 1, 'mame 8 hrannu kocku. chceme aby 3krat zo 7 pokusov padla 4. aka je pravdepodobnost?\r\n', 5),
(11, 5, 'devat', 0, 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Nullam libero orci, sollicitudin at interdum vel, convallis at metus. Vivamus rutrum, eros euismod vulputate commodo, diam arcu blandit ligula, sed porttitor libero purus quis neque. Nullam cursus urna id eros blandit iaculis.', 1),
(12, 5, 'desat', 1, 'Suspendisse fermentum metus a sem semper eu aliquam erat iaculis. Integer rhoncus aliquet tempus. Vestibulum et sem neque, at molestie eros. Sed vehicula, leo quis fermentum facilisis, enim purus cursus nibh, at lobortis risus lectus at ligula. Praesent ut purus nec lacus rhoncus tristique. Class aptent taciti sociosqu ad litora torquent per conubia nostra, per inceptos himenaeos. Vivamus imperdiet consectetur iaculis. Phasellus consequat sem ac neque bibendum accumsan.', 3),
(13, 1, 'jedenast', 0, 'Quisque tincidunt, nibh ac sagittis molestie, diam metus dapibus nunc, vestibulum dictum diam eros quis diam. Proin dignissim volutpat lacus quis mattis. Vestibulum ante ipsum primis in faucibus orci luctus et ultrices posuere cubilia Curae; Praesent quam velit, molestie at accumsan et, auctor in leo.', 0),
(14, 1, 'dvanast', 0, ' Praesent sem nisi, faucibus non varius id, elementum id elit. Aliquam condimentum pulvinar leo et semper. Praesent odio nibh, auctor id pretium vitae, volutpat quis ante. Vestibulum tempus blandit vulputate.', 1),
(15, 2, 'trinast', 1, 'Praesent libero mauris, dapibus tincidunt dictum at, ultricies imperdiet libero. In a turpis neque, nec venenatis nunc. Aliquam aliquet eleifend erat, vel iaculis nibh dignissim ac. Donec aliquam facilisis justo, id pulvinar erat fermentum elementum. Lorem ipsum dolor sit amet, consectetur adipiscing elit.', 0),
(16, 2, 'strnast', 0, 'Etiam eleifend accumsan erat nec mollis. Cras neque sem, laoreet a dignissim id, venenatis vel felis. Fusce blandit, lorem rhoncus luctus tempus, est libero dictum felis, at lobortis diam libero ut justo. Donec massa mauris, sodales eget convallis volutpat, ultrices non ante. Integer commodo sapien ut orci molestie iaculis. Mauris consequat adipiscing leo, a commodo risus auctor et. Nam leo leo, blandit vitae commodo quis, tincidunt bibendum elit.', 2),
(17, 3, 'patnast', 0, 'Ut consequat faucibus tristique. Nam lacinia eleifend aliquet. Ut eu urna tellus, non interdum neque. Ut placerat placerat nisi ut euismod. Quisque lacus quam, tincidunt bibendum eleifend vel, ultricies quis justo.', 0),
(18, 3, 'sestnast', 0, ' Fusce fringilla elit ut erat egestas iaculis. Suspendisse condimentum odio ac nisl ullamcorper rhoncus vestibulum neque sollicitudin. Nulla in dictum augue. Suspendisse varius rhoncus neque a eleifend. Sed vitae elit quis arcu interdum gravida a a enim. Etiam a purus tellus. Morbi vel purus erat. In ut tortor tortor, quis convallis lectus.', 4);

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
(2, 3, 'cislo2'),
(3, 3, 'november'),
(4, 1, 'zima');

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

--
-- Sťahujem dáta pre tabuľku `tis_users`
--

INSERT INTO `tis_users` (`id`, `username`, `full_name`, `password`, `email`, `permissions`, `about`) VALUES
(1, 'admin', 'admin', '$2a$07$4EFr8dIYFyF77ifcYYsC4uDrFKsaWSDKoZkIaBh3z0coT3AJayCTO', 'admin@jurenka.sk', 1, ''),
(2, 'katka', 'katka', '$2a$07$0V7z7La5gD94R1.qHJopBOPwP9hwR3l/.sBh7HkvV5ZzgJghLa9cG', 'invisibilka@gmail.com', 1, ''),
(3, 'marek', 'marek', '$2a$07$Iy545k.aOsnnOdq5JyOXwOMtSwyI7J2sEjoo/aMNU0imlACnPLGX.', 'mare.orave@gmail.com', 1, ''),
(4, 'evka', 'evka', '$2a$07$r8z1f6fwwTNhwWF4DD8O1Oo/gZ2AlFe4UyW4WCVkdSfB6eSiEy8Fy', '', 0, 'aaaaa'),
(5, 'milos', 'milos', '$2a$07$6YTa4GzASFstaPyxR5otxesOZGotUDp1xd/xEQyDCNNVHTKYvp7oO', '', 0, 'bbbbbb');
