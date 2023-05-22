-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Máy chủ: 127.0.0.1
-- Thời gian đã tạo: Th5 12, 2023 lúc 04:41 PM
-- Phiên bản máy phục vụ: 10.4.24-MariaDB
-- Phiên bản PHP: 8.1.6

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Cơ sở dữ liệu: `banmu`
--

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `chi_tiet_hoa_don_ban`
--

CREATE TABLE `chi_tiet_hoa_don_ban` (
  `SoHD` int(11) NOT NULL,
  `MaMN` int(11) NOT NULL,
  `SoLuong` int(11) NOT NULL,
  `DonGia` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `chi_tiet_hoa_don_ban`
--

INSERT INTO `chi_tiet_hoa_don_ban` (`SoHD`, `MaMN`, `SoLuong`, `DonGia`) VALUES
(252, 2, 1, 27280000),
(252, 3, 1, 7300000),
(253, 2, 2, 27280000),
(253, 3, 3, 7300000),
(253, 5, 1, 21600000),
(254, 2, 1, 27280000),
(254, 3, 1, 7300000),
(255, 1, 1, 21780000),
(255, 17, 1, 6700000),
(256, 1, 1, 21780000),
(257, 1, 1, 21780000),
(258, 5, 1, 21600000),
(259, 2, 1, 27280000),
(267, 1, 1, 980000),
(269, 1, 1, 980000),
(270, 1, 1, 980000),
(271, 1, 1, 980000);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `gio_hang`
--

CREATE TABLE `gio_hang` (
  `id` int(11) NOT NULL,
  `MaKH` int(11) NOT NULL,
  `MaMN` int(11) NOT NULL,
  `TrangThai` tinyint(1) NOT NULL,
  `SoLuong` int(11) NOT NULL,
  `DonGia` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `hang_san_xuat`
--

CREATE TABLE `hang_san_xuat` (
  `MaHSX` int(11) NOT NULL,
  `TenHSX` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `DiaChi` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `SDT` varchar(11) COLLATE utf8mb4_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `hang_san_xuat`
--

INSERT INTO `hang_san_xuat` (`MaHSX`, `TenHSX`, `DiaChi`, `SDT`) VALUES
(1, 'CÔNG TY TNHH SẢN XUẤT – THƯƠNG MẠI VÀ DỊCH VỤ MAX SPORT', 'Số 100 Đường Nguyễn Thiện Thuật, Phường 02, Quận 3, Thành phố Hồ Chí Minh', '0313550560'),
(2, 'CÔNG TY TNHH MŨ AUTHENTIC', 'Số 8, ngõ 2, đường Cao Lỗ, Phường Lê Mao, Thành phố Vinh, Tỉnh Nghệ An', '0316186575'),
(3, 'CÔNG TY TNHH HOANGPHUC', 'Tổ 8 - Phường Phú Lương - Quận Hà Đông - Hà Nội', '0316346344'),
(4, 'CÔNG TY CỔ PHẦN XUẤT NHẬP MŨ AUTHENTIC', 'Số 10 ngõ 9 phố Huỳnh Thúc Kháng - Phường Láng Hạ - Quận Đống đa - Hà Nội', '04674557455'),
(5, 'CÔNG TY TNHH THỂ THAO VÀ TRUYỀN THÔNG NHÂN QUÝ', '29/16 Đường số 5 - Phường Tăng Nhơn Phú B - Quận 9 - TP Hồ Chí Minh', '0313234555'),
(6, 'CÔNG TY TNHH SẢN XUẤT VÀ XUẤT NHẬP KHẨU QUẢNG CHÂU SPORT', '5/7, Tổ 6, Suối Cát 1 - Xã Suối Cát - Huyện Xuân Lộc - Đồng Nai', '08967464224'),
(7, 'CÔNG TY TNHH  LÂM MINH NGUYỆT', 'Số 9, Ngách 82/23 Phố Nguyễn Phúc Lai - Phường ô Chợ Dừa - Quận Đống đa - Hà Nội', '01345656564'),
(10, 'CÔNG TY ABC XYZ', 'Số 7 Nguyễn Trung Trực Ninh Hòa Khánh Hòa', '0134569852'),
(11, '46', '56', '213123');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `hoa_don_ban`
--

CREATE TABLE `hoa_don_ban` (
  `SoHD` int(11) NOT NULL,
  `NgayDH` datetime NOT NULL,
  `NgayGH` datetime DEFAULT NULL,
  `MaKH` int(11) NOT NULL,
  `MaNV` int(11) DEFAULT NULL,
  `TinhTrangDuyet` tinyint(1) NOT NULL,
  `TinhTrangDonHang` tinyint(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `hoa_don_ban`
--

INSERT INTO `hoa_don_ban` (`SoHD`, `NgayDH`, `NgayGH`, `MaKH`, `MaNV`, `TinhTrangDuyet`, `TinhTrangDonHang`) VALUES
(252, '2022-12-02 08:57:42', '0000-00-00 00:00:00', 8, 32, 1, 2),
(253, '2022-12-02 08:58:34', '2022-12-14 18:16:00', 8, 32, 1, 1),
(254, '2022-12-03 08:01:56', NULL, 7, NULL, 0, 0),
(255, '2023-03-15 12:41:29', '2023-05-05 23:06:00', 10, 32, 1, 1),
(256, '2023-03-15 12:41:54', NULL, 10, NULL, 0, 0),
(257, '2023-03-20 03:04:01', NULL, 10, NULL, 0, 0),
(258, '2023-03-21 05:08:22', NULL, 10, NULL, 0, 0),
(259, '2023-03-21 05:08:49', NULL, 10, NULL, 0, 0),
(260, '2023-05-11 16:44:57', NULL, 9, NULL, 0, 0),
(261, '2023-05-11 16:44:57', NULL, 11, NULL, 0, 0),
(262, '2023-05-11 16:45:25', NULL, 9, NULL, 0, 0),
(263, '2023-05-11 16:45:25', NULL, 11, NULL, 0, 0),
(264, '2023-05-11 16:45:28', NULL, 9, NULL, 0, 0),
(265, '2023-05-11 16:45:28', NULL, 11, NULL, 0, 0),
(266, '2023-05-11 16:45:46', NULL, 9, NULL, 0, 0),
(267, '2023-05-11 16:45:46', NULL, 11, NULL, 0, 0),
(268, '2023-05-11 16:46:11', NULL, 9, NULL, 0, 0),
(269, '2023-05-11 16:46:11', NULL, 11, NULL, 0, 0),
(270, '2023-05-11 17:13:32', NULL, 14, NULL, 0, 0),
(271, '2023-05-11 17:15:35', NULL, 14, NULL, 0, 0);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `khach_hang`
--

CREATE TABLE `khach_hang` (
  `MaKH` int(11) NOT NULL,
  `HoTenKH` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `SDT` varchar(11) COLLATE utf8mb4_unicode_ci NOT NULL,
  `Email` varchar(30) COLLATE utf8mb4_unicode_ci NOT NULL,
  `DiaChi` varchar(200) COLLATE utf8mb4_unicode_ci NOT NULL,
  `TaiKhoan` varchar(30) COLLATE utf8mb4_unicode_ci NOT NULL,
  `MatKhau` varchar(500) COLLATE utf8mb4_unicode_ci NOT NULL,
  `HinhKH` blob NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `khach_hang`
--

INSERT INTO `khach_hang` (`MaKH`, `HoTenKH`, `SDT`, `Email`, `DiaChi`, `TaiKhoan`, `MatKhau`, `HinhKH`) VALUES
(15, 'Nguyễn Tiến Anh', '0886008378', 'admin@admin.admin', 'HN', 'admin', '21232f297a57a5a743894a0e4a801fc3', '');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `loai_mu`
--

CREATE TABLE `loai_mu` (
  `MaLoaiMN` int(11) NOT NULL,
  `TenLoaiMN` varchar(500) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Đang đổ dữ liệu cho bảng `loai_mu`
--

INSERT INTO `loai_mu` (`MaLoaiMN`, `TenLoaiMN`) VALUES
(1, 'MLB'),
(2, 'Versace'),
(3, 'Adidas'),
(4, 'Gucci'),
(5, 'Nike'),
(6, 'Burberry'),
(7, 'Louis Vuitton');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `mu_non`
--

CREATE TABLE `mu_non` (
  `MaMN` int(11) NOT NULL,
  `TenMN` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `MoTa` varchar(5000) COLLATE utf8mb4_unicode_ci NOT NULL,
  `HinhMN` varchar(1000) COLLATE utf8mb4_unicode_ci NOT NULL,
  `DonGia` int(11) NOT NULL,
  `MaLoaiMN` int(11) NOT NULL,
  `MaNCC` int(11) NOT NULL,
  `MaHSX` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `mu_non`
--

INSERT INTO `mu_non` (`MaMN`, `TenMN`, `MoTa`, `HinhMN`, `DonGia`, `MaLoaiMN`, `MaNCC`, `MaHSX`) VALUES
(1, 'Mũ MLB New York Yankees Diamond Adjustable Hat In Black', 'Đối tượng và thời hạn đổi hàng\r\nÁp dụng cho khách hàng thanh toán đầy đủ khi mua trực tiếp và mua online tại website: https://mlb-korea.vn/ . \r\nPhạm vi sản phẩm được đổi: Sản phẩm đúng giá trị và sản phẩm giảm giá không quá 30%.\r\nThời hạn đổi hàng: Trong vòng 14 ngày kể từ ngày khách hàng nhận được sản phẩm.\r\nCác mặt hàng không áp dụng đổi hàng: Vớ, khăn, Trang sức, shoescare, khẩu trang.\r\nTrường hợp đổi hàng\r\nPhát sinh lỗi từ phía cửa hàng, nhà sản xuất, lỗi sản phẩm,... (MLB Việt Nam sẽ thanh toán chi phí vận chuyển đến khách hàng).\r\nPhát sinh từ nhu cầu của khách hàng. (Khách hàng sẽ thanh toán chi phí vận chuyển hàng hóa tới MLB Việt Nam và đổi về)\r\nNội dung chính sách đổi hàng\r\nSản phẩm đạt yêu cầu đổi phải chưa qua sử dụng cũng như chưa giặt/ ủi/ là, không có mùi lạ, nguyên nhãn mác, chưa cào mã (nếu có), hộp/ bao bì sản phẩm đi kèm (nếu có).\r\nSản phẩm không bị lỗi do quá trình lưu giữ, vận chuyển của người sử dụng.\r\nKhách hàng có chứng từ mua hàng đầy đủ tại MLB Việt Nam\r\nMỗi sản phẩm chỉ được đổi 01 lần\r\nVới trường hợp khách hàng đã đổi hàng 01 lần nhưng sản phẩm đổi có phát sinh vấn đề về lỗi sản phẩm, lỗi nhà sản xuất, sai hình ảnh,... nếu như khách hàng không còn nhu cầu đổi hàng thì MLB Việt Nam sẽ tiến hành hoàn tiền theo quy trình của Công ty.\r\n\r\nGiá trị sản phẩm đổi phải bằng giá hoặc cao hơn giá thanh toán sản phẩm phát sinh nhu cầu đổi (Không bao gồm phí giao hàng), phần chênh lệch sau khi đổi sang sản phẩm có giá trị thấp hơn, MLB Việt Nam sẽ không hoàn lại.\r\nQuy định tiếp nhận và xử lý đổi hàng:\r\n*** Đối với khách hàng mua trực tiếp tại cửa hàng thì sẽ đến tại chính cửa hàng đó để đổi hàng.\r\n\r\n*** Đối với khách hàng mua online tại website: https://mlb-korea.vn/ : \r\n\r\nKhách hàng liên hệ hotline hoặc gmail yêu cầu đổi hàng.\r\nKhách hàng gửi sản phẩm có nhu cầu đổi về địa chỉ được cung cấp bởi CSKH như đã trao đôi.\r\nSau khi MLB Việt Nam thẩm định hàng hóa được gửi về từ khách hàng, sản phẩm đạt yêu cầu đổi sẽ được CSKH liên hệ và hỗ trợ đổi hàng. Thời gian đổi sản phẩm mới diễn ra từ 3-5 ngày.\r\nNếu sản phẩm không đạt yêu cầu đổi, MLB Việt Nam sẽ liên hệ và gửi sản phẩm về lại khách hàng (Chi phí vận chuyển khách hàng thanh toán). Trường hợp khách hàng không nhận lại sản phẩm và thanh toán chi phí vận chuyển, sản phẩm sẽ được MLB Việt Nam toàn quyền quyết định và xử lý.', 'https://cdn.vuahanghieu.com/unsafe/0x500/left/top/smart/filters:quality(90)/https://admin.vuahanghieu.com/upload/product/2019/11/mu-mlb-new-york-yankees-diamond-adjustable-hat-in-black-5dcf6f33ea823-16112019103827.jpg', 980000, 1, 1, 2),
(4, 'Nón MLB Bic Classic Monogram Bucket Hat New York Yankees Black', 'Chính sách đổi hàng:\r\n\r\nĐối tượng và thời hạn đổi hàng\r\nÁp dụng cho khách hàng thanh toán đầy đủ khi mua trực tiếp và mua online tại website: https://mlb-korea.vn/ . \r\nPhạm vi sản phẩm được đổi: Sản phẩm đúng giá trị và sản phẩm giảm giá không quá 30%.\r\nThời hạn đổi hàng: Trong vòng 14 ngày kể từ ngày khách hàng nhận được sản phẩm.\r\nCác mặt hàng không áp dụng đổi hàng: Vớ, khăn, Trang sức, shoescare, khẩu trang.\r\nTrường hợp đổi hàng\r\nPhát sinh lỗi từ phía cửa hàng, nhà sản xuất, lỗi sản phẩm,... (MLB Việt Nam sẽ thanh toán chi phí vận chuyển đến khách hàng).\r\nPhát sinh từ nhu cầu của khách hàng. (Khách hàng sẽ thanh toán chi phí vận chuyển hàng hóa tới MLB Việt Nam và đổi về)\r\nNội dung chính sách đổi hàng\r\nSản phẩm đạt yêu cầu đổi phải chưa qua sử dụng cũng như chưa giặt/ ủi/ là, không có mùi lạ, nguyên nhãn mác, chưa cào mã (nếu có), hộp/ bao bì sản phẩm đi kèm (nếu có).\r\nSản phẩm không bị lỗi do quá trình lưu giữ, vận chuyển của người sử dụng.\r\nKhách hàng có chứng từ mua hàng đầy đủ tại MLB Việt Nam\r\nMỗi sản phẩm chỉ được đổi 01 lần\r\nVới trường hợp khách hàng đã đổi hàng 01 lần nhưng sản phẩm đổi có phát sinh vấn đề về lỗi sản phẩm, lỗi nhà sản xuất, sai hình ảnh,... nếu như khách hàng không còn nhu cầu đổi hàng thì MLB Việt Nam sẽ tiến hành hoàn tiền theo quy trình của Công ty.\r\n\r\nGiá trị sản phẩm đổi phải bằng giá hoặc cao hơn giá thanh toán sản phẩm phát sinh nhu cầu đổi (Không bao gồm phí giao hàng), phần chênh lệch sau khi đổi sang sản phẩm có giá trị thấp hơn, MLB Việt Nam sẽ không hoàn lại.', 'https://bizweb.dktcdn.net/100/446/974/products/non-mlb-bic-classic-monogram-bucket-hat-new-york-yankees-black-3ahtm013n-50bks-1.jpg?v=1683135068500', 1990000, 1, 2, 2),
(5, 'Nón MLB Diamond Monogram Structured Ball Cap Boston Red Sox D.Beige', '1549000', 'https://bizweb.dktcdn.net/100/446/974/products/non-mlb-diamond-monogram-structured-ball-cap-boston-red-sox-d-beige-3acpm032n-43bgd-1.jpg?v=1683045474807', 980000, 2, 4, 3),
(6, 'Mũ Versace Jeans Couture Blue Hat In Barocco Print Màu Xanh Vàng', 'Mũ Versace Jeans Couture Abbigliamento Uomo Phối Màu thiết kế đẹp mắt, kiểu dáng thời trang. Mũ được làm từ chất liệu Polyester thoáng mát mang lại cảm giác thoải mái khi sử dụng.\r\n\r\nForm mũ chuẩn đẹp, các đường may rất chắc chắn và tinh tế đảm bảo hài lòng ngay cả với khách hàng khó tính nhất.\r\n\r\n– Thiết kế kiểu dáng thể thao năng động, hiện đại.\r\n\r\n– Thoáng khí, không phai màu, dễ giặt và dễ bảo quản.\r\n\r\n– Sản phẩm được làm từ chất liệu cao cấp, bền đẹp trong suốt quá trình sử dụng.', 'https://cdn.vuahanghieu.com/unsafe/0x500/left/top/smart/filters:quality(90)/https://admin.vuahanghieu.com/upload/product/2023/02/mu-versace-jeans-couture-blue-hat-in-barocco-print-mau-xanh-vang-63ea063080878-13022023164312.jpg', 2450000, 2, 3, 1),
(7, 'Mũ Versace Jeans Couture Abbigliamento Uomo Phối Màu', 'Mũ Versace Jeans Couture Abbigliamento Uomo Phối Màu thiết kế đẹp mắt, kiểu dáng thời trang. Mũ được làm từ chất liệu Polyester thoáng mát mang lại cảm giác thoải mái khi sử dụng.\r\n\r\nForm mũ chuẩn đẹp, các đường may rất chắc chắn và tinh tế đảm bảo hài lòng ngay cả với khách hàng khó tính nhất.\r\n\r\n– Thiết kế kiểu dáng thể thao năng động, hiện đại.\r\n\r\n– Thoáng khí, không phai màu, dễ giặt và dễ bảo quản.\r\n\r\n– Sản phẩm được làm từ chất liệu cao cấp, bền đẹp trong suốt quá trình sử dụng.', 'https://guvip.vn/wp-content/uploads/2020/07/mu-versace-jeans-couture-abbigliamento-uomo-phoi-mau_5f194d3a2216d.jpeg', 3100000, 2, 1, 2),
(8, 'Mũ Versace Jean Couture Logo Cap Màu Trắng', 'Mũ Versace Jean Couture Logo Cap Màu Trắng thiết kế đẹp mắt, kiểu dáng thời trang. Mũ được làm từ chất liệu cotton thoáng mát mang lại cảm giác thoải mái khi sử dụng.\r\n\r\nForm mũ chuẩn đẹp, các đường may rất chắc chắn và tinh tế đảm bảo hài lòng ngay cả với khách hàng khó tính nhất.\r\n\r\n– Thiết kế kiểu dáng thể thao năng động, hiện đại.\r\n\r\n– Thoáng khí, không phai màu, dễ giặt và dễ bảo quản.\r\n\r\n– Sản phẩm được làm từ chất liệu cao cấp, bền đẹp trong suốt quá trình sử dụng.', 'https://guvip.vn/wp-content/uploads/2020/07/mu-versace-jean-couture-logo-cap-mau-trang_5f194b4ee5a9c.jpeg', 2750000, 2, 4, 3),
(57, 'Nón MLB Diamond Monogram Structured Ball Cap Boston Red Sox D.Beige', 'Chính sách trả hàng:\r\n\r\nĐối tượng và thời hạn trả hàng\r\nÁp dụng cho khách hàng thanh toán đầy đủ khi mua trực tiếp và mua online tại website: https://mlb-korea.vn/ . \r\nPhạm vi sản phẩm được trả: Sản phẩm đúng giá trị.\r\nThời hạn trả hàng: Trong vòng 03 ngày kể từ ngày khách hàng nhận được sản phẩm.\r\nCác mặt hàng không áp dụng trả hàng: Vớ, khăn, Trang sức, shoescare, khẩu trang.\r\nTrường hợp trả hàng\r\nPhát sinh lỗi từ phía cửa hàng, nhà sản xuất, lỗi sản phẩm,... (MLB Việt Nam sẽ thanh toán chi phí vận chuyển trả).\r\nNhu cầu trả từ phía khách hàng với những lý do: nhầm size/không vừa size (KH sẽ thanh toán mọi chi phí vận chuyển)\r\nNội dung chính sách trả hàng\r\nSản phẩm đạt yêu cầu trả phải chưa qua sử dụng cũng như chưa giặt/ ủi/ là, không có mùi lạ, nguyên nhãn mác, chưa cào mã (nếu có), hộp/ bao bì sản phẩm đi kèm (nếu có).\r\nSản phẩm không bị lỗi do quá trình lưu giữ, vận chuyển của người sử dụng.\r\nKhách hàng có chứng từ mua hàng đầy đủ tại MLB Việt Nam\r\nQuy định tiếp nhận và xử lý trả hàng:\r\n*** Đối với khách hàng mua trực tiếp tại cửa hàng thì sẽ đến tại chính cửa hàng đó để được tiếp nhận và làm thủ tục trả hàng.\r\n\r\n*** Đối với khách hàng mua online tại website: https://mlb-korea.vn/ : \r\n\r\nKhách hàng liên hệ hotline hoặc gmail yêu cầu trả hàng.\r\nKhách hàng gửi sản phẩm có nhu cầu trả về địa chỉ được cung cấp bởi CSKH như đã trao đôi.\r\nSau khi MLB Việt Nam thẩm định hàng hóa được gửi về từ khách hàng, sản phẩm đạt yêu cầu trả sẽ được CSKH liên hệ và xác nhận được hoàn tiền. Thời gian hoàn tiền trong vòng 3 ngày (trừ thứ 7, chủ nhật), tính từ thời điểm được xác nhận.\r\nNếu sản phẩm không đạt yêu cầu trả, MLB Việt Nam sẽ liên hệ và gửi sản phẩm về lại khách hàng (Chi phí vận chuyển khách hàng thanh toán). Trường hợp khách hàng không nhận lại sản phẩm và thanh toán chi phí vận chuyển, sản phẩm sẽ được MLB Việt Nam toàn quyền quyết định và xử lý.\r\n\r\nKhách hàng sẽ được hoàn tiền với số tiền đã thanh toán sản phẩm (Chi phí giao hàng sẽ được trừ vào số tiền hoàn trả).\r\nPhương thức thanh toán: MLB Việt Nam sẽ hoàn trả vào tài khoản ngân hàng của khách hàng trong 3 ngày (trừ thứ 7 và chủ nhật), tính từ lúc CSKH xác nhận đơn hàng được chấp nhận hoàn tiền', 'https://bizweb.dktcdn.net/100/446/974/products/non-mlb-diamond-monogram-structured-ball-cap-boston-red-sox-d-beige-3acpm032n-43bgd-1.jpg?v=1683045474807', 1234000, 1, 2, 2),
(58, 'Nón MLB Curlsive Color Matching Unstructured Ball Cap LA Dodgers D.Blue', 'Chính sách trả hàng:\r\n\r\nĐối tượng và thời hạn trả hàng\r\nÁp dụng cho khách hàng thanh toán đầy đủ khi mua trực tiếp và mua online tại website: https://mlb-korea.vn/ . \r\nPhạm vi sản phẩm được trả: Sản phẩm đúng giá trị.\r\nThời hạn trả hàng: Trong vòng 03 ngày kể từ ngày khách hàng nhận được sản phẩm.\r\nCác mặt hàng không áp dụng trả hàng: Vớ, khăn, Trang sức, shoescare, khẩu trang.\r\nTrường hợp trả hàng\r\nPhát sinh lỗi từ phía cửa hàng, nhà sản xuất, lỗi sản phẩm,... (MLB Việt Nam sẽ thanh toán chi phí vận chuyển trả).\r\nNhu cầu trả từ phía khách hàng với những lý do: nhầm size/không vừa size (KH sẽ thanh toán mọi chi phí vận chuyển)\r\nNội dung chính sách trả hàng\r\nSản phẩm đạt yêu cầu trả phải chưa qua sử dụng cũng như chưa giặt/ ủi/ là, không có mùi lạ, nguyên nhãn mác, chưa cào mã (nếu có), hộp/ bao bì sản phẩm đi kèm (nếu có).\r\nSản phẩm không bị lỗi do quá trình lưu giữ, vận chuyển của người sử dụng.\r\nKhách hàng có chứng từ mua hàng đầy đủ tại MLB Việt Nam\r\nQuy định tiếp nhận và xử lý trả hàng:\r\n*** Đối với khách hàng mua trực tiếp tại cửa hàng thì sẽ đến tại chính cửa hàng đó để được tiếp nhận và làm thủ tục trả hàng.\r\n\r\n*** Đối với khách hàng mua online tại website: https://mlb-korea.vn/ : \r\n\r\nKhách hàng liên hệ hotline hoặc gmail yêu cầu trả hàng.\r\nKhách hàng gửi sản phẩm có nhu cầu trả về địa chỉ được cung cấp bởi CSKH như đã trao đôi.\r\nSau khi MLB Việt Nam thẩm định hàng hóa được gửi về từ khách hàng, sản phẩm đạt yêu cầu trả sẽ được CSKH liên hệ và xác nhận được hoàn tiền. Thời gian hoàn tiền trong vòng 3 ngày (trừ thứ 7, chủ nhật), tính từ thời điểm được xác nhận.\r\nNếu sản phẩm không đạt yêu cầu trả, MLB Việt Nam sẽ liên hệ và gửi sản phẩm về lại khách hàng (Chi phí vận chuyển khách hàng thanh toán). Trường hợp khách hàng không nhận lại sản phẩm và thanh toán chi phí vận chuyển, sản phẩm sẽ được MLB Việt Nam toàn quyền quyết định và xử lý.\r\n\r\nKhách hàng sẽ được hoàn tiền với số tiền đã thanh toán sản phẩm (Chi phí giao hàng sẽ được trừ vào số tiền hoàn trả).\r\nPhương thức thanh toán: MLB Việt Nam sẽ hoàn trả vào tài khoản ngân hàng của khách hàng trong 3 ngày (trừ thứ 7 và chủ nhật), tính từ lúc CSKH xác nhận đơn hàng được chấp nhận hoàn tiền.', 'https://bizweb.dktcdn.net/100/446/974/products/non-mlb-curlsive-color-matching-unstructured-ball-cap-la-dodgers-d-blue-3acpc013n-07bld-1.jpg?v=1682938616797', 980000, 2, 4, 3),
(59, 'Mũ Versace Jeans Couture Logo Embroidered Baseball Cap Màu Đen', 'Mũ Versace Jeans Couture Logo Embroidered Baseball Cap Màu Đen thiết kế đẹp mắt, kiểu dáng thời trang. Mũ được làm từ chất liệu cotton thoáng mát mang lại cảm giác thoải mái khi sử dụng.\r\n\r\nForm mũ chuẩn đẹp, các đường may rất chắc chắn và tinh tế đảm bảo hài lòng ngay cả với khách hàng khó tính nhất.\r\n\r\n– Thiết kế kiểu dáng thể thao năng động, hiện đại.\r\n\r\n– Thoáng khí, không phai màu, dễ giặt và dễ bảo quản.\r\n\r\n– Sản phẩm được làm từ chất liệu cao cấp, bền đẹp trong suốt quá trình sử dụng.', 'https://guvip.vn/wp-content/uploads/2020/07/mu-versace-jeans-couture-logo-embroidered-baseball-cap-mau-den_5f194cdd2a583.jpeg', 2450000, 2, 1, 2),
(60, 'Mũ Adidas Trefoil Baseball Cap – Pink Spirit (EK2994) Màu Hồng', 'Mũ Adidas Trefoil Baseball Cap – Pink Spirit (EK2994) Màu Hồng thiết kế trẻ trung. Mũ được làm từ chất vải cotton mềm mại mang lại cảm giác thoải mái nhất cho người sử dụng.\r\n\r\nForm mũ chuẩn đẹp, đường may vô cùng tỉ mỉ và chắc chắn đảm bảo hài lòng mọi khách hàng.', 'https://guvip.vn/wp-content/uploads/2020/07/mu-adidas-trefoil-baseball-cap-pink-spirit-ek2994-mau-hong_5f194b5e65d77.jpeg', 750000, 3, 4, 1),
(61, 'Mũ Adidas Trefoil Baseball Cap Màu Hồng Nhạt', 'Mũ Adidas Trefoil Baseball Cap Màu Hồng Nhạt thiết kế trẻ trung. Mũ được làm từ chất vải cotton mềm mại mang lại cảm giác thoải mái nhất cho người sử dụng. Form mũ chuẩn đẹp, đường may vô cùng tỉ mỉ và chắc chắn đảm bảo hài lòng mọi khách hàng.  Sản phẩm bền', 'https://guvip.vn/wp-content/uploads/2020/07/mu-adidas-trefoil-baseball-cap-mau-hong-nhat_5f194a972f627.jpeg', 750000, 3, 2, 1),
(62, 'Mũ lưỡi trai Golf adidas - HT3339', 'Thông tin sản phẩm\r\n \r\nChính sách bán hàng\r\n \r\nĐánh giá\r\nCHIẾC MŨ GOLF PHONG CÁCH TOUR CÓ SỬ DỤNG CHẤT LIỆU TÁI CHẾ.\r\nVung gậy như những tay golf chuyên nghiệp trong chiếc mũ golf adidas phong cách thi đấu này. Chất vải jacquard siêu nhẹ và viền thấm mồ hôi may liền đảm bảo cảm giác thoải mái suốt ngày dài trên sân. Quai khuy bấm cho phép bạn điều chỉnh độ ôm vừa ý. Làm từ một loạt chất liệu tái chế và có chứa tối thiểu 40% thành phần tái chế, sản phẩm này đại diện cho một trong số rất nhiều các giải pháp của chúng tôi hướng tới chấm dứt rác thải nhựa.', 'https://assets.adidas.com/images/w_600,f_auto,q_auto/5040e83a4f07417db051af1e0068e6c4_9366/Mu_Snapback_Tour_DJen_HT3339.jpg', 650000, 3, 1, 2),
(63, 'Mũ lưỡi trai Golf adidas - HT3337', 'CHIẾC MŨ GOLF PHONG CÁCH TOUR CÓ SỬ DỤNG CHẤT LIỆU TÁI CHẾ.\r\nVung gậy như những tay golf chuyên nghiệp trong chiếc mũ golf adidas phong cách thi đấu này. Chất vải jacquard siêu nhẹ và viền thấm mồ hôi may liền đảm bảo cảm giác thoải mái suốt ngày dài trên sân. Quai khuy bấm cho phép bạn điều chỉnh độ ôm vừa ý. Làm từ một loạt chất liệu tái chế và có chứa tối thiểu 40% thành phần tái chế, sản phẩm này đại diện cho một trong số rất nhiều các giải pháp của chúng tôi hướng tới chấm dứt rác thải nhựa.', 'https://assets.adidas.com/images/w_600,f_auto,q_auto/d13381202ae344108538af2300f5bfd4_9366/Tour_Snapback_Hat_Blue_HT3337.jpg', 450000, 3, 4, 5);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `nhan_vien`
--

CREATE TABLE `nhan_vien` (
  `MaNV` int(11) NOT NULL,
  `HoTenNV` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `TenDN` varchar(30) COLLATE utf8mb4_unicode_ci NOT NULL,
  `MatKhau` varchar(500) COLLATE utf8mb4_unicode_ci NOT NULL,
  `SDT` varchar(11) COLLATE utf8mb4_unicode_ci NOT NULL,
  `Email` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL,
  `DiaChi` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `NVQuanLy` tinyint(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `nhan_vien`
--

INSERT INTO `nhan_vien` (`MaNV`, `HoTenNV`, `TenDN`, `MatKhau`, `SDT`, `Email`, `DiaChi`, `NVQuanLy`) VALUES
(35, 'Võ Văn Thắng', 'admin', 'admin', '0971366275', 'thangpro9669@gmail.com', 'c16thanh xuann', 0),
(36, 'Hoàng Văn Phúc', 'phuc', '1234', '325340123', 'hoangvanphuc@gmail.com', 'sdsdsd', 1),
(37, 'Nguyễn Tiến Anh', 'tienanh', '1234', '555555', 'nNguyeenxtienanh123@gmail.com', 'ssss', 1);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `nha_cung_cap`
--

CREATE TABLE `nha_cung_cap` (
  `MaNCC` int(11) NOT NULL,
  `TenNCC` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `SDT` varchar(11) COLLATE utf8mb4_unicode_ci NOT NULL,
  `DiaChi` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `Email` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `nha_cung_cap`
--

INSERT INTO `nha_cung_cap` (`MaNCC`, `TenNCC`, `SDT`, `DiaChi`, `Email`) VALUES
(1, 'Maxsport', '02838341500', '319 Điện Biên Phủ, P. 4, Q. 3, Tp. Hồ Chí Minh (TPHCM)', 'sportvn@hcm.vnn.vn'),
(2, 'CÔNG TY TNHH HUY QUANG SPORT', '02435123144', '99 Hào nam, Đống Đa, Hà Nội', 'huyquangsport@yahoo.com.vn'),
(3, 'VanThangSport', '02838233175', '5/47/12/25 Nguyễn Thị Minh Khai, Q. 7, Tp. Hồ Chí Minh (TPHCM)', 'trongthegia18bis@gmail.com'),
(4, 'CÔNG TY CP TM & TT Hà Nội', '02466639953', 'Số 150 Quan Hoa, P. Quan Hoa, Q. Cầu Giấy, Hà Nội', 'HNMAXSPORT@GMAIL.COM'),
(6, 'CÔNG TY TNHH THƯƠNG MẠI TRÙNG KHÁNH', '02822400736', '987 Điện Biên Phủ, P. 18, Q. 9, Tp. Hồ Chí Minh', 'trungkhanh@yahoo.com');

--
-- Chỉ mục cho các bảng đã đổ
--

--
-- Chỉ mục cho bảng `chi_tiet_hoa_don_ban`
--
ALTER TABLE `chi_tiet_hoa_don_ban`
  ADD PRIMARY KEY (`SoHD`,`MaMN`),
  ADD KEY `MaNC` (`MaMN`);

--
-- Chỉ mục cho bảng `gio_hang`
--
ALTER TABLE `gio_hang`
  ADD PRIMARY KEY (`id`),
  ADD KEY `MaKH` (`MaKH`),
  ADD KEY `MaNC` (`MaMN`);

--
-- Chỉ mục cho bảng `hang_san_xuat`
--
ALTER TABLE `hang_san_xuat`
  ADD PRIMARY KEY (`MaHSX`);

--
-- Chỉ mục cho bảng `hoa_don_ban`
--
ALTER TABLE `hoa_don_ban`
  ADD PRIMARY KEY (`SoHD`),
  ADD KEY `MaKH` (`MaKH`),
  ADD KEY `MaNV` (`MaNV`);

--
-- Chỉ mục cho bảng `khach_hang`
--
ALTER TABLE `khach_hang`
  ADD PRIMARY KEY (`MaKH`);

--
-- Chỉ mục cho bảng `loai_mu`
--
ALTER TABLE `loai_mu`
  ADD PRIMARY KEY (`MaLoaiMN`);

--
-- Chỉ mục cho bảng `mu_non`
--
ALTER TABLE `mu_non`
  ADD PRIMARY KEY (`MaMN`),
  ADD KEY `MaLoaiNC` (`MaLoaiMN`),
  ADD KEY `MaNCC` (`MaNCC`),
  ADD KEY `MaHSX` (`MaHSX`);

--
-- Chỉ mục cho bảng `nhan_vien`
--
ALTER TABLE `nhan_vien`
  ADD PRIMARY KEY (`MaNV`);

--
-- Chỉ mục cho bảng `nha_cung_cap`
--
ALTER TABLE `nha_cung_cap`
  ADD PRIMARY KEY (`MaNCC`);

--
-- AUTO_INCREMENT cho các bảng đã đổ
--

--
-- AUTO_INCREMENT cho bảng `gio_hang`
--
ALTER TABLE `gio_hang`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=203;

--
-- AUTO_INCREMENT cho bảng `hang_san_xuat`
--
ALTER TABLE `hang_san_xuat`
  MODIFY `MaHSX` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT cho bảng `hoa_don_ban`
--
ALTER TABLE `hoa_don_ban`
  MODIFY `SoHD` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=272;

--
-- AUTO_INCREMENT cho bảng `khach_hang`
--
ALTER TABLE `khach_hang`
  MODIFY `MaKH` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

--
-- AUTO_INCREMENT cho bảng `loai_mu`
--
ALTER TABLE `loai_mu`
  MODIFY `MaLoaiMN` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT cho bảng `mu_non`
--
ALTER TABLE `mu_non`
  MODIFY `MaMN` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=64;

--
-- AUTO_INCREMENT cho bảng `nhan_vien`
--
ALTER TABLE `nhan_vien`
  MODIFY `MaNV` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=38;

--
-- AUTO_INCREMENT cho bảng `nha_cung_cap`
--
ALTER TABLE `nha_cung_cap`
  MODIFY `MaNCC` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
