-- phpMyAdmin SQL Dump
-- version 4.1.12
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: May 08, 2018 at 04:36 AM
-- Server version: 5.6.16
-- PHP Version: 5.5.11

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `vienduongcatba`
--

-- --------------------------------------------------------

--
-- Table structure for table `manage_book_room`
--

CREATE TABLE IF NOT EXISTS `manage_book_room` (
  `row_id` int(11) NOT NULL AUTO_INCREMENT,
  `custumer_phone` varchar(15) COLLATE utf8_unicode_ci NOT NULL,
  `custumer_email` varchar(250) COLLATE utf8_unicode_ci NOT NULL,
  `checkin_date` datetime NOT NULL,
  `checkout_date` datetime NOT NULL,
  `number_of_custumer` int(11) NOT NULL,
  `book_room_status` int(11) NOT NULL DEFAULT '99' COMMENT '99: dang cho dat phong, 1: da duyet dat phong, -1: tu choi dat phong, 2: da nhan phong, 3: da tra phong va thanh toan du',
  `amount_deposit` int(11) NOT NULL COMMENT 'so tien dat coc',
  `custumer_bank_account` varchar(50) COLLATE utf8_unicode_ci NOT NULL COMMENT 'so tai khoan/so the ngan hang cua khach hang',
  `list_room_accept` varchar(250) COLLATE utf8_unicode_ci NOT NULL COMMENT 'danh sach phong dat cho khach',
  `custumer_note` blob NOT NULL COMMENT 'ghi chu them cua khach hang',
  `bill_id` varchar(100) COLLATE utf8_unicode_ci NOT NULL COMMENT 'ma hoa don thanh toan',
  `create_date` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`row_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=7 ;

--
-- Dumping data for table `manage_book_room`
--

INSERT INTO `manage_book_room` (`row_id`, `custumer_phone`, `custumer_email`, `checkin_date`, `checkout_date`, `number_of_custumer`, `book_room_status`, `amount_deposit`, `custumer_bank_account`, `list_room_accept`, `custumer_note`, `bill_id`, `create_date`) VALUES
(1, '0983627863', 'bookroom@mailinator.com', '2018-05-12 12:00:00', '2018-06-08 12:00:00', 0, 1, 0, '', '', '', '', '2018-05-04 15:03:33'),
(2, '0941105966', 'honda67@mailinato.com', '2018-05-04 07:21:00', '2018-05-25 06:19:00', 0, 99, 0, '', '', '', '', '2018-05-04 22:02:44'),
(3, '0983627863', 'phongwm@gmail.com', '2018-05-10 00:00:00', '2018-05-10 00:00:00', 0, 99, 0, '', '', '', '', '2018-05-07 11:50:51'),
(4, '0948607727', 'test03134@mailinator.com', '2018-05-08 00:00:00', '2018-05-31 00:00:00', 0, 99, 0, '', '', '', '', '2018-05-07 11:51:37'),
(5, '0909668901', 'phongnt@mailinator.com', '2018-05-08 00:00:00', '2018-05-10 00:00:00', 0, 99, 0, '', '', '', '', '2018-05-07 13:57:17'),
(6, '0967876123', 'testsendmail@mailinator.com', '2018-05-24 00:00:00', '2018-05-26 00:00:00', 0, 99, 0, '', '', '', '', '2018-05-07 20:11:04');

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
