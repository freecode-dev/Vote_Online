-- phpMyAdmin SQL Dump
-- version 4.8.5
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1:3306
-- Generation Time: Nov 19, 2020 at 09:15 PM
-- Server version: 5.7.26
-- PHP Version: 7.2.18

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `db_election`
--

-- --------------------------------------------------------

--
-- Table structure for table `candidat`
--

DROP TABLE IF EXISTS `candidat`;
CREATE TABLE IF NOT EXISTS `candidat` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `nom` varchar(25) NOT NULL,
  `prenom` varchar(25) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=5 DEFAULT CHARSET=utf8;

--
-- Dumping data for table `candidat`
--

INSERT INTO `candidat` (`id`, `nom`, `prenom`) VALUES
(1, 'Lora ', 'Waterson'),
(2, 'Rowena', 'Doe'),
(3, 'Jeneba', 'Traore'),
(4, 'Ramatou', 'Traore');

-- --------------------------------------------------------

--
-- Table structure for table `votant`
--

DROP TABLE IF EXISTS `votant`;
CREATE TABLE IF NOT EXISTS `votant` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `nom` varchar(25) NOT NULL,
  `prenom` varchar(200) NOT NULL,
  `motdepasse` text NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=3 DEFAULT CHARSET=utf8;

--
-- Dumping data for table `votant`
--

INSERT INTO `votant` (`id`, `nom`, `prenom`, `motdepasse`) VALUES
(1, 'John', 'Doe', '40bd001563085fc35165329ea1ff5c5ecbdbbeef'),
(2, 'Sarah', 'Doe', '40bd001563085fc35165329ea1ff5c5ecbdbbeef');

-- --------------------------------------------------------

--
-- Table structure for table `vote`
--

DROP TABLE IF EXISTS `vote`;
CREATE TABLE IF NOT EXISTS `vote` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `votant_id` int(11) NOT NULL,
  `candidat_id` int(11) NOT NULL,
  `date_vote` datetime NOT NULL,
  PRIMARY KEY (`id`),
  KEY `votant_id` (`votant_id`),
  KEY `candidat_id` (`candidat_id`)
) ENGINE=MyISAM AUTO_INCREMENT=3 DEFAULT CHARSET=utf8;

--
-- Dumping data for table `vote`
--

INSERT INTO `vote` (`id`, `votant_id`, `candidat_id`, `date_vote`) VALUES
(1, 1, 3, '2020-11-19 09:05:24'),
(2, 2, 1, '2020-11-19 09:05:34');
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
