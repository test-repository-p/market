-- phpMyAdmin SQL Dump
-- version 4.6.6deb5
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3306
-- Generation Time: Apr 12, 2020 at 05:37 PM
-- Server version: 5.7.28-0ubuntu0.19.04.2
-- PHP Version: 7.4.2

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `asiye`
--

-- --------------------------------------------------------

--
-- Table structure for table `articles`
--

CREATE TABLE `articles` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `user_id` bigint(20) UNSIGNED NOT NULL,
  `category_id` bigint(20) UNSIGNED NOT NULL,
  `title` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `demo` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `text` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `articles`
--

INSERT INTO `articles` (`id`, `user_id`, `category_id`, `title`, `demo`, `text`, `created_at`, `updated_at`) VALUES
(2, 1, 1, 'لاراول', 'لورم ایپسوم متن ساختگی با تولید سادگی نامفهوم از صنعت چاپ و با استفاده از طراحان گرافیک است.', 'لورم ایپسوم متن ساختگی با تولید سادگی نامفهوم از صنعت چاپ و با استفاده از طراحان گرافیک است.لورم ایپسوم متن ساختگی با تولید سادگی نامفهوم از صنعت چاپ و با استفاده از طراحان گرافیک است.لورم ایپسوم متن ساختگی با تولید سادگی نامفهوم از صنعت چاپ و با استفاده از طراحان گرافیک است.لورم ایپسوم متن ساختگی با تولید سادگی نامفهوم از صنعت چاپ و با استفاده از طراحان گرافیک است.لورم ایپسوم متن ساختگی با تولید سادگی نامفهوم از صنعت چاپ و با استفاده از طراحان گرافیک است.لورم ایپسوم متن ساختگی با تولید سادگی نامفهوم از صنعت چاپ و با استفاده از طراحان گرافیک است.لورم ایپسوم متن ساختگی با تولید سادگی نامفهوم از صنعت چاپ و با استفاده از طراحان گرافیک است.لورم ایپسوم متن ساختگی با تولید سادگی نامفهوم از صنعت چاپ و با استفاده از طراحان گرافیک است.لورم ایپسوم متن ساختگی با تولید سادگی نامفهوم از صنعت چاپ و با استفاده از طراحان گرافیک است.لورم ایپسوم متن ساختگی با تولید سادگی نامفهوم از صنعت چاپ و با استفاده از طراحان گرافیک است.لورم ایپسوم متن ساختگی با تولید سادگی نامفهوم از صنعت چاپ و با استفاده از طراحان گرافیک است.لورم ایپسوم متن ساختگی با تولید سادگی نامفهوم از صنعت چاپ و با استفاده از طراحان گرافیک است.لورم ایپسوم متن ساختگی با تولید سادگی نامفهوم از صنعت چاپ و با استفاده از طراحان گرافیک است.لورم ایپسوم متن ساختگی با تولید سادگی نامفهوم از صنعت چاپ و با استفاده از طراحان گرافیک است.لورم ایپسوم متن ساختگی با تولید سادگی نامفهوم از صنعت چاپ و با استفاده از طراحان گرافیک است.لورم ایپسوم متن ساختگی با تولید سادگی نامفهوم از صنعت چاپ و با استفاده از طراحان گرافیک است.', '2020-04-04 09:15:21', '2020-04-04 09:15:21'),
(3, 1, 1, 'وردپرس', 'لورم ایپسوم متن ساختگی با تولید سادگی نامفهوم از صنعت چاپ و با استفاده از طراحان گرافیک است.', 'لورم ایپسوم متن ساختگی با تولید سادگی نامفهوم از صنعت چاپ و با استفاده از طراحان گرافیک است.لورم ایپسوم متن ساختگی با تولید سادگی نامفهوم از صنعت چاپ و با استفاده از طراحان گرافیک است.لورم ایپسوم متن ساختگی با تولید سادگی نامفهوم از صنعت چاپ و با استفاده از طراحان گرافیک است.لورم ایپسوم متن ساختگی با تولید سادگی نامفهوم از صنعت چاپ و با استفاده از طراحان گرافیک است.لورم ایپسوم متن ساختگی با تولید سادگی نامفهوم از صنعت چاپ و با استفاده از طراحان گرافیک است.لورم ایپسوم متن ساختگی با تولید سادگی نامفهوم از صنعت چاپ و با استفاده از طراحان گرافیک است.لورم ایپسوم متن ساختگی با تولید سادگی نامفهوم از صنعت چاپ و با استفاده از طراحان گرافیک است.لورم ایپسوم متن ساختگی با تولید سادگی نامفهوم از صنعت چاپ و با استفاده از طراحان گرافیک است.لورم ایپسوم متن ساختگی با تولید سادگی نامفهوم از صنعت چاپ و با استفاده از طراحان گرافیک است.لورم ایپسوم متن ساختگی با تولید سادگی نامفهوم از صنعت چاپ و با استفاده از طراحان گرافیک است.لورم ایپسوم متن ساختگی با تولید سادگی نامفهوم از صنعت چاپ و با استفاده از طراحان گرافیک است.لورم ایپسوم متن ساختگی با تولید سادگی نامفهوم از صنعت چاپ و با استفاده از طراحان گرافیک است.لورم ایپسوم متن ساختگی با تولید سادگی نامفهوم از صنعت چاپ و با استفاده از طراحان گرافیک است.لورم ایپسوم متن ساختگی با تولید سادگی نامفهوم از صنعت چاپ و با استفاده از طراحان گرافیک است.لورم ایپسوم متن ساختگی با تولید سادگی نامفهوم از صنعت چاپ و با استفاده از طراحان گرافیک است.لورم ایپسوم متن ساختگی با تولید سادگی نامفهوم از صنعت چاپ و با استفاده از طراحان گرافیک است.لورم ایپسوم متن ساختگی با تولید سادگی نامفهوم از صنعت چاپ و با استفاده از طراحان گرافیک است.لورم ایپسوم متن ساختگی با تولید سادگی نامفهوم از صنعت چاپ و با استفاده از طراحان گرافیک است.لورم ایپسوم متن ساختگی با تولید سادگی نامفهوم از صنعت چاپ و با استفاده از طراحان گرافیک است.لورم ایپسوم متن ساختگی با تولید سادگی نامفهوم از صنعت چاپ و با استفاده از طراحان گرافیک است.', '2020-04-04 09:38:10', '2020-04-04 09:38:10'),
(6, 1, 6, 'وردپرسssssssssss', 'فر یم ورک پی اج پی', 'فر یم ورک پی اج پیفر یم ورک پی اج پیفر یم ورک پی اج پیفر یم ورک پی اج پیفر یم ورک پی اج پیفر یم ورک پی اج پیفر یم ورک پی اج پیفر یم ورک پی اج پیفر یم ورک پی اج پیفر یم ورک پی اج پیفر یم ورک پی اج پیفر یم ورک پی اج پیفر یم ور', '2020-04-10 16:39:37', '2020-04-10 17:24:57'),
(7, 1, 1, 'فروشنده۲', 'ss', 'zzzzzzzzzzzzzzzzzzzzzzzzzzzzzzzzzz', '2020-04-11 05:22:31', '2020-04-11 05:22:31'),
(8, 1, 1, 'وردپرسssssssssss', 'فر یم ورک پی اج پی', 'zzzzzzzzzzzzz', '2020-04-11 05:23:32', '2020-04-11 05:23:32'),
(10, 1, 1, 'وردپرسssssssssss', 'فر یم ورک پی اج پی', 'zzzzzzzzzzzzz', '2020-04-11 05:35:30', '2020-04-11 05:35:30');

-- --------------------------------------------------------

--
-- Table structure for table `attributes`
--

CREATE TABLE `attributes` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `title` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `attributes`
--

INSERT INTO `attributes` (`id`, `name`, `title`, `created_at`, `updated_at`) VALUES
(4, 'color', 'رنگ', '2020-03-28 11:23:11', '2020-04-09 02:14:44'),
(5, 'size', 'سایز', '2020-03-28 11:26:00', '2020-03-28 11:26:00'),
(6, 'type', 'جنس', '2020-03-28 11:26:15', '2020-03-28 11:26:15'),
(7, 'brand', 'برند', '2020-03-28 11:26:30', '2020-03-28 11:42:37'),
(8, 'محصول جدید', 'لاراول', '2020-04-09 12:53:45', '2020-04-09 12:53:45'),
(9, 'محصول جدیدmmmmmmmmmmmm', 'لاراول', '2020-04-09 12:53:52', '2020-04-09 12:56:09'),
(10, 'asiye', 'وردپرسssssssssss', '2020-04-09 12:55:57', '2020-04-09 12:55:57');

-- --------------------------------------------------------

--
-- Table structure for table `attribute_subcategories`
--

CREATE TABLE `attribute_subcategories` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `attribute_id` bigint(20) UNSIGNED DEFAULT NULL,
  `subcategory_id` bigint(20) UNSIGNED DEFAULT NULL,
  `product_id` bigint(20) UNSIGNED DEFAULT NULL,
  `description` varchar(200) COLLATE utf8_bin DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `updated_at` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin;

--
-- Dumping data for table `attribute_subcategories`
--

INSERT INTO `attribute_subcategories` (`id`, `attribute_id`, `subcategory_id`, `product_id`, `description`, `created_at`, `updated_at`) VALUES
(32, 4, 24, 36, 'نیلی', '2020-04-07 14:16:33', '2020-04-07 14:16:33'),
(33, 4, 24, NULL, 'مشکی', '2020-04-11 07:29:22', '2020-04-11 07:29:22'),
(34, 4, 24, 30, 'قرمز', '2020-03-30 16:54:14', '2020-03-30 16:54:14'),
(35, 4, 24, 29, 'قهوه ایی', '2020-03-30 16:53:01', '2020-03-30 16:53:01'),
(36, 5, 24, 36, 'L', '2020-04-07 14:16:33', '2020-04-07 14:16:33'),
(37, 5, 24, NULL, 'XL', '2020-03-30 16:29:59', NULL),
(38, 5, 24, NULL, 'M', '2020-03-30 16:29:59', NULL),
(39, 5, 24, NULL, 'S', '2020-03-30 16:29:59', NULL),
(40, 6, 24, 36, 'حریر', '2020-04-07 14:16:33', '2020-04-07 14:16:33'),
(41, 6, 24, 30, 'ساده', '2020-03-30 16:54:14', '2020-03-30 16:54:14'),
(42, 7, 25, 36, 'شکوفه', '2020-04-07 14:16:33', '2020-04-07 14:16:33'),
(43, 7, 24, 30, 'شیکسون', '2020-03-30 16:54:14', '2020-03-30 16:54:14'),
(44, 4, 25, 32, 'صورتی', '2020-03-30 17:05:08', '2020-03-30 17:05:08'),
(45, 4, 25, NULL, 'طوسی', '2020-03-30 16:35:32', NULL),
(46, 4, 25, 31, 'کرم', '2020-03-30 17:03:12', '2020-03-30 17:03:12'),
(47, 4, 25, 33, 'مشکی', '2020-03-30 17:06:00', '2020-03-30 17:06:00'),
(48, 5, 25, NULL, '36', '2020-03-30 16:36:05', NULL),
(49, 5, 25, 33, '38', '2020-03-30 17:06:00', '2020-03-30 17:06:00'),
(50, 5, 25, NULL, '40', '2020-03-30 16:36:06', NULL),
(51, 5, 25, NULL, '42', '2020-03-30 16:36:06', NULL),
(52, 7, 25, 33, 'شکوفه', '2020-03-30 17:06:00', '2020-03-30 17:06:00'),
(53, 7, 25, NULL, 'شیکسون', '2020-03-30 16:36:29', NULL),
(54, 7, 25, NULL, 'نازنین', '2020-03-30 16:36:29', NULL),
(55, 4, 49, NULL, 'آبی', '2020-03-30 16:37:44', NULL),
(56, 4, 49, NULL, 'مشکی', '2020-03-30 16:37:44', NULL),
(57, 4, 49, NULL, 'نارنجی', '2020-04-11 07:31:59', '2020-04-11 07:31:59'),
(58, 4, 49, NULL, 'طوسی', '2020-03-30 16:37:44', NULL),
(59, 4, 49, NULL, 'سفید', '2020-04-11 07:31:57', '2020-04-11 07:31:57'),
(60, 5, 49, NULL, 'XL', '2020-04-11 07:31:57', '2020-04-11 07:31:57'),
(61, 5, 49, NULL, 'L', '2020-04-11 07:32:00', '2020-04-11 07:32:00'),
(62, 5, 49, NULL, 'M', '2020-04-11 07:31:57', '2020-04-11 07:31:57'),
(63, 5, 49, NULL, 'S', '2020-04-11 07:32:00', '2020-04-11 07:32:00'),
(64, 4, 57, NULL, 'قهوه ایی', '2020-03-30 16:40:14', NULL),
(65, 4, 57, NULL, 'قهوه ایی سوخته', '2020-03-30 16:40:15', NULL),
(66, 4, 57, NULL, 'مشکی', '2020-03-30 16:40:15', NULL),
(67, 6, 25, 33, 'کتان', '2020-03-30 17:06:00', '2020-03-30 17:06:00'),
(68, 6, 25, NULL, 'نخی', '2020-03-30 16:56:07', NULL),
(69, 6, 49, NULL, 'نخی', '2020-04-11 07:32:00', '2020-04-11 07:32:00'),
(70, 7, 49, NULL, 'شکوفه', '2020-04-11 07:32:00', '2020-04-11 07:32:00');

-- --------------------------------------------------------

--
-- Table structure for table `baskets`
--

CREATE TABLE `baskets` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `product_id` bigint(20) UNSIGNED NOT NULL,
  `user_id` bigint(20) UNSIGNED NOT NULL,
  `count` int(10) UNSIGNED NOT NULL DEFAULT '1',
  `price` int(10) UNSIGNED NOT NULL,
  `status` enum('0','1') COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT '0',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `baskets`
--

INSERT INTO `baskets` (`id`, `product_id`, `user_id`, `count`, `price`, `status`, `created_at`, `updated_at`) VALUES
(9, 31, 1, 2, 242000, '0', '2020-04-02 12:40:01', '2020-04-12 03:49:12'),
(10, 33, 1, 1, 242000, '0', '2020-04-02 12:46:00', '2020-04-02 12:46:00'),
(11, 29, 1, 1, 62000, '0', '2020-04-04 03:40:57', '2020-04-04 03:40:57'),
(12, 30, 1, 1, 62000, '0', '2020-04-12 03:49:23', '2020-04-12 03:49:23');

-- --------------------------------------------------------

--
-- Table structure for table `books`
--

CREATE TABLE `books` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `author` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `books`
--

INSERT INTO `books` (`id`, `name`, `author`, `created_at`, `updated_at`) VALUES
(1, 'vvvvvvvvv', 'ddddddddddd', '2020-04-07 14:51:38', '2020-04-07 14:51:38');

-- --------------------------------------------------------

--
-- Table structure for table `categories`
--

CREATE TABLE `categories` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `title` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `chid` enum('0','1') COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT '0',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `categories`
--

INSERT INTO `categories` (`id`, `name`, `title`, `chid`, `created_at`, `updated_at`) VALUES
(1, 'women', 'زنانه', '0', '2020-03-26 10:21:59', '2020-03-27 08:52:12'),
(2, 'baby', 'بچگانه', '0', '2020-03-26 10:22:06', '2020-03-27 08:51:57'),
(3, 'men', 'مردانه', '0', '2020-03-26 10:22:13', '2020-03-27 08:51:38'),
(6, 'محصول جدید', 'فروشنده۲', '0', '2020-04-09 09:43:04', '2020-04-09 09:43:04'),
(8, 'وییییییییییزه استdddddddddddddddddddd', 'وردپرسssssssssss', '0', '2020-04-09 11:58:13', '2020-04-09 12:16:59'),
(9, 'وییییییییییزه است', 'فروشنده۲', '0', '2020-04-09 12:00:15', '2020-04-09 12:00:15'),
(10, 'محصول جدید', 'وردپرسssssssssss', '0', '2020-04-09 12:01:47', '2020-04-09 12:01:47'),
(11, 'وییییییییییزه استdddddddddddddddddddd', 'لاراول', '0', '2020-04-09 12:02:33', '2020-04-09 12:14:16'),
(17, 'وییییییییییزه است', 'لاراول', '0', '2020-04-09 12:11:06', '2020-04-09 12:11:06'),
(19, 'وییییییییییزه است', 'فروشنده۲', '0', '2020-04-09 12:47:47', '2020-04-09 12:47:47'),
(20, 'محصول جدید', 'وردپرسssssssssss', '0', '2020-04-09 12:48:18', '2020-04-09 12:48:18'),
(21, 'وییییییییییزه استdddddddddddddddddddd', 'لاراول', '0', '2020-04-09 12:51:19', '2020-04-09 13:02:12');

-- --------------------------------------------------------

--
-- Table structure for table `commentables`
--

CREATE TABLE `commentables` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `comment_id` bigint(20) UNSIGNED NOT NULL,
  `commentable_id` bigint(20) UNSIGNED NOT NULL,
  `commentable_type` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `commentables`
--

INSERT INTO `commentables` (`id`, `comment_id`, `commentable_id`, `commentable_type`, `created_at`, `updated_at`) VALUES
(1, 2, 27, 'App\\Models\\Product', NULL, NULL),
(2, 3, 2, 'App\\Models\\Product', NULL, NULL),
(4, 4, 3, 'App\\Models\\Article', NULL, NULL),
(5, 4, 3, 'App\\Models\\Product', NULL, NULL),
(6, 5, 29, 'App\\Models\\Product', NULL, NULL),
(7, 6, 30, 'App\\Models\\Product', NULL, NULL),
(8, 7, 30, 'App\\Models\\Product', NULL, NULL),
(9, 8, 30, 'App\\Models\\Product', NULL, NULL),
(10, 9, 30, 'App\\Models\\Product', NULL, NULL),
(11, 10, 30, 'App\\Models\\Product', NULL, NULL),
(12, 12, 30, 'App\\Models\\Product', NULL, NULL),
(13, 13, 30, 'App\\Models\\Product', NULL, NULL),
(14, 14, 30, 'App\\Models\\Product', NULL, NULL),
(15, 15, 31, 'App\\Models\\Product', NULL, NULL),
(16, 16, 3, 'App\\Models\\Article', NULL, NULL),
(17, 17, 3, 'App\\Models\\Article', NULL, NULL),
(18, 18, 3, 'App\\Models\\Article', NULL, NULL),
(19, 19, 30, 'App\\Models\\Product', NULL, NULL),
(20, 20, 27, 'App\\Models\\Product', NULL, NULL),
(21, 21, 28, 'App\\Models\\Product', NULL, NULL),
(23, 23, 29, 'App\\Models\\Product', NULL, NULL),
(24, 24, 34, 'App\\Models\\Product', NULL, NULL),
(25, 22, 34, 'App\\Models\\Product', NULL, NULL),
(27, 26, 2, 'App\\Models\\Article', NULL, NULL),
(28, 27, 2, 'App\\Models\\Article', NULL, NULL),
(29, 25, 29, 'App\\Models\\Product', NULL, NULL),
(33, 28, 32, 'App\\Models\\Product', NULL, NULL),
(35, 29, 29, 'App\\Models\\Product', NULL, NULL),
(36, 30, 28, 'App\\Models\\Product', NULL, NULL),
(37, 31, 32, 'App\\Models\\Product', NULL, NULL),
(38, 32, 3, 'App\\Models\\Article', NULL, NULL),
(39, 31, 2, 'App\\Models\\Article', NULL, NULL),
(40, 33, 28, 'App\\Models\\Product', NULL, NULL),
(41, 34, 28, 'App\\Models\\Product', NULL, NULL),
(42, 35, 29, 'App\\Models\\Product', NULL, NULL),
(43, 36, 29, 'App\\Models\\Product', NULL, NULL),
(44, 37, 29, 'App\\Models\\Product', NULL, NULL),
(46, 38, 27, 'App\\Models\\Product', NULL, NULL),
(47, 39, 30, 'App\\Models\\Product', NULL, NULL),
(48, 40, 28, 'App\\Models\\Product', NULL, NULL),
(50, 42, 29, 'App\\Models\\Product', NULL, NULL),
(53, 43, 3, 'App\\Models\\Article', NULL, NULL),
(54, 41, 2, 'App\\Models\\Article', NULL, NULL),
(56, 44, 31, 'App\\Models\\Product', NULL, NULL),
(57, 45, 32, 'App\\Models\\Product', NULL, NULL),
(58, 46, 29, 'App\\Models\\Product', NULL, NULL),
(60, 48, 29, 'App\\Models\\Product', NULL, NULL),
(61, 47, 29, 'App\\Models\\Product', NULL, NULL),
(62, 49, 27, 'App\\Models\\Product', NULL, NULL),
(63, 50, 29, 'App\\Models\\Product', NULL, NULL),
(64, 51, 32, 'App\\Models\\Product', NULL, NULL),
(65, 52, 31, 'App\\Models\\Product', NULL, NULL),
(68, 53, 34, 'App\\Models\\Product', NULL, NULL),
(70, 43, 30, 'App\\Models\\Product', NULL, NULL),
(71, 54, 29, 'App\\Models\\Product', NULL, NULL),
(77, 60, 32, 'App\\Models\\Product', NULL, NULL),
(78, 61, 30, 'App\\Models\\Product', NULL, NULL),
(79, 62, 31, 'App\\Models\\Product', NULL, NULL),
(80, 55, 30, 'App\\Models\\Product', NULL, NULL),
(82, 56, 30, 'App\\Models\\Product', NULL, NULL),
(83, 63, 34, 'App\\Models\\Product', NULL, NULL),
(84, 64, 29, 'App\\Models\\Product', NULL, NULL),
(94, 57, 34, 'App\\Models\\Product', NULL, NULL),
(95, 58, 28, 'App\\Models\\Product', NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `comments`
--

CREATE TABLE `comments` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `user_id` bigint(20) UNSIGNED NOT NULL,
  `status` int(11) NOT NULL DEFAULT '0',
  `comment` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `comments`
--

INSERT INTO `comments` (`id`, `user_id`, `status`, `comment`, `created_at`, `updated_at`) VALUES
(2, 1, 0, 'لورم ایپسوم متن ساختگی با تولید سادگی نامفهوم از صنعت چاپ و با استفاده از طراحان گرافیک است.', '2020-04-04 14:40:27', '2020-04-04 14:40:27'),
(4, 1, 0, 'لورم ایپسوم متن ساختگی با تولید سادگی نامفهوم از صنعت چاپ و با استفاده از طراحان گرافیک است.', '2020-04-04 15:09:27', '2020-04-04 15:09:27'),
(5, 1, 0, 'توسط : مدیر ارشد سایت توسط : مدیر ارشد سایت توسط : مدیر ارشد سایت', '2020-04-04 15:14:04', '2020-04-04 15:14:04'),
(6, 1, 0, 'نظرخودرادررابطهنظرخودرادررابطهنظرخودرادررابطه', '2020-04-04 17:02:02', '2020-04-04 17:02:02'),
(7, 1, 0, 'نظرخودرادررابطهنظرخودرادررابطهنظرخودرادررابطه', '2020-04-04 17:04:26', '2020-04-04 17:04:26'),
(8, 1, 0, 'نظرخودرادررابطهنظرخودرادررابطهنظرخودرادررابطه', '2020-04-04 17:04:45', '2020-04-04 17:04:45'),
(9, 1, 0, '33333', '2020-04-04 17:06:23', '2020-04-04 17:06:23'),
(10, 1, 0, '33333zzzzzzzz', '2020-04-04 17:14:40', '2020-04-04 17:14:40'),
(11, 1, 0, 'بااینبااینبااینبااینبااینبااین', '2020-04-04 17:16:30', '2020-04-04 17:16:30'),
(12, 1, 0, 'بااینبااینبااینبااینبااینبااین', '2020-04-04 17:17:21', '2020-04-04 17:17:21'),
(13, 1, 0, 'ddddddddddddd', '2020-04-04 17:20:29', '2020-04-04 17:20:29'),
(14, 1, 0, 'ddddddddddddd', '2020-04-04 17:20:45', '2020-04-04 17:20:45'),
(15, 1, 0, 'ddddddddd', '2020-04-04 17:46:31', '2020-04-04 17:46:31'),
(16, 1, 0, 'ssssssssssssssssss', '2020-04-05 04:58:17', '2020-04-05 04:58:17'),
(17, 1, 0, 'ssssssssssssssssss', '2020-04-05 04:59:30', '2020-04-05 04:59:30'),
(18, 1, 0, 'ccccccccccccccccccccc', '2020-04-05 05:00:59', '2020-04-05 05:00:59'),
(19, 1, 0, 'vedvvvvvvvvvvvvvvvvvvvvvvvvv', '2020-04-09 16:01:52', '2020-04-09 16:01:52'),
(20, 1, 0, 'mnnnمممممممممممممممممممممممممممممممممممممممم', '2020-04-09 16:04:14', '2020-04-09 16:04:14'),
(21, 1, 0, 'mnnnمممممممممممممممممممممممممممممممممممممممم', '2020-04-09 16:04:42', '2020-04-09 16:04:42'),
(22, 1, 0, 'mnnn', '2020-04-09 16:04:43', '2020-04-09 16:08:19'),
(24, 1, 0, ',mmmmmmmmmmmmmmmmmmmmmmmmmmm', '2020-04-09 16:06:57', '2020-04-09 16:06:57'),
(25, 1, 0, 'lllllllllllllllllllllnnnnnnnnnnnnnnnnnnnnnnnnnnnnn', '2020-04-09 16:09:27', '2020-04-09 16:09:57'),
(26, 1, 0, 'lllllllllllllllllllll', '2020-04-09 16:09:38', '2020-04-09 16:09:38'),
(27, 1, 0, 'lllllllllllllllllllll', '2020-04-09 16:09:39', '2020-04-09 16:09:39'),
(28, 1, 0, 'hhhhhhhhhhqqqqqqqqqqqqqqqqqqq', '2020-04-09 16:11:21', '2020-04-09 16:15:21'),
(29, 1, 0, 'sssssssssss', '2020-04-09 16:15:08', '2020-04-09 16:24:21'),
(30, 1, 0, 'tttttttttttttttttddddddddddddddddd', '2020-04-09 16:32:21', '2020-04-09 16:32:21'),
(31, 1, 0, 'mmmm', '2020-04-09 16:33:08', '2020-04-09 16:33:08'),
(32, 1, 0, 'mm', '2020-04-09 16:34:08', '2020-04-09 16:34:08'),
(33, 1, 0, ',,,', '2020-04-09 16:41:58', '2020-04-09 16:41:58'),
(34, 1, 0, 'nn', '2020-04-09 16:42:58', '2020-04-09 16:42:58'),
(35, 1, 0, 'bb', '2020-04-09 16:45:01', '2020-04-09 16:46:03'),
(36, 1, 0, 'nn', '2020-04-09 16:46:25', '2020-04-09 16:46:25'),
(37, 1, 0, 'mm', '2020-04-09 16:47:28', '2020-04-09 16:47:28'),
(39, 1, 0, 'mm', '2020-04-09 16:52:22', '2020-04-09 16:52:22'),
(46, 1, 0, 'x', '2020-04-10 04:21:58', '2020-04-10 04:21:58'),
(47, 1, 0, 'ss', '2020-04-10 04:31:06', '2020-04-10 04:33:13'),
(48, 1, 0, 'a', '2020-04-10 04:33:02', '2020-04-10 04:33:02');

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
-- Table structure for table `informations`
--

CREATE TABLE `informations` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `address` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `state` int(50) NOT NULL,
  `telephone` varchar(11) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `informations`
--

INSERT INTO `informations` (`id`, `address`, `state`, `telephone`, `email`, `created_at`, `updated_at`) VALUES
(2, 'تهران، بلوار آیت الله کاشانی، خیابان بهنام، کوچه هجدم', 1, '02198345768', 'happy_shop@gmail.com', '2020-04-03 03:16:30', '2020-04-10 12:04:52'),
(3, 'تهران، بلوار آیت الله کاشانی، خیابان بهنام، کوچه هجدم', 2, '02198345768', 'asiye@gmail.com', '2020-04-10 12:10:12', '2020-04-10 12:21:21'),
(4, 'تهران، بلوار آیت الله کاشانی، خیابان بهنام، کوچه هجدم', 2, '02198345768', 'asiye@gmail.com', '2020-04-10 12:22:04', '2020-04-10 12:22:04');

-- --------------------------------------------------------

--
-- Table structure for table `logos`
--

CREATE TABLE `logos` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `title` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `logos`
--

INSERT INTO `logos` (`id`, `name`, `title`, `created_at`, `updated_at`) VALUES
(1, 'logo-home-1', 'هپی شاپ', '2020-04-03 03:53:16', '2020-04-03 04:00:11'),
(86, 'وییییییییییزه است', 'لاراول', '2020-04-11 10:31:39', '2020-04-11 10:31:39'),
(89, 'محصول جدید', 'وردپرسssssssssss', '2020-04-11 13:04:38', '2020-04-11 13:04:38');

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
(1, '2014_10_12_000000_create_users_table', 1),
(2, '2014_10_12_100000_create_password_resets_table', 1),
(3, '2016_09_13_070520_add_verification_to_user_table', 1),
(4, '2019_08_19_000000_create_failed_jobs_table', 1),
(5, '2020_03_19_122858_create_photos_table', 1),
(6, '2020_03_19_135230_create_products_table', 1),
(7, '2020_03_24_141647_create_roles_table', 1),
(8, '2020_03_24_141731_create_permissions_table', 1),
(9, '2020_03_24_141815_create_permission__role_table', 1),
(10, '2020_03_24_141834_create_role__user_table', 1),
(11, '2020_03_25_111838_create_categories_table', 1),
(12, '2020_03_25_115137_create_subcategories_table', 1),
(13, '2020_03_25_121332_create_attributes_table', 1),
(14, '2020_03_25_121411_create_attribute__subcategory_table', 1),
(15, '2020_03_26_131749_create_tags_table', 1),
(16, '2020_03_26_131819_create_taggables_table', 1),
(17, '2020_03_26_202114_create_sliders_table', 2),
(18, '2020_03_29_155632_create_information_table', 3),
(19, '2020_03_31_150045_create_baskets_table', 3),
(20, '2020_04_03_075312_create_logos_table', 4),
(21, '2020_04_03_212514_create_ratings_table', 5),
(22, '2020_04_04_100417_create_articles_table', 6),
(23, '2020_04_04_164325_create_comments_table', 7),
(24, '2020_04_04_184718_create_commentables_table', 8),
(25, '2020_04_06_150715_create_posts_table', 9),
(26, '2020_04_07_191512_create_books_table', 10);

-- --------------------------------------------------------

--
-- Table structure for table `password_resets`
--

CREATE TABLE `password_resets` (
  `email` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `permissions`
--

CREATE TABLE `permissions` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `title` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `permissions`
--

INSERT INTO `permissions` (`id`, `name`, `title`, `created_at`, `updated_at`) VALUES
(1, 'tag_manager', 'مدیریت کلمات کلیدی', '2020-03-26 09:54:37', '2020-03-26 09:54:37'),
(2, 'product_manager', 'مدیریت محصولات', '2020-03-26 09:54:58', '2020-03-26 09:54:58'),
(3, 'user_manager', 'مدیریت کاربران', '2020-03-26 09:55:27', '2020-03-26 09:55:27'),
(4, 'attribute_manager', 'مدیریت ویژگی ها', '2020-03-26 09:56:19', '2020-03-26 09:56:19'),
(5, 'subcategory_manager', 'مدیریت زیرگروه ها', '2020-03-26 09:56:43', '2020-03-26 09:56:43'),
(6, 'category_manager', 'مدیریت دسته بندیها', '2020-03-26 09:57:25', '2020-03-26 09:57:25'),
(7, 'slider_manager', 'مدیریت اسلایدرها', '2020-03-26 16:22:29', '2020-03-26 16:22:29');

-- --------------------------------------------------------

--
-- Table structure for table `permission_role`
--

CREATE TABLE `permission_role` (
  `role_id` bigint(20) UNSIGNED NOT NULL,
  `permission_id` bigint(20) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `permission_role`
--

INSERT INTO `permission_role` (`role_id`, `permission_id`, `created_at`, `updated_at`) VALUES
(1, 1, NULL, NULL),
(1, 2, NULL, NULL),
(1, 3, NULL, NULL),
(1, 4, NULL, NULL),
(1, 5, NULL, NULL),
(1, 6, NULL, NULL),
(1, 7, NULL, NULL),
(3, 2, NULL, NULL),
(3, 4, NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `photos`
--

CREATE TABLE `photos` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `photoable_id` bigint(20) UNSIGNED NOT NULL,
  `photoable_type` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `path` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `photos`
--

INSERT INTO `photos` (`id`, `photoable_id`, `photoable_type`, `path`, `created_at`, `updated_at`) VALUES
(1, 1, 'App\\User', 'uploads/users/1586675377.jpg', '2020-03-26 09:58:20', '2020-04-12 02:39:37'),
(63, 11, 'App\\Models\\Slider', 'uploads/sliders/resize-1585569439.jpg', '2020-03-30 07:24:51', '2020-03-30 07:27:19'),
(64, 12, 'App\\Models\\Slider', 'uploads/sliders/resize-1585569451.jpg', '2020-03-30 07:25:07', '2020-03-30 07:27:31'),
(65, 13, 'App\\Models\\Slider', 'uploads/sliders/resize-1585569336.jpg', '2020-03-30 07:25:37', '2020-03-30 07:25:37'),
(71, 27, 'App\\Models\\Product', 'uploads/products/1585586912.jpg', '2020-03-30 12:18:32', '2020-03-30 12:18:32'),
(72, 28, 'App\\Models\\Product', 'uploads/products/1585587010.jpg', '2020-03-30 12:20:10', '2020-03-30 12:20:10'),
(73, 29, 'App\\Models\\Product', 'uploads/products/1585587181.jpg', '2020-03-30 12:23:01', '2020-03-30 12:23:01'),
(74, 30, 'App\\Models\\Product', 'uploads/products/1585587254.jpg', '2020-03-30 12:24:14', '2020-03-30 12:24:14'),
(75, 31, 'App\\Models\\Product', 'uploads/products/1585587793.jpg', '2020-03-30 12:33:13', '2020-03-30 12:33:13'),
(76, 32, 'App\\Models\\Product', 'uploads/products/1585587908.jpg', '2020-03-30 12:35:08', '2020-03-30 12:35:08'),
(77, 33, 'App\\Models\\Product', 'uploads/products/1585587960.jpg', '2020-03-30 12:36:00', '2020-03-30 12:36:00'),
(78, 34, 'App\\Models\\Product', 'uploads/products/1585588252.jpg', '2020-03-30 12:40:52', '2020-03-30 12:40:52'),
(79, 35, 'App\\Models\\Product', 'uploads/products/1585588316.jpg', '2020-03-30 12:41:56', '2020-03-30 12:41:56'),
(80, 14, 'App\\Models\\Slider', 'uploads/sliders/resize-1585599718.jpg', '2020-03-30 15:51:58', '2020-03-30 15:51:58'),
(81, 15, 'App\\Models\\Slider', 'uploads/sliders/resize-1585599749.jpg', '2020-03-30 15:52:29', '2020-03-30 15:52:29'),
(82, 16, 'App\\Models\\Slider', 'uploads/sliders/resize-1585599775.jpg', '2020-03-30 15:52:55', '2020-03-30 15:52:55'),
(83, 17, 'App\\Models\\Slider', 'uploads/sliders/resize-1585599976.jpg', '2020-03-30 15:56:16', '2020-03-30 15:56:16'),
(84, 18, 'App\\Models\\Slider', 'uploads/sliders/resize-1585602542.jpg', '2020-03-30 16:35:27', '2020-03-30 16:39:02'),
(85, 19, 'App\\Models\\Slider', 'uploads/sliders/resize-1585602353.jpg', '2020-03-30 16:35:54', '2020-03-30 16:35:54'),
(86, 30, 'App\\Models\\Product', 'uploads/gallery/676935941-30.jpg', '2020-04-02 08:38:30', '2020-04-02 08:38:30'),
(87, 30, 'App\\Models\\Product', 'uploads/gallery/948435608-30.jpg', '2020-04-02 08:38:39', '2020-04-02 08:38:39'),
(88, 30, 'App\\Models\\Product', 'uploads/gallery/439093381-30.jpg', '2020-04-02 08:38:45', '2020-04-02 08:38:45'),
(89, 30, 'App\\Models\\Product', 'uploads/gallery/954598782-30.jpg', '2020-04-02 08:39:05', '2020-04-02 08:39:05'),
(90, 1, 'App\\Models\\Logo', 'uploads/logos/logo-1585902611.jpeg', '2020-04-03 03:53:17', '2020-04-03 04:00:11'),
(91, 36, 'App\\Models\\Product', 'uploads/products/1585950229.jpg', '2020-04-03 17:13:49', '2020-04-03 17:13:49'),
(94, 2, 'App\\Models\\Article', 'uploads/articles/1586007921.jpg', '2020-04-04 09:15:21', '2020-04-04 09:15:21'),
(95, 3, 'App\\Models\\Article', 'uploads/articles/1586009290.jpg', '2020-04-04 09:38:10', '2020-04-04 09:38:10'),
(96, 6, 'App\\Models\\Article', 'uploads/articles/1586552977.jpg', '2020-04-10 16:39:37', '2020-04-10 16:39:37'),
(97, 2, 'App\\Models\\Logo', 'uploads/logos/logo-1586554222.jpg', '2020-04-10 17:00:22', '2020-04-10 17:00:22'),
(98, 3, 'App\\Models\\Logo', 'uploads/logos/logo-1586554340.jpg', '2020-04-10 17:02:21', '2020-04-10 17:02:21'),
(99, 4, 'App\\Models\\Logo', 'uploads/logos/logo-1586554426.png', '2020-04-10 17:03:47', '2020-04-10 17:03:47'),
(100, 5, 'App\\Models\\Logo', 'uploads/logos/logo-1586554601.png', '2020-04-10 17:06:41', '2020-04-10 17:06:41'),
(101, 6, 'App\\Models\\Logo', 'uploads/logos/logo-1586554627.png', '2020-04-10 17:07:07', '2020-04-10 17:07:07'),
(102, 7, 'App\\Models\\Logo', 'uploads/logos/logo-1586554759.png', '2020-04-10 17:09:19', '2020-04-10 17:09:19'),
(103, 8, 'App\\Models\\Logo', 'uploads/logos/logo-1586555009.png', '2020-04-10 17:13:29', '2020-04-10 17:13:29'),
(104, 4, 'App\\Models\\Logo', 'uploads/logos/logo-1586555069.jpg', '2020-04-10 17:14:29', '2020-04-10 17:14:29'),
(105, 6, 'App\\Models\\Logo', 'uploads/logos/logo-1586555148.jpg', '2020-04-10 17:15:48', '2020-04-10 17:15:48'),
(106, 9, 'App\\Models\\Logo', 'uploads/logos/logo-1586555168.png', '2020-04-10 17:16:08', '2020-04-10 17:16:08'),
(107, 9, 'App\\Models\\Logo', 'uploads/logos/logo-1586555210.jpg', '2020-04-10 17:16:50', '2020-04-10 17:16:50'),
(108, 10, 'App\\Models\\Logo', 'uploads/logos/logo-1586555380.jpg', '2020-04-10 17:19:40', '2020-04-10 17:19:40'),
(109, 11, 'App\\Models\\Logo', 'uploads/logos/logo-1586555420.jpg', '2020-04-10 17:20:20', '2020-04-10 17:20:20'),
(110, 6, 'App\\Models\\Article', 'uploads/articles/1586555697.png', '2020-04-10 17:24:57', '2020-04-10 17:24:57'),
(112, 10, 'App\\Models\\Logo', 'uploads/logos/logo-1586556043.png', '2020-04-10 17:30:43', '2020-04-10 17:30:43'),
(113, 13, 'App\\Models\\Logo', 'uploads/logos/logo-1586591546.jpg', '2020-04-11 03:22:26', '2020-04-11 03:22:26'),
(114, 14, 'App\\Models\\Logo', 'uploads/logos/logo-1586593429.png', '2020-04-11 03:53:50', '2020-04-11 03:53:50'),
(117, 17, 'App\\Models\\Logo', 'uploads/logos/logo-1586593459.png', '2020-04-11 03:54:19', '2020-04-11 03:54:19'),
(120, 20, 'App\\Models\\Logo', 'uploads/logos/logo-1586593686.png', '2020-04-11 03:58:06', '2020-04-11 03:58:06'),
(122, 27, 'App\\Models\\Logo', 'uploads/logos/logo-1586595997.jpeg', '2020-04-11 04:36:37', '2020-04-11 04:36:37'),
(125, 30, 'App\\Models\\Logo', 'uploads/logos/logo-1586596064.jpeg', '2020-04-11 04:37:44', '2020-04-11 04:37:44'),
(126, 31, 'App\\Models\\Logo', 'uploads/logos/logo-1586596362.jpeg', '2020-04-11 04:42:42', '2020-04-11 04:42:42'),
(129, 32, 'App\\Models\\Logo', 'uploads/logos/logo-1586596911.jpg', '2020-04-11 04:51:51', '2020-04-11 04:51:51'),
(132, 20, 'App\\Models\\Logo', 'uploads/logos/logo-1586598097.jpg', '2020-04-11 05:11:37', '2020-04-11 05:11:37'),
(133, 20, 'App\\Models\\Logo', 'uploads/logos/logo-1586598097.jpg', '2020-04-11 05:11:37', '2020-04-11 05:11:37'),
(134, 30, 'App\\Models\\Logo', 'uploads/logos/logo-1586598113.jpg', '2020-04-11 05:11:53', '2020-04-11 05:11:53'),
(135, 30, 'App\\Models\\Logo', 'uploads/logos/logo-1586598113.jpg', '2020-04-11 05:11:53', '2020-04-11 05:11:53'),
(136, 37, 'App\\Models\\Logo', 'uploads/logos/logo-1586598530.jpg', '2020-04-11 05:18:50', '2020-04-11 05:18:50'),
(137, 38, 'App\\Models\\Logo', 'uploads/logos/logo-1586598530.jpg', '2020-04-11 05:18:50', '2020-04-11 05:18:50'),
(138, 32, 'App\\Models\\Logo', 'uploads/logos/logo-1586598584.jpg', '2020-04-11 05:19:44', '2020-04-11 05:19:44'),
(139, 32, 'App\\Models\\Logo', 'uploads/logos/logo-1586598585.jpg', '2020-04-11 05:19:45', '2020-04-11 05:19:45'),
(140, 7, 'App\\Models\\Article', 'uploads/articles/resize-1586598751.jpg', '2020-04-11 05:22:31', '2020-04-11 05:22:31'),
(141, 10, 'App\\Models\\Article', 'uploads/articles/resize-1586599530.jpg', '2020-04-11 05:35:31', '2020-04-11 05:35:31'),
(143, 39, 'App\\Models\\Logo', 'uploads/logos/logo-1586599841.jpeg', '2020-04-11 05:40:42', '2020-04-11 05:40:42'),
(144, 40, 'App\\Models\\Logo', 'uploads/logos/logo-1586599842.jpeg', '2020-04-11 05:40:42', '2020-04-11 05:40:42'),
(145, 84, 'App\\Models\\Logo', 'uploads/logos/logo-1586617114.jpeg', '2020-04-11 10:28:34', '2020-04-11 10:28:34'),
(146, 85, 'App\\Models\\Logo', 'uploads/logos/logo-1586617188.jpeg', '2020-04-11 10:29:48', '2020-04-11 10:29:48'),
(147, 86, 'App\\Models\\Logo', 'uploads/logos/logo-1586617299.jpeg', '2020-04-11 10:31:39', '2020-04-11 10:31:39'),
(148, 87, 'App\\Models\\Logo', 'uploads/logos/logo-1586622675.jpeg', '2020-04-11 12:01:17', '2020-04-11 12:01:17'),
(149, 88, 'App\\Models\\Logo', 'uploads/logos/logo-1586622704.jpg', '2020-04-11 12:01:44', '2020-04-11 12:01:44'),
(150, 89, 'App\\Models\\Logo', 'uploads/logos/logo-1586626478.jpeg', '2020-04-11 13:04:38', '2020-04-11 13:04:38'),
(153, 92, 'App\\Models\\Logo', 'uploads/logos/logo-1586631240.jpeg', '2020-04-11 14:24:01', '2020-04-11 14:24:01'),
(161, 22, 'App\\Models\\Slider', 'uploads/sliders/resize-1586710288.jpg', '2020-04-12 12:21:28', '2020-04-12 12:21:28'),
(162, 23, 'App\\Models\\Slider', 'uploads/sliders/resize-1586710553.jpg', '2020-04-12 12:22:12', '2020-04-12 12:25:53');

-- --------------------------------------------------------

--
-- Table structure for table `posts`
--

CREATE TABLE `posts` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `title` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `body` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `posts`
--

INSERT INTO `posts` (`id`, `title`, `body`, `created_at`, `updated_at`) VALUES
(1, 'post 1', 'post detailes post detailes post detailes', NULL, NULL),
(3, 'لاراول', 'افزودن پست جدیدافزودن پست جدیدافزودن پست جدیدافزودن پست جدیدافزو پست جدید', '2020-04-06 12:21:20', '2020-04-06 12:48:39'),
(6, 'فروشنده۲', 'افزودن پست جدیدافزودن پست جدیدافزودن پست جدیدافزودن پست جدید', '2020-04-07 05:12:10', '2020-04-07 05:12:10');

-- --------------------------------------------------------

--
-- Table structure for table `products`
--

CREATE TABLE `products` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `user_id` bigint(20) NOT NULL,
  `category_id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `price` int(11) NOT NULL,
  `discount` int(11) NOT NULL,
  `status` enum('0','1') COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT '0',
  `special` enum('0','1') COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT '0',
  `count` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `countsale` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `products`
--

INSERT INTO `products` (`id`, `user_id`, `category_id`, `name`, `price`, `discount`, `status`, `special`, `count`, `countsale`, `created_at`, `updated_at`) VALUES
(29, 1, 1, 'پیراهن ساحلی زنانه', 62000, 10, '1', '1', '5', '0', '2020-03-30 12:23:01', '2020-03-30 12:24:27'),
(30, 1, 1, 'پیراهن ساحلی زنانه', 62000, 10, '1', '1', '5', '4', '2020-03-30 12:24:14', '2020-03-30 12:24:14'),
(31, 1, 1, 'مانتو زنانه مدل 2068', 242000, 10, '1', '1', '10', '2', '2020-03-30 12:33:12', '2020-03-30 12:33:12'),
(32, 1, 1, 'مانتو زنانه مدل 2068', 242000, 10, '1', '1', '10', '1', '2020-03-30 12:35:08', '2020-03-30 12:35:08'),
(33, 1, 1, 'مانتو زنانه مدل 2068', 242000, 10, '1', '1', '10', '0', '2020-03-30 12:36:00', '2020-03-30 12:36:00'),
(36, 1, 1, 'sama', 22, 2, '1', '1', '3', '0', '2020-04-03 17:13:49', '2020-04-03 17:13:49');

-- --------------------------------------------------------

--
-- Table structure for table `ratings`
--

CREATE TABLE `ratings` (
  `id` int(10) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `rating` int(11) NOT NULL,
  `rateable_type` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `rateable_id` bigint(20) UNSIGNED NOT NULL,
  `user_id` bigint(20) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `ratings`
--

INSERT INTO `ratings` (`id`, `created_at`, `updated_at`, `rating`, `rateable_type`, `rateable_id`, `user_id`) VALUES
(1, '2020-04-03 17:13:49', '2020-04-03 17:13:49', 3, 'App\\Models\\Product', 36, 1),
(2, '2020-04-04 02:17:39', '2020-04-04 02:17:39', 3, 'App\\Models\\Product', 38, 1),
(3, '2020-04-04 04:10:51', '2020-04-04 04:10:51', 3, 'App\\Models\\Product', 35, 1),
(4, '2020-04-04 04:11:03', '2020-04-04 04:11:03', 2, 'App\\Models\\Product', 34, 1),
(5, '2020-04-04 04:11:13', '2020-04-04 04:11:13', 5, 'App\\Models\\Product', 33, 1),
(6, '2020-04-04 04:11:23', '2020-04-04 04:11:23', 1, 'App\\Models\\Product', 32, 1),
(7, '2020-04-04 04:11:34', '2020-04-04 04:11:34', 4, 'App\\Models\\Product', 31, 1),
(8, '2020-04-04 04:17:16', '2020-04-04 04:17:16', 1, 'App\\Models\\Product', 27, 1),
(9, '2020-04-04 04:17:26', '2020-04-04 04:17:26', 5, 'App\\Models\\Product', 28, 1),
(10, '2020-04-04 04:27:58', '2020-04-04 04:27:58', 3, 'App\\Models\\Product', 35, 1),
(11, '2020-04-04 04:28:29', '2020-04-04 04:28:29', 2, 'App\\Models\\Product', 34, 1),
(12, '2020-04-04 17:04:27', '2020-04-04 17:04:27', 4, 'App\\Models\\Product', 30, 1),
(13, '2020-04-04 17:04:45', '2020-04-04 17:04:45', 4, 'App\\Models\\Product', 30, 1),
(14, '2020-04-04 17:06:24', '2020-04-04 17:06:24', 2, 'App\\Models\\Product', 30, 1),
(15, '2020-04-04 17:14:40', '2020-04-04 17:14:40', 4, 'App\\Models\\Product', 30, 1),
(16, '2020-04-04 17:17:22', '2020-04-04 17:17:22', 1, 'App\\Models\\Product', 30, 1),
(17, '2020-04-04 17:20:45', '2020-04-04 17:20:45', 2, 'App\\Models\\Product', 30, 1),
(18, '2020-04-04 17:46:32', '2020-04-04 17:46:32', 3, 'App\\Models\\Product', 31, 1),
(19, '2020-04-05 04:59:30', '2020-04-05 04:59:30', 3, 'App\\Models\\Article', 3, 1),
(20, '2020-04-05 05:00:59', '2020-04-05 05:00:59', 2, 'App\\Models\\Article', 3, 1),
(21, '2020-04-07 09:46:33', '2020-04-07 09:46:33', 5, 'App\\Models\\Product', 36, 1),
(22, '2020-04-07 09:46:52', '2020-04-07 09:46:52', 2, 'App\\Models\\Product', 36, 1);

-- --------------------------------------------------------

--
-- Table structure for table `roles`
--

CREATE TABLE `roles` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `title` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `roles`
--

INSERT INTO `roles` (`id`, `name`, `title`, `created_at`, `updated_at`) VALUES
(1, 'Super_Admin', 'مدیرارشد', '2020-03-26 09:57:55', '2020-03-26 09:57:55'),
(3, 'وییییییییییزه است', 'وردپرسssssssssss', '2020-04-12 07:48:20', '2020-04-12 07:48:20');

-- --------------------------------------------------------

--
-- Table structure for table `role_user`
--

CREATE TABLE `role_user` (
  `role_id` bigint(20) UNSIGNED NOT NULL,
  `user_id` bigint(20) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `role_user`
--

INSERT INTO `role_user` (`role_id`, `user_id`, `created_at`, `updated_at`) VALUES
(1, 1, NULL, NULL),
(3, 1, NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `sliders`
--

CREATE TABLE `sliders` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `url` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `text` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `sliders`
--

INSERT INTO `sliders` (`id`, `name`, `url`, `text`, `created_at`, `updated_at`) VALUES
(11, 'home-slider-1', '#', NULL, '2020-03-30 07:24:51', '2020-03-30 07:24:51'),
(12, 'home-slider-2', '#', NULL, '2020-03-30 07:25:06', '2020-03-30 07:25:06'),
(13, 'home-slider-3', '#', NULL, '2020-03-30 07:25:36', '2020-03-30 07:25:36'),
(14, 'banner-1', '#', NULL, '2020-03-30 15:51:58', '2020-03-30 15:51:58'),
(15, 'banner-1', '#', NULL, '2020-03-30 15:52:29', '2020-03-30 15:58:09'),
(17, 'banner-1', '#', NULL, '2020-03-30 15:56:16', '2020-03-30 15:58:17'),
(18, 'banner-2', '#', NULL, '2020-03-30 16:35:27', '2020-03-30 16:35:27'),
(19, 'banner-2', '#', NULL, '2020-03-30 16:35:53', '2020-03-30 16:35:53'),
(22, 'وییییییییییزه است', '#', NULL, '2020-04-12 12:21:28', '2020-04-12 12:21:28'),
(23, 'وییییییییییزه است', '#', NULL, '2020-04-12 12:22:12', '2020-04-12 12:22:12');

-- --------------------------------------------------------

--
-- Table structure for table `subcategories`
--

CREATE TABLE `subcategories` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `title` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `body` text COLLATE utf8mb4_unicode_ci,
  `parent_id` bigint(20) UNSIGNED NOT NULL,
  `category_id` bigint(20) UNSIGNED NOT NULL,
  `type` int(11) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `subcategories`
--

INSERT INTO `subcategories` (`id`, `name`, `title`, `body`, `parent_id`, `category_id`, `type`, `created_at`, `updated_at`) VALUES
(12, 'cloth', 'لباس', '', 0, 1, 1, '2020-03-27 12:52:50', '2020-03-27 12:52:50'),
(13, 'shoes', 'کفش', '', 0, 1, 1, '2020-03-27 12:52:50', '2020-03-27 12:52:50'),
(14, 'bag', 'کیف', '', 0, 1, 1, '2020-03-27 12:52:50', '2020-03-27 12:52:50'),
(15, 'jewrilies', 'زیورالات', '', 0, 1, 1, '2020-03-27 12:52:50', '2020-03-27 12:52:50'),
(16, 'cloth', 'لباس', '', 0, 3, 1, '2020-03-27 12:53:59', '2020-03-27 12:53:59'),
(17, 'shoes', 'کفش', '', 0, 3, 1, '2020-03-27 12:53:59', '2020-03-27 12:53:59'),
(18, 'bag', 'کیف', '', 0, 3, 1, '2020-03-27 12:53:59', '2020-03-27 16:22:37'),
(19, 'jewrilies', 'زیورالات', '', 0, 3, 1, '2020-03-27 12:54:00', '2020-03-27 12:54:00'),
(24, 'cloth-formal', 'لباس مجلسی', '', 12, 1, 1, '2020-03-30 09:07:45', '2020-03-30 09:07:45'),
(25, 'women-manto', 'مانتو', NULL, 12, 1, 1, '2020-03-30 09:07:45', '2020-03-30 09:07:45'),
(26, 'women-jacket', 'پالتو,کاپشن و بارانی', NULL, 12, 1, 1, '2020-03-30 09:07:45', '2020-03-30 09:07:45'),
(27, 'women-baft', 'بافت,ژاکت و پولیور', NULL, 12, 1, 1, '2020-03-30 09:07:45', '2020-03-30 09:07:45'),
(28, 'women-scarve', 'شال و روسری', NULL, 12, 1, 1, '2020-03-30 09:07:45', '2020-03-30 09:07:45'),
(29, 'women-chador', 'چادرومقنعه', NULL, 12, 1, 1, '2020-03-30 09:07:46', '2020-03-30 09:07:46'),
(30, 'women-shalvar', 'شلواروساپورت', NULL, 12, 1, 1, '2020-03-30 09:07:46', '2020-03-30 09:07:46'),
(31, 'women-skirt-short', 'دامن و شلوارک', NULL, 12, 1, 1, '2020-03-30 09:07:46', '2020-03-30 09:07:46'),
(32, 'women-shoe-high', 'کفش پاشنه بلند', NULL, 13, 1, 1, '2020-03-30 10:03:58', '2020-03-30 10:03:58'),
(33, 'women-shoe-boot', 'بوت و نیم بوت', NULL, 13, 1, 1, '2020-03-30 10:03:58', '2020-03-30 10:03:58'),
(34, 'women-shoe-sport', 'کفش ورزشی', NULL, 13, 1, 1, '2020-03-30 10:03:58', '2020-03-30 10:03:58'),
(35, 'women-shoe-flat', 'کفش تخت', NULL, 13, 1, 1, '2020-03-30 10:03:58', '2020-03-30 10:03:58'),
(36, 'women-shoe-sandal', 'صندل', NULL, 13, 1, 1, '2020-03-30 10:03:58', '2020-03-30 10:03:58'),
(37, 'women-shoe-slipper', 'دمپایی و روفرشی', NULL, 13, 1, 1, '2020-03-30 10:03:58', '2020-03-30 10:03:58'),
(38, 'women-shoe-kalej', 'کالج', NULL, 13, 1, 1, '2020-03-30 10:03:58', '2020-03-30 10:03:58'),
(39, 'women-bag-back', 'کیف و کوله', NULL, 14, 1, 1, '2020-03-30 10:08:26', '2020-03-30 10:08:26'),
(40, 'women-bag-formal', 'کیف مجلسی', NULL, 14, 1, 1, '2020-03-30 10:08:26', '2020-03-30 10:08:26'),
(41, 'women-bag-wallet', 'کیف پول', NULL, 14, 1, 1, '2020-03-30 10:08:26', '2020-03-30 10:08:26'),
(42, 'women-bag-hand', 'کیف دستی', NULL, 14, 1, 1, '2020-03-30 10:08:26', '2020-03-30 10:08:26'),
(43, 'women-bag-doshi', 'کیف دوشی', NULL, 14, 1, 1, '2020-03-30 10:08:26', '2020-03-30 10:08:26'),
(44, 'women-bag-pasporti', 'کیف پاسپورتی', NULL, 14, 1, 1, '2020-03-30 10:08:26', '2020-03-30 10:08:26'),
(45, 'women-bag-sport', 'ساک ورزشی', NULL, 14, 1, 1, '2020-03-30 10:08:26', '2020-03-30 10:08:26'),
(46, 'women-bag-chamedan', 'چمدان', NULL, 14, 1, 1, '2020-03-30 10:08:26', '2020-03-30 10:08:26'),
(47, 'women-gushvare', 'گوشواره', NULL, 15, 1, 1, '2020-03-30 10:10:38', '2020-03-30 10:10:38'),
(48, 'women-ring', 'انگشتر', NULL, 15, 1, 1, '2020-03-30 10:10:39', '2020-03-30 10:10:39'),
(49, 'men-tshert', 'تیشرت', NULL, 16, 3, 1, '2020-03-30 10:26:24', '2020-03-30 10:26:24'),
(50, 'men-shirt', 'پیراهن', NULL, 16, 3, 1, '2020-03-30 10:26:24', '2020-03-30 10:26:24'),
(51, 'men-baft', 'بافت و پلیور', NULL, 16, 3, 1, '2020-03-30 10:26:24', '2020-03-30 10:26:24'),
(52, 'men-jeliqe', 'جلیقه و ژاکت', NULL, 16, 3, 1, '2020-03-30 10:26:24', '2020-03-30 10:26:24'),
(53, 'men-kot', 'کت و پالتو', NULL, 16, 3, 1, '2020-03-30 10:26:24', '2020-03-30 10:26:24'),
(54, 'men-kapshan', 'سوییشرت و کاپشن', NULL, 16, 3, 1, '2020-03-30 10:26:24', '2020-03-30 10:26:24'),
(55, 'men-shalvar', 'شلوار', NULL, 16, 3, 1, '2020-03-30 10:26:24', '2020-03-30 10:26:24'),
(56, 'men-kerovat', 'کروات', NULL, 16, 3, 1, '2020-03-30 10:26:24', '2020-03-30 10:26:24'),
(57, 'men-shoe-boot', 'بوت و نیم بوت', NULL, 17, 3, 1, '2020-03-30 10:28:48', '2020-03-30 10:28:48'),
(58, 'men-shoe-sport', 'کفش ورزشی', NULL, 17, 3, 1, '2020-03-30 10:28:48', '2020-03-30 10:28:48'),
(59, 'men-shoe-kalej', 'کالج', NULL, 17, 3, 1, '2020-03-30 10:28:48', '2020-03-30 10:28:48'),
(60, 'men-shoe-flat', 'کفش تخت', NULL, 17, 3, 1, '2020-03-30 10:28:48', '2020-03-30 10:28:48'),
(61, 'men-shoe-sandal', 'صندل', NULL, 17, 3, 1, '2020-03-30 10:28:48', '2020-03-30 10:28:48'),
(62, 'men-shoe-dampai', 'دمپایی روفرشی', NULL, 17, 3, 1, '2020-03-30 10:28:48', '2020-03-30 10:28:48'),
(63, 'men-bag-back', 'کیف کوله', NULL, 18, 3, 1, '2020-03-30 10:29:59', '2020-03-30 10:29:59'),
(64, 'men-bag-wallet', 'کیف پول', NULL, 18, 3, 1, '2020-03-30 10:29:59', '2020-03-30 10:29:59'),
(65, 'men-bag-hand', 'کیف دستی', NULL, 18, 3, 1, '2020-03-30 10:29:59', '2020-03-30 10:29:59'),
(66, 'boy', 'دخترانه', NULL, 0, 2, 1, '2020-03-30 14:18:10', '2020-03-30 14:18:10'),
(67, 'girl', 'پسرانه', NULL, 0, 2, 1, '2020-03-30 14:18:10', '2020-03-30 14:18:10'),
(68, 'baby', 'نوزاد', NULL, 0, 2, 1, '2020-03-30 14:18:10', '2020-03-30 14:18:10');

-- --------------------------------------------------------

--
-- Table structure for table `taggables`
--

CREATE TABLE `taggables` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `tag_id` bigint(20) UNSIGNED NOT NULL,
  `taggable_id` bigint(20) UNSIGNED NOT NULL,
  `taggable_type` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `taggables`
--

INSERT INTO `taggables` (`id`, `tag_id`, `taggable_id`, `taggable_type`, `created_at`, `updated_at`) VALUES
(1, 9, 9, 'App\\Models\\Product', NULL, NULL),
(3, 1, 12, 'App\\Models\\Product', NULL, NULL),
(4, 2, 12, 'App\\Models\\Product', NULL, NULL),
(6, 4, 12, 'App\\Models\\Product', NULL, NULL),
(7, 1, 13, 'App\\Models\\Product', NULL, NULL),
(8, 2, 13, 'App\\Models\\Product', NULL, NULL),
(12, 5, 14, 'App\\Models\\Product', NULL, NULL),
(16, 8, 2, 'App\\Models\\Category', NULL, NULL),
(19, 1, 1, 'App\\Models\\Category', NULL, NULL),
(20, 2, 15, 'App\\Models\\Product', NULL, NULL),
(21, 5, 18, 'App\\Models\\Product', NULL, NULL),
(22, 1, 20, 'App\\Models\\Product', NULL, NULL),
(23, 8, 26, 'App\\Models\\Product', NULL, NULL),
(32, 1, 2, 'App\\Models\\Article', NULL, NULL),
(33, 2, 3, 'App\\Models\\Article', NULL, NULL),
(35, 2, 4, 'App\\Models\\Category', NULL, NULL),
(36, 1, 5, 'App\\Models\\Category', NULL, NULL),
(37, 2, 5, 'App\\Models\\Category', NULL, NULL),
(42, 4, 7, 'App\\Models\\Category', NULL, NULL),
(43, 5, 3, 'App\\Models\\Category', NULL, NULL),
(50, 1, 12, 'App\\Models\\Category', NULL, NULL),
(51, 5, 13, 'App\\Models\\Category', NULL, NULL),
(52, 6, 13, 'App\\Models\\Category', NULL, NULL),
(53, 8, 13, 'App\\Models\\Category', NULL, NULL),
(54, 5, 14, 'App\\Models\\Category', NULL, NULL),
(55, 5, 15, 'App\\Models\\Category', NULL, NULL),
(56, 5, 16, 'App\\Models\\Category', NULL, NULL),
(58, 8, 18, 'App\\Models\\Category', NULL, NULL),
(60, 11, 18, 'App\\Models\\Category', NULL, NULL),
(61, 8, 9, 'App\\Models\\Category', NULL, NULL),
(64, 8, 17, 'App\\Models\\Category', NULL, NULL),
(65, 8, 6, 'App\\Models\\Category', NULL, NULL),
(73, 8, 20, 'App\\Models\\Category', NULL, NULL),
(75, 11, 20, 'App\\Models\\Category', NULL, NULL),
(77, 12, 22, 'App\\Models\\Category', NULL, NULL),
(78, 11, 21, 'App\\Models\\Category', NULL, NULL),
(80, 8, 4, 'App\\Models\\Article', NULL, NULL),
(81, 8, 5, 'App\\Models\\Article', NULL, NULL),
(82, 3, 7, 'App\\Models\\Article', NULL, NULL),
(83, 11, 8, 'App\\Models\\Article', NULL, NULL),
(84, 11, 9, 'App\\Models\\Article', NULL, NULL),
(85, 11, 10, 'App\\Models\\Article', NULL, NULL),
(86, 11, 11, 'App\\Models\\Article', NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `tags`
--

CREATE TABLE `tags` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `tags`
--

INSERT INTO `tags` (`id`, `name`, `created_at`, `updated_at`) VALUES
(3, 'وییییییییییزه است', '2020-04-07 13:28:20', '2020-04-07 13:28:20'),
(12, 'بوت', '2020-03-30 12:11:08', '2020-03-30 12:11:08'),
(14, 'mmmmmmmm', '2020-04-07 13:40:23', '2020-04-07 13:40:23'),
(15, 'وییییییییییزه است', '2020-04-07 13:48:19', '2020-04-07 13:48:19'),
(16, 'محصول جدیدmmmmmmmmmmmm', '2020-04-07 14:12:46', '2020-04-07 14:12:46');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `password` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `level` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'user',
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `verified` tinyint(1) NOT NULL DEFAULT '0',
  `verification_token` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `name`, `email`, `email_verified_at`, `password`, `level`, `remember_token`, `created_at`, `updated_at`, `verified`, `verification_token`) VALUES
(1, 'asiye', 'a@gmail.com', NULL, '$2y$10$kdzGmxA/yr7xsyWPaAjPQO9U.VOLWzyQvlePdQhfewHp1Exhi0OWu', 'admin', NULL, '2020-03-26 09:53:13', '2020-03-26 09:53:13', 1, 'c7501d9952919bd570b39c44aafbeba943a2055af986e6e6ed6ea7c3698ed1cc');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `articles`
--
ALTER TABLE `articles`
  ADD PRIMARY KEY (`id`),
  ADD KEY `fk_articles_users` (`user_id`),
  ADD KEY `fk_articles_categories` (`category_id`);

--
-- Indexes for table `attributes`
--
ALTER TABLE `attributes`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `attribute_subcategories`
--
ALTER TABLE `attribute_subcategories`
  ADD PRIMARY KEY (`id`),
  ADD KEY `fk_attribute_subcategories_attributes` (`attribute_id`),
  ADD KEY `fk_attribute_subcategories_subcategories` (`subcategory_id`),
  ADD KEY `fk_attribute_subcategories_products` (`product_id`);

--
-- Indexes for table `baskets`
--
ALTER TABLE `baskets`
  ADD PRIMARY KEY (`id`),
  ADD KEY `fk_baskets_users` (`user_id`),
  ADD KEY `fk_baskets_products` (`product_id`);

--
-- Indexes for table `books`
--
ALTER TABLE `books`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `categories`
--
ALTER TABLE `categories`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `commentables`
--
ALTER TABLE `commentables`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `comments`
--
ALTER TABLE `comments`
  ADD PRIMARY KEY (`id`),
  ADD KEY `fk_comments_users` (`user_id`);

--
-- Indexes for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `informations`
--
ALTER TABLE `informations`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `logos`
--
ALTER TABLE `logos`
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
-- Indexes for table `permissions`
--
ALTER TABLE `permissions`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `permission_role`
--
ALTER TABLE `permission_role`
  ADD PRIMARY KEY (`role_id`,`permission_id`),
  ADD KEY `permission_role_permission_id_foreign` (`permission_id`);

--
-- Indexes for table `photos`
--
ALTER TABLE `photos`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `posts`
--
ALTER TABLE `posts`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `products`
--
ALTER TABLE `products`
  ADD PRIMARY KEY (`id`),
  ADD KEY `fk_products_categories` (`category_id`);

--
-- Indexes for table `ratings`
--
ALTER TABLE `ratings`
  ADD PRIMARY KEY (`id`),
  ADD KEY `ratings_rateable_type_rateable_id_index` (`rateable_type`,`rateable_id`),
  ADD KEY `ratings_rateable_id_index` (`rateable_id`),
  ADD KEY `ratings_rateable_type_index` (`rateable_type`),
  ADD KEY `ratings_user_id_foreign` (`user_id`);

--
-- Indexes for table `roles`
--
ALTER TABLE `roles`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `role_user`
--
ALTER TABLE `role_user`
  ADD PRIMARY KEY (`role_id`,`user_id`),
  ADD KEY `role_user_user_id_foreign` (`user_id`);

--
-- Indexes for table `sliders`
--
ALTER TABLE `sliders`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `subcategories`
--
ALTER TABLE `subcategories`
  ADD PRIMARY KEY (`id`),
  ADD KEY `subcategories_category_id_foreign` (`category_id`);

--
-- Indexes for table `taggables`
--
ALTER TABLE `taggables`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tags`
--
ALTER TABLE `tags`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `users_email_unique` (`email`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `articles`
--
ALTER TABLE `articles`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;
--
-- AUTO_INCREMENT for table `attributes`
--
ALTER TABLE `attributes`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;
--
-- AUTO_INCREMENT for table `attribute_subcategories`
--
ALTER TABLE `attribute_subcategories`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=71;
--
-- AUTO_INCREMENT for table `baskets`
--
ALTER TABLE `baskets`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;
--
-- AUTO_INCREMENT for table `books`
--
ALTER TABLE `books`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT for table `categories`
--
ALTER TABLE `categories`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=22;
--
-- AUTO_INCREMENT for table `commentables`
--
ALTER TABLE `commentables`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=96;
--
-- AUTO_INCREMENT for table `comments`
--
ALTER TABLE `comments`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=60;
--
-- AUTO_INCREMENT for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `informations`
--
ALTER TABLE `informations`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
--
-- AUTO_INCREMENT for table `logos`
--
ALTER TABLE `logos`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=100;
--
-- AUTO_INCREMENT for table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=27;
--
-- AUTO_INCREMENT for table `permissions`
--
ALTER TABLE `permissions`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;
--
-- AUTO_INCREMENT for table `photos`
--
ALTER TABLE `photos`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=163;
--
-- AUTO_INCREMENT for table `posts`
--
ALTER TABLE `posts`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;
--
-- AUTO_INCREMENT for table `products`
--
ALTER TABLE `products`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=37;
--
-- AUTO_INCREMENT for table `ratings`
--
ALTER TABLE `ratings`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=23;
--
-- AUTO_INCREMENT for table `roles`
--
ALTER TABLE `roles`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
--
-- AUTO_INCREMENT for table `sliders`
--
ALTER TABLE `sliders`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=24;
--
-- AUTO_INCREMENT for table `subcategories`
--
ALTER TABLE `subcategories`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=69;
--
-- AUTO_INCREMENT for table `taggables`
--
ALTER TABLE `taggables`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=87;
--
-- AUTO_INCREMENT for table `tags`
--
ALTER TABLE `tags`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;
--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
--
-- Constraints for dumped tables
--

--
-- Constraints for table `articles`
--
ALTER TABLE `articles`
  ADD CONSTRAINT `fk_articles_categories` FOREIGN KEY (`category_id`) REFERENCES `categories` (`id`) ON DELETE NO ACTION ON UPDATE CASCADE,
  ADD CONSTRAINT `fk_articles_users` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE NO ACTION ON UPDATE CASCADE;

--
-- Constraints for table `attribute_subcategories`
--
ALTER TABLE `attribute_subcategories`
  ADD CONSTRAINT `fk_attribute_subcategories_attributes` FOREIGN KEY (`attribute_id`) REFERENCES `attributes` (`id`) ON DELETE NO ACTION ON UPDATE CASCADE,
  ADD CONSTRAINT `fk_attribute_subcategories_products` FOREIGN KEY (`product_id`) REFERENCES `products` (`id`) ON DELETE NO ACTION ON UPDATE CASCADE,
  ADD CONSTRAINT `fk_attribute_subcategories_subcategories` FOREIGN KEY (`subcategory_id`) REFERENCES `subcategories` (`id`) ON DELETE NO ACTION ON UPDATE CASCADE;

--
-- Constraints for table `baskets`
--
ALTER TABLE `baskets`
  ADD CONSTRAINT `fk_baskets_products` FOREIGN KEY (`product_id`) REFERENCES `products` (`id`) ON DELETE NO ACTION ON UPDATE CASCADE,
  ADD CONSTRAINT `fk_baskets_users` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE NO ACTION ON UPDATE CASCADE;

--
-- Constraints for table `comments`
--
ALTER TABLE `comments`
  ADD CONSTRAINT `fk_comments_users` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE NO ACTION ON UPDATE CASCADE;

--
-- Constraints for table `permission_role`
--
ALTER TABLE `permission_role`
  ADD CONSTRAINT `permission_role_permission_id_foreign` FOREIGN KEY (`permission_id`) REFERENCES `permissions` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `permission_role_role_id_foreign` FOREIGN KEY (`role_id`) REFERENCES `roles` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `products`
--
ALTER TABLE `products`
  ADD CONSTRAINT `fk_products_categories` FOREIGN KEY (`category_id`) REFERENCES `categories` (`id`) ON DELETE NO ACTION ON UPDATE CASCADE;

--
-- Constraints for table `ratings`
--
ALTER TABLE `ratings`
  ADD CONSTRAINT `ratings_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`);

--
-- Constraints for table `role_user`
--
ALTER TABLE `role_user`
  ADD CONSTRAINT `role_user_role_id_foreign` FOREIGN KEY (`role_id`) REFERENCES `roles` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `role_user_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `subcategories`
--
ALTER TABLE `subcategories`
  ADD CONSTRAINT `subcategories_category_id_foreign` FOREIGN KEY (`category_id`) REFERENCES `categories` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
