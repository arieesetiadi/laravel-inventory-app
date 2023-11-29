-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3306
-- Generation Time: Nov 23, 2023 at 12:16 PM
-- Server version: 8.0.30
-- PHP Version: 7.2.34

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `laravel_inventory_app`
--

-- --------------------------------------------------------

--
-- Table structure for table `barang`
--

CREATE TABLE `barang` (
  `id_barang` int UNSIGNED NOT NULL,
  `nama_barang` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `satuan` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `id_pemasok` int NOT NULL DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `barang`
--

INSERT INTO `barang` (`id_barang`, `nama_barang`, `satuan`, `id_pemasok`) VALUES
(1, 'Barang 1', 'Pcs', 14),
(2, 'Barang 2', 'Pcs', 11),
(3, 'Barang 3', 'Pcs', 2),
(4, 'Barang 4', 'Pcs', 3),
(5, 'Barang 5', 'Pcs', 6),
(6, 'Barang 6', 'Pcs', 1),
(7, 'Barang 7', 'Pcs', 5),
(8, 'Barang 8', 'Pcs', 7),
(9, 'Barang 9', 'Pcs', 4),
(10, 'Barang 10', 'Pcs', 11),
(11, 'Barang 11', 'Pcs', 15),
(12, 'Barang 12', 'Pcs', 9),
(13, 'Barang 13', 'Pcs', 7),
(14, 'Barang 14', 'Pcs', 3),
(15, 'Barang 15', 'Pcs', 15),
(16, 'Barang 16', 'Pcs', 1),
(17, 'Barang 17', 'Pcs', 2),
(18, 'Barang 18', 'Pcs', 14),
(19, 'Barang 19', 'Pcs', 3),
(20, 'Barang 20', 'Pcs', 9),
(21, 'Barang 21', 'Pcs', 15);

-- --------------------------------------------------------

--
-- Table structure for table `barang_keluar`
--

CREATE TABLE `barang_keluar` (
  `id_brng_keluar` int UNSIGNED NOT NULL,
  `id_barang` int NOT NULL,
  `tgl_keluar` date NOT NULL,
  `nama_barang` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `jumlah` int NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `barang_keluar`
--

INSERT INTO `barang_keluar` (`id_brng_keluar`, `id_barang`, `tgl_keluar`, `nama_barang`, `jumlah`) VALUES
(1, 3, '2023-11-21', 'Barang 3', 15),
(2, 4, '2023-11-19', 'Barang 4', 25),
(3, 4, '2023-11-18', 'Barang 4', 5),
(4, 19, '2023-11-20', 'Barang 19', 66),
(5, 1, '2023-11-21', 'Barang 1', 20),
(6, 1, '2023-11-22', 'Barang 1', 15);

-- --------------------------------------------------------

--
-- Table structure for table `barang_masuk`
--

CREATE TABLE `barang_masuk` (
  `id_brng_masuk` int UNSIGNED NOT NULL,
  `id_barang` int NOT NULL,
  `tgl_masuk` date NOT NULL,
  `nama_barang` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `nomor_nota` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `jumlah` int NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `barang_masuk`
--

INSERT INTO `barang_masuk` (`id_brng_masuk`, `id_barang`, `tgl_masuk`, `nama_barang`, `nomor_nota`, `jumlah`) VALUES
(1, 1, '2023-11-20', 'Barang 1', '001', 10),
(2, 2, '2023-11-21', 'Barang 2', '002', 15),
(3, 3, '2023-11-19', 'Barang 3', '003', 20),
(4, 2, '2023-11-18', 'Barang 2', '004', 23),
(5, 1, '2023-11-22', 'Barang 1', '0012012', 50);

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
(1, '2014_10_12_000000_create_users_table', 1),
(2, '2019_12_14_000001_create_personal_access_tokens_table', 1),
(3, '2023_11_19_025953_create_pemasoks_table', 1),
(4, '2023_11_19_060452_create_barangs_table', 1),
(5, '2023_11_19_115957_create_barang_masuks_table', 1),
(6, '2023_11_20_071616_create_barang_keluars_table', 1),
(7, '2023_11_20_205239_create_stok_barangs_table', 1);

-- --------------------------------------------------------

--
-- Table structure for table `pemasok`
--

CREATE TABLE `pemasok` (
  `id_pemasok` int UNSIGNED NOT NULL,
  `nama_pemasok` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `telp` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `alamat` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `pemasok`
--

INSERT INTO `pemasok` (`id_pemasok`, `nama_pemasok`, `telp`, `alamat`) VALUES
(1, 'Pemasok 1', '082123456781', 'Denpasar, Bali, Indonesia'),
(2, 'Pemasok 2', '082123456782', 'Denpasar, Bali, Indonesia'),
(3, 'Pemasok 3', '082123456783', 'Denpasar, Bali, Indonesia'),
(4, 'Pemasok 4', '082123456784', 'Denpasar, Bali, Indonesia'),
(5, 'Pemasok 5', '082123456785', 'Denpasar, Bali, Indonesia'),
(6, 'Pemasok 6', '082123456786', 'Denpasar, Bali, Indonesia'),
(7, 'Pemasok 7', '082123456787', 'Denpasar, Bali, Indonesia'),
(8, 'Pemasok 8', '082123456788', 'Denpasar, Bali, Indonesia'),
(9, 'Pemasok 9', '082123456789', 'Denpasar, Bali, Indonesia'),
(10, 'Pemasok 10', '0821234567810', 'Denpasar, Bali, Indonesia'),
(11, 'Pemasok 11', '0821234567811', 'Denpasar, Bali, Indonesia'),
(12, 'Pemasok 12', '0821234567812', 'Denpasar, Bali, Indonesia'),
(13, 'Pemasok 13', '0821234567813', 'Denpasar, Bali, Indonesia'),
(14, 'Pemasok 14', '0821234567814', 'Denpasar, Bali, Indonesia'),
(15, 'Pemasok 15', '0821234567815', 'Denpasar, Bali, Indonesia');

-- --------------------------------------------------------

--
-- Table structure for table `personal_access_tokens`
--

CREATE TABLE `personal_access_tokens` (
  `id` bigint UNSIGNED NOT NULL,
  `tokenable_type` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `tokenable_id` bigint UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(64) COLLATE utf8mb4_unicode_ci NOT NULL,
  `abilities` text COLLATE utf8mb4_unicode_ci,
  `last_used_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `stok_barang`
--

CREATE TABLE `stok_barang` (
  `id_stok_barang` int UNSIGNED NOT NULL,
  `id_barang` int NOT NULL,
  `jumlah` int NOT NULL,
  `nama_barang` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `stok_barang`
--

INSERT INTO `stok_barang` (`id_stok_barang`, `id_barang`, `jumlah`, `nama_barang`) VALUES
(1, 1, 140, 'Barang 1'),
(2, 2, 138, 'Barang 2'),
(3, 3, 105, 'Barang 3'),
(4, 4, 70, 'Barang 4'),
(5, 5, 100, 'Barang 5'),
(6, 6, 100, 'Barang 6'),
(7, 7, 100, 'Barang 7'),
(8, 8, 100, 'Barang 8'),
(9, 9, 100, 'Barang 9'),
(10, 10, 100, 'Barang 10'),
(11, 11, 100, 'Barang 11'),
(12, 12, 2, 'Barang 12'),
(13, 13, 100, 'Barang 13'),
(14, 14, 4, 'Barang 14'),
(15, 15, 100, 'Barang 15'),
(16, 16, 100, 'Barang 16'),
(17, 17, 100, 'Barang 17'),
(18, 18, 5, 'Barang 18'),
(19, 19, 34, 'Barang 19'),
(20, 20, 100, 'Barang 20'),
(21, 21, 2, 'Barang 21');

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE `user` (
  `id_user` int UNSIGNED NOT NULL,
  `username` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `password` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `nama_user` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `role` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`id_user`, `username`, `password`, `nama_user`, `role`) VALUES
(1, 'owner', '$2y$10$mHAYSatvzB6M2V3aGznI/ewIboRN/bW8Q8ARglw9n27oCHBD9yd5m', 'Robert Downey', 'Owner'),
(2, 'admin', '$2y$10$3r6KXifm.6oIGSr8mrD1juoSckGvKU9./xndkmwzXUY13X6XbgABS', 'Martin Emerson', 'Admin'),
(3, 'sales', '$2y$10$oMuHvDGbFkCIYCvcT2qRcOc0KMZNQ5tVYcMIQBRb1n98cSAYNNt7K', 'Roger Federer', 'Sales'),
(4, 'petugasgudang', '$2y$10$MzvPhfYPfgv3eWwbsbYyve4BKV7jtHKHLJLbgqYFKYWUzTip0HK92', 'Taylor Otwell', 'Petugas Gudang');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `barang`
--
ALTER TABLE `barang`
  ADD PRIMARY KEY (`id_barang`);

--
-- Indexes for table `barang_keluar`
--
ALTER TABLE `barang_keluar`
  ADD PRIMARY KEY (`id_brng_keluar`);

--
-- Indexes for table `barang_masuk`
--
ALTER TABLE `barang_masuk`
  ADD PRIMARY KEY (`id_brng_masuk`);

--
-- Indexes for table `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `pemasok`
--
ALTER TABLE `pemasok`
  ADD PRIMARY KEY (`id_pemasok`);

--
-- Indexes for table `personal_access_tokens`
--
ALTER TABLE `personal_access_tokens`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `personal_access_tokens_token_unique` (`token`),
  ADD KEY `personal_access_tokens_tokenable_type_tokenable_id_index` (`tokenable_type`,`tokenable_id`);

--
-- Indexes for table `stok_barang`
--
ALTER TABLE `stok_barang`
  ADD PRIMARY KEY (`id_stok_barang`);

--
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`id_user`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `barang`
--
ALTER TABLE `barang`
  MODIFY `id_barang` int UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=22;

--
-- AUTO_INCREMENT for table `barang_keluar`
--
ALTER TABLE `barang_keluar`
  MODIFY `id_brng_keluar` int UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `barang_masuk`
--
ALTER TABLE `barang_masuk`
  MODIFY `id_brng_masuk` int UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `pemasok`
--
ALTER TABLE `pemasok`
  MODIFY `id_pemasok` int UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

--
-- AUTO_INCREMENT for table `personal_access_tokens`
--
ALTER TABLE `personal_access_tokens`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `stok_barang`
--
ALTER TABLE `stok_barang`
  MODIFY `id_stok_barang` int UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=22;

--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
  MODIFY `id_user` int UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
