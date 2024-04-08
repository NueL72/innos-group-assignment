-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: localhost
-- Generation Time: Jan 19, 2024 at 10:12 PM
-- Server version: 10.4.32-MariaDB
-- PHP Version: 8.2.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `community`
--

-- --------------------------------------------------------

--
-- Table structure for table `Citizens`
--

CREATE TABLE `Citizens` (
  `ID` int(11) NOT NULL,
  `username` varchar(100) NOT NULL,
  `phone` varchar(30) NOT NULL,
  `email` varchar(100) NOT NULL,
  `password` varchar(100) NOT NULL,
  `District` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `Citizens`
--

INSERT INTO `Citizens` (`ID`, `username`, `phone`, `email`, `password`, `District`) VALUES
(23, 'enos', '693-159-003', 'enos@gmail.com', '1234', 'ilala'),
(24, 'emma', '693-159-003', 'emma@gmail.com', '1234', 'kinondoni'),
(25, 'juma', '752-910-944', 'juma@gmail.com', '1234', 'ggg'),
(26, 'juma', '752-910-944', 'juma@gmail.com', '1234', 'ggg'),
(27, 'juma', '752-910-944', 'juma@gmail.com', '1234', 'ggg'),
(28, 'fhfhj', '693-159-003', 'jjjgvg@gvh.com', '1234', 'vfjuyjthg');

-- --------------------------------------------------------

--
-- Table structure for table `login`
--

CREATE TABLE `login` (
  `ID` int(11) NOT NULL,
  `username` varchar(100) NOT NULL,
  `password` varchar(100) NOT NULL,
  `role` varchar(30) NOT NULL DEFAULT 'citizen'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `login`
--

INSERT INTO `login` (`ID`, `username`, `password`, `role`) VALUES
(11, 'enos', '1234', 'citizen'),
(12, 'emma', '1234', 'citizen'),
(13, 'tailo', '1234', 'health'),
(14, 'juma', '1234', 'citizen'),
(15, 'juma', '1234', 'citizen'),
(16, 'juma', '1234', 'citizen'),
(17, 'fhfhj', '1234', 'citizen');

-- --------------------------------------------------------

--
-- Table structure for table `messages`
--

CREATE TABLE `messages` (
  `ID` int(11) NOT NULL,
  `Title` varchar(200) NOT NULL,
  `description` varchar(100) NOT NULL,
  `content` varchar(300) NOT NULL,
  `created_at` datetime NOT NULL,
  `Citizen_Id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `reply`
--

CREATE TABLE `reply` (
  `ID` int(11) NOT NULL,
  `description` varchar(300) NOT NULL,
  `content` varchar(300) NOT NULL,
  `reply` varchar(300) NOT NULL,
  `Title` varchar(300) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `Representatives`
--

CREATE TABLE `Representatives` (
  `ID` int(11) NOT NULL,
  `username` varchar(100) NOT NULL,
  `email` varchar(100) NOT NULL,
  `password` varchar(100) NOT NULL,
  `phone` varchar(30) NOT NULL,
  `category` varchar(30) NOT NULL,
  `Department` varchar(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `Representatives`
--

INSERT INTO `Representatives` (`ID`, `username`, `email`, `password`, `phone`, `category`, `Department`) VALUES
(4, 'tailo', 'tailo@gmail.com', '1234', '752-910-944', 'DC', 'health');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `Citizens`
--
ALTER TABLE `Citizens`
  ADD PRIMARY KEY (`ID`);

--
-- Indexes for table `login`
--
ALTER TABLE `login`
  ADD PRIMARY KEY (`ID`);

--
-- Indexes for table `messages`
--
ALTER TABLE `messages`
  ADD PRIMARY KEY (`ID`),
  ADD KEY `Citizen_Id` (`Citizen_Id`);

--
-- Indexes for table `reply`
--
ALTER TABLE `reply`
  ADD PRIMARY KEY (`ID`);

--
-- Indexes for table `Representatives`
--
ALTER TABLE `Representatives`
  ADD PRIMARY KEY (`ID`),
  ADD KEY `Department` (`Department`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `Citizens`
--
ALTER TABLE `Citizens`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=29;

--
-- AUTO_INCREMENT for table `login`
--
ALTER TABLE `login`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=18;

--
-- AUTO_INCREMENT for table `messages`
--
ALTER TABLE `messages`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=24;

--
-- AUTO_INCREMENT for table `reply`
--
ALTER TABLE `reply`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `Representatives`
--
ALTER TABLE `Representatives`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `messages`
--
ALTER TABLE `messages`
  ADD CONSTRAINT `messages_ibfk_1` FOREIGN KEY (`Citizen_Id`) REFERENCES `Citizens` (`ID`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
