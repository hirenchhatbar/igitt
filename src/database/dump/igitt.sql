-- MariaDB dump 10.19-11.1.2-MariaDB, for Linux (x86_64)
--
-- Host: 172.28.0.50    Database: igitt
-- ------------------------------------------------------
-- Server version	10.11.2-MariaDB-1:10.11.2+maria~ubu2204

/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;
/*!40103 SET @OLD_TIME_ZONE=@@TIME_ZONE */;
/*!40103 SET TIME_ZONE='+00:00' */;
/*!40014 SET @OLD_UNIQUE_CHECKS=@@UNIQUE_CHECKS, UNIQUE_CHECKS=0 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;
/*!40111 SET @OLD_SQL_NOTES=@@SQL_NOTES, SQL_NOTES=0 */;

--
-- Table structure for table `igi_apps`
--

DROP TABLE IF EXISTS `igi_apps`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `igi_apps` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `company_name` varchar(100) NOT NULL,
  `email` varchar(255) DEFAULT NULL,
  `phone` varchar(20) DEFAULT NULL,
  `facebook_url` varchar(500) DEFAULT NULL,
  `twitter_url` varchar(500) DEFAULT NULL,
  `instagram_url` varchar(500) DEFAULT NULL,
  `linkedin_url` varchar(500) DEFAULT NULL,
  `youtube_url` varchar(500) DEFAULT NULL,
  `status` smallint(6) NOT NULL DEFAULT 1,
  `public_url` varchar(500) NOT NULL,
  `admin_url` varchar(500) NOT NULL,
  `location_id` int(10) unsigned DEFAULT NULL,
  `address1` varchar(100) DEFAULT NULL,
  `address2` varchar(100) DEFAULT NULL,
  `postcode` varchar(20) DEFAULT NULL,
  `created_at` int(10) unsigned NOT NULL,
  `updated_at` int(10) unsigned DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `idx_fk_app_location_id` (`location_id`),
  CONSTRAINT `fk_app_location_id` FOREIGN KEY (`location_id`) REFERENCES `igi_locations` (`id`) ON UPDATE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `igi_apps`
--

LOCK TABLES `igi_apps` WRITE;
/*!40000 ALTER TABLE `igi_apps` DISABLE KEYS */;
/*!40000 ALTER TABLE `igi_apps` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `igi_documents`
--

DROP TABLE IF EXISTS `igi_documents`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `igi_documents` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(255) NOT NULL,
  `deleted` smallint(2) unsigned NOT NULL DEFAULT 0,
  `created_at` int(10) unsigned NOT NULL,
  `updated_at` int(10) unsigned DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `igi_documents`
--

LOCK TABLES `igi_documents` WRITE;
/*!40000 ALTER TABLE `igi_documents` DISABLE KEYS */;
/*!40000 ALTER TABLE `igi_documents` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `igi_email_templates`
--

DROP TABLE IF EXISTS `igi_email_templates`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `igi_email_templates` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `title` varchar(200) NOT NULL,
  `subject` varchar(200) NOT NULL,
  `email_from` varchar(255) NOT NULL,
  `email_to` varchar(255) DEFAULT NULL,
  `body_html` longtext NOT NULL,
  `body_text` longtext DEFAULT NULL,
  `uuid` varchar(100) NOT NULL,
  `created_at` int(10) unsigned NOT NULL,
  `updated_at` int(10) unsigned DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `igi_email_templates`
--

LOCK TABLES `igi_email_templates` WRITE;
/*!40000 ALTER TABLE `igi_email_templates` DISABLE KEYS */;
/*!40000 ALTER TABLE `igi_email_templates` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `igi_field_values`
--

DROP TABLE IF EXISTS `igi_field_values`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `igi_field_values` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `parent_id` int(10) unsigned DEFAULT NULL,
  `name` varchar(100) NOT NULL,
  `path` varchar(3000) DEFAULT NULL,
  `lvl` int(10) unsigned DEFAULT NULL,
  `slug` varchar(100) NOT NULL,
  `uuid` varchar(100) NOT NULL,
  `value` varchar(100) DEFAULT NULL,
  `ord` smallint(5) unsigned DEFAULT NULL,
  `status` smallint(5) unsigned DEFAULT 1,
  `created_at` int(10) unsigned NOT NULL,
  `updated_at` int(10) unsigned DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `idx_uni_field_value_name_parent_id` (`name`,`parent_id`),
  KEY `idx_fk_field_value_parent_id` (`parent_id`),
  KEY `idx_field_value_name` (`name`),
  KEY `idx_field_value_slug` (`slug`),
  CONSTRAINT `fk_field_value_parent_id` FOREIGN KEY (`parent_id`) REFERENCES `igi_field_values` (`id`) ON UPDATE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `igi_field_values`
--

LOCK TABLES `igi_field_values` WRITE;
/*!40000 ALTER TABLE `igi_field_values` DISABLE KEYS */;
/*!40000 ALTER TABLE `igi_field_values` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `igi_files`
--

DROP TABLE IF EXISTS `igi_files`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `igi_files` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(255) DEFAULT NULL,
  `entity` varchar(50) DEFAULT NULL,
  `entity_id` int(10) unsigned DEFAULT NULL,
  `path` varchar(255) DEFAULT NULL,
  `hash` varchar(100) DEFAULT NULL,
  `size` int(11) DEFAULT NULL,
  `ord` smallint(5) unsigned DEFAULT NULL,
  `token` varchar(100) NOT NULL,
  `status` smallint(6) NOT NULL DEFAULT 0,
  `org_name` varchar(255) NOT NULL,
  `compress_name` varchar(255) DEFAULT NULL,
  `ip_address` varchar(50) DEFAULT NULL,
  `mime` varchar(255) DEFAULT NULL,
  `user_id` int(10) unsigned DEFAULT NULL,
  `folder_id` int(10) unsigned DEFAULT NULL,
  `uploader_id` int(10) unsigned DEFAULT NULL,
  `type` varchar(50) DEFAULT NULL,
  `usage_id` int(10) unsigned DEFAULT NULL,
  `note` varchar(500) DEFAULT NULL,
  `app_id` int(10) unsigned DEFAULT NULL,
  `created_at` int(10) unsigned NOT NULL,
  `updated_at` int(10) unsigned DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `idx_fk_file_user_id` (`user_id`),
  KEY `idx_fk_file_folder_id` (`folder_id`),
  KEY `idx_fk_file_usage_id` (`usage_id`),
  KEY `idx_fk_file_app_id` (`app_id`),
  CONSTRAINT `fk_file_app_id` FOREIGN KEY (`app_id`) REFERENCES `igi_apps` (`id`) ON UPDATE CASCADE,
  CONSTRAINT `fk_file_folder_id` FOREIGN KEY (`folder_id`) REFERENCES `igi_folders` (`id`) ON UPDATE CASCADE,
  CONSTRAINT `fk_file_usage_id` FOREIGN KEY (`usage_id`) REFERENCES `igi_field_values` (`id`) ON UPDATE CASCADE,
  CONSTRAINT `fk_file_user_id` FOREIGN KEY (`user_id`) REFERENCES `igi_users` (`id`) ON UPDATE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `igi_files`
--

LOCK TABLES `igi_files` WRITE;
/*!40000 ALTER TABLE `igi_files` DISABLE KEYS */;
/*!40000 ALTER TABLE `igi_files` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `igi_folders`
--

DROP TABLE IF EXISTS `igi_folders`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `igi_folders` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `parent_id` int(10) unsigned DEFAULT NULL,
  `name` varchar(100) NOT NULL,
  `path` varchar(3000) DEFAULT NULL,
  `lvl` int(10) unsigned DEFAULT NULL,
  `slug` varchar(100) NOT NULL,
  `uuid` varchar(100) NOT NULL,
  `created_at` int(10) unsigned NOT NULL,
  `updated_at` int(10) unsigned DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `idx_uni_folder_name` (`name`) USING BTREE,
  UNIQUE KEY `idx_uni_folder_name_parent_id` (`name`,`parent_id`),
  KEY `idx_fk_folder_parent_id` (`parent_id`),
  KEY `idx_folder_name` (`name`),
  KEY `idx_folder_slug` (`slug`),
  CONSTRAINT `fk_folder_parent_id` FOREIGN KEY (`parent_id`) REFERENCES `igi_folders` (`id`) ON UPDATE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `igi_folders`
--

LOCK TABLES `igi_folders` WRITE;
/*!40000 ALTER TABLE `igi_folders` DISABLE KEYS */;
/*!40000 ALTER TABLE `igi_folders` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `igi_locations`
--

DROP TABLE IF EXISTS `igi_locations`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `igi_locations` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `parent_id` int(10) unsigned DEFAULT NULL,
  `name` varchar(100) NOT NULL,
  `path` varchar(3000) DEFAULT NULL,
  `lvl` int(10) unsigned DEFAULT NULL,
  `latitude` double DEFAULT NULL,
  `longitude` double DEFAULT NULL,
  `slug` varchar(100) NOT NULL,
  `uuid` varchar(100) NOT NULL,
  `fullname` varchar(500) DEFAULT NULL,
  `created_at` int(10) unsigned NOT NULL,
  `updated_at` int(10) unsigned DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `idx_uni_location_name_parent_id` (`name`,`parent_id`),
  KEY `idx_fk_location_parent_id` (`parent_id`),
  KEY `idx_location_name` (`name`),
  KEY `idx_location_slug` (`slug`),
  CONSTRAINT `fk_location_parent_id` FOREIGN KEY (`parent_id`) REFERENCES `igi_locations` (`id`) ON UPDATE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=102238 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `igi_locations`
--

LOCK TABLES `igi_locations` WRITE;
/*!40000 ALTER TABLE `igi_locations` DISABLE KEYS */;
/*!40000 ALTER TABLE `igi_locations` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `igi_resources`
--

DROP TABLE IF EXISTS `igi_resources`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `igi_resources` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(128) NOT NULL,
  `parent_id` int(10) unsigned DEFAULT NULL,
  `description` varchar(500) DEFAULT NULL,
  `ord` smallint(5) unsigned DEFAULT NULL,
  `status` smallint(5) unsigned DEFAULT 1,
  `hidden` smallint(5) unsigned DEFAULT 0,
  `uuid` varchar(100) NOT NULL,
  `created_at` int(10) unsigned NOT NULL,
  `updated_at` int(10) unsigned DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `idx_fk_resource_parent` (`parent_id`),
  CONSTRAINT `fk_resource_parent` FOREIGN KEY (`parent_id`) REFERENCES `igi_resources` (`id`) ON UPDATE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `igi_resources`
--

LOCK TABLES `igi_resources` WRITE;
/*!40000 ALTER TABLE `igi_resources` DISABLE KEYS */;
/*!40000 ALTER TABLE `igi_resources` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `igi_role_resource_permissions`
--

DROP TABLE IF EXISTS `igi_role_resource_permissions`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `igi_role_resource_permissions` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `role_id` int(10) unsigned DEFAULT NULL,
  `resource_id` int(10) unsigned DEFAULT NULL,
  `create` smallint(5) unsigned NOT NULL DEFAULT 1,
  `read` smallint(5) unsigned NOT NULL DEFAULT 1,
  `update` smallint(5) unsigned NOT NULL DEFAULT 1,
  `delete` smallint(5) unsigned NOT NULL DEFAULT 1,
  `read_own` smallint(5) unsigned NOT NULL DEFAULT 0,
  `update_own` smallint(5) unsigned NOT NULL DEFAULT 0,
  `internal` smallint(5) unsigned NOT NULL DEFAULT 0,
  `app_id` int(10) unsigned DEFAULT NULL,
  `created_at` int(10) unsigned NOT NULL,
  `updated_at` int(10) unsigned DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `idx_fk_role_resource_permission_resource` (`resource_id`),
  KEY `idx_fk_role_resource_permission_role` (`role_id`),
  CONSTRAINT `fk_role_resource_permission_resource` FOREIGN KEY (`resource_id`) REFERENCES `igi_resources` (`id`) ON UPDATE CASCADE,
  CONSTRAINT `fk_role_resource_permission_role` FOREIGN KEY (`role_id`) REFERENCES `igi_roles` (`id`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `igi_role_resource_permissions`
--

LOCK TABLES `igi_role_resource_permissions` WRITE;
/*!40000 ALTER TABLE `igi_role_resource_permissions` DISABLE KEYS */;
/*!40000 ALTER TABLE `igi_role_resource_permissions` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `igi_roles`
--

DROP TABLE IF EXISTS `igi_roles`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `igi_roles` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(128) NOT NULL,
  `code` varchar(50) NOT NULL,
  `ord` smallint(5) unsigned DEFAULT NULL,
  `status` smallint(5) unsigned NOT NULL DEFAULT 1,
  `app_id` int(10) unsigned DEFAULT NULL,
  `created_at` datetime NOT NULL,
  `updated_at` datetime DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `name_UNIQUE` (`name`)
) ENGINE=InnoDB AUTO_INCREMENT=15 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `igi_roles`
--

LOCK TABLES `igi_roles` WRITE;
/*!40000 ALTER TABLE `igi_roles` DISABLE KEYS */;
INSERT INTO `igi_roles` VALUES
(1,'Super Administrator','SUPER_ADMINISTRATOR',1000,1,NULL,'2023-10-01 10:56:38',NULL),
(2,'Admin','ADMINISTRATOR',1,1,NULL,'2023-10-01 10:56:38',NULL);
/*!40000 ALTER TABLE `igi_roles` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `igi_user_roles`
--

DROP TABLE IF EXISTS `igi_user_roles`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `igi_user_roles` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `user_id` int(10) unsigned NOT NULL,
  `role_id` int(10) unsigned NOT NULL,
  `physical` smallint(6) NOT NULL DEFAULT 1,
  `created_at` int(10) unsigned NOT NULL,
  `updated_at` int(10) unsigned DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `idx_fk_user_role_user_id` (`user_id`),
  KEY `idx_fk_user_role_role_id` (`role_id`),
  CONSTRAINT `fk_user_role_role_id` FOREIGN KEY (`role_id`) REFERENCES `igi_roles` (`id`) ON DELETE NO ACTION ON UPDATE CASCADE,
  CONSTRAINT `fk_user_role_user_id` FOREIGN KEY (`user_id`) REFERENCES `igi_users` (`id`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `igi_user_roles`
--

LOCK TABLES `igi_user_roles` WRITE;
/*!40000 ALTER TABLE `igi_user_roles` DISABLE KEYS */;
/*!40000 ALTER TABLE `igi_user_roles` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `igi_users`
--

DROP TABLE IF EXISTS `igi_users`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `igi_users` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `firstname` varchar(50) NOT NULL,
  `lastname` varchar(50) NOT NULL,
  `email` varchar(255) NOT NULL,
  `password` varchar(255) DEFAULT NULL,
  `fullname` varchar(100) DEFAULT NULL,
  `status` smallint(5) unsigned DEFAULT 1,
  `birth_date` int(10) NOT NULL,
  `mobile` varchar(20) NOT NULL,
  `phone` varchar(20) DEFAULT NULL,
  `address` varchar(200) DEFAULT NULL,
  `address2` varchar(200) DEFAULT NULL,
  `location_id` int(10) unsigned DEFAULT NULL,
  `postcode` varchar(10) DEFAULT NULL,
  `deleted` smallint(2) unsigned NOT NULL DEFAULT 0,
  `customer` smallint(1) unsigned NOT NULL DEFAULT 0,
  `app_id` int(10) unsigned DEFAULT NULL,
  `created_at` int(10) unsigned NOT NULL,
  `updated_at` int(10) unsigned DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `fk_user_location_id_idx` (`location_id`),
  CONSTRAINT `fk_user_location_id` FOREIGN KEY (`location_id`) REFERENCES `igi_locations` (`id`) ON DELETE NO ACTION ON UPDATE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `igi_users`
--

LOCK TABLES `igi_users` WRITE;
/*!40000 ALTER TABLE `igi_users` DISABLE KEYS */;
/*!40000 ALTER TABLE `igi_users` ENABLE KEYS */;
UNLOCK TABLES;
/*!40103 SET TIME_ZONE=@OLD_TIME_ZONE */;

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;

-- Dump completed on 2023-10-13 11:01:50
