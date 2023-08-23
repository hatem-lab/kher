-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Feb 02, 2022 at 11:41 PM
-- Server version: 10.4.21-MariaDB
-- PHP Version: 7.4.23

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `bunyakum_db_115`
--

-- --------------------------------------------------------

--
-- Table structure for table `about_app`
--

CREATE TABLE `about_app` (
  `id` int(11) NOT NULL,
  `description` longtext DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `about_app`
--

INSERT INTO `about_app` (`id`, `description`, `created_at`, `updated_at`) VALUES
(1, 'any thing', NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `admins`
--

CREATE TABLE `admins` (
  `id` int(11) NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `password` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `address` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `user_type` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `phone` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `photo` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `status` tinyint(11) NOT NULL DEFAULT 2,
  `mobile_confirmed` tinyint(11) NOT NULL DEFAULT 0,
  `language` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'ar',
  `device_token` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `admins`
--

INSERT INTO `admins` (`id`, `name`, `email`, `password`, `address`, `created_at`, `updated_at`, `user_type`, `phone`, `photo`, `status`, `mobile_confirmed`, `language`, `device_token`) VALUES
(1, 'admin', 'superadmin@admin.com', '$2y$10$gSXd7mA1FIH6A1Cu84.nF.lNJSyDZFK3lZX0RodjjIlE2MbJmDI3i', 'mazzah', '2021-10-25 21:00:00', '2021-12-22 19:03:02', 'SuperAdmin', '0937676881', 'admins\\1639741810.jpg', 2, 0, 'ar', 'fb4L46D8-q5thr5xm7Pwak:APA91bFcDiBEtH_L9pAK3Vfd7r98VPHthwh2ppQmYeiR9Af46Ib6ZtcnALlr5JS26gy4tq8RZsgxxdTt-3BQvCAPdMu2B3G953PUrebjxR_5skqLyEPzfe9JuiMstrV-qWC4IYASDxRI'),
(2, 'admin2', 'admin2@admin2.com', '$2y$10$gSXd7mA1FIH6A1Cu84.nF.lNJSyDZFK3lZX0RodjjIlE2MbJmDI3i', 'any', '2021-12-10 16:11:10', '2021-12-22 19:10:22', 'admin', '0937676883', 'admins\\1640026725.jpg', 1, 0, 'ar', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `admin_mobile_email`
--

CREATE TABLE `admin_mobile_email` (
  `id` int(11) NOT NULL,
  `admin_id` tinyint(11) NOT NULL,
  `mobile` varchar(255) DEFAULT NULL,
  `email` varchar(255) DEFAULT NULL,
  `confirm_code` int(11) NOT NULL,
  `is_confirmed` tinyint(11) NOT NULL DEFAULT 0,
  `type` tinyint(11) NOT NULL DEFAULT 1,
  `is_primary` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `admin_mobile_email`
--

INSERT INTO `admin_mobile_email` (`id`, `admin_id`, `mobile`, `email`, `confirm_code`, `is_confirmed`, `type`, `is_primary`) VALUES
(10, 40, '0937676882', NULL, 11020, 1, 1, 0);

-- --------------------------------------------------------

--
-- Table structure for table `advertisements`
--

CREATE TABLE `advertisements` (
  `id` int(11) NOT NULL,
  `title` varchar(255) DEFAULT NULL,
  `url` varchar(255) DEFAULT NULL,
  `start_at` varchar(255) DEFAULT NULL,
  `end_at` varchar(255) DEFAULT NULL,
  `image` varchar(255) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `advertisements`
--

INSERT INTO `advertisements` (`id`, `title`, `url`, `start_at`, `end_at`, `image`, `created_at`, `updated_at`) VALUES
(2, 'title', 'https://www.youtube.com/watch?v=FTqSqqYqhKY&list=PLmjgRgW8HBM-y5Drjcn2tCymFbvYyrm3B&index=1', '2022-01-27', '2022-01-31', 'ads\\1643289510339194.jpg', '2022-01-27 13:18:30', '2022-01-27 13:18:30');

-- --------------------------------------------------------

--
-- Table structure for table `app_info`
--

CREATE TABLE `app_info` (
  `id` int(11) NOT NULL,
  `email` varchar(255) DEFAULT NULL,
  `phone` varchar(255) DEFAULT NULL,
  `whatsApp_phone` varchar(255) DEFAULT NULL,
  `mobile` varchar(255) DEFAULT NULL,
  `site_url` varchar(255) DEFAULT NULL,
  `facebook_url` varchar(255) DEFAULT NULL,
  `linkedin_url` varchar(255) DEFAULT NULL,
  `twitter_url` varchar(255) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `app_info`
--

INSERT INTO `app_info` (`id`, `email`, `phone`, `whatsApp_phone`, `mobile`, `site_url`, `facebook_url`, `linkedin_url`, `twitter_url`, `created_at`, `updated_at`) VALUES
(1, 'admin1@admin.com', '828659', '0937676884', '0937676881', 'admin@admin.com', 'admin@admin.com', 'admin@admin.com', 'admin@admin.com', '2021-12-07 21:17:32', '2021-12-07 21:31:33'),
(2, 'test@test.com', '0937676882', NULL, NULL, NULL, NULL, NULL, NULL, '2022-01-26 19:28:15', '2022-01-26 19:28:15');

-- --------------------------------------------------------

--
-- Table structure for table `bouquets`
--

CREATE TABLE `bouquets` (
  `id` int(11) NOT NULL,
  `date` varchar(255) DEFAULT NULL,
  `price` varchar(255) DEFAULT NULL,
  `color` varchar(255) DEFAULT NULL,
  `icon` varchar(255) DEFAULT NULL,
  `status` tinyint(2) NOT NULL DEFAULT 1,
  `end_date` datetime DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `bouquets`
--

INSERT INTO `bouquets` (`id`, `date`, `price`, `color`, `icon`, `status`, `end_date`, `created_at`, `updated_at`) VALUES
(6, '3', '12313', '#331515', 'Bouquets\\1639948905523556.jpg', 1, '2022-03-19 23:21:45', '2021-12-19 21:21:45', '2021-12-19 21:21:45'),
(8, '3', '12313', '#e66465', 'Bouquets\\1640200585854659.jpg', 1, '2022-03-22 21:16:25', '2021-12-22 19:16:25', '2021-12-22 19:16:25');

-- --------------------------------------------------------

--
-- Table structure for table `categories`
--

CREATE TABLE `categories` (
  `id` int(11) NOT NULL,
  `name` text DEFAULT NULL,
  `status` int(11) NOT NULL DEFAULT 1,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `categories`
--

INSERT INTO `categories` (`id`, `name`, `status`, `created_at`, `updated_at`) VALUES
(1, 'خدمة مكيفات', 2, '2021-10-25 21:00:00', '2021-12-20 19:12:36'),
(2, 'خدمة صيانة', 2, '2021-10-25 21:00:00', '2021-12-20 19:12:36');

-- --------------------------------------------------------

--
-- Table structure for table `cities`
--

CREATE TABLE `cities` (
  `id` int(11) NOT NULL,
  `name` varchar(255) DEFAULT NULL,
  `country_id` tinyint(11) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `cities`
--

INSERT INTO `cities` (`id`, `name`, `country_id`, `created_at`, `updated_at`) VALUES
(1, 'الرياض', 1, '2021-11-23 21:43:58', '2021-11-23 21:43:58'),
(2, 'جدة', 1, '2021-10-25 21:00:00', '2021-10-25 21:00:00'),
(3, 'الدمام', 1, '2021-10-25 21:00:00', '2021-10-25 21:00:00');

-- --------------------------------------------------------

--
-- Table structure for table `conditions`
--

CREATE TABLE `conditions` (
  `id` int(11) NOT NULL,
  `title` varchar(255) DEFAULT NULL,
  `content` longtext DEFAULT NULL,
  `user_type` text DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `conditions`
--

INSERT INTO `conditions` (`id`, `title`, `content`, `user_type`, `created_at`, `updated_at`) VALUES
(1, 'test', 'content', 'طالب خدمة', '2022-01-26 22:35:51', '2022-01-26 22:35:51');

-- --------------------------------------------------------

--
-- Table structure for table `countries`
--

CREATE TABLE `countries` (
  `id` int(11) NOT NULL,
  `name` varchar(255) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `countries`
--

INSERT INTO `countries` (`id`, `name`, `created_at`, `updated_at`) VALUES
(1, 'سعودية', '2021-10-25 21:00:00', '2021-10-25 21:00:00');

-- --------------------------------------------------------

--
-- Table structure for table `images`
--

CREATE TABLE `images` (
  `id` int(11) NOT NULL,
  `file` varchar(255) DEFAULT NULL,
  `service_id` int(11) DEFAULT NULL,
  `product_id` int(11) DEFAULT NULL,
  `mentenance_provider_id` int(11) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `images`
--

INSERT INTO `images` (`id`, `file`, `service_id`, `product_id`, `mentenance_provider_id`, `created_at`, `updated_at`) VALUES
(109, 'Product_images/rSgZ7WDxKglUSivS.jpg', NULL, 17, NULL, '2022-02-02 21:58:07', '2022-02-02 21:58:07'),
(110, 'Product_images/xmykziqL1anHwAY4.jpg', NULL, 18, NULL, '2022-02-02 21:58:25', '2022-02-02 21:58:25'),
(111, 'Product_images/F4dYubRp9vegEDnf.jpg', NULL, 18, NULL, '2022-02-02 21:58:25', '2022-02-02 21:58:25'),
(112, 'service_images/cB5dpqVbpC8pKTQg.jpeg', 5, NULL, NULL, '2022-02-02 22:02:32', '2022-02-02 22:02:32'),
(113, 'service_images/nc0UhXsBqZRNVssl.jpeg', 5, NULL, NULL, '2022-02-02 22:02:32', '2022-02-02 22:02:32'),
(114, 'service_images/Mv8s1FVv1y7VL9YF.jpeg', 6, NULL, NULL, '2022-02-02 22:03:11', '2022-02-02 22:03:11'),
(115, 'service_images/ChSFVqyUXllB5Eiv.jpeg', 6, NULL, NULL, '2022-02-02 22:03:11', '2022-02-02 22:03:11'),
(116, 'mentenance_images/uURh5hwVbzimPLrN.jpeg', NULL, NULL, 12, '2022-02-02 22:06:07', '2022-02-02 22:06:07'),
(117, 'mentenance_images/XkyP5kTkj7tZQmFC.jpeg', NULL, NULL, 12, '2022-02-02 22:06:07', '2022-02-02 22:06:07'),
(118, 'mentenance_images/ZJ124JrFA5sz0MWZ.jpeg', NULL, NULL, 12, '2022-02-02 22:06:07', '2022-02-02 22:06:07'),
(119, 'mentenance_images/NlTsiKubTjKnEYDp.jpeg', NULL, NULL, 13, '2022-02-02 22:06:59', '2022-02-02 22:06:59'),
(120, 'mentenance_images/8ZZhVsX9LbzNDnPt.jpg', NULL, NULL, 13, '2022-02-02 22:06:59', '2022-02-02 22:06:59'),
(121, 'Product_images/ioPZTv1dYa5x6OYd.jpg', NULL, 19, NULL, '2022-02-02 22:30:43', '2022-02-02 22:30:43'),
(122, 'Product_images/ZBLxP6JOUHwudfDG.jpg', NULL, 19, NULL, '2022-02-02 22:30:43', '2022-02-02 22:30:43'),
(123, 'Product_images/gN7cx68ctm8AdCmw.jpg', NULL, 20, NULL, '2022-02-02 22:31:11', '2022-02-02 22:31:11'),
(124, 'Product_images/VrIc5V2PjY9CiKkW.jpg', NULL, 20, NULL, '2022-02-02 22:31:11', '2022-02-02 22:31:11');

-- --------------------------------------------------------

--
-- Table structure for table `jobs`
--

CREATE TABLE `jobs` (
  `id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `status` int(11) DEFAULT 1,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `jobs`
--

INSERT INTO `jobs` (`id`, `name`, `status`, `created_at`, `updated_at`) VALUES
(1, 'مكتب', 1, '2021-11-22 21:46:48', '2021-11-22 21:46:48'),
(2, 'شركة', 1, '2021-07-10 21:00:00', '2021-07-10 21:00:00'),
(3, 'محل تجاري', 1, '2021-10-25 21:00:00', '2021-10-25 21:00:00'),
(4, 'مقاول', 1, '2021-07-10 21:00:00', '2021-07-10 21:00:00');

-- --------------------------------------------------------

--
-- Table structure for table `jobs_types`
--

CREATE TABLE `jobs_types` (
  `id` int(11) NOT NULL,
  `service_id` int(11) DEFAULT NULL,
  `image` varchar(255) DEFAULT NULL,
  `title` varchar(255) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `jobs_types`
--

INSERT INTO `jobs_types` (`id`, `service_id`, `image`, `title`, `created_at`, `updated_at`) VALUES
(30, 5, 'type_job\\1643839352704303.jpg', 'title_1', '2022-02-02 22:02:32', '2022-02-02 22:02:32'),
(31, 5, 'type_job\\1643839352122301.jpg', 'title_1', '2022-02-02 22:02:32', '2022-02-02 22:02:32'),
(32, 6, 'type_job\\164383939173325.jpg', 'title_1', '2022-02-02 22:03:11', '2022-02-02 22:03:11'),
(33, 6, 'type_job\\1643839391330218.jpg', 'title_1', '2022-02-02 22:03:11', '2022-02-02 22:03:11');

-- --------------------------------------------------------

--
-- Table structure for table `likes`
--

CREATE TABLE `likes` (
  `id` int(11) NOT NULL,
  `service_provider_id` int(11) DEFAULT NULL,
  `service_id` int(11) DEFAULT NULL,
  `mentenance_id` int(11) DEFAULT NULL,
  `service_order_id` int(11) DEFAULT NULL,
  `isLiked` int(11) DEFAULT 0,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `mentenace_category`
--

CREATE TABLE `mentenace_category` (
  `id` int(11) NOT NULL,
  `mentenace_id` int(11) DEFAULT NULL,
  `category_id` int(11) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `mentenace_notifications`
--

CREATE TABLE `mentenace_notifications` (
  `id` int(11) NOT NULL,
  `mentenance_id` int(11) DEFAULT NULL,
  `user_id` int(11) DEFAULT NULL,
  `author_id` int(11) DEFAULT NULL,
  `content` varchar(255) DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `mentenance_providers`
--

CREATE TABLE `mentenance_providers` (
  `id` int(11) NOT NULL,
  `category_id` int(11) DEFAULT NULL,
  `title` varchar(255) DEFAULT NULL,
  `user_id` int(11) NOT NULL,
  `status` int(11) DEFAULT 1,
  `price` varchar(255) DEFAULT NULL,
  `description` longtext DEFAULT NULL,
  `phone` varchar(255) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NULL DEFAULT current_timestamp(),
  `agree_conditions` tinyint(1) NOT NULL DEFAULT 1
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `mentenance_providers`
--

INSERT INTO `mentenance_providers` (`id`, `category_id`, `title`, `user_id`, `status`, `price`, `description`, `phone`, `created_at`, `updated_at`, `agree_conditions`) VALUES
(11, 1, 'mentenance_1', 162, 2, '50', 'Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry\'s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum.', NULL, '2022-02-02 22:05:25', '2022-02-02 22:05:25', 2),
(12, 1, 'mentenance_1', 162, 2, '50', 'Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry\'s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum.', NULL, '2022-02-02 22:06:07', '2022-02-02 22:06:07', 2),
(13, 2, 'mentenance_2', 162, 2, '50', 'Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry\'s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum.', NULL, '2022-02-02 22:06:59', '2022-02-02 22:06:59', 2);

-- --------------------------------------------------------

--
-- Table structure for table `mentenance_provider_city`
--

CREATE TABLE `mentenance_provider_city` (
  `id` int(11) NOT NULL,
  `mentenance_id` int(11) NOT NULL,
  `city_id` int(11) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `mentenance_provider_city`
--

INSERT INTO `mentenance_provider_city` (`id`, `mentenance_id`, `city_id`, `created_at`, `updated_at`) VALUES
(6, 12, 1, NULL, NULL),
(7, 13, 2, NULL, NULL);

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
(3, '2017_05_29_155126144426_create_products_table', 1),
(4, '2020_08_19_204833_create_settings_table', 1),
(5, '2020_08_19_213045_create_setting_translations_table', 1),
(6, '2020_09_12_191258_create_brand_translations_table', 1),
(7, '2020_11_14_133140_add_mobile_column_to_user_table', 1),
(8, '2020_11_14_133619_drop_email_column_from_user_table', 1),
(9, '2020_11_14_141441_create_users_verfication_code_table', 1),
(10, '2021_11_09_132548_create_teashers_table', 2),
(12, '2021_11_09_132740_create_admins_table', 3);

-- --------------------------------------------------------

--
-- Table structure for table `notifications`
--

CREATE TABLE `notifications` (
  `id` int(11) NOT NULL,
  `user_id` int(11) DEFAULT NULL,
  `admin_id` int(11) DEFAULT NULL,
  `author_id` int(11) DEFAULT NULL,
  `title` varchar(255) DEFAULT NULL,
  `content` varchar(255) DEFAULT NULL,
  `data_id` int(11) DEFAULT NULL,
  `type` tinyint(11) DEFAULT NULL,
  `date` datetime DEFAULT NULL,
  `is_read` int(11) NOT NULL DEFAULT 1,
  `publish` int(11) NOT NULL DEFAULT 0,
  `status` int(11) NOT NULL DEFAULT 1,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

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
-- Table structure for table `preferred_contact_media`
--

CREATE TABLE `preferred_contact_media` (
  `id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `status` int(11) NOT NULL DEFAULT 1,
  `user_id` int(11) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `preferred_contact_media`
--

INSERT INTO `preferred_contact_media` (`id`, `name`, `status`, `user_id`, `created_at`, `updated_at`) VALUES
(62, ' facebook.com', 1, 162, '2022-02-02 21:50:44', '2022-02-02 21:50:44'),
(63, 'insta.com', 1, 162, '2022-02-02 21:50:44', '2022-02-02 21:50:44'),
(64, 'insta.com', 1, 164, '2022-02-02 21:50:44', '2022-02-02 21:50:44');

-- --------------------------------------------------------

--
-- Table structure for table `preferred_contact_media_agent`
--

CREATE TABLE `preferred_contact_media_agent` (
  `id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `media_contact_id` int(11) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `products`
--

CREATE TABLE `products` (
  `id` int(11) NOT NULL,
  `name` varchar(255) DEFAULT NULL,
  `user_id` int(11) DEFAULT NULL,
  `price` int(11) DEFAULT NULL,
  `status` int(11) DEFAULT NULL,
  `description` longtext DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `products`
--

INSERT INTO `products` (`id`, `name`, `user_id`, `price`, `status`, `description`, `created_at`, `updated_at`) VALUES
(17, 'product_1', 162, 45, 2, 'Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry\'s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum.', '2022-02-02 21:58:07', '2022-02-02 21:58:07'),
(18, 'product_2', 162, 45, 2, 'Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry\'s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum.', '2022-02-02 21:58:25', '2022-02-02 21:58:25'),
(19, 'product_2', 164, 45, 2, 'Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry\'s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum.', '2022-02-02 22:30:43', '2022-02-02 22:30:43'),
(20, 'product_1', 164, 67, 2, 'Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry\'s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum.', '2022-02-02 22:31:11', '2022-02-02 22:31:11');

-- --------------------------------------------------------

--
-- Table structure for table `ratings`
--

CREATE TABLE `ratings` (
  `id` int(11) NOT NULL,
  `service_provider_id` int(11) DEFAULT NULL,
  `service_id` int(11) DEFAULT NULL,
  `mentenance_id` int(11) DEFAULT NULL,
  `service_order_id` int(11) DEFAULT NULL,
  `comment` varchar(255) DEFAULT NULL,
  `rating_stars` varchar(255) DEFAULT NULL,
  `status` int(11) NOT NULL DEFAULT 1,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `sections`
--

CREATE TABLE `sections` (
  `id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `status` int(11) NOT NULL DEFAULT 1,
  `job_id` int(11) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `sections`
--

INSERT INTO `sections` (`id`, `name`, `status`, `job_id`, `created_at`, `updated_at`) VALUES
(1, 'مكتب عقار', 1, 1, '2021-10-25 21:00:00', '2021-12-03 13:35:54'),
(2, 'مكاتب هندسة', 1, 1, '2021-07-10 21:00:00', '2021-12-30 03:16:43'),
(3, 'شركات تأمين', 1, 2, '2021-11-22 21:50:50', '2021-12-03 13:36:13'),
(4, 'التصميم الداخي 1', 1, 3, '2021-11-22 21:50:50', '2021-12-20 18:38:39'),
(5, 'مقاول عظم', 1, 4, '2021-11-22 21:52:25', '2021-11-22 21:52:25'),
(6, 'مقاول حفر وردم', 1, 4, '2021-11-22 21:52:57', '2021-11-22 21:52:57'),
(7, 'مقاولة سباكة وكهرباء', 1, 4, '2021-11-22 21:53:23', '2021-11-22 21:53:23'),
(8, 'مقاولة تكييف', 1, 4, '2021-11-22 21:53:45', '2021-11-22 21:53:45'),
(9, 'مقاولة لباسة', 1, 4, '2021-11-22 21:54:13', '2021-11-22 21:54:13'),
(10, 'مقاو بلاط', 1, 4, '2021-11-22 21:54:32', '2021-11-22 21:54:32'),
(11, 'مقاول مسابح', 1, 4, '2021-11-22 21:54:51', '2021-11-22 21:54:51'),
(12, 'مقاول جبيسات وديكورات داخلية', 1, 4, '2021-11-22 21:55:33', '2021-11-22 21:55:33'),
(13, 'مقاول تكسيات خارجية(رخام-حجر-كلادنج)', 1, 4, '2021-11-22 21:56:15', '2021-11-22 21:56:15'),
(14, 'محلات الأبواب(حديد-خشب-المنيوم)', 1, 3, '2021-11-22 21:57:26', '2021-11-22 21:57:26'),
(15, 'شركات خزان الفيبر', 1, 2, '2021-11-23 21:59:04', '2021-11-23 21:59:04'),
(16, 'شركات الحديد التسليح', 1, 2, '2021-11-23 21:59:04', '2021-11-23 21:59:04'),
(17, 'محلات المطابخ', 1, 1, '2021-11-22 22:00:43', '2021-11-22 22:00:43'),
(18, 'مصانع البلك الخزاني', 1, 2, '2021-11-22 22:01:08', '2021-11-22 22:01:08'),
(19, 'مصانع البناء الحديث', 1, 2, '2021-11-22 22:02:37', '2021-11-22 22:02:37'),
(20, 'محلات الأدوات الصحية والكهرباء', 1, 3, '2021-11-22 22:03:08', '2021-11-22 22:03:08'),
(38, 'hatem', 1, 3, '2021-12-20 18:40:00', '2021-12-20 18:40:00');

-- --------------------------------------------------------

--
-- Table structure for table `section_admin`
--

CREATE TABLE `section_admin` (
  `id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `section_id` int(11) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `section_admin`
--

INSERT INTO `section_admin` (`id`, `user_id`, `section_id`, `created_at`, `updated_at`) VALUES
(34, 162, 1, NULL, NULL),
(35, 164, 3, NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `services`
--

CREATE TABLE `services` (
  `id` int(11) NOT NULL,
  `name` varchar(255) DEFAULT NULL,
  `user_id` int(11) DEFAULT NULL,
  `description` longtext DEFAULT NULL,
  `price` varchar(255) DEFAULT NULL,
  `section_id` int(11) DEFAULT NULL,
  `status` int(11) DEFAULT 1,
  `type_job_id` int(11) DEFAULT NULL,
  `agree_conditions` varchar(11) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `services`
--

INSERT INTO `services` (`id`, `name`, `user_id`, `description`, `price`, `section_id`, `status`, `type_job_id`, `agree_conditions`, `created_at`, `updated_at`) VALUES
(4, 'service_1', 164, 'Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry\'s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum.', '50', 1, 2, NULL, 'true', '2022-02-02 22:00:47', '2022-02-02 22:00:47'),
(5, 'service_1', 162, 'Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry\'s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum.', '50', 1, 2, NULL, 'true', '2022-02-02 22:02:32', '2022-02-02 22:02:32'),
(6, 'service_2', 162, 'Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry\'s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum.', '50', 1, 2, NULL, 'true', '2022-02-02 22:03:11', '2022-02-02 22:03:11');

-- --------------------------------------------------------

--
-- Table structure for table `service_city`
--

CREATE TABLE `service_city` (
  `id` int(11) NOT NULL,
  `city_id` int(11) DEFAULT NULL,
  `service_id` int(11) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `service_city`
--

INSERT INTO `service_city` (`id`, `city_id`, `service_id`, `created_at`, `updated_at`) VALUES
(18, 1, 5, '2022-02-02 22:02:32', '2022-02-02 22:02:32'),
(19, 2, 6, '2022-02-02 22:03:11', '2022-02-02 22:03:11');

-- --------------------------------------------------------

--
-- Table structure for table `service_provider_profile`
--

CREATE TABLE `service_provider_profile` (
  `id` int(11) NOT NULL,
  `user_id` int(11) DEFAULT NULL,
  `address` varchar(255) DEFAULT NULL,
  `country_id` int(11) DEFAULT NULL,
  `city_id` int(11) DEFAULT NULL,
  `land_line_phone` varchar(255) DEFAULT NULL,
  `image_license` varchar(255) DEFAULT NULL,
  `image_commercial_register` varchar(255) DEFAULT NULL,
  `license_expiry_date` varchar(11) DEFAULT NULL,
  `job_id` int(11) DEFAULT NULL,
  `description` longtext DEFAULT NULL,
  `view_acount` int(11) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `service_provider_profile`
--

INSERT INTO `service_provider_profile` (`id`, `user_id`, `address`, `country_id`, `city_id`, `land_line_phone`, `image_license`, `image_commercial_register`, `license_expiry_date`, `job_id`, `description`, `view_acount`, `created_at`, `updated_at`) VALUES
(78, 162, 'any', 1, NULL, '828985', 'users\\1643838644671713.jpg', 'users\\1643838644222857.jpg', '763', 1, 'any', NULL, '2022-02-02 21:50:44', '2022-02-02 21:50:44'),
(79, 164, 'any', 1, NULL, '828985', 'users\\1643838781933894.jpg', 'users\\1643838781922947.jpg', '763', 2, 'any', NULL, '2022-02-02 21:53:01', '2022-02-02 21:53:01');

-- --------------------------------------------------------

--
-- Table structure for table `subscriptions`
--

CREATE TABLE `subscriptions` (
  `id` int(11) NOT NULL,
  `user_id` int(11) DEFAULT NULL,
  `bouquet_id` int(11) DEFAULT NULL,
  `expiry_date` varchar(255) DEFAULT NULL,
  `status` tinyint(4) NOT NULL DEFAULT 1,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `technical_user`
--

CREATE TABLE `technical_user` (
  `id` int(11) NOT NULL,
  `name` varchar(255) DEFAULT NULL,
  `status` int(11) NOT NULL DEFAULT 1,
  `city_id` int(11) DEFAULT NULL,
  `phone` varchar(255) DEFAULT NULL,
  `user_id` int(11) DEFAULT NULL,
  `maintenance_id` int(11) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `technical_user`
--

INSERT INTO `technical_user` (`id`, `name`, `status`, `city_id`, `phone`, `user_id`, `maintenance_id`, `created_at`, `updated_at`) VALUES
(6, 'name_1', 1, 1, '828659', 162, 12, '2022-02-02 22:06:07', '2022-02-02 22:06:07'),
(7, 'name_2', 1, 1, '879546', 162, 12, '2022-02-02 22:06:07', '2022-02-02 22:06:07'),
(8, 'name_1', 1, 1, '828659', 162, 13, '2022-02-02 22:06:59', '2022-02-02 22:06:59'),
(9, 'name_2', 1, 1, '879546', 162, 13, '2022-02-02 22:06:59', '2022-02-02 22:06:59');

-- --------------------------------------------------------

--
-- Table structure for table `type_works`
--

CREATE TABLE `type_works` (
  `id` int(11) NOT NULL,
  `title` varchar(255) DEFAULT NULL,
  `image` varchar(255) DEFAULT NULL,
  `service_id` int(11) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `password` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NULL DEFAULT current_timestamp(),
  `deleted_at` timestamp NULL DEFAULT NULL,
  `phone` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `image` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `status` int(11) DEFAULT 1,
  `mobile_confirmed` int(11) DEFAULT 0,
  `language` varchar(11) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'ar',
  `role` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `views_count` int(11) DEFAULT 0,
  `view_profile` int(11) NOT NULL DEFAULT 0,
  `agree_conditions` tinyint(1) DEFAULT NULL,
  `approve_Status` int(11) DEFAULT 1,
  `rating` varchar(11) COLLATE utf8mb4_unicode_ci DEFAULT '0',
  `date` date DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `name`, `email`, `password`, `created_at`, `updated_at`, `deleted_at`, `phone`, `image`, `status`, `mobile_confirmed`, `language`, `role`, `views_count`, `view_profile`, `agree_conditions`, `approve_Status`, `rating`, `date`) VALUES
(162, 'provider_1', NULL, '$2y$10$bpjmkUUCDSk9Fz44/cVGguTprnh20uv3cdxQA1XhXLQfi98ndD.6q', '2022-02-02 21:50:44', '2022-02-02 22:22:31', NULL, '0937676881', NULL, 1, 0, 'ar', 'provider', 0, 3, 2, 2, '0', '2020-01-01'),
(164, 'provider_2', NULL, '$2y$10$dfUVB.aSDwgfzjozhmwau.xhWkxZQEUi/Xn2XRj2Tg9m6BFXiik8m', '2022-02-02 21:53:01', '2022-02-02 22:22:25', NULL, '0937676882', NULL, 1, 0, 'ar', 'provider', 0, 0, 2, 2, '0', '2020-01-01'),
(165, 'user_1', NULL, '$2y$10$kL7mPpmcAsXTYVt05Y6cdegv2XQuSBSA3Q5WXRr.GI0dmDZkoD7qG', '2022-02-02 21:54:26', '2022-02-02 21:54:26', NULL, '0937676883', NULL, 1, 0, 'ar', 'user', 0, 0, NULL, 1, '0', NULL),
(166, 'user_2', NULL, '$2y$10$RYcYR1BT3mnoZq.R0SLtSOR8nfTNJZSgSjbHFK2hhc2Rem9rdQR2i', '2022-02-02 21:54:38', '2022-02-02 21:54:38', NULL, '0937676884', NULL, 1, 0, 'ar', 'user', 0, 0, NULL, 1, '0', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `user_city`
--

CREATE TABLE `user_city` (
  `id` int(11) NOT NULL,
  `city_id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `user_city`
--

INSERT INTO `user_city` (`id`, `city_id`, `user_id`, `created_at`, `updated_at`) VALUES
(27, 1, 162, NULL, NULL),
(28, 2, 164, NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `user_mobile_email`
--

CREATE TABLE `user_mobile_email` (
  `id` int(11) NOT NULL,
  `user_id` int(11) DEFAULT NULL,
  `mobile` varchar(255) DEFAULT NULL,
  `confirm_code` int(11) DEFAULT NULL,
  `is_confirmed` int(11) NOT NULL DEFAULT 0,
  `is_primary` int(11) DEFAULT NULL,
  `type` int(11) DEFAULT 1,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `user_mobile_email`
--

INSERT INTO `user_mobile_email` (`id`, `user_id`, `mobile`, `confirm_code`, `is_confirmed`, `is_primary`, `type`, `created_at`, `updated_at`) VALUES
(16, 42, '0937676882', 37827, 0, 1, 1, NULL, NULL),
(38, 84, '0937676881', 55469, 1, 1, 1, NULL, NULL),
(39, NULL, '0937676881', 90762, 1, 0, 2, NULL, NULL),
(40, 85, '0937676885', 60581, 0, 1, 1, NULL, NULL),
(41, 86, '0937676884', 47957, 0, 1, 1, NULL, NULL),
(42, 87, '0937676883', 44608, 0, 1, 1, NULL, NULL),
(43, 88, '0937676888', 36469, 0, 1, 1, NULL, NULL),
(44, 89, '0937676880', 66428, 0, 1, 1, NULL, NULL),
(45, 91, '0937676886', 84344, 0, 1, 1, NULL, NULL),
(46, 92, '0937676881', 57185, 0, 1, 1, NULL, NULL),
(47, 93, '0937676885', 45656, 0, 1, 1, NULL, NULL),
(48, 95, '0937676883', 67668, 0, 1, 1, NULL, NULL),
(49, 96, '<string>', 64740, 0, 1, 1, NULL, NULL),
(50, 97, '123456', 15226, 0, 1, 1, NULL, NULL),
(51, 98, '+970598011301', 67753, 0, 1, 1, NULL, NULL),
(52, 99, '+970598011301', 98269, 0, 1, 1, NULL, NULL),
(53, 100, '123456789', 23540, 0, 1, 1, NULL, NULL),
(54, 101, '+970598011301', 83862, 0, 1, 1, NULL, NULL),
(55, 102, '123456789', 73220, 0, 1, 1, NULL, NULL),
(56, 103, '+970598011301', 82937, 0, 1, 1, NULL, NULL),
(57, 104, '+970598011301', 14410, 0, 1, 1, NULL, NULL),
(58, 105, '+972598011301', 49253, 0, 1, 1, NULL, NULL),
(59, 106, '+970598011301', 98083, 0, 1, 1, NULL, NULL),
(60, 107, '+972598011301', 21467, 0, 1, 1, NULL, NULL),
(61, 108, '+972598011301', 53280, 0, 1, 1, NULL, NULL),
(62, 109, '+970598011301', 69834, 0, 1, 1, NULL, NULL),
(63, 110, '+970598111111', 15797, 0, 1, 1, NULL, NULL),
(64, 111, '+970598111111', 10518, 0, 1, 1, NULL, NULL),
(65, 112, '09376768878', 53837, 0, 1, 1, NULL, NULL),
(66, 124, '1233', 69306, 0, 1, 1, NULL, NULL),
(67, 126, '0937676885', 98760, 0, 1, 1, NULL, NULL),
(68, 128, '0937676123', 53516, 0, 1, 1, NULL, NULL),
(69, 135, '+970598111117', 17453, 0, 1, 1, NULL, NULL),
(70, 136, '123123123', 97122, 0, 1, 1, NULL, NULL),
(71, 137, '000000001', 99236, 0, 1, 1, NULL, NULL),
(72, 138, '000000001', 61909, 0, 1, 1, NULL, NULL),
(73, 139, '+966000000001', 90933, 0, 1, 1, NULL, NULL),
(74, 140, '+966000000001', 53178, 0, 1, 1, NULL, NULL),
(75, 141, '+966000000002', 66797, 0, 1, 1, NULL, NULL),
(76, 142, '+966000000003', 67292, 0, 1, 1, NULL, NULL),
(77, 143, '0937676883', 22561, 0, 1, 1, NULL, NULL),
(78, 144, '0937676883', 22986, 0, 1, 1, NULL, NULL),
(79, 145, '0937676883', 94770, 0, 1, 1, NULL, NULL),
(80, 146, '0937676883', 53723, 0, 1, 1, NULL, NULL),
(81, 147, '0937676883', 70146, 0, 1, 1, NULL, NULL),
(82, 148, '+970598111112', 44079, 0, 1, 1, NULL, NULL),
(83, 149, '+97059111112', 22511, 0, 1, 1, NULL, NULL),
(84, 150, '+970598111112', 94468, 0, 1, 1, NULL, NULL),
(85, 151, '123123123123', 66984, 0, 1, 1, NULL, NULL),
(86, 152, '1231231231231', 72529, 0, 1, 1, NULL, NULL),
(87, 153, '123123123123', 86145, 0, 1, 1, NULL, NULL),
(88, 154, 'string', 25471, 0, 1, 1, NULL, NULL),
(89, 155, '123123123123', 28734, 0, 1, 1, NULL, NULL),
(90, 156, '1231231231231', 83634, 0, 1, 1, NULL, NULL),
(91, 157, 'string', 62628, 0, 1, 1, NULL, NULL),
(92, 158, '123456', 71516, 0, 1, 1, NULL, NULL),
(93, 159, '0937676881', 24268, 0, 1, 1, NULL, NULL),
(94, 160, '12345', 65992, 0, 1, 1, NULL, NULL),
(95, 162, '0937676881', 80003, 0, 1, 1, NULL, NULL),
(96, 165, '0937676883', 56788, 0, 1, 1, NULL, NULL),
(97, 166, '0937676884', 96638, 0, 1, 1, NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `view_providers`
--

CREATE TABLE `view_providers` (
  `id` int(11) NOT NULL,
  `service_provider_id` int(11) DEFAULT NULL,
  `service_order_id` int(11) DEFAULT NULL,
  `view_acount` int(11) DEFAULT 0,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `about_app`
--
ALTER TABLE `about_app`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `admins`
--
ALTER TABLE `admins`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `admin_mobile_email`
--
ALTER TABLE `admin_mobile_email`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `advertisements`
--
ALTER TABLE `advertisements`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `app_info`
--
ALTER TABLE `app_info`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `bouquets`
--
ALTER TABLE `bouquets`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `categories`
--
ALTER TABLE `categories`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `cities`
--
ALTER TABLE `cities`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `conditions`
--
ALTER TABLE `conditions`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `countries`
--
ALTER TABLE `countries`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `images`
--
ALTER TABLE `images`
  ADD PRIMARY KEY (`id`),
  ADD KEY `product_id` (`product_id`),
  ADD KEY `service_id` (`service_id`),
  ADD KEY `mentenance_provider_id` (`mentenance_provider_id`);

--
-- Indexes for table `jobs`
--
ALTER TABLE `jobs`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `jobs_types`
--
ALTER TABLE `jobs_types`
  ADD PRIMARY KEY (`id`),
  ADD KEY `service_id` (`service_id`);

--
-- Indexes for table `likes`
--
ALTER TABLE `likes`
  ADD PRIMARY KEY (`id`),
  ADD KEY `mentenance_id` (`mentenance_id`),
  ADD KEY `service_id` (`service_id`),
  ADD KEY `service_order_id` (`service_order_id`),
  ADD KEY `service_provider_id` (`service_provider_id`);

--
-- Indexes for table `mentenace_category`
--
ALTER TABLE `mentenace_category`
  ADD PRIMARY KEY (`id`),
  ADD KEY `category_id` (`category_id`),
  ADD KEY `mentenace_id` (`mentenace_id`);

--
-- Indexes for table `mentenace_notifications`
--
ALTER TABLE `mentenace_notifications`
  ADD PRIMARY KEY (`id`),
  ADD KEY `user_id` (`user_id`),
  ADD KEY `mentenance_id` (`mentenance_id`);

--
-- Indexes for table `mentenance_providers`
--
ALTER TABLE `mentenance_providers`
  ADD PRIMARY KEY (`id`),
  ADD KEY `user_id` (`user_id`);

--
-- Indexes for table `mentenance_provider_city`
--
ALTER TABLE `mentenance_provider_city`
  ADD PRIMARY KEY (`id`),
  ADD KEY `mentenance_id` (`mentenance_id`),
  ADD KEY `city_id` (`city_id`);

--
-- Indexes for table `notifications`
--
ALTER TABLE `notifications`
  ADD PRIMARY KEY (`id`),
  ADD KEY `admin_id` (`admin_id`),
  ADD KEY `author_id` (`author_id`),
  ADD KEY `user_id` (`user_id`),
  ADD KEY `data_id` (`data_id`);

--
-- Indexes for table `preferred_contact_media`
--
ALTER TABLE `preferred_contact_media`
  ADD PRIMARY KEY (`id`),
  ADD KEY `user_id` (`user_id`);

--
-- Indexes for table `preferred_contact_media_agent`
--
ALTER TABLE `preferred_contact_media_agent`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `products`
--
ALTER TABLE `products`
  ADD PRIMARY KEY (`id`),
  ADD KEY `user_id` (`user_id`);

--
-- Indexes for table `ratings`
--
ALTER TABLE `ratings`
  ADD PRIMARY KEY (`id`),
  ADD KEY `mentenance_id` (`mentenance_id`),
  ADD KEY `service_id` (`service_id`),
  ADD KEY `service_order_id` (`service_order_id`),
  ADD KEY `service_provider_id` (`service_provider_id`);

--
-- Indexes for table `sections`
--
ALTER TABLE `sections`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `section_admin`
--
ALTER TABLE `section_admin`
  ADD PRIMARY KEY (`id`),
  ADD KEY `user_id` (`user_id`),
  ADD KEY `section_id` (`section_id`);

--
-- Indexes for table `services`
--
ALTER TABLE `services`
  ADD PRIMARY KEY (`id`),
  ADD KEY `user_id` (`user_id`);

--
-- Indexes for table `service_city`
--
ALTER TABLE `service_city`
  ADD PRIMARY KEY (`id`),
  ADD KEY `city_id` (`city_id`),
  ADD KEY `service_id` (`service_id`);

--
-- Indexes for table `service_provider_profile`
--
ALTER TABLE `service_provider_profile`
  ADD PRIMARY KEY (`id`),
  ADD KEY `user_id` (`user_id`);

--
-- Indexes for table `subscriptions`
--
ALTER TABLE `subscriptions`
  ADD PRIMARY KEY (`id`),
  ADD KEY `bouquet_id` (`bouquet_id`),
  ADD KEY `user_id` (`user_id`);

--
-- Indexes for table `technical_user`
--
ALTER TABLE `technical_user`
  ADD PRIMARY KEY (`id`),
  ADD KEY `maintenance_id` (`maintenance_id`),
  ADD KEY `city_id` (`city_id`),
  ADD KEY `user_id` (`user_id`);

--
-- Indexes for table `type_works`
--
ALTER TABLE `type_works`
  ADD KEY `service_id` (`service_id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `user_city`
--
ALTER TABLE `user_city`
  ADD PRIMARY KEY (`id`),
  ADD KEY `city_id` (`city_id`),
  ADD KEY `user_id` (`user_id`);

--
-- Indexes for table `user_mobile_email`
--
ALTER TABLE `user_mobile_email`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `view_providers`
--
ALTER TABLE `view_providers`
  ADD PRIMARY KEY (`id`),
  ADD KEY `service_order_id` (`service_order_id`),
  ADD KEY `service_provider_id` (`service_provider_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `admins`
--
ALTER TABLE `admins`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `advertisements`
--
ALTER TABLE `advertisements`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `app_info`
--
ALTER TABLE `app_info`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `bouquets`
--
ALTER TABLE `bouquets`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `categories`
--
ALTER TABLE `categories`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `cities`
--
ALTER TABLE `cities`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `conditions`
--
ALTER TABLE `conditions`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `countries`
--
ALTER TABLE `countries`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `images`
--
ALTER TABLE `images`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=131;

--
-- AUTO_INCREMENT for table `jobs`
--
ALTER TABLE `jobs`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `jobs_types`
--
ALTER TABLE `jobs_types`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=36;

--
-- AUTO_INCREMENT for table `likes`
--
ALTER TABLE `likes`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT for table `mentenace_category`
--
ALTER TABLE `mentenace_category`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `mentenace_notifications`
--
ALTER TABLE `mentenace_notifications`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `mentenance_providers`
--
ALTER TABLE `mentenance_providers`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

--
-- AUTO_INCREMENT for table `mentenance_provider_city`
--
ALTER TABLE `mentenance_provider_city`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `notifications`
--
ALTER TABLE `notifications`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `preferred_contact_media`
--
ALTER TABLE `preferred_contact_media`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=65;

--
-- AUTO_INCREMENT for table `preferred_contact_media_agent`
--
ALTER TABLE `preferred_contact_media_agent`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `products`
--
ALTER TABLE `products`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=21;

--
-- AUTO_INCREMENT for table `ratings`
--
ALTER TABLE `ratings`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `sections`
--
ALTER TABLE `sections`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=41;

--
-- AUTO_INCREMENT for table `section_admin`
--
ALTER TABLE `section_admin`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=36;

--
-- AUTO_INCREMENT for table `services`
--
ALTER TABLE `services`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `service_city`
--
ALTER TABLE `service_city`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=21;

--
-- AUTO_INCREMENT for table `service_provider_profile`
--
ALTER TABLE `service_provider_profile`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=80;

--
-- AUTO_INCREMENT for table `subscriptions`
--
ALTER TABLE `subscriptions`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `technical_user`
--
ALTER TABLE `technical_user`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=167;

--
-- AUTO_INCREMENT for table `user_city`
--
ALTER TABLE `user_city`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=29;

--
-- AUTO_INCREMENT for table `user_mobile_email`
--
ALTER TABLE `user_mobile_email`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=98;

--
-- AUTO_INCREMENT for table `view_providers`
--
ALTER TABLE `view_providers`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `images`
--
ALTER TABLE `images`
  ADD CONSTRAINT `images_ibfk_1` FOREIGN KEY (`product_id`) REFERENCES `products` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `images_ibfk_2` FOREIGN KEY (`service_id`) REFERENCES `services` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `images_ibfk_3` FOREIGN KEY (`mentenance_provider_id`) REFERENCES `mentenance_providers` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `jobs_types`
--
ALTER TABLE `jobs_types`
  ADD CONSTRAINT `jobs_types_ibfk_1` FOREIGN KEY (`service_id`) REFERENCES `services` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `likes`
--
ALTER TABLE `likes`
  ADD CONSTRAINT `likes_ibfk_1` FOREIGN KEY (`mentenance_id`) REFERENCES `mentenance_providers` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `likes_ibfk_2` FOREIGN KEY (`service_id`) REFERENCES `services` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `likes_ibfk_3` FOREIGN KEY (`service_order_id`) REFERENCES `users` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `likes_ibfk_4` FOREIGN KEY (`service_provider_id`) REFERENCES `users` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `mentenace_category`
--
ALTER TABLE `mentenace_category`
  ADD CONSTRAINT `mentenace_category_ibfk_1` FOREIGN KEY (`category_id`) REFERENCES `categories` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `mentenace_category_ibfk_2` FOREIGN KEY (`mentenace_id`) REFERENCES `mentenance_providers` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `mentenace_notifications`
--
ALTER TABLE `mentenace_notifications`
  ADD CONSTRAINT `mentenace_notifications_ibfk_1` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `mentenace_notifications_ibfk_2` FOREIGN KEY (`mentenance_id`) REFERENCES `mentenance_providers` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `mentenance_providers`
--
ALTER TABLE `mentenance_providers`
  ADD CONSTRAINT `mentenance_providers_ibfk_1` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `mentenance_provider_city`
--
ALTER TABLE `mentenance_provider_city`
  ADD CONSTRAINT `mentenance_provider_city_ibfk_1` FOREIGN KEY (`mentenance_id`) REFERENCES `mentenance_providers` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `mentenance_provider_city_ibfk_2` FOREIGN KEY (`city_id`) REFERENCES `cities` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `notifications`
--
ALTER TABLE `notifications`
  ADD CONSTRAINT `notifications_ibfk_1` FOREIGN KEY (`admin_id`) REFERENCES `admins` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `notifications_ibfk_2` FOREIGN KEY (`author_id`) REFERENCES `users` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `notifications_ibfk_3` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `notifications_ibfk_4` FOREIGN KEY (`data_id`) REFERENCES `mentenance_providers` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `notifications_ibfk_5` FOREIGN KEY (`data_id`) REFERENCES `users` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `preferred_contact_media`
--
ALTER TABLE `preferred_contact_media`
  ADD CONSTRAINT `preferred_contact_media_ibfk_1` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `products`
--
ALTER TABLE `products`
  ADD CONSTRAINT `products_ibfk_1` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `ratings`
--
ALTER TABLE `ratings`
  ADD CONSTRAINT `ratings_ibfk_1` FOREIGN KEY (`mentenance_id`) REFERENCES `mentenance_providers` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `ratings_ibfk_2` FOREIGN KEY (`service_id`) REFERENCES `services` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `ratings_ibfk_3` FOREIGN KEY (`service_order_id`) REFERENCES `users` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `ratings_ibfk_4` FOREIGN KEY (`service_provider_id`) REFERENCES `users` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `section_admin`
--
ALTER TABLE `section_admin`
  ADD CONSTRAINT `section_admin_ibfk_1` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `section_admin_ibfk_2` FOREIGN KEY (`section_id`) REFERENCES `sections` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `services`
--
ALTER TABLE `services`
  ADD CONSTRAINT `services_ibfk_1` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `service_city`
--
ALTER TABLE `service_city`
  ADD CONSTRAINT `service_city_ibfk_1` FOREIGN KEY (`city_id`) REFERENCES `cities` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `service_city_ibfk_2` FOREIGN KEY (`service_id`) REFERENCES `services` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `service_provider_profile`
--
ALTER TABLE `service_provider_profile`
  ADD CONSTRAINT `service_provider_profile_ibfk_1` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `subscriptions`
--
ALTER TABLE `subscriptions`
  ADD CONSTRAINT `subscriptions_ibfk_1` FOREIGN KEY (`bouquet_id`) REFERENCES `bouquets` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `subscriptions_ibfk_2` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `technical_user`
--
ALTER TABLE `technical_user`
  ADD CONSTRAINT `technical_user_ibfk_1` FOREIGN KEY (`maintenance_id`) REFERENCES `mentenance_providers` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `technical_user_ibfk_2` FOREIGN KEY (`city_id`) REFERENCES `cities` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `technical_user_ibfk_3` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `type_works`
--
ALTER TABLE `type_works`
  ADD CONSTRAINT `type_works_ibfk_1` FOREIGN KEY (`service_id`) REFERENCES `services` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `user_city`
--
ALTER TABLE `user_city`
  ADD CONSTRAINT `user_city_ibfk_1` FOREIGN KEY (`city_id`) REFERENCES `cities` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `user_city_ibfk_2` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `view_providers`
--
ALTER TABLE `view_providers`
  ADD CONSTRAINT `view_providers_ibfk_1` FOREIGN KEY (`service_order_id`) REFERENCES `users` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `view_providers_ibfk_2` FOREIGN KEY (`service_provider_id`) REFERENCES `users` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
