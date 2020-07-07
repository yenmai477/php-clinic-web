-- phpMyAdmin SQL Dump
-- version 5.0.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jul 07, 2020 at 09:16 AM
-- Server version: 10.4.11-MariaDB
-- PHP Version: 7.4.3

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
  `updated_at` timestamp NULL DEFAULT NULL ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `baocaodoanhthu`
--

INSERT INTO `baocaodoanhthu` (`MaBCDT`, `ThangNam`, `TongDoanhThu`, `created_at`, `updated_at`) VALUES
(2, '06/2020', 2662000, '2020-05-13 02:17:28', '2020-06-21 05:07:21'),
(3, '05/2020', 944000, '2020-05-13 02:58:53', '2020-05-23 16:11:55'),
(4, '07/2020', 1880000, '2020-07-01 05:06:39', '2020-07-07 06:39:45');

-- --------------------------------------------------------

--
-- Table structure for table `baocaosudungthuoc`
--

CREATE TABLE `baocaosudungthuoc` (
  `MaBCSDT` int(11) NOT NULL,
  `ThangNam` varchar(7) COLLATE utf8_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `baocaosudungthuoc`
--

INSERT INTO `baocaosudungthuoc` (`MaBCSDT`, `ThangNam`, `created_at`, `updated_at`) VALUES
(2, '05/2020', '2020-05-15 05:14:31', '2020-05-15 05:14:31'),
(3, '04/2020', '2020-05-15 13:21:30', '2020-05-15 13:21:30'),
(5, '03/2020', '2020-05-15 14:40:45', '2020-05-15 14:40:45'),
(6, '02/2020', '2020-05-15 14:40:48', '2020-05-15 14:40:48'),
(7, '06/2020', '2020-06-07 04:45:22', '2020-06-07 04:45:22'),
(8, '01/2020', '2020-06-02 01:09:43', '2020-06-02 01:09:43'),
(9, '07/2020', '2020-07-01 05:12:02', '2020-07-01 05:12:02');

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
  `updated_at` timestamp NULL DEFAULT NULL ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `benhnhan`
--

INSERT INTO `benhnhan` (`MaBN`, `HoTen`, `NamSinh`, `GioiTinh`, `DiaChi`, `created_at`, `updated_at`) VALUES
(1, 'Nguyễn Văn Thành', 1994, 2, 'Cao Lãnh, Đồng Tháp', '2020-05-08 10:43:59', '2020-05-31 09:07:48'),
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
  `updated_at` timestamp NULL DEFAULT NULL ON UPDATE current_timestamp()
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
  `updated_at` timestamp NULL DEFAULT NULL ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `chitietbcdt`
--

INSERT INTO `chitietbcdt` (`MaBCDT`, `Ngay`, `SoBenhNhan`, `DoanhThu`, `created_at`, `updated_at`) VALUES
(2, 1, 1, 640000, '2020-06-01 16:12:50', '2020-06-01 16:12:50'),
(2, 2, 1, 116000, '2020-06-02 01:09:27', '2020-06-02 08:48:54'),
(2, 7, 1, 89000, '2020-06-07 06:29:53', '2020-06-14 11:04:27'),
(2, 13, 3, 673000, '2020-06-13 16:58:41', '2020-06-13 16:58:41'),
(2, 14, 2, 100000, '2020-06-14 10:32:19', '2020-06-14 11:09:18'),
(2, 15, 1, 32000, '2020-06-15 15:14:44', '2020-06-15 15:14:44'),
(2, 16, 2, 1032000, '2020-06-16 04:00:30', '2020-06-16 04:00:30'),
(2, 17, 0, 0, '2020-06-17 10:42:52', '2020-06-17 10:42:52'),
(2, 18, 3, 247000, '2020-06-18 00:04:42', '2020-06-18 00:04:42'),
(2, 21, 0, 0, '2020-06-21 05:04:09', '2020-06-21 05:04:09'),
(2, 25, 0, 0, '2020-06-25 09:09:03', '2020-06-25 09:09:03'),
(3, 13, 8, 465000, '2020-05-13 03:25:14', '2020-05-15 13:52:03'),
(3, 15, 1, 55000, '2020-05-15 14:19:20', '2020-05-15 14:19:20'),
(3, 17, 1, 40000, '2020-05-17 12:59:38', '2020-05-17 12:59:38'),
(3, 23, 1, 140000, '2020-05-23 16:11:55', '2020-05-23 16:11:55'),
(3, 31, 0, 0, '2020-05-31 03:59:55', '2020-05-31 03:59:55'),
(4, 1, 1, 40000, '2020-07-01 05:06:39', '2020-07-01 05:06:39'),
(4, 3, 2, 269000, '2020-07-03 08:56:45', '2020-07-03 08:56:45'),
(4, 4, 3, 729000, '2020-07-04 04:52:55', '2020-07-04 04:52:55'),
(4, 6, 2, 297000, '2020-07-06 12:29:09', '2020-07-06 12:29:09'),
(4, 7, 1, 545000, '2020-07-07 06:39:45', '2020-07-07 06:39:45');

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
  `updated_at` timestamp NULL DEFAULT NULL ON UPDATE current_timestamp()
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
(2, 16, 0, 0, '2020-05-31 04:00:06', '2020-05-31 04:00:06'),
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
(3, 16, 0, 0, '2020-06-27 01:28:26', '2020-06-27 01:28:26'),
(5, 1, 0, 0, '2020-05-15 14:40:45', '2020-05-15 14:40:45'),
(5, 2, 0, 0, '2020-05-15 14:40:45', '2020-05-15 14:40:45'),
(5, 3, 0, 0, '2020-05-15 14:40:45', '2020-05-15 14:40:45'),
(5, 4, 0, 0, '2020-05-15 14:40:45', '2020-05-15 14:40:45'),
(6, 1, 0, 0, '2020-05-15 14:40:48', '2020-05-15 14:40:48'),
(6, 2, 0, 0, '2020-05-15 14:40:48', '2020-05-15 14:40:48'),
(6, 3, 0, 0, '2020-05-15 14:40:48', '2020-05-15 14:40:48'),
(6, 4, 0, 0, '2020-05-15 14:40:48', '2020-05-15 14:40:48'),
(6, 5, 0, 0, '2020-06-27 01:28:21', '2020-06-27 01:28:21'),
(6, 6, 0, 0, '2020-06-27 01:28:21', '2020-06-27 01:28:21'),
(6, 7, 0, 0, '2020-06-27 01:28:21', '2020-06-27 01:28:21'),
(6, 8, 0, 0, '2020-06-27 01:28:21', '2020-06-27 01:28:21'),
(6, 9, 0, 0, '2020-06-27 01:28:21', '2020-06-27 01:28:21'),
(6, 10, 0, 0, '2020-06-27 01:28:21', '2020-06-27 01:28:21'),
(6, 11, 0, 0, '2020-06-27 01:28:21', '2020-06-27 01:28:21'),
(6, 12, 0, 0, '2020-06-27 01:28:21', '2020-06-27 01:28:21'),
(6, 13, 0, 0, '2020-06-27 01:28:21', '2020-06-27 01:28:21'),
(6, 14, 0, 0, '2020-06-27 01:28:21', '2020-06-27 01:28:21'),
(6, 15, 0, 0, '2020-06-27 01:28:21', '2020-06-27 01:28:21'),
(6, 16, 0, 0, '2020-06-27 01:28:21', '2020-06-27 01:28:21'),
(7, 1, 20, 10, '2020-06-07 04:45:22', '2020-06-21 05:04:22'),
(7, 2, 0, 0, '2020-06-07 04:45:22', '2020-06-07 04:45:22'),
(7, 3, 10, 2, '2020-06-07 04:45:22', '2020-06-21 05:04:22'),
(7, 4, 13, 4, '2020-06-07 04:45:22', '2020-06-02 08:54:02'),
(7, 5, 6, 3, '2020-06-13 17:19:07', '2020-06-21 05:04:22'),
(7, 6, 0, 0, '2020-06-13 17:19:07', '2020-06-13 17:19:07'),
(7, 7, 8, 5, '2020-06-13 17:19:07', '2020-06-21 05:04:22'),
(7, 8, 2, 1, '2020-06-13 17:19:07', '2020-06-21 05:04:22'),
(7, 9, 10, 3, '2020-06-13 17:19:07', '2020-06-21 05:04:22'),
(7, 10, 17, 2, '2020-06-13 17:19:07', '2020-06-02 08:54:02'),
(7, 11, 0, 0, '2020-06-13 17:19:07', '2020-06-13 17:19:07'),
(7, 12, 0, 0, '2020-06-13 17:19:07', '2020-06-13 17:19:07'),
(7, 13, 10, 1, '2020-06-13 17:19:07', '2020-06-13 17:19:07'),
(7, 14, 10, 1, '2020-06-13 17:19:07', '2020-06-14 10:32:43'),
(7, 15, 0, 0, '2020-06-13 17:19:07', '2020-06-13 17:19:07'),
(7, 16, 0, 0, '2020-06-18 00:05:04', '2020-06-18 00:05:04'),
(8, 1, 0, 0, '2020-06-02 01:09:43', '2020-06-02 01:09:43'),
(8, 2, 0, 0, '2020-06-02 01:09:43', '2020-06-02 01:09:43'),
(8, 3, 0, 0, '2020-06-02 01:09:43', '2020-06-02 01:09:43'),
(8, 4, 0, 0, '2020-06-02 01:09:43', '2020-06-02 01:09:43'),
(8, 5, 0, 0, '2020-06-02 01:09:43', '2020-06-02 01:09:43'),
(8, 6, 0, 0, '2020-06-02 01:09:43', '2020-06-02 01:09:43'),
(8, 7, 0, 0, '2020-06-02 01:09:43', '2020-06-02 01:09:43'),
(8, 8, 0, 0, '2020-06-02 01:09:43', '2020-06-02 01:09:43'),
(8, 9, 0, 0, '2020-06-02 01:09:43', '2020-06-02 01:09:43'),
(8, 10, 0, 0, '2020-06-02 01:09:43', '2020-06-02 01:09:43'),
(8, 11, 0, 0, '2020-06-02 01:09:43', '2020-06-02 01:09:43'),
(8, 12, 0, 0, '2020-06-02 01:09:43', '2020-06-02 01:09:43'),
(8, 13, 0, 0, '2020-06-02 01:09:43', '2020-06-02 01:09:43'),
(8, 14, 0, 0, '2020-06-02 01:09:43', '2020-06-02 01:09:43'),
(8, 15, 0, 0, '2020-06-02 01:09:43', '2020-06-02 01:09:43'),
(8, 16, 0, 0, '2020-06-02 01:09:43', '2020-06-02 01:09:43'),
(9, 1, 20, 3, '2020-07-01 05:12:02', '2020-07-07 06:39:59'),
(9, 2, 23, 5, '2020-07-01 05:12:02', '2020-07-07 06:39:59'),
(9, 3, 0, 0, '2020-07-01 05:12:02', '2020-07-01 05:12:02'),
(9, 4, 15, 4, '2020-07-01 05:12:02', '2020-07-07 06:39:59'),
(9, 5, 0, 0, '2020-07-01 05:12:02', '2020-07-01 05:12:02'),
(9, 6, 5, 1, '2020-07-01 05:12:02', '2020-07-07 06:39:59'),
(9, 7, 4, 2, '2020-07-01 05:12:02', '2020-07-04 10:25:50'),
(9, 8, 5, 1, '2020-07-01 05:12:02', '2020-07-07 06:39:59'),
(9, 9, 0, 0, '2020-07-01 05:12:02', '2020-07-01 05:12:02'),
(9, 10, 4, 2, '2020-07-01 05:12:02', '2020-07-04 10:25:50'),
(9, 11, 5, 2, '2020-07-01 05:12:02', '2020-07-07 06:39:59'),
(9, 12, 0, 0, '2020-07-01 05:12:02', '2020-07-01 05:12:02'),
(9, 13, 0, 0, '2020-07-01 05:12:02', '2020-07-01 05:12:02'),
(9, 14, 0, 0, '2020-07-01 05:12:02', '2020-07-01 05:12:02'),
(9, 15, 0, 0, '2020-07-01 05:12:02', '2020-07-01 05:12:02'),
(9, 16, 0, 0, '2020-07-01 05:12:02', '2020-07-01 05:12:02');

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
  `updated_at` timestamp NULL DEFAULT NULL ON UPDATE current_timestamp()
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
(28, 7, 70000, 1, 70000, '2020-06-18 00:02:39', '2020-06-18 00:02:39'),
(30, 1, 2000, 4, 8000, '2020-06-02 08:47:51', '2020-06-02 08:47:51'),
(30, 4, 7000, 10, 70000, '2020-06-02 08:47:51', '2020-06-02 08:47:51'),
(30, 10, 4000, 2, 8000, '2020-06-02 08:47:51', '2020-06-02 08:47:51'),
(31, 5, 3000, 2, 6000, '2020-06-16 04:00:17', '2020-06-16 04:00:17'),
(31, 9, 120000, 4, 480000, '2020-06-16 04:00:17', '2020-06-16 04:00:17'),
(32, 5, 3000, 2, 6000, '2020-06-16 04:00:18', '2020-06-16 04:00:18'),
(32, 9, 120000, 4, 480000, '2020-06-16 04:00:18', '2020-06-16 04:00:18'),
(33, 3, 5000, 5, 25000, '2020-06-17 10:48:55', '2020-06-17 10:48:55'),
(33, 5, 3000, 2, 6000, '2020-06-17 10:48:55', '2020-06-17 10:48:55'),
(33, 7, 70000, 4, 280000, '2020-06-17 10:48:55', '2020-06-17 10:48:55'),
(34, 1, 2000, 5, 10000, '2020-07-01 05:06:18', '2020-07-01 05:06:18'),
(35, 2, 3000, 5, 15000, '2020-07-03 08:55:11', '2020-07-03 08:55:11'),
(35, 4, 7000, 5, 35000, '2020-07-03 08:55:11', '2020-07-03 08:55:11'),
(36, 2, 3000, 5, 15000, '2020-07-03 08:56:17', '2020-07-03 08:56:17'),
(36, 7, 70000, 2, 140000, '2020-07-03 08:56:17', '2020-07-03 08:56:17'),
(36, 10, 4000, 1, 4000, '2020-07-03 08:56:17', '2020-07-03 08:56:17'),
(37, 11, 150000, 3, 450000, '2020-07-04 04:48:58', '2020-07-04 04:48:58'),
(38, 1, 2000, 5, 10000, '2020-07-04 04:50:00', '2020-07-04 04:50:00'),
(38, 2, 3000, 2, 6000, '2020-07-04 04:50:00', '2020-07-04 04:50:00'),
(38, 4, 7000, 3, 21000, '2020-07-04 04:50:00', '2020-07-04 04:50:00'),
(39, 7, 70000, 2, 140000, '2020-07-04 04:51:29', '2020-07-04 04:51:29'),
(39, 10, 4000, 3, 12000, '2020-07-04 04:51:29', '2020-07-04 04:51:29'),
(40, 1, 2000, 10, 20000, '2020-07-06 10:24:38', '2020-07-06 10:24:38'),
(40, 4, 7000, 5, 35000, '2020-07-06 10:24:38', '2020-07-06 10:24:38'),
(41, 2, 3000, 6, 18000, '2020-07-06 10:25:09', '2020-07-06 10:25:09'),
(41, 4, 7000, 2, 14000, '2020-07-06 10:25:09', '2020-07-06 10:25:09'),
(41, 6, 30000, 5, 150000, '2020-07-06 10:25:09', '2020-07-06 10:25:09'),
(42, 2, 3000, 5, 15000, '2020-07-07 06:34:31', '2020-07-07 06:34:31'),
(42, 8, 40000, 5, 200000, '2020-07-07 06:34:31', '2020-07-07 06:34:31'),
(42, 11, 150000, 2, 300000, '2020-07-07 06:34:31', '2020-07-07 06:34:31');

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
  `updated_at` timestamp NULL DEFAULT NULL ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `chitietpnt`
--

INSERT INTO `chitietpnt` (`MaPNT`, `MaThuoc`, `SoLuongNhap`, `DonGiaNhap`, `ThanhTien`, `created_at`, `updated_at`) VALUES
(1, 2, 50, 2000, 100000, '2020-06-15 21:24:40', '2020-06-15 21:24:40'),
(1, 7, 10, 90000, 900000, '2020-06-15 21:24:40', '2020-06-15 21:24:40'),
(2, 1, 15, 1000, 15000, '2020-06-29 00:58:46', '2020-06-29 00:58:46'),
(2, 2, 50, 500, 25000, '2020-06-29 00:58:46', '2020-06-29 00:58:46'),
(3, 16, 100, 500, 50000, '2020-07-01 05:20:03', '2020-07-01 05:20:03'),
(5, 1, 20, 1000, 20000, '2020-07-04 04:57:01', '2020-07-04 04:57:01'),
(5, 2, 30, 5000, 150000, '2020-07-04 04:57:01', '2020-07-04 04:57:01'),
(5, 4, 50, 1000, 50000, '2020-07-04 04:57:01', '2020-07-04 04:57:01'),
(5, 8, 30, 1000, 30000, '2020-07-04 04:57:01', '2020-07-04 04:57:01'),
(7, 2, 10, 1000, 10000, '2020-07-07 05:13:11', '2020-07-07 05:13:11'),
(8, 11, 10, 10000, 100000, '2020-07-07 05:14:48', '2020-07-07 05:14:48'),
(10, 11, 15, 2000, 30000, '2020-07-07 05:25:29', '2020-07-07 05:25:29'),
(11, 12, 10, 1000, 10000, '2020-07-07 05:28:29', '2020-07-07 05:28:29'),
(14, 16, 10, 1000, 10000, '2020-07-07 06:01:14', '2020-07-07 06:01:14');

-- --------------------------------------------------------

--
-- Table structure for table `donvi`
--

CREATE TABLE `donvi` (
  `MaDonVi` int(11) NOT NULL,
  `TenDonVi` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL ON UPDATE current_timestamp()
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
  `updated_at` timestamp NULL DEFAULT NULL ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `hoadon`
--

INSERT INTO `hoadon` (`MaHoaDon`, `MaPKB`, `TienKham`, `TienThuoc`, `created_at`, `updated_at`) VALUES
(1, 4, 50000, 320000, '2020-05-10 14:20:18', '2020-06-13 15:42:02'),
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
(25, 28, 30000, 81000, '2020-06-18 00:02:39', '2020-06-18 00:02:39'),
(27, 30, 30000, 86000, '2020-06-02 08:47:51', '2020-06-02 08:47:51'),
(28, 31, 30000, 486000, '2020-06-16 04:00:17', '2020-06-16 04:00:17'),
(29, 32, 30000, 486000, '2020-06-16 04:00:18', '2020-06-16 04:00:18'),
(30, 33, 30000, 311000, '2020-06-17 10:48:55', '2020-06-17 10:48:55'),
(31, 34, 30000, 10000, '2020-07-01 05:06:18', '2020-07-01 05:06:18'),
(32, 35, 30000, 50000, '2020-07-03 08:55:11', '2020-07-03 08:55:11'),
(33, 36, 30000, 159000, '2020-07-03 08:56:17', '2020-07-03 08:56:17'),
(34, 37, 30000, 450000, '2020-07-04 04:48:58', '2020-07-04 04:48:58'),
(35, 38, 30000, 37000, '2020-07-04 04:50:00', '2020-07-04 04:50:00'),
(36, 39, 30000, 152000, '2020-07-04 04:51:29', '2020-07-04 04:51:29'),
(37, 40, 30000, 55000, '2020-07-06 10:24:38', '2020-07-06 10:24:38'),
(38, 41, 30000, 182000, '2020-07-06 10:25:09', '2020-07-06 10:25:09'),
(39, 42, 30000, 515000, '2020-07-07 06:34:31', '2020-07-07 06:34:31');

-- --------------------------------------------------------

--
-- Table structure for table `loaibenh`
--

CREATE TABLE `loaibenh` (
  `MaLoaiBenh` tinyint(4) NOT NULL,
  `TenLoaiBenh` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL ON UPDATE current_timestamp()
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
  `updated_at` timestamp NULL DEFAULT NULL ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `phieukham`
--

INSERT INTO `phieukham` (`MaPKB`, `NgayKham`, `MaBN`, `TrieuChung`, `MaLoaiBenh`, `created_at`, `updated_at`) VALUES
(4, '2020-05-10', 3, 'Nhứt răng', 2, '2020-05-10 14:20:18', '2020-06-13 15:42:02'),
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
(28, '2020-06-18', 13, 'Sốt, nóng, đau đầu', 1, '2020-06-18 00:02:39', '2020-06-18 00:02:39'),
(30, '2020-06-02', 8, 'Ho có đàm', 5, '2020-06-02 08:47:51', '2020-06-02 08:47:51'),
(31, '2020-06-16', 12, 'Ho có đàm', 6, '2020-06-16 04:00:17', '2020-06-16 04:00:17'),
(32, '2020-06-16', 12, 'Ho có đàm', 6, '2020-06-16 04:00:18', '2020-06-16 04:00:18'),
(33, '2020-06-17', 1, 'Ho có đàm', 6, '2020-06-17 10:48:55', '2020-06-17 10:48:55'),
(34, '2020-07-01', 11, 'Ho có đàm', 6, '2020-07-01 05:06:18', '2020-07-01 05:06:18'),
(35, '2020-07-03', 11, 'Hắt hơi liên tục', 1, '2020-07-03 08:55:11', '2020-07-03 08:55:11'),
(36, '2020-07-03', 4, 'Nghẹt mũi', 6, '2020-07-03 08:56:17', '2020-07-03 08:56:17'),
(37, '2020-07-04', 10, 'Nghẹt mũi', 8, '2020-07-04 04:48:58', '2020-07-04 04:48:58'),
(38, '2020-07-04', 7, 'Hắt hơi liên tục', 7, '2020-07-04 04:50:00', '2020-07-04 04:50:00'),
(39, '2020-07-04', 4, 'Ho có đàm', 6, '2020-07-04 04:51:29', '2020-07-04 04:51:29'),
(40, '2020-07-06', 9, 'Hắt hơi liên tục', 5, '2020-07-06 10:24:38', '2020-07-06 10:24:38'),
(41, '2020-07-06', 8, 'Hắt hơi liên tục', 4, '2020-07-06 10:25:09', '2020-07-06 10:25:09'),
(42, '2020-07-07', 9, 'Nghẹt mũi', 8, '2020-07-07 06:34:31', '2020-07-07 06:34:31');

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
  `updated_at` timestamp NULL DEFAULT NULL ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `phieunhapthuoc`
--

INSERT INTO `phieunhapthuoc` (`MaPNT`, `NgayNhap`, `SoLoaiThuocNhap`, `TongTienNhap`, `created_at`, `updated_at`) VALUES
(1, '2020-06-16', 2, 1000000, '2020-06-15 21:24:40', '2020-06-15 21:24:40'),
(2, '2020-06-29', 2, 40000, '2020-06-29 00:58:46', '2020-06-29 00:58:46'),
(3, '2020-07-01', 1, 50000, '2020-07-01 05:20:03', '2020-07-01 05:20:03'),
(5, '2020-07-04', 4, 250000, '2020-07-04 04:57:01', '2020-07-04 04:57:01'),
(7, '2020-07-07', 1, 10000, '2020-07-07 05:13:11', '2020-07-07 05:13:11'),
(8, '2020-07-07', 1, 100000, '2020-07-07 05:14:48', '2020-07-07 05:14:49'),
(10, '2020-07-07', 1, 30000, '2020-07-07 05:25:29', '2020-07-07 05:25:29'),
(11, '2020-07-07', 1, 10000, '2020-07-07 05:28:29', '2020-07-07 05:28:29'),
(14, '2020-07-07', 1, 10000, '2020-07-07 06:01:14', '2020-07-07 06:01:14');

-- --------------------------------------------------------

--
-- Table structure for table `thamso`
--

CREATE TABLE `thamso` (
  `MaTS` tinyint(2) NOT NULL,
  `ThamSo` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `GiaTri` int(11) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL ON UPDATE current_timestamp()
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
  `updated_at` timestamp NULL DEFAULT NULL ON UPDATE current_timestamp()
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
  `SoLuongConLai` int(11) NOT NULL DEFAULT 0,
  `MaDonVi` int(11) NOT NULL,
  `DonGia` int(11) NOT NULL,
  `MaCachDung` int(11) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `thuoc`
--

INSERT INTO `thuoc` (`MaThuoc`, `TenThuoc`, `SoLuongConLai`, `MaDonVi`, `DonGia`, `MaCachDung`, `created_at`, `updated_at`) VALUES
(1, 'Panadol', 100, 3, 2000, 1, NULL, '2020-07-06 10:24:38'),
(2, 'Panadu', 117, 4, 3000, 4, '2020-05-09 16:54:06', '2020-07-07 06:34:31'),
(3, 'Hapacol', 95, 1, 5000, 3, '2020-05-13 06:45:54', '2020-06-17 10:48:55'),
(4, 'Tiffy', 124, 3, 7000, 1, '2020-05-15 05:31:02', '2020-07-06 10:25:09'),
(5, 'Strepsils', 94, 1, 3000, 3, '2020-06-13 14:25:08', '2020-06-17 10:48:55'),
(6, 'Calcium Corbiere', 95, 3, 30000, 1, '2020-06-13 14:29:03', '2020-07-06 10:25:09'),
(7, 'Antot IQ', 100, 6, 70000, 1, '2020-06-13 14:29:37', '2020-07-04 04:51:29'),
(8, 'Laroscorbine platinum', 110, 4, 40000, 4, '2020-06-13 14:31:37', '2020-07-07 06:34:31'),
(9, 'Ventolin', 92, 7, 120000, 5, '2020-06-13 14:33:33', '2020-06-16 04:00:18'),
(10, 'Salbutamol', 94, 1, 4000, 1, '2020-06-13 14:34:05', '2020-07-04 04:51:29'),
(11, 'Seretide evohaler DC', 120, 7, 150000, 5, '2020-06-13 14:34:29', '2020-07-07 06:34:31'),
(12, 'Axeton', 110, 7, 9000, 6, '2020-06-13 14:36:27', '2020-07-07 05:28:29'),
(13, 'Motilum M', 100, 1, 5000, 1, '2020-06-13 14:37:02', '2020-06-13 14:37:02'),
(14, 'Smecta', 100, 2, 3000, 1, '2020-06-13 14:38:14', '2020-06-13 14:38:14'),
(15, 'Oresol', 100, 2, 15000, 1, '2020-06-13 14:39:07', '2020-06-13 14:39:07'),
(16, 'Ancool 90', 130, 7, 10000, 6, '2020-06-15 17:18:10', '2020-07-07 06:01:14');

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
(1, 'Yen Mai', 'yenmai477@gmail.com', '$2y$10$s2NyFAGPEPfIUej/TzWmdek/iBQ0fiO2aSF8ky5XetFpuzFVaFMfK', 'tpFqs0lxJh0WXdQqbjx8EBMMiYJfaAUcugxbZuzcWeAilofz5dO5ICvsneq3', NULL, '2020-06-25 09:17:12');

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
  MODIFY `MaBCDT` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `baocaosudungthuoc`
--
ALTER TABLE `baocaosudungthuoc`
  MODIFY `MaBCSDT` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `benhnhan`
--
ALTER TABLE `benhnhan`
  MODIFY `MaBN` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT for table `cachdung`
--
ALTER TABLE `cachdung`
  MODIFY `MaCachDung` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `donvi`
--
ALTER TABLE `donvi`
  MODIFY `MaDonVi` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `hoadon`
--
ALTER TABLE `hoadon`
  MODIFY `MaHoaDon` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=40;

--
-- AUTO_INCREMENT for table `loaibenh`
--
ALTER TABLE `loaibenh`
  MODIFY `MaLoaiBenh` tinyint(4) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT for table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `phieukham`
--
ALTER TABLE `phieukham`
  MODIFY `MaPKB` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=43;

--
-- AUTO_INCREMENT for table `phieunhapthuoc`
--
ALTER TABLE `phieunhapthuoc`
  MODIFY `MaPNT` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

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
