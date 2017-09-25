-- phpMyAdmin SQL Dump
-- version 4.5.2
-- http://www.phpmyadmin.net
--
-- Host: localhost
-- Generation Time: Sep 25, 2017 at 06:10 PM
-- Server version: 10.1.13-MariaDB
-- PHP Version: 7.0.8

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `smart_keja`
--

-- --------------------------------------------------------

--
-- Table structure for table `agents`
--

CREATE TABLE `agents` (
  `id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `name` varchar(128) NOT NULL,
  `email` varchar(128) NOT NULL,
  `phone_number` varchar(13) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `houses`
--

CREATE TABLE `houses` (
  `id` int(11) NOT NULL,
  `owned_by` int(11) NOT NULL,
  `house_category` enum('1_BEDROOM','2_BEDROOM','3_BEDROOM','BEDSEATER','SINGLE_ROOM','DOUBLE_ROOM') NOT NULL,
  `location` varchar(255) NOT NULL,
  `min_price` float NOT NULL,
  `max_price` float NOT NULL,
  `image1` varchar(128) DEFAULT NULL,
  `image2` varchar(128) DEFAULT NULL,
  `image3` varchar(128) DEFAULT NULL,
  `image4` varchar(128) DEFAULT NULL,
  `image5` varchar(128) DEFAULT NULL,
  `status` enum('booked','available') NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `houses`
--

INSERT INTO `houses` (`id`, `owned_by`, `house_category`, `location`, `min_price`, `max_price`, `image1`, `image2`, `image3`, `image4`, `image5`, `status`) VALUES
(7, 1, '1_BEDROOM', 'NGONG', 2000, 8000, NULL, NULL, NULL, NULL, NULL, 'available'),
(8, 2, '1_BEDROOM', 'NGONG', 2000, 8000, NULL, NULL, NULL, NULL, NULL, 'available'),
(9, 3, '1_BEDROOM', 'NGONG', 2000, 8000, NULL, NULL, NULL, NULL, NULL, 'available'),
(10, 4, '1_BEDROOM', 'NGONG', 2000, 8000, NULL, NULL, NULL, NULL, NULL, 'available'),
(11, 0, '1_BEDROOM', 'NGONG', 2000, 8000, NULL, NULL, NULL, NULL, NULL, 'available'),
(12, 1, '1_BEDROOM', 'NGONG', 2000, 8000, NULL, NULL, NULL, NULL, NULL, 'available'),
(13, 2, '1_BEDROOM', 'NGONG', 2000, 8000, NULL, NULL, NULL, NULL, NULL, 'available'),
(14, 3, '1_BEDROOM', 'NGONG', 2000, 8000, NULL, NULL, NULL, NULL, NULL, 'available'),
(15, 4, '1_BEDROOM', 'NGONG', 2000, 8000, NULL, NULL, NULL, NULL, NULL, 'available'),
(16, 0, '1_BEDROOM', 'NGONG', 2000, 8000, NULL, NULL, NULL, NULL, NULL, 'available'),
(17, 1, '1_BEDROOM', 'NGONG', 2000, 8000, NULL, NULL, NULL, NULL, NULL, 'available'),
(18, 2, '1_BEDROOM', 'NGONG', 2000, 8000, NULL, NULL, NULL, NULL, NULL, 'available'),
(19, 3, '1_BEDROOM', 'NGONG', 2000, 8000, NULL, NULL, NULL, NULL, NULL, 'available'),
(20, 4, '1_BEDROOM', 'NGONG', 2000, 8000, NULL, NULL, NULL, NULL, NULL, 'available'),
(21, 0, '1_BEDROOM', 'NGONG', 2000, 8000, NULL, NULL, NULL, NULL, NULL, 'available'),
(22, 1, '1_BEDROOM', 'NGONG', 2000, 8000, NULL, NULL, NULL, NULL, NULL, 'available'),
(23, 2, '1_BEDROOM', 'NGONG', 2000, 8000, NULL, NULL, NULL, NULL, NULL, 'available'),
(24, 3, '1_BEDROOM', 'NGONG', 2000, 8000, NULL, NULL, NULL, NULL, NULL, 'available'),
(25, 4, '1_BEDROOM', 'NGONG', 2000, 8000, NULL, NULL, NULL, NULL, NULL, 'available'),
(26, 24, '1_BEDROOM', 'NGARA NAIROBI', 33, 345, NULL, NULL, NULL, NULL, NULL, 'available'),
(28, 23, '3_BEDROOM', 'NGONG ROAD', 3000, 4000, NULL, NULL, NULL, NULL, NULL, 'available');

-- --------------------------------------------------------

--
-- Table structure for table `house_bookings`
--

CREATE TABLE `house_bookings` (
  `id` int(11) NOT NULL,
  `client_id` int(11) NOT NULL,
  `amount_paid` float NOT NULL,
  `amount_due` float NOT NULL,
  `house_id` int(11) NOT NULL,
  `date_booked` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `house_owners`
--

CREATE TABLE `house_owners` (
  `id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `name` varchar(130) NOT NULL,
  `email` varchar(128) DEFAULT NULL,
  `phone_number` varchar(13) NOT NULL,
  `national_id` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `username` varchar(32) NOT NULL,
  `email` varchar(128) NOT NULL,
  `password` varchar(128) NOT NULL,
  `account_type` enum('client','agent','owner','admin') NOT NULL,
  `phone_number` varchar(13) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `username`, `email`, `password`, `account_type`, `phone_number`) VALUES
(23, 'esd', 'mail@test.com', '$2y$10$R2JvCdLbVttWNqIvhawdqOkdFFhZTDyT1yNIB6dsbPDORYESXYy7W', 'client', '345'),
(24, 'errf', 'mail@test.com', '$2y$10$7fYGpP6TNFOyojTpI.q.Y.Gqa.0DvppTLwiz1oC8HjwiDIoCKYEPy', 'admin', '848349394');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `agents`
--
ALTER TABLE `agents`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `houses`
--
ALTER TABLE `houses`
  ADD PRIMARY KEY (`id`),
  ADD KEY `owned_by` (`owned_by`);

--
-- Indexes for table `house_owners`
--
ALTER TABLE `house_owners`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `username` (`username`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `agents`
--
ALTER TABLE `agents`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `houses`
--
ALTER TABLE `houses`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=29;
--
-- AUTO_INCREMENT for table `house_owners`
--
ALTER TABLE `house_owners`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=25;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
