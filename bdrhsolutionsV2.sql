-- MySQL dump 10.13  Distrib 8.0.42, for Win64 (x86_64)
--
-- Host: 127.0.0.1    Database: bdrhsolutionsv2
-- ------------------------------------------------------
-- Server version	8.0.42

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
-- Table structure for table `arl`
--

DROP TABLE IF EXISTS `arl`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `arl` (
  `id_arl` int NOT NULL AUTO_INCREMENT,
  `nom_arl` varchar(45) CHARACTER SET utf8mb4 COLLATE utf8mb4_spanish_ci NOT NULL,
  PRIMARY KEY (`id_arl`),
  UNIQUE KEY `nom_arl` (`nom_arl`)
) ENGINE=InnoDB AUTO_INCREMENT=11 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_spanish_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `arl`
--

LOCK TABLES `arl` WRITE;
/*!40000 ALTER TABLE `arl` DISABLE KEYS */;
INSERT INTO `arl` VALUES (10,'ARL Aurora'),(7,'ARL AXA Colpatria'),(3,'ARL Bolívar'),(2,'ARL Colmena'),(6,'ARL Equidad Seguros'),(8,'ARL Liberty Seguros'),(9,'ARL Mapfre'),(4,'ARL Positiva'),(5,'ARL Seguros Alfa'),(1,'ARL Sura');
/*!40000 ALTER TABLE `arl` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `cache`
--

DROP TABLE IF EXISTS `cache`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `cache` (
  `key` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `value` mediumtext CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `expiration` int NOT NULL,
  PRIMARY KEY (`key`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `cache`
--

LOCK TABLES `cache` WRITE;
/*!40000 ALTER TABLE `cache` DISABLE KEYS */;
/*!40000 ALTER TABLE `cache` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `cache_locks`
--

DROP TABLE IF EXISTS `cache_locks`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `cache_locks` (
  `key` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `owner` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `expiration` int NOT NULL,
  PRIMARY KEY (`key`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `cache_locks`
--

LOCK TABLES `cache_locks` WRITE;
/*!40000 ALTER TABLE `cache_locks` DISABLE KEYS */;
/*!40000 ALTER TABLE `cache_locks` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `caja_compensacion`
--

DROP TABLE IF EXISTS `caja_compensacion`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `caja_compensacion` (
  `id_caj_compen` int NOT NULL AUTO_INCREMENT,
  `nom_caj_compen` varchar(45) CHARACTER SET utf8mb4 COLLATE utf8mb4_spanish_ci NOT NULL,
  PRIMARY KEY (`id_caj_compen`),
  UNIQUE KEY `nom_caj_compen` (`nom_caj_compen`)
) ENGINE=InnoDB AUTO_INCREMENT=45 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_spanish_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `caja_compensacion`
--

LOCK TABLES `caja_compensacion` WRITE;
/*!40000 ALTER TABLE `caja_compensacion` DISABLE KEYS */;
INSERT INTO `caja_compensacion` VALUES (34,'CAFABA'),(6,'CAFAM'),(40,'CAFAMAZ'),(44,'CAFASUR'),(30,'CAJACOPI'),(23,'CAJAMAG'),(39,'CAJASAI'),(14,'CAJASAN'),(38,'CAMACOL'),(18,'COFREM'),(3,'COLSUBSIDIO'),(21,'COMBARRANQUILLA'),(41,'COMCAJA'),(17,'COMFABOY'),(35,'COMFACA'),(29,'COMFACASANARE'),(22,'COMFACAUCA'),(24,'COMFACESAR'),(31,'COMFACHOCO'),(19,'COMFACOR'),(33,'COMFACUNDI'),(36,'COMFAGUAJIRA'),(5,'COMFAMA'),(15,'COMFAMILIAR ATLANTICO'),(27,'COMFAMILIAR CARTAGENA'),(11,'COMFAMILIAR HUILA'),(20,'COMFAMILIAR NARIÑO'),(37,'COMFAMILIAR PUTUMUMAYO'),(10,'COMFAMILIAR RISARALDA'),(16,'COMFAMILIARES CALDAS'),(7,'COMFANDI'),(25,'COMFANORTE'),(26,'COMFAORIENTE'),(28,'COMFASUCRE'),(8,'COMFENALCO ANTIOQUIA'),(13,'COMFENALCO CARTAGENA'),(42,'COMFENALCO SANTANDER'),(1,'COMFENALCO TOLIMA'),(9,'COMFENALCO VALLE'),(32,'COMFIAR ARAUCA'),(4,'COMPENSAR'),(12,'CONFACALDAS'),(2,'CONFATOLIMA'),(43,'FENALCO QUINDIO');
/*!40000 ALTER TABLE `caja_compensacion` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `cargos`
--

DROP TABLE IF EXISTS `cargos`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `cargos` (
  `id_cargo` int NOT NULL AUTO_INCREMENT,
  `cargo` varchar(155) CHARACTER SET utf8mb4 COLLATE utf8mb4_spanish_ci NOT NULL,
  `id_dependencia` int NOT NULL,
  PRIMARY KEY (`id_cargo`),
  UNIQUE KEY `cargo` (`cargo`),
  KEY `id_dependencia` (`id_dependencia`),
  CONSTRAINT `cargos_ibfk_1` FOREIGN KEY (`id_dependencia`) REFERENCES `dependencias` (`id_dependencia`)
) ENGINE=InnoDB AUTO_INCREMENT=26 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_spanish_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `cargos`
--

LOCK TABLES `cargos` WRITE;
/*!40000 ALTER TABLE `cargos` DISABLE KEYS */;
INSERT INTO `cargos` VALUES (1,'Coordinador de recursos humanos',1),(2,'Conductor',2),(3,'Auxiliar de recursos humanos',1),(4,'Médico general',2),(5,'Coordinador médico',2),(6,'Enfermera jefe',3),(7,'Auxiliar de enfermería',3),(8,'Odontólogo',4),(9,'Auxiliar de odontología',4),(10,'Psicólogo clínico',5),(11,'Trabajador social',5),(12,'Fisioterapeuta',6),(13,'Terapista ocupacional',6),(14,'Nutricionista',7),(15,'Bacteriólogo',8),(16,'Técnico en laboratorio clínico',8),(17,'Regente de farmacia',9),(18,'Auxiliar de farmacia',9),(19,'Recepcionista',10),(20,'Técnico en admisión',10),(21,'Auxiliar contable',11),(22,'Auxiliar de facturación',11),(23,'Vigilante',12),(24,'Personal de aseo',12),(25,'Coordinador de calidad',13);
/*!40000 ALTER TABLE `cargos` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `categoria_licencia`
--

DROP TABLE IF EXISTS `categoria_licencia`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `categoria_licencia` (
  `id_categoria_licencia` int NOT NULL AUTO_INCREMENT,
  `nom_categoria` varchar(35) CHARACTER SET utf8mb4 COLLATE utf8mb4_spanish_ci NOT NULL,
  PRIMARY KEY (`id_categoria_licencia`),
  UNIQUE KEY `nom_categoria` (`nom_categoria`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_spanish_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `categoria_licencia`
--

LOCK TABLES `categoria_licencia` WRITE;
/*!40000 ALTER TABLE `categoria_licencia` DISABLE KEYS */;
/*!40000 ALTER TABLE `categoria_licencia` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `certificados`
--

DROP TABLE IF EXISTS `certificados`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `certificados` (
  `id_certificado` int NOT NULL AUTO_INCREMENT,
  `id_usuario` int NOT NULL,
  `id_contrato` int NOT NULL,
  `ruta_pdf` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_spanish_ci NOT NULL,
  `estado` enum('pendiente','enviado') CHARACTER SET utf8mb4 COLLATE utf8mb4_spanish_ci NOT NULL DEFAULT 'pendiente',
  `fecha_solicitud` timestamp NULL DEFAULT CURRENT_TIMESTAMP,
  `fecha_envio` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id_certificado`),
  KEY `id_usuario` (`id_usuario`),
  KEY `id_contrato` (`id_contrato`),
  CONSTRAINT `certificados_ibfk_1` FOREIGN KEY (`id_usuario`) REFERENCES `usuarios` (`id_usuario`),
  CONSTRAINT `certificados_ibfk_2` FOREIGN KEY (`id_contrato`) REFERENCES `contrato` (`id_contrato`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_spanish_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `certificados`
--

LOCK TABLES `certificados` WRITE;
/*!40000 ALTER TABLE `certificados` DISABLE KEYS */;
/*!40000 ALTER TABLE `certificados` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `contrato`
--

DROP TABLE IF EXISTS `contrato`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `contrato` (
  `id_contrato` int NOT NULL AUTO_INCREMENT,
  `fec_ingreso` date NOT NULL,
  `fec_finalizacion` date DEFAULT NULL,
  `funciones` text CHARACTER SET utf8mb4 COLLATE utf8mb4_spanish_ci,
  `salario` varchar(45) CHARACTER SET utf8mb4 COLLATE utf8mb4_spanish_ci NOT NULL,
  `clausulas` text CHARACTER SET utf8mb4 COLLATE utf8mb4_spanish_ci,
  `id_tip_contrato` int NOT NULL,
  `id_usuario` int NOT NULL,
  `id_tiemp_contrato` int NOT NULL,
  `id_est_contrato` int NOT NULL,
  PRIMARY KEY (`id_contrato`),
  KEY `id_tip_contrato` (`id_tip_contrato`),
  KEY `id_usuario` (`id_usuario`),
  KEY `id_tiemp_contrato` (`id_tiemp_contrato`),
  KEY `id_est_contrato` (`id_est_contrato`),
  CONSTRAINT `contrato_ibfk_1` FOREIGN KEY (`id_tip_contrato`) REFERENCES `tipo_contrato` (`id_tip_contrato`),
  CONSTRAINT `contrato_ibfk_2` FOREIGN KEY (`id_usuario`) REFERENCES `usuarios` (`id_usuario`),
  CONSTRAINT `contrato_ibfk_3` FOREIGN KEY (`id_tiemp_contrato`) REFERENCES `tiempo_contrato` (`id_tiemp_contrato`),
  CONSTRAINT `contrato_ibfk_4` FOREIGN KEY (`id_est_contrato`) REFERENCES `estado_contrato` (`id_est_contrato`)
) ENGINE=InnoDB AUTO_INCREMENT=24 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_spanish_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `contrato`
--

LOCK TABLES `contrato` WRITE;
/*!40000 ALTER TABLE `contrato` DISABLE KEYS */;
INSERT INTO `contrato` VALUES (20,'2024-01-01','2024-06-01','trabajar xd','1300000','no quejarse del trabajo xd',1,8,4,2),(21,'2024-06-02','2024-12-31',NULL,'1300000',NULL,1,8,4,2),(22,'2025-01-01',NULL,NULL,'1300000',NULL,2,8,9,1),(23,'2025-01-01',NULL,NULL,'1300000',NULL,1,10,6,1);
/*!40000 ALTER TABLE `contrato` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `departamentos`
--

DROP TABLE IF EXISTS `departamentos`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `departamentos` (
  `id_departamento` int NOT NULL AUTO_INCREMENT,
  `nom_departamento` varchar(80) CHARACTER SET utf8mb4 COLLATE utf8mb4_spanish_ci NOT NULL,
  PRIMARY KEY (`id_departamento`),
  KEY `nom_departamento` (`nom_departamento`) USING BTREE
) ENGINE=InnoDB AUTO_INCREMENT=34 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_spanish_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `departamentos`
--

LOCK TABLES `departamentos` WRITE;
/*!40000 ALTER TABLE `departamentos` DISABLE KEYS */;
INSERT INTO `departamentos` VALUES (29,'AMAZONAS'),(1,'ANTIOQUIA'),(25,'ARAUCA'),(2,'ATLÁNTICO'),(3,'BOGOTÁ, D.C.'),(4,'BOLÍVAR'),(5,'BOYACÁ'),(6,'CALDAS'),(7,'CAQUETÁ'),(26,'CASANARE'),(8,'CAUCA'),(9,'CESAR'),(12,'CHOCÓ'),(10,'CÓRDOBA'),(11,'CUNDINAMARCA'),(30,'GUANÍA'),(31,'GUAVIARE'),(13,'HUILA'),(28,'ISLAS SAN ANDRES Y PROVIDENCIA'),(14,'LA GUAJIRA'),(15,'MAGDALENA'),(16,'META'),(17,'NARIÑO'),(18,'NORTE DE SANTANDER'),(27,'PUTUMAYO'),(19,'QUINDIO'),(20,'RISARALDA'),(21,'SANTANDER'),(22,'SUCRE'),(23,'TOLIMA'),(24,'VALLE DEL CAUCA'),(32,'VAUPES'),(33,'VICHADA');
/*!40000 ALTER TABLE `departamentos` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `dependencias`
--

DROP TABLE IF EXISTS `dependencias`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `dependencias` (
  `id_dependencia` int NOT NULL AUTO_INCREMENT,
  `dependencia` varchar(45) CHARACTER SET utf8mb4 COLLATE utf8mb4_spanish_ci NOT NULL,
  PRIMARY KEY (`id_dependencia`),
  UNIQUE KEY `dependencia` (`dependencia`)
) ENGINE=InnoDB AUTO_INCREMENT=18 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_spanish_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `dependencias`
--

LOCK TABLES `dependencias` WRITE;
/*!40000 ALTER TABLE `dependencias` DISABLE KEYS */;
INSERT INTO `dependencias` VALUES (1,'Administracion'),(14,'Admisiones y Recepción'),(2,'Ambulancias'),(6,'Área Médica'),(17,'Calidad y Seguridad del Paciente'),(15,'Contabilidad y Facturación'),(4,'Domiciliaria'),(7,'Enfermería'),(13,'Farmacia'),(12,'Laboratorio Clínico'),(11,'Nutrición'),(8,'Odontología'),(9,'Psicología y Trabajo Social'),(5,'Recursos Humanos'),(10,'Rehabilitación y Terapias'),(16,'Servicios Generales'),(3,'Terapias');
/*!40000 ALTER TABLE `dependencias` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `documentos`
--

DROP TABLE IF EXISTS `documentos`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `documentos` (
  `id_documentos` int NOT NULL AUTO_INCREMENT,
  `nom_documento` varchar(45) CHARACTER SET utf8mb4 COLLATE utf8mb4_spanish_ci NOT NULL,
  `ruta_archivo` varchar(5000) CHARACTER SET utf8mb4 COLLATE utf8mb4_spanish_ci NOT NULL,
  `fecha_vencimiento` datetime DEFAULT NULL,
  `serial_unico` varchar(155) CHARACTER SET utf8mb4 COLLATE utf8mb4_spanish_ci NOT NULL,
  `estado` enum('pendiente','cargado','rechazado') CHARACTER SET utf8mb4 COLLATE utf8mb4_spanish_ci DEFAULT 'pendiente',
  `id_usuario` int NOT NULL,
  `id_tip_document` int NOT NULL,
  PRIMARY KEY (`id_documentos`),
  UNIQUE KEY `nom_documento` (`nom_documento`),
  KEY `id_usuario` (`id_usuario`),
  KEY `id_tip_document` (`id_tip_document`),
  CONSTRAINT `documentos_ibfk_1` FOREIGN KEY (`id_usuario`) REFERENCES `usuarios` (`id_usuario`),
  CONSTRAINT `documentos_ibfk_2` FOREIGN KEY (`id_tip_document`) REFERENCES `tipo_documento` (`id_tip_document`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_spanish_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `documentos`
--

LOCK TABLES `documentos` WRITE;
/*!40000 ALTER TABLE `documentos` DISABLE KEYS */;
/*!40000 ALTER TABLE `documentos` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `documentos_requeridos`
--

DROP TABLE IF EXISTS `documentos_requeridos`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `documentos_requeridos` (
  `id_doc_requerido` int NOT NULL AUTO_INCREMENT,
  `obligatorio` tinyint DEFAULT '1' COMMENT 'Si el documento es obligatorio la fecha de expiracion\n',
  `create_at` datetime DEFAULT CURRENT_TIMESTAMP,
  `id_cargo` int NOT NULL,
  `id_tip_document` int NOT NULL,
  `nom_documento` varchar(155) CHARACTER SET utf8mb4 COLLATE utf8mb4_spanish_ci DEFAULT NULL,
  PRIMARY KEY (`id_doc_requerido`),
  KEY `id_cargo` (`id_cargo`),
  KEY `id_tip_document` (`id_tip_document`),
  CONSTRAINT `documentos_requeridos_ibfk_1` FOREIGN KEY (`id_cargo`) REFERENCES `cargos` (`id_cargo`),
  CONSTRAINT `documentos_requeridos_ibfk_2` FOREIGN KEY (`id_tip_document`) REFERENCES `tipo_documento` (`id_tip_document`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_spanish_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `documentos_requeridos`
--

LOCK TABLES `documentos_requeridos` WRITE;
/*!40000 ALTER TABLE `documentos_requeridos` DISABLE KEYS */;
/*!40000 ALTER TABLE `documentos_requeridos` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `eps`
--

DROP TABLE IF EXISTS `eps`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `eps` (
  `id_eps` int NOT NULL AUTO_INCREMENT,
  `nom_eps` varchar(100) CHARACTER SET utf8mb4 COLLATE utf8mb4_spanish_ci NOT NULL,
  PRIMARY KEY (`id_eps`),
  UNIQUE KEY `nom_eps` (`nom_eps`)
) ENGINE=InnoDB AUTO_INCREMENT=13 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_spanish_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `eps`
--

LOCK TABLES `eps` WRITE;
/*!40000 ALTER TABLE `eps` DISABLE KEYS */;
INSERT INTO `eps` VALUES (10,'Aliansalud'),(5,'Compensar'),(7,'Coosalud'),(9,'Emssanar'),(6,'Famisanar'),(11,'Mutual Ser'),(1,'Nueva EPS'),(4,'Salud Total EPS'),(3,'Sanitas'),(12,'Savia Salud'),(8,'SOS'),(2,'SURA EPS');
/*!40000 ALTER TABLE `eps` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `estado_contrato`
--

DROP TABLE IF EXISTS `estado_contrato`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `estado_contrato` (
  `id_est_contrato` int NOT NULL AUTO_INCREMENT,
  `nom_est_contrato` varchar(45) CHARACTER SET utf8mb4 COLLATE utf8mb4_spanish_ci NOT NULL,
  PRIMARY KEY (`id_est_contrato`),
  UNIQUE KEY `nom_est_contrato` (`nom_est_contrato`)
) ENGINE=InnoDB AUTO_INCREMENT=13 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_spanish_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `estado_contrato`
--

LOCK TABLES `estado_contrato` WRITE;
/*!40000 ALTER TABLE `estado_contrato` DISABLE KEYS */;
INSERT INTO `estado_contrato` VALUES (10,'Cancelado'),(9,'En negociacion'),(7,'En prueba'),(2,'Finalizado'),(8,'Inactivo'),(4,'Renovado'),(6,'Rescindido'),(3,'Suspendido'),(11,'Terminado por justa causa'),(12,'Terminado sin justa causa'),(5,'Vencido'),(1,'Vigente');
/*!40000 ALTER TABLE `estado_contrato` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `estado_licencia`
--

DROP TABLE IF EXISTS `estado_licencia`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `estado_licencia` (
  `id_estado_licencia` int NOT NULL AUTO_INCREMENT,
  `nom_estado_licencia` varchar(45) CHARACTER SET utf8mb4 COLLATE utf8mb4_spanish_ci NOT NULL,
  PRIMARY KEY (`id_estado_licencia`),
  UNIQUE KEY `nom_estado_licencia` (`nom_estado_licencia`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_spanish_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `estado_licencia`
--

LOCK TABLES `estado_licencia` WRITE;
/*!40000 ALTER TABLE `estado_licencia` DISABLE KEYS */;
/*!40000 ALTER TABLE `estado_licencia` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `estado_usuario`
--

DROP TABLE IF EXISTS `estado_usuario`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `estado_usuario` (
  `id_estado` int NOT NULL AUTO_INCREMENT,
  `nom_estado` varchar(155) CHARACTER SET utf8mb4 COLLATE utf8mb4_spanish_ci NOT NULL COMMENT 'Activo, Desvinculado, etc..',
  PRIMARY KEY (`id_estado`),
  UNIQUE KEY `nom_estado` (`nom_estado`)
) ENGINE=InnoDB AUTO_INCREMENT=11 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_spanish_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `estado_usuario`
--

LOCK TABLES `estado_usuario` WRITE;
/*!40000 ALTER TABLE `estado_usuario` DISABLE KEYS */;
INSERT INTO `estado_usuario` VALUES (1,'Activo'),(2,'Desvinculado'),(4,'En Licencia'),(7,'En Periodo de Prueba'),(6,'En Vacaciones'),(3,'Incapacitado'),(5,'Suspendido'),(8,'Teletrabajo'),(9,'Trabajo en Casa'),(10,'Trabajo Remoto');
/*!40000 ALTER TABLE `estado_usuario` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `failed_jobs`
--

DROP TABLE IF EXISTS `failed_jobs`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `failed_jobs` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `uuid` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `connection` text CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `queue` text CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `payload` longtext CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `exception` longtext CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `failed_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`),
  UNIQUE KEY `failed_jobs_uuid_unique` (`uuid`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `failed_jobs`
--

LOCK TABLES `failed_jobs` WRITE;
/*!40000 ALTER TABLE `failed_jobs` DISABLE KEYS */;
/*!40000 ALTER TABLE `failed_jobs` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `historial_certificados`
--

DROP TABLE IF EXISTS `historial_certificados`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `historial_certificados` (
  `id_certificado` int NOT NULL AUTO_INCREMENT,
  `id_contrato` int NOT NULL,
  `motivo` text CHARACTER SET utf8mb4 COLLATE utf8mb4_spanish_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`id_certificado`),
  KEY `id_contrato` (`id_contrato`),
  CONSTRAINT `historial_certificados_ibfk_1` FOREIGN KEY (`id_contrato`) REFERENCES `contrato` (`id_contrato`) ON DELETE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=18 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_spanish_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `historial_certificados`
--

LOCK TABLES `historial_certificados` WRITE;
/*!40000 ALTER TABLE `historial_certificados` DISABLE KEYS */;
INSERT INTO `historial_certificados` VALUES (14,23,'embarazo','2025-06-11 18:52:25'),(15,20,'certificado','2025-06-11 18:54:48'),(16,21,'certificado','2025-06-11 18:54:51'),(17,22,'Holanda','2025-06-23 19:59:03');
/*!40000 ALTER TABLE `historial_certificados` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `job_batches`
--

DROP TABLE IF EXISTS `job_batches`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
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
  `finished_at` int DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `job_batches`
--

LOCK TABLES `job_batches` WRITE;
/*!40000 ALTER TABLE `job_batches` DISABLE KEYS */;
/*!40000 ALTER TABLE `job_batches` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `jobs`
--

DROP TABLE IF EXISTS `jobs`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `jobs` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `queue` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `payload` longtext CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `attempts` tinyint unsigned NOT NULL,
  `reserved_at` int unsigned DEFAULT NULL,
  `available_at` int unsigned NOT NULL,
  `created_at` int unsigned NOT NULL,
  PRIMARY KEY (`id`),
  KEY `jobs_queue_index` (`queue`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `jobs`
--

LOCK TABLES `jobs` WRITE;
/*!40000 ALTER TABLE `jobs` DISABLE KEYS */;
/*!40000 ALTER TABLE `jobs` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `licencia_conduccion`
--

DROP TABLE IF EXISTS `licencia_conduccion`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `licencia_conduccion` (
  `id_licencia` int NOT NULL AUTO_INCREMENT,
  `numero_licencia` varchar(20) CHARACTER SET utf8mb4 COLLATE utf8mb4_spanish_ci NOT NULL,
  `fecha_expedicion` date NOT NULL,
  `fecha_vencimiento` date NOT NULL,
  `id_estado_licencia` int NOT NULL,
  `id_categoria_licencia` int NOT NULL,
  `id_usuario` int NOT NULL,
  PRIMARY KEY (`id_licencia`),
  UNIQUE KEY `numero_licencia` (`numero_licencia`),
  KEY `id_estado_licencia` (`id_estado_licencia`),
  KEY `id_categoria_licencia` (`id_categoria_licencia`),
  KEY `id_usuario` (`id_usuario`),
  CONSTRAINT `licencia_conduccion_ibfk_1` FOREIGN KEY (`id_estado_licencia`) REFERENCES `estado_licencia` (`id_estado_licencia`),
  CONSTRAINT `licencia_conduccion_ibfk_2` FOREIGN KEY (`id_categoria_licencia`) REFERENCES `categoria_licencia` (`id_categoria_licencia`),
  CONSTRAINT `licencia_conduccion_ibfk_3` FOREIGN KEY (`id_usuario`) REFERENCES `usuarios` (`id_usuario`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_spanish_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `licencia_conduccion`
--

LOCK TABLES `licencia_conduccion` WRITE;
/*!40000 ALTER TABLE `licencia_conduccion` DISABLE KEYS */;
/*!40000 ALTER TABLE `licencia_conduccion` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `migrations`
--

DROP TABLE IF EXISTS `migrations`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `migrations` (
  `id` int unsigned NOT NULL AUTO_INCREMENT,
  `migration` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `batch` int NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `migrations`
--

LOCK TABLES `migrations` WRITE;
/*!40000 ALTER TABLE `migrations` DISABLE KEYS */;
INSERT INTO `migrations` VALUES (1,'0001_01_01_000000_create_users_table',1),(2,'0001_01_01_000001_create_cache_table',1),(3,'0001_01_01_000002_create_jobs_table',1);
/*!40000 ALTER TABLE `migrations` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `municipio`
--

DROP TABLE IF EXISTS `municipio`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `municipio` (
  `id_municipio` int NOT NULL AUTO_INCREMENT,
  `nom_municipio` varchar(45) CHARACTER SET utf8mb4 COLLATE utf8mb4_spanish_ci NOT NULL,
  `id_departamento` int NOT NULL,
  PRIMARY KEY (`id_municipio`),
  KEY `nom_municipio` (`nom_municipio`) USING BTREE
) ENGINE=InnoDB AUTO_INCREMENT=1123 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_spanish_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `municipio`
--

LOCK TABLES `municipio` WRITE;
/*!40000 ALTER TABLE `municipio` DISABLE KEYS */;
INSERT INTO `municipio` VALUES (1,'Medellín',1),(2,'Abejorral',1),(3,'Abriaquí',1),(4,'Alejandría',1),(5,'Amagá',1),(6,'Amalfi',1),(7,'Andes',1),(8,'Angelópolis',1),(9,'Angostura',1),(10,'Anorí',1),(11,'Santafé de Antioquia',1),(12,'Anza',1),(13,'Apartadó',1),(14,'Arboletes',1),(15,'Argelia',1),(16,'Armenia',1),(17,'Barbosa',1),(18,'Bello',1),(19,'Betania',1),(20,'Betulia',1),(21,'Briceño',1),(22,'Buriticá',1),(23,'Cáceres',1),(24,'Caicedo',1),(25,'Caldas',1),(26,'Campamento',1),(27,'Cañasgordas',1),(28,'Caracolí',1),(29,'Caramanta',1),(30,'Carepa',1),(31,'El Carmen de Viboral',1),(32,'Carolina',1),(33,'Caucasia',1),(34,'Chigorodó',1),(35,'Cisneros',1),(36,'Cocorná',1),(37,'Concepción',1),(38,'Concordia',1),(39,'Copacabana',1),(40,'Dabeiba',1),(41,'Donmatías',1),(42,'Ebéjico',1),(43,'El Bagre',1),(44,'Entrerríos',1),(45,'Envigado',1),(46,'Fredonia',1),(47,'Frontino',1),(48,'Giraldo',1),(49,'Girardota',1),(50,'Gómez Plata',1),(51,'Granada',1),(52,'Guadalupe',1),(53,'Guarne',1),(54,'Guatapé',1),(55,'Heliconia',1),(56,'Hispania',1),(57,'Itagüí',1),(58,'Ituango',1),(59,'Jardín',1),(60,'Jericó',1),(61,'La Ceja',1),(62,'La Estrella',1),(63,'La Pintada',1),(64,'La Unión',1),(65,'Liborina',1),(66,'Maceo',1),(67,'Marinilla',1),(68,'Montebello',1),(69,'Murindó',1),(70,'Mutatá',1),(71,'Nariño',1),(72,'Nechí',1),(73,'Olaya',1),(74,'Peñol',1),(75,'Peque',1),(76,'Pueblorrico',1),(77,'Puerto Berrío',1),(78,'Puerto Nare',1),(79,'Puerto Triunfo',1),(80,'Remedios',1),(81,'Retiro',1),(82,'Rionegro',1),(83,'Sabanalarga',1),(84,'Sabaneta',1),(85,'Salgar',1),(86,'San Andrés de Cuerquia',1),(87,'San Carlos',1),(88,'San Francisco',1),(89,'San Jerónimo',1),(90,'San José de la Montaña',1),(91,'San Juan de Urabá',1),(92,'San Luis',1),(93,'San Pedro',1),(94,'San Pedro de Urabá',1),(95,'San Rafael',1),(96,'San Roque',1),(97,'San Vicente',1),(98,'Santa Bárbara',1),(99,'Santa Rosa de Osos',1),(100,'Santo Domingo',1),(101,'El Santuario',1),(102,'Segovia',1),(103,'Sonsón',1),(104,'Sopetrán',1),(105,'Támesis',1),(106,'Tarazá',1),(107,'Tarso',1),(108,'Titiribí',1),(109,'Toledo',1),(110,'Turbo',1),(111,'Uramita',1),(112,'Urrao',1),(113,'Valdivia',1),(114,'Valparaíso',1),(115,'Vegachí',1),(116,'Venecia',1),(117,'Vigía del Fuerte',1),(118,'Yalí',1),(119,'Yarumal',1),(120,'Yolombó',1),(121,'Yondó',1),(122,'Zaragoza',1),(125,'Barranquilla',2),(126,'Baranoa',2),(127,'Campo de la Cruz',2),(128,'Candelaria',2),(129,'Galapa',2),(130,'Juan de Acosta',2),(131,'Luruaco',2),(132,'Malambo',2),(133,'Manatí',2),(134,'Palmar de Varela',2),(135,'Piojó',2),(136,'Polonuevo',2),(137,'Ponedera',2),(138,'Puerto Colombia',2),(139,'Repelón',2),(140,'Sabanagrande',2),(141,'Sabanalarga',2),(142,'Santa Lucía',2),(143,'Santo Tomás',2),(144,'Soledad',2),(145,'Suán',2),(146,'Tubará',2),(147,'Usiacurí',2),(164,'Sabanalarga',2),(165,'Santa Lucía',2),(166,'Santo Tomás',2),(167,'Soledad',2),(168,'Suán',2),(171,'Bogotá, D.C.',3),(172,'Cartagena',4),(173,'Achí',4),(174,'Altos del Rosario',4),(175,'Arenal',4),(176,'Arjona',4),(177,'Arroyohondo',4),(178,'Barranco de Loba',4),(179,'Calamar',4),(180,'Cantagallo',4),(181,'Cicuco',4),(182,'Clemencia',4),(183,'Córdoba',4),(184,'El Carmen de Bolívar',4),(185,'El Guamo',4),(186,'El Peñón',4),(187,'Hatillo de Loba',4),(188,'Magangué',4),(189,'Mahates',4),(190,'Margarita',4),(191,'María la Baja',4),(192,'Mompós',4),(193,'Montecristo',4),(194,'Morales',4),(195,'Norosí',4),(196,'Pinillos',4),(197,'Regidor',4),(198,'Río Viejo',4),(199,'San Cristóbal',4),(200,'San Estanislao',4),(201,'San Fernando',4),(202,'San Jacinto',4),(203,'San Jacinto del Cauca',4),(204,'San Juan Nepomuceno',4),(205,'San Martín de Loba',4),(206,'San Pablo',4),(207,'Santa Catalina',4),(208,'Santa Rosa',4),(209,'Santa Rosa del Sur',4),(210,'Simití',4),(211,'Soplaviento',4),(212,'Talaigua Nuevo',4),(213,'Tiquisio',4),(214,'Turbaco',4),(215,'Turbaná',4),(216,'Villanueva',4),(217,'Zambrano',4),(218,'Tunja',5),(219,'Almeida',5),(220,'Aquitania',5),(221,'Arcabuco',5),(222,'Belén',5),(223,'Berbeo',5),(224,'Betéitiva',5),(225,'Boavita',5),(226,'Boyacá',5),(227,'Briceño',5),(228,'Buenavista',5),(229,'Busbanzá',5),(230,'Caldas',5),(231,'Campohermoso',5),(232,'Cerinza',5),(233,'Chinavita',5),(234,'Chiquinquirá',5),(235,'Chíquiza',5),(236,'Chiscas',5),(237,'Chita',5),(238,'Chitaraque',5),(239,'Chivatá',5),(240,'Ciénega',5),(241,'Cómbita',5),(242,'Coper',5),(243,'Corrales',5),(244,'Covarachía',5),(245,'Cubará',5),(246,'Cucaita',5),(247,'Cuitiva',5),(248,'El Cocuy',5),(249,'El Espino',5),(250,'Firavitoba',5),(251,'Floresta',5),(252,'Gachantivá',5),(253,'Gámeza',5),(254,'Garagoa',5),(255,'Guacamayas',5),(256,'Guateque',5),(257,'Guayatá',5),(258,'Güicán',5),(259,'Iza',5),(260,'Jenesano',5),(261,'Jericó',5),(262,'La Capilla',5),(263,'La Uvita',5),(264,'La Victoria',5),(265,'Labranzagrande',5),(266,'Macanal',5),(267,'Maripí',5),(268,'Miraflores',5),(269,'Mongua',5),(270,'Monguí',5),(271,'Moniquirá',5),(272,'Motavita',5),(273,'Muzo',5),(274,'Nobsa',5),(275,'Nuevo Colón',5),(276,'Oicatá',5),(277,'Otanche',5),(278,'Pachavita',5),(279,'Páez',5),(280,'Paipa',5),(281,'Pajarito',5),(282,'Panqueba',5),(283,'Pauna',5),(284,'Paya',5),(285,'Paz de Río',5),(286,'Pesca',5),(287,'Pisba',5),(288,'Puerto Boyacá',5),(289,'Quípama',5),(290,'Ramiriquí',5),(291,'Ráquira',5),(292,'Rondón',5),(293,'Saboyá',5),(294,'Sáchica',5),(295,'Samacá',5),(296,'San Eduardo',5),(297,'San José de Pare',5),(298,'San Luis de Gaceno',5),(299,'San Mateo',5),(300,'San Miguel de Sema',5),(301,'San Pablo de Borbur',5),(302,'Santa María',5),(303,'Santa Rosa de Viterbo',5),(304,'Santa Sofía',5),(305,'Santana',5),(306,'Sativanorte',5),(307,'Sativasur',5),(308,'Siachoque',5),(309,'Soatá',5),(310,'Socha',5),(311,'Socotá',5),(312,'Sogamoso',5),(313,'Somondoco',5),(314,'Sora',5),(315,'Sotaquirá',5),(316,'Soracá',5),(317,'Susacón',5),(318,'Sutamarchán',5),(319,'Sutatenza',5),(320,'Tasco',5),(321,'Tenza',5),(322,'Tibaná',5),(323,'Tibasosa',5),(324,'Tinjacá',5),(325,'Tipacoque',5),(326,'Toca',5),(327,'Togüí',5),(328,'Tópaga',5),(329,'Tota',5),(330,'Tunungua',5),(331,'Turmequé',5),(332,'Tuta',5),(333,'Tutazá',5),(334,'Úmbita',5),(335,'Ventaquemada',5),(336,'Villa de Leyva',5),(337,'Viracachá',5),(338,'Zetaquira',5),(339,'Manizales',6),(340,'Aguadas',6),(341,'Anserma',6),(342,'Aranzazu',6),(343,'Belalcázar',6),(344,'Chinchiná',6),(345,'Filadelfia',6),(346,'La Dorada',6),(347,'La Merced',6),(348,'Manzanares',6),(349,'Marmato',6),(350,'Marquetalia',6),(351,'Marulanda',6),(352,'Neira',6),(353,'Norcasia',6),(354,'Pácora',6),(355,'Palestina',6),(356,'Pensilvania',6),(357,'Riosucio',6),(358,'Risaralda',6),(359,'Salamina',6),(360,'Samaná',6),(361,'San José',6),(362,'Supía',6),(363,'Victoria',6),(364,'Villamaría',6),(365,'Viterbo',6),(366,'Florencia',7),(367,'Albania',7),(368,'Belén de los Andaquíes',7),(369,'Cartagena del Chairá',7),(370,'Curillo',7),(371,'El Doncello',7),(372,'El Paujil',7),(373,'La Montañita',7),(374,'Milán',7),(375,'Morelia',7),(376,'Puerto Rico',7),(377,'San José del Fragua',7),(378,'San Vicente del Caguán',7),(379,'Solano',7),(380,'Solita',7),(381,'Valparaíso',7),(382,'Popayán',8),(383,'Almaguer',8),(384,'Argelia',8),(385,'Balboa',8),(386,'Bolívar',8),(387,'Buenos Aires',8),(388,'Cajibío',8),(389,'Caldono',8),(390,'Caloto',8),(391,'Corinto',8),(392,'El Tambo',8),(393,'Florencia',8),(394,'Guachené',8),(395,'Guapí',8),(396,'Inzá',8),(397,'Jambaló',8),(398,'La Sierra',8),(399,'La Vega',8),(400,'López',8),(401,'Mercaderes',8),(402,'Miranda',8),(403,'Morales',8),(404,'Padilla',8),(405,'Páez',8),(406,'Patía',8),(407,'Piamonte',8),(408,'Piendamó',8),(409,'Puerto Tejada',8),(410,'Puracé',8),(411,'Rosas',8),(412,'San Sebastián',8),(413,'Santa Rosa',8),(414,'Santander de Quilichao',8),(415,'Silvia',8),(416,'Sotará',8),(417,'Suárez',8),(418,'Sucre',8),(419,'Timbío',8),(420,'Timbiquí',8),(421,'Toribío',8),(422,'Totoró',8),(423,'Villa Rica',8),(424,'Valledupar',9),(425,'Aguachica',9),(426,'Agustín Codazzi',9),(427,'Astrea',9),(428,'Becerril',9),(429,'Bosconia',9),(430,'Chimichagua',9),(431,'Chiriguaná',9),(432,'Curumaní',9),(433,'El Copey',9),(434,'El Paso',9),(435,'Gamarra',9),(436,'González',9),(437,'La Gloria',9),(438,'La Jagua de Ibirico',9),(439,'La Paz',9),(440,'Manaure Balcón del Cesar',9),(441,'Pailitas',9),(442,'Pelaya',9),(443,'Pueblo Bello',9),(444,'Río de Oro',9),(445,'San Alberto',9),(446,'San Diego',9),(447,'San Martín',9),(448,'Tamalameque',9),(449,'Montería',10),(450,'Ayapel',10),(451,'Buenavista',10),(452,'Canalete',10),(453,'Cereté',10),(454,'Chimá',10),(455,'Chinú',10),(456,'Ciénaga de Oro',10),(457,'Cotorra',10),(458,'La Apartada',10),(459,'Lorica',10),(460,'Los Córdobas',10),(461,'Momil',10),(462,'Montelíbano',10),(463,'Moñitos',10),(464,'Planeta Rica',10),(465,'Pueblo Nuevo',10),(466,'Puerto Escondido',10),(467,'Puerto Libertador',10),(468,'Purísima',10),(469,'Sahagún',10),(470,'San Andrés Sotavento',10),(471,'San Antero',10),(472,'San Bernardo del Viento',10),(473,'San Carlos',10),(474,'San José de Uré',10),(475,'San Pelayo',10),(476,'Tierralta',10),(477,'Tuchín',10),(478,'Valencia',10),(479,'Agua de Dios',11),(480,'Albán',11),(481,'Anapoima',11),(482,'Anolaima',11),(483,'Arbeláez',11),(484,'Beltrán',11),(485,'Bituima',11),(486,'Bojacá',11),(487,'Cabrera',11),(488,'Cachipay',11),(489,'Cajicá',11),(490,'Caparrapí',11),(491,'Caqueza',11),(492,'Carmen de Carupa',11),(493,'Chaguaní',11),(494,'Chía',11),(495,'Chipaque',11),(496,'Choachí',11),(497,'Chocontá',11),(498,'Cogua',11),(499,'Cota',11),(500,'Cucunubá',11),(501,'El Colegio',11),(502,'El Peñón',11),(503,'El Rosal',11),(504,'Facatativá',11),(505,'Fómeque',11),(506,'Fosca',11),(507,'Funza',11),(508,'Fúquene',11),(509,'Fusagasugá',11),(510,'Gachala',11),(511,'Gachancipá',11),(512,'Gachetá',11),(513,'Gama',11),(514,'Girardot',11),(515,'Granada',11),(516,'Guachetá',11),(517,'Guaduas',11),(518,'Guasca',11),(519,'Guataquí',11),(520,'Guatavita',11),(521,'Guayabal de Siquima',11),(522,'Guayabetal',11),(523,'Gutiérrez',11),(524,'Jerusalén',11),(525,'Junín',11),(526,'La Calera',11),(527,'La Mesa',11),(528,'La Palma',11),(529,'La Peña',11),(530,'La Vega',11),(531,'Lenguazaque',11),(532,'Machetá',11),(533,'Madrid',11),(534,'Manta',11),(535,'Medina',11),(536,'Mosquera',11),(537,'Nariño',11),(538,'Nemocón',11),(539,'Nilo',11),(540,'Nimaima',11),(541,'Nocaima',11),(542,'Pacho',11),(543,'Paime',11),(544,'Pandi',11),(545,'Paratebueno',11),(546,'Pasca',11),(547,'Puerto Salgar',11),(548,'Pulí',11),(549,'Quebradanegra',11),(550,'Quetame',11),(551,'Quipile',11),(552,'Apulo',11),(553,'Ricaurte',11),(554,'San Antonio del Tequendama',11),(555,'San Bernardo',11),(556,'San Cayetano',11),(557,'San Francisco',11),(558,'San Juan de Rioseco',11),(559,'Sasaima',11),(560,'Sesquilé',11),(561,'Sibaté',11),(562,'Silvania',11),(563,'Simijaca',11),(564,'Soacha',11),(565,'Sopó',11),(566,'Subachoque',11),(567,'Suesca',11),(568,'Supatá',11),(569,'Susa',11),(570,'Sutatausa',11),(571,'Tabio',11),(572,'Tausa',11),(573,'Tena',11),(574,'Tenjo',11),(575,'Tibacuy',11),(576,'Tibirita',11),(577,'Tocaima',11),(578,'Tocancipá',11),(579,'Topaipí',11),(580,'Ubalá',11),(581,'Ubaque',11),(582,'Ubaté',11),(583,'Une',11),(584,'Útica',11),(585,'Venecia',11),(586,'Vergara',11),(587,'Vianí',11),(588,'Villagómez',11),(589,'Villapinzón',11),(590,'Villeta',11),(591,'Viotá',11),(592,'Yacopí',11),(593,'Zipacón',11),(594,'Zipaquirá',11),(595,'Nóvita',12),(596,'Nuquí',12),(597,'Río Iró',12),(598,'Río Quito',12),(599,'Riosucio',12),(600,'San José del Palmar',12),(601,'Sipí',12),(602,'Tadó',12),(603,'Ungía',12),(604,'Unión Panamericana',12),(605,'Neiva',13),(606,'Acevedo',13),(607,'Agrado',13),(608,'Aipe',13),(609,'Algeciras',13),(610,'Altamira',13),(611,'Baraya',13),(612,'Campoalegre',13),(613,'Colombia',13),(614,'Elías',13),(615,'Garzón',13),(616,'Gigante',13),(617,'Guadalupe',13),(618,'Hobo',13),(619,'Iquira',13),(620,'Isnos',13),(621,'La Argentina',13),(622,'La Plata',13),(623,'Nátaga',13),(624,'Oporapa',13),(625,'Paicol',13),(626,'Palermo',13),(627,'Palestina',13),(628,'Pital',13),(629,'Pitalito',13),(630,'Rivera',13),(631,'Saladoblanco',13),(632,'San Agustín',13),(633,'Santa María',13),(634,'Suaza',13),(635,'Tarqui',13),(636,'Tello',13),(637,'Teruel',13),(638,'Tesalia',13),(639,'Timaná',13),(640,'Villavieja',13),(641,'Yaguará',13),(642,'Riohacha',14),(643,'Albania',14),(644,'Barrancas',14),(645,'Dibulla',14),(646,'Distracción',14),(647,'El Molino',14),(648,'Fonseca',14),(649,'Hatonuevo',14),(650,'La Jagua del Pilar',14),(651,'Maicao',14),(652,'Manaure',14),(653,'San Juan del Cesar',14),(654,'Uribia',14),(655,'Urumita',14),(656,'Villanueva',14),(657,'Santa Marta',15),(658,'Algarrobo',15),(659,'Aracataca',15),(660,'Ariguaní',15),(661,'Cerro San Antonio',15),(662,'Chibolo',15),(663,'Ciénaga',15),(664,'Concordia',15),(665,'El Banco',15),(666,'El Piñón',15),(667,'El Retén',15),(668,'Fundación',15),(669,'Guamal',15),(670,'Nueva Granada',15),(671,'Pedraza',15),(672,'Pijiño del Carmen',15),(673,'Pivijay',15),(674,'Plato',15),(675,'Puebloviejo',15),(676,'Remolino',15),(677,'Sabanas de San Ángel',15),(678,'Salamina',15),(679,'San Sebastián de Buenavista',15),(680,'San Zenón',15),(681,'Santa Ana',15),(682,'Santa Bárbara de Pinto',15),(683,'Sitionuevo',15),(684,'Tenerife',15),(685,'Zapayán',15),(686,'Zona Bananera',15),(687,'Villavicencio',16),(688,'Acacías',16),(689,'Barranca de Upía',16),(690,'Cabuyaro',16),(691,'Castilla La Nueva',16),(692,'Cubarral',16),(693,'Cumaral',16),(694,'El Calvario',16),(695,'El Castillo',16),(696,'El Dorado',16),(697,'Fuente de Oro',16),(698,'Granada',16),(699,'Guamal',16),(700,'La Macarena',16),(701,'Lejanías',16),(702,'Mapiripán',16),(703,'Mesetas',16),(704,'Puerto Concordia',16),(705,'Puerto Gaitán',16),(706,'Puerto Lleras',16),(707,'Puerto López',16),(708,'Puerto Rico',16),(709,'Restrepo',16),(710,'San Carlos de Guaroa',16),(711,'San Juan de Arama',16),(712,'San Juanito',16),(713,'San Martín',16),(714,'Uribe',16),(715,'Vistahermosa',16),(716,'Pasto',17),(717,'Albán',17),(718,'Aldana',17),(719,'Ancuyá',17),(720,'Arboleda',17),(721,'Barbacoas',17),(722,'Belén',17),(723,'Buesaco',17),(724,'Chachagüí',17),(725,'Colón',17),(726,'Consacá',17),(727,'Contadero',17),(728,'Córdoba',17),(729,'Cuaspud',17),(730,'Cumbal',17),(731,'Cumbitara',17),(732,'El Charco',17),(733,'El Peñol',17),(734,'El Rosario',17),(735,'El Tablón de Gómez',17),(736,'El Tambo',17),(737,'Francisco Pizarro',17),(738,'Funes',17),(739,'Guachucal',17),(740,'Guaitarilla',17),(741,'Gualmatán',17),(742,'Iles',17),(743,'Imués',17),(744,'Ipiales',17),(745,'La Cruz',17),(746,'La Florida',17),(747,'La Llanada',17),(748,'La Tola',17),(749,'La Unión',17),(750,'Leiva',17),(751,'Linares',17),(752,'Los Andes',17),(753,'Magüí',17),(754,'Mallama',17),(755,'Mosquera',17),(756,'Nariño',17),(757,'Olaya Herrera',17),(758,'Ospina',17),(759,'Policarpa',17),(760,'Potosí',17),(761,'Providencia',17),(762,'Puerres',17),(763,'Pupiales',17),(764,'Ricaurte',17),(765,'Roberto Payán',17),(766,'Samaniego',17),(767,'San Bernardo',17),(768,'San Lorenzo',17),(769,'San Pablo',17),(770,'San Pedro de Cartago',17),(771,'Sandoná',17),(772,'Santa Bárbara',17),(773,'Santacruz',17),(774,'Sapuyes',17),(775,'Taminango',17),(776,'Tangua',17),(777,'Tumaco',17),(778,'Túquerres',17),(779,'Yacuanquer',17),(780,'Cúcuta',18),(781,'Abrego',18),(782,'Arboledas',18),(783,'Bochalema',18),(784,'Bucarasica',18),(785,'Cácota',18),(786,'Cachirá',18),(787,'Chinácota',18),(788,'Chitagá',18),(789,'Convención',18),(790,'Cucutilla',18),(791,'Duranía',18),(792,'El Carmen',18),(793,'El Tarra',18),(794,'El Zulia',18),(795,'Gramalote',18),(796,'Hacarí',18),(797,'Herrán',18),(798,'La Esperanza',18),(799,'La Playa',18),(800,'Labateca',18),(801,'Los Patios',18),(802,'Lourdes',18),(803,'Mutiscua',18),(804,'Ocaña',18),(805,'Pamplona',18),(806,'Pamplonita',18),(807,'Puerto Santander',18),(808,'Ragonvalia',18),(809,'Salazar de Las Palmas',18),(810,'San Calixto',18),(811,'San Cayetano',18),(812,'Santiago',18),(813,'Sardinata',18),(814,'Silos',18),(815,'Teorama',18),(816,'Tibú',18),(817,'Toledo',18),(818,'Villa Caro',18),(819,'Villa del Rosario',18),(820,'Armenia',19),(821,'Buenavista',19),(822,'Calarcá',19),(823,'Circasia',19),(824,'Córdoba',19),(825,'Filandia',19),(826,'Génova',19),(827,'La Tebaida',19),(828,'Montenegro',19),(829,'Pijao',19),(830,'Quimbaya',19),(831,'Salento',19),(832,'Pereira',20),(833,'Apía',20),(834,'Balboa',20),(835,'Belén de Umbría',20),(836,'Dosquebradas',20),(837,'Guática',20),(838,'La Celia',20),(839,'La Virginia',20),(840,'Marsella',20),(841,'Mistrató',20),(842,'Pueblo Rico',20),(843,'Quinchía',20),(844,'Santa Rosa de Cabal',20),(845,'Santuario',20),(846,'Bucaramanga',21),(847,'Aguada',21),(848,'Albania',21),(849,'Aratoca',21),(850,'Barbosa',21),(851,'Barichara',21),(852,'Barrancabermeja',21),(853,'Betulia',21),(854,'Bolívar',21),(855,'Cabrera',21),(856,'California',21),(857,'Capitanejo',21),(858,'Carcasí',21),(859,'Cepitá',21),(860,'Cerrito',21),(861,'Charalá',21),(862,'Charta',21),(863,'Chima',21),(864,'Chipatá',21),(865,'Cimitarra',21),(866,'Concepción',21),(867,'Confines',21),(868,'Contratación',21),(869,'Coromoro',21),(870,'Curití',21),(871,'El Carmen de Chucurí',21),(872,'El Guacamayo',21),(873,'El Peñón',21),(874,'El Playón',21),(875,'Encino',21),(876,'Enciso',21),(877,'Florián',21),(878,'Floridablanca',21),(879,'Galán',21),(880,'Gámbita',21),(881,'Girón',21),(882,'Guaca',21),(883,'Guadalupe',21),(884,'Guapotá',21),(885,'Guavatá',21),(886,'Güepsa',21),(887,'Hato',21),(888,'Jesús María',21),(889,'Jordán',21),(890,'La Belleza',21),(891,'La Paz',21),(892,'Landázuri',21),(893,'Lebrija',21),(894,'Los Santos',21),(895,'Macaravita',21),(896,'Málaga',21),(897,'Matanza',21),(898,'Mogotes',21),(899,'Molagavita',21),(900,'Ocamonte',21),(901,'Oiba',21),(902,'Onzaga',21),(903,'Palmar',21),(904,'Palmas del Socorro',21),(905,'Páramo',21),(906,'Piedecuesta',21),(907,'Pinchote',21),(908,'Puente Nacional',21),(909,'Puerto Parra',21),(910,'Puerto Wilches',21),(911,'Rionegro',21),(912,'Sabana de Torres',21),(913,'San Andrés',21),(914,'San Benito',21),(915,'San Gil',21),(916,'San Joaquín',21),(917,'San José de Miranda',21),(918,'San Miguel',21),(919,'San Vicente de Chucurí',21),(920,'Santa Bárbara',21),(921,'Santa Helena del Opón',21),(922,'Simacota',21),(923,'Socorro',21),(924,'Suaita',21),(925,'Sucre',21),(926,'Suratá',21),(927,'Tona',21),(928,'Valle de San José',21),(929,'Vélez',21),(930,'Vetas',21),(931,'Villanueva',21),(932,'Zapatoca',21),(933,'Sincelejo',22),(934,'Buenavista',22),(935,'Caimito',22),(936,'Chalán',22),(937,'Colosó',22),(938,'Corozal',22),(939,'Coveñas',22),(940,'El Roble',22),(941,'Galeras',22),(942,'Guaranda',22),(943,'La Unión',22),(944,'Los Palmitos',22),(945,'Majagual',22),(946,'Morroa',22),(947,'Ovejas',22),(948,'Palmito',22),(949,'Sampués',22),(950,'San Benito Abad',22),(951,'San Juan de Betulia',22),(952,'San Marcos',22),(953,'San Onofre',22),(954,'San Pedro',22),(955,'Santiago de Tolú',22),(956,'Since',22),(957,'Sucre',22),(958,'Tolú Viejo',22),(959,'Ibagué',23),(960,'Alpujarra',23),(961,'Alvarado',23),(962,'Ambalema',23),(963,'Anzoátegui',23),(964,'Armero',23),(965,'Ataco',23),(966,'Cajamarca',23),(967,'Carmen de Apicalá',23),(968,'Casabianca',23),(969,'Chaparral',23),(970,'Coello',23),(971,'Coyaima',23),(972,'Cunday',23),(973,'Dolores',23),(974,'Espinal',23),(975,'Falan',23),(976,'Flandes',23),(977,'Fresno',23),(978,'Guamo',23),(979,'Herveo',23),(980,'Honda',23),(981,'Icononzo',23),(982,'Lérida',23),(983,'Líbano',23),(984,'Mariquita',23),(985,'Melgar',23),(986,'Murillo',23),(987,'Natagaima',23),(988,'Ortega',23),(989,'Palocabildo',23),(990,'Piedras',23),(991,'Planadas',23),(992,'Prado',23),(993,'Purificación',23),(994,'Rioblanco',23),(995,'Roncesvalles',23),(996,'Rovira',23),(997,'Saldaña',23),(998,'San Antonio',23),(999,'San Luis',23),(1000,'Santa Isabel',23),(1001,'Suárez',23),(1002,'Valle de San Juan',23),(1003,'Venadillo',23),(1004,'Villahermosa',23),(1005,'Villarrica',23),(1006,'Cali',24),(1007,'Alcalá',24),(1008,'Andalucía',24),(1009,'Ansermanuevo',24),(1010,'Argelia',24),(1011,'Bolívar',24),(1012,'Buenaventura',24),(1013,'Bugalagrande',24),(1014,'Caicedonia',24),(1015,'Calima',24),(1016,'Candelaria',24),(1017,'Cartago',24),(1018,'Dagua',24),(1019,'El Águila',24),(1020,'El Cairo',24),(1021,'El Cerrito',24),(1022,'El Dovio',24),(1023,'Florida',24),(1024,'Ginebra',24),(1025,'Guacarí',24),(1026,'Jamundí',24),(1027,'La Cumbre',24),(1028,'La Unión',24),(1029,'La Victoria',24),(1030,'Obando',24),(1031,'Palmira',24),(1032,'Pradera',24),(1033,'Restrepo',24),(1034,'Riofrío',24),(1035,'Roldanillo',24),(1036,'San Pedro',24),(1037,'Sevilla',24),(1038,'Toro',24),(1039,'Trujillo',24),(1040,'Tuluá',24),(1041,'Ulloa',24),(1042,'Versalles',24),(1043,'Vijes',24),(1044,'Yotoco',24),(1045,'Yumbo',24),(1046,'Zarzal',24),(1047,'Arauca',25),(1048,'Arauquita',25),(1049,'Cravo Norte',25),(1050,'Fortul',25),(1051,'Puerto Rondón',25),(1052,'Saravena',25),(1053,'Tame',25),(1054,'Yopal',26),(1055,'Aguazul',26),(1056,'Chámeza',26),(1057,'Hato Corozal',26),(1058,'La Salina',26),(1059,'Maní',26),(1060,'Monterrey',26),(1061,'Nunchía',26),(1062,'Orocué',26),(1063,'Paz de Ariporo',26),(1064,'Pore',26),(1065,'Recetor',26),(1066,'Sabanalarga',26),(1067,'Sácama',26),(1068,'San Luis de Palenque',26),(1069,'Támara',26),(1070,'Tauramena',26),(1071,'Trinidad',26),(1072,'Villanueva',26),(1073,'Mocoa',27),(1074,'Colón',27),(1075,'Orito',27),(1076,'Puerto Asís',27),(1077,'Puerto Caicedo',27),(1078,'Puerto Guzmán',27),(1079,'Leguízamo',27),(1080,'San Francisco',27),(1081,'San Miguel',27),(1082,'Santiago',27),(1083,'Sibundoy',27),(1084,'Valle del Guamuez',27),(1085,'Villagarzón',27),(1086,'San Andrés',28),(1087,'Providencia',28),(1088,'Santa Catalina',28),(1089,'Leticia',29),(1090,'El Encanto',29),(1091,'La Chorrera',29),(1092,'La Pedrera',29),(1093,'La Victoria',29),(1094,'Miriti - Paraná',29),(1095,'Puerto Alegría',29),(1096,'Puerto Arica',29),(1097,'Puerto Nariño',29),(1098,'Puerto Santander',29),(1099,'Tarapacá',29),(1100,'Inírida',30),(1101,'Barranco Minas',30),(1102,'Cacahual',30),(1103,'La Guadalupe',30),(1104,'Mapiripana',30),(1105,'Morichal',30),(1106,'Pana Pana',30),(1107,'Puerto Colombia',30),(1108,'San Felipe',30),(1109,'San José del Guaviare',31),(1110,'Calamar',31),(1111,'El Retorno',31),(1112,'Miraflores',31),(1113,'Mitú',32),(1114,'Carurú',32),(1115,'Pacoa',32),(1116,'Taraira',32),(1117,'Papunaua',32),(1118,'Yavaraté',32),(1119,'Puerto Carreño',33),(1120,'La Primavera',33),(1121,'Santa Rosalía',33),(1122,'Cumaribo',33);
/*!40000 ALTER TABLE `municipio` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `password_reset_tokens`
--

DROP TABLE IF EXISTS `password_reset_tokens`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `password_reset_tokens` (
  `email` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`email`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `password_reset_tokens`
--

LOCK TABLES `password_reset_tokens` WRITE;
/*!40000 ALTER TABLE `password_reset_tokens` DISABLE KEYS */;
/*!40000 ALTER TABLE `password_reset_tokens` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `pensiones`
--

DROP TABLE IF EXISTS `pensiones`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `pensiones` (
  `id_pension` int NOT NULL AUTO_INCREMENT,
  `nom_pension` varchar(45) CHARACTER SET utf8mb4 COLLATE utf8mb4_spanish_ci NOT NULL,
  PRIMARY KEY (`id_pension`),
  UNIQUE KEY `nom_pension` (`nom_pension`)
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_spanish_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `pensiones`
--

LOCK TABLES `pensiones` WRITE;
/*!40000 ALTER TABLE `pensiones` DISABLE KEYS */;
INSERT INTO `pensiones` VALUES (4,'Colfondos'),(1,'Colpensiones'),(2,'Porvenir'),(3,'Protección'),(5,'Skandia');
/*!40000 ALTER TABLE `pensiones` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `profesion`
--

DROP TABLE IF EXISTS `profesion`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `profesion` (
  `id_profesion` int NOT NULL AUTO_INCREMENT,
  `nom_profesion` varchar(45) CHARACTER SET utf8mb4 COLLATE utf8mb4_spanish_ci NOT NULL,
  PRIMARY KEY (`id_profesion`),
  UNIQUE KEY `nom_profesion` (`nom_profesion`)
) ENGINE=InnoDB AUTO_INCREMENT=9 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_spanish_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `profesion`
--

LOCK TABLES `profesion` WRITE;
/*!40000 ALTER TABLE `profesion` DISABLE KEYS */;
INSERT INTO `profesion` VALUES (5,'Abogado'),(6,'Administrador de Empresas'),(2,'Contador'),(7,'Docente'),(8,'Enfermero'),(3,'Ingeniero de Sistemas'),(4,'Médico'),(1,'Psicologo');
/*!40000 ALTER TABLE `profesion` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `sessions`
--

DROP TABLE IF EXISTS `sessions`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `sessions` (
  `id` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `user_id` bigint unsigned DEFAULT NULL,
  `ip_address` varchar(45) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `user_agent` text CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci,
  `payload` longtext CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `last_activity` int NOT NULL,
  PRIMARY KEY (`id`),
  KEY `sessions_user_id_index` (`user_id`),
  KEY `sessions_last_activity_index` (`last_activity`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `sessions`
--

LOCK TABLES `sessions` WRITE;
/*!40000 ALTER TABLE `sessions` DISABLE KEYS */;
INSERT INTO `sessions` VALUES ('WHBourLE3b7GJVvOIFWRYJokv59I7SbW49eXFjXW',7,'127.0.0.1','Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/134.0.0.0 Safari/537.36 OPR/119.0.0.0','YTo1OntzOjY6Il90b2tlbiI7czo0MDoiUWw2cFV2OVdjaTV4ZDM5NDZtdFQxQmJ6YmJPQ2ZaM2YzdFdKc3o4eCI7czo2OiJfZmxhc2giO2E6Mjp7czozOiJvbGQiO2E6MDp7fXM6MzoibmV3IjthOjA6e319czo5OiJfcHJldmlvdXMiO2E6MTp7czozOiJ1cmwiO3M6NDA6Imh0dHA6Ly9yaF9zb2x1dGlvbnMudGVzdC9taS1wZXJmaWwtYWRtaW4iO31zOjUyOiJsb2dpbl9hZG1pbl81OWJhMzZhZGRjMmIyZjk0MDE1ODBmMDE0YzdmNThlYTRlMzA5ODlkIjtpOjc7czozOiJ1cmwiO2E6MTp7czo4OiJpbnRlbmRlZCI7czozODoiaHR0cDovL3JoX3NvbHV0aW9ucy50ZXN0L211bmljaXBpb3MvMjMiO319',1750826861);
/*!40000 ALTER TABLE `sessions` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `solicitud_certificado`
--

DROP TABLE IF EXISTS `solicitud_certificado`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `solicitud_certificado` (
  `id_solicitud` int NOT NULL AUTO_INCREMENT,
  `id_contrato` int NOT NULL COMMENT 'Este id es fundamental para traerme todos los campos de las demas tablas, doc_usuario, nombrecompleto, tipo_decontrato',
  `motivo` text CHARACTER SET utf8mb4 COLLATE utf8mb4_spanish_ci NOT NULL COMMENT 'motivo por el cual solicita el certificado',
  PRIMARY KEY (`id_solicitud`),
  KEY `id_contrato` (`id_contrato`),
  CONSTRAINT `solicitud_certificado_ibfk_1` FOREIGN KEY (`id_contrato`) REFERENCES `contrato` (`id_contrato`)
) ENGINE=InnoDB AUTO_INCREMENT=19 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_spanish_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `solicitud_certificado`
--

LOCK TABLES `solicitud_certificado` WRITE;
/*!40000 ALTER TABLE `solicitud_certificado` DISABLE KEYS */;
INSERT INTO `solicitud_certificado` VALUES (15,20,'certificado'),(16,21,'certificado'),(17,23,'embarazo'),(18,22,'Holanda');
/*!40000 ALTER TABLE `solicitud_certificado` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `tiempo_contrato`
--

DROP TABLE IF EXISTS `tiempo_contrato`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `tiempo_contrato` (
  `id_tiemp_contrato` int NOT NULL AUTO_INCREMENT,
  `nom_tiemp_contrato` varchar(55) CHARACTER SET utf8mb4 COLLATE utf8mb4_spanish_ci NOT NULL,
  PRIMARY KEY (`id_tiemp_contrato`),
  UNIQUE KEY `nom_tiemp_contrato` (`nom_tiemp_contrato`)
) ENGINE=InnoDB AUTO_INCREMENT=11 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_spanish_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `tiempo_contrato`
--

LOCK TABLES `tiempo_contrato` WRITE;
/*!40000 ALTER TABLE `tiempo_contrato` DISABLE KEYS */;
INSERT INTO `tiempo_contrato` VALUES (1,'1 mes'),(6,'12 meses'),(2,'2 meses'),(7,'24 meses'),(3,'3 meses'),(8,'36 meses'),(4,'6 meses'),(5,'9 meses'),(10,'Hasta finalizar obra'),(9,'Indefinido');
/*!40000 ALTER TABLE `tiempo_contrato` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `tipo_contrato`
--

DROP TABLE IF EXISTS `tipo_contrato`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `tipo_contrato` (
  `id_tip_contrato` int NOT NULL AUTO_INCREMENT,
  `nom_contrato` varchar(45) CHARACTER SET utf8mb4 COLLATE utf8mb4_spanish_ci NOT NULL,
  PRIMARY KEY (`id_tip_contrato`),
  UNIQUE KEY `nom_contrato` (`nom_contrato`)
) ENGINE=InnoDB AUTO_INCREMENT=9 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_spanish_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `tipo_contrato`
--

LOCK TABLES `tipo_contrato` WRITE;
/*!40000 ALTER TABLE `tipo_contrato` DISABLE KEYS */;
INSERT INTO `tipo_contrato` VALUES (5,'Aprendizaje'),(8,'De confianza'),(3,'Obra o labor'),(6,'Ocasional de trabajo'),(7,'Periodo de prueba'),(4,'Prestacion de servicios'),(1,'Termino fijo'),(2,'Termino indefinido');
/*!40000 ALTER TABLE `tipo_contrato` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `tipo_documento`
--

DROP TABLE IF EXISTS `tipo_documento`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `tipo_documento` (
  `id_tip_document` int NOT NULL AUTO_INCREMENT,
  `nom_tip_document` varchar(155) CHARACTER SET utf8mb4 COLLATE utf8mb4_spanish_ci NOT NULL,
  PRIMARY KEY (`id_tip_document`),
  UNIQUE KEY `nom_tip_document` (`nom_tip_document`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_spanish_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `tipo_documento`
--

LOCK TABLES `tipo_documento` WRITE;
/*!40000 ALTER TABLE `tipo_documento` DISABLE KEYS */;
INSERT INTO `tipo_documento` VALUES (1,'PDF');
/*!40000 ALTER TABLE `tipo_documento` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `users`
--

DROP TABLE IF EXISTS `users`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `users` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `password` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `remember_token` varchar(100) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `users_email_unique` (`email`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `users`
--

LOCK TABLES `users` WRITE;
/*!40000 ALTER TABLE `users` DISABLE KEYS */;
/*!40000 ALTER TABLE `users` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `usuarios`
--

DROP TABLE IF EXISTS `usuarios`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `usuarios` (
  `id_usuario` int NOT NULL AUTO_INCREMENT,
  `doc_usuario` varchar(45) CHARACTER SET utf8mb4 COLLATE utf8mb4_spanish_ci NOT NULL,
  `tip_documento` enum('CC','CE','TI','PA','DNI','PEP','PPT') CHARACTER SET utf8mb4 COLLATE utf8mb4_spanish_ci NOT NULL,
  `pri_nombre` varchar(45) CHARACTER SET utf8mb4 COLLATE utf8mb4_spanish_ci NOT NULL,
  `seg_nombre` varchar(45) CHARACTER SET utf8mb4 COLLATE utf8mb4_spanish_ci DEFAULT NULL,
  `pri_apellido` varchar(45) CHARACTER SET utf8mb4 COLLATE utf8mb4_spanish_ci NOT NULL,
  `seg_apellido` varchar(55) CHARACTER SET utf8mb4 COLLATE utf8mb4_spanish_ci DEFAULT NULL,
  `fec_nacimiento` date NOT NULL,
  `tip_sangre` enum('A+','A-','B+','B-','AB+','AB-','O+','O-') CHARACTER SET utf8mb4 COLLATE utf8mb4_spanish_ci NOT NULL,
  `sex_usuario` enum('Masculino','Femenino') CHARACTER SET utf8mb4 COLLATE utf8mb4_spanish_ci NOT NULL,
  `estado_civil` enum('Soltero(a)','Casado(a)','Divorciado(a)','Viudo(a)','Unión libre','Separado(a)') CHARACTER SET utf8mb4 COLLATE utf8mb4_spanish_ci DEFAULT NULL,
  `dir_usuario` varchar(45) CHARACTER SET utf8mb4 COLLATE utf8mb4_spanish_ci DEFAULT NULL,
  `cel_usuario` varchar(45) CHARACTER SET utf8mb4 COLLATE utf8mb4_spanish_ci NOT NULL,
  `cel_emer_usuario` varchar(45) CHARACTER SET utf8mb4 COLLATE utf8mb4_spanish_ci NOT NULL,
  `correo_usuario` varchar(45) CHARACTER SET utf8mb4 COLLATE utf8mb4_spanish_ci NOT NULL,
  `registro_profesional` varchar(45) CHARACTER SET utf8mb4 COLLATE utf8mb4_spanish_ci DEFAULT NULL,
  `contraseña` varchar(100) CHARACTER SET utf8mb4 COLLATE utf8mb4_spanish_ci NOT NULL,
  `id_departamento` int NOT NULL,
  `id_municipio` int NOT NULL,
  `id_estado` int NOT NULL,
  `id_cargo` int NOT NULL,
  `id_eps` int NOT NULL,
  `id_pension` int NOT NULL,
  `id_arl` int NOT NULL,
  `id_caj_compen` int NOT NULL,
  `id_profesion` int NOT NULL,
  `img_perfil` varchar(255) COLLATE utf8mb4_spanish_ci DEFAULT 'imgs/default.jpg',
  PRIMARY KEY (`id_usuario`),
  UNIQUE KEY `doc_usuario` (`doc_usuario`),
  UNIQUE KEY `correo_usuario` (`correo_usuario`),
  UNIQUE KEY `cel_usuario` (`cel_usuario`),
  KEY `id_departamento` (`id_departamento`),
  KEY `id_estado` (`id_estado`),
  KEY `id_cargo` (`id_cargo`),
  KEY `id_eps` (`id_eps`),
  KEY `id_pension` (`id_pension`),
  KEY `id_arl` (`id_arl`),
  KEY `id_caj_compen` (`id_caj_compen`),
  KEY `id_profesion` (`id_profesion`),
  CONSTRAINT `usuarios_ibfk_1` FOREIGN KEY (`id_departamento`) REFERENCES `departamentos` (`id_departamento`),
  CONSTRAINT `usuarios_ibfk_2` FOREIGN KEY (`id_estado`) REFERENCES `estado_usuario` (`id_estado`),
  CONSTRAINT `usuarios_ibfk_3` FOREIGN KEY (`id_cargo`) REFERENCES `cargos` (`id_cargo`),
  CONSTRAINT `usuarios_ibfk_4` FOREIGN KEY (`id_eps`) REFERENCES `eps` (`id_eps`),
  CONSTRAINT `usuarios_ibfk_5` FOREIGN KEY (`id_pension`) REFERENCES `pensiones` (`id_pension`),
  CONSTRAINT `usuarios_ibfk_6` FOREIGN KEY (`id_arl`) REFERENCES `arl` (`id_arl`),
  CONSTRAINT `usuarios_ibfk_7` FOREIGN KEY (`id_caj_compen`) REFERENCES `caja_compensacion` (`id_caj_compen`),
  CONSTRAINT `usuarios_ibfk_8` FOREIGN KEY (`id_profesion`) REFERENCES `profesion` (`id_profesion`)
) ENGINE=InnoDB AUTO_INCREMENT=22 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_spanish_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `usuarios`
--

LOCK TABLES `usuarios` WRITE;
/*!40000 ALTER TABLE `usuarios` DISABLE KEYS */;
INSERT INTO `usuarios` VALUES (7,'123456789','CC','Sara','Sofía','Rodríguez','Hernández','1990-05-15','O+','Femenino','Separado(a)','calle 100 villa marina','3143191393','3206634567','sarisofia011@gmail.com','RP-00123','$2y$12$6Si3TFX6DlAytpDMnaq62Of49vcUpr0Xw0FPhx4qh0bddddjUiHia',23,959,1,1,1,1,1,1,1,'imgs/default.jpg'),(8,'1104940128','CC','Angel','Arturo','Herrera','Hernández','1990-05-15','O+','Masculino','Casado(a)','Manzana E casa Villa María','3204777777','3201244467','angeldavidh18@gmail.com','1119592875','$2y$12$mb3CF8TK2w81lzQUV9OqN.4NctxAh7JWHPRmJxOL3xQoAYejF/KgS',23,959,1,2,1,1,1,1,2,'imgs/default.jpg'),(9,'1110592875','CC','Angel','David','Herrera','Acevedo','1998-09-01','B+','Masculino','Soltero(a)','Manzana E casa 2','3016755558','3144487664','seniorherreraangel@gmail.com','1110592875','$2y$12$6Si3TFX6DlAytpDMnaq62Of49vcUpr0Xw0FPhx4qh0bddddjUiHia',23,959,1,9,3,2,3,4,1,'imgs/default.jpg'),(10,'1012345678','CC','Luisa','Fernanda','Lasso ','Méndez','1990-05-15','A+','Masculino','Soltero(a)','Calle 23 #45','3101234567','3107654321','ssrodriguezh@ut.edu.co','REG1234','$2y$12$6Si3TFX6DlAytpDMnaq62Of49vcUpr0Xw0FPhx4qh0bddddjUiHia',23,959,7,14,5,3,8,19,3,'imgs/default.jpg'),(11,'1012345679','CC','María','Isabel','López','Martínez','1988-11-20','O+','Femenino','Casado(a)','Carrera 15 #7-10','3109876543','3103456789','maria.lopez@mail.com','REG5678','$2y$12$6Si3TFX6DlAytpDMnaq62Of49vcUpr0Xw0FPhx4qh0bddddjUiHia',23,959,2,22,2,4,5,11,7,'imgs/default.jpg'),(12,'1012345680','CC','Juan','Carlos','Pérez','Rodríguez','1992-07-08','B-','Masculino','Divorciado(a)','Av. Las Flores #9','3112345678','3118765432','juan.perez@mail.com','REG9101','$2y$12$6Si3TFX6DlAytpDMnaq62Of49vcUpr0Xw0FPhx4qh0bddddjUiHia',23,959,9,19,1,5,7,2,4,'imgs/default.jpg'),(13,'1012345681','CC','Catalina','María','González','Suárez','1995-01-10','AB+','Femenino','Soltero(a)','Calle 45 #22','3102223333','3104445555','catalina.gonzalez@mail.com','REG1121','$2y$12$6Si3TFX6DlAytpDMnaq62Of49vcUpr0Xw0FPhx4qh0bddddjUiHia',23,959,3,7,6,2,4,25,1,'imgs/default.jpg'),(14,'1012345682','CC','Luis','Fernando','Morales','Castro','1987-09-30','A-','Masculino','Casado(a)','Cra 10 #5-15','3111112222','3113334444','luis.morales@mail.com','REG3141','$2y$12$6Si3TFX6DlAytpDMnaq62Of49vcUpr0Xw0FPhx4qh0bddddjUiHia',23,959,6,10,9,1,3,9,5,'imgs/default.jpg'),(15,'1012345683','CC','Valentina','Sofía','Ramírez','Vargas','1993-03-25','O-','Femenino','Divorciado(a)','Calle 7 #33','3105556666','3107778888','valentina.ramirez@mail.com','REG5161','$2y$12$6Si3TFX6DlAytpDMnaq62Of49vcUpr0Xw0FPhx4qh0bddddjUiHia',23,959,8,16,4,3,2,14,6,'imgs/default.jpg'),(16,'1012345684','CC','David','Alejandro','Hernández','Salazar','1991-12-12','B+','Masculino','Soltero(a)','Av. 20 #8','3119990000','3118887777','david.hernandez@mail.com','REG7181','$2y$12$6Si3TFX6DlAytpDMnaq62Of49vcUpr0Xw0FPhx4qh0bddddjUiHia',23,959,5,23,7,5,9,5,2,'imgs/default.jpg'),(17,'1012345685','CC','Juliana','Fernanda','Torres','Ramírez','1989-08-08','AB-','Femenino','Casado(a)','Carrera 11 #3-20','3103332222','3104443333','juliana.torres@mail.com','REG9202','$2y$12$6Si3TFX6DlAytpDMnaq62Of49vcUpr0Xw0FPhx4qh0bddddjUiHia',23,959,1,25,3,4,6,12,8,'imgs/default.jpg'),(18,'1012345686','CC','Santiago','Andrés','Castillo','Mendoza','1994-06-18','A+','Masculino','Soltero(a)','Calle 30 #14','3111212121','3113434343','santiago.castillo@mail.com','REG1222','$2y$12$6Si3TFX6DlAytpDMnaq62Of49vcUpr0Xw0FPhx4qh0bddddjUiHia',23,959,4,21,8,1,1,1,7,'imgs/default.jpg'),(19,'1012345687','CC','Laura','Beatriz','Ruiz','Ochoa','1990-10-05','O+','Femenino','Divorciado(a)','Av. Central #10','3104545454','3106767676','laura.ruiz@mail.com','REG3242','$2y$12$6Si3TFX6DlAytpDMnaq62Of49vcUpr0Xw0FPhx4qh0bddddjUiHia',23,959,10,12,10,2,10,24,4,'imgs/default.jpg'),(20,'2222222222','CC','Arturo',NULL,'Montana',NULL,'2000-01-01','B+','Masculino','Soltero(a)','Manzan e casa 2','3144487664','3144487664','mario@gmail.com','1110592875','User12345$',23,959,1,2,4,4,9,29,3,'imgs/default.jpg'),(21,'3333333333','CC','Altor',NULL,'Zur',NULL,'1998-01-01','B+','Masculino','Soltero(a)','Calle las plamas','3202897871','3144487664','altorzur@gmail.com','1110592875','User12345$',1,1,1,10,12,4,5,22,6,'imgs/default.jpg');
/*!40000 ALTER TABLE `usuarios` ENABLE KEYS */;
UNLOCK TABLES;
/*!40103 SET TIME_ZONE=@OLD_TIME_ZONE */;

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;

-- Dump completed on 2025-06-24 23:49:49
