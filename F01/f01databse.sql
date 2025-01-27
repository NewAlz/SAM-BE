-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jan 27, 2025 at 01:44 PM
-- Server version: 10.4.28-MariaDB
-- PHP Version: 8.2.4

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `f01databse`
--

-- --------------------------------------------------------

--
-- Table structure for table `db_accounts`
--

CREATE TABLE `db_accounts` (
  `account_id` int(11) NOT NULL,
  `full_name` varchar(50) NOT NULL,
  `username` varchar(50) NOT NULL,
  `email` varchar(50) NOT NULL,
  `password` varchar(255) NOT NULL,
  `account_type` varchar(50) DEFAULT 'user'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `db_accounts`
--

INSERT INTO `db_accounts` (`account_id`, `full_name`, `username`, `email`, `password`, `account_type`) VALUES
(7, 'user', 'user', 'user@gmail.com', '$2y$10$at25rSn8YfPgZ1.IPqYQ5eWdQTU9ruo9/8kMwORupyeYHg7k//4l6', 'user'),
(9, '', 'admin', '', '$2y$10$kbN6bHAUknP15eXkYwpP0O/u1PbVVmkDfxUQMccxz7hwsUIYDYeVC', 'admin');

-- --------------------------------------------------------

--
-- Table structure for table `db_bball_seats`
--

CREATE TABLE `db_bball_seats` (
  `seats_id` int(11) NOT NULL,
  `seat_number` varchar(11) NOT NULL,
  `account_id` int(11) NOT NULL,
  `sport` varchar(50) NOT NULL,
  `timestamp` datetime DEFAULT NULL,
  `is_occupied` tinyint(1) NOT NULL DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `db_bball_seats`
--

INSERT INTO `db_bball_seats` (`seats_id`, `seat_number`, `account_id`, `sport`, `timestamp`, `is_occupied`) VALUES
(1, '1-1', 0, '', NULL, 0),
(2, '1-2', 0, '', NULL, 0),
(3, '1-3', 0, '', NULL, 0),
(4, '1-4', 0, '', NULL, 0),
(5, '1-5', 0, '', NULL, 0),
(6, '1-6', 0, '', NULL, 0),
(7, '1-7', 0, '', NULL, 0),
(8, '1-8', 0, '', NULL, 0),
(9, '1-9', 0, '', NULL, 0),
(10, '1-10', 0, '', NULL, 0),
(11, '2-1', 0, '', NULL, 0),
(12, '2-2', 0, '', NULL, 0),
(13, '2-3', 0, '', NULL, 0),
(14, '2-4', 0, '', NULL, 0),
(15, '2-5', 0, '', NULL, 0),
(16, '2-6', 0, '', NULL, 0),
(17, '2-7', 0, '', NULL, 0),
(18, '2-8', 0, '', NULL, 0),
(19, '2-9', 0, '', NULL, 0),
(20, '2-10', 0, '', NULL, 0),
(21, '3-1', 0, '', NULL, 0),
(22, '3-2', 0, '', NULL, 0),
(23, '3-3', 0, '', NULL, 0),
(24, '3-4', 0, '', NULL, 0),
(25, '3-5', 0, '', NULL, 0),
(26, '3-6', 0, '', NULL, 0),
(27, '3-7', 0, '', NULL, 0),
(28, '3-8', 0, '', NULL, 0),
(29, '3-9', 0, '', NULL, 0),
(30, '3-10', 0, '', NULL, 0),
(31, '4-1', 0, '', NULL, 0),
(32, '4-2', 0, '', NULL, 0),
(33, '4-3', 0, '', NULL, 0),
(34, '4-4', 0, '', NULL, 0),
(35, '4-5', 0, '', NULL, 0),
(36, '4-6', 0, '', NULL, 0),
(37, '4-7', 0, '', NULL, 0),
(38, '4-8', 0, '', NULL, 0),
(39, '4-9', 0, '', NULL, 0),
(40, '4-10', 0, '', NULL, 0),
(41, '5-1', 0, '', NULL, 0),
(42, '5-2', 0, '', NULL, 0),
(43, '5-3', 0, '', NULL, 0),
(44, '5-4', 0, '', NULL, 0),
(45, '5-5', 0, '', NULL, 0),
(46, '5-6', 0, '', NULL, 0),
(47, '5-7', 0, '', NULL, 0),
(48, '5-8', 0, '', NULL, 0),
(49, '5-9', 0, '', NULL, 0),
(50, '5-10', 0, '', NULL, 0),
(51, '1-2', 0, '', NULL, 0);

-- --------------------------------------------------------

--
-- Table structure for table `db_gym_seats`
--

CREATE TABLE `db_gym_seats` (
  `seats_id` int(11) NOT NULL,
  `seat_number` varchar(11) NOT NULL,
  `account_id` int(11) NOT NULL,
  `sport` varchar(50) NOT NULL,
  `timestamp` datetime DEFAULT NULL,
  `is_occupied` tinyint(1) NOT NULL DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `db_gym_seats`
--

INSERT INTO `db_gym_seats` (`seats_id`, `seat_number`, `account_id`, `sport`, `timestamp`, `is_occupied`) VALUES
(1, '1-1', 0, '', NULL, 0),
(2, '1-2', 0, '', NULL, 0),
(3, '1-3', 0, '', NULL, 0),
(4, '1-4', 0, '', NULL, 0),
(5, '1-5', 0, '', NULL, 0),
(6, '1-6', 0, '', NULL, 0),
(7, '1-7', 0, '', NULL, 0),
(8, '1-8', 0, '', NULL, 0),
(9, '1-9', 0, '', NULL, 0),
(10, '1-10', 0, '', NULL, 0),
(11, '2-1', 0, '', NULL, 0),
(12, '2-2', 0, '', NULL, 0),
(13, '2-3', 0, '', NULL, 0),
(14, '2-4', 0, '', NULL, 0),
(15, '2-5', 0, '', NULL, 0),
(16, '2-6', 0, '', NULL, 0),
(17, '2-7', 0, '', NULL, 0),
(18, '2-8', 0, '', NULL, 0),
(19, '2-9', 0, '', NULL, 0),
(20, '2-10', 0, '', NULL, 0),
(21, '3-1', 0, '', NULL, 0),
(22, '3-2', 0, '', NULL, 0),
(23, '3-3', 0, '', NULL, 0),
(24, '3-4', 0, '', NULL, 0),
(25, '3-5', 0, '', NULL, 0),
(26, '3-6', 0, '', NULL, 0),
(27, '3-7', 0, '', NULL, 0),
(28, '3-8', 0, '', NULL, 0),
(29, '3-9', 0, '', NULL, 0),
(30, '3-10', 0, '', NULL, 0),
(31, '4-1', 0, '', NULL, 0),
(32, '4-2', 0, '', NULL, 0),
(33, '4-3', 0, '', NULL, 0),
(34, '4-4', 0, '', NULL, 0),
(35, '4-5', 0, '', NULL, 0),
(36, '4-6', 0, '', NULL, 0),
(37, '4-7', 0, '', NULL, 0),
(38, '4-8', 0, '', NULL, 0),
(39, '4-9', 0, '', NULL, 0),
(40, '4-10', 0, '', NULL, 0),
(41, '5-1', 0, '', NULL, 0),
(42, '5-2', 0, '', NULL, 0),
(43, '5-3', 0, '', NULL, 0),
(44, '5-4', 0, '', NULL, 0),
(45, '5-5', 0, '', NULL, 0),
(46, '5-6', 0, '', NULL, 0),
(47, '5-7', 0, '', NULL, 0),
(48, '5-8', 0, '', NULL, 0),
(49, '5-9', 0, '', NULL, 0),
(50, '5-10', 0, '', NULL, 0);

-- --------------------------------------------------------

--
-- Table structure for table `db_swim_seats`
--

CREATE TABLE `db_swim_seats` (
  `seats_id` int(11) NOT NULL,
  `seat_number` varchar(11) NOT NULL,
  `account_id` int(11) NOT NULL,
  `sport` varchar(50) NOT NULL,
  `timestamp` datetime DEFAULT NULL,
  `is_occupied` tinyint(1) NOT NULL DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `db_swim_seats`
--

INSERT INTO `db_swim_seats` (`seats_id`, `seat_number`, `account_id`, `sport`, `timestamp`, `is_occupied`) VALUES
(1, '1-1', 0, '', NULL, 0),
(2, '1-2', 0, '', NULL, 0),
(3, '1-3', 0, '', NULL, 0),
(4, '1-4', 0, '', NULL, 0),
(5, '1-5', 0, '', NULL, 0),
(6, '1-6', 0, '', NULL, 0),
(7, '1-7', 0, '', NULL, 0),
(8, '1-8', 0, '', NULL, 0),
(9, '1-9', 0, '', NULL, 0),
(10, '1-10', 0, '', NULL, 0),
(11, '2-1', 0, '', NULL, 0),
(12, '2-2', 0, '', NULL, 0),
(13, '2-3', 0, '', NULL, 0),
(14, '2-4', 0, '', NULL, 0),
(15, '2-5', 0, '', NULL, 0),
(16, '2-6', 0, '', NULL, 0),
(17, '2-7', 0, '', NULL, 0),
(18, '2-8', 0, '', NULL, 0),
(19, '2-9', 0, '', NULL, 0),
(20, '2-10', 0, '', NULL, 0),
(21, '3-1', 0, '', NULL, 0),
(22, '3-2', 0, '', NULL, 0),
(23, '3-3', 0, '', NULL, 0),
(24, '3-4', 0, '', NULL, 0),
(25, '3-5', 0, '', NULL, 0),
(26, '3-6', 0, '', NULL, 0),
(27, '3-7', 0, '', NULL, 0),
(28, '3-8', 0, '', NULL, 0),
(29, '3-9', 0, '', NULL, 0),
(30, '3-10', 0, '', NULL, 0),
(31, '4-1', 0, '', NULL, 0),
(32, '4-2', 0, '', NULL, 0),
(33, '4-3', 0, '', NULL, 0),
(34, '4-4', 0, '', NULL, 0),
(35, '4-5', 0, '', NULL, 0),
(36, '4-6', 0, '', NULL, 0),
(37, '4-7', 0, '', NULL, 0),
(38, '4-8', 0, '', NULL, 0),
(39, '4-9', 0, '', NULL, 0),
(40, '4-10', 0, '', NULL, 0),
(41, '5-1', 0, '', NULL, 0),
(42, '5-2', 0, '', NULL, 0),
(43, '5-3', 0, '', NULL, 0),
(44, '5-4', 0, '', NULL, 0),
(45, '5-5', 0, '', NULL, 0),
(46, '5-6', 0, '', NULL, 0),
(47, '5-7', 0, '', NULL, 0),
(48, '5-8', 0, '', NULL, 0),
(49, '5-9', 0, '', NULL, 0),
(50, '5-10', 0, '', NULL, 0);

-- --------------------------------------------------------

--
-- Table structure for table `db_taf_seats`
--

CREATE TABLE `db_taf_seats` (
  `seats_id` int(11) NOT NULL,
  `seat_number` varchar(11) NOT NULL,
  `account_id` int(11) NOT NULL,
  `sport` varchar(50) NOT NULL,
  `timestamp` datetime DEFAULT NULL,
  `is_occupied` tinyint(1) NOT NULL DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `db_taf_seats`
--

INSERT INTO `db_taf_seats` (`seats_id`, `seat_number`, `account_id`, `sport`, `timestamp`, `is_occupied`) VALUES
(1, '1-1', 0, '', NULL, 0),
(2, '1-2', 0, '', NULL, 0),
(3, '1-3', 0, '', NULL, 0),
(4, '1-4', 0, '', NULL, 0),
(5, '1-5', 0, '', NULL, 0),
(6, '1-6', 0, '', NULL, 0),
(7, '1-7', 0, '', NULL, 0),
(8, '1-8', 0, '', NULL, 0),
(9, '1-9', 0, '', NULL, 0),
(10, '1-10', 0, '', NULL, 0),
(11, '2-1', 0, '', NULL, 0),
(12, '2-2', 0, '', NULL, 0),
(13, '2-3', 0, '', NULL, 0),
(14, '2-4', 0, '', NULL, 0),
(15, '2-5', 0, '', NULL, 0),
(16, '2-6', 0, '', NULL, 0),
(17, '2-7', 0, '', NULL, 0),
(18, '2-8', 0, '', NULL, 0),
(19, '2-9', 0, '', NULL, 0),
(20, '2-10', 0, '', NULL, 0),
(21, '3-1', 0, '', NULL, 0),
(22, '3-2', 0, '', NULL, 0),
(23, '3-3', 0, '', NULL, 0),
(24, '3-4', 0, '', NULL, 0),
(25, '3-5', 0, '', NULL, 0),
(26, '3-6', 0, '', NULL, 0),
(27, '3-7', 0, '', NULL, 0),
(28, '3-8', 0, '', NULL, 0),
(29, '3-9', 0, '', NULL, 0),
(30, '3-10', 0, '', NULL, 0),
(31, '4-1', 0, '', NULL, 0),
(32, '4-2', 0, '', NULL, 0),
(33, '4-3', 0, '', NULL, 0),
(34, '4-4', 0, '', NULL, 0),
(35, '4-5', 0, '', NULL, 0),
(36, '4-6', 0, '', NULL, 0),
(37, '4-7', 0, '', NULL, 0),
(38, '4-8', 0, '', NULL, 0),
(39, '4-9', 0, '', NULL, 0),
(40, '4-10', 0, '', NULL, 0),
(41, '5-1', 0, '', NULL, 0),
(42, '5-2', 0, '', NULL, 0),
(43, '5-3', 0, '', NULL, 0),
(44, '5-4', 0, '', NULL, 0),
(45, '5-5', 0, '', NULL, 0),
(46, '5-6', 0, '', NULL, 0),
(47, '5-7', 0, '', NULL, 0),
(48, '5-8', 0, '', NULL, 0),
(49, '5-9', 0, '', NULL, 0),
(50, '5-10', 0, '', NULL, 0);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `db_accounts`
--
ALTER TABLE `db_accounts`
  ADD PRIMARY KEY (`account_id`),
  ADD UNIQUE KEY `unique_email` (`email`);

--
-- Indexes for table `db_bball_seats`
--
ALTER TABLE `db_bball_seats`
  ADD PRIMARY KEY (`seats_id`),
  ADD KEY `account_tickets` (`account_id`);

--
-- Indexes for table `db_gym_seats`
--
ALTER TABLE `db_gym_seats`
  ADD PRIMARY KEY (`seats_id`),
  ADD KEY `account_tickets` (`account_id`);

--
-- Indexes for table `db_swim_seats`
--
ALTER TABLE `db_swim_seats`
  ADD PRIMARY KEY (`seats_id`),
  ADD KEY `account_tickets` (`account_id`);

--
-- Indexes for table `db_taf_seats`
--
ALTER TABLE `db_taf_seats`
  ADD PRIMARY KEY (`seats_id`),
  ADD KEY `account_tickets` (`account_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `db_accounts`
--
ALTER TABLE `db_accounts`
  MODIFY `account_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `db_bball_seats`
--
ALTER TABLE `db_bball_seats`
  MODIFY `seats_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=52;

--
-- AUTO_INCREMENT for table `db_gym_seats`
--
ALTER TABLE `db_gym_seats`
  MODIFY `seats_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=51;

--
-- AUTO_INCREMENT for table `db_swim_seats`
--
ALTER TABLE `db_swim_seats`
  MODIFY `seats_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=51;

--
-- AUTO_INCREMENT for table `db_taf_seats`
--
ALTER TABLE `db_taf_seats`
  MODIFY `seats_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=51;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
