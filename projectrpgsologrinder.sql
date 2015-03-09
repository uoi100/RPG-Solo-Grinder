-- phpMyAdmin SQL Dump
-- version 4.2.11
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: Mar 09, 2015 at 06:41 AM
-- Server version: 5.6.21
-- PHP Version: 5.5.19

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `projectrpgsologrinder`
--

-- --------------------------------------------------------

--
-- Table structure for table `blogbase`
--

CREATE TABLE IF NOT EXISTS `blogbase` (
  `ID` int(11) NOT NULL,
  `Date` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `Category` text NOT NULL,
  `Title` text NOT NULL,
  `Subtitle` text NOT NULL,
  `Description` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `blogbase`
--

INSERT INTO `blogbase` (`ID`, `Date`, `Category`, `Title`, `Subtitle`, `Description`) VALUES
(0, '2015-03-09 01:49:21', 'anime', 'Anime Sample!', 'Some Title!', 'I love anime!'),
(1, '2015-03-09 05:32:42', 'news', 'News entry', 'Testing', 'I love the news!'),
(2, '2015-03-09 04:03:59', 'games', 'Game #1', 'Must Play!', 'Best Game ever!'),
(3, '2015-03-09 04:04:35', 'games', 'Game #2', 'Meh...', 'its alright.'),
(4, '2015-03-09 04:06:32', 'projects', 'Web Dev Assignment 2', 'Its getting there...', 'Yup.'),
(5, '2015-03-09 05:38:00', 'streams', 'Youtube Rewind 2014', 'Eh... seen better.', '<iframe width="560" height="315" src="https://www.youtube.com/embed/zKx2B8WCQuw" frameborder="0" allowfullscreen></iframe>');

-- --------------------------------------------------------

--
-- Table structure for table `userbase`
--

CREATE TABLE IF NOT EXISTS `userbase` (
  `Username` varchar(20) NOT NULL,
  `Password` text NOT NULL,
  `Type` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `userbase`
--

INSERT INTO `userbase` (`Username`, `Password`, `Type`) VALUES
('Admin', 'admin', 'Admin');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `blogbase`
--
ALTER TABLE `blogbase`
 ADD PRIMARY KEY (`ID`), ADD KEY `ID` (`ID`);

--
-- Indexes for table `userbase`
--
ALTER TABLE `userbase`
 ADD PRIMARY KEY (`Username`);

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
