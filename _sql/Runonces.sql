-- phpMyAdmin SQL Dump
-- version 4.3.8deb0.1
-- http://www.phpmyadmin.net
--
-- Host: localhost
-- Generation Time: Nov 22, 2015 at 06:09 PM
-- Server version: 10.1.8-MariaDB-1~trusty-log
-- PHP Version: 5.6.15-1+deb.sury.org~trusty+1

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `Engineering`
--

-- --------------------------------------------------------

--
-- Table structure for table `Runonces`
--

CREATE TABLE IF NOT EXISTS `Runonces` (
  `Runonce` varchar(128) NOT NULL,
  `Session` varchar(128) NOT NULL,
  `Active` int(1) NOT NULL DEFAULT '1'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `Runonces`
--

INSERT INTO `Runonces` (`Runonce`, `Session`, `Active`) VALUES
('31bb03170b94383be7bb665e73aa4c148de78a61e9b1724071a9e94a3ed93d775ade6d6bdfa719c703c3c1af6c0757e4bb17118282ed003fb0361fe9f356b55c', '', 0),
('ad3df0704e3de894d516eb4a6802a0787446d7b97c62893e2c504ff4873bb85eb5a8a662c217ebb4e2daadf0fde6fa32026dcceb9dc5c8e2d9bdc315939d020c', '', 0);

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
