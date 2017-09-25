-- phpMyAdmin SQL Dump
-- version 4.5.2
-- http://www.phpmyadmin.net
--
-- Host: localhost
-- Generation Time: Sep 25, 2017 at 06:37 AM
-- Server version: 10.1.13-MariaDB
-- PHP Version: 5.6.20

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
  `house_category` enum('1_BEDROOM','2_BEDROOM','3_BENDROOM','BENSEATER','SINGLE_ROOM','DOUBLE_ROOM') NOT NULL,
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
(1, 0, '1_BEDROOM', 'NGONG', 2000, 8000, NULL, NULL, NULL, NULL, NULL, 'available'),
(2, 0, '1_BEDROOM', 'NGONG', 2000, 8000, NULL, NULL, NULL, NULL, NULL, 'available'),
(3, 0, '1_BEDROOM', 'NGONG', 2000, 8000, NULL, NULL, NULL, NULL, NULL, 'available'),
(4, 0, '1_BEDROOM', 'NGONG', 2000, 8000, NULL, NULL, NULL, NULL, NULL, 'available'),
(5, 0, '1_BEDROOM', 'NGONG', 2000, 8000, NULL, NULL, NULL, NULL, NULL, 'available'),
(6, 0, '1_BEDROOM', 'NGONG', 2000, 8000, NULL, NULL, NULL, NULL, NULL, 'available'),
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
(25, 4, '1_BEDROOM', 'NGONG', 2000, 8000, NULL, NULL, NULL, NULL, NULL, 'available');

-- --------------------------------------------------------

--
-- Table structure for table `house_bookings`
--

CREATE TABLE `house_bookings` (
  `id` int(11) NOT NULL,
  `client_id` int(11) NOT NULL,
  `amount_paid` int(11) NOT NULL,
  `amount_due` int(11) NOT NULL,
  `house_id` int(11) NOT NULL,
  `date_booked` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `house_owners`
--

CREATE TABLE `house_owners` (
  `id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `name` varchar(13) NOT NULL,
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
(1, 'test_username', 'mail@test.com', '$2y$10$3ovZB4oNCxkpbc3bnH28FuDKd2aGkJLXg2zPx27MzvSHpzMeGl4oi', 'client', '+338499494'),
(2, 'test_username49', 'mail@test.com', '$2y$10$pVAwntwtuzPvdSwDVGYbeut9Fuvi.YSElmtUhAGtn9H44ZQ2xOe3m', 'client', '+338499494'),
(3, 'test_username16', 'mail@test.com', '$2y$10$kC9DacF66/5DFp6jcPhPG.l9hWxG1c01wKSBymTF4k5ILiz08ifji', 'client', '+338499494'),
(4, 'test_username36', 'mail@test.com', '$2y$10$uAjo0UQr0BehmnTLf1k1L.CwoftSRsBj53lZdG1b0oJqrTnCqsimS', 'client', '+338499494'),
(5, 'test_username4', 'mail@test.com', '$2y$10$BOjNwMXXpxOk5APuERIwVec61rMLMyfE58Aynuo8TBqCiTJic9Uaa', 'client', '+338499494'),
(6, 'test_username27', 'mail@test.com', '$2y$10$msL2QldvcOPj2r60WT0k9u.DXXvJVriK8dzpeNEeS/5N5nA84vHq6', 'client', '+338499494'),
(7, 'test_username7', 'mail@test.com', '$2y$10$uTlhT7Im9DF8ceW8uhqLpuxjZ.6w6q8x3er3/btQOeen8t9iHdR/a', 'client', '+338499494'),
(8, 'test_username65', 'mail@test.com', '$2y$10$JW2ygCgKBQcU.Ik8krGNd.lgOBoMMjSlqoA.S7PAV7XPsLkAsHY9.', 'client', '+338499494'),
(9, 'test_username81', 'mail@test.com', '$2y$10$M6WuKeVkBq9pB6oPLrNKW.a/UFAFjQBAG8NOpenmgxC8jwIBtw0um', 'client', '+338499494'),
(10, 'test_username91', 'mail@test.com', '$2y$10$SkkXZgFS35Oqt1Ckkk5Dxefi5mL6TQODvK9TLKSiYos1.78ETQkb2', 'client', '+338499494'),
(12, 'test_username31', 'mail@test.com', '$2y$10$JzcOplfpX26AUbrbS5K93uodcVnVatd2.Tc7pPKMWpg7NHszIu7Ke', 'client', '+338499494'),
(13, 'test_username29', 'mail@test.com', '$2y$10$bn5qNa2iLKjhwE2JlUr59e0/cSdLn7uPzps.l/ulWy6KVf1wEMdt.', 'client', '+338499494'),
(14, 'test_username53', 'mail@test.com', '$2y$10$g6r7ukefKFKaWvuRHTej2eE85QbFr0LpKKzZvOYzMGG9kX0dvH3l.', 'client', '+338499494'),
(15, 'test_username28', 'mail@test.com', '$2y$10$RqiA38fsMmuRNOrxJ/Jb3eDHsJy7vrS0UmVlfjRIEJe4vk/jeuFA.', 'client', '+338499494'),
(17, 'test_username90', 'mail@test.com', '$2y$10$cd5qFLu8bgHoM9Wv4McIhO6QTRcxtKfaPIrjsm65bCN8LoJCUWSCG', 'client', '+338499494'),
(18, 'test_username9', 'mail@test.com', '$2y$10$S0wt5LapYDESt8MdfjDy2O78aGajRX8ToLezeaPX.gz3wEvU1OUCy', 'client', '+338499494'),
(19, 'test_username60', 'mail@test.com', '$2y$10$Zm/LPH0PSdfQQXgxXAx1ROMQCFGguX.RnlnbI1mkd3vwfxfP1cWoW', 'client', '+338499494'),
(21, 'test_username95', 'mail@test.com', '$2y$10$ERRWHIVGSk2eL05afVe0C.zNgrdwjROsLaTj./aKhIzN6N2SyPhR2', 'client', '+338499494'),
(22, 'test_username24', 'mail@test.com', '$2y$10$/2RRLR3LNS1MKhfq8uI2BO6GYthAD0alC5EjYrfotGQb.hGaGug6K', 'client', '+338499494');

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
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=26;
--
-- AUTO_INCREMENT for table `house_owners`
--
ALTER TABLE `house_owners`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=23;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
