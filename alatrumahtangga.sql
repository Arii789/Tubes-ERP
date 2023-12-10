-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Dec 10, 2023 at 12:34 PM
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
  `harga` int(30) NOT NULL,
  `stok` int(11) DEFAULT NULL,
  `gambar` varchar(255) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `bahan`
--

INSERT INTO `bahan` (`id`, `nama`, `kode`, `harga`, `stok`, `gambar`, `created_at`, `updated_at`) VALUES
(3, 'plastik', 'plt', 500, 8, '1698323593_lb.jpg', '2023-10-26 05:33:13', '2023-11-27 09:34:49'),
(4, 'Tali', 'T', 250, 5, '1698324424_tali.jpg', '2023-10-26 05:47:04', '2023-11-27 09:42:15'),
(5, 'Gagang Sapu dan Pel', 'GSP', 5000, 298, '1698652334_gagang sapu dan pel.jpeg', '2023-10-30 00:52:14', '2023-12-01 06:23:26');

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
('1', '6', 2, 10000),
('2', '4', 5, 6000),
('4', '5', 2, 1000);

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
(2, '1', '5', 2, 'Butir'),
(4, '4', '3', 2, 'Pcs'),
(5, '2', '4', 4, 'Pcs'),
(6, '2', '5', 1, 'Pcs');

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
(6, '2023_10_20_143836_create_bahans_table', 2);

-- --------------------------------------------------------

--
-- Table structure for table `mo`
--

CREATE TABLE `mo` (
  `kode_mo` varchar(20) NOT NULL,
  `kode_bom` varchar(20) NOT NULL,
  `kuantitas` float NOT NULL,
  `tanggal` varchar(20) NOT NULL,
  `status` int(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `mo`
--

INSERT INTO `mo` (`kode_mo`, `kode_bom`, `kuantitas`, `tanggal`, `status`) VALUES
('MO-0001', '4', 2, '2023/11/27', 3),
('MO-0002', '4', 1, '2023/11/04', 5),
('MO-0003', '4', 20, '2023/11/27', 3),
('MO-0004', '2', 5, '2023/11/27', 3),
('MO-0008', '1', 10, '2023/11/20', 3);

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
(1, 'Agus Setiawan', '0894372839422', 'Dsn Jetak RT 03 RW 02 Ds Karangjati Kec Pandaan, Pasuruan, Jawa Timur', NULL, NULL),
(3, 'Muhammad Reza', '0895373849244', 'Jln. Raya Sigura Gura No.40 Malang', NULL, NULL),
(5, 'Soolikin', '087654321234', 'Mojokerto, jawa timur, indonesia', NULL, NULL),
(6, 'Cece Tompel', '0812345676543', 'Surabaya, jawa timur, indonesia', NULL, NULL);

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
  `kode` varchar(30) NOT NULL,
  `harga` int(30) NOT NULL,
  `stok` int(11) DEFAULT NULL,
  `gambar` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `produk`
--

INSERT INTO `produk` (`id`, `nama`, `kode`, `harga`, `stok`, `gambar`, `created_at`, `updated_at`) VALUES
(4, 'Sapu Lidi', 'SL', 2000, -12, '1698074102_ITN.jpg', NULL, NULL),
(5, 'Tempat Sampah', 'TS', 7000, -29, '1698323065_TEMPAT-SAMPAH.jpg', NULL, NULL),
(6, 'Pel Lantai', 'PL', 15000, 4, '1698652038_pel.jpeg', NULL, NULL);

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
  `metode_pembayaran` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `rfq`
--

INSERT INTO `rfq` (`kode_rfq`, `kode_vendor`, `tanggal_order`, `status`, `total_harga`, `metode_pembayaran`) VALUES
('A011', 2, '2023-12-01', 5, 10000, 1);

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
(8, 'A011', '5', 2);

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
  `metode_pembayaran` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `sq`
--

INSERT INTO `sq` (`kode_sq`, `kode_pembeli`, `tanggal_order`, `status`, `total_harga`, `metode_pembayaran`) VALUES
('A001', 6, '2023-12-10', 2, 0, 0),
('A012', 1, '2023-12-10', 5, 241000, 2),
('A013', 6, '2023-12-10', 1, 217000, 0),
('S-001', 1, '2023-01-07', 5, 30000, 1),
('S-003', 4, '2023-01-10', 5, 80000, 1);

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
(8, 'S-001', '3', 10),
(20, 'S-003', '4', 10),
(21, 'S-003', '3', 10),
(25, 'A012', '5', 31),
(26, 'A012', '4', 12),
(28, 'A013', '5', 31);

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
(2, 'PT Lancar Jaya', '082321321321', 'Jl. anggrek', NULL, NULL),
(3, 'PT Sejahtera Abadi', '082123123123', 'Jl. mawar', NULL, NULL);

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
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `bom_list`
--
ALTER TABLE `bom_list`
  MODIFY `kode_bom_list` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `pembeli`
--
ALTER TABLE `pembeli`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `personal_access_tokens`
--
ALTER TABLE `personal_access_tokens`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `produk`
--
ALTER TABLE `produk`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `rfq_list`
--
ALTER TABLE `rfq_list`
  MODIFY `kode_rfq_list` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `sq_list`
--
ALTER TABLE `sq_list`
  MODIFY `kode_sq_list` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=29;

--
-- AUTO_INCREMENT for table `temp_produce`
--
ALTER TABLE `temp_produce`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `vendor`
--
ALTER TABLE `vendor`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
