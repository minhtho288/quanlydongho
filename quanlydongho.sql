-- phpMyAdmin SQL Dump
-- version 5.0.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Dec 14, 2020 at 04:47 PM
-- Server version: 10.4.11-MariaDB
-- PHP Version: 7.4.5

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `quanlydongho`
--

-- --------------------------------------------------------

--
-- Table structure for table `admin`
--

CREATE TABLE `admin` (
  `Username` varchar(100) NOT NULL,
  `Password` varchar(50) NOT NULL,
  `Fullname` varchar(200) NOT NULL,
  `Email` varchar(200) NOT NULL,
  `Phone` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `admin`
--

INSERT INTO `admin` (`Username`, `Password`, `Fullname`, `Email`, `Phone`) VALUES
('minhtam', 'd0010a6f34908640a4a6da2389772a78', 'Nguyễn Huỳnh Minh Tâm', 'nhmtam.c3tqcap.a3@gmail.com', '0898391560'),
('minhtho', '02f039058bd48307e6f653a2005c9dd2', 'Nguyễn Huỳnh Minh Thơ', 'nhmtho.c3tqcap.a3@gmail.com', '0898394288');

-- --------------------------------------------------------

--
-- Table structure for table `bill`
--

CREATE TABLE `bill` (
  `ID_Bill` int(11) NOT NULL,
  `Consignee_name` varchar(100) NOT NULL,
  `Consignee_phone` varchar(50) NOT NULL,
  `Consignee_address` varchar(100) NOT NULL,
  `Note` varchar(100) NOT NULL,
  `Consignee_email` varchar(200) NOT NULL,
  `Delivery` int(11) NOT NULL,
  `id_customers` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `bill`
--

INSERT INTO `bill` (`ID_Bill`, `Consignee_name`, `Consignee_phone`, `Consignee_address`, `Note`, `Consignee_email`, `Delivery`, `id_customers`) VALUES
(66, 'Nguyễn Huỳnh Minh Tâm', '1234567123', 'Ha noi', 'fddf', 'nhmtam.c3tqcap.a3@gmail.com', 0, 30),
(67, 'Nguyễn Van A', '1234567123', 'Ha noi', 'dfdf', 'tamthokha99@gmail.com', 0, 30),
(68, 'TamNguyen', '1234567123', 'TP-HCM', 'ddg', 'quangtin131299@gmail.com', 0, 30),
(69, 'Nguyễn Van A', '1234567123', 'TP-HCM', 'sdsf', 'quangtin131299@gmail.com', 0, 30),
(70, 'Nguyễn Huỳnh Minh Thơ', '1234567123', 'TP-HCM', 'ds', 'quangtin131299@gmail.com', 0, 30),
(71, 'hello', '1234567123', 'TP-HCM', 'fdf', 'tamthokha99@gmail.com', 1, 30),
(72, 'hello', '1234567123', 'Ha noi', 'hghg', 'nhmtam.c3tqcap.a3@gmail.com', 1, 30);

-- --------------------------------------------------------

--
-- Table structure for table `bill_product`
--

CREATE TABLE `bill_product` (
  `ID_Order` int(11) NOT NULL,
  `id_product` int(11) NOT NULL,
  `quantity` int(11) NOT NULL,
  `codes` int(11) NOT NULL,
  `ID_Bill` int(11) NOT NULL,
  `CreateDate` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `order_status` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `bill_product`
--

INSERT INTO `bill_product` (`ID_Order`, `id_product`, `quantity`, `codes`, `ID_Bill`, `CreateDate`, `order_status`) VALUES
(84, 31, 1, 191, 66, '2020-12-14 15:23:25', 0),
(85, 42, 1, 191, 67, '2020-12-14 15:25:28', 0),
(86, 42, 1, 278, 68, '2020-12-14 15:26:17', 0),
(87, 32, 1, 774, 69, '2020-12-14 15:28:10', 0),
(88, 31, 1, 993, 70, '2020-12-14 15:30:19', 0),
(89, 53, 1, 691, 71, '2020-12-14 15:30:57', 0),
(90, 32, 1, 828, 72, '2020-12-14 15:32:44', 0);

-- --------------------------------------------------------

--
-- Table structure for table `cart`
--

CREATE TABLE `cart` (
  `id_cart` int(11) NOT NULL,
  `name_product` varchar(100) NOT NULL,
  `id_product` int(11) NOT NULL,
  `price_product` float NOT NULL,
  `image_product` varchar(100) NOT NULL,
  `quantity` int(11) NOT NULL,
  `Total_amount` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `customers`
--

CREATE TABLE `customers` (
  `ID` int(11) NOT NULL,
  `Name` varchar(200) NOT NULL,
  `Address` varchar(200) NOT NULL,
  `Phone` varchar(50) NOT NULL,
  `Email` varchar(50) NOT NULL,
  `UserName` varchar(100) NOT NULL,
  `Password` varchar(55) NOT NULL,
  `Createdate` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `customers`
--

INSERT INTO `customers` (`ID`, `Name`, `Address`, `Phone`, `Email`, `UserName`, `Password`, `Createdate`) VALUES
(30, 'Nguyễn Huỳnh Minh Tâm', 'TP-HCM', '1234567123', 'tamthokha99@gmail.com', 'nguyenhuynhminhtam', '1111', '2020-12-08 14:39:20');

-- --------------------------------------------------------

--
-- Table structure for table `groupproduct`
--

CREATE TABLE `groupproduct` (
  `ID_GroupProduct` int(11) NOT NULL,
  `Name_GP` varchar(200) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `groupproduct`
--

INSERT INTO `groupproduct` (`ID_GroupProduct`, `Name_GP`) VALUES
(1, 'Nam'),
(2, 'Nữ');

-- --------------------------------------------------------

--
-- Table structure for table `product`
--

CREATE TABLE `product` (
  `ID` int(11) NOT NULL,
  `Name` varchar(200) NOT NULL,
  `Price` float NOT NULL,
  `Status` varchar(50) NOT NULL,
  `Image` varchar(200) NOT NULL,
  `Trademark` varchar(100) NOT NULL,
  `ID_GroupProduct` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `product`
--

INSERT INTO `product` (`ID`, `Name`, `Price`, `Status`, `Image`, `Trademark`, `ID_GroupProduct`) VALUES
(4, 'ĐỒNG HỒ NAM HENRY LONDON HL41-JS-0188 WATCHS', 2911300, 'Còn hàng', '1.jpg', 'Henry London / Anh Quốc', 1),
(7, 'ĐỒNG HỒ HENRY LONDON HL39-M-0097 CHANCERY BEATIFULL', 2817500, 'Còn hàng', '2.jpg', 'Henry London / Anh Quốc', 2),
(8, 'ĐỒNG HỒ HENRY LONDON HL39-CS-0092 HAMPSTEAD SST', 3783500, 'Còn hàng', '3.jpg', 'Henry London / Anh Quốc', 2),
(9, 'ĐỒNG HỒ NAM HENRY LONDON HL39-M-0029 LOVELY', 2817500, 'Còn hàng', '4.jpg', 'Henry London / Anh Quốc', 1),
(10, 'ĐỒNG HỒ HENRY LONDON HL39-M-0136 STRATFORDS HHS', 3139500, 'Còn hàng', '5.jpg', 'Henry London / Anh Quốc', 2),
(11, 'ĐỒNG HỒ HENRY LONDON HL41-CS-0099 CHANCERYS GGH', 3461500, 'Còn hàng', '6.jpg', 'Henry London / Anh Quốc', 1),
(12, 'TISSOT EVERYTIME T109.210.33.031.00', 6468500, 'Còn hàng', '1tho.jpg', 'Tissot', 2),
(13, 'TISSOT EVERYTIME T109.210.11.033.00', 5508000, 'Còn hàng', '2tho.jpg', 'Tissot', 1),
(14, 'TISSOT EVERYTIME T109.210.33.021.00', 6468000, 'Còn hàng', '3tho.jpg', 'Tissot', 2),
(15, 'TISSOT EVERYTIME T109.210.11.033.00', 5508000, 'Còn hàng', '4tho.jpg', 'Tissot', 1),
(16, 'TISSOT EVERYTIME SMALL T109.210.11.053.00', 6000000, 'Còn hàng', '5tho.jpg', 'Tissot', 1),
(17, 'ĐỒNG HỒ LONGINES LA GRANDE CLASSIQUE', 9000000, 'Còn hàng', '6tho.jpg', 'Longines', 2),
(18, 'ĐỒNG HỒ LONGINES FLAGSHIP L4.274.3.27.7', 7500000, 'Còn hàng', '7tho.jpg', 'Longines', 2),
(19, 'LONGINES LA GRANDE CLASSIQUE', 8900000, 'Còn hàng', '8tho.jpg', 'Longines\r\n', 2),
(20, 'ĐỒNG HỒ LONGINES LA GRANDE CLASSIQUE', 5000000, 'Còn hàng', '9tho.jpg', 'Longines', 2),
(21, 'ĐỒNG HỒ LONGINES LA GRANDE CLASSIQUE', 12000000, 'Còn hàng', '10tho.jpg', 'Longines', 2),
(22, 'ĐỒNG HỒ LONGINES LA GRANDE CLASSIQUE', 6700000, 'Còn hàng', '11tho.jpg', 'LONGINES', 2),
(23, 'ĐỒNG HỒ LONGINES LA GRANDE CLASSIQUE', 15000000, 'Còn hàng', '12tho.jpg', 'LONGINES', 2),
(24, 'LONGINES LA GRANDE CLASSIQUE', 4500000, 'Còn hàng', '14tho.jpg', 'LONGINES', 2),
(25, 'TISSOT CARSON PREMIUM T122.407.33.031.00', 15800000, 'Còn hàng', '1na.jpg', 'TISSOT', 1),
(26, 'TISSOT CARSON PREMIUM T122.407.33.777.99', 27000000, 'Còn hàng', '2na.jpg', 'TISSOT', 2),
(27, 'TISSOT CARSON PREMIUM T5567.407.33.789.23', 12800000, 'Còn hàng', '3na.jpg', 'TISSOT', 2),
(28, 'TISSOT CARSON PREMIUM T122.407.33.031.00', 34000000, 'Còn hàng', '4na.jpg', 'TISSOT', 1),
(30, 'Longines Présence, 40mm L49052112', 4500000, 'Còn hàng', '1anh.jpg', 'Longines', 1),
(31, 'Versace Safety Pin Watch, 34mm VEPN00520', 23000000, 'Còn hàng', '9anh.jpg', 'Versace', 2),
(32, 'Longines Présence, 40mm L49052112', 12000900, 'Còn hàng', '3anh.jpg', 'Longines', 1),
(33, 'Versace Safety Pin Watch, 34mm VEPN00520', 5690000, 'Còn hàng', '7anh.jpg', 'Versace', 2),
(34, 'Longines Présence, 40mm L49052112', 34900000, 'Còn hàng', '5anh.jpg', 'Longines', 1),
(35, 'Versace Safety Pin Watch, 34mm VEPN00520', 3139500, 'Còn hàng', '11anh.jpg', 'Versace', 2),
(36, 'Longines Présence, 40mm L49052112', 2817500, 'Còn hàng', '2anh.jpg', 'Longines', 1),
(37, 'Versace Safety Pin Watch, 34mm VEPN00520', 20000000, 'Còn hàng', '8anh.jpg', 'Versace ', 2),
(38, 'Longines Présence, 40mm L49052112', 12900000, 'Còn hàng', '4anh.jpg', 'Longines', 1),
(39, 'Versace Safety Pin Watch, 34mm VEPN00520', 27000000, 'Còn hàng', '10anh.jpg', 'Versace', 2),
(40, 'Longines Présence, 40mm L49052112', 30000000, 'Còn hàng', '6anh.jpg', 'Longines', 1),
(41, 'Versace Safety Pin Watch, 34mm VEPN00520', 28000000, 'Còn hàng', '12anh.jpg', 'Versace', 2),
(42, 'Oris Big Crown, 41mm 01 798 7768 4284-Set', 35000000, 'Còn hàng', '1nam.jpg', 'Oris', 1),
(43, 'Oris Big Crown, 41mm 01 798 7768 4284-Set', 12000000, 'Còn hàng', '2nam.jpg', 'Orís', 1),
(44, 'Oris Big Crown, 41mm 01 798 7768 4284-Set', 10000000, 'Còn hàng', '3nam.jpg', 'Oris', 1),
(45, 'Oris Big Crown, 41mm 01 798 7768 4284-Set', 29000000, 'Còn hàng', '4nam.jpg', 'Orís', 1),
(46, 'Oris Big Crown, 41mm 01 798 7768 4284-Set', 2817500, 'Còn hàng', '5nam.jpg', 'Oris', 1),
(48, 'Oris Aquis, 43.50 mm 01 798 7754 4185-Set RS', 45900000, 'Còn hàng', '6nam.jpg', 'Oris', 1),
(49, 'Oris Aquis, 43.50 mm 01 798 7754 4185-Set RS', 25000000, 'Còn hàng', '7nam.jpg', 'Oris', 1),
(50, 'Oris Aquis, 43.50 mm 01 798 7754 4185-Set RS', 19000000, 'Còn hàng', '8nam.jpg', 'Oris', 1),
(51, 'Oris Aquis, 43.50 mm 01 798 7754 4185-Set RS', 16000000, 'Còn hàng', '9nam.jpg', 'Oris', 1),
(52, 'Oris Aquis, 43.50 mm 01 798 7754 4185-Set RS', 38000000, 'Còn hàng', '10nam.jpg', 'Oris', 1),
(53, 'Oris Aquis, 43.50 mm 01 798 7754 4185-Set RS', 49000000, 'Còn hàng', '11nam.jpg', 'Oris', 1),
(54, 'Oris Aquis, 43.50 mm 01 798 7754 4185-Set RS', 29500000, 'Còn hàng', '12nam.jpg', 'Oris', 1),
(55, 'Đồng hồ Diamond D DM6305B5', 12000000, 'Còn hàng', '1nu.jpg', 'Diamond', 2),
(56, 'Đồng hồ Diamond D DM5308B5', 35900000, 'Còn hàng', '2nu.jpg', 'Diamond', 2),
(57, 'Đồng hồ Diamond D DM36505IG', 24000000, 'Còn hàng', '3nu.jpg', 'Diamond', 2),
(58, 'Đồng hồ Diamond D DM63055', 23500000, 'Còn hàng', '4nu.jpg', 'Diamond', 2),
(59, 'Đồng hồ Q&Q QQ-S297J202Y', 12700000, 'Còn hàng', '10nu.jpg', 'Diamond', 2),
(60, 'Đồng hồ Diamond D DM5308B5IG', 46000000, 'Còn hàng', '6nu.jpg', 'Diamond', 2),
(61, 'Đồng hồ Q&Q QQ-S293J010Y', 27900000, 'Còn hàng', '7nu.jpg', 'Diamond', 2),
(62, 'Đồng hồ Jacques Lemans JL-42-3E', 9001000, 'Còn hàng', '11nu.jpg', 'Jacques', 2),
(63, 'Đồng hồ Diamond D DM65105IG-W', 42000000, 'Còn hàng', '9nu.jpg', 'Diamond', 2),
(64, 'Đồng hồ Diamond D DM21005', 19200000, 'Còn hàng', '5nu.jpg', 'Diamond', 2),
(65, 'Đồng hồ Diamond D DM15145IG', 15200000, 'Còn hàng', '8nu.jpg', 'Diamond', 2),
(66, 'Đồng hồ Diamond D DM65105W-R', 12200000, 'Còn hàng', '12nu.jpg', 'Diamond', 2),
(67, 'Đồng hồ Diamond D DM46325S-R', 7900000, 'Còn hàng', '1random.jpg', 'Diamond', 2),
(68, 'Đồng hồ Diamond D DM4633B5IG', 16400000, 'Còn hàng', '2random.jpg', 'Diamond', 2),
(69, 'Đồng hồ Jacques Lemans JL-1-1947E', 17000000, 'Còn hàng', '3random.jpg', 'Jacques', 2),
(70, 'Đồng hồ Jacques Lemans JL-1-1936G+JL-1-1937G', 98000000, 'Còn hàng', '5lienhe.jpg', 'Jacques', 1),
(71, 'Đồng hồ Bruno Sohnle 17-33036-241+17-33035-241', 29000000, 'Còn hàng', '6lienhe.jpg', 'Bruno', 2),
(72, 'Đồng hồ Q&Q QQ-BB14-010Y+BB15-010Y', 80000000, 'Còn hàng', '7lienhe.jpg', 'Q&Q BB', 2),
(73, 'Đồng hồ Q&Q QQ-C168J204Y+C169J204Y', 24900000, 'Còn hàng', '8lienhe.jpg', 'Q&Q BB', 2),
(74, 'Đồng hồ Q&Q QQ-S278J102Y + QQ-S279J102Y', 50000000, 'Còn hàng', '4list.jpg', 'Q&Q BB', 2),
(75, 'Đồng hồ Q&Q QQ-S278J304Y + QQ-S279J304Y', 30000000, 'Còn hàng', '5list.jpg', 'Q&Q BB', 2),
(76, 'Đồng hồ Q&Q QQ-S278J312Y + QQ-S279J312Y', 20000000, 'Còn hàng', '6list.jpg\r\n', 'Q&Q BB', 2),
(77, 'Đồng hồ nữ chính hãng KASSAW K820-1', 29900000, 'Còn hàng', '1km.jpg', 'KASSAW', 2),
(78, 'Đồng hồ nữ chính hãng KASSAW K820-2', 30900000, 'Còn hàng', '2km.jpg', 'KASSAW', 2),
(79, 'Đồng hồ nữ chính hãng KASSAW K820-1', 40900000, 'Còn hàng', '3km.jpg', 'KASSAW', 2),
(80, 'Đồng hồ nữ chính hãng KASSAW K820-5', 50900000, 'Còn hàng', '4km.jpg', 'KASSAW', 2),
(81, 'Đồng hồ nữ chính hãng KASSAW K820-6', 12000000, 'Còn hàng', '5km.jpg', 'KASSAW', 2),
(82, 'Đồng hồ nữ chính hãng KASSAW K820-5', 3139500, 'Còn hàng', '6km.jpg', 'KASSAW', 2),
(83, 'Đồng hồ nam chính hãng Teintop T8685-1', 3783500, 'Còn hàng', '7km.jpg', 'Teintop', 1),
(84, 'Đồng hồ nam chính hãng Teintop T8685-2', 2817500, 'Còn hàng', '8km.jpg', 'Teintop', 1),
(85, 'Đồng hồ nam chính hãng Teintop T8685-3', 47000000, 'Còn hàng', '9km.jpg', 'Teintop ', 1),
(86, 'Đồng hồ nữ chính hãng KASSAW K820-5', 12000000, 'Còn hàng', '1lh.jpg', 'KASSAW', 2),
(87, 'Đồng hồ chính hãng Teintop T8685-1', 2817500, 'Còn hàng', '3lh.jpg', 'Teintop', 1),
(88, 'Đồng hồ chính hãng Teintop T8685-2', 29000000, 'Còn hàng', '4lh.jpg', 'Teintop', 1),
(89, 'Đồng hồ nữ chính hãng KASSAW K820-6', 98000000, 'Còn hàng', '2lh.jpg', 'KASSAW', 2),
(92, 'Đồng hồ nam', 20000, 'còn hàng', '1nu.jpg', 'casio', 1),
(93, 'Đồng hồ nữ', 98000000, 'còn hàng', '2lh.jpg', 'KASSAW', 2),
(95, 'Đồng hồ nu', 60000000, 'còn hàng', '1random.jpg', 'Relox', 1),
(96, 'Đồng Hồ Nữ', 30000000, 'còn hàng', '6nu.jpg', 'Relox', 2);

-- --------------------------------------------------------

--
-- Table structure for table `shop`
--

CREATE TABLE `shop` (
  `ID_Shop` int(11) NOT NULL,
  `Name_Shop` varchar(200) NOT NULL,
  `Address_Shop` varchar(200) NOT NULL,
  `Phone_Shop` varchar(20) NOT NULL,
  `id_product` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admin`
--
ALTER TABLE `admin`
  ADD PRIMARY KEY (`Username`);

--
-- Indexes for table `bill`
--
ALTER TABLE `bill`
  ADD PRIMARY KEY (`ID_Bill`),
  ADD KEY `id_customers` (`id_customers`);

--
-- Indexes for table `bill_product`
--
ALTER TABLE `bill_product`
  ADD PRIMARY KEY (`ID_Order`,`ID_Bill`),
  ADD KEY `ID_Order` (`ID_Bill`),
  ADD KEY `id_product` (`id_product`);

--
-- Indexes for table `cart`
--
ALTER TABLE `cart`
  ADD PRIMARY KEY (`id_cart`),
  ADD KEY `cart_ibfk_1` (`id_product`);

--
-- Indexes for table `customers`
--
ALTER TABLE `customers`
  ADD PRIMARY KEY (`ID`);

--
-- Indexes for table `groupproduct`
--
ALTER TABLE `groupproduct`
  ADD PRIMARY KEY (`ID_GroupProduct`);

--
-- Indexes for table `product`
--
ALTER TABLE `product`
  ADD PRIMARY KEY (`ID`),
  ADD KEY `ID_GroupProduct` (`ID_GroupProduct`);

--
-- Indexes for table `shop`
--
ALTER TABLE `shop`
  ADD PRIMARY KEY (`ID_Shop`),
  ADD KEY `shop_ibfk_1` (`id_product`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `bill`
--
ALTER TABLE `bill`
  MODIFY `ID_Bill` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=73;

--
-- AUTO_INCREMENT for table `bill_product`
--
ALTER TABLE `bill_product`
  MODIFY `ID_Order` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=91;

--
-- AUTO_INCREMENT for table `cart`
--
ALTER TABLE `cart`
  MODIFY `id_cart` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=127;

--
-- AUTO_INCREMENT for table `customers`
--
ALTER TABLE `customers`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=31;

--
-- AUTO_INCREMENT for table `groupproduct`
--
ALTER TABLE `groupproduct`
  MODIFY `ID_GroupProduct` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `product`
--
ALTER TABLE `product`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=101;

--
-- AUTO_INCREMENT for table `shop`
--
ALTER TABLE `shop`
  MODIFY `ID_Shop` int(11) NOT NULL AUTO_INCREMENT;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `bill`
--
ALTER TABLE `bill`
  ADD CONSTRAINT `bill_ibfk_1` FOREIGN KEY (`id_customers`) REFERENCES `customers` (`ID`);

--
-- Constraints for table `bill_product`
--
ALTER TABLE `bill_product`
  ADD CONSTRAINT `bill_product_ibfk_1` FOREIGN KEY (`ID_Bill`) REFERENCES `bill` (`ID_Bill`),
  ADD CONSTRAINT `bill_product_ibfk_2` FOREIGN KEY (`id_product`) REFERENCES `product` (`ID`);

--
-- Constraints for table `cart`
--
ALTER TABLE `cart`
  ADD CONSTRAINT `cart_ibfk_1` FOREIGN KEY (`id_product`) REFERENCES `product` (`ID`);

--
-- Constraints for table `product`
--
ALTER TABLE `product`
  ADD CONSTRAINT `product_ibfk_1` FOREIGN KEY (`ID_GroupProduct`) REFERENCES `groupproduct` (`ID_GroupProduct`);

--
-- Constraints for table `shop`
--
ALTER TABLE `shop`
  ADD CONSTRAINT `shop_ibfk_1` FOREIGN KEY (`id_product`) REFERENCES `product` (`ID`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
