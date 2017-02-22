-- phpMyAdmin SQL Dump
-- version 4.0.10deb1
-- http://www.phpmyadmin.net
--
-- Host: localhost
-- Generation Time: May 31, 2016 at 05:23 PM
-- Server version: 5.5.47-0ubuntu0.14.04.1
-- PHP Version: 5.5.9-1ubuntu4.14

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `mheshimiwa`
--

-- --------------------------------------------------------

--
-- Table structure for table `constituencies`
--

CREATE TABLE IF NOT EXISTS `constituencies` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `county_id` int(11) NOT NULL,
  `name` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `county_id` (`county_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=18 ;

--
-- Dumping data for table `constituencies`
--

INSERT INTO `constituencies` (`id`, `county_id`, `name`, `created_at`, `updated_at`) VALUES
(1, 1, 'turkana A', '2016-05-30 07:55:27', '2016-05-30 07:55:27'),
(2, 1, 'turkana B', '2016-05-30 07:55:50', '2016-05-30 07:55:50'),
(3, 2, '1A', '2016-05-30 07:55:59', '2016-05-30 07:55:59'),
(4, 2, '1B', '2016-05-30 07:56:09', '2016-05-30 07:56:09'),
(5, 3, 'new 1', '2016-05-30 07:56:22', '2016-05-30 07:56:22'),
(6, 3, 'new 2', '2016-05-30 07:56:30', '2016-05-30 07:56:30'),
(7, 4, 'marakwet', '2016-05-30 07:56:40', '2016-05-30 07:56:40'),
(8, 4, 'keiyo', '2016-05-30 07:56:52', '2016-05-30 07:56:52'),
(9, 5, 'kabarnet', '2016-05-30 07:57:06', '2016-05-30 07:57:06'),
(10, 5, 'perkera', '2016-05-30 07:57:17', '2016-05-30 07:57:17'),
(11, 6, 'iten', '2016-05-30 07:57:37', '2016-05-30 07:57:37'),
(12, 7, 'pwa 1', '2016-05-30 07:57:58', '2016-05-30 07:57:58'),
(13, 8, 'lamu A', '2016-05-30 07:58:14', '2016-05-30 07:58:14'),
(14, 9, 'meru A', '2016-05-30 07:58:26', '2016-05-30 07:58:26'),
(15, 10, 'new thika', '2016-05-30 07:58:40', '2016-05-30 07:58:40'),
(16, 11, 'poshomill', '2016-05-30 07:58:52', '2016-05-30 07:58:52'),
(17, 12, 'new bungoma', '2016-05-30 07:59:03', '2016-05-30 07:59:03');

-- --------------------------------------------------------

--
-- Table structure for table `counties`
--

CREATE TABLE IF NOT EXISTS `counties` (
  `id` int(10) NOT NULL AUTO_INCREMENT,
  `region_id` int(11) NOT NULL,
  `name` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `region_id` (`region_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=15 ;

--
-- Dumping data for table `counties`
--

INSERT INTO `counties` (`id`, `region_id`, `name`, `created_at`, `updated_at`) VALUES
(1, 2, 'turkana', '2016-05-30 07:51:13', '2016-05-30 07:51:13'),
(2, 2, 'turkana 1', '2016-05-30 07:51:28', '2016-05-30 07:51:28'),
(3, 2, 'new turkana', '2016-05-30 07:51:52', '2016-05-30 07:51:52'),
(4, 3, 'elgeiyo marakwet', '2016-05-30 07:52:13', '2016-05-30 07:52:13'),
(5, 3, 'baringo', '2016-05-30 07:52:21', '2016-05-30 07:52:21'),
(6, 3, 'keiyo', '2016-05-30 07:52:34', '2016-05-30 07:52:34'),
(7, 4, 'pwani', '2016-05-30 07:53:25', '2016-05-30 07:53:25'),
(8, 4, 'lamu', '2016-05-30 07:53:34', '2016-05-30 07:53:34'),
(9, 5, 'meru', '2016-05-30 07:53:57', '2016-05-30 07:53:57'),
(10, 5, 'thika', '2016-05-30 07:54:19', '2016-05-30 07:54:19'),
(11, 6, 'kakamega', '2016-05-30 07:54:30', '2016-05-30 07:54:30'),
(12, 6, 'bungoma', '2016-05-30 07:54:48', '2016-05-30 07:54:48'),
(13, 8, 'my reg', '2016-05-30 09:00:28', '2016-05-30 09:00:28'),
(14, 6, 'sdce', '2016-05-30 09:45:47', '2016-05-30 09:45:47');

-- --------------------------------------------------------

--
-- Table structure for table `education_levels`
--

CREATE TABLE IF NOT EXISTS `education_levels` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `migrations`
--

CREATE TABLE IF NOT EXISTS `migrations` (
  `migration` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `batch` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `migrations`
--

INSERT INTO `migrations` (`migration`, `batch`) VALUES
('2014_10_12_000000_create_users_table', 1),
('2014_10_12_100000_create_password_resets_table', 1),
('2016_05_20_113226_create_wards_table', 1),
('2016_05_21_082301_create_constituencies_table', 1),
('2016_05_21_093346_create_counties_table', 1),
('2016_05_21_093439_create_regions_table', 1),
('2016_05_21_093554_create_political_parties_table', 1),
('2016_05_24_065420_create_political_levels_table', 1),
('2016_05_24_065502_create_education_levels_table', 1),
('2016_05_24_073808_create_profiles_table', 1);

-- --------------------------------------------------------

--
-- Table structure for table `password_resets`
--

CREATE TABLE IF NOT EXISTS `password_resets` (
  `email` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `token` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  KEY `password_resets_email_index` (`email`),
  KEY `password_resets_token_index` (`token`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `password_resets`
--

INSERT INTO `password_resets` (`email`, `token`, `created_at`) VALUES
('dereva@gmail.com', '7fb442bfa47ef2ac7669383882ee58558889b68a59fc2a7e8e47cf512070b099', '2016-05-31 02:52:00'),
('tarusdaniel89@gmail.com', '54f0be7babd86c2b774d23c5816ab411d9c03eb607be83b27b2d3b349d2ef04b', '2016-05-31 04:03:58');

-- --------------------------------------------------------

--
-- Table structure for table `political_levels`
--

CREATE TABLE IF NOT EXISTS `political_levels` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `political_parties`
--

CREATE TABLE IF NOT EXISTS `political_parties` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `abbreviation` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `active` tinyint(1) NOT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=3 ;

--
-- Dumping data for table `political_parties`
--

INSERT INTO `political_parties` (`id`, `name`, `abbreviation`, `active`, `deleted_at`, `created_at`, `updated_at`) VALUES
(2, 'kenya Africa Democraticl Union', 'KADU', 0, NULL, '2016-05-27 17:15:58', '2016-05-27 17:15:58');

-- --------------------------------------------------------

--
-- Table structure for table `profiles`
--

CREATE TABLE IF NOT EXISTS `profiles` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `user_id` int(11) NOT NULL,
  `region_id` int(11) NOT NULL,
  `county_id` int(11) NOT NULL,
  `constituency_id` int(11) NOT NULL,
  `ward_id` int(11) NOT NULL,
  `fname` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `lname` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `surname` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `id_number` int(11) NOT NULL,
  `dob` date NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `user_id` (`user_id`),
  KEY `region_id` (`region_id`),
  KEY `county_id` (`county_id`),
  KEY `constituency_id` (`constituency_id`),
  KEY `ward_id` (`ward_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=7 ;

--
-- Dumping data for table `profiles`
--

INSERT INTO `profiles` (`id`, `user_id`, `region_id`, `county_id`, `constituency_id`, `ward_id`, `fname`, `lname`, `surname`, `id_number`, `dob`, `created_at`, `updated_at`) VALUES
(2, 20, 2, 1, 16, 7, 'sdfghjm', 'sdfg', 'asgrthy', 32643999, '0000-00-00', '2016-05-30 12:01:02', '2016-05-30 12:01:02'),
(4, 18, 3, 13, 15, 7, 'danny', 'tarus', 'kemboi', 32547683, '0000-00-00', '2016-05-30 12:01:57', '2016-05-31 06:13:15'),
(5, 21, 3, 12, 14, 6, 'tenoi', 'judge', 'tribunal', 12658933, '0000-00-00', '2016-05-31 06:02:22', '2016-05-31 06:02:22'),
(6, 15, 2, 6, 7, 7, 'danny', 'tarus', 'kembo', 32643999, '1994-04-14', '2016-05-31 06:20:29', '2016-05-31 06:20:29');

-- --------------------------------------------------------

--
-- Table structure for table `regions`
--

CREATE TABLE IF NOT EXISTS `regions` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=9 ;

--
-- Dumping data for table `regions`
--

INSERT INTO `regions` (`id`, `name`, `created_at`, `updated_at`) VALUES
(2, 'north rift', '2016-05-30 07:46:15', '2016-05-30 07:46:15'),
(3, 'south rift', '2016-05-30 07:46:23', '2016-05-30 07:46:23'),
(4, 'coast', '2016-05-30 07:46:29', '2016-05-30 07:46:29'),
(5, 'central', '2016-05-30 07:46:38', '2016-05-30 07:46:38'),
(6, 'western', '2016-05-30 07:46:59', '2016-05-30 07:46:59'),
(8, 'asdf', '2016-05-30 08:53:49', '2016-05-30 08:53:49');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE IF NOT EXISTS `users` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `user_role` varchar(255) COLLATE utf8_unicode_ci NOT NULL DEFAULT 'member',
  `gender` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `password` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `remember_token` varchar(100) COLLATE utf8_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `users_email_unique` (`email`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=22 ;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `name`, `user_role`, `gender`, `email`, `password`, `remember_token`, `created_at`, `updated_at`) VALUES
(10, 'dereva', 'member', 'male', 'dereva@gmail.com', 'dereva', NULL, NULL, NULL),
(15, 'tarus', 'member', 'male', 'tarus@gmail.com', '$2y$10$5rT8YjcyKlc118oB3Vftju3XUQRo2UyCYfYH60pOcEbEH./TfaTda', 'YoduFWyKqujLPMZ7A6lKKrPcXi8rtAMGwCMLgqAvfv6hMW26zxyY47p8aaCu', '2016-05-28 09:52:58', '2016-05-28 09:53:03'),
(16, 'delpiero', 'member', 'male', 'delpiero@gmail.com', '$2y$10$tFbTDJrDGeN7qUY8hi8N9.xLRBhfluhWl1kdgeTeAEjawwvVGdYgC', NULL, '2016-05-28 09:53:27', '2016-05-28 09:53:27'),
(17, 'dann', 'member', 'male', 'dann@gmail.com', '$2y$10$Xz56xxC/nF4LEnJiLYTJUuYKikzOgi527Fj/xf0pPHwbqn.Fk9t2a', NULL, '2016-05-28 10:24:35', '2016-05-28 10:24:35'),
(18, 'danny', 'member', 'male', 'danny.santacruz.31@facebook.com', '$2y$10$XQDJOpozvCiHJZvJfOKiGOdAXHJiGktCelD3V4je/DTRSAgBYqcYC', 'tAc7B5TUtrlFB8tasH4rkZWUhcasXbhN2nPSO44NEhFukEoMxAphpKg9g3na', '2016-05-29 05:02:20', '2016-05-31 02:45:56'),
(19, 'AGWATA ONGUTI RONALD', 'member', 'male', 'ronaldagwata@gmail.com', '$2y$10$uDHEsYrp4bn0x1pqgY.OmuN18GADbrGrdZ4/D8w4H02rTyZE4KzuK', NULL, '2016-05-29 05:40:36', '2016-05-29 05:40:36'),
(20, 'louis', 'member', 'female', 'louis@gmail.com', '$2y$10$80wvcMa2lIva5D3vmfSsXeri5s9tzFDQbZkr9vwmDKD0HYOmELZA2', 'aQqJ7nZriuZn4ORZ7zOiB0G7ZOSOe80xl6QQSdexHB0ib8TeYRl1iy1aiX5v', '2016-05-30 06:24:42', '2016-05-30 17:48:10'),
(21, 'tarus', 'member', 'male', 'tarusdaniel89@gmail.com', '$2y$10$sXWpOoWsZT4yzm0OdmZBM.KrxF9e9Ci0rUejiEzV2KXecUiKKpTDC', 'eqfObm99FsZ3ywD0w0O2T8UHoGD197fbwJGjn26Sd6twtiv7SqVN9LfYe8qF', '2016-05-31 03:11:07', '2016-05-31 03:11:23');

-- --------------------------------------------------------

--
-- Table structure for table `wards`
--

CREATE TABLE IF NOT EXISTS `wards` (
  `id` int(10) NOT NULL AUTO_INCREMENT,
  `constituency_id` int(11) NOT NULL,
  `name` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `constituency_id` (`constituency_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=15 ;

--
-- Dumping data for table `wards`
--

INSERT INTO `wards` (`id`, `constituency_id`, `name`, `created_at`, `updated_at`) VALUES
(1, 1, 'tur 1', '2016-05-30 07:59:37', '2016-05-30 07:59:37'),
(2, 2, 'tur 2', '2016-05-30 07:59:48', '2016-05-30 07:59:48'),
(3, 3, '!A 1', '2016-05-30 08:00:00', '2016-05-30 08:00:00'),
(4, 4, 'B12', '2016-05-30 08:00:10', '2016-05-30 08:00:10'),
(5, 5, 'new 12', '2016-05-30 08:00:38', '2016-05-30 08:00:38'),
(6, 5, 'new 22', '2016-05-30 08:00:49', '2016-05-30 08:00:49'),
(7, 7, 'kaps', '2016-05-30 08:01:10', '2016-05-30 08:01:10'),
(8, 8, 'kerio view', '2016-05-30 08:01:39', '2016-05-30 08:01:39'),
(9, 12, 'pwa 12', '2016-05-30 08:01:51', '2016-05-30 08:01:51'),
(10, 13, 'lamu 12', '2016-05-30 08:02:04', '2016-05-30 08:02:04'),
(11, 14, 'wambogo', '2016-05-30 08:02:19', '2016-05-30 08:02:19'),
(12, 15, 'marakwet', '2016-05-30 08:02:29', '2016-05-30 08:02:29'),
(13, 16, 'kitale', '2016-05-30 08:02:51', '2016-05-30 08:02:51'),
(14, 17, 'busia', '2016-05-30 08:03:09', '2016-05-30 08:03:09');

--
-- Constraints for dumped tables
--

--
-- Constraints for table `constituencies`
--
ALTER TABLE `constituencies`
  ADD CONSTRAINT `constituencies_ibfk_1` FOREIGN KEY (`county_id`) REFERENCES `counties` (`id`);

--
-- Constraints for table `counties`
--
ALTER TABLE `counties`
  ADD CONSTRAINT `counties_ibfk_1` FOREIGN KEY (`region_id`) REFERENCES `regions` (`id`);

--
-- Constraints for table `profiles`
--
ALTER TABLE `profiles`
  ADD CONSTRAINT `profiles_ibfk_5` FOREIGN KEY (`ward_id`) REFERENCES `wards` (`id`),
  ADD CONSTRAINT `profiles_ibfk_1` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `profiles_ibfk_2` FOREIGN KEY (`region_id`) REFERENCES `regions` (`id`),
  ADD CONSTRAINT `profiles_ibfk_3` FOREIGN KEY (`county_id`) REFERENCES `counties` (`id`),
  ADD CONSTRAINT `profiles_ibfk_4` FOREIGN KEY (`constituency_id`) REFERENCES `constituencies` (`id`);

--
-- Constraints for table `wards`
--
ALTER TABLE `wards`
  ADD CONSTRAINT `wards_ibfk_1` FOREIGN KEY (`constituency_id`) REFERENCES `constituencies` (`id`);

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
