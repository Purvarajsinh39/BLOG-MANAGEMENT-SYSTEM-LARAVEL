-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Apr 29, 2025 at 05:57 AM
-- Server version: 10.4.32-MariaDB
-- PHP Version: 8.2.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `blog-management`
--

-- --------------------------------------------------------

--
-- Table structure for table `cache`
--

CREATE TABLE `cache` (
  `key` varchar(255) NOT NULL,
  `value` mediumtext NOT NULL,
  `expiration` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `cache_locks`
--

CREATE TABLE `cache_locks` (
  `key` varchar(255) NOT NULL,
  `owner` varchar(255) NOT NULL,
  `expiration` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

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
-- Table structure for table `jobs`
--

CREATE TABLE `jobs` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `queue` varchar(255) NOT NULL,
  `payload` longtext NOT NULL,
  `attempts` tinyint(3) UNSIGNED NOT NULL,
  `reserved_at` int(10) UNSIGNED DEFAULT NULL,
  `available_at` int(10) UNSIGNED NOT NULL,
  `created_at` int(10) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `job_batches`
--

CREATE TABLE `job_batches` (
  `id` varchar(255) NOT NULL,
  `name` varchar(255) NOT NULL,
  `total_jobs` int(11) NOT NULL,
  `pending_jobs` int(11) NOT NULL,
  `failed_jobs` int(11) NOT NULL,
  `failed_job_ids` longtext NOT NULL,
  `options` mediumtext DEFAULT NULL,
  `cancelled_at` int(11) DEFAULT NULL,
  `created_at` int(11) NOT NULL,
  `finished_at` int(11) DEFAULT NULL
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
(1, '0001_01_01_000000_create_users_table', 1),
(2, '0001_01_01_000001_create_cache_table', 1),
(3, '0001_01_01_000002_create_jobs_table', 1),
(4, '2025_03_24_092439_add_is_admin_to_users_table', 2),
(5, '2025_03_30_105212_add_status_to_posts_table', 3),
(6, '2025_04_10_074655_add_suggestion_to_posts_table', 4);

-- --------------------------------------------------------

--
-- Table structure for table `password_reset_tokens`
--

CREATE TABLE `password_reset_tokens` (
  `email` varchar(255) NOT NULL,
  `token` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `posts`
--

CREATE TABLE `posts` (
  `id` int(11) NOT NULL,
  `title` varchar(255) NOT NULL,
  `content` text NOT NULL,
  `user_id` int(11) NOT NULL,
  `img` blob DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `status` enum('pending','reviewer_approved','published','rejected') NOT NULL DEFAULT 'pending',
  `suggestion` text DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `posts`
--

INSERT INTO `posts` (`id`, `title`, `content`, `user_id`, `img`, `created_at`, `updated_at`, `status`, `suggestion`) VALUES
(17, 'Laravel 11', 'Laravel 11 is the latest version with better speed, cleaner code, and improved routing. It removes unnecessary files, making projects simpler. The framework now uses Vite for asset management by default. Testing is easier with built-in support for Pest PHP. It ensures smooth upgrades while keeping backward compatibility. 🚀', 4, 0x75706c6f6164732f4244415650704d6e38643471587433436c6b4a5a4d6b75467546444b516b5354706a546a485959452e706e67, '2025-03-23 02:38:29', '2025-04-10 07:57:34', 'published', NULL),
(18, 'Laravel 10', 'Laravel 10 is a stable version with improved security, performance, and features. It introduces native type hinting for cleaner code. The framework enhances job batching and queue handling. It supports PHP 8.1+ and removes outdated dependencies. New features make testing, routing, and database migrations more efficient. 🚀', 6, 0x75706c6f6164732f6242636a6f334831585764617449567a596c5039415457415367524c7350363548716532636a55562e706e67, '2025-03-24 03:31:16', '2025-04-10 08:26:10', 'reviewer_approved', NULL),
(19, 'Laravel 9', 'Laravel 9 is a long-term support (LTS) version with updates for security and stability. It requires PHP 8 and includes Symfony 6 components. The framework introduces improved route handling and query builder enhancements. It supports Flysystem 3 for better file storage. New features make development faster and more efficient. 🚀', 7, 0x75706c6f6164732f39764f6f694244736b73706e434e6b6f6b5a6e7632514c664158465641456d6c526d46774776334c2e6a7067, '2025-03-24 03:33:19', '2025-04-15 03:09:43', 'pending', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `sessions`
--

CREATE TABLE `sessions` (
  `id` varchar(255) NOT NULL,
  `user_id` bigint(20) UNSIGNED DEFAULT NULL,
  `ip_address` varchar(45) DEFAULT NULL,
  `user_agent` text DEFAULT NULL,
  `payload` longtext NOT NULL,
  `last_activity` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `sessions`
--

INSERT INTO `sessions` (`id`, `user_id`, `ip_address`, `user_agent`, `payload`, `last_activity`) VALUES
('3IUQqYXLYT06LF6ugZXkfaAEmUm1GkxoaaFa5Z3O', NULL, '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/135.0.0.0 Safari/537.36', 'YToxMDp7czo2OiJfdG9rZW4iO3M6NDA6IklNbjREWnRrVFh4WTBMb29KcWpJdjlFMHdsQzhqQ2gxYUZ0d2hjbDIiO3M6OToiX3ByZXZpb3VzIjthOjE6e3M6MzoidXJsIjtzOjM2OiJodHRwOi8vMTI3LjAuMC4xOjgwMDAvdXNlci9kYXNoYm9hcmQiO31zOjY6Il9mbGFzaCI7YToyOntzOjM6Im9sZCI7YTowOnt9czozOiJuZXciO2E6MDp7fX1zOjE4OiJyZXZpZXdlcl9sb2dnZWRfaW4iO2I6MTtzOjEzOiJyZXZpZXdlcl9uYW1lIjtzOjg6IlJldmlld2VyIjtzOjE0OiJyZXZpZXdlcl9lbWFpbCI7czoxODoicmV2aWV3ZXJAZ21haWwuY29tIjtzOjE1OiJhZG1pbl9sb2dnZWRfaW4iO2I6MTtzOjEwOiJhZG1pbl9uYW1lIjtzOjU6ImFkbWluIjtzOjExOiJhZG1pbl9lbWFpbCI7czoxNToiYWRtaW5AZ21haWwuY29tIjtzOjEwOiJMb2dnZWRVc2VyIjtpOjc7fQ==', 1744686455),
('avv10J5R92E4f4bJioAhqCUGmY3IliT2ufEFQbwc', NULL, '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/135.0.0.0 Safari/537.36', 'YTo3OntzOjY6Il90b2tlbiI7czo0MDoiZExpQ1RGYnJYYkVIWlQxVWJVV1I0aXZOZzM0WGdOWkVLWFo4anVBeiI7czo5OiJfcHJldmlvdXMiO2E6MTp7czozOiJ1cmwiO3M6NDY6Imh0dHA6Ly8xMjcuMC4wLjE6ODAwMC9yZXZpZXdlci9yZXF1ZXN0cmV2aWV3ZXIiO31zOjY6Il9mbGFzaCI7YToyOntzOjM6Im9sZCI7YTowOnt9czozOiJuZXciO2E6MDp7fX1zOjE4OiJyZXZpZXdlcl9sb2dnZWRfaW4iO2I6MTtzOjEzOiJyZXZpZXdlcl9uYW1lIjtzOjg6IlJldmlld2VyIjtzOjE0OiJyZXZpZXdlcl9lbWFpbCI7czoxODoicmV2aWV3ZXJAZ21haWwuY29tIjtzOjEwOiJMb2dnZWRVc2VyIjtpOjc7fQ==', 1744273768);

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `is_admin` tinyint(1) NOT NULL DEFAULT 0,
  `is_reviewer` tinyint(1) NOT NULL DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `name`, `email`, `password`, `created_at`, `updated_at`, `is_admin`, `is_reviewer`) VALUES
(4, 'Purvarajsinh', 'purvarajsinh@gmail.com', '$2y$12$d8N8.1OK3q9cyR4Uv/BYLOYS2J1SjZX8nADBGwuE7NpHaUs6tDmIu', '2025-03-22 03:57:40', '2025-03-22 11:00:26', 0, 0),
(6, 'Mandipsinh', 'mandipsinh@gmail.com', '$2y$12$POoeGM2q.Rx8Yw/eMLSkx.NOGAOwBnXI0VstTcfsTINceXDgwGPW6', '2025-03-24 03:13:26', '2025-03-24 03:13:26', 0, 0),
(7, 'Rajdipsinh', 'rajdipsinh@gmail.com', '$2y$12$t5aiJu.yJJftAFWE0580suEL14uha25t8mkDC/AxFCs6acoh/4mdW', '2025-03-24 03:14:17', '2025-03-24 03:14:17', 0, 0),
(11, 'admin', 'admin@gmail.com', '$2y$12$Rykxrg4k4JHWWrCLxRNhGe5qFuyD479kLGiuqqX5R4Pi8X/HVg85S', '2025-03-24 06:18:11', '2025-03-24 11:48:35', 1, 0),
(12, 'Reviewer', 'reviewer@gmail.com', '$2y$12$L648x1iSzipqw7pKMDQK4eAaxzBzU58fwLAzEGQZA8KViynvL96Ia', '2025-03-29 04:00:49', '2025-03-29 09:35:22', 0, 1);

--
-- Indexes for dumped tables
--

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
-- Indexes for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `failed_jobs_uuid_unique` (`uuid`);

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
-- Indexes for table `posts`
--
ALTER TABLE `posts`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `sessions`
--
ALTER TABLE `sessions`
  ADD PRIMARY KEY (`id`),
  ADD KEY `sessions_user_id_index` (`user_id`),
  ADD KEY `sessions_last_activity_index` (`last_activity`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `email` (`email`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `jobs`
--
ALTER TABLE `jobs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `posts`
--
ALTER TABLE `posts`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=24;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
