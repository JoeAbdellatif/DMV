-- phpMyAdmin SQL Dump
-- version 4.9.2
-- https://www.phpmyadmin.net/
--
-- Host: localhost
-- Generation Time: Dec 20, 2022 at 09:28 AM
-- Server version: 8.0.23
-- PHP Version: 7.4.0

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `dmv`
--

-- --------------------------------------------------------

--
-- Table structure for table `categories`
--

DROP TABLE IF EXISTS `categories`;
CREATE TABLE IF NOT EXISTS `categories` (
  `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT,
  `CategoryName` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=13 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `categories`
--

INSERT INTO `categories` (`id`, `CategoryName`, `created_at`, `updated_at`) VALUES
(1, 'Private cars', '2022-02-11 22:00:00', '2022-02-11 22:00:00'),
(2, 'Other private vehicles: Ambulances, etc..', '2022-02-11 22:00:00', '2022-02-11 22:00:00'),
(3, 'Private transport vehicles', '2022-02-11 22:00:00', '2022-02-11 22:00:00'),
(4, 'Taxis', '2022-02-11 22:00:00', '2022-02-11 22:00:00'),
(5, 'Public buses & minibuses', '2022-02-11 22:00:00', '2022-02-11 22:00:00'),
(6, 'Motorcycles', '2022-02-11 22:00:00', '2022-02-11 22:00:00'),
(7, 'Mass public transport trucks', '2022-02-11 22:00:00', '2022-02-11 22:00:00'),
(11, 'Rent Car', '2022-12-17 13:23:50', '2022-12-17 13:23:50');

-- --------------------------------------------------------

--
-- Table structure for table `contacts`
--

DROP TABLE IF EXISTS `contacts`;
CREATE TABLE IF NOT EXISTS `contacts` (
  `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `subject` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `message` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `horsepowers`
--

DROP TABLE IF EXISTS `horsepowers`;
CREATE TABLE IF NOT EXISTS `horsepowers` (
  `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT,
  `powers` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=7 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `horsepowers`
--

INSERT INTO `horsepowers` (`id`, `powers`, `created_at`, `updated_at`) VALUES
(1, '01-10', '2022-02-11 22:00:00', '2022-02-11 22:00:00'),
(2, '11-20', '2022-02-11 22:00:00', '2022-02-11 22:00:00'),
(3, '21-30', '2022-02-11 22:00:00', '2022-02-11 22:00:00'),
(4, '31-40', '2022-02-11 22:00:00', '2022-02-11 22:00:00'),
(5, '41-50', '2022-02-11 22:00:00', '2022-02-11 22:00:00'),
(6, '51 and above', '2022-02-11 22:00:00', '2022-02-11 22:00:00');

-- --------------------------------------------------------

--
-- Table structure for table `migrations`
--

DROP TABLE IF EXISTS `migrations`;
CREATE TABLE IF NOT EXISTS `migrations` (
  `id` int UNSIGNED NOT NULL AUTO_INCREMENT,
  `migration` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `batch` int NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `migrations`
--

INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES
(1, '2019_12_14_000001_create_personal_access_tokens_table', 1),
(2, '2022_02_12_130110_create_users_table', 1),
(3, '2022_02_12_132727_create_vehicles_table', 2),
(4, '2022_02_12_134918_create_ticket_infos_table', 2),
(5, '2022_12_19_211909_create_contacts_table', 3);

-- --------------------------------------------------------

--
-- Table structure for table `models_years`
--

DROP TABLE IF EXISTS `models_years`;
CREATE TABLE IF NOT EXISTS `models_years` (
  `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT,
  `years` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `models_years`
--

INSERT INTO `models_years` (`id`, `years`, `created_at`, `updated_at`) VALUES
(1, '2008 and before', '2022-02-11 22:00:00', '2022-02-11 22:00:00'),
(2, '2009-2016', '2022-02-11 22:00:00', '2022-02-11 22:00:00'),
(3, '2017-2019', '2022-02-11 22:00:00', '2022-02-11 22:00:00'),
(4, '2020-2021', '2022-02-11 22:00:00', '2022-02-11 22:00:00'),
(5, '2022 and above', '2022-02-11 22:00:00', '2022-02-11 22:00:00');

-- --------------------------------------------------------

--
-- Table structure for table `personal_access_tokens`
--

DROP TABLE IF EXISTS `personal_access_tokens`;
CREATE TABLE IF NOT EXISTS `personal_access_tokens` (
  `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT,
  `tokenable_type` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `tokenable_id` bigint UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(64) COLLATE utf8mb4_unicode_ci NOT NULL,
  `abilities` text COLLATE utf8mb4_unicode_ci,
  `last_used_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `personal_access_tokens_token_unique` (`token`),
  KEY `personal_access_tokens_tokenable_type_tokenable_id_index` (`tokenable_type`,`tokenable_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `roles`
--

DROP TABLE IF EXISTS `roles`;
CREATE TABLE IF NOT EXISTS `roles` (
  `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT,
  `RoleName` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `roles`
--

INSERT INTO `roles` (`id`, `RoleName`, `created_at`, `updated_at`) VALUES
(1, 'Admin', '2022-02-11 22:00:00', '2022-02-11 22:00:00');

-- --------------------------------------------------------

--
-- Table structure for table `ticket_infos`
--

DROP TABLE IF EXISTS `ticket_infos`;
CREATE TABLE IF NOT EXISTS `ticket_infos` (
  `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT,
  `VehicleNo` bigint UNSIGNED NOT NULL,
  `Type` bigint UNSIGNED NOT NULL,
  `Amount` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `ExpiryDate` datetime NOT NULL,
  `isDeleted` tinyint(1) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `Reason` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  PRIMARY KEY (`id`),
  KEY `ticket_infos_vehicleno_foreign` (`VehicleNo`),
  KEY `ticket_infos_type_foreign` (`Type`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `ticket_types`
--

DROP TABLE IF EXISTS `ticket_types`;
CREATE TABLE IF NOT EXISTS `ticket_types` (
  `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT,
  `TypeName` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `ticket_types`
--

INSERT INTO `ticket_types` (`id`, `TypeName`) VALUES
(1, 'Parking'),
(2, 'Red light camera'),
(3, 'Speed camera');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

DROP TABLE IF EXISTS `users`;
CREATE TABLE IF NOT EXISTS `users` (
  `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT,
  `firstName` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `lastName` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `avatar` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `password` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `RoleId` bigint UNSIGNED NOT NULL,
  `isDeleted` tinyint(1) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `users_email_unique` (`email`),
  KEY `users_roleid_foreign` (`RoleId`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `firstName`, `lastName`, `avatar`, `email`, `password`, `RoleId`, `isDeleted`, `created_at`, `updated_at`) VALUES
(1, 'admin', 'admin', 'admin', 'admin@admin.com', '$2y$10$Ts47V.neFLWKRc4C1KRPkuGoEWiZbv0EZbyzrd/kkWpffh4w8sa0W', 1, 0, '2022-02-11 22:00:00', '2022-02-11 22:00:00');

-- --------------------------------------------------------

--
-- Table structure for table `vehicles`
--

DROP TABLE IF EXISTS `vehicles`;
CREATE TABLE IF NOT EXISTS `vehicles` (
  `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT,
  `Name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `FatherName` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `MotherName` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `PhoneNumber` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `Address` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `Platenumber` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `Model` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `VehicleCode` bigint UNSIGNED NOT NULL,
  `ModelYear` bigint UNSIGNED NOT NULL,
  `Horsepower` bigint UNSIGNED NOT NULL,
  `Category` bigint UNSIGNED NOT NULL,
  `color` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `EngineSerialNumber` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `StructureNo` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `MotorLicense` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `RegistrationDate` datetime NOT NULL,
  `FirstRegistrationDate` datetime NOT NULL,
  `isDeleted` tinyint(1) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `vehicles_platenumber_unique` (`Platenumber`),
  KEY `vehicles_vehiclecode_foreign` (`VehicleCode`),
  KEY `vehicles_modelyear_foreign` (`ModelYear`),
  KEY `vehicles_horsepower_foreign` (`Horsepower`),
  KEY `vehicles_category_foreign` (`Category`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `vehicles_codes`
--

DROP TABLE IF EXISTS `vehicles_codes`;
CREATE TABLE IF NOT EXISTS `vehicles_codes` (
  `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT,
  `CodeName` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=17 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `vehicles_codes`
--

INSERT INTO `vehicles_codes` (`id`, `CodeName`, `created_at`, `updated_at`) VALUES
(1, 'A - NOT CODED', '2022-02-11 22:00:00', '2022-02-11 22:00:00'),
(2, 'AG - AP - MP', '2022-02-11 22:00:00', '2022-02-11 22:00:00'),
(3, 'B', '2022-02-11 22:00:00', '2022-02-11 22:00:00'),
(4, 'C', '2022-02-11 22:00:00', '2022-02-11 22:00:00'),
(5, 'C1', '2022-02-11 22:00:00', '2022-02-11 22:00:00'),
(6, 'G', '2022-02-11 22:00:00', '2022-02-11 22:00:00'),
(7, 'J', '2022-02-11 22:00:00', '2022-02-11 22:00:00'),
(8, 'M', '2022-02-11 22:00:00', '2022-02-11 22:00:00'),
(9, 'N', '2022-02-11 22:00:00', '2022-02-11 22:00:00'),
(10, 'O', '2022-02-11 22:00:00', '2022-02-11 22:00:00'),
(11, 'P', '2022-02-11 22:00:00', '2022-02-11 22:00:00'),
(12, 'R', '2022-02-11 22:00:00', '2022-02-11 22:00:00'),
(13, 'S', '2022-02-11 22:00:00', '2022-02-11 22:00:00'),
(14, 'T', '2022-02-11 22:00:00', '2022-02-11 22:00:00'),
(15, 'Y', '2022-02-11 22:00:00', '2022-02-11 22:00:00'),
(16, 'Z', '2022-02-11 22:00:00', '2022-02-11 22:00:00');

--
-- Constraints for dumped tables
--

--
-- Constraints for table `ticket_infos`
--
ALTER TABLE `ticket_infos`
  ADD CONSTRAINT `ticket_infos_type_foreign` FOREIGN KEY (`Type`) REFERENCES `ticket_types` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `ticket_infos_vehicleno_foreign` FOREIGN KEY (`VehicleNo`) REFERENCES `vehicles` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `users`
--
ALTER TABLE `users`
  ADD CONSTRAINT `users_roleid_foreign` FOREIGN KEY (`RoleId`) REFERENCES `roles` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `vehicles`
--
ALTER TABLE `vehicles`
  ADD CONSTRAINT `vehicles_category_foreign` FOREIGN KEY (`Category`) REFERENCES `categories` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `vehicles_horsepower_foreign` FOREIGN KEY (`Horsepower`) REFERENCES `horsepowers` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `vehicles_modelyear_foreign` FOREIGN KEY (`ModelYear`) REFERENCES `models_years` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `vehicles_vehiclecode_foreign` FOREIGN KEY (`VehicleCode`) REFERENCES `vehicles_codes` (`id`) ON DELETE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
