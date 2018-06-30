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

CREATE TABLE `countries` (
  `id` int(11) AUTO_INCREMENT PRIMARY KEY NOT NULL,
  `name` varchar(50) COLLATE utf8mb4_unicode_ci UNIQUE NOT NULL,
  `deleted` TINYINT(1)
) CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

CREATE TABLE `cities` (
  `id` int(11) AUTO_INCREMENT PRIMARY KEY NOT NULL,
  `name` varchar(50) COLLATE utf8mb4_unicode_ci UNIQUE NOT NULL,
  `countryId` int(11) NOT NULL, 
  `deleted` TINYINT(1),
  CONSTRAINT FK_COUNTRYID FOREIGN KEY (`countryId`) REFERENCES countries(`id`)
) CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

CREATE TABLE `eventTypes` (
  `id` int(11) AUTO_INCREMENT PRIMARY KEY NOT NULL,
  `name` varchar(20) COLLATE utf8mb4_unicode_ci UNIQUE NOT NULL,
  `deleted` TINYINT(1)
) CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

CREATE TABLE `categories` (
  `id` int(11) AUTO_INCREMENT PRIMARY KEY NOT NULL,
  `name` varchar(20) COLLATE utf8mb4_unicode_ci UNIQUE NOT NULL,
  `deleted` TINYINT(1)
) CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

CREATE TABLE `events` (
  `id` int(11) AUTO_INCREMENT PRIMARY KEY NOT NULL,
  `name` varchar(20) COLLATE utf8mb4_unicode_ci UNIQUE NOT NULL,
  `created_on` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `start_date` timestamp NOT NULL,
  `end_date` timestamp NOT NULL,
  `location` varchar(1000),
  `cover_url` varchar(4000),
  `description` varchar(4000),
  `eventTypeId` int(11) NOT NULL, 
  `categoryId` int(11) NOT NULL,
  `lecturer` varchar(100),
  `capacity` int,
  `price` decimal,
  `deleted` TINYINT(1),
  CONSTRAINT FK_EVENTTYPE FOREIGN KEY (`eventTypeId`) REFERENCES eventTypes(`id`),
  CONSTRAINT FK_CATEGORY FOREIGN KEY (`categoryId`) REFERENCES categories(`id`)
) CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

CREATE TABLE `comments` (
  `id` int(11) AUTO_INCREMENT PRIMARY KEY NOT NULL,
  `content` varchar(4000),
  `deleted` TINYINT(1)
) CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

CREATE TABLE `eventComment` (
  `id` int(11) AUTO_INCREMENT PRIMARY KEY NOT NULL,
  `commentId` int(11) NOT NULL, 
  `eventId` int(11) NOT NULL,
  `deleted` TINYINT(1),
  CONSTRAINT FK_COMMENT FOREIGN KEY (`commentId`) REFERENCES comments(`id`),
  CONSTRAINT FK_EVENT FOREIGN KEY (`eventId`) REFERENCES events(`id`)
) CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
