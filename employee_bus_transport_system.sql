-- phpMyAdmin SQL Dump
-- version 4.7.4
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Mar 18, 2020 at 11:03 AM
-- Server version: 10.1.30-MariaDB
-- PHP Version: 7.2.1

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `employee_bus_transport_system`
--

-- --------------------------------------------------------

--
-- Table structure for table `admin_messages`
--

CREATE TABLE `admin_messages` (
  `id` int(10) UNSIGNED NOT NULL,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `role` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `subject` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `description` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `admin_messages`
--

INSERT INTO `admin_messages` (`id`, `name`, `email`, `role`, `subject`, `description`, `created_at`, `updated_at`) VALUES
(4, 'Shohel Rana', 'gsshohel1314@gmail.com', 'Admin', 'document', 'amr sonar bangla ami toma;y valo;basi', '2019-12-12 16:50:42', '2019-12-12 16:50:42'),
(5, 'Shohel Rana', 'gsshohel1314@gmail.com', 'Admin', 'ami', 'amra sonar abangla ami tomay valobasi', '2019-12-12 16:51:12', '2019-12-12 16:51:12'),
(6, 'Shohel Rana', 'gsshohel1314@gmail.com', 'Admin', 'new', 'new message message message', '2019-12-12 16:56:40', '2019-12-12 16:56:40'),
(9, 'Shohel Rana', 'gsshohel1314@gmail.com', 'Admin', 'computer', 'amr sonar bangla ami toma;y valo;basi', '2019-12-12 17:48:41', '2019-12-12 17:48:41'),
(10, 'Shohel Rana', 'gsshohel1314@gmail.com', 'Admin', 'computer', 'amr sonar bangla ami toma;y valo;basi', '2019-12-12 17:49:10', '2019-12-12 17:49:10');

-- --------------------------------------------------------

--
-- Table structure for table `assign_buses`
--

CREATE TABLE `assign_buses` (
  `id` int(10) UNSIGNED NOT NULL,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `busName` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `busRoute` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `pickPoint` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `pickTime` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `assign_buses`
--

INSERT INTO `assign_buses` (`id`, `name`, `email`, `busName`, `busRoute`, `pickPoint`, `pickTime`, `created_at`, `updated_at`) VALUES
(1, 'Shohel Rana', 'gsshohel1314@gmail.com', '1', NULL, '1', NULL, '2019-12-06 15:22:52', '2019-12-06 15:22:52'),
(2, 'Shohel Rana', 'gsshohel1314@gmail.com', '1', NULL, '1', NULL, '2019-12-06 15:24:08', '2019-12-06 15:24:08'),
(3, 'Shohel Rana', 'gsshohel1314@gmail.com', 'Bus_2', NULL, 'Sukrabad (08:00 AM)', NULL, '2019-12-06 15:26:39', '2019-12-06 15:26:39'),
(4, 'Shohel Rana', 'gsshohel1314@gmail.com', 'Bus_1', NULL, 'kolabagan (08:30 AM)', NULL, '2019-12-06 15:37:51', '2019-12-06 15:37:51'),
(5, 'Shohel Rana', 'gsshohel1314@gmail.com', 'Bus_1', NULL, 'kolabagan (08:30 AM)', NULL, '2019-12-06 15:41:05', '2019-12-06 15:41:05'),
(6, 'Shohel Rana', 'gsshohel1314@gmail.com', 'Bus_1', NULL, 'kolabagan (08:30 AM)', NULL, '2019-12-06 15:42:00', '2019-12-06 15:42:00'),
(7, 'Rokon', 'rokon@gmail.com', 'Bus_2', NULL, 'Sukrabad (08:00 AM)', NULL, '2019-12-06 16:21:27', '2019-12-06 16:21:27'),
(8, 'Rokon', 'rokon@gmail.com', 'Bus_2', NULL, 'Sukrabad (08:00 AM)', NULL, '2019-12-06 16:21:54', '2019-12-06 16:21:54'),
(9, 'Rokon', 'rokon@gmail.com', 'Bus_2', NULL, 'Sukrabad (08:00 AM)', NULL, '2019-12-06 16:24:11', '2019-12-06 16:24:11'),
(10, 'Shohel Rana', 'gsshohel1314@gmail.com', 'Bus_1', NULL, 'Sukrabad (08:00 AM)', NULL, '2019-12-06 16:24:31', '2019-12-06 16:24:31'),
(11, 'Shohel Rana', 'gsshohel1314@gmail.com', 'Bus_2', NULL, 'City College (09:00 AM)', NULL, '2019-12-06 16:26:11', '2019-12-06 16:26:11');

-- --------------------------------------------------------

--
-- Table structure for table `bus_routes`
--

CREATE TABLE `bus_routes` (
  `id` int(10) UNSIGNED NOT NULL,
  `busName` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `busRoute` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `bus_routes`
--

INSERT INTO `bus_routes` (`id`, `busName`, `busRoute`, `created_at`, `updated_at`) VALUES
(1, 'Bus_1', 'Sukrabad-Kolabagan-Panthopoth-Framget-Asadget-Dhanmondi_27-Sukrabad', '2019-11-14 07:39:29', NULL),
(2, 'Bus_2', 'Sukrabad-Kolabagan-Citycollege-Mohammadpur-Asadget-Dhanmondi_27-Sukrabad', '2019-11-14 07:40:03', NULL),
(3, 'Bus_3', 'Sukrabad-Kolabagan-Panthopoth-Framget-Asadget-Dhanmondi_27-motijil-Sukrabad', '2019-11-27 07:26:28', NULL),
(4, 'Bus_5', 'Sukrabad-Kolabagan-Panthopoth-Framget-Asadget-Dhanmondi_27-motijil-Sukrabad', '2019-12-11 08:00:24', '2019-12-11 08:00:24');

-- --------------------------------------------------------

--
-- Table structure for table `employee_messages`
--

CREATE TABLE `employee_messages` (
  `id` int(10) UNSIGNED NOT NULL,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `role` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `subject` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `description` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `employee_messages`
--

INSERT INTO `employee_messages` (`id`, `name`, `email`, `role`, `subject`, `description`, `created_at`, `updated_at`) VALUES
(6, 'rokon', 'rokon@gmail.com', 'Employee', 'document', 'amra sonar abangla ami tomay valobasi', '2019-12-12 16:46:06', '2019-12-12 16:46:06'),
(7, 'rokon', 'rokon@gmail.com', 'Employee', 'ami', 'sdfsgfdsgdfsgdf', '2019-12-12 16:46:25', '2019-12-12 16:46:25'),
(8, 'rokon', 'rokon@gmail.com', 'Employee', 'gdfgfd', 'tumitumiiiiiiiiiiiiiiiiiiiiiiiiiiiiiiiiiiiiiiiiiiiiiiiiiiiiiiiiiiiiiiiiiiiiiiiiiiiiiiiiiii', '2019-12-12 16:46:38', '2019-12-12 16:46:38'),
(9, 'rokon', 'rokon@gmail.com', 'Employee', 'computer', 'new computer is comming', '2019-12-12 17:34:02', '2019-12-12 17:34:02'),
(10, 'rokon', 'rokon@gmail.com', 'Employee', 'laptop', 'new laptop is comming', '2019-12-12 17:37:23', '2019-12-12 17:37:23'),
(11, 'Saddam', 'saddam@gmail.com', 'Employee', 'computer', 'amra sonar abangla ami tomay valobasi', '2019-12-12 17:40:50', '2019-12-12 17:40:50');

-- --------------------------------------------------------

--
-- Table structure for table `migrations`
--

CREATE TABLE `migrations` (
  `id` int(10) UNSIGNED NOT NULL,
  `migration` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `batch` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `migrations`
--

INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES
(2, '2014_10_12_100000_create_password_resets_table', 1),
(5, '2019_11_08_094441_create_bus_routes_table', 1),
(7, '2019_10_14_204131_create_user_roles_table', 2),
(9, '2019_11_08_102109_create_request_buses_table', 3),
(12, '2019_12_06_204749_create_assign_buses_table', 5),
(13, '2019_11_08_084552_create_pick_ups_table', 6),
(14, '2014_10_12_000000_create_users_table', 7),
(16, '2019_12_10_192413_create_employee_messages_table', 9),
(17, '2019_12_10_192428_create_admin_messages_table', 9);

-- --------------------------------------------------------

--
-- Table structure for table `password_resets`
--

CREATE TABLE `password_resets` (
  `email` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `password_resets`
--

INSERT INTO `password_resets` (`email`, `token`, `created_at`) VALUES
('gsshohel1314@gmail.com', '$2y$10$TvF4Gbm7dCveo0nvWAurjOor.MLMgzrEfQZhpqTvhzDeaRMxxUWk2', '2019-12-05 12:46:46');

-- --------------------------------------------------------

--
-- Table structure for table `pick_ups`
--

CREATE TABLE `pick_ups` (
  `id` int(10) UNSIGNED NOT NULL,
  `pickPoint` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `pick_ups`
--

INSERT INTO `pick_ups` (`id`, `pickPoint`, `created_at`, `updated_at`) VALUES
(1, 'kolabagan (08:30 AM)', '2019-12-06 15:08:16', NULL),
(2, 'Sukrabad (08:00 AM)', '2019-12-06 15:08:47', NULL),
(4, 'nilkhet (09:30 AM)', '2019-12-06 15:10:13', NULL),
(6, 'kolabagan (12:30 AM)', '2019-12-11 06:23:54', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `request_buses`
--

CREATE TABLE `request_buses` (
  `id` int(10) UNSIGNED NOT NULL,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `pickPoint` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `is_approved` tinyint(1) NOT NULL DEFAULT '0',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `request_buses`
--

INSERT INTO `request_buses` (`id`, `name`, `email`, `pickPoint`, `is_approved`, `created_at`, `updated_at`) VALUES
(1, 'bosira', 'gsshohel1314@gmail.com', 'City College', 1, '2019-11-14 09:38:52', '2019-11-14 09:46:06'),
(2, 'kobir', 'gsshohel1314@gmail.com', 'City College', 1, '2019-11-14 09:39:14', '2019-11-14 10:03:24'),
(4, 'Shohel', 'gsshohel1314@gmail.com', 'Sukrabad', 1, '2019-11-14 09:43:47', '2019-12-06 08:12:30'),
(5, 'Rokon', 'rokon@gmail.com', 'kolabagan', 0, '2019-11-14 09:44:54', '2019-12-06 13:08:48'),
(6, 'Rokon', 'rokon@gmail.com', 'City College', 0, '2019-11-14 09:58:20', '2019-12-06 13:03:42'),
(7, 'Shohel', 'gsshohel1314@gmail.com', 'Sukrabad', 0, '2019-11-14 09:59:37', '2019-12-06 12:57:56'),
(9, 'Shohel Rana', 'gsshohel1314@gmail.com', 'nilkhet (09:30 AM)', 0, '2019-12-06 15:11:14', NULL),
(10, 'Shohel Rana', 'gsshohel1314@gmail.com', 'kolabagan (12:30 AM)', 0, '2019-12-11 10:15:22', '2019-12-11 10:43:53'),
(11, 'Shohel Rana', 'gsshohel1314@gmail.com', 'nilkhet (09:30 AM)', 1, '2019-12-11 10:16:14', '2019-12-11 10:22:13');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(10) UNSIGNED NOT NULL,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `role_id` int(11) NOT NULL DEFAULT '3',
  `phone` int(11) NOT NULL,
  `status` tinyint(1) NOT NULL DEFAULT '0',
  `password` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `name`, `email`, `role_id`, `phone`, `status`, `password`, `remember_token`, `created_at`, `updated_at`, `deleted_at`) VALUES
(1, 'Shohel Rana', 'gsshohel1314@gmail.com', 1, 1723559950, 1, '$2y$10$iB6Ro5MUq7YGi4eihpbUOe0ihJFs6a5cG4JEn2qub4KIDvecgmCqG', 'xRtZycb91zTGFgTsTigmHeWwQgpx56fAWmLniQp0pV3bcCuMmlkDuoS2ZrX8', '2019-12-09 15:16:53', '2019-12-11 06:00:02', NULL),
(6, 'Saddam', 'saddam@gmail.com', 2, 1725668821, 1, '$2y$10$tpgF8MZIlZsPjDGPu3UO1eib8xv4Tvmq5tYXJ73XKcUCqIgywMVPK', 'CfhYbA5FgG7wsdhAjuMsmhpZwB09ftAsp3gqn0e6CApqmA7fFyRIVEiKtGEe', '2019-12-11 05:58:37', '2019-12-11 05:58:37', NULL),
(7, 'rokon', 'rokon@gmail.com', 2, 1723559961, 0, '$2y$10$687UCdfbgY/WGO/wrrE3ieh8SgfbxNFL9BPHKVItdXngoz1OjuGta', NULL, '2019-12-11 06:01:28', '2019-12-13 10:29:38', '2019-12-13 10:29:38');

-- --------------------------------------------------------

--
-- Table structure for table `user_roles`
--

CREATE TABLE `user_roles` (
  `id` int(10) UNSIGNED NOT NULL,
  `name` varchar(20) COLLATE utf8mb4_unicode_ci NOT NULL,
  `status` int(11) NOT NULL DEFAULT '1',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `user_roles`
--

INSERT INTO `user_roles` (`id`, `name`, `status`, `created_at`, `updated_at`) VALUES
(1, 'Admin', 1, '2019-11-13 01:00:00', NULL),
(2, 'Employee', 1, '2019-11-12 23:00:00', NULL);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admin_messages`
--
ALTER TABLE `admin_messages`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `assign_buses`
--
ALTER TABLE `assign_buses`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `bus_routes`
--
ALTER TABLE `bus_routes`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `employee_messages`
--
ALTER TABLE `employee_messages`
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
-- Indexes for table `pick_ups`
--
ALTER TABLE `pick_ups`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `request_buses`
--
ALTER TABLE `request_buses`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `users_email_unique` (`email`);

--
-- Indexes for table `user_roles`
--
ALTER TABLE `user_roles`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `user_roles_name_unique` (`name`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `admin_messages`
--
ALTER TABLE `admin_messages`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `assign_buses`
--
ALTER TABLE `assign_buses`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT for table `bus_routes`
--
ALTER TABLE `bus_routes`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `employee_messages`
--
ALTER TABLE `employee_messages`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT for table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=18;

--
-- AUTO_INCREMENT for table `pick_ups`
--
ALTER TABLE `pick_ups`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `request_buses`
--
ALTER TABLE `request_buses`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `user_roles`
--
ALTER TABLE `user_roles`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
