-- --------------------------------------------------------
-- Host:                         127.0.0.1
-- Server version:               8.0.30 - MySQL Community Server - GPL
-- Server OS:                    Win64
-- HeidiSQL Version:             12.1.0.6537
-- --------------------------------------------------------

/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET NAMES utf8 */;
/*!50503 SET NAMES utf8mb4 */;
/*!40103 SET @OLD_TIME_ZONE=@@TIME_ZONE */;
/*!40103 SET TIME_ZONE='+00:00' */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;
/*!40111 SET @OLD_SQL_NOTES=@@SQL_NOTES, SQL_NOTES=0 */;

-- Dumping structure for table dashboard-ghaya.about_sections
CREATE TABLE IF NOT EXISTS `about_sections` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `image` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Dumping data for table dashboard-ghaya.about_sections: ~0 rows (approximately)
INSERT INTO `about_sections` (`id`, `image`, `created_at`, `updated_at`) VALUES
	(1, 'uploads/about/1745659467_about-us-1.jpg', '2025-04-26 06:24:27', '2025-04-26 06:24:27');

-- Dumping structure for table dashboard-ghaya.about_section_translations
CREATE TABLE IF NOT EXISTS `about_section_translations` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `about_section_id` bigint unsigned NOT NULL,
  `locale` varchar(5) COLLATE utf8mb4_unicode_ci NOT NULL,
  `title` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `paragraph1` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `paragraph2` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `about_section_translations_about_section_id_foreign` (`about_section_id`),
  CONSTRAINT `about_section_translations_about_section_id_foreign` FOREIGN KEY (`about_section_id`) REFERENCES `about_sections` (`id`) ON DELETE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Dumping data for table dashboard-ghaya.about_section_translations: ~2 rows (approximately)
INSERT INTO `about_section_translations` (`id`, `about_section_id`, `locale`, `title`, `paragraph1`, `paragraph2`, `created_at`, `updated_at`) VALUES
	(1, 1, 'en', 'About Us', 'GhayaTech is a creative digital agency based in Gaza, Palestine. Since 2018, we\'ve delivered top-tier services in graphic design, motion graphics, mobile & web development, and more.', 'Our team of professionals is passionate about helping brands grow with innovative solutions, meaningful design, and solid code. We combine creativity and technology to bring your vision to life.', '2025-04-26 06:24:27', '2025-04-26 06:24:27'),
	(2, 1, 'ar', 'من نحن', 'غايتك هي وكالة رقمية إبداعية مقرها غزة، فلسطين. منذ 2018، قدمنا خدمات عالية المستوى في التصميم الجرافيكي، الموشن جرافيك، برمجة التطبيقات والمواقع، والمزيد.', 'فريقنا من المحترفين شغوف بمساعدة العلامات التجارية على النمو من خلال حلول مبتكرة، تصميم هادف، وكود قوي. نمزج بين الإبداع والتكنولوجيا لتحويل رؤيتك إلى واقع.', '2025-04-26 06:24:27', '2025-04-26 06:24:27');

-- Dumping structure for table dashboard-ghaya.cache
CREATE TABLE IF NOT EXISTS `cache` (
  `key` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `value` mediumtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `expiration` int NOT NULL,
  PRIMARY KEY (`key`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Dumping data for table dashboard-ghaya.cache: ~1 rows (approximately)
INSERT INTO `cache` (`key`, `value`, `expiration`) VALUES
	('ghayatech_cache_blog_posts', 'a:4:{i:0;a:4:{s:5:"title";s:45:"The Evolution of Smartphones: A Detailed Look";s:11:"description";s:332:"This paragraph serves as an introduction to your blog post. Begin by discussing the primary theme or topic that you plan to cover, ensuring it captures the reader’s interest from the very first sentence. Share a brief overview that highlights why this topic is important and how it can provide value. Use this space to [&hellip;]\n";s:4:"link";s:72:"https://blog.ghayatech.com/the-evolution-of-smartphones-a-detailed-look/";s:5:"image";s:74:"https://blog.ghayatech.com/wp-content/uploads/2025/04/featured-image-7.jpg";}i:1;a:4:{s:5:"title";s:42:"Exploring the Intersection of Art and Tech";s:11:"description";s:332:"This paragraph serves as an introduction to your blog post. Begin by discussing the primary theme or topic that you plan to cover, ensuring it captures the reader’s interest from the very first sentence. Share a brief overview that highlights why this topic is important and how it can provide value. Use this space to [&hellip;]\n";s:4:"link";s:70:"https://blog.ghayatech.com/exploring-the-intersection-of-art-and-tech/";s:5:"image";s:74:"https://blog.ghayatech.com/wp-content/uploads/2025/04/featured-image-6.jpg";}i:2;a:4:{s:5:"title";s:41:"Ways Technology Improves Mental Wellbeing";s:11:"description";s:332:"This paragraph serves as an introduction to your blog post. Begin by discussing the primary theme or topic that you plan to cover, ensuring it captures the reader’s interest from the very first sentence. Share a brief overview that highlights why this topic is important and how it can provide value. Use this space to [&hellip;]\n";s:4:"link";s:69:"https://blog.ghayatech.com/ways-technology-improves-mental-wellbeing/";s:5:"image";s:74:"https://blog.ghayatech.com/wp-content/uploads/2025/04/featured-image-5.jpg";}i:3;a:4:{s:5:"title";s:40:"Understanding Blockchain Beyond the Hype";s:11:"description";s:332:"This paragraph serves as an introduction to your blog post. Begin by discussing the primary theme or topic that you plan to cover, ensuring it captures the reader’s interest from the very first sentence. Share a brief overview that highlights why this topic is important and how it can provide value. Use this space to [&hellip;]\n";s:4:"link";s:68:"https://blog.ghayatech.com/understanding-blockchain-beyond-the-hype/";s:5:"image";s:74:"https://blog.ghayatech.com/wp-content/uploads/2025/04/featured-image-4.jpg";}}', 1746025200);

-- Dumping structure for table dashboard-ghaya.cache_locks
CREATE TABLE IF NOT EXISTS `cache_locks` (
  `key` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `owner` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `expiration` int NOT NULL,
  PRIMARY KEY (`key`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Dumping data for table dashboard-ghaya.cache_locks: ~0 rows (approximately)

-- Dumping structure for table dashboard-ghaya.failed_jobs
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

-- Dumping data for table dashboard-ghaya.failed_jobs: ~0 rows (approximately)

-- Dumping structure for table dashboard-ghaya.hero_sections
CREATE TABLE IF NOT EXISTS `hero_sections` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `video_url` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `main_text` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `small_paragraph` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `description` text COLLATE utf8mb4_unicode_ci,
  `services_button_text` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `services_button_link` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `contact_button_text` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `contact_button_link` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `locale` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'ar',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Dumping data for table dashboard-ghaya.hero_sections: ~2 rows (approximately)
INSERT INTO `hero_sections` (`id`, `video_url`, `main_text`, `small_paragraph`, `description`, `services_button_text`, `services_button_link`, `contact_button_text`, `contact_button_link`, `locale`, `created_at`, `updated_at`) VALUES
	(1, 'uploads/videos/1745654018_Homepage-Video.mp4', 'مرحبًا بك في غايتك', 'نقوم ببناء حلول رقمية تعزز عملك', 'في غايتك، نحول أفكارك إلى منتجات رقمية احترافية. سواء التصميم أو البرمجة، نقدم حلولًا تحدث فارقًا.', 'خدماتنا', '#services', 'تواصل معنا', '#contact', 'ar', '2025-04-26 04:53:38', '2025-04-26 04:53:38'),
	(2, 'uploads/videos/1745654018_Homepage-Video.mp4', 'Welcome to GhayaTech', 'We build digital solutions to empower your business', 'At GhayaTech, we transform your ideas into professional digital products. Whether design or development, we deliver solutions that make impact.', 'Our Services', '#services', 'Contact Us', '#contact', 'en', '2025-04-26 04:53:38', '2025-04-26 04:54:00');

-- Dumping structure for table dashboard-ghaya.jobs
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

-- Dumping data for table dashboard-ghaya.jobs: ~0 rows (approximately)

-- Dumping structure for table dashboard-ghaya.job_batches
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

-- Dumping data for table dashboard-ghaya.job_batches: ~0 rows (approximately)

-- Dumping structure for table dashboard-ghaya.menus
CREATE TABLE IF NOT EXISTS `menus` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `url` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=7 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Dumping data for table dashboard-ghaya.menus: ~6 rows (approximately)
INSERT INTO `menus` (`id`, `url`, `created_at`, `updated_at`) VALUES
	(1, '#hero', '2025-04-28 09:22:40', '2025-04-28 09:22:40'),
	(2, '#services', '2025-04-28 09:23:29', '2025-04-28 09:23:29'),
	(3, '#about', '2025-04-28 09:24:15', '2025-04-28 09:24:15'),
	(4, '#contact-section', '2025-04-28 09:25:00', '2025-04-28 09:25:00'),
	(5, '#team', '2025-04-28 09:26:00', '2025-04-28 09:26:00'),
	(6, '#blog', '2025-04-28 09:26:59', '2025-04-28 09:26:59');

-- Dumping structure for table dashboard-ghaya.menu_translations
CREATE TABLE IF NOT EXISTS `menu_translations` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `menu_id` bigint unsigned NOT NULL,
  `locale` varchar(5) COLLATE utf8mb4_unicode_ci NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `menu_translations_menu_id_foreign` (`menu_id`),
  CONSTRAINT `menu_translations_menu_id_foreign` FOREIGN KEY (`menu_id`) REFERENCES `menus` (`id`) ON DELETE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=13 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Dumping data for table dashboard-ghaya.menu_translations: ~11 rows (approximately)
INSERT INTO `menu_translations` (`id`, `menu_id`, `locale`, `name`, `created_at`, `updated_at`) VALUES
	(1, 1, 'ar', 'الرئيسية', '2025-04-28 09:22:40', '2025-04-28 09:22:40'),
	(2, 1, 'en', 'Home', '2025-04-28 09:22:40', '2025-04-28 09:22:40'),
	(3, 2, 'ar', 'الخدمات', '2025-04-28 09:23:29', '2025-04-28 09:23:29'),
	(4, 2, 'en', 'Services', '2025-04-28 09:23:29', '2025-04-28 09:23:29'),
	(5, 3, 'ar', 'حول', '2025-04-28 09:24:15', '2025-04-28 09:24:15'),
	(6, 3, 'en', 'About', '2025-04-28 09:24:15', '2025-04-28 09:24:15'),
	(7, 4, 'ar', 'تواصل معنا', '2025-04-28 09:25:00', '2025-04-28 09:25:00'),
	(8, 4, 'en', 'Contact', '2025-04-28 09:25:00', '2025-04-28 09:25:00'),
	(9, 5, 'ar', 'فريقنا', '2025-04-28 09:26:00', '2025-04-28 09:26:00'),
	(10, 5, 'en', 'Teams', '2025-04-28 09:26:00', '2025-04-28 09:26:00'),
	(11, 6, 'ar', 'المدونة', '2025-04-28 09:26:59', '2025-04-28 09:26:59'),
	(12, 6, 'en', 'Blogs', '2025-04-28 09:26:59', '2025-04-28 09:26:59');

-- Dumping structure for table dashboard-ghaya.migrations
CREATE TABLE IF NOT EXISTS `migrations` (
  `id` int unsigned NOT NULL AUTO_INCREMENT,
  `migration` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `batch` int NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=19 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Dumping data for table dashboard-ghaya.migrations: ~15 rows (approximately)
INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES
	(1, '0001_01_01_000000_create_users_table', 1),
	(2, '0001_01_01_000001_create_cache_table', 1),
	(3, '0001_01_01_000002_create_jobs_table', 1),
	(4, '2025_04_22_105356_create_hero_sections_table', 1),
	(5, '2025_04_22_105408_create_projects_table', 1),
	(6, '2025_04_22_105412_create_services_table', 1),
	(8, '2025_04_24_130200_create_statistic_sections_table', 1),
	(9, '2025_04_24_133935_create_service_translations_table', 1),
	(10, '2025_04_24_135403_create_statistics_table', 1),
	(11, '2025_04_26_160403_create_about_sections_table', 2),
	(12, '2025_04_26_163935_create_about_section_translations_table', 2),
	(13, '2025_04_26_170403_create_team_sections_table', 3),
	(14, '2025_04_26_173935_create_team_section_translations_table', 3),
	(15, '2025_04_26_183935_create_team_members_table', 3),
	(16, '2025_04_26_193935_create_team_member_translations_table', 3),
	(17, '2025_04_28_193935_create_menus_table', 4),
	(18, '2025_04_28_203935_create_menu_translations_table', 4);

-- Dumping structure for table dashboard-ghaya.password_reset_tokens
CREATE TABLE IF NOT EXISTS `password_reset_tokens` (
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`email`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Dumping data for table dashboard-ghaya.password_reset_tokens: ~0 rows (approximately)

-- Dumping structure for table dashboard-ghaya.projects
CREATE TABLE IF NOT EXISTS `projects` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `title` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `image` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `locale` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'ar',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Dumping data for table dashboard-ghaya.projects: ~0 rows (approximately)

-- Dumping structure for table dashboard-ghaya.services
CREATE TABLE IF NOT EXISTS `services` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `icon` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `image` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=7 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Dumping data for table dashboard-ghaya.services: ~6 rows (approximately)
INSERT INTO `services` (`id`, `icon`, `image`, `created_at`, `updated_at`) VALUES
	(1, 'pencil-ruler', 'uploads/services/1745653948_social-media.jpg', '2025-04-26 04:52:28', '2025-04-26 04:52:28'),
	(2, 'video', 'uploads/services/1745655063_video-editing.jpg', '2025-04-26 05:11:03', '2025-04-26 05:11:03'),
	(3, 'mobile-alt', 'uploads/services/1745655129_mobile-programming.jpg', '2025-04-26 05:11:38', '2025-04-26 05:12:09'),
	(4, 'code', 'uploads/services/1745655185_web-programming.jpg', '2025-04-26 05:13:05', '2025-04-26 05:13:05'),
	(5, 'microphone', 'uploads/services/1745655272_voice-over.jpg', '2025-04-26 05:14:32', '2025-04-26 05:14:32'),
	(6, 'pencil-alt', 'uploads/services/1745655331_writing.jpg', '2025-04-26 05:15:31', '2025-04-26 05:15:31');

-- Dumping structure for table dashboard-ghaya.service_translations
CREATE TABLE IF NOT EXISTS `service_translations` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `service_id` bigint unsigned NOT NULL,
  `locale` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `title` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `description` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `service_translations_service_id_foreign` (`service_id`),
  KEY `service_translations_locale_index` (`locale`),
  CONSTRAINT `service_translations_service_id_foreign` FOREIGN KEY (`service_id`) REFERENCES `services` (`id`) ON DELETE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=13 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Dumping data for table dashboard-ghaya.service_translations: ~11 rows (approximately)
INSERT INTO `service_translations` (`id`, `service_id`, `locale`, `title`, `description`, `created_at`, `updated_at`) VALUES
	(1, 1, 'ar', 'تصميم السوشيال ميديا', 'تصاميم إبداعية تعزز حضور علامتك على وسائل التواصل.', '2025-04-26 04:52:28', '2025-04-26 04:52:28'),
	(2, 1, 'en', 'Social Media Design', 'Creative visuals that boost your brand\'s social media presence.', '2025-04-26 04:52:28', '2025-04-26 04:52:28'),
	(3, 2, 'ar', 'مونتاج الفيديو', 'مونتاج احترافي يُبقي جمهورك متفاعلًا وملهمًا.', '2025-04-26 05:11:03', '2025-04-26 05:11:03'),
	(4, 2, 'en', 'Video Editing', 'Professional edits that keep your audience engaged and inspired.', '2025-04-26 05:11:03', '2025-04-26 05:11:03'),
	(5, 3, 'ar', 'برمجة التطبيقات', 'تطبيقات iOS و Android عالية الأداء بواجهة سلسة.', '2025-04-26 05:11:38', '2025-04-26 05:11:38'),
	(6, 3, 'en', 'Mobile Programming', 'High-performance iOS & Android apps with smooth UX/UI.', '2025-04-26 05:11:38', '2025-04-26 05:11:38'),
	(7, 4, 'ar', 'برمجة المواقع', 'مواقع متجاوبة وعصرية تلبي أهداف عملك.', '2025-04-26 05:13:05', '2025-04-26 05:13:05'),
	(8, 4, 'en', 'Web Programming', 'Modern, responsive websites tailored for your business goals.', '2025-04-26 05:13:05', '2025-04-26 05:13:05'),
	(9, 5, 'ar', 'خدمات التعليق الصوتي', 'تعليقات صوتية واضحة وجذابة للاستخدام الإعلامي والتجاري.', '2025-04-26 05:14:32', '2025-04-26 05:14:32'),
	(10, 5, 'en', 'Voiceover Services', 'Clear and compelling voiceovers for media and business use.', '2025-04-26 05:14:32', '2025-04-26 05:14:32'),
	(11, 6, 'ar', 'كتابة المحتوى', 'محتوى جذاب ومتوافق مع محركات البحث لجمهورك.', '2025-04-26 05:15:31', '2025-04-26 05:15:31'),
	(12, 6, 'en', 'Content Writing', 'SEO-friendly, engaging content crafted for your audience.', '2025-04-26 05:15:31', '2025-04-26 05:15:31');

-- Dumping structure for table dashboard-ghaya.sessions
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

-- Dumping data for table dashboard-ghaya.sessions: ~8 rows (approximately)
INSERT INTO `sessions` (`id`, `user_id`, `ip_address`, `user_agent`, `payload`, `last_activity`) VALUES
	('0bUEdiZbXjtfxMGZsbuWLqJqrR5g7K3Bfik1bFom', NULL, '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/135.0.0.0 Safari/537.36', 'YTozOntzOjY6Il90b2tlbiI7czo0MDoiMVJQTlJHWERsVzZIcVFQRGNkb29mdWFid0g2Z2tMMWJyazl4ZTR5ViI7czo5OiJfcHJldmlvdXMiO2E6MTp7czozOiJ1cmwiO3M6Mjc6Imh0dHA6Ly9kYXNoYm9hcmQtZ2hheWEudGVzdCI7fXM6NjoiX2ZsYXNoIjthOjI6e3M6Mzoib2xkIjthOjA6e31zOjM6Im5ldyI7YTowOnt9fX0=', 1745921577),
	('5cnw9zq2wqL1VaPCIWRu6odMP8h00SVxou7sbNTt', NULL, '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/135.0.0.0 Safari/537.36', 'YTozOntzOjY6Il90b2tlbiI7czo0MDoiMVNHc1NJN1RoQlBLSVpmeG1VaDNBelZIcmVjTGNEeGltNzRDV01qTiI7czo5OiJfcHJldmlvdXMiO2E6MTp7czozOiJ1cmwiO3M6Mjc6Imh0dHA6Ly9kYXNoYm9hcmQtZ2hheWEudGVzdCI7fXM6NjoiX2ZsYXNoIjthOjI6e3M6Mzoib2xkIjthOjA6e31zOjM6Im5ldyI7YTowOnt9fX0=', 1746008233),
	('aYhk5iuayoCiNUDEdnyyybcDe2LccxoPFfJI1wwQ', NULL, '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/135.0.0.0 Safari/537.36', 'YTozOntzOjY6Il90b2tlbiI7czo0MDoib1ZnVnViRTkwS3ZjU042OTVZOG9SQjQ3UXNBc3JTbjhXZzB3OXJ4ZSI7czo5OiJfcHJldmlvdXMiO2E6MTp7czozOiJ1cmwiO3M6Mjc6Imh0dHA6Ly9kYXNoYm9hcmQtZ2hheWEudGVzdCI7fXM6NjoiX2ZsYXNoIjthOjI6e3M6Mzoib2xkIjthOjA6e31zOjM6Im5ldyI7YTowOnt9fX0=', 1745913461),
	('c3P91JBsJAXk8tiOEQFcWEuyYydWrIkydFKHOU58', NULL, '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/135.0.0.0 Safari/537.36', 'YTo0OntzOjY6Il90b2tlbiI7czo0MDoiTGgzNm40eFZoWWdwenRJV0gyRzgyOUdPTFN4M0FOZnRaVFhXYVdoWCI7czo2OiJsb2NhbGUiO3M6MjoiYXIiO3M6OToiX3ByZXZpb3VzIjthOjE6e3M6MzoidXJsIjtzOjI3OiJodHRwOi8vZGFzaGJvYXJkLWdoYXlhLnRlc3QiO31zOjY6Il9mbGFzaCI7YToyOntzOjM6Im9sZCI7YTowOnt9czozOiJuZXciO2E6MDp7fX19', 1745995057),
	('d9zEUvQUiaw3Fa2NhkKdWwYty0VHz3o7mn4DMKnY', NULL, '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/135.0.0.0 Safari/537.36', 'YTo0OntzOjY6Il90b2tlbiI7czo0MDoibzRQb3FsdTY4WjZKenZnQTN3eFFWSWlscGw2Y1FCamFXcUFuMXJuQSI7czo5OiJfcHJldmlvdXMiO2E6MTp7czozOiJ1cmwiO3M6Mjc6Imh0dHA6Ly9kYXNoYm9hcmQtZ2hheWEudGVzdCI7fXM6NjoiX2ZsYXNoIjthOjI6e3M6Mzoib2xkIjthOjA6e31zOjM6Im5ldyI7YTowOnt9fXM6NjoibG9jYWxlIjtzOjI6ImFyIjt9', 1745751362),
	('Grzx3YR80A1hVAtvAhp3yLE1SSo7r947l3pEQfkS', NULL, '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/135.0.0.0 Safari/537.36', 'YTozOntzOjY6Il90b2tlbiI7czo0MDoiTndKVWhyV2NMc3lsMU8yNjRBWVpTMTYyMFJWUVdyUXFiSndpQlJvWCI7czo5OiJfcHJldmlvdXMiO2E6MTp7czozOiJ1cmwiO3M6Mjc6Imh0dHA6Ly9kYXNoYm9hcmQtZ2hheWEudGVzdCI7fXM6NjoiX2ZsYXNoIjthOjI6e3M6Mzoib2xkIjthOjA6e31zOjM6Im5ldyI7YTowOnt9fX0=', 1746024268),
	('MSv4LrSj2nl8dpGfT9dObL1R5F5cQIX0sHQW5Jsx', NULL, '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/135.0.0.0 Safari/537.36', 'YTozOntzOjY6Il90b2tlbiI7czo0MDoiSFFuTEFTbE5HSDQxT1FpdEVvbHhaMDFFWDRWR0xLVG1UMnpCWXJBTiI7czo5OiJfcHJldmlvdXMiO2E6MTp7czozOiJ1cmwiO3M6Mjc6Imh0dHA6Ly9kYXNoYm9hcmQtZ2hheWEudGVzdCI7fXM6NjoiX2ZsYXNoIjthOjI6e3M6Mzoib2xkIjthOjA6e31zOjM6Im5ldyI7YTowOnt9fX0=', 1746006984),
	('pUD3EK8VxkdY96LfzAlsZOFYydX7w8dkItTSYj4b', NULL, '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/135.0.0.0 Safari/537.36', 'YTo0OntzOjY6Il90b2tlbiI7czo0MDoiQ2p6eXFCdHY3TWtJdzhaMk5abFBXOGl2MlYxbndMS0ZVVFVxOXRNUyI7czo5OiJfcHJldmlvdXMiO2E6MTp7czozOiJ1cmwiO3M6Mjc6Imh0dHA6Ly9kYXNoYm9hcmQtZ2hheWEudGVzdCI7fXM6NjoiX2ZsYXNoIjthOjI6e3M6Mzoib2xkIjthOjA6e31zOjM6Im5ldyI7YTowOnt9fXM6NjoibG9jYWxlIjtzOjI6ImVuIjt9', 1745845694);

-- Dumping structure for table dashboard-ghaya.statistics
CREATE TABLE IF NOT EXISTS `statistics` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `section_id` bigint unsigned NOT NULL,
  `title` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `icon` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `number` int NOT NULL,
  `locale` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'ar',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `statistics_section_id_foreign` (`section_id`),
  CONSTRAINT `statistics_section_id_foreign` FOREIGN KEY (`section_id`) REFERENCES `statistic_sections` (`id`) ON DELETE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=7 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Dumping data for table dashboard-ghaya.statistics: ~6 rows (approximately)
INSERT INTO `statistics` (`id`, `section_id`, `title`, `icon`, `number`, `locale`, `created_at`, `updated_at`) VALUES
	(1, 1, 'مشاريع ناجحة', 'briefcase', 250, 'ar', '2025-04-26 04:58:30', '2025-04-26 04:58:30'),
	(2, 2, 'Successful Projects', 'briefcase', 250, 'en', '2025-04-26 04:59:13', '2025-04-26 04:59:13'),
	(3, 1, 'عملاء سعداء', 'users', 140, 'ar', '2025-04-26 04:59:42', '2025-04-26 05:00:02'),
	(4, 2, 'Happy Clients', 'users', 140, 'en', '2025-04-26 04:59:53', '2025-04-26 04:59:53'),
	(5, 2, 'Years of Experience', 'award', 8, 'en', '2025-04-26 05:00:24', '2025-04-26 05:00:24'),
	(6, 1, 'سنوات من الخبرة', 'award', 8, 'ar', '2025-04-26 05:00:38', '2025-04-26 05:00:38');

-- Dumping structure for table dashboard-ghaya.statistic_sections
CREATE TABLE IF NOT EXISTS `statistic_sections` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `main_text` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `locale` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'en',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Dumping data for table dashboard-ghaya.statistic_sections: ~2 rows (approximately)
INSERT INTO `statistic_sections` (`id`, `main_text`, `locale`, `created_at`, `updated_at`) VALUES
	(1, 'إحصائيات الشركة', 'ar', '2025-04-26 04:54:05', '2025-04-26 04:54:05'),
	(2, 'Company Statistics', 'en', '2025-04-26 04:54:05', '2025-04-26 04:54:05');

-- Dumping structure for table dashboard-ghaya.team_members
CREATE TABLE IF NOT EXISTS `team_members` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `image` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=10 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Dumping data for table dashboard-ghaya.team_members: ~8 rows (approximately)
INSERT INTO `team_members` (`id`, `image`, `created_at`, `updated_at`) VALUES
	(1, 'uploads/team/1745661386_mohd.jpg', '2025-04-26 06:56:26', '2025-04-26 06:56:26'),
	(2, 'uploads/team/1745661546_abood.jpg', '2025-04-26 06:59:06', '2025-04-26 06:59:06'),
	(3, 'uploads/team/1745664388_mahdy.jpg', '2025-04-26 07:00:41', '2025-04-26 07:46:28'),
	(4, 'uploads/team/1745664464_kareem-image.jpg', '2025-04-26 07:47:44', '2025-04-26 07:47:44'),
	(5, 'uploads/team/1745664526_mohammed-abuhaseera.jpg', '2025-04-26 07:48:46', '2025-04-26 07:48:46'),
	(6, 'uploads/team/1745664656_marwan-alrayes.png', '2025-04-26 07:50:56', '2025-04-26 07:50:56'),
	(7, 'uploads/team/1745664707_Twfeeq.jpg', '2025-04-26 07:51:47', '2025-04-26 07:51:47'),
	(8, 'uploads/team/1745664764_Najd.jpg', '2025-04-26 07:52:44', '2025-04-26 07:52:44'),
	(9, 'uploads/team/1745664840_alaa-1.jpg', '2025-04-26 07:54:00', '2025-04-26 07:54:00');

-- Dumping structure for table dashboard-ghaya.team_member_translations
CREATE TABLE IF NOT EXISTS `team_member_translations` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `team_member_id` bigint unsigned NOT NULL,
  `locale` varchar(5) COLLATE utf8mb4_unicode_ci NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `position` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `task_description` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `experience` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `team_member_translations_team_member_id_foreign` (`team_member_id`),
  CONSTRAINT `team_member_translations_team_member_id_foreign` FOREIGN KEY (`team_member_id`) REFERENCES `team_members` (`id`) ON DELETE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=19 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Dumping data for table dashboard-ghaya.team_member_translations: ~17 rows (approximately)
INSERT INTO `team_member_translations` (`id`, `team_member_id`, `locale`, `name`, `position`, `task_description`, `experience`, `created_at`, `updated_at`) VALUES
	(1, 1, 'en', 'Mohammed Lulu', 'CEO & Co-Founder', 'Leading the vision and growth of the company.', '7+ Years of Experience', '2025-04-26 06:56:26', '2025-04-26 06:56:26'),
	(2, 1, 'ar', 'محمد لولو', 'المدير التنفيذي والمؤسس المشارك', 'قيادة رؤية ونمو الشركة.', 'أكثر من 7 سنوات خبرة', '2025-04-26 06:56:26', '2025-04-26 06:56:26'),
	(3, 2, 'en', 'Abdalmajid Aburahma', 'Graphic Designer', 'Bringing ideas to life with visual creativity.', '5+ Years of Experience', '2025-04-26 06:59:06', '2025-04-26 06:59:06'),
	(4, 2, 'ar', 'عبد المجيد ابو رحمة', 'مصمم جرافيك', 'تحويل الأفكار إلى تصاميم بصرية جذابة.', 'أكثر من 5 سنوات خبرة', '2025-04-26 06:59:06', '2025-04-26 06:59:06'),
	(5, 3, 'en', 'Mahdy Elkhoudary', 'Graphic Designer', 'Bringing ideas to life with visual creativity.', '5+ Years of Experience', '2025-04-26 07:00:41', '2025-04-26 07:00:41'),
	(6, 3, 'ar', 'مهدي الخضري', 'مصمم جرافيك', 'تحويل الأفكار إلى تصاميم بصرية جذابة.', 'أكثر من 5 سنوات خبرة', '2025-04-26 07:00:41', '2025-04-26 07:00:41'),
	(7, 4, 'en', 'Kareem Lulu', 'Video editor', 'Crafting compelling visuals and seamless stories.', '6+ Years of Experience', '2025-04-26 07:47:44', '2025-04-26 07:47:44'),
	(8, 4, 'ar', 'كريم لولو', 'مونتير فيديو', 'تصميم مشاهد جذابة وسيناريوهات متقنة.', 'أكثر من 6 سنوات خبرة', '2025-04-26 07:47:44', '2025-04-26 07:47:44'),
	(9, 5, 'en', 'Mohammed Abu Haseera', 'Mobile Developer', 'Building smart and responsive apps.', '5+ Years of Experience', '2025-04-26 07:48:46', '2025-04-26 07:48:46'),
	(10, 5, 'ar', 'محمد ابو حصيرة', 'مطور تطبيقات موبايل', 'تطوير تطبيقات ذكية ومتجاوبة.', 'أكثر من 5 سنوات خبرة', '2025-04-26 07:48:46', '2025-04-26 07:48:46'),
	(11, 6, 'en', 'Marwan alrayes', 'Full Stack Developer', 'Building smart, scalable, and secure web apps.', '4+ Years of Experience', '2025-04-26 07:50:56', '2025-04-26 07:50:56'),
	(12, 6, 'ar', 'مروان الريس', 'مطور Full Stack', 'بناء تطبيقات ويب ذكية وآمنة وقابلة للتوسع.', 'أكثر من 4 سنوات خبرة', '2025-04-26 07:50:56', '2025-04-26 07:50:56'),
	(13, 7, 'en', 'Tawfeeq Abu Haseera', 'Backend Developer', 'Designing robust and efficient server solutions.', '8+ Years of Experience', '2025-04-26 07:51:47', '2025-04-26 07:51:47'),
	(14, 7, 'ar', 'توفيق ابو حصيرة', 'مطور Back-End', 'تصميم حلول خوادم قوية وفعالة.', 'أكثر من 8 سنوات خبرة', '2025-04-26 07:51:47', '2025-04-26 07:51:47'),
	(15, 8, 'en', 'Najd Akila', 'Voiceover', 'Delivering clear, engaging, and powerful voice.', '8+ Years of Experience', '2025-04-26 07:52:44', '2025-04-26 07:52:44'),
	(16, 8, 'ar', 'نجد عكيلة', 'معلّق صوتي', 'تقديم صوت واضح وجذاب ومؤثر.', 'أكثر من 8 سنوات خبرة', '2025-04-26 07:52:44', '2025-04-26 07:52:44'),
	(17, 9, 'en', 'Alaa Dawoud', 'Content Writing', 'Writing impactful, clear, and engaging content.', '5+ Years of Experience', '2025-04-26 07:54:00', '2025-04-26 07:54:00'),
	(18, 9, 'ar', 'علاء داود', 'كاتب محتوى', 'كتابة محتوى فعال وواضح وجذاب.', 'أكثر من 5 سنوات خبرة', '2025-04-26 07:54:00', '2025-04-26 07:54:00');

-- Dumping structure for table dashboard-ghaya.team_sections
CREATE TABLE IF NOT EXISTS `team_sections` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Dumping data for table dashboard-ghaya.team_sections: ~0 rows (approximately)
INSERT INTO `team_sections` (`id`, `created_at`, `updated_at`) VALUES
	(1, '2025-04-26 06:54:04', '2025-04-26 06:54:04');

-- Dumping structure for table dashboard-ghaya.team_section_translations
CREATE TABLE IF NOT EXISTS `team_section_translations` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `team_section_id` bigint unsigned NOT NULL,
  `locale` varchar(5) COLLATE utf8mb4_unicode_ci NOT NULL,
  `title` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `description` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `team_section_translations_team_section_id_foreign` (`team_section_id`),
  CONSTRAINT `team_section_translations_team_section_id_foreign` FOREIGN KEY (`team_section_id`) REFERENCES `team_sections` (`id`) ON DELETE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Dumping data for table dashboard-ghaya.team_section_translations: ~2 rows (approximately)
INSERT INTO `team_section_translations` (`id`, `team_section_id`, `locale`, `title`, `description`, `created_at`, `updated_at`) VALUES
	(1, 1, 'en', 'Our Team', 'Our talented team is dedicated to bringing your ideas to life with creativity and precision', '2025-04-26 06:54:04', '2025-04-26 06:54:04'),
	(2, 1, 'ar', 'فريقنا', 'فريقنا الموهوب ملتزم بتحويل أفكارك إلى واقع بإبداع ودقة', '2025-04-26 06:54:04', '2025-04-26 06:54:04');

-- Dumping structure for table dashboard-ghaya.users
CREATE TABLE IF NOT EXISTS `users` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `password` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `users_email_unique` (`email`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Dumping data for table dashboard-ghaya.users: ~0 rows (approximately)

/*!40103 SET TIME_ZONE=IFNULL(@OLD_TIME_ZONE, 'system') */;
/*!40101 SET SQL_MODE=IFNULL(@OLD_SQL_MODE, '') */;
/*!40014 SET FOREIGN_KEY_CHECKS=IFNULL(@OLD_FOREIGN_KEY_CHECKS, 1) */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40111 SET SQL_NOTES=IFNULL(@OLD_SQL_NOTES, 1) */;
