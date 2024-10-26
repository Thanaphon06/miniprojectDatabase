-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Oct 26, 2024 at 11:54 AM
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
-- Database: `miniproject`
--

-- --------------------------------------------------------

--
-- Table structure for table `customer`
--

CREATE TABLE `customer` (
  `c_id` int(10) NOT NULL,
  `c_name` varchar(25) NOT NULL,
  `c_sex` varchar(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `customer`
--

INSERT INTO `customer` (`c_id`, `c_name`, `c_sex`) VALUES
(1, 'Anan Chaiyawan', 'Male'),
(2, 'Sumalee Yodrak', 'Female'),
(3, 'Prasert Thongdee', 'Male'),
(4, 'Suchada Kongsri', 'Female'),
(5, 'Kittipong Supakit', 'Male'),
(6, 'Waraporn Kaewmee', 'Female'),
(7, 'Nopparat Inthira', 'Male'),
(8, 'Kanokwan Saithong', 'Female'),
(9, 'Somchai Namsai', 'Male'),
(10, 'Suwannee Prakob', 'Female');

-- --------------------------------------------------------

--
-- Table structure for table `employee`
--

CREATE TABLE `employee` (
  `e_id` int(5) NOT NULL,
  `e_name` varchar(25) NOT NULL,
  `e_sirname` varchar(25) NOT NULL,
  `e_sex` varchar(10) NOT NULL,
  `e_position` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `employee`
--

INSERT INTO `employee` (`e_id`, `e_name`, `e_sirname`, `e_sex`, `e_position`) VALUES
(1, 'Somchai', 'Sukjai', 'Male', 'Manager'),
(2, 'Somsri', 'Kamsuk', 'Female', 'Assistant Manager'),
(3, 'Kritsada', 'Thongchai', 'Male', 'HR Officer'),
(4, 'Chatchai', 'Saengdao', 'Male', 'IT Specialist'),
(5, 'Araya', 'Boonmee', 'Female', 'Accountant'),
(6, 'Jirawan', 'Kanchai', 'Female', 'Sales Representative'),
(7, 'Nattapong', 'Inthachai', 'Male', 'Marketing Coordinato'),
(8, 'Sirinapa', 'Saengchai', 'Female', 'HR Assistant'),
(9, 'Preecha', 'Saelim', 'Male', 'Customer Service'),
(10, 'Rungtiwa', 'Pholdee', 'Female', 'Administrative Offic');

-- --------------------------------------------------------

--
-- Table structure for table `item`
--

CREATE TABLE `item` (
  `i_id` int(6) NOT NULL,
  `i_name` varchar(20) NOT NULL,
  `i_price` int(6) NOT NULL,
  `t_id` int(5) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `item`
--

INSERT INTO `item` (`i_id`, `i_name`, `i_price`, `t_id`) VALUES
(21, 'Laptop', 25000, 1),
(22, 'Smartphone', 15000, 2),
(23, 'Tablet', 12000, 3),
(24, 'Headphones', 2000, 4),
(25, 'Smartwatch', 5000, 5),
(26, 'Camera', 18000, 1),
(27, 'Printer', 6000, 4),
(28, 'Monitor', 8000, 3),
(29, 'Keyboard', 1500, 1),
(30, 'Mouse', 800, 2);

-- --------------------------------------------------------

--
-- Table structure for table `member`
--

CREATE TABLE `member` (
  `m_id` int(10) NOT NULL,
  `m_phone` varchar(11) NOT NULL,
  `m_email` varchar(30) NOT NULL,
  `m_address` varchar(100) NOT NULL,
  `c_id` int(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `member`
--

INSERT INTO `member` (`m_id`, `m_phone`, `m_email`, `m_address`, `c_id`) VALUES
(1, '0812345678', 'john@example.com', '123 Main St, Bangkok', 1),
(2, '0834567890', 'bob@example.com', '789 Oak St, Phuket', 3),
(3, '0845678901', 'sara@example.com', '101 Pine St, Pattaya', 4),
(4, '0878901234', 'dave@example.com', '404 Birch St, Udon Thani', 7),
(5, '0890123456', 'mike@example.com', '606 Willow St, Nakhon Ratchasima', 9),
(6, '0801234567', 'jane@example.com', '707 Cherry St, Rayong', 10);

-- --------------------------------------------------------

--
-- Table structure for table `type_item`
--

CREATE TABLE `type_item` (
  `t_id` int(3) NOT NULL,
  `t_name` varchar(20) NOT NULL,
  `t_detail` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `type_item`
--

INSERT INTO `type_item` (`t_id`, `t_name`, `t_detail`) VALUES
(1, 'Electronics', 'Devices such as phones, laptops, and tablets'),
(2, 'Furniture', 'Items such as chairs, tables, and desks'),
(3, 'Clothing', 'Apparel including shirts, pants, and jackets'),
(4, 'Books', 'Printed materials including novels, textbooks, and magazines'),
(5, 'Stationery', 'Office supplies like pens, paper, and envelopes');

-- --------------------------------------------------------

--
-- Table structure for table `ulogin`
--

CREATE TABLE `ulogin` (
  `logid` int(10) NOT NULL,
  `logusername` varchar(25) NOT NULL,
  `logpassword` varchar(25) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `ulogin`
--

INSERT INTO `ulogin` (`logid`, `logusername`, `logpassword`) VALUES
(1, 'admin', 'admin');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `customer`
--
ALTER TABLE `customer`
  ADD PRIMARY KEY (`c_id`);

--
-- Indexes for table `employee`
--
ALTER TABLE `employee`
  ADD PRIMARY KEY (`e_id`);

--
-- Indexes for table `item`
--
ALTER TABLE `item`
  ADD PRIMARY KEY (`i_id`),
  ADD KEY `t_id` (`t_id`);

--
-- Indexes for table `member`
--
ALTER TABLE `member`
  ADD PRIMARY KEY (`m_id`),
  ADD UNIQUE KEY `c_id` (`c_id`);

--
-- Indexes for table `type_item`
--
ALTER TABLE `type_item`
  ADD PRIMARY KEY (`t_id`);

--
-- Indexes for table `ulogin`
--
ALTER TABLE `ulogin`
  ADD PRIMARY KEY (`logid`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `customer`
--
ALTER TABLE `customer`
  MODIFY `c_id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `employee`
--
ALTER TABLE `employee`
  MODIFY `e_id` int(5) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `item`
--
ALTER TABLE `item`
  MODIFY `i_id` int(6) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=31;

--
-- AUTO_INCREMENT for table `member`
--
ALTER TABLE `member`
  MODIFY `m_id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `type_item`
--
ALTER TABLE `type_item`
  MODIFY `t_id` int(3) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `ulogin`
--
ALTER TABLE `ulogin`
  MODIFY `logid` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `item`
--
ALTER TABLE `item`
  ADD CONSTRAINT `item_ibfk_1` FOREIGN KEY (`t_id`) REFERENCES `type_item` (`t_id`);

--
-- Constraints for table `member`
--
ALTER TABLE `member`
  ADD CONSTRAINT `member_ibfk_1` FOREIGN KEY (`c_id`) REFERENCES `customer` (`c_id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
