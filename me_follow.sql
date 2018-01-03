-- phpMyAdmin SQL Dump
-- version 4.7.4
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jan 03, 2018 at 04:38 AM
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
-- Table structure for table `me_follow`
--

CREATE TABLE `me_follow` (
  `id_follow` int(11) NOT NULL,
  `id_member` int(11) DEFAULT NULL,
  `id_following` int(11) DEFAULT NULL,
  `block` enum('0','1') DEFAULT '0',
  `last_update` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `me_follow`
--

INSERT INTO `me_follow` (`id_follow`, `id_member`, `id_following`, `block`, `last_update`) VALUES
(18, 189, 191, NULL, '2017-12-15 18:10:06'),
(19, 189, 190, '0', NULL),
(20, 191, 189, '0', NULL);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `me_follow`
--
ALTER TABLE `me_follow`
  ADD PRIMARY KEY (`id_follow`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `me_follow`
--
ALTER TABLE `me_follow`
  MODIFY `id_follow` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=21;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
