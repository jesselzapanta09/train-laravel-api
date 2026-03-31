-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Mar 31, 2026 at 03:33 PM
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
-- Database: `traindb_laravel`
--

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
(1, '2024_01_01_000001_create_users_table', 1),
(2, '2024_01_01_000002_create_trains_table', 1),
(3, '2024_01_01_000003_create_token_blacklist_table', 1);

-- --------------------------------------------------------

--
-- Table structure for table `token_blacklist`
--

CREATE TABLE `token_blacklist` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `token` text NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `trains`
--

CREATE TABLE `trains` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `train_name` varchar(150) NOT NULL,
  `price` decimal(10,2) NOT NULL,
  `route` varchar(255) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `trains`
--

INSERT INTO `trains` (`id`, `train_name`, `price`, `route`, `created_at`, `updated_at`) VALUES
(1, 'LRT Line 1', 20.00, 'Baclaran - Fernando Poe Jr. Station', '2026-03-16 05:56:58', '2026-03-23 04:50:37'),
(2, 'LRT Line 2', 25.00, 'Recto - Antipolo', '2026-03-16 05:56:58', '2026-03-23 04:50:27'),
(3, 'MRT Line 3', 24.00, 'North Avenue - Taft Avenue', '2026-03-16 05:56:58', '2026-03-23 04:50:19'),
(4, 'PNR Metro Commuter Line', 30.00, 'Tutuban - Alabang', '2026-03-16 05:56:58', '2026-03-23 04:50:06'),
(5, 'PNR Bicol Express', 450.00, 'Manila - Naga', '2026-03-16 05:56:58', '2026-03-23 04:49:59'),
(6, 'PNR Mayon Limited', 500.00, 'Manila - Legazpi', '2026-03-16 05:56:58', '2026-03-23 04:49:49'),
(7, 'LRT Cavite Extension', 35.00, 'Baclaran - Niog', '2026-03-16 05:56:58', '2026-03-23 04:49:44'),
(8, 'MRT Line 7', 28.00, 'North Avenue - San Jose del Monte', '2026-03-16 05:56:58', '2026-03-23 04:49:34'),
(9, 'North–South Commuter Railway', 60.00, 'Clark - Calamba', '2026-03-16 05:56:58', '2026-03-23 04:48:57'),
(10, 'Metro Manila Subway', 35.00, 'Valenzuela - NAIA Terminal 3', '2026-03-16 05:56:58', '2026-03-23 04:48:51'),
(11, 'PNR South Long Haul', 800.00, 'Manila - Matnog', '2026-03-16 05:56:58', '2026-03-23 04:48:40'),
(12, 'Clark Airport Express', 120.00, 'Clark Airport - Manila', '2026-03-16 05:56:58', '2026-03-23 04:48:28'),
(13, 'Mindanao Railway Phase 1', 50.00, 'Tagum - Davao - Digos', '2026-03-16 05:56:58', '2026-03-23 04:48:14'),
(14, 'Panay Rail Revival', 40.00, 'Iloilo - Roxas City', '2026-03-16 05:56:58', '2026-03-23 04:48:03'),
(15, 'Cebu Monorail', 25.00, 'Cebu City - Mactan Airport', '2026-03-16 05:56:58', '2026-03-23 04:47:48'),
(16, 'OZ-TRAIN', 50.00, 'Ozamiz - Tangub', '2026-03-21 06:36:34', '2026-03-23 04:47:27');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `username` varchar(100) NOT NULL,
  `email` varchar(150) NOT NULL,
  `password` varchar(255) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `username`, `email`, `password`, `created_at`, `updated_at`) VALUES
(1, 'Jessel Zapanta', 'jesselzapanta@gmail.com', '$2b$10$zb5.7jUvR39pgOqILkodouhXa9aeP3ZB1RNMeXuN/JjZvNHUa9Ir6', '2026-03-16 05:56:58', '2026-03-22 00:13:48'),
(2, 'jesselzapanta09', 'jesselzapanta09@gmail.com', '$2b$10$OUf9vBUPpl.TUIZKvV4GEOGoTVIyMbSJa.YeH.fEL5slSAPhjqPPS', '2026-03-17 00:07:19', '2026-03-17 00:07:19'),
(3, 'Juan Dela Cruz', 'juandelacruz9@gmail.com', '$2b$10$BSJLo5vdyDVuovqdOuCdYOwsRC7TXWFhDiPxbxGw7cH8XBFwR.Uke', '2026-03-23 04:31:24', '2026-03-23 04:39:09'),
(4, 'John Doe', 'johndoe@gmail.com', '$2b$10$x10Uji5HF2qNJn9N3f6v1u52Dt/p4RAu85zAgR0lUG/PgG7XgdZfO', '2026-03-23 04:41:37', '2026-03-23 04:41:37'),
(5, 'Raiden Shogun', 'raidenshogun@gmail.com', '$2b$10$HZGVOSSsuU4C03.9dnVs9OKzlHPYXd8odLdROPjbRHPm8.3r65JRO', '2026-03-23 04:42:38', '2026-03-23 04:53:22'),
(6, 'Eren Yeager', 'erenyeager@gmail.com', '$2b$10$lgFV/r2oowLgjUfvgbjUfvgbjUuOeeHsFAeT9dSZJR3S81651OthjZaHFkK', '2026-03-23 04:43:50', '2026-03-23 04:54:09'),
(7, 'Gabimaru', 'gabimaru@gmail.com', '$2b$10$9YGdUCKkpPt97SkjGVNl.OsI8Rrknwx6VwOmBmwQ4ollNOMZg/Gq2', '2026-03-23 04:45:57', '2026-03-23 04:45:57');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `token_blacklist`
--
ALTER TABLE `token_blacklist`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `trains`
--
ALTER TABLE `trains`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `users_username_unique` (`username`),
  ADD UNIQUE KEY `users_email_unique` (`email`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `token_blacklist`
--
ALTER TABLE `token_blacklist`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `trains`
--
ALTER TABLE `trains`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
