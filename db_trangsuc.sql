-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Mar 14, 2025 at 10:39 AM
-- Server version: 10.4.32-MariaDB
-- PHP Version: 8.0.30

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `db_trangsuc`
--

-- --------------------------------------------------------

--
-- Table structure for table `tbkhachhang`
--

CREATE TABLE `tbkhachhang` (
  `KhachHang_id` int(10) NOT NULL,
  `TenKH` varchar(50) NOT NULL,
  `DiaChi` varchar(100) NOT NULL,
  `SoDT` varchar(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `tbkhachhang`
--

INSERT INTO `tbkhachhang` (`KhachHang_id`, `TenKH`, `DiaChi`, `SoDT`) VALUES
(1, 'Nguyễn Thanh Thủy', 'Hậu Giang, Phường 6,Quận 6, TP.HCM', '0909172635'),
(2, 'Phạm Anh', 'Nguyễn Huy Tưởng, Phường 5, Quận Bình Thạnh, TP.HCM', '0909987564'),
(3, 'Lê An', 'Nguyễn Đình Chiểu, Phường 2, Quận 3, Tp.HCM', '0901865436'),
(4, 'Trương Thị Oanh', 'Phan Đình Phùng, Phường 1, Quận Phú Nhuận, Tp.HCM', '0901884577'),
(8, 'Nguyễn Đỗ Mai Anh', 'Hậu Giang', '0909786543'),
(10, 'Nguyễn Tiến Danh', 'Nguyễn Đình Chiểu', '0908124765'),
(11, 'Nguyễn Hy Anh', 'Nguyễn Đình Chiểu', '0929454523'),
(12, 'Lê Huỳnh', 'An Dương Vương', '0908344765'),
(13, 'Trần Anh Minh', 'Minh Phụng', '0903456765'),
(14, 'Nguyễn Đỗ Mai Anh', 'Hậu Giang', '0909786543'),
(15, 'Lê Huỳnh', 'Nguyễn Đình Chiểu', '0929454523'),
(16, 'Huỳnh Thanh Hoa', 'Nguyễn Huy Tưởng', '0929454523'),
(17, 'Lê Huỳnh Anh', 'Nguyễn Đình Chiểu', '0908124765'),
(18, 'Nguyễn Tiến Danh', 'Nguyễn Đình Chiểu', '0908344765'),
(19, 'Lê Huỳnh Anh', 'nguyễn văn luông', '0908344765'),
(20, 'Trần Kim Anh', 'Phạm Văn Chí', '0929454523'),
(21, 'aa', 'aaa', '1234'),
(22, 'aaaaa', 'asssd', '123455'),
(23, 'aaaaa', 'asssd', '1234'),
(24, 'Lê Duẩn', 'pham Văn Chí', '12345678'),
(25, 'Lê Duẩn', 'pham Văn Chí', '12345678'),
(26, 'Lâm Thị Thanh Hương', 'Nguyễn Văn Luông', '090912348');

-- --------------------------------------------------------

--
-- Table structure for table `tbloaisanpham`
--

CREATE TABLE `tbloaisanpham` (
  `MaLoai` varchar(10) NOT NULL,
  `TenLoai` varchar(50) NOT NULL,
  `HinhAnh` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `tbloaisanpham`
--

INSERT INTO `tbloaisanpham` (`MaLoai`, `TenLoai`, `HinhAnh`) VALUES
('1456', 'nhẫn ngọc trai đen', 'n103.jpg'),
('BT', 'Bông tai', 'BT.jpg'),
('DC', 'Dây chuyền', 'DC.jpg'),
('E', 'Mặt dây chuyền', 'DC.png'),
('N', 'Nhẫn', 'N.jpg'),
('NT', 'Ngọc trai', 'NgocTrai.jpg'),
('TS', 'Trang sức bạc', 'eropi.jpg'),
('TSB', 'Trang sức bộ', 'BST.jpg'),
('TSC', 'Trang sức cưới', 'TSC.jpg'),
('TSV', 'Trang sức vàng', 'TS_Vang.jpg'),
('VT', 'Vòng tay', 'VT.jpg');

-- --------------------------------------------------------

--
-- Table structure for table `tbpban_ct`
--

CREATE TABLE `tbpban_ct` (
  `CTBH_id` int(10) NOT NULL,
  `SoLuong` tinyint(4) NOT NULL,
  `DonGia` double NOT NULL,
  `MaSP` int(10) NOT NULL,
  `MaPB` int(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `tbpban_ct`
--

INSERT INTO `tbpban_ct` (`CTBH_id`, `SoLuong`, `DonGia`, `MaSP`, `MaPB`) VALUES
(1, 1, 1050000, 2, 1),
(2, 1, 5000000, 4, 1),
(3, 1, 924000, 6, 2),
(4, 1, 639000, 7, 2),
(5, 1, 968250, 11, 3),
(6, 1, 500000, 5, 3),
(7, 1, 9200000, 9, 4),
(8, 3, 5060000, 2, 5),
(9, 1, 12225297, 3, 5),
(10, 1, 14000000, 12, 5),
(13, 1, 5000000, 4, 7),
(14, 2, 6200000, 14, 7),
(15, 2, 5060000, 2, 8),
(16, 1, 14000000, 12, 8),
(17, 1, 5060000, 2, 9),
(18, 1, 5000000, 4, 9),
(19, 1, 3500000, 1, 10),
(20, 1, 5000000, 4, 10),
(21, 3, 6200000, 14, 11),
(22, 1, 6937200, 19, 11),
(23, 2, 5000000, 4, 12),
(24, 1, 12267666, 28, 12),
(25, 2, 5325000, 42, 12),
(26, 1, 12225297, 3, 13),
(27, 1, 6722464, 31, 13),
(28, 2, 12225297, 3, 14),
(29, 5, 15000000, 29, 14),
(30, 1, 12225297, 3, 15),
(31, 1, 1796750, 8, 15),
(32, 2, 5060000, 2, 16),
(33, 1, 12225297, 3, 16),
(34, 1, 12225297, 3, 17),
(35, 1, 15000000, 29, 17),
(36, 2, 5060000, 2, 18),
(37, 1, 12225297, 3, 18),
(38, 1, 968250, 11, 19),
(39, 2, 9440000, 26, 19),
(40, 1, 12225297, 3, 20),
(41, 2, 5060000, 2, 21),
(42, 3, 12225297, 3, 21),
(43, 1, 5060000, 2, 22),
(44, 1, 12225297, 3, 22),
(45, 2, 5060000, 2, 23),
(46, 2, 1600000, 13, 23),
(47, 1, 6200000, 14, 23),
(48, 3, 31920000, 18, 23);

-- --------------------------------------------------------

--
-- Table structure for table `tbphieu_bh`
--

CREATE TABLE `tbphieu_bh` (
  `PBan_id` int(10) NOT NULL,
  `NgayBan` date NOT NULL,
  `MaKH` int(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `tbphieu_bh`
--

INSERT INTO `tbphieu_bh` (`PBan_id`, `NgayBan`, `MaKH`) VALUES
(1, '2020-07-12', 1),
(2, '2020-07-12', 2),
(3, '2020-07-12', 3),
(4, '2020-07-12', 4),
(5, '2021-05-16', 8),
(7, '2021-05-16', 10),
(8, '2021-05-16', 11),
(9, '2021-05-16', 12),
(10, '2021-05-16', 13),
(11, '2021-05-16', 14),
(12, '2021-05-17', 15),
(13, '2021-05-27', 16),
(14, '2021-05-29', 17),
(15, '2021-05-29', 18),
(16, '2021-05-29', 19),
(17, '2021-05-30', 20),
(18, '2021-11-18', 21),
(19, '2022-02-16', 22),
(20, '2022-03-30', 23),
(21, '2022-11-05', 24),
(22, '2022-11-05', 25),
(23, '2022-11-05', 26);

-- --------------------------------------------------------

--
-- Table structure for table `tbsanpham`
--

CREATE TABLE `tbsanpham` (
  `SanPham_id` int(10) NOT NULL,
  `TenSP` varchar(50) NOT NULL,
  `MaHang` varchar(20) NOT NULL,
  `MoTa` varchar(200) NOT NULL,
  `TrongLuong` varchar(50) NOT NULL,
  `DonGia` double NOT NULL,
  `HinhAnh` varchar(50) NOT NULL,
  `SLHienCo` tinyint(4) NOT NULL,
  `TinhTrang` tinyint(1) NOT NULL,
  `MaLoai` varchar(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `tbsanpham`
--

INSERT INTO `tbsanpham` (`SanPham_id`, `TenSP`, `MaHang`, `MoTa`, `TrongLuong`, `DonGia`, `HinhAnh`, `SLHienCo`, `TinhTrang`, `MaLoai`) VALUES
(1, 'Mề đay', '300302500', 'Mề đay đá quý', '0.9900 gam', 3500000, 'm04.jpg', 5, 0, 'E'),
(2, 'Nhẫn', '400050055', 'Vàng, đá quý', '0.6000 gam', 5060000, 'n107.jpg', 10, 1, 'N'),
(3, 'Vòng tay', '200050300', 'Vàng 750', '0.8800 gam', 12225297, 'VT01.jpg', 12, 0, 'BT'),
(4, 'Nhẫn ', '400050056', 'Nhẫn vàng 14K, đá Sapphire', '1,2 chỉ', 5000000, 'n106.jpg', 6, 1, 'N'),
(5, 'Bộ sưu tập Zodiac', '100090018', 'Cung hoàng đạo', 'không', 1500000, 'tsb04.jpg', 5, 0, 'BT'),
(6, 'Vòng tay', '200050301', 'Bạc, đá', 'không', 924000, 'lt04.jpg', 10, 1, 'VT'),
(7, 'Vòng tay', '200050302', 'Bạc, Đá Tổng Hợp', 'không', 639000, 'lt06.jpg', 5, 0, 'VT'),
(8, 'Mề đay', '300302501', 'Mề đay, Vàng trắng 18K', '0.4500 gam', 1796750, 'm01.jpg', 10, 1, 'BT'),
(9, 'Mề đay ', '300302502', 'Mề đay ngọc trai, Bạc', '0.5000 gam', 9200000, 'm02.jpg', 15, 0, 'E'),
(10, 'Mề đay', '300302503', 'Mề đay, Vàng 24K', '0.7000 gam', 1820000, 'm06.jpg', 20, 0, 'E'),
(11, 'Nhẫn', '400050057', 'Nhẫn nữ, Bạc', '0.5500 gam', 968250, 'n105.jpg', 15, 0, 'N'),
(12, 'Nhẫn ngọc trai_nữ', '400050058', 'Vàng trắng 18K, Kim cương', '5.96 Gam', 14000000, 'n103.jpg', 25, 0, 'N'),
(13, 'Nhẫn nữ', '400050059', 'Vàng 24K, Sapphire xám', '0.8000 chỉ', 1600000, 'n101.jpg', 10, 0, 'N'),
(14, 'Nhẫn nữ', '400050060', 'Vàng trắng 14K, Đá Topaz, Kim Cương', '1.0000 chỉ', 6200000, 'n102.jpg', 5, 1, 'N'),
(15, 'Trang sức bộ', '100090008', 'Lời Trái Tim Muốn Nói, Vàng 24K', '12.0640 chỉ', 19957776, 'tsb01.jpg', 5, 0, 'TSC'),
(16, 'Trang sức cưới bộ', '100080069', ' Khúc Uyên Ương, Vàng 24K', '23.8300 chỉ', 35000000, 'tsb02.jpg', 5, 0, 'TSC'),
(17, ' Bộ sưu tập Emoticon', '100090022', ' Biểu tượng cám xúc, Bạc', 'không', 900000, 'Emo.jpg', 10, 1, 'TSB'),
(18, 'Bộ Tình Yêu', '100080169', 'Vàng trắng 24K, Kim Cương', '7.9000 chỉ', 31920000, 'tsb05.jpg', 5, 0, 'TSB'),
(19, 'Lắc tay', '200050303', 'Cúc Mùa Thu, Vàng 24K', '1.2000 chỉ', 6937200, 'lt01.jpg', 10, 0, 'VT'),
(20, 'Lắc tay', '200050304', 'Nồng Nàn Mai Mùa Xuân, Vàng 24K', '1.0000 chỉ', 5799000, 'lt02.jpg', 5, 0, 'VT'),
(21, 'Lắc tay', '200050305', 'Thuần Khiết Trúc Mùa Đông, Vàng 24K', '1.0000 chỉ', 5853000, 'lt03.jpg', 5, 0, 'VT'),
(22, 'Mề đay', '300302504', 'Mề đay, Vàng 18K, Cz', '0.5000 chỉ', 842000, 'm05.jpg', 10, 0, 'E'),
(23, 'Bông tai', '501050125', 'Bông tai, Vàng 18K', '0.7000 chỉ', 1259000, 'bt01.jpg', 15, 0, 'BT'),
(24, 'Nhẫn cặp', '600010006', 'Nhẫn cặp, Vàng 18K', '2.5000 chỉ', 4315000, 'tsb06.jpg', 10, 1, 'TSB'),
(25, 'Bông tai', '501050126', 'Bông tai, Vàng trắng 14K, Kim cương', '3.0000 chỉ', 11680000, 'bt02.jpg', 10, 0, 'BT'),
(26, 'Nhẫn nữ', '400050061', 'Nhẫn nữ, Vàng trắng 14K, Kim cương', '2.000 chỉ', 9440000, 'n108.jpg', 10, 0, 'N'),
(27, 'Mề đay', '300302505', 'Mề đay ngọc trai, Vàng trắng 14K, Kim cương', '2.000 chỉ', 8000000, 'WH676.jpg', 20, 0, 'E'),
(28, 'Nhẫn', '400050062', 'Nhẫn GLAMIRA Gratia', '2.96 Gam', 12267666, 'nhan_glami.jpg', 4, 1, 'N'),
(29, 'Nhẫn', '400050063', 'Vàng trắng 18K, Kim cương', '5.96 Gam', 15000000, 'red.jpg', 5, 0, 'N'),
(30, 'Dây chuyền', '200070005', 'Vàng trắng 14K, Đá', '2.96 Gam', 50000, 'DC.png', 4, 1, 'DC'),
(31, 'Nhẫn ', '400050064', 'Vàng Hồng 585', '1.37 gam', 6722464, 'red_white.jpg', 5, 1, 'N'),
(37, 'Vòng tay', '200050306', 'Kim cương(124), Đá Swarovski (64)', '32.37 Gam', 114624097, 'vt_kc.jpg', 2, 1, 'VT'),
(38, 'Mặt dây chuyền', '300302506', 'Mặt dây chuyền vàng 18k ngọc trai thật Glee 8-9mm', '8-9mm', 1199000, 'DC_NT_01.jpg', 10, 1, 'NT'),
(39, 'Lắc tay vàng', '200050307', 'Lắc tay vàng 18k ngọc trai thật 7.5-8mm Deki', '7.5-8mm', 6590000, 'TSV_01.jpg', 5, 1, 'TSV'),
(41, 'Bông tai vàng', '501050124', 'Bông tai vàng 18k ngọc trai Violet', 'không', 1815000, 'BT_Vang_01.jpg', 10, 1, 'BT'),
(42, 'Bộ trang sức vàng', '100090026', 'Bộ trang sức vàng 18k ngọc trai 10mm Deco', '5.96 Gam', 5325000, 'TSB_NT_01.jpg', 10, 1, 'TSB');

-- --------------------------------------------------------

--
-- Table structure for table `tbthanhvien`
--

CREATE TABLE `tbthanhvien` (
  `ThanhVien_id` int(10) NOT NULL,
  `TenDangNhap` varchar(50) NOT NULL,
  `MatKhau` varchar(50) NOT NULL,
  `LLMatKhau` varchar(50) NOT NULL,
  `PhanQuye` varchar(50) NOT NULL,
  `MaKH` int(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `tbuser`
--

CREATE TABLE `tbuser` (
  `user_id` int(11) NOT NULL,
  `username` varchar(50) NOT NULL,
  `password` varchar(200) NOT NULL,
  `HoTen` varchar(100) NOT NULL,
  `NgaySinh` date NOT NULL,
  `GioiTinh` tinyint(1) NOT NULL,
  `DiaChi` varchar(200) NOT NULL,
  `Email` varchar(50) NOT NULL,
  `CMND` varchar(20) NOT NULL,
  `DienThoai` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `tbuser`
--

INSERT INTO `tbuser` (`user_id`, `username`, `password`, `HoTen`, `NgaySinh`, `GioiTinh`, `DiaChi`, `Email`, `CMND`, `DienThoai`) VALUES
(1, 'honghoa', 'aaaa', 'Nguyễn Hồng Hoa', '1994-02-24', 0, 'Trần Hưng Đạo', 'hoanguyen@gmail.com', '1234567892', '0909786534'),
(4, 'minhdg', 'ccccc', 'Dương Văn Minh', '1996-09-08', 1, 'Nguyễn Văn Cừ', 'duongminh@gmail.com', '1829374658', '0909865342'),
(8, 'haochi', '12345', 'Lai Chí Hào', '2001-07-30', 1, 'Lý Chiêu Hoàng', 'chihao@gmail.com', '018375025', '0702347615'),
(9, 'ngocle', '12345', 'Lê Ngọc Mai', '2000-05-06', 0, 'Huỳnh Mẫn Đạt', 'maile@gmail.com', '01938634980', '0797585313'),
(18, 'annguyen', '12345', 'Nguyễn Thanh An', '1998-05-20', 1, 'Hậu Giang', 'annguyen@gmail.com', '0189576043', '0909876547'),
(20, 'vytran', '12345', 'Trần Thúy Vy', '2000-04-12', 0, 'Minh Phụng', 'thuyvy@gmail.com', '0193856875', '0708237654'),
(30, 'hangdo', 'hang123', 'Đỗ Đặng Nguyệt Hằng', '1978-12-13', 0, 'Hậu Giang', 'dodangnguyethang@hotec.edu.vn', '01789500178', '0909818267'),
(31, 'lehoang', 'hoang123', 'Lê Thanh Hoàng', '1992-11-30', 0, 'Minh Phụng', 'hoangle@gmail.com', '0189578048', '0904576785'),
(37, 'annguyen', '12345', 'Nguyễn Thanh An', '2005-12-07', 1, 'Hậu Giang', 'dfd@gmail.com', '2345567889', '0909876785');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `tbkhachhang`
--
ALTER TABLE `tbkhachhang`
  ADD PRIMARY KEY (`KhachHang_id`);

--
-- Indexes for table `tbloaisanpham`
--
ALTER TABLE `tbloaisanpham`
  ADD PRIMARY KEY (`MaLoai`);

--
-- Indexes for table `tbpban_ct`
--
ALTER TABLE `tbpban_ct`
  ADD PRIMARY KEY (`CTBH_id`),
  ADD KEY `MaPB` (`MaPB`),
  ADD KEY `MaSP` (`MaSP`);

--
-- Indexes for table `tbphieu_bh`
--
ALTER TABLE `tbphieu_bh`
  ADD PRIMARY KEY (`PBan_id`),
  ADD KEY `MaKH` (`MaKH`);

--
-- Indexes for table `tbsanpham`
--
ALTER TABLE `tbsanpham`
  ADD PRIMARY KEY (`SanPham_id`),
  ADD KEY `MaLoai` (`MaLoai`);

--
-- Indexes for table `tbthanhvien`
--
ALTER TABLE `tbthanhvien`
  ADD PRIMARY KEY (`ThanhVien_id`),
  ADD KEY `MaKH` (`MaKH`);

--
-- Indexes for table `tbuser`
--
ALTER TABLE `tbuser`
  ADD PRIMARY KEY (`user_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `tbkhachhang`
--
ALTER TABLE `tbkhachhang`
  MODIFY `KhachHang_id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=27;

--
-- AUTO_INCREMENT for table `tbpban_ct`
--
ALTER TABLE `tbpban_ct`
  MODIFY `CTBH_id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=49;

--
-- AUTO_INCREMENT for table `tbphieu_bh`
--
ALTER TABLE `tbphieu_bh`
  MODIFY `PBan_id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=24;

--
-- AUTO_INCREMENT for table `tbsanpham`
--
ALTER TABLE `tbsanpham`
  MODIFY `SanPham_id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=50;

--
-- AUTO_INCREMENT for table `tbthanhvien`
--
ALTER TABLE `tbthanhvien`
  MODIFY `ThanhVien_id` int(10) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `tbuser`
--
ALTER TABLE `tbuser`
  MODIFY `user_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=41;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `tbpban_ct`
--
ALTER TABLE `tbpban_ct`
  ADD CONSTRAINT `tbpban_ct_ibfk_1` FOREIGN KEY (`MaPB`) REFERENCES `tbphieu_bh` (`PBan_id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `tbpban_ct_ibfk_2` FOREIGN KEY (`MaSP`) REFERENCES `tbsanpham` (`SanPham_id`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Constraints for table `tbphieu_bh`
--
ALTER TABLE `tbphieu_bh`
  ADD CONSTRAINT `tbphieu_bh_ibfk_1` FOREIGN KEY (`MaKH`) REFERENCES `tbkhachhang` (`KhachHang_id`);

--
-- Constraints for table `tbsanpham`
--
ALTER TABLE `tbsanpham`
  ADD CONSTRAINT `tbsanpham_ibfk_3` FOREIGN KEY (`MaLoai`) REFERENCES `tbloaisanpham` (`MaLoai`);

--
-- Constraints for table `tbthanhvien`
--
ALTER TABLE `tbthanhvien`
  ADD CONSTRAINT `tbthanhvien_ibfk_1` FOREIGN KEY (`MaKH`) REFERENCES `tbkhachhang` (`KhachHang_id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
