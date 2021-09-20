-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Sep 20, 2021 at 07:37 PM
-- Server version: 10.4.19-MariaDB
-- PHP Version: 8.0.7

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `sekani_db`
--

-- --------------------------------------------------------

--
-- Table structure for table `transactions_tb`
--

CREATE TABLE `transactions_tb` (
  `id` bigint(20) NOT NULL,
  `user_account_no` varchar(10) NOT NULL,
  `amount` decimal(15,2) NOT NULL,
  `transaction_type` varchar(7) NOT NULL,
  `transaction_date` datetime NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `transactions_tb`
--

INSERT INTO `transactions_tb` (`id`, `user_account_no`, `amount`, `transaction_type`, `transaction_date`) VALUES
(1, '9012899463', '300.00', 'Credit', '2021-09-20 13:38:09'),
(2, '9012899463', '5000.00', 'Credit', '2021-09-20 13:38:09'),
(3, '9012899463', '250.00', 'Debit', '2021-09-20 13:38:35'),
(4, '9012899423', '3000.00', 'Credit', '2021-09-20 14:11:49'),
(5, '9012899423', '500.00', 'Credit', '2021-09-20 15:38:54'),
(6, '9012899423', '6000.00', 'Debit', '2021-09-20 15:41:01'),
(7, '9012899423', '3000.00', 'Credit', '2021-09-20 15:49:48'),
(8, '9012899423', '1000.00', 'Credit', '2021-09-20 18:12:16');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `transactions_tb`
--
ALTER TABLE `transactions_tb`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `transactions_tb`
--
ALTER TABLE `transactions_tb`
  MODIFY `id` bigint(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
