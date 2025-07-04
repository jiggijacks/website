-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3306
-- Generation Time: Jun 26, 2024 at 11:10 AM
-- Server version: 10.11.8-MariaDB
-- PHP Version: 8.1.28

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `webtechscom_ParecalPro`
--

-- --------------------------------------------------------

--
-- Table structure for table `admin`
--

CREATE TABLE `admin` (
  `id` int(11) NOT NULL,
  `username` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `admin`
--

INSERT INTO `admin` (`id`, `username`, `password`) VALUES
(1, 'admin', '123456');

-- --------------------------------------------------------

--
-- Table structure for table `settings`
--

CREATE TABLE `settings` (
  `id` int(11) NOT NULL,
  `sitename` varchar(255) NOT NULL,
  `site_title` varchar(255) NOT NULL,
  `site_url` varchar(255) NOT NULL,
  `mailhost` varchar(255) NOT NULL,
  `webmail` varchar(255) NOT NULL,
  `mailpassword` varchar(255) NOT NULL,
  `mailport` varchar(255) NOT NULL,
  `mailsmtpsecure` varchar(255) NOT NULL,
  `track_prefix` varchar(255) NOT NULL,
  `track_num` varchar(255) NOT NULL,
  `invoice_terms` text NOT NULL,
  `allow_print` enum('Yes','No','','') NOT NULL,
  `show_map` enum('Yes','No','','') NOT NULL,
  `email_name` varchar(255) NOT NULL,
  `mail_track_update` enum('Yes','No','','') NOT NULL,
  `mail_track_save` enum('Yes','No','','') NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `settings`
--

INSERT INTO `settings` (`id`, `sitename`, `site_title`, `site_url`, `mailhost`, `webmail`, `mailpassword`, `mailport`, `mailsmtpsecure`, `track_prefix`, `track_num`, `invoice_terms`, `allow_print`, `show_map`, `email_name`, `mail_track_update`, `mail_track_save`) VALUES
(1, 'Parcal Pro', 'Parcal Pro', 'https://webtechs.com.ng/parecal-pro', 'webtechs.com.ng', 'support@webtechs.com.ng', '@@mailpass##', '465', 'ssl', 'PP', '8', 'For your convenience we have Parcal Pro several payment reliable, fast, secure.', 'Yes', 'Yes', 'parcalpro@gmailcom', 'Yes', 'Yes');

-- --------------------------------------------------------

--
-- Table structure for table `tracking`
--

CREATE TABLE `tracking` (
  `id` int(11) NOT NULL,
  `tracking_number` varchar(255) NOT NULL,
  `sender_name` varchar(255) NOT NULL,
  `sender_contact` varchar(255) NOT NULL,
  `sender_email` varchar(255) NOT NULL,
  `sender_address` varchar(255) NOT NULL,
  `status` varchar(255) NOT NULL,
  `dispatch_location` varchar(255) NOT NULL,
  `receiver_email` varchar(255) NOT NULL,
  `receiver_name` varchar(255) NOT NULL,
  `receiver_contact` varchar(255) NOT NULL,
  `receiver_address` varchar(255) NOT NULL,
  `dispatch_date` varchar(255) NOT NULL,
  `delivery_date` varchar(255) NOT NULL,
  `pdesc` varchar(255) NOT NULL,
  `destination` varchar(255) NOT NULL,
  `current_location` varchar(255) DEFAULT NULL,
  `carrier` varchar(255) NOT NULL,
  `carrier_ref` varchar(255) NOT NULL,
  `ship_mode` varchar(255) NOT NULL,
  `weight` varchar(255) NOT NULL,
  `quantity` varchar(255) NOT NULL,
  `payment_mode` varchar(255) NOT NULL,
  `image` varchar(255) NOT NULL,
  `travel_progress` varchar(255) NOT NULL,
  `delivery_time` varchar(255) NOT NULL,
  `date` datetime NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `tracking`
--

INSERT INTO `tracking` (`id`, `tracking_number`, `sender_name`, `sender_contact`, `sender_email`, `sender_address`, `status`, `dispatch_location`, `receiver_email`, `receiver_name`, `receiver_contact`, `receiver_address`, `dispatch_date`, `delivery_date`, `pdesc`, `destination`, `current_location`, `carrier`, `carrier_ref`, `ship_mode`, `weight`, `quantity`, `payment_mode`, `image`, `travel_progress`, `delivery_time`, `date`) VALUES
(10, '12345690', 'mark smith', '+235346347347', 'mark@gmail.com', 'Headley Rd Hindhead Surrey uk', 'Pending', 'Headley Rd Hindhead Surrey uk', 'funds12095@gmail.com', 'james owen', '+23377568934', 'Headley Rd Hindhead Surrey uk', '2024-06-08', '2024-06-14', 'a shoe', 'Headley Rd Hindhead Surrey uk', 'london uk', 'DHL', '4363446', 'air', '5kg', '4', 'cash', 'PP-06-823150.png', '50', '08:35', '2024-06-07 08:31:19'),
(11, 'PP-06-59327468', 'Kate Smith', '23423423', 'mike@gmail.com', 'lagos', 'Active', 'london uk', 'funds12095@gmail.com', 'delight', '2423242242', 'lagos', '2024-06-17', '2024-06-22', 'computer set up', 'Italy', 'Nigeria', 'DHL', '12', 'air', '12', '5', 'cash', 'PP-06-59327468.png', '60', '21:20', '2024-06-13 16:20:48'),
(12, 'PP-06-42710685', 'don', '+1234592350905', 'mike@gmail.com', 'lagos', 'Picked Up', 'london uk', 'fred200512128@gmail.com', 'funds', 'funds', 'lagos', '2024-06-02', '2024-05-30', 'computer set up', 'Italy', NULL, 'DHL', '12', 'air', '10kg', '5', 'cash', 'PP-06-42710685.png', '20', '20:36', '2024-06-13 16:36:17'),
(16, '1234567890', 'John Roland', '+324523452345', 'ombryte@gmail.com', '34 Ray avenue', 'Active', 'Chicago', 'brytedree@gmail.com', 'Sarah Williams', '+45345345467', '4 st john road', '2024-06-25', '2024-07-06', 'A black vault', 'New york', 'paris', 'DHL', 'RT44544', 'Air', '44Kg', '1', 'Cheque', 'PP-06-14573892.png', '40', '12:03', '2024-06-23 05:52:24');

-- --------------------------------------------------------

--
-- Table structure for table `track_update`
--

CREATE TABLE `track_update` (
  `id` int(11) NOT NULL,
  `track_num` varchar(255) NOT NULL,
  `status` varchar(255) NOT NULL,
  `date` varchar(255) NOT NULL,
  `time` varchar(255) NOT NULL,
  `note` varchar(255) NOT NULL,
  `current_location` varchar(255) NOT NULL,
  `updated_at` datetime NOT NULL DEFAULT current_timestamp(),
  `shiping_cost` varchar(255) NOT NULL DEFAULT '0',
  `clearance_cost` varchar(255) NOT NULL DEFAULT '0',
  `travel_progress` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `track_update`
--

INSERT INTO `track_update` (`id`, `track_num`, `status`, `date`, `time`, `note`, `current_location`, `updated_at`, `shiping_cost`, `clearance_cost`, `travel_progress`) VALUES
(20, 'PR-06-342719', 'Pending', '2024-06-20', '21:26', 'sdsf', '12312', '2024-06-06 21:22:34', '12', '12', ''),
(21, 'PR-06-342719', 'Active', '2024-06-15', '22:19', 'on the way to you', 'london uk', '2024-06-06 22:16:37', '10', '20', ''),
(22, 'PR-06-342719', 'On hold', '2024-06-13', '22:26', 'You package on currently on hold by the FBI', 'london uk', '2024-06-06 22:23:59', '20', '5', ''),
(23, 'PR-06-342719', 'Picked Up', '2024-06-19', '22:30', 'you package by the carrier', 'Italy', '2024-06-06 22:32:03', '10', '25', ''),
(24, 'PR-06-426193', 'Active', '2024-06-29', '13:34', 'on the way', 'london uk', '2024-06-06 22:34:18', '12', '20', '40'),
(25, 'PR-06-426193', 'Picked Up', '2024-06-21', '22:43', 'pick up by DHL', 'Italy', '2024-06-06 22:39:37', '30', '40', '40'),
(26, 'PR-06-426193', 'Arrived', '2024-06-13', '12:44', 'arrived country', 'Nigeria', '2024-06-06 22:44:27', '4', '3', '40'),
(27, 'PR-06-426193', 'Picked Up', '2024-06-19', '07:23', 'pick up  by DHL', 'london uk', '2024-06-07 07:20:41', '12', '12', '40'),
(28, 'PP-06-839657', 'Inactive', '2024-06-10', '07:53', 'on the way', 'london uk', '2024-06-07 07:49:42', '20', '40', '60'),
(29, 'PP-06-839657', 'Arrived', '2024-06-20', '07:53', 'on the way', 'london uk', '2024-06-07 07:53:49', '20', '30', '10'),
(30, 'PP-06-823150', 'Active', '2024-06-07', '08:35', 'product is active now ready to be shipped', 'uk', '2024-06-07 08:33:43', '12', '2', '20'),
(31, 'PP-06-823150', 'Pending', '2024-06-20', '10:26', 'on the way', 'london uk', '2024-06-10 10:23:35', '10', '5', '50'),
(32, 'PP-06-59327468', 'On hold', '2024-06-20', '16:26', 'your package is on hold', 'london uk', '2024-06-13 16:24:15', '10', '12', '40'),
(33, 'PP-06-59327468', 'Active', '2024-06-14', '16:36', 'you package is active now', 'Nigeria', '2024-06-13 16:34:31', '30', '12', '60'),
(34, '1234567890', 'Active', '2024-07-30', '02:04', 'Being held by custom', 'paris', '2024-06-24 07:15:28', '200', '20', '40');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admin`
--
ALTER TABLE `admin`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `settings`
--
ALTER TABLE `settings`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tracking`
--
ALTER TABLE `tracking`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `track_update`
--
ALTER TABLE `track_update`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `admin`
--
ALTER TABLE `admin`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `settings`
--
ALTER TABLE `settings`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `tracking`
--
ALTER TABLE `tracking`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;

--
-- AUTO_INCREMENT for table `track_update`
--
ALTER TABLE `track_update`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=35;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
