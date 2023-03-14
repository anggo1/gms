-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Mar 14, 2023 at 09:51 AM
-- Server version: 10.4.24-MariaDB
-- PHP Version: 7.4.29

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `db_gms`
--

-- --------------------------------------------------------

--
-- Table structure for table `aplikasi`
--

CREATE TABLE `aplikasi` (
  `id` int(10) UNSIGNED NOT NULL,
  `nama_owner` varchar(100) DEFAULT NULL,
  `alamat` text DEFAULT NULL,
  `tlp` varchar(50) DEFAULT NULL,
  `title` varchar(20) DEFAULT NULL,
  `nama_aplikasi` varchar(100) DEFAULT NULL,
  `logo` varchar(100) DEFAULT NULL,
  `copy_right` varchar(50) DEFAULT NULL,
  `versi` varchar(20) DEFAULT NULL,
  `tahun` year(4) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `aplikasi`
--

INSERT INTO `aplikasi` (`id`, `nama_owner`, `alamat`, `tlp`, `title`, `nama_aplikasi`, `logo`, `copy_right`, `versi`, `tahun`) VALUES
(1, 'MPU', 'Jakarta - Indonesia', '0080-0000-0000', 'MPU', 'Mamera Perdana Utama', 'Quality-management-systems.jpg', 'Copy Right &copy;', '1.0.0.0', 2023);

-- --------------------------------------------------------

--
-- Table structure for table `barang`
--

CREATE TABLE `barang` (
  `id` int(11) UNSIGNED NOT NULL,
  `kdbarang` varchar(15) DEFAULT NULL,
  `nama` varchar(50) DEFAULT NULL,
  `harga` decimal(10,0) DEFAULT NULL,
  `satuan` varchar(15) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `config`
--

CREATE TABLE `config` (
  `limit_absen` varchar(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `config`
--

INSERT INTO `config` (`limit_absen`) VALUES
('10'),
('10');

-- --------------------------------------------------------

--
-- Table structure for table `history_part`
--

CREATE TABLE `history_part` (
  `id_history` int(11) NOT NULL,
  `id_pk` varchar(25) NOT NULL,
  `kode_part` varchar(25) NOT NULL,
  `nama_part` varchar(50) NOT NULL,
  `no_body` varchar(15) NOT NULL,
  `keterangan` varchar(150) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `history_part`
--

INSERT INTO `history_part` (`id_history`, `id_pk`, `kode_part`, `nama_part`, `no_body`, `keterangan`) VALUES
(3, '201608290001', 'S1350-51480              ', 'GEAR SUB ASSY                                     ', '65 ZX', 'TEST'),
(4, '201608290001', 'S1130 - 21730            ', 'COVER SUB ASSY T/G                                ', '65 ZX', 'TEST'),
(5, '201608290001', 'S3308-25160              ', 'ROD SUB ASSY GEAR CONTROL AK3HR                   ', '65 ZX', 'TEST'),
(6, '201608310003', 'SOLASIBAN                ', 'SOLASIBAN UNIBELL 0.13                            ', '48 Ra', 'ISOLASIBAN 1PCS');

-- --------------------------------------------------------

--
-- Table structure for table `history_pause`
--

CREATE TABLE `history_pause` (
  `id_pause` int(11) NOT NULL,
  `id_detail` varchar(25) NOT NULL,
  `id_pk` varchar(25) NOT NULL,
  `jam_pause` varchar(5) NOT NULL,
  `tgl_pause` date NOT NULL,
  `ket_pause` text NOT NULL,
  `persen_pk` int(11) NOT NULL,
  `status` enum('Y','N') NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `history_pending`
--

CREATE TABLE `history_pending` (
  `id_pending` int(11) NOT NULL,
  `id_detail` varchar(25) NOT NULL,
  `id_pk` varchar(25) NOT NULL,
  `jam_pending` varchar(5) NOT NULL,
  `tgl_pending` date NOT NULL,
  `ket_pending` text NOT NULL,
  `persen_pk` int(11) NOT NULL,
  `status` enum('Y','N') NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `history_pending`
--

INSERT INTO `history_pending` (`id_pending`, `id_detail`, `id_pk`, `jam_pending`, `tgl_pending`, `ket_pending`, `persen_pk`, `status`) VALUES
(1, 'PT1609049', '201609030008', '19:16', '2016-09-05', 'AMPLAS CAT PUTIH TOTAL BODY ', 70, 'N'),
(2, 'PT1609048', '201609030007', '19:19', '2016-09-05', 'AMPLAS  CAT AMPLAS BODY SAMPING R/L  DEPAN  BELAKANG  PINTU R/L DEPAN ', 50, 'N'),
(3, 'PT1609049', '201609030008', '08:30', '2016-09-06', 'MULAI', 0, 'Y'),
(4, 'PT1609048', '201609030007', '08:30', '2016-09-06', 'MULAI', 0, 'Y');

-- --------------------------------------------------------

--
-- Table structure for table `images`
--

CREATE TABLE `images` (
  `id` int(11) NOT NULL,
  `image` varchar(250) NOT NULL,
  `name` varchar(225) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `images`
--

INSERT INTO `images` (`id`, `image`, `name`) VALUES
(1, '../body_repair/PhotoUploadWithText/uploads/2016123000060.jpg', '201612300006'),
(2, '../body_repair/PhotoUploadWithText/uploads/2016123000061.jpg', '201612300006'),
(3, '../body_repair/PhotoUploadWithText/uploads/2017010600152.jpg', '201701060015'),
(4, '../body_repair/PhotoUploadWithText/uploads/2017010600153.jpg', '201701060015'),
(5, '../body_repair/PhotoUploadWithText/uploads/2017010600154.jpg', '201701060015'),
(6, '../body_repair/PhotoUploadWithText/uploads/2017010600155.jpg', '201701060015'),
(7, '../body_repair/PhotoUploadWithText/uploads/2017010600156.jpg', '201701060015'),
(8, '../body_repair/PhotoUploadWithText/uploads/20170110500167.jpg', '2017011050016'),
(9, '../body_repair/PhotoUploadWithText/uploads/20170110500168.jpg', '2017011050016'),
(10, '../body_repair/PhotoUploadWithText/uploads/20170110500169.jpg', '2017011050016'),
(11, '../body_repair/PhotoUploadWithText/uploads/201701105001610.jpg', '2017011050016'),
(12, '../body_repair/PhotoUploadWithText/uploads/20170105001611.jpg', '201701050016'),
(13, '../body_repair/PhotoUploadWithText/uploads/20170105001612.jpg', '201701050016'),
(14, '../body_repair/PhotoUploadWithText/uploads/20170105001613.jpg', '201701050016'),
(15, '../body_repair/PhotoUploadWithText/uploads/20161019001314.jpg', '201610190013'),
(16, '../body_repair/PhotoUploadWithText/uploads/20170107000415.jpg', '201701070004'),
(17, '../body_repair/PhotoUploadWithText/uploads/20170107000416.jpg', '201701070004'),
(18, '../body_repair/PhotoUploadWithText/uploads/20170109000717.jpg', '201701090007'),
(19, '../body_repair/PhotoUploadWithText/uploads/20170109000718.jpg', '201701090007'),
(20, '../body_repair/PhotoUploadWithText/uploads/20170106000619.jpg', '201701060006'),
(21, '../body_repair/PhotoUploadWithText/uploads/20170106000620.jpg', '201701060006'),
(22, '../body_repair/PhotoUploadWithText/uploads/20170113001121.jpg', '201701130011'),
(23, '../body_repair/PhotoUploadWithText/uploads/20170113001122.jpg', '201701130011'),
(24, '../body_repair/PhotoUploadWithText/uploads/20170116000223.jpg', '201701160002'),
(25, '../body_repair/PhotoUploadWithText/uploads/20170116000224.jpg', '201701160002');

-- --------------------------------------------------------

--
-- Table structure for table `jenis_file`
--

CREATE TABLE `jenis_file` (
  `id_jenis` int(11) NOT NULL,
  `jenis` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `jenis_file`
--

INSERT INTO `jenis_file` (`id_jenis`, `jenis`) VALUES
(1, '\'doc\',\'docx\',\'xls\',\'xlsx\',\'ppt\',\'pptx\',\'pdf\',\'rar\',\'zip\',\'jpg\',\'mdb\',\'mdbf\',\'txt\'');

-- --------------------------------------------------------

--
-- Table structure for table `kategori`
--

CREATE TABLE `kategori` (
  `id_kat` int(11) UNSIGNED NOT NULL,
  `nama_kat` varchar(50) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `list_mekanik`
--

CREATE TABLE `list_mekanik` (
  `id_list` int(11) NOT NULL,
  `id_pk` varchar(25) NOT NULL,
  `id_detail` varchar(25) NOT NULL,
  `nip_mk` varchar(25) NOT NULL,
  `nama_mk` varchar(35) NOT NULL,
  `jam_mulai` varchar(5) NOT NULL,
  `tgl_mulai` date NOT NULL,
  `jns_pk` varchar(30) NOT NULL,
  `ket_pk` varchar(150) NOT NULL,
  `jam_selesai` varchar(5) NOT NULL,
  `tgl_selesai` date NOT NULL,
  `jml_jam` varchar(5) NOT NULL,
  `nilai` varchar(10) NOT NULL,
  `estimasi` varchar(5) NOT NULL,
  `status` enum('Y','N') NOT NULL,
  `persen` varchar(5) NOT NULL,
  `keterangan` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `profil_system`
--

CREATE TABLE `profil_system` (
  `id` int(11) NOT NULL,
  `nama` varchar(250) NOT NULL,
  `no_reg` varchar(50) NOT NULL,
  `alamat` text NOT NULL,
  `no_telp` varchar(15) NOT NULL,
  `no_fax` varchar(15) NOT NULL,
  `email` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `profil_system`
--

INSERT INTO `profil_system` (`id`, `nama`, `no_reg`, `alamat`, `no_telp`, `no_fax`, `email`) VALUES
(1, 'BODY REPAIR ONLINE SYSTEM', '1234567890', '', '021', '', '');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_akses_menu`
--

CREATE TABLE `tbl_akses_menu` (
  `id` int(11) NOT NULL,
  `id_level` int(11) NOT NULL,
  `id_menu` int(11) NOT NULL,
  `view_level` enum('Y','N') DEFAULT 'N'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tbl_akses_menu`
--

INSERT INTO `tbl_akses_menu` (`id`, `id_level`, `id_menu`, `view_level`) VALUES
(1, 1, 1, 'Y'),
(2, 1, 2, 'Y'),
(43, 4, 1, 'Y'),
(44, 4, 2, 'N'),
(62, 5, 1, 'N'),
(63, 5, 2, 'N'),
(64, 1, 52, 'Y'),
(65, 4, 52, 'N'),
(66, 5, 52, 'N'),
(76, 1, 56, 'Y'),
(77, 4, 56, 'N'),
(78, 5, 56, 'N'),
(79, 6, 1, 'N'),
(80, 6, 2, 'N'),
(81, 6, 52, 'N'),
(85, 6, 56, 'Y'),
(86, 1, 57, 'Y'),
(87, 4, 57, 'N'),
(88, 5, 57, 'N'),
(89, 6, 57, 'N'),
(90, 7, 1, 'N'),
(91, 7, 2, 'N'),
(92, 7, 52, 'Y'),
(93, 7, 56, 'N'),
(94, 7, 57, 'N'),
(95, 1, 58, 'Y'),
(96, 4, 58, 'N'),
(97, 5, 58, 'N'),
(98, 6, 58, 'N'),
(99, 7, 58, 'N'),
(100, 1, 59, 'Y'),
(101, 4, 59, 'N'),
(102, 5, 59, 'N'),
(103, 6, 59, 'N'),
(104, 7, 59, 'N'),
(105, 1, 60, 'Y'),
(106, 4, 60, 'N'),
(107, 5, 60, 'N'),
(108, 6, 60, 'N'),
(109, 7, 60, 'N'),
(110, 1, 61, 'Y'),
(111, 4, 61, 'N'),
(112, 5, 61, 'N'),
(113, 6, 61, 'N'),
(114, 7, 61, 'N'),
(115, 1, 62, 'N'),
(116, 4, 62, 'N'),
(117, 5, 62, 'N'),
(118, 6, 62, 'Y'),
(119, 7, 62, 'N'),
(120, 1, 63, 'N'),
(121, 4, 63, 'N'),
(122, 5, 63, 'N'),
(123, 6, 63, 'N'),
(124, 7, 63, 'N'),
(125, 1, 64, 'N'),
(126, 4, 64, 'N'),
(127, 5, 64, 'N'),
(128, 6, 64, 'N'),
(129, 7, 64, 'N'),
(130, 1, 65, 'Y'),
(131, 4, 65, 'N'),
(132, 5, 65, 'N'),
(133, 6, 65, 'N'),
(134, 7, 65, 'N');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_akses_submenu`
--

CREATE TABLE `tbl_akses_submenu` (
  `id` int(11) UNSIGNED NOT NULL,
  `id_level` int(11) NOT NULL,
  `id_submenu` int(11) NOT NULL,
  `view_level` enum('Y','N') DEFAULT 'N',
  `add_level` enum('Y','N') DEFAULT 'N',
  `edit_level` enum('Y','N') DEFAULT 'N',
  `delete_level` enum('Y','N') DEFAULT 'N',
  `print_level` enum('Y','N') DEFAULT 'N',
  `upload_level` enum('Y','N') DEFAULT 'N'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tbl_akses_submenu`
--

INSERT INTO `tbl_akses_submenu` (`id`, `id_level`, `id_submenu`, `view_level`, `add_level`, `edit_level`, `delete_level`, `print_level`, `upload_level`) VALUES
(2, 1, 2, 'Y', 'Y', 'Y', 'Y', 'Y', 'Y'),
(4, 1, 1, 'Y', 'Y', 'Y', 'Y', 'Y', 'Y'),
(6, 1, 7, 'Y', 'Y', 'Y', 'Y', 'Y', 'Y'),
(7, 1, 8, 'Y', 'Y', 'Y', 'Y', 'Y', 'Y'),
(9, 1, 10, 'Y', 'Y', 'Y', 'Y', 'Y', 'Y'),
(13, 1, 14, 'Y', 'Y', 'Y', 'Y', 'Y', 'Y'),
(26, 1, 15, 'Y', 'Y', 'Y', 'Y', 'Y', 'Y'),
(30, 1, 17, 'Y', 'Y', 'Y', 'Y', 'Y', 'Y'),
(32, 1, 18, 'Y', 'Y', 'Y', 'Y', 'Y', 'Y'),
(34, 1, 19, 'Y', 'Y', 'Y', 'Y', 'Y', 'Y'),
(36, 1, 20, 'Y', 'Y', 'Y', 'Y', 'Y', 'Y'),
(59, 4, 1, 'N', 'N', 'N', 'N', 'N', 'N'),
(60, 4, 2, 'N', 'N', 'N', 'N', 'N', 'N'),
(61, 4, 7, 'N', 'N', 'N', 'N', 'N', 'N'),
(62, 4, 8, 'N', 'N', 'N', 'N', 'N', 'N'),
(63, 4, 10, 'N', 'N', 'N', 'N', 'N', 'N'),
(64, 4, 15, 'N', 'N', 'N', 'N', 'N', 'N'),
(65, 4, 17, 'N', 'N', 'N', 'N', 'N', 'N'),
(66, 4, 18, 'N', 'N', 'N', 'N', 'N', 'N'),
(67, 4, 19, 'N', 'N', 'N', 'N', 'N', 'N'),
(68, 4, 20, 'N', 'N', 'N', 'N', 'N', 'N'),
(72, 5, 1, 'N', 'N', 'N', 'N', 'N', 'N'),
(73, 5, 2, 'N', 'N', 'N', 'N', 'N', 'N'),
(74, 5, 7, 'N', 'N', 'N', 'N', 'N', 'N'),
(75, 5, 8, 'N', 'N', 'N', 'N', 'N', 'N'),
(76, 5, 10, 'N', 'N', 'N', 'N', 'N', 'N'),
(77, 5, 15, 'N', 'N', 'N', 'N', 'N', 'N'),
(78, 5, 17, 'N', 'N', 'N', 'N', 'N', 'N'),
(79, 5, 18, 'N', 'N', 'N', 'N', 'N', 'N'),
(80, 5, 19, 'N', 'N', 'N', 'N', 'N', 'N'),
(81, 5, 20, 'N', 'N', 'N', 'N', 'N', 'N'),
(82, 1, 23, 'Y', 'Y', 'Y', 'Y', 'Y', 'Y'),
(83, 4, 23, 'N', 'N', 'N', 'N', 'N', 'N'),
(84, 5, 23, 'N', 'N', 'N', 'N', 'N', 'N'),
(85, 1, 24, 'Y', 'Y', 'Y', 'Y', 'Y', 'Y'),
(86, 4, 24, 'N', 'N', 'N', 'N', 'N', 'N'),
(87, 5, 24, 'N', 'N', 'N', 'N', 'N', 'N'),
(97, 1, 28, 'Y', 'Y', 'Y', 'Y', 'Y', 'Y'),
(98, 4, 28, 'N', 'N', 'N', 'N', 'N', 'N'),
(99, 5, 28, 'N', 'N', 'N', 'N', 'N', 'N'),
(112, 1, 33, 'Y', 'Y', 'Y', 'Y', 'Y', 'Y'),
(113, 4, 33, 'N', 'N', 'N', 'N', 'N', 'N'),
(114, 5, 33, 'N', 'N', 'N', 'N', 'N', 'N'),
(115, 1, 34, 'Y', 'Y', 'Y', 'Y', 'Y', 'Y'),
(116, 4, 34, 'N', 'N', 'N', 'N', 'N', 'N'),
(117, 5, 34, 'N', 'N', 'N', 'N', 'N', 'N'),
(121, 1, 36, 'Y', 'Y', 'Y', 'Y', 'Y', 'Y'),
(122, 4, 36, 'N', 'N', 'N', 'N', 'N', 'N'),
(123, 5, 36, 'N', 'N', 'N', 'N', 'N', 'N'),
(124, 1, 37, 'Y', 'Y', 'Y', 'Y', 'Y', 'Y'),
(125, 4, 37, 'N', 'N', 'N', 'N', 'N', 'N'),
(126, 5, 37, 'N', 'N', 'N', 'N', 'N', 'N'),
(127, 1, 38, 'Y', 'Y', 'Y', 'Y', 'Y', 'Y'),
(128, 4, 38, 'N', 'N', 'N', 'N', 'N', 'N'),
(129, 5, 38, 'N', 'N', 'N', 'N', 'N', 'N'),
(139, 1, 42, 'Y', 'Y', 'Y', 'Y', 'Y', 'Y'),
(140, 4, 42, 'N', 'N', 'N', 'N', 'N', 'N'),
(141, 5, 42, 'N', 'N', 'N', 'N', 'N', 'N'),
(142, 6, 1, 'N', 'N', 'N', 'N', 'N', 'N'),
(143, 6, 2, 'N', 'N', 'N', 'N', 'N', 'N'),
(144, 6, 7, 'N', 'N', 'N', 'N', 'N', 'N'),
(145, 6, 8, 'N', 'N', 'N', 'N', 'N', 'N'),
(146, 6, 10, 'N', 'N', 'N', 'N', 'Y', 'N'),
(147, 6, 15, 'N', 'N', 'N', 'N', 'N', 'N'),
(148, 6, 17, 'N', 'N', 'N', 'N', 'N', 'N'),
(149, 6, 18, 'N', 'N', 'N', 'N', 'N', 'N'),
(150, 6, 19, 'N', 'N', 'N', 'N', 'N', 'N'),
(151, 6, 20, 'N', 'N', 'N', 'N', 'N', 'N'),
(152, 6, 23, 'N', 'N', 'N', 'N', 'N', 'N'),
(153, 6, 24, 'N', 'N', 'N', 'N', 'N', 'N'),
(157, 6, 28, 'N', 'N', 'N', 'N', 'N', 'N'),
(162, 6, 33, 'N', 'N', 'N', 'N', 'N', 'N'),
(163, 6, 34, 'N', 'N', 'N', 'N', 'N', 'N'),
(165, 6, 36, 'N', 'N', 'N', 'N', 'N', 'N'),
(166, 6, 37, 'N', 'N', 'N', 'N', 'N', 'N'),
(167, 6, 38, 'N', 'N', 'N', 'N', 'N', 'N'),
(171, 6, 42, 'Y', 'N', 'N', 'N', 'Y', 'Y'),
(172, 1, 43, 'Y', 'Y', 'Y', 'Y', 'Y', 'Y'),
(173, 4, 43, 'N', 'N', 'N', 'N', 'N', 'N'),
(174, 5, 43, 'N', 'N', 'N', 'N', 'N', 'N'),
(175, 6, 43, 'N', 'N', 'N', 'N', 'N', 'N'),
(176, 1, 44, 'Y', 'Y', 'Y', 'Y', 'Y', 'Y'),
(177, 4, 44, 'N', 'N', 'N', 'N', 'N', 'N'),
(178, 5, 44, 'N', 'N', 'N', 'N', 'N', 'N'),
(179, 6, 44, 'N', 'N', 'N', 'N', 'N', 'N'),
(180, 1, 45, 'Y', 'Y', 'Y', 'Y', 'Y', 'Y'),
(181, 4, 45, 'N', 'N', 'N', 'N', 'N', 'N'),
(182, 5, 45, 'N', 'N', 'N', 'N', 'N', 'N'),
(183, 6, 45, 'N', 'N', 'N', 'N', 'N', 'N'),
(192, 1, 48, 'Y', 'Y', 'Y', 'Y', 'Y', 'Y'),
(193, 4, 48, 'N', 'N', 'N', 'N', 'N', 'N'),
(194, 5, 48, 'N', 'N', 'N', 'N', 'N', 'N'),
(195, 6, 48, 'Y', 'Y', 'Y', 'Y', 'Y', 'Y'),
(208, 1, 52, 'Y', 'Y', 'Y', 'Y', 'Y', 'Y'),
(209, 4, 52, 'N', 'N', 'N', 'N', 'N', 'N'),
(210, 5, 52, 'N', 'N', 'N', 'N', 'N', 'N'),
(211, 6, 52, 'Y', 'Y', 'Y', 'Y', 'Y', 'Y'),
(212, 7, 1, 'N', 'N', 'N', 'N', 'N', 'N'),
(213, 7, 2, 'N', 'N', 'N', 'N', 'N', 'N'),
(214, 7, 7, 'N', 'N', 'N', 'N', 'N', 'N'),
(215, 7, 8, 'N', 'N', 'N', 'N', 'N', 'N'),
(216, 7, 10, 'N', 'N', 'N', 'N', 'N', 'N'),
(217, 7, 15, 'N', 'N', 'N', 'N', 'N', 'N'),
(218, 7, 17, 'N', 'N', 'N', 'N', 'N', 'N'),
(219, 7, 18, 'N', 'N', 'N', 'N', 'N', 'N'),
(220, 7, 19, 'N', 'N', 'N', 'N', 'N', 'N'),
(221, 7, 20, 'N', 'N', 'N', 'N', 'N', 'N'),
(222, 7, 23, 'Y', 'N', 'N', 'N', 'N', 'N'),
(223, 7, 24, 'Y', 'N', 'N', 'N', 'N', 'N'),
(227, 7, 28, 'Y', 'N', 'N', 'N', 'N', 'N'),
(232, 7, 33, 'Y', 'N', 'N', 'N', 'N', 'N'),
(233, 7, 34, 'Y', 'N', 'N', 'N', 'N', 'N'),
(234, 7, 36, 'Y', 'N', 'N', 'N', 'N', 'N'),
(235, 7, 37, 'Y', 'N', 'N', 'N', 'N', 'N'),
(236, 7, 38, 'Y', 'N', 'N', 'N', 'N', 'N'),
(239, 7, 42, 'N', 'N', 'N', 'N', 'N', 'N'),
(240, 7, 43, 'N', 'N', 'N', 'N', 'N', 'N'),
(241, 7, 44, 'N', 'N', 'N', 'N', 'N', 'N'),
(242, 7, 45, 'N', 'N', 'N', 'N', 'N', 'N'),
(245, 7, 48, 'N', 'N', 'N', 'N', 'N', 'N'),
(249, 7, 52, 'N', 'N', 'N', 'N', 'N', 'N'),
(250, 1, 53, 'Y', 'Y', 'Y', 'Y', 'Y', 'N'),
(251, 4, 53, 'N', 'N', 'N', 'N', 'N', 'N'),
(252, 5, 53, 'N', 'N', 'N', 'N', 'N', 'N'),
(253, 6, 53, 'N', 'N', 'N', 'N', 'N', 'N'),
(254, 7, 53, 'N', 'N', 'N', 'N', 'N', 'N'),
(275, 1, 58, 'Y', 'Y', 'Y', 'Y', 'N', 'N'),
(276, 4, 58, 'N', 'N', 'N', 'N', 'N', 'N'),
(277, 5, 58, 'N', 'N', 'N', 'N', 'N', 'N'),
(278, 6, 58, 'N', 'N', 'N', 'N', 'N', 'N'),
(279, 7, 58, 'N', 'N', 'N', 'N', 'N', 'N'),
(280, 1, 59, 'Y', 'Y', 'Y', 'Y', 'N', 'N'),
(281, 4, 59, 'N', 'N', 'N', 'N', 'N', 'N'),
(282, 5, 59, 'N', 'N', 'N', 'N', 'N', 'N'),
(283, 6, 59, 'N', 'N', 'N', 'N', 'N', 'N'),
(284, 7, 59, 'N', 'N', 'N', 'N', 'N', 'N'),
(285, 1, 60, 'Y', 'Y', 'Y', 'Y', 'N', 'N'),
(286, 4, 60, 'N', 'N', 'N', 'N', 'N', 'N'),
(287, 5, 60, 'N', 'N', 'N', 'N', 'N', 'N'),
(288, 6, 60, 'Y', 'N', 'N', 'N', 'N', 'N'),
(289, 7, 60, 'N', 'N', 'N', 'N', 'N', 'N'),
(295, 1, 62, 'Y', 'Y', 'Y', 'Y', 'N', 'N'),
(296, 4, 62, 'N', 'N', 'N', 'N', 'N', 'N'),
(297, 5, 62, 'N', 'N', 'N', 'N', 'N', 'N'),
(298, 6, 62, 'N', 'N', 'N', 'N', 'N', 'N'),
(299, 7, 62, 'N', 'N', 'N', 'N', 'N', 'N'),
(300, 1, 63, 'Y', 'Y', 'Y', 'Y', 'N', 'N'),
(301, 4, 63, 'N', 'N', 'N', 'N', 'N', 'N'),
(302, 5, 63, 'N', 'N', 'N', 'N', 'N', 'N'),
(303, 6, 63, 'N', 'N', 'N', 'N', 'N', 'N'),
(304, 7, 63, 'N', 'N', 'N', 'N', 'N', 'N'),
(305, 1, 64, 'Y', 'Y', 'Y', 'Y', 'N', 'N'),
(306, 4, 64, 'N', 'N', 'N', 'N', 'N', 'N'),
(307, 5, 64, 'N', 'N', 'N', 'N', 'N', 'N'),
(308, 6, 64, 'N', 'N', 'N', 'N', 'N', 'N'),
(309, 7, 64, 'N', 'N', 'N', 'N', 'N', 'N'),
(310, 1, 65, 'Y', 'Y', 'Y', 'Y', 'N', 'N'),
(311, 4, 65, 'N', 'N', 'N', 'N', 'N', 'N'),
(312, 5, 65, 'N', 'N', 'N', 'N', 'N', 'N'),
(313, 6, 65, 'N', 'N', 'N', 'N', 'N', 'N'),
(314, 7, 65, 'N', 'N', 'N', 'N', 'N', 'N'),
(315, 1, 66, 'Y', 'Y', 'Y', 'Y', 'N', 'N'),
(316, 4, 66, 'N', 'N', 'N', 'N', 'N', 'N'),
(317, 5, 66, 'N', 'N', 'N', 'N', 'N', 'N'),
(318, 6, 66, 'N', 'N', 'N', 'N', 'N', 'N'),
(319, 7, 66, 'N', 'N', 'N', 'N', 'N', 'N'),
(320, 1, 67, 'Y', 'Y', 'Y', 'Y', 'N', 'N'),
(321, 4, 67, 'N', 'N', 'N', 'N', 'N', 'N'),
(322, 5, 67, 'N', 'N', 'N', 'N', 'N', 'N'),
(323, 6, 67, 'N', 'N', 'N', 'N', 'N', 'N'),
(324, 7, 67, 'N', 'N', 'N', 'N', 'N', 'N'),
(325, 1, 68, 'Y', 'Y', 'Y', 'Y', 'N', 'N'),
(326, 4, 68, 'N', 'N', 'N', 'N', 'N', 'N'),
(327, 5, 68, 'N', 'N', 'N', 'N', 'N', 'N'),
(328, 6, 68, 'N', 'N', 'N', 'N', 'N', 'N'),
(329, 7, 68, 'N', 'N', 'N', 'N', 'N', 'N'),
(330, 1, 69, 'Y', 'Y', 'Y', 'Y', 'N', 'N'),
(331, 4, 69, 'N', 'N', 'N', 'N', 'N', 'N'),
(332, 5, 69, 'N', 'N', 'N', 'N', 'N', 'N'),
(333, 6, 69, 'N', 'N', 'N', 'N', 'N', 'N'),
(334, 7, 69, 'N', 'N', 'N', 'N', 'N', 'N'),
(335, 1, 70, 'Y', 'N', 'N', 'N', 'N', 'N'),
(336, 4, 70, 'N', 'N', 'N', 'N', 'N', 'N'),
(337, 5, 70, 'N', 'N', 'N', 'N', 'N', 'N'),
(338, 6, 70, 'N', 'N', 'N', 'N', 'N', 'N'),
(339, 7, 70, 'N', 'N', 'N', 'N', 'N', 'N'),
(340, 1, 71, 'Y', 'N', 'N', 'N', 'N', 'N'),
(341, 4, 71, 'N', 'N', 'N', 'N', 'N', 'N'),
(342, 5, 71, 'N', 'N', 'N', 'N', 'N', 'N'),
(343, 6, 71, 'N', 'N', 'N', 'N', 'N', 'N'),
(344, 7, 71, 'N', 'N', 'N', 'N', 'N', 'N'),
(345, 1, 72, 'Y', 'Y', 'Y', 'Y', 'N', 'N'),
(346, 4, 72, 'N', 'N', 'N', 'N', 'N', 'N'),
(347, 5, 72, 'N', 'N', 'N', 'N', 'N', 'N'),
(348, 6, 72, 'N', 'N', 'N', 'N', 'N', 'N'),
(349, 7, 72, 'N', 'N', 'N', 'N', 'N', 'N'),
(350, 1, 73, 'Y', 'Y', 'Y', 'Y', 'N', 'N'),
(351, 4, 73, 'N', 'N', 'N', 'N', 'N', 'N'),
(352, 5, 73, 'N', 'N', 'N', 'N', 'N', 'N'),
(353, 6, 73, 'N', 'N', 'N', 'N', 'N', 'N'),
(354, 7, 73, 'N', 'N', 'N', 'N', 'N', 'N'),
(355, 1, 74, 'Y', 'Y', 'Y', 'Y', 'N', 'N'),
(356, 4, 74, 'N', 'N', 'N', 'N', 'N', 'N'),
(357, 5, 74, 'N', 'N', 'N', 'N', 'N', 'N'),
(358, 6, 74, 'N', 'N', 'N', 'N', 'N', 'N'),
(359, 7, 74, 'N', 'N', 'N', 'N', 'N', 'N'),
(360, 1, 75, 'Y', 'Y', 'N', 'N', 'N', 'N'),
(361, 4, 75, 'N', 'N', 'N', 'N', 'N', 'N'),
(362, 5, 75, 'N', 'N', 'N', 'N', 'N', 'N'),
(363, 6, 75, 'N', 'N', 'N', 'N', 'N', 'N'),
(364, 7, 75, 'N', 'N', 'N', 'N', 'N', 'N'),
(365, 1, 76, 'Y', 'Y', 'Y', 'N', 'N', 'N'),
(366, 4, 76, 'N', 'N', 'N', 'N', 'N', 'N'),
(367, 5, 76, 'N', 'N', 'N', 'N', 'N', 'N'),
(368, 6, 76, 'N', 'N', 'N', 'N', 'N', 'N'),
(369, 7, 76, 'N', 'N', 'N', 'N', 'N', 'N'),
(370, 1, 77, 'Y', 'Y', 'Y', 'N', 'N', 'N'),
(371, 4, 77, 'N', 'N', 'N', 'N', 'N', 'N'),
(372, 5, 77, 'N', 'N', 'N', 'N', 'N', 'N'),
(373, 6, 77, 'N', 'N', 'N', 'N', 'N', 'N'),
(374, 7, 77, 'N', 'N', 'N', 'N', 'N', 'N'),
(375, 1, 78, 'Y', 'Y', 'Y', 'N', 'N', 'N'),
(376, 4, 78, 'N', 'N', 'N', 'N', 'N', 'N'),
(377, 5, 78, 'N', 'N', 'N', 'N', 'N', 'N'),
(378, 6, 78, 'N', 'N', 'N', 'N', 'N', 'N'),
(379, 7, 78, 'N', 'N', 'N', 'N', 'N', 'N'),
(380, 1, 79, 'Y', 'Y', 'Y', 'Y', 'N', 'N'),
(381, 4, 79, 'N', 'N', 'N', 'N', 'N', 'N'),
(382, 5, 79, 'N', 'N', 'N', 'N', 'N', 'N'),
(383, 6, 79, 'N', 'N', 'N', 'N', 'N', 'N'),
(384, 7, 79, 'N', 'N', 'N', 'N', 'N', 'N'),
(385, 1, 80, 'Y', 'Y', 'Y', 'N', 'N', 'N'),
(386, 4, 80, 'N', 'N', 'N', 'N', 'N', 'N'),
(387, 5, 80, 'N', 'N', 'N', 'N', 'N', 'N'),
(388, 6, 80, 'N', 'N', 'N', 'N', 'N', 'N'),
(389, 7, 80, 'N', 'N', 'N', 'N', 'N', 'N'),
(390, 1, 81, 'Y', 'Y', 'Y', 'Y', 'N', 'N'),
(391, 4, 81, 'N', 'N', 'N', 'N', 'N', 'N'),
(392, 5, 81, 'N', 'N', 'N', 'N', 'N', 'N'),
(393, 6, 81, 'N', 'N', 'N', 'N', 'N', 'N'),
(394, 7, 81, 'N', 'N', 'N', 'N', 'N', 'N');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_br_bast`
--

CREATE TABLE `tbl_br_bast` (
  `id_bast` varchar(15) NOT NULL,
  `tgl_bast` date NOT NULL,
  `no_sj` varchar(35) NOT NULL,
  `no_body` varchar(10) NOT NULL,
  `no_pol` varchar(10) NOT NULL,
  `nip_sp` varchar(15) NOT NULL,
  `nama_sp` varchar(35) NOT NULL,
  `status_bus` enum('AKTIF','PASIF') NOT NULL,
  `status` enum('N','Y') NOT NULL,
  `keterangan` varchar(255) NOT NULL,
  `user` varchar(35) NOT NULL,
  `kaca_depan` varchar(35) NOT NULL,
  `kaca_belakang` varchar(35) NOT NULL,
  `kc_kanan` enum('1','0') NOT NULL,
  `kc_kiri` enum('1','0') NOT NULL,
  `sp_kanan` enum('1','0') NOT NULL,
  `sp_kiri` enum('1','0') DEFAULT NULL,
  `sp_dalam` enum('1','0') DEFAULT NULL,
  `body_depan` enum('1','0') DEFAULT NULL,
  `bemper_depan` enum('1','0') DEFAULT NULL,
  `body_kiri` enum('1','0') DEFAULT NULL,
  `body_kanan` enum('1','0') DEFAULT NULL,
  `body_belakang` enum('1','0') DEFAULT NULL,
  `bemper_belakang` enum('1','0') DEFAULT NULL,
  `pintu_dp_lh` enum('1','0') DEFAULT NULL,
  `pintu_dp_rh` enum('1','0') DEFAULT NULL,
  `pintu_bl_lh` enum('1','0') DEFAULT NULL,
  `lp_dp_lh` enum('1','0') DEFAULT NULL,
  `lp_dp_rh` enum('1','0') DEFAULT NULL,
  `lp_stop_bl_lh` enum('1','0') DEFAULT NULL,
  `lp_stop_bl_rh` enum('1','0') DEFAULT NULL,
  `lp_sbl_lh` enum('1','0') DEFAULT NULL,
  `lp_sbl_rh` enum('1','0') DEFAULT NULL,
  `lp_sdp_lh` enum('1','0') DEFAULT NULL,
  `lp_sdp_rh` enum('1','0') DEFAULT NULL,
  `lp_s_samping` enum('1','0') DEFAULT NULL,
  `lp_plat_no` enum('1','0') DEFAULT NULL,
  `kursi_pp` enum('1','0') DEFAULT NULL,
  `kursi_png` enum('1','0') DEFAULT NULL,
  `sabuk_p` enum('1','0') DEFAULT NULL,
  `footrest` enum('1','0') DEFAULT NULL,
  `sarung_jok` enum('1','0') DEFAULT NULL,
  `gorden` enum('1','0') DEFAULT NULL,
  `tmp_sampah` enum('1','0') DEFAULT NULL,
  `smoking` enum('1','0') DEFAULT NULL,
  `toilet_kaca` enum('1','0') DEFAULT NULL,
  `plafon` enum('1','0') DEFAULT NULL,
  `palu_kaca` enum('1','0') DEFAULT NULL,
  `bagasi_atas` enum('1','0') DEFAULT NULL,
  `lp_dalam` enum('1','0') DEFAULT NULL,
  `p3k` enum('1','0') DEFAULT NULL,
  `segitiga` enum('1','0') DEFAULT NULL,
  `pewangi_ruang` enum('1','0') DEFAULT NULL,
  `pewangi_toilet` enum('1','0') DEFAULT NULL,
  `bangku_tabahan` enum('1','0') DEFAULT NULL,
  `pipa_pegang` enum('1','0') DEFAULT NULL,
  `tutup_radiator` enum('1','0') DEFAULT NULL,
  `unit_ac` enum('1','0') DEFAULT NULL,
  `kursi_kernet` enum('1','0') DEFAULT NULL,
  `spedometer` enum('1','0') DEFAULT NULL,
  `tutup_seat` enum('1','0') DEFAULT NULL,
  `gundu_persneling` enum('1','0') DEFAULT NULL,
  `tabung_air_wiper` enum('1','0') DEFAULT NULL,
  `accu` enum('1','0') DEFAULT NULL,
  `tutup_solar` enum('1','0') DEFAULT NULL,
  `wheel_dop` enum('1','0') DEFAULT NULL,
  `wiper` enum('1','0') DEFAULT NULL,
  `ban_stip` enum('1','0') DEFAULT NULL,
  `engkol_ban` enum('1','0') DEFAULT NULL,
  `klakson` enum('1','0') DEFAULT NULL,
  `knalpot` enum('1','0') DEFAULT NULL,
  `kompresor` enum('1','0') DEFAULT NULL,
  `altenator` enum('1','0') DEFAULT NULL,
  `alternator_ac` enum('1','0') DEFAULT NULL,
  `control_panel` enum('1','0') DEFAULT NULL,
  `kap_gembok_kunci` enum('1','0') DEFAULT NULL,
  `stik_oli` enum('1','0') DEFAULT NULL,
  `tutup_oli` enum('1','0') DEFAULT NULL,
  `dinamo_wiper` enum('1','0') DEFAULT NULL,
  `dongkrak_stang` enum('1','0') DEFAULT NULL,
  `kc_roda_stang` enum('1','0') DEFAULT NULL,
  `dashboard` enum('1','0') DEFAULT NULL,
  `sikring_kaca` enum('1','0') DEFAULT NULL,
  `radio_tape` enum('1','0') DEFAULT NULL,
  `video` enum('1','0') DEFAULT NULL,
  `kaset` enum('1','0') DEFAULT NULL,
  `tv` enum('1','0') DEFAULT NULL,
  `remote` enum('1','0') DEFAULT NULL,
  `inverter` enum('1','0') DEFAULT NULL,
  `equalizer` enum('1','0') DEFAULT NULL,
  `mic` enum('1','0') DEFAULT NULL,
  `speaker` enum('1','0') DEFAULT NULL,
  `power` enum('1','0') DEFAULT NULL,
  `subwofer` enum('1','0') DEFAULT NULL,
  `surat` enum('1','0') DEFAULT NULL,
  `stnk` enum('1','0') DEFAULT NULL,
  `kps` enum('1','0') DEFAULT NULL,
  `keur` enum('1','0') DEFAULT NULL,
  `bintang_mercy` enum('1','0') DEFAULT NULL,
  `plat_no` enum('1','0') DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tbl_br_bast`
--

INSERT INTO `tbl_br_bast` (`id_bast`, `tgl_bast`, `no_sj`, `no_body`, `no_pol`, `nip_sp`, `nama_sp`, `status_bus`, `status`, `keterangan`, `user`, `kaca_depan`, `kaca_belakang`, `kc_kanan`, `kc_kiri`, `sp_kanan`, `sp_kiri`, `sp_dalam`, `body_depan`, `bemper_depan`, `body_kiri`, `body_kanan`, `body_belakang`, `bemper_belakang`, `pintu_dp_lh`, `pintu_dp_rh`, `pintu_bl_lh`, `lp_dp_lh`, `lp_dp_rh`, `lp_stop_bl_lh`, `lp_stop_bl_rh`, `lp_sbl_lh`, `lp_sbl_rh`, `lp_sdp_lh`, `lp_sdp_rh`, `lp_s_samping`, `lp_plat_no`, `kursi_pp`, `kursi_png`, `sabuk_p`, `footrest`, `sarung_jok`, `gorden`, `tmp_sampah`, `smoking`, `toilet_kaca`, `plafon`, `palu_kaca`, `bagasi_atas`, `lp_dalam`, `p3k`, `segitiga`, `pewangi_ruang`, `pewangi_toilet`, `bangku_tabahan`, `pipa_pegang`, `tutup_radiator`, `unit_ac`, `kursi_kernet`, `spedometer`, `tutup_seat`, `gundu_persneling`, `tabung_air_wiper`, `accu`, `tutup_solar`, `wheel_dop`, `wiper`, `ban_stip`, `engkol_ban`, `klakson`, `knalpot`, `kompresor`, `altenator`, `alternator_ac`, `control_panel`, `kap_gembok_kunci`, `stik_oli`, `tutup_oli`, `dinamo_wiper`, `dongkrak_stang`, `kc_roda_stang`, `dashboard`, `sikring_kaca`, `radio_tape`, `video`, `kaset`, `tv`, `remote`, `inverter`, `equalizer`, `mic`, `speaker`, `power`, `subwofer`, `surat`, `stnk`, `kps`, `keur`, `bintang_mercy`, `plat_no`) VALUES
('SA20230311001', '2023-03-11', '12345', 'RG100/170', 'B7654YY', '1234', 'Saya', 'AKTIF', 'Y', 'test', 'Administrator', '1', '1', '1', '1', '1', '1', '1', '1', '1', '1', '1', '1', '1', '1', '1', '1', '1', '1', '1', '1', '1', '1', '1', '1', '1', '1', '1', '1', '1', '1', '1', '1', '1', '1', '1', '1', '1', '1', '1', '1', '1', '1', '1', '1', '1', '1', '1', '1', '1', '1', '1', '1', '1', '1', '1', '1', '1', '1', '1', '1', '1', '1', '1', '1', '1', '1', '1', '1', '1', '1', '1', '1', '1', '1', '1', '1', '1', '1', '1', '1', '1', '1', '1', '1', '1', '1', '1', '1', '1'),
('SA20230311002', '2023-03-11', '123456', 'RG100/171', 'B7653H', '1234', 'test', 'AKTIF', 'Y', 'Test Keterangan', 'Administrator', '1', '1', '1', '1', '1', '1', '1', '1', '1', '1', '1', '1', '1', '1', '1', '1', '1', '1', '1', '1', '1', '1', '1', '1', '1', '1', '1', '1', '1', '1', '1', '1', '1', '1', '1', '1', '1', '1', '1', '1', '1', '1', '1', '1', '1', '1', '1', '1', '1', '1', '1', '1', '1', '1', '1', '1', '1', '1', '1', '1', '1', '1', '1', '1', '1', '1', '1', '1', '1', '1', '1', '1', '1', '1', '1', '1', '1', '1', '1', '1', '1', '1', '1', '1', '1', '1', '1', '1', '1'),
('SA20230313001', '2023-03-13', '1234', 'RG100/T25', 'B12345', '1234', 'test', 'AKTIF', 'Y', 'test', 'Administrator', '1', '1', '1', '1', '1', '1', '1', '1', '1', '1', '1', '1', '1', '1', '1', '1', '1', '1', '1', '1', '1', '1', '1', '1', '1', '1', '1', '1', '1', '1', '1', '1', '1', '1', '1', '1', '1', '1', '1', '1', '1', '1', '1', '1', '1', '1', '1', '1', '1', '1', '1', '1', '1', '1', '1', '1', '1', '1', '1', '1', '1', '1', '1', '1', '1', '1', '1', '1', '1', '1', '1', '1', '1', '1', '1', '1', '1', '1', '1', '1', '1', '1', '1', '1', '1', '1', '1', '1', '1'),
('SA20230314001', '2023-03-14', 'test', 'RG100/T25', 'B12345', '123', 'saya', 'AKTIF', 'Y', 'test', 'Administrator', '1', '1', '1', '1', '1', '1', '1', '1', '1', '1', '1', '1', '1', '1', '1', '1', '1', '1', '1', '1', '1', '1', '1', '1', '1', '1', '1', '1', '1', '1', '1', '1', '1', '1', '1', '1', '1', '1', '1', '1', '1', '1', '1', '1', '1', '1', '1', '1', '1', '1', '1', '1', '1', '1', '1', '1', '1', '1', '1', '1', '1', '1', '1', '1', '1', '1', '1', '1', '1', '1', '1', '1', '1', '1', '1', '1', '1', '1', '1', '1', '1', '1', '1', '1', '1', '1', '1', '1', '1');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_br_bay`
--

CREATE TABLE `tbl_br_bay` (
  `id_bay` int(11) NOT NULL,
  `keterangan` varchar(150) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_br_bay`
--

INSERT INTO `tbl_br_bay` (`id_bay`, `keterangan`) VALUES
(1, ''),
(2, ''),
(3, ''),
(4, 'RG100/171'),
(5, ''),
(6, ''),
(7, ''),
(8, ''),
(9, ''),
(10, ''),
(11, ''),
(12, ''),
(13, ''),
(14, ''),
(15, 'RG100/170'),
(16, ''),
(17, ''),
(18, ''),
(19, ''),
(20, ''),
(21, ''),
(22, ''),
(23, ''),
(24, ''),
(25, ''),
(26, ''),
(27, ''),
(28, ''),
(29, ''),
(30, ''),
(31, '');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_br_detail_estimasi`
--

CREATE TABLE `tbl_br_detail_estimasi` (
  `id_detail` int(11) NOT NULL,
  `id_lapor` varchar(25) NOT NULL,
  `tgl_estimasi` date NOT NULL,
  `no_body` varchar(10) NOT NULL,
  `biaya` decimal(35,0) NOT NULL,
  `jns_pk` varchar(25) NOT NULL,
  `no_part` varchar(50) NOT NULL,
  `nama_part` varchar(50) NOT NULL,
  `ket_part` varchar(50) NOT NULL,
  `jml_part` varchar(5) NOT NULL,
  `hrg_part` decimal(10,0) NOT NULL,
  `user` varchar(35) NOT NULL,
  `status` enum('N','Y') NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tbl_br_detail_estimasi`
--

INSERT INTO `tbl_br_detail_estimasi` (`id_detail`, `id_lapor`, `tgl_estimasi`, `no_body`, `biaya`, `jns_pk`, `no_part`, `nama_part`, `ket_part`, `jml_part`, `hrg_part`, `user`, `status`) VALUES
(1, 'SPK20230311001', '2023-03-11', 'RG100/170', '500000', 'RB', 'ML1312-2148', 'PISAU ONLY UNTUK POTONG VINYL ', 'test', '5', '10000', 'Administrator', 'Y'),
(2, 'SPK20230311001', '2023-03-11', 'RG100/170', '0', 'RB', '12345', 'test', 'test', '5', '5000', 'Administrator', 'Y'),
(3, 'SPK20230311001', '2023-03-11', 'RG100/170', '50000', 'DC', 'BH-01R', 'BUZZER 12-48V DC 110dB ', 'test', '3', '85000', 'Administrator', 'Y'),
(4, 'SPK20230311001', '2023-03-11', 'RG100/170', '100000', 'TE', 'ML1312-2144', 'STICKER REFLEKTOR-SCOUTLIGHT WARNA KUNING ', 'test', '5', '300000', 'Administrator', 'Y'),
(5, 'SPK20230311002', '2023-03-11', 'RG100/171', '500000', 'DC', '12345', 'test', 'test', '4', '5000', 'Administrator', 'Y'),
(6, 'SPK20230311002', '2023-03-11', 'RG100/171', '1000000', 'TE', 'ML1312-2148', 'PISAU ONLY UNTUK POTONG VINYL ', 'test', '5', '10000', 'Administrator', 'Y'),
(7, 'SPK20230311002', '2023-03-11', 'RG100/171', '400000', 'TI', 'BH-01R', 'BUZZER 12-48V DC 110dB ', '', '4', '85000', 'Administrator', 'Y'),
(18, 'SPK20230311001', '2023-03-13', 'RG100/170', '50000', 'FE', '90916-T2030', 'V. BELT V-RIBBED TOYOTA VIOS ', 'test', '1', '286000', 'Administrator', 'Y'),
(19, 'SPK20230313001', '2023-03-14', 'RG100/T25', '500000', 'RB', 'ML1312-2148', 'PISAU ONLY UNTUK POTONG VINYL ', 'test', '5', '10000', 'Administrator', 'Y'),
(20, 'SPK20230313001', '2023-03-14', 'RG100/T25', '0', 'RB', 'BH-01R', 'BUZZER 12-48V DC 110dB ', '', '2', '85000', 'Administrator', 'Y'),
(21, '', '2023-03-14', '', '1', 'RB', 'ML1312-2148', 'PISAU ONLY UNTUK POTONG VINYL ', 'TEST', '2', '10000', 'Administrator', 'Y'),
(22, 'SPK20230314001', '2023-03-14', 'RG100/T25', '50000', 'RB', 'ML1312-2148', 'PISAU ONLY UNTUK POTONG VINYL ', 'test', '5', '10000', 'Administrator', 'Y');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_br_detail_pk`
--

CREATE TABLE `tbl_br_detail_pk` (
  `id_detail` int(11) NOT NULL,
  `tgl_estimasi` date NOT NULL,
  `no_body` varchar(10) NOT NULL,
  `acc` varchar(35) NOT NULL,
  `jns_pk` varchar(25) NOT NULL,
  `no_part` varchar(50) NOT NULL,
  `nama_part` varchar(50) NOT NULL,
  `ket_part` varchar(50) NOT NULL,
  `hrg_part` decimal(10,0) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `tbl_br_kategori`
--

CREATE TABLE `tbl_br_kategori` (
  `id_kategori` int(11) NOT NULL,
  `kategori` varchar(25) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tbl_br_kategori`
--

INSERT INTO `tbl_br_kategori` (`id_kategori`, `kategori`) VALUES
(1, 'Perbaikan Ringan'),
(2, 'Perbaikan Sedang'),
(3, 'Perbaikan Berat');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_br_kat_pk`
--

CREATE TABLE `tbl_br_kat_pk` (
  `id` int(11) NOT NULL,
  `kode` varchar(50) NOT NULL,
  `keterangan` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_br_kat_pk`
--

INSERT INTO `tbl_br_kat_pk` (`id`, `kode`, `keterangan`) VALUES
(1, 'RB', 'Welding'),
(2, 'DC', 'DEMPUL CAT'),
(3, 'TE', 'TRIMMING EKSTERIOR'),
(4, 'TI', 'TRIMMING INTERIOR'),
(5, 'FE', 'FINISHING ELEKTRIk'),
(6, 'AV', 'AUDIO VIDEO'),
(7, 'BM', 'BODY MAINTENANCE '),
(8, 'PF', 'PROTOTYPE '),
(9, 'FG', 'FIBER GLASS '),
(10, 'CH', 'CHASSIS'),
(11, 'OB', 'OPERATOR BORONGAN '),
(12, 'CEP', 'CAT EPOXY PRIMER '),
(13, 'UM', 'UTILITY MAINTENANCE'),
(14, 'TK', 'TEHNIK ');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_br_kelas`
--

CREATE TABLE `tbl_br_kelas` (
  `id_kelas` int(11) NOT NULL,
  `kelas` varchar(35) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tbl_br_kelas`
--

INSERT INTO `tbl_br_kelas` (`id_kelas`, `kelas`) VALUES
(3, 'AC 2-2');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_br_ket_lapor`
--

CREATE TABLE `tbl_br_ket_lapor` (
  `id` int(11) NOT NULL,
  `kode` varchar(5) NOT NULL,
  `keterangan` varchar(25) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tbl_br_ket_lapor`
--

INSERT INTO `tbl_br_ket_lapor` (`id`, `kode`, `keterangan`) VALUES
(2, 'BM', 'Body Maintenance'),
(3, 'PB', 'Perbaikan Body');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_br_laporan_bus`
--

CREATE TABLE `tbl_br_laporan_bus` (
  `id_lapor` varchar(15) NOT NULL,
  `tgl_masuk` date NOT NULL,
  `jam_masuk` varchar(5) NOT NULL,
  `id_bast` varchar(35) NOT NULL,
  `no_body` varchar(10) NOT NULL,
  `no_pol` varchar(10) NOT NULL,
  `nip_sp` varchar(8) NOT NULL,
  `nama_sp` varchar(35) NOT NULL,
  `ket_lapor` varchar(30) NOT NULL,
  `kategori` varchar(50) NOT NULL,
  `keterangan` varchar(150) NOT NULL,
  `status_body` enum('AKTIF','PASIF') NOT NULL,
  `user` varchar(35) NOT NULL,
  `status` enum('N','Y','S') NOT NULL,
  `estimasi` enum('N','Y') NOT NULL,
  `no_bay` varchar(3) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_br_laporan_bus`
--

INSERT INTO `tbl_br_laporan_bus` (`id_lapor`, `tgl_masuk`, `jam_masuk`, `id_bast`, `no_body`, `no_pol`, `nip_sp`, `nama_sp`, `ket_lapor`, `kategori`, `keterangan`, `status_body`, `user`, `status`, `estimasi`, `no_bay`) VALUES
('SPK20230311001', '2023-03-11', '', 'SA20230311001', 'RG100/170', 'B7654YY', '1234', 'Saya', '2', '3', 'test', 'AKTIF', 'Administrator', 'Y', 'Y', '15'),
('SPK20230311002', '2023-03-11', '', 'SA20230311002', 'RG100/171', 'B7653H', '1234', 'test', '2', '3', 'test', 'AKTIF', 'Administrator', 'Y', 'Y', '4'),
('SPK20230313001', '2023-03-13', '', 'SA20230313001', 'RG100/T25', 'B12345', '1234', 'test', '2', '3', 'test', 'AKTIF', 'Administrator', 'S', 'Y', '1'),
('SPK20230314001', '2023-03-14', '', 'SA20230314001', 'RG100/T25', 'B12345', '123', 'saya', '2', '3', 'test', 'AKTIF', 'Administrator', 'Y', 'Y', '');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_br_pk_aktif`
--

CREATE TABLE `tbl_br_pk_aktif` (
  `id_pk` varchar(30) NOT NULL,
  `id_lapor` varchar(35) NOT NULL,
  `no_body` varchar(25) NOT NULL,
  `jns_pk` varchar(35) NOT NULL,
  `ket_pk` text NOT NULL,
  `tgl_mulai` date NOT NULL,
  `jam_mulai` varchar(5) NOT NULL,
  `status` enum('Y','P','S') NOT NULL,
  `biaya_borong` decimal(10,0) NOT NULL,
  `pt_pemborong` varchar(50) NOT NULL,
  `pj_borong` varchar(50) NOT NULL,
  `jam_pause` varchar(5) NOT NULL,
  `jam_start` varchar(5) NOT NULL,
  `tgl_pause` date NOT NULL,
  `tgl_start` date NOT NULL,
  `ket_pause` text NOT NULL,
  `tgl_selesai` date NOT NULL,
  `jam_selesai` varchar(5) NOT NULL,
  `no_bay` varchar(2) NOT NULL,
  `lokasi` varchar(25) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_br_pk_aktif`
--

INSERT INTO `tbl_br_pk_aktif` (`id_pk`, `id_lapor`, `no_body`, `jns_pk`, `ket_pk`, `tgl_mulai`, `jam_mulai`, `status`, `biaya_borong`, `pt_pemborong`, `pj_borong`, `jam_pause`, `jam_start`, `tgl_pause`, `tgl_start`, `ket_pause`, `tgl_selesai`, `jam_selesai`, `no_bay`, `lokasi`) VALUES
('PK20230311001', 'SPK20230311001', 'RG100/170', 'DC', 'DEMPUL CAT', '2023-03-11', '23:10', 'S', '500000', 'pt.saya', 'saya', '', '', '0000-00-00', '0000-00-00', '', '2023-03-11', '18:55', '', ''),
('PK20230311002', 'SPK20230311001', 'RG100/170', 'RB', 'Welding', '2023-03-11', '23:10', 'S', '100000', 'saya', 'sayaa', '08:52', '04:10', '2023-03-12', '2023-03-14', 'test', '2023-03-14', '04:10', '', ''),
('PK20230311003', 'SPK20230311002', 'RG100/171', 'DC', 'DEMPUL CAT', '2023-03-11', '23:44', 'Y', '500000', '', 'saya', '', '', '0000-00-00', '0000-00-00', '', '0000-00-00', '', '', ''),
('PK20230311004', 'SPK20230311001', 'RG100/170', 'TE', 'TRIMMING EKSTERIOR', '2023-03-11', '23:45', 'Y', '1000000', '', 'saya', '', '', '0000-00-00', '0000-00-00', '', '0000-00-00', '', '', ''),
('PK20230311005', 'SPK20230311002', 'RG100/171', 'TE', 'TRIMMING EKSTERIOR', '2023-03-11', '23:50', 'Y', '1500000', '', 'sayaa', '', '', '0000-00-00', '0000-00-00', '', '0000-00-00', '', '', ''),
('PK20230311006', 'SPK20230311001', 'RG100/170', 'RB', 'Welding', '2023-03-11', '23:50', 'Y', '500000', '', 'saya lagi', '', '', '0000-00-00', '0000-00-00', '', '0000-00-00', '', '', ''),
('PK20230311007', 'SPK20230311002', 'RG100/171', 'TI', 'TRIMMING INTERIOR', '2023-03-11', '', 'Y', '100000', '', 'saya', '', '', '0000-00-00', '0000-00-00', '', '0000-00-00', '', '', ''),
('PK20230313001', 'SPK20230311001', 'RG100/170', 'FE', 'FINISHING ELEKTRIk', '2023-03-13', '08-03', 'Y', '50000', 'saya', 'saya', '', '', '0000-00-00', '0000-00-00', '', '0000-00-00', '', '', ''),
('PK20230314001', 'SPK20230313001', 'RG100/T25', 'RB', 'Welding', '2023-03-14', '09:40', 'S', '1000000', 'sya', 'saya', '', '', '0000-00-00', '0000-00-00', '', '2023-03-14', '08:45', '', ''),
('PK20230314002', '', '', 'RB', 'Welding', '2023-03-14', '08-03', 'Y', '1', '', 'SAYA', '', '', '0000-00-00', '0000-00-00', '', '0000-00-00', '', '', ''),
('PK20230314003', 'SPK20230314001', 'RG100/T25', 'RB', 'Welding', '2023-03-14', '14:36', 'Y', '50000', 'saya', 'Saya', '', '', '0000-00-00', '0000-00-00', '', '0000-00-00', '', '', '');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_hrd_cuti_pegawai`
--

CREATE TABLE `tbl_hrd_cuti_pegawai` (
  `id_cuti` int(11) NOT NULL,
  `nip` varchar(25) NOT NULL,
  `tgl_cuti` date NOT NULL,
  `status_cuti` varchar(5) NOT NULL,
  `alasan` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `tbl_hrd_data_absen`
--

CREATE TABLE `tbl_hrd_data_absen` (
  `id` int(10) NOT NULL,
  `pin` int(10) NOT NULL,
  `date_time` datetime NOT NULL,
  `ver` int(10) NOT NULL,
  `status` int(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `tbl_hrd_departement`
--

CREATE TABLE `tbl_hrd_departement` (
  `id_departement` int(3) NOT NULL,
  `departement` varchar(30) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_hrd_departement`
--

INSERT INTO `tbl_hrd_departement` (`id_departement`, `departement`) VALUES
(1, 'Personalia'),
(2, 'Operasi'),
(3, 'Teknik'),
(4, 'Keuangan'),
(5, 'Logistik'),
(6, 'Karoseri'),
(8, 'Sinar Express'),
(9, 'HUMASKUM'),
(10, 'EKSPEDISI'),
(11, 'MARKETING'),
(12, 'VULKANISIR'),
(13, 'GPS'),
(14, 'GPS'),
(15, 'KANTOR PUSAT'),
(16, 'Panjaitan'),
(17, 'Tukang Bangunan'),
(18, 'TOP'),
(20, 'Mitra Lapangan');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_hrd_jabatan`
--

CREATE TABLE `tbl_hrd_jabatan` (
  `id_jabatan` int(11) NOT NULL,
  `jabatan` varchar(100) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_hrd_jabatan`
--

INSERT INTO `tbl_hrd_jabatan` (`id_jabatan`, `jabatan`) VALUES
(26, 'Kepala Bagian'),
(27, 'Penanggung Jawab'),
(44, 'DalOps'),
(46, 'Staff Adm'),
(47, 'Supervisor'),
(48, 'Leader'),
(67, 'Operator'),
(68, 'BAST'),
(69, 'MEKANIK'),
(70, 'ADM LOGISTIK'),
(71, 'in driver'),
(72, 'ASS KA.BAG'),
(73, 'SECURITY'),
(75, 'TRIMING INTERIOR'),
(76, 'TRIMING EXTERIOR'),
(77, 'KASIR'),
(78, 'ASS.PJ'),
(79, 'MIN.HUKUM'),
(80, 'STAFF UMUM'),
(81, 'OB'),
(82, 'STAFF'),
(84, 'ASS. PAINTING'),
(85, 'PAINTING'),
(106, 'OPERASIONAL KONTROL'),
(87, 'BODY MAINTENANCE'),
(88, 'CHECKER Keuangan'),
(89, 'WELDING'),
(90, 'LAS RB'),
(91, 'TK LAS'),
(94, 'PROTOTIPE'),
(93, 'W.O'),
(95, 'KOPLING'),
(96, 'SERVICE BAN'),
(97, 'LAS KOMPONEN'),
(98, 'RADIATOR SERVICE ACC'),
(99, 'TIKETING'),
(100, 'adm. penerimaan'),
(101, 'ADM. KEUANGAN'),
(102, 'ADM. PENDAPATAN'),
(103, 'PJ SHIFT KASIR'),
(104, 'ADM. GUDANG KECIL'),
(105, 'ADM. OPERASI'),
(107, 'PJ ADM. HUKUM'),
(108, 'ADM. MUTASI'),
(109, 'SPV BANGUNAN'),
(110, 'STAFF PERSONALIA'),
(111, 'OPERATOR MESIN'),
(112, 'PJ. TIKETING'),
(113, 'DAL OP'),
(114, 'KEPALA URUSAN'),
(115, 'PIRODO'),
(116, 'Ka.Sub.Sie.Ops'),
(117, 'Tools Keeper'),
(118, 'ASS. OPR. FIBERGLASS'),
(119, 'MEK. AUDIO VIDEO'),
(120, 'RECEPTIONIS'),
(121, 'UTILITY MAINTENANCE'),
(122, 'EDP'),
(123, 'ADVISOR'),
(124, 'SEKERTARIS DIREKTUR UTAMA'),
(125, 'SEKERTARIS PIMPINAN PERUSAHAAN'),
(126, 'ASS. MANAGER TEKNIK'),
(127, 'ADM. PERSONALIA'),
(128, 'ADM. UMUM'),
(129, 'Ka.Bag.Keuangan'),
(130, 'Ka.Bag.Karoseri'),
(131, 'Ka.bag.Operasi'),
(132, 'Ka.Bag.Logistik'),
(133, 'Ka.bag.Teknik'),
(134, 'PLH.Ka.Bag.Personalia'),
(135, 'Direktur Utama'),
(136, 'Pimpinan Perusahaan'),
(137, 'Ka.Bag.Ekspedisi'),
(138, 'PLH.Ka.Bag.Humaskum'),
(139, 'TK. CUCI BUS'),
(140, 'TECHNICAL ENGINEERING'),
(141, 'MEK. ELEKTRIK'),
(142, 'ASS. PENDAPATAN'),
(143, 'ASS. PENERIMAAN'),
(144, 'DISPATCHER'),
(145, 'OPERATOR SOPIR FORKLIFT & BACKHO LOADER'),
(146, 'MIN. OPS'),
(147, 'PLH. PJ. BUS KOTA'),
(148, 'PLH KOORD'),
(149, 'ASS. TK. LAS'),
(150, 'MONITOR BANGUNAN'),
(152, 'KAUR. KEUANGAN'),
(153, 'INJECTION PUMP'),
(154, 'DANRU SATPAM'),
(155, 'ADM. MINTARAN'),
(156, 'TECHNICAL SUPPORT'),
(158, 'MITRA KERJA'),
(159, 'CHEKER PENUMPANG '),
(160, 'OPERATOR PAKET'),
(161, 'ADM.OPS.BOBOTSARI'),
(162, 'ASS.PJ'),
(163, 'Fiber Glass'),
(164, 'Pengemudi Dalam'),
(165, 'Perbaikan Audio Video'),
(166, 'Customer Service Officer'),
(167, 'PJ. Marketing'),
(169, 'Wakil PJ. Terminal'),
(170, 'PJ. Terminal'),
(171, 'CRO'),
(172, 'PJ.LAP.TERMINAL'),
(173, 'Ass. Driver'),
(174, 'STAFF TRANSIT'),
(176, 'PENGEMUDI'),
(177, 'SERVICE ACCU'),
(178, 'KEPALA PRODUKSI'),
(179, 'WAKIL KEPALA PRODUKSI'),
(180, 'PORTER'),
(181, 'Staff OST'),
(182, 'PJ Terminal Wonogiri'),
(183, 'Mekanik Chasssis&Repair'),
(184, 'Staff Logistik'),
(185, 'PJ Wisata Jawa tengah'),
(186, 'Mekanik AC'),
(187, 'Mekanik Componen'),
(188, 'Adm.Paket'),
(189, 'PJ.Terminal Banjarnegara'),
(190, 'Adm.Teknik'),
(191, 'Tiketing&Adm.Terminal Bekasi'),
(192, 'Supervisor Sales'),
(193, 'Sales'),
(194, 'ASS.Manager'),
(195, 'Finance'),
(196, 'Adm.Crew Bus'),
(197, 'PJ.Terminal Guwangan Yogyakarta'),
(198, 'Mekanik General'),
(199, 'PJ.Chek Point'),
(200, 'PJ.Hukum Personalia '),
(201, 'Adm.Service'),
(202, 'Leader Utility Maintenance Umum'),
(203, 'Ass.Teknik Komputer'),
(204, 'Work Order'),
(205, 'Leader Welding Body'),
(206, 'Leader Welding Chassis'),
(207, 'Ass.PJ.Komuter/SS'),
(208, 'PJ.Analis dan Litbang'),
(209, 'PJ.Comuter'),
(210, 'PJ.Rencana&Pengembangan Operasi'),
(211, 'Staff Trafiic'),
(212, 'STAFF HUMASKUM'),
(213, 'Wakil Check Point dan PJT'),
(214, 'Adm.Commuter'),
(215, 'PJ Monitoring'),
(216, 'PJ. Operasi'),
(217, 'Pengendali Operasi'),
(218, 'PJ. Inventori Control'),
(219, 'Plt Ka.Bag.Operasi'),
(220, 'PJ Information Technology'),
(221, 'Ass. Commuter Line'),
(222, 'Petugas Listirk'),
(223, 'Perawat Bangunan'),
(224, 'Staff Monitoring'),
(225, 'ADM. GPS'),
(226, 'Koordinator Satpam'),
(227, 'PJ. ADM'),
(228, 'PJ. Keuangan Sinar Express'),
(229, 'Adm. TOP Pusat'),
(230, 'Asst. Welder'),
(231, 'Tukang Bangunan'),
(232, 'FEEDER'),
(233, 'Staff Markom'),
(234, 'Suster'),
(302, 'STAFF OPERASIONAL'),
(301, 'Pramudi'),
(300, 'Pramudi'),
(299, 'Pramudi'),
(308, 'Operasional'),
(312, 'Mekanik Mesin'),
(309, 'Petugas Kebersihan'),
(278, 'Mahasiswa magang'),
(310, 'Marketing Paket'),
(314, 'Staff Analis & Litbang');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_hrd_kodecuti`
--

CREATE TABLE `tbl_hrd_kodecuti` (
  `id_kodecuti` int(11) NOT NULL,
  `kode` varchar(25) NOT NULL,
  `nama_cuti` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tbl_hrd_kodecuti`
--

INSERT INTO `tbl_hrd_kodecuti` (`id_kodecuti`, `kode`, `nama_cuti`) VALUES
(2, 'M', 'Mangkir');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_hrd_mesin`
--

CREATE TABLE `tbl_hrd_mesin` (
  `id` int(11) NOT NULL,
  `ip` varchar(25) NOT NULL,
  `pass` varchar(5) NOT NULL,
  `nama_mesin` varchar(25) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tbl_hrd_mesin`
--

INSERT INTO `tbl_hrd_mesin` (`id`, `ip`, `pass`, `nama_mesin`) VALUES
(1, '192.168.0.202', '0', 'X100-C');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_hrd_pegawai`
--

CREATE TABLE `tbl_hrd_pegawai` (
  `nip` varchar(12) NOT NULL,
  `nipa` varchar(5) NOT NULL,
  `nama_panggilan` varchar(25) NOT NULL,
  `nama_depan` varchar(25) NOT NULL,
  `nama_belakang` varchar(25) NOT NULL,
  `gelar` varchar(8) NOT NULL,
  `gelardepan` varchar(5) NOT NULL,
  `kelamin` varchar(10) NOT NULL,
  `tgl_lahir` date NOT NULL,
  `tempat_lahir` varchar(30) NOT NULL,
  `agama` varchar(25) NOT NULL,
  `s_kawin` varchar(15) NOT NULL,
  `status_nikah` varchar(25) NOT NULL,
  `alamat` varchar(100) NOT NULL,
  `kodepos` varchar(8) NOT NULL,
  `email` varchar(50) NOT NULL,
  `no_hp` varchar(15) NOT NULL,
  `pendidikan` varchar(20) NOT NULL,
  `warganegara` varchar(25) NOT NULL,
  `tinggi` varchar(5) NOT NULL,
  `berat` varchar(5) NOT NULL,
  `darah` varchar(8) NOT NULL,
  `tgl_masuk` date NOT NULL,
  `status_kerja` varchar(25) NOT NULL,
  `jabatan` varchar(25) NOT NULL,
  `departement` varchar(50) NOT NULL,
  `penempatan` varchar(50) NOT NULL,
  `no_ktp` varchar(40) NOT NULL,
  `npwp` varchar(40) NOT NULL,
  `jamsostek` varchar(30) NOT NULL,
  `catatan1` varchar(150) NOT NULL,
  `catatan2` varchar(150) NOT NULL,
  `foto` varchar(50) NOT NULL,
  `status` varchar(35) NOT NULL,
  `file_ktp` varchar(50) DEFAULT NULL,
  `file_kk` varchar(50) DEFAULT NULL,
  `file_ijazah` varchar(50) DEFAULT NULL,
  `file_npwp` varchar(50) DEFAULT NULL,
  `file_lain` varchar(50) DEFAULT NULL,
  `image` varchar(500) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_hrd_pegawai`
--

INSERT INTO `tbl_hrd_pegawai` (`nip`, `nipa`, `nama_panggilan`, `nama_depan`, `nama_belakang`, `gelar`, `gelardepan`, `kelamin`, `tgl_lahir`, `tempat_lahir`, `agama`, `s_kawin`, `status_nikah`, `alamat`, `kodepos`, `email`, `no_hp`, `pendidikan`, `warganegara`, `tinggi`, `berat`, `darah`, `tgl_masuk`, `status_kerja`, `jabatan`, `departement`, `penempatan`, `no_ktp`, `npwp`, `jamsostek`, `catatan1`, `catatan2`, `foto`, `status`, `file_ktp`, `file_kk`, `file_ijazah`, `file_npwp`, `file_lain`, `image`) VALUES
('900521', 'SJ', 'ASEP', 'ASEP', 'NUROJAT', '', '', 'Pria', '1993-05-22', 'KARAWANG', '', '', 'Nikah', 'KR.BAKAN BUAH RT 02/01 DS.KALANG SURYA KEC.RENGAS DENGKLOK', '', '', '085883711878', '59', 'IINDONESIA', '163', '55', '', '0000-00-00', 'KONTRAK', '', '', '13', '3215062205900001', '878814805408000', '09024967052', '', '', 'foto_tbl_pegawai/IMAG0596.JPG', 'AKTIF', '', '', '', '', '', ''),
('8205044', 'SJ', 'Sarip', 'Saripudin', '', 'S.T', '', 'Pria', '1982-05-10', 'Bekasi', 'ISLAM', 'K/1', 'Nikah', 'Kp. Pulo Ceger Jl. Usup RT.06/03 Jakasetia - Bekasi Selatan', '17147', 'saripudin@sinarjayagroup.co.id', '082213360863', '1', '101', '165', '62', 'A', '2009-11-01', 'Kontrak', '', '', '13', '3275041005820019', '57.305.333.7-432.000', '10010176963', '', '', 'foto_tbl_pegawai/DSC_0040.JPG', 'OFF', '', '', '', '', '', ''),
('8411034', 'SJ', 'NOVI', 'NOVI', 'WINDIYANTO', 'S.Si', '', 'Pria', '1984-11-21', 'WONOGIRI', 'ISLAM', 'K/1', 'Nikah', 'KP. DUKUH RT/RW 02/10 BINTARA JAYA BEKASI BARAT', '', 'novi_w@sinarjayagroup.co.id', '087782424555', '1', '101', '167', '70', '0', '2009-04-01', 'TETAP', '27', '1', '1', '3275022111840031', '696974534008000', '09015039150', '', '', 'foto_tbl_pegawai/novi copy.jpg', 'AKTIF', '', '', '', '', '', ''),
('8407009', 'SJ', 'SUGI', 'SUGIARNO', '', '', '', 'Pria', '1984-07-25', 'KARAWANG', 'ISLAM', 'K/1', 'Nikah', 'DSN.NYANGKOKOT. DS.WANASARI. KEC.TELUK JAMBE RT.07/04', '41361', '', '087741571652', '8', '101', '170', '71', '', '2002-04-01', 'KONTRAK', '106', '2', '76', '3215272507840002', '697267003408000', '04KE0386029', '', '', '', 'AKTIF', '', '', '', '', '', ''),
('8211013', 'SJ', 'TRISNO', 'SUTRISNO', '', '', '', 'Pria', '1982-11-01', 'BATANG', 'ISLAM', 'K/1', 'Nikah', 'PERUMAHAN PERMATA SARI INDAH BLOK H/07 KARAWANG', '', '', '087779313245', '54', '101', '', '', '', '2004-05-21', 'KONTRAK', '69', '3', '1', '3215260111820003', '697266237501000', '04KE0411280', '', '', 'foto_tbl_pegawai/', 'AKTIF', '', '', '', '', '', ''),
('7912007', 'SJ', 'RUDI', 'RUDI', '', '', '', 'Pria', '1979-12-12', 'SUKABUMI', 'ISLAM', '', 'Nikah', 'PERUM KIRANA CBT BLOK 08/33 RT 005/023 KEL. WANAJAYA . CIBITUNG', '17520', '', '085777210250', '50', '101', '170', '50', '', '2002-01-06', 'KONTRAK', '69', '3', '1', '3216071212790008', '686690280413000', '02KE0101901', '', '', 'foto_tbl_pegawai/', 'AKTIF', '', '', '', '', '', ''),
('8410058', 'SJ', 'KARDI', 'KARDI', 'WIRANATA', '', '', 'Pria', '1984-10-05', 'BEKASI', 'ISLAM', '', 'Nikah', 'KP.PABUARAN RT.001/002 DS.CIMUNING KEC.MUSTIKA JAYA. BEKASI', '17520', '', '081385769441', '54', '101', '165', '70', '', '2011-11-02', 'KONTRAK', '69', '3', '1', '3275110510840006', '870428786432000', '12007876407', '', '', 'foto_tbl_pegawai/', 'AKTIF', '', '', '', '', '', ''),
('9311053', 'SJ', 'KOMAR', 'KOMARUDIN', '', '', '', 'Pria', '1993-11-28', 'BREBES', 'ISLAM', '', 'Lajang', 'DS.CIGOBANG RT.01/06 KEDUNG OLENG KEC.PAGUYANGAN KAB. BREBES', '52276', '', '085640697693', '54', '101', '', '', 'A', '2013-01-07', 'KONTRAK', '69', '3', '1', '3329042811930001', '98.660.754.7-501.000', '', '', '', 'foto_tbl_pegawai/', 'AKTIF', '', '', '', '', '', ''),
('8911020', 'SJ', 'IMAM', 'IMAM', 'NOVIANTO', '', '', 'Pria', '1989-11-28', 'JAKARTA', 'ISLAM', '', 'Lajang', 'JLN. JEMBATAN LAMA RT. 009/07 NO.15 KEL. MAKASAR KEC. MAKASAR JAKARTA TIMUR', '13570', '', '08567549030', '54', '101', '165', '57', 'AB', '2009-05-06', 'KONTRAK', '82', '5', '1', '3175082811890003', '672612330005000', '09019642744', '', '', 'foto_tbl_pegawai/', 'OFF', '', '', '', '', '', ''),
('8501038', 'SJ', 'DADAN', 'DADAN ', 'KURNIAWAN', '', '', 'Pria', '1985-01-27', 'GARUT', 'ISLAM', 'K/1', 'Nikah', 'JL. KEMANDORAN RT.001/022', '17148', '', '081388582575', '53', '101', '160', '65', '', '2009-05-04', 'KONTRAK', '69', '3', '1', '3216082701850001', '67.052.264.8-413.000', '', '', '', 'foto_tbl_pegawai/', 'AKTIF', '', '', '', '', '', ''),
('7905016', 'SJ', 'MURSANI', 'MURSANI', '', '', '', 'Pria', '1979-05-07', 'BEKASI', 'ISLAM', 'K/2', 'Nikah', 'KP. PULO TIGA RT.05/03 DS. BANJARSARI SUKATANI. BEKASI', '17635', '', '087882739100', '54', '101', '155', '47', '', '2004-08-26', 'KONTRAK', '69', '3', '1', '3216150705790009', '686690058414000', '04KE0515445', '', '', 'foto_tbl_pegawai/', 'AKTIF', '', '', '', '', '', ''),
('8201008', 'SJ', '', 'MUSLIKIN', '', '', '', 'Pria', '1982-01-21', 'MAJALENGKA', 'ISLAM', 'K/2', 'Nikah', 'DS. PANINGKIRAN KEC. SUMBERJAYA BLOK IV RT.003/004', '45455', '', '081288290879', '54', '101', '165', '58', '', '2002-08-26', 'KONTRAK', '69', '3', '1', '3210172101820021', '686690082438000', '02KE0326813', '', '', 'foto_tbl_pegawai/', 'AKTIF', '', '', '', '', '', ''),
('7904002', 'SJ', 'DODO', 'DODO', 'SUHENDA', '', '', 'Pria', '1979-04-14', 'KUNINGAN', 'ISLAM', 'K/2', 'Nikah', 'KEL.WINDUHERANG RT.10/4 KEC.CIGUGUR KAB.KUNINGAN', '', '', '085885532902', '53', '101', '165', '55', 'O', '1999-08-30', 'KONTRAK', '69', '3', '1', '3208181404790001', '686691262438000', '00K10016861', '', '', 'foto_tbl_pegawai/', 'AKTIF', '', '', '', '', '', ''),
('7006005', 'SJ', 'Rusmana', 'Rusmana', '', '', '', 'Pria', '1970-06-13', 'Lebak', 'ISLAM', 'K/2', 'Nikah', 'Kp. Kapuk Rt/Rw. 003/004 Ds. Gandasari Kec. Cikarang Barat Kab. Bekasi ', '17520', '', '081383323014', '53', '101', '', '', '', '1996-02-28', 'TETAP', '48', '3', '1', '3216081306700011', '68.669.034.8-413.000', '96k10315196', '', '', 'foto_tbl_pegawai/', 'AKTIF', '', '', '', '', '', ''),
('8211029', 'SJ', 'Eko', 'Eko', 'Nugroho', 'Amd', '', 'Pria', '1982-11-12', 'Bantul', 'ISLAM', '', 'Nikah', 'Kersana 05/03 Kersana Brebes', '52264', '', '081911478949', '2', '101', '', '', 'o', '2006-10-03', 'Kontrak', '48', '3', '1', 'Sim: 821114310007', '68.669.134.6-501.000', '05 ke 0418894', '', '', 'foto_tbl_pegawai/', 'AKTIF', '', '', '', '', '', ''),
('9302025', 'SJ', 'Wiwit', 'Wiwit', 'Ade Saputra', '', '', 'Pria', '1993-02-10', 'Purbalingga', 'ISLAM', '', 'Lajang', 'Rawana Rt/Rw 013/004, Karangmoncol, Purbalingga', '53355', '', '081903101015', '54', '101', '', '', '', '2011-11-02', 'Kontrak', '69', '3', '1', '3303121002930002', '468807367529000', '12007876399', '', '', 'foto_tbl_pegawai/', 'AKTIF', '', '', '', '', '', ''),
('7707010', 'SJ', 'Lulus', 'Lulus Amin', 'Supriyanto', '', '', 'Pria', '1977-07-09', 'Banjarnegara', 'ISLAM', '', 'Nikah', 'Perum Telaga Murni Blok C 28/04 A, Cikarang Barat, Bekasi', '', '', '085782308094, 0', '54', '101', '', '', '', '2004-08-24', 'Kontrak', '69', '3', '1', '3216080907770010', '68.668.990.2413.000', '04KE0515429', '', '', 'foto_tbl_pegawai/', 'AKTIF', '', '', '', '', '', ''),
('8508005', 'SJ', 'Agus', 'Agus', 'Rudianto', '', '', 'Pria', '1985-08-03', 'Kebumen', 'ISLAM', '', 'Nikah', 'Bumiagung Rt/Rw 02/01 Kebumen, Jawa Tengah', '54472', '', '083872722127', '54', '101', '', '', '', '2004-04-19', 'Kontrak', '69', '3', '1', '3305170308850001', '68.669.077.7.523.000', '04KG0411314', '', '', 'foto_tbl_pegawai/', 'AKTIF', '', '', '', '', '', ''),
('7408023', 'SJ', 'Wahab', 'Aba', 'Wahab', '', '', 'Pria', '1974-08-17', 'Bogor', 'ISLAM', 'K/2', 'Nikah', 'Perum. Kirana Cibitung Blok 07 no. 37 ', '', '', '081212606917', '53', '101', '', '', '', '2007-04-17', 'Kontrak', '69', '3', '1', '3216071708740013', '69.726.652.6.403.000', '07003234478', '', '', 'foto_tbl_pegawai/', 'AKTIF', '', '', '', '', '', ''),
('6904024', 'SJ', 'SUGENG', 'SUGENG', 'PRIHATIN', '', '', 'Pria', '1969-04-04', 'BANYUMAS', 'ISLAM', 'K/3', 'Nikah', 'PERUM MAYANGGI PRATAMA BLOK F7/16 RT. 10/08 MUSTIKA SARI, BEKASI', '17167', '', '02197916383', '8', '101', '170', '69', 'O', '2005-11-22', 'KONTRAK', '69', '3', '1', '3275110404690005', '686690538432000', '06KE0092580', '', '', 'foto_tbl_pegawai/', 'AKTIF', '', '', '', '', '', ''),
('6908017', 'SJ', 'AGUS', 'AGUS', 'PURWASIT', '', '', 'Pria', '1969-08-17', 'KEDIRI', 'ISLAM', 'K/3', 'Nikah', 'PERUM KIRIANA BLOK P.4 NO.13 CIBITUNG', '17520', '', '085717192374', '54', '101', '170', '70', '', '2004-08-21', 'KONTRAK', '69', '3', '1', '3313011708690001', '697266369528000', '04KE0515395', '', '', 'foto_tbl_pegawai/', 'AKTIF', '', '', '', '', '', ''),
('6512008', 'SJ', 'PAK MUS', 'MUSLIH', '', '', '', 'Pria', '1965-12-01', 'BANJARNEGARA', 'ISLAM', 'K/2', 'Nikah', 'PARAKANCANGGAH RT/RW 003/006, KEC. BANJARNEGARA, KAB. BANJARNEGARA', '53412', '', '085291345792', '53', '101', '165', '65', 'B', '1996-03-10', 'KONTRAK', '48', '3', '21', '330406011265000', '68.669.007.4-529.000', '96K10315204', '', '', 'foto_tbl_pegawai/', 'AKTIF', '', '', '', '', '', ''),
('7008010', 'SJ', 'OHIM', 'OHIM', 'ROHIMIN', '', '', 'Pria', '1970-08-17', 'CIAMIS', 'ISLAM', 'K/4', 'Nikah', 'PERUM GMM BLOK J6 NO.6 KEC.SETU KAB. BEKASI', '175322', '', '081311351246', '59', '101', '162', '68', 'O', '1997-12-26', 'TETAP', '69', '3', '4', '3216181708700006', '683627608413000', '98K10089821', '', '', 'foto_tbl_pegawai/', 'AKTIF', '', '', '', '', '', ''),
('7303011', 'SJ', 'EKO', 'EKO', 'SUMARDI PADMODJO', 'AMD.T', '', 'Pria', '1973-02-23', 'SOLO', 'ISLAM', '', 'Nikah', 'JL. PINUS RT/RW. 02/20 N0. 24 PAMULANG TIMUR, PAMULANG, TANGSEL', '15417', '', '08128560194', '2', '101', '', '', '', '2003-09-15', 'KONTRAK', '69', '3', '1', '3674062203730002', '686691361016000', '04KE0017343', '', '', 'foto_tbl_pegawai/', 'AKTIF', '', '', '', '', '', ''),
('7703005', 'SJ', 'ENDI', 'ENDI', '', '', '', 'Pria', '1977-03-04', 'KUNINGAN', 'ISLAM', 'K/2', 'Nikah', 'DS. GANDASARI KEC. CIKARANG BARAT KAB. BEKASI, RT/RW 02/05', '17530', '', '085693081373', '53', '101', '163', '52', '', '1999-10-21', 'KONTRAK', '69', '3', '1', '3208090403770001', '686691403413000', '00K10208437', '', '', 'foto_tbl_pegawai/', 'AKTIF', '', '', '', '', '', ''),
('8312010', 'SJ', 'SIGIT', 'SIGIT', 'PRIYADI', '', '', 'Pria', '1983-12-20', 'BANYUMAS', '', '', 'Nikah', 'KP. BEDENG RT. 08/04 DS KARANGMULYA KEC.BOJONG MANGU, BEKASI', '', '', '087804365575', '8', '101', '', '', '', '2004-05-21', 'KONTRAK', '69', '3', '1', '3216232012830003', '686690447521000', '04KE0411306', '', '', 'foto_tbl_pegawai/', 'AKTIF', '', '', '', '', '', ''),
('6809002', 'SJ', 'HAMID', 'EMID', 'HAMID', '', '', 'Pria', '1968-09-12', 'KUNINGAN', 'ISLAM', 'k/4', 'Nikah', 'LING PAHING RT. 09/03 KEL. PURWAWINANGUN KEC. KUNINGAN JAWA BARAT', '', '', '085691106154', '53', '101', '', '', '', '1991-01-15', 'KONTRAK', '48', '3', '1', '3208091209680001', '686691387438000', '94K10296672', '', '', 'foto_tbl_pegawai/', 'AKTIF', '', '', '', '', '', ''),
('6105003', 'SJ', 'KUWATNO', 'KUWATNO', '', '', '', 'Pria', '1961-05-20', 'KLATEN', 'ISLAM', 'k/3', 'Nikah', 'KP. SILUMAN RT. 1/18 NO.37 DS. MANGUN JAYA KEC.TAMBUN SELATAN,BEKASI', '17510', '', '081287271861', '54', '101', '', '', 'O', '1995-06-26', 'KONTRAK', '93', '3', '1', '3216062005610001', '686689878435000', '95K10566964', '', '', 'foto_tbl_pegawai/', 'AKTIF', '', '', '', '', '', ''),
('7609005', 'SJ', 'MUH', 'MUHRODIN', '', '', '', 'Pria', '1976-09-22', 'PURWOREJO', 'ISLAM', 'K/3', 'Nikah', 'BEKASI REGENSI 2 BLOK 006 NO.67 WANASARI,CIBITUNG', '17520', '', '085312882076', '53', '101', '167', '58', 'B', '1998-08-26', 'KONTRAK', '69', '3', '1', '3216072209760008', '686690033435000', '95K10102091', '', '', 'foto_tbl_pegawai/', 'AKTIF', '', '', '', '', '', ''),
('8307070', 'SJ', 'AMBON', 'MUHAMAD', 'SANUSI', '', '', 'Pria', '1983-07-12', 'BEKASI', 'ISLAM', 'K/1', 'Nikah', 'KP. TAPAK SERANG RT 08/04 DS. LENGAH JAYA KEC. CABANG BUNGIN, BEKASI', '17720', 'sanusi756@mail.com', '087887391826', '54', '101', '165', '65', 'A', '2005-04-14', 'KONTRAK', '146', '2', '2', '321616120783001', '686690009414000', '05KE0300480', '', '', 'foto_tbl_pegawai/ambon.jpg', 'OFF', '', '', '', '', '', ''),
('6907011', 'SJ', 'USUP', 'USUP', 'SUPRIYATNA', '', '', 'Pria', '1969-07-03', 'BOGOR', 'ISLAM', 'k/2', 'Nikah', 'DS. GANDASARI RT. 003/004 KP. MARIUK KEC. CIKARANG BARAT ', '17520', '', '087879489452', '50', '101', '', '', 'O', '2000-05-04', 'KONTRAK', '71', '3', '1', '3213071006820001', '686689373413000', '00K10647764', '', '', 'foto_tbl_pegawai/', 'OFF', '', '', '', '', '', ''),
('7908034', 'SJ', 'UDIN', 'PASEKHUDIN', '', '', '', 'Pria', '1979-08-04', 'TEGAL', 'ISLAM', 'K/0', 'Nikah', 'PERUMAHAN KIRANA CIBITUNG BLOK L1 NO. 09, BEKASI', '17520', '', '081388703145', '54', '101', '163', '65', 'O', '2009-08-01', 'KONTRAK', '69', '3', '1', '3275020408790019', '878814771407000', '09024966997', '', '', 'foto_tbl_pegawai/', 'AKTIF', '', '', '', '', '', ''),
('9111032', 'SJ', 'SULMAN', 'SULMAN', '', '', '', 'Pria', '1991-11-12', 'KEBUMEN', 'ISLAM', '', 'Lajang', 'RT/RW 02/03 TLOGO PRAGOTO, MIRIT, KEBUMEN', '54394', '', '081352831458', '54', '101', '155', '44', 'A', '2011-06-15', 'KONTRAK', '69', '3', '1', '3305081211910002', '971030523523000', '11030912080', '', '', 'foto_tbl_pegawai/', 'AKTIF', '', '', '', '', '', ''),
('8205041', 'SJ', 'TRI', 'TRI', 'DARYANTO', '', '', 'Pria', '1982-05-11', 'KEBUMEN', '', '', 'Nikah', 'KAV. NAHRAWI RT/RW 12/03 NO. 14 JL. WIJAYA KUSUMA 2 UJUNG MENTENG CAKUNG, JAKTIM', '13960', '', '085772296935', '8', '101', '164', '53', 'A', '2009-05-04', 'KONTRAK', '69', '3', '2', '3305181105820003', '877427682523000', '09018258351', '', '', 'foto_tbl_pegawai/', 'AKTIF', '', '', '', '', '', ''),
('7607011', 'SJ', 'SATIMAN', 'SATIMAN', '', '', '', 'Pria', '1976-07-15', 'CILACAP', 'ISLAM', 'K/3', 'Nikah', 'TEGALANAK 02/03 KEDUNGREJA CILACAP', '', '', '087877155594', '54', '101', '160', '65', '', '2002-03-30', 'KONTRAK', '69', '3', '5', '3301011507760001', '686690413522000', '02KE0221212', '', '', 'foto_tbl_pegawai/', 'AKTIF', '', '', '', '', '', ''),
('8201005', 'SJ', 'FAOZAN', 'AKHMAD', 'FAOZAN', '', '', 'Pria', '1982-01-18', 'TEGAL', 'ISLAM', 'K/1', 'Nikah', 'JEMBAYAT MARGASARI, TEGAL', '52463', '', '087730351590', '53', '101', '170', '60', '', '2002-08-26', 'KONTRAK', '69', '3', '5', '180182/001887', '68.669.084.3-501.000', '02KE0326623', '', '', 'foto_tbl_pegawai/', 'AKTIF', '', '', '', '', '', ''),
('6702001', 'SJ', 'SAUD', 'UUD', 'SARIFPUDIN', '', '', 'Pria', '1967-02-13', 'KUNINGAN', '', '', 'Nikah', 'LINK LINGGA HARAPAN RT 15 RW 05 KEL.WINDUHERANG, KEC. KUNINGAN', '17502', '', '087724170417', '50', '101', '160', '70', 'B', '1986-09-15', 'KONTRAK', '69', '3', '1', '3208181302670001', '488057043438000', '94K10296151', '', '', 'foto_tbl_pegawai/', 'AKTIF', '', '', '', '', '', ''),
('6805001', 'SJ', 'UJANG', 'UJANG', 'SUPARMAN', '', '', 'Pria', '1968-05-21', 'JAKARTA', 'ISLAM', 'k/3', 'Nikah', 'KARAWANG', '', '', '085310387270', '50', '101', '172', '65', 'A', '1988-09-01', 'KONTRAK', '69', '3', '1', '3215052105680003', '683627707433000', '00K10288387', '', '', 'foto_tbl_pegawai/', 'AKTIF', '', '', '', '', '', ''),
('7203005', 'SJ', 'KOMAR', 'KOMARUDIN', '', '', '', 'Pria', '1971-03-09', 'SUBANG', 'ISLAM', '', 'Nikah', 'KP. CARIU RT.25/08 CIBERES PATOKBESI,SUBANG', '41263', '', '087828320321', '59', '101', '169', '78', '', '1997-06-26', 'KONTRAK', '69', '3', '1', '3213160803716010', '686689845439000', '97K10569675', '', '', 'foto_tbl_pegawai/', 'AKTIF', '', '', '', '', '', ''),
('8806023', 'SJ', 'MANTO', 'DARMANTO', '', '', '', 'Pria', '1988-06-07', 'BEKASI', 'ISLAM', '', 'Nikah', 'ALAM PESONA WANAJAYA RT.07/018 BLOK P15-140-5', '', '', '087879333710', '54', '101', '170', '65', '', '2009-05-04', 'KONTRAK', '69', '3', '1', '3216060706880014', '877247732435000', '09018258294', '', '', 'foto_tbl_pegawai/', 'AKTIF', '', '', '', '', '', ''),
('9308051', 'SJ', 'RUSDAN', 'RUSDAN', 'ISMATULOH', '', '', 'Pria', '1993-08-05', 'CIANJUR', '', '', 'Lajang', 'KP.CIHAUR PASANTREN', '43262', '', '087721700161', '8', '101', '165', '50', 'B', '2012-11-01', 'KONTRAK', '69', '3', '1', '3203030508930008', '', '', '', '', 'foto_tbl_pegawai/', 'AKTIF', '', '', '', '', '', ''),
('9007026', 'SJ', 'ARIS', 'ARIS', 'RISMAWANTO', '', '', 'Pria', '1990-07-16', 'CILACAP', 'ISLAM', '', 'Nikah', 'TAMBUN-BEKASI RT.005/02', '', 'Aris.rismawant@sinarjayagroup.co.id', '087782202697', '54', '101', '175', '', 'AB', '2009-12-07', 'KONTRAK', '', '', '13', '33011616079000001', '67.261.237.1-522.000', '', '', '', 'foto_tbl_pegawai/', 'AKTIF', '', '', '', '', '', ''),
('8802056', 'SJ', 'SOLEH', 'MUHAMAD', 'SOLIHIN', '', '', 'Pria', '1988-02-23', 'KULON PROGO', 'ISLAM', 'K/1', 'Nikah', 'JL.RAYA JATI WARINGIN NO.88 PONDOK GEDE', '', 'Mamekastami@yahoo.co.id', '081386602978', '54', '101', '165', '59', 'A', '2011-11-02', 'KONTRAK', '69', '3', '1', '3301152302880002', '', '12007876423', '', '', 'foto_tbl_pegawai/', 'AKTIF', '', '', '', '', '', ''),
('6706004', 'SJ', 'UNANG', 'UNANG', 'SOLIHIN', '', '', 'Pria', '1967-06-12', 'CIANJUR', 'ISLAM', 'k/4', 'Nikah', 'JL.GARUDA V BLOK D14 NO.18 PAPAN MAS TAMBUN,BEKASI', '17510', '', '085710181052', '50', '101', '165', '54', 'B', '1996-03-26', 'KONTRAK', '69', '3', '1', '3216061206670016', '686689365435000', '96K10315188', '', '', 'foto_tbl_pegawai/', 'AKTIF', '', '', '', '', '', ''),
('7912010', 'SJ', 'TOTO', 'MARYANTO', '', '', '', 'Pria', '1978-12-23', 'JAKARTA', 'ISLAM', 'K/2', 'Nikah', 'PERUM MUTIARA GADING BLOK A8 NO.33 JALAN AMBON 4', '', 'Toto.193002@gmail.com', '085811105769', '2', '101', '165', '80', 'O', '2001-08-26', 'KONTRAK', '93', '3', '1', '3275012312780016', '686689944407000', '02KE0326771', '', '', 'foto_tbl_pegawai/', 'AKTIF', '', '', '', '', '', ''),
('7703006', 'SJ', 'DANI', 'DANI', '', '', '', 'Pria', '1977-03-16', 'TANGERANG', 'ISLAM', 'K/3', 'Nikah', 'PESONA GADING BLOK I 4 NO.32 RT. 07/15', '', '', '085218034539', '53', '101', '170', '70', '', '2001-03-28', 'KONTRAK', '69', '3', '1', '3216071603770011', '686691106435000', '01k10467807', '', '', 'foto_tbl_pegawai/', 'AKTIF', '', '', '', '', '', ''),
('8704046', 'SJ', 'BOWO', 'SUSANTO', 'HADI BOWO', '', '', 'Pria', '1987-04-08', 'BEKASI', 'KRISTEN', '', 'Lajang', 'JL.MUSTIKA SARI RT.03/05 NO.81 KEL.BOJONG MENTENG BEKASI TIMUR', '17117', 'Sby0804@yahoo.com', '083807662529', '54', '101', '173', '65', 'A', '2011-02-01', 'KONTRAK', '69', '3', '1', '3275051404870011', '971031026432000', '11014418161', '', '', 'foto_tbl_pegawai/', 'AKTIF', '', '', '', '', '', ''),
('6011005', 'SJ', 'WAHAB', 'ABDUL', 'WAHAB', '', '', 'Pria', '1960-11-11', 'TANGERANG', 'ISLAM', '', 'Nikah', 'JL. BENTENG BETAWI RT.02/03 KEL.PORIS GAGA BARU BATU CEPER TANGERANG', '', '', '02141818632', '8', '101', '175', '60', 'A', '1998-07-15', 'KONTRAK', '69', '3', '1', '3671031111600061', '488057068435000', '00K10709408', '', '', 'foto_tbl_pegawai/', 'AKTIF', '', '', '', '', '', ''),
('6306001', 'SJ', 'YANI', 'AHMAD', 'YANI', '', '', 'Pria', '1963-06-15', 'LEMAH ABANG', 'ISLAM', '', 'Nikah', 'KP.SINYAR UTARA ', '17550', '', '085880620103', '50', '101', '165', '', 'O', '1983-04-20', 'KONTRAK', '69', '3', '1', '3216111106630003', '677292237414006', '94K10296417', '', '', 'foto_tbl_pegawai/', 'AKTIF', '', '', '', '', '', ''),
('8006011', 'SJ', 'KHOLIS', 'NUR', 'KHOLIS', '', '', 'Pria', '1980-06-07', 'BREBES', 'ISLAM', 'K/1', 'Nikah', 'GANDASARI, CIBITUNG', '', '', '087876330425', '54', '101', '165', '55', '', '2003-11-05', 'KONTRAK', '69', '3', '5', '3329080706800002', '686690132501000', '', '', '', 'foto_tbl_pegawai/', 'AKTIF', '', '', '', '', '', ''),
('9506037', 'SJ', 'ANDRI', 'ANDRI', 'SETIAWAN', '', '', 'Pria', '1995-06-20', 'BEKASI', 'ISLAM', '', 'Lajang', 'KP. KEDUNG GEDE RT. 1 RW. 01 KEL. KEDUNG WARINGIN KEC. KEDUNG WARINGIN - BEKASI', '', '', '-', '54', '101', '', '', '', '2014-07-04', 'KONTRAK', '70', '5', '2', '3216122006950007', '', '', '', '', 'foto_tbl_pegawai/', 'OFF', '', '', '', '', '', ''),
('9108093', 'SJ', '', 'GUNTUR', 'PARIPURNA', '', '', 'Pria', '1991-08-15', 'JAKARTA', 'ISLAM', '', 'Lajang', 'TYTIAN KENCANA BLOK F4/RA RT. 02 RW. 06 MARGA MULYA - BEKASI UTARA', '', '', '-', '8', '101', '', '', '', '2014-11-24', 'KONTRAK', '101', '4', '1', '3275031508910018', '88.256.745.6-407.000', '', '', '', 'foto_tbl_pegawai/', 'AKTIF', '', '', '', '', '', ''),
('8904105', 'SJ', '', 'FENDI JOKO', 'UTOMO', '', '', 'Pria', '1989-04-27', 'CILACAP', 'ISLAM', '', 'Lajang', 'DSN. CILONING RT. 04 RW. 04 DS. KARANG ANYAR KEC. GRANDUNG MANGU - CILACAP ', '', '', '-', '8', '101', '', '', '', '2014-11-24', 'KONTRAK', '101', '4', '1', '3301102704890005', '58.316.660.8-552.00', '', '', '', 'foto_tbl_pegawai/', 'OFF', '', '', '', '', '', ''),
('8903031', 'SJ', 'KIKI', 'MUHAMAD', 'ZIKRI', '', '', 'Pria', '1989-03-01', 'JAKARTA', 'ISLAM', '', 'Lajang', 'JL.SWADAYA V NO.5 KP.RAWA BUGEL RT.02/04 KEL.HARAPAN JAYA BEKASI UTARA ', '17124', '', '085711907827', '54', '101', '169', '55', 'O', '2010-02-04', 'KONTRAK', '69', '3', '1', '3275030103890012', '573053360407000', '10016861873', '', '', 'foto_tbl_pegawai/', 'AKTIF', '', '', '', '', '', ''),
('8307006', 'SJ', 'YUDI', 'YUDI', 'HERMAWAN', '', '', 'Pria', '1983-07-01', 'JEMBER,JAWA TIMUR', 'ISLAM', '', 'Nikah', 'KARTIKA WANASARI BLOK C9 NO.2 CIBITUNG BEKASI', '17520', '', '081380207815', '54', '101', '175', '65', '', '2003-05-21', 'KONTRAK', '69', '3', '1', '3216070107830111', '686689506435000', '03KE0254377', '', '', 'foto_tbl_pegawai/', 'AKTIF', '', '', '', '', '', ''),
('8201007', 'SJ', 'DIAN', 'DIAN', '', '', '', 'Pria', '1982-01-07', 'GARUT', 'ISLAM', 'K/1', 'Nikah', 'JL.BIMA RAYA NO.22 RT.09/02 BEKASI MEDE BEKASI JAYA, BEKASI TIMUR', '17112', '', '085711864460', '54', '101', '172', '56', '', '2002-08-26', 'KONTRAK', '48', '3', '1', '3275010701820045', '686691197407000', '02KE0326730', '', '', 'foto_tbl_pegawai/', 'AKTIF', '', '', '', '', '', ''),
('7002009', 'SJ', 'EKO', 'EKO', 'SUDOKO', '', '', 'Pria', '1970-02-04', 'LAMPUNG', 'ISLAM', 'K/3', 'Nikah', 'KP.KALIULU DS.KARANG RAHARJA RT.02/01', '', '', '085890768111', '50', '101', '165', '60', 'A', '1997-03-26', 'KONTRAK', '69', '3', '1', '32160904052660001', '686691353414000', '97K10232399', '', '', 'foto_tbl_pegawai/', 'AKTIF', '', '', '', '', '', ''),
('7203004', 'SJ', 'ITO', 'SUWITO', '', '', '', 'Pria', '1972-03-12', 'SEMARANG', 'ISLAM', 'K/2', 'Nikah', 'VILLA MUTIARA JAYA BLOK M74/1A', '17520', 'Ito_tekh@sinarjayagroup.co.id', '08568869947', '54', '101', '171', '75', '', '1996-10-26', 'KONTRAK', '47', '3', '1', '3216071203720011', '686689266435000', '97k10000101', '', '', 'foto_tbl_pegawai/', 'AKTIF', '', '', '', '', '', ''),
('7506015', 'SJ', 'EDOY', 'EDI', '', '', '', 'Pria', '1975-06-15', 'BANTEN', 'ISLAM', 'K/3', 'Nikah', 'DS.GANDASARI KP.CIBUNTU BOJONG RT.001/004', '', '', '085776087962', '54', '101', '160', '150', '', '2002-03-30', 'KONTRAK', '69', '3', '1', '3216081506750001', '3216081506750001', '02KE0221204', '', '', 'foto_tbl_pegawai/', 'AKTIF', '', '', '', '', '', ''),
('7206006', 'SJ', 'NANANG', 'NANANG', 'SAEFULOH', '', '', 'Pria', '1972-06-08', 'KARAWANG', 'ISLAM', 'K/2', 'Nikah', 'JL.LAPANGAN RT.04/01 KRANJI BEKASI BARAT', '', '', '081385777195', '50', '101', '175', '70', '', '2000-04-09', 'KONTRAK', '71', '3', '1', '3275020808720033', '677292450407000', '00K10647715', '', '', 'foto_tbl_pegawai/', 'AKTIF', '', '', '', '', '', ''),
('8306004', 'SJ', 'SONI', 'SONIPAN', '', '', '', 'Pria', '1983-06-11', 'INDRAMAYU', 'ISLAM', 'k/2', 'Nikah', 'KP.JATI RT.002/006 JATIMULYA,TAMBUN SELATAN', '17520', '', '08389889021', '54', '101', '167', '55', '', '2002-08-26', 'KONTRAK', '93', '3', '1', '3216061106830001', '686690504413000', '02KE0326813', '', '', 'foto_tbl_pegawai/', 'AKTIF', '', '', '', '', '', ''),
('8207027', 'SJ', 'RIFKI', 'RIFKI', 'SETIAWAN', '', '', 'Pria', '1982-07-29', 'BANTUL', 'ISLAM', '', 'Nikah', 'JL.WIJAYA KUSUMA II BLOK 1/98 RT.010/011,JATIMULYA,TAMBUN SELATAN,BEKASI', '17520', 'Rifkidetiawan2982@yahoo.com', '081807477554', '2', '101', '165', '55', 'AB', '2005-10-03', 'KONTRAK', '93', '3', '1', '3216062907820001', '686690231435000', '05KE0418936', '', '', 'foto_tbl_pegawai/', 'AKTIF', '', '', '', '', '', ''),
('8706016', 'SJ', 'AGUNG', 'RAHMAT', 'AGUNG NUGRAHA', '', '', 'Pria', '1987-06-10', 'KLATEN', 'ISLAM', '', 'Lajang', 'KP.CIKEDOKAN DS.SUKADANAU KEC.CIKARANG BARAT,BEKASI', '17520', '', '0815718828980', '54', '101', '165', '50', 'O', '2008-05-09', 'KONTRAK', '69', '3', '1', '3310121006870003', '877426593413000', '08015303418', '', '', 'foto_tbl_pegawai/', 'AKTIF', '', '', '', '', '', ''),
('7312007', 'SJ', 'SOLEH', 'MUHAMAD ', 'SOLEH', '', '', 'Pria', '1973-12-04', 'PALEMBANG', 'ISLAM', '', 'Nikah', 'KP. CILEDUG RT. 10 RW. 03 CILEDUG SETU - BEKASI', '', '', '-', '8', '101', '', '', '', '2000-02-25', 'karyawan', '81', '1', '1', '3216180412730002', '77.190.471.1-413.000', '', '', '', 'foto_tbl_pegawai/', 'OFF', '', '', '', '', '', ''),
('9309059', 'SJ', 'FAJAR', 'FAJAR', 'SEPTIAWAN', '', '', 'Pria', '1993-09-27', 'TEGAL', 'ISLAM', '', 'Lajang', 'DS.BALAPULANG WETAN. RT.09/04 KAB.TEGAL. JAWA TENGAH', '52464', 'Fajarseptiawan32@yahoo.com', '087741428064', '54', '101', '170', '57', '', '2013-01-07', 'KONTRAK', '201', '3', '1', '3328040709930002', '98.660.761.2-501.000', '', '', '', 'foto_tbl_pegawai/', 'AKTIF', '', '', '', '', '', ''),
('8807055', 'SJ', 'YULI', 'YULIANTO', '', '', '', 'Pria', '1988-07-14', 'SRAGEN', 'ISLAM', '', 'Lajang', 'KARTIKA WANASARI BLOK C4 NO.17', '17520', '', '082310301224', '54', '101', '165', '55', '', '2011-11-02', 'KONTRAK', '69', '3', '1', '3216071407880012', '787700970413000', '12007876415', '', '', 'foto_tbl_pegawai/', 'AKTIF', '', '', '', '', '', ''),
('9306048', 'SJ', 'JUNI', 'KHAJUNI', '', '', '', 'Pria', '1993-06-19', 'PURWOREJO', 'ISLAM', '', 'Lajang', 'KEMANTRAN LOR RT.01/03,GEBANG KEC.GEBANG', '54191', '', '081328385698', '54', '101', '165', '55', '', '2012-11-01', 'KONTRAK', '69', '3', '1', '3306141906930001', '98.660.755.4-531.000', '', '', '', 'foto_tbl_pegawai/', 'AKTIF', '', '', '', '', '', ''),
('9307014', 'SJ', 'SYARIF', 'SYARIF', 'HIDAYAT', '', '', 'Pria', '1993-07-26', 'KEBUMEN', 'ISLAM', '', 'Lajang', 'KP.CIKEDOKAN RT.004/011 DS.SUKADANAU, CIKARANG BARAT, BEKASI', '', 'Hidayat_punkgirl@yahoo.co.id', '087837822781', '54', '101', '164', '54', 'A', '2011-06-15', 'KONTRAK', '69', '3', '4', '3305122607930004', '971030564523000', '11030912098', '', '', 'foto_tbl_pegawai/', 'AKTIF', '', '', '', '', '', ''),
('8108004', 'SJ', 'DIAN', 'DIAN', 'YUDIANTO', '', '', 'Pria', '1981-08-28', 'KUNINGAN', 'ISLAM', 'K/3', 'Nikah', 'PAPAN MES RT.04/08 MANGUN JAYA TAMBUN SELATAN KAB.BEKASI', '17510', '', '085811255501', '53', '101', '160', '60', '', '2001-04-16', 'KONTRAK', '153', '3', '1', '3216062808810001', '686691205435000', '01K10467823', '', '', 'foto_tbl_pegawai/', 'AKTIF', '', '', '', '', '', ''),
('8410026', 'SJ', 'ARIS', 'HARIS', 'SUGIYANTO', '', '', 'Pria', '1984-10-17', 'BEKASI', 'ISLAM', '', 'Nikah', 'BEKASI, BOJONG RAWA LUMBU RT.004/004', '17116', '', '085691296660', '54', '101', '168', '60', 'O', '2006-07-14', 'KONTRAK', '69', '3', '1', '3275051710840024', '677292336432000', '06KE0354477', '', '', 'foto_tbl_pegawai/', 'AKTIF', '', '', '', '', '', ''),
('7404009', 'SJ', 'CO MURRY', 'MURRY ', 'SYAMSUDIN', 'SE', '', 'Pria', '1974-04-13', 'BEKASI', 'ISLAM', 'k/1', 'Nikah', 'PERUM BUNI ASIH PERMAI BLOK 6 NO. 3 JL. MANGGA CIKARANG BEKASI', '', '', '-', '1', '101', '', '', '', '1997-04-11', 'karyawan', '27', '5', '1', '', '', '', '', '', 'foto_tbl_pegawai/', 'AKTIF', '', '', '', '', '', ''),
('7811003', 'SJ', 'HERMAN', 'SUHERMAN', '', '', '', 'Pria', '1976-11-28', 'JAKARTA', 'BUDHA', 'k/3', 'Nikah', 'JL.ANGGREK 1 RT.03/06 NO. 123 BEKASI TIMUR', '17117', '', '081311380005', '54', '101', '165', '160', '', '1997-10-26', 'KONTRAK', '48', '3', '1', '3275052811760012', '686690587432000', '98K10454447', '', '', 'foto_tbl_pegawai/', 'AKTIF', '', '', '', '', '', ''),
('8605054', 'SJ', 'NEBI', 'NEBI', 'MAULANA', '', '', 'Pria', '1986-05-25', 'INDRAMAYU', 'ISLAM', 'K/1', 'Nikah', 'DSN. BOGEG DS.KARANG LAYUNG RT.005/002 KEC.SUKRA KAB.INDRAMAYU', '', '', '087718598517', '54', '101', '173', '59', 'AB', '2013-01-07', 'KONTRAK', '69', '3', '1', '3212312505860001', '70.199.993.0-437.000', '', '', '', 'foto_tbl_pegawai/', 'AKTIF', '', '', '', '', '', ''),
('9307049', 'SJ', 'HENDRO', 'HENDRO', 'ARDI KUSUMA', '', '', 'Pria', '1993-07-06', 'SEMARANG', '', '', 'Lajang', 'DS. SIDIGEDE RT.01/01 KEC.WELAHAN KAB.JEPARA', '59464', 'Nyakhendro@yahoo.co.id', '085747813134', '8', '101', '160', '50', '', '2012-11-01', 'KONTRAK', '69', '3', '1', '3320030607930002', '', '', '', '', 'foto_tbl_pegawai/', 'AKTIF', '', '', '', '', '', ''),
('8409010', 'SJ', '', 'AKHMAD', 'NADIRIN', '', '', 'Pria', '1984-09-16', 'KEBUMEN', 'ISLAM', 'K/1', 'Nikah', 'CANDIRENGGO RT.05/04 KEC.AYAH KAB.KEBUMEN', '54473', '', '081317208148', '54', '101', '159', '48', '', '2004-05-21', 'KONTRAK', '69', '3', '1', '3305011609840004', '686690850526000', '04KE0411256', '', '', 'foto_tbl_pegawai/', 'AKTIF', '', '', '', '', '', ''),
('7209003', 'SJ', 'DIN', 'HAERUDIN', '', '', '', 'Pria', '1972-09-17', 'BOGOR', 'ISLAM', 'K/2', 'Nikah', 'PERUK KOTA MEGAREGENCY BLOK F25 NO.29 RT.004/014 DS.SUKARAGAM SERANG BARU', '17331', '', '081807803647', '53', '101', '175', '', 'AB', '1995-11-20', 'KONTRAK', '48', '3', '1', '3216211709720003', '686691502413000', '', '', '', 'foto_tbl_pegawai/', 'AKTIF', '', '', '', '', '', ''),
('7704013', 'SJ', 'RIDWAN', 'MUHAMMAD RIDWAN ', 'TRICAHYADI', '', '', 'Pria', '1977-04-29', 'SLEMAN', 'ISLAM', 'K/1', 'Nikah', 'PERUM KIRANA CIBITUNG BLOK N.9/4 RT.003/024 DS.WANAJAYA CIBITUNG ', '17520', '', '081584630460', '8', '101', '165', '74', 'B', '2005-04-21', 'KONTRAK', '69', '3', '1', '3216082904770003', '686689993413000', '05KE0345758', '', '', 'foto_tbl_pegawai/', 'AKTIF', '', '', '', '', '', ''),
('8107007', 'SJ', 'MA\'RUF', 'MUHAMMAD', 'MAHRUF', '', '', 'Pria', '1981-07-20', 'INDRAMAYU', 'ISLAM', 'K/1', 'Nikah', 'PERUM PURI CIKARANG ASRI BLOK H7 NO.15', '17530', '', '085216602969', '54', '101', '165', '64', 'B', '2001-09-21', 'KONTRAK', '69', '3', '1', '3216152007810001', '674596176414000', '02K10044224', '', '', 'foto_tbl_pegawai/', 'AKTIF', '', '', '', '', '', ''),
('6502006', 'SJ', 'SAM', 'SYAMSUDIN', '', '', '', 'Pria', '1965-02-28', 'TAMBUN', 'ISLAM', 'K/2', 'Nikah', 'TAMBUN', '', '', '-', '50', '101', '', '', '', '1995-01-23', 'KONTRAK', '71', '5', '1', '321805200203451', '68.362.767.3-408.000', '', '', '', 'foto_tbl_pegawai/', 'AKTIF', '', '', '', '', '', ''),
('9103031', 'SJ', 'OKA', 'OKA', 'MARULLOH', '', '', 'Pria', '1991-03-25', 'BEKASI', 'ISLAM', '', 'Lajang', 'KP.KEDUNG GEDE NO.41 RT.01/03 DS.JATIMULYA TAMBUN,BEKASI', '17510', '', '08990101291', '54', '101', '159', '60', 'O', '2011-06-10', 'KONTRAK', '69', '3', '1', '3216062503910008', '97103050743500', '11030912072', '', '', 'foto_tbl_pegawai/', 'AKTIF', '', '', '', '', '', ''),
('7805004', 'SJ', 'IWAN', 'IWAN', 'SUMANTRI', '', '', 'Pria', '1978-05-09', 'MAJALENGKA', 'ISLAM', 'k/3', 'Nikah', 'PERUM PESONA GADING CIBITUNG BLOK I-05 NO.17 RT.007/015 DS.WANAJAYA KEC.CIBITUNG', '17520', 'Iwan.sumantri@sinarjayagroup.co.id', '085284322944', '53', '101', '160', '53', 'B', '1999-11-02', 'KONTRAK', '82', '3', '1', '3216080905780009', '686689761413000', '00K10288445', '', '', 'foto_tbl_pegawai/', 'AKTIF', '', '', '', '', '', ''),
('7805009', 'SJ', '', 'AKUM', 'NUSIN', '', '', 'Pria', '1978-05-20', 'BEKASI', 'ISLAM', 'K/1', 'Nikah', 'JL.RAFLESIA 5 NO.20 RT.009/08 KEL.PERWIRA BEKASI UTARA ', '17122', '', '085770939750', '54', '101', '160', '48', '', '2002-08-26', 'KONTRAK', '69', '3', '1', '3275032005780021', '877426569435000', '02KE0326615', '', '', 'foto_tbl_pegawai/', 'AKTIF', '', '', '', '', '', ''),
('8701061', 'SJ', 'YONO', 'SUPRIYONO', '', '', '', 'Pria', '1987-01-22', 'CIREBON', 'ISLAM', '', 'Lajang', 'PERUM BUMI CITRA LESTARI JL.PLAM II BLOK E3-12A RT.019/015 DS.WALUYA,CIKARANG', '17550', '', '081328404577', '54', '101', '158', '45', 'O', '2012-11-01', 'KONTRAK', '69', '3', '1', '3209022201870004', '445431588419000', '', '', '', 'foto_tbl_pegawai/', 'AKTIF', '', '', '', '', '', ''),
('8702030', 'SJ', 'RUDI', 'RUDI', 'RUSWANTO', '', '', 'Pria', '1987-02-18', 'CIREBON', 'ISLAM', '', 'Nikah', 'DS.KONDANG SARI KEC.BEBER KAB.CIREBON RT.013/004', '45172', '', '081318377887', '54', '101', '165', '50', 'O', '2009-05-04', 'KONTRAK', '69', '3', '1', '3209131802870002', '877427716426000', '09018258328', '', '', 'foto_tbl_pegawai/', 'AKTIF', '', '', '', '', '', ''),
('8404018', 'SJ', 'ANOM', 'DENTA', 'ANOM SAPUTRA', '', '', 'Pria', '1984-04-21', 'YOGYAKARTA ', '', '', 'Nikah', 'PERUM GRAND CIKARANG CITY BLOK 6 55/NO.2 RT.27/013', '17521', 'anom@sinarjayagroup.co.id', '081381474712', '2', '101', '160', '59', 'O', '2005-10-03', 'KONTRAK', '46', '3', '1', '3216092104840016', '686691171542000', '05KE0418886', '', '', 'foto_tbl_pegawai/', 'AKTIF', '', '', '', '', '', ''),
('7907001', 'SJ', 'OPIK', 'TAOPIK', 'HIDAYAT', '', '', 'Pria', '1979-07-09', 'SUKABUMI', 'ISLAM', 'K/2', 'Nikah', 'PERUM TELAGA MURNI BLOK D 28/12A RT.05/13 DESA TELAGA MURNI CIKARANG BARAT ', '17520', '', '087889190045', '59', '101', '165', '72', '', '1996-11-26', 'KONTRAK', '48', '3', '1', '3216080909780013', '683627616413000', '97K10000192', '', '', 'foto_tbl_pegawai/', 'AKTIF', '', '', '', '', '', ''),
('6912002', 'SJ', 'DIDIK', 'DIDIK', 'SUDARTO', '', '', 'Pria', '1969-12-29', 'BANYUMAS', 'ISLAM', '', 'Nikah', 'BEKASI, KP.BUARAN BONG RT.01', '', '', '02188852918', '54', '101', '176', '70', '', '1998-10-10', 'KONTRAK', '47', '3', '1', '3275042912690014', '686691213432000', '91J32101601', '', '', 'foto_tbl_pegawai/', 'AKTIF', '', '', '', '', '', ''),
('7910031', 'SJ', 'HERI', 'TEGUH HERI ', 'PERMANA', '', '', 'Pria', '1979-10-09', 'BEKASI', 'ISLAM', 'K/2', 'Nikah', 'JL.SETIA DARMA IV NO.11 KP.DARMA JAYA RT.005/002 TAMBUN SELATAN', '17510', '', '085881817349', '8', '101', '', '', 'O', '2007-09-27', 'KONTRAK', '73', '1', '1', '3216060910790002', '697266708435000', '08001699639', '', '', 'foto_tbl_pegawai/SAM_2436.JPG', 'AKTIF', '', '', '', '', '', ''),
('6607006', 'SJ', 'DANA', 'SURYADANA', '', '', '', 'Pria', '1966-07-25', 'JAKARTA', 'ISLAM', 'K/2', 'Nikah', 'KP.CIKEDOKAN RT.002/010', '17520', '', '087779335575', '8', '101', '165', '70', 'O', '1996-06-15', 'KONTRAK', '73', '1', '1', '321608250766005', '68.669.068.6-413.000', '', '', '', 'foto_tbl_pegawai/', 'AKTIF', '', '', '', '', '', ''),
('9208042', 'SJ', 'RUDI', 'RUDI', 'PRASETYO', '', '', 'Pria', '1992-08-05', 'KLATEN', 'ISLAM', '', 'Lajang', 'JEMAWAN,JATINOM, KLATEN', '57481', '', '085729836349', '54', '101', '174', '60', 'B', '2012-08-09', 'KONTRAK', '73', '1', '1', '3310200508920002', '98.660.802.4-525.000', '', '', '', 'foto_tbl_pegawai/SAM_0865.JPG', 'AKTIF', '', '', '', '', '', ''),
('5808003', 'SJ', 'YADI', 'SUYADI', '', '', '', 'Pria', '1958-08-28', 'SRAGEN', '', '', 'Nikah', 'PERUM KARTIKA WANASARI RT.003/030 WANASARI,CIBITUNG', '17520', '', '08129177255', '59', '101', '165', '68', 'A', '2011-03-04', 'KONTRAK', '73', '1', '1', '3216072808580001', '771927258435000', '11017905826', '', '', 'foto_tbl_pegawai/', 'AKTIF', '', '', '', '', '', ''),
('8703044', 'SJ', 'SODIK', 'ACHMAD', 'SODIK', '', '', 'Pria', '1987-03-14', 'TEGAL', 'ISLAM', 'K/1', 'Nikah', 'CIKEDOKAN DS.SUKADANAU KEC.CIKARANG BARAT, BEKASI', '17520', '', '085642999680', '54', '101', '157', '54', 'A', '2011-02-01', 'KONTRAK', '73', '1', '1', '3216081403870005', '971030663501000', '11014418005', '', '', 'foto_tbl_pegawai/ahmad sodik.JPG', 'AKTIF', '', '', '', '', '', ''),
('7009007', 'SJ', 'BAHTIAR', 'LEBAR', 'BAHTIAR', '', '', 'Pria', '1970-09-28', 'BEKASI', 'ISLAM', 'K/1', 'Nikah', 'KP.LUBANG BUAYA, SETU, BEKASI', '17520', '', '081310868837', '53', '101', '165', '', 'A', '1997-01-26', 'KONTRAK', '73', '1', '1', '321618060770000', '697266906413000', '', '', '', 'foto_tbl_pegawai/lebar.JPG', 'AKTIF', '', '', '', '', '', ''),
('8409028', 'SJ', 'NURING', 'NURING', 'WARSO WAHYUDI', '', '', 'Pria', '1984-09-17', 'KEBUMEN', 'ISLAM', 'K/1', 'Nikah', 'PERUM MANGUN JAYA INDAH II B III TAMBUN SELATAN, BEKASI', '17120', '', '085287573123', '54', '101', '176', '80', 'O', '2006-10-20', 'KONTRAK', '73', '1', '1', '3275031709840032', '71.269.707.7-435.000', '', '', '', 'foto_tbl_pegawai/nuring.JPG', 'AKTIF', '', '', '', '', '', ''),
('9002001', 'SJ', 'HENDRI', 'HENDRIYANA', '', '', '', 'Pria', '1990-02-25', 'KUNINGAN', 'ISLAM', 'K/1', 'Nikah', 'DUSUN MANIS RT. 03 RW. 06 CILEUYA CIMAHI - KUNINGAN', '', '', '-', '59', '101', '', '', '', '2007-02-12', 'KONTRAK', '70', '5', '1', '3208242502890001', '', '', '', '', 'foto_tbl_pegawai/IMAG0620.JPG', 'AKTIF', '', '', '', '', '', ''),
('6104004', 'SJ', 'MAWI', 'ASMAWI', '', '', '', 'Pria', '1961-04-07', 'JAKARTA', 'ISLAM', 'K/4', 'Nikah', 'KP.CEREWED RT.02/16 NO.26 DUREN JAYA, BEKASI TIMUR', '', '', '081288649950', '53', '101', '170', '80', '', '1997-01-26', 'KONTRAK', '73', '1', '1', '3275010704610005', '686690934407000', '', '', '', 'foto_tbl_pegawai/', 'AKTIF', '', '', '', '', '', ''),
('8711039', 'SJ', 'GHO-DHEN', 'AHMAD', 'KAMAL', '', '', 'Pria', '1987-11-17', 'BEKASI', 'ISLAM', 'K/2', 'Nikah', 'KP. LUBANG BUAYA RT.02/03 DS.LUBANG BUAYA KEC.SETU', '17520', '', '081912423646', '54', '101', '185', '85', 'AB', '2010-03-22', 'KONTRAK', '73', '1', '24', '32161817118700001', '672612397413000', '10024957978', '', '', 'foto_tbl_pegawai/ahmad kamal.JPG', 'AKTIF', '', '', '', '', '', ''),
('9109055', 'SJ', 'DEPI', 'DEPI', 'ARYADI', '', '', 'Pria', '1991-09-10', 'RIAU', 'ISLAM', 'K/2', 'Nikah', 'KP BOJONG KONENG RT.004/002 DS.TELAGA MURNI KEC. CIKARANG BARAT, BEKASI ', '17520', '', '081381721156', '54', '101', '174', '71', '', '2012-10-29', 'KONTRAK', '73', '1', '24', '321608100991013', '98.660.756.2-431.00', '', '', '', '', 'AKTIF', '', '', '', '', '', '');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_hrd_pendidikan`
--

CREATE TABLE `tbl_hrd_pendidikan` (
  `id_pendidikan` int(3) NOT NULL,
  `pendidikan` varchar(25) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_hrd_pendidikan`
--

INSERT INTO `tbl_hrd_pendidikan` (`id_pendidikan`, `pendidikan`) VALUES
(1, 'Sarjana (S1)'),
(2, 'Diploma 3'),
(8, 'SMA'),
(59, 'SMP'),
(50, 'SD'),
(51, 'DIPLOMA 1'),
(52, 'SARJANA(S2)'),
(53, 'SLTA'),
(54, 'SMK'),
(55, 'DIPLOMA 4'),
(56, 'DIPLOMA 2'),
(60, 'SARJANA (S3)'),
(62, 'MA');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_menu`
--

CREATE TABLE `tbl_menu` (
  `id_menu` int(11) NOT NULL,
  `nama_menu` varchar(50) DEFAULT NULL,
  `link` varchar(100) DEFAULT NULL,
  `icon` varchar(50) DEFAULT NULL,
  `urutan` bigint(11) DEFAULT NULL,
  `is_active` enum('Y','N') DEFAULT 'Y',
  `parent` enum('Y') DEFAULT 'Y'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tbl_menu`
--

INSERT INTO `tbl_menu` (`id_menu`, `nama_menu`, `link`, `icon`, `urutan`, `is_active`, `parent`) VALUES
(1, 'Dashboard Utama', 'dashboard', 'fas fa-tachometer-alt', 1, 'Y', 'Y'),
(2, 'Management User', '#', 'fas fa-cogs', 11, 'Y', 'Y'),
(52, 'Body Repair', 'BodyRepair', 'fa fa-folder-open', 6, 'Y', 'Y'),
(56, 'HRMS', 'Hrms', 'fa fa-users', 2, 'Y', 'Y'),
(57, 'Gudang', '#', 'fa fa-university', 4, 'Y', 'Y'),
(58, 'Report HRMS', '#', 'fa fa-list', 3, 'Y', 'Y'),
(59, 'Report body Repair', '#', 'fa fa-list', 7, 'Y', 'Y'),
(60, 'Accounting', '#', 'fa fa-chart-line', 9, 'Y', 'Y'),
(61, 'Report Gudang', '#', 'fa fa-list', 5, 'Y', 'Y'),
(62, 'Dashboard HRD', '#', 'fas fa-tachometer-alt', 1, 'Y', 'Y'),
(63, 'Dashboard Warehouse', '#', 'fas fa-tachometer-alt', 1, 'Y', 'Y'),
(64, 'Dashboard Body Repair', '#', 'fas fa-tachometer-alt', 1, 'Y', 'Y'),
(65, 'Report Accounting', '#', 'fa fa-list', 10, 'Y', 'Y');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_submenu`
--

CREATE TABLE `tbl_submenu` (
  `id_submenu` int(11) UNSIGNED NOT NULL,
  `nama_submenu` varchar(50) DEFAULT NULL,
  `link` varchar(100) DEFAULT NULL,
  `icon` varchar(50) DEFAULT NULL,
  `id_menu` int(11) DEFAULT NULL,
  `is_active` enum('Y','N') DEFAULT 'Y',
  `urutan` bigint(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tbl_submenu`
--

INSERT INTO `tbl_submenu` (`id_submenu`, `nama_submenu`, `link`, `icon`, `id_menu`, `is_active`, `urutan`) VALUES
(1, 'Menu', 'menu', 'far fa-circle', 2, 'Y', 0),
(2, 'SubMenu', 'submenu', 'far fa-circle', 2, 'Y', 0),
(7, 'Aplikasi', 'aplikasi', 'far fa-circle', 2, 'Y', 0),
(8, 'User', 'user', 'far fa-circle', 2, 'Y', 0),
(10, 'User Level', 'userlevel', 'far fa-circle', 2, 'Y', 0),
(15, 'Barang', 'barang', 'far fa-circle', 32, 'Y', 0),
(17, 'Kategori', 'kategori', 'far fa-circle', 32, 'Y', 0),
(18, 'Satuan', 'satuan', 'far fa-circle', 32, 'Y', 0),
(19, 'Pembelian', 'pembelian', 'far fa-circle', 41, 'Y', 0),
(20, 'Penjualan', 'penjualan', 'far fa-circle', 41, 'Y', 0),
(23, 'Bus Masuk', 'BusMasuk', 'fa fa-shuttle-van', 52, 'Y', 4),
(24, 'Proses PK', 'ProsesPk', 'fa fa-retweet', 52, 'Y', 6),
(28, 'Daftar Bay', 'DaftarBay', 'fa fa-list-ol', 52, 'Y', 7),
(33, 'Laporan Repair Perbody', '#', 'ion ion-calendar', 59, 'Y', 11),
(34, 'Tutup PK Pertanggal', 'TutupPK', 'fa fa-calendar', 59, 'Y', 12),
(36, 'Laporan Mekanik', 'ReportMekanik', 'ion ion-man', 59, 'Y', 13),
(37, 'Grafik Pekerjaan Rapair', 'GrafikKerja', 'ion ion-stats-bars', 59, 'Y', 15),
(38, 'Penggunaan Part Repair', 'PenggunaanPart', 'fa fa-hourglass', 59, 'Y', 16),
(42, 'Daftar Pegawai', 'Pegawai', 'fa fa-user', 56, 'Y', 1),
(43, 'Sparepart', 'Sparepart', 'fa fa-wrench', 57, 'Y', 2),
(44, 'Part Masuk', 'Part_masuk', 'fa fa-file-signature', 57, 'Y', 3),
(45, 'Update Harga', 'UpdateHpart', 'fa fa-hand-holding-usd', 57, 'Y', 4),
(48, 'Panel Setting HRD', 'SettingHRD', 'fa fa-cogs', 56, 'Y', 4),
(52, 'Cuti Pegawai', 'Cuti', 'far fa-building ', 56, 'Y', 2),
(53, 'Panel Setting WH', 'Settingwh', 'fa fa-cogs', 57, 'Y', 5),
(58, 'Report Absensi', '#', 'fa fa-circle', 58, 'Y', 1),
(59, 'Report Cuti', '#', 'fa fa-circle', 58, 'Y', 2),
(60, 'Kontrak Kerja', '#', 'fa fa-circle', 56, 'Y', 3),
(62, 'Daftar Akun', 'accounts', 'fa fa-list', 60, 'Y', 1),
(63, 'Jurnal Umum', 'jurnal', 'fa fa-tags', 60, 'Y', 2),
(64, 'Buku Besar', 'Bukubesar', 'fa fa-book', 60, 'Y', 3),
(65, 'Neraca Saldo Awal', 'Neracaawal', 'fa fa-balance-scale', 60, 'Y', 4),
(66, 'Neraca Saldo Akhir', '#', 'fa fa-balance-scale', 60, 'Y', 5),
(67, 'Report Keuangan', '#', 'fa fa-folder-open', 65, 'Y', 1),
(68, 'Report Laba Rugi', '#', 'fa fa-list-alt', 65, 'Y', 2),
(69, 'Mesin Absen', 'Mesin_absen', 'fa fa-cog', 56, 'Y', 4),
(70, 'Purchase Order', 'PurchaseOrder', 'fa fa-coins', 57, 'Y', 3),
(71, 'Part Keluar', 'Part_keluar', 'fa fa-file-upload', 57, 'Y', 4),
(72, 'Daftar Bus', 'Body', 'fa fa-bus', 52, 'Y', 2),
(73, 'BAST', 'Bast', 'fa fa-bus-alt', 52, 'Y', 3),
(74, 'Panel Seting', 'Settingbr', 'fa fa-cogs', 52, 'Y', 8),
(75, 'Display Bay', 'Display', 'fa fa-chalkboard-teacher', 52, 'Y', 1),
(76, 'Report Per Body', 'Report per Body', 'fa fa-bus-alt', 61, 'Y', 1),
(77, 'Report Perbarang', 'ReportBarang', 'fa fa-luggage-cart', 61, 'Y', 2),
(78, 'Report Per Kategori', 'ReporPerkategori', 'fa fa-layer-group', 61, 'Y', 3),
(79, 'Penerimaan Barang', 'Penerimaan', 'fa fa-dolly-flatbed', 61, 'Y', 4),
(80, 'Pengeluaran Barang', 'Pengeluaran', 'fa fa-dolly', 61, 'Y', 5),
(81, 'Bus Dengan PK', 'BusPk', 'fa fa-bezier-curve', 52, 'Y', 5);

-- --------------------------------------------------------

--
-- Table structure for table `tbl_user`
--

CREATE TABLE `tbl_user` (
  `id_user` int(11) UNSIGNED NOT NULL,
  `username` varchar(20) DEFAULT NULL,
  `full_name` varchar(50) DEFAULT NULL,
  `password` varchar(255) DEFAULT NULL,
  `id_level` int(11) DEFAULT NULL,
  `image` varchar(500) DEFAULT NULL,
  `is_active` enum('Y','N') DEFAULT 'Y'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tbl_user`
--

INSERT INTO `tbl_user` (`id_user`, `username`, `full_name`, `password`, `id_level`, `image`, `is_active`) VALUES
(1, 'admin', 'Administrator', '$2y$05$8ggk18bQDJDBPqGUem19mOtdKcTs4J46I5SalF83ndCWzeJS9E/6.', 1, 'admin.jpg', 'Y'),
(6, 'user', 'user satu', '$2y$05$3bEkbUWiTCavpM5FUUKbu.wdclj8vvsTgy58WSiS7Jje6i3XgZCC6', 4, 'user.jpg', 'Y'),
(7, 'hrd', 'HRD', '$2y$05$4BPNDh7MWUHdhO7j6Ci5UOeCkTJHEMco1KBocRQ5QeNkIZmEZXs4u', 6, NULL, 'Y'),
(8, 'admbr', 'admbr', '$2y$05$MjDuHbmrbJ0gEizK9eTtaeBhXsViD5uN4C6z6lfoLdfQaEj83vzka', 7, NULL, 'Y');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_userlevel`
--

CREATE TABLE `tbl_userlevel` (
  `id_level` int(11) UNSIGNED NOT NULL,
  `nama_level` varchar(50) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tbl_userlevel`
--

INSERT INTO `tbl_userlevel` (`id_level`, `nama_level`) VALUES
(1, 'admin'),
(4, 'kasir'),
(5, 'amanah'),
(6, 'HRMS'),
(7, 'Admin Body Repair');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_wh_barang`
--

CREATE TABLE `tbl_wh_barang` (
  `id_barang` int(11) NOT NULL,
  `no_part` varchar(25) NOT NULL,
  `nama_part` varchar(50) NOT NULL,
  `nama_part_e` varchar(50) NOT NULL,
  `stok` decimal(10,0) NOT NULL,
  `stok_a` decimal(10,0) NOT NULL,
  `stok_p` decimal(10,0) NOT NULL,
  `minstok_a` decimal(10,0) NOT NULL,
  `minstok_p` decimal(10,0) NOT NULL,
  `hrg_awal` decimal(10,0) NOT NULL,
  `hrg_1` decimal(10,0) NOT NULL,
  `hrg_2` decimal(10,0) NOT NULL,
  `satuan` varchar(25) NOT NULL,
  `kelompok` varchar(25) NOT NULL,
  `type` varchar(25) NOT NULL,
  `lokasi` varchar(25) NOT NULL,
  `kategori` varchar(25) NOT NULL,
  `supplier` varchar(26) NOT NULL,
  `ket` varchar(50) NOT NULL,
  `std_pakai` decimal(10,0) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tbl_wh_barang`
--

INSERT INTO `tbl_wh_barang` (`id_barang`, `no_part`, `nama_part`, `nama_part_e`, `stok`, `stok_a`, `stok_p`, `minstok_a`, `minstok_p`, `hrg_awal`, `hrg_1`, `hrg_2`, `satuan`, `kelompok`, `type`, `lokasi`, `kategori`, `supplier`, `ket`, `std_pakai`) VALUES
(1, 'BBD0046', 'Baud JF 5X15', '', '0', '200', '2000', '0', '0', '46', '0', '0', '27', '', '5', '', '1', '', 'PUTIH', '0'),
(2, 'BBD0059', 'Baud JF 5X20', '', '0', '0', '2000', '0', '0', '500', '0', '0', '27', '', '5', '', '1', '', '-', '0'),
(3, 'BBD0036', 'Baud JF 6X15', '', '0', '200', '5000', '0', '0', '0', '0', '0', '27', '', '5', '', '1', '', 'PUTIH', '0'),
(4, 'BBD0037', 'Baud JF 6X20', '', '0', '200', '5000', '0', '0', '250', '0', '0', '27', '', '5', '', '1', '', 'PUTIH', '0'),
(5, 'BBD0038', 'Baud JF 6X30', '', '0', '200', '5000', '0', '0', '193', '0', '0', '27', '', '5', '', '1', '', 'PUTIH', '0'),
(6, 'BBD0039', 'Baud JF 6X40', '', '0', '200', '5000', '0', '0', '500', '0', '0', '27', '', '5', '', '1', '', 'PUTIH', '0'),
(7, 'BBD0040', 'Baud JF 6X45', '', '0', '200', '5000', '0', '0', '198', '0', '0', '27', '', '5', '', '1', '', 'PUTIH', '0'),
(8, 'BBD0056', 'Baud JF 6x60', '', '0', '0', '0', '0', '0', '1500', '0', '0', '27', '', '5', '', '1', '', 'Putih', '0'),
(9, 'BBD0041', 'Baud JF 8X15', '', '0', '200', '5000', '0', '0', '164', '0', '0', '27', '', '5', '', '1', '', 'PUTIH', '0'),
(10, 'BBD0042', 'Baud JF 8X20', '', '0', '200', '5000', '0', '0', '546', '0', '0', '27', '', '5', '', '1', '', 'PUTIH', '0'),
(11, 'BBD0043', 'Baud JF 8X35', '', '0', '200', '5000', '0', '0', '398', '0', '0', '27', '', '5', '', '1', '', 'PUTIH', '0'),
(12, 'BBD0055', 'Baud JF 8x60', '', '0', '0', '0', '0', '0', '1200', '0', '0', '27', '', '5', '', '1', '', 'Putih', '0'),
(13, 'BBD0001', 'Baud M6X10', '', '0', '100', '3000', '0', '0', '227', '0', '0', '27', '', '5', '', '1', '', '-', '10'),
(14, 'BBD0002', 'Baud M6X15', '', '0', '100', '3000', '0', '0', '244', '0', '0', '27', '', '5', '', '1', '', '-', '0'),
(15, 'BBD0003', 'Baud M6X20', '', '0', '100', '3000', '0', '0', '257', '0', '0', '27', '', '5', '', '1', '', '-', '0'),
(16, 'BBD0004', 'Baud M6X35', '', '0', '0', '0', '0', '0', '141', '0', '0', '27', '', '5', '', '1', '', '-', '0'),
(17, 'BBD0005', 'Baud M6X50', '', '0', '0', '0', '0', '0', '272', '0', '0', '27', '', '5', '', '1', '', '-', '0'),
(18, 'BBD0006', 'Baud M6X60', '', '0', '0', '0', '0', '0', '200', '0', '0', '27', '', '5', '', '1', '', '-', '0'),
(19, 'BBD0007', 'Baud M6X70', '', '0', '100', '3000', '0', '0', '800', '0', '0', '27', '', '5', '', '1', '', '-', '0'),
(20, 'BBD0008', 'Baud M8X20', '', '0', '0', '0', '0', '0', '408', '0', '0', '27', '', '5', '', '1', '', '-', '0'),
(21, 'BBD0009', 'Baud M8X25 Kuning', '', '0', '0', '0', '0', '0', '222', '0', '0', '27', '', '5', '', '1', '', 'KUNING', '0'),
(22, 'BBD0010', 'Baud M8X25 Hitam', '', '0', '100', '3000', '0', '0', '714', '0', '0', '27', '', '5', '', '1', '', 'HITAM', '0'),
(23, 'BBD0011', 'Baud M8X30 Kuning', '', '0', '0', '0', '0', '0', '315', '0', '0', '27', '', '5', '', '1', '', 'KUNING', '0'),
(24, 'BBD0012', 'Baud M8X35 Kuning', '', '0', '100', '3000', '0', '0', '602', '0', '0', '27', '', '5', '', '1', '', 'KUNING', '0'),
(25, 'BBD0013', 'Baud M8X50 Kuning', '', '0', '100', '3000', '0', '0', '1000', '0', '0', '27', '', '5', '', '1', '', 'KUNING', '0'),
(26, 'BBD0014', 'Baud M8X70 Kuning', '', '0', '100', '3000', '0', '0', '857', '0', '0', '27', '', '5', '', '1', '', 'KUNING', '0'),
(27, 'BBD0015', 'Baud M8X80 Kuning', '', '0', '100', '3000', '0', '0', '950', '0', '0', '27', '', '5', '', '1', '', 'KUNING', '0'),
(28, 'BBD0016', 'Baud M8X130 Kuning', '', '0', '100', '3000', '0', '0', '2500', '0', '0', '27', '', '5', '', '1', '', 'KUNING', '0'),
(29, 'BBD0017', 'Baud M10X25 Hitam', '', '0', '300', '3000', '0', '0', '1314', '0', '0', '27', '', '5', '', '1', '', 'HITAM', '0'),
(30, 'BBD0018', 'Baud M10X25 Putih', '', '0', '0', '0', '0', '0', '920', '0', '0', '27', '', '5', '', '1', '', 'PUTIH', '0'),
(31, 'BBD0019', 'Baud M10X30 Kuning', '', '0', '100', '3000', '0', '0', '866', '0', '0', '27', '', '5', '', '1', '', 'KUNING', '0'),
(32, 'BBD0020', 'Baud M10X35 Kuning', '', '0', '0', '0', '0', '0', '800', '0', '0', '27', '', '5', '', '1', '', 'KUNING', '0'),
(33, 'BBD0021', 'Baud M10X40 Hitam', '', '0', '0', '0', '0', '0', '3000', '0', '0', '27', '', '5', '', '1', '', 'HITAM', '0'),
(34, 'BBD0022', 'Baud M10X50 Kuning', '', '0', '100', '3000', '0', '0', '1117', '0', '0', '27', '', '5', '', '1', '', 'KUNING', '0'),
(35, 'BBD0051', 'Baud M12x40 Hitam', '', '0', '0', '0', '0', '0', '3000', '0', '0', '27', '', '5', '', '1', '', 'Hitam', '0'),
(36, 'BBD0052', 'Baud M14x40 Hitam', '', '0', '0', '0', '0', '0', '6000', '0', '0', '27', '', '5', '', '1', '', 'Hitam', '0'),
(37, 'BBD0023', 'Mur M4', '', '0', '200', '2000', '0', '0', '37', '0', '0', '27', '', '5', '', '1', '', 'PUTIH', '0'),
(38, 'BBD0024', 'Mur M5', '', '0', '200', '2000', '0', '0', '50', '0', '0', '27', '', '5', '', '1', '', 'PUTIH', '0'),
(39, 'BBD0025', 'Mur M6', '', '0', '0', '0', '0', '0', '0', '0', '0', '27', '', '5', '', '1', '', '-', '0'),
(40, 'BBD0026', 'MUR M8', '', '0', '0', '0', '0', '0', '200', '0', '0', '27', '', '5', '', '1', '', '-', '0'),
(41, 'BBD0027', 'MUR M10', '', '0', '0', '0', '0', '0', '0', '0', '0', '27', '', '5', '', '1', '', '-', '0'),
(42, 'BBD0045', 'Mur Kotak M8 Rel Jok', '', '0', '100', '500', '0', '0', '3500', '0', '0', '27', '', '5', '', '1', '', 'REL JOK', '0'),
(43, 'BBD0047', 'Mur Tanam M6 KNGF', '', '0', '0', '0', '0', '0', '675', '0', '0', '27', '', '5', '', '1', '', 'u/Jok', '0'),
(44, 'BBD0048', 'Mur Wiper', '', '0', '0', '0', '0', '0', '800', '0', '0', '27', '', '5', '', '1', '', 'Wiper', '0'),
(45, 'BBD0049', 'Mur Mekanik Wiper', '', '0', '0', '0', '0', '0', '20000', '0', '0', '27', '', '5', '', '1', '', 'Wiper', '0'),
(46, 'BBD0053', 'Mur Rivet M8', '', '0', '0', '0', '0', '0', '1500', '0', '0', '27', '', '5', '', '1', '', 'Box Tv', '0'),
(47, 'BBD0057', 'Mur Rivet M6', '', '0', '0', '1000', '0', '0', '1256', '0', '0', '27', '', '5', '', '1', '', 'Rivet', '0'),
(48, 'BBD0058', 'Mur Rivet M5', '', '0', '0', '500', '0', '0', '1348', '0', '0', '27', '', '5', '', '1', '', 'Rivet', '0'),
(49, 'BBD0060', 'Mur Clip M6', '', '0', '0', '500', '0', '0', '2000', '0', '0', '27', '', '5', '', '1', '', 'M6', '0'),
(50, 'BBD0061', 'Mur M18', '', '0', '0', '100', '0', '0', '15000', '0', '0', '27', '', '5', '', '1', '', 'M18', '0'),
(51, 'BBD0028', 'RING M4', '', '0', '100', '1000', '0', '0', '23', '0', '0', '27', '', '5', '', '1', '', '-', '0'),
(52, 'BBD0029', 'RING M6', '', '0', '200', '5000', '0', '0', '50', '0', '0', '27', '', '5', '', '1', '', '-', '0'),
(53, 'BBD0030', 'RING M8', '', '0', '500', '10000', '0', '0', '90', '0', '0', '27', '', '5', '', '1', '', '-', '0'),
(54, 'BBD0031', 'Ring M10', '', '0', '500', '10000', '0', '0', '157', '0', '0', '27', '', '5', '', '1', '', 'Ring', '0'),
(55, 'BBD0032', 'RING M14', '', '0', '0', '0', '0', '0', '0', '0', '0', '27', '', '5', '', '1', '', '-', '0'),
(56, 'BBD0035', 'Ring Per M12', '', '0', '0', '0', '0', '0', '389', '0', '0', '27', '', '5', '', '1', '', '-', '0'),
(57, 'BBD0044', 'RING C', '', '0', '50', '200', '0', '0', '4000', '0', '0', '17', '', '5', '', '1', '', 'U/ JOK', '0'),
(58, 'BBD0050', 'Ring M12 Hitam', '', '0', '0', '0', '0', '0', '600', '0', '0', '27', '', '5', '', '1', '', 'Hitam', '0'),
(59, 'BBD0054', 'Ring M5', '', '0', '0', '0', '0', '0', '46', '0', '0', '27', '', '5', '', '1', '', 'M5', '0'),
(60, 'BBD0062', 'Ring M24', '', '0', '0', '100', '0', '0', '1500', '0', '0', '27', '', '5', '', '1', '', 'M24', '0'),
(61, 'BBS0001', 'Besi Canal C 125X50X6M Tb.3,0mm', '', '0', '5', '30', '0', '0', '211000', '0', '0', '17', '', '6', '', '1', '', 'CNP TB3,0MM', '0'),
(62, 'BBS0002', 'Besi Canal U 50 TB.3,0mm', '', '0', '5', '20', '0', '0', '127000', '0', '0', '17', '', '6', '', '1', '', 'UNP TB.3MM', '0'),
(63, 'BBS0003', 'Besi Holo 15X30 Tb.2,0mm @1,6mm', '', '0', '20', '60', '0', '0', '108500', '0', '0', '17', '', '6', '', '1', '', 'HOLO 1,6MM', '0'),
(64, 'BBS0004', 'Besi Holo 20X20 Tb.2,0mm @1,6mm', '', '0', '30', '60', '0', '0', '130000', '0', '0', '17', '', '6', '', '1', '', 'HOLO 1,6MM', '0'),
(65, 'BBS0005', 'Besi Holo 20X40 Tb.2,3mm @1,9mm', '', '0', '30', '60', '0', '0', '186000', '0', '0', '17', '', '6', '', '1', '', 'HOLO 1,9MM', '0'),
(66, 'BBS0006', 'Besi Holo 30X30 Tb.2,3mm @2,0mm', '', '0', '20', '60', '0', '0', '190000', '0', '0', '17', '', '6', '', '1', '', 'HOLO 2,0MM', '0'),
(67, 'BBS0007', 'Besi Holo 40X40 Tb.2,3mm @1,9mm', '', '0', '20', '60', '0', '0', '245000', '0', '0', '17', '', '6', '', '1', '', 'HOLO 1,9MM', '0'),
(68, 'BBS0008', 'Besi Holo 40X60 Tb.3,0mm @3,0mm', '', '0', '20', '60', '0', '0', '564000', '0', '0', '17', '', '6', '', '1', '', 'HOLO 3,0MM', '0'),
(69, 'BBS0009', 'Besi Holo 40X80 Tb.3,0mm', '', '0', '0', '0', '0', '0', '405000', '0', '0', '17', '', '6', '', '1', '', '-', '0'),
(70, 'BBS0010', 'Besi Pipa 3\"X6m Tb.2mm', '', '0', '0', '0', '0', '0', '0', '0', '0', '17', '', '6', '', '1', '', '-', '0'),
(71, 'BBS0011', 'Besi Pipa Hitam 1/2\"X6m 2mm', '', '0', '20', '200', '0', '0', '69000', '0', '0', '17', '', '6', '', '1', '', 'PIPA HITAM', '0'),
(72, 'BBS0013', 'Besi Pipa Hitam 1/2\"X6m Sshedule', '', '0', '20', '200', '0', '0', '95000', '0', '0', '17', '', '6', '', '1', '', 'PIPA HITAM', '0'),
(73, 'BBS0014', 'Besi Plat Roll Galvanil 1,0mm GA 7993102', '', '0', '8000', '60000', '0', '0', '2580', '0', '0', '18', '', '6', '', '1', '', 'PLAT ROLL 1,0MM', '0'),
(74, 'BBS0015', 'Besi Plat Hitam Bordes 3,0X4X8', '', '0', '2', '10', '0', '0', '1525000', '0', '0', '17', '', '6', '', '1', '', 'BORDES HITAM', '0'),
(75, 'BBS0017', 'Besi Plat Strep 5X25X6M Tb.5,7mm', '', '0', '0', '0', '0', '0', '48000', '0', '0', '17', '', '6', '', '1', '', 'PLAT STREP', '0'),
(76, 'BBS0018', 'Besi Plat Strep 6X50X6m TB.5,7mm', '', '0', '0', '0', '0', '0', '128000', '0', '0', '17', '', '6', '', '1', '', 'PLAT STREP', '0'),
(77, 'BBS0019', 'Besi Siku 3X3 Std. C Tb.2mm @6.5kg (28X28)', '', '0', '20', '60', '0', '0', '90000', '0', '0', '17', '', '6', '', '1', '', 'SIKU \"L\" STD. C', '0'),
(78, 'BBS0020', 'Besi Siku 4X4 Tb.4mm EQ @12,1kg (40X40)', '', '0', '20', '60', '0', '0', '190000', '0', '0', '17', '', '6', '', '1', '', 'SIKU \"L\" EQ', '0'),
(79, 'BBS0021', 'Besi Siku 4X4 Tb.3mm Std. B @7kg (38X38)', '', '0', '20', '60', '0', '0', '110000', '0', '0', '17', '', '6', '', '1', '', 'SIKU \"L\" STD. B', '0'),
(80, 'BBS0022', 'Besi Plat Galvanil 122X244 1,2mm', '', '0', '5', '50', '0', '0', '858000', '0', '0', '23', '', '6', '', '1', '', 'GALVANIL 1,2MM', '5'),
(81, 'BBS0023', 'Besi Plat Bolong @100x200 0,8mm', '', '0', '40000', '200000', '0', '0', '8', '0', '0', '182', '', '6', '', '1', '', '0,8MM', '20000'),
(82, 'BBS0024', 'Besi Plat Hitam Esyer 2mm Real', '', '0', '15', '50', '0', '0', '727000', '0', '0', '23', '', '6', '', '1', '', 'ESYER 2MM', '9'),
(83, 'BBS0025', 'Besi Plat Hitam Esyer Tb.2,5 Banci @2,3', '', '0', '20', '70', '0', '0', '630000', '0', '0', '17', '', '6', '', '1', '', 'ESYER 2,3', '0'),
(84, 'BBS0026', 'Besi Plat 1.0 Skat Area MU 9X65', '', '0', '5', '10', '0', '0', '12000', '0', '0', '27', '', '6', '', '1', '', 'MU', '1'),
(85, 'BBS0027', 'Besi Plat 1.0 Skat Area MU 9X190', '', '0', '10', '20', '0', '0', '32000', '0', '0', '27', '', '6', '', '1', '', 'MU', '2'),
(86, 'BBS0028', 'Besi Plat 1.0 Skat Area RS 8X60', '', '0', '5', '10', '0', '0', '10000', '0', '0', '27', '', '6', '', '1', '', 'RS', '1'),
(87, 'BBS0029', 'Besi Plat 1.0 Skat Area RS 8X180', '', '0', '10', '20', '0', '0', '26000', '0', '0', '27', '', '6', '', '1', '', 'RS', '2'),
(88, 'BBS0030', 'Besi Plat 1.0 Pintu Area 6.5X230', '', '0', '10', '20', '0', '0', '28000', '0', '0', '27', '', '6', '', '1', '', 'MU/RS', '2'),
(89, 'BBS0031', 'Besi Pipa Hitam 3\" TB1.6C', '', '0', '1', '5', '0', '0', '317000', '0', '0', '17', '', '6', '', '1', '', 'KNALPOT (0.10btg/unit)', '0'),
(90, 'BBS0032', 'Besi Ram Ornames 1015', '', '0', '2', '10', '0', '0', '77500', '0', '0', '25', '', '6', '', '1', '', 'U/AC', '0'),
(91, 'BBS0033', 'Besi Plat Gal. 2.0mm x1202x2400mm', '', '0', '0', '0', '0', '0', '723553', '0', '0', '23', '', '6', '', '1', '', 'Lantai', '9'),
(92, 'BBS0034', 'Besi Plat Gal Coil CGA-22 @2.0mm', '', '0', '0', '0', '0', '0', '19500', '0', '0', '21', '', '6', '', '1', '', 'Sat. : Kg', '0'),
(93, 'BBS0035', 'Besi Plat Roll Galvanil 1,0mm GA 7993102', '', '0', '0', '0', '0', '0', '21500', '0', '0', '21', '', '6', '', '1', '', 'Kg', '0'),
(94, 'BBS0036', 'Besi Plat Sheet Zincalum @0.45', '', '0', '0', '0', '0', '0', '98000', '0', '0', '25', '', '6', '', '1', '', 'Zincalum', '0'),
(95, 'BBS0037', 'Besi Plat Hitam 4x8x4.0mm', '', '0', '0', '20', '0', '0', '1400000', '0', '0', '23', '', '6', '', '1', '', 'Esyer 4.0mm', '0'),
(96, 'BBS0042', 'Besi Canal U UNP 65', '', '0', '0', '50', '0', '0', '355000', '0', '0', '17', '', '6', '', '1', '', 'UNP', '0'),
(97, 'BBS0043', 'Besi AS 12x95', '', '0', '0', '50', '0', '0', '20000', '0', '0', '27', '', '6', '', '1', '', '-', '0'),
(98, 'BES0024', 'As Busing 32mm', '', '0', '0', '10', '0', '0', '500000', '0', '0', '27', '', '11', '', '1', '', 'MGI 310', '0'),
(99, 'BES0014', 'Bearing NKN 6201', '', '0', '0', '0', '0', '0', '25000', '0', '0', '27', '', '11', '', '1', '', 'Bagasi', '0'),
(100, 'BES0016', 'Bearing NTN 6001', '', '0', '0', '0', '0', '0', '10000', '0', '0', '27', '', '11', '', '1', '', 'NTN', '0'),
(101, 'BES0015', 'Bracket Kompresor AC Roller Belt', '', '0', '0', '0', '0', '0', '250000', '0', '0', '27', '', '11', '', '1', '', 'Kompresor AC', '0'),
(102, 'BES0012', 'Bushing AS Drat M8', '', '0', '10', '100', '0', '0', '12500', '0', '0', '27', '', '11', '', '1', '', 'U/JOK', '0'),
(103, 'BES0011', 'Capit Udang', '', '0', '10', '50', '0', '0', '33000', '0', '0', '27', '', '11', '', '1', '', 'KAP DEPAN', '2'),
(104, 'BES0001', 'Engsel Bushing AS 19', '', '0', '20', '100', '0', '0', '35000', '0', '0', '27', '', '11', '', '1', '', 'BUSHING 19', '4'),
(105, 'BES0019', 'Engsel Kap Blk Avante', '', '0', '0', '0', '0', '0', '210000', '0', '0', '27', '', '11', '', '1', '', 'Avante', '0'),
(106, 'BES0009', 'Engsel Kap Blk Jetliner', '', '0', '8', '30', '0', '0', '110000', '0', '0', '27', '', '11', '', '1', '', 'LETER L / JETLINER', '2'),
(107, 'BES0002', 'Engsel Kap Blk MU', '', '0', '8', '30', '0', '0', '125000', '0', '0', '27', '', '11', '', '1', '', 'BULAN SABIT / MU', '2'),
(108, 'BES0018', 'Engsel Kap Dpn Avante', '', '0', '0', '0', '0', '0', '100000', '0', '0', '27', '', '11', '', '1', '', 'Avante', '0'),
(109, 'BES0008', 'Engsel Kap Dpn Pendek MU', '', '0', '8', '30', '0', '0', '85000', '0', '0', '27', '', '11', '', '1', '', 'PENDEK / MU', '2'),
(110, 'BES0003', 'Engsel Kap Dpn Tinggi Jetliner', '', '0', '8', '30', '0', '0', '110000', '0', '0', '27', '', '11', '', '1', '', 'TINGGI / JETLINER', '2'),
(111, 'BES0017', 'Engsel Kupu-kupu Kecil', '', '0', '0', '0', '0', '0', '10000', '0', '0', '30', '', '11', '', '1', '', 'Kuning', '0'),
(112, 'BES0013', 'Engsel Pintu Area 3\"X2,5\"X2,5\"', '', '0', '5', '30', '0', '0', '17500', '0', '0', '30', '', '11', '', '1', '', 'KECIL 3\"', '2'),
(113, 'BES0010', 'Engsel Pintu Blk Tinggi', '', '0', '8', '30', '0', '0', '210000', '0', '0', '27', '', '11', '', '1', '', 'TINGGI / BELAKANG', '2'),
(114, 'BES0004', 'Engsel Pintu Dpn Pendek', '', '0', '16', '60', '0', '0', '200000', '0', '0', '27', '', '11', '', '1', '', 'PENDEK / DEPAN', '4'),
(115, 'BES0005', 'Engsel Pintu Emergency', '', '0', '6', '20', '0', '0', '105000', '0', '0', '27', '', '11', '', '1', '', 'EMERGENCY', '2'),
(116, 'BES0021', 'Engsel Sendok Dashboard RS', '', '0', '0', '0', '0', '0', '0', '0', '0', '27', '', '11', '', '1', '', 'Dashboard RS', '0'),
(117, 'BES0006', 'Engsel Spakboard', '', '0', '8', '20', '0', '0', '100000', '0', '0', '27', '', '11', '', '1', '', '-', '8'),
(118, 'BES0007', 'Engsel Tulak Gareng', '', '0', '4', '20', '0', '0', '100000', '0', '0', '27', '', '11', '', '1', '', 'KAP DEPAN', '1'),
(119, 'CAP0001', 'Ampelas Niken NO80', '', '0', '150', '600', '0', '0', '6000', '0', '0', '23', '', '49', '', '2', '', 'NIKEN', '0'),
(120, 'CAP0002', 'Ampelas Niken NO120', '', '0', '150', '500', '0', '0', '5750', '0', '0', '23', '', '49', '', '2', '', 'NIKEN', '0'),
(121, 'CAP0003', 'Ampelas Niken NO150', '', '0', '150', '600', '0', '0', '5750', '0', '0', '23', '', '49', '', '2', '', 'NIKEN', '0'),
(122, 'CAP0004', 'Ampelas Niken NO240', '', '0', '150', '600', '0', '0', '5750', '0', '0', '23', '', '49', '', '2', '', 'NIKEN', '0'),
(123, 'CAP0005', 'Ampelas Niken NO400', '', '0', '150', '600', '0', '0', '5750', '0', '0', '23', '', '49', '', '2', '', 'NIKEN', '0'),
(124, 'CAP0006', 'Ampelas Niken NO800', '', '0', '150', '600', '0', '0', '5750', '0', '0', '23', '', '49', '', '2', '', 'NIKEN', '0'),
(125, 'CAP0007', 'Ampelas Niken NO1000', '', '0', '50', '300', '0', '0', '6500', '0', '0', '23', '', '49', '', '2', '', 'NIKEN', '0'),
(126, 'CAP0008', 'Ampelas Niken NO2000', '', '0', '50', '300', '0', '0', '6500', '0', '0', '23', '', '49', '', '2', '', 'NIKEN', '0'),
(127, 'CAP0009', 'Ampelas Roll NO60', '', '0', '30', '250', '0', '0', '8000', '0', '0', '25', '', '49', '', '2', '', 'TAYO', '0'),
(128, 'CAP0010', 'Ampelas Roll NO80', '', '0', '30', '250', '0', '0', '8000', '0', '0', '25', '', '49', '', '2', '', 'TAYO', '0'),
(129, 'CAP0011', 'Ampelas Roll NO120', '', '0', '0', '0', '0', '0', '7000', '0', '0', '25', '', '49', '', '2', '', 'TAYO', '0'),
(130, 'CCT0047', 'CAT BLACK METALIC', '', '0', '0', '0', '0', '0', '200000', '0', '0', '24', '', '9', '', '2', '', 'OPLOS', '0'),
(131, 'CCT0069', 'Cat Hamertoon Silver', '', '0', '0', '10', '0', '0', '80000', '0', '0', '22', '', '9', '', '2', '', 'Silver', '0'),
(132, 'CCT0078', 'Cat Mix MPU Baby Blue', '', '0', '0', '10', '0', '0', '235000', '0', '0', '24', '', '9', '', '2', '', 'Mix Mpu', '0'),
(133, 'CCT0067', 'Cat Mix Mpu Black Fortuner', '', '0', '0', '0', '0', '0', '404747', '0', '0', '24', '', '9', '', '2', '', 'Mix Mpu', '0'),
(134, 'CCT0077', 'Cat Mix MPU Black Metalic Toyota', '', '0', '0', '20', '0', '0', '283000', '0', '0', '24', '', '9', '', '2', '', 'Mix Mpu', '0'),
(135, 'CCT0066', 'Cat Mix Mpu Black Mika', '', '0', '0', '0', '0', '0', '267000', '0', '0', '24', '', '9', '', '2', '', 'Mix Mpu', '0'),
(136, 'CCT0075', 'Cat Mix MPU Black Mocca', '', '0', '0', '20', '0', '0', '312000', '0', '0', '24', '', '9', '', '2', '', 'Mix Mpu', '0'),
(137, 'CCT0004', 'Cat Mix MPU Blueis Silver', '', '0', '5', '10', '0', '0', '387000', '0', '0', '24', '', '9', '', '2', '', 'MIX MPU', '1'),
(138, 'CCT0076', 'Cat Mix MPU Coklat', '', '0', '0', '20', '0', '0', '203000', '0', '0', '24', '', '9', '', '2', '', 'Mix Mpu', '0'),
(139, 'CCT0074', 'Cat Mix MPU Gerindra Kuning', '', '0', '0', '20', '0', '0', '490000', '0', '0', '24', '', '9', '', '2', '', 'Mix Mpu', '0'),
(140, 'CCT0073', 'Cat Mix MPU Gerindra Merah', '', '0', '0', '20', '0', '0', '514000', '0', '0', '24', '', '9', '', '2', '', 'Mix Mpu', '0'),
(141, 'CCT0056', 'Cat Mix MPU Grey Metalic', '', '0', '0', '0', '0', '0', '270000', '0', '0', '24', '', '9', '', '2', '', 'Mix Mpu', '0'),
(142, 'CCT0071', 'Cat Mix MPU Hi Ace PU Grey', '', '0', '0', '50', '0', '0', '436000', '0', '0', '24', '', '9', '', '2', '', 'Mix MPU', '0'),
(143, 'CCT0052', 'Cat Mix Mpu Red Moca CRV', '', '0', '0', '0', '0', '0', '311853', '0', '0', '24', '', '9', '', '2', '', 'Mix Mpu', '0'),
(144, 'CCT0038', 'Cat Mix MPU Red PP12', '', '0', '20', '50', '0', '0', '547000', '0', '0', '24', '', '9', '', '2', '', 'MIX MPU', '5'),
(145, 'CCT0039', 'Cat Mix MPU Red Signal Pearl', '', '0', '5', '20', '0', '0', '544945', '0', '0', '24', '', '9', '', '2', '', 'MIX MPU', '1'),
(146, 'CCT0045', 'Cat Mix MPU Red Wine 2K', '', '0', '18', '50', '0', '0', '567000', '0', '0', '24', '', '9', '', '2', '', 'MIX MPU', '6'),
(147, 'CCT0046', 'Cat Mix MPU Red Wine Pearl', '', '0', '18', '50', '0', '0', '585000', '0', '0', '24', '', '9', '', '2', '', 'MIX MPU', '6'),
(148, 'CCT0060', 'Cat Mix MPU Red Xenia', '', '0', '0', '0', '0', '0', '495000', '0', '0', '24', '', '9', '', '2', '', 'MIX MPU', '0'),
(149, 'CCT0049', 'Cat Mix MPU Silver 1E7', '', '0', '3', '20', '0', '0', '306000', '0', '0', '24', '', '9', '', '2', '', 'MIX MPU', '0'),
(150, 'CCT0050', 'Cat Mix MPU Silver Avanza', '', '0', '0', '0', '0', '0', '363000', '0', '0', '24', '', '9', '', '2', '', 'MIX MPU', '0'),
(151, 'CCT0044', 'Cat Mix MPU White Pearl Atas', '', '0', '21', '50', '0', '0', '294000', '0', '0', '24', '', '9', '', '2', '', 'MIX MPU', '8'),
(152, 'CCT0043', 'Cat Mix MPU White Pearl Dasar', '', '0', '21', '50', '0', '0', '162000', '0', '0', '24', '', '9', '', '2', '', 'MIX MPU', '8'),
(153, 'CCT0068', 'Cat Mix MPU White Pearl Dasar Avante 1', '', '0', '0', '0', '0', '0', '179000', '0', '0', '24', '', '9', '', '2', '', 'Mix Mpu', '0'),
(154, 'CCT0072', 'Cat Mix MPU White Pearl Dasar Avante 2', '', '0', '0', '50', '0', '0', '178000', '0', '0', '24', '', '9', '', '2', '', 'Mix Mpu', '0'),
(155, 'CCT0037', 'Cat Mix MPU White Vios', '', '0', '0', '0', '0', '0', '178000', '0', '0', '24', '', '9', '', '2', '', 'MIX MPU', '0'),
(156, 'CCT0063', 'Cat Mix MPU Xenia Magnestic Grey', '', '0', '0', '0', '0', '0', '346000', '0', '0', '24', '', '9', '', '2', '', 'Mix Mpu', '0'),
(157, 'CCT0051', 'Cat Nippe Coklat', '', '0', '0', '0', '0', '0', '88000', '0', '0', '24', '', '9', '', '2', '', 'Nippe', '0'),
(158, 'CCT0062', 'Cat Nippe Silver', '', '0', '0', '10', '0', '0', '95000', '0', '0', '22', '', '9', '', '2', '', 'Nippe', '0'),
(159, 'CCT0003', 'Cat RCA NC Black', '', '0', '20', '100', '0', '0', '39000', '0', '0', '24', '', '9', '', '2', '', 'RCA NC', '0'),
(160, 'CCT0005', 'Cat RCA NC Dark Grey', '', '0', '0', '0', '0', '0', '36250', '0', '0', '24', '', '9', '', '2', '', 'RCA NC', '0'),
(161, 'CCT0042', 'Cat RCA PU Grey Bekleding', '', '0', '20', '60', '0', '0', '95000', '0', '0', '24', '', '9', '', '2', '', 'RCA', '0'),
(162, 'CCT0041', 'Cat RCA PU Grey Dashboard', '', '0', '20', '60', '0', '0', '95000', '0', '0', '24', '', '9', '', '2', '', 'RCA', '0'),
(163, 'CCT0006', 'Cat Sikkens B101 - 511006 @3,75L White Grey Transp', '', '0', '0', '0', '0', '0', '906958', '0', '0', '22', '', '9', '', '2', '', 'Sikkens', '0'),
(164, 'CCT0007', 'Cat Sikkens B102 - 511007 @1L Transp Enchancer', '', '0', '0', '0', '0', '0', '235173', '0', '0', '22', '', '9', '', '2', '', 'Sikkens', '0'),
(165, 'CCT0008', 'Cat Sikkens B103 - 511008 @3,75L White', '', '0', '0', '0', '0', '0', '840743', '0', '0', '22', '', '9', '', '2', '', 'Sikkens', '0'),
(166, 'CCT0058', 'Cat Sikkens B106 - 511011 @3,75L Black', '', '0', '0', '0', '0', '0', '855254', '0', '0', '22', '', '9', '', '2', '', 'Sikkens', '0'),
(167, 'CCT0054', 'Cat Sikkens B107 - 511012 @3,75L Deep Black', '', '0', '0', '0', '0', '0', '768764', '0', '0', '22', '', '9', '', '2', '', 'Sikkens', '0'),
(168, 'CCT0011', 'Cat Sikkens B201 - 511013 @1L Red (Orange)', '', '0', '0', '0', '0', '0', '656710', '0', '0', '22', '', '9', '', '2', '', 'Sikkens', '0'),
(169, 'CCT0012', 'Cat Sikkens B202 - 511014 @1L Red (Orange Transp)', '', '0', '0', '0', '0', '0', '448035', '0', '0', '22', '', '9', '', '2', '', 'Sikkens', '0'),
(170, 'CCT0013', 'Cat Sikkens B204 - 511016 @1L Red Semi Transp', '', '0', '0', '0', '0', '0', '427508', '0', '0', '22', '', '9', '', '2', '', 'Sikkens', '0'),
(171, 'CCT0014', 'Cat Sikkens B205 - 511031 @1L Orange Red Transp', '', '0', '0', '0', '0', '0', '721140', '0', '0', '22', '', '9', '', '2', '', 'Sikkens', '0'),
(172, 'CCT0015', 'Cat Sikkens B206 - 511034 @1L Red (Violet Transp)', '', '0', '0', '0', '0', '0', '656710', '0', '0', '22', '', '9', '', '2', '', 'Sikkens', '0'),
(173, 'CCT0016', 'CAT Sikkens B301 - 511017 @1L Orange (Red Transp)', '', '0', '0', '0', '0', '0', '258379', '0', '0', '22', '', '9', '', '2', '', 'Sikkens', '0'),
(174, 'CCT0017', 'Cat Sikkens B402 - 511025 @1L Yellow (Green)', '', '0', '0', '0', '0', '0', '517381', '0', '0', '22', '', '9', '', '2', '', 'Sikkens', '0'),
(175, 'CCT0018', 'Cat Sikkens B405 - 511029 @1L Yellow Oxide', '', '0', '0', '0', '0', '0', '257170', '0', '0', '22', '', '9', '', '2', '', 'Sikkens', '0'),
(176, 'CCT0061', 'Cat Sikkens B600 - 584585 @1L Violet Blue', '', '0', '0', '0', '0', '0', '467079', '0', '0', '22', '', '9', '', '2', '', 'Sikkens', '0'),
(177, 'CCT0053', 'Cat Sikkens B601 - 511018 @1L Blue (Green) Transp', '', '0', '0', '0', '0', '0', '312381', '0', '0', '22', '', '9', '', '2', '', 'Sikkens', '0'),
(178, 'CCT0020', 'Cat Sikkens B604 - 511021 @1L Intensive Blue Trans', '', '0', '0', '0', '0', '0', '323064', '0', '0', '22', '', '9', '', '2', '', 'Sikkens', '0'),
(179, 'CCT0059', 'Cat Sikkens B605 - 545267 @1L Blue/Violet Transp', '', '0', '0', '0', '0', '0', '467079', '0', '0', '22', '', '9', '', '2', '', 'Cat Sikkens', '0'),
(180, 'CCT0022', 'Cat Sikkens B702 - 511036 @1L Violet (Red Transp)', '', '0', '0', '0', '0', '0', '497009', '0', '0', '22', '', '9', '', '2', '', 'Sikkens', '0'),
(181, 'CCT0064', 'Cat Sikkens B703 - 511037 @1L Violet Transp', '', '0', '0', '0', '0', '0', '291032', '0', '0', '22', '', '9', '', '2', '', 'Sikkens', '0'),
(182, 'CCT0023', 'CAT Sikkens B802 - 511046 @3,75L Metallic Fine', '', '0', '0', '0', '0', '0', '937142', '0', '0', '22', '', '9', '', '2', '', 'Sikkens', '0'),
(183, 'CCT0024', 'Cat Sikkens B804 - 511050 @3,75L Metallic Sparkle', '', '0', '0', '0', '0', '0', '1498008', '0', '0', '22', '', '9', '', '2', '', 'Sikkens', '0'),
(184, 'CCT0065', 'Cat Sikkens B805 - 511052 @3.75L Metallic Sparklin', '', '0', '0', '0', '0', '0', '1044237', '0', '0', '22', '', '9', '', '2', '', 'Sikkens', '0'),
(185, 'CCT0025', 'Cat Sikkens B806 - 511054 @3,75L Metallic Bright C', '', '0', '0', '0', '0', '0', '919394', '0', '0', '22', '', '9', '', '2', '', 'Sikkens', '0'),
(186, 'CCT0026', 'Cat Sikkens B9101 - 511044 @1L Pearl White', '', '0', '0', '0', '0', '0', '417100', '0', '0', '22', '', '9', '', '2', '', 'Sikkens', '0'),
(187, 'CCT0027', 'CAT Sikkens B9203 - 511048 @1L Orange', '', '0', '0', '0', '0', '0', '375390', '0', '0', '22', '', '9', '', '2', '', 'Sikkens', '0'),
(188, 'CCT0028', 'Cat Sikkens B9204 - 511055 @1L Gold Paerl Fine', '', '0', '0', '0', '0', '0', '417100', '0', '0', '22', '', '9', '', '2', '', 'Sikkens', '0'),
(189, 'CCT0029', 'Cat Sikkens B9403 - 511047 @1L Pearl Gold', '', '0', '0', '0', '0', '0', '417100', '0', '0', '22', '', '9', '', '2', '', 'Sikkens', '0'),
(190, 'CCT0057', 'Cat Sikkens Signal Red @1L', '', '0', '0', '0', '0', '0', '0', '0', '0', '22', '', '9', '', '2', '', 'Sikkens', '0'),
(191, 'CCT0070', 'Cat Sikkens T01 - 511003 @3,75L Tinter', '', '0', '0', '20', '0', '0', '890995', '0', '0', '22', '', '9', '', '2', '', 'Sikkens', '0'),
(192, 'CCT0030', 'Cat Sikkens T11 - 511073 @3,75L Super White', '', '0', '8', '30', '0', '0', '662922', '0', '0', '22', '', '9', '', '2', '', 'Sikkens', '3'),
(193, 'CCT0055', 'Cat Sikkens T22 - 510986 @3,75L Black', '', '0', '0', '0', '0', '0', '638961', '0', '0', '22', '', '9', '', '2', '', 'Sikkens', '0'),
(194, 'CCT0032', 'Cat Sikkens T31 - 510987 @3,75L Red (Orange)', '', '0', '0', '0', '0', '0', '749632', '0', '0', '22', '', '9', '', '2', '', 'Sikkens', '0'),
(195, 'CCT0033', 'Cat Sikkens T63 - 510995 @3,75L Yellow (Orange)', '', '0', '0', '0', '0', '0', '2702099', '0', '0', '22', '', '9', '', '2', '', 'Sikkens', '0'),
(196, 'CCT0034', 'Cat Sikkens T65 - 510996 @3,75L Yellow (Orange)', '', '0', '0', '0', '0', '0', '849812', '0', '0', '22', '', '9', '', '2', '', 'Sikkens', '0'),
(197, 'CCT0035', 'Cat Sikkens T83 - 511001 @3,75L Violet (Red)', '', '0', '0', '0', '0', '0', '1524631', '0', '0', '22', '', '9', '', '2', '', 'Sikkens', '0'),
(198, 'CCT0036', 'Cat Sikkens T84 - 511002 @3,75L Violet (Blue)', '', '0', '0', '0', '0', '0', '1042007', '0', '0', '22', '', '9', '', '2', '', 'Sikkens', '0'),
(199, 'CCT0048', 'PILOX HITAM', '', '0', '5', '24', '0', '0', '29000', '0', '0', '22', '', '9', '', '2', '', '300CC', '1'),
(200, 'CDP0006', 'Dempul Auto Glow @1KG', '', '0', '6', '30', '0', '0', '70000', '0', '0', '22', '', '10', '', '2', '', 'AUTO GLOW', '0'),
(201, 'CDP0005', 'Dempul JM Putty @9KG', '', '0', '20', '200', '0', '0', '308700', '0', '0', '22', '', '10', '', '2', '', '@9KG', '0'),
(202, 'CDP0002', 'Dempul RCA Jayalack @25kg', '', '0', '2', '10', '0', '0', '810000', '0', '0', '22', '', '10', '', '2', '', 'RCA', '0'),
(203, 'CDP0008', 'Dempul Sikkens PE Putty @2Kg - 593924', '', '0', '5', '35', '0', '0', '156635', '0', '0', '22', '', '10', '', '2', '', 'Sikkens', '3'),
(204, 'CDP0007', 'Dempul Sikkens PE Putty @3Kg 1003-001', '', '0', '0', '0', '0', '0', '187739', '0', '0', '22', '', '10', '', '2', '', 'Sikkens', '0'),
(205, 'CDP0003', 'Dempul Sikkens Polyfiber @1,55KG', '', '0', '6', '20', '0', '0', '444406', '0', '0', '22', '', '10', '', '2', '', 'Sikkens', '0'),
(206, 'CDP0004', 'Dempul Sikkens Spot Putty @0,2KG', '', '0', '6', '30', '0', '0', '27913', '0', '0', '22', '', '10', '', '2', '', 'Sikkens', '0'),
(207, 'CEP0001', 'Epoxy Auto Bright Filler', '', '0', '6', '24', '0', '0', '98000', '0', '0', '22', '', '12', '', '2', '', 'FILLER', '0'),
(208, 'CEP0007', 'Epoxy Dana Filler', '', '0', '0', '0', '0', '0', '75000', '0', '0', '22', '', '12', '', '2', '', 'Dana', '0'),
(209, 'CEP0002', 'Epoxy Nippe Primer', '', '0', '6', '24', '0', '0', '98000', '0', '0', '22', '', '12', '', '2', '', 'NIPPE', '0'),
(210, 'CEP0003', 'Epoxy RCA Filler @5+1L', '', '0', '5', '15', '0', '0', '380000', '0', '0', '22', '', '12', '', '2', '', 'RCA', '0'),
(211, 'CEP0004', 'Epoxy RCA Primer @5+1L', '', '0', '6', '20', '0', '0', '380000', '0', '0', '22', '', '12', '', '2', '', 'RCA', '2'),
(212, 'CEP0005', 'Epoxy RCA Topcoat Black @5L', '', '0', '3', '15', '0', '0', '455000', '0', '0', '22', '', '12', '', '2', '', 'RCA U/JOK', '1'),
(213, 'CEP0009', 'Epoxy RCA Topcoat Dark Grey @20L', '', '0', '0', '0', '0', '0', '0', '0', '0', '24', '', '12', '', '2', '', 'RCA', '0'),
(214, 'CEP0006', 'Epoxy RCA Topcoat Dark Grey @4+1L', '', '0', '5', '15', '0', '0', '455000', '0', '0', '22', '', '12', '', '2', '', 'RCA', '1'),
(215, 'CEP0010', 'Epoxy Steelglos PP Primer @1L', '', '0', '0', '0', '0', '0', '120000', '0', '0', '22', '', '12', '', '2', '', 'Steelglos', '0'),
(216, 'CEP0011', 'Flinkote Seiv Anti Karat @1L', '', '0', '0', '0', '0', '0', '0', '0', '0', '22', '', '12', '', '2', '', 'Seiv', '0'),
(217, 'CEP0008', 'Flinkote Spray Penta', '', '0', '0', '0', '0', '0', '60000', '0', '0', '22', '', '12', '', '2', '', '-', '0'),
(218, 'CHD0001', 'Hardener Sikkens BT100 Medium - 521508 @1L', '', '0', '8', '30', '0', '0', '154668', '0', '0', '22', '', '17', '', '2', '', 'Sikkens', '5'),
(219, 'CHD0003', 'Hardener Sikkens BT100 Slow - 521509 @1L', '', '0', '0', '0', '0', '0', '178643', '0', '0', '22', '', '17', '', '2', '', 'Sikkens', '0'),
(220, 'CHD0002', 'Hardener Sikkens BT300 - 521519 @5L', '', '0', '15', '50', '0', '0', '228286', '0', '0', '24', '', '17', '', '2', '', 'Sikkens', '0'),
(221, 'CHD0004', 'Hardener Sikkens P35 - 522393 @2.5L', '', '0', '0', '50', '0', '0', '264008', '0', '0', '24', '', '17', '', '2', '', 'Sikkens', '0'),
(222, 'CPR0002', 'Pernis Lux DOP', '', '0', '0', '20', '0', '0', '180000', '0', '0', '24', '', '33', '', '2', '', 'LUX DOP', '0'),
(223, 'CPR0003', 'Pernis Sikkens BT300 - 554405 @5L', '', '0', '30', '100', '0', '0', '182814', '0', '0', '24', '', '33', '', '2', '', 'Sikkens', '0'),
(224, 'CPR0004', 'Pernis Sikkens M&M Low Gloss 520902 @1L', '', '0', '0', '50', '0', '0', '483142', '0', '0', '24', '', '33', '', '2', '', 'Sikkens', '0'),
(225, 'CRV0001', 'PENTA REMOVER/SODA API', '', '0', '1', '10', '0', '0', '165000', '0', '0', '22', '', '37', '', '2', '', 'PELUNTUR CAT', '0'),
(226, 'CTN0001', 'Thiner RCA ND @20L', '', '0', '100', '300', '0', '0', '16000', '0', '0', '24', '', '45', '', '2', '', 'RCA', '60'),
(227, 'CTN0002', 'Thiner RCA Promotor', '', '0', '20', '60', '0', '0', '32500', '0', '0', '24', '', '45', '', '2', '', 'RCA', '2'),
(228, 'CTN0003', 'Thiner RCA PU @20L', '', '0', '60', '300', '0', '0', '25500', '0', '0', '24', '', '45', '', '2', '', 'RCA', '40'),
(229, 'CTN0004', 'Thiner Sikkens Reducer Slow @5L', '', '0', '20', '50', '0', '0', '108393', '0', '0', '24', '', '45', '', '2', '', 'Sikkens', '5'),
(230, 'CTN0005', 'Thiner Sikkens SRA Agent', '', '0', '0', '0', '0', '0', '125000', '0', '0', '24', '', '45', '', '2', '', 'SIKKENS', '0'),
(231, 'EAV0011', 'Box Subwoofer 12\"', '', '0', '0', '0', '0', '0', '350000', '0', '0', '27', '', '4', '', '3', '', 'Subwoofer', '0'),
(232, 'EAV0019', 'Corong Speaker', '', '0', '0', '20', '0', '0', '5000', '0', '0', '27', '', '4', '', '3', '', '-', '0'),
(233, 'EAV0002', 'Power Amplifire 4Chn 12V', '', '0', '1', '5', '0', '0', '1450000', '0', '0', '31', '', '4', '', '3', '', '12V', '1'),
(234, 'EAV0012', 'Power Amplifire 4Chn 24V', '', '0', '0', '5', '0', '0', '2600000', '0', '0', '31', '', '4', '', '3', '', '24V', '1'),
(235, 'EAV0003', 'PRE AMP /PARAMETRIK', '', '0', '1', '5', '0', '0', '700000', '0', '0', '31', '', '4', '', '3', '', '-', '1'),
(236, 'EAV0017', 'Speaker Bulat 4\"', '', '0', '0', '0', '0', '0', '87500', '0', '0', '27', '', '4', '', '3', '', '4\"', '0'),
(237, 'EAV0006', 'Speaker Bulat 6\"', '', '0', '10', '50', '0', '0', '92500', '0', '0', '27', '', '4', '', '3', '', 'Bulat 6\"', '4'),
(238, 'EAV0007', 'Speaker Bulat 6.5\"', '', '0', '10', '30', '0', '0', '107500', '0', '0', '27', '', '4', '', '3', '', '6.5\"', '4'),
(239, 'EAV0008', 'Speaker Oval 6\" Boston', '', '0', '10', '50', '0', '0', '115000', '0', '0', '27', '', '4', '', '3', '', 'BOSTON', '4'),
(240, 'EAV0013', 'Subwoofer 12\"', '', '0', '0', '5', '0', '0', '750000', '0', '0', '27', '', '4', '', '3', '', '12\"', '1'),
(241, 'EAV0009', 'Tape Dvd JEC', '', '0', '5', '20', '0', '0', '550000', '0', '0', '31', '', '4', '', '3', '', 'JEC', '1'),
(242, 'EAV0010', 'Tape Dvd Player Sansui Double Din', '', '0', '0', '0', '0', '0', '1200000', '0', '0', '31', '', '4', '', '3', '', 'Double Din', '1'),
(243, 'EAV0001', 'Tape Dvd Player Singeldin', '', '0', '3', '20', '0', '0', '550000', '0', '0', '31', '', '4', '', '3', '', 'TAPE', '1'),
(244, 'EAV0014', 'Tutup Subwoofer 12\"', '', '0', '0', '5', '0', '0', '130000', '0', '0', '27', '', '4', '', '3', '', '12\"', '1'),
(245, 'EAV0016', 'TV LED 32\" Smart TV Android', '', '0', '0', '0', '0', '0', '3400000', '0', '0', '31', '', '4', '', '3', '', 'Android', '1'),
(246, 'EAV0004', 'TV LED LG 24\"', '', '0', '5', '15', '0', '0', '1500000', '0', '0', '27', '', '4', '', '3', '', 'TV', '1'),
(247, 'EAV0005', 'TV LED LG 32\"', '', '0', '2', '10', '0', '0', '2700000', '0', '0', '31', '', '4', '', '3', '', 'LG 32\"', '1'),
(248, 'EIV0001', 'Inventer Inverco 24v 500w', '', '0', '5', '20', '0', '0', '962500', '0', '0', '27', '', '18', '', '3', '', 'INVERCO', '1'),
(249, 'EIV0002', 'Inventer Inverco 24v 1000w', '', '0', '0', '0', '0', '0', '2300000', '0', '0', '30', '', '18', '', '3', '', 'Inverco', '1'),
(250, 'EKB0001', 'Kabel Tis NO 150', '', '0', '100', '1000', '0', '0', '150', '0', '0', '27', '', '19', '', '3', '', 'TIS', '0'),
(251, 'EKB0002', 'Kabel Tis NO 200', '', '0', '100', '500', '0', '0', '225', '0', '0', '27', '', '19', '', '3', '', 'TIS', '0'),
(252, 'EKB0003', 'Kabel Tis NO 250', '', '0', '100', '500', '0', '0', '250', '0', '0', '27', '', '19', '', '3', '', 'TIS', '0'),
(253, 'EKB0004', 'Kabel Tis NO 300', '', '0', '100', '500', '0', '0', '300', '0', '0', '27', '', '19', '', '3', '', 'TIS', '0'),
(254, 'EKB0005', 'Kabel Tis NO 400', '', '0', '100', '1000', '0', '0', '450', '0', '0', '27', '', '19', '', '3', '', 'TIS', '0'),
(255, 'EKB0020', 'Kabel General @0.85mm Abu', '', '0', '0', '0', '0', '0', '3500', '0', '0', '25', '', '19', '', '3', '', '1MM', '0'),
(256, 'EKB0011', 'Kabel General @0.85mm Biru', '', '0', '60', '300', '0', '0', '3250', '0', '0', '25', '', '19', '', '3', '', '1MM', '0'),
(257, 'EKB0019', 'Kabel General @0.85mm Coklat', '', '0', '0', '0', '0', '0', '3500', '0', '0', '25', '', '19', '', '3', '', '1MM', '0'),
(258, 'EKB0010', 'Kabel General @0.85mm Hijau', '', '0', '60', '300', '0', '0', '3250', '0', '0', '25', '', '19', '', '3', '', '1MM', '0'),
(259, 'EKB0006', 'Kabel General @0.85mm Hitam', '', '0', '60', '300', '0', '0', '3250', '0', '0', '25', '', '19', '', '3', '', '1MM', '0'),
(260, 'EKB0009', 'Kabel General @0.85mm Kuning', '', '0', '60', '300', '0', '0', '3250', '0', '0', '25', '', '19', '', '3', '', '1MM', '0'),
(261, 'EKB0008', 'Kabel General @0.85mm Merah', '', '0', '60', '300', '0', '0', '3250', '0', '0', '25', '', '19', '', '3', '', '1MM', '0'),
(262, 'EKB0012', 'Kabel General @0.85mm Orange', '', '0', '60', '300', '0', '0', '3250', '0', '0', '25', '', '19', '', '3', '', '1MM', '0'),
(263, 'EKB0013', 'Kabel General @0.85mm Pink', '', '0', '60', '300', '0', '0', '3500', '0', '0', '25', '', '19', '', '3', '', '1MM', '0'),
(264, 'EKB0007', 'Kabel General @0.85mm Putih', '', '0', '60', '300', '0', '0', '3250', '0', '0', '25', '', '19', '', '3', '', '1MM', '0'),
(265, 'EKB0014', 'Kabel General @0.85mm Ungu', '', '0', '60', '300', '0', '0', '3250', '0', '0', '25', '', '19', '', '3', '', '1MM', '0'),
(266, 'EKB0026', 'Kabel General @1.50mm Hitam', '', '0', '0', '0', '0', '0', '4375', '0', '0', '25', '', '19', '', '3', '', '1.50mm', '0'),
(267, 'EKB0021', 'Kabel General @2.00mm Hitam', '', '0', '0', '0', '0', '0', '7000', '0', '0', '25', '', '19', '', '3', '', '2MM', '0'),
(268, 'EKB0015', 'Kabel Instal LED', '', '0', '5', '100', '0', '0', '6000', '0', '0', '25', '', '19', '', '3', '', 'U/LED ROLL', '0'),
(269, 'EKB0022', 'Kabel Mic Stereo', '', '0', '0', '0', '0', '0', '10000', '0', '0', '25', '', '19', '', '3', '', 'Mic', '0'),
(270, 'EKB0024', 'Kabel NYYHY 2x1.5 Serabut', '', '0', '0', '200', '0', '0', '7600', '0', '0', '25', '', '19', '', '3', '', 'NYYHY', '0'),
(271, 'EKB0023', 'Kabel NYYHY 2x2.5 Serabut', '', '0', '0', '0', '0', '0', '13000', '0', '0', '25', '', '19', '', '3', '', 'Serabut', '0'),
(272, 'EKB0017', 'Kabel Rca 2Mtr', '', '0', '0', '0', '0', '0', '50000', '0', '0', '30', '', '19', '', '3', '', 'Kabel Audio', '0'),
(273, 'EKB0025', 'Selang Bakar', '', '0', '0', '50', '0', '0', '2500', '0', '0', '25', '', '19', '', '3', '', 'Kabel', '0'),
(274, 'EKB0018', 'Selongsong Kabel 13', '', '0', '0', '0', '0', '0', '2500', '0', '0', '25', '', '19', '', '3', '', 'Hitam', '0'),
(275, 'EKB0016', 'Selongsong Kabel PVC Tube 6/7mm', '', '0', '10', '100', '0', '0', '1000', '0', '0', '25', '', '19', '', '3', '', 'Selongsong kabel', '0'),
(276, 'EKO0028', 'Adaptor + Kabel Tv', '', '0', '0', '0', '0', '0', '65000', '0', '0', '27', '', '24', '', '3', '', 'Tv', '1'),
(277, 'EKO0042', 'Dudukan Sikring Tabung 20A 24V', '', '0', '0', '50', '0', '0', '8000', '0', '0', '27', '', '24', '', '3', '', '20A 24V', '0'),
(278, 'EKO0036', 'Jack RCA', '', '0', '0', '0', '0', '0', '15000', '0', '0', '27', '', '24', '', '3', '', 'RCA', '0'),
(279, 'EKO0029', 'Klem Accu', '', '0', '0', '0', '0', '0', '7500', '0', '0', '27', '', '24', '', '3', '', 'Accu', '0'),
(280, 'EKO0024', 'Kontra Steker Tipis', '', '0', '0', '20', '0', '0', '5000', '0', '0', '27', '', '24', '', '3', '', 'Tipis', '0'),
(281, 'EKO0026', 'Nepel Paneumatik 12mm', '', '0', '0', '0', '0', '0', '30000', '0', '0', '27', '', '24', '', '3', '', '12mm', '0'),
(282, 'EKO0043', 'Nepel Paneumatik 6mm', '', '0', '0', '100', '0', '0', '15000', '0', '0', '27', '', '24', '', '3', '', '6mm', '0'),
(283, 'EKO0025', 'Nepel Paneumatik 8mm', '', '0', '0', '0', '0', '0', '10000', '0', '0', '27', '', '24', '', '3', '', '8mm', '0'),
(284, 'EKO0035', 'Nepel Paneumatik T 6mm', '', '0', '0', '0', '0', '0', '30000', '0', '0', '27', '', '24', '', '3', '', '6mm', '0'),
(285, 'EKO0033', 'Plaser Merk Nilles 24v', '', '0', '0', '0', '0', '0', '50000', '0', '0', '27', '', '24', '', '3', '', 'Niles 24v', '0'),
(286, 'EKO0021', 'RELAY BOSCH 12V', '', '0', '3', '10', '0', '0', '30000', '0', '0', '27', '', '24', '', '3', '', 'RELAY 12V', '0'),
(287, 'EKO0020', 'RELAY BOSCH 24V', '', '0', '5', '20', '0', '0', '50000', '0', '0', '27', '', '24', '', '3', '', 'RELAY 24V', '0'),
(288, 'EKO0032', 'Saklar Bel', '', '0', '0', '0', '0', '0', '10000', '0', '0', '27', '', '24', '', '3', '', 'Toilet', '0'),
(289, 'EKO0030', 'Saklar Dinding', '', '0', '0', '0', '0', '0', '15000', '0', '0', '27', '', '24', '', '3', '', 'Putih', '0'),
(290, 'EKO0001', 'Saklar On/Off Besar Lampu', '', '0', '30', '100', '0', '0', '40994', '0', '0', '27', '', '24', '', '3', '', 'SAKLAR', '6'),
(291, 'EKO0040', 'Saklar On/Off Merah Kecil', '', '0', '0', '20', '0', '0', '4000', '0', '0', '27', '', '24', '', '3', '', '-', '0'),
(292, 'EKO0022', 'Sikring 10A Besar', '', '0', '0', '0', '0', '0', '3000', '0', '0', '27', '', '24', '', '3', '', '10A', '0'),
(293, 'EKO0038', 'Sikring 10A Kecil', '', '0', '0', '0', '0', '0', '1000', '0', '0', '27', '', '24', '', '3', '', '10A', '0'),
(294, 'EKO0039', 'Sikring 15A Besar', '', '0', '0', '0', '0', '0', '500', '0', '0', '27', '', '24', '', '3', '', '15A', '0'),
(295, 'EKO0041', 'Sikring Tabung 20A 24V', '', '0', '0', '50', '0', '0', '667', '0', '0', '27', '', '24', '', '3', '', '20A 24V', '0'),
(296, 'EKO0002', 'SOKET F1', '', '0', '50', '500', '0', '0', '1000', '0', '0', '27', '', '24', '', '3', '', 'F', '0'),
(297, 'EKO0003', 'SOKET F2', '', '0', '50', '500', '0', '0', '1750', '0', '0', '27', '', '24', '', '3', '', 'F', '0'),
(298, 'EKO0004', 'SOKET F3', '', '0', '50', '500', '0', '0', '1750', '0', '0', '27', '', '24', '', '3', '', 'F', '0'),
(299, 'EKO0005', 'SOKET F4', '', '0', '50', '500', '0', '0', '1750', '0', '0', '27', '', '24', '', '3', '', 'F', '0'),
(300, 'EKO0006', 'SOKET F6', '', '0', '50', '500', '0', '0', '2000', '0', '0', '27', '', '24', '', '3', '', 'F', '0'),
(301, 'EKO0007', 'SOKET F8', '', '0', '50', '500', '0', '0', '2100', '0', '0', '27', '', '24', '', '3', '', 'F', '0'),
(302, 'EKO0008', 'SOKET M1', '', '0', '50', '500', '0', '0', '1000', '0', '0', '27', '', '24', '', '3', '', 'M', '0'),
(303, 'EKO0009', 'SOKET M2', '', '0', '50', '500', '0', '0', '1500', '0', '0', '27', '', '24', '', '3', '', 'M', '0'),
(304, 'EKO0010', 'SOKET M3', '', '0', '50', '500', '0', '0', '1750', '0', '0', '27', '', '24', '', '3', '', 'M', '0'),
(305, 'EKO0011', 'SOKET M4', '', '0', '50', '500', '0', '0', '1750', '0', '0', '27', '', '24', '', '3', '', 'M', '0'),
(306, 'EKO0012', 'SOKET M6', '', '0', '50', '500', '0', '0', '2000', '0', '0', '27', '', '24', '', '3', '', 'M', '0'),
(307, 'EKO0013', 'SOKET M8', '', '0', '50', '500', '0', '0', '2100', '0', '0', '27', '', '24', '', '3', '', 'M', '0'),
(308, 'EKO0014', 'SOKET RELAY KOTAK', '', '0', '20', '100', '0', '0', '5000', '0', '0', '27', '', '24', '', '3', '', 'RELAY', '0'),
(309, 'EKO0027', 'Steker Bulat', '', '0', '0', '20', '0', '0', '15000', '0', '0', '27', '', '24', '', '3', '', 'Bulat', '0'),
(310, 'EKO0023', 'Steker Tipis', '', '0', '0', '20', '0', '0', '5000', '0', '0', '27', '', '24', '', '3', '', 'Tipis', '0'),
(311, 'EKO0037', 'Stop Kontak Lubang 2', '', '0', '0', '0', '0', '0', '35000', '0', '0', '27', '', '24', '', '3', '', '-', '0'),
(312, 'EKO0016', 'Terminal Skun 2832 +', '', '0', '500', '2000', '0', '0', '1500', '0', '0', '27', '', '24', '', '3', '', 'SKUN', '0'),
(313, 'EKO0015', 'Terminal Skun 3555 -', '', '0', '500', '2000', '0', '0', '1000', '0', '0', '27', '', '24', '', '3', '', 'SKUN', '0'),
(314, 'EKO0018', 'Terminal Skun Masa 6mm', '', '0', '200', '500', '0', '0', '800', '0', '0', '27', '', '24', '', '3', '', 'Skun Bulat', '0'),
(315, 'EKO0034', 'Terminal Skun Masa 6mm Accu', '', '0', '0', '0', '0', '0', '4000', '0', '0', '27', '', '24', '', '3', '', 'Accu', '0'),
(316, 'EKO0019', 'Terminal Skun Masa 8mm', '', '0', '0', '500', '0', '0', '3000', '0', '0', '27', '', '24', '', '3', '', 'Skun Bulat', '0'),
(317, 'EKO0017', 'Terminal Skun Utilux H2590 Kecil', '', '0', '200', '1000', '0', '0', '1500', '0', '0', '27', '', '24', '', '3', '', 'SKUN', '0'),
(318, 'ELP0032', 'Jam Digital', '', '0', '0', '0', '0', '0', '380000', '0', '0', '27', '', '27', '', '3', '', '-', '1'),
(319, 'ELP0068', 'Lampu Bagasi Tentrem', '', '0', '0', '0', '0', '0', '100000', '0', '0', '27', '', '27', '', '3', '', 'Bagasi', '0'),
(320, 'ELP0039', 'Lampu Blk Avante CH', '', '0', '0', '20', '0', '0', '1300000', '0', '0', '27', '', '27', '', '3', '', 'Avante', '1'),
(321, 'ELP0073', 'Lampu Blk Avante H7 Decoration', '', '0', '0', '20', '0', '0', '1850000', '0', '0', '27', '', '27', '', '3', '', 'Avante H7', '0'),
(322, 'ELP0041', 'Lampu Blk Avante H7 LH', '', '0', '0', '20', '0', '0', '2018182', '0', '0', '27', '', '27', '', '3', '', 'Avante H7', '1'),
(323, 'ELP0040', 'Lampu Blk Avante H7 RH', '', '0', '0', '20', '0', '0', '2018182', '0', '0', '27', '', '27', '', '3', '', 'Avante H7', '1'),
(324, 'ELP0038', 'Lampu Blk Avante LH', '', '0', '0', '20', '0', '0', '1513637', '0', '0', '27', '', '27', '', '3', '', 'Avante', '1'),
(325, 'ELP0037', 'Lampu Blk Avante RH', '', '0', '0', '20', '0', '0', '1513637', '0', '0', '27', '', '27', '', '3', '', 'Avante', '1'),
(326, 'ELP0047', 'Lampu Blk Ecoliner Lh', '', '0', '0', '0', '0', '0', '875000', '0', '0', '27', '', '27', '', '3', '', 'Ecoliner', '1'),
(327, 'ELP0048', 'Lampu Blk Ecoliner Rh', '', '0', '0', '0', '0', '0', '875000', '0', '0', '27', '', '27', '', '3', '', 'Ecoliner', '1'),
(328, 'ELP0080', 'Lampu Blk JB3 R/L', '', '0', '0', '3', '0', '0', '3200000', '0', '0', '30', '', '27', '', '3', '', 'MGI 310', '0'),
(329, 'ELP0013', 'Lampu Blk Jetliner CH', '', '0', '3', '15', '0', '0', '0', '0', '0', '27', '', '27', '', '3', '', 'JETLINER', '1'),
(330, 'ELP0012', 'Lampu Blk Jetliner RH', '', '0', '3', '15', '0', '0', '2119091', '0', '0', '27', '', '27', '', '3', '', 'JETLINER', '1'),
(331, 'ELP0011', 'Lampu Blk Jjetliner LH', '', '0', '3', '15', '0', '0', '2119091', '0', '0', '27', '', '27', '', '3', '', 'JETLINER', '1'),
(332, 'ELP0025', 'Lampu Blk New Travego LH', '', '0', '3', '15', '0', '0', '1059500', '0', '0', '27', '', '27', '', '3', '', 'NEW TRAVEGO', '1'),
(333, 'ELP0026', 'Lampu Blk New Travego RH', '', '0', '3', '15', '0', '0', '1059500', '0', '0', '27', '', '27', '', '3', '', 'NEW TRAVEGO', '1'),
(334, 'ELP0005', 'Lampu Blk Scania Touring CH', '', '0', '3', '10', '0', '0', '900000', '0', '0', '27', '', '27', '', '3', '', 'SCANIA TOURING', '1'),
(335, 'ELP0003', 'Lampu Blk Scania Touring LH', '', '0', '3', '10', '0', '0', '1650000', '0', '0', '27', '', '27', '', '3', '', 'SCANIA TOURING', '1'),
(336, 'ELP0004', 'Lampu Blk Scania Touring RH', '', '0', '3', '10', '0', '0', '1650000', '0', '0', '27', '', '27', '', '3', '', 'SCANIA TOURING', '1'),
(337, 'ELP0064', 'Lampu Blk SR2 Laksana LH', '', '0', '1', '5', '0', '0', '2100000', '0', '0', '27', '', '27', '', '3', '', 'SR2', '1'),
(338, 'ELP0065', 'Lampu Blk SR2 Laksana RH', '', '0', '1', '5', '0', '0', '2100000', '0', '0', '27', '', '27', '', '3', '', 'SR2', '1'),
(339, 'ELP0070', 'Lampu Blk Volvo R/L', '', '0', '0', '0', '0', '0', '1525000', '0', '0', '30', '', '27', '', '3', '', 'Volvo', '1'),
(340, 'ELP0043', 'Lampu Brake JB2', '', '0', '0', '20', '0', '0', '302727', '0', '0', '27', '', '27', '', '3', '', 'JB2', '1'),
(341, 'ELP0044', 'Lampu Dpn Avante LH', '', '0', '0', '20', '0', '0', '1925000', '0', '0', '27', '', '27', '', '3', '', 'Avante', '1'),
(342, 'ELP0045', 'Lampu Dpn Avante RH', '', '0', '0', '20', '0', '0', '1925000', '0', '0', '27', '', '27', '', '3', '', 'Avante', '1'),
(343, 'ELP0067', 'Lampu Dpn Discovery R/L', '', '0', '0', '0', '0', '0', '2950000', '0', '0', '30', '', '27', '', '3', '', 'Laksana', '0'),
(344, 'ELP0050', 'Lampu Dpn Ecoliner LH', '', '0', '0', '0', '0', '0', '1825000', '0', '0', '27', '', '27', '', '3', '', 'Ecoliner', '0'),
(345, 'ELP0051', 'Lampu Dpn Ecoliner RH', '', '0', '0', '0', '0', '0', '1825000', '0', '0', '27', '', '27', '', '3', '', 'Ecoliner', '0'),
(346, 'ELP0023', 'Lampu Dpn EVO-X LH', '', '0', '3', '15', '0', '0', '1765909', '0', '0', '27', '', '27', '', '3', '', 'EVO-X', '1'),
(347, 'ELP0024', 'Lampu Dpn EVO-X RH', '', '0', '3', '15', '0', '0', '1765909', '0', '0', '27', '', '27', '', '3', '', 'EVO-X', '1'),
(348, 'ELP0052', 'Lampu Dpn JB 2 LH', '', '0', '0', '0', '0', '0', '1825000', '0', '0', '27', '', '27', '', '3', '', 'Jetbus 2', '1'),
(349, 'ELP0053', 'Lampu Dpn JB 2 RH', '', '0', '0', '0', '0', '0', '1825000', '0', '0', '27', '', '27', '', '3', '', 'Jetbus 2', '1'),
(350, 'ELP0077', 'Lampu Dpn JB3 R/L', '', '0', '0', '5', '0', '0', '3650000', '0', '0', '30', '', '27', '', '3', '', 'MGI 310', '0'),
(351, 'ELP0007', 'Lampu Dpn Jetliner LH', '', '0', '3', '15', '0', '0', '1513500', '0', '0', '27', '', '27', '', '3', '', 'JETLINER', '1'),
(352, 'ELP0008', 'Lampu Dpn Jjetliner RH', '', '0', '3', '15', '0', '0', '1513500', '0', '0', '27', '', '27', '', '3', '', 'JETLINER', '1'),
(353, 'ELP0014', 'Lampu Dpn Scorpion-X LH', '', '0', '3', '10', '0', '0', '1665000', '0', '0', '27', '', '27', '', '3', '', 'SCORPION-X', '1'),
(354, 'ELP0015', 'Lampu Dpn Scorpion-X RH', '', '0', '3', '10', '0', '0', '1665000', '0', '0', '27', '', '27', '', '3', '', 'SCORPION-X', '1'),
(355, 'ELP0058', 'Lampu Dpn SR2 CH', '', '0', '0', '0', '0', '0', '1261364', '0', '0', '27', '', '27', '', '3', '', 'SR2', '0'),
(356, 'ELP0056', 'Lampu Dpn SR2 LH', '', '0', '0', '0', '0', '0', '2175000', '0', '0', '27', '', '27', '', '3', '', 'SR2', '0'),
(357, 'ELP0057', 'Lampu Dpn SR2 RH', '', '0', '0', '0', '0', '0', '2175000', '0', '0', '27', '', '27', '', '3', '', 'SR2', '0'),
(358, 'ELP0079', 'Lampu DRL JB3 R/L', '', '0', '0', '3', '0', '0', '300000', '0', '0', '30', '', '27', '', '3', '', 'MGI 310', '0'),
(359, 'ELP0029', 'Lampu Foglamp Bulat 4\"', '', '0', '10', '30', '0', '0', '80000', '0', '0', '27', '', '27', '', '3', '', '4\"', '2'),
(360, 'ELP0059', 'Lampu Foglamp Bulat 5\"', '', '0', '0', '0', '0', '0', '0', '0', '0', '27', '', '27', '', '3', '', 'Bulat 5\"', '0'),
(361, 'ELP0078', 'Lampu Foglamp JB3 R/L', '', '0', '0', '3', '0', '0', '900000', '0', '0', '30', '', '27', '', '3', '', 'MGI 310', '0'),
(362, 'ELP0031', 'Lampu Foglamp Kotak 7\"Tentrem', '', '0', '0', '0', '0', '0', '100000', '0', '0', '27', '', '27', '', '3', '', 'TENTREM', '2'),
(363, 'ELP0030', 'Lampu Foglamp Kotak Hino RH/LH', '', '0', '0', '0', '0', '0', '275000', '0', '0', '30', '', '27', '', '3', '', 'HINO KOTAK', '1'),
(364, 'ELP0002', 'Lampu Foglamp Tempe LH', '', '0', '5', '20', '0', '0', '186682', '0', '0', '27', '', '27', '', '3', '', 'FOGLAMP', '1'),
(365, 'ELP0001', 'Lampu Foglamp Tempe RH', '', '0', '5', '20', '0', '0', '186682', '0', '0', '27', '', '27', '', '3', '', 'FOGLAMP', '1'),
(366, 'ELP0054', 'Lampu KIA Blk Reflektor CH', '', '0', '0', '0', '0', '0', '1425000', '0', '0', '27', '', '27', '', '3', '', 'Ambulance', '1');
INSERT INTO `tbl_wh_barang` (`id_barang`, `no_part`, `nama_part`, `nama_part_e`, `stok`, `stok_a`, `stok_p`, `minstok_a`, `minstok_p`, `hrg_awal`, `hrg_1`, `hrg_2`, `satuan`, `kelompok`, `type`, `lokasi`, `kategori`, `supplier`, `ket`, `std_pakai`) VALUES
(367, 'ELP0055', 'Lampu KIA Blk RH', '', '0', '0', '0', '0', '0', '950000', '0', '0', '27', '', '27', '', '3', '', 'Ambulance', '1'),
(368, 'ELP0036', 'Lampu Led Daylight Merah LH', '', '0', '0', '20', '0', '0', '175000', '0', '0', '27', '', '27', '', '3', '', 'Merah', '1'),
(369, 'ELP0035', 'Lampu Led Daylight Merah Rh', '', '0', '0', '20', '0', '0', '175000', '0', '0', '27', '', '27', '', '3', '', 'Merah', '1'),
(370, 'ELP0034', 'Lampu Led Daylight Putih LH', '', '0', '0', '20', '0', '0', '150000', '0', '0', '27', '', '27', '', '3', '', 'Putih', '1'),
(371, 'ELP0033', 'Lampu Led Daylight Putih RH', '', '0', '0', '20', '0', '0', '150000', '0', '0', '27', '', '27', '', '3', '', 'Putih', '1'),
(372, 'ELP0006', 'Lampu LED DRL', '', '0', '5', '20', '0', '0', '160000', '0', '0', '30', '', '27', '', '3', '', 'PUTIH', '2'),
(373, 'ELP0061', 'Lampu Led Marker SR 2', '', '0', '0', '0', '0', '0', '60000', '0', '0', '27', '', '27', '', '3', '', 'SR 2', '0'),
(374, 'ELP0075', 'Lampu LED Roll 12V Biru', '', '0', '0', '20', '0', '0', '90000', '0', '0', '28', '', '27', '', '3', '', '12V', '0'),
(375, 'ELP0074', 'Lampu LED Roll 12V Putih', '', '0', '0', '20', '0', '0', '90000', '0', '0', '28', '', '27', '', '3', '', '12V', '0'),
(376, 'ELP0017', 'Lampu LED Roll 24V Biru', '', '0', '3', '20', '0', '0', '180000', '0', '0', '28', '', '27', '', '3', '', '24V BIRU', '1'),
(377, 'ELP0016', 'Lampu LED Roll 24V Putih', '', '0', '20', '100', '0', '0', '180000', '0', '0', '28', '', '27', '', '3', '', '24V PUTIH', '4'),
(378, 'ELP0020', 'Lampu LED Sein Bulat', '', '0', '5', '30', '0', '0', '51000', '0', '0', '27', '', '27', '', '3', '', 'LED BULAT', '4'),
(379, 'ELP0021', 'Lampu LED Sein G7 Kuning', '', '0', '20', '100', '0', '0', '95000', '0', '0', '27', '', '27', '', '3', '', 'LED G7', '6'),
(380, 'ELP0022', 'Lampu LED Sein G7 Merah', '', '0', '10', '50', '0', '0', '58023', '0', '0', '27', '', '27', '', '3', '', 'LED G7', '2'),
(381, 'ELP0042', 'Lampu Led Sein JB3 Kotak Kecil', '', '0', '0', '0', '0', '0', '121091', '0', '0', '27', '', '27', '', '3', '', 'JB3 Kuning', '0'),
(382, 'ELP0018', 'Lampu LED Sein Oval Besar Kuning', '', '0', '20', '100', '0', '0', '32500', '0', '0', '27', '', '27', '', '3', '', 'LED OVAL', '6'),
(383, 'ELP0019', 'Lampu LED Sein Oval Kecil Merah', '', '0', '10', '50', '0', '0', '28500', '0', '0', '27', '', '27', '', '3', '', 'LED OVAL', '2'),
(384, 'ELP0049', 'Lampu Led Sein Oval New', '', '0', '0', '0', '0', '0', '30000', '0', '0', '27', '', '27', '', '3', '', 'RS', '0'),
(385, 'ELP0076', 'Lampu Led Spot Plafon 12V', '', '0', '0', '20', '0', '0', '65000', '0', '0', '27', '', '27', '', '3', '', '12V', '0'),
(386, 'ELP0046', 'Lampu Led Spot Plafon 24V', '', '0', '0', '0', '0', '0', '0', '0', '0', '27', '', '27', '', '3', '', 'Led', '0'),
(387, 'ELP0069', 'Lampu Marker H7 Kuning', '', '0', '0', '0', '0', '0', '175000', '0', '0', '27', '', '27', '', '3', '', 'H7', '0'),
(388, 'ELP0009', 'Lampu Reflektor JB2 LH', '', '0', '4', '20', '0', '0', '201818', '0', '0', '27', '', '27', '', '3', '', 'JB2', '1'),
(389, 'ELP0010', 'Lampu Reflektor JB2 RH', '', '0', '4', '20', '0', '0', '201818', '0', '0', '27', '', '27', '', '3', '', 'JB2', '1'),
(390, 'ELP0081', 'Lampu Reflektor JB3 R/L', '', '0', '0', '3', '0', '0', '200000', '0', '0', '30', '', '27', '', '3', '', 'MGI 310', '0'),
(391, 'ELP0027', 'Lampu Reflektor Rush/CRV LH', '', '0', '10', '50', '0', '0', '37500', '0', '0', '27', '', '27', '', '3', '', 'MERAH', '1'),
(392, 'ELP0028', 'Lampu Reflektor Rush/CRV RH', '', '0', '10', '50', '0', '0', '37500', '0', '0', '27', '', '27', '', '3', '', 'MERAH', '1'),
(393, 'ELP0072', 'MIka Lampu Blk JB-2 LH', '', '0', '0', '0', '0', '0', '300000', '0', '0', '27', '', '27', '', '3', '', 'JB2', '0'),
(394, 'ELP0071', 'MIka Lampu Blk JB-2 RH', '', '0', '0', '0', '0', '0', '300000', '0', '0', '27', '', '27', '', '3', '', 'JB2', '0'),
(395, 'ELP0066', 'MIka Lampu Scaniatouring LH', '', '0', '0', '0', '0', '0', '675000', '0', '0', '27', '', '27', '', '3', '', 'Mika', '0'),
(396, 'ELP0062', 'MIka Lampu Scaniatouring RH', '', '0', '0', '0', '0', '0', '675000', '0', '0', '27', '', '27', '', '3', '', 'Mika', '2'),
(397, 'EWP0001', 'Wiper Gagang LH', '', '0', '5', '20', '0', '0', '186682', '0', '0', '27', '', '48', '', '3', '', 'Wiper', '1'),
(398, 'EWP0002', 'Wiper Gagang RH', '', '0', '5', '20', '0', '0', '186682', '0', '0', '27', '', '48', '', '3', '', 'Wiper', '1'),
(399, 'EWP0003', 'Wiper Blade/Karet 80cm', '', '0', '10', '20', '0', '0', '100909', '0', '0', '27', '', '48', '', '3', '', 'Wiper', '2'),
(400, 'EWP0004', 'Wiper Link/Mekanik', '', '0', '5', '20', '0', '0', '725000', '0', '0', '30', '', '48', '', '3', '', 'Wiper', '1'),
(401, 'EWP0005', 'Wiper Dinamo', '', '0', '5', '20', '0', '0', '1000000', '0', '0', '27', '', '48', '', '3', '', 'Wiper', '1'),
(402, 'FMA0001', 'Errosil Wacker 10Kg', '', '0', '0', '0', '0', '0', '160000', '0', '0', '21', '', '30', '', '4', '', '-', '0'),
(403, 'FMA0002', 'Mepoxe Catalyst @5kg', '', '0', '0', '0', '0', '0', '85000', '0', '0', '21', '', '30', '', '4', '', '-', '0'),
(404, 'FMA0003', 'Mirror Glaze', '', '0', '3', '20', '0', '0', '140000', '0', '0', '22', '', '30', '', '4', '', '-', '0'),
(405, 'FMT0001', 'PVA Glue', '', '0', '0', '0', '0', '0', '75000', '0', '0', '21', '', '30', '', '4', '', '-', '0'),
(406, 'FMA0004', 'Resin UPR 2668 W-NC @225kg', '', '0', '225', '2000', '0', '0', '30600', '0', '0', '21', '', '30', '', '4', '', '-', '0'),
(407, 'FMA0005', 'Serat Fiber CSM 300X104 Niser Blue @30kg', '', '0', '60', '1000', '0', '0', '27900', '0', '0', '21', '', '30', '', '4', '', '-', '0'),
(408, 'FMT0002', 'Serat Fiber CSM 450X104 Niser Blue @30kg', '', '0', '0', '0', '0', '0', '25100', '0', '0', '21', '', '30', '', '4', '', '450', '0'),
(409, 'FPR0031', 'Fiber Avante Alis Bemper Dpn @22X44', '', '0', '0', '10', '0', '0', '38000', '0', '0', '27', '', '35', '', '4', '', 'AVANTE', '2'),
(410, 'FPR0032', 'Fiber Avante Bando Dpn @27X330', '', '0', '0', '10', '0', '0', '348000', '0', '0', '27', '', '35', '', '4', '', 'AVANTE', '1'),
(411, 'FPR0033', 'Fiber Avante Bando Smp LH/RH @46X245', '', '0', '0', '10', '0', '0', '440000', '0', '0', '27', '', '35', '', '4', '', 'AVANTE', '2'),
(412, 'FPR0034', 'Fiber Avante Bemper Dpn @110X300', '', '0', '0', '10', '0', '0', '1288000', '0', '0', '27', '', '35', '', '4', '', 'AVANTE', '1'),
(413, 'FPR0028', 'Fiber Avante Cowl Dpn Dalam @39X350', '', '0', '0', '10', '0', '0', '533000', '0', '0', '27', '', '35', '', '4', '', 'AVANTE', '1'),
(414, 'FPR0029', 'Fiber Avante Cowl Dpn Luar @28X236', '', '0', '0', '10', '0', '0', '258000', '0', '0', '27', '', '35', '', '4', '', 'AVANTE', '1'),
(415, 'FPR0035', 'Fiber Avante Dashboard Full Set', '', '0', '0', '15', '0', '0', '3270000', '0', '0', '30', '', '35', '', '4', '', 'AVANTE', '1'),
(416, 'FPR0050', 'Fiber Avante H7 Bemper Blk', '', '0', '0', '0', '0', '0', '1100000', '0', '0', '27', '', '35', '', '4', '', 'Fiber Tentrem', '1'),
(417, 'FPR0030', 'Fiber Avante Kap Dpn @42X190', '', '0', '0', '10', '0', '0', '312000', '0', '0', '27', '', '35', '', '4', '', 'AVANTE', '1'),
(418, 'FPR0055', 'Fiber Cover AC LD 8I Blk Evaporator 222x164', '', '0', '0', '20', '0', '0', '1311000', '0', '0', '27', '', '35', '', '4', '', 'AC LD 8I', '0'),
(419, 'FPR0054', 'Fiber Cover AC LD 8I Dpn Condensor 220x115', '', '0', '0', '20', '0', '0', '981000', '0', '0', '27', '', '35', '', '4', '', 'AC LD 8I', '0'),
(420, 'FPR0046', 'Fiber Cover Reklening MU Besar @59X40', '', '0', '0', '0', '0', '0', '69000', '0', '0', '27', '', '35', '', '4', '', 'Fiber Jok Mu', '10'),
(421, 'FPR0049', 'Fiber Cover Reklening MU Kecil', '', '0', '0', '0', '0', '0', '41000', '0', '0', '27', '', '35', '', '4', '', 'MU Kecil', '10'),
(422, 'FPR0047', 'Fiber Cover Reklening RS @58X33', '', '0', '0', '0', '0', '0', '69000', '0', '0', '27', '', '35', '', '4', '', 'Fiber Jok RS', '0'),
(423, 'FPR0056', 'Fiber Cowl Dpn + Blk Medium JB3', '', '0', '0', '0', '0', '0', '6500000', '0', '0', '30', '', '35', '', '4', '', 'MGI 310', '0'),
(424, 'FPR0007', 'Fiber Ecoline Cowl Dpn 250x302', '', '0', '0', '0', '0', '0', '2370000', '0', '0', '27', '', '35', '', '4', '', 'Ecoliner', '1'),
(425, 'FPR0008', 'Fiber Ecoline Kap Dpn 55x175', '', '0', '0', '0', '0', '0', '310000', '0', '0', '27', '', '35', '', '4', '', 'Ecoliner', '0'),
(426, 'FPR0009', 'Fiber Ecoline Spakboard BLK', '', '0', '0', '0', '0', '0', '0', '0', '0', '27', '', '35', '', '4', '', 'ECOLINE', '0'),
(427, 'FPR0011', 'Fiber Evo-X Cowl Belakang @305X305', '', '0', '4', '10', '0', '0', '4239000', '0', '0', '27', '', '35', '', '4', '', 'EVO-X', '1'),
(428, 'FPR0012', 'Fiber Evo-X Cowl Dpn @183X336', '', '0', '3', '10', '0', '0', '2832000', '0', '0', '27', '', '35', '', '4', '', 'EVO-X', '1'),
(429, 'FPR0013', 'Fiber Evo-X Ducting Blk @315X175', '', '0', '4', '10', '0', '0', '1985000', '0', '0', '27', '', '35', '', '4', '', 'EVO-X', '1'),
(430, 'FPR0014', 'Fiber Evo-X Ducting Dpn', '', '0', '0', '0', '0', '0', '0', '0', '0', '27', '', '35', '', '4', '', 'EVO-X', '0'),
(431, 'FPR0016', 'Fiber Evo-X Kap Dpn', '', '0', '4', '10', '0', '0', '344000', '0', '0', '27', '', '35', '', '4', '', 'EVO-X', '1'),
(432, 'FPR0015', 'Fiber Evo-X Kap Mesin Blk @216X92', '', '0', '4', '10', '0', '0', '875000', '0', '0', '27', '', '35', '', '4', '', 'EVO-X', '1'),
(433, 'FPR0017', 'Fiber Evo-X Spakboard Blk @111X196', '', '0', '8', '20', '0', '0', '864000', '0', '0', '27', '', '35', '', '4', '', 'EVO-X', '2'),
(434, 'FPR0018', 'Fiber Evo-X Spakboard Dpn @105X241', '', '0', '8', '20', '0', '0', '1003000', '0', '0', '27', '', '35', '', '4', '', 'EVO-X', '2'),
(435, 'FPR0052', 'Fiber Hi Ace Plafon 93x257', '', '0', '0', '20', '0', '0', '861000', '0', '0', '27', '', '35', '', '4', '', 'Hi Ace', '0'),
(436, 'FPR0025', 'Fiber Jetliner Bando Dpn Dalam @25X240', '', '0', '3', '10', '0', '0', '235000', '0', '0', '27', '', '35', '', '4', '', 'JETLINER', '1'),
(437, 'FPR0024', 'Fiber Jetliner Bando Dpn Luar @35X275', '', '0', '3', '10', '0', '0', '376000', '0', '0', '27', '', '35', '', '4', '', 'JETLINER', '1'),
(438, 'FPR0026', 'Fiber Jetliner Bando Smp R/L @19x130', '', '0', '4', '10', '0', '0', '97000', '0', '0', '27', '', '35', '', '4', '', 'JETLINER', '2'),
(439, 'FPR0027', 'Fiber Jetliner Bemper Dpn @300X58', '', '0', '2', '5', '0', '0', '550000', '0', '0', '27', '', '35', '', '4', '', 'JETLINER', '1'),
(440, 'FPR0044', 'Fiber Jetliner Box Tv 32\" Dlm 62X77', '', '0', '0', '20', '0', '0', '261000', '0', '0', '27', '', '35', '', '4', '', 'Jetliner', '1'),
(441, 'FPR0045', 'Fiber Jetliner Box Tv 32\" Luar 92X136', '', '0', '0', '20', '0', '0', '602000', '0', '0', '27', '', '35', '', '4', '', 'Jetliner', '1'),
(442, 'FPR0043', 'Fiber Jetliner Cov Pnt Blk 88X180', '', '0', '0', '20', '0', '0', '500000', '0', '0', '27', '', '35', '', '4', '', 'Jetliner', '1'),
(443, 'FPR0042', 'Fiber Jetliner Cov Pnt Dpn R/L 88X145', '', '0', '0', '20', '0', '0', '400000', '0', '0', '27', '', '35', '', '4', '', 'Jetliner', '2'),
(444, 'FPR0036', 'Fiber Jetliner Cowl Blk+Bemper @300X346', '', '0', '0', '20', '0', '0', '4651000', '0', '0', '27', '', '35', '', '4', '', 'JETLINER', '1'),
(445, 'FPR0004', 'Fiber Jetliner Cowl Dpn A @81X257', '', '0', '5', '10', '0', '0', '812000', '0', '0', '27', '', '35', '', '4', '', 'JETLINER', '1'),
(446, 'FPR0005', 'Fiber Jetliner Cowl Dpn B @175X309', '', '0', '5', '10', '0', '0', '2109000', '0', '0', '27', '', '35', '', '4', '', 'JETLINER', '1'),
(447, 'FPR0038', 'Fiber Jetliner Ducting Dpn 170X280', '', '0', '0', '20', '0', '0', '2025000', '0', '0', '27', '', '35', '', '4', '', 'Jetliner', '1'),
(448, 'FPR0039', 'Fiber Jetliner Hook Dpn Ats 57X245', '', '0', '0', '20', '0', '0', '545000', '0', '0', '27', '', '35', '', '4', '', 'Jetliner', '1'),
(449, 'FPR0037', 'Fiber Jetliner Kap Blk @96X130', '', '0', '0', '20', '0', '0', '390000', '0', '0', '27', '', '35', '', '4', '', 'JETLINER', '1'),
(450, 'FPR0010', 'Fiber Jetliner Spakboard RH/LH @107X152', '', '0', '12', '20', '0', '0', '580000', '0', '0', '27', '', '35', '', '4', '', 'JETLINER', '4'),
(451, 'FPR0041', 'Fiber Jetliner Spoiler Blk 60X270', '', '0', '0', '20', '0', '0', '510000', '0', '0', '27', '', '35', '', '4', '', 'Jetliner', '1'),
(452, 'FPR0040', 'Fiber Jetliner Spoiler Smp 2 R/L 45X880', '', '0', '0', '20', '0', '0', '2051000', '0', '0', '27', '', '35', '', '4', '', 'Jetliner', '2'),
(453, 'FPR0053', 'Fiber Scorpion X Cowl Dpn + Kap @140x293', '', '0', '0', '10', '0', '0', '1600000', '0', '0', '30', '', '35', '', '4', '', 'Scorpion X', '0'),
(454, 'FPR0023', 'FIBER SKYLINER BUMPER BELAKANG @225X78', '', '0', '4', '10', '0', '0', '548000', '0', '0', '27', '', '35', '', '4', '', 'SKYLINER', '1'),
(455, 'FPR0021', 'FIBER SKYLINER COWL BELAKANG @317X326', '', '0', '4', '10', '0', '0', '3225000', '0', '0', '27', '', '35', '', '4', '', 'SKYALINER', '1'),
(456, 'FPR0019', 'FIBER SKYLINER COWL DEPAN @309X175', '', '0', '4', '10', '0', '0', '1688000', '0', '0', '27', '', '35', '', '4', '', 'SKYLINER', '1'),
(457, 'FPR0022', 'FIBER SKYLINER KAP BELAKANG @220X114', '', '0', '4', '10', '0', '0', '783000', '0', '0', '27', '', '35', '', '4', '', 'SKYLINER', '1'),
(458, 'FPR0020', 'FIBER SKYLINER KAP DEPAN @178X52', '', '0', '4', '10', '0', '0', '289000', '0', '0', '27', '', '35', '', '4', '', 'SKYLINER', '1'),
(459, 'FPR0051', 'Fiber Tutup Velg @80x80', '', '0', '0', '0', '0', '0', '250000', '0', '0', '27', '', '35', '', '4', '', 'Fiber MPU', '0'),
(460, 'IAB0001', 'Abs Kulit Jeruk Abu Muda 2X1220X2440', '', '0', '60', '150', '0', '0', '213000', '0', '0', '23', '', '1', '', '5', '', 'KULIT JERUK', '20'),
(461, 'IAB0002', 'Abs Kulit Jeruk Abu Tua 2X1220X2440', '', '0', '0', '0', '0', '0', '195000', '0', '0', '23', '', '1', '', '5', '', 'KULIT JERUK', '0'),
(462, 'IAB0006', 'Abs Kulit Jeruk Cream 2X1220X2440', '', '0', '0', '0', '0', '0', '195000', '0', '0', '23', '', '1', '', '5', '', 'Cream', '0'),
(463, 'IAB0003', 'Abs Wajik Abu Muda 2X1220X2440', '', '0', '0', '200', '0', '0', '213000', '0', '0', '23', '', '1', '', '5', '', 'WAJIK', '0'),
(464, 'IAB0004', 'ABS WAJIK ABU TUA', '', '0', '0', '0', '0', '0', '0', '0', '0', '23', '', '1', '', '5', '', '213000', '0'),
(465, 'IAB0005', 'Gordeng Holder', '', '0', '50', '200', '0', '0', '27500', '0', '0', '27', '', '1', '', '5', '', 'GREY', '12'),
(466, 'IAL0016', 'Alumunium Plat Bordes 1,5X4X8', '', '0', '1', '6', '0', '0', '1104000', '0', '0', '23', '', '2', '', '5', '', 'LANTAI', '0'),
(467, 'IAL0002', 'Klem Alm 1 1/4\" Bolong', '', '0', '10', '50', '0', '0', '18500', '0', '0', '27', '', '2', '', '5', '', '1 1/4\"', '0'),
(468, 'IAL0020', 'Klem Alm 1 1/4\" Jepit Kaca', '', '0', '20', '100', '0', '0', '12000', '0', '0', '27', '', '2', '', '5', '', '1 1/4\"', '0'),
(469, 'IAL0003', 'Klem Alm 1 1/4\" L', '', '0', '10', '50', '0', '0', '13000', '0', '0', '27', '', '2', '', '5', '', '1 1/4\"', '0'),
(470, 'IAL0019', 'Klem Alm 1 1/4\" Oval K2', '', '0', '20', '50', '0', '0', '18500', '0', '0', '27', '', '2', '', '5', '', '1 1/4\"', '0'),
(471, 'IAL0018', 'Klem Alm 1 1/4\" Oval K3', '', '0', '10', '50', '0', '0', '18500', '0', '0', '27', '', '2', '', '5', '', '1 1/4\"', '0'),
(472, 'IAL0004', 'Klem Alm 1 1/4\" T', '', '0', '10', '50', '0', '0', '12000', '0', '0', '27', '', '2', '', '5', '', '1 1/4\"', '0'),
(473, 'IAL0001', 'Klem Alm 1 1/4\" T Belah', '', '0', '10', '50', '0', '0', '16000', '0', '0', '27', '', '2', '', '5', '', '1 1/4\"', '0'),
(474, 'IAL0005', 'Klem Alm 1 1/4\" Tutup', '', '0', '10', '50', '0', '0', '18500', '0', '0', '27', '', '2', '', '5', '', '1 1/4\"', '0'),
(475, 'IAL0006', 'Klem Alm 1\" Bolong', '', '0', '20', '100', '0', '0', '9000', '0', '0', '27', '', '2', '', '5', '', '1\"', '0'),
(476, 'IAL0007', 'Klem Alm 1\" Tutup', '', '0', '10', '50', '0', '0', '9000', '0', '0', '27', '', '2', '', '5', '', '1\"', '0'),
(477, 'IAL0026', 'Klem Alm Tutup Rel Jok', '', '0', '0', '0', '0', '0', '16000', '0', '0', '27', '', '2', '', '5', '', 'Rel Jok', '0'),
(478, 'IAL0025', 'Lis Alumunium Bagasi Ecoline 2627', '', '0', '0', '0', '0', '0', '300000', '0', '0', '17', '', '2', '', '5', '', 'Ecoliner', '0'),
(479, 'IAL0022', 'Lis Alumunium Bagasi Ecoline 3002', '', '0', '0', '0', '0', '0', '550000', '0', '0', '17', '', '2', '', '5', '', 'Ecoliner', '0'),
(480, 'IAL0023', 'Lis Alumunium Bagasi Ecoline 3003', '', '0', '0', '0', '0', '0', '680000', '0', '0', '17', '', '2', '', '5', '', 'Ecoliner', '0'),
(481, 'IAL0024', 'Lis Alumunium Bagasi Ecoline 3004', '', '0', '0', '0', '0', '0', '950000', '0', '0', '17', '', '2', '', '5', '', 'Ecoliner', '0'),
(482, 'IAL0017', 'Lis Alumunium Gordeng', '', '0', '10', '100', '0', '0', '110000', '0', '0', '17', '', '2', '', '5', '', 'GORDENG', '3'),
(483, 'IAL0027', 'Lis Alumunium H Plafon', '', '0', '0', '0', '0', '0', '0', '0', '0', '17', '', '2', '', '5', '', 'Plafon', '0'),
(484, 'IAL0009', 'Lis Alumunium Pancing', '', '0', '20', '100', '0', '0', '62000', '0', '0', '17', '', '2', '', '5', '', 'U/LANTAI', '3'),
(485, 'IAL0008', 'Lis Alumunium Paneumatic Body 7886', '', '0', '10', '100', '0', '0', '277000', '0', '0', '17', '', '2', '', '5', '', 'BODY PINTU', '3'),
(486, 'IAL0010', 'Lis Alumunium Paneumatic Pintu 7885', '', '0', '15', '100', '0', '0', '229000', '0', '0', '17', '', '2', '', '5', '', 'U/PINTU', '3'),
(487, 'IAL0028', 'Lis Alumunium Rel Jok', '', '0', '0', '0', '0', '0', '305000', '0', '0', '17', '', '2', '', '5', '', 'Rel Jok', '0'),
(488, 'IAL0011', 'Lis Alumunium Tangga MU Tebal 2mm', '', '0', '10', '100', '0', '0', '150000', '0', '0', '17', '', '2', '', '5', '', 'U/LANTAI', '3'),
(489, 'IAL0012', 'Lis Alumunium Tangga RS', '', '0', '10', '100', '0', '0', '190000', '0', '0', '17', '', '2', '', '5', '', 'U/LANTAI', '3'),
(490, 'IAL0021', 'Lis Alumunium Tangga Tipis', '', '0', '0', '100', '0', '0', '122000', '0', '0', '27', '', '2', '', '5', '', 'Lis Alumunium', '0'),
(491, 'IAL0030', 'Lis Plat Led Plafon 50x2800 1.0mm', '', '0', '0', '200', '0', '0', '40000', '0', '0', '17', '', '2', '', '5', '', 'Lis Plafon', '8'),
(492, 'IAL0029', 'Peredam Alumunium Foil', '', '0', '0', '0', '0', '0', '47000', '0', '0', '25', '', '2', '', '5', '', 'Peredam', '0'),
(493, 'IAL0014', 'Pipa Steinless 1 1/4\" @6M', '', '0', '0', '50', '0', '0', '140000', '0', '0', '17', '', '2', '', '5', '', 'STEINLESS', '0'),
(494, 'IAL0015', 'Pipa Steinless 1\" @6M', '', '0', '0', '50', '0', '0', '120000', '0', '0', '17', '', '2', '', '5', '', 'STEINLESS', '0'),
(495, 'IEX0013', 'Dinamo Exaust 24V', '', '0', '0', '0', '0', '0', '500000', '0', '0', '27', '', '13', '', '5', '', '24v', '0'),
(496, 'IEX0001', 'Emergency Exhaust Fan', '', '0', '0', '0', '0', '0', '1450000', '0', '0', '27', '', '13', '', '5', '', 'EXECUTIF', '1'),
(497, 'IEX0002', 'Emergency Exhaust Non Fan', '', '0', '1', '5', '0', '0', '1100000', '0', '0', '27', '', '13', '', '5', '', 'EKONOMI', '1'),
(498, 'IEX0004', 'FLATNER', '', '0', '0', '0', '0', '0', '0', '0', '0', '27', '', '13', '', '5', '', 'SMOKING AREA', '0'),
(499, 'IEX0005', 'Louper AC Adi Putro Besar', '', '0', '5', '10', '0', '0', '125000', '0', '0', '27', '', '13', '', '5', '', 'SCOR-X', '0'),
(500, 'IEX0010', 'Louper AC JB1 Abu Besar', '', '0', '10', '50', '0', '0', '95000', '0', '0', '27', '', '13', '', '5', '', 'JB1', '24'),
(501, 'IEX0011', 'Louper AC JB1 Abu Kecil', '', '0', '5', '20', '0', '0', '25000', '0', '0', '27', '', '13', '', '5', '', 'JB1', '4'),
(502, 'IEX0008', 'Louper AC JB1 Cream Besar', '', '0', '5', '50', '0', '0', '95000', '0', '0', '27', '', '13', '', '5', '', 'JB1', '24'),
(503, 'IEX0009', 'Louper AC JB1 Cream Kecil', '', '0', '5', '10', '0', '0', '25000', '0', '0', '27', '', '13', '', '5', '', 'JB1', '4'),
(504, 'IEX0012', 'Louper AC Jetliner Besar', '', '0', '5', '24', '0', '0', '225000', '0', '0', '27', '', '13', '', '5', '', 'JETLINER', '24'),
(505, 'IEX0014', 'Louper AC Optic Led Biru', '', '0', '0', '50', '0', '0', '86000', '0', '0', '27', '', '13', '', '5', '', 'Optic', '0'),
(506, 'IEX0006', 'Louper AC RS Kotak Besar', '', '0', '10', '50', '0', '0', '125000', '0', '0', '27', '', '13', '', '5', '', 'RS', '24'),
(507, 'IEX0007', 'Louper AC RS Kotak Kecil', '', '0', '10', '20', '0', '0', '50000', '0', '0', '27', '', '13', '', '5', '', 'RS', '4'),
(508, 'IEX0003', 'Sun Roof', '', '0', '0', '0', '0', '0', '0', '0', '0', '27', '', '13', '', '5', '', 'EKONOMI', '0'),
(509, 'IGO0007', 'Cincin Gordeng Bulat', '', '0', '0', '1000', '0', '0', '2000', '0', '0', '27', '', '15', '', '5', '', '-', '0'),
(510, 'IGO0006', 'Kain Gordeng Avante 19Pcs', '', '0', '3', '10', '0', '0', '950000', '0', '0', '30', '', '15', '', '5', '', 'Avante', '1'),
(511, 'IGO0005', 'Kain Gordeng Cuci', '', '0', '5', '20', '0', '0', '80000', '0', '0', '30', '', '15', '', '5', '', 'CUCIAN', '1'),
(512, 'IGO0004', 'Kain Gordeng MU 18Pcs', '', '0', '5', '20', '0', '0', '950000', '0', '0', '30', '', '15', '', '5', '', 'MU', '1'),
(513, 'IGO0003', 'Kain Gordeng RS 22Pcs', '', '0', '5', '20', '0', '0', '950000', '0', '0', '30', '', '15', '', '5', '', 'RS', '1'),
(514, 'IGO0002', 'Kawat Gordeng', '', '0', '1000', '20000', '0', '0', '50', '0', '0', '27', '', '15', '', '5', '', '-', '130'),
(515, 'IGO0001', 'Roda Gordeng', '', '0', '1000', '20000', '0', '0', '150', '0', '0', '27', '', '15', '', '5', '', 'KECIL', '130'),
(516, 'IKC0143', 'Kaca AP001 Ats Pnt Blk 30x77', '', '0', '0', '10', '0', '0', '127000', '0', '0', '27', '', '20', '', '5', '', 'AP 001 Biru', '0'),
(517, 'IKC0141', 'Kaca AP001 Ats Pnt Dpn 45x64', '', '0', '0', '10', '0', '0', '159000', '0', '0', '27', '', '20', '', '5', '', 'AP 001 Biru', '0'),
(518, 'IKC0146', 'Kaca AP001 FG Pnt Dpn LH 129x78', '', '0', '0', '10', '0', '0', '1400000', '0', '0', '27', '', '20', '', '5', '', 'AP001 Biru', '0'),
(519, 'IKC0145', 'Kaca AP001 FG Pnt Dpn RH 129x90', '', '0', '0', '10', '0', '0', '1350000', '0', '0', '27', '', '20', '', '5', '', 'AP 001 Biru', '0'),
(520, 'IKC0142', 'Kaca AP001 Pnt Blk 48x69', '', '0', '0', '10', '0', '0', '183000', '0', '0', '27', '', '20', '', '5', '', 'AP 001 Biru', '0'),
(521, 'IKC0144', 'Kaca AP001 Smp No1 100x253.5', '', '0', '0', '10', '0', '0', '1521000', '0', '0', '27', '', '20', '', '5', '', 'AP 001 Biru', '0'),
(522, 'IKC0051', 'Kaca Avante Blk 85x217', '', '0', '0', '10', '0', '0', '900000', '0', '0', '27', '', '20', '', '5', '', 'Avante', '1'),
(523, 'IKC0042', 'Kaca Avante H7 Blk 63.6x210', '', '0', '0', '10', '0', '0', '950000', '0', '0', '27', '', '20', '', '5', '', 'Avante H7', '1'),
(524, 'IKC0054', 'Kaca Avante H7 Smp Pjk 101.5x119', '', '0', '0', '10', '0', '0', '775000', '0', '0', '27', '', '20', '', '5', '', 'Avante H7', '2'),
(525, 'IKC0043', 'Kaca Avante Pnt Blk 71x91', '', '0', '0', '10', '0', '0', '330000', '0', '0', '27', '', '20', '', '5', '', 'Avante R11000', '1'),
(526, 'IKC0061', 'Kaca Avante Pnt Dpn 109.5x79.5 LH', '', '0', '0', '10', '0', '0', '1650000', '0', '0', '27', '', '20', '', '5', '', 'Avante Frm.Evalia', '1'),
(527, 'IKC0136', 'Kaca Avante Pnt Dpn 109.5x79.5 RH', '', '0', '0', '10', '0', '0', '1650000', '0', '0', '27', '', '20', '', '5', '', 'Avante Frm.Evalia', '0'),
(528, 'IKC0022', 'Kaca Avante Pnt Dpn 110x80 LH', '', '0', '0', '10', '0', '0', '1665000', '0', '0', '27', '', '20', '', '5', '', '523-010152', '1'),
(529, 'IKC0021', 'Kaca Avante Pnt Dpn 110x80 RH', '', '0', '0', '10', '0', '0', '1665000', '0', '0', '27', '', '20', '', '5', '', '523-010151', '1'),
(530, 'IKC0095', 'Kaca Avante Pnt Dpn 778x79.5 Non Frame', '', '0', '0', '10', '0', '0', '850000', '0', '0', '27', '', '20', '', '5', '', 'Avante Non Frame', '0'),
(531, 'IKC0096', 'Kaca Avante Pnt Dpn Sld 35.5x19.5 Non Frame', '', '0', '0', '10', '0', '0', '75000', '0', '0', '27', '', '20', '', '5', '', 'Avante Non Frame', '0'),
(532, 'IKC0140', 'Kaca Avante Pnt Emergency 72X75', '', '0', '0', '20', '0', '0', '351000', '0', '0', '27', '', '20', '', '5', '', 'Avante', '0'),
(533, 'IKC0076', 'Kaca Avante RG Smp No 5 101x200.5', '', '0', '0', '10', '0', '0', '1600000', '0', '0', '27', '', '20', '', '5', '', 'Avante RG', '0'),
(534, 'IKC0045', 'Kaca Avante Smp No 3&4 101x204.5', '', '0', '0', '10', '0', '0', '1305000', '0', '0', '27', '', '20', '', '5', '', 'Avante EG', '0'),
(535, 'IKC0060', 'Kaca Avante Smp No 5 101x201', '', '0', '0', '10', '0', '0', '1280000', '0', '0', '27', '', '20', '', '5', '', 'Avante', '0'),
(536, 'IKC0034', 'Kaca Avante Smp No 1 Ats 73x116.5', '', '0', '0', '10', '0', '0', '550000', '0', '0', '27', '', '20', '', '5', '', 'Avante', '2'),
(537, 'IKC0035', 'Kaca Avante Smp No 1 Bwh 89x107', '', '0', '0', '10', '0', '0', '620000', '0', '0', '27', '', '20', '', '5', '', 'Avante', '2'),
(538, 'IKC0053', 'Kaca Avante Smp No 2 101X154', '', '0', '0', '10', '0', '0', '1105000', '0', '0', '27', '', '20', '', '5', '', 'Avante', '2'),
(539, 'IKC0006', 'Kaca Avante Smp No 4 101X207 LH', '', '0', '0', '10', '0', '0', '1600000', '0', '0', '27', '', '20', '', '5', '', 'AVANTE H7 RG', '0'),
(540, 'IKC0008', 'Kaca Avante Smp No 5 101X200', '', '0', '0', '10', '0', '0', '1315000', '0', '0', '27', '', '20', '', '5', '', 'AVANTE H7', '0'),
(541, 'IKC0039', 'Kaca Avante Smp Pjk 101.5x111', '', '0', '0', '10', '0', '0', '735000', '0', '0', '27', '', '20', '', '5', '', 'Avante 1', '2'),
(542, 'IKC0139', 'Kaca Dpn AP17 Bis Medium', '', '0', '0', '10', '0', '0', '3900000', '0', '0', '27', '', '20', '', '5', '', 'MGI 310', '0'),
(543, 'IKC0014', 'Kaca Dpn Avante L ST02 B Bawah', '', '0', '3', '10', '0', '0', '2753355', '0', '0', '27', '', '20', '', '5', '', '200-7377', '1'),
(544, 'IKC0013', 'Kaca Dpn Avante L ST02 C Atas', '', '0', '3', '10', '0', '0', '3802194', '0', '0', '27', '', '20', '', '5', '', '200-7425', '1'),
(545, 'IKC0004', 'Kaca Dpn BRS 540', '', '0', '3', '10', '0', '0', '4227546', '0', '0', '27', '', '20', '', '5', '', 'RS', '1'),
(546, 'IKC0005', 'Kaca Dpn BRS 610 Euroliner', '', '0', '5', '15', '0', '0', '4363854', '0', '0', '27', '', '20', '', '5', '', 'RS 610', '1'),
(547, 'IKC0092', 'Kaca Dpn Discovery KL12 FW', '', '0', '0', '0', '0', '0', '3988230', '0', '0', '27', '', '20', '', '5', '', 'Laksana', '0'),
(548, 'IKC0030', 'Kaca Dpn Jetliner A Fw 200-7323', '', '0', '0', '0', '0', '0', '1981865', '0', '0', '27', '', '20', '', '5', '', 'Jetliner', '1'),
(549, 'IKC0031', 'Kaca Dpn Jetliner B Fw 200-7280', '', '0', '0', '0', '0', '0', '2295560', '0', '0', '27', '', '20', '', '5', '', 'Jetliner', '1'),
(550, 'IKC0135', 'Kaca Dpn JLN A FW 200-7323', '', '0', '0', '10', '0', '0', '3191949', '0', '0', '27', '', '20', '', '5', '', 'JETLINER ORI', '0'),
(551, 'IKC0082', 'Kaca Dpn JLN B FW 200-7280', '', '0', '2', '10', '0', '0', '2802948', '0', '0', '27', '', '20', '', '5', '', 'Jetliner ORI', '1'),
(552, 'IKC0019', 'Kaca Dpn L PJS 01 A FW Ats 200-7435', '', '0', '3', '10', '0', '0', '2488398', '0', '0', '27', '', '20', '', '5', '', '200-7435', '1'),
(553, 'IKC0020', 'Kaca Dpn L PJS 01 B FW Bwh 200-7435', '', '0', '3', '10', '0', '0', '3736260', '0', '0', '27', '', '20', '', '5', '', '200-7435', '1'),
(554, 'IKC0003', 'Kaca Dpn L ST01 Fw GLT-X Scorpion 200-7242', '', '0', '5', '15', '0', '0', '3549285', '0', '0', '27', '', '20', '', '5', '', 'SCORPIN-X', '1'),
(555, 'IKC0001', 'Kaca Dpn MSB 3 Travego 200-1254', '', '0', '5', '15', '0', '0', '3291816', '0', '0', '27', '', '20', '', '5', '', 'MU', '1'),
(556, 'IKC0002', 'Kaca Dpn MSB 4 Travego 200-1449', '', '0', '5', '15', '0', '0', '4013705', '0', '0', '27', '', '20', '', '5', '', 'MU', '1'),
(557, 'IKC0028', 'Kaca Dpn SR2 L KLHD A FW 200-7391', '', '0', '0', '0', '0', '0', '4374580', '0', '0', '27', '', '20', '', '5', '', 'Laksana SR2', '0'),
(558, 'IKC0029', 'Kaca Dpn SR2 L KLHD B FW 200-7392', '', '0', '0', '0', '0', '0', '3472524', '0', '0', '27', '', '20', '', '5', '', 'Laksana SR2', '0'),
(559, 'IKC0071', 'Kaca Ecoline Blk 74x210', '', '0', '0', '0', '0', '0', '700000', '0', '0', '27', '', '20', '', '5', '', 'RS Ecoliner', '1'),
(560, 'IKC0093', 'Kaca Ecoline Smp No1 104x185', '', '0', '0', '0', '0', '0', '1060000', '0', '0', '27', '', '20', '', '5', '', 'Ecoliner', '0'),
(561, 'IKC0116', 'Kaca Ecoline Smp No2 104x166.5', '', '0', '0', '10', '0', '0', '955000', '0', '0', '27', '', '20', '', '5', '', 'Ecoliner', '0'),
(562, 'IKC0128', 'Kaca Ecoline Smp No3 104x150', '', '0', '0', '10', '0', '0', '860000', '0', '0', '27', '', '20', '', '5', '', 'Ecoliner', '0'),
(563, 'IKC0062', 'Kaca Ecoline Smp Pjk 103.5x126', '', '0', '0', '0', '0', '0', '715000', '0', '0', '27', '', '20', '', '5', '', 'Ecoliner', '2'),
(564, 'IKC0078', 'Kaca Ecoliner Pnt Dpn 122x78 R/L', '', '0', '1', '5', '0', '0', '1350000', '0', '0', '27', '', '20', '', '5', '', 'Ecoliner', '2'),
(565, 'IKC0129', 'Kaca Ecoliner Pnt Dpn A 59x75 R/L', '', '0', '0', '10', '0', '0', '245000', '0', '0', '27', '', '20', '', '5', '', 'Ecoliner', '0'),
(566, 'IKC0130', 'Kaca Ecoliner Smp Selendang 42x131 R/L', '', '0', '0', '10', '0', '0', '220000', '0', '0', '27', '', '20', '', '5', '', 'Ecoliner', '0'),
(567, 'IKC0075', 'Kaca Evo X Pnt Emergency 87x74', '', '0', '0', '0', '0', '0', '390000', '0', '0', '27', '', '20', '', '5', '', 'RS Evo X', '1'),
(568, 'IKC0067', 'Kaca Evo X Smp No5 93x160', '', '0', '0', '0', '0', '0', '985000', '0', '0', '27', '', '20', '', '5', '', 'RS Evo X', '0'),
(569, 'IKC0074', 'Kaca Evo X Smp Pjk 95x124', '', '0', '0', '0', '0', '0', '710000', '0', '0', '27', '', '20', '', '5', '', 'RS Evo X', '2'),
(570, 'IKC0026', 'Kaca Evo-X Blk 74.5x207', '', '0', '0', '0', '0', '0', '550000', '0', '0', '27', '', '20', '', '5', '', 'Evo-X', '1'),
(571, 'IKC0036', 'Kaca Evo-x Smp No1 92/93x198 Rs Rkj', '', '0', '0', '0', '0', '0', '1105000', '0', '0', '27', '', '20', '', '5', '', 'Evo-x Rs Rkj R11000', '0'),
(572, 'IKC0055', 'Kaca Evo-x Smp No2 93x150 Rs Rkj', '', '0', '0', '0', '0', '0', '1100000', '0', '0', '27', '', '20', '', '5', '', 'Evo-x', '0'),
(573, 'IKC0009', 'Kaca Jetliner Ats Pnt Dpn 42X62 R/L', '', '0', '2', '20', '0', '0', '190000', '0', '0', '27', '', '20', '', '5', '', 'JETLINER E.G 2021', '2'),
(574, 'IKC0086', 'Kaca Jetliner Ats Pnt Dpn 87X78 R/L', '', '0', '0', '0', '0', '0', '340000', '0', '0', '27', '', '20', '', '5', '', 'Jetliner Ori RS', '2'),
(575, 'IKC0011', 'Kaca Jetliner Blk 73X202.5 PP', '', '0', '5', '15', '0', '0', '750000', '0', '0', '27', '', '20', '', '5', '', 'JETLINER PP EG. 2019', '1'),
(576, 'IKC0015', 'Kaca Jetliner Blk 74X209 Ori RS', '', '0', '1', '5', '0', '0', '750000', '0', '0', '27', '', '20', '', '5', '', 'JETLINER ORI', '1'),
(577, 'IKC0084', 'Kaca Jetliner Ori Smp No.1 107x184.5', '', '0', '0', '0', '0', '0', '1185000', '0', '0', '27', '', '20', '', '5', '', 'Jetliner Ori RS', '0'),
(578, 'IKC0089', 'Kaca Jetliner Pnt Blk 46x74.5', '', '0', '0', '0', '0', '0', '189000', '0', '0', '27', '', '20', '', '5', '', 'Jetliner PP', '1'),
(579, 'IKC0088', 'Kaca Jetliner Pnt Blk Ats 36x84.5', '', '0', '0', '0', '0', '0', '152000', '0', '0', '27', '', '20', '', '5', '', 'Jetliner PP', '1'),
(580, 'IKC0033', 'Kaca Jetliner Pnt Dpn 128X79 LH', '', '0', '2', '15', '0', '0', '1400000', '0', '0', '27', '', '20', '', '5', '', 'Jetliner EG.FG. PP02 R11000', '1'),
(581, 'IKC0032', 'Kaca Jetliner Pnt Dpn 128x79 RH', '', '0', '0', '0', '0', '0', '1450000', '0', '0', '27', '', '20', '', '5', '', 'Jetliner EG.FG. PP02', '2'),
(582, 'IKC0010', 'Kaca Jetliner Pnt Dpn 129X90 RH', '', '0', '2', '15', '0', '0', '1350000', '0', '0', '27', '', '20', '', '5', '', 'Jetliner FG - EG. 2021', '1'),
(583, 'IKC0138', 'Kaca Jetliner Pnt Dpn 140.5x68', '', '0', '0', '5', '0', '0', '1400000', '0', '0', '27', '', '20', '', '5', '', 'Jetliner PP2019', '0'),
(584, 'IKC0007', 'Kaca Jetliner Pnt Dpn 144X82 R/L', '', '0', '0', '10', '0', '0', '1450000', '0', '0', '27', '', '20', '', '5', '', 'Jetliner RS Ori', '2'),
(585, 'IKC0105', 'Kaca Jetliner Pnt Emergency 94.5x74', '', '0', '0', '0', '0', '0', '441000', '0', '0', '27', '', '20', '', '5', '', 'Jetliner Emergency', '0'),
(586, 'IKC0085', 'Kaca Jetliner Smp No1 Bwh 50x46', '', '0', '0', '0', '0', '0', '115000', '0', '0', '27', '', '20', '', '5', '', 'Jetliner Ori RS', '2'),
(587, 'IKC0072', 'Kaca Jetliner Smp No3.4 108x150', '', '0', '0', '0', '0', '0', '975000', '0', '0', '27', '', '20', '', '5', '', 'Jetliner', '0'),
(588, 'IKC0073', 'Kaca Jetliner Smp No3.4.5 108x167.5', '', '0', '0', '0', '0', '0', '1100000', '0', '0', '27', '', '20', '', '5', '', 'Jetliner Ori RS', '0'),
(589, 'IKC0057', 'Kaca Jetliner Smp Pjk 108x120', '', '0', '0', '0', '0', '0', '835000', '0', '0', '27', '', '20', '', '5', '', 'Jetliner', '0'),
(590, 'IKC0052', 'Kaca Laksana SR2 Blk', '', '0', '0', '0', '0', '0', '1500000', '0', '0', '27', '', '20', '', '5', '', '201-7118', '1'),
(591, 'IKC0049', 'Kaca MU Blk 73.5x204.5', '', '0', '0', '0', '0', '0', '550000', '0', '0', '27', '', '20', '', '5', '', 'MU', '1'),
(592, 'IKC0125', 'Kaca MU Pnt Area A 88x49', '', '0', '0', '20', '0', '0', '151000', '0', '0', '27', '', '20', '', '5', '', 'Smoking Area', '0'),
(593, 'IKC0126', 'Kaca MU Pnt Area B 70x49', '', '0', '0', '20', '0', '0', '121000', '0', '0', '27', '', '20', '', '5', '', 'Smoking Area', '0'),
(594, 'IKC0017', 'Kaca MU Pnt Blk 50X74.5', '', '0', '3', '10', '0', '0', '685000', '0', '0', '27', '', '20', '', '5', '', 'NEW MU1 2020', '1'),
(595, 'IKC0090', 'Kaca MU Pnt Dpn 131x72 DelimaJaya', '', '0', '0', '2', '0', '0', '1350000', '0', '0', '27', '', '20', '', '5', '', 'MU Delima Jaya', '2'),
(596, 'IKC0018', 'Kaca MU Pnt Dpn 133x75', '', '0', '1', '10', '0', '0', '750000', '0', '0', '27', '', '20', '', '5', '', 'MU 2019', '2'),
(597, 'IKC0012', 'Kaca MU Pnt Dpn 136X76.5', '', '0', '4', '10', '0', '0', '1350000', '0', '0', '27', '', '20', '', '5', '', 'MU NEW FG - EG.', '2'),
(598, 'IKC0046', 'Kaca MU Pnt Dpn Ats 46x120', '', '0', '0', '0', '0', '0', '195000', '0', '0', '27', '', '20', '', '5', '', 'MU', '2'),
(599, 'IKC0122', 'Kaca MU RG Smp Pjk 88x116.5', '', '0', '0', '10', '0', '0', '545000', '0', '0', '27', '', '20', '', '5', '', 'MU RG', '0'),
(600, 'IKC0123', 'Kaca MU RKJ Smp Pjk 91.5x137', '', '0', '0', '10', '0', '0', '755000', '0', '0', '27', '', '20', '', '5', '', 'MU RKJ', '0'),
(601, 'IKC0094', 'Kaca MU Skat Area 65X80/82', '', '0', '0', '10', '0', '0', '165000', '0', '0', '27', '', '20', '', '5', '', 'Smoking Area', '0'),
(602, 'IKC0068', 'Kaca Mu Smp No1 151x63', '', '0', '0', '0', '0', '0', '315000', '0', '0', '27', '', '20', '', '5', '', 'MU Rkj', '0'),
(603, 'IKC0056', 'Kaca Mu Smp No4 87x185', '', '0', '0', '0', '0', '0', '700000', '0', '0', '27', '', '20', '', '5', '', 'Mu', '0'),
(604, 'IKC0118', 'Kaca MU smp pjk 87x126', '', '0', '0', '10', '0', '0', '900000', '0', '0', '27', '', '20', '', '5', '', 'MU', '0'),
(605, 'IKC0117', 'Kaca MU2 Pnt Dpn 145x74', '', '0', '0', '10', '0', '0', '900000', '0', '0', '27', '', '20', '', '5', '', 'MU2 R11000 FG.', '0'),
(606, 'IKC0120', 'Kaca MU3 Pnt Dpn 151x76', '', '0', '0', '10', '0', '0', '1450000', '0', '0', '27', '', '20', '', '5', '', 'MU3 FG 2022', '0'),
(607, 'IKC0069', 'Kaca RS Evo X Pnt Dpn 120.5x77', '', '0', '0', '0', '0', '0', '1400000', '0', '0', '27', '', '20', '', '5', '', 'RS Evo X', '0'),
(608, 'IKC0070', 'Kaca RS Evo X Pnt Dpn Ats 56.5x68/77', '', '0', '0', '0', '0', '0', '143000', '0', '0', '27', '', '20', '', '5', '', 'RS Evo X', '2'),
(609, 'IKC0134', 'Kaca RS Evo X Smp No 3 93x150', '', '0', '0', '10', '0', '0', '900000', '0', '0', '27', '', '20', '', '5', '', 'RS Evo X', '0'),
(610, 'IKC0038', 'Kaca RS Pnt Dpn 81x96', '', '0', '0', '0', '0', '0', '550000', '0', '0', '27', '', '20', '', '5', '', 'Rs Rkj', '0'),
(611, 'IKC0047', 'Kaca RS Pnt Dpn Ats 36x75', '', '0', '0', '0', '0', '0', '114000', '0', '0', '27', '', '20', '', '5', '', 'RS', '2'),
(612, 'IKC0048', 'Kaca RS RKJ Pnt Dpn Ats 46x120', '', '0', '0', '0', '0', '0', '143000', '0', '0', '27', '', '20', '', '5', '', 'RS RKJ', '2'),
(613, 'IKC0025', 'Kaca RS Rkj Smp No1 93x198', '', '0', '0', '0', '0', '0', '1600000', '0', '0', '27', '', '20', '', '5', '', 'RS RKJ', '0'),
(614, 'IKC0016', 'Kaca RS Skat Area 65X62X65', '', '0', '0', '0', '0', '0', '140000', '0', '0', '27', '', '20', '', '5', '', 'Smoking Area', '0'),
(615, 'IKC0059', 'Kaca Scorpion King Blk 83x207', '', '0', '0', '0', '0', '0', '950000', '0', '0', '27', '', '20', '', '5', '', 'Scorpion King', '1'),
(616, 'IKC0127', 'Kaca Scorpion X Pnt Dpn A 42.5x66.5', '', '0', '0', '10', '0', '0', '190000', '0', '0', '27', '', '20', '', '5', '', 'Scorpion X', '0'),
(617, 'IKC0063', 'Kaca Scorpion X Pnt Emergency 90x63', '', '0', '0', '0', '0', '0', '312000', '0', '0', '27', '', '20', '', '5', '', 'Scorpion X', '0'),
(618, 'IKC0124', 'Kaca Scorpion X Smp No1 A 101x206', '', '0', '0', '10', '0', '0', '1145000', '0', '0', '27', '', '20', '', '5', '', 'Scorpion X', '0'),
(619, 'IKC0121', 'Kaca Scorpion X Smp No1 B 53x131', '', '0', '0', '10', '0', '0', '245000', '0', '0', '27', '', '20', '', '5', '', 'Scorpion X', '0'),
(620, 'IKC0050', 'Kaca Scorpion X Smp Pjk 102x131', '', '0', '0', '0', '0', '0', '725000', '0', '0', '27', '', '20', '', '5', '', 'Scorpion X', '2'),
(621, 'IKC0058', 'Kaca Scorpion-X Blk 81.5x211', '', '0', '0', '0', '0', '0', '700000', '0', '0', '27', '', '20', '', '5', '', 'Scorpion-X', '1'),
(622, 'IKC0027', 'Kaca Scorpion-x Smp No4 101x198', '', '0', '0', '0', '0', '0', '1095000', '0', '0', '27', '', '20', '', '5', '', 'Scorpion-x', '0'),
(623, 'IKC0083', 'Kaca Skyliner Pnt Dpn 156x77', '', '0', '0', '0', '0', '0', '1400000', '0', '0', '27', '', '20', '', '5', '', 'Skyliner PP', '2'),
(624, 'IKC0040', 'Kaca Skyliner Pnt Dpn FG 160x74', '', '0', '0', '0', '0', '0', '1450000', '0', '0', '27', '', '20', '', '5', '', 'Skyliner Laka', '2'),
(625, 'IKC0024', 'Kaca SR2 Pintu Dpn LH 83x108', '', '0', '0', '0', '0', '0', '1350000', '0', '0', '27', '', '20', '', '5', '', 'LAKSANA', '1'),
(626, 'IKC0023', 'Kaca SR2 Pintu Dpn RH 90x114', '', '0', '0', '0', '0', '0', '1350000', '0', '0', '27', '', '20', '', '5', '', 'LAKSANA', '1'),
(627, 'IKA0011', 'Kain Imitasi Cream', '', '0', '0', '0', '0', '0', '127000', '0', '0', '25', '', '21', '', '5', '', 'Cream', '0'),
(628, 'IKA0013', 'Kain Imitasi MB-9005 Abu Muda', '', '0', '0', '50', '0', '0', '127000', '0', '0', '25', '', '21', '', '5', '', 'Imitasi', '0'),
(629, 'IKA0012', 'Kain Imitasi MB-9011 Mocca', '', '0', '0', '0', '0', '0', '127000', '0', '0', '25', '', '21', '', '5', '', 'Imitasi', '0'),
(630, 'IKA0006', 'Kain Imitasi MB-9013 Coklat', '', '0', '0', '0', '0', '0', '127000', '0', '0', '25', '', '21', '', '5', '', 'Imitasi', '0'),
(631, 'IKA0008', 'Kain Imitasi Merah', '', '0', '0', '0', '0', '0', '69000', '0', '0', '25', '', '21', '', '5', '', 'Imitasi', '0'),
(632, 'IKA0001', 'Kain Imitasi Porsche 9121 Hitam', '', '0', '5', '70', '0', '0', '57000', '0', '0', '25', '', '21', '', '5', '', 'Imitasi', '0'),
(633, 'IKA0009', 'Kain Imitasi Verotec Hitam', '', '0', '0', '0', '0', '0', '62000', '0', '0', '25', '', '21', '', '5', '', 'Verotec', '0'),
(634, 'IKA0005', 'Kain Imitasi Zeus 9002 Abu', '', '0', '5', '70', '0', '0', '70000', '0', '0', '25', '', '21', '', '5', '', 'Imitasi', '0'),
(635, 'IKA0015', 'Kain Imitasi Zeus 9008 Cream', '', '0', '0', '50', '0', '0', '70000', '0', '0', '25', '', '21', '', '5', '', 'Imitasi', '0'),
(636, 'IKA0014', 'Kain Imitasi Zeus 9013 Brown', '', '0', '0', '50', '0', '0', '70000', '0', '0', '25', '', '21', '', '5', '', 'Imitasi', '0'),
(637, 'IKA0004', 'Kain Inlet / Kasa Nyamuk', '', '0', '15', '60', '0', '0', '9600', '0', '0', '25', '', '21', '', '5', '', 'U/AC', '2'),
(638, 'IKA0010', 'Kain Kirigami Scarlet (Merah)', '', '0', '0', '0', '0', '0', '96873', '0', '0', '25', '', '21', '', '5', '', 'Kirigami', '0'),
(639, 'IKA0002', 'Kain Origami 010 Merah', '', '0', '30', '100', '0', '0', '96000', '0', '0', '25', '', '21', '', '5', '', 'Origami', '0'),
(640, 'IKA0003', 'Kain OXA 600 Grey A', '', '0', '250', '1000', '0', '0', '96873', '0', '0', '25', '', '21', '', '5', '', 'ABU', '0'),
(641, 'IKR0030', 'Karet Balon Bagasi Ecoline', '', '0', '50', '150', '0', '0', '18500', '0', '0', '25', '', '22', '', '5', '', 'Bagasi Ecoliner', '50'),
(642, 'IKR0001', 'Karet Balon Bagasi Kecil', '', '0', '150', '500', '0', '0', '18400', '0', '0', '25', '', '22', '', '5', '', 'U/BAGASI', '50'),
(643, 'IKR0002', 'Karet Beat Outer', '', '0', '5', '50', '0', '0', '58800', '0', '0', '27', '', '22', '', '5', '', 'U/PERSNELING', '1'),
(644, 'IKR0026', 'Karet H Abu-abu', '', '0', '0', '0', '0', '0', '5400', '0', '0', '27', '', '22', '', '5', '', '-', '0'),
(645, 'IKR0019', 'Karet Harmaflex', '', '0', '3', '20', '0', '0', '320000', '0', '0', '23', '', '22', '', '5', '', 'AC', '1'),
(646, 'IKR0003', 'Karet Jepit', '', '0', '30', '100', '0', '0', '12000', '0', '0', '25', '', '22', '', '5', '', 'U/KACA', '0'),
(647, 'IKR0004', 'Karet Kaca Belakang', '', '0', '30', '100', '0', '0', '44300', '0', '0', '25', '', '22', '', '5', '', 'U/KACA', '5'),
(648, 'IKR0024', 'Karet Kaca Dpn Avante A', '', '0', '0', '10', '0', '0', '614360', '0', '0', '27', '', '22', '', '5', '', 'Avante', '1'),
(649, 'IKR0025', 'Karet Kaca Dpn Avante B', '', '0', '0', '10', '0', '0', '604860', '0', '0', '27', '', '22', '', '5', '', 'Avante', '1'),
(650, 'IKR0005', 'Karet Kaca Dpn BRS 540', '', '0', '3', '10', '0', '0', '654500', '0', '0', '27', '', '22', '', '5', '', 'U/KACA', '1'),
(651, 'IKR0006', 'Karet Kaca Dpn BRS 610 Euroliner', '', '0', '5', '15', '0', '0', '745900', '0', '0', '27', '', '22', '', '5', '', 'RS 610', '1'),
(652, 'IKR0023', 'Karet Kaca Dpn JLN B', '', '0', '0', '0', '0', '0', '548045', '0', '0', '27', '', '22', '', '5', '', 'JETLINER', '1'),
(653, 'IKR0009', 'Karet Kaca Dpn MSB 3 Travego', '', '0', '3', '15', '0', '0', '652000', '0', '0', '27', '', '22', '', '5', '', 'U/KACA', '1'),
(654, 'IKR0021', 'Karet Kaca Dpn PJS A', '', '0', '3', '10', '0', '0', '562000', '0', '0', '27', '', '22', '', '5', '', 'PJS A', '1'),
(655, 'IKR0022', 'Karet Kaca Dpn PJS B', '', '0', '3', '10', '0', '0', '655000', '0', '0', '27', '', '22', '', '5', '', 'PJS B', '1'),
(656, 'IKR0007', 'Karet Kaca Dpn Roll', '', '0', '30', '150', '0', '0', '87700', '0', '0', '25', '', '22', '', '5', '', 'U/KACA', '8'),
(657, 'IKR0008', 'Karet Kaca Dpn Scorpion-X', '', '0', '0', '0', '0', '0', '0', '0', '0', '27', '', '22', '', '5', '', 'U/KACA', '0'),
(658, 'IKR0027', 'Karet Kaki Jok Bulat No21', '', '0', '0', '0', '0', '0', '5000', '0', '0', '27', '', '22', '', '5', '', 'Karet Jok', '0'),
(659, 'IKR0031', 'Karet Peredam Lantai 50x80', '', '0', '0', '20', '0', '0', '70000', '0', '0', '23', '', '22', '', '5', '', 'Peredam', '0'),
(660, 'IKR0012', 'Karet Pintu Blk Paneumatik 43X260 LH', '', '0', '5', '20', '0', '0', '260400', '0', '0', '27', '', '22', '', '5', '', 'PINTU BELAKANG LH', '1'),
(661, 'IKR0013', 'Karet Pintu Blk Paneumatik 43X260 RH', '', '0', '5', '20', '0', '0', '260400', '0', '0', '27', '', '22', '', '5', '', 'PINTU BELAKANG RH', '1'),
(662, 'IKR0010', 'Karet Pintu Dpn Paneumatik 86X224 LH', '', '0', '5', '30', '0', '0', '265800', '0', '0', '27', '', '22', '', '5', '', 'PINTU DEPAN LH', '1'),
(663, 'IKR0011', 'Karet Pintu Dpn Paneumatik 86X224 RH', '', '0', '5', '30', '0', '0', '265800', '0', '0', '27', '', '22', '', '5', '', 'PINTU DEPAN RH', '1'),
(664, 'IKR0014', 'Karet Pintu Paneumatik Roll', '', '0', '25', '100', '0', '0', '78000', '0', '0', '25', '', '22', '', '5', '', 'U/PINTU', '14'),
(665, 'IKR0029', 'Karet Rel Jok', '', '0', '0', '0', '0', '0', '23500', '0', '0', '25', '', '22', '', '5', '', 'Rel Jok', '0'),
(666, 'IKR0018', 'Karet Spon T10', '', '0', '20', '100', '0', '0', '93000', '0', '0', '23', '', '22', '', '5', '', 'HITAM', '0'),
(667, 'IKR0015', 'Karet Spon T3', '', '0', '30', '150', '0', '0', '27900', '0', '0', '23', '', '22', '', '5', '', 'HITAM', '0'),
(668, 'IKR0016', 'Karet Spon T4', '', '0', '30', '150', '0', '0', '37200', '0', '0', '23', '', '22', '', '5', '', 'HITAM', '0'),
(669, 'IKR0017', 'Karet Spon T6', '', '0', '20', '150', '0', '0', '55800', '0', '0', '23', '', '22', '', '5', '', 'HITAM', '0'),
(670, 'IKR0020', 'Karet U Abu-Abu', '', '0', '50', '200', '0', '0', '5400', '0', '0', '25', '', '22', '', '5', '', 'U/ABS', '30'),
(671, 'IKR0028', 'Karet U Cream', '', '0', '0', '0', '0', '0', '5400', '0', '0', '25', '', '22', '', '5', '', 'Cream', '0'),
(672, 'IKP0005', 'Decosit Serat Kayu Coklat TS1034', '', '0', '0', '0', '0', '0', '45000', '0', '0', '25', '', '23', '', '5', '', 'Decosit Coklat', '0'),
(673, 'IKP0008', 'Decosit Serat Kayu Cream H352', '', '0', '0', '0', '0', '0', '45000', '0', '0', '25', '', '23', '', '5', '', '-', '0'),
(674, 'IKP0004', 'Decosit Serat Kayu Hitam TS189', '', '0', '0', '0', '0', '0', '45000', '0', '0', '25', '', '23', '', '5', '', 'Decosit Hitam', '0'),
(675, 'IKP0001', 'Karpet GM - Grey Wood @1,3mm 20M', '', '0', '3', '10', '0', '0', '3600000', '0', '0', '28', '', '23', '', '5', '', 'MOTIF KAYU ABU', '0'),
(676, 'IKP0006', 'Karpet GM - Grey Wood @1,3mm Meter', '', '0', '0', '0', '0', '0', '145000', '0', '0', '25', '', '23', '', '5', '', 'Karpet Meter', '0'),
(677, 'IKP0009', 'Karpet GM Sungkai Coklat Muda @2.0mm 20m', '', '0', '0', '10', '0', '0', '5954000', '0', '0', '28', '', '23', '', '5', '', 'Motif Kayu', '0'),
(678, 'IKP0003', 'Karpet Koin @25M', '', '0', '1', '5', '0', '0', '1375000', '0', '0', '28', '', '23', '', '5', '', 'BALKON/BAGASI', '5'),
(679, 'IKP0007', 'Karpet Lantai Altro @18mtr', '', '0', '0', '15', '0', '0', '5000000', '0', '0', '28', '', '23', '', '5', '', 'Lantai', '1'),
(680, 'IKP0002', 'Karpet PVC GM Flooring-Mercury', '', '0', '5', '20', '0', '0', '5954000', '0', '0', '28', '', '23', '', '5', '', 'LANTAI', '1'),
(681, 'IKP0012', 'Karpet PVC GM Space Jupiter Bbrown @20m', '', '0', '0', '50', '0', '0', '4950000', '0', '0', '28', '', '23', '', '5', '', '2.0mm @20m', '0'),
(682, 'IKP0011', 'Tacosheet Serat Kayu Abu K788', '', '0', '0', '100', '0', '0', '45000', '0', '0', '25', '', '23', '', '5', '', 'Decosit', '0'),
(683, 'IKP0010', 'Tacosheet Serat Kayu Putih L779', '', '0', '0', '100', '0', '0', '45000', '0', '0', '25', '', '23', '', '5', '', 'Decosit', '0'),
(684, 'IKU0013', 'Capit Udang Laci', '', '0', '0', '0', '0', '0', '3000', '0', '0', '27', '', '25', '', '5', '', '-', '0'),
(685, 'IKU0002', 'Cover Mekanik T', '', '0', '30', '200', '0', '0', '20000', '0', '0', '27', '', '25', '', '5', '', 'PLASTIK', '8'),
(686, 'IKN0001', 'Door Closer', '', '0', '5', '20', '0', '0', '150000', '0', '0', '27', '', '25', '', '5', '', '-', '1'),
(687, 'IKU0015', 'Kawat Bagasi', '', '0', '0', '0', '0', '0', '15000', '0', '0', '27', '', '25', '', '5', '', 'Bagasi', '0'),
(688, 'IKU0006', 'Kunci Accu Laksana', '', '0', '1', '5', '0', '0', '100909', '0', '0', '27', '', '25', '', '5', '', 'ACCU', '0'),
(689, 'IKN0004', 'Kunci Bagasi Handle JB-1', '', '0', '20', '70', '0', '0', '165000', '0', '0', '27', '', '25', '', '5', '', 'JETBUS 1', '6'),
(690, 'IKU0001', 'Kunci Bagasi Handle JB-2', '', '0', '20', '70', '0', '0', '135000', '0', '0', '27', '', '25', '', '5', '', 'JETBUS 2', '6'),
(691, 'IKN0003', 'Kunci Bagasi Handle Kotak Lampu', '', '0', '20', '70', '0', '0', '153000', '0', '0', '27', '', '25', '', '5', '', 'RS', '7'),
(692, 'IKN0005', 'Kunci Bagasi Handle Setra', '', '0', '12', '30', '0', '0', '250000', '0', '0', '27', '', '25', '', '5', '', 'PLASTIK HITAM', '6'),
(693, 'IKN0002', 'Kunci Bagasi Handle Tentrem', '', '0', '12', '50', '0', '0', '257727', '0', '0', '27', '', '25', '', '5', '', 'SCOR-X, AVANTE', '7'),
(694, 'IKN0006', 'Kunci Bagasi Mekanik LH', '', '0', '28', '250', '0', '0', '72500', '0', '0', '27', '', '25', '', '5', '', 'BAGASI', '7'),
(695, 'IKN0007', 'Kunci Bagasi Mekanik RH', '', '0', '28', '250', '0', '0', '72500', '0', '0', '27', '', '25', '', '5', '', 'BAGASI', '7'),
(696, 'IKU0007', 'Kunci Dashboard Sidelock JB3', '', '0', '0', '0', '0', '0', '85000', '0', '0', '27', '', '25', '', '5', '', 'Sidelock JB3', '0'),
(697, 'IKU0005', 'Kunci Handle BOX TV', '', '0', '5', '20', '0', '0', '115000', '0', '0', '27', '', '25', '', '5', '', 'BOX TV', '1'),
(698, 'IKU0017', 'Kunci Kontak Hino', '', '0', '0', '50', '0', '0', '30000', '0', '0', '27', '', '25', '', '5', '', 'Bis', '0'),
(699, 'IKN0008', 'Kunci Mekanik T', '', '0', '20', '200', '0', '0', '25000', '0', '0', '27', '', '25', '', '5', '', 'ACCU', '4'),
(700, 'IKN0011', 'Kunci Pintu Toilet', '', '0', '3', '15', '0', '0', '260000', '0', '0', '30', '', '25', '', '5', '', 'TOILET', '2'),
(701, 'IKN0012', 'Kunci Pintu TW LH', '', '0', '6', '30', '0', '0', '310000', '0', '0', '30', '', '25', '', '5', '', 'CINA', '2'),
(702, 'IKN0013', 'Kunci Pintu TW RH', '', '0', '3', '15', '0', '0', '310000', '0', '0', '30', '', '25', '', '5', '', 'CINA', '1'),
(703, 'IKU0003', 'Tarikan Handle Cangklong', '', '0', '10', '50', '0', '0', '35000', '0', '0', '27', '', '25', '', '5', '', 'CANGKLONG', '6'),
(704, 'IKU0004', 'Tarikan Handle ST 100', '', '0', '10', '50', '0', '0', '7000', '0', '0', '27', '', '25', '', '5', '', 'ST 100', '2'),
(705, 'IKN0014', 'Tutup Tangki Solar', '', '0', '5', '20', '0', '0', '75000', '0', '0', '27', '', '25', '', '5', '', 'TANGKI', '1'),
(706, 'IKU0014', 'Tutup Tangki Solar Besar', '', '0', '0', '0', '0', '0', '135000', '0', '0', '27', '', '25', '', '5', '', '-', '0'),
(707, 'ILL0005', 'Paku 5cm', '', '0', '0', '0', '0', '0', '20000', '0', '0', '21', '', '26', '', '5', '', 'Paku', '0'),
(708, 'ILL0006', 'Paku 3cm', '', '0', '0', '0', '0', '0', '23000', '0', '0', '21', '', '26', '', '5', '', 'Paku', '0'),
(709, 'ILL0007', 'Paku 2cm', '', '0', '0', '0', '0', '0', '26000', '0', '0', '21', '', '26', '', '5', '', 'Paku', '0'),
(710, 'ILL0008', 'BBM Solar', '', '0', '0', '200', '0', '0', '6800', '0', '0', '24', '', '26', '', '5', '', 'Solar', '0'),
(711, 'ILM0007', 'Kertas Lem Nachi 12mmX20m', '', '0', '40', '300', '0', '0', '2500', '0', '0', '27', '', '29', '', '5', '', 'KECIL', '10'),
(712, 'ILM0006', 'Kertas Lem Unibel 24mmX20m', '', '0', '288', '1500', '0', '0', '7000', '0', '0', '27', '', '29', '', '5', '', 'BESAR', '90'),
(713, 'ILM0016', 'Lem Big Bond @2.5kg', '', '0', '0', '100', '0', '0', '153000', '0', '0', '22', '', '29', '', '5', '', 'Big Bond', '0'),
(714, 'ILM0015', 'Lem Big Bond Spray @15kg', '', '0', '0', '30', '0', '0', '620000', '0', '0', '22', '', '29', '', '5', '', 'Big Bond', '0'),
(715, 'ILM0013', 'Lem Campur', '', '0', '0', '0', '0', '0', '40000', '0', '0', '27', '', '29', '', '5', '', '-', '0'),
(716, 'ILM0001', 'Lem Doubletape 3M', '', '0', '10', '50', '0', '0', '27000', '0', '0', '27', '', '29', '', '5', '', '3M', '0'),
(717, 'ILM0014', 'Lem Fox Kayu', '', '0', '0', '0', '0', '0', '15000', '0', '0', '27', '', '29', '', '5', '', 'Lem Kayu', '0');
INSERT INTO `tbl_wh_barang` (`id_barang`, `no_part`, `nama_part`, `nama_part_e`, `stok`, `stok_a`, `stok_p`, `minstok_a`, `minstok_p`, `hrg_awal`, `hrg_1`, `hrg_2`, `satuan`, `kelompok`, `type`, `lokasi`, `kategori`, `supplier`, `ket`, `std_pakai`) VALUES
(718, 'ILM0017', 'Lem Lilin', '', '0', '0', '50', '0', '0', '3000', '0', '0', '27', '', '29', '', '5', '', 'Lem', '0'),
(719, 'ILM0002', 'Lem Tetes', '', '0', '5', '30', '0', '0', '8000', '0', '0', '27', '', '29', '', '5', '', 'LEM', '0'),
(720, 'ILM0011', 'Sealtape Putih', '', '0', '0', '0', '0', '0', '3333', '0', '0', '27', '', '29', '', '5', '', '-', '0'),
(721, 'ILM0009', 'Solasiban Hitam', '', '0', '10', '50', '0', '0', '8000', '0', '0', '27', '', '29', '', '5', '', 'HITAM', '0'),
(722, 'IMK0003', 'Lis Mika Cover Lampu Plafon UP&DOWN', '', '0', '10', '200', '0', '0', '175000', '0', '0', '30', '', '32', '', '5', '', 'COVER', '3'),
(723, 'IMK0006', 'Mika Akrilik @122X244 3mm Hitam', '', '0', '0', '10', '0', '0', '800000', '0', '0', '23', '', '32', '', '5', '', 'Hitam', '0'),
(724, 'IMK0005', 'Mika Akrilik @122X244 3mm Susu', '', '0', '0', '10', '0', '0', '645000', '0', '0', '23', '', '32', '', '5', '', 'Mika 3mm', '0'),
(725, 'IMK0001', 'Mika Akrilik @122X244 5mm Bening', '', '0', '29768', '200000', '0', '0', '35', '0', '0', '182', '', '32', '', '5', '', '5mm 122X244', '0'),
(726, 'IMK0002', 'MIKA AKRILIK 2MM BENING', '', '0', '0', '0', '0', '0', '21', '0', '0', '182', '', '32', '', '5', '', '2MM 122X244', '0'),
(727, 'IMK0004', 'Mika Akrilik 5mm Susu', '', '0', '0', '0', '0', '0', '970000', '0', '0', '23', '', '32', '', '5', '', 'Mika Susu 5L432', '0'),
(728, 'ISK0026', 'Clip KD', '', '0', '0', '0', '0', '0', '2000', '0', '0', '30', '', '40', '', '5', '', '-', '0'),
(729, 'ISK0020', 'Clip Plastik Gerigi Besar', '', '0', '200', '2000', '0', '0', '3000', '0', '0', '27', '', '40', '', '5', '', 'BESAR', '0'),
(730, 'ISK0029', 'Clip Plastik Gerigi Besar Cream', '', '0', '0', '500', '0', '0', '3000', '0', '0', '27', '', '40', '', '5', '', 'Travel', '0'),
(731, 'ISK0030', 'Clip Plastik Orbout Putih', '', '0', '0', '500', '0', '0', '2000', '0', '0', '27', '', '40', '', '5', '', 'Travel', '0'),
(732, 'ISK0023', 'Clip Plastik Tanam', '', '0', '0', '0', '0', '0', '5000', '0', '0', '27', '', '40', '', '5', '', 'Tanam', '0'),
(733, 'ISK0024', 'Clip Plastik Tembak', '', '0', '0', '0', '0', '0', '3000', '0', '0', '27', '', '40', '', '5', '', 'Tembak', '0'),
(734, 'ISK0001', 'Paku Rivet 450', '', '0', '200', '10000', '0', '0', '250', '0', '0', '27', '', '40', '', '5', '', 'PUTIH', '0'),
(735, 'ISK0002', 'Paku Rivet 675', '', '0', '1000', '10000', '0', '0', '300', '0', '0', '27', '', '40', '', '5', '', 'PUTIH', '0'),
(736, 'ISK0003', 'Paku Staples 1010J', '', '0', '3', '15', '0', '0', '26000', '0', '0', '26', '', '40', '', '5', '', 'STAPLES', '0'),
(737, 'ISK0004', 'PAKU STAPLES 8MM', '', '0', '0', '0', '0', '0', '15000', '0', '0', '26', '', '40', '', '5', '', '-', '0'),
(738, 'ISK0005', 'Sekrup FH 8X1', '', '0', '2000', '10000', '0', '0', '105', '0', '0', '27', '', '40', '', '5', '', 'PUTIH', '0'),
(739, 'ISK0006', 'Sekrup FH 8X2', '', '0', '500', '5000', '0', '0', '189', '0', '0', '27', '', '40', '', '5', '', 'PUTIH', '0'),
(740, 'ISK0007', 'Sekrup FH 8X3/4', '', '0', '1000', '10000', '0', '0', '81', '0', '0', '27', '', '40', '', '5', '', 'PUTIH', '0'),
(741, 'ISK0015', 'Sekrup JP 4X2', '', '0', '200', '2000', '0', '0', '79', '0', '0', '27', '', '40', '', '5', '', 'PUTIH', '0'),
(742, 'ISK0016', 'Sekrup JP 5X2', '', '0', '200', '2000', '0', '0', '141', '0', '0', '27', '', '40', '', '5', '', 'PUTIH', '0'),
(743, 'ISK0022', 'Sekrup JP 5x40', '', '0', '0', '0', '0', '0', '400', '0', '0', '27', '', '40', '', '5', '', 'JP', '0'),
(744, 'ISK0031', 'Sekrup JP 5x60', '', '0', '0', '1000', '0', '0', '500', '0', '0', '27', '', '40', '', '5', '', 'JP', '0'),
(745, 'ISK0027', 'Sekrup JP 6x100', '', '0', '0', '0', '0', '0', '200', '0', '0', '27', '', '40', '', '5', '', 'Putih', '0'),
(746, 'ISK0017', 'SEKRUP PH 8X1 1/4', '', '0', '0', '0', '0', '0', '0', '0', '0', '27', '', '40', '', '5', '', '-', '0'),
(747, 'ISK0018', 'Sekrup PH 8X1 Kuning', '', '0', '3000', '10000', '0', '0', '124', '0', '0', '27', '', '40', '', '5', '', 'KUNING', '0'),
(748, 'ISK0028', 'Sekrup PH 8x1/2', '', '0', '0', '2000', '0', '0', '200', '0', '0', '27', '', '40', '', '5', '', '-', '0'),
(749, 'ISK0025', 'Sekrup Roofing 10x16', '', '0', '0', '0', '0', '0', '252', '0', '0', '27', '', '40', '', '5', '', 'Roofing', '0'),
(750, 'ISK0019', 'Sekrup Roofing 12X30', '', '0', '50', '1000', '0', '0', '400', '0', '0', '27', '', '40', '', '5', '', 'ROOFING', '0'),
(751, 'ISK0021', 'Tutup Sekrup Plastik', '', '0', '1000', '3000', '0', '0', '650', '0', '0', '27', '', '40', '', '5', '', 'PLASTIK', '0'),
(752, 'ISL0014', 'Sika Primer 206 G+P 1000ML', '', '0', '0', '10', '0', '0', '1221000', '0', '0', '22', '', '41', '', '5', '', 'Sika', '0'),
(753, 'ISL0015', 'Sikaflex Activator T 250', '', '0', '0', '10', '0', '0', '388500', '0', '0', '22', '', '41', '', '5', '', 'Sika', '0'),
(754, 'ISL0001', 'Silikon Bening', '', '0', '5', '30', '0', '0', '45000', '0', '0', '27', '', '41', '', '5', '', 'BENING', '2'),
(755, 'ISL0013', 'Silikon Renz 310ml 10A Black', '', '0', '0', '250', '0', '0', '50505', '0', '0', '27', '', '41', '', '5', '', 'Renz', '0'),
(756, 'ISL0011', 'Silikon Renz 600ml 20 Black', '', '0', '0', '250', '0', '0', '82500', '0', '0', '27', '', '41', '', '5', '', 'Renz', '0'),
(757, 'ISL0012', 'Silikon Renz 600ml 30A Black', '', '0', '0', '250', '0', '0', '91575', '0', '0', '27', '', '41', '', '5', '', 'Renz', '0'),
(758, 'ISL0010', 'Silikon Renz 600ml 43 Grey', '', '0', '0', '250', '0', '0', '78571', '0', '0', '27', '', '41', '', '5', '', 'Renz 43', '0'),
(759, 'ISL0008', 'Silikon Sikaflex 400ml Auto Black', '', '0', '48', '500', '0', '0', '57998', '0', '0', '27', '', '41', '', '5', '', 'Sikaflex', '0'),
(760, 'ISL0005', 'Silikon Sikaflex 600ml 211 Black', '', '0', '0', '0', '0', '0', '89544', '0', '0', '27', '', '41', '', '5', '', 'Sikaflex  (Bounding Plat)', '21'),
(761, 'ISL0007', 'Silikon Sikaflex 600ml 211 Grey', '', '0', '48', '100', '0', '0', '83250', '0', '0', '27', '', '41', '', '5', '', 'Sikaflex', '0'),
(762, 'ISL0009', 'Silikon Sikaflex 600ml 255 Extra Black', '', '0', '0', '200', '0', '0', '101010', '0', '0', '27', '', '41', '', '5', '', 'Sikaflex', '0'),
(763, 'ISP0005', 'Spion Avante LH', '', '0', '0', '0', '0', '0', '1791000', '0', '0', '27', '', '42', '', '5', '', 'Avante', '1'),
(764, 'ISP0006', 'Spion Avante RH', '', '0', '0', '0', '0', '0', '1791000', '0', '0', '27', '', '42', '', '5', '', 'Avante', '1'),
(765, 'ISP0001', 'Spion Busway 1 LH', '', '0', '3', '10', '0', '0', '1211000', '0', '0', '27', '', '42', '', '5', '', 'BUSWAY 1', '1'),
(766, 'ISP0002', 'Spion Busway 1 RH', '', '0', '3', '10', '0', '0', '1211000', '0', '0', '27', '', '42', '', '5', '', 'BUSWAY 1', '1'),
(767, 'ISP0003', 'Spion Busway 2 LH', '', '0', '3', '10', '0', '0', '1261500', '0', '0', '27', '', '42', '', '5', '', 'BUSWAY 2', '1'),
(768, 'ISP0004', 'Spion Busway 2 RH', '', '0', '3', '10', '0', '0', '1261500', '0', '0', '27', '', '42', '', '5', '', 'BUSWAY 2', '1'),
(769, 'BST0001', 'Gaspring Stabilus 26,5cm 275N Box Tv', '', '0', '2', '20', '0', '0', '110000', '0', '0', '27', '', '43', '', '5', '', 'U/BOX TV', '2'),
(770, 'BST0002', 'Gaspring Stabilus 60cm 750N Bagasi', '', '0', '60', '200', '0', '0', '93500', '0', '0', '27', '', '43', '', '5', '', 'U/BAGASI', '14'),
(771, 'IST0001', 'Gaspring Stabilus 20cm 600n Jok', '', '0', '0', '50', '0', '0', '250000', '0', '0', '27', '', '43', '', '5', '', 'Jok Tentrem', '0'),
(772, 'IST0002', 'Gaspring Stabilus 30Cm 450N Jok RS Cina', '', '0', '0', '50', '0', '0', '185000', '0', '0', '27', '', '43', '', '5', '', 'Cina', '0'),
(773, 'IST0003', 'Gaspring Stabilus 30Cm 450N Jok RS German', '', '0', '0', '0', '0', '0', '350000', '0', '0', '27', '', '43', '', '5', '', 'German', '0'),
(774, 'IST0005', 'Gaspring Stabilus 28Cm 600N', '', '0', '0', '100', '0', '0', '254800', '0', '0', '27', '', '43', '', '5', '', 'Jok Hi Ace', '0'),
(775, 'IST0006', 'Gaspring Stabilus 50cm 650N Bagasi', '', '0', '0', '50', '0', '0', '140000', '0', '0', '27', '', '43', '', '5', '', 'Bagasi Medium', '0'),
(776, 'ISTK0029', 'Skotlet / Stiker Oracal 651-0319 Merah', '', '0', '0', '100', '0', '0', '65000', '0', '0', '25', '', '44', '', '5', '', 'Oracal', '0'),
(777, 'ISTK0002', 'Stiker Bis AC Denso Merah 143.5X9', '', '0', '10', '50', '0', '0', '39000', '0', '0', '27', '', '44', '', '5', '', 'AC', '2'),
(778, 'ISTK0006', 'Stiker Bis Arhliner Spoiler Smp 5CM 98X7.5', '', '0', '10', '30', '0', '0', '25000', '0', '0', '27', '', '44', '', '5', '', 'BIS REGULER', '2'),
(779, 'ISTK0025', 'Stiker Bis Bendera PP @47x60', '', '0', '0', '0', '0', '0', '60000', '0', '0', '27', '', '44', '', '5', '', 'Bis', '0'),
(780, 'ISTK0007', 'Stiker BIS Blok Chrome 110X5', '', '0', '1', '1', '0', '0', '40000', '0', '0', '27', '', '44', '', '5', '', 'AVANTE', '1'),
(781, 'ISTK0010', 'Stiker Bis Jetliner Spoiler Smp @162x12', '', '0', '0', '0', '0', '0', '58000', '0', '0', '27', '', '44', '', '5', '', 'Jetliner', '2'),
(782, 'ISTK0001', 'Stiker Bis PP Primajasa Smp 121X29,5', '', '0', '20', '50', '0', '0', '63000', '0', '0', '27', '', '44', '', '5', '', 'BIS REGULER', '2'),
(783, 'ISTK0008', 'Stiker Bis Rws Bando 104x10', '', '0', '0', '0', '0', '0', '90000', '0', '0', '27', '', '44', '', '5', '', 'Bando 104x10', '0'),
(784, 'ISTK0009', 'Stiker Bis Rws Kap Dpn 100x8.5', '', '0', '0', '0', '0', '0', '30000', '0', '0', '27', '', '44', '', '5', '', 'Bis Rws', '1'),
(785, 'ISTK0020', 'Stiker Bis Saluyuprima Smp 109x10', '', '0', '0', '0', '0', '0', '45000', '0', '0', '27', '', '44', '', '5', '', 'BIs Reguler', '2'),
(786, 'ISTK0030', 'Stiker Bis Saluyuprima Smp 143x29.5', '', '0', '0', '20', '0', '0', '70000', '0', '0', '27', '', '44', '', '5', '', 'Bis', '0'),
(787, 'ISTK0024', 'Stiker Skotlet Cream', '', '0', '0', '0', '0', '0', '35000', '0', '0', '25', '', '44', '', '5', '', '-', '0'),
(788, 'ISTK0023', 'Stiker Skotlet Kayu', '', '0', '0', '0', '0', '0', '18000', '0', '0', '25', '', '44', '', '5', '', 'Motif Kayu', '0'),
(789, 'ISTK0013', 'Stiker Travel Logo Pesawat R/L @55x15', '', '0', '0', '0', '0', '0', '18000', '0', '0', '27', '', '44', '', '5', '', 'Travel', '2'),
(790, 'ISTK0012', 'Stiker Travel Logo PP 14.5x14.5', '', '0', '0', '0', '0', '0', '30000', '0', '0', '27', '', '44', '', '5', '', 'Travel', '2'),
(791, 'ISTK0011', 'Stiker Travel Logo Toyota Hiace @18x7.1', '', '0', '0', '0', '0', '0', '4000', '0', '0', '27', '', '44', '', '5', '', 'Travel', '1'),
(792, 'ISTK0003', 'Stiker Travel No Body 9.5X23', '', '0', '0', '0', '0', '0', '4000', '0', '0', '27', '', '44', '', '5', '', 'TRAVEL', '1'),
(793, 'ISTK0022', 'Stiker Travel Primajasa Kap Blk 75x8', '', '0', '0', '0', '0', '0', '16000', '0', '0', '27', '', '44', '', '5', '', 'Travel', '0'),
(794, 'ISTK0021', 'Stiker Travel Primajasa Kap Dpn 75x7', '', '0', '0', '0', '0', '0', '15000', '0', '0', '27', '', '44', '', '5', '', 'Travel', '0'),
(795, 'ISTK0015', 'Stiker Travel Primajasa Pnt Tengah R/L @30x3.5', '', '0', '0', '0', '0', '0', '3000', '0', '0', '27', '', '44', '', '5', '', 'Travel', '2'),
(796, 'ISTK0004', 'Stiker Travel Rws Kap Blk 65x5.5', '', '0', '1', '5', '0', '0', '11000', '0', '0', '27', '', '44', '', '5', '', 'TRAVEL', '1'),
(797, 'ISTK0014', 'Stiker Travel RWS Pnt Tengah R/L @120x13', '', '0', '0', '0', '0', '0', '40000', '0', '0', '27', '', '44', '', '5', '', 'Travel', '2'),
(798, 'ISTK0027', 'Stiker Travel Strip Custom R/L @171x22.6', '', '0', '0', '0', '0', '0', '130000', '0', '0', '27', '', '44', '', '5', '', 'Travel', '0'),
(799, 'ISTK0018', 'Stiker Travel Strip Maroon R/L @97x58', '', '0', '0', '0', '0', '0', '140000', '0', '0', '27', '', '44', '', '5', '', 'Travel', '2'),
(800, 'ISTK0017', 'Stiker Travel Strip Merah R/L @126x81', '', '0', '0', '0', '0', '0', '275000', '0', '0', '27', '', '44', '', '5', '', 'Travel', '2'),
(801, 'ISTK0016', 'Stiker Travel Strip Silver R/L @275x42', '', '0', '0', '0', '0', '0', '79000', '0', '0', '27', '', '44', '', '5', '', 'Travel', '2'),
(802, 'ISTK0005', 'Stiker Travel Trayek SHIA-BDG 66X11', '', '0', '2', '5', '0', '0', '80000', '0', '0', '27', '', '44', '', '5', '', 'TRAVEL', '1'),
(803, 'ITL0001', 'Kloset Duduk', '', '0', '1', '5', '0', '0', '428000', '0', '0', '27', '', '46', '', '5', '', 'TOILET', '1'),
(804, 'ITL0011', 'Kran Plastik', '', '0', '0', '0', '0', '0', '15000', '0', '0', '27', '', '46', '', '5', '', 'Toilet', '1'),
(805, 'ITL0007', 'Kran Shower', '', '0', '3', '10', '0', '0', '70000', '0', '0', '27', '', '46', '', '5', '', 'TOILET', '1'),
(806, 'ITL0002', 'Kran Wastafel', '', '0', '3', '10', '0', '0', '75000', '0', '0', '27', '', '46', '', '5', '', 'TOILET', '1'),
(807, 'ITL0012', 'Lem Paralon', '', '0', '0', '0', '0', '0', '10000', '0', '0', '27', '', '46', '', '5', '', 'Lem', '0'),
(808, 'ITL0024', 'Pipa Paralon 1 1/4\"', '', '0', '0', '0', '0', '0', '20000', '0', '0', '25', '', '46', '', '5', '', '1 1/4\"', '0'),
(809, 'ITL0003', 'Pipa Paralon 2 1/2\"', '', '0', '0', '0', '0', '0', '15667', '0', '0', '25', '', '46', '', '5', '', 'TOILET', '0'),
(810, 'ITL0009', 'Pipa Paralon 3\"', '', '0', '100', '1200', '0', '0', '149', '0', '0', '18', '', '46', '', '5', '', 'PARALON', '250'),
(811, 'ITL0014', 'Pipa Paralon 4\"', '', '0', '0', '0', '0', '0', '32667', '0', '0', '25', '', '46', '', '5', '', '4\"', '0'),
(812, 'ITL0020', 'Pompa Air Celup DC 24V', '', '0', '0', '0', '0', '0', '200000', '0', '0', '31', '', '46', '', '5', '', 'Toilet', '1'),
(813, 'ITL0017', 'Sambunagn Pipa 1/2\" Sok R', '', '0', '0', '0', '0', '0', '3000', '0', '0', '27', '', '46', '', '5', '', '1/2\"', '0'),
(814, 'ITL0016', 'Sambungan Pipa 1/2\" Keni R', '', '0', '0', '0', '0', '0', '3500', '0', '0', '27', '', '46', '', '5', '', '1/2\"', '0'),
(815, 'ITL0021', 'Sambungan Pipa 1/2\" Lurus', '', '0', '0', '0', '0', '0', '3000', '0', '0', '27', '', '46', '', '5', '', '1/2\"', '0'),
(816, 'ITL0019', 'Sambungan Pipa 1/2\" T', '', '0', '0', '0', '0', '0', '4500', '0', '0', '27', '', '46', '', '5', '', '1/2\"', '0'),
(817, 'ITL0010', 'Sambungan Pipa 3\"Keni R D', '', '0', '0', '0', '0', '0', '11000', '0', '0', '27', '', '46', '', '5', '', 'Sambungan 3\"', '0'),
(818, 'ITL0015', 'Sambungan Pipa 4\"Keni R D', '', '0', '0', '0', '0', '0', '28000', '0', '0', '27', '', '46', '', '5', '', 'Sambungan 4\"', '0'),
(819, 'ITL0013', 'Sambungan Pipa Double Drat Besi 1 1/4', '', '0', '0', '0', '0', '0', '8000', '0', '0', '27', '', '46', '', '5', '', '1 1/4\"', '0'),
(820, 'ITL0004', 'Sambungan Pipa Double Drat Besi 1/2\"', '', '0', '3', '10', '0', '0', '8000', '0', '0', '27', '', '46', '', '5', '', 'TOILET', '1'),
(821, 'ITL0022', 'Sambungan Pipa Drat Dalam 1/2\"', '', '0', '0', '0', '0', '0', '4000', '0', '0', '27', '', '46', '', '5', '', 'Plastik', '0'),
(822, 'ITL0008', 'Sambungan Pipa V Sok 1 1/4\"X1/2\"', '', '0', '1', '5', '0', '0', '9000', '0', '0', '27', '', '46', '', '5', '', 'TOILET', '1'),
(823, 'ITL0005', 'Saringan Air Lantai', '', '0', '3', '10', '0', '0', '15000', '0', '0', '27', '', '46', '', '5', '', 'TOILET', '1'),
(824, 'ITL0018', 'Saringan Air Lantai Premium', '', '0', '0', '0', '0', '0', '60000', '0', '0', '27', '', '46', '', '5', '', 'Toilet', '0'),
(825, 'ITL0006', 'Saringan Air Wastafel', '', '0', '3', '10', '0', '0', '14000', '0', '0', '27', '', '46', '', '5', '', 'TOILET', '1'),
(826, 'ITR0001', 'Triplek 4mm', '', '0', '20', '100', '0', '0', '85000', '0', '0', '23', '', '47', '', '5', '', 'MERANTI', '0'),
(827, 'ITR0002', 'Triplek 6mm', '', '0', '20', '100', '0', '0', '120000', '0', '0', '23', '', '47', '', '5', '', 'MERANTI', '0'),
(828, 'ITR0003', 'Triplek 9mm', '', '0', '10', '100', '0', '0', '160000', '0', '0', '23', '', '47', '', '5', '', 'MERANTI', '0'),
(829, 'ITR0004', 'Triplek 7mm', '', '0', '20', '70', '0', '0', '126000', '0', '0', '23', '', '47', '', '5', '', 'MERANTI', '0'),
(830, 'ITR0005', 'Triplek 12mm', '', '0', '0', '0', '0', '0', '213500', '0', '0', '23', '', '47', '', '5', '', 'Meranti', '0'),
(831, 'ITR0006', 'Triplek 18mm', '', '0', '0', '10', '0', '0', '331000', '0', '0', '23', '', '47', '', '5', '', 'Meranti', '0'),
(832, 'ITR0007', 'Triplek 9mm Meranti Super', '', '0', '0', '100', '0', '0', '220000', '0', '0', '23', '', '47', '', '5', '', 'Meranti', '0'),
(833, 'ITR0008', 'Triplek 15mm', '', '0', '0', '15', '0', '0', '257500', '0', '0', '23', '', '47', '', '5', '', '-', '0'),
(834, 'JBS0010', 'Busa Jok EKO Std Ddk', '', '0', '110', '220', '0', '0', '53280', '0', '0', '27', '', '8', '', '6', '', 'EKO STD 2-3', '55'),
(835, 'JBS0002', 'Busa Jok EKO Std Sdr', '', '0', '110', '220', '0', '0', '64935', '0', '0', '27', '', '8', '', '6', '', 'EKO STD 2-3', '55'),
(836, 'JBS0003', 'Busa Jok EXE MU Ddk 2', '', '0', '60', '150', '0', '0', '155000', '0', '0', '27', '', '8', '', '6', '', 'EXE MU', '19'),
(837, 'JBS0004', 'Busa Jok EXE MU Sdr', '', '0', '129', '200', '0', '0', '82000', '0', '0', '27', '', '8', '', '6', '', 'EXE MU', '43'),
(838, 'JBS0005', 'Busa Jok EXE RS Ddk', '', '0', '90', '150', '0', '0', '90000', '0', '0', '27', '', '8', '', '6', '', 'EXE RS', '45'),
(839, 'JBS0006', 'Busa Jok EXE RS Sdr', '', '0', '90', '150', '0', '0', '110000', '0', '0', '27', '', '8', '', '6', '', 'EXE RS', '45'),
(840, 'JBS0007', 'Busa Jok SOPIR Ddk', '', '0', '5', '20', '0', '0', '95000', '0', '0', '27', '', '8', '', '6', '', 'SOPIR', '1'),
(841, 'JBS0008', 'Busa Jok SOPIR Sdr', '', '0', '5', '20', '0', '0', '110000', '0', '0', '27', '', '8', '', '6', '', 'SOPIR', '1'),
(842, 'JBS0013', 'Busa Super 4cm', '', '0', '0', '0', '0', '0', '325000', '0', '0', '23', '', '8', '', '6', '', 'Kuning', '0'),
(843, 'JBS0011', 'Busa Tiois 8mm', '', '0', '10', '100', '0', '0', '26247', '0', '0', '25', '', '8', '', '6', '', '5MM', '10'),
(844, 'JBS0009', 'Busa Tipis 1CM', '', '0', '20', '100', '0', '0', '26196', '0', '0', '23', '', '8', '', '6', '', '1CM', '0'),
(845, 'JBS0012', 'Sterofoam 4cm', '', '0', '5', '10', '0', '0', '48000', '0', '0', '23', '', '8', '', '6', '', 'PUTIH', '0'),
(846, 'JRK0004', 'ARMREST RCL 241 RH', '', '0', '10', '100', '0', '0', '67000', '0', '0', '27', '', '36', '', '6', '', 'RIMBA', '0'),
(847, 'JRK0005', 'ARMREST RCL 241 LH', '', '0', '10', '100', '0', '0', '67000', '0', '0', '27', '', '36', '', '6', '', 'RIMBA', '0'),
(848, 'JRK0006', 'PER REKLENING', '', '0', '50', '500', '0', '0', '5000', '0', '0', '27', '', '36', '', '6', '', 'U/JOK', '45'),
(849, 'JRK0007', 'Armrest Karet Hidup', '', '0', '20', '100', '0', '0', '65000', '0', '0', '27', '', '36', '', '6', '', 'HITAM', '20'),
(850, 'JRK0008', 'Armrest Aldila LH', '', '0', '0', '0', '0', '0', '0', '0', '0', '27', '', '36', '', '6', '', 'Aldila', '0'),
(851, 'JRK0009', 'Armrest Aldila RH', '', '0', '0', '0', '0', '0', '0', '0', '0', '27', '', '36', '', '6', '', 'Aldila', '0'),
(852, 'JSR0017', 'Karet Kolor 1cm', '', '0', '0', '100', '0', '0', '1385', '0', '0', '25', '', '39', '', '6', '', '1Cm', '0'),
(853, 'JSR0010', 'Perekat Kain @18.5M', '', '0', '50', '200', '0', '0', '3000', '0', '0', '25', '', '39', '', '6', '', 'U/Sarung Jok', '23'),
(854, 'JSR0012', 'Sarung Jok Eko Rs Ddk 3', '', '0', '0', '0', '0', '0', '30000', '0', '0', '27', '', '39', '', '6', '', 'Eko Rs', '0'),
(855, 'JSR0013', 'Sarung Jok Eko Rs Sdr Kepala Kecil', '', '0', '0', '0', '0', '0', '10000', '0', '0', '27', '', '39', '', '6', '', 'Eko Rs', '0'),
(856, 'JSR0011', 'Sarung Jok Eko Std Ddk', '', '0', '180', '200', '0', '0', '10000', '0', '0', '27', '', '39', '', '6', '', 'Eko Std 2-3', '55'),
(857, 'JSR0002', 'Sarung Jok Eko Std Sdr', '', '0', '180', '200', '0', '0', '10000', '0', '0', '27', '', '39', '', '6', '', 'Eko Std 2-3', '55'),
(858, 'JSR0009', 'Sarung Jok Exe Mu Ddk 1', '', '0', '3', '5', '0', '0', '10000', '0', '0', '27', '', '39', '', '6', '', 'Exe Mu', '1'),
(859, 'JSR0003', 'Sarung Jok Exe Mu Ddk 2', '', '0', '60', '100', '0', '0', '20000', '0', '0', '27', '', '39', '', '6', '', 'Exe Mu', '20'),
(860, 'JSR0004', 'Sarung Jok Exe Mu Sdr', '', '0', '117', '195', '0', '0', '10000', '0', '0', '27', '', '39', '', '6', '', 'Exe Mu', '39'),
(861, 'JSR0016', 'Sarung Jok Exe MU Tutup Kepala', '', '0', '0', '0', '0', '0', '10000', '0', '0', '27', '', '39', '', '6', '', 'MU', '0'),
(862, 'JSR0005', 'Sarung Jok Exe Rs Ddk', '', '0', '90', '200', '0', '0', '10000', '0', '0', '27', '', '39', '', '6', '', 'Exe Rs', '45'),
(863, 'JSR0008', 'Sarung Jok Exe Rs Partisi', '', '0', '5', '20', '0', '0', '10000', '0', '0', '27', '', '39', '', '6', '', 'Exe Rs', '1'),
(864, 'JSR0006', 'Sarung Jok Exe Rs Sdr', '', '0', '90', '200', '0', '0', '15000', '0', '0', '27', '', '39', '', '6', '', 'Exe Rs', '45'),
(865, 'JSR0001', 'Sarung Jok Exe Rs Tutup Kepala', '', '0', '0', '0', '0', '0', '10000', '0', '0', '27', '', '39', '', '6', '', 'Exe Rs', '45'),
(866, 'JSR0007', 'Sarung Jok Sopir Ddk+Sdr', '', '0', '10', '20', '0', '0', '20000', '0', '0', '30', '', '39', '', '6', '', 'Sopir', '1'),
(867, 'JSR0018', 'Sarung Shuttle Sopir Ddk', '', '0', '0', '50', '0', '0', '20000', '0', '0', '27', '', '39', '', '6', '', 'Hi Ace', '0'),
(868, 'JSR0019', 'Sarung Shuttle Sopir Sdr', '', '0', '0', '50', '0', '0', '20000', '0', '0', '27', '', '39', '', '6', '', 'Hi Ace', '0'),
(869, 'JSR0015', 'Tali Kur U/ Jaring Jok', '', '0', '0', '0', '0', '0', '1000', '0', '0', '25', '', '39', '', '6', '', 'Jaring Jok', '0'),
(870, 'PBR0002', 'Kepala Mesin Bor 10mm', '', '0', '0', '0', '0', '0', '100000', '0', '0', '27', '', '7', '', '7', '', '-', '0'),
(871, 'PBO0010', 'MATA BOR 11,0MM', '', '0', '0', '0', '0', '0', '0', '0', '0', '27', '', '7', '', '7', '', '-', '0'),
(872, 'PBO0001', 'MATA BOR 3,0MM', '', '0', '0', '0', '0', '0', '19000', '0', '0', '27', '', '7', '', '7', '', '-', '0'),
(873, 'PBO0002', 'Mata Bor Dewalt 3,5mm', '', '0', '20', '150', '0', '0', '16477', '0', '0', '27', '', '7', '', '7', '', 'Dewalt', '0'),
(874, 'PBO0003', 'Mata Bor Dewalt 4,0MM', '', '0', '0', '0', '0', '0', '18270', '0', '0', '27', '', '7', '', '7', '', 'Dewalt', '0'),
(875, 'PBO0009', 'Mata Bor Nachi 10mm', '', '0', '0', '0', '0', '0', '86000', '0', '0', '27', '', '7', '', '7', '', 'Nachi', '0'),
(876, 'PBO0011', 'MATA BOR NACHI 12,0MM', '', '0', '1', '10', '0', '0', '130000', '0', '0', '27', '', '7', '', '7', '', 'NACHI', '0'),
(877, 'PBO0012', 'MATA BOR NACHI 13,0MM', '', '0', '0', '0', '0', '0', '150000', '0', '0', '27', '', '7', '', '7', '', 'NACHI', '0'),
(878, 'PBO0004', 'Mata Bor Nachi 5.0mm', '', '0', '0', '0', '0', '0', '33000', '0', '0', '27', '', '7', '', '7', '', 'Nachi', '0'),
(879, 'PBO0005', 'Mata Bor Nachi 6.0mm', '', '0', '0', '0', '0', '0', '39000', '0', '0', '27', '', '7', '', '7', '', 'Nachi', '0'),
(880, 'PBO0006', 'Mata Bor Nachi 7.0mm', '', '0', '0', '0', '0', '0', '48000', '0', '0', '27', '', '7', '', '7', '', 'Nachi', '0'),
(881, 'PBO0007', 'Mata Bor Nachi 8.0mm', '', '0', '0', '0', '0', '0', '56000', '0', '0', '27', '', '7', '', '7', '', 'Nachi', '0'),
(882, 'PBO0008', 'Mata Bor Nachi 9,0mm', '', '0', '0', '0', '0', '0', '71000', '0', '0', '27', '', '7', '', '7', '', 'Nachi', '0'),
(883, 'PBR0005', 'Mata Bor Toho 16mm', '', '0', '0', '10', '0', '0', '500000', '0', '0', '27', '', '7', '', '7', '', 'Toho', '0'),
(884, 'PBR0004', 'Mata Bor Tuner', '', '0', '0', '0', '0', '0', '60000', '0', '0', '27', '', '7', '', '7', '', '-', '0'),
(885, 'PBR0001', 'MATA OBENG +', '', '0', '5', '50', '0', '0', '6000', '0', '0', '27', '', '7', '', '7', '', 'OBENG', '0'),
(886, 'PGS0006', 'Freon AC R134a Klea', '', '0', '1', '10', '0', '0', '1200000', '0', '0', '29', '', '14', '', '7', '', 'Freon AC', '1'),
(887, 'PGS0001', 'Gas Acetilyn 3Kg', '', '0', '5', '20', '0', '0', '210900', '0', '0', '29', '', '14', '', '7', '', '3KG', '0'),
(888, 'PGS0007', 'Gas Argon 6M3', '', '0', '0', '20', '0', '0', '194250', '0', '0', '29', '', '14', '', '7', '', 'Argon', '0'),
(889, 'PGS0002', 'Gas CO2 20Kg', '', '0', '5', '50', '0', '0', '161454', '0', '0', '29', '', '14', '', '7', '', '20Kg', '0'),
(890, 'PGS0004', 'GAS LPG 3KG', '', '0', '1', '3', '0', '0', '22000', '0', '0', '29', '', '14', '', '7', '', 'LPG', '0'),
(891, 'PGS0005', 'Gas Nitrogen 6M3', '', '0', '0', '0', '0', '0', '85772', '0', '0', '29', '', '14', '', '7', '', '6M3', '0'),
(892, 'PGS0003', 'Gas Oksigen 6M3', '', '0', '5', '20', '0', '0', '44400', '0', '0', '29', '', '14', '', '7', '', '6M3', '0'),
(893, 'PGR0001', 'Mata Grinda Ampelas 4\"', '', '0', '30', '150', '0', '0', '10000', '0', '0', '27', '', '16', '', '7', '', 'FLAP DISC', '0'),
(894, 'PGR0002', 'Mata Grinda Cut 14\" Dewalt', '', '0', '8', '50', '0', '0', '57090', '0', '0', '27', '', '16', '', '7', '', 'DEWALT', '0'),
(895, 'PGR0007', 'Mata Grinda Cut 14\" WD', '', '0', '0', '0', '0', '0', '42000', '0', '0', '27', '', '16', '', '7', '', 'WD', '0'),
(896, 'PGR0003', 'Mata Grinda Cut 4\" Lippro', '', '0', '50', '350', '0', '0', '9000', '0', '0', '27', '', '16', '', '7', '', 'LIPPRO', '0'),
(897, 'PGR0010', 'Mata Grinda Cut 4\" WD', '', '0', '0', '0', '0', '0', '3250', '0', '0', '27', '', '16', '', '7', '', 'WD', '0'),
(898, 'PGR0004', 'MATA GRINDA KAWAT 4\"', '', '0', '0', '0', '0', '0', '0', '0', '0', '27', '', '16', '', '7', '', '-', '0'),
(899, 'PGR0005', 'Mata Grinda Slep 4\" Ultra', '', '0', '50', '150', '0', '0', '11000', '0', '0', '27', '', '16', '', '7', '', 'ULTRA', '0'),
(900, 'PGR0009', 'Mata Grinda Slep 4\" WD', '', '0', '0', '0', '0', '0', '10000', '0', '0', '27', '', '16', '', '7', '', '-', '0'),
(901, 'PGR0006', 'Mata Grinda Slep 5\"', '', '0', '0', '0', '0', '0', '50000', '0', '0', '27', '', '16', '', '7', '', '-', '0'),
(902, 'PLL0030', 'Benang yoyo', '', '0', '0', '0', '0', '0', '5000', '0', '0', '27', '', '26', '', '7', '', '-', '0'),
(903, 'PLL0055', 'Borak', '', '0', '0', '0', '0', '0', '15000', '0', '0', '27', '', '26', '', '7', '', 'U/Las Tembaga', '0'),
(904, 'PLL0021', 'CAIRAN ANTI KARAT 350ML', '', '0', '3', '30', '0', '0', '35000', '0', '0', '22', '', '26', '', '7', '', 'OLI SEMPROT', '0'),
(905, 'PLL0031', 'Carbon Brush DWD14/810', '', '0', '0', '0', '0', '0', '50000', '0', '0', '30', '', '26', '', '7', '', 'Dewalt (Grinda)', '0'),
(906, 'PLL0039', 'Gagang Las Co 350A Euro', '', '0', '0', '0', '0', '0', '1100000', '0', '0', '30', '', '26', '', '7', '', 'Euro', '0'),
(907, 'PLL0040', 'Gagang Las Co 350A Panasonic', '', '0', '0', '0', '0', '0', '1300000', '0', '0', '27', '', '26', '', '7', '', 'Panasonic', '0'),
(908, 'PLL0001', 'GUNTING PLAT', '', '0', '1', '5', '0', '0', '125000', '0', '0', '27', '', '26', '', '7', '', '-', '0'),
(909, 'PLL0010', 'Kaca Mata Safety', '', '0', '0', '0', '0', '0', '10000', '0', '0', '27', '', '26', '', '7', '', '-', '0'),
(910, 'PLL0052', 'Kain Wool Poles 7\"', '', '0', '0', '0', '0', '0', '125000', '0', '0', '27', '', '26', '', '7', '', '-', '0'),
(911, 'PLL0054', 'Kanebo', '', '0', '0', '0', '0', '0', '28000', '0', '0', '27', '', '26', '', '7', '', '-', '0'),
(912, 'PLL0053', 'Kape Daun Set', '', '0', '0', '0', '0', '0', '65000', '0', '0', '30', '', '26', '', '7', '', '-', '0'),
(913, 'PLL0024', 'Kapur Besi', '', '0', '5', '30', '0', '0', '2083', '0', '0', '27', '', '26', '', '7', '', 'KAPUR', '0'),
(914, 'PLL0049', 'Kawat JOK No 10', '', '0', '0', '0', '0', '0', '29000', '0', '0', '21', '', '26', '', '7', '', 'Jok', '0'),
(915, 'PLL0015', 'Kawat JOK No 12', '', '0', '5', '15', '0', '0', '28500', '0', '0', '21', '', '26', '', '7', '', 'U/JOK', '0'),
(916, 'PLL0025', 'Kit Kuning', '', '0', '0', '0', '0', '0', '38000', '0', '0', '22', '', '26', '', '7', '', 'Pengkilap', '0'),
(917, 'PLL0027', 'Klem Selang 5/8', '', '0', '0', '0', '0', '0', '2000', '0', '0', '27', '', '26', '', '7', '', '-', '0'),
(918, 'PLL0014', 'Koran Bekas', '', '0', '20', '200', '0', '0', '10000', '0', '0', '21', '', '26', '', '7', '', 'BEKAS', '0'),
(919, 'PLL0032', 'Kuas 1\"', '', '0', '0', '0', '0', '0', '1917', '0', '0', '27', '', '26', '', '7', '', 'Eterna', '0'),
(920, 'PLL0033', 'Kuas 2\"', '', '0', '0', '0', '0', '0', '3750', '0', '0', '27', '', '26', '', '7', '', 'Eterna', '0'),
(921, 'PLL0026', 'Kuas 4\"', '', '0', '12', '120', '0', '0', '12000', '0', '0', '27', '', '26', '', '7', '', 'KUAS', '0'),
(922, 'PLL0050', 'Mesin Bor 13mm Makita HP1630', '', '0', '0', '0', '0', '0', '1200000', '0', '0', '31', '', '26', '', '7', '', 'Makita', '0'),
(923, 'PLL0028', 'Meteran 5mtr', '', '0', '0', '0', '0', '0', '20000', '0', '0', '27', '', '26', '', '7', '', 'Alat Ukur', '0'),
(924, 'PLL0007', 'PALU', '', '0', '0', '0', '0', '0', '0', '0', '0', '27', '', '26', '', '7', '', '-', '0'),
(925, 'PLL0017', 'Plastik Bening 60X100', '', '0', '20', '100', '0', '0', '16000', '0', '0', '26', '', '26', '', '7', '', 'PLASTIK', '10'),
(926, 'PLL0041', 'Plastik Cor', '', '0', '0', '0', '0', '0', '18000', '0', '0', '21', '', '26', '', '7', '', '-', '0'),
(927, 'PLL0019', 'Regulator Gas Acetilyn', '', '0', '1', '5', '0', '0', '395000', '0', '0', '27', '', '26', '', '7', '', 'Multipro', '0'),
(928, 'PLL0038', 'Regulator Gas Co2', '', '0', '0', '0', '0', '0', '395000', '0', '0', '27', '', '26', '', '7', '', 'Multipro', '0'),
(929, 'PLL0022', 'Regulator Gas Oxygen', '', '0', '1', '5', '0', '0', '395000', '0', '0', '27', '', '26', '', '7', '', 'Multipro', '0'),
(930, 'PLL0046', 'Regulator LPG', '', '0', '0', '0', '0', '0', '100000', '0', '0', '27', '', '26', '', '7', '', 'LPG', '0'),
(931, 'PLL0044', 'Roda PU Merah 3\" Hidup', '', '0', '0', '0', '0', '0', '75000', '0', '0', '27', '', '26', '', '7', '', '3\"', '0'),
(932, 'PLL0045', 'Roda PU Merah 3\" Mati', '', '0', '0', '0', '0', '0', '65000', '0', '0', '27', '', '26', '', '7', '', '3\"', '0'),
(933, 'PLL0018', 'Rubbing Coumpon', '', '0', '5', '15', '0', '0', '65000', '0', '0', '22', '', '26', '', '7', '', 'PUTIH', '1'),
(934, 'PLL0061', 'Saklar On/Off Merah Besar', '', '0', '0', '10', '0', '0', '6000', '0', '0', '27', '', '26', '', '7', '', 'Merah', '0'),
(935, 'PLL0062', 'Saringan Cat', '', '0', '0', '10', '0', '0', '40000', '0', '0', '27', '', '26', '', '7', '', '-', '0'),
(936, 'PLL0011', 'Sarung Tangan', '', '0', '24', '150', '0', '0', '1417', '0', '0', '30', '', '26', '', '7', '', '-', '0'),
(937, 'PLL0013', 'SELANG AIR 5/8', '', '0', '10', '50', '0', '0', '12000', '0', '0', '25', '', '26', '', '7', '', 'U/AC', '0'),
(938, 'PLL0012', 'SELANG ANGIN', '', '0', '0', '0', '0', '0', '10000', '0', '0', '25', '', '26', '', '7', '', '-', '0'),
(939, 'PLL0020', 'SELANG GAS DOUBLE NCR', '', '0', '5', '50', '0', '0', '30000', '0', '0', '25', '', '26', '', '7', '', 'U/BLANDER', '0'),
(940, 'PLL0034', 'Shaf Seal Assy 043690-0140', '', '0', '0', '0', '0', '0', '1200000', '0', '0', '27', '', '26', '', '7', '', 'AC', '0'),
(941, 'PLL0036', 'Sikalube 227 Uk 360ml', '', '0', '0', '0', '0', '0', '40515', '0', '0', '22', '', '26', '', '7', '', 'Cairan Anti Karat', '0'),
(942, 'PLL0063', 'Sikat Kawat Kuas', '', '0', '0', '10', '0', '0', '2500', '0', '0', '27', '', '26', '', '7', '', '-', '0'),
(943, 'PLL0059', 'Sikat Kawat Lurus', '', '0', '0', '10', '0', '0', '10500', '0', '0', '27', '', '26', '', '7', '', 'Sikat', '0'),
(944, 'PLL0029', 'Spidol', '', '0', '0', '0', '0', '0', '2000', '0', '0', '27', '', '26', '', '7', '', '-', '0'),
(945, 'PLL0048', 'Spray Gun Lakoni F100', '', '0', '0', '0', '0', '0', '360000', '0', '0', '30', '', '26', '', '7', '', 'Lakoni', '0'),
(946, 'PLL0057', 'Spray Gun Meiji F110 TA', '', '0', '0', '0', '0', '0', '1550000', '0', '0', '30', '', '26', '', '7', '', 'Meiji', '0'),
(947, 'PLL0047', 'Spray Gun Meiji F110 TB', '', '0', '0', '0', '0', '0', '1550000', '0', '0', '30', '', '26', '', '7', '', 'F110 TB', '0'),
(948, 'PLL0056', 'Spray Gun Meiji F75 TA', '', '0', '0', '0', '0', '0', '325000', '0', '0', '30', '', '26', '', '7', '', 'Meiji', '0'),
(949, 'PLL0058', 'Spray Gun Meiji F75 TB', '', '0', '0', '0', '0', '0', '325000', '0', '0', '30', '', '26', '', '7', '', 'Meiji', '0'),
(950, 'PLL0023', 'STOP KONTAK LUBANG 4', '', '0', '2', '12', '0', '0', '25000', '0', '0', '27', '', '26', '', '7', '', 'PUTIH', '0'),
(951, 'PLL0016', 'Tack Cloth Kuning', '', '0', '10', '120', '0', '0', '21500', '0', '0', '27', '', '26', '', '7', '', 'KAIN PEMBERSIH', '0'),
(952, 'PLL0060', 'Tang Rivet Angin', '', '0', '0', '5', '0', '0', '1050000', '0', '0', '30', '', '26', '', '7', '', 'Rivet', '0'),
(953, 'PLL0042', 'Tapping M6', '', '0', '0', '0', '0', '0', '0', '0', '0', '27', '', '26', '', '7', '', 'M6', '0'),
(954, 'PLL0043', 'Tapping M8', '', '0', '0', '0', '0', '0', '0', '0', '0', '27', '', '26', '', '7', '', 'M8', '0'),
(955, 'PLL0064', 'Tembakan Lem Lilin', '', '0', '0', '5', '0', '0', '75000', '0', '0', '27', '', '26', '', '7', '', '-', '0'),
(956, 'PLL0008', 'TEMBAKAN STAPLES ANGIN', '', '0', '0', '0', '0', '0', '0', '0', '0', '31', '', '26', '', '7', '', '-', '0'),
(957, 'PLL0009', 'TEMBAKAN STAPLES MANUAL', '', '0', '0', '0', '0', '0', '0', '0', '0', '31', '', '26', '', '7', '', '-', '0'),
(958, 'PLL0037', 'Turtle Wax', '', '0', '0', '0', '0', '0', '100000', '0', '0', '27', '', '26', '', '7', '', '-', '0'),
(959, 'PLL0035', 'Valve Plate Assy 043560-0070', '', '0', '0', '0', '0', '0', '300000', '0', '0', '27', '', '26', '', '7', '', 'AC', '0'),
(960, 'PLS0001', 'Contactip 0,8', '', '0', '0', '0', '0', '0', '35000', '0', '0', '27', '', '28', '', '7', '', 'Mesin CO2', '0'),
(961, 'PLS0011', 'Gagang las Listrik', '', '0', '0', '0', '0', '0', '0', '0', '0', '27', '', '28', '', '7', '', 'Las Listrik', '0'),
(962, 'PLS0002', 'Gas Nozzel P350', '', '0', '0', '0', '0', '0', '30000', '0', '0', '27', '', '28', '', '7', '', 'Mesin CO2', '0'),
(963, 'PLS0003', 'Kawat Las CO NK-58 0,8 15kg', '', '0', '3', '15', '0', '0', '321750', '0', '0', '28', '', '28', '', '7', '', 'ENKA', '0'),
(964, 'PLS0010', 'Kawat Las Co2 0.8mm Cpro Weld', '', '0', '0', '0', '0', '0', '407925', '0', '0', '28', '', '28', '', '7', '', 'Cpro Weld', '0'),
(965, 'PLS0004', 'Kawat Las Listrik 2.6 @5kg', '', '0', '0', '0', '0', '0', '150000', '0', '0', '26', '', '28', '', '7', '', '2,6', '0'),
(966, 'PLS0005', 'KAWAT LAS LISTRIK 3,2', '', '0', '0', '0', '0', '0', '0', '0', '0', '27', '', '28', '', '7', '', '-', '0'),
(967, 'PLS0015', 'Kawat Las Tembaga', '', '0', '0', '0', '0', '0', '18000', '0', '0', '27', '', '28', '', '7', '', '-', '0'),
(968, 'PLS0006', 'Nozzel Holder', '', '0', '0', '0', '0', '0', '30000', '0', '0', '27', '', '28', '', '7', '', 'Mesin Co', '0'),
(969, 'PLS0007', 'Selongsong Kramik', '', '0', '0', '0', '0', '0', '20000', '0', '0', '27', '', '28', '', '7', '', '-', '0'),
(970, 'PLS0012', 'Stang Blander Morris 8102', '', '0', '0', '2', '0', '0', '750000', '0', '0', '30', '', '28', '', '7', '', 'Blander', '0'),
(971, 'PLS0013', 'Stang Las Co 350A Euro', '', '0', '0', '0', '0', '0', '1100000', '0', '0', '30', '', '28', '', '7', '', 'Euro', '0'),
(972, 'PLS0014', 'Stang Las Co 350A Panasonic', '', '0', '0', '0', '0', '0', '1300000', '0', '0', '30', '', '28', '', '7', '', 'Panasonic', '0'),
(973, 'PLS0008', 'Tip Adapto', '', '0', '0', '0', '0', '0', '45000', '0', '0', '27', '', '28', '', '7', '', 'Panasonic', '0'),
(974, 'PMS0002', 'Mesin Bor 10mm Dewalt 550W DWD014', '', '0', '1', '3', '0', '0', '850000', '0', '0', '31', '', '31', '', '7', '', 'DEWALT', '0'),
(975, 'PMS0007', 'MESIN BOR 13MM DEWALT 650W DWD024', '', '0', '1', '3', '0', '0', '809050', '0', '0', '31', '', '31', '', '7', '', 'DEWALT', '0'),
(976, 'PMS0003', 'Mesin Grinda Dewalt 4\" DW810', '', '0', '0', '0', '0', '0', '779000', '0', '0', '31', '', '31', '', '7', '', 'Dewalt', '0'),
(977, 'PMS0008', 'Mesin Heat Gun RYU', '', '0', '0', '0', '0', '0', '400000', '0', '0', '31', '', '31', '', '7', '', 'RYU', '0'),
(978, 'PMS0004', 'MESIN HEATGUN', '', '0', '0', '0', '0', '0', '0', '0', '0', '31', '', '31', '', '7', '', '-', '0'),
(979, 'PMS0005', 'MESIN LAS CO', '', '0', '0', '0', '0', '0', '0', '0', '0', '31', '', '31', '', '7', '', '-', '0'),
(980, 'PMS0006', 'MESIN LAS LISTRIK', '', '0', '0', '0', '0', '0', '0', '0', '0', '31', '', '31', '', '7', '', '-', '0'),
(981, 'PMS0010', 'Mesin Sanding Ampelas Makita', '', '0', '0', '5', '0', '0', '950000', '0', '0', '30', '', '31', '', '7', '', 'Makita', '0'),
(982, 'PMS0009', 'Rotor Mesin Grinda 14\" Dewalt D28720', '', '0', '0', '0', '0', '0', '1200000', '0', '0', '27', '', '31', '', '7', '', '-', '0'),
(983, 'PPS0006', 'Gagang Pisau Cutter Kenko', '', '0', '1', '24', '0', '0', '15000', '0', '0', '27', '', '34', '', '7', '', 'Cutter', '0'),
(984, 'PPS0001', 'Mata Gergaji Besi Sanflex', '', '0', '5', '30', '0', '0', '15000', '0', '0', '27', '', '34', '', '7', '', '-', '0'),
(985, 'PPS0007', 'Mata Gergaji Jigsaw No 3', '', '0', '0', '0', '0', '0', '14200', '0', '0', '27', '', '34', '', '7', '', 'Jigsaw', '0'),
(986, 'PPS0002', 'MATA GERGAJI JIGSAW NO1', '', '0', '0', '0', '0', '0', '20000', '0', '0', '27', '', '34', '', '7', '', '-', '0'),
(987, 'PPS0003', 'MATA GERGAJI JIGSAW NO2', '', '0', '0', '0', '0', '0', '20000', '0', '0', '27', '', '34', '', '7', '', '-', '0'),
(988, 'PPS0004', 'Mata Pisau Cutter', '', '0', '60', '700', '0', '0', '1800', '0', '0', '27', '', '34', '', '7', '', 'Cutter', '0'),
(989, 'PPS0005', 'Mata Pisau Mika Akrilik', '', '0', '5', '50', '0', '0', '12000', '0', '0', '27', '', '34', '', '7', '', '-', '0'),
(990, 'PSB0001', 'Sabun Colek', '', '0', '60', '360', '0', '0', '867', '0', '0', '27', '', '38', '', '7', '', '-', '0'),
(991, 'PSB0002', 'Sabun Liquid 47 4 In 1 Star Mistic @5L', '', '0', '0', '0', '0', '0', '275000', '0', '0', '20', '', '38', '', '7', '', '-', '0'),
(992, 'PSB0003', 'Sabun Liquid 47 Fronsider @5L', '', '0', '0', '0', '0', '0', '450000', '0', '0', '20', '', '38', '', '7', '', '-', '0'),
(993, 'PSB0004', 'Sabun Liquid 47 Strong OSD @5L', '', '0', '0', '0', '0', '0', '225000', '0', '0', '20', '', '38', '', '7', '', '-', '0'),
(994, 'PSB0005', 'Sabun Oil Remover F03SPL @5L', '', '0', '0', '0', '0', '0', '500000', '0', '0', '20', '', '38', '', '7', '', '-', '0');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_wh_body`
--

CREATE TABLE `tbl_wh_body` (
  `no_body` varchar(10) NOT NULL,
  `no_pol` varchar(10) NOT NULL,
  `type` varchar(30) NOT NULL,
  `merk` varchar(35) NOT NULL,
  `thn_rangka` varchar(4) NOT NULL,
  `thn_pembuatan` varchar(4) NOT NULL,
  `karoseri` varchar(35) NOT NULL,
  `warna` varchar(25) NOT NULL,
  `kelas` varchar(15) NOT NULL,
  `strip` varchar(30) NOT NULL,
  `keterangan` text NOT NULL,
  `kondisi` enum('BARU','PERBAIKAN') NOT NULL,
  `status` enum('AKTIF','PASIF') NOT NULL,
  `pool` varchar(35) NOT NULL,
  `no_rangka` varchar(35) NOT NULL,
  `no_mesin` varchar(35) NOT NULL,
  `rute_asli` varchar(35) NOT NULL,
  `rute_aktif` varchar(35) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_wh_body`
--

INSERT INTO `tbl_wh_body` (`no_body`, `no_pol`, `type`, `merk`, `thn_rangka`, `thn_pembuatan`, `karoseri`, `warna`, `kelas`, `strip`, `keterangan`, `kondisi`, `status`, `pool`, `no_rangka`, `no_mesin`, `rute_asli`, `rute_aktif`) VALUES
('RG100/170', 'B 21234Y', 'TEST', 'test', '2003', '2023', 'ADI Putro', 'Putih', 'AC 2-3', 'putih', 'TEST', 'BARU', 'AKTIF', '', '', '', '', ''),
('test', '1', '2', '3', '2023', '2023', '6', '7', '8', '9', '13', 'BARU', 'AKTIF', '', '', '', '', ''),
('testes', '1', '2', '3', '2023', '2023', '6', '7', '8', '9', '13', 'BARU', 'AKTIF', '10', '4', '5', '11', '12');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_wh_detail_part_keluar`
--

CREATE TABLE `tbl_wh_detail_part_keluar` (
  `id_detail` int(11) NOT NULL,
  `id_keluar` varchar(25) NOT NULL,
  `no_part` varchar(25) NOT NULL,
  `nama_part` varchar(35) NOT NULL,
  `supplier` varchar(35) NOT NULL,
  `status_part` enum('AKTIF','PASIF') NOT NULL,
  `harga` decimal(10,0) NOT NULL,
  `jumlah` decimal(10,0) NOT NULL,
  `total_harga` decimal(10,0) NOT NULL,
  `ket_part` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tbl_wh_detail_part_keluar`
--

INSERT INTO `tbl_wh_detail_part_keluar` (`id_detail`, `id_keluar`, `no_part`, `nama_part`, `supplier`, `status_part`, `harga`, `jumlah`, `total_harga`, `ket_part`) VALUES
(1, '202302220002', 'ML1312-2148', 'PISAU ONLY UNTUK POTONG VINYL ', 'PISAU ONLY UNTUK POTONG VINYL ', 'AKTIF', '10000', '5', '50000', ''),
(2, '202302220003', 'ML1312-2148', 'PISAU ONLY UNTUK POTONG VINYL ', 'PISAU ONLY UNTUK POTONG VINYL ', 'AKTIF', '10000', '5', '50000', ''),
(3, '202302220004', 'ML1312-2148', 'PISAU ONLY UNTUK POTONG VINYL ', 'PISAU ONLY UNTUK POTONG VINYL ', 'AKTIF', '10000', '5', '50000', ''),
(4, '202302220004', 'ML1312-2148', 'PISAU ONLY UNTUK POTONG VINYL ', 'PISAU ONLY UNTUK POTONG VINYL ', 'PASIF', '10000', '5', '50000', ''),
(5, '202302220005', 'ML1312-2148', 'PISAU ONLY UNTUK POTONG VINYL ', 'PISAU ONLY UNTUK POTONG VINYL ', 'AKTIF', '10000', '2', '20000', ''),
(6, '202302220005', 'ML1312-2148', 'PISAU ONLY UNTUK POTONG VINYL ', 'PISAU ONLY UNTUK POTONG VINYL ', 'PASIF', '10000', '2', '20000', ''),
(7, '202302220006', 'ML1312-2148', 'PISAU ONLY UNTUK POTONG VINYL ', 'PISAU ONLY UNTUK POTONG VINYL ', 'AKTIF', '10000', '1', '10000', ''),
(11, '202302220008', 'ML1312-2148', 'PISAU ONLY UNTUK POTONG VINYL ', 'PISAU ONLY UNTUK POTONG VINYL ', 'AKTIF', '10000', '1', '10000', ''),
(12, '202302240001', 'ML1312-2148', 'PISAU ONLY UNTUK POTONG VINYL ', 'PISAU ONLY UNTUK POTONG VINYL ', 'AKTIF', '10000', '5', '50000', 'test'),
(13, '202302250001', '12345', 'test', 'test', 'AKTIF', '5000', '5', '25000', 'test'),
(14, '202302270001', '12345', 'test', 'test', 'AKTIF', '5000', '5', '25000', 'test'),
(15, '202302270001', 'ML1312-2148', 'PISAU ONLY UNTUK POTONG VINYL ', 'PISAU ONLY UNTUK POTONG VINYL ', 'AKTIF', '10000', '5', '50000', 'test'),
(16, '202303020001', '12345', 'test', 'test', 'AKTIF', '5000', '10', '50000', 'test'),
(18, '202303070001', 'ML1312-2148', 'PISAU ONLY UNTUK POTONG VINYL ', 'PISAU ONLY UNTUK POTONG VINYL ', 'AKTIF', '10000', '5', '50000', 'test');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_wh_detail_po`
--

CREATE TABLE `tbl_wh_detail_po` (
  `id_detail` int(11) NOT NULL,
  `id_po` varchar(25) NOT NULL,
  `no_part` varchar(25) NOT NULL,
  `nama_part` varchar(35) NOT NULL,
  `harga` decimal(10,0) NOT NULL,
  `jumlah` decimal(10,0) NOT NULL,
  `diskon` varchar(15) NOT NULL,
  `total_diskon` decimal(10,0) NOT NULL,
  `total_harga` decimal(10,0) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tbl_wh_detail_po`
--

INSERT INTO `tbl_wh_detail_po` (`id_detail`, `id_po`, `no_part`, `nama_part`, `harga`, `jumlah`, `diskon`, `total_diskon`, `total_harga`) VALUES
(1, '202302220001', 'ML1312-2148', 'PISAU ONLY UNTUK POTONG VINYL ', '10000', '5', '', '0', '0'),
(2, '202302240001', 'ML1312-2148', 'PISAU ONLY UNTUK POTONG VINYL ', '10000', '5', '', '0', '50000'),
(3, '202302250001', '12345', 'test', '0', '2', '', '0', '0'),
(4, '202302270001', '12345', 'test', '5000', '5', '', '0', '25000'),
(5, '202302270001', 'ML1312-2148', 'PISAU ONLY UNTUK POTONG VINYL ', '10000', '5', '0', '0', '50000'),
(6, '202303070001', 'ML1312-2148', 'PISAU ONLY UNTUK POTONG VINYL ', '10000', '5', '', '0', '50000'),
(7, '202303070001', 'BH-01R', 'BUZZER 12-48V DC 110dB ', '85000', '15', '5', '63750', '1211250'),
(8, '202303070002', 'ML1312-2148', 'PISAU ONLY UNTUK POTONG VINYL ', '10000', '5', '', '0', '50000');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_wh_kategori`
--

CREATE TABLE `tbl_wh_kategori` (
  `id_kategori` int(11) NOT NULL,
  `kategori` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tbl_wh_kategori`
--

INSERT INTO `tbl_wh_kategori` (`id_kategori`, `kategori`) VALUES
(1, 'Body'),
(2, 'CAT'),
(3, 'ELEKTRIK'),
(4, 'FIBER'),
(5, 'INTERIOR'),
(6, 'JOK'),
(7, 'PERALATAN');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_wh_kelompok`
--

CREATE TABLE `tbl_wh_kelompok` (
  `id_kelompok` int(11) NOT NULL,
  `kelompok` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tbl_wh_kelompok`
--

INSERT INTO `tbl_wh_kelompok` (`id_kelompok`, `kelompok`) VALUES
(2, 'Mesin'),
(3, 'Transmisi'),
(4, 'Body'),
(5, 'Suspensi'),
(6, 'Elektronik'),
(7, 'Filter'),
(8, 'Facing'),
(9, 'Ban');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_wh_log_harga`
--

CREATE TABLE `tbl_wh_log_harga` (
  `id` int(11) NOT NULL,
  `id_barang` varchar(25) NOT NULL,
  `no_part` varchar(25) NOT NULL,
  `hrg_awal` decimal(10,0) NOT NULL,
  `hrg_1` decimal(10,0) NOT NULL,
  `hrg_2` decimal(10,0) NOT NULL,
  `tgl_update` date NOT NULL,
  `user` varchar(25) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tbl_wh_log_harga`
--

INSERT INTO `tbl_wh_log_harga` (`id`, `id_barang`, `no_part`, `hrg_awal`, `hrg_1`, `hrg_2`, `tgl_update`, `user`) VALUES
(1, '22030', '', '858001', '780002', '858003', '2023-02-16', 'Administrator'),
(2, '22030', 'ML1312-2148', '85800', '78000', '85800', '2023-02-16', 'Administrator'),
(3, '22030', 'ML1312-2148', '10000', '78000', '85800', '2023-02-18', 'Administrator'),
(4, '22032', '12345', '5000', '5000', '5000', '2023-02-25', 'Administrator');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_wh_part_keluar`
--

CREATE TABLE `tbl_wh_part_keluar` (
  `id_keluar` varchar(25) NOT NULL,
  `tgl_keluar` date NOT NULL,
  `tujuan` varchar(35) NOT NULL,
  `acc` varchar(25) NOT NULL,
  `status` varchar(35) NOT NULL,
  `no_spk` varchar(50) NOT NULL,
  `keterangan` varchar(50) NOT NULL,
  `total_harga` decimal(10,0) NOT NULL,
  `user` varchar(35) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tbl_wh_part_keluar`
--

INSERT INTO `tbl_wh_part_keluar` (`id_keluar`, `tgl_keluar`, `tujuan`, `acc`, `status`, `no_spk`, `keterangan`, `total_harga`, `user`) VALUES
('202302220001', '2023-02-22', '', '', 'N', '', 'test', '0', 'Administrator'),
('202302220002', '2023-02-22', '', 'saya', 'N', '', 'test', '0', 'Administrator'),
('202302220003', '2023-02-22', '', 'saya', 'N', '', '', '0', 'Administrator'),
('202302220004', '2023-02-22', '', '', 'N', '', 'test', '0', 'Administrator'),
('202302220005', '2023-02-22', '', '', 'N', '', '', '0', 'Administrator'),
('202302220006', '2023-02-22', '', '', 'N', '', '', '0', 'Administrator'),
('202302220007', '2023-02-22', '', '', 'N', '', '', '0', 'Administrator'),
('202302220008', '2023-02-22', '', '', 'N', '', '', '0', 'Administrator'),
('202302240001', '2023-02-24', 'PT', '', 'N', '', 'test', '0', 'Administrator'),
('202302250001', '2023-02-25', 'pt', '', 'N', '', '', '0', 'Administrator'),
('202302270001', '2023-02-27', 'PT', '', 'N', '', 'Test', '0', 'Administrator'),
('202303020001', '2023-03-02', 'test', '', 'N', '', 'test', '0', 'Administrator'),
('202303070001', '2023-03-07', 'PT', '', 'N', '', 'Test', '0', 'Administrator');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_wh_part_masuk`
--

CREATE TABLE `tbl_wh_part_masuk` (
  `id_masuk` int(11) NOT NULL,
  `id_barang` varchar(15) NOT NULL,
  `no_part` varchar(25) NOT NULL,
  `status_po` enum('Y','N') NOT NULL,
  `no_po` varchar(25) NOT NULL,
  `tgl_masuk` date NOT NULL,
  `jumlah` decimal(10,0) NOT NULL,
  `status_part` enum('AKTIF','PASIF') NOT NULL,
  `user` varchar(25) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tbl_wh_part_masuk`
--

INSERT INTO `tbl_wh_part_masuk` (`id_masuk`, `id_barang`, `no_part`, `status_po`, `no_po`, `tgl_masuk`, `jumlah`, `status_part`, `user`) VALUES
(1, '22030', 'ML1312-2148', 'Y', '1234', '2023-02-15', '15', 'AKTIF', 'Administrator'),
(2, '22030', 'ML1312-2148', 'Y', '1234', '2023-02-15', '5', 'PASIF', 'Administrator'),
(3, '22030', 'ML1312-2148', 'N', '', '2023-02-17', '5', 'PASIF', 'Administrator'),
(4, '22028', 'BH-01R', 'N', '', '2023-02-17', '2', 'AKTIF', 'Administrator'),
(5, '22028', 'BH-01R', 'N', '', '2023-02-17', '2', 'AKTIF', 'Administrator'),
(6, '22032', '12345', 'N', '', '2023-02-25', '10', 'AKTIF', 'Administrator'),
(7, '22032', '12345', 'N', '', '2023-03-02', '10', 'AKTIF', 'Administrator'),
(8, '22030', 'ML1312-2148', 'N', '', '2023-03-07', '5', 'AKTIF', 'Administrator'),
(9, '22030', 'ML1312-2148', 'Y', '12345', '2023-03-07', '5', 'PASIF', 'Administrator');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_wh_po`
--

CREATE TABLE `tbl_wh_po` (
  `id_po` varchar(25) NOT NULL,
  `tgl_po` date NOT NULL,
  `kode_pesan` varchar(25) NOT NULL,
  `top` varchar(35) NOT NULL,
  `ppn` varchar(15) NOT NULL,
  `t_ppn` decimal(10,0) NOT NULL,
  `sub_total` decimal(10,0) NOT NULL,
  `grand_total` decimal(10,0) NOT NULL,
  `supplier` varchar(15) NOT NULL,
  `pengesah` varchar(35) NOT NULL,
  `keterangan` varchar(50) NOT NULL,
  `user` varchar(35) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tbl_wh_po`
--

INSERT INTO `tbl_wh_po` (`id_po`, `tgl_po`, `kode_pesan`, `top`, `ppn`, `t_ppn`, `sub_total`, `grand_total`, `supplier`, `pengesah`, `keterangan`, `user`) VALUES
('202302240001', '2023-02-24', 'test', '1 Minggu', '10', '5000', '50000', '55000', '1', 'saya', 'test', 'Administrator'),
('202302250001', '2023-02-25', '', '1 bulan', '11', '0', '0', '0', '1', 'saya', '', 'Administrator'),
('202302270001', '2023-02-27', '', '1 Minggu', '11', '8250', '75000', '83250', '1', 'Saya', 'test', 'Administrator'),
('202303070001', '2023-03-07', '123', '1 Bulan', '11', '138738', '1261250', '1399988', '1', 'Saya', 'test', 'Administrator'),
('202303070002', '2023-03-07', '123412', '1 Bulan', '11', '5500', '50000', '55500', '1', 'saya', 'test', 'Administrator');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_wh_satuan`
--

CREATE TABLE `tbl_wh_satuan` (
  `id_satuan` int(11) NOT NULL,
  `kode_satuan` varchar(25) NOT NULL,
  `satuan` varchar(25) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tbl_wh_satuan`
--

INSERT INTO `tbl_wh_satuan` (`id_satuan`, `kode_satuan`, `satuan`) VALUES
(17, 'BTG', 'BATANG'),
(18, 'CM', 'CM'),
(19, 'CM2', 'CM2'),
(20, 'JRG', 'JERIGEN'),
(21, 'KG', 'KILO GRAM'),
(22, 'KLG', 'KALENG'),
(23, 'LBR', 'LEMBAR'),
(24, 'LTR', 'LITER'),
(25, 'MTR', 'MTR'),
(26, 'PAK', 'PAK'),
(27, 'PCS', 'PCS'),
(28, 'ROLL', 'ROLL'),
(29, 'TBG', 'TBG'),
(30, 'SET', 'SET'),
(31, 'UNT', 'UNIT');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_wh_supplier`
--

CREATE TABLE `tbl_wh_supplier` (
  `id_supplier` int(11) NOT NULL,
  `kode_sup` varchar(15) NOT NULL,
  `nama_sup` varchar(50) NOT NULL,
  `alamat` varchar(500) NOT NULL,
  `no_tlp` varchar(15) NOT NULL,
  `tlp_person` varchar(15) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tbl_wh_supplier`
--

INSERT INTO `tbl_wh_supplier` (`id_supplier`, `kode_sup`, `nama_sup`, `alamat`, `no_tlp`, `tlp_person`) VALUES
(1, 'HMSI', 'PT.HINO MOTORS SALES INDONESIA', 'Jakarta', '', ''),
(2, 'DSI', 'DENSO SALES INDONESIA', 'Sunter', '', ''),
(3, 'KA', 'KIKIJAYA AIRCONINDO', 'Jl. Jenderal Sudirman Km 31 Kranji', '', '');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_wh_type_mesin`
--

CREATE TABLE `tbl_wh_type_mesin` (
  `id_type` int(11) NOT NULL,
  `type_mesin` varchar(25) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tbl_wh_type_mesin`
--

INSERT INTO `tbl_wh_type_mesin` (`id_type`, `type_mesin`) VALUES
(1, 'ABS'),
(2, 'ALUMUNIUM'),
(3, 'AMPELAS'),
(4, 'AUDIO&VIDEO'),
(5, 'BAUD'),
(6, 'BESI'),
(7, 'BOR'),
(8, 'BUSA'),
(9, 'CAT'),
(10, 'DEMPUL'),
(11, 'ENGSEL'),
(12, 'EPOXY'),
(13, 'EXHAUST'),
(14, 'GAS'),
(15, 'GORDENG'),
(16, 'GERINDA'),
(17, 'HARDENER'),
(18, 'INVENTER'),
(19, 'KABEL'),
(20, 'KACA'),
(21, 'KAIN'),
(22, 'KARET'),
(23, 'KARPET'),
(24, 'KONEKTOR'),
(25, 'KUNCI'),
(26, 'Lain-Lain'),
(27, 'LAMPU'),
(28, 'LAS'),
(29, 'LEM'),
(30, 'MATERIAL'),
(31, 'MESIN'),
(32, 'MIKA'),
(33, 'PERNIS'),
(34, 'PISAU'),
(35, 'PRODUK'),
(36, 'REKLENING'),
(37, 'REMOVER'),
(38, 'SABUN'),
(39, 'SARUNG'),
(40, 'SEKRUP'),
(41, 'SILIKON'),
(42, 'SPION'),
(43, 'STABILUS'),
(44, 'STIKER'),
(45, 'THINER'),
(46, 'TOILET'),
(47, 'TRIPLEK'),
(48, 'WIPER'),
(49, 'AMPE28');

-- --------------------------------------------------------

--
-- Table structure for table `user_login`
--

CREATE TABLE `user_login` (
  `id` int(11) NOT NULL,
  `username` varchar(20) NOT NULL,
  `Nama` varchar(50) NOT NULL,
  `password` varchar(40) NOT NULL,
  `lokasi` varchar(25) NOT NULL,
  `login_hash` varchar(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `user_login`
--

INSERT INTO `user_login` (`id`, `username`, `Nama`, `password`, `lokasi`, `login_hash`) VALUES
(1, 'admin', 'Administrator', '21232f297a57a5a743894a0e4a801fc3', 'K002', 'administrator'),
(6, 'SAPTO', 'SAPTO PRASETYO', '827ccb0eea8a706c4c34a16891f84e7b', 'K002', 'toolkeeper'),
(8, 'RUSMAN', 'RUSMAN', 'ff31ff01cb1db3a6e25419a749d381e5', 'K002', 'user_wo'),
(9, 'KBB', 'ASEP SUPRIYATNA', '827ccb0eea8a706c4c34a16891f84e7b', 'K002', 'administrator'),
(10, 'DIE', 'WAHYUDHI', '81b63b9d54b303edeaf9765a6915ee13', 'K002', 'administrator'),
(11, 'admin', 'HENDRA', '6d774c928ce7cde15391e8577ea44a53', 'K002', 'administrator'),
(12, 'ANWAR', 'anwar', '4647366a6546ab8c6723d02c1fdc3c07', 'K002', 'administrator'),
(14, 'sagiman', 'sagiman', '827ccb0eea8a706c4c34a16891f84e7b', 'K002', 'toolkeeper'),
(16, 'cuserwo', 'contoh user wo', 'd395771085aab05244a4fb8fd91bf4ee', 'K002', 'user_wo'),
(17, 'ctoolkeeper', 'contoh tool keeper', 'd395771085aab05244a4fb8fd91bf4ee', 'K002', 'toolkeeper'),
(20, 'csadm', 'contoh super adm', 'd395771085aab05244a4fb8fd91bf4ee', 'K002', 'administrator'),
(21, 'yougi', 'Yougi', 'a5e65fe252f7200458759f5121a40737', 'K002', 'administrator'),
(22, 'anto', 'Fitrianto K', '084f2d8bc1b1183a2c93b9ac69c674f4', 'T001', 'user_wo'),
(23, 'hnr279', 'HENDRA', '587ebe03c4501a6dbbf850550ce5a557', 'CIBITUNG2', 'administrator'),
(24, 'ISWADI', 'ISWADI', 'b9df40e453a9080cae70ab607e4585ef', 'K002', 'administrator'),
(25, 'YASIN', 'Yasin', '38513cb8e6fb41b8ef58f31682c2720e', 'K002', 'user_wo'),
(27, 'L SETIAWAN', 'L SETIAWAN', 'a614b7ecdefa21d265a20ba29eab7d59', 'K002', 'user_wo'),
(30, 'FUJIDEDE', 'FUJI DEDE', '0d5250fec72816aa0d2be6f3339aaee4', 'K002', 'user_wo'),
(32, 'Tinting color', 'Tinting color', 'e10adc3949ba59abbe56e057f20f883e', 'K002', 'user_wo');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `aplikasi`
--
ALTER TABLE `aplikasi`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `barang`
--
ALTER TABLE `barang`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `history_part`
--
ALTER TABLE `history_part`
  ADD PRIMARY KEY (`id_history`);

--
-- Indexes for table `history_pause`
--
ALTER TABLE `history_pause`
  ADD PRIMARY KEY (`id_pause`);

--
-- Indexes for table `history_pending`
--
ALTER TABLE `history_pending`
  ADD PRIMARY KEY (`id_pending`);

--
-- Indexes for table `images`
--
ALTER TABLE `images`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `jenis_file`
--
ALTER TABLE `jenis_file`
  ADD PRIMARY KEY (`id_jenis`);

--
-- Indexes for table `kategori`
--
ALTER TABLE `kategori`
  ADD PRIMARY KEY (`id_kat`);

--
-- Indexes for table `list_mekanik`
--
ALTER TABLE `list_mekanik`
  ADD PRIMARY KEY (`id_list`);

--
-- Indexes for table `profil_system`
--
ALTER TABLE `profil_system`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tbl_akses_menu`
--
ALTER TABLE `tbl_akses_menu`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tbl_akses_submenu`
--
ALTER TABLE `tbl_akses_submenu`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tbl_br_bast`
--
ALTER TABLE `tbl_br_bast`
  ADD PRIMARY KEY (`id_bast`);

--
-- Indexes for table `tbl_br_bay`
--
ALTER TABLE `tbl_br_bay`
  ADD PRIMARY KEY (`id_bay`);

--
-- Indexes for table `tbl_br_detail_estimasi`
--
ALTER TABLE `tbl_br_detail_estimasi`
  ADD PRIMARY KEY (`id_detail`);

--
-- Indexes for table `tbl_br_detail_pk`
--
ALTER TABLE `tbl_br_detail_pk`
  ADD PRIMARY KEY (`id_detail`);

--
-- Indexes for table `tbl_br_kategori`
--
ALTER TABLE `tbl_br_kategori`
  ADD PRIMARY KEY (`id_kategori`);

--
-- Indexes for table `tbl_br_kat_pk`
--
ALTER TABLE `tbl_br_kat_pk`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tbl_br_kelas`
--
ALTER TABLE `tbl_br_kelas`
  ADD PRIMARY KEY (`id_kelas`);

--
-- Indexes for table `tbl_br_ket_lapor`
--
ALTER TABLE `tbl_br_ket_lapor`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tbl_br_laporan_bus`
--
ALTER TABLE `tbl_br_laporan_bus`
  ADD PRIMARY KEY (`id_lapor`);

--
-- Indexes for table `tbl_br_pk_aktif`
--
ALTER TABLE `tbl_br_pk_aktif`
  ADD PRIMARY KEY (`id_pk`);

--
-- Indexes for table `tbl_hrd_cuti_pegawai`
--
ALTER TABLE `tbl_hrd_cuti_pegawai`
  ADD PRIMARY KEY (`id_cuti`);

--
-- Indexes for table `tbl_hrd_data_absen`
--
ALTER TABLE `tbl_hrd_data_absen`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tbl_hrd_departement`
--
ALTER TABLE `tbl_hrd_departement`
  ADD PRIMARY KEY (`id_departement`);

--
-- Indexes for table `tbl_hrd_jabatan`
--
ALTER TABLE `tbl_hrd_jabatan`
  ADD PRIMARY KEY (`id_jabatan`);

--
-- Indexes for table `tbl_hrd_kodecuti`
--
ALTER TABLE `tbl_hrd_kodecuti`
  ADD PRIMARY KEY (`id_kodecuti`);

--
-- Indexes for table `tbl_hrd_mesin`
--
ALTER TABLE `tbl_hrd_mesin`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tbl_hrd_pegawai`
--
ALTER TABLE `tbl_hrd_pegawai`
  ADD PRIMARY KEY (`nip`);

--
-- Indexes for table `tbl_hrd_pendidikan`
--
ALTER TABLE `tbl_hrd_pendidikan`
  ADD PRIMARY KEY (`id_pendidikan`);

--
-- Indexes for table `tbl_menu`
--
ALTER TABLE `tbl_menu`
  ADD PRIMARY KEY (`id_menu`);

--
-- Indexes for table `tbl_submenu`
--
ALTER TABLE `tbl_submenu`
  ADD PRIMARY KEY (`id_submenu`);

--
-- Indexes for table `tbl_user`
--
ALTER TABLE `tbl_user`
  ADD PRIMARY KEY (`id_user`);

--
-- Indexes for table `tbl_userlevel`
--
ALTER TABLE `tbl_userlevel`
  ADD PRIMARY KEY (`id_level`);

--
-- Indexes for table `tbl_wh_barang`
--
ALTER TABLE `tbl_wh_barang`
  ADD PRIMARY KEY (`id_barang`);

--
-- Indexes for table `tbl_wh_body`
--
ALTER TABLE `tbl_wh_body`
  ADD PRIMARY KEY (`no_body`);

--
-- Indexes for table `tbl_wh_detail_part_keluar`
--
ALTER TABLE `tbl_wh_detail_part_keluar`
  ADD PRIMARY KEY (`id_detail`);

--
-- Indexes for table `tbl_wh_detail_po`
--
ALTER TABLE `tbl_wh_detail_po`
  ADD PRIMARY KEY (`id_detail`);

--
-- Indexes for table `tbl_wh_kategori`
--
ALTER TABLE `tbl_wh_kategori`
  ADD PRIMARY KEY (`id_kategori`);

--
-- Indexes for table `tbl_wh_kelompok`
--
ALTER TABLE `tbl_wh_kelompok`
  ADD PRIMARY KEY (`id_kelompok`);

--
-- Indexes for table `tbl_wh_log_harga`
--
ALTER TABLE `tbl_wh_log_harga`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tbl_wh_part_keluar`
--
ALTER TABLE `tbl_wh_part_keluar`
  ADD PRIMARY KEY (`id_keluar`);

--
-- Indexes for table `tbl_wh_part_masuk`
--
ALTER TABLE `tbl_wh_part_masuk`
  ADD PRIMARY KEY (`id_masuk`);

--
-- Indexes for table `tbl_wh_po`
--
ALTER TABLE `tbl_wh_po`
  ADD PRIMARY KEY (`id_po`);

--
-- Indexes for table `tbl_wh_satuan`
--
ALTER TABLE `tbl_wh_satuan`
  ADD PRIMARY KEY (`id_satuan`);

--
-- Indexes for table `tbl_wh_supplier`
--
ALTER TABLE `tbl_wh_supplier`
  ADD PRIMARY KEY (`id_supplier`);

--
-- Indexes for table `tbl_wh_type_mesin`
--
ALTER TABLE `tbl_wh_type_mesin`
  ADD PRIMARY KEY (`id_type`);

--
-- Indexes for table `user_login`
--
ALTER TABLE `user_login`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `aplikasi`
--
ALTER TABLE `aplikasi`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `barang`
--
ALTER TABLE `barang`
  MODIFY `id` int(11) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `history_part`
--
ALTER TABLE `history_part`
  MODIFY `id_history` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `history_pause`
--
ALTER TABLE `history_pause`
  MODIFY `id_pause` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `history_pending`
--
ALTER TABLE `history_pending`
  MODIFY `id_pending` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `images`
--
ALTER TABLE `images`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=26;

--
-- AUTO_INCREMENT for table `kategori`
--
ALTER TABLE `kategori`
  MODIFY `id_kat` int(11) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `list_mekanik`
--
ALTER TABLE `list_mekanik`
  MODIFY `id_list` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `tbl_akses_menu`
--
ALTER TABLE `tbl_akses_menu`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=135;

--
-- AUTO_INCREMENT for table `tbl_akses_submenu`
--
ALTER TABLE `tbl_akses_submenu`
  MODIFY `id` int(11) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=395;

--
-- AUTO_INCREMENT for table `tbl_br_bay`
--
ALTER TABLE `tbl_br_bay`
  MODIFY `id_bay` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=47;

--
-- AUTO_INCREMENT for table `tbl_br_detail_estimasi`
--
ALTER TABLE `tbl_br_detail_estimasi`
  MODIFY `id_detail` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=23;

--
-- AUTO_INCREMENT for table `tbl_br_detail_pk`
--
ALTER TABLE `tbl_br_detail_pk`
  MODIFY `id_detail` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `tbl_br_kategori`
--
ALTER TABLE `tbl_br_kategori`
  MODIFY `id_kategori` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `tbl_br_kat_pk`
--
ALTER TABLE `tbl_br_kat_pk`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

--
-- AUTO_INCREMENT for table `tbl_br_kelas`
--
ALTER TABLE `tbl_br_kelas`
  MODIFY `id_kelas` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `tbl_br_ket_lapor`
--
ALTER TABLE `tbl_br_ket_lapor`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `tbl_hrd_cuti_pegawai`
--
ALTER TABLE `tbl_hrd_cuti_pegawai`
  MODIFY `id_cuti` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `tbl_hrd_data_absen`
--
ALTER TABLE `tbl_hrd_data_absen`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `tbl_hrd_departement`
--
ALTER TABLE `tbl_hrd_departement`
  MODIFY `id_departement` int(3) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=22;

--
-- AUTO_INCREMENT for table `tbl_hrd_jabatan`
--
ALTER TABLE `tbl_hrd_jabatan`
  MODIFY `id_jabatan` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=322;

--
-- AUTO_INCREMENT for table `tbl_hrd_kodecuti`
--
ALTER TABLE `tbl_hrd_kodecuti`
  MODIFY `id_kodecuti` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `tbl_hrd_mesin`
--
ALTER TABLE `tbl_hrd_mesin`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `tbl_hrd_pendidikan`
--
ALTER TABLE `tbl_hrd_pendidikan`
  MODIFY `id_pendidikan` int(3) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=68;

--
-- AUTO_INCREMENT for table `tbl_menu`
--
ALTER TABLE `tbl_menu`
  MODIFY `id_menu` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=66;

--
-- AUTO_INCREMENT for table `tbl_submenu`
--
ALTER TABLE `tbl_submenu`
  MODIFY `id_submenu` int(11) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=82;

--
-- AUTO_INCREMENT for table `tbl_user`
--
ALTER TABLE `tbl_user`
  MODIFY `id_user` int(11) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `tbl_userlevel`
--
ALTER TABLE `tbl_userlevel`
  MODIFY `id_level` int(11) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `tbl_wh_barang`
--
ALTER TABLE `tbl_wh_barang`
  MODIFY `id_barang` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=995;

--
-- AUTO_INCREMENT for table `tbl_wh_detail_part_keluar`
--
ALTER TABLE `tbl_wh_detail_part_keluar`
  MODIFY `id_detail` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=19;

--
-- AUTO_INCREMENT for table `tbl_wh_detail_po`
--
ALTER TABLE `tbl_wh_detail_po`
  MODIFY `id_detail` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `tbl_wh_kategori`
--
ALTER TABLE `tbl_wh_kategori`
  MODIFY `id_kategori` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `tbl_wh_kelompok`
--
ALTER TABLE `tbl_wh_kelompok`
  MODIFY `id_kelompok` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `tbl_wh_log_harga`
--
ALTER TABLE `tbl_wh_log_harga`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `tbl_wh_part_masuk`
--
ALTER TABLE `tbl_wh_part_masuk`
  MODIFY `id_masuk` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `tbl_wh_satuan`
--
ALTER TABLE `tbl_wh_satuan`
  MODIFY `id_satuan` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=32;

--
-- AUTO_INCREMENT for table `tbl_wh_supplier`
--
ALTER TABLE `tbl_wh_supplier`
  MODIFY `id_supplier` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `tbl_wh_type_mesin`
--
ALTER TABLE `tbl_wh_type_mesin`
  MODIFY `id_type` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=50;

--
-- AUTO_INCREMENT for table `user_login`
--
ALTER TABLE `user_login`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=33;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
