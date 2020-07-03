-- phpMyAdmin SQL Dump
-- version 4.6.5.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: May 06, 2020 at 02:45 AM
-- Server version: 10.1.21-MariaDB
-- PHP Version: 5.6.30

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `servicedb`
--
CREATE DATABASE IF NOT EXISTS `servicedb` DEFAULT CHARACTER SET latin1 COLLATE latin1_swedish_ci;
USE `servicedb`;

-- --------------------------------------------------------

--
-- Table structure for table `service_request`
--

CREATE TABLE `service_request` (
  `request_no` int(11) NOT NULL,
  `Consumer_emailid` varchar(200) NOT NULL,
  `Provider_emailid` varchar(200) NOT NULL,
  `Service_id` int(11) NOT NULL,
  `Fdate` date NOT NULL,
  `Tdate` date NOT NULL,
  `Request_date` date NOT NULL,
  `Request_time` time NOT NULL,
  `Status` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `service_table`
--

CREATE TABLE `service_table` (
  `Provider_emailid` varchar(100) NOT NULL,
  `Service_Id` int(11) NOT NULL,
  `Service_Name` varchar(200) NOT NULL,
  `provider_name` varchar(200) NOT NULL,
  `Specification` varchar(200) NOT NULL,
  `Built_date` date NOT NULL,
  `country` varchar(100) NOT NULL,
  `state` varchar(100) NOT NULL,
  `city` varchar(100) NOT NULL,
  `address` varchar(1000) NOT NULL,
  `pincode` varchar(10) NOT NULL,
  `pic1` varchar(100) NOT NULL,
  `pic2` varchar(100) NOT NULL,
  `pic3` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `user_table`
--

CREATE TABLE `user_table` (
  `First_Name` varchar(100) NOT NULL,
  `Middle_Name` varchar(100) NOT NULL,
  `Last_Name` varchar(100) NOT NULL,
  `Gender` varchar(20) NOT NULL,
  `Birth_date` date NOT NULL,
  `Mobile_No` varchar(20) NOT NULL,
  `LL_No` varchar(20) NOT NULL,
  `Country` varchar(100) NOT NULL,
  `State` varchar(100) NOT NULL,
  `City` varchar(100) NOT NULL,
  `Address` varchar(1000) NOT NULL,
  `Pincode` varchar(10) NOT NULL,
  `Question` varchar(200) NOT NULL,
  `Answer` varchar(100) NOT NULL,
  `Photo` varchar(50) NOT NULL,
  `Email_id` varchar(100) NOT NULL,
  `Password` varchar(50) NOT NULL,
  `Register_As` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `service_request`
--
ALTER TABLE `service_request`
  ADD PRIMARY KEY (`Consumer_emailid`,`Provider_emailid`,`Service_id`,`Request_date`),
  ADD UNIQUE KEY `Consumer_emailid` (`Consumer_emailid`,`Provider_emailid`,`Service_id`,`Fdate`,`Tdate`,`Request_date`,`Request_time`,`Status`),
  ADD UNIQUE KEY `request_no` (`request_no`),
  ADD KEY `Consumer_emailid_2` (`Consumer_emailid`,`Provider_emailid`,`Service_id`,`Fdate`,`Tdate`,`Request_date`,`Request_time`,`Status`);

--
-- Indexes for table `service_table`
--
ALTER TABLE `service_table`
  ADD PRIMARY KEY (`Provider_emailid`,`Service_Id`);

--
-- Indexes for table `user_table`
--
ALTER TABLE `user_table`
  ADD PRIMARY KEY (`Email_id`),
  ADD UNIQUE KEY `Mobile_No` (`Mobile_No`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `service_request`
--
ALTER TABLE `service_request`
  MODIFY `request_no` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
