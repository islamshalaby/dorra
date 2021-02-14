-- phpMyAdmin SQL Dump
-- version 4.9.4
-- https://www.phpmyadmin.net/
--
-- Host: localhost
-- Generation Time: Mar 05, 2020 at 06:18 PM
-- Server version: 5.7.29-0ubuntu0.18.04.1
-- PHP Version: 7.4.3

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `aldora`
--

-- --------------------------------------------------------

--
-- Table structure for table `account_numbers`
--

CREATE TABLE `account_numbers` (
  `id` int(11) NOT NULL,
  `account_name` varchar(255) NOT NULL,
  `account_type` varchar(255) DEFAULT NULL,
  `account_number` varchar(255) NOT NULL,
  `iban` varchar(255) DEFAULT NULL,
  `bank_id` int(11) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `account_numbers`
--

INSERT INTO `account_numbers` (`id`, `account_name`, `account_type`, `account_number`, `iban`, `bank_id`, `created_at`, `updated_at`) VALUES
(1, 'افطار صائم', 'حساب جاري', '54545487554787', '545748956448594', 1, NULL, NULL),
(3, 'إفطار صائم2', 'حساب جاري2', '548755545892222', '899787541122', 2, NULL, '2020-03-01 19:04:56');

-- --------------------------------------------------------

--
-- Table structure for table `admins`
--

CREATE TABLE `admins` (
  `id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` timestamp NULL DEFAULT NULL,
  `password` varchar(255) NOT NULL,
  `add_data` tinyint(1) NOT NULL DEFAULT '0',
  `update_data` tinyint(1) NOT NULL DEFAULT '0',
  `delete_data` tinyint(1) NOT NULL DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=ucs2;

--
-- Dumping data for table `admins`
--

INSERT INTO `admins` (`id`, `name`, `email`, `created_at`, `updated_at`, `password`, `add_data`, `update_data`, `delete_data`) VALUES
(1, 'Super Admin', 'admin@admin.com', '2020-02-19 08:44:50', '2020-02-24 14:06:28', '$2y$10$IQ8M6C.879gvIw54Y08.N.D5ATolN9AktgFXBvAlTBxXE5PzRmd5G', 1, 1, 1),
(13, 'Mohamed Behiery', 'mohamed@admin.com', '2020-03-02 14:59:02', '2020-03-02 15:39:28', '$2y$10$qJFeaW1O5cp8bIQMNilCf.P0Wex7z5//4Y/5cvtlvEdkD/N.8Nyp2', 1, 1, 1);

-- --------------------------------------------------------

--
-- Table structure for table `admin_permissions`
--

CREATE TABLE `admin_permissions` (
  `id` int(11) NOT NULL,
  `admin_id` int(11) NOT NULL,
  `permission_id` int(11) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=ucs2;

--
-- Dumping data for table `admin_permissions`
--

INSERT INTO `admin_permissions` (`id`, `admin_id`, `permission_id`, `created_at`, `updated_at`) VALUES
(222, 1, 1, '2020-03-02 13:46:21', '2020-03-02 13:46:21'),
(223, 1, 2, '2020-03-02 13:46:37', '2020-03-02 13:46:37'),
(224, 1, 3, '2020-03-02 13:46:52', '2020-03-02 13:46:52'),
(225, 1, 4, '2020-03-02 13:47:07', '2020-03-02 13:47:07'),
(226, 1, 6, '2020-03-02 13:47:19', '2020-03-02 13:47:19'),
(227, 1, 7, '2020-03-02 13:47:34', '2020-03-02 13:47:34'),
(228, 1, 8, '2020-03-02 13:47:47', '2020-03-02 13:47:47'),
(229, 1, 9, '2020-03-02 13:48:00', '2020-03-02 13:48:00'),
(230, 1, 10, '2020-03-02 13:48:14', '2020-03-02 13:48:14'),
(231, 1, 11, '2020-03-02 13:48:27', '2020-03-02 13:48:27'),
(232, 1, 12, '2020-03-02 13:48:43', '2020-03-02 13:48:43'),
(233, 1, 13, '2020-03-02 13:49:00', '2020-03-02 13:49:00'),
(234, 1, 14, '2020-03-02 13:49:26', '2020-03-02 13:49:26'),
(235, 1, 15, '2020-03-02 13:49:44', '2020-03-02 13:49:44'),
(236, 1, 16, '2020-03-02 13:49:59', '2020-03-02 13:49:59'),
(237, 1, 17, '2020-03-02 13:50:11', '2020-03-02 13:50:11'),
(238, 1, 18, '2020-03-02 13:50:32', '2020-03-02 13:50:32'),
(269, 13, 1, '2020-03-02 15:39:28', '2020-03-02 15:39:28'),
(270, 13, 2, '2020-03-02 15:39:28', '2020-03-02 15:39:28'),
(271, 13, 3, '2020-03-02 15:39:28', '2020-03-02 15:39:28'),
(272, 13, 4, '2020-03-02 15:39:28', '2020-03-02 15:39:28'),
(273, 13, 6, '2020-03-02 15:39:28', '2020-03-02 15:39:28'),
(274, 13, 7, '2020-03-02 15:39:28', '2020-03-02 15:39:28'),
(275, 13, 8, '2020-03-02 15:39:28', '2020-03-02 15:39:28'),
(276, 13, 9, '2020-03-02 15:39:28', '2020-03-02 15:39:28'),
(277, 13, 10, '2020-03-02 15:39:28', '2020-03-02 15:39:28'),
(278, 13, 11, '2020-03-02 15:39:28', '2020-03-02 15:39:28'),
(279, 13, 12, '2020-03-02 15:39:28', '2020-03-02 15:39:28'),
(280, 13, 13, '2020-03-02 15:39:28', '2020-03-02 15:39:28'),
(281, 13, 14, '2020-03-02 15:39:28', '2020-03-02 15:39:28'),
(282, 13, 15, '2020-03-02 15:39:28', '2020-03-02 15:39:28'),
(283, 13, 16, '2020-03-02 15:39:28', '2020-03-02 15:39:28'),
(284, 13, 17, '2020-03-02 15:39:28', '2020-03-02 15:39:28'),
(285, 13, 18, '2020-03-02 15:39:28', '2020-03-02 15:39:28');

-- --------------------------------------------------------

--
-- Table structure for table `ads`
--

CREATE TABLE `ads` (
  `id` int(10) UNSIGNED NOT NULL,
  `image` varchar(300) COLLATE utf8mb4_unicode_ci NOT NULL,
  `type` varchar(20) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `content` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `place` int(11) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `ads`
--

INSERT INTO `ads` (`id`, `image`, `type`, `content`, `place`, `created_at`, `updated_at`) VALUES
(5, 'gpbwvxpthzzih818k7qw.jpg', 'outside', 'google21.com', NULL, '2020-02-27 08:30:30', '2020-02-27 08:41:08');

-- --------------------------------------------------------

--
-- Table structure for table `banks`
--

CREATE TABLE `banks` (
  `id` int(11) NOT NULL,
  `bank_name` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `banks`
--

INSERT INTO `banks` (`id`, `bank_name`, `created_at`, `updated_at`) VALUES
(1, 'البنك الاهلي', NULL, NULL),
(2, 'بنك البلاد', NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `categories`
--

CREATE TABLE `categories` (
  `id` int(10) UNSIGNED NOT NULL,
  `image` varchar(300) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `title_en` varchar(200) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `title_ar` varchar(200) COLLATE utf8mb4_unicode_ci NOT NULL,
  `deleted` tinyint(1) NOT NULL DEFAULT '0',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `categories`
--

INSERT INTO `categories` (`id`, `image`, `title_en`, `title_ar`, `deleted`, `created_at`, `updated_at`) VALUES
(1, 'wsykvrlka88nrebnrtw1.jpg', 'category en', 'category ar', 0, NULL, NULL),
(2, 'plhpqidf3yokaoejyuri.jpg', 'test title22', 'arabic title3', 0, '2020-02-17 10:22:19', '2020-02-17 10:41:16'),
(3, 'f9o8glxaipqpcgoyfmnn.jpg', 'nnnn', 'nnnn', 1, '2020-02-18 12:34:41', '2020-02-26 16:00:11'),
(4, NULL, NULL, 'قسم عربي ٢', 1, '2020-02-27 12:28:01', '2020-02-27 12:28:15');

-- --------------------------------------------------------

--
-- Table structure for table `contact_us`
--

CREATE TABLE `contact_us` (
  `id` int(10) UNSIGNED NOT NULL,
  `phone` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL,
  `message` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `seen` tinyint(1) NOT NULL DEFAULT '0',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `contact_us`
--

INSERT INTO `contact_us` (`id`, `phone`, `message`, `seen`, `created_at`, `updated_at`) VALUES
(1, '+201090751347', 'test body message', 0, '2020-02-17 12:59:08', '2020-02-26 13:11:50');

-- --------------------------------------------------------

--
-- Table structure for table `counts`
--

CREATE TABLE `counts` (
  `id` int(11) NOT NULL,
  `user` int(11) NOT NULL,
  `service` int(11) NOT NULL,
  `family` int(11) NOT NULL,
  `initiative` int(11) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `counts`
--

INSERT INTO `counts` (`id`, `user`, `service`, `family`, `initiative`, `created_at`, `updated_at`) VALUES
(1, 12, 12, 12, 11, '2020-02-27 16:06:11', '2020-03-01 11:38:13');

-- --------------------------------------------------------

--
-- Table structure for table `donations`
--

CREATE TABLE `donations` (
  `id` int(11) NOT NULL,
  `description` text NOT NULL,
  `latitude` varchar(150) NOT NULL,
  `longitude` varchar(150) NOT NULL,
  `address` text NOT NULL,
  `name` varchar(255) NOT NULL,
  `phone` varchar(40) NOT NULL,
  `user_id` int(11) NOT NULL,
  `seen` tinyint(1) NOT NULL DEFAULT '0',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `donations`
--

INSERT INTO `donations` (`id`, `description`, `latitude`, `longitude`, `address`, `name`, `phone`, `user_id`, `seen`, `created_at`, `updated_at`) VALUES
(1, 'afsas', '29.9', '31.3', 'jsqahdjhda', 'name', '+2010954454', 1, 1, '2020-03-02 13:05:18', '2020-03-02 14:06:19'),
(2, 'لبس شتوي', '29.9', '31.3', 'albait', 'Mohamed Behiery', '+2015545454', 21, 0, '2020-03-03 21:04:23', '2020-03-03 21:04:23'),
(3, 'لبس شتوي', '29.9', '31.3', 'albait', 'Mohamed Behiery', '+2015545454', 21, 1, '2020-03-03 21:15:10', '2020-03-04 09:41:04'),
(4, 'لبس شتوي', '29.9', '31.3', 'albait', 'Mohamed Behiery', '+2015545454', 21, 0, '2020-03-03 21:15:29', '2020-03-03 21:15:29'),
(5, 'لبس شتوي', '29.9', '31.3', 'albait', 'Mohamed Behiery', '+2015545454', 21, 1, '2020-03-03 21:26:33', '2020-03-04 10:14:32'),
(6, 'لبس شتوي', '29.9', '31.3', 'albait', 'Mohamed Behiery', '+2015545454', 21, 0, '2020-03-03 21:40:53', '2020-03-03 21:40:53'),
(7, 'لبس شتوي', '29.9', '31.3', 'albait', 'Mohamed Behiery', '+2015545454', 21, 0, '2020-03-03 21:44:05', '2020-03-03 21:44:05'),
(8, 'لبس شتوي', '29.9', '31.3', 'albait', 'Mohamed Behiery', '+2015545454', 21, 1, '2020-03-03 21:44:19', '2020-03-04 09:25:00');

-- --------------------------------------------------------

--
-- Table structure for table `donation_categories`
--

CREATE TABLE `donation_categories` (
  `id` int(11) NOT NULL,
  `donation_id` int(11) NOT NULL,
  `category_id` int(11) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `donation_categories`
--

INSERT INTO `donation_categories` (`id`, `donation_id`, `category_id`, `created_at`, `updated_at`) VALUES
(5, 5, 4, '2020-03-03 21:26:33', '2020-03-03 21:26:33'),
(6, 5, 4, '2020-03-03 21:26:33', '2020-03-03 21:26:33'),
(7, 6, 4, '2020-03-03 21:40:53', '2020-03-03 21:40:53'),
(8, 6, 4, '2020-03-03 21:40:53', '2020-03-03 21:40:53'),
(9, 7, 4, '2020-03-03 21:44:05', '2020-03-03 21:44:05'),
(10, 7, 4, '2020-03-03 21:44:05', '2020-03-03 21:44:05'),
(11, 8, 4, '2020-03-03 21:44:19', '2020-03-03 21:44:19'),
(12, 8, 4, '2020-03-03 21:44:19', '2020-03-03 21:44:19');

-- --------------------------------------------------------

--
-- Table structure for table `donation_images`
--

CREATE TABLE `donation_images` (
  `id` int(11) NOT NULL,
  `image` varchar(255) NOT NULL,
  `donation_id` int(11) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `donation_images`
--

INSERT INTO `donation_images` (`id`, `image`, `donation_id`, `created_at`, `updated_at`) VALUES
(1, 'gltuuritekhekuswdug6.png', 8, '2020-03-03 21:44:12', '2020-03-03 21:44:12'),
(2, 't04rzkgrf0xjbjexbjvv.png', 8, '2020-03-03 21:44:21', '2020-03-03 21:44:21');

-- --------------------------------------------------------

--
-- Table structure for table `failed_jobs`
--

CREATE TABLE `failed_jobs` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `connection` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `queue` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `payload` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `exception` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `failed_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `meta_tags`
--

CREATE TABLE `meta_tags` (
  `id` int(11) NOT NULL,
  `home_meta_en` text,
  `home_meta_ar` text,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=ucs2;

--
-- Dumping data for table `meta_tags`
--

INSERT INTO `meta_tags` (`id`, `home_meta_en`, `home_meta_ar`, `created_at`, `updated_at`) VALUES
(1, 'test meta tag english22', 'ميتا تاج عربي1', '2020-02-18 12:45:58', '2020-02-18 10:46:21');

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
(216, '2014_10_12_000000_create_users_table', 1),
(217, '2014_10_12_100000_create_password_resets_table', 1),
(218, '2019_08_19_000000_create_failed_jobs_table', 1),
(219, '2020_01_22_160948_create_ads_table', 1),
(220, '2020_01_23_102549_create_categories_table', 1),
(221, '2020_01_23_114523_create_settings_table', 1),
(222, '2020_01_23_122840_create_contact_us_table', 1),
(223, '2020_01_27_153233_create_doctors_lawyers_table', 1),
(224, '2020_01_28_090727_create_favorites_table', 1),
(225, '2020_01_28_120020_create_rates_table', 1),
(226, '2020_01_28_121824_create_reservations_table', 1),
(227, '2020_01_29_121840_create_services_table', 1),
(228, '2020_01_29_122258_create_doctor_lawyer_services_table', 1),
(229, '2020_01_29_122545_create_place_images_table', 1),
(230, '2020_01_29_123248_create_holidays_table', 1),
(231, '2020_01_29_124130_create_times_of_works_table', 1);

-- --------------------------------------------------------

--
-- Table structure for table `news`
--

CREATE TABLE `news` (
  `id` int(11) NOT NULL,
  `image` varchar(250) NOT NULL,
  `title` varchar(350) NOT NULL,
  `small_description` varchar(300) NOT NULL,
  `description` text NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `news`
--

INSERT INTO `news` (`id`, `image`, `title`, `small_description`, `description`, `created_at`, `updated_at`) VALUES
(1, 'zlhep0e8tuiypn5cj0qw.jpg', 'test', 'test', 'test', '2020-02-27 13:19:33', '2020-02-27 13:19:33'),
(3, 'zlhep0e8tuiypn5cj0qw.jpg', 'test title will be here', 'test', 'test', '2020-02-27 15:45:45', '2020-02-27 15:45:45'),
(4, 'efqof1m1hkyorej950l1.jpg', 'sfddsf edit2', 'test small', 'desctest', '2020-02-27 15:46:12', '2020-02-27 15:56:33');

-- --------------------------------------------------------

--
-- Table structure for table `notifications`
--

CREATE TABLE `notifications` (
  `id` int(11) NOT NULL,
  `title` varchar(255) NOT NULL,
  `body` text NOT NULL,
  `image` varchar(255) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=ucs2;

--
-- Dumping data for table `notifications`
--

INSERT INTO `notifications` (`id`, `title`, `body`, `image`, `created_at`, `updated_at`) VALUES
(1, 'Notification Title', 'Notification Boooody', 'plhpqidf3yokaoejyuri.jpg', '2020-02-17 14:38:50', '2020-02-17 14:38:50'),
(5, 'fdssdf', 'dsffds', NULL, '2020-02-18 07:53:57', '2020-02-18 07:53:57'),
(6, 'fdssdf', 'dsffds', NULL, '2020-02-18 07:54:29', '2020-02-18 07:54:29'),
(7, 'fdssdf', 'dsffds', NULL, '2020-02-18 07:55:28', '2020-02-18 07:55:28'),
(8, 'dg', 'dg', NULL, '2020-02-18 07:56:19', '2020-02-18 07:56:19'),
(9, 'fdsafds', 'fdsfds', NULL, '2020-02-18 07:59:14', '2020-02-18 07:59:14'),
(10, 'testy', 'test body', NULL, '2020-02-18 08:04:13', '2020-02-18 08:04:13'),
(11, 'test', 'test', NULL, '2020-02-18 08:06:42', '2020-02-18 08:06:42'),
(12, 'test title', 'test body', NULL, '2020-02-18 08:20:55', '2020-02-18 08:20:55'),
(13, 'test title', 'test body', NULL, '2020-02-18 08:34:20', '2020-02-18 08:34:20'),
(14, 'test title', 'test body', NULL, '2020-02-18 08:35:09', '2020-02-18 08:35:09'),
(15, 'test title', 'test body', NULL, '2020-02-18 08:36:22', '2020-02-18 08:36:22'),
(16, 'test title', 'test body', NULL, '2020-02-18 08:36:54', '2020-02-18 08:36:54'),
(17, 'dsfds', 'dsfdsf', NULL, '2020-02-18 08:37:54', '2020-02-18 08:37:54'),
(18, 'dsfds', 'dsfdsf', NULL, '2020-02-18 08:38:16', '2020-02-18 08:38:16'),
(19, 'fdsfdsfds', 'fdsfdsfds', NULL, '2020-02-18 08:38:30', '2020-02-18 08:38:30'),
(20, 'fdsfdsfds', 'fdsfdsfds', NULL, '2020-02-18 08:54:51', '2020-02-18 08:54:51'),
(21, 'fdsfdsfds', 'fdsfdsfds', NULL, '2020-02-18 08:55:30', '2020-02-18 08:55:30'),
(22, 'fdsfdsfds', 'fdsfdsfds', NULL, '2020-02-18 08:56:04', '2020-02-18 08:56:04'),
(23, 'test', 'test', 'fq6jmy7et4peztea3l8b.jpg', '2020-02-18 09:00:34', '2020-02-18 09:00:34'),
(24, 'test15', 'test', 'ai3t1cmrm9u1rgvhaz0u.jpg', '2020-02-18 09:01:07', '2020-02-18 09:01:07'),
(25, 'عنوان التنبية', 'محتوي التبية', NULL, '2020-02-27 12:31:18', '2020-02-27 12:31:18'),
(26, 'test', 'tetstt body', NULL, '2020-03-04 12:07:42', '2020-03-04 12:07:42'),
(27, 'safafs', 'fasfasfasfsa', NULL, '2020-03-04 12:10:06', '2020-03-04 12:10:06'),
(28, 'safafs', 'fasfasfasfsa', NULL, '2020-03-04 12:11:04', '2020-03-04 12:11:04'),
(29, 'safafs', 'fasfasfasfsa', NULL, '2020-03-04 12:11:57', '2020-03-04 12:11:57'),
(30, 'safafs', 'fasfasfasfsa', NULL, '2020-03-04 12:12:24', '2020-03-04 12:12:24'),
(31, 'safafs', 'fasfasfasfsa', NULL, '2020-03-04 12:13:18', '2020-03-04 12:13:18'),
(32, 'safafs', 'fasfasfasfsa', NULL, '2020-03-04 12:15:46', '2020-03-04 12:15:46'),
(33, 'safafs', 'fasfasfasfsa', NULL, '2020-03-04 12:15:59', '2020-03-04 12:15:59'),
(34, 'teeest', 'tttttestst', NULL, '2020-03-04 12:19:54', '2020-03-04 12:19:54');

-- --------------------------------------------------------

--
-- Table structure for table `orders`
--

CREATE TABLE `orders` (
  `id` int(11) NOT NULL,
  `product_id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `phone` varchar(50) NOT NULL,
  `birth_date` date NOT NULL,
  `gender` tinyint(1) NOT NULL,
  `address` text NOT NULL,
  `latitude` varchar(150) NOT NULL,
  `longitude` varchar(150) NOT NULL,
  `social_status` int(11) NOT NULL,
  `family_count` int(11) NOT NULL,
  `salary` varchar(100) NOT NULL,
  `seen` tinyint(1) NOT NULL DEFAULT '0',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `orders`
--

INSERT INTO `orders` (`id`, `product_id`, `name`, `phone`, `birth_date`, `gender`, `address`, `latitude`, `longitude`, `social_status`, `family_count`, `salary`, `seen`, `created_at`, `updated_at`) VALUES
(1, 3, 'Mohamed', '+201090751347', '2020-03-01', 1, 'Nasr city', '29.9', '31.3', 3, 5, '1000', 1, '2020-03-01 18:24:54', '2020-03-02 14:08:23'),
(2, 5, 'Mohamed Behiery', '+201090751347', '2020-03-30', 0, 'Nasr City', '29.9', '31.3', 2, 5, '1000', 1, '2020-03-03 16:47:11', '2020-03-05 12:57:12'),
(3, 3, 'Mohamed Behiery', '+201090751347', '2020-03-30', 0, 'Nasr City', '29.9', '31.3', 2, 5, '1000', 1, '2020-03-03 16:48:09', '2020-03-05 12:35:17');

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
-- Table structure for table `permissions`
--

CREATE TABLE `permissions` (
  `id` int(11) NOT NULL,
  `permission_ar` varchar(255) NOT NULL,
  `permission_en` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=ucs2;

--
-- Dumping data for table `permissions`
--

INSERT INTO `permissions` (`id`, `permission_ar`, `permission_en`, `created_at`, `updated_at`) VALUES
(1, 'المستخدمين', 'Users', '2020-02-19 14:04:33', '2020-02-19 14:04:33'),
(2, 'الإعلانات', 'Ads', '2020-02-19 14:05:13', '2020-02-19 14:05:13'),
(3, 'الأقسام', 'Categories', '2020-02-19 14:06:10', '2020-02-19 14:06:10'),
(4, 'المنتجات', 'Products', '2020-02-19 14:06:44', '2020-02-19 14:06:44'),
(6, 'التبرعات', 'Donations', '2020-02-19 14:07:55', '2020-02-19 14:07:55'),
(7, 'الطلبات', 'Orders', '2020-02-19 14:08:34', '2020-02-19 14:08:34'),
(8, 'الخدمات الخيرية', 'Charitable Services', '2020-02-19 14:09:06', '2020-02-19 14:09:06'),
(9, 'الأخبار', 'News', '2020-02-19 14:09:59', '2020-02-19 14:09:59'),
(10, 'الأعداد', 'Counts', '2020-02-19 14:10:21', '2020-02-19 14:10:21'),
(11, 'البنوك', 'Banks', '2020-03-02 13:38:06', '2020-03-02 13:38:06'),
(12, 'أرقام الحسابات', 'Accounts Numbers', '2020-03-02 13:38:31', '2020-03-02 13:38:31'),
(13, 'التنبيهات', 'Notifications', '2020-03-02 13:39:11', '2020-03-02 13:39:11'),
(14, 'الإعدادات', 'Settings', '2020-03-02 13:39:59', '2020-03-02 13:39:59'),
(15, 'صفحات التطبيق', 'App Pages', '2020-03-02 13:40:34', '2020-03-02 13:40:34'),
(16, 'وسوم البحث', 'Meta Tags', '2020-03-02 13:41:19', '2020-03-02 13:41:19'),
(17, 'المديرين', 'Managers', '2020-03-02 13:42:01', '2020-03-02 13:42:01'),
(18, 'تنزيل النسخة الإحتياطية', 'Database Backup', '2020-03-02 13:42:30', '2020-03-02 13:42:30');

-- --------------------------------------------------------

--
-- Table structure for table `products`
--

CREATE TABLE `products` (
  `id` int(11) NOT NULL,
  `title` varchar(255) NOT NULL,
  `description` text NOT NULL,
  `category_id` int(11) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `products`
--

INSERT INTO `products` (`id`, `title`, `description`, `category_id`, `created_at`, `updated_at`) VALUES
(3, 'fds', 'sdf\r\nsfdfds', 1, '2020-03-01 13:36:04', '2020-03-01 13:36:04'),
(5, 'dsasaads', 'sasasasasa', 2, '2020-03-01 14:39:52', '2020-03-01 14:39:52');

-- --------------------------------------------------------

--
-- Table structure for table `product_images`
--

CREATE TABLE `product_images` (
  `id` int(11) NOT NULL,
  `image` varchar(255) NOT NULL,
  `product_id` int(11) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `product_images`
--

INSERT INTO `product_images` (`id`, `image`, `product_id`, `created_at`, `updated_at`) VALUES
(8, 'fn7jynedsstwyrowglxo.jpg', 5, '2020-03-01 14:40:09', '2020-03-01 14:40:09'),
(9, 'ppgwapzmw2svqr6upos3.jpg', 5, '2020-03-02 10:18:16', '2020-03-02 10:18:16');

-- --------------------------------------------------------

--
-- Table structure for table `services`
--

CREATE TABLE `services` (
  `id` int(11) NOT NULL,
  `image` varchar(255) NOT NULL,
  `title` varchar(255) NOT NULL,
  `small_description` varchar(255) NOT NULL,
  `description` text NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `services`
--

INSERT INTO `services` (`id`, `image`, `title`, `small_description`, `description`, `created_at`, `updated_at`) VALUES
(1, 'qdc29tajryt9wd9sjkfk.jpg', 'test', 'test', 'test', '2020-02-27 15:01:50', '2020-02-27 15:01:50'),
(3, 'qdc29tajryt9wd9sjkfk.jpg', 'عنوان الخدمة', 'وصف مصغر للخدمة سوف يظهر في الصفحة تايسلب', 'لوريم ايبسوم دولار سيت أميت ,كونسيكتيتور أدايبا يسكينج أليايت,سيت دو أيوسمود تيمبور أنكايديديونتيوت لابوري ات دولار ماجنا أليكيوا\r\n. يوت انيم أد مينيم فينايم,كيواس نوستريد أكسير سيتاشن يللأمكو لابورأس نيسي يت أليكيوب أكس أيا كوممودو كونسيكيوات .\r\nديواس أيوتي أريري دولار إن ريبريهينديرأيت فوليوبتاتي فيلايت أيسسي كايلليوم دولار أيو فيجايت نيولا باراياتيور. \r\nأيكسيبتيور ساينت أوككايكات كيوبايداتات نون بروايدينت ,سيونت ان كيولبا أكسير سيتاشن يللأمكو لابورأس نيسي يت أليكيوب أكس أيا كوممودو كونسيكيوات .\r\nديواس أيوتي أريري دولار إن ريبريهينديرأيت فوليوبتاتي فيلايت أيسسي كايلليوم دولار أيو فيجايت نيولا باراياتيور\r\n. أيكسيبتيور ساينت أوككايكات كيوبايداتات نون بروايدينت ,سيونت ان كيولبا كيو أوفيسيا ديسيريونتموليت انيم أيدي ايست لابوريوم', '2020-02-27 16:33:52', '2020-03-05 13:06:10');

-- --------------------------------------------------------

--
-- Table structure for table `settings`
--

CREATE TABLE `settings` (
  `id` int(10) UNSIGNED NOT NULL,
  `app_phone` varchar(30) COLLATE utf8mb4_unicode_ci NOT NULL,
  `termsandconditions_en` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `termsandconditions_ar` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `aboutapp_en` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `aboutapp_ar` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `app_name_en` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `app_name_ar` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `logo` varchar(350) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `phone` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `address_en` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `address_ar` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `facebook` text COLLATE utf8mb4_unicode_ci,
  `youtube` text COLLATE utf8mb4_unicode_ci,
  `twitter` text COLLATE utf8mb4_unicode_ci,
  `instegram` text COLLATE utf8mb4_unicode_ci,
  `map_url` text COLLATE utf8mb4_unicode_ci,
  `latitude` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `longitude` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `snap_chat` text COLLATE utf8mb4_unicode_ci,
  `association_establishment_ar` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `thevission_ar` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `themessage_ar` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `organizational_structure_ar` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `administration_board_members_ar` text COLLATE utf8mb4_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `settings`
--

INSERT INTO `settings` (`id`, `app_phone`, `termsandconditions_en`, `termsandconditions_ar`, `aboutapp_en`, `aboutapp_ar`, `created_at`, `updated_at`, `app_name_en`, `app_name_ar`, `logo`, `email`, `phone`, `address_en`, `address_ar`, `facebook`, `youtube`, `twitter`, `instegram`, `map_url`, `latitude`, `longitude`, `snap_chat`, `association_establishment_ar`, `thevission_ar`, `themessage_ar`, `organizational_structure_ar`, `administration_board_members_ar`) VALUES
(1, '+201090751347', 'test terms and \r\nconditions\r\n\r\n# dsdsadsa', 'الجمعية النسائية الخيرية ( دُرة ) بحفر الباطن، تأسست في 16 / 3 /1432 هـ\r\nومسجلة في وزارة العمل والتنمية الإجتماعية برقم 591، \r\nنكفل الأسر والأرامل والمهجورات وأسر السجناء وذوي الدخل المحدود', 'fdggfd\r\nfdggfdgfdgfd\r\ngfddgfgfd\r\n\r\n1. sfdfds\r\n2. fds\r\n\r\n\r\n* fdssfdfds\r\n* sfdfdsfds\r\n* \r\n* \r\n* sa\r\n* sa\r\n* sa\r\n* as\r\n* fdsfdsfds', 'معية النسائية الخيرية ( دُرة ) بحفر الباطن، تأسست في 16 / 3 /1432 هـ\r\nومسجلة في وزارة العمل والتنمية الإجتماعية برقم 591، \r\nنكفل الأسر والأرامل والمهجورات وأسر السجناء وذوي الدخل المحدود', '2020-02-05 09:15:45', '2020-03-03 13:35:41', 'Aldora App', 'تطبيق الدرة', 'qtvnv8ayj9lxmpsnw1hy.png', 'medandlaw@gmail.com', '+201090751347', 'Kuwait', 'كويت', 'facebook.com', 'youtube.com', 'twitter.com', 'instegram.com', 'https://www.google.com/maps/@30.0430715,31.4056989,16z', '30.0430715', '31.4056989', NULL, 'تعديل نشأه الجمعية', 'تعديل محتوي الرؤية', 'تعديل محتوي الرسالة', 'تعديل الهيكل التنظيمي', 'تعديل أعضاء مجلس الإداره');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(10) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `phone` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `phone_verified_at` timestamp NULL DEFAULT NULL,
  `password` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `fcm_token` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `gender` tinyint(1) DEFAULT NULL,
  `date_of_birth` date DEFAULT NULL,
  `verified` tinyint(1) NOT NULL DEFAULT '1',
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `active` tinyint(1) DEFAULT '1',
  `seen` tinyint(1) DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `name`, `phone`, `email`, `phone_verified_at`, `password`, `fcm_token`, `gender`, `date_of_birth`, `verified`, `remember_token`, `created_at`, `updated_at`, `active`, `seen`) VALUES
(1, 'mohamed', '+201090751344', 'mohamedbehie@gmail.com', NULL, '$2y$10$u669r76OihgqNPx5BFVjUO360NUS.elP.x0g3FFGqBiotkXKD62SO', 'test fcm token', 1, '2020-05-05', 1, NULL, '2020-02-06 06:20:35', '2020-02-06 06:43:06', 1, 0),
(2, 'mohamed', '+20109075134', 'mohamedbehie1@gmail.com', NULL, '$2y$10$0rMMj9DAGBFLAUlE1D4s2e9rK3iOcTibaTui2bkLMlhTJ4i0YAMkC', 'test', 1, '2020-05-05', 1, NULL, '2020-02-06 06:21:56', '2020-02-06 06:21:56', 1, 0),
(3, 'mohamed', '+20109075114', 'mohamedbehie12@gmail.com', NULL, '$2y$10$1Jd32sOBih10OHxgowMiMeBk94fz9YJSIPQ.KTP/zaqtOWTh450IO', 'test', 1, '2020-05-05', 1, NULL, '2020-02-06 06:25:17', '2020-02-06 06:25:17', 1, 0),
(4, 'mohamed', '+20109075124', 'mohamedbehie112@gmail.com', NULL, '$2y$10$gT9ttYsKKYW63N6mAqDYAeGpQLzlO1rvoLZtNl2R0BFmd6natiPIm', 'test', 1, '2020-05-05', 1, NULL, '2020-02-06 06:27:50', '2020-03-03 18:42:06', 0, 0),
(5, 'mohamed', '+20109075127', 'mohamedbehie3@gmail.com', NULL, '$2y$10$bYsDCR3kviyRrNKjmCHEIuYVLqWFNqBp9zweObW5Kl9SOcnqiDAMm', 'test', 1, '2020-05-05', 1, NULL, '2020-02-06 06:29:00', '2020-02-26 13:25:11', 1, 1),
(6, 'mohamed', '+20109075128', 'mohamedbehie34@gmail.com', NULL, '$2y$10$3DAJpqLnNqRuOMp2MGo/XuO4JTH1piGww3wFa51zdN.U6H77uar7K', 'test', 1, '2020-05-05', 1, NULL, '2020-02-06 06:33:01', '2020-02-06 06:33:01', 1, 0),
(7, 'mohamed', '+201090751285', 'mohamedbehie314@gmail.com', NULL, '$2y$10$dIfZeLaAmBpF/8lVM2tmMOvcf.AMfCFPolZCngQmeSkgJQPiE5a.a', 'test fcm token', 1, '2020-05-05', 1, NULL, '2020-02-06 06:48:15', '2020-02-26 13:25:20', 0, 1),
(8, 'mohamed', '+2010907512844', 'mohamedbehie3214@gmail.com', NULL, '$2y$10$XhCUw3BAMdI93Uf9ZkV5POQYBtA76rJV2Is4/CMTi9AQu9thv5buK', 'test', 1, '2020-05-05', 1, NULL, '2020-02-06 06:52:28', '2020-02-06 06:52:28', 1, 0),
(9, 'mohamed', '+2010907512644', 'mohamedbehie30114@gmail.com', NULL, '$2y$10$GMzin8X9RdygVlqnzdiUW.q5wwLWyeEu/bA5sXdFQxNQF1BFv3l/O', 'test fcm token', 1, '2020-05-05', 1, NULL, '2020-02-06 06:54:03', '2020-02-26 13:24:50', 1, 1),
(10, 'mohamed', '+2010807512644', 'mohamedbehie30614@gmail.com', NULL, '$2y$10$sjHsH28sTozrH6k9gVwq5eX2EYPMVWaTNaDoRYY1PL2FJFSrFnAKa', 'test fcm token', 1, '2020-05-05', 1, NULL, '2020-02-06 07:05:08', '2020-02-06 07:07:07', 1, 0),
(11, 'mohamed', '+20108075126414', 'mohamedbehie3064@gmail.com', NULL, '$2y$10$C3Cj9oGvQMzc4tyGgkZa9.4nsoTSVjt7bBvNl21f8d2BkBUwo2O8C', 'test', 0, '2020-05-05', 1, NULL, '2020-02-06 07:52:06', '2020-02-24 11:37:34', 0, 0),
(12, 'Test User', '+147258', 'email@emial.com', NULL, '$2y$10$nJqB.dNSnnhwBhvI9MiAEebblBAfZVUtfQ8PgNo2GoGoBzXafqs7O', NULL, 0, '2020-12-31', 1, NULL, '2020-02-13 09:03:17', '2020-02-13 09:03:17', 1, 0),
(13, '23Test User', '+201090751347', 'teest2@gmail.com', NULL, '$2y$10$SERY6ggCrFxJF.G1bPlVWO9bbrXElktAOEZ3hxzljLiyucGeKOmWC', NULL, 1, '2020-02-01', 1, NULL, '2020-02-16 07:36:36', '2020-03-02 14:08:32', 1, 1),
(14, '2test u', '+20123456123', 'test@test.com', NULL, '$2y$10$UrVHgj1xs8E2fNW6JHQjtegEh5uM0UYKwMvRUt.g.BRLH5/.9tDfm', NULL, 1, '2020-02-17', 1, NULL, '2020-02-16 08:59:53', '2020-02-26 13:11:39', 1, 1),
(15, 'Mohamed Behiery', '+56985698', 'mohatest@gmail.com', NULL, '$2y$10$02trl9OZeq82fugy0dgj/uJ6uwRGnfkyw4uckKPOUpdEiKImhEHaW', NULL, 1, '2020-02-10', 1, NULL, '2020-02-24 11:38:46', '2020-02-26 12:59:03', 1, 1),
(16, 'test Dora user2', '01090751347', NULL, NULL, '$2y$10$7lI7CcLhlq61cIfakF.qceinSYfsO2Reah5T1fTtUVPziFMTlrH3u', 'test', NULL, NULL, 1, NULL, '2020-02-27 07:59:16', '2020-02-27 07:59:43', 1, 1),
(17, 'Mohamed Behiery', '+201092551347', NULL, NULL, '$2y$10$bQr95zGXVcd85fO6/Xun3u/j0jSFrGKYDt78iSNF6QPYbyJP7MsHO', NULL, NULL, NULL, 1, NULL, '2020-02-27 08:44:54', '2020-02-27 08:45:52', 1, 1),
(18, 'test user', '+20104785', NULL, NULL, '$2y$10$s0VOCDa94u75V2BY4KvANOvgbDuaJ18/23h5cxmkyzb/HhDpIyNiK', NULL, NULL, NULL, 1, NULL, '2020-02-27 08:46:19', '2020-02-27 08:46:19', 1, 1),
(19, 'test', '+1258741', NULL, NULL, '$2y$10$BSgNhO/uSqU8.64VAwdYbeggUZDHG7RjuRHSX9udX1bVeAbMd3ug.', NULL, NULL, NULL, 1, NULL, '2020-02-27 11:52:28', '2020-02-27 11:52:28', 1, 1),
(20, 'Mohamed Behieryyy', '+258665', 'test@teesstt.com', NULL, '$2y$10$bHsQETkMKlPrFeStvKxiouq8qw2A5JYvqkCLJw6oUDgea6l.YpMg6', 'test', NULL, NULL, 1, NULL, '2020-03-03 18:51:00', '2020-03-03 18:51:00', 1, 0),
(21, 'Behieryy', '+123456', 'test@test3.com', NULL, '$2y$10$atvDzB2N/m73jNqFSiaISOxetqm2QXcrIOBISvy/J/0Tm04K/dZsG', 'fsd', NULL, NULL, 1, NULL, '2020-03-03 18:51:32', '2020-03-03 20:01:37', 1, 1),
(22, 'new user', '+2010963852', 'user4@admin.com', NULL, '$2y$10$81xaZafKrUWXXBTR3Xd6hOpYENoiWLVrYrMzZsQt30ochFXLrVE8G', 'test fcm token', NULL, NULL, 1, NULL, '2020-03-03 20:04:42', '2020-03-03 20:05:46', 1, 1);

-- --------------------------------------------------------

--
-- Table structure for table `user_notifications`
--

CREATE TABLE `user_notifications` (
  `id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `notification_id` int(11) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `user_notifications`
--

INSERT INTO `user_notifications` (`id`, `user_id`, `notification_id`, `created_at`, `updated_at`) VALUES
(1, 21, 26, '2020-03-04 12:07:42', '2020-03-04 12:07:42'),
(2, 1, 34, '2020-03-04 12:19:54', '2020-03-04 12:19:54'),
(3, 2, 34, '2020-03-04 12:19:54', '2020-03-04 12:19:54'),
(4, 3, 34, '2020-03-04 12:19:54', '2020-03-04 12:19:54'),
(5, 4, 34, '2020-03-04 12:19:54', '2020-03-04 12:19:54'),
(6, 5, 34, '2020-03-04 12:19:54', '2020-03-04 12:19:54'),
(7, 6, 34, '2020-03-04 12:19:54', '2020-03-04 12:19:54'),
(8, 7, 34, '2020-03-04 12:19:54', '2020-03-04 12:19:54'),
(9, 8, 34, '2020-03-04 12:19:54', '2020-03-04 12:19:54'),
(10, 9, 34, '2020-03-04 12:19:54', '2020-03-04 12:19:54'),
(11, 10, 34, '2020-03-04 12:19:54', '2020-03-04 12:19:54'),
(12, 11, 34, '2020-03-04 12:19:54', '2020-03-04 12:19:54'),
(13, 16, 34, '2020-03-04 12:19:54', '2020-03-04 12:19:54'),
(14, 20, 34, '2020-03-04 12:19:54', '2020-03-04 12:19:54'),
(15, 21, 34, '2020-03-04 12:19:54', '2020-03-04 12:19:54'),
(16, 22, 34, '2020-03-04 12:19:54', '2020-03-04 12:19:54');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `account_numbers`
--
ALTER TABLE `account_numbers`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `admins`
--
ALTER TABLE `admins`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `admin_permissions`
--
ALTER TABLE `admin_permissions`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `ads`
--
ALTER TABLE `ads`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `banks`
--
ALTER TABLE `banks`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `categories`
--
ALTER TABLE `categories`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `contact_us`
--
ALTER TABLE `contact_us`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `counts`
--
ALTER TABLE `counts`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `donations`
--
ALTER TABLE `donations`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `donation_categories`
--
ALTER TABLE `donation_categories`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `donation_images`
--
ALTER TABLE `donation_images`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `meta_tags`
--
ALTER TABLE `meta_tags`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `news`
--
ALTER TABLE `news`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `notifications`
--
ALTER TABLE `notifications`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `orders`
--
ALTER TABLE `orders`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `password_resets`
--
ALTER TABLE `password_resets`
  ADD KEY `password_resets_email_index` (`email`(191));

--
-- Indexes for table `permissions`
--
ALTER TABLE `permissions`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `products`
--
ALTER TABLE `products`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `product_images`
--
ALTER TABLE `product_images`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `services`
--
ALTER TABLE `services`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `settings`
--
ALTER TABLE `settings`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `user_notifications`
--
ALTER TABLE `user_notifications`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `account_numbers`
--
ALTER TABLE `account_numbers`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `admins`
--
ALTER TABLE `admins`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT for table `admin_permissions`
--
ALTER TABLE `admin_permissions`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=286;

--
-- AUTO_INCREMENT for table `ads`
--
ALTER TABLE `ads`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `banks`
--
ALTER TABLE `banks`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `categories`
--
ALTER TABLE `categories`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `contact_us`
--
ALTER TABLE `contact_us`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `counts`
--
ALTER TABLE `counts`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `donations`
--
ALTER TABLE `donations`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `donation_categories`
--
ALTER TABLE `donation_categories`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT for table `donation_images`
--
ALTER TABLE `donation_images`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `meta_tags`
--
ALTER TABLE `meta_tags`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `news`
--
ALTER TABLE `news`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `notifications`
--
ALTER TABLE `notifications`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=35;

--
-- AUTO_INCREMENT for table `orders`
--
ALTER TABLE `orders`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `permissions`
--
ALTER TABLE `permissions`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=19;

--
-- AUTO_INCREMENT for table `products`
--
ALTER TABLE `products`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `product_images`
--
ALTER TABLE `product_images`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `services`
--
ALTER TABLE `services`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `settings`
--
ALTER TABLE `settings`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=23;

--
-- AUTO_INCREMENT for table `user_notifications`
--
ALTER TABLE `user_notifications`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
