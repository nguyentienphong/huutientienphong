-- phpMyAdmin SQL Dump
-- version 4.5.1
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: May 03, 2018 at 12:48 PM
-- Server version: 10.1.10-MariaDB
-- PHP Version: 5.6.15

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `vienduongcatba`
--

-- --------------------------------------------------------

--
-- Table structure for table `office_contact`
--
DROP TABLE office_contact;
CREATE TABLE `office_contact` (
  `off_id` int(11) NOT NULL,
  `off_name` varchar(255) DEFAULT NULL,
  `off_name_en` varchar(255) NOT NULL,
  `off_address` varchar(255) DEFAULT NULL,
  `off_address_en` varchar(255) NOT NULL,
  `off_name_ko` varchar(255) NOT NULL,
  `off_address_ko` varchar(255) NOT NULL,
  `off_map` varchar(255) DEFAULT NULL,
  `off_phone` varchar(255) DEFAULT NULL,
  `off_hotline` varchar(255) NOT NULL,
  `off_fax` varchar(255) DEFAULT NULL,
  `off_email` varchar(255) DEFAULT NULL,
  `off_website` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `office_contact`
--

INSERT INTO `office_contact` (`off_id`, `off_name`, `off_name_en`, `off_address`, `off_address_en`, `off_name_ko`, `off_address_ko`, `off_map`, `off_phone`, `off_hotline`, `off_fax`, `off_email`, `off_website`) VALUES
(1, 'CÔNG TY THANH TOÁN ĐIỆN TỬ VNPT EPAY', '', 'Tầng 3 - Tòa nhà Viễn Đông - 36 Hoàng Cầu - Quận Đống Đa - Hà Nội', '', '', '3 층 - 비엔 동 빌딩 - 36 호앙 카우', 'Số 32, Lô C2, Tổ 10, X1 Pháp Vân, Hoàng Mai,Hà nội', '+844-39335133', '098 5555 999', NULL, 'vnptepay@gmail.com', 'vnptepay.vn'),
(5, 'Trụ sở hà nội', 'Office Ha Noi', 'Tầng 3 - Tòa nhà Viễn Đông - 36 Hoàng Cầu - Quận Đống Đa - Hà Nội', 'floor 3 - vien dong building - 36 Hoang Cau ', '하노이의 호텔', '3 층 - 비엔 동 빌딩 - 36 호앙 카우', NULL, '+844-39335133', '', '+844-39335166', '', ''),
(6, 'Chi nhánh tại TPHCM', 'Office Ho Chi Minh', 'Lầu 3, số 96 – 98 Đào Duy Anh, Phường 9, Quận Phú Nhuận, TP Hồ Chí Minh', 'floor 3,  96 - 98 Dao Duy Anh ', '호치민 사무소', '바닥 3, 96 - 98 Dao Duy Anh', NULL, '+844-39335133', '', '+844-39335166', '', '');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `office_contact`
--
ALTER TABLE `office_contact`
  ADD PRIMARY KEY (`off_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `office_contact`
--
ALTER TABLE `office_contact`
  MODIFY `off_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
