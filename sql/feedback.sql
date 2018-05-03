-- phpMyAdmin SQL Dump
-- version 4.5.1
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: May 03, 2018 at 12:35 PM
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
-- Table structure for table `feedback`
--
DROP TABLE feedback;
CREATE TABLE `feedback` (
  `fee_id` int(11) NOT NULL,
  `fee_fullname` varchar(255) NOT NULL,
  `fee_image` varchar(255) NOT NULL,
  `fee_email` varchar(255) NOT NULL,
  `fee_province` int(11) NOT NULL,
  `fee_content` text NOT NULL,
  `fee_content_en` text NOT NULL,
  `fee_content_ko` text NOT NULL,
  `fee_hot` tinyint(4) NOT NULL,
  `fee_active` tinyint(4) NOT NULL,
  `fee_date` int(11) NOT NULL,
  `fee_point` tinyint(4) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

--
-- Dumping data for table `feedback`
--

INSERT INTO `feedback` (`fee_id`, `fee_fullname`, `fee_image`, `fee_email`, `fee_province`, `fee_content`, `fee_content_en`, `fee_content_ko`, `fee_hot`, `fee_active`, `fee_date`, `fee_point`) VALUES
(5, 'NGuyễn Phương Hằng', '/media/images/2018/05/person3.jpg', 'phuonghang94@gmail.com', 1, 'Từ khi sử dụng dịch vụ của Quyền Quyền tôi Tốn rất ít thời gian để chăm sóc sắc đẹp mỗi buổi sáng tôi chỉ cần bỏ ra 5-10 phút để tút tát lại nhan sắc Tôi rất hài lòng với chất lượng dịch vụ.', 'Dignissimos asperiores vitae velit veniam totam fuga molestias accusamus alias autem provident. Odit ab aliquam dolor eius.', 'Dignissimos asperiores는 당신의 이름을 알리 덤불로 바꾸어줍니다. Odit ab aliquam dolor eius.', 0, 1, 1406082045, 0),
(6, 'NGuyễn Phương Hằng', '/media/images/2018/05/person2.jpg', 'phuonghang94@gmail.com', 1, 'Từ khi sử dụng dịch vụ của Quyền Quyền tôi Tốn rất ít thời gian để chăm sóc sắc đẹp mỗi buổi sáng tôi chỉ cần bỏ ra 5-10 phút để tút tát lại nhan sắc Tôi rất hài lòng với chất lượng dịch vụ.', 'Dignissimos asperiores vitae velit veniam totam fuga molestias accusamus alias autem provident. Odit ab aliquam dolor eius.', 'Dignissimos asperiores는 당신의 이름을 알리 덤불로 바꾸어줍니다. Odit ab aliquam dolor eius.', 0, 1, 1406082075, 0),
(7, 'NGuyễn Phương Hằng', '/media/images/2018/05/person1.jpg', 'phuonghang94@gmail.com', 1, 'Từ khi sử dụng dịch vụ của Quyền Quyền tôi Tốn rất ít thời gian để chăm sóc sắc đẹp mỗi buổi sáng tôi chỉ cần bỏ ra 5-10 phút để tút tát lại nhan sắc Tôi rất hài lòng với chất lượng dịch vụ.', 'Dignissimos asperiores vitae velit veniam totam fuga molestias accusamus alias autem provident. Odit ab aliquam dolor eius.', 'Dignissimos asperiores는 당신의 이름을 알리 덤불로 바꾸어줍니다. Odit ab aliquam dolor eius.', 0, 1, 1406082082, 0),
(8, 'NGuyễn Phương Hằng', '', 'phuonghang94@gmail.com', 1, 'Từ khi sử dụng dịch vụ của Quyền Quyền tôi Tốn rất ít thời gian để chăm sóc sắc đẹp mỗi buổi sáng tôi chỉ cần bỏ ra 5-10 phút để tút tát lại nhan sắc Tôi rất hài lòng với chất lượng dịch vụ.', '', '', 0, 1, 1406082103, 0),
(9, 'Nguyễn Văn Hùng', '', 'hungnv@gmail.com', 1, 'Từ khi sử dụng dịch vụ của Quyền Quyền tôi Tốn rất ít thời gian để chăm sóc sắc đẹp mỗi buổi sáng tôi chỉ cần bỏ ra 5-10 phút để tút tát lại nhan sắc Tôi rất hài lòng với chất lượng dịch vụ.', '', '', 1, 1, 1406082141, 5),
(10, 'Lê Hoàng yến', '', 'yenlh@gmail.com', 2, '&lt;script&gt;alert(''a'');&lt;/script&gt;', '', '', 0, 1, 1406082609, 0);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `feedback`
--
ALTER TABLE `feedback`
  ADD PRIMARY KEY (`fee_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `feedback`
--
ALTER TABLE `feedback`
  MODIFY `fee_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
