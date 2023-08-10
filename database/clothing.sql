-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1:3306
-- Generation Time: Aug 10, 2023 at 05:04 AM
-- Server version: 8.0.33
-- PHP Version: 8.1.4

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `clothing`
--

-- --------------------------------------------------------

--
-- Table structure for table `abouts`
--

DROP TABLE IF EXISTS `abouts`;
CREATE TABLE IF NOT EXISTS `abouts` (
  `id` int UNSIGNED NOT NULL AUTO_INCREMENT,
  `icon` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `logo` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `title` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `phone` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `email` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `address` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `linkfanpage` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `copyright` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `worktime` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `abouts`
--

INSERT INTO `abouts` (`id`, `icon`, `logo`, `name`, `title`, `phone`, `email`, `address`, `linkfanpage`, `copyright`, `worktime`, `created_at`, `updated_at`) VALUES
(1, 'icon.jpg', 'logo.jpg', 'Ecommerce', 'write everything you want', '0123456789', 'admin123@gmail.com', '180 Nguyễn Trãi Street', 'https://www.facebook.com', 'phuchuu0120@gmail.com', '7:00 - 19:00', NULL, '2023-08-10 05:01:39');

-- --------------------------------------------------------

--
-- Table structure for table `banners`
--

DROP TABLE IF EXISTS `banners`;
CREATE TABLE IF NOT EXISTS `banners` (
  `id` int UNSIGNED NOT NULL AUTO_INCREMENT,
  `image` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `active` int NOT NULL DEFAULT '1',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `banners`
--

INSERT INTO `banners` (`id`, `image`, `active`, `created_at`, `updated_at`) VALUES
(1, 'UCqF-o202010080956262453.jpg', 1, '2023-08-10 04:58:43', '2023-08-10 04:58:43'),
(2, 'Goey-stock-vector-powerful-video-card-for-cryptocurrency-mining-or-games-realistic-video-card-mockup-in-d-2165377567.jpg', 1, '2023-08-10 04:58:43', '2023-08-10 04:58:43'),
(3, 'bJ5y-UstpESo.png', 1, '2023-08-10 04:58:43', '2023-08-10 04:58:43');

-- --------------------------------------------------------

--
-- Table structure for table `brands`
--

DROP TABLE IF EXISTS `brands`;
CREATE TABLE IF NOT EXISTS `brands` (
  `id` int UNSIGNED NOT NULL AUTO_INCREMENT,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `image` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `active` int NOT NULL DEFAULT '1',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=10 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `brands`
--

INSERT INTO `brands` (`id`, `name`, `image`, `active`, `created_at`, `updated_at`) VALUES
(2, 'LENOVO', 'l22p-kisspng-hewlett-packard-logo-lenovo-computer-software-lenovo-logo-5ac49fb0604651.4490159315228353763944-removebg-preview.png', 1, '2023-08-10 04:07:45', '2023-08-10 04:07:45'),
(3, 'MSI', 'S3Ky-kisspng-asus-zenfone-5-republic-of-gamers-graphics-cards-asus-logo-5b35c33da3a636.9996187215302500456703-removebg-preview.png', 1, '2023-08-10 04:07:58', '2023-08-10 04:07:58'),
(4, 'Geforce', 'wLAI-nvidia-gf-rtx-logo.png', 1, '2023-08-10 04:08:12', '2023-08-10 04:08:12'),
(5, 'Thương hiệu khác', NULL, 1, '2023-08-10 04:08:43', '2023-08-10 04:08:43'),
(6, 'Playstation', 'o7us-Playstation_logo_colour.svg.png', 1, '2023-08-10 04:11:40', '2023-08-10 04:11:40'),
(7, 'Xbox', 'bCCG-Xbox_one_logo.svg.png', 1, '2023-08-10 04:21:50', '2023-08-10 04:21:50'),
(8, 'Dell', 'jhCR-Dell_Logo.svg.png', 1, '2023-08-10 04:34:11', '2023-08-10 04:34:55'),
(9, 'Samsung', 'FiOe-Samsung_Logo.svg.png', 1, '2023-08-10 04:34:29', '2023-08-10 04:34:29');

-- --------------------------------------------------------

--
-- Table structure for table `categories`
--

DROP TABLE IF EXISTS `categories`;
CREATE TABLE IF NOT EXISTS `categories` (
  `id` int UNSIGNED NOT NULL AUTO_INCREMENT,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `active` int NOT NULL DEFAULT '1',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=11 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `categories`
--

INSERT INTO `categories` (`id`, `name`, `active`, `created_at`, `updated_at`) VALUES
(3, 'Console', 1, '2023-08-10 04:01:24', '2023-08-10 04:01:24'),
(4, 'Thiết bị văn phòng', 1, '2023-08-10 04:01:34', '2023-08-10 04:01:34'),
(6, 'Thiết bị âm thanh', 1, '2023-08-10 04:01:52', '2023-08-10 04:01:52'),
(7, 'Linh kiện', 1, '2023-08-10 04:02:03', '2023-08-10 04:02:03'),
(8, 'Màn hình', 1, '2023-08-10 04:02:12', '2023-08-10 04:02:12'),
(9, 'Máy tính', 1, '2023-08-10 04:02:22', '2023-08-10 04:02:22'),
(10, 'Áo thun', 1, '2023-08-10 04:02:30', '2023-08-10 04:02:30');

-- --------------------------------------------------------

--
-- Table structure for table `discounts`
--

DROP TABLE IF EXISTS `discounts`;
CREATE TABLE IF NOT EXISTS `discounts` (
  `id` int UNSIGNED NOT NULL AUTO_INCREMENT,
  `code` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `discounts` int DEFAULT NULL,
  `quantity` int DEFAULT NULL,
  `active` int NOT NULL DEFAULT '1',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `discounts`
--

INSERT INTO `discounts` (`id`, `code`, `discounts`, `quantity`, `active`, `created_at`, `updated_at`) VALUES
(1, 'giamgia50', 50, 100, 1, '2023-08-10 05:04:09', '2023-08-10 05:04:09');

-- --------------------------------------------------------

--
-- Table structure for table `failed_jobs`
--

DROP TABLE IF EXISTS `failed_jobs`;
CREATE TABLE IF NOT EXISTS `failed_jobs` (
  `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT,
  `uuid` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `connection` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `queue` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `payload` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `exception` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `failed_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`),
  UNIQUE KEY `failed_jobs_uuid_unique` (`uuid`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `imagelibraries`
--

DROP TABLE IF EXISTS `imagelibraries`;
CREATE TABLE IF NOT EXISTS `imagelibraries` (
  `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT,
  `products_id` int UNSIGNED NOT NULL,
  `image_library` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `imagelibraries_products_id_foreign` (`products_id`)
) ENGINE=InnoDB AUTO_INCREMENT=17 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `imagelibraries`
--

INSERT INTO `imagelibraries` (`id`, `products_id`, `image_library`, `created_at`, `updated_at`) VALUES
(5, 3, 'xdZ0-51OnenSqevL._AC_UF1000,1000_QL80_.jpg', '2023-08-10 04:16:29', '2023-08-10 04:16:29'),
(6, 3, 'Yp0H-0301fc117fa50b152a1652563cf40fc9.jpg', '2023-08-10 04:16:29', '2023-08-10 04:16:29'),
(7, 3, 'wGGq-ps4_01.jpeg', '2023-08-10 04:16:29', '2023-08-10 04:16:29'),
(8, 4, 's84e-969danhgiaps5-1675404765235836067162.jpg', '2023-08-10 04:20:01', '2023-08-10 04:20:01'),
(9, 4, 'FIGM-may-choi-game-ps5-chinh-hang-min.jpg', '2023-08-10 04:20:01', '2023-08-10 04:20:01'),
(10, 4, 'CQVz-may-choi-game-sony-playstation-5-ps5-standard1.png', '2023-08-10 04:20:01', '2023-08-10 04:20:01'),
(11, 5, 'pW7W-51cOqbx5z3L._AC_UL600_SR600,600_.jpg', '2023-08-10 04:28:10', '2023-08-10 04:28:10'),
(12, 5, 'tHBa-61zjj2sgXML._SL1500_.jpg', '2023-08-10 04:28:10', '2023-08-10 04:28:10'),
(13, 6, '4BCA-digital-only-xbox-series-x-1691419148003894760725-0-51-433-744-crop-16914191783561282125193.jpg', '2023-08-10 04:31:49', '2023-08-10 04:31:49'),
(14, 6, '0GTM-microsoft-ra-mat-game-console-the-he-ke-tiep-xbox-series-x.jpg', '2023-08-10 04:31:49', '2023-08-10 04:31:49'),
(15, 6, '9WQG-xbox-series-x-forza-5-w-1.jpg', '2023-08-10 04:31:49', '2023-08-10 04:31:49'),
(16, 9, 'l3Dc-dell-u2422h-2.jpg', '2023-08-10 04:41:04', '2023-08-10 04:41:04');

-- --------------------------------------------------------

--
-- Table structure for table `migrations`
--

DROP TABLE IF EXISTS `migrations`;
CREATE TABLE IF NOT EXISTS `migrations` (
  `id` int UNSIGNED NOT NULL AUTO_INCREMENT,
  `migration` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `batch` int NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=18 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `migrations`
--

INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES
(1, '2014_10_12_100000_create_password_resets_table', 1),
(2, '2019_08_19_000000_create_failed_jobs_table', 1),
(3, '2019_12_14_000001_create_personal_access_tokens_table', 1),
(4, '2022_06_17_131146_create_categories_table', 1),
(5, '2022_06_18_142233_create_products_table', 1),
(6, '2022_06_23_150311_create_brands_table', 1),
(7, '2022_06_24_002648_create_imagelibraries_table', 1),
(8, '2022_06_27_133711_create_discounts_table', 1),
(9, '2022_06_28_224957_create_banners_table', 1),
(10, '2022_06_28_225249_create_abouts_table', 1),
(11, '2022_08_12_211020_create_permission_tables', 1),
(12, '2022_08_12_224852_create_users_table', 1),
(13, '2022_08_26_204306_create_subcategories_table', 1),
(14, '2022_10_29_171437_create_wishlists_table', 1),
(15, '2022_11_28_190217_create_ratings_table', 1),
(16, '2022_12_20_203137_create_orders_table', 1),
(17, '2022_12_20_203201_create_orders__details_table', 1);

-- --------------------------------------------------------

--
-- Table structure for table `model_has_permissions`
--

DROP TABLE IF EXISTS `model_has_permissions`;
CREATE TABLE IF NOT EXISTS `model_has_permissions` (
  `permission_id` bigint UNSIGNED NOT NULL,
  `model_type` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `model_id` bigint UNSIGNED NOT NULL,
  PRIMARY KEY (`permission_id`,`model_id`,`model_type`),
  KEY `model_has_permissions_model_id_model_type_index` (`model_id`,`model_type`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `model_has_permissions`
--

INSERT INTO `model_has_permissions` (`permission_id`, `model_type`, `model_id`) VALUES
(1, 'App\\Models\\User', 1),
(2, 'App\\Models\\User', 1),
(3, 'App\\Models\\User', 1),
(4, 'App\\Models\\User', 1),
(5, 'App\\Models\\User', 1),
(6, 'App\\Models\\User', 1),
(7, 'App\\Models\\User', 1),
(8, 'App\\Models\\User', 1),
(9, 'App\\Models\\User', 1),
(10, 'App\\Models\\User', 1),
(11, 'App\\Models\\User', 1),
(12, 'App\\Models\\User', 1),
(13, 'App\\Models\\User', 1),
(14, 'App\\Models\\User', 1),
(15, 'App\\Models\\User', 1),
(16, 'App\\Models\\User', 1),
(17, 'App\\Models\\User', 1),
(18, 'App\\Models\\User', 1),
(19, 'App\\Models\\User', 1),
(20, 'App\\Models\\User', 1),
(21, 'App\\Models\\User', 1),
(22, 'App\\Models\\User', 1),
(23, 'App\\Models\\User', 1),
(24, 'App\\Models\\User', 1),
(25, 'App\\Models\\User', 1);

-- --------------------------------------------------------

--
-- Table structure for table `model_has_roles`
--

DROP TABLE IF EXISTS `model_has_roles`;
CREATE TABLE IF NOT EXISTS `model_has_roles` (
  `role_id` bigint UNSIGNED NOT NULL,
  `model_type` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `model_id` bigint UNSIGNED NOT NULL,
  PRIMARY KEY (`role_id`,`model_id`,`model_type`),
  KEY `model_has_roles_model_id_model_type_index` (`model_id`,`model_type`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `model_has_roles`
--

INSERT INTO `model_has_roles` (`role_id`, `model_type`, `model_id`) VALUES
(1, 'App\\Models\\User', 1),
(3, 'App\\Models\\User', 2),
(3, 'App\\Models\\User', 3);

-- --------------------------------------------------------

--
-- Table structure for table `orders`
--

DROP TABLE IF EXISTS `orders`;
CREATE TABLE IF NOT EXISTS `orders` (
  `id` int UNSIGNED NOT NULL AUTO_INCREMENT,
  `users_id` int UNSIGNED NOT NULL,
  `lastname` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `firstname` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `address` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `district` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `city` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `phone` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `content` longtext COLLATE utf8mb4_unicode_ci,
  `total` int NOT NULL,
  `status` int NOT NULL DEFAULT '1',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `orders_users_id_foreign` (`users_id`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `orders`
--

INSERT INTO `orders` (`id`, `users_id`, `lastname`, `firstname`, `address`, `district`, `city`, `phone`, `email`, `content`, `total`, `status`, `created_at`, `updated_at`) VALUES
(1, 1, 'Đặng', 'Phúc Hữu', '771', 'Quận 8', 'TP Hồ Chí Minh', '(+84) 702118657', 'admin@gmail.com', NULL, 22272222, 1, NULL, NULL),
(2, 2, 'Đặng', 'Phúc Hữu', '771', 'Quận 8', 'TP Hồ Chí Minh', '0702118657', 'phuchuu0120@gmail.com', NULL, 20000, 1, NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `orders__details`
--

DROP TABLE IF EXISTS `orders__details`;
CREATE TABLE IF NOT EXISTS `orders__details` (
  `orders_id` int UNSIGNED NOT NULL,
  `product_id` int UNSIGNED NOT NULL,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `image` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `quantity` int NOT NULL,
  `price` int NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  KEY `orders__details_orders_id_foreign` (`orders_id`),
  KEY `orders__details_product_id_foreign` (`product_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `password_resets`
--

DROP TABLE IF EXISTS `password_resets`;
CREATE TABLE IF NOT EXISTS `password_resets` (
  `email` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  KEY `password_resets_email_index` (`email`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `permissions`
--

DROP TABLE IF EXISTS `permissions`;
CREATE TABLE IF NOT EXISTS `permissions` (
  `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `guard_name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `permissions_name_guard_name_unique` (`name`,`guard_name`)
) ENGINE=InnoDB AUTO_INCREMENT=26 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `permissions`
--

INSERT INTO `permissions` (`id`, `name`, `guard_name`, `created_at`, `updated_at`) VALUES
(1, 'list category', 'web', '2023-04-21 03:02:46', '2023-04-21 03:02:46'),
(2, 'add category', 'web', '2023-04-21 03:02:46', '2023-04-21 03:02:46'),
(3, 'edit category', 'web', '2023-04-21 03:02:46', '2023-04-21 03:02:46'),
(4, 'delete category', 'web', '2023-04-21 03:02:46', '2023-04-21 03:02:46'),
(5, 'list brands', 'web', '2023-04-21 03:02:46', '2023-04-21 03:02:46'),
(6, 'add brands', 'web', '2023-04-21 03:02:46', '2023-04-21 03:02:46'),
(7, 'edit brands', 'web', '2023-04-21 03:02:46', '2023-04-21 03:02:46'),
(8, 'delete brands', 'web', '2023-04-21 03:02:46', '2023-04-21 03:02:46'),
(9, 'list products', 'web', '2023-04-21 03:02:46', '2023-04-21 03:02:46'),
(10, 'add products', 'web', '2023-04-21 03:02:46', '2023-04-21 03:02:46'),
(11, 'edit products', 'web', '2023-04-21 03:02:46', '2023-04-21 03:02:46'),
(12, 'delete products', 'web', '2023-04-21 03:02:46', '2023-04-21 03:02:46'),
(13, 'list users', 'web', '2023-04-21 03:02:46', '2023-04-21 03:02:46'),
(14, 'delete users', 'web', '2023-04-21 03:02:46', '2023-04-21 03:02:46'),
(15, 'list discounts', 'web', '2023-04-21 03:02:46', '2023-04-21 03:02:46'),
(16, 'add discounts', 'web', '2023-04-21 03:02:46', '2023-04-21 03:02:46'),
(17, 'edit discounts', 'web', '2023-04-21 03:02:46', '2023-04-21 03:02:46'),
(18, 'delete discounts', 'web', '2023-04-21 03:02:46', '2023-04-21 03:02:46'),
(19, 'list orders', 'web', '2023-04-21 03:02:46', '2023-04-21 03:02:46'),
(20, 'edit orders', 'web', '2023-04-21 03:02:46', '2023-04-21 03:02:46'),
(21, 'delete orders', 'web', '2023-04-21 03:02:46', '2023-04-21 03:02:46'),
(22, 'list banners', 'web', '2023-04-21 03:02:46', '2023-04-21 03:02:46'),
(23, 'add banners', 'web', '2023-04-21 03:02:46', '2023-04-21 03:02:46'),
(24, 'edit banners', 'web', '2023-04-21 03:02:46', '2023-04-21 03:02:46'),
(25, 'delete banners', 'web', '2023-04-21 03:02:46', '2023-04-21 03:02:46');

-- --------------------------------------------------------

--
-- Table structure for table `personal_access_tokens`
--

DROP TABLE IF EXISTS `personal_access_tokens`;
CREATE TABLE IF NOT EXISTS `personal_access_tokens` (
  `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT,
  `tokenable_type` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `tokenable_id` bigint UNSIGNED NOT NULL,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
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
-- Table structure for table `products`
--

DROP TABLE IF EXISTS `products`;
CREATE TABLE IF NOT EXISTS `products` (
  `id` int UNSIGNED NOT NULL AUTO_INCREMENT,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `categories_id` bigint UNSIGNED NOT NULL,
  `users_id` bigint UNSIGNED NOT NULL,
  `brands_id` bigint UNSIGNED NOT NULL,
  `sub_id` bigint UNSIGNED NOT NULL,
  `size` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `price` double DEFAULT NULL,
  `price_new` double DEFAULT NULL,
  `quantity` int DEFAULT NULL,
  `image` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `link` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `content` longtext COLLATE utf8mb4_unicode_ci,
  `featured_product` int NOT NULL DEFAULT '0',
  `active` int NOT NULL DEFAULT '1',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=17 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `products`
--

INSERT INTO `products` (`id`, `name`, `categories_id`, `users_id`, `brands_id`, `sub_id`, `size`, `price`, `price_new`, `quantity`, `image`, `link`, `content`, `featured_product`, `active`, `created_at`, `updated_at`) VALUES
(3, 'Máy chơi game ps4', 3, 1, 2, 2, NULL, 10000000, 8000000, 1000, 'TN6x-ps4.jpg', NULL, '<h4><strong>TÌNH TRẠNG MÁY</strong></h4><h4><strong>ƯU ĐIỂM CỦA MÁY PS4 UNLOCK FW</strong></h4><ul><li><strong>Các máy PS4 USED Unlock FW bán ra tại HALO là các máy đã được mở khóa và có thể chép game vào ổ cứng, chơi game không giới hạn, tiết kiệm chi phí.</strong></li><li><strong>HALO hỗ trợ cài game PS4 với kho game đồ sộ hàng trăm game hấp dẫn, chơi cả năm không hết, </strong><a href=\"http://hdd.halo.vn/ps4\"><strong>xem tại đây</strong></a></li></ul><h3><strong>ƯU ĐÃI KHUYẾN MÃI DÀNH RIÊNG CHO MÁY PLAYSTATION 4 UNLOCK FW</strong></h3><p><img src=\"https://haloshop.vn/image/catalog/products/may-game/sony-playstation/ps4-list-game.jpg\" alt=\"Playstation 4 Unlock FW\"></p><p><br>&nbsp;</p>', 1, 1, '2023-08-10 04:16:29', '2023-08-10 04:20:18'),
(4, 'Máy chơi game ps5', 3, 1, 6, 3, NULL, 25000000, NULL, 10000, 'oNMi-ps5-redesign-3326.jpg', NULL, '<p>Máy chơi game Sony PlayStation 5 (PS5) | Bản ổ đĩa chính hãng Việt Nam trang bị dung lượng ổ cứng <strong>SSD lên đến 825GB</strong>,&nbsp;<strong>GPU AMD Radeon™ RDNA</strong> và <strong>chip 8 nhân 16 luồng x86-64-AMD Ryzen™ “Zen 2”</strong>. Không chỉ vậy, thiết bị đã cài sẵn&nbsp;game Astro\'s Playroom và kèm theo&nbsp;1 tay cầm DualSense. Điểm nổi bật sản phẩm còn nằm ở khả năng hỗ trợ hình ảnh 8K và công nghệ âm thanh&nbsp;3D \"Tempest\".</p><h2><strong>Máy chơi game Sony PlayStation 5 - Đắm chìm trong thế giới ảo của riêng bạn</strong></h2><p><i>Kế thừa những tinh hoa từ người tiền nhiệm PS4, máy chơi game Sony PS5 Bản ổ đĩa&nbsp;là cỗ máy chiến game không thể thiếu của mọi game thủ. Với cấu hình nâng cấp mạnh mẽ, vận hành nhanh nhạy và hỗ trợ lên độ phân giải lên đến 8K, không khó để khẳng định PlayStation 5 sẽ nâng cấp trải nghiệm gaming lên tầm cao mới.</i></p><h3><strong>Thiết kế chữ V độc đáo, nhiều cổng kết nối</strong></h3><p>Thế hệ mới nhất của dòng PlayStation sở hữu một thiết kế khác hẳn so với người tiền nhiệm, khi tổng thể thiết bị mang thân hình chữ V độc đáo và hiện đại. Và tương tự PS4, PS5 cũng sẽ được khoác lên mình lớp vỏ kim loại cứng cáp màu đen trắng, toát lên vẻ hầm hố ở mọi góc độ.&nbsp;Bản ổ đĩa SSD mới chính hãng Sony Việt Nam có dung lượng lên đến 825GB và kết nối đến màn hình lớn.</p><p><img src=\"https://cdn2.cellphones.com.vn/x,webp,q100/media/wysiwyg/Smarthome/may-choi-game-sony-playstation-5-4.jpg\" alt=\"Máy chơi game Sony PlayStation 5 - Đắm chìm trong thế giới ảo của riêng bạn\"></p><h3><strong>Phần cứng nâng cấp đáng kể với chip AMD Ryzen Zen 2, tích hợp âm thanh 3D Tempest</strong></h3><p><i>Sony PlayStation 5</i>&nbsp;là tích hợp chip AMD Ryzen Zen 2 dựa trên kiến trúc Ryzen 8 nhân 16 luồng, với GPU thuộc gia phả AMD Radeon RDNA. GPU này là sản phẩm tự thiết kế bởi Sony và AMD, sẽ giúp <strong>Playstation 5</strong> vận hành game trên độ phân giải lên đến 8K Ultra HD, tích hợp chế độ tiết kiệm điện hữu dụng và kèm với các cảm biến trong game góp phần mang đến độ chân thực tối đa.</p><p><img src=\"https://cdn2.cellphones.com.vn/x,webp,q100/media/wysiwyg/Smarthome/may-choi-game-sony-playstation-5-1.jpg\" alt=\"Máy chơi game Sony PlayStation 5 - Đắm chìm trong thế giới ảo của riêng bạn\"></p><p>Cấu hình trên cũng sẽ giúp Sony&nbsp;PS5 xử lý chế độ dò sáng (Ray tracing) một cách hiệu quả với khung hình mượt hơn. Nói cách khác, ánh sáng và bóng mờ trong trò chơi sẽ chân thực hơn trên PS5. Đồng thời, cỗ máy chiến game mới nhất của Sony sẽ tích hợp công nghệ âm thanh 3D Tempest, tạo nên âm thanh vô cùng sống động trong mọi môi trường.</p><h3><strong>Tay cầm chơi game mới cải tiến nhạy hơn và chính xác hơn</strong></h3><p>Thay vì có tay cầm của DualShock như trên PS4, <i><strong>PS5</strong></i> sẽ đi kèm với tay cầm riêng của mình - DualSene. Và thiết kế của tay cầm chơi game trên PS5 sẽ khá tương đồng với DualShock 4, với đầy đủ bốn phím di chuyển, bốn phím thao tác cơ bản, phím SHARE và OPTIONS cùng với touchpad đa năng.</p><p><img src=\"https://cdn2.cellphones.com.vn/x,webp,q100/media/wysiwyg/Smarthome/may-choi-game-sony-playstation-5-5.jpg\" alt=\"Máy chơi game Sony PlayStation 5 - Đắm chìm trong thế giới ảo của riêng bạn\"></p><p>Controller riêng của Sony PS5 sẽ được thiết kế với công nghệ phản hồi xúc giác (thay thế công nghệ rumble của DualShock 4), có chức năng nhận diện độ rung hoặc cử chỉ trong game và tái tạo lại chúng trên tay tầm, mang đến trải nghiệm chân thực. Kèm với đó là tính năng kích hoạt độ thích nghi nhằm lập trình mức điện trở để mô phỏng hành động chính xác hơn.</p><h3><strong>Tương thích với nhiều tựa game</strong></h3><p>Nếu bạn là một fan cứng của những tựa game trên PS4 hoặc cũ hơn nữa, Playstation PS5 cũng sẽ vận hành ổn định chúng. Nhờ vào thiết kế phần cứng lẫn phần mềm dựa trên người tiền nhiệm, nên PS5 sẽ hoàn toàn tương thích với những tựa game đã ra mắt lẫn sắp ra mắt. Nghĩa là những tựa game đình đám như Call of Duty Modern Warfare II, Marvel\'s Spider-Man, EA Sport FIFA 23, Elden Ring v.v... sẽ chạy trơn tru với hình ảnh và âm thanh chất lượng.</p><p><img src=\"https://cdn2.cellphones.com.vn/x,webp,q100/media/wysiwyg/Smarthome/may-choi-game-sony-playstation-5-2.jpg\" alt=\"Máy chơi game Sony PlayStation 5 - Đắm chìm trong thế giới ảo của riêng bạn\"></p><p><strong>Máy chơi game PlayStation 5 (PS5) giá bao nhiêu tiền?</strong></p><p>Là phụ kiện chơi game quan trọng cho các game thủ vậy giá bán PS5 bao nhiêu tiền, có đắt không? Thực tế, PlayStation 5 (PS5) với phiên bản ổ đĩa Ultra HD Blu-ray sẽ được lên kệ với giá bán lẻ chỉ từ 16,490,000 đồng. Phụ kiện được chính thức giới thiệu đến người tiêu dùng Việt Nam vào tháng 3 năm 2021.</p><p><img src=\"https://cdn2.cellphones.com.vn/x,webp,q100/media/wysiwyg/Smarthome/may-choi-game-sony-playstation-5-3.jpg\" alt=\"giá bao nhiêu tiền\"></p><h2><strong>Mua ngay máy chơi game Sony PlayStation 5 (PS5) | Bản ổ đĩa chính hãng Việt Nam giá ưu đãi tại CellphoneS</strong></h2><p>Những tín đồ đam mê gaming sẽ không thể nào bỏ qua siêu phẩm Sony PS5. Chính vì thế hãy nhanh tay mua ngay máy chơi game PlayStation 5 chính hãng tại CellphoneS để có cơ hội nhận được nhiều ưu đãi hấp dẫn. Ngoài ra bạn cũng có thể tìm kiếm những sản phẩm phụ kiện gaming chính hãng với chất lượng cao tại hệ thống CellphoneS. Để biết thêm thông tin chi tiết, bạn có thể đến trực tiếp cửa hàng CellphoneS tại TPHCM hoặc Hà Nội, truy cập website cellphones.com.vn, hoặc liên hệ tổng đài miễn phí 1800.2097 để được tư vấn từ xa.</p>', 1, 1, '2023-08-10 04:20:01', '2023-08-10 04:20:01'),
(5, 'Xbox One', 3, 1, 2, 4, NULL, 25000000, 17000000, 20000, 'gnj0-9031a5c33a25d2609d046612e4941fb5-1200-80.png', NULL, '<p><img src=\"https://hanoicomputercdn.com/media/lib/29-11-2022/may-choi-game-microsoft-xbox-one-series-s-31.png\" alt=\"Máy chơi game Microsoft Xbox One Series S /512GB 1\"></p><h3><strong>Sức mạnh cao cấp</strong></h3><p><img src=\"https://hanoicomputercdn.com/media/lib/29-11-2022/may-choi-game-microsoft-xbox-one-series-s-32.png\" alt=\"Máy chơi game Microsoft Xbox One Series S /512GB 2\"></p><h4><strong>Tối ưu cho Series X|S</strong></h4><p>Các trò chơi được xây dựng bằng bộ công cụ phát triển Xbox Series X|S giới thiệu thời gian tải giảm đáng kể và hình ảnh tuyệt đẹp ở tốc độ lên đến 120 FPS</p><h4><strong>Tải ngay lập tức</strong></h4><p>Với Smart Delivery, bạn có thể mua trò chơi được hỗ trợ một lần và luôn có phiên bản khả dụng tốt nhất cho bất kỳ phiên bản Console của bạn</p><h4><strong>Game On</strong></h4><p>Trong tương lai, cũng như hiện tại, các tựa game cổ điển, những trò chơi hay nhất trên các hệ Xbox trước kia đều có thể tương thích tốt với Xbox One Series S</p><h3><strong>Mở rộng, không làm giảm hiệu năng</strong></h3><p>Thẻ mở rộng lưu trữ Seagate 1TB dành cho Xbox Series X | S cắm vào mặt sau của bảng điều khiển thông qua cổng mở rộng chuyên dụng và tái tạo trải nghiệm SSD tùy chỉnh của bảng điều khiển, cung cấp thêm bộ nhớ trò chơi với cùng hiệu suất. ( Sản phẩm bán riêng, không đi kèm máy )</p><p><img src=\"https://hanoicomputercdn.com/media/lib/29-11-2022/may-choi-game-microsoft-xbox-one-series-s-34.png\" alt=\"Máy chơi game Microsoft Xbox One Series S /512GB 3\"></p><h3><strong>Âm thanh vòm sống động</strong></h3><p>3D Spatial Audio&nbsp;là bước tiến tiếp theo trong công nghệ âm thanh, sử dụng các thuật toán tiên tiến để tạo ra thế giới sống động như thật, đặt bạn vào trung tâm trải nghiệm của mình.</p><p><img src=\"https://hanoicomputercdn.com/media/lib/29-11-2022/may-choi-game-microsoft-xbox-one-series-s-33.png\" alt=\"Máy chơi game Microsoft Xbox One Series S /512GB 4\"></p><h3><strong>Nhìn tốt hơn - Chơi tốt hơn</strong></h3><p>Được trang bị kiến ​​trúc AMD’s Zen 2 và RDNA 2, DirectX Ray Tracing, đổ bóng và chính xác như thật để tạo ra 1 thế giới sống động</p><p><img src=\"https://hanoicomputercdn.com/media/lib/29-11-2022/may-choi-game-microsoft-xbox-one-series-s-31.jpg\" alt=\"Máy chơi game Microsoft Xbox One Series S /512GB 5\"></p><h4><strong>Tối ưu tốt&nbsp;</strong></h4><p>Từ những tác phẩm kinh điển gốc như Halo: Combat Evolved cho đến những tựa game được yêu thích trong tương lai như Halo Infinite, mọi tựa game đều được tối ưu tốt nhất trên Xbox Series S.</p><p><img src=\"https://hanoicomputercdn.com/media/lib/29-11-2022/may-choi-game-microsoft-xbox-one-series-s-35.png\" alt=\"Máy chơi game Microsoft Xbox One Series S /512GB 6\"></p><h3><strong>Tay cầm điều khiển hoàn hảo</strong></h3><p>Bộ điều khiển không dây Xbox mới mang đến thiết kế trang nhã, sự thoải mái tinh tế và khả năng chia sẻ tức thì với một thiết bị yêu thích quen thuộc.</p><p><img src=\"https://hanoicomputercdn.com/media/lib/29-11-2022/may-choi-game-microsoft-xbox-one-series-s-36.png\" alt=\"Máy chơi game Microsoft Xbox One Series S /512GB 7\"></p>', 1, 1, '2023-08-10 04:28:10', '2023-08-10 04:28:10'),
(6, 'Xbox Series X', 3, 1, 7, 4, NULL, 30000000, 26000000, 10000, 'F2cZ-71BlNyvt2uL.jpg', NULL, '<h3><strong>THE NEW</strong></h3><h2><strong>XBOX SERIES X</strong></h2><h3><strong>FASTEST.</strong></h3><h3><strong>MOST POWERFUL.</strong></h3><h2><strong>Re-engineered inside out</strong><br>&nbsp;</h2><p>Với mong muốn truyền cảm hứng hơn trong việc chơi game, cùng sự sáng tạo và làm việc không ngừng nghỉ từ năm 2016, sau 4 năm Microsoft đã chính thức giới thiệu siêu phẩm Xbox Series X với nhiều cải tiến về phần cứng và phần mềm cho phép bạn khám phá nhiều trò chơi khác nhau chỉ với thời gian tải nhanh hơn 40 giây so với Xbox One X. Xbox thế hệ tiếp theo này cũng sẽ hỗ trợ chơi game 8K và tốc độ khung hình lên tới 120 fps.</p><p><img src=\"https://haloshop.vn/image/catalog/products/may-game/microsoft-xbox/xbox-series-x-22.jpg\" alt=\"Xbox Series X\"></p><h3><strong>DESIGNED FOR SPEED AND</strong><br><strong>PERFORMANCE</strong></h3><p>Xbox Velocity Architecture có tính năng tích hợp chặt chẽ giữa phần cứng và phần mềm giúp thiết bị tối ưu thời gian load game. Với ổ cứng sử dụng SSD NVMe 1TB được tùy biến riêng và có thể tăng dung lượng lên gấp đôi thông qua khe mở rộng (expansion slot), giúp thời gian tải game nhanh hơn rất nhiều.</p><p><img src=\"https://haloshop.vn/image/catalog/products/may-game/microsoft-xbox/xbox-series-x-23.jpg\" alt=\"Xbox Series X\"></p><h3><strong>PLAY MORE, WAIT LESS</strong></h3><p>&nbsp;</p><p>&nbsp;</p><p>Bạn sẽ trải nghiệm nhiều thời gian chơi hơn và thời gian chờ đợi ít hơn vì thời gian tải sẽ giảm đáng kể nhờ vào khả năng xử lý của Xbox Series X.</p><p>Quick Resume - Một tính năng mới sẽ được lòng rất nhiều game thủ cho phép người chơi chuyển đổi liền mạch giữa nhiều tựa game và tiếp tục ngay lập tức từ nơi bạn rời đi.</p><h3><strong>THE MOST POWERFUL CONSOLE EVER</strong></h3><p><img src=\"https://haloshop.vn/image/catalog/products/may-game/microsoft-xbox/xbox-series-x-24.jpg\" alt=\"Xbox Series X\"><img src=\"https://haloshop.vn/image/catalog/products/may-game/microsoft-xbox/xbox-series-x-24a.jpg\" alt=\"Xbox Series X\"></p><p>Sản phẩm sở hữu vi xử lý Zen 2 được tùy biến riêng, với 8 nhân hoạt động ở tốc độ 3,8GHz, hoặc 3,66GHz nếu nhà phát triển game lựa chọn sử dụng các luồng liên tục. Về đồ họa, Xbox Series X sẽ sử dụng GPU đến từ AMD với kiến trúc RDNA 2 với sức mạnh 12TeraFlop gấp đôi so với 6 TeraFlop của Xbox One X, với 52 đơn vị tính toán có mức xung nhịp 1,852GHz và bộ nhớ 16GB GDDR6.</p><p>Độ phân giải 4K với 60 khung hình mỗi giây sẽ là tiêu chuẩn cơ bản. Điểm nổi bật của Series X bao gồm hỗ trợ độ phân giải 8K, tốc độ khung hình lên tới 120 fps, tốc độ làm tươi (refresh rate) có thể biến đổi và hỗ trợ công nghệ ray tracing. Xbox Series X cũng sẽ có tính năng dò tia được tăng tốc phần cứng, tạo ra các phản xạ và bóng động thời gian thực, nâng cao độ sâu của trò chơi của bạn.</p><h3><strong>DELIVERING UNPARALLELED GRAPHICAL</strong><br><strong>FIDELITY</strong></h3><p>Cùng với bộ xử lý chuyên nghiệp, Xbox Series X hoạt động trơn tru và luôn trong mức nhiệt độ ổn định nhờ vào hệ thống quạt hút – thổi lấy không khí mát từ đáy chiếc máy, và thổi ra thông qua quạt trên nóc máy. Hệ thống làm mát với ống đồng và vapor chamber cho phép trải đều nhiệt độ với lõi và bộ nhớ. Hệ thống tản nhiệt sẽ hoạt động êm ái nhất có thể, không ảnh hưởng tới quá trình trải nghiệm game của bạn.</p><p><img src=\"https://haloshop.vn/image/catalog/products/may-game/microsoft-xbox/xbox-series-x-25.jpg\" alt=\"Xbox Series X\"><img src=\"https://haloshop.vn/image/catalog/products/may-game/microsoft-xbox/xbox-series-x-25a.jpg\" alt=\"Xbox Series X\"></p><h3><strong>MORE STORAGE WITHOUT COMPROMISE</strong></h3><p>Cỗ máy Xbox Series X đi kèm với một ổ cứng SSD NVMe 1TB bên trong và được Microsoft bổ sung thêm khe cắm ổ cứng rời bên ngoài, được bán với giá 250 USD cho một chiếc thẻ mở rộng bộ nhớ với dung lượng 1TB. Nhờ có SSD, CPU sẽ đọc được 100GB dữ liệu game “gần như ngay lập tức”, mở những game thế giới mở rộng lớn mà không phải chờ thời gian tải màn chơi lâu như hiện nay. Điều này cho phép Microsoft ứng dụng tính năng Quick Resume, vào lại màn chơi nhanh ngay cả sau khi đã tắt nguồn của cỗ máy. Xbox Series X cũng có khe cắm USB 3.2 để người dùng sử dụng ổ cứng ngoài, nhưng dĩ nhiên tốc độ chậm hơn.</p><p><img src=\"https://haloshop.vn/image/catalog/products/may-game/microsoft-xbox/xbox-series-x-30.jpg\" alt=\"Xbox Series X\"></p><h3><strong>GAMES PLAY EVEN BETTER</strong></h3><p>Thông qua Xbox Velocity Architecture mới được tích hợp trên Xbox Series X, hàng ngàn trò chơi trên Xbox One, bao gồm Xbox 360 và Xbox Games sẽ đem đến những cải tiến về hiệu suất, bao gồm thời gian khởi động và tải được cải thiện, tốc độ khung hình ổn định hơn, độ phân giải cao hơn và chất lượng được cải thiện trên Xbox Series X.</p><p><img src=\"https://haloshop.vn/image/catalog/products/may-game/microsoft-xbox/xbox-series-x-30a.jpg\" alt=\"Xbox Series X\"></p><h3><strong>MEET THE NEW XBOX WIRELESS CONTROLLER</strong></h3><p>Tay cầm của Xbox cũng đã được tân trang lại và mặc dù trông giống như của One X, nó nhỏ hơn một chút và sẽ có nút Share để chia sẻ ảnh chụp màn hình và clip trò chơi dễ dàng hơn. Chiếc tay cầm đã bao gồm khi bạn mua máy Xbox Series X, hỗ trợ chuyển đổi giữa các thiết bị tương thích như console, PC, mobile và tương thích với các mẫu Xbox cũ hơn cũng như PC Windows 10.</p><p><img src=\"https://haloshop.vn/image/catalog/products/may-game/microsoft-xbox/xbox-series-x-31.jpg\" alt=\"Xbox Series X\"></p><h4><strong>TRỌN BỘ SẢN PHẨM</strong></h4><ul><li>Xbox Series X</li><li>Dây nguồn</li><li>Dây cáp HDMI 2.1</li><li>Tay cầm Xbox Series màu đen</li><li>Cặp pin AA</li><li>Sách hướng dẫn</li></ul><p><img src=\"https://haloshop.vn/image/catalog/products/may-game/microsoft-xbox/xbox-series-x-in-box.jpg\" alt=\"Xbox Series S\"></p><p>&nbsp;</p><p><br>&nbsp;</p><p>&nbsp;</p>', 1, 1, '2023-08-10 04:31:48', '2023-08-10 04:32:18'),
(7, 'Dell Utrasharp U2422H', 8, 1, 8, 13, NULL, 15000000, NULL, 5000, 'C4jq-dell-ultrasharp-u2422h.png', 'WWgKjYNii9s', '<figure class=\"table\"><table><tbody><tr><td>Display Type</td><td>LED-backlit LCD monitor / TFT active matrix</td></tr><tr><td>Diagonal Size</td><td>24\"</td></tr><tr><td>Viewable Size</td><td>23.8\"</td></tr><tr><td>Built-in Devices</td><td>USB 3.2 Gen 2/USB-C hub</td></tr><tr><td>Panel Type</td><td><strong>IPS</strong></td></tr><tr><td>Aspect Ratio</td><td>16:9</td></tr><tr><td>Native Resolution</td><td>Full HD (1080p) 1920 x 1080 at 60 Hz</td></tr><tr><td>Pixel Pitch</td><td>0.2745 mm</td></tr><tr><td>Pixel Per Inch</td><td>92.5</td></tr><tr><td>Brightness</td><td>250 cd/m²</td></tr><tr><td>Contrast Ratio</td><td>1000:1</td></tr><tr><td>Color Support</td><td>16.7 million colors</td></tr><tr><td>Response Time</td><td>8 ms (normal); 5 ms (fast)</td></tr><tr><td>Horizontal Viewing Angle</td><td>178</td></tr><tr><td>Vertical Viewing Angle</td><td>178</td></tr><tr><td>Screen Coating</td><td>Anti-glare 3H hardness</td></tr><tr><td>Backlight Technology</td><td>WLED</td></tr><tr><td>Features</td><td>LED edgelight system, 100% sRGB color gamut, Flicker Free technology, arsenic-free glass, 100% Rec 709 color gamut, Infinity Edge display, <strong>85% DCI-P3</strong>, 3-sided bezeless, Dell ComfortView Plus</td></tr><tr><td>Supported Operating Systems</td><td><strong>Apple Mac OS</strong>, Ubuntu, Windows</td></tr><tr><td>Dimensions (WxDxH)</td><td><strong>21.2 in x 7.1 in x 14.3 in</strong> - with stand</td></tr></tbody></table></figure><h3>Connectivity</h3><figure class=\"table\"><table><tbody><tr><td>Interfaces</td><td><ul><li>HDMI</li><li>DisplayPort 1.4 (DisplayPort 1.4 mode)</li><li>USB-C 3.2 Gen 2 upstream</li><li>DisplayPort output (MST)</li><li>USB-C downstream (power up to 15W)</li><li>USB 3.2 Gen 2 downstream with Battery Charging 1.2</li><li>2 x USB 3.2 Gen 2 downstream</li><li>Audio line-out</li></ul></td></tr></tbody></table></figure><h3>Mechanical</h3><figure class=\"table\"><table><tbody><tr><td>Display Position Adjustments</td><td>Height, pivot (rotation), swivel, tilt</td></tr><tr><td>Tilt Angle</td><td>-5/+21</td></tr><tr><td>Swivel Angle</td><td>90</td></tr><tr><td>Rotation Angle</td><td>180</td></tr><tr><td>Height Adjustment</td><td>5.9 in</td></tr><tr><td>VESA Mounting Interface</td><td>100 x 100 mm</td></tr></tbody></table></figure><h3>Miscellaneous</h3><figure class=\"table\"><table><tbody><tr><td>Features</td><td>Security lock slot (cable lock sold separately), VESA interface support</td></tr><tr><td>Cables Included</td><td><ul><li><strong>1 x DisplayPort cable - DisplayPort to DisplayPort - 6 ft</strong></li><li><strong>1 x USB-C cable - USB Type C to A - 3.3 ft</strong></li></ul></td></tr><tr><td>Compliant Standards</td><td>TUV, RoHS, NFPA 99, BFR-free, DisplayPort 1.4, PVC-free</td></tr></tbody></table></figure><h3>Power</h3><figure class=\"table\"><table><tbody><tr><td>Input Voltage</td><td>AC 120/230 V (50/60 Hz)</td></tr><tr><td>Power Consumption (On mode)</td><td>11.6 W</td></tr><tr><td>Power Consumption SDR (On mode)</td><td>11.6 kWh/1000h</td></tr><tr><td>Power Consumption (Max)</td><td>63 Watt</td></tr><tr><td>Power Consumption Stand by</td><td>0.3 Watt</td></tr><tr><td>Power Consumption (Off Mode)</td><td>0.3 Watt</td></tr><tr><td>On / Off Switch</td><td>Yes</td></tr></tbody></table></figure><h3>Dimensions &amp; Weight</h3><figure class=\"table\"><table><tbody><tr><td>Dimensions &amp; Weight Details</td><td><ul><li>With stand - width: 21.2 in - depth: 7.1 in - height: 14.3 in</li><li>Without stand - width: 21.2 in - depth: 1.9 in - height: 12.2 in - weight: 7.8 lbs</li></ul></td></tr></tbody></table></figure><h3>Dimensions &amp; Weight (Shipping)</h3><figure class=\"table\"><table><tbody><tr><td>Shipping Weight</td><td>17.22 lbs</td></tr></tbody></table></figure><h3>Environmental Standards</h3><figure class=\"table\"><table><tbody><tr><td>TCO Certified</td><td>TCO Certified</td></tr><tr><td>EPEAT Compliant</td><td>EPEAT Gold</td></tr><tr><td>ENERGY STAR Certified</td><td>Yes</td></tr></tbody></table></figure><h3>Manufacturer Warranty</h3><figure class=\"table\"><table><tbody><tr><td>Bundled Services</td><td>3-Years Advanced Exchange Service and Premium Panel Guarantee</td></tr></tbody></table></figure><h3>Environmental Parameters</h3><figure class=\"table\"><table><tbody><tr><td>Min Operating Temperature</td><td>32 °F</td></tr><tr><td>Max Operating Temperature</td><td>104 °F</td></tr><tr><td>Humidity Range Operating</td><td>10 - 80% (non-condensing)</td></tr></tbody></table></figure>', 1, 1, '2023-08-10 04:38:56', '2023-08-10 04:42:20'),
(8, 'Dell ultrasharp u2721', 8, 1, 8, 13, NULL, 10000000, NULL, 5000, 'pBhn-man-hinh-dell-ultrasharp-u2721de-27-inch-2k-usb-type-c-rj45-bao-hanh-36-thang_38775_1.jpg', NULL, '<figure class=\"table\"><table><tbody><tr><td>Hãng sản xuất</td><td>Dell&nbsp;</td></tr><tr><td>Model</td><td>U2721DE</td></tr><tr><td>Kích thước màn hình</td><td>27 inch</td></tr><tr><td>Độ phân giải</td><td>2560X1440</td></tr><tr><td>Tỉ lệ</td><td>16:9</td></tr><tr><td>Tấm nền màn hình</td><td>IPS (In-Plane Switching)</td></tr><tr><td>Độ sáng</td><td>350 cd/㎡</td></tr><tr><td>Độ tương phản</td><td>1000:1</td></tr><tr><td>Tần số quét</td><td>60Hz</td></tr><tr><td>Cổng kết nối</td><td>1 x DP 1.4 (HDCP 1.4)<br>1 x HDMI1.4 (HDCP 1.4)<br>1 x USB Type-C (Alternate mode with DisplayPort 1.4, USB 3.1 upstream port, Power Delivery PD up to 65 W)<br>1 x DP (Out) with MST (HDCP 1.4 )<br>2 x USB 3.0 downstream port<br>2 x USB 3.0 with BC1.2 charging capability at 2A (max)<br>1 x Analog 2.0 audio line out (3.5mm jack)<br>1 x RJ45</td></tr><tr><td>Thời gian đáp ứng</td><td>8 ms for NORMAL mode<br>5 ms for FAST mode</td></tr><tr><td>Góc nhìn</td><td>178°(H)/178°(V)</td></tr><tr><td>Điện năng tiêu thụ</td><td><strong>Voltage Required</strong><br>100 VAC to 240 VAC / 50 Hz or 60 Hz + 3 Hz / 1.8 A (maximum)<br><br><strong>Power Consumption Normal operation</strong><br>33.2 W (typical)<br>160W (maximum)**<br><br><strong>Power Consumption Stand by / Sleep</strong><br>Less than 0.3W</td></tr><tr><td>Kích thước</td><td>612.2 x 355 x 39 mm</td></tr><tr><td>Cân nặng</td><td>4.19 kg</td></tr><tr><td>Phụ kiện</td><td>Cáp nguồn, Cáp DisplayPort, Hướng dẫn sử dụng,...</td></tr></tbody></table></figure><h2><strong>Đánh giá màn hình Dell UltraSharp U2721DE 27\" IPS 2K chuyên đồ họa</strong></h2><p><a href=\"https://gearvn.com/collections/man-hinh-dell\">Màn hình&nbsp;DELL</a> U2721DE tối ưu hóa không gian làm việc của bạn với màn hình thời trang có cấu hình bảng mỏng, chân đế nhỏ gọn và khe quản lý cáp có thể ẩn máy cắt cáp khỏi tầm nhìn.&nbsp;Thêm vào đó, 2 cổng hạ lưu USB (một cổng có tính năng sạc điện) được đặt thuận tiện và có sẵn ở cạnh màn hình, giúp bạn kết nối và sạc các thiết bị ngoại vi của mình một cách dễ dàng.&nbsp;</p><p><img src=\"https://file.hstatic.net/1000026716/file/man-hinh-dell-u2721de-1_5d5cd17e6e0b450eae2f9e77f46f5990.jpg\"></p><p><a href=\"https://gearvn.com/pages/man-hinh\">Màn hình máy tính</a>&nbsp;DELL U2721DE với các tùy chọn kết nối mở rộng như RJ45 và USB-C, màn hình của bạn đóng vai trò như một trung tâm năng suất cung cấp&nbsp;nguồn điện và&nbsp;Ethernet&nbsp;ổn định&nbsp;- tất cả đều có trong một thiết lập gọn gàng.</p><p><img src=\"https://file.hstatic.net/1000026716/file/man-hinh-dell-u2721de-3_7883833b82b046e1b789fa3a4f99631e.jpg\"></p><p>Ngoài ra việc quản lý màn hình của bạn sẽ thật dễ dàng với tính năng truyền qua địa chỉ MAC, khởi động PXE và đánh thức trên mạng LAN được tích hợp một cách thuận tiện. Một trong những dòng <a href=\"https://gearvn.com/products/ips-24-dell-ultrasharp-u2419h\">màn hình Dell Ultrasharp</a> với độ phân giải QHD (2560x1440), bạn sẽ nhận được chi tiết gấp 1,77 lần Full HD.</p><p><img src=\"https://file.hstatic.net/1000026716/file/man-hinh-dell-u2721de_14b667cf317d49b6802bcdedc1b6a0bf.jpg\"></p><p>Dell UltraSharp U2721DE tối ưu hóa không gian làm việc của bạn với màn hình Dell thời trang có cấu hình bảng mỏng, chân đế nhỏ gọn và khe quản lý cáp giúp bạn dễ dàng lắp đặt màn trên bàn làm việc, một trong những dòng <a href=\"https://gearvn.com/collections/man-hinh-27-inch\">màn hình Dell 27 inch</a> đáng sở hữu nhất hiện nay.&nbsp;Màn hình Dell UltraSharp U2721DE sở hữu chất lượng hình ảnh vô cùng xuất sắc, đây chắc chắn là lựa chọn hoàn hảo cho người dùng thiết kế đồ họa chuyên nghiệp cần màn hình đẹp, hiển thị rõ nét, lên màu chuẩn.</p>', 1, 1, '2023-08-10 04:40:12', '2023-08-10 04:42:27'),
(9, 'Dell Utrasharp U4323', 8, 1, 8, 13, NULL, 15000000, NULL, 5000, 'dI0Z-73098_man_hinh_dell_ultrasharp_u4323qe_850x850_3.jpg', NULL, NULL, 1, 1, '2023-08-10 04:41:04', '2023-08-10 04:42:53'),
(10, 'Ram ddr4 16GB', 7, 1, 5, 10, NULL, 500000, NULL, 10000, 'zFnW-tim-hieu-ram-tren-macbook-1-280223-230623.jpg', NULL, NULL, 0, 1, '2023-08-10 04:44:58', '2023-08-10 04:44:58'),
(11, 'Ram ddr4 4GB', 7, 1, 5, 10, NULL, NULL, NULL, NULL, '3ykZ-trident-z-rgb_qqra.jpg', NULL, NULL, 1, 1, '2023-08-10 04:45:59', '2023-08-10 04:45:59'),
(12, 'Ram ddr5 16GB', 7, 1, 5, 10, NULL, NULL, NULL, NULL, 'n9EO-maxresdefault.jpg', NULL, NULL, 1, 1, '2023-08-10 04:46:26', '2023-08-10 04:46:26'),
(13, 'CPU Intel Core i9-9900K (3.60GHz Turbo Up To 5.00GHz, 8 Nhân 16 Luồng, 16M Cache, Coffee Lake)', 7, 1, 5, 9, NULL, NULL, NULL, NULL, 'oT2y-25096-i9-9900k.jpg', NULL, NULL, 1, 1, '2023-08-10 04:48:53', '2023-08-10 04:48:53'),
(14, 'RTX 4070 Ti', 7, 1, 4, 12, NULL, NULL, NULL, NULL, 'y6vu-2702_vga-gigabyte-aorus-geforce-rtx-4070-ti-elite-12g-gv-n407taorus-e-12gd.jpg', NULL, NULL, 1, 1, '2023-08-10 04:54:04', '2023-08-10 04:54:04'),
(15, 'RTX 3050', 7, 1, 4, 12, NULL, NULL, NULL, NULL, 'bi8X-638179462512699245_vga-asus-rog-strix-rtx3050-o8g-gddr6-128-bit-dd.jpg', NULL, NULL, 1, 1, '2023-08-10 04:54:32', '2023-08-10 04:54:32'),
(16, 'RTX 2260', 7, 1, 4, 12, NULL, NULL, NULL, NULL, 'iFNg-2206_card-man-hinh-3-fan.jpg', NULL, NULL, 1, 1, '2023-08-10 04:55:05', '2023-08-10 04:55:05');

-- --------------------------------------------------------

--
-- Table structure for table `ratings`
--

DROP TABLE IF EXISTS `ratings`;
CREATE TABLE IF NOT EXISTS `ratings` (
  `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT,
  `products_id` int UNSIGNED NOT NULL,
  `users_id` int UNSIGNED NOT NULL,
  `ratings` int NOT NULL,
  `content` longtext COLLATE utf8mb4_unicode_ci,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `ratings_products_id_foreign` (`products_id`),
  KEY `ratings_users_id_foreign` (`users_id`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `ratings`
--

INSERT INTO `ratings` (`id`, `products_id`, `users_id`, `ratings`, `content`, `created_at`, `updated_at`) VALUES
(2, 5, 1, 5, '<p>Tuyệt vời !</p>', '2023-08-10 05:02:16', '2023-08-10 05:02:16'),
(3, 6, 1, 5, '<p>Hợp lý</p>', '2023-08-10 05:03:08', '2023-08-10 05:03:08');

-- --------------------------------------------------------

--
-- Table structure for table `roles`
--

DROP TABLE IF EXISTS `roles`;
CREATE TABLE IF NOT EXISTS `roles` (
  `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `guard_name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `roles_name_guard_name_unique` (`name`,`guard_name`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `roles`
--

INSERT INTO `roles` (`id`, `name`, `guard_name`, `created_at`, `updated_at`) VALUES
(1, 'admin', 'web', '2023-04-21 03:02:46', '2023-04-21 03:02:46'),
(2, 'staff', 'web', '2023-04-21 03:02:46', '2023-04-21 03:02:46'),
(3, 'user', 'web', '2023-04-21 03:02:46', '2023-04-21 03:02:46');

-- --------------------------------------------------------

--
-- Table structure for table `role_has_permissions`
--

DROP TABLE IF EXISTS `role_has_permissions`;
CREATE TABLE IF NOT EXISTS `role_has_permissions` (
  `permission_id` bigint UNSIGNED NOT NULL,
  `role_id` bigint UNSIGNED NOT NULL,
  PRIMARY KEY (`permission_id`,`role_id`),
  KEY `role_has_permissions_role_id_foreign` (`role_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `subcategories`
--

DROP TABLE IF EXISTS `subcategories`;
CREATE TABLE IF NOT EXISTS `subcategories` (
  `id` int UNSIGNED NOT NULL AUTO_INCREMENT,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `sort_name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `cat_id` bigint UNSIGNED NOT NULL,
  `active` int NOT NULL DEFAULT '1',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=20 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `subcategories`
--

INSERT INTO `subcategories` (`id`, `name`, `sort_name`, `cat_id`, `active`, `created_at`, `updated_at`) VALUES
(2, 'PS4', 'ps4', 3, 1, '2023-08-10 04:03:05', '2023-08-10 04:03:05'),
(3, 'PS5', 'ps5', 3, 1, '2023-08-10 04:03:14', '2023-08-10 04:03:14'),
(4, 'Xbox', 'xbox', 3, 1, '2023-08-10 04:03:23', '2023-08-10 04:03:23'),
(5, 'Bàn phím', 'ban-phim', 4, 1, '2023-08-10 04:03:57', '2023-08-10 04:03:57'),
(6, 'Chuột', 'chuot', 4, 1, '2023-08-10 04:04:08', '2023-08-10 04:04:08'),
(7, 'Tai nghe', 'tai-nghe', 4, 1, '2023-08-10 04:04:22', '2023-08-10 04:04:22'),
(8, 'Loa', 'loa', 6, 1, '2023-08-10 04:04:57', '2023-08-10 04:04:57'),
(9, 'Chip', 'chip', 7, 1, '2023-08-10 04:05:10', '2023-08-10 04:05:10'),
(10, 'Ram', 'ram', 7, 1, '2023-08-10 04:05:21', '2023-08-10 04:05:21'),
(11, 'CPU', 'cpu', 7, 1, '2023-08-10 04:05:30', '2023-08-10 04:05:30'),
(12, 'VGA', 'vga', 7, 1, '2023-08-10 04:05:43', '2023-08-10 04:05:43'),
(13, 'Dell', 'dell', 8, 1, '2023-08-10 04:05:53', '2023-08-10 04:05:53'),
(14, 'Samsung', 'samsung', 8, 1, '2023-08-10 04:06:05', '2023-08-10 04:06:05'),
(15, 'MSI', 'msi', 8, 1, '2023-08-10 04:06:18', '2023-08-10 04:06:18'),
(16, 'Máy bộ', 'may-bo', 9, 1, '2023-08-10 04:06:33', '2023-08-10 04:06:33'),
(17, 'Laptop', 'laptop', 9, 1, '2023-08-10 04:06:44', '2023-08-10 04:06:44'),
(18, 'Áo trơn', 'ao-tron', 10, 1, '2023-08-10 04:06:56', '2023-08-10 04:06:56'),
(19, 'Áo dù', 'ao-du', 10, 1, '2023-08-10 04:07:06', '2023-08-10 04:07:06');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

DROP TABLE IF EXISTS `users`;
CREATE TABLE IF NOT EXISTS `users` (
  `id` int UNSIGNED NOT NULL AUTO_INCREMENT,
  `firstname` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `lastname` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `username` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `password` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `image` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `active` int NOT NULL DEFAULT '1',
  `facebook` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `phone` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `users_username_unique` (`username`),
  UNIQUE KEY `users_email_unique` (`email`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `firstname`, `lastname`, `username`, `email`, `password`, `image`, `active`, `facebook`, `phone`, `remember_token`, `created_at`, `updated_at`) VALUES
(1, 'admin', 'Anh', 'admin', 'admin@gmail.com', '$2y$10$P03DkpE8fuRoRdT8iatxIe05zZ6nbvFGN4uXiGzYRPqxLL5pbsgAG', 'avatar.jpg', 1, NULL, NULL, NULL, '2023-04-21 03:02:46', '2023-04-21 03:02:46'),
(2, 'Hữu', 'Anh', 'dangphuchuu', 'phuchuu0120@gmail.com', '$2y$10$SE6XFthiOgdKKslDi1DXbuok.iFm8qyuWH.F4StbgSKNsJ9IWV9wW', 'avatar.jpg', 1, NULL, NULL, NULL, '2023-04-21 03:02:46', '2023-04-21 03:02:46'),
(3, 'huu', 'anh', 'dangphuchuu12', 'phuchuu012011@gmail.com', '$2y$10$hAiRMSSOh45jav.YjpkA4OZE4OJlK9Qx/gQ5aIYw7/S4KNM8Y11TK', 'avatar.jpg', 1, NULL, NULL, NULL, '2023-07-16 07:03:47', '2023-07-16 07:03:47');

-- --------------------------------------------------------

--
-- Table structure for table `wishlists`
--

DROP TABLE IF EXISTS `wishlists`;
CREATE TABLE IF NOT EXISTS `wishlists` (
  `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT,
  `products_id` bigint UNSIGNED NOT NULL,
  `users_id` bigint UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `imagelibraries`
--
ALTER TABLE `imagelibraries`
  ADD CONSTRAINT `imagelibraries_products_id_foreign` FOREIGN KEY (`products_id`) REFERENCES `products` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `model_has_permissions`
--
ALTER TABLE `model_has_permissions`
  ADD CONSTRAINT `model_has_permissions_permission_id_foreign` FOREIGN KEY (`permission_id`) REFERENCES `permissions` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `model_has_roles`
--
ALTER TABLE `model_has_roles`
  ADD CONSTRAINT `model_has_roles_role_id_foreign` FOREIGN KEY (`role_id`) REFERENCES `roles` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `orders`
--
ALTER TABLE `orders`
  ADD CONSTRAINT `orders_users_id_foreign` FOREIGN KEY (`users_id`) REFERENCES `users` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `orders__details`
--
ALTER TABLE `orders__details`
  ADD CONSTRAINT `orders__details_orders_id_foreign` FOREIGN KEY (`orders_id`) REFERENCES `orders` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `orders__details_product_id_foreign` FOREIGN KEY (`product_id`) REFERENCES `products` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `ratings`
--
ALTER TABLE `ratings`
  ADD CONSTRAINT `ratings_products_id_foreign` FOREIGN KEY (`products_id`) REFERENCES `products` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `ratings_users_id_foreign` FOREIGN KEY (`users_id`) REFERENCES `users` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `role_has_permissions`
--
ALTER TABLE `role_has_permissions`
  ADD CONSTRAINT `role_has_permissions_permission_id_foreign` FOREIGN KEY (`permission_id`) REFERENCES `permissions` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `role_has_permissions_role_id_foreign` FOREIGN KEY (`role_id`) REFERENCES `roles` (`id`) ON DELETE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
