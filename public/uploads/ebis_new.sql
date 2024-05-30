-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: May 14, 2024 at 03:20 PM
-- Server version: 10.4.28-MariaDB
-- PHP Version: 8.0.28

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `ebis_new`
--

-- --------------------------------------------------------

--
-- Table structure for table `calls_per_day`
--

CREATE TABLE `calls_per_day` (
  `Date` varchar(100) NOT NULL,
  `Call Count` varchar(250) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `calls_per_day`
--

INSERT INTO `calls_per_day` (`Date`, `Call Count`) VALUES
('2024-03-06', '14'),
('2023-11-17', '1'),
('2024-02-26', '1'),
('2024-03-05', '4');

-- --------------------------------------------------------

--
-- Table structure for table `call_category_per_date`
--

CREATE TABLE `call_category_per_date` (
  `date(entry_date)` varchar(100) NOT NULL,
  `Enquires` varchar(100) NOT NULL,
  `Details Update` varchar(100) NOT NULL,
  `Requests` varchar(100) NOT NULL,
  `Payment Issues` varchar(100) NOT NULL,
  `Wrong Location` varchar(100) NOT NULL,
  `Call Dropped` varchar(200) NOT NULL,
  `TOTAL COUNT` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `call_category_per_date`
--

INSERT INTO `call_category_per_date` (`date(entry_date)`, `Enquires`, `Details Update`, `Requests`, `Payment Issues`, `Wrong Location`, `Call Dropped`, `TOTAL COUNT`) VALUES
('2024-03-06', '13', '0', '1', '0', '', '', '14'),
('2023-11-17', '1', '0', '0', '0', '', '', '1'),
('2024-02-26', '1', '0', '0', '0', '', '', '1'),
('2024-03-05', '4', '0', '0', '0', '', '', '4');

-- --------------------------------------------------------

--
-- Table structure for table `call_category_per_state`
--

CREATE TABLE `call_category_per_state` (
  `state_name` varchar(100) NOT NULL,
  `Enquires` varchar(100) NOT NULL,
  `Details Update` varchar(100) NOT NULL,
  `Requests` varchar(100) NOT NULL,
  `Payment Issues` varchar(100) NOT NULL,
  `Wrong Location` varchar(100) NOT NULL,
  `Call Dropped` varchar(100) NOT NULL,
  `TOTAL COUNT` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `call_category_per_state`
--

INSERT INTO `call_category_per_state` (`state_name`, `Enquires`, `Details Update`, `Requests`, `Payment Issues`, `Wrong Location`, `Call Dropped`, `TOTAL COUNT`) VALUES
('Niger State', '1', '0', '0', '0', '', '', '1'),
('Nasarawa State', '1', '0', '0', '0', '', '', '1'),
('Lagos State', '4', '0', '0', '0', '', '', '4'),
('Jigawa State', '1', '0', '0', '0', '', '', '1'),
('Imo State', '1', '0', '0', '0', '', '', '1'),
('Gombe State', '1', '0', '0', '0', '', '', '1'),
('FCT', '2', '0', '0', '0', '', '', '2'),
('Delta State', '1', '0', '0', '0', '', '', '1'),
('Bayelsa State', '0', '0', '1', '0', '', '', '1'),
('Bauchi State', '1', '0', '0', '0', '', '', '1'),
('Akwa Ibom State', '1', '0', '0', '0', '', '', '1'),
('Adamawa State', '5', '0', '0', '0', '', '', '5');

-- --------------------------------------------------------

--
-- Table structure for table `call_per_category`
--

CREATE TABLE `call_per_category` (
  `Category` varchar(100) NOT NULL,
  `Call Count` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `call_per_category`
--

INSERT INTO `call_per_category` (`Category`, `Call Count`) VALUES
('Enquires', '19'),
('Requests', '1');

-- --------------------------------------------------------

--
-- Table structure for table `call_per_state`
--

CREATE TABLE `call_per_state` (
  `State` varchar(50) NOT NULL,
  `Call Count` bigint(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `call_per_state`
--

INSERT INTO `call_per_state` (`State`, `Call Count`) VALUES
('Lagos State', 2),
('Jigawa State', 1),
('Imo State', 1),
('Gombe State', 1),
('FCT', 2),
('Delta State', 1),
('Bayelsa State', 1),
('Bauchi State', 1),
('Akwa Ibom State', 1),
('Adamawa State', 2);

-- --------------------------------------------------------

--
-- Table structure for table `daily_agent_call`
--

CREATE TABLE `daily_agent_call` (
  `agent name` varchar(250) NOT NULL,
  `username` varchar(250) NOT NULL,
  `count(1)` varchar(250) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `daily_agent_call`
--

INSERT INTO `daily_agent_call` (`agent name`, `username`, `count(1)`) VALUES
('Agbayero Jimoh', 'Jimoh', '1'),
('Ekene Onyewu', 'Ekene', '4'),
('Esther Badmus', 'Esther', '7'),
('Peter Danfulani', 'Danfulani', '3'),
('Hope Jonah', 'Jonah', '3'),
('Emeka Chiedozie', 'Chiedozie', '3');

-- --------------------------------------------------------

--
-- Table structure for table `standard_cc_view`
--

CREATE TABLE `standard_cc_view` (
  `id` int(10) NOT NULL,
  `customer_name` varchar(100) NOT NULL,
  `phone_no` varchar(100) NOT NULL,
  `call_type` varchar(200) NOT NULL,
  `ticket_status` varchar(32) NOT NULL,
  `comments` varchar(2000) NOT NULL,
  `call_category` varchar(50) NOT NULL,
  `state_name` varchar(200) NOT NULL,
  `entry_date` varchar(100) NOT NULL,
  `updated_date` varchar(100) NOT NULL,
  `username` varchar(255) NOT NULL,
  `Agent Name` varchar(255) NOT NULL,
  `source_name` varchar(200) NOT NULL,
  `cc_agent_action` varchar(2000) NOT NULL,
  `cc_agent_response` varchar(2000) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `standard_cc_view`
--

INSERT INTO `standard_cc_view` (`id`, `customer_name`, `phone_no`, `call_type`, `ticket_status`, `comments`, `call_category`, `state_name`, `entry_date`, `updated_date`, `username`, `Agent Name`, `source_name`, `cc_agent_action`, `cc_agent_response`) VALUES
(17, 'acascasfsf', '08022225522', 'Inbound', 'resolved', 'Caller wants to know more about the Presidential Conditional Grant Scheme (PCGS)', 'Requests', 'Bayelsa State', '2024-03-06 15:08:16', '2024-03-06 15:08:16', 'Ekene', 'Ekene Onyewu', 'Call', '', 'asddsgdfsgsfgsfgsdfg'),
(2, 'Gbenga Khal', '08094687056', 'Postpaid', 'resolved', 'Caller wants to know about application processes', 'Enquires', 'Lagos State', '2024-02-26 15:33:15', '2024-02-26 15:33:15', 'echiamaka', 'Chiamaka Edeh', 'Call', '', 'Customer was given the Criteria on how to apply for Marketmoni loan.'),
(13, 'Hannah', '09876543212', 'Inbound', 'open', 'Caller wants to know more about the Presidential Conditional Grant Scheme (PCGS)', 'Enquires', 'Jigawa State', '2024-03-06 12:22:35', '2024-03-06 12:22:35', 'echiamaka', 'Chiamaka Edeh', 'Call', 'sample action', 'ghjkj'),
(16, 'Hannah', '09876543212', 'Inbound', 'resolved', 'Caller wants to know if one can walk into any BOI office for enquiries and to make an application', 'Enquires', 'Imo State', '2024-03-06 14:43:37', '2024-03-06 14:43:37', 'echiamaka', 'Chiamaka Edeh', 'Call', '', 'Res'),
(19, 'Hannah', '09876543212', 'Inbound', 'open', 'Caller wants to know if one can walk into any BOI office for enquiries and to make an application', 'Enquires', 'Gombe State', '2024-03-06 17:19:16', '2024-03-06 17:19:16', 'Danfulani', 'Peter Danfulani', 'Call', '', 'just'),
(15, 'Hannah', '09876543212', '', 'resolved', 'Caller wants to know about application processes', 'Enquires', 'FCT', '2024-03-06 14:41:17', '2024-03-06 14:41:17', 'echiamaka', 'Chiamaka Edeh', 'Call', '', 'hello'),
(18, 'Hannah', '09876543212', 'Inbound', 'resolved', 'Caller wants to know about application processes', 'Enquires', 'Bauchi State', '2024-03-06 15:34:28', '2024-03-06 15:34:28', 'echiamaka', 'Chiamaka Edeh', 'Call', '', 'test'),
(7, 'Oba Fis', '08094687056', 'Postpaid', 'resolved', 'Caller wants to know how long does it take to receive disbursement', 'Enquires', 'Akwa Ibom State', '2024-03-05 02:40:35', '2024-03-05 02:40:35', 'echiamaka', 'Chiamaka Edeh', 'Call', '', 'Monthly payments should be made at the beginning of every month.'),
(3, 'Oba Fis', '08094687056', 'Prepaid', 'open', 'Caller wants to know more about the Presidential Conditional Grant Scheme (PCGS)', 'Enquires', 'Adamawa State', '2024-03-05 02:16:13', '2024-03-05 02:16:13', 'echiamaka', 'Chiamaka Edeh', 'Call', '', 'Call dropped before customer could be given a response.'),
(10, 'Oba Fis G', '08094687056', 'Inbound', 'resolved', 'Caller wants to know about application processes', 'Enquires', 'Delta State', '2024-03-05 03:05:08', '2024-03-06 12:15:03', 'echiamaka', 'Chiamaka Edeh', 'Call', '', 'Customer was given the nearest BOI office, customer care line and email address.'),
(1, 'Obanla David', '08094687056', 'Prepaid', 'resolved', 'Caller wants to know about application processes', 'Enquires', 'Lagos State', '2023-11-17 09:54:54', '2023-11-17 09:54:54', 'Dami', 'Dami Bankole', 'Call', '', 'The call has been resolved'),
(12, 'xfaxfaSDgasgfafg', '08022225522', 'Inbound', 'resolved', 'Caller wants to know about application processes', 'Enquires', 'Adamawa State', '2024-03-06 09:36:50', '2024-03-06 09:39:06', 'Ekene', 'Ekene Onyewu', 'Call', 'sasdfgsadghsg', 'Customer was given the Criteria on how to apply for Marketmoni loan.'),
(11, 'Yolah', '09876543211', 'Inbound', 'resolved', 'Caller wants to know if one can walk into any BOI office for enquiries and to make an application', 'Enquires', 'FCT', '2024-03-05 09:14:44', '2024-03-05 09:14:44', 'echiamaka', 'Chiamaka Edeh', 'Call', 'oi', 'Minimum amount is 10,000 naira, Maximum amount is 50,000 naira. Subsequently a member can apply for a higher amount of 100,000 and 250,000 naira.');

-- --------------------------------------------------------

--
-- Table structure for table `total_agent_call`
--

CREATE TABLE `total_agent_call` (
  `agent name` varchar(250) NOT NULL,
  `username` varchar(250) NOT NULL,
  `count(1)` varchar(250) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `total_agent_call`
--

INSERT INTO `total_agent_call` (`agent name`, `username`, `count(1)`) VALUES
('Agbayero Jimoh', 'Jimoh', '14'),
('Emeka Chiedozie', 'Chiedozie', '12'),
('Ekene Onyewu', 'Ekene', '10'),
('Esther Badmus', 'Esther', '17'),
('Peter Danfulani', 'Danfulani', '14'),
('Hope Jonah', 'Jonah', '10');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(10) NOT NULL,
  `username` varchar(10) NOT NULL,
  `pswd` varchar(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `username`, `pswd`) VALUES
(1, 'boireport', 'b0irep0r+');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
