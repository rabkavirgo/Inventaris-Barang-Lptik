-- --------------------------------------------------------
-- Host:                         127.0.0.1
-- Server version:               5.7.33 - MySQL Community Server (GPL)
-- Server OS:                    Win64
-- HeidiSQL Version:             11.2.0.6213
-- --------------------------------------------------------

/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET NAMES utf8 */;
/*!50503 SET NAMES utf8mb4 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;
/*!40111 SET @OLD_SQL_NOTES=@@SQL_NOTES, SQL_NOTES=0 */;


-- Dumping database structure for inventaris
CREATE DATABASE IF NOT EXISTS `inventaris` /*!40100 DEFAULT CHARACTER SET latin1 */;
USE `inventaris`;

-- Dumping structure for table inventaris.barangs
CREATE TABLE IF NOT EXISTS `barangs` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `ruangId` int(11) NOT NULL,
  `kodeBarang` int(11) NOT NULL,
  `namaBarang` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `jenisBarang` enum('elektronik','nonelektronik') COLLATE utf8mb4_unicode_ci NOT NULL,
  `kondisi` enum('bagus','rusak') COLLATE utf8mb4_unicode_ci NOT NULL,
  `statusPerbaikan` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `merk` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `asalPerolehan` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `bahan` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `harga` bigint(20) NOT NULL,
  `catatan` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `waktuMasuk` date NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=71 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Dumping data for table inventaris.barangs: ~67 rows (approximately)
/*!40000 ALTER TABLE `barangs` DISABLE KEYS */;
REPLACE INTO `barangs` (`id`, `ruangId`, `kodeBarang`, `namaBarang`, `jenisBarang`, `kondisi`, `statusPerbaikan`, `merk`, `asalPerolehan`, `bahan`, `harga`, `catatan`, `waktuMasuk`, `created_at`, `updated_at`) VALUES
	(1, 1, 13, 'Kursi', 'nonelektronik', 'bagus', '0', 'Olympic', 'Unib', 'besi', 5000061, 'nido adki', '2022-03-18', '2022-03-10 10:47:27', '2022-03-10 12:29:09'),
	(4, 1, 123, 'Televisi Monitor', 'elektronik', 'bagus', '1', 'Panasonic', 'Pemberian Universitas', 'Besi', 3000000, 'tidak ada catatan', '2022-03-11', '2022-03-10 13:08:09', '2022-03-10 13:08:09'),
	(5, 3, 13, 'Kursi', 'elektronik', 'bagus', '0', '212', '121', '12', 212, '1212', '2022-03-03', '2022-03-10 13:09:28', '2022-03-10 13:09:28'),
	(6, 1, 21, 'Air Conditioner', 'elektronik', 'bagus', '0', 'Panasonic', 'Pemberian Universitas', 'Kayu', 3000000, 'tidak ada catatan', '2022-03-04', '2022-03-10 13:24:34', '2022-03-10 13:24:34'),
	(7, 1, 41, 'Lemari Kayu', 'nonelektronik', 'rusak', '0', 'Olympic', 'Pemberian Universitas', 'kayu jati', 50000, 'tidak ada catatan', '2022-03-05', '2022-03-10 13:26:06', '2022-03-10 13:26:06'),
	(8, 1, 11, 'Personal Computer', 'elektronik', 'bagus', '0', 'Lenovo', 'Pemberian Universitas', 'Besi', 3000000, 'tidak ada catatan', '2022-03-13', '2022-03-10 13:27:04', '2022-03-10 13:27:04'),
	(9, 1, 51, 'Kursi', 'nonelektronik', 'bagus', '0', 'Olympic', 'Pemberian Universitas', 'kayu jati', 50000, 'tidak ada catatan', '2022-03-15', '2022-03-10 13:27:40', '2022-03-10 13:27:40'),
	(10, 2, 12, 'Personal Computer', 'elektronik', 'bagus', '0', 'Lenovo', 'Pemberian Universitas', 'Besi', 3000000, 'tidak ada catatan', '2022-03-01', '2022-03-10 13:28:32', '2022-03-10 13:28:32'),
	(11, 2, 52, 'Kursi', 'nonelektronik', 'bagus', '0', 'Olympic', 'Pemberian Universitas', 'kayu jati', 50000, 'tidak ada catatan', '2022-03-12', '2022-03-10 13:29:04', '2022-03-10 13:29:04'),
	(12, 2, 31, 'Meja', 'nonelektronik', 'rusak', '0', 'Olympic', 'Pemberian Universitas', 'kayu jati', 50000, 'tidak ada catatan', '2022-03-12', '2022-03-10 13:29:33', '2022-03-10 13:29:33'),
	(13, 2, 13, 'Personal Computer', 'elektronik', 'rusak', '0', 'Lenovo', 'Pemberian Universitas', 'Besi', 3000000, 'tidak ada catatan', '2022-03-12', '2022-03-10 13:30:24', '2022-03-10 13:30:24'),
	(14, 2, 14, 'Personal Computer', 'elektronik', 'rusak', '0', 'Lenovo', 'Pemberian Universitas', 'Besi', 3000000, 'tidak ada catatan', '2022-03-12', '2022-03-10 13:31:24', '2022-03-10 13:31:24'),
	(15, 3, 53, 'Kursi', 'nonelektronik', 'bagus', '0', 'Olympic', 'Pemberian Universitas', 'kayu jati', 50000, 'tidak ada catatan', '2022-03-12', '2022-03-10 13:32:14', '2022-03-10 13:32:14'),
	(16, 3, 15, 'Personal Computer', 'elektronik', 'bagus', '0', 'Lenovo', 'Pemberian Universitas', 'Besi', 3000000, 'tidak ada catatan', '2022-03-25', '2022-03-10 13:33:02', '2022-03-10 13:33:02'),
	(17, 4, 2, 'Air Conditioner', 'elektronik', 'bagus', '0', 'Panasonic', 'Pemberian Universitas', 'besi', 3000000, 'tidak ada catatan', '2022-03-19', '2022-03-10 13:34:03', '2022-03-10 13:34:03'),
	(18, 4, 22, 'Air Conditioner', 'elektronik', 'rusak', '0', 'Panasonic', 'Pemberian Universitas', 'Besi', 3000000, 'tidak ada catatan', '2022-03-12', '2022-03-10 13:34:37', '2022-03-10 13:34:37'),
	(19, 5, 23, 'Air Conditioner', 'elektronik', 'rusak', '0', 'Panasonic', 'Pemberian Universitas', 'Besi', 3000000, 'tidak ada catatan', '2022-03-19', '2022-03-10 13:35:05', '2022-03-10 13:35:05'),
	(20, 6, 24, 'Air Conditioner', 'elektronik', 'bagus', '0', 'Panasonic', 'Pemberian Universitas', 'Besi', 3000000, 'tidak ada catatan', '2022-03-17', '2022-03-10 13:35:34', '2022-03-10 13:35:34'),
	(21, 7, 25, 'Air Conditioner', 'elektronik', 'rusak', '0', 'Panasonic', 'Pemberian Universitas', 'Besi', 3000000, 'tidak ada catatan', '2022-03-27', '2022-03-10 13:36:01', '2022-03-10 13:36:01'),
	(22, 7, 25, 'Air Conditioner', 'elektronik', 'bagus', '0', 'Panasonic', 'Pemberian Universitas', 'kayu jati', 3000000, 'tidak ada catatan', '2022-03-12', '2022-03-10 13:36:23', '2022-03-10 13:36:23'),
	(23, 8, 26, 'Air Conditioner', 'elektronik', 'bagus', '0', 'Panasonic', 'Pemberian Universitas', 'Besi', 3000000, 'tidak ada catatan', '2022-03-02', '2022-03-10 13:36:48', '2022-03-10 13:36:48'),
	(24, 8, 27, 'Air Conditioner', 'elektronik', 'bagus', '0', 'Panasonic', 'Pemberian Universitas', 'Besi', 3000000, 'tidak ada catatan', '2022-03-26', '2022-03-10 13:37:12', '2022-03-10 13:37:12'),
	(25, 9, 26, 'Air Conditioner', 'elektronik', 'rusak', '0', 'Panasonic', 'Pemberian Universitas', 'Besi', 3000000, 'tidak ada catatan', '2022-03-11', '2022-03-10 13:37:40', '2022-03-10 13:37:40'),
	(26, 10, 27, 'Air Conditioner', 'elektronik', 'bagus', '0', 'Panasonic', 'Pemberian Universitas', 'besi', 3000000, 'tidak ada catatan', '2022-03-31', '2022-03-10 13:38:22', '2022-03-10 13:38:22'),
	(27, 4, 16, 'Personal Computer', 'elektronik', 'rusak', '0', 'Lenovo', 'Pemberian Universitas', 'Besi', 3000000, 'tidak ada catatan', '2022-03-11', '2022-03-10 13:38:50', '2022-03-10 13:38:50'),
	(28, 5, 17, 'Personal Computer', 'elektronik', 'bagus', '0', 'Lenovo', 'Pemberian Universitas', 'Besi', 3000000, 'tidak ada catatan', '2022-03-04', '2022-03-10 13:39:16', '2022-03-10 13:39:16'),
	(29, 6, 18, 'Personal Computer', 'elektronik', 'bagus', '0', 'Lenovo', 'Pemberian Universitas', 'Besi', 3000000, 'tidak ada catatan', '2022-03-12', '2022-03-10 13:39:42', '2022-03-10 13:39:42'),
	(30, 7, 17, 'Personal Computer', 'elektronik', 'rusak', '0', 'Lenovo', 'Pemberian Universitas', 'kayu jati', 3000000, 'tidak ada catatan', '2022-03-05', '2022-03-10 13:40:45', '2022-03-10 13:40:45'),
	(31, 8, 18, 'Personal Computer', 'elektronik', 'rusak', '0', 'Lenovo', 'Pemberian Universitas', 'Besi', 3000000, 'tidak ada catatan', '2022-03-05', '2022-03-10 13:41:08', '2022-03-10 13:41:08'),
	(32, 8, 19, 'Personal Computer', 'elektronik', 'rusak', '0', 'Lenovo', 'Pemberian Universitas', 'besi', 3000000, 'tidak ada catatan', '2022-03-11', '2022-03-10 13:41:34', '2022-03-10 13:41:34'),
	(33, 9, 19, 'Personal Computer', 'elektronik', 'rusak', '0', 'Lenovo', 'Pemberian Universitas', 'Besi', 3000000, 'tidak ada catatan', '2022-03-05', '2022-03-10 13:42:00', '2022-03-10 13:42:00'),
	(34, 10, 120, 'Personal Computer', 'elektronik', 'bagus', '0', 'Lenovo', 'Pemberian Universitas', 'besi', 3000000, 'tidak ada catatan', '2022-03-12', '2022-03-10 13:42:58', '2022-03-10 13:42:58'),
	(35, 3, 32, 'Meja', 'nonelektronik', 'bagus', '0', 'Olympic', 'Pemberian Universitas', 'kayu jati', 50000, 'tidak ada catatan', '2022-03-12', '2022-03-10 13:43:42', '2022-03-10 13:43:42'),
	(36, 5, 33, 'Meja', 'nonelektronik', 'bagus', '0', 'Olympic', 'Pemberian Universitas', 'kayu jati', 50000, 'tidak ada catatan', '2022-03-12', '2022-03-10 13:44:09', '2022-03-10 13:44:09'),
	(37, 7, 34, 'Meja', 'nonelektronik', 'rusak', '0', 'Olympic', 'Pemberian Universitas', 'kayu jati', 50000, 'tidak ada catatan', '2022-03-12', '2022-03-10 13:44:34', '2022-03-10 13:44:34'),
	(38, 4, 35, 'Meja', 'nonelektronik', 'rusak', '0', 'Olympic', 'Pemberian Universitas', 'kayu jati', 50000, 'tidak ada catatan', '2022-03-14', '2022-03-10 13:44:59', '2022-03-10 13:44:59'),
	(39, 8, 36, 'Meja', 'nonelektronik', 'bagus', '0', 'Olympic', 'Pemberian Universitas', 'kayu jati', 50000, 'tidak ada catatan', '2022-03-24', '2022-03-10 13:45:24', '2022-03-10 13:45:24'),
	(40, 9, 37, 'Meja', 'nonelektronik', 'rusak', '0', 'Panasonic', 'Pemberian Universitas', 'kayu jati', 50000, 'tidak ada catatan', '2022-03-22', '2022-03-10 13:45:54', '2022-03-10 13:45:54'),
	(41, 3, 54, 'Kursi', 'nonelektronik', 'bagus', '0', 'Olympic', 'Pemberian Universitas', 'kayu jati', 50000, 'tidak ada catatan', '2022-03-11', '2022-03-10 13:46:34', '2022-03-10 13:46:34'),
	(42, 5, 55, 'Kursi', 'nonelektronik', 'bagus', '0', 'Olympic', 'Pemberian Universitas', 'kayu jati', 50000, 'tidak ada catatan', '2022-03-23', '2022-03-10 13:47:10', '2022-03-10 13:47:10'),
	(43, 8, 56, 'Kursi', 'nonelektronik', 'rusak', '0', 'Olympic', 'Pemberian Universitas', 'kayu jati', 50000, 'tidak ada catatan', '2022-03-22', '2022-03-10 13:47:36', '2022-03-10 13:47:36'),
	(44, 9, 57, 'Kursi', 'nonelektronik', 'rusak', '0', 'Olympic', 'Pemberian Universitas', 'kayu jati', 50000, 'tidak ada catatan', '2022-03-12', '2022-03-10 13:48:14', '2022-03-10 13:48:14'),
	(45, 10, 5, 'Kursi', 'nonelektronik', 'rusak', '0', 'Olympic', 'Pemberian Universitas', 'kayu jati', 50000, 'tidak ada catatan', '2022-03-21', '2022-03-10 13:48:53', '2022-03-10 13:48:53'),
	(46, 8, 111, 'Personal Computer', 'elektronik', 'rusak', '0', 'Lenovo', 'Pemberian Universitas', 'Besi', 3000000, 'tidak ada catatan', '2022-03-11', '2022-03-10 13:49:25', '2022-03-10 13:49:25'),
	(47, 4, 112, 'Personal Computer', 'elektronik', 'rusak', '0', 'Lenovo', 'Pemberian Universitas', 'kayu jati', 500000, 'tidak ada catatan', '2022-03-09', '2022-03-10 13:50:00', '2022-03-10 13:50:00'),
	(48, 2, 113, 'Personal Computer', 'elektronik', 'bagus', '0', 'Lenovo', 'Pemberian Universitas', 'kayu jati', 3000000, 'tidak ada catatan', '2022-03-23', '2022-03-10 13:50:41', '2022-03-10 13:50:41'),
	(49, 8, 114, 'Personal Computer', 'elektronik', 'rusak', '0', 'Lenovo', 'Pemberian Universitas', 'kayu jati', 3000000, 'tidak ada catatan', '2022-03-23', '2022-03-10 13:51:07', '2022-03-10 13:51:07'),
	(50, 8, 115, 'Personal Computer', 'elektronik', 'bagus', '0', 'Olympic', 'Pemberian Universitas', 'Besi', 3000000, 'tidak ada catatan', '2022-03-25', '2022-03-10 13:51:33', '2022-03-10 13:51:33'),
	(51, 4, 116, 'Personal Computer', 'nonelektronik', 'rusak', '0', 'Lenovo', 'Pemberian Universitas', 'Besi', 3000000, 'tidak ada catatan', '2022-03-19', '2022-03-10 13:54:31', '2022-03-10 13:54:31'),
	(52, 6, 116, 'Personal Computer', 'nonelektronik', 'rusak', '0', 'Panasonic', 'Pemberian Universitas', 'Besi', 3000000, 'tidak ada catatan', '2022-03-12', '2022-03-10 13:55:04', '2022-03-10 13:55:04'),
	(53, 9, 117, 'Personal Computer', 'elektronik', 'rusak', '0', 'Lenovo', 'Pemberian Universitas', 'kayu jati', 50000, 'tidak ada catatan', '2022-03-23', '2022-03-10 13:55:33', '2022-03-10 13:55:33'),
	(54, 5, 56, 'Kursi', 'nonelektronik', 'rusak', '0', 'Olympic', 'Pemberian Universitas', 'kayu jati', 3000000, 'tidak ada catatan', '2022-03-23', '2022-03-10 13:56:02', '2022-03-10 13:56:02'),
	(55, 4, 37, 'Meja', 'nonelektronik', 'rusak', '0', 'Olympic', 'Pemberian Universitas', 'Besi', 3000000, 'tidak ada catatan', '2022-03-16', '2022-03-10 13:56:52', '2022-03-10 13:56:52'),
	(56, 2, 38, 'Meja', 'nonelektronik', 'rusak', '0', 'Olympic', 'Pemberian Universitas', 'kayu jati', 3000000, 'tidak ada catatan', '2022-03-17', '2022-03-10 13:57:43', '2022-03-10 13:57:43'),
	(57, 8, 117, 'Personal Computer', 'nonelektronik', 'rusak', '0', 'Lenovo', 'Pemberian Universitas', 'Besi', 3000000, 'tidak ada catatan', '2022-03-23', '2022-03-10 13:58:38', '2022-03-10 13:58:38'),
	(58, 4, 57, 'Kursi', 'nonelektronik', 'rusak', '0', 'Olympic', 'Pemberian Universitas', 'kayu jati', 3000000, 'tidak ada catatan', '2022-03-23', '2022-03-10 13:59:16', '2022-03-10 13:59:16'),
	(59, 5, 58, 'Kursi', 'nonelektronik', 'rusak', '0', 'Olympic', 'Pemberian Universitas', 'kayu jati', 3000000, 'tidak ada catatan', '2022-03-17', '2022-03-10 13:59:38', '2022-03-10 13:59:38'),
	(60, 8, 58, 'Kursi', 'nonelektronik', 'rusak', '0', 'Olympic', 'Pemberian Universitas', 'kayu jati', 3000000, 'tidak ada catatan', '2022-03-09', '2022-03-10 14:00:00', '2022-03-10 14:00:00'),
	(61, 9, 59, 'Kursi', 'nonelektronik', 'rusak', '0', 'Olympic', 'Pemberian Universitas', 'kayu jati', 3000000, 'tidak ada catatan', '2022-03-23', '2022-03-10 14:00:28', '2022-03-10 14:00:28'),
	(62, 6, 118, 'Personal Computer', 'elektronik', 'rusak', '0', 'Lenovo', 'Pemberian Universitas', 'Besi', 3000000, 'tidak ada catatan', '2022-03-11', '2022-03-10 14:00:59', '2022-03-10 14:00:59'),
	(63, 9, 119, 'Personal Computer', 'elektronik', 'rusak', '0', 'Lenovo', 'Pemberian Universitas', 'kayu jati', 50000, 'tidak ada catatan', '2022-03-15', '2022-03-10 14:01:27', '2022-03-10 14:01:27'),
	(64, 7, 38, 'Meja', 'nonelektronik', 'bagus', '0', 'Lenovo', 'Pemberian Universitas', 'Besi', 3000000, 'tidak ada catatan', '2022-03-23', '2022-03-10 14:02:17', '2022-03-10 14:02:17'),
	(65, 8, 39, 'Meja', 'nonelektronik', 'rusak', '0', 'Olympic', 'Pemberian Universitas', 'kayu jati', 3000000, 'tidak ada catatan', '2022-03-23', '2022-03-10 14:02:47', '2022-03-10 14:02:47'),
	(66, 9, 39, 'Meja', 'nonelektronik', 'rusak', '0', 'Olympic', 'Pemberian Universitas', 'kayu jati', 3000000, 'tidak ada catatan', '2022-03-25', '2022-03-10 14:03:18', '2022-03-10 14:03:18'),
	(67, 3, 310, 'Meja', 'nonelektronik', 'rusak', '0', 'Olympic', 'Pemberian Universitas', 'kayu jati', 3000000, 'tidak ada catatan', '2022-03-31', '2022-03-10 14:03:53', '2022-03-10 14:03:53'),
	(68, 5, 311, 'Meja', 'nonelektronik', 'rusak', '0', 'Olympic', 'Pemberian Universitas', 'kayu jati', 3000000, 'tidak ada catatan', '2022-03-22', '2022-03-10 14:04:22', '2022-03-10 14:04:22'),
	(69, 2, 312, 'Meja', 'nonelektronik', 'rusak', '0', 'Olympic', 'Pemberian Universitas', 'kayu jati', 50000, 'tidak ada catatan', '2022-03-24', '2022-03-10 14:05:08', '2022-03-10 14:05:08'),
	(70, 7, 3112, 'Meja', 'nonelektronik', 'rusak', '0', 'Lenovo', 'Pemberian Universitas', 'kayu jati', 50000, 'tidak ada catatan', '2022-03-15', '2022-03-10 14:05:48', '2022-03-10 14:05:48');
/*!40000 ALTER TABLE `barangs` ENABLE KEYS */;

-- Dumping structure for table inventaris.failed_jobs
CREATE TABLE IF NOT EXISTS `failed_jobs` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `uuid` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `connection` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `queue` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `payload` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `exception` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `failed_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`),
  UNIQUE KEY `failed_jobs_uuid_unique` (`uuid`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Dumping data for table inventaris.failed_jobs: ~0 rows (approximately)
/*!40000 ALTER TABLE `failed_jobs` DISABLE KEYS */;
/*!40000 ALTER TABLE `failed_jobs` ENABLE KEYS */;

-- Dumping structure for table inventaris.migrations
CREATE TABLE IF NOT EXISTS `migrations` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `migration` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `batch` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=8 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Dumping data for table inventaris.migrations: ~7 rows (approximately)
/*!40000 ALTER TABLE `migrations` DISABLE KEYS */;
REPLACE INTO `migrations` (`id`, `migration`, `batch`) VALUES
	(1, '2014_10_12_000000_create_users_table', 1),
	(2, '2014_10_12_100000_create_password_resets_table', 1),
	(3, '2019_08_19_000000_create_failed_jobs_table', 1),
	(4, '2019_12_14_000001_create_personal_access_tokens_table', 1),
	(5, '2022_02_11_040910_create_ruangans_table', 1),
	(6, '2022_02_11_041135_create_barangs_table', 1),
	(7, '2022_02_11_041424_create_riwayats_table', 1);
/*!40000 ALTER TABLE `migrations` ENABLE KEYS */;

-- Dumping structure for table inventaris.password_resets
CREATE TABLE IF NOT EXISTS `password_resets` (
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  KEY `password_resets_email_index` (`email`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Dumping data for table inventaris.password_resets: ~0 rows (approximately)
/*!40000 ALTER TABLE `password_resets` DISABLE KEYS */;
/*!40000 ALTER TABLE `password_resets` ENABLE KEYS */;

-- Dumping structure for table inventaris.personal_access_tokens
CREATE TABLE IF NOT EXISTS `personal_access_tokens` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `tokenable_type` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `tokenable_id` bigint(20) unsigned NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(64) COLLATE utf8mb4_unicode_ci NOT NULL,
  `abilities` text COLLATE utf8mb4_unicode_ci,
  `last_used_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `personal_access_tokens_token_unique` (`token`),
  KEY `personal_access_tokens_tokenable_type_tokenable_id_index` (`tokenable_type`,`tokenable_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Dumping data for table inventaris.personal_access_tokens: ~0 rows (approximately)
/*!40000 ALTER TABLE `personal_access_tokens` DISABLE KEYS */;
/*!40000 ALTER TABLE `personal_access_tokens` ENABLE KEYS */;

-- Dumping structure for table inventaris.riwayats
CREATE TABLE IF NOT EXISTS `riwayats` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `barangId` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `keterangan` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `tanggal` date NOT NULL,
  `tempat` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Dumping data for table inventaris.riwayats: ~0 rows (approximately)
/*!40000 ALTER TABLE `riwayats` DISABLE KEYS */;
/*!40000 ALTER TABLE `riwayats` ENABLE KEYS */;

-- Dumping structure for table inventaris.ruangans
CREATE TABLE IF NOT EXISTS `ruangans` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `namaRuangan` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `penanggungJawabId` bigint(20) unsigned NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=11 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Dumping data for table inventaris.ruangans: ~8 rows (approximately)
/*!40000 ALTER TABLE `ruangans` DISABLE KEYS */;
REPLACE INTO `ruangans` (`id`, `namaRuangan`, `penanggungJawabId`, `created_at`, `updated_at`) VALUES
	(1, 'Ruang Multimedia', 4, '2022-03-10 12:59:22', '2022-03-10 12:59:22'),
	(2, 'Ruang Sistem Informasi Manajemen', 6, '2022-03-10 13:03:14', '2022-03-10 13:03:14'),
	(3, 'Ruang Jaringan', 5, '2022-03-10 13:03:24', '2022-03-10 13:03:24'),
	(4, 'Ruang Administrasi', 7, '2022-03-10 13:20:13', '2022-03-10 13:20:13'),
	(5, 'Ruang Umum', 9, '2022-03-10 13:20:23', '2022-03-10 13:20:23'),
	(6, 'Ruang Laboratorium 1', 8, '2022-03-10 13:20:40', '2022-03-10 13:20:40'),
	(7, 'Ruang Laboratorium 2', 8, '2022-03-10 13:20:59', '2022-03-10 13:20:59'),
	(8, 'Ruang Laboratorium 3', 8, '2022-03-10 13:21:06', '2022-03-10 13:21:06'),
	(9, 'Ruang Laboratorium 4', 8, '2022-03-10 13:21:13', '2022-03-10 13:21:13'),
	(10, 'Ruang Laboratorium 5', 8, '2022-03-10 13:21:20', '2022-03-10 13:21:20');
/*!40000 ALTER TABLE `ruangans` ENABLE KEYS */;

-- Dumping structure for table inventaris.users
CREATE TABLE IF NOT EXISTS `users` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `password` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `role` enum('admin','pj') COLLATE utf8mb4_unicode_ci NOT NULL,
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `users_email_unique` (`email`)
) ENGINE=InnoDB AUTO_INCREMENT=10 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Dumping data for table inventaris.users: ~8 rows (approximately)
/*!40000 ALTER TABLE `users` DISABLE KEYS */;
REPLACE INTO `users` (`id`, `name`, `email`, `email_verified_at`, `password`, `role`, `remember_token`, `created_at`, `updated_at`) VALUES
	(1, 'Aziz', 'aziz@gmail.com', '2022-03-10 19:33:07', '112233', 'pj', NULL, NULL, NULL),
	(2, 'akbar', 'akbar.com', NULL, '123456', 'admin', NULL, NULL, NULL),
	(3, 'agoy', 'agoya@gmail.com', NULL, '112233', 'pj', NULL, NULL, NULL),
	(4, 'Farid Muslim', 'farid@mail.com', NULL, '$2y$10$1PpVxzHWNLbrEQHK50irgeegaJAW49KuPvx1uoqBVR7MZTeOhYIoG', 'pj', NULL, '2022-03-10 12:55:38', '2022-03-10 12:55:38'),
	(5, 'Ridwan Afdilla', 'ridwan@mail.com', NULL, '$2y$10$rdXKvYq44IikkULOg9rfgOIH0l3gqljIrnHqJam5C4/NbZmHE7NT.', 'pj', NULL, '2022-03-10 13:02:21', '2022-03-10 13:02:21'),
	(6, 'Funny Farady Coastera', 'ffc@mail.com', NULL, '$2y$10$ZEVoRtSBr3.S6DmuEYeQk./TVGqzVpISDRNBXWR41A8N2QvGaIoI.', 'pj', NULL, '2022-03-10 13:02:53', '2022-03-10 13:02:53'),
	(7, 'Totok Hadimurtono', 'hadimurtono@gmail.com', NULL, '$2y$10$VS/D1JLmplo/qg8uah.HAux2CXv9d7PFLrllO.6jjJCVgTalfAFNO', 'pj', NULL, '2022-03-10 13:19:03', '2022-03-10 13:19:03'),
	(8, 'Agus Budiargo', 'agus@gmail.com', NULL, '$2y$10$rieaMgr71z.BDCieaoHK2OXHu6qGjDJ/dh5Cf0OCmDGyEVNa4WAv.', 'pj', NULL, '2022-03-10 13:19:28', '2022-03-10 13:19:28'),
	(9, 'Tarmizi', 'tarmizi@a.com', NULL, '$2y$10$pdCSuNqsja2yV24P1kOPpuPDqxs5C1snzblpgoZt2/8lazWL535XC', 'pj', NULL, '2022-03-10 13:19:55', '2022-03-10 13:19:55');
/*!40000 ALTER TABLE `users` ENABLE KEYS */;

/*!40101 SET SQL_MODE=IFNULL(@OLD_SQL_MODE, '') */;
/*!40014 SET FOREIGN_KEY_CHECKS=IFNULL(@OLD_FOREIGN_KEY_CHECKS, 1) */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40111 SET SQL_NOTES=IFNULL(@OLD_SQL_NOTES, 1) */;
