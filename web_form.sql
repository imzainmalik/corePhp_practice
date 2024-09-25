-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3306
-- Generation Time: Sep 25, 2024 at 09:45 PM
-- Server version: 8.0.30
-- PHP Version: 8.2.0

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `web_form`
--

-- --------------------------------------------------------

--
-- Table structure for table `items`
--

CREATE TABLE `items` (
  `id` int NOT NULL,
  `item_name` varchar(500) NOT NULL,
  `item_price` int NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `items`
--

INSERT INTO `items` (`id`, `item_name`, `item_price`) VALUES
(1, 'demo name 1', 34),
(2, 'demo name 2', 33),
(3, 'dsa', 122);

-- --------------------------------------------------------

--
-- Table structure for table `transactions`
--

CREATE TABLE `transactions` (
  `id` int NOT NULL,
  `phone` varchar(220) NOT NULL,
  `pay_type` varchar(200) NOT NULL,
  `item_id` int NOT NULL,
  `transaction` varchar(222) NOT NULL,
  `date` varchar(333) NOT NULL,
  `title` varchar(222) NOT NULL,
  `amount` int NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `transactions`
--

INSERT INTO `transactions` (`id`, `phone`, `pay_type`, `item_id`, `transaction`, `date`, `title`, `amount`) VALUES
(1, '023564566', 'Bank transfer', 1, '8788888456', '1974-10-04', 'test acc title', 27),
(2, '023564566', 'Bank transfer', 1, '8764546', '1974-10-04', 'test acc title', 27),
(3, '023564566', 'Bank transfer', 1, '0215489', '2021-09-21', 'test acc title', 40),
(4, '023564566', 'Bank transfer', 1, '89781213', '1972-11-23', 'test acc title', 71),
(5, '023564566', 'Bank transfer', 1, '896546513', '1987-12-02', 'test acc title', 68),
(6, '', '', 3, 'Velit atque sint si', '2011-02-01', 'Distinctio Ut hic n', 86),
(7, '+1 (414) 791-2738', 'Nisi ab quia nostrud', 2, 'Maxime corporis exce', '1989-05-18', 'Dolorem qui esse qu', 75),
(8, '+1 (988) 487-8668', 'Quia vitae et soluta', 3, 'Rem officia ab autem', '1995-01-06', 'Ea dolor deleniti vo', 63);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `items`
--
ALTER TABLE `items`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `transactions`
--
ALTER TABLE `transactions`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `items`
--
ALTER TABLE `items`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `transactions`
--
ALTER TABLE `transactions`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
