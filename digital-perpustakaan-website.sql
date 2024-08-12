-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3306
-- Generation Time: Aug 11, 2024 at 02:45 PM
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
-- Database: `digital-perpustakaan-website`
--

-- --------------------------------------------------------

--
-- Table structure for table `bukus`
--

CREATE TABLE `bukus` (
  `id` char(36) COLLATE utf8mb4_unicode_ci NOT NULL,
  `user_id` char(36) COLLATE utf8mb4_unicode_ci NOT NULL,
  `kategori_id` char(36) COLLATE utf8mb4_unicode_ci NOT NULL,
  `judul_buku` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `deskripsi` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `jumlah_buku` int NOT NULL,
  `cover_buku` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `file_buku` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `bukus`
--

INSERT INTO `bukus` (`id`, `user_id`, `kategori_id`, `judul_buku`, `deskripsi`, `jumlah_buku`, `cover_buku`, `file_buku`, `created_at`, `updated_at`) VALUES
('35bd85d5-a570-444e-bf01-8ea1b8df89d1', 'e2fc04a2-d86b-4205-bfa9-5c6ea1ac8e8a', '84e1e579-b28c-4e66-b590-b7a840fa32c5', 'Panduan Guru Seni Musik untuk SMA/MA/SMK/MAK Kelas X (Edisi Revisi)', 'Buku tentang pelajaran musik anak SMA/SMK dan sederajat', 12, 'cover_buku/OoSHuSUIOvHGHeaDixvy934fdHu8JftKoMYTWZu4.png', 'buku_pdf/7Cq1aGjhnx31JK6xJkhDfrJLILoW2m4TrCOCA33j.pdf', '2024-08-11 06:31:57', '2024-08-11 06:33:59'),
('5963cde7-3d4c-445d-af16-362151c68cfc', 'aa286fb6-7983-4515-b288-cfddc93a3997', '84e1e579-b28c-4e66-b590-b7a840fa32c5', 'Informatika untuk SMP Kelas VIII', 'Buku untuk anak sekolah kelas 9 pelajaran tentang teklnik informatika', 12, 'cover_buku/g88o8JKxTHJBxZ6s8GuqbifkGRGVPijdRSoTdTrq.png', 'buku_pdf/zNZgm7DvAxfpCmi28y3dLVngRj9XkJvIZ5yC7vDq.pdf', '2024-08-11 06:23:25', '2024-08-11 06:23:25'),
('a843d2ed-bc11-4b86-91ff-e27948a42784', 'aa286fb6-7983-4515-b288-cfddc93a3997', '84e1e579-b28c-4e66-b590-b7a840fa32c5', 'Pendidikan Pancasila dan Kewarganegaraan Kelas X', 'Buku pelajaran PPKN untuk murid kelas 10', 12, 'cover_buku/BC57PljOLhWlJvhMATkg6EvwbwAbPzNgyanyoGfh.png', 'buku_pdf/PcyRDODg90BVbKi7R13HsnhDL9YYShSxw1QRG2Ml.pdf', '2024-08-11 06:12:34', '2024-08-11 06:12:34'),
('bafa960e-9814-48cb-ad07-25d006e08b98', 'e2fc04a2-d86b-4205-bfa9-5c6ea1ac8e8a', '84e1e579-b28c-4e66-b590-b7a840fa32c5', 'Buku Panduan Guru Matematika untuk SD/MI Kelas III', 'Buku untuk guru tentang pelajaran matematika', 12, 'cover_buku/yzBOinZaauf7t9L8v2MeOosUKbI3EMFUWhZYKsg3.png', 'buku_pdf/x8kRv5amsa2kXCT5X4sFUeWQDtxn8EGQSiijSGew.pdf', '2024-08-11 06:33:38', '2024-08-11 06:33:38'),
('e84bcb2c-1d55-46fc-b61f-9344219aed23', 'aa286fb6-7983-4515-b288-cfddc93a3997', '30e68829-fa8e-46b6-a1c8-1f0ebd8c3e5a', 'An Introduction to Business Research Methods', 'This revised edition of the textbook not only provides a comprehensive and thorough introduction to the field of business research for students, it also aims to prepare readers for practical careers as research consultants. Written by Dr. Susan Greener, a Principal Lecturer at the University of Brighton’s Business School, UK and Dr. Joe Martelli, professor at The University of Findlay, Ohio “Introduction to Business Research Methods” explains theoretical concepts in straightforward language and offers practical strategies for dealing with the challenges of conducting business research.', 3, 'cover_buku/Hm8InMkIFHYezhbW7ryvGmLem9hlNHsX1m5VOQxc.jpg', 'buku_pdf/moGvHTHDgad9SssSijd0M7jVCdU0HpUDOZwhDcu8.pdf', '2024-08-11 06:07:56', '2024-08-11 06:07:56');

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
-- Table structure for table `kategoris`
--

CREATE TABLE `kategoris` (
  `id` char(36) COLLATE utf8mb4_unicode_ci NOT NULL,
  `kategori_buku` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `kategoris`
--

INSERT INTO `kategoris` (`id`, `kategori_buku`, `created_at`, `updated_at`) VALUES
('157d5ccf-5bda-4bb0-9d45-85504328f4e9', 'Sejarah', '2024-08-11 05:59:40', '2024-08-11 05:59:40'),
('30e68829-fa8e-46b6-a1c8-1f0ebd8c3e5a', 'Edukasi', '2024-08-11 06:04:26', '2024-08-11 06:04:26'),
('523a92e0-118f-4bf1-842d-493b4ee58fba', 'Novel', '2024-08-11 05:59:40', '2024-08-11 05:59:40'),
('65d0076c-e894-4c32-9c46-11f93157f690', 'Komik', '2024-08-11 05:59:40', '2024-08-11 05:59:40'),
('84e1e579-b28c-4e66-b590-b7a840fa32c5', 'Pelajaran', '2024-08-11 06:11:39', '2024-08-11 06:11:39'),
('8cd8e92c-4c6f-4a87-94b5-8fe1216af350', 'Biografi', '2024-08-11 05:59:40', '2024-08-11 05:59:40'),
('d53dc86c-11e3-4cf0-9a67-12c5c7d95a43', 'Ensiklopedia', '2024-08-11 05:59:40', '2024-08-11 05:59:40');

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
(2, '2014_10_12_100000_create_password_reset_tokens_table', 1),
(3, '2019_08_19_000000_create_failed_jobs_table', 1),
(4, '2019_12_14_000001_create_personal_access_tokens_table', 1),
(5, '2024_08_08_014246_create_kategoris_table', 1),
(6, '2024_08_09_150515_create_bukus_table', 1);

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
  `expires_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` char(36) COLLATE utf8mb4_unicode_ci NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `password` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `role` enum('admin','user') COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'user',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `name`, `email`, `password`, `role`, `created_at`, `updated_at`) VALUES
('aa286fb6-7983-4515-b288-cfddc93a3997', 'admin', 'admin@gmail.com', '$2y$12$cmZIahHcngJOFuwP6Kt82.dhVFeFDUcof168GKOAnIgUnnYW7Ru3q', 'admin', '2024-08-11 05:59:40', '2024-08-11 05:59:40'),
('e2fc04a2-d86b-4205-bfa9-5c6ea1ac8e8a', 'user', 'user@gmail.com', '$2y$12$4bO/lIoi0WjhR8zGhuwvuuEZkUfX9AvNXqREFWeSXAJSMth2KSZHa', 'user', '2024-08-11 05:59:40', '2024-08-11 05:59:40');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `bukus`
--
ALTER TABLE `bukus`
  ADD PRIMARY KEY (`id`),
  ADD KEY `bukus_user_id_foreign` (`user_id`),
  ADD KEY `bukus_kategori_id_foreign` (`kategori_id`);

--
-- Indexes for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `failed_jobs_uuid_unique` (`uuid`);

--
-- Indexes for table `kategoris`
--
ALTER TABLE `kategoris`
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
-- Indexes for table `personal_access_tokens`
--
ALTER TABLE `personal_access_tokens`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `personal_access_tokens_token_unique` (`token`),
  ADD KEY `personal_access_tokens_tokenable_type_tokenable_id_index` (`tokenable_type`,`tokenable_id`);

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
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `personal_access_tokens`
--
ALTER TABLE `personal_access_tokens`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `bukus`
--
ALTER TABLE `bukus`
  ADD CONSTRAINT `bukus_kategori_id_foreign` FOREIGN KEY (`kategori_id`) REFERENCES `kategoris` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `bukus_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
