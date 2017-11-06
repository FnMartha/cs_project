-- phpMyAdmin SQL Dump
-- version 4.7.4
-- https://www.phpmyadmin.net/
--
-- Host: localhost
-- Generation Time: Nov 06, 2017 at 09:01 AM
-- Server version: 10.1.28-MariaDB
-- PHP Version: 7.1.10

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
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
  `max_price` float DEFAULT NULL,
  `image1` varchar(128) DEFAULT NULL,
  `image2` varchar(128) DEFAULT NULL,
  `image3` varchar(128) DEFAULT NULL,
  `image4` varchar(128) DEFAULT NULL,
  `image5` varchar(128) DEFAULT NULL,
  `status` enum('booked','available') NOT NULL,
  `lat` float DEFAULT NULL,
  `lng` float DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `houses`
--

INSERT INTO `houses` (`id`, `owned_by`, `house_category`, `location`, `min_price`, `max_price`, `image1`, `image2`, `image3`, `image4`, `image5`, `status`, `lat`, `lng`) VALUES
(40, 27, '2_BEDROOM', 'Dik Dik Gardens, Nairobi, Kenya', 34, NULL, 'uploads/Screenshot_1506078514_2GGKDVX.png', 'uploads/Screenshot_1506078514_4qKL9OD.png', 'uploads/Screenshot_1506078514_20DxXAd.png', 'uploads/Screenshot_1506078514_dt5rKgd.png', 'uploads/Screenshot_1506078514_hlpMShp.png', 'available', -1.27118, 36.7851),
(41, 27, '2_BEDROOM', 'Nyeri-Nyahururu Rd, King\'ong\'o, Kenya', 3000, NULL, 'uploads/image_4.jpg', NULL, NULL, NULL, NULL, 'available', -0.415763, 36.9617);

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
(25, 'Gerald', 'g@gmail.com', '$2y$10$e7yL/dTwN.alpYEAMzIaRuZRfF9J.fz08ch1v5YW3ttr5zlMQNnDC', 'agent', '0789295477'),
(26, 'frank', 'frank.martha@hotmail.com', '$2y$10$kJJBdC4YOqZzH5lXT4/khexzu6EWVZLmv5egxw2qVicf3LkZ8w0z6', 'admin', '0713752249'),
(27, 'Nyaga', 'g@yahoo.com', '$2y$10$ODGApNy9SoecYeHaJ35ZyOXqM95GBiv6FLIAfPVPOo9fN8f6rzJaq', 'owner', '0713752249'),
(28, 'Rey', 'rankibe95@gmail.com', '$2y$10$Q/Ob/J6ebEDB65ZqjOWoZ.fjl8wFkKxWRNpq3jw5kx9EMMWkj1YtO', 'owner', '0704679740'),
(29, 'MARTHA.FRANK', 'frank.martha@hotmail.com', '$2y$10$pYlG9ZqrfN19zE26AZje8uWXLSyXBxIjibFU8.2XZ5yaeSPEIs6bu', 'agent', '0713752249'),
(32, 'qwerty', 'qwerty@gmail.com', '$2y$10$nCXqfa1hFjV9VS3.h0t69enqYHI0QSRnnftmgSuY3kfXSEiFwrpaK', 'client', '1234567'),
(33, 'qer', 'sdfg@erty.com', '$2y$10$4myUZF.vOXh/iy9AC0wtNeFO2wzxLyOxszZgYzmA1MEsyY9ZkKSPO', 'client', '0713752249');

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
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=42;

--
-- AUTO_INCREMENT for table `house_owners`
--
ALTER TABLE `house_owners`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=34;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
