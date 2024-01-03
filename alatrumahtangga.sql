-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jan 03, 2024 at 06:23 PM
-- Server version: 10.4.28-MariaDB
-- PHP Version: 8.2.4

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `alatrumahtangga`
--

-- --------------------------------------------------------

--
-- Table structure for table `bahan`
--

CREATE TABLE `bahan` (
  `id` int(11) NOT NULL,
  `nama` varchar(30) NOT NULL,
  `kode` varchar(30) NOT NULL,
  `bahan_qr` int(11) NOT NULL,
  `harga` int(30) NOT NULL,
  `stok` int(255) DEFAULT NULL,
  `gambar` varchar(255) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `bahan`
--

INSERT INTO `bahan` (`id`, `nama`, `kode`, `bahan_qr`, `harga`, `stok`, `gambar`, `created_at`, `updated_at`) VALUES
(11, 'Gagang Kayu', 'KDB-0001', 59100875, 3000, 45, '1704291437_gagang kayu.png', '2024-01-03 07:17:17', '2024-01-03 10:10:29'),
(12, 'Ijuk Sapu', 'KDB-0012', 90612841, 3000, 0, '1704291460_ijuk sapu.png', '2024-01-03 07:17:40', '2024-01-03 10:08:36'),
(13, 'Kain Pel', 'KDB-0013', 19615344, 4000, 50, '1704291479_kain pel.png', '2024-01-03 07:17:59', '2024-01-03 10:10:29'),
(14, 'Kawat', 'KDB-0014', 96779350, 2000, 100, '1704291498_kawat.png', '2024-01-03 07:18:18', '2024-01-03 10:05:27'),
(15, 'Plastik', 'KDB-0015', 39848825, 1000, 1100, '1704291546_Plastik.jpg', '2024-01-03 07:19:06', '2024-01-03 10:13:56');

-- --------------------------------------------------------

--
-- Table structure for table `bom`
--

CREATE TABLE `bom` (
  `kode_bom` varchar(30) NOT NULL,
  `kode_produk` varchar(20) NOT NULL,
  `kuantitas` float NOT NULL,
  `total_harga` float NOT NULL DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `bom`
--

INSERT INTO `bom` (`kode_bom`, `kode_produk`, `kuantitas`, `total_harga`) VALUES
('KDBM-0001', '10', 5, 315000),
('KDBM-0002', '11', 1, 35000),
('KDBM-0003', '12', 1, 100000);

-- --------------------------------------------------------

--
-- Table structure for table `bom_list`
--

CREATE TABLE `bom_list` (
  `kode_bom_list` int(11) NOT NULL,
  `kode_bom` varchar(100) NOT NULL,
  `kode_bahan` varchar(20) NOT NULL,
  `kuantitas` float NOT NULL,
  `satuan` varchar(15) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `bom_list`
--

INSERT INTO `bom_list` (`kode_bom_list`, `kode_bom`, `kode_bahan`, `kuantitas`, `satuan`) VALUES
(17, 'KDBM-0001', '11', 5, 'Pcs'),
(18, 'KDBM-0001', '12', 100, 'Kg'),
(19, 'KDBM-0002', '13', 5, 'Pcs'),
(20, 'KDBM-0002', '11', 5, 'Pcs'),
(21, 'KDBM-0003', '15', 100, 'Gram');

-- --------------------------------------------------------

--
-- Table structure for table `failed_jobs`
--

CREATE TABLE `failed_jobs` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `uuid` varchar(255) NOT NULL,
  `connection` text NOT NULL,
  `queue` text NOT NULL,
  `payload` longtext NOT NULL,
  `exception` longtext NOT NULL,
  `failed_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `migrations`
--

CREATE TABLE `migrations` (
  `id` int(10) UNSIGNED NOT NULL,
  `migration` varchar(255) NOT NULL,
  `batch` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `migrations`
--

INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES
(1, '2014_10_12_000000_create_users_table', 1),
(2, '2014_10_12_100000_create_password_resets_table', 1),
(3, '2019_08_19_000000_create_failed_jobs_table', 1),
(4, '2019_12_14_000001_create_personal_access_tokens_table', 1),
(5, '2023_10_20_140927_create_produks_table', 1),
(6, '2023_10_20_143836_create_bahans_table', 2),
(7, '2024_01_02_233018_add_timestamps_to_mo_table', 3),
(8, '2024_01_03_001344_add_timestamps_to_rfq_table', 4),
(9, '2024_01_03_155149_add_updated_at_to_sq_table', 5);

-- --------------------------------------------------------

--
-- Table structure for table `mo`
--

CREATE TABLE `mo` (
  `kode_mo` varchar(255) NOT NULL,
  `kode_bom` varchar(255) NOT NULL,
  `kuantitas` int(11) NOT NULL,
  `tanggal` date NOT NULL,
  `status` int(1) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `mo`
--

INSERT INTO `mo` (`kode_mo`, `kode_bom`, `kuantitas`, `tanggal`, `status`, `created_at`, `updated_at`) VALUES
('KDMO-0001', 'KDBM-0001', 1, '2024-01-03', 5, NULL, NULL),
('KDMO-0002', 'KDBM-0002', 10, '2024-01-03', 5, NULL, NULL),
('KDMO-0003', 'KDBM-0003', 100, '2024-01-03', 5, NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `password_resets`
--

CREATE TABLE `password_resets` (
  `email` varchar(255) NOT NULL,
  `token` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `pembeli`
--

CREATE TABLE `pembeli` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `nama` varchar(100) NOT NULL,
  `kontak` varchar(15) NOT NULL,
  `alamat` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `pembeli`
--

INSERT INTO `pembeli` (`id`, `nama`, `kontak`, `alamat`, `created_at`, `updated_at`) VALUES
(10, 'Akas', '+6281233554132', 'Malang, Kec.Singosari, Jawa Timur 65412', NULL, NULL),
(11, 'Harapan', '+628362772613', 'Sidoarjo, Candi, Jawa Timur 654321', NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `personal_access_tokens`
--

CREATE TABLE `personal_access_tokens` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `tokenable_type` varchar(255) NOT NULL,
  `tokenable_id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) NOT NULL,
  `token` varchar(64) NOT NULL,
  `abilities` text DEFAULT NULL,
  `last_used_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `produk`
--

CREATE TABLE `produk` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `nama` varchar(255) DEFAULT NULL,
  `kode` varchar(255) NOT NULL,
  `produk_qr` int(11) NOT NULL,
  `harga` int(30) NOT NULL,
  `stok` int(11) DEFAULT NULL,
  `gambar` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `produk`
--

INSERT INTO `produk` (`id`, `nama`, `kode`, `produk_qr`, `harga`, `stok`, `gambar`, `created_at`, `updated_at`) VALUES
(10, 'Sapu Lidi', 'KDP-0001', 21161099, 20000, 3, '1704291413_SAPULIDI.png', '2024-01-03 02:41:14', '2024-01-03 10:18:04'),
(11, 'Pel Lantai', 'KDP-0011', 94069909, 25000, 7, '1704291145_pel lantai.png', '2024-01-03 07:12:25', '2024-01-03 10:18:04'),
(12, 'Tempat Sampah Plastik', 'KDP-0012', 46048979, 6000, 15, '1704291170_tempat sampah.png', '2024-01-03 07:12:50', '2024-01-03 10:18:04');

-- --------------------------------------------------------

--
-- Table structure for table `rfq`
--

CREATE TABLE `rfq` (
  `kode_rfq` varchar(200) NOT NULL,
  `kode_vendor` int(11) NOT NULL,
  `tanggal_order` varchar(20) NOT NULL,
  `status` int(11) NOT NULL,
  `total_harga` double NOT NULL DEFAULT 0,
  `metode_pembayaran` int(11) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `rfq`
--

INSERT INTO `rfq` (`kode_rfq`, `kode_vendor`, `tanggal_order`, `status`, `total_harga`, `metode_pembayaran`, `created_at`, `updated_at`) VALUES
('KDRFQ-0001', 4, '2024-01-03 16:25:20', 5, 300000, 1, '2024-01-03 09:25:20', '2024-01-03 09:25:46'),
('KDRFQ-0002', 4, '2024-01-03 16:59:50', 5, 300000, 2, '2024-01-03 09:59:50', '2024-01-03 10:02:54'),
('KDRFQ-0003', 4, '2024-01-03 17:03:14', 5, 400000, 1, '2024-01-03 10:03:14', '2024-01-03 10:05:06'),
('KDRFQ-0004', 4, '2024-01-03 17:03:40', 5, 200000, 1, '2024-01-03 10:03:40', '2024-01-03 10:05:27'),
('KDRFQ-0005', 4, '2024-01-03 17:04:08', 5, 100000, 2, '2024-01-03 10:04:08', '2024-01-03 10:05:48'),
('KDRFQ-0006', 4, '2024-01-03 17:11:23', 5, 1000000, 2, '2024-01-03 10:11:23', '2024-01-03 10:12:10'),
('KDRFQ-0007', 4, '2024-01-03 17:12:31', 5, 10000000, 1, '2024-01-03 10:12:31', '2024-01-03 10:13:17');

-- --------------------------------------------------------

--
-- Table structure for table `rfq_list`
--

CREATE TABLE `rfq_list` (
  `kode_rfq_list` int(11) NOT NULL,
  `kode_rfq` varchar(20) NOT NULL,
  `kode_bahan` varchar(20) NOT NULL,
  `kuantitas` float NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `rfq_list`
--

INSERT INTO `rfq_list` (`kode_rfq_list`, `kode_rfq`, `kode_bahan`, `kuantitas`) VALUES
(27, 'KDRFQ-0001', '11', 100),
(28, 'KDRFQ-0002', '12', 100),
(29, 'KDRFQ-0003', '13', 100),
(30, 'KDRFQ-0004', '14', 100),
(31, 'KDRFQ-0005', '15', 100),
(32, 'KDRFQ-0006', '15', 1000),
(33, 'KDRFQ-0007', '15', 10000);

-- --------------------------------------------------------

--
-- Table structure for table `sq`
--

CREATE TABLE `sq` (
  `kode_sq` varchar(200) NOT NULL,
  `kode_pembeli` int(11) NOT NULL,
  `tanggal_order` varchar(20) NOT NULL,
  `status` int(11) NOT NULL,
  `total_harga` double NOT NULL,
  `metode_pembayaran` int(11) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `sq`
--

INSERT INTO `sq` (`kode_sq`, `kode_pembeli`, `tanggal_order`, `status`, `total_harga`, `metode_pembayaran`, `created_at`, `updated_at`) VALUES
('KDSL-0001', 10, '2024-01-03', 1, 0, 0, NULL, NULL),
('KDSL-0002', 11, '2024-01-03', 5, 625000, 2, NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `sq_list`
--

CREATE TABLE `sq_list` (
  `kode_sq_list` int(11) NOT NULL,
  `kode_sq` varchar(20) NOT NULL,
  `kode_produk` varchar(20) NOT NULL,
  `kuantitas` float NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `sq_list`
--

INSERT INTO `sq_list` (`kode_sq_list`, `kode_sq`, `kode_produk`, `kuantitas`) VALUES
(31, 'KDSL-0002', '12', 85),
(32, 'KDSL-0002', '10', 2),
(33, 'KDSL-0002', '11', 3);

-- --------------------------------------------------------

--
-- Table structure for table `temp_produce`
--

CREATE TABLE `temp_produce` (
  `id` int(11) NOT NULL,
  `kode_bom_list` int(11) NOT NULL,
  `quantity_order` float NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `password` varchar(255) NOT NULL,
  `remember_token` varchar(100) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `vendor`
--

CREATE TABLE `vendor` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `nama` varchar(100) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `kontak` varchar(15) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `alamat` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `vendor`
--

INSERT INTO `vendor` (`id`, `nama`, `kontak`, `alamat`, `created_at`, `updated_at`) VALUES
(4, 'PT. Ratata Break', '+6281233554132', 'Bandung, Cimahi, Jawa Barat 65435', NULL, NULL);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `bahan`
--
ALTER TABLE `bahan`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `nama` (`nama`);

--
-- Indexes for table `bom`
--
ALTER TABLE `bom`
  ADD PRIMARY KEY (`kode_bom`);

--
-- Indexes for table `bom_list`
--
ALTER TABLE `bom_list`
  ADD PRIMARY KEY (`kode_bom_list`);

--
-- Indexes for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `failed_jobs_uuid_unique` (`uuid`);

--
-- Indexes for table `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `mo`
--
ALTER TABLE `mo`
  ADD PRIMARY KEY (`kode_mo`);

--
-- Indexes for table `password_resets`
--
ALTER TABLE `password_resets`
  ADD KEY `password_resets_email_index` (`email`);

--
-- Indexes for table `pembeli`
--
ALTER TABLE `pembeli`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `personal_access_tokens`
--
ALTER TABLE `personal_access_tokens`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `personal_access_tokens_token_unique` (`token`),
  ADD KEY `personal_access_tokens_tokenable_type_tokenable_id_index` (`tokenable_type`,`tokenable_id`);

--
-- Indexes for table `produk`
--
ALTER TABLE `produk`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `nama_produk` (`nama`),
  ADD UNIQUE KEY `stok` (`stok`);

--
-- Indexes for table `rfq`
--
ALTER TABLE `rfq`
  ADD PRIMARY KEY (`kode_rfq`);

--
-- Indexes for table `rfq_list`
--
ALTER TABLE `rfq_list`
  ADD PRIMARY KEY (`kode_rfq_list`);

--
-- Indexes for table `sq`
--
ALTER TABLE `sq`
  ADD PRIMARY KEY (`kode_sq`);

--
-- Indexes for table `sq_list`
--
ALTER TABLE `sq_list`
  ADD PRIMARY KEY (`kode_sq_list`);

--
-- Indexes for table `temp_produce`
--
ALTER TABLE `temp_produce`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `users_email_unique` (`email`);

--
-- Indexes for table `vendor`
--
ALTER TABLE `vendor`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `bahan`
--
ALTER TABLE `bahan`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

--
-- AUTO_INCREMENT for table `bom_list`
--
ALTER TABLE `bom_list`
  MODIFY `kode_bom_list` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=22;

--
-- AUTO_INCREMENT for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `pembeli`
--
ALTER TABLE `pembeli`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT for table `personal_access_tokens`
--
ALTER TABLE `personal_access_tokens`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `produk`
--
ALTER TABLE `produk`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT for table `rfq_list`
--
ALTER TABLE `rfq_list`
  MODIFY `kode_rfq_list` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=34;

--
-- AUTO_INCREMENT for table `sq_list`
--
ALTER TABLE `sq_list`
  MODIFY `kode_sq_list` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=34;

--
-- AUTO_INCREMENT for table `temp_produce`
--
ALTER TABLE `temp_produce`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `vendor`
--
ALTER TABLE `vendor`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
