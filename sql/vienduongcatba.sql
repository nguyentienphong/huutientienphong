-- phpMyAdmin SQL Dump
-- version 4.5.1
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: May 02, 2018 at 09:29 AM
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
-- Table structure for table `aboutus`
--

CREATE TABLE `aboutus` (
  `abu_id` int(11) NOT NULL,
  `abu_summary` text NOT NULL,
  `abu_summary_en` text NOT NULL,
  `abu_content` text NOT NULL,
  `abu_content_en` text NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

--
-- Dumping data for table `aboutus`
--

INSERT INTO `aboutus` (`abu_id`, `abu_summary`, `abu_summary_en`, `abu_content`, `abu_content_en`) VALUES
(1, '<p>Công ty Cổ phần Thanh toán điện tử VNPT (VNPT EPAY) được thành lập bởi Tập đoàn Bưu chính Viễn thông Việt Nam (VNPT), Tập đoàn Truyền thông VMG, Công ty Thông tin Di động (VMS), … Ngay từ khi thành lập, VNPT EPAY đã chú trọng đầu tư, xây dựng cơ sở hạ tầng kỹ thuật, mở rộng kết nối và không ngừng phát triển để trở thành nhà cung cấp dịch vụ thanh toán điện tử hàng đầu tại Việt Nam với mục tiêu mang đến những tiện ích tốt nhất cho khách hàng và lợi ích cho cộng đồng.</p>', '<p>English</p>', '<div class="col-md-6">\r\n<p><strong>Công ty Cổ phần Thanh toán điện tử VNPT (VNPT EPAY) được thành lập bởi Tập đoàn Bưu chính Viễn thông Việt Nam (VNPT), Công ty Thông tin Di động (VMS), Công ty Cổ phần Truyền thông VMG và các Cổ đông khác. Ngay từ khi thành lập, VNPT EPAY đã chú trọng đầu tư, xây dựng cơ sở hạ tầng kỹ thuật, mở rộng kết nối và không ngừng phát triển để trở thành nhà cung cấp dịch vụ thanh toán điện tử hàng đầu tại Việt Nam với mục tiêu mang đến những tiện ích tốt nhất cho khách hàng và lợi ích cho cộng đồng.</strong></p>\r\n<p>Đồng hành với sự phát triển chung của đất nước, hoà nhịp cùng xu hướng thực hiện thanh toán không dùng tiền mặt, với mong muốn trao sản phẩm, dịch vụ đến tay khách hàng, VNPT EPAY phát triển và cung cấp dịch vụ thanh toán điện tử với những ứng dụng công nghệ tiên tiến nhất. Các dịch vụ bao gồm:<br />- Dịch vụ chấp nhận thẻ<br />- Thanh toán trực tuyến<br />- Thanh toán di động<br />- Phát hành thẻ: thẻ tích điểm chămsóc khách hàng; thẻ nạp đa năng Megacard nạp tiền cho 05 mạng di động lớn nhất tại Việt Nam, nạp tiền cho các game online, thanh toán cho các dịch vụ trực tuyến....</p>\r\n<p>Với khả năng kết nối rộng khắp, an toàn, chính xác, giao dịch bằng loại hình thanh toán điện tử sẽ dần thay thế hoạt động thanh toán truyền thống, đem lại lợi ích to lớn cho các doanh nghiệp, cá nhân trong giao dịch thanh toán</p>\r\n<p>Bên cạnh việc xác định chiến lược phát triển phù hợp, VNPT EPAY luôn chú trọng phát triển và hoàn thiện kỹ năng chuyên nghiệp cho nhân viên, áp dụng phương pháp quản lý điều hành hiện đại và xây dựng mối quan hệ hợp tác toàn diện với tất cả khách hàng. Dịch vụ của VNPT EPAY sẽ mang lại cho mọi người nhiều thời gian quý giá để nghỉ ngơi và thư giãn bên gia đình, bạn bè – góp phần tạo nên một cuộc sống ngập tràn ý nghĩa.</p>\r\n</div>\r\n<div class="col-md-6">\r\n<p>      <img style="max-width: 100%;" title="" src="../../../media/images/2015/03/intro1.jpg" alt="" /></p>\r\n<p>      <img style="max-width: 100%;" title="" src="../../../media/images/2015/03/intro2.jpg" alt="" /></p>\r\n<p> </p>\r\n</div>', '<div class="col-md-6">\r\n<p><strong>Công ty Cổ phần Thanh toán điện tử VNPT (VNPT EPAY) được thành lập bởi Tập đoàn Bưu chính Viễn thông Việt Nam (VNPT), Công ty Thông tin Di động (VMS), Công ty Cổ phần Truyền thông VMG và các Cổ đông khác. Ngay từ khi thành lập, VNPT EPAY đã chú trọng đầu tư, xây dựng cơ sở hạ tầng kỹ thuật, mở rộng kết nối và không ngừng phát triển để trở thành nhà cung cấp dịch vụ thanh toán điện tử hàng đầu tại Việt Nam với mục tiêu mang đến những tiện ích tốt nhất cho khách hàng và lợi ích cho cộng đồng.</strong></p>\r\n<p>Đồng hành với sự phát triển chung của đất nước, hoà nhịp cùng xu hướng thực hiện thanh toán không dùng tiền mặt, với mong muốn trao sản phẩm, dịch vụ đến tay khách hàng, VNPT EPAY phát triển và cung cấp dịch vụ thanh toán điện tử với những ứng dụng công nghệ tiên tiến nhất. Các dịch vụ bao gồm:<br />- Dịch vụ chấp nhận thẻ<br />- Thanh toán trực tuyến<br />- Thanh toán di động<br />- Phát hành thẻ: thẻ tích điểm chămsóc khách hàng; thẻ nạp đa năng Megacard nạp tiền cho 05 mạng di động lớn nhất tại Việt Nam, nạp tiền cho các game online, thanh toán cho các dịch vụ trực tuyến....</p>\r\n<p>Với khả năng kết nối rộng khắp, an toàn, chính xác, giao dịch bằng loại hình thanh toán điện tử sẽ dần thay thế hoạt động thanh toán truyền thống, đem lại lợi ích to lớn cho các doanh nghiệp, cá nhân trong giao dịch thanh toán</p>\r\n<p>Bên cạnh việc xác định chiến lược phát triển phù hợp, VNPT EPAY luôn chú trọng phát triển và hoàn thiện kỹ năng chuyên nghiệp cho nhân viên, áp dụng phương pháp quản lý điều hành hiện đại và xây dựng mối quan hệ hợp tác toàn diện với tất cả khách hàng. Dịch vụ của VNPT EPAY sẽ mang lại cho mọi người nhiều thời gian quý giá để nghỉ ngơi và thư giãn bên gia đình, bạn bè – góp phần tạo nên một cuộc sống ngập tràn ý nghĩa.</p>\r\n</div>\r\n<div class="col-md-6">\r\n<p>      <img style="max-width: 100%;" title="" src="../../../media/images/2015/03/intro1.jpg" alt="" /></p>\r\n<p>      <img style="max-width: 100%;" title="" src="../../../media/images/2015/03/intro2.jpg" alt="" /></p>\r\n<p> </p>\r\n</div>\r\n<p><br /><br /></p>');

-- --------------------------------------------------------

--
-- Table structure for table `accessory`
--

CREATE TABLE `accessory` (
  `acc_pro_id` int(11) NOT NULL,
  `acc_string` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `admin_users`
--

CREATE TABLE `admin_users` (
  `adm_id` tinyint(4) NOT NULL,
  `adm_avatar` varchar(255) NOT NULL,
  `adm_loginname` varchar(255) DEFAULT NULL,
  `adm_password` varchar(255) DEFAULT NULL,
  `adm_mail` varchar(255) DEFAULT NULL,
  `adm_name` varchar(255) DEFAULT NULL,
  `adm_phone` varchar(255) DEFAULT NULL,
  `adm_birthday` int(11) DEFAULT NULL,
  `adm_isadmin` tinyint(1) NOT NULL,
  `adm_active` tinyint(1) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

--
-- Dumping data for table `admin_users`
--

INSERT INTO `admin_users` (`adm_id`, `adm_avatar`, `adm_loginname`, `adm_password`, `adm_mail`, `adm_name`, `adm_phone`, `adm_birthday`, `adm_isadmin`, `adm_active`) VALUES
(1, '', 'admin', 'e10adc3949ba59abbe56e057f20f883e', NULL, NULL, NULL, NULL, 1, 0),
(2, '', 'kelvin', 'e10adc3949ba59abbe56e057f20f883e', 'a', 'a', 'a', 1150946977, 0, 1),
(3, 'nvq1403000332.jpg', 'tiennh', '612d25dfcee88705c06289073568bf0e', 'a', 'a', 'a', 1402913932, 0, 1);

-- --------------------------------------------------------

--
-- Table structure for table `admin_users_right`
--

CREATE TABLE `admin_users_right` (
  `adu_admin_id` int(11) NOT NULL DEFAULT '0',
  `adu_admin_module_id` int(11) DEFAULT NULL,
  `adu_admin_edit` tinyint(4) DEFAULT NULL,
  `adu_admin_add` tinyint(4) DEFAULT NULL,
  `adu_admin_delete` tinyint(4) DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

--
-- Dumping data for table `admin_users_right`
--

INSERT INTO `admin_users_right` (`adu_admin_id`, `adu_admin_module_id`, `adu_admin_edit`, `adu_admin_add`, `adu_admin_delete`) VALUES
(2, 16, 1, 1, 1),
(2, 15, 1, 1, 1),
(2, 14, 1, 1, 1),
(2, 2, 1, 1, 1);

-- --------------------------------------------------------

--
-- Table structure for table `advertising`
--

CREATE TABLE `advertising` (
  `adv_id` int(11) NOT NULL,
  `adv_position` int(11) NOT NULL DEFAULT '0',
  `adv_type` int(11) NOT NULL DEFAULT '0',
  `adv_picture` varchar(255) DEFAULT NULL,
  `adv_source` varchar(255) NOT NULL,
  `adv_link` varchar(255) DEFAULT NULL,
  `adv_start` int(11) NOT NULL,
  `adv_end` int(11) NOT NULL,
  `adv_category` varchar(255) NOT NULL,
  `adv_active` int(11) NOT NULL DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `advertising`
--

INSERT INTO `advertising` (`adv_id`, `adv_position`, `adv_type`, `adv_picture`, `adv_source`, `adv_link`, `adv_start`, `adv_end`, `adv_category`, `adv_active`) VALUES
(1, 2, 0, 'dlq1379950158.jpg', 'abc', 'http://localhost:8010/home/check_payment.php', 1374593659, 1436974459, '0,1,6,2,3,4', 1),
(2, 3, 0, 'dje1379950149.jpg', 'def', '#', 1379950453, 1568820853, '0,1,5,6,7,8,2,9,10,11,12,13,14,15,16,17,18,3,19,20,4,21,22', 1),
(3, 1, 0, 'xxx1379950180.gif', 'dfdfd', '#', 1379950445, 1443627245, '0,1,5,6,7,8,2,9,10,11,12,13,14,15,16,17,18,3,19,20,4,21,22', 1);

-- --------------------------------------------------------

--
-- Table structure for table `analytics`
--

CREATE TABLE `analytics` (
  `ana_id` int(15) NOT NULL,
  `ana_ip` varchar(255) DEFAULT NULL,
  `ana_day` int(11) DEFAULT NULL,
  `ana_month` int(11) DEFAULT NULL,
  `ana_year` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `analytics`
--

INSERT INTO `analytics` (`ana_id`, `ana_ip`, `ana_day`, `ana_month`, `ana_year`) VALUES
(1, '::1', 6, 6, 2014),
(2, '::23', 1, 6, 2014),
(3, '::30', 1, 6, 2014),
(4, '::8', 1, 6, 2014),
(5, '::92', 1, 6, 2014),
(6, '::10', 1, 6, 2014),
(7, '::98', 1, 6, 2014),
(8, '::42', 1, 6, 2014),
(9, '::11', 1, 6, 2014),
(10, '::5', 1, 6, 2014),
(11, '::84', 1, 6, 2014),
(12, '::57', 1, 6, 2014),
(13, '::49', 1, 6, 2014),
(14, '::93', 1, 6, 2014),
(15, '::81', 1, 6, 2014),
(16, '::15', 1, 6, 2014),
(17, '::9', 2, 6, 2014),
(18, '::38', 2, 6, 2014),
(19, '::22', 2, 6, 2014),
(20, '::24', 2, 6, 2014),
(21, '::35', 2, 6, 2014),
(22, '::50', 2, 6, 2014),
(23, '::39', 2, 6, 2014),
(24, '::53', 2, 6, 2014),
(25, '::8', 2, 6, 2014),
(26, '::65', 2, 6, 2014),
(27, '::76', 2, 6, 2014),
(28, '::90', 2, 6, 2014),
(29, '::11', 2, 6, 2014),
(30, '::80', 2, 6, 2014),
(31, '::91', 2, 6, 2014),
(32, '::8', 2, 6, 2014),
(33, '::43', 2, 6, 2014),
(34, '::94', 2, 6, 2014),
(35, '::27', 2, 6, 2014),
(36, '::95', 2, 6, 2014),
(37, '::48', 2, 6, 2014),
(38, '::46', 2, 6, 2014),
(39, '::18', 2, 6, 2014),
(40, '::95', 2, 6, 2014),
(41, '::44', 2, 6, 2014),
(42, '::54', 2, 6, 2014),
(43, '::5', 2, 6, 2014),
(44, '::63', 2, 6, 2014),
(45, '::27', 2, 6, 2014),
(46, '::78', 2, 6, 2014),
(47, '::59', 2, 6, 2014),
(48, '::34', 2, 6, 2014),
(49, '::28', 3, 6, 2014),
(50, '::2', 3, 6, 2014),
(51, '::90', 3, 6, 2014),
(52, '::92', 3, 6, 2014),
(53, '::62', 3, 6, 2014),
(54, '::5', 3, 6, 2014),
(55, '::67', 3, 6, 2014),
(56, '::20', 3, 6, 2014),
(57, '::91', 3, 6, 2014),
(58, '::50', 4, 6, 2014),
(59, '::21', 4, 6, 2014),
(60, '::73', 4, 6, 2014),
(61, '::31', 4, 6, 2014),
(62, '::73', 4, 6, 2014),
(63, '::43', 4, 6, 2014),
(64, '::20', 4, 6, 2014),
(65, '::48', 4, 6, 2014),
(66, '::20', 4, 6, 2014),
(67, '::84', 4, 6, 2014),
(68, '::87', 4, 6, 2014),
(69, '::14', 4, 6, 2014),
(70, '::24', 4, 6, 2014),
(71, '::91', 4, 6, 2014),
(72, '::87', 4, 6, 2014),
(73, '::49', 4, 6, 2014),
(74, '::71', 4, 6, 2014),
(75, '::60', 4, 6, 2014),
(76, '::79', 4, 6, 2014),
(77, '::96', 5, 6, 2014),
(78, '::39', 5, 6, 2014),
(79, '::71', 5, 6, 2014),
(80, '::67', 5, 6, 2014),
(81, '::82', 5, 6, 2014),
(82, '::24', 5, 6, 2014),
(83, '::44', 6, 6, 2014),
(84, '::65', 6, 6, 2014),
(85, '::60', 6, 6, 2014),
(86, '::44', 6, 6, 2014),
(87, '::78', 6, 6, 2014),
(88, '::67', 6, 6, 2014),
(89, '::1', 6, 6, 2014),
(90, '127.0.0.1', 13, 6, 2014),
(91, '127.0.0.1', 13, 6, 2014),
(92, '127.0.0.1', 16, 6, 2014),
(93, '127.0.0.1', 16, 6, 2014),
(94, '127.0.0.1', 16, 6, 2014),
(95, '127.0.0.1', 16, 6, 2014),
(96, '127.0.0.1', 16, 6, 2014),
(97, '127.0.0.1', 17, 6, 2014),
(98, '127.0.0.1', 19, 6, 2014),
(99, '127.0.0.1', 19, 6, 2014),
(100, '127.0.0.1', 23, 6, 2014),
(101, '127.0.0.1', 23, 6, 2014),
(102, '127.0.0.1', 1, 7, 2014),
(103, '127.0.0.1', 1, 7, 2014),
(104, '127.0.0.1', 8, 7, 2014),
(105, '127.0.0.1', 8, 7, 2014),
(106, '127.0.0.1', 9, 7, 2014),
(107, '127.0.0.1', 14, 7, 2014),
(108, '127.0.0.1', 14, 7, 2014),
(109, '127.0.0.1', 14, 7, 2014),
(110, '127.0.0.1', 16, 7, 2014),
(111, '127.0.0.1', 16, 7, 2014),
(112, '127.0.0.1', 21, 7, 2014),
(113, '127.0.0.1', 21, 7, 2014),
(114, '127.0.0.1', 22, 7, 2014),
(115, '127.0.0.1', 22, 7, 2014),
(116, '127.0.0.1', 22, 7, 2014),
(117, '127.0.0.1', 23, 7, 2014),
(118, '127.0.0.1', 23, 7, 2014),
(119, '127.0.0.1', 23, 7, 2014),
(120, '127.0.0.1', 24, 7, 2014),
(121, '127.0.0.1', 24, 7, 2014),
(122, '127.0.0.1', 24, 7, 2014),
(123, '127.0.0.1', 25, 7, 2014),
(124, '127.0.0.1', 25, 7, 2014),
(125, '127.0.0.1', 25, 7, 2014),
(126, '127.0.0.1', 26, 7, 2014),
(127, '127.0.0.1', 26, 7, 2014),
(128, '127.0.0.1', 26, 7, 2014),
(129, '127.0.0.1', 28, 7, 2014),
(130, '127.0.0.1', 28, 7, 2014),
(131, '127.0.0.1', 31, 7, 2014),
(132, '127.0.0.1', 30, 12, 2014),
(133, '127.0.0.1', 31, 12, 2014),
(134, '127.0.0.1', 5, 1, 2015),
(135, '127.0.0.1', 6, 1, 2015),
(136, '127.0.0.1', 6, 1, 2015),
(137, '127.0.0.1', 6, 1, 2015),
(138, '127.0.0.1', 7, 1, 2015),
(139, '127.0.0.1', 7, 1, 2015),
(140, '127.0.0.1', 8, 1, 2015),
(141, '127.0.0.1', 8, 1, 2015),
(142, '127.0.0.1', 8, 1, 2015),
(143, '127.0.0.1', 9, 1, 2015),
(144, '127.0.0.1', 9, 1, 2015),
(145, '127.0.0.1', 10, 1, 2015),
(146, '127.0.0.1', 12, 1, 2015),
(147, '127.0.0.1', 12, 1, 2015),
(148, '127.0.0.1', 13, 1, 2015),
(149, '127.0.0.1', 13, 1, 2015),
(150, '127.0.0.1', 13, 1, 2015),
(151, '127.0.0.1', 14, 1, 2015),
(152, '127.0.0.1', 15, 1, 2015),
(153, '127.0.0.1', 16, 1, 2015),
(154, '127.0.0.1', 16, 1, 2015),
(155, '127.0.0.1', 16, 1, 2015),
(156, '127.0.0.1', 17, 1, 2015),
(157, '127.0.0.1', 19, 1, 2015),
(158, '127.0.0.1', 19, 1, 2015),
(159, '127.0.0.1', 19, 1, 2015),
(160, '127.0.0.1', 20, 1, 2015),
(161, '127.0.0.1', 30, 1, 2015),
(162, '127.0.0.1', 6, 2, 2015),
(163, '127.0.0.1', 13, 3, 2015),
(164, '127.0.0.1', 27, 3, 2015),
(165, '127.0.0.1', 29, 3, 2015),
(166, '127.0.0.1', 30, 3, 2015),
(167, '127.0.0.1', 31, 3, 2015),
(168, '127.0.0.1', 31, 3, 2015),
(169, '127.0.0.1', 31, 3, 2015),
(170, '127.0.0.1', 1, 4, 2015),
(171, '127.0.0.1', 1, 4, 2015),
(172, '127.0.0.1', 2, 4, 2015),
(173, '127.0.0.1', 3, 4, 2015),
(174, '127.0.0.1', 3, 4, 2015),
(175, '127.0.0.1', 4, 4, 2015),
(176, '127.0.0.1', 6, 4, 2015),
(177, '127.0.0.1', 6, 4, 2015),
(178, '127.0.0.1', 6, 4, 2015),
(179, '127.0.0.1', 6, 4, 2015),
(180, '::1', 10, 8, 2016),
(181, '::1', 20, 9, 2016),
(182, '::1', 20, 9, 2016),
(183, '::1', 22, 9, 2016),
(184, '::1', 22, 9, 2016),
(185, '::1', 26, 9, 2016),
(186, '::1', 9, 12, 2016),
(187, '::1', 19, 12, 2016),
(188, '::1', 20, 12, 2016),
(189, '::1', 16, 3, 2017),
(190, '::1', 20, 10, 2017),
(191, '::1', 25, 10, 2017),
(192, '::1', 28, 10, 2017),
(193, '::1', 28, 4, 2018),
(194, '::1', 2, 5, 2018),
(195, '::1', 2, 5, 2018);

-- --------------------------------------------------------

--
-- Table structure for table `categories`
--

CREATE TABLE `categories` (
  `cat_id` int(11) NOT NULL,
  `cat_name` varchar(255) DEFAULT NULL,
  `cat_name_en` varchar(255) NOT NULL,
  `cat_alias` varchar(255) DEFAULT NULL,
  `cat_order` int(5) DEFAULT '0',
  `cat_parent_id` int(11) DEFAULT NULL,
  `cat_has_child` tinyint(4) DEFAULT '1',
  `cat_adm_id` int(11) DEFAULT NULL,
  `cat_type` varchar(255) DEFAULT NULL,
  `cat_image` varchar(255) DEFAULT NULL,
  `cat_description` text,
  `cat_description_en` text NOT NULL,
  `cat_active` tinyint(4) DEFAULT '1',
  `lang_id` tinyint(4) DEFAULT '1'
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

--
-- Dumping data for table `categories`
--

INSERT INTO `categories` (`cat_id`, `cat_name`, `cat_name_en`, `cat_alias`, `cat_order`, `cat_parent_id`, `cat_has_child`, `cat_adm_id`, `cat_type`, `cat_image`, `cat_description`, `cat_description_en`, `cat_active`, `lang_id`) VALUES
(1, 'Dịch vụ thanh toán', 'payment', 'dich-vu-thanh-toan', 1, 0, 1, NULL, 'services', '', '<p>MegaBank – Cổng thanh toán ngân hàng là cổng thanh toán điện tử do VNPT EPAY xây dựng và phát triển</p>', '<p>MegaBank – English</p>', 1, 1),
(2, 'Ví điện tử', 'electronic wallet', 'vi-dien-tu', 3, 0, 1, NULL, 'services', '', '<p>MegaBank – Cổng thanh toán ngân hàng là cổng thanh toán điện tử do VNPT EPAY xây dựng và phát triển</p>', '', 1, 1),
(3, 'Trang chủ', '', 'trang-chu', 0, 0, 1, NULL, 'slides', '', '', '', 1, 1),
(4, 'Trang giới thiệu', '', 'trang-gioi-thieu', 0, 0, 1, NULL, 'slides', '', '', '', 1, 1),
(5, 'Trang tầm nhìn sứ mệnh', '', 'trang-tam-nhin-su-menh', 0, 0, 1, NULL, 'slides', '', '', '', 1, 1),
(6, 'Trang văn hóa doanh nghiệp', '', 'trang-van-hoa-doanh-nghiep', 0, 0, 1, NULL, 'slides', '', '', '', 1, 1),
(7, 'Trang đối tác', '', 'trang-doi-tac', 0, 0, 1, NULL, 'slides', '', '', '', 1, 1),
(8, 'Dịch vụ Top Up', 'Top up', 'dich-vu-top-up', 2, 0, 1, NULL, 'services', '', '<p>VNPT EPAY TỰ HÀO PHÁT TRIỂN HỆ THỐNG THANH TOÁN ĐIỆN TỬ ĐA DẠNG ĐÁP ỨNG NHIỀU NHU CẦU KHÁC NHAU, ĐẢM BẢO<br />NHU CẦU THANH TOÁN CỦA NGƯỜI DÙNG TRÊN INTERNET</p>', '', 1, 1),
(9, 'Thẻ megacard', 'megacard', 'the-megacard', 4, 0, 1, NULL, 'services', '', '<p>VNPT EPAY TỰ HÀO PHÁT TRIỂN HỆ THỐNG THANH TOÁN ĐIỆN TỬ ĐA DẠNG ĐÁP ỨNG NHIỀU NHU CẦU KHÁC NHAU, ĐẢM BẢO<br />NHU CẦU THANH TOÁN CỦA NGƯỜI DÙNG TRÊN INTERNET</p>', '', 1, 1),
(10, 'Lập trình viên IOS', '', 'lap-trinh-vien-ios', 0, 0, 1, NULL, 'recruitment', '', '', '', 1, 1),
(11, 'Nhân viên kế toán', '', 'nhan-vien-ke-toan', 0, 0, 1, NULL, 'recruitment', '', '', '', 1, 1),
(12, 'Chuyên viên thiết kế', '', 'chuyen-vien-thiet-ke', 0, 0, 1, NULL, 'recruitment', '', '', '', 1, 1),
(13, 'SHIPANTOAN', '', 'shipantoan', 5, 0, 1, NULL, 'services', '', '<p> Hạn chế rủi ro chuyển hoàn qua tính năng đặt cọc giao dịch, thanh toán bằng thẻ cào</p>', '', 1, 1);

-- --------------------------------------------------------

--
-- Table structure for table `configuration`
--

CREATE TABLE `configuration` (
  `con_id` int(11) NOT NULL DEFAULT '0',
  `con_title` varchar(255) DEFAULT NULL,
  `con_value` text,
  `con_type` varchar(255) DEFAULT NULL,
  `con_help` varchar(255) DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

--
-- Dumping data for table `configuration`
--

INSERT INTO `configuration` (`con_id`, `con_title`, `con_value`, `con_type`, `con_help`) VALUES
(1, 'Cấu hình SEO', 'eyJtZXRhX2tleXdvcmQiOiIiLCJ0aXRsZV9zaXRlIjoid2Vic2l0ZSB0cnVuZyB0XHUwMGUybSB0aVx1MWViZm5nIGFuaCIsIm1ldGFfZGVzY3JpcHRpb24iOiIiLCJtZXRhX2F1dGhvciI6IiIsIm1ldGFfY29weXJpZ2h0IjoiIiwiZmF2aWNvbiI6ImZhdmljb24uaWNvIn0=', 'seo', 'hỗ trợ SEO cho website'),
(2, 'Cấu hình liên hệ', 'eyJhZGRyZXNzIjoiMjA3IE5ndXlcdTFlYzVuIEJcdTAwZWRuaCwgVHAgTmFtIFx1MDExMFx1MWVjYm5oIiwibWFwcyI6MCwicGhvbmUiOiIiLCJtb2JpbGUiOiIiLCJob3RsaW5lIjoiIiwiZmF4IjoiIiwiZW1haWwiOiIiLCJ5YWhvbyI6IiIsInNreXBlIjoiIn0=', 'contact', 'Thêm email, phone, địa chỉ... cho website'),
(3, 'Thông tin footer', 'eyJwb3NpdGlvbiI6InJpZ2h0IiwiY3VzdG9tX21lbnUiOnsibGFiZWwiOiIiLCJsaW5rIjoiIn0sInNob3dtZW51IjoxLCJjb250ZW50IjoiPGRpdiBjbGFzcz1cImJveF9mb290ZXJcIj5cclxuPGgyIGNsYXNzPVwiYm94X2Zvb3Rlcl90aXRsZVwiPlx1MDExMFx1MWVjYmEgY2hcdTFlYzkgbXVhIGgmYWdyYXZlO25nPFwvaDI+XHJcbjx1bD5cclxuPGxpPjxhIGhyZWY9XCIjXCI+JnJhcXVvOyBIJmFncmF2ZTsgTlx1MWVkOWkgLSA2OCBDXHUxZWE3dSBHaVx1MWVhNXk8XC9hPmE8XC9saT5cclxuPGxpPjxhIGhyZWY9XCIjXCI+JnJhcXVvOyBIJmFncmF2ZTsgTlx1MWVkOWkgLSA2OCBDXHUxZWE3dSBHaVx1MWVhNXk8XC9hPjxcL2xpPlxyXG48bGk+PGEgaHJlZj1cIiNcIj4mcmFxdW87IEgmYWdyYXZlOyBOXHUxZWQ5aSAtIDY4IENcdTFlYTd1IEdpXHUxZWE1eTxcL2E+PFwvbGk+XHJcbjxsaT48YSBocmVmPVwiI1wiPiZyYXF1bzsgSCZhZ3JhdmU7IE5cdTFlZDlpIC0gNjggQ1x1MWVhN3UgR2lcdTFlYTV5PFwvYT48XC9saT5cclxuPGxpPjxhIGhyZWY9XCIjXCI+JnJhcXVvOyBIJmFncmF2ZTsgTlx1MWVkOWkgLSA2OCBDXHUxZWE3dSBHaVx1MWVhNXk8XC9hPjxcL2xpPlxyXG48XC91bD5cclxuPFwvZGl2PlxyXG48ZGl2IGNsYXNzPVwiYm94X2Zvb3RlclwiPlxyXG48aDIgY2xhc3M9XCJib3hfZm9vdGVyX3RpdGxlXCI+VGgmb2NpcmM7bmcgdGluIGRvYW5oIG5naGlcdTFlYzdwPFwvaDI+XHJcbjx1bD5cclxuPGxpPjxhIGhyZWY9XCIjXCI+R2lcdTFlYTV5IHBoJmVhY3V0ZTtwIGhvXHUxZWExdCBcdTAxMTFcdTFlZDluZzxcL2E+PFwvbGk+XHJcbjxsaT48YSBocmVmPVwiI1wiPkNcdTAxYTEgaFx1MWVkOWkgdmlcdTFlYzdjIGwmYWdyYXZlO208XC9hPjxcL2xpPlxyXG48XC91bD5cclxuPFwvZGl2PlxyXG48ZGl2IGNsYXNzPVwiYm94X2Zvb3RlclwiPlxyXG48aDIgY2xhc3M9XCJib3hfZm9vdGVyX3RpdGxlXCI+TGkmZWNpcmM7biBoXHUxZWM3IHYmYWdyYXZlOyBoXHUxZWQ3IHRyXHUxZWUzPFwvaDI+XHJcbjxwPlx1MDExMFx1MWViN3QgaCZhZ3JhdmU7bmcgdHJcdTFlZjFjIHR1eVx1MWViZm46IHNhbGVAZm9uZWNhcmUudm48YnIgXC8+RW1haWwga2hpXHUxZWJmdSBuXHUxZWExaTogZmVlZGJhY2tAZm9uZWNhcmUudm48YnIgXC8+SFx1MWVkNyB0clx1MWVlMyBrXHUxZWY5IHRodVx1MWVhZHQ6IDA0IC42NjY2IDg4ODg8YnIgXC8+SFx1MWVkNyB0clx1MWVlMyBrXHUxZWY5IHRodVx1MWVhZHQ6IDA0IC42NjY2IDg4ODg8YnIgXC8+SFx1MWVkNyB0clx1MWVlMyBrXHUxZWY5IHRodVx1MWVhZHQ6IDA0IC42NjY2IDg4ODg8XC9wPlxyXG48XC9kaXY+XHJcbjxkaXYgY2xhc3M9XCJuZXR3b3JrX3NvY2lhbFwiPlxyXG48aDIgY2xhc3M9XCJib3hfZm9vdGVyX3RpdGxlXCI+TGkmZWNpcmM7biBrXHUxZWJmdDxcL2gyPlxyXG48dWw+XHJcbjxsaT48YSBjbGFzcz1cInNmYlwiIGhyZWY9XCIjXCI+RmFjZWJvb2s8XC9hPjxcL2xpPlxyXG48bGk+PGEgY2xhc3M9XCJzeXRcIiBocmVmPVwiI1wiPllvdXR1YmU8XC9hPjxcL2xpPlxyXG48bGk+PGEgY2xhc3M9XCJzdHRcIiBocmVmPVwiI1wiPlRpbmggdFx1MWViZjxcL2E+PFwvbGk+XHJcbjxcL3VsPlxyXG48XC9kaXY+XHJcbjxkaXYgY2xhc3M9XCJjb3B5XCI+XHJcbjxoMz5Db3B5cmlnaHQgJmNvcHk7IDIwMTMgLSBGb25lQ2FyZS5WbiAtIEFsbCBSaWdodHMgUmVzZXJ2ZWQuPGJyIFwvPlRydW5nIHQmYWNpcmM7bSBEXHUxZWNiY2ggdlx1MWVlNSBCXHUxZWEzbyBoJmFncmF2ZTtuaCBcdTAxMTBpXHUxZWM3biB0aG9cdTFlYTFpPFwvaDM+XHJcbjxcL2Rpdj4ifQ==', 'footer', 'Thông tin ghi ở footer'),
(4, 'Bài giới thiệu', 'eyJjb250ZW50IjoiPHA+XHUwMTEwXHUwMWIwXHUxZWUzYyB0aCZhZ3JhdmU7bmggbFx1MWVhZHAgdFx1MWVlYiBuXHUwMTAzbSAxOTk2LCBjaCZ1YWN1dGU7bmcgdCZvY2lyYztpIGwmYWdyYXZlOyBtXHUxZWQ5dCB0cm9uZyBuaFx1MWVlZm5nIG5oJmFncmF2ZTsgcGgmYWNpcmM7biBwaFx1MWVkMWkgXHUwMTEwVERcdTAxMTAgXHUwMTExXHUxZWE3dSB0aSZlY2lyYztuIHRcdTFlYTFpIEgmYWdyYXZlOyBOXHUxZWQ5aSB2JmFncmF2ZTsga1x1MWVjMyB0XHUxZWViIG5cdTAxMDNtIDIwMDAsIGNoJnVhY3V0ZTtuZyB0Jm9jaXJjO2kgY2gmaWFjdXRlO25oIHRoXHUxZWU5YyB0clx1MWVkZiB0aCZhZ3JhdmU7bmggbmgmYWdyYXZlOyBwaCZhY2lyYztuIHBoXHUxZWQxaSBcdTAxMTBURFx1MDExMCBTYW1TdW5nICZuZGFzaDsgTWFzdGVyZGVhbGVyIGR1eSBuaFx1MWVhNXQgdFx1MWVhMWkgMTk0IFx1MDExMVx1MDFiMFx1MWVkZG5nIEwmZWNpcmM7IER1XHUxZWE5bi48XC9wPlxyXG48ZGl2IGNsYXNzPVwibWFya2V0XCI+XHJcbjxkaXYgY2xhc3M9XCJpbmZvXCI+XHJcbjxwPlZcdTFlZGJpIGJcdTFlYzEgZCZhZ3JhdmU7eSBnXHUxZWE3biAxMCBuXHUwMTAzbSBraW5oIG5naGlcdTFlYzdtIHYmYWdyYXZlOyB1eSB0JmlhY3V0ZTtuIFx1MDExMSZhdGlsZGU7IHRcdTFlYTFvIFx1MDExMVx1MDFiMFx1MWVlM2MgdHJvbmcgbmhcdTFlZWZuZyBuXHUwMTAzbSB2XHUxZWViYSBxdWEsIGNoJnVhY3V0ZTtuZyB0Jm9jaXJjO2kgbHUmb2NpcmM7biBcdTAxMTFlbSBsXHUxZWExaSBjaG8ga2gmYWFjdXRlO2NoIGgmYWdyYXZlO25nIHNcdTFlZjEgaCZhZ3JhdmU7aSBsJm9ncmF2ZTtuZyB2JmFncmF2ZTsgdGhcdTFlY2ZhIG0mYXRpbGRlO24gdlx1MWVkYmkgdFx1MWVhNXQgY1x1MWVhMyBjJmFhY3V0ZTtjIHNcdTFlYTNuIHBoXHUxZWE5bSBjXHUxZWU3YSBtJmlncmF2ZTtuaC48XC9wPlxyXG48cD5CJmVjaXJjO24gY1x1MWVhMW5oIFx1MDExMSZvYWN1dGU7IGwmYWdyYXZlOyBcdTAxMTFcdTFlZDlpIG5nXHUwMTY5IG5oJmFjaXJjO24gdmkmZWNpcmM7biBuaGlcdTFlYzd0IHQmaWdyYXZlO25oIGNodSBcdTAxMTEmYWFjdXRlO28gdiZhZ3JhdmU7IFx1MDExMVx1MWVhN3kga2luaCBuZ2hpXHUxZWM3bSBjXHUxZWU3YSBjaCZ1YWN1dGU7bmcgdCZvY2lyYztpIGx1Jm9jaXJjO24gXHUwMTExXHUwMWIwYSBcdTAxMTFcdTAxYjBcdTFlZTNjIHJhIGNobyBraCZhYWN1dGU7Y2ggaCZhZ3JhdmU7bmcgbmhcdTFlZWZuZyB0aCZvY2lyYztuZyB0aW4gYyZvYWN1dGU7IGdpJmFhY3V0ZTsgdHJcdTFlY2IgdiZhZ3JhdmU7IGdpJnVhY3V0ZTtwIGtoJmFhY3V0ZTtjaCBoJmFncmF2ZTtuZyBsXHUxZWYxYSBjaFx1MWVjZG4gXHUwMTExXHUwMWIwXHUxZWUzYyBuaFx1MWVlZm5nIHNcdTFlYTNuIHBoXHUxZWE5bSBwaCZ1Z3JhdmU7IGhcdTFlZTNwIG5oXHUxZWE1dC48XC9wPlxyXG48cD5cdTAxMTBcdTFlYzMgbiZhY2lyYztuZyBjYW8gdGhcdTAxYjBcdTAxYTFuZyBoaVx1MWVjN3UgY1x1MWVlN2EgbSZpZ3JhdmU7bmgsIG1cdTFlZTVjIHRpJmVjaXJjO3UgY1x1MWVlN2EgY2gmdWFjdXRlO25nIHQmb2NpcmM7aSB0cm9uZyB0aFx1MWVkZGkgZ2lhbiB0XHUxZWRiaSBsJmFncmF2ZTsgY3VuZyBjXHUxZWE1cCBcdTAxMTFcdTFlYmZuIHRcdTFlYWRuIHRheSBraCZhYWN1dGU7Y2ggaCZhZ3JhdmU7bmcgbmhcdTFlZWZuZyBzXHUxZWEzbiBwaFx1MWVhOW0gY2gmaWFjdXRlO25oIGgmYXRpbGRlO25nIHZcdTFlZGJpIGNoXHUxZWE1dCBsXHUwMWIwXHUxZWUzbmcgXHUwMTExXHUxZWEzbSBiXHUxZWEzbyB2JmFncmF2ZTsgdXkgdCZpYWN1dGU7biBjXHUwMTY5bmcgbmhcdTAxYjAgZ2kmYWFjdXRlOyBjXHUxZWEzIGhcdTFlZTNwIGwmeWFjdXRlOyBuaFx1MWVhNXQuPFwvcD5cclxuPHA+Q2gmdWFjdXRlO25nIHQmb2NpcmM7aSBtb25nIG11XHUxZWQxbiBzXHUxZWYxIFx1MDExMSZvYWN1dGU7bmcgZyZvYWN1dGU7cCBjXHUxZWU3YSBraCZhYWN1dGU7Y2ggaCZhZ3JhdmU7bmcgc1x1MWViZCBnaSZ1YWN1dGU7cCBjaCZ1YWN1dGU7bmcgdCZvY2lyYztpIG5nJmFncmF2ZTt5IG1cdTFlZDl0IHBoJmFhY3V0ZTt0IHRyaVx1MWVjM24gXHUwMTExXHUxZWMzIHRcdTFlZWIgXHUwMTExJm9hY3V0ZTsgY1x1MWVlN25nIGNcdTFlZDEgdGgmZWNpcmM7bSBsJm9ncmF2ZTtuZyB0aW4gY1x1MWVlN2Ega2gmYWFjdXRlO2NoIGgmYWdyYXZlO25nIHZcdTFlZGJpIGNoJnVhY3V0ZTtuZyB0Jm9jaXJjO2kuIENoJnVhY3V0ZTtuZyB0Jm9jaXJjO2kgclx1MWVhNXQgYmlcdTFlYmZ0IFx1MDFhMW4gc1x1MWVmMSB0aW4gdFx1MDFiMFx1MWVkZm5nIGNcdTFlZTdhIGtoJmFhY3V0ZTtjaCBoJmFncmF2ZTtuZyB0cm9uZyBzdVx1MWVkMXQgZ1x1MWVhN24gMTAgblx1MDEwM20gcXVhIHYmYWdyYXZlOyBjaCZ1YWN1dGU7bmcgdCZvY2lyYztpIGx1Jm9jaXJjO24gdCZhY2lyYzttIG5pXHUxZWM3bSByXHUxZWIxbmcgY1x1MWVhN24gcGhcdTFlYTNpIGNcdTFlZDEgZ1x1MWVhZm5nIGhcdTAxYTFuIG5cdTFlZWZhIFx1MDExMVx1MWVjMyB4XHUxZWU5bmcgXHUwMTExJmFhY3V0ZTtuZyB2XHUxZWRiaSBwaFx1MDFiMFx1MDFhMW5nIGNoJmFjaXJjO20gXHUwMTExXHUxZWMxIHJhICZsZHF1bztOXHUxZWJmdSBuaFx1MWVlZm5nIGcmaWdyYXZlOyBjaCZ1YWN1dGU7bmcgdCZvY2lyYztpIGtoJm9jaXJjO25nIGMmb2FjdXRlOywgbmdoXHUwMTI5YSBsJmFncmF2ZTsgYlx1MWVhMW4ga2gmb2NpcmM7bmcgY1x1MWVhN24mcmRxdW87IC48XC9wPlxyXG48cD5DaCZ1YWN1dGU7bmcgdCZvY2lyYztpIHhpbiBjaCZhY2lyYztuIHRoJmFncmF2ZTtuaCBjXHUxZWEzbSBcdTAxYTFuIHRcdTFlYTV0IGNcdTFlYTMgYyZhYWN1dGU7YyBraCZhYWN1dGU7Y2ggaCZhZ3JhdmU7bmcgXHUwMTExJmF0aWxkZTssIFx1MDExMWFuZyB2JmFncmF2ZTsgc1x1MWViZCBcdTFlZTduZyBoXHUxZWQ5IGNoJnVhY3V0ZTtuZyB0Jm9jaXJjO2kuPFwvcD5cclxuPHA+Jm5ic3A7PFwvcD5cclxuPFwvZGl2PlxyXG48aDI+RGFuaCBzJmFhY3V0ZTtjaCBjaGkgbmgmYWFjdXRlO25oIGNcdTFlZTdhIGMmb2NpcmM7bmcgdHk6PFwvaDI+XHJcbjxkaXYgY2xhc3M9XCJtYXJrZXQtaXRlbVwiPlxyXG48cCBjbGFzcz1cIm5hbWVcIj4zOTIgY1x1MWVhN3UgZ2lcdTFlYTV5IC0gMDk2OC4zMi4zMy45OSAtIDA0Mzc5MzkwNzkuPFwvcD5cclxuPHA+XHUwMTEwXHUxZWNiYSBjaFx1MWVjOTogMzkyIGNcdTFlYTd1IGdpXHUxZWE1eTxcL3A+XHJcbjxwPlx1MDExMGlcdTFlYzduIHRob1x1MWVhMWkgbGkmZWNpcmM7biBoXHUxZWM3OiAwOTY4LjMyLjMzLjk5PFwvcD5cclxuPHA+R2lcdTFlZGQgbCZhZ3JhdmU7bSB2aVx1MWVjN2M6IDhoMjAgcyZhYWN1dGU7bmcgXHUwMTExXHUxZWJmbiAyMWggdFx1MWVhNXQgY1x1MWVhMyBjJmFhY3V0ZTtjIG5nJmFncmF2ZTt5IHRyb25nIHR1XHUxZWE3bjxcL3A+XHJcbjxcL2Rpdj5cclxuPGRpdiBjbGFzcz1cIm1hcmtldC1pdGVtXCI+XHJcbjxwIGNsYXNzPVwibmFtZVwiPjEyMiBUaCZhYWN1dGU7aSBIJmFncmF2ZTsgLSAwOTczLjc5LjAxMjIuPFwvcD5cclxuPHA+XHUwMTEwXHUxZWNiYSBjaFx1MWVjOTogMTIyIFRoJmFhY3V0ZTtpIEgmYWdyYXZlOzxcL3A+XHJcbjxwPlx1MDExMGlcdTFlYzduIHRob1x1MWVhMWkgbGkmZWNpcmM7biBoXHUxZWM3OiAwOTcuMzc5LjAxMjI8XC9wPlxyXG48cD5HaVx1MWVkZCBsJmFncmF2ZTttIHZpXHUxZWM3YzogOGgyMCBzJmFhY3V0ZTtuZyBcdTAxMTFcdTFlYmZuIDIxaCB0XHUxZWE1dCBjXHUxZWEzIGMmYWFjdXRlO2MgbmcmYWdyYXZlO3kgdHJvbmcgdHVcdTFlYTduPFwvcD5cclxuPFwvZGl2PlxyXG48ZGl2IGNsYXNzPVwibWFya2V0LWl0ZW1cIj5cclxuPHAgY2xhc3M9XCJuYW1lXCI+MTk0IEwmZWNpcmM7IER1XHUxZWE5biAtIDA0My41MTguNjAzMy48XC9wPlxyXG48cD5cdTAxMTBcdTFlY2JhIGNoXHUxZWM5OiAxOTQgTCZlY2lyYzsgRHVcdTFlYTluPFwvcD5cclxuPHA+XHUwMTEwaVx1MWVjN24gdGhvXHUxZWExaSBsaSZlY2lyYztuIGhcdTFlYzc6IDA0My41MS44Ni4wMzM8XC9wPlxyXG48cD5HaVx1MWVkZCBsJmFncmF2ZTttIHZpXHUxZWM3YzogOGgyMCBzJmFhY3V0ZTtuZyBcdTAxMTFcdTFlYmZuIDIxaCB0XHUxZWE1dCBjXHUxZWEzIGMmYWFjdXRlO2MgbmcmYWdyYXZlO3kgdHJvbmcgdHVcdTFlYTduPFwvcD5cclxuPFwvZGl2PlxyXG48ZGl2IGNsYXNzPVwibWFya2V0LWl0ZW1cIj5cclxuPHAgY2xhc3M9XCJuYW1lXCI+MzgyIE5ndXlcdTFlYzVuIFZcdTAxMDNuIENcdTFlZWIgLSAwMTI1LjM2My4yMjIyLjxcL3A+XHJcbjxwPlx1MDExMFx1MWVjYmEgY2hcdTFlYzk6IDM4MiBOZ3V5XHUxZWM1biBWXHUwMTAzbiBDXHUxZWViPFwvcD5cclxuPHA+XHUwMTEwaVx1MWVjN24gdGhvXHUxZWExaSBsaSZlY2lyYztuIGhcdTFlYzc6IDAxMjUuMzYzLjIyMjI8XC9wPlxyXG48cD5HaVx1MWVkZCBsJmFncmF2ZTttIHZpXHUxZWM3YzogOGgyMCBzJmFhY3V0ZTtuZyBcdTAxMTFcdTFlYmZuIDIxaCB0XHUxZWE1dCBjXHUxZWEzIGMmYWFjdXRlO2MgbmcmYWdyYXZlO3kgdHJvbmcgdHVcdTFlYTduPFwvcD5cclxuPFwvZGl2PlxyXG48XC9kaXY+In0=', 'about', 'Bài viết giới thiệu về website');

-- --------------------------------------------------------

--
-- Table structure for table `contact`
--

CREATE TABLE `contact` (
  `con_id` int(11) NOT NULL,
  `con_name` varchar(255) NOT NULL,
  `con_email` varchar(255) NOT NULL,
  `con_phone` varchar(255) NOT NULL,
  `con_subject` varchar(255) DEFAULT NULL,
  `con_detail` tinytext,
  `con_date` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `contact`
--

INSERT INTO `contact` (`con_id`, `con_name`, `con_email`, `con_phone`, `con_subject`, `con_detail`, `con_date`) VALUES
(1, 'Hoàng lão tà', 'vodichthienha@gmail.com', '', NULL, 'Thách đấu', 1406088049),
(2, 'Hoàng lão tà', 'vodichthienha@gmail.com', '', NULL, 'sdgfs', 1406088098),
(3, 'abc', 'abc@yahoo.com', '', NULL, 'sg', 1420425263),
(4, 'abc', 'abc@yahoo.com', '01688646576', NULL, 'fszgf', 1420862834),
(5, 'a', 'abc@yahoo.com', '35435', NULL, 'fdgfdg', 1421720458),
(6, 'Tôi là tôi', 'abc@yahoo.com', '01688646576', NULL, 'â', 1427787592),
(7, 'Nguyễn Hữu Tiến', 'tiennhss@gmail.com', '01688646576', NULL, 'sd', 1427788066),
(8, 'Tôi là tôi', 'abc@yahoo.com', '01688646576', NULL, '&lt;iframe src=''''http://phuongdongcorp.com/''''&gt;&lt;/iframe&gt;', 1427788595),
(9, 'Tôi là tôi', 'abc@yahoo.com', '01688646576', NULL, '&lt;iframe src=''''http:\\\\youtube.com''''&gt;&lt;/iframe&gt;', 1427956445);

-- --------------------------------------------------------

--
-- Table structure for table `culture`
--

CREATE TABLE `culture` (
  `cul_id` int(11) NOT NULL,
  `cul_title` varchar(255) NOT NULL,
  `cul_title_en` varchar(255) NOT NULL,
  `cul_alias` varchar(255) NOT NULL,
  `cul_summary` text NOT NULL,
  `cul_summary_en` text NOT NULL,
  `cul_detail` text NOT NULL,
  `cul_detail_en` text NOT NULL,
  `cul_image` varchar(255) NOT NULL,
  `cul_date` int(11) NOT NULL,
  `cul_adm_id` int(11) NOT NULL,
  `cul_active` tinyint(4) NOT NULL,
  `cul_position` int(4) NOT NULL,
  `cul_hot` tinyint(4) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

--
-- Dumping data for table `culture`
--

INSERT INTO `culture` (`cul_id`, `cul_title`, `cul_title_en`, `cul_alias`, `cul_summary`, `cul_summary_en`, `cul_detail`, `cul_detail_en`, `cul_image`, `cul_date`, `cul_adm_id`, `cul_active`, `cul_position`, `cul_hot`) VALUES
(3, 'CHẤT LƯỢNG – Xây vị thế', '', 'chat-luong-xay-vi-the', '', '', '<ol>\r\n<li>CHẤT LƯỢNG là thỏa mãn yêu cầu của khách hàng và những người liên quan của sản phẩm, hệ thống, hay quá trình.</li>\r\n<li>Với VNPT EPAY, CHẤT LƯỢNG là điều kiện tiên quyết giúp chúng ta đứng vững trong thị trường cạnh tranh và thay đổi không ngừng.</li>\r\n<li>Chúng ta cạnh tranh bằng CHẤT LƯỢNG, tạo lập hình ảnh và vị thế bằng CHẤT LƯỢNG.</li>\r\n<li>Chúng ta đảm bảo CHẤT LƯỢNG một cách toàn diện và liên tục.</li>\r\n</ol>', '', '/media/images/2015/04/culture2.png', 1427857298, 0, 1, 0, 0),
(2, 'CON NGƯỜI – Sống ý nghĩa ', 'English', 'con-nguoi-song-y-nghia', '', '', '<div class="\\&quot;row">\r\n<div class="\\&quot;col-md-7"><ol>\r\n<li>SỐNG ý nghĩa là sống có mục đích, có niềm tin, có thái độ tích cực, luôn nỗ lực hết mình để đạt mục tiêu và biết hài lòng với những gì mình có.Cao hơn nữa, SỐNG ý nghĩa là: sống vì mọi người, tạo nên dấu ấn riêng và được trân trọng.</li>\r\n<li>Người EPAY có mục tiêu chung là sự phồn vinh của công ty, và luôn cống hiến hết mình vì điều đó. Ngược lại, người EPAY luôn được tạo điều kiện để xây dựng một cuộc sống ý nghĩa.</li>\r\n<li>Người EPAY không vì bản thân mình mà quên đi những đồng nghiệp xung quanh.Người EPAY cùng chung tay để mang đến cuộc sống ý nghĩa cho đồng nghiệp của mình.</li>\r\n<li>Người EPAY hướng đến cuộc SỐNG ý nghĩa cho mình cả trong công việc và đời thường.</li>\r\n</ol></div>\r\n</div>\r\n<div class="\\&quot;row">\r\n<p class="\\&quot;btn"> </p>\r\n</div>', '', '/media/images/2015/04/culture1.jpg', 1427856787, 0, 1, 0, 0);

-- --------------------------------------------------------

--
-- Table structure for table `email_quote`
--

CREATE TABLE `email_quote` (
  `eqt_id` int(11) NOT NULL,
  `eqt_cus_email` varchar(255) NOT NULL,
  `eqt_date` int(11) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

--
-- Dumping data for table `email_quote`
--

INSERT INTO `email_quote` (`eqt_id`, `eqt_cus_email`, `eqt_date`) VALUES
(4, 'langthang773@yahoo.com', 1400300874),
(5, 'tiennhss@gmail.com', 1400300943),
(6, 'thienthanhoacomay_12@yahoo.com', 1400301045);

-- --------------------------------------------------------

--
-- Table structure for table `faqs`
--

CREATE TABLE `faqs` (
  `faq_id` int(11) NOT NULL,
  `faq_cat_id` int(11) NOT NULL,
  `faq_questions` text NOT NULL,
  `faq_answer` text NOT NULL,
  `faq_image` varchar(255) NOT NULL,
  `faq_date` int(11) NOT NULL,
  `faq_views` int(11) NOT NULL,
  `faq_active` tinyint(4) NOT NULL,
  `faq_title` text NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

--
-- Dumping data for table `faqs`
--

INSERT INTO `faqs` (`faq_id`, `faq_cat_id`, `faq_questions`, `faq_answer`, `faq_image`, `faq_date`, `faq_views`, `faq_active`, `faq_title`) VALUES
(1, 2, 'Em chào các anh chị ạ. Các anh chị cho em hỏi hiện Cleverlearn cơ sở Nguyễn Khoái có tuyển giáo viên dạy TOEIC không ạ?. Em có cc TOEIC 880 thì có thể dạy TOEIC tại trung tâm k ạ? Em cảm ơn ạ!', '<p><span>Ch&agrave;o bạn,</span><br /><span>C&aacute;m ơn bạn đ&atilde; gửi c&acirc;u hỏi tới Cleverlearn Việt Nam.</span><br /><span>Về c&acirc;u hỏi của bạn, rất tiếc hiện tại Cleverlearn chưa c&oacute; đợt tuyển gi&aacute;o vi&ecirc;n TOEIC.</span><br /><span>C&aacute;m ơn bạn!</span></p>', '', 1400663739, 11, 1, ''),
(2, 3, 'Cleverlearn ơi cho em hỏi chút, em có thể đăng ký học eslflex cho bé nhà em vào những giờ nào, em thấy trên lịch học có ghi là bất cứ giờ nào trong khoảng từ 9h đến 20h tất cả các ngày trong tuần, em chưa rõ lắm, Cleverlearn giải đáp giúp em nhé, em cám ơn.', '<p><span>Ch&agrave;o bạn!</span><br /><br /><span>Cảm ơn bạn đ&atilde; gửi c&acirc;u hỏi tới Cleverlearn Việt Nam. <strong>Ch&uacute;ng t&ocirc;i xin trả lời c&acirc;u hỏi của bạn:</strong></span><br /><br /><span><strong>ESL-Flex l&agrave; lớp học tiếng Anh của ri&ecirc;ng b&eacute; nh&agrave; bạn</strong></span><span>. B&eacute; l&agrave; học vi&ecirc;n duy nhất, n&ecirc;n chương tr&igrave;nh v&agrave; lịch học sẽ được ch&iacute;nh gi&aacute;o vi&ecirc;n t&ugrave;y biến cho ph&ugrave; hợp với tr&igrave;nh độ v&agrave; thời gian biểu cuả b&eacute;. Mỗi tiết học online k&eacute;o d&agrave;i 1h để đảm bảo sức khỏe cho b&eacute; khi ngồi m&aacute;y t&iacute;nh. Bạn c&oacute; thể đăng k&yacute; cho b&eacute; 1 tiếng học bất kỳ từ 9h đến 20h v&agrave; v&agrave;o ng&agrave;y bất kỳ trong tuần. Sau đ&oacute; Cleverlearn sẽ sắp xếp ri&ecirc;ng cho b&eacute; một gi&aacute;o vi&ecirc;n v&agrave;o khung giờ đ&oacute;. Sau 4 buổi học online, b&eacute; sẽ đến trung t&acirc;m để học 1 buổi offline k&eacute;o d&agrave;i 2 tiếng với gi&aacute;o vi&ecirc;n bản ngữ c&ugrave;ng 4 bạn học vi&ecirc;n kh&aacute;c c&ugrave;ng tr&igrave;nh độ.</span><br /><br /><span>Bạn c&oacute; thể tham khảo th&ecirc;m th&ocirc;ng tin chi tiết về c&aacute;c kh&oacute;a học ESL Flex tại b&agrave;i viết sau:</span><br /><a href="http://cleverlearnvietnam.vn/tnd/esl-flex.htm"><span>ESLFlex - m&ocirc; h&igrave;nh đ&agrave;o tạo tiếng Anh hiệu quả nhất</span></a><br /><br /><span>Nếu c&oacute; bất kỳ y&ecirc;u cầu cần hỗ trợ, bạn c&oacute; thể li&ecirc;n lạc tới nh&acirc;n vi&ecirc;n kỹ thuật theo số m&aacute;y hotline:&nbsp;</span><strong>0906 865 596.</strong></p>', 'whq1399956213.jpg', 1400648634, 13, 1, ''),
(5, 2, 'Câu hỏi số 3', '<p>C&acirc;u trả lời số 3</p>', 'onb1400663844.jpg', 1400663814, 0, 1, 'Câu hỏi'),
(6, 3, 'dsa', '<p>sads</p>', '', 1400728320, 0, 1, 'Câu hỏi mới');

-- --------------------------------------------------------

--
-- Table structure for table `feedback`
--

CREATE TABLE `feedback` (
  `fee_id` int(11) NOT NULL,
  `fee_fullname` varchar(255) NOT NULL,
  `fee_email` varchar(255) NOT NULL,
  `fee_province` int(11) NOT NULL,
  `fee_content` text NOT NULL,
  `fee_hot` tinyint(4) NOT NULL,
  `fee_active` tinyint(4) NOT NULL,
  `fee_date` int(11) NOT NULL,
  `fee_point` tinyint(4) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

--
-- Dumping data for table `feedback`
--

INSERT INTO `feedback` (`fee_id`, `fee_fullname`, `fee_email`, `fee_province`, `fee_content`, `fee_hot`, `fee_active`, `fee_date`, `fee_point`) VALUES
(5, 'NGuyễn Phương Hằng', 'phuonghang94@gmail.com', 1, 'Từ khi sử dụng dịch vụ của Quyền Quyền tôi Tốn rất ít thời gian để chăm sóc sắc đẹp mỗi buổi sáng tôi chỉ cần bỏ ra 5-10 phút để tút tát lại nhan sắc Tôi rất hài lòng với chất lượng dịch vụ.', 0, 1, 1406082045, 0),
(6, 'NGuyễn Phương Hằng', 'phuonghang94@gmail.com', 1, 'Từ khi sử dụng dịch vụ của Quyền Quyền tôi Tốn rất ít thời gian để chăm sóc sắc đẹp mỗi buổi sáng tôi chỉ cần bỏ ra 5-10 phút để tút tát lại nhan sắc Tôi rất hài lòng với chất lượng dịch vụ.', 0, 1, 1406082075, 0),
(7, 'NGuyễn Phương Hằng', 'phuonghang94@gmail.com', 1, 'Từ khi sử dụng dịch vụ của Quyền Quyền tôi Tốn rất ít thời gian để chăm sóc sắc đẹp mỗi buổi sáng tôi chỉ cần bỏ ra 5-10 phút để tút tát lại nhan sắc Tôi rất hài lòng với chất lượng dịch vụ.', 0, 1, 1406082082, 0),
(8, 'NGuyễn Phương Hằng', 'phuonghang94@gmail.com', 1, 'Từ khi sử dụng dịch vụ của Quyền Quyền tôi Tốn rất ít thời gian để chăm sóc sắc đẹp mỗi buổi sáng tôi chỉ cần bỏ ra 5-10 phút để tút tát lại nhan sắc Tôi rất hài lòng với chất lượng dịch vụ.', 0, 1, 1406082103, 0),
(9, 'Nguyễn Văn Hùng', 'hungnv@gmail.com', 1, 'Từ khi sử dụng dịch vụ của Quyền Quyền tôi Tốn rất ít thời gian để chăm sóc sắc đẹp mỗi buổi sáng tôi chỉ cần bỏ ra 5-10 phút để tút tát lại nhan sắc Tôi rất hài lòng với chất lượng dịch vụ.', 1, 1, 1406082141, 5),
(10, 'Lê Hoàng yến', 'yenlh@gmail.com', 2, '&lt;script&gt;alert(''a'');&lt;/script&gt;', 0, 1, 1406082609, 0);

-- --------------------------------------------------------

--
-- Table structure for table `forms`
--

CREATE TABLE `forms` (
  `for_id` int(11) NOT NULL,
  `for_cat_id` int(11) NOT NULL,
  `for_title` varchar(255) NOT NULL,
  `for_filename` varchar(255) NOT NULL,
  `for_image` varchar(255) NOT NULL,
  `for_description` text NOT NULL,
  `for_order` int(11) NOT NULL,
  `for_active` tinyint(4) NOT NULL,
  `for_date` int(11) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

--
-- Dumping data for table `forms`
--

INSERT INTO `forms` (`for_id`, `for_cat_id`, `for_title`, `for_filename`, `for_image`, `for_description`, `for_order`, `for_active`, `for_date`) VALUES
(2, 9, 'Báo giá 2014', 'Báo giá 2014_ibz1400576121.pdf', 'nih1400574530.jpg', '123', 1, 1, 1390644785),
(4, 6, 'Báo giá 2014', 'Báo giá 2014_fts1400576098.docx', 'cgy1400576249.jpg', 'aaa aaaa aaaa aaaaa aa aaa aaaa aaacs asd sd gfdg sdgf fg afgfgfg fggfgfg', 0, 1, 1400575598),
(5, 6, 'Báo giá 2015', 'Báo giá 2015_tbu1400577911.docx', 'ift1400577911.jpg', 'sdff', 0, 1, 1400577911),
(6, 6, 'Báo giá 2015', 'Báo giá 2015_cce1400578314.pdf', 'qeb1400578314.jpg', '', 0, 1, 1400578314);

-- --------------------------------------------------------

--
-- Table structure for table `images_upload`
--

CREATE TABLE `images_upload` (
  `imu_id` int(11) NOT NULL,
  `imu_image` varchar(255) NOT NULL,
  `imu_alt` varchar(255) NOT NULL,
  `imu_description` text NOT NULL,
  `imu_caption` varchar(255) NOT NULL,
  `imu_date` int(11) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

--
-- Dumping data for table `images_upload`
--

INSERT INTO `images_upload` (`imu_id`, `imu_image`, `imu_alt`, `imu_description`, `imu_caption`, `imu_date`) VALUES
(1, 'slides1.jpg', '', '', '', 1427683507),
(2, 'slides2.jpg', '', '', '', 1427683508),
(3, 'news1.jpg', '', '', '', 1427687237),
(4, 'new3.jpg', '', '', '', 1427687237),
(5, 'news2.jpg', '', '', '', 1427687237),
(6, 'news3.jpg', '', '', '', 1427699297),
(7, 'intro1.jpg', '', '', '', 1427704414),
(8, 'intro2.jpg', '', '', '', 1427704437),
(9, 'slider_introduction.jpg', '', '', '', 1427705159),
(10, 'vision1.png', '', '', '', 1427707576),
(11, 'vision2.png', '', '', '', 1427707577),
(12, 'vision3.png', '', '', '', 1427707577),
(13, 'vision4.png', '', '', '', 1427707577),
(14, 'news_detail.jpg', '', '', '', 1427708654),
(15, 'parner1.jpg', '', '', '', 1427773407),
(16, 'partner2.jpg', '', '', '', 1427773408),
(17, 'partner3.jpg', '', '', '', 1427773408),
(18, 'partner4.jpg', '', '', '', 1427773408),
(19, 'partner5.jpg', '', '', '', 1427773408),
(23, 'slider_culture.jpg', '', '', '', 1427853989),
(24, 'culture1.jpg', '', '', '', 1427856545),
(25, 'culture2.png', '', '', '', 1427856548),
(26, 'culture3.png', '', '', '', 1427856550),
(27, 'culture4.png', '', '', '', 1427856551),
(28, 'culture5.png', '', '', '', 1427856552),
(29, 'partners.png', '', '', '', 1427858678),
(30, 'product1.png', '', '', '', 1427862423),
(31, 'product2.png', '', '', '', 1427862424),
(32, 'product3.png', '', '', '', 1427862424),
(33, 'product4.png', '', '', '', 1427862424),
(34, 'product5.png', '', '', '', 1427862424),
(35, 'product6.png', '', '', '', 1427862425),
(36, 'product7.png', '', '', '', 1427862425),
(37, 'product8.png', '', '', '', 1427862425),
(38, 'product9.jpg', '', '', '', 1427862425),
(39, 'product10.jpg', '', '', '', 1427862425),
(40, 'product11.jpg', '', '', '', 1427862425),
(41, 'product_detail.jpg', '', '', '', 1427870846);

-- --------------------------------------------------------

--
-- Table structure for table `kdims`
--

CREATE TABLE `kdims` (
  `kdm_id` int(11) NOT NULL,
  `kdm_key` varchar(255) DEFAULT NULL,
  `kdm_domain` varchar(255) DEFAULT NULL,
  `kdm_hash` varchar(255) DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

--
-- Dumping data for table `kdims`
--

INSERT INTO `kdims` (`kdm_id`, `kdm_key`, `kdm_domain`, `kdm_hash`) VALUES
(2, 'rlWeMKxvBvV4ZmuxZ2EzA2L1MTAxZGRlMzEzA2WyBQxlMJWxLwWxLFVfVaOup3ZvBvV1AQHjFwVkZGEgZGDlA3b2AmZkVa0=', '838d3df7f5dcd112fdf7be892ebdb2da', '5974a24efa61d54cd45f2710f7ae240d'),
(1, 'rlWeMKxvBvV0ZwSuLGxjMGN3BJMuZmV2LwL0BGEzBQRlLJDkZ2H3BFVfVaOup3ZvBvVkBQL5JwRjZGI4ZwV4AKL4ZGpmVa0=', '421aa90e079fa326b6494f812ad13e79', 'e8812fed40bb86c733a80ded155d7ddd');

-- --------------------------------------------------------

--
-- Table structure for table `link_footer`
--

CREATE TABLE `link_footer` (
  `lft_id` int(11) NOT NULL,
  `lft_title` varchar(255) NOT NULL,
  `lft_link` varchar(255) NOT NULL,
  `lft_position` int(11) NOT NULL,
  `lft_active` tinyint(4) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

--
-- Dumping data for table `link_footer`
--

INSERT INTO `link_footer` (`lft_id`, `lft_title`, `lft_link`, `lft_position`, `lft_active`) VALUES
(1, 'Link 1', '#', 1, 1),
(2, 'Link 2', '#', 2, 1),
(3, 'Link 3', '#', 3, 1),
(4, 'Link 4', '#', 4, 1),
(5, 'Link 5', '#', 5, 1),
(6, 'Link 6', '#', 6, 1),
(7, 'Link 7', '#', 7, 1),
(8, 'Link 8', '#', 8, 1);

-- --------------------------------------------------------

--
-- Table structure for table `log_add`
--

CREATE TABLE `log_add` (
  `lga_id` int(11) NOT NULL,
  `lga_record_id` int(11) DEFAULT NULL,
  `lga_admin_id` int(11) DEFAULT NULL,
  `lga_type` varchar(255) DEFAULT NULL,
  `lga_time` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `log_add`
--

INSERT INTO `log_add` (`lga_id`, `lga_record_id`, `lga_admin_id`, `lga_type`, `lga_time`) VALUES
(1, 1, 1, 'culture', 1427642626),
(2, 1, 1, 'recruitment', 1427644415),
(3, 1, 1, 'slides', 1427683523),
(4, 2, 1, 'slides', 1427683532),
(5, 1, 1, 'post', 1427687270),
(6, 2, 1, 'post', 1427699405),
(7, 11, 1, 'slides_aboutus', 1427705166),
(8, 12, 1, 'slides_aboutus', 1427705183),
(9, 1, 1, 'mission', 1427707597),
(10, 2, 1, 'mission', 1427707709),
(11, 3, 1, 'post', 1427710928),
(12, 4, 1, 'post', 1427711380),
(13, 3, 1, 'slides', 1427771945),
(14, 4, 1, 'slides', 1427771955),
(15, 1, 1, 'partner', 1427773445),
(16, 2, 1, 'partner', 1427773464),
(17, 5, 1, 'office_contact', 1427774678),
(18, 6, 1, 'office_contact', 1427784033),
(19, 5, 1, 'slides', 1427854002),
(20, 6, 1, 'slides', 1427854011),
(21, 2, 1, 'culture', 1427856787),
(22, 3, 1, 'culture', 1427857298),
(23, 7, 1, 'slides', 1427858684),
(24, 1, 1, 'services', 1427862454),
(25, 2, 1, 'services', 1427862777),
(26, 3, 1, 'services', 1427863322),
(27, 4, 1, 'services', 1427863439),
(28, 5, 1, 'services', 1427863487),
(29, 6, 1, 'services', 1427863652),
(30, 7, 1, 'services', 1427863680),
(31, 8, 1, 'services', 1427864041),
(32, 9, 1, 'services', 1427864074),
(33, 1, 1, 'recruitment', 1427903635),
(34, 2, 1, 'recruitment', 1427904729),
(35, 5, 1, 'post', 1428029196);

-- --------------------------------------------------------

--
-- Table structure for table `log_edit`
--

CREATE TABLE `log_edit` (
  `lge_id` int(11) NOT NULL,
  `lge_record_id` int(11) DEFAULT NULL,
  `lge_admin_id` int(11) DEFAULT NULL,
  `lge_type` varchar(255) DEFAULT NULL,
  `lge_time` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `log_edit`
--

INSERT INTO `log_edit` (`lge_id`, `lge_record_id`, `lge_admin_id`, `lge_type`, `lge_time`) VALUES
(1, 1, 1, 'culture', 1427642688),
(2, 1, 1, 'post', 1427699306),
(3, 2, 1, 'post', 1427701096),
(4, 1, 1, 'aboutus', 1427964152),
(5, 1, 1, 'mission', 1427707633),
(6, 4, 1, 'post', 1427711648),
(7, 3, 1, 'post', 1427769916),
(8, 2, 1, 'slides', 1427771567),
(9, 1, 1, 'slides', 1427771803),
(10, 1, 1, 'office_contact', 1427773808),
(11, 3, 1, 'services', 1427863371),
(12, 1, 1, 'services', 1427872135),
(13, 1, 1, 'recruitment', 1428079006);

-- --------------------------------------------------------

--
-- Table structure for table `manager`
--

CREATE TABLE `manager` (
  `mng_id` int(11) NOT NULL,
  `mng_avatar` varchar(255) NOT NULL,
  `mng_name` varchar(255) NOT NULL,
  `mng_alias` varchar(255) NOT NULL,
  `mng_position` varchar(255) NOT NULL,
  `mng_position_en` varchar(255) NOT NULL,
  `mng_description` text NOT NULL,
  `mng_description_en` text NOT NULL,
  `mng_detail` text NOT NULL,
  `mng_detail_en` text NOT NULL,
  `mng_project` varchar(255) NOT NULL,
  `mng_active` int(11) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

--
-- Dumping data for table `manager`
--

INSERT INTO `manager` (`mng_id`, `mng_avatar`, `mng_name`, `mng_alias`, `mng_position`, `mng_position_en`, `mng_description`, `mng_description_en`, `mng_detail`, `mng_detail_en`, `mng_project`, `mng_active`) VALUES
(1, '/media/images/2015/01/mng1.jpg', 'Ngô Hoàng Đông', 'ngo-hoang-dong', 'Giám đốc', 'CEO', 'Giới thiệu ngắn', 'Lorem ipsum dolor sit amet, consectetur adipisicing elit, Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod temporLorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor', '<p>Chi tiết</p>', '<p>detail</p>', '1,2,3,4,5,6', 0);

-- --------------------------------------------------------

--
-- Table structure for table `manager_images`
--

CREATE TABLE `manager_images` (
  `mni_id` int(11) NOT NULL,
  `mni_mng_id` int(11) NOT NULL,
  `mni_images` int(11) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `meta_seo`
--

CREATE TABLE `meta_seo` (
  `met_id` int(11) NOT NULL,
  `met_post_id` int(11) DEFAULT NULL,
  `met_type` varchar(255) DEFAULT NULL,
  `met_title` varchar(255) DEFAULT NULL,
  `met_description` varchar(255) DEFAULT NULL,
  `met_robots` varchar(255) DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

--
-- Dumping data for table `meta_seo`
--

INSERT INTO `meta_seo` (`met_id`, `met_post_id`, `met_type`, `met_title`, `met_description`, `met_robots`) VALUES
(1, 1, 'post', '', '', 'Index,Follow'),
(2, 2, 'post', '', '', 'Index,Follow'),
(3, 3, 'post', '', '', 'Index,Follow'),
(4, 1, 'activities', '', '', 'Index,Follow'),
(5, 8, 'categories', '', '', 'Index,Follow'),
(6, 1, 'project', '', '', 'Index,Follow'),
(7, 2, 'partner', '', '', 'Index,Follow'),
(8, 9, 'categories', '', '', 'Index,Follow'),
(9, 2, 'project', '', '', 'Index,Follow'),
(10, 2, 'activities', '', '', 'Index,Follow'),
(11, 3, 'activities', '', '', 'Index,Follow'),
(12, 4, 'post', '', '', 'Index,Follow'),
(13, 5, 'post', '', '', 'Index,Follow'),
(14, 0, 'project', '', '', 'Index,Follow'),
(15, 0, 'project', '', '', 'Index,Follow'),
(16, 0, 'project', '', '', 'Index,Follow'),
(17, 3, 'project', '', '', 'Index,Follow'),
(18, 4, 'project', '', '', 'Index,Follow'),
(19, 4, 'activities', '', '', 'Index,Follow'),
(20, 5, 'activities', '', '', 'Index,Follow'),
(21, 6, 'activities', '', '', 'Index,Follow'),
(22, 7, 'activities', '', '', 'Index,Follow'),
(23, 10, 'categories', '', '', 'Index,Follow'),
(24, 5, 'project', '', '', 'Index,Follow'),
(25, 6, 'project', '', '', 'Index,Follow'),
(26, 1, 'aboutus', 'Không thấy tiêu đề', 'Không thấy mô tả', 'Index,Follow'),
(27, 6, 'post', 'Tiêu đề', 'mô tả', 'Index,Follow'),
(28, 6, 'categories', '', '', 'Index,Follow'),
(29, 2, 'services', '', '', 'Index,Follow'),
(30, 0, 'categories', '', '', 'Index,Follow'),
(31, 0, 'categories', '', '', 'Index,Follow'),
(32, 11, 'categories', 'title1', 'mô tả1', 'Index,Follow'),
(33, 1, 'mission', '', '', 'Index,Follow'),
(34, 2, 'mission', '', '', 'Index,Follow'),
(35, 1, 'services', '', '', 'Index,Follow'),
(36, 0, 'services', 'a', 'b', 'Index,Follow'),
(37, 3, 'services', 'a', 'b', 'Index,Follow'),
(38, 1, 'services', '', '', 'Index,Follow'),
(39, 1, 'culture', '', '', 'Index,Follow'),
(40, 12, 'categories', '', '', 'Index,Follow'),
(41, 1, 'recruitment', '', '', 'Index,Follow'),
(42, 1, 'categories', '', '', 'Index,Follow'),
(43, 2, 'categories', '', '', 'Index,Follow'),
(44, 1, 'post', '', '', 'Index,Follow'),
(45, 2, 'post', '', '', 'Index,Follow'),
(46, 1, 'mission', '', '', 'Index,Follow'),
(47, 2, 'mission', '', '', 'Index,Follow'),
(48, 3, 'post', '', '', 'Index,Follow'),
(49, 4, 'post', '', '', 'Index,Follow'),
(50, 3, 'categories', '', '', 'Index,Follow'),
(51, 4, 'categories', '', '', 'Index,Follow'),
(52, 5, 'categories', '', '', 'Index,Follow'),
(53, 6, 'categories', '', '', 'Index,Follow'),
(54, 7, 'categories', '', '', 'Index,Follow'),
(55, 1, 'office_contact', 'Không thấy tiêu đề', 'Không thấy mô tả', 'Index,Follow'),
(56, 2, 'culture', '', '', 'Index,Follow'),
(57, 3, 'culture', '', '', 'Index,Follow'),
(58, 8, 'categories', '', '', 'Index,Follow'),
(59, 1, 'services', '', '', 'Index,Follow'),
(60, 2, 'services', '', '', 'Index,Follow'),
(61, 9, 'categories', '', '', 'Index,Follow'),
(62, 3, 'services', 'a', 'b', 'Index,Follow'),
(63, 4, 'services', '', '', 'Index,Follow'),
(64, 5, 'services', '', '', 'Index,Follow'),
(65, 6, 'services', '', '', 'Index,Follow'),
(66, 7, 'services', '', '', 'Index,Follow'),
(67, 8, 'services', '', '', 'Index,Follow'),
(68, 9, 'services', '', '', 'Index,Follow'),
(70, 11, 'categories', 'title1', 'mô tả1', 'Index,Follow'),
(69, 10, 'categories', '', '', 'Index,Follow'),
(71, 12, 'categories', '', '', 'Index,Follow'),
(72, 1, 'recruitment', '', '', 'Index,Follow'),
(73, 2, 'recruitment', '', '', 'Index,Follow'),
(74, 5, 'post', '', '', 'Index,Follow'),
(75, 13, 'categories', '', '', 'Index,Follow');

-- --------------------------------------------------------

--
-- Table structure for table `mission`
--

CREATE TABLE `mission` (
  `mis_id` int(11) NOT NULL,
  `mis_title` varchar(255) NOT NULL,
  `mis_title_en` varchar(255) NOT NULL,
  `mis_alias` varchar(255) NOT NULL,
  `mis_summary` text NOT NULL,
  `mis_summary_en` text NOT NULL,
  `mis_detail` text NOT NULL,
  `mis_detail_en` text NOT NULL,
  `mis_image` varchar(255) NOT NULL,
  `mis_date` int(11) NOT NULL,
  `mis_adm_id` int(11) NOT NULL,
  `mis_active` tinyint(4) NOT NULL,
  `mis_position` int(4) NOT NULL,
  `mis_hot` tinyint(4) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

--
-- Dumping data for table `mission`
--

INSERT INTO `mission` (`mis_id`, `mis_title`, `mis_title_en`, `mis_alias`, `mis_summary`, `mis_summary_en`, `mis_detail`, `mis_detail_en`, `mis_image`, `mis_date`, `mis_adm_id`, `mis_active`, `mis_position`, `mis_hot`) VALUES
(1, 'Đối với | Xã hội', 'with social', 'doi-voi-xa-hoi', 'Epay cung cấp các dịch vụ thanh toán tiện lợi, góp phần nâng cao chất lượng cuộc sống cho cộng đồng và thúc đẩy sự tiến bộ của xã hội.', '', '', '', '/media/images/2015/03/vision1.png', 1427707596, 0, 1, 0, 0),
(2, 'Đối với | nhân viên', 'width | staff', 'doi-voi-nhan-vien', 'Epay xây dựng môi trường làm việc chuyên nghiệp thân thiện với cơ hội phát triển tốt nhất và chế độ đãi ngộ tương xứng với nhân viên, là nơi mỗi người được ghi nhận thấu hiểu và đối xử công bằng', '', '', '', '/media/images/2015/03/vision2.png', 1427707709, 0, 1, 0, 0);

-- --------------------------------------------------------

--
-- Table structure for table `modules`
--

CREATE TABLE `modules` (
  `mod_id` int(11) NOT NULL,
  `mod_name` varchar(100) DEFAULT NULL,
  `mod_path` varchar(255) DEFAULT NULL,
  `mod_listname` text,
  `mod_listfile` text,
  `mod_order` int(11) DEFAULT '0',
  `mod_help` mediumtext,
  `lang_id` int(11) DEFAULT '1',
  `mod_checkloca` int(11) DEFAULT '0',
  `mod_icon` varchar(255) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

--
-- Dumping data for table `modules`
--

INSERT INTO `modules` (`mod_id`, `mod_name`, `mod_path`, `mod_listname`, `mod_listfile`, `mod_order`, `mod_help`, `lang_id`, `mod_checkloca`, `mod_icon`) VALUES
(18, 'Cấu hình', 'settings', 'Cấu hình chung|Cấu hình Seo|Thông tin chung', 'general.php|seo.php|info_company.php', 100, NULL, 1, 0, 'fa-cogs'),
(37, 'Văn hóa doanh nghiệp', 'culture', 'Thêm mới|Danh sách', 'add.php|listing.php', 0, NULL, 1, 0, 'fa-smile-o'),
(6, 'Tin tức', 'news', 'Thêm mới|Danh sách', 'add.php|listing.php', 0, NULL, 1, 0, ''),
(36, 'Tầm nhìn sứ mệnh', 'mission', 'Thêm mới|Danh sách', 'add.php|listing.php', 0, NULL, 1, 0, 'fa-eye'),
(8, 'Biểu mẫu', 'form', 'Thêm mới|Danh sách', 'add.php|listing.php', 0, NULL, 1, 0, ''),
(10, 'Email nhận tin', 'email_quote', 'Danh sách', 'listing.php', 0, NULL, 1, 0, ''),
(12, 'Quản lý trang tĩnh', 'page_static', 'Thêm mới|Danh sách', 'add.php|listing.php', 0, NULL, 1, 0, ''),
(13, 'Thông tin Công ty', 'office_contact', 'Thêm mới|Danh sách', 'add.php|listing.php', 0, NULL, 1, 0, ''),
(14, 'Tài khoản quản trị', 'admin_users', 'Thêm mới|Danh sách', 'add.php|listing.php', 98, NULL, 1, 0, 'fa-user'),
(15, 'Tin tức', 'post', 'Thêm mới|Danh sách', 'add.php|listing.php', 4, NULL, 1, 0, 'fa-file-text-o'),
(16, 'Thư viện ảnh', 'images_gallery', 'Thêm mới|Danh sách', 'add.php|listing.php', 99, NULL, 1, 0, 'fa-picture-o'),
(30, 'Giới thiệu', 'aboutus', 'Giới thiệu', 'aboutus.php', 1, NULL, 1, 0, ''),
(21, 'Khách hàng liên hệ', 'contact', 'Danh sách', 'listing.php', 7, NULL, 1, 0, 'fa-envelope-o'),
(22, 'Khách hàng đặt mua', 'orders', 'Danh sách', 'listing.php', 5, NULL, 1, 0, 'fa-shopping-cart'),
(23, 'Slides', 'slides', 'Thêm mới|Danh sách', 'add.php|listing.php', 6, NULL, 1, 0, 'fa-play'),
(27, 'Đối tác', 'partner', 'Thêm mới|Danh sách', 'add.php|listing.php', 7, NULL, 1, 0, 'fa-briefcase'),
(28, 'Tuyển dụng', 'recruitment', 'Thêm mới|Danh sách|Danh mục', 'add.php|listing.php|categories/listing.php', 3, NULL, 1, 0, 'fa-male'),
(29, 'Hồ sơ ứng viên', 'recruitment_resume', 'Danh sách', 'listing.php', 11, NULL, 1, 0, 'fa-file'),
(32, 'Thông tin văn phòng', 'office_company', 'Thêm mới|Danh sách', 'add.php|listing.php', 13, NULL, 1, 0, ''),
(33, 'Sản phẩm', 'services', 'Thêm mới|Danh sách|Danh mục', 'add.php|listing.php|categories/listing.php', 0, NULL, 1, 0, 'fa-truck');

-- --------------------------------------------------------

--
-- Table structure for table `news`
--

CREATE TABLE `news` (
  `new_id` int(11) NOT NULL,
  `new_title` varchar(255) NOT NULL,
  `new_cat_id` int(11) NOT NULL,
  `new_summary` text NOT NULL,
  `new_detail` text NOT NULL,
  `new_picture` varchar(255) NOT NULL,
  `new_date` int(11) NOT NULL,
  `new_hot` int(11) NOT NULL,
  `new_active` int(11) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

--
-- Dumping data for table `news`
--

INSERT INTO `news` (`new_id`, `new_title`, `new_cat_id`, `new_summary`, `new_detail`, `new_picture`, `new_date`, `new_hot`, `new_active`) VALUES
(4, 'Những tay súng vô danh tại Ukraine đôi lúc để lộ phần nào tung tích của mình, như là 1 cách ngầm', 8, 'Những tay súng vô danh tại Ukraine đôi lúc để lộ phần nào tung tích của mình, như là 1 cách ngầm', '<p><a class="nh2i_title" href="/tin-tuc.html">Những tay s&uacute;ng v&ocirc; danh tại Ukraine đ&ocirc;i l&uacute;c để lộ phần n&agrave;o tung t&iacute;ch của m&igrave;nh, như l&agrave; 1 c&aacute;ch ngầm</a></p>\r\n<p><a class="nh2i_title" href="/tin-tuc.html">Những tay s&uacute;ng v&ocirc; danh tại Ukraine đ&ocirc;i l&uacute;c để lộ phần n&agrave;o tung t&iacute;ch của m&igrave;nh, như l&agrave; 1 c&aacute;ch ngầm</a></p>\r\n<p><a class="nh2i_title" href="/tin-tuc.html">Những tay s&uacute;ng v&ocirc; danh tại Ukraine đ&ocirc;i l&uacute;c để lộ phần n&agrave;o tung t<img style="max-width: 100%;" title="c&ocirc; g&aacute;i 2" src="/pictures/news/988365_384758361658139_1372699718_n.jpg" alt="c&ocirc; g&aacute;i 2" />&iacute;ch của m&igrave;nh, như l&agrave; 1 c&aacute;ch ngầm</a></p>\r\n<p>&nbsp;</p>', 'dqn1400142262.jpg', 1400142254, 1, 1);

-- --------------------------------------------------------

--
-- Table structure for table `office_contact`
--

CREATE TABLE `office_contact` (
  `off_id` int(11) NOT NULL,
  `off_name` varchar(255) DEFAULT NULL,
  `off_name_en` varchar(255) NOT NULL,
  `off_address` varchar(255) DEFAULT NULL,
  `off_address_en` varchar(255) NOT NULL,
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

INSERT INTO `office_contact` (`off_id`, `off_name`, `off_name_en`, `off_address`, `off_address_en`, `off_map`, `off_phone`, `off_hotline`, `off_fax`, `off_email`, `off_website`) VALUES
(1, 'CÔNG TY THANH TOÁN ĐIỆN TỬ VNPT EPAY', '', 'Tầng 3 - Tòa nhà Viễn Đông - 36 Hoàng Cầu - Quận Đống Đa - Hà Nội', '', 'Số 32, Lô C2, Tổ 10, X1 Pháp Vân, Hoàng Mai,Hà nội', '+844-39335133', '098 5555 999', NULL, 'vnptepay@gmail.com', 'vnptepay.vn'),
(5, 'Trụ sở hà nội', 'Office Ha Noi', 'Tầng 3 - Tòa nhà Viễn Đông - 36 Hoàng Cầu - Quận Đống Đa - Hà Nội', 'floor 3 - vien dong building - 36 Hoang Cau ', NULL, '+844-39335133', '', '+844-39335166', '', ''),
(6, 'Chi nhánh tại TPHCM', 'Office Ho Chi Minh', 'Lầu 3, số 96 – 98 Đào Duy Anh, Phường 9, Quận Phú Nhuận, TP Hồ Chí Minh', 'floor 3,  96 - 98 Dao Duy Anh ', NULL, '+844-39335133', '', '+844-39335166', '', '');

-- --------------------------------------------------------

--
-- Table structure for table `orders`
--

CREATE TABLE `orders` (
  `ord_id` int(11) NOT NULL,
  `ord_firstname` varchar(255) NOT NULL,
  `ord_lastname` varchar(255) NOT NULL,
  `ord_company` varchar(255) NOT NULL,
  `ord_address` text NOT NULL,
  `ord_province` tinyint(4) NOT NULL,
  `ord_phone` varchar(255) NOT NULL,
  `ord_email` varchar(255) NOT NULL,
  `ord_linkproduct` text NOT NULL,
  `ord_reply` tinyint(4) NOT NULL,
  `ord_date` int(11) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

--
-- Dumping data for table `orders`
--

INSERT INTO `orders` (`ord_id`, `ord_firstname`, `ord_lastname`, `ord_company`, `ord_address`, `ord_province`, `ord_phone`, `ord_email`, `ord_linkproduct`, `ord_reply`, `ord_date`) VALUES
(8, 'NGuyễn Hữu', 'Tiến', 'phương đông', '29 trung kính', 1, '0989131161', 'langthang773@yahoo.com', 'http://muahangquocte.vn/dat-mua/?type=yeu-cau-tinh-gia\r\nhttp://muahangquocte.vn/dat-mua/?type=yeu-cau-tinh-gia\r\nhttp://muahangquocte.vn/dat-mua/?type=yeu-cau-tinh-gia', 0, 1406103372);

-- --------------------------------------------------------

--
-- Table structure for table `page`
--

CREATE TABLE `page` (
  `pag_id` int(11) NOT NULL,
  `pag_title` varchar(255) DEFAULT NULL,
  `pag_alias` varchar(255) DEFAULT NULL,
  `pag_image` varchar(255) DEFAULT NULL,
  `pag_summary` varchar(255) DEFAULT NULL,
  `pag_detail` text,
  `pag_active` tinyint(4) DEFAULT NULL,
  `pag_date` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `page`
--

INSERT INTO `page` (`pag_id`, `pag_title`, `pag_alias`, `pag_image`, `pag_summary`, `pag_detail`, `pag_active`, `pag_date`) VALUES
(1, 'Mua hàng xách tay', 'mua-hang-xach-tay', '', 'tt', '<p>RiseGame, the Turkish game puplisher, has started to sell Rise Credits by accepting payments with WebMoney. You can buy ingame items of DK Online which is a game that RiseGame has just published.</p>\r\n<p>You can get more information from their website: <a href="http://www.risegame.com">www.risegame.com</a>.</p>\r\n<p>RiseGame, the Turkish game puplisher, has started to sell Rise Credits by accepting payments with WebMoney. You can buy ingame items of DK Online which is a game that RiseGame has just published.</p>\r\n<p>You can get more information from their website: <a href="http://www.risegame.com">www.risegame.com</a>.</p>\r\n<p>&nbsp;</p>\r\n<p>RiseGame, the Turkish game puplisher, has started to sell Rise Credits by accepting payments with WebMoney. You can buy ingame items of DK Online which is a game that RiseGame has just published.</p>\r\n<p>You can get more information from their website: www.risegame.com.</p>', 1, 1405926495),
(2, 'Hướng dẫn đặt mua hàng', 'huong-dan-dat-mua-hang', '', 'Hướng dẫn đặt mua hàng', '<p>&nbsp; &nbsp; &nbsp;Bạn đang muốn mua một m&oacute;n h&agrave;ng ch&iacute;nh h&atilde;ng tại Mỹ nhưng kh&ocirc;ng c&oacute; thời gian để t&igrave;m hiểu cũng như l&agrave;m c&aacute;c thủ tục phức tạp? Bạn đang tự hỏi, l&agrave;m thế n&agrave;o để c&oacute; thể ngồi tại nh&agrave; v&agrave; nhờ ai đ&oacute; mua hộ h&agrave;ng gi&uacute;p m&igrave;nh? V&agrave; l&agrave;m c&aacute;ch n&agrave;o để được mua hộ h&agrave;ng h&oacute;a tại Mỹ nhanh nhất, đơn giản an to&agrave;n v&agrave; thuận tiện với chi ph&iacute; dịch vụ thấp nhất? Thật đơn giản, h&atilde;y đến với dịch vụ mua hộ h&agrave;ng h&oacute;a tại Mỹ của giaonhan247.com Sử dụng dịch vụ n&agrave;y, chỉ với một c&uacute; click chuột, h&agrave;ng h&oacute;a từ 50 bang của Mỹ sẽ hiện ngay trước mắt bạn, mang đến cho bạn cơ hội được sử dụng những sản phẩm chất lượng, uy t&iacute;n m&agrave; kh&ocirc;ng cần phải tốn qu&aacute; nhiều thời gian v&agrave; c&ocirc;ng sức. Với dịch vụ mua hộ h&agrave;ng h&oacute;a tại Mỹ của giaonhan247, bạn chỉ cần bạn cung cấp th&ocirc;ng tin về sản phẩm v&agrave; website muốn mua h&agrave;ng, ch&uacute;ng t&ocirc;i sẽ gi&uacute;p bạn thực hiện c&aacute;c quy tr&igrave;nh c&ograve;n lại, bao gồm mua v&agrave; vận chuyển từ A &ndash; Z t&ugrave;y y&ecirc;u cầu của bạn.<br /><br /></p>', 1, 1405926524),
(3, 'Hướng dẫn vận chuyển hàng', 'huong-dan-van-chuyen-hang', '', 'Hướng dẫn vận chuyển hàng', '<p>&nbsp; &nbsp; &nbsp;Bạn đang muốn mua một m&oacute;n h&agrave;ng ch&iacute;nh h&atilde;ng tại Mỹ nhưng kh&ocirc;ng c&oacute; thời gian để t&igrave;m hiểu cũng như l&agrave;m c&aacute;c thủ tục phức tạp? Bạn đang tự hỏi, l&agrave;m thế n&agrave;o để c&oacute; thể ngồi tại nh&agrave; v&agrave; nhờ ai đ&oacute; mua hộ h&agrave;ng gi&uacute;p m&igrave;nh? V&agrave; l&agrave;m c&aacute;ch n&agrave;o để được mua hộ h&agrave;ng h&oacute;a tại Mỹ nhanh nhất, đơn giản an to&agrave;n v&agrave; thuận tiện với chi ph&iacute; dịch vụ thấp nhất? Thật đơn giản, h&atilde;y đến với dịch vụ mua hộ h&agrave;ng h&oacute;a tại Mỹ của giaonhan247.com Sử dụng dịch vụ n&agrave;y, chỉ với một c&uacute; click chuột, h&agrave;ng h&oacute;a từ 50 bang của Mỹ sẽ hiện ngay trước mắt bạn, mang đến cho bạn cơ hội được sử dụng những sản phẩm chất lượng, uy t&iacute;n m&agrave; kh&ocirc;ng cần phải tốn qu&aacute; nhiều thời gian v&agrave; c&ocirc;ng sức. Với dịch vụ mua hộ h&agrave;ng h&oacute;a tại Mỹ của giaonhan247, bạn chỉ cần bạn cung cấp th&ocirc;ng tin về sản phẩm v&agrave; website muốn mua h&agrave;ng, ch&uacute;ng t&ocirc;i sẽ gi&uacute;p bạn thực hiện c&aacute;c quy tr&igrave;nh c&ograve;n lại, bao gồm mua v&agrave; vận chuyển từ A &ndash; Z t&ugrave;y y&ecirc;u cầu của bạn.<br /><br /></p>', 1, 1405926564),
(4, 'Cam kết chất lượng', 'cam-ket-chat-luong', '', 'Cam kết chất lượng', '<p>&nbsp; &nbsp; &nbsp;Bạn đang muốn mua một m&oacute;n h&agrave;ng ch&iacute;nh h&atilde;ng tại Mỹ nhưng kh&ocirc;ng c&oacute; thời gian để t&igrave;m hiểu cũng như l&agrave;m c&aacute;c thủ tục phức tạp? Bạn đang tự hỏi, l&agrave;m thế n&agrave;o để c&oacute; thể ngồi tại nh&agrave; v&agrave; nhờ ai đ&oacute; mua hộ h&agrave;ng gi&uacute;p m&igrave;nh? V&agrave; l&agrave;m c&aacute;ch n&agrave;o để được mua hộ h&agrave;ng h&oacute;a tại Mỹ nhanh nhất, đơn giản an to&agrave;n v&agrave; thuận tiện với chi ph&iacute; dịch vụ thấp nhất? Thật đơn giản, h&atilde;y đến với dịch vụ mua hộ h&agrave;ng h&oacute;a tại Mỹ của giaonhan247.com Sử dụng dịch vụ n&agrave;y, chỉ với một c&uacute; click chuột, h&agrave;ng h&oacute;a từ 50 bang của Mỹ sẽ hiện ngay trước mắt bạn, mang đến cho bạn cơ hội được sử dụng những sản phẩm chất lượng, uy t&iacute;n m&agrave; kh&ocirc;ng cần phải tốn qu&aacute; nhiều thời gian v&agrave; c&ocirc;ng sức. Với dịch vụ mua hộ h&agrave;ng h&oacute;a tại Mỹ của giaonhan247, bạn chỉ cần bạn cung cấp th&ocirc;ng tin về sản phẩm v&agrave; website muốn mua h&agrave;ng, ch&uacute;ng t&ocirc;i sẽ gi&uacute;p bạn thực hiện c&aacute;c quy tr&igrave;nh c&ograve;n lại, bao gồm mua v&agrave; vận chuyển từ A &ndash; Z t&ugrave;y y&ecirc;u cầu của bạn.</p>', 1, 1405926616),
(5, 'Giới thiệu về Muahangquocte.vn', 'gioi-thieu-ve-muahangquocte-vn', '/media/images/2014/07/gioithieu.png', '', '<p>&acirc; a &nbsp;dsf sa sadf asgsdg &nbsp;asadfh sn asjdnasgwiueha aslvn nv asdnvurh anjn &aacute;&nbsp;</p>\r\n<p>&nbsp;aoij arh&nbsp;</p>\r\n<p>a aehfaheghreaghreg h aehgiurhgh ga</p>\r\n<p>&nbsp;ahsighoarorgryhnf&nbsp;</p>\r\n<p>a igharoihoirhglhgk lash sahhrha ah uashrgiuashr uhr liah uahga hauhgaah ahegh agh aghhglahg urih asiuhg lsargasb</p>', 1, 1405928114);

-- --------------------------------------------------------

--
-- Table structure for table `partner`
--

CREATE TABLE `partner` (
  `par_id` int(11) NOT NULL,
  `par_title` varchar(255) DEFAULT NULL,
  `par_description` varchar(255) DEFAULT NULL,
  `par_detail` text,
  `par_link` varchar(255) DEFAULT NULL,
  `par_image` varchar(255) DEFAULT NULL,
  `par_active` tinyint(4) DEFAULT NULL,
  `par_position` int(11) DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

--
-- Dumping data for table `partner`
--

INSERT INTO `partner` (`par_id`, `par_title`, `par_description`, `par_detail`, `par_link`, `par_image`, `par_active`, `par_position`) VALUES
(1, 'Viettel', '', '', 'viettel.vn', '/media/images/2015/03/parner1.jpg', 1, NULL),
(2, 'FPT', '', '', 'fpt.vn', '/media/images/2015/03/partner2.jpg', 1, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `post`
--

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

INSERT INTO `post` (`pos_id`, `pos_cat_id`, `pos_title`, `pos_title_en`, `pos_alias`, `pos_summary`, `pos_summary_en`, `pos_detail`, `pos_detail_en`, `pos_image`, `pos_image_cover`, `pos_date`, `pos_tags`, `pos_adm_id`, `pos_hot`, `pos_active`) VALUES
(1, NULL, 'Mừng ngày phụ nữ việt nam 8/3', 'English', 'mung-ngay-phu-nu-viet-nam-8-3', '', '', '<p>aaa</p>', '', '/media/images/2015/03/news3.jpg', '', 1427687270, '', 0, 1, 1),
(2, NULL, 'Sự kiện tôn vinh chị em phụ nữ đang làm việc tại nhân Epay ngày 8/3', 'English', 'mung-ngay-phu-nu-viet-nam-8-3-1', 'Tóm tắt tin tức ở đây', 'Revolutions of the bright points that first defined him to me. And beneath the effulgent Antarctic skies I have boarded the Argo-Navis, and joined the chase against the starry Cetus far beyond the utmost stretch of Hydrus and the Flying Fish....', '<p>Chi tiết tin tức ở đây</p>', '<p>Revolutions of the bright points that first defined him to me. And beneath the effulgent Antarctic skies I have boarded the Argo-Navis, and joined the chase against the starry Cetus far beyond the utmost stretch of Hydrus and the Flying Fish....</p>', '/media/images/2015/03/news3.jpg', '', 1427699405, '', 0, 0, 1),
(3, NULL, 'Tin mới', 'new', 'tin-moi', 'a', 'a', '<p>aa<img style="max-width: 100%;" title="" src="../../../media/images/2015/03/vision2.png" alt="" /></p>', '', '/media/images/2015/03/news3.jpg', '/media/images/2015/03/news_detail.jpg', 1427710927, '', 0, 0, 1);

-- --------------------------------------------------------

--
-- Table structure for table `project`
--

CREATE TABLE `project` (
  `prj_id` int(11) NOT NULL,
  `prj_cat_id` int(11) DEFAULT NULL,
  `prj_title` varchar(255) DEFAULT NULL,
  `prj_title_en` varchar(255) NOT NULL,
  `prj_alias` varchar(255) DEFAULT NULL,
  `prj_summary` varchar(255) DEFAULT NULL,
  `prj_summary_en` text NOT NULL,
  `prj_detail` text,
  `prj_detail_en` int(11) NOT NULL,
  `prj_image` varchar(255) DEFAULT NULL,
  `prj_date` int(11) DEFAULT NULL,
  `prj_date_start` int(11) NOT NULL,
  `prj_date_end` int(11) NOT NULL,
  `prj_customer` varchar(255) NOT NULL,
  `prj_tags` varchar(255) DEFAULT NULL,
  `prj_adm_id` int(11) DEFAULT '0',
  `prj_hot` tinyint(4) DEFAULT '0',
  `prj_active` tinyint(4) DEFAULT '0'
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

--
-- Dumping data for table `project`
--

INSERT INTO `project` (`prj_id`, `prj_cat_id`, `prj_title`, `prj_title_en`, `prj_alias`, `prj_summary`, `prj_summary_en`, `prj_detail`, `prj_detail_en`, `prj_image`, `prj_date`, `prj_date_start`, `prj_date_end`, `prj_customer`, `prj_tags`, `prj_adm_id`, `prj_hot`, `prj_active`) VALUES
(1, 8, 'HỆ THỐNG CUNG ỨNG VIỆC LÀM PHIÊN BẢN MỚi', 'number one', 'he-thong-cung-ung-viec-lam-phien-ban-mo', 'Dự án đầu tiên', '', '<p>nội dung dự &aacute;n</p>', 0, '/media/images/2014/12/Untitled-1.jpg', 1419914484, 30380, 30380, '', '', 0, 0, 1),
(2, 8, 'Dự án thứ 2', 'twoo', 'du-an-thu-2', 'dsfa', '', '<p>ggfdgg</p>', 0, '/media/images/2015/01/linhvuc1.jpg', 1420427757, 0, 0, '', '', 0, 0, 1),
(3, 8, 'Dự án thứ 3', 'three projects', 'du-an-thu-3', 'à sgf  ', 'Enlish', '<p>gdfgdfsg g sf sfdg fdgsg&nbsp;</p>', 0, '/media/images/2015/01/linhvuc2.jpg', 1420616893, 0, 0, '', NULL, 0, 0, 1),
(4, 8, 'Dự án thứ 4', 'four projects', 'du-an-thu-4', '', '', '<p>gfgfg</p>', 0, '/media/images/2015/01/linhvuc2.jpg', 1420620879, 0, 0, '', '', 0, 0, 1),
(5, 8, 'dự án 5', 'five projects', 'du-an-5', 'adg', 'gffg', '<p>fg</p>', 0, '/media/images/2015/01/partner.jpg', 1420788169, 0, 0, '', '', 0, 0, 1),
(6, 8, 'dự án 6', 'six projects', 'du-an-6', 'sd', 'gfg', '<p>fdgf</p>', 0, '/media/images/2014/12/Untitled-1.jpg', 1420789397, 1421394571, 1422604171, 'công ty abc', '', 0, 0, 1);

-- --------------------------------------------------------

--
-- Table structure for table `project_images`
--

CREATE TABLE `project_images` (
  `pji_id` int(11) NOT NULL,
  `pji_prj_id` int(11) NOT NULL,
  `pji_image` varchar(255) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

--
-- Dumping data for table `project_images`
--

INSERT INTO `project_images` (`pji_id`, `pji_prj_id`, `pji_image`) VALUES
(10, 1, 'conguoc1.jpg'),
(11, 1, 'map.png'),
(14, 6, '4ec6882e02f634a7005b72e1409c0603_3_5_0_1099_1820_600_720_0003936380.jpg'),
(15, 6, '0349f24a422cf9c5df9eb7ca9bf81284_3_5_0_1478_1353_600_720_0013018302.jpg');

-- --------------------------------------------------------

--
-- Table structure for table `recruitment`
--

CREATE TABLE `recruitment` (
  `rec_id` int(11) NOT NULL,
  `rec_title` varchar(255) NOT NULL,
  `rec_title_en` varchar(255) NOT NULL,
  `rec_alias` varchar(255) NOT NULL,
  `rec_cat_id` int(11) NOT NULL,
  `rec_detail` text NOT NULL,
  `rec_summary` text NOT NULL,
  `rec_summary_en` text NOT NULL,
  `rec_detail_en` text NOT NULL,
  `rec_active` tinyint(4) NOT NULL,
  `rec_date` int(11) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

--
-- Dumping data for table `recruitment`
--

INSERT INTO `recruitment` (`rec_id`, `rec_title`, `rec_title_en`, `rec_alias`, `rec_cat_id`, `rec_detail`, `rec_summary`, `rec_summary_en`, `rec_detail_en`, `rec_active`, `rec_date`) VALUES
(1, 'Tuyển lập trình IOS trâu', 'IOS developer', 'tuyen-lap-trinh-ios-trau', 10, '<p>afdffd</p>', 'abc', 'E', '', 1, 1427903630),
(2, 'Nhân viên kế toán ', 'en', 'nhan-vien-ke-toan', 11, '<p>â</p>', 'abaaaaaaaa', '', '', 1, 1427904728);

-- --------------------------------------------------------

--
-- Table structure for table `recruitment_resume`
--

CREATE TABLE `recruitment_resume` (
  `rer_id` int(11) NOT NULL,
  `rer_name` varchar(255) NOT NULL,
  `rer_birthday` int(11) NOT NULL,
  `rer_sex` tinyint(4) NOT NULL,
  `rer_email` varchar(255) NOT NULL,
  `rer_phone` varchar(255) NOT NULL,
  `rer_position` int(11) NOT NULL,
  `rer_message` text NOT NULL,
  `rer_filename` varchar(255) NOT NULL,
  `rer_filename_other` varchar(255) NOT NULL,
  `rer_check` tinyint(4) NOT NULL,
  `rer_date` int(11) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

--
-- Dumping data for table `recruitment_resume`
--

INSERT INTO `recruitment_resume` (`rer_id`, `rer_name`, `rer_birthday`, `rer_sex`, `rer_email`, `rer_phone`, `rer_position`, `rer_message`, `rer_filename`, `rer_filename_other`, `rer_check`, `rer_date`) VALUES
(6, 'Trung linh', 724739995, 2, 'xu_koj@yahoo.com', '01688646576', 0, 'à', '', '', 0, 1427949595),
(7, 'Tiến Nguyễn', 701584909, 2, 'xu_koj@yahoo.com', '01688646576', 0, 'â', '', '', 0, 1427949709),
(8, 'Trung linh', 724739995, 2, 'xu_koj@yahoo.com', '01688646576', 0, 'à', '', '', 0, 1427949595),
(9, 'Tiến Nguyễn', 701584909, 2, 'xu_koj@yahoo.com', '01688646576', 0, 'â', '', '', 0, 1427949709),
(10, 'Trung linh', 724739995, 2, 'xu_koj@yahoo.com', '01688646576', 0, 'à', '', '', 0, 1427949595),
(11, 'Tiến Nguyễn', 701584909, 2, 'xu_koj@yahoo.com', '01688646576', 0, 'â', '', '', 0, 1427949709),
(12, 'Trung linh', 724739995, 2, 'xu_koj@yahoo.com', '01688646576', 0, 'à', '', '', 0, 1427949595),
(13, 'Tiến Nguyễn', 701584909, 2, 'xu_koj@yahoo.com', '01688646576', 0, 'â', '', '', 0, 1427949709),
(14, 'Trung linh', 724739995, 2, 'xu_koj@yahoo.com', '01688646576', 0, 'à', '', '', 0, 1427949595),
(15, 'Tiến Nguyễn', 701584909, 2, 'xu_koj@yahoo.com', '01688646576', 0, 'â', '', '', 0, 1427949709),
(16, 'Trung linh', 724739995, 2, 'xu_koj@yahoo.com', '01688646576', 0, 'à', '', '', 0, 1427949595),
(17, 'Tiến Nguyễn', 701584909, 2, 'xu_koj@yahoo.com', '01688646576', 0, 'â', '', '', 0, 1427949709),
(18, 'Trung linh', 724739995, 2, 'xu_koj@yahoo.com', '01688646576', 0, 'à', '', '', 0, 1427949595),
(19, 'Tiến Nguyễn', 701584909, 2, 'xu_koj@yahoo.com', '01688646576', 0, 'â', '', '', 0, 1427949709),
(20, 'Trung linh', 724739995, 2, 'xu_koj@yahoo.com', '01688646576', 0, 'à', '', '', 0, 1427949595),
(21, 'Tiến Nguyễn', 701584909, 2, 'xu_koj@yahoo.com', '01688646576', 0, 'â', '', '', 0, 1427949709),
(22, 'Trung linh', 724739995, 2, 'xu_koj@yahoo.com', '01688646576', 0, 'à', '', '', 0, 1427949595),
(23, 'Tiến Nguyễn', 701584909, 2, 'xu_koj@yahoo.com', '01688646576', 0, 'â', '', '', 0, 1427949709),
(24, 'Trung linh', 724739995, 2, 'xu_koj@yahoo.com', '01688646576', 0, 'à', '', '', 0, 1427949595),
(25, 'Tiến Nguyễn', 701584909, 2, 'xu_koj@yahoo.com', '01688646576', 0, 'â', '', '', 0, 1427949709),
(26, 'Trung linh', 724739995, 2, 'xu_koj@yahoo.com', '01688646576', 0, 'à', '', '', 0, 1427949595),
(27, 'Tiến Nguyễn', 701584909, 2, 'xu_koj@yahoo.com', '01688646576', 0, 'â', '', '', 0, 1427949709),
(28, 'Trung linh', 724739995, 2, 'xu_koj@yahoo.com', '01688646576', 0, 'à', '', '', 0, 1427949595),
(29, 'Tiến Nguyễn', 701584909, 2, 'xu_koj@yahoo.com', '01688646576', 0, 'â', '', '', 0, 1427949709),
(30, 'Trung linh', 724739995, 2, 'xu_koj@yahoo.com', '01688646576', 0, 'à', '', '', 0, 1427949595),
(31, 'Tiến Nguyễn', 701584909, 2, 'xu_koj@yahoo.com', '01688646576', 0, 'â', '', '', 0, 1427949709),
(32, 'Trung linh', 724739995, 2, 'xu_koj@yahoo.com', '01688646576', 0, 'à', '', '', 0, 1427949595),
(33, 'Tiến Nguyễn', 701584909, 2, 'xu_koj@yahoo.com', '01688646576', 0, 'â', '', '', 0, 1427949709),
(34, 'Trung linh', 724739995, 2, 'xu_koj@yahoo.com', '01688646576', 0, 'à', '', '', 0, 1427949595),
(35, 'Tiến Nguyễn', 701584909, 2, 'xu_koj@yahoo.com', '01688646576', 0, 'â', '', '', 0, 1427949709),
(36, 'Trung linh', 724739995, 2, 'xu_koj@yahoo.com', '01688646576', 0, 'à', '', '', 0, 1427949595),
(37, 'Tiến Nguyễn', 701584909, 2, 'xu_koj@yahoo.com', '01688646576', 0, 'â', '', '', 0, 1427949709);

-- --------------------------------------------------------

--
-- Table structure for table `request_for_quotation`
--

CREATE TABLE `request_for_quotation` (
  `rfq_id` int(11) NOT NULL,
  `rfq_firstname` varchar(255) NOT NULL,
  `rfq_lastname` varchar(255) NOT NULL,
  `rfq_company` varchar(255) NOT NULL,
  `rfq_address` text NOT NULL,
  `rfq_province` tinyint(4) NOT NULL,
  `rfq_phone` varchar(255) NOT NULL,
  `rfq_email` varchar(255) NOT NULL,
  `rfq_linkproduct` text NOT NULL,
  `rfq_reply` tinyint(4) NOT NULL,
  `rfq_date` int(11) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

--
-- Dumping data for table `request_for_quotation`
--

INSERT INTO `request_for_quotation` (`rfq_id`, `rfq_firstname`, `rfq_lastname`, `rfq_company`, `rfq_address`, `rfq_province`, `rfq_phone`, `rfq_email`, `rfq_linkproduct`, `rfq_reply`, `rfq_date`) VALUES
(9, 't', 't', 't', 't', 2, '4234154', 'tiennhss@gmail.com', 'sd', 0, 1406340499);

-- --------------------------------------------------------

--
-- Table structure for table `services`
--

CREATE TABLE `services` (
  `ser_id` int(11) NOT NULL,
  `ser_title` varchar(255) NOT NULL,
  `ser_title_en` varchar(255) NOT NULL,
  `ser_alias` varchar(255) NOT NULL,
  `ser_tags` varchar(255) NOT NULL,
  `ser_cat_id` int(11) NOT NULL,
  `ser_summary` text NOT NULL,
  `ser_summary_en` text NOT NULL,
  `ser_detail` text NOT NULL,
  `ser_detail_en` text NOT NULL,
  `ser_image` varchar(255) NOT NULL,
  `ser_date` int(11) NOT NULL,
  `ser_hot` int(11) NOT NULL,
  `ser_active` int(11) NOT NULL,
  `ser_adm_id` int(11) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

--
-- Dumping data for table `services`
--

INSERT INTO `services` (`ser_id`, `ser_title`, `ser_title_en`, `ser_alias`, `ser_tags`, `ser_cat_id`, `ser_summary`, `ser_summary_en`, `ser_detail`, `ser_detail_en`, `ser_image`, `ser_date`, `ser_hot`, `ser_active`, `ser_adm_id`) VALUES
(1, 'Thanh toán qua thẻ', 'payment card', 'thanh-toan-qua-the', '', 1, 'abc', '', '<p>Quản lý khách hàng</p>\r\n<p>Tập trung cơ sở dữ liệu khách hàng. Khắc phục</p>\r\n<p>được việc quản lý khách hàng như hiện nay:</p>\r\n<p>Quản lý dữ liệu khách hàng theo dịch vụ</p>\r\n<p>Quản lý dữ liệu khách hàng theo đơn vị.</p>\r\n<p>Kiểm soát được mức độ tiêu dùng của khách hàng</p>\r\n<p>Chăm sóc khách hàng</p>\r\n<p>Thoả mãn tối đa nhu cầu sử dụng dịch vụ của khách hàng.</p>\r\n<p>Khuyến khích, tăng cường mức độ sử dụng của khách hàng thông qua các chương trình chăm sóc khách hàng đặc biệt.</p>\r\n<p>Tăng tính cạnh tranh dịch vụ với các đối thủ</p>\r\n<p>Kết hợp với các sản phẩm giá trị gia tăng của VNPT Hà Nội đưa ra các gói dịch vụ mới cho khách hàng.</p>\r\n<p>Tích luỹ điểm thưởng vào thẻ chăm sóc khách hàng</p>\r\n<p>Dùng thẻ để truy vấn thông tin khách hàng tại các điểm chấp nhận thẻ của VNPT Hà Nội</p>\r\n<p>Đưa ra các chương trình khuyến mại mới, khác biệt so với đối thủ. Tạo thế mạnh cạnh tranh trên thị trường</p>\r\n<p><img src="file:///D:/xampp/htdocs/vnptepay/home/image/product_detail.jpg" alt="" /><img style="max-width: 100%;" title="" src="../../../media/images/2015/04/product_detail.jpg" alt="" /></p>\r\n<p>Giải pháp được phát triển dựa trên định hướng chăm sóc theo nhóm khách hàng của VNPT Hà Nội.</p>\r\n<p>Cộng điểm thưởng cho nhóm khách hàng mục tiêu để khuyến khích khách hàng sử dụng dịch vụ.</p>\r\n<p>Phát hành thẻ khách hàng để có thể quản lý và nâng cao tính thuận tiện cho khách hàng thông qua các thiết bị mở rộng (đầu đọc thẻ).</p>\r\n<p>Thẻ khách hàng độc lập. VNPT Hà Nội tự phát hành thẻ của mình</p>\r\n<p>Thẻ kết hợp: Kết hợp với VNPT EPAY phát hành thẻ.</p>\r\n<p>Thẻ tích luỹ điểm</p>\r\n<p>Thẻ giảm giá…</p>\r\n<p>Trả thưởng cho khách khảng thông qua việc đổi điểm thưởng lấy quà tặng theo các chương trình tặng quà / tại các ngày Hội chăm sóc khách hàng do VNPT Hà Nội tổ chức.</p>\r\n<p>Tổ chức các chương trình đổi quà tặng tại các Đối tác liên kết để gia tăng mức độ mua hàng, sử dụng dịch vụ của Đối tác liên kết.</p>\r\n<p>Gán mã quay số dự thưởng và thực hiện quay số dự thường cho khách hàng nhân các ngày hội khách hàng của VNPT Hà Nội</p>', '', '/media/images/2015/04/product1.png', 1427872135, 0, 1, 0),
(2, 'SMS', 'SMS', 'sms', '', 1, '', '', '<p>aaaa</p>', '', '/media/images/2015/04/product2.png', 1427862777, 0, 1, 0),
(3, 'Top up điện thoại', 'Top up phone', 'top-up-dien-thoai', '', 8, 'a', '', '', '', '/media/images/2015/04/product4.png', 1427863371, 0, 1, 0),
(4, 'MEGACARD.VN', 'MEGACARD.VN', 'megacard-vn', '', 2, '', '', '', '', '/media/images/2015/04/product6.png', 1427863438, 0, 1, 0),
(5, 'megacard1', '', 'megacard1', '', 9, '', '', '', '', '/media/images/2015/04/product9.jpg', 1427863487, 0, 1, 0),
(6, 'megacard2', 'megacard2', 'megacard2', '', 9, '', '', '', '', '/media/images/2015/04/product10.jpg', 1427863652, 0, 1, 0),
(7, 'megacard3', 'megacard3', 'megacard3', '', 9, '', '', '', '', '/media/images/2015/04/product11.jpg', 1427863680, 0, 1, 0),
(8, 'Top up game', 'Top up game', 'top-up-game', '', 8, '', '', '', '', '/media/images/2015/04/product5.png', 1427864041, 0, 1, 0),
(9, 'Megabank', 'Megabank', 'megabank', '', 1, '', '', '', '', '/media/images/2015/04/product3.png', 1427864074, 0, 1, 0);

-- --------------------------------------------------------

--
-- Table structure for table `slides`
--

CREATE TABLE `slides` (
  `sli_id` int(11) NOT NULL,
  `sli_title` varchar(255) NOT NULL,
  `sli_cat_id` int(11) NOT NULL,
  `sli_content` text NOT NULL,
  `sli_link` varchar(255) NOT NULL,
  `sli_position` int(11) NOT NULL,
  `sli_image` varchar(255) NOT NULL,
  `sli_active` tinyint(4) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

--
-- Dumping data for table `slides`
--

INSERT INTO `slides` (`sli_id`, `sli_title`, `sli_cat_id`, `sli_content`, `sli_link`, `sli_position`, `sli_image`, `sli_active`) VALUES
(1, '', 3, '', '', 2, '/media/images/2015/03/slides2.jpg', 1),
(2, '', 3, '', '', 1, '/media/images/2015/03/slides1.jpg', 1),
(3, '', 4, '', '', 0, '/media/images/2015/03/slider_introduction.jpg', 1),
(4, '', 4, '', '', 0, '/media/images/2015/03/slider_introduction.jpg', 1),
(5, '', 6, '', '', 0, '/media/images/2015/04/slider_culture.jpg', 1),
(6, '', 6, '', '', 0, '/media/images/2015/04/slider_culture.jpg', 1),
(7, '', 7, '', '', 0, '/media/images/2015/04/partners.png', 1);

-- --------------------------------------------------------

--
-- Table structure for table `slides_aboutus`
--

CREATE TABLE `slides_aboutus` (
  `sli_id` int(11) NOT NULL,
  `sli_title` varchar(255) NOT NULL,
  `sli_content` text NOT NULL,
  `sli_link` varchar(255) NOT NULL,
  `sli_position` int(11) NOT NULL,
  `sli_image` varchar(255) NOT NULL,
  `sli_active` tinyint(4) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

--
-- Dumping data for table `slides_aboutus`
--

INSERT INTO `slides_aboutus` (`sli_id`, `sli_title`, `sli_content`, `sli_link`, `sli_position`, `sli_image`, `sli_active`) VALUES
(11, '', '', '', 0, '/media/images/2015/03/slider_introduction.jpg', 1),
(12, '', '', '', 0, '/media/images/2015/03/slider_introduction.jpg', 1);

-- --------------------------------------------------------

--
-- Table structure for table `slides_mission`
--

CREATE TABLE `slides_mission` (
  `sli_id` int(11) NOT NULL,
  `sli_title` varchar(255) NOT NULL,
  `sli_content` text NOT NULL,
  `sli_link` varchar(255) NOT NULL,
  `sli_position` int(11) NOT NULL,
  `sli_image` varchar(255) NOT NULL,
  `sli_active` tinyint(4) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `suggestion_text`
--

CREATE TABLE `suggestion_text` (
  `sug_text` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `translate`
--

CREATE TABLE `translate` (
  `tra_id` int(11) NOT NULL,
  `tra_keyword` varchar(255) NOT NULL,
  `tra_text` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `use_id` int(11) NOT NULL,
  `use_facebook_id` double DEFAULT NULL,
  `use_linkfb` varchar(255) DEFAULT NULL,
  `use_email` varchar(255) DEFAULT NULL,
  `use_birthday` int(11) NOT NULL DEFAULT '0',
  `use_gender` tinyint(4) DEFAULT NULL,
  `use_avatar` varchar(255) DEFAULT NULL,
  `use_avatarfb` varchar(255) DEFAULT NULL,
  `use_firstname` varchar(255) DEFAULT NULL,
  `use_lastname` varchar(255) DEFAULT NULL,
  `use_name` varchar(255) DEFAULT NULL,
  `use_password` varchar(255) DEFAULT NULL,
  `use_security` int(11) NOT NULL DEFAULT '0',
  `use_type` varchar(255) DEFAULT NULL,
  `use_contact` text,
  `use_group` tinyint(4) DEFAULT NULL,
  `use_phone` varchar(20) DEFAULT NULL,
  `use_date` int(11) DEFAULT NULL,
  `use_had_profile` tinyint(4) NOT NULL,
  `use_active` tinyint(4) DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `aboutus`
--
ALTER TABLE `aboutus`
  ADD PRIMARY KEY (`abu_id`);

--
-- Indexes for table `accessory`
--
ALTER TABLE `accessory`
  ADD PRIMARY KEY (`acc_pro_id`);

--
-- Indexes for table `admin_users`
--
ALTER TABLE `admin_users`
  ADD PRIMARY KEY (`adm_id`);

--
-- Indexes for table `advertising`
--
ALTER TABLE `advertising`
  ADD PRIMARY KEY (`adv_id`);

--
-- Indexes for table `analytics`
--
ALTER TABLE `analytics`
  ADD PRIMARY KEY (`ana_id`);

--
-- Indexes for table `categories`
--
ALTER TABLE `categories`
  ADD PRIMARY KEY (`cat_id`);

--
-- Indexes for table `configuration`
--
ALTER TABLE `configuration`
  ADD PRIMARY KEY (`con_id`);

--
-- Indexes for table `contact`
--
ALTER TABLE `contact`
  ADD PRIMARY KEY (`con_id`);

--
-- Indexes for table `culture`
--
ALTER TABLE `culture`
  ADD PRIMARY KEY (`cul_id`);

--
-- Indexes for table `email_quote`
--
ALTER TABLE `email_quote`
  ADD PRIMARY KEY (`eqt_id`);

--
-- Indexes for table `faqs`
--
ALTER TABLE `faqs`
  ADD PRIMARY KEY (`faq_id`);

--
-- Indexes for table `feedback`
--
ALTER TABLE `feedback`
  ADD PRIMARY KEY (`fee_id`);

--
-- Indexes for table `forms`
--
ALTER TABLE `forms`
  ADD PRIMARY KEY (`for_id`);

--
-- Indexes for table `images_upload`
--
ALTER TABLE `images_upload`
  ADD PRIMARY KEY (`imu_id`);

--
-- Indexes for table `kdims`
--
ALTER TABLE `kdims`
  ADD PRIMARY KEY (`kdm_id`);

--
-- Indexes for table `link_footer`
--
ALTER TABLE `link_footer`
  ADD PRIMARY KEY (`lft_id`);

--
-- Indexes for table `log_add`
--
ALTER TABLE `log_add`
  ADD PRIMARY KEY (`lga_id`);

--
-- Indexes for table `log_edit`
--
ALTER TABLE `log_edit`
  ADD PRIMARY KEY (`lge_id`);

--
-- Indexes for table `manager`
--
ALTER TABLE `manager`
  ADD PRIMARY KEY (`mng_id`);

--
-- Indexes for table `manager_images`
--
ALTER TABLE `manager_images`
  ADD PRIMARY KEY (`mni_id`);

--
-- Indexes for table `meta_seo`
--
ALTER TABLE `meta_seo`
  ADD PRIMARY KEY (`met_id`);

--
-- Indexes for table `mission`
--
ALTER TABLE `mission`
  ADD PRIMARY KEY (`mis_id`);

--
-- Indexes for table `modules`
--
ALTER TABLE `modules`
  ADD PRIMARY KEY (`mod_id`);

--
-- Indexes for table `news`
--
ALTER TABLE `news`
  ADD PRIMARY KEY (`new_id`);

--
-- Indexes for table `office_contact`
--
ALTER TABLE `office_contact`
  ADD PRIMARY KEY (`off_id`);

--
-- Indexes for table `orders`
--
ALTER TABLE `orders`
  ADD PRIMARY KEY (`ord_id`);

--
-- Indexes for table `page`
--
ALTER TABLE `page`
  ADD PRIMARY KEY (`pag_id`);

--
-- Indexes for table `partner`
--
ALTER TABLE `partner`
  ADD PRIMARY KEY (`par_id`);

--
-- Indexes for table `post`
--
ALTER TABLE `post`
  ADD PRIMARY KEY (`pos_id`);

--
-- Indexes for table `project`
--
ALTER TABLE `project`
  ADD PRIMARY KEY (`prj_id`);

--
-- Indexes for table `project_images`
--
ALTER TABLE `project_images`
  ADD PRIMARY KEY (`pji_id`);

--
-- Indexes for table `recruitment`
--
ALTER TABLE `recruitment`
  ADD PRIMARY KEY (`rec_id`);

--
-- Indexes for table `recruitment_resume`
--
ALTER TABLE `recruitment_resume`
  ADD PRIMARY KEY (`rer_id`);

--
-- Indexes for table `request_for_quotation`
--
ALTER TABLE `request_for_quotation`
  ADD PRIMARY KEY (`rfq_id`);

--
-- Indexes for table `services`
--
ALTER TABLE `services`
  ADD PRIMARY KEY (`ser_id`);

--
-- Indexes for table `slides`
--
ALTER TABLE `slides`
  ADD PRIMARY KEY (`sli_id`);

--
-- Indexes for table `slides_aboutus`
--
ALTER TABLE `slides_aboutus`
  ADD PRIMARY KEY (`sli_id`);

--
-- Indexes for table `slides_mission`
--
ALTER TABLE `slides_mission`
  ADD PRIMARY KEY (`sli_id`);

--
-- Indexes for table `suggestion_text`
--
ALTER TABLE `suggestion_text`
  ADD PRIMARY KEY (`sug_text`),
  ADD KEY `sug_text` (`sug_text`);

--
-- Indexes for table `translate`
--
ALTER TABLE `translate`
  ADD PRIMARY KEY (`tra_id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`use_id`),
  ADD UNIQUE KEY `use_email` (`use_email`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `aboutus`
--
ALTER TABLE `aboutus`
  MODIFY `abu_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT for table `admin_users`
--
ALTER TABLE `admin_users`
  MODIFY `adm_id` tinyint(4) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
--
-- AUTO_INCREMENT for table `advertising`
--
ALTER TABLE `advertising`
  MODIFY `adv_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
--
-- AUTO_INCREMENT for table `analytics`
--
ALTER TABLE `analytics`
  MODIFY `ana_id` int(15) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=196;
--
-- AUTO_INCREMENT for table `categories`
--
ALTER TABLE `categories`
  MODIFY `cat_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;
--
-- AUTO_INCREMENT for table `contact`
--
ALTER TABLE `contact`
  MODIFY `con_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;
--
-- AUTO_INCREMENT for table `culture`
--
ALTER TABLE `culture`
  MODIFY `cul_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
--
-- AUTO_INCREMENT for table `email_quote`
--
ALTER TABLE `email_quote`
  MODIFY `eqt_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;
--
-- AUTO_INCREMENT for table `faqs`
--
ALTER TABLE `faqs`
  MODIFY `faq_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;
--
-- AUTO_INCREMENT for table `feedback`
--
ALTER TABLE `feedback`
  MODIFY `fee_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;
--
-- AUTO_INCREMENT for table `forms`
--
ALTER TABLE `forms`
  MODIFY `for_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;
--
-- AUTO_INCREMENT for table `images_upload`
--
ALTER TABLE `images_upload`
  MODIFY `imu_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=42;
--
-- AUTO_INCREMENT for table `kdims`
--
ALTER TABLE `kdims`
  MODIFY `kdm_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT for table `link_footer`
--
ALTER TABLE `link_footer`
  MODIFY `lft_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;
--
-- AUTO_INCREMENT for table `log_add`
--
ALTER TABLE `log_add`
  MODIFY `lga_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=36;
--
-- AUTO_INCREMENT for table `log_edit`
--
ALTER TABLE `log_edit`
  MODIFY `lge_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;
--
-- AUTO_INCREMENT for table `manager`
--
ALTER TABLE `manager`
  MODIFY `mng_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT for table `manager_images`
--
ALTER TABLE `manager_images`
  MODIFY `mni_id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `meta_seo`
--
ALTER TABLE `meta_seo`
  MODIFY `met_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=76;
--
-- AUTO_INCREMENT for table `mission`
--
ALTER TABLE `mission`
  MODIFY `mis_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT for table `modules`
--
ALTER TABLE `modules`
  MODIFY `mod_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=38;
--
-- AUTO_INCREMENT for table `news`
--
ALTER TABLE `news`
  MODIFY `new_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
--
-- AUTO_INCREMENT for table `office_contact`
--
ALTER TABLE `office_contact`
  MODIFY `off_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;
--
-- AUTO_INCREMENT for table `orders`
--
ALTER TABLE `orders`
  MODIFY `ord_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;
--
-- AUTO_INCREMENT for table `page`
--
ALTER TABLE `page`
  MODIFY `pag_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;
--
-- AUTO_INCREMENT for table `partner`
--
ALTER TABLE `partner`
  MODIFY `par_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT for table `post`
--
ALTER TABLE `post`
  MODIFY `pos_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;
--
-- AUTO_INCREMENT for table `project`
--
ALTER TABLE `project`
  MODIFY `prj_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;
--
-- AUTO_INCREMENT for table `project_images`
--
ALTER TABLE `project_images`
  MODIFY `pji_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;
--
-- AUTO_INCREMENT for table `recruitment`
--
ALTER TABLE `recruitment`
  MODIFY `rec_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT for table `recruitment_resume`
--
ALTER TABLE `recruitment_resume`
  MODIFY `rer_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=38;
--
-- AUTO_INCREMENT for table `request_for_quotation`
--
ALTER TABLE `request_for_quotation`
  MODIFY `rfq_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;
--
-- AUTO_INCREMENT for table `services`
--
ALTER TABLE `services`
  MODIFY `ser_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;
--
-- AUTO_INCREMENT for table `slides`
--
ALTER TABLE `slides`
  MODIFY `sli_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;
--
-- AUTO_INCREMENT for table `slides_aboutus`
--
ALTER TABLE `slides_aboutus`
  MODIFY `sli_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;
--
-- AUTO_INCREMENT for table `slides_mission`
--
ALTER TABLE `slides_mission`
  MODIFY `sli_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;
--
-- AUTO_INCREMENT for table `translate`
--
ALTER TABLE `translate`
  MODIFY `tra_id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `use_id` int(11) NOT NULL AUTO_INCREMENT;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
