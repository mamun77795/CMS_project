-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Oct 05, 2023 at 09:59 AM
-- Server version: 10.4.28-MariaDB
-- PHP Version: 8.2.4

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `new_elite`
--

-- --------------------------------------------------------

--
-- Table structure for table `blood_groups`
--

CREATE TABLE `blood_groups` (
  `id` int(11) DEFAULT NULL,
  `name` varchar(50) DEFAULT NULL,
  `created_at` datetime DEFAULT NULL,
  `updated_at` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `blood_groups`
--

INSERT INTO `blood_groups` (`id`, `name`, `created_at`, `updated_at`) VALUES
(1, 'A+', NULL, NULL),
(2, 'A-', NULL, NULL),
(3, 'B+', NULL, NULL),
(4, 'B-', NULL, NULL),
(5, 'AB+', NULL, NULL),
(6, 'AB-', NULL, NULL),
(7, 'O+', NULL, NULL),
(8, 'O-', NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `customers`
--

CREATE TABLE `customers` (
  `id` int(11) NOT NULL,
  `first_name` varchar(50) NOT NULL DEFAULT '',
  `last_name` varchar(50) NOT NULL DEFAULT '',
  `email` varchar(50) NOT NULL DEFAULT '',
  `phone` varchar(50) NOT NULL DEFAULT '',
  `street` varchar(50) NOT NULL DEFAULT '',
  `thana_id` varchar(50) NOT NULL DEFAULT '',
  `district_id` varchar(50) NOT NULL DEFAULT '',
  `post_code` varchar(50) NOT NULL DEFAULT '',
  `blood_group_id` varchar(50) NOT NULL DEFAULT '',
  `date_of_birth` date DEFAULT NULL,
  `marriage_date` date DEFAULT NULL,
  `spouse_name` varchar(50) DEFAULT '',
  `children` varchar(50) DEFAULT '',
  `reference` varchar(50) NOT NULL DEFAULT '',
  `created_by` varchar(50) NOT NULL DEFAULT '',
  `updated_by` varchar(50) NOT NULL DEFAULT '',
  `deleted_by` varchar(50) DEFAULT NULL,
  `created_at` datetime DEFAULT NULL,
  `updated_at` datetime DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `customers`
--

INSERT INTO `customers` (`id`, `first_name`, `last_name`, `email`, `phone`, `street`, `thana_id`, `district_id`, `post_code`, `blood_group_id`, `date_of_birth`, `marriage_date`, `spouse_name`, `children`, `reference`, `created_by`, `updated_by`, `deleted_by`, `created_at`, `updated_at`, `deleted_at`) VALUES
(1, 'Mizanur', 'Rahman', 'robir897@gmail.com', '01955310337', 'DIT Road', '1', '1', '1219', '1', '1997-02-06', '2023-12-01', 'Anita', '2', 'Chattagram Club', '', 'Name: Mizanur Rahman, Email: mizan@gmail.com', 'mizan@gmail.com', '2023-08-23 12:20:14', '2023-09-17 10:30:04', NULL),
(3, 'Shamim', 'Ahmed', 'somriddhi@elitepaint.com.bd', '01813907384', 'DIT Road', '1', '1', '1219', '2', '1995-02-05', '2024-12-12', 'Muna', '2', 'Dhaka Club', '', 'Name: Mizanur Rahman, Email: mizan@gmail.com', 'mizan@gmail.com', '2023-08-23 10:44:08', '2023-09-17 10:26:57', NULL),
(4, 'Laravel php', 'Program', 'robir897@gmail.com', '01521108830', 'DIT Project', '146', '17', '1219', '7', '1994-02-05', '2021-03-01', 'NA', 'NA', 'Chattagram Club', '', 'Name: Mizanur Rahman, Email: mizan@gmail.com', 'mizan@gmail.com', '2023-08-24 06:19:53', '2023-09-17 10:32:19', NULL),
(5, 'Mizanur', 'Rahman', 'robir897@gmail.com', '', 'DIT Road', '1', '1', '1219', '4', '0000-00-00', '0000-00-00', '', '', 'Others', '', 'Name: Mizanur Rahman, Email: mizan@gmail.com', NULL, '2023-08-29 09:58:34', '2023-08-30 09:34:28', NULL),
(6, 'Nafiul', 'Islam', 'robir897@gmail.com', '01955310337', 'DIT Road', '1', '1', '1219', '5', '1996-02-05', '2019-06-03', 'Mina', '2', 'Others', '', 'Name: Mizanur Rahman, Email: mizan@gmail.com', NULL, '2023-08-29 09:58:34', '2023-09-17 10:28:27', NULL),
(7, 'Laravel php', 'Program', 'mamun77795@gmail.com', '01521108830', 'DIT Project', '146', '17', '1212', '2', '1994-05-10', '2020-08-01', 'Rima', '3', 'Chattagram Club', '', 'Name: Mizanur Rahman, Email: mizan@gmail.com', 'mizan@gmail.com', '2023-08-29 09:58:34', '2023-09-18 04:07:08', NULL),
(8, 'Mizanur', 'Rahman', 'robir897@gmail.com', '', 'DIT Road', '1', '1', '1219', '3', '0000-00-00', '0000-00-00', '', '', 'Others', '', 'Name: Mizanur Rahman, Email: mizan@gmail.com', NULL, '2023-08-29 09:59:51', '2023-08-30 09:34:49', NULL),
(9, 'Nafiul', 'Islam', 'robir897@gmail.com', '01955310337', 'DIT Road', '1', '1', '1219', '5', '1993-01-02', '2020-01-01', 'Shaila', '5', 'Others', '', 'Name: Mizanur Rahman, Email: mizan@gmail.com', NULL, '2023-08-29 09:59:51', '2023-09-17 10:25:38', NULL),
(11, 'Mizanur', 'Rahman', 'robir897@gmail.com', '01521108830', 'DIT Road', '1', '1', '1219', '3', '0000-00-00', '0000-00-00', '', '', 'Others', '', 'Name: Mizanur Rahman, Email: mizan@gmail.com', NULL, '2023-08-30 06:44:49', '2023-09-04 03:43:49', NULL),
(12, 'Laravel php', 'Program', 'somriddhi@elitepaint.com.bd', '01813907384', 'DIT Project', '21', '1', '1219', '1', '1992-06-03', '2019-05-02', 'NA', 'NA', 'Others', '', 'Name: Mizanur Rahman, Email: mizan@gmail.com', NULL, '2023-08-30 06:44:49', '2023-09-18 04:21:08', NULL),
(13, 'Mizanur', 'Rahman', 'mamun77795@gmail.com', '01826985970', 'DIT Road', '1', '1', '1219', '1', '1994-02-05', '2023-12-31', NULL, NULL, 'Others', '', 'Name: Mizanur Rahman, Email: mizan@gmail.com', NULL, '2023-08-30 06:44:49', '2023-09-18 04:36:46', NULL),
(21, 'Mahmudun', 'Nabi', 'somriddhi@elitepaint.com.bd', '01813907384', 'Khilgaon', '1', '1', '1219', '5', '1994-02-05', '1970-01-01', 'NA', 'NA', 'Client', 'Name: Mizanur Rahman, Email: mizan@gmail.com', 'Name: Mizanur Rahman, Email: mizan@gmail.com', NULL, '2023-09-10 09:36:54', '2023-09-17 10:33:33', NULL),
(22, 'Tariqul', 'Islam', 'mamun77795@gmail.com', '01521108830', 'Banasree, Block-C', '21', '1', '1219', '7', '1994-09-17', '2020-09-17', 'NA', 'NA', 'Others', 'Name: Mizanur Rahman, Email: mizan@gmail.com', 'Name: Mizanur Rahman, Email: mizan@gmail.com', NULL, '2023-09-17 04:09:38', '2023-09-17 05:35:32', NULL),
(23, 'Rownak', 'Hossain', 'rownak@gmail.com', '01813907384', 'Jomidar Lane', '21', '1', '1219', '7', '1994-02-05', '2025-06-18', 'Rinita', '2', 'Dhaka Club', 'Name: Mizanur Rahman, Email: mizan@gmail.com', 'Name: Mizanur Rahman, Email: mizan@gmail.com', NULL, '2023-10-05 06:50:38', '2023-10-05 06:53:22', NULL);

-- --------------------------------------------------------

--
-- Stand-in structure for view `customer_view`
-- (See below for the actual view)
--
CREATE TABLE `customer_view` (
`id` int(11)
,`first_name` varchar(50)
,`last_name` varchar(50)
,`email` varchar(50)
,`phone` varchar(50)
,`street` varchar(50)
,`district` varchar(255)
,`thana` varchar(255)
,`post_code` varchar(50)
,`blood_group` varchar(50)
,`date_of_birth` date
,`marriage_date` date
,`spouse_name` varchar(50)
,`children` varchar(50)
,`reference` varchar(50)
,`created_by` varchar(50)
,`created_at` datetime
,`district_id` varchar(50)
,`thana_id` varchar(50)
,`blood_group_id` varchar(50)
);

-- --------------------------------------------------------

--
-- Table structure for table `districts`
--

CREATE TABLE `districts` (
  `id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `division_id` int(11) NOT NULL,
  `created_at` datetime NOT NULL,
  `updated_at` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `districts`
--

INSERT INTO `districts` (`id`, `name`, `division_id`, `created_at`, `updated_at`) VALUES
(1, 'Dhaka', 1, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(2, 'Faridpur', 1, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(3, 'Gazipur', 1, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(4, 'Gopalganj', 1, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(5, 'Kishoreganj', 1, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(6, 'Madaripur', 1, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(7, 'Manikganj', 1, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(8, 'Munshiganj', 1, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(9, 'Narayanganj', 1, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(10, 'Narsingdi', 1, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(11, 'Rajbari', 1, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(12, 'Shariatpur', 1, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(13, 'Tangail', 1, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(14, 'Bandarban', 2, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(15, 'Brahmanbaria', 2, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(16, 'Chandpur', 2, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(17, 'Chittagong', 2, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(18, 'Comilla', 2, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(19, 'Cox\'s Bazar', 2, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(20, 'Feni', 2, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(21, 'Khagrachhari', 2, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(22, 'Lakshmipur', 2, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(23, 'Noakhali', 2, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(24, 'Rangamati', 2, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(25, 'Bogra', 3, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(26, 'Joypurhat', 3, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(27, 'Naogaon', 3, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(28, 'Natore', 3, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(29, 'Nawabganj', 3, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(30, 'Pabna', 3, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(31, 'Rajshahi', 3, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(32, 'Sirajganj', 3, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(33, 'Bagerhat', 4, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(34, 'Chuadanga', 4, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(35, 'Jessore', 4, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(36, 'Jhenaidaha', 4, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(37, 'Khulna', 4, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(38, 'Kushtia', 4, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(39, 'Magura', 4, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(40, 'Meherpur', 4, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(41, 'Narail', 4, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(42, 'Satkhira', 4, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(43, 'Barguna', 5, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(44, 'Barisal', 5, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(45, 'Bhola', 5, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(46, 'Jhalokati', 5, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(47, 'Patuakhali', 5, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(48, 'Pirojpur', 5, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(49, 'Habiganj', 6, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(50, 'Maulvi Bazar', 6, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(51, 'Sunamganj', 6, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(52, 'Sylhet', 6, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(53, 'Dinajpur', 7, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(54, 'Gaibandha', 7, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(55, 'Kurigram', 7, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(56, 'Lalmonirhat', 7, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(57, 'Nilphamari', 7, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(58, 'Panchagarh', 7, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(59, 'Rangpur', 7, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(60, 'Thakurgaon', 7, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(61, 'Mymensingh', 8, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(62, 'Jamalpur', 8, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(63, 'Netrokona', 8, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(64, 'Sherpur', 8, '0000-00-00 00:00:00', '0000-00-00 00:00:00');

-- --------------------------------------------------------

--
-- Table structure for table `divisions`
--

CREATE TABLE `divisions` (
  `id` int(11) NOT NULL,
  `name` varchar(50) NOT NULL,
  `created_at` datetime NOT NULL,
  `updated_at` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `divisions`
--

INSERT INTO `divisions` (`id`, `name`, `created_at`, `updated_at`) VALUES
(1, 'Dhaka', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(2, 'Chattogram', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(3, 'Rajshahi', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(4, 'Khulna', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(5, 'Barishal', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(6, 'Sylhet', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(7, 'Rangpur', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(8, 'Mymensingh', '0000-00-00 00:00:00', '0000-00-00 00:00:00');

-- --------------------------------------------------------

--
-- Table structure for table `mails`
--

CREATE TABLE `mails` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `heading` varchar(255) NOT NULL,
  `body` longtext NOT NULL,
  `attachement` varchar(255) DEFAULT NULL,
  `total_mail` varchar(255) DEFAULT NULL,
  `sent_mail` varchar(255) DEFAULT NULL,
  `failed_mail` varchar(255) DEFAULT NULL,
  `failed_person_id` varchar(255) DEFAULT NULL,
  `sender` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `mails`
--

INSERT INTO `mails` (`id`, `heading`, `body`, `attachement`, `total_mail`, `sent_mail`, `failed_mail`, `failed_person_id`, `sender`, `created_at`, `updated_at`) VALUES
(24, 'again subject here', 'description are here', '1694683313.jpeg', '2', '2', '0', '0', 'mizan@gmail.com', '2023-09-14 03:21:53', '2023-09-14 03:21:53'),
(25, 'Birthday Wish', 'Happy Birthday dear client.', '1694944403.jpg', '1', '1', '0', '0', 'mizan@gmail.com', '2023-09-17 03:53:23', '2023-09-17 03:53:23'),
(26, 'Meeting Request for Project Discussion', 'Dear [Recipient\'s Name],\r\n\r\nI trust this email finds you in good health. I am writing to seek your approval for a budget reallocation within our department\'s fiscal year budget.\r\n\r\nAs per our recent financial review, it has become evident that certain projects and initiatives require additional funding to ensure their successful completion. To reallocate resources effectively, we propose the following changes:\r\n\r\n1. Increase Budget Allocation for Project A:\r\n   - Current Budget: $50,000\r\n   - Proposed New Budget: $70,000\r\n\r\n2. Decrease Budget Allocation for Project B:\r\n   - Current Budget: $80,000\r\n   - Proposed New Budget: $60,000\r\n\r\n3. Reallocation of $10,000 to Support Team Training:\r\n   - Current Budget: $20,000\r\n   - Proposed New Budget: $30,000\r\n\r\nThe total budget remains unchanged, and this reallocation will allow us to align our resources with our department\'s strategic goals more effectively.\r\n\r\nWe have attached a detailed breakdown of the proposed changes for your review.\r\n\r\nWe kindly request your approval for this budget reallocation, as it is essential to maintain project momentum and ensure our team\'s success. Please provide your feedback or approval by [Insert Deadline].\r\n\r\nShould you have any questions or require further information, please do not hesitate to reach out to me at [Your Phone Number] or [Your Email Address].\r\n\r\nThank you for your prompt attention to this matter. Your support is greatly appreciated.\r\n\r\nBest regards,\r\n\r\n[Your Full Name]\r\n[Your Job Title]\r\n[Your Department]\r\n[Your Phone Number]\r\n[Your Email Address]', '1695010754.jpg', '3', '3', '0', '0', 'mizan@gmail.com', '2023-09-17 22:19:14', '2023-09-17 22:19:14'),
(27, 'Request for Approval - Budget Reallocation', 'Dear [Recipient\'s Name],\r\n\r\nI trust this email finds you in good health. I am writing to seek your approval for a budget reallocation within our department\'s fiscal year budget.\r\n\r\nAs per our recent financial review, it has become evident that certain projects and initiatives require additional funding to ensure their successful completion. To reallocate resources effectively, we propose the following changes:\r\n\r\n1. Increase Budget Allocation for Project A:\r\n   - Current Budget: $50,000\r\n   - Proposed New Budget: $70,000\r\n\r\n2. Decrease Budget Allocation for Project B:\r\n   - Current Budget: $80,000\r\n   - Proposed New Budget: $60,000\r\n\r\n3. Reallocation of $10,000 to Support Team Training:\r\n   - Current Budget: $20,000\r\n   - Proposed New Budget: $30,000\r\n\r\nThe total budget remains unchanged, and this reallocation will allow us to align our resources with our department\'s strategic goals more effectively.\r\n\r\nWe have attached a detailed breakdown of the proposed changes for your review.\r\n\r\nWe kindly request your approval for this budget reallocation, as it is essential to maintain project momentum and ensure our team\'s success. Please provide your feedback or approval by [Insert Deadline].\r\n\r\nShould you have any questions or require further information, please do not hesitate to reach out to me at [Your Phone Number] or [Your Email Address].\r\n\r\nThank you for your prompt attention to this matter. Your support is greatly appreciated.\r\n\r\nBest regards,\r\n\r\n[Your Full Name]\r\n[Your Job Title]\r\n[Your Department]\r\n[Your Phone Number]\r\n[Your Email Address]', '1695010923.jpg', '3', '3', '0', '0', 'mizan@gmail.com', '2023-09-17 22:22:03', '2023-09-17 22:22:03'),
(28, 'Request for Approval - Budget Reallocation', 'Dear [Recipient\'s Name],\r\n\r\nI trust this email finds you in good health. I am writing to seek your approval for a budget reallocation within our department\'s fiscal year budget.\r\n\r\nAs per our recent financial review, it has become evident that certain projects and initiatives require additional funding to ensure their successful completion. To reallocate resources effectively, we propose the following changes:\r\n\r\n1. Increase Budget Allocation for Project A:\r\n   - Current Budget: $50,000\r\n   - Proposed New Budget: $70,000\r\n\r\n2. Decrease Budget Allocation for Project B:\r\n   - Current Budget: $80,000\r\n   - Proposed New Budget: $60,000\r\n\r\n3. Reallocation of $10,000 to Support Team Training:\r\n   - Current Budget: $20,000\r\n   - Proposed New Budget: $30,000\r\n\r\nThe total budget remains unchanged, and this reallocation will allow us to align our resources with our department\'s strategic goals more effectively.\r\n\r\nWe have attached a detailed breakdown of the proposed changes for your review.\r\n\r\nWe kindly request your approval for this budget reallocation, as it is essential to maintain project momentum and ensure our team\'s success. Please provide your feedback or approval by [Insert Deadline].\r\n\r\nShould you have any questions or require further information, please do not hesitate to reach out to me at [Your Phone Number] or [Your Email Address].\r\n\r\nThank you for your prompt attention to this matter. Your support is greatly appreciated.\r\n\r\nBest regards,\r\n\r\n[Your Full Name]\r\n[Your Job Title]\r\n[Your Department]\r\n[Your Phone Number]\r\n[Your Email Address]', '1695011075.jpg', '3', '3', '0', '0', 'mizan@gmail.com', '2023-09-17 22:24:35', '2023-09-17 22:24:35'),
(29, 'Meeting Request for Project Discussion', 'Dear [Recipient\'s Name],\r\n\r\nI trust this email finds you in good health. I am writing to seek your approval for a budget reallocation within our department\'s fiscal year budget.\r\n\r\nAs per our recent financial review, it has become evident that certain projects and initiatives require additional funding to ensure their successful completion. To reallocate resources effectively, we propose the following changes:\r\n\r\n1. Increase Budget Allocation for Project A:\r\n   - Current Budget: $50,000\r\n   - Proposed New Budget: $70,000\r\n\r\n2. Decrease Budget Allocation for Project B:\r\n   - Current Budget: $80,000\r\n   - Proposed New Budget: $60,000\r\n\r\n3. Reallocation of $10,000 to Support Team Training:\r\n   - Current Budget: $20,000\r\n   - Proposed New Budget: $30,000\r\n\r\nThe total budget remains unchanged, and this reallocation will allow us to align our resources with our department\'s strategic goals more effectively.\r\n\r\nWe have attached a detailed breakdown of the proposed changes for your review.\r\n\r\nWe kindly request your approval for this budget reallocation, as it is essential to maintain project momentum and ensure our team\'s success. Please provide your feedback or approval by [Insert Deadline].\r\n\r\nShould you have any questions or require further information, please do not hesitate to reach out to me at [Your Phone Number] or [Your Email Address].\r\n\r\nThank you for your prompt attention to this matter. Your support is greatly appreciated.\r\n\r\nBest regards,\r\n\r\n[Your Full Name]\r\n[Your Job Title]\r\n[Your Department]\r\n[Your Phone Number]\r\n[Your Email Address]', '1695011157.jpg', '0', '0', '0', '0', 'mizan@gmail.com', '2023-09-17 22:25:57', '2023-09-17 22:25:57'),
(30, 'Meeting Request for Project Discussion..', 'Dear [Recipient\'s Name],\r\n\r\nI trust this email finds you in good health. I am writing to seek your approval for a budget reallocation within our department\'s fiscal year budget.\r\n\r\nAs per our recent financial review, it has become evident that certain projects and initiatives require additional funding to ensure their successful completion. To reallocate resources effectively, we propose the following changes:\r\n\r\n1. Increase Budget Allocation for Project A:\r\n   - Current Budget: $50,000\r\n   - Proposed New Budget: $70,000\r\n\r\n2. Decrease Budget Allocation for Project B:\r\n   - Current Budget: $80,000\r\n   - Proposed New Budget: $60,000\r\n\r\n3. Reallocation of $10,000 to Support Team Training:\r\n   - Current Budget: $20,000\r\n   - Proposed New Budget: $30,000\r\n\r\nThe total budget remains unchanged, and this reallocation will allow us to align our resources with our department\'s strategic goals more effectively.\r\n\r\nWe have attached a detailed breakdown of the proposed changes for your review.\r\n\r\nWe kindly request your approval for this budget reallocation, as it is essential to maintain project momentum and ensure our team\'s success. Please provide your feedback or approval by [Insert Deadline].\r\n\r\nShould you have any questions or require further information, please do not hesitate to reach out to me at [Your Phone Number] or [Your Email Address].\r\n\r\nThank you for your prompt attention to this matter. Your support is greatly appreciated.\r\n\r\nBest regards,\r\n\r\n[Your Full Name]\r\n[Your Job Title]\r\n[Your Department]\r\n[Your Phone Number]\r\n[Your Email Address]', '1695011269.jpg', '3', '3', '0', '0', 'mizan@gmail.com', '2023-09-17 22:27:49', '2023-09-17 22:27:49'),
(31, 'New subject', 'Dear [Recipient\'s Name],\r\n\r\nI trust this email finds you in good health. I am writing to seek your approval for a budget reallocation within our department\'s fiscal year budget.\r\n\r\nAs per our recent financial review, it has become evident that certain projects and initiatives require additional funding to ensure their successful completion. \r\n\r\nWe have attached a detailed breakdown of the proposed changes for your review.\r\n\r\nShould you have any questions or require further information, please do not hesitate to reach out to me at [Your Phone Number] or [Your Email Address].\r\n\r\nThank you for your prompt attention to this matter. Your support is greatly appreciated.\r\n\r\nBest regards,\r\n\r\n[Your Full Name]\r\n[Your Job Title]\r\n[Your Department]\r\n[Your Phone Number]', '1695011534.jpg', '3', '3', '0', '0', 'mizan@gmail.com', '2023-09-17 22:32:14', '2023-09-17 22:32:14'),
(32, 'Request for Approval', 'Dear [Recipient\'s Name],\r\n\r\nI trust this email finds you in good health. I am writing to seek your approval for a budget reallocation within our department\'s fiscal year budget.\r\n\r\nThe total budget remains unchanged, and this reallocation will allow us to align our resources with our department\'s strategic goals more effectively.\r\n\r\nWe have attached a detailed breakdown of the proposed changes for your review.\r\n\r\nWe kindly request your approval for this budget reallocation, as it is essential to maintain project momentum and ensure our team\'s success. Please provide your feedback or approval by [Insert Deadline].\r\n\r\nShould you have any questions or require further information, please do not hesitate to reach out to me at [Your Phone Number] or [Your Email Address].\r\n\r\nThank you for your prompt attention to this matter. Your support is greatly appreciated.\r\n\r\nBest regards,\r\n\r\n[Your Full Name]\r\n[Your Job Title]\r\n[Your Department]', '1695011872.jpg', '3', '3', '0', '0', 'mizan@gmail.com', '2023-09-17 22:37:52', '2023-09-17 22:37:52'),
(33, 'New subject for elite', 'Description about elite paint', '1696488954.jpg', '0', '0', '0', '0', 'mizan@gmail.com', '2023-10-05 00:55:54', '2023-10-05 00:55:54'),
(34, 'New subject for elite another', 'New description for elite another', '1696489019.jpg', '3', '3', '0', '0', 'mizan@gmail.com', '2023-10-05 00:56:59', '2023-10-05 00:56:59');

-- --------------------------------------------------------

--
-- Table structure for table `messages`
--

CREATE TABLE `messages` (
  `id` int(11) NOT NULL,
  `message` text DEFAULT NULL,
  `total_sms` varchar(50) DEFAULT NULL,
  `sent_total` varchar(50) DEFAULT NULL,
  `sending_failed` varchar(50) DEFAULT NULL,
  `sms_type` varchar(50) DEFAULT NULL,
  `failed_person_id` varchar(50) DEFAULT NULL,
  `sender_email` varchar(50) DEFAULT NULL,
  `created_at` datetime DEFAULT NULL,
  `updated_at` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `messages`
--

INSERT INTO `messages` (`id`, `message`, `total_sms`, `sent_total`, `sending_failed`, `sms_type`, `failed_person_id`, `sender_email`, `created_at`, `updated_at`) VALUES
(20, 'hello there', '2', '2', '0', 'Non-Masking', '', 'mizan@gmail.com', '2023-09-14 09:58:33', '2023-09-14 09:58:33'),
(21, 'fdf', '1', '1', '0', 'Masking', '', 'mizan@gmail.com', '2023-09-17 08:15:05', '2023-09-17 08:15:05'),
(22, 'fdf', '1', '1', '0', 'Non-Masking', '', 'mizan@gmail.com', '2023-09-17 08:15:23', '2023-09-17 08:15:23'),
(23, 'hello message', '12', '10', '2', 'Masking', '5, 8, ', 'mizan@gmail.com', '2023-10-05 06:53:53', '2023-10-05 06:53:53');

-- --------------------------------------------------------

--
-- Table structure for table `migrations`
--

CREATE TABLE `migrations` (
  `id` int(10) UNSIGNED NOT NULL,
  `migration` varchar(255) NOT NULL,
  `batch` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `migrations`
--

INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES
(1, '2019_12_14_000001_create_personal_access_tokens_table', 1),
(2, '2023_08_27_075602_add_deleted_at_column_to_customers', 1),
(3, '2023_09_06_044042_create_divisions_table', 2),
(4, '2023_09_06_044118_create_districts_table', 2),
(5, '2023_09_06_044144_create_thanas_table', 2),
(6, '2023_09_06_052700_create_districts_table', 3),
(7, '2023_09_06_053212_create_thanas_table', 3),
(8, '2023_09_13_031721_create_mails_table', 4);

-- --------------------------------------------------------

--
-- Table structure for table `personal_access_tokens`
--

CREATE TABLE `personal_access_tokens` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `tokenable_type` varchar(255) NOT NULL,
  `tokenable_id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) NOT NULL,
  `token` varchar(64) NOT NULL,
  `abilities` text DEFAULT NULL,
  `last_used_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `roles`
--

CREATE TABLE `roles` (
  `id` int(10) UNSIGNED NOT NULL,
  `designation` varchar(191) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `roles`
--

INSERT INTO `roles` (`id`, `designation`, `created_at`, `updated_at`) VALUES
(1, 'Support', '2021-10-10 06:29:19', '2021-10-10 06:29:19'),
(2, 'Head Of Marketing & Sales', '2021-10-12 04:28:48', '2021-10-12 04:28:48'),
(3, 'Admin', '2021-10-13 06:43:08', '2021-10-13 06:43:08'),
(4, 'Supervisor', '2021-10-21 07:28:07', '2021-10-21 07:28:07'),
(5, 'HR & Admin', '2021-10-23 05:26:12', '2021-10-23 05:26:12'),
(6, 'Depot Admin', '2021-11-04 08:58:53', '2021-11-04 08:58:53'),
(7, 'Distributor', '2021-11-04 09:01:27', '2021-11-04 09:01:27'),
(8, 'Depot Admin', '2021-11-04 09:23:52', '2021-11-04 09:23:52'),
(9, 'Depot Admin', '2021-11-04 09:24:14', '2021-11-04 09:24:14'),
(10, 'Supervisor', '2021-11-07 09:13:27', '2021-11-07 09:13:27'),
(11, 'Majumder', '2021-12-14 03:46:55', '2021-12-14 03:46:55'),
(12, 'Majumder', '2022-01-30 11:03:15', '2022-01-30 11:03:15'),
(13, 'Accounts', '2022-04-27 08:34:12', '2022-04-27 08:34:12'),
(14, 'Audit', '2022-05-10 09:43:33', '2022-05-10 09:43:33');

-- --------------------------------------------------------

--
-- Table structure for table `thanas`
--

CREATE TABLE `thanas` (
  `id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `district_id` varchar(255) NOT NULL,
  `created_at` datetime NOT NULL,
  `updated_at` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `thanas`
--

INSERT INTO `thanas` (`id`, `name`, `district_id`, `created_at`, `updated_at`) VALUES
(1, 'Badda', '1', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(2, 'Cantonment', '1', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(3, 'Demra', '1', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(4, 'Dhamrai', '1', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(5, 'Dhanmondi', '1', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(6, 'Dohar', '1', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(7, 'Gulshan', '1', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(8, 'Hazaribagh', '1', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(9, 'Kafrul', '1', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(10, 'Kamrangir Char', '1', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(11, 'Keraniganj', '1', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(12, 'Khilgaon', '1', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(13, 'Kotwali', '1', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(14, 'Lalbagh', '1', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(15, 'Mirpur', '1', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(16, 'Mohammadpur', '1', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(17, 'Motijheel', '1', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(18, 'Nawabganj', '1', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(19, 'Pallabi', '1', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(20, 'Ramna', '1', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(21, 'Rampura', '1', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(22, 'Sabujbagh', '1', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(23, 'Savar', '1', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(24, 'Shyampur', '1', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(25, 'Sutrapur', '1', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(26, 'Tejgaon', '1', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(27, 'Uttara', '1', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(28, 'Alfadanga', '2', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(29, 'Bhanga', '2', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(30, 'Boalmari', '2', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(31, 'Char Bhadrasan', '2', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(32, 'Faridpur Sadar', '2', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(33, 'Madhukhali', '2', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(34, 'Nagarkanda', '2', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(35, 'Sadarpur', '2', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(36, 'Gazipur Sadar', '3', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(37, 'Kaliakair', '3', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(38, 'Kaliganj', '3', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(39, 'Kapasia', '3', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(40, 'Sreepur', '3', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(41, 'Gopalganj Sadar', '4', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(42, 'Kashiani', '4', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(43, 'Kotalipara', '4', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(44, 'Muksudpur', '4', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(45, 'Tungipara', '4', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(46, 'Kishoreganj Sadar', '5', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(47, 'Austagram', '5', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(48, 'Bajitpur', '5', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(49, 'Bhairab', '5', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(50, 'Hossainpur', '5', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(51, 'Itna', '5', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(52, 'Karimganj', '5', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(53, 'Katiadi', '5', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(54, 'Kuliarchar', '5', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(55, 'Mithamain', '5', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(56, 'Nikli', '5', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(57, 'Pakundia', '5', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(58, 'Kalkini', '6', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(59, 'Madaripur Sadar', '6', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(60, 'Rajoir', '6', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(61, 'Shibchar', '6', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(62, 'Daulatpur', '7', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(63, 'Ghior', '7', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(64, 'Harirampur', '7', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(65, 'Manikganj Sadar', '7', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(66, 'Saturia', '7', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(67, 'Shivalaya', '7', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(68, 'Singair', '7', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(69, 'Gazaria', '8', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(70, 'Lohajang', '8', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(71, 'Munshiganj Sadar', '8', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(72, 'Serajdikhan', '8', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(73, 'Sreenagar', '8', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(74, 'Tongibari', '8', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(75, 'Araihazar', '9', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(76, 'Bandar', '9', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(77, 'Narayanganj Sadar', '9', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(78, 'Rupganj', '9', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(79, 'Sonargaon', '9', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(80, 'Narsingdi Sadar', '10', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(81, 'Belabo', '10', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(82, 'Monohardi', '10', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(83, 'Palash', '10', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(84, 'Raipura', '10', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(85, 'Shibpur', '10', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(86, 'Baliakandi', '11', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(87, 'Goalandaghat', '11', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(88, 'Pangsha', '11', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(89, 'Rajbari Sadar', '11', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(90, 'Bhedarganj', '12', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(91, 'Damudya', '12', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(92, 'Gosairhat', '12', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(93, 'Naria', '12', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(94, 'Shariatpur Sadar', '12', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(95, 'Zanjira', '12', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(96, 'Basail', '13', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(97, 'Bhuapur', '13', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(98, 'Delduar', '13', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(99, 'Ghatail', '13', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(100, 'Gopalpur', '13', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(101, 'Kalihati', '13', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(102, 'Madhupur', '13', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(103, 'Mirzapur', '13', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(104, 'Nagarpur', '13', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(105, 'Sakhipur', '13', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(106, 'Tangail Sadar', '13', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(107, 'Alikadam', '14', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(108, 'Bandarban Sadar', '14', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(109, 'Lama', '14', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(110, 'Naikhongchhari', '14', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(111, 'Rowangchhari', '14', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(112, 'Ruma', '14', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(113, 'Thanchi', '14', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(114, 'Akhaura', '15', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(115, 'Bancharampur', '15', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(116, 'Brahmanbaria Sadar', '15', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(117, 'Kasba', '15', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(118, 'Nabinagar', '15', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(119, 'Nasirnagar', '15', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(120, 'Sarail', '15', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(121, 'Chandpur Sadar', '16', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(122, 'Faridganj', '16', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(123, 'Haimchar', '16', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(124, 'Hajiganj', '16', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(125, 'Kachua', '16', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(126, 'Matlab', '16', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(127, 'Shahrasti', '16', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(128, 'Anwara', '17', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(129, 'Bandar (Chittagong Port)', '17', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(130, 'Banshkhali', '17', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(131, 'Boalkhali', '17', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(132, 'Chandanaish', '17', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(133, 'Chandgaon', '17', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(134, 'Double Mooring', '17', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(135, 'Fatikchhari', '17', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(136, 'Hathazari', '17', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(137, 'Kotwali', '17', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(138, 'Lohagara', '17', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(139, 'Mirsharai', '17', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(140, 'Pahartali', '17', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(141, 'Panchlaish', '17', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(142, 'Patiya', '17', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(143, 'Rangunia', '17', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(144, 'Raozan', '17', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(145, 'Sandwip', '17', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(146, 'Satkania', '17', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(147, 'Sitakunda', '17', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(148, 'Barura', '18', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(149, 'Brahmanpara', '18', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(150, 'Burichang', '18', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(151, 'Chandina', '18', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(152, 'Chauddagram', '18', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(153, 'Comilla Sadar', '18', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(154, 'Daudkandi', '18', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(155, 'Debidwar', '18', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(156, 'Homna', '18', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(157, 'Laksham', '18', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(158, 'Muradnagar', '18', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(159, 'Nangalkot', '18', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(160, 'Chakaria', '19', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(161, 'Coxs Bazar Sadar', '19', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(162, 'Kutubdia', '19', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(163, 'Maheshkhali', '19', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(164, 'Ramu', '19', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(165, 'Teknaf', '19', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(166, 'Ukhia', '19', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(167, 'Chhagalnaiya', '20', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(168, 'Daganbhuiyan', '20', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(169, 'Feni Sadar', '20', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(170, 'Parshuram', '20', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(171, 'Phulgazi', '20', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(172, 'Sonagazi', '20', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(173, 'Dighinala', '21', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(174, 'Khagrachhari Sadar', '21', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(175, 'Lakshmichhari', '21', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(176, 'Mahalchhari', '21', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(177, 'Manikchhari', '21', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(178, 'Matiranga', '21', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(179, 'Panchhari', '21', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(180, 'Ramgarh', '21', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(181, 'Lakshmipur Sadar', '22', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(182, 'Raipur', '22', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(183, 'Ramganj', '22', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(184, 'Ramgati', '22', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(185, 'Begumganj', '23', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(186, 'Chatkhil', '23', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(187, 'Companiganj', '23', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(188, 'Hatiya', '23', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(189, 'Noakhali Sadar', '23', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(190, 'Senbagh', '23', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(191, 'Baghaichhari', '24', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(192, 'Barkal', '24', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(193, 'Belaichhari', '24', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(194, 'Juraichhari', '24', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(195, 'Kaptai', '24', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(196, 'Kawkhali', '24', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(197, 'Langadu', '24', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(198, 'Nannerchar', '24', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(199, 'Rajasthali', '24', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(200, 'Rangamati Sadar', '24', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(201, 'Adamdighi', '25', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(202, 'Bogra Sadar', '25', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(203, 'Dhunat', '25', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(204, 'Dupchanchia', '25', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(205, 'Gabtali', '25', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(206, 'Kahaloo', '25', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(207, 'Nandigram', '25', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(208, 'Sariakandi', '25', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(209, 'Sherpur', '25', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(210, 'Shibganj', '25', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(211, 'Sonatola', '25', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(212, 'Akkelpur', '26', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(213, 'Joypurhat Sadar', '26', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(214, 'Kalai', '26', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(215, 'Khetlal', '26', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(216, 'Panchbibi', '26', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(217, 'Atrai', '27', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(218, 'Badalgachhi', '27', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(219, 'Dhamoirhat', '27', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(220, 'Mahadevpur', '27', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(221, 'Manda', '27', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(222, 'Naogaon Sadar', '27', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(223, 'Niamatpur', '27', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(224, 'Patnitala', '27', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(225, 'Porsha', '27', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(226, 'Raninagar', '27', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(227, 'Sapahar', '27', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(228, 'Bagatipara', '28', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(229, 'Baraigram', '28', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(230, 'Gurudaspur', '28', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(231, 'Lalpur', '28', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(232, 'Natore Sadar', '28', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(233, 'Singra', '28', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(234, 'Chapainawabganj Sadar', '29', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(235, 'Gomastapur', '29', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(236, 'Nachole', '29', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(237, 'Shibganj', '29', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(238, 'Atgharia', '30', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(239, 'Bera', '30', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(240, 'Bhangura', '30', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(241, 'Chatmohar', '30', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(242, 'Faridpur', '30', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(243, 'Ishwardi', '30', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(244, 'Pabna Sadar', '30', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(245, 'Santhia', '30', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(246, 'Sujanagar', '30', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(247, 'Bagha', '31', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(248, 'Bagmara', '31', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(249, 'Boalia', '31', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(250, 'Charghat', '31', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(251, 'Durgapur', '31', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(252, 'Godagari', '31', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(253, 'Matihar', '31', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(254, 'Mohanpur', '31', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(255, 'Paba', '31', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(256, 'Puthia', '31', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(257, 'Rajpara', '31', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(258, 'Shah Mokdum', '31', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(259, 'Tanore', '31', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(260, 'Belkuchi', '32', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(261, 'Chauhali', '32', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(262, 'Kamarkhanda', '32', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(263, 'Kazipur', '32', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(264, 'Raiganj', '32', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(265, 'Shahjadpur', '32', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(266, 'Sirajganj Sadar', '32', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(267, 'Tarash', '32', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(268, 'Ullahpara', '32', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(269, 'Bagerhat Sadar', '33', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(270, 'Chitalmari', '33', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(271, 'Fakirhat', '33', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(272, 'Kachua', '33', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(273, 'Mollahat', '33', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(274, 'Mongla', '33', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(275, 'Morrelganj', '33', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(276, 'Rampal', '33', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(277, 'Sarankhola', '33', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(278, 'Alamdanga', '34', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(279, 'Chuadanga Sadar', '34', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(280, 'Damurhuda', '34', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(281, 'Jibannagar', '34', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(282, 'Abhaynagar', '35', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(283, 'Bagherpara', '35', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(284, 'Chaugachha', '35', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(285, 'Jessore Sadar', '35', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(286, 'Jhikargachha', '35', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(287, 'Keshabpur', '35', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(288, 'Manirampur', '35', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(289, 'Sharsha', '35', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(290, 'Harinakunda', '36', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(291, 'Jhenaidaha Sadar', '36', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(292, 'Kaliganj', '36', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(293, 'Kotchandpur', '36', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(294, 'Maheshpur', '36', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(295, 'Shailkupa', '36', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(296, 'Khulna Sadar', '37', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(297, 'Batiaghata', '37', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(298, 'Dacope', '37', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(299, 'Daulatpur', '37', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(300, 'Dighalia', '37', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(301, 'Dumuria', '37', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(302, 'Khalishpur', '37', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(303, 'Khan Jahan Ali', '37', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(304, 'Kotwali', '37', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(305, 'Koyra', '37', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(306, 'Paikgachha', '37', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(307, 'Phultala', '37', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(308, 'Rupsa', '37', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(309, 'Sonadanga', '37', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(310, 'Terokhada', '37', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(311, 'Bheramara', '38', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(312, 'Daulatpur', '38', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(313, 'Khoksa', '38', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(314, 'Kumarkhali', '38', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(315, 'Kushtia Sadar', '38', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(316, 'Mirpur', '38', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(317, 'Magura Sadar', '39', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(318, 'Mohammadpur', '39', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(319, 'Salikha', '39', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(320, 'Sreepur', '39', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(321, 'Gangni', '40', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(322, 'Meherpur Sadar', '40', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(323, 'Kalia', '41', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(324, 'Lohagara', '41', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(325, 'Narail Sadar', '41', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(326, 'Assasuni', '42', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(327, 'Debhata', '42', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(328, 'Kalaroa', '42', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(329, 'Kaliganj', '42', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(330, 'Satkhira Sadar', '42', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(331, 'Shyamnagar', '42', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(332, 'Tala', '42', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(333, 'Amtali', '43', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(334, 'Bamna', '43', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(335, 'Barguna Sadar', '43', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(336, 'Betagi', '43', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(337, 'Patharghata', '43', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(338, 'Agailjhara', '44', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(339, 'Babuganj', '44', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(340, 'Bakerganj', '44', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(341, 'Banaripara', '44', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(342, 'Barisal Sadar', '44', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(343, 'Gournadi', '44', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(344, 'Hizla', '44', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(345, 'Mehendiganj', '44', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(346, 'Muladi', '44', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(347, 'Wazirpur', '44', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(348, 'Bhola Sadar', '45', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(349, 'Burhanuddin', '45', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(350, 'Charfasson', '45', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(351, 'Daulatkhan', '45', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(352, 'Lalmohan', '45', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(353, 'Manpura', '45', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(354, 'Tazumuddin', '45', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(355, 'Jhalokati Sadar', '46', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(356, 'Kathalia', '46', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(357, 'Nalchity', '46', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(358, 'Rajapur', '46', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(359, 'Bauphal', '47', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(360, 'Dashmina', '47', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(361, 'Galachipa', '47', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(362, 'Kalapara', '47', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(363, 'Mirzaganj', '47', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(364, 'Patuakhali Sadar', '47', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(365, 'Bhandaria', '48', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(366, 'Kawkhali', '48', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(367, 'Mathbaria', '48', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(368, 'Nazirpur', '48', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(369, 'Nesarabad', '48', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(370, 'Pirojpur Sadar', '48', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(371, 'Ajmiriganj', '49', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(372, 'Baniachang', '49', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(373, 'Bahubal', '49', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(374, 'Chunarughat', '49', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(375, 'Habiganj Sadar', '49', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(376, 'Lakhai', '49', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(377, 'Madhabpur', '49', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(378, 'Nabiganj', '49', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(379, 'Moulvibazar Sadar', '50', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(380, 'Sreemangal', '50', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(381, 'Kamalganj', '50', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(382, 'Rajnagar', '50', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(383, 'Kulaura', '50', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(384, 'Barlekha', '50', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(385, 'Bishwamvarpur', '51', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(386, 'Chhatak', '51', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(387, 'Derai', '51', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(388, 'Dharmapasha', '51', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(389, 'Dowarabazar', '51', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(390, 'Jagannathpur', '51', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(391, 'Jamalganj', '51', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(392, 'Sullah', '51', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(393, 'Sunamganj Sadar', '51', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(394, 'Tahirpur', '51', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(395, 'Balaganj', '52', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(396, 'Beanibazar', '52', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(397, 'Bishwanath', '52', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(398, 'Companiganj', '52', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(399, 'Fenchuganj', '52', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(400, 'Golabganj', '52', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(401, 'Gowainghat', '52', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(402, 'Jaintiapur', '52', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(403, 'Kanaighat', '52', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(404, 'Sylhet Sadar', '52', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(405, 'Zakiganj', '52', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(406, 'Biral', '53', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(407, 'Birampur', '53', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(408, 'Birganj', '53', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(409, 'Bochaganj', '53', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(410, 'Chirirbandar', '53', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(411, 'Dinajpur Sadar', '53', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(412, 'Ghoraghat', '53', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(413, 'Hakimpur', '53', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(414, 'Kaharole', '53', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(415, 'Khansama', '53', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(416, 'Nawabganj', '53', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(417, 'Parbatipur', '53', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(418, 'Phulbari', '53', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(419, 'Fulchhari', '54', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(420, 'Gaibandha Sadar', '54', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(421, 'Gobindaganj', '54', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(422, 'Palashbari', '54', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(423, 'Sadullapur', '54', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(424, 'Sughatta', '54', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(425, 'Sundarganj', '54', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(426, 'Bhurungamari', '55', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(427, 'Char Rajibpur', '55', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(428, 'Chilmari', '55', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(429, 'Kurigram Sadar', '55', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(430, 'Nageshwari', '55', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(431, 'Phulbari', '55', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(432, 'Rajarhat', '55', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(433, 'Raumari', '55', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(434, 'Ulipur', '55', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(435, 'Amtali', '56', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(436, 'Hatibandha', '56', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(437, 'Kaliganj', '56', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(438, 'Lalmonirhat Sadar', '56', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(439, 'Patgram', '56', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(440, 'Dimla', '57', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(441, 'Domar', '57', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(442, 'Jaldhaka', '57', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(443, 'Kishoreganj', '57', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(444, 'Nilphamari Sadar', '57', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(445, 'Saidpur', '57', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(446, 'Atrai', '58', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(447, 'Boda', '58', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(448, 'Debiganj', '58', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(449, 'Panchagarh Sadar', '58', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(450, 'Tentulia', '58', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(451, 'Badarganj', '59', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(452, 'Gangachara', '59', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(453, 'Kaunia', '59', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(454, 'Mithapukur', '59', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(455, 'Pirgachha', '59', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(456, 'Pirganj', '59', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(457, 'Rangpur Sadar', '59', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(458, 'Taraganj', '59', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(459, 'Baliadangi', '60', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(460, 'Haripur', '60', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(461, 'Pirganj', '60', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(462, 'Ranisankail', '60', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(463, 'Thakurgaon Sadar', '60', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(464, 'Gazaria', '61', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(465, 'Lohajang', '61', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(466, 'Munshiganj Sadar', '61', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(467, 'Serajdikhan', '61', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(468, 'Sreenagar', '61', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(469, 'Tongibari', '61', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(470, 'Baksiganj', '62', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(471, 'Dewanganj', '62', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(472, 'Islampur', '62', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(473, 'Jamalpur Sadar', '62', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(474, 'Madarganj', '62', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(475, 'Melandaha', '62', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(476, 'Sarishabari', '62', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(477, 'Atpara', '63', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(478, 'Barhatta', '63', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(479, 'Durgapur', '63', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(480, 'Kalmakanda', '63', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(481, 'Kendua', '63', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(482, 'Khaliajuri', '63', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(483, 'Madan', '63', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(484, 'Mohanganj', '63', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(485, 'Netrokona Sadar', '63', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(486, 'Purbadhala', '63', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(487, 'Jhenaigati', '64', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(488, 'Nakla', '64', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(489, 'Nalitabari', '64', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(490, 'Sherpur Sadar', '64', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(491, 'Sreebardi', '64', '0000-00-00 00:00:00', '0000-00-00 00:00:00');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `name` varchar(50) NOT NULL,
  `email` varchar(50) NOT NULL,
  `mobile` varchar(50) NOT NULL,
  `password` varchar(300) NOT NULL,
  `photo` varchar(300) NOT NULL,
  `role_id` int(11) NOT NULL DEFAULT 0,
  `last_signin_at` datetime DEFAULT NULL,
  `last_signin_ip` varchar(50) DEFAULT NULL,
  `created_at` datetime NOT NULL,
  `updated_at` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `name`, `email`, `mobile`, `password`, `photo`, `role_id`, `last_signin_at`, `last_signin_ip`, `created_at`, `updated_at`) VALUES
(3, 'Mizanur Rahman', 'mizan@gmail.com', '01813907384', '$2y$10$LMd3rE/hig9JDNForoZGhuoT./gnoPYr/G6uc16Mg4dH6.cGq9yFy', '1696489192.png', 1, '2023-10-05 07:00:15', '::1', '2023-08-21 00:00:00', '2023-10-05 06:59:52'),
(5, 'Elite ID', 'somriddhi@elitepaint.com.bd', '01955310337', '$2y$10$ZFYwFT9YpXw91q9qYXChtORsH2c1/YWHPDZkzrEX0ajd8Ni56J1di', '1696489253.png', 3, NULL, NULL, '2023-08-22 00:00:00', '2023-10-05 07:00:53'),
(7, 'User', 'mamun77795@gmail.com', '01955310330', '$2y$10$xhh1Nf1bq6Igx3TF5hTT.eW4yx3fcUNyfq.bxhD4k4vmtWa9Dr/Gq', '1696489292.png', 2, NULL, NULL, '2023-08-27 07:16:52', '2023-10-05 07:01:32'),
(8, 'User2', 'robir8987@gmail.com', '01955310332', '$2y$10$JpLJ6DBHJ74AZa1aUOSyf.YeLizG7AlKLJuVFS1Yf63h8EhkSWLjy', '1696489305.png', 1, NULL, NULL, '2023-08-27 07:18:17', '2023-10-05 07:01:45'),
(9, 'Rafiqun Nabi', 'rafiqunnabi@gmail.com', '01826985975', '$2y$10$q1oTkgN/rImtdfWBX2anq.8R7tcs9Piox2BA32jPx54sGHXynw8mG', '1696489263.png', 14, NULL, NULL, '2023-08-28 10:56:26', '2023-10-05 07:01:03'),
(10, 'Robiul', 'robiul@gmail.com', '01521108830', '$2y$10$ikHCLeyYDnpfyGH1.8hBaeUS3QQysjms56BX3NNLGF1Cjvk8jPelO', '1696489279.png', 1, NULL, NULL, '2023-09-14 08:43:12', '2023-10-05 07:01:19');

-- --------------------------------------------------------

--
-- Structure for view `customer_view`
--
DROP TABLE IF EXISTS `customer_view`;

CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` SQL SECURITY DEFINER VIEW `customer_view`  AS SELECT `c`.`id` AS `id`, `c`.`first_name` AS `first_name`, `c`.`last_name` AS `last_name`, `c`.`email` AS `email`, `c`.`phone` AS `phone`, `c`.`street` AS `street`, `d`.`name` AS `district`, `t`.`name` AS `thana`, `c`.`post_code` AS `post_code`, `b`.`name` AS `blood_group`, `c`.`date_of_birth` AS `date_of_birth`, `c`.`marriage_date` AS `marriage_date`, `c`.`spouse_name` AS `spouse_name`, `c`.`children` AS `children`, `c`.`reference` AS `reference`, `c`.`created_by` AS `created_by`, `c`.`created_at` AS `created_at`, `c`.`district_id` AS `district_id`, `c`.`thana_id` AS `thana_id`, `c`.`blood_group_id` AS `blood_group_id` FROM (((`customers` `c` join `districts` `d` on(`c`.`district_id` = `d`.`id`)) join `thanas` `t` on(`c`.`thana_id` = `t`.`id`)) join `blood_groups` `b` on(`c`.`blood_group_id` = `b`.`id`)) ;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `customers`
--
ALTER TABLE `customers`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `districts`
--
ALTER TABLE `districts`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `divisions`
--
ALTER TABLE `divisions`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `mails`
--
ALTER TABLE `mails`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `messages`
--
ALTER TABLE `messages`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `personal_access_tokens`
--
ALTER TABLE `personal_access_tokens`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `personal_access_tokens_token_unique` (`token`),
  ADD KEY `personal_access_tokens_tokenable_type_tokenable_id_index` (`tokenable_type`,`tokenable_id`);

--
-- Indexes for table `roles`
--
ALTER TABLE `roles`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `thanas`
--
ALTER TABLE `thanas`
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
-- AUTO_INCREMENT for table `customers`
--
ALTER TABLE `customers`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=24;

--
-- AUTO_INCREMENT for table `districts`
--
ALTER TABLE `districts`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=65;

--
-- AUTO_INCREMENT for table `divisions`
--
ALTER TABLE `divisions`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `mails`
--
ALTER TABLE `mails`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=35;

--
-- AUTO_INCREMENT for table `messages`
--
ALTER TABLE `messages`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=24;

--
-- AUTO_INCREMENT for table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `personal_access_tokens`
--
ALTER TABLE `personal_access_tokens`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `roles`
--
ALTER TABLE `roles`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- AUTO_INCREMENT for table `thanas`
--
ALTER TABLE `thanas`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=492;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
