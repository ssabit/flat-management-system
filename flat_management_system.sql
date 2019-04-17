-- phpMyAdmin SQL Dump
-- version 4.5.1
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: Apr 17, 2019 at 04:46 PM
-- Server version: 10.1.13-MariaDB
-- PHP Version: 5.6.20

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `webhost`
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
  `timestamp` timestamp NULL DEFAULT NULL,
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
(14, 4, 2, 'hellow', '2019-03-14 09:26:26', 0),
(15, 4, 2, 'jlksajd\n', '2019-03-14 09:26:30', 0),
(16, 5, 2, 'asdasd', '2019-03-14 09:26:34', 1),
(17, 5, 7, 'hi', '2019-03-14 09:26:53', 1),
(18, 2, 7, 'where are you?', '2019-03-14 10:36:12', 0),
(19, 4, 2, 'hi', '2019-03-23 14:58:13', 0),
(20, 2, 4, 'hi', '2019-03-26 16:23:45', 0),
(21, 2, 4, 'haider', '2019-03-26 16:33:05', 0),
(22, 4, 2, 'online dekhay na kan!\n\n', '2019-03-26 16:33:53', 0),
(23, 4, 2, 'ghumaoooooo', '2019-03-26 16:48:15', 0),
(24, 2, 4, 'asd', '2019-03-26 17:01:01', 0),
(25, 2, 4, 'asdad', '2019-03-26 17:13:13', 0),
(26, 2, 4, 'test', '2019-03-26 17:19:48', 0),
(27, 2, 4, 'asd', '2019-03-26 17:20:56', 0),
(28, 2, 4, 'asd', '2019-03-26 17:21:16', 0),
(29, 2, 4, 'asd', '2019-03-26 17:46:46', 0),
(30, 2, 4, 'asd', '2019-03-26 17:48:46', 0),
(31, 4, 2, 'sasd', '2019-03-26 18:03:39', 0),
(32, 7, 2, 'i am twilio', '2019-03-27 03:29:20', 0),
(33, 4, 2, 'Testing sms to Sabit', '2019-03-27 03:52:45', 0),
(34, 4, 2, 'Eibar geche sure.. :P', '2019-03-27 03:59:12', 0),
(35, 2, 4, 'Got the message?', '2019-03-27 04:04:27', 0),
(36, 4, 2, 'haider ali', '2019-03-27 04:34:51', 0),
(37, 4, 2, 'test', '2019-03-27 07:12:06', 0),
(38, 4, 2, 'test', '2019-03-27 07:15:04', 0),
(39, 4, 2, 'test', '2019-03-27 07:16:27', 0),
(40, 4, 2, 'hi', '2019-03-27 08:03:48', 0),
(41, 4, 2, 'sdasd', '2019-03-27 09:00:06', 0),
(42, 2, 7, 'kbk', '2019-03-27 16:09:55', 0),
(43, 7, 2, 'paisen msg??', '2019-03-27 16:12:52', 0),
(44, 4, 2, 'paisen,nameer', '2019-03-27 16:14:44', 0),
(45, 7, 2, 'paisen msg?? ct', '2019-03-27 16:15:06', 0),
(46, 7, 2, ' paisen msg?? ct ', '2019-03-27 16:17:55', 0),
(47, 4, 2, 'paisen,nameer ', '2019-03-27 16:18:20', 0),
(48, 7, 2, 'online  paisen msg?? ct ', '2019-03-27 16:19:25', 0),
(49, 2, 7, 'asd', '2019-03-27 22:55:22', 0),
(50, 2, 7, 'yess', '2019-03-27 22:55:35', 0),
(51, 4, 2, 'asd', '2019-03-27 22:59:04', 0),
(52, 4, 2, 'asdasd', '2019-03-27 22:59:10', 0),
(53, 4, 2, 'hi', '2019-04-14 19:55:38', 0),
(54, 2, 4, 'hlw', '2019-04-14 19:58:42', 0),
(55, 7, 2, 'project show', '2019-04-15 11:28:34', 1),
(56, 7, 2, 'project', '2019-04-15 12:26:21', 1),
(57, 7, 2, '', '2019-04-15 12:26:47', 1);

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
(1, 'Unknown', 'cook', '11111', 0, 'abcd', '5c85396a08de93.82725949.jpg', '2(A)', '123123');

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
(73, 'saad', '2', '2(B)', '123132', 0, 0, '3:58 PM, 14-Mar-19'),
(76, 'sadad', '12', '2(A)', '123', 0, 1, '9:50 PM, 26-Mar-19'),
(77, 'Rafi', '5', '1(C)', '445', 0, 0, '12:02 PM, 09-Apr-19');

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
(56, 7, '2019-03-14 11:07:50', 'no'),
(57, 2, '2019-03-23 14:47:53', 'no'),
(58, 2, '2019-03-23 14:51:30', 'no'),
(59, 2, '2019-03-23 14:55:25', 'no'),
(60, 2, '2019-03-23 14:55:44', 'no'),
(61, 2, '2019-03-23 14:56:04', 'no'),
(62, 2, '2019-03-23 14:56:37', 'no'),
(63, 2, '2019-03-23 14:58:19', 'no'),
(64, 2, '2019-03-23 14:58:30', 'no'),
(65, 2, '2019-03-23 15:02:15', 'no'),
(66, 2, '2019-03-25 06:53:29', 'no'),
(67, 2, '2019-03-25 09:07:54', 'no'),
(68, 7, '2019-03-25 09:10:31', 'no'),
(69, 1, '2019-03-25 09:11:47', 'no'),
(70, 2, '2019-03-25 14:52:39', 'no'),
(71, 2, '2019-03-25 14:57:41', 'no'),
(72, 2, '2019-03-25 14:57:44', 'no'),
(73, 7, '2019-03-25 15:06:25', 'no'),
(74, 2, '2019-03-25 15:09:22', 'no'),
(75, 2, '2019-03-25 15:09:32', 'no'),
(76, 2, '2019-03-25 15:12:05', 'no'),
(77, 2, '2019-03-25 15:12:14', 'no'),
(78, 2, '2019-03-25 15:12:30', 'no'),
(79, 2, '2019-03-25 15:13:59', 'no'),
(80, 2, '2019-03-25 15:14:10', 'no'),
(81, 2, '2019-03-25 15:14:19', 'no'),
(82, 2, '2019-03-25 15:14:30', 'no'),
(83, 2, '2019-03-25 15:14:45', 'no'),
(84, 2, '2019-03-25 15:15:33', 'no'),
(85, 7, '2019-03-25 16:52:16', 'no'),
(86, 7, '2019-03-25 16:59:21', 'no'),
(87, 2, '2019-03-25 17:00:05', 'no'),
(88, 7, '2019-03-25 17:00:35', 'no'),
(89, 4, '2019-03-26 15:34:31', 'no'),
(90, 7, '2019-03-26 15:49:58', 'no'),
(91, 7, '2019-03-26 15:53:46', 'no'),
(92, 7, '2019-03-26 15:55:38', 'no'),
(93, 7, '2019-03-26 15:56:48', 'no'),
(94, 7, '2019-03-26 15:58:25', 'no'),
(95, 7, '2019-03-26 15:59:43', 'no'),
(96, 1, '2019-03-26 16:06:20', 'no'),
(97, 1, '2019-03-26 16:07:44', 'no'),
(98, 7, '2019-03-26 16:07:55', 'no'),
(99, 4, '2019-03-26 16:26:53', 'no'),
(100, 2, '2019-03-26 16:28:21', 'no'),
(101, 4, '2019-03-26 16:34:40', 'no'),
(102, 2, '2019-03-26 16:48:26', 'no'),
(103, 4, '2019-03-26 16:37:09', 'no'),
(104, 4, '2019-03-26 17:01:06', 'no'),
(105, 2, '2019-03-26 17:01:17', 'no'),
(106, 4, '2019-03-26 17:02:12', 'no'),
(107, 2, '2019-03-26 17:02:07', 'no'),
(108, 4, '2019-03-26 11:21:06', 'no'),
(109, 4, '2019-03-26 17:42:21', 'no'),
(110, 4, '2019-03-26 17:47:12', 'no'),
(111, 2, '2019-03-26 17:46:32', 'no'),
(112, 4, '2019-03-26 17:48:58', 'no'),
(113, 4, '2019-03-26 17:54:28', 'no'),
(114, 2, '2019-03-26 17:54:54', 'no'),
(115, 2, '2019-03-26 18:03:49', 'no'),
(116, 2, '2019-03-27 03:29:27', 'no'),
(117, 2, '2019-03-27 04:03:35', 'no'),
(118, 4, '2019-03-27 04:12:24', 'no'),
(119, 2, '2019-03-27 04:33:44', 'no'),
(120, 2, '2019-03-27 04:35:59', 'no'),
(121, 2, '2019-03-27 05:08:08', 'no'),
(122, 2, '2019-03-27 07:12:20', 'no'),
(123, 2, '2019-03-27 07:13:41', 'no'),
(124, 2, '2019-03-27 07:15:09', 'no'),
(125, 2, '2019-03-27 07:24:27', 'no'),
(126, 4, '2019-03-27 07:16:03', 'no'),
(127, 4, '2019-03-27 07:17:10', 'no'),
(128, 4, '2019-03-27 07:17:11', 'no'),
(129, 2, '2019-03-27 15:01:40', 'no'),
(130, 4, '2019-03-27 08:44:58', 'no'),
(131, 4, '2019-03-27 15:01:47', 'no'),
(132, 2, '2019-03-27 15:23:33', 'no'),
(133, 7, '2019-03-27 22:11:22', 'no'),
(134, 2, '2019-03-27 22:11:51', 'no'),
(135, 2, '2019-03-27 22:15:20', 'no'),
(136, 7, '2019-03-27 22:14:05', 'no'),
(137, 2, '2019-03-27 22:19:49', 'no'),
(138, 7, '2019-03-27 22:56:54', 'no'),
(139, 2, '2019-03-27 23:00:28', 'no'),
(140, 2, '2019-03-27 17:08:05', 'no'),
(141, 2, '2019-04-09 05:37:25', 'no'),
(142, 7, '2019-04-09 06:01:57', 'no'),
(143, 7, '2019-04-09 13:17:37', 'no'),
(144, 2, '2019-04-14 06:35:20', 'no'),
(145, 2, '2019-04-14 07:08:29', 'no'),
(146, 2, '2019-04-14 07:09:59', 'no'),
(147, 2, '2019-04-14 07:12:43', 'no'),
(148, 2, '2019-04-14 19:55:53', 'no'),
(149, 4, '2019-04-14 19:56:45', 'no'),
(150, 7, '2019-04-14 13:56:06', 'no'),
(151, 4, '2019-04-14 19:58:56', 'no'),
(152, 4, '2019-04-14 14:05:48', 'no'),
(153, 7, '2019-04-14 14:05:56', 'no'),
(154, 2, '2019-04-14 14:09:16', 'no'),
(155, 1, '2019-04-14 14:48:25', 'no'),
(156, 1, '2019-04-14 14:49:01', 'no'),
(157, 10, '2019-04-14 14:49:29', 'no'),
(158, 7, '2019-04-14 14:49:48', 'no'),
(159, 1, '2019-04-14 14:53:03', 'no'),
(160, 1, '2019-04-14 14:56:38', 'no'),
(161, 1, '2019-04-14 14:56:46', 'no'),
(162, 1, '2019-04-14 15:04:12', 'no'),
(163, 1, '2019-04-14 15:07:45', 'no'),
(164, 1, '2019-04-14 15:09:07', 'no'),
(165, 1, '2019-04-14 15:10:41', 'no'),
(166, 1, '2019-04-14 15:11:24', 'no'),
(167, 1, '2019-04-14 15:16:26', 'no'),
(168, 1, '2019-04-14 15:18:53', 'no'),
(169, 1, '2019-04-14 15:22:01', 'no'),
(170, 1, '2019-04-14 15:22:37', 'no'),
(171, 7, '2019-04-14 15:22:53', 'no'),
(172, 7, '2019-04-14 15:24:15', 'no'),
(173, 7, '2019-04-14 15:26:48', 'no'),
(174, 7, '2019-04-14 15:28:14', 'no'),
(175, 7, '2019-04-14 15:29:14', 'no'),
(176, 2, '2019-04-14 15:29:23', 'no'),
(177, 2, '2019-04-14 21:36:44', 'no'),
(178, 2, '2019-04-14 15:36:46', 'no'),
(179, 2, '2019-04-14 15:37:31', 'no'),
(180, 2, '2019-04-14 15:50:59', 'no'),
(181, 7, '2019-04-14 15:51:20', 'no'),
(182, 7, '2019-04-14 15:57:26', 'no'),
(183, 7, '2019-04-14 15:58:38', 'no'),
(184, 7, '2019-04-14 15:58:46', 'no'),
(185, 7, '2019-04-14 15:59:51', 'no'),
(186, 7, '2019-04-14 16:01:36', 'no'),
(187, 7, '2019-04-14 16:04:36', 'no'),
(188, 7, '2019-04-14 16:09:45', 'no'),
(189, 2, '2019-04-14 16:10:11', 'no'),
(190, 7, '2019-04-14 16:35:30', 'no'),
(191, 7, '2019-04-14 16:40:17', 'no'),
(192, 1, '2019-04-14 16:40:26', 'no'),
(193, 1, '2019-04-14 17:05:12', 'no'),
(194, 7, '2019-04-14 17:05:22', 'no'),
(195, 1, '2019-04-14 17:37:29', 'no'),
(196, 1, '2019-04-15 01:46:18', 'no'),
(197, 1, '2019-04-15 04:16:56', 'no'),
(198, 2, '2019-04-15 04:18:28', 'no'),
(199, 2, '2019-04-15 05:27:57', 'no'),
(200, 2, '2019-04-15 11:29:12', 'no'),
(201, 2, '2019-04-15 06:23:04', 'no'),
(202, 2, '2019-04-15 12:27:00', 'no'),
(203, 7, '2019-04-15 06:27:08', 'no'),
(204, 2, '2019-04-16 05:19:10', 'no'),
(205, 7, '2019-04-16 05:19:28', 'no'),
(206, 1, '2019-04-16 05:20:14', 'no'),
(207, 2, '2019-04-16 15:11:32', 'no'),
(208, 7, '2019-04-16 09:13:46', 'no'),
(209, 1, '2019-04-16 09:20:04', 'no'),
(210, 1, '2019-04-16 09:20:20', 'no'),
(211, 2, '2019-04-16 09:23:08', 'no'),
(212, 2, '2019-04-16 09:23:16', 'no'),
(213, 7, '2019-04-16 09:23:27', 'no'),
(214, 2, '2019-04-16 15:32:34', 'no'),
(215, 7, '2019-04-16 09:32:53', 'no'),
(216, 1, '2019-04-16 09:43:38', 'no'),
(217, 7, '2019-04-16 09:52:49', 'no'),
(218, 7, '2019-04-16 09:53:34', 'no'),
(219, 7, '2019-04-16 10:10:28', 'no'),
(220, 7, '2019-04-16 23:40:14', 'no'),
(221, 2, '2019-04-16 17:48:50', 'no'),
(222, 2, '2019-04-17 01:12:01', 'no'),
(223, 7, '2019-04-17 01:13:12', 'no'),
(224, 7, '2019-04-17 01:13:49', 'no'),
(225, 1, '2019-04-17 01:14:52', 'no'),
(226, 2, '2019-04-17 04:06:57', 'no'),
(227, 2, '2019-04-17 04:06:57', 'no'),
(228, 1, '2019-04-17 04:13:20', 'no'),
(229, 7, '2019-04-17 04:23:56', 'no'),
(230, 2, '2019-04-17 14:40:19', 'no'),
(231, 7, '2019-04-17 14:43:34', 'no'),
(232, 2, '2019-04-17 14:43:44', 'no'),
(233, 2, '2019-04-17 20:46:02', 'no'),
(234, 7, '2019-04-17 14:45:49', 'no');

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
(9, 'Please pay rent in time.\nThank You.', 'Caretaker', 'Sunday, September 30th, 2018 8:20 AM', 'Rent'),
(13, 'asdad', 'caretaker', 'Monday, March 25th, 2019 10:55 PM', 'sada');

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
  `status` int(2) NOT NULL DEFAULT '0',
  `manager` int(1) NOT NULL DEFAULT '0',
  `msg` varchar(1000) DEFAULT NULL
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
(27, '2(B)', 'Telephone', 'Wednesday, March 13th, 2019 10:01 PM', 1, 0, ''),
(30, '2(B)', 'Houseworker', 'Monday, March 25th, 2019 9:47 PM', 1, 0, NULL),
(33, '3(C)', 'Internet', 'Tuesday, March 26th, 2019 9:34 PM', 1, 0, NULL),
(35, '2(B)', 'Houseworker', 'Tuesday, April 16th, 2019 3:27 PM', 1, 0, NULL),
(36, '2(A)', 'Contact', 'Tuesday, April 16th, 2019 3:37 PM', 0, 1, 'ppp'),
(37, '2(B)', 'Electrician', 'Wednesday, April 17th, 2019 8:43 PM', 1, 0, NULL);

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
  `user_level` int(1) NOT NULL DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `username`, `password`, `email`, `name`, `nid`, `family_members`, `flat_no`, `phone`, `address`, `user_level`) VALUES
(1, 'saad', '$2y$10$dD.vEmqO.33slw4c/HhbY.9seYjfKXb3NhNg01NaId4ZEKNl8s/fu', 'saad@gmail.com', 'Saad Ibna Omar Sabit', '1234567890', 1, '1(A)', '01671763399', 'Mirpur-12', 3),
(2, 'haider', '$2y$10$ogOdGesHX9XOpXK9smuK/OJwIs3gulrjA1xXPRuVudKV14UCYD..6', 'haider@gmail.com', 'Haider Ali', '987654321', 3, '2(B)', '12312312300', 'Mirpur-2', 4),
(4, 'nameer', '$2y$10$iyBz5NzLgJHSVacemwbo1OL55.Z.ZF7BIaSxSL5fIwz10Sc10JsYC', 'nameer@gmail.com', 'Nameer Hassan', '53245325435', 4, '3(C)', '01234568900', 'Mirpur-1', 4),
(5, 'nafees', '$2y$10$4tmfECeeG0jqs4Qt2LQFsuPNlG2NUy1tMgt3NMMY6Ap7m2As8yC4i', 'nafees@gmail.com', 'Nafees Hassan', '543534534522', 2, '1(B)', '01234564000', 'Dhanmondi-10', 4),
(7, 'caretaker', '$2y$10$v6U.vEXgIIxxsie4otlfSeqO/d54J8DuT.kqlfXalgNmglSB4vFLK', 'caretaker@gmail.com', 'Caretaker', '12345672313', 1, 'N/A', '01231231230', 'Dhanmondi-15', 1),
(10, 'root', '$2y$10$WeHaG0CXq9aOEQIoXU9qGegRmCORWcws1/F9gLWtvLm7UNIg28BCC', 'ss@gmail.com', 'root', '65432543763', 1, '2(A)', '02376152380', '', 4);

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
  MODIFY `chat_message_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=58;
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
-- AUTO_INCREMENT for table `in_out_tracker`
--
ALTER TABLE `in_out_tracker`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=82;
--
-- AUTO_INCREMENT for table `login_details`
--
ALTER TABLE `login_details`
  MODIFY `login_details_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=235;
--
-- AUTO_INCREMENT for table `money`
--
ALTER TABLE `money`
  MODIFY `id` int(100) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
--
-- AUTO_INCREMENT for table `notice`
--
ALTER TABLE `notice`
  MODIFY `id` int(25) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;
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
  MODIFY `id` int(25) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=38;
--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(25) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
