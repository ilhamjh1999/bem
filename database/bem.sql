-- phpMyAdmin SQL Dump
-- version 5.0.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Nov 21, 2021 at 02:41 PM
-- Server version: 10.4.11-MariaDB
-- PHP Version: 7.4.2

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `bem`
--

-- --------------------------------------------------------

--
-- Table structure for table `failed_jobs`
--

CREATE TABLE `failed_jobs` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `uuid` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `connection` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `queue` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `payload` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `exception` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `failed_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `kategori`
--

CREATE TABLE `kategori` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `nama_ormawa` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `kategori`
--

INSERT INTO `kategori` (`id`, `created_at`, `updated_at`, `nama_ormawa`) VALUES
(2, '2021-10-24 18:47:01', '2021-10-24 18:47:01', 'IKMI'),
(3, '2021-10-24 18:47:07', '2021-10-24 18:47:07', 'HIMATIF'),
(4, '2021-10-24 18:47:16', '2021-10-24 18:47:16', 'KARATE'),
(5, '2021-10-29 23:07:34', '2021-10-29 23:07:34', 'Basket');

-- --------------------------------------------------------

--
-- Table structure for table `laporan_kegiatan`
--

CREATE TABLE `laporan_kegiatan` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `nama` varchar(30) COLLATE utf8mb4_unicode_ci NOT NULL,
  `jabatan` varchar(30) COLLATE utf8mb4_unicode_ci NOT NULL,
  `nama_ormawa` varchar(30) COLLATE utf8mb4_unicode_ci NOT NULL,
  `nama_laporan_kegiatan` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `lampiran` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `status_bem` enum('Diterima','Ditolak','Menunggu') COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'Menunggu',
  `status_dpm` enum('Ditolak','Menunggu','Diterima','') COLLATE utf8mb4_unicode_ci NOT NULL,
  `status_kemahasiswaan` enum('Ditolak','Menunggu','Diterima','') COLLATE utf8mb4_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `laporan_kegiatan`
--

INSERT INTO `laporan_kegiatan` (`id`, `created_at`, `updated_at`, `nama`, `jabatan`, `nama_ormawa`, `nama_laporan_kegiatan`, `lampiran`, `status_bem`, `status_dpm`, `status_kemahasiswaan`) VALUES
(3, '2021-10-24 18:29:49', '2021-10-24 18:30:47', '1 Hari 1 Malam', '3123', '312321', '312312', 'LaporanKegiatan-2021-10-25-304244b2c14093ffb0ec5e4122e6011e.pdf', 'Menunggu', 'Ditolak', 'Ditolak');

-- --------------------------------------------------------

--
-- Table structure for table `laporan_pertanggungjawaban`
--

CREATE TABLE `laporan_pertanggungjawaban` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `nama` varchar(30) COLLATE utf8mb4_unicode_ci NOT NULL,
  `jabatan` varchar(30) COLLATE utf8mb4_unicode_ci NOT NULL,
  `nama_ormawa` varchar(30) COLLATE utf8mb4_unicode_ci NOT NULL,
  `nama_laporan_pertanggungjawaban` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `lampiran` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `status_bem` enum('Diterima','Ditolak','Menunggu') COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'Menunggu'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `laporan_pertanggungjawaban`
--

INSERT INTO `laporan_pertanggungjawaban` (`id`, `created_at`, `updated_at`, `nama`, `jabatan`, `nama_ormawa`, `nama_laporan_pertanggungjawaban`, `lampiran`, `status_bem`) VALUES
(1, '2021-10-24 09:36:07', '2021-10-24 18:58:32', 'Tomoe', 'Project Manager', 'IKMI', 'aaa', 'LaporanPertanggungjawaban-2021-10-24-e32d45953b86814acd83d9fade7b2040.docx', 'Diterima'),
(2, '2021-10-29 23:04:08', '2021-11-21 06:23:49', 'Ilham Jaya', 'Ketua', 'HIMATIF', 'Laporan Tugas XXX', 'LaporanPertanggungjawaban-2021-10-30-6ca2754f68917b8e8efb32da84de438f.pdf', 'Diterima');

-- --------------------------------------------------------

--
-- Table structure for table `migrations`
--

CREATE TABLE `migrations` (
  `id` int(10) UNSIGNED NOT NULL,
  `migration` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
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
(5, '2021_10_14_171221_create_proposal_table', 1),
(6, '2021_10_14_173110_create_ruangan_table', 1),
(7, '2021_10_14_174041_create_laporan_kegiatan_table', 1),
(8, '2021_10_14_174844_create_laporan_pertanggungjawaban_table', 1),
(9, '2021_10_14_180505_create_surat_keluar_table', 1),
(10, '2021_10_14_180946_create_kategori_table', 1);

-- --------------------------------------------------------

--
-- Table structure for table `password_resets`
--

CREATE TABLE `password_resets` (
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `personal_access_tokens`
--

CREATE TABLE `personal_access_tokens` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `tokenable_type` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `tokenable_id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(64) COLLATE utf8mb4_unicode_ci NOT NULL,
  `abilities` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `last_used_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `proposal`
--

CREATE TABLE `proposal` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `nama` varchar(30) COLLATE utf8mb4_unicode_ci NOT NULL,
  `jabatan` varchar(30) COLLATE utf8mb4_unicode_ci NOT NULL,
  `nama_ormawa` varchar(30) COLLATE utf8mb4_unicode_ci NOT NULL,
  `nama_proposal` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `lampiran` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `status_kemahasiswaan` enum('Diterima','Ditolak','Menunggu') COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'Menunggu',
  `status_bem` enum('Diterima','Ditolak','Menunggu') COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'Menunggu',
  `status_dpm` enum('Diterima','Ditolak','Menunggu') COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'Menunggu'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `proposal`
--

INSERT INTO `proposal` (`id`, `created_at`, `updated_at`, `nama`, `jabatan`, `nama_ormawa`, `nama_proposal`, `lampiran`, `status_kemahasiswaan`, `status_bem`, `status_dpm`) VALUES
(2, '2021-10-24 04:42:30', '2021-10-24 22:31:48', 'Tomlol', 'Project Manager', 'HIMATIF', 'HIMATIF', 'PROPOSAL-2021-10-24-ed79ccc8dadf6c57b07ba572d0e966db.docx', 'Diterima', 'Diterima', 'Menunggu'),
(3, '2021-10-29 23:01:16', '2021-10-29 23:09:14', 'Jaya', 'Sekertaris', 'HIMATIF', 'Pembiayaan Event XXX', 'PROPOSAL-2021-10-30-b23c09ff465d986411c6b1e0448bb224.pdf', 'Diterima', 'Menunggu', 'Menunggu');

-- --------------------------------------------------------

--
-- Table structure for table `ruangan`
--

CREATE TABLE `ruangan` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `nama` varchar(30) COLLATE utf8mb4_unicode_ci NOT NULL,
  `jabatan` varchar(30) COLLATE utf8mb4_unicode_ci NOT NULL,
  `nama_ormawa` varchar(30) COLLATE utf8mb4_unicode_ci NOT NULL,
  `tujuan` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `nama_ruangan` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `tanggal_pinjam` date NOT NULL,
  `mulai` time NOT NULL,
  `selesai` time NOT NULL,
  `status_kemahasiswaan` enum('Diterima','Ditolak','Menunggu') COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'Menunggu',
  `status_akademik` enum('Ditolak','Menunggu','Diterima','') COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'Menunggu'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `ruangan`
--

INSERT INTO `ruangan` (`id`, `created_at`, `updated_at`, `nama`, `jabatan`, `nama_ormawa`, `tujuan`, `nama_ruangan`, `tanggal_pinjam`, `mulai`, `selesai`, `status_kemahasiswaan`, `status_akademik`) VALUES
(3, '2021-10-24 18:34:16', '2021-10-29 23:09:38', '1 Hari 1 Malam', '3213', '32131', '123123', '3.2', '2021-10-27', '00:30:00', '01:00:00', 'Diterima', 'Menunggu'),
(4, '2021-10-29 23:03:33', '2021-10-29 23:09:41', 'Jaya', 'Sekertaris', 'HIMATIF', 'Ngopi', '3.2', '2021-10-29', '13:00:00', '19:00:00', 'Diterima', 'Menunggu');

-- --------------------------------------------------------

--
-- Table structure for table `surat_keluar`
--

CREATE TABLE `surat_keluar` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `nama` varchar(30) COLLATE utf8mb4_unicode_ci NOT NULL,
  `jabatan` varchar(30) COLLATE utf8mb4_unicode_ci NOT NULL,
  `tujuan_surat` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `tujuan_pengirim` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `lampiran` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `surat_keluar`
--

INSERT INTO `surat_keluar` (`id`, `created_at`, `updated_at`, `nama`, `jabatan`, `tujuan_surat`, `tujuan_pengirim`, `lampiran`) VALUES
(1, '2021-10-24 17:49:07', '2021-10-24 17:49:07', '1 Hari 1 Malam', 'Project Manager', 'sada', 'dasdas', 'SURAT-2021-10-25-3d28bb31132d8cecf8c629575e315389.docx'),
(2, '2021-10-29 23:06:48', '2021-10-29 23:06:48', 'Jaya', 'Ketua', 'DV', 'SSS', 'SURAT-2021-10-30-9be028a612d1c633f7e11a7b5947820e.pdf');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `role` varchar(30) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `password` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `name`, `role`, `email`, `email_verified_at`, `password`, `remember_token`, `created_at`, `updated_at`) VALUES
(1, 'Superadmin', 'superadmin', 'superadmin@mail.com', '2021-10-25 00:53:36', '$2y$10$1m6AJEoxnQUl0.JNyhoCxuE3URdfFvgnZmZgftYxBtIlwvGRaF2lG', NULL, '2021-10-20 00:22:54', '2021-10-20 00:22:54'),
(2, 'Bambang', 'kemahasiswaan', 'kemahasiswaan@mail.com', NULL, '$2y$10$1m6AJEoxnQUl0.JNyhoCxuE3URdfFvgnZmZgftYxBtIlwvGRaF2lG', NULL, NULL, NULL),
(3, 'AKUN BEM', 'bem', 'bem@mail.com', NULL, '$2y$10$1m6AJEoxnQUl0.JNyhoCxuE3URdfFvgnZmZgftYxBtIlwvGRaF2lG', NULL, NULL, '2021-11-14 05:39:26'),
(4, 'Akun DPM', 'dpm', 'dpm@mail.com', NULL, '$2y$10$1m6AJEoxnQUl0.JNyhoCxuE3URdfFvgnZmZgftYxBtIlwvGRaF2lG', NULL, NULL, NULL),
(5, 'Puskesmas Sangurara', 'bem', 'atalanta@gmail.com', NULL, '$2y$10$xSghTm8YzzTEtam5bD1Wi.oIofy7m8ylp/0RkqUbJVo1BtcA36PA6', NULL, '2021-11-14 04:53:36', '2021-11-14 04:53:36'),
(6, 'Tomoe', 'akademik', 'irfa23@mail.com', NULL, '$2y$10$diX84W3qwTYZZ.5.C/TWp.Cv22VcoB4xTpjGxxoDOPkhsKn8NN8Ii', NULL, '2021-11-21 06:28:34', '2021-11-21 06:28:34');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `failed_jobs_uuid_unique` (`uuid`);

--
-- Indexes for table `kategori`
--
ALTER TABLE `kategori`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `laporan_kegiatan`
--
ALTER TABLE `laporan_kegiatan`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `laporan_pertanggungjawaban`
--
ALTER TABLE `laporan_pertanggungjawaban`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `password_resets`
--
ALTER TABLE `password_resets`
  ADD KEY `password_resets_email_index` (`email`);

--
-- Indexes for table `personal_access_tokens`
--
ALTER TABLE `personal_access_tokens`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `personal_access_tokens_token_unique` (`token`),
  ADD KEY `personal_access_tokens_tokenable_type_tokenable_id_index` (`tokenable_type`,`tokenable_id`);

--
-- Indexes for table `proposal`
--
ALTER TABLE `proposal`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `ruangan`
--
ALTER TABLE `ruangan`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `surat_keluar`
--
ALTER TABLE `surat_keluar`
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
-- AUTO_INCREMENT for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `kategori`
--
ALTER TABLE `kategori`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `laporan_kegiatan`
--
ALTER TABLE `laporan_kegiatan`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `laporan_pertanggungjawaban`
--
ALTER TABLE `laporan_pertanggungjawaban`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `personal_access_tokens`
--
ALTER TABLE `personal_access_tokens`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `proposal`
--
ALTER TABLE `proposal`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `ruangan`
--
ALTER TABLE `ruangan`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `surat_keluar`
--
ALTER TABLE `surat_keluar`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
