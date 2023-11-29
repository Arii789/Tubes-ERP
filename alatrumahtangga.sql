-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Waktu pembuatan: 28 Nov 2023 pada 09.33
-- Versi server: 10.4.28-MariaDB
-- Versi PHP: 8.2.4

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
-- Struktur dari tabel `bahan`
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
-- Dumping data untuk tabel `bahan`
--

INSERT INTO `bahan` (`id`, `nama`, `kode`, `harga`, `stok`, `gambar`, `created_at`, `updated_at`) VALUES
(3, 'plastik', 'plt', 500, 8, '1698323593_lb.jpg', '2023-10-26 05:33:13', '2023-11-27 09:34:49'),
(4, 'Tali', 'T', 250, 5, '1698324424_tali.jpg', '2023-10-26 05:47:04', '2023-11-27 09:42:15'),
(5, 'Gagang Sapu dan Pel', 'GSP', 5000, 296, '1698652334_gagang sapu dan pel.jpeg', '2023-10-30 00:52:14', '2023-11-20 07:59:48');

-- --------------------------------------------------------

--
-- Struktur dari tabel `bom`
--

CREATE TABLE `bom` (
  `kode_bom` varchar(30) NOT NULL,
  `kode_produk` varchar(20) NOT NULL,
  `kuantitas` float NOT NULL,
  `total_harga` float NOT NULL DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data untuk tabel `bom`
--

INSERT INTO `bom` (`kode_bom`, `kode_produk`, `kuantitas`, `total_harga`) VALUES
('1', '6', 2, 10000),
('2', '4', 5, 6000),
('4', '5', 2, 1000);

-- --------------------------------------------------------

--
-- Struktur dari tabel `bom_list`
--

CREATE TABLE `bom_list` (
  `kode_bom_list` int(11) NOT NULL,
  `kode_bom` varchar(100) NOT NULL,
  `kode_bahan` varchar(20) NOT NULL,
  `kuantitas` float NOT NULL,
  `satuan` varchar(15) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data untuk tabel `bom_list`
--

INSERT INTO `bom_list` (`kode_bom_list`, `kode_bom`, `kode_bahan`, `kuantitas`, `satuan`) VALUES
(2, '1', '5', 2, 'Butir'),
(4, '4', '3', 2, 'Pcs'),
(5, '2', '4', 4, 'Pcs'),
(6, '2', '5', 1, 'Pcs');

-- --------------------------------------------------------

--
-- Struktur dari tabel `failed_jobs`
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
-- Struktur dari tabel `migrations`
--

CREATE TABLE `migrations` (
  `id` int(10) UNSIGNED NOT NULL,
  `migration` varchar(255) NOT NULL,
  `batch` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data untuk tabel `migrations`
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
-- Struktur dari tabel `mo`
--

CREATE TABLE `mo` (
  `kode_mo` varchar(20) NOT NULL,
  `kode_bom` varchar(20) NOT NULL,
  `kuantitas` float NOT NULL,
  `tanggal` varchar(20) NOT NULL,
  `status` int(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data untuk tabel `mo`
--

INSERT INTO `mo` (`kode_mo`, `kode_bom`, `kuantitas`, `tanggal`, `status`) VALUES
('MO-0001', '4', 2, '2023/11/27', 3),
('MO-0002', '4', 1, '2023/11/04', 5),
('MO-0003', '4', 20, '2023/11/27', 3),
('MO-0004', '2', 5, '2023/11/27', 3),
('MO-0008', '1', 10, '2023/11/20', 3);

-- --------------------------------------------------------

--
-- Struktur dari tabel `password_resets`
--

CREATE TABLE `password_resets` (
  `email` varchar(255) NOT NULL,
  `token` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Struktur dari tabel `personal_access_tokens`
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
-- Struktur dari tabel `produk`
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
-- Dumping data untuk tabel `produk`
--

INSERT INTO `produk` (`id`, `nama`, `kode`, `harga`, `stok`, `gambar`, `created_at`, `updated_at`) VALUES
(4, 'Sapu Lidi', 'SL', 2000, NULL, '1698074102_ITN.jpg', NULL, NULL),
(5, 'Tempat Sampah', 'TS', 7000, 2, '1698323065_TEMPAT-SAMPAH.jpg', NULL, NULL),
(6, 'Pel Lantai', 'PL', 15000, 4, '1698652038_pel.jpeg', NULL, NULL);

-- --------------------------------------------------------

--
-- Struktur dari tabel `rfq`
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
-- Dumping data untuk tabel `rfq`
--

INSERT INTO `rfq` (`kode_rfq`, `kode_vendor`, `tanggal_order`, `status`, `total_harga`, `metode_pembayaran`) VALUES
('PO-001', 2, '2023-11-19', 5, 5000, 2),
('PO-002', 3, '2023-11-19', 4, 1000, 0),
('PO-003', 2, '2023-11-20', 2, 1250, 0),
('PO-005', 2, '2023-11-22', 1, 0, 0);

-- --------------------------------------------------------

--
-- Struktur dari tabel `rfq_list`
--

CREATE TABLE `rfq_list` (
  `kode_rfq_list` int(11) NOT NULL,
  `kode_rfq` varchar(20) NOT NULL,
  `kode_bahan` varchar(20) NOT NULL,
  `kuantitas` float NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data untuk tabel `rfq_list`
--

INSERT INTO `rfq_list` (`kode_rfq_list`, `kode_rfq`, `kode_bahan`, `kuantitas`) VALUES
(1, 'PO-001', '3', 10),
(2, 'PO-002', '3', 2),
(6, 'PO-003', '4', 5);

-- --------------------------------------------------------

--
-- Struktur dari tabel `temp_produce`
--

CREATE TABLE `temp_produce` (
  `id` int(11) NOT NULL,
  `kode_bom_list` int(11) NOT NULL,
  `quantity_order` float NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Struktur dari tabel `users`
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
-- Struktur dari tabel `vendor`
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
-- Dumping data untuk tabel `vendor`
--

INSERT INTO `vendor` (`id`, `nama`, `kontak`, `alamat`, `created_at`, `updated_at`) VALUES
(2, 'PT Lancar Jaya', '082321321321', 'Jl. anggrek', NULL, NULL),
(3, 'PT Sejahtera Abadi', '082123123123', 'Jl. mawar', NULL, NULL);

--
-- Indexes for dumped tables
--

--
-- Indeks untuk tabel `bahan`
--
ALTER TABLE `bahan`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `nama` (`nama`);

--
-- Indeks untuk tabel `bom`
--
ALTER TABLE `bom`
  ADD PRIMARY KEY (`kode_bom`);

--
-- Indeks untuk tabel `bom_list`
--
ALTER TABLE `bom_list`
  ADD PRIMARY KEY (`kode_bom_list`);

--
-- Indeks untuk tabel `failed_jobs`
--
ALTER TABLE `failed_jobs`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `failed_jobs_uuid_unique` (`uuid`);

--
-- Indeks untuk tabel `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `mo`
--
ALTER TABLE `mo`
  ADD PRIMARY KEY (`kode_mo`);

--
-- Indeks untuk tabel `password_resets`
--
ALTER TABLE `password_resets`
  ADD KEY `password_resets_email_index` (`email`);

--
-- Indeks untuk tabel `personal_access_tokens`
--
ALTER TABLE `personal_access_tokens`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `personal_access_tokens_token_unique` (`token`),
  ADD KEY `personal_access_tokens_tokenable_type_tokenable_id_index` (`tokenable_type`,`tokenable_id`);

--
-- Indeks untuk tabel `produk`
--
ALTER TABLE `produk`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `nama_produk` (`nama`),
  ADD UNIQUE KEY `stok` (`stok`);

--
-- Indeks untuk tabel `rfq`
--
ALTER TABLE `rfq`
  ADD PRIMARY KEY (`kode_rfq`);

--
-- Indeks untuk tabel `rfq_list`
--
ALTER TABLE `rfq_list`
  ADD PRIMARY KEY (`kode_rfq_list`);

--
-- Indeks untuk tabel `temp_produce`
--
ALTER TABLE `temp_produce`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `users_email_unique` (`email`);

--
-- Indeks untuk tabel `vendor`
--
ALTER TABLE `vendor`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT untuk tabel yang dibuang
--

--
-- AUTO_INCREMENT untuk tabel `bahan`
--
ALTER TABLE `bahan`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT untuk tabel `bom_list`
--
ALTER TABLE `bom_list`
  MODIFY `kode_bom_list` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT untuk tabel `failed_jobs`
--
ALTER TABLE `failed_jobs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT untuk tabel `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT untuk tabel `personal_access_tokens`
--
ALTER TABLE `personal_access_tokens`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT untuk tabel `produk`
--
ALTER TABLE `produk`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT untuk tabel `rfq_list`
--
ALTER TABLE `rfq_list`
  MODIFY `kode_rfq_list` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT untuk tabel `temp_produce`
--
ALTER TABLE `temp_produce`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT untuk tabel `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT untuk tabel `vendor`
--
ALTER TABLE `vendor`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
