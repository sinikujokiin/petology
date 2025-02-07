-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3306
-- Generation Time: Feb 07, 2025 at 07:58 PM
-- Server version: 10.11.10-MariaDB-cll-lve
-- PHP Version: 8.3.14

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `n1574432_petology`
--

-- --------------------------------------------------------

--
-- Table structure for table `diseases`
--

CREATE TABLE `diseases` (
  `id` int(10) UNSIGNED NOT NULL,
  `code` char(5) NOT NULL,
  `name` varchar(100) NOT NULL,
  `solution` text NOT NULL,
  `reason` text DEFAULT NULL,
  `image` text DEFAULT NULL,
  `created_at` datetime NOT NULL DEFAULT current_timestamp(),
  `updated_at` datetime DEFAULT NULL ON UPDATE current_timestamp(),
  `deleted_at` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data for table `diseases`
--

INSERT INTO `diseases` (`id`, `code`, `name`, `solution`, `reason`, `image`, `created_at`, `updated_at`, `deleted_at`) VALUES
(1, 'P001', 'Demodecosis', 'Memberikan obat dengan golongan isoxazoline pada hewan, memandikan hewan dengan amitraz.', 'Tungau Demodex', NULL, '2022-12-18 09:14:33', '2022-12-23 06:41:30', NULL),
(2, 'P002', 'Scabies', 'Memberikan obat dengan golongan isoxazoline, selamectin, imidacloprid, moxidectin, dan ivermectin pada hewan.', 'Sarcoptes Cabiei', NULL, '2022-12-18 09:14:33', NULL, NULL),
(3, 'P003', 'Hipotiroidisme', 'Memberikan obat tiroid sintetis pada hewan.', 'Kelainan Hormon, Tumor di Tiroid, Tiroid mengecil', NULL, '2022-12-18 09:14:33', NULL, NULL),
(4, 'P004', 'Dermatomicosis', 'Mengoleskan salap gel azole di area luka, memberikan obat itraconazole, memandikan hewan dengan kandungan miconazole.', 'Jamur', NULL, '2022-12-18 09:14:33', NULL, NULL),
(5, 'P005', 'Hot spot', 'Memberikan antibiotik pada hewan, memandikan hewan dengan kandungan chlorhexidine, mengoleskan salap antibiotik di area luka, jika terdapat kutu berikan isoxazoline atau selamectin pada hewan.', 'Jamur, Kutu, Bakteri', NULL, '2022-12-18 09:14:33', NULL, NULL),
(6, 'P006', 'Abses', 'Memberikan antibiotik pada hewan, mengoleskan salap antibiotik pada area luka hewan, memberikan obat minum anti radang pada hewan anjing.', 'Bakteri, Jamur', NULL, '2022-12-18 09:14:33', NULL, NULL),
(7, 'P007', 'Tumor Kulit', 'Segera datang ke dokter hewan untuk melakukan operasi', 'Infeksi, Usia', NULL, '2022-12-18 09:14:33', NULL, NULL),
(8, 'P008', 'Alergi Gigitan Flea', 'Memberikan obat penghilang kutu pada hewan, memberikan obat anti alergi atau steroid', 'Kutu atau Mites', NULL, '2022-12-18 09:14:33', NULL, NULL),
(9, 'P009', 'Alergi Makanan', 'Mengeliminasi faktor penyebab alergi, memberikan pakan khusus,  memberikan obat alergi pada hewan', 'Jenis Makanan Khusus', NULL, '2022-12-18 09:14:33', NULL, NULL),
(10, 'P010', 'Alergi Lingkungan', 'Memberikan obat alergi, memberika anti radang, memberikan pakan khusus, memberikan vitamin untuk imun atau daya tahan tubuh pada hewan', 'Lingkungan tertentu', NULL, '2022-12-18 09:14:33', NULL, NULL),
(11, 'P011', 'Fleas/Pinjal', 'Memberikan obat kutu pada hewan dan memandikan atau memberikan obat anti gatal pada hewan.', 'Kutu', NULL, '2022-12-18 09:14:33', NULL, NULL),
(12, 'P012', 'Ringworm', 'Memberikan salap anti jamur atau anti fungau pada hewan, memberikan antibiotik kulit, memandikan hewan dengan anti jamur', 'Jamur Dermatofit, Jamur Microsporum, Jamur Trichophyton, Jamur Epidermophyton', NULL, '2022-12-18 09:14:33', NULL, NULL),
(13, 'P013', 'Tick Dog/Caplak', 'Memberikan obat kutu pada hewan dan memandikan atau memberikan obat anti gatal pada hewan.', 'Kutu Rhipicephalus', NULL, '2022-12-18 09:14:33', NULL, NULL),
(14, 'P014', 'Deep Mycosis', 'Memberikan salap anti jamur atau anti fungau pada hewan, memberikan antibiotik kulit, memandikan hewan dengan anti jamur, melakukan operasi', 'Jamur', NULL, '2022-12-18 09:14:33', NULL, NULL),
(15, 'P015', 'Acral Lick Dermatitis', 'Memberikan obat antibiotik khusus kulit hewan, memberikan obat anti gatal, mengoleskan salap atau spray pengering luka hewan, bila ditemukan pendarahan diberikan pengurang pendarahan pada hewan, mengeliminasi faktor penyebab penyakit, memberikan obat kutu pada hewan, memberikan vitamin khusus kulit hewan', 'Bakteri, Jamur, Kutu', NULL, '2022-12-18 09:14:33', NULL, NULL),
(16, 'P016', 'Ear Mites', 'Memberikan obat tetes kutu pada badan hewan, rutin membersihkan telinga hewan, memberikan obat tetes telinga untuk hewan', 'Parasit, Otodectes sp.', NULL, '2022-12-18 09:14:33', NULL, NULL),
(17, 'P017', 'Impetigo', 'Memberikan obat antibiotik, untuk anjing tua diberikan obat hormone, memandikan hewan dengan shampoo abti bakteri chlorhexidine atau H2O2, mengoleskan salap antibiotik di area luka, memanajemen dan memperhatikan kebersihan hewan', 'Bekteri pada anjing kecil, Hormon pada anjing tua', NULL, '2022-12-18 09:14:33', NULL, NULL),
(18, 'P018', 'Kista Sebaceous', 'Memberikan obat anti radang pada hewan, menemui dokter hewan untuk melakukan operasi', 'Tumor (sebagian besar jinak) atau Pembentukan Sel Secara Abnormal', NULL, '2022-12-18 09:14:33', NULL, NULL),
(19, 'P019', 'Pyoderma', 'Memberikan obat minum antibiotik untuk hewan, memandikan hewan dengan antibiotik dan anti gatal, mengoleskan salap atau spray anti bakteri pada hewan', 'Bakteri', NULL, '2022-12-18 09:14:33', NULL, NULL),
(20, 'P020', 'Malassezia Dermatitis', 'Memberikan antibiotik kulit pada hewan, memberikan vitamin kulit, memandikan hewan dengan anti jamur, memberikan obat spray atau salap anti jamur/ anti fungau', 'Malassezia sp', NULL, '2022-12-18 09:14:33', NULL, NULL),
(21, 'P021', 'Papiloma Virus', 'Memberikan antibiotik pada hewan, memberikan vitamin imun khusus hewan', 'Virus Papiloma, Penularan dari hewan anjing lain', NULL, '2022-12-18 09:14:33', NULL, NULL),
(22, 'P022', 'Otitis Eksterna', 'Memberikan obat tetes telinga pada hewan, memberikan obat minum antibiotik, memberikan anti inflamasi untuk hewan', 'Bakteri, Jamur, Parasit', NULL, '2022-12-18 09:14:33', NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `histories`
--

CREATE TABLE `histories` (
  `id` int(10) UNSIGNED NOT NULL,
  `code` char(10) NOT NULL,
  `owner` varchar(100) NOT NULL,
  `phone` varchar(15) NOT NULL,
  `address` text NOT NULL,
  `pet_name` varchar(100) NOT NULL,
  `pet_gender` enum('Jantan','Betina','Lainnya') NOT NULL,
  `disease_id` int(10) UNSIGNED DEFAULT NULL,
  `symptoms` longtext CHARACTER SET utf8mb4 COLLATE utf8mb4_bin DEFAULT NULL,
  `created_at` datetime NOT NULL DEFAULT current_timestamp(),
  `updated_at` datetime DEFAULT NULL ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data for table `histories`
--

INSERT INTO `histories` (`id`, `code`, `owner`, `phone`, `address`, `pet_name`, `pet_gender`, `disease_id`, `symptoms`, `created_at`, `updated_at`) VALUES
(1, '1336252497', 'Nama Pemilik', '0000000', 'Jalan', 'Nama Hewan', 'Betina', NULL, 'null', '2022-12-29 13:45:18', NULL),
(2, '244594583', 'Nama Pemilik', '000000', 'ALamat', 'Nama Peliharaan', 'Jantan', 7, '[\"20\",\"19\",\"18\",\"24\",\"39\"]', '2022-12-29 13:50:12', NULL),
(3, '1638691848', 'Nama Pemilik', '0000000000', 'Alamat', 'Nama Hewan', 'Jantan', 3, '[\"25\",\"27\",\"26\"]', '2022-12-29 15:15:57', NULL),
(4, '1454666429', 'Fulan', '0000000000000', 'Alamatnya Fulan', 'Fulan', 'Jantan', 3, '[\"25\",\"27\",\"26\"]', '2023-01-04 14:37:20', NULL),
(5, '1198253915', 'Fulan Bin Fulan', '000000000000', 'Alamat sifulan', 'Fulan Binti Fulan', 'Betina', 15, '[\"35\",\"38\",\"50\",\"51\",\"61\",\"62\"]', '2023-01-05 13:14:27', NULL),
(6, '186738572', 'asuuu', '081271111000', 'jl jalan', 'asu aja', 'Jantan', 9, '[\"1\",\"2\",\"25\",\"21\",\"11\",\"40\",\"54\"]', '2023-06-05 22:46:07', NULL),
(7, '316155667', 'Cindy', '087881183999', 'Jembatan Besi', 'Snoopy', 'Jantan', NULL, 'null', '2023-08-28 23:51:34', NULL),
(8, '1964865855', 'Aisyah', '085890836201', 'Marunda Baru', 'Delu', 'Betina', NULL, 'null', '2023-09-01 11:06:57', NULL),
(9, '313866063', 'Aisyah', '085890836201', 'Marunda Baru', 'Olat', 'Jantan', NULL, 'null', '2023-09-01 11:07:37', NULL),
(10, '12059866', 'Aisyah', '085890836201', 'Marunda Baru', 'Olat', 'Jantan', NULL, 'null', '2023-09-01 11:08:13', NULL),
(11, '332167347', 'Fulan', '0000', 'Jalan', 'Fipan', 'Jantan', NULL, 'null', '2023-11-25 13:34:54', NULL),
(12, '1348905238', '12', '2134', '12', '12', 'Jantan', 3, '[\"25\",\"27\",\"26\"]', '2023-12-12 14:08:22', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `rules`
--

CREATE TABLE `rules` (
  `id` int(10) UNSIGNED NOT NULL,
  `disease_id` int(10) UNSIGNED NOT NULL,
  `symptom_id` int(10) UNSIGNED NOT NULL,
  `created_at` datetime NOT NULL DEFAULT current_timestamp(),
  `updated_at` datetime DEFAULT NULL ON UPDATE current_timestamp(),
  `deleted_at` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data for table `rules`
--

INSERT INTO `rules` (`id`, `disease_id`, `symptom_id`, `created_at`, `updated_at`, `deleted_at`) VALUES
(1, 1, 1, '2022-12-18 09:16:27', '2022-12-18 13:51:20', '2022-12-18 13:51:20'),
(2, 1, 2, '2022-12-18 09:16:27', '2022-12-18 13:51:22', '2022-12-18 13:51:22'),
(3, 1, 3, '2022-12-18 09:16:27', '2022-12-18 13:51:22', '2022-12-18 13:51:22'),
(4, 1, 4, '2022-12-18 09:16:27', '2022-12-18 13:51:23', '2022-12-18 13:51:23'),
(5, 1, 5, '2022-12-18 09:16:27', '2022-12-18 13:51:25', '2022-12-18 13:51:25'),
(6, 1, 6, '2022-12-18 09:16:27', '2022-12-18 13:51:26', '2022-12-18 13:51:26'),
(7, 1, 7, '2022-12-18 09:16:27', '2022-12-18 13:51:27', '2022-12-18 13:51:27'),
(8, 2, 1, '2022-12-18 09:19:04', NULL, NULL),
(9, 2, 2, '2022-12-18 09:19:04', NULL, NULL),
(10, 2, 3, '2022-12-18 09:19:04', NULL, NULL),
(11, 2, 5, '2022-12-18 09:19:04', NULL, NULL),
(12, 2, 6, '2022-12-18 09:19:04', NULL, NULL),
(13, 2, 7, '2022-12-18 09:19:04', NULL, NULL),
(14, 2, 8, '2022-12-18 09:19:04', NULL, NULL),
(15, 2, 9, '2022-12-18 09:19:04', NULL, NULL),
(16, 3, 25, '2022-12-18 09:19:30', NULL, NULL),
(17, 3, 26, '2022-12-18 09:19:30', NULL, NULL),
(18, 3, 27, '2022-12-18 09:19:30', NULL, NULL),
(19, 4, 2, '2022-12-18 09:20:06', '2022-12-18 20:37:26', NULL),
(20, 4, 5, '2022-12-18 09:20:06', '2022-12-18 20:37:29', NULL),
(21, 4, 6, '2022-12-18 09:20:06', '2022-12-18 20:37:31', NULL),
(22, 4, 7, '2022-12-18 09:20:06', '2022-12-18 20:37:33', NULL),
(23, 4, 10, '2022-12-18 09:20:06', '2022-12-18 20:37:35', NULL),
(24, 4, 11, '2022-12-18 09:20:06', '2022-12-18 20:37:37', NULL),
(25, 4, 55, '2022-12-18 09:20:06', '2022-12-18 20:37:39', NULL),
(26, 5, 2, '2022-12-18 20:38:32', NULL, NULL),
(27, 5, 5, '2022-12-18 20:38:32', NULL, NULL),
(28, 5, 6, '2022-12-18 20:38:32', NULL, NULL),
(29, 5, 7, '2022-12-18 20:38:32', NULL, NULL),
(30, 5, 11, '2022-12-18 20:38:32', NULL, NULL),
(31, 5, 12, '2022-12-18 20:38:32', NULL, NULL),
(32, 5, 13, '2022-12-18 20:38:32', NULL, NULL),
(33, 6, 14, '2022-12-18 20:39:26', NULL, NULL),
(34, 6, 15, '2022-12-18 20:39:26', NULL, NULL),
(35, 6, 16, '2022-12-18 20:39:26', NULL, NULL),
(36, 6, 17, '2022-12-18 20:39:26', NULL, NULL),
(37, 6, 56, '2022-12-18 20:39:26', NULL, NULL),
(38, 7, 18, '2022-12-18 20:40:42', NULL, NULL),
(39, 7, 19, '2022-12-18 20:40:42', NULL, NULL),
(40, 7, 20, '2022-12-18 20:40:42', NULL, NULL),
(41, 7, 24, '2022-12-18 20:40:42', NULL, NULL),
(42, 7, 39, '2022-12-18 20:40:42', NULL, NULL),
(43, 8, 1, '2022-12-18 20:41:28', NULL, NULL),
(44, 8, 2, '2022-12-18 20:41:28', NULL, NULL),
(45, 8, 11, '2022-12-18 20:41:28', NULL, NULL),
(46, 8, 21, '2022-12-18 20:41:28', NULL, NULL),
(47, 8, 22, '2022-12-18 20:41:28', NULL, NULL),
(48, 8, 23, '2022-12-18 20:41:28', NULL, NULL),
(49, 8, 25, '2022-12-18 20:41:28', NULL, NULL),
(50, 9, 1, '2022-12-18 20:42:23', NULL, NULL),
(51, 9, 11, '2022-12-18 20:42:23', NULL, NULL),
(52, 9, 21, '2022-12-18 20:42:23', NULL, NULL),
(53, 9, 25, '2022-12-18 20:42:23', NULL, NULL),
(54, 9, 40, '2022-12-18 20:42:23', NULL, NULL),
(55, 9, 54, '2022-12-18 20:42:23', NULL, NULL),
(56, 10, 2, '2022-12-18 20:43:15', NULL, NULL),
(57, 10, 11, '2022-12-18 20:43:15', NULL, NULL),
(58, 10, 21, '2022-12-18 20:43:15', NULL, NULL),
(59, 10, 22, '2022-12-18 20:43:15', NULL, NULL),
(60, 10, 23, '2022-12-18 20:43:15', NULL, NULL),
(61, 10, 25, '2022-12-18 20:43:15', NULL, NULL),
(62, 10, 46, '2022-12-18 20:43:15', NULL, NULL),
(63, 10, 58, '2022-12-18 20:43:15', NULL, NULL),
(64, 10, 59, '2022-12-18 20:43:15', NULL, NULL),
(65, 11, 1, '2022-12-18 20:43:47', NULL, NULL),
(66, 11, 2, '2022-12-18 20:43:47', NULL, NULL),
(67, 11, 25, '2022-12-18 20:43:47', NULL, NULL),
(68, 11, 28, '2022-12-18 20:43:47', NULL, NULL),
(69, 12, 1, '2022-12-18 20:44:25', NULL, NULL),
(70, 12, 2, '2022-12-18 20:44:25', NULL, NULL),
(71, 12, 25, '2022-12-18 20:44:25', NULL, NULL),
(72, 12, 29, '2022-12-18 20:44:25', NULL, NULL),
(73, 12, 30, '2022-12-18 20:44:25', NULL, NULL),
(74, 13, 2, '2022-12-18 20:49:49', NULL, NULL),
(75, 13, 1, '2022-12-18 20:49:49', NULL, NULL),
(76, 13, 31, '2022-12-18 20:49:49', NULL, NULL),
(77, 13, 5, '2022-12-18 20:49:49', NULL, NULL),
(78, 13, 6, '2022-12-18 20:49:49', NULL, NULL),
(79, 13, 7, '2022-12-18 20:49:49', NULL, NULL),
(80, 1, 7, '2022-12-18 20:52:11', NULL, NULL),
(81, 1, 6, '2022-12-18 20:52:11', NULL, NULL),
(82, 1, 5, '2022-12-18 20:52:11', NULL, NULL),
(83, 1, 1, '2022-12-18 20:52:11', NULL, NULL),
(84, 1, 4, '2022-12-18 20:52:11', NULL, NULL),
(85, 1, 3, '2022-12-18 20:52:11', NULL, NULL),
(86, 1, 2, '2022-12-18 20:52:11', NULL, NULL),
(87, 1, 8, '2022-12-20 20:19:09', '2022-12-20 13:19:11', '2022-12-20 13:19:11'),
(88, 1, 8, '2022-12-20 20:20:39', '2022-12-20 13:20:41', '2022-12-20 13:20:41');

-- --------------------------------------------------------

--
-- Table structure for table `rule_flows`
--

CREATE TABLE `rule_flows` (
  `id` int(10) UNSIGNED NOT NULL,
  `parent_id` int(10) UNSIGNED DEFAULT NULL,
  `symptom_id` int(10) UNSIGNED NOT NULL,
  `yes` int(10) UNSIGNED DEFAULT NULL,
  `no` int(10) UNSIGNED DEFAULT NULL,
  `disease_id` int(10) UNSIGNED DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data for table `rule_flows`
--

INSERT INTO `rule_flows` (`id`, `parent_id`, `symptom_id`, `yes`, `no`, `disease_id`) VALUES
(1, NULL, 1, 2, 35, NULL),
(2, 1, 2, 5, 33, NULL),
(3, 2, 5, 7, 25, NULL),
(4, 3, 7, 6, NULL, NULL),
(5, 4, 6, 3, NULL, NULL),
(6, 5, 3, 4, 31, NULL),
(7, 6, 4, NULL, 8, 1),
(8, 7, 8, 9, NULL, NULL),
(9, 8, 9, NULL, NULL, 2),
(10, 6, 31, NULL, 47, 13),
(11, 10, 47, 25, NULL, NULL),
(12, 11, 25, NULL, NULL, 20),
(13, 3, 25, 21, NULL, NULL),
(14, 13, 21, 11, 28, NULL),
(15, 14, 11, 23, NULL, NULL),
(16, 15, 23, 22, 40, NULL),
(17, 16, 22, NULL, NULL, 8),
(18, 16, 40, 54, NULL, NULL),
(19, 18, 54, NULL, NULL, 9),
(20, 14, 28, NULL, 29, 11),
(21, 20, 29, 30, NULL, NULL),
(22, 21, 30, NULL, NULL, 12),
(23, 2, 33, 7, NULL, NULL),
(24, 23, 7, 5, NULL, NULL),
(25, 24, 5, 6, NULL, NULL),
(26, 25, 6, 25, NULL, NULL),
(27, 26, 25, 8, 13, NULL),
(28, 27, 8, 37, 60, NULL),
(29, 28, 37, 11, NULL, NULL),
(30, 29, 11, 43, NULL, NULL),
(31, 30, 43, NULL, NULL, 19),
(32, 28, 60, NULL, NULL, 15),
(33, 27, 13, 17, NULL, NULL),
(34, 33, 17, 4, NULL, NULL),
(35, 34, 4, 32, NULL, NULL),
(36, 35, 32, 34, NULL, NULL),
(37, 36, 34, NULL, NULL, 14),
(38, 1, 35, 38, 25, NULL),
(39, 38, 38, 50, 36, NULL),
(40, 39, 50, 51, NULL, NULL),
(41, 40, 51, 61, NULL, NULL),
(42, 41, 61, 62, NULL, NULL),
(43, 42, 62, NULL, NULL, 15),
(44, 39, 36, 52, NULL, NULL),
(45, 44, 52, 53, NULL, NULL),
(46, 45, 53, NULL, NULL, 22),
(47, 38, 25, 27, 17, NULL),
(48, 47, 27, 26, NULL, NULL),
(49, 48, 26, NULL, NULL, 3),
(50, 47, 17, 15, 20, NULL),
(51, 50, 15, 14, NULL, NULL),
(52, 51, 14, 16, NULL, NULL),
(53, 52, 16, 56, NULL, NULL),
(54, 53, 56, NULL, NULL, 6),
(55, 50, 20, 19, 11, NULL),
(56, 55, 19, 18, 42, NULL),
(57, 56, 18, 24, NULL, NULL),
(58, 57, 24, 39, NULL, NULL),
(59, 58, 39, NULL, NULL, 7),
(60, 56, 42, 44, NULL, NULL),
(61, 60, 44, NULL, NULL, 18),
(62, 55, 11, 2, 41, NULL),
(63, 62, 2, 7, NULL, NULL),
(64, 63, 7, 5, 46, NULL),
(65, 64, 5, 6, NULL, NULL),
(66, 65, 6, 10, NULL, NULL),
(67, 66, 10, 55, 12, NULL),
(68, 67, 55, NULL, NULL, 4),
(69, 67, 12, 13, NULL, NULL),
(70, 69, 13, NULL, NULL, 5),
(71, 64, 46, 21, NULL, NULL),
(72, 71, 21, 22, NULL, NULL),
(73, 72, 22, 23, NULL, NULL),
(74, 73, 23, 25, NULL, NULL),
(75, 74, 25, 28, NULL, NULL),
(76, 75, 58, 59, NULL, NULL),
(77, 76, 59, NULL, NULL, 10),
(78, 62, 41, 45, 48, NULL),
(79, 78, 45, 37, NULL, NULL),
(80, 79, 37, 57, NULL, NULL),
(81, 80, 57, NULL, NULL, 17),
(82, 78, 48, 49, NULL, NULL),
(83, 82, 49, 33, NULL, NULL),
(84, 83, 33, 47, NULL, NULL),
(85, 84, 47, NULL, NULL, 21);

-- --------------------------------------------------------

--
-- Table structure for table `settings`
--

CREATE TABLE `settings` (
  `id` int(10) UNSIGNED NOT NULL,
  `name` varchar(100) NOT NULL,
  `email` varchar(100) NOT NULL,
  `phone` char(15) NOT NULL,
  `address` text NOT NULL,
  `address_link` text DEFAULT NULL,
  `seo_tag` text DEFAULT NULL,
  `seo_description` text DEFAULT NULL,
  `ig_name` varchar(100) DEFAULT NULL,
  `ig_link` text DEFAULT NULL,
  `fb_name` varchar(100) DEFAULT NULL,
  `fb_link` text DEFAULT NULL,
  `text_home` text DEFAULT NULL,
  `text_profile` text NOT NULL,
  `icon` text DEFAULT NULL,
  `logo` text DEFAULT NULL,
  `created_at` datetime NOT NULL DEFAULT current_timestamp(),
  `updated_at` datetime NOT NULL DEFAULT '0000-00-00 00:00:00' ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data for table `settings`
--

INSERT INTO `settings` (`id`, `name`, `email`, `phone`, `address`, `address_link`, `seo_tag`, `seo_description`, `ig_name`, `ig_link`, `fb_name`, `fb_link`, `text_home`, `text_profile`, `icon`, `logo`, `created_at`, `updated_at`) VALUES
(1, 'PETOLOGI - VETERINARY CENTER', 'petologi@gmail.com', '08119152506', 'Jl. RC. Veteran Raya No.12A, RT.11/RW.1, Bintaro, Kec. Pesanggrahan, Kota Jakarta Selatan, Daerah Khusus Ibukota Jakarta 12330, Indonesia', '<iframe src=\"https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3965.9691744521806!2d106.76360041470154!3d-6.26778449546333!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x2e69f106b8bd63e3%3A0xc3bb0eacc755da63!2sPetologi%20Veterinary%20Center!5e0!3m2!1sid!2sid!4v1671625267108!5m2!1sid!2sid\" width=\"100%\" height=\"250\" style=\"border:1;\" allowfullscreen=\"true\" loading=\"lazy\" referrerpolicy=\"no-referrer-when-downgrade\"></iframe>', 'rumah hewan, dokter hewan, spesialis hewan,petology', 'Tempat perawatan hewan terbaik di Jakarta', 'Petologi Vet Center', 'https://instagram.com/petologivetcenter', '', '', 'Selamat Datang Pada Sistem Pakar Penyakit Kulit Pada Hewan Anjing Dengan Menggunakan Metode Fomard Chaining. Sistem ini dikhususkan untuk mendiagnosa penyakit kulit\r\npada hewan anjing. Sistem ini berfungsi sebagai sarana pemberi informasi berdasarkan gejala awal yang terjadi pada hewan anjing. Jika penanganan yang diberikan tidak membantu\r\ndan penyakit kulit yang diderita Oleh anjing tersebut memburuk, sebaiknya menemui dokter hewan.', 'Website ini dapat dipercaya kebenarannya Karena selama pembuatan data-data dan pengetahuan yang terdapat di dalamnya berasal dari sumber-sumber yang jelas yang didapatkan dari dokter-dokter yang hebat, yang bekerja di Petologi Veterinary Center dan tentunya sangat berpengalaman terutama dalam bidang penyakit kulit pada hewan anjing_ Penyakit kulit pada hewan anjing merupakan penyakit yang tidak bisa disepelekan karena dapat beresiko besar terhadap hewan itu sendiri maupun pemiliknya, jika diabaikan terus-menerus pemilik\r\ndapat beresiko tertular dan hewan itu sendiri dapat beresiko meninggal sehingga diperlukan penanganan yang cepat untuk menghindari hal-hal tersebut.', '/uploads/icon.jpg', '/uploads/63a31bc92c2fd-22-12-21-logo.webp', '2022-12-21 19:23:44', '2022-12-29 21:11:37');

-- --------------------------------------------------------

--
-- Table structure for table `suggestion`
--

CREATE TABLE `suggestion` (
  `id` int(10) UNSIGNED NOT NULL,
  `name` varchar(100) NOT NULL,
  `email` varchar(100) NOT NULL,
  `phone` varchar(15) NOT NULL,
  `message` text NOT NULL,
  `created_at` datetime NOT NULL DEFAULT current_timestamp(),
  `updated_at` datetime DEFAULT NULL ON UPDATE current_timestamp(),
  `deleted_at` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data for table `suggestion`
--

INSERT INTO `suggestion` (`id`, `name`, `email`, `phone`, `message`, `created_at`, `updated_at`, `deleted_at`) VALUES
(1, 'Luthfi Ihdalhusnayain', 'luthfi.ihdalhusnayain@gmail.com', '0895322316585', 'Isi pesan nya ', '2022-12-29 15:19:37', NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `symptoms`
--

CREATE TABLE `symptoms` (
  `id` int(10) UNSIGNED NOT NULL,
  `code` char(5) NOT NULL,
  `name` varchar(100) NOT NULL,
  `question` text DEFAULT NULL,
  `image` text DEFAULT NULL,
  `created_at` datetime NOT NULL DEFAULT current_timestamp(),
  `updated_at` datetime DEFAULT NULL ON UPDATE current_timestamp(),
  `deleted_at` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data for table `symptoms`
--

INSERT INTO `symptoms` (`id`, `code`, `name`, `question`, `image`, `created_at`, `updated_at`, `deleted_at`) VALUES
(1, 'G001', 'Kulit Hewan Gatal', 'Apakah hewan anda sering menggaruk?', NULL, '2022-12-18 09:09:15', '2022-12-19 11:26:34', NULL),
(2, 'G002', 'Kulit Hewan Memerah', 'Apakah kulit hewwan anda memerah?', NULL, '2022-12-18 09:09:15', '2022-12-19 11:26:54', NULL),
(3, 'G003', 'Kulit Hewan Berkerut', 'Apakah kulit hewan anda berkerut?', NULL, '2022-12-18 09:09:15', '2022-12-19 11:27:15', NULL),
(4, 'G004', 'Kulit Hewan Mengeluarkan Bau', 'Apakah kulit hewan anda mengeluarkan bau?', NULL, '2022-12-18 09:09:15', '2022-12-19 11:27:51', NULL),
(5, 'G005', 'Hewan menggaruk bagian kulit tertentu terus-menerus', NULL, NULL, '2022-12-18 09:09:15', NULL, NULL),
(6, 'G006', 'Hewan menggigit bagian kulit tertentu terus-menerus', NULL, NULL, '2022-12-18 09:09:15', NULL, NULL),
(7, 'G007', 'Hewan menjilati bagian kulit tertentu terus-menerus', NULL, NULL, '2022-12-18 09:09:15', NULL, NULL),
(8, 'G008', 'Kulit Tertentu Berkerak', NULL, NULL, '2022-12-18 09:09:15', NULL, NULL),
(9, 'G009', 'Kulit Hewan Menebal', NULL, NULL, '2022-12-18 09:09:15', NULL, NULL),
(10, 'G010', 'Kulit Hewan Lembab', NULL, NULL, '2022-12-18 09:09:15', NULL, NULL),
(11, 'G011', 'Rambut Hewan Rontok', NULL, NULL, '2022-12-18 09:09:15', NULL, NULL),
(12, 'G012', 'Kulit Hewan Lembek', NULL, NULL, '2022-12-18 09:09:15', NULL, NULL),
(13, 'G013', 'Kulit Hewan Basah', NULL, NULL, '2022-12-18 09:09:15', NULL, NULL),
(14, 'G014', 'Infeksi di bawah kulit', NULL, NULL, '2022-12-18 09:09:15', NULL, NULL),
(15, 'G015', 'Kulit Hewan membengkak berisi cairan nanah', NULL, NULL, '2022-12-18 09:09:15', NULL, NULL),
(16, 'G016', 'Kulit yang membengkak terasa hangat saat disentuh', NULL, NULL, '2022-12-18 09:09:15', NULL, NULL),
(17, 'G017', 'Demam', NULL, NULL, '2022-12-18 09:09:15', NULL, NULL),
(18, 'G018', 'Kulit terdapat benjolan keras', NULL, NULL, '2022-12-18 09:09:15', NULL, NULL),
(19, 'G019', 'Hewan kesulitan bergerak karena benjolan', NULL, NULL, '2022-12-18 09:09:15', NULL, NULL),
(20, 'G020', 'Terdapat benjolan di 1 area atau lebih', NULL, NULL, '2022-12-18 09:09:15', NULL, NULL),
(21, 'G021', 'Hewan kesulitan bernafas', NULL, NULL, '2022-12-18 09:09:15', NULL, NULL),
(22, 'G022', 'Hewan batuk', NULL, NULL, '2022-12-18 09:09:15', NULL, NULL),
(23, 'G023', 'Hewan bersin', NULL, NULL, '2022-12-18 09:09:15', NULL, NULL),
(24, 'G024', 'Nafsu makan berkurang', NULL, NULL, '2022-12-18 09:09:15', NULL, NULL),
(25, 'G025', 'Hewan mengalami kebotakan', NULL, NULL, '2022-12-18 09:09:15', NULL, NULL),
(26, 'G026', 'Hewan mengalami kebotakan di 2 sisi yang sama/kembar', NULL, NULL, '2022-12-18 09:09:15', NULL, NULL),
(27, 'G027', 'Hewan memiliki berat badan berlebih', NULL, NULL, '2022-12-18 09:09:15', NULL, NULL),
(28, 'G028', 'Bibir hewan memerah karena sariawan', NULL, NULL, '2022-12-18 09:09:15', NULL, NULL),
(29, 'G029', 'Hewan mengalami kebotakan berbentuk lingkaran di area tertentu', NULL, NULL, '2022-12-18 09:09:15', NULL, NULL),
(30, 'G030', 'Area pinggiran pada luka hewan menebal', NULL, NULL, '2022-12-18 09:09:15', NULL, NULL),
(31, 'G031', 'Terdapat kutu di rambut hewan', NULL, NULL, '2022-12-18 09:09:15', NULL, NULL),
(32, 'G032', 'Hewan terlihat lemas', NULL, NULL, '2022-12-18 09:09:15', NULL, NULL),
(33, 'G033', 'Bagian dalam kulit hewan terlihat', NULL, NULL, '2022-12-18 09:09:15', NULL, NULL),
(34, 'G034', 'Kulit bengkak berisi pasir halus', NULL, NULL, '2022-12-18 09:09:15', NULL, NULL),
(35, 'G035', 'Kotoran telinga banyak', NULL, NULL, '2022-12-18 09:09:15', NULL, NULL),
(36, 'G036', 'Kotoran telinga selalu basah', NULL, NULL, '2022-12-18 09:09:15', NULL, NULL),
(37, 'G037', 'Kulit memiliki banyak bintik merah', NULL, NULL, '2022-12-18 09:09:15', NULL, NULL),
(38, 'G038', 'Telinga hewan gatal', NULL, NULL, '2022-12-18 09:09:15', NULL, NULL),
(39, 'G039', 'Hewan terlihat kelelahan', NULL, NULL, '2022-12-18 09:09:15', NULL, NULL),
(40, 'G040', 'Hewan menjadi sering menjilati kaki', NULL, NULL, '2022-12-18 09:09:15', NULL, NULL),
(41, 'G041', 'Terdapat beberapa benjolan kecil di area yang tidak memiliki terlalu banyak rambut', NULL, NULL, '2022-12-18 09:09:15', NULL, NULL),
(42, 'G042', 'Kulit memiliki benjolan pada area tubuh luar', NULL, NULL, '2022-12-18 09:09:15', NULL, NULL),
(43, 'G043', 'Kulit kemerahan hanya pada area kulit yang berlipat', NULL, NULL, '2022-12-18 09:09:15', NULL, NULL),
(44, 'G044', 'Benjolan terus membesar tetapi perkembangannya lama', NULL, NULL, '2022-12-18 09:09:15', NULL, NULL),
(45, 'G045', 'Terdapat beberapa benjolan kecil', NULL, NULL, '2022-12-18 09:09:15', NULL, NULL),
(46, 'G046', 'Rambut kusam', NULL, NULL, '2022-12-18 09:09:15', NULL, NULL),
(47, 'G047', 'Kulit terdapat ketombe hanya pada area luka', NULL, NULL, '2022-12-18 09:09:15', NULL, NULL),
(48, 'G048', 'Luka terdapat di area mulut', NULL, NULL, '2022-12-18 09:09:15', NULL, NULL),
(49, 'G049', 'Hewan menjilati area mulut terus-menerus', NULL, NULL, '2022-12-18 09:09:15', NULL, NULL),
(50, 'G050', 'Kotoran telinga terkadang kering dan terkadang basah', NULL, NULL, '2022-12-18 09:09:15', NULL, NULL),
(51, 'G051', 'Hewan sering menggaruk telinga', NULL, NULL, '2022-12-18 09:09:15', NULL, NULL),
(52, 'G052', 'Kotoran telinga mengeluarkan bau', NULL, NULL, '2022-12-18 09:09:15', NULL, NULL),
(53, 'G053', 'Bagian luar telinga memerah', NULL, NULL, '2022-12-18 09:09:15', NULL, NULL),
(54, 'G054', 'Terdapat radang pada gusi', NULL, NULL, '2022-12-18 09:09:15', NULL, NULL),
(55, 'G055', 'Kulit berketombe', NULL, NULL, '2022-12-18 09:09:15', NULL, NULL),
(56, 'G056', 'Kulit tertentu membengkak', NULL, NULL, '2022-12-18 09:09:15', NULL, NULL),
(57, 'G057', 'Benjolan kecil terdapat di lapisan paling atas kulit', NULL, NULL, '2022-12-18 09:09:15', NULL, NULL),
(58, 'G058', 'Rambut Kasar', NULL, NULL, '2022-12-18 09:09:15', NULL, NULL),
(59, 'G059', 'Kulit radang', NULL, NULL, '2022-12-18 09:09:15', NULL, NULL),
(60, 'G060', 'Bagian luka menghitam', NULL, NULL, '2022-12-18 09:09:15', NULL, NULL),
(61, 'G061', 'Kotoran telinga cepat terbentuk', NULL, NULL, '2022-12-18 09:09:15', NULL, NULL),
(62, 'G062', 'Kotoran telinga berwarna hitam', NULL, NULL, '2022-12-18 09:09:15', NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(10) UNSIGNED NOT NULL,
  `fullname` varchar(100) NOT NULL,
  `username` varchar(25) NOT NULL,
  `password` varchar(60) NOT NULL,
  `avatar` varchar(128) DEFAULT NULL,
  `status` enum('Aktif','Tidak Aktif') NOT NULL DEFAULT 'Aktif',
  `created_at` datetime NOT NULL DEFAULT current_timestamp(),
  `updated_at` datetime DEFAULT NULL ON UPDATE current_timestamp(),
  `deleted_at` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `fullname`, `username`, `password`, `avatar`, `status`, `created_at`, `updated_at`, `deleted_at`) VALUES
(1, 'Administrator Pusat', 'admin', '$2y$10$u9u1LbI0NkddiTqWzvDdXuGQSMiG9Sf2eKp8Bn.L5PvrUQm0exDMm', NULL, 'Aktif', '2022-12-17 23:33:27', '2022-12-23 15:15:57', NULL);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `diseases`
--
ALTER TABLE `diseases`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `Unique diseases code` (`code`);

--
-- Indexes for table `histories`
--
ALTER TABLE `histories`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `rules`
--
ALTER TABLE `rules`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `rule_flows`
--
ALTER TABLE `rule_flows`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `settings`
--
ALTER TABLE `settings`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `suggestion`
--
ALTER TABLE `suggestion`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `symptoms`
--
ALTER TABLE `symptoms`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `Unique symptoms code` (`code`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `username unique` (`username`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `diseases`
--
ALTER TABLE `diseases`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=23;

--
-- AUTO_INCREMENT for table `histories`
--
ALTER TABLE `histories`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT for table `rules`
--
ALTER TABLE `rules`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=89;

--
-- AUTO_INCREMENT for table `rule_flows`
--
ALTER TABLE `rule_flows`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=86;

--
-- AUTO_INCREMENT for table `settings`
--
ALTER TABLE `settings`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `suggestion`
--
ALTER TABLE `suggestion`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `symptoms`
--
ALTER TABLE `symptoms`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=63;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
