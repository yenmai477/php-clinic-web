-- phpMyAdmin SQL Dump
-- version 4.7.9
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jun 21, 2020 at 05:28 PM
-- Server version: 10.1.31-MariaDB
-- PHP Version: 7.2.3

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `quanlyphongkham`
--

-- --------------------------------------------------------

--
-- Table structure for table `baocaodoanhthu`
--

CREATE TABLE `baocaodoanhthu` (
  `MaBCDT` int(11) NOT NULL,
  `ThangNam` varchar(7) COLLATE utf8_unicode_ci NOT NULL,
  `TongDoanhThu` int(11) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `baocaodoanhthu`
--

INSERT INTO `baocaodoanhthu` (`MaBCDT`, `ThangNam`, `TongDoanhThu`, `created_at`, `updated_at`) VALUES
(2, '06/2020', 1141000, '2020-05-13 02:17:28', '2020-06-18 00:04:42'),
(3, '05/2020', 944000, '2020-05-13 02:58:53', '2020-05-23 16:11:55');

-- --------------------------------------------------------

--
-- Table structure for table `baocaosudungthuoc`
--

CREATE TABLE `baocaosudungthuoc` (
  `MaBCSDT` int(11) NOT NULL,
  `ThangNam` varchar(7) COLLATE utf8_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `baocaosudungthuoc`
--

INSERT INTO `baocaosudungthuoc` (`MaBCSDT`, `ThangNam`, `created_at`, `updated_at`) VALUES
(2, '05/2020', '2020-05-15 05:14:31', '2020-05-15 05:14:31'),
(3, '04/2020', '2020-05-15 13:21:30', '2020-05-15 13:21:30'),
(5, '03/2020', '2020-05-15 14:40:45', '2020-05-15 14:40:45'),
(6, '02/2020', '2020-05-15 14:40:48', '2020-05-15 14:40:48'),
(7, '06/2020', '2020-06-07 04:45:22', '2020-06-07 04:45:22');

-- --------------------------------------------------------

--
-- Table structure for table `benhnhan`
--

CREATE TABLE `benhnhan` (
  `MaBN` int(11) NOT NULL,
  `HoTen` varchar(40) COLLATE utf8_unicode_ci NOT NULL,
  `NamSinh` int(4) NOT NULL,
  `GioiTinh` tinyint(1) NOT NULL,
  `DiaChi` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `benhnhan`
--

INSERT INTO `benhnhan` (`MaBN`, `HoTen`, `NamSinh`, `GioiTinh`, `DiaChi`, `created_at`, `updated_at`) VALUES
(1, 'Nguyễn Văn Thanh', 1994, 2, 'Cao Lãnh, Đồng Tháp', '2020-05-08 10:43:59', '2020-06-13 13:59:29'),
(2, 'Nguyễn Thị Bem', 2009, 1, 'Long Thành, Đồng Nai', '2020-05-09 15:53:18', '2020-05-09 15:53:18'),
(3, 'Nguyễn Thị Hảo', 1999, 1, 'Q1, TP Hồ Chí Minh', '2020-05-10 14:08:51', '2020-06-13 13:59:14'),
(4, 'Đào Thị Anh Đào', 1987, 1, 'Q2, TPHCM', '2020-06-13 14:08:40', '2020-06-13 14:08:40'),
(5, 'Lê Văn Chín', 1998, 2, 'Q1, TP Hồ Chí Minh', '2020-06-13 14:09:30', '2020-06-13 14:09:30'),
(6, 'Phạm Anh Nghĩa', 1983, 2, 'Q1, TP Hồ Chí Minh', '2020-06-13 14:10:10', '2020-06-13 14:10:10'),
(7, 'Cao Lê Anh Tuyết', 2010, 1, 'Q5, TPHCM', '2020-06-13 14:10:50', '2020-06-13 14:10:50'),
(8, 'Nguyễn Thị Ngọc Giàu', 1994, 1, 'Long Thành, Đồng Nai', '2020-06-13 14:11:53', '2020-06-13 14:11:53'),
(9, 'Trần Thị Yến Nhi', 2000, 1, 'Q7, TPHCM', '2020-06-13 14:12:28', '2020-06-13 14:12:28'),
(10, 'Vũ Phạm Đình Thái', 1982, 2, 'Quận Bình Thạnh, TPHCM', '2020-06-13 14:13:43', '2020-06-13 14:13:43'),
(11, 'Đậu Văn Lành', 1995, 2, 'Q. Thủ Đức, TPHCM', '2020-06-17 20:40:12', '2020-06-17 20:40:12'),
(12, 'Cao Thị Trâm Anh', 1991, 1, 'Thu Duc District', '2020-06-17 21:09:30', '2020-06-17 21:09:30'),
(13, 'Nông Văn Đinh', 1988, 2, 'Q2, TPHCM', '2020-06-17 23:59:21', '2020-06-17 23:59:21');

-- --------------------------------------------------------

--
-- Table structure for table `cachdung`
--

CREATE TABLE `cachdung` (
  `MaCachDung` int(11) NOT NULL,
  `CachDung` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `cachdung`
--

INSERT INTO `cachdung` (`MaCachDung`, `CachDung`, `created_at`, `updated_at`) VALUES
(1, 'Uống', '2020-05-06 17:00:00', NULL),
(2, 'Nhai', '2020-05-06 17:00:00', NULL),
(3, 'Ngậm', '2020-05-06 17:00:00', '2020-05-07 16:54:44'),
(4, 'Chích', '2020-05-06 17:00:00', NULL),
(5, 'Xịt', '2020-06-13 14:33:08', '2020-06-13 14:33:08'),
(6, 'Rửa', '2020-06-13 14:36:04', '2020-06-13 14:36:04'),
(7, 'Băng bó', '2020-06-13 14:36:11', '2020-06-13 14:36:11'),
(8, 'Bôi', '2020-06-13 14:37:29', '2020-06-13 14:37:29');

-- --------------------------------------------------------

--
-- Table structure for table `chitietbcdt`
--

CREATE TABLE `chitietbcdt` (
  `MaBCDT` int(11) NOT NULL,
  `Ngay` int(2) NOT NULL,
  `SoBenhNhan` tinyint(4) NOT NULL,
  `DoanhThu` int(11) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `chitietbcdt`
--

INSERT INTO `chitietbcdt` (`MaBCDT`, `Ngay`, `SoBenhNhan`, `DoanhThu`, `created_at`, `updated_at`) VALUES
(2, 7, 1, 89000, '2020-06-07 06:29:53', '2020-06-14 11:04:27'),
(2, 13, 3, 673000, '2020-06-13 16:58:41', '2020-06-13 16:58:41'),
(2, 14, 2, 100000, '2020-06-14 10:32:19', '2020-06-14 11:09:18'),
(2, 15, 1, 32000, '2020-06-15 15:14:44', '2020-06-15 15:14:44'),
(2, 18, 3, 247000, '2020-06-18 00:04:42', '2020-06-18 00:04:42'),
(3, 13, 8, 465000, '2020-05-13 03:25:14', '2020-05-15 13:52:03'),
(3, 15, 1, 55000, '2020-05-15 14:19:20', '2020-05-15 14:19:20'),
(3, 17, 1, 40000, '2020-05-17 12:59:38', '2020-05-17 12:59:38'),
(3, 23, 1, 140000, '2020-05-23 16:11:55', '2020-05-23 16:11:55');

-- --------------------------------------------------------

--
-- Table structure for table `chitietbcsdt`
--

CREATE TABLE `chitietbcsdt` (
  `MaBCSDT` int(11) NOT NULL,
  `MaThuoc` int(11) NOT NULL,
  `SoLuongDung` int(11) NOT NULL,
  `SoLanDung` int(11) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `chitietbcsdt`
--

INSERT INTO `chitietbcsdt` (`MaBCSDT`, `MaThuoc`, `SoLuongDung`, `SoLanDung`, `created_at`, `updated_at`) VALUES
(2, 1, 11, 4, '2020-05-15 05:14:31', '2020-06-13 17:19:26'),
(2, 2, 10, 1, '2020-05-15 05:14:31', '2020-06-13 17:19:26'),
(2, 3, 10, 1, '2020-05-15 05:14:31', '2020-06-13 17:19:26'),
(2, 4, 0, 0, '2020-05-15 05:57:19', '2020-06-13 17:19:26'),
(2, 5, 25, 3, '2020-06-13 17:19:26', '2020-06-13 17:19:26'),
(2, 6, 1, 1, '2020-06-13 17:19:26', '2020-06-13 17:19:26'),
(2, 7, 2, 1, '2020-06-13 17:19:26', '2020-06-13 17:19:26'),
(2, 8, 0, 0, '2020-06-13 17:19:26', '2020-06-13 17:19:26'),
(2, 9, 1, 1, '2020-06-13 17:19:26', '2020-06-13 17:19:26'),
(2, 10, 0, 0, '2020-06-13 17:19:26', '2020-06-13 17:19:26'),
(2, 11, 1, 1, '2020-06-13 17:19:26', '2020-06-13 17:19:26'),
(2, 12, 1, 1, '2020-06-13 17:19:26', '2020-06-13 17:19:26'),
(2, 13, 10, 1, '2020-06-13 17:19:26', '2020-06-13 17:19:26'),
(2, 14, 5, 1, '2020-06-13 17:19:26', '2020-06-13 17:19:26'),
(2, 15, 4, 2, '2020-06-13 17:19:26', '2020-06-13 17:19:26'),
(3, 1, 0, 0, '2020-05-15 13:21:30', '2020-05-15 13:21:30'),
(3, 2, 0, 0, '2020-05-15 13:21:30', '2020-05-15 13:21:30'),
(3, 3, 0, 0, '2020-05-15 13:21:30', '2020-05-15 13:21:30'),
(3, 4, 0, 0, '2020-05-15 13:21:30', '2020-05-15 13:21:30'),
(3, 5, 0, 0, '2020-06-13 17:19:36', '2020-06-13 17:19:36'),
(3, 6, 0, 0, '2020-06-13 17:19:36', '2020-06-13 17:19:36'),
(3, 7, 0, 0, '2020-06-13 17:19:36', '2020-06-13 17:19:36'),
(3, 8, 0, 0, '2020-06-13 17:19:36', '2020-06-13 17:19:36'),
(3, 9, 0, 0, '2020-06-13 17:19:36', '2020-06-13 17:19:36'),
(3, 10, 0, 0, '2020-06-13 17:19:36', '2020-06-13 17:19:36'),
(3, 11, 0, 0, '2020-06-13 17:19:36', '2020-06-13 17:19:36'),
(3, 12, 0, 0, '2020-06-13 17:19:36', '2020-06-13 17:19:36'),
(3, 13, 0, 0, '2020-06-13 17:19:36', '2020-06-13 17:19:36'),
(3, 14, 0, 0, '2020-06-13 17:19:36', '2020-06-13 17:19:36'),
(3, 15, 0, 0, '2020-06-13 17:19:36', '2020-06-13 17:19:36'),
(5, 1, 0, 0, '2020-05-15 14:40:45', '2020-05-15 14:40:45'),
(5, 2, 0, 0, '2020-05-15 14:40:45', '2020-05-15 14:40:45'),
(5, 3, 0, 0, '2020-05-15 14:40:45', '2020-05-15 14:40:45'),
(5, 4, 0, 0, '2020-05-15 14:40:45', '2020-05-15 14:40:45'),
(6, 1, 0, 0, '2020-05-15 14:40:48', '2020-05-15 14:40:48'),
(6, 2, 0, 0, '2020-05-15 14:40:48', '2020-05-15 14:40:48'),
(6, 3, 0, 0, '2020-05-15 14:40:48', '2020-05-15 14:40:48'),
(6, 4, 0, 0, '2020-05-15 14:40:48', '2020-05-15 14:40:48'),
(7, 1, 16, 9, '2020-06-07 04:45:22', '2020-06-18 00:05:04'),
(7, 2, 0, 0, '2020-06-07 04:45:22', '2020-06-07 04:45:22'),
(7, 3, 5, 1, '2020-06-07 04:45:22', '2020-06-13 17:19:07'),
(7, 4, 3, 3, '2020-06-07 04:45:22', '2020-06-18 00:05:04'),
(7, 5, 0, 0, '2020-06-13 17:19:07', '2020-06-13 17:19:07'),
(7, 6, 0, 0, '2020-06-13 17:19:07', '2020-06-13 17:19:07'),
(7, 7, 4, 4, '2020-06-13 17:19:07', '2020-06-18 00:05:04'),
(7, 8, 2, 1, '2020-06-13 17:19:07', '2020-06-13 17:19:07'),
(7, 9, 2, 1, '2020-06-13 17:19:07', '2020-06-13 17:19:07'),
(7, 10, 15, 1, '2020-06-13 17:19:07', '2020-06-13 17:19:07'),
(7, 11, 0, 0, '2020-06-13 17:19:07', '2020-06-13 17:19:07'),
(7, 12, 0, 0, '2020-06-13 17:19:07', '2020-06-13 17:19:07'),
(7, 13, 10, 1, '2020-06-13 17:19:07', '2020-06-13 17:19:07'),
(7, 14, 10, 1, '2020-06-13 17:19:07', '2020-06-14 10:32:43'),
(7, 15, 0, 0, '2020-06-13 17:19:07', '2020-06-13 17:19:07'),
(7, 16, 0, 0, '2020-06-18 00:05:04', '2020-06-18 00:05:04');

-- --------------------------------------------------------

--
-- Table structure for table `chitietphieukham`
--

CREATE TABLE `chitietphieukham` (
  `MaPKB` int(11) NOT NULL,
  `MaThuoc` int(11) NOT NULL,
  `DonGia` int(11) NOT NULL,
  `SoLuong` tinyint(4) NOT NULL,
  `ThanhTien` int(11) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `chitietphieukham`
--

INSERT INTO `chitietphieukham` (`MaPKB`, `MaThuoc`, `DonGia`, `SoLuong`, `ThanhTien`, `created_at`, `updated_at`) VALUES
(4, 1, 2000, 5, 10000, '2020-05-10 14:20:18', '2020-05-10 14:25:18'),
(4, 2, 3000, 10, 30000, '2020-05-10 14:20:18', '2020-05-13 08:02:34'),
(4, 3, 10000, 10, 100000, '2020-05-13 08:02:34', '2020-05-13 08:06:00'),
(4, 6, 30000, 1, 30000, '2020-06-13 15:42:02', '2020-06-13 15:42:02'),
(4, 11, 150000, 1, 150000, '2020-06-13 15:42:02', '2020-06-13 15:42:02'),
(7, 1, 2000, 2, 4000, '2020-05-12 22:55:58', '2020-06-13 15:43:38'),
(7, 5, 3000, 10, 30000, '2020-06-13 15:43:38', '2020-06-13 15:43:38'),
(7, 13, 5000, 10, 50000, '2020-06-13 15:43:38', '2020-06-13 15:43:38'),
(14, 1, 2000, 2, 4000, '2020-05-13 07:30:15', '2020-06-13 15:40:51'),
(14, 14, 3000, 5, 15000, '2020-06-13 15:40:51', '2020-06-13 15:40:51'),
(14, 15, 15000, 3, 45000, '2020-06-13 15:40:51', '2020-06-13 15:40:51'),
(15, 5, 3000, 10, 30000, '2020-06-13 15:38:23', '2020-06-13 15:38:23'),
(15, 9, 120000, 1, 120000, '2020-06-13 15:38:23', '2020-06-13 15:38:23'),
(15, 12, 9000, 1, 9000, '2020-06-13 15:38:23', '2020-06-13 15:38:23'),
(15, 15, 15000, 1, 15000, '2020-06-13 15:38:23', '2020-06-13 15:38:23'),
(17, 1, 2000, 2, 4000, '2020-05-23 16:11:55', '2020-06-13 14:45:10'),
(17, 5, 3000, 5, 15000, '2020-06-13 14:45:10', '2020-06-13 14:45:10'),
(17, 7, 70000, 2, 140000, '2020-06-13 14:45:10', '2020-06-13 14:45:10'),
(18, 1, 2000, 1, 2000, '2020-06-07 06:29:45', '2020-06-13 14:43:42'),
(18, 3, 10000, 5, 50000, '2020-06-07 06:29:45', '2020-06-07 06:29:45'),
(18, 4, 7000, 1, 7000, '2020-06-13 14:43:42', '2020-06-13 14:43:42'),
(19, 4, 7000, 1, 7000, '2020-06-13 15:45:35', '2020-06-13 15:45:35'),
(19, 7, 70000, 1, 70000, '2020-06-13 15:45:35', '2020-06-13 15:45:35'),
(19, 9, 120000, 2, 240000, '2020-06-13 15:45:35', '2020-06-13 15:45:35'),
(19, 13, 5000, 10, 50000, '2020-06-13 15:45:35', '2020-06-13 15:45:35'),
(20, 1, 2000, 2, 4000, '2020-06-13 15:46:50', '2020-06-13 15:46:50'),
(20, 8, 40000, 2, 80000, '2020-06-13 15:46:50', '2020-06-13 15:46:50'),
(20, 10, 4000, 15, 60000, '2020-06-13 15:46:50', '2020-06-13 15:46:50'),
(21, 1, 2000, 1, 2000, '2020-06-13 16:23:38', '2020-06-13 16:23:38'),
(21, 7, 70000, 1, 70000, '2020-06-13 16:23:38', '2020-06-13 16:23:38'),
(22, 14, 3000, 10, 30000, '2020-06-14 10:31:40', '2020-06-14 10:31:40'),
(23, 1, 2000, 5, 10000, '2020-06-14 10:43:39', '2020-06-14 11:09:10'),
(24, 1, 2000, 1, 2000, '2020-06-15 15:14:37', '2020-06-15 15:14:37'),
(25, 1, 2000, 1, 2000, '2020-06-15 16:59:04', '2020-06-15 16:59:04'),
(26, 1, 2000, 2, 4000, '2020-06-17 20:41:55', '2020-06-17 20:41:55'),
(26, 7, 70000, 1, 70000, '2020-06-17 20:41:55', '2020-06-17 20:41:55'),
(27, 1, 2000, 1, 2000, '2020-06-17 21:12:44', '2020-06-17 21:12:44'),
(28, 1, 2000, 2, 4000, '2020-06-18 00:02:39', '2020-06-18 00:02:39'),
(28, 4, 7000, 1, 7000, '2020-06-18 00:02:39', '2020-06-18 00:02:39'),
(28, 7, 70000, 1, 70000, '2020-06-18 00:02:39', '2020-06-18 00:02:39');

-- --------------------------------------------------------

--
-- Table structure for table `chitietpnt`
--

CREATE TABLE `chitietpnt` (
  `MaPNT` int(11) NOT NULL,
  `MaThuoc` int(11) NOT NULL,
  `SoLuongNhap` int(11) NOT NULL,
  `DonGiaNhap` int(11) NOT NULL,
  `ThanhTien` int(11) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `chitietpnt`
--

INSERT INTO `chitietpnt` (`MaPNT`, `MaThuoc`, `SoLuongNhap`, `DonGiaNhap`, `ThanhTien`, `created_at`, `updated_at`) VALUES
(1, 2, 50, 2000, 100000, '2020-06-15 21:24:40', '2020-06-15 21:24:40'),
(1, 7, 10, 90000, 900000, '2020-06-15 21:24:40', '2020-06-15 21:24:40');

-- --------------------------------------------------------

--
-- Table structure for table `donvi`
--

CREATE TABLE `donvi` (
  `MaDonVi` int(11) NOT NULL,
  `TenDonVi` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `donvi`
--

INSERT INTO `donvi` (`MaDonVi`, `TenDonVi`, `created_at`, `updated_at`) VALUES
(1, 'Viên', '2020-05-05 17:00:00', NULL),
(2, 'Gói', '2020-05-05 17:00:00', NULL),
(3, 'Vỉ', '2020-05-05 17:00:00', NULL),
(4, 'Ống', '2020-05-05 17:00:00', NULL),
(6, 'Hộp', '2020-06-13 14:20:01', '2020-06-13 14:20:01'),
(7, 'Chai', '2020-06-13 14:20:26', '2020-06-13 14:20:26');

-- --------------------------------------------------------

--
-- Table structure for table `hoadon`
--

CREATE TABLE `hoadon` (
  `MaHoaDon` int(11) NOT NULL,
  `MaPKB` int(11) NOT NULL,
  `TienKham` int(11) NOT NULL,
  `TienThuoc` int(11) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `hoadon`
--

INSERT INTO `hoadon` (`MaHoaDon`, `MaPKB`, `TienKham`, `TienThuoc`, `created_at`, `updated_at`) VALUES
(1, 4, 50000, 320000, '2020-05-10 14:20:18', '2020-06-13 15:42:02'),
(4, 7, 35000, 84000, '2020-05-12 22:55:58', '2020-06-13 15:43:38'),
(11, 14, 35000, 64000, '2020-05-13 07:30:15', '2020-06-13 15:40:51'),
(12, 15, 35000, 174000, '2020-05-15 14:19:20', '2020-06-13 15:38:23'),
(14, 17, 30000, 159000, '2020-05-23 16:11:55', '2020-06-13 14:45:10'),
(15, 18, 30000, 59000, '2020-06-07 06:29:45', '2020-06-13 14:43:42'),
(16, 19, 30000, 367000, '2020-06-13 15:45:35', '2020-06-13 15:45:35'),
(17, 20, 30000, 144000, '2020-06-13 15:46:50', '2020-06-13 15:46:50'),
(18, 21, 30000, 72000, '2020-06-13 16:23:38', '2020-06-13 16:23:38'),
(19, 22, 30000, 30000, '2020-06-14 10:31:40', '2020-06-14 10:31:40'),
(20, 23, 30000, 10000, '2020-06-14 10:43:39', '2020-06-14 11:09:10'),
(21, 24, 30000, 2000, '2020-06-15 15:14:37', '2020-06-15 15:14:37'),
(22, 25, 30000, 2000, '2020-06-15 16:59:04', '2020-06-15 16:59:04'),
(23, 26, 30000, 74000, '2020-06-17 20:41:55', '2020-06-17 20:41:55'),
(24, 27, 30000, 2000, '2020-06-17 21:12:44', '2020-06-17 21:12:44'),
(25, 28, 30000, 81000, '2020-06-18 00:02:39', '2020-06-18 00:02:39');

-- --------------------------------------------------------

--
-- Table structure for table `loaibenh`
--

CREATE TABLE `loaibenh` (
  `MaLoaiBenh` tinyint(4) NOT NULL,
  `TenLoaiBenh` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `loaibenh`
--

INSERT INTO `loaibenh` (`MaLoaiBenh`, `TenLoaiBenh`, `created_at`, `updated_at`) VALUES
(1, 'Nóng lạnh', '2020-05-07 17:00:00', '2020-06-13 14:16:46'),
(2, 'Đau răng', '2020-05-07 17:00:00', '2020-06-13 14:16:54'),
(4, 'Thiếu máu lên não', '2020-05-07 17:31:58', '2020-06-13 14:16:37'),
(5, 'Cao huyết áp', '2020-05-12 03:16:19', '2020-06-13 14:15:28'),
(6, 'Viêm họng', '2020-05-12 03:16:28', '2020-06-13 14:15:16'),
(7, 'Đau bao tử', '2020-05-12 03:16:33', '2020-05-12 03:16:33'),
(8, 'Hen Suyễn', '2020-06-13 14:17:36', '2020-06-13 14:17:36'),
(9, 'Viêm gan', '2020-06-13 14:17:43', '2020-06-13 14:17:43'),
(10, 'Viêm xoang', '2020-06-13 14:17:51', '2020-06-13 14:17:51'),
(11, 'Rối loạn tiêu hóa', '2020-06-13 14:19:05', '2020-06-13 14:19:05');

-- --------------------------------------------------------

--
-- Table structure for table `migrations`
--

CREATE TABLE `migrations` (
  `id` int(10) UNSIGNED NOT NULL,
  `migration` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `batch` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `phieukham`
--

CREATE TABLE `phieukham` (
  `MaPKB` int(11) NOT NULL,
  `NgayKham` date NOT NULL,
  `MaBN` int(11) NOT NULL,
  `TrieuChung` varchar(60) COLLATE utf8_unicode_ci NOT NULL,
  `MaLoaiBenh` tinyint(4) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `phieukham`
--

INSERT INTO `phieukham` (`MaPKB`, `NgayKham`, `MaBN`, `TrieuChung`, `MaLoaiBenh`, `created_at`, `updated_at`) VALUES
(4, '2020-05-10', 3, 'Nhứt răng', 2, '2020-05-10 14:20:18', '2020-06-13 15:42:02'),
(7, '2020-05-13', 1, 'Ho nhiều vào buổi tối và sáng sớm', 6, '2020-05-12 22:55:58', '2020-06-13 15:43:38'),
(14, '2020-05-13', 2, 'Ăn vô ói, ói liên tục', 11, '2020-05-13 07:30:15', '2020-06-13 15:40:51'),
(15, '2020-05-15', 1, 'Đau bụng, khó chịu bụng', 7, '2020-05-15 14:19:20', '2020-06-13 15:38:23'),
(17, '2020-05-23', 3, 'Sốt, nóng, đau đầu', 1, '2020-05-23 16:11:55', '2020-06-13 14:45:10'),
(18, '2020-06-07', 3, 'Ho có đàm nhiều thiệt nhiều', 6, '2020-06-07 06:29:45', '2020-06-13 14:43:42'),
(19, '2020-06-13', 10, 'Khó thở, nhiều đờm trong cổ họng', 8, '2020-06-13 15:45:35', '2020-06-13 15:45:35'),
(20, '2020-06-13', 8, 'cao huyết áp', 5, '2020-06-13 15:46:50', '2020-06-13 15:46:50'),
(21, '2020-06-13', 5, 'hay nhứt đầu', 4, '2020-06-13 16:23:38', '2020-06-13 16:23:38'),
(22, '2020-06-14', 7, 'Ăn không tiêu, hay ói mửa', 11, '2020-06-14 10:31:40', '2020-06-14 10:31:40'),
(23, '2020-06-14', 4, 'Bị sưng nướu răng', 2, '2020-06-14 10:43:39', '2020-06-14 10:43:39'),
(24, '2020-06-15', 9, 'Ăn không tiêu, ói liên tục, sốt', 11, '2020-06-15 15:14:37', '2020-06-15 15:14:37'),
(25, '2020-06-15', 2, 'Ăn không tiêu hay buồn nôn', 9, '2020-06-15 16:59:04', '2020-06-15 16:59:04'),
(26, '2020-06-18', 11, 'Đau nửa đầu', 4, '2020-06-17 20:41:55', '2020-06-17 20:41:55'),
(27, '2020-06-18', 12, 'Đau bụng, khó chịu bụng', 11, '2020-06-17 21:12:44', '2020-06-17 21:12:44'),
(28, '2020-06-18', 13, 'Sốt, nóng, đau đầu', 1, '2020-06-18 00:02:39', '2020-06-18 00:02:39');

-- --------------------------------------------------------

--
-- Table structure for table `phieunhapthuoc`
--

CREATE TABLE `phieunhapthuoc` (
  `MaPNT` int(11) NOT NULL,
  `NgayNhap` date NOT NULL,
  `SoLoaiThuocNhap` tinyint(4) NOT NULL,
  `TongTienNhap` int(11) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `phieunhapthuoc`
--

INSERT INTO `phieunhapthuoc` (`MaPNT`, `NgayNhap`, `SoLoaiThuocNhap`, `TongTienNhap`, `created_at`, `updated_at`) VALUES
(1, '2020-06-16', 2, 1000000, '2020-06-15 21:24:40', '2020-06-15 21:24:40');

-- --------------------------------------------------------

--
-- Table structure for table `thamso`
--

CREATE TABLE `thamso` (
  `MaTS` tinyint(2) NOT NULL,
  `ThamSo` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `GiaTri` int(11) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `thamso`
--

INSERT INTO `thamso` (`MaTS`, `ThamSo`, `GiaTri`, `created_at`, `updated_at`) VALUES
(1, 'SoBenhNhanToiDa', 40, NULL, '2020-05-13 03:03:43'),
(2, 'TienKham', 30000, NULL, '2020-05-15 14:52:55'),
(3, 'MucCanhBaoThuoc', 99, NULL, '2020-06-18 01:03:46');

-- --------------------------------------------------------

--
-- Table structure for table `thongtinphongkham`
--

CREATE TABLE `thongtinphongkham` (
  `MaTTPK` int(11) NOT NULL,
  `ThamSo` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `GiaTri` varchar(50) COLLATE utf8_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `thongtinphongkham`
--

INSERT INTO `thongtinphongkham` (`MaTTPK`, `ThamSo`, `GiaTri`, `created_at`, `updated_at`) VALUES
(1, 'TenPhongKham', 'Hoa Sen', NULL, '2020-05-09 17:36:33'),
(2, 'TenBS', 'Đặng Văn Tam', NULL, '2020-05-09 17:36:33'),
(3, 'DiaChi', 'TP Hồ Chí Minh', NULL, '2020-05-09 17:36:33'),
(4, 'SDT', '01655607979', NULL, '2020-05-09 17:36:33');

-- --------------------------------------------------------

--
-- Table structure for table `thuoc`
--

CREATE TABLE `thuoc` (
  `MaThuoc` int(11) NOT NULL,
  `TenThuoc` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `SoLuongConLai` int(11) NOT NULL DEFAULT '0',
  `MaDonVi` int(11) NOT NULL,
  `DonGia` int(11) NOT NULL,
  `MaCachDung` int(11) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `thuoc`
--

INSERT INTO `thuoc` (`MaThuoc`, `TenThuoc`, `SoLuongConLai`, `MaDonVi`, `DonGia`, `MaCachDung`, `created_at`, `updated_at`) VALUES
(1, 'Panadol', 94, 3, 2000, 1, NULL, '2020-06-18 00:02:39'),
(2, 'Panadu', 50, 4, 3000, 4, '2020-05-09 16:54:06', '2020-06-15 21:24:40'),
(3, 'Hapacol', 100, 1, 5000, 3, '2020-05-13 06:45:54', '2020-06-15 15:32:37'),
(4, 'Tiffy', 99, 3, 7000, 1, '2020-05-15 05:31:02', '2020-06-18 00:02:39'),
(5, 'Strepsils', 100, 1, 3000, 3, '2020-06-13 14:25:08', '2020-06-13 14:25:08'),
(6, 'Calcium Corbiere', 100, 3, 30000, 1, '2020-06-13 14:29:03', '2020-06-13 14:29:03'),
(7, 'Antot IQ', 108, 6, 70000, 1, '2020-06-13 14:29:37', '2020-06-18 00:02:39'),
(8, 'Laroscorbine platinum', 100, 4, 40000, 4, '2020-06-13 14:31:37', '2020-06-13 14:31:37'),
(9, 'Ventolin', 100, 7, 120000, 5, '2020-06-13 14:33:33', '2020-06-13 14:33:33'),
(10, 'Salbutamol', 100, 1, 4000, 1, '2020-06-13 14:34:05', '2020-06-13 14:34:05'),
(11, 'Seretide evohaler DC', 100, 7, 150000, 5, '2020-06-13 14:34:29', '2020-06-13 14:34:29'),
(12, 'Axeton', 100, 7, 9000, 6, '2020-06-13 14:36:27', '2020-06-13 14:36:27'),
(13, 'Motilum M', 100, 1, 5000, 1, '2020-06-13 14:37:02', '2020-06-13 14:37:02'),
(14, 'Smecta', 100, 2, 3000, 1, '2020-06-13 14:38:14', '2020-06-13 14:38:14'),
(15, 'Oresol', 100, 2, 15000, 1, '2020-06-13 14:39:07', '2020-06-13 14:39:07'),
(16, 'Ancool 90', 20, 7, 10000, 6, '2020-06-15 17:18:10', '2020-06-15 17:18:10');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(10) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `password` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `name`, `email`, `password`, `remember_token`, `created_at`, `updated_at`) VALUES
(1, 'Mai Văn Yên', 'yenmai477@gmail.com', '$2y$10$gArzRh6cKHTjz9q.aYqDD.2yuFRWirHjfXotOwU2UlwObZskDIX8a', 'MsG8lkYilNaT2h4dC7TT4ptxMHaESLZLe4Wcvb5v5mcsaEKjU43mpCZ9zCin', NULL, '2020-05-17 18:49:23');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `baocaodoanhthu`
--
ALTER TABLE `baocaodoanhthu`
  ADD PRIMARY KEY (`MaBCDT`);

--
-- Indexes for table `baocaosudungthuoc`
--
ALTER TABLE `baocaosudungthuoc`
  ADD PRIMARY KEY (`MaBCSDT`);

--
-- Indexes for table `benhnhan`
--
ALTER TABLE `benhnhan`
  ADD PRIMARY KEY (`MaBN`);

--
-- Indexes for table `cachdung`
--
ALTER TABLE `cachdung`
  ADD PRIMARY KEY (`MaCachDung`);

--
-- Indexes for table `chitietbcdt`
--
ALTER TABLE `chitietbcdt`
  ADD PRIMARY KEY (`MaBCDT`,`Ngay`);

--
-- Indexes for table `chitietbcsdt`
--
ALTER TABLE `chitietbcsdt`
  ADD PRIMARY KEY (`MaBCSDT`,`MaThuoc`),
  ADD KEY `FK_THUOC_CTBCSDT` (`MaThuoc`);

--
-- Indexes for table `chitietphieukham`
--
ALTER TABLE `chitietphieukham`
  ADD PRIMARY KEY (`MaPKB`,`MaThuoc`),
  ADD KEY `FK_THUOC_CTPKB` (`MaThuoc`);

--
-- Indexes for table `chitietpnt`
--
ALTER TABLE `chitietpnt`
  ADD PRIMARY KEY (`MaPNT`,`MaThuoc`),
  ADD KEY `FK_THUOC_CTPNT` (`MaThuoc`);

--
-- Indexes for table `donvi`
--
ALTER TABLE `donvi`
  ADD PRIMARY KEY (`MaDonVi`);

--
-- Indexes for table `hoadon`
--
ALTER TABLE `hoadon`
  ADD PRIMARY KEY (`MaHoaDon`),
  ADD KEY `FK_HOADON_PKB` (`MaPKB`);

--
-- Indexes for table `loaibenh`
--
ALTER TABLE `loaibenh`
  ADD PRIMARY KEY (`MaLoaiBenh`);

--
-- Indexes for table `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `phieukham`
--
ALTER TABLE `phieukham`
  ADD PRIMARY KEY (`MaPKB`),
  ADD KEY `FK_BENHNHAN_PKB` (`MaBN`),
  ADD KEY `DuDoanLoaiBenh` (`MaLoaiBenh`);

--
-- Indexes for table `phieunhapthuoc`
--
ALTER TABLE `phieunhapthuoc`
  ADD PRIMARY KEY (`MaPNT`);

--
-- Indexes for table `thamso`
--
ALTER TABLE `thamso`
  ADD PRIMARY KEY (`MaTS`);

--
-- Indexes for table `thongtinphongkham`
--
ALTER TABLE `thongtinphongkham`
  ADD PRIMARY KEY (`MaTTPK`);

--
-- Indexes for table `thuoc`
--
ALTER TABLE `thuoc`
  ADD PRIMARY KEY (`MaThuoc`),
  ADD KEY `FK_THUOC_CACHDUNG` (`MaCachDung`),
  ADD KEY `FK_THUOC_DONVI` (`MaDonVi`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `baocaodoanhthu`
--
ALTER TABLE `baocaodoanhthu`
  MODIFY `MaBCDT` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `baocaosudungthuoc`
--
ALTER TABLE `baocaosudungthuoc`
  MODIFY `MaBCSDT` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `benhnhan`
--
ALTER TABLE `benhnhan`
  MODIFY `MaBN` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT for table `cachdung`
--
ALTER TABLE `cachdung`
  MODIFY `MaCachDung` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `donvi`
--
ALTER TABLE `donvi`
  MODIFY `MaDonVi` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `hoadon`
--
ALTER TABLE `hoadon`
  MODIFY `MaHoaDon` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=26;

--
-- AUTO_INCREMENT for table `loaibenh`
--
ALTER TABLE `loaibenh`
  MODIFY `MaLoaiBenh` tinyint(4) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT for table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `phieukham`
--
ALTER TABLE `phieukham`
  MODIFY `MaPKB` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=29;

--
-- AUTO_INCREMENT for table `phieunhapthuoc`
--
ALTER TABLE `phieunhapthuoc`
  MODIFY `MaPNT` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `thamso`
--
ALTER TABLE `thamso`
  MODIFY `MaTS` tinyint(2) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `thongtinphongkham`
--
ALTER TABLE `thongtinphongkham`
  MODIFY `MaTTPK` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `thuoc`
--
ALTER TABLE `thuoc`
  MODIFY `MaThuoc` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `chitietbcdt`
--
ALTER TABLE `chitietbcdt`
  ADD CONSTRAINT `FK_BCDT_CTBCDT` FOREIGN KEY (`MaBCDT`) REFERENCES `baocaodoanhthu` (`MaBCDT`);

--
-- Constraints for table `chitietbcsdt`
--
ALTER TABLE `chitietbcsdt`
  ADD CONSTRAINT `FK_BCSDT_CTBCSDT` FOREIGN KEY (`MaBCSDT`) REFERENCES `baocaosudungthuoc` (`MaBCSDT`),
  ADD CONSTRAINT `FK_THUOC_CTBCSDT` FOREIGN KEY (`MaThuoc`) REFERENCES `thuoc` (`MaThuoc`);

--
-- Constraints for table `chitietphieukham`
--
ALTER TABLE `chitietphieukham`
  ADD CONSTRAINT `FK_PKB_CTPKB` FOREIGN KEY (`MaPKB`) REFERENCES `phieukham` (`MaPKB`),
  ADD CONSTRAINT `FK_THUOC_CTPKB` FOREIGN KEY (`MaThuoc`) REFERENCES `thuoc` (`MaThuoc`);

--
-- Constraints for table `chitietpnt`
--
ALTER TABLE `chitietpnt`
  ADD CONSTRAINT `FK_PNT_CTPNT` FOREIGN KEY (`MaPNT`) REFERENCES `phieunhapthuoc` (`MaPNT`),
  ADD CONSTRAINT `FK_THUOC_CTPNT` FOREIGN KEY (`MaThuoc`) REFERENCES `thuoc` (`MaThuoc`);

--
-- Constraints for table `hoadon`
--
ALTER TABLE `hoadon`
  ADD CONSTRAINT `FK_HOADON_PKB` FOREIGN KEY (`MaPKB`) REFERENCES `phieukham` (`MaPKB`);

--
-- Constraints for table `phieukham`
--
ALTER TABLE `phieukham`
  ADD CONSTRAINT `FK_BENHNHAN_PKB` FOREIGN KEY (`MaBN`) REFERENCES `benhnhan` (`MaBN`),
  ADD CONSTRAINT `phieukham_ibfk_1` FOREIGN KEY (`MaLoaiBenh`) REFERENCES `loaibenh` (`MaLoaiBenh`);

--
-- Constraints for table `thuoc`
--
ALTER TABLE `thuoc`
  ADD CONSTRAINT `FK_THUOC_CACHDUNG` FOREIGN KEY (`MaCachDung`) REFERENCES `cachdung` (`MaCachDung`),
  ADD CONSTRAINT `FK_THUOC_DONVI` FOREIGN KEY (`MaDonVi`) REFERENCES `donvi` (`MaDonVi`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
