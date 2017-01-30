-- phpMyAdmin SQL Dump
-- version 4.5.1
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: Jan 29, 2017 at 11:50 AM
-- Server version: 10.1.16-MariaDB
-- PHP Version: 5.6.24

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `logintest`
--

-- --------------------------------------------------------

--
-- Table structure for table `feedback`
--

CREATE TABLE `feedback` (
  `name` text NOT NULL,
  `email` varchar(20) NOT NULL,
  `type` varchar(20) NOT NULL,
  `message` varchar(300) NOT NULL,
  `ID` varchar(16) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `feedback`
--

INSERT INTO `feedback` (`name`, `email`, `type`, `message`, `ID`) VALUES
('Start', 'asdc', 'suggestions', 'Im so lonely because i have no friends and everybody have their own friends so they no need me anymore', '0'),
('charles xavier', 'jogn@appleseed.com', 'suggestions', 'I wish that life will be equal among men and that nobody will ever have to be sad again\r\n', '1');

-- --------------------------------------------------------

--
-- Table structure for table `userdatabase`
--

CREATE TABLE `userdatabase` (
  `ID` int(11) NOT NULL,
  `Username` varchar(16) NOT NULL,
  `Password` varchar(16) NOT NULL,
  `name` text NOT NULL,
  `email` text NOT NULL,
  `address` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `userdatabase`
--

INSERT INTO `userdatabase` (`ID`, `Username`, `Password`, `name`, `email`, `address`) VALUES
(1, 'Deunitato', 'meow', 'charlotte', 'charlotte.limwt@gmail.com', 'singapore'),
(2, 'shimakaze', 'rip', 'meowcon', 'char@gmail.com', 'singapore'),
(3, 'kanna', 'op', 'go', 'goodra@gmail.com', 'f'),
(4, 'kingofthejungle', 'pop', 'kouhai', 'dw@gmail.com', 'lol');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `feedback`
--
ALTER TABLE `feedback`
  ADD PRIMARY KEY (`ID`);

--
-- Indexes for table `userdatabase`
--
ALTER TABLE `userdatabase`
  ADD PRIMARY KEY (`ID`),
  ADD UNIQUE KEY `Username` (`Username`);

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
