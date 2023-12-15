-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Dec 15, 2023 at 09:31 PM
-- Server version: 10.4.27-MariaDB
-- PHP Version: 8.1.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `topshelfco`
--

-- --------------------------------------------------------

--
-- Table structure for table `admin_tbl`
--

CREATE TABLE `admin_tbl` (
  `admin_ID` int(4) NOT NULL,
  `admin_name` varchar(250) NOT NULL,
  `admin_username` varchar(250) NOT NULL,
  `admin_password` varchar(250) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `admin_tbl`
--

INSERT INTO `admin_tbl` (`admin_ID`, `admin_name`, `admin_username`, `admin_password`) VALUES
(1, 'Ryann Jay Gudito', 'ryann123', 'password123');

-- --------------------------------------------------------

--
-- Table structure for table `cart_tbl`
--

CREATE TABLE `cart_tbl` (
  `cart_ID` int(4) NOT NULL,
  `customer_ID` int(4) NOT NULL,
  `prod_ID` int(4) NOT NULL,
  `size_ID` int(4) NOT NULL,
  `cart_quantity` int(4) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `customer_tbl`
--

CREATE TABLE `customer_tbl` (
  `customer_ID` int(4) NOT NULL,
  `customer_name` varchar(50) NOT NULL,
  `customer_username` varchar(50) NOT NULL,
  `customer_number` varchar(15) NOT NULL,
  `customer_address` varchar(50) NOT NULL,
  `customer_password` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `customer_tbl`
--

INSERT INTO `customer_tbl` (`customer_ID`, `customer_name`, `customer_username`, `customer_number`, `customer_address`, `customer_password`) VALUES
(3, 'Al Drazen Sagarino', 'draz', '09303382904', 'Chino Hills, California USA', 'localhero123'),
(17, 'liz sagarino', 'liz123', '09303214237', 'block 5 lot 13 phase 3 NHA Bangkal Davao City', 'liz123'),
(18, 'calum scott', 'calum123', '09091013645', 'block 5 lot 13 phase 3 NHA Bangkal Davao City', 'password123'),
(20, 'Jason Mraz', 'geekinthepink', '09091013645', 'Geek in the Pink', 'love');

-- --------------------------------------------------------

--
-- Table structure for table `order_items_tbl`
--

CREATE TABLE `order_items_tbl` (
  `item_ID` int(4) NOT NULL,
  `order_ID` int(4) NOT NULL,
  `prod_ID` int(4) NOT NULL,
  `prod_size` varchar(5) NOT NULL,
  `item_price` double(10,2) NOT NULL,
  `item_quantity` int(5) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `order_items_tbl`
--

INSERT INTO `order_items_tbl` (`item_ID`, `order_ID`, `prod_ID`, `prod_size`, `item_price`, `item_quantity`) VALUES
(25, 16, 30, 'M', 650.00, 1),
(26, 16, 29, 'L', 600.00, 1),
(33, 20, 29, 'XL', 600.00, 1),
(34, 21, 30, 'XL', 1300.00, 2),
(35, 22, 28, 'L', 650.00, 1),
(36, 23, 29, 'M', 600.00, 1);

-- --------------------------------------------------------

--
-- Table structure for table `order_tbl`
--

CREATE TABLE `order_tbl` (
  `order_ID` int(4) NOT NULL,
  `customer_ID` int(4) NOT NULL,
  `order_date` date NOT NULL,
  `order_status` varchar(100) NOT NULL,
  `total_price` double(10,2) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `order_tbl`
--

INSERT INTO `order_tbl` (`order_ID`, `customer_ID`, `order_date`, `order_status`, `total_price`) VALUES
(16, 3, '2023-12-12', 'Confirmed', 1250.00),
(20, 3, '2023-12-15', 'Confirmed', 600.00),
(21, 3, '2023-12-15', 'Confirmed', 1300.00),
(22, 3, '2023-12-16', 'Confirmed', 650.00),
(23, 3, '2023-12-16', 'Confirmed', 600.00);

-- --------------------------------------------------------

--
-- Table structure for table `product_tbl`
--

CREATE TABLE `product_tbl` (
  `prod_ID` int(4) NOT NULL,
  `shirt_name` varchar(50) NOT NULL,
  `prod_price` double(10,2) NOT NULL,
  `prod_quantity` int(5) NOT NULL,
  `prod_image` varchar(250) NOT NULL,
  `prod_status` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `product_tbl`
--

INSERT INTO `product_tbl` (`prod_ID`, `shirt_name`, `prod_price`, `prod_quantity`, `prod_image`, `prod_status`) VALUES
(28, 'GRENADE BUDS', 650.00, 20, 'grenade.jpg', 'In Stock'),
(29, 'JOINT ISLAND', 600.00, 20, 'island-black.jpg', 'In Stock'),
(30, 'FORBIDDEN HONEY', 650.00, 20, 'honey.jpg', 'In Stock'),
(31, 'BONG ISLAND', 600.00, 20, 'island-white.jpg', 'In Stock');

-- --------------------------------------------------------

--
-- Table structure for table `size_tbl`
--

CREATE TABLE `size_tbl` (
  `size_ID` int(4) NOT NULL,
  `size_name` varchar(15) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `size_tbl`
--

INSERT INTO `size_tbl` (`size_ID`, `size_name`) VALUES
(1, 'M'),
(2, 'L'),
(3, 'XL');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admin_tbl`
--
ALTER TABLE `admin_tbl`
  ADD PRIMARY KEY (`admin_ID`);

--
-- Indexes for table `cart_tbl`
--
ALTER TABLE `cart_tbl`
  ADD PRIMARY KEY (`cart_ID`),
  ADD KEY `customer_ID` (`customer_ID`),
  ADD KEY `prod_ID` (`prod_ID`),
  ADD KEY `size_ID` (`size_ID`);

--
-- Indexes for table `customer_tbl`
--
ALTER TABLE `customer_tbl`
  ADD PRIMARY KEY (`customer_ID`),
  ADD UNIQUE KEY `customer_username` (`customer_username`);

--
-- Indexes for table `order_items_tbl`
--
ALTER TABLE `order_items_tbl`
  ADD PRIMARY KEY (`item_ID`),
  ADD KEY `order_ID` (`order_ID`),
  ADD KEY `prod_ID` (`prod_ID`);

--
-- Indexes for table `order_tbl`
--
ALTER TABLE `order_tbl`
  ADD PRIMARY KEY (`order_ID`),
  ADD KEY `customer_ID` (`customer_ID`);

--
-- Indexes for table `product_tbl`
--
ALTER TABLE `product_tbl`
  ADD PRIMARY KEY (`prod_ID`);

--
-- Indexes for table `size_tbl`
--
ALTER TABLE `size_tbl`
  ADD PRIMARY KEY (`size_ID`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `admin_tbl`
--
ALTER TABLE `admin_tbl`
  MODIFY `admin_ID` int(4) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `cart_tbl`
--
ALTER TABLE `cart_tbl`
  MODIFY `cart_ID` int(4) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=81;

--
-- AUTO_INCREMENT for table `customer_tbl`
--
ALTER TABLE `customer_tbl`
  MODIFY `customer_ID` int(4) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=24;

--
-- AUTO_INCREMENT for table `order_items_tbl`
--
ALTER TABLE `order_items_tbl`
  MODIFY `item_ID` int(4) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=37;

--
-- AUTO_INCREMENT for table `order_tbl`
--
ALTER TABLE `order_tbl`
  MODIFY `order_ID` int(4) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=24;

--
-- AUTO_INCREMENT for table `product_tbl`
--
ALTER TABLE `product_tbl`
  MODIFY `prod_ID` int(4) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=33;

--
-- AUTO_INCREMENT for table `size_tbl`
--
ALTER TABLE `size_tbl`
  MODIFY `size_ID` int(4) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `cart_tbl`
--
ALTER TABLE `cart_tbl`
  ADD CONSTRAINT `cart_tbl_ibfk_1` FOREIGN KEY (`customer_ID`) REFERENCES `customer_tbl` (`customer_ID`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `cart_tbl_ibfk_2` FOREIGN KEY (`prod_ID`) REFERENCES `product_tbl` (`prod_ID`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `cart_tbl_ibfk_3` FOREIGN KEY (`size_ID`) REFERENCES `size_tbl` (`size_ID`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `order_items_tbl`
--
ALTER TABLE `order_items_tbl`
  ADD CONSTRAINT `order_items_tbl_ibfk_1` FOREIGN KEY (`order_ID`) REFERENCES `order_tbl` (`order_ID`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `order_items_tbl_ibfk_2` FOREIGN KEY (`prod_ID`) REFERENCES `product_tbl` (`prod_ID`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `order_tbl`
--
ALTER TABLE `order_tbl`
  ADD CONSTRAINT `order_tbl_ibfk_1` FOREIGN KEY (`customer_ID`) REFERENCES `customer_tbl` (`customer_ID`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
