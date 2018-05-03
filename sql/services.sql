-- phpMyAdmin SQL Dump
-- version 4.5.1
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: May 03, 2018 at 10:56 AM
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
-- Table structure for table `services`
--
DROP TABLE services;
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
  `ser_title_ko` varchar(255) NOT NULL,
  `ser_summary_ko` text NOT NULL,
  `ser_detail_ko` text NOT NULL,
  `ser_image` varchar(255) NOT NULL,
  `ser_date` int(11) NOT NULL,
  `ser_hot` int(11) NOT NULL,
  `ser_active` int(11) NOT NULL,
  `ser_adm_id` int(11) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

--
-- Dumping data for table `services`
--

INSERT INTO `services` (`ser_id`, `ser_title`, `ser_title_en`, `ser_alias`, `ser_tags`, `ser_cat_id`, `ser_summary`, `ser_summary_en`, `ser_detail`, `ser_detail_en`, `ser_title_ko`, `ser_summary_ko`, `ser_detail_ko`, `ser_image`, `ser_date`, `ser_hot`, `ser_active`, `ser_adm_id`) VALUES
(1, 'Đón khách 24/7', 'payment card', 'thanh-toan-qua-the', '', 1, 'Chúng tôi phục phụ quý khách24/7', 'Separated they live in Bookmarksgrove right at the coast of the Semantics, a large language ocean. A small river named Duden flows by their place and supplies', '<p>Quản lý khách hàng</p>\r\n<p>Tập trung cơ sở dữ liệu khách hàng. Khắc phục</p>\r\n<p>được việc quản lý khách hàng như hiện nay:</p>\r\n<p>Quản lý dữ liệu khách hàng theo dịch vụ</p>\r\n<p>Quản lý dữ liệu khách hàng theo đơn vị.</p>\r\n<p>Kiểm soát được mức độ tiêu dùng của khách hàng</p>\r\n<p>Chăm sóc khách hàng</p>\r\n<p>Thoả mãn tối đa nhu cầu sử dụng dịch vụ của khách hàng.</p>\r\n<p>Khuyến khích, tăng cường mức độ sử dụng của khách hàng thông qua các chương trình chăm sóc khách hàng đặc biệt.</p>\r\n<p>Tăng tính cạnh tranh dịch vụ với các đối thủ</p>\r\n<p>Kết hợp với các sản phẩm giá trị gia tăng của VNPT Hà Nội đưa ra các gói dịch vụ mới cho khách hàng.</p>\r\n<p>Tích luỹ điểm thưởng vào thẻ chăm sóc khách hàng</p>\r\n<p>Dùng thẻ để truy vấn thông tin khách hàng tại các điểm chấp nhận thẻ của VNPT Hà Nội</p>\r\n<p>Đưa ra các chương trình khuyến mại mới, khác biệt so với đối thủ. Tạo thế mạnh cạnh tranh trên thị trường</p>\r\n<p><img src="file:///D:/xampp/htdocs/vnptepay/home/image/product_detail.jpg" alt="" /><img style="max-width: 100%;" title="" src="../../../media/images/2015/04/product_detail.jpg" alt="" /></p>\r\n<p>Giải pháp được phát triển dựa trên định hướng chăm sóc theo nhóm khách hàng của VNPT Hà Nội.</p>\r\n<p>Cộng điểm thưởng cho nhóm khách hàng mục tiêu để khuyến khích khách hàng sử dụng dịch vụ.</p>\r\n<p>Phát hành thẻ khách hàng để có thể quản lý và nâng cao tính thuận tiện cho khách hàng thông qua các thiết bị mở rộng (đầu đọc thẻ).</p>\r\n<p>Thẻ khách hàng độc lập. VNPT Hà Nội tự phát hành thẻ của mình</p>\r\n<p>Thẻ kết hợp: Kết hợp với VNPT EPAY phát hành thẻ.</p>\r\n<p>Thẻ tích luỹ điểm</p>\r\n<p>Thẻ giảm giá…</p>\r\n<p>Trả thưởng cho khách khảng thông qua việc đổi điểm thưởng lấy quà tặng theo các chương trình tặng quà / tại các ngày Hội chăm sóc khách hàng do VNPT Hà Nội tổ chức.</p>\r\n<p>Tổ chức các chương trình đổi quà tặng tại các Đối tác liên kết để gia tăng mức độ mua hàng, sử dụng dịch vụ của Đối tác liên kết.</p>\r\n<p>Gán mã quay số dự thưởng và thực hiện quay số dự thường cho khách hàng nhân các ngày hội khách hàng của VNPT Hà Nội</p>', '24/7 Front Desk', '24/7 프론트 데스크', '분리 된 그들은 큰 언어의 바다 인 의미론의 해안에있는 Bookmarkgrove에 살고 있습니다. Duden이라는 작은 강이 그들의 장소와 물자에 흐른다.', '', '/media/images/2018/05/247.png', 1427872135, 0, 1, 0),
(2, 'Spa Suites', 'Spa Suites', 'sms', '', 1, 'Separated they live in Bookmarksgrove right at the coast of the Semantics, a large language ocean. A small river named Duden flows by their place and supplies', 'Separated they live in Bookmarksgrove right at the coast of the Semantics, a large language ocean. A small river named Duden flows by their place and supplies', '<p>aaaa</p>', 'Spa Suites', '', '분리 된 그들은 큰 언어의 바다 인 의미론의 해안에있는 Bookmarkgrove에 살고 있습니다. Duden이라는 작은 강이 그들의 장소와 물자에 흐른다.', '', '/media/images/2018/05/images (1).jpg', 1427862777, 0, 1, 0),
(3, 'Top up điện thoại', 'Top up phone', 'top-up-dien-thoai', '', 8, 'Separated they live in Bookmarksgrove right at the coast of the Semantics, a large language ocean. A small river named Duden flows by their place and supplies', 'Separated they live in Bookmarksgrove right at the coast of the Semantics, a large language ocean. A small river named Duden flows by their place and supplies', '', '', '', '분리 된 그들은 큰 언어의 바다 인 의미론의 해안에있는 Bookmarkgrove에 살고 있습니다. Duden이라는 작은 강이 그들의 장소와 물자에 흐른다.', '', '/media/images/2018/05/images (1).jpg', 1427863371, 0, 1, 0);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `services`
--
ALTER TABLE `services`
  ADD PRIMARY KEY (`ser_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `services`
--
ALTER TABLE `services`
  MODIFY `ser_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
