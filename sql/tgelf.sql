-- phpMyAdmin SQL Dump
-- version 4.3.11
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: Aug 10, 2015 at 04:53 PM
-- Server version: 5.6.24
-- PHP Version: 5.6.8

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `tgelf`
--

-- --------------------------------------------------------

--
-- Table structure for table `social_links`
--

CREATE TABLE IF NOT EXISTS `social_links` (
  `id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `twitter` varchar(255) DEFAULT NULL,
  `linkedin` varchar(255) DEFAULT NULL,
  `youtube` varchar(255) DEFAULT NULL,
  `github` varchar(255) DEFAULT NULL,
  `academia` varchar(255) DEFAULT NULL,
  `behance` varchar(255) DEFAULT NULL
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `social_links`
--

INSERT INTO `social_links` (`id`, `user_id`, `twitter`, `linkedin`, `youtube`, `github`, `academia`, `behance`) VALUES
(2, 8, 'https://twitter.com/thakurrick', 'https://twitter.com/thakurrick', 'https://twitter.com/thakurrick', 'https://twitter.com/thakurrick', 'https://twitter.com/thakurrick', 'https://twitter.com/thakurrick');

-- --------------------------------------------------------

--
-- Table structure for table `unique_codes`
--

CREATE TABLE IF NOT EXISTS `unique_codes` (
  `id` int(11) NOT NULL,
  `code` varchar(45) DEFAULT NULL,
  `used` tinyint(1) DEFAULT NULL
) ENGINE=InnoDB AUTO_INCREMENT=21 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `unique_codes`
--

INSERT INTO `unique_codes` (`id`, `code`, `used`) VALUES
(1, 'CvWZdYtF2z', 1),
(2, 'K87wSEqZaT', 1),
(3, 'SFP8TbRXhG', 0),
(4, 'XADp5dZCfv', 0),
(5, 'N3PKm6sL5n', 0),
(6, 'e67FPk9RmR', 0),
(7, 'ajc7jjyYcd', 0),
(8, '6woUGwYwvC', 0),
(9, 'Ytsv2LK96w', 0),
(10, 'WGD5gYERpj', 0),
(11, '8pAZ8y2ddX', 0),
(12, 'oBMEfJuYiF', 0),
(13, '5GfyNYs525', 0),
(14, 'BfqgRqzUfg', 0),
(15, 'YTBnjvAuXN', 0),
(16, 'PJ6C3vgkT5', 0),
(17, 'tuFiGMxebd', 0),
(18, 'bFrY3zKTec', 0),
(19, 'RjgadV6BnJ', 0),
(20, 'NXiDUp5zxd', 0);

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE IF NOT EXISTS `users` (
  `id` int(11) NOT NULL,
  `firstname` varchar(45) DEFAULT NULL,
  `lastname` varchar(45) DEFAULT NULL,
  `username` varchar(45) DEFAULT NULL,
  `password` varchar(64) DEFAULT NULL,
  `uniquecode` varchar(255) DEFAULT NULL
) ENGINE=InnoDB AUTO_INCREMENT=9 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `firstname`, `lastname`, `username`, `password`, `uniquecode`) VALUES
(3, 'demo', 'demo', 'demo', '$2y$10$pwNNRM4Dh5Qkuo/mtfDG..OClPdrEAQgxL7gS4w8H/SpGa1gQzyI2', NULL),
(8, 'pawan', 'kumar', 'warlock', '$2y$10$IDKhcUMh/E8T8omnpDO4k.HXzvM8PTcy/A5AeuqVrFfibu.knZFLC', 'K87wSEqZaT');

-- --------------------------------------------------------

--
-- Table structure for table `user_addresses`
--

CREATE TABLE IF NOT EXISTS `user_addresses` (
  `id` int(11) NOT NULL,
  `user_id` int(11) DEFAULT NULL,
  `ispresent` tinyint(1) DEFAULT NULL,
  `addressline1` varchar(45) DEFAULT NULL,
  `addressline2` varchar(45) DEFAULT NULL,
  `city` varchar(45) DEFAULT NULL,
  `state` varchar(45) DEFAULT NULL,
  `country` varchar(45) DEFAULT NULL,
  `pincode` varchar(45) DEFAULT NULL
) ENGINE=InnoDB AUTO_INCREMENT=7 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `user_addresses`
--

INSERT INTO `user_addresses` (`id`, `user_id`, `ispresent`, `addressline1`, `addressline2`, `city`, `state`, `country`, `pincode`) VALUES
(5, 8, 1, '6/4 ', 'west patel nagar', 'new delhi', 'delhi', 'india', '110008'),
(6, 8, 0, '6/4 ', 'eastpatek nagar', 'new delhi', 'delhi', 'india', '110008');

-- --------------------------------------------------------

--
-- Table structure for table `user_interests`
--

CREATE TABLE IF NOT EXISTS `user_interests` (
  `id` int(11) NOT NULL,
  `user_id` int(11) DEFAULT NULL,
  `isprimary` tinyint(1) DEFAULT NULL,
  `name` varchar(45) DEFAULT NULL
) ENGINE=InnoDB AUTO_INCREMENT=13 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `user_interests`
--

INSERT INTO `user_interests` (`id`, `user_id`, `isprimary`, `name`) VALUES
(9, 8, 1, 'Humanitarian and social sector'),
(10, 8, 0, 'Chemistry'),
(11, 8, 0, 'Mechanical Engineering'),
(12, 8, 0, 'Psychology & Behavioral Sciences');

-- --------------------------------------------------------

--
-- Table structure for table `user_profiles`
--

CREATE TABLE IF NOT EXISTS `user_profiles` (
  `id` int(11) NOT NULL,
  `user_id` int(11) DEFAULT NULL,
  `countrycode` varchar(45) DEFAULT NULL,
  `contactno` int(11) DEFAULT NULL,
  `personalemail` varchar(45) DEFAULT NULL,
  `professionalemail` varchar(45) DEFAULT NULL,
  `bio` varchar(255) DEFAULT NULL,
  `fathername` varchar(45) DEFAULT NULL,
  `mothername` varchar(45) DEFAULT NULL,
  `photo` varchar(45) DEFAULT NULL,
  `universitycompany` varchar(255) DEFAULT NULL,
  `majorposition` varchar(255) DEFAULT NULL,
  `funfact` varchar(255) DEFAULT NULL,
  `countrycodefather` varchar(45) DEFAULT NULL,
  `contactnofather` varchar(45) DEFAULT NULL,
  `countrycodemother` varchar(45) DEFAULT NULL,
  `contactnomother` varchar(45) DEFAULT NULL
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `user_profiles`
--

INSERT INTO `user_profiles` (`id`, `user_id`, `countrycode`, `contactno`, `personalemail`, `professionalemail`, `bio`, `fathername`, `mothername`, `photo`, `universitycompany`, `majorposition`, `funfact`, `countrycodefather`, `contactnofather`, `countrycodemother`, `contactnomother`) VALUES
(3, 8, '91', 2147483647, 'surpawan@gmail.com', 'pawan@theantialias.com', 'demo', 'karnail singh', 'usha rani', 'uploads/profile/91205.jpg', 'The Anti Alias', 'web developer', 'demo', '91', '8123565698', '91', '8123565698');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `social_links`
--
ALTER TABLE `social_links`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `unique_codes`
--
ALTER TABLE `unique_codes`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`), ADD UNIQUE KEY `username` (`username`);

--
-- Indexes for table `user_addresses`
--
ALTER TABLE `user_addresses`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `user_interests`
--
ALTER TABLE `user_interests`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `user_profiles`
--
ALTER TABLE `user_profiles`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `social_links`
--
ALTER TABLE `social_links`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT for table `unique_codes`
--
ALTER TABLE `unique_codes`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=21;
--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=9;
--
-- AUTO_INCREMENT for table `user_addresses`
--
ALTER TABLE `user_addresses`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=7;
--
-- AUTO_INCREMENT for table `user_interests`
--
ALTER TABLE `user_interests`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=13;
--
-- AUTO_INCREMENT for table `user_profiles`
--
ALTER TABLE `user_profiles`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=4;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
