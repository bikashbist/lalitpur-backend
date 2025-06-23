-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jun 23, 2025 at 04:35 AM
-- Server version: 10.4.32-MariaDB
-- PHP Version: 8.2.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `lalitpur`
--

-- --------------------------------------------------------

--
-- Table structure for table `about_us`
--

CREATE TABLE `about_us` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `about_us_group_id` bigint(20) UNSIGNED NOT NULL,
  `title` varchar(255) NOT NULL,
  `description` text NOT NULL,
  `image` varchar(255) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `about_us`
--

INSERT INTO `about_us` (`id`, `about_us_group_id`, `title`, `description`, `image`, `created_at`, `updated_at`) VALUES
(11, 2, 'Your Trusted Partner for Importing from China to Nepal', '<p>NepalChina Imports has been bridging the gap between Chinese manufacturers and Nepalese businesses since 2010. With offices in both Kathmandu and Guangzhou, we provide end-to-end import solutions tailored to your specific needs.</p><p>Australia is celebrated globally for its esteemed education system, characterized by a steadfast dedication to academic excellence and pioneering innovation. Its universities consistently rank among the finest worldwide, affording students access to unparalleled learning environments. Furthermore, the multicultural tapestry of Australian campuses ensures a vibrant cross-cultural experience for students, including those from Nepal, fostering an inclusive atmosphere that enriches the educational journey. The Australian government has implemented stringent regulations governing educational institutions and international student support services, guaranteeing a seamless, well-organized, and ethical study experience for international students. With a plethora of courses spanning diverse disciplines and boasting over 1100 institutions, Australia provides an exceptional educational landscape conducive to growth and success in various fields of study.</p>', 'uploads/about/1746254043.png', '2025-04-27 01:10:47', '2025-05-04 20:42:02'),
(12, 2, '10+ Years Experience', 'Decade of experience in international trade and logistics.', 'uploads/about/1745736987_o_s.png', '2025-04-27 01:11:27', '2025-05-03 00:54:47'),
(13, 2, '500+ Satisfied Clients', 'Trusted by hundreds of businesses across Nepal.', 'uploads/about/1745737043_o_s.png', '2025-04-27 01:12:23', '2025-05-03 00:54:47'),
(16, 2, '200+ Verified Suppliers', 'Network of reliable manufacturers and suppliers in China.', 'uploads/about/1746010566.jpeg', '2025-04-30 05:11:06', '2025-05-03 00:54:47');

-- --------------------------------------------------------

--
-- Table structure for table `about_us_groups`
--

CREATE TABLE `about_us_groups` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `about_us_groups`
--

INSERT INTO `about_us_groups` (`id`, `created_at`, `updated_at`) VALUES
(2, '2025-04-27 01:10:47', '2025-04-27 01:10:47');

-- --------------------------------------------------------

--
-- Table structure for table `advertisements`
--

CREATE TABLE `advertisements` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `image_name` varchar(255) NOT NULL,
  `image` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `banners`
--

CREATE TABLE `banners` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `image_name_en` varchar(255) NOT NULL,
  `image_name_np` varchar(255) NOT NULL,
  `image` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `banners`
--

INSERT INTO `banners` (`id`, `image_name_en`, `image_name_np`, `image`, `created_at`, `updated_at`) VALUES
(9, 'ललितपुर महानगरको पर्यटन', 'Tourism in Lalitpur Metropolitan City', 'uploads/banner/1750536501.jpeg', '2025-02-03 00:56:30', '2025-06-21 14:23:21');

-- --------------------------------------------------------

--
-- Table structure for table `blogs`
--

CREATE TABLE `blogs` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `sub_title_en` varchar(255) NOT NULL,
  `sub_title_np` varchar(255) NOT NULL,
  `title_en` varchar(255) NOT NULL,
  `title_np` varchar(255) NOT NULL,
  `description_en` text NOT NULL,
  `description_np` text NOT NULL,
  `image_path` varchar(255) NOT NULL,
  `slug` varchar(255) NOT NULL,
  `is_active` tinyint(1) NOT NULL DEFAULT 1,
  `category` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `blogs`
--

INSERT INTO `blogs` (`id`, `created_at`, `updated_at`, `sub_title_en`, `sub_title_np`, `title_en`, `title_np`, `description_en`, `description_np`, `image_path`, `slug`, `is_active`, `category`) VALUES
(11, '2025-06-21 21:30:23', '2025-06-22 00:19:21', 'Lalitpur', 'भक्तपुर दरबार क्षेत्रमा नयाँ सांस्कृतिक पर्यटन कार्यक्रम सुरु', 'Lalitpur', 'भक्तपुर दरबार क्षेत्रमा नयाँ सांस्कृतिक पर्यटन कार्यक्रम सुरु', 'asd', 'asd', 'uploads/blogs/1750562123.jpeg', 'lalitpur', 1, 'news'),
(15, '2025-06-22 00:20:14', '2025-06-22 00:20:14', '२०२५ को प्रथम त्रैमासिक पर्यटन तथ्याङ्क प्रतिवेदन', '२०२५ को प्रथम त्रैमासिक पर्यटन तथ्याङ्क प्रतिवेदन', '२०२५ को प्रथम त्रैमासिक पर्यटन तथ्याङ्क प्रतिवेदन', '२०२५ को प्रथम त्रैमासिक पर्यटन तथ्याङ्क प्रतिवेदन', 'english', '२०२५ को प्रथम त्रैमासिक पर्यटन तथ्याङ्क प्रतिवेदन', 'uploads/blogs/1750572314.jpeg', 'ka-parathama-taramasaka-parayatana-tathayanaka-paratavathana', 1, 'report'),
(16, '2025-06-22 00:20:55', '2025-06-22 00:20:55', 'Lalitpur test', 'भक्तपुर दरबार क्षेत्रमा नयाँ सांस्कृतिक पर्यटन कार्यक्रम सुरु', 'Lalitpur test', 'भक्तपुर दरबार क्षेत्रमा नयाँ सांस्कृतिक पर्यटन कार्यक्रम सुरुasd', 'ev', 'नेपाली', 'uploads/blogs/1750572355.jpeg', 'lalitpur-test', 1, 'press_release'),
(17, '2025-06-22 00:21:31', '2025-06-22 00:21:31', 'Lalitpurasdf  asdf', 'भक्तपुर दरबार क्षेत्रमा नयाँ सांस्कृतिक पर्यटन कार्यक्रम सुरुasd', 'Lalitpurasd', 'भक्तपुर दरबार क्षेत्रमा नयाँ सांस्कृतिक पर्यटन कार्यक्रम सुरुasd', 'en', 'ne', 'uploads/blogs/1750572391.png', 'lalitpurasd', 1, 'policy'),
(18, '2025-06-22 00:22:07', '2025-06-22 00:22:07', 'englsih', 'भक्तपुर दरबार क्षेत्रमा नयाँ सांस्कृतिक पर्यटन कार्यक्रम सुरु', 'Lalitpurasd englsih', 'भक्तपुर दरबार क्षेत्रमा नयाँ सांस्कृतिक पर्यटन कार्यक्रम सुरुasd', 'en', 'np', 'uploads/blogs/1750572427.png', 'lalitpurasd-englsih', 1, 'event'),
(19, '2025-06-22 00:22:33', '2025-06-22 00:22:33', 'Lalitpurasdf  asdf a', 'भक्तपुर दरबार क्षेत्रमा नयाँ सांस्कृतिक पर्यटन कार्यक्रम सुरुasd', 'Lalitpur s', 'भक्तपुर दरबार क्षेत्रमा नयाँ सांस्कृतिक पर्यटन कार्यक्रम सुरुasd', 'e', 'n', 'uploads/blogs/1750572453.jpeg', 'lalitpur-s', 1, 'article'),
(20, '2025-06-22 05:16:35', '2025-06-22 05:16:35', 'test', 'भक्तपुर दरबार क्षेत्रमा नयाँ सांस्कृतिक पर्यटन कार्यक्रम सुरु', 'asdf', 'भक्तपुर दरबार क्षेत्रमा नयाँ सांस्कृतिक पर्यटन कार्यक्रम सुरु', 'englsih', 'epali', 'uploads/blogs/1750590095.jpg', 'asdf', 0, 'news'),
(21, '2025-06-22 05:22:55', '2025-06-22 05:22:55', 'Lalitpurasdf', 'भक्तपुर दरबार क्षेत्रमा नयाँ सांस्कृतिक पर्यटन कार्यक्रम सुरुasd', 'Lalitpur test', 'भक्तपुर दरबार क्षेत्रमा नयाँ सांस्कृतिक पर्यटन कार्यक्रम सुरुasd', 'asdf', 'nep', 'uploads/blogs/1750590475.jpeg', 'lalitpur-test-1', 1, 'news');

-- --------------------------------------------------------

--
-- Table structure for table `cache`
--

CREATE TABLE `cache` (
  `key` varchar(255) NOT NULL,
  `value` mediumtext NOT NULL,
  `expiration` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `cache`
--

INSERT INTO `cache` (`key`, `value`, `expiration`) VALUES
('admin@example.com|127.0.0.1', 'i:1;', 1750534281),
('admin@example.com|127.0.0.1:timer', 'i:1750534281;', 1750534281),
('info@shipping.com|103.180.241.213', 'i:1;', 1746790076),
('info@shipping.com|103.180.241.213:timer', 'i:1746790076;', 1746790076),
('lalitpur@gmail.com|127.0.0.1', 'i:1;', 1750534289),
('lalitpur@gmail.com|127.0.0.1:timer', 'i:1750534289;', 1750534289);

-- --------------------------------------------------------

--
-- Table structure for table `cache_locks`
--

CREATE TABLE `cache_locks` (
  `key` varchar(255) NOT NULL,
  `owner` varchar(255) NOT NULL,
  `expiration` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `categories`
--

CREATE TABLE `categories` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `title` varchar(255) NOT NULL,
  `description` text DEFAULT NULL,
  `image` varchar(255) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `categories`
--

INSERT INTO `categories` (`id`, `title`, `description`, `image`, `created_at`, `updated_at`) VALUES
(4, 'पर्यटक गाइड लाइसेन्स', 'पर्यटक गाइड लाइसेन्स', 'uploads/categories/1750641848.png', '2025-04-30 03:06:49', '2025-06-22 19:39:08');

-- --------------------------------------------------------

--
-- Table structure for table `certificates`
--

CREATE TABLE `certificates` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `image_name` varchar(255) NOT NULL,
  `image_path` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `certificates`
--

INSERT INTO `certificates` (`id`, `image_name`, `image_path`, `created_at`, `updated_at`) VALUES
(1, 'certificate', 'uploads/certificate/1745734235.png', '2025-04-27 00:25:35', '2025-04-27 00:29:24');

-- --------------------------------------------------------

--
-- Table structure for table `citizen_charters`
--

CREATE TABLE `citizen_charters` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `title` varchar(255) NOT NULL,
  `introduction` text NOT NULL,
  `commitments` longtext CHARACTER SET utf8mb4 COLLATE utf8mb4_bin NOT NULL CHECK (json_valid(`commitments`)),
  `working_days` varchar(255) NOT NULL,
  `working_hours` varchar(255) NOT NULL,
  `services` longtext CHARACTER SET utf8mb4 COLLATE utf8mb4_bin NOT NULL CHECK (json_valid(`services`)),
  `status` tinyint(1) NOT NULL DEFAULT 1,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `citizen_charters`
--

INSERT INTO `citizen_charters` (`id`, `title`, `introduction`, `commitments`, `working_days`, `working_hours`, `services`, `status`, `created_at`, `updated_at`) VALUES
(1, 'नागरिक चार्टर', 'पर्यटन कार्यालय ललितपुरको नागरिक चार्टर:', '[\"\\u092a\\u093e\\u0930\\u0926\\u0930\\u094d\\u0936\\u0940 \\u0930 \\u0909\\u0924\\u094d\\u0924\\u092e \\u0938\\u0947\\u0935\\u093e \\u092a\\u094d\\u0930\\u0935\\u093e\\u0939\",\"\\u0928\\u093f\\u0936\\u094d\\u091a\\u093f\\u0924 \\u0938\\u092e\\u092f\\u092e\\u093e \\u0938\\u0947\\u0935\\u093e \\u0909\\u092a\\u0932\\u092c\\u094d\\u0927 \\u0917\\u0930\\u093e\\u0909\\u0928\\u0947\",\"\\u0938\\u092c\\u0948 \\u0928\\u093e\\u0917\\u0930\\u093f\\u0915\\u0932\\u093e\\u0908 \\u0938\\u092e\\u093e\\u0928 \\u0930\\u0942\\u092a\\u092e\\u093e \\u0938\\u0947\\u0935\\u093e \\u092a\\u094d\\u0930\\u0926\\u093e\\u0928 \\u0917\\u0930\\u094d\\u0928\\u0947\"]', 'कार्यदिवस: सोमबार - शुक्रबार', '१०:०० बजे देखि १७:०० बजे सम्म', '[{\"name\":\"\\u092a\\u0930\\u094d\\u092f\\u091f\\u0915 \\u0917\\u093e\\u0907\\u0921 \\u0932\\u093e\\u0907\\u0938\\u0947\\u0928\\u094d\\u0938\",\"duration\":\"\\u096d \\u0915\\u093e\\u0930\\u094d\\u092f\\u0926\\u093f\\u0935\\u0938\",\"fee\":\"\\u0930\\u0941. \\u096b\\u0966\\u0966\\u0966\"},{\"name\":\"\\u0939\\u094b\\u091f\\u0932 \\u0926\\u0930\\u094d\\u0924\\u093e\",\"duration\":\"\\u0967\\u096b \\u0915\\u093e\\u0930\\u094d\\u092f\\u0926\\u093f\\u0935\\u0938\",\"fee\":\"\\u0930\\u0941. \\u0967\\u0966\\u0966\\u0966\\u0966\"}]', 1, '2025-06-22 10:57:14', '2025-06-22 11:00:02');

-- --------------------------------------------------------

--
-- Table structure for table `citizen_services`
--

CREATE TABLE `citizen_services` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `title` varchar(255) NOT NULL,
  `service_name` varchar(255) NOT NULL,
  `required_documents` longtext CHARACTER SET utf8mb4 COLLATE utf8mb4_bin NOT NULL CHECK (json_valid(`required_documents`)),
  `order` int(11) NOT NULL DEFAULT 0,
  `status` tinyint(1) NOT NULL DEFAULT 1,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `citizen_services`
--

INSERT INTO `citizen_services` (`id`, `title`, `service_name`, `required_documents`, `order`, `status`, `created_at`, `updated_at`) VALUES
(1, 'नागरिक सेवाहरू', 'हाम्रो कार्यालयले निम्न नागरिक सेवाहरू प्रदान गर्दछ:', '[\"\\u092a\\u0930\\u094d\\u092f\\u091f\\u0915 \\u0917\\u093e\\u0907\\u0921 \\u0932\\u093e\\u0907\\u0938\\u0947\\u0928\\u094d\\u0938\"]', 0, 1, '2025-06-22 11:05:24', '2025-06-22 11:05:24'),
(2, 'नागरिक सेवाहरू', 'होटल दर्ता', '[\"\\u0938\\u094d\\u0925\\u093e\\u0928\\u0940\\u092f \\u0928\\u093f\\u0915\\u093e\\u092f\\u0915\\u094b \\u0938\\u093f\\u092b\\u093e\\u0930\\u093f\\u0938\"]', 2, 1, '2025-06-22 11:06:24', '2025-06-22 11:06:24');

-- --------------------------------------------------------

--
-- Table structure for table `contact_infos`
--

CREATE TABLE `contact_infos` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `phone` varchar(255) DEFAULT NULL,
  `email` varchar(255) DEFAULT NULL,
  `address` varchar(255) DEFAULT NULL,
  `facebook` varchar(255) NOT NULL,
  `twitter` varchar(255) NOT NULL,
  `instagram` varchar(255) NOT NULL,
  `linkedin` varchar(255) NOT NULL,
  `logo` varchar(255) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `contact_infos`
--

INSERT INTO `contact_infos` (`id`, `phone`, `email`, `address`, `facebook`, `twitter`, `instagram`, `linkedin`, `logo`, `created_at`, `updated_at`) VALUES
(3, '9823846254', 'lalitpurtourism@gmail.com', 'बागमती प्रदेश, पुल्चोक, ललितपुर', 'https://www.youtube.com/', 'https://www.youtube.com/', 'https://www.youtube.com/', 'https://www.youtube.com/', 'uploads/contact_info/1750558976.png', '2025-04-24 04:43:41', '2025-06-21 20:37:56');

-- --------------------------------------------------------

--
-- Table structure for table `core_values`
--

CREATE TABLE `core_values` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `title` varchar(255) NOT NULL,
  `description` text NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `core_values`
--

INSERT INTO `core_values` (`id`, `title`, `description`, `created_at`, `updated_at`) VALUES
(2, 'Inquiry & Consultation', '<p>Share your product requirements with us. Our team will provide initial consultation and feasibility assessment.</p>', '2025-04-27 07:04:20', '2025-05-03 20:10:59'),
(3, 'Product Sourcing', '<p>We identify reliable suppliers in China and negotiate the best prices for your products.</p>', '2025-05-01 04:35:14', '2025-05-03 20:11:17'),
(4, 'Quality Inspection', '<p>Our team in China conducts thorough quality checks to ensure products meet your specifications.</p>', '2025-05-03 20:10:33', '2025-05-03 20:11:34'),
(5, 'Shipping & Logistics', '<p>We arrange the most suitable shipping method based on your timeline and budget.</p>', '2025-05-03 20:11:50', '2025-05-03 20:11:50'),
(6, 'Customs Clearance', '<p>Our experts handle all documentation and procedures for smooth customs clearance in Nepal.</p>', '2025-05-03 20:12:06', '2025-05-03 20:12:06'),
(7, 'Delivery', '<p>We ensure your goods are safely delivered to your doorstep anywhere in Nepal.</p>', '2025-05-03 20:12:21', '2025-05-03 20:12:21');

-- --------------------------------------------------------

--
-- Table structure for table `documents`
--

CREATE TABLE `documents` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name_en` varchar(255) NOT NULL,
  `name_np` varchar(255) NOT NULL,
  `image_path` varchar(255) DEFAULT NULL,
  `pdf_path` varchar(255) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `documents`
--

INSERT INTO `documents` (`id`, `name_en`, `name_np`, `image_path`, `pdf_path`, `created_at`, `updated_at`) VALUES
(1, 'Chiri Babu Maharjan', 'चिरिबाबु महर्जन', 'uploads/documents/1750586045.jpeg', 'uploads/documents/1750586045_doc.pdf', '2025-06-22 04:09:05', '2025-06-22 04:09:05'),
(2, 'Chiri Babu Maharjan', 'चिरिबाबु महर्जन', 'uploads/documents/1750586076.png', NULL, '2025-06-22 04:09:36', '2025-06-22 04:09:36'),
(3, 'Chiri Babu Maharjan', 'चिरिबाबु महर्जन', NULL, 'uploads/documents/1750586098_doc.pdf', '2025-06-22 04:09:58', '2025-06-22 04:09:58');

-- --------------------------------------------------------

--
-- Table structure for table `failed_jobs`
--

CREATE TABLE `failed_jobs` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `uuid` varchar(255) NOT NULL,
  `connection` text NOT NULL,
  `queue` text NOT NULL,
  `payload` longtext NOT NULL,
  `exception` longtext NOT NULL,
  `failed_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `galleries`
--

CREATE TABLE `galleries` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `image_name_en` varchar(255) NOT NULL,
  `image_name_np` varchar(255) NOT NULL,
  `title_en` varchar(255) NOT NULL,
  `title_np` varchar(255) NOT NULL,
  `category` varchar(255) NOT NULL,
  `image_path` varchar(255) DEFAULT NULL,
  `video_url` varchar(255) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `galleries`
--

INSERT INTO `galleries` (`id`, `image_name_en`, `image_name_np`, `title_en`, `title_np`, `category`, `image_path`, `video_url`, `created_at`, `updated_at`) VALUES
(12, 'en', 'ललितपुर महानगरको पर्यटन', 'english title', 'भक्तपुर दरबार क्षेत्रमा नयाँ सांस्कृतिक पर्यटन कार्यक्रम सुरु', 'photo', 'uploads/gallery/1750578050.jpg', 'https://www.youtube.com/watch?v=q8fMo_p8VmQ', '2025-06-22 01:55:50', '2025-06-22 01:55:50'),
(14, 'Tourism in Lalitpur Metropolitan City', 'ललितपुर महानगरको पर्यटन', 'Lalitpur test', 'भक्तपुर दरबार क्षेत्रमा नयाँ सांस्कृतिक पर्यटन कार्यक्रम सुरु', 'video', NULL, 'https://www.youtube.com/watch?v=lCKCAvUSfRQ', '2025-06-22 02:13:13', '2025-06-22 02:56:13'),
(15, 'Tourism in Lalitpur Metropolitan City', 'ललितपुर महानगरको पर्यटन', 'Lalitpurasd englsih', 'भक्तपुर दरबार क्षेत्रमा नयाँ सांस्कृतिक पर्यटन कार्यक्रम सुरु', 'video', NULL, 'https://www.youtube.com/watch?v=bk6RbeXR2Eg', '2025-06-22 02:58:54', '2025-06-22 02:58:54'),
(16, 'Tourism in Lalitpur Metropolitan City', 'ललितपुर महानगरको पर्यटन', 'Lalitpurasd englsih', 'भक्तपुर दरबार क्षेत्रमा नयाँ सांस्कृतिक पर्यटन कार्यक्रम सुरुasd', 'photo', 'uploads/gallery/1750583426.png', NULL, '2025-06-22 03:25:26', '2025-06-22 03:25:26');

-- --------------------------------------------------------

--
-- Table structure for table `jobs`
--

CREATE TABLE `jobs` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `queue` varchar(255) NOT NULL,
  `payload` longtext NOT NULL,
  `attempts` tinyint(3) UNSIGNED NOT NULL,
  `reserved_at` int(10) UNSIGNED DEFAULT NULL,
  `available_at` int(10) UNSIGNED NOT NULL,
  `created_at` int(10) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `job_batches`
--

CREATE TABLE `job_batches` (
  `id` varchar(255) NOT NULL,
  `name` varchar(255) NOT NULL,
  `total_jobs` int(11) NOT NULL,
  `pending_jobs` int(11) NOT NULL,
  `failed_jobs` int(11) NOT NULL,
  `failed_job_ids` longtext NOT NULL,
  `options` mediumtext DEFAULT NULL,
  `cancelled_at` int(11) DEFAULT NULL,
  `created_at` int(11) NOT NULL,
  `finished_at` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `locations`
--

CREATE TABLE `locations` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `location_category` varchar(255) NOT NULL,
  `contact_name` varchar(255) NOT NULL,
  `phone` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `address` text NOT NULL,
  `map` text DEFAULT NULL,
  `image` varchar(255) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `locations`
--

INSERT INTO `locations` (`id`, `location_category`, `contact_name`, `phone`, `email`, `address`, `map`, `image`, `created_at`, `updated_at`) VALUES
(1, 'Kathmandu', 'Raman Thapa', '9823846254', 'info@lilyeducation.com', 'Suryabinayak, Information Technology Company', '<iframe src=\"https://www.google.com/maps/embed?pb=!1m10!1m8!1m3!1d3534.275589754511!2d85.306111!3d27.646944!3m2!1i1024!2i768!4f13.1!5e0!3m2!1sen!2snp!4v1745824101871!5m2!1sen!2snp\" width=\"600\" height=\"450\" style=\"border:0;\" allowfullscreen=\"\" loading=\"lazy\" referrerpolicy=\"no-referrer-when-downgrade\"></iframe>', 'uploads/locations/1745845114_person.jpeg', '2025-04-28 01:12:15', '2025-04-28 08:18:19'),
(2, 'Pokhara', 'Ramesh Thapa', '9823846254', 'info@lilyeducation.com', 'New Baneshwor-10 , Pokhara', NULL, 'uploads/locations/1745845170_home-five-slide-img-comp.png', '2025-04-28 07:14:30', '2025-04-28 07:14:30');

-- --------------------------------------------------------

--
-- Table structure for table `menu_categories`
--

CREATE TABLE `menu_categories` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) NOT NULL,
  `image` varchar(255) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `menu_categories`
--

INSERT INTO `menu_categories` (`id`, `name`, `image`, `created_at`, `updated_at`) VALUES
(16, 'Media', 'uploads/menu_categories/1750640845.png', '2025-05-03 20:03:34', '2025-06-22 19:22:25');

-- --------------------------------------------------------

--
-- Table structure for table `menu_products`
--

CREATE TABLE `menu_products` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `menu_category_id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) NOT NULL,
  `price` decimal(8,2) DEFAULT NULL,
  `description` text DEFAULT NULL,
  `reasons_to_study` text DEFAULT NULL,
  `scholarships` text DEFAULT NULL,
  `application_process` text DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `image` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `messages`
--

CREATE TABLE `messages` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `email` varchar(255) NOT NULL,
  `phone` varchar(255) NOT NULL,
  `message` text NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `messages`
--

INSERT INTO `messages` (`id`, `email`, `phone`, `message`, `created_at`, `updated_at`) VALUES
(4, 'test@gmail.com', '9823846254', 'test', '2024-10-06 13:45:09', '2024-10-06 13:45:09'),
(5, 'bikashbist1414@gmail.com', '9823846254', 'message', '2024-10-06 14:01:53', '2024-10-06 14:01:53'),
(6, 'bikashbist1414@gmail.com', '9823846254', 'test', '2024-10-11 05:53:59', '2024-10-11 05:53:59'),
(7, 'bikashbist1414@gmail.com', '9823846254', 'asd', '2024-10-11 05:55:45', '2024-10-11 05:55:45'),
(8, 'bikashbist1414@gmail.com', '9823846254', 'message', '2024-10-19 04:29:10', '2024-10-19 04:29:10');

-- --------------------------------------------------------

--
-- Table structure for table `migrations`
--

CREATE TABLE `migrations` (
  `id` int(10) UNSIGNED NOT NULL,
  `migration` varchar(255) NOT NULL,
  `batch` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `migrations`
--

INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES
(1, '0001_01_01_000000_create_users_table', 1),
(2, '0001_01_01_000001_create_cache_table', 1),
(3, '0001_01_01_000002_create_jobs_table', 1),
(4, '2024_09_29_093055_create_menu_categories_table', 2),
(5, '2024_09_29_095945_create_menu_products_table', 3),
(6, '2024_09_29_101904_create_about_us_table', 4),
(7, '2024_09_30_095450_create_galleries_table', 5),
(8, '2024_10_01_092508_create_contact_infos_table', 6),
(11, '2024_10_01_111303_create_service_categories_table', 7),
(12, '2024_10_01_111304_create_service_products_table', 7),
(13, '2024_10_06_183928_add_image_to_menu_categories_table', 8),
(14, '2024_10_06_184211_add_image_column_to_menu_categories_table', 9),
(15, '2024_10_06_190805_create_messages_table', 10),
(16, '2024_10_08_052915_add_image_to_menu_products_table', 11),
(17, '2024_10_08_060243_create_banners_table', 12),
(18, '2024_10_08_062201_create_advertisements_table', 13),
(19, '2025_02_03_072300_add_description_to_service_categories_table', 14),
(20, '2025_04_22_070513_create_products_table', 15),
(21, '2025_04_22_103117_create_about_us_groups_table', 16),
(22, '2025_04_22_103327_create_about_us_table', 16),
(23, '2025_04_22_113645_create_teams_table', 17),
(24, '2025_04_23_072303_create_services_table', 18),
(25, '2025_04_24_093731_create_testimonials_table', 19),
(26, '2025_04_25_063139_create_page_banners_table', 20),
(27, '2025_04_25_095757_create_visitors_table', 21),
(28, '2025_04_27_055339_create_certificates_table', 22),
(29, '2025_04_27_061620_create_top_universities_table', 23),
(30, '2025_04_27_072006_create_core_values_table', 24),
(31, '2025_04_27_132613_create_documents_table', 25),
(32, '2025_04_28_022423_create_locations_table', 26),
(33, '2025_04_28_024131_create_location_categories_table', 27),
(34, '2025_04_28_024632_add_location_category_id_to_locations_table', 28),
(35, '2025_04_28_065636_create_locations_table', 29),
(36, '2025_04_29_024224_create_test_preparations_table', 30),
(37, '2025_04_29_025417_create_test_preparation_items_table', 31),
(38, '2025_04_30_072315_create_categories_table', 32),
(39, '2025_04_30_072347_create_subcategories_table', 32),
(40, '2025_05_05_013600_create_blogs_table', 33),
(41, '2025_06_14_153621_create_office_introductions_table', 34),
(42, '2025_06_14_160301_create_office_chiefs_table', 34),
(43, '2025_06_14_163240_create_team_members_table', 34),
(44, '2025_06_14_165016_create_service_processes_table', 34),
(45, '2025_06_15_004045_create_rules_table', 34),
(46, '2025_06_15_005451_create_organizational_structures_table', 34),
(47, '2025_06_15_010812_create_citizen_charters_table', 34),
(48, '2025_06_15_012129_create_citizen_services_table', 34),
(49, '2025_06_15_014101_create_other_services_table', 34),
(50, '2025_06_15_020009_create_publication_processes_table', 34),
(51, '2025_06_15_023525_create_service_flows_table', 34),
(52, '2025_06_15_043928_create_press_releases_table', 34),
(53, '2025_06_15_051816_create_tourism_statistics_table', 34),
(54, '2025_06_21_194847_update_banners_table_for_bilingual_support', 34),
(55, '2025_06_21_195018_update_banners_table_for_bilingual_support', 34),
(56, '2025_06_21_195140_update_banners_table_for_bilingual_support', 35),
(57, '2025_06_21_202554_create_team_lalitpur_members_table', 36),
(58, '2025_06_22_020430_create_press_categories_table', 37),
(59, '2025_06_22_023437_update_blogs_table', 37),
(60, '2025_06_22_053202_create_reports_table', 38),
(61, '2025_06_22_055309_add_category_to_blogs_table', 38),
(62, '2025_06_22_070847_update_galleries_table', 39),
(63, '2025_06_22_075611_make_image_path_nullable_in_galleries_table', 40),
(64, '2025_06_22_094156_create_documents_table', 41),
(65, '2025_06_22_131411_add_multilingual_fields_to_office_introductions_table', 42),
(66, '2025_06_22_144448_add_multilingual_fields_to_office_chiefs_table', 43),
(67, '2025_06_22_144706_remove_old_columns_from_office_chiefs_table', 44),
(68, '2025_06_22_160838_add_multilang_fields_to_team_members_table', 45),
(69, '2025_06_22_160957_remove_name_column_from_team_members_table', 46);

-- --------------------------------------------------------

--
-- Table structure for table `office_chiefs`
--

CREATE TABLE `office_chiefs` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `image` varchar(255) DEFAULT NULL,
  `status` tinyint(1) NOT NULL DEFAULT 1,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `name_en` varchar(255) DEFAULT NULL,
  `name_np` varchar(255) DEFAULT NULL,
  `position_en` varchar(255) DEFAULT NULL,
  `position_np` varchar(255) DEFAULT NULL,
  `office_en` varchar(255) DEFAULT NULL,
  `office_np` varchar(255) DEFAULT NULL,
  `message_en` text DEFAULT NULL,
  `message_np` text DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `office_chiefs`
--

INSERT INTO `office_chiefs` (`id`, `image`, `status`, `created_at`, `updated_at`, `name_en`, `name_np`, `position_en`, `position_np`, `office_en`, `office_np`, `message_en`, `message_np`) VALUES
(2, 'uploads/chiefs/1750603658.png', 1, '2025-06-22 09:02:38', '2025-06-22 09:02:38', 'Chiri Babu Maharjan', 'चिरिबाबु महर्जन', 'Mayor', 'नगर प्रमुख', 'Lalitpur Bagmati', 'र प्रमुख', 'message', 'प्रमुख');

-- --------------------------------------------------------

--
-- Table structure for table `office_introductions`
--

CREATE TABLE `office_introductions` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `image` varchar(255) DEFAULT NULL,
  `status` tinyint(1) NOT NULL DEFAULT 1,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `title_en` varchar(255) DEFAULT NULL,
  `title_np` varchar(255) DEFAULT NULL,
  `description_en` text DEFAULT NULL,
  `description_np` text DEFAULT NULL,
  `objectives_en` longtext CHARACTER SET utf8mb4 COLLATE utf8mb4_bin DEFAULT NULL CHECK (json_valid(`objectives_en`)),
  `objectives_np` longtext CHARACTER SET utf8mb4 COLLATE utf8mb4_bin DEFAULT NULL CHECK (json_valid(`objectives_np`))
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `office_introductions`
--

INSERT INTO `office_introductions` (`id`, `image`, `status`, `created_at`, `updated_at`, `title_en`, `title_np`, `description_en`, `description_np`, `objectives_en`, `objectives_np`) VALUES
(1, 'uploads/office-introduction/1750598654.jpeg', 1, '2025-06-22 07:13:49', '2025-06-22 08:28:01', 'Office Introduction', 'कार्यालयको परिचय', 'The Office of the Municipality is committed to delivering effective public services, promoting good governance, and ensuring sustainable development in the community. With a focus on transparency and citizen participation, the office works to enhance the quality of life for all residents.', 'नगरपालिकाको कार्यालयले स्थानीय जनताको सेवा, विकास र समृद्धिका लागि निरन्तर काम गरिरहेको छ। यस कार्यालयको मुख्य उद्देश्य स्थानीय आवश्यकता अनुसार योजना निर्माण, बजेट व्यवस्थापन, पूर्वाधार विकास, सामाजिक सेवा प्रवाह, र समावेशी निर्णय प्रक्रियालाई प्रवर्द्धन गर्नु हो।\r\n\r\nकार्यालयले पारदर्शिता, जवाफदेहिता र जनसहभागितालाई प्राथमिकतामा राखी सेवा प्रदान गर्दछ। स्थानीय विकास योजनाबाट लिएर शिक्षा, स्वास्थ्य, सरसफाइ, वातावरणीय व्यवस्थापन, महिला तथा बालबालिका सशक्तिकरणसम्मका कार्यक्रमहरू संचालन गर्दै आएको छ।\r\n\r\nयस कार्यालयले डिजिटल प्रविधिको माध्यमबाट प्रशासनिक कामकाजलाई छरितो, पारदर्शी र पहुँचयोग्य बनाउने लक्ष्य राखेको छ। साथै, कार्यालयले प्रत्येक नागरिकको सुझाव, गुनासो र सहभागितालाई स्वागत गर्दै, समावेशी र उत्तरदायी प्रशासन निर्माणमा योगदान पुर्‍याउँदै आएको छ।', '[\"Deliver transparent and efficient municipal services.\",\"Encourage active public participation in governance.\",\"Promote sustainable infrastructure and development.\"]', '[\"\\u092a\\u093e\\u0930\\u0926\\u0930\\u094d\\u0936\\u0940 \\u0930 \\u092a\\u094d\\u0930\\u092d\\u093e\\u0935\\u0915\\u093e\\u0930\\u0940 \\u0928\\u0917\\u0930\\u092a\\u093e\\u0932\\u093f\\u0915\\u093e \\u0938\\u0947\\u0935\\u093e \\u092a\\u094d\\u0930\\u0926\\u093e\\u0928 \\u0917\\u0930\\u094d\\u0928\\u0941\\u0964\",\"\\u0936\\u093e\\u0938\\u0915\\u0940\\u092f \\u092a\\u094d\\u0930\\u0915\\u094d\\u0930\\u093f\\u092f\\u093e\\u092e\\u093e \\u091c\\u0928\\u0938\\u0939\\u092d\\u093e\\u0917\\u093f\\u0924\\u093e \\u092a\\u094d\\u0930\\u094b\\u0924\\u094d\\u0938\\u093e\\u0939\\u0928 \\u0917\\u0930\\u094d\\u0928\\u0941\\u0964\",\"\\u0926\\u093f\\u0917\\u094b \\u092a\\u0942\\u0930\\u094d\\u0935\\u093e\\u0927\\u093e\\u0930 \\u0930 \\u0935\\u093f\\u0915\\u093e\\u0938\\u0932\\u093e\\u0908 \\u092a\\u094d\\u0930\\u0935\\u0930\\u094d\\u0926\\u094d\\u0927\\u0928 \\u0917\\u0930\\u094d\\u0928\\u0941\\u0964\"]');

-- --------------------------------------------------------

--
-- Table structure for table `organizational_structures`
--

CREATE TABLE `organizational_structures` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `title` varchar(255) NOT NULL,
  `description` text NOT NULL,
  `image` varchar(255) DEFAULT NULL,
  `departments` longtext CHARACTER SET utf8mb4 COLLATE utf8mb4_bin NOT NULL CHECK (json_valid(`departments`)),
  `status` tinyint(1) NOT NULL DEFAULT 1,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `other_services`
--

CREATE TABLE `other_services` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `title` varchar(255) NOT NULL,
  `description` text NOT NULL,
  `link` varchar(255) DEFAULT NULL,
  `order` int(11) NOT NULL DEFAULT 0,
  `status` tinyint(1) NOT NULL DEFAULT 1,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `page_banners`
--

CREATE TABLE `page_banners` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `page` varchar(255) NOT NULL,
  `title` varchar(255) DEFAULT NULL,
  `image` varchar(255) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `page_banners`
--

INSERT INTO `page_banners` (`id`, `page`, `title`, `image`, `created_at`, `updated_at`) VALUES
(2, 'about', 'Nepal\'s Best is part of National Vision, one of the largest optical retailers in the Bagmati States.', 'uploads/page-banners/1745566649_banner-inner.jpg', '2025-04-25 01:52:29', '2025-04-25 01:52:29'),
(3, 'contact', 'test', 'uploads/page-banners/1746009480.jpeg', '2025-04-30 04:53:00', '2025-04-30 04:53:00');

-- --------------------------------------------------------

--
-- Table structure for table `password_reset_tokens`
--

CREATE TABLE `password_reset_tokens` (
  `email` varchar(255) NOT NULL,
  `token` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `press_categories`
--

CREATE TABLE `press_categories` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `press_releases`
--

CREATE TABLE `press_releases` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `title` varchar(255) NOT NULL,
  `date` date NOT NULL,
  `content` text NOT NULL,
  `file_path` varchar(255) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `press_releases`
--

INSERT INTO `press_releases` (`id`, `title`, `date`, `content`, `file_path`, `created_at`, `updated_at`) VALUES
(2, 'पर्यटक गाइड लाइसेन्स', '2025-06-19', 'हाम्रो कार्यालयले निम्न नागरिक सेवाहरू प्रदान गर्दछ', 'uploads/press/1750611312.pdf', '2025-06-22 11:10:12', '2025-06-22 11:10:12');

-- --------------------------------------------------------

--
-- Table structure for table `products`
--

CREATE TABLE `products` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `title` varchar(255) NOT NULL,
  `image` varchar(255) DEFAULT NULL,
  `price` decimal(8,2) NOT NULL,
  `description` text DEFAULT NULL,
  `brand` varchar(255) DEFAULT NULL,
  `condition` varchar(255) DEFAULT NULL,
  `stock` int(11) NOT NULL DEFAULT 0,
  `category` varchar(255) NOT NULL,
  `shop_category` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `products`
--

INSERT INTO `products` (`id`, `title`, `image`, `price`, `description`, `brand`, `condition`, `stock`, `category`, `shop_category`, `created_at`, `updated_at`) VALUES
(4, 'this', 'uploads/products/1745391952_255830.jpg', 234.00, 'asdf', 'sad', 'New', 23, 'Men', 'Glasses', '2025-04-22 02:12:19', '2025-04-23 01:20:52'),
(5, 'item 2', 'uploads/products/1745391888_255830 (1).jpg', 213.00, 'tsdf', 'adidas', 'New', 20, 'Men', 'Sunglasses', '2025-04-23 00:28:36', '2025-04-23 01:19:48'),
(6, 'itemm 3', 'uploads/products/1745391897_352779.jpg', 54.00, 'asfd', 'adidas', 'old', 41, 'Children', 'Contacts', '2025-04-23 00:29:13', '2025-04-23 01:19:57'),
(7, 'testone', 'uploads/products/1745391906_339258.jpg', 23.00, 'qwer', 'adidas', 'New', 556, 'Women', 'Glasses', '2025-04-23 00:39:35', '2025-04-23 01:20:06'),
(8, 'asd', 'uploads/products/1745492234.jpg', 234.00, 'af', 'adidas', 'New', 9, 'Children', 'Glasses', '2025-04-24 05:12:14', '2025-04-24 05:12:14');

-- --------------------------------------------------------

--
-- Table structure for table `publication_processes`
--

CREATE TABLE `publication_processes` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `page_title` varchar(255) NOT NULL,
  `section_title` varchar(255) NOT NULL,
  `section_description` text NOT NULL,
  `process_steps` longtext CHARACTER SET utf8mb4 COLLATE utf8mb4_bin NOT NULL CHECK (json_valid(`process_steps`)),
  `required_documents` longtext CHARACTER SET utf8mb4 COLLATE utf8mb4_bin NOT NULL CHECK (json_valid(`required_documents`)),
  `download_links` longtext CHARACTER SET utf8mb4 COLLATE utf8mb4_bin NOT NULL CHECK (json_valid(`download_links`)),
  `order` int(11) NOT NULL DEFAULT 0,
  `status` tinyint(1) NOT NULL DEFAULT 1,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `reports`
--

CREATE TABLE `reports` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `rules`
--

CREATE TABLE `rules` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `title` varchar(255) NOT NULL,
  `file_path` varchar(255) NOT NULL,
  `order` int(11) NOT NULL DEFAULT 0,
  `status` tinyint(1) NOT NULL DEFAULT 1,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `services`
--

CREATE TABLE `services` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `title` varchar(255) NOT NULL,
  `description` text DEFAULT NULL,
  `image` varchar(255) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `service_categories`
--

CREATE TABLE `service_categories` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) NOT NULL,
  `slug` varchar(255) NOT NULL,
  `image` varchar(255) NOT NULL,
  `image_icon` varchar(255) DEFAULT NULL,
  `description` text NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `service_categories`
--

INSERT INTO `service_categories` (`id`, `name`, `slug`, `image`, `image_icon`, `description`, `created_at`, `updated_at`) VALUES
(11, 'test', 'test', 'uploads/service-categories/1750640423_main.jpg', 'uploads/service-categories/icons/1750640423_icon.png', 'cahn', '2025-06-22 19:15:23', '2025-06-22 19:15:23');

-- --------------------------------------------------------

--
-- Table structure for table `service_flows`
--

CREATE TABLE `service_flows` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `service_name` varchar(255) NOT NULL,
  `service_slug` varchar(255) NOT NULL,
  `service_description` text NOT NULL,
  `steps` longtext CHARACTER SET utf8mb4 COLLATE utf8mb4_bin DEFAULT NULL CHECK (json_valid(`steps`)),
  `notes` longtext CHARACTER SET utf8mb4 COLLATE utf8mb4_bin DEFAULT NULL CHECK (json_valid(`notes`)),
  `order` int(11) NOT NULL DEFAULT 0,
  `is_active` tinyint(1) NOT NULL DEFAULT 1,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `service_processes`
--

CREATE TABLE `service_processes` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `title` varchar(255) NOT NULL,
  `introduction` text NOT NULL,
  `services` longtext CHARACTER SET utf8mb4 COLLATE utf8mb4_bin NOT NULL CHECK (json_valid(`services`)),
  `documents` longtext CHARACTER SET utf8mb4 COLLATE utf8mb4_bin NOT NULL CHECK (json_valid(`documents`)),
  `status` tinyint(1) NOT NULL DEFAULT 1,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `service_processes`
--

INSERT INTO `service_processes` (`id`, `title`, `introduction`, `services`, `documents`, `status`, `created_at`, `updated_at`) VALUES
(1, 'प्रकाशन अनुमति प्रक्रिया', 'पर्यटन सम्बन्धी प्रकाशनहरूको लागि अनुमति लिने प्रक्रिया:', '[\"\\u0967. \\u0906\\u0935\\u0947\\u0926\\u0928 \\u092a\\u0947\\u0936 \\u0917\\u0930\\u094d\\u0928\\u0947\",\"\\u0928\\u093f\\u0930\\u094d\\u0927\\u093e\\u0930\\u093f\\u0924 \\u092b\\u093e\\u0930\\u093e\\u092e\\u092e\\u093e \\u0906\\u0935\\u0947\\u0926\\u0928 \\u092a\\u0947\\u0936 \\u0917\\u0930\\u094d\\u0928\\u0941\\u0939\\u094b\\u0938\\u094d\",\"\\u0968. \\u0915\\u093e\\u0917\\u091c\\u093e\\u0924 \\u091c\\u093e\\u0901\\u091a\",\"\\u0915\\u093e\\u0930\\u094d\\u092f\\u093e\\u0932\\u092f\\u0932\\u0947 \\u092a\\u094d\\u0930\\u0938\\u094d\\u0924\\u093e\\u0935\\u093f\\u0924 \\u092a\\u094d\\u0930\\u0915\\u093e\\u0936\\u0928\\u0915\\u094b \\u092e\\u0938\\u094d\\u092f\\u094c\\u0926\\u093e \\u091c\\u093e\\u0901\\u091a \\u0917\\u0930\\u094d\\u0928\\u0947\",\"\\u0969. \\u0905\\u0928\\u0941\\u092e\\u0924\\u093f \\u0926\\u093f\\u0928\\u0947\",\"\\u0938\\u092c\\u0948 \\u0915\\u093e\\u0917\\u091c\\u093e\\u0924 \\u092a\\u0942\\u0930\\u093e \\u092d\\u090f\\u092e\\u093e \\u096d \\u0915\\u093e\\u0930\\u094d\\u092f\\u0926\\u093f\\u0935\\u0938\\u092d\\u093f\\u0924\\u094d\\u0930 \\u0905\\u0928\\u0941\\u092e\\u0924\\u093f \\u0926\\u093f\\u0928\\u0947\"]', '[\"\\u092a\\u094d\\u0930\\u0915\\u093e\\u0936\\u0928\\u0915\\u094b \\u092a\\u0942\\u0930\\u094d\\u0923 \\u092e\\u0938\\u094d\\u092f\\u094c\\u0926\\u093e\",\"\\u0932\\u0947\\u0916\\u0915\\u0915\\u094b \\u0928\\u093e\\u0917\\u0930\\u093f\\u0915\\u0924\\u093e \\u092a\\u094d\\u0930\\u092e\\u093e\\u0923\\u092a\\u0924\\u094d\\u0930\",\"\\u092a\\u094d\\u0930\\u0915\\u093e\\u0936\\u0915\\u0915\\u094b \\u0926\\u0930\\u094d\\u0924\\u093e \\u092a\\u094d\\u0930\\u092e\\u093e\\u0923\\u092a\\u0924\\u094d\\u0930\",\"\\u0905\\u0928\\u094d\\u092f \\u0938\\u092e\\u094d\\u092c\\u0928\\u094d\\u0927\\u093f\\u0924 \\u0915\\u093e\\u0917\\u091c\\u093e\\u0924\"]', 1, '2025-06-22 10:34:21', '2025-06-22 10:41:08');

-- --------------------------------------------------------

--
-- Table structure for table `service_products`
--

CREATE TABLE `service_products` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `service_category_id` bigint(20) UNSIGNED NOT NULL,
  `title` varchar(255) NOT NULL,
  `image` varchar(255) NOT NULL,
  `description` text NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `sessions`
--

CREATE TABLE `sessions` (
  `id` varchar(255) NOT NULL,
  `user_id` bigint(20) UNSIGNED DEFAULT NULL,
  `ip_address` varchar(45) DEFAULT NULL,
  `user_agent` text DEFAULT NULL,
  `payload` longtext NOT NULL,
  `last_activity` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `sessions`
--

INSERT INTO `sessions` (`id`, `user_id`, `ip_address`, `user_agent`, `payload`, `last_activity`) VALUES
('A54omuK6nADhH8QIsvNK2SHXaL0sK0YKh8ZZSw1I', 9, '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/137.0.0.0 Safari/537.36', 'YTo2OntzOjY6Il90b2tlbiI7czo0MDoid3B6ZVFkOElnU0xkVHdnUFdtbEdLbFBLTHlTeGNXaDMzaWpyWVN5NyI7czo5OiJfcHJldmlvdXMiO2E6MTp7czozOiJ1cmwiO3M6MzQ6Imh0dHA6Ly8xMjcuMC4wLjE6ODAwMC90ZXN0aW1vbmlhbHMiO31zOjY6Il9mbGFzaCI7YToyOntzOjM6Im9sZCI7YTowOnt9czozOiJuZXciO2E6MDp7fX1zOjY6ImxvY2FsZSI7czoyOiJucCI7czozOiJ1cmwiO2E6MDp7fXM6NTA6ImxvZ2luX3dlYl81OWJhMzZhZGRjMmIyZjk0MDE1ODBmMDE0YzdmNThlYTRlMzA5ODlkIjtpOjk7fQ==', 1750641946);

-- --------------------------------------------------------

--
-- Table structure for table `subcategories`
--

CREATE TABLE `subcategories` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `category_id` bigint(20) UNSIGNED NOT NULL,
  `title` varchar(255) NOT NULL,
  `description` text DEFAULT NULL,
  `image` varchar(255) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `subcategories`
--

INSERT INTO `subcategories` (`id`, `category_id`, `title`, `description`, `image`, `created_at`, `updated_at`) VALUES
(7, 4, 'आवश्यक कागजातहरू:', '<ul><li>नागरिकताको प्रमाणपत्र</li><li>शैक्षिक योग्यताको प्रमाणपत्र</li><li>चरित्र प्रमाणपत्र</li></ul>', 'uploads/subcategories/1750641915.jpg', '2025-04-30 03:08:10', '2025-06-22 19:40:15');

-- --------------------------------------------------------

--
-- Table structure for table `teams`
--

CREATE TABLE `teams` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `team_type` varchar(255) NOT NULL,
  `name` varchar(255) NOT NULL,
  `position` varchar(255) NOT NULL,
  `image` varchar(255) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `phone` varchar(255) NOT NULL,
  `description` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `team_lalitpur_members`
--

CREATE TABLE `team_lalitpur_members` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `image_path` varchar(255) NOT NULL,
  `name_en` varchar(255) NOT NULL,
  `name_np` varchar(255) NOT NULL,
  `position_en` varchar(255) NOT NULL,
  `position_np` varchar(255) NOT NULL,
  `phone` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `is_spokesperson` tinyint(1) NOT NULL DEFAULT 0,
  `order` int(11) NOT NULL DEFAULT 0,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `team_lalitpur_members`
--

INSERT INTO `team_lalitpur_members` (`id`, `image_path`, `name_en`, `name_np`, `position_en`, `position_np`, `phone`, `email`, `is_spokesperson`, `order`, `created_at`, `updated_at`) VALUES
(1, 'uploads/team-lalitpur/1750540784.jpg', 'Chiri Babu Maharjan', 'चिरिबाबु महर्जन', 'Mayor', 'नगर प्रमुख', '9823846254', 'info@eyeclinic.com', 0, 1, '2025-06-21 15:34:44', '2025-06-21 15:34:44');

-- --------------------------------------------------------

--
-- Table structure for table `team_members`
--

CREATE TABLE `team_members` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name_en` varchar(255) NOT NULL,
  `name_np` varchar(255) NOT NULL,
  `position_en` varchar(255) NOT NULL,
  `position_np` varchar(255) NOT NULL,
  `image` varchar(255) DEFAULT NULL,
  `order` int(11) NOT NULL DEFAULT 0,
  `status` tinyint(1) NOT NULL DEFAULT 1,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `team_members`
--

INSERT INTO `team_members` (`id`, `name_en`, `name_np`, `position_en`, `position_np`, `image`, `order`, `status`, `created_at`, `updated_at`) VALUES
(2, 'Chiri Babu Maharjan', 'चिरिबाबु महर्जन', 'Mayor', 'नगर प्रमुख', 'uploads/team/1750608815.jpeg', 1, 1, '2025-06-22 10:28:35', '2025-06-22 10:28:35');

-- --------------------------------------------------------

--
-- Table structure for table `testimonials`
--

CREATE TABLE `testimonials` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) NOT NULL,
  `position` varchar(255) NOT NULL,
  `desc` text NOT NULL,
  `image` varchar(255) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `test_preparations`
--

CREATE TABLE `test_preparations` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `title` varchar(255) NOT NULL,
  `description` text DEFAULT NULL,
  `image` varchar(255) DEFAULT NULL,
  `service_category_id` int(11) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `test_preparations`
--

INSERT INTO `test_preparations` (`id`, `title`, `description`, `image`, `service_category_id`, `created_at`, `updated_at`) VALUES
(9, 'हाम्रो कार्यालयले निम्न नागरिक सेवाहरू प्रदान गर्दछ:', 'हाम्रो कार्यालयले निम्न नागरिक सेवाहरू प्रदान गर्दछ:', 'uploads/testpreparations/1750641232.png', 11, '2025-04-29 05:46:37', '2025-06-22 19:28:52');

-- --------------------------------------------------------

--
-- Table structure for table `test_preparation_items`
--

CREATE TABLE `test_preparation_items` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `test_preparation_id` bigint(20) UNSIGNED NOT NULL,
  `title` varchar(255) NOT NULL,
  `description` text DEFAULT NULL,
  `image` varchar(255) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `test_preparation_items`
--

INSERT INTO `test_preparation_items` (`id`, `test_preparation_id`, `title`, `description`, `image`, `created_at`, `updated_at`) VALUES
(22, 9, 'हाम्रो कार्यालयले निम्न नागरिक सेवाहरू प्रदान गर्दछ: section', 'हाम्रो कार्यालयले निम्न नागरिक सेवाहरू प्रदान गर्दछ: desc', 'uploads/testpreparations/items/1750641232_0.png', '2025-06-22 19:28:52', '2025-06-22 19:28:52');

-- --------------------------------------------------------

--
-- Table structure for table `top_universities`
--

CREATE TABLE `top_universities` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) NOT NULL,
  `image_path` varchar(255) NOT NULL,
  `url` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `top_universities`
--

INSERT INTO `top_universities` (`id`, `name`, `image_path`, `url`, `created_at`, `updated_at`) VALUES
(1, 'Ozford Institute of Higher Education', 'uploads/topuniversities/1745734964.png', 'https://www.udemy.com/course/react-the-complete-guide-incl-redux/?couponCode=ST22MT240325G1', '2025-04-27 00:36:47', '2025-04-27 00:37:44'),
(2, 'The University of Sydney', 'uploads/topuniversities/1745734993.png', 'https://www.udemy.com/course/react-the-complete-guide-incl-redux/?couponCode=ST22MT240325G1', '2025-04-27 00:38:13', '2025-04-27 00:38:13');

-- --------------------------------------------------------

--
-- Table structure for table `tourism_statistics`
--

CREATE TABLE `tourism_statistics` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `year` varchar(255) NOT NULL,
  `domestic_tourists` int(11) NOT NULL,
  `foreign_tourists` int(11) NOT NULL,
  `growth_rate` double NOT NULL,
  `order` int(11) NOT NULL DEFAULT 0,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `password` varchar(255) NOT NULL,
  `remember_token` varchar(100) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `name`, `email`, `email_verified_at`, `password`, `remember_token`, `created_at`, `updated_at`) VALUES
(7, 'lily education', 'lily@education.com', NULL, '$2y$12$egRHC4M7/VxELZ2QO.1y8.5XE8MoQP3cCBkscPsFA2FChjcTSV.sm', NULL, '2025-05-01 05:02:10', '2025-05-01 05:02:10'),
(8, 'biki', 'biki@bikash.com', NULL, '$2y$12$UsFgjoryVXD4PuhtHML5gehDeSpMoc8Knka3zSAmIB3xxBZhsdKmC', NULL, '2025-05-01 05:03:55', '2025-05-01 05:03:55'),
(9, 'shipping', 'info@shipping.com', NULL, '$2y$12$ZkGcKlgNX.wQB6ULZBJHyehbueXmbgbvvCBWLIMXVjelYKm4pSHq2', NULL, '2025-05-04 21:28:16', '2025-05-04 21:28:16');

-- --------------------------------------------------------

--
-- Table structure for table `visitors`
--

CREATE TABLE `visitors` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `ip` varchar(255) NOT NULL,
  `device_name` varchar(255) DEFAULT NULL,
  `browser` varchar(255) DEFAULT NULL,
  `location` varchar(255) DEFAULT NULL,
  `visitor_name` varchar(255) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `about_us`
--
ALTER TABLE `about_us`
  ADD PRIMARY KEY (`id`),
  ADD KEY `about_us_about_us_group_id_foreign` (`about_us_group_id`);

--
-- Indexes for table `about_us_groups`
--
ALTER TABLE `about_us_groups`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `advertisements`
--
ALTER TABLE `advertisements`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `banners`
--
ALTER TABLE `banners`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `blogs`
--
ALTER TABLE `blogs`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `blogs_slug_unique` (`slug`);

--
-- Indexes for table `cache`
--
ALTER TABLE `cache`
  ADD PRIMARY KEY (`key`);

--
-- Indexes for table `cache_locks`
--
ALTER TABLE `cache_locks`
  ADD PRIMARY KEY (`key`);

--
-- Indexes for table `categories`
--
ALTER TABLE `categories`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `certificates`
--
ALTER TABLE `certificates`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `citizen_charters`
--
ALTER TABLE `citizen_charters`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `citizen_services`
--
ALTER TABLE `citizen_services`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `contact_infos`
--
ALTER TABLE `contact_infos`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `core_values`
--
ALTER TABLE `core_values`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `documents`
--
ALTER TABLE `documents`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `failed_jobs_uuid_unique` (`uuid`);

--
-- Indexes for table `galleries`
--
ALTER TABLE `galleries`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `jobs`
--
ALTER TABLE `jobs`
  ADD PRIMARY KEY (`id`),
  ADD KEY `jobs_queue_index` (`queue`);

--
-- Indexes for table `job_batches`
--
ALTER TABLE `job_batches`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `locations`
--
ALTER TABLE `locations`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `menu_categories`
--
ALTER TABLE `menu_categories`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `menu_products`
--
ALTER TABLE `menu_products`
  ADD PRIMARY KEY (`id`),
  ADD KEY `menu_products_menu_category_id_foreign` (`menu_category_id`);

--
-- Indexes for table `messages`
--
ALTER TABLE `messages`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `office_chiefs`
--
ALTER TABLE `office_chiefs`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `office_introductions`
--
ALTER TABLE `office_introductions`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `organizational_structures`
--
ALTER TABLE `organizational_structures`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `other_services`
--
ALTER TABLE `other_services`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `page_banners`
--
ALTER TABLE `page_banners`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `password_reset_tokens`
--
ALTER TABLE `password_reset_tokens`
  ADD PRIMARY KEY (`email`);

--
-- Indexes for table `press_categories`
--
ALTER TABLE `press_categories`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `press_releases`
--
ALTER TABLE `press_releases`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `products`
--
ALTER TABLE `products`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `publication_processes`
--
ALTER TABLE `publication_processes`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `reports`
--
ALTER TABLE `reports`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `rules`
--
ALTER TABLE `rules`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `services`
--
ALTER TABLE `services`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `service_categories`
--
ALTER TABLE `service_categories`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `service_flows`
--
ALTER TABLE `service_flows`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `service_flows_service_slug_unique` (`service_slug`);

--
-- Indexes for table `service_processes`
--
ALTER TABLE `service_processes`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `service_products`
--
ALTER TABLE `service_products`
  ADD PRIMARY KEY (`id`),
  ADD KEY `service_products_service_category_id_foreign` (`service_category_id`);

--
-- Indexes for table `sessions`
--
ALTER TABLE `sessions`
  ADD PRIMARY KEY (`id`),
  ADD KEY `sessions_user_id_index` (`user_id`),
  ADD KEY `sessions_last_activity_index` (`last_activity`);

--
-- Indexes for table `subcategories`
--
ALTER TABLE `subcategories`
  ADD PRIMARY KEY (`id`),
  ADD KEY `subcategories_category_id_foreign` (`category_id`);

--
-- Indexes for table `teams`
--
ALTER TABLE `teams`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `team_lalitpur_members`
--
ALTER TABLE `team_lalitpur_members`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `team_members`
--
ALTER TABLE `team_members`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `testimonials`
--
ALTER TABLE `testimonials`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `test_preparations`
--
ALTER TABLE `test_preparations`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `test_preparation_items`
--
ALTER TABLE `test_preparation_items`
  ADD PRIMARY KEY (`id`),
  ADD KEY `test_preparation_items_test_preparation_id_foreign` (`test_preparation_id`);

--
-- Indexes for table `top_universities`
--
ALTER TABLE `top_universities`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tourism_statistics`
--
ALTER TABLE `tourism_statistics`
  ADD PRIMARY KEY (`id`);

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
-- AUTO_INCREMENT for table `about_us`
--
ALTER TABLE `about_us`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;

--
-- AUTO_INCREMENT for table `about_us_groups`
--
ALTER TABLE `about_us_groups`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `advertisements`
--
ALTER TABLE `advertisements`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `banners`
--
ALTER TABLE `banners`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `blogs`
--
ALTER TABLE `blogs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=22;

--
-- AUTO_INCREMENT for table `categories`
--
ALTER TABLE `categories`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `certificates`
--
ALTER TABLE `certificates`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `citizen_charters`
--
ALTER TABLE `citizen_charters`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `citizen_services`
--
ALTER TABLE `citizen_services`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `contact_infos`
--
ALTER TABLE `contact_infos`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `core_values`
--
ALTER TABLE `core_values`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `documents`
--
ALTER TABLE `documents`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `galleries`
--
ALTER TABLE `galleries`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;

--
-- AUTO_INCREMENT for table `jobs`
--
ALTER TABLE `jobs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `locations`
--
ALTER TABLE `locations`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `menu_categories`
--
ALTER TABLE `menu_categories`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=18;

--
-- AUTO_INCREMENT for table `menu_products`
--
ALTER TABLE `menu_products`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=24;

--
-- AUTO_INCREMENT for table `messages`
--
ALTER TABLE `messages`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=70;

--
-- AUTO_INCREMENT for table `office_chiefs`
--
ALTER TABLE `office_chiefs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `office_introductions`
--
ALTER TABLE `office_introductions`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `organizational_structures`
--
ALTER TABLE `organizational_structures`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `other_services`
--
ALTER TABLE `other_services`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `page_banners`
--
ALTER TABLE `page_banners`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `press_categories`
--
ALTER TABLE `press_categories`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `press_releases`
--
ALTER TABLE `press_releases`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `products`
--
ALTER TABLE `products`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `publication_processes`
--
ALTER TABLE `publication_processes`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `reports`
--
ALTER TABLE `reports`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `rules`
--
ALTER TABLE `rules`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `services`
--
ALTER TABLE `services`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `service_categories`
--
ALTER TABLE `service_categories`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT for table `service_flows`
--
ALTER TABLE `service_flows`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `service_processes`
--
ALTER TABLE `service_processes`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `service_products`
--
ALTER TABLE `service_products`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `subcategories`
--
ALTER TABLE `subcategories`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `teams`
--
ALTER TABLE `teams`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `team_lalitpur_members`
--
ALTER TABLE `team_lalitpur_members`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `team_members`
--
ALTER TABLE `team_members`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `testimonials`
--
ALTER TABLE `testimonials`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `test_preparations`
--
ALTER TABLE `test_preparations`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT for table `test_preparation_items`
--
ALTER TABLE `test_preparation_items`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=23;

--
-- AUTO_INCREMENT for table `top_universities`
--
ALTER TABLE `top_universities`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `tourism_statistics`
--
ALTER TABLE `tourism_statistics`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `visitors`
--
ALTER TABLE `visitors`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `about_us`
--
ALTER TABLE `about_us`
  ADD CONSTRAINT `about_us_about_us_group_id_foreign` FOREIGN KEY (`about_us_group_id`) REFERENCES `about_us_groups` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `menu_products`
--
ALTER TABLE `menu_products`
  ADD CONSTRAINT `menu_products_menu_category_id_foreign` FOREIGN KEY (`menu_category_id`) REFERENCES `menu_categories` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `service_products`
--
ALTER TABLE `service_products`
  ADD CONSTRAINT `service_products_service_category_id_foreign` FOREIGN KEY (`service_category_id`) REFERENCES `service_categories` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `subcategories`
--
ALTER TABLE `subcategories`
  ADD CONSTRAINT `subcategories_category_id_foreign` FOREIGN KEY (`category_id`) REFERENCES `categories` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `test_preparation_items`
--
ALTER TABLE `test_preparation_items`
  ADD CONSTRAINT `test_preparation_items_test_preparation_id_foreign` FOREIGN KEY (`test_preparation_id`) REFERENCES `test_preparations` (`id`) ON DELETE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
