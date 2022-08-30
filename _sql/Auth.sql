-- phpMyAdmin SQL Dump
-- version 4.6.6deb1+deb.cihar.com~xenial.2
-- https://www.phpmyadmin.net/
--
-- Host: localhost
-- Generation Time: May 10, 2018 at 05:24 PM
-- Server version: 10.1.33-MariaDB-1~xenial
-- PHP Version: 7.1.17-1+ubuntu16.04.1+deb.sury.org+1

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `PuffDB`
--

-- --------------------------------------------------------

--
-- Table structure for table `KeyValues`
--

CREATE TABLE `KeyValues` (
  `Username` varchar(128) NOT NULL,
  `Key` varchar(128) NOT NULL,
  `Value` varchar(128) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `Members`
--

CREATE TABLE `Members` (
  `Username` varchar(128) NOT NULL,
  `Active` int(1) NOT NULL DEFAULT '1',
  `2FA Active` int(1) NOT NULL DEFAULT '0',
  `2FA Secret` varchar(16) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `Passwords`
--

CREATE TABLE `Passwords` (
  `Username` varchar(128) NOT NULL,
  `Method` varchar(32) NOT NULL,
  `Hash` varchar(256) NOT NULL,
  `Salt` varchar(128) DEFAULT NULL,
  `Created` int(10) NOT NULL,
  `Last used` int(10) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `Sessions`
--

CREATE TABLE `Sessions` (
  `Username` varchar(128) NOT NULL,
  `Active` int(1) NOT NULL DEFAULT '1',
  `IP` varchar(128) DEFAULT NULL,
  `Session` varchar(128) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `KeyValues`
--
ALTER TABLE `KeyValues`
  ADD PRIMARY KEY (`Username`,`Key`);

--
-- Indexes for table `Members`
--
ALTER TABLE `Members`
  ADD PRIMARY KEY (`Username`),
  ADD KEY `Active` (`Active`);

--
-- Indexes for table `Passwords`
--
ALTER TABLE `Passwords`
  ADD KEY `Username` (`Username`),
  ADD KEY `Created` (`Created`);

--
-- Indexes for table `Sessions`
--
ALTER TABLE `Sessions`
  ADD PRIMARY KEY (`Session`),
  ADD KEY `Username` (`Username`);

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
