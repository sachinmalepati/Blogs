-- phpMyAdmin SQL Dump
-- version 4.5.0.2
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: Nov 03, 2016 at 12:49 PM
-- Server version: 10.0.17-MariaDB
-- PHP Version: 5.6.14

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `blogdb`
--

-- --------------------------------------------------------

--
-- Table structure for table `blogger_info`
--

CREATE TABLE `blogger_info` (
  `blogger_id` int(11) NOT NULL,
  `blogger_username` varchar(16) NOT NULL,
  `blogger_password` varchar(16) NOT NULL,
  `blogger_creationdate` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `blogger_isactive` tinyint(1) NOT NULL DEFAULT '0',
  `blogger_updateddate` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `blogger_enddate` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `blogger_info`
--

INSERT INTO `blogger_info` (`blogger_id`, `blogger_username`, `blogger_password`, `blogger_creationdate`, `blogger_isactive`, `blogger_updateddate`, `blogger_enddate`) VALUES
(1, 'sachin', '1234', '2016-07-27 18:43:13', 1, '2016-07-27 18:43:13', NULL),
(2, 'admin', 'admin', '2016-08-05 22:21:24', 1, '2016-08-05 22:21:24', NULL),
(3, 'abc', 'abc', '2016-09-30 09:25:07', 1, '2016-09-30 09:25:07', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `blog_master`
--

CREATE TABLE `blog_master` (
  `blog_id` int(11) NOT NULL,
  `blogger_id` int(11) NOT NULL,
  `blog_title` tinytext,
  `blog_desc` text NOT NULL,
  `blog_category` tinytext NOT NULL,
  `blog_auther` tinytext NOT NULL,
  `blog_is_active` tinyint(1) NOT NULL DEFAULT '0',
  `creation_date` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_date` datetime DEFAULT NULL,
  `image` varchar(32) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `blog_master`
--

INSERT INTO `blog_master` (`blog_id`, `blogger_id`, `blog_title`, `blog_desc`, `blog_category`, `blog_auther`, `blog_is_active`, `creation_date`, `updated_date`, `image`) VALUES
(16, 1, 'Test Tiltle changed', 'asdcvnj', 'test', 'sachin', 1, '2016-08-05 21:31:51', NULL, 'img2.jpg'),
(18, 1, 'Test Tiltle changed', 'asdcvnj', 'test', 'sachin', 1, '2016-08-05 21:33:34', NULL, 'img10.jpg'),
(19, 2, 'Test Tiltle changed', 'asdcvnj', 'test', 'admin', 1, '2016-08-05 23:14:36', NULL, 'img20.jpg'),
(20, 2, 'Test Tiltle changed', 'asdcvnj', 'test', 'admin', 1, '2016-08-06 10:15:57', NULL, 'img15.jpg'),
(21, 2, 'Test Tiltle changed', 'asdcvnj', 'test', 'admin', 1, '2016-08-06 10:17:50', NULL, 'img20.jpg'),
(23, 1, 'Test Tiltle changed', 'asdcvnj', 'test', 'sachin', 1, '2016-08-06 10:32:38', NULL, 'pre.png'),
(24, 2, 'Test Case ', 'sadfasd', 'Image', 'admin', 1, '2016-08-19 16:22:55', NULL, 'img10.jpg'),
(25, 2, 'sad', 'rhgtfh', 'singer', 'admin', 1, '2016-08-19 16:23:19', NULL, 'search.png'),
(26, 2, 'Test Tiltle', 'sdfsd', 'Test Cat', 'admin', 1, '2016-08-19 16:23:48', NULL, 'logo.png'),
(27, 2, 'Test Tiltle changed', 'adfsd', 'super singer', 'admin', 1, '2016-08-19 16:24:00', NULL, 'img20.jpg'),
(28, 2, 'Test Case ', 'adfsdf', 'Image', 'admin', 1, '2016-08-19 16:24:15', NULL, 'img2.jpg'),
(29, 1, 'dasfds', 'garegsdf', 'fesgsd', 'sachin', 1, '2016-09-01 19:48:34', NULL, 'img20.jpg'),
(31, 3, 'abc', 'sefaesfdeas', 'abc', 'abc', 0, '2016-09-30 09:27:55', NULL, 'img15.jpg');

-- --------------------------------------------------------

--
-- Table structure for table `contact_admin`
--

CREATE TABLE `contact_admin` (
  `id` int(11) NOT NULL,
  `name` varchar(32) NOT NULL,
  `email` varchar(32) DEFAULT NULL,
  `sub` varchar(256) NOT NULL,
  `creation_date` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `contact_admin`
--

INSERT INTO `contact_admin` (`id`, `name`, `email`, `sub`, `creation_date`) VALUES
(1, 'sachin malepati', 'sachin.malepati@gmail.com', '  testing', '2016-08-19 17:40:38'),
(2, 'Ram Naayan Singh', 'singh.vaibhav.ram@gmail.co', '  sad', '2016-08-19 18:18:04'),
(3, 'sachin', 'afsasd', 'afasdsa  ', '2016-09-30 09:22:27');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `blogger_info`
--
ALTER TABLE `blogger_info`
  ADD PRIMARY KEY (`blogger_id`),
  ADD UNIQUE KEY `blogger_username` (`blogger_username`);

--
-- Indexes for table `blog_master`
--
ALTER TABLE `blog_master`
  ADD PRIMARY KEY (`blog_id`),
  ADD KEY `blogger_id` (`blogger_id`);

--
-- Indexes for table `contact_admin`
--
ALTER TABLE `contact_admin`
  ADD PRIMARY KEY (`id`),
  ADD KEY `blogger_id` (`name`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `blogger_info`
--
ALTER TABLE `blogger_info`
  MODIFY `blogger_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
--
-- AUTO_INCREMENT for table `blog_master`
--
ALTER TABLE `blog_master`
  MODIFY `blog_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=32;
--
-- AUTO_INCREMENT for table `contact_admin`
--
ALTER TABLE `contact_admin`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
--
-- Constraints for dumped tables
--

--
-- Constraints for table `blog_master`
--
ALTER TABLE `blog_master`
  ADD CONSTRAINT `blog_master_ibfk_2` FOREIGN KEY (`blogger_id`) REFERENCES `blogger_info` (`blogger_id`);

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
