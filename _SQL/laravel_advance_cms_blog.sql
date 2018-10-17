-- phpMyAdmin SQL Dump
-- version 4.7.4
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Oct 17, 2018 at 11:10 PM
-- Server version: 10.1.28-MariaDB
-- PHP Version: 7.1.11

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `laravel_advance_cms_blog`
--

-- --------------------------------------------------------

--
-- Table structure for table `categories`
--

CREATE TABLE `categories` (
  `id` int(10) UNSIGNED NOT NULL,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `user_id` int(11) NOT NULL
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
-- Table structure for table `posts`
--

CREATE TABLE `posts` (
  `id` int(10) UNSIGNED NOT NULL,
  `title` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `body` mediumtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `user_id` int(11) NOT NULL,
  `cover_image` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `category_id` int(10) UNSIGNED DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `posts`
--

INSERT INTO `posts` (`id`, `title`, `body`, `created_at`, `updated_at`, `user_id`, `cover_image`, `category_id`) VALUES
(8, 'Post One', '<p>This is the first post</p>', '2018-10-17 21:06:24', '2018-10-17 21:06:24', 2, 'Invincible Iron Man (2015-) 002-018_1505835353.jpg', NULL),
(9, 'Low Poly Island', '<p>This a low poly island still, created by me in Cinema4D</p>', '2018-10-17 20:31:24', '2018-10-17 20:31:24', 1, 'LowPolyIsland_[stillrender]_06_0001_1505833521.jpg', NULL),
(10, 'The Odd One', '<p>This is a recent work of mine using mograph in Cinema 4D</p>', '2018-10-17 20:33:24', '2018-10-17 20:33:24', 1, 'Mograph Effector Motion GFX test 02_1505833606.jpg', NULL),
(11, 'My First Post', '<p>Hi, I am new to this blog</p>', '2018-10-17 20:35:24', '2018-10-17 20:35:24', 3, 'Saga v2-027_1505835662.jpg', NULL),
(12, 'Finally registered on the blog', '<p>Cool place to hang <strong>in</strong></p>', '2018-10-17 20:37:24', '2018-10-17 20:37:24', 4, 'XO_009_CVR_1505927212.jpg', NULL),
(13, 'Liking this site very much', '<p><strong>Lorem Ipsum</strong> is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry&#39;s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum.</p>', '2018-10-17 20:39:24', '2018-10-17 20:39:24', 4, 'noimage.jpg', NULL),
(14, 'This is a post', '<p>Hello World</p>', '2018-10-17 20:40:25', '2018-10-17 20:40:25', 5, '75ecfb35219929.5739c564206fe2_1539585687.png', 1),
(15, 'Another Post', '<p>Hello Oli</p>', '2018-10-17 20:45:25', '2018-10-17 20:45:25', 5, 'noimage.jpg', 4),
(20, 'Tagged Post', '<p>This is a multi tagged post</p>', '2018-10-17 21:08:24', '2018-10-15 21:08:24', 5, 'noimage.jpg', 1);

-- --------------------------------------------------------

--
-- Table structure for table `post_tag`
--

CREATE TABLE `post_tag` (
  `id` int(10) UNSIGNED NOT NULL,
  `post_id` int(10) UNSIGNED NOT NULL,
  `tag_id` int(10) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `site`
--

CREATE TABLE `site` (
  `id` int(10) UNSIGNED NOT NULL,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `logo` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `site`
--

INSERT INTO `site` (`id`, `name`, `logo`, `created_at`, `updated_at`) VALUES
(1, 'My CMS', '75ecfb35219929.5739c564206fe2_1539804941.png', '2018-10-17 13:28:18', '2018-10-17 14:05:41');

-- --------------------------------------------------------

--
-- Table structure for table `tags`
--

CREATE TABLE `tags` (
  `id` int(10) UNSIGNED NOT NULL,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `user_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(10) UNSIGNED NOT NULL,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `password` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `user_role` int(11) NOT NULL DEFAULT '0',
  `phone` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `date_of_birth` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `name`, `email`, `password`, `remember_token`, `created_at`, `updated_at`, `user_role`, `phone`, `date_of_birth`) VALUES
(1, 'Ahmad W Khan', 'oli@gmail.com', '$2y$10$eZ.6rAkFrBH2M5la5hIDQebLgNw5b9zRWu.coHQATn9M.9T20ZQ0e', 'gMwCRS9md5HYB8hf0vQWHjNHYQ7AIdzQhmdoe1xVAHfeuctT8gYSHb1c7BZ8', '2017-09-19 08:14:30', '2018-10-17 12:50:42', 103, '', '0000-00-00'),
(2, 'Anushree Kar', 'anu@gmail.com', '$2y$10$4g0UXwgPtCvOYbiKQkEPKORhXB76pbU5Y.g1KvQewi8tgUIJbySje', 'h4vKgl8cwiOnH8bRpzIWF8AusLlaxa1zRh7Ux68EoC5ybMZGl9NbIAKfexOx', '2017-09-19 08:47:26', '2018-10-17 12:50:40', 102, '', '0000-00-00'),
(3, 'Mariyam Jameelah', 'jamu@gmail.com', '$2y$10$xPjf75FNoHGXu9zF9SAuI.mdsdaVuoQ2hn.aOO1hPaXnVjO/bS8NK', 'JdLJqiDjfDM4mcLK9YSFMPVBLZ6ytaKiGN9dkSC1yk4JEkozfojjzbXfE0P1', '2017-09-19 10:10:11', '2018-10-17 12:50:37', 103, '', '0000-00-00'),
(4, 'Mushtaque', 'mak@gmail.com', '$2y$10$A4CuMzJECh97ehq.2VFJle5fLW/DrK.qEg.7r2B9L38IUxXs8jF56', 'S1AfkHhVZkwXUiCBJFY7clxhkDAYOvxT56hFjDroEtkw3muGH56v1Z2DXCf7', '2017-09-20 11:34:16', '2018-10-17 12:50:34', 103, '', '0000-00-00'),
(5, 'Admin', 'admin@koolcms.com', '$2y$10$sUrWlWSEpYOj9qzdF6Rbu.yjzdYRtSs0O3hMGULdgE4xo6XK6vbFe', 'n5WrJs4U9mow6TCSoJvXTkgr1pnj5aTpyeRE1RMGWaXSazeHFi12YRyccy7Q', '2018-10-15 01:11:04', '2018-10-17 15:35:09', 1, '9876543210', '1992-01-01'),
(6, 'oli3', 'oli3@gmail.com', '$2y$10$ucUBEuSzQvXADOhk2JK6J.VqTItRXwAxbpHwfzQjAUxDG67YHtlyC', 'bGSk91j7P4di1C2hW32XEGcfJ4RoVY1JnXkrZ6N0BCOkgQv7aGlj1Ukxy2iO', '2018-10-17 06:16:51', '2018-10-17 12:50:28', 102, '', '0000-00-00');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `categories`
--
ALTER TABLE `categories`
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
-- Indexes for table `posts`
--
ALTER TABLE `posts`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `post_tag`
--
ALTER TABLE `post_tag`
  ADD PRIMARY KEY (`id`),
  ADD KEY `post_tag_post_id_foreign` (`post_id`),
  ADD KEY `post_tag_tag_id_foreign` (`tag_id`);

--
-- Indexes for table `site`
--
ALTER TABLE `site`
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
-- AUTO_INCREMENT for table `categories`
--
ALTER TABLE `categories`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `posts`
--
ALTER TABLE `posts`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=21;

--
-- AUTO_INCREMENT for table `post_tag`
--
ALTER TABLE `post_tag`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `site`
--
ALTER TABLE `site`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `tags`
--
ALTER TABLE `tags`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `post_tag`
--
ALTER TABLE `post_tag`
  ADD CONSTRAINT `post_tag_post_id_foreign` FOREIGN KEY (`post_id`) REFERENCES `posts` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `post_tag_tag_id_foreign` FOREIGN KEY (`tag_id`) REFERENCES `tags` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
