-- MySQL dump 10.13  Distrib 8.0.36, for Win64 (x86_64)
--
-- Host: 127.0.0.1    Database: dbiglesiasansare
-- ------------------------------------------------------
-- Server version	8.4.0

/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!50503 SET NAMES utf8 */;
/*!40103 SET @OLD_TIME_ZONE=@@TIME_ZONE */;
/*!40103 SET TIME_ZONE='+00:00' */;
/*!40014 SET @OLD_UNIQUE_CHECKS=@@UNIQUE_CHECKS, UNIQUE_CHECKS=0 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;
/*!40111 SET @OLD_SQL_NOTES=@@SQL_NOTES, SQL_NOTES=0 */;

--
-- Table structure for table `bautizo`
--

DROP TABLE IF EXISTS `bautizo`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `bautizo` (
  `id_bautizo` bigint unsigned NOT NULL AUTO_INCREMENT,
  `correlativo` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `id_persona_bautizada` bigint unsigned DEFAULT NULL,
  `id_persona_bautizo` bigint unsigned DEFAULT NULL,
  `id_persona_padrino` bigint unsigned DEFAULT NULL,
  `id_persona_madrina` bigint unsigned DEFAULT NULL,
  `margen` text COLLATE utf8mb4_unicode_ci,
  `fecha_bautizo` date NOT NULL,
  `id_dato_parroquia` bigint unsigned DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id_bautizo`),
  UNIQUE KEY `bautizo_correlativo_unique` (`correlativo`),
  KEY `bautizo_id_persona_bautizada_foreign` (`id_persona_bautizada`),
  KEY `bautizo_id_persona_bautizo_foreign` (`id_persona_bautizo`),
  KEY `bautizo_id_persona_padrino_foreign` (`id_persona_padrino`),
  KEY `bautizo_id_persona_madrina_foreign` (`id_persona_madrina`),
  KEY `bautizo_id_dato_parroquia_foreign` (`id_dato_parroquia`),
  CONSTRAINT `bautizo_id_dato_parroquia_foreign` FOREIGN KEY (`id_dato_parroquia`) REFERENCES `datos_generales_parroquia` (`id_dato_parroquia`) ON DELETE CASCADE,
  CONSTRAINT `bautizo_id_persona_bautizada_foreign` FOREIGN KEY (`id_persona_bautizada`) REFERENCES `usuarios` (`id_usuario`) ON DELETE CASCADE,
  CONSTRAINT `bautizo_id_persona_bautizo_foreign` FOREIGN KEY (`id_persona_bautizo`) REFERENCES `usuarios` (`id_usuario`) ON DELETE CASCADE,
  CONSTRAINT `bautizo_id_persona_madrina_foreign` FOREIGN KEY (`id_persona_madrina`) REFERENCES `usuarios` (`id_usuario`) ON DELETE CASCADE,
  CONSTRAINT `bautizo_id_persona_padrino_foreign` FOREIGN KEY (`id_persona_padrino`) REFERENCES `usuarios` (`id_usuario`) ON DELETE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Table structure for table `casamiento`
--

DROP TABLE IF EXISTS `casamiento`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `casamiento` (
  `id_casamiento` bigint unsigned NOT NULL AUTO_INCREMENT,
  `correlativo` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `id_novio` bigint unsigned DEFAULT NULL,
  `id_novia` bigint unsigned DEFAULT NULL,
  `id_persona_caso` bigint unsigned DEFAULT NULL,
  `fecha_casamiento` date NOT NULL,
  `id_persona_padrino` bigint unsigned NOT NULL,
  `id_persona_madrina` bigint unsigned NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id_casamiento`),
  UNIQUE KEY `casamiento_correlativo_unique` (`correlativo`),
  KEY `casamiento_id_novio_foreign` (`id_novio`),
  KEY `casamiento_id_novia_foreign` (`id_novia`),
  KEY `casamiento_id_persona_caso_foreign` (`id_persona_caso`),
  KEY `casamiento_id_persona_padrino_foreign` (`id_persona_padrino`),
  KEY `casamiento_id_persona_madrina_foreign` (`id_persona_madrina`),
  CONSTRAINT `casamiento_id_novia_foreign` FOREIGN KEY (`id_novia`) REFERENCES `usuarios` (`id_usuario`) ON DELETE CASCADE,
  CONSTRAINT `casamiento_id_novio_foreign` FOREIGN KEY (`id_novio`) REFERENCES `usuarios` (`id_usuario`) ON DELETE CASCADE,
  CONSTRAINT `casamiento_id_persona_caso_foreign` FOREIGN KEY (`id_persona_caso`) REFERENCES `usuarios` (`id_usuario`) ON DELETE CASCADE,
  CONSTRAINT `casamiento_id_persona_madrina_foreign` FOREIGN KEY (`id_persona_madrina`) REFERENCES `usuarios` (`id_usuario`) ON DELETE CASCADE,
  CONSTRAINT `casamiento_id_persona_padrino_foreign` FOREIGN KEY (`id_persona_padrino`) REFERENCES `usuarios` (`id_usuario`) ON DELETE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Table structure for table `comunion`
--

DROP TABLE IF EXISTS `comunion`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `comunion` (
  `id_comunion` bigint unsigned NOT NULL AUTO_INCREMENT,
  `correlativo` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `id_persona_comunion` bigint unsigned DEFAULT NULL,
  `id_persona_participe` bigint unsigned DEFAULT NULL,
  `fecha_comunion` date NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id_comunion`),
  UNIQUE KEY `comunion_correlativo_unique` (`correlativo`),
  KEY `comunion_id_persona_comunion_foreign` (`id_persona_comunion`),
  KEY `comunion_id_persona_participe_foreign` (`id_persona_participe`),
  CONSTRAINT `comunion_id_persona_comunion_foreign` FOREIGN KEY (`id_persona_comunion`) REFERENCES `usuarios` (`id_usuario`) ON DELETE CASCADE,
  CONSTRAINT `comunion_id_persona_participe_foreign` FOREIGN KEY (`id_persona_participe`) REFERENCES `usuarios` (`id_usuario`) ON DELETE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Table structure for table `confirmacion`
--

DROP TABLE IF EXISTS `confirmacion`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `confirmacion` (
  `id_confirmacion` bigint unsigned NOT NULL AUTO_INCREMENT,
  `correlativo` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `id_persona_confirmada` bigint unsigned DEFAULT NULL,
  `id_persona_confirmo` bigint unsigned DEFAULT NULL,
  `id_persona_padrino` bigint unsigned DEFAULT NULL,
  `id_persona_madrina` bigint unsigned DEFAULT NULL,
  `fecha_confirmacion` date NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id_confirmacion`),
  UNIQUE KEY `confirmacion_correlativo_unique` (`correlativo`),
  KEY `confirmacion_id_persona_confirmada_foreign` (`id_persona_confirmada`),
  KEY `confirmacion_id_persona_confirmo_foreign` (`id_persona_confirmo`),
  KEY `confirmacion_id_persona_padrino_foreign` (`id_persona_padrino`),
  KEY `confirmacion_id_persona_madrina_foreign` (`id_persona_madrina`),
  CONSTRAINT `confirmacion_id_persona_confirmada_foreign` FOREIGN KEY (`id_persona_confirmada`) REFERENCES `usuarios` (`id_usuario`) ON DELETE CASCADE,
  CONSTRAINT `confirmacion_id_persona_confirmo_foreign` FOREIGN KEY (`id_persona_confirmo`) REFERENCES `usuarios` (`id_usuario`) ON DELETE CASCADE,
  CONSTRAINT `confirmacion_id_persona_madrina_foreign` FOREIGN KEY (`id_persona_madrina`) REFERENCES `usuarios` (`id_usuario`) ON DELETE CASCADE,
  CONSTRAINT `confirmacion_id_persona_padrino_foreign` FOREIGN KEY (`id_persona_padrino`) REFERENCES `usuarios` (`id_usuario`) ON DELETE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Table structure for table `datos_generales_parroquia`
--

DROP TABLE IF EXISTS `datos_generales_parroquia`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `datos_generales_parroquia` (
  `id_dato_parroquia` bigint unsigned NOT NULL AUTO_INCREMENT,
  `nombre_parroquia` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `direccion` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `numero_telefono` varchar(20) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id_dato_parroquia`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Table structure for table `failed_jobs`
--

DROP TABLE IF EXISTS `failed_jobs`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `failed_jobs` (
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
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Table structure for table `migrations`
--

DROP TABLE IF EXISTS `migrations`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `migrations` (
  `id` int unsigned NOT NULL AUTO_INCREMENT,
  `migration` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `batch` int NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=13 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Table structure for table `municipio`
--

DROP TABLE IF EXISTS `municipio`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `municipio` (
  `id_municipio` bigint unsigned NOT NULL AUTO_INCREMENT,
  `nombre_municipio` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id_municipio`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Table structure for table `password_reset_tokens`
--

DROP TABLE IF EXISTS `password_reset_tokens`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `password_reset_tokens` (
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`email`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Table structure for table `personal_access_tokens`
--

DROP TABLE IF EXISTS `personal_access_tokens`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `personal_access_tokens` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `tokenable_type` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `tokenable_id` bigint unsigned NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(64) COLLATE utf8mb4_unicode_ci NOT NULL,
  `abilities` text COLLATE utf8mb4_unicode_ci,
  `last_used_at` timestamp NULL DEFAULT NULL,
  `expires_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `personal_access_tokens_token_unique` (`token`),
  KEY `personal_access_tokens_tokenable_type_tokenable_id_index` (`tokenable_type`,`tokenable_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Table structure for table `personas_parroquia`
--

DROP TABLE IF EXISTS `personas_parroquia`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `personas_parroquia` (
  `id_persona` bigint unsigned NOT NULL AUTO_INCREMENT,
  `dpi_feligres` varchar(20) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `nombres_persona` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `apellidos_persona` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `id_municipio` bigint unsigned NOT NULL,
  `numero_telefonico` varchar(20) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `fecha_nacimiento` date NOT NULL,
  `sexo` char(1) COLLATE utf8mb4_unicode_ci NOT NULL,
  `id_persona_padre` bigint unsigned DEFAULT NULL,
  `id_persona_madre` bigint unsigned DEFAULT NULL,
  `id_rol_parroquia` bigint unsigned DEFAULT NULL,
  `descripcion_direccion` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id_persona`),
  KEY `personas_parroquia_id_municipio_foreign` (`id_municipio`),
  KEY `personas_parroquia_id_persona_padre_foreign` (`id_persona_padre`),
  KEY `personas_parroquia_id_persona_madre_foreign` (`id_persona_madre`),
  KEY `personas_parroquia_id_rol_parroquia_foreign` (`id_rol_parroquia`),
  CONSTRAINT `personas_parroquia_id_municipio_foreign` FOREIGN KEY (`id_municipio`) REFERENCES `municipio` (`id_municipio`) ON DELETE CASCADE,
  CONSTRAINT `personas_parroquia_id_persona_madre_foreign` FOREIGN KEY (`id_persona_madre`) REFERENCES `usuarios` (`id_usuario`) ON DELETE SET NULL,
  CONSTRAINT `personas_parroquia_id_persona_padre_foreign` FOREIGN KEY (`id_persona_padre`) REFERENCES `usuarios` (`id_usuario`) ON DELETE SET NULL,
  CONSTRAINT `personas_parroquia_id_rol_parroquia_foreign` FOREIGN KEY (`id_rol_parroquia`) REFERENCES `roles_parroquia` (`id_rol_parroquia`) ON DELETE SET NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Table structure for table `roles_parroquia`
--

DROP TABLE IF EXISTS `roles_parroquia`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `roles_parroquia` (
  `id_rol_parroquia` bigint unsigned NOT NULL AUTO_INCREMENT,
  `descripcion_rol` varchar(60) COLLATE utf8mb4_unicode_ci NOT NULL,
  `ocupa_cargo` char(1) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id_rol_parroquia`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Table structure for table `usuarios`
--

DROP TABLE IF EXISTS `usuarios`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `usuarios` (
  `id_usuario` bigint unsigned NOT NULL AUTO_INCREMENT,
  `nombres_usuario` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `apellidos_usuario` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `correo_usuario` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `password` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `fecha_ingreso` date DEFAULT NULL,
  `fecha_modificacion` date DEFAULT NULL,
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id_usuario`),
  UNIQUE KEY `usuarios_correo_usuario_unique` (`correo_usuario`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;
/*!40103 SET TIME_ZONE=@OLD_TIME_ZONE */;

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;

-- Dump completed on 2024-09-21 11:36:58
