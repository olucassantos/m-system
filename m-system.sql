-- phpMyAdmin SQL Dump
-- version 4.1.14
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: Aug 31, 2014 at 11:29 AM
-- Server version: 5.6.17
-- PHP Version: 5.5.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `m-system`
--

-- --------------------------------------------------------

--
-- Table structure for table `course`
--

CREATE TABLE IF NOT EXISTS `course` (
  `name` varchar(255) COLLATE utf8_bin NOT NULL,
  `id` int(5) NOT NULL AUTO_INCREMENT,
  `user_id` int(5) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 COLLATE=utf8_bin AUTO_INCREMENT=3 ;

--
-- Dumping data for table `course`
--

INSERT INTO `course` (`name`, `id`, `user_id`) VALUES
('Estrutura de Dados', 1, 1),
('Logica de ProgramaÃ§Ã£o', 2, 2);

-- --------------------------------------------------------

--
-- Table structure for table `hour`
--

CREATE TABLE IF NOT EXISTS `hour` (
  `week_day` varchar(15) COLLATE utf8_bin NOT NULL,
  `start` varchar(255) COLLATE utf8_bin NOT NULL,
  `end` varchar(255) COLLATE utf8_bin NOT NULL,
  `id` int(5) NOT NULL AUTO_INCREMENT,
  `schedule_id` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 COLLATE=utf8_bin AUTO_INCREMENT=15 ;

--
-- Dumping data for table `hour`
--

INSERT INTO `hour` (`week_day`, `start`, `end`, `id`, `schedule_id`) VALUES
('sunday', '-----', '-----', 1, 1),
('monday', '11:00', '13:00', 2, 1),
('tuesday', '-----', '-----', 3, 1),
('wednesday', '11:00', '13:00', 4, 1),
('thursday', '-----', '-----', 5, 1),
('friday', '11:00', '15:00', 6, 1),
('saturday', '-----', '-----', 7, 1),
('sunday', '-----', '-----', 8, 2),
('monday', '11:00', '13:00', 9, 2),
('tuesday', '-----', '-----', 10, 2),
('wednesday', '11:00', '13:00', 11, 2),
('thursday', '-----', '-----', 12, 2),
('friday', '11:00', '15:00', 13, 2),
('saturday', '-----', '-----', 14, 2);

-- --------------------------------------------------------

--
-- Table structure for table `lesson`
--

CREATE TABLE IF NOT EXISTS `lesson` (
  `start` time NOT NULL,
  `end` time NOT NULL,
  `user_id` int(5) NOT NULL,
  `day` date NOT NULL,
  `price_id` int(5) NOT NULL,
  `id` int(5) NOT NULL AUTO_INCREMENT,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_bin AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `login`
--

CREATE TABLE IF NOT EXISTS `login` (
  `user_id` int(5) NOT NULL,
  `login` varchar(15) COLLATE utf8_bin NOT NULL,
  `password` varchar(8) COLLATE utf8_bin NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_bin;

--
-- Dumping data for table `login`
--

INSERT INTO `login` (`user_id`, `login`, `password`) VALUES
(1, 'lucas', '123123'),
(2, 'sylvio', '123123');

-- --------------------------------------------------------

--
-- Table structure for table `price`
--

CREATE TABLE IF NOT EXISTS `price` (
  `value` int(10) NOT NULL,
  `active` tinyint(1) NOT NULL,
  `month` date NOT NULL,
  `id` int(5) NOT NULL AUTO_INCREMENT,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_bin AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `schedule`
--

CREATE TABLE IF NOT EXISTS `schedule` (
  `user_id` int(5) NOT NULL,
  `id` int(5) NOT NULL AUTO_INCREMENT,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 COLLATE=utf8_bin AUTO_INCREMENT=3 ;

--
-- Dumping data for table `schedule`
--

INSERT INTO `schedule` (`user_id`, `id`) VALUES
(1, 1),
(2, 2);

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE IF NOT EXISTS `user` (
  `name` varchar(255) COLLATE utf8_bin NOT NULL,
  `address` varchar(255) COLLATE utf8_bin NOT NULL,
  `phone` varchar(15) COLLATE utf8_bin NOT NULL,
  `cpf` varchar(15) COLLATE utf8_bin NOT NULL,
  `rg` varchar(10) COLLATE utf8_bin NOT NULL,
  `ra` varchar(255) COLLATE utf8_bin NOT NULL,
  `account` varchar(30) COLLATE utf8_bin NOT NULL,
  `id` int(5) NOT NULL AUTO_INCREMENT,
  `age` date NOT NULL,
  `email` varchar(255) COLLATE utf8_bin NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 COLLATE=utf8_bin AUTO_INCREMENT=3 ;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`name`, `address`, `phone`, `cpf`, `rg`, `ra`, `account`, `id`, `age`, `email`) VALUES
('Lucas Anjos dos Santos', 'Rua: Francisco Galhardo Filho, 42', '(18) 3606-4460', '331.652.154-15', '41.640.460', '222.021.154.12', '78.024-2', 1, '1995-02-11', 'oargus.g@gmail.com'),
('Sylvio Migliorucci Neto', 'Rua: Adamantina Barbosa, 24', '(18) 3606-4489', '553.325.465.15', '45.162.458', '663.154.326-5', '98.456.987-7', 2, '1995-06-11', 'sylvio@email.com.br');

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
