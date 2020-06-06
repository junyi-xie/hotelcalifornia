-- phpMyAdmin SQL Dump
-- version 5.0.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jun 06, 2020 at 05:10 PM
-- Server version: 10.4.11-MariaDB
-- PHP Version: 7.4.3

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `hotelcalifornia`
--

-- --------------------------------------------------------

--
-- Table structure for table `categories`
--

CREATE TABLE `categories` (
  `id` int(11) NOT NULL,
  `category_name` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `categories`
--

INSERT INTO `categories` (`id`, `category_name`) VALUES
(1, 'Single Room'),
(2, 'Double Room'),
(3, 'Family Room'),
(4, 'Apartment');

-- --------------------------------------------------------

--
-- Table structure for table `customers`
--

CREATE TABLE `customers` (
  `id` int(11) NOT NULL,
  `customer_first_name` varchar(100) NOT NULL,
  `customer_last_name` varchar(100) NOT NULL,
  `customer_address` varchar(50) NOT NULL,
  `customer_zip_code` varchar(10) NOT NULL,
  `customer_city` varchar(150) NOT NULL,
  `customer_country` varchar(150) NOT NULL,
  `customer_telephone` int(11) NOT NULL,
  `customer_email` varchar(150) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `customers`
--

INSERT INTO `customers` (`id`, `customer_first_name`, `customer_last_name`, `customer_address`, `customer_zip_code`, `customer_city`, `customer_country`, `customer_telephone`, `customer_email`) VALUES
(1, 'Jun Yi', 'Xie', 'Neherkade 2178', '2521 RM', 'The Hague', 'Netherlands', 636560377, 'yunyi.xie@outlook.com'),
(2, 'Jun', 'Xie', 'Neherkade 2178', '2521 RM', 'The Hague', 'Netherlands', 647185812, '6009569@mborijnland.nl'),
(3, 'Appel', 'Banaan', 'Neherkade 2178', '2521 RM', 'The Hague', 'Netherlands', 636424124, 'yunyitec21@gmail.com'),
(4, 'Banaan', 'Appelboom', 'Appelstraat 1', '8419IP', 'Amsterdam', 'Netherlands', 674142124, 'kouhie123@gmail.com'),
(5, 'Jun', 'Xie', 'Neherkade 2178', '2521 RM', 'The Hague', 'Netherlands', 636560347, 'yunyi.xie11@outlook.com');

-- --------------------------------------------------------

--
-- Table structure for table `reservations`
--

CREATE TABLE `reservations` (
  `id` int(11) NOT NULL,
  `reservation_start` date NOT NULL,
  `reservation_end` date NOT NULL,
  `customer_id` int(11) NOT NULL,
  `room_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `reservations`
--

INSERT INTO `reservations` (`id`, `reservation_start`, `reservation_end`, `customer_id`, `room_id`) VALUES
(1, '2020-06-26', '2020-06-25', 2, 18),
(2, '2020-06-11', '2020-06-10', 1, 9),
(3, '2020-06-29', '2020-06-30', 3, 6),
(4, '0000-00-00', '2020-06-06', 3, 13),
(5, '2020-06-16', '2020-06-13', 4, 3);

-- --------------------------------------------------------

--
-- Table structure for table `rooms`
--

CREATE TABLE `rooms` (
  `id` int(11) NOT NULL,
  `room_name` varchar(50) NOT NULL,
  `room_price` decimal(11,2) NOT NULL,
  `room_number` int(11) NOT NULL,
  `room_floor` varchar(2) NOT NULL,
  `category_id` int(11) NOT NULL,
  `room_description` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `rooms`
--

INSERT INTO `rooms` (`id`, `room_name`, `room_price`, `room_number`, `room_floor`, `category_id`, `room_description`) VALUES
(2, 'Solo Room v2', '299.00', 1, '2F', 1, ''),
(3, 'Double Room v1', '699.00', 1, '3F', 2, ''),
(4, 'Double Room v2', '159.00', 2, '4F', 2, ''),
(5, 'Double Room v3', '412.00', 5, '1F', 2, ''),
(6, 'Family Room v1', '899.00', 6, '2F', 3, ''),
(7, 'Family Room v2', '689.00', 7, '2F', 3, ''),
(8, 'Family Room v3', '789.00', 4, '3F', 3, ''),
(9, 'Family Room v4', '349.00', 1, '5F', 3, ''),
(10, 'Family Room v5', '49.00', 4, '1F', 3, ''),
(11, 'Family Room v6', '329.00', 2, '6F', 3, ''),
(13, 'Apartment Room v2', '819.00', 4, '2F', 4, ''),
(14, 'Apartment Room v3', '999.00', 3, '2F', 4, ''),
(16, 'Apartment Room v5', '1999.00', 5, '3F', 4, ''),
(18, 'Solo Room v4', '709.00', 3, '7F', 1, ''),
(19, 'Solo Room v5', '2999.00', 2, '5F', 1, ''),
(22, 'test', '142141.00', 15, '3F', 2, 'sss1eqw'),
(24, 'hqhqq', '11111111.00', 142, '1F', 4, 'best room test test plab');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `user_name` varchar(100) NOT NULL,
  `user_password` varchar(100) NOT NULL,
  `user_email` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `user_name`, `user_password`, `user_email`) VALUES
(1, 'test', '$2y$10$GGcBL6jIi9nNWYGzGUB5vOuKwBEVuQYISt8.5TZm0uZUGJXimxLSC', 'test@test.com');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `categories`
--
ALTER TABLE `categories`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `customers`
--
ALTER TABLE `customers`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `reservations`
--
ALTER TABLE `reservations`
  ADD PRIMARY KEY (`id`),
  ADD KEY `room_id` (`room_id`),
  ADD KEY `customer_id` (`customer_id`);

--
-- Indexes for table `rooms`
--
ALTER TABLE `rooms`
  ADD PRIMARY KEY (`id`),
  ADD KEY `category_id` (`category_id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `categories`
--
ALTER TABLE `categories`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `customers`
--
ALTER TABLE `customers`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `reservations`
--
ALTER TABLE `reservations`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `rooms`
--
ALTER TABLE `rooms`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=27;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `reservations`
--
ALTER TABLE `reservations`
  ADD CONSTRAINT `customer_id` FOREIGN KEY (`customer_id`) REFERENCES `customers` (`id`),
  ADD CONSTRAINT `room_id` FOREIGN KEY (`room_id`) REFERENCES `rooms` (`id`);

--
-- Constraints for table `rooms`
--
ALTER TABLE `rooms`
  ADD CONSTRAINT `category_id` FOREIGN KEY (`category_id`) REFERENCES `categories` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
