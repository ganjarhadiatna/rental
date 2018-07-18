-- MySQL dump 10.16  Distrib 10.1.29-MariaDB, for Win32 (AMD64)
--
-- Host: localhost    Database: db_rental_mobil
-- ------------------------------------------------------
-- Server version	10.1.29-MariaDB

/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;
/*!40103 SET @OLD_TIME_ZONE=@@TIME_ZONE */;
/*!40103 SET TIME_ZONE='+00:00' */;
/*!40014 SET @OLD_UNIQUE_CHECKS=@@UNIQUE_CHECKS, UNIQUE_CHECKS=0 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;
/*!40111 SET @OLD_SQL_NOTES=@@SQL_NOTES, SQL_NOTES=0 */;

--
-- Table structure for table `admin`
--

DROP TABLE IF EXISTS `admin`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `admin` (
  `id_admin` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `username` varchar(15) NOT NULL,
  `password` varchar(255) NOT NULL,
  `nama` varchar(30) NOT NULL,
  `alamat` varchar(50) NOT NULL,
  `jenis_kelamin` enum('L','P') NOT NULL,
  `telp` varchar(15) NOT NULL,
  PRIMARY KEY (`id_admin`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `admin`
--

LOCK TABLES `admin` WRITE;
/*!40000 ALTER TABLE `admin` DISABLE KEYS */;
INSERT INTO `admin` VALUES (1,'admin','21232f297a57a5a743894a0e4a801fc3','admin','Bandgun','L','123456789123');
/*!40000 ALTER TABLE `admin` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `detail_sewa`
--

DROP TABLE IF EXISTS `detail_sewa`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `detail_sewa` (
  `id_pinjam` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `tgl_pinjam` date NOT NULL,
  `lama_pinjam` tinyint(4) NOT NULL,
  `id_penyewa` int(10) unsigned NOT NULL,
  `id_mobil` int(10) unsigned NOT NULL,
  PRIMARY KEY (`id_pinjam`),
  KEY `id_penyewa` (`id_penyewa`),
  KEY `id_mobil` (`id_mobil`),
  CONSTRAINT `detail_sewa_ibfk_1` FOREIGN KEY (`id_penyewa`) REFERENCES `penyewa` (`id_penyewa`) ON DELETE CASCADE ON UPDATE CASCADE,
  CONSTRAINT `detail_sewa_ibfk_2` FOREIGN KEY (`id_mobil`) REFERENCES `mobil` (`id_mobil`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `detail_sewa`
--

LOCK TABLES `detail_sewa` WRITE;
/*!40000 ALTER TABLE `detail_sewa` DISABLE KEYS */;
/*!40000 ALTER TABLE `detail_sewa` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `mobil`
--

DROP TABLE IF EXISTS `mobil`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `mobil` (
  `id_mobil` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `plat_nomor` varchar(10) NOT NULL,
  `no_rangka` varchar(20) NOT NULL,
  `no_mesin` varchar(20) NOT NULL,
  `nama` varchar(20) NOT NULL,
  `jenis` varchar(15) NOT NULL,
  `merk` varchar(15) NOT NULL,
  `warna` varchar(10) NOT NULL,
  `isi_silinder` varchar(5) NOT NULL,
  `tahun` varchar(4) NOT NULL,
  `harga_sewa` int(11) unsigned NOT NULL,
  `foto` varchar(255) DEFAULT NULL,
  `status` enum('Disewa','Bebas') DEFAULT 'Bebas',
  PRIMARY KEY (`id_mobil`)
) ENGINE=InnoDB AUTO_INCREMENT=7 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `mobil`
--

LOCK TABLES `mobil` WRITE;
/*!40000 ALTER TABLE `mobil` DISABLE KEYS */;
INSERT INTO `mobil` VALUES (5,'D 1234 XW','12234','23423','Toyota AVP','Small','Toyota','Hitam','23422','2015',1200000,'115160779803.png','Bebas'),(6,'D 1234 XW','123','1234','Apv','Medium','Toyota','Hitam','123','2015',1200000,'115160780382.png','Bebas');
/*!40000 ALTER TABLE `mobil` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `penyewa`
--

DROP TABLE IF EXISTS `penyewa`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `penyewa` (
  `id_penyewa` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `nomor_identitas` varchar(20) NOT NULL,
  `nama` varchar(30) NOT NULL,
  `email` varchar(50) NOT NULL,
  `alamat` varchar(50) NOT NULL,
  `jenis_kelamin` enum('L','P') NOT NULL,
  `telp` varchar(15) NOT NULL,
  `foto` varchar(255) DEFAULT NULL,
  `status_member` enum('Biasa','Member') DEFAULT NULL,
  PRIMARY KEY (`id_penyewa`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `penyewa`
--

LOCK TABLES `penyewa` WRITE;
/*!40000 ALTER TABLE `penyewa` DISABLE KEYS */;
INSERT INTO `penyewa` VALUES (1,'123456789','Ahmad Saeful','ahmadsaeful@gmail.com','Bandung','L','08912345678','115160877843.png','Member'),(2,'123456789','Ahmad Saeful','ahmadsaeful@gmail.com','Bandung','L','08912345678','1151608880020723472867018f948e047dfbc80e113e499aa29.jpg','Member');
/*!40000 ALTER TABLE `penyewa` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `sewa`
--

DROP TABLE IF EXISTS `sewa`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `sewa` (
  `id_sewa` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `tgl_pinjam` date NOT NULL,
  `tgl_akhir_pinjam` date NOT NULL,
  `harga_sewa` int(11) NOT NULL,
  `lama_pinjam` tinyint(4) NOT NULL,
  `total_bayar` int(11) NOT NULL,
  `id_admin` int(10) unsigned NOT NULL,
  `id_penyewa` int(10) unsigned NOT NULL,
  `id_mobil` int(10) unsigned NOT NULL,
  `status_sewa` enum('Selesai','Belum Selesai') DEFAULT NULL,
  PRIMARY KEY (`id_sewa`),
  KEY `id_admin` (`id_admin`),
  KEY `id_penyewa` (`id_penyewa`),
  KEY `id_mobil` (`id_mobil`),
  CONSTRAINT `sewa_ibfk_1` FOREIGN KEY (`id_admin`) REFERENCES `admin` (`id_admin`) ON DELETE CASCADE ON UPDATE CASCADE,
  CONSTRAINT `sewa_ibfk_2` FOREIGN KEY (`id_penyewa`) REFERENCES `penyewa` (`id_penyewa`) ON DELETE CASCADE ON UPDATE CASCADE,
  CONSTRAINT `sewa_ibfk_3` FOREIGN KEY (`id_mobil`) REFERENCES `mobil` (`id_mobil`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `sewa`
--

LOCK TABLES `sewa` WRITE;
/*!40000 ALTER TABLE `sewa` DISABLE KEYS */;
INSERT INTO `sewa` VALUES (1,'2018-01-16','2018-01-25',1200000,5,6000000,1,1,6,'Belum Selesai'),(2,'2018-01-16','2018-01-25',1200000,5,6000000,1,2,6,'Belum Selesai');
/*!40000 ALTER TABLE `sewa` ENABLE KEYS */;
UNLOCK TABLES;
/*!40103 SET TIME_ZONE=@OLD_TIME_ZONE */;

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;

-- Dump completed on 2018-07-18 20:00:03
