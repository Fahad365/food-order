-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Sep 11, 2022 at 03:51 AM
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
(48, 'admin', 'admin', '21232f297a57a5a743894a0e4a801fc3'),
(55, 'Fahad Hossain', 'Roman', 'dcddb75469b4b4875094e14561e573d8');

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
(27, 'Pizza', 'Food_Category_57.jpg', 'yes', 'yes');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_contact`
--

CREATE TABLE `tbl_contact` (
  `Id` int(11) UNSIGNED NOT NULL,
  `customer_name` varchar(150) NOT NULL,
  `email` varchar(100) NOT NULL,
  `message` varchar(255) NOT NULL,
  `rating` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tbl_contact`
--

INSERT INTO `tbl_contact` (`Id`, `customer_name`, `email`, `message`, `rating`) VALUES
(7, 'Jamil', 'mr@gmail.com', 'hello', 3),
(8, 'Fahad Hossain', 'fahad@gmail.com', 'Helllo', 4),
(9, 'Rahat Hossain Rafi', 'rahat@gmail.com', 'Nice Service', 5);

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
(41, 'B3', 'B3', '350.00', 'Food_Category_56.jpg', 23, 'yes', 'yes');

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
(14, 'p1', 'Food_Category_8.jpg', '250.00', 3, '750.00', '2022-08-25 10:46:09', 'Delivered', 'x', '01622921671', 'x@gmail.com', 'nodda'),
(17, 'B2', 'Food_Category_27.jpg', '350.00', 1, '350.00', '2022-09-01 09:57:33', 'Ordered', 'Zahid Hasan Shuvo', '01622921671', 'zahid@gmail.com', 'newmarket'),
(18, 'pi2', 'Food_Category_50.jpg', '450.00', 2, '900.00', '2022-09-03 11:44:00', 'Delivered', 'Alamin', '01622921671', 'dummy@gmail.com', 'Basundhara C'),
(19, 'p1', 'Food_Category_8.jpg', '250.00', 2, '500.00', '2022-09-05 11:05:21', 'Ordered', 'Limon', '01719876345', 'limon@gmail.com', 'Nikunja_2'),
(28, 'B2', 'Food_Category_27.jpg', '350.00', 1, '350.00', '2022-09-07 07:24:07', 'Ordered', 'Limon', '01719876345', 'limon@gmail.com', 'uttara'),
(29, 'pi2', 'Food_Category_50.jpg', '450.00', 1, '450.00', '2022-09-07 07:25:09', 'Delivered', 'Takib', '01719876345', 'takib@gmail.com', 'Basundhara');

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
-- Indexes for table `tbl_contact`
--
ALTER TABLE `tbl_contact`
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
  MODIFY `Id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=58;

--
-- AUTO_INCREMENT for table `tbl_category`
--
ALTER TABLE `tbl_category`
  MODIFY `Id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=32;

--
-- AUTO_INCREMENT for table `tbl_contact`
--
ALTER TABLE `tbl_contact`
  MODIFY `Id` int(11) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `tbl_food`
--
ALTER TABLE `tbl_food`
  MODIFY `Id` int(11) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=44;

--
-- AUTO_INCREMENT for table `tbl_order`
--
ALTER TABLE `tbl_order`
  MODIFY `Id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=30;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
