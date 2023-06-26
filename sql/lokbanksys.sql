-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jun 26, 2023 at 08:40 PM
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
  `account_status` varchar(255) NOT NULL,
  `datetime` datetime NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

--
-- Dumping data for table `ac_holders`
--

INSERT INTO `ac_holders` (`id`, `account_no`, `ac_holder_name`, `ac_holder_current_balance`, `ac_holder_age`, `ac_type`, `ac_holder_img`, `ac_holder_c_address`, `ac_holder_p_address`, `account_status`, `datetime`) VALUES
(66, 'lokeshwarbank-66354225062023', 'Jhumur Roy', 0, '40', 'Savings Account', 'lokeshwarbank-66354225062023_main.jpeg', 'df', 'df', 'Account Closed', '2023-06-26 02:08:36'),
(67, 'lokeshwarbank-67724925062023', 'Jhumur Roy', 2500, '40', 'Savings Account', 'lokeshwarbank-67724925062023_main.jpeg', 'df', 'df', 'Account Closed', '2023-06-26 02:08:59'),
(72, 'lokeshwarbank-72971426062023', 'Sweety Vata', 2500, '40', 'Savings Account', 'lokeshwarbank-72971426062023_main.jpeg', 'Paikpara, Brahamanbaria', 'Paikpara, Brahamanbaria', '', '2023-06-26 23:35:21'),
(74, 'lokeshwarbank-73887926062023', 'Lokeshwar Deb', 520, '18', 'Savings Account', 'lokeshwarbank-73887926062023_main.jpeg', 'Paikpara, Brahamanbaria', 'Paikpara, Brahamanbaria', '', '2023-06-27 00:25:36');

-- --------------------------------------------------------

--
-- Table structure for table `ac_transactions`
--

CREATE TABLE `ac_transactions` (
  `id` int(11) NOT NULL,
  `account_no` varchar(255) NOT NULL,
  `transaction_info` varchar(255) NOT NULL,
  `requested_for_transaction` varchar(255) NOT NULL,
  `transaction_amount` varchar(255) NOT NULL,
  `last_balance_after_transaction` varchar(255) NOT NULL,
  `transaction_datetime` datetime NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

--
-- Dumping data for table `ac_transactions`
--

INSERT INTO `ac_transactions` (`id`, `account_no`, `transaction_info`, `requested_for_transaction`, `transaction_amount`, `last_balance_after_transaction`, `transaction_datetime`) VALUES
(2, 'lokeshwarbank-70951825062023', 'Starting account amount Cash-in', '', '500', '500', '2023-06-26 03:31:19'),
(3, 'lokeshwarbank-70951825062023', 'Starting account amount Cash-in', '', '', '', '2023-06-26 04:03:42'),
(4, 'lokeshwarbank-70951825062023', 'Starting account amount Cash-in', '', '500', '', '2023-06-26 04:05:11'),
(5, 'lokeshwarbank-70951825062023', 'Starting account amount Cash-in', '', '500', '3000', '2023-06-26 04:05:32'),
(6, 'lokeshwarbank-70951825062023', 'Starting account amount Cash-in', '', '500', '2500', '2023-06-26 04:06:03'),
(7, 'lokeshwarbank-70951825062023', 'Cash-out Transaction (get money)', '', '500', '2000', '2023-06-26 04:07:11'),
(8, 'lokeshwarbank-70951825062023', 'Cash-out Transaction (get money)', '', '500', '1500', '2023-06-26 04:10:06'),
(9, 'lokeshwarbank-70951825062023', 'Cash-out Transaction (get money)', '', '500', '1000', '2023-06-26 04:10:34'),
(10, 'lokeshwarbank-70951825062023', 'Cash-out Transaction (get money)', '', '500', '500', '2023-06-26 04:12:02'),
(11, 'lokeshwarbank-70951825062023', 'Cash-in Transaction (add money)', '', '500', '1000', '2023-06-26 04:12:32'),
(12, 'lokeshwarbank-70951825062023', 'Cash-in Transaction (add money)', '', '500', '1500', '2023-06-26 04:13:12'),
(13, 'lokeshwarbank-70951825062023', 'Cash-in Transaction (add money)', '', '500', '2000', '2023-06-26 04:13:36'),
(14, 'lokeshwarbank-70951825062023', 'Cash-in Transaction (add money)', '', '500', '2500', '2023-06-26 04:13:54'),
(17, 'lokeshwarbank-67724925062023', 'Cash-in Transaction (add money)', 'Lokeshwar Deb (owner)', '1500', '2500', '2023-06-26 12:52:34'),
(18, 'lokeshwarbank-70951825062023', 'Cash-out Transaction (get money)', 'Lokeshwar Deb (owner)', '5000', '', '2023-06-26 14:29:34'),
(19, 'lokeshwarbank-70951825062023', 'Cash-in Transaction (add money)', 'Lokeshwar Deb (owner)', '1000', '1000', '2023-06-26 14:30:32'),
(20, 'lokeshwarbank-70951825062023', 'Cash-out Transaction (get money)', 'Lokeshwar Deb (owner)', '50000', '', '2023-06-26 14:30:44'),
(21, 'lokeshwarbank-70951825062023', 'Cash-in Transaction (add money)', 'Lokeshwar Deb (owner)', '500', '500', '2023-06-26 14:31:27'),
(22, 'lokeshwarbank-70951825062023', 'Cash-out Transaction (get money)', 'Lokeshwar Deb (owner)', '5000', '', '2023-06-26 14:33:33'),
(23, 'lokeshwarbank-70951825062023', 'Cash-out Transaction (get money)', 'Lokeshwar Deb (owner)', '5000', '', '2023-06-26 14:33:45'),
(24, 'lokeshwarbank-70951825062023', 'Cash-out Transaction (get money)', 'Lokeshwar Deb (owner)', '50000', '', '2023-06-26 14:34:54'),
(25, 'lokeshwarbank-70951825062023', 'Cash-out Transaction (get money)', 'Lokeshwar Deb (owner)', '50000', '', '2023-06-26 14:42:07'),
(26, 'lokeshwarbank-70951825062023', 'Cash-out Transaction (get money)', 'Lokeshwar Deb (owner)', '50000', '', '2023-06-26 14:45:33'),
(27, 'lokeshwarbank-70951825062023', 'Cash-out Transaction (get money)', 'Lokeshwar Deb (owner)', '50000', '', '2023-06-26 14:49:41'),
(28, 'lokeshwarbank-70951825062023', 'Cash-out Transaction (get money)', 'Lokeshwar Deb (owner)', '50000', '', '2023-06-26 14:50:04'),
(29, 'lokeshwarbank-70951825062023', 'Cash-out Transaction (get money)', 'Lokeshwar Deb (owner)', '50000', '', '2023-06-26 14:50:29'),
(30, 'lokeshwarbank-70951825062023', 'Cash-out Transaction (get money)', 'Lokeshwar Deb (owner)', '50000', '50000', '2023-06-26 14:50:44'),
(31, 'lokeshwarbank-70951825062023', 'Cash-out Transaction (get money)', 'Lokeshwar Deb (owner)', '100', '100', '2023-06-26 14:53:06'),
(32, 'lokeshwarbank-70951825062023', 'Cash-in Transaction (add money)', 'Lokeshwar Deb (owner)', '200', '200', '2023-06-26 14:54:29'),
(33, 'lokeshwarbank-70951825062023', 'Cash-in Transaction (add money)', 'Lokeshwar Deb (owner)', '200', '200', '2023-06-26 14:55:46'),
(34, 'lokeshwarbank-70951825062023', 'Cash-in Transaction (add money)', 'Lokeshwar Deb (owner)', '100', '100', '2023-06-26 14:55:55'),
(35, 'lokeshwarbank-70951825062023', 'Cash-in Transaction (add money)', 'Lokeshwar Deb (owner)', '100', '100', '2023-06-26 14:56:13'),
(36, 'lokeshwarbank-70951825062023', 'Cash-in Transaction (add money)', 'Lokeshwar Deb (owner)', '100', '100', '2023-06-26 14:56:15'),
(37, 'lokeshwarbank-70951825062023', 'Cash-in Transaction (add money)', 'Lokeshwar Deb (owner)', '100', '100', '2023-06-26 15:00:04'),
(38, 'lokeshwarbank-70951825062023', 'Cash-in Transaction (add money)', 'Lokeshwar Deb (owner)', '100', '100', '2023-06-26 15:00:53'),
(39, 'lokeshwarbank-70951825062023', 'Cash-in Transaction (add money)', 'Lokeshwar Deb (owner)', '100', '100', '2023-06-26 15:01:08'),
(40, 'lokeshwarbank-70951825062023', 'Cash-in Transaction (add money)', 'Lokeshwar Deb (owner)', '100', '100', '2023-06-26 15:01:45'),
(41, 'lokeshwarbank-70951825062023', 'Cash-in Transaction (add money)', 'Lokeshwar Deb (owner)', '100', '100', '2023-06-26 15:02:25'),
(42, 'lokeshwarbank-70951825062023', 'Cash-in Transaction (add money)', 'Lokeshwar Deb (owner)', '100', '100', '2023-06-26 15:03:56'),
(43, 'lokeshwarbank-70951825062023', 'Cash-in Transaction (add money)', 'Lokeshwar Deb (owner)', '100', '100', '2023-06-26 15:03:56'),
(44, 'lokeshwarbank-70951825062023', 'Cash-in Transaction (add money)', 'Lokeshwar Deb (owner)', '2500', '2500', '2023-06-26 15:05:06'),
(45, 'lokeshwarbank-70951825062023', 'Cash-in Transaction (add money)', 'Lokeshwar Deb (owner)', '100', '100', '2023-06-26 15:06:01'),
(46, 'lokeshwarbank-70951825062023', 'Cash-out Transaction (get money)', 'Lokeshwar Deb (owner)', '2000', '2000', '2023-06-26 15:07:24'),
(47, 'lokeshwarbank-70951825062023', 'Cash-in Transaction (add money)', 'Lokeshwar Deb (owner)', '100', '2500', '2023-06-26 15:10:00'),
(48, 'lokeshwarbank-70951825062023', 'Cash-out Transaction (get money)', 'Lokeshwar Deb (owner)', '1500', '1000', '2023-06-26 17:44:52'),
(49, 'lokeshwarbank-70951825062023', 'Cash-in Transaction (add money)', 'Lokeshwar Deb (owner)', '5000', '6000', '2023-06-26 17:49:30'),
(50, 'lokeshwarbank-72971426062023', 'Starting account amount Cash-in', '', '2500', '2500', '2023-06-26 23:35:21'),
(51, 'lokeshwarbank-72971426062023', 'Cash-out Transaction (get money)', 'Sweety Vata (owner) (বাপ্পিকে দিয়েছি ভাতার থেকে)1st vata', '500', '2000', '2023-06-26 23:50:23'),
(52, 'lokeshwarbank-72971426062023', 'Cash-out Transaction (get money)', 'Sweety Vata (owner) (নুপুরকে দিয়েছি ভাতার থেকে)1st vata', '500', '1500', '2023-06-26 23:50:49'),
(53, 'lokeshwarbank-72971426062023', 'Cash-out Transaction (get money)', 'Sweety Vata (owner) (আমরা মুরগি খেয়েছি ভাতার থেকে)1st vata', '500', '1000', '2023-06-26 23:51:38'),
(54, 'lokeshwarbank-72971426062023', 'Cash-out Transaction (get money)', 'Sweety Vata (owner) (আমরা ঔষধ খেয়েছি ভাতার থেকে)1st vata', '1000', '0', '2023-06-26 23:57:30'),
(55, 'lokeshwarbank-72971426062023', 'Cash-in Transaction (add money)', 'Sweety Vata (owner) (২বার ভাতা পেয়েছি - ২০/৬/২০২৩ ইং)', '2500', '2500', '2023-06-27 00:09:34'),
(56, 'lokeshwarbank-73887926062023', 'Starting account amount Cash-in', '', '500', '500', '2023-06-27 00:25:36'),
(57, 'lokeshwarbank-73887926062023', 'Cash-in Transaction (add money)', 'Lokeshwar Deb (owner)', '20', '520', '2023-06-27 00:26:15');

-- --------------------------------------------------------

--
-- Table structure for table `admin_users`
--

CREATE TABLE `admin_users` (
  `id` int(11) NOT NULL,
  `admin_username` varchar(255) NOT NULL,
  `admin_ac_holder_age` varchar(255) NOT NULL,
  `admin_password` varchar(255) NOT NULL,
  `admin_email` varchar(255) NOT NULL,
  `admin_ac_holder_img` varchar(255) NOT NULL,
  `admin_ac_holder_c_address` varchar(255) NOT NULL,
  `admin_ac_holder_p_address` varchar(255) NOT NULL,
  `datetime` datetime NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

--
-- Dumping data for table `admin_users`
--

INSERT INTO `admin_users` (`id`, `admin_username`, `admin_ac_holder_age`, `admin_password`, `admin_email`, `admin_ac_holder_img`, `admin_ac_holder_c_address`, `admin_ac_holder_p_address`, `datetime`) VALUES
(1, 'ff', '', 'dd', '', '', '', '', '2023-06-26 13:17:41'),
(6, 'Lokeshwar Deb', '18', '$2y$10$NKYnQ81pKE2lGZa1/7TTC.WOuNeauHdy8FmFyfkUeQTi4VMVnzVFm', 'daviddeb8479@gmail.com', '1687796890_admin.jpeg', 'Bangladesh', 'b', '2023-06-26 22:28:10'),
(7, 'Lipi Roy', '40', '$2y$10$lBDiT2L6BrFOVX0VsISUo.8JWBcAlT0ArnQSj/cj/y5V4gtP/sU/m', 'daviddeb8479@gmail.com', '1687801598_admin.jpeg', 'Bangladesh', 'd', '2023-06-26 23:46:38');

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
-- Indexes for table `admin_users`
--
ALTER TABLE `admin_users`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `ac_holders`
--
ALTER TABLE `ac_holders`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=75;

--
-- AUTO_INCREMENT for table `ac_transactions`
--
ALTER TABLE `ac_transactions`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=58;

--
-- AUTO_INCREMENT for table `admin_users`
--
ALTER TABLE `admin_users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
