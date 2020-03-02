-- phpMyAdmin SQL Dump
-- version 4.9.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Mar 02, 2020 at 08:26 AM
-- Server version: 10.4.8-MariaDB
-- PHP Version: 7.3.10

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `asset_management`
--

-- --------------------------------------------------------

--
-- Table structure for table `admin`
--

CREATE TABLE `admin` (
  `id` bigint(20) NOT NULL,
  `name` varchar(50) NOT NULL,
  `email` varchar(50) NOT NULL,
  `password` varchar(50) NOT NULL,
  `status` enum('active','inactive') NOT NULL,
  `photo` varchar(128) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `admin`
--

INSERT INTO `admin` (`id`, `name`, `email`, `password`, `status`, `photo`) VALUES
(6, 'Jahidul Islam', 'jahidiu@gmail.com', '12345', 'active', 'Jahid.jpg'),
(8, 'Hannan', 'abdulhannan05705@gmail.com', '12345', 'active', 'hannan.jpg'),
(17, '  Samun', 'samun@gmail.com', '12345', 'active', 'samun.jfif'),
(18, 'Biva', 'biva@gmail.com', '12345', 'active', 'biva.jpg');

-- --------------------------------------------------------

--
-- Table structure for table `product`
--

CREATE TABLE `product` (
  `id` bigint(20) NOT NULL,
  `name` varchar(50) NOT NULL,
  `price` float NOT NULL,
  `photo` varchar(128) NOT NULL,
  `unit` varchar(50) NOT NULL,
  `depreciation` decimal(8,2) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `product`
--

INSERT INTO `product` (`id`, `name`, `price`, `photo`, `unit`, `depreciation`) VALUES
(22, ' Washing Machine', 30000, 'washing.jpg', ' piece', '2.00'),
(23, ' Blender', 4500, 'blender.jpeg', ' piece', '1.00'),
(24, 'Rice Cooker', 5000, 'cooker.jpg', 'piece', '1.00'),
(25, '  Car ', 10000000, 'car.jpg', ' piece', '5.00'),
(26, ' Bike', 8000000, 'bike.jpg', ' piece', '5.00'),
(27, ' Oven ', 11000, 'oven.jpg', ' piece', '2.00'),
(28, 'Fridge', 65000, 'fredge.jpg', 'piece', '5.00'),
(29, 'Laptop', 150000, 'laptop.jpg', 'piece', '5.00'),
(30, ' Microphone', 10000, 'microphone.jpg', ' piece', '2.00'),
(31, ' Speker', 7000, 'speker.jpeg', ' piece', '2.00'),
(32, 'Smart Watch', 50000, 'watch.png', 'piece', '5.00'),
(33, 'iPhone', 120000, 'iphone.jpg', 'piece', '5.00'),
(34, 'Monitor', 10000, 'samsung monitor.jpg', 'piece', '2.00');

-- --------------------------------------------------------

--
-- Table structure for table `returns`
--

CREATE TABLE `returns` (
  `id` bigint(20) NOT NULL,
  `product_id` bigint(20) NOT NULL,
  `quantity` float NOT NULL,
  `total` float NOT NULL,
  `date` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `returns`
--

INSERT INTO `returns` (`id`, `product_id`, `quantity`, `total`, `date`) VALUES
(6, 22, 3, 90000, '2020-03-02');

-- --------------------------------------------------------

--
-- Table structure for table `stock_in`
--

CREATE TABLE `stock_in` (
  `id` bigint(20) NOT NULL,
  `invoice_no` bigint(20) NOT NULL,
  `admin_id` bigint(20) NOT NULL,
  `product_id` bigint(20) NOT NULL,
  `quantity` float NOT NULL,
  `sub_total` float NOT NULL,
  `discount` float NOT NULL,
  `total` float NOT NULL,
  `date` date NOT NULL,
  `supplier_id` bigint(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `stock_in`
--

INSERT INTO `stock_in` (`id`, `invoice_no`, `admin_id`, `product_id`, `quantity`, `sub_total`, `discount`, `total`, `date`, `supplier_id`) VALUES
(25, 1, 6, 22, 5, 150000, 2, 147000, '2019-07-03', 10),
(26, 2, 6, 23, 20, 90000, 1, 89100, '2019-01-18', 10),
(27, 3, 6, 24, 20, 100000, 1, 99000, '2019-02-21', 10),
(28, 4, 6, 25, 1, 10000000, 0, 10000000, '2019-01-03', 11),
(29, 5, 6, 26, 5, 40000000, 3, 38800000, '2019-02-14', 12),
(30, 6, 6, 27, 20, 220000, 3, 213400, '2019-03-14', 10),
(32, 7, 6, 29, 10, 1500000, 4, 1440000, '2019-03-30', 9),
(33, 8, 6, 30, 15, 150000, 1, 148500, '2019-04-18', 13),
(34, 9, 6, 31, 10, 70000, 2, 68600, '2019-04-11', 13),
(35, 10, 6, 32, 10, 500000, 4, 480000, '2019-05-04', 9),
(38, 11, 8, 22, 10, 300000, 2, 294000, '2018-08-10', 10),
(41, 12, 8, 25, 2, 20000000, 7, 18600000, '2018-10-25', 11),
(43, 13, 8, 27, 25, 275000, 2, 269500, '2018-08-09', 10),
(45, 14, 8, 30, 15, 150000, 1, 148500, '2017-11-10', 13),
(46, 15, 8, 32, 10, 500000, 4, 480000, '2018-02-14', 9),
(47, 16, 8, 33, 10, 1200000, 5, 1140000, '2017-10-15', 9),
(48, 17, 8, 32, 5, 250000, 4, 240000, '2017-07-20', 9),
(51, 18, 8, 26, 10, 80000000, 5, 76000000, '2017-05-11', 11),
(52, 19, 8, 23, 15, 67500, 2, 66150, '2017-05-04', 10),
(53, 20, 8, 29, 10, 1500000, 4, 1440000, '2019-02-14', 9),
(54, 21, 17, 22, 15, 450000, 3, 436500, '2017-09-06', 10),
(55, 22, 17, 23, 15, 67500, 2, 66150, '2017-11-08', 10),
(57, 23, 17, 25, 4, 40000000, 5, 38000000, '2018-02-23', 12),
(59, 24, 17, 27, 20, 220000, 2, 215600, '2018-03-07', 10),
(60, 25, 17, 28, 10, 650000, 5, 617500, '2017-11-10', 10),
(61, 26, 17, 29, 12, 1800000, 5, 1710000, '2017-10-12', 9),
(64, 27, 17, 34, 15, 150000, 3, 145500, '2018-01-05', 13),
(65, 28, 17, 31, 10, 70000, 2, 68600, '2018-03-22', 13),
(67, 29, 17, 23, 20, 90000, 1, 89100, '2018-02-02', 10),
(68, 30, 17, 32, 10, 500000, 4, 480000, '2017-10-11', 9),
(69, 31, 18, 22, 10, 300000, 3, 291000, '2020-03-01', 10),
(70, 32, 18, 23, 20, 90000, 2, 88200, '2017-05-31', 10),
(74, 33, 18, 27, 15, 165000, 2, 161700, '2018-12-12', 10),
(75, 34, 18, 28, 12, 780000, 5, 741000, '2018-11-21', 10),
(76, 35, 18, 29, 10, 1500000, 4, 1440000, '2019-02-27', 9),
(77, 36, 18, 30, 15, 150000, 1, 148500, '2018-01-17', 13),
(78, 37, 18, 31, 18, 126000, 2, 123480, '2017-09-06', 13),
(79, 38, 18, 34, 15, 150000, 2, 147000, '2018-03-15', 13),
(80, 39, 18, 33, 15, 1800000, 5, 1710000, '2017-08-02', 9),
(82, 40, 18, 31, 10, 70000, 2, 68600, '2017-12-20', 13);

-- --------------------------------------------------------

--
-- Table structure for table `stock_out`
--

CREATE TABLE `stock_out` (
  `id` bigint(20) NOT NULL,
  `invoice_no` bigint(20) NOT NULL,
  `admin_id` bigint(20) NOT NULL,
  `product_id` bigint(20) NOT NULL,
  `quantity` float NOT NULL,
  `sub_total` float NOT NULL,
  `discount` float NOT NULL,
  `total` float NOT NULL,
  `customer_info` varchar(255) NOT NULL,
  `date` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `stock_out`
--

INSERT INTO `stock_out` (`id`, `invoice_no`, `admin_id`, `product_id`, `quantity`, `sub_total`, `discount`, `total`, `customer_info`, `date`) VALUES
(21, 1, 6, 24, 4, 20000, 2, 19600, 'Rofiq', '2020-03-02'),
(22, 2, 6, 28, 5, 325000, 2, 318500, 'Solim', '2020-03-01'),
(23, 3, 6, 30, 3, 30000, 1, 29700, 'salam', '2020-03-01'),
(24, 4, 6, 22, 10, 300000, 1, 297000, 'ertt', '2020-03-02');

-- --------------------------------------------------------

--
-- Table structure for table `supplier`
--

CREATE TABLE `supplier` (
  `id` bigint(20) NOT NULL,
  `name` varchar(255) NOT NULL,
  `address` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `supplier`
--

INSERT INTO `supplier` (`id`, `name`, `address`) VALUES
(9, 'iCenter Dhanmondi', 'Address: House No - 18, 7 Mirpur Rd, Dhaka 1205\r\nHours: \r\nCloses soon: 8PM ⋅ Opens 10:30AM Mon\r\n\r\nPhone: 01678-750350'),
(10, 'Singer Bangladesh Limited', 'Address: 5B Rd 126, Dhaka 1212\r\nHours: \r\nCloses soon: 8PM ⋅ Opens 9AM Mon\r\n\r\nPhone: 09606-600600'),
(11, 'Executive Motors Limited', 'Address: Ground Floor, 222, Bir Uttam Mir Shawkat Sarak, Tajgon,  Dhaka 1208\r\nHours: \r\nClosed ⋅ Opens 10AM Mon\r\nPhone: 01709-674488'),
(12, 'Regal Raptor Bangladesh', 'Address: 115 DIT Rd, Dhaka 1217\r\nHours: \r\nOpen ⋅ Closes 9PM\r\n\r\nPhone: 01936-155548'),
(13, 'TECH LAND BD', 'Address: Multiplan Center, Shop#839-840, Level#8, New Elephant Rd, Dhaka 1205\r\nHours: \r\nCloses soon: 8PM ⋅ Opens 10AM Mon\r\n\r\nPhone: 01701-663681');

-- --------------------------------------------------------

--
-- Table structure for table `wastage`
--

CREATE TABLE `wastage` (
  `id` bigint(20) NOT NULL,
  `product_id` bigint(20) NOT NULL,
  `quantity` float NOT NULL,
  `total` float NOT NULL,
  `date` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `wastage`
--

INSERT INTO `wastage` (`id`, `product_id`, `quantity`, `total`, `date`) VALUES
(16, 23, 1, 4500, '2020-03-01'),
(17, 22, 1, 30000, '2020-01-08');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admin`
--
ALTER TABLE `admin`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `product`
--
ALTER TABLE `product`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `returns`
--
ALTER TABLE `returns`
  ADD PRIMARY KEY (`id`),
  ADD KEY `product_id` (`product_id`);

--
-- Indexes for table `stock_in`
--
ALTER TABLE `stock_in`
  ADD PRIMARY KEY (`id`),
  ADD KEY `admin_id` (`admin_id`),
  ADD KEY `product_id` (`product_id`),
  ADD KEY `supplier_id` (`supplier_id`);

--
-- Indexes for table `stock_out`
--
ALTER TABLE `stock_out`
  ADD PRIMARY KEY (`id`),
  ADD KEY `admin_id` (`admin_id`),
  ADD KEY `product_id` (`product_id`);

--
-- Indexes for table `supplier`
--
ALTER TABLE `supplier`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `wastage`
--
ALTER TABLE `wastage`
  ADD PRIMARY KEY (`id`),
  ADD KEY `product_id` (`product_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `admin`
--
ALTER TABLE `admin`
  MODIFY `id` bigint(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=19;

--
-- AUTO_INCREMENT for table `product`
--
ALTER TABLE `product`
  MODIFY `id` bigint(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=35;

--
-- AUTO_INCREMENT for table `returns`
--
ALTER TABLE `returns`
  MODIFY `id` bigint(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `stock_in`
--
ALTER TABLE `stock_in`
  MODIFY `id` bigint(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=83;

--
-- AUTO_INCREMENT for table `stock_out`
--
ALTER TABLE `stock_out`
  MODIFY `id` bigint(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=25;

--
-- AUTO_INCREMENT for table `supplier`
--
ALTER TABLE `supplier`
  MODIFY `id` bigint(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT for table `wastage`
--
ALTER TABLE `wastage`
  MODIFY `id` bigint(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=18;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `returns`
--
ALTER TABLE `returns`
  ADD CONSTRAINT `returns_ibfk_1` FOREIGN KEY (`product_id`) REFERENCES `product` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `stock_in`
--
ALTER TABLE `stock_in`
  ADD CONSTRAINT `stock_in_ibfk_1` FOREIGN KEY (`admin_id`) REFERENCES `admin` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `stock_in_ibfk_2` FOREIGN KEY (`product_id`) REFERENCES `product` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `stock_in_ibfk_3` FOREIGN KEY (`supplier_id`) REFERENCES `supplier` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `stock_out`
--
ALTER TABLE `stock_out`
  ADD CONSTRAINT `stock_out_ibfk_1` FOREIGN KEY (`product_id`) REFERENCES `product` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `stock_out_ibfk_2` FOREIGN KEY (`admin_id`) REFERENCES `admin` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `wastage`
--
ALTER TABLE `wastage`
  ADD CONSTRAINT `wastage_ibfk_1` FOREIGN KEY (`product_id`) REFERENCES `product` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
