-- phpMyAdmin SQL Dump
-- version 4.8.5
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Apr 15, 2019 at 11:31 AM
-- Server version: 10.1.38-MariaDB
-- PHP Version: 7.3.3

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `selectbook`
--

-- --------------------------------------------------------

--
-- Table structure for table `book`
--

CREATE TABLE `book` (
  `b_id` int(5) NOT NULL,
  `b_name` varchar(30) COLLATE utf8_unicode_ci NOT NULL,
  `b_author` varchar(25) COLLATE utf8_unicode_ci NOT NULL,
  `b_price` int(5) NOT NULL,
  `b_stock` int(5) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `book`
--

INSERT INTO `book` (`b_id`, `b_name`, `b_author`, `b_price`, `b_stock`) VALUES
(1, 'ไอ้เขี้ยวเงิน', 'ทาเคชิ', 55, 499),
(2, 'โคนัน', 'ทาโร่', 55, 998),
(3, 'บ๊อกบ๊อก', 'มุซาชิ', 50, 999),
(4, 'กระต่ายกับเต่า', 'ตัวป่วน', 100, 245);

-- --------------------------------------------------------

--
-- Table structure for table `customer`
--

CREATE TABLE `customer` (
  `c_id` varchar(5) COLLATE utf8_unicode_ci NOT NULL,
  `c_name` varchar(25) COLLATE utf8_unicode_ci NOT NULL,
  `c_surname` varchar(25) COLLATE utf8_unicode_ci NOT NULL,
  `gender` varchar(5) COLLATE utf8_unicode_ci NOT NULL,
  `c_address` varchar(25) COLLATE utf8_unicode_ci NOT NULL,
  `c_district` varchar(25) COLLATE utf8_unicode_ci NOT NULL,
  `c_province` varchar(25) COLLATE utf8_unicode_ci NOT NULL,
  `c_postcode` int(5) NOT NULL,
  `c_tel` varchar(10) COLLATE utf8_unicode_ci NOT NULL,
  `c_idcard` varchar(13) COLLATE utf8_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `customer`
--

INSERT INTO `customer` (`c_id`, `c_name`, `c_surname`, `gender`, `c_address`, `c_district`, `c_province`, `c_postcode`, `c_tel`, `c_idcard`) VALUES
('T01', 'เชส', 'ฟาเบรกาส', 'ชาย', '111', 'คาตาลุนญ่า', 'สเปน', 10500, '025163152', '1101526548915'),
('T02', 'อังเดร', 'อาชาวิน', 'ชาย', '431', 'มอสโกดกเด', 'รัสเซีย', 10500, '021456312', '1102356489512'),
('T03', 'ธีโอ', 'วัลคอตต์', 'ชาย', '11/2', 'ลอนดอน', 'อังกฤษ', 10240, '0845236189', '1102516587456'),
('T04', 'สวกเ', 'สวกเ', 'ชาย', '45', 'ดเเ', 'ดเดเ', 10500, '02466956', '1102659875464'),
('T05', 'Cesc', 'Fabregas soler', 'ชาย', '421', 'London', 'England', 10160, '024132598', '1101500401156');

-- --------------------------------------------------------

--
-- Table structure for table `employee`
--

CREATE TABLE `employee` (
  `e_id` varchar(5) COLLATE utf8_unicode_ci NOT NULL,
  `e_name` varchar(25) COLLATE utf8_unicode_ci NOT NULL,
  `e_surname` varchar(25) COLLATE utf8_unicode_ci NOT NULL,
  `e_address` varchar(25) COLLATE utf8_unicode_ci NOT NULL,
  `e_district` varchar(25) COLLATE utf8_unicode_ci NOT NULL,
  `e_province` varchar(25) COLLATE utf8_unicode_ci NOT NULL,
  `e_postcode` int(5) NOT NULL,
  `e_tel` varchar(10) COLLATE utf8_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `employee`
--

INSERT INTO `employee` (`e_id`, `e_name`, `e_surname`, `e_address`, `e_district`, `e_province`, `e_postcode`, `e_tel`) VALUES
('C01', 'อังเด', 'อาชาวิน', '555', 'มอสโก', 'รัสเซีย', 10500, '021456987'),
('C02', 'โทมัส', 'โรซิคกี้', '123', 'สโลวะเกีย', 'เช็ก', 10500, '021564895'),
('C03', 'วิลเลียม', 'กัลลาส', '185', 'ปารีส', 'ฝรั่งเศส', 15000, '025489612');

-- --------------------------------------------------------

--
-- Table structure for table `orders`
--

CREATE TABLE `orders` (
  `o_id` int(5) UNSIGNED ZEROFILL NOT NULL,
  `b_id` varchar(5) COLLATE utf8_unicode_ci NOT NULL,
  `p_id` varchar(5) COLLATE utf8_unicode_ci DEFAULT NULL,
  `o_qty` int(10) NOT NULL,
  `o_price` int(10) NOT NULL,
  `o_total` int(11) DEFAULT NULL,
  `o_date` varchar(20) COLLATE utf8_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `orders`
--

INSERT INTO `orders` (`o_id`, `b_id`, `p_id`, `o_qty`, `o_price`, `o_total`, `o_date`) VALUES
(00001, '0002', '2002', 50, 50, 2500, '14/04/2019'),
(00002, '0001', '2001', 50, 100, 5000, '14/04/2019'),
(23356, '4', '2001', 100, 50, 5000, '15/04/2019');

-- --------------------------------------------------------

--
-- Table structure for table `publisher`
--

CREATE TABLE `publisher` (
  `p_id` varchar(5) COLLATE utf8_unicode_ci NOT NULL,
  `p_name` varchar(25) COLLATE utf8_unicode_ci NOT NULL,
  `p_address` varchar(25) COLLATE utf8_unicode_ci NOT NULL,
  `p_district` varchar(25) COLLATE utf8_unicode_ci NOT NULL,
  `p_province` varchar(25) COLLATE utf8_unicode_ci NOT NULL,
  `p_postcode` int(5) NOT NULL,
  `p_tel` varchar(10) COLLATE utf8_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `publisher`
--

INSERT INTO `publisher` (`p_id`, `p_name`, `p_address`, `p_district`, `p_province`, `p_postcode`, `p_tel`) VALUES
('2001', 'แจ่มใส', '1112', 'บางขุนนนท์', 'กทม.', 10160, '024156987'),
('2002', 'อมินทร์', '465', 'ตลิ่งชัน', 'กทม.', 10600, '024185694'),
('2003', 'บงกช', '13', 'เก่ด', 'กเกด', 10500, '051236485');

-- --------------------------------------------------------

--
-- Table structure for table `sale`
--

CREATE TABLE `sale` (
  `s_id` int(5) UNSIGNED ZEROFILL NOT NULL,
  `c_id` varchar(5) COLLATE utf8_unicode_ci NOT NULL,
  `e_id` varchar(5) COLLATE utf8_unicode_ci NOT NULL,
  `s_date` varchar(20) COLLATE utf8_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `sale_detail`
--

CREATE TABLE `sale_detail` (
  `sale_id` int(5) NOT NULL,
  `o_id` int(5) NOT NULL,
  `b_id` int(5) NOT NULL,
  `qty` int(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `book`
--
ALTER TABLE `book`
  ADD PRIMARY KEY (`b_id`);

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
-- Indexes for table `orders`
--
ALTER TABLE `orders`
  ADD PRIMARY KEY (`o_id`);

--
-- Indexes for table `publisher`
--
ALTER TABLE `publisher`
  ADD PRIMARY KEY (`p_id`);

--
-- Indexes for table `sale`
--
ALTER TABLE `sale`
  ADD PRIMARY KEY (`s_id`);

--
-- Indexes for table `sale_detail`
--
ALTER TABLE `sale_detail`
  ADD PRIMARY KEY (`sale_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `book`
--
ALTER TABLE `book`
  MODIFY `b_id` int(5) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `orders`
--
ALTER TABLE `orders`
  MODIFY `o_id` int(5) UNSIGNED ZEROFILL NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=23357;

--
-- AUTO_INCREMENT for table `sale`
--
ALTER TABLE `sale`
  MODIFY `s_id` int(5) UNSIGNED ZEROFILL NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=55;

--
-- AUTO_INCREMENT for table `sale_detail`
--
ALTER TABLE `sale_detail`
  MODIFY `sale_id` int(5) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=62429;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
