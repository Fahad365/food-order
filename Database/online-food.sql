-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Aug 28, 2022 at 08:03 PM
-- Server version: 10.4.24-MariaDB
-- PHP Version: 7.4.29

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `online-food`
--

-- --------------------------------------------------------

--
-- Table structure for table `tbl_admin`
--

CREATE TABLE `tbl_admin` (
  `Id` int(10) UNSIGNED NOT NULL,
  `full_name` varchar(100) NOT NULL,
  `username` varchar(100) NOT NULL,
  `password` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tbl_admin`
--

INSERT INTO `tbl_admin` (`Id`, `full_name`, `username`, `password`) VALUES
(1, 'Fahad Hossain', 'Fahad', '827ccb0eea8a706c4c34a16891f84e7b'),
(29, 'Roman', 'roman', 'b0baee9d279d34fa1dfd71aadb908c3f'),
(48, 'admin', 'admin', '21232f297a57a5a743894a0e4a801fc3');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_category`
--

CREATE TABLE `tbl_category` (
  `Id` int(10) UNSIGNED NOT NULL,
  `title` varchar(100) NOT NULL,
  `image_name` varchar(255) NOT NULL,
  `featured` varchar(10) NOT NULL,
  `active` varchar(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tbl_category`
--

INSERT INTO `tbl_category` (`Id`, `title`, `image_name`, `featured`, `active`) VALUES
(23, 'Burger', 'Food_Category_68.jpg', 'yes', 'yes'),
(26, 'Pastaaa', 'Food_Category_45.jpg', 'yes', 'yes'),
(27, 'Pizza', 'Food_Category_57.jpg', 'yes', 'yes'),
(28, 'Club Sandwich', 'Food_Category_69.jpg', 'yes', 'yes'),
(29, 'Chicken Fry', 'Food_Category_1.jpg', 'yes', 'yes'),
(30, 'Cold Coffee', 'Food_Category_19.jpg', 'yes', 'yes');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_food`
--

CREATE TABLE `tbl_food` (
  `Id` int(11) UNSIGNED NOT NULL,
  `title` varchar(150) NOT NULL,
  `description` varchar(255) NOT NULL,
  `price` decimal(10,2) NOT NULL,
  `image_name` varchar(155) NOT NULL,
  `category_id` int(11) UNSIGNED NOT NULL,
  `featured` varchar(10) NOT NULL,
  `active` varchar(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tbl_food`
--

INSERT INTO `tbl_food` (`Id`, `title`, `description`, `price`, `image_name`, `category_id`, `featured`, `active`) VALUES
(34, 'B1', 'B1', '400.00', 'Food_Category_94.jpg', 23, 'yes', 'yes'),
(35, 'p1', 'p1', '250.00', 'Food_Category_8.jpg', 26, 'yes', 'yes'),
(36, 'p2', 'p2', '200.00', 'Food_Category_78.jpg', 26, 'yes', 'yes'),
(37, 'pi1', 'pi1', '400.00', 'Food_Category_48.jpg', 27, 'yes', 'yes'),
(38, 'B2', 'B2', '350.00', 'Food_Category_27.jpg', 23, 'yes', 'yes'),
(39, 'pi2', 'pi2', '450.00', 'Food_Category_50.jpg', 27, 'yes', 'yes'),
(41, 'B3', 'B3', '350.00', 'Food_Category_56.jpg', 23, 'yes', 'yes'),
(42, 'cf1', 'cf1', '90.00', 'Food_Category_38.jpg', 29, 'yes', 'yes');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_order`
--

CREATE TABLE `tbl_order` (
  `Id` int(10) UNSIGNED NOT NULL,
  `food` varchar(150) NOT NULL,
  `image_name` varchar(155) NOT NULL,
  `price` decimal(10,2) NOT NULL,
  `qty` int(11) NOT NULL,
  `total` decimal(10,2) NOT NULL,
  `order_date` datetime NOT NULL,
  `status` varchar(30) NOT NULL,
  `customer_name` varchar(150) NOT NULL,
  `customer_contact` varchar(20) NOT NULL,
  `customer_email` varchar(150) NOT NULL,
  `customer_address` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tbl_order`
--

INSERT INTO `tbl_order` (`Id`, `food`, `image_name`, `price`, `qty`, `total`, `order_date`, `status`, `customer_name`, `customer_contact`, `customer_email`, `customer_address`) VALUES
(11, 'p2', 'Food_Category_78.jpg', '200.00', 1, '200.00', '2022-08-24 08:14:39', 'ordered', 'Fahad', '01622921671', 'fahad@gmail.com', 'bcnvbmv'),
(12, 'pi1', 'Food_Category_48.jpg', '400.00', 1, '400.00', '2022-08-24 08:16:06', 'ordered', 'Fahad Hossain', '01622921671', 'mr@gmail.com', 'bxcbv'),
(13, 'pi2', 'Food_Category_50.jpg', '450.00', 1, '450.00', '0122-08-25 12:30:05', 'ordered', 'Fahad Hossain', '01622921671', 'fahad@gmail.com', 'kalachadpur'),
(14, 'p1', 'Food_Category_8.jpg', '250.00', 3, '750.00', '2022-08-25 10:46:09', 'ordered', 'x', '01622921671', 'x@gmail.com', 'nodda');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `tbl_admin`
--
ALTER TABLE `tbl_admin`
  ADD PRIMARY KEY (`Id`);

--
-- Indexes for table `tbl_category`
--
ALTER TABLE `tbl_category`
  ADD PRIMARY KEY (`Id`);

--
-- Indexes for table `tbl_food`
--
ALTER TABLE `tbl_food`
  ADD PRIMARY KEY (`Id`);

--
-- Indexes for table `tbl_order`
--
ALTER TABLE `tbl_order`
  ADD PRIMARY KEY (`Id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `tbl_admin`
--
ALTER TABLE `tbl_admin`
  MODIFY `Id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=54;

--
-- AUTO_INCREMENT for table `tbl_category`
--
ALTER TABLE `tbl_category`
  MODIFY `Id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=31;

--
-- AUTO_INCREMENT for table `tbl_food`
--
ALTER TABLE `tbl_food`
  MODIFY `Id` int(11) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=43;

--
-- AUTO_INCREMENT for table `tbl_order`
--
ALTER TABLE `tbl_order`
  MODIFY `Id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
