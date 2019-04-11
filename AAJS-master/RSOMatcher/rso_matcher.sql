-- phpMyAdmin SQL Dump
-- version 4.8.5
-- https://www.phpmyadmin.net/
--
-- Host: localhost
-- Generation Time: Apr 11, 2019 at 01:54 AM
-- Server version: 10.1.38-MariaDB
-- PHP Version: 7.1.27

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `rso_matcher`
--
CREATE DATABASE IF NOT EXISTS `rso_matcher` DEFAULT CHARACTER SET latin1 COLLATE latin1_swedish_ci;
USE `rso_matcher`;

-- --------------------------------------------------------

--
-- Table structure for table `RSO`
--

CREATE TABLE `RSO` (
  `Title` varchar(30) NOT NULL,
  `President` varchar(30) NOT NULL,
  `Treasurer` varchar(30) NOT NULL,
  `Description` text NOT NULL,
  `Category` varchar(30) NOT NULL,
  `Website` varchar(30) NOT NULL,
  `Email` varchar(30) NOT NULL,
  `Department` varchar(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `RSO_members`
--

CREATE TABLE `RSO_members` (
  `Title` varchar(30) NOT NULL,
  `netid` varchar(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `Users`
--

CREATE TABLE `Users` (
  `netid` varchar(30) NOT NULL,
  `inputEmail` varchar(30) NOT NULL,
  `firstName` varchar(30) NOT NULL,
  `lastName` varchar(30) NOT NULL,
  `inputPassword` varchar(30) NOT NULL,
  `major` varchar(30) NOT NULL,
  `graduationYear` int(11) NOT NULL,
  `degreeLevelPursuing` varchar(30) NOT NULL,
  `RSO1` varchar(30) NOT NULL,
  `RSO2` varchar(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `RSO`
--
ALTER TABLE `RSO`
  ADD PRIMARY KEY (`Title`);

--
-- Indexes for table `RSO_members`
--
ALTER TABLE `RSO_members`
  ADD PRIMARY KEY (`Title`,`netid`),
  ADD KEY `netid` (`netid`);

--
-- Indexes for table `Users`
--
ALTER TABLE `Users`
  ADD PRIMARY KEY (`netid`),
  ADD UNIQUE KEY `inputEmail` (`inputEmail`);

--
-- Constraints for dumped tables
--

--
-- Constraints for table `RSO_members`
--
ALTER TABLE `RSO_members`
  ADD CONSTRAINT `rso_members_ibfk_1` FOREIGN KEY (`Title`) REFERENCES `RSO` (`Title`),
  ADD CONSTRAINT `rso_members_ibfk_2` FOREIGN KEY (`netid`) REFERENCES `Users` (`netid`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
