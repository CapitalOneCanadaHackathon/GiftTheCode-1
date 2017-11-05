-- phpMyAdmin SQL Dump
-- version 4.7.4
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1:3306
-- Generation Time: Nov 04, 2017 at 08:10 PM
-- Server version: 5.7.19
-- PHP Version: 7.0.23

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `sisitiering_inventory`
--

-- --------------------------------------------------------

--
-- Table structure for table `gtc_items`
--

DROP TABLE IF EXISTS `gtc_items`;
CREATE TABLE IF NOT EXISTS `gtc_items` (
  `id_item` int(11) NOT NULL AUTO_INCREMENT,
  `id_item_category` int(11) NOT NULL,
  `name` varchar(30) NOT NULL,
  `size` varchar(5) DEFAULT NULL,
  `updated_by` int(11) NOT NULL,
  `update_date` timestamp NOT NULL,
  `requested` bit(1) NOT NULL DEFAULT b'0',
  `priority` varchar(6) NOT NULL DEFAULT 'Low',
  `memo` varchar(200) DEFAULT NULL,
  PRIMARY KEY (`id_item`),
  KEY `id_item_category` (`id_item_category`),
  KEY `updated_by` (`updated_by`),
  KEY `memo` (`memo`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `gtc_items_timestamp`
--

DROP TABLE IF EXISTS `gtc_items_timestamp`;
CREATE TABLE IF NOT EXISTS `gtc_items_timestamp` (
  `id_items_timestamp` int(11) NOT NULL AUTO_INCREMENT,
  `time` timestamp NULL DEFAULT NULL,
  `id_volunteer` int(11) DEFAULT NULL,
  `id_item` int(11) NOT NULL,
  `memo` varchar(200) DEFAULT NULL,
  `description` varchar(200) NOT NULL,
  PRIMARY KEY (`id_items_timestamp`),
  KEY `fk_id_volunteer` (`id_volunteer`),
  KEY `fk_id_item` (`id_item`),
  KEY `fk_memo` (`memo`),
  KEY `memo` (`memo`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `gtc_item_categories`
--

DROP TABLE IF EXISTS `gtc_item_categories`;
CREATE TABLE IF NOT EXISTS `gtc_item_categories` (
  `id_item_category` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(30) NOT NULL,
  `img` varchar(30) DEFAULT NULL,
  PRIMARY KEY (`id_item_category`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `gtc_volunteers`
--

DROP TABLE IF EXISTS `gtc_volunteers`;
CREATE TABLE IF NOT EXISTS `gtc_volunteers` (
  `id_volunteer` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(30) NOT NULL,
  `phone` varchar(14) DEFAULT NULL,
  `email` varchar(35) DEFAULT NULL,
  `password` varchar(15) NOT NULL,
  PRIMARY KEY (`id_volunteer`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `gtc_items`
--
ALTER TABLE `gtc_items`
  ADD CONSTRAINT `gtc_items_ibfk_1` FOREIGN KEY (`id_item_category`) REFERENCES `gtc_item_categories` (`id_item_category`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `gtc_items_ibfk_2` FOREIGN KEY (`updated_by`) REFERENCES `gtc_volunteers` (`id_volunteer`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `gtc_items_timestamp`
--
ALTER TABLE `gtc_items_timestamp`
  ADD CONSTRAINT `gtc_items_timestamp_ibfk_1` FOREIGN KEY (`id_volunteer`) REFERENCES `gtc_volunteers` (`id_volunteer`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `gtc_items_timestamp_ibfk_2` FOREIGN KEY (`id_item`) REFERENCES `gtc_items` (`id_item`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `gtc_items_timestamp_ibfk_3` FOREIGN KEY (`memo`) REFERENCES `gtc_items` (`memo`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
