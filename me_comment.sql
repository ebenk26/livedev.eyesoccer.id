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
-- Table structure for table `me_comment`
--

CREATE TABLE `me_comment` (
  `id_comment` int(11) NOT NULL,
  `id_member` int(11) NOT NULL COMMENT 'yg memberi komentar',
  `id_img` int(11) NOT NULL COMMENT 'yg diberi komentar',
  `comment` text NOT NULL COMMENT 'komentarnya',
  `date_create` datetime NOT NULL,
  `last_update` datetime NOT NULL,
  `deleted_by` int(11) NOT NULL,
  `deleted_date` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `me_comment`
--

INSERT INTO `me_comment` (`id_comment`, `id_member`, `id_img`, `comment`, `date_create`, `last_update`, `deleted_by`, `deleted_date`) VALUES
(1, 189, 3, 'coment', '2017-12-27 15:20:37', '2017-12-27 15:20:37', 0, '0000-00-00 00:00:00'),
(2, 189, 3, 'coment', '2017-12-27 15:20:40', '2017-12-27 15:20:40', 0, '0000-00-00 00:00:00'),
(3, 189, 3, 'tc', '2017-12-27 15:27:53', '2017-12-27 15:27:53', 0, '0000-00-00 00:00:00'),
(4, 189, 3, 'tv', '2017-12-27 15:34:51', '2017-12-27 15:34:51', 0, '0000-00-00 00:00:00'),
(5, 189, 3, 'tc', '2017-12-27 15:37:27', '2017-12-27 15:37:27', 0, '0000-00-00 00:00:00'),
(6, 189, 3, 'dasda', '2017-12-27 17:33:03', '2017-12-27 17:33:03', 0, '0000-00-00 00:00:00'),
(7, 189, 3, 'dasda', '2017-12-27 17:33:13', '2017-12-27 17:33:13', 0, '0000-00-00 00:00:00'),
(8, 189, 5, 'comentar', '2017-12-29 09:28:18', '2017-12-29 09:28:18', 0, '0000-00-00 00:00:00');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `me_comment`
--
ALTER TABLE `me_comment`
  ADD PRIMARY KEY (`id_comment`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `me_comment`
--
ALTER TABLE `me_comment`
  MODIFY `id_comment` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
