-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Dec 04, 2023 at 09:34 AM
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
(3, 'Al Drazen Sagarino', 'drazen17', '2147483647', 'block 5 lot 13 phase 3 NHA Bangkal Davao City', 'password'),
(15, 'Ryann Jay Gudito', 'ryann123', '09091013645', 'block 5 lot 13 phase 3 NHA Bangkal Davao City', '$2y$10$zHsma/SYKZBVIjEkyv4we.uTajGyaJ4eTUO94hyte2N'),
(17, 'liz sagarino', 'liz123', '09303214237', 'block 5 lot 13 phase 3 NHA Bangkal Davao City', 'liz123'),
(18, 'calum scott', 'calum123', '09091013645', 'block 5 lot 13 phase 3 NHA Bangkal Davao City', 'password123');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `customer_tbl`
--
ALTER TABLE `customer_tbl`
  ADD PRIMARY KEY (`customer_ID`),
  ADD UNIQUE KEY `customer_username` (`customer_username`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `customer_tbl`
--
ALTER TABLE `customer_tbl`
  MODIFY `customer_ID` int(4) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=19;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
