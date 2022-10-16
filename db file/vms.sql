-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Oct 16, 2022 at 04:21 PM
-- Server version: 10.4.24-MariaDB
-- PHP Version: 8.1.6

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `vms`
--

-- --------------------------------------------------------

--
-- Table structure for table `departments`
--

CREATE TABLE `departments` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `department_name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `contact_person` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `departments`
--

INSERT INTO `departments` (`id`, `department_name`, `contact_person`, `created_at`, `updated_at`) VALUES
(1, 'Camden Monroe', 'Ullam sapiente tempo', '2022-10-15 06:39:33', '2022-10-15 06:39:33'),
(6, 'Chandler Collins', 'Sequi consequat Rep', '2022-10-15 06:49:39', '2022-10-15 06:49:39'),
(7, 'Mechelle Sherman', 'saaaaad.Soluta est id liber,Illum natus debitis,Praesentium reprehen,In quia molestiae vo,Soluta similique max,Accusamus maxime ab,Beatae atque molesti,Saepe dolor obcaecat,Lorem qui omnis quo,Et adipisci providen,ali saad', '2022-10-16 20:07:24', '2022-10-16 20:09:19');

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
(5, '2022_10_05_104729_add_new_field_to_users_table', 2),
(6, '2022_10_14_214621_create_departments_table', 3),
(7, '2022_10_15_003947_create_visitors_table', 4);

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
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `password` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `type` enum('User','Admin') COLLATE utf8mb4_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `name`, `email`, `email_verified_at`, `password`, `remember_token`, `created_at`, `updated_at`, `type`) VALUES
(11, 'saad', 'saad.dilawer1@gmail.com', NULL, '$2y$10$fSa4ClVeQOkN5POSmyHjOesneD4xRrR3gySXTrOrn5ootA/zLDPzy', NULL, '2022-10-13 04:34:03', '2022-10-13 06:21:50', 'Admin'),
(20, 'saad Amelia Reeves', 'saad@gmail.com', NULL, '$2y$10$ZFjm0i/3sPenj1ZV8wQaEe2vskxQAWak4aLy07dPsg4ei0ZTUFfxa', NULL, '2022-10-15 04:00:42', '2022-10-15 04:29:52', 'User'),
(21, 'Xena Kirk', 'tupek@mailinator.com', NULL, '$2y$10$bc2U2kKuNPnVWMZJYagKluCqrUUdHdKdlHvYQYwAt6WOpwSikwnPC', NULL, '2022-10-15 04:04:26', '2022-10-15 04:04:26', 'User'),
(22, 'Astra Soto', 'qanomaqeri@mailinator.com', NULL, '$2y$10$CvdJeiTUo7o9qaAfNKdcAuQ86juINzhTZxzpfnyaJxwK2hqg6LPCW', NULL, '2022-10-15 04:05:26', '2022-10-15 04:05:26', 'User'),
(23, 'Adrienne Fisher', 'mahabozoge@mailinator.com', NULL, '$2y$10$xKS2GzNh8jQeX7Y.5vMQJevxGZuFk5MBCfM8mUyK7rVaK/D1k13bm', NULL, '2022-10-15 04:05:59', '2022-10-15 04:05:59', 'User'),
(24, 'Ebony Alvarez', 'tugevajewu@mailinator.com', NULL, '$2y$10$XyiqEpHGCv1qrvB7usavd.p5D3fcJHn0G2Q0R4BqmHrQcXnkTcpyG', NULL, '2022-10-15 04:06:45', '2022-10-15 04:06:45', 'User'),
(26, 'Ms. Libbie Ortiz IV', 'jordan58@example.net', '2022-10-15 04:49:05', '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', 'OZN9KruGeQ', '2022-10-15 04:49:05', '2022-10-15 04:49:05', 'User'),
(27, 'Jess Herzog', 'skohler@example.org', '2022-10-15 04:49:05', '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', 'Ezgoi8IPo4', '2022-10-15 04:49:05', '2022-10-15 04:49:05', 'User');

-- --------------------------------------------------------

--
-- Table structure for table `visitors`
--

CREATE TABLE `visitors` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `visitor_name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `visitor_email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `visitor_mobile_no` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `visitor_address` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `visitor_meet_person_name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `visitor_department` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `visitor_reason_to_meet` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `visitor_enter_time` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `visitor_outing_remark` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `visitor_out_time` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `visitor_status` enum('In','Out') COLLATE utf8mb4_unicode_ci NOT NULL,
  `visitor_enter_by` int(11) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `visitors`
--

INSERT INTO `visitors` (`id`, `visitor_name`, `visitor_email`, `visitor_mobile_no`, `visitor_address`, `visitor_meet_person_name`, `visitor_department`, `visitor_reason_to_meet`, `visitor_enter_time`, `visitor_outing_remark`, `visitor_out_time`, `visitor_status`, `visitor_enter_by`, `created_at`, `updated_at`) VALUES
(1, 'ali', 'ali@gmail.com', '123128409', 'nothing', 'saad', 'nothing', 'just chill', '10:20', '', '', 'In', 0, NULL, NULL);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `departments`
--
ALTER TABLE `departments`
  ADD PRIMARY KEY (`id`);

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
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `users_email_unique` (`email`);

--
-- Indexes for table `visitors`
--
ALTER TABLE `visitors`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `departments`
--
ALTER TABLE `departments`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `personal_access_tokens`
--
ALTER TABLE `personal_access_tokens`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=28;

--
-- AUTO_INCREMENT for table `visitors`
--
ALTER TABLE `visitors`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
