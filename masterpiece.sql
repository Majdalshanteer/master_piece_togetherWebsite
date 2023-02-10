-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Feb 10, 2023 at 12:48 PM
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
-- Database: `masterpiece`
--

-- --------------------------------------------------------

--
-- Table structure for table `booking_services`
--

CREATE TABLE `booking_services` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `service_id` bigint(20) UNSIGNED DEFAULT NULL,
  `quantity` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `total_price` decimal(8,2) NOT NULL,
  `booking_date` date NOT NULL,
  `booking_time` time NOT NULL,
  `worker_id` bigint(20) UNSIGNED DEFAULT NULL,
  `user_id` bigint(20) UNSIGNED DEFAULT NULL,
  `note` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `phone` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `location` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `status` enum('Pending','confirm','not available','completed') COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'Pending',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `booking_services`
--

INSERT INTO `booking_services` (`id`, `service_id`, `quantity`, `total_price`, `booking_date`, `booking_time`, `worker_id`, `user_id`, `note`, `name`, `email`, `phone`, `location`, `status`, `created_at`, `updated_at`) VALUES
(20, 7, '10', '60.00', '2023-02-13', '14:55:00', 11, 37, 'khujkhu', 'ali', 'ali@yahoo.com', '0790152556', 'salt', 'Pending', '2023-02-02 17:53:39', '2023-02-02 17:53:39'),
(21, 1, '1', '40.00', '2023-02-22', '14:30:00', 8, 37, 'please on time', 'ali', 'ali@yahoo.com', '0790152556', 'salt', 'completed', '2023-02-03 17:31:08', '2023-02-07 15:39:06'),
(22, 8, '2', '14.00', '2023-02-27', '12:27:00', 11, 37, 'gfcghfgyhf', 'ali', 'ali@yahoo.com', '0790152556', 'salt', 'Pending', '2023-02-04 14:27:05', '2023-02-04 14:27:05'),
(24, 7, '5', '30.00', '2023-02-22', '11:01:00', 11, 5, 'be on time', 'majd', 'majdshanteer@yahoo.com', '0790152556', 'salt', 'not available', '2023-02-07 14:01:56', '2023-02-07 14:05:23'),
(27, 1, '2', '80.00', '2023-02-08', '12:34:00', 8, 55, NULL, 'muna sh', 'munaashanteer18@yahoo.com', '0772107266', 'نقب الدبور', 'not available', '2023-02-07 15:31:43', '2023-02-07 15:38:59'),
(29, 1, '2', '80.00', '2023-02-20', '11:58:00', 2, 56, NULL, 'manar', 'manar@yahoo.com', '0790152556', 'salt', 'completed', '2023-02-08 12:59:11', '2023-02-08 13:11:55'),
(30, 17, '5', '75.00', '2023-02-09', '11:37:00', 8, 37, NULL, 'ali', 'ali@yahoo.com', '0790152556', 'salt', 'Pending', '2023-02-08 14:37:33', '2023-02-08 14:37:33');

-- --------------------------------------------------------

--
-- Table structure for table `categories`
--

CREATE TABLE `categories` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `image` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `logo` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `description` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `categories`
--

INSERT INTO `categories` (`id`, `name`, `image`, `logo`, `description`, `created_at`, `updated_at`) VALUES
(1, 'Beauty & Personal Care', '20230113115348.jpg', '20230113115348.png', 'Our workers provide comprehensive services related to skin health, facial aesthetics, foot care, and nail manicures.', NULL, '2023-01-13 05:53:48'),
(2, 'Gardening', '20230113115428.jpg', '20230113115428.png', 'We can help you maintain the beauty of your current garden or give it a whole new look.', NULL, '2023-01-13 05:54:28'),
(3, 'Cleaning', '20230113115546.jpg', '20230113115546.png', 'We make sure that your place gleaming and glaring view,cleaning all parts of your house.', NULL, '2023-01-13 05:54:45'),
(4, 'Home Decorations', '20230113115504.jpg', '20230113142837.png', '', NULL, '2023-01-13 08:28:37'),
(5, 'Decorative Pillows', '20230113141530.JPG', '20230113142527.png', '', NULL, '2023-01-13 08:25:27'),
(6, 'Garden Supplies', '20230113141900.jpg', '20230113142209.png', '', NULL, '2023-01-13 08:22:09');

-- --------------------------------------------------------

--
-- Table structure for table `contacts`
--

CREATE TABLE `contacts` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `subject` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `message` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `contacts`
--

INSERT INTO `contacts` (`id`, `name`, `email`, `subject`, `message`, `created_at`, `updated_at`) VALUES
(2, 'majd', 'majd.jalshanteer@gmail.com', 'rrerrd84698469', 'nuihoujok\'[plkojh', '2023-01-23 15:20:14', '2023-01-23 15:20:14'),
(3, 'muna', 'muna@yahoo.com', 'aa', 'hfghfhghfhg', '2023-02-07 15:36:31', '2023-02-07 15:36:31');

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
(1, '2014_10_12_100000_create_password_resets_table', 1),
(2, '2019_08_19_000000_create_failed_jobs_table', 1),
(3, '2019_12_14_000001_create_personal_access_tokens_table', 1),
(4, '2022_10_23_080048_create_contacts_table', 1),
(5, '2022_10_29_072550_create_categories_table', 1),
(6, '2022_10_29_072635_create_services_table', 1),
(7, '2022_10_29_074000_create_users_table', 1),
(8, '2022_11_23_092802_create_user_services_table', 1),
(9, '2022_12_29_103114_create_booking_services_table', 1),
(10, '2023_01_10_142126_create_ratings_table', 1),
(11, '2023_01_14_085337_create_website_ratings_table', 1),
(12, '2023_01_31_093940_create_work_samples_table', 1),
(13, '2023_10_20_090533_create_order_details_table', 1),
(14, '2024_10_20_131840_create_order_items_table', 1),
(15, '2014_10_12_100000_create_password_resets_table', 1),
(16, '2019_08_19_000000_create_failed_jobs_table', 1),
(17, '2019_12_14_000001_create_personal_access_tokens_table', 1),
(18, '2022_10_23_080048_create_contacts_table', 1),
(19, '2022_10_29_072550_create_categories_table', 1),
(20, '2022_10_29_072635_create_services_table', 1),
(21, '2022_10_29_074000_create_users_table', 1),
(22, '2022_11_23_092802_create_user_services_table', 1),
(23, '2022_12_29_103114_create_booking_services_table', 1),
(24, '2023_01_10_142126_create_ratings_table', 1),
(25, '2023_01_14_085337_create_website_ratings_table', 1),
(26, '2023_01_31_093940_create_work_samples_table', 1),
(27, '2023_10_20_090533_create_order_details_table', 1),
(28, '2024_10_20_131840_create_order_items_table', 1);

-- --------------------------------------------------------

--
-- Table structure for table `order_details`
--

CREATE TABLE `order_details` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `user_id` bigint(20) UNSIGNED NOT NULL,
  `total` decimal(8,2) NOT NULL,
  `status` enum('Pending','on the way','delivered') COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'Pending',
  `note` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `address` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `phone` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` date DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `order_details`
--

INSERT INTO `order_details` (`id`, `user_id`, `total`, `status`, `note`, `address`, `phone`, `created_at`, `updated_at`) VALUES
(1, 37, '70.00', 'delivered', 'salt', 'salt', '0790152556', '2023-02-03', '2023-02-09 06:45:29'),
(2, 37, '26.00', 'Pending', NULL, 'salt', '0790152556', '2023-02-03', '2023-02-03 16:51:23'),
(3, 37, '52.00', 'Pending', 'drr', 'errre', '0790152556', '2023-02-04', '2023-02-04 14:28:50'),
(5, 5, '70.00', 'Pending', 'don\'t late', 'salt', '0790152556', '2023-02-07', '2023-02-07 14:00:38'),
(6, 55, '220.00', 'delivered', NULL, 'نقب الدبور', '0772107266', '2023-02-07', '2023-02-08 13:07:10'),
(8, 56, '61.00', 'Pending', '-', 'salt', '0790152556', '2023-02-08', '2023-02-08 12:57:39'),
(9, 37, '41.00', 'Pending', NULL, 'salt', '0790152556', '2023-02-08', '2023-02-08 14:38:12');

-- --------------------------------------------------------

--
-- Table structure for table `order_items`
--

CREATE TABLE `order_items` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `order_details_id` bigint(20) UNSIGNED NOT NULL,
  `service_id` bigint(20) UNSIGNED NOT NULL,
  `amount` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `order_items`
--

INSERT INTO `order_items` (`id`, `order_details_id`, `service_id`, `amount`) VALUES
(1, 1, 39, 1),
(2, 1, 38, 1),
(3, 1, 25, 1),
(4, 1, 27, 1),
(5, 1, 29, 1),
(6, 1, 30, 1),
(7, 2, 25, 1),
(8, 2, 26, 1),
(9, 3, 24, 2),
(10, 3, 29, 2),
(15, 5, 30, 1),
(16, 5, 25, 1),
(17, 5, 27, 1),
(18, 5, 28, 3),
(19, 6, 36, 1),
(20, 6, 29, 1),
(21, 6, 30, 10),
(25, 8, 25, 1),
(26, 8, 26, 1),
(27, 8, 27, 1),
(28, 8, 30, 1),
(29, 8, 29, 1),
(30, 9, 28, 1),
(31, 9, 27, 1),
(32, 9, 26, 1),
(33, 9, 25, 1);

-- --------------------------------------------------------

--
-- Table structure for table `password_resets`
--

CREATE TABLE `password_resets` (
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `password_resets`
--

INSERT INTO `password_resets` (`email`, `token`, `created_at`) VALUES
('ali@yahoo.com', '$2y$10$iNXjBDBpALWi/ZA35hr0sOkUcCiXplLB9yGAGQYYrdBXX6pSnOQNW', '2023-01-29 09:58:24');

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
  `expires_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `ratings`
--

CREATE TABLE `ratings` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `user_id` bigint(20) UNSIGNED DEFAULT NULL,
  `worker_id` bigint(20) UNSIGNED DEFAULT NULL,
  `rate` enum('1','2','3','4','5') COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT '3',
  `comment` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` date DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `ratings`
--

INSERT INTO `ratings` (`id`, `user_id`, `worker_id`, `rate`, `comment`, `created_at`, `updated_at`) VALUES
(4, 5, 9, '5', 'perfect', NULL, NULL),
(7, 4, 8, '4', 'perfect job', NULL, NULL),
(8, 5, 8, '5', 'perfect', NULL, NULL),
(9, 5, 11, '5', 'perfect', '2023-01-21', '2023-01-21 04:29:22'),
(11, 37, 11, '4', 'on time', '2023-01-29', '2023-01-29 00:47:48'),
(12, 37, 2, '4', 'Amazing work', NULL, NULL),
(26, 37, 40, '5', 'good', '2023-02-04', '2023-02-04 14:29:46');

-- --------------------------------------------------------

--
-- Table structure for table `services`
--

CREATE TABLE `services` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `service_name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `image` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `image2` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT '_',
  `image3` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT '_',
  `image4` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT '_',
  `type` enum('book_unit','book_hr','book_m2','cart') COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'book_unit',
  `price` decimal(8,2) NOT NULL DEFAULT 0.00,
  `description` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `category_id` bigint(20) UNSIGNED DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `services`
--

INSERT INTO `services` (`id`, `service_name`, `image`, `image2`, `image3`, `image4`, `type`, `price`, `description`, `category_id`, `created_at`, `updated_at`) VALUES
(1, 'Makeup', '20221125114725.jpg', '20230114182546.jpeg', '20230114182546.jpg', '20230114182546.jpg', 'book_unit', '40.00', 'Treat yourself or your loved one to a makeup service by one of the professional makeup artists.Whether you’re after a natural, daytime makeup look or amplified special occasion makeup, our in-store makeup services will bring your beauty vision to life.', 1, NULL, '2023-02-05 07:06:28'),
(3, '1pc Marble Decor Print Cushion Cover Without Filler', '20230113163610.JPG', '20230113163610.jpg', '20230113163610.jpg', '20230113163610.JPG', 'cart', '10.00', 'Material:	Fabric Color:	Multicolor Composition:	100% Polyester Type:	Pillowcases', 5, NULL, '2023-01-13 07:36:10'),
(4, '1pc Appliques Decor Cushion Cover Without Filler', '20230113164351.jpg', '20230113164351.jpg', '20230113164351.webp', '20230113164351.jpg', 'cart', '15.00', 'Material:	Fabric Color:	White Style:	Pastorale Composition:	100% Polyester Pattern Type:	Floral Details:	Flowers Type:	Pillowcases', 5, NULL, '2023-01-13 07:43:51'),
(7, 'Removal of weeds', '20221125110028.jpg', '20230114191309.jpg', '20230114191309.jpeg', '20230114191309.jpg', 'book_hr', '6.00', 'Weeds interact with landscape plants for water and nutrients. the perfect time to manage weeds is to remove them before they produce flowers and seeds.\r\nTo prevent its spreading, your best option is to cut down weeds. p.', 2, NULL, '2023-01-14 13:13:09'),
(8, 'Trimming of hedges', '20221125110531.jpeg', '20230114192358.jpg', '20230114192358.jpg', '20230114192358.jpg', 'book_hr', '7.00', 'As the winter ends and days get longer, the sun shines warmer, and our bushes  grow bigger and need some maintenance so they don’t get out of control and cover your windows and doors. Hedge trimming requires the use of manual or electric clippers.', 2, NULL, '2023-01-14 13:23:58'),
(9, 'Planting new trees and plants', '20221125110729.jpg', '20230114192705.jpg', '20230114192705.jpg', '20230114192705.jpg', 'book_hr', '10.00', 'With a little luck and good timing, sometimes simply sticking a tree in the ground and walking away can be enough for it to survive. But knowing how to plant a tree the right way, will ensure success every time.', 2, NULL, '2023-01-14 13:27:05'),
(11, '1pc Iron material Gardening Shovel', '20230113175353.jpg', '20230113175353.jpg', '20230113175353.jpg', '20230113175353.jpg', 'cart', '8.00', 'Color:	Black, Material:	Iron, Type:	Gardening Tools.', 6, '2022-11-23 23:15:14', '2023-02-07 07:08:52'),
(12, 'Carpets cleaning', '20221125112005.jpg', '20230114193306.jpg', '20230114193306.jpg', '20230114193306.jpg', 'book_hr', '5.00', 'Whether you have carpeting or area rugs, regular vacuuming at least once per week is a must—more frequently if you have pets or kids. Spills and stains should be treated as quickly as possible.', 3, '2022-11-23 23:20:05', '2023-01-14 13:33:06'),
(13, 'Apartment Cleaning', '20221125112335.jpg', '20230114193650.jpg', '20230114193650.jpg', '20230114193650.jpg', 'book_hr', '7.00', 'Apartments are smaller spaces that deserve the same attention to detail and top-to-bottom clean provided for any living space. we provide expert cleaning services for apartments, condominiums, rentals, and all types of spaces you call home.', 3, '2022-11-23 23:23:35', '2023-01-14 13:36:50'),
(15, 'Kitchen Cleaning', '20221125113047.jpeg', '20230114193914.jpeg', '20230114193914.jpg', '20230114193914.jpg', 'book_hr', '6.00', 'Kitchen cleaning can seem never-ending, especially with us all spending more time at home than we ever have before.', 3, '2022-11-23 23:28:35', '2023-01-14 13:39:14'),
(16, 'Hair Cut', '20221125114019.jpg', '20230114185622.jpg', '20230114185622.jpg', '20230114185622.jpg', 'book_unit', '8.00', 'We offer high-quality haircuts from highly trained, professional stylists. You\'ll be sure to get an up-to-date, on-trend style that\'s right for you.', 1, '2022-11-23 23:40:19', '2023-01-14 12:56:22'),
(17, 'Hair Dye', '20221125114252.jpg', '20230114190149.jpg', '20230114190149.jpg', '20230114190149.jpg', 'book_unit', '15.00', 'Say hello to your new look from home. Whatever color of the rainbow you’ve always wanted to try, you’ll find it in our range of hair colorants. Now you can go blonde, brunette, auburn, black, and red, without a trip to the salon.', 1, '2022-11-23 23:42:52', '2023-01-14 13:01:49'),
(23, '1pc Flower Decor Cushion Cover Without Filler', '20230113164737.jpg', '20230113164737.jpg', '20230113164737.jpg', '20230113164737.jpg', 'cart', '20.00', 'Material:	Fabric Color:	Royal Blue Composition:	100% Polyester Occasion:	Daily Type:	Pillowcases', 5, '2023-01-13 02:28:30', '2023-01-13 07:47:37'),
(24, '1pc Flower Decor Cushion Cover Without Filler', '20230113165258.jpg', '20230113165258.jpg', '20230113165258.jpg', '20230113165258.jpg', 'cart', '16.00', 'Material:	Fabric, Color:	White, Composition:	100%, Polyester Occasion:	Daily ,Type:	Pillowcases.', 5, '2023-01-13 02:33:22', '2023-01-13 07:52:58'),
(25, '1pc Woven Leaf Design Wall Hanging', '20230207095203.webp', '20230207095203.webp', '20230207095244.webp', '20230207095203.webp', 'cart', '12.00', 'Color:	Multicolor\r\nMaterial:	Polyester\r\nComposition:	100% Polyester\r\nType:	Macrame Wall Hangings', 4, '2023-01-13 08:26:42', '2023-02-07 06:53:21'),
(26, '1pc Color Block Tassel Wall Hanging', '20230207100254.webp', '20230207100254.webp', '20230207100254.webp', '20230207100254.webp', 'cart', '11.00', 'Color:	Multicolor\r\nMaterial:	Wood\r\nType:	Tassel Wall Hangings', 4, '2023-01-13 08:30:35', '2023-02-07 07:02:54'),
(27, '1pc Geometric Decor Wall Hanging', '20230113173407.jpg', '20230113173407.jpg', '20230113173407.jpg', '20230113173407.jpg', 'cart', '8.00', 'Color:	Multicolor,\r\nMaterial:	Wood,\r\nType:	Wall Hangings.', 4, '2023-01-13 08:34:07', '2023-01-13 08:34:07'),
(28, '4pcs Flower Embroidery  Wall Hanging', '20230113173719.jpg', '20230113173719.jpg', '20230113173719.jpg', '20230113173719.jpg', 'cart', '10.00', 'Color:	Multicolor,\r\nMaterial:	Polyester,\r\nComposition:	100% Polyester,\r\nType:	Wall Hangings.', 4, '2023-01-13 08:37:19', '2023-01-15 08:20:54'),
(29, '1pc Multifunction Gardening Scissors', '20230113175555.jpg', '20230113175555.jpg', '20230113175555.jpg', '20230113175555.jpg', 'cart', '10.00', 'Color:	Multicolor,\r\nMaterial:	Hadfield Steel,\r\nType:	Pruning Shears.', 6, '2023-01-13 08:55:55', '2023-01-13 08:55:55'),
(30, '1pc Portable Watering Nozzle Gardening', '20230113175829.jpg', '20230113175829.jpg', '20230113175829.jpg', '20230113175829.jpg', 'cart', '20.00', 'Color:	Multicolor, Material:	ABS, Type:	Nozzles & Spray Guns.', 6, '2023-01-13 08:58:29', '2023-02-07 07:09:43'),
(31, '1pc High Pressure Watering Gun Gardening', '20230113180100.jpg', '20230113180100.jpg', '20230113180100.jpg', '20230113180100.jpg', 'cart', '24.00', 'Color:	Multicolor,\r\nMaterial:	Plastic,\r\nType:	Nozzles & Spray Guns.', 6, '2023-01-13 09:01:00', '2023-02-07 07:09:29'),
(32, '1pc Plain Flower Vase', '20230129111207.webp', '20230129111207.webp', '20230129111207.webp', '20230129111207.webp', 'cart', '15.00', 'Color:	Gold\r\nMaterial:	Iron', 4, '2023-01-29 08:12:07', '2023-01-29 08:12:07'),
(33, '1pc Braided Design Wall Hanging', '20230129111538.webp', '20230129111538.webp', '20230129111538.webp', '20230129111538.webp', 'cart', '17.00', 'Color:	Beige\r\nMaterial:	Polyester\r\nComposition:	100% Polyester\r\nType:	Macrame Wall Hangings', 4, '2023-01-29 08:15:38', '2023-01-29 08:15:38'),
(34, '1pc Woven Wall Hanging Basket', '20230129111819.webp', '20230129111819.webp', '20230129111819.webp', '20230129111819.webp', 'cart', '14.00', 'Color:	Beige\r\nMaterial:	Polyester\r\nComposition:	100% Polyester\r\nType:	Macrame Wall Hangings', 4, '2023-01-29 08:18:19', '2023-01-29 08:18:19'),
(35, '1pc Woven Wall Hanging', '20230129112318.webp', '20230129112318.webp', '20230129112318.webp', '20230129112318.webp', 'cart', '12.00', 'Color:	Multicolor\r\nMaterial:	Polyester\r\nComposition:	100% Polyester\r\nType:	Macrame Wall Hangings', 4, '2023-01-29 08:23:18', '2023-01-29 08:23:18'),
(36, '1pc Donut Shaped Decorative Pillow with filler', '20230129112724.webp', '20230129112724.webp', '20230129112724.webp', '20230129112724.webp', 'cart', '10.00', 'Color:	Multicolor\r\nMaterial:	Polyester\r\nFilling:	Polyester\r\nComposition:	100% Polyester', 5, '2023-01-29 08:27:24', '2023-01-30 04:54:41'),
(37, '1pc Flower Pattern Body Pillowcase Without Filler', '20230129113038.webp', '20230129113038.webp', '20230129113038.webp', '20230129113038.webp', 'cart', '7.00', 'Color:	Multicolor\r\nMaterial:	Fabric\r\nComposition:	100% Polyester\r\nPattern Type:	Floral\r\nType:	Pillowcase', 5, '2023-01-29 08:30:38', '2023-01-29 08:30:38'),
(38, '2pcs Chevron Tufted Pillowcase Without Filler', '20230129113240.webp', '20230129113240.webp', '20230129113240.webp', '20230129113240.webp', 'cart', '8.00', 'Color:	White\r\nMaterial:	Fabric\r\nComposition:	100% Polyester\r\nPattern Type:	Plain\r\nType:	Pillowcase', 5, '2023-01-29 08:32:40', '2023-01-29 08:32:40'),
(39, '4pcs Flower & Plant Print Pillowcase Without Filler', '20230129113540.webp', '20230129113540.webp', '20230129113540.webp', '20230129113540.webp', 'cart', '12.00', 'Color:	Multicolor\r\nMaterial:	Fabric\r\nComposition:	100% Polyester\r\nPattern Type:	Floral, Plants\r\nType:	Pillowcase', 5, '2023-01-29 08:35:40', '2023-01-29 08:35:40'),
(40, '1pc Stainless Steel Gardening  Scissor', '20230129113805.webp', '20230129113805.webp', '20230129113805.webp', '20230129113805.webp', 'cart', '15.00', 'Color:	Multicolor\r\nMaterial:	Stainless Steel\r\nType:	Pruning Shears', 6, '2023-01-29 08:38:05', '2023-02-07 07:08:08'),
(41, 'Gardening Shovel,Gardening Rake and Fork', '20230129114034.webp', '20230129114034.webp', '20230129114034.webp', '20230129114034.webp', 'cart', '10.00', 'Color:	Multicolor\r\nMaterial:	Plastic\r\nType:	Gardening Tools', 6, '2023-01-29 08:40:34', '2023-02-07 07:06:47'),
(42, '3pcs Stainless Steel Gardening Shovel', '20230129114341.webp', '20230129114341.webp', '20230129114341.webp', '20230129114341.webp', 'cart', '7.00', 'Color:	Multicolor\r\nMaterial:	Stainless Steel\r\nType:	Gardening Tools', 6, '2023-01-29 08:43:41', '2023-01-29 08:43:41'),
(43, '1pair Color Block Gardening Gloves', '20230129114804.webp', '20230129114804.webp', '20230129114804.webp', '20230129114804.webp', 'cart', '6.00', 'Color:	Multicolor\r\nMaterial:	ABS\r\nType:	Gardening Gloves', 6, '2023-01-29 08:48:04', '2023-01-29 08:48:04');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `image` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'default.png',
  `phone` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `password` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `type` enum('User','Admin','Worker','Driver') COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'User',
  `category_id` bigint(20) UNSIGNED DEFAULT NULL,
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `name`, `image`, `phone`, `email`, `email_verified_at`, `password`, `type`, `category_id`, `remember_token`, `created_at`, `updated_at`) VALUES
(2, 'Mais', '20230208153139.jpg', '0790152555', 'mais@yahoo.com', NULL, '$2y$10$BuPgdK0LfUycCKHiWkc75OMCQorluxnFVpVfCY3wd6.cSljF2D2dq', 'Worker', NULL, NULL, '2022-11-21 21:36:52', '2023-02-08 12:31:39'),
(4, 'Nadeen', '20230130083931.jpg', '0790154445', 'nadeen@yahoo.com', NULL, '$2y$10$8zgcCJDbvZ49gRA6Mz3WTe3dHqSUeUxAoeHXnWnJvqibxIsd3zGSC', 'User', NULL, NULL, '2022-12-27 12:10:52', '2023-01-30 05:41:00'),
(5, 'majd', '20230203101344.png', '0790152556', 'majdshanteer@yahoo.com', NULL, '$2y$10$0iaJ9Z3Ubs0UrAEhUVhgKOFW6itlXmCpLt5AiEBFxQzGl8AHNSJAG', 'Admin', NULL, NULL, '2023-01-15 09:57:33', '2023-02-03 07:13:44'),
(6, 'Sally', '20230206104010.jpg', '0790152556', 'sally@yahoo.com', NULL, '$2y$10$yC58h3OJEkIT4x3SC8cssOiiptneOVR90kQ4mEKFB9G8SJGqFa9YK', 'User', NULL, NULL, '2023-01-20 09:03:56', '2023-02-06 07:40:10'),
(7, 'Sama', '20230120124644.jpg', '0790152556', 'sama@yahoo.com', NULL, '$2y$10$EeNJITbeSk/EP0hnPlHYj.vub7Gw3Mqbby5WH2zceoYbJVl.VXHj6', 'Worker', NULL, NULL, '2023-01-20 09:15:53', '2023-01-20 09:46:44'),
(8, 'Reem', '20230120124509.jpg', '0790152556', 'reem@yahoo.com', NULL, '$2y$10$mjQYsHVzmhFOe6SJPEtenOJqU54lDLb2Jf3xwafNaaWN613y01hF2', 'Worker', NULL, NULL, '2023-01-20 09:17:30', '2023-01-20 09:45:09'),
(9, 'Maram', '20230120124039.jpg', '0790152544', 'maram@yahoo.com', NULL, '$2y$10$1TCXRIB7Fnm6UNHuGZFiO.7FCluryKgUQqLkRLiZQL.gxETUy8lYu', 'Worker', NULL, NULL, '2023-01-20 09:40:22', '2023-01-20 09:40:39'),
(10, 'Sadeen', '20230120124334.jpg', '0790152544', 'sadeen@yahoo.com', NULL, '$2y$10$cB/6Ct3CwI6OaTiLtMwn1utmR5EkkgNbziLQgoU9C4RCNwoZXtk7C', 'Worker', NULL, NULL, '2023-01-20 09:43:19', '2023-01-20 09:43:34'),
(11, 'Omar', '20230120130521.jpg', '0790152544', 'omar@yahoo.com', NULL, '$2y$10$YLXZluUL/qOqtHGLURxilOFeQV3mDrP7XF3582BjYSPvqH/G9xb9q', 'Worker', NULL, NULL, '2023-01-20 10:05:02', '2023-01-20 10:05:21'),
(12, 'Khaled', '20230120130703.jpg', '0790152556', 'khaled@yahoo.com', NULL, '$2y$10$XasF.oc17sOrn.PRz.AjkeG6KPaWV2TRm0dUkU90zBLYdtvycejOW', 'Worker', NULL, NULL, '2023-01-20 10:06:43', '2023-01-20 10:07:03'),
(14, 'Hadeel', '20230120134535.jpg', '0790152556', 'hadeel@yahoo.com', NULL, '$2y$10$atZvOxjlyMzR8NvnrzxireZKqE3ezPaL/xCmV2GZkVOZWyPjLHd26', 'Worker', NULL, NULL, '2023-01-20 10:45:25', '2023-01-20 10:45:35'),
(37, 'ali', '20230130084213.jpg', '0790152556', 'ali@yahoo.com', NULL, '$2y$10$nm9Y030KO9oAB.16eD1VnugfwuU5JWn71ZYF7YYK17r/Nj2SZqAMy', 'User', NULL, NULL, '2023-01-21 07:08:46', '2023-02-04 10:39:53'),
(38, 'Nada', '1675063967.jpg', '0790152556', 'nada@yahoo.com', NULL, '$2y$10$yxGL.0klSAlInXo/eLOj5edeEiDcmbNildCoA3JoFnD8j8cXQzPuu', 'Worker', NULL, NULL, NULL, NULL),
(39, 'Amal', '1675064160.jpg', '0790152556', 'amal@yahoo.com', NULL, '$2y$10$MW2LAC6sa1YJMMYVrcn81ukWhEvR0jbDXtwrq3rcHwgwH3FIASX3u', 'Worker', NULL, NULL, NULL, NULL),
(40, 'Salam', '1675064413.jpg', '0790152556', 'salam@yahoo.com', NULL, '$2y$10$h1J5xX8t30pSwIdSvCCGI.AlSYj2eLpxyw3pIfBmooTzue6NvyQ7W', 'Worker', NULL, NULL, NULL, NULL),
(41, 'Qusai', '1675066193.jpg', '0790152556', 'qusai@yahoo.com', NULL, '$2y$10$ZKhPoqcedQK2Earhg6FO9ufMGfwEIiHrH161r9QllUX5OHcfOkKIC', 'Worker', NULL, NULL, NULL, NULL),
(42, 'Saleem', '1675066255.jpg', '0790152556', 'saleem@yahoo.com', NULL, '$2y$10$T4WyFXnry5rPXS.G0vajEegafUYbdxqx8DE7zU2dU6wxGkVQHq1cK', 'Worker', NULL, NULL, NULL, NULL),
(55, 'muna sh', 'default.png', '0772107266', 'munaashanteer18@yahoo.com', NULL, '$2y$10$YjXFqojFlGqoclfrRJNJyenFM7zSGRM5Cr5t.ikxAH9wxzHwItSri', 'User', NULL, NULL, '2023-02-07 15:11:35', '2023-02-07 15:11:35'),
(56, 'manar', '20230208160432.jpg', '0790152556', 'manar@yahoo.com', NULL, '$2y$10$p30XMDN1dnU7E.2nxSs.uuqkJH8kwf4hR6x0FSep5sXjnyWHo3KyS', 'User', NULL, NULL, '2023-02-08 06:23:53', '2023-02-08 13:04:32'),
(59, 'test', '1675935768.jpg', '0790152556', 'test@yahoo.com', NULL, '$2y$10$n9POVDQva2d6A0IOCFnLneAygDmUh4iiaQpIlzjxw9F2P3xPc0iEi', 'Worker', NULL, NULL, NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `user_services`
--

CREATE TABLE `user_services` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `user_id` bigint(20) UNSIGNED DEFAULT NULL,
  `service_id` bigint(20) UNSIGNED DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `user_services`
--

INSERT INTO `user_services` (`id`, `user_id`, `service_id`, `created_at`, `updated_at`) VALUES
(1, 9, 1, NULL, '2023-01-21 12:42:39'),
(4, 12, 7, NULL, NULL),
(5, 12, 8, NULL, NULL),
(6, 11, 7, NULL, NULL),
(7, 11, 8, NULL, NULL),
(8, 11, 9, NULL, NULL),
(9, 12, 9, NULL, NULL),
(10, 10, 16, NULL, NULL),
(11, 7, 17, NULL, NULL),
(12, 14, 12, NULL, NULL),
(13, 14, 13, NULL, NULL),
(14, 14, 15, NULL, NULL),
(15, 38, 15, NULL, NULL),
(16, 39, 13, NULL, NULL),
(17, 40, 12, NULL, NULL),
(18, 41, 7, NULL, NULL),
(19, 42, 8, NULL, NULL),
(20, 2, 1, NULL, NULL),
(21, 2, 16, NULL, NULL),
(22, 8, 1, NULL, NULL),
(23, 8, 17, NULL, NULL),
(27, 59, 17, NULL, NULL),
(28, 2, 15, '2023-02-09 06:44:43', '2023-02-09 06:44:43');

-- --------------------------------------------------------

--
-- Table structure for table `website_ratings`
--

CREATE TABLE `website_ratings` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `user_id` bigint(20) UNSIGNED DEFAULT NULL,
  `rate` enum('1','2','3','4','5') COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT '3',
  `comment` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `status` enum('ok','no') COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'no',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `website_ratings`
--

INSERT INTO `website_ratings` (`id`, `user_id`, `rate`, `comment`, `status`, `created_at`, `updated_at`) VALUES
(7, 37, '5', 'I would highly recommend Together website. They are great to deal with.', 'ok', '2023-01-14 07:58:06', '2023-01-14 07:58:06'),
(11, 4, '5', 'It is a distinct pleasure for me to recommend together website to any and all interested parties. it includes professional and nice workers.', 'ok', NULL, NULL),
(13, 6, '5', 'perfect website, I advice all to try their services and products', 'no', '2023-02-06 07:39:22', '2023-02-09 06:45:58'),
(16, 5, '2', 'grtgfg', 'no', '2023-02-07 13:55:34', '2023-02-07 13:55:34');

-- --------------------------------------------------------

--
-- Table structure for table `work_samples`
--

CREATE TABLE `work_samples` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `worker_id` bigint(20) UNSIGNED DEFAULT NULL,
  `image1` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'default.png',
  `image2` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'default.png',
  `image3` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'default.png',
  `image4` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'default.png',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `work_samples`
--

INSERT INTO `work_samples` (`id`, `worker_id`, `image1`, `image2`, `image3`, `image4`, `created_at`, `updated_at`) VALUES
(1, 9, '20230131174006.jpg', '20230131174006.jpg', '20230131174006.jpg', '20230131174006.jpg', '2023-01-31 08:38:26', '2023-01-31 14:40:06'),
(2, 14, '20230131175807.png', '20230131175807.jpg', '20230131175807.jpg', '20230131175807.jpg', '2023-01-31 13:37:27', '2023-01-31 14:58:07'),
(3, 2, '20230131172828.png', '20230131172828.png', '20230131172828.jpg', '20230131172828.jpg', '2023-01-31 14:28:28', '2023-01-31 14:28:28'),
(4, 7, '20230131173107.png', '20230131173107.jfif', '20230131173107.jpg', '20230131173107.jpg', '2023-01-31 14:31:07', '2023-01-31 14:31:07'),
(5, 8, '20230131173534.jpg', '20230131173722.webp', '20230131173534.jpg', '20230131173534.jpg', '2023-01-31 14:35:34', '2023-01-31 14:37:22'),
(6, 10, '20230131174150.jpg', '20230131174150.webp', '20230131174150.jpg', '20230131174150.webp', '2023-01-31 14:41:50', '2023-01-31 14:41:50'),
(7, 11, '20230131174527.jpeg', '20230131174527.jpeg', '20230131174527.jpg', '20230131174527.jpeg', '2023-01-31 14:45:27', '2023-01-31 14:45:27'),
(8, 12, '20230131174745.jpg', '20230131174812.jpg', '20230131174745.jpg', '20230131174745.webp', '2023-01-31 14:47:45', '2023-01-31 14:48:12'),
(9, 41, '20230131175141.jpg', '20230131175141.jpg', '20230131175141.jpg', '20230131175141.jpg', '2023-01-31 14:51:41', '2023-01-31 14:51:41'),
(10, 42, '20230131175344.jpg', '20230131175344.jpg', '20230131175344.webp', '20230131175344.jfif', '2023-01-31 14:53:44', '2023-01-31 14:53:44'),
(11, 38, '20230131180103.jpg', '20230131180103.jpg', '20230131180103.jpg', '20230131180103.jpg', '2023-01-31 15:01:03', '2023-01-31 15:01:03'),
(12, 39, '20230131180327.png', '20230131180327.jpg', '20230131180327.png', '20230131180327.jpg', '2023-01-31 15:03:27', '2023-01-31 15:03:27'),
(13, 40, '20230131180657.jpg', '20230131180657.jpg', '20230131180657.jpg', '20230131180657.jpg', '2023-01-31 15:06:57', '2023-01-31 15:06:57');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `booking_services`
--
ALTER TABLE `booking_services`
  ADD PRIMARY KEY (`id`),
  ADD KEY `booking_services_service_id_foreign` (`service_id`),
  ADD KEY `booking_services_worker_id_foreign` (`worker_id`),
  ADD KEY `booking_services_user_id_foreign` (`user_id`);

--
-- Indexes for table `categories`
--
ALTER TABLE `categories`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `contacts`
--
ALTER TABLE `contacts`
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
-- Indexes for table `order_details`
--
ALTER TABLE `order_details`
  ADD PRIMARY KEY (`id`),
  ADD KEY `order_details_user_id_foreign` (`user_id`);

--
-- Indexes for table `order_items`
--
ALTER TABLE `order_items`
  ADD PRIMARY KEY (`id`),
  ADD KEY `order_items_order_details_id_foreign` (`order_details_id`),
  ADD KEY `order_items_service_id_foreign` (`service_id`);

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
-- Indexes for table `ratings`
--
ALTER TABLE `ratings`
  ADD PRIMARY KEY (`id`),
  ADD KEY `ratings_user_id_foreign` (`user_id`),
  ADD KEY `ratings_worker_id_foreign` (`worker_id`);

--
-- Indexes for table `services`
--
ALTER TABLE `services`
  ADD PRIMARY KEY (`id`),
  ADD KEY `services_category_id_foreign` (`category_id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `users_email_unique` (`email`),
  ADD KEY `users_category_id_foreign` (`category_id`);

--
-- Indexes for table `user_services`
--
ALTER TABLE `user_services`
  ADD PRIMARY KEY (`id`),
  ADD KEY `user_services_user_id_foreign` (`user_id`),
  ADD KEY `user_services_service_id_foreign` (`service_id`);

--
-- Indexes for table `website_ratings`
--
ALTER TABLE `website_ratings`
  ADD PRIMARY KEY (`id`),
  ADD KEY `website_ratings_user_id_foreign` (`user_id`);

--
-- Indexes for table `work_samples`
--
ALTER TABLE `work_samples`
  ADD PRIMARY KEY (`id`),
  ADD KEY `work_samples_worker_id_foreign` (`worker_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `booking_services`
--
ALTER TABLE `booking_services`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=32;

--
-- AUTO_INCREMENT for table `categories`
--
ALTER TABLE `categories`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `contacts`
--
ALTER TABLE `contacts`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=29;

--
-- AUTO_INCREMENT for table `order_details`
--
ALTER TABLE `order_details`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `order_items`
--
ALTER TABLE `order_items`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=37;

--
-- AUTO_INCREMENT for table `personal_access_tokens`
--
ALTER TABLE `personal_access_tokens`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `ratings`
--
ALTER TABLE `ratings`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=33;

--
-- AUTO_INCREMENT for table `services`
--
ALTER TABLE `services`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=46;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=60;

--
-- AUTO_INCREMENT for table `user_services`
--
ALTER TABLE `user_services`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=29;

--
-- AUTO_INCREMENT for table `website_ratings`
--
ALTER TABLE `website_ratings`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;

--
-- AUTO_INCREMENT for table `work_samples`
--
ALTER TABLE `work_samples`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `booking_services`
--
ALTER TABLE `booking_services`
  ADD CONSTRAINT `booking_services_service_id_foreign` FOREIGN KEY (`service_id`) REFERENCES `services` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `booking_services_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `booking_services_worker_id_foreign` FOREIGN KEY (`worker_id`) REFERENCES `users` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `order_details`
--
ALTER TABLE `order_details`
  ADD CONSTRAINT `order_details_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `order_items`
--
ALTER TABLE `order_items`
  ADD CONSTRAINT `order_items_order_details_id_foreign` FOREIGN KEY (`order_details_id`) REFERENCES `order_details` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `order_items_service_id_foreign` FOREIGN KEY (`service_id`) REFERENCES `services` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `ratings`
--
ALTER TABLE `ratings`
  ADD CONSTRAINT `ratings_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `ratings_worker_id_foreign` FOREIGN KEY (`worker_id`) REFERENCES `users` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `services`
--
ALTER TABLE `services`
  ADD CONSTRAINT `services_category_id_foreign` FOREIGN KEY (`category_id`) REFERENCES `categories` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `users`
--
ALTER TABLE `users`
  ADD CONSTRAINT `users_category_id_foreign` FOREIGN KEY (`category_id`) REFERENCES `categories` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `user_services`
--
ALTER TABLE `user_services`
  ADD CONSTRAINT `user_services_service_id_foreign` FOREIGN KEY (`service_id`) REFERENCES `services` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `user_services_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `website_ratings`
--
ALTER TABLE `website_ratings`
  ADD CONSTRAINT `website_ratings_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `work_samples`
--
ALTER TABLE `work_samples`
  ADD CONSTRAINT `work_samples_worker_id_foreign` FOREIGN KEY (`worker_id`) REFERENCES `users` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
