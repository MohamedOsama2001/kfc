-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jul 17, 2023 at 01:58 AM
-- Server version: 10.4.25-MariaDB
-- PHP Version: 8.1.10

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `kfc`
--

-- --------------------------------------------------------

--
-- Table structure for table `cart`
--

CREATE TABLE `cart` (
  `id` int(11) NOT NULL,
  `pro_id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `pro_name` text NOT NULL,
  `pro_price` text NOT NULL,
  `pro_image` text NOT NULL,
  `pro_quantity` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `cart`
--

INSERT INTO `cart` (`id`, `pro_id`, `user_id`, `pro_name`, `pro_price`, `pro_image`, `pro_quantity`) VALUES
(101, 9, 4, 'Zinger Sandwich', '16', '../image/110001.png', 1),
(108, 15, 1, 'Supreme Loaded Fries', '9', '../image/510085.png', 1);

-- --------------------------------------------------------

--
-- Table structure for table `categories`
--

CREATE TABLE `categories` (
  `id` int(11) NOT NULL,
  `name` text NOT NULL,
  `image` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `categories`
--

INSERT INTO `categories` (`id`, `name`, `image`) VALUES
(1, 'FOR ONE', '../image/ic_for_one3x0211.png'),
(2, 'FOR SHARING', '../image/ic_for_sharing3x0211.png'),
(3, 'SIDES & DESERTS', '../image/ic_side_and_desserts@3x02110.png'),
(4, 'BEVERAGES', '../image/ic_beverages_kwt_0211.png');

-- --------------------------------------------------------

--
-- Table structure for table `messages`
--

CREATE TABLE `messages` (
  `id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `name` text NOT NULL,
  `email` text NOT NULL,
  `message` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `messages`
--

INSERT INTO `messages` (`id`, `user_id`, `name`, `email`, `message`) VALUES
(4, 4, 'user3', 'user3@gmail.com', 'thanks for good services');

-- --------------------------------------------------------

--
-- Table structure for table `orders`
--

CREATE TABLE `orders` (
  `id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `name` text NOT NULL,
  `email` text NOT NULL,
  `phone` text NOT NULL,
  `st_add` text NOT NULL,
  `city` text NOT NULL,
  `country` text NOT NULL,
  `total_items` text NOT NULL,
  `total_price` text NOT NULL,
  `method` text NOT NULL,
  `date` text NOT NULL,
  `time` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `orders`
--

INSERT INTO `orders` (`id`, `user_id`, `name`, `email`, `phone`, `st_add`, `city`, `country`, `total_items`, `total_price`, `method`, `date`, `time`) VALUES
(3, 1, 'mohamed osama', 'mohamed@gmail.com', '01152673206', 'elrashidy', 'banha', 'egypt', ', Mirinda(1)', '11', 'cash on delivery', '17 May 2023', '05:06 PM'),
(4, 4, 'user3', 'user3@gmail.com', '01287294113', 'elomada', 'banha', 'Egypt', ', Zinger Sandwich(1), Pepsi(1)', '27', 'credit card', '17 May 2023', '05:09 PM'),
(5, 1, 'Mohamed Osama', 'mohamed@gmail.com', '0133310186', 'elomada', 'banha', 'Egypt', ', 12 Pcs Wings Dipping Bucket(1)', '115', 'credit card', '16 Jul 2023', '01:24 AM'),
(6, 1, 'New User', 'user@gmail.com', '01152673206', 'elomada', 'banha', 'Egypt', ', 12 Pcs Wings Dipping Bucket(1)', '115', 'credit card', '16 Jul 2023', '01:35 AM');

-- --------------------------------------------------------

--
-- Table structure for table `product`
--

CREATE TABLE `product` (
  `id` int(11) NOT NULL,
  `cat_id` int(11) NOT NULL,
  `name` text NOT NULL,
  `image` text NOT NULL,
  `component` text NOT NULL,
  `price` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `product`
--

INSERT INTO `product` (`id`, `cat_id`, `name`, `image`, `component`, `price`) VALUES
(1, 1, 'Variety Box', '../image/900573.png', '4 Pc Wings + 2 COB + Coleslaw + Fries + Drink', '44'),
(2, 4, 'Pepsi', '../image/1.png', 'Soft Drink', '11'),
(3, 2, '8 Pc Rice Bucket', '../image/621.png', '8 Chicken Pieces + 2 Rice + 2 Sauce + Family Fries + Large Coleslaw + 500mL Drink', '79'),
(4, 3, 'Chocolate Chip Cookie', '../image/710003.png', '1 Piece Of Chocolate Chip Cookies', '6'),
(5, 1, 'Hot Lime Wings Box', '../image/900556.png', '6 Pcs Hot Lime Wings + Fries + Coleslaw + Drink', '34'),
(6, 2, 'Strips & Dips Feast', '../image/610.png', '15 Strips + Family Dipper Fries + 3 Dips + 1L Pepsi', '75'),
(7, 3, '2 Strips + 1 Dip', '../image/450.png', '2 Strips + 1 Dip', '6'),
(8, 4, 'Mojito Krusher', '../image/610021.png', 'Soft Drink', '12'),
(9, 1, 'Zinger Sandwich', '../image/110001.png', '1 Chicken breast with our Zinger Recipe, lettuce & KFC’s special mayo in a round..', '16'),
(10, 2, '8 Pcs Wings Dipping Bucket', '../image/562.png', '8 Pc COB + 4 Wings Chili Lime  + 1 FF + 1 Large coleslaw + 500 ml pepsi + 3 Dips', '90'),
(11, 3, 'Pop Corn Chicken', '../image/27.png', 'KFC’s Delicious Pop Corn Chicken', '10.5'),
(12, 4, 'Lemon mint Ice tea', '../image/610019.png', 'Soft Drink', '9'),
(13, 1, 'Twister Sandwich - Spicy', '../image/110002.png', '2 crispy chicken strips, tomatoes, lettuce & pepper mayo in a toasted tortilla wrap', '9'),
(14, 2, '12 Pcs Wings Dipping Bucket', '../image/563.png', '12 Pc COB + 4 Wings Chili Lime  + 1 FF + Large Coleslaw + 1 Ltr pepsi + 3 Dips', '115'),
(15, 3, 'Supreme Loaded Fries', '../image/510085.png', '1 Big Supreme Loaded Fries', '9'),
(16, 4, 'Mirinda', '../image/8.png', 'Soft Drink', '11');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `name` text NOT NULL,
  `email` text NOT NULL,
  `password` text NOT NULL,
  `user_type` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `name`, `email`, `password`, `user_type`) VALUES
(1, 'mohamed', 'mohamed@gmail.com', 'mohamed12345', 'user'),
(2, 'admin', 'admin@gmail.com', 'admin12345', 'admin'),
(3, 'admin', 'admin3@gmail.com', 'admin3gmail12345', 'admin'),
(4, 'user3', 'user3@gmail.com', 'user3gmail12345', 'user');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `cart`
--
ALTER TABLE `cart`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `categories`
--
ALTER TABLE `categories`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `messages`
--
ALTER TABLE `messages`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `orders`
--
ALTER TABLE `orders`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `product`
--
ALTER TABLE `product`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `cart`
--
ALTER TABLE `cart`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=109;

--
-- AUTO_INCREMENT for table `categories`
--
ALTER TABLE `categories`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `messages`
--
ALTER TABLE `messages`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `orders`
--
ALTER TABLE `orders`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `product`
--
ALTER TABLE `product`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
