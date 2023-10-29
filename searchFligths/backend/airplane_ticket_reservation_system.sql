-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Oct 24, 2023 at 11:28 PM
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
-- Database: `airplane_ticket_reservation_system`
--

-- --------------------------------------------------------

--
-- Table structure for table `admin_info`
--

CREATE TABLE `admin_info` (
  `admin_id` varchar(20) NOT NULL,
  `pass` varchar(20) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `booking_info`
--

CREATE TABLE `booking_info` (
  `booking_id` int(10) NOT NULL,
  `flight_id` varchar(15) DEFAULT NULL,
  `passenger_id` int(10) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `feedback`
--

CREATE TABLE `feedback` (
  `rating` int(1) DEFAULT NULL,
  `comments` text DEFAULT NULL,
  `submission_date` datetime DEFAULT NULL,
  `feedback_id` int(10) NOT NULL,
  `passenger_id` int(10) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `flight_info`
--

CREATE TABLE `flight_info` (
  `flight_id` varchar(16) NOT NULL,
  `origin` varchar(10) DEFAULT NULL,
  `destination` varchar(10) DEFAULT NULL,
  `departure_time` datetime DEFAULT NULL,
  `airline_name` varchar(16) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `passenger_info`
--

CREATE TABLE `passenger_info` (
  `first_name` varchar(20) DEFAULT NULL,
  `last_name` varchar(20) DEFAULT NULL,
  `age` int(2) DEFAULT NULL,
  `contact_number` varchar(11) DEFAULT NULL,
  `address` varchar(25) DEFAULT NULL,
  `email` varchar(20) DEFAULT NULL,
  `passenger_id` int(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `payment_info`
--

CREATE TABLE `payment_info` (
  `payment_id` int(10) NOT NULL,
  `ticket_price` int(6) DEFAULT NULL,
  `vat` int(6) DEFAULT NULL,
  `total` int(6) DEFAULT NULL,
  `passenger_id` int(10) DEFAULT NULL,
  `seat_id` varchar(16) DEFAULT NULL,
  `booking_id` int(10) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `reservations`
--

CREATE TABLE `reservations` (
  `flight_id` varchar(20) NOT NULL,
  `seat_id` varchar(16) NOT NULL,
  `booking_id` bigint(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `reservations`
--

INSERT INTO `reservations` (`flight_id`, `seat_id`, `booking_id`) VALUES
('CX881', '2B', 555),
('CX881', '4A', 888),
('EK201', '3B', 656),
('EK201', '4A', 778),
('EK201', '6C', 999);

-- --------------------------------------------------------

--
-- Table structure for table `seats`
--

CREATE TABLE `seats` (
  `seat_id` varchar(16) NOT NULL,
  `flight_id` varchar(16) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `seats`
--

INSERT INTO `seats` (`seat_id`, `flight_id`) VALUES
('1A', 'CX881'),
('1A', 'EK201'),
('1B', 'CX881'),
('1B', 'EK201'),
('1C', 'CX881'),
('1C', 'EK201'),
('1D', 'CX881'),
('1D', 'EK201'),
('1E', 'CX881'),
('1E', 'EK201'),
('1F', 'CX881'),
('1F', 'EK201'),
('2A', 'CX881'),
('2A', 'EK201'),
('2B', 'CX881'),
('2B', 'EK201'),
('2C', 'CX881'),
('2C', 'EK201'),
('2D', 'CX881'),
('2D', 'EK201'),
('2E', 'CX881'),
('2E', 'EK201'),
('2F', 'CX881'),
('2F', 'EK201'),
('3A', 'CX881'),
('3A', 'EK201'),
('3B', 'CX881'),
('3B', 'EK201'),
('3C', 'CX881'),
('3C', 'EK201'),
('3D', 'CX881'),
('3D', 'EK201'),
('3E', 'CX881'),
('3E', 'EK201'),
('3F', 'CX881'),
('3F', 'EK201'),
('4A', 'CX881'),
('4A', 'EK201'),
('4B', 'CX881'),
('4B', 'EK201'),
('4C', 'CX881'),
('4C', 'EK201'),
('4D', 'CX881'),
('4D', 'EK201'),
('4E', 'CX881'),
('4E', 'EK201'),
('4F', 'CX881'),
('4F', 'EK201'),
('5A', 'CX881'),
('5A', 'EK201'),
('5B', 'CX881'),
('5B', 'EK201'),
('5C', 'CX881'),
('5C', 'EK201'),
('5D', 'CX881'),
('5D', 'EK201'),
('5E', 'CX881'),
('5E', 'EK201'),
('5F', 'CX881'),
('5F', 'EK201'),
('6A', 'CX881'),
('6A', 'EK201'),
('6B', 'CX881'),
('6B', 'EK201'),
('6C', 'CX881'),
('6C', 'EK201'),
('6D', 'CX881'),
('6D', 'EK201'),
('6E', 'CX881'),
('6E', 'EK201'),
('6F', 'CX881'),
('6F', 'EK201');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admin_info`
--
ALTER TABLE `admin_info`
  ADD PRIMARY KEY (`admin_id`);

--
-- Indexes for table `booking_info`
--
ALTER TABLE `booking_info`
  ADD PRIMARY KEY (`booking_id`),
  ADD KEY `flight_id` (`flight_id`),
  ADD KEY `passenger_id` (`passenger_id`);

--
-- Indexes for table `feedback`
--
ALTER TABLE `feedback`
  ADD PRIMARY KEY (`feedback_id`),
  ADD KEY `passenger_id` (`passenger_id`);

--
-- Indexes for table `flight_info`
--
ALTER TABLE `flight_info`
  ADD PRIMARY KEY (`flight_id`);

--
-- Indexes for table `passenger_info`
--
ALTER TABLE `passenger_info`
  ADD PRIMARY KEY (`passenger_id`);

--
-- Indexes for table `payment_info`
--
ALTER TABLE `payment_info`
  ADD PRIMARY KEY (`payment_id`),
  ADD KEY `passenger_id` (`passenger_id`),
  ADD KEY `seat_id` (`seat_id`),
  ADD KEY `booking_id` (`booking_id`);

--
-- Indexes for table `reservations`
--
ALTER TABLE `reservations`
  ADD PRIMARY KEY (`flight_id`,`seat_id`,`booking_id`);

--
-- Indexes for table `seats`
--
ALTER TABLE `seats`
  ADD PRIMARY KEY (`seat_id`,`flight_id`);

--
-- Constraints for dumped tables
--

--
-- Constraints for table `booking_info`
--
ALTER TABLE `booking_info`
  ADD CONSTRAINT `booking_info_ibfk_1` FOREIGN KEY (`flight_id`) REFERENCES `flight_info` (`flight_id`),
  ADD CONSTRAINT `booking_info_ibfk_2` FOREIGN KEY (`passenger_id`) REFERENCES `passenger_info` (`passenger_id`);

--
-- Constraints for table `feedback`
--
ALTER TABLE `feedback`
  ADD CONSTRAINT `feedback_ibfk_1` FOREIGN KEY (`passenger_id`) REFERENCES `passenger_info` (`passenger_id`);

--
-- Constraints for table `payment_info`
--
ALTER TABLE `payment_info`
  ADD CONSTRAINT `payment_info_ibfk_1` FOREIGN KEY (`passenger_id`) REFERENCES `passenger_info` (`passenger_id`),
  ADD CONSTRAINT `payment_info_ibfk_2` FOREIGN KEY (`seat_id`) REFERENCES `seats` (`seat_id`),
  ADD CONSTRAINT `payment_info_ibfk_3` FOREIGN KEY (`booking_id`) REFERENCES `booking_info` (`booking_id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
