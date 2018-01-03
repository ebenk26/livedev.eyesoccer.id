-- phpMyAdmin SQL Dump
-- version 4.7.4
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jan 03, 2018 at 04:39 AM
-- Server version: 10.1.28-MariaDB
-- PHP Version: 7.1.11

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `admin_eyesoccer`
--

-- --------------------------------------------------------

--
-- Table structure for table `me_profile`
--

CREATE TABLE `me_profile` (
  `id_member` int(11) NOT NULL,
  `display_picture` varchar(150) DEFAULT NULL COMMENT 'id_img for display picture ',
  `username` varchar(50) DEFAULT NULL,
  `bio` varchar(100) DEFAULT NULL,
  `me_following` int(11) DEFAULT NULL,
  `me_follower` int(11) DEFAULT NULL,
  `status` enum('0','1','2') DEFAULT NULL COMMENT '0,inactive,1 active,2 suspend',
  `private` enum('0','1') DEFAULT NULL,
  `date_create` datetime DEFAULT NULL,
  `last_update` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COMMENT='profile untuk eyeme';

--
-- Dumping data for table `me_profile`
--

INSERT INTO `me_profile` (`id_member`, `display_picture`, `username`, `bio`, `me_following`, `me_follower`, `status`, `private`, `date_create`, `last_update`) VALUES
(189, 'funny-kid.jpg', 'sofyanwaldy', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. sed do eiusmod tempor incididunt ut labore ', NULL, NULL, '1', '0', '2017-12-12 00:00:00', '2017-12-13 00:00:00'),
(190, 'funny-kid.jpg', 'waldy', 'coba', NULL, NULL, '1', NULL, NULL, NULL),
(191, 'funny-kid.jpg', 'ina', 'test', NULL, NULL, '1', NULL, NULL, NULL),
(192, 'funny-kid.jpg', 'ifa', 'coba', NULL, NULL, '1', NULL, NULL, NULL);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `me_profile`
--
ALTER TABLE `me_profile`
  ADD PRIMARY KEY (`id_member`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `me_profile`
--
ALTER TABLE `me_profile`
  MODIFY `id_member` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=193;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
