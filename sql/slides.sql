-- phpMyAdmin SQL Dump
-- version 4.5.1
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: May 03, 2018 at 10:48 AM
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
-- Table structure for table `slides`
--
DROP TABLE slides;
CREATE TABLE `slides` (
  `sli_id` int(11) NOT NULL,
  `sli_title` varchar(255) NOT NULL,
  `sli_title_en` varchar(255) NOT NULL,
  `sli_title_ko` varchar(255) NOT NULL,
  `sli_cat_id` int(11) NOT NULL,
  `sli_content` text NOT NULL,
  `sli_link` varchar(255) NOT NULL,
  `sli_position` int(11) NOT NULL,
  `sli_image` varchar(255) NOT NULL,
  `sli_image_en` varchar(255) NOT NULL,
  `sli_image_ko` varchar(255) NOT NULL,
  `sli_active` tinyint(4) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

--
-- Dumping data for table `slides`
--

INSERT INTO `slides` (`sli_id`, `sli_title`, `sli_title_en`, `sli_title_ko`, `sli_cat_id`, `sli_content`, `sli_link`, `sli_position`, `sli_image`, `sli_image_en`, `sli_image_ko`, `sli_active`) VALUES
(1, 'Chào mừng đến với Viễn Dương Cát Bà', '', '', 3, '', '1', 0, '/media/images/2018/05/img_bg_1.jpg', '/media/images/2018/05/img_bg_1.jpg', '', 1),
(2, 'Chào mừng đến với Viễn Dương Cát Bà', 'welcome to Vien Duong Cat Ba', 'Vien Duong Cat Ba 에 오신 것을 환영합니다.', 3, '', 'file:///D:/xampp/htdocs/vienduongcatba/luxehotel/luxehotel/index.html#', 0, '/media/images/2018/05/img_bg_1.jpg', '/media/images/2018/05/img_bg_1.jpg', '/media/images/2018/05/img_bg_1.jpg', 1);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `slides`
--
ALTER TABLE `slides`
  ADD PRIMARY KEY (`sli_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `slides`
--
ALTER TABLE `slides`
  MODIFY `sli_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
