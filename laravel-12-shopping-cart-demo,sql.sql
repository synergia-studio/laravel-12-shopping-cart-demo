-- --------------------------------------------------------
-- Host:                         127.0.0.1
-- Server version:               8.0.43 - MySQL Community Server - GPL
-- Server OS:                    Win64
-- HeidiSQL Version:             12.14.0.7165
-- --------------------------------------------------------

/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET NAMES utf8 */;
/*!50503 SET NAMES utf8mb4 */;
/*!40103 SET @OLD_TIME_ZONE=@@TIME_ZONE */;
/*!40103 SET TIME_ZONE='+00:00' */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;
/*!40111 SET @OLD_SQL_NOTES=@@SQL_NOTES, SQL_NOTES=0 */;


-- Dumping database structure for laravel-12-shopping-cart-demo
CREATE DATABASE IF NOT EXISTS `laravel-12-shopping-cart-demo` /*!40100 DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci */ /*!80016 DEFAULT ENCRYPTION='N' */;
USE `laravel-12-shopping-cart-demo`;

-- Dumping structure for table laravel-12-shopping-cart-demo.cache
CREATE TABLE IF NOT EXISTS `cache` (
  `key` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `value` mediumtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `expiration` int NOT NULL,
  PRIMARY KEY (`key`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Dumping data for table laravel-12-shopping-cart-demo.cache: ~0 rows (approximately)

-- Dumping structure for table laravel-12-shopping-cart-demo.cache_locks
CREATE TABLE IF NOT EXISTS `cache_locks` (
  `key` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `owner` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `expiration` int NOT NULL,
  PRIMARY KEY (`key`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Dumping data for table laravel-12-shopping-cart-demo.cache_locks: ~0 rows (approximately)

-- Dumping structure for table laravel-12-shopping-cart-demo.categories
CREATE TABLE IF NOT EXISTS `categories` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `status` enum('Enabled','Deleted') COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'Enabled',
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `description` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `browser_title` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT '',
  `page_title` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT '',
  `seo_meta_title` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT '',
  `seo_meta_subject` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT '',
  `seo_meta_description` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `seo_meta_keywords` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_user_id` int NOT NULL DEFAULT '0',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_user_id` int NOT NULL DEFAULT '0',
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=8 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Dumping data for table laravel-12-shopping-cart-demo.categories: ~3 rows (approximately)
INSERT INTO `categories` (`id`, `status`, `name`, `description`, `browser_title`, `page_title`, `seo_meta_title`, `seo_meta_subject`, `seo_meta_description`, `seo_meta_keywords`, `created_user_id`, `created_at`, `updated_user_id`, `updated_at`) VALUES
	(1, 'Enabled', 'Inkjet Plotter Paper (2" core)', '<p><span style="font-size: larger"><font color="#ff0000"><font color="#000000">HP plotter paper rolls.&nbsp; Our paper rolls and&nbsp;ink are approved for the&nbsp;all the&nbsp;most popular printers on the market including the HP DesignJet, Canon, Epson, Xerox .<i>...plus many more.</i></font><br /> <br /> </font></span><span style="font-size: larger"><font face="Arial"><font color="#ff0000"><strong>FREE SHIPPING </strong></font>on all wide format paper rolls shipped to continental US.&nbsp;&nbsp; Toll Free 1-888-544-7171</font><span id="1267838129591E" style="display: none">&nbsp;</span><span id="1267838140231E" style="display: none">&nbsp;</span><span id="1267838159618E" style="display: none">&nbsp;</span></span><span id="1267838322678E" style="display: none">&nbsp;</span></p>', '', '', '', '', '', '', 0, '2026-01-09 11:10:50', 0, '2026-01-07 14:47:37'),
	(2, 'Enabled', 'Recycled Paper Rolls (2" cores)', '<p style="text-align: left"><span style="font-size: large"><span style="color: #800000"><strong>Item #30150R<br /> </strong></span></span><span style="font-size: small"><span style="color: #800000"><strong><br /> 30&quot; x 150\'/roll&nbsp;&nbsp;20# Recycled Bond,&nbsp; 2&quot; core (4 rolls/case)<br /> </strong></span></span></p> <ul><span style="color: #000000"><span style="font-size: small"><strong>    <ul>       <li style="text-align: left"><p style="text-align: left"><span style="color: #000000"><span style="font-size: small"><strong>We will <u><em>beat</em></u> any competitors&nbsp;advertised&nbsp;price!!!</strong></span></span>&nbsp;</p>       <table width="339" height="103" cellspacing="1" cellpadding="1" border="2">          <tbody>             <tr>                <td bordercolor="#000000" bgcolor="#000000"><span style="color: #ffffff"><span style="background-color: #000000"><span style="font-size: medium">&nbsp;Qty</span></span></span></td>                <td bordercolor="#000000" bgcolor="#000000"><span style="color: #ffffff"><span style="background-color: #000000"><span style="font-size: medium">&nbsp;Price</span></span></span></td>             </tr>             <tr>                <td bordercolor="#000000"><span style="color: #000000"><span style="font-size: medium">1 cs</span></span></td>                <td bordercolor="#000000"><span style="color: #000000"><span style="font-size: medium">$84.90/case - Free Shipping</span></span></td>             </tr>             <tr>                <td bordercolor="#000000"><span style="color: #000000"><span style="font-size: medium">3 - 11 cs</span></span></td>                <td bordercolor="#000000"><span style="color: #000000"><span style="font-size: medium">$82.90/case - Free Shipping</span></span></td>             </tr>             <tr>                <td bordercolor="#000000"><span style="color: #000000"><span style="font-size: medium">12 - 20 cs</span></span></td>                <td bordercolor="#000000"><span style="color: #000000"><span style="font-size: medium">$78.90/case - Free Shipping</span></span></td>             </tr>             <tr>                <td bordercolor="#000000"><span style="color: #000000"><span style="font-size: medium">20 + cs</span></span></td>                <td bordercolor="#000000"><span style="color: #000000"><span style="font-size: medium">Call for Pricing</span></span></td>             </tr>          </tbody>       </table></li>    </ul>    </strong></span></span></ul>', '', '', '', '', '', '', 1, '2026-01-09 11:10:52', 1, '2026-01-14 15:49:07'),
	(3, 'Enabled', 'HP Designjet Paper & Ink', 'HP Designjet paper and&nbsp;ink cartridges.&nbsp;&nbsp;We have supplies for the popular HP Designjet series of printers.&nbsp; The paper roll sizes that can be used&nbsp;range from&nbsp;100\'\'&nbsp;to 300\'&nbsp;per roll depending on your model number.&nbsp; We have both OEM and remanufactured ink cartridges available.&nbsp; Please call us at 1-888-544-7171 with any questions.&nbsp; Free Shipping on all products!', '', '', '', '', '', '', 0, '2026-01-09 11:10:53', 0, '2026-01-08 14:17:44');

-- Dumping structure for table laravel-12-shopping-cart-demo.failed_jobs
CREATE TABLE IF NOT EXISTS `failed_jobs` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `uuid` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `connection` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `queue` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `payload` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `exception` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `failed_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`),
  UNIQUE KEY `failed_jobs_uuid_unique` (`uuid`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Dumping data for table laravel-12-shopping-cart-demo.failed_jobs: ~0 rows (approximately)

-- Dumping structure for table laravel-12-shopping-cart-demo.job_batches
CREATE TABLE IF NOT EXISTS `job_batches` (
  `id` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `total_jobs` int NOT NULL,
  `pending_jobs` int NOT NULL,
  `failed_jobs` int NOT NULL,
  `failed_job_ids` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `options` mediumtext COLLATE utf8mb4_unicode_ci,
  `cancelled_at` int DEFAULT NULL,
  `created_at` int NOT NULL,
  `finished_at` int DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Dumping data for table laravel-12-shopping-cart-demo.job_batches: ~0 rows (approximately)

-- Dumping structure for table laravel-12-shopping-cart-demo.jobs
CREATE TABLE IF NOT EXISTS `jobs` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `queue` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `payload` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `attempts` tinyint unsigned NOT NULL,
  `reserved_at` int unsigned DEFAULT NULL,
  `available_at` int unsigned NOT NULL,
  `created_at` int unsigned NOT NULL,
  PRIMARY KEY (`id`),
  KEY `jobs_queue_index` (`queue`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Dumping data for table laravel-12-shopping-cart-demo.jobs: ~0 rows (approximately)

-- Dumping structure for table laravel-12-shopping-cart-demo.migrations
CREATE TABLE IF NOT EXISTS `migrations` (
  `id` int unsigned NOT NULL AUTO_INCREMENT,
  `migration` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `batch` int NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=17 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Dumping data for table laravel-12-shopping-cart-demo.migrations: ~8 rows (approximately)
INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES
	(1, '0001_01_01_000000_create_users_table', 1),
	(2, '0001_01_01_000001_create_cache_table', 1),
	(3, '0001_01_01_000002_create_jobs_table', 1),
	(4, '2025_08_14_170933_add_two_factor_columns_to_users_table', 1),
	(6, '2026_01_08_145405_create_categories_table', 1),
	(12, '2026_01_08_150854_create_products_table', 1),
	(14, '2026_01_09_103216_add_columns_to_category_and_product', 1),
	(16, '2026_01_14_153407_additional_user_columns', 1);

-- Dumping structure for table laravel-12-shopping-cart-demo.password_reset_tokens
CREATE TABLE IF NOT EXISTS `password_reset_tokens` (
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`email`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Dumping data for table laravel-12-shopping-cart-demo.password_reset_tokens: ~1 rows (approximately)
INSERT INTO `password_reset_tokens` (`email`, `token`, `created_at`) VALUES
	('rakics@gmail.com', '$2y$12$JLLhl02k3ljkvOadfCtHpOEo/AvCi3nd7Fuibyzpb6pC4e5JRjz2G', '2026-01-14 13:53:27');

-- Dumping structure for table laravel-12-shopping-cart-demo.products
CREATE TABLE IF NOT EXISTS `products` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `status` enum('Enabled','Deleted') COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'Enabled',
  `category_id` int NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `quantity` int NOT NULL DEFAULT '0',
  `price` float NOT NULL DEFAULT '0',
  `description` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `browser_title` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT '',
  `page_title` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT '',
  `seo_meta_title` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT '',
  `seo_meta_subject` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT '',
  `seo_meta_description` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `seo_meta_keywords` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_user_id` int NOT NULL DEFAULT '0',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_user_id` int NOT NULL DEFAULT '0',
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Dumping data for table laravel-12-shopping-cart-demo.products: ~5 rows (approximately)
INSERT INTO `products` (`id`, `status`, `category_id`, `name`, `quantity`, `price`, `description`, `browser_title`, `page_title`, `seo_meta_title`, `seo_meta_subject`, `seo_meta_description`, `seo_meta_keywords`, `created_user_id`, `created_at`, `updated_user_id`, `updated_at`) VALUES
	(1, 'Enabled', 3, 'hdfhdfghg', 50, 30, 'HP Designjet paper and ink cartridges.  We have supplies for the popular HP Designjet series of printers.  The paper roll sizes that can be used range from 100\'\' to 300\' per roll depending on your model number.  We have both OEM and remanufactured ink cartridges available.  Please call us at 1-888-544-7171 with any questions.  Free Shipping on all products!', '', '', '', '', '', '', 1, '2026-01-09 10:52:20', 1, '2026-01-14 15:41:13'),
	(2, 'Enabled', 3, 'An test product name', 100, 23.45, 'HP Designjet paper and ink cartridges.  We have supplies for the popular HP Designjet series of printers.  The paper roll sizes that can be used range from 100\'\' to 300\' per roll depending on your model number.  We have both OEM and remanufactured ink cartridges available.  Please call us at 1-888-544-7171 with any questions.  Free Shipping on all products!', '', '', '', '', '', '', 1, '2026-01-09 10:56:44', 1, '2026-01-14 15:41:01'),
	(3, 'Enabled', 3, 'New product name', 1, 12, 'An test product description', '', '', '', '', '', '', 1, '2026-01-09 11:01:02', 1, '2026-01-14 15:41:45'),
	(4, 'Enabled', 2, '30" x 150\' 20# Recycled Bond, 4 rolls/case (2" Cores)', 10, 13, 'Item #30150R\r\n\r\n30" x 150\'/roll  20# Recycled Bond,  2" core (4 rolls/case)\r\n\r\nWe will beat any competitors advertised price!!! \r\n\r\n Qty	 Price\r\n1 cs	$84.90/case - Free Shipping\r\n3 - 11 cs	$82.90/case - Free Shipping\r\n12 - 20 cs	$78.90/case - Free Shipping\r\n20 + cs	Call for Pricing', '', '', '', '', '', '', 1, '2026-01-14 15:51:12', 1, '2026-01-14 15:53:04'),
	(5, 'Enabled', 2, '24" x 500\' 20# Recycled Bond, 2 rolls/case (3" Cores)', 140, 10, 'Item #24500R\r\n\r\n24" x 500\'/roll  20# Recycled Bond,  3" core (2 rolls/case)\r\n\r\n\r\n$94.90/case - Free Shipping', '', '', '', '', '', '', 1, '2026-01-14 15:53:46', 1, '2026-01-14 15:53:46');

-- Dumping structure for table laravel-12-shopping-cart-demo.sessions
CREATE TABLE IF NOT EXISTS `sessions` (
  `id` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `user_id` bigint unsigned DEFAULT NULL,
  `ip_address` varchar(45) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `user_agent` text COLLATE utf8mb4_unicode_ci,
  `payload` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `last_activity` int NOT NULL,
  PRIMARY KEY (`id`),
  KEY `sessions_user_id_index` (`user_id`),
  KEY `sessions_last_activity_index` (`last_activity`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Dumping data for table laravel-12-shopping-cart-demo.sessions: ~2 rows (approximately)
INSERT INTO `sessions` (`id`, `user_id`, `ip_address`, `user_agent`, `payload`, `last_activity`) VALUES
	('tRbVu8fnKBaG7BWgu5ZrPPYaFkCVkpAj4zpWFz0g', 1, '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64; rv:146.0) Gecko/20100101 Firefox/146.0', 'YTo0OntzOjY6Il90b2tlbiI7czo0MDoiTXM3MDRCa2RwT2VhSUpac0lZMERQRXA2bUlIWmRvVlRrSllDd1hYSSI7czo5OiJfcHJldmlvdXMiO2E6Mjp7czozOiJ1cmwiO3M6Mzc6Imh0dHA6Ly9sb2NhbGhvc3Q6ODAwMC9jYXJ0L2NhdGVnb3JpZXMiO3M6NToicm91dGUiO3M6MTU6ImNhcnQuY2F0ZWdvcmllcyI7fXM6NjoiX2ZsYXNoIjthOjI6e3M6Mzoib2xkIjthOjA6e31zOjM6Im5ldyI7YTowOnt9fXM6NTA6ImxvZ2luX3dlYl81OWJhMzZhZGRjMmIyZjk0MDE1ODBmMDE0YzdmNThlYTRlMzA5ODlkIjtpOjE7fQ==', 1768409678),
	('W6sa2Q15JzEM4LxIl7IN1QaIfK2I85Zn2mxZqb8k', 2, '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64; rv:147.0) Gecko/20100101 Firefox/147.0', 'YTo0OntzOjY6Il90b2tlbiI7czo0MDoibU8wWm5ibnEzMXBJOFVkc2QyWHJHYVo1NDBlNVpZNjlEa1FRNnlaQiI7czo2OiJfZmxhc2giO2E6Mjp7czozOiJvbGQiO2E6MDp7fXM6MzoibmV3IjthOjA6e319czo5OiJfcHJldmlvdXMiO2E6Mjp7czozOiJ1cmwiO3M6NDU6Imh0dHA6Ly9sb2NhbGhvc3Q6ODAwMC9jYXJ0L2NhdGVnb3J5L2RldGFpbHMvMyI7czo1OiJyb3V0ZSI7czoyMToiY2FydC5jYXRlZ29yeS5kZXRhaWxzIjt9czo1MDoibG9naW5fd2ViXzU5YmEzNmFkZGMyYjJmOTQwMTU4MGYwMTRjN2Y1OGVhNGUzMDk4OWQiO2k6Mjt9', 1769541072);

-- Dumping structure for table laravel-12-shopping-cart-demo.users
CREATE TABLE IF NOT EXISTS `users` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `status` enum('Enabled','Disabled') COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'Enabled',
  `role` enum('Client','Admin') COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'Client',
  `cart_id` int NOT NULL DEFAULT '0',
  `order_id` int NOT NULL DEFAULT '0',
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `password` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `two_factor_secret` text COLLATE utf8mb4_unicode_ci,
  `two_factor_recovery_codes` text COLLATE utf8mb4_unicode_ci,
  `two_factor_confirmed_at` timestamp NULL DEFAULT NULL,
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_user_id` int NOT NULL DEFAULT '0',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_user_id` int NOT NULL DEFAULT '0',
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `users_email_unique` (`email`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Dumping data for table laravel-12-shopping-cart-demo.users: ~2 rows (approximately)
INSERT INTO `users` (`id`, `status`, `role`, `cart_id`, `order_id`, `name`, `email`, `email_verified_at`, `password`, `two_factor_secret`, `two_factor_recovery_codes`, `two_factor_confirmed_at`, `remember_token`, `created_user_id`, `created_at`, `updated_user_id`, `updated_at`) VALUES
	(1, 'Enabled', 'Admin', 0, 0, 'Sasa', 'rakics@gmail.com', '2025-12-30 12:07:48', '$2y$12$Ps1FsVzJ7tzJoWt4eGRx8OJnr9YRtaBC0ZCUsduzBMU9teldgKNg6', NULL, NULL, NULL, '8lqCULkspq9PiGXM7stg4R6syJkjdH9CPVEx4hRPJlpWyRFc7jsraF7lOoGg', 0, '2025-12-30 12:08:01', 0, NULL),
	(2, 'Enabled', 'Client', 0, 0, 'John', 'john@test.com', '2026-01-02 15:36:35', '$2y$12$Ps1FsVzJ7tzJoWt4eGRx8OJnr9YRtaBC0ZCUsduzBMU9teldgKNg6', NULL, NULL, NULL, 'cv4so4wP0DQukehvX9BmwybMF3BcgiAPTJe1sQ3JSDxUGixAOccnaFeL3QZA', 0, '2026-01-02 14:36:05', 0, '2026-01-02 14:36:05');

/*!40103 SET TIME_ZONE=IFNULL(@OLD_TIME_ZONE, 'system') */;
/*!40101 SET SQL_MODE=IFNULL(@OLD_SQL_MODE, '') */;
/*!40014 SET FOREIGN_KEY_CHECKS=IFNULL(@OLD_FOREIGN_KEY_CHECKS, 1) */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40111 SET SQL_NOTES=IFNULL(@OLD_SQL_NOTES, 1) */;
