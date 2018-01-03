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
-- Table structure for table `me_like`
--

CREATE TABLE `me_like` (
  `id_like` int(11) NOT NULL,
  `id_member` int(11) NOT NULL,
  `id_img` int(11) NOT NULL,
  `last_update` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `me_like`
--

INSERT INTO `me_like` (`id_like`, `id_member`, `id_img`, `last_update`) VALUES
(1, 189, 3, '2017-12-27 15:20:21'),
(2, 189, 5, '2017-12-29 09:27:09'),
(3, 189, 1, '2017-12-27 15:20:21'),
(4, 189, 1, '2017-12-27 15:20:21');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `me_like`
--
ALTER TABLE `me_like`
  ADD PRIMARY KEY (`id_like`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `me_like`
--
ALTER TABLE `me_like`
  MODIFY `id_like` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
