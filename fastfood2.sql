-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1:3306
-- Generation Time: Nov 30, 2023 at 04:04 AM
-- Server version: 10.4.28-MariaDB
-- PHP Version: 8.2.4

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `fastfood`
--

-- --------------------------------------------------------

--
-- Table structure for table `admin`
--

CREATE TABLE `admin` (
  `id` int(10) UNSIGNED NOT NULL,
  `full_name` varchar(100) NOT NULL,
  `username` varchar(100) NOT NULL,
  `password` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `admin`
--

INSERT INTO `admin` (`id`, `full_name`, `username`, `password`) VALUES
(2, 'NVSon', 'Sonssssss', 'e314b72ecaa14263359fa8166d20b903'),
(8, 'NHThai', 'Thai', 'e314b72ecaa14263359fa8166d20b903'),
(10, 'Quàng Thế Anh', 'test', 'ae2b1fca515949e5d54fb22b8ed95575'),
(15, 'The Anh', 'ggggggg', 'ae2b1fca515949e5d54fb22b8ed95575'),
(16, 'admin', 'cool', '21232f297a57a5a743894a0e4a801fc3'),
(17, 'admin', 'admin', '098f6bcd4621d373cade4e832627b4f6'),
(19, 'The Anh', 'login', 'd56b699830e77ba53855679cb1d252da'),
(20, 'test', 'login2', '21232f297a57a5a743894a0e4a801fc3');

-- --------------------------------------------------------

--
-- Table structure for table `categories`
--

CREATE TABLE `categories` (
  `CategoryID` int(10) UNSIGNED NOT NULL,
  `Name` varchar(100) NOT NULL,
  `Featured` varchar(10) NOT NULL,
  `active` varchar(10) NOT NULL,
  `image_name` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `categories`
--

INSERT INTO `categories` (`CategoryID`, `Name`, `Featured`, `active`, `image_name`) VALUES
(33, 'Món gà', 'Yes', 'Yes', 'Food_Category_790.jpg'),
(34, 'Món cơm', 'Yes', 'Yes', 'Food_Category_443.jpg'),
(35, 'Ăn vặt', 'Yes', 'Yes', 'Food_Category_538.jpg'),
(36, 'Đồ uống', 'Yes', 'Yes', 'Food_Category_854.jpg');

-- --------------------------------------------------------

--
-- Table structure for table `customers`
--

CREATE TABLE `customers` (
  `CustomerID` int(10) UNSIGNED NOT NULL,
  `Name` varchar(255) NOT NULL,
  `Email` varchar(255) NOT NULL,
  `Address` text DEFAULT NULL,
  `Contact` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `customers`
--

INSERT INTO `customers` (`CustomerID`, `Name`, `Email`, `Address`, `Contact`) VALUES
(3, 'brub bruh', 'test4@gmail.com', 'Hà Nội', '999888777'),
(15, 'The Anh', 'testemail@gmail.com', 'Hà Nội', '0928733712');

-- --------------------------------------------------------

--
-- Table structure for table `menudetail`
--

CREATE TABLE `menudetail` (
  `FoodID` int(10) UNSIGNED NOT NULL,
  `Name` varchar(255) NOT NULL,
  `Description` text DEFAULT NULL,
  `Price` decimal(10,2) NOT NULL,
  `CategoryID` int(10) UNSIGNED DEFAULT NULL,
  `image_name` varchar(255) DEFAULT NULL,
  `Featured` varchar(10) NOT NULL,
  `active` varchar(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `menudetail`
--

INSERT INTO `menudetail` (`FoodID`, `Name`, `Description`, `Price`, `CategoryID`, `image_name`, `Featured`, `active`) VALUES
(29, 'Gà nướng', 'Gà được nướng qua lửa rất ngon', 11000.00, 33, 'Food-Name-1739.jpg', 'Yes', 'Yes'),
(30, 'Gà lắc bột', 'Gà được tẩm bột và chiên xù, sau đó được lắc phô mai', 70000.00, 33, 'Food-Name-8123.jpeg', 'Yes', 'Yes'),
(31, 'Cơm nắm rong biển', 'Cơm nếp được cuốn trong lớp rong biển đa sắc', 25000.00, 34, 'Food-Name9516.jpeg', 'Yes', 'Yes'),
(32, 'Kim Bắp', 'Cơm quấn trong rong biển nhân đỗ, cà rốt, trứng, thịt.', 5000.00, 34, 'Food-Name-6966.png', 'Yes', 'Yes'),
(33, 'Set xiên que', 'Set xiên gồm đủ các loại xiên và mỗi loại có 3 que', 120000.00, 35, 'Food-Name-4583.jpg', 'Yes', 'Yes'),
(34, 'Chanh tuyết', 'Thức uống mát lạnh được làm từ đá bào, chanh, và sữa chua', 10000.00, 36, 'Food-Name-5939.jpg', 'Yes', 'Yes');

-- --------------------------------------------------------

--
-- Table structure for table `orders`
--

CREATE TABLE `orders` (
  `OrderID` int(10) UNSIGNED NOT NULL,
  `CustomerID` int(10) UNSIGNED DEFAULT NULL,
  `FoodID` int(11) UNSIGNED NOT NULL,
  `OrderDate` timestamp NOT NULL DEFAULT current_timestamp(),
  `quantity` int(11) NOT NULL,
  `status` varchar(10) NOT NULL,
  `total` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `orders`
--

INSERT INTO `orders` (`OrderID`, `CustomerID`, `FoodID`, `OrderDate`, `quantity`, `status`, `total`) VALUES
(8, 3, 31, '2023-11-30 05:01:15', 3, 'Ordered', 75000),
(19, 15, 29, '2023-11-29 21:02:10', 6, 'Ordered', 66000);

-- --------------------------------------------------------

--
-- Table structure for table `payments`
--

CREATE TABLE `payments` (
  `PaymentNumber` int(10) UNSIGNED NOT NULL,
  `CustomerID` int(10) UNSIGNED DEFAULT NULL,
  `PaymentDate` timestamp NOT NULL DEFAULT current_timestamp(),
  `PaymentMethod` varchar(50) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admin`
--
ALTER TABLE `admin`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `categories`
--
ALTER TABLE `categories`
  ADD PRIMARY KEY (`CategoryID`);

--
-- Indexes for table `customers`
--
ALTER TABLE `customers`
  ADD PRIMARY KEY (`CustomerID`),
  ADD UNIQUE KEY `Email` (`Email`);

--
-- Indexes for table `menudetail`
--
ALTER TABLE `menudetail`
  ADD PRIMARY KEY (`FoodID`),
  ADD KEY `CategoryID` (`CategoryID`);

--
-- Indexes for table `orders`
--
ALTER TABLE `orders`
  ADD PRIMARY KEY (`OrderID`),
  ADD KEY `CustomerID` (`CustomerID`),
  ADD KEY `FoodID` (`FoodID`);

--
-- Indexes for table `payments`
--
ALTER TABLE `payments`
  ADD PRIMARY KEY (`PaymentNumber`),
  ADD KEY `CustomerID` (`CustomerID`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `admin`
--
ALTER TABLE `admin`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=21;

--
-- AUTO_INCREMENT for table `categories`
--
ALTER TABLE `categories`
  MODIFY `CategoryID` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=37;

--
-- AUTO_INCREMENT for table `customers`
--
ALTER TABLE `customers`
  MODIFY `CustomerID` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

--
-- AUTO_INCREMENT for table `menudetail`
--
ALTER TABLE `menudetail`
  MODIFY `FoodID` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=35;

--
-- AUTO_INCREMENT for table `orders`
--
ALTER TABLE `orders`
  MODIFY `OrderID` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=20;

--
-- AUTO_INCREMENT for table `payments`
--
ALTER TABLE `payments`
  MODIFY `PaymentNumber` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `menudetail`
--
ALTER TABLE `menudetail`
  ADD CONSTRAINT `menudetail_ibfk_1` FOREIGN KEY (`CategoryID`) REFERENCES `categories` (`CategoryID`);

--
-- Constraints for table `orders`
--
ALTER TABLE `orders`
  ADD CONSTRAINT `orders_ibfk_1` FOREIGN KEY (`CustomerID`) REFERENCES `customers` (`CustomerID`),
  ADD CONSTRAINT `orders_ibfk_2` FOREIGN KEY (`FoodID`) REFERENCES `menudetail` (`FoodID`);

--
-- Constraints for table `payments`
--
ALTER TABLE `payments`
  ADD CONSTRAINT `payments_ibfk_1` FOREIGN KEY (`CustomerID`) REFERENCES `customers` (`CustomerID`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
