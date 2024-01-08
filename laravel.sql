-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jan 08, 2024 at 05:02 PM
-- Server version: 10.4.27-MariaDB
-- PHP Version: 8.2.0

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `laravel`
--

-- --------------------------------------------------------

--
-- Table structure for table `categories`
--

CREATE TABLE `categories` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `category` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `categories`
--

INSERT INTO `categories` (`id`, `created_at`, `updated_at`, `category`) VALUES
(1, '2024-01-04 07:30:35', '2024-01-04 07:30:35', 'Makanan'),
(2, '2024-01-04 07:30:42', '2024-01-04 07:30:42', 'Minuman'),
(3, '2024-01-04 07:30:49', '2024-01-04 07:30:49', 'Sembako'),
(4, '2024-01-04 07:47:33', '2024-01-04 07:47:33', 'Kesehatan');

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
-- Table structure for table `items`
--

CREATE TABLE `items` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `id_category` bigint(20) UNSIGNED NOT NULL,
  `item_name` varchar(255) NOT NULL,
  `stok` int(11) NOT NULL,
  `buy_price` double NOT NULL,
  `sell_price` double NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `items`
--

INSERT INTO `items` (`id`, `id_category`, `item_name`, `stok`, `buy_price`, `sell_price`, `created_at`, `updated_at`) VALUES
(1, 3, 'Beras', 96, 100000, 50000, '2024-01-04 07:53:00', '2024-01-06 05:12:47'),
(2, 3, 'Gula', 195, 250000, 25000, '2024-01-04 07:53:29', '2024-01-08 08:55:46'),
(3, 3, 'Tepung Terigu', 86, 500000, 55000, '2024-01-04 07:54:05', '2024-01-06 05:26:47'),
(4, 3, 'Telur', 95, 15000, 18000, '2024-01-04 07:54:56', '2024-01-06 05:26:47'),
(5, 2, 'Susu', 63, 15000, 5000, '2024-01-04 07:58:20', '2024-01-08 08:55:46'),
(6, 3, 'Minyak Goreng', 38, 45000, 47000, '2024-01-04 08:12:32', '2024-01-08 08:55:46'),
(7, 3, 'Garam', 12, 20000, 25000, '2024-01-04 08:36:10', '2024-01-08 08:55:46'),
(8, 1, 'Kacang Polong', 200, 10000, 15000, '2024-01-04 08:41:54', '2024-01-04 08:41:54'),
(9, 1, 'Kacang Tanah', 85, 20000, 25000, '2024-01-04 08:42:41', '2024-01-04 09:19:12'),
(10, 1, 'Kacang Almond', 216, 25000, 27000, '2024-01-04 08:43:08', '2024-01-08 08:55:46'),
(11, 1, 'Mi Instan', 580, 5000, 6500, '2024-01-04 08:43:49', '2024-01-08 08:55:46');

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
(2, '2014_10_12_100000_create_password_reset_tokens_table', 1),
(3, '2014_10_12_100000_create_password_resets_table', 1),
(4, '2019_08_19_000000_create_failed_jobs_table', 1),
(5, '2019_12_14_000001_create_personal_access_tokens_table', 1),
(6, '2023_12_09_151614_create_categories_table', 1),
(7, '2023_12_09_151615_create_items_table', 1),
(8, '2023_12_09_151930_create_transactions_table', 1),
(9, '2023_12_12_133011_create_outcomes_table', 1);

-- --------------------------------------------------------

--
-- Table structure for table `outcomes`
--

CREATE TABLE `outcomes` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `id_item` bigint(20) UNSIGNED NOT NULL,
  `price` double NOT NULL,
  `qty` int(11) NOT NULL,
  `total` double NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `outcomes`
--

INSERT INTO `outcomes` (`id`, `id_item`, `price`, `qty`, `total`, `created_at`, `updated_at`) VALUES
(1, 1, 50000, 100, 5000000, '2024-01-04 09:19:44', '2024-01-04 09:19:44'),
(2, 2, 25000, 103, 2575000, '2024-01-04 09:22:13', '2024-01-04 09:22:13'),
(3, 2, 25000, 110, 2750000, '2024-01-04 09:22:56', '2024-01-04 09:22:56'),
(4, 3, 55000, 50, 2750000, '2024-01-04 09:23:39', '2024-01-04 09:23:39'),
(5, 4, 18000, 80, 1440000, '2024-01-04 09:24:17', '2024-01-04 09:24:17'),
(6, 5, 5000, 50, 250000, '2024-01-04 09:32:35', '2024-01-04 09:32:35');

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
-- Table structure for table `password_reset_tokens`
--

CREATE TABLE `password_reset_tokens` (
  `email` varchar(255) NOT NULL,
  `token` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

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
  `expires_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `transactions`
--

CREATE TABLE `transactions` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `id_item` bigint(20) UNSIGNED NOT NULL,
  `price` double NOT NULL,
  `qty` int(11) NOT NULL,
  `discount` double NOT NULL,
  `total` double NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `transactions`
--

INSERT INTO `transactions` (`id`, `id_item`, `price`, `qty`, `discount`, `total`, `created_at`, `updated_at`) VALUES
(1, 1, 50000, -4, 0, 100000, '2024-01-04 09:19:12', '2024-01-04 09:19:12'),
(2, 9, 25000, 85, 0, 250000, '2024-01-04 09:19:12', '2024-01-04 09:19:12'),
(3, 10, 27000, 240, 0, 270000, '2024-01-04 09:19:12', '2024-01-04 09:19:12'),
(4, 2, 25000, 214, 0, 50000, '2024-01-06 05:06:01', '2024-01-06 05:06:01'),
(5, 2, 25000, 212, 0, 50000, '2024-01-06 05:06:53', '2024-01-06 05:06:53'),
(6, 2, 25000, 210, 0, 50000, '2024-01-06 05:07:28', '2024-01-06 05:07:28'),
(7, 2, 25000, 208, 0, 50000, '2024-01-06 05:11:02', '2024-01-06 05:11:02'),
(8, 3, 55000, 98, 0, 110000, '2024-01-06 05:11:02', '2024-01-06 05:11:02'),
(9, 1, 50000, 98, 0, 100000, '2024-01-06 05:11:02', '2024-01-06 05:11:02'),
(10, 2, 25000, 206, 0, 50000, '2024-01-06 05:12:47', '2024-01-06 05:12:47'),
(11, 3, 55000, 96, 0, 110000, '2024-01-06 05:12:47', '2024-01-06 05:12:47'),
(12, 1, 50000, 96, 0, 100000, '2024-01-06 05:12:47', '2024-01-06 05:12:47'),
(13, 3, 55000, 94, 0, 110000, '2024-01-06 05:19:09', '2024-01-06 05:19:09'),
(14, 4, 18000, 98, 0, 36000, '2024-01-06 05:19:09', '2024-01-06 05:19:09'),
(15, 3, 55000, 92, 0, 110000, '2024-01-06 05:19:09', '2024-01-06 05:19:09'),
(16, 3, 55000, 91, 0, 55000, '2024-01-06 05:19:52', '2024-01-06 05:19:52'),
(17, 5, 5000, 98, 0, 10000, '2024-01-06 05:19:52', '2024-01-06 05:19:52'),
(18, 5, 5000, 95, 0, 15000, '2024-01-06 05:19:52', '2024-01-06 05:19:52'),
(19, 2, 25000, 205, 0, 25000, '2024-01-06 05:23:10', '2024-01-06 05:23:10'),
(20, 6, 47000, 73, 0, 94000, '2024-01-06 05:23:10', '2024-01-06 05:23:10'),
(21, 3, 55000, 88, 0, 165000, '2024-01-06 05:23:10', '2024-01-06 05:23:10'),
(22, 3, 55000, 86, 0, 110000, '2024-01-06 05:26:47', '2024-01-06 05:26:47'),
(23, 4, 18000, 95, 0, 54000, '2024-01-06 05:26:47', '2024-01-06 05:26:47'),
(24, 6, 47000, 69, 0, 188000, '2024-01-06 05:26:47', '2024-01-06 05:26:47'),
(25, 2, 25000, 203, 0, 50000, '2024-01-06 05:28:09', '2024-01-06 05:28:09'),
(26, 6, 47000, 66, 0, 141000, '2024-01-06 05:28:09', '2024-01-06 05:28:09'),
(27, 7, 25000, 48, 0, 50000, '2024-01-06 05:28:09', '2024-01-06 05:28:09'),
(28, 2, 25000, 201, 0, 50000, '2024-01-08 08:53:56', '2024-01-08 08:53:56'),
(29, 11, 6500, 595, 0, 32500, '2024-01-08 08:53:56', '2024-01-08 08:53:56'),
(30, 10, 27000, 234, 0, 162000, '2024-01-08 08:53:56', '2024-01-08 08:53:56'),
(31, 6, 47000, 59, 0, 329000, '2024-01-08 08:53:56', '2024-01-08 08:53:56'),
(32, 5, 5000, 87, 0, 40000, '2024-01-08 08:53:56', '2024-01-08 08:53:56'),
(33, 7, 25000, 39, 0, 225000, '2024-01-08 08:53:56', '2024-01-08 08:53:56'),
(34, 2, 25000, 199, 0, 50000, '2024-01-08 08:54:43', '2024-01-08 08:54:43'),
(35, 11, 6500, 590, 0, 32500, '2024-01-08 08:54:43', '2024-01-08 08:54:43'),
(36, 10, 27000, 228, 0, 162000, '2024-01-08 08:54:43', '2024-01-08 08:54:43'),
(37, 6, 47000, 52, 0, 329000, '2024-01-08 08:54:43', '2024-01-08 08:54:43'),
(38, 5, 5000, 79, 0, 40000, '2024-01-08 08:54:43', '2024-01-08 08:54:43'),
(39, 7, 25000, 30, 0, 225000, '2024-01-08 08:54:43', '2024-01-08 08:54:43'),
(40, 2, 25000, 197, 0, 50000, '2024-01-08 08:55:00', '2024-01-08 08:55:00'),
(41, 11, 6500, 585, 0, 32500, '2024-01-08 08:55:00', '2024-01-08 08:55:00'),
(42, 10, 27000, 222, 0, 162000, '2024-01-08 08:55:00', '2024-01-08 08:55:00'),
(43, 6, 47000, 45, 0, 329000, '2024-01-08 08:55:00', '2024-01-08 08:55:00'),
(44, 5, 5000, 71, 0, 40000, '2024-01-08 08:55:00', '2024-01-08 08:55:00'),
(45, 7, 25000, 21, 0, 225000, '2024-01-08 08:55:00', '2024-01-08 08:55:00'),
(46, 2, 25000, 195, 0, 50000, '2024-01-08 08:55:46', '2024-01-08 08:55:46'),
(47, 11, 6500, 580, 0, 32500, '2024-01-08 08:55:46', '2024-01-08 08:55:46'),
(48, 10, 27000, 216, 0, 162000, '2024-01-08 08:55:46', '2024-01-08 08:55:46'),
(49, 6, 47000, 38, 0, 329000, '2024-01-08 08:55:46', '2024-01-08 08:55:46'),
(50, 5, 5000, 63, 0, 40000, '2024-01-08 08:55:46', '2024-01-08 08:55:46'),
(51, 7, 25000, 12, 0, 225000, '2024-01-08 08:55:46', '2024-01-08 08:55:46');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) NOT NULL,
  `username` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `level` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `name`, `username`, `password`, `level`, `created_at`, `updated_at`) VALUES
(1, 'Admin Kasir', 'Adm00n', '$2y$12$YwytTUkq6dNDyIYjPM4mdupU9NOGR6RhZSzoFoTCBxwc4OtqFcGoC', 'admin', '2024-01-04 07:30:16', '2024-01-04 23:50:53'),
(2, 'ADMIN NEW', 'admiin', '$2y$12$qCHv/6UCfNtawQz/IA822OwqsP1OLHwz5SQ9Kaj2RhGM.cXOV0VF.', 'admin', '2024-01-04 23:40:01', '2024-01-04 23:40:01'),
(3, 'Backup Account', 'backdoor', '$2y$12$vcADRQiPnRlOsCZ2985.pOsLTa6DQsh2e.vRX1CebR1W.2zq3FhNa', 'admin', '2024-01-04 23:50:20', '2024-01-04 23:50:20');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `categories`
--
ALTER TABLE `categories`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `failed_jobs_uuid_unique` (`uuid`);

--
-- Indexes for table `items`
--
ALTER TABLE `items`
  ADD PRIMARY KEY (`id`),
  ADD KEY `items_id_category_foreign` (`id_category`);

--
-- Indexes for table `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `outcomes`
--
ALTER TABLE `outcomes`
  ADD PRIMARY KEY (`id`),
  ADD KEY `outcomes_id_item_foreign` (`id_item`);

--
-- Indexes for table `password_resets`
--
ALTER TABLE `password_resets`
  ADD KEY `password_resets_email_index` (`email`);

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
-- Indexes for table `transactions`
--
ALTER TABLE `transactions`
  ADD PRIMARY KEY (`id`),
  ADD KEY `transactions_id_item_foreign` (`id_item`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `users_username_unique` (`username`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `categories`
--
ALTER TABLE `categories`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `items`
--
ALTER TABLE `items`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT for table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `outcomes`
--
ALTER TABLE `outcomes`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `personal_access_tokens`
--
ALTER TABLE `personal_access_tokens`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `transactions`
--
ALTER TABLE `transactions`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=52;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `items`
--
ALTER TABLE `items`
  ADD CONSTRAINT `items_id_category_foreign` FOREIGN KEY (`id_category`) REFERENCES `categories` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `outcomes`
--
ALTER TABLE `outcomes`
  ADD CONSTRAINT `outcomes_id_item_foreign` FOREIGN KEY (`id_item`) REFERENCES `items` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `transactions`
--
ALTER TABLE `transactions`
  ADD CONSTRAINT `transactions_id_item_foreign` FOREIGN KEY (`id_item`) REFERENCES `items` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
