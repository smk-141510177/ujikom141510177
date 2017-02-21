-- phpMyAdmin SQL Dump
-- version 4.6.4
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3306
-- Generation Time: Feb 10, 2017 at 08:16 AM
-- Server version: 10.1.19-MariaDB
-- PHP Version: 7.0.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `penggajian`
--

-- --------------------------------------------------------

--
-- Table structure for table `golongans`
--

CREATE TABLE `golongans` (
  `id` int(10) UNSIGNED NOT NULL,
  `kode_g` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `nama_g` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `besar_uang` int(11) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `golongans`
--

INSERT INTO `golongans` (`id`, `kode_g`, `nama_g`, `besar_uang`, `created_at`, `updated_at`) VALUES
(1, '1234567', 'Logistik', 1000, '2017-02-09 18:19:53', '2017-02-09 18:19:53'),
(2, '1234568', 'SDM', 1000, '2017-02-09 18:20:12', '2017-02-09 18:20:12');

-- --------------------------------------------------------

--
-- Table structure for table `jabatans`
--

CREATE TABLE `jabatans` (
  `id` int(10) UNSIGNED NOT NULL,
  `kode_j` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `nama_j` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `besar_uang` int(11) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `jabatans`
--

INSERT INTO `jabatans` (`id`, `kode_j`, `nama_j`, `besar_uang`, `created_at`, `updated_at`) VALUES
(1, '123465', 'pegawai', 1000, '2017-02-09 18:23:41', '2017-02-09 18:23:41'),
(2, '123464', 'OB', 1000, '2017-02-09 18:23:50', '2017-02-09 18:23:50');

-- --------------------------------------------------------

--
-- Table structure for table `kategori_lemburs`
--

CREATE TABLE `kategori_lemburs` (
  `id` int(10) UNSIGNED NOT NULL,
  `kode_l` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `jabatan_id` int(10) UNSIGNED NOT NULL,
  `golongan_id` int(10) UNSIGNED NOT NULL,
  `besar_uang` int(11) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `kategori_lemburs`
--

INSERT INTO `kategori_lemburs` (`id`, `kode_l`, `jabatan_id`, `golongan_id`, `besar_uang`, `created_at`, `updated_at`) VALUES
(1, '1234560', 1, 1, 1000, '2017-02-09 20:10:33', '2017-02-09 20:10:33'),
(2, '12345602', 1, 1, 1000, '2017-02-09 23:01:17', '2017-02-09 23:01:17'),
(3, '1234560221', 2, 2, 1000, '2017-02-09 23:12:04', '2017-02-09 23:12:04'),
(4, '123456021', 2, 1, 1000, '2017-02-10 00:03:17', '2017-02-10 00:03:17');

-- --------------------------------------------------------

--
-- Table structure for table `lembur_pegawais`
--

CREATE TABLE `lembur_pegawais` (
  `id` int(10) UNSIGNED NOT NULL,
  `kode_lembur_id` int(10) UNSIGNED NOT NULL,
  `pegawai_id` int(10) UNSIGNED NOT NULL,
  `Jumlah_jam` int(11) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `lembur_pegawais`
--

INSERT INTO `lembur_pegawais` (`id`, `kode_lembur_id`, `pegawai_id`, `Jumlah_jam`, `created_at`, `updated_at`) VALUES
(11, 4, 2, 2, '2017-02-10 00:10:29', '2017-02-10 00:10:29');

-- --------------------------------------------------------

--
-- Table structure for table `migrations`
--

CREATE TABLE `migrations` (
  `id` int(10) UNSIGNED NOT NULL,
  `migration` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `batch` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `migrations`
--

INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES
(1, '2014_10_12_000000_create_users_table', 1),
(2, '2014_10_12_100000_create_password_resets_table', 1),
(3, '2017_01_27_083340_create_golongans_table', 1),
(4, '2017_01_27_083547_create_jabatans_table', 1),
(5, '2017_01_27_083815_create_kategori_lemburs_table', 1),
(6, '2017_01_27_084243_create_tunjangans_table', 1),
(7, '2017_01_27_085002_create_pegawais_table', 1),
(8, '2017_01_27_085358_create_lembur_pegawais_table', 1),
(9, '2017_01_27_085847_create_tunjangan_pegawais_table', 1),
(10, '2017_01_28_052144_create_penggajians_table', 1);

-- --------------------------------------------------------

--
-- Table structure for table `password_resets`
--

CREATE TABLE `password_resets` (
  `email` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `token` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `pegawais`
--

CREATE TABLE `pegawais` (
  `id` int(10) UNSIGNED NOT NULL,
  `nip` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `user_id` int(10) UNSIGNED NOT NULL,
  `jabatan_id` int(10) UNSIGNED NOT NULL,
  `golongan_id` int(10) UNSIGNED NOT NULL,
  `photo` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `pegawais`
--

INSERT INTO `pegawais` (`id`, `nip`, `user_id`, `jabatan_id`, `golongan_id`, `photo`, `created_at`, `updated_at`) VALUES
(2, '141510177', 3, 2, 1, 'dat.png', '2017-02-09 22:21:20', '2017-02-09 22:36:04'),
(3, '141510111', 4, 1, 1, 'aa.png', '2017-02-09 22:46:56', '2017-02-09 22:46:56');

-- --------------------------------------------------------

--
-- Table structure for table `penggajians`
--

CREATE TABLE `penggajians` (
  `id` int(10) UNSIGNED NOT NULL,
  `tunjangan_pegawai_id` int(10) UNSIGNED NOT NULL,
  `jumlah_jam_lembur` int(11) NOT NULL,
  `jumlah_uang_lembur` int(11) NOT NULL,
  `gaji_pokok` int(11) NOT NULL,
  `tanggal_pengambilan` date NOT NULL,
  `status_pengambilan` tinyint(1) NOT NULL DEFAULT '0',
  `petugas_penerima` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `tunjangans`
--

CREATE TABLE `tunjangans` (
  `id` int(10) UNSIGNED NOT NULL,
  `kode_t` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `jabatan_id` int(10) UNSIGNED NOT NULL,
  `golongan_id` int(10) UNSIGNED NOT NULL,
  `status` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `jumlah_anak` int(11) NOT NULL,
  `besar_uang` int(11) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `tunjangan_pegawais`
--

CREATE TABLE `tunjangan_pegawais` (
  `id` int(10) UNSIGNED NOT NULL,
  `kode_tunjangan_id` int(10) UNSIGNED NOT NULL,
  `pegawai_id` int(10) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(10) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `type_user` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `password` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `remember_token` varchar(100) COLLATE utf8_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `name`, `type_user`, `email`, `password`, `remember_token`, `created_at`, `updated_at`) VALUES
(1, 'Asep', 'Admin', 'asep@g.com', '$2y$10$QG3Y0kBjkpaFYf6jXMbGXeoqMkWswIkSzSCbXI4naX4Cu71o.2t7q', 'Wc2cH2xiBTHvt2TWBlL0QDzH7uwwP7yyLgLMrCg1CfmPiLhL9lDRBPPD2Bee', '2017-02-09 17:54:50', '2017-02-09 22:32:03'),
(3, 'Rizal', 'karyawan', 'rizal@g.g', '$2y$10$RHISlwvMONVJr/n/cUj01eKmyPjBgytjvTCoeg5KZ/AABiEr5ZJDa', NULL, '2017-02-09 22:21:20', '2017-02-09 22:21:20'),
(4, 'Dickymuhammad', 'karyawan', 'diky@g.g', '$2y$10$//3fu9e4qL0mJN2TL1qrjuOUiO6OIsz6cl39vmfhBsMTNASSon66m', NULL, '2017-02-09 22:46:56', '2017-02-09 22:46:56');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `golongans`
--
ALTER TABLE `golongans`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `golongans_kode_g_unique` (`kode_g`);

--
-- Indexes for table `jabatans`
--
ALTER TABLE `jabatans`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `jabatans_kode_j_unique` (`kode_j`);

--
-- Indexes for table `kategori_lemburs`
--
ALTER TABLE `kategori_lemburs`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `kategori_lemburs_kode_l_unique` (`kode_l`),
  ADD KEY `kategori_lemburs_jabatan_id_foreign` (`jabatan_id`),
  ADD KEY `kategori_lemburs_golongan_id_foreign` (`golongan_id`);

--
-- Indexes for table `lembur_pegawais`
--
ALTER TABLE `lembur_pegawais`
  ADD PRIMARY KEY (`id`),
  ADD KEY `lembur_pegawais_kode_limbur_id_foreign` (`kode_lembur_id`),
  ADD KEY `lembur_pegawais_pegawai_id_foreign` (`pegawai_id`);

--
-- Indexes for table `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `password_resets`
--
ALTER TABLE `password_resets`
  ADD KEY `password_resets_email_index` (`email`),
  ADD KEY `password_resets_token_index` (`token`);

--
-- Indexes for table `pegawais`
--
ALTER TABLE `pegawais`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `pegawais_nip_unique` (`nip`),
  ADD KEY `pegawais_user_id_foreign` (`user_id`),
  ADD KEY `pegawais_jabatan_id_foreign` (`jabatan_id`),
  ADD KEY `pegawais_golongan_id_foreign` (`golongan_id`);

--
-- Indexes for table `penggajians`
--
ALTER TABLE `penggajians`
  ADD PRIMARY KEY (`id`),
  ADD KEY `penggajians_tunjangan_pegawai_id_foreign` (`tunjangan_pegawai_id`);

--
-- Indexes for table `tunjangans`
--
ALTER TABLE `tunjangans`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `tunjangans_kode_t_unique` (`kode_t`),
  ADD KEY `tunjangans_jabatan_id_foreign` (`jabatan_id`),
  ADD KEY `tunjangans_golongan_id_foreign` (`golongan_id`);

--
-- Indexes for table `tunjangan_pegawais`
--
ALTER TABLE `tunjangan_pegawais`
  ADD PRIMARY KEY (`id`),
  ADD KEY `tunjangan_pegawais_kode_tunjangan_id_foreign` (`kode_tunjangan_id`),
  ADD KEY `tunjangan_pegawais_pegawai_id_foreign` (`pegawai_id`);

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
-- AUTO_INCREMENT for table `golongans`
--
ALTER TABLE `golongans`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT for table `jabatans`
--
ALTER TABLE `jabatans`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT for table `kategori_lemburs`
--
ALTER TABLE `kategori_lemburs`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
--
-- AUTO_INCREMENT for table `lembur_pegawais`
--
ALTER TABLE `lembur_pegawais`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;
--
-- AUTO_INCREMENT for table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;
--
-- AUTO_INCREMENT for table `pegawais`
--
ALTER TABLE `pegawais`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
--
-- AUTO_INCREMENT for table `penggajians`
--
ALTER TABLE `penggajians`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `tunjangans`
--
ALTER TABLE `tunjangans`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `tunjangan_pegawais`
--
ALTER TABLE `tunjangan_pegawais`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
--
-- Constraints for dumped tables
--

--
-- Constraints for table `kategori_lemburs`
--
ALTER TABLE `kategori_lemburs`
  ADD CONSTRAINT `kategori_lemburs_golongan_id_foreign` FOREIGN KEY (`golongan_id`) REFERENCES `golongans` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `kategori_lemburs_jabatan_id_foreign` FOREIGN KEY (`jabatan_id`) REFERENCES `jabatans` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `lembur_pegawais`
--
ALTER TABLE `lembur_pegawais`
  ADD CONSTRAINT `lembur_pegawais_kode_limbur_id_foreign` FOREIGN KEY (`kode_lembur_id`) REFERENCES `kategori_lemburs` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `lembur_pegawais_pegawai_id_foreign` FOREIGN KEY (`pegawai_id`) REFERENCES `pegawais` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `pegawais`
--
ALTER TABLE `pegawais`
  ADD CONSTRAINT `pegawais_golongan_id_foreign` FOREIGN KEY (`golongan_id`) REFERENCES `golongans` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `pegawais_jabatan_id_foreign` FOREIGN KEY (`jabatan_id`) REFERENCES `jabatans` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `pegawais_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `penggajians`
--
ALTER TABLE `penggajians`
  ADD CONSTRAINT `penggajians_tunjangan_pegawai_id_foreign` FOREIGN KEY (`tunjangan_pegawai_id`) REFERENCES `tunjangan_pegawais` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `tunjangans`
--
ALTER TABLE `tunjangans`
  ADD CONSTRAINT `tunjangans_golongan_id_foreign` FOREIGN KEY (`golongan_id`) REFERENCES `golongans` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `tunjangans_jabatan_id_foreign` FOREIGN KEY (`jabatan_id`) REFERENCES `jabatans` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `tunjangan_pegawais`
--
ALTER TABLE `tunjangan_pegawais`
  ADD CONSTRAINT `tunjangan_pegawais_kode_tunjangan_id_foreign` FOREIGN KEY (`kode_tunjangan_id`) REFERENCES `tunjangans` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `tunjangan_pegawais_pegawai_id_foreign` FOREIGN KEY (`pegawai_id`) REFERENCES `pegawais` (`id`) ON DELETE CASCADE;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
