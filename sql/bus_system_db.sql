-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jun 26, 2024 at 02:22 PM
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
-- Database: `bus_system_db`
--

-- --------------------------------------------------------

--
-- Table structure for table `admin_tbl`
--

CREATE TABLE `admin_tbl` (
  `admin_id` int(11) NOT NULL,
  `parent_id` int(11) NOT NULL,
  `learner_id` int(11) NOT NULL,
  `admin_initials` varchar(20) NOT NULL,
  `admin_surname` int(100) NOT NULL,
  `admin_email` varchar(100) NOT NULL,
  `admin_passcode` int(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `bus_system_tbl`
--

CREATE TABLE `bus_system_tbl` (
  `application_no` int(11) NOT NULL,
  `learner_id` int(11) NOT NULL,
  `parent_id` int(11) NOT NULL,
  `application_status` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `bus_tbl`
--

CREATE TABLE `bus_tbl` (
  `bus_id` int(11) NOT NULL,
  `admin_id` int(11) NOT NULL,
  `route_id` int(11) NOT NULL,
  `bus_space_status` varchar(20) NOT NULL,
  `bus_time` time NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `bus_tbl`
--

INSERT INTO `bus_tbl` (`bus_id`, `admin_id`, `route_id`, `bus_space_status`, `bus_time`) VALUES
(0, 0, 0, '', '06:22:00');

-- --------------------------------------------------------

--
-- Table structure for table `dropoff_tbl`
--

CREATE TABLE `dropoff_tbl` (
  `dropOff_no` int(11) NOT NULL,
  `dropOff_name` varchar(100) NOT NULL,
  `dropOff_time` time NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `dropoff_tbl`
--

INSERT INTO `dropoff_tbl` (`dropOff_no`, `dropOff_name`, `dropOff_time`) VALUES
(1, 'Corner of Panorama and Marabou Road', '14:30:00');

-- --------------------------------------------------------

--
-- Table structure for table `learner_tbl`
--

CREATE TABLE `learner_tbl` (
  `learner_id` int(11) NOT NULL,
  `bus_id` int(11) NOT NULL,
  `admin_id` int(11) NOT NULL,
  `learner_name` varchar(100) NOT NULL,
  `learner_surname` varchar(100) NOT NULL,
  `learner_email` varchar(100) NOT NULL,
  `learner_cell_no` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `parent_tbl`
--

CREATE TABLE `parent_tbl` (
  `parent_id` int(11) NOT NULL,
  `parent_name` varchar(100) NOT NULL,
  `parent_surname` varchar(100) NOT NULL,
  `parent_cell_no` int(20) NOT NULL,
  `parent_email` varchar(100) NOT NULL,
  `parent_passcode` int(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `pickup_btl`
--

CREATE TABLE `pickup_btl` (
  `pickUp_no` int(11) NOT NULL,
  `pickUp_name` varchar(100) NOT NULL,
  `pickUp_time` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `pickup_btl`
--

INSERT INTO `pickup_btl` (`pickUp_no`, `pickUp_name`, `pickUp_time`) VALUES
(0, 'Corner of Panorama and Marabou Road', 62200);

-- --------------------------------------------------------

--
-- Table structure for table `routes_tbl`
--

CREATE TABLE `routes_tbl` (
  `route_id` int(11) NOT NULL,
  `pickUp_no` varchar(11) NOT NULL,
  `dropOff_no` varchar(11) NOT NULL,
  `route_name` varchar(100) NOT NULL,
  `route_destination` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `routes_tbl`
--

INSERT INTO `routes_tbl` (`route_id`, `pickUp_no`, `dropOff_no`, `route_name`, `route_destination`) VALUES
(1, '1A', '1A', ' Rooihuiskraal', 'Corner of Panorama and Marabou Road');

-- --------------------------------------------------------

--
-- Table structure for table `waiting_list_tbl`
--

CREATE TABLE `waiting_list_tbl` (
  `waiting_list_no` int(11) NOT NULL,
  `admin_id` int(11) NOT NULL,
  `learner_id` int(11) NOT NULL,
  `learner_names` varchar(100) NOT NULL,
  `learner_contacts` int(100) NOT NULL,
  `waiting_list_name` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admin_tbl`
--
ALTER TABLE `admin_tbl`
  ADD PRIMARY KEY (`admin_id`);

--
-- Indexes for table `bus_system_tbl`
--
ALTER TABLE `bus_system_tbl`
  ADD PRIMARY KEY (`application_no`);

--
-- Indexes for table `bus_tbl`
--
ALTER TABLE `bus_tbl`
  ADD PRIMARY KEY (`bus_id`);

--
-- Indexes for table `dropoff_tbl`
--
ALTER TABLE `dropoff_tbl`
  ADD PRIMARY KEY (`dropOff_no`);

--
-- Indexes for table `learner_tbl`
--
ALTER TABLE `learner_tbl`
  ADD PRIMARY KEY (`learner_id`);

--
-- Indexes for table `parent_tbl`
--
ALTER TABLE `parent_tbl`
  ADD PRIMARY KEY (`parent_id`);

--
-- Indexes for table `pickup_btl`
--
ALTER TABLE `pickup_btl`
  ADD PRIMARY KEY (`pickUp_no`);

--
-- Indexes for table `routes_tbl`
--
ALTER TABLE `routes_tbl`
  ADD PRIMARY KEY (`route_id`);

--
-- Indexes for table `waiting_list_tbl`
--
ALTER TABLE `waiting_list_tbl`
  ADD PRIMARY KEY (`waiting_list_no`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `bus_system_tbl`
--
ALTER TABLE `bus_system_tbl`
  MODIFY `application_no` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `dropoff_tbl`
--
ALTER TABLE `dropoff_tbl`
  MODIFY `dropOff_no` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `routes_tbl`
--
ALTER TABLE `routes_tbl`
  MODIFY `route_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `waiting_list_tbl`
--
ALTER TABLE `waiting_list_tbl`
  MODIFY `waiting_list_no` int(11) NOT NULL AUTO_INCREMENT;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
