-- phpMyAdmin SQL Dump
-- version 5.0.2
-- https://www.phpmyadmin.net/
--
-- Máy chủ: 127.0.0.1:3306
-- Thời gian đã tạo: Th3 24, 2021 lúc 06:41 AM
-- Phiên bản máy phục vụ: 5.7.31
-- Phiên bản PHP: 7.3.21

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Cơ sở dữ liệu: `bookstorelody`
--

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `admin`
--

DROP TABLE IF EXISTS `admin`;
CREATE TABLE IF NOT EXISTS `admin` (
  `taikhoan` varchar(10) NOT NULL,
  `matkhau` varchar(10) NOT NULL,
  `quyen` int(2) NOT NULL,
  `hoten` varchar(30) NOT NULL,
  `dienthoai` varchar(15) NOT NULL,
  PRIMARY KEY (`taikhoan`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Đang đổ dữ liệu cho bảng `admin`
--

INSERT INTO `admin` (`taikhoan`, `matkhau`, `quyen`, `hoten`, `dienthoai`) VALUES
('admin1', '123', 1, 'Nguyễn văn a', '12121212'),
('admin2', '123', 2, 'Nguyễn văn b', '23232323');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `banner`
--

DROP TABLE IF EXISTS `banner`;
CREATE TABLE IF NOT EXISTS `banner` (
  `mabanner` varchar(10) NOT NULL,
  `hinh` varchar(30) NOT NULL,
  `matintuc` varchar(10) NOT NULL,
  `taikhoanadmin` varchar(10) NOT NULL,
  PRIMARY KEY (`mabanner`),
  KEY `banner_fkadmin` (`taikhoanadmin`),
  KEY `banner_fktintuc` (`matintuc`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Đang đổ dữ liệu cho bảng `banner`
--

INSERT INTO `banner` (`mabanner`, `hinh`, `matintuc`, `taikhoanadmin`) VALUES
('banner1', 'banner1.jpg', 'tintuc01', 'admin1'),
('banner2', 'banner2.jpg', 'tintuc01', 'admin1'),
('banner3', 'banner3.jpg', 'tintuc01', 'admin1');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `binhluan`
--

DROP TABLE IF EXISTS `binhluan`;
CREATE TABLE IF NOT EXISTS `binhluan` (
  `mabinhluan` int(11) NOT NULL AUTO_INCREMENT,
  `taikhoankhachhang` varchar(30) NOT NULL,
  `masacch` varchar(10) NOT NULL,
  `noidung` text NOT NULL,
  PRIMARY KEY (`mabinhluan`),
  KEY `binhluan_fkkhachhang` (`taikhoankhachhang`),
  KEY `binhluan_fksach` (`masacch`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `chitietdonhang`
--

DROP TABLE IF EXISTS `chitietdonhang`;
CREATE TABLE IF NOT EXISTS `chitietdonhang` (
  `madonhang` int(10) NOT NULL,
  `masanpham` varchar(10) NOT NULL,
  `soluong` int(10) NOT NULL,
  `dongia` int(10) NOT NULL,
  KEY `ctdonhang_fksach` (`masanpham`),
  KEY `ctdonhang_fkdonhang` (`madonhang`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Đang đổ dữ liệu cho bảng `chitietdonhang`
--

INSERT INTO `chitietdonhang` (`madonhang`, `masanpham`, `soluong`, `dongia`) VALUES
(51, 'c05', 1, 1500000),
(51, 'c06', 1, 1450000),
(51, 'c07', 1, 2500000),
(64, 'c06', 1, 1450000);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `chitietkhuyenmai`
--

DROP TABLE IF EXISTS `chitietkhuyenmai`;
CREATE TABLE IF NOT EXISTS `chitietkhuyenmai` (
  `masach` varchar(10) NOT NULL,
  `makhuyenmai` int(10) NOT NULL,
  KEY `ctctkhuyenmai_fksach` (`masach`),
  KEY `ctkhuyenmai_fkkhuyenmai` (`makhuyenmai`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `chitietphieunhap`
--

DROP TABLE IF EXISTS `chitietphieunhap`;
CREATE TABLE IF NOT EXISTS `chitietphieunhap` (
  `maphieunhap` int(11) NOT NULL,
  `masach` varchar(10) CHARACTER SET utf8 DEFAULT NULL,
  `tensach` varchar(100) CHARACTER SET utf8 NOT NULL,
  `soluong` int(10) NOT NULL,
  `dongia` int(10) NOT NULL,
  KEY `ctphieunhap_fkphieunhap` (`maphieunhap`),
  KEY `ctphieunhap_fksach` (`masach`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `donhang`
--

DROP TABLE IF EXISTS `donhang`;
CREATE TABLE IF NOT EXISTS `donhang` (
  `madonhang` int(10) NOT NULL AUTO_INCREMENT,
  `taikhoankhachhang` varchar(30) DEFAULT NULL,
  `taikhoanusers` varchar(30) DEFAULT NULL,
  `taikhoanadmin` varchar(10) DEFAULT NULL,
  `ngaydathang` date NOT NULL,
  `trangthai` int(10) NOT NULL,
  `thanhtien` int(20) NOT NULL,
  PRIMARY KEY (`madonhang`),
  KEY `donhang_fkkhachhang` (`taikhoankhachhang`),
  KEY `donhang_fkadmin` (`taikhoanadmin`),
  KEY `taikhoanusers` (`taikhoanusers`) USING BTREE,
  KEY `taikhoankhachhang` (`taikhoankhachhang`) USING BTREE
) ENGINE=InnoDB AUTO_INCREMENT=65 DEFAULT CHARSET=utf8;

--
-- Đang đổ dữ liệu cho bảng `donhang`
--

INSERT INTO `donhang` (`madonhang`, `taikhoankhachhang`, `taikhoanusers`, `taikhoanadmin`, `ngaydathang`, `trangthai`, `thanhtien`) VALUES
(51, NULL, 'abc@gmail.com', 'admin1', '2021-03-19', 4, 5450000),
(64, 'test@gmail.com', NULL, NULL, '2021-03-23', 1, 1450000);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `hang`
--

DROP TABLE IF EXISTS `hang`;
CREATE TABLE IF NOT EXISTS `hang` (
  `mahang` varchar(10) NOT NULL,
  `tenhang` varchar(50) NOT NULL,
  PRIMARY KEY (`mahang`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Đang đổ dữ liệu cho bảng `hang`
--

INSERT INTO `hang` (`mahang`, `tenhang`) VALUES
('akko', 'Akko'),
('corsair', 'Corsair'),
('logitech', 'Logitech'),
('razer', 'Razer');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `khachhang`
--

DROP TABLE IF EXISTS `khachhang`;
CREATE TABLE IF NOT EXISTS `khachhang` (
  `taikhoan` varchar(30) NOT NULL,
  `hoten` varchar(30) NOT NULL,
  `sodienthoai` varchar(15) NOT NULL,
  `diachi` varchar(50) NOT NULL,
  PRIMARY KEY (`taikhoan`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Đang đổ dữ liệu cho bảng `khachhang`
--

INSERT INTO `khachhang` (`taikhoan`, `hoten`, `sodienthoai`, `diachi`) VALUES
('test@gmail.com', 'abc', '123', '123');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `khuyenmai`
--

DROP TABLE IF EXISTS `khuyenmai`;
CREATE TABLE IF NOT EXISTS `khuyenmai` (
  `makhuyenmai` int(10) NOT NULL AUTO_INCREMENT,
  `tenkhuyenmai` text NOT NULL,
  `taikhoanadmin` varchar(10) NOT NULL,
  PRIMARY KEY (`makhuyenmai`),
  KEY `khuyenmai_fkadmin` (`taikhoanadmin`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8;

--
-- Đang đổ dữ liệu cho bảng `khuyenmai`
--

INSERT INTO `khuyenmai` (`makhuyenmai`, `tenkhuyenmai`, `taikhoanadmin`) VALUES
(1, 'km02', 'admin1');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `loai`
--

DROP TABLE IF EXISTS `loai`;
CREATE TABLE IF NOT EXISTS `loai` (
  `maloai` varchar(10) NOT NULL,
  `tenloai` varchar(50) NOT NULL,
  PRIMARY KEY (`maloai`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Đang đổ dữ liệu cho bảng `loai`
--

INSERT INTO `loai` (`maloai`, `tenloai`) VALUES
('bcd', 'Bàn Phím Có Dây'),
('bkd', 'Bàn Phím Không Dây'),
('ccd', 'Chuột Có Dây'),
('ckd', 'Chuột không dây'),
('tcd', 'Tai nghe có dây'),
('tkd', 'Tai nghe không dây');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `migrations`
--

DROP TABLE IF EXISTS `migrations`;
CREATE TABLE IF NOT EXISTS `migrations` (
  `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT,
  `migration` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `batch` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `phieunhap`
--

DROP TABLE IF EXISTS `phieunhap`;
CREATE TABLE IF NOT EXISTS `phieunhap` (
  `maphieunhap` int(11) NOT NULL AUTO_INCREMENT,
  `taikhoanadmin` varchar(10) CHARACTER SET utf8 NOT NULL,
  `ngaynhap` date NOT NULL,
  `thanhtien` int(20) NOT NULL,
  PRIMARY KEY (`maphieunhap`),
  KEY `phieunhap_fkadmin` (`taikhoanadmin`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=latin1;

--
-- Đang đổ dữ liệu cho bảng `phieunhap`
--

INSERT INTO `phieunhap` (`maphieunhap`, `taikhoanadmin`, `ngaynhap`, `thanhtien`) VALUES
(1, 'admin2', '2020-12-20', 190000);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `sanpham`
--

DROP TABLE IF EXISTS `sanpham`;
CREATE TABLE IF NOT EXISTS `sanpham` (
  `masanpham` varchar(10) NOT NULL,
  `tensanpham` varchar(100) NOT NULL,
  `mota` text NOT NULL,
  `gia` int(10) NOT NULL,
  `hinh` varchar(100) NOT NULL,
  `maloai` varchar(10) NOT NULL,
  `mahang` varchar(10) NOT NULL,
  `luotmua` int(10) NOT NULL,
  `soluong` int(10) NOT NULL,
  PRIMARY KEY (`masanpham`),
  KEY `sach_fkloai` (`maloai`),
  KEY `sach_fktacgia` (`mahang`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Đang đổ dữ liệu cho bảng `sanpham`
--

INSERT INTO `sanpham` (`masanpham`, `tensanpham`, `mota`, `gia`, `hinh`, `maloai`, `mahang`, `luotmua`, `soluong`) VALUES
('b01', 'Razer BlackWidow V3 TKL\r\n', 'Razer BlackWidow V3 TKL nhỏ gọn này được trang bị Switch Razer là một trong những dòng sản phẩm bàn phím cơ giá rẻ nổi tiếng thế giới và Razer Chroma RGB, được game thủ trên toàn thế giới yêu thích và săn đón.\r\n\r\n', 2700000, 'b01.jpg', 'bcd', 'razer', 0, 100),
('b02', 'Razer Blackwidow V3 Pro Green Switch', 'Bàn phím cơ Razer Blackwidow V3 Pro cơ học đầu tiên và mang tính biểu tượng nhất trên thế giới tạo nên sự phát triển mang tính bước ngoặt. Bước vào một meta không dây mới với Razer BlackWidow V3 Pro — với 3 chế độ kết nối mang lại tính linh hoạt vô song và trải nghiệm chơi game thỏa mãn bao gồm các công tắc tốt nhất trong lớp và các phím có chiều cao đầy đủ.', 6000000, 'b02.jpg', 'bcd', 'razer', 0, 100),
('b03', 'Razer BlackWidow V3 Green Switch Quartz', 'Bàn phím cơ Razer Blackwidow V3 mang đến cảm nhận sự khác biệt, là di sản là bàn phím chơi game cơ học đầu tiên và mang tính biểu tượng của Razer, đồng thời được trang bị các cải tiến vàtính năng mới.\r\n\r\nRazer Blackwidow V3 mang đến những cảm nhận và phản hồi trong mỗi lần nhấn phím bạn thực hiện, với thiết kế nhạy bén, xúc giác cung cấp các điểm khởi động và đặt lại được tối ưu hóa để có độ chính xác và hiệu suất tốt hơn khi chơi game.', 3600000, 'b03.jpg', 'bcd', 'razer', 0, 100),
('b04', 'AKKO 3108 World Tour Tokyo R2(Akko)', 'Keycap custom lấy chủ đạo là màu hoa anh đào, núi Phú sĩ, cá chép và mèo may mắn (biểu tượng của Nhật Bản). Bàn phím cơ AKKO 3108 phiên bản R2 sẽ cập nhật thêm chú chó Shiba Inu siêu đáng yêu, tháp truyền hình Tokyo, thanh kiếm Katana nổi tiếng, Tokyo Metro…', 1700000, 'b04.jpg', 'bkd', 'akko', 0, 100),
('b05', 'AKKO 3087 v2 World Tour Tokyo', 'Bàn phím cơ AKKO 3087 v2 World Tour Tokyo (Akko switch v2) thuộc dòng World Tour Tokyo của Akko. Sở hữu vẻ đẹp thanh tạo, đơn giản nhưng ấn tượng, sản phẩm này đang ngày càng được yêu thích trên thị trường.\r\nbàn phím cơ AKKO 3087 v2 World Tour Tokyo (Akko switch v2)Thiết kế bàn phím cơ AKKO 3087 v2 World Tour Tokyo (Akko switch v2) đẹp mắt Mẫu bàn phím cơ này của Akko có thiết kế vô cùng thời trang và ấn tượng. Với sự kết hợp giữa 2 tone màu trắng hồng đặc trưng của xứ sở mặt trời mọc. Bên cạnh đó là hình ảnh quen thuộc như hoa anh đào, cá Koi, núi Phú Sĩ hay mèo may mắn Maneki Neko (còn được gọi giản dị là “mèo gọi khách”)', 1400000, 'b05.jpg', 'bkd', 'akko', 0, 100),
('b06', 'Logitech G610 Orion', 'Logitech G610 Orion là một trong những dòng bàn phím cơ được thiết kế dành riêng cho game thủ với thiết kế hơi hướng classic, ít phá cách nhưng vẫn sang trọng và cá tính. Bề mặt sản phẩm và các nút bấm sử dụng chất liệu nhựa cao cấp, chắc chắn và không để lại vân tay.Bàn phím chơi game G610 cũng là một trong những mẫu bàn phím cơ có LED. Ngoài hệ thống phím bấm được trang bị hệ thống đèn thì logo của hãng cũng phát sáng khi được kết nối với máy tính. Với phần mềm Logitech Gaming Software, bạn hoàn toàn có thể điều chỉnh được hiệu ứng sáng cho từng nút bấm khác nhau, tối ưu khả năng tùy biến một chiếc bàn phím với dấu ấn của riêng bạn.', 1800000, 'b06.jpg', 'bcd', 'logitech', 0, 100),
('c01', 'Corsair NightSword RGB\r\n', 'Chuột Corsair NightSword RGB là một trong những dòng chuột chơi game được nhiều game thủ dành nhiều sự quan tâm vì sở hữu công nghệ LIGHTSYNC là RGB thế hệ mới có thể lấy cảm hứng từ trò chơi, âm thanh hoặc màn hình của bạn để đem đến trải nghiệm RGB đắm chìm nhất từ trước đến nay.\r\n\r\nVới hệ thống led RGB 16,8 triệu màu và đồng bộ hóa hiệu ứng và hình chiếu sáng động với thiết bị Logitech G của bạn. Tùy chỉnh nhanh chóng và dễ dàng bằng G HUB của Logitech.', 970000, 'c01.jpg', 'ccd', 'corsair', 0, 100),
('c02', 'Logitech G402 Hyperion', 'Chuột Logitech G402 sở hữu tốc độ quét lên tới 500 IPS, sử dụng công nghệ cảm biến mới nhất của Logitech là Fusion Engine cho độ chính xác cực cao khi sử dụng.\r\n\r\nSản phẩm G402 sở hữu tốc độ quét lên tới 500 IPS, sử dụng công nghệ cảm biến mới nhất của Logitech là Fusion Engine cho độ chính xác cực cao khi sử dụng. Theo lời đội ngũ phát triển và nghiên cứu của Logitech, G402 hiện là chuột chơi game có tốc độ IPS nhanh nhất. Đôi khi phản xạ của game thủ có thể nhanh hơn khả năng nhận biết của chuột nhưng với Hyperion thì chuyện đó đã chỉ là dĩ vãng.\r\nSản phẩm G402 sở hữu tốc độ quét lên tới 500 IPS, sử dụng công nghệ cảm biến mới nhất của Logitech là Fusion Engine cho độ chính xác cực cao khi sử dụng. Theo lời đội ngũ phát triển và nghiên cứu của Logitech, G402 hiện là chuột chơi game có tốc độ IPS nhanh nhất. Đôi khi phản xạ của game thủ có thể nhanh hơn khả năng nhận biết của chuột nhưng với Hyperion thì chuyện đó đã chỉ là dĩ vãng.', 640000, 'c02.jpg', 'ccd', 'logitech', 0, 100),
('c03', 'Corsair Katar Pro Ultra Light', 'Một trong những dòng chuột gaming giá rẻ với trọng lượng chỉ 69g, chuột Corsair Katar Pro Ultra Light cực kỳ nhẹ và thao tác nhanh nhạy trong nhiều giờ chơi game FPS hoặc MOBA với nhịp độ trận đấu nhanh. \r\n\r\nỞ hình dạng đối xứng, nhỏ gọn làm cho dòng chuột Katar Pro Ultra Light đến từ Corsair trở nên tuyệt vời cho các kiểu cầm vuốt và đầu ngón tay.', 700000, 'c03.jpg', 'ccd', 'corsair', 0, 100),
('c04', 'Logitech G502 Hero Lightspeed', 'Chuột Logitech G502 là một biểu tượng, đứng đầu các bảng xếp hạng qua mọi thế hệ và là lựa chọn chuột không dây cho những game thủ nghiêm túc. Giờ đây, G502 gia nhập hàng ngũ những con chuột chơi game không dây tiên tiến nhất thế giới với việc phát hành G502 LIGHTSPEED.\r\n\r\nVới LIGHTSPEED cực nhanh và đáng tin cậy với hiệu suất đáng tin cậy trong cạnh tranh bởi esports pros. G502 là một trong những dòng chuột không dây Logitech gaming được trang bị cảm biến HERO 16K thế hệ tiếp theo và tương thích POWERPLAY. Với công nghệ làm lại hoàn toàn tiên tiến hoàn hảo này, G502 LIGHTSPEED vẫn giữ được hình dạng yêu thích của mình', 3000000, 'c04.jpg', 'ckd', 'logitech', 0, 100),
('c05', 'Logitech G603 Lightspeed Wireless\r\n', 'ogitech g603 với cảm biến thế hệ mới\r\nĐược chính hãng sản xuất Logitech trang bị hệ thống cảm biến HERO đổi mới mang lại hiệu suất ở đẳng cấp dẫn đầu và tiết kiệm năng lượng tới 10 lần 1. Điều đó đã giúp G603 trở thành một trong những dòng chuột không dây sở hữu độ chính xác vượt trội và hiệu suất ổn định trong toàn bộ phạm vi DPI, với độ mịn, lọc hoặc làm tròn điểm ảnh từ 200 tới 12.000 PDI.', 1500000, 'c05.jpg', 'ckd', 'logitech', 8, 100),
('c06', 'Logitech MX Anywhere 2S\r\n', 'huột Logitech MX Anywhere 2S một trong những dòng chuột không dây Logitech phổ thông dành cho dân văn phòng với thiết kế sang trọng, đẳng cấp. Với tông màu đen chủ đạo cùng với thiết kế vô cùng nhỏ gọn.Bên cạnh những dòng chuột gaming nổi tiếng Logitech còn mang đến cho người tiêu dùng thêm nhiều sự lựa chọn với nhiều tiện ích. Với thiết kết chuột không dây, MX Anywhere 2S là sản phẩm được tối ưu cảm biến chính xác lên đến 4000 DPI hoàn toàn mới.\r\n\r\n', 1450000, 'c06.jpg', 'ckd', 'logitech', 4, 100),
('c07', 'Logitech MX Master 3 For Mac', 'MX Master 3 for Mac là một trong những thiết bị ngoại vi được trang bị con lăn điện hoàn toàn mới mang tên MagSpeed. Điều này giúp MX Master 3 trở thành một trong những dòng chuột không dây Logitech mang đến độ chính xác trên từng pixel, làm từ thép gia công mang lại cảm giác lăn cao cấp và không phát ra âm thanh khó chịu khi sử dụng, đó là sự lợi hại từ con lăn MagSpeed, ngoài ra con lăn MagSpeed có thể lăn được 1000 vòng trong vòng 1 giây.\r\n\r\n', 2500000, 'c07.jpg', 'ccd', 'logitech', 5, 100),
('c08', 'Logitech MX Anywhere 3 Graphite\r\n', 'MX Anywhere 3 có thiết kế nhỏ gọn, thấp, được uốn lượn cho vừa với hình dáng bàn tay bạn -  vì vậy bạn sẽ cảm thấy thoải mái trong nhiều giờ cho dù làm việc ở đâu. Phần hông chuột trang bị 1 lớp silicon luôn cho bạn cảm giác thoải mái mỗi khi chạm vào.\r\n\r\nMX Anywhere 3 được hoàn thiện vô cùng kỹ càng, với những tai nạn vô ý như rơi, va đập. MX Anywhere 3 vô cùng dễ dàng trong việc vệ sinh sau nhiều tháng sử dụng.Pin của MX Master 3 có thể giữ được lên tới 70 ngày trong một lần sạc đầy và có 3 phút sử dụng sau khi sạc nhanh 1 phút. Tích hợp cho mình cổng sạc USB-C vô cùng tiện lợi khi làm việc.\r\n\r\n', 1800000, 'c08.jpg', 'ckd', 'logitech', 4, 100),
('c09', 'Razer Naga Pro', 'Razer Naga Pro — chuột không dây chơi game dạng mô-đun với 3 mặt bên có thể hoán đổi, đối với bố cục nút mà bạn cần để trở thành bậc thầy đa thể loại trong MMO, Battle Royale, FPS và hơn thế nữa.\r\n\r\nChuột Razer Naga Pro nhanh hơn 25% so với bất kỳ công nghệ không dây nào khác hiện có, bạn thậm chí sẽ không nhận ra rằng mình đang chơi game bằng chuột không dây do truyền tốc độ cao, độ trễ nhấp chuột thấp nhất và chuyển đổi tần số liền mạch trong môi trường ồn ào nhất, bão hòa dữ liệu.', 2500000, 'c09.jpg', 'ckd', 'razer', 5, 100),
('c10', 'Logitech G Pro Hero\r\n', 'HERO 16K là một trong những dòng chuột logitech đưuọc trang bị cảm biến chơi game chính xác nhất từ trước tới nay của chúng tôi với độ chính xác thế hệ tiếp theo và cấu trúc toàn diện. HERO 16K có khả năng tạo ra 400+ IPS, 100 - 16,000 DPI, và làm mịn, lọc hay tăng tốc trên toàn bộ dải DPI.\r\n\r\nHERO 16K đạt được độ chính xác cấp độ thi đấu và độ nhạy ổn định nhất từ trước tới nay. Hãy chắc chắn tùy chỉnh và sửa các cài đặt DPI của bạn bằng Logitech G HUB.', 1000000, 'c10.jpg', 'ccd', 'logitech', 5, 100),
('c11', 'Razer DeathAdder V2 Pro\r\n', 'Chuột chơi game Razer DeathAdder V2 Pro nhanh hơn 25% so với bất kỳ công nghệ chuột bluetooth, không dây nào khác hiện nay. Thậm chí sẽ không nhận ra rằng mình đang sử dụng chuột chơi game không dây do truyền tốc độ cao, độ trễ nhấp chuột thấp nhất và chuyển đổi tần số liền mạch trong môi trường ồn ào nhất, bão hòa dữ liệu.Được trang bị hệ thống cảm biến mới, cải tiến của Razer có 20.000 DPI hàng đầu trong ngành với độ chính xác độ phân giải 99,6%, đảm bảo rằng ngay cả những chuyển động tốt nhất từ ​​chuột gaming không dây công thái học không dây này cũng được theo dõi một cách nhất quán. Được trang bị các chức năng thông minh, cảm biến thậm chí còn trở nên chính xác hơn, cho phép đạt được mức độ chính xác cấp tính cho những bức ảnh chụp cận cảnh chiến thắng trong trò chơi.\r\n\r\n', 2800000, 'c11.jpg', 'ckd', 'razer', 7, 100),
('c12', 'Razer Viper 8KHz\r\n', 'Chuột Razer Viper 8KHZ là chuột mẫu chuột eSports đầu tiên trên thế giới có tốc độ Polling rate thực lên đến 8000Hz. Với công nghệ Razer Hyper Polling cho hiệu suất ở tốc độ siêu nhanh, cụ thể nó gửi dữ liệu nhiều hơn tới 8 lần trong một giây và giảm độ trễ từ 1 đến 1/8 mili giây. Mẫu chuột này mở ra một kỷ nguyên mới về khả năng phản hồi, tốc độ và độ tin cậy khi chơi game.\r\nĐược cải tiến mạnh để cho khả năng phản hồi tốt hơn, mỗi lần nhấp chuột của người dùng đều mang lại cảm giác và âm thanh dễ chịu. Điều này làm tăng cảm giác chơi game và giúp các game thủ có khả năng điều khiển và xử lý tốt nhất.\r\n', 2000000, 'c12.jpg', 'ccd', 'razer', 4, 100),
('c13', 'Razer Basilisk Ultimate\r\n', 'Để đáp ứng nhu cầu ngày càng cao của mọi game thủ, Razer đã nghiên cứu và áp dụng thành công công nghệ không dây Razer HyperSpeed.\r\n\r\nVới tốc độ cao và độ ổn định cao hơn 25% so với tất cả các dòng chuột gaming không dây khác. Điều này đồng nghĩa mọi thao tác của bạn cùng chuột Razer Basilisk X HyperSpeed sẽ nhanh hơn đối thủ tới 25%, giúp bạn chiếm ưu thế lớn hơn.\r\n\r\n', 4500000, 'c13.jpg', 'ckd', 'razer', 1, 100),
('c14', 'Razer Deathadder Essential\r\n', 'Chuột gaming DeathAdder Essential được Razer thiết kế với kiểu dáng công thái học (Ergonomic) cổ điển. Thiết kế đẹp mắt và khác biệt ở các dòng chuột gaming khác tạo ra sự thoải mái, cho phép người chơi duy trì mức hiệu suất cao trong suốt thời gian chơi game dài, vì vậy bạn sẽ không bao giờ bị ngập ngừng trong các trận chiến nóng bỏng.', 800000, 'c14.jpg', 'ccd', 'razer', 0, 100),
('c15', 'Corsair Glaive RGB Pro Aluminum\r\n', 'Chuột gaming Corsair Glaive RGB Pro Aluminum. Thiết kế nhẹ dành 115g cho cách cầm Palm-grip \r\nKèm 3 loại mặt hông chuột cho ngón trỏ sử dụng đa năng\r\nSử dụng Switch Omron cao cấp với hơn 50 triệu lần click\r\n7 nút bấm có thể lập trình macros dễ dàng\r\nCảm biến Pixart chính xác từng li hiệu năng đỉnh cao\r\n18.000 DPI có thể tăng giảm chi tiết đến 1 DPI mỗi lần thay đổi phù hợp mọi lót chuột\r\nCó đèn LED RGB 3 vùngphù hợp với mọi nền tảng RGB Corsair\r\n', 900000, 'c15.jpg', 'ccd', 'corsair', 0, 100);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `tintuc`
--

DROP TABLE IF EXISTS `tintuc`;
CREATE TABLE IF NOT EXISTS `tintuc` (
  `matintuc` varchar(10) NOT NULL,
  `tentintuc` varchar(50) NOT NULL,
  `mota` text NOT NULL,
  `taikhoanadmin` varchar(10) NOT NULL,
  PRIMARY KEY (`matintuc`),
  KEY `tintuc_fkadmin` (`taikhoanadmin`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Đang đổ dữ liệu cho bảng `tintuc`
--

INSERT INTO `tintuc` (`matintuc`, `tentintuc`, `mota`, `taikhoanadmin`) VALUES
('tintuc01', 'tintuc01', 'abc', 'admin1');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `users`
--

DROP TABLE IF EXISTS `users`;
CREATE TABLE IF NOT EXISTS `users` (
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(30) CHARACTER SET utf8 NOT NULL,
  `password` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `phone` varchar(20) COLLATE utf8mb4_unicode_ci NOT NULL,
  `address` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `trangthai` int(10) NOT NULL,
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  PRIMARY KEY (`email`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `users`
--

INSERT INTO `users` (`name`, `email`, `password`, `phone`, `address`, `trangthai`, `remember_token`) VALUES
('abc', 'abc@gmail.com', '$2y$10$UVLOA5h9ywza4Z0MAtGrnOfQZY4kkyt4YqTKNog6e9NWyubunPQP.', '123', 'Street Address', 1, NULL),
('abcd', 'abcd@gmail.com', '$2y$10$F.MQuqmcpjS0iq/gz2HaJOKXiLVd2hntXmyqq.Yyumf9mFIA9WDYG', '123', 'Street Address', 1, NULL),
('abcde', 'abcde@gmail.com', '$2y$10$KGj2xOwdnuIP3B6w2xBYPubL5LcUXhhnfY9cwXQMffKPa5TXelzEK', '123123', 'abcdeadd', 1, NULL),
('test', 'test@gmail.com', '$2y$10$qqR2F9pGI0Dad0cbcQetQOepx4BcCbW9by.dnEOLFP.tyy1gX9iRG', '123', 'test', 1, NULL);

--
-- Các ràng buộc cho các bảng đã đổ
--

--
-- Các ràng buộc cho bảng `banner`
--
ALTER TABLE `banner`
  ADD CONSTRAINT `banner_fkadmin` FOREIGN KEY (`taikhoanadmin`) REFERENCES `admin` (`taikhoan`),
  ADD CONSTRAINT `banner_fktintuc` FOREIGN KEY (`matintuc`) REFERENCES `tintuc` (`matintuc`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Các ràng buộc cho bảng `binhluan`
--
ALTER TABLE `binhluan`
  ADD CONSTRAINT `binhluan_fkkhachhang` FOREIGN KEY (`taikhoankhachhang`) REFERENCES `khachhang` (`taikhoan`),
  ADD CONSTRAINT `binhluan_fksach` FOREIGN KEY (`masacch`) REFERENCES `sanpham` (`masanpham`);

--
-- Các ràng buộc cho bảng `chitietdonhang`
--
ALTER TABLE `chitietdonhang`
  ADD CONSTRAINT `ctdonhang_fkdonhang` FOREIGN KEY (`madonhang`) REFERENCES `donhang` (`madonhang`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `ctdonhang_fksach` FOREIGN KEY (`masanpham`) REFERENCES `sanpham` (`masanpham`);

--
-- Các ràng buộc cho bảng `chitietkhuyenmai`
--
ALTER TABLE `chitietkhuyenmai`
  ADD CONSTRAINT `ctctkhuyenmai_fksach` FOREIGN KEY (`masach`) REFERENCES `sanpham` (`masanpham`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `ctkhuyenmai_fkkhuyenmai` FOREIGN KEY (`makhuyenmai`) REFERENCES `khuyenmai` (`makhuyenmai`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Các ràng buộc cho bảng `chitietphieunhap`
--
ALTER TABLE `chitietphieunhap`
  ADD CONSTRAINT `ctphieunhap_fkphieunhap` FOREIGN KEY (`maphieunhap`) REFERENCES `phieunhap` (`maphieunhap`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `ctphieunhap_fksach` FOREIGN KEY (`masach`) REFERENCES `sanpham` (`masanpham`);

--
-- Các ràng buộc cho bảng `donhang`
--
ALTER TABLE `donhang`
  ADD CONSTRAINT `donhang_fkadmin` FOREIGN KEY (`taikhoanadmin`) REFERENCES `admin` (`taikhoan`),
  ADD CONSTRAINT `donhang_fkkhachhang` FOREIGN KEY (`taikhoankhachhang`) REFERENCES `khachhang` (`taikhoan`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `donhang_fkusers` FOREIGN KEY (`taikhoanusers`) REFERENCES `users` (`email`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Các ràng buộc cho bảng `khuyenmai`
--
ALTER TABLE `khuyenmai`
  ADD CONSTRAINT `khuyenmai_fkadmin` FOREIGN KEY (`taikhoanadmin`) REFERENCES `admin` (`taikhoan`);

--
-- Các ràng buộc cho bảng `phieunhap`
--
ALTER TABLE `phieunhap`
  ADD CONSTRAINT `phieunhap_fkadmin` FOREIGN KEY (`taikhoanadmin`) REFERENCES `admin` (`taikhoan`);

--
-- Các ràng buộc cho bảng `sanpham`
--
ALTER TABLE `sanpham`
  ADD CONSTRAINT `sach_fkloai` FOREIGN KEY (`maloai`) REFERENCES `loai` (`maloai`) ON UPDATE CASCADE,
  ADD CONSTRAINT `sach_fktacgia` FOREIGN KEY (`mahang`) REFERENCES `hang` (`mahang`) ON UPDATE CASCADE;

--
-- Các ràng buộc cho bảng `tintuc`
--
ALTER TABLE `tintuc`
  ADD CONSTRAINT `tintuc_fkadmin` FOREIGN KEY (`taikhoanadmin`) REFERENCES `admin` (`taikhoan`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
