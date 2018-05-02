<?php
require_once 'resources/security/security.php';

?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Untitled Document</title>
<?=$load_header?>
<link rel="stylesheet" type="text/css" href="/admin/resources/js/morris-chart/morris-0.4.3.min.css">

</head>

<body style="background: #fff; padding: 20px;">
<div class="page-heading">
   <h3>
       Chào mừng bạn đến với trang Hướng dẫn
   </h3>
</div>
<div class="wrapper">
   <div class="row">
       <p><strong>Hướng dẫn sử dụng CMS</strong></p>
<p><strong>Mục lục</strong></p>
<p>I.Th&ocirc;ng tin chung</p>
<p>II. Hướng dẫn sử dụng CMS</p>
<p>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; <strong>1.Đăng nhập</strong></p>
<p><strong>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; 2.Sau khi đăng nhập</strong></p>
<p><strong>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; 3.C&aacute;ch thức quản l&yacute; 1 module(v&iacute; dụ)</strong></p>
<p><strong>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; 4.C&aacute;c module chung cần lưu &yacute;</strong></p>
<p><strong>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; 4a. module Cấu h&igrave;nh</strong></p>
<p><strong>4b. module t&agrave;i kho&agrave;n quản trị</strong></p>
<p><strong>4c. module Thư viện ảnh</strong></p>
<p><strong>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; 5.C&aacute;c n&uacute;t điều khiển chung cần biết</strong></p>
<p><strong>&nbsp;</strong></p>
<p><strong>&nbsp;</strong></p>
<p><strong>&nbsp;</strong></p>
<p><strong>&nbsp;</strong></p>
<p><strong>&nbsp;</strong></p>
<p><strong>&nbsp;</strong></p>
<p><strong>&nbsp;</strong></p>
<p><strong>&nbsp;</strong></p>
<p><strong>&nbsp;</strong></p>
<p><strong>&nbsp;</strong></p>
<p><strong>&nbsp;</strong></p>
<p><strong>&nbsp;</strong></p>
<p><strong>I. Th&ocirc;ng tin chung</strong></p>
<p>Link CMS: <a href="../../">&nbsp;http://172.16.10.62:9016/admin</a></p>
<p>T&agrave;i khoản : admin</p>
<p>Password : 123456</p>
<p>Để hiểu dễ d&agrave;ng về CMS trước ti&ecirc;n ch&uacute;ng ta n&ecirc;n xem qua giao diện người d&ugrave;ng c&oacute; link : &nbsp;http://172.16.10.62:9016</p>
<p>C&aacute;c nội dung v&agrave; chức năng ở giao diện người d&ugrave;ng n&agrave;y được chia th&agrave;nh c&aacute;c module tương ứng trong CMS để quản l&yacute; như :Giới thiệu,Lĩnh vực hoạt động ,Tuyển dụng,Tin tức,Đầu tư,Li&ecirc;n hệ &hellip;.</p>
<p><strong>II. &nbsp;&nbsp;&nbsp;Hướng dẫn sử dụng CMS</strong></p>
<p><strong>1 . Đăng nhập</strong> v&agrave;o CMS với link, t&agrave;i khoản v&agrave; pass như &nbsp;tr&ecirc;n</p>
<p>&nbsp;</p>
<p>&nbsp;</p>
<p>&nbsp;</p>
<p>&nbsp;</p>
<p>&nbsp;</p>
<p><strong>2 . Sau khi đăng nhập</strong> th&igrave; m&agrave;n h&igrave;nh ch&iacute;nh sẽ hiển thị 2 khối ch&iacute;nh, b&ecirc;n tr&aacute;i ch&uacute;ng ta thấy l&agrave; liệt k&ecirc; danh s&aacute;ch c&aacute;c module như đ&atilde; n&oacute;i ở tr&ecirc;n : Giới thiệu,Lĩnh vực hoạt động ,Tuyển dụng,Tin tức,Đầu tư,Li&ecirc;n hệ &hellip;. , b&ecirc;n phải l&agrave; biểu đồ thể hiện lượng truy cập v&agrave;o h&agrave;ng ng&agrave;y v&agrave; h&agrave;ng th&aacute;ng</p>
<p><strong>&nbsp;</strong></p>
<p><strong>&nbsp;</strong></p>
<p><strong>&nbsp;</strong></p>
<p><strong>&nbsp;</strong></p>
<p><strong>&nbsp;</strong></p>
<p><strong>&nbsp;</strong></p>
<p><strong>&nbsp;</strong></p>
<p><strong>&nbsp;</strong></p>
<p><strong>&nbsp;</strong></p>
<p><strong>&nbsp;</strong></p>
<p><strong>&nbsp;</strong></p>
<p><strong>&nbsp;</strong></p>
<p><strong>3 . C&aacute;ch thức quản l&yacute; 1 module</strong> ( ở đ&acirc;y lấy v&iacute; dụ quản l&yacute; module tin tức,c&aacute;c module c&ograve;n lại c&aacute;ch thức hoạt động tương tự) :</p>
<p>Click v&agrave;o module tin tức ta sẽ thấy c&oacute; 3 Actions l&agrave; <strong>Th&ecirc;m mới,Danh s&aacute;ch,Danh mục</strong></p>
<p>&nbsp;</p>
<p><strong>3a. Click v&agrave;o Th&ecirc;m mới:</strong> đ&acirc;y l&agrave; nơi để ta th&ecirc;m mới tin tức</p>
<p>Ta sẽ nhập liệu tin tức v&agrave;o đ&acirc;y, c&oacute; thể nhập cả nội dung tiếng anh v&agrave; tiếng việt</p>
<p>&nbsp;+ Ảnh đại diện : để cập nhật ảnh đại diện của tin tức ch&uacute;ng ta click v&agrave;o Thư viện ảnh sẽ xuất hiện :</p>
<p>Trong n&agrave;y ch&uacute;ng ta c&oacute; thể <strong>th&ecirc;m mới ảnh,xem chi tiết ảnh, sửa th&ocirc;ng tin ảnh ,x&oacute;a ảnh, t&igrave;m kiếm ảnh v&agrave; chọn ảnh cần d&ugrave;ng</strong></p>
<p><strong>+ N&uacute;t xuất bản : </strong>n&uacute;t n&agrave;y l&agrave; n&uacute;t để ch&uacute;ng ta c&oacute; show tin tức ra ngo&agrave;i hay ko</p>
<p>+ để ch&egrave;n h&igrave;nh ảnh v&agrave;o nội dung b&agrave;i viết click n&uacute;t Thư viện ảnh ( ngay tr&ecirc;n phần nội dung ) v&agrave; chọn hoặc upload ảnh cần ch&egrave;n:</p>
<p>+ Nội dung cho SEO: ở cuối trang th&ecirc;m mới l&agrave; nội dung d&agrave;nh cho SEOer c&oacute; thể th&ecirc;m title, description, Robot , nếu ko&nbsp; điền th&igrave; c&aacute;c ti&ecirc;u ch&iacute; n&agrave;y sẽ được lấy tự động</p>
<p>+ Sau khi th&ecirc;m đầy đủ nội dung tin tức th&igrave; sử dụng c&aacute;c n&uacute;t điều khiển để th&ecirc;m mới :</p>
<p><strong>&nbsp;</strong></p>
<p><strong>3b. Click v&agrave;o Danh S&aacute;ch</strong>: đ&acirc;y l&agrave; nơi chưa danh s&aacute;ch c&aacute;c tin tức</p>
<p>ở đ&acirc;y sẽ c&oacute; c&aacute;c n&uacute;t điều khiển như : <strong>chọn, sửa,x&oacute;a, x&oacute;a đ&atilde; chọn, t&igrave;m kiếm</strong> , <strong>n&uacute;t nổi bật</strong> ( tin tức h&oacute;t ,nổi bật nhất)</p>
<p>&nbsp;</p>
<p><strong>&nbsp;</strong></p>
<p><strong>&nbsp;</strong></p>
<p><strong>&nbsp;</strong></p>
<p><strong>&nbsp;</strong></p>
<p><strong>&nbsp;</strong></p>
<p><strong>&nbsp;</strong></p>
<p><strong>&nbsp;</strong></p>
<p><strong>&nbsp;</strong></p>
<p><strong>&nbsp;</strong></p>
<p><strong>&nbsp;</strong></p>
<p><strong>&nbsp;</strong></p>
<p><strong>&nbsp;</strong></p>
<p><strong>3a . Click v&agrave;o Danh mục</strong> : đ&acirc;y l&agrave; nơi quản l&yacute; danh mục của tin tức bao gồm <strong>th&ecirc;m mới,sửa,x&oacute;a</strong> danh mục</p>
<p><strong>&nbsp;</strong></p>
<p><strong>&nbsp;</strong></p>
<p><strong>&nbsp;</strong></p>
<p><strong>&nbsp;</strong></p>
<p><strong>&nbsp;</strong></p>
<p><strong>&nbsp;</strong></p>
<p><strong>&nbsp;</strong></p>
<p><strong>&nbsp;</strong></p>
<p><strong>&nbsp;</strong></p>
<p><strong>&nbsp;</strong></p>
<p><strong>&nbsp;</strong></p>
<p><strong>4. C&aacute;c module cần lưu &yacute;</strong></p>
<p><strong>4a. module Cấu h&igrave;nh:</strong> module n&agrave;y để chứa c&aacute;i cấu h&igrave;nh chung, cũng như l&agrave; th&ocirc;ng tin chung của về c&ocirc;ng ty(email,số đt, hotline.. ) v&agrave; cấu h&igrave;nh cho SEO ( tilte, meta,keyword &hellip;. )</p>
<p><strong>4b. Module T&agrave;i khoản quản trị </strong>: module n&agrave;y ch&uacute;ng tao c&oacute; thể <strong>tạo th&ecirc;m</strong> c&aacute;c t&agrave;i khoản c&oacute; thể đăng nhập v&agrave;o quản trị v&agrave; <strong>ph&acirc;n quyền</strong> cho c&aacute;c t&agrave;i khoản đ&oacute;</p>
<p><strong>4c.Module Thư viện ảnh :</strong> module n&agrave;y để quản l&yacute; c&aacute;c ảnh được upload l&ecirc;n , c&oacute; c&aacute;ch chức năng <strong>th&ecirc;m sửa x&oacute;a t&igrave;m kiếm ảnh</strong></p>
<p>&nbsp;</p>
<p><strong>&nbsp;</strong></p>
<p><strong>5.C&aacute;c n&uacute;t điều khiển chung</strong></p>
<p>ở h&igrave;nh ta thấy c&oacute; c&aacute; n&uacute;t được khoanh tr&ograve;n bao gồm : xem trang chủ, back, refresh, đổi mật khẩu, v&agrave; tho&aacute;t đăng nhập</p>
<p><strong><em>Trong qu&aacute; tr&igrave;nh sử dụng c&oacute; lỗi g&igrave; ph&aacute;t sinh,c&oacute; g&igrave; kh&oacute; hiểu hoặc cần sửa chức năng theo y&ecirc;u cầu th&igrave; vui l&ograve;ng li&ecirc;n hệ skype : tiennh_ss</em></strong></p>
   </div>
</div>

</body>
</html>
