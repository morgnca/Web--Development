-- phpMyAdmin SQL Dump
-- version 4.9.5deb2
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3306
-- Generation Time: Oct 03, 2022 at 08:47 AM
-- Server version: 8.0.30-0ubuntu0.20.04.2
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
-- Database: `morganchongarke_assessment_v2`
--

-- --------------------------------------------------------

--
-- Table structure for table `items`
--

CREATE TABLE `items` (
  `item_id` tinyint UNSIGNED NOT NULL,
  `item_name` varchar(20) NOT NULL,
  `price` float UNSIGNED NOT NULL,
  `type` enum('food','drink') NOT NULL,
  `available` enum('true','false') NOT NULL,
  `dairy_free` enum('true','false') NOT NULL,
  `gluten_free` enum('true','false') NOT NULL,
  `vegetarian` enum('','vegetarian','vegan') NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb3;

--
-- Dumping data for table `items`
--

INSERT INTO `items` (`item_id`, `item_name`, `price`, `type`, `available`, `dairy_free`, `gluten_free`, `vegetarian`) VALUES
(1, 'Beef Nachos', 5.5, 'food', 'true', 'false', 'true', ''),
(2, 'Bean Nachos', 5.5, 'food', 'false', 'false', 'true', 'vegetarian'),
(3, 'Salad', 4.5, 'food', 'false', 'true', 'true', 'vegan'),
(4, 'Vege Sausage Roll', 3, 'food', 'false', 'false', 'false', 'vegetarian'),
(5, 'Ham Cheese Panini', 5, 'food', 'true', 'false', 'false', ''),
(6, 'Ham Sandwich', 3, 'food', 'true', 'false', 'false', ''),
(7, 'Cheese Sandwich', 2.5, 'food', 'true', 'false', 'false', 'vegetarian'),
(8, 'Bacon and Egg Slice', 5, 'food', 'true', 'false', 'false', ''),
(9, 'Berry Muesli', 4, 'food', 'true', 'false', 'false', 'vegetarian'),
(10, 'BLT Sandwich', 5.5, 'food', 'true', 'true', 'false', ''),
(11, 'Chicken on Rice', 6, 'food', 'true', 'true', 'false', ''),
(12, 'Sushi (4x Packet)', 5, 'food', 'false', 'true', 'true', ''),
(13, 'Croissant', 4.5, 'food', 'true', 'false', 'false', 'vegetarian'),
(14, 'Scone', 3.5, 'food', 'false', 'false', 'false', 'vegetarian'),
(15, 'Nutella Muffin', 3.5, 'food', 'true', 'false', 'false', 'vegetarian'),
(16, 'Caramel Slice', 3.5, 'food', 'false', 'false', 'false', 'vegetarian'),
(17, 'Lolly Cake', 1.8, 'food', 'true', 'false', 'false', 'vegetarian'),
(18, 'Cake', 4, 'food', 'true', 'false', 'false', 'vegetarian'),
(19, 'Choc Chip Cookie', 2, 'food', 'false', 'false', 'false', 'vegetarian'),
(20, 'Waffle', 3, 'food', 'false', 'false', 'false', 'vegetarian'),
(21, 'Jelly', 1.8, 'food', 'false', 'true', 'true', ''),
(22, 'Fruit Salad', 4.5, 'food', 'true', 'true', 'true', 'vegan'),
(23, 'Up & Go', 3.2, 'drink', 'true', 'false', 'false', 'vegetarian'),
(24, 'Berry Smoothie', 5.5, 'drink', 'false', 'true', 'true', 'vegan'),
(25, 'Pump Water', 3.5, 'drink', 'true', 'true', 'true', 'vegan'),
(26, 'Ice Tea', 4, 'drink', 'true', 'true', 'true', 'vegetarian'),
(27, 'E2', 2.8, 'drink', 'true', 'true', 'false', ''),
(28, 'Keri Juice', 3.3, 'drink', 'false', 'true', 'false', 'vegan'),
(29, 'Powerade', 4.3, 'drink', 'false', 'false', 'false', ''),
(30, 'Hot Chocolate', 4, 'drink', 'true', 'false', 'true', 'vegetarian'),
(31, 'Espresso Coffee', 4.5, 'drink', 'true', 'false', 'true', 'vegetarian'),
(32, 'Herbal Tea', 3, 'drink', 'false', 'true', 'true', 'vegan'),
(33, 'English Tea', 3.5, 'drink', 'true', 'false', 'true', 'vegetarian');

-- --------------------------------------------------------

--
-- Table structure for table `specials_info`
--

CREATE TABLE `specials_info` (
  `week_number` tinyint UNSIGNED NOT NULL,
  `new_price` float UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb3;

--
-- Dumping data for table `specials_info`
--

INSERT INTO `specials_info` (`week_number`, `new_price`) VALUES
(1, 4.5),
(2, 5),
(3, 4.8),
(4, 4.5),
(5, 6),
(6, 4.8),
(7, 5),
(8, 5.5),
(9, 5.3),
(10, 4.8),
(11, 4);

-- --------------------------------------------------------

--
-- Table structure for table `specials_items`
--

CREATE TABLE `specials_items` (
  `week_number` tinyint UNSIGNED NOT NULL,
  `item_id` tinyint UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `specials_items`
--

INSERT INTO `specials_items` (`week_number`, `item_id`) VALUES
(1, 16),
(1, 26),
(2, 29),
(2, 5),
(3, 4),
(3, 25),
(4, 17),
(4, 24),
(5, 30),
(5, 9),
(6, 28),
(6, 14),
(7, 13),
(7, 29),
(8, 15),
(8, 26),
(9, 22),
(9, 27),
(10, 33),
(10, 7),
(11, 14),
(11, 23);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `items`
--
ALTER TABLE `items`
  ADD PRIMARY KEY (`item_id`);

--
-- Indexes for table `specials_info`
--
ALTER TABLE `specials_info`
  ADD PRIMARY KEY (`week_number`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `items`
--
ALTER TABLE `items`
  MODIFY `item_id` tinyint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=35;

--
-- AUTO_INCREMENT for table `specials_info`
--
ALTER TABLE `specials_info`
  MODIFY `week_number` tinyint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
