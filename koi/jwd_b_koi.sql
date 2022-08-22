-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: localhost
-- Generation Time: Aug 22, 2022 at 01:10 PM
-- Server version: 10.8.4-MariaDB-1:10.8.4+maria~ubu2004
-- PHP Version: 8.1.9

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `jwd_b_koi`
--

-- --------------------------------------------------------

--
-- Table structure for table `category`
--

CREATE TABLE `category` (
  `id` int(11) NOT NULL,
  `name` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `category`
--

INSERT INTO `category` (`id`, `name`) VALUES
(1, 'Koi Tancho'),
(2, 'Koi Shiro Utsuri'),
(3, 'Koi Kumpay Slayer'),
(4, 'Koi Kumonryu'),
(5, 'Koi Ki Utsuri');

-- --------------------------------------------------------

--
-- Table structure for table `fish`
--

CREATE TABLE `fish` (
  `id` int(11) NOT NULL,
  `name` varchar(100) NOT NULL,
  `stock` int(11) NOT NULL,
  `price` int(11) NOT NULL,
  `size` varchar(100) NOT NULL,
  `uid` int(11) NOT NULL,
  `image` varchar(200) NOT NULL,
  `category_id` int(11) NOT NULL,
  `create_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `isDelete` int(1) NOT NULL DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `fish`
--

INSERT INTO `fish` (`id`, `name`, `stock`, `price`, `size`, `uid`, `image`, `category_id`, `create_at`, `isDelete`) VALUES
(1, 'Shiro Utsuri Jumbo Tosai', 10, 600000, '33 cm F1 Grade A', 1, 'Shiro_Utsuri_Jumbo_Tosai.jpeg', 2, '2022-08-17 18:02:10', 0),
(7, 'Koi Kumpay Slayer Jumbo', 15, 130000, '25 - 30 cm ', 1, 'KOI1660972573.jpg', 3, '2022-08-20 05:16:13', 0),
(8, 'Koi Kumpay Slayer Mini', 20, 50000, '5 - 10 cm ', 1, 'KOI1661082483.jpg', 3, '2022-08-20 05:16:13', 0),
(9, 'Beni Kumonryu Putraanson', 7, 125000, '28 - 32 cm ', 1, 'KOI1661082908.jpg', 4, '2022-08-21 11:55:08', 0);

-- --------------------------------------------------------

--
-- Table structure for table `item_trans`
--

CREATE TABLE `item_trans` (
  `id` int(11) NOT NULL,
  `kode_trans` varchar(20) NOT NULL,
  `fish_id` int(11) NOT NULL,
  `amount` int(11) NOT NULL,
  `create_at` datetime NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `item_trans`
--

INSERT INTO `item_trans` (`id`, `kode_trans`, `fish_id`, `amount`, `create_at`) VALUES
(3, 'TR6303032de6eaa', 1, 7, '2022-08-22 11:18:11');

-- --------------------------------------------------------

--
-- Table structure for table `transaksi`
--

CREATE TABLE `transaksi` (
  `kode_trans` varchar(20) NOT NULL,
  `uid` int(11) NOT NULL,
  `tgl_trans` datetime NOT NULL DEFAULT current_timestamp(),
  `status` int(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `transaksi`
--

INSERT INTO `transaksi` (`kode_trans`, `uid`, `tgl_trans`, `status`) VALUES
('TR6303032de6eaa', 2, '2022-08-22 11:16:45', 1);

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE `user` (
  `uid` int(11) NOT NULL,
  `full_name` varchar(150) NOT NULL,
  `email` varchar(150) NOT NULL,
  `address` varchar(250) DEFAULT NULL,
  `phone` varchar(14) NOT NULL,
  `password` varchar(255) NOT NULL,
  `level` enum('user','admin') NOT NULL DEFAULT 'user',
  `create_at` datetime NOT NULL DEFAULT current_timestamp(),
  `status` enum('0','1') NOT NULL DEFAULT '1'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`uid`, `full_name`, `email`, `address`, `phone`, `password`, `level`, `create_at`, `status`) VALUES
(1, 'Agus Prayogi', 'agus21apy@gmail.com', 'Malang, JATIM', '08817935154', '$2y$10$NNKDR/JZJwpeZ5NGCsbWOeoss2jaInP0/N1sfMfCNbg3sM14uk94.', 'admin', '2022-08-21 19:17:58', '1'),
(2, 'marcel radhival', 'marcel@gmail.com', 'Jakarta', '0877564532', '$2y$10$cxIti2jhhdm6qDd66kkvQOCOYvD2H6m./0DeDclk9iIYiux.AFZL6', 'user', '2022-08-21 19:38:30', '1');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `category`
--
ALTER TABLE `category`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `fish`
--
ALTER TABLE `fish`
  ADD PRIMARY KEY (`id`),
  ADD KEY `category_id` (`category_id`),
  ADD KEY `uid` (`uid`);

--
-- Indexes for table `item_trans`
--
ALTER TABLE `item_trans`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `transaksi`
--
ALTER TABLE `transaksi`
  ADD PRIMARY KEY (`kode_trans`);

--
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`uid`),
  ADD UNIQUE KEY `email` (`email`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `category`
--
ALTER TABLE `category`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `fish`
--
ALTER TABLE `fish`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `item_trans`
--
ALTER TABLE `item_trans`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
  MODIFY `uid` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `fish`
--
ALTER TABLE `fish`
  ADD CONSTRAINT `fish_ibfk_1` FOREIGN KEY (`uid`) REFERENCES `user` (`uid`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `fish_ibfk_2` FOREIGN KEY (`category_id`) REFERENCES `category` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
