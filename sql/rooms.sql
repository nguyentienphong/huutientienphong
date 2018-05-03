-- phpMyAdmin SQL Dump
-- version 4.5.1
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: May 03, 2018 at 10:47 AM
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
-- Table structure for table `rooms`
--

CREATE TABLE `rooms` (
  `roo_id` int(11) NOT NULL,
  `roo_name` varchar(255) NOT NULL,
  `roo_name_en` varchar(255) NOT NULL,
  `roo_name_ko` varchar(255) NOT NULL,
  `roo_alias` varchar(255) NOT NULL,
  `roo_number` int(11) NOT NULL,
  `roo_image` varchar(255) NOT NULL,
  `roo_description` text NOT NULL,
  `roo_description_en` text NOT NULL,
  `roo_description_ko` text NOT NULL,
  `roo_price` int(11) NOT NULL,
  `roo_detail` text NOT NULL,
  `roo_detail_en` text NOT NULL,
  `detail_ko` text NOT NULL,
  `roo_position` tinyint(4) NOT NULL,
  `roo_active` int(11) NOT NULL,
  `roo_status` tinyint(4) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `rooms`
--

INSERT INTO `rooms` (`roo_id`, `roo_name`, `roo_name_en`, `roo_name_ko`, `roo_alias`, `roo_number`, `roo_image`, `roo_description`, `roo_description_en`, `roo_description_ko`, `roo_price`, `roo_detail`, `roo_detail_en`, `detail_ko`, `roo_position`, `roo_active`, `roo_status`) VALUES
(1, 'Phòng đơn', '', '', 'phong-don', 20, '/media/images/2018/05/room-1.jpg', 'Phòng ngủ, nơi có thể nhìn thấy cảnh quan đẹp nhất của Phổ Yên với nội thất và tiện nghi phong phú được lắp đặt sẽ làm cho kỳ nghỉ bạn mơ ước trở thành hiện thực. Phòng ngủ được thiết kế hài hòa, tinh tế, chắc chắn sẽ làm hài lòng Quý Khách. Phòng được trang bị hiện đại, đầy đủ tiện nghi như: điện thoại quốc tế, truyền hình vệ tinh, Wifi, mini-bar, két an toàn, máy sấy tóc, áo choàng tắm… và dịch vụ phòng 24/24.', '', '', 500000, 'Phòng Đơn\r\nPhòng Đơn Giá phòng104 USD/ Ðêm\r\nTỔNG QUAN\r\nChúng tôi sẽ mang đến cho bạn những ký ức tốt đẹp nhất mà bạn có thể chia sẻ với gia đình, người yêu hoặc bạn bè của bạn.\r\n\r\nTIỆN ÍCH\r\n1. Các thiết bị và tiện nghi trong phòng \r\n\r\nKết nối internet tốc độ cao miễn phí ( Wi - fi & Wire )\r\nĐiện thoại quốc tế\r\nTV màn hình phẳng 43 inch\r\nTruyền hình vệ tinh\r\nĐiều hòa nhiệt độ hai chiều\r\nBàn ghế làm việc\r\nKhóa thẻ từ hiện đại\r\nKét an toàn\r\nCà phê miễn phí\r\nTủ lạnh\r\n02  chai nước uống tinh khiết miễn phí\r\nTủ đựng quần áo\r\nKhăn lau giày và đón gót giày\r\n2. Các thiết bị và tiện nghi phòng tắm:\r\n\r\nBồn rửa mặt & gương\r\nVòi hoa sen hiện đại\r\nMáy sấy tóc\r\nKhăn choàng tắm, khăn lau tay,  khăn mặt chất lượng cao\r\nThảm chùi chân\r\nCác tiện nghi khác: xà phòng, dầu gội, sữa tắm, dao cạo râu, tăm bông, bàn chải đánh răng, kem đánh răng, lược.', '', '', 1, 1, 1),
(2, 'Phòng đôi', '', '', 'phong-don', 20, '/media/images/2018/05/room-2.jpg', 'Phòng ngủ, nơi có thể nhìn thấy cảnh quan đẹp nhất của Phổ Yên với nội thất và tiện nghi phong phú được lắp đặt sẽ làm cho kỳ nghỉ bạn mơ ước trở thành hiện thực. Phòng ngủ được thiết kế hài hòa, tinh tế, chắc chắn sẽ làm hài lòng Quý Khách. Phòng được trang bị hiện đại, đầy đủ tiện nghi như: điện thoại quốc tế, truyền hình vệ tinh, Wifi, mini-bar, két an toàn, máy sấy tóc, áo choàng tắm… và dịch vụ phòng 24/24.', 'EN', 'Korea', 500000, 'Phòng Đơn\r\nPhòng Đơn Giá phòng104 USD/ Ðêm\r\nTỔNG QUAN\r\nChúng tôi sẽ mang đến cho bạn những ký ức tốt đẹp nhất mà bạn có thể chia sẻ với gia đình, người yêu hoặc bạn bè của bạn.\r\n\r\nTIỆN ÍCH\r\n1. Các thiết bị và tiện nghi trong phòng \r\n\r\nKết nối internet tốc độ cao miễn phí ( Wi - fi & Wire )\r\nĐiện thoại quốc tế\r\nTV màn hình phẳng 43 inch\r\nTruyền hình vệ tinh\r\nĐiều hòa nhiệt độ hai chiều\r\nBàn ghế làm việc\r\nKhóa thẻ từ hiện đại\r\nKét an toàn\r\nCà phê miễn phí\r\nTủ lạnh\r\n02  chai nước uống tinh khiết miễn phí\r\nTủ đựng quần áo\r\nKhăn lau giày và đón gót giày\r\n2. Các thiết bị và tiện nghi phòng tắm:\r\n\r\nBồn rửa mặt & gương\r\nVòi hoa sen hiện đại\r\nMáy sấy tóc\r\nKhăn choàng tắm, khăn lau tay,  khăn mặt chất lượng cao\r\nThảm chùi chân\r\nCác tiện nghi khác: xà phòng, dầu gội, sữa tắm, dao cạo râu, tăm bông, bàn chải đánh răng, kem đánh răng, lược.', 'EN', 'Korea', 2, 1, 1),
(3, 'Phòng đôi', '', '', 'phong-don', 20, '/media/images/2018/05/room-2.jpg', 'Phòng ngủ, nơi có thể nhìn thấy cảnh quan đẹp nhất của Phổ Yên với nội thất và tiện nghi phong phú được lắp đặt sẽ làm cho kỳ nghỉ bạn mơ ước trở thành hiện thực. Phòng ngủ được thiết kế hài hòa, tinh tế, chắc chắn sẽ làm hài lòng Quý Khách. Phòng được trang bị hiện đại, đầy đủ tiện nghi như: điện thoại quốc tế, truyền hình vệ tinh, Wifi, mini-bar, két an toàn, máy sấy tóc, áo choàng tắm… và dịch vụ phòng 24/24.', 'EN', 'Korea', 500000, 'Phòng Đơn\r\nPhòng Đơn Giá phòng104 USD/ Ðêm\r\nTỔNG QUAN\r\nChúng tôi sẽ mang đến cho bạn những ký ức tốt đẹp nhất mà bạn có thể chia sẻ với gia đình, người yêu hoặc bạn bè của bạn.\r\n\r\nTIỆN ÍCH\r\n1. Các thiết bị và tiện nghi trong phòng \r\n\r\nKết nối internet tốc độ cao miễn phí ( Wi - fi & Wire )\r\nĐiện thoại quốc tế\r\nTV màn hình phẳng 43 inch\r\nTruyền hình vệ tinh\r\nĐiều hòa nhiệt độ hai chiều\r\nBàn ghế làm việc\r\nKhóa thẻ từ hiện đại\r\nKét an toàn\r\nCà phê miễn phí\r\nTủ lạnh\r\n02  chai nước uống tinh khiết miễn phí\r\nTủ đựng quần áo\r\nKhăn lau giày và đón gót giày\r\n2. Các thiết bị và tiện nghi phòng tắm:\r\n\r\nBồn rửa mặt & gương\r\nVòi hoa sen hiện đại\r\nMáy sấy tóc\r\nKhăn choàng tắm, khăn lau tay,  khăn mặt chất lượng cao\r\nThảm chùi chân\r\nCác tiện nghi khác: xà phòng, dầu gội, sữa tắm, dao cạo râu, tăm bông, bàn chải đánh răng, kem đánh răng, lược.', 'EN', 'Korea', 2, 1, 1),
(4, 'Phòng đôi', '', '', 'phong-don', 20, '/media/images/2018/05/room-2.jpg', 'Phòng ngủ, nơi có thể nhìn thấy cảnh quan đẹp nhất của Phổ Yên với nội thất và tiện nghi phong phú được lắp đặt sẽ làm cho kỳ nghỉ bạn mơ ước trở thành hiện thực. Phòng ngủ được thiết kế hài hòa, tinh tế, chắc chắn sẽ làm hài lòng Quý Khách. Phòng được trang bị hiện đại, đầy đủ tiện nghi như: điện thoại quốc tế, truyền hình vệ tinh, Wifi, mini-bar, két an toàn, máy sấy tóc, áo choàng tắm… và dịch vụ phòng 24/24.', 'EN', 'Korea', 500000, 'Phòng Đơn\r\nPhòng Đơn Giá phòng104 USD/ Ðêm\r\nTỔNG QUAN\r\nChúng tôi sẽ mang đến cho bạn những ký ức tốt đẹp nhất mà bạn có thể chia sẻ với gia đình, người yêu hoặc bạn bè của bạn.\r\n\r\nTIỆN ÍCH\r\n1. Các thiết bị và tiện nghi trong phòng \r\n\r\nKết nối internet tốc độ cao miễn phí ( Wi - fi & Wire )\r\nĐiện thoại quốc tế\r\nTV màn hình phẳng 43 inch\r\nTruyền hình vệ tinh\r\nĐiều hòa nhiệt độ hai chiều\r\nBàn ghế làm việc\r\nKhóa thẻ từ hiện đại\r\nKét an toàn\r\nCà phê miễn phí\r\nTủ lạnh\r\n02  chai nước uống tinh khiết miễn phí\r\nTủ đựng quần áo\r\nKhăn lau giày và đón gót giày\r\n2. Các thiết bị và tiện nghi phòng tắm:\r\n\r\nBồn rửa mặt & gương\r\nVòi hoa sen hiện đại\r\nMáy sấy tóc\r\nKhăn choàng tắm, khăn lau tay,  khăn mặt chất lượng cao\r\nThảm chùi chân\r\nCác tiện nghi khác: xà phòng, dầu gội, sữa tắm, dao cạo râu, tăm bông, bàn chải đánh răng, kem đánh răng, lược.', 'EN', 'Korea', 2, 1, 1);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `rooms`
--
ALTER TABLE `rooms`
  ADD PRIMARY KEY (`roo_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `rooms`
--
ALTER TABLE `rooms`
  MODIFY `roo_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
