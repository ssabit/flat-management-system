-- phpMyAdmin SQL Dump
-- version 4.5.1
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: Mar 14, 2019 at 12:13 PM
-- Server version: 10.1.13-MariaDB
-- PHP Version: 5.6.20

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `flat_management_system`
--

-- --------------------------------------------------------

--
-- Table structure for table `chat_message`
--

CREATE TABLE `chat_message` (
  `chat_message_id` int(11) NOT NULL,
  `to_user_id` int(11) NOT NULL,
  `from_user_id` int(11) NOT NULL,
  `chat_message` text NOT NULL,
  `timestamp` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `status` int(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `chat_message`
--

INSERT INTO `chat_message` (`chat_message_id`, `to_user_id`, `from_user_id`, `chat_message`, `timestamp`, `status`) VALUES
(1, 1, 2, 'hi', '2019-03-14 06:21:49', 0),
(2, 2, 1, 'hlw', '2019-03-14 06:21:58', 0),
(3, 1, 2, 'how are you', '2019-03-14 06:22:11', 0),
(4, 1, 2, '??', '2019-03-14 06:24:01', 0),
(5, 1, 2, '???', '2019-03-14 06:24:47', 0),
(6, 1, 2, 'complete\n', '2019-03-14 09:11:44', 1),
(7, 2, 7, 'hi\n', '2019-03-14 09:23:31', 0),
(8, 7, 2, 'hello', '2019-03-14 09:23:52', 0),
(9, 5, 2, 'hi', '2019-03-14 09:24:07', 1),
(10, 10, 2, 'hi', '2019-03-14 09:24:13', 1),
(11, 4, 7, 'hi', '2019-03-14 09:24:56', 1),
(12, 2, 4, 'hi', '2019-03-14 09:25:40', 0),
(13, 5, 4, 'hi', '2019-03-14 09:25:49', 1),
(14, 4, 2, 'hellow', '2019-03-14 09:26:26', 1),
(15, 4, 2, 'jlksajd\n', '2019-03-14 09:26:30', 1),
(16, 5, 2, 'asdasd', '2019-03-14 09:26:34', 1),
(17, 5, 7, 'hi', '2019-03-14 09:26:53', 1),
(18, 2, 7, 'where are you?', '2019-03-14 10:36:12', 0);

-- --------------------------------------------------------

--
-- Table structure for table `domestic_worker`
--

CREATE TABLE `domestic_worker` (
  `id` int(100) NOT NULL,
  `name` varchar(100) NOT NULL,
  `category` varchar(100) NOT NULL,
  `nid` varchar(100) NOT NULL,
  `gender` tinyint(1) NOT NULL,
  `address` varchar(100) NOT NULL,
  `image_name` varchar(100) NOT NULL,
  `flat_no` varchar(100) NOT NULL,
  `phone` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `domestic_worker`
--

INSERT INTO `domestic_worker` (`id`, `name`, `category`, `nid`, `gender`, `address`, `image_name`, `flat_no`, `phone`) VALUES
(1, 'PUBG', 'cook', '11111', 0, 'abcd', '5c85396a08de93.82725949.jpg', '2(A)', '123123'),
(7, 'saad sabit', 'cook', '3456765432', 0, 'Family Ahmed  Plot# 67/1,Road# 4,Block# B Mirpur-12,Dhaka-1216', '5c8a2ce07db420.47738377.jpg', '1(C)', '1838097163');

-- --------------------------------------------------------

--
-- Table structure for table `flat`
--

CREATE TABLE `flat` (
  `id` int(25) NOT NULL,
  `flat_no` varchar(100) NOT NULL,
  `user_id` int(11) NOT NULL,
  `tenantname` varchar(100) NOT NULL,
  `flatrent` int(100) NOT NULL,
  `broadband` int(100) NOT NULL,
  `cabletv` int(100) NOT NULL,
  `gas` int(100) NOT NULL,
  `water` int(100) NOT NULL,
  `maintenance` int(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `flat`
--

INSERT INTO `flat` (`id`, `flat_no`, `user_id`, `tenantname`, `flatrent`, `broadband`, `cabletv`, `gas`, `water`, `maintenance`) VALUES
(2, '2(B)', 2, 'Haider Ali', 11000, 2000, 500, 900, 100, 2200),
(3, '3(C)', 4, 'Nameer Hassan', 12000, 2000, 550, 1000, 100, 2200),
(4, '1(B)', 5, 'Nafees Hassan', 13000, 2000, 600, 1000, 100, 2200),
(6, '1(A)', 1, 'Saad Ibna Omar Sabit', 13000, 2000, 600, 1000, 100, 2200);

-- --------------------------------------------------------

--
-- Table structure for table `invoice`
--

CREATE TABLE `invoice` (
  `id` int(100) NOT NULL,
  `flat_no` varchar(100) NOT NULL,
  `user_id` int(100) NOT NULL,
  `name` varchar(100) NOT NULL,
  `flatrent` int(100) NOT NULL,
  `broadband` int(100) NOT NULL,
  `cabletv` int(100) NOT NULL,
  `gas` int(100) NOT NULL,
  `water` int(100) NOT NULL,
  `maintenance` int(100) NOT NULL,
  `electricity` int(100) NOT NULL,
  `total` int(100) NOT NULL,
  `date` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `invoice`
--

INSERT INTO `invoice` (`id`, `flat_no`, `user_id`, `name`, `flatrent`, `broadband`, `cabletv`, `gas`, `water`, `maintenance`, `electricity`, `total`, `date`) VALUES
(2, '1(A)', 1, 'saad', 13000, 2000, 600, 1000, 100, 2200, 100, 15750, 'Saturday, September 29th, 2018 4:52 PM'),
(3, '2(B)', 2, 'haider', 11000, 2000, 500, 900, 100, 2200, 1000, 17700, 'Sunday, September 30th, 2018 8:22 AM'),
(4, '2(B)', 2, 'haider', 11000, 2000, 500, 900, 100, 2200, 1000, 17700, 'Sunday, September 30th, 2018 8:21 PM');

-- --------------------------------------------------------

--
-- Table structure for table `in_out_tracker`
--

CREATE TABLE `in_out_tracker` (
  `id` int(11) NOT NULL,
  `name` varchar(50) NOT NULL,
  `people` varchar(50) NOT NULL,
  `flat_no` varchar(50) NOT NULL,
  `cnum` varchar(50) NOT NULL,
  `gender` int(100) NOT NULL,
  `in_out` tinyint(100) NOT NULL,
  `date_time` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `in_out_tracker`
--

INSERT INTO `in_out_tracker` (`id`, `name`, `people`, `flat_no`, `cnum`, `gender`, `in_out`, `date_time`) VALUES
(71, 'skba', '12', '1(C)', '1234567', 0, 0, '11:48 AM, 09-Mar-19'),
(72, 'Test', '11', '2(B)', '12345', 1, 1, '11:44 AM, 09-Mar-19'),
(73, 'saad', '2', '2(B)', '123132', 0, 0, '3:58 PM, 14-Mar-19');

-- --------------------------------------------------------

--
-- Table structure for table `login_details`
--

CREATE TABLE `login_details` (
  `login_details_id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `last_activity` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `is_type` enum('no','yes') NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `login_details`
--

INSERT INTO `login_details` (`login_details_id`, `user_id`, `last_activity`, `is_type`) VALUES
(13, 2, '2019-03-14 07:55:11', 'no'),
(14, 2, '2019-03-14 07:57:11', 'no'),
(15, 2, '2019-03-14 08:02:59', 'no'),
(16, 2, '2019-03-14 09:11:54', 'no'),
(17, 1, '2019-03-14 09:12:34', 'no'),
(18, 2, '2019-03-14 09:22:30', 'no'),
(19, 7, '2019-03-14 09:23:29', 'no'),
(20, 2, '2019-03-14 09:23:52', 'no'),
(21, 2, '2019-03-14 09:24:15', 'no'),
(22, 7, '2019-03-14 09:24:55', 'no'),
(23, 4, '2019-03-14 09:25:53', 'no'),
(24, 4, '2019-03-14 09:25:59', 'no'),
(25, 2, '2019-03-14 09:26:31', 'no'),
(26, 4, '2019-03-14 09:26:39', 'no'),
(27, 7, '2019-03-14 09:27:10', 'no'),
(28, 5, '2019-03-14 09:27:36', 'no'),
(29, 7, '2019-03-14 09:27:58', 'no'),
(30, 2, '2019-03-14 09:30:01', 'no'),
(31, 2, '2019-03-14 09:30:54', 'no'),
(32, 7, '2019-03-14 09:31:20', 'no'),
(33, 7, '2019-03-14 09:39:23', 'no'),
(34, 2, '2019-03-14 09:39:35', 'no'),
(35, 7, '2019-03-14 09:39:42', 'no'),
(36, 2, '2019-03-14 09:41:00', 'no'),
(37, 7, '2019-03-14 09:42:15', 'no'),
(38, 7, '2019-03-14 09:44:19', 'no'),
(39, 2, '2019-03-14 09:50:38', 'no'),
(40, 7, '2019-03-14 09:50:53', 'no'),
(41, 7, '2019-03-14 10:36:10', 'no'),
(42, 2, '2019-03-14 10:36:17', 'no'),
(43, 2, '2019-03-14 10:40:45', 'no'),
(44, 7, '2019-03-14 10:40:52', 'no'),
(45, 1, '2019-03-14 10:42:31', 'no'),
(46, 7, '2019-03-14 10:43:09', 'no'),
(47, 7, '2019-03-14 10:43:58', 'no'),
(48, 7, '2019-03-14 10:44:31', 'no'),
(49, 7, '2019-03-14 10:46:02', 'no'),
(50, 7, '2019-03-14 10:46:07', 'no'),
(51, 7, '2019-03-14 10:46:11', 'no'),
(52, 7, '2019-03-14 10:51:45', 'no'),
(53, 7, '2019-03-14 10:56:01', 'no'),
(54, 7, '2019-03-14 10:56:13', 'no'),
(55, 7, '2019-03-14 10:56:19', 'no'),
(56, 7, '2019-03-14 11:07:50', 'no');

-- --------------------------------------------------------

--
-- Table structure for table `money`
--

CREATE TABLE `money` (
  `id` int(100) NOT NULL,
  `user_id` int(25) NOT NULL,
  `user_name` varchar(100) NOT NULL,
  `balance` int(100) DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `money`
--

INSERT INTO `money` (`id`, `user_id`, `user_name`, `balance`) VALUES
(1, 1, 'Saad Ibna Omar Sabit', 50000),
(2, 2, 'Haider Ali', 14600),
(3, 7, 'caretaker', 35400);

-- --------------------------------------------------------

--
-- Table structure for table `notice`
--

CREATE TABLE `notice` (
  `id` int(25) NOT NULL,
  `status` text NOT NULL,
  `notice_owner` varchar(100) NOT NULL,
  `date` varchar(100) NOT NULL,
  `notice_title` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `notice`
--

INSERT INTO `notice` (`id`, `status`, `notice_owner`, `date`, `notice_title`) VALUES
(7, 'There will be a meeting tomorrow 8am.Please attend all of you.\r\nThank You.', 'Caretaker', 'Friday, September 28th, 2018 9:31 PM', 'Meeting'),
(9, 'Please pay rent in time.\nThank You.', 'Caretaker', 'Sunday, September 30th, 2018 8:20 AM', 'Rent');

-- --------------------------------------------------------

--
-- Table structure for table `payment_history`
--

CREATE TABLE `payment_history` (
  `id` int(25) NOT NULL,
  `sender` int(25) NOT NULL,
  `receiver` int(25) NOT NULL,
  `balance_before` int(25) NOT NULL,
  `amount` int(25) NOT NULL,
  `balance_after` int(25) NOT NULL,
  `date` varchar(1000) NOT NULL,
  `checked` int(1) NOT NULL DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `payment_history`
--

INSERT INTO `payment_history` (`id`, `sender`, `receiver`, `balance_before`, `amount`, `balance_after`, `date`, `checked`) VALUES
(20, 2, 7, 50000, 17700, 32300, 'Sunday, September 30th, 2018 8:22 AM', 0),
(21, 2, 7, 0, 17700, 17700, 'Sunday, September 30th, 2018 8:22 AM', 1),
(22, 2, 7, 32300, 17700, 14600, 'Sunday, September 30th, 2018 8:21 PM', 0),
(23, 2, 7, 17700, 17700, 35400, 'Sunday, September 30th, 2018 8:21 PM', 1);

-- --------------------------------------------------------

--
-- Table structure for table `rent`
--

CREATE TABLE `rent` (
  `rent_id` int(11) NOT NULL,
  `user_id` int(1) NOT NULL,
  `flat_no` varchar(100) NOT NULL,
  `tenantname` varchar(100) NOT NULL,
  `electricity-bill` int(100) NOT NULL,
  `total` int(100) NOT NULL,
  `date` varchar(100) NOT NULL,
  `status` int(1) NOT NULL DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `rent`
--

INSERT INTO `rent` (`rent_id`, `user_id`, `flat_no`, `tenantname`, `electricity-bill`, `total`, `date`, `status`) VALUES
(8, 2, '2(B)', 'Haider Ali', 1000, 17700, 'Sunday, September 30th, 2018 8:18 AM', 1),
(9, 2, '2(B)', 'Haider Ali', 200, 16900, 'Sunday, September 30th, 2018 5:09 PM', 0);

-- --------------------------------------------------------

--
-- Table structure for table `service`
--

CREATE TABLE `service` (
  `id` int(25) NOT NULL,
  `flat_no` varchar(100) NOT NULL,
  `problem` varchar(100) NOT NULL,
  `date` varchar(100) NOT NULL,
  `status` int(2) NOT NULL,
  `manager` int(1) NOT NULL DEFAULT '0',
  `msg` varchar(1000) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `service`
--

INSERT INTO `service` (`id`, `flat_no`, `problem`, `date`, `status`, `manager`, `msg`) VALUES
(16, '2(B)', 'Mail', 'Sunday, September 30th, 2018 8:21 AM', 1, 1, 'You get a mail.please collect it from office in ground floor.\r\nThank You'),
(17, '2(B)', 'Internet', 'Sunday, September 30th, 2018 8:22 AM', 1, 0, ''),
(18, '2(B)', 'Houseworker', 'Sunday, September 30th, 2018 8:41 AM', 1, 0, ''),
(19, '2(B)', 'Electrician', 'Sunday, September 30th, 2018 5:07 PM', 1, 0, ''),
(20, '2(B)', 'Parking', 'Sunday, September 30th, 2018 5:10 PM', 1, 1, 'your parking slot is ready and parking num is 4'),
(21, '2(B)', 'Plumber', 'Sunday, September 30th, 2018 8:20 PM', 1, 0, ''),
(25, '2(B)', 'Telephone', 'Wednesday, March 13th, 2019 9:54 PM', 1, 1, ''),
(26, '2(B)', 'Telephone', 'Wednesday, March 13th, 2019 9:55 PM', 1, 0, ''),
(27, '2(B)', 'Telephone', 'Wednesday, March 13th, 2019 10:01 PM', 1, 0, '');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(25) NOT NULL,
  `username` varchar(100) NOT NULL,
  `password` varchar(100) NOT NULL,
  `email` varchar(100) NOT NULL,
  `name` varchar(100) NOT NULL,
  `nid` varchar(100) NOT NULL,
  `family_members` int(10) NOT NULL DEFAULT '1',
  `flat_no` varchar(100) NOT NULL,
  `phone` char(11) NOT NULL,
  `address` varchar(1000) NOT NULL,
  `user_level` int(1) NOT NULL DEFAULT '0',
  `isEmailConfirmed` tinyint(4) NOT NULL,
  `token` varchar(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `username`, `password`, `email`, `name`, `nid`, `family_members`, `flat_no`, `phone`, `address`, `user_level`, `isEmailConfirmed`, `token`) VALUES
(1, 'saad', '$2y$10$dD.vEmqO.33slw4c/HhbY.9seYjfKXb3NhNg01NaId4ZEKNl8s/fu', 'saad@gmail.com', 'Saad Ibna Omar Sabit', '1234567890', 1, '1(A)', '01671763399', 'Mirpur-12', 3, 0, ''),
(2, 'haider', '$2y$10$ogOdGesHX9XOpXK9smuK/OJwIs3gulrjA1xXPRuVudKV14UCYD..6', 'haider@gmail.com', 'Haider Ali', '987654321', 3, '2(B)', '12312312300', 'Mirpur-2', 4, 0, ''),
(4, 'nameer', '$2y$10$iyBz5NzLgJHSVacemwbo1OL55.Z.ZF7BIaSxSL5fIwz10Sc10JsYC', 'nameer@gmail.com', 'Nameer Hassan', '53245325435', 4, '3(C)', '01234568900', 'Mirpur-1', 4, 0, ''),
(5, 'nafees', '$2y$10$4tmfECeeG0jqs4Qt2LQFsuPNlG2NUy1tMgt3NMMY6Ap7m2As8yC4i', 'nafees@gmail.com', 'Nafees Hassan', '543534534522', 2, '1(B)', '01234564000', 'Dhanmondi-10', 4, 0, ''),
(7, 'caretaker', '$2y$10$v6U.vEXgIIxxsie4otlfSeqO/d54J8DuT.kqlfXalgNmglSB4vFLK', 'caretaker@gmail.com', 'Caretaker', '12345672313', 1, 'N/A', '01231231230', 'Dhanmondi-15', 1, 0, ''),
(10, 'root', '$2y$10$ns6zFZaIHubk/ZW0npbB..L8GazkfYwpvShbfQHhsQdsZagulhO/2', 'ss@gmail.com', 'root', '65432543763', 1, '2(A)', '02376152380', '', 4, 0, '');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `chat_message`
--
ALTER TABLE `chat_message`
  ADD PRIMARY KEY (`chat_message_id`),
  ADD UNIQUE KEY `chat_message_id` (`chat_message_id`);

--
-- Indexes for table `domestic_worker`
--
ALTER TABLE `domestic_worker`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `flat`
--
ALTER TABLE `flat`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `invoice`
--
ALTER TABLE `invoice`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `in_out_tracker`
--
ALTER TABLE `in_out_tracker`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `login_details`
--
ALTER TABLE `login_details`
  ADD PRIMARY KEY (`login_details_id`);

--
-- Indexes for table `money`
--
ALTER TABLE `money`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `notice`
--
ALTER TABLE `notice`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `payment_history`
--
ALTER TABLE `payment_history`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `rent`
--
ALTER TABLE `rent`
  ADD PRIMARY KEY (`rent_id`);

--
-- Indexes for table `service`
--
ALTER TABLE `service`
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
-- AUTO_INCREMENT for table `chat_message`
--
ALTER TABLE `chat_message`
  MODIFY `chat_message_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=19;
--
-- AUTO_INCREMENT for table `domestic_worker`
--
ALTER TABLE `domestic_worker`
  MODIFY `id` int(100) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;
--
-- AUTO_INCREMENT for table `flat`
--
ALTER TABLE `flat`
  MODIFY `id` int(25) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;
--
-- AUTO_INCREMENT for table `invoice`
--
ALTER TABLE `invoice`
  MODIFY `id` int(100) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
--
-- AUTO_INCREMENT for table `in_out_tracker`
--
ALTER TABLE `in_out_tracker`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=74;
--
-- AUTO_INCREMENT for table `login_details`
--
ALTER TABLE `login_details`
  MODIFY `login_details_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=57;
--
-- AUTO_INCREMENT for table `money`
--
ALTER TABLE `money`
  MODIFY `id` int(100) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
--
-- AUTO_INCREMENT for table `notice`
--
ALTER TABLE `notice`
  MODIFY `id` int(25) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;
--
-- AUTO_INCREMENT for table `payment_history`
--
ALTER TABLE `payment_history`
  MODIFY `id` int(25) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=24;
--
-- AUTO_INCREMENT for table `rent`
--
ALTER TABLE `rent`
  MODIFY `rent_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;
--
-- AUTO_INCREMENT for table `service`
--
ALTER TABLE `service`
  MODIFY `id` int(25) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=28;
--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(25) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
