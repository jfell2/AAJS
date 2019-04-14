-- phpMyAdmin SQL Dump
-- version 4.8.5
-- https://www.phpmyadmin.net/
--
-- Host: localhost
-- Generation Time: Apr 14, 2019 at 10:16 PM
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
-- Database: `test`
--

-- --------------------------------------------------------

--
-- Table structure for table `members`
--

CREATE TABLE `members` (
  `netid` varchar(255) NOT NULL,
  `year` int(255) NOT NULL,
  `major` varchar(255) NOT NULL,
  `minor` varchar(255) DEFAULT NULL,
  `college` varchar(255) NOT NULL,
  `gender` int(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `members`
--

INSERT INTO `members` (`netid`, `year`, `major`, `minor`, `college`, `gender`) VALUES
('suhinad2', 2, 'MCB', 'Chemistry', 'College of Liberal Arts and Sciences', 1),
('dschoi3', 2, 'Computer Science', 'Business', 'College of Engineering', 2),
('snagar9', 2, 'Mechnical Engineering', NULL, 'College of Engineering', 1),
('dsliu2', 2, 'Mechnical Engineering', 'Computer Science', 'College of Engineering', 2),
('mal7', 2, 'Computer Science', 'Psychology', 'College of Engineering', 2),
('mliao9', 6, 'Systems Engineering and Design', 'Computer Science', 'College of Engineering', 2),
('pallavi3', 2, 'Computer Engineering', NULL, 'College of Engineering', 1),
('axu5', 4, 'Systems Engineering and Design', NULL, 'College of Engineering', 2),
('amyhoke2', 5, 'Secondary Education of English PLUS Licensure', 'Theatre', 'College of Education', 1),
('ipon2', 4, 'Art History', 'Business', 'College of Liberal Arts and Sciences', 1),
('krakman2', 4, 'Psychology', 'Social Work', 'College of Liberal Arts and Sciences', 1),
('aashnaw2', 2, 'Computer Engineering', 'Business', 'College of Engineering', 1),
('bmw4', 2, 'Computer Science', 'Electrical Engineering', 'College of Engineering', 2),
('aashnaw2', 1999, 'compe', 'business', 'engineering', 2);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
