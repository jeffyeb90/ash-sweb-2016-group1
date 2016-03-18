-- phpMyAdmin SQL Dump
-- version 4.5.0.2
-- http://www.phpmyadmin.net
--
-- Host: localhost
-- Generation Time: Mar 04, 2016 at 02:29 PM
-- Server version: 10.0.17-MariaDB
-- PHP Version: 5.6.14

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `ashesi_clinic`
--

-- --------------------------------------------------------

--
-- Table structure for table `diseases`
--

CREATE TABLE `diseases` (
  `DISEASEID` int(11) NOT NULL DEFAULT '0',
  `NAME` varchar(200) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `emergencyContact`
--

CREATE TABLE `emergencyContact` (
  `CONTACTID` int(11) NOT NULL DEFAULT '0',
  `FIRSTNAME` int(45) DEFAULT NULL,
  `LASTNAME` int(45) DEFAULT NULL,
  `EMAIL` int(45) DEFAULT NULL,
  `PHONENUMBER` varchar(45) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `medicalComplaint`
--

CREATE TABLE `medicalComplaint` (
  `COMPLAINTID` int(11) NOT NULL,
  `STUDENTID` int(8) NOT NULL DEFAULT '0',
  `DATE` date DEFAULT NULL,
  `TEMPERATURE` decimal(10,2) DEFAULT NULL,
  `SYMPTOMS` varchar(300) DEFAULT NULL,
  `DIAGNOSIS` varchar(200) NOT NULL,
  `CAUSE` varchar(200) NOT NULL,
  `PRESCRIPTION` varchar(100) NOT NULL,
  `NURSEID` int(8) NOT NULL DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `medicalComplaint`
--

INSERT INTO `medicalComplaint` (`COMPLAINTID`, `STUDENTID`, `DATE`, `TEMPERATURE`, `SYMPTOMS`, `DIAGNOSIS`, `CAUSE`, `PRESCRIPTION`, `NURSEID`) VALUES
(1, 73812017, '2016-03-04', '38.00', 'Headache, nausea', 'Malaria', 'Stagnant water in area', 'Amodiaquine ', 23456879);

-- --------------------------------------------------------

--
-- Table structure for table `nurses`
--

CREATE TABLE `nurses` (
  `NURSEID` int(8) NOT NULL DEFAULT '0',
  `FIRSTNAME` varchar(45) DEFAULT NULL,
  `LASTNAME` varchar(45) DEFAULT NULL,
  `PASSWORD` varchar(45) DEFAULT NULL,
  `GENDER` enum('F','M') DEFAULT NULL,
  `PHONENUMBER` varchar(45) DEFAULT NULL,
  `EMAIL` varchar(50) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `studentEmergencyContact`
--

CREATE TABLE `studentEmergencyContact` (
  `STUDENTID` int(8) NOT NULL DEFAULT '0',
  `CONTACTID` int(11) NOT NULL DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `studentHasRecord`
--

CREATE TABLE `studentHasRecord` (
  `STUDENTID` int(8) NOT NULL DEFAULT '0',
  `HEIGHT` decimal(5,2) DEFAULT NULL,
  `WEIGHT` decimal(5,2) DEFAULT NULL,
  `BLOODTYPE` enum('A','B','AB','O') DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `students`
--

CREATE TABLE `students` (
  `STUDENTID` int(8) NOT NULL DEFAULT '0',
  `USERNAME` varchar(200) DEFAULT NULL,
  `FIRSTNAME` varchar(45) DEFAULT NULL,
  `LASTNAME` varchar(45) DEFAULT NULL,
  `IMAGE` varchar(200) NOT NULL,
  `PASSWORD` varchar(30) DEFAULT NULL,
  `GENDER` enum('M','F') DEFAULT NULL,
  `EMAIL` varchar(50) DEFAULT NULL,
  `PHONENUMBER` varchar(10) DEFAULT NULL,
  `EMERGENCYCONTACTID` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `diseases`
--
ALTER TABLE `diseases`
  ADD PRIMARY KEY (`DISEASEID`);

--
-- Indexes for table `emergencyContact`
--
ALTER TABLE `emergencyContact`
  ADD PRIMARY KEY (`CONTACTID`);

--
-- Indexes for table `medicalComplaint`
--
ALTER TABLE `medicalComplaint`
  ADD PRIMARY KEY (`COMPLAINTID`),
  ADD UNIQUE KEY `STUDENTID` (`STUDENTID`);

--
-- Indexes for table `nurses`
--
ALTER TABLE `nurses`
  ADD PRIMARY KEY (`NURSEID`);

--
-- Indexes for table `studentEmergencyContact`
--
ALTER TABLE `studentEmergencyContact`
  ADD PRIMARY KEY (`STUDENTID`,`CONTACTID`);

--
-- Indexes for table `studentHasRecord`
--
ALTER TABLE `studentHasRecord`
  ADD PRIMARY KEY (`STUDENTID`);

--
-- Indexes for table `students`
--
ALTER TABLE `students`
  ADD PRIMARY KEY (`STUDENTID`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `medicalComplaint`
--
ALTER TABLE `medicalComplaint`
  MODIFY `COMPLAINTID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
