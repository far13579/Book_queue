-- phpMyAdmin SQL Dump
-- version 5.0.3
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Nov 09, 2020 at 07:33 PM
-- Server version: 10.4.14-MariaDB
-- PHP Version: 7.2.34

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `queue_booking`
--

-- --------------------------------------------------------

--
-- Table structure for table `employ`
--

CREATE TABLE `employ` (
  `id_employ` int(10) NOT NULL COMMENT 'รหัสพนักงาน',
  `name` varchar(100) COLLATE utf8_unicode_ci NOT NULL COMMENT 'ชื่อพนักงาน',
  `address` varchar(200) COLLATE utf8_unicode_ci NOT NULL COMMENT 'ที่อยู่พนักงาน',
  `tel` varchar(10) COLLATE utf8_unicode_ci NOT NULL COMMENT 'เบอร์โทรพนักงาน'
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `employ`
--

INSERT INTO `employ` (`id_employ`, `name`, `address`, `tel`) VALUES
(2147483647, 'สุวิภา บุญสุข', 'xxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxx', '0000000000');

-- --------------------------------------------------------

--
-- Table structure for table `food`
--

CREATE TABLE `food` (
  `id_food` int(20) NOT NULL,
  `name_food` varchar(100) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `price_food` int(100) NOT NULL,
  `food_img` varchar(500) COLLATE utf8_unicode_ci NOT NULL,
  `id_type` int(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `food`
--

INSERT INTO `food` (`id_food`, `name_food`, `price_food`, `food_img`, `id_type`) VALUES
(1, 'นมสดโอริโอ้', 50, 'Oreo-Milk.jpg', 2),
(2, 'มอคค่า', 45, 'Mocca.jpg', 2),
(3, 'กาแฟปั่น', 40, 'Cool Coffee.jpg', 2),
(4, 'นมสด', 40, 'Milk.jpg', 2),
(5, 'ลาเต้', 45, 'Late.jpg', 2),
(6, 'คาปูชิโน่', 50, 'Cappuchino.jpg', 2),
(7, 'ชาเขียว', 35, 'Green Tea.jpg', 2),
(8, 'ชาเย็น', 35, 'Thai Tea.png', 2),
(9, 'โกโก้', 40, 'Coco.jpg', 2),
(10, 'นมเย็น', 35, 'Cool Milk.jpg', 2);

-- --------------------------------------------------------

--
-- Table structure for table `order_type`
--

CREATE TABLE `order_type` (
  `id_ot` int(10) NOT NULL COMMENT 'รหัสประเภทการสั่ง',
  `name_ot` varchar(100) COLLATE utf8_unicode_ci NOT NULL COMMENT 'ชื่อประเภทการสั่ง'
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `order_type`
--

INSERT INTO `order_type` (`id_ot`, `name_ot`) VALUES
(1, 'ทานที่ร้าน'),
(2, 'กลับบ้าน');

-- --------------------------------------------------------

--
-- Table structure for table `queue`
--

CREATE TABLE `queue` (
  `id_Q` int(10) NOT NULL COMMENT 'รหัสQ',
  `form` text COLLATE utf8_unicode_ci NOT NULL COMMENT 'รหัสประเภทการสั่ง',
  `Q_date` date NOT NULL COMMENT 'วันที่',
  `id_status` varchar(10) COLLATE utf8_unicode_ci NOT NULL COMMENT 'รหัสสถานะ',
  `price_q` int(100) NOT NULL COMMENT 'ราคารวมสุทธิ'
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `queue`
--

INSERT INTO `queue` (`id_Q`, `form`, `Q_date`, `id_status`, `price_q`) VALUES
(48, '1', '2020-11-09', '2', 50),
(49, '1', '2020-11-09', '1', 550),
(50, '2', '2020-11-09', '1', 0),
(51, '1', '2020-11-09', '1', 500),
(52, '2', '2020-11-09', '1', 0),
(53, '2', '2020-11-09', '1', 50),
(54, '1', '2020-11-09', '1', 50),
(55, '2', '2020-11-09', '1', 50),
(56, '1', '2020-11-09', '1', 50),
(57, '2', '2020-11-09', '1', 0),
(58, '2', '2020-11-09', '1', 0),
(59, '2', '2020-11-09', '1', 100),
(60, '1', '2020-11-09', '1', 0),
(61, '1', '2020-11-09', '1', 0),
(62, '1', '2020-11-09', '1', 0),
(63, '2', '2020-11-09', '1', 90);

-- --------------------------------------------------------

--
-- Table structure for table `sales_details`
--

CREATE TABLE `sales_details` (
  `id_Q` int(10) NOT NULL COMMENT 'รหัสคิว',
  `id_details` int(20) NOT NULL COMMENT 'รหัสรายละเอียดการขาย',
  `id_food` int(20) NOT NULL COMMENT 'รหัสอาหาร',
  `d_price` text COLLATE utf8_unicode_ci NOT NULL COMMENT 'ราคารวม',
  `am_food` int(10) NOT NULL COMMENT 'จำนวนอาหาร'
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `sales_details`
--

INSERT INTO `sales_details` (`id_Q`, `id_details`, `id_food`, `d_price`, `am_food`) VALUES
(31, 5, 1, '50', 1),
(31, 6, 4, '500', 1),
(31, 7, 4, '500', 1),
(32, 8, 4, '500', 1),
(42, 9, 1, '50', 1),
(46, 10, 4, '500', 1),
(46, 11, 1, '50', 1),
(47, 12, 1, '50', 1),
(47, 13, 1, '50', 1),
(47, 14, 4, '500', 1),
(47, 15, 4, '500', 1),
(47, 16, 4, '500', 1),
(47, 17, 1, '50', 1),
(49, 19, 4, '500', 1),
(49, 20, 1, '50', 1),
(51, 24, 4, '500', 1),
(48, 25, 1, '50', 1),
(53, 26, 1, '50', 1),
(54, 27, 1, '50', 1),
(55, 28, 1, '50', 1),
(56, 29, 1, '50', 1),
(59, 30, 1, '50', 1),
(59, 31, 1, '50', 1),
(63, 32, 1, '50', 1),
(63, 33, 4, '40', 1);

-- --------------------------------------------------------

--
-- Table structure for table `status`
--

CREATE TABLE `status` (
  `id_status` int(10) NOT NULL COMMENT 'รหัสสถานะ',
  `name_status` varchar(100) COLLATE utf8_unicode_ci NOT NULL COMMENT 'ชื่อสถานะ'
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `status`
--

INSERT INTO `status` (`id_status`, `name_status`) VALUES
(1, 'กำลังจอง'),
(2, 'ได้รับของอาหารแล้ว'),
(3, 'ยกเลิกการจอง');

-- --------------------------------------------------------

--
-- Table structure for table `type`
--

CREATE TABLE `type` (
  `id_type` int(20) NOT NULL COMMENT 'รหัสประเภท',
  `name_type` varchar(100) COLLATE utf8_unicode_ci NOT NULL COMMENT 'ชื่อประเภท'
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `type`
--

INSERT INTO `type` (`id_type`, `name_type`) VALUES
(2, 'อาหารทะเล'),
(5, 'อาหารทอด');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `employ`
--
ALTER TABLE `employ`
  ADD PRIMARY KEY (`id_employ`);

--
-- Indexes for table `food`
--
ALTER TABLE `food`
  ADD PRIMARY KEY (`id_food`),
  ADD KEY `id_type` (`id_type`);

--
-- Indexes for table `order_type`
--
ALTER TABLE `order_type`
  ADD PRIMARY KEY (`id_ot`);

--
-- Indexes for table `queue`
--
ALTER TABLE `queue`
  ADD PRIMARY KEY (`id_Q`);

--
-- Indexes for table `sales_details`
--
ALTER TABLE `sales_details`
  ADD PRIMARY KEY (`id_details`);

--
-- Indexes for table `status`
--
ALTER TABLE `status`
  ADD PRIMARY KEY (`id_status`);

--
-- Indexes for table `type`
--
ALTER TABLE `type`
  ADD PRIMARY KEY (`id_type`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `queue`
--
ALTER TABLE `queue`
  MODIFY `id_Q` int(10) NOT NULL AUTO_INCREMENT COMMENT 'รหัสQ', AUTO_INCREMENT=64;

--
-- AUTO_INCREMENT for table `sales_details`
--
ALTER TABLE `sales_details`
  MODIFY `id_details` int(20) NOT NULL AUTO_INCREMENT COMMENT 'รหัสรายละเอียดการขาย', AUTO_INCREMENT=34;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `food`
--
ALTER TABLE `food`
  ADD CONSTRAINT `food_ibfk_1` FOREIGN KEY (`id_type`) REFERENCES `type` (`id_type`),
  ADD CONSTRAINT `food_ibfk_2` FOREIGN KEY (`id_type`) REFERENCES `type` (`id_type`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
