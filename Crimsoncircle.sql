-- Adminer 4.8.1 MySQL 8.0.33 dump

SET NAMES utf8;
SET time_zone = '+00:00';
SET foreign_key_checks = 0;
SET sql_mode = 'NO_AUTO_VALUE_ON_ZERO';

SET NAMES utf8mb4;

DROP TABLE IF EXISTS `Author`;
CREATE TABLE `Author` (
  `id` int NOT NULL AUTO_INCREMENT,
  `name` varchar(250) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

INSERT INTO `Author` (`id`, `name`) VALUES
(1,	'Author name'),
(2,	'Pablo Newton'),
(3,	'Roberto Carlos');

DROP TABLE IF EXISTS `Comment`;
CREATE TABLE `Comment` (
  `id` int NOT NULL AUTO_INCREMENT,
  `post_id` int NOT NULL,
  `content` varchar(250) NOT NULL,
  `author` varchar(250) NOT NULL,
  `created_at` timestamp NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

INSERT INTO `Comment` (`id`, `post_id`, `content`, `author`, `created_at`) VALUES
(1,	1,	'This is a comment for the post wit id 123456',	'Miguel Gutierrez',	'2023-05-30 05:31:48'),
(2,	2,	'This is a comment for the post wit id 2',	'Roberto Manson',	'2023-05-30 05:32:14'),
(3,	2,	'This is a comment for the post wit id 2',	'Roberto Manson',	'2023-05-30 05:39:09'),
(5,	2,	'This is a comment for the post wit id 2',	'Roberto Manson',	'2023-05-30 06:15:24'),
(6,	2,	'This is a comment for the post wit id 2',	'Roberto Manson',	'2023-05-30 06:15:28'),
(7,	2,	'This is a comment for the post wit id 2',	'Roberto Manson',	'2023-05-30 06:15:34'),
(8,	2,	'This is a comment for the post wit id 2',	'Roberto Manson',	'2023-05-30 06:15:39'),
(9,	2,	'This is a comment for the post wit id 2',	'Roberto Manson',	'2023-05-30 06:15:42'),
(10,	2,	'This is a comment for the post wit id 2',	'Roberto Manson',	'2023-05-30 06:15:47'),
(11,	2,	'This is a comment for the post wit id 2',	'Roberto Manson',	'2023-05-30 06:15:50'),
(12,	2,	'This is a comment for the post wit id 2',	'Roberto Manson',	'2023-05-30 06:16:09'),
(13,	2,	'This is a comment for the post wit id 2',	'Roberto Manson',	'2023-05-30 06:16:13'),
(14,	2,	'This is a comment for the post wit id 2',	'Roberto Manson',	'2023-05-30 06:16:17'),
(15,	2,	'This is a comment for the post wit id 2',	'Roberto Manson',	'2023-05-30 06:16:21'),
(16,	2,	'This is a comment for the post wit id 2',	'Roberto Manson',	'2023-05-30 06:16:25');

DROP TABLE IF EXISTS `blog`;
CREATE TABLE `blog` (
  `id` int NOT NULL AUTO_INCREMENT,
  `title` varchar(250) NOT NULL,
  `content` varchar(250) NOT NULL,
  `author_id` int NOT NULL,
  `slug` varchar(100) NOT NULL,
  `created_at` timestamp NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

INSERT INTO `blog` (`id`, `title`, `content`, `author_id`, `slug`, `created_at`) VALUES
(1,	'The title of new blog post',	'This is the content for a new blog post',	1,	'/the_title_of_new_blog_post',	'2023-05-30 01:24:47'),
(2,	'The title of new blog post',	'This is the content for a new blog post',	1,	'/the_new',	'2023-05-30 04:56:45'),
(4,	'The title of new blog post',	'This is the content for a new blog post',	1,	'/the_data',	'2023-05-30 05:16:28');

-- 2023-05-30 06:36:56