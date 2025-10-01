-- phpMyAdmin SQL Dump
-- version 5.2.2
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3306
-- Generation Time: Oct 01, 2025 at 08:12 AM
-- Server version: 8.0.30
-- PHP Version: 8.1.10

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `rpl`
--

-- --------------------------------------------------------

--
-- Table structure for table `asesors`
--

CREATE TABLE `asesors` (
  `id` bigint UNSIGNED NOT NULL,
  `kode_asesor` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `nama` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `no_hp` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `password` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `prodis_id` bigint UNSIGNED NOT NULL,
  `role` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'asesor',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `cache`
--

CREATE TABLE `cache` (
  `key` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `value` mediumtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `expiration` int NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `cache_locks`
--

CREATE TABLE `cache_locks` (
  `key` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `owner` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `expiration` int NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `cpmks`
--

CREATE TABLE `cpmks` (
  `id` bigint UNSIGNED NOT NULL,
  `kode_cpmk` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `deskripsi` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `makuls_id` bigint UNSIGNED NOT NULL,
  `prodis_id` bigint UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `failed_jobs`
--

CREATE TABLE `failed_jobs` (
  `id` bigint UNSIGNED NOT NULL,
  `uuid` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `connection` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `queue` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `payload` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `exception` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `failed_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `hak_akses`
--

CREATE TABLE `hak_akses` (
  `id` bigint UNSIGNED NOT NULL,
  `role_id` bigint UNSIGNED NOT NULL,
  `menu_id` bigint UNSIGNED NOT NULL,
  `can_view` tinyint(1) NOT NULL DEFAULT '0',
  `can_create` tinyint(1) NOT NULL DEFAULT '0',
  `can_edit` tinyint(1) NOT NULL DEFAULT '0',
  `can_delete` tinyint(1) NOT NULL DEFAULT '0',
  `status` enum('aktif','nonaktif') COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'aktif',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `hak_akses`
--

INSERT INTO `hak_akses` (`id`, `role_id`, `menu_id`, `can_view`, `can_create`, `can_edit`, `can_delete`, `status`, `created_at`, `updated_at`) VALUES
(1, 1, 3, 0, 0, 0, 0, 'aktif', '2025-09-11 05:19:40', '2025-09-11 05:19:40'),
(2, 1, 4, 0, 0, 0, 0, 'aktif', '2025-09-11 05:19:40', '2025-09-11 05:19:40'),
(3, 1, 5, 0, 0, 0, 0, 'aktif', '2025-09-11 05:19:40', '2025-09-11 05:19:40'),
(4, 1, 6, 0, 0, 0, 0, 'aktif', '2025-09-11 05:19:40', '2025-09-11 05:19:40'),
(5, 1, 7, 0, 0, 0, 0, 'aktif', '2025-09-11 05:19:40', '2025-09-11 05:19:40'),
(6, 1, 8, 0, 0, 0, 0, 'aktif', '2025-09-11 05:19:40', '2025-09-11 05:19:40'),
(7, 1, 9, 0, 0, 0, 0, 'aktif', '2025-09-11 05:19:40', '2025-09-11 05:19:40'),
(8, 1, 10, 0, 0, 0, 0, 'aktif', '2025-09-11 05:19:40', '2025-09-11 05:19:40'),
(9, 1, 11, 0, 0, 0, 0, 'aktif', '2025-09-11 05:19:40', '2025-09-11 05:19:40'),
(10, 1, 12, 0, 0, 0, 0, 'aktif', '2025-09-11 05:19:40', '2025-09-11 05:19:40'),
(17, 1, 19, 0, 0, 0, 0, 'aktif', '2025-09-11 05:19:40', '2025-09-11 05:19:40'),
(18, 1, 20, 0, 0, 0, 0, 'aktif', '2025-09-11 05:19:40', '2025-09-11 05:19:40'),
(19, 1, 21, 0, 0, 0, 0, 'aktif', '2025-09-11 05:19:40', '2025-09-11 05:19:40'),
(20, 1, 22, 0, 0, 0, 0, 'aktif', '2025-09-11 05:19:40', '2025-09-11 05:19:40'),
(21, 1, 23, 0, 0, 0, 0, 'aktif', '2025-09-11 05:19:40', '2025-09-11 05:19:40'),
(22, 1, 24, 0, 0, 0, 0, 'aktif', '2025-09-11 05:19:40', '2025-09-11 05:19:40'),
(23, 1, 25, 0, 0, 0, 0, 'aktif', '2025-09-11 05:19:40', '2025-09-11 05:19:40'),
(24, 1, 26, 0, 0, 0, 0, 'aktif', '2025-09-11 05:19:40', '2025-09-11 05:19:40'),
(25, 1, 28, 0, 0, 0, 0, 'aktif', '2025-09-11 05:19:40', '2025-09-11 05:19:40'),
(26, 1, 29, 0, 0, 0, 0, 'aktif', '2025-09-11 05:19:40', '2025-09-11 05:19:40'),
(27, 1, 30, 0, 0, 0, 0, 'aktif', '2025-09-11 05:19:40', '2025-09-11 05:19:40'),
(28, 1, 31, 0, 0, 0, 0, 'aktif', '2025-09-11 05:19:40', '2025-09-11 05:19:40'),
(30, 1, 33, 0, 0, 0, 0, 'aktif', '2025-09-11 05:19:40', '2025-09-11 05:19:40'),
(31, 2, 3, 0, 0, 0, 0, 'aktif', '2025-09-11 05:19:40', '2025-09-11 05:19:40'),
(32, 2, 4, 0, 0, 0, 0, 'aktif', '2025-09-11 05:19:40', '2025-09-11 05:19:40'),
(33, 2, 5, 0, 0, 0, 0, 'aktif', '2025-09-11 05:19:40', '2025-09-11 05:19:40'),
(34, 2, 6, 0, 0, 0, 0, 'aktif', '2025-09-11 05:19:40', '2025-09-11 05:19:40'),
(35, 2, 7, 0, 0, 0, 0, 'aktif', '2025-09-11 05:19:40', '2025-09-11 05:19:40'),
(36, 2, 8, 0, 0, 0, 0, 'aktif', '2025-09-11 05:19:40', '2025-09-11 05:19:40'),
(37, 2, 9, 0, 0, 0, 0, 'aktif', '2025-09-11 05:19:40', '2025-09-11 05:19:40'),
(38, 2, 10, 0, 0, 0, 0, 'aktif', '2025-09-11 05:19:40', '2025-09-11 05:19:40'),
(39, 2, 11, 0, 0, 0, 0, 'aktif', '2025-09-11 05:19:40', '2025-09-11 05:19:40'),
(40, 2, 12, 0, 0, 0, 0, 'aktif', '2025-09-11 05:19:40', '2025-09-11 05:19:40'),
(47, 2, 19, 0, 0, 0, 0, 'aktif', '2025-09-11 05:19:40', '2025-09-11 05:19:40'),
(48, 2, 20, 0, 0, 0, 0, 'aktif', '2025-09-11 05:19:40', '2025-09-11 05:19:40'),
(49, 2, 21, 0, 0, 0, 0, 'aktif', '2025-09-11 05:19:40', '2025-09-11 05:19:40'),
(50, 2, 22, 0, 0, 0, 0, 'aktif', '2025-09-11 05:19:40', '2025-09-11 05:19:40'),
(51, 2, 23, 0, 0, 0, 0, 'aktif', '2025-09-11 05:19:40', '2025-09-11 05:19:40'),
(52, 2, 24, 0, 0, 0, 0, 'aktif', '2025-09-11 05:19:40', '2025-09-11 05:19:40'),
(53, 2, 25, 0, 0, 0, 0, 'aktif', '2025-09-11 05:19:40', '2025-09-11 05:19:40'),
(54, 2, 26, 0, 0, 0, 0, 'aktif', '2025-09-11 05:19:40', '2025-09-11 05:19:40'),
(55, 2, 28, 0, 0, 0, 0, 'aktif', '2025-09-11 05:19:40', '2025-09-11 05:19:40'),
(56, 2, 29, 0, 0, 0, 0, 'aktif', '2025-09-11 05:19:40', '2025-09-11 05:19:40'),
(57, 2, 30, 0, 0, 0, 0, 'aktif', '2025-09-11 05:19:40', '2025-09-11 05:19:40'),
(58, 2, 31, 0, 0, 0, 0, 'aktif', '2025-09-11 05:19:40', '2025-09-11 05:19:40'),
(60, 2, 33, 0, 0, 0, 0, 'aktif', '2025-09-11 05:19:40', '2025-09-11 05:19:40'),
(61, 3, 3, 0, 0, 0, 0, 'aktif', '2025-09-11 05:19:40', '2025-09-11 05:19:40'),
(62, 3, 4, 0, 0, 0, 0, 'aktif', '2025-09-11 05:19:40', '2025-09-11 05:19:40'),
(63, 3, 5, 0, 0, 0, 0, 'aktif', '2025-09-11 05:19:40', '2025-09-11 05:19:40'),
(64, 3, 6, 0, 0, 0, 0, 'aktif', '2025-09-11 05:19:40', '2025-09-11 05:19:40'),
(65, 3, 7, 0, 0, 0, 0, 'aktif', '2025-09-11 05:19:40', '2025-09-11 05:19:40'),
(66, 3, 8, 0, 0, 0, 0, 'aktif', '2025-09-11 05:19:40', '2025-09-11 05:19:40'),
(67, 3, 9, 0, 0, 0, 0, 'aktif', '2025-09-11 05:19:40', '2025-09-11 05:19:40'),
(68, 3, 10, 0, 0, 0, 0, 'aktif', '2025-09-11 05:19:40', '2025-09-11 05:19:40'),
(69, 3, 11, 0, 0, 0, 0, 'aktif', '2025-09-11 05:19:40', '2025-09-11 05:19:40'),
(70, 3, 12, 0, 0, 0, 0, 'aktif', '2025-09-11 05:19:40', '2025-09-11 05:19:40'),
(77, 3, 19, 0, 0, 0, 0, 'aktif', '2025-09-11 05:19:40', '2025-09-11 05:19:40'),
(78, 3, 20, 0, 0, 0, 0, 'aktif', '2025-09-11 05:19:40', '2025-09-11 05:19:40'),
(79, 3, 21, 0, 0, 0, 0, 'aktif', '2025-09-11 05:19:40', '2025-09-11 05:19:40'),
(80, 3, 22, 0, 0, 0, 0, 'aktif', '2025-09-11 05:19:40', '2025-09-11 05:19:40'),
(81, 3, 23, 0, 0, 0, 0, 'aktif', '2025-09-11 05:19:40', '2025-09-11 05:19:40'),
(82, 3, 24, 0, 0, 0, 0, 'aktif', '2025-09-11 05:19:40', '2025-09-11 05:19:40'),
(83, 3, 25, 0, 0, 0, 0, 'aktif', '2025-09-11 05:19:40', '2025-09-11 05:19:40'),
(84, 3, 26, 0, 0, 0, 0, 'aktif', '2025-09-11 05:19:40', '2025-09-11 05:19:40'),
(85, 3, 28, 0, 0, 0, 0, 'aktif', '2025-09-11 05:19:40', '2025-09-11 05:19:40'),
(86, 3, 29, 0, 0, 0, 0, 'aktif', '2025-09-11 05:19:40', '2025-09-11 05:19:40'),
(87, 3, 30, 0, 0, 0, 0, 'aktif', '2025-09-11 05:19:40', '2025-09-11 05:19:40'),
(88, 3, 31, 0, 0, 0, 0, 'aktif', '2025-09-11 05:19:40', '2025-09-11 05:19:40'),
(90, 3, 33, 0, 0, 0, 0, 'aktif', '2025-09-11 05:19:40', '2025-09-11 05:19:40'),
(91, 4, 3, 0, 0, 0, 0, 'aktif', '2025-09-11 05:19:40', '2025-09-11 05:19:40'),
(92, 4, 4, 0, 0, 0, 0, 'aktif', '2025-09-11 05:19:40', '2025-09-11 05:19:40'),
(93, 4, 5, 0, 0, 0, 0, 'aktif', '2025-09-11 05:19:40', '2025-09-11 05:19:40'),
(94, 4, 6, 0, 0, 0, 0, 'aktif', '2025-09-11 05:19:40', '2025-09-11 05:19:40'),
(95, 4, 7, 0, 0, 0, 0, 'aktif', '2025-09-11 05:19:40', '2025-09-11 05:19:40'),
(96, 4, 8, 0, 0, 0, 0, 'aktif', '2025-09-11 05:19:40', '2025-09-11 05:19:40'),
(97, 4, 9, 0, 0, 0, 0, 'aktif', '2025-09-11 05:19:40', '2025-09-11 05:19:40'),
(98, 4, 10, 0, 0, 0, 0, 'aktif', '2025-09-11 05:19:40', '2025-09-11 05:19:40'),
(99, 4, 11, 0, 0, 0, 0, 'aktif', '2025-09-11 05:19:40', '2025-09-11 05:19:40'),
(100, 4, 12, 0, 0, 0, 0, 'aktif', '2025-09-11 05:19:40', '2025-09-11 05:19:40'),
(107, 4, 19, 0, 0, 0, 0, 'aktif', '2025-09-11 05:19:41', '2025-09-11 05:19:41'),
(108, 4, 20, 0, 0, 0, 0, 'aktif', '2025-09-11 05:19:41', '2025-09-11 05:19:41'),
(109, 4, 21, 0, 0, 0, 0, 'aktif', '2025-09-11 05:19:41', '2025-09-11 05:19:41'),
(110, 4, 22, 0, 0, 0, 0, 'aktif', '2025-09-11 05:19:41', '2025-09-11 05:19:41'),
(111, 4, 23, 0, 0, 0, 0, 'aktif', '2025-09-11 05:19:41', '2025-09-11 05:19:41'),
(112, 4, 24, 0, 0, 0, 0, 'aktif', '2025-09-11 05:19:41', '2025-09-11 05:19:41'),
(113, 4, 25, 0, 0, 0, 0, 'aktif', '2025-09-11 05:19:41', '2025-09-11 05:19:41'),
(114, 4, 26, 0, 0, 0, 0, 'aktif', '2025-09-11 05:19:41', '2025-09-11 05:19:41'),
(115, 4, 28, 0, 0, 0, 0, 'aktif', '2025-09-11 05:19:41', '2025-09-11 05:19:41'),
(116, 4, 29, 0, 0, 0, 0, 'aktif', '2025-09-11 05:19:41', '2025-09-11 05:19:41'),
(117, 4, 30, 0, 0, 0, 0, 'aktif', '2025-09-11 05:19:41', '2025-09-11 05:19:41'),
(118, 4, 31, 0, 0, 0, 0, 'aktif', '2025-09-11 05:19:41', '2025-09-11 05:19:41'),
(120, 4, 33, 0, 0, 0, 0, 'aktif', '2025-09-11 05:19:41', '2025-09-11 05:19:41'),
(121, 6, 3, 0, 0, 0, 0, 'aktif', '2025-09-11 05:19:41', '2025-09-11 05:19:41'),
(122, 6, 4, 0, 0, 0, 0, 'aktif', '2025-09-11 05:19:41', '2025-09-11 05:19:41'),
(123, 6, 5, 0, 0, 0, 0, 'aktif', '2025-09-11 05:19:41', '2025-09-11 05:19:41'),
(124, 6, 6, 0, 0, 0, 0, 'aktif', '2025-09-11 05:19:41', '2025-09-11 05:19:41'),
(125, 6, 7, 0, 0, 0, 0, 'aktif', '2025-09-11 05:19:41', '2025-09-11 05:19:41'),
(126, 6, 8, 0, 0, 0, 0, 'aktif', '2025-09-11 05:19:41', '2025-09-11 05:19:41'),
(127, 6, 9, 0, 0, 0, 0, 'aktif', '2025-09-11 05:19:41', '2025-09-11 05:19:41'),
(128, 6, 10, 0, 0, 0, 0, 'aktif', '2025-09-11 05:19:41', '2025-09-11 05:19:41'),
(129, 6, 11, 0, 0, 0, 0, 'aktif', '2025-09-11 05:19:41', '2025-09-11 05:19:41'),
(130, 6, 12, 0, 0, 0, 0, 'aktif', '2025-09-11 05:19:41', '2025-09-11 05:19:41'),
(137, 6, 19, 0, 0, 0, 0, 'aktif', '2025-09-11 05:19:41', '2025-09-11 05:19:41'),
(138, 6, 20, 0, 0, 0, 0, 'aktif', '2025-09-11 05:19:41', '2025-09-11 05:19:41'),
(139, 6, 21, 0, 0, 0, 0, 'aktif', '2025-09-11 05:19:41', '2025-09-11 05:19:41'),
(140, 6, 22, 0, 0, 0, 0, 'aktif', '2025-09-11 05:19:41', '2025-09-11 05:19:41'),
(141, 6, 23, 0, 0, 0, 0, 'aktif', '2025-09-11 05:19:41', '2025-09-11 05:19:41'),
(142, 6, 24, 0, 0, 0, 0, 'aktif', '2025-09-11 05:19:41', '2025-09-11 05:19:41'),
(143, 6, 25, 0, 0, 0, 0, 'aktif', '2025-09-11 05:19:41', '2025-09-11 05:19:41'),
(144, 6, 26, 0, 0, 0, 0, 'aktif', '2025-09-11 05:19:41', '2025-09-11 05:19:41'),
(145, 6, 28, 0, 0, 0, 0, 'aktif', '2025-09-11 05:19:41', '2025-09-11 05:19:41'),
(146, 6, 29, 0, 0, 0, 0, 'aktif', '2025-09-11 05:19:41', '2025-09-11 05:19:41'),
(147, 6, 30, 0, 0, 0, 0, 'aktif', '2025-09-11 05:19:41', '2025-09-11 05:19:41'),
(148, 6, 31, 0, 0, 0, 0, 'aktif', '2025-09-11 05:19:41', '2025-09-11 05:19:41'),
(150, 6, 33, 0, 0, 0, 0, 'aktif', '2025-09-11 05:19:41', '2025-09-11 05:19:41');

-- --------------------------------------------------------

--
-- Table structure for table `jobs`
--

CREATE TABLE `jobs` (
  `id` bigint UNSIGNED NOT NULL,
  `queue` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `payload` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `attempts` tinyint UNSIGNED NOT NULL,
  `reserved_at` int UNSIGNED DEFAULT NULL,
  `available_at` int UNSIGNED NOT NULL,
  `created_at` int UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `job_batches`
--

CREATE TABLE `job_batches` (
  `id` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `total_jobs` int NOT NULL,
  `pending_jobs` int NOT NULL,
  `failed_jobs` int NOT NULL,
  `failed_job_ids` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `options` mediumtext COLLATE utf8mb4_unicode_ci,
  `cancelled_at` int DEFAULT NULL,
  `created_at` int NOT NULL,
  `finished_at` int DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `makuls`
--

CREATE TABLE `makuls` (
  `id` bigint UNSIGNED NOT NULL,
  `kode_mk` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `nama_mk` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `sks` int NOT NULL,
  `semester` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `prodis_id` bigint UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `menus`
--

CREATE TABLE `menus` (
  `id` bigint UNSIGNED NOT NULL,
  `nama` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `url` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `ikon` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `parent_id` bigint UNSIGNED DEFAULT NULL,
  `urutan` int NOT NULL DEFAULT '0',
  `status` enum('aktif','nonaktif') COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'aktif',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `menus`
--

INSERT INTO `menus` (`id`, `nama`, `url`, `ikon`, `parent_id`, `urutan`, `status`, `created_at`, `updated_at`) VALUES
(3, 'Dashboard', '/', 'bi bi-grid', NULL, 1, 'aktif', '2025-09-10 05:46:08', '2025-09-10 05:46:08'),
(4, 'Data Master', NULL, 'bi bi-layout-text-window-reverse', NULL, 2, 'aktif', '2025-09-10 06:00:49', '2025-09-11 05:50:01'),
(5, 'Pendaftar', 'pendaftars.index', 'bi bi-circle', 4, 3, 'aktif', '2025-09-10 06:02:07', '2025-09-10 06:02:07'),
(6, 'Tahun Akademik', 'tahun_akademiks.index', 'bi bi-circle', 4, 4, 'aktif', '2025-09-10 07:23:52', '2025-09-10 07:23:52'),
(7, 'Program Studi', 'prodis.index', 'bi bi-circle', 4, 5, 'aktif', '2025-09-10 07:26:49', '2025-09-10 07:26:49'),
(8, 'Mata Kuliah', 'makuls.index', 'bi bi-circle', 4, 6, 'aktif', '2025-09-10 07:31:55', '2025-09-10 07:31:55'),
(9, 'CPMK', 'cpmks.index', 'bi bi-circle', 4, 7, 'aktif', '2025-09-10 07:32:46', '2025-09-10 07:32:46'),
(10, 'Asesor', 'asesors.index', 'bi bi-circle', 4, 8, 'aktif', '2025-09-10 07:33:24', '2025-09-10 07:33:24'),
(11, 'Data Pokok', NULL, 'bi bi-person', NULL, 9, 'aktif', '2025-09-10 07:35:45', '2025-09-11 05:50:12'),
(12, 'Data Diri', '#', 'bi bi-circle', 11, 10, 'aktif', '2025-09-10 07:36:42', '2025-09-10 07:36:42'),
(19, 'Berkas', '#', 'bi bi-circle', 11, 17, 'aktif', '2025-09-10 07:40:29', '2025-09-12 06:59:48'),
(20, 'Formulir', '#', 'bi bi-journal-text', NULL, 18, 'aktif', '2025-09-10 07:52:26', '2025-09-10 07:52:26'),
(21, 'Formulir 1', '#', 'bi bi-circle', 20, 19, 'aktif', '2025-09-10 07:53:07', '2025-09-10 07:53:07'),
(22, 'Formulir 2', '#', 'bi bi-circle', 20, 20, 'aktif', '2025-09-10 07:53:38', '2025-09-10 07:53:38'),
(23, 'Formulir 3', '#', 'bi bi-circle', 20, 21, 'aktif', '2025-09-10 07:54:01', '2025-09-10 07:54:01'),
(24, 'Penilaian Asesor', '#', 'bi bi-circle', 20, 22, 'aktif', '2025-09-10 07:56:05', '2025-09-10 07:56:05'),
(25, 'Banding', '#', 'bi bi-circle', 20, 23, 'aktif', '2025-09-10 07:56:27', '2025-09-10 07:56:27'),
(26, 'Pleno', '#', 'bi bi-circle', 20, 24, 'aktif', '2025-09-10 07:56:50', '2025-09-10 07:56:50'),
(28, 'Manajemen User', NULL, 'bi bi-person', NULL, 25, 'aktif', '2025-09-10 07:59:49', '2025-09-10 07:59:49'),
(29, 'User', 'pengguna.index', 'bi bi-circle', 28, 26, 'aktif', '2025-09-10 08:00:22', '2025-09-10 08:00:22'),
(30, 'Hak Akses', 'hak_akses.index', 'bi bi-circle', 28, 27, 'aktif', '2025-09-10 08:01:04', '2025-09-11 03:59:55'),
(31, 'Role', 'role.index', 'bi bi-circle', 28, 28, 'aktif', '2025-09-10 08:06:53', '2025-09-10 10:44:13'),
(33, 'Kelola Menu', 'menu.index', 'bi bi-person', NULL, 30, 'aktif', '2025-09-10 08:07:51', '2025-09-10 08:07:51');

-- --------------------------------------------------------

--
-- Table structure for table `migrations`
--

CREATE TABLE `migrations` (
  `id` int UNSIGNED NOT NULL,
  `migration` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `batch` int NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `migrations`
--

INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES
(1, '0001_01_01_000000_create_users_table', 1),
(2, '0001_01_01_000001_create_cache_table', 1),
(3, '0001_01_01_000002_create_jobs_table', 1),
(4, '2025_01_26_233703_create_prodis_table', 2),
(5, '2025_01_26_233831_create_tahun_akademiks_table', 2),
(6, '2025_01_26_233850_create_pendaftars_table', 2),
(7, '2025_01_26_233915_create_makuls_table', 2),
(8, '2025_01_26_233939_create_cpmks_table', 2),
(9, '2025_01_26_233954_create_asesors_table', 2),
(10, '2025_02_06_165502_add_foreign_key_to_pendaftars_table', 2),
(11, '2025_09_05_115812_create_pengguna_table', 3),
(12, '2025_09_05_131242_rename_pengguna_table_to_penggunas', 4),
(13, '2025_09_10_115934_create_menus_table', 5),
(14, '2025_09_10_172900_change_role_enum_to_string_in_pengguna_table', 6),
(15, '2025_09_10_173529_create_roles_table', 7),
(16, '2025_09_10_182843_change_role_column_in_penggunas_table', 8),
(17, '2025_09_11_104939_create_hak_akses_table', 9),
(18, '2025_09_11_111152_add_crud_permissions_to_hak_akses_table', 10);

-- --------------------------------------------------------

--
-- Table structure for table `password_reset_tokens`
--

CREATE TABLE `password_reset_tokens` (
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `pendaftars`
--

CREATE TABLE `pendaftars` (
  `id` bigint UNSIGNED NOT NULL,
  `NIK` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `nama` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `tempatLahir` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `tglLahir` date NOT NULL,
  `agama` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `noHP` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `password` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `sekolahasal` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `NISN` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `nmAyah` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `nmIbu` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `alamat` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `RT` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `RW` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `desa` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `kecamatan` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `kabupaten` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `provinsi` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `prodis_id` bigint UNSIGNED NOT NULL,
  `jenisdaftar` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `status` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `foto` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `role` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'pendaftar',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `pendaftars`
--

INSERT INTO `pendaftars` (`id`, `NIK`, `nama`, `tempatLahir`, `tglLahir`, `agama`, `email`, `noHP`, `password`, `sekolahasal`, `NISN`, `nmAyah`, `nmIbu`, `alamat`, `RT`, `RW`, `desa`, `kecamatan`, `kabupaten`, `provinsi`, `prodis_id`, `jenisdaftar`, `status`, `foto`, `role`, `created_at`, `updated_at`) VALUES
(1, '1652131313', 'nnnn', 'bjn', '2006-09-12', 'Kristen', 'n@gmail.com', '0899999999', '12345678', 'smk', '0011223344', 'I', 'B', 'Jl. Kampus Ronggolawe Blok No 1, Mentul, Cepu, Blora', '4', '6', 'karangboyo', 'cepu', 'blora', 'jawa tengah', 1, 'Reguler', NULL, NULL, 'pendaftar', '2025-09-04 06:13:15', '2025-09-04 06:13:15');

-- --------------------------------------------------------

--
-- Table structure for table `penggunas`
--

CREATE TABLE `penggunas` (
  `id` bigint UNSIGNED NOT NULL,
  `nama` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `password` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `role` bigint UNSIGNED NOT NULL,
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `penggunas`
--

INSERT INTO `penggunas` (`id`, `nama`, `email`, `password`, `role`, `remember_token`, `created_at`, `updated_at`) VALUES
(4, 'Dea Salsabilla', 'deasalsabilla06@gmail.com', '$2y$12$r1nIEJl2ImxLpAsB36D62OREkVSE5S7YWR64TIPSUI6d9U5oOnF7C', 1, NULL, '2025-09-10 11:23:28', '2025-09-10 11:46:16'),
(5, 'Admin', 'admin@gmail.com', '$2y$12$0asdxMtTwEIRmCC79BcuWOFFGH4e1DFgvUFSo.1jRJ2q888bDK/BG', 1, NULL, '2025-10-01 07:59:56', '2025-10-01 07:59:56');

-- --------------------------------------------------------

--
-- Table structure for table `prodis`
--

CREATE TABLE `prodis` (
  `id` bigint UNSIGNED NOT NULL,
  `kodeprodi` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `namaprodi` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `jenjang` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `status` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `prodis`
--

INSERT INTO `prodis` (`id`, `kodeprodi`, `namaprodi`, `jenjang`, `status`, `created_at`, `updated_at`) VALUES
(1, '55201', 'INformatika', 'S1', 'Aktif', '2025-09-04 06:12:50', '2025-09-04 06:12:50');

-- --------------------------------------------------------

--
-- Table structure for table `roles`
--

CREATE TABLE `roles` (
  `id` bigint UNSIGNED NOT NULL,
  `nama` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `deskripsi` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `status` enum('aktif','nonaktif') COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'aktif',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `roles`
--

INSERT INTO `roles` (`id`, `nama`, `deskripsi`, `status`, `created_at`, `updated_at`) VALUES
(1, 'Superadmin', 'Admin yang dapat mengelola semua menu termasuk mengelola menu', 'aktif', '2025-09-10 10:53:08', '2025-09-10 10:53:08'),
(2, 'Admin', 'Admin yang dapat mengelola semua menu kecuali mengelola menu dan menambahkan Superadmin', 'aktif', '2025-09-10 10:55:16', '2025-09-10 10:55:16'),
(3, 'Asesor', '-', 'aktif', '2025-09-10 10:56:16', '2025-09-10 10:56:16'),
(4, 'Mahasiswa', '-', 'aktif', '2025-09-10 10:56:27', '2025-09-10 10:56:27'),
(6, 'testing', '-', 'aktif', '2025-09-10 11:18:58', '2025-09-10 11:18:58');

-- --------------------------------------------------------

--
-- Table structure for table `sessions`
--

CREATE TABLE `sessions` (
  `id` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `user_id` bigint UNSIGNED DEFAULT NULL,
  `ip_address` varchar(45) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `user_agent` text COLLATE utf8mb4_unicode_ci,
  `payload` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `last_activity` int NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `sessions`
--

INSERT INTO `sessions` (`id`, `user_id`, `ip_address`, `user_agent`, `payload`, `last_activity`) VALUES
('H6qXhB63LYzW8jrzWljjBKvxIIjyckRxIOo2v0CH', 4, '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/140.0.0.0 Safari/537.36', 'YTo0OntzOjY6Il90b2tlbiI7czo0MDoiSHBFNjhtZFY2amlyR2RBWXpxVHFwRTA2SERoWFQ2c3BsTWE2RkY5SSI7czo2OiJfZmxhc2giO2E6Mjp7czozOiJuZXciO2E6MDp7fXM6Mzoib2xkIjthOjA6e319czo5OiJfcHJldmlvdXMiO2E6MTp7czozOiJ1cmwiO3M6MzA6Imh0dHA6Ly9sb2NhbGhvc3Q6ODAwMC9wZW5nZ3VuYSI7fXM6NTA6ImxvZ2luX3dlYl81OWJhMzZhZGRjMmIyZjk0MDE1ODBmMDE0YzdmNThlYTRlMzA5ODlkIjtpOjQ7fQ==', 1759305597);

-- --------------------------------------------------------

--
-- Table structure for table `tahun_akademiks`
--

CREATE TABLE `tahun_akademiks` (
  `id` bigint UNSIGNED NOT NULL,
  `nama` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `tglMulai` date NOT NULL,
  `tglselesai` date NOT NULL,
  `status` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` bigint UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `password` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `asesors`
--
ALTER TABLE `asesors`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `asesors_email_unique` (`email`),
  ADD KEY `asesors_prodis_id_foreign` (`prodis_id`);

--
-- Indexes for table `cache`
--
ALTER TABLE `cache`
  ADD PRIMARY KEY (`key`);

--
-- Indexes for table `cache_locks`
--
ALTER TABLE `cache_locks`
  ADD PRIMARY KEY (`key`);

--
-- Indexes for table `cpmks`
--
ALTER TABLE `cpmks`
  ADD PRIMARY KEY (`id`),
  ADD KEY `cpmks_makuls_id_foreign` (`makuls_id`),
  ADD KEY `cpmks_prodis_id_foreign` (`prodis_id`);

--
-- Indexes for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `failed_jobs_uuid_unique` (`uuid`);

--
-- Indexes for table `hak_akses`
--
ALTER TABLE `hak_akses`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `hak_akses_role_id_menu_id_unique` (`role_id`,`menu_id`),
  ADD KEY `hak_akses_menu_id_foreign` (`menu_id`);

--
-- Indexes for table `jobs`
--
ALTER TABLE `jobs`
  ADD PRIMARY KEY (`id`),
  ADD KEY `jobs_queue_index` (`queue`);

--
-- Indexes for table `job_batches`
--
ALTER TABLE `job_batches`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `makuls`
--
ALTER TABLE `makuls`
  ADD PRIMARY KEY (`id`),
  ADD KEY `makuls_prodis_id_foreign` (`prodis_id`);

--
-- Indexes for table `menus`
--
ALTER TABLE `menus`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `password_reset_tokens`
--
ALTER TABLE `password_reset_tokens`
  ADD PRIMARY KEY (`email`);

--
-- Indexes for table `pendaftars`
--
ALTER TABLE `pendaftars`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `pendaftars_email_unique` (`email`),
  ADD KEY `pendaftars_prodis_id_foreign` (`prodis_id`);

--
-- Indexes for table `penggunas`
--
ALTER TABLE `penggunas`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `pengguna_email_unique` (`email`),
  ADD KEY `penggunas_role_foreign` (`role`);

--
-- Indexes for table `prodis`
--
ALTER TABLE `prodis`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `prodis_kodeprodi_unique` (`kodeprodi`);

--
-- Indexes for table `roles`
--
ALTER TABLE `roles`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `roles_nama_unique` (`nama`);

--
-- Indexes for table `sessions`
--
ALTER TABLE `sessions`
  ADD PRIMARY KEY (`id`),
  ADD KEY `sessions_user_id_index` (`user_id`),
  ADD KEY `sessions_last_activity_index` (`last_activity`);

--
-- Indexes for table `tahun_akademiks`
--
ALTER TABLE `tahun_akademiks`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `users_email_unique` (`email`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `asesors`
--
ALTER TABLE `asesors`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `cpmks`
--
ALTER TABLE `cpmks`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `hak_akses`
--
ALTER TABLE `hak_akses`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=151;

--
-- AUTO_INCREMENT for table `jobs`
--
ALTER TABLE `jobs`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `makuls`
--
ALTER TABLE `makuls`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `menus`
--
ALTER TABLE `menus`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=35;

--
-- AUTO_INCREMENT for table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=19;

--
-- AUTO_INCREMENT for table `pendaftars`
--
ALTER TABLE `pendaftars`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `penggunas`
--
ALTER TABLE `penggunas`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `prodis`
--
ALTER TABLE `prodis`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `roles`
--
ALTER TABLE `roles`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `tahun_akademiks`
--
ALTER TABLE `tahun_akademiks`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `asesors`
--
ALTER TABLE `asesors`
  ADD CONSTRAINT `asesors_prodis_id_foreign` FOREIGN KEY (`prodis_id`) REFERENCES `prodis` (`id`) ON UPDATE CASCADE;

--
-- Constraints for table `cpmks`
--
ALTER TABLE `cpmks`
  ADD CONSTRAINT `cpmks_makuls_id_foreign` FOREIGN KEY (`makuls_id`) REFERENCES `makuls` (`id`) ON UPDATE CASCADE,
  ADD CONSTRAINT `cpmks_prodis_id_foreign` FOREIGN KEY (`prodis_id`) REFERENCES `prodis` (`id`) ON UPDATE CASCADE;

--
-- Constraints for table `hak_akses`
--
ALTER TABLE `hak_akses`
  ADD CONSTRAINT `hak_akses_menu_id_foreign` FOREIGN KEY (`menu_id`) REFERENCES `menus` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `hak_akses_role_id_foreign` FOREIGN KEY (`role_id`) REFERENCES `roles` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `makuls`
--
ALTER TABLE `makuls`
  ADD CONSTRAINT `makuls_prodis_id_foreign` FOREIGN KEY (`prodis_id`) REFERENCES `prodis` (`id`) ON UPDATE CASCADE;

--
-- Constraints for table `pendaftars`
--
ALTER TABLE `pendaftars`
  ADD CONSTRAINT `pendaftars_prodis_id_foreign` FOREIGN KEY (`prodis_id`) REFERENCES `prodis` (`id`) ON UPDATE CASCADE;

--
-- Constraints for table `penggunas`
--
ALTER TABLE `penggunas`
  ADD CONSTRAINT `penggunas_role_foreign` FOREIGN KEY (`role`) REFERENCES `roles` (`id`) ON DELETE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
