-- phpMyAdmin SQL Dump
-- version 4.8.5
-- https://www.phpmyadmin.net/
--
-- Host: localhost
-- Generation Time: Apr 14, 2019 at 11:37 PM
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

--
-- Dumping data for table `RSO`
--

INSERT INTO `RSO` (`Title`, `President`, `Treasurer`, `Description`, `Category`, `Website`, `Email`, `Department`) VALUES
('8 to Create', 'Pres8', 'Treas8', '8 Hours for 8 Artists to Create', 'Hobby', 'https://publish.illinois.edu/8', '8toCreate@gmail.com', 'Art'),
('Alpha Phi Omega', 'PresAPO', 'TreasAPO', 'Educational Service Fraternity', 'Volunteering', 'http://apo-aa.org/', 'secretary@apo-aa.org', 'None'),
('Alpha Pi Mu', 'PresAPM', 'TreasAPM', 'Industrial Engineering Honors Society', 'Honors', 'https://alphapimu.com/', 'vhoff2@illinois.edu\r\n', 'Industrial Engineering'),
('Cube Consulting', 'PresCube', 'TreasCube', 'Non-profit consulting organization', 'Academic', 'http://www.cubeconsulting.org/', 'cubeuiuc@gmail.com', 'Engineering'),
('ECE SAC', 'PresSAC', 'TreasSAC', 'Representing Students in ECE', 'Leadership', 'https://sac.ece.illinois.edu/', 'ecesac@gmail.com', 'ECE'),
('Engineering Open House', 'PresEOH', 'TreasEOH', 'Displaying Engineering Projects', 'Planning Events', 'https://www.eohillinois.org/', 'eoh@gmail.com', 'Engineering'),
('Hack4Impact', 'PresH4I', 'TreasH4I', 'Software for Nonprofits', 'Professional', 'https://uiuc.hack4impact.org/', 'tk2@illinois.edu', 'Computer Science'),
('HackIllinois', 'PresHI', 'TreasHI', 'Largest Open Source Hackathon', 'Planning Events', 'https://www.hackillinois.org/', 'help@hackillinois.org', 'Computer Science'),
('Illini Boxing', 'PresBoxing', 'TreasBoxing', 'Amateur and Competetive Boxing', 'Sports', 'http://illiniboxing.com/', 'illiniboxingclub@gmail.com', 'None'),
('Illini Formula Electric', 'PresFormula', 'TreasFormula', 'Building Race Cars', 'Academic', 'https://www.illiniformulaelect', 'formula@gmail.com', 'Mechanical Engineering'),
('Illini Mentor Program', 'Jaimin Patel', 'Sam Joshi', 'University of Illinois students mentoring future leaders today', 'Leadership', 'http://publish.illinois.edu/il', 'jpate203@illinois.edu', 'None'),
('Illini Student Musicals', 'Aleeza Leder Macek', 'Kelsey Handschuh', 'Performance of musical theater at the University of Illinois at Urbana-Champaign', 'Hobby', 'https://illinimusicals.wixsite', 'President@IlliniStudentMusical', 'Fine Arts'),
('Pi Tau Sigma', 'Alexandra Baumgart', 'Omar Darwish', 'Mechanical Engineering Honors Society', 'Honors', 'https://pitausigma.mechse.illi', 'baumgrt2@illinois.edu', 'Mechanical Engineering'),
('Society of Women Engineers', 'Abby Pakeltis', 'Alice Lin', 'Diverse network of women in pursuit of engineering', 'Professional', 'https://www.societyofwomenengi', 'UIUC.SWE@GMAIL.COM', 'Engineering'),
('Women in ECE', 'Monil Pathak', 'Carolyn Nye', 'Inspire women in Electrical and Computer Engineering', 'Professional', 'https://wece.ece.illinois.edu/', 'wece.uiuc@gmail.com', 'ECE');

-- --------------------------------------------------------

--
-- Table structure for table `RSO_members`
--

CREATE TABLE `RSO_members` (
  `Title` varchar(30) NOT NULL,
  `netid` varchar(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `RSO_members`
--

INSERT INTO `RSO_members` (`Title`, `netid`) VALUES
('8 to Create', 'ipon2'),
('Alpha Phi Omega', 'ipon2'),
('Alpha Phi Omega', 'suhinad2'),
('Alpha Pi Mu', 'axu5'),
('Cube Consulting', 'snagar9'),
('ECE SAC', 'pallavi3'),
('Engineering Open House', 'bmw4'),
('Hack4Impact', 'dschoi3'),
('Hack4Impact', 'mal7'),
('HackIllinois', 'bmw4'),
('Illini Boxing', 'dschoi3'),
('Illini Formula Electric', 'dsliu2'),
('Illini Mentor Program', 'krakman2'),
('Illini Student Musicals', 'amyhoke2'),
('Illini Student Musicals', 'axu5'),
('Pi Tau Sigma', 'dsliu2'),
('Society of Women Engineers', 'aashnaw2'),
('Society of Women Engineers', 'pallavi3'),
('Society of Women Engineers', 'snagar9'),
('Women in ECE', 'aashnaw2');

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
  `degreeLevelPursuing` varchar(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `Users`
--

INSERT INTO `Users` (`netid`, `inputEmail`, `firstName`, `lastName`, `inputPassword`, `major`, `graduationYear`, `degreeLevelPursuing`) VALUES
('aashnaw2', 'aashnaw2@illinois.edu', 'Aashna', 'Wadhwa', 'passwordA', 'Computer Engineering', 2021, 'Bachelors'),
('amyhoke2', 'amyhoke2@illinois.edu', 'Amy', 'Hoke', 'passwordA', 'Secondary Education of English', 2020, 'Graduate'),
('axu5', 'axu5@illinois.edu', 'Andrew', 'Xu', 'passwordA', 'Systems Engineering and Design', 2019, 'Bachelors'),
('bmw4', 'bmw4@illinois.edu', 'Brandon', 'Wang', 'passwordB', 'Computer Science', 2021, 'Bachelors'),
('dschoi3', 'dschoi3@illinois.edu', 'Daniel', 'Choi', 'passwordD', 'Computer Science', 2021, 'Bachelors'),
('dsliu2', 'dsliu2@illinois.edu', 'Derrick', 'Liu', 'passwordD', 'Mechanical Engineering', 2021, 'Bachelors'),
('ipon2', 'ipon2@illinois.edu', 'I', 'Pon', 'passwordI', 'Art History', 2019, 'Bachelors'),
('krakman2', 'krakman2@illinois.edu', 'K', 'Rakman', 'passwordK', 'Psychology', 2019, 'Bachelors'),
('mal7', 'mal7@illinois.edu', 'Michael', 'Leon', 'passwordM', 'Computer Science', 2021, 'Bachelors'),
('mliao9', 'mliao9@illinois.edu', 'Michael', 'Liao', 'passwordM', 'Systems Engineering and Design', 2019, 'Graduate'),
('pallavi3', 'pallavi3@illinois.edu', 'Pallavi', 'Narayanan', 'passwordP', 'Computer Engineering', 2021, 'Bachelors'),
('snagar9', 'snagar9@illinois.edu', 'Saloni', 'Nagarkar', 'passwordS', 'Mechnical Engineering', 2021, 'Bachelors'),
('suhinad2', 'suhinad2@illinois.edu', 'Suhina', 'Das', 'passwordS', 'MCB', 2021, 'Bachelors');

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
