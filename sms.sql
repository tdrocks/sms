-- phpMyAdmin SQL Dump
-- version 4.6.4
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Dec 02, 2018 at 11:51 AM
-- Server version: 5.7.14
-- PHP Version: 5.6.25

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `sms`
--

-- --------------------------------------------------------

--
-- Table structure for table `admin`
--

CREATE TABLE `admin` (
  `admin_id` varchar(20) NOT NULL,
  `admin_name` varchar(25) DEFAULT NULL,
  `admin_email` varchar(50) DEFAULT NULL,
  `admin_pass` varchar(20) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `admin`
--

INSERT INTO `admin` (`admin_id`, `admin_name`, `admin_email`, `admin_pass`) VALUES
('1cr15cs047', 'Tarun Daga', 'data15cs@cmrit.ac.in', 'admin');

-- --------------------------------------------------------

--
-- Table structure for table `applicant`
--

CREATE TABLE `applicant` (
  `user_id` varchar(10) NOT NULL,
  `scholarship_id` int(11) NOT NULL,
  `current_cgpa` float DEFAULT NULL,
  `app_date` timestamp NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `applicant`
--

INSERT INTO `applicant` (`user_id`, `scholarship_id`, `current_cgpa`, `app_date`) VALUES
('1cr15cs001', 123, 7.52, '2018-11-26 16:52:03'),
('1cr15cs047', 1, 8.25, '2018-12-01 15:52:52'),
('1cr15cs047', 2, 8.25, '2018-12-01 15:51:06'),
('1cr15cs047', 3, 8.25, '2018-12-01 16:07:46'),
('1cr15cs047', 123, 8.25, '2018-11-26 16:52:03');

-- --------------------------------------------------------

--
-- Table structure for table `scholarship`
--

CREATE TABLE `scholarship` (
  `Sch_id` int(11) NOT NULL,
  `Sch_name` varchar(25) DEFAULT NULL,
  `Sch_year_eligibility` int(11) DEFAULT NULL,
  `Sch_AdminUnit` varchar(10) DEFAULT NULL,
  `Sch_Donor` varchar(20) DEFAULT NULL,
  `Sch_DonorEmail` varchar(50) DEFAULT NULL,
  `Sch_Amount` int(11) DEFAULT NULL,
  `active` int(11) DEFAULT NULL,
  `sch_time` timestamp NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `scholarship`
--

INSERT INTO `scholarship` (`Sch_id`, `Sch_name`, `Sch_year_eligibility`, `Sch_AdminUnit`, `Sch_Donor`, `Sch_DonorEmail`, `Sch_Amount`, `active`, `sch_time`) VALUES
(1, 'Leadership Award', 4, '1cr15cs047', 'CMRU', 'cmru@gmail.com', 10000, 1, '2018-12-01 13:14:16'),
(2, 'Genius', 2, '1cr15cs047', 'CMRIT', 'cmru@gmail.com', 5000, 1, '2018-12-01 15:30:54'),
(3, 'ABC', 3, '1cr15cs047', 'CMRIT', 'cmru@gmail.com', 6000, 1, '2018-12-01 16:07:38'),
(123, 'Huawei', 4, '1cr15cs047', 'Huawei', 'abc@gmail.com', 50000, 0, '2018-11-25 19:01:35');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `Id` varchar(10) NOT NULL,
  `password` varchar(20) NOT NULL,
  `Curr_Year` int(11) DEFAULT NULL,
  `First_Name` varchar(15) DEFAULT NULL,
  `Last_Name` varchar(15) DEFAULT NULL,
  `App_Gender` char(1) DEFAULT NULL,
  `App_Email` varchar(30) DEFAULT NULL,
  `App_Address` varchar(50) DEFAULT NULL,
  `App_City` varchar(10) DEFAULT NULL,
  `App_State` varchar(10) DEFAULT NULL,
  `App_zipcode` varchar(6) DEFAULT NULL,
  `Curr_cgpa` float DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`Id`, `password`, `Curr_Year`, `First_Name`, `Last_Name`, `App_Gender`, `App_Email`, `App_Address`, `App_City`, `App_State`, `App_zipcode`, `Curr_cgpa`) VALUES
('1cr15cs001', 'abcd', 3, 'abc', 'ajsda', 'F', 'askdjadskasdk', 'ajsfasfajsfhalsfh', 'bangalore', 'karnataka', '560066', 7.25),
('1cr15cs047', 'tdrocks', 4, 'Tarun', 'Daga', 'M', 'tarundaga@ymail.com', 'AECS', 'Bangalore', 'Karnataka', '560066', 8.25);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admin`
--
ALTER TABLE `admin`
  ADD PRIMARY KEY (`admin_id`);

--
-- Indexes for table `applicant`
--
ALTER TABLE `applicant`
  ADD PRIMARY KEY (`user_id`,`scholarship_id`),
  ADD KEY `scholarship_id` (`scholarship_id`);

--
-- Indexes for table `scholarship`
--
ALTER TABLE `scholarship`
  ADD PRIMARY KEY (`Sch_id`),
  ADD KEY `Sch_AdminUnit` (`Sch_AdminUnit`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`Id`);

--
-- Constraints for dumped tables
--

--
-- Constraints for table `applicant`
--
ALTER TABLE `applicant`
  ADD CONSTRAINT `applicant_ibfk_1` FOREIGN KEY (`user_id`) REFERENCES `users` (`Id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `applicant_ibfk_2` FOREIGN KEY (`scholarship_id`) REFERENCES `scholarship` (`Sch_id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `scholarship`
--
ALTER TABLE `scholarship`
  ADD CONSTRAINT `scholarship_ibfk_1` FOREIGN KEY (`Sch_AdminUnit`) REFERENCES `admin` (`admin_id`) ON DELETE NO ACTION ON UPDATE NO ACTION;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
