-- --------------------------------------------------------
-- Host:                         127.0.0.1
-- Server version:               5.7.33 - MySQL Community Server (GPL)
-- Server OS:                    Win64
-- HeidiSQL Version:             11.2.0.6213
-- --------------------------------------------------------

/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET NAMES utf8 */;
/*!50503 SET NAMES utf8mb4 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;
/*!40111 SET @OLD_SQL_NOTES=@@SQL_NOTES, SQL_NOTES=0 */;


-- Dumping database structure for data_prod
CREATE DATABASE IF NOT EXISTS `data_prod` /*!40100 DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci */;
USE `data_prod`;

-- Dumping structure for table data_prod.activity_log
CREATE TABLE IF NOT EXISTS `activity_log` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `log_name` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `description` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `subject_type` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `event` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `subject_id` bigint(20) unsigned DEFAULT NULL,
  `causer_type` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `causer_id` bigint(20) unsigned DEFAULT NULL,
  `properties` json DEFAULT NULL,
  `batch_uuid` char(36) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `subject` (`subject_type`,`subject_id`),
  KEY `causer` (`causer_type`,`causer_id`),
  KEY `activity_log_log_name_index` (`log_name`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Dumping data for table data_prod.activity_log: ~0 rows (approximately)
DELETE FROM `activity_log`;
/*!40000 ALTER TABLE `activity_log` DISABLE KEYS */;
/*!40000 ALTER TABLE `activity_log` ENABLE KEYS */;

-- Dumping structure for table data_prod.categories
CREATE TABLE IF NOT EXISTS `categories` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `parent_id` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `icon` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `status` enum('on','off') COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=48 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Dumping data for table data_prod.categories: ~39 rows (approximately)
DELETE FROM `categories`;
/*!40000 ALTER TABLE `categories` DISABLE KEYS */;
INSERT INTO `categories` (`id`, `parent_id`, `name`, `icon`, `status`, `created_at`, `updated_at`, `deleted_at`) VALUES
	(8, '46', 'جميع المطابخ', NULL, 'on', '2022-05-06 19:57:11', '2022-05-06 19:57:11', NULL),
	(9, '46', 'المصري', NULL, 'on', '2022-05-06 19:57:47', '2022-05-06 20:56:14', NULL),
	(10, '46', 'السعودي', NULL, 'on', '2022-05-06 19:58:41', '2022-05-06 19:58:41', NULL),
	(11, '46', 'الخليجي', NULL, 'on', '2022-05-06 19:58:54', '2022-05-06 19:58:54', NULL),
	(12, '46', 'الشامي', NULL, 'on', '2022-05-06 19:59:07', '2022-05-06 19:59:07', NULL),
	(13, '46', 'الإيطالي', NULL, 'on', '2022-05-06 19:59:20', '2022-05-06 19:59:20', NULL),
	(14, '46', 'الغربي', NULL, 'on', '2022-05-06 19:59:33', '2022-05-06 19:59:33', NULL),
	(15, '46', 'الشرقي', NULL, 'on', '2022-05-06 19:59:50', '2022-05-06 19:59:50', NULL),
	(16, '46', 'الأوروبي', NULL, 'on', '2022-05-06 20:00:56', '2022-05-06 20:00:56', NULL),
	(17, '46', 'العالمي', NULL, 'on', '2022-05-06 20:01:10', '2022-05-06 20:01:10', NULL),
	(18, '46', 'المغربي', NULL, 'on', '2022-05-06 20:01:19', '2022-05-06 20:01:19', NULL),
	(19, '46', 'الصيني', NULL, 'on', '2022-05-06 20:01:27', '2022-05-06 20:01:27', NULL),
	(20, '46', 'الآسيوي', NULL, 'on', '2022-05-06 20:01:36', '2022-05-06 20:01:36', NULL),
	(21, '46', 'التركي', NULL, 'on', '2022-05-06 20:01:49', '2022-05-06 20:01:49', NULL),
	(22, '46', 'الهندي', NULL, 'on', '2022-05-06 20:02:18', '2022-05-06 20:02:18', NULL),
	(23, '46', 'المكسيكي', NULL, 'on', '2022-05-06 20:02:28', '2022-05-06 20:02:28', NULL),
	(24, '46', 'الأمريكي', NULL, 'on', '2022-05-06 20:02:42', '2022-05-06 20:02:42', NULL),
	(25, '47', 'أطباق رئيسية', NULL, 'on', '2022-05-06 20:03:25', '2022-05-06 20:03:25', NULL),
	(26, '47', 'معجنات', NULL, 'on', '2022-05-06 20:03:33', '2022-05-06 20:03:33', NULL),
	(27, '47', 'حلويات', NULL, 'on', '2022-05-06 20:03:45', '2022-05-06 20:03:45', NULL),
	(28, '47', 'سندويشات', NULL, 'on', '2022-05-06 20:03:57', '2022-05-06 20:03:57', NULL),
	(29, '47', 'مشروبات', NULL, 'on', '2022-05-06 20:04:10', '2022-05-06 20:04:10', NULL),
	(30, '47', 'صلصات', NULL, 'on', '2022-05-06 20:04:18', '2022-05-06 20:04:18', NULL),
	(31, '47', 'شوربات', NULL, 'on', '2022-05-06 20:04:26', '2022-05-06 20:04:26', NULL),
	(32, '47', 'سلطات', NULL, 'on', '2022-05-06 20:04:37', '2022-05-06 20:04:37', NULL),
	(33, '47', 'مقبلات', NULL, 'on', '2022-05-06 20:04:48', '2022-05-06 20:04:48', NULL),
	(34, '47', 'أكلات رجيم', NULL, 'on', '2022-05-06 20:05:52', '2022-05-06 20:05:52', NULL),
	(35, '47', 'فيديوهات', NULL, 'on', '2022-05-06 20:05:59', '2022-05-06 20:05:59', NULL),
	(36, '47', 'دليل الطهي', NULL, 'on', '2022-05-06 20:06:07', '2022-05-06 20:06:07', NULL),
	(37, '47', 'وصفات كيتو', NULL, 'on', '2022-05-06 20:06:27', '2022-05-06 20:06:27', NULL),
	(38, NULL, 'المناسبات', NULL, 'on', '2022-05-06 20:06:39', '2022-05-06 20:06:39', NULL),
	(39, '38', 'رمضان', NULL, 'on', '2022-05-06 20:06:47', '2022-05-06 20:06:47', NULL),
	(40, '38', 'عيد الفطر', NULL, 'on', '2022-05-06 20:06:55', '2022-05-06 20:06:55', NULL),
	(41, '38', 'عيد الأضحى', NULL, 'on', '2022-05-06 20:07:07', '2022-05-06 20:07:07', NULL),
	(42, '38', 'عيد الأم', NULL, 'on', '2022-05-06 20:07:22', '2022-05-06 20:07:22', NULL),
	(43, '38', 'شم النسيم', NULL, 'on', '2022-05-06 20:07:34', '2022-05-06 20:07:34', NULL),
	(44, '38', 'رأس السنة', NULL, 'on', '2022-05-06 20:07:44', '2022-05-06 20:07:44', NULL),
	(45, '38', 'عيد الحب', NULL, 'on', '2022-05-06 20:08:33', '2022-05-06 20:08:33', NULL),
	(46, NULL, 'مطابخ', NULL, 'on', '2022-05-06 21:00:48', '2022-05-06 21:00:48', NULL),
	(47, NULL, 'التصنيفات', NULL, 'on', '2022-05-06 21:01:18', '2022-05-06 21:01:18', NULL);
/*!40000 ALTER TABLE `categories` ENABLE KEYS */;

-- Dumping structure for table data_prod.failed_jobs
CREATE TABLE IF NOT EXISTS `failed_jobs` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `uuid` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `connection` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `queue` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `payload` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `exception` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `failed_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`),
  UNIQUE KEY `failed_jobs_uuid_unique` (`uuid`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Dumping data for table data_prod.failed_jobs: ~0 rows (approximately)
DELETE FROM `failed_jobs`;
/*!40000 ALTER TABLE `failed_jobs` DISABLE KEYS */;
/*!40000 ALTER TABLE `failed_jobs` ENABLE KEYS */;

-- Dumping structure for table data_prod.migrations
CREATE TABLE IF NOT EXISTS `migrations` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `migration` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `batch` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=13 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Dumping data for table data_prod.migrations: ~9 rows (approximately)
DELETE FROM `migrations`;
/*!40000 ALTER TABLE `migrations` DISABLE KEYS */;
INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES
	(1, '2014_10_12_000000_create_users_table', 1),
	(2, '2014_10_12_100000_create_password_resets_table', 1),
	(3, '2019_08_19_000000_create_failed_jobs_table', 1),
	(4, '2019_12_14_000001_create_personal_access_tokens_table', 1),
	(5, '2022_05_05_130814_create_activity_log_table', 2),
	(6, '2022_05_05_130815_add_event_column_to_activity_log_table', 2),
	(7, '2022_05_05_130816_add_batch_uuid_column_to_activity_log_table', 2),
	(8, '2022_05_05_132757_create_settings_table', 3),
	(9, '2022_05_05_144857_create_categories_table', 4),
	(12, '2022_05_06_201450_create_recipes_table', 5);
/*!40000 ALTER TABLE `migrations` ENABLE KEYS */;

-- Dumping structure for table data_prod.password_resets
CREATE TABLE IF NOT EXISTS `password_resets` (
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  KEY `password_resets_email_index` (`email`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Dumping data for table data_prod.password_resets: ~0 rows (approximately)
DELETE FROM `password_resets`;
/*!40000 ALTER TABLE `password_resets` DISABLE KEYS */;
/*!40000 ALTER TABLE `password_resets` ENABLE KEYS */;

-- Dumping structure for table data_prod.personal_access_tokens
CREATE TABLE IF NOT EXISTS `personal_access_tokens` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `tokenable_type` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `tokenable_id` bigint(20) unsigned NOT NULL,
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

-- Dumping data for table data_prod.personal_access_tokens: ~0 rows (approximately)
DELETE FROM `personal_access_tokens`;
/*!40000 ALTER TABLE `personal_access_tokens` DISABLE KEYS */;
/*!40000 ALTER TABLE `personal_access_tokens` ENABLE KEYS */;

-- Dumping structure for table data_prod.recipes
CREATE TABLE IF NOT EXISTS `recipes` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `kitchen_id` bigint(20) unsigned NOT NULL,
  `category_id` bigint(20) unsigned NOT NULL,
  `occasion_id` bigint(20) unsigned NOT NULL,
  `title` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `description` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `main_image` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `cooking_time` int(11) DEFAULT NULL,
  `number_of_people` int(11) DEFAULT NULL,
  `ingredients` json DEFAULT NULL,
  `prepares` json DEFAULT NULL,
  `status` enum('published','unpublished') COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'unpublished',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=39 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Dumping data for table data_prod.recipes: ~26 rows (approximately)
DELETE FROM `recipes`;
/*!40000 ALTER TABLE `recipes` DISABLE KEYS */;
INSERT INTO `recipes` (`id`, `kitchen_id`, `category_id`, `occasion_id`, `title`, `description`, `main_image`, `cooking_time`, `number_of_people`, `ingredients`, `prepares`, `status`, `created_at`, `updated_at`, `deleted_at`) VALUES
	(9, 8, 25, 39, 'مكرونة سريعة لسفرة رمضان', 'مكرونة سريعة لسفرة رمضان ... نقدم لكِ من مطبخ سيدتي، وصفة سريعة من أكلات المكرونة الرائعة والطيبة والمحببة على السفرة الرمضانية، جربيها بخطوات سهلة وطعم لذيذ', '/uploads/photos/recipes/main_images/2022-05-07/CiN9zlXfxxQudA23.jpg', 30, 4, '["زيت الزيتون : ملعقة كبيرة", "البصل : 1 حبة (مفروم)", "الثوم : فصّان (مهروس)", "طماطم : 2 كوب (مقطعة)", "معجون الطماطم : ملعقة كبيرة", "ملح : ملعقة صغيرة", "فلفل أسود : رشّة", "أوريغانو : ملعقة صغيرة", "معكرونة : عبوة"]', '["في قدر على النار، سخنّي زيت الزيتون وأضيفي البصل والثوم وحركي حتى تذبل المكونات.", "أضيفي الطماطم المهروسة ونكهي بالملح، والفلفل الأسود، والأوريغانو.", "اتركي المكونات على النار مع التقليب من وقت الى آخر حتى تنضج.", "ي قدر من الماء المغلي والمملح، اسلقي المكرونة.", "صفي المكرونة من الماء، واتركيها جانباً لحوالي 10 دقائق.", "أضيفي معجون الطماطم على المزيج السابق وقلبي المكونات حتى يصبح لديكِ خليط متجانس القوام.", "أضيفي المكرونة فوق الخليط، وقلبي بخفّة حتى تتداخل المكونات جيداً، ثم اسكبيها في طبق التقديم وقدميها."]', 'published', '2022-05-07 14:12:23', '2022-05-07 14:12:23', NULL),
	(10, 8, 27, 42, 'xcvxcvxcvxc', 'xcvxcvxcvxcv', '/uploads/photos/recipes/main_images/2022-05-07/iqFVLU5mFiIz9XUr.jpg', 5555, 555, '["fghfghfghfghfgh", "fghfghfghf", "fghfghfghfg", "fghfghfgh"]', '["fghfghfghfghfghfgh", "fghfghfghfghfghfgh", "fghfghfghfghfghfgh", "fghfghfghfghfgh"]', 'published', '2022-05-07 15:21:53', '2022-05-07 15:21:53', NULL),
	(11, 8, 25, 39, 'Eaque eum id neque', 'Maxime totam quas se', '/uploads/photos/recipes/main_images/2022-05-13/CAAUQU1gAJOwvnOS.jpg', 69, 322, '["Exercitationem eu au", "zxczxczxc"]', '["Maiores occaecat min", "zxczxczxc"]', 'published', '2022-05-13 17:59:33', '2022-05-13 17:59:33', NULL),
	(12, 8, 25, 39, 'Eaque eum id neque', 'Maxime totam quas se', '/uploads/photos/recipes/main_images/2022-05-13/XTAMCTUg3zbVKiS2.jpg', 69, 322, '["Exercitationem eu au", "zxczxczxc"]', '["Maiores occaecat min", "zxczxczxc"]', 'published', '2022-05-13 17:59:51', '2022-05-13 17:59:51', NULL),
	(13, 11, 29, 40, 'Commodo lorem aliqui', 'Ut quia ut labore vi', '/uploads/photos/recipes/main_images/2022-05-13/bxcc9YLCAiQDmrW0.jpg', 20, 752, '["Dolor quos non expli", "xcvxcvxcv", "xcvxcvxcv"]', '["Aperiam commodo inci", "xcvxcvxcvxcv"]', 'published', '2022-05-13 18:03:59', '2022-05-13 18:03:59', NULL),
	(14, 11, 29, 40, 'Commodo lorem aliqui', 'Ut quia ut labore vi', '/uploads/photos/recipes/main_images/2022-05-13/8pi0ce44dgXKubYH.jpg', 20, 752, '["Dolor quos non expli", "xcvxcvxcv", "xcvxcvxcv"]', '["Aperiam commodo inci", "xcvxcvxcvxcv"]', 'published', '2022-05-13 18:04:19', '2022-05-13 18:04:19', NULL),
	(15, 8, 25, 39, 'Eiusmod laborum Ven', 'Esse aut veniam do', '/uploads/photos/recipes/main_images/2022-05-13/97yZ1l2XuQ4OiEMI.jpg', 96, 645, '["Beatae commodo dolor"]', '["Quo ut laborum occae"]', 'published', '2022-05-13 18:08:09', '2022-05-13 18:08:09', NULL),
	(16, 8, 25, 39, 'Eiusmod laborum Ven', 'Esse aut veniam do', '/uploads/photos/recipes/main_images/2022-05-13/3HYoswXUwJuQOsIk.jpg', 96, 645, '["Beatae commodo dolor"]', '["Quo ut laborum occae"]', 'published', '2022-05-13 18:08:19', '2022-05-13 18:08:19', NULL),
	(17, 9, 25, 39, 'Dolor corrupti dolo', 'Debitis labore hic v', '/uploads/photos/recipes/main_images/2022-05-13/g2wH1QE1gHQ0VNX4.jpg', 95, 891, '["Repudiandae rem dolo", "Perspiciatis id nu"]', '["Eos ut numquam sapie"]', 'published', '2022-05-13 18:36:07', '2022-05-13 18:36:07', NULL),
	(18, 8, 26, 39, 'Nulla pariatur Qui', 'Voluptatum illum lo', '/uploads/photos/recipes/main_images/2022-05-13/z3lObtsG9o1UuUOC.jpg', 37, 910, '["Eveniet sit fuga F", "zxczxczxc"]', '["Ex tenetur iusto ut", "zxczxczxc"]', 'published', '2022-05-13 18:40:47', '2022-05-13 18:40:47', NULL),
	(19, 9, 28, 40, 'وجبت البطاطا و الجبن اللديددة', 'وجبت البطاطا و الجبن اللديددة', '/uploads/photos/recipes/main_images/2022-05-13/4Kq73dtk6b5NpnPy.jpg', 16, 212, '["Recusandae Optio q", "ءرءؤرءؤرءؤريسبسبسيبس"]', '["Incididunt explicabo", "سيبسيبسيب"]', 'published', '2022-05-13 18:43:33', '2022-05-13 18:43:33', NULL),
	(20, 10, 26, 40, 'Magni voluptate unde', 'Corrupti ullamco mo', '/uploads/photos/recipes/main_images/2022-05-13/ujC4co4EdjofLwOi.jpg', 57, 953, '["Amet autem consecte"]', '["Ab consequat Incidi"]', 'published', '2022-05-13 18:44:07', '2022-05-13 18:44:07', NULL),
	(21, 10, 25, 40, 'وجب الشورما', 'وجب الشورما', '/uploads/photos/recipes/main_images/2022-05-13/7MZlQQfPkGA4kUkC.jpg', 444, 44, '["ئءبسيبسيب"]', '["سيبسيبسيبسيب"]', 'published', '2022-05-13 18:45:15', '2022-05-13 18:45:15', NULL),
	(22, 8, 25, 40, 'Assumenda eum sequi', 'Velit veniam proide', '/uploads/photos/recipes/main_images/2022-05-13/jxbOVdifdy0Ztamk.jpg', 26, 495, '["Sint esse deserunt n", "56156156156"]', '["Adipisicing labore v"]', 'published', '2022-05-13 18:50:39', '2022-05-13 18:50:39', NULL),
	(23, 9, 25, 40, 'Vitae ut obcaecati q', 'Reprehenderit duis', '/uploads/photos/recipes/main_images/2022-05-14/CMUUY7jJnTCfLRCQ.jpg', 8, 338, '["Beatae ea consequunt"]', '["Irure eius quo numqu"]', 'published', '2022-05-14 03:37:38', '2022-05-14 03:37:38', NULL),
	(24, 10, 25, 41, 'Ipsam irure rerum al', 'Atque mollitia simil', '/uploads/photos/recipes/main_images/2022-05-14/8r9rRCyJ1hxZyxsT.jpg', 73, 647, '["Dolore repellendus"]', '["Tempore qui dolor i"]', 'published', '2022-05-14 03:54:19', '2022-05-14 03:54:19', NULL),
	(25, 9, 25, 39, 'Consectetur saepe q', 'Adipisci quibusdam v', '/uploads/photos/recipes/main_images/2022-05-14/3onHz7DowkeNpDqw.jpg', 100, 739, '["Aperiam aut est tem"]', '["Explicabo Molestiae"]', 'published', '2022-05-14 04:23:41', '2022-05-14 04:23:41', NULL),
	(26, 8, 25, 40, 'Dolorum ullam saepe', 'Culpa inventore qui', '/uploads/photos/recipes/main_images/2022-05-14/O7cYFfGtV4KFHI4H.jpg', 11, 756, '["Quia accusamus quide"]', '["Voluptatem non ut q"]', 'published', '2022-05-14 05:40:50', '2022-05-14 05:40:50', NULL),
	(27, 12, 28, 40, 'Maiores dolorem temp', 'Cupidatat provident', '/uploads/photos/recipes/main_images/2022-05-14/MpB0b0zv1YIjFTX9.jpg', 76, 739, '["Culpa saepe distinc"]', '["Omnis commodo nulla"]', 'published', '2022-05-14 05:42:19', '2022-05-14 05:42:19', NULL),
	(28, 11, 29, 42, 'مكرونة سريعة لسفرة رمضان', 'مكرونة سريعة لسفرة رمضان', '/uploads/photos/recipes/main_images/2022-05-14/zAZ5LOrbLXbYQBDZ.jpg', 444, 444, '["مكرونة سريعة لسفرة رمضان"]', '["مكرونة سريعة لسفرة رمضان"]', 'published', '2022-05-14 05:42:56', '2022-05-14 05:42:56', NULL),
	(29, 11, 29, 41, 'Dolore enim at illo', 'Et doloremque nulla', '/uploads/photos/recipes/main_images/2022-05-14/Vzw6AmPhP8o0vyzF.jpg', 21, 529, '["Laboriosam alias mo"]', '["Quia laudantium aut"]', 'published', '2022-05-14 06:05:04', '2022-05-14 06:05:04', NULL),
	(30, 11, 27, 39, 'ابرهيم', 'ابرهيم', '/uploads/photos/recipes/main_images/2022-05-14/UsDc4mtjGz44L2aj.jpg', 444, 444, '["يليبليبليبل"]', '["يليبليبليبل"]', 'published', '2022-05-14 06:05:45', '2022-05-14 06:05:45', NULL),
	(31, 11, 27, 41, 'Unde consequatur po', 'Laboris placeat del', '/uploads/photos/recipes/main_images/2022-05-14/nnLdK1gqTgQ2EEny.jpg', 74, 77, '["Irure ut ex minus al"]', '["Ut laborum consequat"]', 'published', '2022-05-14 06:59:52', '2022-05-14 06:59:52', NULL),
	(32, 9, 28, 42, 'طريقة عمل الحمص الشامي', 'طريقة عمل الحمص الشامي', '/uploads/photos/recipes/main_images/2022-05-14/3a79XHJLlV9VSpGo.jpg', 11, 11, '["dsfsdfsdf"]', '["asfsdfsdfsd"]', 'published', '2022-05-14 08:23:35', '2022-05-14 08:23:35', NULL),
	(33, 11, 28, 40, 'Aliquid non facilis', 'Facilis dignissimos', '/uploads/photos/recipes/main_images/2022-05-14/iEo0dpMCp85Cq2KC.jpg', 67, 214, '["Officia Nam mollit a"]', '["Dolor qui placeat i"]', 'published', '2022-05-14 08:24:16', '2022-05-14 08:24:16', NULL),
	(34, 10, 25, 41, 'Est voluptatibus iur', 'Omnis aliquam quidem', '/uploads/photos/recipes/main_images/2022-05-14/WLMKPXG80ycvrjQG.jpg', 32, 819, '["Eum praesentium maio"]', '["Ut non asperiores so"]', 'published', '2022-05-14 08:25:01', '2022-05-14 08:25:01', NULL),
	(35, 8, 25, 41, 'Consectetur ex aperi', 'Cupidatat suscipit v', '/uploads/photos/recipes/main_images/2022-05-14/Fu8IgmIKkdrCIWsB.jpg', 85, 402, '["Dicta expedita dolor"]', '["Voluptas ut voluptat"]', 'published', '2022-05-14 09:37:16', '2022-05-14 09:37:16', NULL),
	(36, 8, 26, 40, 'Unde aliquip exercit', 'Iusto laboris non du', '/uploads/photos/recipes/main_images/2022-05-15/85mj7MwIFcGtEwSo.jpg', 12, 802, '["Tempore quos quasi"]', '["Ea rerum dolorem sit"]', 'published', '2022-05-15 14:13:08', '2022-05-15 14:13:08', NULL),
	(37, 9, 25, 39, 'Quae sed et reiciend', 'Ipsum ut laudantium', '/uploads/photos/recipes/main_images/2022-05-15/n2yljWN6Yyr3PLex.jpg', 74, 702, '["Consectetur consequa"]', '["Velit sit occaecat"]', 'published', '2022-05-15 14:13:33', '2022-05-15 14:13:33', NULL),
	(38, 9, 25, 40, 'Commodi laudantium', 'Amet voluptas volup', '/uploads/photos/recipes/main_images/2022-05-18/z4r66n9IJqPYZsDJ.jpg', 69, 67, '["Magna elit id cons"]', '["Est reprehenderit p"]', 'published', '2022-05-18 12:58:41', '2022-05-18 12:58:41', NULL);
/*!40000 ALTER TABLE `recipes` ENABLE KEYS */;

-- Dumping structure for table data_prod.settings
CREATE TABLE IF NOT EXISTS `settings` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `name` text COLLATE utf8mb4_unicode_ci,
  `description` text COLLATE utf8mb4_unicode_ci,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `mobile` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `logo` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `logo_min` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `whatsApp` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `facebook` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `twitter` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `instagram` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `youtube` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `telephone` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `fax` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `viber` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `snapchat` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `google` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `linkedin` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `android_url` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `ios_url` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `app_url` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `app_ratio` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `app_status` enum('up','down') COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `have_update` tinyint(1) NOT NULL DEFAULT '0',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Dumping data for table data_prod.settings: ~0 rows (approximately)
DELETE FROM `settings`;
/*!40000 ALTER TABLE `settings` DISABLE KEYS */;
INSERT INTO `settings` (`id`, `name`, `description`, `email`, `mobile`, `logo`, `logo_min`, `whatsApp`, `facebook`, `twitter`, `instagram`, `youtube`, `telephone`, `fax`, `viber`, `snapchat`, `google`, `linkedin`, `android_url`, `ios_url`, `app_url`, `app_ratio`, `app_status`, `have_update`, `created_at`, `updated_at`, `deleted_at`) VALUES
	(1, 'photonslab api kit\r\n', 'photonslab api kit', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'up', 0, '2022-05-05 16:33:49', '2022-05-05 16:33:51', NULL);
/*!40000 ALTER TABLE `settings` ENABLE KEYS */;

-- Dumping structure for table data_prod.users
CREATE TABLE IF NOT EXISTS `users` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `password` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `users_email_unique` (`email`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Dumping data for table data_prod.users: ~2 rows (approximately)
DELETE FROM `users`;
/*!40000 ALTER TABLE `users` DISABLE KEYS */;
INSERT INTO `users` (`id`, `name`, `email`, `email_verified_at`, `password`, `remember_token`, `created_at`, `updated_at`) VALUES
	(1, 'admin', 'admin@photonslab.com', NULL, '$2y$10$OT18a26QJGjxZLeb9Q5gVOUFGk0ICsvIAKRSL.2aATi11dI93ogXC', NULL, '2022-05-05 12:44:39', '2022-05-05 12:44:39'),
	(2, 'Fitzgerald Alvarez', 'lazuwas@mailinator.com', NULL, '$2y$10$BNUSwUCmCiJl1KdmXJn.b.YRhIYrZ6oN/1v.AIehK.g88dWKNPnnO', NULL, '2022-05-07 15:59:23', '2022-05-07 15:59:23'),
	(3, 'Kim Koch', 'qicajexos@mailinator.com', NULL, '$2y$10$FrvpWWAwLDOAEQjwTTDhBuV3jYLh9YjlLba9qr02LzrRuDzIuZPfe', NULL, '2022-05-17 17:40:16', '2022-05-17 17:40:16');
/*!40000 ALTER TABLE `users` ENABLE KEYS */;

/*!40101 SET SQL_MODE=IFNULL(@OLD_SQL_MODE, '') */;
/*!40014 SET FOREIGN_KEY_CHECKS=IFNULL(@OLD_FOREIGN_KEY_CHECKS, 1) */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40111 SET SQL_NOTES=IFNULL(@OLD_SQL_NOTES, 1) */;
