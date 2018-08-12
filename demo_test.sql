-- phpMyAdmin SQL Dump
-- version 4.6.4
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Aug 12, 2018 at 08:05 PM
-- Server version: 5.7.14
-- PHP Version: 5.6.25

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `demo_test`
--

-- --------------------------------------------------------

--
-- Table structure for table `blog`
--

CREATE TABLE `blog` (
  `id` int(11) NOT NULL,
  `title` varchar(255) NOT NULL,
  `description` text NOT NULL,
  `post_by` varchar(255) NOT NULL,
  `post_date` datetime NOT NULL,
  `category` varchar(255) NOT NULL,
  `tag` varchar(255) NOT NULL,
  `status` int(4) NOT NULL,
  `created_at` datetime NOT NULL,
  `updated_at` datetime NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `blog`
--

INSERT INTO `blog` (`id`, `title`, `description`, `post_by`, `post_date`, `category`, `tag`, `status`, `created_at`, `updated_at`) VALUES
(1, 'I Love Food', 'Food is my passion. Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat.', 'Darshan', '2018-08-11 05:29:36', 'food,foodblog', 'food,foodblog', 1, '2018-08-11 00:00:00', '2018-08-11 00:00:00'),
(2, 'Officially Blogging', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat.', 'Doe', '2018-08-12 09:12:00', 'testblog,testcat', 'testblog,testcat', 1, '2018-08-11 00:00:00', '2018-08-11 00:00:00'),
(22, 'test blog', 'test blog', 'darshanD', '2018-08-10 00:00:00', 'education,sports', 'education,sports', 1, '2018-08-12 00:00:00', '2018-08-12 13:53:35'),
(23, 'darshan test', 'test description darshan ', 'darshD', '2018-08-12 00:00:00', 'food,health', 'food,health', 1, '2018-08-12 00:00:00', '2018-08-12 13:58:05'),
(24, 'darshan test', 'test description darshan ', 'darshD', '2018-08-11 00:00:00', 'education,sports', 'education,sports', 1, '2018-08-12 00:00:00', '2018-08-12 13:58:31'),
(25, 'darshan test', 'test description darshan ', 'darshD', '2018-08-09 00:00:00', 'education,sports', 'education,sports', 1, '2018-08-12 00:00:00', '2018-08-12 14:00:18');

-- --------------------------------------------------------

--
-- Table structure for table `blog_category`
--

CREATE TABLE `blog_category` (
  `id` int(11) NOT NULL,
  `category_name` varchar(255) NOT NULL,
  `status` int(4) NOT NULL,
  `created_at` datetime NOT NULL,
  `updated_at` datetime NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `blog_category`
--

INSERT INTO `blog_category` (`id`, `category_name`, `status`, `created_at`, `updated_at`) VALUES
(1, 'food', 1, '2018-08-12 00:00:00', '2018-08-12 00:00:00'),
(2, 'education', 1, '2018-08-12 00:00:00', '2018-08-12 00:00:00'),
(3, 'health', 1, '2018-08-12 00:00:00', '2018-08-12 00:00:00'),
(4, 'sports', 1, '2018-08-12 00:00:00', '2018-08-12 00:00:00');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `city` varchar(255) NOT NULL,
  `mobile_no` varchar(255) NOT NULL,
  `user_name` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `remember_token` text NOT NULL,
  `status` int(4) NOT NULL,
  `created_at` datetime NOT NULL,
  `updated_at` datetime NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `name`, `city`, `mobile_no`, `user_name`, `email`, `password`, `remember_token`, `status`, `created_at`, `updated_at`) VALUES
(2, 'Darshan', 'aa', '123456', 'darshan', 'darshan@mailinator.com', '$2y$10$T8qqUdmEU635bLc0ai9aFeRLtVMv3k321Pf7fv.9f.pwjArWGRPrS', 'PBrfvt5jtk33UryAdkAe7iCPTN29zRX03d16YSYuNrg27Q3ZNvzBLYD3SCHn', 1, '2018-08-11 00:00:00', '2018-08-12 18:06:06'),
(3, 'DD', 'Ahmedabad', '9712186776', 'dd', 'darshan1@mailinator.com', '$2y$10$CAsc866i19n2bo.13emrRukO3t0wX7eNgqAU9SKHGTTJL0XvgWwNy', '', 1, '2018-08-12 00:00:00', '2018-08-12 18:08:12'),
(4, 'aa', 'aa', '1234567890', 'qq', 'test@test.com', '$2y$10$hQBfaoVSOOSuFK7KFRz7Tedru7N1zvkvurXF.lT3.Dgh/90/if/Im', '', 1, '2018-08-12 00:00:00', '2018-08-12 18:11:07');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `blog`
--
ALTER TABLE `blog`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `blog_category`
--
ALTER TABLE `blog_category`
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
-- AUTO_INCREMENT for table `blog`
--
ALTER TABLE `blog`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=26;
--
-- AUTO_INCREMENT for table `blog_category`
--
ALTER TABLE `blog_category`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
