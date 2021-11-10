-- phpMyAdmin SQL Dump
-- version 5.1.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Nov 10, 2021 at 05:34 PM
-- Server version: 10.4.18-MariaDB
-- PHP Version: 8.0.3

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `webstore`
--

-- --------------------------------------------------------

--
-- Table structure for table `category`
--

CREATE TABLE `category` (
  `cat_id` varchar(20) COLLATE utf8mb4_unicode_ci NOT NULL,
  `categoryname` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL,
  `cat_des` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `category`
--

INSERT INTO `category` (`cat_id`, `categoryname`, `cat_des`) VALUES
('MT01', 'Model toys', 'Model toys for teenagers.'),
('MTS01', 'Model toys small', 'Model toys for teenagers.'),
('U01', 'Ultimate Weapon', 'ultimate weapon');

-- --------------------------------------------------------

--
-- Table structure for table `product`
--

CREATE TABLE `product` (
  `pro_id` varchar(20) COLLATE utf8mb4_unicode_ci NOT NULL,
  `store_id` varchar(20) COLLATE utf8mb4_unicode_ci NOT NULL,
  `cat_id` varchar(20) COLLATE utf8mb4_unicode_ci NOT NULL,
  `productname` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL,
  `price` varchar(20) COLLATE utf8mb4_unicode_ci NOT NULL,
  `pro_image` varchar(200) COLLATE utf8mb4_unicode_ci NOT NULL,
  `quantity` int(20) NOT NULL,
  `description` varchar(200) COLLATE utf8mb4_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `product`
--

INSERT INTO `product` (`pro_id`, `store_id`, `cat_id`, `productname`, `price`, `pro_image`, `quantity`, `description`) VALUES
('M01', 'CT01', 'MT01', 'MODEL SASUKE AKATSUKI', '$1200', '1.jpg', 12, 'Size is almost 40cm'),
('MT02', 'CT01', 'MT01', 'ITACHI SUSANOO V2', '$1500', '2.jpg', 22, 'Size 35.5cm'),
('MT03', 'CT01', 'MT01', 'THE LATEST MODEL OF THE MINATUS FIRE MOTORCYCLE', '$1800', '4.jpg', 21, 'Material: high quality sharp plastic Height about 25cm'),
('MT04', 'CT01', 'MT01', 'JIRAIYA 2 COLORFUL FOREIGN MODEL', '$800', '3.jpg', 21, 'There is no description for this product yet'),
('MTS02', 'HN01', 'MTS01', 'HINATA MODEL IN NARUTO', '$500', '5.jpg', 43, 'Hinata model'),
('MTS03', 'HN01', 'MTS01', 'OBITO JINCHURIKI MODEL', '$900', '6.jpg', 43, 'OBITO JINCHURIKI MODEL'),
('MTS04', 'HN01', 'MTS01', 'JIRAIYA COLORFUL FOREIGN MODEL', '$900', '7.jpg', 21, 'JIRAIYA COLORFUL FOREIGN MODEL'),
('SM01', 'HN01', 'MTS01', 'MODEL ITACHI ANBU', '$900', '8.jpg', 22, 'Size: 28cm'),
('UW01', 'HCM01', 'U01', 'IRONMAN INFINITE GLOVES', '$2100', '9 (2).jpg', 12, 'IRONMAN INFINITE GLOVES'),
('UW02', 'HCM01', 'U01', 'Metallic Infinity Gauntlets', '$2000', '11.jpg', 12, 'Metallic Infinity Gauntlets');

-- --------------------------------------------------------

--
-- Table structure for table `store`
--

CREATE TABLE `store` (
  `store_id` varchar(20) COLLATE utf8mb4_unicode_ci NOT NULL,
  `store_name` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL,
  `store_des` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `store_address` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `store`
--

INSERT INTO `store` (`store_id`, `store_name`, `store_des`, `store_address`) VALUES
('CT01', 'Can Tho ATN', 'As a branch of ATN located in Can Tho', '160, 30/4 street, Ninh Kieu, Can Tho'),
('HCM01', 'Ho Chi Minh ATN', 'As a branch of ATN located in HCM', '34d, Nguyen Van Linh street, Phu Nhuan District, Ho Chi Minh'),
('HN01', 'Ha Noi ATN', 'As a branch of ATN located in Ha Noi', '49e, Nguyen Van Cu street, Cau Giay District, Ha Noi');

-- --------------------------------------------------------

--
-- Table structure for table `useraccount`
--

CREATE TABLE `useraccount` (
  `username` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL,
  `password` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL,
  `phone` varchar(15) COLLATE utf8mb4_unicode_ci NOT NULL,
  `gender` int(15) NOT NULL,
  `email` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL,
  `address` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `state` int(11) NOT NULL,
  `fullname` varchar(20) COLLATE utf8mb4_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `useraccount`
--

INSERT INTO `useraccount` (`username`, `password`, `phone`, `gender`, `email`, `address`, `state`, `fullname`) VALUES
('admin', 'e10adc3949ba59abbe56e057f20f883e', '0383658449', 0, 'tarachan@gmail.com', 'Can Tho', 1, ''),
('danh ', 'e10adc3949ba59abbe56e057f20f883e', '222222222212', 1, 'kien@12323', 'bac lieu', 0, 'danh thi ngoc tram'),
('kien', 'e10adc3949ba59abbe56e057f20f883e', '323222220999', 0, 'kien@123', 'Can Tho he', 0, 'le trung kien'),
('ngan', 'e10adc3949ba59abbe56e057f20f883e', '3232222209', 1, 'diemkieu@gmail', 'Can Tho he', 0, 'diem kieu'),
('nhan', 'e10adc3949ba59abbe56e057f20f883e', '323222223388', 0, 'nhan@123', 'Can Tho', 0, 'nhan nhan'),
('Tarachan', 'e10adc3949ba59abbe56e057f20f883e', '32322222', 0, 'tarachan1@gmail.com', 'Can Tho he', 0, 'danh chan tara'),
('Tarachan12', 'e10adc3949ba59abbe56e057f20f883e', '3232222233', 0, 'tarachan11@gmail.com', 'Can Tho he', 0, 'danh chan tara');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `category`
--
ALTER TABLE `category`
  ADD PRIMARY KEY (`cat_id`);

--
-- Indexes for table `product`
--
ALTER TABLE `product`
  ADD PRIMARY KEY (`pro_id`),
  ADD KEY `cat_id` (`cat_id`),
  ADD KEY `store_id` (`store_id`);

--
-- Indexes for table `store`
--
ALTER TABLE `store`
  ADD PRIMARY KEY (`store_id`);

--
-- Indexes for table `useraccount`
--
ALTER TABLE `useraccount`
  ADD PRIMARY KEY (`username`);

--
-- Constraints for dumped tables
--

--
-- Constraints for table `product`
--
ALTER TABLE `product`
  ADD CONSTRAINT `product_ibfk_1` FOREIGN KEY (`cat_id`) REFERENCES `category` (`cat_id`),
  ADD CONSTRAINT `product_ibfk_2` FOREIGN KEY (`store_id`) REFERENCES `store` (`store_id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
