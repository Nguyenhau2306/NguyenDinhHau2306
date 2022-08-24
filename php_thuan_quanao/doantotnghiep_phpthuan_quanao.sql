-- phpMyAdmin SQL Dump
-- version 4.9.7
-- https://www.phpmyadmin.net/
--
-- Host: localhost:8889
-- Generation Time: Jul 04, 2022 at 06:33 AM
-- Server version: 5.7.34
-- PHP Version: 7.4.21

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `doantotnghiep_phpthuan_quanao`
--

-- --------------------------------------------------------

--
-- Table structure for table `admin`
--

CREATE TABLE `admin` (
  `id` int(11) NOT NULL,
  `name` varchar(100) COLLATE utf8_unicode_ci DEFAULT NULL,
  `email` varchar(100) COLLATE utf8_unicode_ci DEFAULT NULL,
  `password` varchar(50) COLLATE utf8_unicode_ci DEFAULT NULL,
  `phone` char(15) COLLATE utf8_unicode_ci DEFAULT NULL,
  `level` tinyint(4) DEFAULT '1',
  `created_at` timestamp NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` timestamp NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `admin`
--

INSERT INTO `admin` (`id`, `name`, `email`, `password`, `phone`, `level`, `created_at`, `updated_at`) VALUES
(9, 'admin', 'nguyenhau230699@gmail.com', '25f9e794323b453885f5181f1b624d0b', '0941445790', 2, '2022-05-22 06:27:16', '2022-06-10 08:23:59'),
(10, 'NV', '123@gmal.com', '25f9e794323b453885f5181f1b624d0b', '0123456789', 1, '2022-06-10 08:22:56', '2022-06-10 08:22:56');

-- --------------------------------------------------------

--
-- Table structure for table `chitietdonhang`
--

CREATE TABLE `chitietdonhang` (
  `donhang_id` int(11) DEFAULT NULL,
  `sanpham_id` int(11) DEFAULT NULL,
  `soluong` int(11) DEFAULT NULL,
  `gia` int(11) DEFAULT NULL,
  `size` varchar(191) COLLATE utf8_unicode_ci DEFAULT NULL,
  `hinhanh` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `chitietdonhang`
--

INSERT INTO `chitietdonhang` (`donhang_id`, `sanpham_id`, `soluong`, `gia`, `size`, `hinhanh`, `id`) VALUES
(7, 54, 2, 350000, NULL, 'gshopee1.jpg', 12),
(8, 46, 1, 380, NULL, 'MG_2403-600x600.jpg', 13),
(9, 59, 2, 250000, NULL, 'Ao-tap-gym-nam-gymshark-5-600x600.jpg', 14),
(10, 59, 1, 250000, NULL, 'Ao-tap-gym-nam-gymshark-5-600x600.jpg', 15),
(11, 59, 2, 250000, NULL, 'Ao-tap-gym-nam-gymshark-5-600x600.jpg', 16),
(15, 61, 1, 150000, NULL, 'Mu-thoi-trang-nam-Mu-tap-gym-under-armour-1.jpg', 20),
(16, 61, 2, 150000, NULL, 'Mu-thoi-trang-nam-Mu-tap-gym-under-armour-1.jpg', 21),
(17, 60, 1, 270000, NULL, 'sb6.jpg', 22),
(18, 66, 1, 315000, NULL, 'Bộ Quần Short + Áo Ngắn Tay Alphalete.jpg', 23),
(19, 120, 1, 90000, NULL, 'Dây Miniband.jpg', 24),
(20, 118, 2, 120000, 'm', 'Găng Tay SKDK.jpg', 25),
(21, 119, 1, 135000, 'XX', 'Dây Kéo Lưng Aolikes.jpg', 26);

-- --------------------------------------------------------

--
-- Table structure for table `danhmuc`
--

CREATE TABLE `danhmuc` (
  `tendanhmuc` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `slug` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `hinhanh` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `danhmuccha_id` int(11) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` timestamp NULL DEFAULT CURRENT_TIMESTAMP,
  `id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `danhmuc`
--

INSERT INTO `danhmuc` (`tendanhmuc`, `slug`, `hinhanh`, `danhmuccha_id`, `created_at`, `updated_at`, `id`) VALUES
('QUẦN TẬP GYM', 'quan-tap-gym', 'O1CN01mm7QEc1zTWFTEaGMq_3251686715-0-cib.jpg', 0, '2022-06-12 18:02:11', '2022-06-12 19:31:02', 8),
('ÁO TẬP GYM', 'ao-tap-gym', '13495996881_2104538446.jpg', 0, '2022-06-12 18:06:12', '2022-06-12 13:17:58', 9),
('BỘ ĐỒ TẬP GYM', 'bo-do-tap-gym', NULL, 0, '2022-06-12 18:10:22', '2022-06-12 19:31:09', 10),
('PHỤ KIỆN TẬP GYM', 'phu-kien-tap-gym', NULL, 0, '2022-06-14 16:27:50', '2022-06-14 11:29:14', 13);

-- --------------------------------------------------------

--
-- Table structure for table `donhang`
--

CREATE TABLE `donhang` (
  `ten` varchar(50) COLLATE utf8_unicode_ci DEFAULT NULL,
  `diachi` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `sodienthoai` char(13) COLLATE utf8_unicode_ci DEFAULT NULL,
  `email` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `tongtien` int(11) DEFAULT NULL,
  `loai` tinyint(4) NOT NULL DEFAULT '1',
  `thanhvien_id` int(11) NOT NULL DEFAULT '0',
  `noidung` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `trangthai` tinyint(4) DEFAULT '0',
  `nhanviengiaohang_id` int(11) NOT NULL DEFAULT '0',
  `created_at` timestamp NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` timestamp NULL DEFAULT CURRENT_TIMESTAMP,
  `id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `donhang`
--

INSERT INTO `donhang` (`ten`, `diachi`, `sodienthoai`, `email`, `tongtien`, `loai`, `thanhvien_id`, `noidung`, `trangthai`, `nhanviengiaohang_id`, `created_at`, `updated_at`, `id`) VALUES
('123', 'HN', '0123456789', '123@gmail.com', 700000, 1, 22, '', 3, 10, '2022-06-13 01:53:18', '2022-06-12 21:04:49', 7),
('123', 'HN', '0123456789', '123@gmail.com', 380, 1, 22, 'Thanh toán khi nhận hàng', 3, 10, '2022-06-13 02:06:24', '2022-06-19 03:47:50', 8),
('123', 'HN', '0123456789', '123@gmail.com', 500000, 1, 22, '', 3, 10, '2022-06-13 04:06:27', '2022-06-19 03:48:35', 9),
('123', 'HN', '0123456789', '123@gmail.com', 250000, 1, 22, '', 3, 10, '2022-06-13 14:03:01', '2022-06-19 03:48:30', 10),
('123', 'HN', '0123456789', '123@gmail.com', 500000, 1, 22, '', 3, 10, '2022-06-13 14:11:26', '2022-06-19 03:48:25', 11),
('123', 'HN', '0123456789', '123@gmail.com', 150000, 1, 22, '', 3, 10, '2022-06-14 16:56:59', '2022-06-19 03:48:20', 15),
('Tim', 'Hà nội', '0123456789', 'DinhHau230699@gmail.com', 300000, 1, 23, '', 3, 10, '2022-06-17 02:37:43', '2022-06-19 03:48:14', 16),
('Tim', 'Hà nội', '0123456789', 'DinhHau230699@gmail.com', 270000, 1, 23, '', 3, 10, '2022-06-17 13:59:14', '2022-06-19 03:48:09', 17),
('Thuythoi', 'Hà nội', '0123456789', 'thanhthuy@gmail.com', 315000, 1, 0, '', 3, 10, '2022-06-18 13:54:10', '2022-06-19 03:47:57', 18),
('Tim', 'Hà nội', '0123456789', 'DinhHau230699@gmail.com', 90000, 1, 23, '', 0, 10, '2022-06-19 10:47:56', '2022-06-19 10:47:56', 19),
('TrungPhuNA', 'Ha Nội', '0986420994', 'doantotnghiep@gmail.com', 240000, 1, 11, '', 0, 10, '2022-07-03 23:23:55', '2022-07-03 23:23:55', 20),
('TrungPhuNA', 'Ha Nội', '0986420994', 'doantotnghiep@gmail.com', 135000, 1, 11, '', 0, 10, '2022-07-03 23:32:39', '2022-07-03 23:32:39', 21);

-- --------------------------------------------------------

--
-- Table structure for table `menu`
--

CREATE TABLE `menu` (
  `tenmenu` varchar(50) COLLATE utf8_unicode_ci DEFAULT NULL,
  `slug` varchar(50) COLLATE utf8_unicode_ci DEFAULT NULL,
  `vitri` tinyint(4) DEFAULT '0',
  `id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `menu`
--

INSERT INTO `menu` (`tenmenu`, `slug`, `vitri`, `id`) VALUES
('Tin Tức', 'tin-tuc.php', 0, 3),
('Giới Thiệu', NULL, 0, 4);

-- --------------------------------------------------------

--
-- Table structure for table `nhacungcap`
--

CREATE TABLE `nhacungcap` (
  `tennhacc` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `diachi` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `sodienthoai` char(13) COLLATE utf8_unicode_ci DEFAULT NULL,
  `email` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` timestamp NULL DEFAULT CURRENT_TIMESTAMP,
  `id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `nhacungcap`
--

INSERT INTO `nhacungcap` (`tennhacc`, `diachi`, `sodienthoai`, `email`, `created_at`, `updated_at`, `id`) VALUES
('adidas', ' Số 3 đường Đại Cồ Việt, Quận Hai Bà Trưng, Hà Nội , Việt Nam', '1900 2100', 'https://adidas.com.vn/', '2021-04-26 00:31:59', '2021-04-26 00:31:59', 1),
('Nike ', '50/27/1 Đinh Tiên Hoàng, P. 1, Q. Bình Thạnh, Tp. Hồ Chí Minh (TPHCM) , Việt Nam', '0933022924', 'nike@gmail.com', '2022-05-22 14:48:49', '2022-05-22 14:48:49', 5),
('AoLikes', 'Cổ Nhuế-Từ Liêm-Hà Nội', '0123456789', 'Aolikes@gmail.com', '2022-06-19 08:09:38', '2022-06-19 08:09:38', 6),
('Gym', 'Hà Nội', '1234567890', 'Gym@gmail.com', '2022-06-19 08:12:13', '2022-06-19 08:12:13', 7);

-- --------------------------------------------------------

--
-- Table structure for table `nhanvien`
--

CREATE TABLE `nhanvien` (
  `id` int(11) NOT NULL,
  `ten` varchar(255) DEFAULT NULL,
  `email` varchar(255) DEFAULT NULL,
  `sodienthoai` varchar(255) DEFAULT NULL,
  `matkhau` varchar(255) DEFAULT NULL,
  `diachi` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `nhanvien`
--

INSERT INTO `nhanvien` (`id`, `ten`, `email`, `sodienthoai`, `matkhau`, `diachi`) VALUES
(1, 'Phú ha', 'doantotnghiep@gmail.com', '0987656111', '25f9e794323b453885f5181f1b624d0b', 'Hà Nội');

-- --------------------------------------------------------

--
-- Table structure for table `sanpham`
--

CREATE TABLE `sanpham` (
  `tensanpham` varchar(255) NOT NULL,
  `slug` varchar(255) DEFAULT NULL,
  `danhmuc_id` int(11) DEFAULT NULL,
  `gia` int(11) DEFAULT '0',
  `soluong` int(11) DEFAULT '0',
  `giamgia` tinyint(4) DEFAULT '0',
  `hinhanh` varchar(255) DEFAULT NULL,
  `mota` text,
  `trangthai` varchar(255) DEFAULT NULL,
  `hot` tinyint(3) UNSIGNED DEFAULT '0',
  `yeuthich` int(11) DEFAULT '0',
  `nhacungcap_id` int(11) DEFAULT NULL,
  `gianhap` int(11) DEFAULT NULL,
  `pay` int(11) DEFAULT '0',
  `created_at` timestamp NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` timestamp NULL DEFAULT CURRENT_TIMESTAMP,
  `id` int(11) NOT NULL,
  `size` varchar(100) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `sanpham`
--

INSERT INTO `sanpham` (`tensanpham`, `slug`, `danhmuc_id`, `gia`, `soluong`, `giamgia`, `hinhanh`, `mota`, `trangthai`, `hot`, `yeuthich`, `nhacungcap_id`, `gianhap`, `pay`, `created_at`, `updated_at`, `id`, `size`) VALUES
('Bộ Đồ Tập Quần Short + Tank Top CRNS', 'bo-do-tap-quan-short-tank-top-crns', 10, 200000, 99, 0, 'Bộ Đồ Tập Quần Short + Tank Top CRNS.jpg', '<p><strong>M&ocirc; tả sản phẩm:</strong></p>\r\n\r\n<ul>\r\n	<li><strong>Chất liệu</strong>: Quần vải thun gi&oacute; mềm mịn, co d&atilde;n 4 chiều, tho&aacute;ng m&aacute;t. &Aacute;o vải Spandex nhẹ khi mặc, co d&atilde;n 4 chiều thoải m&aacute;i vận động</li>\r\n	<li><strong>Form d&aacute;ng</strong>: Quần form ngang đ&ugrave;i, dễ mặc, &aacute;o form &ocirc;m body fit thể thao</li>\r\n</ul>\r\n\r\n<p><strong>Bảng size:</strong></p>\r\n\r\n<p>Size M: 45-63kg</p>\r\n\r\n<p>Size L: 64-71kg</p>\r\n\r\n<p>Size Xl: 72-79kg</p>\r\n\r\n<p>Size XXL: 80-95kg</p>\r\n', NULL, 1, 0, 1, 150000, 0, '2022-06-17 15:28:45', '2022-06-17 15:28:45', 64, '0'),
('Bộ Đồ Tập Short + Tank Top Butz', 'bo-do-tap-short-tank-top-butz', 10, 300000, 99, 10, 'Bộ Đồ Tập Short + Tank Top Butz.jpg', '<p><strong>M&ocirc; tả sản phẩm:</strong></p>\r\n\r\n<ul>\r\n	<li><strong>Chất liệu</strong>: Quần vải thun gi&oacute; mềm mịn, co d&atilde;n 4 chiều, tho&aacute;ng m&aacute;t. &Aacute;o vải Spandex nhẹ khi mặc, co d&atilde;n 4 chiều thoải m&aacute;i vận động</li>\r\n	<li><strong>Form d&aacute;ng</strong>: Quần form ngang đ&ugrave;i, dễ mặc, &aacute;o form &ocirc;m body fit thể thao</li>\r\n</ul>\r\n\r\n<p><strong>Bảng size:</strong></p>\r\n\r\n<p>Size M: 45-63kg</p>\r\n\r\n<p>Size L: 64-71kg</p>\r\n\r\n<p>Size Xl: 72-79kg</p>\r\n\r\n<p>Size XXL: 80-95kg</p>\r\n', NULL, 1, 0, 1, 200000, 0, '2022-06-17 15:30:25', '2022-06-17 15:30:25', 65, '0'),
('Bộ Quần Short + Áo Ngắn Tay Alphalete', 'bo-quan-short-ao-ngan-tay-alphalete', 10, 350000, 95, 10, 'Bộ Quần Short + Áo Ngắn Tay Alphalete.jpg', '<p><strong>M&ocirc; tả sản phẩm:</strong></p>\r\n\r\n<ul>\r\n	<li><strong>Chất liệu</strong>: Quần vải thun gi&oacute; mềm mịn, co d&atilde;n 4 chiều, tho&aacute;ng m&aacute;t. &Aacute;o vải Spandex nhẹ khi mặc, co d&atilde;n 4 chiều thoải m&aacute;i vận động</li>\r\n	<li><strong>Form d&aacute;ng</strong>: Quần form ngang đ&ugrave;i, dễ mặc, &aacute;o form &ocirc;m body fit thể thao</li>\r\n</ul>\r\n\r\n<p><strong>Bảng size:</strong></p>\r\n\r\n<p>Size M: 45-63kg</p>\r\n\r\n<p>Size L: 64-71kg</p>\r\n\r\n<p>Size Xl: 72-79kg</p>\r\n\r\n<p>Size XXL: 80-95kg</p>\r\n', NULL, 0, 0, 1, 250000, 4, '2022-06-17 15:31:35', '2022-06-17 15:31:35', 66, '0'),
('Bộ Quần Short + Áo Ngắn Tay ECHT', 'bo-quan-short-ao-ngan-tay-echt', 10, 150000, 80, 0, 'Bộ Quần Short + Áo Ngắn Tay ECHT.jpeg', '<p><strong>M&ocirc; tả sản phẩm:</strong></p>\r\n\r\n<ul>\r\n	<li><strong>Chất liệu</strong>: Quần vải thun gi&oacute; mềm mịn, co d&atilde;n 4 chiều, tho&aacute;ng m&aacute;t. &Aacute;o vải Spandex nhẹ khi mặc, co d&atilde;n 4 chiều thoải m&aacute;i vận động</li>\r\n	<li><strong>Form d&aacute;ng</strong>: Quần form ngang đ&ugrave;i, dễ mặc, &aacute;o form &ocirc;m body fit thể thao</li>\r\n</ul>\r\n\r\n<p><strong>Bảng size:</strong></p>\r\n\r\n<p>Size M: 45-63kg</p>\r\n\r\n<p>Size L: 64-71kg</p>\r\n\r\n<p>Size Xl: 72-79kg</p>\r\n\r\n<p>Size XXL: 80-95kg</p>\r\n', NULL, 0, 0, 1, 100000, 0, '2022-06-17 15:33:05', '2022-06-17 15:33:05', 67, '0'),
('Bộ Quần Short + Áo Ngắn Tay Sport LF01', 'bo-quan-short-ao-ngan-tay-sport-lf01', 10, 350000, 96, 10, 'Bộ Quần Short + Áo Ngắn Tay Sport LF01.jpg', '<p><strong>M&ocirc; tả sản phẩm:</strong></p>\r\n\r\n<ul>\r\n	<li><strong>Chất liệu</strong>: Quần vải thun gi&oacute; mềm mịn, co d&atilde;n 4 chiều, tho&aacute;ng m&aacute;t. &Aacute;o vải Spandex nhẹ khi mặc, co d&atilde;n 4 chiều thoải m&aacute;i vận động</li>\r\n	<li><strong>Form d&aacute;ng</strong>: Quần form ngang đ&ugrave;i, dễ mặc, &aacute;o form &ocirc;m body fit thể thao</li>\r\n</ul>\r\n\r\n<p><strong>Bảng size:</strong></p>\r\n\r\n<p>Size M: 45-63kg</p>\r\n\r\n<p>Size L: 64-71kg</p>\r\n\r\n<p>Size Xl: 72-79kg</p>\r\n\r\n<p>Size XXL: 80-95kg</p>\r\n', NULL, 0, 0, 1, 250000, 0, '2022-06-17 15:33:55', '2022-06-17 15:33:55', 68, '0'),
('Bộ Quần Short + Áo Ngắn Tay Vanquish', 'bo-quan-short-ao-ngan-tay-vanquish', 10, 299000, 50, 0, 'Bộ Quần Short + Áo Ngắn Tay Vanquish.jpg', '<p><strong>M&ocirc; tả sản phẩm:</strong></p>\r\n\r\n<ul>\r\n	<li><strong>Chất liệu</strong>: Quần vải thun gi&oacute; mềm mịn, co d&atilde;n 4 chiều, tho&aacute;ng m&aacute;t. &Aacute;o vải Spandex nhẹ khi mặc, co d&atilde;n 4 chiều thoải m&aacute;i vận động</li>\r\n	<li><strong>Form d&aacute;ng</strong>: Quần form ngang đ&ugrave;i, dễ mặc, &aacute;o form &ocirc;m body fit thể thao</li>\r\n</ul>\r\n\r\n<p><strong>Bảng size:</strong></p>\r\n\r\n<p>Size M: 45-63kg</p>\r\n\r\n<p>Size L: 64-71kg</p>\r\n\r\n<p>Size Xl: 72-79kg</p>\r\n\r\n<p>Size XXL: 80-95kg</p>\r\n', NULL, 0, 0, 1, 200000, 0, '2022-06-17 15:34:52', '2022-06-17 15:34:52', 69, '0'),
('Bộ Quần Short + Áo Sát Nách Squatwolf', 'bo-quan-short-ao-sat-nach-squatwolf', 10, 199000, 68, 0, 'Bộ Quần Short + Áo Sát Nách Squatwolf.png', '<p><strong>M&ocirc; tả sản phẩm:</strong></p>\r\n\r\n<ul>\r\n	<li><strong>Chất liệu</strong>: Quần vải thun gi&oacute; mềm mịn, co d&atilde;n 4 chiều, tho&aacute;ng m&aacute;t. &Aacute;o vải Spandex nhẹ khi mặc, co d&atilde;n 4 chiều thoải m&aacute;i vận động</li>\r\n	<li><strong>Form d&aacute;ng</strong>: Quần form ngang đ&ugrave;i, dễ mặc, &aacute;o form &ocirc;m body fit thể thao</li>\r\n</ul>\r\n\r\n<p><strong>Bảng size:</strong></p>\r\n\r\n<p>Size M: 45-63kg</p>\r\n\r\n<p>Size L: 64-71kg</p>\r\n\r\n<p>Size Xl: 72-79kg</p>\r\n\r\n<p>Size XXL: 80-95kg</p>\r\n', NULL, 0, 0, 1, 150000, 0, '2022-06-17 15:35:36', '2022-06-17 15:35:36', 70, '0'),
('Bộ Quần Short + Áo Sát Nách Ultility', 'bo-quan-short-ao-sat-nach-ultility', 10, 320000, 28, 0, 'Bộ Quần Short + Áo Sát Nách Ultility.jpg', '<p><strong>M&ocirc; tả sản phẩm:</strong></p>\r\n\r\n<ul>\r\n	<li><strong>Chất liệu</strong>: Quần vải thun gi&oacute; mềm mịn, co d&atilde;n 4 chiều, tho&aacute;ng m&aacute;t. &Aacute;o vải Spandex nhẹ khi mặc, co d&atilde;n 4 chiều thoải m&aacute;i vận động</li>\r\n	<li><strong>Form d&aacute;ng</strong>: Quần form ngang đ&ugrave;i, dễ mặc, &aacute;o form &ocirc;m body fit thể thao</li>\r\n</ul>\r\n\r\n<p><strong>Bảng size:</strong></p>\r\n\r\n<p>Size M: 45-63kg</p>\r\n\r\n<p>Size L: 64-71kg</p>\r\n\r\n<p>Size Xl: 72-79kg</p>\r\n\r\n<p>Size XXL: 80-95kg</p>\r\n', NULL, 0, 0, 1, 180000, 0, '2022-06-17 15:36:34', '2022-06-17 15:36:34', 71, '0'),
('Bộ Quần Short + Áo Tank Top Alphalete', 'bo-quan-short-ao-tank-top-alphalete', 10, 320000, 70, 0, 'Bộ Quần Short + Áo Tank Top Alphalete.jpg', '<p><strong>M&ocirc; tả sản phẩm:</strong></p>\r\n\r\n<ul>\r\n	<li><strong>Chất liệu</strong>: Quần vải thun gi&oacute; mềm mịn, co d&atilde;n 4 chiều, tho&aacute;ng m&aacute;t. &Aacute;o vải Spandex nhẹ khi mặc, co d&atilde;n 4 chiều thoải m&aacute;i vận động</li>\r\n	<li><strong>Form d&aacute;ng</strong>: Quần form ngang đ&ugrave;i, dễ mặc, &aacute;o form &ocirc;m body fit thể thao</li>\r\n</ul>\r\n\r\n<p><strong>Bảng size:</strong></p>\r\n\r\n<p>Size M: 45-63kg</p>\r\n\r\n<p>Size L: 64-71kg</p>\r\n\r\n<p>Size Xl: 72-79kg</p>\r\n\r\n<p>Size XXL: 80-95kg</p>\r\n', NULL, 0, 0, 1, 160000, 0, '2022-06-17 15:37:44', '2022-06-17 15:37:44', 73, '0'),
('Bộ Quần Short Alpha + Áo Ngắn Tay 304', 'bo-quan-short-alpha-ao-ngan-tay-304', 10, 340000, 56, 10, 'Bộ Quần Short Alpha + Áo Ngắn Tay 304.jpg', '<p><strong>M&ocirc; tả sản phẩm:</strong></p>\r\n\r\n<ul>\r\n	<li><strong>Chất liệu</strong>: Quần vải thun gi&oacute; mềm mịn, co d&atilde;n 4 chiều, tho&aacute;ng m&aacute;t. &Aacute;o vải Spandex nhẹ khi mặc, co d&atilde;n 4 chiều thoải m&aacute;i vận động</li>\r\n	<li><strong>Form d&aacute;ng</strong>: Quần form ngang đ&ugrave;i, dễ mặc, &aacute;o form &ocirc;m body fit thể thao</li>\r\n</ul>\r\n\r\n<p><strong>Bảng size:</strong></p>\r\n\r\n<p>Size M: 45-63kg</p>\r\n\r\n<p>Size L: 64-71kg</p>\r\n\r\n<p>Size Xl: 72-79kg</p>\r\n\r\n<p>Size XXL: 80-95kg</p>\r\n', NULL, 0, 0, 1, 210000, 0, '2022-06-17 15:39:08', '2022-06-17 15:39:08', 75, '0'),
('Bộ Quần Short VQ G2 + Áo Sát Nách VQ', 'bo-quan-short-vq-g2-ao-sat-nach-vq', 10, 270000, 70, 0, 'Bộ Quần Short VQ G2 + Áo Sát Nách VQ.jpg', '<p><strong>M&ocirc; tả sản phẩm:</strong></p>\r\n\r\n<ul>\r\n	<li><strong>Chất liệu</strong>: Quần vải thun gi&oacute; mềm mịn, co d&atilde;n 4 chiều, tho&aacute;ng m&aacute;t. &Aacute;o vải Spandex nhẹ khi mặc, co d&atilde;n 4 chiều thoải m&aacute;i vận động</li>\r\n	<li><strong>Form d&aacute;ng</strong>: Quần form ngang đ&ugrave;i, dễ mặc, &aacute;o form &ocirc;m body fit thể thao</li>\r\n</ul>\r\n\r\n<p><strong>Bảng size:</strong></p>\r\n\r\n<p>Size M: 45-63kg</p>\r\n\r\n<p>Size L: 64-71kg</p>\r\n\r\n<p>Size Xl: 72-79kg</p>\r\n\r\n<p>Size XXL: 80-95kg</p>\r\n', NULL, 0, 0, 1, 180000, 0, '2022-06-17 15:41:18', '2022-06-17 15:41:18', 76, '0'),
('Bộ Quần Short VQ Khóa + Áo Sát Nách VQ', 'bo-quan-short-vq-khoa-ao-sat-nach-vq', 10, 400000, 59, 10, 'Bộ Quần Short VQ Khóa + Áo Sát Nách VQ.jpg', '<p><strong>M&ocirc; tả sản phẩm:</strong></p>\r\n\r\n<ul>\r\n	<li><strong>Chất liệu</strong>: Quần vải thun gi&oacute; mềm mịn, co d&atilde;n 4 chiều, tho&aacute;ng m&aacute;t. &Aacute;o vải Spandex nhẹ khi mặc, co d&atilde;n 4 chiều thoải m&aacute;i vận động</li>\r\n	<li><strong>Form d&aacute;ng</strong>: Quần form ngang đ&ugrave;i, dễ mặc, &aacute;o form &ocirc;m body fit thể thao</li>\r\n</ul>\r\n\r\n<p><strong>Bảng size:</strong></p>\r\n\r\n<p>Size M: 45-63kg</p>\r\n\r\n<p>Size L: 64-71kg</p>\r\n\r\n<p>Size Xl: 72-79kg</p>\r\n\r\n<p>Size XXL: 80-95kg</p>\r\n', NULL, 0, 0, 1, 300000, 0, '2022-06-17 15:42:16', '2022-06-17 15:42:16', 77, '0'),
(' Quần Jogger ECHT Rằn Ri', 'quan-jogger-echt-ran-ri', 8, 200000, 70, 0, 'Quần Jogger ECHT Rằn Ri.jpg', '<p><strong>M&ocirc; tả sản phẩm</strong>:</p>\r\n\r\n<ul>\r\n	<li>Chất vải nỉ da c&aacute; cao cấp. Vải trơn, mịn co d&atilde;n 4 chiều</li>\r\n	<li>Form &ocirc;m bo cổ ch&acirc;n t&ocirc;n d&aacute;ng</li>\r\n	<li>2 t&uacute;i c&oacute; kh&oacute;a 2 b&ecirc;n</li>\r\n	<li>M&agrave;u sắc: 2 m&agrave;u đen rằn ri, n&acirc;u rằn ri như h&igrave;nh chụp s&agrave;n</li>\r\n</ul>\r\n\r\n<p><strong>Bảng size</strong></p>\r\n\r\n<ul>\r\n	<li>Size M: 45-62kg</li>\r\n	<li>Size L: 63-70kg</li>\r\n	<li>Size Xl: 71-78kg</li>\r\n	<li>Size XXL: 79-90kg</li>\r\n</ul>\r\n', NULL, 1, 0, 1, 150000, 0, '2022-06-18 14:09:30', '2022-06-18 14:09:30', 79, '0'),
('Quần Jogger ECHT Túi Hộp', 'quan-jogger-echt-tui-hop', 8, 290000, 30, 0, 'Quần Jogger ECHT Túi Hộp.jpg', '<p><strong>M&ocirc; tả sản phẩm</strong>:</p>\r\n\r\n<ul>\r\n	<li>Chất vải nỉ da c&aacute; cao cấp. Vải trơn, mịn co d&atilde;n 4 chiều</li>\r\n	<li>Form &ocirc;m bo cổ ch&acirc;n t&ocirc;n d&aacute;ng</li>\r\n	<li>2 t&uacute;i c&oacute; kh&oacute;a 2 b&ecirc;n</li>\r\n	<li>M&agrave;u sắc: 2 m&agrave;u đen rằn ri, n&acirc;u rằn ri như h&igrave;nh chụp s&agrave;n</li>\r\n</ul>\r\n\r\n<p><strong>Bảng size</strong></p>\r\n\r\n<ul>\r\n	<li>Size M: 45-62kg</li>\r\n	<li>Size L: 63-70kg</li>\r\n	<li>Size Xl: 71-78kg</li>\r\n	<li>Size XXL: 79-90kg</li>\r\n</ul>\r\n', NULL, 1, 0, 1, 200000, 0, '2022-06-18 14:10:24', '2022-06-18 14:10:24', 80, '0'),
('Quần Jogger ECHT', 'quan-jogger-echt', 8, 290000, 60, 0, 'Quần Jogger ECHT.jpg', '<p><strong>M&ocirc; tả sản phẩm</strong>:</p>\r\n\r\n<ul>\r\n	<li>Chất vải nỉ da c&aacute; cao cấp. Vải trơn, mịn co d&atilde;n 4 chiều</li>\r\n	<li>Form &ocirc;m bo cổ ch&acirc;n t&ocirc;n d&aacute;ng</li>\r\n	<li>2 t&uacute;i c&oacute; kh&oacute;a 2 b&ecirc;n</li>\r\n	<li>M&agrave;u sắc: 2 m&agrave;u đen rằn ri, n&acirc;u rằn ri như h&igrave;nh chụp s&agrave;n</li>\r\n</ul>\r\n\r\n<p><strong>Bảng size</strong></p>\r\n\r\n<ul>\r\n	<li>Size M: 45-62kg</li>\r\n	<li>Size L: 63-70kg</li>\r\n	<li>Size Xl: 71-78kg</li>\r\n	<li>Size XXL: 79-90kg</li>\r\n</ul>\r\n', NULL, 1, 0, 1, 150000, 0, '2022-06-18 14:11:09', '2022-06-18 14:11:09', 82, '0'),
('Quần Jogger Rằn Ri Alphabete', 'quan-jogger-ran-ri-alphabete', 8, 320000, 66, 0, 'Quần Jogger Rằn Ri Alphabete.jpg', '<p><strong>M&ocirc; tả sản phẩm</strong>:</p>\r\n\r\n<ul>\r\n	<li>Chất vải nỉ da c&aacute; cao cấp. Vải trơn, mịn co d&atilde;n 4 chiều</li>\r\n	<li>Form &ocirc;m bo cổ ch&acirc;n t&ocirc;n d&aacute;ng</li>\r\n	<li>2 t&uacute;i c&oacute; kh&oacute;a 2 b&ecirc;n</li>\r\n	<li>M&agrave;u sắc: 2 m&agrave;u đen rằn ri, n&acirc;u rằn ri như h&igrave;nh chụp s&agrave;n</li>\r\n</ul>\r\n\r\n<p><strong>Bảng size</strong></p>\r\n\r\n<ul>\r\n	<li>Size M: 45-62kg</li>\r\n	<li>Size L: 63-70kg</li>\r\n	<li>Size Xl: 71-78kg</li>\r\n	<li>Size XXL: 79-90kg</li>\r\n</ul>\r\n', NULL, 1, 0, 1, 160000, 0, '2022-06-18 14:12:08', '2022-06-18 14:12:08', 83, '0'),
('Quần Jogger VQ', 'quan-jogger-vq', 8, 400000, 99, 0, 'Quần Jogger VQ.jpg', '<p>&nbsp;</p>\r\n\r\n<p><strong>M&ocirc; tả sản phẩm</strong>:</p>\r\n\r\n<ul>\r\n	<li>Chất vải nỉ da c&aacute; cao cấp. Vải trơn, mịn co d&atilde;n 4 chiều</li>\r\n	<li>Form &ocirc;m bo cổ ch&acirc;n t&ocirc;n d&aacute;ng</li>\r\n	<li>2 t&uacute;i c&oacute; kh&oacute;a 2 b&ecirc;n</li>\r\n	<li>M&agrave;u sắc: 2 m&agrave;u đen rằn ri, n&acirc;u rằn ri như h&igrave;nh chụp s&agrave;n</li>\r\n</ul>\r\n\r\n<p><strong>Bảng size</strong></p>\r\n\r\n<ul>\r\n	<li>Size M: 45-62kg</li>\r\n	<li>Size L: 63-70kg</li>\r\n	<li>Size Xl: 71-78kg</li>\r\n	<li>Size XXL: 79-90kg</li>\r\n</ul>\r\n', NULL, 1, 0, 1, 240000, 0, '2022-06-18 14:13:29', '2022-06-18 14:13:29', 85, '0'),
('Quần Short 2 Lớp GYM Workout', 'quan-short-2-lop-gym-workout', 8, 210000, 99, 10, 'Quần Short 2 Lớp GYM Workout.jpg', '<p><strong>M&ocirc; tả sản phẩm</strong></p>\r\n\r\n<ul>\r\n	<li>Chất liệu: Quần vải thun gi&oacute; co d&atilde;n 4 chiều, thoải m&aacute;i vận động</li>\r\n	<li>Form: Form ngắn ngang đ&ugrave;i, xẻ 2 b&ecirc;n ph&ugrave; hợp tập luyện</li>\r\n</ul>\r\n\r\n<p><strong>Bảng size</strong></p>\r\n\r\n<ul>\r\n	<li>Size M: 45-62kg</li>\r\n	<li>Size L: 63-70kg</li>\r\n	<li>Size XL: 71-78kg</li>\r\n	<li>Size XXL: 79-90kg</li>\r\n</ul>\r\n', NULL, 0, 0, 1, 100000, 0, '2022-06-18 14:41:18', '2022-06-18 14:41:18', 87, '0'),
('Quần Short Gym VQG2', 'quan-short-gym-vqg2', 8, 180000, 67, 0, 'Quần Short Gym VQG2.jpg', '<p><strong>M&ocirc; tả sản phẩm</strong></p>\r\n\r\n<ul>\r\n	<li>Chất liệu: Quần vải thun gi&oacute; co d&atilde;n 4 chiều, thoải m&aacute;i vận động</li>\r\n	<li>Form: Form ngắn ngang đ&ugrave;i, xẻ 2 b&ecirc;n ph&ugrave; hợp tập luyện</li>\r\n</ul>\r\n\r\n<p><strong>Bảng size</strong></p>\r\n\r\n<ul>\r\n	<li>Size M: 45-62kg</li>\r\n	<li>Size L: 63-70kg</li>\r\n	<li>Size XL: 71-78kg</li>\r\n	<li>Size XXL: 79-90kg</li>\r\n</ul>\r\n', NULL, 1, 0, 1, 120000, 0, '2022-06-18 14:42:10', '2022-06-18 14:42:10', 88, '0'),
('Quần Short Tập Gym ECHT', 'quan-short-tap-gym-echt', 8, 250000, 55, 0, 'Quần Short Tập Gym ECHT.jpg', '<p><strong>M&ocirc; tả sản phẩm</strong></p>\r\n\r\n<ul>\r\n	<li>Chất liệu: Quần vải thun gi&oacute; co d&atilde;n 4 chiều, thoải m&aacute;i vận động</li>\r\n	<li>Form: Form ngắn ngang đ&ugrave;i, xẻ 2 b&ecirc;n ph&ugrave; hợp tập luyện</li>\r\n</ul>\r\n\r\n<p><strong>Bảng size</strong></p>\r\n\r\n<ul>\r\n	<li>Size M: 45-62kg</li>\r\n	<li>Size L: 63-70kg</li>\r\n	<li>Size XL: 71-78kg</li>\r\n	<li>Size XXL: 79-90kg</li>\r\n</ul>\r\n', NULL, 1, 0, 1, 150000, 0, '2022-06-18 14:42:51', '2022-06-18 14:42:51', 89, '0'),
('Quần Short Tập Gym Ultility', 'quan-short-tap-gym-ultility', 8, 229000, 70, 0, 'Quần Short Tập Gym Ultility.jpg', '<p><strong>M&ocirc; tả sản phẩm</strong></p>\r\n\r\n<ul>\r\n	<li>Chất liệu: Quần vải thun gi&oacute; co d&atilde;n 4 chiều, thoải m&aacute;i vận động</li>\r\n	<li>Form: Form ngắn ngang đ&ugrave;i, xẻ 2 b&ecirc;n ph&ugrave; hợp tập luyện</li>\r\n</ul>\r\n\r\n<p><strong>Bảng size</strong></p>\r\n\r\n<ul>\r\n	<li>Size M: 45-62kg</li>\r\n	<li>Size L: 63-70kg</li>\r\n	<li>Size XL: 71-78kg</li>\r\n	<li>Size XXL: 79-90kg</li>\r\n</ul>\r\n', NULL, 1, 0, 1, 160000, 0, '2022-06-18 14:44:05', '2022-06-18 14:44:05', 90, '0'),
('Quần Short VQ Túi Khóa', 'quan-short-vq-tui-khoa', 8, 239000, 67, 0, 'Quần Short VQ Túi Khóa.jpg', '<p><strong>M&ocirc; tả sản phẩm</strong></p>\r\n\r\n<ul>\r\n	<li>Chất liệu: Quần vải thun gi&oacute; co d&atilde;n 4 chiều, thoải m&aacute;i vận động</li>\r\n	<li>Form: Form ngắn ngang đ&ugrave;i, xẻ 2 b&ecirc;n ph&ugrave; hợp tập luyện</li>\r\n</ul>\r\n\r\n<p><strong>Bảng size</strong></p>\r\n\r\n<ul>\r\n	<li>Size M: 45-62kg</li>\r\n	<li>Size L: 63-70kg</li>\r\n	<li>Size XL: 71-78kg</li>\r\n	<li>Size XXL: 79-90kg</li>\r\n</ul>\r\n', NULL, 1, 0, 1, 145000, 0, '2022-06-18 14:45:37', '2022-06-18 14:45:37', 91, '0'),
('Quần Short 2 Lớp Dài Tập Gym', 'quan-short-2-lop-dai-tap-gym', 8, 390000, 78, 10, 'Quần Short 2 Lớp Dài Tập Gym.jpg', '<p><strong>M&ocirc; tả sản phẩm</strong></p>\r\n\r\n<p>&ndash;&nbsp;<strong>Form d&aacute;ng</strong>: Form &ocirc;m t&ocirc;n m&ocirc;ng, bo cổ ch&acirc;n, thoải m&aacute;i vận động thể thao</p>\r\n\r\n<p>&ndash;&nbsp;<strong>Chất vải</strong>: Vải nỉ da c&aacute; cao cấp, co d&atilde;n 4 chiều, tho&aacute;ng kh&iacute;, lịch sự</p>\r\n\r\n<p><strong>★ Hướng dẫn chọn size:</strong></p>\r\n\r\n<p>&ndash;&nbsp; Size M: 50 Kg &ndash;&nbsp; 64 Kg</p>\r\n\r\n<p>&ndash;&nbsp; Size L: 65 Kg &ndash; 72 Kg</p>\r\n\r\n<p>&ndash;&nbsp; Size XL: 73kg -79Kg</p>\r\n\r\n<p>&ndash;&nbsp; Size XXL: 80Kg &ndash; 90Kg</p>\r\n', NULL, 1, 0, 1, 180000, 0, '2022-06-18 14:49:21', '2022-06-18 14:49:21', 92, '0'),
('Quần Short Thể Thao Butz', 'quan-short-the-thao-butz', 8, 199000, 99, 0, 'Quần Short Thể Thao Butz.jpg', '<p><strong>M&ocirc; tả sản phẩm</strong></p>\r\n\r\n<p>&ndash;&nbsp;<strong>Form d&aacute;ng</strong>: Form &ocirc;m t&ocirc;n m&ocirc;ng, bo cổ ch&acirc;n, thoải m&aacute;i vận động thể thao</p>\r\n\r\n<p>&ndash;&nbsp;<strong>Chất vải</strong>: Vải nỉ da c&aacute; cao cấp, co d&atilde;n 4 chiều, tho&aacute;ng kh&iacute;, lịch sự</p>\r\n\r\n<p><strong>★ Hướng dẫn chọn size:</strong></p>\r\n\r\n<p>&ndash;&nbsp; Size M: 50 Kg &ndash;&nbsp; 64 Kg</p>\r\n\r\n<p>&ndash;&nbsp; Size L: 65 Kg &ndash; 72 Kg</p>\r\n\r\n<p>&ndash;&nbsp; Size XL: 73kg -79Kg</p>\r\n\r\n<p>&ndash;&nbsp; Size XXL: 80Kg &ndash; 90Kg</p>\r\n', NULL, 1, 0, 1, 110000, 0, '2022-06-18 14:50:31', '2022-06-18 14:50:31', 93, '0'),
('Áo Ba Lỗ – 2 Dây Stringer Ý', 'ao-ba-lo-2-day-stringer-y', 9, 150000, 78, 0, 'Áo Ba Lỗ – 2 Dây Stringer Ý.jpg', '<p><strong>M&ocirc; tả sản phẩm:</strong></p>\r\n\r\n<p>&ndash; Form d&aacute;ng: Form cắt xẻ tank top, xẻ ngang sườn, form mặc rộng thoải m&aacute;i, kh&ocirc;ng &ocirc;m</p>\r\n\r\n<p>&ndash; Chất vải: &Aacute;o vải Cotton 100%, thấm mồ h&ocirc;i, co d&atilde;n 4 chiều, kh&ocirc;ng bai x&ugrave;</p>\r\n\r\n<p><strong>Hướng dẫn chọn size</strong></p>\r\n\r\n<p>★ Size M: 55 Kg &ndash; 65 Kg</p>\r\n\r\n<p>★ Size L: 66 Kg &ndash; 75 Kg</p>\r\n\r\n<p>★ Size XL: 76kg -82Kg</p>\r\n\r\n<p>★ Size XXL: 83Kg &ndash; 95Kg</p>\r\n', NULL, 1, 0, 1, 90000, 0, '2022-06-18 15:11:18', '2022-06-18 15:11:18', 94, '0'),
('Áo Ba Lỗ – Tank Top Buzt', 'ao-ba-lo-tank-top-buzt', 9, 200000, 59, 10, 'Áo Ba Lỗ – Tank Top Buzt.jpg', '<p><strong>M&ocirc; tả sản phẩm:</strong></p>\r\n\r\n<p>&ndash; Form d&aacute;ng: Form cắt xẻ tank top, xẻ ngang sườn, form mặc rộng thoải m&aacute;i, kh&ocirc;ng &ocirc;m</p>\r\n\r\n<p>&ndash; Chất vải: &Aacute;o vải Cotton 100%, thấm mồ h&ocirc;i, co d&atilde;n 4 chiều, kh&ocirc;ng bai x&ugrave;</p>\r\n\r\n<p><strong>Hướng dẫn chọn size</strong></p>\r\n\r\n<p>★ Size M: 55 Kg &ndash; 65 Kg</p>\r\n\r\n<p>★ Size L: 66 Kg &ndash; 75 Kg</p>\r\n\r\n<p>★ Size XL: 76kg -82Kg</p>\r\n\r\n<p>★ Size XXL: 83Kg &ndash; 95Kg</p>\r\n', NULL, 1, 0, 1, 100000, 0, '2022-06-18 15:12:21', '2022-06-18 15:12:21', 96, '0'),
('Áo Ba Lỗ – Tank Top CRNS', 'ao-ba-lo-tank-top-crns', 9, 210000, 40, 5, 'Áo Ba Lỗ – Tank Top CRNS.jpg', '<p><strong>M&ocirc; tả sản phẩm:</strong></p>\r\n\r\n<p>&ndash; Form d&aacute;ng: Form cắt xẻ tank top, xẻ ngang sườn, form mặc rộng thoải m&aacute;i, kh&ocirc;ng &ocirc;m</p>\r\n\r\n<p>&ndash; Chất vải: &Aacute;o vải Cotton 100%, thấm mồ h&ocirc;i, co d&atilde;n 4 chiều, kh&ocirc;ng bai x&ugrave;</p>\r\n\r\n<p><strong>Hướng dẫn chọn size</strong></p>\r\n\r\n<p>★ Size M: 55 Kg &ndash; 65 Kg</p>\r\n\r\n<p>★ Size L: 66 Kg &ndash; 75 Kg</p>\r\n\r\n<p>★ Size XL: 76kg -82Kg</p>\r\n\r\n<p>★ Size XXL: 83Kg &ndash; 95Kg</p>\r\n', NULL, 1, 0, 1, 120000, 0, '2022-06-18 15:13:29', '2022-06-18 15:13:29', 97, '0'),
('Áo Ba Lỗ Tank Top C – Born To Lift', 'ao-ba-lo-tank-top-c-born-to-lift', 9, 150000, 78, 10, 'Áo Ba Lỗ Tank Top C – Born To Lift.jpg', '<p><strong>M&ocirc; tả sản phẩm:</strong></p>\r\n\r\n<p>&ndash; Form d&aacute;ng: Form cắt xẻ tank top, xẻ ngang sườn, form mặc rộng thoải m&aacute;i, kh&ocirc;ng &ocirc;m</p>\r\n\r\n<p>&ndash; Chất vải: &Aacute;o vải Cotton 100%, thấm mồ h&ocirc;i, co d&atilde;n 4 chiều, kh&ocirc;ng bai x&ugrave;</p>\r\n\r\n<p><strong>Hướng dẫn chọn size</strong></p>\r\n\r\n<p>★ Size M: 55 Kg &ndash; 65 Kg</p>\r\n\r\n<p>★ Size L: 66 Kg &ndash; 75 Kg</p>\r\n\r\n<p>★ Size XL: 76kg -82Kg</p>\r\n\r\n<p>★ Size XXL: 83Kg &ndash; 95Kg</p>\r\n', NULL, 1, 0, 1, 80000, 0, '2022-06-18 15:14:21', '2022-06-18 15:14:21', 98, '0'),
('Áo Sát Nách Squatwolf Cotton', 'ao-sat-nach-squatwolf-cotton', 9, 165000, 80, 0, 'Áo Sát Nách Squatwolf Cotton.jpg', '<p><strong>M&ocirc; tả sản phẩm:</strong></p>\r\n\r\n<p>&ndash; Form d&aacute;ng: Form cắt xẻ tank top, xẻ ngang sườn, form mặc rộng thoải m&aacute;i, kh&ocirc;ng &ocirc;m</p>\r\n\r\n<p>&ndash; Chất vải: &Aacute;o vải Cotton 100%, thấm mồ h&ocirc;i, co d&atilde;n 4 chiều, kh&ocirc;ng bai x&ugrave;</p>\r\n\r\n<p><strong>Hướng dẫn chọn size</strong></p>\r\n\r\n<p>★ Size M: 55 Kg &ndash; 65 Kg</p>\r\n\r\n<p>★ Size L: 66 Kg &ndash; 75 Kg</p>\r\n\r\n<p>★ Size XL: 76kg -82Kg</p>\r\n\r\n<p>★ Size XXL: 83Kg &ndash; 95Kg</p>\r\n', NULL, 1, 0, 1, 100000, 0, '2022-06-18 15:15:20', '2022-06-18 15:15:20', 99, '0'),
('Áo Sát Nách Vanquish (VQ)', 'ao-sat-nach-vanquish-vq', 9, 155000, 50, 0, 'Áo Sát Nách Vanquish (VQ).jpg', '<p><strong>M&ocirc; tả sản phẩm:</strong></p>\r\n\r\n<p>&ndash; Form d&aacute;ng: Form cắt xẻ tank top, xẻ ngang sườn, form mặc rộng thoải m&aacute;i, kh&ocirc;ng &ocirc;m</p>\r\n\r\n<p>&ndash; Chất vải: &Aacute;o vải Cotton 100%, thấm mồ h&ocirc;i, co d&atilde;n 4 chiều, kh&ocirc;ng bai x&ugrave;</p>\r\n\r\n<p><strong>Hướng dẫn chọn size</strong></p>\r\n\r\n<p>★ Size M: 55 Kg &ndash; 65 Kg</p>\r\n\r\n<p>★ Size L: 66 Kg &ndash; 75 Kg</p>\r\n\r\n<p>★ Size XL: 76kg -82Kg</p>\r\n\r\n<p>★ Size XXL: 83Kg &ndash; 95Kg</p>\r\n', NULL, 0, 0, 1, 99000, 0, '2022-06-18 15:16:10', '2022-06-18 15:16:10', 101, '0'),
('Áo Tank Top Alpha Form Teecut', 'ao-tank-top-alpha-form-teecut', 9, 170000, 99, 0, 'Áo Tank Top Alpha Form Teecut.jpg', '<p><strong>M&ocirc; tả sản phẩm:</strong></p>\r\n\r\n<p>&ndash; Form d&aacute;ng: Form cắt xẻ tank top, xẻ ngang sườn, form mặc rộng thoải m&aacute;i, kh&ocirc;ng &ocirc;m</p>\r\n\r\n<p>&ndash; Chất vải: &Aacute;o vải Cotton 100%, thấm mồ h&ocirc;i, co d&atilde;n 4 chiều, kh&ocirc;ng bai x&ugrave;</p>\r\n\r\n<p><strong>Hướng dẫn chọn size</strong></p>\r\n\r\n<p>★ Size M: 55 Kg &ndash; 65 Kg</p>\r\n\r\n<p>★ Size L: 66 Kg &ndash; 75 Kg</p>\r\n\r\n<p>★ Size XL: 76kg -82Kg</p>\r\n\r\n<p>★ Size XXL: 83Kg &ndash; 95Kg</p>\r\n', NULL, 0, 0, 1, 110000, 0, '2022-06-18 15:16:58', '2022-06-18 15:16:58', 102, '0'),
('Áo Tank Top Alphalete', 'ao-tank-top-alphalete', 9, 180000, 57, 5, 'Áo Tank Top Alphalete.jpg', '<p><strong>M&ocirc; tả sản phẩm:</strong></p>\r\n\r\n<p>&ndash; Form d&aacute;ng: Form cắt xẻ tank top, xẻ ngang sườn, form mặc rộng thoải m&aacute;i, kh&ocirc;ng &ocirc;m</p>\r\n\r\n<p>&ndash; Chất vải: &Aacute;o vải Cotton 100%, thấm mồ h&ocirc;i, co d&atilde;n 4 chiều, kh&ocirc;ng bai x&ugrave;</p>\r\n\r\n<p><strong>Hướng dẫn chọn size</strong></p>\r\n\r\n<p>★ Size M: 55 Kg &ndash; 65 Kg</p>\r\n\r\n<p>★ Size L: 66 Kg &ndash; 75 Kg</p>\r\n\r\n<p>★ Size XL: 76kg -82Kg</p>\r\n\r\n<p>★ Size XXL: 83Kg &ndash; 95Kg</p>\r\n', NULL, 1, 0, 1, 105000, 0, '2022-06-18 15:17:49', '2022-06-18 15:17:49', 104, '0'),
('Áo Tank Top Cotton TKFM', 'ao-tank-top-cotton-tkfm', 9, 155000, 44, 5, 'Áo Tank Top Cotton TKFM.jpg', '<p><strong>M&ocirc; tả sản phẩm:</strong></p>\r\n\r\n<p>&ndash; Form d&aacute;ng: Form cắt xẻ tank top, xẻ ngang sườn, form mặc rộng thoải m&aacute;i, kh&ocirc;ng &ocirc;m</p>\r\n\r\n<p>&ndash; Chất vải: &Aacute;o vải Cotton 100%, thấm mồ h&ocirc;i, co d&atilde;n 4 chiều, kh&ocirc;ng bai x&ugrave;</p>\r\n\r\n<p><strong>Hướng dẫn chọn size</strong></p>\r\n\r\n<p>★ Size M: 55 Kg &ndash; 65 Kg</p>\r\n\r\n<p>★ Size L: 66 Kg &ndash; 75 Kg</p>\r\n\r\n<p>★ Size XL: 76kg -82Kg</p>\r\n\r\n<p>★ Size XXL: 83Kg &ndash; 95Kg</p>\r\n', NULL, 0, 0, 1, 95000, 0, '2022-06-18 15:18:58', '2022-06-18 15:18:58', 105, '0'),
('Áo Tank Top Sát Nách 3G', 'ao-tank-top-sat-nach-3g', 9, 175000, 57, 5, 'Áo Tank Top Sát Nách 3G.jpg', '<p><strong>M&ocirc; tả sản phẩm:</strong></p>\r\n\r\n<p>&ndash; Form d&aacute;ng: Form cắt xẻ tank top, xẻ ngang sườn, form mặc rộng thoải m&aacute;i, kh&ocirc;ng &ocirc;m</p>\r\n\r\n<p>&ndash; Chất vải: &Aacute;o vải Cotton 100%, thấm mồ h&ocirc;i, co d&atilde;n 4 chiều, kh&ocirc;ng bai x&ugrave;</p>\r\n\r\n<p><strong>Hướng dẫn chọn size</strong></p>\r\n\r\n<p>★ Size M: 55 Kg &ndash; 65 Kg</p>\r\n\r\n<p>★ Size L: 66 Kg &ndash; 75 Kg</p>\r\n\r\n<p>★ Size XL: 76kg -82Kg</p>\r\n\r\n<p>★ Size XXL: 83Kg &ndash; 95Kg</p>\r\n', NULL, 1, 0, 1, 120000, 0, '2022-06-18 15:19:49', '2022-06-18 15:19:49', 106, '0'),
('Áo Tank Top Sát Nách Ultility', 'ao-tank-top-sat-nach-ultility', 9, 165000, 70, 5, 'Áo Tank Top Sát Nách Ultility.jpg', '<p><strong>M&ocirc; tả sản phẩm:</strong></p>\r\n\r\n<p>&ndash; Form d&aacute;ng: Form cắt xẻ tank top, xẻ ngang sườn, form mặc rộng thoải m&aacute;i, kh&ocirc;ng &ocirc;m</p>\r\n\r\n<p>&ndash; Chất vải: &Aacute;o vải Cotton 100%, thấm mồ h&ocirc;i, co d&atilde;n 4 chiều, kh&ocirc;ng bai x&ugrave;</p>\r\n\r\n<p><strong>Hướng dẫn chọn size</strong></p>\r\n\r\n<p>★ Size M: 55 Kg &ndash; 65 Kg</p>\r\n\r\n<p>★ Size L: 66 Kg &ndash; 75 Kg</p>\r\n\r\n<p>★ Size XL: 76kg -82Kg</p>\r\n\r\n<p>★ Size XXL: 83Kg &ndash; 95Kg</p>\r\n', NULL, 0, 0, 1, 99000, 0, '2022-06-18 15:20:41', '2022-06-18 15:20:41', 107, '0'),
('Áo Tank Top Tập Gym YT', 'ao-tank-top-tap-gym-yt', 9, 210000, 44, 10, 'Áo Tank Top Tập Gym YT.jpg', '<p><strong>M&ocirc; tả sản phẩm:</strong></p>\r\n\r\n<p>&ndash; Form d&aacute;ng: Form cắt xẻ tank top, xẻ ngang sườn, form mặc rộng thoải m&aacute;i, kh&ocirc;ng &ocirc;m</p>\r\n\r\n<p>&ndash; Chất vải: &Aacute;o vải Cotton 100%, thấm mồ h&ocirc;i, co d&atilde;n 4 chiều, kh&ocirc;ng bai x&ugrave;</p>\r\n\r\n<p><strong>Hướng dẫn chọn size</strong></p>\r\n\r\n<p>★ Size M: 55 Kg &ndash; 65 Kg</p>\r\n\r\n<p>★ Size L: 66 Kg &ndash; 75 Kg</p>\r\n\r\n<p>★ Size XL: 76kg -82Kg</p>\r\n\r\n<p>★ Size XXL: 83Kg &ndash; 95Kg</p>\r\n', NULL, 0, 0, 1, 130000, 0, '2022-06-18 15:21:41', '2022-06-18 15:21:41', 108, '0'),
('Bình Nước Tập Gym 750ml', 'binh-nuoc-tap-gym-750ml', 13, 90000, 99, 5, 'Bình Nước Tập Gym 750ml.jpg', '<p><strong>★ Th&ocirc;ng tin sản phẩm:</strong></p>\r\n\r\n<p>&nbsp; &ndash;&nbsp; C&ocirc;ng dụng: Sử dụng khi tập gym, thể thao, du lịch,&hellip;</p>\r\n\r\n<p>&nbsp;&nbsp;&ndash;&nbsp; Chất liệu: &nbsp;Nhựa PP cao cấp</p>\r\n\r\n<p>&nbsp; &ndash;&nbsp; Loại: 1 ngăn</p>\r\n\r\n<p>&nbsp; &ndash; Dung t&iacute;ch: 750ml c&oacute; quả lắc b&ecirc;n trong tiện lợi</p>\r\n\r\n<p>(B&igrave;nh nước sẽ được chọn ngẫu nhi&ecirc;n, nếu kh&aacute;ch muốn chọn mẫu vui l&ograve;ng ghi ch&uacute; lại khi ho&agrave;n th&agrave;nh đơn h&agrave;ng)</p>\r\n', NULL, 0, 0, 1, 50000, 0, '2022-06-19 08:07:40', '2022-06-19 08:07:40', 109, '0'),
('Bình Nước Tập Gym 3 Ngăn Spider', 'binh-nuoc-tap-gym-3-ngan-spider', 13, 100000, 99, 10, 'Bình Nước Tập Gym 3 Ngăn Spider.jpg', '<h1>B&igrave;nh Nước Tập Gym 3 Ngăn Spider</h1>\r\n\r\n<p>90.000₫</p>\r\n\r\n<p><strong>B&igrave;nh nước 3 ngăn tập gym Spider</strong></p>\r\n\r\n<ul>\r\n	<li>Dung t&iacute;ch: 500ml. Thiết kế 3 ngăn, 2 ngăn c&ograve;n lại đựng whey, mass khi đi tập</li>\r\n	<li>Chất liệu: Nhựa PP cao cấp chịu nhiệt</li>\r\n	<li>Nắp đậy chắc chắn kh&ocirc;ng rỉ nước</li>\r\n</ul>\r\n', NULL, 0, 0, 1, 50000, 0, '2022-06-19 08:11:07', '2022-06-19 08:11:07', 110, '0'),
('Bình 3 Ngăn', 'binh-3-ngan', 13, 120000, 48, 5, 'Bình 3 Ngăn.jpg', '<h1>B&igrave;nh Nước Tập Gym 3 Ngăn Spider</h1>\r\n\r\n<p>90.000₫</p>\r\n\r\n<p><strong>B&igrave;nh nước 3 ngăn tập gym Spider</strong></p>\r\n\r\n<ul>\r\n	<li>Dung t&iacute;ch: 500ml. Thiết kế 3 ngăn, 2 ngăn c&ograve;n lại đựng whey, mass khi đi tập</li>\r\n	<li>Chất liệu: Nhựa PP cao cấp chịu nhiệt</li>\r\n	<li>Nắp đậy chắc chắn kh&ocirc;ng rỉ nước</li>\r\n</ul>\r\n', NULL, 0, 0, 1, 70000, 0, '2022-06-19 08:13:25', '2022-06-19 08:13:25', 111, '0'),
('Quấn Cổ Chân', 'quan-co-chan', 13, 150000, 99, 10, 'Quấn Cổ Chân.jpg', '<p>M&ocirc; tả sản phẩm:</p>\r\n\r\n<ul>\r\n	<li>K&iacute;ch thước: 50 cm x 8 cm</li>\r\n	<li>Gi&aacute; sản phẩm /1 đ&ocirc;i</li>\r\n	<li>T&aacute;c dụng: bảo vệ cổ tay cho c&aacute;c b&agrave;i đẩy ngực, đẩy vai</li>\r\n	<li>Ch&iacute;nh h&atilde;ng Aolikes cao cấp</li>\r\n</ul>\r\n', NULL, 0, 0, 1, 90000, 0, '2022-06-19 08:16:14', '2022-06-19 08:16:14', 112, '0'),
('Quấn Cổ Tay Tập Gym Nam Aolikes', 'quan-co-tay-tap-gym-nam-aolikes', 13, 150000, 70, 5, 'Quấn Cổ Tay Tập Gym Nam Aolikes.png', '<p>&nbsp;</p>\r\n\r\n<p>M&ocirc; tả sản phẩm:</p>\r\n\r\n<ul>\r\n	<li>K&iacute;ch thước: 50 cm x 8 cm</li>\r\n	<li>Gi&aacute; sản phẩm /1 đ&ocirc;i</li>\r\n	<li>T&aacute;c dụng: bảo vệ cổ tay cho c&aacute;c b&agrave;i đẩy ngực, đẩy vai</li>\r\n	<li>Ch&iacute;nh h&atilde;ng Aolikes cao cấp</li>\r\n</ul>\r\n', NULL, 0, 0, 1, 90000, 0, '2022-06-19 08:17:10', '2022-06-19 08:17:10', 113, '0'),
('Túi Chenchen', 'tui-chenchen', 13, 250000, 55, 10, 'Túi Chenchen.jpg', '<h3><strong>★ Th&ocirc;ng tin sản phẩm:</strong></h3>\r\n\r\n<p>&nbsp; &ndash;&nbsp; Khối lượng sản phẩm: 0.5 kg</p>\r\n\r\n<p>&nbsp; &ndash;&nbsp; Chất liệu: &nbsp;vải sợi- kh&ocirc; tho&aacute;ng, kh&ocirc;ng l&agrave;m b&iacute; kh&iacute; b&ecirc;n trong</p>\r\n\r\n<p>&nbsp; &ndash;&nbsp; K&iacute;ch thước: &nbsp;sản phẩm 49 x 25 x 25 cm.</p>\r\n', NULL, 0, 0, 1, 100000, 0, '2022-06-19 08:18:23', '2022-06-19 08:18:23', 114, '0'),
('Đai Bảo Vệ Đầu Gối Aolikes', 'dai-bao-ve-dau-goi-aolikes', 13, 200000, 97, 10, 'Đai Bảo Vệ Đầu Gối Aolikes.jpg', '<p><strong>M&ocirc; tả sản phẩm:</strong></p>\r\n\r\n<ul>\r\n	<li>Đai gối bảo vệ đầu gối tập gym, chơi thể thao</li>\r\n	<li>Đai cao cấp bảo vệ gối chắc chắn nhất</li>\r\n	<li>C&oacute; miếng silicon gi&uacute;p gia cố chắc chắn phần khớp gối</li>\r\n</ul>\r\n', NULL, 0, 0, 1, 10000, 0, '2022-06-19 08:19:42', '2022-06-19 08:19:42', 115, '0'),
('Đai Lưng Aolikes Chính Hãng', 'dai-lung-aolikes-chinh-hang', 13, 160000, 99, 5, 'Đai Lưng Aolikes Chính Hãng.jpg', '<p><strong>M&ocirc; tả sản phẩm:</strong></p>\r\n\r\n<ul>\r\n	<li>Đai Aolike ch&iacute;nh h&atilde;ng</li>\r\n	<li>Đai mềm kết hợp 1 v&ograve;ng cứng b&ecirc;n ngo&agrave;i gi&uacute;p Deadlift, g&aacute;nh tạ chắc chắn hơn</li>\r\n	<li>Đai d&iacute;nh dễ d&agrave;ng điều chỉnh độ rộng v&ograve;ng bụng</li>\r\n</ul>\r\n', NULL, 0, 0, 1, 90000, 0, '2022-06-19 08:20:51', '2022-06-19 08:20:51', 116, '0'),
('Găng Tay Aolikes', 'gang-tay-aolikes', 13, 199000, 98, 10, 'Găng Tay Aolikes.jpg', '<p>M&ocirc; tả sản phẩm:</p>\r\n\r\n<ul>\r\n	<li>Ch&iacute;nh h&atilde;ng Aolikes cao cấp</li>\r\n	<li>Găng tay full b&agrave;n chắc chắn khi tập</li>\r\n	<li>Lớp da b&aacute;m tạ tốt, kh&ocirc;ng bị tu&ocirc;n trượt</li>\r\n</ul>\r\n', NULL, 0, 0, 1, 90000, 0, '2022-06-19 08:22:04', '2022-06-19 08:22:04', 117, '0'),
('Găng Tay SKDK', 'gang-tay-skdk', 13, 120000, 68, 0, 'Găng Tay SKDK.jpg', '<p><strong>Găng Tay Tập Gym Kết Hợp Quấn, Bảo Vệ Cổ Tay Cao Cấp SKDK</strong><br />\r\n<strong>GI&Aacute; SẢN PHẨM/ 1 Đ&Ocirc;I (2 CHIẾC)</strong></p>\r\n\r\n<p>&ndash; Hỗ trợ b&aacute;m tạ, thanh đ&ograve;n tốt hơn<br />\r\n&ndash; Sử dụng rất bền<br />\r\n&ndash; Thoải m&aacute;i, tho&aacute;ng m&aacute;t<br />\r\n&ndash; Kh&ocirc;ng bị mồ h&ocirc;i tay<br />\r\n&ndash; C&oacute; kết hợp quấn bảo vệ cổ tay<br />\r\n&ndash; Sử dụng tập gym, l&ecirc;n x&agrave;</p>\r\n', NULL, 0, 0, 1, 70000, 0, '2022-06-19 08:23:16', '2022-06-19 08:23:16', 118, '0'),
('Dây Kéo Lưng Aolikes', 'day-keo-lung-aolikes', 13, 150000, 99, 10, 'Dây Kéo Lưng Aolikes.jpg', '<p><strong>Mô tả sản phẩm: </strong></p>\r\n\r\n<ul>\r\n	<li>Sử dụng cho các bài tập với tạ, thanh đòn, tập xô, lên xà</li>\r\n	<li>Thương hiệu: Aolikes</li>\r\n</ul>\r\n', NULL, 0, 0, 1, 90000, 0, '2022-06-19 08:24:25', '2022-06-19 08:24:25', 119, 'M,L,X,XX, XXL'),
('Dây Miniband', 'day-miniband', 13, 100000, 99, 10, 'Dây Miniband.jpg', '<p><strong>★ Thông tin sản phẩm:</strong></p>\r\n\r\n<p>  –  Tên sản phẩm: Bộ dây chun kháng lực tập gym</p>\r\n\r\n<p>  –  Chất liệu: Cao su cao Cấp</p>\r\n\r\n<p>  –  Màu sắc: đỏ, xanh dương, xanh lục, đen </p>\r\n\r\n<p><strong>★ Mức nặng tương đương với các màu:</strong></p>\r\n\r\n<p>  –  Đỏ: 10-12Lb</p>\r\n\r\n<p>  –  Xanh dương: 15-20Lb</p>\r\n\r\n<p>  –  Xanh lục: 25-30Lb</p>\r\n\r\n<p>  –  Đen: 35-40Lb</p>\r\n', NULL, 0, 0, 1, 50000, 0, '2022-06-19 08:25:34', '2022-06-19 08:25:34', 120, 'm,l,x,xxl');

-- --------------------------------------------------------

--
-- Table structure for table `thanhvien`
--

CREATE TABLE `thanhvien` (
  `hoten` varchar(50) COLLATE utf8_unicode_ci DEFAULT NULL,
  `email` varchar(50) COLLATE utf8_unicode_ci DEFAULT NULL,
  `password` varchar(50) COLLATE utf8_unicode_ci DEFAULT NULL,
  `diachi` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `thunbar` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `level` tinyint(4) DEFAULT '0',
  `sodienthoai` char(14) COLLATE utf8_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` timestamp NULL DEFAULT CURRENT_TIMESTAMP,
  `id` int(11) NOT NULL,
  `id_auth` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `thanhvien`
--

INSERT INTO `thanhvien` (`hoten`, `email`, `password`, `diachi`, `thunbar`, `level`, `sodienthoai`, `created_at`, `updated_at`, `id`, `id_auth`) VALUES
('123', '123@gmail.com', '25d55ad283aa400af464c76d713c07ad', 'HN', NULL, 0, '0123456789', '2022-06-12 18:20:10', '2022-06-12 18:20:10', 22, NULL),
('Tim', 'DinhHau230699@gmail.com', '25f9e794323b453885f5181f1b624d0b', 'Hà nội', NULL, 0, '0123456789', '2022-06-17 02:26:07', '2022-06-17 02:26:07', 23, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `tintuc`
--

CREATE TABLE `tintuc` (
  `tieude` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `noidung` text COLLATE utf8_unicode_ci,
  `hinhanh` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` timestamp NULL DEFAULT CURRENT_TIMESTAMP,
  `slug` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `id` int(11) NOT NULL,
  `Menu_id` varchar(255) COLLATE utf8_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `tintuc`
--

INSERT INTO `tintuc` (`tieude`, `noidung`, `hinhanh`, `created_at`, `updated_at`, `slug`, `id`, `Menu_id`) VALUES
('Khuyến mãi cho khách hàng', '<h2>Tin khuyến m&atilde;i</h2>\r\n\r\n<h3>CHƯƠNG TR&Igrave;NH &#39;&#39;KH&Aacute;CH H&Agrave;NG TH&Acirc;N THIẾT&#39;&#39;</h3>\r\n\r\n<p>2017-06-23 | 09:14:06 +0700&nbsp;Chuy&ecirc;n mục: Tin khuyến m&atilde;i</p>\r\n\r\n<p>Với mong muốn mang đến cho Qu&yacute; kh&aacute;ch h&agrave;ng những sản phẩm chất lượng tốt nhất đồng thời đi k&egrave;m với dịch vụ tốt nhất v&agrave; ch&iacute;nh s&aacute;ch chăm s&oacute;c kh&aacute;ch h&agrave;ng tuyệt vời nhất. VULCANO xin th&acirc;n tặng Qu&yacute; kh&aacute;ch h&agrave;ng Chương tr&igrave;nh &quot;KH&Aacute;CH H&Agrave;NG TH&Acirc;N THIẾT&quot; như một lời tri &acirc;n s&acirc;u sắc cảm ơn sự tin y&ecirc;u của qu&yacute; kh&aacute;ch d&agrave;nh cho Vulcano</p>\r\n\r\n<p>&nbsp;</p>\r\n\r\n<p>&nbsp;</p>\r\n\r\n<p><img alt=\"\" src=\"https://vulcano.vn/uploaded/images/KHTT.jpg\" /></p>\r\n\r\n<p>&nbsp;</p>\r\n\r\n<ul>\r\n	<li>Ch&iacute;nh s&aacute;ch t&iacute;ch thưởng tr&ecirc;n &aacute;p dụng với tất cả c&aacute;c KH mua h&agrave;ng tại cửa h&agrave;ng b&aacute;n lẻ ch&iacute;nh thức của Vulcano.</li>\r\n	<li>Doanh số cộng dồn của KH được t&iacute;nh bằng tổng số tiền KH thanh to&aacute;n cho một đơn h&agrave;ng, đ&atilde; trừ giảm gi&aacute;( nếu c&oacute;).</li>\r\n	<li>Trong v&ograve;ng 6 th&aacute;ng, nếu KH kh&ocirc;ng ph&aacute;t sinh doanh số sẽ bị hạ 1 bậc xếp hạng từ KIM CƯƠNG xuống V&Agrave;NG, từ V&Agrave;NG xuống BẠC, từ BẠC xuống KH THƯỜNG.</li>\r\n	<li>C&aacute;c CK tr&ecirc;n sẽ kh&ocirc;ng được &aacute;p dụng nếu cửa h&agrave;ng hoặc hệ thống c&oacute; chương tr&igrave;nh khuyến mại chung.</li>\r\n	<li>CK sinh nhật sẽ được &aacute;p dụng trong 1 h&oacute;a đơn kh&ocirc;ng qu&aacute; 03 sản phẩm trong thời hạn 03 ng&agrave;y kể từ ng&agrave;y sinh nhật của KH</li>\r\n</ul>\r\n', 'ảnh sale.jpg', '2022-06-18 15:28:53', '2022-06-18 15:28:53', 'khuyen-mai-cho-khach-hang', 17, '3'),
('Quyền lợi đổi trả hàng', '<p><strong>1. Thời gian tiếp nhận y&ecirc;u cầu đổi/ trả:</strong></p>\r\n\r\n<p>&nbsp;Sau khi nhận được h&agrave;ng, kh&aacute;ch h&agrave;ng c&oacute; quyền c&acirc;n nhắc v&agrave; y&ecirc;u cầu đổi/ trả sản phẩm trong 3 ng&agrave;y l&agrave;m việc <strong>cửa h&agrave;ng&nbsp;</strong>c&oacute; quyền từ chối tiếp nhận mọi y&ecirc;u cầu đổi/ trả từ qu&yacute; kh&aacute;ch được ph&aacute;t sinh sau thời gian tr&ecirc;n.&nbsp;</p>\r\n\r\n<p>Việc x&aacute;c định thời hạn đổi/ trả căn cứ theo ghi ch&uacute; của nh&acirc;n vi&ecirc;n tr&ecirc;n phiếu giao h&agrave;ng hoặc dấu bưu điện nếu gửi đi tỉnh.&nbsp;</p>\r\n\r\n<p><strong>2. Thời gian xử l&yacute; y&ecirc;u cầu đổi/ trả:</strong></p>\r\n\r\n<p>Sau khi Kh&aacute;ch h&agrave;ng th&ocirc;ng b&aacute;o với <strong>cửa h&agrave;ng</strong>&nbsp;về y&ecirc;u cầu đổi/ trả, trong v&ograve;ng 3 &ndash; 5 ng&agrave;y tiếp theo, kh&aacute;ch h&agrave;ng vui l&ograve;ng gửi lại sản phẩm đổi v&agrave; tiền ch&ecirc;nh lệch (nếu c&oacute; &ndash; khi đổi sản phẩm) về&nbsp;.</p>\r\n\r\n<p>Sau thời gian n&agrave;y, nếu ch&uacute;ng t&ocirc;i vẫn chưa nhận được sản phẩm đổi v&agrave; tiền ch&ecirc;nh lệch (nếu c&oacute;), y&ecirc;u cầu đổi/ trả của Kh&aacute;ch h&agrave;ng sẽ bị hủy.&nbsp;</p>\r\n\r\n<p>shop sẽ gửi lại cho Kh&aacute;ch h&agrave;ng sản phẩm mới hoặc ho&agrave;n tiền do trả sản phẩm trong v&ograve;ng 2 -3 ng&agrave;y l&agrave;m việc kể từ khi nhận được sản phẩm đổi của Kh&aacute;ch h&agrave;ng.&nbsp;</p>\r\n\r\n<p><strong>3. Điều kiện đổi/ trả sản phẩm:</strong></p>\r\n\r\n<p>&nbsp; Sản phẩm c&ograve;n nguy&ecirc;n vẹn như khi ban đầu, c&ograve;n nguy&ecirc;n tem m&aacute;c (nếu c&oacute;), chưa c&oacute; dấu hiệu bị sử dụng.</p>\r\n\r\n<p>&nbsp; Sản phẩm kh&ocirc;ng bị bẩn, hư hỏng, trầy xước, c&oacute; m&ugrave;i hoặc đ&atilde; qua sử dụng.</p>\r\n\r\n<p>&nbsp; Sản phẩm kh&ocirc;ng thuộc danh mục những mặt h&agrave;ng kh&ocirc;ng &aacute;p dụng đổi/ trả.&nbsp;</p>\r\n\r\n<p><strong>4. H&igrave;nh thức ho&agrave;n tiền:&nbsp;</strong></p>\r\n\r\n<p>Ho&agrave;n tiền qua t&agrave;i khoản ng&acirc;n h&agrave;ng.</p>\r\n\r\n<p>Thời gian ho&agrave;n tất thủ tục ho&agrave;n tiền: từ&nbsp; 5 &ndash; 7 ng&agrave;y l&agrave;m việc.</p>\r\n\r\n<p>Tuy nhi&ecirc;n, thủ tục b&ecirc;n ph&iacute;a Ng&acirc;n h&agrave;ng c&oacute; thể mất từ 1 đến 2 ng&agrave;y để hiển thị số tiền bồi ho&agrave;n trong t&agrave;i khoản của Kh&aacute;ch h&agrave;ng.</p>\r\n\r\n<p><strong>5. Trường hợp đổi/trả h&agrave;ng theo y&ecirc;u cầu của Kh&aacute;ch h&agrave;ng (kh&ocirc;ng phải lỗi từ cửa h&agrave;ng):</strong></p>\r\n\r\n<p>Kh&aacute;ch h&agrave;ng chỉ được đổi 1 lần cho sản phẩm đ&atilde; mua v&agrave; chỉ khi ChoBCS.vn c&ograve;n sản phẩm thay thế.</p>\r\n\r\n<p>Sản phẩm thay thế phải c&oacute; gi&aacute; trị ngang hoặc cao hơn sản phẩm đ&atilde; mua trước đ&oacute;.&nbsp;</p>\r\n\r\n<p>Với c&aacute;c y&ecirc;u cầu đổi size hoặc m&agrave;u sắc sản phẩm, Cho sẽ hỗ trợ đổi sang sản phẩm c&ugrave;ng kiểu d&aacute;ng hoặc c&ugrave;ng nh&atilde;n h&agrave;ng.&nbsp;</p>\r\n\r\n<p><strong>6. Trường hợp đổi/trả h&agrave;ng do lỗi từ shop:&nbsp;</strong></p>\r\n\r\n<p>Nh&acirc;n vi&ecirc;n&nbsp;sẽ nhận lại sản phẩm muốn đổi tại địa chỉ của Kh&aacute;ch h&agrave;ng theo thời gian đ&atilde; hẹn.</p>\r\n', 'Chinh-sach-doi-tra.jpg', '2022-06-18 15:33:32', '2022-06-18 15:33:32', 'quyen-loi-doi-tra-hang', 18, '3'),
('Sản Phẩm Chất lượng', '<p><strong>1. Cam kết về chất lượng sản phẩm:</strong></p>\r\n\r\n<p>- Chỉ cung cấp những thiết bị ch&iacute;nh h&atilde;ng c&oacute; chất lượng tốt nhất, đảm bảo c&aacute;c y&ecirc;u cầu về kỹ thuật dựa tr&ecirc;n quy tr&igrave;nh KCS chuy&ecirc;n nghiệp.</p>\r\n\r\n<p>- Tuyệt đối kh&ocirc;ng b&aacute;n h&agrave;ng giả, h&agrave;ng nh&aacute;i thương hiệu, h&agrave;ng k&eacute;m chất lượng.</p>\r\n\r\n<p>- Sản phẩm b&aacute;n ra đều được bảo h&agrave;nh d&agrave;i, đảm bảo sự uy t&iacute;n về sản phẩm v&agrave; sự y&ecirc;n t&acirc;m cho kh&aacute;ch h&agrave;ng</p>\r\n\r\n<p>- Cung cấp đến kh&aacute;ch h&agrave;ng dịch vụ trước v&agrave; sau b&aacute;n h&agrave;ng ho&agrave;n hảo, mang đến những trải nghiệm tốt nhất cho kh&aacute;ch h&agrave;ng.</p>\r\n\r\n<p>- Đối với sản phẩm&nbsp;<strong>Like new</strong>&nbsp;của ch&uacute;ng t&ocirc;i đều được c&aacute;c kỹ thuật vi&ecirc;n kiểm tra cẩn thận theo đ&uacute;ng quy tr&igrave;nh, cam kết h&agrave;ng zin nguy&ecirc;n bản, kh&ocirc;ng qua sửa chữa, thay thế linh kiện. Đối với sản phẩm Like new ch&uacute;ng t&ocirc;i khuyến kh&iacute;ch kh&aacute;ch h&agrave;ng mở m&aacute;y kiểm tra linh kiện b&ecirc;n trong.</p>\r\n\r\n<p>- Đối với sản phẩm&nbsp;<strong>New&nbsp;</strong>cam kết 100% nguy&ecirc;n seal chưa active.</p>\r\n\r\n<p><strong>2. Cam kết về chất lượng dịch vụ:</strong></p>\r\n\r\n<p>-&nbsp;<strong>Trước b&aacute;n h&agrave;ng:</strong>&nbsp;đội ngũ nh&acirc;n vi&ecirc;n của c&ocirc;ng ty sẽ tư vấn cho kh&aacute;ch h&agrave;ng về nhu cầu sử dụng sản phẩm ph&ugrave; hợp, giải đ&aacute;p mọi thắc mắc của kh&aacute;ch h&agrave;ng về c&aacute;c d&ograve;ng sản phẩm, nhằm lựa chọn cho kh&aacute;ch h&agrave;ng sản phẩm ph&ugrave; hợp nhất.</p>\r\n\r\n<p>-<strong>&nbsp;Sau b&aacute;n h&agrave;ng:</strong>&nbsp;Ch&uacute;ng t&ocirc;i cam kết sản phẩm được: Hướng dẫn sử dụng, c&agrave;i đặt, bảo tr&igrave;, bảo dưỡng miễn ph&iacute; trong suốt qu&aacute; tr&igrave;nh sử dụng sản phẩm, mang lại trải nghiệm tốt nhất cho kh&aacute;ch h&agrave;ng.</p>\r\n\r\n<p>- Giải đ&aacute;p v&agrave; xử l&yacute; mọi y&ecirc;u cầu của kh&aacute;ch h&agrave;ng trong thời gian ngắn nhất.</p>\r\n\r\n<p>- Đội ngũ chuy&ecirc;n vi&ecirc;n chăm s&oacute;c kh&aacute;ch h&agrave;ng của&nbsp;<strong>AP24h.vn</strong>&nbsp;lu&ocirc;n sẵn s&agrave;ng nghe v&agrave; hỗ trợ bất cứ khi n&agrave;o kh&aacute;ch h&agrave;ng cần.</p>\r\n\r\n<p>Một lần nữa ch&uacute;ng t&ocirc;i xin ch&acirc;n th&agrave;nh cảm ơn qu&yacute; kh&aacute;c!</p>\r\n\r\n<p>Rất h&acirc;n hạnh được phục vụ qu&yacute; kh&aacute;ch!</p>\r\n', 'chinh-sach-dam-bao.jpg', '2022-06-18 15:36:03', '2022-06-18 15:36:03', 'san-pham-chat-luong', 19, '3'),
('Giới thiệu ', '<p>Chúng tôi luôn hướng đến cung cấp những sản phẩm chính hãng tốt nhất đến tay người tiêu dùng. Rất mong được sự ủng hộ của quý khách hàng !</p>\r\n\r\n<p>Mọi đóng góp ý kiến của quý khách vui lòng liên hệ với chúng tôi theo địa chỉ :</p>\r\n\r\n<p>New Shop</p>\r\n\r\n<p>GENTLEFOLKS</p>\r\n\r\n<p>Trụ sở: 100 Phố Viên-Bắc Từ Liêm-Hà Nội</p>\r\n\r\n<p>Hotline: 0942445790</p>\r\n\r\n<p>FaceBook Fanpage : </p>\r\n\r\n<p>Email: nguyenhau230699@gmail.com</p>\r\n\r\n<p>website : </p>\r\n', 'ảnh shop.PNG', '2022-06-19 09:07:29', '2022-06-19 09:07:29', 'gioi-thieu', 22, '4');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admin`
--
ALTER TABLE `admin`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `chitietdonhang`
--
ALTER TABLE `chitietdonhang`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `danhmuc`
--
ALTER TABLE `danhmuc`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `donhang`
--
ALTER TABLE `donhang`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `menu`
--
ALTER TABLE `menu`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `nhacungcap`
--
ALTER TABLE `nhacungcap`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `nhanvien`
--
ALTER TABLE `nhanvien`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `sanpham`
--
ALTER TABLE `sanpham`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `thanhvien`
--
ALTER TABLE `thanhvien`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tintuc`
--
ALTER TABLE `tintuc`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `admin`
--
ALTER TABLE `admin`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `chitietdonhang`
--
ALTER TABLE `chitietdonhang`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=27;

--
-- AUTO_INCREMENT for table `danhmuc`
--
ALTER TABLE `danhmuc`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT for table `donhang`
--
ALTER TABLE `donhang`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=22;

--
-- AUTO_INCREMENT for table `menu`
--
ALTER TABLE `menu`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `nhacungcap`
--
ALTER TABLE `nhacungcap`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `nhanvien`
--
ALTER TABLE `nhanvien`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `sanpham`
--
ALTER TABLE `sanpham`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=121;

--
-- AUTO_INCREMENT for table `thanhvien`
--
ALTER TABLE `thanhvien`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=24;

--
-- AUTO_INCREMENT for table `tintuc`
--
ALTER TABLE `tintuc`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=23;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
