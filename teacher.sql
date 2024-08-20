-- phpMyAdmin SQL Dump
-- version 5.1.2
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3306
-- Generation Time: Aug 20, 2024 at 09:39 AM
-- Server version: 5.7.24
-- PHP Version: 7.4.16

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `teacher`
--

-- --------------------------------------------------------

--
-- Table structure for table `ic_admin`
--

CREATE TABLE `ic_admin` (
  `id` int(11) NOT NULL COMMENT 'Unique ID',
  `email` varchar(255) NOT NULL COMMENT 'Email',
  `password` varchar(255) NOT NULL COMMENT 'Password',
  `name` varchar(255) NOT NULL COMMENT 'Name',
  `mobile` varchar(20) NOT NULL COMMENT 'Mobile',
  `status` enum('Active','In-active') NOT NULL DEFAULT 'Active' COMMENT 'Status'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `ic_admin`
--

INSERT INTO `ic_admin` (`id`, `email`, `password`, `name`, `mobile`, `status`) VALUES
(1, 'teacher@gmail.com', '$2y$10$ek1ehWSE99CqyaHcMXyoPeBK9U4X4RMWepVaNkqkfnQfrjZwg4w/6', 'Administrator', '7906079913', 'Active');

-- --------------------------------------------------------

--
-- Table structure for table `ic_settings`
--

CREATE TABLE `ic_settings` (
  `id` int(11) NOT NULL COMMENT 'Unique ID',
  `type` varchar(255) NOT NULL COMMENT 'Type',
  `key` varchar(255) NOT NULL COMMENT 'Key',
  `label` varchar(255) NOT NULL COMMENT 'Label',
  `value` longtext NOT NULL COMMENT 'Value',
  `validation` varchar(255) NOT NULL COMMENT 'Validations',
  `input_type` varchar(100) NOT NULL DEFAULT 'text' COMMENT 'Input Type',
  `sort_order` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `ic_settings`
--

INSERT INTO `ic_settings` (`id`, `type`, `key`, `label`, `value`, `validation`, `input_type`, `sort_order`) VALUES
(15, 'smtp', 'smtp_host', 'Host', 'smtp.hostinger.com', 'trim|required', '{\"type\":\"text\"}', 101),
(16, 'smtp', 'smtp_port', 'Port', '465', 'trim|required', '{\"type\":\"text\"}', 102),
(17, 'smtp', 'smtp_user', 'Username', 'no-reply@icscheme.com', 'trim|required', '{\"type\":\"text\"}', 103),
(18, 'smtp', 'smtp_pass', 'Password', 'Int3lc0r3@2018', 'trim|required', '{\"type\":\"text\"}', 104),
(19, 'smtp', 'smtp_encryption', 'Encryption', 'ssl', 'trim|required', '{\"type\":\"text\"}', 105),
(20, 'smtp', 'smtp_from_address', 'From Address', 'IC Scheme', 'trim|required', '{\"type\":\"text\"}', 106),
(24, 'general', 'site_name', 'Site Name', 'Teacher', 'trim|required', '{\"type\":\"text\"}', 11),
(25, 'social-links', 'facebook_link', 'Facebook Link', 'https://www.facebook.com/', 'trim|required', '{\"type\":\"text\"}', 11),
(26, 'social-links', 'twitter_link', 'Twitter Link', 'https://www.twitter.com/', 'trim|required', '{\"type\":\"text\"}', 11),
(27, 'social-links', 'instagram_link', 'Instagram Link', 'https://www.instagram.com/', 'trim|required', '{\"type\":\"text\"}', 11),
(28, 'social-links', 'linkedin_link', 'LinkedIn Link', 'https://www.linkedin.com/', 'trim|required', '{\"type\":\"text\"}', 11),
(29, 'general', 'phone', 'Phone', '0121-4458458', 'trim|required', '{\"type\":\"text\"}', 11),
(30, 'general', 'info_email', 'Information E-mail', 'no-reply@icscheme.gov.in', 'trim|required', '{\"type\":\"text\"}', 11),
(31, 'general', 'address', 'Address', 'Central Secretariat', 'trim|required', '{\"type\":\"text\"}', 11),
(32, 'general', 'support_email', 'Support E-mail', 'no-reply@icscheme.gov.in', 'trim|required', '{\"type\":\"text\"}', 11),
(33, 'social-links', 'youtube_link', 'Youtube Link', 'https://www.youtube.com/', 'trim|required', '{\"type\":\"text\"}', 11);

-- --------------------------------------------------------

--
-- Table structure for table `ic_student`
--

CREATE TABLE `ic_student` (
  `id` int(11) NOT NULL COMMENT 'id',
  `name` varchar(100) CHARACTER SET latin1 NOT NULL COMMENT 'name',
  `subject_name` varchar(255) CHARACTER SET latin1 NOT NULL COMMENT 'subject name',
  `marks` int(11) NOT NULL COMMENT 'marks',
  `status` enum('Active','In-active') NOT NULL COMMENT 'status',
  `create_date` date NOT NULL COMMENT 'create_date',
  `create_time` datetime NOT NULL COMMENT 'create_time'
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `ic_student`
--

INSERT INTO `ic_student` (`id`, `name`, `subject_name`, `marks`, `status`, `create_date`, `create_time`) VALUES
(1, 'shivansssss', 'php', 100, 'Active', '2024-08-16', '0000-00-00 00:00:00'),
(2, 'agarwal', 'maths', 5, 'Active', '2024-08-18', '0000-00-00 00:00:00'),
(3, 'avnish', 'english', 99, 'Active', '2024-08-15', '0000-00-00 00:00:00'),
(4, 'new student', 'science', 59, 'Active', '2024-08-15', '0000-00-00 00:00:00');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `ic_admin`
--
ALTER TABLE `ic_admin`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `email` (`email`);

--
-- Indexes for table `ic_settings`
--
ALTER TABLE `ic_settings`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `ic_student`
--
ALTER TABLE `ic_student`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `ic_admin`
--
ALTER TABLE `ic_admin`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT COMMENT 'Unique ID', AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `ic_settings`
--
ALTER TABLE `ic_settings`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT COMMENT 'Unique ID', AUTO_INCREMENT=34;

--
-- AUTO_INCREMENT for table `ic_student`
--
ALTER TABLE `ic_student`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT COMMENT 'id', AUTO_INCREMENT=6;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
