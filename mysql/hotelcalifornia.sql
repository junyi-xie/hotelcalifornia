-- phpMyAdmin SQL Dump
-- version 5.0.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jun 13, 2020 at 08:42 PM
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
  `category_id` int(11) NOT NULL,
  `category_name` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `categories`
--

INSERT INTO `categories` (`category_id`, `category_name`) VALUES
(1, 'Single'),
(2, 'Double'),
(3, 'Family'),
(4, 'Apartment');

-- --------------------------------------------------------

--
-- Table structure for table `customers`
--

CREATE TABLE `customers` (
  `customer_id` int(11) NOT NULL,
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

INSERT INTO `customers` (`customer_id`, `customer_first_name`, `customer_last_name`, `customer_address`, `customer_zip_code`, `customer_city`, `customer_country`, `customer_telephone`, `customer_email`) VALUES
(1, 'Jun Yi', 'Xie', 'Neherkade 2178', '2521 RM', 'The Hague', 'Netherlands', 636560377, 'yunyi.xie@outlook.com'),
(2, 'Jun', 'Xie', 'Neherkade 2178', '2521 RM', 'The Hague', 'Netherlands', 647185812, '6009569@mborijnland.nl'),
(3, 'Appel', 'Banaan', 'Neherkade 2178', '2521 RM', 'The Hague', 'Netherlands', 636424124, 'yunyitec21@gmail.com'),
(4, 'Banaan', 'Appelboom', 'Appelstraat 1', '8419IP', 'Amsterdam', 'Netherlands', 674142124, 'kouhie123@gmail.com'),
(5, 'Jun', 'Xie', 'Neherkade 2178', '2521 RM', 'The Hague', 'Netherlands', 636560347, 'yunyi.xie11@outlook.com'),
(6, 'appww', 'rrurw', '2121ew', '321w', 'den haag', 'nederland', 612322333, 'bob@email.nl'),
(7, 'bobby', 'bobsonb', 'bobadres', '4912QE', 'bobcity', 'nederland', 647412842, 'bob.bobbby.bob@email.com'),
(8, 'appel boom', 'aaaaaaaaaaaar', 'aapelstraat', '4914RQ', 'den haag', 'nederland', 683712941, 'appelbooom@email.com');

-- --------------------------------------------------------

--
-- Table structure for table `reservations`
--

CREATE TABLE `reservations` (
  `reservation_id` int(11) NOT NULL,
  `reservation_start` date NOT NULL,
  `reservation_end` date NOT NULL,
  `customer_id` int(11) NOT NULL,
  `room_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `reservations`
--

INSERT INTO `reservations` (`reservation_id`, `reservation_start`, `reservation_end`, `customer_id`, `room_id`) VALUES
(1, '2020-06-19', '2020-06-20', 6, 30),
(11, '2020-06-20', '2020-06-19', 8, 14);

-- --------------------------------------------------------

--
-- Table structure for table `rooms`
--

CREATE TABLE `rooms` (
  `room_id` int(11) NOT NULL,
  `room_name` varchar(50) NOT NULL,
  `room_price` decimal(11,2) NOT NULL,
  `room_number` int(11) NOT NULL,
  `room_floor` int(11) NOT NULL,
  `category_id` int(11) NOT NULL,
  `room_description` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `rooms`
--

INSERT INTO `rooms` (`room_id`, `room_name`, `room_price`, `room_number`, `room_floor`, `category_id`, `room_description`) VALUES
(1, 'Appel #1', '111.00', 111, 1, 1, 'New appel test 2'),
(2, 'Solo Room v2', '299.00', 1, 2, 3, 'new desc for test 2'),
(3, 'Double Room v1', '699.00', 1, 3, 2, 'tetete lorem'),
(4, 'Double Room v2', '159.00', 2, 4, 2, 'teaett'),
(5, 'Double Room v3', '412.00', 5, 1, 2, 'etaetetet'),
(6, 'Family Room v1', '899.00', 6, 2, 3, 'lreo mteststet'),
(7, 'Family Room v2', '689.00', 7, 2, 3, 'ttetetet'),
(8, 'Family Room v3', '789.00', 4, 3, 3, 'testtappell boom'),
(9, 'Family Room v4', '349.00', 1, 5, 3, 'rqw11123344'),
(10, 'Family Room v5', '49.00', 4, 1, 3, 'test loremm looremre'),
(11, 'appl testt', '3249.00', 2, 6, 2, 'boom appel'),
(12, 'lorem ipsum room 22', '411.00', 5, 9, 2, 'lreorjqwrq lorem '),
(13, 'ioaorqwr', '2412.00', 12, 4, 1, '1241 COFFAAEE'),
(14, 'Test banaan #14', '14.00', 14, 4, 4, 'kamer 14 test'),
(16, 'expensie room', '99999.00', 422, 4, 3, 'really expensive'),
(17, 'cheap room', '999.00', 12234, 7, 3, '55 room family'),
(18, 'test 22 room', '4122.00', 222, 2, 2, '22 mummber 2'),
(20, 'ooo 9', '499.00', 981, 4, 1, '41242 981 room number'),
(21, 'nummber 144', '4914.00', 14, 5, 1, 'room number 14 test lorem'),
(22, 'caoc v1', '41144.00', 97, 8, 3, 'msan ac pellentesque quis, ultricies a risus'),
(23, 'juiape', '414.00', 211, 2, 2, 'alesuada metus. Nu'),
(24, 'hio edray', '44.00', 41, 1, 2, ' a risus. Fusce nec aucto'),
(25, 'nrjqiwiq NEWASA', '12311.00', 42, 9, 2, 'loremLorem ipsum dolor sit amet, '),
(26, '5rwr test baana', '44.00', 912, 2, 3, 'somethign room'),
(27, 'Best Room', '12.00', 111, 9, 2, 'best room lorem ipsum qqqqqqqqqqq'),
(28, 'lorem111', '3341.00', 11, 2, 4, 'lorem lorem appel 1112 best room cheap etc eeccaa'),
(30, 'test room', '1.00', 433, 1, 1, 'lorem test'),
(31, 'room name #111111', '123.00', 33, 3, 4, 'apartment room desc'),
(32, 'new room test', '1338.00', 43, 6, 1, 'room test test'),
(33, 'Room #33', '600.00', 301, 3, 3, 'Room #33, great view!'),
(34, 'Room #44', '599.00', 602, 6, 4, 'Room #44 is awesome'),
(35, 'New Room', '999.00', 603, 6, 1, 'New room out!'),
(36, 'Room #555', '799.00', 604, 6, 1, 'New room on sixth floor!'),
(37, 'Room #555', '989.00', 606, 6, 2, 'room'),
(38, 'Room #557', '499.00', 607, 6, 3, 'room number 607'),
(39, 'room new', '511.00', 701, 7, 3, 'new room for seventh floor'),
(40, 'room seventh #2', '777.00', 702, 7, 2, 'new room again for floor seven'),
(41, 'room #778', '117.00', 703, 7, 2, 'room #778'),
(42, 'room #779', '555.00', 704, 7, 3, 'a desc test'),
(43, 'room 780', '777.00', 705, 7, 3, 'this is good desc');

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
  ADD PRIMARY KEY (`category_id`);

--
-- Indexes for table `customers`
--
ALTER TABLE `customers`
  ADD PRIMARY KEY (`customer_id`);

--
-- Indexes for table `reservations`
--
ALTER TABLE `reservations`
  ADD PRIMARY KEY (`reservation_id`),
  ADD KEY `room_id` (`room_id`),
  ADD KEY `customer_id` (`customer_id`);

--
-- Indexes for table `rooms`
--
ALTER TABLE `rooms`
  ADD PRIMARY KEY (`room_id`),
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
  MODIFY `category_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `customers`
--
ALTER TABLE `customers`
  MODIFY `customer_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `reservations`
--
ALTER TABLE `reservations`
  MODIFY `reservation_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT for table `rooms`
--
ALTER TABLE `rooms`
  MODIFY `room_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=44;

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
  ADD CONSTRAINT `customer_id` FOREIGN KEY (`customer_id`) REFERENCES `customers` (`customer_id`),
  ADD CONSTRAINT `room_id` FOREIGN KEY (`room_id`) REFERENCES `rooms` (`room_id`);

--
-- Constraints for table `rooms`
--
ALTER TABLE `rooms`
  ADD CONSTRAINT `category_id` FOREIGN KEY (`category_id`) REFERENCES `categories` (`category_id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
