-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Anamakine: localhost:3306
-- Üretim Zamanı: 01 May 2025, 21:26:04
-- Sunucu sürümü: 8.0.30
-- PHP Sürümü: 8.2.27

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Veritabanı: `laravel_multi_language_blog`
--

-- --------------------------------------------------------

--
-- Tablo için tablo yapısı `cache`
--

CREATE TABLE `cache` (
  `key` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `value` mediumtext CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `expiration` int NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Tablo döküm verisi `cache`
--

INSERT INTO `cache` (`key`, `value`, `expiration`) VALUES
('laravel_cache_404_requests_127.0.0.1', 'i:7;', 1746122610),
('laravel_cache_languages', 'O:39:\"Illuminate\\Database\\Eloquent\\Collection\":2:{s:8:\"\0*\0items\";a:4:{i:0;O:19:\"App\\Models\\Language\":31:{s:13:\"\0*\0connection\";s:5:\"mysql\";s:8:\"\0*\0table\";s:9:\"languages\";s:13:\"\0*\0primaryKey\";s:2:\"id\";s:10:\"\0*\0keyType\";s:3:\"int\";s:12:\"incrementing\";b:1;s:7:\"\0*\0with\";a:0:{}s:12:\"\0*\0withCount\";a:0:{}s:19:\"preventsLazyLoading\";b:0;s:10:\"\0*\0perPage\";i:15;s:6:\"exists\";b:1;s:18:\"wasRecentlyCreated\";b:0;s:28:\"\0*\0escapeWhenCastingToString\";b:0;s:13:\"\0*\0attributes\";a:8:{s:2:\"id\";i:1;s:4:\"name\";s:8:\"Türkçe\";s:4:\"slug\";s:2:\"tr\";s:4:\"flag\";s:2:\"tr\";s:6:\"status\";i:1;s:10:\"is_default\";i:1;s:10:\"created_at\";s:19:\"2025-04-10 22:29:24\";s:10:\"updated_at\";s:19:\"2025-05-01 19:39:25\";}s:11:\"\0*\0original\";a:8:{s:2:\"id\";i:1;s:4:\"name\";s:8:\"Türkçe\";s:4:\"slug\";s:2:\"tr\";s:4:\"flag\";s:2:\"tr\";s:6:\"status\";i:1;s:10:\"is_default\";i:1;s:10:\"created_at\";s:19:\"2025-04-10 22:29:24\";s:10:\"updated_at\";s:19:\"2025-05-01 19:39:25\";}s:10:\"\0*\0changes\";a:0:{}s:8:\"\0*\0casts\";a:0:{}s:17:\"\0*\0classCastCache\";a:0:{}s:21:\"\0*\0attributeCastCache\";a:0:{}s:13:\"\0*\0dateFormat\";N;s:10:\"\0*\0appends\";a:0:{}s:19:\"\0*\0dispatchesEvents\";a:0:{}s:14:\"\0*\0observables\";a:0:{}s:12:\"\0*\0relations\";a:0:{}s:10:\"\0*\0touches\";a:0:{}s:27:\"\0*\0relationAutoloadCallback\";N;s:10:\"timestamps\";b:1;s:13:\"usesUniqueIds\";b:0;s:9:\"\0*\0hidden\";a:0:{}s:10:\"\0*\0visible\";a:0:{}s:11:\"\0*\0fillable\";a:5:{i:0;s:4:\"name\";i:1;s:4:\"slug\";i:2;s:4:\"flag\";i:3;s:6:\"status\";i:4;s:10:\"is_default\";}s:10:\"\0*\0guarded\";a:1:{i:0;s:1:\"*\";}}i:1;O:19:\"App\\Models\\Language\":31:{s:13:\"\0*\0connection\";s:5:\"mysql\";s:8:\"\0*\0table\";s:9:\"languages\";s:13:\"\0*\0primaryKey\";s:2:\"id\";s:10:\"\0*\0keyType\";s:3:\"int\";s:12:\"incrementing\";b:1;s:7:\"\0*\0with\";a:0:{}s:12:\"\0*\0withCount\";a:0:{}s:19:\"preventsLazyLoading\";b:0;s:10:\"\0*\0perPage\";i:15;s:6:\"exists\";b:1;s:18:\"wasRecentlyCreated\";b:0;s:28:\"\0*\0escapeWhenCastingToString\";b:0;s:13:\"\0*\0attributes\";a:8:{s:2:\"id\";i:2;s:4:\"name\";s:14:\"Русский\";s:4:\"slug\";s:2:\"ru\";s:4:\"flag\";s:2:\"ru\";s:6:\"status\";i:1;s:10:\"is_default\";i:0;s:10:\"created_at\";s:19:\"2025-04-09 21:56:14\";s:10:\"updated_at\";s:19:\"2025-05-01 19:39:25\";}s:11:\"\0*\0original\";a:8:{s:2:\"id\";i:2;s:4:\"name\";s:14:\"Русский\";s:4:\"slug\";s:2:\"ru\";s:4:\"flag\";s:2:\"ru\";s:6:\"status\";i:1;s:10:\"is_default\";i:0;s:10:\"created_at\";s:19:\"2025-04-09 21:56:14\";s:10:\"updated_at\";s:19:\"2025-05-01 19:39:25\";}s:10:\"\0*\0changes\";a:0:{}s:8:\"\0*\0casts\";a:0:{}s:17:\"\0*\0classCastCache\";a:0:{}s:21:\"\0*\0attributeCastCache\";a:0:{}s:13:\"\0*\0dateFormat\";N;s:10:\"\0*\0appends\";a:0:{}s:19:\"\0*\0dispatchesEvents\";a:0:{}s:14:\"\0*\0observables\";a:0:{}s:12:\"\0*\0relations\";a:0:{}s:10:\"\0*\0touches\";a:0:{}s:27:\"\0*\0relationAutoloadCallback\";N;s:10:\"timestamps\";b:1;s:13:\"usesUniqueIds\";b:0;s:9:\"\0*\0hidden\";a:0:{}s:10:\"\0*\0visible\";a:0:{}s:11:\"\0*\0fillable\";a:5:{i:0;s:4:\"name\";i:1;s:4:\"slug\";i:2;s:4:\"flag\";i:3;s:6:\"status\";i:4;s:10:\"is_default\";}s:10:\"\0*\0guarded\";a:1:{i:0;s:1:\"*\";}}i:2;O:19:\"App\\Models\\Language\":31:{s:13:\"\0*\0connection\";s:5:\"mysql\";s:8:\"\0*\0table\";s:9:\"languages\";s:13:\"\0*\0primaryKey\";s:2:\"id\";s:10:\"\0*\0keyType\";s:3:\"int\";s:12:\"incrementing\";b:1;s:7:\"\0*\0with\";a:0:{}s:12:\"\0*\0withCount\";a:0:{}s:19:\"preventsLazyLoading\";b:0;s:10:\"\0*\0perPage\";i:15;s:6:\"exists\";b:1;s:18:\"wasRecentlyCreated\";b:0;s:28:\"\0*\0escapeWhenCastingToString\";b:0;s:13:\"\0*\0attributes\";a:8:{s:2:\"id\";i:3;s:4:\"name\";s:7:\"English\";s:4:\"slug\";s:2:\"en\";s:4:\"flag\";s:2:\"gb\";s:6:\"status\";i:1;s:10:\"is_default\";i:0;s:10:\"created_at\";s:19:\"2025-04-09 21:56:24\";s:10:\"updated_at\";s:19:\"2025-05-01 18:15:42\";}s:11:\"\0*\0original\";a:8:{s:2:\"id\";i:3;s:4:\"name\";s:7:\"English\";s:4:\"slug\";s:2:\"en\";s:4:\"flag\";s:2:\"gb\";s:6:\"status\";i:1;s:10:\"is_default\";i:0;s:10:\"created_at\";s:19:\"2025-04-09 21:56:24\";s:10:\"updated_at\";s:19:\"2025-05-01 18:15:42\";}s:10:\"\0*\0changes\";a:0:{}s:8:\"\0*\0casts\";a:0:{}s:17:\"\0*\0classCastCache\";a:0:{}s:21:\"\0*\0attributeCastCache\";a:0:{}s:13:\"\0*\0dateFormat\";N;s:10:\"\0*\0appends\";a:0:{}s:19:\"\0*\0dispatchesEvents\";a:0:{}s:14:\"\0*\0observables\";a:0:{}s:12:\"\0*\0relations\";a:0:{}s:10:\"\0*\0touches\";a:0:{}s:27:\"\0*\0relationAutoloadCallback\";N;s:10:\"timestamps\";b:1;s:13:\"usesUniqueIds\";b:0;s:9:\"\0*\0hidden\";a:0:{}s:10:\"\0*\0visible\";a:0:{}s:11:\"\0*\0fillable\";a:5:{i:0;s:4:\"name\";i:1;s:4:\"slug\";i:2;s:4:\"flag\";i:3;s:6:\"status\";i:4;s:10:\"is_default\";}s:10:\"\0*\0guarded\";a:1:{i:0;s:1:\"*\";}}i:3;O:19:\"App\\Models\\Language\":31:{s:13:\"\0*\0connection\";s:5:\"mysql\";s:8:\"\0*\0table\";s:9:\"languages\";s:13:\"\0*\0primaryKey\";s:2:\"id\";s:10:\"\0*\0keyType\";s:3:\"int\";s:12:\"incrementing\";b:1;s:7:\"\0*\0with\";a:0:{}s:12:\"\0*\0withCount\";a:0:{}s:19:\"preventsLazyLoading\";b:0;s:10:\"\0*\0perPage\";i:15;s:6:\"exists\";b:1;s:18:\"wasRecentlyCreated\";b:0;s:28:\"\0*\0escapeWhenCastingToString\";b:0;s:13:\"\0*\0attributes\";a:8:{s:2:\"id\";i:4;s:4:\"name\";s:9:\"Français\";s:4:\"slug\";s:2:\"fr\";s:4:\"flag\";s:2:\"fr\";s:6:\"status\";i:1;s:10:\"is_default\";i:0;s:10:\"created_at\";s:19:\"2025-04-09 21:57:38\";s:10:\"updated_at\";s:19:\"2025-05-01 18:20:13\";}s:11:\"\0*\0original\";a:8:{s:2:\"id\";i:4;s:4:\"name\";s:9:\"Français\";s:4:\"slug\";s:2:\"fr\";s:4:\"flag\";s:2:\"fr\";s:6:\"status\";i:1;s:10:\"is_default\";i:0;s:10:\"created_at\";s:19:\"2025-04-09 21:57:38\";s:10:\"updated_at\";s:19:\"2025-05-01 18:20:13\";}s:10:\"\0*\0changes\";a:0:{}s:8:\"\0*\0casts\";a:0:{}s:17:\"\0*\0classCastCache\";a:0:{}s:21:\"\0*\0attributeCastCache\";a:0:{}s:13:\"\0*\0dateFormat\";N;s:10:\"\0*\0appends\";a:0:{}s:19:\"\0*\0dispatchesEvents\";a:0:{}s:14:\"\0*\0observables\";a:0:{}s:12:\"\0*\0relations\";a:0:{}s:10:\"\0*\0touches\";a:0:{}s:27:\"\0*\0relationAutoloadCallback\";N;s:10:\"timestamps\";b:1;s:13:\"usesUniqueIds\";b:0;s:9:\"\0*\0hidden\";a:0:{}s:10:\"\0*\0visible\";a:0:{}s:11:\"\0*\0fillable\";a:5:{i:0;s:4:\"name\";i:1;s:4:\"slug\";i:2;s:4:\"flag\";i:3;s:6:\"status\";i:4;s:10:\"is_default\";}s:10:\"\0*\0guarded\";a:1:{i:0;s:1:\"*\";}}}s:28:\"\0*\0escapeWhenCastingToString\";b:0;}', 1746214765);

-- --------------------------------------------------------

--
-- Tablo için tablo yapısı `cache_locks`
--

CREATE TABLE `cache_locks` (
  `key` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `owner` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `expiration` int NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Tablo için tablo yapısı `categories`
--

CREATE TABLE `categories` (
  `id` bigint UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Tablo döküm verisi `categories`
--

INSERT INTO `categories` (`id`, `created_at`, `updated_at`) VALUES
(1, '2025-04-10 19:30:02', '2025-04-10 19:30:02'),
(2, '2025-04-10 19:30:06', '2025-04-10 19:30:06'),
(3, '2025-04-10 19:30:09', '2025-04-10 19:30:09');

-- --------------------------------------------------------

--
-- Tablo için tablo yapısı `category_translations`
--

CREATE TABLE `category_translations` (
  `id` bigint UNSIGNED NOT NULL,
  `category_id` bigint UNSIGNED NOT NULL,
  `language_slug` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `name` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `slug` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `seo_title` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `seo_description` text CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci,
  `seo_keywords` text CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Tablo döküm verisi `category_translations`
--

INSERT INTO `category_translations` (`id`, `category_id`, `language_slug`, `name`, `slug`, `seo_title`, `seo_description`, `seo_keywords`, `created_at`, `updated_at`) VALUES
(1, 1, 'tr', 'Teknoloji', 'teknoloji', 'Teknoloji Kategorisi', 'Teknoloji hakkında yazılar', 'teknoloji, yenilik, dijital', '2025-04-10 19:30:02', '2025-04-10 19:30:02'),
(2, 1, 'ru', 'Технологии', 'tekhnologii', 'Категория технологий', 'Статьи о технологиях', 'технологии, инновации, цифровой', '2025-04-10 19:30:02', '2025-04-10 19:30:02'),
(3, 1, 'en', 'Technology', 'technology', 'Technology Category', 'Posts about technology', 'technology, innovation, digital', '2025-04-10 19:30:02', '2025-04-10 19:30:02'),
(4, 1, 'fr', 'Technologie', 'technologie', 'Catégorie Technologie', 'Articles sur la technologie', 'technologie, innovation, numérique', '2025-04-10 19:30:02', '2025-04-10 19:30:02'),
(5, 2, 'tr', 'Yazılım', 'yazilim', 'Yazılım Kategorisi', 'Yazılım geliştirme hakkında içerikler', 'yazılım, kodlama, programlama', '2025-04-10 19:30:06', '2025-04-10 19:30:06'),
(6, 2, 'ru', 'Программное обеспечение', 'software-ru', 'Категория программного обеспечения', 'Информация о разработке программ', 'программирование, код, разработка', '2025-04-10 19:30:06', '2025-04-10 19:30:06'),
(7, 2, 'en', 'Software', 'software', 'Software Category', 'Articles about software development', 'software, programming, development', '2025-04-10 19:30:06', '2025-04-10 19:30:06'),
(8, 2, 'fr', 'Logiciel', 'logiciel', 'Catégorie Logiciel', 'Articles sur le développement logiciel', 'logiciel, programmation, développement', '2025-04-10 19:30:06', '2025-04-10 19:30:06'),
(9, 3, 'tr', 'Web Geliştirme', 'web-gelistirme', 'Web Geliştirme Kategorisi', 'Frontend ve backend hakkında içerikler', 'web, frontend, backend', '2025-04-10 19:30:09', '2025-04-10 19:30:09'),
(10, 3, 'ru', 'Веб-разработка', 'web-razrabotka', 'Категория веб-разработки', 'Frontend и backend статьи', 'веб, фронтенд, бэкенд', '2025-04-10 19:30:09', '2025-04-10 19:30:09'),
(11, 3, 'en', 'Web Development', 'web-development', 'Web Development Category', 'Articles on frontend and backend', 'web, frontend, backend', '2025-04-10 19:30:09', '2025-04-10 19:30:09'),
(12, 3, 'fr', 'Développement Web', 'developpement-web', 'Catégorie Développement Web', 'Contenu sur frontend et backend', 'web, frontend, backend', '2025-04-10 19:30:09', '2025-04-10 19:30:09');

-- --------------------------------------------------------

--
-- Tablo için tablo yapısı `failed_jobs`
--

CREATE TABLE `failed_jobs` (
  `id` bigint UNSIGNED NOT NULL,
  `uuid` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `connection` text CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `queue` text CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `payload` longtext CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `exception` longtext CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `failed_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Tablo için tablo yapısı `jobs`
--

CREATE TABLE `jobs` (
  `id` bigint UNSIGNED NOT NULL,
  `queue` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `payload` longtext CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `attempts` tinyint UNSIGNED NOT NULL,
  `reserved_at` int UNSIGNED DEFAULT NULL,
  `available_at` int UNSIGNED NOT NULL,
  `created_at` int UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Tablo için tablo yapısı `job_batches`
--

CREATE TABLE `job_batches` (
  `id` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `name` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `total_jobs` int NOT NULL,
  `pending_jobs` int NOT NULL,
  `failed_jobs` int NOT NULL,
  `failed_job_ids` longtext CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `options` mediumtext CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci,
  `cancelled_at` int DEFAULT NULL,
  `created_at` int NOT NULL,
  `finished_at` int DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Tablo için tablo yapısı `languages`
--

CREATE TABLE `languages` (
  `id` bigint UNSIGNED NOT NULL,
  `name` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `slug` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `flag` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `status` tinyint(1) NOT NULL DEFAULT '1',
  `is_default` tinyint(1) NOT NULL DEFAULT '0',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Tablo döküm verisi `languages`
--

INSERT INTO `languages` (`id`, `name`, `slug`, `flag`, `status`, `is_default`, `created_at`, `updated_at`) VALUES
(1, 'Türkçe', 'tr', 'tr', 1, 1, '2025-04-10 19:29:24', '2025-05-01 16:39:25'),
(2, 'Русский', 'ru', 'ru', 1, 0, '2025-04-09 18:56:14', '2025-05-01 16:39:25'),
(3, 'English', 'en', 'gb', 1, 0, '2025-04-09 18:56:24', '2025-05-01 15:15:42'),
(4, 'Français', 'fr', 'fr', 1, 0, '2025-04-09 18:57:38', '2025-05-01 15:20:13');

-- --------------------------------------------------------

--
-- Tablo için tablo yapısı `migrations`
--

CREATE TABLE `migrations` (
  `id` int UNSIGNED NOT NULL,
  `migration` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `batch` int NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Tablo döküm verisi `migrations`
--

INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES
(1, '0001_01_01_000000_create_users_table', 1),
(2, '0001_01_01_000001_create_cache_table', 1),
(3, '0001_01_01_000002_create_jobs_table', 1),
(4, '2025_04_07_111339_create_categories_table', 1),
(5, '2025_04_07_111339_create_languages_table', 1),
(6, '2025_04_07_111339_create_posts_table', 1),
(7, '2025_04_07_111340_create_post_translations_table', 1),
(8, '2025_04_07_111341_create_category_translations_table', 1),
(9, '2025_04_07_111341_create_tags_table', 1),
(10, '2025_04_07_111342_create_post_category_table', 1),
(11, '2025_04_07_111342_create_tag_translations_table', 1),
(12, '2025_04_07_111343_create_post_tag_table', 1);

-- --------------------------------------------------------

--
-- Tablo için tablo yapısı `password_reset_tokens`
--

CREATE TABLE `password_reset_tokens` (
  `email` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Tablo için tablo yapısı `posts`
--

CREATE TABLE `posts` (
  `id` bigint UNSIGNED NOT NULL,
  `user_id` bigint UNSIGNED NOT NULL,
  `category_id` bigint UNSIGNED DEFAULT NULL,
  `order` int NOT NULL DEFAULT '0',
  `cover_image` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `gallery_images` json DEFAULT NULL,
  `is_featured` tinyint(1) NOT NULL DEFAULT '0',
  `comment_enabled` tinyint(1) NOT NULL DEFAULT '1',
  `status` enum('draft','published') CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'draft',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Tablo döküm verisi `posts`
--

INSERT INTO `posts` (`id`, `user_id`, `category_id`, `order`, `cover_image`, `gallery_images`, `is_featured`, `comment_enabled`, `status`, `created_at`, `updated_at`) VALUES
(17, 1, 3, 10, 'uploads/posts\\20230907_182849.webp', NULL, 0, 0, 'published', '2025-04-13 20:41:26', '2025-05-01 16:42:26'),
(18, 1, 1, 9, 'uploads/posts\\20230909_175732.webp', NULL, 1, 0, 'published', '2025-04-13 20:41:46', '2025-05-01 16:42:29'),
(19, 1, 3, 8, 'uploads/posts\\20230909_183832.webp', NULL, 1, 1, 'published', '2025-04-13 20:41:49', '2025-05-01 18:02:02'),
(20, 1, 1, 7, 'uploads/posts\\20230913_184324_1694621001259.webp', NULL, 1, 1, 'published', '2025-04-13 20:41:55', '2025-05-01 16:42:30'),
(21, 1, 1, 6, 'uploads/posts\\20231102_170818_1698934132079.webp', NULL, 0, 1, 'published', '2025-04-13 20:42:00', '2025-05-01 18:02:00'),
(22, 1, 2, 5, 'uploads/posts\\20231105_211130_1699209074955.webp', NULL, 1, 1, 'published', '2025-04-13 20:42:03', '2025-05-01 18:01:59'),
(23, 1, 2, 4, 'uploads/posts\\20231107_131511_1699368815799.webp', '[]', 0, 0, 'published', '2025-04-13 20:42:07', '2025-05-01 18:22:58'),
(28, 2, 1, 1, 'uploads/posts\\coin40.webp', '[]', 0, 1, 'published', '2025-05-01 15:09:43', '2025-05-01 18:23:09'),
(29, 2, 2, 1, 'uploads/posts\\coin31.webp', NULL, 0, 1, 'published', '2025-05-01 15:14:16', '2025-05-01 18:01:56'),
(30, 2, 3, 1, 'uploads/posts\\coin38.webp', NULL, 0, 1, 'published', '2025-05-01 15:15:34', '2025-05-01 18:01:54'),
(31, 2, 1, 1, 'uploads/posts\\coin42.webp', NULL, 0, 1, 'published', '2025-05-01 15:16:35', '2025-05-01 16:42:31');

-- --------------------------------------------------------

--
-- Tablo için tablo yapısı `post_category`
--

CREATE TABLE `post_category` (
  `id` bigint UNSIGNED NOT NULL,
  `post_id` bigint UNSIGNED NOT NULL,
  `category_id` bigint UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Tablo için tablo yapısı `post_tag`
--

CREATE TABLE `post_tag` (
  `id` bigint UNSIGNED NOT NULL,
  `post_id` bigint UNSIGNED NOT NULL,
  `tag_id` bigint UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Tablo döküm verisi `post_tag`
--

INSERT INTO `post_tag` (`id`, `post_id`, `tag_id`) VALUES
(34, 17, 1),
(35, 17, 2),
(36, 17, 3),
(37, 18, 3),
(38, 19, 1),
(39, 20, 2),
(40, 20, 3),
(41, 21, 1),
(42, 22, 2),
(43, 22, 3),
(48, 23, 1),
(49, 23, 2),
(50, 23, 3),
(59, 28, 1),
(60, 28, 2),
(61, 28, 3),
(62, 29, 1),
(63, 29, 2),
(64, 29, 3),
(65, 30, 1),
(66, 30, 2),
(67, 30, 3),
(68, 31, 1),
(69, 31, 3);

-- --------------------------------------------------------

--
-- Tablo için tablo yapısı `post_translations`
--

CREATE TABLE `post_translations` (
  `id` bigint UNSIGNED NOT NULL,
  `post_id` bigint UNSIGNED NOT NULL,
  `language_slug` varchar(10) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `title` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `slug` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `short_description` text CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci,
  `content` longtext CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci,
  `seo_title` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `seo_description` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `seo_keywords` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Tablo döküm verisi `post_translations`
--

INSERT INTO `post_translations` (`id`, `post_id`, `language_slug`, `title`, `slug`, `short_description`, `content`, `seo_title`, `seo_description`, `seo_keywords`, `created_at`, `updated_at`) VALUES
(65, 17, 'tr', 'Yapay Zeka ve Gelecek', 'yapay-zeka-ve-gelecek-0', 'Geleceği yapay zeka ile şekillendirmek mümkün mü?', 'Bu yazıda yapay zekanın hayatımızdaki etkilerini ve geleceğini inceliyoruz.', 'Yapay Zeka', 'Yapay zekanın geleceği hakkında bilgiler.', 'yapay zeka, gelecek, teknoloji', '2025-04-13 20:41:26', '2025-05-01 14:54:53'),
(66, 17, 'ru', 'Будущее Искусственного Интеллекта', 'budushchee-iskusstvennogo-intellekta-0', 'Как ИИ изменит наш мир?', 'В этой статье мы рассмотрим влияние искусственного интеллекта на будущее.', 'ИИ Будущее', 'Информация о будущем ИИ.', 'искусственный интеллект, технологии, будущее', '2025-04-13 20:41:26', '2025-05-01 14:54:51'),
(67, 17, 'en', 'The Future of Artificial Intelligence', 'the-future-of-artificial-intelligence-0', 'Can AI shape our future?', 'In this post, we explore how artificial intelligence is shaping the future.', 'AI Future', 'Information about the future of AI.', 'ai, artificial intelligence, future', '2025-04-13 20:41:26', '2025-05-01 14:54:49'),
(68, 17, 'fr', 'L\'avenir de l\'intelligence artificielle', 'lavenir-de-lintelligence-artificielle-0', 'L\'IA peut-elle façonner notre avenir ?', 'Dans cet article, nous explorons l\'impact de l\'IA sur notre avenir.', 'Avenir IA', 'Informations sur l\'avenir de l\'IA.', 'ia, intelligence artificielle, technologie', '2025-04-13 20:41:26', '2025-05-01 14:54:47'),
(69, 18, 'tr', 'Yapay Zeka ve Gelecek 6', 'yapay-zeka-ve-gelecek-6', 'Geleceği yapay zeka ile şekillendirmek mümkün mü?', 'Bu yazıda yapay zekanın hayatımızdaki etkilerini ve geleceğini inceliyoruz.', 'Yapay Zeka', 'Yapay zekanın geleceği hakkında bilgiler.', 'yapay zeka, gelecek, teknoloji', '2025-04-13 20:41:46', '2025-05-01 14:55:57'),
(70, 18, 'ru', 'Будущее Искусственного Интеллекта 6', 'budushchee-iskusstvennogo-intellekta-6', 'Как ИИ изменит наш мир?', 'В этой статье мы рассмотрим влияние искусственного интеллекта на будущее.', 'ИИ Будущее', 'Информация о будущем ИИ.', 'искусственный интеллект, технологии, будущее', '2025-04-13 20:41:46', '2025-05-01 14:56:15'),
(71, 18, 'en', 'The Future of Artificial Intelligence 6', 'the-future-of-artificial-intelligence-6', 'Can AI shape our future?', 'In this post, we explore how artificial intelligence is shaping the future.', 'AI Future', 'Information about the future of AI.', 'ai, artificial intelligence, future', '2025-04-13 20:41:46', '2025-05-01 14:56:26'),
(72, 18, 'fr', 'L\'avenir de l\'intelligence artificielle 6', 'lavenir-de-lintelligence-artificielle-6', 'L\'IA peut-elle façonner notre avenir ?', 'Dans cet article, nous explorons l\'impact de l\'IA sur notre avenir.', 'Avenir IA', 'Informations sur l\'avenir de l\'IA.', 'ia, intelligence artificielle, technologie', '2025-04-13 20:41:46', '2025-05-01 14:56:35'),
(73, 19, 'tr', 'Yapay Zeka ve Gelecek 5', 'yapay-zeka-ve-gelecek-5', 'Geleceği yapay zeka ile şekillendirmek mümkün mü?', 'Bu yazıda yapay zekanın hayatımızdaki etkilerini ve geleceğini inceliyoruz.', 'Yapay Zeka', 'Yapay zekanın geleceği hakkında bilgiler.', 'yapay zeka, gelecek, teknoloji', '2025-04-13 20:41:49', '2025-05-01 14:57:24'),
(74, 19, 'ru', 'Будущее Искусственного Интеллекта 5', 'budushchee-iskusstvennogo-intellekta-5', 'Как ИИ изменит наш мир?', 'В этой статье мы рассмотрим влияние искусственного интеллекта на будущее.', 'ИИ Будущее', 'Информация о будущем ИИ.', 'искусственный интеллект, технологии, будущее', '2025-04-13 20:41:49', '2025-05-01 14:57:26'),
(75, 19, 'en', 'The Future of Artificial Intelligence 5', 'the-future-of-artificial-intelligence-5', 'Can AI shape our future?', 'In this post, we explore how artificial intelligence is shaping the future.', 'AI Future', 'Information about the future of AI.', 'ai, artificial intelligence, future', '2025-04-13 20:41:49', '2025-05-01 14:58:18'),
(76, 19, 'fr', 'L\'avenir de l\'intelligence artificielle 5', 'lavenir-de-lintelligence-artificielle-5', 'L\'IA peut-elle façonner notre avenir ?', 'Dans cet article, nous explorons l\'impact de l\'IA sur notre avenir.', 'Avenir IA', 'Informations sur l\'avenir de l\'IA.', 'ia, intelligence artificielle, technologie', '2025-04-13 20:41:49', '2025-05-01 14:58:25'),
(77, 20, 'tr', 'Yapay Zeka ve Gelecek 4', 'yapay-zeka-ve-gelecek-4', 'Geleceği yapay zeka ile şekillendirmek mümkün mü?', 'Bu yazıda yapay zekanın hayatımızdaki etkilerini ve geleceğini inceliyoruz.', 'Yapay Zeka', 'Yapay zekanın geleceği hakkında bilgiler.', 'yapay zeka, gelecek, teknoloji', '2025-04-13 20:41:55', '2025-05-01 14:58:56'),
(78, 20, 'ru', 'Будущее Искусственного Интеллекта 4', 'budushchee-iskusstvennogo-intellekta-4', 'Как ИИ изменит наш мир?', 'В этой статье мы рассмотрим влияние искусственного интеллекта на будущее.', 'ИИ Будущее', 'Информация о будущем ИИ.', 'искусственный интеллект, технологии, будущее', '2025-04-13 20:41:55', '2025-05-01 14:59:05'),
(79, 20, 'en', 'The Future of Artificial Intelligence 4', 'the-future-of-artificial-intelligence-4', 'Can AI shape our future?', 'In this post, we explore how artificial intelligence is shaping the future.', 'AI Future', 'Information about the future of AI.', 'ai, artificial intelligence, future', '2025-04-13 20:41:55', '2025-05-01 14:59:13'),
(80, 20, 'fr', 'L\'avenir de l\'intelligence artificielle 4', 'lavenir-de-lintelligence-artificielle-4', 'L\'IA peut-elle façonner notre avenir ?', 'Dans cet article, nous explorons l\'impact de l\'IA sur notre avenir.', 'Avenir IA', 'Informations sur l\'avenir de l\'IA.', 'ia, intelligence artificielle, technologie', '2025-04-13 20:41:55', '2025-05-01 14:59:21'),
(81, 21, 'tr', 'Yapay Zeka ve Gelecek 3', 'yapay-zeka-ve-gelecek-3', 'Geleceği yapay zeka ile şekillendirmek mümkün mü?', 'Bu yazıda yapay zekanın hayatımızdaki etkilerini ve geleceğini inceliyoruz.', 'Yapay Zeka', 'Yapay zekanın geleceği hakkında bilgiler.', 'yapay zeka, gelecek, teknoloji', '2025-04-13 20:42:00', '2025-05-01 14:59:47'),
(82, 21, 'ru', 'Будущее Искусственного Интеллекта 3', 'budushchee-iskusstvennogo-intellekta-3', 'Как ИИ изменит наш мир?', 'В этой статье мы рассмотрим влияние искусственного интеллекта на будущее.', 'ИИ Будущее', 'Информация о будущем ИИ.', 'искусственный интеллект, технологии, будущее', '2025-04-13 20:42:00', '2025-05-01 14:59:55'),
(83, 21, 'en', 'The Future of Artificial Intelligence 3', 'the-future-of-artificial-intelligence-3', 'Can AI shape our future?', 'In this post, we explore how artificial intelligence is shaping the future.', 'AI Future', 'Information about the future of AI.', 'ai, artificial intelligence, future', '2025-04-13 20:42:00', '2025-05-01 15:00:02'),
(84, 21, 'fr', 'L\'avenir de l\'intelligence artificielle 3', 'lavenir-de-lintelligence-artificielle-3', 'L\'IA peut-elle façonner notre avenir ?', 'Dans cet article, nous explorons l\'impact de l\'IA sur notre avenir.', 'Avenir IA', 'Informations sur l\'avenir de l\'IA.', 'ia, intelligence artificielle, technologie', '2025-04-13 20:42:00', '2025-05-01 15:00:08'),
(85, 22, 'tr', 'Yapay Zeka ve Gelecek 2', 'yapay-zeka-ve-gelecek-2', 'Geleceği yapay zeka ile şekillendirmek mümkün mü?', 'Bu yazıda yapay zekanın hayatımızdaki etkilerini ve geleceğini inceliyoruz.', 'Yapay Zeka', 'Yapay zekanın geleceği hakkında bilgiler.', 'yapay zeka, gelecek, teknoloji', '2025-04-13 20:42:03', '2025-05-01 15:00:43'),
(86, 22, 'ru', 'Будущее Искусственного Интеллекта 2', 'budushchee-iskusstvennogo-intellekta-2', 'Как ИИ изменит наш мир?', 'В этой статье мы рассмотрим влияние искусственного интеллекта на будущее.', 'ИИ Будущее', 'Информация о будущем ИИ.', 'искусственный интеллект, технологии, будущее', '2025-04-13 20:42:03', '2025-05-01 15:00:51'),
(87, 22, 'en', 'The Future of Artificial Intelligence 2', 'the-future-of-artificial-intelligence-2', 'Can AI shape our future?', 'In this post, we explore how artificial intelligence is shaping the future.', 'AI Future', 'Information about the future of AI.', 'ai, artificial intelligence, future', '2025-04-13 20:42:03', '2025-05-01 15:00:56'),
(88, 22, 'fr', 'L\'avenir de l\'intelligence artificielle 2', 'lavenir-de-lintelligence-artificielle-2', 'L\'IA peut-elle façonner notre avenir ?', 'Dans cet article, nous explorons l\'impact de l\'IA sur notre avenir.', 'Avenir IA', 'Informations sur l\'avenir de l\'IA.', 'ia, intelligence artificielle, technologie', '2025-04-13 20:42:03', '2025-05-01 15:01:02'),
(89, 23, 'tr', 'Yapay Zeka ve Gelecek 1', 'yapay-zeka-ve-gelecek-1', 'Geleceği yapay zeka ile şekillendirmek mümkün mü?', 'Geleceği yapay zeka ile şekillendirmek mümkün mü?Geleceği yapay zeka ile şekillendirmek mümkün mü?Geleceği yapay zeka ile şekillendirmek mümkün mü?Geleceği yapay zeka ile şekillendirmek mümkün mü?', 'Yapay Zeka', 'Yapay zekanın geleceği hakkında bilgiler.', 'yapay zeka, gelecek, teknoloji', '2025-04-13 20:42:07', '2025-05-01 18:07:47'),
(90, 23, 'ru', 'Будущее Искусственного Интеллекта 1', 'budushchee-iskusstvennogo-intellekta-1', 'Как ИИ изменит наш мир?', 'В этой статье мы рассмотрим влияние искусственного интеллекта на будущее.', 'ИИ Будущее', 'Информация о будущем ИИ.', 'искусственный интеллект, технологии, будущее', '2025-04-13 20:42:07', '2025-05-01 18:08:37'),
(91, 23, 'en', 'The Future of Artificial Intelligence 1', 'the-future-of-artificial-intelligence-1', 'Can AI shape our future?', 'In this post, we explore how artificial intelligence is shaping the future.', 'AI Future', 'Information about the future of AI.', 'ai, artificial intelligence, future', '2025-04-13 20:42:07', '2025-05-01 18:09:17'),
(92, 23, 'fr', 'L\'avenir de l\'intelligence artificielle 1', 'lavenir-de-lintelligence-artificielle-1', 'L\'IA peut-elle façonner notre avenir ?', 'Dans cet article, nous explorons l\'impact de l\'IA sur notre avenir.', 'Avenir IA', 'Informations sur l\'avenir de l\'IA.', 'ia, intelligence artificielle, technologie', '2025-04-13 20:42:07', '2025-05-01 18:09:46'),
(101, 28, 'tr', 'Sadece Türkçe', 'sadece-turkce', 'Sadece Türkçe', '<p>Sadece Türkçe Sadece Türkçe Sadece Türkçe Sadece Türkçe Sadece Türkçe Sadece Türkçe Sadece Türkçe&nbsp;</p>', 'Sadece Türkçe', 'Sadece Türkçe', 'Sadece Türkçe', '2025-05-01 15:09:43', '2025-05-01 15:09:43'),
(102, 29, 'ru', 'Только русский', 'tolko-russkiy', 'Только русский', '<p>Только русский Только русский Только русский Только русский&nbsp;</p>', 'Только русский', 'Только русский', 'Только русский', '2025-05-01 15:14:16', '2025-05-01 15:14:16'),
(103, 30, 'en', 'Only English', 'only-english', 'Only English', '<p>Only English&nbsp;Only English&nbsp;Only English</p>', 'Only English', 'Only English', 'Only English', '2025-05-01 15:15:34', '2025-05-01 15:15:34'),
(104, 31, 'fr', 'Seulement français', 'seulement-francais', 'Seulement français', '<p>Seulement français&nbsp;Seulement français&nbsp;Seulement français</p>', 'Seulement français', 'Seulement français', 'Seulement français', '2025-05-01 15:16:35', '2025-05-01 15:16:35');

-- --------------------------------------------------------

--
-- Tablo için tablo yapısı `sessions`
--

CREATE TABLE `sessions` (
  `id` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `user_id` bigint UNSIGNED DEFAULT NULL,
  `ip_address` varchar(45) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `user_agent` text CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci,
  `payload` longtext CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `last_activity` int NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;


-- --------------------------------------------------------

--
-- Tablo için tablo yapısı `tags`
--

CREATE TABLE `tags` (
  `id` bigint UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Tablo döküm verisi `tags`
--

INSERT INTO `tags` (`id`, `created_at`, `updated_at`) VALUES
(1, '2025-04-10 19:30:19', '2025-04-10 19:30:19'),
(2, '2025-04-10 19:30:21', '2025-04-10 19:30:21'),
(3, '2025-04-10 19:30:24', '2025-04-10 19:30:24');

-- --------------------------------------------------------

--
-- Tablo için tablo yapısı `tag_translations`
--

CREATE TABLE `tag_translations` (
  `id` bigint UNSIGNED NOT NULL,
  `tag_id` bigint UNSIGNED NOT NULL,
  `language_slug` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `name` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `slug` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `seo_title` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `seo_description` text CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci,
  `seo_keywords` text CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Tablo döküm verisi `tag_translations`
--

INSERT INTO `tag_translations` (`id`, `tag_id`, `language_slug`, `name`, `slug`, `seo_title`, `seo_description`, `seo_keywords`, `created_at`, `updated_at`) VALUES
(1, 1, 'tr', 'Teknoloji', 'teknoloji', 'Teknoloji Hakkında', 'Teknolojiyle ilgili makaleler', 'teknoloji, dijital, yenilik', '2025-04-10 19:30:19', '2025-04-10 19:30:19'),
(2, 1, 'ru', 'Технологии', 'tekhnologii', 'О технологиях', 'Статьи о новых технологиях', 'технологии, цифровой, инновации', '2025-04-10 19:30:19', '2025-04-10 19:30:19'),
(3, 1, 'en', 'Technology', 'technology', 'About Technology', 'Articles about technology trends', 'technology, digital, innovation', '2025-04-10 19:30:19', '2025-04-10 19:30:19'),
(4, 1, 'fr', 'Technologie', 'technologie', 'À propos de la technologie', 'Articles sur la technologie', 'technologie, numérique, innovation', '2025-04-10 19:30:19', '2025-04-10 19:30:19'),
(5, 2, 'tr', 'Programlama', 'programlama', 'Programlama Rehberi', 'Kodlama ile ilgili içerikler', 'programlama, yazılım, kod', '2025-04-10 19:30:21', '2025-04-10 19:30:21'),
(6, 2, 'ru', 'Программирование', 'programmirovanie', 'Руководство по программированию', 'Все о программировании', 'код, программирование, разработка', '2025-04-10 19:30:21', '2025-04-10 19:30:21'),
(7, 2, 'en', 'Programming', 'programming', 'Programming Guide', 'Everything about coding and software', 'programming, code, software', '2025-04-10 19:30:21', '2025-04-10 19:30:21'),
(8, 2, 'fr', 'Programmation', 'programmation', 'Guide de programmation', 'Articles sur la programmation', 'programmation, code, logiciel', '2025-04-10 19:30:21', '2025-04-10 19:30:21'),
(9, 3, 'tr', 'Yapay Zeka', 'yapay-zeka', 'Yapay Zeka Nedir?', 'Yapay zeka ile ilgili bilgiler', 'yapay zeka, makine öğrenmesi, ai', '2025-04-10 19:30:24', '2025-04-10 19:30:24'),
(10, 3, 'ru', 'Искусственный интеллект', 'iskusstvennyi-intellekt', 'Что такое искусственный интеллект?', 'Информация об ИИ и обучении', 'искусственный интеллект, обучение, ai', '2025-04-10 19:30:24', '2025-04-10 19:30:24'),
(11, 3, 'en', 'Artificial Intelligence', 'artificial-intelligence', 'What is AI?', 'Information about AI and ML', 'ai, artificial intelligence, ml', '2025-04-10 19:30:24', '2025-04-10 19:30:24'),
(12, 3, 'fr', 'Intelligence Artificielle', 'intelligence-artificielle', 'Qu\'est-ce que l\'IA ?', 'Infos sur l\'IA et le ML', 'ia, intelligence artificielle, apprentissage', '2025-04-10 19:30:24', '2025-04-10 19:30:24');

-- --------------------------------------------------------

--
-- Tablo için tablo yapısı `users`
--

CREATE TABLE `users` (
  `id` bigint UNSIGNED NOT NULL,
  `name` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `password` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `remember_token` varchar(100) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Tablo döküm verisi `users`
--

INSERT INTO `users` (`id`, `name`, `email`, `email_verified_at`, `password`, `remember_token`, `created_at`, `updated_at`) VALUES
(1, 'Test User', 'test@example.com', '2025-04-10 19:29:24', '$2y$12$h2MCHq3o0brEoGI8fyrRpuO.Ak2zrueaGSCWwxfe1lyrqI9uI9hZC', 'GOQKrHwXiL', '2025-04-10 19:29:24', '2025-04-10 19:29:24'),
--
-- Dökümü yapılmış tablolar için indeksler
--

--
-- Tablo için indeksler `cache`
--
ALTER TABLE `cache`
  ADD PRIMARY KEY (`key`);

--
-- Tablo için indeksler `cache_locks`
--
ALTER TABLE `cache_locks`
  ADD PRIMARY KEY (`key`);

--
-- Tablo için indeksler `categories`
--
ALTER TABLE `categories`
  ADD PRIMARY KEY (`id`);

--
-- Tablo için indeksler `category_translations`
--
ALTER TABLE `category_translations`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `category_translations_slug_unique` (`slug`),
  ADD KEY `category_translations_category_id_foreign` (`category_id`);

--
-- Tablo için indeksler `failed_jobs`
--
ALTER TABLE `failed_jobs`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `failed_jobs_uuid_unique` (`uuid`);

--
-- Tablo için indeksler `jobs`
--
ALTER TABLE `jobs`
  ADD PRIMARY KEY (`id`),
  ADD KEY `jobs_queue_index` (`queue`);

--
-- Tablo için indeksler `job_batches`
--
ALTER TABLE `job_batches`
  ADD PRIMARY KEY (`id`);

--
-- Tablo için indeksler `languages`
--
ALTER TABLE `languages`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `languages_slug_unique` (`slug`);

--
-- Tablo için indeksler `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

--
-- Tablo için indeksler `password_reset_tokens`
--
ALTER TABLE `password_reset_tokens`
  ADD PRIMARY KEY (`email`);

--
-- Tablo için indeksler `posts`
--
ALTER TABLE `posts`
  ADD PRIMARY KEY (`id`),
  ADD KEY `posts_user_id_foreign` (`user_id`),
  ADD KEY `posts_category_id_foreign` (`category_id`);

--
-- Tablo için indeksler `post_category`
--
ALTER TABLE `post_category`
  ADD PRIMARY KEY (`id`),
  ADD KEY `post_category_post_id_foreign` (`post_id`),
  ADD KEY `post_category_category_id_foreign` (`category_id`);

--
-- Tablo için indeksler `post_tag`
--
ALTER TABLE `post_tag`
  ADD PRIMARY KEY (`id`),
  ADD KEY `post_tag_post_id_foreign` (`post_id`),
  ADD KEY `post_tag_tag_id_foreign` (`tag_id`);

--
-- Tablo için indeksler `post_translations`
--
ALTER TABLE `post_translations`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `post_translations_slug_unique` (`slug`),
  ADD KEY `post_translations_post_id_foreign` (`post_id`);

--
-- Tablo için indeksler `sessions`
--
ALTER TABLE `sessions`
  ADD PRIMARY KEY (`id`),
  ADD KEY `sessions_user_id_index` (`user_id`),
  ADD KEY `sessions_last_activity_index` (`last_activity`);

--
-- Tablo için indeksler `tags`
--
ALTER TABLE `tags`
  ADD PRIMARY KEY (`id`);

--
-- Tablo için indeksler `tag_translations`
--
ALTER TABLE `tag_translations`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `tag_translations_slug_unique` (`slug`),
  ADD KEY `tag_translations_tag_id_foreign` (`tag_id`);

--
-- Tablo için indeksler `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `users_email_unique` (`email`);

--
-- Dökümü yapılmış tablolar için AUTO_INCREMENT değeri
--

--
-- Tablo için AUTO_INCREMENT değeri `categories`
--
ALTER TABLE `categories`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- Tablo için AUTO_INCREMENT değeri `category_translations`
--
ALTER TABLE `category_translations`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- Tablo için AUTO_INCREMENT değeri `failed_jobs`
--
ALTER TABLE `failed_jobs`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- Tablo için AUTO_INCREMENT değeri `jobs`
--
ALTER TABLE `jobs`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- Tablo için AUTO_INCREMENT değeri `languages`
--
ALTER TABLE `languages`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- Tablo için AUTO_INCREMENT değeri `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- Tablo için AUTO_INCREMENT değeri `posts`
--
ALTER TABLE `posts`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=32;

--
-- Tablo için AUTO_INCREMENT değeri `post_category`
--
ALTER TABLE `post_category`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- Tablo için AUTO_INCREMENT değeri `post_tag`
--
ALTER TABLE `post_tag`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=70;

--
-- Tablo için AUTO_INCREMENT değeri `post_translations`
--
ALTER TABLE `post_translations`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=105;

--
-- Tablo için AUTO_INCREMENT değeri `tags`
--
ALTER TABLE `tags`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- Tablo için AUTO_INCREMENT değeri `tag_translations`
--
ALTER TABLE `tag_translations`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- Tablo için AUTO_INCREMENT değeri `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- Dökümü yapılmış tablolar için kısıtlamalar
--

--
-- Tablo kısıtlamaları `category_translations`
--
ALTER TABLE `category_translations`
  ADD CONSTRAINT `category_translations_category_id_foreign` FOREIGN KEY (`category_id`) REFERENCES `categories` (`id`) ON DELETE CASCADE;

--
-- Tablo kısıtlamaları `posts`
--
ALTER TABLE `posts`
  ADD CONSTRAINT `posts_category_id_foreign` FOREIGN KEY (`category_id`) REFERENCES `categories` (`id`) ON DELETE SET NULL,
  ADD CONSTRAINT `posts_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE;

--
-- Tablo kısıtlamaları `post_category`
--
ALTER TABLE `post_category`
  ADD CONSTRAINT `post_category_category_id_foreign` FOREIGN KEY (`category_id`) REFERENCES `categories` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `post_category_post_id_foreign` FOREIGN KEY (`post_id`) REFERENCES `posts` (`id`) ON DELETE CASCADE;

--
-- Tablo kısıtlamaları `post_tag`
--
ALTER TABLE `post_tag`
  ADD CONSTRAINT `post_tag_post_id_foreign` FOREIGN KEY (`post_id`) REFERENCES `posts` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `post_tag_tag_id_foreign` FOREIGN KEY (`tag_id`) REFERENCES `tags` (`id`) ON DELETE CASCADE;

--
-- Tablo kısıtlamaları `post_translations`
--
ALTER TABLE `post_translations`
  ADD CONSTRAINT `post_translations_post_id_foreign` FOREIGN KEY (`post_id`) REFERENCES `posts` (`id`) ON DELETE CASCADE;

--
-- Tablo kısıtlamaları `tag_translations`
--
ALTER TABLE `tag_translations`
  ADD CONSTRAINT `tag_translations_tag_id_foreign` FOREIGN KEY (`tag_id`) REFERENCES `tags` (`id`) ON DELETE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
