-- phpMyAdmin SQL Dump
-- version 4.7.4
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jan 04, 2018 at 09:06 AM
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
-- Table structure for table `me_img`
--

CREATE TABLE `me_img` (
  `id_img` int(11) NOT NULL,
  `img_caption` varchar(250) DEFAULT NULL,
  `id_member` int(11) DEFAULT NULL,
  `img_name` varchar(200) DEFAULT NULL,
  `img_thumb` varchar(200) DEFAULT NULL,
  `img_alt` varchar(150) DEFAULT NULL,
  `date_create` datetime NOT NULL,
  `last_update` datetime NOT NULL,
  `active` enum('0','1') DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COMMENT='image eyeme ';

--
-- Dumping data for table `me_img`
--

INSERT INTO `me_img` (`id_img`, `img_caption`, `id_member`, `img_name`, `img_thumb`, `img_alt`, `date_create`, `last_update`, `active`) VALUES
(1, 'foto pertama', 189, '28122017041630.jpeg', 'thumb_28122017041630.jpeg', 'foto pertama', '2017-12-28 16:16:30', '2018-01-04 13:07:06', '1'),
(2, 'foto kedua', 189, '28122017041649.jpeg', 'thumb_28122017041649.jpeg', 'foto kedua', '2017-12-28 16:16:49', '0000-00-00 00:00:00', '1'),
(3, 'upload gambar baru', 189, '28122017045110.jpeg', 'thumb_28122017045110.jpeg', 'upload gambar baru', '2017-12-28 16:51:10', '0000-00-00 00:00:00', '1'),
(4, 'coba upload', 189, '28122017052356.jpeg', 'thumb_28122017052356.jpeg', 'coba upload', '2017-12-28 17:23:56', '0000-00-00 00:00:00', '1'),
(5, 'upload foto baru', 191, '29122017092651.jpeg', 'thumb_29122017092651.jpeg', 'upload foto baru', '2017-12-29 09:26:51', '0000-00-00 00:00:00', '1'),
(6, 'test', 189, '29122017093401.jpeg', 'thumb_29122017093401.jpeg', 'test', '2017-12-29 09:34:01', '2017-12-29 09:34:01', '1'),
(7, 'tambah keterangan', 189, '29122017093429.jpeg', 'thumb_29122017093429.jpeg', 'tambah keterangan', '2017-12-29 09:34:29', '2017-12-29 09:34:29', '1'),
(8, 'upload file baru', 191, '29122017093731.jpeg', 'thumb_29122017093731.jpeg', 'upload file baru', '2017-12-29 09:37:31', '2017-12-29 09:37:31', '1'),
(9, 'terbaru', 191, '29122017093931.jpeg', 'thumb_29122017093931.jpeg', 'terbaru', '2017-12-29 09:39:31', '2017-12-29 09:39:31', '1'),
(10, 'test keterangan 1', 189, '29122017050124.jpeg', 'thumb_29122017050124.jpeg', 'test keterangan 1', '2017-12-29 17:01:24', '2017-12-29 17:01:24', '1'),
(11, 'test', 189, '04012018092750.jpeg', 'thumb_04012018092750.jpeg', 'test', '2018-01-04 09:27:50', '2018-01-04 09:27:50', '1'),
(12, 'coba', 189, '04012018093501.jpeg', 'thumb_04012018093501.jpeg', 'coba', '2018-01-04 09:35:00', '2018-01-04 09:35:00', '1'),
(13, 'test', 189, '04012018010706.jpeg', 'thumb_04012018010706.jpeg', 'test', '2018-01-04 13:07:06', '2018-01-04 13:07:06', '1');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `me_img`
--
ALTER TABLE `me_img`
  ADD PRIMARY KEY (`id_img`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `me_img`
--
ALTER TABLE `me_img`
  MODIFY `id_img` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
