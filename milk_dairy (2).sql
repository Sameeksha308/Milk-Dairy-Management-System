-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Mar 24, 2024 at 02:27 PM
-- Server version: 10.4.32-MariaDB
-- PHP Version: 8.2.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `milk_dairy`
--

-- --------------------------------------------------------

--
-- Table structure for table `admin`
--

CREATE TABLE `admin` (
  `username` varchar(50) NOT NULL,
  `f_name` varchar(50) NOT NULL,
  `l_name` varchar(50) NOT NULL,
  `phone` varchar(50) NOT NULL,
  `password` varchar(50) NOT NULL,
  `email` varchar(50) NOT NULL,
  `reg_date` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `admin`
--

INSERT INTO `admin` (`username`, `f_name`, `l_name`, `phone`, `password`, `email`, `reg_date`) VALUES
('A001', 'Sameeksha', 'Rai', '8197983993', 'sameeksha@123', 'sameeksha@gmail.com', '2014-03-01');

-- --------------------------------------------------------

--
-- Table structure for table `customer`
--

CREATE TABLE `customer` (
  `username` varchar(50) NOT NULL,
  `password` varchar(50) NOT NULL,
  `f_name` varchar(50) NOT NULL,
  `l_name` varchar(50) NOT NULL,
  `phone` varchar(50) NOT NULL,
  `email` varchar(50) NOT NULL,
  `address` varchar(50) NOT NULL,
  `milk_rating` varchar(50) NOT NULL,
  `milk_price` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `customer`
--

INSERT INTO `customer` (`username`, `password`, `f_name`, `l_name`, `phone`, `email`, `address`, `milk_rating`, `milk_price`) VALUES
('C001', 'nithesh@20', 'Nithesh', 'Shetty', '8197982993', 'nithesh20@gmail.com', 'Shanthi Nagar', '4.5', '50/L'),
('C002', 'harshith@123', 'Harshith', 'Rai', '7090078128', 'harshith@gmail.com', 'Puttur', '4.6', '20/lit'),
('C003', 'suma2', 'Suma', 'S', '6789546787', 'suma2@gmail.com', 'Sullya', '4.5', '50/L'),
('C004', 'madhu2', 'Madhu', 'M', '9889578765', 'madhu2@gmail.com', 'Puttur', '4.6', '50/L'),
('C005', 'nehapoojary17', 'Neha', 'Poojary', '9907654325', 'nehapoojary17@gmail.com', 'Kemmai', '4.6', '50/L'),
('C006', 'ram12', 'Ram', 'R', '9678976547', 'ram12@gmail.com', 'Mangalore', '4.9', '50/L'),
('C007', 'arpan23', 'Arpan', 'B', '9678976578', 'arpan23@gmail.com', 'Puttur', '4.6', '50/L'),
('C008', 'leela66', 'Leela', 'M', '7978987654', 'leela66@gmail.com', 'BC road', '4.3', '50/L'),
('C009', 'nagesh30', 'Nagesh', 'Rai', '9663661948', 'nagesh30@gmail.com', 'Panja', '4.6', '50/L'),
('C010', 'visha30', 'Vishalakshi', 'Shetty', '9799078659', 'vishala30@yahoo.com', 'Panja', '4.5', '50/L');

-- --------------------------------------------------------

--
-- Table structure for table `farmer`
--

CREATE TABLE `farmer` (
  `username` varchar(50) NOT NULL,
  `password` varchar(50) NOT NULL,
  `f_name` varchar(50) NOT NULL,
  `l_name` varchar(50) NOT NULL,
  `phone` varchar(50) NOT NULL,
  `email` varchar(50) NOT NULL,
  `milk_produced` varchar(50) NOT NULL,
  `membership_date` date NOT NULL,
  `address` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `farmer`
--

INSERT INTO `farmer` (`username`, `password`, `f_name`, `l_name`, `phone`, `email`, `milk_produced`, `membership_date`, `address`) VALUES
('F001', 'niree09', 'Nireeksha', 'Shetty', '8907654328', 'nireeksha@gmail.com', '5 L', '2024-03-01', 'Mangalore'),
('F002', 'yashodha@123', 'Yashodha', 'Rai', '8197102993', 'yashodha@gmail.com', '3.9', '2024-03-13', 'Panja'),
('F003', 'shramik@123', 'Shramik', 'Rai', '8105859713', 'shramik123@gmail.com', '4.8 L', '2024-03-14', 'Puttur'),
('F004', 'ramesh@123', 'Ramesh', 'Rai', '9980545628', 'ramesh123@gmail.com', '4 L', '2023-10-17', 'Mangalore'),
('F005', 'john34', 'John', 'Smith', '6789015678', 'john34@gmail.com', '4.8 L', '2023-09-17', 'Puttur'),
('F006', 'bhavi24', 'Bhavish', 'Rai', '7989075475', 'bhavi24@gmail.com', '4.5 L', '2023-11-10', 'Nagara'),
('F007', 'chaithra26', 'Chaithra', 'M K', '79890754763', 'chaithra26@gmail.com', '4.5 L', '2023-11-11', 'Padil'),
('F008', 'jas67', 'Jasmine', 'K', '79890754764', 'jas67@yahoo.com', '3.9 L', '2023-08-16', 'BC road'),
('F009', 'dhanu23', 'Dhanushree', 'Rai', '7989075470', 'dhan23@gmail.com', '5 L', '2023-06-30', 'Sampya'),
('F010', 'amitha12', 'Amitha', 'Rai', '9785678458', 'amitha12@gmail.com', '5 L', '2023-10-06', 'Panaje');

-- --------------------------------------------------------

--
-- Table structure for table `feedback`
--

CREATE TABLE `feedback` (
  `name` varchar(100) NOT NULL,
  `date` date NOT NULL,
  `feedback` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `feedback`
--

INSERT INTO `feedback` (`name`, `date`, `feedback`) VALUES
('Shramik rai', '2003-05-20', 'Very nice dairy'),
('Ramesh', '2024-03-13', 'I will give less milk this  week'),
('Ramesh', '2024-03-14', 'Nice'),
('Yashodha', '2024-03-06', 'It was good'),
('Harshith Rai', '2024-02-09', 'Good Dairy, I\'ll be glad to visit again.');

-- --------------------------------------------------------

--
-- Table structure for table `payment`
--

CREATE TABLE `payment` (
  `payment_id` varchar(50) NOT NULL,
  `username` varchar(50) NOT NULL,
  `date` date NOT NULL,
  `amount` varchar(50) NOT NULL,
  `payment_method` varchar(50) NOT NULL,
  `name` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `payment`
--

INSERT INTO `payment` (`payment_id`, `username`, `date`, `amount`, `payment_method`, `name`) VALUES
('6600269ecc496', 'C001', '2024-02-24', '500 /-', 'Cash', 'Nithesh Shetty'),
('660026e594cea', 'C001', '2024-02-10', '300/-', 'Cash', 'Nithesh Shetty'),
('66002736439a3', 'C001', '2024-03-09', '400/-', 'Card', 'Nithesh Shetty'),
('66002761b4756', 'C003', '2023-12-24', '200/-', 'UPI', 'Suma S'),
('6600277739ba7', 'C003', '2024-03-09', '100/-', 'UPI', 'Suma S'),
('660027a633dc6', 'F003', '2023-12-24', '500/-', 'Cash', 'Shramik Rai'),
('660027ca0f057', 'F004', '2023-11-24', '500/-', 'Card', 'Ramesh Rai'),
('660027ed79785', 'F004', '2024-01-01', '300/-', 'Cash', 'Ramesh Rai'),
('660028194123e', 'C005', '2024-03-01', '500/-', 'UPI', 'Neha Poojary'),
('66002834769b4', 'C005', '2023-11-02', '300/-', 'Card', 'Neha Poojary'),
('6600285f3a1ba', 'F009', '2024-01-24', '400/-', 'Cash', 'Dhanushree Rai'),
('6600286ed69c4', 'F009', '2024-04-06', '300/-', 'Card', 'Dhanushree Rai');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admin`
--
ALTER TABLE `admin`
  ADD PRIMARY KEY (`username`);

--
-- Indexes for table `customer`
--
ALTER TABLE `customer`
  ADD PRIMARY KEY (`username`);

--
-- Indexes for table `farmer`
--
ALTER TABLE `farmer`
  ADD PRIMARY KEY (`username`);

--
-- Indexes for table `payment`
--
ALTER TABLE `payment`
  ADD PRIMARY KEY (`payment_id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
