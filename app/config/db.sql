CREATE DATABASE IF NOT EXISTS `conferences` COLLATE utf8mb4_unicode_ci;
USE `conferences`;

CREATE TABLE `users` (
  `id` int(11) AUTO_INCREMENT PRIMARY KEY NOT NULL,
  `name` varchar(20) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(100) COLLATE utf8mb4_unicode_ci UNIQUE NOT NULL,
  `password` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL,
  `registered_on` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `avatar_url` varchar(200),
  `role` varchar(100),
  `deleted` TINYINT(1)
) CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

CREATE TABLE `cities` (
  `id` int(11) AUTO_INCREMENT PRIMARY KEY NOT NULL,
  `name` varchar(20) COLLATE utf8mb4_unicode_ci UNIQUE NOT NULL,
  `deleted` TINYINT(1)
) CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

CREATE TABLE `countries` (
  `id` int(11) AUTO_INCREMENT PRIMARY KEY NOT NULL,
  `name` varchar(20) COLLATE utf8mb4_unicode_ci UNIQUE NOT NULL,
  `deleted` TINYINT(1)
) CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

CREATE TABLE `conferenceTypes` (
  `id` int(11) AUTO_INCREMENT PRIMARY KEY NOT NULL,
  `name` varchar(20) COLLATE utf8mb4_unicode_ci UNIQUE NOT NULL,
  `deleted` TINYINT(1)
) CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

CREATE TABLE `conferences` (
  `id` int(11) AUTO_INCREMENT PRIMARY KEY NOT NULL,
  `name` varchar(20) COLLATE utf8mb4_unicode_ci UNIQUE NOT NULL,
  `created_on` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `start_date` timestamp NOT NULL,
  `end_date` timestamp NOT NULL,
  `cover_url` varchar(4000),
  `description` varchar(4000),
  `conferenceType` int(11), 
  `capacity` int,
  `deleted` TINYINT(1),
  CONSTRAINT FK_CONFERENCETYPE FOREIGN KEY (`conferenceType`) REFERENCES conferenceTypes(`id`),
) CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;