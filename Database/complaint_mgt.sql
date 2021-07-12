-- phpMyAdmin SQL Dump
-- version 4.7.7
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Mar 14, 2021 at 09:47 PM
-- Server version: 10.1.30-MariaDB
-- PHP Version: 7.2.2

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `complaint_mgt`
--

-- --------------------------------------------------------

--
-- Table structure for table `comlog`
--

CREATE TABLE `comlog` (
  `log_id` int(11) NOT NULL,
  `username` varchar(50) NOT NULL,
  `action` varchar(50) NOT NULL,
  `date_time` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `comlog`
--

INSERT INTO `comlog` (`log_id`, `username`, `action`, `date_time`) VALUES
(6, 'ty', 'Update Profile', '2019-09-28 18:48:39'),
(7, 'ty', 'Update Profile', '2019-09-28 18:50:42'),
(8, 'test', 'Created Account', '2019-09-28 18:54:05'),
(9, 'test', 'Logged Out', '2019-09-28 18:59:23'),
(10, 'test', 'Logged Out', '2019-09-28 19:01:19'),
(11, 'ty', 'Logged Out', '2019-09-28 19:04:55'),
(12, 'ty', 'Logged Out', '2019-09-28 19:06:24'),
(13, 'ty', 'Logged In', '2019-09-28 19:08:16'),
(14, 'ty', 'Logged Out', '2019-09-28 19:09:09'),
(15, 'test', 'Logged In', '2019-09-28 19:09:27'),
(16, 'test', 'Update Profile', '2019-09-28 19:09:45'),
(17, 'test', 'Update Profile', '2019-09-28 19:09:57'),
(18, 'test', 'Logged Out', '2019-09-28 19:20:15'),
(19, 'bola', 'Logged In', '2019-09-29 13:20:33'),
(20, 'bola', 'Update Profile', '2019-09-29 13:20:52'),
(21, 'bola', 'Update Profile', '2019-09-29 13:21:23'),
(22, 'bola', 'Logged Out', '2019-09-29 13:21:34'),
(23, 'ty', 'Logged In', '2029-09-19 13:26:25'),
(24, 'ty', 'Update Profile', '2029-09-19 13:26:40'),
(25, 'ty', 'Logged Out', '2029-09-19 13:26:44'),
(26, 'ty', 'Logged In', '2019-09-29 13:29:23'),
(27, 'ty', 'Update Profile', '2019-09-29 13:29:37');

-- --------------------------------------------------------

--
-- Table structure for table `complainant`
--

CREATE TABLE `complainant` (
  `complainant_id` int(11) NOT NULL,
  `first_name` varchar(50) NOT NULL,
  `last_name` varchar(50) NOT NULL,
  `email` varchar(50) NOT NULL,
  `meter_num` varchar(50) DEFAULT NULL,
  `username` varchar(50) NOT NULL,
  `password` varchar(50) NOT NULL,
  `tel_number` varchar(11) NOT NULL,
  `address` varchar(50) NOT NULL,
  `local_govt` varchar(11) NOT NULL,
  `date_reg` datetime DEFAULT NULL,
  `date_modified` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `complainant`
--

INSERT INTO `complainant` (`complainant_id`, `first_name`, `last_name`, `email`, `meter_num`, `username`, `password`, `tel_number`, `address`, `local_govt`, `date_reg`, `date_modified`) VALUES
(1, 'Oluwatobi', 'Ezekiel', 'oluwatobi.emma@yahoo.com', '', 'toff', 'toff', '08111254585', '24, Ojo Road Bosso', 'Bosso', '2019-11-13 09:44:26', '0000-00-00 00:00:00'),
(2, 'Olaniyi', 'Emmanuel', 'olaniyi@yahoo.com', '25487/545', 'ola', 'ola', '07025698745', 'Industrial Road, Chanchaga', 'Chanchaga', '2019-11-13 09:58:01', '2019-11-14 02:16:31');

-- --------------------------------------------------------

--
-- Table structure for table `complaint`
--

CREATE TABLE `complaint` (
  `complaint_id` int(11) NOT NULL,
  `complainant_id` int(11) NOT NULL,
  `complaint_title` varchar(50) NOT NULL,
  `complaint_details` varchar(255) NOT NULL,
  `location` varchar(20) NOT NULL,
  `complaint_file` varchar(255) DEFAULT NULL,
  `status` varchar(8) NOT NULL,
  `date_reg` datetime DEFAULT NULL,
  `date_modified` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `complaint`
--

INSERT INTO `complaint` (`complaint_id`, `complainant_id`, `complaint_title`, `complaint_details`, `location`, `complaint_file`, `status`, `date_reg`, `date_modified`) VALUES
(1, 1, 'Faulty Transformer', 'Our Transformer develop fault ', 'Bosso', '', '1', '2019-11-13 09:45:59', '2019-11-13 09:48:02'),
(2, 1, 'Low Voltage ', 'We have been experiencing low voltage for a while now', 'Bosso', '', '2', '2019-11-13 09:52:14', '2019-11-15 05:03:24'),
(3, 1, 'Electric Shock', 'Ever since the new transformer was installed, We have been experiencing electric shock probably due to improper grounding', 'Bosso', '', '2', '2019-11-13 09:53:57', '2019-11-13 09:55:20'),
(4, 2, 'Fallen Pool', 'Due to the heavy down pour yesterday, two poles fell down', 'Chanchaga', '', '0', '2019-11-14 12:13:23', '0000-00-00 00:00:00'),
(5, 1, 'Fallen Pole', 'Three Pole fell down last night', 'Bosso', '', '0', '2019-11-14 12:16:06', '0000-00-00 00:00:00'),
(6, 1, 'Wrong connection', 'There is a wrong connection in my house', 'Bosso', 'CHAPTER TWO edit.docx', '0', '2019-11-14 03:22:41', '0000-00-00 00:00:00'),
(7, 1, 'Fallen pole', 'Three poles fell', 'Bosso', 'IRJET-V4I4143.pdf', '0', '2019-11-14 03:26:46', '0000-00-00 00:00:00');

-- --------------------------------------------------------

--
-- Table structure for table `complaint_remark`
--

CREATE TABLE `complaint_remark` (
  `cr_id` int(11) NOT NULL,
  `complaint_id` int(11) NOT NULL,
  `status` varchar(11) NOT NULL,
  `remark` varchar(50) NOT NULL,
  `remark_date` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `complaint_remark`
--

INSERT INTO `complaint_remark` (`cr_id`, `complaint_id`, `status`, `remark`, `remark_date`) VALUES
(1, 1, '1', 'Acknowledged ', '2019-11-13 09:48:02'),
(2, 3, '2', 'Seen and it has been fixed...', '2019-11-13 09:55:20'),
(3, 2, '2', 'vc,jcb', '2019-11-15 05:03:24');

-- --------------------------------------------------------

--
-- Table structure for table `disco`
--

CREATE TABLE `disco` (
  `disco_id` int(11) NOT NULL,
  `name` varchar(40) NOT NULL,
  `abbreviation` varchar(8) NOT NULL,
  `username` varchar(20) NOT NULL,
  `password` varchar(20) NOT NULL,
  `address` varchar(225) NOT NULL,
  `email` varchar(20) NOT NULL,
  `tel_number` varchar(40) NOT NULL,
  `date_created` datetime DEFAULT NULL,
  `date_modified` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `disco`
--

INSERT INTO `disco` (`disco_id`, `name`, `abbreviation`, `username`, `password`, `address`, `email`, `tel_number`, `date_created`, `date_modified`) VALUES
(3, 'Abuja Electricity Distribution Company', 'AEDC', 'aedclogin', 'admin', 'District 7, Wuse Abuja', 'aedc@yahoo.com', '08133968069', '2019-11-13 09:29:44', '0000-00-00 00:00:00');

-- --------------------------------------------------------

--
-- Table structure for table `discolog`
--

CREATE TABLE `discolog` (
  `log_id` int(11) NOT NULL,
  `username` varchar(50) NOT NULL,
  `action` varchar(50) NOT NULL,
  `date_time` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `local_govt`
--

CREATE TABLE `local_govt` (
  `lga_id` int(11) NOT NULL,
  `lga_name` varchar(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `local_govt`
--

INSERT INTO `local_govt` (`lga_id`, `lga_name`) VALUES
(1, 'Bosso'),
(2, 'Chanchaga'),
(3, 'Shiroro');

-- --------------------------------------------------------

--
-- Table structure for table `location`
--

CREATE TABLE `location` (
  `location_id` int(11) NOT NULL,
  `address` varchar(50) NOT NULL,
  `local_govt` varchar(25) NOT NULL,
  `user_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `log`
--

CREATE TABLE `log` (
  `log_id` int(11) NOT NULL,
  `username` varchar(10) NOT NULL,
  `action` varchar(50) NOT NULL,
  `date_time` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `acct_type` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `log`
--

INSERT INTO `log` (`log_id`, `username`, `action`, `date_time`, `acct_type`) VALUES
(5, 'toff', 'Logged In', '2019-11-13 08:44:48', 'commplainant'),
(6, 'toff', 'Lodge Complaint', '2019-11-13 08:44:51', 'commplainant'),
(7, 'toff', 'Lodge Complaint', '2019-11-13 08:45:59', 'commplainant'),
(8, 'toff', 'Lodge Complaint', '2019-11-13 08:46:01', 'commplainant'),
(9, 'toff', 'Lodge Complaint', '2019-11-13 08:46:05', 'commplainant'),
(10, 'toff', 'Lodge Complaint', '2019-11-13 08:46:09', 'commplainant'),
(11, 'toff', 'Logged Out', '2019-11-13 08:46:14', 'commplainant'),
(12, 'sc01', 'Logged In', '2019-11-13 08:47:06', 'sc'),
(13, 'sc01', 'Logged Out', '2019-11-13 08:49:42', 'sc'),
(14, 'toff', 'Logged In', '2019-11-13 08:49:50', 'commplainant'),
(15, 'toff', 'Print Complaint Report', '2019-11-13 08:49:56', 'commplainant'),
(16, 'toff', 'Print Complaint Report', '2019-11-13 08:50:13', 'commplainant'),
(17, 'toff', 'Lodge Complaint', '2019-11-13 08:51:21', 'commplainant'),
(18, 'toff', 'Lodge Complaint', '2019-11-13 08:52:14', 'commplainant'),
(19, 'toff', 'Lodge Complaint', '2019-11-13 08:52:16', 'commplainant'),
(20, 'toff', 'Lodge Complaint', '2019-11-13 08:52:18', 'commplainant'),
(21, 'toff', 'Lodge Complaint', '2019-11-13 08:52:23', 'commplainant'),
(22, 'toff', 'Lodge Complaint', '2019-11-13 08:53:57', 'commplainant'),
(23, 'toff', 'Lodge Complaint', '2019-11-13 08:54:01', 'commplainant'),
(24, 'toff', 'Lodge Complaint', '2019-11-13 08:54:02', 'commplainant'),
(25, 'toff', 'Lodge Complaint', '2019-11-13 08:54:09', 'commplainant'),
(26, 'toff', 'Lodge Complaint', '2019-11-13 08:54:14', 'commplainant'),
(27, 'toff', 'Logged Out', '2019-11-13 08:54:24', 'commplainant'),
(28, 'sc01', 'Logged In', '2019-11-13 08:54:44', 'sc'),
(29, 'sc01', 'Logged Out', '2019-11-13 08:56:38', 'sc'),
(30, 'toff', 'Logged In', '2019-11-13 08:58:32', 'commplainant'),
(31, 'toff', 'Print Complaint Report', '2019-11-13 08:59:41', 'commplainant'),
(32, 'toff', 'Print Complaint Report', '2019-11-13 08:59:45', 'commplainant'),
(33, 'toff', 'Logged Out', '2019-11-13 08:59:49', 'commplainant'),
(34, 'ola', 'Logged In', '2019-11-14 11:12:04', 'commplainant'),
(35, 'ola', 'Lodge Complaint', '2019-11-14 11:12:07', 'commplainant'),
(36, 'ola', 'Lodge Complaint', '2019-11-14 11:13:23', 'commplainant'),
(37, 'ola', 'Lodge Complaint', '2019-11-14 11:13:25', 'commplainant'),
(38, 'ola', 'Lodge Complaint', '2019-11-14 11:13:28', 'commplainant'),
(39, 'ola', 'Logged Out', '2019-11-14 11:15:18', 'commplainant'),
(40, 'toff', 'Logged In', '2019-11-14 11:15:27', 'commplainant'),
(41, 'toff', 'Lodge Complaint', '2019-11-14 11:15:30', 'commplainant'),
(42, 'toff', 'Lodge Complaint', '2019-11-14 11:16:06', 'commplainant'),
(43, 'toff', 'Lodge Complaint', '2019-11-14 11:16:08', 'commplainant'),
(44, 'toff', 'Logged Out', '2019-11-14 11:32:52', 'commplainant'),
(45, 'sc02', 'Logged In', '2019-11-14 11:33:21', 'sc'),
(46, 'sc02', 'Logged Out', '2019-11-14 11:33:43', 'sc'),
(47, 'sc02', 'Logged In', '2019-11-14 11:33:48', 'sc'),
(48, 'sc02', 'Logged Out', '2019-11-14 11:34:20', 'sc'),
(49, 'sc01', 'Logged In', '2019-11-14 11:34:23', 'sc'),
(50, 'sc01', 'Logged Out', '2019-11-14 11:34:26', 'sc'),
(51, 'sc02', 'Logged In', '2019-11-14 11:34:41', 'sc'),
(52, 'sc02', 'Logged Out', '2019-11-14 11:40:47', 'sc'),
(53, 'sc01', 'Logged In', '2019-11-14 11:40:51', 'sc'),
(54, 'sc01', 'Logged Out', '2019-11-14 11:40:55', 'sc'),
(55, 'sc01', 'Logged In', '2019-11-14 11:41:07', 'sc'),
(56, 'sc01', 'Logged Out', '2019-11-14 11:41:11', 'sc'),
(57, 'sc02', 'Logged In', '2019-11-14 11:41:22', 'sc'),
(58, 'sc02', 'Logged Out', '2019-11-14 11:41:39', 'sc'),
(59, 'toff', 'Logged In', '2019-11-14 00:30:05', 'commplainant'),
(60, 'toff', 'Logged Out', '2019-11-14 00:30:11', 'commplainant'),
(61, 'ola', 'Logged In', '2019-11-14 00:30:19', 'commplainant'),
(62, 'ola', 'Lodge Complaint', '2019-11-14 00:30:22', 'commplainant'),
(63, 'ola', 'Lodge Complaint', '2019-11-14 01:03:45', 'commplainant'),
(64, 'ola', 'Print Complaint Report', '2019-11-14 01:04:00', 'commplainant'),
(65, 'ola', 'Print Complaint Report', '2019-11-14 01:10:21', 'commplainant'),
(66, 'ola', 'Print Complaint Report', '2019-11-14 01:12:35', 'commplainant'),
(67, 'ola', 'Lodge Complaint', '2019-11-14 01:15:56', 'commplainant'),
(68, 'ola', 'Lodge Complaint', '2019-11-14 01:16:05', 'commplainant'),
(69, 'ola', 'Update Profile', '2019-11-14 01:16:22', 'commplainant'),
(70, 'ola', 'Update Profile', '2019-11-14 01:16:31', 'commplainant'),
(71, 'ola', 'Lodge Complaint', '2019-11-14 01:16:37', 'commplainant'),
(72, 'ola', 'Logged Out', '2019-11-14 01:16:41', 'commplainant'),
(73, 'sc01', 'Logged In', '2019-11-14 01:16:58', 'sc'),
(74, 'sc01', 'Logged Out', '2019-11-14 01:18:51', 'sc'),
(75, 'sc02', 'Logged In', '2019-11-14 01:18:56', 'sc'),
(76, 'sc02', 'Logged Out', '2019-11-14 01:29:48', 'commplainant'),
(77, 'toff', 'Logged In', '2019-11-14 01:30:17', 'commplainant'),
(78, 'toff', 'Lodge Complaint', '2019-11-14 01:30:19', 'commplainant'),
(79, 'toff', 'Logged Out', '2019-11-14 01:32:37', 'commplainant'),
(80, 'sc01', 'Logged In', '2019-11-14 01:49:45', 'sc'),
(81, 'sc01', 'Logged Out', '2019-11-14 01:51:12', 'sc'),
(82, 'toff', 'Logged In', '2019-11-14 02:19:55', 'commplainant'),
(83, 'toff', 'Lodge Complaint', '2019-11-14 02:20:12', 'commplainant'),
(84, 'toff', 'Lodge Complaint', '2019-11-14 02:22:41', 'commplainant'),
(85, 'toff', 'Lodge Complaint', '2019-11-14 02:22:58', 'commplainant'),
(86, 'toff', 'Lodge Complaint', '2019-11-14 02:25:53', 'commplainant'),
(87, 'toff', 'Lodge Complaint', '2019-11-14 02:26:46', 'commplainant'),
(88, 'toff', 'Lodge Complaint', '2019-11-14 02:26:49', 'commplainant'),
(89, 'toff', 'Print Complaint Report', '2019-11-15 04:01:55', 'commplainant'),
(90, 'toff', 'Print Complaint Report', '2019-11-15 04:02:04', 'commplainant'),
(91, 'toff', 'Logged Out', '2019-11-15 04:02:27', 'commplainant'),
(92, 'sc01', 'Logged In', '2019-11-15 04:02:48', 'sc'),
(93, 'sc01', 'Logged Out', '2019-11-15 04:03:35', 'sc'),
(94, 'toff', 'Logged In', '2019-11-18 11:22:17', 'commplainant'),
(95, 'toff', 'Lodge Complaint', '2019-11-18 11:22:20', 'commplainant'),
(96, 'toff', 'Lodge Complaint', '2019-11-18 11:22:27', 'commplainant'),
(97, 'toff', 'Lodge Complaint', '2019-11-18 11:22:30', 'commplainant'),
(98, 'toff', 'Lodge Complaint', '2019-11-18 11:22:31', 'commplainant'),
(99, 'toff', 'Lodge Complaint', '2019-11-18 11:22:33', 'commplainant'),
(100, 'toff', 'Lodge Complaint', '2019-11-18 11:22:34', 'commplainant'),
(101, 'toff', 'Logged Out', '2019-11-18 11:22:38', 'commplainant'),
(102, 'sc01', 'Logged In', '2019-11-18 11:23:47', 'sc'),
(103, 'sc01', 'Update Profile', '2019-11-18 11:24:12', 'sc'),
(104, 'sc01', 'Update Profile', '2019-11-18 11:24:46', 'sc');

-- --------------------------------------------------------

--
-- Table structure for table `nerc`
--

CREATE TABLE `nerc` (
  `nerc_id` int(11) NOT NULL,
  `name` varchar(100) NOT NULL,
  `abbreviation` varchar(8) NOT NULL,
  `username` varchar(20) NOT NULL,
  `password` varchar(20) NOT NULL,
  `email` varchar(20) NOT NULL,
  `tel_number` varchar(11) DEFAULT NULL,
  `date_modified` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `nerc`
--

INSERT INTO `nerc` (`nerc_id`, `name`, `abbreviation`, `username`, `password`, `email`, `tel_number`, `date_modified`) VALUES
(1, 'National Electricity Regulatory Commission ', 'NERC', 'nerclogin', 'admin', 'nerc@yahoo.com', '08133968069', '2019-11-13 08:30:43');

-- --------------------------------------------------------

--
-- Table structure for table `service_center`
--

CREATE TABLE `service_center` (
  `sc_id` int(8) NOT NULL,
  `name` varchar(50) NOT NULL,
  `username` varchar(50) NOT NULL,
  `password` varchar(20) NOT NULL,
  `email` varchar(50) NOT NULL,
  `tel_number` varchar(20) DEFAULT NULL,
  `address` varchar(50) NOT NULL,
  `local_govt` varchar(11) NOT NULL,
  `date_created` timestamp NULL DEFAULT NULL,
  `date_modified` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `service_center`
--

INSERT INTO `service_center` (`sc_id`, `name`, `username`, `password`, `email`, `tel_number`, `address`, `local_govt`, `date_created`, `date_modified`) VALUES
(3, 'Bosso Service Centre', 'sc01', 'admin', 'bossosc@yahoo.com', '08151531788', 'Okada Road, Bosso', 'Bosso', '2019-11-13 08:34:15', '2019-11-18 11:24:46'),
(4, 'Chanchaga Service Centre', 'sc02', 'admin', 'Chanchagasc@yahoo.com', '08136985245', 'Chanchaga, Minna', 'Chanchaga', '2019-11-13 08:35:03', '0000-00-00 00:00:00');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `comlog`
--
ALTER TABLE `comlog`
  ADD PRIMARY KEY (`log_id`);

--
-- Indexes for table `complainant`
--
ALTER TABLE `complainant`
  ADD PRIMARY KEY (`complainant_id`);

--
-- Indexes for table `complaint`
--
ALTER TABLE `complaint`
  ADD PRIMARY KEY (`complaint_id`),
  ADD KEY `complainant_id` (`complainant_id`);

--
-- Indexes for table `complaint_remark`
--
ALTER TABLE `complaint_remark`
  ADD PRIMARY KEY (`cr_id`),
  ADD KEY `foriegn` (`complaint_id`);

--
-- Indexes for table `disco`
--
ALTER TABLE `disco`
  ADD PRIMARY KEY (`disco_id`);

--
-- Indexes for table `discolog`
--
ALTER TABLE `discolog`
  ADD PRIMARY KEY (`log_id`);

--
-- Indexes for table `local_govt`
--
ALTER TABLE `local_govt`
  ADD PRIMARY KEY (`lga_id`);

--
-- Indexes for table `location`
--
ALTER TABLE `location`
  ADD PRIMARY KEY (`location_id`);

--
-- Indexes for table `log`
--
ALTER TABLE `log`
  ADD PRIMARY KEY (`log_id`);

--
-- Indexes for table `nerc`
--
ALTER TABLE `nerc`
  ADD PRIMARY KEY (`nerc_id`);

--
-- Indexes for table `service_center`
--
ALTER TABLE `service_center`
  ADD PRIMARY KEY (`sc_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `comlog`
--
ALTER TABLE `comlog`
  MODIFY `log_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=28;

--
-- AUTO_INCREMENT for table `complainant`
--
ALTER TABLE `complainant`
  MODIFY `complainant_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `complaint`
--
ALTER TABLE `complaint`
  MODIFY `complaint_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `complaint_remark`
--
ALTER TABLE `complaint_remark`
  MODIFY `cr_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `disco`
--
ALTER TABLE `disco`
  MODIFY `disco_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `discolog`
--
ALTER TABLE `discolog`
  MODIFY `log_id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `local_govt`
--
ALTER TABLE `local_govt`
  MODIFY `lga_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `location`
--
ALTER TABLE `location`
  MODIFY `location_id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `log`
--
ALTER TABLE `log`
  MODIFY `log_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=105;

--
-- AUTO_INCREMENT for table `nerc`
--
ALTER TABLE `nerc`
  MODIFY `nerc_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `service_center`
--
ALTER TABLE `service_center`
  MODIFY `sc_id` int(8) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `complaint`
--
ALTER TABLE `complaint`
  ADD CONSTRAINT `complaint_ibfk_1` FOREIGN KEY (`complainant_id`) REFERENCES `complainant` (`complainant_id`);

--
-- Constraints for table `complaint_remark`
--
ALTER TABLE `complaint_remark`
  ADD CONSTRAINT `complaint_remark_ibfk_1` FOREIGN KEY (`complaint_id`) REFERENCES `complaint` (`complaint_id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
