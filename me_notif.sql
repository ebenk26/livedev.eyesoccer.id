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
-- Table structure for table `me_notif`
--

CREATE TABLE `me_notif` (
  `id_notif` int(11) NOT NULL,
  `id_member` int(11) DEFAULT NULL COMMENT 'member yang mempunyai notif',
  `id_member_act` int(11) DEFAULT NULL COMMENT 'member yang memberikan notif',
  `id_img` int(11) DEFAULT NULL,
  `notif_type` varchar(10) DEFAULT NULL COMMENT 'tipe notifikasi comment,follow',
  `notif_content` varchar(100) DEFAULT NULL,
  `date_create` datetime DEFAULT NULL,
  `last_update` datetime DEFAULT NULL,
  `img_thumb` varchar(250) DEFAULT NULL,
  `img_alt` varchar(250) DEFAULT NULL,
  `read` enum('0','1') DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COMMENT='table untuk notifikasi eyeme ';

--
-- Dumping data for table `me_notif`
--

INSERT INTO `me_notif` (`id_notif`, `id_member`, `id_member_act`, `id_img`, `notif_type`, `notif_content`, `date_create`, `last_update`, `img_thumb`, `img_alt`, `read`) VALUES
(1, 191, 189, 3, 'LIK1', 'LIKE', '2017-12-21 17:57:59', '2017-12-21 17:57:59', 'thumb_d.jpg', 'd.jpg', '0'),
(2, 191, 189, 3, 'LIK1', 'LIKE', '2017-12-27 15:20:21', '2017-12-27 15:20:21', 'thumb_d.jpg', 'd.jpg', '0'),
(3, NULL, 189, NULL, 'COM1', 'coment', '2017-12-27 15:20:37', '2017-12-27 15:20:37', NULL, NULL, '0'),
(4, NULL, 189, NULL, 'COM2', 'coment', '2017-12-27 15:20:40', '2017-12-27 15:20:40', NULL, NULL, '0'),
(5, NULL, 189, NULL, 'COM3', 'tc', '2017-12-27 15:27:53', '2017-12-27 15:27:53', NULL, NULL, '0'),
(6, NULL, 189, NULL, 'COM4', 'tv', '2017-12-27 15:34:51', '2017-12-27 15:34:51', NULL, NULL, '0'),
(7, 191, 189, 3, 'COM5', 'tc', '2017-12-27 15:37:27', '2017-12-27 15:37:27', 'thumb_d.jpg', 'd.jpg', '0'),
(8, 191, 189, 3, 'COM6', 'dasda', '2017-12-27 17:33:03', '2017-12-27 17:33:03', 'thumb_d.jpg', 'd.jpg', '0'),
(9, 191, 189, 3, 'COM7', 'dasda', '2017-12-27 17:33:13', '2017-12-27 17:33:13', 'thumb_d.jpg', 'd.jpg', '0'),
(10, 191, 189, 5, 'LIK2', 'LIKE', '2017-12-29 09:27:09', '2017-12-29 09:27:09', 'thumb_29122017092651.jpeg', '29122017092651.jpeg', '0'),
(11, 191, 189, 5, 'COM8', 'comentar', '2017-12-29 09:28:18', '2017-12-29 09:28:18', 'thumb_29122017092651.jpeg', '29122017092651.jpeg', '0');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `me_notif`
--
ALTER TABLE `me_notif`
  ADD PRIMARY KEY (`id_notif`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `me_notif`
--
ALTER TABLE `me_notif`
  MODIFY `id_notif` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
