-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: localhost
-- Generation Time: Oct 10, 2022 at 06:20 AM
-- Server version: 10.4.21-MariaDB
-- PHP Version: 8.1.6

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `Assignment1`
--

-- --------------------------------------------------------

--
-- Table structure for table `Administrator`
--

CREATE TABLE `Administrator` (
  `employmentID` int(11) NOT NULL,
  `personID` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `Administrator`
--

INSERT INTO `Administrator` (`employmentID`, `personID`) VALUES
(1, 3),
(2, 4);

-- --------------------------------------------------------

--
-- Table structure for table `Course`
--

CREATE TABLE `Course` (
  `courseCode` varchar(30) NOT NULL,
  `title` text NOT NULL,
  `semester` text NOT NULL,
  `days` text NOT NULL,
  `time` text NOT NULL,
  `instructor` text NOT NULL,
  `room` text NOT NULL,
  `starDate` date NOT NULL,
  `endDate` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `Person`
--

CREATE TABLE `Person` (
  `personID` int(11) NOT NULL,
  `firstName` text NOT NULL,
  `lastName` text NOT NULL,
  `address` text NOT NULL,
  `email` text NOT NULL,
  `phoneNumber` text NOT NULL,
  `dateOfBirth` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `Person`
--

INSERT INTO `Person` (`personID`, `firstName`, `lastName`, `address`, `email`, `phoneNumber`, `dateOfBirth`) VALUES
(3, 'Christian', 'Jerjian', '1969 charles gill', 'christianjerjian@gmail.com', '1111111111', '2022-09-27'),
(4, 'Christian', 'Jerjian', '1969 charles gill', 'christianjerjian@gmail.com', '1111111111', '2022-09-27'),
(5, 'Christian', 'Jerjian', '1969 charles gill', 'christianjerjian@gmail.co', '1111111111', '2022-09-27'),
(6, 'Christian', 'Jerjian', '1969 charles gill', 'christianjerjian@gmail.co', '1111111111', '2022-09-27'),
(7, 'Christian', 'Jerjian', '1969 charles gill', 'christianjerjian@gmail.co', '1111111111', '2022-09-27'),
(8, 'Christian', 'Jerjian', '1969 charles gill', 'christianjerjian@gmail.com', '1111111111', '2022-09-26'),
(9, 'Christian', 'Jerjian', '1969 charles gill', 'christianjerjian@gmail.com', '1111111111', '2022-09-26'),
(10, 'Christian', 'Jerjian', '1969 charles gill', 'christianjerjian@gmail.com', '1111111111', '2022-09-27'),
(11, 'Christian', 'Jerjian', '1969 charles gill', 'christianjerjian@gmail.com', '1111111111', '2022-09-27'),
(12, 'Christian', 'Jerjian', '1969 charles gill', 'christianjerjian@gmail.com', '1111111111', '2022-09-27');

-- --------------------------------------------------------

--
-- Table structure for table `Registered`
--

CREATE TABLE `Registered` (
  `registerID` int(11) NOT NULL,
  `studentID` int(11) NOT NULL,
  `courseCode` varchar(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `Student`
--

CREATE TABLE `Student` (
  `studentID` int(11) NOT NULL,
  `personID` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `Administrator`
--
ALTER TABLE `Administrator`
  ADD PRIMARY KEY (`employmentID`),
  ADD KEY `personID` (`personID`);

--
-- Indexes for table `Course`
--
ALTER TABLE `Course`
  ADD PRIMARY KEY (`courseCode`);

--
-- Indexes for table `Person`
--
ALTER TABLE `Person`
  ADD PRIMARY KEY (`personID`);

--
-- Indexes for table `Registered`
--
ALTER TABLE `Registered`
  ADD PRIMARY KEY (`registerID`),
  ADD KEY `studentID` (`studentID`),
  ADD KEY `courseCode` (`courseCode`);

--
-- Indexes for table `Student`
--
ALTER TABLE `Student`
  ADD PRIMARY KEY (`studentID`),
  ADD KEY `personID` (`personID`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `Administrator`
--
ALTER TABLE `Administrator`
  MODIFY `employmentID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `Person`
--
ALTER TABLE `Person`
  MODIFY `personID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT for table `Registered`
--
ALTER TABLE `Registered`
  MODIFY `registerID` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `Student`
--
ALTER TABLE `Student`
  MODIFY `studentID` int(11) NOT NULL AUTO_INCREMENT;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `Administrator`
--
ALTER TABLE `Administrator`
  ADD CONSTRAINT `administrator_ibfk_1` FOREIGN KEY (`personID`) REFERENCES `Person` (`personID`);

--
-- Constraints for table `Registered`
--
ALTER TABLE `Registered`
  ADD CONSTRAINT `courseCode` FOREIGN KEY (`courseCode`) REFERENCES `Course` (`courseCode`);

--
-- Constraints for table `Student`
--
ALTER TABLE `Student`
  ADD CONSTRAINT `student_ibfk_1` FOREIGN KEY (`personID`) REFERENCES `Person` (`personID`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
