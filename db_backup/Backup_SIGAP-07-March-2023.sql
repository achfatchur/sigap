
/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!50503 SET NAMES utf8mb4 */;
/*!40103 SET @OLD_TIME_ZONE=@@TIME_ZONE */;
/*!40103 SET TIME_ZONE='+00:00' */;
/*!40014 SET @OLD_UNIQUE_CHECKS=@@UNIQUE_CHECKS, UNIQUE_CHECKS=0 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;
/*!40111 SET @OLD_SQL_NOTES=@@SQL_NOTES, SQL_NOTES=0 */;
DROP TABLE IF EXISTS `absen`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `absen` (
  `id` int NOT NULL AUTO_INCREMENT,
  `bulan` int DEFAULT NULL,
  `tahun` int DEFAULT NULL,
  `jumlah_hari_kerja` smallint DEFAULT NULL,
  `datetime` datetime DEFAULT NULL,
  `createuser` int DEFAULT NULL,
  PRIMARY KEY (`id`) USING BTREE
) ENGINE=InnoDB AUTO_INCREMENT=8 DEFAULT CHARSET=latin1 ROW_FORMAT=DYNAMIC;
/*!40101 SET character_set_client = @saved_cs_client */;

LOCK TABLES `absen` WRITE;
/*!40000 ALTER TABLE `absen` DISABLE KEYS */;
INSERT INTO `absen` VALUES (1,4,2023,NULL,'2023-01-24 04:15:02',-1),(2,5,2024,29,'2023-01-18 09:38:24',-1),(3,1,2023,29,'2023-01-19 03:22:03',-1),(4,4,2023,29,'2023-01-19 05:18:44',-1),(5,1,2024,29,'2023-01-19 10:48:30',-1),(6,8,2023,29,'2023-01-19 10:49:05',-1),(7,NULL,NULL,NULL,'2023-01-24 04:14:33',-1);
/*!40000 ALTER TABLE `absen` ENABLE KEYS */;
UNLOCK TABLES;
DROP TABLE IF EXISTS `absen_detil`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `absen_detil` (
  `id` int NOT NULL AUTO_INCREMENT,
  `pid` int DEFAULT NULL,
  `pegawai` varchar(50) DEFAULT NULL,
  `masuk` smallint DEFAULT NULL,
  `absen` smallint DEFAULT NULL,
  `ijin` smallint DEFAULT NULL,
  `sakit` smallint DEFAULT NULL,
  `pulang_cepat` smallint DEFAULT NULL,
  `piket` smallint DEFAULT NULL,
  `inval` smallint DEFAULT NULL,
  `lembur` smallint DEFAULT NULL,
  `terlambat` smallint DEFAULT NULL,
  `jenjang` int DEFAULT NULL,
  `date` date DEFAULT NULL,
  `penyesuaian` int DEFAULT NULL,
  PRIMARY KEY (`id`) USING BTREE
) ENGINE=InnoDB AUTO_INCREMENT=14 DEFAULT CHARSET=latin1 ROW_FORMAT=DYNAMIC;
/*!40101 SET character_set_client = @saved_cs_client */;

LOCK TABLES `absen_detil` WRITE;
/*!40000 ALTER TABLE `absen_detil` DISABLE KEYS */;
INSERT INTO `absen_detil` VALUES (3,1,'10230',2,3,1,2,NULL,2,NULL,2,2,4,NULL,NULL),(5,2,'102390',2,2,2,2,NULL,NULL,NULL,NULL,2,4,NULL,NULL),(6,3,'10236',24,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,1,NULL,NULL),(7,4,'10230',12,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,4,NULL,NULL),(8,4,'10235',15,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,4,NULL,NULL),(9,6,'10230',2,2,2,2,NULL,NULL,NULL,NULL,2,4,NULL,NULL),(10,7,'10230',12,3,NULL,NULL,NULL,12,12,2,NULL,4,NULL,NULL),(11,7,'10235',12,NULL,NULL,NULL,NULL,12,NULL,2,NULL,4,NULL,NULL),(12,1,'102323',3,3,2,2,NULL,2,2,2,2,5,NULL,NULL),(13,1,'102323',3,3,3,3,NULL,2,1,1,1,3,NULL,NULL);
/*!40000 ALTER TABLE `absen_detil` ENABLE KEYS */;
UNLOCK TABLES;
DROP TABLE IF EXISTS `agama`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `agama` (
  `id` int NOT NULL AUTO_INCREMENT,
  `name` varchar(50) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=7 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

LOCK TABLES `agama` WRITE;
/*!40000 ALTER TABLE `agama` DISABLE KEYS */;
INSERT INTO `agama` VALUES (1,'ISLAM'),(2,'Kristen'),(3,'Katolik'),(4,'Hindu'),(5,'Buddha'),(6,'konghucu');
/*!40000 ALTER TABLE `agama` ENABLE KEYS */;
UNLOCK TABLES;
DROP TABLE IF EXISTS `audittrail`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `audittrail` (
  `id` int NOT NULL AUTO_INCREMENT,
  `datetime` datetime NOT NULL,
  `script` varchar(80) DEFAULT NULL,
  `user` varchar(80) DEFAULT NULL,
  `action` varchar(80) DEFAULT NULL,
  `table` varchar(80) DEFAULT NULL,
  `field` varchar(80) DEFAULT NULL,
  `keyvalue` longtext,
  `oldvalue` longtext,
  `newvalue` longtext,
  PRIMARY KEY (`id`) USING BTREE
) ENGINE=InnoDB AUTO_INCREMENT=2120 DEFAULT CHARSET=latin1 ROW_FORMAT=DYNAMIC;
/*!40101 SET character_set_client = @saved_cs_client */;

LOCK TABLES `audittrail` WRITE;
/*!40000 ALTER TABLE `audittrail` DISABLE KEYS */;
INSERT INTO `audittrail` VALUES (2001,'2022-12-16 04:03:38','/sigap/PotonganAdd','Administrator','A','potongan','value_sakit','59','','23000'),(2002,'2022-12-16 04:03:38','/sigap/PotonganAdd','Administrator','A','potongan','tidakhadirjamvalue','59','','9000'),(2003,'2022-12-16 04:03:38','/sigap/PotonganAdd','Administrator','A','potongan','value_tidakhadir','59','','40000'),(2004,'2022-12-16 04:03:38','/sigap/PotonganAdd','Administrator','A','potongan','value_pulcep','59','','20000'),(2005,'2022-12-16 04:03:38','/sigap/PotonganAdd','Administrator','A','potongan','value_terlambat','59','','15000'),(2006,'2022-12-16 04:03:38','/sigap/PotonganAdd','Administrator','A','potongan','total','59','','168000'),(2007,'2022-12-16 04:03:38','/sigap/PotonganAdd','Administrator','A','potongan','id','59','','59'),(2008,'2022-12-16 04:07:30','/sigap/PotonganAdd','Administrator','A','potongan','month','60','',NULL),(2009,'2022-12-16 04:07:30','/sigap/PotonganAdd','Administrator','A','potongan','nama','60','','110124'),(2010,'2022-12-16 04:07:30','/sigap/PotonganAdd','Administrator','A','potongan','jenjang_id','60','','1'),(2011,'2022-12-16 04:07:30','/sigap/PotonganAdd','Administrator','A','potongan','jabatan_id','60','','2'),(2012,'2022-12-16 04:07:30','/sigap/PotonganAdd','Administrator','A','potongan','terlambat','60','','2'),(2013,'2022-12-16 04:07:30','/sigap/PotonganAdd','Administrator','A','potongan','izin','60','','2'),(2014,'2022-12-16 04:07:30','/sigap/PotonganAdd','Administrator','A','potongan','izinperjam','60','',NULL),(2015,'2022-12-16 04:07:30','/sigap/PotonganAdd','Administrator','A','potongan','izinperjamvalue','60','','4000'),(2016,'2022-12-16 04:07:30','/sigap/PotonganAdd','Administrator','A','potongan','sakit','60','',NULL),(2017,'2022-12-16 04:07:30','/sigap/PotonganAdd','Administrator','A','potongan','sakitperjam','60','',NULL),(2018,'2022-12-16 04:07:30','/sigap/PotonganAdd','Administrator','A','potongan','sakitperjamvalue','60','',NULL),(2019,'2022-12-16 04:07:30','/sigap/PotonganAdd','Administrator','A','potongan','tidakhadir','60','',NULL),(2020,'2022-12-16 04:07:30','/sigap/PotonganAdd','Administrator','A','potongan','pulcep','60','','2'),(2021,'2022-12-16 04:07:30','/sigap/PotonganAdd','Administrator','A','potongan','tidakhadirjam','60','','2'),(2022,'2022-12-16 04:07:30','/sigap/PotonganAdd','Administrator','A','potongan','u_by','60','','-1'),(2023,'2022-12-16 04:07:30','/sigap/PotonganAdd','Administrator','A','potongan','datetime','60','','2022-12-16 04:07:30'),(2024,'2022-12-16 04:07:30','/sigap/PotonganAdd','Administrator','A','potongan','value_izin','60','','30000'),(2025,'2022-12-16 04:07:30','/sigap/PotonganAdd','Administrator','A','potongan','value_sakit','60','',NULL),(2026,'2022-12-16 04:07:30','/sigap/PotonganAdd','Administrator','A','potongan','tidakhadirjamvalue','60','','4000'),(2027,'2022-12-16 04:07:30','/sigap/PotonganAdd','Administrator','A','potongan','value_tidakhadir','60','','30000'),(2028,'2022-12-16 04:07:30','/sigap/PotonganAdd','Administrator','A','potongan','value_pulcep','60','','18000'),(2029,'2022-12-16 04:07:30','/sigap/PotonganAdd','Administrator','A','potongan','value_terlambat','60','','30000'),(2030,'2022-12-16 04:07:30','/sigap/PotonganAdd','Administrator','A','potongan','total','60','','164000'),(2031,'2022-12-16 04:07:30','/sigap/PotonganAdd','Administrator','A','potongan','id','60','','60'),(2032,'2022-12-16 04:08:54','/sigap/PotonganDelete/60','Administrator','*** Batch delete begin ***','potongan','','','',''),(2033,'2022-12-16 04:08:54','/sigap/PotonganDelete/60','Administrator','D','potongan','id','60','60',''),(2034,'2022-12-16 04:08:54','/sigap/PotonganDelete/60','Administrator','D','potongan','nama','60','110124',''),(2035,'2022-12-16 04:08:54','/sigap/PotonganDelete/60','Administrator','D','potongan','terlambat','60','2',''),(2036,'2022-12-16 04:08:54','/sigap/PotonganDelete/60','Administrator','D','potongan','value_terlambat','60','30000',''),(2037,'2022-12-16 04:08:54','/sigap/PotonganDelete/60','Administrator','D','potongan','izin','60','2',''),(2038,'2022-12-16 04:08:54','/sigap/PotonganDelete/60','Administrator','D','potongan','value_izin','60','30000',''),(2039,'2022-12-16 04:08:54','/sigap/PotonganDelete/60','Administrator','D','potongan','jabatan_id','60','2',''),(2040,'2022-12-16 04:08:54','/sigap/PotonganDelete/60','Administrator','D','potongan','sakit','60',NULL,''),(2041,'2022-12-16 04:08:54','/sigap/PotonganDelete/60','Administrator','D','potongan','value_sakit','60',NULL,''),(2042,'2022-12-16 04:08:54','/sigap/PotonganDelete/60','Administrator','D','potongan','total','60','164000',''),(2043,'2022-12-16 04:08:54','/sigap/PotonganDelete/60','Administrator','D','potongan','tidakhadir','60',NULL,''),(2044,'2022-12-16 04:08:54','/sigap/PotonganDelete/60','Administrator','D','potongan','value_tidakhadir','60','30000',''),(2045,'2022-12-16 04:08:54','/sigap/PotonganDelete/60','Administrator','D','potongan','month','60',NULL,''),(2046,'2022-12-16 04:08:54','/sigap/PotonganDelete/60','Administrator','D','potongan','datetime','60','2022-12-16 04:07:30',''),(2047,'2022-12-16 04:08:54','/sigap/PotonganDelete/60','Administrator','D','potongan','u_by','60','-1',''),(2048,'2022-12-16 04:08:54','/sigap/PotonganDelete/60','Administrator','D','potongan','pulcep','60','2',''),(2049,'2022-12-16 04:08:54','/sigap/PotonganDelete/60','Administrator','D','potongan','value_pulcep','60','18000',''),(2050,'2022-12-16 04:08:54','/sigap/PotonganDelete/60','Administrator','D','potongan','tidakhadirjam','60','2',''),(2051,'2022-12-16 04:08:54','/sigap/PotonganDelete/60','Administrator','D','potongan','tidakhadirjamvalue','60','4000',''),(2052,'2022-12-16 04:08:54','/sigap/PotonganDelete/60','Administrator','D','potongan','sakitperjam','60',NULL,''),(2053,'2022-12-16 04:08:54','/sigap/PotonganDelete/60','Administrator','D','potongan','sakitperjamvalue','60',NULL,''),(2054,'2022-12-16 04:08:54','/sigap/PotonganDelete/60','Administrator','D','potongan','jenjang_id','60','1',''),(2055,'2022-12-16 04:08:54','/sigap/PotonganDelete/60','Administrator','D','potongan','izinperjam','60',NULL,''),(2056,'2022-12-16 04:08:54','/sigap/PotonganDelete/60','Administrator','D','potongan','izinperjamvalue','60','4000',''),(2057,'2022-12-16 04:08:54','/sigap/PotonganDelete/60','Administrator','*** Batch delete successful ***','potongan','','','',''),(2058,'2022-12-16 04:09:21','/sigap/PotonganAdd','Administrator','A','potongan','month','61','',NULL),(2059,'2022-12-16 04:09:21','/sigap/PotonganAdd','Administrator','A','potongan','nama','61','','110124'),(2060,'2022-12-16 04:09:21','/sigap/PotonganAdd','Administrator','A','potongan','jenjang_id','61','','1'),(2061,'2022-12-16 04:09:21','/sigap/PotonganAdd','Administrator','A','potongan','jabatan_id','61','','2'),(2062,'2022-12-16 04:09:21','/sigap/PotonganAdd','Administrator','A','potongan','terlambat','61','','2'),(2063,'2022-12-16 04:09:21','/sigap/PotonganAdd','Administrator','A','potongan','izin','61','','2'),(2064,'2022-12-16 04:09:21','/sigap/PotonganAdd','Administrator','A','potongan','izinperjam','61','',NULL),(2065,'2022-12-16 04:09:21','/sigap/PotonganAdd','Administrator','A','potongan','izinperjamvalue','61','','4000'),(2066,'2022-12-16 04:09:21','/sigap/PotonganAdd','Administrator','A','potongan','sakit','61','',NULL),(2067,'2022-12-16 04:09:21','/sigap/PotonganAdd','Administrator','A','potongan','sakitperjam','61','',NULL),(2068,'2022-12-16 04:09:21','/sigap/PotonganAdd','Administrator','A','potongan','sakitperjamvalue','61','','7000'),(2069,'2022-12-16 04:09:21','/sigap/PotonganAdd','Administrator','A','potongan','tidakhadir','61','',NULL),(2070,'2022-12-16 04:09:21','/sigap/PotonganAdd','Administrator','A','potongan','pulcep','61','','2'),(2071,'2022-12-16 04:09:21','/sigap/PotonganAdd','Administrator','A','potongan','tidakhadirjam','61','','2'),(2072,'2022-12-16 04:09:21','/sigap/PotonganAdd','Administrator','A','potongan','u_by','61','','-1'),(2073,'2022-12-16 04:09:21','/sigap/PotonganAdd','Administrator','A','potongan','datetime','61','','2022-12-16 04:09:21'),(2074,'2022-12-16 04:09:21','/sigap/PotonganAdd','Administrator','A','potongan','value_izin','61','','30000'),(2075,'2022-12-16 04:09:21','/sigap/PotonganAdd','Administrator','A','potongan','value_sakit','61','','27000'),(2076,'2022-12-16 04:09:21','/sigap/PotonganAdd','Administrator','A','potongan','tidakhadirjamvalue','61','','4000'),(2077,'2022-12-16 04:09:21','/sigap/PotonganAdd','Administrator','A','potongan','value_tidakhadir','61','','30000'),(2078,'2022-12-16 04:09:21','/sigap/PotonganAdd','Administrator','A','potongan','value_pulcep','61','','18000'),(2079,'2022-12-16 04:09:21','/sigap/PotonganAdd','Administrator','A','potongan','value_terlambat','61','','30000'),(2080,'2022-12-16 04:09:21','/sigap/PotonganAdd','Administrator','A','potongan','total','61','','164000'),(2081,'2022-12-16 04:09:21','/sigap/PotonganAdd','Administrator','A','potongan','id','61','','61'),(2082,'2022-12-16 04:15:59','/sigap/JabatanEdit/1','Administrator','U','jabatan','nama_jabatan','1','CTO','TU'),(2083,'2022-12-16 04:16:12','/sigap/JabatanEdit/2','Administrator','U','jabatan','nama_jabatan','2','HRD','Kepala TU'),(2084,'2022-12-16 07:05:09','/sigap/JabatanAdd','Administrator','A','jabatan','jenjang','3','','1'),(2085,'2022-12-16 07:05:09','/sigap/JabatanAdd','Administrator','A','jabatan','nama_jabatan','3','','Petugas Kebersihan'),(2086,'2022-12-16 07:05:09','/sigap/JabatanAdd','Administrator','A','jabatan','keterangan','3','','baru'),(2087,'2022-12-16 07:05:09','/sigap/JabatanAdd','Administrator','A','jabatan','c_date','3','',NULL),(2088,'2022-12-16 07:05:09','/sigap/JabatanAdd','Administrator','A','jabatan','u_date','3','','2022-12-16 07:05:09'),(2089,'2022-12-16 07:05:09','/sigap/JabatanAdd','Administrator','A','jabatan','c_by','3','',NULL),(2090,'2022-12-16 07:05:09','/sigap/JabatanAdd','Administrator','A','jabatan','u_by','3','','-1'),(2091,'2022-12-16 07:05:09','/sigap/JabatanAdd','Administrator','A','jabatan','aktif','3','','1'),(2092,'2022-12-16 07:05:09','/sigap/JabatanAdd','Administrator','A','jabatan','id','3','','3'),(2093,'2022-12-16 07:06:02','/sigap/JabatanEdit/1','Administrator','U','jabatan','jenjang','1',NULL,'1'),(2094,'2022-12-16 07:08:49','/sigap/JabatanEdit/2','Administrator','U','jabatan','jenjang','2',NULL,'1'),(2095,'2022-12-16 09:14:07','/sigap/PotonganAdd','Administrator','A','potongan','month','62','',NULL),(2096,'2022-12-16 09:14:07','/sigap/PotonganAdd','Administrator','A','potongan','nama','62','','110124'),(2097,'2022-12-16 09:14:07','/sigap/PotonganAdd','Administrator','A','potongan','jenjang_id','62','','1'),(2098,'2022-12-16 09:14:07','/sigap/PotonganAdd','Administrator','A','potongan','jabatan_id','62','','1'),(2099,'2022-12-16 09:14:07','/sigap/PotonganAdd','Administrator','A','potongan','terlambat','62','','1'),(2100,'2022-12-16 09:14:07','/sigap/PotonganAdd','Administrator','A','potongan','izin','62','','1'),(2101,'2022-12-16 09:14:07','/sigap/PotonganAdd','Administrator','A','potongan','izinperjam','62','',NULL),(2102,'2022-12-16 09:14:07','/sigap/PotonganAdd','Administrator','A','potongan','izinperjamvalue','62','','9000'),(2103,'2022-12-16 09:14:07','/sigap/PotonganAdd','Administrator','A','potongan','sakit','62','',NULL),(2104,'2022-12-16 09:14:07','/sigap/PotonganAdd','Administrator','A','potongan','sakitperjam','62','',NULL),(2105,'2022-12-16 09:14:07','/sigap/PotonganAdd','Administrator','A','potongan','sakitperjamvalue','62','','4000'),(2106,'2022-12-16 09:14:07','/sigap/PotonganAdd','Administrator','A','potongan','tidakhadir','62','',NULL),(2107,'2022-12-16 09:14:07','/sigap/PotonganAdd','Administrator','A','potongan','pulcep','62','','1'),(2108,'2022-12-16 09:14:07','/sigap/PotonganAdd','Administrator','A','potongan','tidakhadirjam','62','','1'),(2109,'2022-12-16 09:14:07','/sigap/PotonganAdd','Administrator','A','potongan','u_by','62','','-1'),(2110,'2022-12-16 09:14:08','/sigap/PotonganAdd','Administrator','A','potongan','datetime','62','','2022-12-16 09:14:07'),(2111,'2022-12-16 09:14:08','/sigap/PotonganAdd','Administrator','A','potongan','value_izin','62','','40000'),(2112,'2022-12-16 09:14:08','/sigap/PotonganAdd','Administrator','A','potongan','value_sakit','62','','23000'),(2113,'2022-12-16 09:14:08','/sigap/PotonganAdd','Administrator','A','potongan','tidakhadirjamvalue','62','','9000'),(2114,'2022-12-16 09:14:08','/sigap/PotonganAdd','Administrator','A','potongan','value_tidakhadir','62','','40000'),(2115,'2022-12-16 09:14:08','/sigap/PotonganAdd','Administrator','A','potongan','value_pulcep','62','','20000'),(2116,'2022-12-16 09:14:08','/sigap/PotonganAdd','Administrator','A','potongan','value_terlambat','62','','30000'),(2117,'2022-12-16 09:14:08','/sigap/PotonganAdd','Administrator','A','potongan','total','62','','99000'),(2118,'2022-12-16 09:14:08','/sigap/PotonganAdd','Administrator','A','potongan','id','62','','62'),(2119,'2022-12-19 05:25:48','/sigap/login','Administrator','login','::1','','','','');
/*!40000 ALTER TABLE `audittrail` ENABLE KEYS */;
UNLOCK TABLES;
DROP TABLE IF EXISTS `barang`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `barang` (
  `Kode_Barang` char(3) NOT NULL,
  `Nama_Barang` varchar(20) DEFAULT NULL,
  PRIMARY KEY (`Kode_Barang`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

LOCK TABLES `barang` WRITE;
/*!40000 ALTER TABLE `barang` DISABLE KEYS */;
INSERT INTO `barang` VALUES ('001','Barang Pertama'),('002','Barang Kedua'),('003','Barang Ketiga'),('004','Barang Keempat'),('005','Barang Kelima');
/*!40000 ALTER TABLE `barang` ENABLE KEYS */;
UNLOCK TABLES;
DROP TABLE IF EXISTS `berita`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `berita` (
  `id` int NOT NULL AUTO_INCREMENT,
  `grup` varchar(255) DEFAULT NULL,
  `judul` varchar(255) DEFAULT NULL,
  `berita` text,
  `gambar` varchar(255) DEFAULT NULL,
  `video` varchar(255) DEFAULT NULL,
  `c_by` int DEFAULT NULL,
  `c_date` datetime DEFAULT NULL,
  `aktif` tinyint DEFAULT NULL,
  PRIMARY KEY (`id`) USING BTREE
) ENGINE=InnoDB DEFAULT CHARSET=latin1 ROW_FORMAT=DYNAMIC;
/*!40101 SET character_set_client = @saved_cs_client */;

LOCK TABLES `berita` WRITE;
/*!40000 ALTER TABLE `berita` DISABLE KEYS */;
/*!40000 ALTER TABLE `berita` ENABLE KEYS */;
UNLOCK TABLES;
DROP TABLE IF EXISTS `bulan`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `bulan` (
  `id` int NOT NULL AUTO_INCREMENT,
  `bulan` varchar(50) DEFAULT NULL,
  `nourut` int DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=13 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

LOCK TABLES `bulan` WRITE;
/*!40000 ALTER TABLE `bulan` DISABLE KEYS */;
INSERT INTO `bulan` VALUES (1,'Januari',1),(2,'Februari',2),(3,'Maret',3),(4,'April',4),(5,'Mei',5),(6,'Juni',6),(7,'Juli',7),(8,'Agustus',8),(9,'September',9),(10,'Oktober',10),(11,'November',11),(12,'Desember',12);
/*!40000 ALTER TABLE `bulan` ENABLE KEYS */;
UNLOCK TABLES;
DROP TABLE IF EXISTS `daftarbarang`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `daftarbarang` (
  `id` int NOT NULL AUTO_INCREMENT,
  `nama` varchar(255) DEFAULT NULL,
  `jenis` varchar(50) DEFAULT NULL,
  `sepsifikasi` varchar(255) DEFAULT NULL,
  `deskripsi` varchar(255) DEFAULT NULL,
  `tgl_terima` datetime DEFAULT NULL,
  `tgl_beli` datetime DEFAULT NULL,
  `harga` int DEFAULT NULL,
  `dokumen` varchar(255) DEFAULT NULL,
  `foto` varchar(255) DEFAULT NULL,
  `pemegang` int DEFAULT NULL,
  `keterangan` varchar(255) DEFAULT NULL,
  `status` varchar(50) DEFAULT NULL,
  PRIMARY KEY (`id`) USING BTREE
) ENGINE=InnoDB DEFAULT CHARSET=latin1 ROW_FORMAT=DYNAMIC;
/*!40101 SET character_set_client = @saved_cs_client */;

LOCK TABLES `daftarbarang` WRITE;
/*!40000 ALTER TABLE `daftarbarang` DISABLE KEYS */;
/*!40000 ALTER TABLE `daftarbarang` ENABLE KEYS */;
UNLOCK TABLES;
DROP TABLE IF EXISTS `gaji`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `gaji` (
  `id` int NOT NULL AUTO_INCREMENT,
  `pegawai` varchar(50) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci DEFAULT NULL,
  `datetime` datetime DEFAULT NULL,
  `month` date DEFAULT NULL,
  `lembur` int DEFAULT NULL,
  `value_lembur` bigint DEFAULT NULL,
  `jabatan_id` int DEFAULT NULL,
  `gapok` bigint DEFAULT NULL,
  `total` bigint DEFAULT NULL,
  `value_reward` bigint DEFAULT NULL,
  `value_inval` bigint DEFAULT NULL,
  `piket_count` int DEFAULT NULL,
  `value_piket` bigint DEFAULT NULL,
  `tugastambahan` bigint DEFAULT NULL,
  `tj_jabatan` bigint DEFAULT NULL,
  `kehadiran` int DEFAULT NULL,
  `sub_total` bigint DEFAULT NULL,
  `potongan` bigint DEFAULT NULL,
  `jenjang_id` int DEFAULT NULL,
  `penyesuaian` bigint DEFAULT NULL,
  `pid` int DEFAULT NULL,
  `jp` int DEFAULT NULL,
  `type` int DEFAULT NULL,
  `jenis_guru` int DEFAULT NULL,
  `tambahan` int DEFAULT NULL,
  `value_kehadiran` bigint DEFAULT NULL,
  `periode` int DEFAULT NULL,
  `tunjangan_periode` bigint DEFAULT NULL,
  `total_gapok` bigint DEFAULT NULL,
  `lama_kerja` int DEFAULT NULL,
  `status` varchar(50) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci DEFAULT NULL,
  `tahun` int DEFAULT NULL,
  `bulan` int DEFAULT NULL,
  `potongan_bendahara` bigint DEFAULT NULL,
  `voucher` bigint DEFAULT NULL,
  `jaminan_pensiun` bigint DEFAULT NULL,
  `jaminan_hari_tua` bigint DEFAULT NULL,
  `total_pph21` bigint DEFAULT NULL,
  `bpjs_kesehatan` bigint DEFAULT NULL,
  `status_npwp` int DEFAULT NULL,
  PRIMARY KEY (`id`) USING BTREE
) ENGINE=InnoDB AUTO_INCREMENT=1434504 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci ROW_FORMAT=DYNAMIC;
/*!40101 SET character_set_client = @saved_cs_client */;

LOCK TABLES `gaji` WRITE;
/*!40000 ALTER TABLE `gaji` DISABLE KEYS */;
INSERT INTO `gaji` VALUES (1434200,'10230','2023-01-24 08:13:01','2023-01-24',NULL,NULL,5,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,4,NULL,123,NULL,1,1,NULL,NULL,4,NULL,NULL,2,'1',2023,2,NULL,NULL,NULL,NULL,NULL,NULL,NULL),(1434201,'10230','2023-01-24 08:14:45','2023-01-24',NULL,NULL,5,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,4,NULL,124,NULL,1,NULL,NULL,NULL,4,NULL,NULL,NULL,'1',2023,2,NULL,NULL,NULL,NULL,NULL,NULL,NULL),(1434204,'10230','2023-01-24 08:25:47','2023-01-24',NULL,NULL,5,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,4,NULL,127,NULL,1,NULL,NULL,NULL,NULL,NULL,NULL,NULL,'1',2023,2,NULL,NULL,NULL,NULL,NULL,NULL,NULL),(1434210,'10230','2023-01-24 08:34:34','2023-01-24',NULL,NULL,5,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,4,NULL,132,NULL,1,NULL,NULL,NULL,NULL,NULL,NULL,2,'1',2023,2,NULL,NULL,NULL,NULL,NULL,NULL,NULL),(1434212,'10230','2023-01-24 08:37:12','2023-01-24',NULL,NULL,5,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,4,NULL,135,NULL,1,NULL,NULL,NULL,NULL,NULL,NULL,NULL,'1',2023,2,NULL,NULL,NULL,NULL,NULL,NULL,NULL),(1434213,'10235','2023-01-24 08:37:12','2023-01-24',NULL,NULL,9,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,4,NULL,135,NULL,1,NULL,NULL,NULL,NULL,NULL,NULL,NULL,'1',2023,2,NULL,NULL,NULL,NULL,NULL,NULL,NULL),(1434216,'10230','2023-01-24 08:52:28','2023-01-24',NULL,NULL,5,NULL,164000,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,14000,4,178000,138,NULL,1,NULL,NULL,NULL,4,NULL,NULL,2,NULL,2023,4,NULL,30000,NULL,NULL,NULL,NULL,NULL),(1434217,'10230','2023-01-24 08:54:33','2023-01-24',NULL,NULL,5,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,4,NULL,139,NULL,1,1,NULL,NULL,4,NULL,NULL,2,'1',2023,2,NULL,NULL,NULL,NULL,NULL,NULL,NULL),(1434220,'10230','2023-01-24 09:43:18','2023-01-24',NULL,NULL,5,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,4,NULL,144,NULL,1,NULL,NULL,NULL,NULL,NULL,NULL,NULL,'1',2023,2,NULL,NULL,NULL,NULL,NULL,NULL,NULL),(1434221,'10235','2023-01-24 09:43:18','2023-01-24',NULL,NULL,9,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,4,NULL,144,NULL,1,NULL,NULL,NULL,NULL,NULL,NULL,NULL,'1',2023,2,NULL,NULL,NULL,NULL,NULL,NULL,NULL),(1434223,'10230','2023-01-24 09:50:34','2023-01-24',NULL,NULL,5,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,4,NULL,150,NULL,1,NULL,NULL,NULL,NULL,NULL,NULL,2,'1',2023,2,NULL,NULL,NULL,NULL,NULL,NULL,NULL),(1434226,'10230','2023-01-24 09:52:36','2023-01-24',NULL,NULL,5,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,4,NULL,153,NULL,1,1,2,NULL,4,NULL,NULL,2,NULL,2023,4,NULL,NULL,NULL,NULL,NULL,NULL,NULL),(1434228,'10230','2023-01-24 14:15:34','2023-01-24',NULL,NULL,5,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,4,NULL,76,NULL,1,1,NULL,NULL,NULL,NULL,NULL,NULL,NULL,2023,4,NULL,NULL,NULL,NULL,NULL,NULL,NULL),(1434229,'10235','2023-01-24 14:15:34','2023-01-24',NULL,NULL,9,NULL,-156750,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,156750,4,0,76,NULL,1,2,NULL,NULL,NULL,NULL,NULL,NULL,NULL,2023,4,NULL,40000,NULL,NULL,NULL,NULL,NULL),(1434231,'10230','2023-01-24 15:02:02','2023-01-24',NULL,NULL,5,2500,NULL,50000,25000,2,7000,125000,NULL,2,NULL,56000,4,NULL,173,NULL,1,1,2,56000,4,450000,NULL,2,NULL,2023,4,NULL,NULL,NULL,NULL,NULL,NULL,NULL),(1434232,'10230','2023-01-24 16:38:43','2023-01-24',NULL,NULL,5,2500,836000,50000,25000,2,7000,125000,NULL,2,836000,56000,4,NULL,192,NULL,1,1,2,56000,4,450000,NULL,2,NULL,2023,4,NULL,NULL,NULL,NULL,NULL,NULL,NULL),(1434233,'10230','2023-01-24 16:41:45','2023-01-24',NULL,NULL,5,2500,780000,50000,25000,2,7000,125000,NULL,2,836000,56000,4,NULL,193,NULL,1,1,2,56000,4,450000,NULL,2,NULL,2023,4,NULL,NULL,NULL,NULL,NULL,NULL,NULL),(1434234,'10230','2023-01-24 16:43:25','2023-01-24',2,30000,5,2500,780000,50000,25000,2,7000,125000,NULL,2,836000,56000,4,NULL,194,NULL,1,1,2,56000,4,450000,NULL,2,NULL,2023,4,NULL,NULL,NULL,NULL,NULL,NULL,NULL),(1434235,'10230','2023-01-25 03:54:26','2023-01-25',2,30000,5,2500,808000,50000,25000,2,7000,125000,NULL,2,836000,28000,4,NULL,195,NULL,1,1,2,56000,4,450000,NULL,2,NULL,2023,4,NULL,NULL,NULL,NULL,NULL,NULL,NULL),(1434236,'10230','2023-01-25 04:47:09','2023-01-25',NULL,NULL,5,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,4,NULL,77,NULL,1,1,NULL,NULL,NULL,NULL,NULL,NULL,'1',2023,2,NULL,NULL,NULL,NULL,NULL,NULL,NULL),(1434237,'10235','2023-01-25 04:47:09','2023-01-25',NULL,NULL,9,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,4,NULL,77,NULL,1,2,NULL,NULL,NULL,NULL,NULL,NULL,'1',2023,2,NULL,NULL,NULL,NULL,NULL,NULL,NULL),(1434238,'102327','2023-01-25 06:56:24','2023-01-25',NULL,NULL,5,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,4,NULL,21,NULL,1,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,2023,4,NULL,NULL,NULL,NULL,NULL,NULL,NULL),(1434239,'102327','2023-01-25 06:56:32','2023-01-25',NULL,NULL,5,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,4,NULL,22,NULL,1,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,2023,4,NULL,NULL,NULL,NULL,NULL,NULL,NULL),(1434240,'102327','2023-01-25 06:57:41','2023-01-25',NULL,NULL,5,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,4,NULL,24,NULL,1,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,2023,4,NULL,NULL,NULL,NULL,NULL,NULL,NULL),(1434241,'1023271','2023-01-25 07:21:23','2023-01-25',NULL,30000,5,2500,625000,50000,25000,NULL,7000,100000,NULL,NULL,625000,NULL,2,NULL,205,NULL,1,1,2,56000,4,450000,NULL,2,NULL,2023,4,NULL,NULL,NULL,NULL,NULL,NULL,NULL),(1434261,'10237','2023-02-02 04:23:56','2023-02-02',13000,13000,5,1000,585000,NULL,66000,0,8250,100000,0,0,585000,0,2,0,233,0,1,2,2,66000,2,435000,0,2,NULL,2024,11,NULL,0,NULL,NULL,NULL,NULL,NULL),(1434276,'10237','2023-02-13 04:00:15','2023-02-13',0,13000,5,1000,585000,50000,0,0,8250,100000,0,0,585000,0,2,0,248,0,1,2,2,66000,2,435000,0,2,NULL,2023,11,NULL,0,NULL,NULL,NULL,NULL,NULL),(1434278,'10237','2023-02-27 04:15:11','2023-02-27',0,13000,5,1000,585000,50000,0,0,8250,100000,0,0,585000,0,2,0,254,0,1,2,2,66000,2,435000,0,2,NULL,2023,7,NULL,0,0,0,0,0,0),(1434280,'10237','2023-02-27 04:25:17','2023-02-27',0,13000,5,1000,585000,50000,0,0,8250,100000,0,0,585000,0,2,0,256,0,1,2,2,66000,2,435000,0,2,NULL,2023,12,NULL,0,0,0,0,0,0),(1434281,'10237','2023-02-27 04:29:20','2023-02-27',0,13000,5,1000,585000,50000,0,0,8250,100000,0,0,585000,0,2,0,257,0,1,2,2,66000,2,435000,0,2,NULL,2023,8,NULL,0,0,0,0,0,0),(1434282,'10237','2023-02-27 05:39:03','2023-02-27',0,13000,5,1000,585000,50000,0,0,8250,100000,0,0,585000,0,2,0,258,0,1,2,2,66000,2,435000,0,2,NULL,2023,6,NULL,0,0,0,0,0,0),(1434462,'10237','2023-03-02 09:19:46','2023-03-02',0,13000,5,1000,585000,50000,0,0,8250,100000,0,0,585000,0,2,0,269,0,1,2,2,66000,2,435000,0,2,NULL,2023,1,NULL,0,0,0,0,0,0),(1434463,'196512051993070226','2023-03-02 09:19:46','2023-03-02',0,13000,0,500,50000,50000,0,0,0,0,0,0,50000,0,2,0,269,0,1,0,0,0,0,0,0,0,NULL,2023,1,NULL,0,0,0,0,0,0),(1434464,'199202222015070546','2023-03-02 09:19:46','2023-03-02',0,13000,0,500,50000,50000,0,0,0,0,0,0,50000,0,2,0,269,0,1,0,0,0,0,0,0,0,NULL,2023,1,NULL,0,0,0,0,0,0),(1434465,'198008252004070404','2023-03-02 09:19:46','2023-03-02',0,13000,0,500,50000,50000,0,0,0,0,0,0,50000,0,2,0,269,0,1,0,0,0,0,0,0,0,NULL,2023,1,NULL,0,0,0,0,0,0),(1434466,'198306292008070448','2023-03-02 09:19:46','2023-03-02',0,13000,0,500,50000,50000,0,0,0,0,0,0,50000,0,2,0,269,0,1,0,0,0,0,0,0,0,NULL,2023,1,NULL,0,0,0,0,0,0),(1434467,'198011212007070433','2023-03-02 09:19:46','2023-03-02',0,13000,0,500,50000,50000,0,0,0,0,0,0,50000,0,2,0,269,0,1,0,0,0,0,0,0,0,NULL,2023,1,NULL,0,0,0,0,0,0),(1434468,'195508061997070291','2023-03-02 09:19:46','2023-03-02',0,13000,0,500,50000,50000,0,0,0,0,0,0,50000,0,2,0,269,0,1,0,0,0,0,0,0,0,NULL,2023,1,NULL,0,0,0,0,0,0),(1434469,'196402131995070258','2023-03-02 09:19:46','2023-03-02',0,13000,0,500,50000,50000,0,0,0,0,0,0,50000,0,2,0,269,0,1,0,0,0,0,0,0,0,NULL,2023,1,NULL,0,0,0,0,0,0),(1434470,'197905112010070338','2023-03-02 09:19:46','2023-03-02',0,13000,0,500,50000,50000,0,0,0,0,0,0,50000,0,2,0,269,0,1,0,0,0,0,0,0,0,NULL,2023,1,NULL,0,0,0,0,0,0),(1434471,'198111252006070423','2023-03-02 09:19:46','2023-03-02',0,13000,0,500,50000,50000,0,0,0,0,0,0,50000,0,2,0,269,0,1,0,0,0,0,0,0,0,NULL,2023,1,NULL,0,0,0,0,0,0),(1434472,'198402172007070436','2023-03-02 09:19:46','2023-03-02',0,13000,0,500,50000,50000,0,0,0,0,0,0,50000,0,2,0,269,0,1,0,0,0,0,0,0,0,NULL,2023,1,NULL,0,0,0,0,0,0),(1434473,'197503091998070251','2023-03-02 09:19:46','2023-03-02',0,13000,0,500,50000,50000,0,0,0,0,0,0,50000,0,2,0,269,0,1,0,0,0,0,0,0,0,NULL,2023,1,NULL,0,0,0,0,0,0),(1434474,'198304102006070420','2023-03-02 09:19:46','2023-03-02',0,13000,60,500,50000,50000,0,0,0,0,0,0,50000,0,2,0,269,0,1,0,0,0,0,0,0,0,NULL,2023,1,NULL,0,0,0,0,0,0),(1434475,'197002261998070248','2023-03-02 09:19:46','2023-03-02',0,13000,0,500,50000,50000,0,0,0,0,0,0,50000,0,2,0,269,0,1,0,0,0,0,0,0,0,NULL,2023,1,NULL,0,0,0,0,0,0),(1434476,'198411252010070486','2023-03-02 09:19:46','2023-03-02',0,13000,0,500,50000,50000,0,0,0,0,0,0,50000,0,2,0,269,0,1,0,0,0,0,0,0,0,NULL,2023,1,NULL,0,0,0,0,0,0),(1434477,'197404241999070326','2023-03-02 09:19:46','2023-03-02',0,13000,0,500,50000,50000,0,0,0,0,0,0,50000,0,2,0,269,0,1,0,0,0,0,0,0,0,NULL,2023,1,NULL,0,0,0,0,0,0),(1434478,'196709081999070325','2023-03-02 09:19:46','2023-03-02',0,13000,0,500,50000,50000,0,0,0,0,0,0,50000,0,2,0,269,0,1,0,0,0,0,0,0,0,NULL,2023,1,NULL,0,0,0,0,0,0),(1434479,'197612261997070286','2023-03-02 09:19:46','2023-03-02',0,13000,0,500,50000,50000,0,0,0,0,0,0,50000,0,2,0,269,0,1,0,0,0,0,0,0,0,NULL,2023,1,NULL,0,0,0,0,0,0),(1434480,'199201062014070526','2023-03-02 09:19:46','2023-03-02',0,13000,0,500,50000,50000,0,0,0,0,0,0,50000,0,2,0,269,0,1,0,0,0,0,0,0,0,NULL,2023,1,NULL,0,0,0,0,0,0),(1434481,'196208291986070105','2023-03-02 09:19:46','2023-03-02',0,13000,0,500,50000,50000,0,0,0,0,0,0,50000,0,2,0,269,0,1,0,0,0,0,0,0,0,NULL,2023,1,NULL,0,0,0,0,0,0),(1434482,'196512271993070227','2023-03-02 09:19:46','2023-03-02',0,13000,0,500,50000,50000,0,0,0,0,0,0,50000,0,2,0,269,0,1,0,0,0,0,0,0,0,NULL,2023,1,NULL,0,0,0,0,0,0),(1434483,'197803282006070271','2023-03-02 09:19:47','2023-03-02',0,13000,0,500,50000,50000,0,0,0,0,0,0,50000,0,2,0,269,0,1,0,0,0,0,0,0,0,NULL,2023,1,NULL,0,0,0,0,0,0),(1434484,'197501302000070339','2023-03-02 09:19:47','2023-03-02',0,13000,0,500,50000,50000,0,0,0,0,0,0,50000,0,2,0,269,0,1,0,0,0,0,0,0,0,NULL,2023,1,NULL,0,0,0,0,0,0),(1434485,'198610132011070497','2023-03-02 09:19:47','2023-03-02',0,13000,0,500,50000,50000,0,0,0,0,0,0,50000,0,2,0,269,0,1,0,0,0,0,0,0,0,NULL,2023,1,NULL,0,0,0,0,0,0),(1434486,'198104162007070343','2023-03-02 09:19:47','2023-03-02',0,13000,0,500,50000,50000,0,0,0,0,0,0,50000,0,2,0,269,0,1,0,0,0,0,0,0,0,NULL,2023,1,NULL,0,0,0,0,0,0),(1434487,'196705282012070509','2023-03-02 09:19:47','2023-03-02',0,13000,0,500,50000,50000,0,0,0,0,0,0,50000,0,2,0,269,0,1,0,0,0,0,0,0,0,NULL,2023,1,NULL,0,0,0,0,0,0),(1434488,'197608042004070398','2023-03-02 09:19:47','2023-03-02',0,13000,0,500,50000,50000,0,0,0,0,0,0,50000,0,2,0,269,0,1,0,0,0,0,0,0,0,NULL,2023,1,NULL,0,0,0,0,0,0),(1434489,'196606072001070132','2023-03-02 09:19:47','2023-03-02',0,13000,0,500,50000,50000,0,0,0,0,0,0,50000,0,2,0,269,0,1,0,0,0,0,0,0,0,NULL,2023,1,NULL,0,0,0,0,0,0),(1434490,'197710262008070465','2023-03-02 09:19:47','2023-03-02',0,13000,0,500,50000,50000,0,0,0,0,0,0,50000,0,2,0,269,0,1,0,0,0,0,0,0,0,NULL,2023,1,NULL,0,0,0,0,0,0),(1434491,'198101232006070421','2023-03-02 09:19:47','2023-03-02',0,13000,0,500,50000,50000,0,0,0,0,0,0,50000,0,2,0,269,0,1,0,0,0,0,0,0,0,NULL,2023,1,NULL,0,0,0,0,0,0),(1434492,'198607102012070507','2023-03-02 09:19:47','2023-03-02',0,13000,0,500,50000,50000,0,0,0,0,0,0,50000,0,2,0,269,0,1,0,0,0,0,0,0,0,NULL,2023,1,NULL,0,0,0,0,0,0),(1434493,'197101091996070265','2023-03-02 09:19:47','2023-03-02',0,13000,0,500,50000,50000,0,0,0,0,0,0,50000,0,2,0,269,0,1,0,0,0,0,0,0,0,NULL,2023,1,NULL,0,0,0,0,0,0),(1434494,'197208221999070316','2023-03-02 09:19:47','2023-03-02',0,13000,0,500,50000,50000,0,0,0,0,0,0,50000,0,2,0,269,0,1,0,0,0,0,0,0,0,NULL,2023,1,NULL,0,0,0,0,0,0),(1434495,'196801071994070195','2023-03-02 09:19:47','2023-03-02',0,13000,0,500,50000,50000,0,0,0,0,0,0,50000,0,2,0,269,0,1,0,0,0,0,0,0,0,NULL,2023,1,NULL,0,0,0,0,0,0),(1434496,'196912161999070314','2023-03-02 09:19:47','2023-03-02',0,13000,0,500,50000,50000,0,0,0,0,0,0,50000,0,2,0,269,0,1,0,0,0,0,0,0,0,NULL,2023,1,NULL,0,0,0,0,0,0),(1434497,'197508291999070317','2023-03-02 09:19:47','2023-03-02',0,13000,0,500,50000,50000,0,0,0,0,0,0,50000,0,2,0,269,0,1,0,0,0,0,0,0,0,NULL,2023,1,NULL,0,0,0,0,0,0),(1434498,'197606202001070361','2023-03-02 09:19:47','2023-03-02',0,13000,0,500,50000,50000,0,0,0,0,0,0,50000,0,2,0,269,0,1,0,0,0,0,0,0,0,NULL,2023,1,NULL,0,0,0,0,0,0),(1434499,'198008292014070532','2023-03-02 09:19:47','2023-03-02',0,13000,0,500,50000,50000,0,0,0,0,0,0,50000,0,2,0,269,0,1,0,0,0,0,0,0,0,NULL,2023,1,NULL,0,0,0,0,0,0),(1434500,'199610182021110863','2023-03-02 09:19:47','2023-03-02',0,13000,0,500,50000,50000,0,0,0,0,0,0,50000,0,2,0,269,0,1,0,0,0,0,0,0,0,NULL,2023,1,NULL,0,0,0,0,0,0),(1434501,'199803202022010866','2023-03-02 09:19:47','2023-03-02',0,13000,0,500,50000,50000,0,0,0,0,0,0,50000,0,2,0,269,0,1,0,0,0,0,0,0,0,NULL,2023,1,NULL,0,0,0,0,0,0),(1434502,'199607072021110864','2023-03-02 09:19:47','2023-03-02',0,13000,0,500,50000,50000,0,0,0,0,0,0,50000,0,2,0,269,0,1,0,0,0,0,0,0,0,NULL,2023,1,NULL,0,0,0,0,0,0),(1434503,'199806152021110865','2023-03-02 09:19:47','2023-03-02',0,13000,0,500,50000,50000,0,0,0,0,0,0,50000,0,2,0,269,0,1,0,0,0,0,0,0,0,NULL,2023,1,NULL,0,0,0,0,0,0);
/*!40000 ALTER TABLE `gaji` ENABLE KEYS */;
UNLOCK TABLES;
DROP TABLE IF EXISTS `gaji_karyawan_sd`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `gaji_karyawan_sd` (
  `id` int NOT NULL AUTO_INCREMENT,
  `pegawai` varchar(50) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci DEFAULT NULL,
  `jabatan_id` int DEFAULT NULL,
  `jenjang_id` int DEFAULT NULL,
  `gapok` bigint DEFAULT NULL,
  `value_reward` bigint DEFAULT NULL,
  `value_inval` bigint DEFAULT NULL,
  `kehadiran` int DEFAULT NULL,
  `sub_total` bigint DEFAULT NULL,
  `potongan` bigint DEFAULT NULL,
  `penyesuaian` bigint DEFAULT NULL,
  `total` bigint DEFAULT NULL,
  `pid` int DEFAULT NULL,
  `value_kehadiran` bigint DEFAULT NULL,
  `status` int DEFAULT NULL,
  `tahun` int DEFAULT NULL,
  `bulan` int DEFAULT NULL,
  `voucher` bigint DEFAULT NULL,
  `potongan_bendahara` bigint DEFAULT NULL,
  `jaminan_pensiun` bigint DEFAULT NULL,
  `jaminan_hari_tua` bigint DEFAULT NULL,
  `bpjs_kesehatan` bigint DEFAULT NULL,
  `status_npwp` int DEFAULT NULL,
  `total_pph21` bigint DEFAULT NULL,
  PRIMARY KEY (`id`) USING BTREE
) ENGINE=InnoDB AUTO_INCREMENT=129 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci ROW_FORMAT=DYNAMIC;
/*!40101 SET character_set_client = @saved_cs_client */;

LOCK TABLES `gaji_karyawan_sd` WRITE;
/*!40000 ALTER TABLE `gaji_karyawan_sd` DISABLE KEYS */;
INSERT INTO `gaji_karyawan_sd` VALUES (75,'10232121',11,4,300000,NULL,0,0,300000,0,0,300000,7,60000,NULL,2024,1,0,NULL,NULL,NULL,NULL,NULL,NULL),(77,'10232122',11,4,300000,NULL,0,0,300000,0,0,300000,9,60000,NULL,2023,11,0,NULL,NULL,NULL,NULL,NULL,NULL),(79,'102321223',11,4,300000,NULL,0,0,300000,0,0,300000,12,60000,NULL,2023,7,0,NULL,0,0,0,0,0),(81,'10232124',11,4,300000,NULL,0,0,300000,18000,0,282000,14,60000,NULL,2023,12,0,NULL,3000,6000,0,0,9000),(82,'10232124',11,4,300000,NULL,0,0,300000,18000,0,282000,15,60000,NULL,2023,8,0,NULL,3000,6000,0,0,9000),(123,'198903052016070583',0,4,0,NULL,0,0,0,0,0,0,27,0,NULL,2023,1,0,NULL,0,0,0,0,0),(124,'197403301995070267',0,4,0,NULL,0,0,0,0,0,0,27,0,NULL,2023,1,0,NULL,0,0,0,0,0),(125,'198202262006070479',0,4,0,NULL,0,0,0,0,0,0,27,0,NULL,2023,1,0,NULL,0,0,0,0,0),(126,'197202081991070203',0,4,0,NULL,0,0,0,0,0,0,27,0,NULL,2023,1,0,NULL,0,0,0,0,0),(127,'197512211995070268',0,4,0,NULL,0,0,0,0,0,0,27,0,NULL,2023,1,0,NULL,0,0,0,0,0),(128,'10232124',11,4,300000,NULL,0,0,300000,18000,0,282000,27,60000,NULL,2023,1,0,NULL,3000,6000,0,0,9000);
/*!40000 ALTER TABLE `gaji_karyawan_sd` ENABLE KEYS */;
UNLOCK TABLES;
DROP TABLE IF EXISTS `gaji_karyawan_sma`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `gaji_karyawan_sma` (
  `id` int NOT NULL AUTO_INCREMENT,
  `pegawai` varchar(50) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci DEFAULT NULL,
  `jabatan_id` int DEFAULT NULL,
  `jenjang_id` int DEFAULT NULL,
  `gapok` bigint DEFAULT NULL,
  `value_reward` bigint DEFAULT NULL,
  `value_inval` bigint DEFAULT NULL,
  `kehadiran` int DEFAULT NULL,
  `sub_total` bigint DEFAULT NULL,
  `potongan` bigint DEFAULT NULL,
  `penyesuaian` bigint DEFAULT NULL,
  `total` bigint DEFAULT NULL,
  `pid` int DEFAULT NULL,
  `value_kehadiran` bigint DEFAULT NULL,
  `status` int DEFAULT NULL,
  `tahun` int DEFAULT NULL,
  `bulan` int DEFAULT NULL,
  `voucher` bigint DEFAULT NULL,
  `potongan_bendahara` bigint DEFAULT NULL,
  `jaminan_pensiun` bigint DEFAULT NULL,
  `jaminan_hari_tua` bigint DEFAULT NULL,
  `total_pph21` bigint DEFAULT NULL,
  `bpjs__kesehatan` int DEFAULT NULL,
  PRIMARY KEY (`id`) USING BTREE
) ENGINE=InnoDB AUTO_INCREMENT=770 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci ROW_FORMAT=DYNAMIC;
/*!40101 SET character_set_client = @saved_cs_client */;

LOCK TABLES `gaji_karyawan_sma` WRITE;
/*!40000 ALTER TABLE `gaji_karyawan_sma` DISABLE KEYS */;
INSERT INTO `gaji_karyawan_sma` VALUES (541,'102321',11,4,300000,NULL,0,26,1860000,11160,0,1848840,77,60000,NULL,2023,12,0,NULL,3000,6000,2160,NULL),(542,'3578102612760004',5,4,0,NULL,0,0,0,2160,0,-2160,77,0,NULL,2023,12,0,NULL,0,0,2160,NULL),(543,'3578165507710006',5,4,0,NULL,0,0,0,2160,0,-2160,77,0,NULL,2023,12,0,NULL,0,0,2160,NULL),(544,'3578165507711006',5,4,0,NULL,0,0,0,2160,0,-2160,77,0,NULL,2023,12,0,NULL,0,0,2160,NULL),(545,'3578161404690001',5,4,0,NULL,0,0,0,2160,0,-2160,77,0,NULL,2023,12,0,NULL,0,0,2160,NULL),(546,'3578295412710002',5,4,0,NULL,0,0,0,2160,0,-2160,77,0,NULL,2023,12,0,NULL,0,0,2160,NULL),(547,'3578161506970003',5,4,0,NULL,0,0,0,2160,0,-2160,77,0,NULL,2023,12,0,NULL,0,0,2160,NULL),(548,'3578051311890004',5,4,0,NULL,0,0,0,2160,0,-2160,77,0,NULL,2023,12,0,NULL,0,0,2160,NULL),(549,'3578172010790002',5,4,0,NULL,0,0,0,2160,0,-2160,77,0,NULL,2023,12,0,NULL,0,0,2160,NULL),(550,'3578170707550002',5,4,0,NULL,0,0,0,2160,0,-2160,77,0,NULL,2023,12,0,NULL,0,0,2160,NULL),(551,'3578081505630004',5,4,0,NULL,0,0,0,2160,0,-2160,77,0,NULL,2023,12,0,NULL,0,0,2160,NULL),(552,'3578081505630005',5,4,0,NULL,0,0,0,2160,0,-2160,77,0,NULL,2023,12,0,NULL,0,0,2160,NULL),(553,'3578161406900005',5,4,0,NULL,0,0,0,2160,0,-2160,77,0,NULL,2023,12,0,NULL,0,0,2160,NULL),(554,'3528040303970001',5,4,0,NULL,0,0,0,2160,0,-2160,77,0,NULL,2023,12,0,0,0,0,2160,NULL),(555,'102321',11,4,300000,NULL,0,26,1860000,11160,0,1848840,80,60000,NULL,2023,11,0,NULL,3000,6000,2160,NULL),(556,'3578102612760004',5,4,0,NULL,0,0,0,2160,0,-2160,80,0,NULL,2023,11,0,NULL,0,0,2160,NULL),(557,'3578165507710006',5,4,0,NULL,0,0,0,2160,0,-2160,80,0,NULL,2023,11,0,NULL,0,0,2160,NULL),(558,'3578165507711006',5,4,0,NULL,0,0,0,2160,0,-2160,80,0,NULL,2023,11,0,NULL,0,0,2160,NULL),(559,'3578161404690001',5,4,0,NULL,0,0,0,2160,0,-2160,80,0,NULL,2023,11,0,NULL,0,0,2160,NULL),(560,'3578295412710002',5,4,0,NULL,0,0,0,2160,0,-2160,80,0,NULL,2023,11,0,NULL,0,0,2160,NULL),(561,'3578161506970003',5,4,0,NULL,0,0,0,2160,0,-2160,80,0,NULL,2023,11,0,NULL,0,0,2160,NULL),(562,'3578051311890004',5,4,0,NULL,0,0,0,2160,0,-2160,80,0,NULL,2023,11,0,NULL,0,0,2160,NULL),(563,'3578172010790002',5,4,0,NULL,0,0,0,2160,0,-2160,80,0,NULL,2023,11,0,NULL,0,0,2160,NULL),(564,'3578170707550002',5,4,0,NULL,0,0,0,2160,0,-2160,80,0,NULL,2023,11,0,NULL,0,0,2160,NULL),(565,'3578081505630004',5,4,0,NULL,0,0,0,2160,0,-2160,80,0,NULL,2023,11,0,NULL,0,0,2160,NULL),(566,'3578081505630005',5,4,0,NULL,0,0,0,2160,0,-2160,80,0,NULL,2023,11,0,NULL,0,0,2160,NULL),(567,'3578161406900005',5,4,0,NULL,0,0,0,2160,0,-2160,80,0,NULL,2023,11,0,NULL,0,0,2160,NULL),(568,'3528040303970001',5,4,0,NULL,0,0,0,2160,0,-2160,80,0,NULL,2023,11,0,NULL,0,0,2160,NULL),(650,'3578102612760004',5,4,0,NULL,0,0,0,0,0,0,92,0,NULL,2023,7,0,NULL,0,0,0,0),(651,'3578165507710006',5,4,0,NULL,0,0,0,0,0,0,92,0,NULL,2023,7,0,NULL,0,0,0,0),(652,'3578165507711006',5,4,0,NULL,0,0,0,0,0,0,92,0,NULL,2023,7,0,NULL,0,0,0,0),(653,'3578161404690001',5,4,0,NULL,0,0,0,0,0,0,92,0,NULL,2023,7,0,NULL,0,0,0,0),(654,'3578295412710002',5,4,0,NULL,0,0,0,0,0,0,92,0,NULL,2023,7,0,NULL,0,0,0,0),(655,'3578161506970003',5,4,0,NULL,0,0,0,0,0,0,92,0,NULL,2023,7,0,NULL,0,0,0,0),(656,'3578051311890004',5,4,0,NULL,0,0,0,0,0,0,92,0,NULL,2023,7,0,NULL,0,0,0,0),(657,'3578172010790002',5,4,0,NULL,0,0,0,0,0,0,92,0,NULL,2023,7,0,NULL,0,0,0,0),(658,'3578170707550002',5,4,0,NULL,0,0,0,0,0,0,92,0,NULL,2023,7,0,NULL,0,0,0,0),(659,'3578081505630004',5,4,0,NULL,0,0,0,0,0,0,92,0,NULL,2023,7,0,NULL,0,0,0,0),(660,'3578081505630005',5,4,0,NULL,0,0,0,0,0,0,92,0,NULL,2023,7,0,NULL,0,0,0,0),(661,'3578161406900005',5,4,0,NULL,0,0,0,0,0,0,92,0,NULL,2023,7,0,NULL,0,0,0,0),(662,'3528040303970001',5,4,0,NULL,0,0,0,0,0,0,92,0,NULL,2023,7,0,NULL,0,0,0,0),(705,'3578102612760004',0,4,0,NULL,0,0,0,0,0,0,102,0,NULL,2023,6,0,NULL,0,0,0,0),(706,'3578165507710006',0,4,0,NULL,0,0,0,0,0,0,102,0,NULL,2023,6,0,NULL,0,0,0,0),(707,'3578165507711006',0,4,0,NULL,0,0,0,0,0,0,102,0,NULL,2023,6,0,NULL,0,0,0,0),(708,'3578161404690001',0,4,0,NULL,0,0,0,0,0,0,102,0,NULL,2023,6,0,NULL,0,0,0,0),(709,'3578295412710002',0,4,0,NULL,0,0,0,0,0,0,102,0,NULL,2023,6,0,NULL,0,0,0,0),(710,'3578161506970003',0,4,0,NULL,0,0,0,0,0,0,102,0,NULL,2023,6,0,NULL,0,0,0,0),(711,'3578051311890004',0,4,0,NULL,0,0,0,0,0,0,102,0,NULL,2023,6,0,NULL,0,0,0,0),(712,'3578172010790002',0,4,0,NULL,0,0,0,0,0,0,102,0,NULL,2023,6,0,NULL,0,0,0,0),(713,'3578170707550002',0,4,0,NULL,0,0,0,0,0,0,102,0,NULL,2023,6,0,NULL,0,0,0,0),(714,'3578081505630004',0,4,0,NULL,0,0,0,0,0,0,102,0,NULL,2023,6,0,NULL,0,0,0,0),(715,'3578081505630005',0,4,0,NULL,0,0,0,0,0,0,102,0,NULL,2023,6,0,NULL,0,0,0,0),(716,'3578161406900005',0,4,0,NULL,0,0,0,0,0,0,102,0,NULL,2023,6,0,NULL,0,0,0,0),(717,'3528040303970001',0,4,0,NULL,0,0,0,0,0,-500,102,0,NULL,2023,6,0,500,0,0,0,0),(718,'3578102612760004',0,4,0,NULL,0,0,0,0,0,0,103,0,NULL,2023,8,0,NULL,0,0,0,0),(719,'3578165507710006',0,4,0,NULL,0,0,0,0,0,0,103,0,NULL,2023,8,0,NULL,0,0,0,0),(720,'3578165507711006',0,4,0,NULL,0,0,0,0,0,0,103,0,NULL,2023,8,0,NULL,0,0,0,0),(721,'3578161404690001',0,4,0,NULL,0,0,0,0,0,0,103,0,NULL,2023,8,0,NULL,0,0,0,0),(722,'3578295412710002',0,4,0,NULL,0,0,0,0,0,0,103,0,NULL,2023,8,0,NULL,0,0,0,0),(723,'3578161506970003',0,4,0,NULL,0,0,0,0,0,0,103,0,NULL,2023,8,0,NULL,0,0,0,0),(724,'3578051311890004',0,4,0,NULL,0,0,0,0,0,0,103,0,NULL,2023,8,0,NULL,0,0,0,0),(725,'3578172010790002',0,4,0,NULL,0,0,0,0,0,0,103,0,NULL,2023,8,0,NULL,0,0,0,0),(726,'3578170707550002',0,4,0,NULL,0,0,0,0,0,0,103,0,NULL,2023,8,0,NULL,0,0,0,0),(727,'3578081505630004',0,4,0,NULL,0,0,0,0,0,0,103,0,NULL,2023,8,0,NULL,0,0,0,0),(728,'3578081505630005',0,4,0,NULL,0,0,0,0,0,0,103,0,NULL,2023,8,0,NULL,0,0,0,0),(729,'3578161406900005',0,4,0,NULL,0,0,0,0,0,0,103,0,NULL,2023,8,0,NULL,0,0,0,0),(730,'3528040303970001',0,4,0,NULL,0,0,0,0,0,0,103,0,NULL,2023,8,0,NULL,0,0,0,0),(731,'3578102612760004',0,4,0,NULL,0,0,0,0,0,0,104,0,NULL,2024,1,0,NULL,0,0,0,0),(732,'3578165507710006',0,4,0,NULL,0,0,0,0,0,0,104,0,NULL,2024,1,0,NULL,0,0,0,0),(733,'3578165507711006',0,4,0,NULL,0,0,0,0,0,0,104,0,NULL,2024,1,0,NULL,0,0,0,0),(734,'3578161404690001',0,4,0,NULL,0,0,0,0,0,0,104,0,NULL,2024,1,0,NULL,0,0,0,0),(735,'3578295412710002',0,4,0,NULL,0,0,0,0,0,0,104,0,NULL,2024,1,0,NULL,0,0,0,0),(736,'3578161506970003',0,4,0,NULL,0,0,0,0,0,0,104,0,NULL,2024,1,0,NULL,0,0,0,0),(737,'3578051311890004',0,4,0,NULL,0,0,0,0,0,0,104,0,NULL,2024,1,0,NULL,0,0,0,0),(738,'3578172010790002',0,4,0,NULL,0,0,0,0,0,0,104,0,NULL,2024,1,0,NULL,0,0,0,0),(739,'3578170707550002',0,4,0,NULL,0,0,0,0,0,0,104,0,NULL,2024,1,0,NULL,0,0,0,0),(740,'3578081505630004',0,4,0,NULL,0,0,0,0,0,0,104,0,NULL,2024,1,0,NULL,0,0,0,0),(741,'3578081505630005',0,4,0,NULL,0,0,0,0,0,0,104,0,NULL,2024,1,0,NULL,0,0,0,0),(742,'3578161406900005',0,4,0,NULL,0,0,0,0,0,0,104,0,NULL,2024,1,0,NULL,0,0,0,0),(743,'3528040303970001',0,4,0,NULL,0,0,0,0,0,0,104,0,NULL,2024,1,0,NULL,0,0,0,0),(744,'3578102612760004',0,4,0,NULL,0,0,0,0,0,0,105,0,NULL,2024,2,0,NULL,0,0,0,0),(745,'3578165507710006',0,4,0,NULL,0,0,0,0,0,0,105,0,NULL,2024,2,0,NULL,0,0,0,0),(746,'3578165507711006',0,4,0,NULL,0,0,0,0,0,0,105,0,NULL,2024,2,0,NULL,0,0,0,0),(747,'3578161404690001',0,4,0,NULL,0,0,0,0,0,0,105,0,NULL,2024,2,0,NULL,0,0,0,0),(748,'3578295412710002',0,4,0,NULL,0,0,0,0,0,0,105,0,NULL,2024,2,0,NULL,0,0,0,0),(749,'3578161506970003',0,4,0,NULL,0,0,0,0,0,0,105,0,NULL,2024,2,0,NULL,0,0,0,0),(750,'3578051311890004',0,4,0,NULL,0,0,0,0,0,0,105,0,NULL,2024,2,0,NULL,0,0,0,0),(751,'3578172010790002',0,4,0,NULL,0,0,0,0,0,0,105,0,NULL,2024,2,0,NULL,0,0,0,0),(752,'3578170707550002',0,4,0,NULL,0,0,0,0,0,0,105,0,NULL,2024,2,0,NULL,0,0,0,0),(753,'3578081505630004',0,4,0,NULL,0,0,0,0,0,0,105,0,NULL,2024,2,0,NULL,0,0,0,0),(754,'3578081505630005',0,4,0,NULL,0,0,0,0,0,0,105,0,NULL,2024,2,0,NULL,0,0,0,0),(755,'3578161406900005',0,4,0,NULL,0,0,0,0,0,0,105,0,NULL,2024,2,0,NULL,0,0,0,0),(756,'3528040303970001',0,4,0,NULL,0,0,0,0,0,0,105,0,NULL,2024,2,0,NULL,0,0,0,0),(757,'3578102612760004',0,4,0,NULL,0,0,0,0,0,0,106,0,NULL,2023,1,0,NULL,0,0,0,0),(758,'3578165507710006',0,4,0,NULL,0,0,0,0,0,0,106,0,NULL,2023,1,0,NULL,0,0,0,0),(759,'3578165507711006',0,4,0,NULL,0,0,0,0,0,0,106,0,NULL,2023,1,0,NULL,0,0,0,0),(760,'3578161404690001',0,4,0,NULL,0,0,0,0,0,0,106,0,NULL,2023,1,0,NULL,0,0,0,0),(761,'3578295412710002',0,4,0,NULL,0,0,0,0,0,0,106,0,NULL,2023,1,0,NULL,0,0,0,0),(762,'3578161506970003',0,4,0,NULL,0,0,0,0,0,0,106,0,NULL,2023,1,0,NULL,0,0,0,0),(763,'3578051311890004',0,4,0,NULL,0,0,0,0,0,0,106,0,NULL,2023,1,0,NULL,0,0,0,0),(764,'3578172010790002',0,4,0,NULL,0,0,0,0,0,0,106,0,NULL,2023,1,0,NULL,0,0,0,0),(765,'3578170707550002',0,4,0,NULL,0,0,0,0,0,0,106,0,NULL,2023,1,0,NULL,0,0,0,0),(766,'3578081505630004',0,4,0,NULL,0,0,0,0,0,0,106,0,NULL,2023,1,0,NULL,0,0,0,0),(767,'3578081505630005',0,4,0,NULL,0,0,0,0,0,0,106,0,NULL,2023,1,0,NULL,0,0,0,0),(768,'3578161406900005',0,4,0,NULL,0,0,0,0,0,0,106,0,NULL,2023,1,0,NULL,0,0,0,0),(769,'3528040303970001',0,4,0,NULL,0,0,0,0,0,0,106,0,NULL,2023,1,0,NULL,0,0,0,0);
/*!40000 ALTER TABLE `gaji_karyawan_sma` ENABLE KEYS */;
UNLOCK TABLES;
DROP TABLE IF EXISTS `gaji_karyawan_smk`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `gaji_karyawan_smk` (
  `id` int NOT NULL AUTO_INCREMENT,
  `pegawai` varchar(50) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci DEFAULT NULL,
  `jabatan_id` int DEFAULT NULL,
  `jenjang_id` int DEFAULT NULL,
  `gapok` bigint DEFAULT NULL,
  `value_reward` bigint DEFAULT NULL,
  `value_inval` bigint DEFAULT NULL,
  `kehadiran` int DEFAULT NULL,
  `sub_total` bigint DEFAULT NULL,
  `potongan` bigint DEFAULT NULL,
  `penyesuaian` bigint DEFAULT NULL,
  `total` bigint DEFAULT NULL,
  `pid` int DEFAULT NULL,
  `value_kehadiran` bigint DEFAULT NULL,
  `status` int DEFAULT NULL,
  `tahun` int DEFAULT NULL,
  `bulan` int DEFAULT NULL,
  `voucher` bigint DEFAULT NULL,
  `potongan_bendahara` bigint DEFAULT NULL,
  `jaminan_pensiun` bigint DEFAULT NULL,
  `jaminan_hari_tua` bigint DEFAULT NULL,
  `total_pph21` bigint DEFAULT NULL,
  `bpjs_kesehatan` bigint DEFAULT NULL,
  `status_npwp` int DEFAULT NULL,
  PRIMARY KEY (`id`) USING BTREE
) ENGINE=InnoDB AUTO_INCREMENT=110 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci ROW_FORMAT=DYNAMIC;
/*!40101 SET character_set_client = @saved_cs_client */;

LOCK TABLES `gaji_karyawan_smk` WRITE;
/*!40000 ALTER TABLE `gaji_karyawan_smk` DISABLE KEYS */;
INSERT INTO `gaji_karyawan_smk` VALUES (89,'10232122',11,4,300000,NULL,0,0,300000,0,0,300000,10,60000,NULL,2023,11,0,NULL,NULL,NULL,NULL,NULL,NULL),(90,'198005032010070499',5,4,0,NULL,0,0,0,0,0,0,10,0,NULL,2023,11,0,NULL,NULL,NULL,NULL,NULL,NULL),(91,'196906211992070223',69,4,0,NULL,0,0,0,0,0,0,10,0,NULL,2023,11,0,NULL,NULL,NULL,NULL,NULL,NULL),(95,'10232122',11,4,300000,NULL,0,0,300000,18000,0,282000,23,60000,NULL,2023,6,0,NULL,3000,6000,9000,0,0),(96,'198005032010070499',10,4,300000,NULL,0,26,1860000,18000,0,1842000,23,60000,NULL,2023,6,0,NULL,3000,6000,9000,0,0),(97,'196906211992070223',69,4,0,NULL,0,0,0,0,0,0,23,0,NULL,2023,6,0,NULL,0,0,0,0,0),(104,'10232122',11,4,300000,NULL,0,0,300000,18000,0,282000,26,60000,NULL,2023,12,0,NULL,3000,6000,9000,0,0),(105,'196906211992070223',69,4,0,NULL,0,0,0,0,0,0,26,0,NULL,2023,12,0,NULL,0,0,0,0,0),(108,'10232122',11,4,300000,NULL,0,0,300000,18000,0,282000,28,60000,NULL,2023,1,0,NULL,3000,6000,9000,0,0),(109,'196906211992070223',69,4,0,NULL,0,0,0,0,0,0,28,0,NULL,2023,1,0,NULL,0,0,0,0,0);
/*!40000 ALTER TABLE `gaji_karyawan_smk` ENABLE KEYS */;
UNLOCK TABLES;
DROP TABLE IF EXISTS `gaji_karyawan_smp`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `gaji_karyawan_smp` (
  `id` int NOT NULL AUTO_INCREMENT,
  `pegawai` varchar(50) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci DEFAULT NULL,
  `jabatan_id` int DEFAULT NULL,
  `jenjang_id` int DEFAULT NULL,
  `gapok` bigint DEFAULT NULL,
  `value_reward` bigint DEFAULT NULL,
  `value_inval` bigint DEFAULT NULL,
  `kehadiran` int DEFAULT NULL,
  `sub_total` bigint DEFAULT NULL,
  `potongan` bigint DEFAULT NULL,
  `penyesuaian` bigint DEFAULT NULL,
  `total` bigint DEFAULT NULL,
  `pid` int DEFAULT NULL,
  `value_kehadiran` bigint DEFAULT NULL,
  `status` int DEFAULT NULL,
  `tahun` int DEFAULT NULL,
  `bulan` int DEFAULT NULL,
  `voucher` int DEFAULT NULL,
  `potongan_bendahara` bigint DEFAULT NULL,
  `jaminan_pensiun` bigint DEFAULT NULL,
  `jaminan_hari_tua` bigint DEFAULT NULL,
  `total_pph21` bigint DEFAULT NULL,
  `bpjs_kesehatan` bigint DEFAULT NULL,
  `status_npwp` int DEFAULT NULL,
  PRIMARY KEY (`id`) USING BTREE
) ENGINE=InnoDB AUTO_INCREMENT=145 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci ROW_FORMAT=DYNAMIC;
/*!40101 SET character_set_client = @saved_cs_client */;

LOCK TABLES `gaji_karyawan_smp` WRITE;
/*!40000 ALTER TABLE `gaji_karyawan_smp` DISABLE KEYS */;
INSERT INTO `gaji_karyawan_smp` VALUES (121,'1023212',11,4,300000,NULL,0,0,300000,0,0,300000,13,60000,NULL,2023,11,0,NULL,NULL,NULL,NULL,NULL,NULL),(122,'198903052016070583',5,4,0,NULL,0,0,0,0,0,0,13,0,NULL,2023,11,0,NULL,NULL,NULL,NULL,NULL,NULL),(123,'197403301995070267',5,4,0,NULL,0,0,0,0,0,0,13,0,NULL,2023,11,0,NULL,NULL,NULL,NULL,NULL,NULL),(124,'198202262006070479',5,4,0,NULL,0,0,0,0,0,0,13,0,NULL,2023,11,0,NULL,NULL,NULL,NULL,NULL,NULL),(125,'197202081991070203',5,4,0,NULL,0,0,0,0,0,0,13,0,NULL,2023,11,0,NULL,NULL,NULL,NULL,NULL,NULL),(126,'197512211995070268',5,4,0,NULL,0,0,0,0,0,0,13,0,NULL,2023,11,0,NULL,NULL,NULL,NULL,NULL,NULL),(127,'1023212',11,3,300000,NULL,0,0,300000,18000,0,282000,23,60000,NULL,2023,12,0,NULL,3000,6000,9000,0,0),(128,'198903052016070583',5,3,0,NULL,0,0,0,0,0,0,23,0,NULL,2023,12,0,NULL,0,0,0,0,0),(129,'197403301995070267',5,3,0,NULL,0,0,0,0,0,0,23,0,NULL,2023,12,0,NULL,0,0,0,0,0),(130,'198202262006070479',5,3,0,NULL,0,0,0,0,0,0,23,0,NULL,2023,12,0,NULL,0,0,0,0,0),(131,'197202081991070203',5,3,0,NULL,0,0,0,0,0,0,23,0,NULL,2023,12,0,NULL,0,0,0,0,0),(132,'197512211995070268',5,3,0,NULL,0,0,0,0,0,0,23,0,NULL,2023,12,0,NULL,0,0,0,0,0),(139,'1023212',11,3,300000,NULL,0,0,300000,18000,0,282000,25,60000,NULL,2023,1,0,NULL,3000,6000,9000,0,0),(140,'198903052016070583',5,3,0,NULL,0,0,0,0,0,0,25,0,NULL,2023,1,0,NULL,0,0,0,0,0),(141,'197403301995070267',5,3,0,NULL,0,0,0,0,0,0,25,0,NULL,2023,1,0,NULL,0,0,0,0,0),(142,'198202262006070479',5,3,0,NULL,0,0,0,0,0,0,25,0,NULL,2023,1,0,NULL,0,0,0,0,0),(143,'197202081991070203',5,3,0,NULL,0,0,0,0,0,0,25,0,NULL,2023,1,0,NULL,0,0,0,0,0),(144,'197512211995070268',5,3,0,NULL,0,0,0,0,0,0,25,0,NULL,2023,1,0,NULL,0,0,0,0,0);
/*!40000 ALTER TABLE `gaji_karyawan_smp` ENABLE KEYS */;
UNLOCK TABLES;
DROP TABLE IF EXISTS `gaji_karyawan_tk`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `gaji_karyawan_tk` (
  `id` int NOT NULL AUTO_INCREMENT,
  `pegawai` varchar(50) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci DEFAULT NULL,
  `jabatan_id` int DEFAULT NULL,
  `jenjang_id` int DEFAULT NULL,
  `gapok` bigint DEFAULT NULL,
  `value_reward` bigint DEFAULT NULL,
  `value_inval` bigint DEFAULT NULL,
  `kehadiran` int DEFAULT NULL,
  `sub_total` bigint DEFAULT NULL,
  `potongan` bigint DEFAULT NULL,
  `penyesuaian` bigint DEFAULT NULL,
  `total` bigint DEFAULT NULL,
  `pid` int DEFAULT NULL,
  `value_kehadiran` bigint DEFAULT NULL,
  `status` int DEFAULT NULL,
  `tahun` int DEFAULT NULL,
  `bulan` int DEFAULT NULL,
  `voucher` int DEFAULT NULL,
  `potongan_bendahara` bigint DEFAULT NULL,
  `jaminan_pensiun` bigint DEFAULT NULL,
  `jaminan_hari_tua` bigint DEFAULT NULL,
  `total_pph21` bigint DEFAULT NULL,
  `bpjs_kesehatan` bigint DEFAULT NULL,
  `status_npwp` int DEFAULT NULL,
  PRIMARY KEY (`id`) USING BTREE
) ENGINE=InnoDB AUTO_INCREMENT=436 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci ROW_FORMAT=DYNAMIC;
/*!40101 SET character_set_client = @saved_cs_client */;

LOCK TABLES `gaji_karyawan_tk` WRITE;
/*!40000 ALTER TABLE `gaji_karyawan_tk` DISABLE KEYS */;
INSERT INTO `gaji_karyawan_tk` VALUES (434,'102321',11,4,300000,NULL,0,26,1860000,18000,0,1842000,82,60000,NULL,2023,7,0,NULL,3000,6000,9000,0,0),(435,'102321',11,4,300000,NULL,0,26,1860000,18000,0,1842000,83,60000,NULL,2023,1,0,NULL,3000,6000,9000,0,0);
/*!40000 ALTER TABLE `gaji_karyawan_tk` ENABLE KEYS */;
UNLOCK TABLES;
DROP TABLE IF EXISTS `gaji_pegawai_tk`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `gaji_pegawai_tk` (
  `id` int DEFAULT NULL,
  `bulan` int DEFAULT NULL,
  `tahun` int DEFAULT NULL,
  `STATUS1` int DEFAULT NULL,
  `datetime` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

LOCK TABLES `gaji_pegawai_tk` WRITE;
/*!40000 ALTER TABLE `gaji_pegawai_tk` DISABLE KEYS */;
/*!40000 ALTER TABLE `gaji_pegawai_tk` ENABLE KEYS */;
UNLOCK TABLES;
DROP TABLE IF EXISTS `gaji_pokok`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `gaji_pokok` (
  `id` int NOT NULL AUTO_INCREMENT,
  `jenjang_id` int DEFAULT NULL,
  `lama_kerja` int DEFAULT NULL,
  `value` bigint DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=420 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

LOCK TABLES `gaji_pokok` WRITE;
/*!40000 ALTER TABLE `gaji_pokok` DISABLE KEYS */;
INSERT INTO `gaji_pokok` VALUES (2,4,0,1500),(3,4,1,1500),(4,4,2,2500),(5,4,3,2500),(6,4,4,2500),(7,4,5,3000),(8,4,6,3000),(9,4,7,3000),(10,4,8,3500),(11,4,9,3500),(12,4,10,3500),(13,4,11,4000),(14,4,12,4000),(15,4,13,4000),(16,4,14,4500),(17,4,15,4500),(18,4,16,4500),(19,4,17,5000),(20,4,18,5000),(21,4,19,5000),(23,4,20,5500),(24,4,21,5500),(25,4,22,5500),(26,4,23,6000),(27,4,24,6000),(28,4,25,6000),(29,4,26,6500),(30,4,27,6500),(31,4,28,6500),(32,4,29,7000),(33,4,30,7000),(34,4,31,7000),(35,4,32,7500),(36,4,33,7500),(37,4,34,7500),(38,4,35,8000),(39,4,36,8000),(40,4,37,8000),(41,4,38,8500),(42,4,39,8500),(43,4,40,8500),(44,4,41,9000),(45,4,42,9000),(46,4,43,9000),(47,4,44,9500),(48,4,45,9500),(49,4,46,9500),(50,4,47,10000),(51,4,48,10000),(52,4,49,10000),(53,4,50,10500),(208,5,0,1500),(209,5,1,1500),(210,5,2,2500),(211,5,3,2500),(212,5,4,2500),(213,5,5,3000),(214,5,6,3000),(215,5,7,3000),(216,5,8,3500),(217,5,9,3500),(218,5,10,3500),(219,5,11,4000),(220,5,12,4000),(221,5,13,4000),(222,5,14,4500),(223,5,15,4500),(224,5,16,4500),(225,5,17,5000),(226,5,18,5000),(227,5,19,5000),(228,5,20,5500),(229,5,21,5500),(230,5,22,5500),(231,5,23,6000),(232,5,24,6000),(233,5,25,6000),(234,5,26,6500),(235,5,27,6500),(236,5,28,6500),(237,5,29,7000),(238,5,30,7000),(239,5,31,7000),(240,5,32,7500),(241,5,33,7500),(242,5,34,7500),(243,5,35,8000),(244,5,36,8000),(245,5,37,8000),(246,5,38,8500),(247,5,39,8500),(248,5,40,8500),(249,5,41,9000),(250,5,42,9000),(251,5,43,9000),(252,5,44,9500),(253,5,45,9500),(254,5,46,9500),(255,5,47,10000),(256,5,48,10000),(257,5,49,10000),(258,5,50,10500),(259,1,0,1500),(260,1,1,1500),(261,1,2,2500),(262,1,3,2500),(263,1,4,2500),(264,1,5,3000),(265,1,6,3000),(266,1,7,3000),(267,1,8,3500),(268,1,9,3500),(269,1,10,3500),(270,1,11,4000),(271,1,12,4000),(272,1,13,4000),(273,1,14,4500),(274,1,15,4500),(275,1,16,4500),(276,1,17,5000),(277,1,18,5000),(278,1,19,5000),(279,1,20,5500),(280,1,21,5500),(281,1,22,5500),(282,1,23,6000),(283,1,24,6000),(284,1,25,6000),(285,1,26,6500),(286,1,27,6500),(287,1,28,6500),(288,1,29,7000),(289,1,30,7000),(290,1,31,7000),(291,1,32,7500),(292,1,33,7500),(293,1,34,7500),(294,1,35,8000),(295,1,36,8000),(296,1,37,8000),(297,1,38,8500),(298,1,39,8500),(299,1,40,8500),(300,1,41,9000),(301,1,42,9000),(302,1,43,9000),(303,1,44,9500),(304,1,45,9500),(305,1,46,9500),(306,1,47,10000),(307,1,48,10000),(308,1,49,10000),(309,1,50,10500),(326,3,0,1500),(327,3,1,1500),(328,3,2,2500),(329,3,3,2500),(330,3,4,2500),(331,3,5,3000),(332,3,6,3000),(333,3,7,3000),(334,3,8,3500),(335,3,9,3500),(336,3,10,3500),(337,3,11,4000),(338,3,12,4000),(339,3,13,4000),(340,3,14,4500),(341,3,15,4500),(342,3,16,4500),(343,3,17,5000),(344,3,18,5000),(345,3,19,5000),(346,3,20,5500),(347,3,21,5500),(348,3,22,5500),(349,3,23,6000),(350,3,24,6000),(351,3,25,6000),(352,3,26,6500),(353,3,27,6500),(354,3,28,6500),(355,3,29,7000),(356,3,30,7000),(357,3,31,7000),(358,3,32,7500),(359,3,33,7500),(360,3,34,7500),(361,3,35,8000),(362,3,36,8000),(363,3,37,8000),(364,3,38,8500),(365,3,39,8500),(366,3,40,8500),(367,3,41,9000),(368,3,42,9000),(369,3,43,9000),(370,3,44,9500),(371,3,45,9500),(372,3,46,9500),(373,3,47,10000),(374,3,48,10000),(375,3,49,10000),(376,3,50,10000),(377,2,0,500),(378,2,1,500),(379,2,2,1000),(380,2,3,1750),(381,2,4,1750),(382,2,5,1750),(383,2,6,2500),(384,2,7,2500),(385,2,8,2500),(386,2,9,3250),(387,2,10,3250),(388,2,11,3250),(389,2,12,4000),(390,2,13,4000),(391,2,14,4000),(392,2,15,4750),(393,2,16,4750),(394,2,17,4750),(395,2,18,5500),(396,2,19,5500),(397,2,20,5500),(398,2,21,6250),(399,2,22,6250),(400,2,23,6250),(401,2,24,7000),(402,2,25,7000),(403,2,26,7000),(404,2,27,7750),(405,2,28,7750),(406,2,29,7750),(407,2,30,8500),(408,2,31,8500),(409,2,32,8500),(410,2,33,9250),(411,2,34,9250),(412,2,35,9250),(413,2,36,10000),(414,2,37,10000),(415,2,38,10000),(416,2,39,10750),(417,2,40,10750),(418,2,41,10750),(419,2,42,11500);
/*!40000 ALTER TABLE `gaji_pokok` ENABLE KEYS */;
UNLOCK TABLES;
DROP TABLE IF EXISTS `gaji_pokok_kayawan`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `gaji_pokok_kayawan` (
  `id` int NOT NULL AUTO_INCREMENT,
  `jenjang_id` int DEFAULT NULL,
  `value` bigint DEFAULT NULL,
  `jabatan_id` bigint DEFAULT NULL,
  PRIMARY KEY (`id`) USING BTREE
) ENGINE=InnoDB AUTO_INCREMENT=99 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci ROW_FORMAT=DYNAMIC;
/*!40101 SET character_set_client = @saved_cs_client */;

LOCK TABLES `gaji_pokok_kayawan` WRITE;
/*!40000 ALTER TABLE `gaji_pokok_kayawan` DISABLE KEYS */;
INSERT INTO `gaji_pokok_kayawan` VALUES (84,4,300000,10),(85,4,450000,12),(86,4,300000,11),(87,2,300000,10),(88,2,450000,12),(89,2,300000,11),(90,3,300000,10),(91,3,450000,12),(92,3,300000,11),(93,5,300000,10),(94,5,450000,12),(95,5,300000,11),(96,1,300000,10),(97,1,450000,12),(98,1,300000,11);
/*!40000 ALTER TABLE `gaji_pokok_kayawan` ENABLE KEYS */;
UNLOCK TABLES;
DROP TABLE IF EXISTS `gaji_pokok_tu`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `gaji_pokok_tu` (
  `id` int NOT NULL AUTO_INCREMENT,
  `jenjang_id` int DEFAULT NULL,
  `value` bigint DEFAULT NULL,
  `ijazah` int DEFAULT NULL,
  `lama_kerja` int DEFAULT NULL,
  PRIMARY KEY (`id`) USING BTREE
) ENGINE=InnoDB AUTO_INCREMENT=527 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci ROW_FORMAT=DYNAMIC;
/*!40101 SET character_set_client = @saved_cs_client */;

LOCK TABLES `gaji_pokok_tu` WRITE;
/*!40000 ALTER TABLE `gaji_pokok_tu` DISABLE KEYS */;
INSERT INTO `gaji_pokok_tu` VALUES (84,4,65000,3,0),(85,4,80000,8,0),(86,4,77500,3,3),(87,4,92500,8,3),(88,4,90000,3,6),(89,4,105000,8,6),(90,4,102500,3,9),(92,4,115000,3,12),(93,4,130000,8,12),(94,4,127500,3,15),(95,4,142500,8,15),(96,4,140000,3,18),(97,4,155000,8,18),(98,4,152500,3,21),(99,4,167500,8,21),(100,4,165000,3,24),(101,4,180000,8,24),(102,4,177500,3,27),(103,4,192500,8,27),(104,4,190000,3,30),(105,4,205000,8,30),(106,4,202500,3,33),(107,4,217500,8,33),(108,4,201500,3,36),(109,4,230000,8,36),(110,4,227500,3,39),(111,4,242500,8,39),(112,4,240000,3,42),(113,4,255000,8,42),(115,2,65000,3,0),(116,2,80000,8,0),(117,2,77500,3,3),(118,2,92500,8,3),(119,2,90000,3,6),(120,2,105000,8,6),(121,2,102500,3,9),(122,2,117500,8,9),(123,2,115000,3,12),(124,2,130000,8,12),(125,2,127500,3,15),(126,2,142500,8,15),(127,2,140000,3,18),(128,2,155000,8,18),(129,2,152500,3,21),(130,2,167500,8,21),(131,2,165000,3,24),(132,2,180000,8,24),(133,2,177500,3,27),(134,2,192500,8,27),(135,2,190000,3,30),(136,2,205000,8,30),(137,2,202500,3,33),(138,2,217500,8,33),(139,2,215000,3,36),(140,2,230000,8,36),(141,2,227500,3,39),(142,2,242500,8,39),(143,2,240000,3,42),(144,2,255000,8,42),(145,5,65000,3,0),(146,5,80000,8,0),(147,5,77500,3,3),(148,5,92500,8,3),(149,5,90000,3,6),(150,5,105000,8,6),(151,5,102500,3,9),(152,5,117500,8,9),(153,5,115000,3,12),(154,5,130000,8,12),(155,5,127500,3,15),(156,5,142500,8,15),(157,5,140000,3,18),(158,5,155000,8,18),(159,5,152500,3,21),(160,5,167500,8,21),(161,5,165000,3,24),(162,5,180000,8,24),(163,5,177500,3,27),(164,5,192500,8,27),(165,5,190000,3,30),(166,5,205000,8,30),(167,5,202500,3,33),(168,5,217500,8,33),(169,5,215000,3,36),(170,5,230000,8,36),(171,5,227500,3,39),(172,5,242500,8,39),(173,5,240000,3,42),(174,5,255000,8,42),(175,3,65000,3,0),(176,3,80000,8,0),(177,3,77500,3,3),(178,3,92500,8,3),(179,3,90000,3,6),(180,3,105000,8,6),(181,3,102500,3,9),(182,3,117500,8,9),(183,3,115000,3,12),(184,3,130000,8,12),(185,3,127500,3,15),(186,3,142500,8,15),(187,3,140000,3,18),(188,3,155000,8,18),(189,3,152500,3,21),(190,3,167500,8,21),(191,3,165000,3,24),(192,3,180000,8,24),(193,3,177500,3,27),(194,3,192500,8,27),(195,3,190000,3,30),(196,3,205000,8,30),(197,3,202500,3,33),(198,3,217500,8,33),(199,3,215000,3,36),(200,3,230000,8,36),(201,3,227500,3,39),(202,3,242500,8,39),(203,3,240000,3,42),(204,3,255000,8,42),(206,4,65000,3,2),(207,4,80000,8,1),(208,4,80000,8,2),(209,4,77500,3,4),(210,4,77500,3,5),(211,4,92500,8,4),(212,4,92500,8,5),(215,3,242500,8,40),(217,3,227500,3,40),(218,4,65000,3,1),(222,2,65000,3,1),(223,2,65000,3,2),(224,2,80000,8,1),(225,2,80000,8,2),(226,2,77500,3,4),(227,2,77500,3,5),(228,2,92500,8,4),(229,2,92500,8,5),(230,2,117500,8,10),(232,2,117500,8,11),(233,2,102500,3,10),(234,2,102500,3,11),(235,2,90000,3,7),(236,2,90000,3,8),(237,2,115000,3,13),(238,2,115000,3,14),(239,2,130000,8,13),(240,2,130000,8,14),(241,2,127500,3,16),(242,2,127500,3,17),(243,2,142500,8,16),(244,2,142500,8,17),(245,2,155000,8,19),(246,2,155000,8,20),(247,2,140000,3,19),(248,2,140000,3,20),(249,2,167500,8,22),(250,2,167500,8,23),(251,2,152500,3,22),(252,2,152500,3,23),(253,2,165000,3,25),(254,2,165000,3,26),(255,2,180000,8,25),(256,2,180000,8,26),(257,2,177500,3,28),(258,2,177500,3,29),(259,2,105000,8,8),(260,2,192500,8,28),(261,2,192500,8,29),(262,2,205000,8,31),(263,2,190000,3,31),(264,2,190000,3,32),(265,2,205000,8,32),(266,2,217500,8,34),(267,2,217500,8,35),(268,2,202500,3,34),(269,2,202500,3,35),(270,2,215000,3,37),(271,2,230000,8,37),(272,2,215000,3,38),(273,2,230000,8,38),(274,2,227500,3,40),(275,2,227500,3,41),(276,2,242500,8,40),(277,2,242500,8,41),(278,3,65000,3,1),(279,3,80000,8,1),(280,3,65000,3,2),(281,3,80000,8,2),(282,3,77500,3,4),(283,3,92500,8,4),(284,3,77500,3,5),(285,3,92500,8,5),(286,3,90000,3,7),(287,3,105000,8,7),(288,3,90000,3,8),(289,3,105000,8,8),(290,3,102500,3,10),(291,3,117500,8,10),(292,3,102500,3,11),(293,3,117500,8,11),(294,3,115000,3,13),(295,3,130000,8,13),(296,3,115000,3,14),(297,3,130000,8,14),(298,3,127500,3,16),(299,3,142500,8,16),(300,3,127500,3,17),(301,3,142500,8,17),(302,3,140000,3,19),(303,3,155000,8,19),(304,3,140000,3,20),(305,3,155000,8,20),(306,3,152500,3,22),(307,3,167500,8,22),(308,3,152500,3,23),(309,3,167500,8,23),(310,3,165000,3,25),(311,3,180000,8,25),(312,3,165000,3,26),(313,3,180000,8,26),(314,3,177500,3,28),(315,3,192500,8,28),(316,3,177500,3,29),(317,3,192500,8,29),(318,3,190000,3,31),(319,3,205000,8,31),(320,3,190000,3,32),(321,3,205000,8,32),(322,3,202500,3,34),(323,3,217500,8,34),(324,3,202500,3,35),(325,3,217500,8,35),(326,3,215000,3,37),(327,3,230000,8,37),(328,3,215000,3,38),(329,3,230000,8,38),(330,3,227500,3,40),(331,3,242500,8,40),(332,3,227500,3,41),(333,3,242500,8,41),(334,1,65000,3,0),(335,1,80000,8,0),(336,1,65000,3,1),(337,1,80000,8,1),(338,1,65000,3,2),(339,1,80000,8,2),(340,1,77500,3,3),(341,1,92500,8,3),(342,1,77500,3,4),(343,1,92500,8,4),(344,1,77500,3,5),(345,1,92500,8,5),(346,1,90000,3,6),(347,1,105000,8,6),(348,1,90000,3,7),(349,1,105000,8,7),(350,1,90000,3,8),(351,1,105000,8,8),(352,1,102500,3,9),(353,1,117500,8,9),(354,1,102500,3,10),(355,1,117500,8,10),(356,1,102500,3,11),(357,1,117500,8,11),(358,1,115000,3,12),(359,1,130000,8,12),(360,1,130000,8,13),(361,1,115000,3,13),(362,1,130000,8,14),(363,1,115000,3,14),(364,1,127500,3,15),(365,1,142500,8,15),(366,1,127500,3,16),(367,1,142500,8,16),(368,1,127500,3,17),(369,1,142500,8,17),(370,1,140000,3,18),(371,1,155000,8,18),(372,1,140000,3,19),(373,1,155000,8,19),(374,1,140000,3,20),(375,1,155000,8,20),(376,1,152500,3,21),(377,1,167500,8,21),(378,1,152500,3,22),(379,1,167500,8,22),(380,1,167500,8,23),(381,1,152500,3,23),(382,1,165000,3,24),(383,1,180000,8,24),(384,1,180000,8,25),(385,1,165000,3,25),(386,1,180000,8,26),(387,1,165000,3,26),(388,1,177500,3,27),(389,1,192500,8,27),(390,1,177500,3,28),(391,1,192500,8,28),(392,1,177500,3,29),(393,1,192500,8,29),(394,1,190000,3,30),(395,1,205000,8,30),(396,1,190000,3,31),(397,1,205000,8,31),(398,1,190000,3,32),(399,1,205000,8,32),(400,1,202500,3,33),(401,1,217500,8,33),(402,1,202500,3,34),(403,1,217500,8,34),(404,1,202500,3,35),(405,1,217500,8,35),(406,1,215000,3,36),(407,1,230000,8,36),(408,1,215000,3,37),(409,1,230000,8,37),(410,1,215000,3,38),(411,1,230000,8,38),(412,1,227500,3,39),(413,1,242500,8,39),(414,1,242500,8,40),(415,1,227500,3,40),(416,1,227500,3,40),(417,1,242500,8,40),(418,1,227500,3,41),(419,1,242500,8,41),(420,1,240000,3,42),(421,1,255000,8,42),(422,5,65000,3,1),(423,5,80000,8,1),(424,5,65000,3,2),(425,5,80000,8,2),(426,5,77500,3,4),(427,5,92500,8,4),(428,5,77500,3,5),(429,5,92500,8,5),(430,5,90000,3,7),(431,5,105000,8,7),(432,5,90000,3,8),(433,5,105000,8,8),(434,5,102500,3,10),(435,5,117500,8,10),(436,5,102500,3,11),(437,5,117500,8,11),(438,5,115000,3,13),(439,5,130000,8,13),(440,5,115000,3,14),(441,5,130000,8,14),(442,5,127500,3,16),(443,5,142500,8,16),(444,5,127500,3,17),(445,5,142500,8,17),(446,5,140000,3,19),(447,5,155000,8,19),(448,5,140000,3,20),(449,5,155000,8,20),(450,5,152500,3,22),(451,5,167500,8,22),(452,5,152500,3,23),(453,5,167500,8,23),(454,5,165000,3,25),(455,5,180000,8,25),(456,5,165000,3,26),(457,5,180000,8,26),(458,5,177500,3,28),(459,5,192500,8,28),(460,5,177500,3,29),(461,5,192500,8,29),(462,5,190000,3,31),(463,5,205000,8,31),(464,5,190000,3,32),(465,5,205000,8,32),(466,5,202500,3,34),(467,5,217500,8,34),(468,5,202500,3,35),(469,5,217500,8,35),(470,5,215000,3,37),(471,5,230000,8,37),(472,5,215000,3,38),(473,5,230000,8,38),(474,5,227500,3,40),(475,5,242500,8,40),(476,5,227500,3,41),(477,5,242500,8,41),(478,4,117500,8,9),(479,4,90000,3,7),(480,4,105000,8,7),(481,4,90000,3,8),(482,4,105000,8,8),(483,4,102500,3,10),(484,4,117500,8,10),(485,4,102500,3,11),(486,4,117500,8,11),(487,4,115000,3,13),(488,4,130000,8,13),(489,4,115000,3,14),(490,4,130000,8,14),(491,4,127500,3,16),(492,4,142500,8,16),(493,4,127500,3,17),(494,4,142500,8,17),(495,4,140000,3,19),(496,4,155000,8,19),(497,4,140000,3,20),(498,4,155000,8,20),(499,4,152500,3,22),(500,4,167500,8,22),(501,4,152500,3,23),(502,4,167500,8,23),(503,4,165000,3,25),(504,4,180000,8,25),(505,4,165000,3,26),(506,4,180000,8,26),(507,4,177500,3,28),(508,4,192500,8,28),(509,4,177500,3,29),(510,4,192500,8,29),(511,4,190000,3,31),(512,4,205000,8,31),(513,4,190000,3,32),(514,4,205000,8,32),(515,4,202500,3,34),(516,4,217500,8,34),(517,4,202500,3,35),(518,4,217500,8,35),(519,4,215000,3,37),(520,4,230000,8,37),(521,4,215000,3,38),(522,4,230000,8,38),(523,4,227500,3,40),(524,4,242500,8,40),(525,4,227500,3,41),(526,4,242500,8,41);
/*!40000 ALTER TABLE `gaji_pokok_tu` ENABLE KEYS */;
UNLOCK TABLES;
DROP TABLE IF EXISTS `gaji_sma`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `gaji_sma` (
  `id` int NOT NULL AUTO_INCREMENT,
  `pegawai` varchar(50) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci DEFAULT NULL,
  `datetime` datetime DEFAULT NULL,
  `month` date DEFAULT NULL,
  `lembur` int DEFAULT NULL,
  `value_lembur` bigint DEFAULT NULL,
  `jabatan_id` int DEFAULT NULL,
  `gapok` bigint DEFAULT NULL,
  `total` bigint DEFAULT NULL,
  `value_reward` bigint DEFAULT NULL,
  `value_inval` bigint DEFAULT NULL,
  `piket_count` int DEFAULT NULL,
  `value_piket` bigint DEFAULT NULL,
  `tugastambahan` bigint DEFAULT NULL,
  `tj_jabatan` bigint DEFAULT NULL,
  `kehadiran` int DEFAULT NULL,
  `sub_total` bigint DEFAULT NULL,
  `potongan` bigint DEFAULT NULL,
  `jenjang_id` int DEFAULT NULL,
  `penyesuaian` bigint DEFAULT NULL,
  `pid` int DEFAULT NULL,
  `jp` int DEFAULT NULL,
  `type` int DEFAULT NULL,
  `jenis_guru` int DEFAULT NULL,
  `tambahan` int DEFAULT NULL,
  `value_kehadiran` int DEFAULT NULL,
  `periode` int DEFAULT NULL,
  `tunjangan_periode` bigint DEFAULT NULL,
  `total_gapok` bigint DEFAULT NULL,
  `lama_kerja` int DEFAULT NULL,
  `status` int DEFAULT NULL,
  `tahun` int DEFAULT NULL,
  `bulan` int DEFAULT NULL,
  `potongan_bendahara` bigint DEFAULT NULL,
  `voucher` bigint DEFAULT NULL,
  `jaminan_pensiun` bigint DEFAULT NULL,
  `jaminan_hari_tua` bigint DEFAULT NULL,
  `total_pph21` bigint DEFAULT NULL,
  `status_npwp` int DEFAULT NULL,
  `bpjs_kesehatan` bigint DEFAULT NULL,
  PRIMARY KEY (`id`) USING BTREE
) ENGINE=InnoDB AUTO_INCREMENT=4727 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci ROW_FORMAT=DYNAMIC;
/*!40101 SET character_set_client = @saved_cs_client */;

LOCK TABLES `gaji_sma` WRITE;
/*!40000 ALTER TABLE `gaji_sma` DISABLE KEYS */;
INSERT INTO `gaji_sma` VALUES (4042,'10230','2023-02-22 07:49:40','2023-02-22',3,13000,5,2500,3980400,50000,132000,1,7000,125000,450000,48,4061000,126600,4,46000,587,48,1,1,2,56000,4,450000,120000,2,NULL,2023,12,NULL,30000,1200,2400,3000,1,NULL),(4043,'10235','2023-02-22 07:49:40','2023-02-22',0,13000,9,1500,2849430,50000,0,0,8250,0,0,48,3290000,440570,4,0,587,48,1,2,0,66000,0,0,72000,0,NULL,2023,12,NULL,40000,720,1440,2160,2,NULL),(4044,'3578171005780011','2023-02-22 07:49:40','2023-02-22',0,13000,5,1500,497840,50000,0,0,0,0,450000,0,500000,2160,4,0,587,0,1,0,0,0,0,0,0,0,NULL,2023,12,100000,0,0,0,2160,0,NULL),(4045,'3578164404680002','2023-02-22 07:49:40','2023-02-22',0,13000,5,1500,497840,50000,0,0,0,0,450000,0,500000,2160,4,0,587,0,1,0,0,0,0,0,0,0,NULL,2023,12,NULL,0,0,0,2160,0,NULL),(4046,'3578152104890001','2023-02-22 07:49:40','2023-02-22',0,13000,5,1500,497840,50000,0,0,0,0,450000,0,500000,2160,4,0,587,0,1,0,0,0,0,0,0,0,NULL,2023,12,NULL,0,0,0,2160,0,NULL),(4047,'3578081005990004','2023-02-22 07:49:40','2023-02-22',0,13000,5,1500,497840,50000,0,0,0,0,450000,0,500000,2160,4,0,587,0,1,0,0,0,0,0,0,0,NULL,2023,12,NULL,0,0,0,2160,0,NULL),(4048,'3578174905600001','2023-02-22 07:49:40','2023-02-22',0,13000,5,1500,497840,50000,0,0,0,0,450000,0,500000,2160,4,0,587,0,1,0,0,0,0,0,0,0,NULL,2023,12,NULL,0,0,0,2160,0,NULL),(4049,'3578166610880002','2023-02-22 07:49:40','2023-02-22',0,13000,5,1500,497840,50000,0,0,0,0,450000,0,500000,2160,4,0,587,0,1,0,0,0,0,0,0,0,NULL,2023,12,NULL,0,0,0,2160,0,NULL),(4050,'3578104406840008','2023-02-22 07:49:40','2023-02-22',0,13000,5,1500,497840,50000,0,0,0,0,450000,0,500000,2160,4,0,587,0,1,0,0,0,0,0,0,0,NULL,2023,12,NULL,0,0,0,2160,0,NULL),(4051,'3578107103570001','2023-02-22 07:49:40','2023-02-22',0,13000,5,1500,497840,50000,0,0,0,0,450000,0,500000,2160,4,0,587,0,1,0,0,0,0,0,0,0,NULL,2023,12,0,0,0,0,2160,0,NULL),(4052,'3578172009850003','2023-02-22 07:49:41','2023-02-22',0,13000,5,1500,497840,50000,0,0,0,0,450000,0,500000,2160,4,0,587,0,1,0,0,0,0,0,0,0,NULL,2023,12,NULL,0,0,0,2160,0,NULL),(4053,'3578176908920001','2023-02-22 07:49:41','2023-02-22',0,13000,5,1500,497840,50000,0,0,0,0,450000,0,500000,2160,4,0,587,0,1,0,0,0,0,0,0,0,NULL,2023,12,NULL,0,0,0,2160,0,NULL),(4054,'3578290802610001','2023-02-22 07:49:41','2023-02-22',0,13000,5,1500,497840,50000,0,0,0,0,450000,0,500000,2160,4,0,587,0,1,0,0,0,0,0,0,0,NULL,2023,12,NULL,0,0,0,2160,0,NULL),(4055,'3507125312760003','2023-02-22 07:49:41','2023-02-22',0,13000,5,1500,497840,50000,0,0,0,0,450000,0,500000,2160,4,0,587,0,1,0,0,0,0,0,0,0,NULL,2023,12,NULL,0,0,0,2160,0,NULL),(4056,'3578177110750002','2023-02-22 07:49:41','2023-02-22',0,13000,5,1500,497840,50000,0,0,0,0,450000,0,500000,2160,4,0,587,0,1,0,0,0,0,0,0,0,NULL,2023,12,NULL,0,0,0,2160,0,NULL),(4057,'3578106707700007','2023-02-22 07:49:41','2023-02-22',0,13000,5,1500,497840,50000,0,0,0,0,450000,0,500000,2160,4,0,587,0,1,0,0,0,0,0,0,0,NULL,2023,12,NULL,0,0,0,2160,0,NULL),(4058,'3318021307950001','2023-02-22 07:49:41','2023-02-22',0,13000,5,1500,497840,50000,0,0,0,0,450000,0,500000,2160,4,0,587,0,1,0,0,0,0,0,0,0,NULL,2023,12,NULL,0,0,0,2160,0,NULL),(4059,'3578174103730002','2023-02-22 07:49:41','2023-02-22',0,13000,5,1500,497840,50000,0,0,0,0,450000,0,500000,2160,4,0,587,0,1,0,0,0,0,0,0,0,NULL,2023,12,NULL,0,0,0,2160,0,NULL),(4060,'3578172801700001','2023-02-22 07:49:41','2023-02-22',0,13000,5,1500,497840,50000,0,0,0,0,450000,0,500000,2160,4,0,587,0,1,0,0,0,0,0,0,0,NULL,2023,12,NULL,0,0,0,2160,0,NULL),(4061,'3578115511810005','2023-02-22 07:49:41','2023-02-22',0,13000,5,1500,497840,50000,0,0,0,0,450000,0,500000,2160,4,0,587,0,1,0,0,0,0,0,0,0,NULL,2023,12,NULL,0,0,0,2160,0,NULL),(4062,'3578174806780006','2023-02-22 07:49:41','2023-02-22',0,13000,5,1500,497840,50000,0,0,0,0,450000,0,500000,2160,4,0,587,0,1,0,0,0,0,0,0,0,NULL,2023,12,NULL,0,0,0,2160,0,NULL),(4063,'3578100107750004','2023-02-22 07:49:41','2023-02-22',0,13000,5,1500,497840,50000,0,0,0,0,450000,0,500000,2160,4,0,587,0,1,0,0,0,0,0,0,0,NULL,2023,12,NULL,0,0,0,2160,0,NULL),(4064,'3578175908760001','2023-02-22 07:49:41','2023-02-22',0,13000,5,1500,497840,50000,0,0,0,0,450000,0,500000,2160,4,0,587,0,1,0,0,0,0,0,0,0,NULL,2023,12,NULL,0,0,0,2160,0,NULL),(4065,'3578196903960001','2023-02-22 07:49:41','2023-02-22',0,13000,5,1500,497840,50000,0,0,0,0,450000,0,500000,2160,4,0,587,0,1,0,0,0,0,0,0,0,NULL,2023,12,NULL,0,0,0,2160,0,NULL),(4066,'3578174803810011','2023-02-22 07:49:41','2023-02-22',0,13000,5,1500,497840,50000,0,0,0,0,450000,0,500000,2160,4,0,587,0,1,0,0,0,0,0,0,0,NULL,2023,12,NULL,0,0,0,2160,0,NULL),(4067,'3578105009820004','2023-02-22 07:49:41','2023-02-22',0,13000,5,1500,497840,50000,0,0,0,0,450000,0,500000,2160,4,0,587,0,1,0,0,0,0,0,0,0,NULL,2023,12,NULL,0,0,0,2160,0,NULL),(4068,'3524136904780002','2023-02-22 07:49:41','2023-02-22',0,13000,5,1500,497840,50000,0,0,0,0,450000,0,500000,2160,4,0,587,0,1,0,0,0,0,0,0,0,NULL,2023,12,NULL,0,0,0,2160,0,NULL),(4069,'3578167006760220','2023-02-22 07:49:41','2023-02-22',0,13000,5,1500,497840,50000,0,0,0,0,450000,0,500000,2160,4,0,587,0,1,0,0,0,0,0,0,0,NULL,2023,12,NULL,0,0,0,2160,0,NULL),(4070,'3578171412910002','2023-02-22 07:49:41','2023-02-22',0,13000,5,1500,497840,50000,0,0,0,0,450000,0,500000,2160,4,0,587,0,1,0,0,0,0,0,0,0,NULL,2023,12,NULL,0,0,0,2160,0,NULL),(4071,'3527034411894028','2023-02-22 07:49:41','2023-02-22',0,13000,5,1500,497840,50000,0,0,0,0,450000,0,500000,2160,4,0,587,0,1,0,0,0,0,0,0,0,NULL,2023,12,NULL,0,0,0,2160,0,NULL),(4072,'3578102204820010','2023-02-22 07:49:41','2023-02-22',0,13000,5,1500,497840,50000,0,0,0,0,450000,0,500000,2160,4,0,587,0,1,0,0,0,0,0,0,0,NULL,2023,12,NULL,0,0,0,2160,0,NULL),(4073,'3578171409590002','2023-02-22 07:49:41','2023-02-22',0,13000,5,1500,497840,50000,0,0,0,0,450000,0,500000,2160,4,0,587,0,1,0,0,0,0,0,0,0,NULL,2023,12,NULL,0,0,0,2160,0,NULL),(4074,'3578161009930005','2023-02-22 07:49:41','2023-02-22',0,13000,5,1500,497840,50000,0,0,0,0,450000,0,500000,2160,4,0,587,0,1,0,0,0,0,0,0,0,NULL,2023,12,NULL,0,0,0,2160,0,NULL),(4075,'3578045203920004','2023-02-22 07:49:41','2023-02-22',0,13000,5,1500,497840,50000,0,0,0,0,450000,0,500000,2160,4,0,587,0,1,0,0,0,0,0,0,0,NULL,2023,12,NULL,0,0,0,2160,0,NULL),(4076,'3578282504960001','2023-02-22 07:49:41','2023-02-22',0,13000,5,1500,497840,50000,0,0,0,0,450000,0,500000,2160,4,0,587,0,1,0,0,0,0,0,0,0,NULL,2023,12,NULL,0,0,0,2160,0,NULL),(4077,'3578271302990004','2023-02-22 07:49:41','2023-02-22',0,13000,5,1500,497840,50000,0,0,0,0,450000,0,500000,2160,4,0,587,0,1,0,0,0,0,0,0,0,NULL,2023,12,NULL,0,0,0,2160,0,NULL),(4078,'3578102704970005','2023-02-22 07:49:41','2023-02-22',0,13000,5,1500,497840,50000,0,0,0,0,450000,0,500000,2160,4,0,587,0,1,0,0,0,0,0,0,0,NULL,2023,12,NULL,0,0,0,2160,0,NULL),(4079,'3578062406600003','2023-02-22 07:49:41','2023-02-22',0,13000,5,1500,497840,50000,0,0,0,0,450000,0,500000,2160,4,0,587,0,1,0,0,0,0,0,0,0,NULL,2023,12,NULL,0,0,0,2160,0,NULL),(4080,'3578110303980002','2023-02-22 07:49:41','2023-02-22',0,13000,5,1500,497840,50000,0,0,0,0,450000,0,500000,2160,4,0,587,0,1,0,0,0,0,0,0,0,NULL,2023,12,NULL,0,0,0,2160,0,NULL),(4081,'3578164305700006','2023-02-22 07:49:41','2023-02-22',0,13000,5,1500,497840,50000,0,0,0,0,450000,0,500000,2160,4,0,587,0,1,0,0,0,0,0,0,0,NULL,2023,12,NULL,0,0,0,2160,0,NULL),(4082,'3578055111810009','2023-02-22 07:49:41','2023-02-22',0,13000,5,1500,497840,50000,0,0,0,0,450000,0,500000,2160,4,0,587,0,1,0,0,0,0,0,0,0,NULL,2023,12,NULL,0,0,0,2160,0,NULL),(4083,'3578176910940002','2023-02-22 07:49:41','2023-02-22',0,13000,5,1500,497840,50000,0,0,0,0,450000,0,500000,2160,4,0,587,0,1,0,0,0,0,0,0,0,NULL,2023,12,NULL,0,0,0,2160,0,NULL),(4084,'3578164112650003','2023-02-22 07:49:41','2023-02-22',0,13000,5,1500,497840,50000,0,0,0,0,450000,0,500000,2160,4,0,587,0,1,0,0,0,0,0,0,0,NULL,2023,12,NULL,0,0,0,2160,0,NULL),(4085,'3513212603970001','2023-02-22 07:49:41','2023-02-22',0,13000,5,1500,497840,50000,0,0,0,0,450000,0,500000,2160,4,0,587,0,1,0,0,0,0,0,0,0,NULL,2023,12,NULL,0,0,0,2160,0,NULL),(4086,'3514126808820003','2023-02-22 07:49:41','2023-02-22',0,13000,5,1500,497840,50000,0,0,0,0,450000,0,500000,2160,4,0,587,0,1,0,0,0,0,0,0,0,NULL,2023,12,NULL,0,0,0,2160,0,NULL),(4087,'3525124312940002','2023-02-22 07:49:41','2023-02-22',0,13000,5,1500,497840,50000,0,0,0,0,450000,0,500000,2160,4,0,587,0,1,0,0,0,0,0,0,0,NULL,2023,12,NULL,0,0,0,2160,0,NULL),(4317,'10230200427','2023-02-28 10:14:25','2023-02-28',0,13000,5,2500,3876400,50000,0,0,7000,125000,450000,48,3883000,6600,4,0,608,48,1,1,2,56000,4,450000,120000,2,NULL,2023,7,NULL,0,1200,2400,3000,1,0),(4318,'10235','2023-02-28 10:14:25','2023-02-28',0,13000,9,1500,2749790,50000,0,0,8250,0,0,48,3290000,540210,4,0,608,48,1,2,0,66000,0,0,72000,0,NULL,2023,7,NULL,40000,720,1440,1800,1,100000),(4319,'3578171005780011','2023-02-28 10:14:25','2023-02-28',0,13000,5,1500,567680,50000,0,0,0,0,450000,48,572000,4320,4,0,608,48,1,0,0,0,0,0,72000,0,NULL,2023,7,NULL,0,720,1440,2160,0,0),(4320,'3578164404680002','2023-02-28 10:14:25','2023-02-28',0,13000,5,1500,522560,50000,0,0,0,0,450000,16,524000,1440,4,0,608,16,1,0,0,0,0,0,24000,0,NULL,2023,7,NULL,0,240,480,720,0,0),(4321,'3578152104890001','2023-02-28 10:14:25','2023-02-28',0,13000,5,1500,567680,50000,0,0,0,0,450000,48,572000,4320,4,0,608,48,1,0,0,0,0,0,72000,0,NULL,2023,7,NULL,0,720,1440,2160,0,0),(4322,'3578081005990004','2023-02-28 10:14:25','2023-02-28',0,13000,5,1500,533840,50000,0,0,0,0,450000,24,536000,2160,4,0,608,24,1,0,0,0,0,0,36000,0,NULL,2023,7,NULL,0,360,720,1080,0,0),(4323,'3578174905600001','2023-02-28 10:14:25','2023-02-28',0,13000,5,1500,533840,50000,0,0,0,0,450000,24,536000,2160,4,0,608,24,1,0,0,0,0,0,36000,0,NULL,2023,7,NULL,0,360,720,1080,0,0),(4324,'3578166610880002','2023-02-28 10:14:25','2023-02-28',0,13000,5,1500,533840,50000,0,0,0,0,450000,24,536000,2160,4,0,608,24,1,0,0,0,0,0,36000,0,NULL,2023,7,NULL,0,360,720,1080,0,0),(4325,'3578104406840008','2023-02-28 10:14:25','2023-02-28',0,13000,5,1500,546530,50000,0,0,0,0,450000,33,549500,2970,4,0,608,33,1,0,0,0,0,0,49500,0,NULL,2023,7,NULL,0,495,990,1485,0,0),(4326,'3578107103570001','2023-02-28 10:14:25','2023-02-28',0,13000,5,1500,500000,50000,0,0,0,0,450000,0,500000,0,4,0,608,0,1,0,0,0,0,0,0,0,NULL,2023,7,NULL,0,0,0,0,0,0),(4327,'3578172009850003','2023-02-28 10:14:25','2023-02-28',0,13000,5,1500,567680,50000,0,0,0,0,450000,48,572000,4320,4,0,608,48,1,0,0,0,0,0,72000,0,NULL,2023,7,NULL,0,720,1440,2160,0,0),(4328,'3578176908920001','2023-02-28 10:14:25','2023-02-28',0,13000,5,1500,535250,50000,0,0,0,0,450000,25,537500,2250,4,0,608,25,1,0,0,0,0,0,37500,0,NULL,2023,7,NULL,0,375,750,1125,0,0),(4329,'3578290802610001','2023-02-28 10:14:25','2023-02-28',0,13000,5,1500,500000,50000,0,0,0,0,450000,0,500000,0,4,0,608,0,1,0,0,0,0,0,0,0,NULL,2023,7,NULL,0,0,0,0,0,0),(4330,'3507125312760003','2023-02-28 10:14:25','2023-02-28',0,13000,5,1500,539480,50000,0,0,0,0,450000,28,542000,2520,4,0,608,28,1,0,0,0,0,0,42000,0,NULL,2023,7,NULL,0,420,840,1260,0,0),(4331,'3578177110750002','2023-02-28 10:14:25','2023-02-28',0,13000,5,1500,542300,50000,0,0,0,0,450000,30,545000,2700,4,0,608,30,1,0,0,0,0,0,45000,0,NULL,2023,7,NULL,0,450,900,1350,0,0),(4332,'3578106707700007','2023-02-28 10:14:25','2023-02-28',0,13000,5,1500,570500,50000,0,0,0,0,450000,50,575000,4500,4,0,608,50,1,0,0,0,0,0,75000,0,NULL,2023,7,NULL,0,750,1500,2250,0,0),(4333,'3318021307950001','2023-02-28 10:14:25','2023-02-28',0,13000,5,1500,542300,50000,0,0,0,0,450000,30,545000,2700,4,0,608,30,1,0,0,0,0,0,45000,0,NULL,2023,7,NULL,0,450,900,1350,0,0),(4334,'3578174103730002','2023-02-28 10:14:25','2023-02-28',0,13000,5,1500,500000,50000,0,0,0,0,450000,0,500000,0,4,0,608,0,1,0,0,0,0,0,0,0,NULL,2023,7,NULL,0,0,0,0,0,0),(4335,'3578172801700001','2023-02-28 10:14:25','2023-02-28',0,13000,5,1500,533840,50000,0,0,0,0,450000,24,536000,2160,4,0,608,24,1,0,0,0,0,0,36000,0,NULL,2023,7,NULL,0,360,720,1080,0,0),(4336,'3578115511810005','2023-02-28 10:14:25','2023-02-28',0,13000,5,1500,533840,50000,0,0,0,0,450000,24,536000,2160,4,0,608,24,1,0,0,0,0,0,36000,0,NULL,2023,7,NULL,0,360,720,1080,0,0),(4337,'3578174806780006','2023-02-28 10:14:25','2023-02-28',0,13000,5,1500,533840,50000,0,0,0,0,450000,24,536000,2160,4,0,608,24,1,0,0,0,0,0,36000,0,NULL,2023,7,NULL,0,360,720,1080,0,0),(4338,'3578100107750004','2023-02-28 10:14:25','2023-02-28',0,13000,5,1500,536660,50000,0,0,0,0,450000,26,539000,2340,4,0,608,26,1,0,0,0,0,0,39000,0,NULL,2023,7,NULL,0,390,780,1170,0,0),(4339,'3578175908760001','2023-02-28 10:14:25','2023-02-28',0,13000,5,1500,550760,50000,0,0,0,0,450000,36,554000,3240,4,0,608,36,1,0,0,0,0,0,54000,0,NULL,2023,7,NULL,0,540,1080,1620,0,0),(4340,'3578196903960001','2023-02-28 10:14:25','2023-02-28',0,13000,5,1500,500000,50000,0,0,0,0,450000,0,500000,0,4,0,608,0,1,0,0,0,0,0,0,0,NULL,2023,7,NULL,0,0,0,0,0,0),(4341,'3578174803810011','2023-02-28 10:14:25','2023-02-28',0,13000,5,1500,500000,50000,0,0,0,0,450000,0,500000,0,4,0,608,0,1,0,0,0,0,0,0,0,NULL,2023,7,NULL,0,0,0,0,0,0),(4342,'3578105009820004','2023-02-28 10:14:25','2023-02-28',0,13000,5,1500,531020,50000,0,0,0,0,450000,22,533000,1980,4,0,608,22,1,0,0,0,0,0,33000,0,NULL,2023,7,NULL,0,330,660,990,0,0),(4343,'3524136904780002','2023-02-28 10:14:25','2023-02-28',0,13000,5,1500,539480,50000,0,0,0,0,450000,28,542000,2520,4,0,608,28,1,0,0,0,0,0,42000,0,NULL,2023,7,NULL,0,420,840,1260,0,0),(4344,'3578167006760220','2023-02-28 10:14:25','2023-02-28',0,13000,5,1500,533840,50000,0,0,0,0,450000,24,536000,2160,4,0,608,24,1,0,0,0,0,0,36000,0,NULL,2023,7,NULL,0,360,720,1080,0,0),(4345,'3578171412910002','2023-02-28 10:14:25','2023-02-28',0,13000,5,1500,550760,50000,0,0,0,0,450000,36,554000,3240,4,0,608,36,1,0,0,0,0,0,54000,0,NULL,2023,7,NULL,0,540,1080,1620,0,0),(4346,'3527034411894028','2023-02-28 10:14:25','2023-02-28',0,13000,5,1500,519740,50000,0,0,0,0,450000,14,521000,1260,4,0,608,14,1,0,0,0,0,0,21000,0,NULL,2023,7,NULL,0,210,420,630,0,0),(4347,'3578102204820010','2023-02-28 10:14:25','2023-02-28',0,13000,5,1500,533840,50000,0,0,0,0,450000,24,536000,2160,4,0,608,24,1,0,0,0,0,0,36000,0,NULL,2023,7,NULL,0,360,720,1080,0,0),(4348,'3578171409590002','2023-02-28 10:14:25','2023-02-28',0,13000,5,1500,500000,50000,0,0,0,0,450000,0,500000,0,4,0,608,0,1,0,0,0,0,0,0,0,NULL,2023,7,NULL,0,0,0,0,0,0),(4349,'3578161009930005','2023-02-28 10:14:25','2023-02-28',0,13000,5,1500,500000,50000,0,0,0,0,450000,0,500000,0,4,0,608,0,1,0,0,0,0,0,0,0,NULL,2023,7,NULL,0,0,0,0,0,0),(4350,'3578045203920004','2023-02-28 10:14:25','2023-02-28',0,13000,5,1500,533840,50000,0,0,0,0,450000,24,536000,2160,4,0,608,24,1,0,0,0,0,0,36000,0,NULL,2023,7,NULL,0,360,720,1080,0,0),(4351,'3578282504960001','2023-02-28 10:14:25','2023-02-28',0,13000,5,1500,539480,50000,0,0,0,0,450000,28,542000,2520,4,0,608,28,1,0,0,0,0,0,42000,0,NULL,2023,7,NULL,0,420,840,1260,0,0),(4352,'3578271302990004','2023-02-28 10:14:25','2023-02-28',0,13000,5,1500,539480,50000,0,0,0,0,450000,28,542000,2520,4,0,608,28,1,0,0,0,0,0,42000,0,NULL,2023,7,NULL,0,420,840,1260,0,0),(4353,'3578102704970005','2023-02-28 10:14:25','2023-02-28',0,13000,5,1500,539480,50000,0,0,0,0,450000,28,542000,2520,4,0,608,28,1,0,0,0,0,0,42000,0,NULL,2023,7,NULL,0,420,840,1260,0,0),(4354,'3578062406600003','2023-02-28 10:14:25','2023-02-28',0,13000,5,1500,500000,50000,0,0,0,0,450000,0,500000,0,4,0,608,0,1,0,0,0,0,0,0,0,NULL,2023,7,NULL,0,0,0,0,0,0),(4355,'3578110303980002','2023-02-28 10:14:25','2023-02-28',0,13000,5,1500,528200,50000,0,0,0,0,450000,20,530000,1800,4,0,608,20,1,0,0,0,0,0,30000,0,NULL,2023,7,NULL,0,300,600,900,0,0),(4356,'3578164305700006','2023-02-28 10:14:25','2023-02-28',0,13000,5,1500,531020,50000,0,0,0,0,450000,22,533000,1980,4,0,608,22,1,0,0,0,0,0,33000,0,NULL,2023,7,NULL,0,330,660,990,0,0),(4357,'3578055111810009','2023-02-28 10:14:25','2023-02-28',0,13000,5,1500,533840,50000,0,0,0,0,450000,24,536000,2160,4,0,608,24,1,0,0,0,0,0,36000,0,NULL,2023,7,NULL,0,360,720,1080,0,0),(4358,'3578176910940002','2023-02-28 10:14:25','2023-02-28',0,13000,5,1500,525380,50000,0,0,0,0,450000,18,527000,1620,4,0,608,18,1,0,0,0,0,0,27000,0,NULL,2023,7,NULL,0,270,540,810,0,0),(4359,'3578164112650003','2023-02-28 10:14:26','2023-02-28',0,13000,5,1500,531020,50000,0,0,0,0,450000,22,533000,1980,4,0,608,22,1,0,0,0,0,0,33000,0,NULL,2023,7,NULL,0,330,660,990,0,0),(4360,'3513212603970001','2023-02-28 10:14:26','2023-02-28',0,13000,5,1500,533840,50000,0,0,0,0,450000,24,536000,2160,4,0,608,24,1,0,0,0,0,0,36000,0,NULL,2023,7,NULL,0,360,720,1080,0,0),(4361,'3514126808820003','2023-02-28 10:14:26','2023-02-28',0,13000,5,1500,533840,50000,0,0,0,0,450000,24,536000,2160,4,0,608,24,1,0,0,0,0,0,36000,0,NULL,2023,7,NULL,0,360,720,1080,0,0),(4362,'3525124312940002','2023-02-28 10:14:26','2023-02-28',0,13000,5,1500,500000,50000,0,0,0,0,450000,0,500000,0,4,0,608,0,1,0,0,0,0,0,0,0,NULL,2023,7,NULL,0,0,0,0,0,0),(4507,'3578171005780011','2023-03-03 09:21:41','2023-03-03',0,13000,0,1500,50000,50000,0,0,0,0,0,0,50000,0,4,0,618,0,1,0,0,0,0,0,0,0,NULL,2023,6,500,0,0,0,0,0,0),(4508,'3578164404680002','2023-03-03 09:21:41','2023-03-03',0,13000,0,1500,49500,50000,0,0,0,0,0,0,50000,0,4,0,618,0,1,0,0,0,0,0,0,0,NULL,2023,6,500,0,0,0,0,0,0),(4509,'3578152104890001','2023-03-03 09:21:41','2023-03-03',0,13000,0,1500,-996,50000,0,0,0,0,0,0,50000,0,4,0,618,0,1,0,0,0,0,0,0,0,NULL,2023,6,1000,0,0,0,0,0,0),(4510,'3578081005990004','2023-03-03 09:21:41','2023-03-03',0,13000,0,1500,49999,50000,0,0,0,0,0,0,50000,0,4,0,618,0,1,0,0,0,0,0,0,0,NULL,2023,6,1,0,0,0,0,0,0),(4511,'3578174905600001','2023-03-03 09:21:41','2023-03-03',0,13000,0,1500,-4996,50000,0,0,0,0,0,0,50000,0,4,0,618,0,1,0,0,0,0,0,0,0,NULL,2023,6,5000,0,0,0,0,0,0),(4512,'3578166610880002','2023-03-03 09:21:41','2023-03-03',0,13000,0,1500,-996,50000,0,0,0,0,0,0,50000,0,4,0,618,0,1,0,0,0,0,0,0,0,NULL,2023,6,1000,0,0,0,0,0,0),(4513,'3578104406840008','2023-03-03 09:21:41','2023-03-03',0,13000,0,1500,-996,50000,0,0,0,0,0,0,50000,0,4,0,618,0,1,0,0,0,0,0,0,0,NULL,2023,6,1000,0,0,0,0,0,0),(4514,'3578107103570001','2023-03-03 09:21:41','2023-03-03',0,13000,0,1500,-1000,50000,0,0,0,0,0,0,50000,0,4,0,618,0,1,0,0,0,0,0,0,0,NULL,2023,6,1000,0,0,0,0,0,0),(4515,'3578172009850003','2023-03-03 09:21:41','2023-03-03',0,13000,0,1500,50000,50000,0,0,0,0,0,0,50000,0,4,0,618,0,1,0,0,0,0,0,0,0,NULL,2023,6,NULL,0,0,0,0,0,0),(4516,'3578176908920001','2023-03-03 09:21:41','2023-03-03',0,13000,0,1500,50000,50000,0,0,0,0,0,0,50000,0,4,0,618,0,1,0,0,0,0,0,0,0,NULL,2023,6,NULL,0,0,0,0,0,0),(4517,'3578290802610001','2023-03-03 09:21:41','2023-03-03',0,13000,0,1500,50000,50000,0,0,0,0,0,0,50000,0,4,0,618,0,1,0,0,0,0,0,0,0,NULL,2023,6,NULL,0,0,0,0,0,0),(4518,'3507125312760003','2023-03-03 09:21:41','2023-03-03',0,13000,0,1500,50000,50000,0,0,0,0,0,0,50000,0,4,0,618,0,1,0,0,0,0,0,0,0,NULL,2023,6,NULL,0,0,0,0,0,0),(4519,'3578177110750002','2023-03-03 09:21:41','2023-03-03',0,13000,0,1500,50000,50000,0,0,0,0,0,0,50000,0,4,0,618,0,1,0,0,0,0,0,0,0,NULL,2023,6,NULL,0,0,0,0,0,0),(4520,'3578106707700007','2023-03-03 09:21:41','2023-03-03',0,13000,0,1500,50000,50000,0,0,0,0,0,0,50000,0,4,0,618,0,1,0,0,0,0,0,0,0,NULL,2023,6,NULL,0,0,0,0,0,0),(4521,'3578171804980003','2023-03-03 09:21:41','2023-03-03',0,13000,9,1500,50000,50000,0,0,0,0,0,0,50000,0,4,0,618,0,1,0,0,0,0,0,0,0,NULL,2023,6,NULL,0,0,0,0,0,0),(4522,'3578174103730002','2023-03-03 09:21:41','2023-03-03',0,13000,0,1500,50000,50000,0,0,0,0,0,0,50000,0,4,0,618,0,1,0,0,0,0,0,0,0,NULL,2023,6,NULL,0,0,0,0,0,0),(4523,'3578172801700001','2023-03-03 09:21:41','2023-03-03',0,13000,0,1500,50000,50000,0,0,0,0,0,0,50000,0,4,0,618,0,1,0,0,0,0,0,0,0,NULL,2023,6,NULL,0,0,0,0,0,0),(4524,'3578115511810005','2023-03-03 09:21:41','2023-03-03',0,13000,0,1500,50000,50000,0,0,0,0,0,0,50000,0,4,0,618,0,1,0,0,0,0,0,0,0,NULL,2023,6,NULL,0,0,0,0,0,0),(4525,'3578174806780006','2023-03-03 09:21:41','2023-03-03',0,13000,0,1500,50000,50000,0,0,0,0,0,0,50000,0,4,0,618,0,1,0,0,0,0,0,0,0,NULL,2023,6,NULL,0,0,0,0,0,0),(4526,'3578100107750004','2023-03-03 09:21:42','2023-03-03',0,13000,0,1500,50000,50000,0,0,0,0,0,0,50000,0,4,0,618,0,1,0,0,0,0,0,0,0,NULL,2023,6,NULL,0,0,0,0,0,0),(4527,'3578175908760001','2023-03-03 09:21:42','2023-03-03',0,13000,0,1500,50000,50000,0,0,0,0,0,0,50000,0,4,0,618,0,1,0,0,0,0,0,0,0,NULL,2023,6,NULL,0,0,0,0,0,0),(4528,'3578196903960001','2023-03-03 09:21:42','2023-03-03',0,13000,0,1500,50000,50000,0,0,0,0,0,0,50000,0,4,0,618,0,1,0,0,0,0,0,0,0,NULL,2023,6,NULL,0,0,0,0,0,0),(4529,'3578174803810011','2023-03-03 09:21:42','2023-03-03',0,13000,0,1500,50000,50000,0,0,0,0,0,0,50000,0,4,0,618,0,1,0,0,0,0,0,0,0,NULL,2023,6,NULL,0,0,0,0,0,0),(4530,'3578105009820004','2023-03-03 09:21:42','2023-03-03',0,13000,0,1500,50000,50000,0,0,0,0,0,0,50000,0,4,0,618,0,1,0,0,0,0,0,0,0,NULL,2023,6,NULL,0,0,0,0,0,0),(4531,'3524136904780002','2023-03-03 09:21:42','2023-03-03',0,13000,0,1500,50000,50000,0,0,0,0,0,0,50000,0,4,0,618,0,1,0,0,0,0,0,0,0,NULL,2023,6,NULL,0,0,0,0,0,0),(4532,'3578167006760220','2023-03-03 09:21:42','2023-03-03',0,13000,0,1500,50000,50000,0,0,0,0,0,0,50000,0,4,0,618,0,1,0,0,0,0,0,0,0,NULL,2023,6,NULL,0,0,0,0,0,0),(4533,'3578171412910002','2023-03-03 09:21:42','2023-03-03',0,13000,0,1500,50000,50000,0,0,0,0,0,0,50000,0,4,0,618,0,1,0,0,0,0,0,0,0,NULL,2023,6,NULL,0,0,0,0,0,0),(4534,'3527034411894028','2023-03-03 09:21:42','2023-03-03',0,13000,0,1500,50000,50000,0,0,0,0,0,0,50000,0,4,0,618,0,1,0,0,0,0,0,0,0,NULL,2023,6,NULL,0,0,0,0,0,0),(4535,'3578102204820010','2023-03-03 09:21:42','2023-03-03',0,13000,0,1500,50000,50000,0,0,0,0,0,0,50000,0,4,0,618,0,1,0,0,0,0,0,0,0,NULL,2023,6,NULL,0,0,0,0,0,0),(4536,'3578171409590002','2023-03-03 09:21:42','2023-03-03',0,13000,0,1500,50000,50000,0,0,0,0,0,0,50000,0,4,0,618,0,1,0,0,0,0,0,0,0,NULL,2023,6,NULL,0,0,0,0,0,0),(4537,'3578161009930005','2023-03-03 09:21:42','2023-03-03',0,13000,0,1500,50000,50000,0,0,0,0,0,0,50000,0,4,0,618,0,1,0,0,0,0,0,0,0,NULL,2023,6,NULL,0,0,0,0,0,0),(4538,'3578045203920004','2023-03-03 09:21:42','2023-03-03',0,13000,0,1500,50000,50000,0,0,0,0,0,0,50000,0,4,0,618,0,1,0,0,0,0,0,0,0,NULL,2023,6,NULL,0,0,0,0,0,0),(4539,'3578282504960001','2023-03-03 09:21:42','2023-03-03',0,13000,0,1500,50000,50000,0,0,0,0,0,0,50000,0,4,0,618,0,1,0,0,0,0,0,0,0,NULL,2023,6,NULL,0,0,0,0,0,0),(4540,'3578271302990004','2023-03-03 09:21:42','2023-03-03',0,13000,0,1500,50000,50000,0,0,0,0,0,0,50000,0,4,0,618,0,1,0,0,0,0,0,0,0,NULL,2023,6,NULL,0,0,0,0,0,0),(4541,'3578102704970005','2023-03-03 09:21:42','2023-03-03',0,13000,0,1500,50000,50000,0,0,0,0,0,0,50000,0,4,0,618,0,1,0,0,0,0,0,0,0,NULL,2023,6,NULL,0,0,0,0,0,0),(4542,'3578062406600003','2023-03-03 09:21:42','2023-03-03',0,13000,0,1500,50000,50000,0,0,0,0,0,0,50000,0,4,0,618,0,1,0,0,0,0,0,0,0,NULL,2023,6,NULL,0,0,0,0,0,0),(4543,'3578110303980002','2023-03-03 09:21:42','2023-03-03',0,13000,0,1500,50000,50000,0,0,0,0,0,0,50000,0,4,0,618,0,1,0,0,0,0,0,0,0,NULL,2023,6,NULL,0,0,0,0,0,0),(4544,'3578164305700006','2023-03-03 09:21:42','2023-03-03',0,13000,0,1500,50000,50000,0,0,0,0,0,0,50000,0,4,0,618,0,1,0,0,0,0,0,0,0,NULL,2023,6,NULL,0,0,0,0,0,0),(4545,'3578055111810009','2023-03-03 09:21:43','2023-03-03',0,13000,0,1500,50000,50000,0,0,0,0,0,0,50000,0,4,0,618,0,1,0,0,0,0,0,0,0,NULL,2023,6,NULL,0,0,0,0,0,0),(4546,'3578176910940002','2023-03-03 09:21:43','2023-03-03',0,13000,0,1500,50000,50000,0,0,0,0,0,0,50000,0,4,0,618,0,1,0,0,0,0,0,0,0,NULL,2023,6,NULL,0,0,0,0,0,0),(4547,'3578164112650003','2023-03-03 09:21:43','2023-03-03',0,13000,0,1500,50000,50000,0,0,0,0,0,0,50000,0,4,0,618,0,1,0,0,0,0,0,0,0,NULL,2023,6,NULL,0,0,0,0,0,0),(4548,'3513212603970001','2023-03-03 09:21:43','2023-03-03',0,13000,0,1500,50000,50000,0,0,0,0,0,0,50000,0,4,0,618,0,1,0,0,0,0,0,0,0,NULL,2023,6,NULL,0,0,0,0,0,0),(4549,'3514126808820003','2023-03-03 09:21:43','2023-03-03',0,13000,0,1500,50000,50000,0,0,0,0,0,0,50000,0,4,0,618,0,1,0,0,0,0,0,0,0,NULL,2023,6,NULL,0,0,0,0,0,0),(4550,'3525124312940002','2023-03-03 09:21:43','2023-03-03',0,13000,0,1500,50000,50000,0,0,0,0,0,0,50000,0,4,0,618,0,1,0,0,0,0,0,0,0,NULL,2023,6,NULL,0,0,0,0,0,0),(4551,'3578171005780011','2023-03-03 09:50:40','2023-03-03',0,13000,0,1500,50000,50000,0,0,0,0,0,0,50000,0,4,0,619,0,1,0,0,0,0,0,0,0,NULL,2023,8,NULL,0,0,0,0,0,0),(4552,'3578164404680002','2023-03-03 09:50:40','2023-03-03',0,13000,0,1500,50000,50000,0,0,0,0,0,0,50000,0,4,0,619,0,1,0,0,0,0,0,0,0,NULL,2023,8,NULL,0,0,0,0,0,0),(4553,'3578152104890001','2023-03-03 09:50:40','2023-03-03',0,13000,0,1500,50000,50000,0,0,0,0,0,0,50000,0,4,0,619,0,1,0,0,0,0,0,0,0,NULL,2023,8,NULL,0,0,0,0,0,0),(4554,'3578081005990004','2023-03-03 09:50:40','2023-03-03',0,13000,0,1500,50000,50000,0,0,0,0,0,0,50000,0,4,0,619,0,1,0,0,0,0,0,0,0,NULL,2023,8,NULL,0,0,0,0,0,0),(4555,'3578174905600001','2023-03-03 09:50:40','2023-03-03',0,13000,0,1500,50000,50000,0,0,0,0,0,0,50000,0,4,0,619,0,1,0,0,0,0,0,0,0,NULL,2023,8,NULL,0,0,0,0,0,0),(4556,'3578166610880002','2023-03-03 09:50:40','2023-03-03',0,13000,0,1500,45000,50000,0,0,0,0,0,0,50000,0,4,0,619,0,1,0,0,0,0,0,0,0,NULL,2023,8,5000,0,0,0,0,0,0),(4557,'3578104406840008','2023-03-03 09:50:40','2023-03-03',0,13000,0,1500,49500,50000,0,0,0,0,0,0,50000,0,4,0,619,0,1,0,0,0,0,0,0,0,NULL,2023,8,500,0,0,0,0,0,0),(4558,'3578107103570001','2023-03-03 09:50:40','2023-03-03',0,13000,0,1500,45000,50000,0,0,0,0,0,0,50000,0,4,0,619,0,1,0,0,0,0,0,0,0,NULL,2023,8,5000,0,0,0,0,0,0),(4559,'3578172009850003','2023-03-03 09:50:40','2023-03-03',0,13000,0,1500,45000,50000,0,0,0,0,0,0,50000,0,4,0,619,0,1,0,0,0,0,0,0,0,NULL,2023,8,5000,0,0,0,0,0,0),(4560,'3578176908920001','2023-03-03 09:50:41','2023-03-03',0,13000,0,1500,49500,50000,0,0,0,0,0,0,50000,0,4,0,619,0,1,0,0,0,0,0,0,0,NULL,2023,8,500,0,0,0,0,0,0),(4561,'3578290802610001','2023-03-03 09:50:41','2023-03-03',0,13000,0,1500,50000,50000,0,0,0,0,0,0,50000,0,4,0,619,0,1,0,0,0,0,0,0,0,NULL,2023,8,NULL,0,0,0,0,0,0),(4562,'3507125312760003','2023-03-03 09:50:41','2023-03-03',0,13000,0,1500,50000,50000,0,0,0,0,0,0,50000,0,4,0,619,0,1,0,0,0,0,0,0,0,NULL,2023,8,NULL,0,0,0,0,0,0),(4563,'3578177110750002','2023-03-03 09:50:41','2023-03-03',0,13000,0,1500,50000,50000,0,0,0,0,0,0,50000,0,4,0,619,0,1,0,0,0,0,0,0,0,NULL,2023,8,NULL,0,0,0,0,0,0),(4564,'3578106707700007','2023-03-03 09:50:41','2023-03-03',0,13000,0,1500,50000,50000,0,0,0,0,0,0,50000,0,4,0,619,0,1,0,0,0,0,0,0,0,NULL,2023,8,NULL,0,0,0,0,0,0),(4565,'3578171804980003','2023-03-03 09:50:41','2023-03-03',0,13000,9,1500,50000,50000,0,0,0,0,0,0,50000,0,4,0,619,0,1,0,0,0,0,0,0,0,NULL,2023,8,NULL,0,0,0,0,0,0),(4566,'3578174103730002','2023-03-03 09:50:41','2023-03-03',0,13000,0,1500,50000,50000,0,0,0,0,0,0,50000,0,4,0,619,0,1,0,0,0,0,0,0,0,NULL,2023,8,NULL,0,0,0,0,0,0),(4567,'3578172801700001','2023-03-03 09:50:41','2023-03-03',0,13000,0,1500,50000,50000,0,0,0,0,0,0,50000,0,4,0,619,0,1,0,0,0,0,0,0,0,NULL,2023,8,NULL,0,0,0,0,0,0),(4568,'3578115511810005','2023-03-03 09:50:41','2023-03-03',0,13000,0,1500,50000,50000,0,0,0,0,0,0,50000,0,4,0,619,0,1,0,0,0,0,0,0,0,NULL,2023,8,NULL,0,0,0,0,0,0),(4569,'3578174806780006','2023-03-03 09:50:41','2023-03-03',0,13000,0,1500,50000,50000,0,0,0,0,0,0,50000,0,4,0,619,0,1,0,0,0,0,0,0,0,NULL,2023,8,NULL,0,0,0,0,0,0),(4570,'3578100107750004','2023-03-03 09:50:41','2023-03-03',0,13000,0,1500,50000,50000,0,0,0,0,0,0,50000,0,4,0,619,0,1,0,0,0,0,0,0,0,NULL,2023,8,NULL,0,0,0,0,0,0),(4571,'3578175908760001','2023-03-03 09:50:41','2023-03-03',0,13000,0,1500,50000,50000,0,0,0,0,0,0,50000,0,4,0,619,0,1,0,0,0,0,0,0,0,NULL,2023,8,NULL,0,0,0,0,0,0),(4572,'3578196903960001','2023-03-03 09:50:41','2023-03-03',0,13000,0,1500,50000,50000,0,0,0,0,0,0,50000,0,4,0,619,0,1,0,0,0,0,0,0,0,NULL,2023,8,NULL,0,0,0,0,0,0),(4573,'3578174803810011','2023-03-03 09:50:41','2023-03-03',0,13000,0,1500,50000,50000,0,0,0,0,0,0,50000,0,4,0,619,0,1,0,0,0,0,0,0,0,NULL,2023,8,NULL,0,0,0,0,0,0),(4574,'3578105009820004','2023-03-03 09:50:41','2023-03-03',0,13000,0,1500,50000,50000,0,0,0,0,0,0,50000,0,4,0,619,0,1,0,0,0,0,0,0,0,NULL,2023,8,NULL,0,0,0,0,0,0),(4575,'3524136904780002','2023-03-03 09:50:41','2023-03-03',0,13000,0,1500,50000,50000,0,0,0,0,0,0,50000,0,4,0,619,0,1,0,0,0,0,0,0,0,NULL,2023,8,NULL,0,0,0,0,0,0),(4576,'3578167006760220','2023-03-03 09:50:41','2023-03-03',0,13000,0,1500,50000,50000,0,0,0,0,0,0,50000,0,4,0,619,0,1,0,0,0,0,0,0,0,NULL,2023,8,NULL,0,0,0,0,0,0),(4577,'3578171412910002','2023-03-03 09:50:41','2023-03-03',0,13000,0,1500,50000,50000,0,0,0,0,0,0,50000,0,4,0,619,0,1,0,0,0,0,0,0,0,NULL,2023,8,NULL,0,0,0,0,0,0),(4578,'3527034411894028','2023-03-03 09:50:41','2023-03-03',0,13000,0,1500,50000,50000,0,0,0,0,0,0,50000,0,4,0,619,0,1,0,0,0,0,0,0,0,NULL,2023,8,NULL,0,0,0,0,0,0),(4579,'3578102204820010','2023-03-03 09:50:41','2023-03-03',0,13000,0,1500,50000,50000,0,0,0,0,0,0,50000,0,4,0,619,0,1,0,0,0,0,0,0,0,NULL,2023,8,NULL,0,0,0,0,0,0),(4580,'3578171409590002','2023-03-03 09:50:41','2023-03-03',0,13000,0,1500,50000,50000,0,0,0,0,0,0,50000,0,4,0,619,0,1,0,0,0,0,0,0,0,NULL,2023,8,NULL,0,0,0,0,0,0),(4581,'3578161009930005','2023-03-03 09:50:41','2023-03-03',0,13000,0,1500,50000,50000,0,0,0,0,0,0,50000,0,4,0,619,0,1,0,0,0,0,0,0,0,NULL,2023,8,NULL,0,0,0,0,0,0),(4582,'3578045203920004','2023-03-03 09:50:41','2023-03-03',0,13000,0,1500,50000,50000,0,0,0,0,0,0,50000,0,4,0,619,0,1,0,0,0,0,0,0,0,NULL,2023,8,NULL,0,0,0,0,0,0),(4583,'3578282504960001','2023-03-03 09:50:41','2023-03-03',0,13000,0,1500,50000,50000,0,0,0,0,0,0,50000,0,4,0,619,0,1,0,0,0,0,0,0,0,NULL,2023,8,NULL,0,0,0,0,0,0),(4584,'3578271302990004','2023-03-03 09:50:42','2023-03-03',0,13000,0,1500,50000,50000,0,0,0,0,0,0,50000,0,4,0,619,0,1,0,0,0,0,0,0,0,NULL,2023,8,NULL,0,0,0,0,0,0),(4585,'3578102704970005','2023-03-03 09:50:42','2023-03-03',0,13000,0,1500,50000,50000,0,0,0,0,0,0,50000,0,4,0,619,0,1,0,0,0,0,0,0,0,NULL,2023,8,NULL,0,0,0,0,0,0),(4586,'3578062406600003','2023-03-03 09:50:42','2023-03-03',0,13000,0,1500,50000,50000,0,0,0,0,0,0,50000,0,4,0,619,0,1,0,0,0,0,0,0,0,NULL,2023,8,NULL,0,0,0,0,0,0),(4587,'3578110303980002','2023-03-03 09:50:42','2023-03-03',0,13000,0,1500,50000,50000,0,0,0,0,0,0,50000,0,4,0,619,0,1,0,0,0,0,0,0,0,NULL,2023,8,NULL,0,0,0,0,0,0),(4588,'3578164305700006','2023-03-03 09:50:42','2023-03-03',0,13000,0,1500,50000,50000,0,0,0,0,0,0,50000,0,4,0,619,0,1,0,0,0,0,0,0,0,NULL,2023,8,NULL,0,0,0,0,0,0),(4589,'3578055111810009','2023-03-03 09:50:42','2023-03-03',0,13000,0,1500,50000,50000,0,0,0,0,0,0,50000,0,4,0,619,0,1,0,0,0,0,0,0,0,NULL,2023,8,NULL,0,0,0,0,0,0),(4590,'3578176910940002','2023-03-03 09:50:42','2023-03-03',0,13000,0,1500,50000,50000,0,0,0,0,0,0,50000,0,4,0,619,0,1,0,0,0,0,0,0,0,NULL,2023,8,NULL,0,0,0,0,0,0),(4591,'3578164112650003','2023-03-03 09:50:42','2023-03-03',0,13000,0,1500,50000,50000,0,0,0,0,0,0,50000,0,4,0,619,0,1,0,0,0,0,0,0,0,NULL,2023,8,NULL,0,0,0,0,0,0),(4592,'3513212603970001','2023-03-03 09:50:42','2023-03-03',0,13000,0,1500,50000,50000,0,0,0,0,0,0,50000,0,4,0,619,0,1,0,0,0,0,0,0,0,NULL,2023,8,NULL,0,0,0,0,0,0),(4593,'3514126808820003','2023-03-03 09:50:42','2023-03-03',0,13000,0,1500,50000,50000,0,0,0,0,0,0,50000,0,4,0,619,0,1,0,0,0,0,0,0,0,NULL,2023,8,NULL,0,0,0,0,0,0),(4594,'3525124312940002','2023-03-03 09:50:42','2023-03-03',0,13000,0,1500,50000,50000,0,0,0,0,0,0,50000,0,4,0,619,0,1,0,0,0,0,0,0,0,NULL,2023,8,NULL,0,0,0,0,0,0),(4595,'3578171005780011','2023-03-03 10:23:42','2023-03-03',0,13000,0,1500,221000,50000,0,0,0,0,0,0,50000,0,4,171000,620,0,1,0,0,0,0,0,0,0,NULL,2024,1,NULL,200000,0,0,0,0,0),(4596,'3578164404680002','2023-03-03 10:23:42','2023-03-03',0,13000,0,1500,50000,50000,0,0,0,0,0,0,50000,0,4,0,620,0,1,0,0,0,0,0,0,0,NULL,2024,1,NULL,0,0,0,0,0,0),(4597,'3578152104890001','2023-03-03 10:23:42','2023-03-03',0,13000,0,1500,50000,50000,0,0,0,0,0,0,50000,0,4,0,620,0,1,0,0,0,0,0,0,0,NULL,2024,1,NULL,0,0,0,0,0,0),(4598,'3578081005990004','2023-03-03 10:23:42','2023-03-03',0,13000,0,1500,50000,50000,0,0,0,0,0,0,50000,0,4,0,620,0,1,0,0,0,0,0,0,0,NULL,2024,1,NULL,0,0,0,0,0,0),(4599,'3578174905600001','2023-03-03 10:23:42','2023-03-03',0,13000,0,1500,50000,50000,0,0,0,0,0,0,50000,0,4,0,620,0,1,0,0,0,0,0,0,0,NULL,2024,1,NULL,0,0,0,0,0,0),(4600,'3578166610880002','2023-03-03 10:23:42','2023-03-03',0,13000,0,1500,50000,50000,0,0,0,0,0,0,50000,0,4,0,620,0,1,0,0,0,0,0,0,0,NULL,2024,1,NULL,0,0,0,0,0,0),(4601,'3578104406840008','2023-03-03 10:23:42','2023-03-03',0,13000,0,1500,50000,50000,0,0,0,0,0,0,50000,0,4,0,620,0,1,0,0,0,0,0,0,0,NULL,2024,1,NULL,0,0,0,0,0,0),(4602,'3578107103570001','2023-03-03 10:23:42','2023-03-03',0,13000,0,1500,50000,50000,0,0,0,0,0,0,50000,0,4,0,620,0,1,0,0,0,0,0,0,0,NULL,2024,1,NULL,0,0,0,0,0,0),(4603,'3578172009850003','2023-03-03 10:23:42','2023-03-03',0,13000,0,1500,50000,50000,0,0,0,0,0,0,50000,0,4,0,620,0,1,0,0,0,0,0,0,0,NULL,2024,1,NULL,0,0,0,0,0,0),(4604,'3578176908920001','2023-03-03 10:23:42','2023-03-03',0,13000,0,1500,50000,50000,0,0,0,0,0,0,50000,0,4,0,620,0,1,0,0,0,0,0,0,0,NULL,2024,1,NULL,0,0,0,0,0,0),(4605,'3578290802610001','2023-03-03 10:23:42','2023-03-03',0,13000,0,1500,50000,50000,0,0,0,0,0,0,50000,0,4,0,620,0,1,0,0,0,0,0,0,0,NULL,2024,1,NULL,0,0,0,0,0,0),(4606,'3507125312760003','2023-03-03 10:23:42','2023-03-03',0,13000,0,1500,50000,50000,0,0,0,0,0,0,50000,0,4,0,620,0,1,0,0,0,0,0,0,0,NULL,2024,1,NULL,0,0,0,0,0,0),(4607,'3578177110750002','2023-03-03 10:23:42','2023-03-03',0,13000,0,1500,50000,50000,0,0,0,0,0,0,50000,0,4,0,620,0,1,0,0,0,0,0,0,0,NULL,2024,1,NULL,0,0,0,0,0,0),(4608,'3578106707700007','2023-03-03 10:23:42','2023-03-03',0,13000,0,1500,50000,50000,0,0,0,0,0,0,50000,0,4,0,620,0,1,0,0,0,0,0,0,0,NULL,2024,1,NULL,0,0,0,0,0,0),(4609,'3578171804980003','2023-03-03 10:23:42','2023-03-03',0,13000,5,1500,3716040,50000,0,0,7000,125000,450000,48,3820000,103960,4,0,620,48,1,1,2,56000,2,435000,72000,0,NULL,2024,1,NULL,0,720,1440,1800,1,100000),(4610,'3578174103730002','2023-03-03 10:23:42','2023-03-03',0,13000,0,1500,50000,50000,0,0,0,0,0,0,50000,0,4,0,620,0,1,0,0,0,0,0,0,0,NULL,2024,1,NULL,0,0,0,0,0,0),(4611,'3578172801700001','2023-03-03 10:23:42','2023-03-03',0,13000,0,1500,50000,50000,0,0,0,0,0,0,50000,0,4,0,620,0,1,0,0,0,0,0,0,0,NULL,2024,1,NULL,0,0,0,0,0,0),(4612,'3578115511810005','2023-03-03 10:23:42','2023-03-03',0,13000,0,1500,50000,50000,0,0,0,0,0,0,50000,0,4,0,620,0,1,0,0,0,0,0,0,0,NULL,2024,1,NULL,0,0,0,0,0,0),(4613,'3578174806780006','2023-03-03 10:23:42','2023-03-03',0,13000,0,1500,50000,50000,0,0,0,0,0,0,50000,0,4,0,620,0,1,0,0,0,0,0,0,0,NULL,2024,1,NULL,0,0,0,0,0,0),(4614,'3578100107750004','2023-03-03 10:23:42','2023-03-03',0,13000,0,1500,50000,50000,0,0,0,0,0,0,50000,0,4,0,620,0,1,0,0,0,0,0,0,0,NULL,2024,1,NULL,0,0,0,0,0,0),(4615,'3578175908760001','2023-03-03 10:23:42','2023-03-03',0,13000,0,1500,50000,50000,0,0,0,0,0,0,50000,0,4,0,620,0,1,0,0,0,0,0,0,0,NULL,2024,1,NULL,0,0,0,0,0,0),(4616,'3578196903960001','2023-03-03 10:23:42','2023-03-03',0,13000,0,1500,50000,50000,0,0,0,0,0,0,50000,0,4,0,620,0,1,0,0,0,0,0,0,0,NULL,2024,1,NULL,0,0,0,0,0,0),(4617,'3578174803810011','2023-03-03 10:23:42','2023-03-03',0,13000,0,1500,50000,50000,0,0,0,0,0,0,50000,0,4,0,620,0,1,0,0,0,0,0,0,0,NULL,2024,1,NULL,0,0,0,0,0,0),(4618,'3578105009820004','2023-03-03 10:23:42','2023-03-03',0,13000,0,1500,50000,50000,0,0,0,0,0,0,50000,0,4,0,620,0,1,0,0,0,0,0,0,0,NULL,2024,1,NULL,0,0,0,0,0,0),(4619,'3524136904780002','2023-03-03 10:23:42','2023-03-03',0,13000,0,1500,50000,50000,0,0,0,0,0,0,50000,0,4,0,620,0,1,0,0,0,0,0,0,0,NULL,2024,1,NULL,0,0,0,0,0,0),(4620,'3578167006760220','2023-03-03 10:23:42','2023-03-03',0,13000,0,1500,50000,50000,0,0,0,0,0,0,50000,0,4,0,620,0,1,0,0,0,0,0,0,0,NULL,2024,1,NULL,0,0,0,0,0,0),(4621,'3578171412910002','2023-03-03 10:23:42','2023-03-03',0,13000,0,1500,50000,50000,0,0,0,0,0,0,50000,0,4,0,620,0,1,0,0,0,0,0,0,0,NULL,2024,1,NULL,0,0,0,0,0,0),(4622,'3527034411894028','2023-03-03 10:23:42','2023-03-03',0,13000,0,1500,50000,50000,0,0,0,0,0,0,50000,0,4,0,620,0,1,0,0,0,0,0,0,0,NULL,2024,1,NULL,0,0,0,0,0,0),(4623,'3578102204820010','2023-03-03 10:23:42','2023-03-03',0,13000,0,1500,50000,50000,0,0,0,0,0,0,50000,0,4,0,620,0,1,0,0,0,0,0,0,0,NULL,2024,1,NULL,0,0,0,0,0,0),(4624,'3578171409590002','2023-03-03 10:23:42','2023-03-03',0,13000,0,1500,50000,50000,0,0,0,0,0,0,50000,0,4,0,620,0,1,0,0,0,0,0,0,0,NULL,2024,1,NULL,0,0,0,0,0,0),(4625,'3578161009930005','2023-03-03 10:23:43','2023-03-03',0,13000,0,1500,50000,50000,0,0,0,0,0,0,50000,0,4,0,620,0,1,0,0,0,0,0,0,0,NULL,2024,1,NULL,0,0,0,0,0,0),(4626,'3578045203920004','2023-03-03 10:23:43','2023-03-03',0,13000,0,1500,50000,50000,0,0,0,0,0,0,50000,0,4,0,620,0,1,0,0,0,0,0,0,0,NULL,2024,1,NULL,0,0,0,0,0,0),(4627,'3578282504960001','2023-03-03 10:23:43','2023-03-03',0,13000,0,1500,50000,50000,0,0,0,0,0,0,50000,0,4,0,620,0,1,0,0,0,0,0,0,0,NULL,2024,1,NULL,0,0,0,0,0,0),(4628,'3578271302990004','2023-03-03 10:23:43','2023-03-03',0,13000,0,1500,50000,50000,0,0,0,0,0,0,50000,0,4,0,620,0,1,0,0,0,0,0,0,0,NULL,2024,1,NULL,0,0,0,0,0,0),(4629,'3578102704970005','2023-03-03 10:23:43','2023-03-03',0,13000,0,1500,50000,50000,0,0,0,0,0,0,50000,0,4,0,620,0,1,0,0,0,0,0,0,0,NULL,2024,1,NULL,0,0,0,0,0,0),(4630,'3578062406600003','2023-03-03 10:23:43','2023-03-03',0,13000,0,1500,50000,50000,0,0,0,0,0,0,50000,0,4,0,620,0,1,0,0,0,0,0,0,0,NULL,2024,1,NULL,0,0,0,0,0,0),(4631,'3578110303980002','2023-03-03 10:23:43','2023-03-03',0,13000,0,1500,50000,50000,0,0,0,0,0,0,50000,0,4,0,620,0,1,0,0,0,0,0,0,0,NULL,2024,1,NULL,0,0,0,0,0,0),(4632,'3578164305700006','2023-03-03 10:23:43','2023-03-03',0,13000,0,1500,50000,50000,0,0,0,0,0,0,50000,0,4,0,620,0,1,0,0,0,0,0,0,0,NULL,2024,1,NULL,0,0,0,0,0,0),(4633,'3578055111810009','2023-03-03 10:23:43','2023-03-03',0,13000,0,1500,50000,50000,0,0,0,0,0,0,50000,0,4,0,620,0,1,0,0,0,0,0,0,0,NULL,2024,1,NULL,0,0,0,0,0,0),(4634,'3578176910940002','2023-03-03 10:23:43','2023-03-03',0,13000,0,1500,50000,50000,0,0,0,0,0,0,50000,0,4,0,620,0,1,0,0,0,0,0,0,0,NULL,2024,1,NULL,0,0,0,0,0,0),(4635,'3578164112650003','2023-03-03 10:23:43','2023-03-03',0,13000,0,1500,50000,50000,0,0,0,0,0,0,50000,0,4,0,620,0,1,0,0,0,0,0,0,0,NULL,2024,1,NULL,0,0,0,0,0,0),(4636,'3513212603970001','2023-03-03 10:23:43','2023-03-03',0,13000,0,1500,50000,50000,0,0,0,0,0,0,50000,0,4,0,620,0,1,0,0,0,0,0,0,0,NULL,2024,1,NULL,0,0,0,0,0,0),(4637,'3514126808820003','2023-03-03 10:23:43','2023-03-03',0,13000,0,1500,50000,50000,0,0,0,0,0,0,50000,0,4,0,620,0,1,0,0,0,0,0,0,0,NULL,2024,1,NULL,0,0,0,0,0,0),(4638,'3525124312940002','2023-03-03 10:23:43','2023-03-03',0,13000,0,1500,50000,50000,0,0,0,0,0,0,50000,0,4,0,620,0,1,0,0,0,0,0,0,0,NULL,2024,1,NULL,0,0,0,0,0,0),(4639,'3578171005780011','2023-03-03 10:49:33','2023-03-03',0,13000,0,1500,50000,50000,0,0,0,0,0,0,50000,0,4,0,621,0,1,0,0,0,0,0,0,0,NULL,2024,2,NULL,0,0,0,0,0,0),(4640,'3578164404680002','2023-03-03 10:49:33','2023-03-03',0,13000,0,1500,50000,50000,0,0,0,0,0,0,50000,0,4,0,621,0,1,0,0,0,0,0,0,0,NULL,2024,2,NULL,0,0,0,0,0,0),(4641,'3578152104890001','2023-03-03 10:49:33','2023-03-03',0,13000,0,1500,50000,50000,0,0,0,0,0,0,50000,0,4,0,621,0,1,0,0,0,0,0,0,0,NULL,2024,2,NULL,0,0,0,0,0,0),(4642,'3578081005990004','2023-03-03 10:49:33','2023-03-03',0,13000,0,1500,50000,50000,0,0,0,0,0,0,50000,0,4,0,621,0,1,0,0,0,0,0,0,0,NULL,2024,2,NULL,0,0,0,0,0,0),(4643,'3578174905600001','2023-03-03 10:49:33','2023-03-03',0,13000,0,1500,50000,50000,0,0,0,0,0,0,50000,0,4,0,621,0,1,0,0,0,0,0,0,0,NULL,2024,2,NULL,0,0,0,0,0,0),(4644,'3578166610880002','2023-03-03 10:49:33','2023-03-03',0,13000,0,1500,50000,50000,0,0,0,0,0,0,50000,0,4,0,621,0,1,0,0,0,0,0,0,0,NULL,2024,2,NULL,0,0,0,0,0,0),(4645,'3578104406840008','2023-03-03 10:49:33','2023-03-03',0,13000,0,1500,50000,50000,0,0,0,0,0,0,50000,0,4,0,621,0,1,0,0,0,0,0,0,0,NULL,2024,2,NULL,0,0,0,0,0,0),(4646,'3578107103570001','2023-03-03 10:49:33','2023-03-03',0,13000,0,1500,50000,50000,0,0,0,0,0,0,50000,0,4,0,621,0,1,0,0,0,0,0,0,0,NULL,2024,2,NULL,0,0,0,0,0,0),(4647,'3578172009850003','2023-03-03 10:49:33','2023-03-03',0,13000,0,1500,50000,50000,0,0,0,0,0,0,50000,0,4,0,621,0,1,0,0,0,0,0,0,0,NULL,2024,2,NULL,0,0,0,0,0,0),(4648,'3578176908920001','2023-03-03 10:49:33','2023-03-03',0,13000,0,1500,50000,50000,0,0,0,0,0,0,50000,0,4,0,621,0,1,0,0,0,0,0,0,0,NULL,2024,2,NULL,0,0,0,0,0,0),(4649,'3578290802610001','2023-03-03 10:49:33','2023-03-03',0,13000,0,1500,50000,50000,0,0,0,0,0,0,50000,0,4,0,621,0,1,0,0,0,0,0,0,0,NULL,2024,2,NULL,0,0,0,0,0,0),(4650,'3507125312760003','2023-03-03 10:49:33','2023-03-03',0,13000,0,1500,50000,50000,0,0,0,0,0,0,50000,0,4,0,621,0,1,0,0,0,0,0,0,0,NULL,2024,2,NULL,0,0,0,0,0,0),(4651,'3578177110750002','2023-03-03 10:49:33','2023-03-03',0,13000,0,1500,50000,50000,0,0,0,0,0,0,50000,0,4,0,621,0,1,0,0,0,0,0,0,0,NULL,2024,2,NULL,0,0,0,0,0,0),(4652,'3578106707700007','2023-03-03 10:49:34','2023-03-03',0,13000,0,1500,50000,50000,0,0,0,0,0,0,50000,0,4,0,621,0,1,0,0,0,0,0,0,0,NULL,2024,2,NULL,0,0,0,0,0,0),(4653,'3578171804980003','2023-03-03 10:49:34','2023-03-03',0,13000,5,1500,3716040,50000,0,0,7000,125000,450000,48,3820000,103960,4,0,621,48,1,1,2,56000,2,435000,72000,0,NULL,2024,2,NULL,0,720,1440,1800,1,100000),(4654,'3578174103730002','2023-03-03 10:49:34','2023-03-03',0,13000,0,1500,50000,50000,0,0,0,0,0,0,50000,0,4,0,621,0,1,0,0,0,0,0,0,0,NULL,2024,2,NULL,0,0,0,0,0,0),(4655,'3578172801700001','2023-03-03 10:49:34','2023-03-03',0,13000,0,1500,50000,50000,0,0,0,0,0,0,50000,0,4,0,621,0,1,0,0,0,0,0,0,0,NULL,2024,2,NULL,0,0,0,0,0,0),(4656,'3578115511810005','2023-03-03 10:49:34','2023-03-03',0,13000,0,1500,50000,50000,0,0,0,0,0,0,50000,0,4,0,621,0,1,0,0,0,0,0,0,0,NULL,2024,2,NULL,0,0,0,0,0,0),(4657,'3578174806780006','2023-03-03 10:49:34','2023-03-03',0,13000,0,1500,50000,50000,0,0,0,0,0,0,50000,0,4,0,621,0,1,0,0,0,0,0,0,0,NULL,2024,2,NULL,0,0,0,0,0,0),(4658,'3578100107750004','2023-03-03 10:49:34','2023-03-03',0,13000,0,1500,50000,50000,0,0,0,0,0,0,50000,0,4,0,621,0,1,0,0,0,0,0,0,0,NULL,2024,2,NULL,0,0,0,0,0,0),(4659,'3578175908760001','2023-03-03 10:49:34','2023-03-03',0,13000,0,1500,50000,50000,0,0,0,0,0,0,50000,0,4,0,621,0,1,0,0,0,0,0,0,0,NULL,2024,2,NULL,0,0,0,0,0,0),(4660,'3578196903960001','2023-03-03 10:49:34','2023-03-03',0,13000,0,1500,50000,50000,0,0,0,0,0,0,50000,0,4,0,621,0,1,0,0,0,0,0,0,0,NULL,2024,2,NULL,0,0,0,0,0,0),(4661,'3578174803810011','2023-03-03 10:49:34','2023-03-03',0,13000,0,1500,50000,50000,0,0,0,0,0,0,50000,0,4,0,621,0,1,0,0,0,0,0,0,0,NULL,2024,2,NULL,0,0,0,0,0,0),(4662,'3578105009820004','2023-03-03 10:49:34','2023-03-03',0,13000,0,1500,50000,50000,0,0,0,0,0,0,50000,0,4,0,621,0,1,0,0,0,0,0,0,0,NULL,2024,2,NULL,0,0,0,0,0,0),(4663,'3524136904780002','2023-03-03 10:49:34','2023-03-03',0,13000,0,1500,50000,50000,0,0,0,0,0,0,50000,0,4,0,621,0,1,0,0,0,0,0,0,0,NULL,2024,2,NULL,0,0,0,0,0,0),(4664,'3578167006760220','2023-03-03 10:49:34','2023-03-03',0,13000,0,1500,50000,50000,0,0,0,0,0,0,50000,0,4,0,621,0,1,0,0,0,0,0,0,0,NULL,2024,2,NULL,0,0,0,0,0,0),(4665,'3578171412910002','2023-03-03 10:49:34','2023-03-03',0,13000,0,1500,50000,50000,0,0,0,0,0,0,50000,0,4,0,621,0,1,0,0,0,0,0,0,0,NULL,2024,2,NULL,0,0,0,0,0,0),(4666,'3527034411894028','2023-03-03 10:49:34','2023-03-03',0,13000,0,1500,50000,50000,0,0,0,0,0,0,50000,0,4,0,621,0,1,0,0,0,0,0,0,0,NULL,2024,2,NULL,0,0,0,0,0,0),(4667,'3578102204820010','2023-03-03 10:49:34','2023-03-03',0,13000,0,1500,50000,50000,0,0,0,0,0,0,50000,0,4,0,621,0,1,0,0,0,0,0,0,0,NULL,2024,2,NULL,0,0,0,0,0,0),(4668,'3578171409590002','2023-03-03 10:49:34','2023-03-03',0,13000,0,1500,50000,50000,0,0,0,0,0,0,50000,0,4,0,621,0,1,0,0,0,0,0,0,0,NULL,2024,2,NULL,0,0,0,0,0,0),(4669,'3578161009930005','2023-03-03 10:49:34','2023-03-03',0,13000,0,1500,50000,50000,0,0,0,0,0,0,50000,0,4,0,621,0,1,0,0,0,0,0,0,0,NULL,2024,2,NULL,0,0,0,0,0,0),(4670,'3578045203920004','2023-03-03 10:49:34','2023-03-03',0,13000,0,1500,50000,50000,0,0,0,0,0,0,50000,0,4,0,621,0,1,0,0,0,0,0,0,0,NULL,2024,2,NULL,0,0,0,0,0,0),(4671,'3578282504960001','2023-03-03 10:49:34','2023-03-03',0,13000,0,1500,50000,50000,0,0,0,0,0,0,50000,0,4,0,621,0,1,0,0,0,0,0,0,0,NULL,2024,2,NULL,0,0,0,0,0,0),(4672,'3578271302990004','2023-03-03 10:49:34','2023-03-03',0,13000,0,1500,50000,50000,0,0,0,0,0,0,50000,0,4,0,621,0,1,0,0,0,0,0,0,0,NULL,2024,2,NULL,0,0,0,0,0,0),(4673,'3578102704970005','2023-03-03 10:49:34','2023-03-03',0,13000,0,1500,50000,50000,0,0,0,0,0,0,50000,0,4,0,621,0,1,0,0,0,0,0,0,0,NULL,2024,2,NULL,0,0,0,0,0,0),(4674,'3578062406600003','2023-03-03 10:49:34','2023-03-03',0,13000,0,1500,50000,50000,0,0,0,0,0,0,50000,0,4,0,621,0,1,0,0,0,0,0,0,0,NULL,2024,2,NULL,0,0,0,0,0,0),(4675,'3578110303980002','2023-03-03 10:49:34','2023-03-03',0,13000,0,1500,50000,50000,0,0,0,0,0,0,50000,0,4,0,621,0,1,0,0,0,0,0,0,0,NULL,2024,2,NULL,0,0,0,0,0,0),(4676,'3578164305700006','2023-03-03 10:49:34','2023-03-03',0,13000,0,1500,50000,50000,0,0,0,0,0,0,50000,0,4,0,621,0,1,0,0,0,0,0,0,0,NULL,2024,2,NULL,0,0,0,0,0,0),(4677,'3578055111810009','2023-03-03 10:49:34','2023-03-03',0,13000,0,1500,50000,50000,0,0,0,0,0,0,50000,0,4,0,621,0,1,0,0,0,0,0,0,0,NULL,2024,2,NULL,0,0,0,0,0,0),(4678,'3578176910940002','2023-03-03 10:49:34','2023-03-03',0,13000,0,1500,50000,50000,0,0,0,0,0,0,50000,0,4,0,621,0,1,0,0,0,0,0,0,0,NULL,2024,2,NULL,0,0,0,0,0,0),(4679,'3578164112650003','2023-03-03 10:49:34','2023-03-03',0,13000,0,1500,50000,50000,0,0,0,0,0,0,50000,0,4,0,621,0,1,0,0,0,0,0,0,0,NULL,2024,2,NULL,0,0,0,0,0,0),(4680,'3513212603970001','2023-03-03 10:49:34','2023-03-03',0,13000,0,1500,50000,50000,0,0,0,0,0,0,50000,0,4,0,621,0,1,0,0,0,0,0,0,0,NULL,2024,2,NULL,0,0,0,0,0,0),(4681,'3514126808820003','2023-03-03 10:49:34','2023-03-03',0,13000,0,1500,50000,50000,0,0,0,0,0,0,50000,0,4,0,621,0,1,0,0,0,0,0,0,0,NULL,2024,2,NULL,0,0,0,0,0,0),(4682,'3525124312940002','2023-03-03 10:49:34','2023-03-03',0,13000,0,1500,50000,50000,0,0,0,0,0,0,50000,0,4,0,621,0,1,0,0,0,0,0,0,0,NULL,2024,2,NULL,0,0,0,0,0,0),(4683,'3578171005780011','2023-03-03 11:01:39','2023-03-03',0,13000,0,1500,221000,50000,0,0,0,0,0,0,50000,0,4,171000,622,0,1,0,0,0,0,0,0,0,NULL,2023,1,NULL,100000,0,0,0,0,0),(4684,'3578164404680002','2023-03-03 11:01:39','2023-03-03',0,13000,0,1500,50000,50000,0,0,0,0,0,0,50000,0,4,0,622,0,1,0,0,0,0,0,0,0,NULL,2023,1,NULL,0,0,0,0,0,0),(4685,'3578152104890001','2023-03-03 11:01:39','2023-03-03',0,13000,0,1500,50000,50000,0,0,0,0,0,0,50000,0,4,0,622,0,1,0,0,0,0,0,0,0,NULL,2023,1,NULL,0,0,0,0,0,0),(4686,'3578081005990004','2023-03-03 11:01:40','2023-03-03',0,13000,0,1500,50000,50000,0,0,0,0,0,0,50000,0,4,0,622,0,1,0,0,0,0,0,0,0,NULL,2023,1,NULL,0,0,0,0,0,0),(4687,'3578174905600001','2023-03-03 11:01:40','2023-03-03',0,13000,0,1500,50000,50000,0,0,0,0,0,0,50000,0,4,0,622,0,1,0,0,0,0,0,0,0,NULL,2023,1,NULL,0,0,0,0,0,0),(4688,'3578166610880002','2023-03-03 11:01:40','2023-03-03',0,13000,0,1500,50000,50000,0,0,0,0,0,0,50000,0,4,0,622,0,1,0,0,0,0,0,0,0,NULL,2023,1,NULL,0,0,0,0,0,0),(4689,'3578104406840008','2023-03-03 11:01:40','2023-03-03',0,13000,0,1500,50000,50000,0,0,0,0,0,0,50000,0,4,0,622,0,1,0,0,0,0,0,0,0,NULL,2023,1,NULL,0,0,0,0,0,0),(4690,'3578107103570001','2023-03-03 11:01:40','2023-03-03',0,13000,0,1500,50000,50000,0,0,0,0,0,0,50000,0,4,0,622,0,1,0,0,0,0,0,0,0,NULL,2023,1,NULL,0,0,0,0,0,0),(4691,'3578172009850003','2023-03-03 11:01:40','2023-03-03',0,13000,0,1500,50000,50000,0,0,0,0,0,0,50000,0,4,0,622,0,1,0,0,0,0,0,0,0,NULL,2023,1,NULL,0,0,0,0,0,0),(4692,'3578176908920001','2023-03-03 11:01:40','2023-03-03',0,13000,0,1500,50000,50000,0,0,0,0,0,0,50000,0,4,0,622,0,1,0,0,0,0,0,0,0,NULL,2023,1,NULL,0,0,0,0,0,0),(4693,'3578290802610001','2023-03-03 11:01:40','2023-03-03',0,13000,0,1500,50000,50000,0,0,0,0,0,0,50000,0,4,0,622,0,1,0,0,0,0,0,0,0,NULL,2023,1,NULL,0,0,0,0,0,0),(4694,'3507125312760003','2023-03-03 11:01:40','2023-03-03',0,13000,0,1500,50000,50000,0,0,0,0,0,0,50000,0,4,0,622,0,1,0,0,0,0,0,0,0,NULL,2023,1,NULL,0,0,0,0,0,0),(4695,'3578177110750002','2023-03-03 11:01:40','2023-03-03',0,13000,0,1500,50000,50000,0,0,0,0,0,0,50000,0,4,0,622,0,1,0,0,0,0,0,0,0,NULL,2023,1,NULL,0,0,0,0,0,0),(4696,'3578106707700007','2023-03-03 11:01:40','2023-03-03',0,13000,0,1500,50000,50000,0,0,0,0,0,0,50000,0,4,0,622,0,1,0,0,0,0,0,0,0,NULL,2023,1,NULL,0,0,0,0,0,0),(4697,'3578171804980003','2023-03-03 11:01:40','2023-03-03',0,13000,5,1500,3716040,50000,0,0,7000,125000,450000,48,3820000,103960,4,0,622,48,1,1,2,56000,2,435000,72000,0,NULL,2023,1,NULL,0,720,1440,1800,1,100000),(4698,'3578174103730002','2023-03-03 11:01:40','2023-03-03',0,13000,0,1500,50000,50000,0,0,0,0,0,0,50000,0,4,0,622,0,1,0,0,0,0,0,0,0,NULL,2023,1,NULL,0,0,0,0,0,0),(4699,'3578172801700001','2023-03-03 11:01:40','2023-03-03',0,13000,0,1500,50000,50000,0,0,0,0,0,0,50000,0,4,0,622,0,1,0,0,0,0,0,0,0,NULL,2023,1,NULL,0,0,0,0,0,0),(4700,'3578115511810005','2023-03-03 11:01:40','2023-03-03',0,13000,0,1500,50000,50000,0,0,0,0,0,0,50000,0,4,0,622,0,1,0,0,0,0,0,0,0,NULL,2023,1,NULL,0,0,0,0,0,0),(4701,'3578174806780006','2023-03-03 11:01:40','2023-03-03',0,13000,0,1500,50000,50000,0,0,0,0,0,0,50000,0,4,0,622,0,1,0,0,0,0,0,0,0,NULL,2023,1,NULL,0,0,0,0,0,0),(4702,'3578100107750004','2023-03-03 11:01:40','2023-03-03',0,13000,0,1500,50000,50000,0,0,0,0,0,0,50000,0,4,0,622,0,1,0,0,0,0,0,0,0,NULL,2023,1,NULL,0,0,0,0,0,0),(4703,'3578175908760001','2023-03-03 11:01:40','2023-03-03',0,13000,0,1500,50000,50000,0,0,0,0,0,0,50000,0,4,0,622,0,1,0,0,0,0,0,0,0,NULL,2023,1,NULL,0,0,0,0,0,0),(4704,'3578196903960001','2023-03-03 11:01:40','2023-03-03',0,13000,0,1500,50000,50000,0,0,0,0,0,0,50000,0,4,0,622,0,1,0,0,0,0,0,0,0,NULL,2023,1,NULL,0,0,0,0,0,0),(4705,'3578174803810011','2023-03-03 11:01:40','2023-03-03',0,13000,0,1500,50000,50000,0,0,0,0,0,0,50000,0,4,0,622,0,1,0,0,0,0,0,0,0,NULL,2023,1,NULL,0,0,0,0,0,0),(4706,'3578105009820004','2023-03-03 11:01:40','2023-03-03',0,13000,0,1500,50000,50000,0,0,0,0,0,0,50000,0,4,0,622,0,1,0,0,0,0,0,0,0,NULL,2023,1,NULL,0,0,0,0,0,0),(4707,'3524136904780002','2023-03-03 11:01:40','2023-03-03',0,13000,0,1500,50000,50000,0,0,0,0,0,0,50000,0,4,0,622,0,1,0,0,0,0,0,0,0,NULL,2023,1,NULL,0,0,0,0,0,0),(4708,'3578167006760220','2023-03-03 11:01:40','2023-03-03',0,13000,0,1500,50000,50000,0,0,0,0,0,0,50000,0,4,0,622,0,1,0,0,0,0,0,0,0,NULL,2023,1,NULL,0,0,0,0,0,0),(4709,'3578171412910002','2023-03-03 11:01:40','2023-03-03',0,13000,0,1500,50000,50000,0,0,0,0,0,0,50000,0,4,0,622,0,1,0,0,0,0,0,0,0,NULL,2023,1,NULL,0,0,0,0,0,0),(4710,'3527034411894028','2023-03-03 11:01:40','2023-03-03',0,13000,0,1500,50000,50000,0,0,0,0,0,0,50000,0,4,0,622,0,1,0,0,0,0,0,0,0,NULL,2023,1,NULL,0,0,0,0,0,0),(4711,'3578102204820010','2023-03-03 11:01:40','2023-03-03',0,13000,0,1500,50000,50000,0,0,0,0,0,0,50000,0,4,0,622,0,1,0,0,0,0,0,0,0,NULL,2023,1,NULL,0,0,0,0,0,0),(4712,'3578171409590002','2023-03-03 11:01:40','2023-03-03',0,13000,0,1500,50000,50000,0,0,0,0,0,0,50000,0,4,0,622,0,1,0,0,0,0,0,0,0,NULL,2023,1,NULL,0,0,0,0,0,0),(4713,'3578161009930005','2023-03-03 11:01:40','2023-03-03',0,13000,0,1500,50000,50000,0,0,0,0,0,0,50000,0,4,0,622,0,1,0,0,0,0,0,0,0,NULL,2023,1,NULL,0,0,0,0,0,0),(4714,'3578045203920004','2023-03-03 11:01:41','2023-03-03',0,13000,0,1500,50000,50000,0,0,0,0,0,0,50000,0,4,0,622,0,1,0,0,0,0,0,0,0,NULL,2023,1,NULL,0,0,0,0,0,0),(4715,'3578282504960001','2023-03-03 11:01:41','2023-03-03',0,13000,0,1500,50000,50000,0,0,0,0,0,0,50000,0,4,0,622,0,1,0,0,0,0,0,0,0,NULL,2023,1,NULL,0,0,0,0,0,0),(4716,'3578271302990004','2023-03-03 11:01:41','2023-03-03',0,13000,0,1500,50000,50000,0,0,0,0,0,0,50000,0,4,0,622,0,1,0,0,0,0,0,0,0,NULL,2023,1,NULL,0,0,0,0,0,0),(4717,'3578102704970005','2023-03-03 11:01:41','2023-03-03',0,13000,0,1500,50000,50000,0,0,0,0,0,0,50000,0,4,0,622,0,1,0,0,0,0,0,0,0,NULL,2023,1,NULL,0,0,0,0,0,0),(4718,'3578062406600003','2023-03-03 11:01:41','2023-03-03',0,13000,0,1500,50000,50000,0,0,0,0,0,0,50000,0,4,0,622,0,1,0,0,0,0,0,0,0,NULL,2023,1,NULL,0,0,0,0,0,0),(4719,'3578110303980002','2023-03-03 11:01:41','2023-03-03',0,13000,0,1500,50000,50000,0,0,0,0,0,0,50000,0,4,0,622,0,1,0,0,0,0,0,0,0,NULL,2023,1,NULL,0,0,0,0,0,0),(4720,'3578164305700006','2023-03-03 11:01:41','2023-03-03',0,13000,0,1500,50000,50000,0,0,0,0,0,0,50000,0,4,0,622,0,1,0,0,0,0,0,0,0,NULL,2023,1,NULL,0,0,0,0,0,0),(4721,'3578055111810009','2023-03-03 11:01:41','2023-03-03',0,13000,0,1500,50000,50000,0,0,0,0,0,0,50000,0,4,0,622,0,1,0,0,0,0,0,0,0,NULL,2023,1,NULL,0,0,0,0,0,0),(4722,'3578176910940002','2023-03-03 11:01:41','2023-03-03',0,13000,0,1500,50000,50000,0,0,0,0,0,0,50000,0,4,0,622,0,1,0,0,0,0,0,0,0,NULL,2023,1,NULL,0,0,0,0,0,0),(4723,'3578164112650003','2023-03-03 11:01:41','2023-03-03',0,13000,0,1500,50000,50000,0,0,0,0,0,0,50000,0,4,0,622,0,1,0,0,0,0,0,0,0,NULL,2023,1,NULL,0,0,0,0,0,0),(4724,'3513212603970001','2023-03-03 11:01:41','2023-03-03',0,13000,0,1500,50000,50000,0,0,0,0,0,0,50000,0,4,0,622,0,1,0,0,0,0,0,0,0,NULL,2023,1,NULL,0,0,0,0,0,0),(4725,'3514126808820003','2023-03-03 11:01:41','2023-03-03',0,13000,0,1500,50000,50000,0,0,0,0,0,0,50000,0,4,0,622,0,1,0,0,0,0,0,0,0,NULL,2023,1,NULL,0,0,0,0,0,0),(4726,'3525124312940002','2023-03-03 11:01:41','2023-03-03',0,13000,0,1500,50000,50000,0,0,0,0,0,0,50000,0,4,0,622,0,1,0,0,0,0,0,0,0,NULL,2023,1,NULL,0,0,0,0,0,0);
/*!40000 ALTER TABLE `gaji_sma` ENABLE KEYS */;
UNLOCK TABLES;
DROP TABLE IF EXISTS `gaji_smk`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `gaji_smk` (
  `id` int NOT NULL AUTO_INCREMENT,
  `pegawai` varchar(50) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci DEFAULT NULL,
  `datetime` datetime DEFAULT NULL,
  `month` date DEFAULT NULL,
  `lembur` int DEFAULT NULL,
  `value_lembur` bigint DEFAULT NULL,
  `jabatan_id` int DEFAULT NULL,
  `gapok` bigint DEFAULT NULL,
  `total` bigint DEFAULT NULL,
  `value_reward` bigint DEFAULT NULL,
  `value_inval` bigint DEFAULT NULL,
  `piket_count` int DEFAULT NULL,
  `value_piket` bigint DEFAULT NULL,
  `tugastambahan` bigint DEFAULT NULL,
  `tj_jabatan` bigint DEFAULT NULL,
  `kehadiran` int DEFAULT NULL,
  `sub_total` bigint DEFAULT NULL,
  `potongan` bigint DEFAULT NULL,
  `jenjang_id` int DEFAULT NULL,
  `penyesuaian` bigint DEFAULT NULL,
  `pid` int DEFAULT NULL,
  `jp` int DEFAULT NULL,
  `type` int DEFAULT NULL,
  `jenis_guru` int DEFAULT NULL,
  `tambahan` int DEFAULT NULL,
  `value_kehadiran` bigint DEFAULT NULL,
  `periode` int DEFAULT NULL,
  `tunjangan_periode` bigint DEFAULT NULL,
  `total_gapok` bigint DEFAULT NULL,
  `lama_kerja` int DEFAULT NULL,
  `status` int DEFAULT NULL,
  `tahun` int DEFAULT NULL,
  `bulan` int DEFAULT NULL,
  `potongan_bendahara` bigint DEFAULT NULL,
  `voucher` bigint DEFAULT NULL,
  `jaminan_pensiun` bigint DEFAULT NULL,
  `jaminan_hari_tua` bigint DEFAULT NULL,
  `total_pph21` bigint DEFAULT NULL,
  `status_npwp` int DEFAULT NULL,
  `bpjs_kesehatan` bigint DEFAULT NULL,
  PRIMARY KEY (`id`) USING BTREE
) ENGINE=InnoDB AUTO_INCREMENT=1207 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci ROW_FORMAT=DYNAMIC;
/*!40101 SET character_set_client = @saved_cs_client */;

LOCK TABLES `gaji_smk` WRITE;
/*!40000 ALTER TABLE `gaji_smk` DISABLE KEYS */;
INSERT INTO `gaji_smk` VALUES (556,'102327','2023-02-27 06:00:39','2023-02-27',0,13000,5,2500,3975800,50000,0,0,7000,100000,575000,48,3983000,7200,5,0,57,48,1,1,2,56000,4,450000,120000,2,NULL,2023,7,NULL,0,1200,2400,3600,0,0),(557,'198304102006070420','2023-02-27 06:00:39','2023-02-27',0,13000,60,1500,50000,50000,0,0,0,0,0,0,50000,0,5,0,57,0,1,0,0,0,0,0,0,0,NULL,2023,7,NULL,0,0,0,0,0,0),(558,'196905271996070283','2023-02-27 06:00:39','2023-02-27',0,13000,5,1500,625000,50000,0,0,0,0,575000,0,625000,0,5,0,57,0,1,0,0,0,0,0,0,0,NULL,2023,7,NULL,0,0,0,0,0,0),(559,'198811182011070498','2023-02-27 06:00:39','2023-02-27',0,13000,62,1500,50000,50000,0,0,0,0,0,0,50000,0,5,0,57,0,1,0,0,0,0,0,0,0,NULL,2023,7,NULL,0,0,0,0,0,0),(560,'198408252010070492','2023-02-27 06:00:39','2023-02-27',0,13000,61,1500,50000,50000,0,0,0,0,0,0,50000,0,5,0,57,0,1,0,0,0,0,0,0,0,NULL,2023,7,NULL,0,0,0,0,0,0),(561,'197004061996070319','2023-02-27 06:00:39','2023-02-27',0,13000,5,1500,625000,50000,0,0,0,0,575000,0,625000,0,5,0,57,0,1,0,0,0,0,0,0,0,NULL,2023,7,NULL,0,0,0,0,0,0),(562,'196701121998070311','2023-02-27 06:00:39','2023-02-27',0,13000,5,1500,625000,50000,0,0,0,0,575000,0,625000,0,5,0,57,0,1,0,0,0,0,0,0,0,NULL,2023,7,NULL,0,0,0,0,0,0),(563,'196512011999070327','2023-02-27 06:00:39','2023-02-27',0,13000,5,1500,625000,50000,0,0,0,0,575000,0,625000,0,5,0,57,0,1,0,0,0,0,0,0,0,NULL,2023,7,NULL,0,0,0,0,0,0),(564,'197001282000070310','2023-02-27 06:00:39','2023-02-27',0,13000,5,1500,625000,50000,0,0,0,0,575000,0,625000,0,5,0,57,0,1,0,0,0,0,0,0,0,NULL,2023,7,NULL,0,0,0,0,0,0),(565,'197604052003070393','2023-02-27 06:00:39','2023-02-27',0,13000,5,1500,625000,50000,0,0,0,0,575000,0,625000,0,5,0,57,0,1,0,0,0,0,0,0,0,NULL,2023,7,NULL,0,0,0,0,0,0),(566,'197606042004070397','2023-02-27 06:00:39','2023-02-27',0,13000,5,1500,625000,50000,0,0,0,0,575000,0,625000,0,5,0,57,0,1,0,0,0,0,0,0,0,NULL,2023,7,NULL,0,0,0,0,0,0),(567,'197604012004070401','2023-02-27 06:00:39','2023-02-27',0,13000,5,1500,625000,50000,0,0,0,0,575000,0,625000,0,5,0,57,0,1,0,0,0,0,0,0,0,NULL,2023,7,NULL,0,0,0,0,0,0),(568,'197704092004070403','2023-02-27 06:00:39','2023-02-27',0,13000,5,1500,625000,50000,0,0,0,0,575000,0,625000,0,5,0,57,0,1,0,0,0,0,0,0,0,NULL,2023,7,NULL,0,0,0,0,0,0),(569,'198110032004070399','2023-02-27 06:00:39','2023-02-27',0,13000,64,1500,50000,50000,0,0,0,0,0,0,50000,0,5,0,57,0,1,0,0,0,0,0,0,0,NULL,2023,7,NULL,0,0,0,0,0,0),(570,'198008302008070456','2023-02-27 06:00:39','2023-02-27',0,13000,5,1500,625000,50000,0,0,0,0,575000,0,625000,0,5,0,57,0,1,0,0,0,0,0,0,0,NULL,2023,7,NULL,0,0,0,0,0,0),(571,'198012172005070411','2023-02-27 06:00:39','2023-02-27',0,13000,5,1500,625000,50000,0,0,0,0,575000,0,625000,0,5,0,57,0,1,0,0,0,0,0,0,0,NULL,2023,7,NULL,0,0,0,0,0,0),(572,'198202072008070458','2023-02-27 06:00:39','2023-02-27',0,13000,5,1500,625000,50000,0,0,0,0,575000,0,625000,0,5,0,57,0,1,0,0,0,0,0,0,0,NULL,2023,7,NULL,0,0,0,0,0,0),(573,'197404132008070462','2023-02-27 06:00:39','2023-02-27',0,13000,5,1500,625000,50000,0,0,0,0,575000,0,625000,0,5,0,57,0,1,0,0,0,0,0,0,0,NULL,2023,7,NULL,0,0,0,0,0,0),(574,'198411102008070461','2023-02-27 06:00:39','2023-02-27',0,13000,5,1500,625000,50000,0,0,0,0,575000,0,625000,0,5,0,57,0,1,0,0,0,0,0,0,0,NULL,2023,7,NULL,0,0,0,0,0,0),(575,'198404222008070464','2023-02-27 06:00:39','2023-02-27',0,13000,5,1500,625000,50000,0,0,0,0,575000,0,625000,0,5,0,57,0,1,0,0,0,0,0,0,0,NULL,2023,7,NULL,0,0,0,0,0,0),(576,'197503172009070477','2023-02-27 06:00:39','2023-02-27',0,13000,5,1500,625000,50000,0,0,0,0,575000,0,625000,0,5,0,57,0,1,0,0,0,0,0,0,0,NULL,2023,7,NULL,0,0,0,0,0,0),(577,'198109292009070468','2023-02-27 06:00:39','2023-02-27',0,13000,5,1500,625000,50000,0,0,0,0,575000,0,625000,0,5,0,57,0,1,0,0,0,0,0,0,0,NULL,2023,7,NULL,0,0,0,0,0,0),(578,'198703102010070491','2023-02-27 06:00:39','2023-02-27',0,13000,5,1500,625000,50000,0,0,0,0,575000,0,625000,0,5,0,57,0,1,0,0,0,0,0,0,0,NULL,2023,7,NULL,0,0,0,0,0,0),(579,'198406222010070490','2023-02-27 06:00:39','2023-02-27',0,13000,5,1500,625000,50000,0,0,0,0,575000,0,625000,0,5,0,57,0,1,0,0,0,0,0,0,0,NULL,2023,7,NULL,0,0,0,0,0,0),(580,'197203032010070488','2023-02-27 06:00:39','2023-02-27',0,13000,5,1500,625000,50000,0,0,0,0,575000,0,625000,0,5,0,57,0,1,0,0,0,0,0,0,0,NULL,2023,7,NULL,0,0,0,0,0,0),(581,'197911042011070504','2023-02-27 06:00:39','2023-02-27',0,13000,5,1500,625000,50000,0,0,0,0,575000,0,625000,0,5,0,57,0,1,0,0,0,0,0,0,0,NULL,2023,7,NULL,0,0,0,0,0,0),(582,'197606302011070346','2023-02-27 06:00:39','2023-02-27',0,13000,5,1500,625000,50000,0,0,0,0,575000,0,625000,0,5,0,57,0,1,0,0,0,0,0,0,0,NULL,2023,7,NULL,0,0,0,0,0,0),(583,'198712282011070501','2023-02-27 06:00:39','2023-02-27',0,13000,5,1500,625000,50000,0,0,0,0,575000,0,625000,0,5,0,57,0,1,0,0,0,0,0,0,0,NULL,2023,7,NULL,0,0,0,0,0,0),(584,'198103082010070489','2023-02-27 06:00:39','2023-02-27',0,13000,5,1500,625000,50000,0,0,0,0,575000,0,625000,0,5,0,57,0,1,0,0,0,0,0,0,0,NULL,2023,7,NULL,0,0,0,0,0,0),(585,'198111152012070453','2023-02-27 06:00:39','2023-02-27',0,13000,5,1500,625000,50000,0,0,0,0,575000,0,625000,0,5,0,57,0,1,0,0,0,0,0,0,0,NULL,2023,7,NULL,0,0,0,0,0,0),(586,'198505062012070455','2023-02-27 06:00:39','2023-02-27',0,13000,5,1500,625000,50000,0,0,0,0,575000,0,625000,0,5,0,57,0,1,0,0,0,0,0,0,0,NULL,2023,7,NULL,0,0,0,0,0,0),(587,'196904192012070514','2023-02-27 06:00:39','2023-02-27',0,13000,5,1500,625000,50000,0,0,0,0,575000,0,625000,0,5,0,57,0,1,0,0,0,0,0,0,0,NULL,2023,7,NULL,0,0,0,0,0,0),(588,'199003172012070513','2023-02-27 06:00:39','2023-02-27',0,13000,5,1500,625000,50000,0,0,0,0,575000,0,625000,0,5,0,57,0,1,0,0,0,0,0,0,0,NULL,2023,7,NULL,0,0,0,0,0,0),(589,'198306252013070516','2023-02-27 06:00:39','2023-02-27',0,13000,5,1500,625000,50000,0,0,0,0,575000,0,625000,0,5,0,57,0,1,0,0,0,0,0,0,0,NULL,2023,7,NULL,0,0,0,0,0,0),(590,'198111112014070429','2023-02-27 06:00:39','2023-02-27',0,13000,5,1500,625000,50000,0,0,0,0,575000,0,625000,0,5,0,57,0,1,0,0,0,0,0,0,0,NULL,2023,7,NULL,0,0,0,0,0,0),(591,'198511142014070522','2023-02-27 06:00:39','2023-02-27',0,13000,101,1500,50000,50000,0,0,0,0,0,0,50000,0,5,0,57,0,1,0,0,0,0,0,0,0,NULL,2023,7,NULL,0,0,0,0,0,0),(592,'198709192014070523','2023-02-27 06:00:39','2023-02-27',0,13000,5,1500,625000,50000,0,0,0,0,575000,0,625000,0,5,0,57,0,1,0,0,0,0,0,0,0,NULL,2023,7,NULL,0,0,0,0,0,0),(593,'198801022016070560','2023-02-27 06:00:39','2023-02-27',0,13000,5,1500,625000,50000,0,0,0,0,575000,0,625000,0,5,0,57,0,1,0,0,0,0,0,0,0,NULL,2023,7,NULL,0,0,0,0,0,0),(594,'199310102016070563','2023-02-27 06:00:39','2023-02-27',0,13000,5,1500,625000,50000,0,0,0,0,575000,0,625000,0,5,0,57,0,1,0,0,0,0,0,0,0,NULL,2023,7,NULL,0,0,0,0,0,0),(595,'199503172017070570','2023-02-27 06:00:39','2023-02-27',0,13000,5,1500,625000,50000,0,0,0,0,575000,0,625000,0,5,0,57,0,1,0,0,0,0,0,0,0,NULL,2023,7,NULL,0,0,0,0,0,0),(596,'197910192017070569','2023-02-27 06:00:39','2023-02-27',0,13000,5,1500,625000,50000,0,0,0,0,575000,0,625000,0,5,0,57,0,1,0,0,0,0,0,0,0,NULL,2023,7,NULL,0,0,0,0,0,0),(597,'197701042017070571','2023-02-27 06:00:39','2023-02-27',0,13000,5,1500,625000,50000,0,0,0,0,575000,0,625000,0,5,0,57,0,1,0,0,0,0,0,0,0,NULL,2023,7,NULL,0,0,0,0,0,0),(598,'198504282017070572','2023-02-27 06:00:39','2023-02-27',0,13000,5,1500,625000,50000,0,0,0,0,575000,0,625000,0,5,0,57,0,1,0,0,0,0,0,0,0,NULL,2023,7,NULL,0,0,0,0,0,0),(599,'199208202017070573','2023-02-27 06:00:39','2023-02-27',0,13000,5,1500,625000,50000,0,0,0,0,575000,0,625000,0,5,0,57,0,1,0,0,0,0,0,0,0,NULL,2023,7,NULL,0,0,0,0,0,0),(600,'199304222018070608','2023-02-27 06:00:39','2023-02-27',0,13000,5,1500,625000,50000,0,0,0,0,575000,0,625000,0,5,0,57,0,1,0,0,0,0,0,0,0,NULL,2023,7,NULL,0,0,0,0,0,0),(601,'197810062018070606','2023-02-27 06:00:39','2023-02-27',0,13000,5,1500,625000,50000,0,0,0,0,575000,0,625000,0,5,0,57,0,1,0,0,0,0,0,0,0,NULL,2023,7,NULL,0,0,0,0,0,0),(602,'199701082019070582','2023-02-27 06:00:39','2023-02-27',0,13000,40,1500,50000,50000,0,0,0,0,0,0,50000,0,5,0,57,0,1,0,0,0,0,0,0,0,NULL,2023,7,NULL,0,0,0,0,0,0),(603,'196312141989032006','2023-02-27 06:00:39','2023-02-27',0,13000,5,1500,625000,50000,0,0,0,0,575000,0,625000,0,5,0,57,0,1,0,0,0,0,0,0,0,NULL,2023,7,NULL,0,0,0,0,0,0),(940,'102327','2023-02-27 07:26:39','2023-02-27',0,13000,5,2500,3975800,50000,0,0,7000,100000,575000,48,3983000,7200,5,0,66,48,1,1,2,56000,4,450000,120000,2,NULL,2023,6,NULL,0,1200,2400,3600,0,0),(941,'198304102006070420','2023-02-27 07:26:39','2023-02-27',0,13000,60,1500,50000,50000,0,0,0,0,0,0,50000,0,5,0,66,0,1,0,0,0,0,0,0,0,NULL,2023,6,NULL,0,0,0,0,0,0),(942,'196905271996070283','2023-02-27 07:26:39','2023-02-27',0,13000,5,1500,625000,50000,0,0,0,0,575000,0,625000,0,5,0,66,0,1,0,0,0,0,0,0,0,NULL,2023,6,NULL,0,0,0,0,0,0),(943,'198811182011070498','2023-02-27 07:26:39','2023-02-27',0,13000,62,1500,50000,50000,0,0,0,0,0,0,50000,0,5,0,66,0,1,0,0,0,0,0,0,0,NULL,2023,6,NULL,0,0,0,0,0,0),(944,'198408252010070492','2023-02-27 07:26:39','2023-02-27',0,13000,61,1500,50000,50000,0,0,0,0,0,0,50000,0,5,0,66,0,1,0,0,0,0,0,0,0,NULL,2023,6,NULL,0,0,0,0,0,0),(945,'197004061996070319','2023-02-27 07:26:39','2023-02-27',0,13000,5,1500,625000,50000,0,0,0,0,575000,0,625000,0,5,0,66,0,1,0,0,0,0,0,0,0,NULL,2023,6,NULL,0,0,0,0,0,0),(946,'196701121998070311','2023-02-27 07:26:39','2023-02-27',0,13000,5,1500,625000,50000,0,0,0,0,575000,0,625000,0,5,0,66,0,1,0,0,0,0,0,0,0,NULL,2023,6,NULL,0,0,0,0,0,0),(947,'196512011999070327','2023-02-27 07:26:39','2023-02-27',0,13000,5,1500,625000,50000,0,0,0,0,575000,0,625000,0,5,0,66,0,1,0,0,0,0,0,0,0,NULL,2023,6,NULL,0,0,0,0,0,0),(948,'197001282000070310','2023-02-27 07:26:39','2023-02-27',0,13000,5,1500,625000,50000,0,0,0,0,575000,0,625000,0,5,0,66,0,1,0,0,0,0,0,0,0,NULL,2023,6,NULL,0,0,0,0,0,0),(949,'197604052003070393','2023-02-27 07:26:39','2023-02-27',0,13000,5,1500,625000,50000,0,0,0,0,575000,0,625000,0,5,0,66,0,1,0,0,0,0,0,0,0,NULL,2023,6,NULL,0,0,0,0,0,0),(950,'197606042004070397','2023-02-27 07:26:39','2023-02-27',0,13000,5,1500,625000,50000,0,0,0,0,575000,0,625000,0,5,0,66,0,1,0,0,0,0,0,0,0,NULL,2023,6,NULL,0,0,0,0,0,0),(951,'197604012004070401','2023-02-27 07:26:39','2023-02-27',0,13000,5,1500,625000,50000,0,0,0,0,575000,0,625000,0,5,0,66,0,1,0,0,0,0,0,0,0,NULL,2023,6,NULL,0,0,0,0,0,0),(952,'197704092004070403','2023-02-27 07:26:39','2023-02-27',0,13000,5,1500,625000,50000,0,0,0,0,575000,0,625000,0,5,0,66,0,1,0,0,0,0,0,0,0,NULL,2023,6,NULL,0,0,0,0,0,0),(953,'198110032004070399','2023-02-27 07:26:39','2023-02-27',0,13000,64,1500,50000,50000,0,0,0,0,0,0,50000,0,5,0,66,0,1,0,0,0,0,0,0,0,NULL,2023,6,NULL,0,0,0,0,0,0),(954,'198008302008070456','2023-02-27 07:26:39','2023-02-27',0,13000,5,1500,625000,50000,0,0,0,0,575000,0,625000,0,5,0,66,0,1,0,0,0,0,0,0,0,NULL,2023,6,NULL,0,0,0,0,0,0),(955,'198012172005070411','2023-02-27 07:26:39','2023-02-27',0,13000,5,1500,625000,50000,0,0,0,0,575000,0,625000,0,5,0,66,0,1,0,0,0,0,0,0,0,NULL,2023,6,NULL,0,0,0,0,0,0),(956,'198202072008070458','2023-02-27 07:26:39','2023-02-27',0,13000,5,1500,625000,50000,0,0,0,0,575000,0,625000,0,5,0,66,0,1,0,0,0,0,0,0,0,NULL,2023,6,NULL,0,0,0,0,0,0),(957,'197404132008070462','2023-02-27 07:26:39','2023-02-27',0,13000,5,1500,625000,50000,0,0,0,0,575000,0,625000,0,5,0,66,0,1,0,0,0,0,0,0,0,NULL,2023,6,NULL,0,0,0,0,0,0),(958,'198411102008070461','2023-02-27 07:26:39','2023-02-27',0,13000,5,1500,625000,50000,0,0,0,0,575000,0,625000,0,5,0,66,0,1,0,0,0,0,0,0,0,NULL,2023,6,NULL,0,0,0,0,0,0),(959,'198404222008070464','2023-02-27 07:26:39','2023-02-27',0,13000,5,1500,625000,50000,0,0,0,0,575000,0,625000,0,5,0,66,0,1,0,0,0,0,0,0,0,NULL,2023,6,NULL,0,0,0,0,0,0),(960,'197503172009070477','2023-02-27 07:26:39','2023-02-27',0,13000,5,1500,625000,50000,0,0,0,0,575000,0,625000,0,5,0,66,0,1,0,0,0,0,0,0,0,NULL,2023,6,NULL,0,0,0,0,0,0),(961,'198109292009070468','2023-02-27 07:26:39','2023-02-27',0,13000,5,1500,625000,50000,0,0,0,0,575000,0,625000,0,5,0,66,0,1,0,0,0,0,0,0,0,NULL,2023,6,NULL,0,0,0,0,0,0),(962,'198703102010070491','2023-02-27 07:26:39','2023-02-27',0,13000,5,1500,625000,50000,0,0,0,0,575000,0,625000,0,5,0,66,0,1,0,0,0,0,0,0,0,NULL,2023,6,NULL,0,0,0,0,0,0),(963,'198406222010070490','2023-02-27 07:26:39','2023-02-27',0,13000,5,1500,625000,50000,0,0,0,0,575000,0,625000,0,5,0,66,0,1,0,0,0,0,0,0,0,NULL,2023,6,NULL,0,0,0,0,0,0),(964,'197203032010070488','2023-02-27 07:26:39','2023-02-27',0,13000,5,1500,625000,50000,0,0,0,0,575000,0,625000,0,5,0,66,0,1,0,0,0,0,0,0,0,NULL,2023,6,NULL,0,0,0,0,0,0),(965,'197911042011070504','2023-02-27 07:26:40','2023-02-27',0,13000,5,1500,625000,50000,0,0,0,0,575000,0,625000,0,5,0,66,0,1,0,0,0,0,0,0,0,NULL,2023,6,NULL,0,0,0,0,0,0),(966,'197606302011070346','2023-02-27 07:26:40','2023-02-27',0,13000,5,1500,625000,50000,0,0,0,0,575000,0,625000,0,5,0,66,0,1,0,0,0,0,0,0,0,NULL,2023,6,NULL,0,0,0,0,0,0),(967,'198712282011070501','2023-02-27 07:26:40','2023-02-27',0,13000,5,1500,625000,50000,0,0,0,0,575000,0,625000,0,5,0,66,0,1,0,0,0,0,0,0,0,NULL,2023,6,NULL,0,0,0,0,0,0),(968,'198103082010070489','2023-02-27 07:26:40','2023-02-27',0,13000,5,1500,625000,50000,0,0,0,0,575000,0,625000,0,5,0,66,0,1,0,0,0,0,0,0,0,NULL,2023,6,NULL,0,0,0,0,0,0),(969,'198111152012070453','2023-02-27 07:26:40','2023-02-27',0,13000,5,1500,625000,50000,0,0,0,0,575000,0,625000,0,5,0,66,0,1,0,0,0,0,0,0,0,NULL,2023,6,NULL,0,0,0,0,0,0),(970,'198505062012070455','2023-02-27 07:26:40','2023-02-27',0,13000,5,1500,625000,50000,0,0,0,0,575000,0,625000,0,5,0,66,0,1,0,0,0,0,0,0,0,NULL,2023,6,NULL,0,0,0,0,0,0),(971,'196904192012070514','2023-02-27 07:26:40','2023-02-27',0,13000,5,1500,625000,50000,0,0,0,0,575000,0,625000,0,5,0,66,0,1,0,0,0,0,0,0,0,NULL,2023,6,NULL,0,0,0,0,0,0),(972,'199003172012070513','2023-02-27 07:26:40','2023-02-27',0,13000,5,1500,625000,50000,0,0,0,0,575000,0,625000,0,5,0,66,0,1,0,0,0,0,0,0,0,NULL,2023,6,NULL,0,0,0,0,0,0),(973,'198306252013070516','2023-02-27 07:26:40','2023-02-27',0,13000,5,1500,625000,50000,0,0,0,0,575000,0,625000,0,5,0,66,0,1,0,0,0,0,0,0,0,NULL,2023,6,NULL,0,0,0,0,0,0),(974,'198111112014070429','2023-02-27 07:26:40','2023-02-27',0,13000,5,1500,625000,50000,0,0,0,0,575000,0,625000,0,5,0,66,0,1,0,0,0,0,0,0,0,NULL,2023,6,NULL,0,0,0,0,0,0),(975,'198511142014070522','2023-02-27 07:26:40','2023-02-27',0,13000,101,1500,50000,50000,0,0,0,0,0,0,50000,0,5,0,66,0,1,0,0,0,0,0,0,0,NULL,2023,6,NULL,0,0,0,0,0,0),(976,'198709192014070523','2023-02-27 07:26:40','2023-02-27',0,13000,5,1500,625000,50000,0,0,0,0,575000,0,625000,0,5,0,66,0,1,0,0,0,0,0,0,0,NULL,2023,6,NULL,0,0,0,0,0,0),(977,'198801022016070560','2023-02-27 07:26:40','2023-02-27',0,13000,5,1500,625000,50000,0,0,0,0,575000,0,625000,0,5,0,66,0,1,0,0,0,0,0,0,0,NULL,2023,6,NULL,0,0,0,0,0,0),(978,'199310102016070563','2023-02-27 07:26:40','2023-02-27',0,13000,5,1500,625000,50000,0,0,0,0,575000,0,625000,0,5,0,66,0,1,0,0,0,0,0,0,0,NULL,2023,6,NULL,0,0,0,0,0,0),(979,'199503172017070570','2023-02-27 07:26:40','2023-02-27',0,13000,5,1500,625000,50000,0,0,0,0,575000,0,625000,0,5,0,66,0,1,0,0,0,0,0,0,0,NULL,2023,6,NULL,0,0,0,0,0,0),(980,'197910192017070569','2023-02-27 07:26:40','2023-02-27',0,13000,5,1500,625000,50000,0,0,0,0,575000,0,625000,0,5,0,66,0,1,0,0,0,0,0,0,0,NULL,2023,6,NULL,0,0,0,0,0,0),(981,'197701042017070571','2023-02-27 07:26:40','2023-02-27',0,13000,5,1500,625000,50000,0,0,0,0,575000,0,625000,0,5,0,66,0,1,0,0,0,0,0,0,0,NULL,2023,6,NULL,0,0,0,0,0,0),(982,'198504282017070572','2023-02-27 07:26:40','2023-02-27',0,13000,5,1500,625000,50000,0,0,0,0,575000,0,625000,0,5,0,66,0,1,0,0,0,0,0,0,0,NULL,2023,6,NULL,0,0,0,0,0,0),(983,'199208202017070573','2023-02-27 07:26:40','2023-02-27',0,13000,5,1500,625000,50000,0,0,0,0,575000,0,625000,0,5,0,66,0,1,0,0,0,0,0,0,0,NULL,2023,6,NULL,0,0,0,0,0,0),(984,'199304222018070608','2023-02-27 07:26:40','2023-02-27',0,13000,5,1500,625000,50000,0,0,0,0,575000,0,625000,0,5,0,66,0,1,0,0,0,0,0,0,0,NULL,2023,6,NULL,0,0,0,0,0,0),(985,'197810062018070606','2023-02-27 07:26:40','2023-02-27',0,13000,5,1500,625000,50000,0,0,0,0,575000,0,625000,0,5,0,66,0,1,0,0,0,0,0,0,0,NULL,2023,6,NULL,0,0,0,0,0,0),(986,'199701082019070582','2023-02-27 07:26:40','2023-02-27',0,13000,40,1500,50000,50000,0,0,0,0,0,0,50000,0,5,0,66,0,1,0,0,0,0,0,0,0,NULL,2023,6,NULL,0,0,0,0,0,0),(987,'196312141989032006','2023-02-27 07:26:40','2023-02-27',0,13000,5,1500,625000,50000,0,0,0,0,575000,0,625000,0,5,0,66,0,1,0,0,0,0,0,0,0,NULL,2023,6,NULL,0,0,0,0,0,0),(1180,'199007232015070541','2023-03-02 10:12:50','2023-03-02',0,13000,13,1500,50000,50000,0,0,0,0,0,0,50000,0,5,0,73,0,1,0,0,0,0,0,0,0,NULL,2023,12,NULL,0,0,0,0,0,0),(1181,'198112132016070555','2023-03-02 10:12:50','2023-03-02',0,13000,13,1500,50000,50000,0,0,0,0,0,0,50000,0,5,0,73,0,1,0,0,0,0,0,0,0,NULL,2023,12,NULL,0,0,0,0,0,0),(1182,'102327','2023-03-02 10:12:50','2023-03-02',0,13000,5,2500,3975800,50000,0,0,7000,100000,575000,48,3983000,7200,5,0,73,48,1,1,2,56000,4,450000,120000,2,NULL,2023,12,NULL,0,1200,2400,3600,0,0),(1183,'198304102006070420','2023-03-02 10:12:50','2023-03-02',0,13000,60,1500,50000,50000,0,0,0,0,0,0,50000,0,5,0,73,0,1,0,0,0,0,0,0,0,NULL,2023,12,NULL,0,0,0,0,0,0),(1184,'198811182011070498','2023-03-02 10:12:51','2023-03-02',0,13000,62,1500,50000,50000,0,0,0,0,0,0,50000,0,5,0,73,0,1,0,0,0,0,0,0,0,NULL,2023,12,NULL,0,0,0,0,0,0),(1185,'198408252010070492','2023-03-02 10:12:51','2023-03-02',0,13000,61,1500,50000,50000,0,0,0,0,0,0,50000,0,5,0,73,0,1,0,0,0,0,0,0,0,NULL,2023,12,NULL,0,0,0,0,0,0),(1186,'198110032004070399','2023-03-02 10:12:51','2023-03-02',0,13000,64,1500,50000,50000,0,0,0,0,0,0,50000,0,5,0,73,0,1,0,0,0,0,0,0,0,NULL,2023,12,NULL,0,0,0,0,0,0),(1187,'198511142014070522','2023-03-02 10:12:51','2023-03-02',0,13000,101,1500,50000,50000,0,0,0,0,0,0,50000,0,5,0,73,0,1,0,0,0,0,0,0,0,NULL,2023,12,NULL,0,0,0,0,0,0),(1188,'199701082019070582','2023-03-02 10:12:51','2023-03-02',0,13000,40,1500,50000,50000,0,0,0,0,0,0,50000,0,5,0,73,0,1,0,0,0,0,0,0,0,NULL,2023,12,NULL,0,0,0,0,0,0),(1198,'199007232015070541','2023-03-02 10:38:10','2023-03-02',0,13000,13,1500,50000,50000,0,0,0,0,0,0,50000,0,5,0,75,0,1,0,0,0,0,0,0,0,NULL,2023,1,NULL,0,0,0,0,0,0),(1199,'198112132016070555','2023-03-02 10:38:10','2023-03-02',0,13000,13,1500,50000,50000,0,0,0,0,0,0,50000,0,5,0,75,0,1,0,0,0,0,0,0,0,NULL,2023,1,NULL,0,0,0,0,0,0),(1200,'102327','2023-03-02 10:38:10','2023-03-02',0,13000,5,2500,3975800,50000,0,0,7000,100000,575000,48,3983000,7200,5,0,75,48,1,1,2,56000,4,450000,120000,2,NULL,2023,1,NULL,0,1200,2400,3600,0,0),(1201,'198304102006070420','2023-03-02 10:38:10','2023-03-02',0,13000,60,1500,50000,50000,0,0,0,0,0,0,50000,0,5,0,75,0,1,0,0,0,0,0,0,0,NULL,2023,1,NULL,0,0,0,0,0,0),(1202,'198811182011070498','2023-03-02 10:38:10','2023-03-02',0,13000,62,1500,50000,50000,0,0,0,0,0,0,50000,0,5,0,75,0,1,0,0,0,0,0,0,0,NULL,2023,1,NULL,0,0,0,0,0,0),(1203,'198408252010070492','2023-03-02 10:38:10','2023-03-02',0,13000,61,1500,50000,50000,0,0,0,0,0,0,50000,0,5,0,75,0,1,0,0,0,0,0,0,0,NULL,2023,1,NULL,0,0,0,0,0,0),(1204,'198110032004070399','2023-03-02 10:38:11','2023-03-02',0,13000,64,1500,50000,50000,0,0,0,0,0,0,50000,0,5,0,75,0,1,0,0,0,0,0,0,0,NULL,2023,1,NULL,0,0,0,0,0,0),(1205,'198511142014070522','2023-03-02 10:38:12','2023-03-02',0,13000,101,1500,50000,50000,0,0,0,0,0,0,50000,0,5,0,75,0,1,0,0,0,0,0,0,0,NULL,2023,1,NULL,0,0,0,0,0,0),(1206,'199701082019070582','2023-03-02 10:38:12','2023-03-02',0,13000,40,1500,50000,50000,0,0,0,0,0,0,50000,0,5,0,75,0,1,0,0,0,0,0,0,0,NULL,2023,1,NULL,0,0,0,0,0,0);
/*!40000 ALTER TABLE `gaji_smk` ENABLE KEYS */;
UNLOCK TABLES;
DROP TABLE IF EXISTS `gaji_smp`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `gaji_smp` (
  `id` int NOT NULL AUTO_INCREMENT,
  `pegawai` varchar(50) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci DEFAULT NULL,
  `datetime` datetime DEFAULT NULL,
  `month` date DEFAULT NULL,
  `lembur` int DEFAULT NULL,
  `value_lembur` bigint DEFAULT NULL,
  `jabatan_id` int DEFAULT NULL,
  `gapok` bigint DEFAULT NULL,
  `total` bigint DEFAULT NULL,
  `value_reward` bigint DEFAULT NULL,
  `value_inval` bigint DEFAULT NULL,
  `piket_count` int DEFAULT NULL,
  `value_piket` bigint DEFAULT NULL,
  `tugastambahan` bigint DEFAULT NULL,
  `tj_jabatan` bigint DEFAULT NULL,
  `kehadiran` int DEFAULT NULL,
  `sub_total` bigint DEFAULT NULL,
  `potongan` bigint DEFAULT NULL,
  `jenjang_id` int DEFAULT NULL,
  `penyesuaian` bigint DEFAULT NULL,
  `pid` int DEFAULT NULL,
  `jp` int DEFAULT NULL,
  `type` int DEFAULT NULL,
  `jenis_guru` int DEFAULT NULL,
  `tambahan` int DEFAULT NULL,
  `value_kehadiran` bigint DEFAULT NULL,
  `periode` int DEFAULT NULL,
  `tunjangan_periode` bigint DEFAULT NULL,
  `total_gapok` bigint DEFAULT NULL,
  `lama_kerja` int DEFAULT NULL,
  `status` int DEFAULT NULL,
  `tahun` int DEFAULT NULL,
  `bulan` int DEFAULT NULL,
  `potongan_bendahara` bigint DEFAULT NULL,
  `voucher` bigint DEFAULT NULL,
  `jaminan_pensiun` bigint DEFAULT NULL,
  `jaminan_hari_tua` bigint DEFAULT NULL,
  `total_pph21` bigint DEFAULT NULL,
  `bpjs_kesehatan` bigint DEFAULT NULL,
  `status_npwp` int DEFAULT NULL,
  PRIMARY KEY (`id`) USING BTREE
) ENGINE=InnoDB AUTO_INCREMENT=982 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci ROW_FORMAT=DYNAMIC;
/*!40101 SET character_set_client = @saved_cs_client */;

LOCK TABLES `gaji_smp` WRITE;
/*!40000 ALTER TABLE `gaji_smp` DISABLE KEYS */;
INSERT INTO `gaji_smp` VALUES (380,'10238','2023-02-20 06:33:25','2023-02-20',0,13000,5,1500,500000,50000,0,0,8250,0,450000,0,500000,0,3,0,24,0,1,2,0,66000,0,0,0,0,NULL,2023,11,NULL,0,NULL,NULL,NULL,NULL,NULL),(381,'102323','2023-02-20 06:33:25','2023-02-20',0,13000,5,2500,1050000,50000,0,0,7000,100000,450000,0,1050000,0,3,0,24,0,1,1,2,56000,4,450000,0,2,NULL,2023,11,NULL,0,NULL,NULL,NULL,NULL,NULL),(382,'196512051993070226','2023-02-20 06:33:25','2023-02-20',0,13000,5,1500,500000,50000,0,0,0,0,450000,0,500000,0,3,0,24,0,1,0,0,0,0,0,0,0,NULL,2023,11,NULL,0,NULL,NULL,NULL,NULL,NULL),(383,'199202222015070546','2023-02-20 06:33:25','2023-02-20',0,13000,5,1500,500000,50000,0,0,0,0,450000,0,500000,0,3,0,24,0,1,0,0,0,0,0,0,0,NULL,2023,11,NULL,0,NULL,NULL,NULL,NULL,NULL),(384,'198008252004070404','2023-02-20 06:33:25','2023-02-20',0,13000,5,1500,500000,50000,0,0,0,0,450000,0,500000,0,3,0,24,0,1,0,0,0,0,0,0,0,NULL,2023,11,NULL,0,NULL,NULL,NULL,NULL,NULL),(385,'198306292008070448','2023-02-20 06:33:25','2023-02-20',0,13000,5,1500,500000,50000,0,0,0,0,450000,0,500000,0,3,0,24,0,1,0,0,0,0,0,0,0,NULL,2023,11,NULL,0,NULL,NULL,NULL,NULL,NULL),(386,'198011212007070433','2023-02-20 06:33:25','2023-02-20',0,13000,5,1500,500000,50000,0,0,0,0,450000,0,500000,0,3,0,24,0,1,0,0,0,0,0,0,0,NULL,2023,11,NULL,0,NULL,NULL,NULL,NULL,NULL),(387,'195508061997070291','2023-02-20 06:33:26','2023-02-20',0,13000,5,1500,500000,50000,0,0,0,0,450000,0,500000,0,3,0,24,0,1,0,0,0,0,0,0,0,NULL,2023,11,NULL,0,NULL,NULL,NULL,NULL,NULL),(388,'196402131995070258','2023-02-20 06:33:26','2023-02-20',0,13000,5,1500,500000,50000,0,0,0,0,450000,0,500000,0,3,0,24,0,1,0,0,0,0,0,0,0,NULL,2023,11,NULL,0,NULL,NULL,NULL,NULL,NULL),(389,'197905112010070338','2023-02-20 06:33:26','2023-02-20',0,13000,5,1500,500000,50000,0,0,0,0,450000,0,500000,0,3,0,24,0,1,0,0,0,0,0,0,0,NULL,2023,11,NULL,0,NULL,NULL,NULL,NULL,NULL),(390,'198111252006070423','2023-02-20 06:33:26','2023-02-20',0,13000,5,1500,500000,50000,0,0,0,0,450000,0,500000,0,3,0,24,0,1,0,0,0,0,0,0,0,NULL,2023,11,NULL,0,NULL,NULL,NULL,NULL,NULL),(391,'198402172007070436','2023-02-20 06:33:26','2023-02-20',0,13000,5,1500,500000,50000,0,0,0,0,450000,0,500000,0,3,0,24,0,1,0,0,0,0,0,0,0,NULL,2023,11,NULL,0,NULL,NULL,NULL,NULL,NULL),(392,'197503091998070251','2023-02-20 06:33:26','2023-02-20',0,13000,5,1500,500000,50000,0,0,0,0,450000,0,500000,0,3,0,24,0,1,0,0,0,0,0,0,0,NULL,2023,11,NULL,0,NULL,NULL,NULL,NULL,NULL),(393,'198304102006070420','2023-02-20 06:33:26','2023-02-20',0,13000,5,1500,500000,50000,0,0,0,0,450000,0,500000,0,3,0,24,0,1,0,0,0,0,0,0,0,NULL,2023,11,NULL,0,NULL,NULL,NULL,NULL,NULL),(394,'197002261998070248','2023-02-20 06:33:26','2023-02-20',0,13000,5,1500,500000,50000,0,0,0,0,450000,0,500000,0,3,0,24,0,1,0,0,0,0,0,0,0,NULL,2023,11,NULL,0,NULL,NULL,NULL,NULL,NULL),(395,'198411252010070486','2023-02-20 06:33:26','2023-02-20',0,13000,5,1500,500000,50000,0,0,0,0,450000,0,500000,0,3,0,24,0,1,0,0,0,0,0,0,0,NULL,2023,11,NULL,0,NULL,NULL,NULL,NULL,NULL),(396,'197404241999070326','2023-02-20 06:33:26','2023-02-20',0,13000,5,1500,500000,50000,0,0,0,0,450000,0,500000,0,3,0,24,0,1,0,0,0,0,0,0,0,NULL,2023,11,NULL,0,NULL,NULL,NULL,NULL,NULL),(397,'196709081999070325','2023-02-20 06:33:26','2023-02-20',0,13000,5,1500,500000,50000,0,0,0,0,450000,0,500000,0,3,0,24,0,1,0,0,0,0,0,0,0,NULL,2023,11,NULL,0,NULL,NULL,NULL,NULL,NULL),(398,'197612261997070286','2023-02-20 06:33:26','2023-02-20',0,13000,5,1500,500000,50000,0,0,0,0,450000,0,500000,0,3,0,24,0,1,0,0,0,0,0,0,0,NULL,2023,11,NULL,0,NULL,NULL,NULL,NULL,NULL),(399,'199201062014070526','2023-02-20 06:33:26','2023-02-20',0,13000,5,1500,500000,50000,0,0,0,0,450000,0,500000,0,3,0,24,0,1,0,0,0,0,0,0,0,NULL,2023,11,NULL,0,NULL,NULL,NULL,NULL,NULL),(400,'196208291986070105','2023-02-20 06:33:26','2023-02-20',0,13000,5,1500,500000,50000,0,0,0,0,450000,0,500000,0,3,0,24,0,1,0,0,0,0,0,0,0,NULL,2023,11,NULL,0,NULL,NULL,NULL,NULL,NULL),(401,'196512271993070227','2023-02-20 06:33:26','2023-02-20',0,13000,5,1500,500000,50000,0,0,0,0,450000,0,500000,0,3,0,24,0,1,0,0,0,0,0,0,0,NULL,2023,11,NULL,0,NULL,NULL,NULL,NULL,NULL),(402,'197803282006070271','2023-02-20 06:33:26','2023-02-20',0,13000,5,1500,500000,50000,0,0,0,0,450000,0,500000,0,3,0,24,0,1,0,0,0,0,0,0,0,NULL,2023,11,NULL,0,NULL,NULL,NULL,NULL,NULL),(403,'197501302000070339','2023-02-20 06:33:26','2023-02-20',0,13000,5,1500,500000,50000,0,0,0,0,450000,0,500000,0,3,0,24,0,1,0,0,0,0,0,0,0,NULL,2023,11,NULL,0,NULL,NULL,NULL,NULL,NULL),(404,'198610132011070497','2023-02-20 06:33:26','2023-02-20',0,13000,5,1500,500000,50000,0,0,0,0,450000,0,500000,0,3,0,24,0,1,0,0,0,0,0,0,0,NULL,2023,11,NULL,0,NULL,NULL,NULL,NULL,NULL),(405,'198104162007070343','2023-02-20 06:33:26','2023-02-20',0,13000,5,1500,500000,50000,0,0,0,0,450000,0,500000,0,3,0,24,0,1,0,0,0,0,0,0,0,NULL,2023,11,NULL,0,NULL,NULL,NULL,NULL,NULL),(406,'196705282012070509','2023-02-20 06:33:26','2023-02-20',0,13000,5,1500,500000,50000,0,0,0,0,450000,0,500000,0,3,0,24,0,1,0,0,0,0,0,0,0,NULL,2023,11,NULL,0,NULL,NULL,NULL,NULL,NULL),(407,'197608042004070398','2023-02-20 06:33:26','2023-02-20',0,13000,5,1500,500000,50000,0,0,0,0,450000,0,500000,0,3,0,24,0,1,0,0,0,0,0,0,0,NULL,2023,11,NULL,0,NULL,NULL,NULL,NULL,NULL),(408,'196606072001070132','2023-02-20 06:33:26','2023-02-20',0,13000,5,1500,500000,50000,0,0,0,0,450000,0,500000,0,3,0,24,0,1,0,0,0,0,0,0,0,NULL,2023,11,NULL,0,NULL,NULL,NULL,NULL,NULL),(409,'197710262008070465','2023-02-20 06:33:26','2023-02-20',0,13000,5,1500,500000,50000,0,0,0,0,450000,0,500000,0,3,0,24,0,1,0,0,0,0,0,0,0,NULL,2023,11,NULL,0,NULL,NULL,NULL,NULL,NULL),(410,'198101232006070421','2023-02-20 06:33:26','2023-02-20',0,13000,5,1500,500000,50000,0,0,0,0,450000,0,500000,0,3,0,24,0,1,0,0,0,0,0,0,0,NULL,2023,11,NULL,0,NULL,NULL,NULL,NULL,NULL),(411,'198607102012070507','2023-02-20 06:33:26','2023-02-20',0,13000,5,1500,500000,50000,0,0,0,0,450000,0,500000,0,3,0,24,0,1,0,0,0,0,0,0,0,NULL,2023,11,NULL,0,NULL,NULL,NULL,NULL,NULL),(412,'197101091996070265','2023-02-20 06:33:26','2023-02-20',0,13000,5,1500,500000,50000,0,0,0,0,450000,0,500000,0,3,0,24,0,1,0,0,0,0,0,0,0,NULL,2023,11,NULL,0,NULL,NULL,NULL,NULL,NULL),(413,'197208221999070316','2023-02-20 06:33:26','2023-02-20',0,13000,5,1500,500000,50000,0,0,0,0,450000,0,500000,0,3,0,24,0,1,0,0,0,0,0,0,0,NULL,2023,11,NULL,0,NULL,NULL,NULL,NULL,NULL),(414,'196801071994070195','2023-02-20 06:33:26','2023-02-20',0,13000,5,1500,500000,50000,0,0,0,0,450000,0,500000,0,3,0,24,0,1,0,0,0,0,0,0,0,NULL,2023,11,NULL,0,NULL,NULL,NULL,NULL,NULL),(415,'196912161999070314','2023-02-20 06:33:26','2023-02-20',0,13000,5,1500,500000,50000,0,0,0,0,450000,0,500000,0,3,0,24,0,1,0,0,0,0,0,0,0,NULL,2023,11,NULL,0,NULL,NULL,NULL,NULL,NULL),(416,'197508291999070317','2023-02-20 06:33:26','2023-02-20',0,13000,5,1500,500000,50000,0,0,0,0,450000,0,500000,0,3,0,24,0,1,0,0,0,0,0,0,0,NULL,2023,11,NULL,0,NULL,NULL,NULL,NULL,NULL),(417,'197606202001070361','2023-02-20 06:33:26','2023-02-20',0,13000,5,1500,500000,50000,0,0,0,0,450000,0,500000,0,3,0,24,0,1,0,0,0,0,0,0,0,NULL,2023,11,NULL,0,NULL,NULL,NULL,NULL,NULL),(418,'198008292014070532','2023-02-20 06:33:26','2023-02-20',0,13000,5,1500,500000,50000,0,0,0,0,450000,0,500000,0,3,0,24,0,1,0,0,0,0,0,0,0,NULL,2023,11,NULL,0,NULL,NULL,NULL,NULL,NULL),(419,'199610182021110863','2023-02-20 06:33:26','2023-02-20',0,13000,5,1500,500000,50000,0,0,0,0,450000,0,500000,0,3,0,24,0,1,0,0,0,0,0,0,0,NULL,2023,11,NULL,0,NULL,NULL,NULL,NULL,NULL),(420,'199803202022010866','2023-02-20 06:33:26','2023-02-20',0,13000,5,1500,500000,50000,0,0,0,0,450000,0,500000,0,3,0,24,0,1,0,0,0,0,0,0,0,NULL,2023,11,NULL,0,NULL,NULL,NULL,NULL,NULL),(421,'199607072021110864','2023-02-20 06:33:26','2023-02-20',0,13000,5,1500,500000,50000,0,0,0,0,450000,0,500000,0,3,0,24,0,1,0,0,0,0,0,0,0,NULL,2023,11,NULL,0,NULL,NULL,NULL,NULL,NULL),(422,'199806152021110865','2023-02-20 06:33:26','2023-02-20',0,13000,5,1500,500000,50000,0,0,0,0,450000,0,500000,0,3,0,24,0,1,0,0,0,0,0,0,0,NULL,2023,11,NULL,0,NULL,NULL,NULL,NULL,NULL),(724,'10238','2023-02-27 07:46:01','2023-02-27',0,13000,5,1500,500000,50000,0,0,8250,0,450000,0,500000,0,3,0,33,0,1,2,0,66000,0,0,0,0,NULL,2023,8,NULL,0,0,0,0,0,0),(725,'102323','2023-02-27 07:46:01','2023-02-27',0,13000,5,2500,1050000,50000,0,0,7000,100000,450000,0,1050000,0,3,0,33,0,1,1,2,56000,4,450000,0,2,NULL,2023,8,NULL,0,0,0,0,0,0),(726,'196512051993070226','2023-02-27 07:46:01','2023-02-27',0,13000,5,1500,500000,50000,0,0,0,0,450000,0,500000,0,3,0,33,0,1,0,0,0,0,0,0,0,NULL,2023,8,NULL,0,0,0,0,0,0),(727,'199202222015070546','2023-02-27 07:46:01','2023-02-27',0,13000,5,1500,500000,50000,0,0,0,0,450000,0,500000,0,3,0,33,0,1,0,0,0,0,0,0,0,NULL,2023,8,NULL,0,0,0,0,0,0),(728,'198008252004070404','2023-02-27 07:46:01','2023-02-27',0,13000,5,1500,500000,50000,0,0,0,0,450000,0,500000,0,3,0,33,0,1,0,0,0,0,0,0,0,NULL,2023,8,NULL,0,0,0,0,0,0),(729,'198306292008070448','2023-02-27 07:46:01','2023-02-27',0,13000,5,1500,500000,50000,0,0,0,0,450000,0,500000,0,3,0,33,0,1,0,0,0,0,0,0,0,NULL,2023,8,NULL,0,0,0,0,0,0),(730,'198011212007070433','2023-02-27 07:46:01','2023-02-27',0,13000,5,1500,500000,50000,0,0,0,0,450000,0,500000,0,3,0,33,0,1,0,0,0,0,0,0,0,NULL,2023,8,NULL,0,0,0,0,0,0),(731,'195508061997070291','2023-02-27 07:46:01','2023-02-27',0,13000,5,1500,500000,50000,0,0,0,0,450000,0,500000,0,3,0,33,0,1,0,0,0,0,0,0,0,NULL,2023,8,NULL,0,0,0,0,0,0),(732,'196402131995070258','2023-02-27 07:46:01','2023-02-27',0,13000,5,1500,500000,50000,0,0,0,0,450000,0,500000,0,3,0,33,0,1,0,0,0,0,0,0,0,NULL,2023,8,NULL,0,0,0,0,0,0),(733,'197905112010070338','2023-02-27 07:46:01','2023-02-27',0,13000,5,1500,500000,50000,0,0,0,0,450000,0,500000,0,3,0,33,0,1,0,0,0,0,0,0,0,NULL,2023,8,NULL,0,0,0,0,0,0),(734,'198111252006070423','2023-02-27 07:46:01','2023-02-27',0,13000,5,1500,500000,50000,0,0,0,0,450000,0,500000,0,3,0,33,0,1,0,0,0,0,0,0,0,NULL,2023,8,NULL,0,0,0,0,0,0),(735,'198402172007070436','2023-02-27 07:46:01','2023-02-27',0,13000,5,1500,500000,50000,0,0,0,0,450000,0,500000,0,3,0,33,0,1,0,0,0,0,0,0,0,NULL,2023,8,NULL,0,0,0,0,0,0),(736,'197503091998070251','2023-02-27 07:46:01','2023-02-27',0,13000,5,1500,500000,50000,0,0,0,0,450000,0,500000,0,3,0,33,0,1,0,0,0,0,0,0,0,NULL,2023,8,NULL,0,0,0,0,0,0),(737,'198304102006070420','2023-02-27 07:46:02','2023-02-27',0,13000,5,1500,500000,50000,0,0,0,0,450000,0,500000,0,3,0,33,0,1,0,0,0,0,0,0,0,NULL,2023,8,NULL,0,0,0,0,0,0),(738,'197002261998070248','2023-02-27 07:46:02','2023-02-27',0,13000,5,1500,500000,50000,0,0,0,0,450000,0,500000,0,3,0,33,0,1,0,0,0,0,0,0,0,NULL,2023,8,NULL,0,0,0,0,0,0),(739,'198411252010070486','2023-02-27 07:46:02','2023-02-27',0,13000,5,1500,500000,50000,0,0,0,0,450000,0,500000,0,3,0,33,0,1,0,0,0,0,0,0,0,NULL,2023,8,NULL,0,0,0,0,0,0),(740,'197404241999070326','2023-02-27 07:46:02','2023-02-27',0,13000,5,1500,500000,50000,0,0,0,0,450000,0,500000,0,3,0,33,0,1,0,0,0,0,0,0,0,NULL,2023,8,NULL,0,0,0,0,0,0),(741,'196709081999070325','2023-02-27 07:46:02','2023-02-27',0,13000,5,1500,500000,50000,0,0,0,0,450000,0,500000,0,3,0,33,0,1,0,0,0,0,0,0,0,NULL,2023,8,NULL,0,0,0,0,0,0),(742,'197612261997070286','2023-02-27 07:46:02','2023-02-27',0,13000,5,1500,500000,50000,0,0,0,0,450000,0,500000,0,3,0,33,0,1,0,0,0,0,0,0,0,NULL,2023,8,NULL,0,0,0,0,0,0),(743,'199201062014070526','2023-02-27 07:46:02','2023-02-27',0,13000,5,1500,500000,50000,0,0,0,0,450000,0,500000,0,3,0,33,0,1,0,0,0,0,0,0,0,NULL,2023,8,NULL,0,0,0,0,0,0),(744,'196208291986070105','2023-02-27 07:46:02','2023-02-27',0,13000,5,1500,500000,50000,0,0,0,0,450000,0,500000,0,3,0,33,0,1,0,0,0,0,0,0,0,NULL,2023,8,NULL,0,0,0,0,0,0),(745,'196512271993070227','2023-02-27 07:46:02','2023-02-27',0,13000,5,1500,500000,50000,0,0,0,0,450000,0,500000,0,3,0,33,0,1,0,0,0,0,0,0,0,NULL,2023,8,NULL,0,0,0,0,0,0),(746,'197803282006070271','2023-02-27 07:46:02','2023-02-27',0,13000,5,1500,500000,50000,0,0,0,0,450000,0,500000,0,3,0,33,0,1,0,0,0,0,0,0,0,NULL,2023,8,NULL,0,0,0,0,0,0),(747,'197501302000070339','2023-02-27 07:46:02','2023-02-27',0,13000,5,1500,500000,50000,0,0,0,0,450000,0,500000,0,3,0,33,0,1,0,0,0,0,0,0,0,NULL,2023,8,NULL,0,0,0,0,0,0),(748,'198610132011070497','2023-02-27 07:46:02','2023-02-27',0,13000,5,1500,500000,50000,0,0,0,0,450000,0,500000,0,3,0,33,0,1,0,0,0,0,0,0,0,NULL,2023,8,NULL,0,0,0,0,0,0),(749,'198104162007070343','2023-02-27 07:46:02','2023-02-27',0,13000,5,1500,500000,50000,0,0,0,0,450000,0,500000,0,3,0,33,0,1,0,0,0,0,0,0,0,NULL,2023,8,NULL,0,0,0,0,0,0),(750,'196705282012070509','2023-02-27 07:46:02','2023-02-27',0,13000,5,1500,500000,50000,0,0,0,0,450000,0,500000,0,3,0,33,0,1,0,0,0,0,0,0,0,NULL,2023,8,NULL,0,0,0,0,0,0),(751,'197608042004070398','2023-02-27 07:46:02','2023-02-27',0,13000,5,1500,500000,50000,0,0,0,0,450000,0,500000,0,3,0,33,0,1,0,0,0,0,0,0,0,NULL,2023,8,NULL,0,0,0,0,0,0),(752,'196606072001070132','2023-02-27 07:46:02','2023-02-27',0,13000,5,1500,500000,50000,0,0,0,0,450000,0,500000,0,3,0,33,0,1,0,0,0,0,0,0,0,NULL,2023,8,NULL,0,0,0,0,0,0),(753,'197710262008070465','2023-02-27 07:46:02','2023-02-27',0,13000,5,1500,500000,50000,0,0,0,0,450000,0,500000,0,3,0,33,0,1,0,0,0,0,0,0,0,NULL,2023,8,NULL,0,0,0,0,0,0),(754,'198101232006070421','2023-02-27 07:46:02','2023-02-27',0,13000,5,1500,500000,50000,0,0,0,0,450000,0,500000,0,3,0,33,0,1,0,0,0,0,0,0,0,NULL,2023,8,NULL,0,0,0,0,0,0),(755,'198607102012070507','2023-02-27 07:46:02','2023-02-27',0,13000,5,1500,500000,50000,0,0,0,0,450000,0,500000,0,3,0,33,0,1,0,0,0,0,0,0,0,NULL,2023,8,NULL,0,0,0,0,0,0),(756,'197101091996070265','2023-02-27 07:46:02','2023-02-27',0,13000,5,1500,500000,50000,0,0,0,0,450000,0,500000,0,3,0,33,0,1,0,0,0,0,0,0,0,NULL,2023,8,NULL,0,0,0,0,0,0),(757,'197208221999070316','2023-02-27 07:46:02','2023-02-27',0,13000,5,1500,500000,50000,0,0,0,0,450000,0,500000,0,3,0,33,0,1,0,0,0,0,0,0,0,NULL,2023,8,NULL,0,0,0,0,0,0),(758,'196801071994070195','2023-02-27 07:46:02','2023-02-27',0,13000,5,1500,500000,50000,0,0,0,0,450000,0,500000,0,3,0,33,0,1,0,0,0,0,0,0,0,NULL,2023,8,NULL,0,0,0,0,0,0),(759,'196912161999070314','2023-02-27 07:46:02','2023-02-27',0,13000,5,1500,500000,50000,0,0,0,0,450000,0,500000,0,3,0,33,0,1,0,0,0,0,0,0,0,NULL,2023,8,NULL,0,0,0,0,0,0),(760,'197508291999070317','2023-02-27 07:46:02','2023-02-27',0,13000,5,1500,500000,50000,0,0,0,0,450000,0,500000,0,3,0,33,0,1,0,0,0,0,0,0,0,NULL,2023,8,NULL,0,0,0,0,0,0),(761,'197606202001070361','2023-02-27 07:46:02','2023-02-27',0,13000,5,1500,500000,50000,0,0,0,0,450000,0,500000,0,3,0,33,0,1,0,0,0,0,0,0,0,NULL,2023,8,NULL,0,0,0,0,0,0),(762,'198008292014070532','2023-02-27 07:46:02','2023-02-27',0,13000,5,1500,500000,50000,0,0,0,0,450000,0,500000,0,3,0,33,0,1,0,0,0,0,0,0,0,NULL,2023,8,NULL,0,0,0,0,0,0),(763,'199610182021110863','2023-02-27 07:46:02','2023-02-27',0,13000,5,1500,500000,50000,0,0,0,0,450000,0,500000,0,3,0,33,0,1,0,0,0,0,0,0,0,NULL,2023,8,NULL,0,0,0,0,0,0),(764,'199803202022010866','2023-02-27 07:46:02','2023-02-27',0,13000,5,1500,500000,50000,0,0,0,0,450000,0,500000,0,3,0,33,0,1,0,0,0,0,0,0,0,NULL,2023,8,NULL,0,0,0,0,0,0),(765,'199607072021110864','2023-02-27 07:46:02','2023-02-27',0,13000,5,1500,500000,50000,0,0,0,0,450000,0,500000,0,3,0,33,0,1,0,0,0,0,0,0,0,NULL,2023,8,NULL,0,0,0,0,0,0),(766,'199806152021110865','2023-02-27 07:46:02','2023-02-27',0,13000,5,1500,500000,50000,0,0,0,0,450000,0,500000,0,3,0,33,0,1,0,0,0,0,0,0,0,NULL,2023,8,NULL,0,0,0,0,0,0),(853,'10238','2023-02-27 07:50:26','2023-02-27',0,13000,5,1500,500000,50000,0,0,8250,0,450000,0,500000,0,3,0,36,0,1,2,0,66000,0,0,0,0,NULL,2023,12,NULL,0,0,0,0,0,0),(854,'102323','2023-02-27 07:50:26','2023-02-27',0,13000,5,2500,1050000,50000,0,0,7000,100000,450000,0,1050000,0,3,0,36,0,1,1,2,56000,4,450000,0,2,NULL,2023,12,NULL,0,0,0,0,0,0),(855,'196512051993070226','2023-02-27 07:50:26','2023-02-27',0,13000,5,1500,500000,50000,0,0,0,0,450000,0,500000,0,3,0,36,0,1,0,0,0,0,0,0,0,NULL,2023,12,NULL,0,0,0,0,0,0),(856,'199202222015070546','2023-02-27 07:50:26','2023-02-27',0,13000,5,1500,500000,50000,0,0,0,0,450000,0,500000,0,3,0,36,0,1,0,0,0,0,0,0,0,NULL,2023,12,NULL,0,0,0,0,0,0),(857,'198008252004070404','2023-02-27 07:50:26','2023-02-27',0,13000,5,1500,500000,50000,0,0,0,0,450000,0,500000,0,3,0,36,0,1,0,0,0,0,0,0,0,NULL,2023,12,NULL,0,0,0,0,0,0),(858,'198306292008070448','2023-02-27 07:50:26','2023-02-27',0,13000,5,1500,500000,50000,0,0,0,0,450000,0,500000,0,3,0,36,0,1,0,0,0,0,0,0,0,NULL,2023,12,NULL,0,0,0,0,0,0),(859,'198011212007070433','2023-02-27 07:50:26','2023-02-27',0,13000,5,1500,500000,50000,0,0,0,0,450000,0,500000,0,3,0,36,0,1,0,0,0,0,0,0,0,NULL,2023,12,NULL,0,0,0,0,0,0),(860,'195508061997070291','2023-02-27 07:50:26','2023-02-27',0,13000,5,1500,500000,50000,0,0,0,0,450000,0,500000,0,3,0,36,0,1,0,0,0,0,0,0,0,NULL,2023,12,NULL,0,0,0,0,0,0),(861,'196402131995070258','2023-02-27 07:50:26','2023-02-27',0,13000,5,1500,500000,50000,0,0,0,0,450000,0,500000,0,3,0,36,0,1,0,0,0,0,0,0,0,NULL,2023,12,NULL,0,0,0,0,0,0),(862,'197905112010070338','2023-02-27 07:50:26','2023-02-27',0,13000,5,1500,500000,50000,0,0,0,0,450000,0,500000,0,3,0,36,0,1,0,0,0,0,0,0,0,NULL,2023,12,NULL,0,0,0,0,0,0),(863,'198111252006070423','2023-02-27 07:50:26','2023-02-27',0,13000,5,1500,500000,50000,0,0,0,0,450000,0,500000,0,3,0,36,0,1,0,0,0,0,0,0,0,NULL,2023,12,NULL,0,0,0,0,0,0),(864,'198402172007070436','2023-02-27 07:50:26','2023-02-27',0,13000,5,1500,500000,50000,0,0,0,0,450000,0,500000,0,3,0,36,0,1,0,0,0,0,0,0,0,NULL,2023,12,NULL,0,0,0,0,0,0),(865,'197503091998070251','2023-02-27 07:50:26','2023-02-27',0,13000,5,1500,500000,50000,0,0,0,0,450000,0,500000,0,3,0,36,0,1,0,0,0,0,0,0,0,NULL,2023,12,NULL,0,0,0,0,0,0),(866,'198304102006070420','2023-02-27 07:50:26','2023-02-27',0,13000,5,1500,500000,50000,0,0,0,0,450000,0,500000,0,3,0,36,0,1,0,0,0,0,0,0,0,NULL,2023,12,NULL,0,0,0,0,0,0),(867,'197002261998070248','2023-02-27 07:50:26','2023-02-27',0,13000,5,1500,500000,50000,0,0,0,0,450000,0,500000,0,3,0,36,0,1,0,0,0,0,0,0,0,NULL,2023,12,NULL,0,0,0,0,0,0),(868,'198411252010070486','2023-02-27 07:50:26','2023-02-27',0,13000,5,1500,500000,50000,0,0,0,0,450000,0,500000,0,3,0,36,0,1,0,0,0,0,0,0,0,NULL,2023,12,NULL,0,0,0,0,0,0),(869,'197404241999070326','2023-02-27 07:50:26','2023-02-27',0,13000,5,1500,500000,50000,0,0,0,0,450000,0,500000,0,3,0,36,0,1,0,0,0,0,0,0,0,NULL,2023,12,NULL,0,0,0,0,0,0),(870,'196709081999070325','2023-02-27 07:50:26','2023-02-27',0,13000,5,1500,500000,50000,0,0,0,0,450000,0,500000,0,3,0,36,0,1,0,0,0,0,0,0,0,NULL,2023,12,NULL,0,0,0,0,0,0),(871,'197612261997070286','2023-02-27 07:50:26','2023-02-27',0,13000,5,1500,500000,50000,0,0,0,0,450000,0,500000,0,3,0,36,0,1,0,0,0,0,0,0,0,NULL,2023,12,NULL,0,0,0,0,0,0),(872,'199201062014070526','2023-02-27 07:50:26','2023-02-27',0,13000,5,1500,500000,50000,0,0,0,0,450000,0,500000,0,3,0,36,0,1,0,0,0,0,0,0,0,NULL,2023,12,NULL,0,0,0,0,0,0),(873,'196208291986070105','2023-02-27 07:50:26','2023-02-27',0,13000,5,1500,500000,50000,0,0,0,0,450000,0,500000,0,3,0,36,0,1,0,0,0,0,0,0,0,NULL,2023,12,NULL,0,0,0,0,0,0),(874,'196512271993070227','2023-02-27 07:50:26','2023-02-27',0,13000,5,1500,500000,50000,0,0,0,0,450000,0,500000,0,3,0,36,0,1,0,0,0,0,0,0,0,NULL,2023,12,NULL,0,0,0,0,0,0),(875,'197803282006070271','2023-02-27 07:50:26','2023-02-27',0,13000,5,1500,500000,50000,0,0,0,0,450000,0,500000,0,3,0,36,0,1,0,0,0,0,0,0,0,NULL,2023,12,NULL,0,0,0,0,0,0),(876,'197501302000070339','2023-02-27 07:50:26','2023-02-27',0,13000,5,1500,500000,50000,0,0,0,0,450000,0,500000,0,3,0,36,0,1,0,0,0,0,0,0,0,NULL,2023,12,NULL,0,0,0,0,0,0),(877,'198610132011070497','2023-02-27 07:50:26','2023-02-27',0,13000,5,1500,500000,50000,0,0,0,0,450000,0,500000,0,3,0,36,0,1,0,0,0,0,0,0,0,NULL,2023,12,NULL,0,0,0,0,0,0),(878,'198104162007070343','2023-02-27 07:50:26','2023-02-27',0,13000,5,1500,500000,50000,0,0,0,0,450000,0,500000,0,3,0,36,0,1,0,0,0,0,0,0,0,NULL,2023,12,NULL,0,0,0,0,0,0),(879,'196705282012070509','2023-02-27 07:50:26','2023-02-27',0,13000,5,1500,500000,50000,0,0,0,0,450000,0,500000,0,3,0,36,0,1,0,0,0,0,0,0,0,NULL,2023,12,NULL,0,0,0,0,0,0),(880,'197608042004070398','2023-02-27 07:50:26','2023-02-27',0,13000,5,1500,500000,50000,0,0,0,0,450000,0,500000,0,3,0,36,0,1,0,0,0,0,0,0,0,NULL,2023,12,NULL,0,0,0,0,0,0),(881,'196606072001070132','2023-02-27 07:50:26','2023-02-27',0,13000,5,1500,500000,50000,0,0,0,0,450000,0,500000,0,3,0,36,0,1,0,0,0,0,0,0,0,NULL,2023,12,NULL,0,0,0,0,0,0),(882,'197710262008070465','2023-02-27 07:50:26','2023-02-27',0,13000,5,1500,500000,50000,0,0,0,0,450000,0,500000,0,3,0,36,0,1,0,0,0,0,0,0,0,NULL,2023,12,NULL,0,0,0,0,0,0),(883,'198101232006070421','2023-02-27 07:50:26','2023-02-27',0,13000,5,1500,500000,50000,0,0,0,0,450000,0,500000,0,3,0,36,0,1,0,0,0,0,0,0,0,NULL,2023,12,NULL,0,0,0,0,0,0),(884,'198607102012070507','2023-02-27 07:50:27','2023-02-27',0,13000,5,1500,500000,50000,0,0,0,0,450000,0,500000,0,3,0,36,0,1,0,0,0,0,0,0,0,NULL,2023,12,NULL,0,0,0,0,0,0),(885,'197101091996070265','2023-02-27 07:50:27','2023-02-27',0,13000,5,1500,500000,50000,0,0,0,0,450000,0,500000,0,3,0,36,0,1,0,0,0,0,0,0,0,NULL,2023,12,NULL,0,0,0,0,0,0),(886,'197208221999070316','2023-02-27 07:50:27','2023-02-27',0,13000,5,1500,500000,50000,0,0,0,0,450000,0,500000,0,3,0,36,0,1,0,0,0,0,0,0,0,NULL,2023,12,NULL,0,0,0,0,0,0),(887,'196801071994070195','2023-02-27 07:50:27','2023-02-27',0,13000,5,1500,500000,50000,0,0,0,0,450000,0,500000,0,3,0,36,0,1,0,0,0,0,0,0,0,NULL,2023,12,NULL,0,0,0,0,0,0),(888,'196912161999070314','2023-02-27 07:50:27','2023-02-27',0,13000,5,1500,500000,50000,0,0,0,0,450000,0,500000,0,3,0,36,0,1,0,0,0,0,0,0,0,NULL,2023,12,NULL,0,0,0,0,0,0),(889,'197508291999070317','2023-02-27 07:50:27','2023-02-27',0,13000,5,1500,500000,50000,0,0,0,0,450000,0,500000,0,3,0,36,0,1,0,0,0,0,0,0,0,NULL,2023,12,NULL,0,0,0,0,0,0),(890,'197606202001070361','2023-02-27 07:50:27','2023-02-27',0,13000,5,1500,500000,50000,0,0,0,0,450000,0,500000,0,3,0,36,0,1,0,0,0,0,0,0,0,NULL,2023,12,NULL,0,0,0,0,0,0),(891,'198008292014070532','2023-02-27 07:50:27','2023-02-27',0,13000,5,1500,500000,50000,0,0,0,0,450000,0,500000,0,3,0,36,0,1,0,0,0,0,0,0,0,NULL,2023,12,NULL,0,0,0,0,0,0),(892,'199610182021110863','2023-02-27 07:50:27','2023-02-27',0,13000,5,1500,500000,50000,0,0,0,0,450000,0,500000,0,3,0,36,0,1,0,0,0,0,0,0,0,NULL,2023,12,NULL,0,0,0,0,0,0),(893,'199803202022010866','2023-02-27 07:50:27','2023-02-27',0,13000,5,1500,500000,50000,0,0,0,0,450000,0,500000,0,3,0,36,0,1,0,0,0,0,0,0,0,NULL,2023,12,NULL,0,0,0,0,0,0),(894,'199607072021110864','2023-02-27 07:50:27','2023-02-27',0,13000,5,1500,500000,50000,0,0,0,0,450000,0,500000,0,3,0,36,0,1,0,0,0,0,0,0,0,NULL,2023,12,NULL,0,0,0,0,0,0),(895,'199806152021110865','2023-02-27 07:50:27','2023-02-27',0,13000,5,1500,500000,50000,0,0,0,0,450000,0,500000,0,3,0,36,0,1,0,0,0,0,0,0,0,NULL,2023,12,NULL,0,0,0,0,0,0),(939,'10238','2023-02-28 09:37:22','2023-02-28',0,13000,5,1500,500000,50000,0,0,8250,0,450000,0,500000,0,3,0,38,0,1,2,0,66000,0,0,0,0,NULL,2023,1,NULL,0,0,0,0,0,0),(940,'102323','2023-02-28 09:37:22','2023-02-28',0,13000,5,2500,1050000,50000,0,0,7000,100000,450000,0,1050000,0,3,0,38,0,1,1,2,56000,4,450000,0,2,NULL,2023,1,NULL,0,0,0,0,0,0),(941,'196512051993070226','2023-02-28 09:37:22','2023-02-28',0,13000,5,1500,500000,50000,0,0,0,0,450000,0,500000,0,3,0,38,0,1,0,0,0,0,0,0,0,NULL,2023,1,NULL,0,0,0,0,0,0),(942,'199202222015070546','2023-02-28 09:37:22','2023-02-28',0,13000,5,1500,500000,50000,0,0,0,0,450000,0,500000,0,3,0,38,0,1,0,0,0,0,0,0,0,NULL,2023,1,NULL,0,0,0,0,0,0),(943,'198008252004070404','2023-02-28 09:37:22','2023-02-28',0,13000,5,1500,500000,50000,0,0,0,0,450000,0,500000,0,3,0,38,0,1,0,0,0,0,0,0,0,NULL,2023,1,NULL,0,0,0,0,0,0),(944,'198306292008070448','2023-02-28 09:37:22','2023-02-28',0,13000,5,1500,500000,50000,0,0,0,0,450000,0,500000,0,3,0,38,0,1,0,0,0,0,0,0,0,NULL,2023,1,NULL,0,0,0,0,0,0),(945,'198011212007070433','2023-02-28 09:37:22','2023-02-28',0,13000,5,1500,500000,50000,0,0,0,0,450000,0,500000,0,3,0,38,0,1,0,0,0,0,0,0,0,NULL,2023,1,NULL,0,0,0,0,0,0),(946,'195508061997070291','2023-02-28 09:37:22','2023-02-28',0,13000,5,1500,500000,50000,0,0,0,0,450000,0,500000,0,3,0,38,0,1,0,0,0,0,0,0,0,NULL,2023,1,NULL,0,0,0,0,0,0),(947,'196402131995070258','2023-02-28 09:37:22','2023-02-28',0,13000,5,1500,500000,50000,0,0,0,0,450000,0,500000,0,3,0,38,0,1,0,0,0,0,0,0,0,NULL,2023,1,NULL,0,0,0,0,0,0),(948,'197905112010070338','2023-02-28 09:37:22','2023-02-28',0,13000,5,1500,500000,50000,0,0,0,0,450000,0,500000,0,3,0,38,0,1,0,0,0,0,0,0,0,NULL,2023,1,NULL,0,0,0,0,0,0),(949,'198111252006070423','2023-02-28 09:37:22','2023-02-28',0,13000,5,1500,500000,50000,0,0,0,0,450000,0,500000,0,3,0,38,0,1,0,0,0,0,0,0,0,NULL,2023,1,NULL,0,0,0,0,0,0),(950,'198402172007070436','2023-02-28 09:37:22','2023-02-28',0,13000,5,1500,500000,50000,0,0,0,0,450000,0,500000,0,3,0,38,0,1,0,0,0,0,0,0,0,NULL,2023,1,NULL,0,0,0,0,0,0),(951,'197503091998070251','2023-02-28 09:37:22','2023-02-28',0,13000,5,1500,500000,50000,0,0,0,0,450000,0,500000,0,3,0,38,0,1,0,0,0,0,0,0,0,NULL,2023,1,NULL,0,0,0,0,0,0),(952,'198304102006070420','2023-02-28 09:37:22','2023-02-28',0,13000,5,1500,500000,50000,0,0,0,0,450000,0,500000,0,3,0,38,0,1,0,0,0,0,0,0,0,NULL,2023,1,NULL,0,0,0,0,0,0),(953,'197002261998070248','2023-02-28 09:37:22','2023-02-28',0,13000,5,1500,500000,50000,0,0,0,0,450000,0,500000,0,3,0,38,0,1,0,0,0,0,0,0,0,NULL,2023,1,NULL,0,0,0,0,0,0),(954,'198411252010070486','2023-02-28 09:37:22','2023-02-28',0,13000,5,1500,500000,50000,0,0,0,0,450000,0,500000,0,3,0,38,0,1,0,0,0,0,0,0,0,NULL,2023,1,NULL,0,0,0,0,0,0),(955,'197404241999070326','2023-02-28 09:37:22','2023-02-28',0,13000,5,1500,500000,50000,0,0,0,0,450000,0,500000,0,3,0,38,0,1,0,0,0,0,0,0,0,NULL,2023,1,NULL,0,0,0,0,0,0),(956,'196709081999070325','2023-02-28 09:37:22','2023-02-28',0,13000,5,1500,500000,50000,0,0,0,0,450000,0,500000,0,3,0,38,0,1,0,0,0,0,0,0,0,NULL,2023,1,NULL,0,0,0,0,0,0),(957,'197612261997070286','2023-02-28 09:37:22','2023-02-28',0,13000,5,1500,500000,50000,0,0,0,0,450000,0,500000,0,3,0,38,0,1,0,0,0,0,0,0,0,NULL,2023,1,NULL,0,0,0,0,0,0),(958,'199201062014070526','2023-02-28 09:37:22','2023-02-28',0,13000,5,1500,500000,50000,0,0,0,0,450000,0,500000,0,3,0,38,0,1,0,0,0,0,0,0,0,NULL,2023,1,NULL,0,0,0,0,0,0),(959,'196208291986070105','2023-02-28 09:37:22','2023-02-28',0,13000,5,1500,500000,50000,0,0,0,0,450000,0,500000,0,3,0,38,0,1,0,0,0,0,0,0,0,NULL,2023,1,NULL,0,0,0,0,0,0),(960,'196512271993070227','2023-02-28 09:37:22','2023-02-28',0,13000,5,1500,500000,50000,0,0,0,0,450000,0,500000,0,3,0,38,0,1,0,0,0,0,0,0,0,NULL,2023,1,NULL,0,0,0,0,0,0),(961,'197803282006070271','2023-02-28 09:37:22','2023-02-28',0,13000,5,1500,500000,50000,0,0,0,0,450000,0,500000,0,3,0,38,0,1,0,0,0,0,0,0,0,NULL,2023,1,NULL,0,0,0,0,0,0),(962,'197501302000070339','2023-02-28 09:37:22','2023-02-28',0,13000,5,1500,500000,50000,0,0,0,0,450000,0,500000,0,3,0,38,0,1,0,0,0,0,0,0,0,NULL,2023,1,NULL,0,0,0,0,0,0),(963,'198610132011070497','2023-02-28 09:37:22','2023-02-28',0,13000,5,1500,500000,50000,0,0,0,0,450000,0,500000,0,3,0,38,0,1,0,0,0,0,0,0,0,NULL,2023,1,NULL,0,0,0,0,0,0),(964,'198104162007070343','2023-02-28 09:37:22','2023-02-28',0,13000,5,1500,500000,50000,0,0,0,0,450000,0,500000,0,3,0,38,0,1,0,0,0,0,0,0,0,NULL,2023,1,NULL,0,0,0,0,0,0),(965,'196705282012070509','2023-02-28 09:37:23','2023-02-28',0,13000,5,1500,500000,50000,0,0,0,0,450000,0,500000,0,3,0,38,0,1,0,0,0,0,0,0,0,NULL,2023,1,NULL,0,0,0,0,0,0),(966,'197608042004070398','2023-02-28 09:37:23','2023-02-28',0,13000,5,1500,500000,50000,0,0,0,0,450000,0,500000,0,3,0,38,0,1,0,0,0,0,0,0,0,NULL,2023,1,NULL,0,0,0,0,0,0),(967,'196606072001070132','2023-02-28 09:37:23','2023-02-28',0,13000,5,1500,500000,50000,0,0,0,0,450000,0,500000,0,3,0,38,0,1,0,0,0,0,0,0,0,NULL,2023,1,NULL,0,0,0,0,0,0),(968,'197710262008070465','2023-02-28 09:37:23','2023-02-28',0,13000,5,1500,500000,50000,0,0,0,0,450000,0,500000,0,3,0,38,0,1,0,0,0,0,0,0,0,NULL,2023,1,NULL,0,0,0,0,0,0),(969,'198101232006070421','2023-02-28 09:37:23','2023-02-28',0,13000,5,1500,500000,50000,0,0,0,0,450000,0,500000,0,3,0,38,0,1,0,0,0,0,0,0,0,NULL,2023,1,NULL,0,0,0,0,0,0),(970,'198607102012070507','2023-02-28 09:37:23','2023-02-28',0,13000,5,1500,500000,50000,0,0,0,0,450000,0,500000,0,3,0,38,0,1,0,0,0,0,0,0,0,NULL,2023,1,NULL,0,0,0,0,0,0),(971,'197101091996070265','2023-02-28 09:37:23','2023-02-28',0,13000,5,1500,500000,50000,0,0,0,0,450000,0,500000,0,3,0,38,0,1,0,0,0,0,0,0,0,NULL,2023,1,NULL,0,0,0,0,0,0),(972,'197208221999070316','2023-02-28 09:37:23','2023-02-28',0,13000,5,1500,500000,50000,0,0,0,0,450000,0,500000,0,3,0,38,0,1,0,0,0,0,0,0,0,NULL,2023,1,NULL,0,0,0,0,0,0),(973,'196801071994070195','2023-02-28 09:37:23','2023-02-28',0,13000,5,1500,500000,50000,0,0,0,0,450000,0,500000,0,3,0,38,0,1,0,0,0,0,0,0,0,NULL,2023,1,NULL,0,0,0,0,0,0),(974,'196912161999070314','2023-02-28 09:37:23','2023-02-28',0,13000,5,1500,500000,50000,0,0,0,0,450000,0,500000,0,3,0,38,0,1,0,0,0,0,0,0,0,NULL,2023,1,NULL,0,0,0,0,0,0),(975,'197508291999070317','2023-02-28 09:37:23','2023-02-28',0,13000,5,1500,500000,50000,0,0,0,0,450000,0,500000,0,3,0,38,0,1,0,0,0,0,0,0,0,NULL,2023,1,NULL,0,0,0,0,0,0),(976,'197606202001070361','2023-02-28 09:37:23','2023-02-28',0,13000,5,1500,500000,50000,0,0,0,0,450000,0,500000,0,3,0,38,0,1,0,0,0,0,0,0,0,NULL,2023,1,NULL,0,0,0,0,0,0),(977,'198008292014070532','2023-02-28 09:37:23','2023-02-28',0,13000,5,1500,500000,50000,0,0,0,0,450000,0,500000,0,3,0,38,0,1,0,0,0,0,0,0,0,NULL,2023,1,NULL,0,0,0,0,0,0),(978,'199610182021110863','2023-02-28 09:37:23','2023-02-28',0,13000,5,1500,500000,50000,0,0,0,0,450000,0,500000,0,3,0,38,0,1,0,0,0,0,0,0,0,NULL,2023,1,NULL,0,0,0,0,0,0),(979,'199803202022010866','2023-02-28 09:37:23','2023-02-28',0,13000,5,1500,500000,50000,0,0,0,0,450000,0,500000,0,3,0,38,0,1,0,0,0,0,0,0,0,NULL,2023,1,NULL,0,0,0,0,0,0),(980,'199607072021110864','2023-02-28 09:37:23','2023-02-28',0,13000,5,1500,500000,50000,0,0,0,0,450000,0,500000,0,3,0,38,0,1,0,0,0,0,0,0,0,NULL,2023,1,NULL,0,0,0,0,0,0),(981,'199806152021110865','2023-02-28 09:37:23','2023-02-28',0,13000,5,1500,500000,50000,0,0,0,0,450000,0,500000,0,3,0,38,0,1,0,0,0,0,0,0,0,NULL,2023,1,NULL,0,0,0,0,0,0);
/*!40000 ALTER TABLE `gaji_smp` ENABLE KEYS */;
UNLOCK TABLES;
DROP TABLE IF EXISTS `gaji_tk`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `gaji_tk` (
  `id` int NOT NULL AUTO_INCREMENT,
  `pegawai` varchar(50) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci DEFAULT NULL,
  `datetime` datetime DEFAULT NULL,
  `month` date DEFAULT NULL,
  `lembur` int DEFAULT NULL,
  `value_lembur` bigint DEFAULT NULL,
  `jabatan_id` int DEFAULT NULL,
  `gapok` bigint DEFAULT NULL,
  `total` bigint DEFAULT NULL,
  `value_reward` bigint DEFAULT NULL,
  `value_inval` bigint DEFAULT NULL,
  `piket_count` int DEFAULT NULL,
  `value_piket` bigint DEFAULT NULL,
  `tugastambahan` bigint DEFAULT NULL,
  `tj_jabatan` bigint DEFAULT NULL,
  `kehadiran` int DEFAULT NULL,
  `sub_total` bigint DEFAULT NULL,
  `potongan` bigint DEFAULT NULL,
  `jenjang_id` int DEFAULT NULL,
  `penyesuaian` bigint DEFAULT NULL,
  `pid` int DEFAULT NULL,
  `jp` int DEFAULT NULL,
  `type` int DEFAULT NULL,
  `jenis_guru` int DEFAULT NULL,
  `tambahan` int DEFAULT NULL,
  `value_kehadiran` bigint DEFAULT NULL,
  `periode` int DEFAULT NULL,
  `tunjangan_periode` bigint DEFAULT NULL,
  `total_gapok` bigint DEFAULT NULL,
  `lama_kerja` int DEFAULT NULL,
  `status` int DEFAULT NULL,
  `bulan` int DEFAULT NULL,
  `tahun` int DEFAULT NULL,
  `potongan_bendahara` bigint DEFAULT NULL,
  `voucher` bigint DEFAULT NULL,
  `jaminan_pensiun` bigint DEFAULT NULL,
  `jaminan_hari_tua` bigint DEFAULT NULL,
  `total_pph21` bigint DEFAULT NULL,
  `bpjs_kesehatan` bigint DEFAULT NULL,
  `status_npwp` int DEFAULT NULL,
  PRIMARY KEY (`id`) USING BTREE
) ENGINE=InnoDB AUTO_INCREMENT=252 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci ROW_FORMAT=DYNAMIC;
/*!40101 SET character_set_client = @saved_cs_client */;

LOCK TABLES `gaji_tk` WRITE;
/*!40000 ALTER TABLE `gaji_tk` DISABLE KEYS */;
INSERT INTO `gaji_tk` VALUES (251,'10230200427','2023-02-27 08:25:29','2023-02-27',0,13000,5,2500,3876400,50000,0,0,7000,125000,450000,48,3883000,6600,1,0,90,48,1,1,2,56000,4,450000,120000,2,NULL,7,2023,NULL,0,1200,2400,3000,1,0);
/*!40000 ALTER TABLE `gaji_tk` ENABLE KEYS */;
UNLOCK TABLES;
DROP TABLE IF EXISTS `gaji_tu_sd`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `gaji_tu_sd` (
  `id` int NOT NULL AUTO_INCREMENT,
  `datetime` datetime DEFAULT NULL,
  `pegawai` varchar(50) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci DEFAULT NULL,
  `jenjang_id` int DEFAULT NULL,
  `jabatan_id` int DEFAULT NULL,
  `month` date DEFAULT NULL,
  `gapok` bigint DEFAULT NULL,
  `kehadiran` int DEFAULT NULL,
  `lembur` int DEFAULT NULL,
  `value_lembur` bigint DEFAULT NULL,
  `value_reward` bigint DEFAULT NULL,
  `value_inval` bigint DEFAULT NULL,
  `piket_count` int DEFAULT NULL,
  `value_piket` bigint DEFAULT NULL,
  `tugastambahan` bigint DEFAULT NULL,
  `tj_jabatan` bigint DEFAULT NULL,
  `potongan` bigint DEFAULT NULL,
  `sub_total` bigint DEFAULT NULL,
  `penyesuaian` bigint DEFAULT NULL,
  `total` bigint DEFAULT NULL,
  `pid` int DEFAULT NULL,
  `tunjangan2` bigint DEFAULT NULL,
  `tambahan` int DEFAULT NULL,
  `type_jabatan` int DEFAULT NULL,
  `ijasah` int DEFAULT NULL,
  `lama_kerja` int DEFAULT NULL,
  `sertif` int DEFAULT NULL,
  `value_kehadiran` bigint DEFAULT NULL,
  `tahun` int DEFAULT NULL,
  `bulan` int DEFAULT NULL,
  `voucher` bigint DEFAULT NULL,
  `status` int DEFAULT NULL,
  `potongan_bendahara` bigint DEFAULT NULL,
  `jaminan_pensiun` bigint DEFAULT NULL,
  `jaminan_hari_tua` bigint DEFAULT NULL,
  `total_pph21` bigint DEFAULT NULL,
  `bpjs_kesehatan` bigint DEFAULT NULL,
  `status_npwp` int DEFAULT NULL,
  PRIMARY KEY (`id`) USING BTREE
) ENGINE=InnoDB AUTO_INCREMENT=142 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci ROW_FORMAT=DYNAMIC;
/*!40101 SET character_set_client = @saved_cs_client */;

LOCK TABLES `gaji_tu_sd` WRITE;
/*!40000 ALTER TABLE `gaji_tu_sd` DISABLE KEYS */;
INSERT INTO `gaji_tu_sd` VALUES (84,NULL,'102327124',2,6,NULL,0,0,0,13000,50000,0,0,8250,0,0,0,50000,0,50000,21,0,0,2,0,2,0,54000,2023,11,0,NULL,NULL,NULL,NULL,NULL,NULL,NULL),(86,NULL,'102327125',2,6,NULL,0,0,0,13000,50000,0,0,8250,0,0,0,50000,0,50000,24,0,0,2,0,2,0,54000,2023,7,0,NULL,NULL,0,0,0,0,0),(89,NULL,'102327126',2,6,NULL,0,0,0,13000,50000,0,0,8250,0,0,0,50000,0,50000,26,0,0,2,0,2,0,54000,2023,12,0,NULL,NULL,0,0,0,0,0),(90,NULL,'102374321',2,6,NULL,0,0,0,13000,50000,0,0,8250,100000,0,0,150000,0,150000,26,0,2,2,0,2,2,54000,2023,12,0,NULL,NULL,0,0,0,0,0),(91,NULL,'10232712',2,6,NULL,0,0,0,13000,50000,0,0,8250,0,0,0,50000,0,50000,27,0,0,2,0,2,0,54000,2023,8,0,NULL,NULL,0,0,0,0,0),(92,NULL,'10237432123',2,6,NULL,80000,0,0,13000,50000,0,0,8250,100000,0,4400,230000,0,225600,27,0,2,2,8,2,2,54000,2023,8,0,NULL,NULL,800,1600,2000,0,1),(93,NULL,'10232712',2,6,NULL,0,0,0,13000,50000,0,0,8250,0,0,0,50000,0,50000,28,0,0,2,0,2,0,54000,2023,6,0,NULL,NULL,0,0,0,0,0),(94,NULL,'10237432123',2,6,NULL,80000,0,0,13000,50000,0,0,8250,100000,0,4400,230000,0,225600,28,0,2,2,8,2,2,54000,2023,6,0,NULL,NULL,800,1600,2000,0,1),(135,NULL,'',2,0,NULL,0,0,0,13000,50000,0,0,8250,0,0,0,50000,0,50000,39,0,0,2,0,0,0,54000,2023,1,0,NULL,NULL,0,0,0,0,0),(136,NULL,'',2,0,NULL,0,0,0,13000,50000,0,0,8250,0,0,0,50000,0,50000,39,0,0,2,0,0,0,54000,2023,1,0,NULL,NULL,0,0,0,0,0),(137,NULL,'',2,0,NULL,0,0,0,13000,50000,0,0,8250,0,0,0,50000,0,50000,39,0,0,2,0,0,0,54000,2023,1,0,NULL,NULL,0,0,0,0,0),(138,NULL,'',2,0,NULL,0,0,0,13000,50000,0,0,8250,0,0,0,50000,0,50000,39,0,0,2,0,0,0,54000,2023,1,0,NULL,NULL,0,0,0,0,0),(139,NULL,'',2,0,NULL,0,0,0,13000,50000,0,0,8250,0,0,0,50000,0,50000,39,0,0,2,0,0,0,54000,2023,1,0,NULL,NULL,0,0,0,0,0),(140,NULL,'10232712',2,6,NULL,0,0,0,13000,50000,0,0,8250,0,0,0,50000,0,50000,39,0,0,2,0,2,0,54000,2023,1,0,NULL,NULL,0,0,0,0,0),(141,NULL,'10237432123',2,6,NULL,80000,0,0,13000,50000,0,0,8250,100000,0,4400,230000,0,225600,39,0,2,2,8,2,2,54000,2023,1,0,NULL,NULL,800,1600,2000,0,1);
/*!40000 ALTER TABLE `gaji_tu_sd` ENABLE KEYS */;
UNLOCK TABLES;
DROP TABLE IF EXISTS `gaji_tu_sma`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `gaji_tu_sma` (
  `id` int NOT NULL AUTO_INCREMENT,
  `datetime` datetime DEFAULT NULL,
  `pegawai` varchar(50) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci DEFAULT NULL,
  `jenjang_id` int DEFAULT NULL,
  `jabatan_id` int DEFAULT NULL,
  `month` date DEFAULT NULL,
  `gapok` bigint DEFAULT NULL,
  `kehadiran` int DEFAULT NULL,
  `lembur` int DEFAULT NULL,
  `value_lembur` bigint DEFAULT NULL,
  `value_reward` bigint DEFAULT NULL,
  `value_inval` bigint DEFAULT NULL,
  `piket_count` int DEFAULT NULL,
  `value_piket` bigint DEFAULT NULL,
  `tugastambahan` bigint DEFAULT NULL,
  `tj_jabatan` bigint DEFAULT NULL,
  `potongan` bigint DEFAULT NULL,
  `sub_total` bigint DEFAULT NULL,
  `penyesuaian` bigint DEFAULT NULL,
  `total` bigint DEFAULT NULL,
  `pid` int DEFAULT NULL,
  `tunjangan2` bigint DEFAULT NULL,
  `tambahan` int DEFAULT NULL,
  `type_jabatan` int DEFAULT NULL,
  `ijasah` int DEFAULT NULL,
  `lama_kerja` int DEFAULT NULL,
  `sertif` int DEFAULT NULL,
  `value_kehadiran` bigint DEFAULT NULL,
  `tahun` int DEFAULT NULL,
  `bulan` int DEFAULT NULL,
  `voucher` bigint DEFAULT NULL,
  `status` int DEFAULT NULL,
  `potongan_bendahara` bigint DEFAULT NULL,
  `jaminan_pensiun` bigint DEFAULT NULL,
  `jaminan_hari_tua` bigint DEFAULT NULL,
  `total_pph21` bigint DEFAULT NULL,
  `bpjs_kesehatan` bigint DEFAULT NULL,
  PRIMARY KEY (`id`) USING BTREE
) ENGINE=InnoDB AUTO_INCREMENT=418 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci ROW_FORMAT=DYNAMIC;
/*!40101 SET character_set_client = @saved_cs_client */;

LOCK TABLES `gaji_tu_sma` WRITE;
/*!40000 ALTER TABLE `gaji_tu_sma` DISABLE KEYS */;
INSERT INTO `gaji_tu_sma` VALUES (392,NULL,'102390',4,6,NULL,92500,26,0,13000,50000,0,0,8250,100000,70000,5550,1786500,0,1780950,276,70000,3,2,8,3,2,54000,2023,7,0,NULL,NULL,925,1850,2775,0),(393,NULL,'102310',4,6,NULL,0,0,0,13000,50000,0,0,8250,0,70000,0,190000,0,190000,276,70000,0,2,0,0,2,54000,2023,7,0,NULL,NULL,0,0,0,0),(394,NULL,'3578102612761114',4,5,NULL,0,0,0,13000,50000,0,0,8250,0,450000,0,570000,0,570000,276,70000,0,2,0,0,0,54000,2023,7,0,NULL,NULL,0,0,0,0),(408,NULL,'',4,0,NULL,0,0,0,13000,50000,0,0,8250,0,0,0,120000,0,120000,286,70000,0,2,0,0,0,54000,2023,6,0,NULL,NULL,0,0,0,0),(409,NULL,'3578102612761114',4,0,NULL,0,0,0,13000,50000,0,0,8250,0,0,0,120000,0,120000,286,70000,0,2,0,0,0,54000,2023,6,0,NULL,NULL,0,0,0,0),(410,NULL,'',4,0,NULL,0,0,0,13000,50000,0,0,8250,0,0,0,120000,0,120000,287,70000,0,2,0,0,0,54000,2023,8,0,NULL,NULL,0,0,0,0),(411,NULL,'3578102612761114',4,0,NULL,0,0,0,13000,50000,0,0,8250,0,0,0,120000,0,120000,287,70000,0,2,0,0,0,54000,2023,8,0,NULL,NULL,0,0,0,0),(412,NULL,'',4,0,NULL,0,0,0,13000,50000,0,0,8250,0,0,20000,120000,39000,139000,288,70000,0,2,0,0,0,54000,2024,1,100000,NULL,NULL,0,0,0,0),(413,NULL,'3578102612761114',4,0,NULL,0,0,0,13000,50000,0,0,8250,0,0,0,120000,0,120000,288,70000,0,2,0,0,0,54000,2024,1,0,NULL,NULL,0,0,0,0),(414,NULL,'',4,0,NULL,0,0,0,13000,50000,0,0,8250,0,0,0,120000,0,120000,289,70000,0,2,0,0,0,54000,2024,2,0,NULL,NULL,0,0,0,0),(415,NULL,'3578102612761114',4,0,NULL,0,0,0,13000,50000,0,0,8250,0,0,0,120000,0,120000,289,70000,0,2,0,0,0,54000,2024,2,0,NULL,NULL,0,0,0,0),(416,NULL,'',4,0,NULL,0,0,0,13000,50000,0,0,8250,0,0,0,120000,0,120000,290,70000,0,2,0,0,0,54000,2023,1,0,NULL,NULL,0,0,0,0),(417,NULL,'3578102612761114',4,0,NULL,0,0,0,13000,50000,0,0,8250,0,0,0,120000,0,120000,290,70000,0,2,0,0,0,54000,2023,1,0,NULL,NULL,0,0,0,0);
/*!40000 ALTER TABLE `gaji_tu_sma` ENABLE KEYS */;
UNLOCK TABLES;
DROP TABLE IF EXISTS `gaji_tu_smk`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `gaji_tu_smk` (
  `id` int NOT NULL AUTO_INCREMENT,
  `datetime` datetime DEFAULT NULL,
  `pegawai` varchar(50) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci DEFAULT NULL,
  `jenjang_id` int DEFAULT NULL,
  `jabatan_id` int DEFAULT NULL,
  `month` date DEFAULT NULL,
  `gapok` bigint DEFAULT NULL,
  `kehadiran` int DEFAULT NULL,
  `lembur` int DEFAULT NULL,
  `value_lembur` bigint DEFAULT NULL,
  `value_reward` bigint DEFAULT NULL,
  `value_inval` bigint DEFAULT NULL,
  `piket_count` int DEFAULT NULL,
  `value_piket` bigint DEFAULT NULL,
  `tugastambahan` bigint DEFAULT NULL,
  `tj_jabatan` bigint DEFAULT NULL,
  `potongan` bigint DEFAULT NULL,
  `sub_total` bigint DEFAULT NULL,
  `penyesuaian` bigint DEFAULT NULL,
  `total` bigint DEFAULT NULL,
  `pid` int DEFAULT NULL,
  `ijasah` int DEFAULT NULL,
  `tunjangan2` bigint DEFAULT NULL,
  `tambahan` int DEFAULT NULL,
  `type_jabatan` int DEFAULT NULL,
  `lama_kerja` int DEFAULT NULL,
  `sertif` int DEFAULT NULL,
  `value_kehadiran` int DEFAULT NULL,
  `tahun` int DEFAULT NULL,
  `bulan` int DEFAULT NULL,
  `voucher` bigint DEFAULT NULL,
  `status` int DEFAULT NULL,
  `potongan_bendahara` bigint DEFAULT NULL,
  `jaminan_pensiun` bigint DEFAULT NULL,
  `jaminan_hari_tua` bigint DEFAULT NULL,
  `total_pph21` bigint DEFAULT NULL,
  `bpjs_kesehatan` bigint DEFAULT NULL,
  `status_npwp` int DEFAULT NULL,
  PRIMARY KEY (`id`) USING BTREE
) ENGINE=InnoDB AUTO_INCREMENT=96 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci ROW_FORMAT=DYNAMIC;
/*!40101 SET character_set_client = @saved_cs_client */;

LOCK TABLES `gaji_tu_smk` WRITE;
/*!40000 ALTER TABLE `gaji_tu_smk` DISABLE KEYS */;
INSERT INTO `gaji_tu_smk` VALUES (81,NULL,'1023231',5,6,NULL,0,0,0,13000,50000,0,0,8250,100000,0,0,220000,0,220000,25,0,70000,2,2,2,1,54000,2023,11,0,NULL,NULL,NULL,NULL,NULL,NULL,NULL),(82,NULL,'1023231',5,6,NULL,0,0,0,13000,50000,0,0,8250,100000,0,0,220000,0,220000,30,0,70000,2,2,2,1,54000,2023,7,0,NULL,NULL,0,0,0,0,0),(90,NULL,'1023231',5,6,NULL,0,0,0,13000,50000,0,0,8250,100000,0,0,220000,0,220000,38,0,70000,2,2,2,1,54000,2023,6,0,NULL,NULL,0,0,0,0,0),(93,NULL,'1023231',5,6,NULL,0,0,0,13000,50000,0,0,8250,100000,0,0,220000,0,220000,43,0,70000,2,2,2,1,54000,2023,12,0,NULL,NULL,0,0,0,0,0),(95,NULL,'1023231',5,6,NULL,0,0,0,13000,50000,0,0,8250,100000,0,0,220000,0,220000,45,0,70000,2,2,2,1,54000,2023,1,0,NULL,NULL,0,0,0,0,0);
/*!40000 ALTER TABLE `gaji_tu_smk` ENABLE KEYS */;
UNLOCK TABLES;
DROP TABLE IF EXISTS `gaji_tu_smp`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `gaji_tu_smp` (
  `id` int NOT NULL AUTO_INCREMENT,
  `datetime` datetime DEFAULT NULL,
  `pegawai` varchar(50) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci DEFAULT NULL,
  `jenjang_id` int DEFAULT NULL,
  `jabatan_id` int DEFAULT NULL,
  `month` date DEFAULT NULL,
  `gapok` bigint DEFAULT NULL,
  `kehadiran` int DEFAULT NULL,
  `lembur` int DEFAULT NULL,
  `value_lembur` bigint DEFAULT NULL,
  `value_reward` bigint DEFAULT NULL,
  `value_inval` bigint DEFAULT NULL,
  `piket_count` int DEFAULT NULL,
  `value_piket` bigint DEFAULT NULL,
  `tugastambahan` bigint DEFAULT NULL,
  `tj_jabatan` bigint DEFAULT NULL,
  `potongan` bigint DEFAULT NULL,
  `sub_total` bigint DEFAULT NULL,
  `penyesuaian` bigint DEFAULT NULL,
  `total` bigint DEFAULT NULL,
  `pid` int DEFAULT NULL,
  `tunjangan2` bigint DEFAULT NULL,
  `tambahan` int DEFAULT NULL,
  `type_jabatan` int DEFAULT NULL,
  `ijasah` int DEFAULT NULL,
  `lama_kerja` int DEFAULT NULL,
  `sertif` int DEFAULT NULL,
  `value_kehadiran` bigint DEFAULT NULL,
  `tahun` int DEFAULT NULL,
  `bulan` int DEFAULT NULL,
  `voucher` bigint DEFAULT NULL,
  `status` int DEFAULT NULL,
  `potongan_bendahara` bigint DEFAULT NULL,
  `jaminan_pensiun` bigint DEFAULT NULL,
  `jaminan_hari_tua` bigint DEFAULT NULL,
  `total_pph21` bigint DEFAULT NULL,
  `bpjs_kesehatan` bigint DEFAULT NULL,
  `status_npwp` int DEFAULT NULL,
  PRIMARY KEY (`id`) USING BTREE
) ENGINE=InnoDB AUTO_INCREMENT=92 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci ROW_FORMAT=DYNAMIC;
/*!40101 SET character_set_client = @saved_cs_client */;

LOCK TABLES `gaji_tu_smp` WRITE;
/*!40000 ALTER TABLE `gaji_tu_smp` DISABLE KEYS */;
INSERT INTO `gaji_tu_smp` VALUES (83,NULL,'1023232',3,6,NULL,0,0,0,13000,50000,0,0,8250,100000,70000,0,220000,0,220000,17,0,2,2,0,2,1,54000,2023,11,0,NULL,NULL,NULL,NULL,NULL,NULL,NULL),(86,NULL,'1023232',3,6,NULL,0,0,0,13000,50000,0,0,8250,100000,70000,0,220000,0,220000,26,0,2,2,0,2,1,54000,2023,8,0,NULL,NULL,0,0,0,0,0),(89,NULL,'1023232',3,6,NULL,0,0,0,13000,50000,0,0,8250,100000,70000,0,220000,0,220000,29,0,2,2,0,2,1,54000,2023,12,0,NULL,NULL,0,0,0,0,0),(91,NULL,'1023232',3,6,NULL,0,0,0,13000,50000,0,0,8250,100000,70000,0,220000,0,220000,31,0,2,2,0,2,1,54000,2023,1,0,NULL,NULL,0,0,0,0,0);
/*!40000 ALTER TABLE `gaji_tu_smp` ENABLE KEYS */;
UNLOCK TABLES;
DROP TABLE IF EXISTS `gaji_tu_tk`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `gaji_tu_tk` (
  `id` int NOT NULL AUTO_INCREMENT,
  `datetime` datetime DEFAULT NULL,
  `pegawai` varchar(50) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci DEFAULT NULL,
  `jenjang_id` int DEFAULT NULL,
  `jabatan_id` int DEFAULT NULL,
  `month` date DEFAULT NULL,
  `gapok` bigint DEFAULT NULL,
  `kehadiran` int DEFAULT NULL,
  `lembur` int DEFAULT NULL,
  `value_lembur` bigint DEFAULT NULL,
  `value_reward` bigint DEFAULT NULL,
  `value_inval` bigint DEFAULT NULL,
  `piket_count` int DEFAULT NULL,
  `value_piket` bigint DEFAULT NULL,
  `tugastambahan` bigint DEFAULT NULL,
  `tj_jabatan` bigint DEFAULT NULL,
  `potongan` bigint DEFAULT NULL,
  `sub_total` bigint DEFAULT NULL,
  `penyesuaian` bigint DEFAULT NULL,
  `total` bigint DEFAULT NULL,
  `pid` int DEFAULT NULL,
  `tunjangan2` bigint DEFAULT NULL,
  `tambahan` int DEFAULT NULL,
  `type_jabatan` int DEFAULT NULL,
  `ijasah` int DEFAULT NULL,
  `lama_kerja` int DEFAULT NULL,
  `sertif` int DEFAULT NULL,
  `value_kehadiran` bigint DEFAULT NULL,
  `tahun` int DEFAULT NULL,
  `bulan` int DEFAULT NULL,
  `voucher` bigint DEFAULT NULL,
  `status` int DEFAULT NULL,
  `potongan_bendahara` bigint DEFAULT NULL,
  `jaminan_pensiun` bigint DEFAULT NULL,
  `jaminan_hari_tua` bigint DEFAULT NULL,
  `total_pph21` bigint DEFAULT NULL,
  `bpjs_kesehatan` bigint DEFAULT NULL,
  `status_npwp` int DEFAULT NULL,
  PRIMARY KEY (`id`) USING BTREE
) ENGINE=InnoDB AUTO_INCREMENT=151 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci ROW_FORMAT=DYNAMIC;
/*!40101 SET character_set_client = @saved_cs_client */;

LOCK TABLES `gaji_tu_tk` WRITE;
/*!40000 ALTER TABLE `gaji_tu_tk` DISABLE KEYS */;
INSERT INTO `gaji_tu_tk` VALUES (149,NULL,'10239',1,7,NULL,105000,26,0,13000,50000,0,0,8250,0,150000,6300,1709000,0,1702700,53,0,0,2,8,6,2,54000,2023,7,0,NULL,NULL,1050,2100,3150,0,0),(150,NULL,'10239',1,7,NULL,105000,26,0,13000,50000,0,0,8250,0,150000,6300,1709000,0,1702700,54,0,0,2,8,6,2,54000,2023,1,0,NULL,NULL,1050,2100,3150,0,0);
/*!40000 ALTER TABLE `gaji_tu_tk` ENABLE KEYS */;
UNLOCK TABLES;
DROP TABLE IF EXISTS `gajisd`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `gajisd` (
  `id` int NOT NULL AUTO_INCREMENT,
  `tahun` smallint DEFAULT NULL,
  `bulan` int DEFAULT NULL,
  `datetime` datetime DEFAULT NULL,
  `createby` int DEFAULT NULL,
  PRIMARY KEY (`id`) USING BTREE
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci ROW_FORMAT=DYNAMIC;
/*!40101 SET character_set_client = @saved_cs_client */;

LOCK TABLES `gajisd` WRITE;
/*!40000 ALTER TABLE `gajisd` DISABLE KEYS */;
INSERT INTO `gajisd` VALUES (1,2,2,NULL,NULL);
/*!40000 ALTER TABLE `gajisd` ENABLE KEYS */;
UNLOCK TABLES;
DROP TABLE IF EXISTS `gajisd_detil`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `gajisd_detil` (
  `id` int NOT NULL AUTO_INCREMENT,
  `pid` int DEFAULT NULL,
  `pegawai_id` varchar(50) DEFAULT NULL,
  `jabatan_id` int DEFAULT NULL,
  `masakerja` smallint DEFAULT NULL,
  `jumngajar` smallint DEFAULT NULL,
  `ijin` smallint DEFAULT NULL,
  `tunjangan_wkosis` int DEFAULT NULL,
  `nominal_baku` int DEFAULT NULL,
  `baku` int DEFAULT NULL,
  `kehadiran` int DEFAULT NULL,
  `prestasi` int DEFAULT NULL,
  `jumlahgaji` int DEFAULT NULL,
  `jumgajitotal` int DEFAULT NULL,
  `potongan1` int DEFAULT NULL,
  `potongan2` int DEFAULT NULL,
  `jumlahterima` int DEFAULT NULL,
  `jp` int DEFAULT NULL,
  PRIMARY KEY (`id`) USING BTREE
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci ROW_FORMAT=DYNAMIC;
/*!40101 SET character_set_client = @saved_cs_client */;

LOCK TABLES `gajisd_detil` WRITE;
/*!40000 ALTER TABLE `gajisd_detil` DISABLE KEYS */;
/*!40000 ALTER TABLE `gajisd_detil` ENABLE KEYS */;
UNLOCK TABLES;
DROP TABLE IF EXISTS `gajisma`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `gajisma` (
  `id` int NOT NULL AUTO_INCREMENT,
  `tahun` smallint DEFAULT NULL,
  `bulan` int DEFAULT NULL,
  `datetime` datetime DEFAULT NULL,
  `createby` int DEFAULT NULL,
  PRIMARY KEY (`id`) USING BTREE
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci ROW_FORMAT=DYNAMIC;
/*!40101 SET character_set_client = @saved_cs_client */;

LOCK TABLES `gajisma` WRITE;
/*!40000 ALTER TABLE `gajisma` DISABLE KEYS */;
/*!40000 ALTER TABLE `gajisma` ENABLE KEYS */;
UNLOCK TABLES;
DROP TABLE IF EXISTS `gajisma_detil`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `gajisma_detil` (
  `id` int NOT NULL AUTO_INCREMENT,
  `pid` int DEFAULT NULL,
  `pegawai_id` varchar(50) DEFAULT NULL,
  `jabatan_id` int DEFAULT NULL,
  `masakerja` smallint DEFAULT NULL,
  `jumngajar` smallint DEFAULT NULL,
  `ijin` smallint DEFAULT NULL,
  `tunjangan_wkosis` int DEFAULT NULL,
  `nominal_baku` int DEFAULT NULL,
  `baku` int DEFAULT NULL,
  `kehadiran` int DEFAULT NULL,
  `prestasi` int DEFAULT NULL,
  `jumlahgaji` int DEFAULT NULL,
  `jumgajitotal` int DEFAULT NULL,
  `potongan1` int DEFAULT NULL,
  `potongan2` int DEFAULT NULL,
  `jumlahterima` int DEFAULT NULL,
  `jp` int DEFAULT NULL,
  PRIMARY KEY (`id`) USING BTREE
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci ROW_FORMAT=DYNAMIC;
/*!40101 SET character_set_client = @saved_cs_client */;

LOCK TABLES `gajisma_detil` WRITE;
/*!40000 ALTER TABLE `gajisma_detil` DISABLE KEYS */;
/*!40000 ALTER TABLE `gajisma_detil` ENABLE KEYS */;
UNLOCK TABLES;
DROP TABLE IF EXISTS `gajismk`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `gajismk` (
  `id` int NOT NULL AUTO_INCREMENT,
  `tahun` smallint DEFAULT NULL,
  `bulan` int DEFAULT NULL,
  `datetime` datetime DEFAULT NULL,
  `createby` int DEFAULT NULL,
  PRIMARY KEY (`id`) USING BTREE
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci ROW_FORMAT=DYNAMIC;
/*!40101 SET character_set_client = @saved_cs_client */;

LOCK TABLES `gajismk` WRITE;
/*!40000 ALTER TABLE `gajismk` DISABLE KEYS */;
/*!40000 ALTER TABLE `gajismk` ENABLE KEYS */;
UNLOCK TABLES;
DROP TABLE IF EXISTS `gajismk_detil`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `gajismk_detil` (
  `id` int NOT NULL AUTO_INCREMENT,
  `pid` int DEFAULT NULL,
  `pegawai_id` varchar(50) DEFAULT NULL,
  `jabatan_id` int DEFAULT NULL,
  `masakerja` smallint DEFAULT NULL,
  `jumngajar` smallint DEFAULT NULL,
  `ijin` smallint DEFAULT NULL,
  `tunjangan_wkosis` int DEFAULT NULL,
  `nominal_baku` int DEFAULT NULL,
  `baku` int DEFAULT NULL,
  `kehadiran` int DEFAULT NULL,
  `prestasi` int DEFAULT NULL,
  `jumlahgaji` int DEFAULT NULL,
  `jumgajitotal` int DEFAULT NULL,
  `potongan1` int DEFAULT NULL,
  `potongan2` int DEFAULT NULL,
  `jumlahterima` int DEFAULT NULL,
  `jp` int DEFAULT NULL,
  PRIMARY KEY (`id`) USING BTREE
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci ROW_FORMAT=DYNAMIC;
/*!40101 SET character_set_client = @saved_cs_client */;

LOCK TABLES `gajismk_detil` WRITE;
/*!40000 ALTER TABLE `gajismk_detil` DISABLE KEYS */;
/*!40000 ALTER TABLE `gajismk_detil` ENABLE KEYS */;
UNLOCK TABLES;
DROP TABLE IF EXISTS `gajismp`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `gajismp` (
  `id` int NOT NULL AUTO_INCREMENT,
  `tahun` smallint DEFAULT NULL,
  `bulan` int DEFAULT NULL,
  `datetime` datetime DEFAULT NULL,
  `createby` int DEFAULT NULL,
  PRIMARY KEY (`id`) USING BTREE
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci ROW_FORMAT=DYNAMIC;
/*!40101 SET character_set_client = @saved_cs_client */;

LOCK TABLES `gajismp` WRITE;
/*!40000 ALTER TABLE `gajismp` DISABLE KEYS */;
/*!40000 ALTER TABLE `gajismp` ENABLE KEYS */;
UNLOCK TABLES;
DROP TABLE IF EXISTS `gajismp_detil`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `gajismp_detil` (
  `id` int NOT NULL AUTO_INCREMENT,
  `pid` int DEFAULT NULL,
  `pegawai_id` varchar(50) DEFAULT NULL,
  `jabatan_id` int DEFAULT NULL,
  `masakerja` smallint DEFAULT NULL,
  `jumngajar` smallint DEFAULT NULL,
  `ijin` smallint DEFAULT NULL,
  `tunjangan_wkosis` int DEFAULT NULL,
  `nominal_baku` int DEFAULT NULL,
  `baku` int DEFAULT NULL,
  `kehadiran` int DEFAULT NULL,
  `prestasi` int DEFAULT NULL,
  `jumlahgaji` int DEFAULT NULL,
  `jumgajitotal` int DEFAULT NULL,
  `potongan1` int DEFAULT NULL,
  `potongan2` int DEFAULT NULL,
  `jumlahterima` int DEFAULT NULL,
  `jp` int DEFAULT NULL,
  PRIMARY KEY (`id`) USING BTREE
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci ROW_FORMAT=DYNAMIC;
/*!40101 SET character_set_client = @saved_cs_client */;

LOCK TABLES `gajismp_detil` WRITE;
/*!40000 ALTER TABLE `gajismp_detil` DISABLE KEYS */;
/*!40000 ALTER TABLE `gajismp_detil` ENABLE KEYS */;
UNLOCK TABLES;
DROP TABLE IF EXISTS `gajitk`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `gajitk` (
  `id` int NOT NULL AUTO_INCREMENT,
  `tahun` smallint DEFAULT NULL,
  `bulan` int DEFAULT NULL,
  `datetime` datetime DEFAULT NULL,
  `createby` int DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

LOCK TABLES `gajitk` WRITE;
/*!40000 ALTER TABLE `gajitk` DISABLE KEYS */;
/*!40000 ALTER TABLE `gajitk` ENABLE KEYS */;
UNLOCK TABLES;
DROP TABLE IF EXISTS `gajitk_detil`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `gajitk_detil` (
  `id` int NOT NULL AUTO_INCREMENT,
  `pid` int DEFAULT NULL,
  `pegawai_id` int DEFAULT NULL,
  `jabatan_id` int DEFAULT NULL,
  `masakerja` smallint DEFAULT NULL,
  `jumngajar` smallint DEFAULT NULL,
  `ijin` smallint DEFAULT NULL,
  `voucher` int DEFAULT NULL,
  `tunjangan_khusus` int DEFAULT NULL,
  `tunjangan_jabatan` int DEFAULT NULL,
  `baku` int DEFAULT NULL,
  `kehadiran` int DEFAULT NULL,
  `prestasi` int DEFAULT NULL,
  `jumlahgaji` int DEFAULT NULL,
  `jumgajitotal` int DEFAULT NULL,
  `potongan1` int DEFAULT NULL,
  `potongan2` int DEFAULT NULL,
  `jumlahterima` int DEFAULT NULL,
  `jp` int DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

LOCK TABLES `gajitk_detil` WRITE;
/*!40000 ALTER TABLE `gajitk_detil` DISABLE KEYS */;
/*!40000 ALTER TABLE `gajitk_detil` ENABLE KEYS */;
UNLOCK TABLES;
DROP TABLE IF EXISTS `gajitunjangan`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `gajitunjangan` (
  `id` int NOT NULL AUTO_INCREMENT,
  `pidjabatan` int DEFAULT NULL,
  `value_kehadiran` bigint DEFAULT NULL,
  `gapok` int DEFAULT NULL,
  `tunjangan_jabatan` int DEFAULT NULL,
  `reward` int DEFAULT NULL,
  `lembur` int DEFAULT NULL,
  `piket` int DEFAULT NULL,
  `inval` int DEFAULT NULL,
  `jam_lebih` bigint DEFAULT NULL,
  `tunjangan_khusus` bigint DEFAULT NULL,
  `ekstrakuri` bigint DEFAULT NULL,
  PRIMARY KEY (`id`) USING BTREE
) ENGINE=InnoDB AUTO_INCREMENT=12 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci ROW_FORMAT=DYNAMIC;
/*!40101 SET character_set_client = @saved_cs_client */;

LOCK TABLES `gajitunjangan` WRITE;
/*!40000 ALTER TABLE `gajitunjangan` DISABLE KEYS */;
INSERT INTO `gajitunjangan` VALUES (1,1,65500,80000,NULL,40000,40000,30000,10000,70000,120000,NULL),(2,2,65500,40000,1500000,30000,42000,30000,10000,70000,NULL,NULL),(3,3,60000,300000,NULL,NULL,NULL,NULL,NULL,10000,NULL,NULL),(4,5,56000,NULL,450000,50000,50000,30000,NULL,NULL,NULL,NULL),(5,9,NULL,NULL,NULL,50000,30000,35000,25000,NULL,NULL,NULL),(6,11,60000,300000,NULL,NULL,10000,NULL,NULL,NULL,NULL,NULL),(7,10,60000,300000,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL),(8,12,75000,450000,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL),(9,6,NULL,NULL,70000,50000,NULL,NULL,NULL,NULL,NULL,NULL),(10,15,NULL,NULL,250000,NULL,NULL,NULL,NULL,NULL,NULL,NULL),(11,13,NULL,NULL,100000,NULL,NULL,NULL,NULL,NULL,NULL,NULL);
/*!40000 ALTER TABLE `gajitunjangan` ENABLE KEYS */;
UNLOCK TABLES;
DROP TABLE IF EXISTS `gender`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `gender` (
  `id` int NOT NULL AUTO_INCREMENT,
  `gen` varchar(50) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

LOCK TABLES `gender` WRITE;
/*!40000 ALTER TABLE `gender` DISABLE KEYS */;
INSERT INTO `gender` VALUES (1,'Pria'),(2,'Wanita');
/*!40000 ALTER TABLE `gender` ENABLE KEYS */;
UNLOCK TABLES;
DROP TABLE IF EXISTS `generate_perbulan`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `generate_perbulan` (
  `id` int NOT NULL AUTO_INCREMENT,
  `tahun` int DEFAULT NULL,
  `bulan` varchar(50) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=13 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

LOCK TABLES `generate_perbulan` WRITE;
/*!40000 ALTER TABLE `generate_perbulan` DISABLE KEYS */;
INSERT INTO `generate_perbulan` VALUES (1,2023,'januari,Februari,Maret'),(2,2023,'januari,Februari,Maret'),(3,2025,'januari'),(4,2023,'januari,Februari,Maret'),(5,2023,'januari,Februari,Maret'),(6,2025,'januari'),(7,2023,'januari,Februari'),(8,2023,'januari,Februari'),(9,2023,'januari,Februari,Maret'),(10,2023,'januari,Februari'),(11,2023,'1,2,3'),(12,2023,'1,2');
/*!40000 ALTER TABLE `generate_perbulan` ENABLE KEYS */;
UNLOCK TABLES;
DROP TABLE IF EXISTS `generate_pertahun`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `generate_pertahun` (
  `id` int NOT NULL AUTO_INCREMENT,
  `tahun` int DEFAULT NULL,
  `bulan` varchar(50) DEFAULT NULL,
  `profesi` int DEFAULT NULL,
  `bulan2` int DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=599 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

LOCK TABLES `generate_pertahun` WRITE;
/*!40000 ALTER TABLE `generate_pertahun` DISABLE KEYS */;
INSERT INTO `generate_pertahun` VALUES (529,2023,NULL,NULL,12),(535,2023,NULL,NULL,11),(571,2023,NULL,NULL,7),(580,2023,NULL,NULL,2),(590,2023,NULL,NULL,6),(592,2023,NULL,NULL,8),(594,2024,NULL,NULL,1),(596,2024,NULL,NULL,2),(598,2023,NULL,NULL,1);
/*!40000 ALTER TABLE `generate_pertahun` ENABLE KEYS */;
UNLOCK TABLES;
DROP TABLE IF EXISTS `generate_pertahun_sd`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `generate_pertahun_sd` (
  `id` int NOT NULL AUTO_INCREMENT,
  `tahun` int DEFAULT NULL,
  `bulan` varchar(50) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci DEFAULT NULL,
  `profesi` int DEFAULT NULL,
  `bulan2` int DEFAULT NULL,
  PRIMARY KEY (`id`) USING BTREE
) ENGINE=InnoDB AUTO_INCREMENT=316 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci ROW_FORMAT=DYNAMIC;
/*!40101 SET character_set_client = @saved_cs_client */;

LOCK TABLES `generate_pertahun_sd` WRITE;
/*!40000 ALTER TABLE `generate_pertahun_sd` DISABLE KEYS */;
INSERT INTO `generate_pertahun_sd` VALUES (273,2023,NULL,NULL,11),(285,2023,NULL,NULL,7),(289,2023,NULL,NULL,12),(291,2023,NULL,NULL,8),(293,2023,NULL,NULL,6),(315,2023,NULL,NULL,1);
/*!40000 ALTER TABLE `generate_pertahun_sd` ENABLE KEYS */;
UNLOCK TABLES;
DROP TABLE IF EXISTS `generate_pertahun_smk`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `generate_pertahun_smk` (
  `id` int NOT NULL AUTO_INCREMENT,
  `tahun` int DEFAULT NULL,
  `bulan` varchar(50) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci DEFAULT NULL,
  `profesi` int DEFAULT NULL,
  `bulan2` int DEFAULT NULL,
  PRIMARY KEY (`id`) USING BTREE
) ENGINE=InnoDB AUTO_INCREMENT=235 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci ROW_FORMAT=DYNAMIC;
/*!40101 SET character_set_client = @saved_cs_client */;

LOCK TABLES `generate_pertahun_smk` WRITE;
/*!40000 ALTER TABLE `generate_pertahun_smk` DISABLE KEYS */;
INSERT INTO `generate_pertahun_smk` VALUES (140,2030,NULL,1,1),(180,2023,NULL,NULL,11),(184,2023,NULL,NULL,3),(198,2023,NULL,NULL,7),(216,2023,NULL,NULL,6),(230,2023,NULL,NULL,12),(234,2023,NULL,NULL,1);
/*!40000 ALTER TABLE `generate_pertahun_smk` ENABLE KEYS */;
UNLOCK TABLES;
DROP TABLE IF EXISTS `generate_pertahun_smp`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `generate_pertahun_smp` (
  `id` int NOT NULL AUTO_INCREMENT,
  `tahun` int DEFAULT NULL,
  `bulan` varchar(50) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci DEFAULT NULL,
  `profesi` int DEFAULT NULL,
  `bulan2` int DEFAULT NULL,
  PRIMARY KEY (`id`) USING BTREE
) ENGINE=InnoDB AUTO_INCREMENT=239 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci ROW_FORMAT=DYNAMIC;
/*!40101 SET character_set_client = @saved_cs_client */;

LOCK TABLES `generate_pertahun_smp` WRITE;
/*!40000 ALTER TABLE `generate_pertahun_smp` DISABLE KEYS */;
INSERT INTO `generate_pertahun_smp` VALUES (210,2023,NULL,NULL,11),(212,2023,NULL,NULL,6),(228,2023,NULL,NULL,8),(234,2023,NULL,NULL,12),(238,2023,NULL,NULL,1);
/*!40000 ALTER TABLE `generate_pertahun_smp` ENABLE KEYS */;
UNLOCK TABLES;
DROP TABLE IF EXISTS `generate_pertahun_tk`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `generate_pertahun_tk` (
  `id` int NOT NULL AUTO_INCREMENT,
  `tahun` int DEFAULT NULL,
  `bulan` varchar(50) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci DEFAULT NULL,
  `profesi` int DEFAULT NULL,
  `bulan2` int DEFAULT NULL,
  PRIMARY KEY (`id`) USING BTREE
) ENGINE=InnoDB AUTO_INCREMENT=416 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci ROW_FORMAT=DYNAMIC;
/*!40101 SET character_set_client = @saved_cs_client */;

LOCK TABLES `generate_pertahun_tk` WRITE;
/*!40000 ALTER TABLE `generate_pertahun_tk` DISABLE KEYS */;
INSERT INTO `generate_pertahun_tk` VALUES (382,2023,NULL,NULL,2),(390,2023,NULL,NULL,12),(394,2023,NULL,NULL,6),(413,2023,NULL,NULL,7),(415,2023,NULL,NULL,1);
/*!40000 ALTER TABLE `generate_pertahun_tk` ENABLE KEYS */;
UNLOCK TABLES;
DROP TABLE IF EXISTS `ijazah`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `ijazah` (
  `id` int NOT NULL AUTO_INCREMENT,
  `name` varchar(50) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

LOCK TABLES `ijazah` WRITE;
/*!40000 ALTER TABLE `ijazah` DISABLE KEYS */;
INSERT INTO `ijazah` VALUES (1,'SMA'),(2,'S1');
/*!40000 ALTER TABLE `ijazah` ENABLE KEYS */;
UNLOCK TABLES;
DROP TABLE IF EXISTS `jabatan`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `jabatan` (
  `id` int NOT NULL AUTO_INCREMENT,
  `nama_jabatan` varchar(255) DEFAULT NULL,
  `keterangan` varchar(255) DEFAULT NULL,
  `c_date` datetime DEFAULT NULL,
  `u_date` datetime DEFAULT NULL,
  `c_by` int DEFAULT NULL,
  `u_by` int DEFAULT NULL,
  `aktif` tinyint DEFAULT NULL,
  `jenjang` int DEFAULT NULL,
  `type_jabatan` int DEFAULT NULL,
  `type_guru` int DEFAULT NULL,
  PRIMARY KEY (`id`) USING BTREE
) ENGINE=InnoDB AUTO_INCREMENT=152 DEFAULT CHARSET=latin1 ROW_FORMAT=DYNAMIC;
/*!40101 SET character_set_client = @saved_cs_client */;

LOCK TABLES `jabatan` WRITE;
/*!40000 ALTER TABLE `jabatan` DISABLE KEYS */;
INSERT INTO `jabatan` VALUES (5,'Kepala Sekolah','baru',NULL,NULL,NULL,NULL,NULL,4,1,NULL),(6,'TU',NULL,NULL,NULL,NULL,NULL,NULL,4,2,NULL),(7,'Kepala TU',NULL,NULL,NULL,NULL,NULL,NULL,4,2,NULL),(8,'Guru BK',NULL,NULL,NULL,NULL,NULL,NULL,4,1,NULL),(9,'Guru Mapel',NULL,NULL,NULL,NULL,NULL,NULL,4,1,NULL),(10,'Petugas Keamanan',NULL,NULL,NULL,NULL,NULL,NULL,4,3,NULL),(11,'Petugas Kebersihan',NULL,NULL,NULL,NULL,NULL,NULL,4,3,NULL),(12,'Teknisi Listrik',NULL,NULL,NULL,NULL,NULL,NULL,4,3,NULL),(13,'Wali Kelas','baru',NULL,NULL,NULL,NULL,NULL,4,1,NULL),(14,'Bendahara',NULL,NULL,NULL,NULL,NULL,NULL,4,1,NULL),(15,'Wakil Kepala Sekolah','baru',NULL,NULL,NULL,NULL,NULL,4,1,NULL),(16,'Pustakawan','baru',NULL,NULL,NULL,NULL,NULL,4,2,NULL),(17,'Teknisi Komputer','baru',NULL,NULL,NULL,NULL,NULL,4,2,NULL),(18,'Test',NULL,NULL,NULL,NULL,NULL,NULL,1,NULL,NULL),(19,'Tenaga Kependidikan',NULL,NULL,NULL,NULL,NULL,NULL,2,NULL,NULL),(20,'Pendidik',NULL,NULL,NULL,NULL,NULL,NULL,2,NULL,NULL),(21,'Guru Tidak Tetap',NULL,NULL,NULL,NULL,NULL,NULL,2,NULL,NULL),(22,'Guru Tetap Yayasan',NULL,NULL,NULL,NULL,NULL,NULL,2,NULL,NULL),(23,'KEPALA SEKOLAH',NULL,NULL,NULL,NULL,NULL,NULL,3,NULL,NULL),(24,'WAKIL KEPALA SEKOLAH KESISWAAN',NULL,NULL,NULL,NULL,NULL,NULL,3,NULL,NULL),(25,'WAKIL KEPALA SEKOLAH HUMAS',NULL,NULL,NULL,NULL,NULL,NULL,3,NULL,NULL),(26,'WAKIL KEPALA SEKOLAH SARANA DAN PRASARANA',NULL,NULL,NULL,NULL,NULL,NULL,3,NULL,NULL),(27,'WAKIL KEPALA SEKOLAH KURIKULUM',NULL,NULL,NULL,NULL,NULL,NULL,3,NULL,NULL),(28,'GURU BHS. DAERAH',NULL,NULL,NULL,NULL,NULL,NULL,3,NULL,NULL),(29,'GURU BHS. INDONESIA',NULL,NULL,NULL,NULL,NULL,NULL,3,NULL,NULL),(30,'GURU BHS. INGGRIS',NULL,NULL,NULL,NULL,NULL,NULL,3,NULL,NULL),(31,'GURU BIOLOGI',NULL,NULL,NULL,NULL,NULL,NULL,3,NULL,NULL),(32,'GURU BK',NULL,NULL,NULL,NULL,NULL,NULL,3,NULL,NULL),(33,'GURU BKTIK',NULL,NULL,NULL,NULL,NULL,NULL,3,NULL,NULL),(34,'GURU EKONOMI',NULL,NULL,NULL,NULL,NULL,NULL,3,NULL,NULL),(35,'GURU FISIKA',NULL,NULL,NULL,NULL,NULL,NULL,3,NULL,NULL),(36,'GURU GEOGRAFI',NULL,NULL,NULL,NULL,NULL,NULL,3,NULL,NULL),(37,'GURU KIMIA',NULL,NULL,NULL,NULL,NULL,NULL,3,NULL,NULL),(38,'GURU MATEMATIKA',NULL,NULL,NULL,NULL,NULL,NULL,3,NULL,NULL),(39,'GURU PAIDB',NULL,NULL,NULL,NULL,NULL,NULL,3,NULL,NULL),(40,'GURU PJOK',NULL,NULL,NULL,NULL,NULL,NULL,3,NULL,NULL),(41,'GURU PKN',NULL,NULL,NULL,NULL,NULL,NULL,3,NULL,NULL),(42,'GURU SEJARAH',NULL,NULL,NULL,NULL,NULL,NULL,3,NULL,NULL),(43,'GURU SENI BUDAYA',NULL,NULL,NULL,NULL,NULL,NULL,3,NULL,NULL),(44,'GURU SOSIOLOGI',NULL,NULL,NULL,NULL,NULL,NULL,3,NULL,NULL),(45,'KEPALA TU',NULL,NULL,NULL,NULL,NULL,NULL,3,NULL,NULL),(46,'TU. Bagian Administrasi',NULL,NULL,NULL,NULL,NULL,NULL,3,NULL,NULL),(47,'TU. Bagian Keuangan',NULL,NULL,NULL,NULL,NULL,NULL,3,NULL,NULL),(48,'KEPALA PERPUSTAKAAN',NULL,NULL,NULL,NULL,NULL,NULL,3,NULL,NULL),(49,'PUSTAKAWAN',NULL,NULL,NULL,NULL,NULL,NULL,3,NULL,NULL),(50,'TEKNISI IT',NULL,NULL,NULL,NULL,NULL,NULL,3,NULL,NULL),(51,'OB',NULL,NULL,NULL,NULL,NULL,NULL,3,NULL,NULL),(52,'SATPAM',NULL,NULL,NULL,NULL,NULL,NULL,3,NULL,NULL),(53,'WALI KELAS',NULL,NULL,NULL,NULL,NULL,NULL,3,NULL,NULL),(54,'PEMBINA OSIS',NULL,NULL,NULL,NULL,NULL,NULL,3,NULL,NULL),(55,'STAFF. KEUANGAN BPOPP',NULL,NULL,NULL,NULL,NULL,NULL,3,NULL,NULL),(56,'STAFF. KEUANGAN BOS',NULL,NULL,NULL,NULL,NULL,NULL,3,NULL,NULL),(57,'KOORDINATOR SATPAM',NULL,NULL,NULL,NULL,NULL,NULL,3,NULL,NULL),(58,'KOORDINATOR BK',NULL,NULL,NULL,NULL,NULL,NULL,3,NULL,NULL),(59,'Kepala Sekoalah',NULL,NULL,NULL,NULL,NULL,NULL,4,NULL,NULL),(60,'Wakil Kepala Urusan Kurikulum',NULL,NULL,NULL,NULL,NULL,NULL,4,NULL,NULL),(61,'Wakil Kepala Urusan Kesiswaan',NULL,NULL,NULL,NULL,NULL,NULL,4,NULL,NULL),(62,'Wakil Kepala Urusan Sarana dan Prasarana',NULL,NULL,NULL,NULL,NULL,NULL,4,NULL,NULL),(63,'Wakil Kepala Urusan Humas',NULL,NULL,NULL,NULL,NULL,NULL,4,NULL,NULL),(64,'Kepala Kompetensi Keahlian Multimedia',NULL,NULL,NULL,NULL,NULL,NULL,4,NULL,NULL),(65,'Kepala Kompetensi Keahlian Otomatisasi dan Tata Kelola Perkantoran',NULL,NULL,NULL,NULL,NULL,NULL,4,NULL,NULL),(66,'Kepala Kompetensi Keahlian Akutansi dan Keuangan Lembaga',NULL,NULL,NULL,NULL,NULL,NULL,4,NULL,NULL),(67,'Kepala Laboratoriaum',NULL,NULL,NULL,NULL,NULL,NULL,4,NULL,NULL),(68,'Pembina OSIS',NULL,NULL,NULL,NULL,NULL,NULL,4,NULL,NULL),(69,'Kepala Tata Usaha',NULL,NULL,NULL,NULL,NULL,NULL,4,NULL,NULL),(70,'Peagawai Tata Usaha',NULL,NULL,NULL,NULL,NULL,NULL,4,NULL,NULL),(71,'Karya wan Kebersihan',NULL,NULL,NULL,NULL,NULL,NULL,4,NULL,NULL),(72,'Satpam',NULL,NULL,NULL,NULL,NULL,NULL,4,NULL,NULL),(73,'Wali Kelas X MM 1',NULL,NULL,NULL,NULL,NULL,NULL,4,NULL,NULL),(74,'Wali Kelas X MM 2',NULL,NULL,NULL,NULL,NULL,NULL,4,NULL,NULL),(75,'Wali Kelas X MM 3',NULL,NULL,NULL,NULL,NULL,NULL,4,NULL,NULL),(76,'Wali Kelas X MM 4',NULL,NULL,NULL,NULL,NULL,NULL,4,NULL,NULL),(77,'Wali Kelas X OTKP 1',NULL,NULL,NULL,NULL,NULL,NULL,4,NULL,NULL),(78,'Wali Kelas X OTKP 2',NULL,NULL,NULL,NULL,NULL,NULL,4,NULL,NULL),(79,'Wali Kelas X OTKP 3',NULL,NULL,NULL,NULL,NULL,NULL,4,NULL,NULL),(80,'Wali Kelas X OTKP 4',NULL,NULL,NULL,NULL,NULL,NULL,4,NULL,NULL),(81,'Wali Kelas X AKL 1',NULL,NULL,NULL,NULL,NULL,NULL,4,NULL,NULL),(82,'Wali Kelas X AKL 2',NULL,NULL,NULL,NULL,NULL,NULL,4,NULL,NULL),(83,'Wali Kelas X AKL 3',NULL,NULL,NULL,NULL,NULL,NULL,4,NULL,NULL),(84,'Wali Kelas X AKL 4',NULL,NULL,NULL,NULL,NULL,NULL,4,NULL,NULL),(85,'Wali Kelas XI MM 1',NULL,NULL,NULL,NULL,NULL,NULL,4,NULL,NULL),(86,'Wali Kelas XI MM 2',NULL,NULL,NULL,NULL,NULL,NULL,4,NULL,NULL),(87,'Wali Kelas XI MM 3',NULL,NULL,NULL,NULL,NULL,NULL,4,NULL,NULL),(88,'Wali Kelas XI OTKP 1',NULL,NULL,NULL,NULL,NULL,NULL,4,NULL,NULL),(89,'Wali Kelas XI OTKP 2',NULL,NULL,NULL,NULL,NULL,NULL,4,NULL,NULL),(90,'Wali Kelas XI AKL 1',NULL,NULL,NULL,NULL,NULL,NULL,4,NULL,NULL),(91,'Wali Kelas XI AKL 2',NULL,NULL,NULL,NULL,NULL,NULL,4,NULL,NULL),(92,'Wali Kelas XI AKL 3',NULL,NULL,NULL,NULL,NULL,NULL,4,NULL,NULL),(93,'Wali Kelas XII MM 1',NULL,NULL,NULL,NULL,NULL,NULL,4,NULL,NULL),(94,'Wali Kelas XII MM 2',NULL,NULL,NULL,NULL,NULL,NULL,4,NULL,NULL),(95,'Wali Kelas XII MM 3',NULL,NULL,NULL,NULL,NULL,NULL,4,NULL,NULL),(96,'Wali Kelas XII OTKP 1',NULL,NULL,NULL,NULL,NULL,NULL,4,NULL,NULL),(97,'Wali Kelas XII OTKP 2',NULL,NULL,NULL,NULL,NULL,NULL,4,NULL,NULL),(98,'Wali Kelas XII OTKP 3',NULL,NULL,NULL,NULL,NULL,NULL,4,NULL,NULL),(99,'Wali Kelas XII AKL 1',NULL,NULL,NULL,NULL,NULL,NULL,4,NULL,NULL),(100,'Wali Kelas XII AKL 2',NULL,NULL,NULL,NULL,NULL,NULL,4,NULL,NULL),(101,'Guru Pendidikan Agama Islam',NULL,NULL,NULL,NULL,NULL,NULL,4,NULL,NULL),(102,'Guru Pendalaman Agama Islam',NULL,NULL,NULL,NULL,NULL,NULL,4,NULL,NULL),(103,'Guru PPKn',NULL,NULL,NULL,NULL,NULL,NULL,4,NULL,NULL),(104,'Guru Bahasa Indonesia',NULL,NULL,NULL,NULL,NULL,NULL,4,NULL,NULL),(105,'Guru Matematika',NULL,NULL,NULL,NULL,NULL,NULL,4,NULL,NULL),(106,'Guru Bahasa Inggris',NULL,NULL,NULL,NULL,NULL,NULL,4,NULL,NULL),(107,'Guru Sejarah Indonesia',NULL,NULL,NULL,NULL,NULL,NULL,4,NULL,NULL),(108,'Guru Seni Budaya',NULL,NULL,NULL,NULL,NULL,NULL,4,NULL,NULL),(109,'Guru PJOK',NULL,NULL,NULL,NULL,NULL,NULL,4,NULL,NULL),(110,'Guru Bahasa Daerah',NULL,NULL,NULL,NULL,NULL,NULL,4,NULL,NULL),(111,'Guru Bimbingan dan Konseling',NULL,NULL,NULL,NULL,NULL,NULL,4,NULL,NULL),(112,'Guru Sistem dan Komunikasi Digital',NULL,NULL,NULL,NULL,NULL,NULL,4,NULL,NULL),(113,'Guru Fisika',NULL,NULL,NULL,NULL,NULL,NULL,4,NULL,NULL),(114,'Guru Kimia',NULL,NULL,NULL,NULL,NULL,NULL,4,NULL,NULL),(115,'Guru Administrasi Umum',NULL,NULL,NULL,NULL,NULL,NULL,4,NULL,NULL),(116,'Guru Ekonomi Bisnis',NULL,NULL,NULL,NULL,NULL,NULL,4,NULL,NULL),(117,'Guru IPA',NULL,NULL,NULL,NULL,NULL,NULL,4,NULL,NULL),(118,'Guru Dasar Desain Grafis',NULL,NULL,NULL,NULL,NULL,NULL,4,NULL,NULL),(119,'Guru Pemrograman Dasar',NULL,NULL,NULL,NULL,NULL,NULL,4,NULL,NULL),(120,'Guru Sistem Komputer',NULL,NULL,NULL,NULL,NULL,NULL,4,NULL,NULL),(121,'Guru Komputer dan Jaringan Dasar',NULL,NULL,NULL,NULL,NULL,NULL,4,NULL,NULL),(122,'Guru Kearsipan',NULL,NULL,NULL,NULL,NULL,NULL,4,NULL,NULL),(123,'Guru Teknologi Perkantoran',NULL,NULL,NULL,NULL,NULL,NULL,4,NULL,NULL),(124,'Guru Korespondensi',NULL,NULL,NULL,NULL,NULL,NULL,4,NULL,NULL),(125,'Guru Akutansi Dasar',NULL,NULL,NULL,NULL,NULL,NULL,4,NULL,NULL),(126,'Guru Aplikasi Pengolahan Angka',NULL,NULL,NULL,NULL,NULL,NULL,4,NULL,NULL),(127,'Guru Etika Profesi',NULL,NULL,NULL,NULL,NULL,NULL,4,NULL,NULL),(128,'Guru Perbankan Dasar',NULL,NULL,NULL,NULL,NULL,NULL,4,NULL,NULL),(129,'Guru Desain Grafis Percetakan',NULL,NULL,NULL,NULL,NULL,NULL,4,NULL,NULL),(130,'Guru Animasi 2 Dimensi dan 3 Dimensi',NULL,NULL,NULL,NULL,NULL,NULL,4,NULL,NULL),(131,'Guru Desain Media Interaktif',NULL,NULL,NULL,NULL,NULL,NULL,4,NULL,NULL),(132,'Guru Teknik Pengolahan Audio dan Video',NULL,NULL,NULL,NULL,NULL,NULL,4,NULL,NULL),(133,'Guru Produk Kreatif dan Kewirausahaan Multimedia',NULL,NULL,NULL,NULL,NULL,NULL,4,NULL,NULL),(134,'Guru Otomatisasi Tata Kelola Kepegawaian',NULL,NULL,NULL,NULL,NULL,NULL,4,NULL,NULL),(135,'Guru Otomatisasi Tata Kelola Keuangan',NULL,NULL,NULL,NULL,NULL,NULL,4,NULL,NULL),(136,'Guru Otomatisasi Tata Kelola Sarana dan Prasarana',NULL,NULL,NULL,NULL,NULL,NULL,4,NULL,NULL),(137,'Guru Otomatisasi Tata Kelola Humas dan Keprotokolan',NULL,NULL,NULL,NULL,NULL,NULL,4,NULL,NULL),(138,'Guru Produk Kreatif dan Kewirausahaan Otomatisasi dan Tata Kelola Perkantoran',NULL,NULL,NULL,NULL,NULL,NULL,4,NULL,NULL),(139,'Guru Pratikum Akutansi Perusahaan Jasa, Dagang, dan Manufaktur',NULL,NULL,NULL,NULL,NULL,NULL,4,NULL,NULL),(140,'Guru Pratikum Akutansi Lembaga/Instansi Pemerintah',NULL,NULL,NULL,NULL,NULL,NULL,4,NULL,NULL),(141,'Guru Akutansi Keuangan',NULL,NULL,NULL,NULL,NULL,NULL,4,NULL,NULL),(142,'Guru Komputer Akutansi',NULL,NULL,NULL,NULL,NULL,NULL,4,NULL,NULL),(143,'Guru Administrasi Pajak',NULL,NULL,NULL,NULL,NULL,NULL,4,NULL,NULL),(144,'Guru Produk Kreatif dan Kewirausahaan Akutansi dan Keuangan Lembaga',NULL,NULL,NULL,NULL,NULL,NULL,4,NULL,NULL),(145,'Kepala Perpustakaan',NULL,NULL,NULL,NULL,NULL,NULL,4,NULL,NULL),(146,'Ka. TU','Ka. TU',NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL),(147,'Bendahara Sekolah ','Bendahara Sekolah ',NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL),(148,'Koord BK','Koord BK',NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL),(149,'Staff. BPOPP','Staff. BPOPP',NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL),(150,'Staff. BOS','Staff. BOS',NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL),(151,'Pengurus Yayasan',NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL);
/*!40000 ALTER TABLE `jabatan` ENABLE KEYS */;
UNLOCK TABLES;
DROP TABLE IF EXISTS `jenis_barang`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `jenis_barang` (
  `id` int NOT NULL AUTO_INCREMENT,
  `nama` varchar(255) DEFAULT NULL,
  `aktif` varchar(255) DEFAULT NULL,
  PRIMARY KEY (`id`) USING BTREE
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=latin1 ROW_FORMAT=DYNAMIC;
/*!40101 SET character_set_client = @saved_cs_client */;

LOCK TABLES `jenis_barang` WRITE;
/*!40000 ALTER TABLE `jenis_barang` DISABLE KEYS */;
INSERT INTO `jenis_barang` VALUES (1,'Elektronik','1'),(2,'Perlengkapan','1');
/*!40000 ALTER TABLE `jenis_barang` ENABLE KEYS */;
UNLOCK TABLES;
DROP TABLE IF EXISTS `jenis_grup_berita`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `jenis_grup_berita` (
  `id` int NOT NULL AUTO_INCREMENT,
  `nama` varchar(255) DEFAULT NULL,
  `aktif` varchar(255) DEFAULT NULL,
  PRIMARY KEY (`id`) USING BTREE
) ENGINE=InnoDB DEFAULT CHARSET=latin1 ROW_FORMAT=DYNAMIC;
/*!40101 SET character_set_client = @saved_cs_client */;

LOCK TABLES `jenis_grup_berita` WRITE;
/*!40000 ALTER TABLE `jenis_grup_berita` DISABLE KEYS */;
/*!40000 ALTER TABLE `jenis_grup_berita` ENABLE KEYS */;
UNLOCK TABLES;
DROP TABLE IF EXISTS `jenis_grup_ilmu`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `jenis_grup_ilmu` (
  `id` int NOT NULL AUTO_INCREMENT,
  `nama` varchar(255) DEFAULT NULL,
  `aktif` varchar(255) DEFAULT NULL,
  PRIMARY KEY (`id`) USING BTREE
) ENGINE=InnoDB DEFAULT CHARSET=latin1 ROW_FORMAT=DYNAMIC;
/*!40101 SET character_set_client = @saved_cs_client */;

LOCK TABLES `jenis_grup_ilmu` WRITE;
/*!40000 ALTER TABLE `jenis_grup_ilmu` DISABLE KEYS */;
/*!40000 ALTER TABLE `jenis_grup_ilmu` ENABLE KEYS */;
UNLOCK TABLES;
DROP TABLE IF EXISTS `jenis_jabatan`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `jenis_jabatan` (
  `id` int NOT NULL AUTO_INCREMENT,
  `name` varchar(50) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

LOCK TABLES `jenis_jabatan` WRITE;
/*!40000 ALTER TABLE `jenis_jabatan` DISABLE KEYS */;
INSERT INTO `jenis_jabatan` VALUES (1,'Pimpinan &amp; Guru'),(2,'Tenaga Kependidikan'),(3,'Karyawan');
/*!40000 ALTER TABLE `jenis_jabatan` ENABLE KEYS */;
UNLOCK TABLES;
DROP TABLE IF EXISTS `jenis_lembur`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `jenis_lembur` (
  `id` int NOT NULL AUTO_INCREMENT,
  `nama` varchar(255) DEFAULT NULL,
  `aktif` varchar(255) DEFAULT NULL,
  PRIMARY KEY (`id`) USING BTREE
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=latin1 ROW_FORMAT=DYNAMIC;
/*!40101 SET character_set_client = @saved_cs_client */;

LOCK TABLES `jenis_lembur` WRITE;
/*!40000 ALTER TABLE `jenis_lembur` DISABLE KEYS */;
INSERT INTO `jenis_lembur` VALUES (1,'Kejar deadline','1');
/*!40000 ALTER TABLE `jenis_lembur` ENABLE KEYS */;
UNLOCK TABLES;
DROP TABLE IF EXISTS `komentar`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `komentar` (
  `id` int NOT NULL AUTO_INCREMENT,
  `pid` int DEFAULT NULL,
  `komentar` varchar(500) DEFAULT NULL,
  `gambar` varchar(255) DEFAULT NULL,
  `video` varchar(255) DEFAULT NULL,
  `pegawai` int DEFAULT NULL,
  PRIMARY KEY (`id`) USING BTREE
) ENGINE=InnoDB DEFAULT CHARSET=latin1 ROW_FORMAT=DYNAMIC;
/*!40101 SET character_set_client = @saved_cs_client */;

LOCK TABLES `komentar` WRITE;
/*!40000 ALTER TABLE `komentar` DISABLE KEYS */;
/*!40000 ALTER TABLE `komentar` ENABLE KEYS */;
UNLOCK TABLES;
DROP TABLE IF EXISTS `lembur`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `lembur` (
  `id` int NOT NULL AUTO_INCREMENT,
  `pegawai` int DEFAULT NULL,
  `proyek` varchar(255) DEFAULT NULL,
  `pm` int DEFAULT NULL,
  `tgl` datetime DEFAULT NULL,
  `tgl_awal_lembur` datetime DEFAULT NULL,
  `tgl_akhir_lembur` datetime DEFAULT NULL,
  `total_jam` smallint DEFAULT NULL,
  `jenis` varchar(255) DEFAULT NULL,
  `keterangan` varchar(255) DEFAULT NULL,
  `disetujui` varchar(5) DEFAULT NULL,
  `dokumen` varchar(255) DEFAULT NULL,
  PRIMARY KEY (`id`) USING BTREE
) ENGINE=InnoDB DEFAULT CHARSET=latin1 ROW_FORMAT=DYNAMIC;
/*!40101 SET character_set_client = @saved_cs_client */;

LOCK TABLES `lembur` WRITE;
/*!40000 ALTER TABLE `lembur` DISABLE KEYS */;
/*!40000 ALTER TABLE `lembur` ENABLE KEYS */;
UNLOCK TABLES;
DROP TABLE IF EXISTS `m_bpjs`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `m_bpjs` (
  `id` int NOT NULL AUTO_INCREMENT,
  `golongan` varchar(50) DEFAULT NULL,
  `golongan_id` int DEFAULT NULL,
  `value` bigint DEFAULT NULL,
  `jenjang` int DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=16 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

LOCK TABLES `m_bpjs` WRITE;
/*!40000 ALTER TABLE `m_bpjs` DISABLE KEYS */;
INSERT INTO `m_bpjs` VALUES (1,'Golongan I',1,150000,1),(2,'Golongan II',2,100000,1),(3,'Golongan III',3,35000,1),(4,'Golongan I',1,150000,2),(5,'Golongan II',2,100000,2),(6,'Golongan III',3,35000,2),(7,'Golongan I',1,150000,3),(8,'Golongan II',2,100000,3),(9,'Golongan III',3,35000,3),(10,'Golongan I',1,150000,4),(11,'Golongan II',2,100000,4),(12,'Golongan III',3,35000,4),(13,'Golongan I',1,150000,5),(14,'Golongan II',2,100000,5),(15,'Golongan III',3,35000,5);
/*!40000 ALTER TABLE `m_bpjs` ENABLE KEYS */;
UNLOCK TABLES;
DROP TABLE IF EXISTS `m_inval`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `m_inval` (
  `id` int NOT NULL AUTO_INCREMENT,
  `jenjang_id` int DEFAULT NULL,
  `jabatan_id` int DEFAULT NULL,
  `value` bigint DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=17 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

LOCK TABLES `m_inval` WRITE;
/*!40000 ALTER TABLE `m_inval` DISABLE KEYS */;
INSERT INTO `m_inval` VALUES (1,4,1,66000),(3,2,1,66000),(4,3,1,66000),(5,5,1,66000),(6,1,1,66000),(7,2,2,66000),(8,2,3,66000),(9,4,2,66000),(10,4,3,66000),(11,3,2,66000),(12,3,3,66000),(13,5,2,66000),(14,5,3,66000),(15,1,2,66000),(16,1,3,66000);
/*!40000 ALTER TABLE `m_inval` ENABLE KEYS */;
UNLOCK TABLES;
DROP TABLE IF EXISTS `m_iuran_hari_tua`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `m_iuran_hari_tua` (
  `id` int NOT NULL AUTO_INCREMENT,
  `unit` int DEFAULT NULL,
  `value` decimal(20,6) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=7 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

LOCK TABLES `m_iuran_hari_tua` WRITE;
/*!40000 ALTER TABLE `m_iuran_hari_tua` DISABLE KEYS */;
INSERT INTO `m_iuran_hari_tua` VALUES (2,4,0.020000),(3,5,0.020000),(4,2,0.020000),(5,3,0.020000),(6,1,0.020000);
/*!40000 ALTER TABLE `m_iuran_hari_tua` ENABLE KEYS */;
UNLOCK TABLES;
DROP TABLE IF EXISTS `m_jaminan_pensiun`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `m_jaminan_pensiun` (
  `id` int NOT NULL AUTO_INCREMENT,
  `unit` int DEFAULT NULL,
  `value` decimal(20,6) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=7 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

LOCK TABLES `m_jaminan_pensiun` WRITE;
/*!40000 ALTER TABLE `m_jaminan_pensiun` DISABLE KEYS */;
INSERT INTO `m_jaminan_pensiun` VALUES (2,4,0.010000),(3,2,0.010000),(4,3,0.010000),(5,5,0.010000),(6,1,0.010000);
/*!40000 ALTER TABLE `m_jaminan_pensiun` ENABLE KEYS */;
UNLOCK TABLES;
DROP TABLE IF EXISTS `m_jp_pegawai`;
/*!50001 DROP VIEW IF EXISTS `m_jp_pegawai`*/;
SET @saved_cs_client     = @@character_set_client;
/*!50503 SET character_set_client = utf8mb4 */;
/*!50001 CREATE VIEW `m_jp_pegawai` AS SELECT 
 1 AS `id`,
 1 AS `nip`,
 1 AS `jenjang_id`,
 1 AS `nama`,
 1 AS `kehadiran`,
 1 AS `jjm`,
 1 AS `jabatan`,
 1 AS `type`*/;
SET character_set_client = @saved_cs_client;
DROP TABLE IF EXISTS `m_karyawan_sd`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `m_karyawan_sd` (
  `id` int NOT NULL AUTO_INCREMENT,
  `tahun` smallint DEFAULT NULL,
  `bulan` int DEFAULT NULL,
  `datetime` datetime DEFAULT NULL,
  `createby` int DEFAULT NULL,
  PRIMARY KEY (`id`) USING BTREE
) ENGINE=InnoDB AUTO_INCREMENT=28 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci ROW_FORMAT=DYNAMIC;
/*!40101 SET character_set_client = @saved_cs_client */;

LOCK TABLES `m_karyawan_sd` WRITE;
/*!40000 ALTER TABLE `m_karyawan_sd` DISABLE KEYS */;
INSERT INTO `m_karyawan_sd` VALUES (4,2024,12,NULL,NULL),(5,2024,12,NULL,NULL),(7,2024,1,NULL,NULL),(9,2023,11,NULL,NULL),(12,2023,7,NULL,NULL),(14,2023,12,NULL,NULL),(15,2023,8,NULL,NULL),(16,2023,6,NULL,NULL),(27,2023,1,NULL,NULL);
/*!40000 ALTER TABLE `m_karyawan_sd` ENABLE KEYS */;
UNLOCK TABLES;
DROP TABLE IF EXISTS `m_karyawan_sma`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `m_karyawan_sma` (
  `id` int NOT NULL AUTO_INCREMENT,
  `tahun` smallint DEFAULT NULL,
  `bulan` int DEFAULT NULL,
  `datetime` datetime DEFAULT NULL,
  `createby` int DEFAULT NULL,
  PRIMARY KEY (`id`) USING BTREE
) ENGINE=InnoDB AUTO_INCREMENT=107 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci ROW_FORMAT=DYNAMIC;
/*!40101 SET character_set_client = @saved_cs_client */;

LOCK TABLES `m_karyawan_sma` WRITE;
/*!40000 ALTER TABLE `m_karyawan_sma` DISABLE KEYS */;
INSERT INTO `m_karyawan_sma` VALUES (77,2023,12,NULL,NULL),(80,2023,11,NULL,NULL),(92,2023,7,NULL,NULL),(97,2023,2,NULL,NULL),(102,2023,6,NULL,NULL),(103,2023,8,NULL,NULL),(104,2024,1,NULL,NULL),(105,2024,2,NULL,NULL),(106,2023,1,NULL,NULL);
/*!40000 ALTER TABLE `m_karyawan_sma` ENABLE KEYS */;
UNLOCK TABLES;
DROP TABLE IF EXISTS `m_karyawan_smk`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `m_karyawan_smk` (
  `id` int NOT NULL AUTO_INCREMENT,
  `tahun` smallint DEFAULT NULL,
  `bulan` int DEFAULT NULL,
  `datetime` datetime DEFAULT NULL,
  `createby` int DEFAULT NULL,
  PRIMARY KEY (`id`) USING BTREE
) ENGINE=InnoDB AUTO_INCREMENT=29 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci ROW_FORMAT=DYNAMIC;
/*!40101 SET character_set_client = @saved_cs_client */;

LOCK TABLES `m_karyawan_smk` WRITE;
/*!40000 ALTER TABLE `m_karyawan_smk` DISABLE KEYS */;
INSERT INTO `m_karyawan_smk` VALUES (10,2023,11,NULL,NULL),(12,2023,3,NULL,NULL),(15,2023,7,NULL,NULL),(23,2023,6,NULL,NULL),(26,2023,12,NULL,NULL),(28,2023,1,NULL,NULL);
/*!40000 ALTER TABLE `m_karyawan_smk` ENABLE KEYS */;
UNLOCK TABLES;
DROP TABLE IF EXISTS `m_karyawan_smp`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `m_karyawan_smp` (
  `id` int NOT NULL AUTO_INCREMENT,
  `tahun` smallint DEFAULT NULL,
  `bulan` int DEFAULT NULL,
  `datetime` datetime DEFAULT NULL,
  `createby` int DEFAULT NULL,
  PRIMARY KEY (`id`) USING BTREE
) ENGINE=InnoDB AUTO_INCREMENT=26 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci ROW_FORMAT=DYNAMIC;
/*!40101 SET character_set_client = @saved_cs_client */;

LOCK TABLES `m_karyawan_smp` WRITE;
/*!40000 ALTER TABLE `m_karyawan_smp` DISABLE KEYS */;
INSERT INTO `m_karyawan_smp` VALUES (13,2023,11,NULL,NULL),(14,2023,6,NULL,NULL),(20,2023,8,NULL,NULL),(23,2023,12,NULL,NULL),(25,2023,1,NULL,NULL);
/*!40000 ALTER TABLE `m_karyawan_smp` ENABLE KEYS */;
UNLOCK TABLES;
DROP TABLE IF EXISTS `m_karyawan_tk`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `m_karyawan_tk` (
  `id` int NOT NULL AUTO_INCREMENT,
  `tahun` smallint DEFAULT NULL,
  `bulan` int DEFAULT NULL,
  `datetime` datetime DEFAULT NULL,
  `createby` int DEFAULT NULL,
  PRIMARY KEY (`id`) USING BTREE
) ENGINE=InnoDB AUTO_INCREMENT=84 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci ROW_FORMAT=DYNAMIC;
/*!40101 SET character_set_client = @saved_cs_client */;

LOCK TABLES `m_karyawan_tk` WRITE;
/*!40000 ALTER TABLE `m_karyawan_tk` DISABLE KEYS */;
INSERT INTO `m_karyawan_tk` VALUES (28,2023,3,NULL,NULL),(52,2023,11,NULL,NULL),(71,2023,2,NULL,NULL),(75,2023,12,NULL,NULL),(77,2023,6,NULL,NULL),(82,2023,7,NULL,NULL),(83,2023,1,NULL,NULL);
/*!40000 ALTER TABLE `m_karyawan_tk` ENABLE KEYS */;
UNLOCK TABLES;
DROP TABLE IF EXISTS `m_kehadiran`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `m_kehadiran` (
  `id` int NOT NULL AUTO_INCREMENT,
  `jenjang` int DEFAULT NULL,
  `jenis_jabatan` int DEFAULT NULL,
  `sertif` int DEFAULT NULL,
  `value` bigint DEFAULT NULL,
  `jabatan` int DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=33 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

LOCK TABLES `m_kehadiran` WRITE;
/*!40000 ALTER TABLE `m_kehadiran` DISABLE KEYS */;
INSERT INTO `m_kehadiran` VALUES (1,4,1,1,56000,NULL),(2,4,1,2,66000,NULL),(3,4,2,NULL,54000,NULL),(4,4,3,NULL,60000,10),(5,4,3,NULL,60000,11),(6,4,3,NULL,75000,12),(7,3,1,1,56000,NULL),(8,3,1,2,66000,NULL),(9,3,2,NULL,54000,NULL),(10,3,3,NULL,60000,10),(11,3,3,NULL,60000,11),(12,3,3,NULL,75000,12),(13,2,1,1,56000,NULL),(14,2,1,2,66000,NULL),(15,2,2,NULL,54000,NULL),(16,2,3,NULL,60000,10),(17,2,3,NULL,60000,11),(18,2,3,NULL,75000,12),(19,5,1,1,56000,NULL),(20,1,1,1,56000,NULL),(21,5,1,2,66000,NULL),(22,5,2,NULL,54000,NULL),(23,5,3,NULL,60000,10),(24,5,3,NULL,60000,11),(25,5,3,NULL,75000,12),(26,1,1,2,66000,NULL),(27,1,2,NULL,54000,NULL),(28,1,3,NULL,60000,10),(29,1,3,NULL,60000,11),(30,1,3,NULL,75000,12),(31,2,NULL,NULL,65500,7),(32,2,NULL,NULL,54500,6);
/*!40000 ALTER TABLE `m_kehadiran` ENABLE KEYS */;
UNLOCK TABLES;
DROP TABLE IF EXISTS `m_lembur`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `m_lembur` (
  `id` int NOT NULL AUTO_INCREMENT,
  `jenjang_id` int DEFAULT NULL,
  `jabatan_id` int DEFAULT NULL,
  `value_perjam` bigint DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

LOCK TABLES `m_lembur` WRITE;
/*!40000 ALTER TABLE `m_lembur` DISABLE KEYS */;
INSERT INTO `m_lembur` VALUES (1,4,NULL,13000),(2,2,NULL,13000),(3,3,NULL,13000),(4,5,NULL,13000),(5,1,NULL,13000);
/*!40000 ALTER TABLE `m_lembur` ENABLE KEYS */;
UNLOCK TABLES;
DROP TABLE IF EXISTS `m_penyesuaian`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `m_penyesuaian` (
  `id` int NOT NULL AUTO_INCREMENT,
  `bulan` int DEFAULT NULL,
  `tahun` int DEFAULT NULL,
  `c_by` int DEFAULT NULL,
  `datetime` datetime DEFAULT NULL,
  `import_file` text,
  PRIMARY KEY (`id`) USING BTREE
) ENGINE=InnoDB AUTO_INCREMENT=61 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

LOCK TABLES `m_penyesuaian` WRITE;
/*!40000 ALTER TABLE `m_penyesuaian` DISABLE KEYS */;
INSERT INTO `m_penyesuaian` VALUES (6,11,2023,31,'2023-02-14 04:02:59','Template Penyesuaian (1).xlsx'),(8,7,2023,31,'2023-02-14 04:39:24','Template Penyesuaian (3).xlsx'),(9,5,2023,31,'2023-02-14 06:41:47','Template Penyesuaian (4).xlsx'),(15,3,2023,31,'2023-02-14 06:54:42','Template Penyesuaian (6).xlsx'),(28,10,2023,31,'2023-02-14 07:11:55','Template Penyesuaian (2).xlsx'),(29,4,2023,31,'2023-02-14 07:14:01','Template Penyesuaian (9).xlsx'),(35,6,2023,31,'2023-02-14 07:19:00','Template Penyesuaian (2).xlsx'),(37,12,2023,31,'2023-02-14 07:28:33','Template Penyesuaian (12).xlsx'),(40,9,2023,NULL,'2023-02-17 04:19:01','penyesuaian TK(2).xlsx'),(41,8,2023,NULL,'2023-03-03 10:19:43','Template Penyesuaian (13).xlsx'),(52,2,2024,NULL,'2023-03-03 10:52:38','Template Penyesuaian (1).xlsx'),(58,1,2024,NULL,'2023-03-03 11:00:14','Template Penyesuaian(4).xlsx'),(60,1,2023,NULL,'2023-03-03 11:03:57','Template Penyesuaian(6).xlsx');
/*!40000 ALTER TABLE `m_penyesuaian` ENABLE KEYS */;
UNLOCK TABLES;
DROP TABLE IF EXISTS `m_piket`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `m_piket` (
  `id` int NOT NULL AUTO_INCREMENT,
  `jenjang` int DEFAULT NULL,
  `type_jabatan` int DEFAULT NULL,
  `jenis_sertif` int DEFAULT NULL,
  `value` bigint DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=18 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

LOCK TABLES `m_piket` WRITE;
/*!40000 ALTER TABLE `m_piket` DISABLE KEYS */;
INSERT INTO `m_piket` VALUES (1,4,1,1,7000),(2,4,1,2,8250),(3,5,1,1,7000),(4,5,1,2,8250),(5,1,1,1,7000),(6,1,1,2,8250),(7,2,1,1,7000),(8,2,1,2,8250),(9,3,1,1,7000),(10,3,1,2,8250),(11,4,2,NULL,8250),(13,4,3,NULL,5600),(14,2,2,NULL,8250),(15,3,2,NULL,8250),(16,5,2,NULL,8250),(17,1,2,NULL,8250);
/*!40000 ALTER TABLE `m_piket` ENABLE KEYS */;
UNLOCK TABLES;
DROP TABLE IF EXISTS `m_potongan`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `m_potongan` (
  `id` int NOT NULL AUTO_INCREMENT,
  `bulan` int DEFAULT NULL,
  `tahun` int DEFAULT NULL,
  `c_by` int DEFAULT NULL,
  `datetime` datetime DEFAULT NULL,
  `import_file` text,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

LOCK TABLES `m_potongan` WRITE;
/*!40000 ALTER TABLE `m_potongan` DISABLE KEYS */;
/*!40000 ALTER TABLE `m_potongan` ENABLE KEYS */;
UNLOCK TABLES;
DROP TABLE IF EXISTS `m_potongan_sd`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `m_potongan_sd` (
  `id` int NOT NULL AUTO_INCREMENT,
  `bulan` int DEFAULT NULL,
  `tahun` int DEFAULT NULL,
  `c_by` int DEFAULT NULL,
  `datetime` datetime DEFAULT NULL,
  `import_file` text,
  PRIMARY KEY (`id`) USING BTREE
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci ROW_FORMAT=DYNAMIC;
/*!40101 SET character_set_client = @saved_cs_client */;

LOCK TABLES `m_potongan_sd` WRITE;
/*!40000 ALTER TABLE `m_potongan_sd` DISABLE KEYS */;
INSERT INTO `m_potongan_sd` VALUES (1,3,NULL,-1,'2023-01-25 04:08:51','contoh.xlsx'),(2,3,NULL,-1,'2023-01-25 04:18:49','contoh(1).xlsx');
/*!40000 ALTER TABLE `m_potongan_sd` ENABLE KEYS */;
UNLOCK TABLES;
DROP TABLE IF EXISTS `m_potongan_sma`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `m_potongan_sma` (
  `id` int NOT NULL AUTO_INCREMENT,
  `bulan` int DEFAULT NULL,
  `tahun` int DEFAULT NULL,
  `c_by` int DEFAULT NULL,
  `datetime` datetime DEFAULT NULL,
  `import_file` text,
  PRIMARY KEY (`id`) USING BTREE
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci ROW_FORMAT=DYNAMIC;
/*!40101 SET character_set_client = @saved_cs_client */;

LOCK TABLES `m_potongan_sma` WRITE;
/*!40000 ALTER TABLE `m_potongan_sma` DISABLE KEYS */;
INSERT INTO `m_potongan_sma` VALUES (1,1,2023,-1,'2023-01-24 04:03:49',NULL),(2,4,2023,-1,'2023-01-24 04:07:21',NULL),(3,4,2023,-1,'2023-01-25 03:18:02',NULL),(4,3,2023,-1,'2023-01-25 04:20:14','contoh(2).xlsx');
/*!40000 ALTER TABLE `m_potongan_sma` ENABLE KEYS */;
UNLOCK TABLES;
DROP TABLE IF EXISTS `m_potongan_smk`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `m_potongan_smk` (
  `id` int NOT NULL AUTO_INCREMENT,
  `bulan` int DEFAULT NULL,
  `tahun` int DEFAULT NULL,
  `c_by` int DEFAULT NULL,
  `datetime` datetime DEFAULT NULL,
  `import_file` text,
  PRIMARY KEY (`id`) USING BTREE
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci ROW_FORMAT=DYNAMIC;
/*!40101 SET character_set_client = @saved_cs_client */;

LOCK TABLES `m_potongan_smk` WRITE;
/*!40000 ALTER TABLE `m_potongan_smk` DISABLE KEYS */;
INSERT INTO `m_potongan_smk` VALUES (1,4,2023,-1,'2023-01-25 07:09:34',NULL),(2,4,2023,-1,'2023-01-25 07:10:45',NULL),(3,4,2023,-1,'2023-01-25 07:11:08',NULL);
/*!40000 ALTER TABLE `m_potongan_smk` ENABLE KEYS */;
UNLOCK TABLES;
DROP TABLE IF EXISTS `m_potongan_smp`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `m_potongan_smp` (
  `id` int NOT NULL AUTO_INCREMENT,
  `bulan` int DEFAULT NULL,
  `tahun` int DEFAULT NULL,
  `c_by` int DEFAULT NULL,
  `datetime` datetime DEFAULT NULL,
  `import_file` text,
  PRIMARY KEY (`id`) USING BTREE
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci ROW_FORMAT=DYNAMIC;
/*!40101 SET character_set_client = @saved_cs_client */;

LOCK TABLES `m_potongan_smp` WRITE;
/*!40000 ALTER TABLE `m_potongan_smp` DISABLE KEYS */;
/*!40000 ALTER TABLE `m_potongan_smp` ENABLE KEYS */;
UNLOCK TABLES;
DROP TABLE IF EXISTS `m_pph21`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `m_pph21` (
  `id` int NOT NULL AUTO_INCREMENT,
  `unit` int DEFAULT NULL,
  `value1` decimal(20,6) DEFAULT NULL,
  `value2` decimal(20,6) DEFAULT NULL,
  `value3` decimal(20,6) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

LOCK TABLES `m_pph21` WRITE;
/*!40000 ALTER TABLE `m_pph21` DISABLE KEYS */;
INSERT INTO `m_pph21` VALUES (1,4,1.200000,0.050000,0.500000),(2,2,1.200000,0.050000,0.500000),(3,3,1.200000,0.050000,0.500000),(4,5,1.200000,0.050000,0.500000),(5,1,1.200000,0.050000,0.500000);
/*!40000 ALTER TABLE `m_pph21` ENABLE KEYS */;
UNLOCK TABLES;
DROP TABLE IF EXISTS `m_pulangcepat`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `m_pulangcepat` (
  `id` int NOT NULL AUTO_INCREMENT,
  `jenjang_id` int DEFAULT NULL,
  `jabatan_id` int DEFAULT NULL,
  `perjam` bigint DEFAULT NULL,
  `perhari` bigint DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

LOCK TABLES `m_pulangcepat` WRITE;
/*!40000 ALTER TABLE `m_pulangcepat` DISABLE KEYS */;
INSERT INTO `m_pulangcepat` VALUES (1,1,1,7000,20000),(2,1,2,3000,18000);
/*!40000 ALTER TABLE `m_pulangcepat` ENABLE KEYS */;
UNLOCK TABLES;
DROP TABLE IF EXISTS `m_reward`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `m_reward` (
  `id` int NOT NULL AUTO_INCREMENT,
  `jenjang` int DEFAULT NULL,
  `jabatan` int DEFAULT NULL,
  `min_jmlh_masuk` int DEFAULT NULL,
  `value` bigint DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=8 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

LOCK TABLES `m_reward` WRITE;
/*!40000 ALTER TABLE `m_reward` DISABLE KEYS */;
INSERT INTO `m_reward` VALUES (1,4,NULL,NULL,50000),(4,2,NULL,NULL,50000),(5,3,NULL,NULL,50000),(6,5,NULL,NULL,50000),(7,1,NULL,NULL,50000);
/*!40000 ALTER TABLE `m_reward` ENABLE KEYS */;
UNLOCK TABLES;
DROP TABLE IF EXISTS `m_sakit`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `m_sakit` (
  `id` int NOT NULL AUTO_INCREMENT,
  `jenjang_id` int DEFAULT NULL,
  `jabatan` int DEFAULT NULL,
  `perhari` bigint DEFAULT NULL,
  `perjam` bigint DEFAULT NULL,
  `sertif` int DEFAULT NULL,
  `type` int DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=8 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

LOCK TABLES `m_sakit` WRITE;
/*!40000 ALTER TABLE `m_sakit` DISABLE KEYS */;
INSERT INTO `m_sakit` VALUES (1,4,6,27250,3406,NULL,2),(2,4,8,NULL,6600,NULL,1),(3,4,9,NULL,7000,1,1),(4,4,9,NULL,8250,2,1),(5,4,11,30000,3750,NULL,3),(6,4,12,37500,4688,NULL,3),(7,4,10,30000,3750,NULL,3);
/*!40000 ALTER TABLE `m_sakit` ENABLE KEYS */;
UNLOCK TABLES;
DROP TABLE IF EXISTS `m_sd`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `m_sd` (
  `id` int NOT NULL AUTO_INCREMENT,
  `tahun` year DEFAULT NULL,
  `bulan` int DEFAULT NULL,
  `datetime` datetime DEFAULT NULL,
  `createby` int DEFAULT NULL,
  PRIMARY KEY (`id`) USING BTREE
) ENGINE=InnoDB AUTO_INCREMENT=270 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci ROW_FORMAT=DYNAMIC;
/*!40101 SET character_set_client = @saved_cs_client */;

LOCK TABLES `m_sd` WRITE;
/*!40000 ALTER TABLE `m_sd` DISABLE KEYS */;
INSERT INTO `m_sd` VALUES (248,2023,11,NULL,NULL),(254,2023,7,NULL,NULL),(256,2023,12,NULL,NULL),(257,2023,8,NULL,NULL),(258,2023,6,NULL,NULL),(269,2023,1,NULL,NULL);
/*!40000 ALTER TABLE `m_sd` ENABLE KEYS */;
UNLOCK TABLES;
DROP TABLE IF EXISTS `m_semeter`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `m_semeter` (
  `id` int NOT NULL AUTO_INCREMENT,
  `smtr` varchar(50) DEFAULT NULL,
  `bulan` int DEFAULT NULL,
  `detil_smtr` int DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=15 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

LOCK TABLES `m_semeter` WRITE;
/*!40000 ALTER TABLE `m_semeter` DISABLE KEYS */;
INSERT INTO `m_semeter` VALUES (2,'Genap',7,1),(3,'Genap',8,1),(4,'Genap',9,1),(5,'Genap',10,1),(6,'Genap',11,1),(7,'Genap',12,1),(8,'Ganjil',1,2),(9,'Ganjil',2,2),(10,'Ganjil',3,2),(11,'Ganjil',4,2),(12,'Ganjil',5,2),(14,'Ganjil',6,2);
/*!40000 ALTER TABLE `m_semeter` ENABLE KEYS */;
UNLOCK TABLES;
DROP TABLE IF EXISTS `m_slip_yayasan`;
/*!50001 DROP VIEW IF EXISTS `m_slip_yayasan`*/;
SET @saved_cs_client     = @@character_set_client;
/*!50503 SET character_set_client = utf8mb4 */;
/*!50001 CREATE VIEW `m_slip_yayasan` AS SELECT 
 1 AS `id`,
 1 AS `bulan`,
 1 AS `tahun`,
 1 AS `pegawai`,
 1 AS `total`,
 1 AS `id1`*/;
SET character_set_client = @saved_cs_client;
DROP TABLE IF EXISTS `m_sma`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `m_sma` (
  `id` int NOT NULL AUTO_INCREMENT,
  `tahun` int DEFAULT NULL,
  `bulan` int DEFAULT NULL,
  `datetime` datetime DEFAULT NULL,
  `createby` int DEFAULT NULL,
  PRIMARY KEY (`id`) USING BTREE
) ENGINE=InnoDB AUTO_INCREMENT=623 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci ROW_FORMAT=DYNAMIC;
/*!40101 SET character_set_client = @saved_cs_client */;

LOCK TABLES `m_sma` WRITE;
/*!40000 ALTER TABLE `m_sma` DISABLE KEYS */;
INSERT INTO `m_sma` VALUES (587,2023,12,NULL,NULL),(590,2023,11,NULL,NULL),(608,2023,7,NULL,NULL),(613,2023,2,NULL,NULL),(618,2023,6,NULL,NULL),(619,2023,8,NULL,NULL),(620,2024,1,NULL,NULL),(621,2024,2,NULL,NULL),(622,2023,1,NULL,NULL);
/*!40000 ALTER TABLE `m_sma` ENABLE KEYS */;
UNLOCK TABLES;
DROP TABLE IF EXISTS `m_smk`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `m_smk` (
  `id` int NOT NULL AUTO_INCREMENT,
  `tahun` year DEFAULT NULL,
  `bulan` int DEFAULT NULL,
  `datetime` datetime DEFAULT NULL,
  `createby` int DEFAULT NULL,
  PRIMARY KEY (`id`) USING BTREE
) ENGINE=InnoDB AUTO_INCREMENT=76 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci ROW_FORMAT=DYNAMIC;
/*!40101 SET character_set_client = @saved_cs_client */;

LOCK TABLES `m_smk` WRITE;
/*!40000 ALTER TABLE `m_smk` DISABLE KEYS */;
INSERT INTO `m_smk` VALUES (46,2023,2,NULL,NULL),(48,2023,11,NULL,NULL),(50,2023,3,NULL,NULL),(57,2023,7,NULL,NULL),(66,2023,6,NULL,NULL),(73,2023,12,NULL,NULL),(75,2023,1,NULL,NULL);
/*!40000 ALTER TABLE `m_smk` ENABLE KEYS */;
UNLOCK TABLES;
DROP TABLE IF EXISTS `m_smp`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `m_smp` (
  `id` int NOT NULL AUTO_INCREMENT,
  `tahun` year DEFAULT NULL,
  `bulan` int DEFAULT NULL,
  `datetime` datetime DEFAULT NULL,
  `createby` int DEFAULT NULL,
  PRIMARY KEY (`id`) USING BTREE
) ENGINE=InnoDB AUTO_INCREMENT=39 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci ROW_FORMAT=DYNAMIC;
/*!40101 SET character_set_client = @saved_cs_client */;

LOCK TABLES `m_smp` WRITE;
/*!40000 ALTER TABLE `m_smp` DISABLE KEYS */;
INSERT INTO `m_smp` VALUES (24,2023,11,NULL,NULL),(25,2023,6,NULL,NULL),(33,2023,8,NULL,NULL),(36,2023,12,NULL,NULL),(38,2023,1,NULL,NULL);
/*!40000 ALTER TABLE `m_smp` ENABLE KEYS */;
UNLOCK TABLES;
DROP TABLE IF EXISTS `m_tahun`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `m_tahun` (
  `id` int DEFAULT NULL,
  `tahun` int DEFAULT NULL,
  `no_urut` int DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

LOCK TABLES `m_tahun` WRITE;
/*!40000 ALTER TABLE `m_tahun` DISABLE KEYS */;
/*!40000 ALTER TABLE `m_tahun` ENABLE KEYS */;
UNLOCK TABLES;
DROP TABLE IF EXISTS `m_tidakhadir`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `m_tidakhadir` (
  `id` int NOT NULL AUTO_INCREMENT,
  `value` bigint DEFAULT NULL,
  `perjam_value` bigint DEFAULT NULL,
  `jabatan_id` int DEFAULT NULL,
  `jenjang_id` int DEFAULT NULL,
  `sertif` int DEFAULT NULL,
  `type` int DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=10 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

LOCK TABLES `m_tidakhadir` WRITE;
/*!40000 ALTER TABLE `m_tidakhadir` DISABLE KEYS */;
INSERT INTO `m_tidakhadir` VALUES (1,60000,7500,10,4,NULL,3),(2,75000,9375,12,4,NULL,3),(3,60000,7500,11,4,NULL,3),(4,NULL,14000,9,4,1,1),(5,NULL,16500,9,4,2,1),(6,NULL,13200,8,4,2,1),(7,54500,6813,6,4,NULL,2),(8,NULL,14000,5,4,1,1);
/*!40000 ALTER TABLE `m_tidakhadir` ENABLE KEYS */;
UNLOCK TABLES;
DROP TABLE IF EXISTS `m_tk`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `m_tk` (
  `id` int NOT NULL AUTO_INCREMENT,
  `tahun` year DEFAULT NULL,
  `bulan` int DEFAULT NULL,
  `datetime` datetime DEFAULT NULL,
  `createby` int DEFAULT NULL,
  PRIMARY KEY (`id`) USING BTREE
) ENGINE=InnoDB AUTO_INCREMENT=92 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci ROW_FORMAT=DYNAMIC;
/*!40101 SET character_set_client = @saved_cs_client */;

LOCK TABLES `m_tk` WRITE;
/*!40000 ALTER TABLE `m_tk` DISABLE KEYS */;
INSERT INTO `m_tk` VALUES (48,2023,3,NULL,NULL),(75,2023,2,NULL,NULL),(79,2023,12,NULL,NULL),(81,2023,6,NULL,NULL),(90,2023,7,NULL,NULL),(91,2023,1,NULL,NULL);
/*!40000 ALTER TABLE `m_tk` ENABLE KEYS */;
UNLOCK TABLES;
DROP TABLE IF EXISTS `m_tu_sd`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `m_tu_sd` (
  `id` int NOT NULL AUTO_INCREMENT,
  `tahun` year DEFAULT NULL,
  `bulan` int DEFAULT NULL,
  `datetime` datetime DEFAULT NULL,
  `createby` int DEFAULT NULL,
  PRIMARY KEY (`id`) USING BTREE
) ENGINE=InnoDB AUTO_INCREMENT=40 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci ROW_FORMAT=DYNAMIC;
/*!40101 SET character_set_client = @saved_cs_client */;

LOCK TABLES `m_tu_sd` WRITE;
/*!40000 ALTER TABLE `m_tu_sd` DISABLE KEYS */;
INSERT INTO `m_tu_sd` VALUES (21,2023,11,NULL,NULL),(24,2023,7,NULL,NULL),(26,2023,12,NULL,NULL),(27,2023,8,NULL,NULL),(28,2023,6,NULL,NULL),(39,2023,1,NULL,NULL);
/*!40000 ALTER TABLE `m_tu_sd` ENABLE KEYS */;
UNLOCK TABLES;
DROP TABLE IF EXISTS `m_tu_sma`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `m_tu_sma` (
  `id` int NOT NULL AUTO_INCREMENT,
  `tahun` year DEFAULT NULL,
  `bulan` int DEFAULT NULL,
  `datetime` datetime DEFAULT NULL,
  `createby` int DEFAULT NULL,
  PRIMARY KEY (`id`) USING BTREE
) ENGINE=InnoDB AUTO_INCREMENT=291 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci ROW_FORMAT=DYNAMIC;
/*!40101 SET character_set_client = @saved_cs_client */;

LOCK TABLES `m_tu_sma` WRITE;
/*!40000 ALTER TABLE `m_tu_sma` DISABLE KEYS */;
INSERT INTO `m_tu_sma` VALUES (261,2023,12,NULL,NULL),(264,2023,11,NULL,NULL),(276,2023,7,NULL,NULL),(281,2023,2,NULL,NULL),(286,2023,6,NULL,NULL),(287,2023,8,NULL,NULL),(288,2024,1,NULL,NULL),(289,2024,2,NULL,NULL),(290,2023,1,NULL,NULL);
/*!40000 ALTER TABLE `m_tu_sma` ENABLE KEYS */;
UNLOCK TABLES;
DROP TABLE IF EXISTS `m_tu_smk`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `m_tu_smk` (
  `id` int NOT NULL AUTO_INCREMENT,
  `tahun` year DEFAULT NULL,
  `bulan` int DEFAULT NULL,
  `datetime` datetime DEFAULT NULL,
  `createby` int DEFAULT NULL,
  PRIMARY KEY (`id`) USING BTREE
) ENGINE=InnoDB AUTO_INCREMENT=46 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci ROW_FORMAT=DYNAMIC;
/*!40101 SET character_set_client = @saved_cs_client */;

LOCK TABLES `m_tu_smk` WRITE;
/*!40000 ALTER TABLE `m_tu_smk` DISABLE KEYS */;
INSERT INTO `m_tu_smk` VALUES (25,2023,11,NULL,NULL),(27,2023,3,NULL,NULL),(30,2023,7,NULL,NULL),(38,2023,6,NULL,NULL),(43,2023,12,NULL,NULL),(45,2023,1,NULL,NULL);
/*!40000 ALTER TABLE `m_tu_smk` ENABLE KEYS */;
UNLOCK TABLES;
DROP TABLE IF EXISTS `m_tu_smp`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `m_tu_smp` (
  `id` int NOT NULL AUTO_INCREMENT,
  `tahun` year DEFAULT NULL,
  `bulan` int DEFAULT NULL,
  `datetime` datetime DEFAULT NULL,
  `createby` int DEFAULT NULL,
  PRIMARY KEY (`id`) USING BTREE
) ENGINE=InnoDB AUTO_INCREMENT=32 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci ROW_FORMAT=DYNAMIC;
/*!40101 SET character_set_client = @saved_cs_client */;

LOCK TABLES `m_tu_smp` WRITE;
/*!40000 ALTER TABLE `m_tu_smp` DISABLE KEYS */;
INSERT INTO `m_tu_smp` VALUES (17,2023,11,NULL,NULL),(18,2023,6,NULL,NULL),(26,2023,8,NULL,NULL),(29,2023,12,NULL,NULL),(31,2023,1,NULL,NULL);
/*!40000 ALTER TABLE `m_tu_smp` ENABLE KEYS */;
UNLOCK TABLES;
DROP TABLE IF EXISTS `m_tu_tk`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `m_tu_tk` (
  `id` int NOT NULL AUTO_INCREMENT,
  `tahun` year DEFAULT NULL,
  `bulan` int DEFAULT NULL,
  `datetime` datetime DEFAULT NULL,
  `createby` int DEFAULT NULL,
  PRIMARY KEY (`id`) USING BTREE
) ENGINE=InnoDB AUTO_INCREMENT=55 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci ROW_FORMAT=DYNAMIC;
/*!40101 SET character_set_client = @saved_cs_client */;

LOCK TABLES `m_tu_tk` WRITE;
/*!40000 ALTER TABLE `m_tu_tk` DISABLE KEYS */;
INSERT INTO `m_tu_tk` VALUES (39,2023,2,NULL,NULL),(43,2023,12,NULL,NULL),(45,2023,6,NULL,NULL),(53,2023,7,NULL,NULL),(54,2023,1,NULL,NULL);
/*!40000 ALTER TABLE `m_tu_tk` ENABLE KEYS */;
UNLOCK TABLES;
DROP TABLE IF EXISTS `m_yayasan`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `m_yayasan` (
  `id` int NOT NULL AUTO_INCREMENT,
  `bulan` int DEFAULT NULL,
  `tahun` int DEFAULT NULL,
  `datetime` datetime DEFAULT NULL,
  `import_file` text CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci,
  PRIMARY KEY (`id`) USING BTREE
) ENGINE=InnoDB AUTO_INCREMENT=24 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

LOCK TABLES `m_yayasan` WRITE;
/*!40000 ALTER TABLE `m_yayasan` DISABLE KEYS */;
INSERT INTO `m_yayasan` VALUES (20,2,2023,'2023-03-01 07:27:01','Template Pengurus Yayasan(10).xlsx'),(21,4,2023,'2023-03-01 07:29:11','Template Pengurus Yayasan(11).xlsx'),(22,1,2023,'2023-03-01 07:29:40','Template Pengurus Yayasan(12).xlsx'),(23,1,2023,'2023-03-01 08:00:05','Template Pengurus Yayasan(13).xlsx');
/*!40000 ALTER TABLE `m_yayasan` ENABLE KEYS */;
UNLOCK TABLES;
DROP TABLE IF EXISTS `mpendidikan`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `mpendidikan` (
  `id` int NOT NULL AUTO_INCREMENT,
  `name` varchar(50) NOT NULL DEFAULT '0',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=11 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

LOCK TABLES `mpendidikan` WRITE;
/*!40000 ALTER TABLE `mpendidikan` DISABLE KEYS */;
INSERT INTO `mpendidikan` VALUES (1,'SD'),(2,'SMP'),(3,'SMA'),(4,'SMK'),(5,'D1'),(6,'D2'),(7,'D3'),(8,'S1'),(9,'S2'),(10,'S3');
/*!40000 ALTER TABLE `mpendidikan` ENABLE KEYS */;
UNLOCK TABLES;
DROP TABLE IF EXISTS `peg_dokumen`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `peg_dokumen` (
  `id` int NOT NULL AUTO_INCREMENT,
  `pid` int DEFAULT NULL,
  `nama_dokumen` varchar(255) DEFAULT NULL,
  `file_dokumen` varchar(255) DEFAULT NULL,
  `keterangan` varchar(255) DEFAULT NULL,
  `c_date` datetime DEFAULT NULL,
  `u_date` datetime DEFAULT NULL,
  `c_by` int DEFAULT NULL,
  `u_by` int DEFAULT NULL,
  PRIMARY KEY (`id`) USING BTREE
) ENGINE=InnoDB DEFAULT CHARSET=latin1 ROW_FORMAT=DYNAMIC;
/*!40101 SET character_set_client = @saved_cs_client */;

LOCK TABLES `peg_dokumen` WRITE;
/*!40000 ALTER TABLE `peg_dokumen` DISABLE KEYS */;
/*!40000 ALTER TABLE `peg_dokumen` ENABLE KEYS */;
UNLOCK TABLES;
DROP TABLE IF EXISTS `peg_keluarga`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `peg_keluarga` (
  `id` int NOT NULL AUTO_INCREMENT,
  `pid` int DEFAULT NULL,
  `nama` varchar(255) DEFAULT NULL,
  `hp` varchar(255) DEFAULT NULL,
  `hubungan` varchar(255) DEFAULT NULL,
  `tgl_lahir` datetime DEFAULT NULL,
  `keterangan` varchar(500) DEFAULT NULL,
  `jen_kel` varchar(255) DEFAULT NULL,
  PRIMARY KEY (`id`) USING BTREE
) ENGINE=InnoDB DEFAULT CHARSET=latin1 ROW_FORMAT=DYNAMIC;
/*!40101 SET character_set_client = @saved_cs_client */;

LOCK TABLES `peg_keluarga` WRITE;
/*!40000 ALTER TABLE `peg_keluarga` DISABLE KEYS */;
/*!40000 ALTER TABLE `peg_keluarga` ENABLE KEYS */;
UNLOCK TABLES;
DROP TABLE IF EXISTS `peg_skill`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `peg_skill` (
  `id` int NOT NULL AUTO_INCREMENT,
  `pid` int DEFAULT NULL,
  `keahlian` varchar(255) DEFAULT NULL,
  `tingkat` varchar(255) DEFAULT NULL,
  `bukti` varchar(255) DEFAULT NULL,
  `keterangan` varchar(255) DEFAULT NULL,
  `c_date` datetime DEFAULT NULL,
  `u_date` datetime DEFAULT NULL,
  `c_by` int DEFAULT NULL,
  `u_by` int DEFAULT NULL,
  PRIMARY KEY (`id`) USING BTREE
) ENGINE=InnoDB DEFAULT CHARSET=latin1 ROW_FORMAT=DYNAMIC;
/*!40101 SET character_set_client = @saved_cs_client */;

LOCK TABLES `peg_skill` WRITE;
/*!40000 ALTER TABLE `peg_skill` DISABLE KEYS */;
/*!40000 ALTER TABLE `peg_skill` ENABLE KEYS */;
UNLOCK TABLES;
DROP TABLE IF EXISTS `pegawai`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `pegawai` (
  `id` int NOT NULL AUTO_INCREMENT,
  `pid` int DEFAULT NULL,
  `nama` varchar(255) DEFAULT NULL,
  `alamat` varchar(255) DEFAULT NULL,
  `email` varchar(255) DEFAULT NULL,
  `wa` varchar(255) DEFAULT NULL,
  `hp` varchar(255) DEFAULT NULL,
  `tgllahir` date DEFAULT NULL,
  `nip` varchar(50) DEFAULT NULL,
  `rekbank` varchar(255) DEFAULT NULL,
  `pendidikan` int DEFAULT NULL,
  `jurusan` varchar(50) DEFAULT NULL,
  `agama` varchar(20) DEFAULT NULL,
  `jenkel` varchar(20) DEFAULT NULL,
  `status` varchar(20) DEFAULT NULL,
  `foto` varchar(255) DEFAULT NULL,
  `file_cv` varchar(255) DEFAULT NULL,
  `jabatan` int DEFAULT NULL,
  `mulai_bekerja` year DEFAULT NULL,
  `keterangan` varchar(255) DEFAULT NULL,
  `username` varchar(255) DEFAULT NULL,
  `password` varchar(255) DEFAULT NULL,
  `level` int DEFAULT '1',
  `aktif` tinyint DEFAULT '1',
  `jenjang_id` int DEFAULT NULL,
  `type` int DEFAULT NULL,
  `sertif` int DEFAULT NULL,
  `tambahan` int DEFAULT NULL,
  `periode_jabatan` int DEFAULT NULL,
  `lama_kerja` int DEFAULT NULL,
  `status_peg` int DEFAULT NULL,
  `jjm` int DEFAULT NULL,
  `kehadiran` int DEFAULT NULL,
  `status_pekerjaan` int DEFAULT NULL,
  `status_npwp` int DEFAULT NULL,
  `bpjs_kesehatan` int DEFAULT NULL,
  PRIMARY KEY (`id`) USING BTREE
) ENGINE=InnoDB AUTO_INCREMENT=210 DEFAULT CHARSET=latin1 ROW_FORMAT=DYNAMIC;
/*!40101 SET character_set_client = @saved_cs_client */;

LOCK TABLES `pegawai` WRITE;
/*!40000 ALTER TABLE `pegawai` DISABLE KEYS */;
INSERT INTO `pegawai` VALUES (9,NULL,'ALIFIATUL FAUZIAH, S.PD','Jl. Wonosari no 18, Pegiriab, semampir \r\n','Alifiatul@demo.com','','','1999-11-20','','',NULL,NULL,'islam','Wanita',NULL,NULL,NULL,NULL,2023,NULL,'ppdb','123456',1,1,2,1,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL),(10,NULL,'IRMA SELVIANTI, M.PD','Gilang RT. 07 RW.02 Ds. Taman, Sda\r\n','Irma@demo.com','','','1992-09-20','3515137009920000','',NULL,NULL,'islam','Wanita',NULL,NULL,NULL,NULL,2023,NULL,'Irma@demo.com','123456',1,1,2,3,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL),(11,NULL,'NUR FAJRIYATUL MUNAWAROH, M.PD','3578104305940005Medokan kampung, RT.001, RW.002\r\n','Fajriya@demo.com','','','1994-05-03','3578104305940005','',NULL,NULL,'islam','Wanita',NULL,NULL,NULL,NULL,2023,NULL,'Fajriya@demo.com','123456',1,1,2,1,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL),(12,NULL,'CHUSNATUL HASANAH, S.PD','Dinoyo 9/ 3-A RT. 02 RW.05\r\n','Chusnatul@demo.com','','','1994-02-03','3527074302940001','',NULL,NULL,'islam','Wanita',NULL,NULL,NULL,NULL,2023,NULL,'Chusnatul@demo.com','123456',1,1,2,1,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL),(13,NULL,'SITI AMINAH. S.PD','Kedung Cowek V/16\r\n','Aminah@demo.com','','','1993-08-13','3578295308930001','',NULL,NULL,'islam','Wanita',NULL,NULL,NULL,NULL,2023,NULL,'Aminah@demo.com','123456',1,1,2,1,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL),(14,NULL,'ANIA SULISTYAWATI, S.PD','','Ania@demo.com','','','1994-02-01','3509244401940005','',NULL,NULL,'islam','Wanita',NULL,NULL,NULL,NULL,2023,NULL,'Ania@demo.com','123456',1,1,2,1,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL),(15,NULL,'NOVIRHA AGISTANTIA, S.PD','Tandes Kidul Gg 4 No.30\r\n','Novirha@demo.com','','','1993-11-26','3578146611930002','',NULL,NULL,'islam','Wanita',NULL,NULL,NULL,NULL,2023,NULL,'Novirha@demo.com','123456',1,1,2,1,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL),(16,NULL,'CHAYATUN NUCHUS, S.PD','Sejo RT.02 RW.03, Pasuruan\r\n','Nuchus@demo.com','','','1994-11-10','3514125009940001','',NULL,NULL,'islam','Wanita',NULL,NULL,NULL,NULL,2023,NULL,'Nuchus@demo.com','123456',1,1,2,1,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL),(17,NULL,'YOSSY MULIYANA SARI, S.PD','Sidotopo Wetan Baru 1A no 22\r\n','Yossy@demo.com','','','1995-04-20','3578176004950002','',NULL,NULL,'islam','Wanita',NULL,NULL,NULL,NULL,2023,NULL,'Yossy@demo.com','123456',1,1,2,1,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL),(18,NULL,'WAAHIDUN PUTRI AZIS, S.PD','Setro Baru Utara Gg. 4 No.28,\r\n','Waahidun@demo.com','','','1996-12-13','3578105312960004','',NULL,NULL,'islam','Wanita',NULL,NULL,NULL,NULL,2023,NULL,'Waahidun@demo.com','123456',1,1,2,1,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL),(19,NULL,'ERLINDA ROCHMATIN, S,PD','Dukuh Setro II Gg.2 No.3\r\n','Erlinda@demo.com','','','2023-01-13','3578104910950005','',NULL,NULL,'islam','Wanita',NULL,NULL,NULL,NULL,2023,NULL,'Erlinda@demo.com','123456',1,1,2,1,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL),(20,NULL,'JAZILATUL KHI?MIYAH, S.PD','Kapas Baru Gg 6 No 42\r\n','Jazilatul@demo.com','','','1995-07-21','3515186107950002','',NULL,NULL,'islam','Wanita',NULL,NULL,NULL,NULL,2023,NULL,'Jazilatul@demo.com','123456',1,1,2,1,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL),(21,NULL,'FADILA TARWIYAH ITSNAINI, S.PD','Jl. Pogot Jaya Gg II No. 18 \r\n','Fadila@demo.com','','','1993-05-31','3578177105930003','',NULL,NULL,'islam','Wanita',NULL,NULL,NULL,NULL,2023,NULL,'Fadila@demo.com','123456',1,1,2,1,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL),(22,NULL,'PAVLINA VIDIA SARI, S.PD','Jangur RT/RW 001/002, Lamongan\r\n','Pavlina@demo.com','','','1996-07-31','3524067107960001','',NULL,NULL,'islam','Wanita',NULL,NULL,NULL,NULL,2023,NULL,'Pavlina@demo.com','123456',1,1,2,1,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL),(23,NULL,'FIKA CITRA WIDARISMA, S.PD','Kupang Gunung Barat 4/58\r\n','Fika@demo.com','','','1997-07-30','3578067007970005','',NULL,NULL,'islam','Wanita',NULL,NULL,NULL,NULL,2023,NULL,'Fika@demo.com','123456',1,1,2,1,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL),(24,NULL,'NELLA TIKA ANGGRAINI,S.PD','Medaan Ayu  Utara 12/37\r\n','Nella@demo.com','','','1996-09-21','3578036109960001','',NULL,NULL,'islam','Wanita',NULL,NULL,NULL,NULL,2023,NULL,'Nella@demo.com','123456',1,1,2,1,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL),(25,NULL,'JANNATUL FIRDA PRAMAISWARI., S.PD','Jl. Benteng 17 b Surabaya\r\n','Jannatul@demo.com','','','1998-10-11','3578125110980001','',NULL,NULL,'islam','Wanita',NULL,NULL,NULL,NULL,2023,NULL,'Jannatul@demo.com','123456',1,1,2,1,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL),(26,NULL,'NUR AFNI AULIYAH, S.PD','Jl. Ploso VII No. 27 Sirabaya\r\n','Afni@demo.com','','','1998-12-10','3578105012980007','',NULL,NULL,'islam','Wanita',NULL,NULL,NULL,NULL,2023,NULL,'Afni@demo.com','123456',1,1,2,1,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL),(27,NULL,'IMTIHANA ROSYIDAH, S.PD','Jl. Sumur Banteng RT.10 RW.03 Ds. Lowayu\r\n','Imtihana@demo.com','','','1999-07-02','3525014207980001','',NULL,NULL,'islam','Wanita',NULL,NULL,NULL,NULL,2023,NULL,'Imtihana@demo.com','123456',1,1,2,1,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL),(28,NULL,'INDI RIZKA AISYI, S.PD','Jl. Bonowati 2/1, Surabaya\r\n','Indi@demo.com','','','1999-03-15','3578115503990001','',NULL,NULL,'islam','Wanita',NULL,NULL,NULL,NULL,2023,NULL,'Indi@demo.com','123456',1,1,2,1,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL),(29,NULL,'FAIQOTUL AINIYAH, S.PD','Jl. Kol. Sugiono Pandean III/41, Sidoarjo\r\n','Faiqotul@demo.com','','','1995-11-04','3515186304950002','',NULL,NULL,'islam','Wanita',NULL,NULL,NULL,NULL,2023,NULL,'Faiqotul@demo.com','123456',1,1,2,1,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL),(30,NULL,'NUR MUFIDATUL CHOIRIYAH, S.PD','Ds. Wilayut RT. 16 RW. 04 Sidoarjo\r\n','Choiriyah@demo.com','','','1993-09-09','3515144909930001','',NULL,NULL,'islam','Wanita',NULL,NULL,NULL,NULL,2023,NULL,'Choiriyah@demo.com','123456',1,1,2,1,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL),(31,NULL,'ACHMAD FAHMY, M.PD','Jl. Dupak Rukun 62 Surabaya\r\n','Fahmy@demo.com','','','1991-12-31','3514083112910001','',NULL,NULL,'islam','Pria',NULL,NULL,NULL,NULL,2023,NULL,'Fahmy@demo.com','123456',1,1,2,1,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL),(32,NULL,'ULIL ABSOR, M.PD','Dukuh Bulak Banteng Sekolahan 9A no.36\r\n','Ulil@demo.com','','','1995-09-09','3515040909950002','',NULL,NULL,'islam','Pria',NULL,NULL,NULL,NULL,2023,NULL,'Ulil@demo.com','123456',1,1,2,1,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL),(33,NULL,'ANDI SUWANDI, S, PD','Jl. Wonokusumo Jaya 1/100, Semampir\r\n','Andi@demo.com','','','1992-12-20','3527092012920007','',NULL,NULL,'islam','Pria',NULL,NULL,NULL,NULL,2023,NULL,'Andi@demo.com','123456',1,1,2,1,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL),(34,NULL,'LINDAH LANASARI, S.PD','Tambak Laban 34-A, Rt. 08, Rw. 03\r\n','Lindah@demo.com','','','1996-06-14','3578115406960003','',NULL,NULL,'islam','Wanita',NULL,NULL,NULL,NULL,2023,NULL,'Lindah@demo.com','123456',1,1,2,1,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL),(35,NULL,'ST. FATIMAH RIYANA, S.PD','Desa Teja Timur Kec Pamekasan\r\n','Riyana@demo.com','','','1997-06-14','3527045406970006','',NULL,NULL,'islam','Wanita',NULL,NULL,NULL,NULL,2023,NULL,'Riyana@demo.com','123456',1,1,2,1,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL),(36,NULL,'IVONE YULIANTI, S.PD','Jl. Manyar Dukuh 104, Rt. 08, Rw. 03, \r\n','Ivone@demo.com','','','1996-07-02','3573034207960003','',NULL,NULL,'islam','Wanita',NULL,NULL,NULL,NULL,2023,NULL,'Ivone@demo.com','123456',1,1,2,1,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL),(37,NULL,'HALIMATUS SYA&#039;DIYAH, S.PD','Jl. Bulak Setro 3 no 6, Rt. 01, Rw. 05, Bulak\r\n','Halimatus@demo.com','','','2000-09-20','3578296009000001','',NULL,NULL,'islam','Wanita',NULL,NULL,NULL,NULL,2023,NULL,'Halimatus@demo.com','123456',1,1,2,1,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL),(38,NULL,'ANIS DWI SETYANI, S.KOM','Tuwowo 3e no.2','Anis@demo.com','','','1999-05-18','357810580590010','',NULL,NULL,'islam','Wanita',NULL,NULL,NULL,NULL,2023,NULL,'Anis@demo.com','123456',1,1,2,2,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL),(39,NULL,'Dra. NINING PARANTIANINGSIH','Jl. Kedinding Lor Raflesia 1 No. 3','nparantianingsih@gmail.com','081336449249','081336449249','2023-01-16','196512051993070226','',NULL,NULL,'islam','Wanita',NULL,NULL,NULL,NULL,2023,NULL,'nparantianingsih@gmail.com','123456',1,1,3,1,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL),(40,NULL,'KUNCAHYANING FITRIA SANTOSO, M.Pd.','Jl. Pacar Keling 2/77','zaicha.ria22@gmail.com','083831106386','083831106386','2023-01-18','199202222015070546','',NULL,NULL,'islam','Wanita',NULL,NULL,NULL,NULL,2023,NULL,'zaicha.ria22@gmail.com','123456',1,1,3,1,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL),(41,NULL,'AINUL YAQIN, S.Si.','Jl. Bulak Banteng Baru Gg Mawar No. 15 Surabaya','ainulyaqinpwh1@gmail.com','085655815700','085655815700','2023-01-18','198008252004070404','',NULL,NULL,'islam','Pria',NULL,NULL,NULL,NULL,2023,NULL,'ainulyaqinpwh1@gmail.com','123456',1,1,3,1,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL),(42,NULL,'TAUFIQ HIDAYAT, S.Si.','Jl. Kapas Baru 2/106','taufiqkur29@gmail.com','085648029960','085648029960','2023-01-16','198306292008070448','',NULL,NULL,'islam','Pria',NULL,NULL,NULL,NULL,2023,NULL,'taufiqkur29@gmail.com','123456',1,1,3,1,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL),(43,NULL,'CATTRI SIGIT WIDYASTUTI, S.Pd.','JL. Margodadi VI/15','cattrisigwh@yahoo.com','082140909027','082140909027','2023-01-18','198011212007070433','',NULL,NULL,'islam','Wanita',NULL,NULL,NULL,NULL,2023,NULL,'cattrisigwh@yahoo.com','123456',1,1,3,1,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL),(44,NULL,'H. ABDUL HADI, S.Pd.I','JL. Sidorukun 1 no. 123','abdhadipwh1@gmail.com','081332938304','081332938304','2023-01-16','195508061997070291','',NULL,NULL,'islam','Pria',NULL,NULL,NULL,NULL,2023,NULL,'abdhadipwh1@gmail.com','123456',1,1,3,1,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL),(45,NULL,'H. ACHMAD FADLAN, S.Ag.','Jl. Sidesermo Dalam no. 16','ahmadfadlan271@gmail.com','085855581945','085855581945','2023-01-18','196402131995070258','',NULL,NULL,'islam','Pria',NULL,NULL,NULL,NULL,2023,NULL,'ahmadfadlan271@gmail.com','123456',1,1,3,1,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL),(46,NULL,'AKHMAD FAUZI, S.Pd.I.','JL. Platuk Baru IA/71A','caica7915@gmail.com','089520164531','089520164531','2023-01-18','197905112010070338','',NULL,NULL,'islam','Pria',NULL,NULL,NULL,NULL,2023,NULL,'caica7915@gmail.com','123456',1,1,3,1,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL),(47,NULL,'AHMAD SUWAIFIE, S.H.','Jl. Ngelom II/15 Taman','ifie81@yahoo.com','085648910344','085648910344','2023-01-18','198111252006070423','',NULL,NULL,'islam','Pria',NULL,NULL,NULL,NULL,2023,NULL,'ifie81@yahoo.com','123456',1,1,3,1,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL),(48,NULL,'ALIP NURFAIZAH, S.Pd.','PERUM GRAHA MUTIARA INDAH A11/05','aliefnurfaizah@gmail.com','081330455277','081330455277','2023-01-18','198402172007070436','',NULL,NULL,'islam','Wanita',NULL,NULL,NULL,NULL,2023,NULL,'aliefnurfaizah@gmail.com','123456',1,1,3,1,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL),(49,NULL,'ANNA LATIFAH, S.Pd.','JL. Randu Agung III/55','annalatifah45@gmail.com','081235747783','081235747783','2023-01-18','197503091998070251','',NULL,NULL,'islam','Wanita',NULL,NULL,NULL,NULL,2023,NULL,'annalatifah45@gmail.com','123456',1,1,3,1,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL),(50,NULL,'ASKUR, S.Pd. M.Pd.I.','JL. Tambak Wedi Barat 5-E  No. 45','askurdpkwh@gmail.com','','','2023-01-16','','',NULL,NULL,'islam','Pria',NULL,NULL,NULL,NULL,2023,NULL,'askurdpkwh@gmail.com','123456',1,1,3,1,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL),(51,NULL,'AULIA ZULFIKAR, S.Pd.','Jl. Wonorejo I/1D','auliazulfikar1004@gmail.com','089531900475','089531900475','2023-01-18','198304102006070420','',NULL,NULL,'islam','Pria',NULL,NULL,NULL,NULL,2023,NULL,'auliazulfikar1004@gmail.com','123456',1,1,3,1,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL),(52,NULL,'CHOIRIYAH, S.Pd.','Jl. Bulak Rukem 3C/4','choiriyahspd3@gmail.com','082131841556','082131841556','2023-01-16','197002261998070248','',NULL,NULL,'islam','Wanita',NULL,NULL,NULL,NULL,2023,NULL,'choiriyahspd3@gmail.com','123456',1,1,3,1,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL),(53,NULL,'CHOIRUR ROBIAH, S.Psi.','JL. SIDOMULYO 2-E /10- B','choirurrobiah989@gmail.com','085806500168','085806500168','2023-01-18','198411252010070486','',NULL,NULL,'islam','Wanita',NULL,NULL,NULL,NULL,2023,NULL,'choirurrobiah989@gmail.com','123456',1,1,3,1,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL),(54,NULL,'DWI ISTRIANA SUWITARINI, S.Psi.','Jl. Tenggumung Karya Lor 83','dwiistriana11@gmail.com','08813584344','08813584344','2023-01-18','197404241999070326','',NULL,NULL,'islam','Wanita',NULL,NULL,NULL,NULL,2023,NULL,'dwiistriana11@gmail.com','123456',1,1,3,1,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL),(55,NULL,'GANDUNG SUPRI HARTOYO, S.Pd.','Jl. Gading 1/23','gandungwachidhasyim@gmail.com','083856926004','083856926004','2023-01-16','196709081999070325','',NULL,NULL,'islam','Pria',NULL,NULL,NULL,NULL,2023,NULL,'gandungwachidhasyim@gmail.com','123456',1,1,3,1,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL),(56,NULL,'GATOT SUGIANTO, S.Pd.','Jl. Rangkah VII/70-b','smpwachidhasyim@yahoo.com','083830754144','083830754144','2023-01-18','197612261997070286','',NULL,NULL,'islam','Pria',NULL,NULL,NULL,NULL,2023,NULL,'smpwachidhasyim@yahoo.com','123456',1,1,3,1,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL),(57,NULL,'HUSNUL KHOTIMAH, S.Or.','Jl. Bumiarjo 5/56B','chusnulkhotimwh@yahoo.com','85732149029','85732149029','2023-01-18','199201062014070526','',NULL,NULL,'islam','Wanita',NULL,NULL,NULL,NULL,2023,NULL,'chusnulkhotimwh@yahoo.com','123456',1,1,3,1,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL),(58,NULL,'SITTY CHOLIFAH','DUKUH SETRO RAWASAN 5/12','ifasitty@gmail.com','087856644482','087856644482','1989-03-05','198903052016070583','',NULL,NULL,'islam','Wanita',NULL,NULL,NULL,NULL,2023,NULL,'ifasitty@gmail.com','123456',1,1,3,3,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL),(59,NULL,'Drs. KUNTO BUDI WARSONO','Jl. Tenggumung Wetan Gang Salak No 5','KUNTOBW@GMAIL.COM','081515022918','081515022918','2023-01-16','196208291986070105','',NULL,NULL,'islam','Pria',NULL,NULL,NULL,NULL,2023,NULL,'KUNTOBW@GMAIL.COM','123456',1,1,3,1,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL),(60,NULL,'WIWIN SUSILOWATI','JATIPURWO 7/25','wiwiensusilowati732@gmail.com','085852270773','085852270773','1974-03-30','197403301995070267','',NULL,NULL,'islam','Wanita',NULL,NULL,NULL,NULL,2023,NULL,'wiwiensusilowati732@gmail.com','123456',1,1,3,3,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL),(61,NULL,'LUTFIYAH KUSUMA','PANDEGILING 4/11','lutfiyahk7@gmail.com','085808238501','085808238501','2023-01-13','198202262006070479','',NULL,NULL,'islam','Wanita',NULL,NULL,NULL,NULL,2023,NULL,'lutfiyahk7@gmail.com','123456',1,1,3,3,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL),(62,NULL,'IVA VITYANA','DUKUH BULAK BANTENG SUROPATI III NO. 4 SURABAYA','ivavityana12@gmail.com','081282976805','081282976805','1972-02-08','197202081991070203','',NULL,NULL,'islam','Wanita',NULL,NULL,NULL,NULL,2023,NULL,'ivavityana12@gmail.com','123456',1,1,3,3,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL),(63,NULL,'NURUL CHOLIDAH','PLEMAHAN 6/11','rulbams@gmail.com','087779998470','087779998470','1975-12-21','197512211995070268','',NULL,NULL,'islam','Wanita',NULL,NULL,NULL,NULL,2023,NULL,'rulbams@gmail.com','123456',1,1,3,3,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL),(64,NULL,'Dra. Hj. KUSTANTRI NURWATI','JL. Jogoloyo Besar A No 32','kustantrinurwati12@gmail.com','083130037637','083130037637','2023-01-16','196512271993070227','',NULL,NULL,'islam','Wanita',NULL,NULL,NULL,NULL,2023,NULL,'kustantrinurwati12@gmail.com','123456',1,1,3,1,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL),(65,NULL,'MOCH ZAINUL ARIFIN, SE.','JL. Margodadi III No 41','zaimazing@gmail.com','085755809448','085755809448','2023-01-18','197803282006070271','',NULL,NULL,'islam','Pria',NULL,NULL,NULL,NULL,2023,NULL,'zaimazing@gmail.com','123456',1,1,3,1,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL),(66,NULL,'NUR HAYATI, S.Ag.','Jl. Rungkut Tengah III No 3','qcctc@sby.oas.co.id','081938226575','081938226575','2023-01-18','197501302000070339','',NULL,NULL,'islam','Wanita',NULL,NULL,NULL,NULL,2023,NULL,'qcctc@sby.oas.co.id','123456',1,1,3,1,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL),(67,NULL,'NUR SUCI INDAH UTAMI, S.SI.','JL. BULAK BANTENG LOR BHINEKA 8/49','nsuci13@gmail.com','85732821511','85732821511','2023-01-18','198610132011070497','',NULL,NULL,'islam','Wanita',NULL,NULL,NULL,NULL,2023,NULL,'nsuci13@gmail.com','123456',1,1,3,1,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL),(68,NULL,'NURIL FARAHANI, S.Si.','JL. Sidokapasan V/18','nurilfarahani@yahoo.co.id','082141287748','082141287748','2023-01-18','198104162007070343','',NULL,NULL,'islam','Wanita',NULL,NULL,NULL,NULL,2023,NULL,'nurilfarahani@yahoo.co.id','123456',1,1,3,1,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL),(69,NULL,'NURUL HIDAYAT, S.Pd.I.','JL. Rangkah Buntu 2/16','nurulhidayatwh@yahoo.com','085850087567','085850087567','2023-01-16','196705282012070509','',NULL,NULL,'islam','Pria',NULL,NULL,NULL,NULL,2023,NULL,'nurulhidayatwh@yahoo.com','123456',1,1,3,1,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL),(70,NULL,'NURULITA, S.Si.','JL. Tempurejo V/7','nurulitanurulita7@gmail.com','081249805734','081249805734','2023-01-18','197608042004070398','',NULL,NULL,'islam','Wanita',NULL,NULL,NULL,NULL,2023,NULL,'nurulitanurulita7@gmail.com','123456',1,1,3,1,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL),(71,NULL,'PAMUJI, S.Pd.','JL. Kedinding Lor Kemuning I/35','pamudjipwh@yahoo.com','081703413112','081703413112','2023-01-16','196606072001070132','',NULL,NULL,'islam','Pria',NULL,NULL,NULL,NULL,2023,NULL,'pamudjipwh@yahoo.com','123456',1,1,3,1,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL),(72,NULL,'QURROTU AINY, S.Psi.','JL. Peneleh IX/40-42','qainy.starsnake@gmail.com','082190971280','082190971280','2023-01-18','197710262008070465','',NULL,NULL,'islam','Wanita',NULL,NULL,NULL,NULL,2023,NULL,'qainy.starsnake@gmail.com','123456',1,1,3,1,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL),(73,NULL,'RINA SULFIANA, S.Si.','Jl. Bulak Setro Indah II Blok B-37','rsulfiananjatmiko@gmail.com','081803124887','081803124887','2023-01-18','198101232006070421','',NULL,NULL,'islam','Wanita',NULL,NULL,NULL,NULL,2023,NULL,'rsulfiananjatmiko@gmail.com','123456',1,1,3,1,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL),(74,NULL,'SELI MARDIANA, S.Pd.I','JL. Kedinding Lor Gang Rafflesia 2 No. 6','selimardiana33@gmail.com','081250139886','081250139886','2023-01-18','198607102012070507','',NULL,NULL,'islam','Wanita',NULL,NULL,NULL,NULL,2023,NULL,'selimardiana33@gmail.com','123456',1,1,3,1,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL),(75,NULL,'SITI RAHMAH, S.Pd.','Jl. Kedinding Lor Teratai No. 154','rahmahsiti673@gmail.com','081332158575','081332158575','2023-01-16','197101091996070265','',NULL,NULL,'islam','Wanita',NULL,NULL,NULL,NULL,2023,NULL,'rahmahsiti673@gmail.com','123456',1,1,3,1,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL),(76,NULL,'SRI UTARI, S.Pd.','JL. Sidotopo Wetan Baru IVA No. 62','sriut8418@gmail.com','081313164771','081313164771','2023-01-18','197208221999070316','',NULL,NULL,'islam','Wanita',NULL,NULL,NULL,NULL,2023,NULL,'sriut8418@gmail.com','123456',1,1,3,1,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL),(77,NULL,'YAYUK MURTINI, S.Pd.','JL. Sidotopo Wetan V No. 56','yayukmurwh@yahoo.com','081325279450','081325279450','2023-01-16','196801071994070195','',NULL,NULL,'islam','Wanita',NULL,NULL,NULL,NULL,2023,NULL,'yayukmurwh@yahoo.com','123456',1,1,3,1,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL),(78,NULL,'SUMIYATI, S.Pd.','JL. Gembong Kinco 9A','Mrdandre09@gmail.com','081232711729','081232711729','2023-01-16','196912161999070314','',NULL,NULL,'islam','Wanita',NULL,NULL,NULL,NULL,2023,NULL,'Mrdandre09@gmail.com','123456',1,1,3,1,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL),(79,NULL,'YULIA RACHMA, S.Pd.','JL. KALILOM LOR INDAH GG DUKU NO.4','yulia290875@gmail.com','082132261145','082132261145','2023-01-18','197508291999070317','',NULL,NULL,'islam','Wanita',NULL,NULL,NULL,NULL,2023,NULL,'yulia290875@gmail.com','123456',1,1,3,1,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL),(80,NULL,'Z. HASANAH MS, S.Pd.','JL. BULAK BANTENG BARU KENANGA II/81','hazasahsmpwh@yahoo.com','081807983580','081807983580','2023-01-18','197606202001070361','',NULL,NULL,'islam','Wanita',NULL,NULL,NULL,NULL,2023,NULL,'hazasahsmpwh@yahoo.com','123456',1,1,3,1,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL),(81,NULL,'AGUSTINAH TANJUNG, S.Pd.','JL. TAMBAK SEGARAN WETAN 1/90','tinatanjung.tt@gmail.com','085607772658','085607772658','2023-01-18','198008292014070532','',NULL,NULL,'islam','Wanita',NULL,NULL,NULL,NULL,2023,NULL,'tinatanjung.tt@gmail.com','123456',1,1,3,1,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL),(82,NULL,'YUKA YUANANDA WICAKSONO, S.Pd.','PERUM JAYA ABADII - 11','yukayuanandawicaksono@gmail.com','085806330558','085806330558','2023-01-18','199610182021110863','',NULL,NULL,'islam','Pria',NULL,NULL,NULL,NULL,2023,NULL,'yukayuanandawicaksono@gmail.com','123456',1,1,3,1,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL),(83,NULL,'ARDESTI DEBY ARINDA, S.Pd.','JL. TAMBAK WEDI BARU GG.18-D UTARA NO.9','ardestidebyarinda@gmail.com','0895803046840','0895803046840','2023-01-18','199803202022010866','',NULL,NULL,'islam','Wanita',NULL,NULL,NULL,NULL,2023,NULL,'ardestidebyarinda@gmail.com','123456',1,1,3,1,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL),(84,NULL,'INDAH JAUHAROH, S.Pd.','JL. WONOAYU. 81','indahjauharoh5@gmail.com','089620069488','089620069488','2023-01-18','199607072021110864','',NULL,NULL,'islam','Wanita',NULL,NULL,NULL,NULL,2023,NULL,'indahjauharoh5@gmail.com','123456',1,1,3,1,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL),(85,NULL,'ROBBIYATUL MU&#039;AMALAH, S.Pd.','','bellarobbiyatul@gmail.com','085899913732','085899913732','2023-01-18','199806152021110865','',NULL,NULL,'islam','Wanita',NULL,NULL,NULL,NULL,2023,NULL,'bellarobbiyatul@gmail.com','123456',1,1,3,1,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL),(86,NULL,'EKO WAHYUDI, S.Pd.','Dusun Gumukrejo RT 06 RW 01\r\nDesa Sidorejo, Kec. Purwoharjo, Banyuwangi ','eko78996@gmail.com','082143258989','082143258989','2023-01-16','3510061804950003','',NULL,NULL,'islam','Pria',NULL,NULL,NULL,NULL,2023,NULL,'eko78996@gmail.com','123456',1,1,3,1,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL),(87,NULL,'NAJMI ZIANA WALIDA, S.Pd.','Dusun Krajan RT 03 RW 03\r\nSentul, Purwodadi Pasuruan ','ziananajmi@gmail.com','083833843418','083833843418','2023-01-16','3514016901950001','',NULL,NULL,'islam','Wanita',NULL,NULL,NULL,NULL,2023,NULL,'ziananajmi@gmail.com','123456',1,1,3,1,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL),(88,NULL,'MAULANA AHMAD MAHADI, S.Pd.','Dsn, Somber Desa Petapan Kecamatan Labang Kabupaten Bangkalan 69163','maulanaahmadmspd@gmail.com','085850836441','085850836441','2023-01-18','3526121707970001','',NULL,NULL,'islam','Pria',NULL,NULL,NULL,NULL,2023,NULL,'maulanaahmadmspd@gmail.com','123456',1,1,3,1,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL),(89,NULL,'YASMIN AISYAH AKILAH RAHMAN, S.Pd.','Jl. Bronggalan Sawah VI A no. 31\r\nKel. Pacar Kembang Kec, Tambak Sari, Surabaya 60138','yasmin.arrahman1@gmail.com','','','2023-01-18','3578106810990003','',NULL,NULL,'islam','Wanita',NULL,NULL,NULL,NULL,2023,NULL,'yasmin.arrahman1@gmail.com','123456',1,1,3,1,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL),(90,NULL,'Gatot Sugiyanto, S.Pd.','Jalan 3','3@gmail.com','','','2022-12-05','','',NULL,NULL,'islam','Pria',NULL,NULL,NULL,NULL,2022,NULL,'ppdb','123456',1,1,4,2,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL),(91,NULL,'SADIKIN','','3578171005780011@gmail.com','','','1970-01-01','3578171005780011','',NULL,NULL,'','Wanita',NULL,NULL,NULL,NULL,2023,NULL,'3578171005780011@gmail.com','123456',1,1,4,1,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL),(92,NULL,'WILUDJENG','','3578164404680002@gmail.com','','','1970-01-01','3578164404680002','',NULL,NULL,'','Wanita',NULL,NULL,NULL,NULL,2023,NULL,'3578164404680002@gmail.com','123456',1,1,4,1,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL),(93,NULL,'AKHMAD SUHARDIANTO','','3578152104890001@gmail.com','','','1970-01-01','3578152104890001','',NULL,NULL,'','Wanita',NULL,NULL,NULL,NULL,2023,NULL,'3578152104890001@gmail.com','123456',1,1,4,1,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL),(94,NULL,'MOCHAMMAD RIZQI WACHID SETYAWAN','','3578081005990004@gmail.com','','','1970-01-01','3578081005990004','',NULL,NULL,'','Wanita',NULL,NULL,NULL,NULL,2023,NULL,'3578081005990004@gmail.com','123456',1,1,4,1,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL),(95,NULL,'ZULAIKHAH','','3578174905600001@gmail.com','','','1970-01-01','3578174905600001','',NULL,NULL,'','Wanita',NULL,NULL,NULL,NULL,2023,NULL,'3578174905600001@gmail.com','123456',1,1,4,1,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL),(96,NULL,'AINUR MAULUD FINA','','3578166610880002@gmail.com','','','1970-01-01','3578166610880002','',NULL,NULL,'','Wanita',NULL,NULL,NULL,NULL,2023,NULL,'3578166610880002@gmail.com','123456',1,1,4,1,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL),(97,NULL,'CHRISTINA HANJAR SESANTI','','3578104406840008@gmail.com','','','1970-01-01','3578104406840008','',NULL,NULL,'','Wanita',NULL,NULL,NULL,NULL,2023,NULL,'3578104406840008@gmail.com','123456',1,1,4,1,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL),(98,NULL,'KUSTINI','','3578107103570001@gmail.com','','','1970-01-01','3578107103570001','',NULL,NULL,'','Wanita',NULL,NULL,NULL,NULL,2023,NULL,'3578107103570001@gmail.com','123456',1,1,4,1,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL),(99,NULL,'SHOBAHUL HOIR','','3578172009850003@gmail.com','','','1970-01-01','3578172009850003','',NULL,NULL,'','Wanita',NULL,NULL,NULL,NULL,2023,NULL,'3578172009850003@gmail.com','123456',1,1,4,1,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL),(100,NULL,'FITRI FAJRIYAH','','3578176908920001@gmail.com','','','1970-01-01','3578176908920001','',NULL,NULL,'','Wanita',NULL,NULL,NULL,NULL,2023,NULL,'3578176908920001@gmail.com','123456',1,1,4,1,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL),(101,NULL,'MOCH. ANSOR','','3578290802610001@gmail.com','','','1970-01-01','3578290802610001','',NULL,NULL,'','Wanita',NULL,NULL,NULL,NULL,2023,NULL,'3578290802610001@gmail.com','123456',1,1,4,1,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL),(102,NULL,'TITIM YUDHA SETYAWATI','','3507125312760003@gmail.com','','','1970-01-01','3507125312760003','',NULL,NULL,'','Wanita',NULL,NULL,NULL,NULL,2023,NULL,'3507125312760003@gmail.com','123456',1,1,4,1,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL),(103,NULL,'NOFI RIDONINGSIH','','3578177110750002@gmail.com','','','1970-01-01','3578177110750002','',NULL,NULL,'','Wanita',NULL,NULL,NULL,NULL,2023,NULL,'3578177110750002@gmail.com','123456',1,1,4,1,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL),(104,NULL,'RIYATI','','3578106707700007@gmail.com','','','1970-01-01','3578106707700007','',NULL,NULL,'','Wanita',NULL,NULL,NULL,NULL,2023,NULL,'3578106707700007@gmail.com','123456',1,1,4,1,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL),(105,NULL,'ADELLA DWI PUTRA',NULL,'3318021307950001@gmail.com',NULL,NULL,'2023-02-22','3578171804980003','0',NULL,NULL,NULL,'Wanita',NULL,NULL,NULL,5,2023,NULL,'3318021307950001@gmail.com','123456',1,1,4,1,1,2,2,NULL,NULL,48,NULL,NULL,1,11),(106,NULL,'ENI KUSRINI','','3578174103730002@gmail.com','','','1970-01-01','3578174103730002','',NULL,NULL,'','Wanita',NULL,NULL,NULL,NULL,2023,NULL,'3578174103730002@gmail.com','123456',1,1,4,1,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL),(107,NULL,'SOEBAGIJO','','3578172801700001@gmail.com','','','1970-01-01','3578172801700001','',NULL,NULL,'','Wanita',NULL,NULL,NULL,NULL,2023,NULL,'3578172801700001@gmail.com','123456',1,1,4,1,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL),(108,NULL,'ANI ROSIDAH','','3578115511810005@gmail.com','','','1970-01-01','3578115511810005','',NULL,NULL,'','Wanita',NULL,NULL,NULL,NULL,2023,NULL,'3578115511810005@gmail.com','123456',1,1,4,1,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL),(109,NULL,'KUSNINTYASTUTIK','','3578174806780006@gmail.com','','','1970-01-01','3578174806780006','',NULL,NULL,'','Wanita',NULL,NULL,NULL,NULL,2023,NULL,'3578174806780006@gmail.com','123456',1,1,4,1,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL),(110,NULL,'SANCOKO','','3578100107750004@gmail.com','','','1970-01-01','3578100107750004','',NULL,NULL,'','Wanita',NULL,NULL,NULL,NULL,2023,NULL,'3578100107750004@gmail.com','123456',1,1,4,1,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL),(111,NULL,'NUNUN LUSYATI','','3578175908760001@gmail.com','','','1970-01-01','3578175908760001','',NULL,NULL,'','Wanita',NULL,NULL,NULL,NULL,2023,NULL,'3578175908760001@gmail.com','123456',1,1,4,1,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL),(112,NULL,'DITA ROFIQA DAMAYANTI','','3578196903960001@gmail.com','','','1970-01-01','3578196903960001','',NULL,NULL,'','Wanita',NULL,NULL,NULL,NULL,2023,NULL,'3578196903960001@gmail.com','123456',1,1,4,1,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL),(113,NULL,'RUKMANINGSIH','','3578174803810011@gmail.com','','','1970-01-01','3578174803810011','',NULL,NULL,'','Wanita',NULL,NULL,NULL,NULL,2023,NULL,'3578174803810011@gmail.com','123456',1,1,4,1,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL),(114,NULL,'USWATUN HASANAH','','3578105009820004@gmail.com','','','1970-01-01','3578105009820004','',NULL,NULL,'','Wanita',NULL,NULL,NULL,NULL,2023,NULL,'3578105009820004@gmail.com','123456',1,1,4,1,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL),(115,NULL,'AMALIYA MUFIDAH','','3524136904780002@gmail.com','','','1970-01-01','3524136904780002','',NULL,NULL,'','Wanita',NULL,NULL,NULL,NULL,2023,NULL,'3524136904780002@gmail.com','123456',1,1,4,1,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL),(116,NULL,'FULLATUL AINI','','3578167006760220@gmail.com','','','1970-01-01','3578167006760220','',NULL,NULL,'','Wanita',NULL,NULL,NULL,NULL,2023,NULL,'3578167006760220@gmail.com','123456',1,1,4,1,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL),(117,NULL,'LUQMAN AFFANDI','','3578171412910002@gmail.com','','','1970-01-01','3578171412910002','',NULL,NULL,'','Wanita',NULL,NULL,NULL,NULL,2023,NULL,'3578171412910002@gmail.com','123456',1,1,4,1,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL),(118,NULL,'QURROTUN AQYUN','','3527034411894028@gmail.com','','','1970-01-01','3527034411894028','',NULL,NULL,'','Wanita',NULL,NULL,NULL,NULL,2023,NULL,'3527034411894028@gmail.com','123456',1,1,4,1,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL),(119,NULL,'ABDUL HARIS','','3578102204820010@gmail.com','','','1970-01-01','3578102204820010','',NULL,NULL,'','Wanita',NULL,NULL,NULL,NULL,2023,NULL,'3578102204820010@gmail.com','123456',1,1,4,1,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL),(120,NULL,'ABDUL MUJIB HAMBALI','','3578171409590002@gmail.com','','','1970-01-01','3578171409590002','',NULL,NULL,'','Wanita',NULL,NULL,NULL,NULL,2023,NULL,'3578171409590002@gmail.com','123456',1,1,4,1,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL),(121,NULL,'AHMAD RAHMATULLAH','','3578161009930005@gmail.com','','','1970-01-01','3578161009930005','',NULL,NULL,'','Wanita',NULL,NULL,NULL,NULL,2023,NULL,'3578161009930005@gmail.com','123456',1,1,4,1,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL),(122,NULL,'ANIS SOFIYAH','','3578045203920004@gmail.com','','','1970-01-01','3578045203920004','',NULL,NULL,'','Wanita',NULL,NULL,NULL,NULL,2023,NULL,'3578045203920004@gmail.com','123456',1,1,4,1,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL),(123,NULL,'MISBAKHUL MUNIR','','3578282504960001@gmail.com','','','1970-01-01','3578282504960001','',NULL,NULL,'','Wanita',NULL,NULL,NULL,NULL,2023,NULL,'3578282504960001@gmail.com','123456',1,1,4,1,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL),(124,NULL,'RAHMAT SUDANI','','3578271302990004@gmail.com','','','1970-01-01','3578271302990004','',NULL,NULL,'','Wanita',NULL,NULL,NULL,NULL,2023,NULL,'3578271302990004@gmail.com','123456',1,1,4,1,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL),(125,NULL,'DANI CANTONA','','3578102704970005@gmail.com','','','1970-01-01','3578102704970005','',NULL,NULL,'','Wanita',NULL,NULL,NULL,NULL,2023,NULL,'3578102704970005@gmail.com','123456',1,1,4,1,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL),(126,NULL,'HARIJANTO','','3578062406600003@gmail.com','','','1970-01-01','3578062406600003','',NULL,NULL,'','Wanita',NULL,NULL,NULL,NULL,2023,NULL,'3578062406600003@gmail.com','123456',1,1,4,1,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL),(127,NULL,'RISKY MAULANA','','3578110303980002@gmail.com','','','1970-01-01','3578110303980002','',NULL,NULL,'','Wanita',NULL,NULL,NULL,NULL,2023,NULL,'3578110303980002@gmail.com','123456',1,1,4,1,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL),(128,NULL,'RR. NURUL QOMARIYAH','','3578164305700006@gmail.com','','','1970-01-01','3578164305700006','',NULL,NULL,'','Wanita',NULL,NULL,NULL,NULL,2023,NULL,'3578164305700006@gmail.com','123456',1,1,4,1,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL),(129,NULL,'KURNIA TSALITSATIN ROBANIYAH','','3578055111810009@gmail.com','','','1970-01-01','3578055111810009','',NULL,NULL,'','Wanita',NULL,NULL,NULL,NULL,2023,NULL,'3578055111810009@gmail.com','123456',1,1,4,1,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL),(130,NULL,'NUR HOLIFAH','','3578176910940002@gmail.com','','','1970-01-01','3578176910940002','',NULL,NULL,'','Wanita',NULL,NULL,NULL,NULL,2023,NULL,'3578176910940002@gmail.com','123456',1,1,4,1,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL),(131,NULL,'SRI RAHAYU','','3578164112650003@gmail.com','','','1970-01-01','3578164112650003','',NULL,NULL,'','Wanita',NULL,NULL,NULL,NULL,2023,NULL,'3578164112650003@gmail.com','123456',1,1,4,1,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL),(132,NULL,'AHMAD BAIDHOWI','','3513212603970001@gmail.com','','','1970-01-01','3513212603970001','',NULL,NULL,'','Wanita',NULL,NULL,NULL,NULL,2023,NULL,'3513212603970001@gmail.com','123456',1,1,4,1,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL),(133,NULL,'IKA SAFITRI','','3514126808820003@gmail.com','','','1970-01-01','3514126808820003','',NULL,NULL,'','Wanita',NULL,NULL,NULL,NULL,2023,NULL,'3514126808820003@gmail.com','123456',1,1,4,1,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL),(134,NULL,'MUTIARA HANY HAMDIYAH','','3525124312940002@gmail.com','','','1970-01-01','3525124312940002','',NULL,NULL,'','Wanita',NULL,NULL,NULL,NULL,2023,NULL,'3525124312940002@gmail.com','123456',1,1,4,1,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL),(135,NULL,'GATOT SUGIANTO','','3578102612760004@gmail.com','','','1970-01-01','3578102612760004','',NULL,NULL,'','Wanita',NULL,NULL,NULL,NULL,2023,NULL,'3578102612760004@gmail.com','123456',1,1,4,3,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL),(136,NULL,'SITI ROHMI','','3578102612761114@gmail.com','','','1970-01-01','3578102612761114','',NULL,NULL,'','Wanita',NULL,NULL,NULL,NULL,2023,NULL,'3578102612761114@gmail.com','123456',1,1,4,2,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL),(137,NULL,'SITI MUSAWAROH','','3578165507710006@gmail.com','','','1970-01-01','3578165507710006','',NULL,NULL,'','Wanita',NULL,NULL,NULL,NULL,2023,NULL,'3578165507710006@gmail.com','123456',1,1,4,3,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL),(138,NULL,'ACHMAD ZAINI','','3578165507711006@gmail.com','','','1970-01-01','3578165507711006','',NULL,NULL,'','Wanita',NULL,NULL,NULL,NULL,2023,NULL,'3578165507711006@gmail.com','123456',1,1,4,3,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL),(139,NULL,'SOEDJOKO','','3578161404690001@gmail.com','','','1970-01-01','3578161404690001','',NULL,NULL,'','Wanita',NULL,NULL,NULL,NULL,2023,NULL,'3578161404690001@gmail.com','123456',1,1,4,3,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL),(140,NULL,'KUN WARIATI','','3578295412710002@gmail.com','','','1970-01-01','3578295412710002','',NULL,NULL,'','Wanita',NULL,NULL,NULL,NULL,2023,NULL,'3578295412710002@gmail.com','123456',1,1,4,3,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL),(141,NULL,'ACHMAD RIZKI','','3578161506970003@gmail.com','','','1970-01-01','3578161506970003','',NULL,NULL,'','Wanita',NULL,NULL,NULL,NULL,2023,NULL,'3578161506970003@gmail.com','123456',1,1,4,3,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL),(142,NULL,'MOCHAMAD THORIQ NURDIN','','3578051311890004@gmail.com','','','1970-01-01','3578051311890004','',NULL,NULL,'','Wanita',NULL,NULL,NULL,NULL,2023,NULL,'3578051311890004@gmail.com','123456',1,1,4,3,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL),(143,NULL,'ABDUL AZIES','','3578172010790002@gmail.com','','','1970-01-01','3578172010790002','',NULL,NULL,'','Wanita',NULL,NULL,NULL,NULL,2023,NULL,'3578172010790002@gmail.com','123456',1,1,4,3,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL),(144,NULL,'BUDIMAN W.','','3578170707550002@gmail.com','','','1970-01-01','3578170707550002','',NULL,NULL,'','Wanita',NULL,NULL,NULL,NULL,2023,NULL,'3578170707550002@gmail.com','123456',1,1,4,3,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL),(145,NULL,'ILYAS NOERSOLIM','','3578081505630004@gmail.com','','','1970-01-01','3578081505630004','',NULL,NULL,'','Wanita',NULL,NULL,NULL,NULL,2023,NULL,'3578081505630004@gmail.com','123456',1,1,4,3,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL),(146,NULL,'SUPRIJANTO','','3578081505630005@gmail.com','','','1970-01-01','3578081505630005','',NULL,NULL,'','Wanita',NULL,NULL,NULL,NULL,2023,NULL,'3578081505630005@gmail.com','123456',1,1,4,3,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL),(147,NULL,'FAHMI BIN SALEH A.','','3578161406900005@gmail.com','','','1970-01-01','3578161406900005','',NULL,NULL,'','Wanita',NULL,NULL,NULL,NULL,2023,NULL,'3578161406900005@gmail.com','123456',1,1,4,3,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL),(148,NULL,'WISNU PRADINATA','','3528040303970001@gmail.com','','','1970-01-01','3528040303970001','',NULL,NULL,'','Wanita',NULL,NULL,NULL,NULL,2023,NULL,'3528040303970001@gmail.com','123456',1,1,4,3,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL),(149,NULL,'Panitia PPDB','Sidotopo Wetan Baru No.37 Surabaya','ppdb','','','2022-11-08','','',NULL,NULL,'islam','Wanita',NULL,NULL,NULL,NULL,2022,NULL,'ppdb','123456',1,1,5,2,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL),(150,NULL,'Aulia Zulfikar, S.Pd','','malika110719@gmail.com','','','2023-01-13','198304102006070420','',NULL,NULL,'islam','Pria',NULL,NULL,NULL,60,2023,NULL,'malika110719@gmail.com','123456',1,1,5,1,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL),(151,NULL,'Djumadi, S.Pd','','djumadi_hilmy@yahoo.co.id','','','2023-01-13','196905271996070283','',NULL,NULL,'islam','Pria',NULL,NULL,NULL,NULL,2023,NULL,'djumadi_hilmy@yahoo.co.id','123456',1,1,5,1,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL),(152,NULL,'Rokayah','','rukayahwh@gmail.com','','','2023-01-13','198811182011070498','',NULL,NULL,'islam','Wanita',NULL,NULL,NULL,62,2023,NULL,'rukayahwh@gmail.com','123456',1,1,5,1,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL),(153,NULL,'Achmad Junaidi, S.Kom','','junales@gmail.com','','','2023-01-13','198408252010070492','',NULL,NULL,'islam','Pria',NULL,NULL,NULL,61,2023,NULL,'junales@gmail.com','123456',1,1,5,1,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL),(154,NULL,'Soe eniek','','latapameidindaanissa@gmail.com','','','2023-01-12','197004061996070319','',NULL,NULL,'islam','Pria',NULL,NULL,NULL,NULL,2023,NULL,'latapameidindaanissa@gmail.com','123456',1,1,5,1,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL),(155,NULL,'H. Abd. Ro&#039;uf','','abdulrouf@gmail.com','','','2023-01-12','196701121998070311','',NULL,NULL,'islam','Pria',NULL,NULL,NULL,NULL,2023,NULL,'abdulrouf@gmail.com','123456',1,1,5,1,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL),(156,NULL,'Sri Rahayu','','srirahayum567@gmail.com','','','2023-01-12','196512011999070327','',NULL,NULL,'islam','Wanita',NULL,NULL,NULL,NULL,2023,NULL,'srirahayum567@gmail.com','123456',1,1,5,1,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL),(157,NULL,'Soebagijo','','soebagijo1970@gmail.com','','','2023-01-12','197001282000070310','',NULL,NULL,'islam','Pria',NULL,NULL,NULL,NULL,2023,NULL,'soebagijo1970@gmail.com','123456',1,1,5,1,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL),(158,NULL,'Nunik Haryani','','hanna3aulia@gmail.com','','','2023-01-12','197604052003070393','',NULL,NULL,'islam','Wanita',NULL,NULL,NULL,NULL,2023,NULL,'hanna3aulia@gmail.com','123456',1,1,5,1,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL),(159,NULL,'Wiwik Winarti','','wiwiknarendra@yahoo.com','','','2023-01-12','197606042004070397','',NULL,NULL,'islam','Wanita',NULL,NULL,NULL,NULL,2023,NULL,'wiwiknarendra@yahoo.com','123456',1,1,5,1,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL),(160,NULL,'Ahsanuddin, S.Ag','','ahsanuddin7642@gmail.com','','','2023-01-13','197604012004070401','',NULL,NULL,'islam','Pria',NULL,NULL,NULL,NULL,2023,NULL,'ahsanuddin7642@gmail.com','123456',1,1,5,1,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL),(161,NULL,'Siswati','','busiswati2016@gmail.com','','','2023-01-12','197704092004070403','',NULL,NULL,'islam','Wanita',NULL,NULL,NULL,NULL,2023,NULL,'busiswati2016@gmail.com','123456',1,1,5,1,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL),(162,NULL,'M. Syafiuddin Zamzam','','iukz@email.com','','','2023-01-13','198110032004070399','',NULL,NULL,'islam','Pria',NULL,NULL,NULL,64,2023,NULL,'iukz@email.com','123456',1,1,5,1,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL),(163,NULL,'Suliha Kamil','','sulihakamil@gmail.com','','','2023-01-13','198008302008070456','',NULL,NULL,'islam','Wanita',NULL,NULL,NULL,NULL,2023,NULL,'sulihakamil@gmail.com','123456',1,1,5,1,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL),(164,NULL,'Deddy Purwanto','','y1nxt5@erapor-smk.net','','','2023-01-13','198012172005070411','',NULL,NULL,'islam','Pria',NULL,NULL,NULL,NULL,2023,NULL,'y1nxt5@erapor-smk.net','123456',1,1,5,1,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL),(165,NULL,'Febriani Setyawati','','poseidoncake605@gmail.com','','','2023-01-13','198202072008070458','',NULL,NULL,'islam','Wanita',NULL,NULL,NULL,NULL,2023,NULL,'poseidoncake605@gmail.com','123456',1,1,5,1,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL),(166,NULL,'Catur Budi Darmawan','','arekkentir666@yahoo.com','','','2023-01-12','197404132008070462','',NULL,NULL,'islam','Pria',NULL,NULL,NULL,NULL,2023,NULL,'arekkentir666@yahoo.com','123456',1,1,5,1,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL),(167,NULL,'Hekmah Amala','','hekmahamala84@gmail.com','','','2023-01-13','198411102008070461','',NULL,NULL,'islam','Wanita',NULL,NULL,NULL,NULL,2023,NULL,'hekmahamala84@gmail.com','123456',1,1,5,1,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL),(168,NULL,'M. Setiyawan','','awanisti@gmail.com','','','2023-01-13','198404222008070464','',NULL,NULL,'islam','Pria',NULL,NULL,NULL,NULL,2023,NULL,'awanisti@gmail.com','123456',1,1,5,1,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL),(169,NULL,'Aisyah Noormawati','','noormawatiaisyah@yahoo.com','','','2023-01-12','197503172009070477','',NULL,NULL,'islam','Wanita',NULL,NULL,NULL,NULL,2023,NULL,'noormawatiaisyah@yahoo.com','123456',1,1,5,1,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL),(170,NULL,'Elok Tri Cahyani','','eloktricahyani29@gmail.com','','','2023-01-13','198109292009070468','',NULL,NULL,'islam','Wanita',NULL,NULL,NULL,NULL,2023,NULL,'eloktricahyani29@gmail.com','123456',1,1,5,1,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL),(171,NULL,'Roni Fauzi','','roni.fauzi@gmail.com','','','2023-01-13','198703102010070491','',NULL,NULL,'islam','Pria',NULL,NULL,NULL,NULL,2023,NULL,'roni.fauzi@gmail.com','123456',1,1,5,1,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL),(172,NULL,'Sriyani','','cuteziendah46@gmail.com','','','2023-01-13','198406222010070490','',NULL,NULL,'islam','Wanita',NULL,NULL,NULL,NULL,2023,NULL,'cuteziendah46@gmail.com','123456',1,1,5,1,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL),(173,NULL,'Ayu Dwi Cahyani','','ayudwicahyani8@gmail.com','','','2023-01-13','198005032010070499','',NULL,NULL,'','Wanita',NULL,NULL,NULL,NULL,2023,NULL,'ayudwicahyani8@gmail.com','123456',1,1,5,3,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL),(174,NULL,'Winarko Hidayat','','muhammad.heco@yahoo.com','','','2023-01-12','197203032010070488','',NULL,NULL,'islam','Pria',NULL,NULL,NULL,NULL,2023,NULL,'muhammad.heco@yahoo.com','123456',1,1,5,1,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL),(175,NULL,'Maslichatin, S.Th.I','','micha.fulla@gmail.com','','','2023-01-13','197911042011070504','',NULL,NULL,'islam','Wanita',NULL,NULL,NULL,NULL,2023,NULL,'micha.fulla@gmail.com','123456',1,1,5,1,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL),(176,NULL,'Fullatul Aini','','fillatul.aini.baru@gmail.com','','','2023-01-12','197606302011070346','',NULL,NULL,'islam','Wanita',NULL,NULL,NULL,NULL,2023,NULL,'fillatul.aini.baru@gmail.com','123456',1,1,5,1,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL),(177,NULL,'Kuncahyo Arif S.','','kuncahyo28@gmail.com','','','2023-01-13','198712282011070501','',NULL,NULL,'islam','Pria',NULL,NULL,NULL,NULL,2023,NULL,'kuncahyo28@gmail.com','123456',1,1,5,1,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL),(178,NULL,'Rukmaningsih','','ashari.r.ar@gmail.com','','','2023-01-13','198103082010070489','',NULL,NULL,'islam','Wanita',NULL,NULL,NULL,NULL,2023,NULL,'ashari.r.ar@gmail.com','123456',1,1,5,1,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL),(179,NULL,'Ani Rosidah','','ani.alwafa111@gmail.com','','','2023-01-13','198111152012070453','',NULL,NULL,'islam','Wanita',NULL,NULL,NULL,NULL,2023,NULL,'ani.alwafa111@gmail.com','123456',1,1,5,1,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL),(180,NULL,'Maria Ulfa','','mariaulfa0605@gmail.com','','','2023-01-13','198505062012070455','',NULL,NULL,'islam','Wanita',NULL,NULL,NULL,NULL,2023,NULL,'mariaulfa0605@gmail.com','123456',1,1,5,1,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL),(181,NULL,'Taufiq Hidayat','','taufiqht1969@gmail.com','','','2023-01-12','196904192012070514','',NULL,NULL,'islam','Pria',NULL,NULL,NULL,NULL,2023,NULL,'taufiqht1969@gmail.com','123456',1,1,5,1,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL),(182,NULL,'Nurul Faujiyah','','nurfa-chayank@yahoo.co.id','','','2023-01-13','199003172012070513','',NULL,NULL,'islam','Wanita',NULL,NULL,NULL,NULL,2023,NULL,'nurfa-chayank@yahoo.co.id','123456',1,1,5,1,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL),(183,NULL,'Anik Yuni Rahayu','','mbakyuni48@gmail.com','','','2023-01-13','198306252013070516','',NULL,NULL,'islam','Wanita',NULL,NULL,NULL,NULL,2023,NULL,'mbakyuni48@gmail.com','123456',1,1,5,1,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL),(184,NULL,'Kurnia Tsalisatin','','kurnia_tsalitsatin@yahoo.co.id','','','2023-01-13','198111112014070429','',NULL,NULL,'islam','Wanita',NULL,NULL,NULL,NULL,2023,NULL,'kurnia_tsalitsatin@yahoo.co.id','123456',1,1,5,1,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL),(185,NULL,'Reni Zumzumi','','rzumzumy@gmail.com','','','2023-01-13','198511142014070522','',NULL,NULL,'islam','Wanita',NULL,NULL,NULL,101,2023,NULL,'rzumzumy@gmail.com','123456',1,1,5,1,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL),(186,NULL,'Subairi Khalil','','subairikhalil@gmail.com','','','2023-01-13','198709192014070523','',NULL,NULL,'islam','Pria',NULL,NULL,NULL,NULL,2023,NULL,'subairikhalil@gmail.com','123456',1,1,5,1,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL),(187,NULL,'Fitrah Insani, SE','','fitrahinsani0201@gmail.com','','','2023-01-13','198801022016070560','',NULL,NULL,'islam','Wanita',NULL,NULL,NULL,NULL,2023,NULL,'fitrahinsani0201@gmail.com','123456',1,1,5,1,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL),(188,NULL,'Ayu Laily Qomariyah','','ayu.laely10@gmail.com','','','2023-01-13','199310102016070563','',NULL,NULL,'islam','Wanita',NULL,NULL,NULL,NULL,2023,NULL,'ayu.laely10@gmail.com','123456',1,1,5,1,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL),(189,NULL,'Nurfia Lely Chomariya','','nurfialely17@gmail.com','','','2023-01-13','199503172017070570','',NULL,NULL,'islam','Wanita',NULL,NULL,NULL,NULL,2023,NULL,'nurfialely17@gmail.com','123456',1,1,5,1,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL),(190,NULL,'Amalia Sofianti','','calvinmelia2@gmail.com','','','2023-01-12','197910192017070569','',NULL,NULL,'islam','Wanita',NULL,NULL,NULL,NULL,2023,NULL,'calvinmelia2@gmail.com','123456',1,1,5,1,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL),(191,NULL,'Yanarto Teguh P.','','yanarto@gmail.com','','','2023-01-12','197701042017070571','',NULL,NULL,'islam','Pria',NULL,NULL,NULL,NULL,2023,NULL,'yanarto@gmail.com','123456',1,1,5,1,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL),(192,NULL,'Prihatiana P. N.','','tiananidyawati@gmail.com','','','2023-01-13','198504282017070572','',NULL,NULL,'islam','Wanita',NULL,NULL,NULL,NULL,2023,NULL,'tiananidyawati@gmail.com','123456',1,1,5,1,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL),(193,NULL,'Nur Ardiana Sholehati','','sh.ardiana@yahoo.co.id','','','2023-01-13','199208202017070573','',NULL,NULL,'islam','Wanita',NULL,NULL,NULL,NULL,2023,NULL,'sh.ardiana@yahoo.co.id','123456',1,1,5,1,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL),(194,NULL,'Chalimatus S.','','chalimatussholikhah@yahoo.com','','','2023-01-13','199304222018070608','',NULL,NULL,'islam','Wanita',NULL,NULL,NULL,NULL,2023,NULL,'chalimatussholikhah@yahoo.com','123456',1,1,5,1,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL),(195,NULL,'Muhamimin','','muhaimin0678@gmail.com','','','2023-01-12','197810062018070606','',NULL,NULL,'islam','Pria',NULL,NULL,NULL,NULL,2023,NULL,'muhaimin0678@gmail.com','123456',1,1,5,1,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL),(196,NULL,'M. Rifai Abdzar Gifari','','rifaiabdzar@gmail.com','','','2023-01-13','199701082019070582','',NULL,NULL,'islam','Pria',NULL,NULL,NULL,40,2023,NULL,'rifaiabdzar@gmail.com','123456',1,1,5,1,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL),(197,NULL,'ARIF ZAINURI RACHMAN','','ARIF@GMAIL.COM','','','2023-01-16','196906211992070223','',NULL,NULL,'islam','Pria',NULL,NULL,NULL,69,2023,NULL,'ARIF@GMAIL.COM','123456',1,1,5,3,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL),(198,NULL,'Dra. Hj. Muntafi&#039;ah Djauhari','Sidotopo Wetan Baru IV A','tafiksmk@gmail.com','81332025574','81332025574','1970-01-01','196312141989032006','',NULL,NULL,'','Wanita',NULL,NULL,NULL,NULL,1970,NULL,'tafiksmk@gmail.com','123456',1,1,5,1,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL),(200,NULL,'sma',NULL,NULL,NULL,NULL,NULL,'tk',NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,'123456',8,1,1,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL),(209,NULL,NULL,NULL,NULL,NULL,NULL,NULL,'sma',NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,'123456',11,1,4,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL);
/*!40000 ALTER TABLE `pegawai` ENABLE KEYS */;
UNLOCK TABLES;
DROP TABLE IF EXISTS `pengetahuan`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `pengetahuan` (
  `id` int NOT NULL AUTO_INCREMENT,
  `grup` varchar(255) DEFAULT NULL,
  `judul` varchar(500) DEFAULT NULL,
  `isi` text,
  `sumber_url` varchar(255) DEFAULT NULL,
  `dokumen` varchar(255) DEFAULT NULL,
  `visual` varchar(255) DEFAULT NULL,
  `c_by` int DEFAULT NULL,
  PRIMARY KEY (`id`) USING BTREE
) ENGINE=InnoDB DEFAULT CHARSET=latin1 ROW_FORMAT=DYNAMIC;
/*!40101 SET character_set_client = @saved_cs_client */;

LOCK TABLES `pengetahuan` WRITE;
/*!40000 ALTER TABLE `pengetahuan` DISABLE KEYS */;
/*!40000 ALTER TABLE `pengetahuan` ENABLE KEYS */;
UNLOCK TABLES;
DROP TABLE IF EXISTS `penyesuaian`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `penyesuaian` (
  `id` int NOT NULL AUTO_INCREMENT,
  `m_id` int DEFAULT NULL,
  `datetime` datetime DEFAULT NULL,
  `nip` bigint DEFAULT NULL,
  `jenjang_id` int DEFAULT NULL,
  `absen` int DEFAULT NULL,
  `izin` int DEFAULT NULL,
  `sakit` int DEFAULT NULL,
  `terlambat` int DEFAULT NULL,
  `pulang_cepat` int DEFAULT NULL,
  `piket` int DEFAULT NULL,
  `inval` int DEFAULT NULL,
  `lembur` int DEFAULT NULL,
  `total` bigint DEFAULT NULL,
  `total2` bigint DEFAULT NULL,
  `voucher` bigint DEFAULT NULL,
  `absen_jam` int DEFAULT NULL,
  `izin_jam` int DEFAULT NULL,
  `sakit_jam` int DEFAULT NULL,
  PRIMARY KEY (`id`) USING BTREE
) ENGINE=InnoDB AUTO_INCREMENT=39 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

LOCK TABLES `penyesuaian` WRITE;
/*!40000 ALTER TABLE `penyesuaian` DISABLE KEYS */;
INSERT INTO `penyesuaian` VALUES (6,6,'2023-02-14 04:02:59',10230,4,1,1,2,NULL,NULL,1,2,3,114500,171000,30000,NULL,NULL,NULL),(7,6,'2023-02-14 04:02:59',10235,4,2,3,5,1,1,NULL,NULL,NULL,256250,0,40000,NULL,NULL,NULL),(8,8,'2023-02-14 04:39:25',10230,4,1,1,2,NULL,NULL,1,2,3,114500,390198000,30000,NULL,NULL,NULL),(9,8,'2023-02-14 04:39:25',10235,4,2,3,5,1,1,NULL,NULL,NULL,256250,520000000,40000,NULL,NULL,NULL),(10,9,'2023-02-14 06:41:48',10230,4,1,1,2,NULL,NULL,1,2,3,60000,39000,30000,NULL,NULL,NULL),(11,9,'2023-02-14 06:41:48',10235,4,2,3,5,1,1,NULL,NULL,NULL,120000,0,40000,NULL,NULL,NULL),(14,15,'2023-02-14 06:54:42',10230,4,1,1,2,NULL,NULL,1,2,3,60000,178000,30000,NULL,NULL,NULL),(15,15,'2023-02-14 06:54:42',10235,4,2,3,5,1,1,NULL,NULL,NULL,134000,0,40000,NULL,NULL,NULL),(18,28,'2023-02-14 07:11:55',10230,4,1,1,2,NULL,NULL,1,2,3,60000,178000,NULL,NULL,NULL,NULL),(19,28,'2023-02-14 07:11:55',10235,4,2,3,5,1,1,NULL,NULL,NULL,134000,0,NULL,NULL,NULL,NULL),(20,29,'2023-02-14 07:14:01',10230,4,NULL,NULL,2,NULL,NULL,1,2,3,0,178000,30000,NULL,NULL,NULL),(21,29,'2023-02-14 07:14:01',10235,4,2,3,5,1,1,NULL,NULL,NULL,134000,0,40000,NULL,NULL,NULL),(22,35,'2023-02-14 07:19:00',10230,4,1,1,2,NULL,NULL,1,2,3,60000,178000,NULL,NULL,NULL,NULL),(23,35,'2023-02-14 07:19:00',10235,4,2,3,5,1,1,NULL,NULL,NULL,134000,0,NULL,NULL,NULL,NULL),(26,37,'2023-02-14 07:28:33',10230,4,1,1,NULL,NULL,NULL,1,2,3,28000,178000,30000,NULL,NULL,NULL),(27,37,'2023-02-14 07:28:33',10235,4,2,3,5,1,1,NULL,NULL,NULL,156750,0,40000,NULL,NULL,NULL),(30,41,'2023-03-03 10:19:45',3578172009850003,4,1,1,2,NULL,NULL,1,2,3,0,171000,NULL,NULL,NULL,NULL),(35,52,'2023-03-03 10:52:39',10230,4,1,1,2,NULL,NULL,1,2,3,60000,39000,30000,NULL,NULL,NULL),(36,52,'2023-03-03 10:52:39',10235,4,2,3,5,1,1,NULL,NULL,NULL,120000,0,40000,NULL,NULL,NULL);
/*!40000 ALTER TABLE `penyesuaian` ENABLE KEYS */;
UNLOCK TABLES;
DROP TABLE IF EXISTS `potongan_sd`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `potongan_sd` (
  `id` int NOT NULL AUTO_INCREMENT,
  `nama` varchar(50) DEFAULT NULL,
  `terlambat` int DEFAULT NULL,
  `value_terlambat` bigint DEFAULT NULL,
  `izin` int DEFAULT NULL,
  `value_izin` bigint DEFAULT NULL,
  `jabatan_id` int DEFAULT NULL,
  `sakit` int DEFAULT NULL,
  `value_sakit` bigint DEFAULT NULL,
  `totalpotongan` bigint DEFAULT NULL,
  `tidakhadir` int DEFAULT NULL,
  `value_tidakhadir` bigint DEFAULT NULL,
  `month` date DEFAULT NULL,
  `datetime` datetime DEFAULT NULL,
  `u_by` int DEFAULT NULL,
  `pulcep` int DEFAULT NULL,
  `value_pulcep` bigint DEFAULT NULL,
  `tidakhadirjam` int DEFAULT NULL,
  `tidakhadirjamvalue` bigint DEFAULT NULL,
  `sakitperjam` int DEFAULT NULL,
  `sakitperjamvalue` bigint DEFAULT NULL,
  `jenjang_id` int DEFAULT NULL,
  `izinperjam` int DEFAULT NULL,
  `izinperjamvalue` bigint DEFAULT NULL,
  `sertif` int DEFAULT NULL,
  `tahun` int DEFAULT NULL,
  `bulan` int DEFAULT NULL,
  `pid` int DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=71 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

LOCK TABLES `potongan_sd` WRITE;
/*!40000 ALTER TABLE `potongan_sd` DISABLE KEYS */;
INSERT INTO `potongan_sd` VALUES (59,'110123',2,15000,2,40000,1,NULL,23000,168000,NULL,40000,NULL,'2022-12-16 04:03:38',-1,2,20000,2,9000,NULL,4000,1,NULL,9000,NULL,NULL,NULL,NULL),(61,'110124',2,30000,2,30000,2,NULL,27000,164000,NULL,30000,NULL,'2022-12-16 04:09:21',-1,2,18000,2,4000,NULL,7000,1,NULL,4000,NULL,NULL,NULL,NULL),(62,'110124',1,30000,1,40000,1,NULL,23000,99000,NULL,40000,NULL,'2022-12-16 09:14:07',-1,1,20000,1,9000,NULL,4000,1,NULL,9000,NULL,NULL,NULL,NULL),(63,NULL,NULL,30000,NULL,40000,1,NULL,23000,NULL,NULL,40000,NULL,NULL,NULL,NULL,20000,NULL,9000,NULL,4000,1,NULL,9000,NULL,NULL,NULL,NULL),(64,'YUNIARTI',2,30000,2,40000,1,NULL,23000,NULL,NULL,40000,NULL,NULL,NULL,NULL,20000,NULL,9000,NULL,4000,1,NULL,9000,NULL,NULL,NULL,NULL),(65,'farhan kebab',2,30000,2,40000,1,2,23000,NULL,2,40000,NULL,NULL,-1,2,20000,2,9000,2,4000,1,2,9000,NULL,NULL,NULL,NULL),(66,'YUNIARTI',2,30000,2,40000,1,2,23000,NULL,NULL,40000,NULL,NULL,-1,NULL,20000,NULL,9000,NULL,4000,1,NULL,9000,NULL,NULL,NULL,NULL),(67,'farhan kebab',2,30000,2,40000,1,2,23000,186000,NULL,40000,NULL,NULL,-1,NULL,20000,NULL,9000,NULL,4000,1,NULL,9000,NULL,NULL,NULL,NULL),(68,'110123',2,30000,2,40000,2,NULL,23000,220000,2,40000,'2022-12-28','2022-12-28 05:09:23',-1,NULL,20000,NULL,9000,NULL,4000,1,NULL,9000,NULL,NULL,NULL,NULL),(69,'110124',2,15000,2,40000,1,2,NULL,NULL,2,40000,'2023-01-04','2023-01-04 09:06:31',-1,2,20000,NULL,9000,2,NULL,1,3,9000,NULL,NULL,NULL,NULL),(70,'110124',2,15000,2,40000,1,3,NULL,410000,3,40000,'2023-01-04','2023-01-04 09:07:36',-1,3,20000,NULL,9000,NULL,NULL,1,NULL,9000,NULL,NULL,NULL,NULL);
/*!40000 ALTER TABLE `potongan_sd` ENABLE KEYS */;
UNLOCK TABLES;
DROP TABLE IF EXISTS `potongan_sma`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `potongan_sma` (
  `id` int NOT NULL AUTO_INCREMENT,
  `datetime` datetime DEFAULT NULL,
  `month` date DEFAULT NULL,
  `nama` varchar(50) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci DEFAULT NULL,
  `jenjang_id` int DEFAULT NULL,
  `jabatan_id` int DEFAULT NULL,
  `terlambat` int DEFAULT NULL,
  `value_terlambat` bigint DEFAULT NULL,
  `izin` int DEFAULT NULL,
  `value_izin` bigint DEFAULT NULL,
  `u_by` int DEFAULT NULL,
  `sakit` int DEFAULT NULL,
  `value_sakit` bigint DEFAULT NULL,
  `totalpotongan` bigint DEFAULT NULL,
  `tidakhadir` int DEFAULT NULL,
  `value_tidakhadir` bigint DEFAULT NULL,
  `pulcep` int DEFAULT NULL,
  `value_pulcep` bigint DEFAULT NULL,
  `tidakhadirjam` int DEFAULT NULL,
  `tidakhadirjamvalue` bigint DEFAULT NULL,
  `sakitperjam` int DEFAULT NULL,
  `sakitperjamvalue` bigint DEFAULT NULL,
  `izinperjam` int DEFAULT NULL,
  `izinperjamvalue` bigint DEFAULT NULL,
  `sertif` int DEFAULT NULL,
  `tahun` int DEFAULT NULL,
  `bulan` int DEFAULT NULL,
  `pid` int DEFAULT NULL,
  PRIMARY KEY (`id`) USING BTREE
) ENGINE=InnoDB AUTO_INCREMENT=117 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci ROW_FORMAT=DYNAMIC;
/*!40101 SET character_set_client = @saved_cs_client */;

LOCK TABLES `potongan_sma` WRITE;
/*!40000 ALTER TABLE `potongan_sma` DISABLE KEYS */;
INSERT INTO `potongan_sma` VALUES (97,NULL,NULL,'10235',4,9,2,50000,2,NULL,NULL,2,NULL,NULL,2,NULL,2,NULL,3,NULL,1,NULL,NULL,NULL,2,NULL,NULL,NULL),(98,'2023-01-18 07:28:55',NULL,'10235',4,9,4,16500,3,NULL,NULL,NULL,NULL,66000,NULL,NULL,NULL,16500,NULL,16500,NULL,8250,NULL,16500,2,NULL,NULL,NULL),(99,NULL,NULL,'10235',4,9,2,50000,2,NULL,NULL,2,NULL,NULL,2,NULL,2,NULL,3,NULL,1,NULL,NULL,NULL,2,NULL,NULL,NULL),(100,NULL,NULL,'10235',4,9,2,50000,2,NULL,NULL,2,NULL,NULL,2,NULL,2,NULL,3,NULL,1,NULL,1,NULL,2,NULL,NULL,NULL),(101,NULL,NULL,'10235',4,9,2,50000,2,NULL,NULL,2,NULL,NULL,2,NULL,2,NULL,3,NULL,1,NULL,1,NULL,2,NULL,NULL,NULL),(102,'2023-01-19 02:47:08',NULL,'102390',4,6,NULL,6813,NULL,54500,NULL,NULL,27250,0,NULL,54500,NULL,6813,NULL,6813,NULL,3406,NULL,6813,2,NULL,NULL,NULL),(103,'2023-01-19 02:49:27',NULL,'10230',4,5,NULL,NULL,NULL,NULL,NULL,NULL,NULL,0,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,1,NULL,NULL,NULL),(104,'2023-01-19 02:52:00',NULL,'102390',4,6,NULL,6813,NULL,54500,NULL,NULL,27250,0,NULL,54500,NULL,6813,NULL,6813,NULL,3406,NULL,6813,2,NULL,NULL,NULL),(105,'2023-01-19 02:52:59',NULL,'102390',4,6,2,6813,2,54500,NULL,2,27250,0,NULL,54500,NULL,6813,NULL,6813,NULL,3406,NULL,6813,2,NULL,NULL,NULL),(106,'2023-01-19 02:53:56',NULL,'102390',4,6,2,6813,2,54500,NULL,2,27250,122626,NULL,54500,NULL,6813,NULL,6813,NULL,3406,NULL,6813,2,NULL,NULL,NULL),(107,'2023-01-19 02:57:50',NULL,'10239',4,7,2,NULL,2,NULL,NULL,2,NULL,0,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,2,NULL,NULL,NULL),(108,'2023-01-19 02:58:12',NULL,'102390',4,6,2,6813,2,54500,NULL,2,27250,286126,NULL,54500,NULL,6813,NULL,6813,NULL,3406,NULL,6813,2,NULL,NULL,NULL),(109,'2023-01-19 03:02:03',NULL,'102390',4,6,NULL,6813,NULL,54500,NULL,NULL,27250,0,NULL,54500,NULL,6813,NULL,6813,NULL,3406,NULL,6813,2,NULL,NULL,NULL),(110,'2023-01-19 03:05:18',NULL,'102390',4,6,2,6813,2,54500,NULL,2,27250,286126,NULL,54500,NULL,6813,NULL,6813,NULL,3406,NULL,6813,2,NULL,NULL,NULL),(111,'2023-01-24 04:03:49',NULL,'10230',4,5,2,NULL,2,NULL,NULL,NULL,NULL,0,NULL,NULL,NULL,NULL,2,NULL,2,NULL,2,NULL,1,2023,1,1),(112,'2023-01-24 04:03:49',NULL,'10235',4,9,NULL,16500,NULL,NULL,NULL,NULL,NULL,49500,NULL,NULL,NULL,16500,2,16500,2,8250,2,16500,2,2023,1,1),(113,'2023-01-24 04:07:21',NULL,'10230',4,5,2,14000,2,NULL,NULL,NULL,NULL,56000,NULL,NULL,NULL,14000,5,14000,2,NULL,2,14000,1,2023,4,2),(114,'2023-01-24 04:07:21',NULL,'10235',4,9,NULL,16500,NULL,NULL,NULL,NULL,NULL,74250,NULL,NULL,NULL,16500,3,16500,3,8250,3,16500,2,2023,4,2),(115,'2023-01-25 03:18:02',NULL,'10230',4,5,2,14000,1,NULL,NULL,NULL,NULL,28000,NULL,NULL,NULL,14000,NULL,14000,NULL,NULL,NULL,14000,1,2023,4,3),(116,'2023-01-25 03:18:02',NULL,'10235',4,9,NULL,16500,NULL,NULL,NULL,NULL,NULL,0,NULL,NULL,NULL,16500,NULL,16500,NULL,8250,NULL,16500,2,2023,4,3);
/*!40000 ALTER TABLE `potongan_sma` ENABLE KEYS */;
UNLOCK TABLES;
DROP TABLE IF EXISTS `potongan_smk`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `potongan_smk` (
  `id` int NOT NULL AUTO_INCREMENT,
  `u_by` int DEFAULT NULL,
  `datetime` datetime DEFAULT NULL,
  `month` date DEFAULT NULL,
  `nama` varchar(50) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci DEFAULT NULL,
  `jenjang_id` int DEFAULT NULL,
  `jabatan_id` int DEFAULT NULL,
  `terlambat` int DEFAULT NULL,
  `value_terlambat` bigint DEFAULT NULL,
  `izin` int DEFAULT NULL,
  `value_izin` bigint DEFAULT NULL,
  `sakit` int DEFAULT NULL,
  `value_sakit` bigint DEFAULT NULL,
  `totalpotongan` bigint DEFAULT NULL,
  `tidakhadir` int DEFAULT NULL,
  `value_tidakhadir` bigint DEFAULT NULL,
  `pulcep` int DEFAULT NULL,
  `value_pulcep` bigint DEFAULT NULL,
  `tidakhadirjam` int DEFAULT NULL,
  `tidakhadirjamvalue` bigint DEFAULT NULL,
  `sakitperjam` int DEFAULT NULL,
  `sakitperjamvalue` bigint DEFAULT NULL,
  `izinperjam` int DEFAULT NULL,
  `izinperjamvalue` bigint DEFAULT NULL,
  `sertif` int DEFAULT NULL,
  `tahun` int DEFAULT NULL,
  `bulan` int DEFAULT NULL,
  `pid` int DEFAULT NULL,
  PRIMARY KEY (`id`) USING BTREE
) ENGINE=InnoDB AUTO_INCREMENT=70 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci ROW_FORMAT=DYNAMIC;
/*!40101 SET character_set_client = @saved_cs_client */;

LOCK TABLES `potongan_smk` WRITE;
/*!40000 ALTER TABLE `potongan_smk` DISABLE KEYS */;
INSERT INTO `potongan_smk` VALUES (59,-1,'2022-12-16 04:03:38',NULL,'110123',1,1,2,15000,2,40000,NULL,23000,168000,NULL,40000,2,20000,2,9000,NULL,4000,NULL,9000,NULL,NULL,NULL,NULL),(61,-1,'2022-12-16 04:09:21',NULL,'110124',1,2,2,30000,2,30000,NULL,27000,164000,NULL,30000,2,18000,2,4000,NULL,7000,NULL,4000,NULL,NULL,NULL,NULL),(62,-1,'2022-12-16 09:14:07',NULL,'110124',1,1,1,30000,1,40000,NULL,23000,99000,NULL,40000,1,20000,1,9000,NULL,4000,NULL,9000,NULL,NULL,NULL,NULL),(63,NULL,NULL,NULL,NULL,1,1,NULL,30000,NULL,40000,NULL,23000,NULL,NULL,40000,NULL,20000,NULL,9000,NULL,4000,NULL,9000,NULL,NULL,NULL,NULL),(64,NULL,NULL,NULL,'YUNIARTI',1,1,2,30000,2,40000,NULL,23000,NULL,NULL,40000,NULL,20000,NULL,9000,NULL,4000,NULL,9000,NULL,NULL,NULL,NULL),(65,-1,NULL,NULL,'farhan kebab',1,1,2,30000,2,40000,2,23000,NULL,2,40000,2,20000,2,9000,2,4000,2,9000,NULL,NULL,NULL,NULL),(66,-1,NULL,NULL,'YUNIARTI',1,1,2,30000,2,40000,2,23000,NULL,NULL,40000,NULL,20000,NULL,9000,NULL,4000,NULL,9000,NULL,NULL,NULL,NULL),(67,-1,NULL,NULL,'farhan kebab',1,1,2,30000,2,40000,2,23000,186000,NULL,40000,NULL,20000,NULL,9000,NULL,4000,NULL,9000,NULL,NULL,NULL,NULL),(68,-1,'2022-12-28 05:09:23','2022-12-28','110123',1,2,2,30000,2,40000,NULL,23000,220000,2,40000,NULL,20000,NULL,9000,NULL,4000,NULL,9000,NULL,NULL,NULL,NULL),(69,-1,'2023-01-25 07:10:06',NULL,'102327',5,5,NULL,NULL,NULL,NULL,NULL,NULL,86000,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,1,2023,4,1);
/*!40000 ALTER TABLE `potongan_smk` ENABLE KEYS */;
UNLOCK TABLES;
DROP TABLE IF EXISTS `potongan_smp`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `potongan_smp` (
  `id` int NOT NULL AUTO_INCREMENT,
  `u_by` int DEFAULT NULL,
  `datetime` datetime DEFAULT NULL,
  `month` date DEFAULT NULL,
  `nama` varchar(50) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci DEFAULT NULL,
  `jenjang_id` int DEFAULT NULL,
  `jabatan_id` int DEFAULT NULL,
  `terlambat` int DEFAULT NULL,
  `value_terlambat` bigint DEFAULT NULL,
  `izin` int DEFAULT NULL,
  `value_izin` bigint DEFAULT NULL,
  `sakit` int DEFAULT NULL,
  `value_sakit` bigint DEFAULT NULL,
  `totalpotongan` bigint DEFAULT NULL,
  `tidakhadir` int DEFAULT NULL,
  `value_tidakhadir` bigint DEFAULT NULL,
  `pulcep` int DEFAULT NULL,
  `value_pulcep` bigint DEFAULT NULL,
  `tidakhadirjam` int DEFAULT NULL,
  `tidakhadirjamvalue` bigint DEFAULT NULL,
  `sakitperjam` int DEFAULT NULL,
  `sakitperjamvalue` bigint DEFAULT NULL,
  `izinperjam` int DEFAULT NULL,
  `izinperjamvalue` bigint DEFAULT NULL,
  `sertif` int DEFAULT NULL,
  `tahun` int DEFAULT NULL,
  `bulan` int DEFAULT NULL,
  `pid` int DEFAULT NULL,
  PRIMARY KEY (`id`) USING BTREE
) ENGINE=InnoDB AUTO_INCREMENT=69 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci ROW_FORMAT=DYNAMIC;
/*!40101 SET character_set_client = @saved_cs_client */;

LOCK TABLES `potongan_smp` WRITE;
/*!40000 ALTER TABLE `potongan_smp` DISABLE KEYS */;
INSERT INTO `potongan_smp` VALUES (59,-1,'2022-12-16 04:03:38',NULL,'110123',1,1,2,15000,2,40000,NULL,23000,168000,NULL,40000,2,20000,2,9000,NULL,4000,NULL,9000,NULL,NULL,NULL,NULL),(61,-1,'2022-12-16 04:09:21',NULL,'110124',1,2,2,30000,2,30000,NULL,27000,164000,NULL,30000,2,18000,2,4000,NULL,7000,NULL,4000,NULL,NULL,NULL,NULL),(62,-1,'2022-12-16 09:14:07',NULL,'110124',1,1,1,30000,1,40000,NULL,23000,99000,NULL,40000,1,20000,1,9000,NULL,4000,NULL,9000,NULL,NULL,NULL,NULL),(63,NULL,NULL,NULL,NULL,1,1,NULL,30000,NULL,40000,NULL,23000,NULL,NULL,40000,NULL,20000,NULL,9000,NULL,4000,NULL,9000,NULL,NULL,NULL,NULL),(64,NULL,NULL,NULL,'YUNIARTI',1,1,2,30000,2,40000,NULL,23000,NULL,NULL,40000,NULL,20000,NULL,9000,NULL,4000,NULL,9000,NULL,NULL,NULL,NULL),(65,-1,NULL,NULL,'farhan kebab',1,1,2,30000,2,40000,2,23000,NULL,2,40000,2,20000,2,9000,2,4000,2,9000,NULL,NULL,NULL,NULL),(66,-1,NULL,NULL,'YUNIARTI',1,1,2,30000,2,40000,2,23000,NULL,NULL,40000,NULL,20000,NULL,9000,NULL,4000,NULL,9000,NULL,NULL,NULL,NULL),(67,-1,NULL,NULL,'farhan kebab',1,1,2,30000,2,40000,2,23000,186000,NULL,40000,NULL,20000,NULL,9000,NULL,4000,NULL,9000,NULL,NULL,NULL,NULL),(68,-1,'2022-12-28 05:09:23','2022-12-28','110123',1,2,2,30000,2,40000,NULL,23000,220000,2,40000,NULL,20000,NULL,9000,NULL,4000,NULL,9000,NULL,NULL,NULL,NULL);
/*!40000 ALTER TABLE `potongan_smp` ENABLE KEYS */;
UNLOCK TABLES;
DROP TABLE IF EXISTS `potongan_tk`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `potongan_tk` (
  `id` int NOT NULL AUTO_INCREMENT,
  `u_by` int DEFAULT NULL,
  `datetime` datetime DEFAULT NULL,
  `month` date DEFAULT NULL,
  `nama` varchar(50) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci DEFAULT NULL,
  `jenjang_id` int DEFAULT NULL,
  `jabatan_id` int DEFAULT NULL,
  `terlambat` int DEFAULT NULL,
  `value_terlambat` bigint DEFAULT NULL,
  `izin` int DEFAULT NULL,
  `value_izin` bigint DEFAULT NULL,
  `sakit` int DEFAULT NULL,
  `value_sakit` bigint DEFAULT NULL,
  `totalpotongan` bigint DEFAULT NULL,
  `tidakhadir` int DEFAULT NULL,
  `value_tidakhadir` bigint DEFAULT NULL,
  `pulcep` int DEFAULT NULL,
  `value_pulcep` bigint DEFAULT NULL,
  `tidakhadirjam` int DEFAULT NULL,
  `tidakhadirjamvalue` bigint DEFAULT NULL,
  `sakitperjam` int DEFAULT NULL,
  `sakitperjamvalue` bigint DEFAULT NULL,
  `izinperjam` int DEFAULT NULL,
  `izinperjamvalue` bigint DEFAULT NULL,
  `sertif` int DEFAULT NULL,
  `tahun` int DEFAULT NULL,
  `bulan` int DEFAULT NULL,
  `pid` int DEFAULT NULL,
  PRIMARY KEY (`id`) USING BTREE
) ENGINE=InnoDB AUTO_INCREMENT=69 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci ROW_FORMAT=DYNAMIC;
/*!40101 SET character_set_client = @saved_cs_client */;

LOCK TABLES `potongan_tk` WRITE;
/*!40000 ALTER TABLE `potongan_tk` DISABLE KEYS */;
INSERT INTO `potongan_tk` VALUES (59,-1,'2022-12-16 04:03:38',NULL,'110123',1,1,2,15000,2,40000,NULL,23000,168000,NULL,40000,2,20000,2,9000,NULL,4000,NULL,9000,NULL,NULL,NULL,NULL),(61,-1,'2022-12-16 04:09:21',NULL,'110124',1,2,2,30000,2,30000,NULL,27000,164000,NULL,30000,2,18000,2,4000,NULL,7000,NULL,4000,NULL,NULL,NULL,NULL),(62,-1,'2022-12-16 09:14:07',NULL,'110124',1,1,1,30000,1,40000,NULL,23000,99000,NULL,40000,1,20000,1,9000,NULL,4000,NULL,9000,NULL,NULL,NULL,NULL),(63,NULL,NULL,NULL,NULL,1,1,NULL,30000,NULL,40000,NULL,23000,NULL,NULL,40000,NULL,20000,NULL,9000,NULL,4000,NULL,9000,NULL,NULL,NULL,NULL),(64,NULL,NULL,NULL,'YUNIARTI',1,1,2,30000,2,40000,NULL,23000,NULL,NULL,40000,NULL,20000,NULL,9000,NULL,4000,NULL,9000,NULL,NULL,NULL,NULL),(65,-1,NULL,NULL,'farhan kebab',1,1,2,30000,2,40000,2,23000,NULL,2,40000,2,20000,2,9000,2,4000,2,9000,NULL,NULL,NULL,NULL),(66,-1,NULL,NULL,'YUNIARTI',1,1,2,30000,2,40000,2,23000,NULL,NULL,40000,NULL,20000,NULL,9000,NULL,4000,NULL,9000,NULL,NULL,NULL,NULL),(67,-1,NULL,NULL,'farhan kebab',1,1,2,30000,2,40000,2,23000,186000,NULL,40000,NULL,20000,NULL,9000,NULL,4000,NULL,9000,NULL,NULL,NULL,NULL),(68,-1,'2022-12-28 05:09:23','2022-12-28','110123',1,2,2,30000,2,40000,NULL,23000,220000,2,40000,NULL,20000,NULL,9000,NULL,4000,NULL,9000,NULL,NULL,NULL,NULL);
/*!40000 ALTER TABLE `potongan_tk` ENABLE KEYS */;
UNLOCK TABLES;
DROP TABLE IF EXISTS `proyek`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `proyek` (
  `id` int NOT NULL AUTO_INCREMENT,
  `klien` varchar(255) DEFAULT NULL,
  `proyek` varchar(255) DEFAULT NULL,
  `tgl_awal` date DEFAULT NULL,
  `tgl_akhir` date DEFAULT NULL,
  `file_proyek` varchar(255) DEFAULT NULL,
  `aktif` tinyint DEFAULT NULL,
  PRIMARY KEY (`id`) USING BTREE
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=latin1 ROW_FORMAT=DYNAMIC;
/*!40101 SET character_set_client = @saved_cs_client */;

LOCK TABLES `proyek` WRITE;
/*!40000 ALTER TABLE `proyek` DISABLE KEYS */;
INSERT INTO `proyek` VALUES (1,'Yayasan salib suci','YSS',NULL,NULL,NULL,1),(2,'PERKI Surabaya','ACSA 2022','2022-06-17','2022-10-30',NULL,0);
/*!40000 ALTER TABLE `proyek` ENABLE KEYS */;
UNLOCK TABLES;
DROP TABLE IF EXISTS `semester`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `semester` (
  `id` int NOT NULL AUTO_INCREMENT,
  `nama` varchar(50) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

LOCK TABLES `semester` WRITE;
/*!40000 ALTER TABLE `semester` DISABLE KEYS */;
INSERT INTO `semester` VALUES (1,'Ganjil'),(2,'Genap');
/*!40000 ALTER TABLE `semester` ENABLE KEYS */;
UNLOCK TABLES;
DROP TABLE IF EXISTS `sertif`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `sertif` (
  `id` int NOT NULL AUTO_INCREMENT,
  `name` varchar(50) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

LOCK TABLES `sertif` WRITE;
/*!40000 ALTER TABLE `sertif` DISABLE KEYS */;
INSERT INTO `sertif` VALUES (1,'Sertifikasi'),(2,'Non Sertifikasi');
/*!40000 ALTER TABLE `sertif` ENABLE KEYS */;
UNLOCK TABLES;
DROP TABLE IF EXISTS `set_password`;
/*!50001 DROP VIEW IF EXISTS `set_password`*/;
SET @saved_cs_client     = @@character_set_client;
/*!50503 SET character_set_client = utf8mb4 */;
/*!50001 CREATE VIEW `set_password` AS SELECT 
 1 AS `id`,
 1 AS `nip`,
 1 AS `username`,
 1 AS `password`,
 1 AS `nama`*/;
SET character_set_client = @saved_cs_client;
DROP TABLE IF EXISTS `setuju`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `setuju` (
  `id` int NOT NULL AUTO_INCREMENT,
  `name` varchar(50) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

LOCK TABLES `setuju` WRITE;
/*!40000 ALTER TABLE `setuju` DISABLE KEYS */;
INSERT INTO `setuju` VALUES (1,'ya'),(2,'tidak');
/*!40000 ALTER TABLE `setuju` ENABLE KEYS */;
UNLOCK TABLES;
DROP TABLE IF EXISTS `slip_gaji_yayasan`;
