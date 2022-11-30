-- phpMyAdmin SQL Dump
-- version 4.1.14
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: Jun 05, 2022 at 12:37 PM
-- Server version: 5.6.17
-- PHP Version: 5.5.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `evaluation`
--

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE IF NOT EXISTS `users` (
  `email` varchar(20) CHARACTER SET utf8 DEFAULT NULL,
  `password` varchar(20) CHARACTER SET utf8 DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`email`, `password`) VALUES
('21001@supnum.mr', '21001'),
('21002@supnum.mr', '21002'),
('21003@supnum.mr', '21003'),
('21004@supnum.mr', '21004'),
('21005@supnum.mr', '21005'),
('21006@supnum.mr', '21006'),
('21007@supnum.mr', '21007'),
('21008@supnum.mr', '21008'),
('21009@supnum.mr', '21009'),
('21010@supnum.mr', '21010'),
('21011@supnum.mr', '21011'),
('21012@supnum.mr', '21012'),
('21013@supnum.mr', '21013'),
('21014@supnum.mr', '21014'),
('21015@supnum.mr', '21015'),
('21016@supnum.mr', '21016'),
('21017@supnum.mr', '21017'),
('21018@supnum.mr', '21018'),
('21019@supnum.mr', '21019'),
('21020@supnum.mr', '21020'),
('21021@supnum.mr', '21021'),
('21022@supnum.mr', '21022'),
('21023@supnum.mr', '21023'),
('21024@supnum.mr', '21024'),
('21025@supnum.mr', '21025'),
('21026@supnum.mr', '21026'),
('21027@supnum.mr', '21027'),
('21028@supnum.mr', '21028'),
('21029@supnum.mr', '21029'),
('21030@supnum.mr', '21030'),
('21031@supnum.mr', '21031'),
('21032@supnum.mr', '21032'),
('21033@supnum.mr', '21033'),
('21034@supnum.mr', '21034'),
('21035@supnum.mr', '21035'),
('21036@supnum.mr', '21036'),
('21037@supnum.mr', '21037'),
('21038@supnum.mr', '21038'),
('21039@supnum.mr', '21039'),
('21040supnum.mr', '21040'),
('21041@supnum.mr', '21041'),
('21042@supnum.mr', '21042'),
('21043@supnum.mr', '21043'),
('21044@supnum.mr', '21044'),
('21045@supnum.mr', '21045'),
('21046@supnum.mr', '21046'),
('21047@supnum.mr', '21047'),
('21048@supnum.mr', '21048'),
('21049@supnum.mr', '21049'),
('21050@supnum.mr', '21050'),
('21051@supnum.mr', '21051'),
('21052@supnum.mr', '21052'),
('21053@supnum.mr', '21053'),
('21054@supnum.mr', '21054'),
('21055@supnum.mr', '21055'),
('21056@supnum.mr', '21056'),
('21057@supnum.mr', '21057'),
('21058@supnum.mr', '21058'),
('21059@supnum.mr', '21059'),
('21060@supnum.mr', '21060'),
('21061@supnum.mr', '21061'),
('21062@supnum.mr', '21062'),
('21063@supnum.mr', '21063'),
('21064@supnum.mr', '21064'),
('21065@supnum.mr', '21065'),
('21066@supnum.mr', '21066'),
('21067@supnum.mr', '21067'),
('21068@supnum.mr', '21068'),
('21069@supnum.mr', '21069'),
('21070@supnum.mr', '21070'),
('21071@supnum.mr', '21071'),
('21072@supnum.mr', '21072'),
('21073@supnum.mr', '21073'),
('21074@supnum.mr', '21074'),
('21075@supnum.mr', '21075'),
('21076@supnum.mr', '21076'),
('cheikh.dhib@supnum.m', 'cheikh'),
('Moussa.Ba@supnum.mr', 'Moussa');

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
