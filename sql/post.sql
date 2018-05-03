-- phpMyAdmin SQL Dump
-- version 4.5.1
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: May 03, 2018 at 12:31 PM
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
-- Table structure for table `post`
--
DROP TABLE post;
CREATE TABLE `post` (
  `pos_id` int(11) NOT NULL,
  `pos_cat_id` int(11) DEFAULT NULL,
  `pos_title` varchar(255) DEFAULT NULL,
  `pos_title_en` varchar(255) NOT NULL,
  `pos_alias` varchar(255) DEFAULT NULL,
  `pos_summary` varchar(255) DEFAULT NULL,
  `pos_summary_en` text NOT NULL,
  `pos_detail` text,
  `pos_detail_en` text NOT NULL,
  `pos_title_ko` varchar(255) NOT NULL,
  `pos_summary_ko` text NOT NULL,
  `pos_detail_ko` text NOT NULL,
  `pos_image` varchar(255) DEFAULT NULL,
  `pos_image_cover` varchar(255) NOT NULL,
  `pos_date` int(11) DEFAULT NULL,
  `pos_tags` varchar(255) DEFAULT NULL,
  `pos_adm_id` int(11) DEFAULT '0',
  `pos_hot` tinyint(4) DEFAULT '0',
  `pos_active` tinyint(4) DEFAULT '0'
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

--
-- Dumping data for table `post`
--

INSERT INTO `post` (`pos_id`, `pos_cat_id`, `pos_title`, `pos_title_en`, `pos_alias`, `pos_summary`, `pos_summary_en`, `pos_detail`, `pos_detail_en`, `pos_title_ko`, `pos_summary_ko`, `pos_detail_ko`, `pos_image`, `pos_image_cover`, `pos_date`, `pos_tags`, `pos_adm_id`, `pos_hot`, `pos_active`) VALUES
(1, NULL, 'Mừng ngày phụ nữ việt nam 8/3', 'English', 'mung-ngay-phu-nu-viet-nam-8-3', '', '', '<p>aaa</p>', '', '해피 여성의 날 베트남 8/3', '해피 여성의 날 베트남 8/3', '해피 여성의 날 베트남 8/3', '/media/images/2018/05/blog-3.jpg', '', 1427687270, '', 0, 1, 1),
(2, NULL, 'Sự kiện tôn vinh chị em phụ nữ đang làm việc tại nhân Epay ngày 8/3', 'English', 'mung-ngay-phu-nu-viet-nam-8-3-1', 'Tóm tắt tin tức ở đây', 'Revolutions of the bright points that first defined him to me. And beneath the effulgent Antarctic skies I have boarded the Argo-Navis, and joined the chase against the starry Cetus far beyond the utmost stretch of Hydrus and the Flying Fish....', '<p>Chi tiết tin tức ở đây</p>', '<p>Revolutions of the bright points that first defined him to me. And beneath the effulgent Antarctic skies I have boarded the Argo-Navis, and joined the chase against the starry Cetus far beyond the utmost stretch of Hydrus and the Flying Fish....</p>', '', '', '', '/media/images/2018/05/blog-2.jpg', '', 1427699405, '', 0, 0, 1),
(3, NULL, 'Tin mới', 'new', 'tin-moi', 'a', 'a', '<p>aa<img style="max-width: 100%;" title="" src="../../../media/images/2015/03/vision2.png" alt="" /></p>', '', '', '', '', '/media/images/2018/05/blog-1.jpg', '/media/images/2015/03/news_detail.jpg', 1427710927, '', 0, 0, 1);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `post`
--
ALTER TABLE `post`
  ADD PRIMARY KEY (`pos_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `post`
--
ALTER TABLE `post`
  MODIFY `pos_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
