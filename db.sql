-- phpMyAdmin SQL Dump
-- version 4.8.5
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jul 05, 2019 at 08:58 PM
-- Server version: 10.1.38-MariaDB
-- PHP Version: 7.3.3

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `bader`
--

-- --------------------------------------------------------

--
-- Table structure for table `activations`
--

CREATE TABLE `activations` (
  `email` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `used` tinyint(1) NOT NULL DEFAULT '0',
  `created_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `admin_activations`
--

CREATE TABLE `admin_activations` (
  `email` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `used` tinyint(1) NOT NULL DEFAULT '0',
  `created_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `admin_password_resets`
--

CREATE TABLE `admin_password_resets` (
  `email` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `admin_users`
--

CREATE TABLE `admin_users` (
  `id` int(10) UNSIGNED NOT NULL,
  `first_name` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `last_name` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `email` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `password` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `activated` tinyint(1) NOT NULL DEFAULT '0',
  `forbidden` tinyint(1) NOT NULL DEFAULT '0',
  `language` varchar(2) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'en',
  `deleted_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `admin_users`
--

INSERT INTO `admin_users` (`id`, `first_name`, `last_name`, `email`, `password`, `remember_token`, `activated`, `forbidden`, `language`, `deleted_at`, `created_at`, `updated_at`) VALUES
(1, 'Administrator', 'Administrator', 'administrator@brackets.sk', '$2y$10$k.ZEEuYrRHV67O/qSSbajOXWz7d9.TGvVEY./WlrUQUMsHnu2.yBy', 'zQzCKidmc5QMgo7zGsi38eynp7Bnp3OcOcYsPRiUParfbHVN58YwI1W15Lba', 1, 0, 'en', NULL, '2019-04-17 17:05:39', '2019-04-17 17:05:39');

-- --------------------------------------------------------

--
-- Table structure for table `awqafs`
--

CREATE TABLE `awqafs` (
  `id` int(10) UNSIGNED NOT NULL,
  `test_name` varchar(11) COLLATE utf8mb4_unicode_ci NOT NULL,
  `date` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `place` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `tester_name` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `awqafs`
--

INSERT INTO `awqafs` (`id`, `test_name`, `date`, `place`, `tester_name`, `created_at`, `updated_at`) VALUES
(1, '1', '10-9-2018', 'وزارة الأوقاف - الطابق 7', 'الشيخ خالد العلبي', '2019-04-25 16:39:01', '2019-04-25 16:39:01');

-- --------------------------------------------------------

--
-- Table structure for table `awqaf_students`
--

CREATE TABLE `awqaf_students` (
  `id` int(10) UNSIGNED NOT NULL,
  `student_id` int(11) NOT NULL,
  `awqaf_id` int(11) NOT NULL,
  `student_mark` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `is_passed` tinyint(1) NOT NULL,
  `full_mark` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `subject_type` enum('juza','surah','page','') COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'juza',
  `subject_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `awqaf_students`
--

INSERT INTO `awqaf_students` (`id`, `student_id`, `awqaf_id`, `student_mark`, `is_passed`, `full_mark`, `created_at`, `updated_at`, `subject_type`, `subject_id`) VALUES
(1, 2, 1, '95', 1, '100', '2019-05-01 21:00:00', NULL, 'juza', 1),
(3, 2, 1, '77', 1, '100', '2019-05-28 21:00:00', NULL, 'page', 1);

-- --------------------------------------------------------

--
-- Table structure for table `courses`
--

CREATE TABLE `courses` (
  `id` int(10) UNSIGNED NOT NULL,
  `semester_id` int(11) NOT NULL,
  `course_name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `description` text COLLATE utf8mb4_unicode_ci,
  `started_at` date DEFAULT NULL,
  `end_at` date DEFAULT NULL,
  `session_number` int(11) NOT NULL,
  `enabled` tinyint(1) NOT NULL DEFAULT '1',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `courses`
--

INSERT INTO `courses` (`id`, `semester_id`, `course_name`, `description`, `started_at`, `end_at`, `session_number`, `enabled`, `created_at`, `updated_at`) VALUES
(2, 2, 'تحفيظ القرآن الكريم', 'ب', '2019-06-11', '2019-06-28', 15, 1, '2019-04-25 16:24:30', '2019-06-12 00:43:08'),
(3, 2, 'فارس الحديث', NULL, NULL, NULL, 22, 1, '2019-04-25 16:24:45', '2019-04-25 16:24:55'),
(4, 4, 'aaa', NULL, '2019-06-10', '2019-06-29', 8, 1, '2019-06-12 00:43:25', '2019-06-12 00:43:25'),
(5, 4, 'ssss', NULL, NULL, NULL, 9, 1, '2019-06-12 00:55:04', '2019-06-12 00:55:04'),
(6, 5, 'تحفيظ القرآن الكريم - الصف السابع', NULL, '2019-06-02', '2019-06-25', 30, 1, '2019-06-30 14:53:18', '2019-06-30 14:53:18');

-- --------------------------------------------------------

--
-- Table structure for table `course_students`
--

CREATE TABLE `course_students` (
  `id` int(10) UNSIGNED NOT NULL,
  `course_id` int(10) UNSIGNED NOT NULL,
  `student_id` int(10) UNSIGNED NOT NULL,
  `class_id` int(10) NOT NULL,
  `note` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `course_students`
--

INSERT INTO `course_students` (`id`, `course_id`, `student_id`, `class_id`, `note`, `created_at`, `updated_at`) VALUES
(1, 2, 2, 2, NULL, NULL, NULL),
(4, 2, 5, 1, NULL, NULL, NULL),
(5, 3, 2, 2, NULL, NULL, NULL),
(7, 2, 4, 2, NULL, NULL, NULL),
(8, 2, 3, 1, NULL, NULL, NULL),
(9, 4, 6, 2, NULL, NULL, NULL),
(10, 4, 2, 2, NULL, NULL, NULL),
(11, 4, 4, 2, NULL, NULL, NULL),
(12, 4, 8, 2, NULL, NULL, NULL),
(13, 6, 2, 2, NULL, NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `exams`
--

CREATE TABLE `exams` (
  `id` int(10) UNSIGNED NOT NULL,
  `course_id` int(11) NOT NULL,
  `exam_name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `exam_max_num` int(11) NOT NULL,
  `exam_min_num` int(11) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `exams`
--

INSERT INTO `exams` (`id`, `course_id`, `exam_name`, `exam_max_num`, `exam_min_num`, `created_at`, `updated_at`) VALUES
(2, 2, 'تسميع معاني المفردات', 100, 50, '2019-04-25 16:25:27', '2019-04-25 16:25:27'),
(3, 2, 'شرح الآيات الكريمة', 100, 50, '2019-04-25 16:25:46', '2019-04-25 16:25:46'),
(4, 3, '100 حديث من سنن الترمذي', 60, 100, '2019-05-13 23:53:52', '2019-05-13 23:53:52'),
(5, 6, 'سبر الجزء', 100, 50, '2019-06-30 14:54:06', '2019-06-30 14:54:06');

-- --------------------------------------------------------

--
-- Table structure for table `juza`
--

CREATE TABLE `juza` (
  `id` int(11) NOT NULL,
  `juza_name` varchar(200) NOT NULL,
  `page_start_num` int(11) NOT NULL,
  `page_end_num` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `juza`
--

INSERT INTO `juza` (`id`, `juza_name`, `page_start_num`, `page_end_num`) VALUES
(1, 'الجزء الأول', 2, 21);

-- --------------------------------------------------------

--
-- Table structure for table `listened_subjects`
--

CREATE TABLE `listened_subjects` (
  `id` int(10) UNSIGNED NOT NULL,
  `student_id` int(11) NOT NULL,
  `student_course_id` int(11) NOT NULL,
  `subject_id` int(11) NOT NULL,
  `subject_type` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `listened_subjects`
--

INSERT INTO `listened_subjects` (`id`, `student_id`, `student_course_id`, `subject_id`, `subject_type`, `created_at`, `updated_at`) VALUES
(2, 1, 1, 1, 'page', '2019-05-25 21:00:00', NULL),
(3, 1, 1, 1, 'juza', NULL, NULL),
(4, 1, 1, 1, 'juza', NULL, NULL),
(5, 1, 1, 1, 'juza', NULL, NULL),
(6, 1, 1, 1, 'juza', NULL, NULL),
(7, 1, 1, 1, 'juza', NULL, NULL),
(8, 1, 1, 1, 'juza', NULL, NULL),
(9, 1, 1, 1, 'juza', NULL, NULL),
(10, 1, 1, 1, 'juza', NULL, NULL),
(11, 1, 1, 1, 'juza', NULL, NULL),
(12, 1, 1, 1, 'juza', NULL, NULL),
(13, 1, 1, 1, 'juza', NULL, NULL),
(14, 1, 1, 1, 'juza', NULL, NULL),
(15, 1, 1, 1, 'juza', NULL, NULL),
(16, 1, 1, 1, 'juza', NULL, NULL),
(17, 1, 1, 1, 'juza', NULL, NULL),
(18, 1, 1, 1, 'juza', NULL, NULL),
(19, 1, 1, 1, 'juza', NULL, NULL),
(20, 4, 7, 1, 'surah', '2019-05-24 08:20:46', '2019-05-24 08:20:46'),
(21, 2, 1, 1, 'surah', '2019-05-26 01:25:01', '2019-05-26 01:25:01'),
(22, 2, 1, 78, 'surah', '2019-05-26 01:32:11', '2019-05-26 01:32:11'),
(23, 3, 8, 1, 'page', '2019-05-26 01:48:15', '2019-05-26 01:48:15'),
(24, 2, 1, 79, 'surah', '2019-05-26 18:54:32', '2019-05-26 18:54:32'),
(25, 2, 13, 78, 'surah', '2019-06-30 15:36:33', '2019-06-30 15:36:33'),
(26, 2, 13, 79, 'surah', '2019-06-30 16:09:07', '2019-06-30 16:09:07');

-- --------------------------------------------------------

--
-- Table structure for table `marks`
--

CREATE TABLE `marks` (
  `id` int(10) UNSIGNED NOT NULL,
  `exam_id` int(11) NOT NULL,
  `student_id` int(11) NOT NULL,
  `course_student_id` int(11) NOT NULL,
  `mark` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `notes` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `marks`
--

INSERT INTO `marks` (`id`, `exam_id`, `student_id`, `course_student_id`, `mark`, `notes`, `created_at`, `updated_at`) VALUES
(1, 3, 2, 1, '90', 'Te', NULL, NULL),
(2, 3, 2, 1, '99', 'ss', NULL, NULL),
(3, 2, 5, 4, '80', 'kk', NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `media`
--

CREATE TABLE `media` (
  `id` int(10) UNSIGNED NOT NULL,
  `model_type` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `model_id` bigint(20) UNSIGNED NOT NULL,
  `collection_name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `file_name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `mime_type` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `disk` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `size` int(10) UNSIGNED NOT NULL,
  `manipulations` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `custom_properties` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `order_column` int(10) UNSIGNED DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

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
(10, '2019_03_29_190056_create_class_table', 4),
(16, '2019_03_29_193041_fill_permissions_for_class', 5),
(22, '2019_03_29_190056_create_std_class_table', 11),
(23, '2019_03_29_194806_fill_permissions_for_std-class', 11),
(24, '2019_03_29_190056_create_stdclass_table', 12),
(25, '2019_03_29_195019_fill_permissions_for_stdclass', 12),
(38, '2017_08_24_000000_create_activations_table', 13),
(39, '2017_08_24_000000_create_admin_activations_table', 13),
(40, '2017_08_24_000000_create_admin_password_resets_table', 13),
(41, '2017_08_24_000000_create_admin_users_table', 13),
(42, '2018_07_18_000000_create_wysiwyg_media_table', 13),
(43, '2019_03_29_185444_create_media_table', 13),
(44, '2019_03_29_185444_create_permission_tables', 13),
(45, '2019_03_29_185449_fill_default_admin_user_and_permissions', 13),
(46, '2019_03_29_190055_create_translations_table', 13),
(47, '2019_03_29_190056_create_student_class_table', 13),
(48, '2019_03_29_190057_create_course_table', 13),
(49, '2019_03_29_190058_create_exam_table', 13),
(50, '2019_03_29_190059_create_semester_table', 13),
(51, '2019_03_29_190155_create_student_table', 13),
(52, '2019_03_29_190157_create_teacher_table', 13),
(53, '2019_03_29_193111_fill_permissions_for_course', 13),
(54, '2019_03_29_193129_fill_permissions_for_exam', 13),
(55, '2019_03_29_193208_fill_permissions_for_semester', 13),
(56, '2019_03_29_193241_fill_permissions_for_student', 13),
(57, '2019_03_29_193320_fill_permissions_for_teacher', 13),
(58, '2019_03_29_195914_fill_permissions_for_student-class', 13),
(59, '2019_03_29_196257_create_course_teacher_student_table', 13),
(60, '2019_03_29_205542_fill_permissions_for_course-teacher-student', 13),
(61, '2019_04_17_192302_fill_permissions_for_teacher-role', 13),
(62, '2019_04_17_192616_fill_permissions_for_teacher-course', 13),
(63, '2019_04_17_200116_fill_permissions_for_point-type', 13),
(64, '2019_04_17_200207_fill_permissions_for_point-config', 13),
(65, '2019_04_1_196257_create_teacher_role_table', 13),
(66, '2019_04_1_197257_create_teacher_course_table', 13),
(67, '2019_04_2_197257_create_point_type_table', 13),
(68, '2019_04_3_197257_create_point_config_table', 13),
(69, '2019_04_4_188267_create_awqaf_table', 14),
(70, '2019_04_4_189267_create_awqaf_student_table', 14),
(71, '2019_04_4_189387_create_mark_table', 14),
(72, '2019_04_4_199397_create_student_note_table', 14),
(73, '2019_04_4_209397_create_student_attendance_table', 14),
(74, '2019_04_4_209897_create_student_point_table', 14),
(75, '2019_04_25_162831_fill_permissions_for_awqaf', 15),
(76, '2019_04_25_162836_fill_permissions_for_awqaf-student', 16),
(77, '2019_04_25_162846_fill_permissions_for_mark', 17),
(78, '2019_04_25_162857_fill_permissions_for_student-note', 18),
(79, '2019_04_25_162915_fill_permissions_for_student-attendance', 19),
(80, '2019_04_25_162930_fill_permissions_for_student-point', 20),
(81, '2019_04_28_209897_create_listened_subject_table', 21),
(82, '2019_05_03_204513_fill_permissions_for_listened-subject', 22);

-- --------------------------------------------------------

--
-- Table structure for table `model_has_permissions`
--

CREATE TABLE `model_has_permissions` (
  `permission_id` int(10) UNSIGNED NOT NULL,
  `model_type` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `model_id` bigint(20) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `model_has_roles`
--

CREATE TABLE `model_has_roles` (
  `role_id` int(10) UNSIGNED NOT NULL,
  `model_type` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `model_id` bigint(20) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `model_has_roles`
--

INSERT INTO `model_has_roles` (`role_id`, `model_type`, `model_id`) VALUES
(1, 'Brackets\\AdminAuth\\Models\\AdminUser', 1);

-- --------------------------------------------------------

--
-- Table structure for table `page`
--

CREATE TABLE `page` (
  `id` int(11) NOT NULL,
  `page_name` int(11) NOT NULL,
  `surah_id` int(11) NOT NULL,
  `juza_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `page`
--

INSERT INTO `page` (`id`, `page_name`, `surah_id`, `juza_id`) VALUES
(1, 1, 1, 1),
(2, 2, 1, 1),
(3, 3, 1, 1);

-- --------------------------------------------------------

--
-- Table structure for table `permissions`
--

CREATE TABLE `permissions` (
  `id` int(10) UNSIGNED NOT NULL,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `guard_name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `permissions`
--

INSERT INTO `permissions` (`id`, `name`, `guard_name`, `created_at`, `updated_at`) VALUES
(1, 'admin', 'admin', '2019-04-17 17:05:39', '2019-04-17 17:05:39'),
(2, 'admin.translation.index', 'admin', '2019-04-17 17:05:39', '2019-04-17 17:05:39'),
(3, 'admin.translation.edit', 'admin', '2019-04-17 17:05:39', '2019-04-17 17:05:39'),
(4, 'admin.translation.rescan', 'admin', '2019-04-17 17:05:39', '2019-04-17 17:05:39'),
(5, 'admin.admin-user.index', 'admin', '2019-04-17 17:05:39', '2019-04-17 17:05:39'),
(6, 'admin.admin-user.create', 'admin', '2019-04-17 17:05:39', '2019-04-17 17:05:39'),
(7, 'admin.admin-user.edit', 'admin', '2019-04-17 17:05:39', '2019-04-17 17:05:39'),
(8, 'admin.admin-user.delete', 'admin', '2019-04-17 17:05:39', '2019-04-17 17:05:39'),
(9, 'admin.upload', 'admin', '2019-04-17 17:05:39', '2019-04-17 17:05:39'),
(10, 'admin.course', 'admin', '2019-04-17 17:05:40', '2019-04-17 17:05:40'),
(11, 'admin.course.index', 'admin', '2019-04-17 17:05:40', '2019-04-17 17:05:40'),
(12, 'admin.course.create', 'admin', '2019-04-17 17:05:40', '2019-04-17 17:05:40'),
(13, 'admin.course.show', 'admin', '2019-04-17 17:05:40', '2019-04-17 17:05:40'),
(14, 'admin.course.edit', 'admin', '2019-04-17 17:05:40', '2019-04-17 17:05:40'),
(15, 'admin.course.delete', 'admin', '2019-04-17 17:05:40', '2019-04-17 17:05:40'),
(16, 'admin.exam', 'admin', '2019-04-17 17:05:40', '2019-04-17 17:05:40'),
(17, 'admin.exam.index', 'admin', '2019-04-17 17:05:40', '2019-04-17 17:05:40'),
(18, 'admin.exam.create', 'admin', '2019-04-17 17:05:40', '2019-04-17 17:05:40'),
(19, 'admin.exam.show', 'admin', '2019-04-17 17:05:40', '2019-04-17 17:05:40'),
(20, 'admin.exam.edit', 'admin', '2019-04-17 17:05:40', '2019-04-17 17:05:40'),
(21, 'admin.exam.delete', 'admin', '2019-04-17 17:05:40', '2019-04-17 17:05:40'),
(22, 'admin.semester', 'admin', '2019-04-17 17:05:40', '2019-04-17 17:05:40'),
(23, 'admin.semester.index', 'admin', '2019-04-17 17:05:40', '2019-04-17 17:05:40'),
(24, 'admin.semester.create', 'admin', '2019-04-17 17:05:40', '2019-04-17 17:05:40'),
(25, 'admin.semester.show', 'admin', '2019-04-17 17:05:40', '2019-04-17 17:05:40'),
(26, 'admin.semester.edit', 'admin', '2019-04-17 17:05:40', '2019-04-17 17:05:40'),
(27, 'admin.semester.delete', 'admin', '2019-04-17 17:05:40', '2019-04-17 17:05:40'),
(28, 'admin.student', 'admin', '2019-04-17 17:05:40', '2019-04-17 17:05:40'),
(29, 'admin.student.index', 'admin', '2019-04-17 17:05:40', '2019-04-17 17:05:40'),
(30, 'admin.student.create', 'admin', '2019-04-17 17:05:40', '2019-04-17 17:05:40'),
(31, 'admin.student.show', 'admin', '2019-04-17 17:05:40', '2019-04-17 17:05:40'),
(32, 'admin.student.edit', 'admin', '2019-04-17 17:05:40', '2019-04-17 17:05:40'),
(33, 'admin.student.delete', 'admin', '2019-04-17 17:05:40', '2019-04-17 17:05:40'),
(34, 'admin.teacher', 'admin', '2019-04-17 17:05:40', '2019-04-17 17:05:40'),
(35, 'admin.teacher.index', 'admin', '2019-04-17 17:05:40', '2019-04-17 17:05:40'),
(36, 'admin.teacher.create', 'admin', '2019-04-17 17:05:40', '2019-04-17 17:05:40'),
(37, 'admin.teacher.show', 'admin', '2019-04-17 17:05:40', '2019-04-17 17:05:40'),
(38, 'admin.teacher.edit', 'admin', '2019-04-17 17:05:40', '2019-04-17 17:05:40'),
(39, 'admin.teacher.delete', 'admin', '2019-04-17 17:05:40', '2019-04-17 17:05:40'),
(40, 'admin.student-class', 'admin', '2019-04-17 17:05:40', '2019-04-17 17:05:40'),
(41, 'admin.student-class.index', 'admin', '2019-04-17 17:05:40', '2019-04-17 17:05:40'),
(42, 'admin.student-class.create', 'admin', '2019-04-17 17:05:40', '2019-04-17 17:05:40'),
(43, 'admin.student-class.show', 'admin', '2019-04-17 17:05:40', '2019-04-17 17:05:40'),
(44, 'admin.student-class.edit', 'admin', '2019-04-17 17:05:40', '2019-04-17 17:05:40'),
(45, 'admin.student-class.delete', 'admin', '2019-04-17 17:05:40', '2019-04-17 17:05:40'),
(46, 'admin.course-student', 'admin', '2019-04-17 17:05:40', '2019-04-17 17:05:40'),
(47, 'admin.course-student.index', 'admin', '2019-04-17 17:05:40', '2019-04-17 17:05:40'),
(48, 'admin.course-student.create', 'admin', '2019-04-17 17:05:40', '2019-04-17 17:05:40'),
(49, 'admin.course-student.show', 'admin', '2019-04-17 17:05:40', '2019-04-17 17:05:40'),
(50, 'admin.course-student.edit', 'admin', '2019-04-17 17:05:40', '2019-04-17 17:05:40'),
(51, 'admin.course-student.delete', 'admin', '2019-04-17 17:05:40', '2019-04-17 17:05:40'),
(52, 'admin.teacher-role', 'admin', '2019-04-17 17:05:40', '2019-04-17 17:05:40'),
(53, 'admin.teacher-role.index', 'admin', '2019-04-17 17:05:40', '2019-04-17 17:05:40'),
(54, 'admin.teacher-role.create', 'admin', '2019-04-17 17:05:40', '2019-04-17 17:05:40'),
(55, 'admin.teacher-role.show', 'admin', '2019-04-17 17:05:40', '2019-04-17 17:05:40'),
(56, 'admin.teacher-role.edit', 'admin', '2019-04-17 17:05:40', '2019-04-17 17:05:40'),
(57, 'admin.teacher-role.delete', 'admin', '2019-04-17 17:05:40', '2019-04-17 17:05:40'),
(58, 'admin.teacher-course', 'admin', '2019-04-17 17:05:40', '2019-04-17 17:05:40'),
(59, 'admin.teacher-course.index', 'admin', '2019-04-17 17:05:40', '2019-04-17 17:05:40'),
(60, 'admin.teacher-course.create', 'admin', '2019-04-17 17:05:40', '2019-04-17 17:05:40'),
(61, 'admin.teacher-course.show', 'admin', '2019-04-17 17:05:40', '2019-04-17 17:05:40'),
(62, 'admin.teacher-course.edit', 'admin', '2019-04-17 17:05:40', '2019-04-17 17:05:40'),
(63, 'admin.teacher-course.delete', 'admin', '2019-04-17 17:05:40', '2019-04-17 17:05:40'),
(64, 'admin.point-type', 'admin', '2019-04-17 17:05:40', '2019-04-17 17:05:40'),
(65, 'admin.point-type.index', 'admin', '2019-04-17 17:05:40', '2019-04-17 17:05:40'),
(66, 'admin.point-type.create', 'admin', '2019-04-17 17:05:40', '2019-04-17 17:05:40'),
(67, 'admin.point-type.show', 'admin', '2019-04-17 17:05:40', '2019-04-17 17:05:40'),
(68, 'admin.point-type.edit', 'admin', '2019-04-17 17:05:40', '2019-04-17 17:05:40'),
(69, 'admin.point-type.delete', 'admin', '2019-04-17 17:05:40', '2019-04-17 17:05:40'),
(70, 'admin.point-config', 'admin', '2019-04-17 17:05:40', '2019-04-17 17:05:40'),
(71, 'admin.point-config.index', 'admin', '2019-04-17 17:05:40', '2019-04-17 17:05:40'),
(72, 'admin.point-config.create', 'admin', '2019-04-17 17:05:40', '2019-04-17 17:05:40'),
(73, 'admin.point-config.show', 'admin', '2019-04-17 17:05:40', '2019-04-17 17:05:40'),
(74, 'admin.point-config.edit', 'admin', '2019-04-17 17:05:40', '2019-04-17 17:05:40'),
(75, 'admin.point-config.delete', 'admin', '2019-04-17 17:05:40', '2019-04-17 17:05:40'),
(76, 'admin.awqaf', 'admin', '2019-04-25 13:28:33', '2019-04-25 13:28:33'),
(77, 'admin.awqaf.index', 'admin', '2019-04-25 13:28:33', '2019-04-25 13:28:33'),
(78, 'admin.awqaf.create', 'admin', '2019-04-25 13:28:33', '2019-04-25 13:28:33'),
(79, 'admin.awqaf.show', 'admin', '2019-04-25 13:28:33', '2019-04-25 13:28:33'),
(80, 'admin.awqaf.edit', 'admin', '2019-04-25 13:28:33', '2019-04-25 13:28:33'),
(81, 'admin.awqaf.delete', 'admin', '2019-04-25 13:28:33', '2019-04-25 13:28:33'),
(82, 'admin.awqaf-student', 'admin', '2019-04-25 13:28:42', '2019-04-25 13:28:42'),
(83, 'admin.awqaf-student.index', 'admin', '2019-04-25 13:28:42', '2019-04-25 13:28:42'),
(84, 'admin.awqaf-student.create', 'admin', '2019-04-25 13:28:42', '2019-04-25 13:28:42'),
(85, 'admin.awqaf-student.show', 'admin', '2019-04-25 13:28:42', '2019-04-25 13:28:42'),
(86, 'admin.awqaf-student.edit', 'admin', '2019-04-25 13:28:42', '2019-04-25 13:28:42'),
(87, 'admin.awqaf-student.delete', 'admin', '2019-04-25 13:28:42', '2019-04-25 13:28:42'),
(88, 'admin.mark', 'admin', '2019-04-25 13:28:48', '2019-04-25 13:28:48'),
(89, 'admin.mark.index', 'admin', '2019-04-25 13:28:48', '2019-04-25 13:28:48'),
(90, 'admin.mark.create', 'admin', '2019-04-25 13:28:48', '2019-04-25 13:28:48'),
(91, 'admin.mark.show', 'admin', '2019-04-25 13:28:48', '2019-04-25 13:28:48'),
(92, 'admin.mark.edit', 'admin', '2019-04-25 13:28:48', '2019-04-25 13:28:48'),
(93, 'admin.mark.delete', 'admin', '2019-04-25 13:28:48', '2019-04-25 13:28:48'),
(94, 'admin.student-note', 'admin', '2019-04-25 13:28:59', '2019-04-25 13:28:59'),
(95, 'admin.student-note.index', 'admin', '2019-04-25 13:28:59', '2019-04-25 13:28:59'),
(96, 'admin.student-note.create', 'admin', '2019-04-25 13:28:59', '2019-04-25 13:28:59'),
(97, 'admin.student-note.show', 'admin', '2019-04-25 13:28:59', '2019-04-25 13:28:59'),
(98, 'admin.student-note.edit', 'admin', '2019-04-25 13:28:59', '2019-04-25 13:28:59'),
(99, 'admin.student-note.delete', 'admin', '2019-04-25 13:28:59', '2019-04-25 13:28:59'),
(100, 'admin.student-attendance', 'admin', '2019-04-25 13:29:17', '2019-04-25 13:29:17'),
(101, 'admin.student-attendance.index', 'admin', '2019-04-25 13:29:17', '2019-04-25 13:29:17'),
(102, 'admin.student-attendance.create', 'admin', '2019-04-25 13:29:17', '2019-04-25 13:29:17'),
(103, 'admin.student-attendance.show', 'admin', '2019-04-25 13:29:17', '2019-04-25 13:29:17'),
(104, 'admin.student-attendance.edit', 'admin', '2019-04-25 13:29:17', '2019-04-25 13:29:17'),
(105, 'admin.student-attendance.delete', 'admin', '2019-04-25 13:29:17', '2019-04-25 13:29:17'),
(106, 'admin.student-point', 'admin', '2019-04-25 13:29:32', '2019-04-25 13:29:32'),
(107, 'admin.student-point.index', 'admin', '2019-04-25 13:29:32', '2019-04-25 13:29:32'),
(108, 'admin.student-point.create', 'admin', '2019-04-25 13:29:32', '2019-04-25 13:29:32'),
(109, 'admin.student-point.show', 'admin', '2019-04-25 13:29:32', '2019-04-25 13:29:32'),
(110, 'admin.student-point.edit', 'admin', '2019-04-25 13:29:32', '2019-04-25 13:29:32'),
(111, 'admin.student-point.delete', 'admin', '2019-04-25 13:29:32', '2019-04-25 13:29:32'),
(112, 'admin.listened-subject', 'admin', '2019-05-03 17:45:15', '2019-05-03 17:45:15'),
(113, 'admin.listened-subject.index', 'admin', '2019-05-03 17:45:15', '2019-05-03 17:45:15'),
(114, 'admin.listened-subject.create', 'admin', '2019-05-03 17:45:15', '2019-05-03 17:45:15'),
(115, 'admin.listened-subject.show', 'admin', '2019-05-03 17:45:15', '2019-05-03 17:45:15'),
(116, 'admin.listened-subject.edit', 'admin', '2019-05-03 17:45:15', '2019-05-03 17:45:15'),
(117, 'admin.listened-subject.delete', 'admin', '2019-05-03 17:45:15', '2019-05-03 17:45:15');

-- --------------------------------------------------------

--
-- Table structure for table `point_configs`
--

CREATE TABLE `point_configs` (
  `id` int(10) UNSIGNED NOT NULL,
  `point_type_id` int(11) NOT NULL,
  `point_name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `point_value` int(10) NOT NULL,
  `notes` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `point_configs`
--

INSERT INTO `point_configs` (`id`, `point_type_id`, `point_name`, `point_value`, `notes`, `created_at`, `updated_at`) VALUES
(1, 1, 'quran', 5, '1545asdasda', '2019-04-22 15:15:14', '2019-04-22 15:15:14'),
(2, 1, 'sss', 1, 'asdas', '2019-04-22 15:20:41', '2019-04-22 15:20:41'),
(3, 2, 'تسميع سورة نصف صفحة من جزء عم', 3, 'نصف الصفحة', '2019-04-25 16:35:25', '2019-06-14 09:11:37'),
(4, 2, 'تسميع سورة قصيرة من جزء عم', 2, 'ثلث صفحة', '2019-04-25 16:35:54', '2019-06-14 09:10:59'),
(5, 2, 'تسميع سورة طويلة من جزء عم', 9, 'أكثر من صفحة', '2019-04-25 16:36:18', '2019-06-14 09:10:32'),
(6, 3, 'حضور الطالب على الوقت', 5, 'حضر منذ بداية الحصة', '2019-04-25 16:37:03', '2019-04-25 16:37:03'),
(7, 3, 'حضور متأخر', 2, 'حضر قبل نهاية الدرس', '2019-04-25 16:37:25', '2019-04-25 16:37:25'),
(8, 4, 'هدوء في الحصة', 3, '', NULL, NULL),
(9, 4, 'مشاغبة في الحصة', -2, '', NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `point_types`
--

CREATE TABLE `point_types` (
  `id` int(10) UNSIGNED NOT NULL,
  `type_name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `notes` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `point_types`
--

INSERT INTO `point_types` (`id`, `type_name`, `notes`, `created_at`, `updated_at`) VALUES
(2, 'القرآن الكريم', 'نقاط القرآن الكريم', '2019-04-25 16:34:52', '2019-04-25 16:34:52'),
(3, 'الدوام', 'الالتزام بالحضور', '2019-04-25 16:36:38', '2019-04-25 16:36:38'),
(4, 'السلوك', '', NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `roles`
--

CREATE TABLE `roles` (
  `id` int(10) UNSIGNED NOT NULL,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `guard_name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `roles`
--

INSERT INTO `roles` (`id`, `name`, `guard_name`, `created_at`, `updated_at`) VALUES
(1, 'Administrator', 'admin', '2019-04-17 17:05:39', '2019-04-17 17:05:39');

-- --------------------------------------------------------

--
-- Table structure for table `role_has_permissions`
--

CREATE TABLE `role_has_permissions` (
  `permission_id` int(10) UNSIGNED NOT NULL,
  `role_id` int(10) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `role_has_permissions`
--

INSERT INTO `role_has_permissions` (`permission_id`, `role_id`) VALUES
(1, 1),
(2, 1),
(3, 1),
(4, 1),
(5, 1),
(6, 1),
(7, 1),
(8, 1),
(9, 1),
(10, 1),
(11, 1),
(12, 1),
(13, 1),
(14, 1),
(15, 1),
(16, 1),
(17, 1),
(18, 1),
(19, 1),
(20, 1),
(21, 1),
(22, 1),
(23, 1),
(24, 1),
(25, 1),
(26, 1),
(27, 1),
(28, 1),
(29, 1),
(30, 1),
(31, 1),
(32, 1),
(33, 1),
(34, 1),
(35, 1),
(36, 1),
(37, 1),
(38, 1),
(39, 1),
(40, 1),
(41, 1),
(42, 1),
(43, 1),
(44, 1),
(45, 1),
(46, 1),
(47, 1),
(48, 1),
(49, 1),
(50, 1),
(51, 1),
(52, 1),
(53, 1),
(54, 1),
(55, 1),
(56, 1),
(57, 1),
(58, 1),
(59, 1),
(60, 1),
(61, 1),
(62, 1),
(63, 1),
(64, 1),
(65, 1),
(66, 1),
(67, 1),
(68, 1),
(69, 1),
(70, 1),
(71, 1),
(72, 1),
(73, 1),
(74, 1),
(75, 1),
(76, 1),
(77, 1),
(78, 1),
(79, 1),
(80, 1),
(81, 1),
(82, 1),
(83, 1),
(84, 1),
(85, 1),
(86, 1),
(87, 1),
(88, 1),
(89, 1),
(90, 1),
(91, 1),
(92, 1),
(93, 1),
(94, 1),
(95, 1),
(96, 1),
(97, 1),
(98, 1),
(99, 1),
(100, 1),
(101, 1),
(102, 1),
(103, 1),
(104, 1),
(105, 1),
(106, 1),
(107, 1),
(108, 1),
(109, 1),
(110, 1),
(111, 1),
(112, 1),
(113, 1),
(114, 1),
(115, 1),
(116, 1),
(117, 1);

-- --------------------------------------------------------

--
-- Table structure for table `semesters`
--

CREATE TABLE `semesters` (
  `id` int(10) UNSIGNED NOT NULL,
  `semester_name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `description` text COLLATE utf8mb4_unicode_ci,
  `started_at` date DEFAULT NULL,
  `end_at` date DEFAULT NULL,
  `enabled` tinyint(1) NOT NULL DEFAULT '1',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `semesters`
--

INSERT INTO `semesters` (`id`, `semester_name`, `description`, `started_at`, `end_at`, `enabled`, `created_at`, `updated_at`) VALUES
(2, 'خريف 2017', 'تجربة 1', '2019-06-02', '2019-06-30', 0, '2019-04-25 16:23:53', '2019-06-30 14:51:59'),
(3, 'صيف 2018', 'تجربة2', NULL, NULL, 0, '2019-04-25 16:24:07', '2019-05-03 09:41:55'),
(5, 'صيف 2019', NULL, '2019-06-02', '2019-08-31', 1, '2019-06-30 14:52:38', '2019-06-30 16:13:23');

-- --------------------------------------------------------

--
-- Table structure for table `students`
--

CREATE TABLE `students` (
  `id` int(10) UNSIGNED NOT NULL,
  `student_fname` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `student_lname` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `student_father_name` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `student_address` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `student_father_job` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `student_nationality` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `father_phone` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `student_phone` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `home_phone` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `transportation` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `student_photo` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `note` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `status` tinyint(1) NOT NULL DEFAULT '1',
  `has_id` tinyint(1) NOT NULL DEFAULT '1',
  `student_birthdate` date DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `students`
--

INSERT INTO `students` (`id`, `student_fname`, `student_lname`, `student_father_name`, `student_address`, `student_father_job`, `student_nationality`, `father_phone`, `student_phone`, `home_phone`, `transportation`, `student_photo`, `note`, `status`, `has_id`, `student_birthdate`, `created_at`, `updated_at`) VALUES
(2, 'طالب 1', 'تجربة', 'والد الطالب', 'المهاجرين', 'مدرس', 'سوري', '0991647355', '0116347728', '0116347728', 'باص', 'يجب وضع صورة هنا!', 'طالب مو كتير نجيب', 1, 1, NULL, '2019-04-25 16:29:25', '2019-04-25 16:29:25'),
(3, 'طالب2', '', '', '', '', '', '', '', '', '', '', '', 1, 1, NULL, NULL, NULL),
(4, 'طالب3', '', '', '', '', '', '', '', '', '', '', '', 1, 1, NULL, NULL, NULL),
(5, 'طالب4', '', '', '', '', '', '', '', '', '', '', '', 1, 1, NULL, NULL, NULL),
(6, 'طالب5', '', '', '', '', '', '', '', '', '', '', '', 1, 1, NULL, NULL, NULL),
(7, 'طالب6', '', '', '', '', '', '', '', '', '', '', '', 1, 1, NULL, NULL, NULL),
(8, 'طالب7', '', '', '', '', '', '', '', '', '', '', '', 1, 1, NULL, NULL, NULL),
(9, 'we', 'we', 'we', 'iki', 't', NULL, '123', '456', NULL, NULL, 'defualt.jpg', NULL, 0, 0, '2019-06-04', '2019-06-12 00:53:05', '2019-06-12 00:53:05');

-- --------------------------------------------------------

--
-- Table structure for table `students_temp`
--

CREATE TABLE `students_temp` (
  `id` int(10) UNSIGNED NOT NULL,
  `student_fname` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `student_lname` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `student_father_name` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `student_address` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `student_father_job` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `student_nationality` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `father_phone` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `student_phone` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `home_phone` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `transportation` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `student_photo` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `note` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `status` tinyint(1) NOT NULL DEFAULT '1',
  `has_id` tinyint(1) NOT NULL DEFAULT '1',
  `student_birthdate` date DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `school_name` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `student_attendances`
--

CREATE TABLE `student_attendances` (
  `id` int(10) UNSIGNED NOT NULL,
  `student_id` int(11) NOT NULL,
  `student_course_id` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `is_late` tinyint(1) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `student_attendances`
--

INSERT INTO `student_attendances` (`id`, `student_id`, `student_course_id`, `is_late`, `created_at`, `updated_at`) VALUES
(1, 3, '6', 1, '2019-05-09 21:00:00', NULL),
(2, 2, '1', 0, '2019-05-28 21:00:00', NULL),
(3, 2, '5', 0, '2019-06-06 21:00:00', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `student_classes`
--

CREATE TABLE `student_classes` (
  `id` int(10) UNSIGNED NOT NULL,
  `class_name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `student_classes`
--

INSERT INTO `student_classes` (`id`, `class_name`, `created_at`, `updated_at`) VALUES
(1, 'dsfsd 1', NULL, NULL),
(2, 'الصف السابع 4', NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `student_notes`
--

CREATE TABLE `student_notes` (
  `id` int(10) UNSIGNED NOT NULL,
  `student_id` int(11) NOT NULL,
  `notes` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `student_notes`
--

INSERT INTO `student_notes` (`id`, `student_id`, `notes`, `created_at`, `updated_at`) VALUES
(2, 2, 'طالب مشاكس', NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `student_points`
--

CREATE TABLE `student_points` (
  `id` int(10) UNSIGNED NOT NULL,
  `student_id` int(11) NOT NULL,
  `point_id` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `student_points`
--

INSERT INTO `student_points` (`id`, `student_id`, `point_id`, `created_at`, `updated_at`) VALUES
(21, 1, '6', '2019-05-24 10:20:58', '2019-05-24 10:20:58'),
(22, 6, '6', '2019-05-24 10:20:58', '2019-05-24 10:20:58'),
(25, 1, '8', '2019-05-26 02:24:20', '2019-05-26 02:24:20'),
(26, 1, '9', '2019-05-26 02:28:42', '2019-05-26 02:28:42'),
(27, 1, '8', '2019-05-26 02:30:57', '2019-05-26 02:30:57'),
(28, 1, '8', '2019-05-26 02:34:35', '2019-05-26 02:34:35'),
(29, 1, '9', '2019-05-26 02:34:48', '2019-05-26 02:34:48'),
(30, 1, '8', '2019-05-26 02:35:07', '2019-05-26 02:35:07'),
(31, 1, '8', '2019-05-26 02:36:37', '2019-05-26 02:36:37'),
(32, 1, '8', '2019-05-26 02:36:41', '2019-05-26 02:36:41'),
(33, 1, '8', '2019-05-26 18:54:21', '2019-05-26 18:54:21'),
(34, 13, '4', NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `surah`
--

CREATE TABLE `surah` (
  `id` int(11) NOT NULL,
  `surah_name` varchar(200) NOT NULL,
  `surah_details` varchar(200) NOT NULL,
  `start_page_num` int(11) NOT NULL,
  `end_page_num` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `surah`
--

INSERT INTO `surah` (`id`, `surah_name`, `surah_details`, `start_page_num`, `end_page_num`) VALUES
(78, 'سورة عم', '', 582, 583),
(79, 'سورة النازعات', '', 583, 584),
(80, 'عبس', '', 585, 586),
(81, 'التكوير', '', 586, 587),
(82, 'سورة الانفطار', '', 587, 587),
(83, 'سورة المطففين', '', 587, 589),
(84, 'الانشقاق', '', 589, 590),
(85, 'البروج', '', 590, 591),
(86, 'الطارق', '', 591, 591),
(87, 'الأعلى', '', 591, 592),
(88, 'الغاشية', '', 592, 593),
(89, 'الفجر', '', 593, 594),
(90, 'البلد', '', 594, 595),
(91, 'الشمس', '', 595, 595),
(92, 'الليل', '', 595, 596),
(93, 'الضحى', '', 596, 596),
(94, 'الشرح', '', 596, 597),
(95, 'التين', '', 597, 597),
(96, 'العلق', '', 597, 598),
(97, 'القدر', '', 598, 598),
(98, 'البينة', '', 598, 599),
(99, 'الزلزلة', '', 599, 599),
(100, 'العاديات', '', 599, 600),
(101, 'القارعة', '', 600, 600),
(102, 'التكاثر', '', 600, 600),
(103, 'العصر', '', 601, 601),
(104, 'الهمزة', '', 601, 601),
(105, 'الفيل', '', 601, 601),
(106, 'قريش', '', 602, 602),
(107, 'الماعون', '', 602, 602),
(108, 'الكوثر', '', 602, 602),
(109, 'الكافرون', '', 603, 603),
(110, 'النصر', '', 603, 603),
(111, 'المسد', '', 603, 603),
(112, 'الاخلاص', '', 604, 604),
(113, 'الفلق', '', 604, 604),
(114, 'الناس', '', 604, 604);

-- --------------------------------------------------------

--
-- Table structure for table `teachers`
--

CREATE TABLE `teachers` (
  `id` int(10) UNSIGNED NOT NULL,
  `teacher_name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `teacher_address` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `teacher_study` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `teacher_speciality` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `teacher_work` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `teacher_extras` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `teacher_note` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `teacher_mobile` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `teacher_phone` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `birthdate` date DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `username` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `password` text COLLATE utf8mb4_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `teachers`
--

INSERT INTO `teachers` (`id`, `teacher_name`, `teacher_address`, `teacher_study`, `teacher_speciality`, `teacher_work`, `teacher_extras`, `teacher_note`, `teacher_mobile`, `teacher_phone`, `birthdate`, `created_at`, `updated_at`, `username`, `password`) VALUES
(2, 'أنس', 'عفيف', 'IT', 'تجربة', 'تجربة', 'تجربة', 'تجربة', '0991647355', '011634725288', NULL, '2019-04-25 16:31:06', '2019-04-25 16:31:06', '', ''),
(3, 'لؤي', 'قاسيون', 'IT', 'SE', 'SE', 'TT', 'N', '0991647355', '011', NULL, '2019-05-03 09:34:45', '2019-05-03 09:34:45', '', '');

-- --------------------------------------------------------

--
-- Table structure for table `teacher_courses`
--

CREATE TABLE `teacher_courses` (
  `id` int(10) UNSIGNED NOT NULL,
  `teacher_id` int(11) NOT NULL,
  `course_id` int(11) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `teacher_courses`
--

INSERT INTO `teacher_courses` (`id`, `teacher_id`, `course_id`, `created_at`, `updated_at`) VALUES
(3, 2, 2, '2019-04-25 16:41:49', '2019-04-25 16:41:49'),
(4, 3, 3, '2019-05-03 09:35:20', '2019-05-03 09:35:20'),
(5, 2, 6, '2019-06-30 14:54:39', '2019-06-30 14:54:39');

-- --------------------------------------------------------

--
-- Table structure for table `teacher_roles`
--

CREATE TABLE `teacher_roles` (
  `id` int(10) UNSIGNED NOT NULL,
  `role_name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `notes` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `teacher_roles`
--

INSERT INTO `teacher_roles` (`id`, `role_name`, `notes`, `created_at`, `updated_at`) VALUES
(2, 'مدرس', 'مسؤول عن الحصة', '2019-04-25 16:40:42', '2019-04-25 16:40:42'),
(3, 'مسمع', 'يسمع للطلاب', '2019-04-25 16:40:56', '2019-04-25 16:40:56');

-- --------------------------------------------------------

--
-- Table structure for table `translations`
--

CREATE TABLE `translations` (
  `id` int(10) UNSIGNED NOT NULL,
  `namespace` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT '*',
  `group` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `key` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `text` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `metadata` text COLLATE utf8mb4_unicode_ci,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `translations`
--

INSERT INTO `translations` (`id`, `namespace`, `group`, `key`, `text`, `metadata`, `created_at`, `updated_at`, `deleted_at`) VALUES
(1, 'brackets/admin-ui', 'admin', 'operation.succeeded', '{\"en\":\"\\u062a\\u0645\\u062a \\u0627\\u0644\\u0639\\u0645\\u0644\\u064a\\u0629 \\u0628\\u0646\\u062c\\u0627\\u062d\"}', NULL, '2019-04-25 13:32:44', '2019-06-14 08:47:31', NULL),
(2, '*', 'admin', 'awqaf-student.actions.create', '{\"en\":\"\\u0625\\u0646\\u0634\\u0627\\u0621\"}', NULL, '2019-04-25 13:32:44', '2019-06-14 08:47:31', NULL),
(3, 'brackets/admin-ui', 'admin', 'btn.save', '{\"en\":\"\\u062d\\u0641\\u0638\"}', NULL, '2019-04-25 13:32:44', '2019-06-14 08:47:31', NULL),
(4, '*', 'admin', 'awqaf-student.actions.edit', '{\"en\":\"\\u062a\\u0639\\u062f\\u064a\\u0644\"}', NULL, '2019-04-25 13:32:44', '2019-06-14 08:47:31', NULL),
(5, '*', 'admin', 'awqaf-student.actions.index', '{\"en\":\"\\u0637\\u0644\\u0627\\u0628 \\u0627\\u0644\\u0623\\u0648\\u0642\\u0627\\u0641\"}', NULL, '2019-04-25 13:32:44', '2019-06-14 08:47:31', NULL),
(6, 'brackets/admin-ui', 'admin', 'placeholder.search', '{\"en\":\"\\u0627\\u0644\\u0628\\u062d\\u062b\"}', NULL, '2019-04-25 13:32:44', '2019-06-14 08:47:31', NULL),
(7, 'brackets/admin-ui', 'admin', 'btn.search', '{\"en\":\"\\u0628\\u062d\\u062b\"}', NULL, '2019-04-25 13:32:44', '2019-06-14 08:47:31', NULL),
(8, 'brackets/admin-ui', 'admin', 'btn.edit', '{\"en\":\"\\u062a\\u0639\\u062f\\u064a\\u0644\"}', NULL, '2019-04-25 13:32:44', '2019-06-14 08:47:31', NULL),
(9, 'brackets/admin-ui', 'admin', 'btn.delete', '{\"en\":\"\\u062d\\u0630\\u0641\"}', NULL, '2019-04-25 13:32:44', '2019-06-14 08:47:31', NULL),
(10, 'brackets/admin-ui', 'admin', 'pagination.overview', '[]', NULL, '2019-04-25 13:32:44', '2019-06-14 08:47:31', NULL),
(11, 'brackets/admin-ui', 'admin', 'index.no_items', '[]', NULL, '2019-04-25 13:32:44', '2019-06-14 08:47:31', NULL),
(12, 'brackets/admin-ui', 'admin', 'index.try_changing_items', '[]', NULL, '2019-04-25 13:32:44', '2019-06-14 08:47:31', NULL),
(13, '*', 'admin', 'awqaf.columns.test_name', '{\"en\":\"\\u0627\\u0633\\u0645 \\u0627\\u0644\\u0641\\u062d\\u0635\"}', NULL, '2019-04-25 13:32:44', '2019-06-14 08:47:31', NULL),
(14, '*', 'admin', 'awqaf.columns.date', '{\"en\":\"\\u0627\\u0644\\u062a\\u0627\\u0631\\u064a\\u062e\"}', NULL, '2019-04-25 13:32:44', '2019-06-14 08:47:31', NULL),
(15, '*', 'admin', 'awqaf.columns.place', '{\"en\":\"\\u0627\\u0644\\u0645\\u0643\\u0627\\u0646\"}', NULL, '2019-04-25 13:32:44', '2019-06-14 08:47:31', NULL),
(16, '*', 'admin', 'awqaf.columns.tester_name', '{\"en\":\"tester_name\"}', NULL, '2019-04-25 13:32:44', '2019-06-14 08:47:31', NULL),
(17, '*', 'admin', 'awqaf.actions.create', '{\"en\":\"\\u0625\\u0646\\u0634\\u0627\\u0621\"}', NULL, '2019-04-25 13:32:44', '2019-06-14 08:47:31', NULL),
(18, '*', 'admin', 'awqaf.actions.edit', '{\"en\":\"\\u062a\\u0639\\u062f\\u064a\\u0644\"}', NULL, '2019-04-25 13:32:44', '2019-06-14 08:47:31', NULL),
(19, '*', 'admin', 'awqaf.actions.index', '{\"en\":\"\\u0627\\u0645\\u062a\\u062d\\u0627\\u0646\\u0627\\u062a \\u0627\\u0644\\u0623\\u0648\\u0642\\u0627\\u0641\"}', NULL, '2019-04-25 13:32:44', '2019-06-14 08:47:31', NULL),
(20, '*', 'admin', 'awqaf.columns.id', '{\"en\":\"id\"}', NULL, '2019-04-25 13:32:44', '2019-06-14 08:47:31', NULL),
(21, '*', 'admin', 'course-teacher-student.actions.create', '[]', NULL, '2019-04-25 13:32:44', '2019-05-02 16:38:16', '2019-05-02 16:38:16'),
(22, '*', 'admin', 'course-teacher-student.actions.edit', '[]', NULL, '2019-04-25 13:32:44', '2019-05-02 16:38:16', '2019-05-02 16:38:16'),
(23, '*', 'admin', 'course-student.actions.index', '{\"en\":\"\\u062d\\u0644\\u0642\\u0627\\u062a \\u0627\\u0644\\u0637\\u0644\\u0627\\u0628\"}', NULL, '2019-04-25 13:32:44', '2019-06-14 08:47:31', NULL),
(24, '*', 'admin', 'course-student.actions.create', '{\"en\":\"\\u0625\\u0636\\u0627\\u0641\\u0629 \\u0637\\u0627\\u0644\\u0628 \\u0644\\u062d\\u0644\\u0642\\u0629\"}', NULL, '2019-04-25 13:32:44', '2019-06-14 08:47:31', NULL),
(25, '*', 'admin', 'course.columns.semester_id', '{\"en\":\"semester_id\"}', NULL, '2019-04-25 13:32:44', '2019-06-14 08:47:31', NULL),
(26, '*', 'admin', 'course.columns.course_name', '{\"en\":\"\\u0627\\u0633\\u0645 \\u0627\\u0644\\u062d\\u0644\\u0642\\u0629\"}', NULL, '2019-04-25 13:32:44', '2019-06-14 08:47:31', NULL),
(27, '*', 'admin', 'course.columns.description', '{\"en\":\"\\u0627\\u0644\\u0648\\u0635\\u0641\"}', NULL, '2019-04-25 13:32:44', '2019-06-14 08:47:31', NULL),
(28, '*', 'admin', 'course.columns.started_at', '{\"en\":\"\\u062a\\u0628\\u062f\\u0623 \\u0628\\u062a\\u0627\\u0631\\u064a\\u062e\"}', NULL, '2019-04-25 13:32:44', '2019-06-14 08:47:31', NULL),
(29, 'brackets/admin-ui', 'admin', 'forms.select_a_date', '{\"en\":\"\\u0627\\u062e\\u062a\\u0631 \\u0627\\u0644\\u062a\\u0627\\u0631\\u064a\\u062e\"}', NULL, '2019-04-25 13:32:44', '2019-06-14 08:47:31', NULL),
(30, '*', 'admin', 'course.columns.end_at', '{\"en\":\"\\u062a\\u0646\\u062a\\u0647\\u064a \\u0628\\u062a\\u0627\\u0631\\u064a\\u062e\"}', NULL, '2019-04-25 13:32:44', '2019-06-14 08:47:31', NULL),
(31, '*', 'admin', 'course.columns.session_number', '{\"en\":\"\\u0639\\u062f\\u062f \\u0627\\u0644\\u062c\\u0644\\u0633\\u0627\\u062a\"}', NULL, '2019-04-25 13:32:44', '2019-06-14 08:47:31', NULL),
(32, '*', 'admin', 'course.columns.enabled', '{\"en\":\"\\u0627\\u0644\\u062a\\u0641\\u0639\\u064a\\u0644\"}', NULL, '2019-04-25 13:32:44', '2019-06-14 08:47:31', NULL),
(33, '*', 'admin', 'course.actions.create', '{\"en\":\"\\u062d\\u0644\\u0642\\u0629 \\u062c\\u062f\\u064a\\u062f\\u0629\"}', NULL, '2019-04-25 13:32:44', '2019-06-14 08:47:31', NULL),
(34, '*', 'admin', 'course.actions.edit', '{\"en\":\"\\u062a\\u0639\\u062f\\u064a\\u0644 :name\"}', NULL, '2019-04-25 13:32:44', '2019-06-14 08:47:31', NULL),
(35, '*', 'admin', 'course.actions.index', '{\"en\":\"\\u0627\\u0644\\u062d\\u0644\\u0642\\u0629\"}', NULL, '2019-04-25 13:32:44', '2019-06-14 08:47:31', NULL),
(36, '*', 'admin', 'course.columns.id', '[]', NULL, '2019-04-25 13:32:44', '2019-06-14 08:47:31', NULL),
(37, '*', 'admin', 'exam.columns.course_id', '{\"en\":\"\\u0627\\u0644\\u062d\\u0644\\u0642\\u0629\"}', NULL, '2019-04-25 13:32:44', '2019-06-14 08:47:31', NULL),
(38, '*', 'admin', 'exam.columns.exam_name', '{\"en\":\"\\u0627\\u0633\\u0645 \\u0627\\u0644\\u0627\\u0645\\u062a\\u062d\\u0627\\u0646\"}', NULL, '2019-04-25 13:32:44', '2019-06-14 08:47:31', NULL),
(39, '*', 'admin', 'exam.columns.exam_max_num', '{\"en\":\"\\u0627\\u0644\\u0639\\u0644\\u0627\\u0645\\u0629 \\u0627\\u0644\\u0639\\u0638\\u0645\\u0649\"}', NULL, '2019-04-25 13:32:44', '2019-06-14 08:47:31', NULL),
(40, '*', 'admin', 'exam.columns.exam_min_num', '{\"en\":\"\\u0627\\u0644\\u0639\\u0644\\u0627\\u0645\\u0629 \\u0627\\u0644\\u062f\\u0646\\u064a\\u0627\"}', NULL, '2019-04-25 13:32:44', '2019-06-14 08:47:31', NULL),
(41, '*', 'admin', 'exam.actions.create', '{\"en\":\"\\u0625\\u0646\\u0634\\u0627\\u0621 \\u0627\\u0645\\u062a\\u062d\\u0627\\u0646\"}', NULL, '2019-04-25 13:32:44', '2019-06-14 08:47:31', NULL),
(42, '*', 'admin', 'exam.actions.edit', '{\"en\":\"\\u062a\\u0639\\u062f\\u064a\\u0644 :name\"}', NULL, '2019-04-25 13:32:44', '2019-06-14 08:47:31', NULL),
(43, '*', 'admin', 'exam.actions.index', '{\"en\":\"\\u0627\\u0644\\u0627\\u0645\\u062a\\u062d\\u0627\\u0646\"}', NULL, '2019-04-25 13:32:44', '2019-06-14 08:47:31', NULL),
(44, '*', 'admin', 'exam.columns.id', '[]', NULL, '2019-04-25 13:32:44', '2019-06-14 08:47:31', NULL),
(45, 'brackets/admin-ui', 'admin', 'profile_dropdown.account', '{\"en\":\"\\u0627\\u0644\\u062d\\u0633\\u0627\\u0628\"}', NULL, '2019-04-25 13:32:44', '2019-06-14 08:47:31', NULL),
(46, 'brackets/admin-auth', 'admin', 'profile_dropdown.logout', '{\"en\":\"\\u062a\\u0633\\u062c\\u064a\\u0644 \\u0627\\u0644\\u062e\\u0631\\u0648\\u062c\"}', NULL, '2019-04-25 13:32:44', '2019-06-14 08:47:31', NULL),
(47, 'brackets/admin-ui', 'admin', 'sidebar.content', '{\"en\":\"\\u0627\\u0644\\u0639\\u0645\\u0644\\u064a\\u0627\\u062a\"}', NULL, '2019-04-25 13:32:44', '2019-06-14 08:47:31', NULL),
(48, '*', 'admin', 'course.title', '{\"en\":\"\\u0627\\u0644\\u062d\\u0644\\u0642\\u0629\"}', NULL, '2019-04-25 13:32:44', '2019-06-14 08:47:31', NULL),
(49, '*', 'admin', 'exam.title', '{\"en\":\"\\u0627\\u0644\\u0627\\u0645\\u062a\\u062d\\u0627\\u0646\"}', NULL, '2019-04-25 13:32:44', '2019-06-14 08:47:31', NULL),
(50, '*', 'admin', 'semester.title', '{\"en\":\"\\u0627\\u0644\\u0641\\u0635\\u0644\"}', NULL, '2019-04-25 13:32:44', '2019-06-14 08:47:31', NULL),
(51, '*', 'admin', 'student.title', '{\"en\":\"\\u0627\\u0644\\u0637\\u0627\\u0644\\u0628\"}', NULL, '2019-04-25 13:32:44', '2019-06-14 08:47:31', NULL),
(52, '*', 'admin', 'teacher.title', '{\"en\":\"\\u0627\\u0644\\u0623\\u0633\\u062a\\u0627\\u0630\"}', NULL, '2019-04-25 13:32:44', '2019-06-14 08:47:31', NULL),
(53, '*', 'admin', 'student-class.title', '{\"en\":\"\\u0635\\u0641\\u0648\\u0641 \\u0627\\u0644\\u0637\\u0644\\u0627\\u0628\"}', NULL, '2019-04-25 13:32:44', '2019-06-14 08:47:31', NULL),
(54, '*', 'admin', 'course-student.title', '{\"en\":\"\\u0637\\u0644\\u0627\\u0628 \\u0627\\u0644\\u062d\\u0644\\u0642\\u0627\\u062a\"}', NULL, '2019-04-25 13:32:44', '2019-06-14 08:47:31', NULL),
(55, '*', 'admin', 'teacher-role.title', '{\"en\":\"\\u0645\\u0647\\u0645\\u0627\\u062a \\u0627\\u0644\\u0623\\u0633\\u0627\\u062a\\u0630\\u0629\"}', NULL, '2019-04-25 13:32:44', '2019-06-14 08:47:31', NULL),
(56, '*', 'admin', 'teacher-course.title', '{\"en\":\"\\u0627\\u0644\\u062d\\u0644\\u0642\\u0627\\u062a \\u0648\\u0627\\u0644\\u0623\\u0633\\u0627\\u062a\\u0630\\u0629\"}', NULL, '2019-04-25 13:32:44', '2019-06-14 08:47:31', NULL),
(57, '*', 'admin', 'point-type.title', '{\"en\":\"\\u0623\\u0646\\u0648\\u0627\\u0639 \\u0627\\u0644\\u0646\\u0642\\u0627\\u0637\"}', NULL, '2019-04-25 13:32:44', '2019-06-14 08:47:31', NULL),
(58, '*', 'admin', 'point-config.title', '{\"en\":\"\\u0627\\u0644\\u0646\\u0642\\u0627\\u0637\"}', NULL, '2019-04-25 13:32:44', '2019-06-14 08:47:31', NULL),
(59, '*', 'admin', 'awqaf.title', '{\"en\":\"\\u0627\\u0644\\u0623\\u0648\\u0642\\u0627\\u0641\"}', NULL, '2019-04-25 13:32:44', '2019-06-14 08:47:31', NULL),
(60, '*', 'admin', 'awqaf-student.title', '{\"en\":\"\\u0637\\u0644\\u0627\\u0628 \\u0627\\u0644\\u0623\\u0648\\u0642\\u0627\\u0641\"}', NULL, '2019-04-25 13:32:44', '2019-06-14 08:47:31', NULL),
(61, '*', 'admin', 'mark.title', '{\"en\":\"\\u0627\\u0644\\u0639\\u0644\\u0627\\u0645\\u0627\\u062a\"}', NULL, '2019-04-25 13:32:44', '2019-06-14 08:47:31', NULL),
(62, '*', 'admin', 'student-note.title', '{\"en\":\"\\u0645\\u0644\\u0627\\u062d\\u0638\\u0627\\u062a \\u062d\\u0648\\u0644 \\u0627\\u0644\\u0637\\u0644\\u0627\\u0628\"}', NULL, '2019-04-25 13:32:44', '2019-06-14 08:47:31', NULL),
(63, '*', 'admin', 'student-attendance.title', '{\"en\":\"\\u062d\\u0636\\u0648\\u0631 \\u0627\\u0644\\u0637\\u0644\\u0627\\u0628\"}', NULL, '2019-04-25 13:32:44', '2019-06-14 08:47:31', NULL),
(64, '*', 'admin', 'student-point.title', '{\"en\":\"\\u0646\\u0642\\u0627\\u0637 \\u0627\\u0644\\u0637\\u0644\\u0627\\u0628\"}', NULL, '2019-04-25 13:32:44', '2019-06-14 08:47:31', NULL),
(65, 'brackets/admin-ui', 'admin', 'sidebar.settings', '{\"en\":\"\\u0627\\u0644\\u0627\\u0639\\u062f\\u0627\\u062f\\u0627\\u062a\"}', NULL, '2019-04-25 13:32:44', '2019-06-14 08:47:31', NULL),
(66, '*', 'admin', 'mark.actions.create', '{\"en\":\"\\u0625\\u0646\\u0634\\u0627\\u0621\"}', NULL, '2019-04-25 13:32:44', '2019-06-14 08:47:31', NULL),
(67, '*', 'admin', 'mark.actions.edit', '{\"en\":\"\\u062a\\u0639\\u062f\\u064a\\u0644\"}', NULL, '2019-04-25 13:32:44', '2019-06-14 08:47:31', NULL),
(68, '*', 'admin', 'mark.actions.index', '{\"en\":\"\\u0627\\u0644\\u0627\\u0645\\u062a\\u062d\\u0627\\u0646\\u0627\\u062a\"}', NULL, '2019-04-25 13:32:44', '2019-06-14 08:47:31', NULL),
(69, '*', 'admin', 'point-config.columns.point_type_id', '{\"en\":\"\\u0646\\u0648\\u0639 \\u0627\\u0644\\u0646\\u0642\\u0627\\u0637\"}', NULL, '2019-04-25 13:32:44', '2019-06-14 08:47:31', NULL),
(70, '*', 'admin', 'point-config.columns.point_name', '{\"en\":\"\\u0627\\u0633\\u0645 \\u0627\\u0644\\u0646\\u0642\\u0627\\u0637\"}', NULL, '2019-04-25 13:32:44', '2019-06-14 08:47:31', NULL),
(71, '*', 'admin', 'point-config.columns.point_value', '{\"en\":\"\\u0642\\u064a\\u0645\\u0629 \\u0627\\u0644\\u0646\\u0642\\u0627\\u0637\"}', NULL, '2019-04-25 13:32:44', '2019-06-14 08:47:31', NULL),
(72, '*', 'admin', 'point-config.columns.notes', '{\"en\":\"\\u0645\\u0644\\u0627\\u062d\\u0638\\u0627\\u062a\"}', NULL, '2019-04-25 13:32:44', '2019-06-14 08:47:31', NULL),
(73, '*', 'admin', 'point-config.actions.create', '{\"en\":\"\\u0625\\u0636\\u0627\\u0641\\u0629 \\u0646\\u0642\\u0627\\u0637\"}', NULL, '2019-04-25 13:32:44', '2019-06-14 08:47:31', NULL),
(74, '*', 'admin', 'point-config.actions.edit', '{\"en\":\"\\u062a\\u0639\\u062f\\u064a\\u0644 :name\"}', NULL, '2019-04-25 13:32:44', '2019-06-14 08:47:31', NULL),
(75, '*', 'admin', 'point-config.actions.index', '{\"en\":\"\\u0627\\u0644\\u0646\\u0642\\u0627\\u0637\"}', NULL, '2019-04-25 13:32:44', '2019-06-14 08:47:31', NULL),
(76, '*', 'admin', 'point-config.columns.id', '[]', NULL, '2019-04-25 13:32:44', '2019-06-14 08:47:31', NULL),
(77, '*', 'admin', 'point-type.columns.type_name', '{\"en\":\"\\u0627\\u0633\\u0645 \\u0646\\u0648\\u0639 \\u0627\\u0644\\u0646\\u0642\\u0627\\u0637\"}', NULL, '2019-04-25 13:32:44', '2019-06-14 08:47:31', NULL),
(78, '*', 'admin', 'point-type.columns.notes', '{\"en\":\"\\u0627\\u0644\\u0645\\u0644\\u0627\\u062d\\u0638\\u0627\\u062a\"}', NULL, '2019-04-25 13:32:44', '2019-06-14 08:47:31', NULL),
(79, '*', 'admin', 'point-type.actions.create', '{\"en\":\"\\u0625\\u0646\\u0634\\u0627\\u0621\"}', NULL, '2019-04-25 13:32:44', '2019-06-14 08:47:31', NULL),
(80, '*', 'admin', 'point-type.actions.edit', '{\"en\":\"\\u062a\\u0639\\u062f\\u064a\\u0644 :name\"}', NULL, '2019-04-25 13:32:44', '2019-06-14 08:47:31', NULL),
(81, '*', 'admin', 'point-type.actions.index', '{\"en\":\"\\u0623\\u0646\\u0648\\u0627\\u0639 \\u0627\\u0644\\u0646\\u0642\\u0627\\u0637\"}', NULL, '2019-04-25 13:32:44', '2019-06-14 08:47:31', NULL),
(82, '*', 'admin', 'point-type.columns.id', '[]', NULL, '2019-04-25 13:32:44', '2019-06-14 08:47:31', NULL),
(83, '*', 'admin', 'semester.columns.semester_name', '{\"en\":\"\\u0627\\u0633\\u0645 \\u0627\\u0644\\u0641\\u0635\\u0644\"}', NULL, '2019-04-25 13:32:44', '2019-06-14 08:47:31', NULL),
(84, '*', 'admin', 'semester.columns.description', '{\"en\":\"\\u0627\\u0644\\u0648\\u0635\\u0641\"}', NULL, '2019-04-25 13:32:44', '2019-06-14 08:47:31', NULL),
(85, '*', 'admin', 'semester.columns.started_at', '{\"en\":\"\\u064a\\u0628\\u062f\\u0623 \\u0628\\u062a\\u0627\\u0631\\u064a\\u062e\"}', NULL, '2019-04-25 13:32:44', '2019-06-14 08:47:31', NULL),
(86, '*', 'admin', 'semester.columns.end_at', '{\"en\":\"\\u064a\\u0646\\u062a\\u0647\\u064a \\u0628\\u062a\\u0627\\u0631\\u064a\\u062e\"}', NULL, '2019-04-25 13:32:44', '2019-06-14 08:47:31', NULL),
(87, '*', 'admin', 'semester.columns.enabled', '{\"en\":\"\\u0627\\u0644\\u062a\\u0641\\u0639\\u064a\\u0644\"}', NULL, '2019-04-25 13:32:44', '2019-06-14 08:47:31', NULL),
(88, '*', 'admin', 'semester.actions.create', '{\"en\":\"\\u0641\\u0635\\u0644 \\u062c\\u062f\\u064a\\u062f\"}', NULL, '2019-04-25 13:32:44', '2019-06-14 08:47:31', NULL),
(89, '*', 'admin', 'semester.actions.edit', '{\"en\":\"\\u062a\\u0639\\u062f\\u064a\\u0644 :name\"}', NULL, '2019-04-25 13:32:44', '2019-06-14 08:47:31', NULL),
(90, '*', 'admin', 'semester.actions.index', '{\"en\":\"\\u0627\\u0644\\u0641\\u0635\\u0644\"}', NULL, '2019-04-25 13:32:44', '2019-06-14 08:47:31', NULL),
(91, '*', 'admin', 'semester.columns.id', '[]', NULL, '2019-04-25 13:32:44', '2019-06-14 08:47:31', NULL),
(92, '*', 'admin', 'student-attendance.actions.create', '{\"en\":\"\\u0625\\u0646\\u0634\\u0627\\u0621\"}', NULL, '2019-04-25 13:32:44', '2019-06-14 08:47:31', NULL),
(93, '*', 'admin', 'student-attendance.actions.edit', '{\"en\":\"\\u062a\\u0639\\u062f\\u064a\\u0644\"}', NULL, '2019-04-25 13:32:44', '2019-06-14 08:47:31', NULL),
(94, '*', 'admin', 'student-attendance.actions.index', '{\"en\":\"\\u062d\\u0636\\u0648\\u0631 \\u0627\\u0644\\u0637\\u0644\\u0627\\u0628\"}', NULL, '2019-04-25 13:32:44', '2019-06-14 08:47:31', NULL),
(95, '*', 'admin', 'student-class.columns.school_name', '{\"en\":\"\\u0627\\u0633\\u0645 \\u0627\\u0644\\u0645\\u062f\\u0631\\u0633\\u0629\"}', NULL, '2019-04-25 13:32:44', '2019-06-14 08:47:31', NULL),
(96, '*', 'admin', 'student-class.columns.class_name', '{\"en\":\"\\u0627\\u0633\\u0645 \\u0627\\u0644\\u0635\\u0641\"}', NULL, '2019-04-25 13:32:44', '2019-06-14 08:47:31', NULL),
(97, '*', 'admin', 'student-class.actions.create', '{\"en\":\"\\u0635\\u0641\\u0648\\u0641 \\u0627\\u0644\\u0637\\u0644\\u0627\\u0628\"}', NULL, '2019-04-25 13:32:44', '2019-06-14 08:47:31', NULL),
(98, '*', 'admin', 'student-class.actions.edit', '{\"en\":\"\\u062a\\u0639\\u062f\\u064a\\u0644 :name\"}', NULL, '2019-04-25 13:32:44', '2019-06-14 08:47:31', NULL),
(99, '*', 'admin', 'student-class.actions.index', '{\"en\":\"\\u0635\\u0641\\u0648\\u0641 \\u0627\\u0644\\u0637\\u0644\\u0627\\u0628\"}', NULL, '2019-04-25 13:32:44', '2019-06-14 08:47:31', NULL),
(100, '*', 'admin', 'student-class.columns.id', '[]', NULL, '2019-04-25 13:32:44', '2019-06-14 08:47:31', NULL),
(101, '*', 'admin', 'student-note.actions.create', '{\"en\":\"\\u0625\\u0646\\u0634\\u0627\\u0621\"}', NULL, '2019-04-25 13:32:44', '2019-06-14 08:47:31', NULL),
(102, '*', 'admin', 'student-note.actions.edit', '{\"en\":\"\\u062a\\u0639\\u062f\\u064a\\u0644\"}', NULL, '2019-04-25 13:32:44', '2019-06-14 08:47:31', NULL),
(103, '*', 'admin', 'student-note.actions.index', '{\"en\":\"\\u0645\\u0644\\u0627\\u062d\\u0638\\u0627\\u062a \\u062d\\u0648\\u0644 \\u0627\\u0644\\u0637\\u0644\\u0627\\u0628\"}', NULL, '2019-04-25 13:32:44', '2019-06-14 08:47:31', NULL),
(104, '*', 'admin', 'student-point.actions.create', '{\"en\":\"\\u0625\\u0636\\u0627\\u0641\\u0629 \\u0646\\u0642\\u0627\\u0637\"}', NULL, '2019-04-25 13:32:44', '2019-06-14 08:47:31', NULL),
(105, '*', 'admin', 'student-point.actions.edit', '{\"en\":\"\\u062a\\u0639\\u062f\\u064a\\u0644\"}', NULL, '2019-04-25 13:32:44', '2019-06-14 08:47:31', NULL),
(106, '*', 'admin', 'student-point.actions.index', '{\"en\":\"\\u0646\\u0642\\u0627\\u0637 \\u0627\\u0644\\u0637\\u0644\\u0627\\u0628\"}', NULL, '2019-04-25 13:32:44', '2019-06-14 08:47:31', NULL),
(107, '*', 'admin', 'student.columns.student_fname', '{\"en\":\"\\u0627\\u0633\\u0645 \\u0627\\u0644\\u0637\\u0627\\u0644\\u0628\"}', NULL, '2019-04-25 13:32:44', '2019-06-14 08:47:31', NULL),
(108, '*', 'admin', 'student.columns.student_lname', '{\"en\":\"\\u0627\\u0644\\u0627\\u0633\\u0645 \\u0627\\u0644\\u0623\\u062e\\u064a\\u0631\"}', NULL, '2019-04-25 13:32:44', '2019-06-14 08:47:31', NULL),
(109, '*', 'admin', 'student.columns.student_father_name', '{\"en\":\"\\u0627\\u0633\\u0645 \\u0627\\u0644\\u0623\\u0628\"}', NULL, '2019-04-25 13:32:44', '2019-06-14 08:47:31', NULL),
(110, '*', 'admin', 'student.columns.student_address', '{\"en\":\"\\u0639\\u0646\\u0648\\u0627\\u0646 \\u0627\\u0644\\u0637\\u0627\\u0644\\u0628\"}', NULL, '2019-04-25 13:32:44', '2019-06-14 08:47:31', NULL),
(111, '*', 'admin', 'student.columns.student_father_job', '{\"en\":\"\\u0639\\u0645\\u0644 \\u0627\\u0644\\u0623\\u0628\"}', NULL, '2019-04-25 13:32:44', '2019-06-14 08:47:31', NULL),
(112, '*', 'admin', 'student.columns.student_nationality', '{\"en\":\"\\u062c\\u0646\\u0633\\u064a\\u0629 \\u0627\\u0644\\u0637\\u0627\\u0644\\u0628\"}', NULL, '2019-04-25 13:32:44', '2019-06-14 08:47:31', NULL),
(113, '*', 'admin', 'student.columns.father_phone', '{\"en\":\"\\u0631\\u0642\\u0645 \\u0647\\u0627\\u062a\\u0641 \\u0627\\u0644\\u0623\\u0628\"}', NULL, '2019-04-25 13:32:44', '2019-06-14 08:47:31', NULL),
(114, '*', 'admin', 'student.columns.student_phone', '{\"en\":\"\\u0631\\u0642\\u0645 \\u0627\\u0644\\u0637\\u0627\\u0644\\u0628\"}', NULL, '2019-04-25 13:32:44', '2019-06-14 08:47:31', NULL),
(115, '*', 'admin', 'student.columns.home_phone', '{\"en\":\"\\u0647\\u0627\\u062a\\u0641 \\u0627\\u0644\\u0645\\u0646\\u0632\\u0644\"}', NULL, '2019-04-25 13:32:44', '2019-06-14 08:47:31', NULL),
(116, '*', 'admin', 'student.columns.transportation', '{\"en\":\"\\u0627\\u0644\\u0645\\u0648\\u0627\\u0635\\u0644\\u0627\\u062a\"}', NULL, '2019-04-25 13:32:44', '2019-06-14 08:47:31', NULL),
(117, '*', 'admin', 'student.columns.student_photo', '{\"en\":\"\\u0635\\u0648\\u0631\\u0629 \\u0627\\u0644\\u0637\\u0627\\u0644\\u0628\"}', NULL, '2019-04-25 13:32:44', '2019-06-14 08:47:31', NULL),
(118, '*', 'admin', 'student.columns.note', '{\"en\":\"\\u0645\\u0644\\u0627\\u062d\\u0638\\u0627\\u062a\"}', NULL, '2019-04-25 13:32:44', '2019-06-14 08:47:31', NULL),
(119, '*', 'admin', 'student.columns.status', '{\"en\":\"\\u062d\\u0627\\u0644\\u0629 \\u0627\\u0644\\u0637\\u0627\\u0644\\u0628\"}', NULL, '2019-04-25 13:32:44', '2019-06-14 08:47:31', NULL),
(120, '*', 'admin', 'student.columns.has_id', '{\"en\":\"\\u0644\\u062f\\u064a\\u0647 \\u0645\\u0639\\u0631\\u0641\"}', NULL, '2019-04-25 13:32:44', '2019-06-14 08:47:31', NULL),
(121, '*', 'admin', 'student.columns.student_birthdate', '{\"en\":\"\\u062a\\u0627\\u0631\\u064a\\u062e \\u0627\\u0644\\u0645\\u064a\\u0644\\u0627\\u062f\"}', NULL, '2019-04-25 13:32:44', '2019-06-14 08:47:31', NULL),
(122, '*', 'admin', 'student.actions.create', '{\"en\":\"\\u0637\\u0627\\u0644\\u0628 \\u062c\\u062f\\u064a\\u062f\"}', NULL, '2019-04-25 13:32:44', '2019-06-14 08:47:31', NULL),
(123, '*', 'admin', 'student.actions.edit', '{\"en\":\"\\u062a\\u0639\\u062f\\u064a\\u0644 :name\"}', NULL, '2019-04-25 13:32:44', '2019-06-14 08:47:31', NULL),
(124, '*', 'admin', 'student.actions.index', '{\"en\":\"\\u0627\\u0644\\u0637\\u0627\\u0644\\u0628\"}', NULL, '2019-04-25 13:32:44', '2019-06-14 08:47:31', NULL),
(125, '*', 'admin', 'student.columns.id', '[]', NULL, '2019-04-25 13:32:44', '2019-06-14 08:47:31', NULL),
(126, '*', 'admin', 'teacher-course.columns.teacher_id', '{\"en\":\"\\u0627\\u0644\\u0623\\u0633\\u062a\\u0627\\u0630\"}', NULL, '2019-04-25 13:32:44', '2019-06-14 08:47:32', NULL),
(127, '*', 'admin', 'teacher-course.actions.create', '{\"en\":\"\\u0625\\u0636\\u0627\\u0641\\u0629 \\u0623\\u0633\\u062a\\u0627\\u0630 \\u0644\\u062d\\u0644\\u0642\\u0629\"}', NULL, '2019-04-25 13:32:44', '2019-06-14 08:47:32', NULL),
(128, '*', 'admin', 'teacher-course.actions.edit', '{\"en\":\"\\u062a\\u0639\\u062f\\u064a\\u0644 :name\"}', NULL, '2019-04-25 13:32:44', '2019-06-14 08:47:32', NULL),
(129, '*', 'admin', 'teacher-course.actions.index', '{\"en\":\"\\u0627\\u0644\\u0623\\u0633\\u0627\\u062a\\u0630\\u0629 \\u0648\\u0627\\u0644\\u062d\\u0644\\u0642\\u0627\\u062a\"}', NULL, '2019-04-25 13:32:44', '2019-06-14 08:47:32', NULL),
(130, '*', 'admin', 'teacher-course.columns.id', '[]', NULL, '2019-04-25 13:32:44', '2019-06-14 08:47:32', NULL),
(131, '*', 'admin', 'teacher.columns.teacher_name', '{\"en\":\"\\u0627\\u0633\\u0645 \\u0627\\u0644\\u0623\\u0633\\u062a\\u0627\\u0630\"}', NULL, '2019-04-25 13:32:44', '2019-06-14 08:47:31', NULL),
(132, '*', 'admin', 'teacher.columns.teacher_mobile', '{\"en\":\"\\u0631\\u0642\\u0645 \\u0647\\u0627\\u062a\\u0641 \\u0627\\u0644\\u0627\\u0633\\u062a\\u0627\\u0630\"}', NULL, '2019-04-25 13:32:44', '2019-06-14 08:47:32', NULL),
(133, '*', 'admin', 'teacher-role.columns.role_name', '{\"en\":\"\\u0627\\u0633\\u0645 \\u0627\\u0644\\u0645\\u0647\\u0645\\u0629\"}', NULL, '2019-04-25 13:32:44', '2019-06-14 08:47:32', NULL),
(134, '*', 'admin', 'teacher-role.columns.notes', '{\"en\":\"\\u0627\\u0644\\u0645\\u0644\\u0627\\u062d\\u0638\\u0627\\u062a\"}', NULL, '2019-04-25 13:32:44', '2019-06-14 08:47:32', NULL),
(135, '*', 'admin', 'teacher-role.actions.create', '{\"en\":\"\\u0625\\u0636\\u0627\\u0641\\u0629 \\u0645\\u0647\\u0645\\u0629\"}', NULL, '2019-04-25 13:32:44', '2019-06-14 08:47:32', NULL),
(136, '*', 'admin', 'teacher-role.actions.edit', '{\"en\":\"\\u062a\\u0639\\u062f\\u064a\\u0644 :name\"}', NULL, '2019-04-25 13:32:44', '2019-06-14 08:47:32', NULL),
(137, '*', 'admin', 'teacher-role.actions.index', '{\"en\":\"\\u0645\\u0647\\u0645\\u0627\\u062a \\u0627\\u0644\\u0623\\u0633\\u0627\\u062a\\u0630\\u0629\"}', NULL, '2019-04-25 13:32:44', '2019-06-14 08:47:32', NULL),
(138, '*', 'admin', 'teacher-role.columns.id', '[]', NULL, '2019-04-25 13:32:44', '2019-06-14 08:47:32', NULL),
(139, '*', 'admin', 'teacher.columns.user_id', '{\"en\":\"\\u0645\\u0633\\u062a\\u062e\\u062f\\u0645\"}', NULL, '2019-04-25 13:32:44', '2019-06-14 08:47:32', NULL),
(140, '*', 'admin', 'teacher.columns.teacher_address', '{\"en\":\"\\u0639\\u0646\\u0648\\u0627\\u0646 \\u0627\\u0644\\u0623\\u0633\\u062a\\u0627\\u0630\"}', NULL, '2019-04-25 13:32:44', '2019-06-14 08:47:32', NULL),
(141, '*', 'admin', 'teacher.columns.teacher_study', '{\"en\":\"\\u0627\\u0644\\u062f\\u0631\\u062c\\u0629 \\u0627\\u0644\\u0639\\u0644\\u0645\\u064a\\u0629\"}', NULL, '2019-04-25 13:32:44', '2019-06-14 08:47:32', NULL),
(142, '*', 'admin', 'teacher.columns.teacher_speciality', '{\"en\":\"\\u0627\\u0644\\u0627\\u062e\\u062a\\u0635\\u0627\\u0635\"}', NULL, '2019-04-25 13:32:44', '2019-06-14 08:47:32', NULL),
(143, '*', 'admin', 'teacher.columns.teacher_work', '{\"en\":\"\\u0627\\u0644\\u0639\\u0645\\u0644\"}', NULL, '2019-04-25 13:32:44', '2019-06-14 08:47:32', NULL),
(144, '*', 'admin', 'teacher.columns.teacher_extras', '{\"en\":\"\\u0645\\u0639\\u0644\\u0648\\u0645\\u0627\\u062a \\u0623\\u062e\\u0631\\u0649\"}', NULL, '2019-04-25 13:32:44', '2019-06-14 08:47:32', NULL),
(145, '*', 'admin', 'teacher.columns.teacher_note', '{\"en\":\"\\u0645\\u0644\\u0627\\u062d\\u0638\\u0627\\u062a\"}', NULL, '2019-04-25 13:32:44', '2019-06-14 08:47:32', NULL),
(146, '*', 'admin', 'teacher.columns.teacher_phone', '{\"en\":\"\\u0631\\u0642\\u0645 \\u0647\\u0627\\u062a\\u0641 \\u0627\\u0644\\u0623\\u0631\\u0636\\u064a\"}', NULL, '2019-04-25 13:32:44', '2019-06-14 08:47:32', NULL),
(147, '*', 'admin', 'teacher.columns.birthdate', '{\"en\":\"\\u062a\\u0627\\u0631\\u064a\\u062e \\u0627\\u0644\\u0645\\u064a\\u0644\\u0627\\u062f\"}', NULL, '2019-04-25 13:32:44', '2019-06-14 08:47:32', NULL),
(148, '*', 'admin', 'teacher.actions.create', '{\"en\":\"\\u0625\\u0636\\u0627\\u0641\\u0629 \\u0623\\u0633\\u062a\\u0627\\u0630\"}', NULL, '2019-04-25 13:32:44', '2019-06-14 08:47:32', NULL),
(149, '*', 'admin', 'teacher.actions.edit', '{\"en\":\"\\u062a\\u0639\\u062f\\u064a\\u0644 :name\"}', NULL, '2019-04-25 13:32:44', '2019-06-14 08:47:32', NULL),
(150, '*', 'admin', 'teacher.actions.index', '{\"en\":\"\\u0627\\u0644\\u0623\\u0633\\u0627\\u062a\\u0630\\u0629\"}', NULL, '2019-04-25 13:32:44', '2019-06-14 08:47:32', NULL),
(151, '*', 'admin', 'teacher.columns.id', '[]', NULL, '2019-04-25 13:32:44', '2019-06-14 08:47:32', NULL),
(152, '*', 'admin', 'user.columns.roles', '{\"en\":\"\\u0627\\u0644\\u0645\\u0647\\u0645\\u0627\\u062a\"}', NULL, '2019-04-25 13:32:44', '2019-06-14 08:47:32', NULL),
(153, 'brackets/admin-ui', 'admin', 'forms.select_options', '{\"en\":\"\\u0627\\u0644\\u0631\\u062c\\u0627\\u0621 \\u0627\\u0644\\u0627\\u062e\\u062a\\u064a\\u0627\\u0631\"}', NULL, '2019-04-25 13:32:44', '2019-06-14 08:47:31', NULL),
(154, '*', 'admin', 'user.actions.create', '{\"en\":\"\\u0625\\u0646\\u0634\\u0627\\u0621\"}', NULL, '2019-04-25 13:32:44', '2019-06-14 08:47:32', NULL),
(155, '*', 'admin', 'user.actions.edit', '{\"en\":\"\\u062a\\u0639\\u062f\\u064a\\u0644\"}', NULL, '2019-04-25 13:32:44', '2019-06-14 08:47:32', NULL),
(156, '*', 'admin', 'user.actions.index', '{\"en\":\"\\u0627\\u0644\\u0645\\u0633\\u062a\\u062e\\u062f\\u0645\\u064a\\u0646\"}', NULL, '2019-04-25 13:32:44', '2019-06-14 08:47:32', NULL),
(157, 'brackets/admin-ui', 'admin', 'btn.new', '{\"en\":\"\\u0625\\u0636\\u0627\\u0641\\u0629\"}', NULL, '2019-04-25 13:32:44', '2019-06-14 08:47:31', NULL),
(158, '*', '*', 'Translations', '{\"en\":\"\\u0627\\u0644\\u062a\\u0631\\u062c\\u0645\\u0629\"}', NULL, '2019-04-25 13:32:44', '2019-06-14 08:47:32', NULL),
(159, '*', '*', 'Manage users', '{\"en\":\"\\u0625\\u062f\\u0627\\u0631\\u0629 \\u0627\\u0644\\u0645\\u0633\\u062a\\u062e\\u062f\\u0645\\u064a\\u0646\"}', NULL, '2019-04-25 13:32:44', '2019-06-14 08:47:32', NULL),
(160, '*', '*', 'Configuration', '{\"en\":\"\\u0627\\u0644\\u0627\\u0639\\u062f\\u0627\\u062f\\u0627\\u062a\"}', NULL, '2019-04-25 13:32:44', '2019-06-14 08:47:32', NULL),
(161, '*', 'admin', 'student.columns.student_name', '{\"en\":\"\\u0627\\u0633\\u0645 \\u0627\\u0644\\u0637\\u0627\\u0644\\u0628\"}', NULL, '2019-05-02 16:38:16', '2019-06-14 08:47:31', NULL),
(162, '*', 'admin', 'course-student.actions.edit', '{\"en\":\"\\u062a\\u0639\\u062f\\u064a\\u0644 :name\"}', NULL, '2019-05-02 16:38:16', '2019-06-14 08:47:31', NULL),
(163, '*', 'admin', 'course-student.actions.create-multi', '{\"en\":\"\\u0625\\u0636\\u0627\\u0641\\u0629 \\u0637\\u0627\\u0644\\u0628 \\u0644\\u062d\\u0644\\u0642\\u0629\"}', NULL, '2019-05-02 16:38:16', '2019-06-14 08:47:31', NULL),
(164, '*', 'admin', 'course-student.columns.id', '[]', NULL, '2019-05-02 16:38:16', '2019-06-14 08:47:31', NULL),
(165, '*', 'admin', 'admin_users.columns.roles', '{\"en\":\"\\u0627\\u0644\\u0645\\u0647\\u0645\\u0627\\u062a\"}', NULL, '2019-06-12 02:06:22', '2019-06-14 08:47:31', NULL),
(166, '*', 'admin', 'admin_users.actions.create', '{\"en\":\"\\u0625\\u0646\\u0634\\u0627\\u0621\"}', NULL, '2019-06-12 02:06:22', '2019-06-14 08:47:31', NULL),
(167, '*', 'admin', 'admin_users.actions.edit', '{\"en\":\"\\u062a\\u0639\\u062f\\u064a\\u0644\"}', NULL, '2019-06-12 02:06:22', '2019-06-14 08:47:31', NULL),
(168, '*', 'admin', 'admin_users.actions.index', '{\"en\":\"\\u0627\\u0644\\u0645\\u062f\\u0631\\u0627\\u0621\"}', NULL, '2019-06-12 02:06:22', '2019-06-14 08:47:31', NULL),
(169, '*', 'admin', 'awaqafs.columns.test_name', '{\"en\":\"\\u0627\\u0633\\u0645 \\u0627\\u0644\\u0627\\u062e\\u062a\\u0628\\u0627\\u0631\"}', NULL, '2019-06-12 02:06:22', '2019-06-14 08:47:31', NULL),
(170, '*', 'admin', 'awaqaf-student.columns.student_mark', '{\"en\":\"\\u0639\\u0644\\u0627\\u0645\\u0629 \\u0627\\u0644\\u0637\\u0627\\u0644\\u0628\"}', NULL, '2019-06-12 02:06:22', '2019-06-14 08:47:31', NULL),
(171, '*', 'admin', 'student_mark.columns.student_mark', '{\"en\":\"\\u0639\\u0644\\u0627\\u0645\\u0629 \\u0627\\u0644\\u0637\\u0627\\u0644\\u0628\"}', NULL, '2019-06-12 02:06:22', '2019-06-14 08:47:31', NULL),
(172, '*', 'admin', 'awaqaf-student.columns.full_mark', '{\"en\":\"\\u0627\\u0644\\u0639\\u0644\\u0627\\u0645\\u0629 \\u0627\\u0644\\u0646\\u0647\\u0627\\u0626\\u064a\\u0629\"}', NULL, '2019-06-12 02:06:22', '2019-06-14 08:47:31', NULL),
(173, '*', 'admin', 'full_mark.columns.full_mark', '{\"en\":\"\\u0627\\u0644\\u0639\\u0644\\u0627\\u0645\\u0629 \\u0627\\u0644\\u0643\\u0644\\u064a\\u0629\"}', NULL, '2019-06-12 02:06:22', '2019-06-14 08:47:31', NULL),
(174, '*', 'admin', 'awaqaf-student.columns.is_passed', '{\"en\":\"\\u0646\\u0627\\u062c\\u062d\"}', NULL, '2019-06-12 02:06:22', '2019-06-14 08:47:31', NULL),
(175, '*', 'admin', 'semester.columns.created_at', '{\"en\":\"\\u062a\\u0627\\u0631\\u064a\\u062e \\u0627\\u0644\\u0625\\u0646\\u0634\\u0627\\u0621\"}', NULL, '2019-06-12 02:06:22', '2019-06-14 08:47:31', NULL),
(176, '*', 'admin', 'teacher-course.columns.subject_type', '{\"en\":\"\\u0639\\u0646\\u0648\\u0627\\u0646 \\u0627\\u0644\\u0645\\u0627\\u062f\\u0629\"}', NULL, '2019-06-12 02:06:22', '2019-06-14 08:47:31', NULL),
(177, '*', 'admin', 'awqaf-student.columns.student_mark', '{\"en\":\"\\u0639\\u0644\\u0627\\u0645\\u0629 \\u0627\\u0644\\u0637\\u0627\\u0644\\u0628\"}', NULL, '2019-06-12 02:06:22', '2019-06-14 08:47:31', NULL),
(178, '*', 'admin', 'awqaf-student.columns.is_passed', '{\"en\":\"\\u0646\\u0627\\u062c\\u062d\"}', NULL, '2019-06-12 02:06:22', '2019-06-14 08:47:31', NULL),
(179, '*', 'admin', 'awqaf-student.columns.full_mark', '{\"en\":\"\\u0627\\u0644\\u0639\\u0644\\u0627\\u0645\\u0629 \\u0627\\u0644\\u0643\\u0627\\u0645\\u0644\\u0629\"}', NULL, '2019-06-12 02:06:22', '2019-06-14 08:47:31', NULL),
(180, '*', 'admin', 'awqaf-student.columns.subject_type', '{\"en\":\"\\u0646\\u0648\\u0639 \\u0627\\u0644\\u0645\\u0627\\u062f\\u0629 \\u0627\\u0644\\u0645\\u0633\\u0645\\u0639\\u0629\"}', NULL, '2019-06-12 02:06:22', '2019-06-14 08:47:31', NULL),
(181, '*', 'admin', 'awqaf-student.columns.subject', '{\"en\":\"\\u0627\\u0644\\u0642\\u0633\\u0645 \\u0627\\u0644\\u0645\\u0633\\u0645\\u0639\"}', NULL, '2019-06-12 02:06:22', '2019-06-14 08:47:31', NULL),
(182, '*', 'admin', 'student.columns.notes', '{\"en\":\"\\u0645\\u0644\\u0627\\u062d\\u0638\\u0627\\u062a\"}', NULL, '2019-06-12 02:06:22', '2019-06-14 08:47:31', NULL),
(183, '*', 'admin', 'listened-subject.title', '{\"en\":\"\\u0627\\u0644\\u0635\\u0641\\u062d\\u0627\\u062a \\u0648\\u0627\\u0644\\u0623\\u062c\\u0632\\u0627\\u0621 \\u0627\\u0644\\u0645\\u0633\\u0645\\u0639\\u0629\"}', NULL, '2019-06-12 02:06:22', '2019-06-30 15:05:32', NULL),
(184, '*', 'admin', 'admin_users.title', '{\"en\":\"\\u0639\\u0646\\u0648\\u0627\\u0646\"}', NULL, '2019-06-12 02:06:22', '2019-06-14 08:47:31', NULL),
(185, '*', 'admin', 'listened-subject.columns.created_at', '{\"en\":\"\\u062a\\u0627\\u0631\\u064a\\u062e \\u0627\\u0644\\u062a\\u0633\\u0645\\u064a\\u0639\"}', NULL, '2019-06-12 02:06:22', '2019-06-14 08:47:31', NULL),
(186, '*', 'admin', 'listened-subject.actions.create', '{\"en\":\"\\u0625\\u0646\\u0634\\u0627\\u0621\"}', NULL, '2019-06-12 02:06:22', '2019-06-14 08:47:31', NULL),
(187, '*', 'admin', 'listened-subject.actions.edit', '{\"en\":\"\\u062a\\u0639\\u062f\\u064a\\u0644\"}', NULL, '2019-06-12 02:06:22', '2019-06-14 08:47:31', NULL),
(188, '*', 'admin', 'listened-subject.actions.index', '{\"en\":\"\\u0627\\u0644\\u0645\\u0633\\u0645\\u0639\"}', NULL, '2019-06-12 02:06:22', '2019-06-14 08:47:31', NULL),
(189, '*', 'admin', 'mark.columns.notes', '{\"en\":\"\\u0645\\u0644\\u0627\\u062d\\u0638\\u0627\\u062a\"}', NULL, '2019-06-12 02:06:22', '2019-06-14 08:47:31', NULL),
(190, '*', 'admin', 'mark.columns.mark', '{\"en\":\"\\u0627\\u0644\\u0639\\u0644\\u0627\\u0645\\u0629\"}', NULL, '2019-06-12 02:06:22', '2019-06-14 08:47:31', NULL),
(191, '*', 'admin', 'student-attendance.columns.created_at', '{\"en\":\"\\u062a\\u0627\\u0631\\u064a\\u062e \\u0627\\u0644\\u062d\\u0636\\u0648\\u0631\"}', NULL, '2019-06-12 02:06:22', '2019-06-14 08:47:31', NULL),
(192, '*', 'admin', 'student-note.columns.note', '{\"en\":\"\\u0645\\u0644\\u0627\\u062d\\u0638\\u0629\"}', NULL, '2019-06-12 02:06:22', '2019-06-14 08:47:31', NULL),
(193, '*', 'admin', 'student-note.columns.created_at', '{\"en\":\"\\u062a\\u0627\\u0631\\u064a\\u062e \\u0627\\u0644\\u0625\\u0646\\u0634\\u0627\\u0621\"}', NULL, '2019-06-12 02:06:22', '2019-06-14 08:47:31', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `wysiwyg_media`
--

CREATE TABLE `wysiwyg_media` (
  `id` int(10) UNSIGNED NOT NULL,
  `file_path` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `wysiwygable_id` int(10) UNSIGNED DEFAULT NULL,
  `wysiwygable_type` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `activations`
--
ALTER TABLE `activations`
  ADD KEY `activations_email_index` (`email`);

--
-- Indexes for table `admin_activations`
--
ALTER TABLE `admin_activations`
  ADD KEY `admin_activations_email_index` (`email`);

--
-- Indexes for table `admin_password_resets`
--
ALTER TABLE `admin_password_resets`
  ADD KEY `admin_password_resets_email_index` (`email`);

--
-- Indexes for table `admin_users`
--
ALTER TABLE `admin_users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `admin_users_email_deleted_at_unique` (`email`,`deleted_at`);

--
-- Indexes for table `awqafs`
--
ALTER TABLE `awqafs`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `awqaf_students`
--
ALTER TABLE `awqaf_students`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `courses`
--
ALTER TABLE `courses`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `course_students`
--
ALTER TABLE `course_students`
  ADD PRIMARY KEY (`id`),
  ADD KEY `course_teacher_students_course_id_foreign` (`course_id`),
  ADD KEY `course_teacher_students_student_id_foreign` (`student_id`);

--
-- Indexes for table `exams`
--
ALTER TABLE `exams`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `juza`
--
ALTER TABLE `juza`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `listened_subjects`
--
ALTER TABLE `listened_subjects`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `marks`
--
ALTER TABLE `marks`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `media`
--
ALTER TABLE `media`
  ADD PRIMARY KEY (`id`),
  ADD KEY `media_model_type_model_id_index` (`model_type`,`model_id`);

--
-- Indexes for table `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `model_has_permissions`
--
ALTER TABLE `model_has_permissions`
  ADD PRIMARY KEY (`permission_id`,`model_id`,`model_type`),
  ADD KEY `model_has_permissions_model_id_model_type_index` (`model_id`,`model_type`);

--
-- Indexes for table `model_has_roles`
--
ALTER TABLE `model_has_roles`
  ADD PRIMARY KEY (`role_id`,`model_id`,`model_type`),
  ADD KEY `model_has_roles_model_id_model_type_index` (`model_id`,`model_type`);

--
-- Indexes for table `page`
--
ALTER TABLE `page`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `permissions`
--
ALTER TABLE `permissions`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `point_configs`
--
ALTER TABLE `point_configs`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `point_types`
--
ALTER TABLE `point_types`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `roles`
--
ALTER TABLE `roles`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `role_has_permissions`
--
ALTER TABLE `role_has_permissions`
  ADD PRIMARY KEY (`permission_id`,`role_id`),
  ADD KEY `role_has_permissions_role_id_foreign` (`role_id`);

--
-- Indexes for table `semesters`
--
ALTER TABLE `semesters`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `students`
--
ALTER TABLE `students`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `students_temp`
--
ALTER TABLE `students_temp`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `student_attendances`
--
ALTER TABLE `student_attendances`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `student_classes`
--
ALTER TABLE `student_classes`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `student_notes`
--
ALTER TABLE `student_notes`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `student_points`
--
ALTER TABLE `student_points`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `surah`
--
ALTER TABLE `surah`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `teachers`
--
ALTER TABLE `teachers`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `teacher_courses`
--
ALTER TABLE `teacher_courses`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `teacher_roles`
--
ALTER TABLE `teacher_roles`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `translations`
--
ALTER TABLE `translations`
  ADD PRIMARY KEY (`id`),
  ADD KEY `translations_namespace_index` (`namespace`),
  ADD KEY `translations_group_index` (`group`);

--
-- Indexes for table `wysiwyg_media`
--
ALTER TABLE `wysiwyg_media`
  ADD PRIMARY KEY (`id`),
  ADD KEY `wysiwyg_media_wysiwygable_id_index` (`wysiwygable_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `admin_users`
--
ALTER TABLE `admin_users`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `awqafs`
--
ALTER TABLE `awqafs`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `awqaf_students`
--
ALTER TABLE `awqaf_students`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `courses`
--
ALTER TABLE `courses`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `course_students`
--
ALTER TABLE `course_students`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT for table `exams`
--
ALTER TABLE `exams`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `juza`
--
ALTER TABLE `juza`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `listened_subjects`
--
ALTER TABLE `listened_subjects`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=27;

--
-- AUTO_INCREMENT for table `marks`
--
ALTER TABLE `marks`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `media`
--
ALTER TABLE `media`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=83;

--
-- AUTO_INCREMENT for table `page`
--
ALTER TABLE `page`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `permissions`
--
ALTER TABLE `permissions`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=118;

--
-- AUTO_INCREMENT for table `point_configs`
--
ALTER TABLE `point_configs`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `point_types`
--
ALTER TABLE `point_types`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `roles`
--
ALTER TABLE `roles`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `semesters`
--
ALTER TABLE `semesters`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `students`
--
ALTER TABLE `students`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `students_temp`
--
ALTER TABLE `students_temp`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=365;

--
-- AUTO_INCREMENT for table `student_attendances`
--
ALTER TABLE `student_attendances`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `student_classes`
--
ALTER TABLE `student_classes`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `student_notes`
--
ALTER TABLE `student_notes`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `student_points`
--
ALTER TABLE `student_points`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=35;

--
-- AUTO_INCREMENT for table `surah`
--
ALTER TABLE `surah`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=115;

--
-- AUTO_INCREMENT for table `teachers`
--
ALTER TABLE `teachers`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `teacher_courses`
--
ALTER TABLE `teacher_courses`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `teacher_roles`
--
ALTER TABLE `teacher_roles`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `translations`
--
ALTER TABLE `translations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=194;

--
-- AUTO_INCREMENT for table `wysiwyg_media`
--
ALTER TABLE `wysiwyg_media`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `course_students`
--
ALTER TABLE `course_students`
  ADD CONSTRAINT `course_teacher_students_course_id_foreign` FOREIGN KEY (`course_id`) REFERENCES `courses` (`id`),
  ADD CONSTRAINT `course_teacher_students_student_id_foreign` FOREIGN KEY (`student_id`) REFERENCES `students` (`id`);

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
-- Constraints for table `role_has_permissions`
--
ALTER TABLE `role_has_permissions`
  ADD CONSTRAINT `role_has_permissions_permission_id_foreign` FOREIGN KEY (`permission_id`) REFERENCES `permissions` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `role_has_permissions_role_id_foreign` FOREIGN KEY (`role_id`) REFERENCES `roles` (`id`) ON DELETE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
