-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jun 26, 2023 at 12:15 AM
-- Server version: 10.4.27-MariaDB
-- PHP Version: 8.2.0

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `lokbanksys`
--

-- --------------------------------------------------------

--
-- Table structure for table `ac_holders`
--

CREATE TABLE `ac_holders` (
  `id` int(11) NOT NULL,
  `account_no` varchar(255) NOT NULL,
  `ac_holder_name` varchar(255) NOT NULL,
  `ac_holder_current_balance` int(255) NOT NULL,
  `ac_holder_age` varchar(255) NOT NULL,
  `ac_type` varchar(255) NOT NULL,
  `ac_holder_img` varchar(255) NOT NULL,
  `ac_holder_c_address` varchar(255) NOT NULL,
  `ac_holder_p_address` varchar(255) NOT NULL,
  `datetime` datetime NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

--
-- Dumping data for table `ac_holders`
--

INSERT INTO `ac_holders` (`id`, `account_no`, `ac_holder_name`, `ac_holder_current_balance`, `ac_holder_age`, `ac_type`, `ac_holder_img`, `ac_holder_c_address`, `ac_holder_p_address`, `datetime`) VALUES
(66, 'lokeshwarbank-66354225062023', 'Jhumur Roy', 0, '40', 'Savings Account', 'lokeshwarbank-66354225062023_main.jpeg', 'df', 'df', '2023-06-26 02:08:36'),
(67, 'lokeshwarbank-67724925062023', 'Jhumur Roy', 0, '40', 'Savings Account', 'lokeshwarbank-67724925062023_main.jpeg', 'df', 'df', '2023-06-26 02:08:59'),
(70, 'lokeshwarbank-70951825062023', 'Lokeshwar Deb', 2500, '18', 'Savings Account', 'lokeshwarbank-70951825062023_main.jpeg', 'Paikpara, Brahamanbaria', 'Paikpara, Brahamanbaria', '2023-06-26 03:31:19');

-- --------------------------------------------------------

--
-- Table structure for table `ac_transactions`
--

CREATE TABLE `ac_transactions` (
  `id` int(11) NOT NULL,
  `account_no` varchar(255) NOT NULL,
  `transaction_info` varchar(255) NOT NULL,
  `transaction_amount` varchar(255) NOT NULL,
  `last_balance_after_transaction` varchar(255) NOT NULL,
  `transaction_datetime` datetime NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

--
-- Dumping data for table `ac_transactions`
--

INSERT INTO `ac_transactions` (`id`, `account_no`, `transaction_info`, `transaction_amount`, `last_balance_after_transaction`, `transaction_datetime`) VALUES
(2, 'lokeshwarbank-70951825062023', 'Starting account amount Cash-in', '500', '500', '2023-06-26 03:31:19'),
(3, 'lokeshwarbank-70951825062023', 'Starting account amount Cash-in', '', '', '2023-06-26 04:03:42'),
(4, 'lokeshwarbank-70951825062023', 'Starting account amount Cash-in', '500', '', '2023-06-26 04:05:11'),
(5, 'lokeshwarbank-70951825062023', 'Starting account amount Cash-in', '500', '3000', '2023-06-26 04:05:32'),
(6, 'lokeshwarbank-70951825062023', 'Starting account amount Cash-in', '500', '2500', '2023-06-26 04:06:03'),
(7, 'lokeshwarbank-70951825062023', 'Cash-out Transaction (get money)', '500', '2000', '2023-06-26 04:07:11'),
(8, 'lokeshwarbank-70951825062023', 'Cash-out Transaction (get money)', '500', '1500', '2023-06-26 04:10:06'),
(9, 'lokeshwarbank-70951825062023', 'Cash-out Transaction (get money)', '500', '1000', '2023-06-26 04:10:34'),
(10, 'lokeshwarbank-70951825062023', 'Cash-out Transaction (get money)', '500', '500', '2023-06-26 04:12:02'),
(11, 'lokeshwarbank-70951825062023', 'Cash-in Transaction (add money)', '500', '1000', '2023-06-26 04:12:32'),
(12, 'lokeshwarbank-70951825062023', 'Cash-in Transaction (add money)', '500', '1500', '2023-06-26 04:13:12'),
(13, 'lokeshwarbank-70951825062023', 'Cash-in Transaction (add money)', '500', '2000', '2023-06-26 04:13:36'),
(14, 'lokeshwarbank-70951825062023', 'Cash-in Transaction (add money)', '500', '2500', '2023-06-26 04:13:54');

-- --------------------------------------------------------

--
-- Table structure for table `admin_users`
--

CREATE TABLE `admin_users` (
  `id` int(11) NOT NULL,
  `admin_username` varchar(255) NOT NULL,
  `admin_password` varchar(255) NOT NULL,
  `datetime` datetime NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `ac_holders`
--
ALTER TABLE `ac_holders`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `ac_transactions`
--
ALTER TABLE `ac_transactions`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `ac_holders`
--
ALTER TABLE `ac_holders`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=71;

--
-- AUTO_INCREMENT for table `ac_transactions`
--
ALTER TABLE `ac_transactions`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
