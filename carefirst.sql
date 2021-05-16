-- phpMyAdmin SQL Dump
-- version 5.0.4
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: May 16, 2021 at 09:30 AM
-- Server version: 10.4.17-MariaDB
-- PHP Version: 8.0.0

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `carefirst`
--

-- --------------------------------------------------------


--
-- Table structure for table `covid_essentials`
--

CREATE TABLE `covid_essentials` (
  `id` int(10) NOT NULL,
  `product_id` varchar(50) NOT NULL,
  `product_name` varchar(50) NOT NULL,
  `product_price` int(10) NOT NULL,
  `product_image` varchar(200) NOT NULL,
  `product_quantity` varchar(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `covid_essentials`
--

INSERT INTO `covid_essentials` (`id`, `product_id`, `product_name`, `product_price`, `product_image`, `product_quantity`) VALUES
(1, 'covid_essentials1', 'KN 95 Face Mask', 65, 'DatabaseImages/covid_essential/kn95mask.jpg', '1'),
(2, 'covid_essentials2', 'PPE Kit', 399, 'DatabaseImages/covid_essential/pptkit.jpg', '1'),
(3, 'covid_essentials3', 'W95 Face Mask', 180, 'DatabaseImages/covid_essential/w95mask.jpg', '1'),
(4, 'covid_essentials4', 'Hand Sanitizer', 250, 'DatabaseImages/covid_essential/sanitizer.jpg', '1'),
(6, 'covid_essentials5', 'OxiMeter', 999, 'DatabaseImages/covid_essential/oximetar.jpg', '1');

-- --------------------------------------------------------

--
-- Table structure for table `product`
--

CREATE TABLE `product` (
  `id` int(6) NOT NULL,
  `product_code` varchar(30) NOT NULL,
  `product_name` varchar(30) NOT NULL,
  `product_category` varchar(50) NOT NULL,
  `product_price` int(10) NOT NULL,
  `product_quntity` int(10) NOT NULL,
  `product_image` varchar(200) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `product`
--

INSERT INTO `product` (`id`, `product_code`, `product_name`, `product_category`, `product_price`, `product_quntity`, `product_image`) VALUES
(3, 'babyproduct1', 'Kid Diaper Pants', 'baby_needs', 152, 1, 'babyproduct1.jpg'),
(4, 'babyproduct2', 'Kid Baby Skincare wipes', 'baby_needs', 199, 1, 'babyproduct2.jpg'),
(5, 'babyproduct3', 'Himaliya Baby Lotion', 'baby_needs', 139, 1, 'babyproduct3.jpg'),
(6, 'babyproduct4', 'Pampers Pants', 'baby_needs', 879, 1, 'babyproduct4.jpg'),
(7, 'babyproduct5', 'Pampers Clean Wipas', 'baby_needs', 92, 1, 'babyproduct5.jpg'),
(8, 'babyproduct6', 'Baby Powder', 'baby_needs', 117, 1, 'babyproduct6.jpg'),
(9, 'personal_care1', 'Face Cream', 'personal_care', 113, 1, 'personal_care1.jpg'),
(10, 'personal_care2', 'Moisturising Cream', 'personal_care', 128, 1, 'personal_care2.jpg'),
(11, 'personal_care3', 'Hand Sanitizer', 'personal_care', 25, 1, 'personal_care3.jpg'),
(12, 'personal_care4', 'Tooth Brush', 'personal_care', 104, 1, 'personal_care4.jpg'),
(13, 'personal_care5', 'Tooth Paste', 'personal_care', 210, 1, 'personal_care5.jpg'),
(14, 'personal_care6', 'Menthol Shampoo', 'personal_care', 130, 1, 'personal_care6.jpg'),
(15, 'nutrition1', 'Complan Refill', 'nutrition', 268, 1, 'nutrition1.jpg'),
(16, 'nutrition2', 'Horlicks Refill', 'nutrition', 265, 1, 'nutrition2.jpg'),
(17, 'nutrition3', 'Eatrite Ragifills', 'nutrition', 130, 1, 'nutrition3.jpg'),
(18, 'nutrition4', 'Horlicks Oats', 'nutrition', 199, 1, 'nutrition4.jpg'),
(19, 'health1', 'Band AD', 'health_needs', 2, 1, 'health1.jpg'),
(20, 'health2', 'Moov Spray', 'health_needs', 130, 1, 'health2.jpg'),
(21, 'health3', 'Vicks Cream', 'health_needs', 135, 1, 'health3.jpg'),
(22, 'health4', 'Dr Ortho Capusule', 'health_needs', 180, 1, 'health4.jpg'),
(23, 'vitamins1', 'Nutrimexx Protein', 'vitamins', 1799, 1, 'vitamins1.jpg'),
(24, 'vitamins2', 'Himaliya Cap', 'vitamins', 165, 1, 'vitamins2.jpg'),
(25, 'vitamins3', 'Folic Acid', 'vitamins', 523, 1, 'vitamins3.jpg'),
(26, 'vitamins4', 'Labrada Powder', 'vitamins', 180, 1, 'vitamins4.jpg'),
(27, 'diabetic1', 'Sugar Free Tablet', 'diabetic', 250, 1, 'diabetic1.jpg'),
(28, 'diabetic2', 'Diabetic Care Bij', 'diabetic', 690, 1, 'diabetic2.jpg'),
(29, 'diabetic3', 'ACCU-CHECK Device', 'diabetic', 1599, 1, 'diabetic3.jpg'),
(30, 'diabetic4', 'Glucipro Powder', 'diabetic', 180, 1, 'diabetic4.jpg'),
(34, '528492', 'Product 1', 'personal_care', 100, 1, '528492.jpg');

-- --------------------------------------------------------

--
-- Table structure for table `top_offers`
--

CREATE TABLE `top_offers` (
  `id` int(10) NOT NULL,
  `product_id` varchar(50) NOT NULL,
  `product_name` text NOT NULL,
  `product_price` int(10) NOT NULL,
  `product_image` varchar(200) NOT NULL,
  `product_quantity` varchar(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `top_offers`
--

INSERT INTO `top_offers` (`id`, `product_id`, `product_name`, `product_price`, `product_image`, `product_quantity`) VALUES
(1, 'top_offers1', 'Protinex Chocolate', 550, 'DatabaseImages/top_offers/protinex.jpg', '1'),
(2, 'top_offers2', 'IODEX Jar', 130, 'DatabaseImages/top_offers/iodex.jpg', '1'),
(3, 'top_offers3', 'W95 Face Mask', 180, 'DatabaseImages/top_offers/w95mask.jpg', '1'),
(4, 'top_offers4', 'Vaseline Lotion', 250, 'DatabaseImages/top_offers/veseline.jpg', '1'),
(5, 'top_offers5', 'Vitamin C Capsules', 700, 'DatabaseImages/top_offers/vitaminc.jpg', '1');

-- --------------------------------------------------------

--
-- Table structure for table `user_account`
--

CREATE TABLE `user_account` (
  `Id` int(100) NOT NULL,
  `Username` varchar(200) NOT NULL,
  `Useremail` varchar(200) NOT NULL,
  `Userpassword` varchar(200) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;



--
-- Indexes for dumped tables
--


--
-- Indexes for table `covid_essentials`
--
ALTER TABLE `covid_essentials`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `product_id` (`product_id`);

--
-- Indexes for table `product`
--
ALTER TABLE `product`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `product_code` (`product_code`);

--
-- Indexes for table `top_offers`
--
ALTER TABLE `top_offers`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `user_account`
--
ALTER TABLE `user_account`
  ADD PRIMARY KEY (`Id`);

--
-- AUTO_INCREMENT for dumped tables
--



--
-- AUTO_INCREMENT for table `covid_essentials`
--
ALTER TABLE `covid_essentials`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `product`
--
ALTER TABLE `product`
  MODIFY `id` int(6) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=35;

--
-- AUTO_INCREMENT for table `top_offers`
--
ALTER TABLE `top_offers`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `user_account`
--
ALTER TABLE `user_account`
  MODIFY `Id` int(100) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
