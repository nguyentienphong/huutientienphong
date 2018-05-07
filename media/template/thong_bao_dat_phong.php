<?php 
	$info_book_room = json_decode($_GET['info']);
?>
<html>
<head>
    <title>Email ShipAnToan</title>
    <meta charset="utf-8" />
</head>
<body style="padding: 0px; margin: 0px; background: #ffffff;">
<table width="100%" height="100%" bgcolor="#ffffff" border="0" cellspacing="0" cellpadding="0" align="top">
    <tr><td><table width="690" style="border-radius: 3px; border: solid 1px #75c518" cellspacing="0" cellpadding="0" align="center">
    <tr><td><table width="650" cellspacing="0" cellpadding="0" align="center"><tr>
                <td width="610">
                    <table width="610" cellspacing="0" cellpadding="0" align="center" style="font-family: Arial; font-size: 13px; color: #000; line-height: 25px;">
						<tr><td><div style="margin: 0 auto; max-width: 166px;"><img src="http://172.16.12.160:8081/ShareImagesUpload/OpenID/2015/11/425491811client_idRc6AKlogo_mail.png" /></div></td></tr>
                        <tr>
                            <td>Xin chào <span style="color: red; font-weight: bold;"><?php echo $data['accountName']; ?></span>.</td>
                        </tr>
                        <tr><td>Xin chúc mừng, bạn đã đăng ký tài khoản <a hreft="https://shipantoan.vn">shipantoan.vn</a> thành công!</td></tr>
                        </tr><tr><td>Mọi thắc mắc vui lòng liên hệ <span style="font-weight: bold; color: red;">Hotline 19006051</span> để được hướng dẫn và tư vấn.</td>
                         </tr><tr><td>Tham khảo thêm:
									<a href="https://shipantoan.vn/bang-gia/">Bảng Giá</a>
									<a href="https://shipantoan.vn/gioi-thieu.html">Giới Thiệu Dịch Vụ</a></td></tr>
                        <tr>
                            <td style="font-family: Arial; font-size: 11px; color: #666666; line-height: 23px;">
								------------------------
								Trân trọng
								SHIPANTOAN.VN
								Email: hotro@shipantoan.vn
								Địa chỉ: Trụ sở Hà Nội : Tầng 3 - Tòa nhà Viễn Đông - 36 Hoàng Cầu - Quận Đống Đa - Hà Nội.
								Chi nhánh tại TPHCM : Lầu 3, số 96 – 98 Đào Duy Anh, Phường 9, Quận Phú Nhuận, TP Hồ Chí Minh.
							</td>
                        </tr>
                    </table>
                </td>
                </tr>
                </table>
        </td>
    </tr>
            </table>
        </td>
    </tr>
</table>
</body>
</html>