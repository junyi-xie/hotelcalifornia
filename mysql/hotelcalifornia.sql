-- phpMyAdmin SQL Dump
-- version 5.0.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jun 18, 2020 at 02:41 PM
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
(8, 'appel boom', 'aaaaaaaaaaaar', 'aapelstraat', '4914RQ', 'den haag', 'nederland', 683712941, 'appelbooom@email.com'),
(9, 'bobby', 'jogn', 'appelstraat 841', '7471RP', 'rotterdam', 'africa', 612345678, 'africa@test.com'),
(10, 'john', 'smith', 'jogn smith street', '4844rj', 'den bosch', 'croatia', 123456789, 'johnsmith@email.com'),
(11, 'smithy', 'gin', 'addres 123', '4812', 'some city', 'Bahrain', 637417472, 'gin42@email.com'),
(12, 'Jun', '44', '214124', '2521 RM', 'The Hague', 'Netherlands', 637474712, 'r@gmail.com'),
(13, 'Jun', 'Xie', 'Neherkade 2178', '2521 RM', 'The Hague', 'Netherlands', 636560371, 'yunyi.xi444e@outlook.com'),
(14, 'Sarah', 'Smithy', 'larohp 412', '4813rm', 'rotterdam', 'Gabon', 612354423, 'sarah.smithy@gmail.com'),
(15, 'Jun', 'Xie', 'Neherkade 2178', '2521 RM', 'The Hague', 'Netherlands', 617494914, 'yunyi.xie@outlook.com412412'),
(16, 'Jun', '44', '214124', '2521 RM', 'The Hague', 'Netherlands', 637474710, 'rrwr@gmail.com'),
(17, 'Alli', 'Baba', 'appel ali straat 5', '2741 oa', 'den haag', 'Netherlands', 612847274, 'alibaba@email.com'),
(18, 'alibaba', 'mohhamed', 'ufrrrrhr strat123', '4717rw', 'city something', 'Bahamas', 646473631, 'irjr@email.com'),
(19, 'Jun', 'Xie', 'Neherkade 2178', '2521 RM', 'The Hague', 'Netherlands', 684718484, 'yunyi.xie5542141424@outlook.com'),
(20, 'allah a', 'akbar', 'marrokohn', '4124rw', 'gouda', 'Bahamas', 684828482, 'allahakbar123@gmail.com'),
(21, 'appelmoest', 'taart', 'appelmoest straat 5', '4758wo', 'somewhere', 'Gambia', 684837947, 'appelmoestaart@email.com'),
(22, 'kon', 'sahha', 'appelstraat 888', '7574rm', 'city', 'Palau', 677787988, 'konsahha@email.com'),
(23, 'jhonny', 'gyro', 'something', '4648re', 'some city', 'Ethiopia', 647484843, 'gyro@email.com'),
(24, 'someting', 'something', 'some adress', '4424ed', 'some city', 'Bangladesh', 678787988, 'tes44t@email.com'),
(25, 'kalalao', 'dkakak', 'adresss 949', '8574ws', 'some city test', 'Honduras', 692890987, 'kakal@email.com'),
(26, 'John', 'Johnson', 'John Street 6', '4444OP', 'Somewhere', 'Guernsey', 699955999, 'JohnJohnson@gmail.com'),
(27, 'Jennifer', 'Lopez', 'some street', '4444az', 'some city', 'Barbados', 688848555, 'jenniferlopez@email.com'),
(28, 'test', 'tesst', 'test', 'test', 'test', 'Bahrain', 611111111, 'test123@email.com'),
(29, 'test', 'test', 'test4', 'test5', 'test', 'Bahamas', 699999999, 'testt55@gmail.com'),
(30, 'testttt', 'test', 'test', 'test', 'test', 'Bahrain', 688877666, 'test888@email.com'),
(31, 'Jun', '44', '214124', '2521 RM', 'The Hague', 'Netherlands', 2147483647, '4444@gmail.com'),
(32, 'johan', 'test', 'test4', 'test', 'test', 'Taiwan, Province of China', 612399999, 'testjohn@email.com'),
(33, 'hii', 'hii', 'hii', '77', 'hii', 'Haiti', 677777777, 'hii@email.com'),
(34, 'test', 'test', 'test', 'test', 'test', 'Azerbaijan', 688846777, 'appeltest@email.com'),
(35, 'appel io', 'it', 'testt', 'test', 'test', 'Syrian Arab Republic', 677853512, 'rio@email.com'),
(36, 'test', 'appel', 'test', 'test', 'test', 'Armenia', 699755473, 'testappel55@gmail.com'),
(37, 'jun', 'test', 'te', 'tes4', 'te', 'Azerbaijan', 678742421, 'juntest@email.com');

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
(2, '2020-06-16', '2020-06-13', 10, 10),
(3, '2020-08-20', '2020-08-29', 26, 24),
(4, '2020-08-27', '2020-09-25', 20, 37),
(5, '2020-08-31', '2020-09-16', 10, 14),
(6, '2020-06-17', '2020-06-30', 3, 41),
(7, '2020-07-21', '2020-08-21', 30, 6),
(8, '2020-07-09', '2020-07-30', 33, 24),
(9, '2020-08-11', '2020-08-21', 26, 10),
(10, '2020-06-19', '2020-06-27', 32, 5),
(11, '2020-06-20', '2020-06-19', 8, 14),
(12, '2020-06-16', '2020-06-15', 1, 1),
(13, '2020-06-23', '2020-06-28', 37, 28),
(14, '2020-06-17', '2020-06-18', 17, 31),
(15, '2020-07-04', '2020-07-11', 18, 31),
(16, '2020-07-01', '2020-07-02', 19, 31),
(17, '2020-06-18', '2020-06-26', 20, 3),
(18, '2020-07-01', '2020-07-11', 21, 1),
(19, '2020-07-01', '2020-07-02', 22, 2),
(20, '2020-07-01', '2020-07-01', 23, 2),
(21, '2020-07-11', '2020-07-28', 25, 2),
(22, '2020-06-18', '2020-06-19', 26, 34),
(23, '2020-06-19', '2020-06-22', 27, 44),
(24, '2020-06-19', '2020-07-03', 28, 31),
(25, '2020-06-26', '2020-07-10', 29, 12),
(26, '2020-07-11', '2020-08-04', 30, 12),
(27, '2020-07-04', '2020-06-30', 32, 12),
(28, '2020-10-01', '2020-10-20', 33, 12),
(29, '2020-12-31', '2020-12-31', 34, 12),
(30, '2020-07-08', '2020-07-11', 35, 12),
(31, '2020-08-06', '2020-08-26', 16, 19),
(32, '2020-06-19', '2020-06-19', 37, 30),
(33, '2020-07-14', '2020-07-15', 21, 22);

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
(1, 'Appel #1', '111.00', 111, 3, 1, 'New appel test 2'),
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
(15, 'Room #15', '993.00', 702, 7, 4, 'test lorem'),
(16, 'expensie room', '99999.00', 422, 4, 3, 'really expensive'),
(17, 'cheap room', '999.00', 12234, 7, 3, '55 room family'),
(18, 'test 22 room', '4122.00', 222, 2, 2, '22 mummber 2'),
(19, 'Room #19', '677.00', 701, 7, 4, 'lorem test lorem'),
(20, 'ooo 9', '499.00', 981, 4, 1, '41242 981 room number'),
(21, 'nummber 144', '4914.00', 14, 5, 1, 'room number 14 test lorem'),
(22, 'caoc v1', '41144.00', 97, 8, 3, 'msan ac pellentesque quis, ultricies a risus'),
(23, 'juiape', '414.00', 211, 2, 2, 'alesuada metus. Nu'),
(24, 'hio edray', '44.00', 41, 1, 2, ' a risus. Fusce nec aucto'),
(25, 'nrjqiwiq NEWASA', '12311.00', 42, 9, 2, 'loremLorem ipsum dolor sit amet, '),
(26, '5rwr test baana', '44.00', 912, 2, 3, 'somethign room'),
(27, 'Best Room', '12.00', 111, 9, 2, 'best room lorem ipsr'),
(28, 'Room #28', '333.00', 902, 9, 4, 'testsat'),
(29, 'Room #29', '212.00', 901, 9, 4, 'lorem testt'),
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
(43, 'room 780', '777.00', 705, 7, 3, 'this is good desc'),
(44, 'new room for test', '4999.00', 801, 8, 2, 'new room test');

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
  MODIFY `customer_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=38;

--
-- AUTO_INCREMENT for table `reservations`
--
ALTER TABLE `reservations`
  MODIFY `reservation_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=34;

--
-- AUTO_INCREMENT for table `rooms`
--
ALTER TABLE `rooms`
  MODIFY `room_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=45;

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
