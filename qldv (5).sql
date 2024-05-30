-- phpMyAdmin SQL Dump
-- version 5.0.2
-- https://www.phpmyadmin.net/
--
-- Máy chủ: 127.0.0.1
-- Thời gian đã tạo: Th10 27, 2020 lúc 04:56 AM
-- Phiên bản máy phục vụ: 10.4.11-MariaDB
-- Phiên bản PHP: 7.4.4

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Cơ sở dữ liệu: `qldv`
--

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `diemrenluyen`
--

CREATE TABLE `diemrenluyen` (
  `iddiemrenluyen` int(11) NOT NULL,
  `masv` varchar(10) NOT NULL,
  `diem` int(11) NOT NULL,
  `namhoc` int(11) NOT NULL,
  `hocky` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Đang đổ dữ liệu cho bảng `diemrenluyen`
--

INSERT INTO `diemrenluyen` (`iddiemrenluyen`, `masv`, `diem`, `namhoc`, `hocky`) VALUES
(41, 'B21DCCN512', 90, 2023, 1),
(42, 'B21DCCN572', 85, 2023, 1);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `doanphi`
--

CREATE TABLE `doanphi` (
  `iddoanphi` int(11) NOT NULL,
  `masv` varchar(10) NOT NULL,
  `sotien` double NOT NULL,
  `ngaythu` date NOT NULL,
  `trangthai` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Đang đổ dữ liệu cho bảng `doanphi`
--

INSERT INTO `doanphi` (`iddoanphi`, `masv`, `sotien`, `ngaythu`, `trangthai`) VALUES
(25, 'B21DCCN512', 120000, '2023-11-23', 'Đã hoàn thành');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `lop`
--

CREATE TABLE `lop` (
  `malop` varchar(12) NOT NULL,
  `tenlop` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Đang đổ dữ liệu cho bảng `lop`
--

INSERT INTO `lop` (`malop`, `tenlop`) VALUES
('D21CQCN08-B', 'Lớp 8 CNTT khóa 2021'),
('D22CQCN01-B', 'Lớp 1 CNTT khóa 2022'),
('D21CQCN07-B', 'Lớp 8 CNTT khóa 2021'),
('D22CQCN02-B', 'Lớp 2 CNTT khóa 2022');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `quydoan`
--

CREATE TABLE `quydoan` (
  `idquydoan` int(11) NOT NULL,
  `tenkhoantien` varchar(255) NOT NULL,
  `loai` varchar(255) NOT NULL,
  `sotien` double NOT NULL,
  `ngay` date NOT NULL,
  `malop` varchar(12) NOT NULL,
  `nguoithu` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `sodoan`
--

CREATE TABLE `sodoan` (
  `masv` varchar(10) NOT NULL,
  `trangthai` varchar(255) NOT NULL,
  `ghichu` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Đang đổ dữ liệu cho bảng `sodoan`
--

INSERT INTO `sodoan` (`masv`, `trangthai`, `ghichu`) VALUES
('B21DCCN572', 'Chưa rút', '');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `taikhoan`
--

CREATE TABLE `taikhoan` (
  `tentaikhoan` varchar(255) NOT NULL,
  `matkhau` varchar(255) NOT NULL,
  `ten` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Đang đổ dữ liệu cho bảng `taikhoan`
--

INSERT INTO `taikhoan` (`tentaikhoan`, `matkhau`, `ten`) VALUES
('admin', '123456', 'Mạnh');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `thongtindoanvien`
--

CREATE TABLE `thongtindoanvien` (
  `masv` varchar(10) NOT NULL,
  `hoten` varchar(255) NOT NULL,
  `ngaysinh` date NOT NULL,
  `gioitinh` varchar(255) NOT NULL,
  `diachi` varchar(255) NOT NULL,
  `malop` varchar(12) NOT NULL,
  `anh` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Đang đổ dữ liệu cho bảng `thongtindoanvien`
--

INSERT INTO `thongtindoanvien` (`masv`, `hoten`, `ngaysinh`, `gioitinh`, `diachi`, `malop`, `anh`) VALUES
('B21DCCN007', 'Trương Ngọc Anh', '2003-05-04', 'Nam', 'Vĩnh Phúc', 'D21CQCN08-B', 'null'),
('B21DCCN512', 'Nguyễn Thiện Công', '2003-10-29', 'Nam', 'Hà Nội', 'D21CQCN08-B', './img/61749480_442411409870515_7491344458047291392_o.jpg'),
('B21DCCN572', 'Tạ Thanh Bình', '2003-08-07', 'Nam', 'Hải Phòng', 'D21CQCN08-B', 'null'),
('B21DCCN085', 'Võ Thị Yến Chi', '2003-07-04', 'Nữ', 'Hà Nội', 'D21CQCN08-B', 'null'),
('B21DCCN075', 'Nguyễn Thiện Công', '2003-04-07', 'Nam', 'Thanh Hóa', 'D21CQCN07-B', 'null'),
('B22DCCN007', 'Nguyễn Thị Bạch Cúc', '2004-09-12', 'Nữ', 'Nam Định', 'D22CQCN01-B', 'null'),
('B22DCCN127', 'Trần Trí Cường', '2004-07-09', 'Nam', 'Hà Nội', 'D22CQCN01-B', 'null'),
('B22DCCN512', 'Huỳnh Thị Bé Diệu', '2004-08-01', 'Nữ', 'Thái Bình', 'D22CQCN01-B', 'null'),
('B22DCCN507', 'Nguyễn Bá Duy', '2004-08-06', 'Nam', 'Vĩnh Phúc', 'D22CQCN01-B', 'null'),
('B22DCCN436', 'Lê Hoàng Linh', '2004-07-08', 'Nam', 'Hà Nội', 'D22CQCN02-B', 'null');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `yeucautaikhoan`
--

CREATE TABLE `yeucautaikhoan` (
  `idyeucau` int(11) NOT NULL,
  `masv` varchar(10) NOT NULL,
  `ngayyeucau` date NOT NULL,
  `trangthai` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Chỉ mục cho các bảng đã đổ
--

--
-- Chỉ mục cho bảng `diemrenluyen`
--
ALTER TABLE `diemrenluyen`
  ADD PRIMARY KEY (`iddiemrenluyen`),
  ADD KEY `masv` (`masv`);

--
-- Chỉ mục cho bảng `doanphi`
--
ALTER TABLE `doanphi`
  ADD PRIMARY KEY (`iddoanphi`),
  ADD KEY `masv` (`masv`);

--
-- Chỉ mục cho bảng `lop`
--
ALTER TABLE `lop`
  ADD PRIMARY KEY (`malop`);

--
-- Chỉ mục cho bảng `quydoan`
--
ALTER TABLE `quydoan`
  ADD PRIMARY KEY (`idquydoan`),
  ADD KEY `malop` (`malop`);

--
-- Chỉ mục cho bảng `sodoan`
--
ALTER TABLE `sodoan`
  ADD PRIMARY KEY (`masv`);

--
-- Chỉ mục cho bảng `taikhoan`
--
ALTER TABLE `taikhoan`
  ADD PRIMARY KEY (`tentaikhoan`);

--
-- Chỉ mục cho bảng `thongtindoanvien`
--
ALTER TABLE `thongtindoanvien`
  ADD PRIMARY KEY (`masv`),
  ADD KEY `malop` (`malop`);

--
-- Chỉ mục cho bảng `yeucautaikhoan`
--
ALTER TABLE `yeucautaikhoan`
  ADD PRIMARY KEY (`idyeucau`),
  ADD KEY `masv` (`masv`);

--
-- AUTO_INCREMENT cho các bảng đã đổ
--

--
-- AUTO_INCREMENT cho bảng `diemrenluyen`
--
ALTER TABLE `diemrenluyen`
  MODIFY `iddiemrenluyen` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=43;

--
-- AUTO_INCREMENT cho bảng `doanphi`
--
ALTER TABLE `doanphi`
  MODIFY `iddoanphi` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=26;


--
-- AUTO_INCREMENT cho bảng `quydoan`
--
ALTER TABLE `quydoan`
  MODIFY `idquydoan` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT cho bảng `yeucautaikhoan`
--
ALTER TABLE `yeucautaikhoan`
  MODIFY `idyeucau` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=24;

--
-- Các ràng buộc cho các bảng đã đổ
--

--
-- Các ràng buộc cho bảng `diemrenluyen`
--
ALTER TABLE `diemrenluyen`
  ADD CONSTRAINT `diemrenluyen_ibfk_1` FOREIGN KEY (`masv`) REFERENCES `thongtindoanvien` (`masv`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Các ràng buộc cho bảng `doanphi`
--
ALTER TABLE `doanphi`
  ADD CONSTRAINT `doanphi_ibfk_1` FOREIGN KEY (`masv`) REFERENCES `thongtindoanvien` (`masv`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Các ràng buộc cho bảng `quydoan`
--
ALTER TABLE `quydoan`
  ADD CONSTRAINT `quydoan_ibfk_1` FOREIGN KEY (`malop`) REFERENCES `lop` (`malop`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Các ràng buộc cho bảng `sodoan`
--
ALTER TABLE `sodoan`
  ADD CONSTRAINT `sodoan_ibfk_1` FOREIGN KEY (`masv`) REFERENCES `thongtindoanvien` (`masv`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Các ràng buộc cho bảng `thongtindoanvien`
--
ALTER TABLE `thongtindoanvien`
  ADD CONSTRAINT `thongtindoanvien_ibfk_1` FOREIGN KEY (`malop`) REFERENCES `lop` (`malop`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Các ràng buộc cho bảng `yeucautaikhoan`
--
ALTER TABLE `yeucautaikhoan`
  ADD CONSTRAINT `yeucautaikhoan_ibfk_1` FOREIGN KEY (`masv`) REFERENCES `thongtindoanvien` (`masv`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
