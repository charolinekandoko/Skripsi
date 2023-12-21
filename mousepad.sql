-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Dec 21, 2023 at 04:57 PM
-- Server version: 10.4.32-MariaDB
-- PHP Version: 8.1.25

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `mousepad`
--

-- --------------------------------------------------------

--
-- Table structure for table `admin`
--

CREATE TABLE `admin` (
  `admin_id` int(11) NOT NULL,
  `email` varchar(99) NOT NULL,
  `password` varchar(99) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `admin`
--

INSERT INTO `admin` (`admin_id`, `email`, `password`) VALUES
(1, 'charol@gmail.com', '$2y$10$D0GnOEkqZ3735JXM0p3CKuyu6qifO18MB6UIi42xMwANkhyW2dY76'),
(2, 'testing@gmail.com', '$2y$10$2RaQunCZthqvPDpZ9e6qceZPha/jk8Rx8ZdXFGZ4L9BmyeJAhP/zS'),
(3, 'testing123@gmail.com', '$2y$10$NDcdFqLcysdFbm3vBwo6ou1MqCttnTpBzw8fv9Hr2G0EwH1kIVCDq'),
(4, 'testingadmin@gmail.com', '$2y$10$miWWDVQga/psbxYktIQamOG7c1YKu8ZMGeydawvN.0sAXKVhB1D2.'),
(5, 'aaa@gmail.com', '$2y$10$l7luJ/fWsBEBp6Ucvj8KkOtfmB4XxWi4F4co/JlhdJOp00XGw7yeW'),
(6, 'admin@gmail.com', '$2y$10$vQ4hLsGi1UtGGcNzq6rcDuXo4HPqPzFKzyMhI3lroZPu.hgNnr5mq');

-- --------------------------------------------------------

--
-- Table structure for table `bahan`
--

CREATE TABLE `bahan` (
  `bahan_id` int(11) NOT NULL,
  `min_bahan` varchar(50) NOT NULL,
  `max_bahan` varchar(50) NOT NULL,
  `bobot_bahan` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `bahan`
--

INSERT INTO `bahan` (`bahan_id`, `min_bahan`, `max_bahan`, `bobot_bahan`) VALUES
(1, 'Hardpad', 'Hardpad', 1),
(2, 'Clothpad', 'Clothpad', 2);

-- --------------------------------------------------------

--
-- Table structure for table `harga`
--

CREATE TABLE `harga` (
  `harga_id` int(11) NOT NULL,
  `min_harga` int(11) NOT NULL,
  `max_harga` int(11) NOT NULL,
  `bobot_harga` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `harga`
--

INSERT INTO `harga` (`harga_id`, `min_harga`, `max_harga`, `bobot_harga`) VALUES
(1, 100000, 599999, 1),
(2, 600000, 1199999, 2),
(3, 1200000, 1799999, 3),
(4, 1800000, 2399999, 4),
(5, 2400000, 2999999, 5);

-- --------------------------------------------------------

--
-- Table structure for table `jahitan`
--

CREATE TABLE `jahitan` (
  `jahitan_id` int(11) NOT NULL,
  `min_jahitan` varchar(50) NOT NULL,
  `max_jahitan` varchar(50) NOT NULL,
  `bobot_jahitan` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `jahitan`
--

INSERT INTO `jahitan` (`jahitan_id`, `min_jahitan`, `max_jahitan`, `bobot_jahitan`) VALUES
(1, 'Tidak ada', 'Tidak ada', 1),
(2, 'Ada', 'Ada', 2);

-- --------------------------------------------------------

--
-- Table structure for table `ketebalan`
--

CREATE TABLE `ketebalan` (
  `ketebalan_id` int(11) NOT NULL,
  `min_ketebalan` varchar(11) NOT NULL,
  `max_ketebalan` varchar(11) NOT NULL,
  `bobot_ketebalan` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `ketebalan`
--

INSERT INTO `ketebalan` (`ketebalan_id`, `min_ketebalan`, `max_ketebalan`, `bobot_ketebalan`) VALUES
(1, '0', '2', 1),
(2, '2.1', '4', 2),
(3, '4.1', '7', 3);

-- --------------------------------------------------------

--
-- Table structure for table `merk`
--

CREATE TABLE `merk` (
  `merk_id` int(11) NOT NULL,
  `merk_name` varchar(50) NOT NULL,
  `merk_img` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `merk`
--

INSERT INTO `merk` (`merk_id`, `merk_name`, `merk_img`) VALUES
(1, 'Artisan Ninja Fx', 'Artisan.png'),
(2, 'HyperX', 'HyperX.png'),
(3, 'Logitech', 'Logitech.png'),
(4, 'Steelseries', 'Steelseries.png'),
(5, 'Zowie', 'Zowie.png');

-- --------------------------------------------------------

--
-- Table structure for table `mousepad`
--

CREATE TABLE `mousepad` (
  `mousepad_id` int(11) NOT NULL,
  `ukuran_id` int(11) NOT NULL,
  `bahan_id` int(11) NOT NULL,
  `ketebalan_id` int(11) NOT NULL,
  `jahitan_id` int(11) NOT NULL,
  `harga_id` int(11) NOT NULL,
  `merk_id` int(11) NOT NULL,
  `mousepad_name` varchar(99) NOT NULL,
  `mousepad_harga` int(20) NOT NULL,
  `mousepad_img` varchar(50) NOT NULL,
  `ukuran` varchar(99) NOT NULL,
  `bahan` varchar(99) NOT NULL,
  `ketebalan` varchar(99) NOT NULL,
  `jahitan` varchar(99) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `mousepad`
--

INSERT INTO `mousepad` (`mousepad_id`, `ukuran_id`, `bahan_id`, `ketebalan_id`, `jahitan_id`, `harga_id`, `merk_id`, `mousepad_name`, `mousepad_harga`, `mousepad_img`, `ukuran`, `bahan`, `ketebalan`, `jahitan`) VALUES
(1, 4, 1, 2, 1, 3, 1, 'Artisan Ninja Fx Hayate Otsu XSoft XL', 1700000, '65631706ec766.jpg', '490x420', 'Clothpad', '4', 'Ada'),
(2, 4, 1, 2, 1, 2, 1, 'Artisan Ninja Fx Hayate Hien Soft XL', 1149000, '656317fc43149.jpg', '490x420', 'Clothpad', '4', 'Ada'),
(3, 4, 1, 2, 1, 2, 1, 'Artisan Ninja Fx Hayate Hien Mid XL', 1149000, '65631835bcd91.jpg', '490x420', 'Clothpad', '3', 'Ada'),
(4, 4, 1, 2, 1, 3, 1, 'Artisan Ninja Fx Zero XSoft XL', 1300000, '656318c716a29.jpg', '490x420', 'Clothpad', '4', 'Ada'),
(5, 4, 1, 2, 1, 2, 1, 'Artisan Ninja Fx Zero Soft XL', 1174000, '6563197fb5e6a.jpg', '490x420', 'Clothpad', '3', 'Ada'),
(6, 3, 1, 2, 1, 1, 2, 'HyperX FURY S Large', 249000, '65631b33339b9.png', '450x400', 'Clothpad', '3', 'Ada'),
(7, 4, 1, 2, 1, 1, 2, 'HyperX FURY S XL', 429000, '65631ba4ea080.png', '900x400', 'Clothpad', '3', 'Ada'),
(8, 4, 1, 2, 1, 1, 2, 'HyperX FURY S Speed Edition Pro XL', 449000, '65631e57d93f3.png', '900x400', 'Clothpad', '3', 'Ada'),
(9, 2, 1, 2, 1, 1, 2, 'HyperX FURY S Speed Edition Pro Medium', 249000, '6563201a11f79.png', '360x300', 'Clothpad', '3', 'Ada'),
(10, 4, 1, 2, 1, 2, 5, 'Zowie BenQ G-SR Black XL', 679000, '656321e26cd20.png', '480x400', 'Clothpad', '3.5', 'Ada'),
(11, 4, 1, 2, 2, 2, 5, 'Zowie BenQ G-SR Red XL', 899000, '6563225d6d639.png', '480x400', 'Clothpad', '3.5', 'Tidak ada'),
(12, 4, 1, 2, 2, 2, 5, 'Zowie BenQ G-SR Deep Blue XL', 849000, '656323016f6cf.png', '480x400', 'Clothpad', '3.5', 'Tidak ada'),
(13, 3, 2, 1, 2, 1, 4, 'Steelseries QcK Large', 250000, '6563246edb45b.png', '450x400', 'Hardpad', '2', 'Tidak ada'),
(14, 2, 2, 3, 2, 1, 4, 'Steelseries Qck Heavy Medium', 265000, '656325da23cf5.jpg', '320x270', 'Hardpad', '6', 'Tidak ada'),
(15, 4, 1, 1, 1, 1, 4, 'Steelseries Qck EDGE Cloth XL', 425000, '656332e3808c4.jpg', '900x300', 'Clothpad', '2', 'Ada'),
(16, 3, 1, 1, 1, 1, 4, 'Steelseries Qck EDGE Large', 325000, '6563333d559b4.jpg', '450x400', 'Clothpad', '2', 'Ada'),
(17, 2, 2, 2, 2, 1, 3, 'Logitech G440 Medium', 329000, '6563344181370.png', '340x280', 'Hardpad', '3', 'Tidak ada'),
(18, 3, 1, 2, 2, 1, 3, 'Logitech G640 Large Cloth', 469000, '6563356a4a8de.png', '460x400', 'Clothpad', '3', 'Tidak ada'),
(19, 4, 1, 2, 2, 2, 3, 'Logitech G840 XL', 629000, '656335d8a93dc.png', '900x400', 'Clothpad', '3', 'Tidak ada'),
(20, 3, 1, 3, 2, 1, 3, 'Logitech G740 Large Thick Cloth', 539000, '656336109b3cf.png', '460x400', 'Clothpad', '5', 'Tidak ada'),
(27, 5, 1, 2, 1, 3, 4, 'Steelseries QcK Prism Cloth 3XL (RGB)', 1610000, '656af821d4569.jpg', '1220x590', 'Clothpad', '4', 'Ada');

-- --------------------------------------------------------

--
-- Table structure for table `ukuran`
--

CREATE TABLE `ukuran` (
  `ukuran_id` int(11) NOT NULL,
  `min_ukuran` varchar(11) NOT NULL,
  `max_ukuran` varchar(11) NOT NULL,
  `bobot_ukuran` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `ukuran`
--

INSERT INTO `ukuran` (`ukuran_id`, `min_ukuran`, `max_ukuran`, `bobot_ukuran`) VALUES
(1, '0', '260x215', 1),
(2, '261x216', '360x300', 2),
(3, '361x301', '460x400', 3),
(4, '461x401', '900x400', 4),
(5, '901x401', '1220x590', 5);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admin`
--
ALTER TABLE `admin`
  ADD PRIMARY KEY (`admin_id`);

--
-- Indexes for table `bahan`
--
ALTER TABLE `bahan`
  ADD PRIMARY KEY (`bahan_id`);

--
-- Indexes for table `harga`
--
ALTER TABLE `harga`
  ADD PRIMARY KEY (`harga_id`);

--
-- Indexes for table `jahitan`
--
ALTER TABLE `jahitan`
  ADD PRIMARY KEY (`jahitan_id`);

--
-- Indexes for table `ketebalan`
--
ALTER TABLE `ketebalan`
  ADD PRIMARY KEY (`ketebalan_id`);

--
-- Indexes for table `merk`
--
ALTER TABLE `merk`
  ADD PRIMARY KEY (`merk_id`);

--
-- Indexes for table `mousepad`
--
ALTER TABLE `mousepad`
  ADD PRIMARY KEY (`mousepad_id`);

--
-- Indexes for table `ukuran`
--
ALTER TABLE `ukuran`
  ADD PRIMARY KEY (`ukuran_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `admin`
--
ALTER TABLE `admin`
  MODIFY `admin_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `bahan`
--
ALTER TABLE `bahan`
  MODIFY `bahan_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `harga`
--
ALTER TABLE `harga`
  MODIFY `harga_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `jahitan`
--
ALTER TABLE `jahitan`
  MODIFY `jahitan_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `ketebalan`
--
ALTER TABLE `ketebalan`
  MODIFY `ketebalan_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `merk`
--
ALTER TABLE `merk`
  MODIFY `merk_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `mousepad`
--
ALTER TABLE `mousepad`
  MODIFY `mousepad_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=36;

--
-- AUTO_INCREMENT for table `ukuran`
--
ALTER TABLE `ukuran`
  MODIFY `ukuran_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
