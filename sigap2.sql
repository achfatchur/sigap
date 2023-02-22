-- --------------------------------------------------------
-- Host:                         127.0.0.1
-- Server version:               8.0.30 - MySQL Community Server - GPL
-- Server OS:                    Win64
-- HeidiSQL Version:             12.3.0.6589
-- --------------------------------------------------------

/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET NAMES utf8 */;
/*!50503 SET NAMES utf8mb4 */;
/*!40103 SET @OLD_TIME_ZONE=@@TIME_ZONE */;
/*!40103 SET TIME_ZONE='+00:00' */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;
/*!40111 SET @OLD_SQL_NOTES=@@SQL_NOTES, SQL_NOTES=0 */;


-- Dumping database structure for sigap2
CREATE DATABASE IF NOT EXISTS `sigap2` /*!40100 DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci */ /*!80016 DEFAULT ENCRYPTION='N' */;
USE `sigap2`;

-- Dumping structure for table sigap2.absen
CREATE TABLE IF NOT EXISTS `absen` (
  `id` int NOT NULL AUTO_INCREMENT,
  `bulan` int DEFAULT NULL,
  `tahun` int DEFAULT NULL,
  `jumlah_hari_kerja` smallint DEFAULT NULL,
  `datetime` datetime DEFAULT NULL,
  `createuser` int DEFAULT NULL,
  PRIMARY KEY (`id`) USING BTREE
) ENGINE=InnoDB AUTO_INCREMENT=8 DEFAULT CHARSET=latin1 ROW_FORMAT=DYNAMIC;

-- Dumping data for table sigap2.absen: ~6 rows (approximately)
INSERT INTO `absen` (`id`, `bulan`, `tahun`, `jumlah_hari_kerja`, `datetime`, `createuser`) VALUES
	(1, 4, 2023, NULL, '2023-01-24 04:15:02', -1),
	(2, 5, 2024, 29, '2023-01-18 09:38:24', -1),
	(3, 1, 2023, 29, '2023-01-19 03:22:03', -1),
	(4, 4, 2023, 29, '2023-01-19 05:18:44', -1),
	(5, 1, 2024, 29, '2023-01-19 10:48:30', -1),
	(6, 8, 2023, 29, '2023-01-19 10:49:05', -1),
	(7, NULL, NULL, NULL, '2023-01-24 04:14:33', -1);

-- Dumping structure for table sigap2.absen_detil
CREATE TABLE IF NOT EXISTS `absen_detil` (
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

-- Dumping data for table sigap2.absen_detil: ~10 rows (approximately)
INSERT INTO `absen_detil` (`id`, `pid`, `pegawai`, `masuk`, `absen`, `ijin`, `sakit`, `pulang_cepat`, `piket`, `inval`, `lembur`, `terlambat`, `jenjang`, `date`, `penyesuaian`) VALUES
	(3, 1, '10230', 2, 3, 1, 2, NULL, 2, NULL, 2, 2, 4, NULL, NULL),
	(5, 2, '102390', 2, 2, 2, 2, NULL, NULL, NULL, NULL, 2, 4, NULL, NULL),
	(6, 3, '10236', 24, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 1, NULL, NULL),
	(7, 4, '10230', 12, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 4, NULL, NULL),
	(8, 4, '10235', 15, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 4, NULL, NULL),
	(9, 6, '10230', 2, 2, 2, 2, NULL, NULL, NULL, NULL, 2, 4, NULL, NULL),
	(10, 7, '10230', 12, 3, NULL, NULL, NULL, 12, 12, 2, NULL, 4, NULL, NULL),
	(11, 7, '10235', 12, NULL, NULL, NULL, NULL, 12, NULL, 2, NULL, 4, NULL, NULL),
	(12, 1, '102323', 3, 3, 2, 2, NULL, 2, 2, 2, 2, 5, NULL, NULL),
	(13, 1, '102323', 3, 3, 3, 3, NULL, 2, 1, 1, 1, 3, NULL, NULL);

-- Dumping structure for table sigap2.agama
CREATE TABLE IF NOT EXISTS `agama` (
  `id` int NOT NULL AUTO_INCREMENT,
  `name` varchar(50) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=7 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- Dumping data for table sigap2.agama: ~6 rows (approximately)
INSERT INTO `agama` (`id`, `name`) VALUES
	(1, 'ISLAM'),
	(2, 'Kristen'),
	(3, 'Katolik'),
	(4, 'Hindu'),
	(5, 'Buddha'),
	(6, 'konghucu');

-- Dumping structure for table sigap2.audittrail
CREATE TABLE IF NOT EXISTS `audittrail` (
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

-- Dumping data for table sigap2.audittrail: ~119 rows (approximately)
INSERT INTO `audittrail` (`id`, `datetime`, `script`, `user`, `action`, `table`, `field`, `keyvalue`, `oldvalue`, `newvalue`) VALUES
	(2001, '2022-12-16 04:03:38', '/sigap/PotonganAdd', 'Administrator', 'A', 'potongan', 'value_sakit', '59', '', '23000'),
	(2002, '2022-12-16 04:03:38', '/sigap/PotonganAdd', 'Administrator', 'A', 'potongan', 'tidakhadirjamvalue', '59', '', '9000'),
	(2003, '2022-12-16 04:03:38', '/sigap/PotonganAdd', 'Administrator', 'A', 'potongan', 'value_tidakhadir', '59', '', '40000'),
	(2004, '2022-12-16 04:03:38', '/sigap/PotonganAdd', 'Administrator', 'A', 'potongan', 'value_pulcep', '59', '', '20000'),
	(2005, '2022-12-16 04:03:38', '/sigap/PotonganAdd', 'Administrator', 'A', 'potongan', 'value_terlambat', '59', '', '15000'),
	(2006, '2022-12-16 04:03:38', '/sigap/PotonganAdd', 'Administrator', 'A', 'potongan', 'total', '59', '', '168000'),
	(2007, '2022-12-16 04:03:38', '/sigap/PotonganAdd', 'Administrator', 'A', 'potongan', 'id', '59', '', '59'),
	(2008, '2022-12-16 04:07:30', '/sigap/PotonganAdd', 'Administrator', 'A', 'potongan', 'month', '60', '', NULL),
	(2009, '2022-12-16 04:07:30', '/sigap/PotonganAdd', 'Administrator', 'A', 'potongan', 'nama', '60', '', '110124'),
	(2010, '2022-12-16 04:07:30', '/sigap/PotonganAdd', 'Administrator', 'A', 'potongan', 'jenjang_id', '60', '', '1'),
	(2011, '2022-12-16 04:07:30', '/sigap/PotonganAdd', 'Administrator', 'A', 'potongan', 'jabatan_id', '60', '', '2'),
	(2012, '2022-12-16 04:07:30', '/sigap/PotonganAdd', 'Administrator', 'A', 'potongan', 'terlambat', '60', '', '2'),
	(2013, '2022-12-16 04:07:30', '/sigap/PotonganAdd', 'Administrator', 'A', 'potongan', 'izin', '60', '', '2'),
	(2014, '2022-12-16 04:07:30', '/sigap/PotonganAdd', 'Administrator', 'A', 'potongan', 'izinperjam', '60', '', NULL),
	(2015, '2022-12-16 04:07:30', '/sigap/PotonganAdd', 'Administrator', 'A', 'potongan', 'izinperjamvalue', '60', '', '4000'),
	(2016, '2022-12-16 04:07:30', '/sigap/PotonganAdd', 'Administrator', 'A', 'potongan', 'sakit', '60', '', NULL),
	(2017, '2022-12-16 04:07:30', '/sigap/PotonganAdd', 'Administrator', 'A', 'potongan', 'sakitperjam', '60', '', NULL),
	(2018, '2022-12-16 04:07:30', '/sigap/PotonganAdd', 'Administrator', 'A', 'potongan', 'sakitperjamvalue', '60', '', NULL),
	(2019, '2022-12-16 04:07:30', '/sigap/PotonganAdd', 'Administrator', 'A', 'potongan', 'tidakhadir', '60', '', NULL),
	(2020, '2022-12-16 04:07:30', '/sigap/PotonganAdd', 'Administrator', 'A', 'potongan', 'pulcep', '60', '', '2'),
	(2021, '2022-12-16 04:07:30', '/sigap/PotonganAdd', 'Administrator', 'A', 'potongan', 'tidakhadirjam', '60', '', '2'),
	(2022, '2022-12-16 04:07:30', '/sigap/PotonganAdd', 'Administrator', 'A', 'potongan', 'u_by', '60', '', '-1'),
	(2023, '2022-12-16 04:07:30', '/sigap/PotonganAdd', 'Administrator', 'A', 'potongan', 'datetime', '60', '', '2022-12-16 04:07:30'),
	(2024, '2022-12-16 04:07:30', '/sigap/PotonganAdd', 'Administrator', 'A', 'potongan', 'value_izin', '60', '', '30000'),
	(2025, '2022-12-16 04:07:30', '/sigap/PotonganAdd', 'Administrator', 'A', 'potongan', 'value_sakit', '60', '', NULL),
	(2026, '2022-12-16 04:07:30', '/sigap/PotonganAdd', 'Administrator', 'A', 'potongan', 'tidakhadirjamvalue', '60', '', '4000'),
	(2027, '2022-12-16 04:07:30', '/sigap/PotonganAdd', 'Administrator', 'A', 'potongan', 'value_tidakhadir', '60', '', '30000'),
	(2028, '2022-12-16 04:07:30', '/sigap/PotonganAdd', 'Administrator', 'A', 'potongan', 'value_pulcep', '60', '', '18000'),
	(2029, '2022-12-16 04:07:30', '/sigap/PotonganAdd', 'Administrator', 'A', 'potongan', 'value_terlambat', '60', '', '30000'),
	(2030, '2022-12-16 04:07:30', '/sigap/PotonganAdd', 'Administrator', 'A', 'potongan', 'total', '60', '', '164000'),
	(2031, '2022-12-16 04:07:30', '/sigap/PotonganAdd', 'Administrator', 'A', 'potongan', 'id', '60', '', '60'),
	(2032, '2022-12-16 04:08:54', '/sigap/PotonganDelete/60', 'Administrator', '*** Batch delete begin ***', 'potongan', '', '', '', ''),
	(2033, '2022-12-16 04:08:54', '/sigap/PotonganDelete/60', 'Administrator', 'D', 'potongan', 'id', '60', '60', ''),
	(2034, '2022-12-16 04:08:54', '/sigap/PotonganDelete/60', 'Administrator', 'D', 'potongan', 'nama', '60', '110124', ''),
	(2035, '2022-12-16 04:08:54', '/sigap/PotonganDelete/60', 'Administrator', 'D', 'potongan', 'terlambat', '60', '2', ''),
	(2036, '2022-12-16 04:08:54', '/sigap/PotonganDelete/60', 'Administrator', 'D', 'potongan', 'value_terlambat', '60', '30000', ''),
	(2037, '2022-12-16 04:08:54', '/sigap/PotonganDelete/60', 'Administrator', 'D', 'potongan', 'izin', '60', '2', ''),
	(2038, '2022-12-16 04:08:54', '/sigap/PotonganDelete/60', 'Administrator', 'D', 'potongan', 'value_izin', '60', '30000', ''),
	(2039, '2022-12-16 04:08:54', '/sigap/PotonganDelete/60', 'Administrator', 'D', 'potongan', 'jabatan_id', '60', '2', ''),
	(2040, '2022-12-16 04:08:54', '/sigap/PotonganDelete/60', 'Administrator', 'D', 'potongan', 'sakit', '60', NULL, ''),
	(2041, '2022-12-16 04:08:54', '/sigap/PotonganDelete/60', 'Administrator', 'D', 'potongan', 'value_sakit', '60', NULL, ''),
	(2042, '2022-12-16 04:08:54', '/sigap/PotonganDelete/60', 'Administrator', 'D', 'potongan', 'total', '60', '164000', ''),
	(2043, '2022-12-16 04:08:54', '/sigap/PotonganDelete/60', 'Administrator', 'D', 'potongan', 'tidakhadir', '60', NULL, ''),
	(2044, '2022-12-16 04:08:54', '/sigap/PotonganDelete/60', 'Administrator', 'D', 'potongan', 'value_tidakhadir', '60', '30000', ''),
	(2045, '2022-12-16 04:08:54', '/sigap/PotonganDelete/60', 'Administrator', 'D', 'potongan', 'month', '60', NULL, ''),
	(2046, '2022-12-16 04:08:54', '/sigap/PotonganDelete/60', 'Administrator', 'D', 'potongan', 'datetime', '60', '2022-12-16 04:07:30', ''),
	(2047, '2022-12-16 04:08:54', '/sigap/PotonganDelete/60', 'Administrator', 'D', 'potongan', 'u_by', '60', '-1', ''),
	(2048, '2022-12-16 04:08:54', '/sigap/PotonganDelete/60', 'Administrator', 'D', 'potongan', 'pulcep', '60', '2', ''),
	(2049, '2022-12-16 04:08:54', '/sigap/PotonganDelete/60', 'Administrator', 'D', 'potongan', 'value_pulcep', '60', '18000', ''),
	(2050, '2022-12-16 04:08:54', '/sigap/PotonganDelete/60', 'Administrator', 'D', 'potongan', 'tidakhadirjam', '60', '2', ''),
	(2051, '2022-12-16 04:08:54', '/sigap/PotonganDelete/60', 'Administrator', 'D', 'potongan', 'tidakhadirjamvalue', '60', '4000', ''),
	(2052, '2022-12-16 04:08:54', '/sigap/PotonganDelete/60', 'Administrator', 'D', 'potongan', 'sakitperjam', '60', NULL, ''),
	(2053, '2022-12-16 04:08:54', '/sigap/PotonganDelete/60', 'Administrator', 'D', 'potongan', 'sakitperjamvalue', '60', NULL, ''),
	(2054, '2022-12-16 04:08:54', '/sigap/PotonganDelete/60', 'Administrator', 'D', 'potongan', 'jenjang_id', '60', '1', ''),
	(2055, '2022-12-16 04:08:54', '/sigap/PotonganDelete/60', 'Administrator', 'D', 'potongan', 'izinperjam', '60', NULL, ''),
	(2056, '2022-12-16 04:08:54', '/sigap/PotonganDelete/60', 'Administrator', 'D', 'potongan', 'izinperjamvalue', '60', '4000', ''),
	(2057, '2022-12-16 04:08:54', '/sigap/PotonganDelete/60', 'Administrator', '*** Batch delete successful ***', 'potongan', '', '', '', ''),
	(2058, '2022-12-16 04:09:21', '/sigap/PotonganAdd', 'Administrator', 'A', 'potongan', 'month', '61', '', NULL),
	(2059, '2022-12-16 04:09:21', '/sigap/PotonganAdd', 'Administrator', 'A', 'potongan', 'nama', '61', '', '110124'),
	(2060, '2022-12-16 04:09:21', '/sigap/PotonganAdd', 'Administrator', 'A', 'potongan', 'jenjang_id', '61', '', '1'),
	(2061, '2022-12-16 04:09:21', '/sigap/PotonganAdd', 'Administrator', 'A', 'potongan', 'jabatan_id', '61', '', '2'),
	(2062, '2022-12-16 04:09:21', '/sigap/PotonganAdd', 'Administrator', 'A', 'potongan', 'terlambat', '61', '', '2'),
	(2063, '2022-12-16 04:09:21', '/sigap/PotonganAdd', 'Administrator', 'A', 'potongan', 'izin', '61', '', '2'),
	(2064, '2022-12-16 04:09:21', '/sigap/PotonganAdd', 'Administrator', 'A', 'potongan', 'izinperjam', '61', '', NULL),
	(2065, '2022-12-16 04:09:21', '/sigap/PotonganAdd', 'Administrator', 'A', 'potongan', 'izinperjamvalue', '61', '', '4000'),
	(2066, '2022-12-16 04:09:21', '/sigap/PotonganAdd', 'Administrator', 'A', 'potongan', 'sakit', '61', '', NULL),
	(2067, '2022-12-16 04:09:21', '/sigap/PotonganAdd', 'Administrator', 'A', 'potongan', 'sakitperjam', '61', '', NULL),
	(2068, '2022-12-16 04:09:21', '/sigap/PotonganAdd', 'Administrator', 'A', 'potongan', 'sakitperjamvalue', '61', '', '7000'),
	(2069, '2022-12-16 04:09:21', '/sigap/PotonganAdd', 'Administrator', 'A', 'potongan', 'tidakhadir', '61', '', NULL),
	(2070, '2022-12-16 04:09:21', '/sigap/PotonganAdd', 'Administrator', 'A', 'potongan', 'pulcep', '61', '', '2'),
	(2071, '2022-12-16 04:09:21', '/sigap/PotonganAdd', 'Administrator', 'A', 'potongan', 'tidakhadirjam', '61', '', '2'),
	(2072, '2022-12-16 04:09:21', '/sigap/PotonganAdd', 'Administrator', 'A', 'potongan', 'u_by', '61', '', '-1'),
	(2073, '2022-12-16 04:09:21', '/sigap/PotonganAdd', 'Administrator', 'A', 'potongan', 'datetime', '61', '', '2022-12-16 04:09:21'),
	(2074, '2022-12-16 04:09:21', '/sigap/PotonganAdd', 'Administrator', 'A', 'potongan', 'value_izin', '61', '', '30000'),
	(2075, '2022-12-16 04:09:21', '/sigap/PotonganAdd', 'Administrator', 'A', 'potongan', 'value_sakit', '61', '', '27000'),
	(2076, '2022-12-16 04:09:21', '/sigap/PotonganAdd', 'Administrator', 'A', 'potongan', 'tidakhadirjamvalue', '61', '', '4000'),
	(2077, '2022-12-16 04:09:21', '/sigap/PotonganAdd', 'Administrator', 'A', 'potongan', 'value_tidakhadir', '61', '', '30000'),
	(2078, '2022-12-16 04:09:21', '/sigap/PotonganAdd', 'Administrator', 'A', 'potongan', 'value_pulcep', '61', '', '18000'),
	(2079, '2022-12-16 04:09:21', '/sigap/PotonganAdd', 'Administrator', 'A', 'potongan', 'value_terlambat', '61', '', '30000'),
	(2080, '2022-12-16 04:09:21', '/sigap/PotonganAdd', 'Administrator', 'A', 'potongan', 'total', '61', '', '164000'),
	(2081, '2022-12-16 04:09:21', '/sigap/PotonganAdd', 'Administrator', 'A', 'potongan', 'id', '61', '', '61'),
	(2082, '2022-12-16 04:15:59', '/sigap/JabatanEdit/1', 'Administrator', 'U', 'jabatan', 'nama_jabatan', '1', 'CTO', 'TU'),
	(2083, '2022-12-16 04:16:12', '/sigap/JabatanEdit/2', 'Administrator', 'U', 'jabatan', 'nama_jabatan', '2', 'HRD', 'Kepala TU'),
	(2084, '2022-12-16 07:05:09', '/sigap/JabatanAdd', 'Administrator', 'A', 'jabatan', 'jenjang', '3', '', '1'),
	(2085, '2022-12-16 07:05:09', '/sigap/JabatanAdd', 'Administrator', 'A', 'jabatan', 'nama_jabatan', '3', '', 'Petugas Kebersihan'),
	(2086, '2022-12-16 07:05:09', '/sigap/JabatanAdd', 'Administrator', 'A', 'jabatan', 'keterangan', '3', '', 'baru'),
	(2087, '2022-12-16 07:05:09', '/sigap/JabatanAdd', 'Administrator', 'A', 'jabatan', 'c_date', '3', '', NULL),
	(2088, '2022-12-16 07:05:09', '/sigap/JabatanAdd', 'Administrator', 'A', 'jabatan', 'u_date', '3', '', '2022-12-16 07:05:09'),
	(2089, '2022-12-16 07:05:09', '/sigap/JabatanAdd', 'Administrator', 'A', 'jabatan', 'c_by', '3', '', NULL),
	(2090, '2022-12-16 07:05:09', '/sigap/JabatanAdd', 'Administrator', 'A', 'jabatan', 'u_by', '3', '', '-1'),
	(2091, '2022-12-16 07:05:09', '/sigap/JabatanAdd', 'Administrator', 'A', 'jabatan', 'aktif', '3', '', '1'),
	(2092, '2022-12-16 07:05:09', '/sigap/JabatanAdd', 'Administrator', 'A', 'jabatan', 'id', '3', '', '3'),
	(2093, '2022-12-16 07:06:02', '/sigap/JabatanEdit/1', 'Administrator', 'U', 'jabatan', 'jenjang', '1', NULL, '1'),
	(2094, '2022-12-16 07:08:49', '/sigap/JabatanEdit/2', 'Administrator', 'U', 'jabatan', 'jenjang', '2', NULL, '1'),
	(2095, '2022-12-16 09:14:07', '/sigap/PotonganAdd', 'Administrator', 'A', 'potongan', 'month', '62', '', NULL),
	(2096, '2022-12-16 09:14:07', '/sigap/PotonganAdd', 'Administrator', 'A', 'potongan', 'nama', '62', '', '110124'),
	(2097, '2022-12-16 09:14:07', '/sigap/PotonganAdd', 'Administrator', 'A', 'potongan', 'jenjang_id', '62', '', '1'),
	(2098, '2022-12-16 09:14:07', '/sigap/PotonganAdd', 'Administrator', 'A', 'potongan', 'jabatan_id', '62', '', '1'),
	(2099, '2022-12-16 09:14:07', '/sigap/PotonganAdd', 'Administrator', 'A', 'potongan', 'terlambat', '62', '', '1'),
	(2100, '2022-12-16 09:14:07', '/sigap/PotonganAdd', 'Administrator', 'A', 'potongan', 'izin', '62', '', '1'),
	(2101, '2022-12-16 09:14:07', '/sigap/PotonganAdd', 'Administrator', 'A', 'potongan', 'izinperjam', '62', '', NULL),
	(2102, '2022-12-16 09:14:07', '/sigap/PotonganAdd', 'Administrator', 'A', 'potongan', 'izinperjamvalue', '62', '', '9000'),
	(2103, '2022-12-16 09:14:07', '/sigap/PotonganAdd', 'Administrator', 'A', 'potongan', 'sakit', '62', '', NULL),
	(2104, '2022-12-16 09:14:07', '/sigap/PotonganAdd', 'Administrator', 'A', 'potongan', 'sakitperjam', '62', '', NULL),
	(2105, '2022-12-16 09:14:07', '/sigap/PotonganAdd', 'Administrator', 'A', 'potongan', 'sakitperjamvalue', '62', '', '4000'),
	(2106, '2022-12-16 09:14:07', '/sigap/PotonganAdd', 'Administrator', 'A', 'potongan', 'tidakhadir', '62', '', NULL),
	(2107, '2022-12-16 09:14:07', '/sigap/PotonganAdd', 'Administrator', 'A', 'potongan', 'pulcep', '62', '', '1'),
	(2108, '2022-12-16 09:14:07', '/sigap/PotonganAdd', 'Administrator', 'A', 'potongan', 'tidakhadirjam', '62', '', '1'),
	(2109, '2022-12-16 09:14:07', '/sigap/PotonganAdd', 'Administrator', 'A', 'potongan', 'u_by', '62', '', '-1'),
	(2110, '2022-12-16 09:14:08', '/sigap/PotonganAdd', 'Administrator', 'A', 'potongan', 'datetime', '62', '', '2022-12-16 09:14:07'),
	(2111, '2022-12-16 09:14:08', '/sigap/PotonganAdd', 'Administrator', 'A', 'potongan', 'value_izin', '62', '', '40000'),
	(2112, '2022-12-16 09:14:08', '/sigap/PotonganAdd', 'Administrator', 'A', 'potongan', 'value_sakit', '62', '', '23000'),
	(2113, '2022-12-16 09:14:08', '/sigap/PotonganAdd', 'Administrator', 'A', 'potongan', 'tidakhadirjamvalue', '62', '', '9000'),
	(2114, '2022-12-16 09:14:08', '/sigap/PotonganAdd', 'Administrator', 'A', 'potongan', 'value_tidakhadir', '62', '', '40000'),
	(2115, '2022-12-16 09:14:08', '/sigap/PotonganAdd', 'Administrator', 'A', 'potongan', 'value_pulcep', '62', '', '20000'),
	(2116, '2022-12-16 09:14:08', '/sigap/PotonganAdd', 'Administrator', 'A', 'potongan', 'value_terlambat', '62', '', '30000'),
	(2117, '2022-12-16 09:14:08', '/sigap/PotonganAdd', 'Administrator', 'A', 'potongan', 'total', '62', '', '99000'),
	(2118, '2022-12-16 09:14:08', '/sigap/PotonganAdd', 'Administrator', 'A', 'potongan', 'id', '62', '', '62'),
	(2119, '2022-12-19 05:25:48', '/sigap/login', 'Administrator', 'login', '::1', '', '', '', '');

-- Dumping structure for table sigap2.barang
CREATE TABLE IF NOT EXISTS `barang` (
  `Kode_Barang` char(3) NOT NULL,
  `Nama_Barang` varchar(20) DEFAULT NULL,
  PRIMARY KEY (`Kode_Barang`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

-- Dumping data for table sigap2.barang: 5 rows
/*!40000 ALTER TABLE `barang` DISABLE KEYS */;
INSERT INTO `barang` (`Kode_Barang`, `Nama_Barang`) VALUES
	('001', 'Barang Pertama'),
	('002', 'Barang Kedua'),
	('003', 'Barang Ketiga'),
	('004', 'Barang Keempat'),
	('005', 'Barang Kelima');
/*!40000 ALTER TABLE `barang` ENABLE KEYS */;

-- Dumping structure for table sigap2.barangnew
CREATE TABLE IF NOT EXISTS `barangnew` (
  `kode_barang` char(50) DEFAULT NULL,
  `nama_barang` varchar(50) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- Dumping data for table sigap2.barangnew: ~0 rows (approximately)

-- Dumping structure for table sigap2.berita
CREATE TABLE IF NOT EXISTS `berita` (
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

-- Dumping data for table sigap2.berita: ~0 rows (approximately)

-- Dumping structure for table sigap2.bulan
CREATE TABLE IF NOT EXISTS `bulan` (
  `id` int NOT NULL AUTO_INCREMENT,
  `bulan` varchar(50) DEFAULT NULL,
  `nourut` int DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=13 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- Dumping data for table sigap2.bulan: ~12 rows (approximately)
INSERT INTO `bulan` (`id`, `bulan`, `nourut`) VALUES
	(1, 'Januari', 1),
	(2, 'Februari', 2),
	(3, 'Maret', 3),
	(4, 'April', 4),
	(5, 'Mei', 5),
	(6, 'Juni', 6),
	(7, 'Juli', 7),
	(8, 'Agustus', 8),
	(9, 'September', 9),
	(10, 'Oktober', 10),
	(11, 'November', 11),
	(12, 'Desember', 12);

-- Dumping structure for table sigap2.daftarbarang
CREATE TABLE IF NOT EXISTS `daftarbarang` (
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

-- Dumping data for table sigap2.daftarbarang: ~0 rows (approximately)

-- Dumping structure for table sigap2.dinasluar
CREATE TABLE IF NOT EXISTS `dinasluar` (
  `id` int NOT NULL AUTO_INCREMENT,
  `pegawai` int DEFAULT NULL,
  `pm` int DEFAULT NULL,
  `proyek` varchar(255) DEFAULT NULL,
  `tgl` datetime DEFAULT NULL,
  `tgl_dl_awal` date DEFAULT NULL,
  `tgl_dl_akhir` date DEFAULT NULL,
  `jenis` varchar(255) DEFAULT NULL,
  `keterangan` varchar(255) DEFAULT NULL,
  `disetujui` varchar(5) DEFAULT NULL,
  `dokumen` varchar(255) DEFAULT NULL,
  PRIMARY KEY (`id`) USING BTREE
) ENGINE=InnoDB DEFAULT CHARSET=latin1 ROW_FORMAT=DYNAMIC;

-- Dumping data for table sigap2.dinasluar: ~0 rows (approximately)

-- Dumping structure for table sigap2.gaji
CREATE TABLE IF NOT EXISTS `gaji` (
  `id` int NOT NULL AUTO_INCREMENT,
  `pegawai` varchar(50) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci DEFAULT NULL,
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
  `status` varchar(50) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci DEFAULT NULL,
  `tahun` int DEFAULT NULL,
  `bulan` int DEFAULT NULL,
  `potongan_bendahara` bigint DEFAULT NULL,
  `voucher` bigint DEFAULT NULL,
  PRIMARY KEY (`id`) USING BTREE
) ENGINE=InnoDB AUTO_INCREMENT=1434277 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci ROW_FORMAT=DYNAMIC;

-- Dumping data for table sigap2.gaji: ~31 rows (approximately)
INSERT INTO `gaji` (`id`, `pegawai`, `datetime`, `month`, `lembur`, `value_lembur`, `jabatan_id`, `gapok`, `total`, `value_reward`, `value_inval`, `piket_count`, `value_piket`, `tugastambahan`, `tj_jabatan`, `kehadiran`, `sub_total`, `potongan`, `jenjang_id`, `penyesuaian`, `pid`, `jp`, `type`, `jenis_guru`, `tambahan`, `value_kehadiran`, `periode`, `tunjangan_periode`, `total_gapok`, `lama_kerja`, `status`, `tahun`, `bulan`, `potongan_bendahara`, `voucher`) VALUES
	(1434200, '10230', '2023-01-24 08:13:01', '2023-01-24', NULL, NULL, 5, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 4, NULL, 123, NULL, 1, 1, NULL, NULL, 4, NULL, NULL, 2, '0', 2023, 2, NULL, NULL),
	(1434201, '10230', '2023-01-24 08:14:45', '2023-01-24', NULL, NULL, 5, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 4, NULL, 124, NULL, 1, NULL, NULL, NULL, 4, NULL, NULL, NULL, '0', 2023, 2, NULL, NULL),
	(1434204, '10230', '2023-01-24 08:25:47', '2023-01-24', NULL, NULL, 5, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 4, NULL, 127, NULL, 1, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '0', 2023, 2, NULL, NULL),
	(1434205, '10230', '2023-01-24 08:26:55', '2023-01-24', NULL, NULL, 5, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 4, NULL, 128, NULL, 1, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 2023, 8, NULL, NULL),
	(1434210, '10230', '2023-01-24 08:34:34', '2023-01-24', NULL, NULL, 5, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 4, NULL, 132, NULL, 1, NULL, NULL, NULL, NULL, NULL, NULL, 2, '0', 2023, 2, NULL, NULL),
	(1434212, '10230', '2023-01-24 08:37:12', '2023-01-24', NULL, NULL, 5, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 4, NULL, 135, NULL, 1, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '0', 2023, 2, NULL, NULL),
	(1434213, '10235', '2023-01-24 08:37:12', '2023-01-24', NULL, NULL, 9, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 4, NULL, 135, NULL, 1, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '0', 2023, 2, NULL, NULL),
	(1434216, '10230', '2023-01-24 08:52:28', '2023-01-24', NULL, NULL, 5, NULL, 164000, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 14000, 4, 178000, 138, NULL, 1, NULL, NULL, NULL, 4, NULL, NULL, 2, NULL, 2023, 4, NULL, 30000),
	(1434217, '10230', '2023-01-24 08:54:33', '2023-01-24', NULL, NULL, 5, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 4, NULL, 139, NULL, 1, 1, NULL, NULL, 4, NULL, NULL, 2, '0', 2023, 2, NULL, NULL),
	(1434220, '10230', '2023-01-24 09:43:18', '2023-01-24', NULL, NULL, 5, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 4, NULL, 144, NULL, 1, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '0', 2023, 2, NULL, NULL),
	(1434221, '10235', '2023-01-24 09:43:18', '2023-01-24', NULL, NULL, 9, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 4, NULL, 144, NULL, 1, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '0', 2023, 2, NULL, NULL),
	(1434223, '10230', '2023-01-24 09:50:34', '2023-01-24', NULL, NULL, 5, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 4, NULL, 150, NULL, 1, NULL, NULL, NULL, NULL, NULL, NULL, 2, '0', 2023, 2, NULL, NULL),
	(1434226, '10230', '2023-01-24 09:52:36', '2023-01-24', NULL, NULL, 5, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 4, NULL, 153, NULL, 1, 1, 2, NULL, 4, NULL, NULL, 2, NULL, 2023, 4, NULL, NULL),
	(1434228, '10230', '2023-01-24 14:15:34', '2023-01-24', NULL, NULL, 5, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 4, NULL, 76, NULL, 1, 1, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 2023, 4, NULL, NULL),
	(1434229, '10235', '2023-01-24 14:15:34', '2023-01-24', NULL, NULL, 9, NULL, -156750, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 156750, 4, 0, 76, NULL, 1, 2, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 2023, 4, NULL, 40000),
	(1434231, '10230', '2023-01-24 15:02:02', '2023-01-24', NULL, NULL, 5, 2500, NULL, 50000, 25000, 2, 7000, 125000, NULL, 2, NULL, 56000, 4, NULL, 173, NULL, 1, 1, 2, 56000, 4, 450000, NULL, 2, NULL, 2023, 4, NULL, NULL),
	(1434232, '10230', '2023-01-24 16:38:43', '2023-01-24', NULL, NULL, 5, 2500, 836000, 50000, 25000, 2, 7000, 125000, NULL, 2, 836000, 56000, 4, NULL, 192, NULL, 1, 1, 2, 56000, 4, 450000, NULL, 2, NULL, 2023, 4, NULL, NULL),
	(1434233, '10230', '2023-01-24 16:41:45', '2023-01-24', NULL, NULL, 5, 2500, 780000, 50000, 25000, 2, 7000, 125000, NULL, 2, 836000, 56000, 4, NULL, 193, NULL, 1, 1, 2, 56000, 4, 450000, NULL, 2, NULL, 2023, 4, NULL, NULL),
	(1434234, '10230', '2023-01-24 16:43:25', '2023-01-24', 2, 30000, 5, 2500, 780000, 50000, 25000, 2, 7000, 125000, NULL, 2, 836000, 56000, 4, NULL, 194, NULL, 1, 1, 2, 56000, 4, 450000, NULL, 2, NULL, 2023, 4, NULL, NULL),
	(1434235, '10230', '2023-01-25 03:54:26', '2023-01-25', 2, 30000, 5, 2500, 808000, 50000, 25000, 2, 7000, 125000, NULL, 2, 836000, 28000, 4, NULL, 195, NULL, 1, 1, 2, 56000, 4, 450000, NULL, 2, NULL, 2023, 4, NULL, NULL),
	(1434236, '10230', '2023-01-25 04:47:09', '2023-01-25', NULL, NULL, 5, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 4, NULL, 77, NULL, 1, 1, NULL, NULL, NULL, NULL, NULL, NULL, '0', 2023, 2, NULL, NULL),
	(1434237, '10235', '2023-01-25 04:47:09', '2023-01-25', NULL, NULL, 9, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 4, NULL, 77, NULL, 1, 2, NULL, NULL, NULL, NULL, NULL, NULL, '0', 2023, 2, NULL, NULL),
	(1434238, '102327', '2023-01-25 06:56:24', '2023-01-25', NULL, NULL, 5, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 4, NULL, 21, NULL, 1, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 2023, 4, NULL, NULL),
	(1434239, '102327', '2023-01-25 06:56:32', '2023-01-25', NULL, NULL, 5, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 4, NULL, 22, NULL, 1, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 2023, 4, NULL, NULL),
	(1434240, '102327', '2023-01-25 06:57:41', '2023-01-25', NULL, NULL, 5, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 4, NULL, 24, NULL, 1, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 2023, 4, NULL, NULL),
	(1434241, '1023271', '2023-01-25 07:21:23', '2023-01-25', NULL, 30000, 5, 2500, 625000, 50000, 25000, NULL, 7000, 100000, NULL, NULL, 625000, NULL, 2, NULL, 205, NULL, 1, 1, 2, 56000, 4, 450000, NULL, 2, NULL, 2023, 4, NULL, NULL),
	(1434255, '10237', '2023-01-26 01:01:58', '2023-01-26', NULL, NULL, 5, NULL, 610000, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 610000, 0, 2, 0, 218, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 2023, 12, NULL, NULL),
	(1434258, '10237', '2023-02-02 04:10:20', '2023-02-02', 13000, 13000, 5, 1000, 585000, NULL, 66000, 0, 8250, 100000, 0, 0, 585000, 0, 2, 0, 459, 0, 1, 2, 2, 66000, 2, 435000, 0, 2, NULL, 2023, 12, NULL, 0),
	(1434261, '10237', '2023-02-02 04:23:56', '2023-02-02', 13000, 13000, 5, 1000, 585000, NULL, 66000, 0, 8250, 100000, 0, 0, 585000, 0, 2, 0, 233, 0, 1, 2, 2, 66000, 2, 435000, 0, 2, NULL, 2024, 11, NULL, 0),
	(1434275, '10237', '2023-02-08 08:51:50', '2023-02-08', 0, 13000, 5, 1000, 585000, 50000, 0, 0, 8250, 100000, 0, 0, 585000, 0, 2, 0, 247, 0, 1, 2, 2, 66000, 2, 435000, 0, 2, NULL, 2023, 1, NULL, 0),
	(1434276, '10237', '2023-02-13 04:00:15', '2023-02-13', 0, 13000, 5, 1000, 585000, 50000, 0, 0, 8250, 100000, 0, 0, 585000, 0, 2, 0, 248, 0, 1, 2, 2, 66000, 2, 435000, 0, 2, NULL, 2023, 11, NULL, 0);

-- Dumping structure for table sigap2.gajisd
CREATE TABLE IF NOT EXISTS `gajisd` (
  `id` int NOT NULL AUTO_INCREMENT,
  `tahun` smallint DEFAULT NULL,
  `bulan` int DEFAULT NULL,
  `datetime` datetime DEFAULT NULL,
  `createby` int DEFAULT NULL,
  PRIMARY KEY (`id`) USING BTREE
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci ROW_FORMAT=DYNAMIC;

-- Dumping data for table sigap2.gajisd: ~0 rows (approximately)
INSERT INTO `gajisd` (`id`, `tahun`, `bulan`, `datetime`, `createby`) VALUES
	(1, 2, 2, NULL, NULL);

-- Dumping structure for table sigap2.gajisd_detil
CREATE TABLE IF NOT EXISTS `gajisd_detil` (
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
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci ROW_FORMAT=DYNAMIC;

-- Dumping data for table sigap2.gajisd_detil: ~0 rows (approximately)

-- Dumping structure for table sigap2.gajisma
CREATE TABLE IF NOT EXISTS `gajisma` (
  `id` int NOT NULL AUTO_INCREMENT,
  `tahun` smallint DEFAULT NULL,
  `bulan` int DEFAULT NULL,
  `datetime` datetime DEFAULT NULL,
  `createby` int DEFAULT NULL,
  PRIMARY KEY (`id`) USING BTREE
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci ROW_FORMAT=DYNAMIC;

-- Dumping data for table sigap2.gajisma: ~0 rows (approximately)

-- Dumping structure for table sigap2.gajisma_detil
CREATE TABLE IF NOT EXISTS `gajisma_detil` (
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
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci ROW_FORMAT=DYNAMIC;

-- Dumping data for table sigap2.gajisma_detil: ~0 rows (approximately)

-- Dumping structure for table sigap2.gajismk
CREATE TABLE IF NOT EXISTS `gajismk` (
  `id` int NOT NULL AUTO_INCREMENT,
  `tahun` smallint DEFAULT NULL,
  `bulan` int DEFAULT NULL,
  `datetime` datetime DEFAULT NULL,
  `createby` int DEFAULT NULL,
  PRIMARY KEY (`id`) USING BTREE
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci ROW_FORMAT=DYNAMIC;

-- Dumping data for table sigap2.gajismk: ~0 rows (approximately)

-- Dumping structure for table sigap2.gajismk_detil
CREATE TABLE IF NOT EXISTS `gajismk_detil` (
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
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci ROW_FORMAT=DYNAMIC;

-- Dumping data for table sigap2.gajismk_detil: ~0 rows (approximately)

-- Dumping structure for table sigap2.gajismp
CREATE TABLE IF NOT EXISTS `gajismp` (
  `id` int NOT NULL AUTO_INCREMENT,
  `tahun` smallint DEFAULT NULL,
  `bulan` int DEFAULT NULL,
  `datetime` datetime DEFAULT NULL,
  `createby` int DEFAULT NULL,
  PRIMARY KEY (`id`) USING BTREE
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci ROW_FORMAT=DYNAMIC;

-- Dumping data for table sigap2.gajismp: ~0 rows (approximately)

-- Dumping structure for table sigap2.gajismp_detil
CREATE TABLE IF NOT EXISTS `gajismp_detil` (
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
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci ROW_FORMAT=DYNAMIC;

-- Dumping data for table sigap2.gajismp_detil: ~0 rows (approximately)

-- Dumping structure for table sigap2.gajitk
CREATE TABLE IF NOT EXISTS `gajitk` (
  `id` int NOT NULL AUTO_INCREMENT,
  `tahun` smallint DEFAULT NULL,
  `bulan` int DEFAULT NULL,
  `datetime` datetime DEFAULT NULL,
  `createby` int DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- Dumping data for table sigap2.gajitk: ~0 rows (approximately)

-- Dumping structure for table sigap2.gajitk_detil
CREATE TABLE IF NOT EXISTS `gajitk_detil` (
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
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- Dumping data for table sigap2.gajitk_detil: ~0 rows (approximately)

-- Dumping structure for table sigap2.gajitunjangan
CREATE TABLE IF NOT EXISTS `gajitunjangan` (
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
) ENGINE=InnoDB AUTO_INCREMENT=12 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci ROW_FORMAT=DYNAMIC;

-- Dumping data for table sigap2.gajitunjangan: ~11 rows (approximately)
INSERT INTO `gajitunjangan` (`id`, `pidjabatan`, `value_kehadiran`, `gapok`, `tunjangan_jabatan`, `reward`, `lembur`, `piket`, `inval`, `jam_lebih`, `tunjangan_khusus`, `ekstrakuri`) VALUES
	(1, 1, 65500, 80000, NULL, 40000, 40000, 30000, 10000, 70000, 120000, NULL),
	(2, 2, 65500, 40000, 1500000, 30000, 42000, 30000, 10000, 70000, NULL, NULL),
	(3, 3, 60000, 300000, NULL, NULL, NULL, NULL, NULL, 10000, NULL, NULL),
	(4, 5, 56000, NULL, 450000, 50000, 50000, 30000, NULL, NULL, NULL, NULL),
	(5, 9, NULL, NULL, NULL, 50000, 30000, 35000, 25000, NULL, NULL, NULL),
	(6, 11, 60000, 300000, NULL, NULL, 10000, NULL, NULL, NULL, NULL, NULL),
	(7, 10, 60000, 300000, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
	(8, 12, 75000, 450000, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
	(9, 6, NULL, NULL, 70000, 50000, NULL, NULL, NULL, NULL, NULL, NULL),
	(10, 15, NULL, NULL, 250000, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
	(11, 13, NULL, NULL, 100000, NULL, NULL, NULL, NULL, NULL, NULL, NULL);

-- Dumping structure for table sigap2.gaji_karyawan_sd
CREATE TABLE IF NOT EXISTS `gaji_karyawan_sd` (
  `id` int NOT NULL AUTO_INCREMENT,
  `pegawai` varchar(50) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci DEFAULT NULL,
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
  PRIMARY KEY (`id`) USING BTREE
) ENGINE=InnoDB AUTO_INCREMENT=78 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci ROW_FORMAT=DYNAMIC;

-- Dumping data for table sigap2.gaji_karyawan_sd: ~3 rows (approximately)
INSERT INTO `gaji_karyawan_sd` (`id`, `pegawai`, `jabatan_id`, `jenjang_id`, `gapok`, `value_reward`, `value_inval`, `kehadiran`, `sub_total`, `potongan`, `penyesuaian`, `total`, `pid`, `value_kehadiran`, `status`, `tahun`, `bulan`, `voucher`, `potongan_bendahara`) VALUES
	(74, '10232124', 11, 4, 300000, NULL, 0, 0, 300000, 0, 0, 300000, 6, 60000, NULL, 2023, 12, 0, NULL),
	(75, '10232124', 11, 4, 300000, NULL, 0, 0, 300000, 0, 0, 300000, 7, 60000, NULL, 2024, 1, 0, NULL),
	(77, '10232124', 11, 4, 300000, NULL, 0, 0, 300000, 0, 0, 300000, 9, 60000, NULL, 2023, 11, 0, NULL);

-- Dumping structure for table sigap2.gaji_karyawan_sma
CREATE TABLE IF NOT EXISTS `gaji_karyawan_sma` (
  `id` int NOT NULL AUTO_INCREMENT,
  `pegawai` varchar(50) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci DEFAULT NULL,
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
) ENGINE=InnoDB AUTO_INCREMENT=611 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci ROW_FORMAT=DYNAMIC;

-- Dumping data for table sigap2.gaji_karyawan_sma: ~84 rows (approximately)
INSERT INTO `gaji_karyawan_sma` (`id`, `pegawai`, `jabatan_id`, `jenjang_id`, `gapok`, `value_reward`, `value_inval`, `kehadiran`, `sub_total`, `potongan`, `penyesuaian`, `total`, `pid`, `value_kehadiran`, `status`, `tahun`, `bulan`, `voucher`, `potongan_bendahara`, `jaminan_pensiun`, `jaminan_hari_tua`, `total_pph21`, `bpjs__kesehatan`) VALUES
	(387, '102321', 11, 4, 300000, NULL, 0, 26, 1860000, 0, 0, 1860000, 66, 60000, NULL, 2023, 1, 0, NULL, NULL, NULL, NULL, NULL),
	(388, '3578102612760004', 5, 4, 0, NULL, 0, 0, 0, 0, 0, 0, 66, 0, NULL, 2023, 1, 0, NULL, NULL, NULL, NULL, NULL),
	(389, '3578165507710006', 5, 4, 0, NULL, 0, 0, 0, 0, 0, 0, 66, 0, NULL, 2023, 1, 0, NULL, NULL, NULL, NULL, NULL),
	(390, '3578165507711006', 5, 4, 0, NULL, 0, 0, 0, 0, 0, 0, 66, 0, NULL, 2023, 1, 0, NULL, NULL, NULL, NULL, NULL),
	(391, '3578161404690001', 5, 4, 0, NULL, 0, 0, 0, 0, 0, 0, 66, 0, NULL, 2023, 1, 0, NULL, NULL, NULL, NULL, NULL),
	(392, '3578295412710002', 5, 4, 0, NULL, 0, 0, 0, 0, 0, 0, 66, 0, NULL, 2023, 1, 0, NULL, NULL, NULL, NULL, NULL),
	(393, '3578161506970003', 5, 4, 0, NULL, 0, 0, 0, 0, 0, 0, 66, 0, NULL, 2023, 1, 0, NULL, NULL, NULL, NULL, NULL),
	(394, '3578051311890004', 5, 4, 0, NULL, 0, 0, 0, 0, 0, 0, 66, 0, NULL, 2023, 1, 0, NULL, NULL, NULL, NULL, NULL),
	(395, '3578172010790002', 5, 4, 0, NULL, 0, 0, 0, 0, 0, 0, 66, 0, NULL, 2023, 1, 0, NULL, NULL, NULL, NULL, NULL),
	(396, '3578170707550002', 5, 4, 0, NULL, 0, 0, 0, 0, 0, 0, 66, 0, NULL, 2023, 1, 0, NULL, NULL, NULL, NULL, NULL),
	(397, '3578081505630004', 5, 4, 0, NULL, 0, 0, 0, 0, 0, 0, 66, 0, NULL, 2023, 1, 0, NULL, NULL, NULL, NULL, NULL),
	(398, '3578081505630005', 5, 4, 0, NULL, 0, 0, 0, 0, 0, 0, 66, 0, NULL, 2023, 1, 0, NULL, NULL, NULL, NULL, NULL),
	(399, '3578161406900005', 5, 4, 0, NULL, 0, 0, 0, 0, 0, 0, 66, 0, NULL, 2023, 1, 0, NULL, NULL, NULL, NULL, NULL),
	(400, '3528040303970001', 5, 4, 0, NULL, 0, 0, 0, 0, 0, 0, 66, 0, NULL, 2023, 1, 0, NULL, NULL, NULL, NULL, NULL),
	(471, '102321', 11, 4, 300000, NULL, 0, 26, 1860000, 0, 0, 1860000, 72, 60000, NULL, 2023, 6, 0, NULL, NULL, NULL, NULL, NULL),
	(472, '3578102612760004', 5, 4, 0, NULL, 0, 0, 0, 0, 0, 0, 72, 0, NULL, 2023, 6, 0, NULL, NULL, NULL, NULL, NULL),
	(473, '3578165507710006', 5, 4, 0, NULL, 0, 0, 0, 0, 0, 0, 72, 0, NULL, 2023, 6, 0, NULL, NULL, NULL, NULL, NULL),
	(474, '3578165507711006', 5, 4, 0, NULL, 0, 0, 0, 0, 0, 0, 72, 0, NULL, 2023, 6, 0, NULL, NULL, NULL, NULL, NULL),
	(475, '3578161404690001', 5, 4, 0, NULL, 0, 0, 0, 0, 0, 0, 72, 0, NULL, 2023, 6, 0, NULL, NULL, NULL, NULL, NULL),
	(476, '3578295412710002', 5, 4, 0, NULL, 0, 0, 0, 0, 0, 0, 72, 0, NULL, 2023, 6, 0, NULL, NULL, NULL, NULL, NULL),
	(477, '3578161506970003', 5, 4, 0, NULL, 0, 0, 0, 0, 0, 0, 72, 0, NULL, 2023, 6, 0, NULL, NULL, NULL, NULL, NULL),
	(478, '3578051311890004', 5, 4, 0, NULL, 0, 0, 0, 0, 0, 0, 72, 0, NULL, 2023, 6, 0, NULL, NULL, NULL, NULL, NULL),
	(479, '3578172010790002', 5, 4, 0, NULL, 0, 0, 0, 0, 0, 0, 72, 0, NULL, 2023, 6, 0, NULL, NULL, NULL, NULL, NULL),
	(480, '3578170707550002', 5, 4, 0, NULL, 0, 0, 0, 0, 0, 0, 72, 0, NULL, 2023, 6, 0, NULL, NULL, NULL, NULL, NULL),
	(481, '3578081505630004', 5, 4, 0, NULL, 0, 0, 0, 0, 0, 0, 72, 0, NULL, 2023, 6, 0, NULL, NULL, NULL, NULL, NULL),
	(482, '3578081505630005', 5, 4, 0, NULL, 0, 0, 0, 0, 0, 0, 72, 0, NULL, 2023, 6, 0, NULL, NULL, NULL, NULL, NULL),
	(483, '3578161406900005', 5, 4, 0, NULL, 0, 0, 0, 0, 0, 0, 72, 0, NULL, 2023, 6, 0, NULL, NULL, NULL, NULL, NULL),
	(484, '3528040303970001', 5, 4, 0, NULL, 0, 0, 0, 0, 0, 0, 72, 0, NULL, 2023, 6, 0, NULL, NULL, NULL, NULL, NULL),
	(541, '102321', 11, 4, 300000, NULL, 0, 26, 1860000, 11160, 0, 1848840, 77, 60000, NULL, 2023, 12, 0, NULL, 3000, 6000, 2160, NULL),
	(542, '3578102612760004', 5, 4, 0, NULL, 0, 0, 0, 2160, 0, -2160, 77, 0, NULL, 2023, 12, 0, NULL, 0, 0, 2160, NULL),
	(543, '3578165507710006', 5, 4, 0, NULL, 0, 0, 0, 2160, 0, -2160, 77, 0, NULL, 2023, 12, 0, NULL, 0, 0, 2160, NULL),
	(544, '3578165507711006', 5, 4, 0, NULL, 0, 0, 0, 2160, 0, -2160, 77, 0, NULL, 2023, 12, 0, NULL, 0, 0, 2160, NULL),
	(545, '3578161404690001', 5, 4, 0, NULL, 0, 0, 0, 2160, 0, -2160, 77, 0, NULL, 2023, 12, 0, NULL, 0, 0, 2160, NULL),
	(546, '3578295412710002', 5, 4, 0, NULL, 0, 0, 0, 2160, 0, -2160, 77, 0, NULL, 2023, 12, 0, NULL, 0, 0, 2160, NULL),
	(547, '3578161506970003', 5, 4, 0, NULL, 0, 0, 0, 2160, 0, -2160, 77, 0, NULL, 2023, 12, 0, NULL, 0, 0, 2160, NULL),
	(548, '3578051311890004', 5, 4, 0, NULL, 0, 0, 0, 2160, 0, -2160, 77, 0, NULL, 2023, 12, 0, NULL, 0, 0, 2160, NULL),
	(549, '3578172010790002', 5, 4, 0, NULL, 0, 0, 0, 2160, 0, -2160, 77, 0, NULL, 2023, 12, 0, NULL, 0, 0, 2160, NULL),
	(550, '3578170707550002', 5, 4, 0, NULL, 0, 0, 0, 2160, 0, -2160, 77, 0, NULL, 2023, 12, 0, NULL, 0, 0, 2160, NULL),
	(551, '3578081505630004', 5, 4, 0, NULL, 0, 0, 0, 2160, 0, -2160, 77, 0, NULL, 2023, 12, 0, NULL, 0, 0, 2160, NULL),
	(552, '3578081505630005', 5, 4, 0, NULL, 0, 0, 0, 2160, 0, -2160, 77, 0, NULL, 2023, 12, 0, NULL, 0, 0, 2160, NULL),
	(553, '3578161406900005', 5, 4, 0, NULL, 0, 0, 0, 2160, 0, -2160, 77, 0, NULL, 2023, 12, 0, NULL, 0, 0, 2160, NULL),
	(554, '3528040303970001', 5, 4, 0, NULL, 0, 0, 0, 2160, 0, -2160, 77, 0, NULL, 2023, 12, 0, NULL, 0, 0, 2160, NULL),
	(555, '102321', 11, 4, 300000, NULL, 0, 26, 1860000, 11160, 0, 1848840, 80, 60000, NULL, 2023, 11, 0, NULL, 3000, 6000, 2160, NULL),
	(556, '3578102612760004', 5, 4, 0, NULL, 0, 0, 0, 2160, 0, -2160, 80, 0, NULL, 2023, 11, 0, NULL, 0, 0, 2160, NULL),
	(557, '3578165507710006', 5, 4, 0, NULL, 0, 0, 0, 2160, 0, -2160, 80, 0, NULL, 2023, 11, 0, NULL, 0, 0, 2160, NULL),
	(558, '3578165507711006', 5, 4, 0, NULL, 0, 0, 0, 2160, 0, -2160, 80, 0, NULL, 2023, 11, 0, NULL, 0, 0, 2160, NULL),
	(559, '3578161404690001', 5, 4, 0, NULL, 0, 0, 0, 2160, 0, -2160, 80, 0, NULL, 2023, 11, 0, NULL, 0, 0, 2160, NULL),
	(560, '3578295412710002', 5, 4, 0, NULL, 0, 0, 0, 2160, 0, -2160, 80, 0, NULL, 2023, 11, 0, NULL, 0, 0, 2160, NULL),
	(561, '3578161506970003', 5, 4, 0, NULL, 0, 0, 0, 2160, 0, -2160, 80, 0, NULL, 2023, 11, 0, NULL, 0, 0, 2160, NULL),
	(562, '3578051311890004', 5, 4, 0, NULL, 0, 0, 0, 2160, 0, -2160, 80, 0, NULL, 2023, 11, 0, NULL, 0, 0, 2160, NULL),
	(563, '3578172010790002', 5, 4, 0, NULL, 0, 0, 0, 2160, 0, -2160, 80, 0, NULL, 2023, 11, 0, NULL, 0, 0, 2160, NULL),
	(564, '3578170707550002', 5, 4, 0, NULL, 0, 0, 0, 2160, 0, -2160, 80, 0, NULL, 2023, 11, 0, NULL, 0, 0, 2160, NULL),
	(565, '3578081505630004', 5, 4, 0, NULL, 0, 0, 0, 2160, 0, -2160, 80, 0, NULL, 2023, 11, 0, NULL, 0, 0, 2160, NULL),
	(566, '3578081505630005', 5, 4, 0, NULL, 0, 0, 0, 2160, 0, -2160, 80, 0, NULL, 2023, 11, 0, NULL, 0, 0, 2160, NULL),
	(567, '3578161406900005', 5, 4, 0, NULL, 0, 0, 0, 2160, 0, -2160, 80, 0, NULL, 2023, 11, 0, NULL, 0, 0, 2160, NULL),
	(568, '3528040303970001', 5, 4, 0, NULL, 0, 0, 0, 2160, 0, -2160, 80, 0, NULL, 2023, 11, 0, NULL, 0, 0, 2160, NULL),
	(583, '102321', 11, 4, 300000, NULL, 0, 26, 1860000, 18000, 0, 1842000, 87, 60000, NULL, 2023, 7, 0, NULL, 3000, 6000, 9000, NULL),
	(584, '3578102612760004', 5, 4, 0, NULL, 0, 0, 0, 0, 0, 0, 87, 0, NULL, 2023, 7, 0, NULL, 0, 0, 0, NULL),
	(585, '3578165507710006', 5, 4, 0, NULL, 0, 0, 0, 0, 0, 0, 87, 0, NULL, 2023, 7, 0, NULL, 0, 0, 0, NULL),
	(586, '3578165507711006', 5, 4, 0, NULL, 0, 0, 0, 0, 0, 0, 87, 0, NULL, 2023, 7, 0, NULL, 0, 0, 0, NULL),
	(587, '3578161404690001', 5, 4, 0, NULL, 0, 0, 0, 0, 0, 0, 87, 0, NULL, 2023, 7, 0, NULL, 0, 0, 0, NULL),
	(588, '3578295412710002', 5, 4, 0, NULL, 0, 0, 0, 0, 0, 0, 87, 0, NULL, 2023, 7, 0, NULL, 0, 0, 0, NULL),
	(589, '3578161506970003', 5, 4, 0, NULL, 0, 0, 0, 0, 0, 0, 87, 0, NULL, 2023, 7, 0, NULL, 0, 0, 0, NULL),
	(590, '3578051311890004', 5, 4, 0, NULL, 0, 0, 0, 0, 0, 0, 87, 0, NULL, 2023, 7, 0, NULL, 0, 0, 0, NULL),
	(591, '3578172010790002', 5, 4, 0, NULL, 0, 0, 0, 0, 0, 0, 87, 0, NULL, 2023, 7, 0, NULL, 0, 0, 0, NULL),
	(592, '3578170707550002', 5, 4, 0, NULL, 0, 0, 0, 0, 0, 0, 87, 0, NULL, 2023, 7, 0, NULL, 0, 0, 0, NULL),
	(593, '3578081505630004', 5, 4, 0, NULL, 0, 0, 0, 0, 0, 0, 87, 0, NULL, 2023, 7, 0, NULL, 0, 0, 0, NULL),
	(594, '3578081505630005', 5, 4, 0, NULL, 0, 0, 0, 0, 0, 0, 87, 0, NULL, 2023, 7, 0, NULL, 0, 0, 0, NULL),
	(595, '3578161406900005', 5, 4, 0, NULL, 0, 0, 0, 0, 0, 0, 87, 0, NULL, 2023, 7, 0, NULL, 0, 0, 0, NULL),
	(596, '3528040303970001', 5, 4, 0, NULL, 0, 0, 0, 0, 0, 0, 87, 0, NULL, 2023, 7, 0, NULL, 0, 0, 0, NULL),
	(597, '102321', 11, 4, 300000, NULL, 0, 26, 1860000, 18000, 0, 1842000, 88, 60000, NULL, 2023, 2, 0, NULL, 3000, 6000, 9000, NULL),
	(598, '3578102612760004', 5, 4, 0, NULL, 0, 0, 0, 0, 0, 0, 88, 0, NULL, 2023, 2, 0, NULL, 0, 0, 0, NULL),
	(599, '3578165507710006', 5, 4, 0, NULL, 0, 0, 0, 0, 0, 0, 88, 0, NULL, 2023, 2, 0, NULL, 0, 0, 0, NULL),
	(600, '3578165507711006', 5, 4, 0, NULL, 0, 0, 0, 0, 0, 0, 88, 0, NULL, 2023, 2, 0, NULL, 0, 0, 0, NULL),
	(601, '3578161404690001', 5, 4, 0, NULL, 0, 0, 0, 0, 0, 0, 88, 0, NULL, 2023, 2, 0, NULL, 0, 0, 0, NULL),
	(602, '3578295412710002', 5, 4, 0, NULL, 0, 0, 0, 0, 0, 0, 88, 0, NULL, 2023, 2, 0, NULL, 0, 0, 0, NULL),
	(603, '3578161506970003', 5, 4, 0, NULL, 0, 0, 0, 0, 0, 0, 88, 0, NULL, 2023, 2, 0, NULL, 0, 0, 0, NULL),
	(604, '3578051311890004', 5, 4, 0, NULL, 0, 0, 0, 0, 0, 0, 88, 0, NULL, 2023, 2, 0, NULL, 0, 0, 0, NULL),
	(605, '3578172010790002', 5, 4, 0, NULL, 0, 0, 0, 0, 0, 0, 88, 0, NULL, 2023, 2, 0, NULL, 0, 0, 0, NULL),
	(606, '3578170707550002', 5, 4, 0, NULL, 0, 0, 0, 0, 0, 0, 88, 0, NULL, 2023, 2, 0, NULL, 0, 0, 0, NULL),
	(607, '3578081505630004', 5, 4, 0, NULL, 0, 0, 0, 0, 0, 0, 88, 0, NULL, 2023, 2, 0, NULL, 0, 0, 0, NULL),
	(608, '3578081505630005', 5, 4, 0, NULL, 0, 0, 0, 0, 0, 0, 88, 0, NULL, 2023, 2, 0, NULL, 0, 0, 0, NULL),
	(609, '3578161406900005', 5, 4, 0, NULL, 0, 0, 0, 0, 0, 0, 88, 0, NULL, 2023, 2, 0, NULL, 0, 0, 0, NULL),
	(610, '3528040303970001', 5, 4, 0, NULL, 0, 0, 0, 0, 0, 0, 88, 0, NULL, 2023, 2, 0, NULL, 0, 0, 0, NULL);

-- Dumping structure for table sigap2.gaji_karyawan_smk
CREATE TABLE IF NOT EXISTS `gaji_karyawan_smk` (
  `id` int NOT NULL AUTO_INCREMENT,
  `pegawai` varchar(50) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci DEFAULT NULL,
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
  PRIMARY KEY (`id`) USING BTREE
) ENGINE=InnoDB AUTO_INCREMENT=92 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci ROW_FORMAT=DYNAMIC;

-- Dumping data for table sigap2.gaji_karyawan_smk: ~9 rows (approximately)
INSERT INTO `gaji_karyawan_smk` (`id`, `pegawai`, `jabatan_id`, `jenjang_id`, `gapok`, `value_reward`, `value_inval`, `kehadiran`, `sub_total`, `potongan`, `penyesuaian`, `total`, `pid`, `value_kehadiran`, `status`, `tahun`, `bulan`, `voucher`, `potongan_bendahara`) VALUES
	(83, '10232122', 11, 4, 300000, NULL, 0, 0, 300000, 0, 0, 300000, 8, 60000, NULL, 2023, 12, 0, NULL),
	(84, '198005032010070499', 5, 4, 0, NULL, 0, 0, 0, 0, 0, 0, 8, 0, NULL, 2023, 12, 0, NULL),
	(85, '196906211992070223', 69, 4, 0, NULL, 0, 0, 0, 0, 0, 0, 8, 0, NULL, 2023, 12, 0, NULL),
	(86, '10232122', 11, 4, 300000, NULL, 0, 0, 300000, 0, 0, 300000, 9, 60000, NULL, 2023, 1, 0, NULL),
	(87, '198005032010070499', 5, 4, 0, NULL, 0, 0, 0, 0, 0, 0, 9, 0, NULL, 2023, 1, 0, NULL),
	(88, '196906211992070223', 69, 4, 0, NULL, 0, 0, 0, 0, 0, 0, 9, 0, NULL, 2023, 1, 0, NULL),
	(89, '10232122', 11, 4, 300000, NULL, 0, 0, 300000, 0, 0, 300000, 10, 60000, NULL, 2023, 11, 0, NULL),
	(90, '198005032010070499', 5, 4, 0, NULL, 0, 0, 0, 0, 0, 0, 10, 0, NULL, 2023, 11, 0, NULL),
	(91, '196906211992070223', 69, 4, 0, NULL, 0, 0, 0, 0, 0, 0, 10, 0, NULL, 2023, 11, 0, NULL);

-- Dumping structure for table sigap2.gaji_karyawan_smp
CREATE TABLE IF NOT EXISTS `gaji_karyawan_smp` (
  `id` int NOT NULL AUTO_INCREMENT,
  `pegawai` varchar(50) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci DEFAULT NULL,
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
  PRIMARY KEY (`id`) USING BTREE
) ENGINE=InnoDB AUTO_INCREMENT=127 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci ROW_FORMAT=DYNAMIC;

-- Dumping data for table sigap2.gaji_karyawan_smp: ~6 rows (approximately)
INSERT INTO `gaji_karyawan_smp` (`id`, `pegawai`, `jabatan_id`, `jenjang_id`, `gapok`, `value_reward`, `value_inval`, `kehadiran`, `sub_total`, `potongan`, `penyesuaian`, `total`, `pid`, `value_kehadiran`, `status`, `tahun`, `bulan`, `voucher`, `potongan_bendahara`) VALUES
	(121, '1023212', 11, 4, 300000, NULL, 0, 0, 300000, 0, 0, 300000, 13, 60000, NULL, 2023, 11, 0, NULL),
	(122, '198903052016070583', 5, 4, 0, NULL, 0, 0, 0, 0, 0, 0, 13, 0, NULL, 2023, 11, 0, NULL),
	(123, '197403301995070267', 5, 4, 0, NULL, 0, 0, 0, 0, 0, 0, 13, 0, NULL, 2023, 11, 0, NULL),
	(124, '198202262006070479', 5, 4, 0, NULL, 0, 0, 0, 0, 0, 0, 13, 0, NULL, 2023, 11, 0, NULL),
	(125, '197202081991070203', 5, 4, 0, NULL, 0, 0, 0, 0, 0, 0, 13, 0, NULL, 2023, 11, 0, NULL),
	(126, '197512211995070268', 5, 4, 0, NULL, 0, 0, 0, 0, 0, 0, 13, 0, NULL, 2023, 11, 0, NULL);

-- Dumping structure for table sigap2.gaji_karyawan_tk
CREATE TABLE IF NOT EXISTS `gaji_karyawan_tk` (
  `id` int NOT NULL AUTO_INCREMENT,
  `pegawai` varchar(50) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci DEFAULT NULL,
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
  PRIMARY KEY (`id`) USING BTREE
) ENGINE=InnoDB AUTO_INCREMENT=434 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci ROW_FORMAT=DYNAMIC;

-- Dumping data for table sigap2.gaji_karyawan_tk: ~5 rows (approximately)
INSERT INTO `gaji_karyawan_tk` (`id`, `pegawai`, `jabatan_id`, `jenjang_id`, `gapok`, `value_reward`, `value_inval`, `kehadiran`, `sub_total`, `potongan`, `penyesuaian`, `total`, `pid`, `value_kehadiran`, `status`, `tahun`, `bulan`, `voucher`, `potongan_bendahara`) VALUES
	(429, '10236', 11, 1, 300000, NULL, 0, 26, 1860000, 0, 0, 1860000, 70, 60000, NULL, 2023, 6, 0, NULL),
	(430, '1023271', 12, 1, 450000, NULL, 0, 26, 2400000, 0, 0, 2400000, 70, 75000, NULL, 2023, 6, 0, NULL),
	(431, '1023214', 11, 1, 300000, NULL, 0, 26, 1860000, 0, 0, 1860000, 70, 60000, NULL, 2023, 6, 0, NULL),
	(432, '197007042014070531', 11, 1, 300000, NULL, 0, 0, 300000, 0, 0, 300000, 70, 60000, NULL, 2023, 6, 0, NULL),
	(433, '198107172014070548', 12, 1, 450000, NULL, 0, 26, 2400000, 0, 0, 2400000, 70, 75000, NULL, 2023, 6, 0, NULL);

-- Dumping structure for table sigap2.gaji_pokok
CREATE TABLE IF NOT EXISTS `gaji_pokok` (
  `id` int NOT NULL AUTO_INCREMENT,
  `jenjang_id` int DEFAULT NULL,
  `lama_kerja` int DEFAULT NULL,
  `value` bigint DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=420 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- Dumping data for table sigap2.gaji_pokok: ~247 rows (approximately)
INSERT INTO `gaji_pokok` (`id`, `jenjang_id`, `lama_kerja`, `value`) VALUES
	(2, 4, 0, 1500),
	(3, 4, 1, 1500),
	(4, 4, 2, 2500),
	(5, 4, 3, 2500),
	(6, 4, 4, 2500),
	(7, 4, 5, 3000),
	(8, 4, 6, 3000),
	(9, 4, 7, 3000),
	(10, 4, 8, 3500),
	(11, 4, 9, 3500),
	(12, 4, 10, 3500),
	(13, 4, 11, 4000),
	(14, 4, 12, 4000),
	(15, 4, 13, 4000),
	(16, 4, 14, 4500),
	(17, 4, 15, 4500),
	(18, 4, 16, 4500),
	(19, 4, 17, 5000),
	(20, 4, 18, 5000),
	(21, 4, 19, 5000),
	(23, 4, 20, 5500),
	(24, 4, 21, 5500),
	(25, 4, 22, 5500),
	(26, 4, 23, 6000),
	(27, 4, 24, 6000),
	(28, 4, 25, 6000),
	(29, 4, 26, 6500),
	(30, 4, 27, 6500),
	(31, 4, 28, 6500),
	(32, 4, 29, 7000),
	(33, 4, 30, 7000),
	(34, 4, 31, 7000),
	(35, 4, 32, 7500),
	(36, 4, 33, 7500),
	(37, 4, 34, 7500),
	(38, 4, 35, 8000),
	(39, 4, 36, 8000),
	(40, 4, 37, 8000),
	(41, 4, 38, 8500),
	(42, 4, 39, 8500),
	(43, 4, 40, 8500),
	(44, 4, 41, 9000),
	(45, 4, 42, 9000),
	(46, 4, 43, 9000),
	(47, 4, 44, 9500),
	(48, 4, 45, 9500),
	(49, 4, 46, 9500),
	(50, 4, 47, 10000),
	(51, 4, 48, 10000),
	(52, 4, 49, 10000),
	(53, 4, 50, 10500),
	(208, 5, 0, 1500),
	(209, 5, 1, 1500),
	(210, 5, 2, 2500),
	(211, 5, 3, 2500),
	(212, 5, 4, 2500),
	(213, 5, 5, 3000),
	(214, 5, 6, 3000),
	(215, 5, 7, 3000),
	(216, 5, 8, 3500),
	(217, 5, 9, 3500),
	(218, 5, 10, 3500),
	(219, 5, 11, 4000),
	(220, 5, 12, 4000),
	(221, 5, 13, 4000),
	(222, 5, 14, 4500),
	(223, 5, 15, 4500),
	(224, 5, 16, 4500),
	(225, 5, 17, 5000),
	(226, 5, 18, 5000),
	(227, 5, 19, 5000),
	(228, 5, 20, 5500),
	(229, 5, 21, 5500),
	(230, 5, 22, 5500),
	(231, 5, 23, 6000),
	(232, 5, 24, 6000),
	(233, 5, 25, 6000),
	(234, 5, 26, 6500),
	(235, 5, 27, 6500),
	(236, 5, 28, 6500),
	(237, 5, 29, 7000),
	(238, 5, 30, 7000),
	(239, 5, 31, 7000),
	(240, 5, 32, 7500),
	(241, 5, 33, 7500),
	(242, 5, 34, 7500),
	(243, 5, 35, 8000),
	(244, 5, 36, 8000),
	(245, 5, 37, 8000),
	(246, 5, 38, 8500),
	(247, 5, 39, 8500),
	(248, 5, 40, 8500),
	(249, 5, 41, 9000),
	(250, 5, 42, 9000),
	(251, 5, 43, 9000),
	(252, 5, 44, 9500),
	(253, 5, 45, 9500),
	(254, 5, 46, 9500),
	(255, 5, 47, 10000),
	(256, 5, 48, 10000),
	(257, 5, 49, 10000),
	(258, 5, 50, 10500),
	(259, 1, 0, 1500),
	(260, 1, 1, 1500),
	(261, 1, 2, 2500),
	(262, 1, 3, 2500),
	(263, 1, 4, 2500),
	(264, 1, 5, 3000),
	(265, 1, 6, 3000),
	(266, 1, 7, 3000),
	(267, 1, 8, 3500),
	(268, 1, 9, 3500),
	(269, 1, 10, 3500),
	(270, 1, 11, 4000),
	(271, 1, 12, 4000),
	(272, 1, 13, 4000),
	(273, 1, 14, 4500),
	(274, 1, 15, 4500),
	(275, 1, 16, 4500),
	(276, 1, 17, 5000),
	(277, 1, 18, 5000),
	(278, 1, 19, 5000),
	(279, 1, 20, 5500),
	(280, 1, 21, 5500),
	(281, 1, 22, 5500),
	(282, 1, 23, 6000),
	(283, 1, 24, 6000),
	(284, 1, 25, 6000),
	(285, 1, 26, 6500),
	(286, 1, 27, 6500),
	(287, 1, 28, 6500),
	(288, 1, 29, 7000),
	(289, 1, 30, 7000),
	(290, 1, 31, 7000),
	(291, 1, 32, 7500),
	(292, 1, 33, 7500),
	(293, 1, 34, 7500),
	(294, 1, 35, 8000),
	(295, 1, 36, 8000),
	(296, 1, 37, 8000),
	(297, 1, 38, 8500),
	(298, 1, 39, 8500),
	(299, 1, 40, 8500),
	(300, 1, 41, 9000),
	(301, 1, 42, 9000),
	(302, 1, 43, 9000),
	(303, 1, 44, 9500),
	(304, 1, 45, 9500),
	(305, 1, 46, 9500),
	(306, 1, 47, 10000),
	(307, 1, 48, 10000),
	(308, 1, 49, 10000),
	(309, 1, 50, 10500),
	(326, 3, 0, 1500),
	(327, 3, 1, 1500),
	(328, 3, 2, 2500),
	(329, 3, 3, 2500),
	(330, 3, 4, 2500),
	(331, 3, 5, 3000),
	(332, 3, 6, 3000),
	(333, 3, 7, 3000),
	(334, 3, 8, 3500),
	(335, 3, 9, 3500),
	(336, 3, 10, 3500),
	(337, 3, 11, 4000),
	(338, 3, 12, 4000),
	(339, 3, 13, 4000),
	(340, 3, 14, 4500),
	(341, 3, 15, 4500),
	(342, 3, 16, 4500),
	(343, 3, 17, 5000),
	(344, 3, 18, 5000),
	(345, 3, 19, 5000),
	(346, 3, 20, 5500),
	(347, 3, 21, 5500),
	(348, 3, 22, 5500),
	(349, 3, 23, 6000),
	(350, 3, 24, 6000),
	(351, 3, 25, 6000),
	(352, 3, 26, 6500),
	(353, 3, 27, 6500),
	(354, 3, 28, 6500),
	(355, 3, 29, 7000),
	(356, 3, 30, 7000),
	(357, 3, 31, 7000),
	(358, 3, 32, 7500),
	(359, 3, 33, 7500),
	(360, 3, 34, 7500),
	(361, 3, 35, 8000),
	(362, 3, 36, 8000),
	(363, 3, 37, 8000),
	(364, 3, 38, 8500),
	(365, 3, 39, 8500),
	(366, 3, 40, 8500),
	(367, 3, 41, 9000),
	(368, 3, 42, 9000),
	(369, 3, 43, 9000),
	(370, 3, 44, 9500),
	(371, 3, 45, 9500),
	(372, 3, 46, 9500),
	(373, 3, 47, 10000),
	(374, 3, 48, 10000),
	(375, 3, 49, 10000),
	(376, 3, 50, 10000),
	(377, 2, 0, 500),
	(378, 2, 1, 500),
	(379, 2, 2, 1000),
	(380, 2, 3, 1750),
	(381, 2, 4, 1750),
	(382, 2, 5, 1750),
	(383, 2, 6, 2500),
	(384, 2, 7, 2500),
	(385, 2, 8, 2500),
	(386, 2, 9, 3250),
	(387, 2, 10, 3250),
	(388, 2, 11, 3250),
	(389, 2, 12, 4000),
	(390, 2, 13, 4000),
	(391, 2, 14, 4000),
	(392, 2, 15, 4750),
	(393, 2, 16, 4750),
	(394, 2, 17, 4750),
	(395, 2, 18, 5500),
	(396, 2, 19, 5500),
	(397, 2, 20, 5500),
	(398, 2, 21, 6250),
	(399, 2, 22, 6250),
	(400, 2, 23, 6250),
	(401, 2, 24, 7000),
	(402, 2, 25, 7000),
	(403, 2, 26, 7000),
	(404, 2, 27, 7750),
	(405, 2, 28, 7750),
	(406, 2, 29, 7750),
	(407, 2, 30, 8500),
	(408, 2, 31, 8500),
	(409, 2, 32, 8500),
	(410, 2, 33, 9250),
	(411, 2, 34, 9250),
	(412, 2, 35, 9250),
	(413, 2, 36, 10000),
	(414, 2, 37, 10000),
	(415, 2, 38, 10000),
	(416, 2, 39, 10750),
	(417, 2, 40, 10750),
	(418, 2, 41, 10750),
	(419, 2, 42, 11500);

-- Dumping structure for table sigap2.gaji_pokok_kayawan
CREATE TABLE IF NOT EXISTS `gaji_pokok_kayawan` (
  `id` int NOT NULL AUTO_INCREMENT,
  `jenjang_id` int DEFAULT NULL,
  `value` bigint DEFAULT NULL,
  `jabatan_id` bigint DEFAULT NULL,
  PRIMARY KEY (`id`) USING BTREE
) ENGINE=InnoDB AUTO_INCREMENT=99 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci ROW_FORMAT=DYNAMIC;

-- Dumping data for table sigap2.gaji_pokok_kayawan: ~15 rows (approximately)
INSERT INTO `gaji_pokok_kayawan` (`id`, `jenjang_id`, `value`, `jabatan_id`) VALUES
	(84, 4, 300000, 10),
	(85, 4, 450000, 12),
	(86, 4, 300000, 11),
	(87, 2, 300000, 10),
	(88, 2, 450000, 12),
	(89, 2, 300000, 11),
	(90, 3, 300000, 10),
	(91, 3, 450000, 12),
	(92, 3, 300000, 11),
	(93, 5, 300000, 10),
	(94, 5, 450000, 12),
	(95, 5, 300000, 11),
	(96, 1, 300000, 10),
	(97, 1, 450000, 12),
	(98, 1, 300000, 11);

-- Dumping structure for table sigap2.gaji_pokok_tu
CREATE TABLE IF NOT EXISTS `gaji_pokok_tu` (
  `id` int NOT NULL AUTO_INCREMENT,
  `jenjang_id` int DEFAULT NULL,
  `value` bigint DEFAULT NULL,
  `ijazah` int DEFAULT NULL,
  `lama_kerja` int DEFAULT NULL,
  PRIMARY KEY (`id`) USING BTREE
) ENGINE=InnoDB AUTO_INCREMENT=527 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci ROW_FORMAT=DYNAMIC;

-- Dumping data for table sigap2.gaji_pokok_tu: ~433 rows (approximately)
INSERT INTO `gaji_pokok_tu` (`id`, `jenjang_id`, `value`, `ijazah`, `lama_kerja`) VALUES
	(84, 4, 65000, 3, 0),
	(85, 4, 80000, 8, 0),
	(86, 4, 77500, 3, 3),
	(87, 4, 92500, 8, 3),
	(88, 4, 90000, 3, 6),
	(89, 4, 105000, 8, 6),
	(90, 4, 102500, 3, 9),
	(92, 4, 115000, 3, 12),
	(93, 4, 130000, 8, 12),
	(94, 4, 127500, 3, 15),
	(95, 4, 142500, 8, 15),
	(96, 4, 140000, 3, 18),
	(97, 4, 155000, 8, 18),
	(98, 4, 152500, 3, 21),
	(99, 4, 167500, 8, 21),
	(100, 4, 165000, 3, 24),
	(101, 4, 180000, 8, 24),
	(102, 4, 177500, 3, 27),
	(103, 4, 192500, 8, 27),
	(104, 4, 190000, 3, 30),
	(105, 4, 205000, 8, 30),
	(106, 4, 202500, 3, 33),
	(107, 4, 217500, 8, 33),
	(108, 4, 201500, 3, 36),
	(109, 4, 230000, 8, 36),
	(110, 4, 227500, 3, 39),
	(111, 4, 242500, 8, 39),
	(112, 4, 240000, 3, 42),
	(113, 4, 255000, 8, 42),
	(115, 2, 65000, 3, 0),
	(116, 2, 80000, 8, 0),
	(117, 2, 77500, 3, 3),
	(118, 2, 92500, 8, 3),
	(119, 2, 90000, 3, 6),
	(120, 2, 105000, 8, 6),
	(121, 2, 102500, 3, 9),
	(122, 2, 117500, 8, 9),
	(123, 2, 115000, 3, 12),
	(124, 2, 130000, 8, 12),
	(125, 2, 127500, 3, 15),
	(126, 2, 142500, 8, 15),
	(127, 2, 140000, 3, 18),
	(128, 2, 155000, 8, 18),
	(129, 2, 152500, 3, 21),
	(130, 2, 167500, 8, 21),
	(131, 2, 165000, 3, 24),
	(132, 2, 180000, 8, 24),
	(133, 2, 177500, 3, 27),
	(134, 2, 192500, 8, 27),
	(135, 2, 190000, 3, 30),
	(136, 2, 205000, 8, 30),
	(137, 2, 202500, 3, 33),
	(138, 2, 217500, 8, 33),
	(139, 2, 215000, 3, 36),
	(140, 2, 230000, 8, 36),
	(141, 2, 227500, 3, 39),
	(142, 2, 242500, 8, 39),
	(143, 2, 240000, 3, 42),
	(144, 2, 255000, 8, 42),
	(145, 5, 65000, 3, 0),
	(146, 5, 80000, 8, 0),
	(147, 5, 77500, 3, 3),
	(148, 5, 92500, 8, 3),
	(149, 5, 90000, 3, 6),
	(150, 5, 105000, 8, 6),
	(151, 5, 102500, 3, 9),
	(152, 5, 117500, 8, 9),
	(153, 5, 115000, 3, 12),
	(154, 5, 130000, 8, 12),
	(155, 5, 127500, 3, 15),
	(156, 5, 142500, 8, 15),
	(157, 5, 140000, 3, 18),
	(158, 5, 155000, 8, 18),
	(159, 5, 152500, 3, 21),
	(160, 5, 167500, 8, 21),
	(161, 5, 165000, 3, 24),
	(162, 5, 180000, 8, 24),
	(163, 5, 177500, 3, 27),
	(164, 5, 192500, 8, 27),
	(165, 5, 190000, 3, 30),
	(166, 5, 205000, 8, 30),
	(167, 5, 202500, 3, 33),
	(168, 5, 217500, 8, 33),
	(169, 5, 215000, 3, 36),
	(170, 5, 230000, 8, 36),
	(171, 5, 227500, 3, 39),
	(172, 5, 242500, 8, 39),
	(173, 5, 240000, 3, 42),
	(174, 5, 255000, 8, 42),
	(175, 3, 65000, 3, 0),
	(176, 3, 80000, 8, 0),
	(177, 3, 77500, 3, 3),
	(178, 3, 92500, 8, 3),
	(179, 3, 90000, 3, 6),
	(180, 3, 105000, 8, 6),
	(181, 3, 102500, 3, 9),
	(182, 3, 117500, 8, 9),
	(183, 3, 115000, 3, 12),
	(184, 3, 130000, 8, 12),
	(185, 3, 127500, 3, 15),
	(186, 3, 142500, 8, 15),
	(187, 3, 140000, 3, 18),
	(188, 3, 155000, 8, 18),
	(189, 3, 152500, 3, 21),
	(190, 3, 167500, 8, 21),
	(191, 3, 165000, 3, 24),
	(192, 3, 180000, 8, 24),
	(193, 3, 177500, 3, 27),
	(194, 3, 192500, 8, 27),
	(195, 3, 190000, 3, 30),
	(196, 3, 205000, 8, 30),
	(197, 3, 202500, 3, 33),
	(198, 3, 217500, 8, 33),
	(199, 3, 215000, 3, 36),
	(200, 3, 230000, 8, 36),
	(201, 3, 227500, 3, 39),
	(202, 3, 242500, 8, 39),
	(203, 3, 240000, 3, 42),
	(204, 3, 255000, 8, 42),
	(206, 4, 65000, 3, 2),
	(207, 4, 80000, 8, 1),
	(208, 4, 80000, 8, 2),
	(209, 4, 77500, 3, 4),
	(210, 4, 77500, 3, 5),
	(211, 4, 92500, 8, 4),
	(212, 4, 92500, 8, 5),
	(215, 3, 242500, 8, 40),
	(217, 3, 227500, 3, 40),
	(218, 4, 65000, 3, 1),
	(222, 2, 65000, 3, 1),
	(223, 2, 65000, 3, 2),
	(224, 2, 80000, 8, 1),
	(225, 2, 80000, 8, 2),
	(226, 2, 77500, 3, 4),
	(227, 2, 77500, 3, 5),
	(228, 2, 92500, 8, 4),
	(229, 2, 92500, 8, 5),
	(230, 2, 117500, 8, 10),
	(232, 2, 117500, 8, 11),
	(233, 2, 102500, 3, 10),
	(234, 2, 102500, 3, 11),
	(235, 2, 90000, 3, 7),
	(236, 2, 90000, 3, 8),
	(237, 2, 115000, 3, 13),
	(238, 2, 115000, 3, 14),
	(239, 2, 130000, 8, 13),
	(240, 2, 130000, 8, 14),
	(241, 2, 127500, 3, 16),
	(242, 2, 127500, 3, 17),
	(243, 2, 142500, 8, 16),
	(244, 2, 142500, 8, 17),
	(245, 2, 155000, 8, 19),
	(246, 2, 155000, 8, 20),
	(247, 2, 140000, 3, 19),
	(248, 2, 140000, 3, 20),
	(249, 2, 167500, 8, 22),
	(250, 2, 167500, 8, 23),
	(251, 2, 152500, 3, 22),
	(252, 2, 152500, 3, 23),
	(253, 2, 165000, 3, 25),
	(254, 2, 165000, 3, 26),
	(255, 2, 180000, 8, 25),
	(256, 2, 180000, 8, 26),
	(257, 2, 177500, 3, 28),
	(258, 2, 177500, 3, 29),
	(259, 2, 105000, 8, 8),
	(260, 2, 192500, 8, 28),
	(261, 2, 192500, 8, 29),
	(262, 2, 205000, 8, 31),
	(263, 2, 190000, 3, 31),
	(264, 2, 190000, 3, 32),
	(265, 2, 205000, 8, 32),
	(266, 2, 217500, 8, 34),
	(267, 2, 217500, 8, 35),
	(268, 2, 202500, 3, 34),
	(269, 2, 202500, 3, 35),
	(270, 2, 215000, 3, 37),
	(271, 2, 230000, 8, 37),
	(272, 2, 215000, 3, 38),
	(273, 2, 230000, 8, 38),
	(274, 2, 227500, 3, 40),
	(275, 2, 227500, 3, 41),
	(276, 2, 242500, 8, 40),
	(277, 2, 242500, 8, 41),
	(278, 3, 65000, 3, 1),
	(279, 3, 80000, 8, 1),
	(280, 3, 65000, 3, 2),
	(281, 3, 80000, 8, 2),
	(282, 3, 77500, 3, 4),
	(283, 3, 92500, 8, 4),
	(284, 3, 77500, 3, 5),
	(285, 3, 92500, 8, 5),
	(286, 3, 90000, 3, 7),
	(287, 3, 105000, 8, 7),
	(288, 3, 90000, 3, 8),
	(289, 3, 105000, 8, 8),
	(290, 3, 102500, 3, 10),
	(291, 3, 117500, 8, 10),
	(292, 3, 102500, 3, 11),
	(293, 3, 117500, 8, 11),
	(294, 3, 115000, 3, 13),
	(295, 3, 130000, 8, 13),
	(296, 3, 115000, 3, 14),
	(297, 3, 130000, 8, 14),
	(298, 3, 127500, 3, 16),
	(299, 3, 142500, 8, 16),
	(300, 3, 127500, 3, 17),
	(301, 3, 142500, 8, 17),
	(302, 3, 140000, 3, 19),
	(303, 3, 155000, 8, 19),
	(304, 3, 140000, 3, 20),
	(305, 3, 155000, 8, 20),
	(306, 3, 152500, 3, 22),
	(307, 3, 167500, 8, 22),
	(308, 3, 152500, 3, 23),
	(309, 3, 167500, 8, 23),
	(310, 3, 165000, 3, 25),
	(311, 3, 180000, 8, 25),
	(312, 3, 165000, 3, 26),
	(313, 3, 180000, 8, 26),
	(314, 3, 177500, 3, 28),
	(315, 3, 192500, 8, 28),
	(316, 3, 177500, 3, 29),
	(317, 3, 192500, 8, 29),
	(318, 3, 190000, 3, 31),
	(319, 3, 205000, 8, 31),
	(320, 3, 190000, 3, 32),
	(321, 3, 205000, 8, 32),
	(322, 3, 202500, 3, 34),
	(323, 3, 217500, 8, 34),
	(324, 3, 202500, 3, 35),
	(325, 3, 217500, 8, 35),
	(326, 3, 215000, 3, 37),
	(327, 3, 230000, 8, 37),
	(328, 3, 215000, 3, 38),
	(329, 3, 230000, 8, 38),
	(330, 3, 227500, 3, 40),
	(331, 3, 242500, 8, 40),
	(332, 3, 227500, 3, 41),
	(333, 3, 242500, 8, 41),
	(334, 1, 65000, 3, 0),
	(335, 1, 80000, 8, 0),
	(336, 1, 65000, 3, 1),
	(337, 1, 80000, 8, 1),
	(338, 1, 65000, 3, 2),
	(339, 1, 80000, 8, 2),
	(340, 1, 77500, 3, 3),
	(341, 1, 92500, 8, 3),
	(342, 1, 77500, 3, 4),
	(343, 1, 92500, 8, 4),
	(344, 1, 77500, 3, 5),
	(345, 1, 92500, 8, 5),
	(346, 1, 90000, 3, 6),
	(347, 1, 105000, 8, 6),
	(348, 1, 90000, 3, 7),
	(349, 1, 105000, 8, 7),
	(350, 1, 90000, 3, 8),
	(351, 1, 105000, 8, 8),
	(352, 1, 102500, 3, 9),
	(353, 1, 117500, 8, 9),
	(354, 1, 102500, 3, 10),
	(355, 1, 117500, 8, 10),
	(356, 1, 102500, 3, 11),
	(357, 1, 117500, 8, 11),
	(358, 1, 115000, 3, 12),
	(359, 1, 130000, 8, 12),
	(360, 1, 130000, 8, 13),
	(361, 1, 115000, 3, 13),
	(362, 1, 130000, 8, 14),
	(363, 1, 115000, 3, 14),
	(364, 1, 127500, 3, 15),
	(365, 1, 142500, 8, 15),
	(366, 1, 127500, 3, 16),
	(367, 1, 142500, 8, 16),
	(368, 1, 127500, 3, 17),
	(369, 1, 142500, 8, 17),
	(370, 1, 140000, 3, 18),
	(371, 1, 155000, 8, 18),
	(372, 1, 140000, 3, 19),
	(373, 1, 155000, 8, 19),
	(374, 1, 140000, 3, 20),
	(375, 1, 155000, 8, 20),
	(376, 1, 152500, 3, 21),
	(377, 1, 167500, 8, 21),
	(378, 1, 152500, 3, 22),
	(379, 1, 167500, 8, 22),
	(380, 1, 167500, 8, 23),
	(381, 1, 152500, 3, 23),
	(382, 1, 165000, 3, 24),
	(383, 1, 180000, 8, 24),
	(384, 1, 180000, 8, 25),
	(385, 1, 165000, 3, 25),
	(386, 1, 180000, 8, 26),
	(387, 1, 165000, 3, 26),
	(388, 1, 177500, 3, 27),
	(389, 1, 192500, 8, 27),
	(390, 1, 177500, 3, 28),
	(391, 1, 192500, 8, 28),
	(392, 1, 177500, 3, 29),
	(393, 1, 192500, 8, 29),
	(394, 1, 190000, 3, 30),
	(395, 1, 205000, 8, 30),
	(396, 1, 190000, 3, 31),
	(397, 1, 205000, 8, 31),
	(398, 1, 190000, 3, 32),
	(399, 1, 205000, 8, 32),
	(400, 1, 202500, 3, 33),
	(401, 1, 217500, 8, 33),
	(402, 1, 202500, 3, 34),
	(403, 1, 217500, 8, 34),
	(404, 1, 202500, 3, 35),
	(405, 1, 217500, 8, 35),
	(406, 1, 215000, 3, 36),
	(407, 1, 230000, 8, 36),
	(408, 1, 215000, 3, 37),
	(409, 1, 230000, 8, 37),
	(410, 1, 215000, 3, 38),
	(411, 1, 230000, 8, 38),
	(412, 1, 227500, 3, 39),
	(413, 1, 242500, 8, 39),
	(414, 1, 242500, 8, 40),
	(415, 1, 227500, 3, 40),
	(416, 1, 227500, 3, 40),
	(417, 1, 242500, 8, 40),
	(418, 1, 227500, 3, 41),
	(419, 1, 242500, 8, 41),
	(420, 1, 240000, 3, 42),
	(421, 1, 255000, 8, 42),
	(422, 5, 65000, 3, 1),
	(423, 5, 80000, 8, 1),
	(424, 5, 65000, 3, 2),
	(425, 5, 80000, 8, 2),
	(426, 5, 77500, 3, 4),
	(427, 5, 92500, 8, 4),
	(428, 5, 77500, 3, 5),
	(429, 5, 92500, 8, 5),
	(430, 5, 90000, 3, 7),
	(431, 5, 105000, 8, 7),
	(432, 5, 90000, 3, 8),
	(433, 5, 105000, 8, 8),
	(434, 5, 102500, 3, 10),
	(435, 5, 117500, 8, 10),
	(436, 5, 102500, 3, 11),
	(437, 5, 117500, 8, 11),
	(438, 5, 115000, 3, 13),
	(439, 5, 130000, 8, 13),
	(440, 5, 115000, 3, 14),
	(441, 5, 130000, 8, 14),
	(442, 5, 127500, 3, 16),
	(443, 5, 142500, 8, 16),
	(444, 5, 127500, 3, 17),
	(445, 5, 142500, 8, 17),
	(446, 5, 140000, 3, 19),
	(447, 5, 155000, 8, 19),
	(448, 5, 140000, 3, 20),
	(449, 5, 155000, 8, 20),
	(450, 5, 152500, 3, 22),
	(451, 5, 167500, 8, 22),
	(452, 5, 152500, 3, 23),
	(453, 5, 167500, 8, 23),
	(454, 5, 165000, 3, 25),
	(455, 5, 180000, 8, 25),
	(456, 5, 165000, 3, 26),
	(457, 5, 180000, 8, 26),
	(458, 5, 177500, 3, 28),
	(459, 5, 192500, 8, 28),
	(460, 5, 177500, 3, 29),
	(461, 5, 192500, 8, 29),
	(462, 5, 190000, 3, 31),
	(463, 5, 205000, 8, 31),
	(464, 5, 190000, 3, 32),
	(465, 5, 205000, 8, 32),
	(466, 5, 202500, 3, 34),
	(467, 5, 217500, 8, 34),
	(468, 5, 202500, 3, 35),
	(469, 5, 217500, 8, 35),
	(470, 5, 215000, 3, 37),
	(471, 5, 230000, 8, 37),
	(472, 5, 215000, 3, 38),
	(473, 5, 230000, 8, 38),
	(474, 5, 227500, 3, 40),
	(475, 5, 242500, 8, 40),
	(476, 5, 227500, 3, 41),
	(477, 5, 242500, 8, 41),
	(478, 4, 117500, 8, 9),
	(479, 4, 90000, 3, 7),
	(480, 4, 105000, 8, 7),
	(481, 4, 90000, 3, 8),
	(482, 4, 105000, 8, 8),
	(483, 4, 102500, 3, 10),
	(484, 4, 117500, 8, 10),
	(485, 4, 102500, 3, 11),
	(486, 4, 117500, 8, 11),
	(487, 4, 115000, 3, 13),
	(488, 4, 130000, 8, 13),
	(489, 4, 115000, 3, 14),
	(490, 4, 130000, 8, 14),
	(491, 4, 127500, 3, 16),
	(492, 4, 142500, 8, 16),
	(493, 4, 127500, 3, 17),
	(494, 4, 142500, 8, 17),
	(495, 4, 140000, 3, 19),
	(496, 4, 155000, 8, 19),
	(497, 4, 140000, 3, 20),
	(498, 4, 155000, 8, 20),
	(499, 4, 152500, 3, 22),
	(500, 4, 167500, 8, 22),
	(501, 4, 152500, 3, 23),
	(502, 4, 167500, 8, 23),
	(503, 4, 165000, 3, 25),
	(504, 4, 180000, 8, 25),
	(505, 4, 165000, 3, 26),
	(506, 4, 180000, 8, 26),
	(507, 4, 177500, 3, 28),
	(508, 4, 192500, 8, 28),
	(509, 4, 177500, 3, 29),
	(510, 4, 192500, 8, 29),
	(511, 4, 190000, 3, 31),
	(512, 4, 205000, 8, 31),
	(513, 4, 190000, 3, 32),
	(514, 4, 205000, 8, 32),
	(515, 4, 202500, 3, 34),
	(516, 4, 217500, 8, 34),
	(517, 4, 202500, 3, 35),
	(518, 4, 217500, 8, 35),
	(519, 4, 215000, 3, 37),
	(520, 4, 230000, 8, 37),
	(521, 4, 215000, 3, 38),
	(522, 4, 230000, 8, 38),
	(523, 4, 227500, 3, 40),
	(524, 4, 242500, 8, 40),
	(525, 4, 227500, 3, 41),
	(526, 4, 242500, 8, 41);

-- Dumping structure for table sigap2.gaji_sma
CREATE TABLE IF NOT EXISTS `gaji_sma` (
  `id` int NOT NULL AUTO_INCREMENT,
  `pegawai` varchar(50) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci DEFAULT NULL,
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
) ENGINE=InnoDB AUTO_INCREMENT=4180 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci ROW_FORMAT=DYNAMIC;

-- Dumping data for table sigap2.gaji_sma: ~140 rows (approximately)
INSERT INTO `gaji_sma` (`id`, `pegawai`, `datetime`, `month`, `lembur`, `value_lembur`, `jabatan_id`, `gapok`, `total`, `value_reward`, `value_inval`, `piket_count`, `value_piket`, `tugastambahan`, `tj_jabatan`, `kehadiran`, `sub_total`, `potongan`, `jenjang_id`, `penyesuaian`, `pid`, `jp`, `type`, `jenis_guru`, `tambahan`, `value_kehadiran`, `periode`, `tunjangan_periode`, `total_gapok`, `lama_kerja`, `status`, `tahun`, `bulan`, `potongan_bendahara`, `voucher`, `jaminan_pensiun`, `jaminan_hari_tua`, `total_pph21`, `status_npwp`, `bpjs_kesehatan`) VALUES
	(3758, '10230', '2023-02-13 03:45:37', '2023-02-13', 3, 13000, 5, 2500, 3932500, 50000, 132000, 1, 7000, 125000, 450000, 48, 4061000, 174500, 4, 46000, 559, 48, 1, 1, 2, 56000, 4, 450000, 120000, 2, NULL, 2023, 1, NULL, 0, NULL, NULL, NULL, NULL, NULL),
	(3759, '10235', '2023-02-13 03:45:38', '2023-02-13', 0, 13000, 9, 1500, 3290000, 50000, 0, 0, 8250, 0, 0, 48, 3290000, 0, 4, 0, 559, 48, 1, 2, 0, 66000, 0, 0, 72000, 0, NULL, 2023, 1, NULL, 0, NULL, NULL, NULL, NULL, NULL),
	(3760, '3578171005780011', '2023-02-13 03:45:38', '2023-02-13', 0, 13000, 5, 1500, 500000, 50000, 0, 0, 0, 0, 450000, 0, 500000, 0, 4, 0, 559, 0, 1, 0, 0, 0, 0, 0, 0, 0, NULL, 2023, 1, NULL, 0, NULL, NULL, NULL, NULL, NULL),
	(3761, '3578164404680002', '2023-02-13 03:45:38', '2023-02-13', 0, 13000, 5, 1500, 500000, 50000, 0, 0, 0, 0, 450000, 0, 500000, 0, 4, 0, 559, 0, 1, 0, 0, 0, 0, 0, 0, 0, NULL, 2023, 1, NULL, 0, NULL, NULL, NULL, NULL, NULL),
	(3762, '3578152104890001', '2023-02-13 03:45:38', '2023-02-13', 0, 13000, 5, 1500, 500000, 50000, 0, 0, 0, 0, 450000, 0, 500000, 0, 4, 0, 559, 0, 1, 0, 0, 0, 0, 0, 0, 0, NULL, 2023, 1, NULL, 0, NULL, NULL, NULL, NULL, NULL),
	(3763, '3578081005990004', '2023-02-13 03:45:38', '2023-02-13', 0, 13000, 5, 1500, 500000, 50000, 0, 0, 0, 0, 450000, 0, 500000, 0, 4, 0, 559, 0, 1, 0, 0, 0, 0, 0, 0, 0, NULL, 2023, 1, NULL, 0, NULL, NULL, NULL, NULL, NULL),
	(3764, '3578174905600001', '2023-02-13 03:45:38', '2023-02-13', 0, 13000, 5, 1500, 500000, 50000, 0, 0, 0, 0, 450000, 0, 500000, 0, 4, 0, 559, 0, 1, 0, 0, 0, 0, 0, 0, 0, NULL, 2023, 1, NULL, 0, NULL, NULL, NULL, NULL, NULL),
	(3765, '3578166610880002', '2023-02-13 03:45:38', '2023-02-13', 0, 13000, 5, 1500, 500000, 50000, 0, 0, 0, 0, 450000, 0, 500000, 0, 4, 0, 559, 0, 1, 0, 0, 0, 0, 0, 0, 0, NULL, 2023, 1, NULL, 0, NULL, NULL, NULL, NULL, NULL),
	(3766, '3578104406840008', '2023-02-13 03:45:38', '2023-02-13', 0, 13000, 5, 1500, 500000, 50000, 0, 0, 0, 0, 450000, 0, 500000, 0, 4, 0, 559, 0, 1, 0, 0, 0, 0, 0, 0, 0, NULL, 2023, 1, NULL, 0, NULL, NULL, NULL, NULL, NULL),
	(3767, '3578107103570001', '2023-02-13 03:45:38', '2023-02-13', 0, 13000, 5, 1500, 500000, 50000, 0, 0, 0, 0, 450000, 0, 500000, 0, 4, 0, 559, 0, 1, 0, 0, 0, 0, 0, 0, 0, NULL, 2023, 1, NULL, 0, NULL, NULL, NULL, NULL, NULL),
	(3768, '3578172009850003', '2023-02-13 03:45:38', '2023-02-13', 0, 13000, 5, 1500, 500000, 50000, 0, 0, 0, 0, 450000, 0, 500000, 0, 4, 0, 559, 0, 1, 0, 0, 0, 0, 0, 0, 0, NULL, 2023, 1, NULL, 0, NULL, NULL, NULL, NULL, NULL),
	(3769, '3578176908920001', '2023-02-13 03:45:38', '2023-02-13', 0, 13000, 5, 1500, 500000, 50000, 0, 0, 0, 0, 450000, 0, 500000, 0, 4, 0, 559, 0, 1, 0, 0, 0, 0, 0, 0, 0, NULL, 2023, 1, NULL, 0, NULL, NULL, NULL, NULL, NULL),
	(3770, '3578290802610001', '2023-02-13 03:45:38', '2023-02-13', 0, 13000, 5, 1500, 500000, 50000, 0, 0, 0, 0, 450000, 0, 500000, 0, 4, 0, 559, 0, 1, 0, 0, 0, 0, 0, 0, 0, NULL, 2023, 1, NULL, 0, NULL, NULL, NULL, NULL, NULL),
	(3771, '3507125312760003', '2023-02-13 03:45:38', '2023-02-13', 0, 13000, 5, 1500, 500000, 50000, 0, 0, 0, 0, 450000, 0, 500000, 0, 4, 0, 559, 0, 1, 0, 0, 0, 0, 0, 0, 0, NULL, 2023, 1, NULL, 0, NULL, NULL, NULL, NULL, NULL),
	(3772, '3578177110750002', '2023-02-13 03:45:38', '2023-02-13', 0, 13000, 5, 1500, 500000, 50000, 0, 0, 0, 0, 450000, 0, 500000, 0, 4, 0, 559, 0, 1, 0, 0, 0, 0, 0, 0, 0, NULL, 2023, 1, NULL, 0, NULL, NULL, NULL, NULL, NULL),
	(3773, '3578106707700007', '2023-02-13 03:45:38', '2023-02-13', 0, 13000, 5, 1500, 500000, 50000, 0, 0, 0, 0, 450000, 0, 500000, 0, 4, 0, 559, 0, 1, 0, 0, 0, 0, 0, 0, 0, NULL, 2023, 1, NULL, 0, NULL, NULL, NULL, NULL, NULL),
	(3774, '3318021307950001', '2023-02-13 03:45:38', '2023-02-13', 0, 13000, 5, 1500, 500000, 50000, 0, 0, 0, 0, 450000, 0, 500000, 0, 4, 0, 559, 0, 1, 0, 0, 0, 0, 0, 0, 0, NULL, 2023, 1, NULL, 0, NULL, NULL, NULL, NULL, NULL),
	(3775, '3578174103730002', '2023-02-13 03:45:38', '2023-02-13', 0, 13000, 5, 1500, 500000, 50000, 0, 0, 0, 0, 450000, 0, 500000, 0, 4, 0, 559, 0, 1, 0, 0, 0, 0, 0, 0, 0, NULL, 2023, 1, NULL, 0, NULL, NULL, NULL, NULL, NULL),
	(3776, '3578172801700001', '2023-02-13 03:45:38', '2023-02-13', 0, 13000, 5, 1500, 500000, 50000, 0, 0, 0, 0, 450000, 0, 500000, 0, 4, 0, 559, 0, 1, 0, 0, 0, 0, 0, 0, 0, NULL, 2023, 1, NULL, 0, NULL, NULL, NULL, NULL, NULL),
	(3777, '3578115511810005', '2023-02-13 03:45:38', '2023-02-13', 0, 13000, 5, 1500, 500000, 50000, 0, 0, 0, 0, 450000, 0, 500000, 0, 4, 0, 559, 0, 1, 0, 0, 0, 0, 0, 0, 0, NULL, 2023, 1, NULL, 0, NULL, NULL, NULL, NULL, NULL),
	(3778, '3578174806780006', '2023-02-13 03:45:38', '2023-02-13', 0, 13000, 5, 1500, 500000, 50000, 0, 0, 0, 0, 450000, 0, 500000, 0, 4, 0, 559, 0, 1, 0, 0, 0, 0, 0, 0, 0, NULL, 2023, 1, NULL, 0, NULL, NULL, NULL, NULL, NULL),
	(3779, '3578100107750004', '2023-02-13 03:45:38', '2023-02-13', 0, 13000, 5, 1500, 500000, 50000, 0, 0, 0, 0, 450000, 0, 500000, 0, 4, 0, 559, 0, 1, 0, 0, 0, 0, 0, 0, 0, NULL, 2023, 1, NULL, 0, NULL, NULL, NULL, NULL, NULL),
	(3780, '3578175908760001', '2023-02-13 03:45:38', '2023-02-13', 0, 13000, 5, 1500, 500000, 50000, 0, 0, 0, 0, 450000, 0, 500000, 0, 4, 0, 559, 0, 1, 0, 0, 0, 0, 0, 0, 0, NULL, 2023, 1, NULL, 0, NULL, NULL, NULL, NULL, NULL),
	(3781, '3578196903960001', '2023-02-13 03:45:38', '2023-02-13', 0, 13000, 5, 1500, 500000, 50000, 0, 0, 0, 0, 450000, 0, 500000, 0, 4, 0, 559, 0, 1, 0, 0, 0, 0, 0, 0, 0, NULL, 2023, 1, NULL, 0, NULL, NULL, NULL, NULL, NULL),
	(3782, '3578174803810011', '2023-02-13 03:45:38', '2023-02-13', 0, 13000, 5, 1500, 500000, 50000, 0, 0, 0, 0, 450000, 0, 500000, 0, 4, 0, 559, 0, 1, 0, 0, 0, 0, 0, 0, 0, NULL, 2023, 1, NULL, 0, NULL, NULL, NULL, NULL, NULL),
	(3783, '3578105009820004', '2023-02-13 03:45:38', '2023-02-13', 0, 13000, 5, 1500, 500000, 50000, 0, 0, 0, 0, 450000, 0, 500000, 0, 4, 0, 559, 0, 1, 0, 0, 0, 0, 0, 0, 0, NULL, 2023, 1, NULL, 0, NULL, NULL, NULL, NULL, NULL),
	(3784, '3524136904780002', '2023-02-13 03:45:38', '2023-02-13', 0, 13000, 5, 1500, 500000, 50000, 0, 0, 0, 0, 450000, 0, 500000, 0, 4, 0, 559, 0, 1, 0, 0, 0, 0, 0, 0, 0, NULL, 2023, 1, NULL, 0, NULL, NULL, NULL, NULL, NULL),
	(3785, '3578167006760220', '2023-02-13 03:45:38', '2023-02-13', 0, 13000, 5, 1500, 500000, 50000, 0, 0, 0, 0, 450000, 0, 500000, 0, 4, 0, 559, 0, 1, 0, 0, 0, 0, 0, 0, 0, NULL, 2023, 1, NULL, 0, NULL, NULL, NULL, NULL, NULL),
	(3786, '3578171412910002', '2023-02-13 03:45:38', '2023-02-13', 0, 13000, 5, 1500, 500000, 50000, 0, 0, 0, 0, 450000, 0, 500000, 0, 4, 0, 559, 0, 1, 0, 0, 0, 0, 0, 0, 0, NULL, 2023, 1, NULL, 0, NULL, NULL, NULL, NULL, NULL),
	(3787, '3527034411894028', '2023-02-13 03:45:38', '2023-02-13', 0, 13000, 5, 1500, 500000, 50000, 0, 0, 0, 0, 450000, 0, 500000, 0, 4, 0, 559, 0, 1, 0, 0, 0, 0, 0, 0, 0, NULL, 2023, 1, NULL, 0, NULL, NULL, NULL, NULL, NULL),
	(3788, '3578102204820010', '2023-02-13 03:45:38', '2023-02-13', 0, 13000, 5, 1500, 500000, 50000, 0, 0, 0, 0, 450000, 0, 500000, 0, 4, 0, 559, 0, 1, 0, 0, 0, 0, 0, 0, 0, NULL, 2023, 1, NULL, 0, NULL, NULL, NULL, NULL, NULL),
	(3789, '3578171409590002', '2023-02-13 03:45:38', '2023-02-13', 0, 13000, 5, 1500, 500000, 50000, 0, 0, 0, 0, 450000, 0, 500000, 0, 4, 0, 559, 0, 1, 0, 0, 0, 0, 0, 0, 0, NULL, 2023, 1, NULL, 0, NULL, NULL, NULL, NULL, NULL),
	(3790, '3578161009930005', '2023-02-13 03:45:38', '2023-02-13', 0, 13000, 5, 1500, 500000, 50000, 0, 0, 0, 0, 450000, 0, 500000, 0, 4, 0, 559, 0, 1, 0, 0, 0, 0, 0, 0, 0, NULL, 2023, 1, NULL, 0, NULL, NULL, NULL, NULL, NULL),
	(3791, '3578045203920004', '2023-02-13 03:45:38', '2023-02-13', 0, 13000, 5, 1500, 500000, 50000, 0, 0, 0, 0, 450000, 0, 500000, 0, 4, 0, 559, 0, 1, 0, 0, 0, 0, 0, 0, 0, NULL, 2023, 1, NULL, 0, NULL, NULL, NULL, NULL, NULL),
	(3792, '3578282504960001', '2023-02-13 03:45:38', '2023-02-13', 0, 13000, 5, 1500, 500000, 50000, 0, 0, 0, 0, 450000, 0, 500000, 0, 4, 0, 559, 0, 1, 0, 0, 0, 0, 0, 0, 0, NULL, 2023, 1, NULL, 0, NULL, NULL, NULL, NULL, NULL),
	(3793, '3578271302990004', '2023-02-13 03:45:38', '2023-02-13', 0, 13000, 5, 1500, 500000, 50000, 0, 0, 0, 0, 450000, 0, 500000, 0, 4, 0, 559, 0, 1, 0, 0, 0, 0, 0, 0, 0, NULL, 2023, 1, NULL, 0, NULL, NULL, NULL, NULL, NULL),
	(3794, '3578102704970005', '2023-02-13 03:45:38', '2023-02-13', 0, 13000, 5, 1500, 500000, 50000, 0, 0, 0, 0, 450000, 0, 500000, 0, 4, 0, 559, 0, 1, 0, 0, 0, 0, 0, 0, 0, NULL, 2023, 1, NULL, 0, NULL, NULL, NULL, NULL, NULL),
	(3795, '3578062406600003', '2023-02-13 03:45:38', '2023-02-13', 0, 13000, 5, 1500, 500000, 50000, 0, 0, 0, 0, 450000, 0, 500000, 0, 4, 0, 559, 0, 1, 0, 0, 0, 0, 0, 0, 0, NULL, 2023, 1, NULL, 0, NULL, NULL, NULL, NULL, NULL),
	(3796, '3578110303980002', '2023-02-13 03:45:38', '2023-02-13', 0, 13000, 5, 1500, 500000, 50000, 0, 0, 0, 0, 450000, 0, 500000, 0, 4, 0, 559, 0, 1, 0, 0, 0, 0, 0, 0, 0, NULL, 2023, 1, NULL, 0, NULL, NULL, NULL, NULL, NULL),
	(3797, '3578164305700006', '2023-02-13 03:45:38', '2023-02-13', 0, 13000, 5, 1500, 500000, 50000, 0, 0, 0, 0, 450000, 0, 500000, 0, 4, 0, 559, 0, 1, 0, 0, 0, 0, 0, 0, 0, NULL, 2023, 1, NULL, 0, NULL, NULL, NULL, NULL, NULL),
	(3798, '3578055111810009', '2023-02-13 03:45:38', '2023-02-13', 0, 13000, 5, 1500, 500000, 50000, 0, 0, 0, 0, 450000, 0, 500000, 0, 4, 0, 559, 0, 1, 0, 0, 0, 0, 0, 0, 0, NULL, 2023, 1, NULL, 0, NULL, NULL, NULL, NULL, NULL),
	(3799, '3578176910940002', '2023-02-13 03:45:38', '2023-02-13', 0, 13000, 5, 1500, 500000, 50000, 0, 0, 0, 0, 450000, 0, 500000, 0, 4, 0, 559, 0, 1, 0, 0, 0, 0, 0, 0, 0, NULL, 2023, 1, NULL, 0, NULL, NULL, NULL, NULL, NULL),
	(3800, '3578164112650003', '2023-02-13 03:45:38', '2023-02-13', 0, 13000, 5, 1500, 500000, 50000, 0, 0, 0, 0, 450000, 0, 500000, 0, 4, 0, 559, 0, 1, 0, 0, 0, 0, 0, 0, 0, NULL, 2023, 1, NULL, 0, NULL, NULL, NULL, NULL, NULL),
	(3801, '3513212603970001', '2023-02-13 03:45:38', '2023-02-13', 0, 13000, 5, 1500, 500000, 50000, 0, 0, 0, 0, 450000, 0, 500000, 0, 4, 0, 559, 0, 1, 0, 0, 0, 0, 0, 0, 0, NULL, 2023, 1, NULL, 0, NULL, NULL, NULL, NULL, NULL),
	(3802, '3514126808820003', '2023-02-13 03:45:38', '2023-02-13', 0, 13000, 5, 1500, 500000, 50000, 0, 0, 0, 0, 450000, 0, 500000, 0, 4, 0, 559, 0, 1, 0, 0, 0, 0, 0, 0, 0, NULL, 2023, 1, NULL, 0, NULL, NULL, NULL, NULL, NULL),
	(3803, '3525124312940002', '2023-02-13 03:45:38', '2023-02-13', 0, 13000, 5, 1500, 500000, 50000, 0, 0, 0, 0, 450000, 0, 500000, 0, 4, 0, 559, 0, 1, 0, 0, 0, 0, 0, 0, 0, NULL, 2023, 1, NULL, 0, NULL, NULL, NULL, NULL, NULL),
	(3900, '10230', '2023-02-22 07:02:29', '2023-02-22', 3, 13000, 5, 2500, 3925300, 50000, 132000, 1, 7000, 125000, 450000, 48, 4061000, 181700, 4, 46000, 582, 48, 1, 1, 2, 56000, 4, 450000, 120000, 2, NULL, 2023, 6, NULL, 0, 1200, 2400, 3600, 1, NULL),
	(3901, '10235', '2023-02-22 07:02:29', '2023-02-22', 0, 13000, 9, 1500, 2851410, 50000, 0, 0, 8250, 0, 0, 48, 3290000, 438590, 4, 0, 582, 48, 1, 2, 0, 66000, 0, 0, 72000, 0, NULL, 2023, 6, NULL, 0, 720, 1440, 180, 2, NULL),
	(4042, '10230', '2023-02-22 07:49:40', '2023-02-22', 3, 13000, 5, 2500, 3980400, 50000, 132000, 1, 7000, 125000, 450000, 48, 4061000, 126600, 4, 46000, 587, 48, 1, 1, 2, 56000, 4, 450000, 120000, 2, NULL, 2023, 12, NULL, 30000, 1200, 2400, 3000, 1, NULL),
	(4043, '10235', '2023-02-22 07:49:40', '2023-02-22', 0, 13000, 9, 1500, 2849430, 50000, 0, 0, 8250, 0, 0, 48, 3290000, 440570, 4, 0, 587, 48, 1, 2, 0, 66000, 0, 0, 72000, 0, NULL, 2023, 12, NULL, 40000, 720, 1440, 2160, 2, NULL),
	(4044, '3578171005780011', '2023-02-22 07:49:40', '2023-02-22', 0, 13000, 5, 1500, 497840, 50000, 0, 0, 0, 0, 450000, 0, 500000, 2160, 4, 0, 587, 0, 1, 0, 0, 0, 0, 0, 0, 0, NULL, 2023, 12, NULL, 0, 0, 0, 2160, 0, NULL),
	(4045, '3578164404680002', '2023-02-22 07:49:40', '2023-02-22', 0, 13000, 5, 1500, 497840, 50000, 0, 0, 0, 0, 450000, 0, 500000, 2160, 4, 0, 587, 0, 1, 0, 0, 0, 0, 0, 0, 0, NULL, 2023, 12, NULL, 0, 0, 0, 2160, 0, NULL),
	(4046, '3578152104890001', '2023-02-22 07:49:40', '2023-02-22', 0, 13000, 5, 1500, 497840, 50000, 0, 0, 0, 0, 450000, 0, 500000, 2160, 4, 0, 587, 0, 1, 0, 0, 0, 0, 0, 0, 0, NULL, 2023, 12, NULL, 0, 0, 0, 2160, 0, NULL),
	(4047, '3578081005990004', '2023-02-22 07:49:40', '2023-02-22', 0, 13000, 5, 1500, 497840, 50000, 0, 0, 0, 0, 450000, 0, 500000, 2160, 4, 0, 587, 0, 1, 0, 0, 0, 0, 0, 0, 0, NULL, 2023, 12, NULL, 0, 0, 0, 2160, 0, NULL),
	(4048, '3578174905600001', '2023-02-22 07:49:40', '2023-02-22', 0, 13000, 5, 1500, 497840, 50000, 0, 0, 0, 0, 450000, 0, 500000, 2160, 4, 0, 587, 0, 1, 0, 0, 0, 0, 0, 0, 0, NULL, 2023, 12, NULL, 0, 0, 0, 2160, 0, NULL),
	(4049, '3578166610880002', '2023-02-22 07:49:40', '2023-02-22', 0, 13000, 5, 1500, 497840, 50000, 0, 0, 0, 0, 450000, 0, 500000, 2160, 4, 0, 587, 0, 1, 0, 0, 0, 0, 0, 0, 0, NULL, 2023, 12, NULL, 0, 0, 0, 2160, 0, NULL),
	(4050, '3578104406840008', '2023-02-22 07:49:40', '2023-02-22', 0, 13000, 5, 1500, 497840, 50000, 0, 0, 0, 0, 450000, 0, 500000, 2160, 4, 0, 587, 0, 1, 0, 0, 0, 0, 0, 0, 0, NULL, 2023, 12, NULL, 0, 0, 0, 2160, 0, NULL),
	(4051, '3578107103570001', '2023-02-22 07:49:40', '2023-02-22', 0, 13000, 5, 1500, 497840, 50000, 0, 0, 0, 0, 450000, 0, 500000, 2160, 4, 0, 587, 0, 1, 0, 0, 0, 0, 0, 0, 0, NULL, 2023, 12, NULL, 0, 0, 0, 2160, 0, NULL),
	(4052, '3578172009850003', '2023-02-22 07:49:41', '2023-02-22', 0, 13000, 5, 1500, 497840, 50000, 0, 0, 0, 0, 450000, 0, 500000, 2160, 4, 0, 587, 0, 1, 0, 0, 0, 0, 0, 0, 0, NULL, 2023, 12, NULL, 0, 0, 0, 2160, 0, NULL),
	(4053, '3578176908920001', '2023-02-22 07:49:41', '2023-02-22', 0, 13000, 5, 1500, 497840, 50000, 0, 0, 0, 0, 450000, 0, 500000, 2160, 4, 0, 587, 0, 1, 0, 0, 0, 0, 0, 0, 0, NULL, 2023, 12, NULL, 0, 0, 0, 2160, 0, NULL),
	(4054, '3578290802610001', '2023-02-22 07:49:41', '2023-02-22', 0, 13000, 5, 1500, 497840, 50000, 0, 0, 0, 0, 450000, 0, 500000, 2160, 4, 0, 587, 0, 1, 0, 0, 0, 0, 0, 0, 0, NULL, 2023, 12, NULL, 0, 0, 0, 2160, 0, NULL),
	(4055, '3507125312760003', '2023-02-22 07:49:41', '2023-02-22', 0, 13000, 5, 1500, 497840, 50000, 0, 0, 0, 0, 450000, 0, 500000, 2160, 4, 0, 587, 0, 1, 0, 0, 0, 0, 0, 0, 0, NULL, 2023, 12, NULL, 0, 0, 0, 2160, 0, NULL),
	(4056, '3578177110750002', '2023-02-22 07:49:41', '2023-02-22', 0, 13000, 5, 1500, 497840, 50000, 0, 0, 0, 0, 450000, 0, 500000, 2160, 4, 0, 587, 0, 1, 0, 0, 0, 0, 0, 0, 0, NULL, 2023, 12, NULL, 0, 0, 0, 2160, 0, NULL),
	(4057, '3578106707700007', '2023-02-22 07:49:41', '2023-02-22', 0, 13000, 5, 1500, 497840, 50000, 0, 0, 0, 0, 450000, 0, 500000, 2160, 4, 0, 587, 0, 1, 0, 0, 0, 0, 0, 0, 0, NULL, 2023, 12, NULL, 0, 0, 0, 2160, 0, NULL),
	(4058, '3318021307950001', '2023-02-22 07:49:41', '2023-02-22', 0, 13000, 5, 1500, 497840, 50000, 0, 0, 0, 0, 450000, 0, 500000, 2160, 4, 0, 587, 0, 1, 0, 0, 0, 0, 0, 0, 0, NULL, 2023, 12, NULL, 0, 0, 0, 2160, 0, NULL),
	(4059, '3578174103730002', '2023-02-22 07:49:41', '2023-02-22', 0, 13000, 5, 1500, 497840, 50000, 0, 0, 0, 0, 450000, 0, 500000, 2160, 4, 0, 587, 0, 1, 0, 0, 0, 0, 0, 0, 0, NULL, 2023, 12, NULL, 0, 0, 0, 2160, 0, NULL),
	(4060, '3578172801700001', '2023-02-22 07:49:41', '2023-02-22', 0, 13000, 5, 1500, 497840, 50000, 0, 0, 0, 0, 450000, 0, 500000, 2160, 4, 0, 587, 0, 1, 0, 0, 0, 0, 0, 0, 0, NULL, 2023, 12, NULL, 0, 0, 0, 2160, 0, NULL),
	(4061, '3578115511810005', '2023-02-22 07:49:41', '2023-02-22', 0, 13000, 5, 1500, 497840, 50000, 0, 0, 0, 0, 450000, 0, 500000, 2160, 4, 0, 587, 0, 1, 0, 0, 0, 0, 0, 0, 0, NULL, 2023, 12, NULL, 0, 0, 0, 2160, 0, NULL),
	(4062, '3578174806780006', '2023-02-22 07:49:41', '2023-02-22', 0, 13000, 5, 1500, 497840, 50000, 0, 0, 0, 0, 450000, 0, 500000, 2160, 4, 0, 587, 0, 1, 0, 0, 0, 0, 0, 0, 0, NULL, 2023, 12, NULL, 0, 0, 0, 2160, 0, NULL),
	(4063, '3578100107750004', '2023-02-22 07:49:41', '2023-02-22', 0, 13000, 5, 1500, 497840, 50000, 0, 0, 0, 0, 450000, 0, 500000, 2160, 4, 0, 587, 0, 1, 0, 0, 0, 0, 0, 0, 0, NULL, 2023, 12, NULL, 0, 0, 0, 2160, 0, NULL),
	(4064, '3578175908760001', '2023-02-22 07:49:41', '2023-02-22', 0, 13000, 5, 1500, 497840, 50000, 0, 0, 0, 0, 450000, 0, 500000, 2160, 4, 0, 587, 0, 1, 0, 0, 0, 0, 0, 0, 0, NULL, 2023, 12, NULL, 0, 0, 0, 2160, 0, NULL),
	(4065, '3578196903960001', '2023-02-22 07:49:41', '2023-02-22', 0, 13000, 5, 1500, 497840, 50000, 0, 0, 0, 0, 450000, 0, 500000, 2160, 4, 0, 587, 0, 1, 0, 0, 0, 0, 0, 0, 0, NULL, 2023, 12, NULL, 0, 0, 0, 2160, 0, NULL),
	(4066, '3578174803810011', '2023-02-22 07:49:41', '2023-02-22', 0, 13000, 5, 1500, 497840, 50000, 0, 0, 0, 0, 450000, 0, 500000, 2160, 4, 0, 587, 0, 1, 0, 0, 0, 0, 0, 0, 0, NULL, 2023, 12, NULL, 0, 0, 0, 2160, 0, NULL),
	(4067, '3578105009820004', '2023-02-22 07:49:41', '2023-02-22', 0, 13000, 5, 1500, 497840, 50000, 0, 0, 0, 0, 450000, 0, 500000, 2160, 4, 0, 587, 0, 1, 0, 0, 0, 0, 0, 0, 0, NULL, 2023, 12, NULL, 0, 0, 0, 2160, 0, NULL),
	(4068, '3524136904780002', '2023-02-22 07:49:41', '2023-02-22', 0, 13000, 5, 1500, 497840, 50000, 0, 0, 0, 0, 450000, 0, 500000, 2160, 4, 0, 587, 0, 1, 0, 0, 0, 0, 0, 0, 0, NULL, 2023, 12, NULL, 0, 0, 0, 2160, 0, NULL),
	(4069, '3578167006760220', '2023-02-22 07:49:41', '2023-02-22', 0, 13000, 5, 1500, 497840, 50000, 0, 0, 0, 0, 450000, 0, 500000, 2160, 4, 0, 587, 0, 1, 0, 0, 0, 0, 0, 0, 0, NULL, 2023, 12, NULL, 0, 0, 0, 2160, 0, NULL),
	(4070, '3578171412910002', '2023-02-22 07:49:41', '2023-02-22', 0, 13000, 5, 1500, 497840, 50000, 0, 0, 0, 0, 450000, 0, 500000, 2160, 4, 0, 587, 0, 1, 0, 0, 0, 0, 0, 0, 0, NULL, 2023, 12, NULL, 0, 0, 0, 2160, 0, NULL),
	(4071, '3527034411894028', '2023-02-22 07:49:41', '2023-02-22', 0, 13000, 5, 1500, 497840, 50000, 0, 0, 0, 0, 450000, 0, 500000, 2160, 4, 0, 587, 0, 1, 0, 0, 0, 0, 0, 0, 0, NULL, 2023, 12, NULL, 0, 0, 0, 2160, 0, NULL),
	(4072, '3578102204820010', '2023-02-22 07:49:41', '2023-02-22', 0, 13000, 5, 1500, 497840, 50000, 0, 0, 0, 0, 450000, 0, 500000, 2160, 4, 0, 587, 0, 1, 0, 0, 0, 0, 0, 0, 0, NULL, 2023, 12, NULL, 0, 0, 0, 2160, 0, NULL),
	(4073, '3578171409590002', '2023-02-22 07:49:41', '2023-02-22', 0, 13000, 5, 1500, 497840, 50000, 0, 0, 0, 0, 450000, 0, 500000, 2160, 4, 0, 587, 0, 1, 0, 0, 0, 0, 0, 0, 0, NULL, 2023, 12, NULL, 0, 0, 0, 2160, 0, NULL),
	(4074, '3578161009930005', '2023-02-22 07:49:41', '2023-02-22', 0, 13000, 5, 1500, 497840, 50000, 0, 0, 0, 0, 450000, 0, 500000, 2160, 4, 0, 587, 0, 1, 0, 0, 0, 0, 0, 0, 0, NULL, 2023, 12, NULL, 0, 0, 0, 2160, 0, NULL),
	(4075, '3578045203920004', '2023-02-22 07:49:41', '2023-02-22', 0, 13000, 5, 1500, 497840, 50000, 0, 0, 0, 0, 450000, 0, 500000, 2160, 4, 0, 587, 0, 1, 0, 0, 0, 0, 0, 0, 0, NULL, 2023, 12, NULL, 0, 0, 0, 2160, 0, NULL),
	(4076, '3578282504960001', '2023-02-22 07:49:41', '2023-02-22', 0, 13000, 5, 1500, 497840, 50000, 0, 0, 0, 0, 450000, 0, 500000, 2160, 4, 0, 587, 0, 1, 0, 0, 0, 0, 0, 0, 0, NULL, 2023, 12, NULL, 0, 0, 0, 2160, 0, NULL),
	(4077, '3578271302990004', '2023-02-22 07:49:41', '2023-02-22', 0, 13000, 5, 1500, 497840, 50000, 0, 0, 0, 0, 450000, 0, 500000, 2160, 4, 0, 587, 0, 1, 0, 0, 0, 0, 0, 0, 0, NULL, 2023, 12, NULL, 0, 0, 0, 2160, 0, NULL),
	(4078, '3578102704970005', '2023-02-22 07:49:41', '2023-02-22', 0, 13000, 5, 1500, 497840, 50000, 0, 0, 0, 0, 450000, 0, 500000, 2160, 4, 0, 587, 0, 1, 0, 0, 0, 0, 0, 0, 0, NULL, 2023, 12, NULL, 0, 0, 0, 2160, 0, NULL),
	(4079, '3578062406600003', '2023-02-22 07:49:41', '2023-02-22', 0, 13000, 5, 1500, 497840, 50000, 0, 0, 0, 0, 450000, 0, 500000, 2160, 4, 0, 587, 0, 1, 0, 0, 0, 0, 0, 0, 0, NULL, 2023, 12, NULL, 0, 0, 0, 2160, 0, NULL),
	(4080, '3578110303980002', '2023-02-22 07:49:41', '2023-02-22', 0, 13000, 5, 1500, 497840, 50000, 0, 0, 0, 0, 450000, 0, 500000, 2160, 4, 0, 587, 0, 1, 0, 0, 0, 0, 0, 0, 0, NULL, 2023, 12, NULL, 0, 0, 0, 2160, 0, NULL),
	(4081, '3578164305700006', '2023-02-22 07:49:41', '2023-02-22', 0, 13000, 5, 1500, 497840, 50000, 0, 0, 0, 0, 450000, 0, 500000, 2160, 4, 0, 587, 0, 1, 0, 0, 0, 0, 0, 0, 0, NULL, 2023, 12, NULL, 0, 0, 0, 2160, 0, NULL),
	(4082, '3578055111810009', '2023-02-22 07:49:41', '2023-02-22', 0, 13000, 5, 1500, 497840, 50000, 0, 0, 0, 0, 450000, 0, 500000, 2160, 4, 0, 587, 0, 1, 0, 0, 0, 0, 0, 0, 0, NULL, 2023, 12, NULL, 0, 0, 0, 2160, 0, NULL),
	(4083, '3578176910940002', '2023-02-22 07:49:41', '2023-02-22', 0, 13000, 5, 1500, 497840, 50000, 0, 0, 0, 0, 450000, 0, 500000, 2160, 4, 0, 587, 0, 1, 0, 0, 0, 0, 0, 0, 0, NULL, 2023, 12, NULL, 0, 0, 0, 2160, 0, NULL),
	(4084, '3578164112650003', '2023-02-22 07:49:41', '2023-02-22', 0, 13000, 5, 1500, 497840, 50000, 0, 0, 0, 0, 450000, 0, 500000, 2160, 4, 0, 587, 0, 1, 0, 0, 0, 0, 0, 0, 0, NULL, 2023, 12, NULL, 0, 0, 0, 2160, 0, NULL),
	(4085, '3513212603970001', '2023-02-22 07:49:41', '2023-02-22', 0, 13000, 5, 1500, 497840, 50000, 0, 0, 0, 0, 450000, 0, 500000, 2160, 4, 0, 587, 0, 1, 0, 0, 0, 0, 0, 0, 0, NULL, 2023, 12, NULL, 0, 0, 0, 2160, 0, NULL),
	(4086, '3514126808820003', '2023-02-22 07:49:41', '2023-02-22', 0, 13000, 5, 1500, 497840, 50000, 0, 0, 0, 0, 450000, 0, 500000, 2160, 4, 0, 587, 0, 1, 0, 0, 0, 0, 0, 0, 0, NULL, 2023, 12, NULL, 0, 0, 0, 2160, 0, NULL),
	(4087, '3525124312940002', '2023-02-22 07:49:41', '2023-02-22', 0, 13000, 5, 1500, 497840, 50000, 0, 0, 0, 0, 450000, 0, 500000, 2160, 4, 0, 587, 0, 1, 0, 0, 0, 0, 0, 0, 0, NULL, 2023, 12, NULL, 0, 0, 0, 2160, 0, NULL),
	(4134, '10230', '2023-02-22 10:55:48', '2023-02-22', 0, 13000, 5, 2500, 3726400, 50000, 0, 0, 7000, 125000, 450000, 48, 3883000, 156600, 4, 0, 604, 48, 1, 1, 2, 56000, 4, 450000, 120000, 2, NULL, 2023, 2, NULL, 0, 1200, 2400, 3000, 1, 150000),
	(4135, '10235', '2023-02-22 10:55:48', '2023-02-22', 0, 13000, 9, 1500, 3186040, 50000, 0, 0, 8250, 0, 0, 48, 3290000, 103960, 4, 0, 604, 48, 1, 2, 0, 66000, 0, 0, 72000, 0, NULL, 2023, 2, NULL, 0, 720, 1440, 1800, 1, 100000),
	(4136, '3578171005780011', '2023-02-22 10:55:48', '2023-02-22', 0, 13000, 5, 1500, 568040, 50000, 0, 0, 0, 0, 450000, 48, 572000, 3960, 4, 0, 604, 48, 1, 0, 0, 0, 0, 0, 72000, 0, NULL, 2023, 2, NULL, 0, 720, 1440, 1800, 0, 0),
	(4137, '3578164404680002', '2023-02-22 10:55:48', '2023-02-22', 0, 13000, 5, 1500, 521480, 50000, 0, 0, 0, 0, 450000, 16, 524000, 2520, 4, 0, 604, 16, 1, 0, 0, 0, 0, 0, 24000, 0, NULL, 2023, 2, NULL, 0, 240, 480, 1800, 0, 0),
	(4138, '3578152104890001', '2023-02-22 10:55:48', '2023-02-22', 0, 13000, 5, 1500, 568040, 50000, 0, 0, 0, 0, 450000, 48, 572000, 3960, 4, 0, 604, 48, 1, 0, 0, 0, 0, 0, 72000, 0, NULL, 2023, 2, NULL, 0, 720, 1440, 1800, 0, 0),
	(4139, '3578081005990004', '2023-02-22 10:55:48', '2023-02-22', 0, 13000, 5, 1500, 533120, 50000, 0, 0, 0, 0, 450000, 24, 536000, 2880, 4, 0, 604, 24, 1, 0, 0, 0, 0, 0, 36000, 0, NULL, 2023, 2, NULL, 0, 360, 720, 1800, 0, 0),
	(4140, '3578174905600001', '2023-02-22 10:55:48', '2023-02-22', 0, 13000, 5, 1500, 533120, 50000, 0, 0, 0, 0, 450000, 24, 536000, 2880, 4, 0, 604, 24, 1, 0, 0, 0, 0, 0, 36000, 0, NULL, 2023, 2, NULL, 0, 360, 720, 1800, 0, 0),
	(4141, '3578166610880002', '2023-02-22 10:55:48', '2023-02-22', 0, 13000, 5, 1500, 533120, 50000, 0, 0, 0, 0, 450000, 24, 536000, 2880, 4, 0, 604, 24, 1, 0, 0, 0, 0, 0, 36000, 0, NULL, 2023, 2, NULL, 0, 360, 720, 1800, 0, 0),
	(4142, '3578104406840008', '2023-02-22 10:55:48', '2023-02-22', 0, 13000, 5, 1500, 546215, 50000, 0, 0, 0, 0, 450000, 33, 549500, 3285, 4, 0, 604, 33, 1, 0, 0, 0, 0, 0, 49500, 0, NULL, 2023, 2, NULL, 0, 495, 990, 1800, 0, 0),
	(4143, '3578107103570001', '2023-02-22 10:55:48', '2023-02-22', 0, 13000, 5, 1500, 498200, 50000, 0, 0, 0, 0, 450000, 0, 500000, 1800, 4, 0, 604, 0, 1, 0, 0, 0, 0, 0, 0, 0, NULL, 2023, 2, NULL, 0, 0, 0, 1800, 0, 0),
	(4144, '3578172009850003', '2023-02-22 10:55:48', '2023-02-22', 0, 13000, 5, 1500, 568040, 50000, 0, 0, 0, 0, 450000, 48, 572000, 3960, 4, 0, 604, 48, 1, 0, 0, 0, 0, 0, 72000, 0, NULL, 2023, 2, NULL, 0, 720, 1440, 1800, 0, 0),
	(4145, '3578176908920001', '2023-02-22 10:55:48', '2023-02-22', 0, 13000, 5, 1500, 534575, 50000, 0, 0, 0, 0, 450000, 25, 537500, 2925, 4, 0, 604, 25, 1, 0, 0, 0, 0, 0, 37500, 0, NULL, 2023, 2, NULL, 0, 375, 750, 1800, 0, 0),
	(4146, '3578290802610001', '2023-02-22 10:55:48', '2023-02-22', 0, 13000, 5, 1500, 498200, 50000, 0, 0, 0, 0, 450000, 0, 500000, 1800, 4, 0, 604, 0, 1, 0, 0, 0, 0, 0, 0, 0, NULL, 2023, 2, NULL, 0, 0, 0, 1800, 0, 0),
	(4147, '3507125312760003', '2023-02-22 10:55:48', '2023-02-22', 0, 13000, 5, 1500, 538940, 50000, 0, 0, 0, 0, 450000, 28, 542000, 3060, 4, 0, 604, 28, 1, 0, 0, 0, 0, 0, 42000, 0, NULL, 2023, 2, NULL, 0, 420, 840, 1800, 0, 0),
	(4148, '3578177110750002', '2023-02-22 10:55:48', '2023-02-22', 0, 13000, 5, 1500, 541850, 50000, 0, 0, 0, 0, 450000, 30, 545000, 3150, 4, 0, 604, 30, 1, 0, 0, 0, 0, 0, 45000, 0, NULL, 2023, 2, NULL, 0, 450, 900, 1800, 0, 0),
	(4149, '3578106707700007', '2023-02-22 10:55:48', '2023-02-22', 0, 13000, 5, 1500, 570950, 50000, 0, 0, 0, 0, 450000, 50, 575000, 4050, 4, 0, 604, 50, 1, 0, 0, 0, 0, 0, 75000, 0, NULL, 2023, 2, NULL, 0, 750, 1500, 1800, 0, 0),
	(4150, '3318021307950001', '2023-02-22 10:55:48', '2023-02-22', 0, 13000, 5, 1500, 541850, 50000, 0, 0, 0, 0, 450000, 30, 545000, 3150, 4, 0, 604, 30, 1, 0, 0, 0, 0, 0, 45000, 0, NULL, 2023, 2, NULL, 0, 450, 900, 1800, 0, 0),
	(4151, '3578174103730002', '2023-02-22 10:55:48', '2023-02-22', 0, 13000, 5, 1500, 498200, 50000, 0, 0, 0, 0, 450000, 0, 500000, 1800, 4, 0, 604, 0, 1, 0, 0, 0, 0, 0, 0, 0, NULL, 2023, 2, NULL, 0, 0, 0, 1800, 0, 0),
	(4152, '3578172801700001', '2023-02-22 10:55:48', '2023-02-22', 0, 13000, 5, 1500, 533120, 50000, 0, 0, 0, 0, 450000, 24, 536000, 2880, 4, 0, 604, 24, 1, 0, 0, 0, 0, 0, 36000, 0, NULL, 2023, 2, NULL, 0, 360, 720, 1800, 0, 0),
	(4153, '3578115511810005', '2023-02-22 10:55:48', '2023-02-22', 0, 13000, 5, 1500, 533120, 50000, 0, 0, 0, 0, 450000, 24, 536000, 2880, 4, 0, 604, 24, 1, 0, 0, 0, 0, 0, 36000, 0, NULL, 2023, 2, NULL, 0, 360, 720, 1800, 0, 0),
	(4154, '3578174806780006', '2023-02-22 10:55:48', '2023-02-22', 0, 13000, 5, 1500, 533120, 50000, 0, 0, 0, 0, 450000, 24, 536000, 2880, 4, 0, 604, 24, 1, 0, 0, 0, 0, 0, 36000, 0, NULL, 2023, 2, NULL, 0, 360, 720, 1800, 0, 0),
	(4155, '3578100107750004', '2023-02-22 10:55:48', '2023-02-22', 0, 13000, 5, 1500, 536030, 50000, 0, 0, 0, 0, 450000, 26, 539000, 2970, 4, 0, 604, 26, 1, 0, 0, 0, 0, 0, 39000, 0, NULL, 2023, 2, NULL, 0, 390, 780, 1800, 0, 0),
	(4156, '3578175908760001', '2023-02-22 10:55:48', '2023-02-22', 0, 13000, 5, 1500, 550580, 50000, 0, 0, 0, 0, 450000, 36, 554000, 3420, 4, 0, 604, 36, 1, 0, 0, 0, 0, 0, 54000, 0, NULL, 2023, 2, NULL, 0, 540, 1080, 1800, 0, 0),
	(4157, '3578196903960001', '2023-02-22 10:55:48', '2023-02-22', 0, 13000, 5, 1500, 498200, 50000, 0, 0, 0, 0, 450000, 0, 500000, 1800, 4, 0, 604, 0, 1, 0, 0, 0, 0, 0, 0, 0, NULL, 2023, 2, NULL, 0, 0, 0, 1800, 0, 0),
	(4158, '3578174803810011', '2023-02-22 10:55:48', '2023-02-22', 0, 13000, 5, 1500, 498200, 50000, 0, 0, 0, 0, 450000, 0, 500000, 1800, 4, 0, 604, 0, 1, 0, 0, 0, 0, 0, 0, 0, NULL, 2023, 2, NULL, 0, 0, 0, 1800, 0, 0),
	(4159, '3578105009820004', '2023-02-22 10:55:48', '2023-02-22', 0, 13000, 5, 1500, 530210, 50000, 0, 0, 0, 0, 450000, 22, 533000, 2790, 4, 0, 604, 22, 1, 0, 0, 0, 0, 0, 33000, 0, NULL, 2023, 2, NULL, 0, 330, 660, 1800, 0, 0),
	(4160, '3524136904780002', '2023-02-22 10:55:49', '2023-02-22', 0, 13000, 5, 1500, 538940, 50000, 0, 0, 0, 0, 450000, 28, 542000, 3060, 4, 0, 604, 28, 1, 0, 0, 0, 0, 0, 42000, 0, NULL, 2023, 2, NULL, 0, 420, 840, 1800, 0, 0),
	(4161, '3578167006760220', '2023-02-22 10:55:49', '2023-02-22', 0, 13000, 5, 1500, 533120, 50000, 0, 0, 0, 0, 450000, 24, 536000, 2880, 4, 0, 604, 24, 1, 0, 0, 0, 0, 0, 36000, 0, NULL, 2023, 2, NULL, 0, 360, 720, 1800, 0, 0),
	(4162, '3578171412910002', '2023-02-22 10:55:49', '2023-02-22', 0, 13000, 5, 1500, 550580, 50000, 0, 0, 0, 0, 450000, 36, 554000, 3420, 4, 0, 604, 36, 1, 0, 0, 0, 0, 0, 54000, 0, NULL, 2023, 2, NULL, 0, 540, 1080, 1800, 0, 0),
	(4163, '3527034411894028', '2023-02-22 10:55:49', '2023-02-22', 0, 13000, 5, 1500, 518570, 50000, 0, 0, 0, 0, 450000, 14, 521000, 2430, 4, 0, 604, 14, 1, 0, 0, 0, 0, 0, 21000, 0, NULL, 2023, 2, NULL, 0, 210, 420, 1800, 0, 0),
	(4164, '3578102204820010', '2023-02-22 10:55:49', '2023-02-22', 0, 13000, 5, 1500, 533120, 50000, 0, 0, 0, 0, 450000, 24, 536000, 2880, 4, 0, 604, 24, 1, 0, 0, 0, 0, 0, 36000, 0, NULL, 2023, 2, NULL, 0, 360, 720, 1800, 0, 0),
	(4165, '3578171409590002', '2023-02-22 10:55:49', '2023-02-22', 0, 13000, 5, 1500, 498200, 50000, 0, 0, 0, 0, 450000, 0, 500000, 1800, 4, 0, 604, 0, 1, 0, 0, 0, 0, 0, 0, 0, NULL, 2023, 2, NULL, 0, 0, 0, 1800, 0, 0),
	(4166, '3578161009930005', '2023-02-22 10:55:49', '2023-02-22', 0, 13000, 5, 1500, 498200, 50000, 0, 0, 0, 0, 450000, 0, 500000, 1800, 4, 0, 604, 0, 1, 0, 0, 0, 0, 0, 0, 0, NULL, 2023, 2, NULL, 0, 0, 0, 1800, 0, 0),
	(4167, '3578045203920004', '2023-02-22 10:55:49', '2023-02-22', 0, 13000, 5, 1500, 533120, 50000, 0, 0, 0, 0, 450000, 24, 536000, 2880, 4, 0, 604, 24, 1, 0, 0, 0, 0, 0, 36000, 0, NULL, 2023, 2, NULL, 0, 360, 720, 1800, 0, 0),
	(4168, '3578282504960001', '2023-02-22 10:55:49', '2023-02-22', 0, 13000, 5, 1500, 538940, 50000, 0, 0, 0, 0, 450000, 28, 542000, 3060, 4, 0, 604, 28, 1, 0, 0, 0, 0, 0, 42000, 0, NULL, 2023, 2, NULL, 0, 420, 840, 1800, 0, 0),
	(4169, '3578271302990004', '2023-02-22 10:55:49', '2023-02-22', 0, 13000, 5, 1500, 538940, 50000, 0, 0, 0, 0, 450000, 28, 542000, 3060, 4, 0, 604, 28, 1, 0, 0, 0, 0, 0, 42000, 0, NULL, 2023, 2, NULL, 0, 420, 840, 1800, 0, 0),
	(4170, '3578102704970005', '2023-02-22 10:55:49', '2023-02-22', 0, 13000, 5, 1500, 538940, 50000, 0, 0, 0, 0, 450000, 28, 542000, 3060, 4, 0, 604, 28, 1, 0, 0, 0, 0, 0, 42000, 0, NULL, 2023, 2, NULL, 0, 420, 840, 1800, 0, 0),
	(4171, '3578062406600003', '2023-02-22 10:55:49', '2023-02-22', 0, 13000, 5, 1500, 498200, 50000, 0, 0, 0, 0, 450000, 0, 500000, 1800, 4, 0, 604, 0, 1, 0, 0, 0, 0, 0, 0, 0, NULL, 2023, 2, NULL, 0, 0, 0, 1800, 0, 0),
	(4172, '3578110303980002', '2023-02-22 10:55:49', '2023-02-22', 0, 13000, 5, 1500, 527300, 50000, 0, 0, 0, 0, 450000, 20, 530000, 2700, 4, 0, 604, 20, 1, 0, 0, 0, 0, 0, 30000, 0, NULL, 2023, 2, NULL, 0, 300, 600, 1800, 0, 0),
	(4173, '3578164305700006', '2023-02-22 10:55:49', '2023-02-22', 0, 13000, 5, 1500, 530210, 50000, 0, 0, 0, 0, 450000, 22, 533000, 2790, 4, 0, 604, 22, 1, 0, 0, 0, 0, 0, 33000, 0, NULL, 2023, 2, NULL, 0, 330, 660, 1800, 0, 0),
	(4174, '3578055111810009', '2023-02-22 10:55:49', '2023-02-22', 0, 13000, 5, 1500, 533120, 50000, 0, 0, 0, 0, 450000, 24, 536000, 2880, 4, 0, 604, 24, 1, 0, 0, 0, 0, 0, 36000, 0, NULL, 2023, 2, NULL, 0, 360, 720, 1800, 0, 0),
	(4175, '3578176910940002', '2023-02-22 10:55:49', '2023-02-22', 0, 13000, 5, 1500, 524390, 50000, 0, 0, 0, 0, 450000, 18, 527000, 2610, 4, 0, 604, 18, 1, 0, 0, 0, 0, 0, 27000, 0, NULL, 2023, 2, NULL, 0, 270, 540, 1800, 0, 0),
	(4176, '3578164112650003', '2023-02-22 10:55:49', '2023-02-22', 0, 13000, 5, 1500, 530210, 50000, 0, 0, 0, 0, 450000, 22, 533000, 2790, 4, 0, 604, 22, 1, 0, 0, 0, 0, 0, 33000, 0, NULL, 2023, 2, NULL, 0, 330, 660, 1800, 0, 0),
	(4177, '3513212603970001', '2023-02-22 10:55:49', '2023-02-22', 0, 13000, 5, 1500, 533120, 50000, 0, 0, 0, 0, 450000, 24, 536000, 2880, 4, 0, 604, 24, 1, 0, 0, 0, 0, 0, 36000, 0, NULL, 2023, 2, NULL, 0, 360, 720, 1800, 0, 0),
	(4178, '3514126808820003', '2023-02-22 10:55:49', '2023-02-22', 0, 13000, 5, 1500, 533120, 50000, 0, 0, 0, 0, 450000, 24, 536000, 2880, 4, 0, 604, 24, 1, 0, 0, 0, 0, 0, 36000, 0, NULL, 2023, 2, NULL, 0, 360, 720, 1800, 0, 0),
	(4179, '3525124312940002', '2023-02-22 10:55:49', '2023-02-22', 0, 13000, 5, 1500, 498200, 50000, 0, 0, 0, 0, 450000, 0, 500000, 1800, 4, 0, 604, 0, 1, 0, 0, 0, 0, 0, 0, 0, NULL, 2023, 2, NULL, 0, 0, 0, 1800, 0, 0);

-- Dumping structure for table sigap2.gaji_smk
CREATE TABLE IF NOT EXISTS `gaji_smk` (
  `id` int NOT NULL AUTO_INCREMENT,
  `pegawai` varchar(50) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci DEFAULT NULL,
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
  PRIMARY KEY (`id`) USING BTREE
) ENGINE=InnoDB AUTO_INCREMENT=364 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci ROW_FORMAT=DYNAMIC;

-- Dumping data for table sigap2.gaji_smk: ~144 rows (approximately)
INSERT INTO `gaji_smk` (`id`, `pegawai`, `datetime`, `month`, `lembur`, `value_lembur`, `jabatan_id`, `gapok`, `total`, `value_reward`, `value_inval`, `piket_count`, `value_piket`, `tugastambahan`, `tj_jabatan`, `kehadiran`, `sub_total`, `potongan`, `jenjang_id`, `penyesuaian`, `pid`, `jp`, `type`, `jenis_guru`, `tambahan`, `value_kehadiran`, `periode`, `tunjangan_periode`, `total_gapok`, `lama_kerja`, `status`, `tahun`, `bulan`, `potongan_bendahara`, `voucher`) VALUES
	(220, '102327', '2023-02-08 07:49:49', '2023-02-08', 0, 13000, 5, 2500, 1175000, 50000, 0, 0, 7000, 100000, 575000, 0, 1175000, 0, 5, 0, 46, 0, 1, 1, 2, 56000, 4, 450000, 0, 2, NULL, 2023, 2, NULL, 0),
	(221, '198304102006070420', '2023-02-08 07:49:49', '2023-02-08', 0, 13000, 60, 1500, 50000, 50000, 0, 0, 0, 0, 0, 0, 50000, 0, 5, 0, 46, 0, 1, 0, 0, 0, 0, 0, 0, 0, NULL, 2023, 2, NULL, 0),
	(222, '196905271996070283', '2023-02-08 07:49:49', '2023-02-08', 0, 13000, 5, 1500, 625000, 50000, 0, 0, 0, 0, 575000, 0, 625000, 0, 5, 0, 46, 0, 1, 0, 0, 0, 0, 0, 0, 0, NULL, 2023, 2, NULL, 0),
	(223, '198811182011070498', '2023-02-08 07:49:49', '2023-02-08', 0, 13000, 62, 1500, 50000, 50000, 0, 0, 0, 0, 0, 0, 50000, 0, 5, 0, 46, 0, 1, 0, 0, 0, 0, 0, 0, 0, NULL, 2023, 2, NULL, 0),
	(224, '198408252010070492', '2023-02-08 07:49:49', '2023-02-08', 0, 13000, 61, 1500, 50000, 50000, 0, 0, 0, 0, 0, 0, 50000, 0, 5, 0, 46, 0, 1, 0, 0, 0, 0, 0, 0, 0, NULL, 2023, 2, NULL, 0),
	(225, '197004061996070319', '2023-02-08 07:49:49', '2023-02-08', 0, 13000, 5, 1500, 625000, 50000, 0, 0, 0, 0, 575000, 0, 625000, 0, 5, 0, 46, 0, 1, 0, 0, 0, 0, 0, 0, 0, NULL, 2023, 2, NULL, 0),
	(226, '196701121998070311', '2023-02-08 07:49:49', '2023-02-08', 0, 13000, 5, 1500, 625000, 50000, 0, 0, 0, 0, 575000, 0, 625000, 0, 5, 0, 46, 0, 1, 0, 0, 0, 0, 0, 0, 0, NULL, 2023, 2, NULL, 0),
	(227, '196512011999070327', '2023-02-08 07:49:49', '2023-02-08', 0, 13000, 5, 1500, 625000, 50000, 0, 0, 0, 0, 575000, 0, 625000, 0, 5, 0, 46, 0, 1, 0, 0, 0, 0, 0, 0, 0, NULL, 2023, 2, NULL, 0),
	(228, '197001282000070310', '2023-02-08 07:49:49', '2023-02-08', 0, 13000, 5, 1500, 625000, 50000, 0, 0, 0, 0, 575000, 0, 625000, 0, 5, 0, 46, 0, 1, 0, 0, 0, 0, 0, 0, 0, NULL, 2023, 2, NULL, 0),
	(229, '197604052003070393', '2023-02-08 07:49:49', '2023-02-08', 0, 13000, 5, 1500, 625000, 50000, 0, 0, 0, 0, 575000, 0, 625000, 0, 5, 0, 46, 0, 1, 0, 0, 0, 0, 0, 0, 0, NULL, 2023, 2, NULL, 0),
	(230, '197606042004070397', '2023-02-08 07:49:49', '2023-02-08', 0, 13000, 5, 1500, 625000, 50000, 0, 0, 0, 0, 575000, 0, 625000, 0, 5, 0, 46, 0, 1, 0, 0, 0, 0, 0, 0, 0, NULL, 2023, 2, NULL, 0),
	(231, '197604012004070401', '2023-02-08 07:49:49', '2023-02-08', 0, 13000, 5, 1500, 625000, 50000, 0, 0, 0, 0, 575000, 0, 625000, 0, 5, 0, 46, 0, 1, 0, 0, 0, 0, 0, 0, 0, NULL, 2023, 2, NULL, 0),
	(232, '197704092004070403', '2023-02-08 07:49:49', '2023-02-08', 0, 13000, 5, 1500, 625000, 50000, 0, 0, 0, 0, 575000, 0, 625000, 0, 5, 0, 46, 0, 1, 0, 0, 0, 0, 0, 0, 0, NULL, 2023, 2, NULL, 0),
	(233, '198110032004070399', '2023-02-08 07:49:49', '2023-02-08', 0, 13000, 64, 1500, 50000, 50000, 0, 0, 0, 0, 0, 0, 50000, 0, 5, 0, 46, 0, 1, 0, 0, 0, 0, 0, 0, 0, NULL, 2023, 2, NULL, 0),
	(234, '198008302008070456', '2023-02-08 07:49:49', '2023-02-08', 0, 13000, 5, 1500, 625000, 50000, 0, 0, 0, 0, 575000, 0, 625000, 0, 5, 0, 46, 0, 1, 0, 0, 0, 0, 0, 0, 0, NULL, 2023, 2, NULL, 0),
	(235, '198012172005070411', '2023-02-08 07:49:49', '2023-02-08', 0, 13000, 5, 1500, 625000, 50000, 0, 0, 0, 0, 575000, 0, 625000, 0, 5, 0, 46, 0, 1, 0, 0, 0, 0, 0, 0, 0, NULL, 2023, 2, NULL, 0),
	(236, '198202072008070458', '2023-02-08 07:49:49', '2023-02-08', 0, 13000, 5, 1500, 625000, 50000, 0, 0, 0, 0, 575000, 0, 625000, 0, 5, 0, 46, 0, 1, 0, 0, 0, 0, 0, 0, 0, NULL, 2023, 2, NULL, 0),
	(237, '197404132008070462', '2023-02-08 07:49:49', '2023-02-08', 0, 13000, 5, 1500, 625000, 50000, 0, 0, 0, 0, 575000, 0, 625000, 0, 5, 0, 46, 0, 1, 0, 0, 0, 0, 0, 0, 0, NULL, 2023, 2, NULL, 0),
	(238, '198411102008070461', '2023-02-08 07:49:49', '2023-02-08', 0, 13000, 5, 1500, 625000, 50000, 0, 0, 0, 0, 575000, 0, 625000, 0, 5, 0, 46, 0, 1, 0, 0, 0, 0, 0, 0, 0, NULL, 2023, 2, NULL, 0),
	(239, '198404222008070464', '2023-02-08 07:49:49', '2023-02-08', 0, 13000, 5, 1500, 625000, 50000, 0, 0, 0, 0, 575000, 0, 625000, 0, 5, 0, 46, 0, 1, 0, 0, 0, 0, 0, 0, 0, NULL, 2023, 2, NULL, 0),
	(240, '197503172009070477', '2023-02-08 07:49:49', '2023-02-08', 0, 13000, 5, 1500, 625000, 50000, 0, 0, 0, 0, 575000, 0, 625000, 0, 5, 0, 46, 0, 1, 0, 0, 0, 0, 0, 0, 0, NULL, 2023, 2, NULL, 0),
	(241, '198109292009070468', '2023-02-08 07:49:49', '2023-02-08', 0, 13000, 5, 1500, 625000, 50000, 0, 0, 0, 0, 575000, 0, 625000, 0, 5, 0, 46, 0, 1, 0, 0, 0, 0, 0, 0, 0, NULL, 2023, 2, NULL, 0),
	(242, '198703102010070491', '2023-02-08 07:49:49', '2023-02-08', 0, 13000, 5, 1500, 625000, 50000, 0, 0, 0, 0, 575000, 0, 625000, 0, 5, 0, 46, 0, 1, 0, 0, 0, 0, 0, 0, 0, NULL, 2023, 2, NULL, 0),
	(243, '198406222010070490', '2023-02-08 07:49:49', '2023-02-08', 0, 13000, 5, 1500, 625000, 50000, 0, 0, 0, 0, 575000, 0, 625000, 0, 5, 0, 46, 0, 1, 0, 0, 0, 0, 0, 0, 0, NULL, 2023, 2, NULL, 0),
	(244, '197203032010070488', '2023-02-08 07:49:49', '2023-02-08', 0, 13000, 5, 1500, 625000, 50000, 0, 0, 0, 0, 575000, 0, 625000, 0, 5, 0, 46, 0, 1, 0, 0, 0, 0, 0, 0, 0, NULL, 2023, 2, NULL, 0),
	(245, '197911042011070504', '2023-02-08 07:49:49', '2023-02-08', 0, 13000, 5, 1500, 625000, 50000, 0, 0, 0, 0, 575000, 0, 625000, 0, 5, 0, 46, 0, 1, 0, 0, 0, 0, 0, 0, 0, NULL, 2023, 2, NULL, 0),
	(246, '197606302011070346', '2023-02-08 07:49:49', '2023-02-08', 0, 13000, 5, 1500, 625000, 50000, 0, 0, 0, 0, 575000, 0, 625000, 0, 5, 0, 46, 0, 1, 0, 0, 0, 0, 0, 0, 0, NULL, 2023, 2, NULL, 0),
	(247, '198712282011070501', '2023-02-08 07:49:49', '2023-02-08', 0, 13000, 5, 1500, 625000, 50000, 0, 0, 0, 0, 575000, 0, 625000, 0, 5, 0, 46, 0, 1, 0, 0, 0, 0, 0, 0, 0, NULL, 2023, 2, NULL, 0),
	(248, '198103082010070489', '2023-02-08 07:49:49', '2023-02-08', 0, 13000, 5, 1500, 625000, 50000, 0, 0, 0, 0, 575000, 0, 625000, 0, 5, 0, 46, 0, 1, 0, 0, 0, 0, 0, 0, 0, NULL, 2023, 2, NULL, 0),
	(249, '198111152012070453', '2023-02-08 07:49:49', '2023-02-08', 0, 13000, 5, 1500, 625000, 50000, 0, 0, 0, 0, 575000, 0, 625000, 0, 5, 0, 46, 0, 1, 0, 0, 0, 0, 0, 0, 0, NULL, 2023, 2, NULL, 0),
	(250, '198505062012070455', '2023-02-08 07:49:49', '2023-02-08', 0, 13000, 5, 1500, 625000, 50000, 0, 0, 0, 0, 575000, 0, 625000, 0, 5, 0, 46, 0, 1, 0, 0, 0, 0, 0, 0, 0, NULL, 2023, 2, NULL, 0),
	(251, '196904192012070514', '2023-02-08 07:49:49', '2023-02-08', 0, 13000, 5, 1500, 625000, 50000, 0, 0, 0, 0, 575000, 0, 625000, 0, 5, 0, 46, 0, 1, 0, 0, 0, 0, 0, 0, 0, NULL, 2023, 2, NULL, 0),
	(252, '199003172012070513', '2023-02-08 07:49:49', '2023-02-08', 0, 13000, 5, 1500, 625000, 50000, 0, 0, 0, 0, 575000, 0, 625000, 0, 5, 0, 46, 0, 1, 0, 0, 0, 0, 0, 0, 0, NULL, 2023, 2, NULL, 0),
	(253, '198306252013070516', '2023-02-08 07:49:49', '2023-02-08', 0, 13000, 5, 1500, 625000, 50000, 0, 0, 0, 0, 575000, 0, 625000, 0, 5, 0, 46, 0, 1, 0, 0, 0, 0, 0, 0, 0, NULL, 2023, 2, NULL, 0),
	(254, '198111112014070429', '2023-02-08 07:49:49', '2023-02-08', 0, 13000, 5, 1500, 625000, 50000, 0, 0, 0, 0, 575000, 0, 625000, 0, 5, 0, 46, 0, 1, 0, 0, 0, 0, 0, 0, 0, NULL, 2023, 2, NULL, 0),
	(255, '198511142014070522', '2023-02-08 07:49:49', '2023-02-08', 0, 13000, 101, 1500, 50000, 50000, 0, 0, 0, 0, 0, 0, 50000, 0, 5, 0, 46, 0, 1, 0, 0, 0, 0, 0, 0, 0, NULL, 2023, 2, NULL, 0),
	(256, '198709192014070523', '2023-02-08 07:49:49', '2023-02-08', 0, 13000, 5, 1500, 625000, 50000, 0, 0, 0, 0, 575000, 0, 625000, 0, 5, 0, 46, 0, 1, 0, 0, 0, 0, 0, 0, 0, NULL, 2023, 2, NULL, 0),
	(257, '198801022016070560', '2023-02-08 07:49:49', '2023-02-08', 0, 13000, 5, 1500, 625000, 50000, 0, 0, 0, 0, 575000, 0, 625000, 0, 5, 0, 46, 0, 1, 0, 0, 0, 0, 0, 0, 0, NULL, 2023, 2, NULL, 0),
	(258, '199310102016070563', '2023-02-08 07:49:49', '2023-02-08', 0, 13000, 5, 1500, 625000, 50000, 0, 0, 0, 0, 575000, 0, 625000, 0, 5, 0, 46, 0, 1, 0, 0, 0, 0, 0, 0, 0, NULL, 2023, 2, NULL, 0),
	(259, '199503172017070570', '2023-02-08 07:49:49', '2023-02-08', 0, 13000, 5, 1500, 625000, 50000, 0, 0, 0, 0, 575000, 0, 625000, 0, 5, 0, 46, 0, 1, 0, 0, 0, 0, 0, 0, 0, NULL, 2023, 2, NULL, 0),
	(260, '197910192017070569', '2023-02-08 07:49:49', '2023-02-08', 0, 13000, 5, 1500, 625000, 50000, 0, 0, 0, 0, 575000, 0, 625000, 0, 5, 0, 46, 0, 1, 0, 0, 0, 0, 0, 0, 0, NULL, 2023, 2, NULL, 0),
	(261, '197701042017070571', '2023-02-08 07:49:49', '2023-02-08', 0, 13000, 5, 1500, 625000, 50000, 0, 0, 0, 0, 575000, 0, 625000, 0, 5, 0, 46, 0, 1, 0, 0, 0, 0, 0, 0, 0, NULL, 2023, 2, NULL, 0),
	(262, '198504282017070572', '2023-02-08 07:49:49', '2023-02-08', 0, 13000, 5, 1500, 625000, 50000, 0, 0, 0, 0, 575000, 0, 625000, 0, 5, 0, 46, 0, 1, 0, 0, 0, 0, 0, 0, 0, NULL, 2023, 2, NULL, 0),
	(263, '199208202017070573', '2023-02-08 07:49:49', '2023-02-08', 0, 13000, 5, 1500, 625000, 50000, 0, 0, 0, 0, 575000, 0, 625000, 0, 5, 0, 46, 0, 1, 0, 0, 0, 0, 0, 0, 0, NULL, 2023, 2, NULL, 0),
	(264, '199304222018070608', '2023-02-08 07:49:49', '2023-02-08', 0, 13000, 5, 1500, 625000, 50000, 0, 0, 0, 0, 575000, 0, 625000, 0, 5, 0, 46, 0, 1, 0, 0, 0, 0, 0, 0, 0, NULL, 2023, 2, NULL, 0),
	(265, '197810062018070606', '2023-02-08 07:49:49', '2023-02-08', 0, 13000, 5, 1500, 625000, 50000, 0, 0, 0, 0, 575000, 0, 625000, 0, 5, 0, 46, 0, 1, 0, 0, 0, 0, 0, 0, 0, NULL, 2023, 2, NULL, 0),
	(266, '199701082019070582', '2023-02-08 07:49:49', '2023-02-08', 0, 13000, 40, 1500, 50000, 50000, 0, 0, 0, 0, 0, 0, 50000, 0, 5, 0, 46, 0, 1, 0, 0, 0, 0, 0, 0, 0, NULL, 2023, 2, NULL, 0),
	(267, '196312141989032006', '2023-02-08 07:49:49', '2023-02-08', 0, 13000, 5, 1500, 625000, 50000, 0, 0, 0, 0, 575000, 0, 625000, 0, 5, 0, 46, 0, 1, 0, 0, 0, 0, 0, 0, 0, NULL, 2023, 2, NULL, 0),
	(268, '102327', '2023-02-08 08:55:51', '2023-02-08', 0, 13000, 5, 2500, 1175000, 50000, 0, 0, 7000, 100000, 575000, 0, 1175000, 0, 5, 0, 47, 0, 1, 1, 2, 56000, 4, 450000, 0, 2, NULL, 2023, 1, NULL, 0),
	(269, '198304102006070420', '2023-02-08 08:55:51', '2023-02-08', 0, 13000, 60, 1500, 50000, 50000, 0, 0, 0, 0, 0, 0, 50000, 0, 5, 0, 47, 0, 1, 0, 0, 0, 0, 0, 0, 0, NULL, 2023, 1, NULL, 0),
	(270, '196905271996070283', '2023-02-08 08:55:51', '2023-02-08', 0, 13000, 5, 1500, 625000, 50000, 0, 0, 0, 0, 575000, 0, 625000, 0, 5, 0, 47, 0, 1, 0, 0, 0, 0, 0, 0, 0, NULL, 2023, 1, NULL, 0),
	(271, '198811182011070498', '2023-02-08 08:55:51', '2023-02-08', 0, 13000, 62, 1500, 50000, 50000, 0, 0, 0, 0, 0, 0, 50000, 0, 5, 0, 47, 0, 1, 0, 0, 0, 0, 0, 0, 0, NULL, 2023, 1, NULL, 0),
	(272, '198408252010070492', '2023-02-08 08:55:51', '2023-02-08', 0, 13000, 61, 1500, 50000, 50000, 0, 0, 0, 0, 0, 0, 50000, 0, 5, 0, 47, 0, 1, 0, 0, 0, 0, 0, 0, 0, NULL, 2023, 1, NULL, 0),
	(273, '197004061996070319', '2023-02-08 08:55:51', '2023-02-08', 0, 13000, 5, 1500, 625000, 50000, 0, 0, 0, 0, 575000, 0, 625000, 0, 5, 0, 47, 0, 1, 0, 0, 0, 0, 0, 0, 0, NULL, 2023, 1, NULL, 0),
	(274, '196701121998070311', '2023-02-08 08:55:51', '2023-02-08', 0, 13000, 5, 1500, 625000, 50000, 0, 0, 0, 0, 575000, 0, 625000, 0, 5, 0, 47, 0, 1, 0, 0, 0, 0, 0, 0, 0, NULL, 2023, 1, NULL, 0),
	(275, '196512011999070327', '2023-02-08 08:55:51', '2023-02-08', 0, 13000, 5, 1500, 625000, 50000, 0, 0, 0, 0, 575000, 0, 625000, 0, 5, 0, 47, 0, 1, 0, 0, 0, 0, 0, 0, 0, NULL, 2023, 1, NULL, 0),
	(276, '197001282000070310', '2023-02-08 08:55:51', '2023-02-08', 0, 13000, 5, 1500, 625000, 50000, 0, 0, 0, 0, 575000, 0, 625000, 0, 5, 0, 47, 0, 1, 0, 0, 0, 0, 0, 0, 0, NULL, 2023, 1, NULL, 0),
	(277, '197604052003070393', '2023-02-08 08:55:51', '2023-02-08', 0, 13000, 5, 1500, 625000, 50000, 0, 0, 0, 0, 575000, 0, 625000, 0, 5, 0, 47, 0, 1, 0, 0, 0, 0, 0, 0, 0, NULL, 2023, 1, NULL, 0),
	(278, '197606042004070397', '2023-02-08 08:55:51', '2023-02-08', 0, 13000, 5, 1500, 625000, 50000, 0, 0, 0, 0, 575000, 0, 625000, 0, 5, 0, 47, 0, 1, 0, 0, 0, 0, 0, 0, 0, NULL, 2023, 1, NULL, 0),
	(279, '197604012004070401', '2023-02-08 08:55:51', '2023-02-08', 0, 13000, 5, 1500, 625000, 50000, 0, 0, 0, 0, 575000, 0, 625000, 0, 5, 0, 47, 0, 1, 0, 0, 0, 0, 0, 0, 0, NULL, 2023, 1, NULL, 0),
	(280, '197704092004070403', '2023-02-08 08:55:51', '2023-02-08', 0, 13000, 5, 1500, 625000, 50000, 0, 0, 0, 0, 575000, 0, 625000, 0, 5, 0, 47, 0, 1, 0, 0, 0, 0, 0, 0, 0, NULL, 2023, 1, NULL, 0),
	(281, '198110032004070399', '2023-02-08 08:55:51', '2023-02-08', 0, 13000, 64, 1500, 50000, 50000, 0, 0, 0, 0, 0, 0, 50000, 0, 5, 0, 47, 0, 1, 0, 0, 0, 0, 0, 0, 0, NULL, 2023, 1, NULL, 0),
	(282, '198008302008070456', '2023-02-08 08:55:51', '2023-02-08', 0, 13000, 5, 1500, 625000, 50000, 0, 0, 0, 0, 575000, 0, 625000, 0, 5, 0, 47, 0, 1, 0, 0, 0, 0, 0, 0, 0, NULL, 2023, 1, NULL, 0),
	(283, '198012172005070411', '2023-02-08 08:55:51', '2023-02-08', 0, 13000, 5, 1500, 625000, 50000, 0, 0, 0, 0, 575000, 0, 625000, 0, 5, 0, 47, 0, 1, 0, 0, 0, 0, 0, 0, 0, NULL, 2023, 1, NULL, 0),
	(284, '198202072008070458', '2023-02-08 08:55:51', '2023-02-08', 0, 13000, 5, 1500, 625000, 50000, 0, 0, 0, 0, 575000, 0, 625000, 0, 5, 0, 47, 0, 1, 0, 0, 0, 0, 0, 0, 0, NULL, 2023, 1, NULL, 0),
	(285, '197404132008070462', '2023-02-08 08:55:51', '2023-02-08', 0, 13000, 5, 1500, 625000, 50000, 0, 0, 0, 0, 575000, 0, 625000, 0, 5, 0, 47, 0, 1, 0, 0, 0, 0, 0, 0, 0, NULL, 2023, 1, NULL, 0),
	(286, '198411102008070461', '2023-02-08 08:55:51', '2023-02-08', 0, 13000, 5, 1500, 625000, 50000, 0, 0, 0, 0, 575000, 0, 625000, 0, 5, 0, 47, 0, 1, 0, 0, 0, 0, 0, 0, 0, NULL, 2023, 1, NULL, 0),
	(287, '198404222008070464', '2023-02-08 08:55:51', '2023-02-08', 0, 13000, 5, 1500, 625000, 50000, 0, 0, 0, 0, 575000, 0, 625000, 0, 5, 0, 47, 0, 1, 0, 0, 0, 0, 0, 0, 0, NULL, 2023, 1, NULL, 0),
	(288, '197503172009070477', '2023-02-08 08:55:51', '2023-02-08', 0, 13000, 5, 1500, 625000, 50000, 0, 0, 0, 0, 575000, 0, 625000, 0, 5, 0, 47, 0, 1, 0, 0, 0, 0, 0, 0, 0, NULL, 2023, 1, NULL, 0),
	(289, '198109292009070468', '2023-02-08 08:55:51', '2023-02-08', 0, 13000, 5, 1500, 625000, 50000, 0, 0, 0, 0, 575000, 0, 625000, 0, 5, 0, 47, 0, 1, 0, 0, 0, 0, 0, 0, 0, NULL, 2023, 1, NULL, 0),
	(290, '198703102010070491', '2023-02-08 08:55:51', '2023-02-08', 0, 13000, 5, 1500, 625000, 50000, 0, 0, 0, 0, 575000, 0, 625000, 0, 5, 0, 47, 0, 1, 0, 0, 0, 0, 0, 0, 0, NULL, 2023, 1, NULL, 0),
	(291, '198406222010070490', '2023-02-08 08:55:51', '2023-02-08', 0, 13000, 5, 1500, 625000, 50000, 0, 0, 0, 0, 575000, 0, 625000, 0, 5, 0, 47, 0, 1, 0, 0, 0, 0, 0, 0, 0, NULL, 2023, 1, NULL, 0),
	(292, '197203032010070488', '2023-02-08 08:55:51', '2023-02-08', 0, 13000, 5, 1500, 625000, 50000, 0, 0, 0, 0, 575000, 0, 625000, 0, 5, 0, 47, 0, 1, 0, 0, 0, 0, 0, 0, 0, NULL, 2023, 1, NULL, 0),
	(293, '197911042011070504', '2023-02-08 08:55:51', '2023-02-08', 0, 13000, 5, 1500, 625000, 50000, 0, 0, 0, 0, 575000, 0, 625000, 0, 5, 0, 47, 0, 1, 0, 0, 0, 0, 0, 0, 0, NULL, 2023, 1, NULL, 0),
	(294, '197606302011070346', '2023-02-08 08:55:51', '2023-02-08', 0, 13000, 5, 1500, 625000, 50000, 0, 0, 0, 0, 575000, 0, 625000, 0, 5, 0, 47, 0, 1, 0, 0, 0, 0, 0, 0, 0, NULL, 2023, 1, NULL, 0),
	(295, '198712282011070501', '2023-02-08 08:55:51', '2023-02-08', 0, 13000, 5, 1500, 625000, 50000, 0, 0, 0, 0, 575000, 0, 625000, 0, 5, 0, 47, 0, 1, 0, 0, 0, 0, 0, 0, 0, NULL, 2023, 1, NULL, 0),
	(296, '198103082010070489', '2023-02-08 08:55:51', '2023-02-08', 0, 13000, 5, 1500, 625000, 50000, 0, 0, 0, 0, 575000, 0, 625000, 0, 5, 0, 47, 0, 1, 0, 0, 0, 0, 0, 0, 0, NULL, 2023, 1, NULL, 0),
	(297, '198111152012070453', '2023-02-08 08:55:51', '2023-02-08', 0, 13000, 5, 1500, 625000, 50000, 0, 0, 0, 0, 575000, 0, 625000, 0, 5, 0, 47, 0, 1, 0, 0, 0, 0, 0, 0, 0, NULL, 2023, 1, NULL, 0),
	(298, '198505062012070455', '2023-02-08 08:55:51', '2023-02-08', 0, 13000, 5, 1500, 625000, 50000, 0, 0, 0, 0, 575000, 0, 625000, 0, 5, 0, 47, 0, 1, 0, 0, 0, 0, 0, 0, 0, NULL, 2023, 1, NULL, 0),
	(299, '196904192012070514', '2023-02-08 08:55:51', '2023-02-08', 0, 13000, 5, 1500, 625000, 50000, 0, 0, 0, 0, 575000, 0, 625000, 0, 5, 0, 47, 0, 1, 0, 0, 0, 0, 0, 0, 0, NULL, 2023, 1, NULL, 0),
	(300, '199003172012070513', '2023-02-08 08:55:51', '2023-02-08', 0, 13000, 5, 1500, 625000, 50000, 0, 0, 0, 0, 575000, 0, 625000, 0, 5, 0, 47, 0, 1, 0, 0, 0, 0, 0, 0, 0, NULL, 2023, 1, NULL, 0),
	(301, '198306252013070516', '2023-02-08 08:55:51', '2023-02-08', 0, 13000, 5, 1500, 625000, 50000, 0, 0, 0, 0, 575000, 0, 625000, 0, 5, 0, 47, 0, 1, 0, 0, 0, 0, 0, 0, 0, NULL, 2023, 1, NULL, 0),
	(302, '198111112014070429', '2023-02-08 08:55:51', '2023-02-08', 0, 13000, 5, 1500, 625000, 50000, 0, 0, 0, 0, 575000, 0, 625000, 0, 5, 0, 47, 0, 1, 0, 0, 0, 0, 0, 0, 0, NULL, 2023, 1, NULL, 0),
	(303, '198511142014070522', '2023-02-08 08:55:51', '2023-02-08', 0, 13000, 101, 1500, 50000, 50000, 0, 0, 0, 0, 0, 0, 50000, 0, 5, 0, 47, 0, 1, 0, 0, 0, 0, 0, 0, 0, NULL, 2023, 1, NULL, 0),
	(304, '198709192014070523', '2023-02-08 08:55:51', '2023-02-08', 0, 13000, 5, 1500, 625000, 50000, 0, 0, 0, 0, 575000, 0, 625000, 0, 5, 0, 47, 0, 1, 0, 0, 0, 0, 0, 0, 0, NULL, 2023, 1, NULL, 0),
	(305, '198801022016070560', '2023-02-08 08:55:51', '2023-02-08', 0, 13000, 5, 1500, 625000, 50000, 0, 0, 0, 0, 575000, 0, 625000, 0, 5, 0, 47, 0, 1, 0, 0, 0, 0, 0, 0, 0, NULL, 2023, 1, NULL, 0),
	(306, '199310102016070563', '2023-02-08 08:55:51', '2023-02-08', 0, 13000, 5, 1500, 625000, 50000, 0, 0, 0, 0, 575000, 0, 625000, 0, 5, 0, 47, 0, 1, 0, 0, 0, 0, 0, 0, 0, NULL, 2023, 1, NULL, 0),
	(307, '199503172017070570', '2023-02-08 08:55:51', '2023-02-08', 0, 13000, 5, 1500, 625000, 50000, 0, 0, 0, 0, 575000, 0, 625000, 0, 5, 0, 47, 0, 1, 0, 0, 0, 0, 0, 0, 0, NULL, 2023, 1, NULL, 0),
	(308, '197910192017070569', '2023-02-08 08:55:51', '2023-02-08', 0, 13000, 5, 1500, 625000, 50000, 0, 0, 0, 0, 575000, 0, 625000, 0, 5, 0, 47, 0, 1, 0, 0, 0, 0, 0, 0, 0, NULL, 2023, 1, NULL, 0),
	(309, '197701042017070571', '2023-02-08 08:55:51', '2023-02-08', 0, 13000, 5, 1500, 625000, 50000, 0, 0, 0, 0, 575000, 0, 625000, 0, 5, 0, 47, 0, 1, 0, 0, 0, 0, 0, 0, 0, NULL, 2023, 1, NULL, 0),
	(310, '198504282017070572', '2023-02-08 08:55:51', '2023-02-08', 0, 13000, 5, 1500, 625000, 50000, 0, 0, 0, 0, 575000, 0, 625000, 0, 5, 0, 47, 0, 1, 0, 0, 0, 0, 0, 0, 0, NULL, 2023, 1, NULL, 0),
	(311, '199208202017070573', '2023-02-08 08:55:51', '2023-02-08', 0, 13000, 5, 1500, 625000, 50000, 0, 0, 0, 0, 575000, 0, 625000, 0, 5, 0, 47, 0, 1, 0, 0, 0, 0, 0, 0, 0, NULL, 2023, 1, NULL, 0),
	(312, '199304222018070608', '2023-02-08 08:55:51', '2023-02-08', 0, 13000, 5, 1500, 625000, 50000, 0, 0, 0, 0, 575000, 0, 625000, 0, 5, 0, 47, 0, 1, 0, 0, 0, 0, 0, 0, 0, NULL, 2023, 1, NULL, 0),
	(313, '197810062018070606', '2023-02-08 08:55:51', '2023-02-08', 0, 13000, 5, 1500, 625000, 50000, 0, 0, 0, 0, 575000, 0, 625000, 0, 5, 0, 47, 0, 1, 0, 0, 0, 0, 0, 0, 0, NULL, 2023, 1, NULL, 0),
	(314, '199701082019070582', '2023-02-08 08:55:51', '2023-02-08', 0, 13000, 40, 1500, 50000, 50000, 0, 0, 0, 0, 0, 0, 50000, 0, 5, 0, 47, 0, 1, 0, 0, 0, 0, 0, 0, 0, NULL, 2023, 1, NULL, 0),
	(315, '196312141989032006', '2023-02-08 08:55:51', '2023-02-08', 0, 13000, 5, 1500, 625000, 50000, 0, 0, 0, 0, 575000, 0, 625000, 0, 5, 0, 47, 0, 1, 0, 0, 0, 0, 0, 0, 0, NULL, 2023, 1, NULL, 0),
	(316, '102327', '2023-02-13 04:04:12', '2023-02-13', 0, 13000, 5, 2500, 1175000, 50000, 0, 0, 7000, 100000, 575000, 0, 1175000, 0, 5, 0, 48, 0, 1, 1, 2, 56000, 4, 450000, 0, 2, NULL, 2023, 11, NULL, 0),
	(317, '198304102006070420', '2023-02-13 04:04:12', '2023-02-13', 0, 13000, 60, 1500, 50000, 50000, 0, 0, 0, 0, 0, 0, 50000, 0, 5, 0, 48, 0, 1, 0, 0, 0, 0, 0, 0, 0, NULL, 2023, 11, NULL, 0),
	(318, '196905271996070283', '2023-02-13 04:04:12', '2023-02-13', 0, 13000, 5, 1500, 625000, 50000, 0, 0, 0, 0, 575000, 0, 625000, 0, 5, 0, 48, 0, 1, 0, 0, 0, 0, 0, 0, 0, NULL, 2023, 11, NULL, 0),
	(319, '198811182011070498', '2023-02-13 04:04:12', '2023-02-13', 0, 13000, 62, 1500, 50000, 50000, 0, 0, 0, 0, 0, 0, 50000, 0, 5, 0, 48, 0, 1, 0, 0, 0, 0, 0, 0, 0, NULL, 2023, 11, NULL, 0),
	(320, '198408252010070492', '2023-02-13 04:04:12', '2023-02-13', 0, 13000, 61, 1500, 50000, 50000, 0, 0, 0, 0, 0, 0, 50000, 0, 5, 0, 48, 0, 1, 0, 0, 0, 0, 0, 0, 0, NULL, 2023, 11, NULL, 0),
	(321, '197004061996070319', '2023-02-13 04:04:12', '2023-02-13', 0, 13000, 5, 1500, 625000, 50000, 0, 0, 0, 0, 575000, 0, 625000, 0, 5, 0, 48, 0, 1, 0, 0, 0, 0, 0, 0, 0, NULL, 2023, 11, NULL, 0),
	(322, '196701121998070311', '2023-02-13 04:04:12', '2023-02-13', 0, 13000, 5, 1500, 625000, 50000, 0, 0, 0, 0, 575000, 0, 625000, 0, 5, 0, 48, 0, 1, 0, 0, 0, 0, 0, 0, 0, NULL, 2023, 11, NULL, 0),
	(323, '196512011999070327', '2023-02-13 04:04:12', '2023-02-13', 0, 13000, 5, 1500, 625000, 50000, 0, 0, 0, 0, 575000, 0, 625000, 0, 5, 0, 48, 0, 1, 0, 0, 0, 0, 0, 0, 0, NULL, 2023, 11, NULL, 0),
	(324, '197001282000070310', '2023-02-13 04:04:12', '2023-02-13', 0, 13000, 5, 1500, 625000, 50000, 0, 0, 0, 0, 575000, 0, 625000, 0, 5, 0, 48, 0, 1, 0, 0, 0, 0, 0, 0, 0, NULL, 2023, 11, NULL, 0),
	(325, '197604052003070393', '2023-02-13 04:04:12', '2023-02-13', 0, 13000, 5, 1500, 625000, 50000, 0, 0, 0, 0, 575000, 0, 625000, 0, 5, 0, 48, 0, 1, 0, 0, 0, 0, 0, 0, 0, NULL, 2023, 11, NULL, 0),
	(326, '197606042004070397', '2023-02-13 04:04:12', '2023-02-13', 0, 13000, 5, 1500, 625000, 50000, 0, 0, 0, 0, 575000, 0, 625000, 0, 5, 0, 48, 0, 1, 0, 0, 0, 0, 0, 0, 0, NULL, 2023, 11, NULL, 0),
	(327, '197604012004070401', '2023-02-13 04:04:12', '2023-02-13', 0, 13000, 5, 1500, 625000, 50000, 0, 0, 0, 0, 575000, 0, 625000, 0, 5, 0, 48, 0, 1, 0, 0, 0, 0, 0, 0, 0, NULL, 2023, 11, NULL, 0),
	(328, '197704092004070403', '2023-02-13 04:04:12', '2023-02-13', 0, 13000, 5, 1500, 625000, 50000, 0, 0, 0, 0, 575000, 0, 625000, 0, 5, 0, 48, 0, 1, 0, 0, 0, 0, 0, 0, 0, NULL, 2023, 11, NULL, 0),
	(329, '198110032004070399', '2023-02-13 04:04:12', '2023-02-13', 0, 13000, 64, 1500, 50000, 50000, 0, 0, 0, 0, 0, 0, 50000, 0, 5, 0, 48, 0, 1, 0, 0, 0, 0, 0, 0, 0, NULL, 2023, 11, NULL, 0),
	(330, '198008302008070456', '2023-02-13 04:04:12', '2023-02-13', 0, 13000, 5, 1500, 625000, 50000, 0, 0, 0, 0, 575000, 0, 625000, 0, 5, 0, 48, 0, 1, 0, 0, 0, 0, 0, 0, 0, NULL, 2023, 11, NULL, 0),
	(331, '198012172005070411', '2023-02-13 04:04:12', '2023-02-13', 0, 13000, 5, 1500, 625000, 50000, 0, 0, 0, 0, 575000, 0, 625000, 0, 5, 0, 48, 0, 1, 0, 0, 0, 0, 0, 0, 0, NULL, 2023, 11, NULL, 0),
	(332, '198202072008070458', '2023-02-13 04:04:12', '2023-02-13', 0, 13000, 5, 1500, 625000, 50000, 0, 0, 0, 0, 575000, 0, 625000, 0, 5, 0, 48, 0, 1, 0, 0, 0, 0, 0, 0, 0, NULL, 2023, 11, NULL, 0),
	(333, '197404132008070462', '2023-02-13 04:04:12', '2023-02-13', 0, 13000, 5, 1500, 625000, 50000, 0, 0, 0, 0, 575000, 0, 625000, 0, 5, 0, 48, 0, 1, 0, 0, 0, 0, 0, 0, 0, NULL, 2023, 11, NULL, 0),
	(334, '198411102008070461', '2023-02-13 04:04:12', '2023-02-13', 0, 13000, 5, 1500, 625000, 50000, 0, 0, 0, 0, 575000, 0, 625000, 0, 5, 0, 48, 0, 1, 0, 0, 0, 0, 0, 0, 0, NULL, 2023, 11, NULL, 0),
	(335, '198404222008070464', '2023-02-13 04:04:12', '2023-02-13', 0, 13000, 5, 1500, 625000, 50000, 0, 0, 0, 0, 575000, 0, 625000, 0, 5, 0, 48, 0, 1, 0, 0, 0, 0, 0, 0, 0, NULL, 2023, 11, NULL, 0),
	(336, '197503172009070477', '2023-02-13 04:04:12', '2023-02-13', 0, 13000, 5, 1500, 625000, 50000, 0, 0, 0, 0, 575000, 0, 625000, 0, 5, 0, 48, 0, 1, 0, 0, 0, 0, 0, 0, 0, NULL, 2023, 11, NULL, 0),
	(337, '198109292009070468', '2023-02-13 04:04:12', '2023-02-13', 0, 13000, 5, 1500, 625000, 50000, 0, 0, 0, 0, 575000, 0, 625000, 0, 5, 0, 48, 0, 1, 0, 0, 0, 0, 0, 0, 0, NULL, 2023, 11, NULL, 0),
	(338, '198703102010070491', '2023-02-13 04:04:12', '2023-02-13', 0, 13000, 5, 1500, 625000, 50000, 0, 0, 0, 0, 575000, 0, 625000, 0, 5, 0, 48, 0, 1, 0, 0, 0, 0, 0, 0, 0, NULL, 2023, 11, NULL, 0),
	(339, '198406222010070490', '2023-02-13 04:04:12', '2023-02-13', 0, 13000, 5, 1500, 625000, 50000, 0, 0, 0, 0, 575000, 0, 625000, 0, 5, 0, 48, 0, 1, 0, 0, 0, 0, 0, 0, 0, NULL, 2023, 11, NULL, 0),
	(340, '197203032010070488', '2023-02-13 04:04:12', '2023-02-13', 0, 13000, 5, 1500, 625000, 50000, 0, 0, 0, 0, 575000, 0, 625000, 0, 5, 0, 48, 0, 1, 0, 0, 0, 0, 0, 0, 0, NULL, 2023, 11, NULL, 0),
	(341, '197911042011070504', '2023-02-13 04:04:12', '2023-02-13', 0, 13000, 5, 1500, 625000, 50000, 0, 0, 0, 0, 575000, 0, 625000, 0, 5, 0, 48, 0, 1, 0, 0, 0, 0, 0, 0, 0, NULL, 2023, 11, NULL, 0),
	(342, '197606302011070346', '2023-02-13 04:04:12', '2023-02-13', 0, 13000, 5, 1500, 625000, 50000, 0, 0, 0, 0, 575000, 0, 625000, 0, 5, 0, 48, 0, 1, 0, 0, 0, 0, 0, 0, 0, NULL, 2023, 11, NULL, 0),
	(343, '198712282011070501', '2023-02-13 04:04:12', '2023-02-13', 0, 13000, 5, 1500, 625000, 50000, 0, 0, 0, 0, 575000, 0, 625000, 0, 5, 0, 48, 0, 1, 0, 0, 0, 0, 0, 0, 0, NULL, 2023, 11, NULL, 0),
	(344, '198103082010070489', '2023-02-13 04:04:12', '2023-02-13', 0, 13000, 5, 1500, 625000, 50000, 0, 0, 0, 0, 575000, 0, 625000, 0, 5, 0, 48, 0, 1, 0, 0, 0, 0, 0, 0, 0, NULL, 2023, 11, NULL, 0),
	(345, '198111152012070453', '2023-02-13 04:04:12', '2023-02-13', 0, 13000, 5, 1500, 625000, 50000, 0, 0, 0, 0, 575000, 0, 625000, 0, 5, 0, 48, 0, 1, 0, 0, 0, 0, 0, 0, 0, NULL, 2023, 11, NULL, 0),
	(346, '198505062012070455', '2023-02-13 04:04:12', '2023-02-13', 0, 13000, 5, 1500, 625000, 50000, 0, 0, 0, 0, 575000, 0, 625000, 0, 5, 0, 48, 0, 1, 0, 0, 0, 0, 0, 0, 0, NULL, 2023, 11, NULL, 0),
	(347, '196904192012070514', '2023-02-13 04:04:12', '2023-02-13', 0, 13000, 5, 1500, 625000, 50000, 0, 0, 0, 0, 575000, 0, 625000, 0, 5, 0, 48, 0, 1, 0, 0, 0, 0, 0, 0, 0, NULL, 2023, 11, NULL, 0),
	(348, '199003172012070513', '2023-02-13 04:04:12', '2023-02-13', 0, 13000, 5, 1500, 625000, 50000, 0, 0, 0, 0, 575000, 0, 625000, 0, 5, 0, 48, 0, 1, 0, 0, 0, 0, 0, 0, 0, NULL, 2023, 11, NULL, 0),
	(349, '198306252013070516', '2023-02-13 04:04:12', '2023-02-13', 0, 13000, 5, 1500, 625000, 50000, 0, 0, 0, 0, 575000, 0, 625000, 0, 5, 0, 48, 0, 1, 0, 0, 0, 0, 0, 0, 0, NULL, 2023, 11, NULL, 0),
	(350, '198111112014070429', '2023-02-13 04:04:12', '2023-02-13', 0, 13000, 5, 1500, 625000, 50000, 0, 0, 0, 0, 575000, 0, 625000, 0, 5, 0, 48, 0, 1, 0, 0, 0, 0, 0, 0, 0, NULL, 2023, 11, NULL, 0),
	(351, '198511142014070522', '2023-02-13 04:04:12', '2023-02-13', 0, 13000, 101, 1500, 50000, 50000, 0, 0, 0, 0, 0, 0, 50000, 0, 5, 0, 48, 0, 1, 0, 0, 0, 0, 0, 0, 0, NULL, 2023, 11, NULL, 0),
	(352, '198709192014070523', '2023-02-13 04:04:12', '2023-02-13', 0, 13000, 5, 1500, 625000, 50000, 0, 0, 0, 0, 575000, 0, 625000, 0, 5, 0, 48, 0, 1, 0, 0, 0, 0, 0, 0, 0, NULL, 2023, 11, NULL, 0),
	(353, '198801022016070560', '2023-02-13 04:04:12', '2023-02-13', 0, 13000, 5, 1500, 625000, 50000, 0, 0, 0, 0, 575000, 0, 625000, 0, 5, 0, 48, 0, 1, 0, 0, 0, 0, 0, 0, 0, NULL, 2023, 11, NULL, 0),
	(354, '199310102016070563', '2023-02-13 04:04:12', '2023-02-13', 0, 13000, 5, 1500, 625000, 50000, 0, 0, 0, 0, 575000, 0, 625000, 0, 5, 0, 48, 0, 1, 0, 0, 0, 0, 0, 0, 0, NULL, 2023, 11, NULL, 0),
	(355, '199503172017070570', '2023-02-13 04:04:12', '2023-02-13', 0, 13000, 5, 1500, 625000, 50000, 0, 0, 0, 0, 575000, 0, 625000, 0, 5, 0, 48, 0, 1, 0, 0, 0, 0, 0, 0, 0, NULL, 2023, 11, NULL, 0),
	(356, '197910192017070569', '2023-02-13 04:04:12', '2023-02-13', 0, 13000, 5, 1500, 625000, 50000, 0, 0, 0, 0, 575000, 0, 625000, 0, 5, 0, 48, 0, 1, 0, 0, 0, 0, 0, 0, 0, NULL, 2023, 11, NULL, 0),
	(357, '197701042017070571', '2023-02-13 04:04:12', '2023-02-13', 0, 13000, 5, 1500, 625000, 50000, 0, 0, 0, 0, 575000, 0, 625000, 0, 5, 0, 48, 0, 1, 0, 0, 0, 0, 0, 0, 0, NULL, 2023, 11, NULL, 0),
	(358, '198504282017070572', '2023-02-13 04:04:12', '2023-02-13', 0, 13000, 5, 1500, 625000, 50000, 0, 0, 0, 0, 575000, 0, 625000, 0, 5, 0, 48, 0, 1, 0, 0, 0, 0, 0, 0, 0, NULL, 2023, 11, NULL, 0),
	(359, '199208202017070573', '2023-02-13 04:04:12', '2023-02-13', 0, 13000, 5, 1500, 625000, 50000, 0, 0, 0, 0, 575000, 0, 625000, 0, 5, 0, 48, 0, 1, 0, 0, 0, 0, 0, 0, 0, NULL, 2023, 11, NULL, 0),
	(360, '199304222018070608', '2023-02-13 04:04:12', '2023-02-13', 0, 13000, 5, 1500, 625000, 50000, 0, 0, 0, 0, 575000, 0, 625000, 0, 5, 0, 48, 0, 1, 0, 0, 0, 0, 0, 0, 0, NULL, 2023, 11, NULL, 0),
	(361, '197810062018070606', '2023-02-13 04:04:12', '2023-02-13', 0, 13000, 5, 1500, 625000, 50000, 0, 0, 0, 0, 575000, 0, 625000, 0, 5, 0, 48, 0, 1, 0, 0, 0, 0, 0, 0, 0, NULL, 2023, 11, NULL, 0),
	(362, '199701082019070582', '2023-02-13 04:04:12', '2023-02-13', 0, 13000, 40, 1500, 50000, 50000, 0, 0, 0, 0, 0, 0, 50000, 0, 5, 0, 48, 0, 1, 0, 0, 0, 0, 0, 0, 0, NULL, 2023, 11, NULL, 0),
	(363, '196312141989032006', '2023-02-13 04:04:12', '2023-02-13', 0, 13000, 5, 1500, 625000, 50000, 0, 0, 0, 0, 575000, 0, 625000, 0, 5, 0, 48, 0, 1, 0, 0, 0, 0, 0, 0, 0, NULL, 2023, 11, NULL, 0);

-- Dumping structure for table sigap2.gaji_smp
CREATE TABLE IF NOT EXISTS `gaji_smp` (
  `id` int NOT NULL AUTO_INCREMENT,
  `pegawai` varchar(50) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci DEFAULT NULL,
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
  PRIMARY KEY (`id`) USING BTREE
) ENGINE=InnoDB AUTO_INCREMENT=423 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci ROW_FORMAT=DYNAMIC;

-- Dumping data for table sigap2.gaji_smp: ~86 rows (approximately)
INSERT INTO `gaji_smp` (`id`, `pegawai`, `datetime`, `month`, `lembur`, `value_lembur`, `jabatan_id`, `gapok`, `total`, `value_reward`, `value_inval`, `piket_count`, `value_piket`, `tugastambahan`, `tj_jabatan`, `kehadiran`, `sub_total`, `potongan`, `jenjang_id`, `penyesuaian`, `pid`, `jp`, `type`, `jenis_guru`, `tambahan`, `value_kehadiran`, `periode`, `tunjangan_periode`, `total_gapok`, `lama_kerja`, `status`, `tahun`, `bulan`, `potongan_bendahara`, `voucher`) VALUES
	(251, '10238', '2023-02-10 03:55:35', '2023-02-10', 0, 13000, 5, 1500, 500000, 50000, 0, 0, 8250, 0, 450000, 0, 500000, 0, 3, 0, 21, 0, 1, 2, 0, 66000, 0, 0, 0, 0, NULL, 2023, 1, NULL, 0),
	(252, '102323', '2023-02-10 03:55:35', '2023-02-10', 0, 13000, 5, 2500, 1050000, 50000, 0, 0, 7000, 100000, 450000, 0, 1050000, 0, 3, 0, 21, 0, 1, 1, 2, 56000, 4, 450000, 0, 2, NULL, 2023, 1, NULL, 0),
	(253, '196512051993070226', '2023-02-10 03:55:35', '2023-02-10', 0, 13000, 5, 1500, 500000, 50000, 0, 0, 0, 0, 450000, 0, 500000, 0, 3, 0, 21, 0, 1, 0, 0, 0, 0, 0, 0, 0, NULL, 2023, 1, NULL, 0),
	(254, '199202222015070546', '2023-02-10 03:55:35', '2023-02-10', 0, 13000, 5, 1500, 500000, 50000, 0, 0, 0, 0, 450000, 0, 500000, 0, 3, 0, 21, 0, 1, 0, 0, 0, 0, 0, 0, 0, NULL, 2023, 1, NULL, 0),
	(255, '198008252004070404', '2023-02-10 03:55:35', '2023-02-10', 0, 13000, 5, 1500, 500000, 50000, 0, 0, 0, 0, 450000, 0, 500000, 0, 3, 0, 21, 0, 1, 0, 0, 0, 0, 0, 0, 0, NULL, 2023, 1, NULL, 0),
	(256, '198306292008070448', '2023-02-10 03:55:35', '2023-02-10', 0, 13000, 5, 1500, 500000, 50000, 0, 0, 0, 0, 450000, 0, 500000, 0, 3, 0, 21, 0, 1, 0, 0, 0, 0, 0, 0, 0, NULL, 2023, 1, NULL, 0),
	(257, '198011212007070433', '2023-02-10 03:55:35', '2023-02-10', 0, 13000, 5, 1500, 500000, 50000, 0, 0, 0, 0, 450000, 0, 500000, 0, 3, 0, 21, 0, 1, 0, 0, 0, 0, 0, 0, 0, NULL, 2023, 1, NULL, 0),
	(258, '195508061997070291', '2023-02-10 03:55:35', '2023-02-10', 0, 13000, 5, 1500, 500000, 50000, 0, 0, 0, 0, 450000, 0, 500000, 0, 3, 0, 21, 0, 1, 0, 0, 0, 0, 0, 0, 0, NULL, 2023, 1, NULL, 0),
	(259, '196402131995070258', '2023-02-10 03:55:35', '2023-02-10', 0, 13000, 5, 1500, 500000, 50000, 0, 0, 0, 0, 450000, 0, 500000, 0, 3, 0, 21, 0, 1, 0, 0, 0, 0, 0, 0, 0, NULL, 2023, 1, NULL, 0),
	(260, '197905112010070338', '2023-02-10 03:55:35', '2023-02-10', 0, 13000, 5, 1500, 500000, 50000, 0, 0, 0, 0, 450000, 0, 500000, 0, 3, 0, 21, 0, 1, 0, 0, 0, 0, 0, 0, 0, NULL, 2023, 1, NULL, 0),
	(261, '198111252006070423', '2023-02-10 03:55:35', '2023-02-10', 0, 13000, 5, 1500, 500000, 50000, 0, 0, 0, 0, 450000, 0, 500000, 0, 3, 0, 21, 0, 1, 0, 0, 0, 0, 0, 0, 0, NULL, 2023, 1, NULL, 0),
	(262, '198402172007070436', '2023-02-10 03:55:35', '2023-02-10', 0, 13000, 5, 1500, 500000, 50000, 0, 0, 0, 0, 450000, 0, 500000, 0, 3, 0, 21, 0, 1, 0, 0, 0, 0, 0, 0, 0, NULL, 2023, 1, NULL, 0),
	(263, '197503091998070251', '2023-02-10 03:55:35', '2023-02-10', 0, 13000, 5, 1500, 500000, 50000, 0, 0, 0, 0, 450000, 0, 500000, 0, 3, 0, 21, 0, 1, 0, 0, 0, 0, 0, 0, 0, NULL, 2023, 1, NULL, 0),
	(264, '198304102006070420', '2023-02-10 03:55:35', '2023-02-10', 0, 13000, 5, 1500, 500000, 50000, 0, 0, 0, 0, 450000, 0, 500000, 0, 3, 0, 21, 0, 1, 0, 0, 0, 0, 0, 0, 0, NULL, 2023, 1, NULL, 0),
	(265, '197002261998070248', '2023-02-10 03:55:35', '2023-02-10', 0, 13000, 5, 1500, 500000, 50000, 0, 0, 0, 0, 450000, 0, 500000, 0, 3, 0, 21, 0, 1, 0, 0, 0, 0, 0, 0, 0, NULL, 2023, 1, NULL, 0),
	(266, '198411252010070486', '2023-02-10 03:55:35', '2023-02-10', 0, 13000, 5, 1500, 500000, 50000, 0, 0, 0, 0, 450000, 0, 500000, 0, 3, 0, 21, 0, 1, 0, 0, 0, 0, 0, 0, 0, NULL, 2023, 1, NULL, 0),
	(267, '197404241999070326', '2023-02-10 03:55:35', '2023-02-10', 0, 13000, 5, 1500, 500000, 50000, 0, 0, 0, 0, 450000, 0, 500000, 0, 3, 0, 21, 0, 1, 0, 0, 0, 0, 0, 0, 0, NULL, 2023, 1, NULL, 0),
	(268, '196709081999070325', '2023-02-10 03:55:35', '2023-02-10', 0, 13000, 5, 1500, 500000, 50000, 0, 0, 0, 0, 450000, 0, 500000, 0, 3, 0, 21, 0, 1, 0, 0, 0, 0, 0, 0, 0, NULL, 2023, 1, NULL, 0),
	(269, '197612261997070286', '2023-02-10 03:55:35', '2023-02-10', 0, 13000, 5, 1500, 500000, 50000, 0, 0, 0, 0, 450000, 0, 500000, 0, 3, 0, 21, 0, 1, 0, 0, 0, 0, 0, 0, 0, NULL, 2023, 1, NULL, 0),
	(270, '199201062014070526', '2023-02-10 03:55:35', '2023-02-10', 0, 13000, 5, 1500, 500000, 50000, 0, 0, 0, 0, 450000, 0, 500000, 0, 3, 0, 21, 0, 1, 0, 0, 0, 0, 0, 0, 0, NULL, 2023, 1, NULL, 0),
	(271, '196208291986070105', '2023-02-10 03:55:35', '2023-02-10', 0, 13000, 5, 1500, 500000, 50000, 0, 0, 0, 0, 450000, 0, 500000, 0, 3, 0, 21, 0, 1, 0, 0, 0, 0, 0, 0, 0, NULL, 2023, 1, NULL, 0),
	(272, '196512271993070227', '2023-02-10 03:55:35', '2023-02-10', 0, 13000, 5, 1500, 500000, 50000, 0, 0, 0, 0, 450000, 0, 500000, 0, 3, 0, 21, 0, 1, 0, 0, 0, 0, 0, 0, 0, NULL, 2023, 1, NULL, 0),
	(273, '197803282006070271', '2023-02-10 03:55:35', '2023-02-10', 0, 13000, 5, 1500, 500000, 50000, 0, 0, 0, 0, 450000, 0, 500000, 0, 3, 0, 21, 0, 1, 0, 0, 0, 0, 0, 0, 0, NULL, 2023, 1, NULL, 0),
	(274, '197501302000070339', '2023-02-10 03:55:35', '2023-02-10', 0, 13000, 5, 1500, 500000, 50000, 0, 0, 0, 0, 450000, 0, 500000, 0, 3, 0, 21, 0, 1, 0, 0, 0, 0, 0, 0, 0, NULL, 2023, 1, NULL, 0),
	(275, '198610132011070497', '2023-02-10 03:55:35', '2023-02-10', 0, 13000, 5, 1500, 500000, 50000, 0, 0, 0, 0, 450000, 0, 500000, 0, 3, 0, 21, 0, 1, 0, 0, 0, 0, 0, 0, 0, NULL, 2023, 1, NULL, 0),
	(276, '198104162007070343', '2023-02-10 03:55:35', '2023-02-10', 0, 13000, 5, 1500, 500000, 50000, 0, 0, 0, 0, 450000, 0, 500000, 0, 3, 0, 21, 0, 1, 0, 0, 0, 0, 0, 0, 0, NULL, 2023, 1, NULL, 0),
	(277, '196705282012070509', '2023-02-10 03:55:35', '2023-02-10', 0, 13000, 5, 1500, 500000, 50000, 0, 0, 0, 0, 450000, 0, 500000, 0, 3, 0, 21, 0, 1, 0, 0, 0, 0, 0, 0, 0, NULL, 2023, 1, NULL, 0),
	(278, '197608042004070398', '2023-02-10 03:55:35', '2023-02-10', 0, 13000, 5, 1500, 500000, 50000, 0, 0, 0, 0, 450000, 0, 500000, 0, 3, 0, 21, 0, 1, 0, 0, 0, 0, 0, 0, 0, NULL, 2023, 1, NULL, 0),
	(279, '196606072001070132', '2023-02-10 03:55:35', '2023-02-10', 0, 13000, 5, 1500, 500000, 50000, 0, 0, 0, 0, 450000, 0, 500000, 0, 3, 0, 21, 0, 1, 0, 0, 0, 0, 0, 0, 0, NULL, 2023, 1, NULL, 0),
	(280, '197710262008070465', '2023-02-10 03:55:35', '2023-02-10', 0, 13000, 5, 1500, 500000, 50000, 0, 0, 0, 0, 450000, 0, 500000, 0, 3, 0, 21, 0, 1, 0, 0, 0, 0, 0, 0, 0, NULL, 2023, 1, NULL, 0),
	(281, '198101232006070421', '2023-02-10 03:55:35', '2023-02-10', 0, 13000, 5, 1500, 500000, 50000, 0, 0, 0, 0, 450000, 0, 500000, 0, 3, 0, 21, 0, 1, 0, 0, 0, 0, 0, 0, 0, NULL, 2023, 1, NULL, 0),
	(282, '198607102012070507', '2023-02-10 03:55:35', '2023-02-10', 0, 13000, 5, 1500, 500000, 50000, 0, 0, 0, 0, 450000, 0, 500000, 0, 3, 0, 21, 0, 1, 0, 0, 0, 0, 0, 0, 0, NULL, 2023, 1, NULL, 0),
	(283, '197101091996070265', '2023-02-10 03:55:35', '2023-02-10', 0, 13000, 5, 1500, 500000, 50000, 0, 0, 0, 0, 450000, 0, 500000, 0, 3, 0, 21, 0, 1, 0, 0, 0, 0, 0, 0, 0, NULL, 2023, 1, NULL, 0),
	(284, '197208221999070316', '2023-02-10 03:55:35', '2023-02-10', 0, 13000, 5, 1500, 500000, 50000, 0, 0, 0, 0, 450000, 0, 500000, 0, 3, 0, 21, 0, 1, 0, 0, 0, 0, 0, 0, 0, NULL, 2023, 1, NULL, 0),
	(285, '196801071994070195', '2023-02-10 03:55:35', '2023-02-10', 0, 13000, 5, 1500, 500000, 50000, 0, 0, 0, 0, 450000, 0, 500000, 0, 3, 0, 21, 0, 1, 0, 0, 0, 0, 0, 0, 0, NULL, 2023, 1, NULL, 0),
	(286, '196912161999070314', '2023-02-10 03:55:35', '2023-02-10', 0, 13000, 5, 1500, 500000, 50000, 0, 0, 0, 0, 450000, 0, 500000, 0, 3, 0, 21, 0, 1, 0, 0, 0, 0, 0, 0, 0, NULL, 2023, 1, NULL, 0),
	(287, '197508291999070317', '2023-02-10 03:55:35', '2023-02-10', 0, 13000, 5, 1500, 500000, 50000, 0, 0, 0, 0, 450000, 0, 500000, 0, 3, 0, 21, 0, 1, 0, 0, 0, 0, 0, 0, 0, NULL, 2023, 1, NULL, 0),
	(288, '197606202001070361', '2023-02-10 03:55:35', '2023-02-10', 0, 13000, 5, 1500, 500000, 50000, 0, 0, 0, 0, 450000, 0, 500000, 0, 3, 0, 21, 0, 1, 0, 0, 0, 0, 0, 0, 0, NULL, 2023, 1, NULL, 0),
	(289, '198008292014070532', '2023-02-10 03:55:35', '2023-02-10', 0, 13000, 5, 1500, 500000, 50000, 0, 0, 0, 0, 450000, 0, 500000, 0, 3, 0, 21, 0, 1, 0, 0, 0, 0, 0, 0, 0, NULL, 2023, 1, NULL, 0),
	(290, '199610182021110863', '2023-02-10 03:55:35', '2023-02-10', 0, 13000, 5, 1500, 500000, 50000, 0, 0, 0, 0, 450000, 0, 500000, 0, 3, 0, 21, 0, 1, 0, 0, 0, 0, 0, 0, 0, NULL, 2023, 1, NULL, 0),
	(291, '199803202022010866', '2023-02-10 03:55:35', '2023-02-10', 0, 13000, 5, 1500, 500000, 50000, 0, 0, 0, 0, 450000, 0, 500000, 0, 3, 0, 21, 0, 1, 0, 0, 0, 0, 0, 0, 0, NULL, 2023, 1, NULL, 0),
	(292, '199607072021110864', '2023-02-10 03:55:35', '2023-02-10', 0, 13000, 5, 1500, 500000, 50000, 0, 0, 0, 0, 450000, 0, 500000, 0, 3, 0, 21, 0, 1, 0, 0, 0, 0, 0, 0, 0, NULL, 2023, 1, NULL, 0),
	(293, '199806152021110865', '2023-02-10 03:55:35', '2023-02-10', 0, 13000, 5, 1500, 500000, 50000, 0, 0, 0, 0, 450000, 0, 500000, 0, 3, 0, 21, 0, 1, 0, 0, 0, 0, 0, 0, 0, NULL, 2023, 1, NULL, 0),
	(380, '10238', '2023-02-20 06:33:25', '2023-02-20', 0, 13000, 5, 1500, 500000, 50000, 0, 0, 8250, 0, 450000, 0, 500000, 0, 3, 0, 24, 0, 1, 2, 0, 66000, 0, 0, 0, 0, NULL, 2023, 11, NULL, 0),
	(381, '102323', '2023-02-20 06:33:25', '2023-02-20', 0, 13000, 5, 2500, 1050000, 50000, 0, 0, 7000, 100000, 450000, 0, 1050000, 0, 3, 0, 24, 0, 1, 1, 2, 56000, 4, 450000, 0, 2, NULL, 2023, 11, NULL, 0),
	(382, '196512051993070226', '2023-02-20 06:33:25', '2023-02-20', 0, 13000, 5, 1500, 500000, 50000, 0, 0, 0, 0, 450000, 0, 500000, 0, 3, 0, 24, 0, 1, 0, 0, 0, 0, 0, 0, 0, NULL, 2023, 11, NULL, 0),
	(383, '199202222015070546', '2023-02-20 06:33:25', '2023-02-20', 0, 13000, 5, 1500, 500000, 50000, 0, 0, 0, 0, 450000, 0, 500000, 0, 3, 0, 24, 0, 1, 0, 0, 0, 0, 0, 0, 0, NULL, 2023, 11, NULL, 0),
	(384, '198008252004070404', '2023-02-20 06:33:25', '2023-02-20', 0, 13000, 5, 1500, 500000, 50000, 0, 0, 0, 0, 450000, 0, 500000, 0, 3, 0, 24, 0, 1, 0, 0, 0, 0, 0, 0, 0, NULL, 2023, 11, NULL, 0),
	(385, '198306292008070448', '2023-02-20 06:33:25', '2023-02-20', 0, 13000, 5, 1500, 500000, 50000, 0, 0, 0, 0, 450000, 0, 500000, 0, 3, 0, 24, 0, 1, 0, 0, 0, 0, 0, 0, 0, NULL, 2023, 11, NULL, 0),
	(386, '198011212007070433', '2023-02-20 06:33:25', '2023-02-20', 0, 13000, 5, 1500, 500000, 50000, 0, 0, 0, 0, 450000, 0, 500000, 0, 3, 0, 24, 0, 1, 0, 0, 0, 0, 0, 0, 0, NULL, 2023, 11, NULL, 0),
	(387, '195508061997070291', '2023-02-20 06:33:26', '2023-02-20', 0, 13000, 5, 1500, 500000, 50000, 0, 0, 0, 0, 450000, 0, 500000, 0, 3, 0, 24, 0, 1, 0, 0, 0, 0, 0, 0, 0, NULL, 2023, 11, NULL, 0),
	(388, '196402131995070258', '2023-02-20 06:33:26', '2023-02-20', 0, 13000, 5, 1500, 500000, 50000, 0, 0, 0, 0, 450000, 0, 500000, 0, 3, 0, 24, 0, 1, 0, 0, 0, 0, 0, 0, 0, NULL, 2023, 11, NULL, 0),
	(389, '197905112010070338', '2023-02-20 06:33:26', '2023-02-20', 0, 13000, 5, 1500, 500000, 50000, 0, 0, 0, 0, 450000, 0, 500000, 0, 3, 0, 24, 0, 1, 0, 0, 0, 0, 0, 0, 0, NULL, 2023, 11, NULL, 0),
	(390, '198111252006070423', '2023-02-20 06:33:26', '2023-02-20', 0, 13000, 5, 1500, 500000, 50000, 0, 0, 0, 0, 450000, 0, 500000, 0, 3, 0, 24, 0, 1, 0, 0, 0, 0, 0, 0, 0, NULL, 2023, 11, NULL, 0),
	(391, '198402172007070436', '2023-02-20 06:33:26', '2023-02-20', 0, 13000, 5, 1500, 500000, 50000, 0, 0, 0, 0, 450000, 0, 500000, 0, 3, 0, 24, 0, 1, 0, 0, 0, 0, 0, 0, 0, NULL, 2023, 11, NULL, 0),
	(392, '197503091998070251', '2023-02-20 06:33:26', '2023-02-20', 0, 13000, 5, 1500, 500000, 50000, 0, 0, 0, 0, 450000, 0, 500000, 0, 3, 0, 24, 0, 1, 0, 0, 0, 0, 0, 0, 0, NULL, 2023, 11, NULL, 0),
	(393, '198304102006070420', '2023-02-20 06:33:26', '2023-02-20', 0, 13000, 5, 1500, 500000, 50000, 0, 0, 0, 0, 450000, 0, 500000, 0, 3, 0, 24, 0, 1, 0, 0, 0, 0, 0, 0, 0, NULL, 2023, 11, NULL, 0),
	(394, '197002261998070248', '2023-02-20 06:33:26', '2023-02-20', 0, 13000, 5, 1500, 500000, 50000, 0, 0, 0, 0, 450000, 0, 500000, 0, 3, 0, 24, 0, 1, 0, 0, 0, 0, 0, 0, 0, NULL, 2023, 11, NULL, 0),
	(395, '198411252010070486', '2023-02-20 06:33:26', '2023-02-20', 0, 13000, 5, 1500, 500000, 50000, 0, 0, 0, 0, 450000, 0, 500000, 0, 3, 0, 24, 0, 1, 0, 0, 0, 0, 0, 0, 0, NULL, 2023, 11, NULL, 0),
	(396, '197404241999070326', '2023-02-20 06:33:26', '2023-02-20', 0, 13000, 5, 1500, 500000, 50000, 0, 0, 0, 0, 450000, 0, 500000, 0, 3, 0, 24, 0, 1, 0, 0, 0, 0, 0, 0, 0, NULL, 2023, 11, NULL, 0),
	(397, '196709081999070325', '2023-02-20 06:33:26', '2023-02-20', 0, 13000, 5, 1500, 500000, 50000, 0, 0, 0, 0, 450000, 0, 500000, 0, 3, 0, 24, 0, 1, 0, 0, 0, 0, 0, 0, 0, NULL, 2023, 11, NULL, 0),
	(398, '197612261997070286', '2023-02-20 06:33:26', '2023-02-20', 0, 13000, 5, 1500, 500000, 50000, 0, 0, 0, 0, 450000, 0, 500000, 0, 3, 0, 24, 0, 1, 0, 0, 0, 0, 0, 0, 0, NULL, 2023, 11, NULL, 0),
	(399, '199201062014070526', '2023-02-20 06:33:26', '2023-02-20', 0, 13000, 5, 1500, 500000, 50000, 0, 0, 0, 0, 450000, 0, 500000, 0, 3, 0, 24, 0, 1, 0, 0, 0, 0, 0, 0, 0, NULL, 2023, 11, NULL, 0),
	(400, '196208291986070105', '2023-02-20 06:33:26', '2023-02-20', 0, 13000, 5, 1500, 500000, 50000, 0, 0, 0, 0, 450000, 0, 500000, 0, 3, 0, 24, 0, 1, 0, 0, 0, 0, 0, 0, 0, NULL, 2023, 11, NULL, 0),
	(401, '196512271993070227', '2023-02-20 06:33:26', '2023-02-20', 0, 13000, 5, 1500, 500000, 50000, 0, 0, 0, 0, 450000, 0, 500000, 0, 3, 0, 24, 0, 1, 0, 0, 0, 0, 0, 0, 0, NULL, 2023, 11, NULL, 0),
	(402, '197803282006070271', '2023-02-20 06:33:26', '2023-02-20', 0, 13000, 5, 1500, 500000, 50000, 0, 0, 0, 0, 450000, 0, 500000, 0, 3, 0, 24, 0, 1, 0, 0, 0, 0, 0, 0, 0, NULL, 2023, 11, NULL, 0),
	(403, '197501302000070339', '2023-02-20 06:33:26', '2023-02-20', 0, 13000, 5, 1500, 500000, 50000, 0, 0, 0, 0, 450000, 0, 500000, 0, 3, 0, 24, 0, 1, 0, 0, 0, 0, 0, 0, 0, NULL, 2023, 11, NULL, 0),
	(404, '198610132011070497', '2023-02-20 06:33:26', '2023-02-20', 0, 13000, 5, 1500, 500000, 50000, 0, 0, 0, 0, 450000, 0, 500000, 0, 3, 0, 24, 0, 1, 0, 0, 0, 0, 0, 0, 0, NULL, 2023, 11, NULL, 0),
	(405, '198104162007070343', '2023-02-20 06:33:26', '2023-02-20', 0, 13000, 5, 1500, 500000, 50000, 0, 0, 0, 0, 450000, 0, 500000, 0, 3, 0, 24, 0, 1, 0, 0, 0, 0, 0, 0, 0, NULL, 2023, 11, NULL, 0),
	(406, '196705282012070509', '2023-02-20 06:33:26', '2023-02-20', 0, 13000, 5, 1500, 500000, 50000, 0, 0, 0, 0, 450000, 0, 500000, 0, 3, 0, 24, 0, 1, 0, 0, 0, 0, 0, 0, 0, NULL, 2023, 11, NULL, 0),
	(407, '197608042004070398', '2023-02-20 06:33:26', '2023-02-20', 0, 13000, 5, 1500, 500000, 50000, 0, 0, 0, 0, 450000, 0, 500000, 0, 3, 0, 24, 0, 1, 0, 0, 0, 0, 0, 0, 0, NULL, 2023, 11, NULL, 0),
	(408, '196606072001070132', '2023-02-20 06:33:26', '2023-02-20', 0, 13000, 5, 1500, 500000, 50000, 0, 0, 0, 0, 450000, 0, 500000, 0, 3, 0, 24, 0, 1, 0, 0, 0, 0, 0, 0, 0, NULL, 2023, 11, NULL, 0),
	(409, '197710262008070465', '2023-02-20 06:33:26', '2023-02-20', 0, 13000, 5, 1500, 500000, 50000, 0, 0, 0, 0, 450000, 0, 500000, 0, 3, 0, 24, 0, 1, 0, 0, 0, 0, 0, 0, 0, NULL, 2023, 11, NULL, 0),
	(410, '198101232006070421', '2023-02-20 06:33:26', '2023-02-20', 0, 13000, 5, 1500, 500000, 50000, 0, 0, 0, 0, 450000, 0, 500000, 0, 3, 0, 24, 0, 1, 0, 0, 0, 0, 0, 0, 0, NULL, 2023, 11, NULL, 0),
	(411, '198607102012070507', '2023-02-20 06:33:26', '2023-02-20', 0, 13000, 5, 1500, 500000, 50000, 0, 0, 0, 0, 450000, 0, 500000, 0, 3, 0, 24, 0, 1, 0, 0, 0, 0, 0, 0, 0, NULL, 2023, 11, NULL, 0),
	(412, '197101091996070265', '2023-02-20 06:33:26', '2023-02-20', 0, 13000, 5, 1500, 500000, 50000, 0, 0, 0, 0, 450000, 0, 500000, 0, 3, 0, 24, 0, 1, 0, 0, 0, 0, 0, 0, 0, NULL, 2023, 11, NULL, 0),
	(413, '197208221999070316', '2023-02-20 06:33:26', '2023-02-20', 0, 13000, 5, 1500, 500000, 50000, 0, 0, 0, 0, 450000, 0, 500000, 0, 3, 0, 24, 0, 1, 0, 0, 0, 0, 0, 0, 0, NULL, 2023, 11, NULL, 0),
	(414, '196801071994070195', '2023-02-20 06:33:26', '2023-02-20', 0, 13000, 5, 1500, 500000, 50000, 0, 0, 0, 0, 450000, 0, 500000, 0, 3, 0, 24, 0, 1, 0, 0, 0, 0, 0, 0, 0, NULL, 2023, 11, NULL, 0),
	(415, '196912161999070314', '2023-02-20 06:33:26', '2023-02-20', 0, 13000, 5, 1500, 500000, 50000, 0, 0, 0, 0, 450000, 0, 500000, 0, 3, 0, 24, 0, 1, 0, 0, 0, 0, 0, 0, 0, NULL, 2023, 11, NULL, 0),
	(416, '197508291999070317', '2023-02-20 06:33:26', '2023-02-20', 0, 13000, 5, 1500, 500000, 50000, 0, 0, 0, 0, 450000, 0, 500000, 0, 3, 0, 24, 0, 1, 0, 0, 0, 0, 0, 0, 0, NULL, 2023, 11, NULL, 0),
	(417, '197606202001070361', '2023-02-20 06:33:26', '2023-02-20', 0, 13000, 5, 1500, 500000, 50000, 0, 0, 0, 0, 450000, 0, 500000, 0, 3, 0, 24, 0, 1, 0, 0, 0, 0, 0, 0, 0, NULL, 2023, 11, NULL, 0),
	(418, '198008292014070532', '2023-02-20 06:33:26', '2023-02-20', 0, 13000, 5, 1500, 500000, 50000, 0, 0, 0, 0, 450000, 0, 500000, 0, 3, 0, 24, 0, 1, 0, 0, 0, 0, 0, 0, 0, NULL, 2023, 11, NULL, 0),
	(419, '199610182021110863', '2023-02-20 06:33:26', '2023-02-20', 0, 13000, 5, 1500, 500000, 50000, 0, 0, 0, 0, 450000, 0, 500000, 0, 3, 0, 24, 0, 1, 0, 0, 0, 0, 0, 0, 0, NULL, 2023, 11, NULL, 0),
	(420, '199803202022010866', '2023-02-20 06:33:26', '2023-02-20', 0, 13000, 5, 1500, 500000, 50000, 0, 0, 0, 0, 450000, 0, 500000, 0, 3, 0, 24, 0, 1, 0, 0, 0, 0, 0, 0, 0, NULL, 2023, 11, NULL, 0),
	(421, '199607072021110864', '2023-02-20 06:33:26', '2023-02-20', 0, 13000, 5, 1500, 500000, 50000, 0, 0, 0, 0, 450000, 0, 500000, 0, 3, 0, 24, 0, 1, 0, 0, 0, 0, 0, 0, 0, NULL, 2023, 11, NULL, 0),
	(422, '199806152021110865', '2023-02-20 06:33:26', '2023-02-20', 0, 13000, 5, 1500, 500000, 50000, 0, 0, 0, 0, 450000, 0, 500000, 0, 3, 0, 24, 0, 1, 0, 0, 0, 0, 0, 0, 0, NULL, 2023, 11, NULL, 0);

-- Dumping structure for table sigap2.gaji_tk
CREATE TABLE IF NOT EXISTS `gaji_tk` (
  `id` int NOT NULL AUTO_INCREMENT,
  `pegawai` varchar(50) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci DEFAULT NULL,
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
  PRIMARY KEY (`id`) USING BTREE
) ENGINE=InnoDB AUTO_INCREMENT=247 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci ROW_FORMAT=DYNAMIC;

-- Dumping data for table sigap2.gaji_tk: ~9 rows (approximately)
INSERT INTO `gaji_tk` (`id`, `pegawai`, `datetime`, `month`, `lembur`, `value_lembur`, `jabatan_id`, `gapok`, `total`, `value_reward`, `value_inval`, `piket_count`, `value_piket`, `tugastambahan`, `tj_jabatan`, `kehadiran`, `sub_total`, `potongan`, `jenjang_id`, `penyesuaian`, `pid`, `jp`, `type`, `jenis_guru`, `tambahan`, `value_kehadiran`, `periode`, `tunjangan_periode`, `total_gapok`, `lama_kerja`, `status`, `bulan`, `tahun`, `potongan_bendahara`, `voucher`) VALUES
	(232, '199206112015070538', '2023-02-16 03:12:53', '2023-02-16', 0, 13000, 13, 1500, 3290000, 50000, 0, 0, 8250, 0, 0, 48, 3290000, 0, 1, 0, 70, 48, 1, 2, 0, 66000, 0, 0, 72000, 0, NULL, 1, 2023, NULL, 0),
	(233, '196907012015070538', '2023-02-16 03:12:53', '2023-02-16', 0, 13000, 13, 1500, 2810000, 50000, 0, 0, 7000, 0, 0, 48, 2810000, 0, 1, 0, 70, 48, 1, 1, 0, 56000, 0, 0, 72000, 0, NULL, 1, 2023, NULL, 0),
	(234, '198112132016070555', '2023-02-16 03:12:53', '2023-02-16', 0, 13000, 13, 1500, 2810000, 50000, 0, 0, 7000, 0, 0, 48, 2810000, 0, 1, 0, 70, 48, 1, 1, 0, 56000, 0, 0, 72000, 0, NULL, 1, 2023, NULL, 0),
	(235, '199206112015070538', '2023-02-16 03:31:42', '2023-02-16', 0, 13000, 13, 1500, 3150000, 50000, 0, 0, 8250, 0, 0, 48, 3290000, 0, 1, 0, 71, 48, 1, 2, 0, 66000, 0, 0, 72000, 0, NULL, 2, 2023, 90000, 0),
	(236, '196907012015070538', '2023-02-16 03:31:42', '2023-02-16', 0, 13000, 13, 1500, 2810000, 50000, 0, 0, 7000, 0, 0, 48, 2810000, 0, 1, 0, 71, 48, 1, 1, 0, 56000, 0, 0, 72000, 0, NULL, 2, 2023, NULL, 0),
	(237, '198112132016070555', '2023-02-16 03:31:42', '2023-02-16', 0, 13000, 13, 1500, 2810000, 50000, 0, 0, 7000, 0, 0, 48, 2810000, 0, 1, 0, 71, 48, 1, 1, 0, 56000, 0, 0, 72000, 0, NULL, 2, 2023, NULL, 0),
	(244, '199206112015070538', '2023-02-16 04:14:29', '2023-02-16', 0, 13000, 13, 1500, 3290000, 50000, 0, 0, 8250, 0, 0, 48, 3290000, 0, 1, 0, 74, 48, 1, 2, 0, 66000, 0, 0, 72000, 0, NULL, 6, 2023, NULL, 0),
	(245, '196907012015070538', '2023-02-16 04:14:29', '2023-02-16', 0, 13000, 13, 1500, 2810000, 50000, 0, 0, 7000, 0, 0, 48, 2810000, 0, 1, 0, 74, 48, 1, 1, 0, 56000, 0, 0, 72000, 0, NULL, 6, 2023, NULL, 0),
	(246, '19811213201607067', '2023-02-16 04:14:29', '2023-02-16', 0, 13000, 13, 1500, 2810000, 50000, 0, 0, 7000, 0, 0, 48, 2810000, 0, 1, 0, 74, 48, 1, 1, 0, 56000, 0, 0, 72000, 0, NULL, 6, 2023, NULL, 0);

-- Dumping structure for table sigap2.gaji_tu_sd
CREATE TABLE IF NOT EXISTS `gaji_tu_sd` (
  `id` int NOT NULL AUTO_INCREMENT,
  `datetime` datetime DEFAULT NULL,
  `pegawai` varchar(50) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci DEFAULT NULL,
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
  PRIMARY KEY (`id`) USING BTREE
) ENGINE=InnoDB AUTO_INCREMENT=85 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci ROW_FORMAT=DYNAMIC;

-- Dumping data for table sigap2.gaji_tu_sd: ~2 rows (approximately)
INSERT INTO `gaji_tu_sd` (`id`, `datetime`, `pegawai`, `jenjang_id`, `jabatan_id`, `month`, `gapok`, `kehadiran`, `lembur`, `value_lembur`, `value_reward`, `value_inval`, `piket_count`, `value_piket`, `tugastambahan`, `tj_jabatan`, `potongan`, `sub_total`, `penyesuaian`, `total`, `pid`, `tunjangan2`, `tambahan`, `type_jabatan`, `ijasah`, `lama_kerja`, `sertif`, `value_kehadiran`, `tahun`, `bulan`, `voucher`, `status`, `potongan_bendahara`) VALUES
	(83, NULL, '10232712', 2, 6, NULL, 0, 0, 0, 13000, 50000, 0, 0, 8250, 0, 0, 0, 50000, 0, 50000, 20, 0, 0, 2, 0, 2, 0, 54000, 2023, 1, 0, NULL, NULL),
	(84, NULL, '10232712', 2, 6, NULL, 0, 0, 0, 13000, 50000, 0, 0, 8250, 0, 0, 0, 50000, 0, 50000, 21, 0, 0, 2, 0, 2, 0, 54000, 2023, 11, 0, NULL, NULL);

-- Dumping structure for table sigap2.gaji_tu_sma
CREATE TABLE IF NOT EXISTS `gaji_tu_sma` (
  `id` int NOT NULL AUTO_INCREMENT,
  `datetime` datetime DEFAULT NULL,
  `pegawai` varchar(50) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci DEFAULT NULL,
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
) ENGINE=InnoDB AUTO_INCREMENT=383 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci ROW_FORMAT=DYNAMIC;

-- Dumping data for table sigap2.gaji_tu_sma: ~12 rows (approximately)
INSERT INTO `gaji_tu_sma` (`id`, `datetime`, `pegawai`, `jenjang_id`, `jabatan_id`, `month`, `gapok`, `kehadiran`, `lembur`, `value_lembur`, `value_reward`, `value_inval`, `piket_count`, `value_piket`, `tugastambahan`, `tj_jabatan`, `potongan`, `sub_total`, `penyesuaian`, `total`, `pid`, `tunjangan2`, `tambahan`, `type_jabatan`, `ijasah`, `lama_kerja`, `sertif`, `value_kehadiran`, `tahun`, `bulan`, `voucher`, `status`, `potongan_bendahara`, `jaminan_pensiun`, `jaminan_hari_tua`, `total_pph21`, `bpjs_kesehatan`) VALUES
	(331, NULL, '10239', 4, 7, NULL, 105000, 26, 0, 13000, 50000, 0, 0, 8250, 0, 150000, 0, 1779000, 0, 1779000, 250, 70000, 0, 2, 8, 6, 2, 54000, 2023, 1, 0, NULL, NULL, NULL, NULL, NULL, NULL),
	(332, NULL, '102390', 4, 6, NULL, 92500, 26, 0, 13000, 50000, 0, 0, 8250, 100000, 70000, 0, 1786500, 0, 1786500, 250, 70000, 3, 2, 8, 3, 2, 54000, 2023, 1, 0, NULL, NULL, NULL, NULL, NULL, NULL),
	(333, NULL, '102310', 4, 6, NULL, 0, 0, 0, 13000, 50000, 0, 0, 8250, 0, 70000, 0, 190000, 0, 190000, 250, 70000, 0, 2, 0, 0, 2, 54000, 2023, 1, 0, NULL, NULL, NULL, NULL, NULL, NULL),
	(334, NULL, '3578102612761114', 4, 5, NULL, 0, 0, 0, 13000, 50000, 0, 0, 8250, 0, 450000, 0, 570000, 0, 570000, 250, 70000, 0, 2, 0, 0, 0, 54000, 2023, 1, 0, NULL, NULL, NULL, NULL, NULL, NULL),
	(355, NULL, '10239', 4, 7, NULL, 105000, 26, 0, 13000, 50000, 0, 0, 8250, 0, 150000, 0, 1779000, 0, 1779000, 256, 70000, 0, 2, 8, 6, 2, 54000, 2023, 6, 0, NULL, NULL, NULL, NULL, NULL, NULL),
	(356, NULL, '102390', 4, 6, NULL, 92500, 26, 0, 13000, 50000, 0, 0, 8250, 100000, 70000, 0, 1786500, 0, 1786500, 256, 70000, 3, 2, 8, 3, 2, 54000, 2023, 6, 0, NULL, NULL, NULL, NULL, NULL, NULL),
	(357, NULL, '102310', 4, 6, NULL, 0, 0, 0, 13000, 50000, 0, 0, 8250, 0, 70000, 0, 190000, 0, 190000, 256, 70000, 0, 2, 0, 0, 2, 54000, 2023, 6, 0, NULL, NULL, NULL, NULL, NULL, NULL),
	(358, NULL, '3578102612761114', 4, 5, NULL, 0, 0, 0, 13000, 50000, 0, 0, 8250, 0, 450000, 0, 570000, 0, 570000, 256, 70000, 0, 2, 0, 0, 0, 54000, 2023, 6, 0, NULL, NULL, NULL, NULL, NULL, NULL),
	(375, NULL, '10239', 4, 7, NULL, 105000, 26, 0, 13000, 50000, 0, 0, 8250, 0, 150000, 6300, 1779000, 0, 1772700, 271, 70000, 0, 2, 8, 6, 2, 54000, 2023, 7, 0, NULL, NULL, 1050, 2100, 3150, NULL),
	(376, NULL, '102390', 4, 6, NULL, 92500, 26, 0, 13000, 50000, 0, 0, 8250, 100000, 70000, 5550, 1786500, 0, 1780950, 271, 70000, 3, 2, 8, 3, 2, 54000, 2023, 7, 0, NULL, NULL, 925, 1850, 2775, NULL),
	(377, NULL, '102310', 4, 6, NULL, 0, 0, 0, 13000, 50000, 0, 0, 8250, 0, 70000, 0, 190000, 0, 190000, 271, 70000, 0, 2, 0, 0, 2, 54000, 2023, 7, 0, NULL, NULL, 0, 0, 0, NULL),
	(378, NULL, '3578102612761114', 4, 5, NULL, 0, 0, 0, 13000, 50000, 0, 0, 8250, 0, 450000, 0, 570000, 0, 570000, 271, 70000, 0, 2, 0, 0, 0, 54000, 2023, 7, 0, NULL, NULL, 0, 0, 0, NULL),
	(379, NULL, '10239', 4, 7, NULL, 105000, 26, 0, 13000, 50000, 0, 0, 8250, 0, 150000, 6300, 1779000, 0, 1772700, 272, 70000, 0, 2, 8, 6, 2, 54000, 2023, 2, 0, NULL, NULL, 1050, 2100, 3150, NULL),
	(380, NULL, '102390', 4, 6, NULL, 92500, 26, 0, 13000, 50000, 0, 0, 8250, 100000, 70000, 5550, 1786500, 0, 1780950, 272, 70000, 3, 2, 8, 3, 2, 54000, 2023, 2, 0, NULL, NULL, 925, 1850, 2775, NULL),
	(381, NULL, '102310', 4, 6, NULL, 0, 0, 0, 13000, 50000, 0, 0, 8250, 0, 70000, 0, 190000, 0, 190000, 272, 70000, 0, 2, 0, 0, 2, 54000, 2023, 2, 0, NULL, NULL, 0, 0, 0, NULL),
	(382, NULL, '3578102612761114', 4, 5, NULL, 0, 0, 0, 13000, 50000, 0, 0, 8250, 0, 450000, 0, 570000, 0, 570000, 272, 70000, 0, 2, 0, 0, 0, 54000, 2023, 2, 0, NULL, NULL, 0, 0, 0, NULL);

-- Dumping structure for table sigap2.gaji_tu_smk
CREATE TABLE IF NOT EXISTS `gaji_tu_smk` (
  `id` int NOT NULL AUTO_INCREMENT,
  `datetime` datetime DEFAULT NULL,
  `pegawai` varchar(50) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci DEFAULT NULL,
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
  PRIMARY KEY (`id`) USING BTREE
) ENGINE=InnoDB AUTO_INCREMENT=82 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci ROW_FORMAT=DYNAMIC;

-- Dumping data for table sigap2.gaji_tu_smk: ~2 rows (approximately)
INSERT INTO `gaji_tu_smk` (`id`, `datetime`, `pegawai`, `jenjang_id`, `jabatan_id`, `month`, `gapok`, `kehadiran`, `lembur`, `value_lembur`, `value_reward`, `value_inval`, `piket_count`, `value_piket`, `tugastambahan`, `tj_jabatan`, `potongan`, `sub_total`, `penyesuaian`, `total`, `pid`, `ijasah`, `tunjangan2`, `tambahan`, `type_jabatan`, `lama_kerja`, `sertif`, `value_kehadiran`, `tahun`, `bulan`, `voucher`, `status`, `potongan_bendahara`) VALUES
	(80, NULL, '1023231', 5, 6, NULL, 0, 0, 0, 13000, 50000, 0, 0, 8250, 100000, 0, 0, 220000, 0, 220000, 24, 0, 70000, 2, 2, 2, 1, 54000, 2023, 1, 0, NULL, NULL),
	(81, NULL, '1023231', 5, 6, NULL, 0, 0, 0, 13000, 50000, 0, 0, 8250, 100000, 0, 0, 220000, 0, 220000, 25, 0, 70000, 2, 2, 2, 1, 54000, 2023, 11, 0, NULL, NULL);

-- Dumping structure for table sigap2.gaji_tu_smp
CREATE TABLE IF NOT EXISTS `gaji_tu_smp` (
  `id` int NOT NULL AUTO_INCREMENT,
  `datetime` datetime DEFAULT NULL,
  `pegawai` varchar(50) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci DEFAULT NULL,
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
  PRIMARY KEY (`id`) USING BTREE
) ENGINE=InnoDB AUTO_INCREMENT=84 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci ROW_FORMAT=DYNAMIC;

-- Dumping data for table sigap2.gaji_tu_smp: ~2 rows (approximately)
INSERT INTO `gaji_tu_smp` (`id`, `datetime`, `pegawai`, `jenjang_id`, `jabatan_id`, `month`, `gapok`, `kehadiran`, `lembur`, `value_lembur`, `value_reward`, `value_inval`, `piket_count`, `value_piket`, `tugastambahan`, `tj_jabatan`, `potongan`, `sub_total`, `penyesuaian`, `total`, `pid`, `tunjangan2`, `tambahan`, `type_jabatan`, `ijasah`, `lama_kerja`, `sertif`, `value_kehadiran`, `tahun`, `bulan`, `voucher`, `status`, `potongan_bendahara`) VALUES
	(80, NULL, '1023232', 3, 6, NULL, 0, 0, 0, 13000, 50000, 0, 0, 8250, 100000, 70000, 0, 220000, 0, 220000, 14, 0, 2, 2, 0, 2, 1, 54000, 2023, 1, 0, NULL, NULL),
	(83, NULL, '1023232', 3, 6, NULL, 0, 0, 0, 13000, 50000, 0, 0, 8250, 100000, 70000, 0, 220000, 0, 220000, 17, 0, 2, 2, 0, 2, 1, 54000, 2023, 11, 0, NULL, NULL);

-- Dumping structure for table sigap2.gaji_tu_tk
CREATE TABLE IF NOT EXISTS `gaji_tu_tk` (
  `id` int NOT NULL AUTO_INCREMENT,
  `datetime` datetime DEFAULT NULL,
  `pegawai` varchar(50) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci DEFAULT NULL,
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
  PRIMARY KEY (`id`) USING BTREE
) ENGINE=InnoDB AUTO_INCREMENT=148 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci ROW_FORMAT=DYNAMIC;

-- Dumping data for table sigap2.gaji_tu_tk: ~3 rows (approximately)
INSERT INTO `gaji_tu_tk` (`id`, `datetime`, `pegawai`, `jenjang_id`, `jabatan_id`, `month`, `gapok`, `kehadiran`, `lembur`, `value_lembur`, `value_reward`, `value_inval`, `piket_count`, `value_piket`, `tugastambahan`, `tj_jabatan`, `potongan`, `sub_total`, `penyesuaian`, `total`, `pid`, `tunjangan2`, `tambahan`, `type_jabatan`, `ijasah`, `lama_kerja`, `sertif`, `value_kehadiran`, `tahun`, `bulan`, `voucher`, `status`, `potongan_bendahara`) VALUES
	(145, NULL, 'panitiaPPDB', 1, 6, NULL, 0, 26, 0, 13000, 50000, 0, 0, 8250, 0, 70000, 0, 1524000, 0, 1524000, 38, 0, 0, 2, 0, 1, 0, 54000, 2023, 6, 0, NULL, NULL),
	(146, NULL, '1023272', 1, 6, NULL, 0, 26, 0, 13000, 50000, 0, 0, 8250, 0, 70000, 0, 1524000, 0, 1524000, 38, 0, 0, 2, 0, 2, 0, 54000, 2023, 6, 0, NULL, NULL),
	(147, NULL, '198312042002070354', 1, 7, NULL, 0, 26, 0, 13000, 50000, 0, 0, 8250, 0, 150000, 0, 1604000, 0, 1604000, 38, 0, 0, 2, 0, 2, 0, 54000, 2023, 6, 0, NULL, NULL);

-- Dumping structure for table sigap2.gender
CREATE TABLE IF NOT EXISTS `gender` (
  `id` int NOT NULL AUTO_INCREMENT,
  `gen` varchar(50) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- Dumping data for table sigap2.gender: ~2 rows (approximately)
INSERT INTO `gender` (`id`, `gen`) VALUES
	(1, 'Pria'),
	(2, 'Wanita');

-- Dumping structure for table sigap2.generate_perbulan
CREATE TABLE IF NOT EXISTS `generate_perbulan` (
  `id` int NOT NULL AUTO_INCREMENT,
  `tahun` int DEFAULT NULL,
  `bulan` varchar(50) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=13 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- Dumping data for table sigap2.generate_perbulan: ~12 rows (approximately)
INSERT INTO `generate_perbulan` (`id`, `tahun`, `bulan`) VALUES
	(1, 2023, 'januari,Februari,Maret'),
	(2, 2023, 'januari,Februari,Maret'),
	(3, 2025, 'januari'),
	(4, 2023, 'januari,Februari,Maret'),
	(5, 2023, 'januari,Februari,Maret'),
	(6, 2025, 'januari'),
	(7, 2023, 'januari,Februari'),
	(8, 2023, 'januari,Februari'),
	(9, 2023, 'januari,Februari,Maret'),
	(10, 2023, 'januari,Februari'),
	(11, 2023, '1,2,3'),
	(12, 2023, '1,2');

-- Dumping structure for table sigap2.generate_pertahun
CREATE TABLE IF NOT EXISTS `generate_pertahun` (
  `id` int NOT NULL AUTO_INCREMENT,
  `tahun` int DEFAULT NULL,
  `bulan` varchar(50) DEFAULT NULL,
  `profesi` int DEFAULT NULL,
  `bulan2` int DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=564 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- Dumping data for table sigap2.generate_pertahun: ~8 rows (approximately)
INSERT INTO `generate_pertahun` (`id`, `tahun`, `bulan`, `profesi`, `bulan2`) VALUES
	(468, 2023, NULL, 1, 1),
	(472, 2023, NULL, 2, 1),
	(519, 2023, NULL, NULL, 6),
	(529, 2023, NULL, NULL, 12),
	(535, 2023, NULL, NULL, 11),
	(537, 2023, NULL, NULL, 8),
	(557, 2023, NULL, NULL, 7),
	(563, 2023, NULL, NULL, 2);

-- Dumping structure for table sigap2.generate_pertahun_sd
CREATE TABLE IF NOT EXISTS `generate_pertahun_sd` (
  `id` int NOT NULL AUTO_INCREMENT,
  `tahun` int DEFAULT NULL,
  `bulan` varchar(50) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci DEFAULT NULL,
  `profesi` int DEFAULT NULL,
  `bulan2` int DEFAULT NULL,
  PRIMARY KEY (`id`) USING BTREE
) ENGINE=InnoDB AUTO_INCREMENT=274 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci ROW_FORMAT=DYNAMIC;

-- Dumping data for table sigap2.generate_pertahun_sd: ~3 rows (approximately)
INSERT INTO `generate_pertahun_sd` (`id`, `tahun`, `bulan`, `profesi`, `bulan2`) VALUES
	(267, 2023, NULL, 1, 1),
	(271, 2023, NULL, 2, 1),
	(273, 2023, NULL, NULL, 11);

-- Dumping structure for table sigap2.generate_pertahun_smk
CREATE TABLE IF NOT EXISTS `generate_pertahun_smk` (
  `id` int NOT NULL AUTO_INCREMENT,
  `tahun` int DEFAULT NULL,
  `bulan` varchar(50) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci DEFAULT NULL,
  `profesi` int DEFAULT NULL,
  `bulan2` int DEFAULT NULL,
  PRIMARY KEY (`id`) USING BTREE
) ENGINE=InnoDB AUTO_INCREMENT=181 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci ROW_FORMAT=DYNAMIC;

-- Dumping data for table sigap2.generate_pertahun_smk: ~7 rows (approximately)
INSERT INTO `generate_pertahun_smk` (`id`, `tahun`, `bulan`, `profesi`, `bulan2`) VALUES
	(138, 2023, NULL, 1, 3),
	(140, 2030, NULL, 1, 1),
	(152, 2023, NULL, 3, 12),
	(154, 2023, NULL, 1, 1),
	(158, 2023, NULL, 3, 1),
	(178, 2023, NULL, 2, 1),
	(180, 2023, NULL, NULL, 11);

-- Dumping structure for table sigap2.generate_pertahun_smp
CREATE TABLE IF NOT EXISTS `generate_pertahun_smp` (
  `id` int NOT NULL AUTO_INCREMENT,
  `tahun` int DEFAULT NULL,
  `bulan` varchar(50) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci DEFAULT NULL,
  `profesi` int DEFAULT NULL,
  `bulan2` int DEFAULT NULL,
  PRIMARY KEY (`id`) USING BTREE
) ENGINE=InnoDB AUTO_INCREMENT=211 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci ROW_FORMAT=DYNAMIC;

-- Dumping data for table sigap2.generate_pertahun_smp: ~4 rows (approximately)
INSERT INTO `generate_pertahun_smp` (`id`, `tahun`, `bulan`, `profesi`, `bulan2`) VALUES
	(171, 2023, NULL, 3, 1),
	(199, 2023, NULL, 1, 1),
	(205, 2023, NULL, 2, 1),
	(210, 2023, NULL, NULL, 11);

-- Dumping structure for table sigap2.generate_pertahun_tk
CREATE TABLE IF NOT EXISTS `generate_pertahun_tk` (
  `id` int NOT NULL AUTO_INCREMENT,
  `tahun` int DEFAULT NULL,
  `bulan` varchar(50) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci DEFAULT NULL,
  `profesi` int DEFAULT NULL,
  `bulan2` int DEFAULT NULL,
  PRIMARY KEY (`id`) USING BTREE
) ENGINE=InnoDB AUTO_INCREMENT=381 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci ROW_FORMAT=DYNAMIC;

-- Dumping data for table sigap2.generate_pertahun_tk: ~4 rows (approximately)
INSERT INTO `generate_pertahun_tk` (`id`, `tahun`, `bulan`, `profesi`, `bulan2`) VALUES
	(325, 2023, NULL, 2, 7),
	(372, 2023, NULL, NULL, 1),
	(374, 2023, NULL, NULL, 2),
	(380, 2023, NULL, NULL, 6);

-- Dumping structure for table sigap2.hapus_barang
CREATE TABLE IF NOT EXISTS `hapus_barang` (
  `ID_Hapus` int NOT NULL AUTO_INCREMENT,
  `Kode_Barang` char(3) DEFAULT NULL,
  `Nama_Barang` varchar(20) DEFAULT NULL,
  `Keterangan` text,
  PRIMARY KEY (`ID_Hapus`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

-- Dumping data for table sigap2.hapus_barang: 0 rows
/*!40000 ALTER TABLE `hapus_barang` DISABLE KEYS */;
/*!40000 ALTER TABLE `hapus_barang` ENABLE KEYS */;

-- Dumping structure for table sigap2.hapus_barangnew
CREATE TABLE IF NOT EXISTS `hapus_barangnew` (
  `id_hapus` int NOT NULL AUTO_INCREMENT,
  `kode_barang` varchar(50) DEFAULT NULL,
  `nama_barang` varchar(50) DEFAULT NULL,
  `keterangan` text,
  PRIMARY KEY (`id_hapus`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- Dumping data for table sigap2.hapus_barangnew: ~0 rows (approximately)

-- Dumping structure for table sigap2.ijazah
CREATE TABLE IF NOT EXISTS `ijazah` (
  `id` int NOT NULL AUTO_INCREMENT,
  `name` varchar(50) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- Dumping data for table sigap2.ijazah: ~2 rows (approximately)
INSERT INTO `ijazah` (`id`, `name`) VALUES
	(1, 'SMA'),
	(2, 'S1');

-- Dumping structure for table sigap2.ijin
CREATE TABLE IF NOT EXISTS `ijin` (
  `id` int NOT NULL AUTO_INCREMENT,
  `pegawai` int DEFAULT NULL,
  `tgl` datetime DEFAULT NULL,
  `tgl_ijin_awal` date DEFAULT NULL,
  `tgl_ijin_akhir` date DEFAULT NULL,
  `jenis` varchar(255) DEFAULT NULL,
  `keterangan` varchar(255) DEFAULT NULL,
  `disetujui` varchar(5) DEFAULT NULL,
  `dokumen` varchar(255) DEFAULT NULL,
  PRIMARY KEY (`id`) USING BTREE
) ENGINE=InnoDB DEFAULT CHARSET=latin1 ROW_FORMAT=DYNAMIC;

-- Dumping data for table sigap2.ijin: ~0 rows (approximately)

-- Dumping structure for table sigap2.jabatan
CREATE TABLE IF NOT EXISTS `jabatan` (
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

-- Dumping data for table sigap2.jabatan: ~147 rows (approximately)
INSERT INTO `jabatan` (`id`, `nama_jabatan`, `keterangan`, `c_date`, `u_date`, `c_by`, `u_by`, `aktif`, `jenjang`, `type_jabatan`, `type_guru`) VALUES
	(5, 'Kepala Sekolah', 'baru', NULL, NULL, NULL, NULL, NULL, 4, 1, NULL),
	(6, 'TU', NULL, NULL, NULL, NULL, NULL, NULL, 4, 2, NULL),
	(7, 'Kepala TU', NULL, NULL, NULL, NULL, NULL, NULL, 4, 2, NULL),
	(8, 'Guru BK', NULL, NULL, NULL, NULL, NULL, NULL, 4, 1, NULL),
	(9, 'Guru Mapel', NULL, NULL, NULL, NULL, NULL, NULL, 4, 1, NULL),
	(10, 'Petugas Keamanan', NULL, NULL, NULL, NULL, NULL, NULL, 4, 3, NULL),
	(11, 'Petugas Kebersihan', NULL, NULL, NULL, NULL, NULL, NULL, 4, 3, NULL),
	(12, 'Teknisi Listrik', NULL, NULL, NULL, NULL, NULL, NULL, 4, 3, NULL),
	(13, 'Wali Kelas', 'baru', NULL, NULL, NULL, NULL, NULL, 4, 1, NULL),
	(14, 'Bendahara', NULL, NULL, NULL, NULL, NULL, NULL, 4, 1, NULL),
	(15, 'Wakil Kepala Sekolah', 'baru', NULL, NULL, NULL, NULL, NULL, 4, 1, NULL),
	(16, 'Pustakawan', 'baru', NULL, NULL, NULL, NULL, NULL, 4, 2, NULL),
	(17, 'Teknisi Komputer', 'baru', NULL, NULL, NULL, NULL, NULL, 4, 2, NULL),
	(18, 'Test', NULL, NULL, NULL, NULL, NULL, NULL, 1, NULL, NULL),
	(19, 'Tenaga Kependidikan', NULL, NULL, NULL, NULL, NULL, NULL, 2, NULL, NULL),
	(20, 'Pendidik', NULL, NULL, NULL, NULL, NULL, NULL, 2, NULL, NULL),
	(21, 'Guru Tidak Tetap', NULL, NULL, NULL, NULL, NULL, NULL, 2, NULL, NULL),
	(22, 'Guru Tetap Yayasan', NULL, NULL, NULL, NULL, NULL, NULL, 2, NULL, NULL),
	(23, 'KEPALA SEKOLAH', NULL, NULL, NULL, NULL, NULL, NULL, 3, NULL, NULL),
	(24, 'WAKIL KEPALA SEKOLAH KESISWAAN', NULL, NULL, NULL, NULL, NULL, NULL, 3, NULL, NULL),
	(25, 'WAKIL KEPALA SEKOLAH HUMAS', NULL, NULL, NULL, NULL, NULL, NULL, 3, NULL, NULL),
	(26, 'WAKIL KEPALA SEKOLAH SARANA DAN PRASARANA', NULL, NULL, NULL, NULL, NULL, NULL, 3, NULL, NULL),
	(27, 'WAKIL KEPALA SEKOLAH KURIKULUM', NULL, NULL, NULL, NULL, NULL, NULL, 3, NULL, NULL),
	(28, 'GURU BHS. DAERAH', NULL, NULL, NULL, NULL, NULL, NULL, 3, NULL, NULL),
	(29, 'GURU BHS. INDONESIA', NULL, NULL, NULL, NULL, NULL, NULL, 3, NULL, NULL),
	(30, 'GURU BHS. INGGRIS', NULL, NULL, NULL, NULL, NULL, NULL, 3, NULL, NULL),
	(31, 'GURU BIOLOGI', NULL, NULL, NULL, NULL, NULL, NULL, 3, NULL, NULL),
	(32, 'GURU BK', NULL, NULL, NULL, NULL, NULL, NULL, 3, NULL, NULL),
	(33, 'GURU BKTIK', NULL, NULL, NULL, NULL, NULL, NULL, 3, NULL, NULL),
	(34, 'GURU EKONOMI', NULL, NULL, NULL, NULL, NULL, NULL, 3, NULL, NULL),
	(35, 'GURU FISIKA', NULL, NULL, NULL, NULL, NULL, NULL, 3, NULL, NULL),
	(36, 'GURU GEOGRAFI', NULL, NULL, NULL, NULL, NULL, NULL, 3, NULL, NULL),
	(37, 'GURU KIMIA', NULL, NULL, NULL, NULL, NULL, NULL, 3, NULL, NULL),
	(38, 'GURU MATEMATIKA', NULL, NULL, NULL, NULL, NULL, NULL, 3, NULL, NULL),
	(39, 'GURU PAIDB', NULL, NULL, NULL, NULL, NULL, NULL, 3, NULL, NULL),
	(40, 'GURU PJOK', NULL, NULL, NULL, NULL, NULL, NULL, 3, NULL, NULL),
	(41, 'GURU PKN', NULL, NULL, NULL, NULL, NULL, NULL, 3, NULL, NULL),
	(42, 'GURU SEJARAH', NULL, NULL, NULL, NULL, NULL, NULL, 3, NULL, NULL),
	(43, 'GURU SENI BUDAYA', NULL, NULL, NULL, NULL, NULL, NULL, 3, NULL, NULL),
	(44, 'GURU SOSIOLOGI', NULL, NULL, NULL, NULL, NULL, NULL, 3, NULL, NULL),
	(45, 'KEPALA TU', NULL, NULL, NULL, NULL, NULL, NULL, 3, NULL, NULL),
	(46, 'TU. Bagian Administrasi', NULL, NULL, NULL, NULL, NULL, NULL, 3, NULL, NULL),
	(47, 'TU. Bagian Keuangan', NULL, NULL, NULL, NULL, NULL, NULL, 3, NULL, NULL),
	(48, 'KEPALA PERPUSTAKAAN', NULL, NULL, NULL, NULL, NULL, NULL, 3, NULL, NULL),
	(49, 'PUSTAKAWAN', NULL, NULL, NULL, NULL, NULL, NULL, 3, NULL, NULL),
	(50, 'TEKNISI IT', NULL, NULL, NULL, NULL, NULL, NULL, 3, NULL, NULL),
	(51, 'OB', NULL, NULL, NULL, NULL, NULL, NULL, 3, NULL, NULL),
	(52, 'SATPAM', NULL, NULL, NULL, NULL, NULL, NULL, 3, NULL, NULL),
	(53, 'WALI KELAS', NULL, NULL, NULL, NULL, NULL, NULL, 3, NULL, NULL),
	(54, 'PEMBINA OSIS', NULL, NULL, NULL, NULL, NULL, NULL, 3, NULL, NULL),
	(55, 'STAFF. KEUANGAN BPOPP', NULL, NULL, NULL, NULL, NULL, NULL, 3, NULL, NULL),
	(56, 'STAFF. KEUANGAN BOS', NULL, NULL, NULL, NULL, NULL, NULL, 3, NULL, NULL),
	(57, 'KOORDINATOR SATPAM', NULL, NULL, NULL, NULL, NULL, NULL, 3, NULL, NULL),
	(58, 'KOORDINATOR BK', NULL, NULL, NULL, NULL, NULL, NULL, 3, NULL, NULL),
	(59, 'Kepala Sekoalah', NULL, NULL, NULL, NULL, NULL, NULL, 4, NULL, NULL),
	(60, 'Wakil Kepala Urusan Kurikulum', NULL, NULL, NULL, NULL, NULL, NULL, 4, NULL, NULL),
	(61, 'Wakil Kepala Urusan Kesiswaan', NULL, NULL, NULL, NULL, NULL, NULL, 4, NULL, NULL),
	(62, 'Wakil Kepala Urusan Sarana dan Prasarana', NULL, NULL, NULL, NULL, NULL, NULL, 4, NULL, NULL),
	(63, 'Wakil Kepala Urusan Humas', NULL, NULL, NULL, NULL, NULL, NULL, 4, NULL, NULL),
	(64, 'Kepala Kompetensi Keahlian Multimedia', NULL, NULL, NULL, NULL, NULL, NULL, 4, NULL, NULL),
	(65, 'Kepala Kompetensi Keahlian Otomatisasi dan Tata Kelola Perkantoran', NULL, NULL, NULL, NULL, NULL, NULL, 4, NULL, NULL),
	(66, 'Kepala Kompetensi Keahlian Akutansi dan Keuangan Lembaga', NULL, NULL, NULL, NULL, NULL, NULL, 4, NULL, NULL),
	(67, 'Kepala Laboratoriaum', NULL, NULL, NULL, NULL, NULL, NULL, 4, NULL, NULL),
	(68, 'Pembina OSIS', NULL, NULL, NULL, NULL, NULL, NULL, 4, NULL, NULL),
	(69, 'Kepala Tata Usaha', NULL, NULL, NULL, NULL, NULL, NULL, 4, NULL, NULL),
	(70, 'Peagawai Tata Usaha', NULL, NULL, NULL, NULL, NULL, NULL, 4, NULL, NULL),
	(71, 'Karya wan Kebersihan', NULL, NULL, NULL, NULL, NULL, NULL, 4, NULL, NULL),
	(72, 'Satpam', NULL, NULL, NULL, NULL, NULL, NULL, 4, NULL, NULL),
	(73, 'Wali Kelas X MM 1', NULL, NULL, NULL, NULL, NULL, NULL, 4, NULL, NULL),
	(74, 'Wali Kelas X MM 2', NULL, NULL, NULL, NULL, NULL, NULL, 4, NULL, NULL),
	(75, 'Wali Kelas X MM 3', NULL, NULL, NULL, NULL, NULL, NULL, 4, NULL, NULL),
	(76, 'Wali Kelas X MM 4', NULL, NULL, NULL, NULL, NULL, NULL, 4, NULL, NULL),
	(77, 'Wali Kelas X OTKP 1', NULL, NULL, NULL, NULL, NULL, NULL, 4, NULL, NULL),
	(78, 'Wali Kelas X OTKP 2', NULL, NULL, NULL, NULL, NULL, NULL, 4, NULL, NULL),
	(79, 'Wali Kelas X OTKP 3', NULL, NULL, NULL, NULL, NULL, NULL, 4, NULL, NULL),
	(80, 'Wali Kelas X OTKP 4', NULL, NULL, NULL, NULL, NULL, NULL, 4, NULL, NULL),
	(81, 'Wali Kelas X AKL 1', NULL, NULL, NULL, NULL, NULL, NULL, 4, NULL, NULL),
	(82, 'Wali Kelas X AKL 2', NULL, NULL, NULL, NULL, NULL, NULL, 4, NULL, NULL),
	(83, 'Wali Kelas X AKL 3', NULL, NULL, NULL, NULL, NULL, NULL, 4, NULL, NULL),
	(84, 'Wali Kelas X AKL 4', NULL, NULL, NULL, NULL, NULL, NULL, 4, NULL, NULL),
	(85, 'Wali Kelas XI MM 1', NULL, NULL, NULL, NULL, NULL, NULL, 4, NULL, NULL),
	(86, 'Wali Kelas XI MM 2', NULL, NULL, NULL, NULL, NULL, NULL, 4, NULL, NULL),
	(87, 'Wali Kelas XI MM 3', NULL, NULL, NULL, NULL, NULL, NULL, 4, NULL, NULL),
	(88, 'Wali Kelas XI OTKP 1', NULL, NULL, NULL, NULL, NULL, NULL, 4, NULL, NULL),
	(89, 'Wali Kelas XI OTKP 2', NULL, NULL, NULL, NULL, NULL, NULL, 4, NULL, NULL),
	(90, 'Wali Kelas XI AKL 1', NULL, NULL, NULL, NULL, NULL, NULL, 4, NULL, NULL),
	(91, 'Wali Kelas XI AKL 2', NULL, NULL, NULL, NULL, NULL, NULL, 4, NULL, NULL),
	(92, 'Wali Kelas XI AKL 3', NULL, NULL, NULL, NULL, NULL, NULL, 4, NULL, NULL),
	(93, 'Wali Kelas XII MM 1', NULL, NULL, NULL, NULL, NULL, NULL, 4, NULL, NULL),
	(94, 'Wali Kelas XII MM 2', NULL, NULL, NULL, NULL, NULL, NULL, 4, NULL, NULL),
	(95, 'Wali Kelas XII MM 3', NULL, NULL, NULL, NULL, NULL, NULL, 4, NULL, NULL),
	(96, 'Wali Kelas XII OTKP 1', NULL, NULL, NULL, NULL, NULL, NULL, 4, NULL, NULL),
	(97, 'Wali Kelas XII OTKP 2', NULL, NULL, NULL, NULL, NULL, NULL, 4, NULL, NULL),
	(98, 'Wali Kelas XII OTKP 3', NULL, NULL, NULL, NULL, NULL, NULL, 4, NULL, NULL),
	(99, 'Wali Kelas XII AKL 1', NULL, NULL, NULL, NULL, NULL, NULL, 4, NULL, NULL),
	(100, 'Wali Kelas XII AKL 2', NULL, NULL, NULL, NULL, NULL, NULL, 4, NULL, NULL),
	(101, 'Guru Pendidikan Agama Islam', NULL, NULL, NULL, NULL, NULL, NULL, 4, NULL, NULL),
	(102, 'Guru Pendalaman Agama Islam', NULL, NULL, NULL, NULL, NULL, NULL, 4, NULL, NULL),
	(103, 'Guru PPKn', NULL, NULL, NULL, NULL, NULL, NULL, 4, NULL, NULL),
	(104, 'Guru Bahasa Indonesia', NULL, NULL, NULL, NULL, NULL, NULL, 4, NULL, NULL),
	(105, 'Guru Matematika', NULL, NULL, NULL, NULL, NULL, NULL, 4, NULL, NULL),
	(106, 'Guru Bahasa Inggris', NULL, NULL, NULL, NULL, NULL, NULL, 4, NULL, NULL),
	(107, 'Guru Sejarah Indonesia', NULL, NULL, NULL, NULL, NULL, NULL, 4, NULL, NULL),
	(108, 'Guru Seni Budaya', NULL, NULL, NULL, NULL, NULL, NULL, 4, NULL, NULL),
	(109, 'Guru PJOK', NULL, NULL, NULL, NULL, NULL, NULL, 4, NULL, NULL),
	(110, 'Guru Bahasa Daerah', NULL, NULL, NULL, NULL, NULL, NULL, 4, NULL, NULL),
	(111, 'Guru Bimbingan dan Konseling', NULL, NULL, NULL, NULL, NULL, NULL, 4, NULL, NULL),
	(112, 'Guru Sistem dan Komunikasi Digital', NULL, NULL, NULL, NULL, NULL, NULL, 4, NULL, NULL),
	(113, 'Guru Fisika', NULL, NULL, NULL, NULL, NULL, NULL, 4, NULL, NULL),
	(114, 'Guru Kimia', NULL, NULL, NULL, NULL, NULL, NULL, 4, NULL, NULL),
	(115, 'Guru Administrasi Umum', NULL, NULL, NULL, NULL, NULL, NULL, 4, NULL, NULL),
	(116, 'Guru Ekonomi Bisnis', NULL, NULL, NULL, NULL, NULL, NULL, 4, NULL, NULL),
	(117, 'Guru IPA', NULL, NULL, NULL, NULL, NULL, NULL, 4, NULL, NULL),
	(118, 'Guru Dasar Desain Grafis', NULL, NULL, NULL, NULL, NULL, NULL, 4, NULL, NULL),
	(119, 'Guru Pemrograman Dasar', NULL, NULL, NULL, NULL, NULL, NULL, 4, NULL, NULL),
	(120, 'Guru Sistem Komputer', NULL, NULL, NULL, NULL, NULL, NULL, 4, NULL, NULL),
	(121, 'Guru Komputer dan Jaringan Dasar', NULL, NULL, NULL, NULL, NULL, NULL, 4, NULL, NULL),
	(122, 'Guru Kearsipan', NULL, NULL, NULL, NULL, NULL, NULL, 4, NULL, NULL),
	(123, 'Guru Teknologi Perkantoran', NULL, NULL, NULL, NULL, NULL, NULL, 4, NULL, NULL),
	(124, 'Guru Korespondensi', NULL, NULL, NULL, NULL, NULL, NULL, 4, NULL, NULL),
	(125, 'Guru Akutansi Dasar', NULL, NULL, NULL, NULL, NULL, NULL, 4, NULL, NULL),
	(126, 'Guru Aplikasi Pengolahan Angka', NULL, NULL, NULL, NULL, NULL, NULL, 4, NULL, NULL),
	(127, 'Guru Etika Profesi', NULL, NULL, NULL, NULL, NULL, NULL, 4, NULL, NULL),
	(128, 'Guru Perbankan Dasar', NULL, NULL, NULL, NULL, NULL, NULL, 4, NULL, NULL),
	(129, 'Guru Desain Grafis Percetakan', NULL, NULL, NULL, NULL, NULL, NULL, 4, NULL, NULL),
	(130, 'Guru Animasi 2 Dimensi dan 3 Dimensi', NULL, NULL, NULL, NULL, NULL, NULL, 4, NULL, NULL),
	(131, 'Guru Desain Media Interaktif', NULL, NULL, NULL, NULL, NULL, NULL, 4, NULL, NULL),
	(132, 'Guru Teknik Pengolahan Audio dan Video', NULL, NULL, NULL, NULL, NULL, NULL, 4, NULL, NULL),
	(133, 'Guru Produk Kreatif dan Kewirausahaan Multimedia', NULL, NULL, NULL, NULL, NULL, NULL, 4, NULL, NULL),
	(134, 'Guru Otomatisasi Tata Kelola Kepegawaian', NULL, NULL, NULL, NULL, NULL, NULL, 4, NULL, NULL),
	(135, 'Guru Otomatisasi Tata Kelola Keuangan', NULL, NULL, NULL, NULL, NULL, NULL, 4, NULL, NULL),
	(136, 'Guru Otomatisasi Tata Kelola Sarana dan Prasarana', NULL, NULL, NULL, NULL, NULL, NULL, 4, NULL, NULL),
	(137, 'Guru Otomatisasi Tata Kelola Humas dan Keprotokolan', NULL, NULL, NULL, NULL, NULL, NULL, 4, NULL, NULL),
	(138, 'Guru Produk Kreatif dan Kewirausahaan Otomatisasi dan Tata Kelola Perkantoran', NULL, NULL, NULL, NULL, NULL, NULL, 4, NULL, NULL),
	(139, 'Guru Pratikum Akutansi Perusahaan Jasa, Dagang, dan Manufaktur', NULL, NULL, NULL, NULL, NULL, NULL, 4, NULL, NULL),
	(140, 'Guru Pratikum Akutansi Lembaga/Instansi Pemerintah', NULL, NULL, NULL, NULL, NULL, NULL, 4, NULL, NULL),
	(141, 'Guru Akutansi Keuangan', NULL, NULL, NULL, NULL, NULL, NULL, 4, NULL, NULL),
	(142, 'Guru Komputer Akutansi', NULL, NULL, NULL, NULL, NULL, NULL, 4, NULL, NULL),
	(143, 'Guru Administrasi Pajak', NULL, NULL, NULL, NULL, NULL, NULL, 4, NULL, NULL),
	(144, 'Guru Produk Kreatif dan Kewirausahaan Akutansi dan Keuangan Lembaga', NULL, NULL, NULL, NULL, NULL, NULL, 4, NULL, NULL),
	(145, 'Kepala Perpustakaan', NULL, NULL, NULL, NULL, NULL, NULL, 4, NULL, NULL),
	(146, 'Ka. TU', 'Ka. TU', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
	(147, 'Bendahara Sekolah ', 'Bendahara Sekolah ', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
	(148, 'Koord BK', 'Koord BK', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
	(149, 'Staff. BPOPP', 'Staff. BPOPP', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
	(150, 'Staff. BOS', 'Staff. BOS', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
	(151, 'Pengurus Yayasan', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL);

-- Dumping structure for table sigap2.jenis_barang
CREATE TABLE IF NOT EXISTS `jenis_barang` (
  `id` int NOT NULL AUTO_INCREMENT,
  `nama` varchar(255) DEFAULT NULL,
  `aktif` varchar(255) DEFAULT NULL,
  PRIMARY KEY (`id`) USING BTREE
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=latin1 ROW_FORMAT=DYNAMIC;

-- Dumping data for table sigap2.jenis_barang: ~2 rows (approximately)
INSERT INTO `jenis_barang` (`id`, `nama`, `aktif`) VALUES
	(1, 'Elektronik', '1'),
	(2, 'Perlengkapan', '1');

-- Dumping structure for table sigap2.jenis_dinasluar
CREATE TABLE IF NOT EXISTS `jenis_dinasluar` (
  `id` int NOT NULL AUTO_INCREMENT,
  `nama` varchar(255) DEFAULT NULL,
  `aktif` varchar(255) DEFAULT NULL,
  PRIMARY KEY (`id`) USING BTREE
) ENGINE=InnoDB DEFAULT CHARSET=latin1 ROW_FORMAT=DYNAMIC;

-- Dumping data for table sigap2.jenis_dinasluar: ~0 rows (approximately)

-- Dumping structure for table sigap2.jenis_grup_berita
CREATE TABLE IF NOT EXISTS `jenis_grup_berita` (
  `id` int NOT NULL AUTO_INCREMENT,
  `nama` varchar(255) DEFAULT NULL,
  `aktif` varchar(255) DEFAULT NULL,
  PRIMARY KEY (`id`) USING BTREE
) ENGINE=InnoDB DEFAULT CHARSET=latin1 ROW_FORMAT=DYNAMIC;

-- Dumping data for table sigap2.jenis_grup_berita: ~0 rows (approximately)

-- Dumping structure for table sigap2.jenis_grup_ilmu
CREATE TABLE IF NOT EXISTS `jenis_grup_ilmu` (
  `id` int NOT NULL AUTO_INCREMENT,
  `nama` varchar(255) DEFAULT NULL,
  `aktif` varchar(255) DEFAULT NULL,
  PRIMARY KEY (`id`) USING BTREE
) ENGINE=InnoDB DEFAULT CHARSET=latin1 ROW_FORMAT=DYNAMIC;

-- Dumping data for table sigap2.jenis_grup_ilmu: ~0 rows (approximately)

-- Dumping structure for table sigap2.jenis_ijin
CREATE TABLE IF NOT EXISTS `jenis_ijin` (
  `id` int NOT NULL AUTO_INCREMENT,
  `nama` varchar(255) DEFAULT NULL,
  `aktif` varchar(255) DEFAULT NULL,
  `value` bigint DEFAULT NULL,
  `valueperjam` bigint DEFAULT NULL,
  `jabatan_id` int DEFAULT NULL,
  `jenjang_id` int DEFAULT NULL,
  PRIMARY KEY (`id`) USING BTREE
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=latin1 ROW_FORMAT=DYNAMIC;

-- Dumping data for table sigap2.jenis_ijin: ~2 rows (approximately)
INSERT INTO `jenis_ijin` (`id`, `nama`, `aktif`, `value`, `valueperjam`, `jabatan_id`, `jenjang_id`) VALUES
	(1, 'izin', '1', 4200, 23000, 1, 1),
	(2, 'sakit', '1', 4000, 20000, 2, 1);

-- Dumping structure for table sigap2.jenis_jabatan
CREATE TABLE IF NOT EXISTS `jenis_jabatan` (
  `id` int NOT NULL AUTO_INCREMENT,
  `name` varchar(50) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- Dumping data for table sigap2.jenis_jabatan: ~3 rows (approximately)
INSERT INTO `jenis_jabatan` (`id`, `name`) VALUES
	(1, 'Pimpinan &amp; Guru'),
	(2, 'Tenaga Kependidikan'),
	(3, 'Karyawan');

-- Dumping structure for table sigap2.jenis_lembur
CREATE TABLE IF NOT EXISTS `jenis_lembur` (
  `id` int NOT NULL AUTO_INCREMENT,
  `nama` varchar(255) DEFAULT NULL,
  `aktif` varchar(255) DEFAULT NULL,
  PRIMARY KEY (`id`) USING BTREE
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=latin1 ROW_FORMAT=DYNAMIC;

-- Dumping data for table sigap2.jenis_lembur: ~0 rows (approximately)
INSERT INTO `jenis_lembur` (`id`, `nama`, `aktif`) VALUES
	(1, 'Kejar deadline', '1');

-- Dumping structure for table sigap2.komentar
CREATE TABLE IF NOT EXISTS `komentar` (
  `id` int NOT NULL AUTO_INCREMENT,
  `pid` int DEFAULT NULL,
  `komentar` varchar(500) DEFAULT NULL,
  `gambar` varchar(255) DEFAULT NULL,
  `video` varchar(255) DEFAULT NULL,
  `pegawai` int DEFAULT NULL,
  PRIMARY KEY (`id`) USING BTREE
) ENGINE=InnoDB DEFAULT CHARSET=latin1 ROW_FORMAT=DYNAMIC;

-- Dumping data for table sigap2.komentar: ~0 rows (approximately)

-- Dumping structure for table sigap2.lembur
CREATE TABLE IF NOT EXISTS `lembur` (
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

-- Dumping data for table sigap2.lembur: ~0 rows (approximately)

-- Dumping structure for table sigap2.mpendidikan
CREATE TABLE IF NOT EXISTS `mpendidikan` (
  `id` int NOT NULL AUTO_INCREMENT,
  `name` varchar(50) NOT NULL DEFAULT '0',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=11 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- Dumping data for table sigap2.mpendidikan: ~10 rows (approximately)
INSERT INTO `mpendidikan` (`id`, `name`) VALUES
	(1, 'SD'),
	(2, 'SMP'),
	(3, 'SMA'),
	(4, 'SMK'),
	(5, 'D1'),
	(6, 'D2'),
	(7, 'D3'),
	(8, 'S1'),
	(9, 'S2'),
	(10, 'S3');

-- Dumping structure for table sigap2.m_bpjs
CREATE TABLE IF NOT EXISTS `m_bpjs` (
  `id` int NOT NULL AUTO_INCREMENT,
  `golongan` varchar(50) DEFAULT NULL,
  `golongan_id` int DEFAULT NULL,
  `value` bigint DEFAULT NULL,
  `jenjang` int DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=16 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- Dumping data for table sigap2.m_bpjs: ~15 rows (approximately)
INSERT INTO `m_bpjs` (`id`, `golongan`, `golongan_id`, `value`, `jenjang`) VALUES
	(1, 'I', 1, 150000, 1),
	(2, 'II', 2, 100000, 1),
	(3, 'III', 3, 35000, 1),
	(4, 'I', 1, 150000, 2),
	(5, 'II', 2, 100000, 2),
	(6, 'III', 3, 35000, 2),
	(7, 'I', 1, 150000, 3),
	(8, 'II', 2, 100000, 3),
	(9, 'III', 3, 35000, 3),
	(10, 'I', 1, 150000, 4),
	(11, 'II', 2, 100000, 4),
	(12, 'III', 3, 35000, 4),
	(13, 'I', 1, 150000, 5),
	(14, 'II', 2, 100000, 5),
	(15, 'III', 3, 35000, 5);

-- Dumping structure for table sigap2.m_inval
CREATE TABLE IF NOT EXISTS `m_inval` (
  `id` int NOT NULL AUTO_INCREMENT,
  `jenjang_id` int DEFAULT NULL,
  `jabatan_id` int DEFAULT NULL,
  `value` bigint DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=17 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- Dumping data for table sigap2.m_inval: ~15 rows (approximately)
INSERT INTO `m_inval` (`id`, `jenjang_id`, `jabatan_id`, `value`) VALUES
	(1, 4, 1, 66000),
	(3, 2, 1, 66000),
	(4, 3, 1, 66000),
	(5, 5, 1, 66000),
	(6, 1, 1, 66000),
	(7, 2, 2, 66000),
	(8, 2, 3, 66000),
	(9, 4, 2, 66000),
	(10, 4, 3, 66000),
	(11, 3, 2, 66000),
	(12, 3, 3, 66000),
	(13, 5, 2, 66000),
	(14, 5, 3, 66000),
	(15, 1, 2, 66000),
	(16, 1, 3, 66000);

-- Dumping structure for table sigap2.m_iuran_hari_tua
CREATE TABLE IF NOT EXISTS `m_iuran_hari_tua` (
  `id` int NOT NULL AUTO_INCREMENT,
  `unit` int DEFAULT NULL,
  `value` decimal(20,6) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- Dumping data for table sigap2.m_iuran_hari_tua: ~3 rows (approximately)
INSERT INTO `m_iuran_hari_tua` (`id`, `unit`, `value`) VALUES
	(1, 1, 0.000000),
	(2, 4, 0.020000),
	(3, 5, 0.020000);

-- Dumping structure for table sigap2.m_jaminan_pensiun
CREATE TABLE IF NOT EXISTS `m_jaminan_pensiun` (
  `id` int NOT NULL AUTO_INCREMENT,
  `unit` int DEFAULT NULL,
  `value` decimal(20,6) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- Dumping data for table sigap2.m_jaminan_pensiun: ~2 rows (approximately)
INSERT INTO `m_jaminan_pensiun` (`id`, `unit`, `value`) VALUES
	(1, 1, 0.000000),
	(2, 4, 0.010000);

-- Dumping structure for view sigap2.m_jp_pegawai
-- Creating temporary table to overcome VIEW dependency errors
CREATE TABLE `m_jp_pegawai` (
	`id` INT(10) NOT NULL,
	`nip` VARCHAR(50) NULL COLLATE 'latin1_swedish_ci',
	`jenjang_id` INT(10) NULL,
	`nama` VARCHAR(255) NULL COLLATE 'latin1_swedish_ci',
	`kehadiran` INT(10) NULL,
	`jjm` INT(10) NULL,
	`jabatan` INT(10) NULL,
	`type` INT(10) NULL
) ENGINE=MyISAM;

-- Dumping structure for table sigap2.m_karyawan_sd
CREATE TABLE IF NOT EXISTS `m_karyawan_sd` (
  `id` int NOT NULL AUTO_INCREMENT,
  `tahun` smallint DEFAULT NULL,
  `bulan` int DEFAULT NULL,
  `datetime` datetime DEFAULT NULL,
  `createby` int DEFAULT NULL,
  PRIMARY KEY (`id`) USING BTREE
) ENGINE=InnoDB AUTO_INCREMENT=10 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci ROW_FORMAT=DYNAMIC;

-- Dumping data for table sigap2.m_karyawan_sd: ~5 rows (approximately)
INSERT INTO `m_karyawan_sd` (`id`, `tahun`, `bulan`, `datetime`, `createby`) VALUES
	(4, 2024, 12, NULL, NULL),
	(5, 2024, 12, NULL, NULL),
	(6, 2023, 12, NULL, NULL),
	(7, 2024, 1, NULL, NULL),
	(9, 2023, 11, NULL, NULL);

-- Dumping structure for table sigap2.m_karyawan_sma
CREATE TABLE IF NOT EXISTS `m_karyawan_sma` (
  `id` int NOT NULL AUTO_INCREMENT,
  `tahun` smallint DEFAULT NULL,
  `bulan` int DEFAULT NULL,
  `datetime` datetime DEFAULT NULL,
  `createby` int DEFAULT NULL,
  PRIMARY KEY (`id`) USING BTREE
) ENGINE=InnoDB AUTO_INCREMENT=89 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci ROW_FORMAT=DYNAMIC;

-- Dumping data for table sigap2.m_karyawan_sma: ~7 rows (approximately)
INSERT INTO `m_karyawan_sma` (`id`, `tahun`, `bulan`, `datetime`, `createby`) VALUES
	(66, 2023, 1, NULL, NULL),
	(72, 2023, 6, NULL, NULL),
	(77, 2023, 12, NULL, NULL),
	(80, 2023, 11, NULL, NULL),
	(81, 2023, 8, NULL, NULL),
	(87, 2023, 7, NULL, NULL),
	(88, 2023, 2, NULL, NULL);

-- Dumping structure for table sigap2.m_karyawan_smk
CREATE TABLE IF NOT EXISTS `m_karyawan_smk` (
  `id` int NOT NULL AUTO_INCREMENT,
  `tahun` smallint DEFAULT NULL,
  `bulan` int DEFAULT NULL,
  `datetime` datetime DEFAULT NULL,
  `createby` int DEFAULT NULL,
  PRIMARY KEY (`id`) USING BTREE
) ENGINE=InnoDB AUTO_INCREMENT=11 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci ROW_FORMAT=DYNAMIC;

-- Dumping data for table sigap2.m_karyawan_smk: ~3 rows (approximately)
INSERT INTO `m_karyawan_smk` (`id`, `tahun`, `bulan`, `datetime`, `createby`) VALUES
	(8, 2023, 12, NULL, NULL),
	(9, 2023, 1, NULL, NULL),
	(10, 2023, 11, NULL, NULL);

-- Dumping structure for table sigap2.m_karyawan_smp
CREATE TABLE IF NOT EXISTS `m_karyawan_smp` (
  `id` int NOT NULL AUTO_INCREMENT,
  `tahun` smallint DEFAULT NULL,
  `bulan` int DEFAULT NULL,
  `datetime` datetime DEFAULT NULL,
  `createby` int DEFAULT NULL,
  PRIMARY KEY (`id`) USING BTREE
) ENGINE=InnoDB AUTO_INCREMENT=14 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci ROW_FORMAT=DYNAMIC;

-- Dumping data for table sigap2.m_karyawan_smp: ~2 rows (approximately)
INSERT INTO `m_karyawan_smp` (`id`, `tahun`, `bulan`, `datetime`, `createby`) VALUES
	(4, 2023, 1, NULL, NULL),
	(13, 2023, 11, NULL, NULL);

-- Dumping structure for table sigap2.m_karyawan_tk
CREATE TABLE IF NOT EXISTS `m_karyawan_tk` (
  `id` int NOT NULL AUTO_INCREMENT,
  `tahun` smallint DEFAULT NULL,
  `bulan` int DEFAULT NULL,
  `datetime` datetime DEFAULT NULL,
  `createby` int DEFAULT NULL,
  PRIMARY KEY (`id`) USING BTREE
) ENGINE=InnoDB AUTO_INCREMENT=71 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci ROW_FORMAT=DYNAMIC;

-- Dumping data for table sigap2.m_karyawan_tk: ~6 rows (approximately)
INSERT INTO `m_karyawan_tk` (`id`, `tahun`, `bulan`, `datetime`, `createby`) VALUES
	(28, 2023, 3, NULL, NULL),
	(48, 2023, 12, NULL, NULL),
	(52, 2023, 11, NULL, NULL),
	(66, 2023, 1, NULL, NULL),
	(67, 2023, 2, NULL, NULL),
	(70, 2023, 6, NULL, NULL);

-- Dumping structure for table sigap2.m_kehadiran
CREATE TABLE IF NOT EXISTS `m_kehadiran` (
  `id` int NOT NULL AUTO_INCREMENT,
  `jenjang` int DEFAULT NULL,
  `jenis_jabatan` int DEFAULT NULL,
  `sertif` int DEFAULT NULL,
  `value` bigint DEFAULT NULL,
  `jabatan` int DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=33 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- Dumping data for table sigap2.m_kehadiran: ~32 rows (approximately)
INSERT INTO `m_kehadiran` (`id`, `jenjang`, `jenis_jabatan`, `sertif`, `value`, `jabatan`) VALUES
	(1, 4, 1, 1, 56000, NULL),
	(2, 4, 1, 2, 66000, NULL),
	(3, 4, 2, NULL, 54000, NULL),
	(4, 4, 3, NULL, 60000, 10),
	(5, 4, 3, NULL, 60000, 11),
	(6, 4, 3, NULL, 75000, 12),
	(7, 3, 1, 1, 56000, NULL),
	(8, 3, 1, 2, 66000, NULL),
	(9, 3, 2, NULL, 54000, NULL),
	(10, 3, 3, NULL, 60000, 10),
	(11, 3, 3, NULL, 60000, 11),
	(12, 3, 3, NULL, 75000, 12),
	(13, 2, 1, 1, 56000, NULL),
	(14, 2, 1, 2, 66000, NULL),
	(15, 2, 2, NULL, 54000, NULL),
	(16, 2, 3, NULL, 60000, 10),
	(17, 2, 3, NULL, 60000, 11),
	(18, 2, 3, NULL, 75000, 12),
	(19, 5, 1, 1, 56000, NULL),
	(20, 1, 1, 1, 56000, NULL),
	(21, 5, 1, 2, 66000, NULL),
	(22, 5, 2, NULL, 54000, NULL),
	(23, 5, 3, NULL, 60000, 10),
	(24, 5, 3, NULL, 60000, 11),
	(25, 5, 3, NULL, 75000, 12),
	(26, 1, 1, 2, 66000, NULL),
	(27, 1, 2, NULL, 54000, NULL),
	(28, 1, 3, NULL, 60000, 10),
	(29, 1, 3, NULL, 60000, 11),
	(30, 1, 3, NULL, 75000, 12),
	(31, 2, NULL, NULL, 65500, 7),
	(32, 2, NULL, NULL, 54500, 6);

-- Dumping structure for table sigap2.m_lembur
CREATE TABLE IF NOT EXISTS `m_lembur` (
  `id` int NOT NULL AUTO_INCREMENT,
  `jenjang_id` int DEFAULT NULL,
  `jabatan_id` int DEFAULT NULL,
  `value_perjam` bigint DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- Dumping data for table sigap2.m_lembur: ~5 rows (approximately)
INSERT INTO `m_lembur` (`id`, `jenjang_id`, `jabatan_id`, `value_perjam`) VALUES
	(1, 4, NULL, 13000),
	(2, 2, NULL, 13000),
	(3, 3, NULL, 13000),
	(4, 5, NULL, 13000),
	(5, 1, NULL, 13000);

-- Dumping structure for table sigap2.m_penyesuaian
CREATE TABLE IF NOT EXISTS `m_penyesuaian` (
  `id` int NOT NULL AUTO_INCREMENT,
  `bulan` int DEFAULT NULL,
  `tahun` int DEFAULT NULL,
  `c_by` int DEFAULT NULL,
  `datetime` datetime DEFAULT NULL,
  `import_file` text,
  PRIMARY KEY (`id`) USING BTREE
) ENGINE=InnoDB AUTO_INCREMENT=41 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- Dumping data for table sigap2.m_penyesuaian: ~10 rows (approximately)
INSERT INTO `m_penyesuaian` (`id`, `bulan`, `tahun`, `c_by`, `datetime`, `import_file`) VALUES
	(6, 11, 2023, 31, '2023-02-14 04:02:59', 'Template Penyesuaian (1).xlsx'),
	(8, 7, 2023, 31, '2023-02-14 04:39:24', 'Template Penyesuaian (3).xlsx'),
	(9, 5, 2023, 31, '2023-02-14 06:41:47', 'Template Penyesuaian (4).xlsx'),
	(14, 8, 2023, 31, '2023-02-14 06:52:22', 'Template Penyesuaian (2).xlsx'),
	(15, 3, 2023, 31, '2023-02-14 06:54:42', 'Template Penyesuaian (6).xlsx'),
	(28, 10, 2023, 31, '2023-02-14 07:11:55', 'Template Penyesuaian (2).xlsx'),
	(29, 4, 2023, 31, '2023-02-14 07:14:01', 'Template Penyesuaian (9).xlsx'),
	(35, 6, 2023, 31, '2023-02-14 07:19:00', 'Template Penyesuaian (2).xlsx'),
	(37, 12, 2023, 31, '2023-02-14 07:28:33', 'Template Penyesuaian (12).xlsx'),
	(40, 9, 2023, NULL, '2023-02-17 04:19:01', 'penyesuaian TK(2).xlsx');

-- Dumping structure for table sigap2.m_piket
CREATE TABLE IF NOT EXISTS `m_piket` (
  `id` int NOT NULL AUTO_INCREMENT,
  `jenjang` int DEFAULT NULL,
  `type_jabatan` int DEFAULT NULL,
  `jenis_sertif` int DEFAULT NULL,
  `value` bigint DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=18 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- Dumping data for table sigap2.m_piket: ~16 rows (approximately)
INSERT INTO `m_piket` (`id`, `jenjang`, `type_jabatan`, `jenis_sertif`, `value`) VALUES
	(1, 4, 1, 1, 7000),
	(2, 4, 1, 2, 8250),
	(3, 5, 1, 1, 7000),
	(4, 5, 1, 2, 8250),
	(5, 1, 1, 1, 7000),
	(6, 1, 1, 2, 8250),
	(7, 2, 1, 1, 7000),
	(8, 2, 1, 2, 8250),
	(9, 3, 1, 1, 7000),
	(10, 3, 1, 2, 8250),
	(11, 4, 2, NULL, 8250),
	(13, 4, 3, NULL, 5600),
	(14, 2, 2, NULL, 8250),
	(15, 3, 2, NULL, 8250),
	(16, 5, 2, NULL, 8250),
	(17, 1, 2, NULL, 8250);

-- Dumping structure for table sigap2.m_potongan
CREATE TABLE IF NOT EXISTS `m_potongan` (
  `id` int NOT NULL AUTO_INCREMENT,
  `bulan` int DEFAULT NULL,
  `tahun` int DEFAULT NULL,
  `c_by` int DEFAULT NULL,
  `datetime` datetime DEFAULT NULL,
  `import_file` text,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- Dumping data for table sigap2.m_potongan: ~0 rows (approximately)

-- Dumping structure for table sigap2.m_potongan_sd
CREATE TABLE IF NOT EXISTS `m_potongan_sd` (
  `id` int NOT NULL AUTO_INCREMENT,
  `bulan` int DEFAULT NULL,
  `tahun` int DEFAULT NULL,
  `c_by` int DEFAULT NULL,
  `datetime` datetime DEFAULT NULL,
  `import_file` text,
  PRIMARY KEY (`id`) USING BTREE
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci ROW_FORMAT=DYNAMIC;

-- Dumping data for table sigap2.m_potongan_sd: ~2 rows (approximately)
INSERT INTO `m_potongan_sd` (`id`, `bulan`, `tahun`, `c_by`, `datetime`, `import_file`) VALUES
	(1, 3, NULL, -1, '2023-01-25 04:08:51', 'contoh.xlsx'),
	(2, 3, NULL, -1, '2023-01-25 04:18:49', 'contoh(1).xlsx');

-- Dumping structure for table sigap2.m_potongan_sma
CREATE TABLE IF NOT EXISTS `m_potongan_sma` (
  `id` int NOT NULL AUTO_INCREMENT,
  `bulan` int DEFAULT NULL,
  `tahun` int DEFAULT NULL,
  `c_by` int DEFAULT NULL,
  `datetime` datetime DEFAULT NULL,
  `import_file` text,
  PRIMARY KEY (`id`) USING BTREE
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci ROW_FORMAT=DYNAMIC;

-- Dumping data for table sigap2.m_potongan_sma: ~4 rows (approximately)
INSERT INTO `m_potongan_sma` (`id`, `bulan`, `tahun`, `c_by`, `datetime`, `import_file`) VALUES
	(1, 1, 2023, -1, '2023-01-24 04:03:49', NULL),
	(2, 4, 2023, -1, '2023-01-24 04:07:21', NULL),
	(3, 4, 2023, -1, '2023-01-25 03:18:02', NULL),
	(4, 3, 2023, -1, '2023-01-25 04:20:14', 'contoh(2).xlsx');

-- Dumping structure for table sigap2.m_potongan_smk
CREATE TABLE IF NOT EXISTS `m_potongan_smk` (
  `id` int NOT NULL AUTO_INCREMENT,
  `bulan` int DEFAULT NULL,
  `tahun` int DEFAULT NULL,
  `c_by` int DEFAULT NULL,
  `datetime` datetime DEFAULT NULL,
  `import_file` text,
  PRIMARY KEY (`id`) USING BTREE
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci ROW_FORMAT=DYNAMIC;

-- Dumping data for table sigap2.m_potongan_smk: ~3 rows (approximately)
INSERT INTO `m_potongan_smk` (`id`, `bulan`, `tahun`, `c_by`, `datetime`, `import_file`) VALUES
	(1, 4, 2023, -1, '2023-01-25 07:09:34', NULL),
	(2, 4, 2023, -1, '2023-01-25 07:10:45', NULL),
	(3, 4, 2023, -1, '2023-01-25 07:11:08', NULL);

-- Dumping structure for table sigap2.m_potongan_smp
CREATE TABLE IF NOT EXISTS `m_potongan_smp` (
  `id` int NOT NULL AUTO_INCREMENT,
  `bulan` int DEFAULT NULL,
  `tahun` int DEFAULT NULL,
  `c_by` int DEFAULT NULL,
  `datetime` datetime DEFAULT NULL,
  `import_file` text,
  PRIMARY KEY (`id`) USING BTREE
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci ROW_FORMAT=DYNAMIC;

-- Dumping data for table sigap2.m_potongan_smp: ~0 rows (approximately)

-- Dumping structure for table sigap2.m_pph21
CREATE TABLE IF NOT EXISTS `m_pph21` (
  `id` int NOT NULL AUTO_INCREMENT,
  `unit` int DEFAULT NULL,
  `value1` decimal(20,6) DEFAULT NULL,
  `value2` decimal(20,6) DEFAULT NULL,
  `value3` decimal(20,6) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- Dumping data for table sigap2.m_pph21: ~0 rows (approximately)
INSERT INTO `m_pph21` (`id`, `unit`, `value1`, `value2`, `value3`) VALUES
	(1, 4, 1.200000, 0.050000, 0.500000);

-- Dumping structure for table sigap2.m_pulangcepat
CREATE TABLE IF NOT EXISTS `m_pulangcepat` (
  `id` int NOT NULL AUTO_INCREMENT,
  `jenjang_id` int DEFAULT NULL,
  `jabatan_id` int DEFAULT NULL,
  `perjam` bigint DEFAULT NULL,
  `perhari` bigint DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- Dumping data for table sigap2.m_pulangcepat: ~2 rows (approximately)
INSERT INTO `m_pulangcepat` (`id`, `jenjang_id`, `jabatan_id`, `perjam`, `perhari`) VALUES
	(1, 1, 1, 7000, 20000),
	(2, 1, 2, 3000, 18000);

-- Dumping structure for table sigap2.m_reward
CREATE TABLE IF NOT EXISTS `m_reward` (
  `id` int NOT NULL AUTO_INCREMENT,
  `jenjang` int DEFAULT NULL,
  `jabatan` int DEFAULT NULL,
  `min_jmlh_masuk` int DEFAULT NULL,
  `value` bigint DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=8 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- Dumping data for table sigap2.m_reward: ~5 rows (approximately)
INSERT INTO `m_reward` (`id`, `jenjang`, `jabatan`, `min_jmlh_masuk`, `value`) VALUES
	(1, 4, NULL, NULL, 50000),
	(4, 2, NULL, NULL, 50000),
	(5, 3, NULL, NULL, 50000),
	(6, 5, NULL, NULL, 50000),
	(7, 1, NULL, NULL, 50000);

-- Dumping structure for table sigap2.m_sakit
CREATE TABLE IF NOT EXISTS `m_sakit` (
  `id` int NOT NULL AUTO_INCREMENT,
  `jenjang_id` int DEFAULT NULL,
  `jabatan` int DEFAULT NULL,
  `perhari` bigint DEFAULT NULL,
  `perjam` bigint DEFAULT NULL,
  `sertif` int DEFAULT NULL,
  `type` int DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=8 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- Dumping data for table sigap2.m_sakit: ~7 rows (approximately)
INSERT INTO `m_sakit` (`id`, `jenjang_id`, `jabatan`, `perhari`, `perjam`, `sertif`, `type`) VALUES
	(1, 4, 6, 27250, 3406, NULL, 2),
	(2, 4, 8, NULL, 6600, NULL, 1),
	(3, 4, 9, NULL, 7000, 1, 1),
	(4, 4, 9, NULL, 8250, 2, 1),
	(5, 4, 11, 30000, 3750, NULL, 3),
	(6, 4, 12, 37500, 4688, NULL, 3),
	(7, 4, 10, 30000, 3750, NULL, 3);

-- Dumping structure for table sigap2.m_sd
CREATE TABLE IF NOT EXISTS `m_sd` (
  `id` int NOT NULL AUTO_INCREMENT,
  `tahun` year DEFAULT NULL,
  `bulan` int DEFAULT NULL,
  `datetime` datetime DEFAULT NULL,
  `createby` int DEFAULT NULL,
  PRIMARY KEY (`id`) USING BTREE
) ENGINE=InnoDB AUTO_INCREMENT=249 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci ROW_FORMAT=DYNAMIC;

-- Dumping data for table sigap2.m_sd: ~2 rows (approximately)
INSERT INTO `m_sd` (`id`, `tahun`, `bulan`, `datetime`, `createby`) VALUES
	(247, '2023', 1, NULL, NULL),
	(248, '2023', 11, NULL, NULL);

-- Dumping structure for table sigap2.m_semeter
CREATE TABLE IF NOT EXISTS `m_semeter` (
  `id` int NOT NULL AUTO_INCREMENT,
  `smtr` varchar(50) DEFAULT NULL,
  `bulan` int DEFAULT NULL,
  `detil_smtr` int DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=15 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- Dumping data for table sigap2.m_semeter: ~12 rows (approximately)
INSERT INTO `m_semeter` (`id`, `smtr`, `bulan`, `detil_smtr`) VALUES
	(2, 'Genap', 7, 1),
	(3, 'Genap', 8, 1),
	(4, 'Genap', 9, 1),
	(5, 'Genap', 10, 1),
	(6, 'Genap', 11, 1),
	(7, 'Genap', 12, 1),
	(8, 'Ganjil', 1, 2),
	(9, 'Ganjil', 2, 2),
	(10, 'Ganjil', 3, 2),
	(11, 'Ganjil', 4, 2),
	(12, 'Ganjil', 5, 2),
	(14, 'Ganjil', 6, 2);

-- Dumping structure for table sigap2.m_sma
CREATE TABLE IF NOT EXISTS `m_sma` (
  `id` int NOT NULL AUTO_INCREMENT,
  `tahun` int DEFAULT NULL,
  `bulan` int DEFAULT NULL,
  `datetime` datetime DEFAULT NULL,
  `createby` int DEFAULT NULL,
  PRIMARY KEY (`id`) USING BTREE
) ENGINE=InnoDB AUTO_INCREMENT=605 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci ROW_FORMAT=DYNAMIC;

-- Dumping data for table sigap2.m_sma: ~7 rows (approximately)
INSERT INTO `m_sma` (`id`, `tahun`, `bulan`, `datetime`, `createby`) VALUES
	(559, 2023, 1, NULL, NULL),
	(582, 2023, 6, NULL, NULL),
	(587, 2023, 12, NULL, NULL),
	(590, 2023, 11, NULL, NULL),
	(591, 2023, 8, NULL, NULL),
	(601, 2023, 7, NULL, NULL),
	(604, 2023, 2, NULL, NULL);

-- Dumping structure for table sigap2.m_smk
CREATE TABLE IF NOT EXISTS `m_smk` (
  `id` int NOT NULL AUTO_INCREMENT,
  `tahun` year DEFAULT NULL,
  `bulan` int DEFAULT NULL,
  `datetime` datetime DEFAULT NULL,
  `createby` int DEFAULT NULL,
  PRIMARY KEY (`id`) USING BTREE
) ENGINE=InnoDB AUTO_INCREMENT=49 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci ROW_FORMAT=DYNAMIC;

-- Dumping data for table sigap2.m_smk: ~3 rows (approximately)
INSERT INTO `m_smk` (`id`, `tahun`, `bulan`, `datetime`, `createby`) VALUES
	(46, '2023', 2, NULL, NULL),
	(47, '2023', 1, NULL, NULL),
	(48, '2023', 11, NULL, NULL);

-- Dumping structure for table sigap2.m_smp
CREATE TABLE IF NOT EXISTS `m_smp` (
  `id` int NOT NULL AUTO_INCREMENT,
  `tahun` year DEFAULT NULL,
  `bulan` int DEFAULT NULL,
  `datetime` datetime DEFAULT NULL,
  `createby` int DEFAULT NULL,
  PRIMARY KEY (`id`) USING BTREE
) ENGINE=InnoDB AUTO_INCREMENT=25 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci ROW_FORMAT=DYNAMIC;

-- Dumping data for table sigap2.m_smp: ~2 rows (approximately)
INSERT INTO `m_smp` (`id`, `tahun`, `bulan`, `datetime`, `createby`) VALUES
	(21, '2023', 1, NULL, NULL),
	(24, '2023', 11, NULL, NULL);

-- Dumping structure for table sigap2.m_tahun
CREATE TABLE IF NOT EXISTS `m_tahun` (
  `id` int DEFAULT NULL,
  `tahun` int DEFAULT NULL,
  `no_urut` int DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- Dumping data for table sigap2.m_tahun: ~0 rows (approximately)

-- Dumping structure for table sigap2.m_tidakhadir
CREATE TABLE IF NOT EXISTS `m_tidakhadir` (
  `id` int NOT NULL AUTO_INCREMENT,
  `value` bigint DEFAULT NULL,
  `perjam_value` bigint DEFAULT NULL,
  `jabatan_id` int DEFAULT NULL,
  `jenjang_id` int DEFAULT NULL,
  `sertif` int DEFAULT NULL,
  `type` int DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=10 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- Dumping data for table sigap2.m_tidakhadir: ~8 rows (approximately)
INSERT INTO `m_tidakhadir` (`id`, `value`, `perjam_value`, `jabatan_id`, `jenjang_id`, `sertif`, `type`) VALUES
	(1, 60000, 7500, 10, 4, NULL, 3),
	(2, 75000, 9375, 12, 4, NULL, 3),
	(3, 60000, 7500, 11, 4, NULL, 3),
	(4, NULL, 14000, 9, 4, 1, 1),
	(5, NULL, 16500, 9, 4, 2, 1),
	(6, NULL, 13200, 8, 4, 2, 1),
	(7, 54500, 6813, 6, 4, NULL, 2),
	(8, NULL, 14000, 5, 4, 1, 1);

-- Dumping structure for table sigap2.m_tk
CREATE TABLE IF NOT EXISTS `m_tk` (
  `id` int NOT NULL AUTO_INCREMENT,
  `tahun` year DEFAULT NULL,
  `bulan` int DEFAULT NULL,
  `datetime` datetime DEFAULT NULL,
  `createby` int DEFAULT NULL,
  PRIMARY KEY (`id`) USING BTREE
) ENGINE=InnoDB AUTO_INCREMENT=75 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci ROW_FORMAT=DYNAMIC;

-- Dumping data for table sigap2.m_tk: ~4 rows (approximately)
INSERT INTO `m_tk` (`id`, `tahun`, `bulan`, `datetime`, `createby`) VALUES
	(48, '2023', 3, NULL, NULL),
	(70, '2023', 1, NULL, NULL),
	(71, '2023', 2, NULL, NULL),
	(74, '2023', 6, NULL, NULL);

-- Dumping structure for table sigap2.m_tu_sd
CREATE TABLE IF NOT EXISTS `m_tu_sd` (
  `id` int NOT NULL AUTO_INCREMENT,
  `tahun` year DEFAULT NULL,
  `bulan` int DEFAULT NULL,
  `datetime` datetime DEFAULT NULL,
  `createby` int DEFAULT NULL,
  PRIMARY KEY (`id`) USING BTREE
) ENGINE=InnoDB AUTO_INCREMENT=22 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci ROW_FORMAT=DYNAMIC;

-- Dumping data for table sigap2.m_tu_sd: ~2 rows (approximately)
INSERT INTO `m_tu_sd` (`id`, `tahun`, `bulan`, `datetime`, `createby`) VALUES
	(20, '2023', 1, NULL, NULL),
	(21, '2023', 11, NULL, NULL);

-- Dumping structure for table sigap2.m_tu_sma
CREATE TABLE IF NOT EXISTS `m_tu_sma` (
  `id` int NOT NULL AUTO_INCREMENT,
  `tahun` year DEFAULT NULL,
  `bulan` int DEFAULT NULL,
  `datetime` datetime DEFAULT NULL,
  `createby` int DEFAULT NULL,
  PRIMARY KEY (`id`) USING BTREE
) ENGINE=InnoDB AUTO_INCREMENT=273 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci ROW_FORMAT=DYNAMIC;

-- Dumping data for table sigap2.m_tu_sma: ~7 rows (approximately)
INSERT INTO `m_tu_sma` (`id`, `tahun`, `bulan`, `datetime`, `createby`) VALUES
	(250, '2023', 1, NULL, NULL),
	(256, '2023', 6, NULL, NULL),
	(261, '2023', 12, NULL, NULL),
	(264, '2023', 11, NULL, NULL),
	(265, '2023', 8, NULL, NULL),
	(271, '2023', 7, NULL, NULL),
	(272, '2023', 2, NULL, NULL);

-- Dumping structure for table sigap2.m_tu_smk
CREATE TABLE IF NOT EXISTS `m_tu_smk` (
  `id` int NOT NULL AUTO_INCREMENT,
  `tahun` year DEFAULT NULL,
  `bulan` int DEFAULT NULL,
  `datetime` datetime DEFAULT NULL,
  `createby` int DEFAULT NULL,
  PRIMARY KEY (`id`) USING BTREE
) ENGINE=InnoDB AUTO_INCREMENT=26 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci ROW_FORMAT=DYNAMIC;

-- Dumping data for table sigap2.m_tu_smk: ~2 rows (approximately)
INSERT INTO `m_tu_smk` (`id`, `tahun`, `bulan`, `datetime`, `createby`) VALUES
	(24, '2023', 1, NULL, NULL),
	(25, '2023', 11, NULL, NULL);

-- Dumping structure for table sigap2.m_tu_smp
CREATE TABLE IF NOT EXISTS `m_tu_smp` (
  `id` int NOT NULL AUTO_INCREMENT,
  `tahun` year DEFAULT NULL,
  `bulan` int DEFAULT NULL,
  `datetime` datetime DEFAULT NULL,
  `createby` int DEFAULT NULL,
  PRIMARY KEY (`id`) USING BTREE
) ENGINE=InnoDB AUTO_INCREMENT=18 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci ROW_FORMAT=DYNAMIC;

-- Dumping data for table sigap2.m_tu_smp: ~3 rows (approximately)
INSERT INTO `m_tu_smp` (`id`, `tahun`, `bulan`, `datetime`, `createby`) VALUES
	(10, '2023', 8, NULL, NULL),
	(14, '2023', 1, NULL, NULL),
	(17, '2023', 11, NULL, NULL);

-- Dumping structure for table sigap2.m_tu_tk
CREATE TABLE IF NOT EXISTS `m_tu_tk` (
  `id` int NOT NULL AUTO_INCREMENT,
  `tahun` year DEFAULT NULL,
  `bulan` int DEFAULT NULL,
  `datetime` datetime DEFAULT NULL,
  `createby` int DEFAULT NULL,
  PRIMARY KEY (`id`) USING BTREE
) ENGINE=InnoDB AUTO_INCREMENT=39 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci ROW_FORMAT=DYNAMIC;

-- Dumping data for table sigap2.m_tu_tk: ~4 rows (approximately)
INSERT INTO `m_tu_tk` (`id`, `tahun`, `bulan`, `datetime`, `createby`) VALUES
	(19, '2023', 7, NULL, NULL),
	(34, '2023', 1, NULL, NULL),
	(35, '2023', 2, NULL, NULL),
	(38, '2023', 6, NULL, NULL);

-- Dumping structure for table sigap2.m_yayasan
CREATE TABLE IF NOT EXISTS `m_yayasan` (
  `id` int NOT NULL AUTO_INCREMENT,
  `bulan` int DEFAULT NULL,
  `tahun` int DEFAULT NULL,
  `datetime` datetime DEFAULT NULL,
  `import_file` text CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci,
  PRIMARY KEY (`id`) USING BTREE
) ENGINE=InnoDB AUTO_INCREMENT=11 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- Dumping data for table sigap2.m_yayasan: ~4 rows (approximately)
INSERT INTO `m_yayasan` (`id`, `bulan`, `tahun`, `datetime`, `import_file`) VALUES
	(7, 1, 2023, '2023-02-13 03:19:42', 'Template Pengurus Yayasan (5).xlsx'),
	(8, 1, 2024, '2023-02-13 03:26:25', 'Template Pengurus Yayasan (1).xlsx'),
	(9, 3, 2023, '2023-02-13 03:27:33', 'Template Pengurus Yayasan (2).xlsx'),
	(10, 4, 2023, '2023-02-13 03:30:07', 'Template Pengurus Yayasan (7).xlsx');

-- Dumping structure for table sigap2.pegawai
CREATE TABLE IF NOT EXISTS `pegawai` (
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
) ENGINE=InnoDB AUTO_INCREMENT=429 DEFAULT CHARSET=latin1 ROW_FORMAT=DYNAMIC;

-- Dumping data for table sigap2.pegawai: ~353 rows (approximately)
INSERT INTO `pegawai` (`id`, `pid`, `nama`, `alamat`, `email`, `wa`, `hp`, `tgllahir`, `nip`, `rekbank`, `pendidikan`, `jurusan`, `agama`, `jenkel`, `status`, `foto`, `file_cv`, `jabatan`, `mulai_bekerja`, `keterangan`, `username`, `password`, `level`, `aktif`, `jenjang_id`, `type`, `sertif`, `tambahan`, `periode_jabatan`, `lama_kerja`, `status_peg`, `jjm`, `kehadiran`, `status_pekerjaan`, `status_npwp`, `bpjs_kesehatan`) VALUES
	(6, NULL, 'Fitria', 'surabaya', 'fitria@gmail.com', NULL, NULL, NULL, '10230', '11313411', NULL, NULL, NULL, NULL, NULL, NULL, NULL, 5, NULL, NULL, 'Fitria', 'asdf12', 1, 1, 4, 1, 1, 2, 4, 2, NULL, 48, NULL, 2, 1, 10),
	(11, NULL, 'Dito', 'surabaya', 'dito@gmail.com', '085970248011', NULL, NULL, '10235', NULL, NULL, NULL, NULL, 'Wanita', NULL, NULL, NULL, 9, NULL, NULL, 'dito', 'asdf123', 1, 1, 4, 1, 2, NULL, NULL, NULL, NULL, 48, NULL, 2, 1, 11),
	(13, NULL, 'Farhan kebab', 'surabaya', 'kebab@gmail.com', NULL, NULL, NULL, '10237', NULL, NULL, NULL, NULL, 'Wanita', NULL, NULL, NULL, 5, NULL, NULL, 'farhan', 'asdf123', 1, 1, 2, 1, 2, 2, 2, 2, NULL, NULL, NULL, NULL, NULL, NULL),
	(14, NULL, 'ardi', 'surabaya', 'kebab@gmail.com', NULL, NULL, NULL, '10238', NULL, NULL, NULL, NULL, 'Wanita', NULL, NULL, NULL, 5, NULL, NULL, 'ardi', 'asdf123', 1, 1, 3, 1, 2, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
	(30, NULL, 'asep', 'surabaya', 'kebab@gmail.com', NULL, NULL, NULL, '102321', NULL, NULL, NULL, NULL, 'Wanita', NULL, NULL, NULL, 11, NULL, NULL, 'asep', 'asdf123', 1, 1, 4, 3, 2, NULL, NULL, NULL, NULL, NULL, 26, NULL, NULL, NULL),
	(31, NULL, 'Unit SMA', NULL, NULL, NULL, NULL, NULL, 'sma', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'sma', '123456', 11, 1, 4, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
	(32, NULL, 'Unit SMP', NULL, NULL, NULL, NULL, NULL, 'smp', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'smp', '123456', 10, 1, 3, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
	(33, NULL, 'Unit SMK', NULL, NULL, NULL, NULL, NULL, 'smk', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'smk', '123456', 12, 1, 5, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
	(34, NULL, 'Unit SD', NULL, NULL, NULL, NULL, NULL, 'sd', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'sd', '123456', 9, 1, 2, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
	(36, NULL, 'Dwi', 'surabaya', 'Dwi@gmail.com', NULL, NULL, NULL, '10239', NULL, 8, NULL, NULL, 'Wanita', NULL, NULL, NULL, 7, NULL, NULL, 'dwi', 'asdf123', 1, 1, 4, 2, 2, NULL, NULL, 6, NULL, NULL, 26, NULL, NULL, NULL),
	(37, NULL, 'Hartini', 'surabaya', 'Dwi@gmail.com', NULL, NULL, NULL, '102390', NULL, 8, NULL, NULL, 'Wanita', NULL, NULL, NULL, 6, NULL, NULL, 'hartini', 'asdf123', 1, 1, 4, 2, 2, 3, NULL, 3, NULL, NULL, 26, NULL, NULL, NULL),
	(43, NULL, 'Bendahara', NULL, NULL, NULL, NULL, NULL, 'bendahara', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'bendahara', '123456', 3, 1, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
	(44, NULL, 'Panitia PPDB', 'Sidotopo Wetan Baru No.37 Surabaya', 'ppdb', '', '', '2022-11-08', '', '', NULL, NULL, 'islam', 'Others', '', NULL, NULL, NULL, '2022', NULL, 'ppdb', '123456', NULL, 1, 5, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
	(45, NULL, 'Sulicha,S.Pd', 'Tambak Deres III/3', 'zulikaika162@gmail.com', '081217527863', '081217527863', '2023-01-13', '1970070420', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2023', NULL, 'zulikaika162@gmail.com', '123456', 1, 1, 5, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
	(46, NULL, 'Ani wahyu Kurniati,S.Pd', 'Jl. Mohammad Noer 140 C', 'aniwahyu740@gmail.com', '085732233838', '085732233838', '1983-12-04', '19831204200207035421', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2023', NULL, 'aniwahyu740@gmail.com', '123456', NULL, 1, 5, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
	(47, NULL, 'Sanulis', 'Jl. Mohammad Noer 140 C', 'sanulist@gmail.com', '08563685557', '08563685557', '1981-07-17', '1981071', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2023', NULL, 'sanulist@gmail.com', '123456', NULL, 1, 5, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
	(48, NULL, 'Emilya Kartika Sari,S.Pd', 'Gembong 4/47A', 'emil.go.ek@yahoo.com', '085732766067', '085732766067', '1990-07-23', '199007232015070541', '', NULL, NULL, 'islam', 'Female', '', NULL, NULL, NULL, '2023', NULL, 'emil.go.ek@yahoo.com', '123456', NULL, 1, 5, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
	(49, NULL, 'Ratna Oktavia Ismanisih,S.Pd', 'bulak Banteng Lor  1/127', 'satpamcml@gmail.com', '082331584200', '082331584200', '1992-06-11', '19920611', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2023', NULL, 'satpamcml@gmail.com', '123456', NULL, 1, 5, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
	(50, NULL, 'Yuli Widjajati,S.Pd', 'Sidomulyo IB/20', 'yuliwidjajati01@gmail.com', '081703512251', '081703512251', '1969-07-13', '19690701', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2023', NULL, 'yuliwidjajati01@gmail.com', '123456', NULL, 1, 5, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
	(51, NULL, 'Mutafarriqoh,m.Psi', 'Petukangan I/16', 'mutafarriqoh81@gmail.com', '089678707416', '089678707416', '1981-12-13', '198112132016070555', '', NULL, NULL, 'islam', 'Female', '', NULL, NULL, NULL, '2023', NULL, 'mutafarriqoh81@gmail.com', '123456', NULL, 1, 5, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
	(87, NULL, 'Dra. NINING PARANTIANINGSIH', 'Jl. Kedinding Lor Raflesia 1 No. 3', 'nparantianingsih@gmail.com', '081336449249', '081336449249', '2023-01-16', '196512051993070226', '', NULL, NULL, 'islam', 'Female', 'GTY', NULL, NULL, NULL, '2023', NULL, 'nparantianingsih@gmail.com', '123456', NULL, 1, 2, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
	(88, NULL, 'KUNCAHYANING FITRIA SANTOSO, M.Pd.', 'Jl. Pacar Keling 2/77', 'zaicha.ria22@gmail.com', '083831106386', '083831106386', '2023-01-18', '199202222015070546', '', NULL, NULL, 'islam', 'Female', 'GTY', NULL, NULL, NULL, '2023', NULL, 'zaicha.ria22@gmail.com', '123456', NULL, 1, 2, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
	(89, NULL, 'AINUL YAQIN, S.Si.', 'Jl. Bulak Banteng Baru Gg Mawar No. 15 Surabaya', 'ainulyaqinpwh1@gmail.com', '085655815700', '085655815700', '2023-01-18', '198008252004070404', '', NULL, NULL, 'islam', 'Male', 'GTY', NULL, NULL, NULL, '2023', NULL, 'ainulyaqinpwh1@gmail.com', '123456', NULL, 1, 2, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
	(90, NULL, 'TAUFIQ HIDAYAT, S.Si.', 'Jl. Kapas Baru 2/106', 'taufiqkur29@gmail.com', '085648029960', '085648029960', '2023-01-16', '198306292008070448', '', NULL, NULL, 'islam', 'Male', 'GTY', NULL, NULL, NULL, '2023', NULL, 'taufiqkur29@gmail.com', '123456', NULL, 1, 2, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
	(91, NULL, 'CATTRI SIGIT WIDYASTUTI, S.Pd.', 'JL. Margodadi VI/15', 'cattrisigwh@yahoo.com', '082140909027', '082140909027', '2023-01-18', '198011212007070433', '', NULL, NULL, 'islam', 'Female', 'GTY', NULL, NULL, NULL, '2023', NULL, 'cattrisigwh@yahoo.com', '123456', NULL, 1, 2, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
	(92, NULL, 'H. ABDUL HADI, S.Pd.I', 'JL. Sidorukun 1 no. 123', 'abdhadipwh1@gmail.com', '081332938304', '081332938304', '2023-01-16', '195508061997070291', '', NULL, NULL, 'islam', 'Male', 'GTY', NULL, NULL, NULL, '2023', NULL, 'abdhadipwh1@gmail.com', '123456', NULL, 1, 2, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
	(93, NULL, 'H. ACHMAD FADLAN, S.Ag.', 'Jl. Sidesermo Dalam no. 16', 'ahmadfadlan271@gmail.com', '085855581945', '085855581945', '2023-01-18', '196402131995070258', '', NULL, NULL, 'islam', 'Male', 'GTY', NULL, NULL, NULL, '2023', NULL, 'ahmadfadlan271@gmail.com', '123456', NULL, 1, 2, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
	(94, NULL, 'AKHMAD FAUZI, S.Pd.I.', 'JL. Platuk Baru IA/71A', 'caica7915@gmail.com', '089520164531', '089520164531', '2023-01-18', '197905112010070338', '', NULL, NULL, 'islam', 'Male', 'GTY', NULL, NULL, NULL, '2023', NULL, 'caica7915@gmail.com', '123456', NULL, 1, 2, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
	(95, NULL, 'AHMAD SUWAIFIE, S.H.', 'Jl. Ngelom II/15 Taman', 'ifie81@yahoo.com', '085648910344', '085648910344', '2023-01-18', '198111252006070423', '', NULL, NULL, 'islam', 'Male', 'GTT', NULL, NULL, NULL, '2023', NULL, 'ifie81@yahoo.com', '123456', NULL, 1, 2, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
	(96, NULL, 'ALIP NURFAIZAH, S.Pd.', 'PERUM GRAHA MUTIARA INDAH A11/05', 'aliefnurfaizah@gmail.com', '081330455277', '081330455277', '2023-01-18', '198402172007070436', '', NULL, NULL, 'islam', 'Female', 'GTY', NULL, NULL, NULL, '2023', NULL, 'aliefnurfaizah@gmail.com', '123456', NULL, 1, 2, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
	(97, NULL, 'ANNA LATIFAH, S.Pd.', 'JL. Randu Agung III/55', 'annalatifah45@gmail.com', '081235747783', '081235747783', '2023-01-18', '197503091998070251', '', NULL, NULL, 'islam', 'Female', 'GTY', NULL, NULL, NULL, '2023', NULL, 'annalatifah45@gmail.com', '123456', NULL, 1, 2, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
	(98, NULL, 'ASKUR, S.Pd. M.Pd.I.', 'JL. Tambak Wedi Barat 5-E  No. 45', 'askurdpkwh@gmail.com', '', '', '2023-01-16', '', '', NULL, NULL, 'islam', 'Male', 'GTY', NULL, NULL, NULL, '2023', NULL, 'askurdpkwh@gmail.com', '123456', NULL, 1, 2, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
	(99, NULL, 'AULIA ZULFIKAR, S.Pd.', 'Jl. Wonorejo I/1D', 'auliazulfikar1004@gmail.com', '089531900475', '089531900475', '2023-01-18', '198304102006070420', '', NULL, NULL, 'islam', 'Male', 'GTY', NULL, NULL, NULL, '2023', NULL, 'auliazulfikar1004@gmail.com', '123456', NULL, 1, 2, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
	(100, NULL, 'CHOIRIYAH, S.Pd.', 'Jl. Bulak Rukem 3C/4', 'choiriyahspd3@gmail.com', '082131841556', '082131841556', '2023-01-16', '197002261998070248', '', NULL, NULL, 'islam', 'Female', 'GTY', NULL, NULL, NULL, '2023', NULL, 'choiriyahspd3@gmail.com', '123456', NULL, 1, 2, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
	(101, NULL, 'CHOIRUR ROBIAH, S.Psi.', 'JL. SIDOMULYO 2-E /10- B', 'choirurrobiah989@gmail.com', '085806500168', '085806500168', '2023-01-18', '198411252010070486', '', NULL, NULL, 'islam', 'Female', 'GTY', NULL, NULL, NULL, '2023', NULL, 'choirurrobiah989@gmail.com', '123456', NULL, 1, 2, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
	(102, NULL, 'DWI ISTRIANA SUWITARINI, S.Psi.', 'Jl. Tenggumung Karya Lor 83', 'dwiistriana11@gmail.com', '08813584344', '08813584344', '2023-01-18', '197404241999070326', '', NULL, NULL, 'islam', 'Female', 'GTY', NULL, NULL, NULL, '2023', NULL, 'dwiistriana11@gmail.com', '123456', NULL, 1, 2, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
	(103, NULL, 'GANDUNG SUPRI HARTOYO, S.Pd.', 'Jl. Gading 1/23', 'gandungwachidhasyim@gmail.com', '083856926004', '083856926004', '2023-01-16', '196709081999070325', '', NULL, NULL, 'islam', 'Male', 'GTY', NULL, NULL, NULL, '2023', NULL, 'gandungwachidhasyim@gmail.com', '123456', NULL, 1, 2, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
	(104, NULL, 'GATOT SUGIANTO, S.Pd.', 'Jl. Rangkah VII/70-b', 'smpwachidhasyim@yahoo.com', '083830754144', '083830754144', '2023-01-18', '197612261997070286', '', NULL, NULL, 'islam', 'Male', 'GTY', NULL, NULL, NULL, '2023', NULL, 'smpwachidhasyim@yahoo.com', '123456', NULL, 1, 2, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
	(105, NULL, 'HUSNUL KHOTIMAH, S.Or.', 'Jl. Bumiarjo 5/56B', 'chusnulkhotimwh@yahoo.com', '85732149029', '85732149029', '2023-01-18', '199201062014070526', '', NULL, NULL, 'islam', 'Female', 'GTY', NULL, NULL, NULL, '2023', NULL, 'chusnulkhotimwh@yahoo.com', '123456', NULL, 1, 2, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
	(106, NULL, 'SITTY CHOLIFAH', 'DUKUH SETRO RAWASAN 5/12', 'ifasitty@gmail.com', '087856644482', '087856644482', '1989-03-05', '198903052016070583', '', NULL, NULL, 'islam', 'Female', 'Tenaga Kependidikan', NULL, NULL, NULL, '2023', NULL, 'ifasitty@gmail.com', '123456', NULL, 1, 2, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
	(107, NULL, 'Drs. KUNTO BUDI WARSONO', 'Jl. Tenggumung Wetan Gang Salak No 5', 'KUNTOBW@GMAIL.COM', '081515022918', '081515022918', '2023-01-16', '196208291986070105', '', NULL, NULL, 'islam', 'Male', 'GTY', NULL, NULL, NULL, '2023', NULL, 'KUNTOBW@GMAIL.COM', '123456', NULL, 1, 2, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
	(108, NULL, 'WIWIN SUSILOWATI', 'JATIPURWO 7/25', 'wiwiensusilowati732@gmail.com', '085852270773', '085852270773', '1974-03-30', '197403301995070267', '', NULL, NULL, 'islam', 'Female', 'Tenaga Kependidikan', NULL, NULL, NULL, '2023', NULL, 'wiwiensusilowati732@gmail.com', '123456', NULL, 1, 2, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
	(109, NULL, 'LUTFIYAH KUSUMA', 'PANDEGILING 4/11', 'lutfiyahk7@gmail.com', '085808238501', '085808238501', '2023-01-13', '198202262006070479', '', NULL, NULL, 'islam', 'Female', 'Tenaga Kependidikan', NULL, NULL, NULL, '2023', NULL, 'lutfiyahk7@gmail.com', '123456', NULL, 1, 2, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
	(110, NULL, 'IVA VITYANA', 'DUKUH BULAK BANTENG SUROPATI III NO. 4 SURABAYA', 'ivavityana12@gmail.com', '081282976805', '081282976805', '1972-02-08', '197202081991070203', '', NULL, NULL, 'islam', 'Female', 'Tenaga Kependidikan', NULL, NULL, NULL, '2023', NULL, 'ivavityana12@gmail.com', '123456', NULL, 1, 2, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
	(111, NULL, 'NURUL CHOLIDAH', 'PLEMAHAN 6/11', 'rulbams@gmail.com', '087779998470', '087779998470', '1975-12-21', '197512211995070268', '', NULL, NULL, 'islam', 'Female', 'Tenaga Kependidikan', NULL, NULL, NULL, '2023', NULL, 'rulbams@gmail.com', '123456', NULL, 1, 2, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
	(112, NULL, 'Dra. Hj. KUSTANTRI NURWATI', 'JL. Jogoloyo Besar A No 32', 'kustantrinurwati12@gmail.com', '083130037637', '083130037637', '2023-01-16', '196512271993070227', '', NULL, NULL, 'islam', 'Female', 'GTY', NULL, NULL, NULL, '2023', NULL, 'kustantrinurwati12@gmail.com', '123456', NULL, 1, 2, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
	(113, NULL, 'MOCH ZAINUL ARIFIN, SE.', 'JL. Margodadi III No 41', 'zaimazing@gmail.com', '085755809448', '085755809448', '2023-01-18', '197803282006070271', '', NULL, NULL, 'islam', 'Male', 'GTY', NULL, NULL, NULL, '2023', NULL, 'zaimazing@gmail.com', '123456', NULL, 1, 2, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
	(114, NULL, 'NUR HAYATI, S.Ag.', 'Jl. Rungkut Tengah III No 3', 'qcctc@sby.oas.co.id', '081938226575', '081938226575', '2023-01-18', '197501302000070339', '', NULL, NULL, 'islam', 'Female', 'GTY', NULL, NULL, NULL, '2023', NULL, 'qcctc@sby.oas.co.id', '123456', NULL, 1, 2, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
	(115, NULL, 'NUR SUCI INDAH UTAMI, S.SI.', 'JL. BULAK BANTENG LOR BHINEKA 8/49', 'nsuci13@gmail.com', '85732821511', '85732821511', '2023-01-18', '198610132011070497', '', NULL, NULL, 'islam', 'Female', 'GTY', NULL, NULL, NULL, '2023', NULL, 'nsuci13@gmail.com', '123456', NULL, 1, 2, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
	(116, NULL, 'NURIL FARAHANI, S.Si.', 'JL. Sidokapasan V/18', 'nurilfarahani@yahoo.co.id', '082141287748', '082141287748', '2023-01-18', '198104162007070343', '', NULL, NULL, 'islam', 'Female', 'GTY', NULL, NULL, NULL, '2023', NULL, 'nurilfarahani@yahoo.co.id', '123456', NULL, 1, 2, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
	(117, NULL, 'NURUL HIDAYAT, S.Pd.I.', 'JL. Rangkah Buntu 2/16', 'nurulhidayatwh@yahoo.com', '085850087567', '085850087567', '2023-01-16', '196705282012070509', '', NULL, NULL, 'islam', 'Male', 'GTY', NULL, NULL, NULL, '2023', NULL, 'nurulhidayatwh@yahoo.com', '123456', NULL, 1, 2, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
	(118, NULL, 'NURULITA, S.Si.', 'JL. Tempurejo V/7', 'nurulitanurulita7@gmail.com', '081249805734', '081249805734', '2023-01-18', '197608042004070398', '', NULL, NULL, 'islam', 'Female', 'GTY', NULL, NULL, NULL, '2023', NULL, 'nurulitanurulita7@gmail.com', '123456', NULL, 1, 2, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
	(119, NULL, 'PAMUJI, S.Pd.', 'JL. Kedinding Lor Kemuning I/35', 'pamudjipwh@yahoo.com', '081703413112', '081703413112', '2023-01-16', '196606072001070132', '', NULL, NULL, 'islam', 'Male', 'GTY', NULL, NULL, NULL, '2023', NULL, 'pamudjipwh@yahoo.com', '123456', NULL, 1, 2, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
	(120, NULL, 'QURROTU AINY, S.Psi.', 'JL. Peneleh IX/40-42', 'qainy.starsnake@gmail.com', '082190971280', '082190971280', '2023-01-18', '197710262008070465', '', NULL, NULL, 'islam', 'Female', 'GTY', NULL, NULL, NULL, '2023', NULL, 'qainy.starsnake@gmail.com', '123456', NULL, 1, 2, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
	(121, NULL, 'RINA SULFIANA, S.Si.', 'Jl. Bulak Setro Indah II Blok B-37', 'rsulfiananjatmiko@gmail.com', '081803124887', '081803124887', '2023-01-18', '198101232006070421', '', NULL, NULL, 'islam', 'Female', 'GTY', NULL, NULL, NULL, '2023', NULL, 'rsulfiananjatmiko@gmail.com', '123456', NULL, 1, 2, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
	(122, NULL, 'SELI MARDIANA, S.Pd.I', 'JL. Kedinding Lor Gang Rafflesia 2 No. 6', 'selimardiana33@gmail.com', '081250139886', '081250139886', '2023-01-18', '198607102012070507', '', NULL, NULL, 'islam', 'Female', 'GTY', NULL, NULL, NULL, '2023', NULL, 'selimardiana33@gmail.com', '123456', NULL, 1, 2, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
	(123, NULL, 'SITI RAHMAH, S.Pd.', 'Jl. Kedinding Lor Teratai No. 154', 'rahmahsiti673@gmail.com', '081332158575', '081332158575', '2023-01-16', '197101091996070265', '', NULL, NULL, 'islam', 'Female', 'GTY', NULL, NULL, NULL, '2023', NULL, 'rahmahsiti673@gmail.com', '123456', NULL, 1, 2, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
	(124, NULL, 'SRI UTARI, S.Pd.', 'JL. Sidotopo Wetan Baru IVA No. 62', 'sriut8418@gmail.com', '081313164771', '081313164771', '2023-01-18', '197208221999070316', '', NULL, NULL, 'islam', 'Female', 'GTY', NULL, NULL, NULL, '2023', NULL, 'sriut8418@gmail.com', '123456', NULL, 1, 2, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
	(125, NULL, 'YAYUK MURTINI, S.Pd.', 'JL. Sidotopo Wetan V No. 56', 'yayukmurwh@yahoo.com', '081325279450', '081325279450', '2023-01-16', '196801071994070195', '', NULL, NULL, 'islam', 'Female', 'GTY', NULL, NULL, NULL, '2023', NULL, 'yayukmurwh@yahoo.com', '123456', NULL, 1, 2, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
	(126, NULL, 'SUMIYATI, S.Pd.', 'JL. Gembong Kinco 9A', 'Mrdandre09@gmail.com', '081232711729', '081232711729', '2023-01-16', '196912161999070314', '', NULL, NULL, 'islam', 'Female', 'GTY', NULL, NULL, NULL, '2023', NULL, 'Mrdandre09@gmail.com', '123456', NULL, 1, 2, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
	(127, NULL, 'YULIA RACHMA, S.Pd.', 'JL. KALILOM LOR INDAH GG DUKU NO.4', 'yulia290875@gmail.com', '082132261145', '082132261145', '2023-01-18', '197508291999070317', '', NULL, NULL, 'islam', 'Female', 'Guru', NULL, NULL, NULL, '2023', NULL, 'yulia290875@gmail.com', '123456', NULL, 1, 2, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
	(128, NULL, 'Z. HASANAH MS, S.Pd.', 'JL. BULAK BANTENG BARU KENANGA II/81', 'hazasahsmpwh@yahoo.com', '081807983580', '081807983580', '2023-01-18', '197606202001070361', '', NULL, NULL, 'islam', 'Female', 'GTY', NULL, NULL, NULL, '2023', NULL, 'hazasahsmpwh@yahoo.com', '123456', NULL, 1, 2, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
	(129, NULL, 'AGUSTINAH TANJUNG, S.Pd.', 'JL. TAMBAK SEGARAN WETAN 1/90', 'tinatanjung.tt@gmail.com', '085607772658', '085607772658', '2023-01-18', '198008292014070532', '', NULL, NULL, 'islam', 'Female', 'GTY', NULL, NULL, NULL, '2023', NULL, 'tinatanjung.tt@gmail.com', '123456', NULL, 1, 2, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
	(130, NULL, 'YUKA YUANANDA WICAKSONO, S.Pd.', 'PERUM JAYA ABADII - 11', 'yukayuanandawicaksono@gmail.com', '085806330558', '085806330558', '2023-01-18', '199610182021110863', '', NULL, NULL, 'islam', 'Male', 'GTT', NULL, NULL, NULL, '2023', NULL, 'yukayuanandawicaksono@gmail.com', '123456', NULL, 1, 2, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
	(131, NULL, 'ARDESTI DEBY ARINDA, S.Pd.', 'JL. TAMBAK WEDI BARU GG.18-D UTARA NO.9', 'ardestidebyarinda@gmail.com', '0895803046840', '0895803046840', '2023-01-18', '199803202022010866', '', NULL, NULL, 'islam', 'Female', 'GTY', NULL, NULL, NULL, '2023', NULL, 'ardestidebyarinda@gmail.com', '123456', NULL, 1, 2, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
	(132, NULL, 'INDAH JAUHAROH, S.Pd.', 'JL. WONOAYU. 81', 'indahjauharoh5@gmail.com', '089620069488', '089620069488', '2023-01-18', '199607072021110864', '', NULL, NULL, 'islam', 'Female', 'GTY', NULL, NULL, NULL, '2023', NULL, 'indahjauharoh5@gmail.com', '123456', NULL, 1, 2, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
	(133, NULL, 'ROBBIYATUL MU&#039;AMALAH, S.Pd.', '', 'bellarobbiyatul@gmail.com', '085899913732', '085899913732', '2023-01-18', '199806152021110865', '', NULL, NULL, 'islam', 'Female', 'GTY', NULL, NULL, NULL, '2023', NULL, 'bellarobbiyatul@gmail.com', '123456', NULL, 1, 2, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
	(134, NULL, 'EKO WAHYUDI, S.Pd.', 'Dusun Gumukrejo RT 06 RW 01\r\nDesa Sidorejo, Kec. Purwoharjo, Banyuwangi ', 'eko78996@gmail.com', '082143258989', '082143258989', '2023-01-16', '', '', NULL, NULL, 'islam', 'Male', 'GTY', NULL, NULL, NULL, '2023', NULL, 'eko78996@gmail.com', '123456', NULL, 1, 2, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
	(135, NULL, 'NAJMI ZIANA WALIDA, S.Pd.', 'Dusun Krajan RT 03 RW 03\r\nSentul, Purwodadi Pasuruan ', 'ziananajmi@gmail.com', '083833843418', '083833843418', '2023-01-16', '', '', NULL, NULL, 'islam', 'Female', 'GTY', NULL, NULL, NULL, '2023', NULL, 'ziananajmi@gmail.com', '123456', NULL, 1, 2, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
	(136, NULL, 'MAULANA AHMAD MAHADI, S.Pd.', 'Dsn, Somber Desa Petapan Kecamatan Labang Kabupaten Bangkalan 69163', 'maulanaahmadmspd@gmail.com', '085850836441', '085850836441', '2023-01-18', '', '', NULL, NULL, 'islam', 'Male', 'GTY', NULL, NULL, NULL, '2023', NULL, 'maulanaahmadmspd@gmail.com', '123456', NULL, 1, 2, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
	(137, NULL, 'YASMIN AISYAH AKILAH RAHMAN, S.Pd.', 'Jl. Bronggalan Sawah VI A no. 31\r\nKel. Pacar Kembang Kec, Tambak Sari, Surabaya 60138', 'yasmin.arrahman1@gmail.com', '', '', '2023-01-18', '', '', NULL, NULL, 'islam', 'Female', 'GTY', NULL, NULL, NULL, '2023', NULL, 'yasmin.arrahman1@gmail.com', '123456', NULL, 1, 2, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
	(138, NULL, 'Panitia PPDB', 'Sidotopo Wetan Baru No.37 Surabaya', 'ppdb', '', '', '2022-11-08', '', '', NULL, NULL, 'islam', 'Others', '', NULL, NULL, NULL, '2022', NULL, 'ppdb', '123456', NULL, 1, 3, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
	(139, NULL, 'Achmad Rizki, S.IIP.', 'Jalan 1', '7@gmail.com', '', '', '2022-12-05', '', '', NULL, NULL, 'islam', 'Male', '', NULL, NULL, NULL, '2022', NULL, '7@gmail.com', '123456', NULL, 1, 3, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
	(140, NULL, 'Shobahul Hoir, S.Pd., M.Pd.', 'Jalan 2', '2@gmail.com', '', '', '2022-12-05', '', '', NULL, NULL, 'islam', 'Male', '', NULL, NULL, NULL, '2022', NULL, '2@gmail.com', '123456', NULL, 1, 3, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
	(141, NULL, 'Akhmad Suhardianto, S.Hum.', 'Jalan 11', '1@gmail.com', '', '', '2022-12-05', '', '', NULL, NULL, 'islam', 'Male', '', NULL, NULL, NULL, '2022', NULL, '1@gmail.com', '123456', NULL, 1, 3, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
	(142, NULL, 'Nofi Ridoningsih, S.Ag., S.Pd.', '', '4@gmail.com', '', '', '2022-12-05', '', '', NULL, NULL, 'islam', 'Female', '', NULL, NULL, NULL, '2022', NULL, '4@gmail.com', '123456', NULL, 1, 3, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
	(143, NULL, 'Luqman Affandi, S.Si., M.Si.', 'Jlan 6', '6@gmail.com', '', '', '2022-12-05', '', '', NULL, NULL, 'islam', 'Male', '', NULL, NULL, NULL, '2022', NULL, '6@gmail.com', '123456', NULL, 1, 3, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
	(144, NULL, 'Zaenal Ahmad, S.Psi.', 'Jalan 5', '5@gmail.com', '', '', '2022-12-05', '', '', NULL, NULL, 'islam', 'Male', '', NULL, NULL, NULL, '2022', NULL, '5@gmail.com', '123456', NULL, 1, 3, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
	(145, NULL, 'Gatot Sugiyanto, S.Pd.', 'Jalan 3', '3@gmail.com', '', '', '2022-12-05', '', '', NULL, NULL, 'islam', 'Male', '', NULL, NULL, NULL, '2022', NULL, '3@gmail.com', '123456', NULL, 1, 3, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
	(146, NULL, 'SADIKIN', '', '3578171005780011@gmail.com', '', '', '1970-01-01', '3578171005780011', '', NULL, NULL, '', '', '', NULL, NULL, NULL, '2023', NULL, '3578171005780011@gmail.com', '123456', NULL, 1, 3, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
	(147, NULL, 'WILUDJENG', '', '3578164404680002@gmail.com', '', '', '1970-01-01', '3578164404680002', '', NULL, NULL, '', '', '', NULL, NULL, NULL, '2023', NULL, '3578164404680002@gmail.com', '123456', NULL, 1, 3, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
	(148, NULL, 'AKHMAD SUHARDIANTO', '', '3578152104890001@gmail.com', '', '', '1970-01-01', '3578152104890001', '', NULL, NULL, '', '', '', NULL, NULL, NULL, '2023', NULL, '3578152104890001@gmail.com', '123456', NULL, 1, 3, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
	(149, NULL, 'MOCHAMMAD RIZQI WACHID SETYAWAN', '', '3578081005990004@gmail.com', '', '', '1970-01-01', '3578081005990004', '', NULL, NULL, '', '', '', NULL, NULL, NULL, '2023', NULL, '3578081005990004@gmail.com', '123456', NULL, 1, 3, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
	(150, NULL, 'ZULAIKHAH', '', '3578174905600001@gmail.com', '', '', '1970-01-01', '3578174905600001', '', NULL, NULL, '', '', '', NULL, NULL, NULL, '2023', NULL, '3578174905600001@gmail.com', '123456', NULL, 1, 3, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
	(151, NULL, 'AINUR MAULUD FINA', '', '3578166610880002@gmail.com', '', '', '1970-01-01', '3578166610880002', '', NULL, NULL, '', '', '', NULL, NULL, NULL, '2023', NULL, '3578166610880002@gmail.com', '123456', NULL, 1, 3, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
	(152, NULL, 'CHRISTINA HANJAR SESANTI', '', '3578104406840008@gmail.com', '', '', '1970-01-01', '3578104406840008', '', NULL, NULL, '', '', '', NULL, NULL, NULL, '2023', NULL, '3578104406840008@gmail.com', '123456', NULL, 1, 3, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
	(153, NULL, 'KUSTINI', '', '3578107103570001@gmail.com', '', '', '1970-01-01', '3578107103570001', '', NULL, NULL, '', '', '', NULL, NULL, NULL, '2023', NULL, '3578107103570001@gmail.com', '123456', NULL, 1, 3, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
	(154, NULL, 'SHOBAHUL HOIR', '', '3578172009850003@gmail.com', '', '', '1970-01-01', '3578172009850003', '', NULL, NULL, '', '', '', NULL, NULL, NULL, '2023', NULL, '3578172009850003@gmail.com', '123456', NULL, 1, 3, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
	(155, NULL, 'FITRI FAJRIYAH', '', '3578176908920001@gmail.com', '', '', '1970-01-01', '3578176908920001', '', NULL, NULL, '', '', '', NULL, NULL, NULL, '2023', NULL, '3578176908920001@gmail.com', '123456', NULL, 1, 3, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
	(156, NULL, 'MOCH. ANSOR', '', '3578290802610001@gmail.com', '', '', '1970-01-01', '3578290802610001', '', NULL, NULL, '', '', '', NULL, NULL, NULL, '2023', NULL, '3578290802610001@gmail.com', '123456', NULL, 1, 3, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
	(157, NULL, 'TITIM YUDHA SETYAWATI', '', '3507125312760003@gmail.com', '', '', '1970-01-01', '3507125312760003', '', NULL, NULL, '', '', '', NULL, NULL, NULL, '2023', NULL, '3507125312760003@gmail.com', '123456', NULL, 1, 3, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
	(158, NULL, 'NOFI RIDONINGSIH', '', '3578177110750002@gmail.com', '', '', '1970-01-01', '3578177110750002', '', NULL, NULL, '', '', '', NULL, NULL, NULL, '2023', NULL, '3578177110750002@gmail.com', '123456', NULL, 1, 3, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
	(159, NULL, 'RIYATI', '', '3578106707700007@gmail.com', '', '', '1970-01-01', '3578106707700007', '', NULL, NULL, '', '', '', NULL, NULL, NULL, '2023', NULL, '3578106707700007@gmail.com', '123456', NULL, 1, 3, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
	(160, NULL, 'ZAENAL AHMAD', '', '3318021307950001@gmail.com', '', '', '1970-01-01', '3318021307950001', '', NULL, NULL, '', '', '', NULL, NULL, NULL, '2023', NULL, '3318021307950001@gmail.com', '123456', NULL, 1, 3, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
	(161, NULL, 'ENI KUSRINI', '', '3578174103730002@gmail.com', '', '', '1970-01-01', '3578174103730002', '', NULL, NULL, '', '', '', NULL, NULL, NULL, '2023', NULL, '3578174103730002@gmail.com', '123456', NULL, 1, 3, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
	(162, NULL, 'SOEBAGIJO', '', '3578172801700001@gmail.com', '', '', '1970-01-01', '3578172801700001', '', NULL, NULL, '', '', '', NULL, NULL, NULL, '2023', NULL, '3578172801700001@gmail.com', '123456', NULL, 1, 3, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
	(163, NULL, 'ANI ROSIDAH', '', '3578115511810005@gmail.com', '', '', '1970-01-01', '3578115511810005', '', NULL, NULL, '', '', '', NULL, NULL, NULL, '2023', NULL, '3578115511810005@gmail.com', '123456', NULL, 1, 3, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
	(164, NULL, 'KUSNINTYASTUTIK', '', '3578174806780006@gmail.com', '', '', '1970-01-01', '3578174806780006', '', NULL, NULL, '', '', '', NULL, NULL, NULL, '2023', NULL, '3578174806780006@gmail.com', '123456', NULL, 1, 3, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
	(165, NULL, 'SANCOKO', '', '3578100107750004@gmail.com', '', '', '1970-01-01', '3578100107750004', '', NULL, NULL, '', '', '', NULL, NULL, NULL, '2023', NULL, '3578100107750004@gmail.com', '123456', NULL, 1, 3, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
	(166, NULL, 'NUNUN LUSYATI', '', '3578175908760001@gmail.com', '', '', '1970-01-01', '3578175908760001', '', NULL, NULL, '', '', '', NULL, NULL, NULL, '2023', NULL, '3578175908760001@gmail.com', '123456', NULL, 1, 3, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
	(167, NULL, 'DITA ROFIQA DAMAYANTI', '', '3578196903960001@gmail.com', '', '', '1970-01-01', '3578196903960001', '', NULL, NULL, '', '', '', NULL, NULL, NULL, '2023', NULL, '3578196903960001@gmail.com', '123456', NULL, 1, 3, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
	(168, NULL, 'RUKMANINGSIH', '', '3578174803810011@gmail.com', '', '', '1970-01-01', '3578174803810011', '', NULL, NULL, '', '', '', NULL, NULL, NULL, '2023', NULL, '3578174803810011@gmail.com', '123456', NULL, 1, 3, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
	(169, NULL, 'USWATUN HASANAH', '', '3578105009820004@gmail.com', '', '', '1970-01-01', '3578105009820004', '', NULL, NULL, '', '', '', NULL, NULL, NULL, '2023', NULL, '3578105009820004@gmail.com', '123456', NULL, 1, 3, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
	(170, NULL, 'AMALIYA MUFIDAH', '', '3524136904780002@gmail.com', '', '', '1970-01-01', '3524136904780002', '', NULL, NULL, '', '', '', NULL, NULL, NULL, '2023', NULL, '3524136904780002@gmail.com', '123456', NULL, 1, 3, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
	(171, NULL, 'FULLATUL AINI', '', '3578167006760220@gmail.com', '', '', '1970-01-01', '3578167006760220', '', NULL, NULL, '', '', '', NULL, NULL, NULL, '2023', NULL, '3578167006760220@gmail.com', '123456', NULL, 1, 3, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
	(172, NULL, 'LUQMAN AFFANDI', '', '3578171412910002@gmail.com', '', '', '1970-01-01', '3578171412910002', '', NULL, NULL, '', '', '', NULL, NULL, NULL, '2023', NULL, '3578171412910002@gmail.com', '123456', NULL, 1, 3, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
	(173, NULL, 'QURROTUN AQYUN', '', '3527034411894028@gmail.com', '', '', '1970-01-01', '3527034411894028', '', NULL, NULL, '', '', '', NULL, NULL, NULL, '2023', NULL, '3527034411894028@gmail.com', '123456', NULL, 1, 3, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
	(174, NULL, 'ABDUL HARIS', '', '3578102204820010@gmail.com', '', '', '1970-01-01', '3578102204820010', '', NULL, NULL, '', '', '', NULL, NULL, NULL, '2023', NULL, '3578102204820010@gmail.com', '123456', NULL, 1, 3, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
	(175, NULL, 'ABDUL MUJIB HAMBALI', '', '3578171409590002@gmail.com', '', '', '1970-01-01', '3578171409590002', '', NULL, NULL, '', '', '', NULL, NULL, NULL, '2023', NULL, '3578171409590002@gmail.com', '123456', NULL, 1, 3, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
	(176, NULL, 'AHMAD RAHMATULLAH', '', '3578161009930005@gmail.com', '', '', '1970-01-01', '3578161009930005', '', NULL, NULL, '', '', '', NULL, NULL, NULL, '2023', NULL, '3578161009930005@gmail.com', '123456', NULL, 1, 3, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
	(177, NULL, 'ANIS SOFIYAH', '', '3578045203920004@gmail.com', '', '', '1970-01-01', '3578045203920004', '', NULL, NULL, '', '', '', NULL, NULL, NULL, '2023', NULL, '3578045203920004@gmail.com', '123456', NULL, 1, 3, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
	(178, NULL, 'MISBAKHUL MUNIR', '', '3578282504960001@gmail.com', '', '', '1970-01-01', '3578282504960001', '', NULL, NULL, '', '', '', NULL, NULL, NULL, '2023', NULL, '3578282504960001@gmail.com', '123456', NULL, 1, 3, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
	(179, NULL, 'RAHMAT SUDANI', '', '3578271302990004@gmail.com', '', '', '1970-01-01', '3578271302990004', '', NULL, NULL, '', '', '', NULL, NULL, NULL, '2023', NULL, '3578271302990004@gmail.com', '123456', NULL, 1, 3, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
	(180, NULL, 'DANI CANTONA', '', '3578102704970005@gmail.com', '', '', '1970-01-01', '3578102704970005', '', NULL, NULL, '', '', '', NULL, NULL, NULL, '2023', NULL, '3578102704970005@gmail.com', '123456', NULL, 1, 3, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
	(181, NULL, 'HARIJANTO', '', '3578062406600003@gmail.com', '', '', '1970-01-01', '3578062406600003', '', NULL, NULL, '', '', '', NULL, NULL, NULL, '2023', NULL, '3578062406600003@gmail.com', '123456', NULL, 1, 3, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
	(182, NULL, 'RISKY MAULANA', '', '3578110303980002@gmail.com', '', '', '1970-01-01', '3578110303980002', '', NULL, NULL, '', '', '', NULL, NULL, NULL, '2023', NULL, '3578110303980002@gmail.com', '123456', NULL, 1, 3, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
	(183, NULL, 'RR. NURUL QOMARIYAH', '', '3578164305700006@gmail.com', '', '', '1970-01-01', '3578164305700006', '', NULL, NULL, '', '', '', NULL, NULL, NULL, '2023', NULL, '3578164305700006@gmail.com', '123456', NULL, 1, 3, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
	(184, NULL, 'KURNIA TSALITSATIN ROBANIYAH', '', '3578055111810009@gmail.com', '', '', '1970-01-01', '3578055111810009', '', NULL, NULL, '', '', '', NULL, NULL, NULL, '2023', NULL, '3578055111810009@gmail.com', '123456', NULL, 1, 3, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
	(185, NULL, 'NUR HOLIFAH', '', '3578176910940002@gmail.com', '', '', '1970-01-01', '3578176910940002', '', NULL, NULL, '', '', '', NULL, NULL, NULL, '2023', NULL, '3578176910940002@gmail.com', '123456', NULL, 1, 3, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
	(186, NULL, 'SRI RAHAYU', '', '3578164112650003@gmail.com', '', '', '1970-01-01', '3578164112650003', '', NULL, NULL, '', '', '', NULL, NULL, NULL, '2023', NULL, '3578164112650003@gmail.com', '123456', NULL, 1, 3, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
	(187, NULL, 'AHMAD BAIDHOWI', '', '3513212603970001@gmail.com', '', '', '1970-01-01', '3513212603970001', '', NULL, NULL, '', '', '', NULL, NULL, NULL, '2023', NULL, '3513212603970001@gmail.com', '123456', NULL, 1, 3, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
	(188, NULL, 'IKA SAFITRI', '', '3514126808820003@gmail.com', '', '', '1970-01-01', '3514126808820003', '', NULL, NULL, '', '', '', NULL, NULL, NULL, '2023', NULL, '3514126808820003@gmail.com', '123456', NULL, 1, 3, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
	(189, NULL, 'MUTIARA HANY HAMDIYAH', '', '3525124312940002@gmail.com', '', '', '1970-01-01', '3525124312940002', '', NULL, NULL, '', '', '', NULL, NULL, NULL, '2023', NULL, '3525124312940002@gmail.com', '123456', NULL, 1, 3, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
	(190, NULL, 'GATOT SUGIANTO', '', '3578102612760004@gmail.com', '', '', '1970-01-01', '3578102612760004', '', NULL, NULL, '', '', '', NULL, NULL, NULL, '2023', NULL, '3578102612760004@gmail.com', '123456', NULL, 1, 3, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
	(191, NULL, 'SITI ROHMI', '', '3578102612761114@gmail.com', '', '', '1970-01-01', '3578102612761114', '', NULL, NULL, '', '', '', NULL, NULL, NULL, '2023', NULL, '3578102612761114@gmail.com', '123456', NULL, 1, 3, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
	(192, NULL, 'SITI MUSAWAROH', '', '3578165507710006@gmail.com', '', '', '1970-01-01', '3578165507710006', '', NULL, NULL, '', '', '', NULL, NULL, NULL, '2023', NULL, '3578165507710006@gmail.com', '123456', NULL, 1, 3, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
	(193, NULL, 'ACHMAD ZAINI', '', '3578165507711006@gmail.com', '', '', '1970-01-01', '3578165507711006', '', NULL, NULL, '', '', '', NULL, NULL, NULL, '2023', NULL, '3578165507711006@gmail.com', '123456', NULL, 1, 3, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
	(194, NULL, 'SOEDJOKO', '', '3578161404690001@gmail.com', '', '', '1970-01-01', '3578161404690001', '', NULL, NULL, '', '', '', NULL, NULL, NULL, '2023', NULL, '3578161404690001@gmail.com', '123456', NULL, 1, 3, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
	(195, NULL, 'KUN WARIATI', '', '3578295412710002@gmail.com', '', '', '1970-01-01', '3578295412710002', '', NULL, NULL, '', '', '', NULL, NULL, NULL, '2023', NULL, '3578295412710002@gmail.com', '123456', NULL, 1, 3, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
	(196, NULL, 'ACHMAD RIZKI', '', '3578161506970003@gmail.com', '', '', '1970-01-01', '3578161506970003', '', NULL, NULL, '', '', '', NULL, NULL, NULL, '2023', NULL, '3578161506970003@gmail.com', '123456', NULL, 1, 3, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
	(197, NULL, 'MOCHAMAD THORIQ NURDIN', '', '3578051311890004@gmail.com', '', '', '1970-01-01', '3578051311890004', '', NULL, NULL, '', '', '', NULL, NULL, NULL, '2023', NULL, '3578051311890004@gmail.com', '123456', NULL, 1, 3, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
	(198, NULL, 'ABDUL AZIES', '', '3578172010790002@gmail.com', '', '', '1970-01-01', '3578172010790002', '', NULL, NULL, '', '', '', NULL, NULL, NULL, '2023', NULL, '3578172010790002@gmail.com', '123456', NULL, 1, 3, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
	(199, NULL, 'BUDIMAN W.', '', '3578170707550002@gmail.com', '', '', '1970-01-01', '3578170707550002', '', NULL, NULL, '', '', '', NULL, NULL, NULL, '2023', NULL, '3578170707550002@gmail.com', '123456', NULL, 1, 3, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
	(200, NULL, 'ILYAS NOERSOLIM', '', '3578081505630004@gmail.com', '', '', '1970-01-01', '3578081505630004', '', NULL, NULL, '', '', '', NULL, NULL, NULL, '2023', NULL, '3578081505630004@gmail.com', '123456', NULL, 1, 3, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
	(201, NULL, 'SUPRIJANTO', '', '3578081505630005@gmail.com', '', '', '1970-01-01', '3578081505630005', '', NULL, NULL, '', '', '', NULL, NULL, NULL, '2023', NULL, '3578081505630005@gmail.com', '123456', NULL, 1, 3, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
	(202, NULL, 'FAHMI BIN SALEH A.', '', '3578161406900005@gmail.com', '', '', '1970-01-01', '3578161406900005', '', NULL, NULL, '', '', '', NULL, NULL, NULL, '2023', NULL, '3578161406900005@gmail.com', '123456', NULL, 1, 3, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
	(203, NULL, 'WISNU PRADINATA', '', '3528040303970001@gmail.com', '', '', '1970-01-01', '3528040303970001', '', NULL, NULL, '', '', '', NULL, NULL, NULL, '2023', NULL, '3528040303970001@gmail.com', '123456', NULL, 1, 3, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
	(204, NULL, 'Panitia PPDB', 'Sidotopo Wetan Baru No.37 Surabaya', 'ppdb', '', '', '2022-11-08', '', '', NULL, NULL, 'islam', 'Others', '', NULL, NULL, NULL, '2022', NULL, 'ppdb', '123456', NULL, 1, 4, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
	(205, NULL, 'Aulia Zulfikar, S.Pd', '', 'malika110719@gmail.com', '', '', '2023-01-13', '1983 04 10 2006 07 0420', '', NULL, NULL, 'islam', 'Male', '', NULL, NULL, NULL, '2022', NULL, 'malika110719@gmail.com', '123456', NULL, 1, 4, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
	(206, NULL, 'Djumadi, S.Pd', '', 'djumadi_hilmy@yahoo.co.id', '', '', '2023-01-13', '1969 05 27 1996 07 0283', '', NULL, NULL, 'islam', 'Male', '', NULL, NULL, NULL, '2022', NULL, 'djumadi_hilmy@yahoo.co.id', '123456', NULL, 1, 4, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
	(207, NULL, 'Rokayah', '', 'rukayahwh@gmail.com', '', '', '2023-01-13', '1988 11 18 2011 07 0498', '', NULL, NULL, 'islam', 'Female', '', NULL, NULL, NULL, '2022', NULL, 'rukayahwh@gmail.com', '123456', NULL, 1, 4, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
	(208, NULL, 'Achmad Junaidi, S.Kom', '', 'junales@gmail.com', '', '', '2023-01-13', '1984 08 25 2010 07 0492', '', NULL, NULL, 'islam', 'Male', '', NULL, NULL, NULL, '2022', NULL, 'junales@gmail.com', '123456', NULL, 1, 4, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
	(209, NULL, 'Soe eniek', '', 'latapameidindaanissa@gmail.com', '', '', '2023-01-12', '1970 04 06 1996 07 0319', '', NULL, NULL, 'islam', 'Male', '', NULL, NULL, NULL, '2022', NULL, 'latapameidindaanissa@gmail.com', '123456', NULL, 1, 4, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
	(210, NULL, 'H. Abd. Ro&#039;uf', '', 'abdulrouf@gmail.com', '', '', '2023-01-12', '1967 01 12 1998 07 0311', '', NULL, NULL, 'islam', 'Male', '', NULL, NULL, NULL, '2022', NULL, 'abdulrouf@gmail.com', '123456', NULL, 1, 4, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
	(211, NULL, 'Sri Rahayu', '', 'srirahayum567@gmail.com', '', '', '2023-01-12', '1965 12 01 1999 07 0327', '', NULL, NULL, 'islam', 'Female', '', NULL, NULL, NULL, '2022', NULL, 'srirahayum567@gmail.com', '123456', NULL, 1, 4, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
	(212, NULL, 'Soebagijo', '', 'soebagijo1970@gmail.com', '', '', '2023-01-12', '1970 01 28 2000 07 0310', '', NULL, NULL, 'islam', 'Male', '', NULL, NULL, NULL, '2022', NULL, 'soebagijo1970@gmail.com', '123456', NULL, 1, 4, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
	(213, NULL, 'Nunik Haryani', '', 'hanna3aulia@gmail.com', '', '', '2023-01-12', '1976 04 05 2003 07 0393', '', NULL, NULL, 'islam', 'Female', '', NULL, NULL, NULL, '2022', NULL, 'hanna3aulia@gmail.com', '123456', NULL, 1, 4, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
	(214, NULL, 'Wiwik Winarti', '', 'wiwiknarendra@yahoo.com', '', '', '2023-01-12', '1976 06 04 2004 07 0397', '', NULL, NULL, 'islam', 'Female', '', NULL, NULL, NULL, '2022', NULL, 'wiwiknarendra@yahoo.com', '123456', NULL, 1, 4, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
	(215, NULL, 'Ahsanuddin, S.Ag', '', 'ahsanuddin7642@gmail.com', '', '', '2023-01-13', '1976 04 01 2004 07 0401', '', NULL, NULL, 'islam', 'Male', '', NULL, NULL, NULL, '2022', NULL, 'ahsanuddin7642@gmail.com', '123456', NULL, 1, 4, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
	(216, NULL, 'Siswati', '', 'busiswati2016@gmail.com', '', '', '2023-01-12', '1977 04 09 2004 07 0403', '', NULL, NULL, 'islam', 'Female', '', NULL, NULL, NULL, '2022', NULL, 'busiswati2016@gmail.com', '123456', NULL, 1, 4, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
	(217, NULL, 'M. Syafiuddin Zamzam', '', 'iukz@email.com', '', '', '2023-01-13', '1981 10 03 2004 07 0399', '', NULL, NULL, 'islam', 'Male', '', NULL, NULL, NULL, '2022', NULL, 'iukz@email.com', '123456', NULL, 1, 4, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
	(218, NULL, 'Suliha Kamil', '', 'sulihakamil@gmail.com', '', '', '2023-01-13', '1980 08 30 2008 07 0456', '', NULL, NULL, 'islam', 'Female', '', NULL, NULL, NULL, '2022', NULL, 'sulihakamil@gmail.com', '123456', NULL, 1, 4, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
	(219, NULL, 'Deddy Purwanto', '', 'y1nxt5@erapor-smk.net', '', '', '2023-01-13', '1980 12 17 2005 07 0411', '', NULL, NULL, 'islam', 'Male', '', NULL, NULL, NULL, '2022', NULL, 'y1nxt5@erapor-smk.net', '123456', NULL, 1, 4, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
	(220, NULL, 'Febriani Setyawati', '', 'poseidoncake605@gmail.com', '', '', '2023-01-13', '1982 02 07 2008 07 0458', '', NULL, NULL, 'islam', 'Female', '', NULL, NULL, NULL, '2022', NULL, 'poseidoncake605@gmail.com', '123456', NULL, 1, 4, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
	(221, NULL, 'Catur Budi Darmawan', '', 'arekkentir666@yahoo.com', '', '', '2023-01-12', '1974 04 13 2008 07 0462', '', NULL, NULL, 'islam', 'Male', '', NULL, NULL, NULL, '2022', NULL, 'arekkentir666@yahoo.com', '123456', NULL, 1, 4, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
	(222, NULL, 'Hekmah Amala', '', 'hekmahamala84@gmail.com', '', '', '2023-01-13', '1984 11 10 2008 07 0461', '', NULL, NULL, 'islam', 'Female', '', NULL, NULL, NULL, '2022', NULL, 'hekmahamala84@gmail.com', '123456', NULL, 1, 4, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
	(223, NULL, 'M. Setiyawan', '', 'awanisti@gmail.com', '', '', '2023-01-13', '1984 04 22 2008 07 0464', '', NULL, NULL, 'islam', 'Male', '', NULL, NULL, NULL, '2022', NULL, 'awanisti@gmail.com', '123456', NULL, 1, 4, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
	(224, NULL, 'Aisyah Noormawati', '', 'noormawatiaisyah@yahoo.com', '', '', '2023-01-12', '1975 03 17 2009 07 0477', '', NULL, NULL, 'islam', 'Female', '', NULL, NULL, NULL, '2022', NULL, 'noormawatiaisyah@yahoo.com', '123456', NULL, 1, 4, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
	(225, NULL, 'Elok Tri Cahyani', '', 'eloktricahyani29@gmail.com', '', '', '2023-01-13', '1981 09 29 2009 07 0468', '', NULL, NULL, 'islam', 'Female', '', NULL, NULL, NULL, '2022', NULL, 'eloktricahyani29@gmail.com', '123456', NULL, 1, 4, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
	(226, NULL, 'Roni Fauzi', '', 'roni.fauzi@gmail.com', '', '', '2023-01-13', '1987 03 10 2010 07 0491', '', NULL, NULL, 'islam', 'Male', '', NULL, NULL, NULL, '2022', NULL, 'roni.fauzi@gmail.com', '123456', NULL, 1, 4, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
	(227, NULL, 'Sriyani', '', 'cuteziendah46@gmail.com', '', '', '2023-01-13', '1984 06 22 2010 07 0490', '', NULL, NULL, 'islam', 'Female', '', NULL, NULL, NULL, '2022', NULL, 'cuteziendah46@gmail.com', '123456', NULL, 1, 4, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
	(228, NULL, 'Ayu Dwi Cahyani', '', 'ayudwicahyani8@gmail.com', '', '', '2023-01-13', '1980 05 03 2010 07 0499', '', NULL, NULL, '', 'Female', '', NULL, NULL, NULL, '2022', NULL, 'ayudwicahyani8@gmail.com', '123456', NULL, 1, 4, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
	(229, NULL, 'Winarko Hidayat', '', 'muhammad.heco@yahoo.com', '', '', '2023-01-12', '1972 03 03 2010 07 0488', '', NULL, NULL, 'islam', 'Male', '', NULL, NULL, NULL, '2022', NULL, 'muhammad.heco@yahoo.com', '123456', NULL, 1, 4, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
	(230, NULL, 'Maslichatin, S.Th.I', '', 'micha.fulla@gmail.com', '', '', '2023-01-13', '1979 11 04 2011 07 0504', '', NULL, NULL, 'islam', 'Female', '', NULL, NULL, NULL, '2022', NULL, 'micha.fulla@gmail.com', '123456', NULL, 1, 4, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
	(231, NULL, 'Fullatul Aini', '', 'fillatul.aini.baru@gmail.com', '', '', '2023-01-12', '1976 06 30 2011 07 0346', '', NULL, NULL, 'islam', 'Female', '', NULL, NULL, NULL, '2022', NULL, 'fillatul.aini.baru@gmail.com', '123456', NULL, 1, 4, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
	(232, NULL, 'Kuncahyo Arif S.', '', 'kuncahyo28@gmail.com', '', '', '2023-01-13', '1987 12 28 2011 07 0501', '', NULL, NULL, 'islam', 'Male', '', NULL, NULL, NULL, '2022', NULL, 'kuncahyo28@gmail.com', '123456', NULL, 1, 4, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
	(233, NULL, 'Rukmaningsih', '', 'ashari.r.ar@gmail.com', '', '', '2023-01-13', '1981 03 08 2010 07 0489', '', NULL, NULL, 'islam', 'Female', '', NULL, NULL, NULL, '2022', NULL, 'ashari.r.ar@gmail.com', '123456', NULL, 1, 4, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
	(234, NULL, 'Ani Rosidah', '', 'ani.alwafa111@gmail.com', '', '', '2023-01-13', '1981 11 15 2012 07 0453', '', NULL, NULL, 'islam', 'Female', '', NULL, NULL, NULL, '2022', NULL, 'ani.alwafa111@gmail.com', '123456', NULL, 1, 4, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
	(235, NULL, 'Maria Ulfa', '', 'mariaulfa0605@gmail.com', '', '', '2023-01-13', '1985 05 06 2012 07 0455', '', NULL, NULL, 'islam', 'Female', '', NULL, NULL, NULL, '2022', NULL, 'mariaulfa0605@gmail.com', '123456', NULL, 1, 4, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
	(236, NULL, 'Taufiq Hidayat', '', 'taufiqht1969@gmail.com', '', '', '2023-01-12', '1969 04 19 2012 07 0514', '', NULL, NULL, 'islam', 'Male', '', NULL, NULL, NULL, '2022', NULL, 'taufiqht1969@gmail.com', '123456', NULL, 1, 4, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
	(237, NULL, 'Nurul Faujiyah', '', 'nurfa-chayank@yahoo.co.id', '', '', '2023-01-13', '1990 03 17 2012 07 0513', '', NULL, NULL, 'islam', 'Female', '', NULL, NULL, NULL, '2022', NULL, 'nurfa-chayank@yahoo.co.id', '123456', NULL, 1, 4, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
	(238, NULL, 'Anik Yuni Rahayu', '', 'mbakyuni48@gmail.com', '', '', '2023-01-13', '1983 06 25 2013 07 0516', '', NULL, NULL, 'islam', 'Female', '', NULL, NULL, NULL, '2022', NULL, 'mbakyuni48@gmail.com', '123456', NULL, 1, 4, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
	(239, NULL, 'Kurnia Tsalisatin', '', 'kurnia_tsalitsatin@yahoo.co.id', '', '', '2023-01-13', '1981 11 11 2014 07 0429', '', NULL, NULL, 'islam', 'Female', '', NULL, NULL, NULL, '2022', NULL, 'kurnia_tsalitsatin@yahoo.co.id', '123456', NULL, 1, 4, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
	(240, NULL, 'Reni Zumzumi', '', 'rzumzumy@gmail.com', '', '', '2023-01-13', '1985 11 14 2014 07 0522', '', NULL, NULL, 'islam', 'Female', '', NULL, NULL, NULL, '2022', NULL, 'rzumzumy@gmail.com', '123456', NULL, 1, 4, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
	(241, NULL, 'Subairi Khalil', '', 'subairikhalil@gmail.com', '', '', '2023-01-13', '1987 09 19  2014 07 0523', '', NULL, NULL, 'islam', 'Male', '', NULL, NULL, NULL, '2022', NULL, 'subairikhalil@gmail.com', '123456', NULL, 1, 4, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
	(242, NULL, 'Fitrah Insani, SE', '', 'fitrahinsani0201@gmail.com', '', '', '2023-01-13', '1988 01 02 2016 07 0560', '', NULL, NULL, 'islam', 'Female', '', NULL, NULL, NULL, '2022', NULL, 'fitrahinsani0201@gmail.com', '123456', NULL, 1, 4, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
	(243, NULL, 'Ayu Laily Qomariyah', '', 'ayu.laely10@gmail.com', '', '', '2023-01-13', '1993 10 10 2016 07 0563', '', NULL, NULL, 'islam', 'Female', '', NULL, NULL, NULL, '2022', NULL, 'ayu.laely10@gmail.com', '123456', NULL, 1, 4, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
	(244, NULL, 'Nurfia Lely Chomariya', '', 'nurfialely17@gmail.com', '', '', '2023-01-13', '1995 03 17 2017 07 0570', '', NULL, NULL, 'islam', 'Female', '', NULL, NULL, NULL, '2022', NULL, 'nurfialely17@gmail.com', '123456', NULL, 1, 4, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
	(245, NULL, 'Amalia Sofianti', '', 'calvinmelia2@gmail.com', '', '', '2023-01-12', '1979 10 19 2017 07 0569', '', NULL, NULL, 'islam', 'Female', '', NULL, NULL, NULL, '2022', NULL, 'calvinmelia2@gmail.com', '123456', NULL, 1, 4, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
	(246, NULL, 'Yanarto Teguh P.', '', 'yanarto@gmail.com', '', '', '2023-01-12', '1977 01 04 2017 07 0571', '', NULL, NULL, 'islam', 'Male', '', NULL, NULL, NULL, '2022', NULL, 'yanarto@gmail.com', '123456', NULL, 1, 4, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
	(247, NULL, 'Prihatiana P. N.', '', 'tiananidyawati@gmail.com', '', '', '2023-01-13', '1985 04 28 2017 07 0572', '', NULL, NULL, 'islam', 'Female', '', NULL, NULL, NULL, '2022', NULL, 'tiananidyawati@gmail.com', '123456', NULL, 1, 4, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
	(248, NULL, 'Nur Ardiana Sholehati', '', 'sh.ardiana@yahoo.co.id', '', '', '2023-01-13', '1992 08 20 2017 07 0573', '', NULL, NULL, 'islam', 'Female', '', NULL, NULL, NULL, '2022', NULL, 'sh.ardiana@yahoo.co.id', '123456', NULL, 1, 4, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
	(249, NULL, 'Chalimatus S.', '', 'chalimatussholikhah@yahoo.com', '', '', '2023-01-13', '1993 04 22 2018 07 0608', '', NULL, NULL, 'islam', 'Female', '', NULL, NULL, NULL, '2022', NULL, 'chalimatussholikhah@yahoo.com', '123456', NULL, 1, 4, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
	(250, NULL, 'Muhamimin', '', 'muhaimin0678@gmail.com', '', '', '2023-01-12', '1978 10 06 2018 07 0606', '', NULL, NULL, 'islam', 'Male', '', NULL, NULL, NULL, '2022', NULL, 'muhaimin0678@gmail.com', '123456', NULL, 1, 4, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
	(251, NULL, 'M. Rifai Abdzar Gifari', '', 'rifaiabdzar@gmail.com', '', '', '2023-01-13', '1997 01 08 2019 07 0582', '', NULL, NULL, 'islam', 'Male', '', NULL, NULL, NULL, '2022', NULL, 'rifaiabdzar@gmail.com', '123456', NULL, 1, 4, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
	(252, NULL, 'ARIF ZAINURI RACHMAN', '', 'ARIF@GMAIL.COM', '', '', '2023-01-16', '196906211992070223', '', NULL, NULL, 'islam', 'Male', '', NULL, NULL, NULL, '2023', NULL, 'ARIF@GMAIL.COM', '123456', NULL, 1, 4, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
	(253, NULL, 'Dra. Hj. Muntafi&#039;ah Djauhari', 'Sidotopo Wetan Baru IV A', 'tafiksmk@gmail.com', '81332025574', '81332025574', '1970-01-01', '1963 12 14 1989 03 2006', '', NULL, NULL, '', '', '', NULL, NULL, NULL, '2023', NULL, 'tafiksmk@gmail.com', '123456', NULL, 1, 4, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
	(254, NULL, 'anindita', 'surabaya', 'anindita@gmail.com', '085970248011', NULL, NULL, '102310', NULL, NULL, NULL, NULL, 'Wanita', NULL, NULL, NULL, 6, NULL, NULL, 'anindita', 'asdf123', 1, 1, 4, 2, 2, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
	(255, NULL, 'bila', 'surabaya', 'fitria@gmail.com', NULL, NULL, NULL, '102323', '11313411', NULL, NULL, NULL, 'Wanita', NULL, NULL, NULL, 5, NULL, NULL, 'bila', 'asdf123', 1, 1, 3, 1, 1, 2, 4, 2, NULL, NULL, NULL, NULL, NULL, NULL),
	(256, NULL, 'difa', 'surabaya', 'fitria@gmail.com', NULL, NULL, NULL, '102327', '11313411', NULL, NULL, NULL, 'Wanita', NULL, NULL, NULL, 5, NULL, NULL, 'nadifa', 'asdf123', 1, 1, 5, 1, 1, 2, 4, 2, NULL, NULL, NULL, NULL, NULL, NULL),
	(259, NULL, 'mira', 'surabaya', 'mira@gmail.com', NULL, NULL, NULL, '10232712', '11313411', NULL, NULL, NULL, 'Wanita', NULL, NULL, NULL, 6, NULL, NULL, 'mira', 'asdf123', 1, 1, 2, 2, NULL, NULL, 4, 2, NULL, NULL, NULL, NULL, NULL, NULL),
	(260, NULL, 'Lita', 'surabaya', 'fitria@gmail.com', NULL, NULL, NULL, '1023232', '11313411', NULL, NULL, NULL, 'Wanita', NULL, NULL, NULL, 6, NULL, NULL, 'Lita', 'asdf123', 1, 1, 3, 2, 1, 2, 4, 2, NULL, NULL, NULL, NULL, NULL, NULL),
	(261, NULL, 'arlida', 'surabaya', 'fitria@gmail.com', NULL, NULL, NULL, '1023231', '11313411', NULL, NULL, NULL, 'Wanita', NULL, NULL, NULL, 6, NULL, NULL, 'Arlida', 'asdf123', 1, 1, 5, 2, 1, 2, 4, 2, NULL, NULL, NULL, NULL, NULL, NULL),
	(262, NULL, 'septi', 'surabaya', 'kebab@gmail.com', NULL, NULL, NULL, '1023212', NULL, NULL, NULL, NULL, 'Wanita', NULL, NULL, NULL, 11, NULL, NULL, 'septi', 'asdf123', 1, 1, 3, 3, 2, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
	(263, NULL, 'shilla', 'surabaya', 'kebab@gmail.com', NULL, NULL, NULL, '10232122', NULL, NULL, NULL, NULL, 'Wanita', NULL, NULL, NULL, 11, NULL, NULL, 'shila', 'asdf123', 1, 1, 5, 3, 2, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
	(264, NULL, 'ellenia', 'surabaya', 'kebab@gmail.com', NULL, NULL, NULL, '10232124', NULL, NULL, NULL, NULL, 'Wanita', NULL, NULL, NULL, 11, NULL, NULL, 'ellenia', 'asdf123', 1, 1, 2, 3, 2, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
	(269, NULL, 'Emilya Kartika Sari,S.Pd', 'Gembong 4/47A', '199007232015070541', '085732766067', '085732766067', '2023-01-26', '19900723', '0758301154', NULL, NULL, NULL, 'Wanita', 'GTY', NULL, NULL, 151, '2015', NULL, '19900723', '123456', 1, 1, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
	(273, NULL, 'Dra. NINING PARANTIANINGSIH', 'Jl. Kedinding Lor Raflesia 1 No. 3', 'nparantianingsih@gmail.com', '081336449249', '081336449249', '2023-01-16', '196512051993070226', '', NULL, NULL, 'islam', 'Wanita', 'GTY', NULL, NULL, 5, '2023', NULL, 'nparantianingsih@gmail.com', '123456', 1, 1, 3, 1, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
	(274, NULL, 'KUNCAHYANING FITRIA SANTOSO, M.Pd.', 'Jl. Pacar Keling 2/77', 'zaicha.ria22@gmail.com', '083831106386', '083831106386', '2023-01-18', '199202222015070546', '', NULL, NULL, 'islam', 'Wanita', 'GTY', NULL, NULL, 5, '2023', NULL, 'zaicha.ria22@gmail.com', '123456', 1, 1, 3, 1, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
	(275, NULL, 'AINUL YAQIN, S.Si.', 'Jl. Bulak Banteng Baru Gg Mawar No. 15 Surabaya', 'ainulyaqinpwh1@gmail.com', '085655815700', '085655815700', '2023-01-18', '198008252004070404', '', NULL, NULL, 'islam', 'Pria', 'GTY', NULL, NULL, 5, '2023', NULL, 'ainulyaqinpwh1@gmail.com', '123456', 1, 1, 3, 1, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
	(276, NULL, 'TAUFIQ HIDAYAT, S.Si.', 'Jl. Kapas Baru 2/106', 'taufiqkur29@gmail.com', '085648029960', '085648029960', '2023-01-16', '198306292008070448', '', NULL, NULL, 'islam', 'Pria', 'GTY', NULL, NULL, 5, '2023', NULL, 'taufiqkur29@gmail.com', '123456', 1, 1, 3, 1, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
	(277, NULL, 'CATTRI SIGIT WIDYASTUTI, S.Pd.', 'JL. Margodadi VI/15', 'cattrisigwh@yahoo.com', '082140909027', '082140909027', '2023-01-18', '198011212007070433', '', NULL, NULL, 'islam', 'Wanita', 'GTY', NULL, NULL, 5, '2023', NULL, 'cattrisigwh@yahoo.com', '123456', 1, 1, 3, 1, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
	(278, NULL, 'H. ABDUL HADI, S.Pd.I', 'JL. Sidorukun 1 no. 123', 'abdhadipwh1@gmail.com', '081332938304', '081332938304', '2023-01-16', '195508061997070291', '', NULL, NULL, 'islam', 'Pria', 'GTY', NULL, NULL, 5, '2023', NULL, 'abdhadipwh1@gmail.com', '123456', 1, 1, 3, 1, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
	(279, NULL, 'H. ACHMAD FADLAN, S.Ag.', 'Jl. Sidesermo Dalam no. 16', 'ahmadfadlan271@gmail.com', '085855581945', '085855581945', '2023-01-18', '196402131995070258', '', NULL, NULL, 'islam', 'Pria', 'GTY', NULL, NULL, 5, '2023', NULL, 'ahmadfadlan271@gmail.com', '123456', 1, 1, 3, 1, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
	(280, NULL, 'AKHMAD FAUZI, S.Pd.I.', 'JL. Platuk Baru IA/71A', 'caica7915@gmail.com', '089520164531', '089520164531', '2023-01-18', '197905112010070338', '', NULL, NULL, 'islam', 'Pria', 'GTY', NULL, NULL, 5, '2023', NULL, 'caica7915@gmail.com', '123456', 1, 1, 3, 1, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
	(281, NULL, 'AHMAD SUWAIFIE, S.H.', 'Jl. Ngelom II/15 Taman', 'ifie81@yahoo.com', '085648910344', '085648910344', '2023-01-18', '198111252006070423', '', NULL, NULL, 'islam', 'Pria', 'GTT', NULL, NULL, 5, '2023', NULL, 'ifie81@yahoo.com', '123456', 1, 1, 3, 1, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
	(282, NULL, 'ALIP NURFAIZAH, S.Pd.', 'PERUM GRAHA MUTIARA INDAH A11/05', 'aliefnurfaizah@gmail.com', '081330455277', '081330455277', '2023-01-18', '198402172007070436', '', NULL, NULL, 'islam', 'Wanita', 'GTY', NULL, NULL, 5, '2023', NULL, 'aliefnurfaizah@gmail.com', '123456', 1, 1, 3, 1, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
	(283, NULL, 'ANNA LATIFAH, S.Pd.', 'JL. Randu Agung III/55', 'annalatifah45@gmail.com', '081235747783', '081235747783', '2023-01-18', '197503091998070251', '', NULL, NULL, 'islam', 'Wanita', 'GTY', NULL, NULL, 5, '2023', NULL, 'annalatifah45@gmail.com', '123456', 1, 1, 3, 1, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
	(284, NULL, 'AULIA ZULFIKAR, S.Pd.', 'Jl. Wonorejo I/1D', 'auliazulfikar1004@gmail.com', '089531900475', '089531900475', '2023-01-18', '198304102006070420', '', NULL, NULL, 'islam', 'Pria', 'GTY', NULL, NULL, 5, '2023', NULL, 'auliazulfikar1004@gmail.com', '123456', 1, 1, 3, 1, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
	(285, NULL, 'CHOIRIYAH, S.Pd.', 'Jl. Bulak Rukem 3C/4', 'choiriyahspd3@gmail.com', '082131841556', '082131841556', '2023-01-16', '197002261998070248', '', NULL, NULL, 'islam', 'Wanita', 'GTY', NULL, NULL, 5, '2023', NULL, 'choiriyahspd3@gmail.com', '123456', 1, 1, 3, 1, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
	(286, NULL, 'CHOIRUR ROBIAH, S.Psi.', 'JL. SIDOMULYO 2-E /10- B', 'choirurrobiah989@gmail.com', '085806500168', '085806500168', '2023-01-18', '198411252010070486', '', NULL, NULL, 'islam', 'Wanita', 'GTY', NULL, NULL, 5, '2023', NULL, 'choirurrobiah989@gmail.com', '123456', 1, 1, 3, 1, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
	(287, NULL, 'DWI ISTRIANA SUWITARINI, S.Psi.', 'Jl. Tenggumung Karya Lor 83', 'dwiistriana11@gmail.com', '08813584344', '08813584344', '2023-01-18', '197404241999070326', '', NULL, NULL, 'islam', 'Wanita', 'GTY', NULL, NULL, 5, '2023', NULL, 'dwiistriana11@gmail.com', '123456', 1, 1, 3, 1, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
	(288, NULL, 'GANDUNG SUPRI HARTOYO, S.Pd.', 'Jl. Gading 1/23', 'gandungwachidhasyim@gmail.com', '083856926004', '083856926004', '2023-01-16', '196709081999070325', '', NULL, NULL, 'islam', 'Pria', 'GTY', NULL, NULL, 5, '2023', NULL, 'gandungwachidhasyim@gmail.com', '123456', 1, 1, 3, 1, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
	(289, NULL, 'GATOT SUGIANTO, S.Pd.', 'Jl. Rangkah VII/70-b', 'smpwachidhasyim@yahoo.com', '083830754144', '083830754144', '2023-01-18', '197612261997070286', '', NULL, NULL, 'islam', 'Pria', 'GTY', NULL, NULL, 5, '2023', NULL, 'smpwachidhasyim@yahoo.com', '123456', 1, 1, 3, 1, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
	(290, NULL, 'HUSNUL KHOTIMAH, S.Or.', 'Jl. Bumiarjo 5/56B', 'chusnulkhotimwh@yahoo.com', '85732149029', '85732149029', '2023-01-18', '199201062014070526', '', NULL, NULL, 'islam', 'Wanita', 'GTY', NULL, NULL, 5, '2023', NULL, 'chusnulkhotimwh@yahoo.com', '123456', 1, 1, 3, 1, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
	(291, NULL, 'SITTY CHOLIFAH', 'DUKUH SETRO RAWASAN 5/12', 'ifasitty@gmail.com', '087856644482', '087856644482', '1989-03-05', '198903052016070583', '', NULL, NULL, 'islam', 'Wanita', 'PTY', NULL, NULL, 5, '2023', NULL, 'ifasitty@gmail.com', '123456', 1, 1, 3, 3, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
	(292, NULL, 'Drs. KUNTO BUDI WARSONO', 'Jl. Tenggumung Wetan Gang Salak No 5', 'KUNTOBW@GMAIL.COM', '081515022918', '081515022918', '2023-01-16', '196208291986070105', '', NULL, NULL, 'islam', 'Pria', 'GTY', NULL, NULL, 5, '2023', NULL, 'KUNTOBW@GMAIL.COM', '123456', 1, 1, 3, 1, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
	(293, NULL, 'WIWIN SUSILOWATI', 'JATIPURWO 7/25', 'wiwiensusilowati732@gmail.com', '085852270773', '085852270773', '1974-03-30', '197403301995070267', '', NULL, NULL, 'islam', 'Wanita', 'PTY', NULL, NULL, 5, '2023', NULL, 'wiwiensusilowati732@gmail.com', '123456', 1, 1, 3, 3, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
	(294, NULL, 'LUTFIYAH KUSUMA', 'PANDEGILING 4/11', 'lutfiyahk7@gmail.com', '085808238501', '085808238501', '2023-01-13', '198202262006070479', '', NULL, NULL, 'islam', 'Wanita', 'PTY', NULL, NULL, 5, '2023', NULL, 'lutfiyahk7@gmail.com', '123456', 1, 1, 3, 3, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
	(295, NULL, 'IVA VITYANA', 'DUKUH BULAK BANTENG SUROPATI III NO. 4 SURABAYA', 'ivavityana12@gmail.com', '081282976805', '081282976805', '1972-02-08', '197202081991070203', '', NULL, NULL, 'islam', 'Wanita', 'PTY', NULL, NULL, 5, '2023', NULL, 'ivavityana12@gmail.com', '123456', 1, 1, 3, 3, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
	(296, NULL, 'NURUL CHOLIDAH', 'PLEMAHAN 6/11', 'rulbams@gmail.com', '087779998470', '087779998470', '1975-12-21', '197512211995070268', '', NULL, NULL, 'islam', 'Wanita', 'PTY', NULL, NULL, 5, '2023', NULL, 'rulbams@gmail.com', '123456', 1, 1, 3, 3, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
	(297, NULL, 'Dra. Hj. KUSTANTRI NURWATI', 'JL. Jogoloyo Besar A No 32', 'kustantrinurwati12@gmail.com', '083130037637', '083130037637', '2023-01-16', '196512271993070227', '', NULL, NULL, 'islam', 'Wanita', 'GTY', NULL, NULL, 5, '2023', NULL, 'kustantrinurwati12@gmail.com', '123456', 1, 1, 3, 1, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
	(298, NULL, 'MOCH ZAINUL ARIFIN, SE.', 'JL. Margodadi III No 41', 'zaimazing@gmail.com', '085755809448', '085755809448', '2023-01-18', '197803282006070271', '', NULL, NULL, 'islam', 'Pria', 'GTY', NULL, NULL, 5, '2023', NULL, 'zaimazing@gmail.com', '123456', 1, 1, 3, 1, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
	(299, NULL, 'NUR HAYATI, S.Ag.', 'Jl. Rungkut Tengah III No 3', 'qcctc@sby.oas.co.id', '081938226575', '081938226575', '2023-01-18', '197501302000070339', '', NULL, NULL, 'islam', 'Wanita', 'GTY', NULL, NULL, 5, '2023', NULL, 'qcctc@sby.oas.co.id', '123456', 1, 1, 3, 1, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
	(300, NULL, 'NUR SUCI INDAH UTAMI, S.SI.', 'JL. BULAK BANTENG LOR BHINEKA 8/49', 'nsuci13@gmail.com', '85732821511', '85732821511', '2023-01-18', '198610132011070497', '', NULL, NULL, 'islam', 'Wanita', 'GTY', NULL, NULL, 5, '2023', NULL, 'nsuci13@gmail.com', '123456', 1, 1, 3, 1, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
	(301, NULL, 'NURIL FARAHANI, S.Si.', 'JL. Sidokapasan V/18', 'nurilfarahani@yahoo.co.id', '082141287748', '082141287748', '2023-01-18', '198104162007070343', '', NULL, NULL, 'islam', 'Wanita', 'GTY', NULL, NULL, 5, '2023', NULL, 'nurilfarahani@yahoo.co.id', '123456', 1, 1, 3, 1, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
	(302, NULL, 'NURUL HIDAYAT, S.Pd.I.', 'JL. Rangkah Buntu 2/16', 'nurulhidayatwh@yahoo.com', '085850087567', '085850087567', '2023-01-16', '196705282012070509', '', NULL, NULL, 'islam', 'Pria', 'GTY', NULL, NULL, 5, '2023', NULL, 'nurulhidayatwh@yahoo.com', '123456', 1, 1, 3, 1, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
	(303, NULL, 'NURULITA, S.Si.', 'JL. Tempurejo V/7', 'nurulitanurulita7@gmail.com', '081249805734', '081249805734', '2023-01-18', '197608042004070398', '', NULL, NULL, 'islam', 'Wanita', 'GTY', NULL, NULL, 5, '2023', NULL, 'nurulitanurulita7@gmail.com', '123456', 1, 1, 3, 1, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
	(304, NULL, 'PAMUJI, S.Pd.', 'JL. Kedinding Lor Kemuning I/35', 'pamudjipwh@yahoo.com', '081703413112', '081703413112', '2023-01-16', '196606072001070132', '', NULL, NULL, 'islam', 'Pria', 'GTY', NULL, NULL, 5, '2023', NULL, 'pamudjipwh@yahoo.com', '123456', 1, 1, 3, 1, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
	(305, NULL, 'QURROTU AINY, S.Psi.', 'JL. Peneleh IX/40-42', 'qainy.starsnake@gmail.com', '082190971280', '082190971280', '2023-01-18', '197710262008070465', '', NULL, NULL, 'islam', 'Wanita', 'GTY', NULL, NULL, 5, '2023', NULL, 'qainy.starsnake@gmail.com', '123456', 1, 1, 3, 1, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
	(306, NULL, 'RINA SULFIANA, S.Si.', 'Jl. Bulak Setro Indah II Blok B-37', 'rsulfiananjatmiko@gmail.com', '081803124887', '081803124887', '2023-01-18', '198101232006070421', '', NULL, NULL, 'islam', 'Wanita', 'GTY', NULL, NULL, 5, '2023', NULL, 'rsulfiananjatmiko@gmail.com', '123456', 1, 1, 3, 1, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
	(307, NULL, 'SELI MARDIANA, S.Pd.I', 'JL. Kedinding Lor Gang Rafflesia 2 No. 6', 'selimardiana33@gmail.com', '081250139886', '081250139886', '2023-01-18', '198607102012070507', '', NULL, NULL, 'islam', 'Wanita', 'GTY', NULL, NULL, 5, '2023', NULL, 'selimardiana33@gmail.com', '123456', 1, 1, 3, 1, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
	(308, NULL, 'SITI RAHMAH, S.Pd.', 'Jl. Kedinding Lor Teratai No. 154', 'rahmahsiti673@gmail.com', '081332158575', '081332158575', '2023-01-16', '197101091996070265', '', NULL, NULL, 'islam', 'Wanita', 'GTY', NULL, NULL, 5, '2023', NULL, 'rahmahsiti673@gmail.com', '123456', 1, 1, 3, 1, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
	(309, NULL, 'SRI UTARI, S.Pd.', 'JL. Sidotopo Wetan Baru IVA No. 62', 'sriut8418@gmail.com', '081313164771', '081313164771', '2023-01-18', '197208221999070316', '', NULL, NULL, 'islam', 'Wanita', 'GTY', NULL, NULL, 5, '2023', NULL, 'sriut8418@gmail.com', '123456', 1, 1, 3, 1, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
	(310, NULL, 'YAYUK MURTINI, S.Pd.', 'JL. Sidotopo Wetan V No. 56', 'yayukmurwh@yahoo.com', '081325279450', '081325279450', '2023-01-16', '196801071994070195', '', NULL, NULL, 'islam', 'Wanita', 'GTY', NULL, NULL, 5, '2023', NULL, 'yayukmurwh@yahoo.com', '123456', 1, 1, 3, 1, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
	(311, NULL, 'SUMIYATI, S.Pd.', 'JL. Gembong Kinco 9A', 'Mrdandre09@gmail.com', '081232711729', '081232711729', '2023-01-16', '196912161999070314', '', NULL, NULL, 'islam', 'Wanita', 'GTY', NULL, NULL, 5, '2023', NULL, 'Mrdandre09@gmail.com', '123456', 1, 1, 3, 1, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
	(312, NULL, 'YULIA RACHMA, S.Pd.', 'JL. KALILOM LOR INDAH GG DUKU NO.4', 'yulia290875@gmail.com', '082132261145', '082132261145', '2023-01-18', '197508291999070317', '', NULL, NULL, 'islam', 'Wanita', 'PTT', NULL, NULL, 5, '2023', NULL, 'yulia290875@gmail.com', '123456', 1, 1, 3, 1, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
	(313, NULL, 'Z. HASANAH MS, S.Pd.', 'JL. BULAK BANTENG BARU KENANGA II/81', 'hazasahsmpwh@yahoo.com', '081807983580', '081807983580', '2023-01-18', '197606202001070361', '', NULL, NULL, 'islam', 'Wanita', 'GTY', NULL, NULL, 5, '2023', NULL, 'hazasahsmpwh@yahoo.com', '123456', 1, 1, 3, 1, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
	(314, NULL, 'AGUSTINAH TANJUNG, S.Pd.', 'JL. TAMBAK SEGARAN WETAN 1/90', 'tinatanjung.tt@gmail.com', '085607772658', '085607772658', '2023-01-18', '198008292014070532', '', NULL, NULL, 'islam', 'Wanita', 'GTY', NULL, NULL, 5, '2023', NULL, 'tinatanjung.tt@gmail.com', '123456', 1, 1, 3, 1, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
	(315, NULL, 'YUKA YUANANDA WICAKSONO, S.Pd.', 'PERUM JAYA ABADII - 11', 'yukayuanandawicaksono@gmail.com', '085806330558', '085806330558', '2023-01-18', '199610182021110863', '', NULL, NULL, 'islam', 'Pria', 'GTT', NULL, NULL, 5, '2023', NULL, 'yukayuanandawicaksono@gmail.com', '123456', 1, 1, 3, 1, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
	(316, NULL, 'ARDESTI DEBY ARINDA, S.Pd.', 'JL. TAMBAK WEDI BARU GG.18-D UTARA NO.9', 'ardestidebyarinda@gmail.com', '0895803046840', '0895803046840', '2023-01-18', '199803202022010866', '', NULL, NULL, 'islam', 'Wanita', 'GTY', NULL, NULL, 5, '2023', NULL, 'ardestidebyarinda@gmail.com', '123456', 1, 1, 3, 1, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
	(317, NULL, 'INDAH JAUHAROH, S.Pd.', 'JL. WONOAYU. 81', 'indahjauharoh5@gmail.com', '089620069488', '089620069488', '2023-01-18', '199607072021110864', '', NULL, NULL, 'islam', 'Wanita', 'GTY', NULL, NULL, 5, '2023', NULL, 'indahjauharoh5@gmail.com', '123456', 1, 1, 3, 1, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
	(318, NULL, 'ROBBIYATUL MU&#039;AMALAH, S.Pd.', '', 'bellarobbiyatul@gmail.com', '085899913732', '085899913732', '2023-01-18', '199806152021110865', '', NULL, NULL, 'islam', 'Wanita', 'GTY', NULL, NULL, 5, '2023', NULL, 'bellarobbiyatul@gmail.com', '123456', 1, 1, 3, 1, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
	(319, NULL, 'SADIKIN', '', '3578171005780011@gmail.com', '', '', '1970-01-01', '3578171005780011', '', NULL, NULL, '', 'Wanita', '', NULL, NULL, 5, '2023', NULL, '3578171005780011@gmail.com', '123456', 1, 1, 4, 1, NULL, NULL, NULL, NULL, NULL, 48, NULL, NULL, NULL, NULL),
	(320, NULL, 'WILUDJENG', '', '3578164404680002@gmail.com', '', '', '1970-01-01', '3578164404680002', '', NULL, NULL, '', 'Wanita', '', NULL, NULL, 5, '2023', NULL, '3578164404680002@gmail.com', '123456', 1, 1, 4, 1, NULL, NULL, NULL, NULL, NULL, 16, NULL, NULL, NULL, NULL),
	(321, NULL, 'AKHMAD SUHARDIANTO', '', '3578152104890001@gmail.com', '', '', '1970-01-01', '3578152104890001', '', NULL, NULL, '', 'Wanita', '', NULL, NULL, 5, '2023', NULL, '3578152104890001@gmail.com', '123456', 1, 1, 4, 1, NULL, NULL, NULL, NULL, NULL, 48, NULL, NULL, NULL, NULL),
	(322, NULL, 'MOCHAMMAD RIZQI WACHID SETYAWAN', '', '3578081005990004@gmail.com', '', '', '1970-01-01', '3578081005990004', '', NULL, NULL, '', 'Wanita', '', NULL, NULL, 5, '2023', NULL, '3578081005990004@gmail.com', '123456', 1, 1, 4, 1, NULL, NULL, NULL, NULL, NULL, 24, NULL, NULL, NULL, NULL),
	(323, NULL, 'ZULAIKHAH', '', '3578174905600001@gmail.com', '', '', '1970-01-01', '3578174905600001', '', NULL, NULL, '', 'Wanita', '', NULL, NULL, 5, '2023', NULL, '3578174905600001@gmail.com', '123456', 1, 1, 4, 1, NULL, NULL, NULL, NULL, NULL, 24, NULL, NULL, NULL, NULL),
	(324, NULL, 'AINUR MAULUD FINA', '', '3578166610880002@gmail.com', '', '', '1970-01-01', '3578166610880002', '', NULL, NULL, '', 'Wanita', '', NULL, NULL, 5, '2023', NULL, '3578166610880002@gmail.com', '123456', 1, 1, 4, 1, NULL, NULL, NULL, NULL, NULL, 24, NULL, NULL, NULL, NULL),
	(325, NULL, 'CHRISTINA HANJAR SESANTI', '', '3578104406840008@gmail.com', '', '', '1970-01-01', '3578104406840008', '', NULL, NULL, '', 'Wanita', '', NULL, NULL, 5, '2023', NULL, '3578104406840008@gmail.com', '123456', 1, 1, 4, 1, NULL, NULL, NULL, NULL, NULL, 33, NULL, NULL, NULL, NULL),
	(326, NULL, 'KUSTINI', '', '3578107103570001@gmail.com', '', '', '1970-01-01', '3578107103570001', '', NULL, NULL, '', 'Wanita', '', NULL, NULL, 5, '2023', NULL, '3578107103570001@gmail.com', '123456', 1, 1, 4, 1, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
	(327, NULL, 'SHOBAHUL HOIR', '', '3578172009850003@gmail.com', '', '', '1970-01-01', '3578172009850003', '', NULL, NULL, '', 'Wanita', '', NULL, NULL, 5, '2023', NULL, '3578172009850003@gmail.com', '123456', 1, 1, 4, 1, NULL, NULL, NULL, NULL, NULL, 48, NULL, NULL, NULL, NULL),
	(328, NULL, 'FITRI FAJRIYAH', '', '3578176908920001@gmail.com', '', '', '1970-01-01', '3578176908920001', '', NULL, NULL, '', 'Wanita', '', NULL, NULL, 5, '2023', NULL, '3578176908920001@gmail.com', '123456', 1, 1, 4, 1, NULL, NULL, NULL, NULL, NULL, 25, NULL, NULL, NULL, NULL),
	(329, NULL, 'MOCH. ANSOR', '', '3578290802610001@gmail.com', '', '', '1970-01-01', '3578290802610001', '', NULL, NULL, '', 'Wanita', '', NULL, NULL, 5, '2023', NULL, '3578290802610001@gmail.com', '123456', 1, 1, 4, 1, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
	(330, NULL, 'TITIM YUDHA SETYAWATI', '', '3507125312760003@gmail.com', '', '', '1970-01-01', '3507125312760003', '', NULL, NULL, '', 'Wanita', '', NULL, NULL, 5, '2023', NULL, '3507125312760003@gmail.com', '123456', 1, 1, 4, 1, NULL, NULL, NULL, NULL, NULL, 28, NULL, NULL, NULL, NULL),
	(331, NULL, 'NOFI RIDONINGSIH', '', '3578177110750002@gmail.com', '', '', '1970-01-01', '3578177110750002', '', NULL, NULL, '', 'Wanita', '', NULL, NULL, 5, '2023', NULL, '3578177110750002@gmail.com', '123456', 1, 1, 4, 1, NULL, NULL, NULL, NULL, NULL, 30, NULL, NULL, NULL, NULL),
	(332, NULL, 'RIYATI', '', '3578106707700007@gmail.com', '', '', '1970-01-01', '3578106707700007', '', NULL, NULL, '', 'Wanita', '', NULL, NULL, 5, '2023', NULL, '3578106707700007@gmail.com', '123456', 1, 1, 4, 1, NULL, NULL, NULL, NULL, NULL, 50, NULL, NULL, NULL, NULL),
	(333, NULL, 'ZAENAL AHMAD', '', '3318021307950001@gmail.com', '', '', '1970-01-01', '3318021307950001', '', NULL, NULL, '', 'Wanita', '', NULL, NULL, 5, '2023', NULL, '3318021307950001@gmail.com', '123456', 1, 1, 4, 1, NULL, NULL, NULL, NULL, NULL, 30, NULL, NULL, NULL, NULL),
	(334, NULL, 'ENI KUSRINI', '', '3578174103730002@gmail.com', '', '', '1970-01-01', '3578174103730002', '', NULL, NULL, '', 'Wanita', '', NULL, NULL, 5, '2023', NULL, '3578174103730002@gmail.com', '123456', 1, 1, 4, 1, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
	(335, NULL, 'SOEBAGIJO', '', '3578172801700001@gmail.com', '', '', '1970-01-01', '3578172801700001', '', NULL, NULL, '', 'Wanita', '', NULL, NULL, 5, '2023', NULL, '3578172801700001@gmail.com', '123456', 1, 1, 4, 1, NULL, NULL, NULL, NULL, NULL, 24, NULL, NULL, NULL, NULL),
	(336, NULL, 'ANI ROSIDAH', '', '3578115511810005@gmail.com', '', '', '1970-01-01', '3578115511810005', '', NULL, NULL, '', 'Wanita', '', NULL, NULL, 5, '2023', NULL, '3578115511810005@gmail.com', '123456', 1, 1, 4, 1, NULL, NULL, NULL, NULL, NULL, 24, NULL, NULL, NULL, NULL),
	(337, NULL, 'KUSNINTYASTUTIK', '', '3578174806780006@gmail.com', '', '', '1970-01-01', '3578174806780006', '', NULL, NULL, '', 'Wanita', '', NULL, NULL, 5, '2023', NULL, '3578174806780006@gmail.com', '123456', 1, 1, 4, 1, NULL, NULL, NULL, NULL, NULL, 24, NULL, NULL, NULL, NULL),
	(338, NULL, 'SANCOKO', '', '3578100107750004@gmail.com', '', '', '1970-01-01', '3578100107750004', '', NULL, NULL, '', 'Wanita', '', NULL, NULL, 5, '2023', NULL, '3578100107750004@gmail.com', '123456', 1, 1, 4, 1, NULL, NULL, NULL, NULL, NULL, 26, NULL, NULL, NULL, NULL),
	(339, NULL, 'NUNUN LUSYATI', '', '3578175908760001@gmail.com', '', '', '1970-01-01', '3578175908760001', '', NULL, NULL, '', 'Wanita', '', NULL, NULL, 5, '2023', NULL, '3578175908760001@gmail.com', '123456', 1, 1, 4, 1, NULL, NULL, NULL, NULL, NULL, 36, NULL, NULL, NULL, NULL),
	(340, NULL, 'DITA ROFIQA DAMAYANTI', '', '3578196903960001@gmail.com', '', '', '1970-01-01', '3578196903960001', '', NULL, NULL, '', 'Wanita', '', NULL, NULL, 5, '2023', NULL, '3578196903960001@gmail.com', '123456', 1, 1, 4, 1, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
	(341, NULL, 'RUKMANINGSIH', '', '3578174803810011@gmail.com', '', '', '1970-01-01', '3578174803810011', '', NULL, NULL, '', 'Wanita', '', NULL, NULL, 5, '2023', NULL, '3578174803810011@gmail.com', '123456', 1, 1, 4, 1, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
	(342, NULL, 'USWATUN HASANAH', '', '3578105009820004@gmail.com', '', '', '1970-01-01', '3578105009820004', '', NULL, NULL, '', 'Wanita', '', NULL, NULL, 5, '2023', NULL, '3578105009820004@gmail.com', '123456', 1, 1, 4, 1, NULL, NULL, NULL, NULL, NULL, 22, NULL, NULL, NULL, NULL),
	(343, NULL, 'AMALIYA MUFIDAH', '', '3524136904780002@gmail.com', '', '', '1970-01-01', '3524136904780002', '', NULL, NULL, '', 'Wanita', '', NULL, NULL, 5, '2023', NULL, '3524136904780002@gmail.com', '123456', 1, 1, 4, 1, NULL, NULL, NULL, NULL, NULL, 28, NULL, NULL, NULL, NULL),
	(344, NULL, 'FULLATUL AINI', '', '3578167006760220@gmail.com', '', '', '1970-01-01', '3578167006760220', '', NULL, NULL, '', 'Wanita', '', NULL, NULL, 5, '2023', NULL, '3578167006760220@gmail.com', '123456', 1, 1, 4, 1, NULL, NULL, NULL, NULL, NULL, 24, NULL, NULL, NULL, NULL),
	(345, NULL, 'LUQMAN AFFANDI', '', '3578171412910002@gmail.com', '', '', '1970-01-01', '3578171412910002', '', NULL, NULL, '', 'Wanita', '', NULL, NULL, 5, '2023', NULL, '3578171412910002@gmail.com', '123456', 1, 1, 4, 1, NULL, NULL, NULL, NULL, NULL, 36, NULL, NULL, NULL, NULL),
	(346, NULL, 'QURROTUN AQYUN', '', '3527034411894028@gmail.com', '', '', '1970-01-01', '3527034411894028', '', NULL, NULL, '', 'Wanita', '', NULL, NULL, 5, '2023', NULL, '3527034411894028@gmail.com', '123456', 1, 1, 4, 1, NULL, NULL, NULL, NULL, NULL, 14, NULL, NULL, NULL, NULL),
	(347, NULL, 'ABDUL HARIS', '', '3578102204820010@gmail.com', '', '', '1970-01-01', '3578102204820010', '', NULL, NULL, '', 'Wanita', '', NULL, NULL, 5, '2023', NULL, '3578102204820010@gmail.com', '123456', 1, 1, 4, 1, NULL, NULL, NULL, NULL, NULL, 24, NULL, NULL, NULL, NULL),
	(348, NULL, 'ABDUL MUJIB HAMBALI', '', '3578171409590002@gmail.com', '', '', '1970-01-01', '3578171409590002', '', NULL, NULL, '', 'Wanita', '', NULL, NULL, 5, '2023', NULL, '3578171409590002@gmail.com', '123456', 1, 1, 4, 1, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
	(349, NULL, 'AHMAD RAHMATULLAH', '', '3578161009930005@gmail.com', '', '', '1970-01-01', '3578161009930005', '', NULL, NULL, '', 'Wanita', '', NULL, NULL, 5, '2023', NULL, '3578161009930005@gmail.com', '123456', 1, 1, 4, 1, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
	(350, NULL, 'ANIS SOFIYAH', '', '3578045203920004@gmail.com', '', '', '1970-01-01', '3578045203920004', '', NULL, NULL, '', 'Wanita', '', NULL, NULL, 5, '2023', NULL, '3578045203920004@gmail.com', '123456', 1, 1, 4, 1, NULL, NULL, NULL, NULL, NULL, 24, NULL, NULL, NULL, NULL),
	(351, NULL, 'MISBAKHUL MUNIR', '', '3578282504960001@gmail.com', '', '', '1970-01-01', '3578282504960001', '', NULL, NULL, '', 'Wanita', '', NULL, NULL, 5, '2023', NULL, '3578282504960001@gmail.com', '123456', 1, 1, 4, 1, NULL, NULL, NULL, NULL, NULL, 28, NULL, NULL, NULL, NULL),
	(352, NULL, 'RAHMAT SUDANI', '', '3578271302990004@gmail.com', '', '', '1970-01-01', '3578271302990004', '', NULL, NULL, '', 'Wanita', '', NULL, NULL, 5, '2023', NULL, '3578271302990004@gmail.com', '123456', 1, 1, 4, 1, NULL, NULL, NULL, NULL, NULL, 28, NULL, NULL, NULL, NULL),
	(353, NULL, 'DANI CANTONA', '', '3578102704970005@gmail.com', '', '', '1970-01-01', '3578102704970005', '', NULL, NULL, '', 'Wanita', '', NULL, NULL, 5, '2023', NULL, '3578102704970005@gmail.com', '123456', 1, 1, 4, 1, NULL, NULL, NULL, NULL, NULL, 28, NULL, NULL, NULL, NULL),
	(354, NULL, 'HARIJANTO', '', '3578062406600003@gmail.com', '', '', '1970-01-01', '3578062406600003', '', NULL, NULL, '', 'Wanita', '', NULL, NULL, 5, '2023', NULL, '3578062406600003@gmail.com', '123456', 1, 1, 4, 1, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
	(355, NULL, 'RISKY MAULANA', '', '3578110303980002@gmail.com', '', '', '1970-01-01', '3578110303980002', '', NULL, NULL, '', 'Wanita', '', NULL, NULL, 5, '2023', NULL, '3578110303980002@gmail.com', '123456', 1, 1, 4, 1, NULL, NULL, NULL, NULL, NULL, 20, NULL, NULL, NULL, NULL),
	(356, NULL, 'RR. NURUL QOMARIYAH', '', '3578164305700006@gmail.com', '', '', '1970-01-01', '3578164305700006', '', NULL, NULL, '', 'Wanita', '', NULL, NULL, 5, '2023', NULL, '3578164305700006@gmail.com', '123456', 1, 1, 4, 1, NULL, NULL, NULL, NULL, NULL, 22, NULL, NULL, NULL, NULL),
	(357, NULL, 'KURNIA TSALITSATIN ROBANIYAH', '', '3578055111810009@gmail.com', '', '', '1970-01-01', '3578055111810009', '', NULL, NULL, '', 'Wanita', '', NULL, NULL, 5, '2023', NULL, '3578055111810009@gmail.com', '123456', 1, 1, 4, 1, NULL, NULL, NULL, NULL, NULL, 24, NULL, NULL, NULL, NULL),
	(358, NULL, 'NUR HOLIFAH', '', '3578176910940002@gmail.com', '', '', '1970-01-01', '3578176910940002', '', NULL, NULL, '', 'Wanita', '', NULL, NULL, 5, '2023', NULL, '3578176910940002@gmail.com', '123456', 1, 1, 4, 1, NULL, NULL, NULL, NULL, NULL, 18, NULL, NULL, NULL, NULL),
	(359, NULL, 'SRI RAHAYU', '', '3578164112650003@gmail.com', '', '', '1970-01-01', '3578164112650003', '', NULL, NULL, '', 'Wanita', '', NULL, NULL, 5, '2023', NULL, '3578164112650003@gmail.com', '123456', 1, 1, 4, 1, NULL, NULL, NULL, NULL, NULL, 22, NULL, NULL, NULL, NULL),
	(360, NULL, 'AHMAD BAIDHOWI', '', '3513212603970001@gmail.com', '', '', '1970-01-01', '3513212603970001', '', NULL, NULL, '', 'Wanita', '', NULL, NULL, 5, '2023', NULL, '3513212603970001@gmail.com', '123456', 1, 1, 4, 1, NULL, NULL, NULL, NULL, NULL, 24, NULL, NULL, NULL, NULL),
	(361, NULL, 'IKA SAFITRI', '', '3514126808820003@gmail.com', '', '', '1970-01-01', '3514126808820003', '', NULL, NULL, '', 'Wanita', '', NULL, NULL, 5, '2023', NULL, '3514126808820003@gmail.com', '123456', 1, 1, 4, 1, NULL, NULL, NULL, NULL, NULL, 24, NULL, NULL, NULL, NULL),
	(362, NULL, 'MUTIARA HANY HAMDIYAH', '', '3525124312940002@gmail.com', '', '', '1970-01-01', '3525124312940002', '', NULL, NULL, '', 'Wanita', '', NULL, NULL, 5, '2023', NULL, '3525124312940002@gmail.com', '123456', 1, 1, 4, 1, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
	(363, NULL, 'GATOT SUGIANTO', '', '3578102612760004@gmail.com', '', '', '1970-01-01', '3578102612760004', '', NULL, NULL, '', 'Wanita', '', NULL, NULL, 5, '2023', NULL, '3578102612760004@gmail.com', '123456', 1, 1, 4, 3, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
	(364, NULL, 'SITI ROHMI', '', '3578102612761114@gmail.com', '', '', '1970-01-01', '3578102612761114', '', NULL, NULL, '', 'Wanita', '', NULL, NULL, 5, '2023', NULL, '3578102612761114@gmail.com', '123456', 1, 1, 4, 2, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
	(365, NULL, 'SITI MUSAWAROH', '', '3578165507710006@gmail.com', '', '', '1970-01-01', '3578165507710006', '', NULL, NULL, '', 'Wanita', '', NULL, NULL, 5, '2023', NULL, '3578165507710006@gmail.com', '123456', 1, 1, 4, 3, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
	(366, NULL, 'ACHMAD ZAINI', '', '3578165507711006@gmail.com', '', '', '1970-01-01', '3578165507711006', '', NULL, NULL, '', 'Wanita', '', NULL, NULL, 5, '2023', NULL, '3578165507711006@gmail.com', '123456', 1, 1, 4, 3, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
	(367, NULL, 'SOEDJOKO', '', '3578161404690001@gmail.com', '', '', '1970-01-01', '3578161404690001', '', NULL, NULL, '', 'Wanita', '', NULL, NULL, 5, '2023', NULL, '3578161404690001@gmail.com', '123456', 1, 1, 4, 3, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
	(368, NULL, 'KUN WARIATI', '', '3578295412710002@gmail.com', '', '', '1970-01-01', '3578295412710002', '', NULL, NULL, '', 'Wanita', '', NULL, NULL, 5, '2023', NULL, '3578295412710002@gmail.com', '123456', 1, 1, 4, 3, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
	(369, NULL, 'ACHMAD RIZKI', '', '3578161506970003@gmail.com', '', '', '1970-01-01', '3578161506970003', '', NULL, NULL, '', 'Wanita', '', NULL, NULL, 5, '2023', NULL, '3578161506970003@gmail.com', '123456', 1, 1, 4, 3, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
	(370, NULL, 'MOCHAMAD THORIQ NURDIN', '', '3578051311890004@gmail.com', '', '', '1970-01-01', '3578051311890004', '', NULL, NULL, '', 'Wanita', '', NULL, NULL, 5, '2023', NULL, '3578051311890004@gmail.com', '123456', 1, 1, 4, 3, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
	(371, NULL, 'ABDUL AZIES', '', '3578172010790002@gmail.com', '', '', '1970-01-01', '3578172010790002', '', NULL, NULL, '', 'Wanita', '', NULL, NULL, 5, '2023', NULL, '3578172010790002@gmail.com', '123456', 1, 1, 4, 3, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
	(372, NULL, 'BUDIMAN W.', '', '3578170707550002@gmail.com', '', '', '1970-01-01', '3578170707550002', '', NULL, NULL, '', 'Wanita', '', NULL, NULL, 5, '2023', NULL, '3578170707550002@gmail.com', '123456', 1, 1, 4, 3, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
	(373, NULL, 'ILYAS NOERSOLIM', '', '3578081505630004@gmail.com', '', '', '1970-01-01', '3578081505630004', '', NULL, NULL, '', 'Wanita', '', NULL, NULL, 5, '2023', NULL, '3578081505630004@gmail.com', '123456', 1, 1, 4, 3, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
	(374, NULL, 'SUPRIJANTO', '', '3578081505630005@gmail.com', '', '', '1970-01-01', '3578081505630005', '', NULL, NULL, '', 'Wanita', '', NULL, NULL, 5, '2023', NULL, '3578081505630005@gmail.com', '123456', 1, 1, 4, 3, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
	(375, NULL, 'FAHMI BIN SALEH A.', '', '3578161406900005@gmail.com', '', '', '1970-01-01', '3578161406900005', '', NULL, NULL, '', 'Wanita', '', NULL, NULL, 5, '2023', NULL, '3578161406900005@gmail.com', '123456', 1, 1, 4, 3, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
	(376, NULL, 'WISNU PRADINATA', '', '3528040303970001@gmail.com', '', '', '1970-01-01', '3528040303970001', '', NULL, NULL, '', 'Wanita', '', NULL, NULL, 5, '2023', NULL, '3528040303970001@gmail.com', '123456', 1, 1, 4, 3, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
	(377, NULL, 'Aulia Zulfikar, S.Pd', '', 'malika110719@gmail.com', '', '', '2023-01-13', '198304102006070420', '', NULL, NULL, 'islam', 'Pria', '', NULL, NULL, 60, '2022', NULL, 'malika110719@gmail.com', '123456', 1, 1, 5, 1, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
	(378, NULL, 'Djumadi, S.Pd', '', 'djumadi_hilmy@yahoo.co.id', '', '', '2023-01-13', '196905271996070283', '', NULL, NULL, 'islam', 'Pria', '', NULL, NULL, 5, '2022', NULL, 'djumadi_hilmy@yahoo.co.id', '123456', 1, 1, 5, 1, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
	(379, NULL, 'Rokayah', '', 'rukayahwh@gmail.com', '', '', '2023-01-13', '198811182011070498', '', NULL, NULL, 'islam', 'Wanita', '', NULL, NULL, 62, '2022', NULL, 'rukayahwh@gmail.com', '123456', 1, 1, 5, 1, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
	(380, NULL, 'Achmad Junaidi, S.Kom', '', 'junales@gmail.com', '', '', '2023-01-13', '198408252010070492', '', NULL, NULL, 'islam', 'Pria', '', NULL, NULL, 61, '2022', NULL, 'junales@gmail.com', '123456', 1, 1, 5, 1, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
	(381, NULL, 'Soe eniek', '', 'latapameidindaanissa@gmail.com', '', '', '2023-01-12', '197004061996070319', '', NULL, NULL, 'islam', 'Pria', '', NULL, NULL, 5, '2022', NULL, 'latapameidindaanissa@gmail.com', '123456', 1, 1, 5, 1, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
	(382, NULL, 'H. Abd. Ro&#039;uf', '', 'abdulrouf@gmail.com', '', '', '2023-01-12', '196701121998070311', '', NULL, NULL, 'islam', 'Pria', '', NULL, NULL, 5, '2022', NULL, 'abdulrouf@gmail.com', '123456', 1, 1, 5, 1, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
	(383, NULL, 'Sri Rahayu', '', 'srirahayum567@gmail.com', '', '', '2023-01-12', '196512011999070327', '', NULL, NULL, 'islam', 'Wanita', '', NULL, NULL, 5, '2022', NULL, 'srirahayum567@gmail.com', '123456', 1, 1, 5, 1, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
	(384, NULL, 'Soebagijo', '', 'soebagijo1970@gmail.com', '', '', '2023-01-12', '197001282000070310', '', NULL, NULL, 'islam', 'Pria', '', NULL, NULL, 5, '2022', NULL, 'soebagijo1970@gmail.com', '123456', 1, 1, 5, 1, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
	(385, NULL, 'Nunik Haryani', '', 'hanna3aulia@gmail.com', '', '', '2023-01-12', '197604052003070393', '', NULL, NULL, 'islam', 'Wanita', '', NULL, NULL, 5, '2022', NULL, 'hanna3aulia@gmail.com', '123456', 1, 1, 5, 1, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
	(386, NULL, 'Wiwik Winarti', '', 'wiwiknarendra@yahoo.com', '', '', '2023-01-12', '197606042004070397', '', NULL, NULL, 'islam', 'Wanita', '', NULL, NULL, 5, '2022', NULL, 'wiwiknarendra@yahoo.com', '123456', 1, 1, 5, 1, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
	(387, NULL, 'Ahsanuddin, S.Ag', '', 'ahsanuddin7642@gmail.com', '', '', '2023-01-13', '197604012004070401', '', NULL, NULL, 'islam', 'Pria', '', NULL, NULL, 5, '2022', NULL, 'ahsanuddin7642@gmail.com', '123456', 1, 1, 5, 1, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
	(388, NULL, 'Siswati', '', 'busiswati2016@gmail.com', '', '', '2023-01-12', '197704092004070403', '', NULL, NULL, 'islam', 'Wanita', '', NULL, NULL, 5, '2022', NULL, 'busiswati2016@gmail.com', '123456', 1, 1, 5, 1, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
	(389, NULL, 'M. Syafiuddin Zamzam', '', 'iukz@email.com', '', '', '2023-01-13', '198110032004070399', '', NULL, NULL, 'islam', 'Pria', '', NULL, NULL, 64, '2022', NULL, 'iukz@email.com', '123456', 1, 1, 5, 1, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
	(390, NULL, 'Suliha Kamil', '', 'sulihakamil@gmail.com', '', '', '2023-01-13', '198008302008070456', '', NULL, NULL, 'islam', 'Wanita', '', NULL, NULL, 5, '2022', NULL, 'sulihakamil@gmail.com', '123456', 1, 1, 5, 1, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
	(391, NULL, 'Deddy Purwanto', '', 'y1nxt5@erapor-smk.net', '', '', '2023-01-13', '198012172005070411', '', NULL, NULL, 'islam', 'Pria', '', NULL, NULL, 5, '2022', NULL, 'y1nxt5@erapor-smk.net', '123456', 1, 1, 5, 1, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
	(392, NULL, 'Febriani Setyawati', '', 'poseidoncake605@gmail.com', '', '', '2023-01-13', '198202072008070458', '', NULL, NULL, 'islam', 'Wanita', '', NULL, NULL, 5, '2022', NULL, 'poseidoncake605@gmail.com', '123456', 1, 1, 5, 1, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
	(393, NULL, 'Catur Budi Darmawan', '', 'arekkentir666@yahoo.com', '', '', '2023-01-12', '197404132008070462', '', NULL, NULL, 'islam', 'Pria', '', NULL, NULL, 5, '2022', NULL, 'arekkentir666@yahoo.com', '123456', 1, 1, 5, 1, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
	(394, NULL, 'Hekmah Amala', '', 'hekmahamala84@gmail.com', '', '', '2023-01-13', '198411102008070461', '', NULL, NULL, 'islam', 'Wanita', '', NULL, NULL, 5, '2022', NULL, 'hekmahamala84@gmail.com', '123456', 1, 1, 5, 1, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
	(395, NULL, 'M. Setiyawan', '', 'awanisti@gmail.com', '', '', '2023-01-13', '198404222008070464', '', NULL, NULL, 'islam', 'Pria', '', NULL, NULL, 5, '2022', NULL, 'awanisti@gmail.com', '123456', 1, 1, 5, 1, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
	(396, NULL, 'Aisyah Noormawati', '', 'noormawatiaisyah@yahoo.com', '', '', '2023-01-12', '197503172009070477', '', NULL, NULL, 'islam', 'Wanita', '', NULL, NULL, 5, '2022', NULL, 'noormawatiaisyah@yahoo.com', '123456', 1, 1, 5, 1, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
	(397, NULL, 'Elok Tri Cahyani', '', 'eloktricahyani29@gmail.com', '', '', '2023-01-13', '198109292009070468', '', NULL, NULL, 'islam', 'Wanita', '', NULL, NULL, 5, '2022', NULL, 'eloktricahyani29@gmail.com', '123456', 1, 1, 5, 1, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
	(398, NULL, 'Roni Fauzi', '', 'roni.fauzi@gmail.com', '', '', '2023-01-13', '198703102010070491', '', NULL, NULL, 'islam', 'Pria', '', NULL, NULL, 5, '2022', NULL, 'roni.fauzi@gmail.com', '123456', 1, 1, 5, 1, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
	(399, NULL, 'Sriyani', '', 'cuteziendah46@gmail.com', '', '', '2023-01-13', '198406222010070490', '', NULL, NULL, 'islam', 'Wanita', '', NULL, NULL, 5, '2022', NULL, 'cuteziendah46@gmail.com', '123456', 1, 1, 5, 1, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
	(400, NULL, 'Ayu Dwi Cahyani', '', 'ayudwicahyani8@gmail.com', '', '', '2023-01-13', '198005032010070499', '', NULL, NULL, '', 'Wanita', '', NULL, NULL, 5, '2022', NULL, 'ayudwicahyani8@gmail.com', '123456', 1, 1, 5, 3, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
	(401, NULL, 'Winarko Hidayat', '', 'muhammad.heco@yahoo.com', '', '', '2023-01-12', '197203032010070488', '', NULL, NULL, 'islam', 'Pria', '', NULL, NULL, 5, '2022', NULL, 'muhammad.heco@yahoo.com', '123456', 1, 1, 5, 1, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
	(402, NULL, 'Maslichatin, S.Th.I', '', 'micha.fulla@gmail.com', '', '', '2023-01-13', '197911042011070504', '', NULL, NULL, 'islam', 'Wanita', '', NULL, NULL, 5, '2022', NULL, 'micha.fulla@gmail.com', '123456', 1, 1, 5, 1, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
	(403, NULL, 'Fullatul Aini', '', 'fillatul.aini.baru@gmail.com', '', '', '2023-01-12', '197606302011070346', '', NULL, NULL, 'islam', 'Wanita', '', NULL, NULL, 5, '2022', NULL, 'fillatul.aini.baru@gmail.com', '123456', 1, 1, 5, 1, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
	(404, NULL, 'Kuncahyo Arif S.', '', 'kuncahyo28@gmail.com', '', '', '2023-01-13', '198712282011070501', '', NULL, NULL, 'islam', 'Pria', '', NULL, NULL, 5, '2022', NULL, 'kuncahyo28@gmail.com', '123456', 1, 1, 5, 1, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
	(405, NULL, 'Rukmaningsih', '', 'ashari.r.ar@gmail.com', '', '', '2023-01-13', '198103082010070489', '', NULL, NULL, 'islam', 'Wanita', '', NULL, NULL, 5, '2022', NULL, 'ashari.r.ar@gmail.com', '123456', 1, 1, 5, 1, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
	(406, NULL, 'Ani Rosidah', '', 'ani.alwafa111@gmail.com', '', '', '2023-01-13', '198111152012070453', '', NULL, NULL, 'islam', 'Wanita', '', NULL, NULL, 5, '2022', NULL, 'ani.alwafa111@gmail.com', '123456', 1, 1, 5, 1, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
	(407, NULL, 'Maria Ulfa', '', 'mariaulfa0605@gmail.com', '', '', '2023-01-13', '198505062012070455', '', NULL, NULL, 'islam', 'Wanita', '', NULL, NULL, 5, '2022', NULL, 'mariaulfa0605@gmail.com', '123456', 1, 1, 5, 1, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
	(408, NULL, 'Taufiq Hidayat', '', 'taufiqht1969@gmail.com', '', '', '2023-01-12', '196904192012070514', '', NULL, NULL, 'islam', 'Pria', '', NULL, NULL, 5, '2022', NULL, 'taufiqht1969@gmail.com', '123456', 1, 1, 5, 1, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
	(409, NULL, 'Nurul Faujiyah', '', 'nurfa-chayank@yahoo.co.id', '', '', '2023-01-13', '199003172012070513', '', NULL, NULL, 'islam', 'Wanita', '', NULL, NULL, 5, '2022', NULL, 'nurfa-chayank@yahoo.co.id', '123456', 1, 1, 5, 1, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
	(410, NULL, 'Anik Yuni Rahayu', '', 'mbakyuni48@gmail.com', '', '', '2023-01-13', '198306252013070516', '', NULL, NULL, 'islam', 'Wanita', '', NULL, NULL, 5, '2022', NULL, 'mbakyuni48@gmail.com', '123456', 1, 1, 5, 1, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
	(411, NULL, 'Kurnia Tsalisatin', '', 'kurnia_tsalitsatin@yahoo.co.id', '', '', '2023-01-13', '198111112014070429', '', NULL, NULL, 'islam', 'Wanita', '', NULL, NULL, 5, '2022', NULL, 'kurnia_tsalitsatin@yahoo.co.id', '123456', 1, 1, 5, 1, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
	(412, NULL, 'Reni Zumzumi', '', 'rzumzumy@gmail.com', '', '', '2023-01-13', '198511142014070522', '', NULL, NULL, 'islam', 'Wanita', '', NULL, NULL, 101, '2022', NULL, 'rzumzumy@gmail.com', '123456', 1, 1, 5, 1, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
	(413, NULL, 'Subairi Khalil', '', 'subairikhalil@gmail.com', '', '', '2023-01-13', '198709192014070523', '', NULL, NULL, 'islam', 'Pria', '', NULL, NULL, 5, '2022', NULL, 'subairikhalil@gmail.com', '123456', 1, 1, 5, 1, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
	(414, NULL, 'Fitrah Insani, SE', '', 'fitrahinsani0201@gmail.com', '', '', '2023-01-13', '198801022016070560', '', NULL, NULL, 'islam', 'Wanita', '', NULL, NULL, 5, '2022', NULL, 'fitrahinsani0201@gmail.com', '123456', 1, 1, 5, 1, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
	(415, NULL, 'Ayu Laily Qomariyah', '', 'ayu.laely10@gmail.com', '', '', '2023-01-13', '199310102016070563', '', NULL, NULL, 'islam', 'Wanita', '', NULL, NULL, 5, '2022', NULL, 'ayu.laely10@gmail.com', '123456', 1, 1, 5, 1, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
	(416, NULL, 'Nurfia Lely Chomariya', '', 'nurfialely17@gmail.com', '', '', '2023-01-13', '199503172017070570', '', NULL, NULL, 'islam', 'Wanita', '', NULL, NULL, 5, '2022', NULL, 'nurfialely17@gmail.com', '123456', 1, 1, 5, 1, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
	(417, NULL, 'Amalia Sofianti', '', 'calvinmelia2@gmail.com', '', '', '2023-01-12', '197910192017070569', '', NULL, NULL, 'islam', 'Wanita', '', NULL, NULL, 5, '2022', NULL, 'calvinmelia2@gmail.com', '123456', 1, 1, 5, 1, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
	(418, NULL, 'Yanarto Teguh P.', '', 'yanarto@gmail.com', '', '', '2023-01-12', '197701042017070571', '', NULL, NULL, 'islam', 'Pria', '', NULL, NULL, 5, '2022', NULL, 'yanarto@gmail.com', '123456', 1, 1, 5, 1, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
	(419, NULL, 'Prihatiana P. N.', '', 'tiananidyawati@gmail.com', '', '', '2023-01-13', '198504282017070572', '', NULL, NULL, 'islam', 'Wanita', '', NULL, NULL, 5, '2022', NULL, 'tiananidyawati@gmail.com', '123456', 1, 1, 5, 1, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
	(420, NULL, 'Nur Ardiana Sholehati', '', 'sh.ardiana@yahoo.co.id', '', '', '2023-01-13', '199208202017070573', '', NULL, NULL, 'islam', 'Wanita', '', NULL, NULL, 5, '2022', NULL, 'sh.ardiana@yahoo.co.id', '123456', 1, 1, 5, 1, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
	(421, NULL, 'Chalimatus S.', '', 'chalimatussholikhah@yahoo.com', '', '', '2023-01-13', '199304222018070608', '', NULL, NULL, 'islam', 'Wanita', '', NULL, NULL, 5, '2022', NULL, 'chalimatussholikhah@yahoo.com', '123456', 1, 1, 5, 1, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
	(422, NULL, 'Muhamimin', '', 'muhaimin0678@gmail.com', '', '', '2023-01-12', '197810062018070606', '', NULL, NULL, 'islam', 'Pria', '', NULL, NULL, 5, '2022', NULL, 'muhaimin0678@gmail.com', '123456', 1, 1, 5, 1, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
	(423, NULL, 'M. Rifai Abdzar Gifari', '', 'rifaiabdzar@gmail.com', '', '', '2023-01-13', '199701082019070582', '', NULL, NULL, 'islam', 'Pria', '', NULL, NULL, 40, '2022', NULL, 'rifaiabdzar@gmail.com', '123456', 1, 1, 5, 1, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
	(424, NULL, 'ARIF ZAINURI RACHMAN', '', 'ARIF@GMAIL.COM', '', '', '2023-01-16', '196906211992070223', '', NULL, NULL, 'islam', 'Pria', '', NULL, NULL, 69, '2023', NULL, 'ARIF@GMAIL.COM', '123456', 1, 1, 5, 3, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
	(425, NULL, 'Dra. Hj. Muntafi&#039;ah Djauhari', 'Sidotopo Wetan Baru IV A', 'tafiksmk@gmail.com', '81332025574', '81332025574', '1970-01-01', '196312141989032006', '', NULL, NULL, '', 'Wanita', '', NULL, NULL, 5, '1970', NULL, 'tafiksmk@gmail.com', '123456', 1, 1, 5, 1, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
	(426, NULL, 'Siti Rokaya', NULL, NULL, NULL, NULL, NULL, '102327123', NULL, NULL, NULL, 'ISLAM', 'Wanita', NULL, NULL, NULL, 151, NULL, NULL, 'siti_rokaya', '123456', 1, 1, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
	(427, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '11314237', NULL, NULL, NULL, NULL, 'Wanita', NULL, NULL, NULL, 151, NULL, NULL, 'siti_rokaya', '123456', 1, 1, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
	(428, NULL, 'Unit SMA', NULL, NULL, NULL, NULL, NULL, 'tk', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'tk', '123456', 8, 1, 1, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL);

-- Dumping structure for table sigap2.peg_dokumen
CREATE TABLE IF NOT EXISTS `peg_dokumen` (
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

-- Dumping data for table sigap2.peg_dokumen: ~0 rows (approximately)

-- Dumping structure for table sigap2.peg_keluarga
CREATE TABLE IF NOT EXISTS `peg_keluarga` (
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

-- Dumping data for table sigap2.peg_keluarga: ~0 rows (approximately)

-- Dumping structure for table sigap2.peg_skill
CREATE TABLE IF NOT EXISTS `peg_skill` (
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

-- Dumping data for table sigap2.peg_skill: ~0 rows (approximately)

-- Dumping structure for table sigap2.penempatan
CREATE TABLE IF NOT EXISTS `penempatan` (
  `id` int NOT NULL AUTO_INCREMENT,
  `pegawai` int DEFAULT NULL,
  `project` varchar(255) DEFAULT NULL,
  `jabatan` int DEFAULT NULL,
  `tgl_mulai` date DEFAULT NULL,
  `tgl_akhir` date DEFAULT NULL,
  PRIMARY KEY (`id`) USING BTREE
) ENGINE=InnoDB DEFAULT CHARSET=latin1 ROW_FORMAT=DYNAMIC;

-- Dumping data for table sigap2.penempatan: ~0 rows (approximately)

-- Dumping structure for table sigap2.pengetahuan
CREATE TABLE IF NOT EXISTS `pengetahuan` (
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

-- Dumping data for table sigap2.pengetahuan: ~0 rows (approximately)

-- Dumping structure for table sigap2.penyesuaian
CREATE TABLE IF NOT EXISTS `penyesuaian` (
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
) ENGINE=InnoDB AUTO_INCREMENT=30 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- Dumping data for table sigap2.penyesuaian: ~18 rows (approximately)
INSERT INTO `penyesuaian` (`id`, `m_id`, `datetime`, `nip`, `jenjang_id`, `absen`, `izin`, `sakit`, `terlambat`, `pulang_cepat`, `piket`, `inval`, `lembur`, `total`, `total2`, `voucher`, `absen_jam`, `izin_jam`, `sakit_jam`) VALUES
	(6, 6, '2023-02-14 04:02:59', 10230, 4, 1, 1, 2, NULL, NULL, 1, 2, 3, 114500, 171000, 30000, NULL, NULL, NULL),
	(7, 6, '2023-02-14 04:02:59', 10235, 4, 2, 3, 5, 1, 1, NULL, NULL, NULL, 256250, 0, 40000, NULL, NULL, NULL),
	(8, 8, '2023-02-14 04:39:25', 10230, 4, 1, 1, 2, NULL, NULL, 1, 2, 3, 114500, 390198000, 30000, NULL, NULL, NULL),
	(9, 8, '2023-02-14 04:39:25', 10235, 4, 2, 3, 5, 1, 1, NULL, NULL, NULL, 256250, 520000000, 40000, NULL, NULL, NULL),
	(10, 9, '2023-02-14 06:41:48', 10230, 4, 1, 1, 2, NULL, NULL, 1, 2, 3, 60000, 39000, 30000, NULL, NULL, NULL),
	(11, 9, '2023-02-14 06:41:48', 10235, 4, 2, 3, 5, 1, 1, NULL, NULL, NULL, 120000, 0, 40000, NULL, NULL, NULL),
	(12, 14, '2023-02-14 06:52:23', 10230, 4, 1, 1, 2, NULL, NULL, 1, 2, 3, 60000, 178000, NULL, NULL, NULL, NULL),
	(13, 14, '2023-02-14 06:52:23', 10235, 4, 2, 3, 5, 1, 1, NULL, NULL, NULL, 134000, 0, NULL, NULL, NULL, NULL),
	(14, 15, '2023-02-14 06:54:42', 10230, 4, 1, 1, 2, NULL, NULL, 1, 2, 3, 60000, 178000, 30000, NULL, NULL, NULL),
	(15, 15, '2023-02-14 06:54:42', 10235, 4, 2, 3, 5, 1, 1, NULL, NULL, NULL, 134000, 0, 40000, NULL, NULL, NULL),
	(18, 28, '2023-02-14 07:11:55', 10230, 4, 1, 1, 2, NULL, NULL, 1, 2, 3, 60000, 178000, NULL, NULL, NULL, NULL),
	(19, 28, '2023-02-14 07:11:55', 10235, 4, 2, 3, 5, 1, 1, NULL, NULL, NULL, 134000, 0, NULL, NULL, NULL, NULL),
	(20, 29, '2023-02-14 07:14:01', 10230, 4, NULL, NULL, 2, NULL, NULL, 1, 2, 3, 0, 178000, 30000, NULL, NULL, NULL),
	(21, 29, '2023-02-14 07:14:01', 10235, 4, 2, 3, 5, 1, 1, NULL, NULL, NULL, 134000, 0, 40000, NULL, NULL, NULL),
	(22, 35, '2023-02-14 07:19:00', 10230, 4, 1, 1, 2, NULL, NULL, 1, 2, 3, 60000, 178000, NULL, NULL, NULL, NULL),
	(23, 35, '2023-02-14 07:19:00', 10235, 4, 2, 3, 5, 1, 1, NULL, NULL, NULL, 134000, 0, NULL, NULL, NULL, NULL),
	(26, 37, '2023-02-14 07:28:33', 10230, 4, 1, 1, NULL, NULL, NULL, 1, 2, 3, 28000, 178000, 30000, NULL, NULL, NULL),
	(27, 37, '2023-02-14 07:28:33', 10235, 4, 2, 3, 5, 1, 1, NULL, NULL, NULL, 156750, 0, 40000, NULL, NULL, NULL);

-- Dumping structure for table sigap2.potongan_sd
CREATE TABLE IF NOT EXISTS `potongan_sd` (
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
) ENGINE=InnoDB AUTO_INCREMENT=71 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- Dumping data for table sigap2.potongan_sd: ~11 rows (approximately)
INSERT INTO `potongan_sd` (`id`, `nama`, `terlambat`, `value_terlambat`, `izin`, `value_izin`, `jabatan_id`, `sakit`, `value_sakit`, `totalpotongan`, `tidakhadir`, `value_tidakhadir`, `month`, `datetime`, `u_by`, `pulcep`, `value_pulcep`, `tidakhadirjam`, `tidakhadirjamvalue`, `sakitperjam`, `sakitperjamvalue`, `jenjang_id`, `izinperjam`, `izinperjamvalue`, `sertif`, `tahun`, `bulan`, `pid`) VALUES
	(59, '110123', 2, 15000, 2, 40000, 1, NULL, 23000, 168000, NULL, 40000, NULL, '2022-12-16 04:03:38', -1, 2, 20000, 2, 9000, NULL, 4000, 1, NULL, 9000, NULL, NULL, NULL, NULL),
	(61, '110124', 2, 30000, 2, 30000, 2, NULL, 27000, 164000, NULL, 30000, NULL, '2022-12-16 04:09:21', -1, 2, 18000, 2, 4000, NULL, 7000, 1, NULL, 4000, NULL, NULL, NULL, NULL),
	(62, '110124', 1, 30000, 1, 40000, 1, NULL, 23000, 99000, NULL, 40000, NULL, '2022-12-16 09:14:07', -1, 1, 20000, 1, 9000, NULL, 4000, 1, NULL, 9000, NULL, NULL, NULL, NULL),
	(63, NULL, NULL, 30000, NULL, 40000, 1, NULL, 23000, NULL, NULL, 40000, NULL, NULL, NULL, NULL, 20000, NULL, 9000, NULL, 4000, 1, NULL, 9000, NULL, NULL, NULL, NULL),
	(64, 'YUNIARTI', 2, 30000, 2, 40000, 1, NULL, 23000, NULL, NULL, 40000, NULL, NULL, NULL, NULL, 20000, NULL, 9000, NULL, 4000, 1, NULL, 9000, NULL, NULL, NULL, NULL),
	(65, 'farhan kebab', 2, 30000, 2, 40000, 1, 2, 23000, NULL, 2, 40000, NULL, NULL, -1, 2, 20000, 2, 9000, 2, 4000, 1, 2, 9000, NULL, NULL, NULL, NULL),
	(66, 'YUNIARTI', 2, 30000, 2, 40000, 1, 2, 23000, NULL, NULL, 40000, NULL, NULL, -1, NULL, 20000, NULL, 9000, NULL, 4000, 1, NULL, 9000, NULL, NULL, NULL, NULL),
	(67, 'farhan kebab', 2, 30000, 2, 40000, 1, 2, 23000, 186000, NULL, 40000, NULL, NULL, -1, NULL, 20000, NULL, 9000, NULL, 4000, 1, NULL, 9000, NULL, NULL, NULL, NULL),
	(68, '110123', 2, 30000, 2, 40000, 2, NULL, 23000, 220000, 2, 40000, '2022-12-28', '2022-12-28 05:09:23', -1, NULL, 20000, NULL, 9000, NULL, 4000, 1, NULL, 9000, NULL, NULL, NULL, NULL),
	(69, '110124', 2, 15000, 2, 40000, 1, 2, NULL, NULL, 2, 40000, '2023-01-04', '2023-01-04 09:06:31', -1, 2, 20000, NULL, 9000, 2, NULL, 1, 3, 9000, NULL, NULL, NULL, NULL),
	(70, '110124', 2, 15000, 2, 40000, 1, 3, NULL, 410000, 3, 40000, '2023-01-04', '2023-01-04 09:07:36', -1, 3, 20000, NULL, 9000, NULL, NULL, 1, NULL, 9000, NULL, NULL, NULL, NULL);

-- Dumping structure for table sigap2.potongan_sma
CREATE TABLE IF NOT EXISTS `potongan_sma` (
  `id` int NOT NULL AUTO_INCREMENT,
  `datetime` datetime DEFAULT NULL,
  `month` date DEFAULT NULL,
  `nama` varchar(50) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci DEFAULT NULL,
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
) ENGINE=InnoDB AUTO_INCREMENT=117 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci ROW_FORMAT=DYNAMIC;

-- Dumping data for table sigap2.potongan_sma: ~20 rows (approximately)
INSERT INTO `potongan_sma` (`id`, `datetime`, `month`, `nama`, `jenjang_id`, `jabatan_id`, `terlambat`, `value_terlambat`, `izin`, `value_izin`, `u_by`, `sakit`, `value_sakit`, `totalpotongan`, `tidakhadir`, `value_tidakhadir`, `pulcep`, `value_pulcep`, `tidakhadirjam`, `tidakhadirjamvalue`, `sakitperjam`, `sakitperjamvalue`, `izinperjam`, `izinperjamvalue`, `sertif`, `tahun`, `bulan`, `pid`) VALUES
	(97, NULL, NULL, '10235', 4, 9, 2, 50000, 2, NULL, NULL, 2, NULL, NULL, 2, NULL, 2, NULL, 3, NULL, 1, NULL, NULL, NULL, 2, NULL, NULL, NULL),
	(98, '2023-01-18 07:28:55', NULL, '10235', 4, 9, 4, 16500, 3, NULL, NULL, NULL, NULL, 66000, NULL, NULL, NULL, 16500, NULL, 16500, NULL, 8250, NULL, 16500, 2, NULL, NULL, NULL),
	(99, NULL, NULL, '10235', 4, 9, 2, 50000, 2, NULL, NULL, 2, NULL, NULL, 2, NULL, 2, NULL, 3, NULL, 1, NULL, NULL, NULL, 2, NULL, NULL, NULL),
	(100, NULL, NULL, '10235', 4, 9, 2, 50000, 2, NULL, NULL, 2, NULL, NULL, 2, NULL, 2, NULL, 3, NULL, 1, NULL, 1, NULL, 2, NULL, NULL, NULL),
	(101, NULL, NULL, '10235', 4, 9, 2, 50000, 2, NULL, NULL, 2, NULL, NULL, 2, NULL, 2, NULL, 3, NULL, 1, NULL, 1, NULL, 2, NULL, NULL, NULL),
	(102, '2023-01-19 02:47:08', NULL, '102390', 4, 6, NULL, 6813, NULL, 54500, NULL, NULL, 27250, 0, NULL, 54500, NULL, 6813, NULL, 6813, NULL, 3406, NULL, 6813, 2, NULL, NULL, NULL),
	(103, '2023-01-19 02:49:27', NULL, '10230', 4, 5, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 0, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 1, NULL, NULL, NULL),
	(104, '2023-01-19 02:52:00', NULL, '102390', 4, 6, NULL, 6813, NULL, 54500, NULL, NULL, 27250, 0, NULL, 54500, NULL, 6813, NULL, 6813, NULL, 3406, NULL, 6813, 2, NULL, NULL, NULL),
	(105, '2023-01-19 02:52:59', NULL, '102390', 4, 6, 2, 6813, 2, 54500, NULL, 2, 27250, 0, NULL, 54500, NULL, 6813, NULL, 6813, NULL, 3406, NULL, 6813, 2, NULL, NULL, NULL),
	(106, '2023-01-19 02:53:56', NULL, '102390', 4, 6, 2, 6813, 2, 54500, NULL, 2, 27250, 122626, NULL, 54500, NULL, 6813, NULL, 6813, NULL, 3406, NULL, 6813, 2, NULL, NULL, NULL),
	(107, '2023-01-19 02:57:50', NULL, '10239', 4, 7, 2, NULL, 2, NULL, NULL, 2, NULL, 0, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 2, NULL, NULL, NULL),
	(108, '2023-01-19 02:58:12', NULL, '102390', 4, 6, 2, 6813, 2, 54500, NULL, 2, 27250, 286126, NULL, 54500, NULL, 6813, NULL, 6813, NULL, 3406, NULL, 6813, 2, NULL, NULL, NULL),
	(109, '2023-01-19 03:02:03', NULL, '102390', 4, 6, NULL, 6813, NULL, 54500, NULL, NULL, 27250, 0, NULL, 54500, NULL, 6813, NULL, 6813, NULL, 3406, NULL, 6813, 2, NULL, NULL, NULL),
	(110, '2023-01-19 03:05:18', NULL, '102390', 4, 6, 2, 6813, 2, 54500, NULL, 2, 27250, 286126, NULL, 54500, NULL, 6813, NULL, 6813, NULL, 3406, NULL, 6813, 2, NULL, NULL, NULL),
	(111, '2023-01-24 04:03:49', NULL, '10230', 4, 5, 2, NULL, 2, NULL, NULL, NULL, NULL, 0, NULL, NULL, NULL, NULL, 2, NULL, 2, NULL, 2, NULL, 1, 2023, 1, 1),
	(112, '2023-01-24 04:03:49', NULL, '10235', 4, 9, NULL, 16500, NULL, NULL, NULL, NULL, NULL, 49500, NULL, NULL, NULL, 16500, 2, 16500, 2, 8250, 2, 16500, 2, 2023, 1, 1),
	(113, '2023-01-24 04:07:21', NULL, '10230', 4, 5, 2, 14000, 2, NULL, NULL, NULL, NULL, 56000, NULL, NULL, NULL, 14000, 5, 14000, 2, NULL, 2, 14000, 1, 2023, 4, 2),
	(114, '2023-01-24 04:07:21', NULL, '10235', 4, 9, NULL, 16500, NULL, NULL, NULL, NULL, NULL, 74250, NULL, NULL, NULL, 16500, 3, 16500, 3, 8250, 3, 16500, 2, 2023, 4, 2),
	(115, '2023-01-25 03:18:02', NULL, '10230', 4, 5, 2, 14000, 1, NULL, NULL, NULL, NULL, 28000, NULL, NULL, NULL, 14000, NULL, 14000, NULL, NULL, NULL, 14000, 1, 2023, 4, 3),
	(116, '2023-01-25 03:18:02', NULL, '10235', 4, 9, NULL, 16500, NULL, NULL, NULL, NULL, NULL, 0, NULL, NULL, NULL, 16500, NULL, 16500, NULL, 8250, NULL, 16500, 2, 2023, 4, 3);

-- Dumping structure for table sigap2.potongan_smk
CREATE TABLE IF NOT EXISTS `potongan_smk` (
  `id` int NOT NULL AUTO_INCREMENT,
  `u_by` int DEFAULT NULL,
  `datetime` datetime DEFAULT NULL,
  `month` date DEFAULT NULL,
  `nama` varchar(50) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci DEFAULT NULL,
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
) ENGINE=InnoDB AUTO_INCREMENT=70 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci ROW_FORMAT=DYNAMIC;

-- Dumping data for table sigap2.potongan_smk: ~10 rows (approximately)
INSERT INTO `potongan_smk` (`id`, `u_by`, `datetime`, `month`, `nama`, `jenjang_id`, `jabatan_id`, `terlambat`, `value_terlambat`, `izin`, `value_izin`, `sakit`, `value_sakit`, `totalpotongan`, `tidakhadir`, `value_tidakhadir`, `pulcep`, `value_pulcep`, `tidakhadirjam`, `tidakhadirjamvalue`, `sakitperjam`, `sakitperjamvalue`, `izinperjam`, `izinperjamvalue`, `sertif`, `tahun`, `bulan`, `pid`) VALUES
	(59, -1, '2022-12-16 04:03:38', NULL, '110123', 1, 1, 2, 15000, 2, 40000, NULL, 23000, 168000, NULL, 40000, 2, 20000, 2, 9000, NULL, 4000, NULL, 9000, NULL, NULL, NULL, NULL),
	(61, -1, '2022-12-16 04:09:21', NULL, '110124', 1, 2, 2, 30000, 2, 30000, NULL, 27000, 164000, NULL, 30000, 2, 18000, 2, 4000, NULL, 7000, NULL, 4000, NULL, NULL, NULL, NULL),
	(62, -1, '2022-12-16 09:14:07', NULL, '110124', 1, 1, 1, 30000, 1, 40000, NULL, 23000, 99000, NULL, 40000, 1, 20000, 1, 9000, NULL, 4000, NULL, 9000, NULL, NULL, NULL, NULL),
	(63, NULL, NULL, NULL, NULL, 1, 1, NULL, 30000, NULL, 40000, NULL, 23000, NULL, NULL, 40000, NULL, 20000, NULL, 9000, NULL, 4000, NULL, 9000, NULL, NULL, NULL, NULL),
	(64, NULL, NULL, NULL, 'YUNIARTI', 1, 1, 2, 30000, 2, 40000, NULL, 23000, NULL, NULL, 40000, NULL, 20000, NULL, 9000, NULL, 4000, NULL, 9000, NULL, NULL, NULL, NULL),
	(65, -1, NULL, NULL, 'farhan kebab', 1, 1, 2, 30000, 2, 40000, 2, 23000, NULL, 2, 40000, 2, 20000, 2, 9000, 2, 4000, 2, 9000, NULL, NULL, NULL, NULL),
	(66, -1, NULL, NULL, 'YUNIARTI', 1, 1, 2, 30000, 2, 40000, 2, 23000, NULL, NULL, 40000, NULL, 20000, NULL, 9000, NULL, 4000, NULL, 9000, NULL, NULL, NULL, NULL),
	(67, -1, NULL, NULL, 'farhan kebab', 1, 1, 2, 30000, 2, 40000, 2, 23000, 186000, NULL, 40000, NULL, 20000, NULL, 9000, NULL, 4000, NULL, 9000, NULL, NULL, NULL, NULL),
	(68, -1, '2022-12-28 05:09:23', '2022-12-28', '110123', 1, 2, 2, 30000, 2, 40000, NULL, 23000, 220000, 2, 40000, NULL, 20000, NULL, 9000, NULL, 4000, NULL, 9000, NULL, NULL, NULL, NULL),
	(69, -1, '2023-01-25 07:10:06', NULL, '102327', 5, 5, NULL, NULL, NULL, NULL, NULL, NULL, 86000, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 1, 2023, 4, 1);

-- Dumping structure for table sigap2.potongan_smp
CREATE TABLE IF NOT EXISTS `potongan_smp` (
  `id` int NOT NULL AUTO_INCREMENT,
  `u_by` int DEFAULT NULL,
  `datetime` datetime DEFAULT NULL,
  `month` date DEFAULT NULL,
  `nama` varchar(50) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci DEFAULT NULL,
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
) ENGINE=InnoDB AUTO_INCREMENT=69 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci ROW_FORMAT=DYNAMIC;

-- Dumping data for table sigap2.potongan_smp: ~9 rows (approximately)
INSERT INTO `potongan_smp` (`id`, `u_by`, `datetime`, `month`, `nama`, `jenjang_id`, `jabatan_id`, `terlambat`, `value_terlambat`, `izin`, `value_izin`, `sakit`, `value_sakit`, `totalpotongan`, `tidakhadir`, `value_tidakhadir`, `pulcep`, `value_pulcep`, `tidakhadirjam`, `tidakhadirjamvalue`, `sakitperjam`, `sakitperjamvalue`, `izinperjam`, `izinperjamvalue`, `sertif`, `tahun`, `bulan`, `pid`) VALUES
	(59, -1, '2022-12-16 04:03:38', NULL, '110123', 1, 1, 2, 15000, 2, 40000, NULL, 23000, 168000, NULL, 40000, 2, 20000, 2, 9000, NULL, 4000, NULL, 9000, NULL, NULL, NULL, NULL),
	(61, -1, '2022-12-16 04:09:21', NULL, '110124', 1, 2, 2, 30000, 2, 30000, NULL, 27000, 164000, NULL, 30000, 2, 18000, 2, 4000, NULL, 7000, NULL, 4000, NULL, NULL, NULL, NULL),
	(62, -1, '2022-12-16 09:14:07', NULL, '110124', 1, 1, 1, 30000, 1, 40000, NULL, 23000, 99000, NULL, 40000, 1, 20000, 1, 9000, NULL, 4000, NULL, 9000, NULL, NULL, NULL, NULL),
	(63, NULL, NULL, NULL, NULL, 1, 1, NULL, 30000, NULL, 40000, NULL, 23000, NULL, NULL, 40000, NULL, 20000, NULL, 9000, NULL, 4000, NULL, 9000, NULL, NULL, NULL, NULL),
	(64, NULL, NULL, NULL, 'YUNIARTI', 1, 1, 2, 30000, 2, 40000, NULL, 23000, NULL, NULL, 40000, NULL, 20000, NULL, 9000, NULL, 4000, NULL, 9000, NULL, NULL, NULL, NULL),
	(65, -1, NULL, NULL, 'farhan kebab', 1, 1, 2, 30000, 2, 40000, 2, 23000, NULL, 2, 40000, 2, 20000, 2, 9000, 2, 4000, 2, 9000, NULL, NULL, NULL, NULL),
	(66, -1, NULL, NULL, 'YUNIARTI', 1, 1, 2, 30000, 2, 40000, 2, 23000, NULL, NULL, 40000, NULL, 20000, NULL, 9000, NULL, 4000, NULL, 9000, NULL, NULL, NULL, NULL),
	(67, -1, NULL, NULL, 'farhan kebab', 1, 1, 2, 30000, 2, 40000, 2, 23000, 186000, NULL, 40000, NULL, 20000, NULL, 9000, NULL, 4000, NULL, 9000, NULL, NULL, NULL, NULL),
	(68, -1, '2022-12-28 05:09:23', '2022-12-28', '110123', 1, 2, 2, 30000, 2, 40000, NULL, 23000, 220000, 2, 40000, NULL, 20000, NULL, 9000, NULL, 4000, NULL, 9000, NULL, NULL, NULL, NULL);

-- Dumping structure for table sigap2.potongan_tk
CREATE TABLE IF NOT EXISTS `potongan_tk` (
  `id` int NOT NULL AUTO_INCREMENT,
  `u_by` int DEFAULT NULL,
  `datetime` datetime DEFAULT NULL,
  `month` date DEFAULT NULL,
  `nama` varchar(50) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci DEFAULT NULL,
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
) ENGINE=InnoDB AUTO_INCREMENT=69 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci ROW_FORMAT=DYNAMIC;

-- Dumping data for table sigap2.potongan_tk: ~9 rows (approximately)
INSERT INTO `potongan_tk` (`id`, `u_by`, `datetime`, `month`, `nama`, `jenjang_id`, `jabatan_id`, `terlambat`, `value_terlambat`, `izin`, `value_izin`, `sakit`, `value_sakit`, `totalpotongan`, `tidakhadir`, `value_tidakhadir`, `pulcep`, `value_pulcep`, `tidakhadirjam`, `tidakhadirjamvalue`, `sakitperjam`, `sakitperjamvalue`, `izinperjam`, `izinperjamvalue`, `sertif`, `tahun`, `bulan`, `pid`) VALUES
	(59, -1, '2022-12-16 04:03:38', NULL, '110123', 1, 1, 2, 15000, 2, 40000, NULL, 23000, 168000, NULL, 40000, 2, 20000, 2, 9000, NULL, 4000, NULL, 9000, NULL, NULL, NULL, NULL),
	(61, -1, '2022-12-16 04:09:21', NULL, '110124', 1, 2, 2, 30000, 2, 30000, NULL, 27000, 164000, NULL, 30000, 2, 18000, 2, 4000, NULL, 7000, NULL, 4000, NULL, NULL, NULL, NULL),
	(62, -1, '2022-12-16 09:14:07', NULL, '110124', 1, 1, 1, 30000, 1, 40000, NULL, 23000, 99000, NULL, 40000, 1, 20000, 1, 9000, NULL, 4000, NULL, 9000, NULL, NULL, NULL, NULL),
	(63, NULL, NULL, NULL, NULL, 1, 1, NULL, 30000, NULL, 40000, NULL, 23000, NULL, NULL, 40000, NULL, 20000, NULL, 9000, NULL, 4000, NULL, 9000, NULL, NULL, NULL, NULL),
	(64, NULL, NULL, NULL, 'YUNIARTI', 1, 1, 2, 30000, 2, 40000, NULL, 23000, NULL, NULL, 40000, NULL, 20000, NULL, 9000, NULL, 4000, NULL, 9000, NULL, NULL, NULL, NULL),
	(65, -1, NULL, NULL, 'farhan kebab', 1, 1, 2, 30000, 2, 40000, 2, 23000, NULL, 2, 40000, 2, 20000, 2, 9000, 2, 4000, 2, 9000, NULL, NULL, NULL, NULL),
	(66, -1, NULL, NULL, 'YUNIARTI', 1, 1, 2, 30000, 2, 40000, 2, 23000, NULL, NULL, 40000, NULL, 20000, NULL, 9000, NULL, 4000, NULL, 9000, NULL, NULL, NULL, NULL),
	(67, -1, NULL, NULL, 'farhan kebab', 1, 1, 2, 30000, 2, 40000, 2, 23000, 186000, NULL, 40000, NULL, 20000, NULL, 9000, NULL, 4000, NULL, 9000, NULL, NULL, NULL, NULL),
	(68, -1, '2022-12-28 05:09:23', '2022-12-28', '110123', 1, 2, 2, 30000, 2, 40000, NULL, 23000, 220000, 2, 40000, NULL, 20000, NULL, 9000, NULL, 4000, NULL, 9000, NULL, NULL, NULL, NULL);

-- Dumping structure for table sigap2.proyek
CREATE TABLE IF NOT EXISTS `proyek` (
  `id` int NOT NULL AUTO_INCREMENT,
  `klien` varchar(255) DEFAULT NULL,
  `proyek` varchar(255) DEFAULT NULL,
  `tgl_awal` date DEFAULT NULL,
  `tgl_akhir` date DEFAULT NULL,
  `file_proyek` varchar(255) DEFAULT NULL,
  `aktif` tinyint DEFAULT NULL,
  PRIMARY KEY (`id`) USING BTREE
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=latin1 ROW_FORMAT=DYNAMIC;

-- Dumping data for table sigap2.proyek: ~2 rows (approximately)
INSERT INTO `proyek` (`id`, `klien`, `proyek`, `tgl_awal`, `tgl_akhir`, `file_proyek`, `aktif`) VALUES
	(1, 'Yayasan salib suci', 'YSS', NULL, NULL, NULL, 1),
	(2, 'PERKI Surabaya', 'ACSA 2022', '2022-06-17', '2022-10-30', NULL, 0);

-- Dumping structure for table sigap2.reimbursh
CREATE TABLE IF NOT EXISTS `reimbursh` (
  `id` int NOT NULL AUTO_INCREMENT,
  `pegawai` int DEFAULT NULL,
  `nama` varchar(255) DEFAULT NULL,
  `tgl` datetime DEFAULT NULL,
  `total_pengajuan` int DEFAULT NULL,
  `tgl_pengajuan` datetime DEFAULT NULL,
  `jenis` varchar(255) DEFAULT NULL,
  `keterangan` varchar(500) DEFAULT NULL,
  `rek_tujuan` varchar(255) DEFAULT NULL,
  `bukti1` varchar(255) DEFAULT NULL,
  `bukti2` varchar(255) DEFAULT NULL,
  `bukti3` varchar(255) DEFAULT NULL,
  `bukti4` varchar(255) DEFAULT NULL,
  `disetujui` varchar(5) DEFAULT NULL,
  `pembayar` varchar(255) DEFAULT NULL,
  `terbayar` varchar(5) DEFAULT NULL,
  `tgl_pembayaran` datetime DEFAULT NULL,
  `jumlah_dibayar` int DEFAULT NULL,
  PRIMARY KEY (`id`) USING BTREE
) ENGINE=InnoDB DEFAULT CHARSET=latin1 ROW_FORMAT=DYNAMIC;

-- Dumping data for table sigap2.reimbursh: ~0 rows (approximately)

-- Dumping structure for table sigap2.semester
CREATE TABLE IF NOT EXISTS `semester` (
  `id` int NOT NULL AUTO_INCREMENT,
  `nama` varchar(50) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- Dumping data for table sigap2.semester: ~2 rows (approximately)
INSERT INTO `semester` (`id`, `nama`) VALUES
	(1, 'Ganjil'),
	(2, 'Genap');

-- Dumping structure for table sigap2.sertif
CREATE TABLE IF NOT EXISTS `sertif` (
  `id` int NOT NULL AUTO_INCREMENT,
  `name` varchar(50) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- Dumping data for table sigap2.sertif: ~2 rows (approximately)
INSERT INTO `sertif` (`id`, `name`) VALUES
	(1, 'Sertifikasi'),
	(2, 'Non Sertifikasi');

-- Dumping structure for table sigap2.setuju
CREATE TABLE IF NOT EXISTS `setuju` (
  `id` int NOT NULL AUTO_INCREMENT,
  `name` varchar(50) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- Dumping data for table sigap2.setuju: ~2 rows (approximately)
INSERT INTO `setuju` (`id`, `name`) VALUES
	(1, 'ya'),
	(2, 'tidak');

-- Dumping structure for view sigap2.set_password
-- Creating temporary table to overcome VIEW dependency errors
CREATE TABLE `set_password` (
	`id` INT(10) NOT NULL,
	`nip` VARCHAR(50) NULL COLLATE 'latin1_swedish_ci',
	`username` VARCHAR(255) NULL COLLATE 'latin1_swedish_ci',
	`password` VARCHAR(255) NULL COLLATE 'latin1_swedish_ci',
	`nama` VARCHAR(255) NULL COLLATE 'latin1_swedish_ci'
) ENGINE=MyISAM;

-- Dumping structure for view sigap2.slip_gaji_yayasan
-- Creating temporary table to overcome VIEW dependency errors
CREATE TABLE `slip_gaji_yayasan` (
	`id` INT(10) NOT NULL,
	`bulan` INT(10) NULL,
	`tahun` INT(10) NULL,
	`id_pegawai` INT(10) NULL,
	`total` BIGINT(19) NULL,
	`id1` INT(10) NOT NULL
) ENGINE=MyISAM;

-- Dumping structure for table sigap2.status_kepeg
CREATE TABLE IF NOT EXISTS `status_kepeg` (
  `id` int DEFAULT NULL,
  `name` varchar(50) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- Dumping data for table sigap2.status_kepeg: ~4 rows (approximately)
INSERT INTO `status_kepeg` (`id`, `name`) VALUES
	(1, 'GTT'),
	(2, 'GTY'),
	(3, 'PTT'),
	(4, 'PTY');

-- Dumping structure for table sigap2.status_npwp
CREATE TABLE IF NOT EXISTS `status_npwp` (
  `id` int NOT NULL AUTO_INCREMENT,
  `name` varchar(50) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- Dumping data for table sigap2.status_npwp: ~2 rows (approximately)
INSERT INTO `status_npwp` (`id`, `name`) VALUES
	(1, 'Memiliki NPWP'),
	(2, 'Tidak Memiliki NPWP');

-- Dumping structure for table sigap2.status_pekerjaan
CREATE TABLE IF NOT EXISTS `status_pekerjaan` (
  `id` int NOT NULL AUTO_INCREMENT,
  `name` varchar(50) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- Dumping data for table sigap2.status_pekerjaan: ~0 rows (approximately)
INSERT INTO `status_pekerjaan` (`id`, `name`) VALUES
	(1, 'Tetap'),
	(2, 'Tidak Tetap');

-- Dumping structure for table sigap2.tambahan_tugas
CREATE TABLE IF NOT EXISTS `tambahan_tugas` (
  `id` int NOT NULL AUTO_INCREMENT,
  `name` varchar(50) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=7 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- Dumping data for table sigap2.tambahan_tugas: ~0 rows (approximately)
INSERT INTO `tambahan_tugas` (`id`, `name`) VALUES
	(1, 'K3'),
	(2, 'Wali Kelas'),
	(3, 'Pembina OSIS'),
	(4, 'Koor BK'),
	(5, 'Staff BPOPP'),
	(6, 'Staff BOS');

-- Dumping structure for table sigap2.terlambat
CREATE TABLE IF NOT EXISTS `terlambat` (
  `id` int NOT NULL AUTO_INCREMENT,
  `value` bigint DEFAULT NULL,
  `valuejam` bigint DEFAULT NULL,
  `jenjang_id` int DEFAULT NULL,
  `jabatan_id` int DEFAULT NULL,
  `jenis_jabatan` int DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- Dumping data for table sigap2.terlambat: ~0 rows (approximately)
INSERT INTO `terlambat` (`id`, `value`, `valuejam`, `jenjang_id`, `jabatan_id`, `jenis_jabatan`) VALUES
	(1, 15000, NULL, 1, 1, NULL),
	(2, 30000, NULL, 1, 2, NULL);

-- Dumping structure for table sigap2.testtable
CREATE TABLE IF NOT EXISTS `testtable` (
  `id` int NOT NULL AUTO_INCREMENT,
  `date` datetime DEFAULT NULL,
  `nojob` varchar(50) DEFAULT NULL,
  `stuffingdate` datetime DEFAULT NULL,
  `shipper` varchar(50) DEFAULT NULL,
  `stuffingloc` varchar(50) DEFAULT NULL,
  `party` varchar(50) DEFAULT NULL,
  `typeparty` varchar(50) DEFAULT NULL,
  `jumlahparty` int DEFAULT NULL,
  `shipping` varchar(50) DEFAULT NULL,
  `bookingnumer` varchar(50) DEFAULT NULL,
  `shippingline` varchar(50) DEFAULT NULL,
  `port` varchar(50) DEFAULT NULL,
  `surjal` varchar(50) DEFAULT NULL,
  `nota` varchar(50) DEFAULT NULL,
  `invoice` varchar(50) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=7 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- Dumping data for table sigap2.testtable: ~0 rows (approximately)
INSERT INTO `testtable` (`id`, `date`, `nojob`, `stuffingdate`, `shipper`, `stuffingloc`, `party`, `typeparty`, `jumlahparty`, `shipping`, `bookingnumer`, `shippingline`, `port`, `surjal`, `nota`, `invoice`) VALUES
	(1, '2022-12-08 00:00:00', '220180', '2022-12-08 00:00:00', 'SUNPAPER', 'SUB', 'asd', NULL, NULL, NULL, NULL, NULL, NULL, 'ok', 'ok', 'ok'),
	(2, '2022-12-08 00:00:00', '220180', '2022-12-08 00:00:00', 'SUNPAPER', 'SUB', 'as', NULL, NULL, NULL, NULL, NULL, NULL, 'ok1', 'ok', NULL),
	(3, '2022-12-08 00:00:00', '220180', '2022-12-08 00:00:00', 'SUNPAPER', 'SUB', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
	(4, '2022-12-08 00:00:00', '220180', '2022-12-08 00:00:00', 'SUNPAPER', 'SUB', 'as', NULL, NULL, NULL, NULL, NULL, NULL, 'ok', 'ok', 'belum'),
	(5, '2022-12-08 00:00:00', '220181', '2022-12-08 00:00:00', 'SUNPAPER', 'SUB', 'as', NULL, NULL, NULL, NULL, NULL, NULL, 'ok1', 'ok', NULL),
	(6, '2022-12-08 00:00:00', '2201803', '2022-12-08 00:00:00', 'SUNPAPER', 'SUB', 'asd', NULL, NULL, NULL, NULL, NULL, NULL, 'ok', 'ok', 'ok');

-- Dumping structure for table sigap2.totalgaji
CREATE TABLE IF NOT EXISTS `totalgaji` (
  `id` int DEFAULT NULL,
  `nama` int DEFAULT NULL,
  `jabatan` int DEFAULT NULL,
  `valuejabatan` bigint DEFAULT NULL,
  `valuetunjangan` bigint DEFAULT NULL,
  `value_lembur` bigint DEFAULT NULL,
  `Column 7` int DEFAULT NULL,
  `Column 8` int DEFAULT NULL,
  `Column 9` int DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- Dumping data for table sigap2.totalgaji: ~0 rows (approximately)

-- Dumping structure for table sigap2.tpendidikan
CREATE TABLE IF NOT EXISTS `tpendidikan` (
  `id` int NOT NULL AUTO_INCREMENT,
  `name` varchar(50) DEFAULT NULL,
  `nourut` int DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=13 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- Dumping data for table sigap2.tpendidikan: ~0 rows (approximately)
INSERT INTO `tpendidikan` (`id`, `name`, `nourut`) VALUES
	(1, 'SD', 2),
	(2, 'SMP', 3),
	(3, 'SMA', 4),
	(4, 'SMK', 5),
	(12, 'TK', 1);

-- Dumping structure for table sigap2.tunjangan_berkala
CREATE TABLE IF NOT EXISTS `tunjangan_berkala` (
  `id` int NOT NULL AUTO_INCREMENT,
  `jenjang` int DEFAULT NULL,
  `kualifikasi` int DEFAULT NULL,
  `lama` int DEFAULT NULL,
  `value` bigint DEFAULT NULL,
  PRIMARY KEY (`id`) USING BTREE
) ENGINE=InnoDB AUTO_INCREMENT=141 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci ROW_FORMAT=DYNAMIC;

-- Dumping data for table sigap2.tunjangan_berkala: ~0 rows (approximately)
INSERT INTO `tunjangan_berkala` (`id`, `jenjang`, `kualifikasi`, `lama`, `value`) VALUES
	(21, 3, 5, 1, 382500),
	(22, 3, 15, 1, 330000),
	(23, 3, 5, 2, 435000),
	(24, 3, 15, 2, 382500),
	(25, 3, 5, 3, 487000),
	(26, 3, 15, 3, 435000),
	(27, 3, 5, 4, 450000),
	(28, 3, 15, 4, 487000),
	(29, 3, 5, 5, 592000),
	(30, 3, 15, 5, 540000),
	(31, 3, 5, 6, 645000),
	(32, 3, 15, 6, 592000),
	(33, 3, 5, 7, 697500),
	(34, 3, 15, 7, 645000),
	(35, 3, 5, 8, 750000),
	(36, 3, 15, 8, 697500),
	(37, 3, 5, 9, 802500),
	(38, 3, 15, 9, 750000),
	(39, 3, 5, 10, 855000),
	(40, 3, 15, 10, 802500),
	(41, 3, 5, 1, 382500),
	(42, 3, 15, 1, 330000),
	(43, 3, 5, 2, 435000),
	(44, 3, 15, 2, 382500),
	(45, 3, 5, 3, 487000),
	(46, 3, 15, 3, 435000),
	(47, 3, 5, 4, 450000),
	(48, 3, 15, 4, 487000),
	(49, 3, 5, 5, 592000),
	(50, 3, 15, 5, 540000),
	(51, 3, 5, 6, 645000),
	(52, 3, 15, 6, 592000),
	(53, 3, 5, 7, 697500),
	(54, 3, 15, 7, 645000),
	(55, 3, 5, 8, 750000),
	(56, 3, 15, 8, 697500),
	(57, 3, 5, 9, 802500),
	(58, 3, 15, 9, 750000),
	(59, 3, 5, 10, 855000),
	(60, 3, 15, 10, 802500),
	(61, 2, 5, 1, 382500),
	(62, 2, 15, 1, 330000),
	(63, 2, 5, 2, 435000),
	(64, 2, 15, 2, 382500),
	(65, 2, 5, 3, 487000),
	(66, 2, 15, 3, 435000),
	(67, 2, 5, 4, 450000),
	(68, 2, 15, 4, 487000),
	(69, 2, 5, 5, 592000),
	(70, 2, 15, 5, 540000),
	(71, 2, 5, 6, 645000),
	(72, 2, 15, 6, 592000),
	(73, 2, 5, 7, 697500),
	(74, 2, 15, 7, 645000),
	(75, 2, 5, 8, 750000),
	(76, 2, 15, 8, 697500),
	(77, 2, 5, 9, 802500),
	(78, 2, 15, 9, 750000),
	(79, 2, 5, 10, 855000),
	(80, 2, 15, 10, 802500),
	(81, 1, 5, 1, 382500),
	(82, 1, 15, 1, 330000),
	(83, 1, 5, 2, 435000),
	(84, 1, 15, 2, 382500),
	(85, 1, 5, 3, 487000),
	(86, 1, 15, 3, 435000),
	(87, 1, 5, 4, 450000),
	(88, 1, 15, 4, 487000),
	(89, 1, 5, 5, 592000),
	(90, 1, 15, 5, 540000),
	(91, 1, 5, 6, 645000),
	(92, 1, 15, 6, 592000),
	(93, 1, 5, 7, 697500),
	(94, 1, 15, 7, 645000),
	(95, 1, 5, 8, 750000),
	(96, 1, 15, 8, 697500),
	(97, 1, 5, 9, 802500),
	(98, 1, 15, 9, 750000),
	(99, 1, 5, 10, 855000),
	(100, 1, 15, 10, 802500),
	(101, 5, 5, 1, 382500),
	(102, 5, 15, 1, 330000),
	(103, 5, 5, 2, 435000),
	(104, 5, 15, 2, 382500),
	(105, 5, 5, 3, 487000),
	(106, 5, 15, 3, 435000),
	(107, 5, 5, 4, 450000),
	(108, 5, 15, 4, 487000),
	(109, 5, 5, 5, 592000),
	(110, 5, 15, 5, 540000),
	(111, 5, 5, 6, 645000),
	(112, 5, 15, 6, 592000),
	(113, 5, 5, 7, 697500),
	(114, 5, 15, 7, 645000),
	(115, 5, 5, 8, 750000),
	(116, 5, 15, 8, 697500),
	(117, 5, 5, 9, 802500),
	(118, 5, 15, 9, 750000),
	(119, 5, 5, 10, 855000),
	(120, 5, 15, 10, 802500),
	(121, 4, 5, 1, 382500),
	(122, 4, 15, 1, 330000),
	(123, 4, 5, 2, 435000),
	(124, 4, 15, 2, 382500),
	(125, 4, 5, 3, 487000),
	(126, 4, 15, 3, 435000),
	(127, 4, 5, 4, 450000),
	(128, 4, 15, 4, 487000),
	(129, 4, 5, 5, 592000),
	(130, 4, 15, 5, 540000),
	(131, 4, 5, 6, 645000),
	(132, 4, 15, 6, 592000),
	(133, 4, 5, 7, 697500),
	(134, 4, 15, 7, 645000),
	(135, 4, 5, 8, 750000),
	(136, 4, 15, 8, 697500),
	(137, 4, 5, 9, 802500),
	(138, 4, 15, 9, 750000),
	(139, 4, 5, 10, 855000),
	(140, 4, 15, 10, 802500);

-- Dumping structure for table sigap2.tunjangan_jabatan
CREATE TABLE IF NOT EXISTS `tunjangan_jabatan` (
  `id` int NOT NULL AUTO_INCREMENT,
  `unit` int DEFAULT NULL,
  `jabatan` int DEFAULT NULL,
  `value` bigint DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=22 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- Dumping data for table sigap2.tunjangan_jabatan: ~0 rows (approximately)
INSERT INTO `tunjangan_jabatan` (`id`, `unit`, `jabatan`, `value`) VALUES
	(1, 4, 5, 450000),
	(2, 4, 15, 250000),
	(3, 4, 6, 70000),
	(4, 4, 7, 150000),
	(7, 5, 5, 575000),
	(8, 5, 15, 350000),
	(9, 3, 7, 150000),
	(10, 3, 5, 450000),
	(11, 3, 15, 250000),
	(12, 3, 6, 70000),
	(13, 1, 147, 325000),
	(14, 3, 147, 325000),
	(15, 4, 147, 325000),
	(16, 5, 147, 325000),
	(17, 2, 147, 325000),
	(18, 1, 7, 150000),
	(19, 1, 5, 450000),
	(20, 1, 15, 250000),
	(21, 1, 6, 70000);

-- Dumping structure for table sigap2.tunjangan_khusus
CREATE TABLE IF NOT EXISTS `tunjangan_khusus` (
  `id` int NOT NULL AUTO_INCREMENT,
  `unit` int DEFAULT NULL,
  `jabatan` int DEFAULT NULL,
  `value` bigint DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- Dumping data for table sigap2.tunjangan_khusus: ~0 rows (approximately)
INSERT INTO `tunjangan_khusus` (`id`, `unit`, `jabatan`, `value`) VALUES
	(1, 4, 2, 70000),
	(2, 2, 2, 70000),
	(3, 3, 2, 70000),
	(4, 5, 2, 70000),
	(5, 1, 2, 70000);

-- Dumping structure for table sigap2.tunjangan_tambahan
CREATE TABLE IF NOT EXISTS `tunjangan_tambahan` (
  `id` int NOT NULL AUTO_INCREMENT,
  `jenjang` int DEFAULT NULL,
  `kualifikasi` int DEFAULT NULL,
  `value` bigint DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=19 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- Dumping data for table sigap2.tunjangan_tambahan: ~0 rows (approximately)
INSERT INTO `tunjangan_tambahan` (`id`, `jenjang`, `kualifikasi`, `value`) VALUES
	(5, 4, 3, 100000),
	(6, 4, 5, 100000),
	(7, 4, 6, 100000),
	(8, 4, 4, 100000),
	(9, 4, 2, 125000),
	(10, 5, 2, 100000),
	(11, 5, 1, 300000),
	(12, 5, 3, 75000),
	(14, 2, 2, 100000),
	(15, 3, 2, 100000),
	(16, 1, 2, 125000),
	(17, 3, 3, 75000),
	(18, 3, 4, 150000);

-- Dumping structure for table sigap2.uangmuka
CREATE TABLE IF NOT EXISTS `uangmuka` (
  `id` int NOT NULL AUTO_INCREMENT,
  `tgl` datetime DEFAULT NULL,
  `pembayar` int DEFAULT NULL,
  `peruntukan` varchar(255) DEFAULT NULL,
  `penerima` int DEFAULT NULL,
  `rek_penerima` varchar(255) DEFAULT NULL,
  `tgl_terima` datetime DEFAULT NULL,
  `total_terima` int DEFAULT NULL,
  `tgl_tgjb` datetime DEFAULT NULL,
  `jumlah_tgjb` int DEFAULT NULL,
  `jenis` varchar(255) DEFAULT NULL,
  `keterangan` varchar(500) DEFAULT NULL,
  `bukti1` varchar(255) DEFAULT NULL,
  `bukti2` varchar(255) DEFAULT NULL,
  `bukti3` varchar(255) DEFAULT NULL,
  `bukti4` varchar(255) DEFAULT NULL,
  `disetujui` varchar(5) DEFAULT NULL,
  `status` varchar(20) DEFAULT NULL,
  PRIMARY KEY (`id`) USING BTREE
) ENGINE=InnoDB DEFAULT CHARSET=latin1 ROW_FORMAT=DYNAMIC;

-- Dumping data for table sigap2.uangmuka: ~0 rows (approximately)

-- Dumping structure for table sigap2.userlevelpermissions
CREATE TABLE IF NOT EXISTS `userlevelpermissions` (
  `userlevelid` int NOT NULL,
  `tablename` varchar(255) NOT NULL,
  `permission` int NOT NULL,
  PRIMARY KEY (`userlevelid`,`tablename`) USING BTREE
) ENGINE=InnoDB DEFAULT CHARSET=latin1 ROW_FORMAT=DYNAMIC;

-- Dumping data for table sigap2.userlevelpermissions: ~0 rows (approximately)
INSERT INTO `userlevelpermissions` (`userlevelid`, `tablename`, `permission`) VALUES
	(-2, '{3C64794E-EF73-47B1-9AB0-F3ADB03E5E03}absen', 0),
	(-2, '{3C64794E-EF73-47B1-9AB0-F3ADB03E5E03}absen_detil', 0),
	(-2, '{3C64794E-EF73-47B1-9AB0-F3ADB03E5E03}agama', 0),
	(-2, '{3C64794E-EF73-47B1-9AB0-F3ADB03E5E03}audittrail', 0),
	(-2, '{3C64794E-EF73-47B1-9AB0-F3ADB03E5E03}berita', 0),
	(-2, '{3C64794E-EF73-47B1-9AB0-F3ADB03E5E03}bulan', 0),
	(-2, '{3C64794E-EF73-47B1-9AB0-F3ADB03E5E03}daftarbarang', 0),
	(-2, '{3C64794E-EF73-47B1-9AB0-F3ADB03E5E03}dinasluar', 0),
	(-2, '{3C64794E-EF73-47B1-9AB0-F3ADB03E5E03}gaji', 0),
	(-2, '{3C64794E-EF73-47B1-9AB0-F3ADB03E5E03}gajisd', 0),
	(-2, '{3C64794E-EF73-47B1-9AB0-F3ADB03E5E03}gajisd_detil', 0),
	(-2, '{3C64794E-EF73-47B1-9AB0-F3ADB03E5E03}gajisma', 0),
	(-2, '{3C64794E-EF73-47B1-9AB0-F3ADB03E5E03}gajisma_detil', 0),
	(-2, '{3C64794E-EF73-47B1-9AB0-F3ADB03E5E03}gajismk', 0),
	(-2, '{3C64794E-EF73-47B1-9AB0-F3ADB03E5E03}gajismk_detil', 0),
	(-2, '{3C64794E-EF73-47B1-9AB0-F3ADB03E5E03}gajismp', 0),
	(-2, '{3C64794E-EF73-47B1-9AB0-F3ADB03E5E03}gajismp_detil', 0),
	(-2, '{3C64794E-EF73-47B1-9AB0-F3ADB03E5E03}gajitk', 0),
	(-2, '{3C64794E-EF73-47B1-9AB0-F3ADB03E5E03}gajitk_detil', 0),
	(-2, '{3C64794E-EF73-47B1-9AB0-F3ADB03E5E03}gajitunjangan', 0),
	(-2, '{3C64794E-EF73-47B1-9AB0-F3ADB03E5E03}gaji_pokok', 0),
	(-2, '{3C64794E-EF73-47B1-9AB0-F3ADB03E5E03}gender', 0),
	(-2, '{3C64794E-EF73-47B1-9AB0-F3ADB03E5E03}ijazah', 0),
	(-2, '{3C64794E-EF73-47B1-9AB0-F3ADB03E5E03}ijin', 0),
	(-2, '{3C64794E-EF73-47B1-9AB0-F3ADB03E5E03}jabatan', 0),
	(-2, '{3C64794E-EF73-47B1-9AB0-F3ADB03E5E03}jenis_barang', 0),
	(-2, '{3C64794E-EF73-47B1-9AB0-F3ADB03E5E03}jenis_dinasluar', 0),
	(-2, '{3C64794E-EF73-47B1-9AB0-F3ADB03E5E03}jenis_grup_berita', 0),
	(-2, '{3C64794E-EF73-47B1-9AB0-F3ADB03E5E03}jenis_grup_ilmu', 0),
	(-2, '{3C64794E-EF73-47B1-9AB0-F3ADB03E5E03}jenis_ijin', 0),
	(-2, '{3C64794E-EF73-47B1-9AB0-F3ADB03E5E03}jenis_lembur', 0),
	(-2, '{3C64794E-EF73-47B1-9AB0-F3ADB03E5E03}komentar', 0),
	(-2, '{3C64794E-EF73-47B1-9AB0-F3ADB03E5E03}lembur', 0),
	(-2, '{3C64794E-EF73-47B1-9AB0-F3ADB03E5E03}m_pulangcepat', 0),
	(-2, '{3C64794E-EF73-47B1-9AB0-F3ADB03E5E03}m_sakit', 0),
	(-2, '{3C64794E-EF73-47B1-9AB0-F3ADB03E5E03}m_tidakhadir', 0),
	(-2, '{3C64794E-EF73-47B1-9AB0-F3ADB03E5E03}pegawai', 0),
	(-2, '{3C64794E-EF73-47B1-9AB0-F3ADB03E5E03}peg_dokumen', 0),
	(-2, '{3C64794E-EF73-47B1-9AB0-F3ADB03E5E03}peg_keluarga', 0),
	(-2, '{3C64794E-EF73-47B1-9AB0-F3ADB03E5E03}peg_skill', 0),
	(-2, '{3C64794E-EF73-47B1-9AB0-F3ADB03E5E03}penempatan', 0),
	(-2, '{3C64794E-EF73-47B1-9AB0-F3ADB03E5E03}pengetahuan', 0),
	(-2, '{3C64794E-EF73-47B1-9AB0-F3ADB03E5E03}potongan', 0),
	(-2, '{3C64794E-EF73-47B1-9AB0-F3ADB03E5E03}potongan_sd', 0),
	(-2, '{3C64794E-EF73-47B1-9AB0-F3ADB03E5E03}potongan_smp', 0),
	(-2, '{3C64794E-EF73-47B1-9AB0-F3ADB03E5E03}proyek', 0),
	(-2, '{3C64794E-EF73-47B1-9AB0-F3ADB03E5E03}reimbursh', 0),
	(-2, '{3C64794E-EF73-47B1-9AB0-F3ADB03E5E03}terlambat', 0),
	(-2, '{3C64794E-EF73-47B1-9AB0-F3ADB03E5E03}testtable', 0),
	(-2, '{3C64794E-EF73-47B1-9AB0-F3ADB03E5E03}totalgaji', 0),
	(-2, '{3C64794E-EF73-47B1-9AB0-F3ADB03E5E03}tpendidikan', 0),
	(-2, '{3C64794E-EF73-47B1-9AB0-F3ADB03E5E03}uangmuka', 0),
	(-2, '{3C64794E-EF73-47B1-9AB0-F3ADB03E5E03}userlevelpermissions', 0),
	(-2, '{3C64794E-EF73-47B1-9AB0-F3ADB03E5E03}userlevels', 0),
	(-2, '{FB7F1C69-BEAA-490D-AA3A-561A2CBD209C}dinasluar', 0),
	(-2, '{FB7F1C69-BEAA-490D-AA3A-561A2CBD209C}ijin', 0),
	(-2, '{FB7F1C69-BEAA-490D-AA3A-561A2CBD209C}jabatan', 0),
	(-2, '{FB7F1C69-BEAA-490D-AA3A-561A2CBD209C}pegawai', 0),
	(-2, '{FB7F1C69-BEAA-490D-AA3A-561A2CBD209C}peg_dokumen', 0),
	(-2, '{FB7F1C69-BEAA-490D-AA3A-561A2CBD209C}peg_skill', 0),
	(-2, '{FB7F1C69-BEAA-490D-AA3A-561A2CBD209C}penempatan', 0),
	(-2, '{FB7F1C69-BEAA-490D-AA3A-561A2CBD209C}proyek', 0),
	(-2, '{FB7F1C69-BEAA-490D-AA3A-561A2CBD209C}userlevelpermissions', 0),
	(-2, '{FB7F1C69-BEAA-490D-AA3A-561A2CBD209C}userlevels', 0),
	(0, '{3C64794E-EF73-47B1-9AB0-F3ADB03E5E03}absen', 0),
	(0, '{3C64794E-EF73-47B1-9AB0-F3ADB03E5E03}absen_detil', 0),
	(0, '{3C64794E-EF73-47B1-9AB0-F3ADB03E5E03}agama', 0),
	(0, '{3C64794E-EF73-47B1-9AB0-F3ADB03E5E03}audittrail', 0),
	(0, '{3C64794E-EF73-47B1-9AB0-F3ADB03E5E03}berita', 0),
	(0, '{3C64794E-EF73-47B1-9AB0-F3ADB03E5E03}bulan', 0),
	(0, '{3C64794E-EF73-47B1-9AB0-F3ADB03E5E03}daftarbarang', 0),
	(0, '{3C64794E-EF73-47B1-9AB0-F3ADB03E5E03}dinasluar', 0),
	(0, '{3C64794E-EF73-47B1-9AB0-F3ADB03E5E03}gaji', 0),
	(0, '{3C64794E-EF73-47B1-9AB0-F3ADB03E5E03}gajisd', 0),
	(0, '{3C64794E-EF73-47B1-9AB0-F3ADB03E5E03}gajisd_detil', 0),
	(0, '{3C64794E-EF73-47B1-9AB0-F3ADB03E5E03}gajisma', 0),
	(0, '{3C64794E-EF73-47B1-9AB0-F3ADB03E5E03}gajisma_detil', 0),
	(0, '{3C64794E-EF73-47B1-9AB0-F3ADB03E5E03}gajismk', 0),
	(0, '{3C64794E-EF73-47B1-9AB0-F3ADB03E5E03}gajismk_detil', 0),
	(0, '{3C64794E-EF73-47B1-9AB0-F3ADB03E5E03}gajismp', 0),
	(0, '{3C64794E-EF73-47B1-9AB0-F3ADB03E5E03}gajismp_detil', 0),
	(0, '{3C64794E-EF73-47B1-9AB0-F3ADB03E5E03}gajitk', 0),
	(0, '{3C64794E-EF73-47B1-9AB0-F3ADB03E5E03}gajitk_detil', 0),
	(0, '{3C64794E-EF73-47B1-9AB0-F3ADB03E5E03}gajitunjangan', 0),
	(0, '{3C64794E-EF73-47B1-9AB0-F3ADB03E5E03}gaji_pokok', 0),
	(0, '{3C64794E-EF73-47B1-9AB0-F3ADB03E5E03}gender', 0),
	(0, '{3C64794E-EF73-47B1-9AB0-F3ADB03E5E03}ijazah', 0),
	(0, '{3C64794E-EF73-47B1-9AB0-F3ADB03E5E03}ijin', 0),
	(0, '{3C64794E-EF73-47B1-9AB0-F3ADB03E5E03}jabatan', 0),
	(0, '{3C64794E-EF73-47B1-9AB0-F3ADB03E5E03}jenis_barang', 0),
	(0, '{3C64794E-EF73-47B1-9AB0-F3ADB03E5E03}jenis_dinasluar', 0),
	(0, '{3C64794E-EF73-47B1-9AB0-F3ADB03E5E03}jenis_grup_berita', 0),
	(0, '{3C64794E-EF73-47B1-9AB0-F3ADB03E5E03}jenis_grup_ilmu', 0),
	(0, '{3C64794E-EF73-47B1-9AB0-F3ADB03E5E03}jenis_ijin', 0),
	(0, '{3C64794E-EF73-47B1-9AB0-F3ADB03E5E03}jenis_lembur', 0),
	(0, '{3C64794E-EF73-47B1-9AB0-F3ADB03E5E03}komentar', 0),
	(0, '{3C64794E-EF73-47B1-9AB0-F3ADB03E5E03}lembur', 0),
	(0, '{3C64794E-EF73-47B1-9AB0-F3ADB03E5E03}m_pulangcepat', 0),
	(0, '{3C64794E-EF73-47B1-9AB0-F3ADB03E5E03}m_sakit', 0),
	(0, '{3C64794E-EF73-47B1-9AB0-F3ADB03E5E03}m_tidakhadir', 0),
	(0, '{3C64794E-EF73-47B1-9AB0-F3ADB03E5E03}pegawai', 0),
	(0, '{3C64794E-EF73-47B1-9AB0-F3ADB03E5E03}peg_dokumen', 0),
	(0, '{3C64794E-EF73-47B1-9AB0-F3ADB03E5E03}peg_keluarga', 0),
	(0, '{3C64794E-EF73-47B1-9AB0-F3ADB03E5E03}peg_skill', 0),
	(0, '{3C64794E-EF73-47B1-9AB0-F3ADB03E5E03}penempatan', 0),
	(0, '{3C64794E-EF73-47B1-9AB0-F3ADB03E5E03}pengetahuan', 0),
	(0, '{3C64794E-EF73-47B1-9AB0-F3ADB03E5E03}potongan', 0),
	(0, '{3C64794E-EF73-47B1-9AB0-F3ADB03E5E03}potongan_sd', 0),
	(0, '{3C64794E-EF73-47B1-9AB0-F3ADB03E5E03}potongan_smp', 0),
	(0, '{3C64794E-EF73-47B1-9AB0-F3ADB03E5E03}proyek', 0),
	(0, '{3C64794E-EF73-47B1-9AB0-F3ADB03E5E03}reimbursh', 0),
	(0, '{3C64794E-EF73-47B1-9AB0-F3ADB03E5E03}terlambat', 0),
	(0, '{3C64794E-EF73-47B1-9AB0-F3ADB03E5E03}testtable', 0),
	(0, '{3C64794E-EF73-47B1-9AB0-F3ADB03E5E03}totalgaji', 0),
	(0, '{3C64794E-EF73-47B1-9AB0-F3ADB03E5E03}tpendidikan', 0),
	(0, '{3C64794E-EF73-47B1-9AB0-F3ADB03E5E03}uangmuka', 0),
	(0, '{3C64794E-EF73-47B1-9AB0-F3ADB03E5E03}userlevelpermissions', 0),
	(0, '{3C64794E-EF73-47B1-9AB0-F3ADB03E5E03}userlevels', 0),
	(1, '{3C64794E-EF73-47B1-9AB0-F3ADB03E5E03}absen', 256),
	(1, '{3C64794E-EF73-47B1-9AB0-F3ADB03E5E03}absen_detil', 256),
	(1, '{3C64794E-EF73-47B1-9AB0-F3ADB03E5E03}agama', 256),
	(1, '{3C64794E-EF73-47B1-9AB0-F3ADB03E5E03}audittrail', 256),
	(1, '{3C64794E-EF73-47B1-9AB0-F3ADB03E5E03}barang', 256),
	(1, '{3C64794E-EF73-47B1-9AB0-F3ADB03E5E03}barangnew', 256),
	(1, '{3C64794E-EF73-47B1-9AB0-F3ADB03E5E03}berita', 256),
	(1, '{3C64794E-EF73-47B1-9AB0-F3ADB03E5E03}bulan', 256),
	(1, '{3C64794E-EF73-47B1-9AB0-F3ADB03E5E03}custom_file.php', 495),
	(1, '{3C64794E-EF73-47B1-9AB0-F3ADB03E5E03}daftarbarang', 256),
	(1, '{3C64794E-EF73-47B1-9AB0-F3ADB03E5E03}dinasluar', 256),
	(1, '{3C64794E-EF73-47B1-9AB0-F3ADB03E5E03}gaji', 256),
	(1, '{3C64794E-EF73-47B1-9AB0-F3ADB03E5E03}gajisd', 256),
	(1, '{3C64794E-EF73-47B1-9AB0-F3ADB03E5E03}gajisd_detil', 256),
	(1, '{3C64794E-EF73-47B1-9AB0-F3ADB03E5E03}gajisma', 256),
	(1, '{3C64794E-EF73-47B1-9AB0-F3ADB03E5E03}gajisma_detil', 256),
	(1, '{3C64794E-EF73-47B1-9AB0-F3ADB03E5E03}gajismk', 256),
	(1, '{3C64794E-EF73-47B1-9AB0-F3ADB03E5E03}gajismk_detil', 256),
	(1, '{3C64794E-EF73-47B1-9AB0-F3ADB03E5E03}gajismp', 256),
	(1, '{3C64794E-EF73-47B1-9AB0-F3ADB03E5E03}gajismp_detil', 256),
	(1, '{3C64794E-EF73-47B1-9AB0-F3ADB03E5E03}gajitk', 256),
	(1, '{3C64794E-EF73-47B1-9AB0-F3ADB03E5E03}gajitk_detil', 256),
	(1, '{3C64794E-EF73-47B1-9AB0-F3ADB03E5E03}gajitunjangan', 256),
	(1, '{3C64794E-EF73-47B1-9AB0-F3ADB03E5E03}gaji_karyawan_sd', 256),
	(1, '{3C64794E-EF73-47B1-9AB0-F3ADB03E5E03}gaji_karyawan_sma', 256),
	(1, '{3C64794E-EF73-47B1-9AB0-F3ADB03E5E03}gaji_karyawan_smk', 256),
	(1, '{3C64794E-EF73-47B1-9AB0-F3ADB03E5E03}gaji_karyawan_smp', 256),
	(1, '{3C64794E-EF73-47B1-9AB0-F3ADB03E5E03}gaji_karyawan_tk', 256),
	(1, '{3C64794E-EF73-47B1-9AB0-F3ADB03E5E03}gaji_pokok', 256),
	(1, '{3C64794E-EF73-47B1-9AB0-F3ADB03E5E03}gaji_pokok_kayawan', 256),
	(1, '{3C64794E-EF73-47B1-9AB0-F3ADB03E5E03}gaji_pokok_tu', 256),
	(1, '{3C64794E-EF73-47B1-9AB0-F3ADB03E5E03}gaji_sma', 256),
	(1, '{3C64794E-EF73-47B1-9AB0-F3ADB03E5E03}gaji_smk', 256),
	(1, '{3C64794E-EF73-47B1-9AB0-F3ADB03E5E03}gaji_smp', 256),
	(1, '{3C64794E-EF73-47B1-9AB0-F3ADB03E5E03}gaji_tk', 256),
	(1, '{3C64794E-EF73-47B1-9AB0-F3ADB03E5E03}gaji_tu_sd', 256),
	(1, '{3C64794E-EF73-47B1-9AB0-F3ADB03E5E03}gaji_tu_sma', 256),
	(1, '{3C64794E-EF73-47B1-9AB0-F3ADB03E5E03}gaji_tu_smk', 256),
	(1, '{3C64794E-EF73-47B1-9AB0-F3ADB03E5E03}gaji_tu_smp', 256),
	(1, '{3C64794E-EF73-47B1-9AB0-F3ADB03E5E03}gaji_tu_tk', 256),
	(1, '{3C64794E-EF73-47B1-9AB0-F3ADB03E5E03}gender', 256),
	(1, '{3C64794E-EF73-47B1-9AB0-F3ADB03E5E03}hapus_barang', 256),
	(1, '{3C64794E-EF73-47B1-9AB0-F3ADB03E5E03}hapus_barangnew', 256),
	(1, '{3C64794E-EF73-47B1-9AB0-F3ADB03E5E03}home.php', 511),
	(1, '{3C64794E-EF73-47B1-9AB0-F3ADB03E5E03}ijazah', 256),
	(1, '{3C64794E-EF73-47B1-9AB0-F3ADB03E5E03}ijin', 256),
	(1, '{3C64794E-EF73-47B1-9AB0-F3ADB03E5E03}jabatan', 256),
	(1, '{3C64794E-EF73-47B1-9AB0-F3ADB03E5E03}jenis_barang', 256),
	(1, '{3C64794E-EF73-47B1-9AB0-F3ADB03E5E03}jenis_dinasluar', 256),
	(1, '{3C64794E-EF73-47B1-9AB0-F3ADB03E5E03}jenis_grup_berita', 256),
	(1, '{3C64794E-EF73-47B1-9AB0-F3ADB03E5E03}jenis_grup_ilmu', 256),
	(1, '{3C64794E-EF73-47B1-9AB0-F3ADB03E5E03}jenis_ijin', 256),
	(1, '{3C64794E-EF73-47B1-9AB0-F3ADB03E5E03}jenis_jabatan', 256),
	(1, '{3C64794E-EF73-47B1-9AB0-F3ADB03E5E03}jenis_lembur', 256),
	(1, '{3C64794E-EF73-47B1-9AB0-F3ADB03E5E03}komentar', 256),
	(1, '{3C64794E-EF73-47B1-9AB0-F3ADB03E5E03}lembur', 256),
	(1, '{3C64794E-EF73-47B1-9AB0-F3ADB03E5E03}mpendidikan', 256),
	(1, '{3C64794E-EF73-47B1-9AB0-F3ADB03E5E03}m_bpjs', 256),
	(1, '{3C64794E-EF73-47B1-9AB0-F3ADB03E5E03}m_inval', 0),
	(1, '{3C64794E-EF73-47B1-9AB0-F3ADB03E5E03}m_karyawan_sd', 256),
	(1, '{3C64794E-EF73-47B1-9AB0-F3ADB03E5E03}m_karyawan_sma', 256),
	(1, '{3C64794E-EF73-47B1-9AB0-F3ADB03E5E03}m_karyawan_smk', 256),
	(1, '{3C64794E-EF73-47B1-9AB0-F3ADB03E5E03}m_karyawan_smp', 256),
	(1, '{3C64794E-EF73-47B1-9AB0-F3ADB03E5E03}m_karyawan_tk', 256),
	(1, '{3C64794E-EF73-47B1-9AB0-F3ADB03E5E03}m_kehadiran', 256),
	(1, '{3C64794E-EF73-47B1-9AB0-F3ADB03E5E03}m_lembur', 256),
	(1, '{3C64794E-EF73-47B1-9AB0-F3ADB03E5E03}m_piket', 256),
	(1, '{3C64794E-EF73-47B1-9AB0-F3ADB03E5E03}m_potongan', 0),
	(1, '{3C64794E-EF73-47B1-9AB0-F3ADB03E5E03}m_potongan_sd', 0),
	(1, '{3C64794E-EF73-47B1-9AB0-F3ADB03E5E03}m_potongan_sma', 0),
	(1, '{3C64794E-EF73-47B1-9AB0-F3ADB03E5E03}m_potongan_smk', 0),
	(1, '{3C64794E-EF73-47B1-9AB0-F3ADB03E5E03}m_potongan_smp', 0),
	(1, '{3C64794E-EF73-47B1-9AB0-F3ADB03E5E03}m_pulangcepat', 256),
	(1, '{3C64794E-EF73-47B1-9AB0-F3ADB03E5E03}m_sakit', 256),
	(1, '{3C64794E-EF73-47B1-9AB0-F3ADB03E5E03}m_sd', 256),
	(1, '{3C64794E-EF73-47B1-9AB0-F3ADB03E5E03}m_sma', 256),
	(1, '{3C64794E-EF73-47B1-9AB0-F3ADB03E5E03}m_smk', 256),
	(1, '{3C64794E-EF73-47B1-9AB0-F3ADB03E5E03}m_smp', 256),
	(1, '{3C64794E-EF73-47B1-9AB0-F3ADB03E5E03}m_tahun', 0),
	(1, '{3C64794E-EF73-47B1-9AB0-F3ADB03E5E03}m_tidakhadir', 256),
	(1, '{3C64794E-EF73-47B1-9AB0-F3ADB03E5E03}m_tk', 256),
	(1, '{3C64794E-EF73-47B1-9AB0-F3ADB03E5E03}m_tu_sd', 256),
	(1, '{3C64794E-EF73-47B1-9AB0-F3ADB03E5E03}m_tu_sma', 256),
	(1, '{3C64794E-EF73-47B1-9AB0-F3ADB03E5E03}m_tu_smk', 256),
	(1, '{3C64794E-EF73-47B1-9AB0-F3ADB03E5E03}m_tu_smp', 256),
	(1, '{3C64794E-EF73-47B1-9AB0-F3ADB03E5E03}m_tu_tk', 256),
	(1, '{3C64794E-EF73-47B1-9AB0-F3ADB03E5E03}m_yayasan', 0),
	(1, '{3C64794E-EF73-47B1-9AB0-F3ADB03E5E03}pegawai', 320),
	(1, '{3C64794E-EF73-47B1-9AB0-F3ADB03E5E03}peg_dokumen', 256),
	(1, '{3C64794E-EF73-47B1-9AB0-F3ADB03E5E03}peg_keluarga', 256),
	(1, '{3C64794E-EF73-47B1-9AB0-F3ADB03E5E03}peg_skill', 256),
	(1, '{3C64794E-EF73-47B1-9AB0-F3ADB03E5E03}penempatan', 256),
	(1, '{3C64794E-EF73-47B1-9AB0-F3ADB03E5E03}pengetahuan', 256),
	(1, '{3C64794E-EF73-47B1-9AB0-F3ADB03E5E03}potongan_sd', 256),
	(1, '{3C64794E-EF73-47B1-9AB0-F3ADB03E5E03}potongan_sma', 256),
	(1, '{3C64794E-EF73-47B1-9AB0-F3ADB03E5E03}potongan_smk', 256),
	(1, '{3C64794E-EF73-47B1-9AB0-F3ADB03E5E03}potongan_smp', 256),
	(1, '{3C64794E-EF73-47B1-9AB0-F3ADB03E5E03}potongan_tk', 256),
	(1, '{3C64794E-EF73-47B1-9AB0-F3ADB03E5E03}proyek', 256),
	(1, '{3C64794E-EF73-47B1-9AB0-F3ADB03E5E03}reimbursh', 256),
	(1, '{3C64794E-EF73-47B1-9AB0-F3ADB03E5E03}sertif', 256),
	(1, '{3C64794E-EF73-47B1-9AB0-F3ADB03E5E03}setuju', 256),
	(1, '{3C64794E-EF73-47B1-9AB0-F3ADB03E5E03}set_password', 0),
	(1, '{3C64794E-EF73-47B1-9AB0-F3ADB03E5E03}slipgaji.php', 504),
	(1, '{3C64794E-EF73-47B1-9AB0-F3ADB03E5E03}slip_gaji_yayasan', 495),
	(1, '{3C64794E-EF73-47B1-9AB0-F3ADB03E5E03}tambahan_tugas', 256),
	(1, '{3C64794E-EF73-47B1-9AB0-F3ADB03E5E03}terlambat', 256),
	(1, '{3C64794E-EF73-47B1-9AB0-F3ADB03E5E03}testtable', 256),
	(1, '{3C64794E-EF73-47B1-9AB0-F3ADB03E5E03}test_api.php', 256),
	(1, '{3C64794E-EF73-47B1-9AB0-F3ADB03E5E03}test_pdf.php', 504),
	(1, '{3C64794E-EF73-47B1-9AB0-F3ADB03E5E03}totalgaji', 256),
	(1, '{3C64794E-EF73-47B1-9AB0-F3ADB03E5E03}tpendidikan', 256),
	(1, '{3C64794E-EF73-47B1-9AB0-F3ADB03E5E03}tunjangan_berkala', 256),
	(1, '{3C64794E-EF73-47B1-9AB0-F3ADB03E5E03}tunjangan_tambahan', 256),
	(1, '{3C64794E-EF73-47B1-9AB0-F3ADB03E5E03}uangmuka', 256),
	(1, '{3C64794E-EF73-47B1-9AB0-F3ADB03E5E03}userlevelpermissions', 256),
	(1, '{3C64794E-EF73-47B1-9AB0-F3ADB03E5E03}userlevels', 256),
	(1, '{3C64794E-EF73-47B1-9AB0-F3ADB03E5E03}v_gajisd', 0),
	(1, '{3C64794E-EF73-47B1-9AB0-F3ADB03E5E03}v_gajisma', 0),
	(1, '{3C64794E-EF73-47B1-9AB0-F3ADB03E5E03}v_gaji_guru_smk', 0),
	(1, '{3C64794E-EF73-47B1-9AB0-F3ADB03E5E03}v_gaji_karyawan_sd', 0),
	(1, '{3C64794E-EF73-47B1-9AB0-F3ADB03E5E03}v_gaji_karyawan_sma', 0),
	(1, '{3C64794E-EF73-47B1-9AB0-F3ADB03E5E03}v_gaji_karyawan_smk', 0),
	(1, '{3C64794E-EF73-47B1-9AB0-F3ADB03E5E03}v_gaji_karyawan_smp', 0),
	(1, '{3C64794E-EF73-47B1-9AB0-F3ADB03E5E03}v_gaji_karyawan_tk', 0),
	(1, '{3C64794E-EF73-47B1-9AB0-F3ADB03E5E03}v_gaji_smp', 0),
	(1, '{3C64794E-EF73-47B1-9AB0-F3ADB03E5E03}v_gaji_tk', 0),
	(1, '{3C64794E-EF73-47B1-9AB0-F3ADB03E5E03}v_gaji_tu_sd', 0),
	(1, '{3C64794E-EF73-47B1-9AB0-F3ADB03E5E03}v_gaji_tu_sma', 0),
	(1, '{3C64794E-EF73-47B1-9AB0-F3ADB03E5E03}v_gaji_tu_smk', 0),
	(1, '{3C64794E-EF73-47B1-9AB0-F3ADB03E5E03}v_gaji_tu_smp', 0),
	(1, '{3C64794E-EF73-47B1-9AB0-F3ADB03E5E03}v_gaji_tu_tk', 0),
	(1, '{3C64794E-EF73-47B1-9AB0-F3ADB03E5E03}v_karyawan_sd', 0),
	(1, '{3C64794E-EF73-47B1-9AB0-F3ADB03E5E03}v_karyawan_sma', 0),
	(1, '{3C64794E-EF73-47B1-9AB0-F3ADB03E5E03}v_karyawan_smk', 0),
	(1, '{3C64794E-EF73-47B1-9AB0-F3ADB03E5E03}v_karyawan_smp', 0),
	(1, '{3C64794E-EF73-47B1-9AB0-F3ADB03E5E03}v_karyawan_tk', 0),
	(1, '{3C64794E-EF73-47B1-9AB0-F3ADB03E5E03}v_m_sd', 0),
	(1, '{3C64794E-EF73-47B1-9AB0-F3ADB03E5E03}v_m_sma', 0),
	(1, '{3C64794E-EF73-47B1-9AB0-F3ADB03E5E03}v_m_smk', 0),
	(1, '{3C64794E-EF73-47B1-9AB0-F3ADB03E5E03}v_m_smp', 0),
	(1, '{3C64794E-EF73-47B1-9AB0-F3ADB03E5E03}v_m_tk', 0),
	(1, '{3C64794E-EF73-47B1-9AB0-F3ADB03E5E03}v_pengurus_yayasan', 0),
	(1, '{3C64794E-EF73-47B1-9AB0-F3ADB03E5E03}v_totalgaji', 367),
	(1, '{3C64794E-EF73-47B1-9AB0-F3ADB03E5E03}v_totalgajikaryawan', 367),
	(1, '{3C64794E-EF73-47B1-9AB0-F3ADB03E5E03}v_totalgajikaryawansma', 367),
	(1, '{3C64794E-EF73-47B1-9AB0-F3ADB03E5E03}v_totalgajikaryawansmk', 367),
	(1, '{3C64794E-EF73-47B1-9AB0-F3ADB03E5E03}v_totalgajikaryawansmp', 367),
	(1, '{3C64794E-EF73-47B1-9AB0-F3ADB03E5E03}v_totalgajikaryawantk', 367),
	(1, '{3C64794E-EF73-47B1-9AB0-F3ADB03E5E03}v_totalgajisma', 367),
	(1, '{3C64794E-EF73-47B1-9AB0-F3ADB03E5E03}v_totalgajismk', 367),
	(1, '{3C64794E-EF73-47B1-9AB0-F3ADB03E5E03}v_totalgajismp', 367),
	(1, '{3C64794E-EF73-47B1-9AB0-F3ADB03E5E03}v_totalgajitk', 367),
	(1, '{3C64794E-EF73-47B1-9AB0-F3ADB03E5E03}v_totalgajitu', 367),
	(1, '{3C64794E-EF73-47B1-9AB0-F3ADB03E5E03}v_totalgajitusma', 367),
	(1, '{3C64794E-EF73-47B1-9AB0-F3ADB03E5E03}v_totalgajitusmk', 367),
	(1, '{3C64794E-EF73-47B1-9AB0-F3ADB03E5E03}v_totalgajitusmp', 367),
	(1, '{3C64794E-EF73-47B1-9AB0-F3ADB03E5E03}v_totalgajitutk', 367),
	(1, '{3C64794E-EF73-47B1-9AB0-F3ADB03E5E03}v_tu_sd', 0),
	(1, '{3C64794E-EF73-47B1-9AB0-F3ADB03E5E03}v_tu_sma', 0),
	(1, '{3C64794E-EF73-47B1-9AB0-F3ADB03E5E03}v_tu_smk', 0),
	(1, '{3C64794E-EF73-47B1-9AB0-F3ADB03E5E03}v_tu_smp', 0),
	(1, '{3C64794E-EF73-47B1-9AB0-F3ADB03E5E03}v_tu_tk', 0),
	(1, '{3C64794E-EF73-47B1-9AB0-F3ADB03E5E03}v_yayasan', 0),
	(1, '{3C64794E-EF73-47B1-9AB0-F3ADB03E5E03}yayasan', 0),
	(1, '{FB7F1C69-BEAA-490D-AA3A-561A2CBD209C}absen', 0),
	(1, '{FB7F1C69-BEAA-490D-AA3A-561A2CBD209C}absen_detil', 0),
	(1, '{FB7F1C69-BEAA-490D-AA3A-561A2CBD209C}audittrail', 0),
	(1, '{FB7F1C69-BEAA-490D-AA3A-561A2CBD209C}berita', 104),
	(1, '{FB7F1C69-BEAA-490D-AA3A-561A2CBD209C}daftarbarang', 0),
	(1, '{FB7F1C69-BEAA-490D-AA3A-561A2CBD209C}dinasluar', 111),
	(1, '{FB7F1C69-BEAA-490D-AA3A-561A2CBD209C}ijin', 111),
	(1, '{FB7F1C69-BEAA-490D-AA3A-561A2CBD209C}jabatan', 0),
	(1, '{FB7F1C69-BEAA-490D-AA3A-561A2CBD209C}jenis_barang', 0),
	(1, '{FB7F1C69-BEAA-490D-AA3A-561A2CBD209C}jenis_dinasluar', 0),
	(1, '{FB7F1C69-BEAA-490D-AA3A-561A2CBD209C}jenis_grup_berita', 0),
	(1, '{FB7F1C69-BEAA-490D-AA3A-561A2CBD209C}jenis_grup_ilmu', 0),
	(1, '{FB7F1C69-BEAA-490D-AA3A-561A2CBD209C}jenis_ijin', 0),
	(1, '{FB7F1C69-BEAA-490D-AA3A-561A2CBD209C}jenis_lembur', 0),
	(1, '{FB7F1C69-BEAA-490D-AA3A-561A2CBD209C}komentar', 0),
	(1, '{FB7F1C69-BEAA-490D-AA3A-561A2CBD209C}lembur', 111),
	(1, '{FB7F1C69-BEAA-490D-AA3A-561A2CBD209C}pegawai', 108),
	(1, '{FB7F1C69-BEAA-490D-AA3A-561A2CBD209C}peg_dokumen', 111),
	(1, '{FB7F1C69-BEAA-490D-AA3A-561A2CBD209C}peg_keluarga', 111),
	(1, '{FB7F1C69-BEAA-490D-AA3A-561A2CBD209C}peg_skill', 111),
	(1, '{FB7F1C69-BEAA-490D-AA3A-561A2CBD209C}penempatan', 0),
	(1, '{FB7F1C69-BEAA-490D-AA3A-561A2CBD209C}pengetahuan', 109),
	(1, '{FB7F1C69-BEAA-490D-AA3A-561A2CBD209C}proyek', 0),
	(1, '{FB7F1C69-BEAA-490D-AA3A-561A2CBD209C}reimbursh', 111),
	(1, '{FB7F1C69-BEAA-490D-AA3A-561A2CBD209C}uangmuka', 111),
	(1, '{FB7F1C69-BEAA-490D-AA3A-561A2CBD209C}userlevelpermissions', 0),
	(1, '{FB7F1C69-BEAA-490D-AA3A-561A2CBD209C}userlevels', 0),
	(1, '{FB7F1C69-BEAA-490D-AA3A-561A2CBD209C}v_admin', 0),
	(1, '{FB7F1C69-BEAA-490D-AA3A-561A2CBD209C}v_pm', 0),
	(2, '{3C64794E-EF73-47B1-9AB0-F3ADB03E5E03}absen', 256),
	(2, '{3C64794E-EF73-47B1-9AB0-F3ADB03E5E03}absen_detil', 256),
	(2, '{3C64794E-EF73-47B1-9AB0-F3ADB03E5E03}agama', 256),
	(2, '{3C64794E-EF73-47B1-9AB0-F3ADB03E5E03}audittrail', 256),
	(2, '{3C64794E-EF73-47B1-9AB0-F3ADB03E5E03}backup_restore.php', 495),
	(2, '{3C64794E-EF73-47B1-9AB0-F3ADB03E5E03}barang', 256),
	(2, '{3C64794E-EF73-47B1-9AB0-F3ADB03E5E03}barangnew', 256),
	(2, '{3C64794E-EF73-47B1-9AB0-F3ADB03E5E03}berita', 256),
	(2, '{3C64794E-EF73-47B1-9AB0-F3ADB03E5E03}bulan', 256),
	(2, '{3C64794E-EF73-47B1-9AB0-F3ADB03E5E03}custom_file.php', 256),
	(2, '{3C64794E-EF73-47B1-9AB0-F3ADB03E5E03}daftarbarang', 256),
	(2, '{3C64794E-EF73-47B1-9AB0-F3ADB03E5E03}dinasluar', 256),
	(2, '{3C64794E-EF73-47B1-9AB0-F3ADB03E5E03}gaji', 256),
	(2, '{3C64794E-EF73-47B1-9AB0-F3ADB03E5E03}gajisd', 256),
	(2, '{3C64794E-EF73-47B1-9AB0-F3ADB03E5E03}gajisd_detil', 256),
	(2, '{3C64794E-EF73-47B1-9AB0-F3ADB03E5E03}gajisma', 256),
	(2, '{3C64794E-EF73-47B1-9AB0-F3ADB03E5E03}gajisma_detil', 256),
	(2, '{3C64794E-EF73-47B1-9AB0-F3ADB03E5E03}gajismk', 256),
	(2, '{3C64794E-EF73-47B1-9AB0-F3ADB03E5E03}gajismk_detil', 256),
	(2, '{3C64794E-EF73-47B1-9AB0-F3ADB03E5E03}gajismp', 256),
	(2, '{3C64794E-EF73-47B1-9AB0-F3ADB03E5E03}gajismp_detil', 256),
	(2, '{3C64794E-EF73-47B1-9AB0-F3ADB03E5E03}gajitk', 256),
	(2, '{3C64794E-EF73-47B1-9AB0-F3ADB03E5E03}gajitk_detil', 256),
	(2, '{3C64794E-EF73-47B1-9AB0-F3ADB03E5E03}gajitunjangan', 256),
	(2, '{3C64794E-EF73-47B1-9AB0-F3ADB03E5E03}gaji_karyawan_sd', 256),
	(2, '{3C64794E-EF73-47B1-9AB0-F3ADB03E5E03}gaji_karyawan_sma', 256),
	(2, '{3C64794E-EF73-47B1-9AB0-F3ADB03E5E03}gaji_karyawan_smk', 256),
	(2, '{3C64794E-EF73-47B1-9AB0-F3ADB03E5E03}gaji_karyawan_smp', 256),
	(2, '{3C64794E-EF73-47B1-9AB0-F3ADB03E5E03}gaji_karyawan_tk', 256),
	(2, '{3C64794E-EF73-47B1-9AB0-F3ADB03E5E03}gaji_pokok', 256),
	(2, '{3C64794E-EF73-47B1-9AB0-F3ADB03E5E03}gaji_pokok_kayawan', 256),
	(2, '{3C64794E-EF73-47B1-9AB0-F3ADB03E5E03}gaji_pokok_tu', 256),
	(2, '{3C64794E-EF73-47B1-9AB0-F3ADB03E5E03}gaji_sma', 256),
	(2, '{3C64794E-EF73-47B1-9AB0-F3ADB03E5E03}gaji_smk', 256),
	(2, '{3C64794E-EF73-47B1-9AB0-F3ADB03E5E03}gaji_smp', 256),
	(2, '{3C64794E-EF73-47B1-9AB0-F3ADB03E5E03}gaji_tk', 256),
	(2, '{3C64794E-EF73-47B1-9AB0-F3ADB03E5E03}gaji_tu_sd', 256),
	(2, '{3C64794E-EF73-47B1-9AB0-F3ADB03E5E03}gaji_tu_sma', 256),
	(2, '{3C64794E-EF73-47B1-9AB0-F3ADB03E5E03}gaji_tu_smk', 256),
	(2, '{3C64794E-EF73-47B1-9AB0-F3ADB03E5E03}gaji_tu_smp', 256),
	(2, '{3C64794E-EF73-47B1-9AB0-F3ADB03E5E03}gaji_tu_tk', 256),
	(2, '{3C64794E-EF73-47B1-9AB0-F3ADB03E5E03}gender', 256),
	(2, '{3C64794E-EF73-47B1-9AB0-F3ADB03E5E03}hapus_barang', 256),
	(2, '{3C64794E-EF73-47B1-9AB0-F3ADB03E5E03}hapus_barangnew', 256),
	(2, '{3C64794E-EF73-47B1-9AB0-F3ADB03E5E03}home.php', 495),
	(2, '{3C64794E-EF73-47B1-9AB0-F3ADB03E5E03}ijazah', 256),
	(2, '{3C64794E-EF73-47B1-9AB0-F3ADB03E5E03}ijin', 256),
	(2, '{3C64794E-EF73-47B1-9AB0-F3ADB03E5E03}jabatan', 256),
	(2, '{3C64794E-EF73-47B1-9AB0-F3ADB03E5E03}jenis_barang', 256),
	(2, '{3C64794E-EF73-47B1-9AB0-F3ADB03E5E03}jenis_dinasluar', 256),
	(2, '{3C64794E-EF73-47B1-9AB0-F3ADB03E5E03}jenis_grup_berita', 256),
	(2, '{3C64794E-EF73-47B1-9AB0-F3ADB03E5E03}jenis_grup_ilmu', 256),
	(2, '{3C64794E-EF73-47B1-9AB0-F3ADB03E5E03}jenis_ijin', 256),
	(2, '{3C64794E-EF73-47B1-9AB0-F3ADB03E5E03}jenis_jabatan', 256),
	(2, '{3C64794E-EF73-47B1-9AB0-F3ADB03E5E03}jenis_lembur', 256),
	(2, '{3C64794E-EF73-47B1-9AB0-F3ADB03E5E03}komentar', 256),
	(2, '{3C64794E-EF73-47B1-9AB0-F3ADB03E5E03}lembur', 256),
	(2, '{3C64794E-EF73-47B1-9AB0-F3ADB03E5E03}login_pegawai.php', 0),
	(2, '{3C64794E-EF73-47B1-9AB0-F3ADB03E5E03}mpendidikan', 256),
	(2, '{3C64794E-EF73-47B1-9AB0-F3ADB03E5E03}m_bpjs', 256),
	(2, '{3C64794E-EF73-47B1-9AB0-F3ADB03E5E03}m_inval', 256),
	(2, '{3C64794E-EF73-47B1-9AB0-F3ADB03E5E03}m_jp_pegawai', 0),
	(2, '{3C64794E-EF73-47B1-9AB0-F3ADB03E5E03}m_karyawan_sd', 256),
	(2, '{3C64794E-EF73-47B1-9AB0-F3ADB03E5E03}m_karyawan_sma', 256),
	(2, '{3C64794E-EF73-47B1-9AB0-F3ADB03E5E03}m_karyawan_smk', 256),
	(2, '{3C64794E-EF73-47B1-9AB0-F3ADB03E5E03}m_karyawan_smp', 256),
	(2, '{3C64794E-EF73-47B1-9AB0-F3ADB03E5E03}m_karyawan_tk', 256),
	(2, '{3C64794E-EF73-47B1-9AB0-F3ADB03E5E03}m_kehadiran', 256),
	(2, '{3C64794E-EF73-47B1-9AB0-F3ADB03E5E03}m_lembur', 256),
	(2, '{3C64794E-EF73-47B1-9AB0-F3ADB03E5E03}m_penyesuaian', 256),
	(2, '{3C64794E-EF73-47B1-9AB0-F3ADB03E5E03}m_piket', 256),
	(2, '{3C64794E-EF73-47B1-9AB0-F3ADB03E5E03}m_potongan', 256),
	(2, '{3C64794E-EF73-47B1-9AB0-F3ADB03E5E03}m_potongan_sd', 256),
	(2, '{3C64794E-EF73-47B1-9AB0-F3ADB03E5E03}m_potongan_sma', 256),
	(2, '{3C64794E-EF73-47B1-9AB0-F3ADB03E5E03}m_potongan_smk', 256),
	(2, '{3C64794E-EF73-47B1-9AB0-F3ADB03E5E03}m_potongan_smp', 256),
	(2, '{3C64794E-EF73-47B1-9AB0-F3ADB03E5E03}m_pulangcepat', 256),
	(2, '{3C64794E-EF73-47B1-9AB0-F3ADB03E5E03}m_sakit', 256),
	(2, '{3C64794E-EF73-47B1-9AB0-F3ADB03E5E03}m_sd', 256),
	(2, '{3C64794E-EF73-47B1-9AB0-F3ADB03E5E03}m_sma', 256),
	(2, '{3C64794E-EF73-47B1-9AB0-F3ADB03E5E03}m_smk', 256),
	(2, '{3C64794E-EF73-47B1-9AB0-F3ADB03E5E03}m_smp', 256),
	(2, '{3C64794E-EF73-47B1-9AB0-F3ADB03E5E03}m_tahun', 256),
	(2, '{3C64794E-EF73-47B1-9AB0-F3ADB03E5E03}m_tidakhadir', 256),
	(2, '{3C64794E-EF73-47B1-9AB0-F3ADB03E5E03}m_tk', 256),
	(2, '{3C64794E-EF73-47B1-9AB0-F3ADB03E5E03}m_tu_sd', 256),
	(2, '{3C64794E-EF73-47B1-9AB0-F3ADB03E5E03}m_tu_sma', 256),
	(2, '{3C64794E-EF73-47B1-9AB0-F3ADB03E5E03}m_tu_smk', 256),
	(2, '{3C64794E-EF73-47B1-9AB0-F3ADB03E5E03}m_tu_smp', 256),
	(2, '{3C64794E-EF73-47B1-9AB0-F3ADB03E5E03}m_tu_tk', 256),
	(2, '{3C64794E-EF73-47B1-9AB0-F3ADB03E5E03}m_yayasan', 0),
	(2, '{3C64794E-EF73-47B1-9AB0-F3ADB03E5E03}payrols.php', 256),
	(2, '{3C64794E-EF73-47B1-9AB0-F3ADB03E5E03}pegawai', 256),
	(2, '{3C64794E-EF73-47B1-9AB0-F3ADB03E5E03}peg_dokumen', 256),
	(2, '{3C64794E-EF73-47B1-9AB0-F3ADB03E5E03}peg_keluarga', 256),
	(2, '{3C64794E-EF73-47B1-9AB0-F3ADB03E5E03}peg_skill', 256),
	(2, '{3C64794E-EF73-47B1-9AB0-F3ADB03E5E03}penempatan', 256),
	(2, '{3C64794E-EF73-47B1-9AB0-F3ADB03E5E03}pengetahuan', 256),
	(2, '{3C64794E-EF73-47B1-9AB0-F3ADB03E5E03}penyesuaian', 256),
	(2, '{3C64794E-EF73-47B1-9AB0-F3ADB03E5E03}potongan_sd', 256),
	(2, '{3C64794E-EF73-47B1-9AB0-F3ADB03E5E03}potongan_sma', 256),
	(2, '{3C64794E-EF73-47B1-9AB0-F3ADB03E5E03}potongan_smk', 256),
	(2, '{3C64794E-EF73-47B1-9AB0-F3ADB03E5E03}potongan_smp', 256),
	(2, '{3C64794E-EF73-47B1-9AB0-F3ADB03E5E03}potongan_tk', 256),
	(2, '{3C64794E-EF73-47B1-9AB0-F3ADB03E5E03}proyek', 256),
	(2, '{3C64794E-EF73-47B1-9AB0-F3ADB03E5E03}reimbursh', 256),
	(2, '{3C64794E-EF73-47B1-9AB0-F3ADB03E5E03}sertif', 256),
	(2, '{3C64794E-EF73-47B1-9AB0-F3ADB03E5E03}setuju', 256),
	(2, '{3C64794E-EF73-47B1-9AB0-F3ADB03E5E03}set_password', 495),
	(2, '{3C64794E-EF73-47B1-9AB0-F3ADB03E5E03}status_kepeg', 256),
	(2, '{3C64794E-EF73-47B1-9AB0-F3ADB03E5E03}tambahan_tugas', 256),
	(2, '{3C64794E-EF73-47B1-9AB0-F3ADB03E5E03}terlambat', 256),
	(2, '{3C64794E-EF73-47B1-9AB0-F3ADB03E5E03}testtable', 256),
	(2, '{3C64794E-EF73-47B1-9AB0-F3ADB03E5E03}test_api.php', 256),
	(2, '{3C64794E-EF73-47B1-9AB0-F3ADB03E5E03}totalgaji', 256),
	(2, '{3C64794E-EF73-47B1-9AB0-F3ADB03E5E03}tpendidikan', 256),
	(2, '{3C64794E-EF73-47B1-9AB0-F3ADB03E5E03}tunjangan_berkala', 256),
	(2, '{3C64794E-EF73-47B1-9AB0-F3ADB03E5E03}tunjangan_tambahan', 256),
	(2, '{3C64794E-EF73-47B1-9AB0-F3ADB03E5E03}uangmuka', 256),
	(2, '{3C64794E-EF73-47B1-9AB0-F3ADB03E5E03}userlevelpermissions', 256),
	(2, '{3C64794E-EF73-47B1-9AB0-F3ADB03E5E03}userlevels', 256),
	(2, '{3C64794E-EF73-47B1-9AB0-F3ADB03E5E03}v_gajisd', 256),
	(2, '{3C64794E-EF73-47B1-9AB0-F3ADB03E5E03}v_gajisma', 256),
	(2, '{3C64794E-EF73-47B1-9AB0-F3ADB03E5E03}v_gaji_guru_smk', 256),
	(2, '{3C64794E-EF73-47B1-9AB0-F3ADB03E5E03}v_gaji_karyawan_sd', 256),
	(2, '{3C64794E-EF73-47B1-9AB0-F3ADB03E5E03}v_gaji_karyawan_sma', 256),
	(2, '{3C64794E-EF73-47B1-9AB0-F3ADB03E5E03}v_gaji_karyawan_smk', 256),
	(2, '{3C64794E-EF73-47B1-9AB0-F3ADB03E5E03}v_gaji_karyawan_smp', 256),
	(2, '{3C64794E-EF73-47B1-9AB0-F3ADB03E5E03}v_gaji_karyawan_tk', 256),
	(2, '{3C64794E-EF73-47B1-9AB0-F3ADB03E5E03}v_gaji_smp', 256),
	(2, '{3C64794E-EF73-47B1-9AB0-F3ADB03E5E03}v_gaji_tk', 256),
	(2, '{3C64794E-EF73-47B1-9AB0-F3ADB03E5E03}v_gaji_tu_sd', 256),
	(2, '{3C64794E-EF73-47B1-9AB0-F3ADB03E5E03}v_gaji_tu_sma', 256),
	(2, '{3C64794E-EF73-47B1-9AB0-F3ADB03E5E03}v_gaji_tu_smk', 256),
	(2, '{3C64794E-EF73-47B1-9AB0-F3ADB03E5E03}v_gaji_tu_smp', 256),
	(2, '{3C64794E-EF73-47B1-9AB0-F3ADB03E5E03}v_gaji_tu_tk', 256),
	(2, '{3C64794E-EF73-47B1-9AB0-F3ADB03E5E03}v_karyawan_sd', 256),
	(2, '{3C64794E-EF73-47B1-9AB0-F3ADB03E5E03}v_karyawan_sma', 256),
	(2, '{3C64794E-EF73-47B1-9AB0-F3ADB03E5E03}v_karyawan_smk', 256),
	(2, '{3C64794E-EF73-47B1-9AB0-F3ADB03E5E03}v_karyawan_smp', 256),
	(2, '{3C64794E-EF73-47B1-9AB0-F3ADB03E5E03}v_karyawan_tk', 256),
	(2, '{3C64794E-EF73-47B1-9AB0-F3ADB03E5E03}v_m_sd', 256),
	(2, '{3C64794E-EF73-47B1-9AB0-F3ADB03E5E03}v_m_sma', 256),
	(2, '{3C64794E-EF73-47B1-9AB0-F3ADB03E5E03}v_m_smk', 256),
	(2, '{3C64794E-EF73-47B1-9AB0-F3ADB03E5E03}v_m_smp', 256),
	(2, '{3C64794E-EF73-47B1-9AB0-F3ADB03E5E03}v_m_tk', 256),
	(2, '{3C64794E-EF73-47B1-9AB0-F3ADB03E5E03}v_pegawai_sd', 0),
	(2, '{3C64794E-EF73-47B1-9AB0-F3ADB03E5E03}v_pegawai_sma', 495),
	(2, '{3C64794E-EF73-47B1-9AB0-F3ADB03E5E03}v_pegawai_smk', 495),
	(2, '{3C64794E-EF73-47B1-9AB0-F3ADB03E5E03}v_pegawai_smp', 495),
	(2, '{3C64794E-EF73-47B1-9AB0-F3ADB03E5E03}v_pegawai_tk', 495),
	(2, '{3C64794E-EF73-47B1-9AB0-F3ADB03E5E03}v_pengurus_yayasan', 511),
	(2, '{3C64794E-EF73-47B1-9AB0-F3ADB03E5E03}v_totalgaji', 256),
	(2, '{3C64794E-EF73-47B1-9AB0-F3ADB03E5E03}v_totalgajikaryawan', 256),
	(2, '{3C64794E-EF73-47B1-9AB0-F3ADB03E5E03}v_totalgajikaryawansma', 256),
	(2, '{3C64794E-EF73-47B1-9AB0-F3ADB03E5E03}v_totalgajikaryawansmk', 256),
	(2, '{3C64794E-EF73-47B1-9AB0-F3ADB03E5E03}v_totalgajikaryawansmp', 256),
	(2, '{3C64794E-EF73-47B1-9AB0-F3ADB03E5E03}v_totalgajikaryawantk', 256),
	(2, '{3C64794E-EF73-47B1-9AB0-F3ADB03E5E03}v_totalgajisma', 256),
	(2, '{3C64794E-EF73-47B1-9AB0-F3ADB03E5E03}v_totalgajismk', 256),
	(2, '{3C64794E-EF73-47B1-9AB0-F3ADB03E5E03}v_totalgajismp', 256),
	(2, '{3C64794E-EF73-47B1-9AB0-F3ADB03E5E03}v_totalgajitk', 256),
	(2, '{3C64794E-EF73-47B1-9AB0-F3ADB03E5E03}v_totalgajitu', 256),
	(2, '{3C64794E-EF73-47B1-9AB0-F3ADB03E5E03}v_totalgajitusma', 256),
	(2, '{3C64794E-EF73-47B1-9AB0-F3ADB03E5E03}v_totalgajitusmk', 256),
	(2, '{3C64794E-EF73-47B1-9AB0-F3ADB03E5E03}v_totalgajitusmp', 256),
	(2, '{3C64794E-EF73-47B1-9AB0-F3ADB03E5E03}v_totalgajitutk', 256),
	(2, '{3C64794E-EF73-47B1-9AB0-F3ADB03E5E03}v_tu_sd', 256),
	(2, '{3C64794E-EF73-47B1-9AB0-F3ADB03E5E03}v_tu_sma', 256),
	(2, '{3C64794E-EF73-47B1-9AB0-F3ADB03E5E03}v_tu_smk', 256),
	(2, '{3C64794E-EF73-47B1-9AB0-F3ADB03E5E03}v_tu_smp', 256),
	(2, '{3C64794E-EF73-47B1-9AB0-F3ADB03E5E03}v_tu_tk', 256),
	(2, '{FB7F1C69-BEAA-490D-AA3A-561A2CBD209C}absen', 0),
	(2, '{FB7F1C69-BEAA-490D-AA3A-561A2CBD209C}absen_detil', 0),
	(2, '{FB7F1C69-BEAA-490D-AA3A-561A2CBD209C}audittrail', 0),
	(2, '{FB7F1C69-BEAA-490D-AA3A-561A2CBD209C}berita', 0),
	(2, '{FB7F1C69-BEAA-490D-AA3A-561A2CBD209C}daftarbarang', 111),
	(2, '{FB7F1C69-BEAA-490D-AA3A-561A2CBD209C}dinasluar', 108),
	(2, '{FB7F1C69-BEAA-490D-AA3A-561A2CBD209C}ijin', 108),
	(2, '{FB7F1C69-BEAA-490D-AA3A-561A2CBD209C}jabatan', 0),
	(2, '{FB7F1C69-BEAA-490D-AA3A-561A2CBD209C}jenis_barang', 111),
	(2, '{FB7F1C69-BEAA-490D-AA3A-561A2CBD209C}jenis_dinasluar', 0),
	(2, '{FB7F1C69-BEAA-490D-AA3A-561A2CBD209C}jenis_grup_berita', 0),
	(2, '{FB7F1C69-BEAA-490D-AA3A-561A2CBD209C}jenis_grup_ilmu', 0),
	(2, '{FB7F1C69-BEAA-490D-AA3A-561A2CBD209C}jenis_ijin', 0),
	(2, '{FB7F1C69-BEAA-490D-AA3A-561A2CBD209C}jenis_lembur', 0),
	(2, '{FB7F1C69-BEAA-490D-AA3A-561A2CBD209C}komentar', 0),
	(2, '{FB7F1C69-BEAA-490D-AA3A-561A2CBD209C}lembur', 104),
	(2, '{FB7F1C69-BEAA-490D-AA3A-561A2CBD209C}pegawai', 0),
	(2, '{FB7F1C69-BEAA-490D-AA3A-561A2CBD209C}peg_dokumen', 0),
	(2, '{FB7F1C69-BEAA-490D-AA3A-561A2CBD209C}peg_keluarga', 0),
	(2, '{FB7F1C69-BEAA-490D-AA3A-561A2CBD209C}peg_skill', 0),
	(2, '{FB7F1C69-BEAA-490D-AA3A-561A2CBD209C}penempatan', 0),
	(2, '{FB7F1C69-BEAA-490D-AA3A-561A2CBD209C}pengetahuan', 0),
	(2, '{FB7F1C69-BEAA-490D-AA3A-561A2CBD209C}proyek', 0),
	(2, '{FB7F1C69-BEAA-490D-AA3A-561A2CBD209C}reimbursh', 108),
	(2, '{FB7F1C69-BEAA-490D-AA3A-561A2CBD209C}uangmuka', 108),
	(2, '{FB7F1C69-BEAA-490D-AA3A-561A2CBD209C}userlevelpermissions', 0),
	(2, '{FB7F1C69-BEAA-490D-AA3A-561A2CBD209C}userlevels', 0),
	(2, '{FB7F1C69-BEAA-490D-AA3A-561A2CBD209C}v_admin', 0),
	(2, '{FB7F1C69-BEAA-490D-AA3A-561A2CBD209C}v_pm', 0),
	(3, '{3C64794E-EF73-47B1-9AB0-F3ADB03E5E03}absen', 256),
	(3, '{3C64794E-EF73-47B1-9AB0-F3ADB03E5E03}absen_detil', 256),
	(3, '{3C64794E-EF73-47B1-9AB0-F3ADB03E5E03}agama', 256),
	(3, '{3C64794E-EF73-47B1-9AB0-F3ADB03E5E03}audittrail', 256),
	(3, '{3C64794E-EF73-47B1-9AB0-F3ADB03E5E03}barang', 256),
	(3, '{3C64794E-EF73-47B1-9AB0-F3ADB03E5E03}barangnew', 256),
	(3, '{3C64794E-EF73-47B1-9AB0-F3ADB03E5E03}berita', 256),
	(3, '{3C64794E-EF73-47B1-9AB0-F3ADB03E5E03}bulan', 256),
	(3, '{3C64794E-EF73-47B1-9AB0-F3ADB03E5E03}custom_file.php', 483),
	(3, '{3C64794E-EF73-47B1-9AB0-F3ADB03E5E03}daftarbarang', 256),
	(3, '{3C64794E-EF73-47B1-9AB0-F3ADB03E5E03}dinasluar', 256),
	(3, '{3C64794E-EF73-47B1-9AB0-F3ADB03E5E03}gaji', 256),
	(3, '{3C64794E-EF73-47B1-9AB0-F3ADB03E5E03}gajisd', 256),
	(3, '{3C64794E-EF73-47B1-9AB0-F3ADB03E5E03}gajisd_detil', 256),
	(3, '{3C64794E-EF73-47B1-9AB0-F3ADB03E5E03}gajisma', 256),
	(3, '{3C64794E-EF73-47B1-9AB0-F3ADB03E5E03}gajisma_detil', 256),
	(3, '{3C64794E-EF73-47B1-9AB0-F3ADB03E5E03}gajismk', 256),
	(3, '{3C64794E-EF73-47B1-9AB0-F3ADB03E5E03}gajismk_detil', 256),
	(3, '{3C64794E-EF73-47B1-9AB0-F3ADB03E5E03}gajismp', 256),
	(3, '{3C64794E-EF73-47B1-9AB0-F3ADB03E5E03}gajismp_detil', 256),
	(3, '{3C64794E-EF73-47B1-9AB0-F3ADB03E5E03}gajitk', 256),
	(3, '{3C64794E-EF73-47B1-9AB0-F3ADB03E5E03}gajitk_detil', 256),
	(3, '{3C64794E-EF73-47B1-9AB0-F3ADB03E5E03}gajitunjangan', 256),
	(3, '{3C64794E-EF73-47B1-9AB0-F3ADB03E5E03}gaji_karyawan_sd', 256),
	(3, '{3C64794E-EF73-47B1-9AB0-F3ADB03E5E03}gaji_karyawan_sma', 256),
	(3, '{3C64794E-EF73-47B1-9AB0-F3ADB03E5E03}gaji_karyawan_smk', 256),
	(3, '{3C64794E-EF73-47B1-9AB0-F3ADB03E5E03}gaji_karyawan_smp', 256),
	(3, '{3C64794E-EF73-47B1-9AB0-F3ADB03E5E03}gaji_karyawan_tk', 256),
	(3, '{3C64794E-EF73-47B1-9AB0-F3ADB03E5E03}gaji_pokok', 256),
	(3, '{3C64794E-EF73-47B1-9AB0-F3ADB03E5E03}gaji_pokok_kayawan', 256),
	(3, '{3C64794E-EF73-47B1-9AB0-F3ADB03E5E03}gaji_pokok_tu', 256),
	(3, '{3C64794E-EF73-47B1-9AB0-F3ADB03E5E03}gaji_sma', 256),
	(3, '{3C64794E-EF73-47B1-9AB0-F3ADB03E5E03}gaji_smk', 256),
	(3, '{3C64794E-EF73-47B1-9AB0-F3ADB03E5E03}gaji_smp', 256),
	(3, '{3C64794E-EF73-47B1-9AB0-F3ADB03E5E03}gaji_tk', 256),
	(3, '{3C64794E-EF73-47B1-9AB0-F3ADB03E5E03}gaji_tu_sd', 256),
	(3, '{3C64794E-EF73-47B1-9AB0-F3ADB03E5E03}gaji_tu_sma', 256),
	(3, '{3C64794E-EF73-47B1-9AB0-F3ADB03E5E03}gaji_tu_smk', 256),
	(3, '{3C64794E-EF73-47B1-9AB0-F3ADB03E5E03}gaji_tu_smp', 256),
	(3, '{3C64794E-EF73-47B1-9AB0-F3ADB03E5E03}gaji_tu_tk', 256),
	(3, '{3C64794E-EF73-47B1-9AB0-F3ADB03E5E03}gender', 256),
	(3, '{3C64794E-EF73-47B1-9AB0-F3ADB03E5E03}hapus_barang', 256),
	(3, '{3C64794E-EF73-47B1-9AB0-F3ADB03E5E03}hapus_barangnew', 256),
	(3, '{3C64794E-EF73-47B1-9AB0-F3ADB03E5E03}home.php', 511),
	(3, '{3C64794E-EF73-47B1-9AB0-F3ADB03E5E03}ijazah', 256),
	(3, '{3C64794E-EF73-47B1-9AB0-F3ADB03E5E03}ijin', 256),
	(3, '{3C64794E-EF73-47B1-9AB0-F3ADB03E5E03}jabatan', 256),
	(3, '{3C64794E-EF73-47B1-9AB0-F3ADB03E5E03}jenis_barang', 256),
	(3, '{3C64794E-EF73-47B1-9AB0-F3ADB03E5E03}jenis_dinasluar', 256),
	(3, '{3C64794E-EF73-47B1-9AB0-F3ADB03E5E03}jenis_grup_berita', 256),
	(3, '{3C64794E-EF73-47B1-9AB0-F3ADB03E5E03}jenis_grup_ilmu', 256),
	(3, '{3C64794E-EF73-47B1-9AB0-F3ADB03E5E03}jenis_ijin', 256),
	(3, '{3C64794E-EF73-47B1-9AB0-F3ADB03E5E03}jenis_jabatan', 256),
	(3, '{3C64794E-EF73-47B1-9AB0-F3ADB03E5E03}jenis_lembur', 256),
	(3, '{3C64794E-EF73-47B1-9AB0-F3ADB03E5E03}komentar', 256),
	(3, '{3C64794E-EF73-47B1-9AB0-F3ADB03E5E03}lembur', 256),
	(3, '{3C64794E-EF73-47B1-9AB0-F3ADB03E5E03}mpendidikan', 256),
	(3, '{3C64794E-EF73-47B1-9AB0-F3ADB03E5E03}m_bpjs', 256),
	(3, '{3C64794E-EF73-47B1-9AB0-F3ADB03E5E03}m_inval', 256),
	(3, '{3C64794E-EF73-47B1-9AB0-F3ADB03E5E03}m_karyawan_sd', 256),
	(3, '{3C64794E-EF73-47B1-9AB0-F3ADB03E5E03}m_karyawan_sma', 256),
	(3, '{3C64794E-EF73-47B1-9AB0-F3ADB03E5E03}m_karyawan_smk', 256),
	(3, '{3C64794E-EF73-47B1-9AB0-F3ADB03E5E03}m_karyawan_smp', 256),
	(3, '{3C64794E-EF73-47B1-9AB0-F3ADB03E5E03}m_karyawan_tk', 256),
	(3, '{3C64794E-EF73-47B1-9AB0-F3ADB03E5E03}m_kehadiran', 256),
	(3, '{3C64794E-EF73-47B1-9AB0-F3ADB03E5E03}m_lembur', 256),
	(3, '{3C64794E-EF73-47B1-9AB0-F3ADB03E5E03}m_penyesuaian', 486),
	(3, '{3C64794E-EF73-47B1-9AB0-F3ADB03E5E03}m_piket', 256),
	(3, '{3C64794E-EF73-47B1-9AB0-F3ADB03E5E03}m_potongan', 256),
	(3, '{3C64794E-EF73-47B1-9AB0-F3ADB03E5E03}m_potongan_sd', 256),
	(3, '{3C64794E-EF73-47B1-9AB0-F3ADB03E5E03}m_potongan_sma', 256),
	(3, '{3C64794E-EF73-47B1-9AB0-F3ADB03E5E03}m_potongan_smk', 256),
	(3, '{3C64794E-EF73-47B1-9AB0-F3ADB03E5E03}m_potongan_smp', 256),
	(3, '{3C64794E-EF73-47B1-9AB0-F3ADB03E5E03}m_pulangcepat', 256),
	(3, '{3C64794E-EF73-47B1-9AB0-F3ADB03E5E03}m_sakit', 256),
	(3, '{3C64794E-EF73-47B1-9AB0-F3ADB03E5E03}m_sd', 256),
	(3, '{3C64794E-EF73-47B1-9AB0-F3ADB03E5E03}m_sma', 256),
	(3, '{3C64794E-EF73-47B1-9AB0-F3ADB03E5E03}m_smk', 256),
	(3, '{3C64794E-EF73-47B1-9AB0-F3ADB03E5E03}m_smp', 256),
	(3, '{3C64794E-EF73-47B1-9AB0-F3ADB03E5E03}m_tahun', 256),
	(3, '{3C64794E-EF73-47B1-9AB0-F3ADB03E5E03}m_tidakhadir', 256),
	(3, '{3C64794E-EF73-47B1-9AB0-F3ADB03E5E03}m_tk', 256),
	(3, '{3C64794E-EF73-47B1-9AB0-F3ADB03E5E03}m_tu_sd', 256),
	(3, '{3C64794E-EF73-47B1-9AB0-F3ADB03E5E03}m_tu_sma', 256),
	(3, '{3C64794E-EF73-47B1-9AB0-F3ADB03E5E03}m_tu_smk', 256),
	(3, '{3C64794E-EF73-47B1-9AB0-F3ADB03E5E03}m_tu_smp', 256),
	(3, '{3C64794E-EF73-47B1-9AB0-F3ADB03E5E03}m_tu_tk', 256),
	(3, '{3C64794E-EF73-47B1-9AB0-F3ADB03E5E03}m_yayasan', 495),
	(3, '{3C64794E-EF73-47B1-9AB0-F3ADB03E5E03}payrols.php', 495),
	(3, '{3C64794E-EF73-47B1-9AB0-F3ADB03E5E03}pegawai', 256),
	(3, '{3C64794E-EF73-47B1-9AB0-F3ADB03E5E03}peg_dokumen', 256),
	(3, '{3C64794E-EF73-47B1-9AB0-F3ADB03E5E03}peg_keluarga', 256),
	(3, '{3C64794E-EF73-47B1-9AB0-F3ADB03E5E03}peg_skill', 256),
	(3, '{3C64794E-EF73-47B1-9AB0-F3ADB03E5E03}penempatan', 256),
	(3, '{3C64794E-EF73-47B1-9AB0-F3ADB03E5E03}pengetahuan', 256),
	(3, '{3C64794E-EF73-47B1-9AB0-F3ADB03E5E03}penyesuaian', 486),
	(3, '{3C64794E-EF73-47B1-9AB0-F3ADB03E5E03}potongan_sd', 256),
	(3, '{3C64794E-EF73-47B1-9AB0-F3ADB03E5E03}potongan_sma', 256),
	(3, '{3C64794E-EF73-47B1-9AB0-F3ADB03E5E03}potongan_smk', 256),
	(3, '{3C64794E-EF73-47B1-9AB0-F3ADB03E5E03}potongan_smp', 256),
	(3, '{3C64794E-EF73-47B1-9AB0-F3ADB03E5E03}potongan_tk', 256),
	(3, '{3C64794E-EF73-47B1-9AB0-F3ADB03E5E03}proyek', 256),
	(3, '{3C64794E-EF73-47B1-9AB0-F3ADB03E5E03}reimbursh', 256),
	(3, '{3C64794E-EF73-47B1-9AB0-F3ADB03E5E03}sertif', 256),
	(3, '{3C64794E-EF73-47B1-9AB0-F3ADB03E5E03}setuju', 256),
	(3, '{3C64794E-EF73-47B1-9AB0-F3ADB03E5E03}set_password', 495),
	(3, '{3C64794E-EF73-47B1-9AB0-F3ADB03E5E03}status_kepeg', 256),
	(3, '{3C64794E-EF73-47B1-9AB0-F3ADB03E5E03}tambahan_tugas', 256),
	(3, '{3C64794E-EF73-47B1-9AB0-F3ADB03E5E03}terlambat', 256),
	(3, '{3C64794E-EF73-47B1-9AB0-F3ADB03E5E03}testtable', 256),
	(3, '{3C64794E-EF73-47B1-9AB0-F3ADB03E5E03}test_api.php', 256),
	(3, '{3C64794E-EF73-47B1-9AB0-F3ADB03E5E03}totalgaji', 256),
	(3, '{3C64794E-EF73-47B1-9AB0-F3ADB03E5E03}tpendidikan', 256),
	(3, '{3C64794E-EF73-47B1-9AB0-F3ADB03E5E03}tunjangan_berkala', 256),
	(3, '{3C64794E-EF73-47B1-9AB0-F3ADB03E5E03}tunjangan_tambahan', 256),
	(3, '{3C64794E-EF73-47B1-9AB0-F3ADB03E5E03}uangmuka', 256),
	(3, '{3C64794E-EF73-47B1-9AB0-F3ADB03E5E03}userlevelpermissions', 256),
	(3, '{3C64794E-EF73-47B1-9AB0-F3ADB03E5E03}userlevels', 256),
	(3, '{3C64794E-EF73-47B1-9AB0-F3ADB03E5E03}vgaji_guru_sd', 495),
	(3, '{3C64794E-EF73-47B1-9AB0-F3ADB03E5E03}vgaji_guru_sma', 495),
	(3, '{3C64794E-EF73-47B1-9AB0-F3ADB03E5E03}vgaji_guru_smk', 495),
	(3, '{3C64794E-EF73-47B1-9AB0-F3ADB03E5E03}vgaji_guru_smp', 495),
	(3, '{3C64794E-EF73-47B1-9AB0-F3ADB03E5E03}vgaji_guru_tk', 495),
	(3, '{3C64794E-EF73-47B1-9AB0-F3ADB03E5E03}vgaji_karyawan_sd', 495),
	(3, '{3C64794E-EF73-47B1-9AB0-F3ADB03E5E03}vgaji_karyawan_sma', 495),
	(3, '{3C64794E-EF73-47B1-9AB0-F3ADB03E5E03}vgaji_karyawan_smk', 495),
	(3, '{3C64794E-EF73-47B1-9AB0-F3ADB03E5E03}vgaji_karyawan_smp', 495),
	(3, '{3C64794E-EF73-47B1-9AB0-F3ADB03E5E03}vgaji_karyawan_tk', 495),
	(3, '{3C64794E-EF73-47B1-9AB0-F3ADB03E5E03}vgaji_tu_sd', 495),
	(3, '{3C64794E-EF73-47B1-9AB0-F3ADB03E5E03}vgaji_tu_sma', 495),
	(3, '{3C64794E-EF73-47B1-9AB0-F3ADB03E5E03}vgaji_tu_smk', 495),
	(3, '{3C64794E-EF73-47B1-9AB0-F3ADB03E5E03}vgaji_tu_smp', 495),
	(3, '{3C64794E-EF73-47B1-9AB0-F3ADB03E5E03}vgaji_tu_tk', 495),
	(3, '{3C64794E-EF73-47B1-9AB0-F3ADB03E5E03}v_gajisd', 256),
	(3, '{3C64794E-EF73-47B1-9AB0-F3ADB03E5E03}v_gajisma', 256),
	(3, '{3C64794E-EF73-47B1-9AB0-F3ADB03E5E03}v_gaji_guru_smk', 256),
	(3, '{3C64794E-EF73-47B1-9AB0-F3ADB03E5E03}v_gaji_karyawan_sd', 256),
	(3, '{3C64794E-EF73-47B1-9AB0-F3ADB03E5E03}v_gaji_karyawan_sma', 256),
	(3, '{3C64794E-EF73-47B1-9AB0-F3ADB03E5E03}v_gaji_karyawan_smk', 256),
	(3, '{3C64794E-EF73-47B1-9AB0-F3ADB03E5E03}v_gaji_karyawan_smp', 256),
	(3, '{3C64794E-EF73-47B1-9AB0-F3ADB03E5E03}v_gaji_karyawan_tk', 256),
	(3, '{3C64794E-EF73-47B1-9AB0-F3ADB03E5E03}v_gaji_smp', 256),
	(3, '{3C64794E-EF73-47B1-9AB0-F3ADB03E5E03}v_gaji_tk', 256),
	(3, '{3C64794E-EF73-47B1-9AB0-F3ADB03E5E03}v_gaji_tu_sd', 256),
	(3, '{3C64794E-EF73-47B1-9AB0-F3ADB03E5E03}v_gaji_tu_sma', 256),
	(3, '{3C64794E-EF73-47B1-9AB0-F3ADB03E5E03}v_gaji_tu_smk', 256),
	(3, '{3C64794E-EF73-47B1-9AB0-F3ADB03E5E03}v_gaji_tu_smp', 256),
	(3, '{3C64794E-EF73-47B1-9AB0-F3ADB03E5E03}v_gaji_tu_tk', 256),
	(3, '{3C64794E-EF73-47B1-9AB0-F3ADB03E5E03}v_karyawan_sd', 256),
	(3, '{3C64794E-EF73-47B1-9AB0-F3ADB03E5E03}v_karyawan_sma', 256),
	(3, '{3C64794E-EF73-47B1-9AB0-F3ADB03E5E03}v_karyawan_smk', 256),
	(3, '{3C64794E-EF73-47B1-9AB0-F3ADB03E5E03}v_karyawan_smp', 256),
	(3, '{3C64794E-EF73-47B1-9AB0-F3ADB03E5E03}v_karyawan_tk', 256),
	(3, '{3C64794E-EF73-47B1-9AB0-F3ADB03E5E03}v_m_sd', 256),
	(3, '{3C64794E-EF73-47B1-9AB0-F3ADB03E5E03}v_m_sma', 256),
	(3, '{3C64794E-EF73-47B1-9AB0-F3ADB03E5E03}v_m_smk', 256),
	(3, '{3C64794E-EF73-47B1-9AB0-F3ADB03E5E03}v_m_smp', 256),
	(3, '{3C64794E-EF73-47B1-9AB0-F3ADB03E5E03}v_m_tk', 256),
	(3, '{3C64794E-EF73-47B1-9AB0-F3ADB03E5E03}v_totalgaji', 256),
	(3, '{3C64794E-EF73-47B1-9AB0-F3ADB03E5E03}v_totalgajikaryawan', 256),
	(3, '{3C64794E-EF73-47B1-9AB0-F3ADB03E5E03}v_totalgajikaryawansma', 256),
	(3, '{3C64794E-EF73-47B1-9AB0-F3ADB03E5E03}v_totalgajikaryawansmk', 256),
	(3, '{3C64794E-EF73-47B1-9AB0-F3ADB03E5E03}v_totalgajikaryawansmp', 256),
	(3, '{3C64794E-EF73-47B1-9AB0-F3ADB03E5E03}v_totalgajikaryawantk', 256),
	(3, '{3C64794E-EF73-47B1-9AB0-F3ADB03E5E03}v_totalgajisma', 256),
	(3, '{3C64794E-EF73-47B1-9AB0-F3ADB03E5E03}v_totalgajismk', 256),
	(3, '{3C64794E-EF73-47B1-9AB0-F3ADB03E5E03}v_totalgajismp', 256),
	(3, '{3C64794E-EF73-47B1-9AB0-F3ADB03E5E03}v_totalgajitk', 256),
	(3, '{3C64794E-EF73-47B1-9AB0-F3ADB03E5E03}v_totalgajitu', 256),
	(3, '{3C64794E-EF73-47B1-9AB0-F3ADB03E5E03}v_totalgajitusma', 256),
	(3, '{3C64794E-EF73-47B1-9AB0-F3ADB03E5E03}v_totalgajitusmk', 256),
	(3, '{3C64794E-EF73-47B1-9AB0-F3ADB03E5E03}v_totalgajitusmp', 256),
	(3, '{3C64794E-EF73-47B1-9AB0-F3ADB03E5E03}v_totalgajitutk', 256),
	(3, '{3C64794E-EF73-47B1-9AB0-F3ADB03E5E03}v_tu_sd', 256),
	(3, '{3C64794E-EF73-47B1-9AB0-F3ADB03E5E03}v_tu_sma', 256),
	(3, '{3C64794E-EF73-47B1-9AB0-F3ADB03E5E03}v_tu_smk', 256),
	(3, '{3C64794E-EF73-47B1-9AB0-F3ADB03E5E03}v_tu_smp', 256),
	(3, '{3C64794E-EF73-47B1-9AB0-F3ADB03E5E03}v_tu_tk', 256),
	(3, '{3C64794E-EF73-47B1-9AB0-F3ADB03E5E03}v_yayasan', 495),
	(3, '{3C64794E-EF73-47B1-9AB0-F3ADB03E5E03}yayasan', 495),
	(4, '{3C64794E-EF73-47B1-9AB0-F3ADB03E5E03}absen', 495),
	(4, '{3C64794E-EF73-47B1-9AB0-F3ADB03E5E03}absen_detil', 495),
	(4, '{3C64794E-EF73-47B1-9AB0-F3ADB03E5E03}agama', 495),
	(4, '{3C64794E-EF73-47B1-9AB0-F3ADB03E5E03}audittrail', 495),
	(4, '{3C64794E-EF73-47B1-9AB0-F3ADB03E5E03}barang', 495),
	(4, '{3C64794E-EF73-47B1-9AB0-F3ADB03E5E03}barangnew', 495),
	(4, '{3C64794E-EF73-47B1-9AB0-F3ADB03E5E03}berita', 495),
	(4, '{3C64794E-EF73-47B1-9AB0-F3ADB03E5E03}bulan', 495),
	(4, '{3C64794E-EF73-47B1-9AB0-F3ADB03E5E03}daftarbarang', 495),
	(4, '{3C64794E-EF73-47B1-9AB0-F3ADB03E5E03}dinasluar', 495),
	(4, '{3C64794E-EF73-47B1-9AB0-F3ADB03E5E03}gaji', 495),
	(4, '{3C64794E-EF73-47B1-9AB0-F3ADB03E5E03}gajisd', 495),
	(4, '{3C64794E-EF73-47B1-9AB0-F3ADB03E5E03}gajisd_detil', 495),
	(4, '{3C64794E-EF73-47B1-9AB0-F3ADB03E5E03}gajisma', 495),
	(4, '{3C64794E-EF73-47B1-9AB0-F3ADB03E5E03}gajisma_detil', 495),
	(4, '{3C64794E-EF73-47B1-9AB0-F3ADB03E5E03}gajismk', 495),
	(4, '{3C64794E-EF73-47B1-9AB0-F3ADB03E5E03}gajismk_detil', 495),
	(4, '{3C64794E-EF73-47B1-9AB0-F3ADB03E5E03}gajismp', 495),
	(4, '{3C64794E-EF73-47B1-9AB0-F3ADB03E5E03}gajismp_detil', 495),
	(4, '{3C64794E-EF73-47B1-9AB0-F3ADB03E5E03}gajitk', 495),
	(4, '{3C64794E-EF73-47B1-9AB0-F3ADB03E5E03}gajitk_detil', 495),
	(4, '{3C64794E-EF73-47B1-9AB0-F3ADB03E5E03}gajitunjangan', 495),
	(4, '{3C64794E-EF73-47B1-9AB0-F3ADB03E5E03}gaji_karyawan_sd', 495),
	(4, '{3C64794E-EF73-47B1-9AB0-F3ADB03E5E03}gaji_karyawan_sma', 495),
	(4, '{3C64794E-EF73-47B1-9AB0-F3ADB03E5E03}gaji_karyawan_smk', 495),
	(4, '{3C64794E-EF73-47B1-9AB0-F3ADB03E5E03}gaji_karyawan_smp', 495),
	(4, '{3C64794E-EF73-47B1-9AB0-F3ADB03E5E03}gaji_karyawan_tk', 495),
	(4, '{3C64794E-EF73-47B1-9AB0-F3ADB03E5E03}gaji_pokok', 495),
	(4, '{3C64794E-EF73-47B1-9AB0-F3ADB03E5E03}gaji_pokok_tu', 495),
	(4, '{3C64794E-EF73-47B1-9AB0-F3ADB03E5E03}gaji_sma', 495),
	(4, '{3C64794E-EF73-47B1-9AB0-F3ADB03E5E03}gaji_smk', 495),
	(4, '{3C64794E-EF73-47B1-9AB0-F3ADB03E5E03}gaji_smp', 495),
	(4, '{3C64794E-EF73-47B1-9AB0-F3ADB03E5E03}gaji_tk', 495),
	(4, '{3C64794E-EF73-47B1-9AB0-F3ADB03E5E03}gaji_tu_sd', 495),
	(4, '{3C64794E-EF73-47B1-9AB0-F3ADB03E5E03}gaji_tu_sma', 495),
	(4, '{3C64794E-EF73-47B1-9AB0-F3ADB03E5E03}gaji_tu_smk', 495),
	(4, '{3C64794E-EF73-47B1-9AB0-F3ADB03E5E03}gaji_tu_smp', 495),
	(4, '{3C64794E-EF73-47B1-9AB0-F3ADB03E5E03}gaji_tu_tk', 495),
	(4, '{3C64794E-EF73-47B1-9AB0-F3ADB03E5E03}gender', 495),
	(4, '{3C64794E-EF73-47B1-9AB0-F3ADB03E5E03}hapus_barang', 495),
	(4, '{3C64794E-EF73-47B1-9AB0-F3ADB03E5E03}hapus_barangnew', 495),
	(4, '{3C64794E-EF73-47B1-9AB0-F3ADB03E5E03}ijazah', 495),
	(4, '{3C64794E-EF73-47B1-9AB0-F3ADB03E5E03}ijin', 495),
	(4, '{3C64794E-EF73-47B1-9AB0-F3ADB03E5E03}jabatan', 495),
	(4, '{3C64794E-EF73-47B1-9AB0-F3ADB03E5E03}jenis_barang', 495),
	(4, '{3C64794E-EF73-47B1-9AB0-F3ADB03E5E03}jenis_dinasluar', 495),
	(4, '{3C64794E-EF73-47B1-9AB0-F3ADB03E5E03}jenis_grup_berita', 495),
	(4, '{3C64794E-EF73-47B1-9AB0-F3ADB03E5E03}jenis_grup_ilmu', 495),
	(4, '{3C64794E-EF73-47B1-9AB0-F3ADB03E5E03}jenis_ijin', 495),
	(4, '{3C64794E-EF73-47B1-9AB0-F3ADB03E5E03}jenis_jabatan', 495),
	(4, '{3C64794E-EF73-47B1-9AB0-F3ADB03E5E03}jenis_lembur', 495),
	(4, '{3C64794E-EF73-47B1-9AB0-F3ADB03E5E03}komentar', 495),
	(4, '{3C64794E-EF73-47B1-9AB0-F3ADB03E5E03}lembur', 495),
	(4, '{3C64794E-EF73-47B1-9AB0-F3ADB03E5E03}mpendidikan', 495),
	(4, '{3C64794E-EF73-47B1-9AB0-F3ADB03E5E03}m_bpjs', 495),
	(4, '{3C64794E-EF73-47B1-9AB0-F3ADB03E5E03}m_karyawan_sd', 495),
	(4, '{3C64794E-EF73-47B1-9AB0-F3ADB03E5E03}m_karyawan_sma', 495),
	(4, '{3C64794E-EF73-47B1-9AB0-F3ADB03E5E03}m_karyawan_smk', 495),
	(4, '{3C64794E-EF73-47B1-9AB0-F3ADB03E5E03}m_karyawan_smp', 495),
	(4, '{3C64794E-EF73-47B1-9AB0-F3ADB03E5E03}m_karyawan_tk', 495),
	(4, '{3C64794E-EF73-47B1-9AB0-F3ADB03E5E03}m_kehadiran', 495),
	(4, '{3C64794E-EF73-47B1-9AB0-F3ADB03E5E03}m_piket', 495),
	(4, '{3C64794E-EF73-47B1-9AB0-F3ADB03E5E03}m_pulangcepat', 495),
	(4, '{3C64794E-EF73-47B1-9AB0-F3ADB03E5E03}m_sakit', 495),
	(4, '{3C64794E-EF73-47B1-9AB0-F3ADB03E5E03}m_sd', 495),
	(4, '{3C64794E-EF73-47B1-9AB0-F3ADB03E5E03}m_sma', 495),
	(4, '{3C64794E-EF73-47B1-9AB0-F3ADB03E5E03}m_smk', 495),
	(4, '{3C64794E-EF73-47B1-9AB0-F3ADB03E5E03}m_smp', 495),
	(4, '{3C64794E-EF73-47B1-9AB0-F3ADB03E5E03}m_tidakhadir', 495),
	(4, '{3C64794E-EF73-47B1-9AB0-F3ADB03E5E03}m_tk', 495),
	(4, '{3C64794E-EF73-47B1-9AB0-F3ADB03E5E03}m_tu_sd', 495),
	(4, '{3C64794E-EF73-47B1-9AB0-F3ADB03E5E03}m_tu_sma', 495),
	(4, '{3C64794E-EF73-47B1-9AB0-F3ADB03E5E03}m_tu_smk', 495),
	(4, '{3C64794E-EF73-47B1-9AB0-F3ADB03E5E03}m_tu_smp', 495),
	(4, '{3C64794E-EF73-47B1-9AB0-F3ADB03E5E03}m_tu_tk', 495),
	(4, '{3C64794E-EF73-47B1-9AB0-F3ADB03E5E03}pegawai', 495),
	(4, '{3C64794E-EF73-47B1-9AB0-F3ADB03E5E03}peg_dokumen', 495),
	(4, '{3C64794E-EF73-47B1-9AB0-F3ADB03E5E03}peg_keluarga', 495),
	(4, '{3C64794E-EF73-47B1-9AB0-F3ADB03E5E03}peg_skill', 495),
	(4, '{3C64794E-EF73-47B1-9AB0-F3ADB03E5E03}penempatan', 495),
	(4, '{3C64794E-EF73-47B1-9AB0-F3ADB03E5E03}pengetahuan', 495),
	(4, '{3C64794E-EF73-47B1-9AB0-F3ADB03E5E03}potongan_sd', 495),
	(4, '{3C64794E-EF73-47B1-9AB0-F3ADB03E5E03}potongan_sma', 495),
	(4, '{3C64794E-EF73-47B1-9AB0-F3ADB03E5E03}potongan_smk', 495),
	(4, '{3C64794E-EF73-47B1-9AB0-F3ADB03E5E03}potongan_smp', 495),
	(4, '{3C64794E-EF73-47B1-9AB0-F3ADB03E5E03}potongan_tk', 495),
	(4, '{3C64794E-EF73-47B1-9AB0-F3ADB03E5E03}proyek', 495),
	(4, '{3C64794E-EF73-47B1-9AB0-F3ADB03E5E03}reimbursh', 495),
	(4, '{3C64794E-EF73-47B1-9AB0-F3ADB03E5E03}sertif', 495),
	(4, '{3C64794E-EF73-47B1-9AB0-F3ADB03E5E03}setuju', 495),
	(4, '{3C64794E-EF73-47B1-9AB0-F3ADB03E5E03}tambahan_tugas', 495),
	(4, '{3C64794E-EF73-47B1-9AB0-F3ADB03E5E03}terlambat', 495),
	(4, '{3C64794E-EF73-47B1-9AB0-F3ADB03E5E03}testtable', 495),
	(4, '{3C64794E-EF73-47B1-9AB0-F3ADB03E5E03}test_api.php', 495),
	(4, '{3C64794E-EF73-47B1-9AB0-F3ADB03E5E03}tpendidikan', 495),
	(4, '{3C64794E-EF73-47B1-9AB0-F3ADB03E5E03}v_totalgaji', 495),
	(4, '{3C64794E-EF73-47B1-9AB0-F3ADB03E5E03}v_totalgajikaryawan', 495),
	(4, '{3C64794E-EF73-47B1-9AB0-F3ADB03E5E03}v_totalgajikaryawansma', 495),
	(4, '{3C64794E-EF73-47B1-9AB0-F3ADB03E5E03}v_totalgajikaryawansmk', 495),
	(4, '{3C64794E-EF73-47B1-9AB0-F3ADB03E5E03}v_totalgajikaryawansmp', 495),
	(4, '{3C64794E-EF73-47B1-9AB0-F3ADB03E5E03}v_totalgajikaryawantk', 495),
	(4, '{3C64794E-EF73-47B1-9AB0-F3ADB03E5E03}v_totalgajisma', 495),
	(4, '{3C64794E-EF73-47B1-9AB0-F3ADB03E5E03}v_totalgajismk', 495),
	(4, '{3C64794E-EF73-47B1-9AB0-F3ADB03E5E03}v_totalgajismp', 495),
	(4, '{3C64794E-EF73-47B1-9AB0-F3ADB03E5E03}v_totalgajitk', 495),
	(4, '{3C64794E-EF73-47B1-9AB0-F3ADB03E5E03}v_totalgajitu', 495),
	(4, '{3C64794E-EF73-47B1-9AB0-F3ADB03E5E03}v_totalgajitusma', 495),
	(4, '{3C64794E-EF73-47B1-9AB0-F3ADB03E5E03}v_totalgajitusmk', 495),
	(4, '{3C64794E-EF73-47B1-9AB0-F3ADB03E5E03}v_totalgajitusmp', 495),
	(4, '{3C64794E-EF73-47B1-9AB0-F3ADB03E5E03}v_totalgajitutk', 303),
	(5, '{3C64794E-EF73-47B1-9AB0-F3ADB03E5E03}absen', 511),
	(5, '{3C64794E-EF73-47B1-9AB0-F3ADB03E5E03}absen_detil', 511),
	(5, '{3C64794E-EF73-47B1-9AB0-F3ADB03E5E03}agama', 511),
	(5, '{3C64794E-EF73-47B1-9AB0-F3ADB03E5E03}audittrail', 511),
	(5, '{3C64794E-EF73-47B1-9AB0-F3ADB03E5E03}barang', 511),
	(5, '{3C64794E-EF73-47B1-9AB0-F3ADB03E5E03}barangnew', 511),
	(5, '{3C64794E-EF73-47B1-9AB0-F3ADB03E5E03}berita', 511),
	(5, '{3C64794E-EF73-47B1-9AB0-F3ADB03E5E03}bulan', 511),
	(5, '{3C64794E-EF73-47B1-9AB0-F3ADB03E5E03}daftarbarang', 511),
	(5, '{3C64794E-EF73-47B1-9AB0-F3ADB03E5E03}dinasluar', 511),
	(5, '{3C64794E-EF73-47B1-9AB0-F3ADB03E5E03}gaji', 240),
	(5, '{3C64794E-EF73-47B1-9AB0-F3ADB03E5E03}gajisd', 208),
	(5, '{3C64794E-EF73-47B1-9AB0-F3ADB03E5E03}gajisd_detil', 208),
	(5, '{3C64794E-EF73-47B1-9AB0-F3ADB03E5E03}gajisma', 208),
	(5, '{3C64794E-EF73-47B1-9AB0-F3ADB03E5E03}gajisma_detil', 208),
	(5, '{3C64794E-EF73-47B1-9AB0-F3ADB03E5E03}gajismk', 208),
	(5, '{3C64794E-EF73-47B1-9AB0-F3ADB03E5E03}gajismk_detil', 208),
	(5, '{3C64794E-EF73-47B1-9AB0-F3ADB03E5E03}gajismp', 208),
	(5, '{3C64794E-EF73-47B1-9AB0-F3ADB03E5E03}gajismp_detil', 208),
	(5, '{3C64794E-EF73-47B1-9AB0-F3ADB03E5E03}gajitk', 208),
	(5, '{3C64794E-EF73-47B1-9AB0-F3ADB03E5E03}gajitk_detil', 208),
	(5, '{3C64794E-EF73-47B1-9AB0-F3ADB03E5E03}gajitunjangan', 511),
	(5, '{3C64794E-EF73-47B1-9AB0-F3ADB03E5E03}gaji_karyawan_sd', 208),
	(5, '{3C64794E-EF73-47B1-9AB0-F3ADB03E5E03}gaji_karyawan_sma', 208),
	(5, '{3C64794E-EF73-47B1-9AB0-F3ADB03E5E03}gaji_karyawan_smk', 208),
	(5, '{3C64794E-EF73-47B1-9AB0-F3ADB03E5E03}gaji_karyawan_smp', 208),
	(5, '{3C64794E-EF73-47B1-9AB0-F3ADB03E5E03}gaji_karyawan_tk', 208),
	(5, '{3C64794E-EF73-47B1-9AB0-F3ADB03E5E03}gaji_pokok', 511),
	(5, '{3C64794E-EF73-47B1-9AB0-F3ADB03E5E03}gaji_pokok_tu', 511),
	(5, '{3C64794E-EF73-47B1-9AB0-F3ADB03E5E03}gaji_sma', 208),
	(5, '{3C64794E-EF73-47B1-9AB0-F3ADB03E5E03}gaji_smk', 208),
	(5, '{3C64794E-EF73-47B1-9AB0-F3ADB03E5E03}gaji_smp', 208),
	(5, '{3C64794E-EF73-47B1-9AB0-F3ADB03E5E03}gaji_tk', 208),
	(5, '{3C64794E-EF73-47B1-9AB0-F3ADB03E5E03}gaji_tu_sd', 208),
	(5, '{3C64794E-EF73-47B1-9AB0-F3ADB03E5E03}gaji_tu_sma', 208),
	(5, '{3C64794E-EF73-47B1-9AB0-F3ADB03E5E03}gaji_tu_smk', 208),
	(5, '{3C64794E-EF73-47B1-9AB0-F3ADB03E5E03}gaji_tu_smp', 208),
	(5, '{3C64794E-EF73-47B1-9AB0-F3ADB03E5E03}gaji_tu_tk', 208),
	(5, '{3C64794E-EF73-47B1-9AB0-F3ADB03E5E03}gender', 511),
	(5, '{3C64794E-EF73-47B1-9AB0-F3ADB03E5E03}hapus_barang', 511),
	(5, '{3C64794E-EF73-47B1-9AB0-F3ADB03E5E03}hapus_barangnew', 511),
	(5, '{3C64794E-EF73-47B1-9AB0-F3ADB03E5E03}ijazah', 511),
	(5, '{3C64794E-EF73-47B1-9AB0-F3ADB03E5E03}ijin', 511),
	(5, '{3C64794E-EF73-47B1-9AB0-F3ADB03E5E03}jabatan', 511),
	(5, '{3C64794E-EF73-47B1-9AB0-F3ADB03E5E03}jenis_barang', 511),
	(5, '{3C64794E-EF73-47B1-9AB0-F3ADB03E5E03}jenis_dinasluar', 511),
	(5, '{3C64794E-EF73-47B1-9AB0-F3ADB03E5E03}jenis_grup_berita', 511),
	(5, '{3C64794E-EF73-47B1-9AB0-F3ADB03E5E03}jenis_grup_ilmu', 511),
	(5, '{3C64794E-EF73-47B1-9AB0-F3ADB03E5E03}jenis_ijin', 511),
	(5, '{3C64794E-EF73-47B1-9AB0-F3ADB03E5E03}jenis_jabatan', 511),
	(5, '{3C64794E-EF73-47B1-9AB0-F3ADB03E5E03}jenis_lembur', 511),
	(5, '{3C64794E-EF73-47B1-9AB0-F3ADB03E5E03}komentar', 511),
	(5, '{3C64794E-EF73-47B1-9AB0-F3ADB03E5E03}lembur', 511),
	(5, '{3C64794E-EF73-47B1-9AB0-F3ADB03E5E03}mpendidikan', 511),
	(5, '{3C64794E-EF73-47B1-9AB0-F3ADB03E5E03}m_bpjs', 255),
	(5, '{3C64794E-EF73-47B1-9AB0-F3ADB03E5E03}m_karyawan_sd', 208),
	(5, '{3C64794E-EF73-47B1-9AB0-F3ADB03E5E03}m_karyawan_sma', 208),
	(5, '{3C64794E-EF73-47B1-9AB0-F3ADB03E5E03}m_karyawan_smk', 208),
	(5, '{3C64794E-EF73-47B1-9AB0-F3ADB03E5E03}m_karyawan_smp', 208),
	(5, '{3C64794E-EF73-47B1-9AB0-F3ADB03E5E03}m_karyawan_tk', 208),
	(5, '{3C64794E-EF73-47B1-9AB0-F3ADB03E5E03}m_kehadiran', 511),
	(5, '{3C64794E-EF73-47B1-9AB0-F3ADB03E5E03}m_piket', 511),
	(5, '{3C64794E-EF73-47B1-9AB0-F3ADB03E5E03}m_pulangcepat', 511),
	(5, '{3C64794E-EF73-47B1-9AB0-F3ADB03E5E03}m_sakit', 511),
	(5, '{3C64794E-EF73-47B1-9AB0-F3ADB03E5E03}m_sd', 208),
	(5, '{3C64794E-EF73-47B1-9AB0-F3ADB03E5E03}m_sma', 208),
	(5, '{3C64794E-EF73-47B1-9AB0-F3ADB03E5E03}m_smk', 208),
	(5, '{3C64794E-EF73-47B1-9AB0-F3ADB03E5E03}m_smp', 208),
	(5, '{3C64794E-EF73-47B1-9AB0-F3ADB03E5E03}m_tidakhadir', 511),
	(5, '{3C64794E-EF73-47B1-9AB0-F3ADB03E5E03}m_tk', 208),
	(5, '{3C64794E-EF73-47B1-9AB0-F3ADB03E5E03}m_tu_sd', 208),
	(5, '{3C64794E-EF73-47B1-9AB0-F3ADB03E5E03}m_tu_sma', 208),
	(5, '{3C64794E-EF73-47B1-9AB0-F3ADB03E5E03}m_tu_smk', 208),
	(5, '{3C64794E-EF73-47B1-9AB0-F3ADB03E5E03}m_tu_smp', 208),
	(5, '{3C64794E-EF73-47B1-9AB0-F3ADB03E5E03}m_tu_tk', 208),
	(5, '{3C64794E-EF73-47B1-9AB0-F3ADB03E5E03}pegawai', 511),
	(5, '{3C64794E-EF73-47B1-9AB0-F3ADB03E5E03}peg_dokumen', 511),
	(5, '{3C64794E-EF73-47B1-9AB0-F3ADB03E5E03}peg_keluarga', 511),
	(5, '{3C64794E-EF73-47B1-9AB0-F3ADB03E5E03}peg_skill', 511),
	(5, '{3C64794E-EF73-47B1-9AB0-F3ADB03E5E03}penempatan', 511),
	(5, '{3C64794E-EF73-47B1-9AB0-F3ADB03E5E03}pengetahuan', 511),
	(5, '{3C64794E-EF73-47B1-9AB0-F3ADB03E5E03}potongan_sd', 511),
	(5, '{3C64794E-EF73-47B1-9AB0-F3ADB03E5E03}potongan_sma', 511),
	(5, '{3C64794E-EF73-47B1-9AB0-F3ADB03E5E03}potongan_smk', 511),
	(5, '{3C64794E-EF73-47B1-9AB0-F3ADB03E5E03}potongan_smp', 511),
	(5, '{3C64794E-EF73-47B1-9AB0-F3ADB03E5E03}potongan_tk', 511),
	(5, '{3C64794E-EF73-47B1-9AB0-F3ADB03E5E03}proyek', 511),
	(5, '{3C64794E-EF73-47B1-9AB0-F3ADB03E5E03}reimbursh', 511),
	(5, '{3C64794E-EF73-47B1-9AB0-F3ADB03E5E03}sertif', 511),
	(5, '{3C64794E-EF73-47B1-9AB0-F3ADB03E5E03}setuju', 511),
	(5, '{3C64794E-EF73-47B1-9AB0-F3ADB03E5E03}tambahan_tugas', 511),
	(5, '{3C64794E-EF73-47B1-9AB0-F3ADB03E5E03}terlambat', 511),
	(5, '{3C64794E-EF73-47B1-9AB0-F3ADB03E5E03}testtable', 144),
	(5, '{3C64794E-EF73-47B1-9AB0-F3ADB03E5E03}test_api.php', 511),
	(5, '{3C64794E-EF73-47B1-9AB0-F3ADB03E5E03}totalgaji', 16),
	(5, '{3C64794E-EF73-47B1-9AB0-F3ADB03E5E03}tpendidikan', 511),
	(5, '{3C64794E-EF73-47B1-9AB0-F3ADB03E5E03}tunjangan_berkala', 511),
	(5, '{3C64794E-EF73-47B1-9AB0-F3ADB03E5E03}tunjangan_tambahan', 511),
	(5, '{3C64794E-EF73-47B1-9AB0-F3ADB03E5E03}uangmuka', 272),
	(5, '{3C64794E-EF73-47B1-9AB0-F3ADB03E5E03}userlevelpermissions', 272),
	(5, '{3C64794E-EF73-47B1-9AB0-F3ADB03E5E03}userlevels', 511),
	(5, '{3C64794E-EF73-47B1-9AB0-F3ADB03E5E03}v_totalgaji', 144),
	(5, '{3C64794E-EF73-47B1-9AB0-F3ADB03E5E03}v_totalgajikaryawan', 16),
	(5, '{3C64794E-EF73-47B1-9AB0-F3ADB03E5E03}v_totalgajikaryawansma', 16),
	(5, '{3C64794E-EF73-47B1-9AB0-F3ADB03E5E03}v_totalgajikaryawansmk', 16),
	(5, '{3C64794E-EF73-47B1-9AB0-F3ADB03E5E03}v_totalgajikaryawansmp', 208),
	(5, '{3C64794E-EF73-47B1-9AB0-F3ADB03E5E03}v_totalgajikaryawantk', 16),
	(5, '{3C64794E-EF73-47B1-9AB0-F3ADB03E5E03}v_totalgajisma', 144),
	(5, '{3C64794E-EF73-47B1-9AB0-F3ADB03E5E03}v_totalgajismk', 144),
	(5, '{3C64794E-EF73-47B1-9AB0-F3ADB03E5E03}v_totalgajismp', 208),
	(5, '{3C64794E-EF73-47B1-9AB0-F3ADB03E5E03}v_totalgajitk', 144),
	(5, '{3C64794E-EF73-47B1-9AB0-F3ADB03E5E03}v_totalgajitu', 16),
	(5, '{3C64794E-EF73-47B1-9AB0-F3ADB03E5E03}v_totalgajitusma', 16),
	(5, '{3C64794E-EF73-47B1-9AB0-F3ADB03E5E03}v_totalgajitusmk', 16),
	(5, '{3C64794E-EF73-47B1-9AB0-F3ADB03E5E03}v_totalgajitusmp', 16),
	(5, '{3C64794E-EF73-47B1-9AB0-F3ADB03E5E03}v_totalgajitutk', 16),
	(6, '{3C64794E-EF73-47B1-9AB0-F3ADB03E5E03}absen', 256),
	(6, '{3C64794E-EF73-47B1-9AB0-F3ADB03E5E03}absen_detil', 256),
	(6, '{3C64794E-EF73-47B1-9AB0-F3ADB03E5E03}agama', 256),
	(6, '{3C64794E-EF73-47B1-9AB0-F3ADB03E5E03}audittrail', 256),
	(6, '{3C64794E-EF73-47B1-9AB0-F3ADB03E5E03}barang', 256),
	(6, '{3C64794E-EF73-47B1-9AB0-F3ADB03E5E03}barangnew', 256),
	(6, '{3C64794E-EF73-47B1-9AB0-F3ADB03E5E03}berita', 256),
	(6, '{3C64794E-EF73-47B1-9AB0-F3ADB03E5E03}bulan', 256),
	(6, '{3C64794E-EF73-47B1-9AB0-F3ADB03E5E03}custom_file.php', 0),
	(6, '{3C64794E-EF73-47B1-9AB0-F3ADB03E5E03}daftarbarang', 256),
	(6, '{3C64794E-EF73-47B1-9AB0-F3ADB03E5E03}dinasluar', 256),
	(6, '{3C64794E-EF73-47B1-9AB0-F3ADB03E5E03}gaji', 256),
	(6, '{3C64794E-EF73-47B1-9AB0-F3ADB03E5E03}gajisd', 256),
	(6, '{3C64794E-EF73-47B1-9AB0-F3ADB03E5E03}gajisd_detil', 256),
	(6, '{3C64794E-EF73-47B1-9AB0-F3ADB03E5E03}gajisma', 256),
	(6, '{3C64794E-EF73-47B1-9AB0-F3ADB03E5E03}gajisma_detil', 256),
	(6, '{3C64794E-EF73-47B1-9AB0-F3ADB03E5E03}gajismk', 256),
	(6, '{3C64794E-EF73-47B1-9AB0-F3ADB03E5E03}gajismk_detil', 256),
	(6, '{3C64794E-EF73-47B1-9AB0-F3ADB03E5E03}gajismp', 256),
	(6, '{3C64794E-EF73-47B1-9AB0-F3ADB03E5E03}gajismp_detil', 256),
	(6, '{3C64794E-EF73-47B1-9AB0-F3ADB03E5E03}gajitk', 256),
	(6, '{3C64794E-EF73-47B1-9AB0-F3ADB03E5E03}gajitk_detil', 256),
	(6, '{3C64794E-EF73-47B1-9AB0-F3ADB03E5E03}gajitunjangan', 256),
	(6, '{3C64794E-EF73-47B1-9AB0-F3ADB03E5E03}gaji_karyawan_sd', 256),
	(6, '{3C64794E-EF73-47B1-9AB0-F3ADB03E5E03}gaji_karyawan_sma', 495),
	(6, '{3C64794E-EF73-47B1-9AB0-F3ADB03E5E03}gaji_karyawan_smk', 256),
	(6, '{3C64794E-EF73-47B1-9AB0-F3ADB03E5E03}gaji_karyawan_smp', 256),
	(6, '{3C64794E-EF73-47B1-9AB0-F3ADB03E5E03}gaji_karyawan_tk', 256),
	(6, '{3C64794E-EF73-47B1-9AB0-F3ADB03E5E03}gaji_pokok', 256),
	(6, '{3C64794E-EF73-47B1-9AB0-F3ADB03E5E03}gaji_pokok_tu', 256),
	(6, '{3C64794E-EF73-47B1-9AB0-F3ADB03E5E03}gaji_sma', 495),
	(6, '{3C64794E-EF73-47B1-9AB0-F3ADB03E5E03}gaji_smk', 256),
	(6, '{3C64794E-EF73-47B1-9AB0-F3ADB03E5E03}gaji_smp', 256),
	(6, '{3C64794E-EF73-47B1-9AB0-F3ADB03E5E03}gaji_tk', 256),
	(6, '{3C64794E-EF73-47B1-9AB0-F3ADB03E5E03}gaji_tu_sd', 256),
	(6, '{3C64794E-EF73-47B1-9AB0-F3ADB03E5E03}gaji_tu_sma', 495),
	(6, '{3C64794E-EF73-47B1-9AB0-F3ADB03E5E03}gaji_tu_smk', 256),
	(6, '{3C64794E-EF73-47B1-9AB0-F3ADB03E5E03}gaji_tu_smp', 256),
	(6, '{3C64794E-EF73-47B1-9AB0-F3ADB03E5E03}gaji_tu_tk', 256),
	(6, '{3C64794E-EF73-47B1-9AB0-F3ADB03E5E03}gender', 256),
	(6, '{3C64794E-EF73-47B1-9AB0-F3ADB03E5E03}hapus_barang', 256),
	(6, '{3C64794E-EF73-47B1-9AB0-F3ADB03E5E03}hapus_barangnew', 256),
	(6, '{3C64794E-EF73-47B1-9AB0-F3ADB03E5E03}ijazah', 256),
	(6, '{3C64794E-EF73-47B1-9AB0-F3ADB03E5E03}ijin', 256),
	(6, '{3C64794E-EF73-47B1-9AB0-F3ADB03E5E03}jabatan', 256),
	(6, '{3C64794E-EF73-47B1-9AB0-F3ADB03E5E03}jenis_barang', 256),
	(6, '{3C64794E-EF73-47B1-9AB0-F3ADB03E5E03}jenis_dinasluar', 256),
	(6, '{3C64794E-EF73-47B1-9AB0-F3ADB03E5E03}jenis_grup_berita', 256),
	(6, '{3C64794E-EF73-47B1-9AB0-F3ADB03E5E03}jenis_grup_ilmu', 256),
	(6, '{3C64794E-EF73-47B1-9AB0-F3ADB03E5E03}jenis_ijin', 256),
	(6, '{3C64794E-EF73-47B1-9AB0-F3ADB03E5E03}jenis_jabatan', 256),
	(6, '{3C64794E-EF73-47B1-9AB0-F3ADB03E5E03}jenis_lembur', 256),
	(6, '{3C64794E-EF73-47B1-9AB0-F3ADB03E5E03}komentar', 256),
	(6, '{3C64794E-EF73-47B1-9AB0-F3ADB03E5E03}lembur', 256),
	(6, '{3C64794E-EF73-47B1-9AB0-F3ADB03E5E03}mpendidikan', 256),
	(6, '{3C64794E-EF73-47B1-9AB0-F3ADB03E5E03}m_karyawan_sd', 256),
	(6, '{3C64794E-EF73-47B1-9AB0-F3ADB03E5E03}m_karyawan_sma', 495),
	(6, '{3C64794E-EF73-47B1-9AB0-F3ADB03E5E03}m_karyawan_smk', 256),
	(6, '{3C64794E-EF73-47B1-9AB0-F3ADB03E5E03}m_karyawan_smp', 256),
	(6, '{3C64794E-EF73-47B1-9AB0-F3ADB03E5E03}m_karyawan_tk', 256),
	(6, '{3C64794E-EF73-47B1-9AB0-F3ADB03E5E03}m_kehadiran', 256),
	(6, '{3C64794E-EF73-47B1-9AB0-F3ADB03E5E03}m_piket', 256),
	(6, '{3C64794E-EF73-47B1-9AB0-F3ADB03E5E03}m_potongan', 0),
	(6, '{3C64794E-EF73-47B1-9AB0-F3ADB03E5E03}m_potongan_sd', 0),
	(6, '{3C64794E-EF73-47B1-9AB0-F3ADB03E5E03}m_potongan_sma', 495),
	(6, '{3C64794E-EF73-47B1-9AB0-F3ADB03E5E03}m_potongan_smk', 0),
	(6, '{3C64794E-EF73-47B1-9AB0-F3ADB03E5E03}m_potongan_smp', 0),
	(6, '{3C64794E-EF73-47B1-9AB0-F3ADB03E5E03}m_pulangcepat', 256),
	(6, '{3C64794E-EF73-47B1-9AB0-F3ADB03E5E03}m_sakit', 256),
	(6, '{3C64794E-EF73-47B1-9AB0-F3ADB03E5E03}m_sd', 256),
	(6, '{3C64794E-EF73-47B1-9AB0-F3ADB03E5E03}m_sma', 495),
	(6, '{3C64794E-EF73-47B1-9AB0-F3ADB03E5E03}m_smk', 256),
	(6, '{3C64794E-EF73-47B1-9AB0-F3ADB03E5E03}m_smp', 256),
	(6, '{3C64794E-EF73-47B1-9AB0-F3ADB03E5E03}m_tidakhadir', 256),
	(6, '{3C64794E-EF73-47B1-9AB0-F3ADB03E5E03}m_tk', 256),
	(6, '{3C64794E-EF73-47B1-9AB0-F3ADB03E5E03}m_tu_sd', 256),
	(6, '{3C64794E-EF73-47B1-9AB0-F3ADB03E5E03}m_tu_sma', 495),
	(6, '{3C64794E-EF73-47B1-9AB0-F3ADB03E5E03}m_tu_smk', 256),
	(6, '{3C64794E-EF73-47B1-9AB0-F3ADB03E5E03}m_tu_smp', 256),
	(6, '{3C64794E-EF73-47B1-9AB0-F3ADB03E5E03}m_tu_tk', 256),
	(6, '{3C64794E-EF73-47B1-9AB0-F3ADB03E5E03}pegawai', 256),
	(6, '{3C64794E-EF73-47B1-9AB0-F3ADB03E5E03}peg_dokumen', 256),
	(6, '{3C64794E-EF73-47B1-9AB0-F3ADB03E5E03}peg_keluarga', 256),
	(6, '{3C64794E-EF73-47B1-9AB0-F3ADB03E5E03}peg_skill', 256),
	(6, '{3C64794E-EF73-47B1-9AB0-F3ADB03E5E03}penempatan', 256),
	(6, '{3C64794E-EF73-47B1-9AB0-F3ADB03E5E03}pengetahuan', 256),
	(6, '{3C64794E-EF73-47B1-9AB0-F3ADB03E5E03}potongan_sd', 256),
	(6, '{3C64794E-EF73-47B1-9AB0-F3ADB03E5E03}potongan_sma', 495),
	(6, '{3C64794E-EF73-47B1-9AB0-F3ADB03E5E03}potongan_smk', 256),
	(6, '{3C64794E-EF73-47B1-9AB0-F3ADB03E5E03}potongan_smp', 256),
	(6, '{3C64794E-EF73-47B1-9AB0-F3ADB03E5E03}potongan_tk', 256),
	(6, '{3C64794E-EF73-47B1-9AB0-F3ADB03E5E03}proyek', 256),
	(6, '{3C64794E-EF73-47B1-9AB0-F3ADB03E5E03}reimbursh', 256),
	(6, '{3C64794E-EF73-47B1-9AB0-F3ADB03E5E03}sertif', 256),
	(6, '{3C64794E-EF73-47B1-9AB0-F3ADB03E5E03}setuju', 256),
	(6, '{3C64794E-EF73-47B1-9AB0-F3ADB03E5E03}tambahan_tugas', 256),
	(6, '{3C64794E-EF73-47B1-9AB0-F3ADB03E5E03}terlambat', 256),
	(6, '{3C64794E-EF73-47B1-9AB0-F3ADB03E5E03}testtable', 256),
	(6, '{3C64794E-EF73-47B1-9AB0-F3ADB03E5E03}test_api.php', 256),
	(6, '{3C64794E-EF73-47B1-9AB0-F3ADB03E5E03}totalgaji', 256),
	(6, '{3C64794E-EF73-47B1-9AB0-F3ADB03E5E03}tpendidikan', 256),
	(6, '{3C64794E-EF73-47B1-9AB0-F3ADB03E5E03}tunjangan_berkala', 256),
	(6, '{3C64794E-EF73-47B1-9AB0-F3ADB03E5E03}tunjangan_tambahan', 256),
	(6, '{3C64794E-EF73-47B1-9AB0-F3ADB03E5E03}uangmuka', 256),
	(6, '{3C64794E-EF73-47B1-9AB0-F3ADB03E5E03}userlevelpermissions', 256),
	(6, '{3C64794E-EF73-47B1-9AB0-F3ADB03E5E03}userlevels', 256),
	(6, '{3C64794E-EF73-47B1-9AB0-F3ADB03E5E03}v_totalgaji', 256),
	(6, '{3C64794E-EF73-47B1-9AB0-F3ADB03E5E03}v_totalgajikaryawan', 256),
	(6, '{3C64794E-EF73-47B1-9AB0-F3ADB03E5E03}v_totalgajikaryawansma', 495),
	(6, '{3C64794E-EF73-47B1-9AB0-F3ADB03E5E03}v_totalgajikaryawansmk', 256),
	(6, '{3C64794E-EF73-47B1-9AB0-F3ADB03E5E03}v_totalgajikaryawansmp', 256),
	(6, '{3C64794E-EF73-47B1-9AB0-F3ADB03E5E03}v_totalgajikaryawantk', 256),
	(6, '{3C64794E-EF73-47B1-9AB0-F3ADB03E5E03}v_totalgajisma', 495),
	(6, '{3C64794E-EF73-47B1-9AB0-F3ADB03E5E03}v_totalgajismk', 256),
	(6, '{3C64794E-EF73-47B1-9AB0-F3ADB03E5E03}v_totalgajismp', 256),
	(6, '{3C64794E-EF73-47B1-9AB0-F3ADB03E5E03}v_totalgajitk', 256),
	(6, '{3C64794E-EF73-47B1-9AB0-F3ADB03E5E03}v_totalgajitu', 256),
	(6, '{3C64794E-EF73-47B1-9AB0-F3ADB03E5E03}v_totalgajitusma', 495),
	(6, '{3C64794E-EF73-47B1-9AB0-F3ADB03E5E03}v_totalgajitusmk', 256),
	(6, '{3C64794E-EF73-47B1-9AB0-F3ADB03E5E03}v_totalgajitusmp', 256),
	(6, '{3C64794E-EF73-47B1-9AB0-F3ADB03E5E03}v_totalgajitutk', 256),
	(7, '{3C64794E-EF73-47B1-9AB0-F3ADB03E5E03}absen', 256),
	(7, '{3C64794E-EF73-47B1-9AB0-F3ADB03E5E03}absen_detil', 256),
	(7, '{3C64794E-EF73-47B1-9AB0-F3ADB03E5E03}agama', 256),
	(7, '{3C64794E-EF73-47B1-9AB0-F3ADB03E5E03}audittrail', 256),
	(7, '{3C64794E-EF73-47B1-9AB0-F3ADB03E5E03}barang', 256),
	(7, '{3C64794E-EF73-47B1-9AB0-F3ADB03E5E03}barangnew', 256),
	(7, '{3C64794E-EF73-47B1-9AB0-F3ADB03E5E03}berita', 256),
	(7, '{3C64794E-EF73-47B1-9AB0-F3ADB03E5E03}bulan', 256),
	(7, '{3C64794E-EF73-47B1-9AB0-F3ADB03E5E03}daftarbarang', 256),
	(7, '{3C64794E-EF73-47B1-9AB0-F3ADB03E5E03}dinasluar', 256),
	(7, '{3C64794E-EF73-47B1-9AB0-F3ADB03E5E03}gaji', 256),
	(7, '{3C64794E-EF73-47B1-9AB0-F3ADB03E5E03}gajisd', 256),
	(7, '{3C64794E-EF73-47B1-9AB0-F3ADB03E5E03}gajisd_detil', 256),
	(7, '{3C64794E-EF73-47B1-9AB0-F3ADB03E5E03}gajisma', 256),
	(7, '{3C64794E-EF73-47B1-9AB0-F3ADB03E5E03}gajisma_detil', 256),
	(7, '{3C64794E-EF73-47B1-9AB0-F3ADB03E5E03}gajismk', 256),
	(7, '{3C64794E-EF73-47B1-9AB0-F3ADB03E5E03}gajismk_detil', 256),
	(7, '{3C64794E-EF73-47B1-9AB0-F3ADB03E5E03}gajismp', 256),
	(7, '{3C64794E-EF73-47B1-9AB0-F3ADB03E5E03}gajismp_detil', 256),
	(7, '{3C64794E-EF73-47B1-9AB0-F3ADB03E5E03}gajitk', 256),
	(7, '{3C64794E-EF73-47B1-9AB0-F3ADB03E5E03}gajitk_detil', 256),
	(7, '{3C64794E-EF73-47B1-9AB0-F3ADB03E5E03}gajitunjangan', 256),
	(7, '{3C64794E-EF73-47B1-9AB0-F3ADB03E5E03}gaji_karyawan_sd', 256),
	(7, '{3C64794E-EF73-47B1-9AB0-F3ADB03E5E03}gaji_karyawan_sma', 256),
	(7, '{3C64794E-EF73-47B1-9AB0-F3ADB03E5E03}gaji_karyawan_smk', 495),
	(7, '{3C64794E-EF73-47B1-9AB0-F3ADB03E5E03}gaji_karyawan_smp', 256),
	(7, '{3C64794E-EF73-47B1-9AB0-F3ADB03E5E03}gaji_karyawan_tk', 256),
	(7, '{3C64794E-EF73-47B1-9AB0-F3ADB03E5E03}gaji_pokok', 256),
	(7, '{3C64794E-EF73-47B1-9AB0-F3ADB03E5E03}gaji_pokok_tu', 256),
	(7, '{3C64794E-EF73-47B1-9AB0-F3ADB03E5E03}gaji_sma', 256),
	(7, '{3C64794E-EF73-47B1-9AB0-F3ADB03E5E03}gaji_smk', 256),
	(7, '{3C64794E-EF73-47B1-9AB0-F3ADB03E5E03}gaji_smp', 256),
	(7, '{3C64794E-EF73-47B1-9AB0-F3ADB03E5E03}gaji_tk', 256),
	(7, '{3C64794E-EF73-47B1-9AB0-F3ADB03E5E03}gaji_tu_sd', 256),
	(7, '{3C64794E-EF73-47B1-9AB0-F3ADB03E5E03}gaji_tu_sma', 256),
	(7, '{3C64794E-EF73-47B1-9AB0-F3ADB03E5E03}gaji_tu_smk', 495),
	(7, '{3C64794E-EF73-47B1-9AB0-F3ADB03E5E03}gaji_tu_smp', 256),
	(7, '{3C64794E-EF73-47B1-9AB0-F3ADB03E5E03}gaji_tu_tk', 256),
	(7, '{3C64794E-EF73-47B1-9AB0-F3ADB03E5E03}gender', 256),
	(7, '{3C64794E-EF73-47B1-9AB0-F3ADB03E5E03}hapus_barang', 256),
	(7, '{3C64794E-EF73-47B1-9AB0-F3ADB03E5E03}hapus_barangnew', 256),
	(7, '{3C64794E-EF73-47B1-9AB0-F3ADB03E5E03}ijazah', 256),
	(7, '{3C64794E-EF73-47B1-9AB0-F3ADB03E5E03}ijin', 256),
	(7, '{3C64794E-EF73-47B1-9AB0-F3ADB03E5E03}jabatan', 256),
	(7, '{3C64794E-EF73-47B1-9AB0-F3ADB03E5E03}jenis_barang', 256),
	(7, '{3C64794E-EF73-47B1-9AB0-F3ADB03E5E03}jenis_dinasluar', 256),
	(7, '{3C64794E-EF73-47B1-9AB0-F3ADB03E5E03}jenis_grup_berita', 256),
	(7, '{3C64794E-EF73-47B1-9AB0-F3ADB03E5E03}jenis_grup_ilmu', 256),
	(7, '{3C64794E-EF73-47B1-9AB0-F3ADB03E5E03}jenis_ijin', 256),
	(7, '{3C64794E-EF73-47B1-9AB0-F3ADB03E5E03}jenis_jabatan', 256),
	(7, '{3C64794E-EF73-47B1-9AB0-F3ADB03E5E03}jenis_lembur', 256),
	(7, '{3C64794E-EF73-47B1-9AB0-F3ADB03E5E03}komentar', 256),
	(7, '{3C64794E-EF73-47B1-9AB0-F3ADB03E5E03}lembur', 256),
	(7, '{3C64794E-EF73-47B1-9AB0-F3ADB03E5E03}mpendidikan', 256),
	(7, '{3C64794E-EF73-47B1-9AB0-F3ADB03E5E03}m_karyawan_sd', 256),
	(7, '{3C64794E-EF73-47B1-9AB0-F3ADB03E5E03}m_karyawan_sma', 256),
	(7, '{3C64794E-EF73-47B1-9AB0-F3ADB03E5E03}m_karyawan_smk', 495),
	(7, '{3C64794E-EF73-47B1-9AB0-F3ADB03E5E03}m_karyawan_smp', 256),
	(7, '{3C64794E-EF73-47B1-9AB0-F3ADB03E5E03}m_karyawan_tk', 256),
	(7, '{3C64794E-EF73-47B1-9AB0-F3ADB03E5E03}m_kehadiran', 256),
	(7, '{3C64794E-EF73-47B1-9AB0-F3ADB03E5E03}m_piket', 256),
	(7, '{3C64794E-EF73-47B1-9AB0-F3ADB03E5E03}m_pulangcepat', 256),
	(7, '{3C64794E-EF73-47B1-9AB0-F3ADB03E5E03}m_sakit', 256),
	(7, '{3C64794E-EF73-47B1-9AB0-F3ADB03E5E03}m_sd', 256),
	(7, '{3C64794E-EF73-47B1-9AB0-F3ADB03E5E03}m_sma', 256),
	(7, '{3C64794E-EF73-47B1-9AB0-F3ADB03E5E03}m_smk', 495),
	(7, '{3C64794E-EF73-47B1-9AB0-F3ADB03E5E03}m_smp', 256),
	(7, '{3C64794E-EF73-47B1-9AB0-F3ADB03E5E03}m_tidakhadir', 256),
	(7, '{3C64794E-EF73-47B1-9AB0-F3ADB03E5E03}m_tk', 256),
	(7, '{3C64794E-EF73-47B1-9AB0-F3ADB03E5E03}m_tu_sd', 256),
	(7, '{3C64794E-EF73-47B1-9AB0-F3ADB03E5E03}m_tu_sma', 256),
	(7, '{3C64794E-EF73-47B1-9AB0-F3ADB03E5E03}m_tu_smk', 495),
	(7, '{3C64794E-EF73-47B1-9AB0-F3ADB03E5E03}m_tu_smp', 256),
	(7, '{3C64794E-EF73-47B1-9AB0-F3ADB03E5E03}m_tu_tk', 256),
	(7, '{3C64794E-EF73-47B1-9AB0-F3ADB03E5E03}pegawai', 256),
	(7, '{3C64794E-EF73-47B1-9AB0-F3ADB03E5E03}peg_dokumen', 256),
	(7, '{3C64794E-EF73-47B1-9AB0-F3ADB03E5E03}peg_keluarga', 256),
	(7, '{3C64794E-EF73-47B1-9AB0-F3ADB03E5E03}peg_skill', 256),
	(7, '{3C64794E-EF73-47B1-9AB0-F3ADB03E5E03}penempatan', 256),
	(7, '{3C64794E-EF73-47B1-9AB0-F3ADB03E5E03}pengetahuan', 256),
	(7, '{3C64794E-EF73-47B1-9AB0-F3ADB03E5E03}potongan_sd', 256),
	(7, '{3C64794E-EF73-47B1-9AB0-F3ADB03E5E03}potongan_sma', 256),
	(7, '{3C64794E-EF73-47B1-9AB0-F3ADB03E5E03}potongan_smk', 495),
	(7, '{3C64794E-EF73-47B1-9AB0-F3ADB03E5E03}potongan_smp', 256),
	(7, '{3C64794E-EF73-47B1-9AB0-F3ADB03E5E03}potongan_tk', 256),
	(7, '{3C64794E-EF73-47B1-9AB0-F3ADB03E5E03}proyek', 256),
	(7, '{3C64794E-EF73-47B1-9AB0-F3ADB03E5E03}reimbursh', 256),
	(7, '{3C64794E-EF73-47B1-9AB0-F3ADB03E5E03}sertif', 256),
	(7, '{3C64794E-EF73-47B1-9AB0-F3ADB03E5E03}setuju', 256),
	(7, '{3C64794E-EF73-47B1-9AB0-F3ADB03E5E03}tambahan_tugas', 256),
	(7, '{3C64794E-EF73-47B1-9AB0-F3ADB03E5E03}terlambat', 256),
	(7, '{3C64794E-EF73-47B1-9AB0-F3ADB03E5E03}testtable', 256),
	(7, '{3C64794E-EF73-47B1-9AB0-F3ADB03E5E03}test_api.php', 256),
	(7, '{3C64794E-EF73-47B1-9AB0-F3ADB03E5E03}totalgaji', 256),
	(7, '{3C64794E-EF73-47B1-9AB0-F3ADB03E5E03}tpendidikan', 256),
	(7, '{3C64794E-EF73-47B1-9AB0-F3ADB03E5E03}tunjangan_berkala', 256),
	(7, '{3C64794E-EF73-47B1-9AB0-F3ADB03E5E03}tunjangan_tambahan', 256),
	(7, '{3C64794E-EF73-47B1-9AB0-F3ADB03E5E03}uangmuka', 256),
	(7, '{3C64794E-EF73-47B1-9AB0-F3ADB03E5E03}userlevelpermissions', 256),
	(7, '{3C64794E-EF73-47B1-9AB0-F3ADB03E5E03}userlevels', 256),
	(7, '{3C64794E-EF73-47B1-9AB0-F3ADB03E5E03}v_totalgaji', 256),
	(7, '{3C64794E-EF73-47B1-9AB0-F3ADB03E5E03}v_totalgajikaryawan', 256),
	(7, '{3C64794E-EF73-47B1-9AB0-F3ADB03E5E03}v_totalgajikaryawansma', 256),
	(7, '{3C64794E-EF73-47B1-9AB0-F3ADB03E5E03}v_totalgajikaryawansmk', 495),
	(7, '{3C64794E-EF73-47B1-9AB0-F3ADB03E5E03}v_totalgajikaryawansmp', 256),
	(7, '{3C64794E-EF73-47B1-9AB0-F3ADB03E5E03}v_totalgajikaryawantk', 256),
	(7, '{3C64794E-EF73-47B1-9AB0-F3ADB03E5E03}v_totalgajisma', 256),
	(7, '{3C64794E-EF73-47B1-9AB0-F3ADB03E5E03}v_totalgajismk', 495),
	(7, '{3C64794E-EF73-47B1-9AB0-F3ADB03E5E03}v_totalgajismp', 256),
	(7, '{3C64794E-EF73-47B1-9AB0-F3ADB03E5E03}v_totalgajitk', 256),
	(7, '{3C64794E-EF73-47B1-9AB0-F3ADB03E5E03}v_totalgajitu', 256),
	(7, '{3C64794E-EF73-47B1-9AB0-F3ADB03E5E03}v_totalgajitusma', 256),
	(7, '{3C64794E-EF73-47B1-9AB0-F3ADB03E5E03}v_totalgajitusmk', 495),
	(7, '{3C64794E-EF73-47B1-9AB0-F3ADB03E5E03}v_totalgajitusmp', 256),
	(7, '{3C64794E-EF73-47B1-9AB0-F3ADB03E5E03}v_totalgajitutk', 256),
	(8, '{3C64794E-EF73-47B1-9AB0-F3ADB03E5E03}absen', 495),
	(8, '{3C64794E-EF73-47B1-9AB0-F3ADB03E5E03}absen_detil', 495),
	(8, '{3C64794E-EF73-47B1-9AB0-F3ADB03E5E03}agama', 495),
	(8, '{3C64794E-EF73-47B1-9AB0-F3ADB03E5E03}audittrail', 495),
	(8, '{3C64794E-EF73-47B1-9AB0-F3ADB03E5E03}backup_restore.php', 256),
	(8, '{3C64794E-EF73-47B1-9AB0-F3ADB03E5E03}barang', 495),
	(8, '{3C64794E-EF73-47B1-9AB0-F3ADB03E5E03}barangnew', 495),
	(8, '{3C64794E-EF73-47B1-9AB0-F3ADB03E5E03}berita', 495),
	(8, '{3C64794E-EF73-47B1-9AB0-F3ADB03E5E03}bulan', 495),
	(8, '{3C64794E-EF73-47B1-9AB0-F3ADB03E5E03}coba.php', 256),
	(8, '{3C64794E-EF73-47B1-9AB0-F3ADB03E5E03}custom_file.php', 256),
	(8, '{3C64794E-EF73-47B1-9AB0-F3ADB03E5E03}daftarbarang', 495),
	(8, '{3C64794E-EF73-47B1-9AB0-F3ADB03E5E03}dinasluar', 495),
	(8, '{3C64794E-EF73-47B1-9AB0-F3ADB03E5E03}export_excel.php', 256),
	(8, '{3C64794E-EF73-47B1-9AB0-F3ADB03E5E03}export_file_sma.php', 256),
	(8, '{3C64794E-EF73-47B1-9AB0-F3ADB03E5E03}export_tu_sma.php', 256),
	(8, '{3C64794E-EF73-47B1-9AB0-F3ADB03E5E03}gaji', 480),
	(8, '{3C64794E-EF73-47B1-9AB0-F3ADB03E5E03}gajisd', 495),
	(8, '{3C64794E-EF73-47B1-9AB0-F3ADB03E5E03}gajisd_detil', 495),
	(8, '{3C64794E-EF73-47B1-9AB0-F3ADB03E5E03}gajisma', 495),
	(8, '{3C64794E-EF73-47B1-9AB0-F3ADB03E5E03}gajisma_detil', 495),
	(8, '{3C64794E-EF73-47B1-9AB0-F3ADB03E5E03}gajismk', 495),
	(8, '{3C64794E-EF73-47B1-9AB0-F3ADB03E5E03}gajismk_detil', 495),
	(8, '{3C64794E-EF73-47B1-9AB0-F3ADB03E5E03}gajismp', 495),
	(8, '{3C64794E-EF73-47B1-9AB0-F3ADB03E5E03}gajismp_detil', 495),
	(8, '{3C64794E-EF73-47B1-9AB0-F3ADB03E5E03}gajitk', 495),
	(8, '{3C64794E-EF73-47B1-9AB0-F3ADB03E5E03}gajitk_detil', 495),
	(8, '{3C64794E-EF73-47B1-9AB0-F3ADB03E5E03}gajitunjangan', 495),
	(8, '{3C64794E-EF73-47B1-9AB0-F3ADB03E5E03}gaji_karyawan_sd', 480),
	(8, '{3C64794E-EF73-47B1-9AB0-F3ADB03E5E03}gaji_karyawan_sma', 480),
	(8, '{3C64794E-EF73-47B1-9AB0-F3ADB03E5E03}gaji_karyawan_smk', 480),
	(8, '{3C64794E-EF73-47B1-9AB0-F3ADB03E5E03}gaji_karyawan_smp', 480),
	(8, '{3C64794E-EF73-47B1-9AB0-F3ADB03E5E03}gaji_karyawan_tk', 495),
	(8, '{3C64794E-EF73-47B1-9AB0-F3ADB03E5E03}gaji_pokok', 495),
	(8, '{3C64794E-EF73-47B1-9AB0-F3ADB03E5E03}gaji_pokok_kayawan', 256),
	(8, '{3C64794E-EF73-47B1-9AB0-F3ADB03E5E03}gaji_pokok_tu', 495),
	(8, '{3C64794E-EF73-47B1-9AB0-F3ADB03E5E03}gaji_sma', 480),
	(8, '{3C64794E-EF73-47B1-9AB0-F3ADB03E5E03}gaji_smk', 480),
	(8, '{3C64794E-EF73-47B1-9AB0-F3ADB03E5E03}gaji_smp', 480),
	(8, '{3C64794E-EF73-47B1-9AB0-F3ADB03E5E03}gaji_tk', 495),
	(8, '{3C64794E-EF73-47B1-9AB0-F3ADB03E5E03}gaji_tu_sd', 480),
	(8, '{3C64794E-EF73-47B1-9AB0-F3ADB03E5E03}gaji_tu_sma', 480),
	(8, '{3C64794E-EF73-47B1-9AB0-F3ADB03E5E03}gaji_tu_smk', 480),
	(8, '{3C64794E-EF73-47B1-9AB0-F3ADB03E5E03}gaji_tu_smp', 480),
	(8, '{3C64794E-EF73-47B1-9AB0-F3ADB03E5E03}gaji_tu_tk', 495),
	(8, '{3C64794E-EF73-47B1-9AB0-F3ADB03E5E03}gender', 495),
	(8, '{3C64794E-EF73-47B1-9AB0-F3ADB03E5E03}generate_perbulan', 256),
	(8, '{3C64794E-EF73-47B1-9AB0-F3ADB03E5E03}generate_pertahun', 256),
	(8, '{3C64794E-EF73-47B1-9AB0-F3ADB03E5E03}generate_pertahun_sd', 256),
	(8, '{3C64794E-EF73-47B1-9AB0-F3ADB03E5E03}generate_pertahun_smk', 256),
	(8, '{3C64794E-EF73-47B1-9AB0-F3ADB03E5E03}generate_pertahun_smp', 256),
	(8, '{3C64794E-EF73-47B1-9AB0-F3ADB03E5E03}generate_pertahun_tk', 256),
	(8, '{3C64794E-EF73-47B1-9AB0-F3ADB03E5E03}hapus_barang', 495),
	(8, '{3C64794E-EF73-47B1-9AB0-F3ADB03E5E03}hapus_barangnew', 495),
	(8, '{3C64794E-EF73-47B1-9AB0-F3ADB03E5E03}home.php', 495),
	(8, '{3C64794E-EF73-47B1-9AB0-F3ADB03E5E03}ijazah', 495),
	(8, '{3C64794E-EF73-47B1-9AB0-F3ADB03E5E03}ijin', 495),
	(8, '{3C64794E-EF73-47B1-9AB0-F3ADB03E5E03}jabatan', 495),
	(8, '{3C64794E-EF73-47B1-9AB0-F3ADB03E5E03}jenis_barang', 495),
	(8, '{3C64794E-EF73-47B1-9AB0-F3ADB03E5E03}jenis_dinasluar', 495),
	(8, '{3C64794E-EF73-47B1-9AB0-F3ADB03E5E03}jenis_grup_berita', 495),
	(8, '{3C64794E-EF73-47B1-9AB0-F3ADB03E5E03}jenis_grup_ilmu', 495),
	(8, '{3C64794E-EF73-47B1-9AB0-F3ADB03E5E03}jenis_ijin', 495),
	(8, '{3C64794E-EF73-47B1-9AB0-F3ADB03E5E03}jenis_jabatan', 495),
	(8, '{3C64794E-EF73-47B1-9AB0-F3ADB03E5E03}jenis_lembur', 495),
	(8, '{3C64794E-EF73-47B1-9AB0-F3ADB03E5E03}komentar', 495),
	(8, '{3C64794E-EF73-47B1-9AB0-F3ADB03E5E03}laporan_gaji_all.php', 256),
	(8, '{3C64794E-EF73-47B1-9AB0-F3ADB03E5E03}laporan_pajak_all.php', 256),
	(8, '{3C64794E-EF73-47B1-9AB0-F3ADB03E5E03}lembur', 495),
	(8, '{3C64794E-EF73-47B1-9AB0-F3ADB03E5E03}login_bendahara.php', 256),
	(8, '{3C64794E-EF73-47B1-9AB0-F3ADB03E5E03}login_pegawai.php', 256),
	(8, '{3C64794E-EF73-47B1-9AB0-F3ADB03E5E03}mpendidikan', 495),
	(8, '{3C64794E-EF73-47B1-9AB0-F3ADB03E5E03}m_bpjs', 495),
	(8, '{3C64794E-EF73-47B1-9AB0-F3ADB03E5E03}m_inval', 495),
	(8, '{3C64794E-EF73-47B1-9AB0-F3ADB03E5E03}m_iuran_hari_tua', 256),
	(8, '{3C64794E-EF73-47B1-9AB0-F3ADB03E5E03}m_jaminan_pensiun', 256),
	(8, '{3C64794E-EF73-47B1-9AB0-F3ADB03E5E03}m_jp_pegawai', 256),
	(8, '{3C64794E-EF73-47B1-9AB0-F3ADB03E5E03}m_karyawan_sd', 487),
	(8, '{3C64794E-EF73-47B1-9AB0-F3ADB03E5E03}m_karyawan_sma', 487),
	(8, '{3C64794E-EF73-47B1-9AB0-F3ADB03E5E03}m_karyawan_smk', 487),
	(8, '{3C64794E-EF73-47B1-9AB0-F3ADB03E5E03}m_karyawan_smp', 487),
	(8, '{3C64794E-EF73-47B1-9AB0-F3ADB03E5E03}m_karyawan_tk', 495),
	(8, '{3C64794E-EF73-47B1-9AB0-F3ADB03E5E03}m_kehadiran', 495),
	(8, '{3C64794E-EF73-47B1-9AB0-F3ADB03E5E03}m_lembur', 256),
	(8, '{3C64794E-EF73-47B1-9AB0-F3ADB03E5E03}m_penyesuaian', 495),
	(8, '{3C64794E-EF73-47B1-9AB0-F3ADB03E5E03}m_piket', 495),
	(8, '{3C64794E-EF73-47B1-9AB0-F3ADB03E5E03}m_potongan', 256),
	(8, '{3C64794E-EF73-47B1-9AB0-F3ADB03E5E03}m_potongan_sd', 256),
	(8, '{3C64794E-EF73-47B1-9AB0-F3ADB03E5E03}m_potongan_sma', 256),
	(8, '{3C64794E-EF73-47B1-9AB0-F3ADB03E5E03}m_potongan_smk', 256),
	(8, '{3C64794E-EF73-47B1-9AB0-F3ADB03E5E03}m_potongan_smp', 256),
	(8, '{3C64794E-EF73-47B1-9AB0-F3ADB03E5E03}m_pph21', 256),
	(8, '{3C64794E-EF73-47B1-9AB0-F3ADB03E5E03}m_pulangcepat', 495),
	(8, '{3C64794E-EF73-47B1-9AB0-F3ADB03E5E03}m_reward', 256),
	(8, '{3C64794E-EF73-47B1-9AB0-F3ADB03E5E03}m_sakit', 495),
	(8, '{3C64794E-EF73-47B1-9AB0-F3ADB03E5E03}m_sd', 487),
	(8, '{3C64794E-EF73-47B1-9AB0-F3ADB03E5E03}m_sma', 487),
	(8, '{3C64794E-EF73-47B1-9AB0-F3ADB03E5E03}m_smk', 487),
	(8, '{3C64794E-EF73-47B1-9AB0-F3ADB03E5E03}m_smp', 487),
	(8, '{3C64794E-EF73-47B1-9AB0-F3ADB03E5E03}m_tahun', 256),
	(8, '{3C64794E-EF73-47B1-9AB0-F3ADB03E5E03}m_tidakhadir', 495),
	(8, '{3C64794E-EF73-47B1-9AB0-F3ADB03E5E03}m_tk', 495),
	(8, '{3C64794E-EF73-47B1-9AB0-F3ADB03E5E03}m_tu_sd', 487),
	(8, '{3C64794E-EF73-47B1-9AB0-F3ADB03E5E03}m_tu_sma', 487),
	(8, '{3C64794E-EF73-47B1-9AB0-F3ADB03E5E03}m_tu_smk', 487),
	(8, '{3C64794E-EF73-47B1-9AB0-F3ADB03E5E03}m_tu_smp', 487),
	(8, '{3C64794E-EF73-47B1-9AB0-F3ADB03E5E03}m_tu_tk', 495),
	(8, '{3C64794E-EF73-47B1-9AB0-F3ADB03E5E03}m_yayasan', 256),
	(8, '{3C64794E-EF73-47B1-9AB0-F3ADB03E5E03}payrols.php', 256),
	(8, '{3C64794E-EF73-47B1-9AB0-F3ADB03E5E03}pegawai', 495),
	(8, '{3C64794E-EF73-47B1-9AB0-F3ADB03E5E03}peg_dokumen', 495),
	(8, '{3C64794E-EF73-47B1-9AB0-F3ADB03E5E03}peg_keluarga', 495),
	(8, '{3C64794E-EF73-47B1-9AB0-F3ADB03E5E03}peg_skill', 495),
	(8, '{3C64794E-EF73-47B1-9AB0-F3ADB03E5E03}penempatan', 495),
	(8, '{3C64794E-EF73-47B1-9AB0-F3ADB03E5E03}pengetahuan', 495),
	(8, '{3C64794E-EF73-47B1-9AB0-F3ADB03E5E03}penyesuaian', 495),
	(8, '{3C64794E-EF73-47B1-9AB0-F3ADB03E5E03}potongan_sd', 487),
	(8, '{3C64794E-EF73-47B1-9AB0-F3ADB03E5E03}potongan_sma', 487),
	(8, '{3C64794E-EF73-47B1-9AB0-F3ADB03E5E03}potongan_smk', 487),
	(8, '{3C64794E-EF73-47B1-9AB0-F3ADB03E5E03}potongan_smp', 487),
	(8, '{3C64794E-EF73-47B1-9AB0-F3ADB03E5E03}potongan_tk', 495),
	(8, '{3C64794E-EF73-47B1-9AB0-F3ADB03E5E03}proyek', 495),
	(8, '{3C64794E-EF73-47B1-9AB0-F3ADB03E5E03}reimbursh', 495),
	(8, '{3C64794E-EF73-47B1-9AB0-F3ADB03E5E03}semester', 256),
	(8, '{3C64794E-EF73-47B1-9AB0-F3ADB03E5E03}sertif', 495),
	(8, '{3C64794E-EF73-47B1-9AB0-F3ADB03E5E03}setuju', 495),
	(8, '{3C64794E-EF73-47B1-9AB0-F3ADB03E5E03}set_password', 256),
	(8, '{3C64794E-EF73-47B1-9AB0-F3ADB03E5E03}slipgaji.php', 256),
	(8, '{3C64794E-EF73-47B1-9AB0-F3ADB03E5E03}status_kepeg', 256),
	(8, '{3C64794E-EF73-47B1-9AB0-F3ADB03E5E03}status_npwp', 256),
	(8, '{3C64794E-EF73-47B1-9AB0-F3ADB03E5E03}status_pekerjaan', 256),
	(8, '{3C64794E-EF73-47B1-9AB0-F3ADB03E5E03}tambahan_tugas', 495),
	(8, '{3C64794E-EF73-47B1-9AB0-F3ADB03E5E03}terlambat', 495),
	(8, '{3C64794E-EF73-47B1-9AB0-F3ADB03E5E03}testtable', 495),
	(8, '{3C64794E-EF73-47B1-9AB0-F3ADB03E5E03}test_api.php', 495),
	(8, '{3C64794E-EF73-47B1-9AB0-F3ADB03E5E03}test_pdf.php', 256),
	(8, '{3C64794E-EF73-47B1-9AB0-F3ADB03E5E03}totalgaji', 0),
	(8, '{3C64794E-EF73-47B1-9AB0-F3ADB03E5E03}tpendidikan', 495),
	(8, '{3C64794E-EF73-47B1-9AB0-F3ADB03E5E03}tunjangan_berkala', 0),
	(8, '{3C64794E-EF73-47B1-9AB0-F3ADB03E5E03}tunjangan_tambahan', 0),
	(8, '{3C64794E-EF73-47B1-9AB0-F3ADB03E5E03}uangmuka', 0),
	(8, '{3C64794E-EF73-47B1-9AB0-F3ADB03E5E03}userlevelpermissions', 0),
	(8, '{3C64794E-EF73-47B1-9AB0-F3ADB03E5E03}userlevels', 0),
	(8, '{3C64794E-EF73-47B1-9AB0-F3ADB03E5E03}vgaji_guru_sd', 256),
	(8, '{3C64794E-EF73-47B1-9AB0-F3ADB03E5E03}vgaji_guru_sma', 256),
	(8, '{3C64794E-EF73-47B1-9AB0-F3ADB03E5E03}vgaji_guru_smk', 256),
	(8, '{3C64794E-EF73-47B1-9AB0-F3ADB03E5E03}vgaji_guru_smp', 256),
	(8, '{3C64794E-EF73-47B1-9AB0-F3ADB03E5E03}vgaji_guru_tk', 256),
	(8, '{3C64794E-EF73-47B1-9AB0-F3ADB03E5E03}vgaji_karyawan_sd', 256),
	(8, '{3C64794E-EF73-47B1-9AB0-F3ADB03E5E03}vgaji_karyawan_sma', 256),
	(8, '{3C64794E-EF73-47B1-9AB0-F3ADB03E5E03}vgaji_karyawan_smk', 256),
	(8, '{3C64794E-EF73-47B1-9AB0-F3ADB03E5E03}vgaji_karyawan_smp', 256),
	(8, '{3C64794E-EF73-47B1-9AB0-F3ADB03E5E03}vgaji_karyawan_tk', 256),
	(8, '{3C64794E-EF73-47B1-9AB0-F3ADB03E5E03}vgaji_tu_sd', 256),
	(8, '{3C64794E-EF73-47B1-9AB0-F3ADB03E5E03}vgaji_tu_sma', 256),
	(8, '{3C64794E-EF73-47B1-9AB0-F3ADB03E5E03}vgaji_tu_smk', 256),
	(8, '{3C64794E-EF73-47B1-9AB0-F3ADB03E5E03}vgaji_tu_smp', 256),
	(8, '{3C64794E-EF73-47B1-9AB0-F3ADB03E5E03}vgaji_tu_tk', 256),
	(8, '{3C64794E-EF73-47B1-9AB0-F3ADB03E5E03}v_gajisd', 256),
	(8, '{3C64794E-EF73-47B1-9AB0-F3ADB03E5E03}v_gajisma', 256),
	(8, '{3C64794E-EF73-47B1-9AB0-F3ADB03E5E03}v_gaji_guru_smk', 256),
	(8, '{3C64794E-EF73-47B1-9AB0-F3ADB03E5E03}v_gaji_karyawan_sd', 256),
	(8, '{3C64794E-EF73-47B1-9AB0-F3ADB03E5E03}v_gaji_karyawan_sma', 256),
	(8, '{3C64794E-EF73-47B1-9AB0-F3ADB03E5E03}v_gaji_karyawan_smk', 256),
	(8, '{3C64794E-EF73-47B1-9AB0-F3ADB03E5E03}v_gaji_karyawan_smp', 256),
	(8, '{3C64794E-EF73-47B1-9AB0-F3ADB03E5E03}v_gaji_karyawan_tk', 256),
	(8, '{3C64794E-EF73-47B1-9AB0-F3ADB03E5E03}v_gaji_smp', 256),
	(8, '{3C64794E-EF73-47B1-9AB0-F3ADB03E5E03}v_gaji_tk', 256),
	(8, '{3C64794E-EF73-47B1-9AB0-F3ADB03E5E03}v_gaji_tu_sd', 256),
	(8, '{3C64794E-EF73-47B1-9AB0-F3ADB03E5E03}v_gaji_tu_sma', 256),
	(8, '{3C64794E-EF73-47B1-9AB0-F3ADB03E5E03}v_gaji_tu_smk', 256),
	(8, '{3C64794E-EF73-47B1-9AB0-F3ADB03E5E03}v_gaji_tu_smp', 256),
	(8, '{3C64794E-EF73-47B1-9AB0-F3ADB03E5E03}v_gaji_tu_tk', 256),
	(8, '{3C64794E-EF73-47B1-9AB0-F3ADB03E5E03}v_karyawan_sd', 256),
	(8, '{3C64794E-EF73-47B1-9AB0-F3ADB03E5E03}v_karyawan_sma', 256),
	(8, '{3C64794E-EF73-47B1-9AB0-F3ADB03E5E03}v_karyawan_smk', 256),
	(8, '{3C64794E-EF73-47B1-9AB0-F3ADB03E5E03}v_karyawan_smp', 256),
	(8, '{3C64794E-EF73-47B1-9AB0-F3ADB03E5E03}v_karyawan_tk', 256),
	(8, '{3C64794E-EF73-47B1-9AB0-F3ADB03E5E03}v_m_sd', 256),
	(8, '{3C64794E-EF73-47B1-9AB0-F3ADB03E5E03}v_m_sma', 256),
	(8, '{3C64794E-EF73-47B1-9AB0-F3ADB03E5E03}v_m_smk', 256),
	(8, '{3C64794E-EF73-47B1-9AB0-F3ADB03E5E03}v_m_smp', 256),
	(8, '{3C64794E-EF73-47B1-9AB0-F3ADB03E5E03}v_m_tk', 256),
	(8, '{3C64794E-EF73-47B1-9AB0-F3ADB03E5E03}v_pegawai_sd', 256),
	(8, '{3C64794E-EF73-47B1-9AB0-F3ADB03E5E03}v_pegawai_sma', 256),
	(8, '{3C64794E-EF73-47B1-9AB0-F3ADB03E5E03}v_pegawai_smk', 256),
	(8, '{3C64794E-EF73-47B1-9AB0-F3ADB03E5E03}v_pegawai_smp', 256),
	(8, '{3C64794E-EF73-47B1-9AB0-F3ADB03E5E03}v_pegawai_tk', 256),
	(8, '{3C64794E-EF73-47B1-9AB0-F3ADB03E5E03}v_pengurus_yayasan', 256),
	(8, '{3C64794E-EF73-47B1-9AB0-F3ADB03E5E03}v_totalgaji', 487),
	(8, '{3C64794E-EF73-47B1-9AB0-F3ADB03E5E03}v_totalgajikaryawan', 487),
	(8, '{3C64794E-EF73-47B1-9AB0-F3ADB03E5E03}v_totalgajikaryawansma', 7),
	(8, '{3C64794E-EF73-47B1-9AB0-F3ADB03E5E03}v_totalgajikaryawansmk', 487),
	(8, '{3C64794E-EF73-47B1-9AB0-F3ADB03E5E03}v_totalgajikaryawansmp', 487),
	(8, '{3C64794E-EF73-47B1-9AB0-F3ADB03E5E03}v_totalgajikaryawantk', 495),
	(8, '{3C64794E-EF73-47B1-9AB0-F3ADB03E5E03}v_totalgajisma', 487),
	(8, '{3C64794E-EF73-47B1-9AB0-F3ADB03E5E03}v_totalgajismk', 487),
	(8, '{3C64794E-EF73-47B1-9AB0-F3ADB03E5E03}v_totalgajismp', 487),
	(8, '{3C64794E-EF73-47B1-9AB0-F3ADB03E5E03}v_totalgajitk', 495),
	(8, '{3C64794E-EF73-47B1-9AB0-F3ADB03E5E03}v_totalgajitu', 487),
	(8, '{3C64794E-EF73-47B1-9AB0-F3ADB03E5E03}v_totalgajitusma', 487),
	(8, '{3C64794E-EF73-47B1-9AB0-F3ADB03E5E03}v_totalgajitusmk', 487),
	(8, '{3C64794E-EF73-47B1-9AB0-F3ADB03E5E03}v_totalgajitusmp', 487),
	(8, '{3C64794E-EF73-47B1-9AB0-F3ADB03E5E03}v_totalgajitutk', 303),
	(8, '{3C64794E-EF73-47B1-9AB0-F3ADB03E5E03}v_tu_sd', 256),
	(8, '{3C64794E-EF73-47B1-9AB0-F3ADB03E5E03}v_tu_sma', 256),
	(8, '{3C64794E-EF73-47B1-9AB0-F3ADB03E5E03}v_tu_smk', 256),
	(8, '{3C64794E-EF73-47B1-9AB0-F3ADB03E5E03}v_tu_smp', 256),
	(8, '{3C64794E-EF73-47B1-9AB0-F3ADB03E5E03}v_tu_tk', 256),
	(8, '{3C64794E-EF73-47B1-9AB0-F3ADB03E5E03}v_yayasan', 256),
	(8, '{3C64794E-EF73-47B1-9AB0-F3ADB03E5E03}yayasan', 256),
	(9, '{3C64794E-EF73-47B1-9AB0-F3ADB03E5E03}absen', 511),
	(9, '{3C64794E-EF73-47B1-9AB0-F3ADB03E5E03}absen_detil', 511),
	(9, '{3C64794E-EF73-47B1-9AB0-F3ADB03E5E03}agama', 511),
	(9, '{3C64794E-EF73-47B1-9AB0-F3ADB03E5E03}audittrail', 511),
	(9, '{3C64794E-EF73-47B1-9AB0-F3ADB03E5E03}barang', 511),
	(9, '{3C64794E-EF73-47B1-9AB0-F3ADB03E5E03}barangnew', 511),
	(9, '{3C64794E-EF73-47B1-9AB0-F3ADB03E5E03}berita', 511),
	(9, '{3C64794E-EF73-47B1-9AB0-F3ADB03E5E03}bulan', 511),
	(9, '{3C64794E-EF73-47B1-9AB0-F3ADB03E5E03}daftarbarang', 511),
	(9, '{3C64794E-EF73-47B1-9AB0-F3ADB03E5E03}dinasluar', 511),
	(9, '{3C64794E-EF73-47B1-9AB0-F3ADB03E5E03}gaji', 511),
	(9, '{3C64794E-EF73-47B1-9AB0-F3ADB03E5E03}gajisd', 511),
	(9, '{3C64794E-EF73-47B1-9AB0-F3ADB03E5E03}gajisd_detil', 511),
	(9, '{3C64794E-EF73-47B1-9AB0-F3ADB03E5E03}gajisma', 511),
	(9, '{3C64794E-EF73-47B1-9AB0-F3ADB03E5E03}gajisma_detil', 511),
	(9, '{3C64794E-EF73-47B1-9AB0-F3ADB03E5E03}gajismk', 511),
	(9, '{3C64794E-EF73-47B1-9AB0-F3ADB03E5E03}gajismk_detil', 511),
	(9, '{3C64794E-EF73-47B1-9AB0-F3ADB03E5E03}gajismp', 511),
	(9, '{3C64794E-EF73-47B1-9AB0-F3ADB03E5E03}gajismp_detil', 511),
	(9, '{3C64794E-EF73-47B1-9AB0-F3ADB03E5E03}gajitk', 496),
	(9, '{3C64794E-EF73-47B1-9AB0-F3ADB03E5E03}gajitk_detil', 511),
	(9, '{3C64794E-EF73-47B1-9AB0-F3ADB03E5E03}gajitunjangan', 511),
	(9, '{3C64794E-EF73-47B1-9AB0-F3ADB03E5E03}gaji_karyawan_sd', 511),
	(9, '{3C64794E-EF73-47B1-9AB0-F3ADB03E5E03}gaji_karyawan_sma', 496),
	(9, '{3C64794E-EF73-47B1-9AB0-F3ADB03E5E03}gaji_karyawan_smk', 496),
	(9, '{3C64794E-EF73-47B1-9AB0-F3ADB03E5E03}gaji_karyawan_smp', 496),
	(9, '{3C64794E-EF73-47B1-9AB0-F3ADB03E5E03}gaji_karyawan_tk', 496),
	(9, '{3C64794E-EF73-47B1-9AB0-F3ADB03E5E03}gaji_pokok', 511),
	(9, '{3C64794E-EF73-47B1-9AB0-F3ADB03E5E03}gaji_pokok_kayawan', 0),
	(9, '{3C64794E-EF73-47B1-9AB0-F3ADB03E5E03}gaji_pokok_tu', 496),
	(9, '{3C64794E-EF73-47B1-9AB0-F3ADB03E5E03}gaji_sma', 496),
	(9, '{3C64794E-EF73-47B1-9AB0-F3ADB03E5E03}gaji_smk', 496),
	(9, '{3C64794E-EF73-47B1-9AB0-F3ADB03E5E03}gaji_smp', 496),
	(9, '{3C64794E-EF73-47B1-9AB0-F3ADB03E5E03}gaji_tk', 496),
	(9, '{3C64794E-EF73-47B1-9AB0-F3ADB03E5E03}gaji_tu_sd', 511),
	(9, '{3C64794E-EF73-47B1-9AB0-F3ADB03E5E03}gaji_tu_sma', 496),
	(9, '{3C64794E-EF73-47B1-9AB0-F3ADB03E5E03}gaji_tu_smk', 496),
	(9, '{3C64794E-EF73-47B1-9AB0-F3ADB03E5E03}gaji_tu_smp', 496),
	(9, '{3C64794E-EF73-47B1-9AB0-F3ADB03E5E03}gaji_tu_tk', 508),
	(9, '{3C64794E-EF73-47B1-9AB0-F3ADB03E5E03}gender', 511),
	(9, '{3C64794E-EF73-47B1-9AB0-F3ADB03E5E03}generate_pertahun', 0),
	(9, '{3C64794E-EF73-47B1-9AB0-F3ADB03E5E03}generate_pertahun_sd', 495),
	(9, '{3C64794E-EF73-47B1-9AB0-F3ADB03E5E03}generate_pertahun_smk', 0),
	(9, '{3C64794E-EF73-47B1-9AB0-F3ADB03E5E03}generate_pertahun_smp', 0),
	(9, '{3C64794E-EF73-47B1-9AB0-F3ADB03E5E03}generate_pertahun_tk', 0),
	(9, '{3C64794E-EF73-47B1-9AB0-F3ADB03E5E03}hapus_barang', 511),
	(9, '{3C64794E-EF73-47B1-9AB0-F3ADB03E5E03}hapus_barangnew', 511),
	(9, '{3C64794E-EF73-47B1-9AB0-F3ADB03E5E03}home.php', 495),
	(9, '{3C64794E-EF73-47B1-9AB0-F3ADB03E5E03}ijazah', 511),
	(9, '{3C64794E-EF73-47B1-9AB0-F3ADB03E5E03}ijin', 511),
	(9, '{3C64794E-EF73-47B1-9AB0-F3ADB03E5E03}jabatan', 511),
	(9, '{3C64794E-EF73-47B1-9AB0-F3ADB03E5E03}jenis_barang', 511),
	(9, '{3C64794E-EF73-47B1-9AB0-F3ADB03E5E03}jenis_dinasluar', 511),
	(9, '{3C64794E-EF73-47B1-9AB0-F3ADB03E5E03}jenis_grup_berita', 511),
	(9, '{3C64794E-EF73-47B1-9AB0-F3ADB03E5E03}jenis_grup_ilmu', 511),
	(9, '{3C64794E-EF73-47B1-9AB0-F3ADB03E5E03}jenis_ijin', 511),
	(9, '{3C64794E-EF73-47B1-9AB0-F3ADB03E5E03}jenis_jabatan', 511),
	(9, '{3C64794E-EF73-47B1-9AB0-F3ADB03E5E03}jenis_lembur', 511),
	(9, '{3C64794E-EF73-47B1-9AB0-F3ADB03E5E03}komentar', 511),
	(9, '{3C64794E-EF73-47B1-9AB0-F3ADB03E5E03}lembur', 511),
	(9, '{3C64794E-EF73-47B1-9AB0-F3ADB03E5E03}mpendidikan', 511),
	(9, '{3C64794E-EF73-47B1-9AB0-F3ADB03E5E03}m_bpjs', 511),
	(9, '{3C64794E-EF73-47B1-9AB0-F3ADB03E5E03}m_inval', 495),
	(9, '{3C64794E-EF73-47B1-9AB0-F3ADB03E5E03}m_karyawan_sd', 511),
	(9, '{3C64794E-EF73-47B1-9AB0-F3ADB03E5E03}m_karyawan_sma', 240),
	(9, '{3C64794E-EF73-47B1-9AB0-F3ADB03E5E03}m_karyawan_smk', 240),
	(9, '{3C64794E-EF73-47B1-9AB0-F3ADB03E5E03}m_karyawan_smp', 240),
	(9, '{3C64794E-EF73-47B1-9AB0-F3ADB03E5E03}m_karyawan_tk', 240),
	(9, '{3C64794E-EF73-47B1-9AB0-F3ADB03E5E03}m_kehadiran', 511),
	(9, '{3C64794E-EF73-47B1-9AB0-F3ADB03E5E03}m_lembur', 0),
	(9, '{3C64794E-EF73-47B1-9AB0-F3ADB03E5E03}m_penyesuaian', 495),
	(9, '{3C64794E-EF73-47B1-9AB0-F3ADB03E5E03}m_piket', 511),
	(9, '{3C64794E-EF73-47B1-9AB0-F3ADB03E5E03}m_pulangcepat', 511),
	(9, '{3C64794E-EF73-47B1-9AB0-F3ADB03E5E03}m_sakit', 511),
	(9, '{3C64794E-EF73-47B1-9AB0-F3ADB03E5E03}m_sd', 511),
	(9, '{3C64794E-EF73-47B1-9AB0-F3ADB03E5E03}m_sma', 208),
	(9, '{3C64794E-EF73-47B1-9AB0-F3ADB03E5E03}m_smk', 208),
	(9, '{3C64794E-EF73-47B1-9AB0-F3ADB03E5E03}m_smp', 208),
	(9, '{3C64794E-EF73-47B1-9AB0-F3ADB03E5E03}m_tidakhadir', 511),
	(9, '{3C64794E-EF73-47B1-9AB0-F3ADB03E5E03}m_tk', 208),
	(9, '{3C64794E-EF73-47B1-9AB0-F3ADB03E5E03}m_tu_sd', 511),
	(9, '{3C64794E-EF73-47B1-9AB0-F3ADB03E5E03}m_tu_sma', 496),
	(9, '{3C64794E-EF73-47B1-9AB0-F3ADB03E5E03}m_tu_smk', 496),
	(9, '{3C64794E-EF73-47B1-9AB0-F3ADB03E5E03}m_tu_smp', 496),
	(9, '{3C64794E-EF73-47B1-9AB0-F3ADB03E5E03}m_tu_tk', 496),
	(9, '{3C64794E-EF73-47B1-9AB0-F3ADB03E5E03}pegawai', 511),
	(9, '{3C64794E-EF73-47B1-9AB0-F3ADB03E5E03}peg_dokumen', 511),
	(9, '{3C64794E-EF73-47B1-9AB0-F3ADB03E5E03}peg_keluarga', 511),
	(9, '{3C64794E-EF73-47B1-9AB0-F3ADB03E5E03}peg_skill', 511),
	(9, '{3C64794E-EF73-47B1-9AB0-F3ADB03E5E03}penempatan', 511),
	(9, '{3C64794E-EF73-47B1-9AB0-F3ADB03E5E03}pengetahuan', 511),
	(9, '{3C64794E-EF73-47B1-9AB0-F3ADB03E5E03}penyesuaian', 495),
	(9, '{3C64794E-EF73-47B1-9AB0-F3ADB03E5E03}potongan_sd', 511),
	(9, '{3C64794E-EF73-47B1-9AB0-F3ADB03E5E03}potongan_sma', 496),
	(9, '{3C64794E-EF73-47B1-9AB0-F3ADB03E5E03}potongan_smk', 496),
	(9, '{3C64794E-EF73-47B1-9AB0-F3ADB03E5E03}potongan_smp', 496),
	(9, '{3C64794E-EF73-47B1-9AB0-F3ADB03E5E03}potongan_tk', 496),
	(9, '{3C64794E-EF73-47B1-9AB0-F3ADB03E5E03}proyek', 511),
	(9, '{3C64794E-EF73-47B1-9AB0-F3ADB03E5E03}reimbursh', 511),
	(9, '{3C64794E-EF73-47B1-9AB0-F3ADB03E5E03}sertif', 511),
	(9, '{3C64794E-EF73-47B1-9AB0-F3ADB03E5E03}setuju', 511),
	(9, '{3C64794E-EF73-47B1-9AB0-F3ADB03E5E03}tambahan_tugas', 511),
	(9, '{3C64794E-EF73-47B1-9AB0-F3ADB03E5E03}terlambat', 511),
	(9, '{3C64794E-EF73-47B1-9AB0-F3ADB03E5E03}testtable', 511),
	(9, '{3C64794E-EF73-47B1-9AB0-F3ADB03E5E03}test_api.php', 511),
	(9, '{3C64794E-EF73-47B1-9AB0-F3ADB03E5E03}totalgaji', 0),
	(9, '{3C64794E-EF73-47B1-9AB0-F3ADB03E5E03}tpendidikan', 511),
	(9, '{3C64794E-EF73-47B1-9AB0-F3ADB03E5E03}tunjangan_berkala', 511),
	(9, '{3C64794E-EF73-47B1-9AB0-F3ADB03E5E03}tunjangan_tambahan', 511),
	(9, '{3C64794E-EF73-47B1-9AB0-F3ADB03E5E03}uangmuka', 0),
	(9, '{3C64794E-EF73-47B1-9AB0-F3ADB03E5E03}userlevelpermissions', 0),
	(9, '{3C64794E-EF73-47B1-9AB0-F3ADB03E5E03}userlevels', 0),
	(9, '{3C64794E-EF73-47B1-9AB0-F3ADB03E5E03}v_gajisd', 0),
	(9, '{3C64794E-EF73-47B1-9AB0-F3ADB03E5E03}v_gajisma', 0),
	(9, '{3C64794E-EF73-47B1-9AB0-F3ADB03E5E03}v_gaji_guru_smk', 0),
	(9, '{3C64794E-EF73-47B1-9AB0-F3ADB03E5E03}v_gaji_karyawan_sd', 0),
	(9, '{3C64794E-EF73-47B1-9AB0-F3ADB03E5E03}v_gaji_karyawan_sma', 0),
	(9, '{3C64794E-EF73-47B1-9AB0-F3ADB03E5E03}v_gaji_karyawan_smk', 0),
	(9, '{3C64794E-EF73-47B1-9AB0-F3ADB03E5E03}v_gaji_karyawan_smp', 0),
	(9, '{3C64794E-EF73-47B1-9AB0-F3ADB03E5E03}v_gaji_karyawan_tk', 0),
	(9, '{3C64794E-EF73-47B1-9AB0-F3ADB03E5E03}v_gaji_smp', 0),
	(9, '{3C64794E-EF73-47B1-9AB0-F3ADB03E5E03}v_gaji_tk', 0),
	(9, '{3C64794E-EF73-47B1-9AB0-F3ADB03E5E03}v_gaji_tu_sd', 495),
	(9, '{3C64794E-EF73-47B1-9AB0-F3ADB03E5E03}v_gaji_tu_sma', 0),
	(9, '{3C64794E-EF73-47B1-9AB0-F3ADB03E5E03}v_gaji_tu_smk', 0),
	(9, '{3C64794E-EF73-47B1-9AB0-F3ADB03E5E03}v_gaji_tu_smp', 0),
	(9, '{3C64794E-EF73-47B1-9AB0-F3ADB03E5E03}v_gaji_tu_tk', 0),
	(9, '{3C64794E-EF73-47B1-9AB0-F3ADB03E5E03}v_karyawan_sd', 0),
	(9, '{3C64794E-EF73-47B1-9AB0-F3ADB03E5E03}v_karyawan_sma', 0),
	(9, '{3C64794E-EF73-47B1-9AB0-F3ADB03E5E03}v_karyawan_smk', 0),
	(9, '{3C64794E-EF73-47B1-9AB0-F3ADB03E5E03}v_karyawan_smp', 0),
	(9, '{3C64794E-EF73-47B1-9AB0-F3ADB03E5E03}v_karyawan_tk', 0),
	(9, '{3C64794E-EF73-47B1-9AB0-F3ADB03E5E03}v_m_sd', 0),
	(9, '{3C64794E-EF73-47B1-9AB0-F3ADB03E5E03}v_m_sma', 0),
	(9, '{3C64794E-EF73-47B1-9AB0-F3ADB03E5E03}v_m_smk', 0),
	(9, '{3C64794E-EF73-47B1-9AB0-F3ADB03E5E03}v_m_smp', 0),
	(9, '{3C64794E-EF73-47B1-9AB0-F3ADB03E5E03}v_m_tk', 0),
	(9, '{3C64794E-EF73-47B1-9AB0-F3ADB03E5E03}v_totalgaji', 511),
	(9, '{3C64794E-EF73-47B1-9AB0-F3ADB03E5E03}v_totalgajikaryawan', 0),
	(9, '{3C64794E-EF73-47B1-9AB0-F3ADB03E5E03}v_totalgajikaryawansma', 0),
	(9, '{3C64794E-EF73-47B1-9AB0-F3ADB03E5E03}v_totalgajikaryawansmk', 0),
	(9, '{3C64794E-EF73-47B1-9AB0-F3ADB03E5E03}v_totalgajikaryawansmp', 0),
	(9, '{3C64794E-EF73-47B1-9AB0-F3ADB03E5E03}v_totalgajikaryawantk', 0),
	(9, '{3C64794E-EF73-47B1-9AB0-F3ADB03E5E03}v_totalgajisma', 0),
	(9, '{3C64794E-EF73-47B1-9AB0-F3ADB03E5E03}v_totalgajismk', 0),
	(9, '{3C64794E-EF73-47B1-9AB0-F3ADB03E5E03}v_totalgajismp', 0),
	(9, '{3C64794E-EF73-47B1-9AB0-F3ADB03E5E03}v_totalgajitk', 496),
	(9, '{3C64794E-EF73-47B1-9AB0-F3ADB03E5E03}v_totalgajitu', 0),
	(9, '{3C64794E-EF73-47B1-9AB0-F3ADB03E5E03}v_totalgajitusma', 0),
	(9, '{3C64794E-EF73-47B1-9AB0-F3ADB03E5E03}v_totalgajitusmk', 0),
	(9, '{3C64794E-EF73-47B1-9AB0-F3ADB03E5E03}v_totalgajitusmp', 0),
	(9, '{3C64794E-EF73-47B1-9AB0-F3ADB03E5E03}v_totalgajitutk', 0),
	(9, '{3C64794E-EF73-47B1-9AB0-F3ADB03E5E03}v_tu_sd', 0),
	(9, '{3C64794E-EF73-47B1-9AB0-F3ADB03E5E03}v_tu_sma', 0),
	(9, '{3C64794E-EF73-47B1-9AB0-F3ADB03E5E03}v_tu_smk', 0),
	(9, '{3C64794E-EF73-47B1-9AB0-F3ADB03E5E03}v_tu_smp', 0),
	(9, '{3C64794E-EF73-47B1-9AB0-F3ADB03E5E03}v_tu_tk', 0),
	(10, '{3C64794E-EF73-47B1-9AB0-F3ADB03E5E03}absen', 367),
	(10, '{3C64794E-EF73-47B1-9AB0-F3ADB03E5E03}absen_detil', 367),
	(10, '{3C64794E-EF73-47B1-9AB0-F3ADB03E5E03}agama', 367),
	(10, '{3C64794E-EF73-47B1-9AB0-F3ADB03E5E03}audittrail', 367),
	(10, '{3C64794E-EF73-47B1-9AB0-F3ADB03E5E03}barang', 367),
	(10, '{3C64794E-EF73-47B1-9AB0-F3ADB03E5E03}barangnew', 367),
	(10, '{3C64794E-EF73-47B1-9AB0-F3ADB03E5E03}berita', 367),
	(10, '{3C64794E-EF73-47B1-9AB0-F3ADB03E5E03}bulan', 367),
	(10, '{3C64794E-EF73-47B1-9AB0-F3ADB03E5E03}daftarbarang', 367),
	(10, '{3C64794E-EF73-47B1-9AB0-F3ADB03E5E03}dinasluar', 367),
	(10, '{3C64794E-EF73-47B1-9AB0-F3ADB03E5E03}gaji', 352),
	(10, '{3C64794E-EF73-47B1-9AB0-F3ADB03E5E03}gajisd', 359),
	(10, '{3C64794E-EF73-47B1-9AB0-F3ADB03E5E03}gajisd_detil', 359),
	(10, '{3C64794E-EF73-47B1-9AB0-F3ADB03E5E03}gajisma', 367),
	(10, '{3C64794E-EF73-47B1-9AB0-F3ADB03E5E03}gajisma_detil', 367),
	(10, '{3C64794E-EF73-47B1-9AB0-F3ADB03E5E03}gajismk', 367),
	(10, '{3C64794E-EF73-47B1-9AB0-F3ADB03E5E03}gajismk_detil', 367),
	(10, '{3C64794E-EF73-47B1-9AB0-F3ADB03E5E03}gajismp', 367),
	(10, '{3C64794E-EF73-47B1-9AB0-F3ADB03E5E03}gajismp_detil', 367),
	(10, '{3C64794E-EF73-47B1-9AB0-F3ADB03E5E03}gajitk', 367),
	(10, '{3C64794E-EF73-47B1-9AB0-F3ADB03E5E03}gajitk_detil', 367),
	(10, '{3C64794E-EF73-47B1-9AB0-F3ADB03E5E03}gajitunjangan', 367),
	(10, '{3C64794E-EF73-47B1-9AB0-F3ADB03E5E03}gaji_karyawan_sd', 359),
	(10, '{3C64794E-EF73-47B1-9AB0-F3ADB03E5E03}gaji_karyawan_sma', 359),
	(10, '{3C64794E-EF73-47B1-9AB0-F3ADB03E5E03}gaji_karyawan_smk', 359),
	(10, '{3C64794E-EF73-47B1-9AB0-F3ADB03E5E03}gaji_karyawan_smp', 367),
	(10, '{3C64794E-EF73-47B1-9AB0-F3ADB03E5E03}gaji_karyawan_tk', 359),
	(10, '{3C64794E-EF73-47B1-9AB0-F3ADB03E5E03}gaji_pokok', 367),
	(10, '{3C64794E-EF73-47B1-9AB0-F3ADB03E5E03}gaji_pokok_kayawan', 367),
	(10, '{3C64794E-EF73-47B1-9AB0-F3ADB03E5E03}gaji_pokok_tu', 367),
	(10, '{3C64794E-EF73-47B1-9AB0-F3ADB03E5E03}gaji_sma', 359),
	(10, '{3C64794E-EF73-47B1-9AB0-F3ADB03E5E03}gaji_smk', 359),
	(10, '{3C64794E-EF73-47B1-9AB0-F3ADB03E5E03}gaji_smp', 367),
	(10, '{3C64794E-EF73-47B1-9AB0-F3ADB03E5E03}gaji_tk', 359),
	(10, '{3C64794E-EF73-47B1-9AB0-F3ADB03E5E03}gaji_tu_sd', 359),
	(10, '{3C64794E-EF73-47B1-9AB0-F3ADB03E5E03}gaji_tu_sma', 367),
	(10, '{3C64794E-EF73-47B1-9AB0-F3ADB03E5E03}gaji_tu_smk', 367),
	(10, '{3C64794E-EF73-47B1-9AB0-F3ADB03E5E03}gaji_tu_smp', 367),
	(10, '{3C64794E-EF73-47B1-9AB0-F3ADB03E5E03}gaji_tu_tk', 367),
	(10, '{3C64794E-EF73-47B1-9AB0-F3ADB03E5E03}gender', 367),
	(10, '{3C64794E-EF73-47B1-9AB0-F3ADB03E5E03}generate_pertahun', 0),
	(10, '{3C64794E-EF73-47B1-9AB0-F3ADB03E5E03}generate_pertahun_sd', 0),
	(10, '{3C64794E-EF73-47B1-9AB0-F3ADB03E5E03}generate_pertahun_smk', 0),
	(10, '{3C64794E-EF73-47B1-9AB0-F3ADB03E5E03}generate_pertahun_smp', 495),
	(10, '{3C64794E-EF73-47B1-9AB0-F3ADB03E5E03}generate_pertahun_tk', 0),
	(10, '{3C64794E-EF73-47B1-9AB0-F3ADB03E5E03}hapus_barang', 367),
	(10, '{3C64794E-EF73-47B1-9AB0-F3ADB03E5E03}hapus_barangnew', 367),
	(10, '{3C64794E-EF73-47B1-9AB0-F3ADB03E5E03}home.php', 495),
	(10, '{3C64794E-EF73-47B1-9AB0-F3ADB03E5E03}ijazah', 367),
	(10, '{3C64794E-EF73-47B1-9AB0-F3ADB03E5E03}ijin', 367),
	(10, '{3C64794E-EF73-47B1-9AB0-F3ADB03E5E03}jabatan', 367),
	(10, '{3C64794E-EF73-47B1-9AB0-F3ADB03E5E03}jenis_barang', 367),
	(10, '{3C64794E-EF73-47B1-9AB0-F3ADB03E5E03}jenis_dinasluar', 367),
	(10, '{3C64794E-EF73-47B1-9AB0-F3ADB03E5E03}jenis_grup_berita', 367),
	(10, '{3C64794E-EF73-47B1-9AB0-F3ADB03E5E03}jenis_grup_ilmu', 367),
	(10, '{3C64794E-EF73-47B1-9AB0-F3ADB03E5E03}jenis_ijin', 367),
	(10, '{3C64794E-EF73-47B1-9AB0-F3ADB03E5E03}jenis_jabatan', 367),
	(10, '{3C64794E-EF73-47B1-9AB0-F3ADB03E5E03}jenis_lembur', 367),
	(10, '{3C64794E-EF73-47B1-9AB0-F3ADB03E5E03}komentar', 367),
	(10, '{3C64794E-EF73-47B1-9AB0-F3ADB03E5E03}lembur', 367),
	(10, '{3C64794E-EF73-47B1-9AB0-F3ADB03E5E03}mpendidikan', 367),
	(10, '{3C64794E-EF73-47B1-9AB0-F3ADB03E5E03}m_bpjs', 367),
	(10, '{3C64794E-EF73-47B1-9AB0-F3ADB03E5E03}m_inval', 495),
	(10, '{3C64794E-EF73-47B1-9AB0-F3ADB03E5E03}m_karyawan_sd', 359),
	(10, '{3C64794E-EF73-47B1-9AB0-F3ADB03E5E03}m_karyawan_sma', 359),
	(10, '{3C64794E-EF73-47B1-9AB0-F3ADB03E5E03}m_karyawan_smk', 359),
	(10, '{3C64794E-EF73-47B1-9AB0-F3ADB03E5E03}m_karyawan_smp', 367),
	(10, '{3C64794E-EF73-47B1-9AB0-F3ADB03E5E03}m_karyawan_tk', 359),
	(10, '{3C64794E-EF73-47B1-9AB0-F3ADB03E5E03}m_kehadiran', 367),
	(10, '{3C64794E-EF73-47B1-9AB0-F3ADB03E5E03}m_lembur', 367),
	(10, '{3C64794E-EF73-47B1-9AB0-F3ADB03E5E03}m_penyesuaian', 495),
	(10, '{3C64794E-EF73-47B1-9AB0-F3ADB03E5E03}m_piket', 367),
	(10, '{3C64794E-EF73-47B1-9AB0-F3ADB03E5E03}m_pulangcepat', 367),
	(10, '{3C64794E-EF73-47B1-9AB0-F3ADB03E5E03}m_sakit', 367),
	(10, '{3C64794E-EF73-47B1-9AB0-F3ADB03E5E03}m_sd', 359),
	(10, '{3C64794E-EF73-47B1-9AB0-F3ADB03E5E03}m_sma', 358),
	(10, '{3C64794E-EF73-47B1-9AB0-F3ADB03E5E03}m_smk', 359),
	(10, '{3C64794E-EF73-47B1-9AB0-F3ADB03E5E03}m_smp', 367),
	(10, '{3C64794E-EF73-47B1-9AB0-F3ADB03E5E03}m_tidakhadir', 367),
	(10, '{3C64794E-EF73-47B1-9AB0-F3ADB03E5E03}m_tk', 359),
	(10, '{3C64794E-EF73-47B1-9AB0-F3ADB03E5E03}m_tu_sd', 359),
	(10, '{3C64794E-EF73-47B1-9AB0-F3ADB03E5E03}m_tu_sma', 359),
	(10, '{3C64794E-EF73-47B1-9AB0-F3ADB03E5E03}m_tu_smk', 359),
	(10, '{3C64794E-EF73-47B1-9AB0-F3ADB03E5E03}m_tu_smp', 367),
	(10, '{3C64794E-EF73-47B1-9AB0-F3ADB03E5E03}m_tu_tk', 359),
	(10, '{3C64794E-EF73-47B1-9AB0-F3ADB03E5E03}pegawai', 359),
	(10, '{3C64794E-EF73-47B1-9AB0-F3ADB03E5E03}peg_dokumen', 367),
	(10, '{3C64794E-EF73-47B1-9AB0-F3ADB03E5E03}peg_keluarga', 367),
	(10, '{3C64794E-EF73-47B1-9AB0-F3ADB03E5E03}peg_skill', 367),
	(10, '{3C64794E-EF73-47B1-9AB0-F3ADB03E5E03}penempatan', 367),
	(10, '{3C64794E-EF73-47B1-9AB0-F3ADB03E5E03}pengetahuan', 367),
	(10, '{3C64794E-EF73-47B1-9AB0-F3ADB03E5E03}penyesuaian', 495),
	(10, '{3C64794E-EF73-47B1-9AB0-F3ADB03E5E03}potongan_sd', 359),
	(10, '{3C64794E-EF73-47B1-9AB0-F3ADB03E5E03}potongan_sma', 359),
	(10, '{3C64794E-EF73-47B1-9AB0-F3ADB03E5E03}potongan_smk', 359),
	(10, '{3C64794E-EF73-47B1-9AB0-F3ADB03E5E03}potongan_smp', 367),
	(10, '{3C64794E-EF73-47B1-9AB0-F3ADB03E5E03}potongan_tk', 359),
	(10, '{3C64794E-EF73-47B1-9AB0-F3ADB03E5E03}proyek', 367),
	(10, '{3C64794E-EF73-47B1-9AB0-F3ADB03E5E03}reimbursh', 367),
	(10, '{3C64794E-EF73-47B1-9AB0-F3ADB03E5E03}sertif', 367),
	(10, '{3C64794E-EF73-47B1-9AB0-F3ADB03E5E03}setuju', 367),
	(10, '{3C64794E-EF73-47B1-9AB0-F3ADB03E5E03}tambahan_tugas', 367),
	(10, '{3C64794E-EF73-47B1-9AB0-F3ADB03E5E03}terlambat', 367),
	(10, '{3C64794E-EF73-47B1-9AB0-F3ADB03E5E03}testtable', 367),
	(10, '{3C64794E-EF73-47B1-9AB0-F3ADB03E5E03}test_api.php', 367),
	(10, '{3C64794E-EF73-47B1-9AB0-F3ADB03E5E03}totalgaji', 367),
	(10, '{3C64794E-EF73-47B1-9AB0-F3ADB03E5E03}tpendidikan', 367),
	(10, '{3C64794E-EF73-47B1-9AB0-F3ADB03E5E03}tunjangan_berkala', 367),
	(10, '{3C64794E-EF73-47B1-9AB0-F3ADB03E5E03}tunjangan_tambahan', 367),
	(10, '{3C64794E-EF73-47B1-9AB0-F3ADB03E5E03}uangmuka', 367),
	(10, '{3C64794E-EF73-47B1-9AB0-F3ADB03E5E03}userlevelpermissions', 359),
	(10, '{3C64794E-EF73-47B1-9AB0-F3ADB03E5E03}userlevels', 359),
	(10, '{3C64794E-EF73-47B1-9AB0-F3ADB03E5E03}v_gajisd', 0),
	(10, '{3C64794E-EF73-47B1-9AB0-F3ADB03E5E03}v_gajisma', 0),
	(10, '{3C64794E-EF73-47B1-9AB0-F3ADB03E5E03}v_gaji_guru_smk', 0),
	(10, '{3C64794E-EF73-47B1-9AB0-F3ADB03E5E03}v_gaji_karyawan_sd', 0),
	(10, '{3C64794E-EF73-47B1-9AB0-F3ADB03E5E03}v_gaji_karyawan_sma', 0),
	(10, '{3C64794E-EF73-47B1-9AB0-F3ADB03E5E03}v_gaji_karyawan_smk', 0),
	(10, '{3C64794E-EF73-47B1-9AB0-F3ADB03E5E03}v_gaji_karyawan_smp', 0),
	(10, '{3C64794E-EF73-47B1-9AB0-F3ADB03E5E03}v_gaji_karyawan_tk', 0),
	(10, '{3C64794E-EF73-47B1-9AB0-F3ADB03E5E03}v_gaji_smp', 0),
	(10, '{3C64794E-EF73-47B1-9AB0-F3ADB03E5E03}v_gaji_tk', 0),
	(10, '{3C64794E-EF73-47B1-9AB0-F3ADB03E5E03}v_gaji_tu_sd', 0),
	(10, '{3C64794E-EF73-47B1-9AB0-F3ADB03E5E03}v_gaji_tu_sma', 0),
	(10, '{3C64794E-EF73-47B1-9AB0-F3ADB03E5E03}v_gaji_tu_smk', 0),
	(10, '{3C64794E-EF73-47B1-9AB0-F3ADB03E5E03}v_gaji_tu_smp', 0),
	(10, '{3C64794E-EF73-47B1-9AB0-F3ADB03E5E03}v_gaji_tu_tk', 0),
	(10, '{3C64794E-EF73-47B1-9AB0-F3ADB03E5E03}v_karyawan_sd', 0),
	(10, '{3C64794E-EF73-47B1-9AB0-F3ADB03E5E03}v_karyawan_sma', 0),
	(10, '{3C64794E-EF73-47B1-9AB0-F3ADB03E5E03}v_karyawan_smk', 0),
	(10, '{3C64794E-EF73-47B1-9AB0-F3ADB03E5E03}v_karyawan_smp', 0),
	(10, '{3C64794E-EF73-47B1-9AB0-F3ADB03E5E03}v_karyawan_tk', 0),
	(10, '{3C64794E-EF73-47B1-9AB0-F3ADB03E5E03}v_m_sd', 0),
	(10, '{3C64794E-EF73-47B1-9AB0-F3ADB03E5E03}v_m_sma', 0),
	(10, '{3C64794E-EF73-47B1-9AB0-F3ADB03E5E03}v_m_smk', 0),
	(10, '{3C64794E-EF73-47B1-9AB0-F3ADB03E5E03}v_m_smp', 0),
	(10, '{3C64794E-EF73-47B1-9AB0-F3ADB03E5E03}v_m_tk', 0),
	(10, '{3C64794E-EF73-47B1-9AB0-F3ADB03E5E03}v_totalgaji', 359),
	(10, '{3C64794E-EF73-47B1-9AB0-F3ADB03E5E03}v_totalgajikaryawan', 359),
	(10, '{3C64794E-EF73-47B1-9AB0-F3ADB03E5E03}v_totalgajikaryawansma', 359),
	(10, '{3C64794E-EF73-47B1-9AB0-F3ADB03E5E03}v_totalgajikaryawansmk', 359),
	(10, '{3C64794E-EF73-47B1-9AB0-F3ADB03E5E03}v_totalgajikaryawansmp', 367),
	(10, '{3C64794E-EF73-47B1-9AB0-F3ADB03E5E03}v_totalgajikaryawantk', 359),
	(10, '{3C64794E-EF73-47B1-9AB0-F3ADB03E5E03}v_totalgajisma', 359),
	(10, '{3C64794E-EF73-47B1-9AB0-F3ADB03E5E03}v_totalgajismk', 359),
	(10, '{3C64794E-EF73-47B1-9AB0-F3ADB03E5E03}v_totalgajismp', 367),
	(10, '{3C64794E-EF73-47B1-9AB0-F3ADB03E5E03}v_totalgajitk', 359),
	(10, '{3C64794E-EF73-47B1-9AB0-F3ADB03E5E03}v_totalgajitu', 359),
	(10, '{3C64794E-EF73-47B1-9AB0-F3ADB03E5E03}v_totalgajitusma', 359),
	(10, '{3C64794E-EF73-47B1-9AB0-F3ADB03E5E03}v_totalgajitusmk', 359),
	(10, '{3C64794E-EF73-47B1-9AB0-F3ADB03E5E03}v_totalgajitusmp', 367),
	(10, '{3C64794E-EF73-47B1-9AB0-F3ADB03E5E03}v_totalgajitutk', 359),
	(10, '{3C64794E-EF73-47B1-9AB0-F3ADB03E5E03}v_tu_sd', 0),
	(10, '{3C64794E-EF73-47B1-9AB0-F3ADB03E5E03}v_tu_sma', 0),
	(10, '{3C64794E-EF73-47B1-9AB0-F3ADB03E5E03}v_tu_smk', 0),
	(10, '{3C64794E-EF73-47B1-9AB0-F3ADB03E5E03}v_tu_smp', 0),
	(10, '{3C64794E-EF73-47B1-9AB0-F3ADB03E5E03}v_tu_tk', 0),
	(11, '{3C64794E-EF73-47B1-9AB0-F3ADB03E5E03}absen', 367),
	(11, '{3C64794E-EF73-47B1-9AB0-F3ADB03E5E03}absen_detil', 367),
	(11, '{3C64794E-EF73-47B1-9AB0-F3ADB03E5E03}agama', 367),
	(11, '{3C64794E-EF73-47B1-9AB0-F3ADB03E5E03}audittrail', 367),
	(11, '{3C64794E-EF73-47B1-9AB0-F3ADB03E5E03}backup_restore.php', 256),
	(11, '{3C64794E-EF73-47B1-9AB0-F3ADB03E5E03}barang', 367),
	(11, '{3C64794E-EF73-47B1-9AB0-F3ADB03E5E03}barangnew', 367),
	(11, '{3C64794E-EF73-47B1-9AB0-F3ADB03E5E03}berita', 367),
	(11, '{3C64794E-EF73-47B1-9AB0-F3ADB03E5E03}bulan', 367),
	(11, '{3C64794E-EF73-47B1-9AB0-F3ADB03E5E03}coba.php', 256),
	(11, '{3C64794E-EF73-47B1-9AB0-F3ADB03E5E03}custom_file.php', 256),
	(11, '{3C64794E-EF73-47B1-9AB0-F3ADB03E5E03}daftarbarang', 367),
	(11, '{3C64794E-EF73-47B1-9AB0-F3ADB03E5E03}dinasluar', 355),
	(11, '{3C64794E-EF73-47B1-9AB0-F3ADB03E5E03}export_excel.php', 256),
	(11, '{3C64794E-EF73-47B1-9AB0-F3ADB03E5E03}export_file_sma.php', 256),
	(11, '{3C64794E-EF73-47B1-9AB0-F3ADB03E5E03}export_tu_sma.php', 256),
	(11, '{3C64794E-EF73-47B1-9AB0-F3ADB03E5E03}gaji', 359),
	(11, '{3C64794E-EF73-47B1-9AB0-F3ADB03E5E03}gajisd', 359),
	(11, '{3C64794E-EF73-47B1-9AB0-F3ADB03E5E03}gajisd_detil', 359),
	(11, '{3C64794E-EF73-47B1-9AB0-F3ADB03E5E03}gajisma', 367),
	(11, '{3C64794E-EF73-47B1-9AB0-F3ADB03E5E03}gajisma_detil', 367),
	(11, '{3C64794E-EF73-47B1-9AB0-F3ADB03E5E03}gajismk', 367),
	(11, '{3C64794E-EF73-47B1-9AB0-F3ADB03E5E03}gajismk_detil', 367),
	(11, '{3C64794E-EF73-47B1-9AB0-F3ADB03E5E03}gajismp', 367),
	(11, '{3C64794E-EF73-47B1-9AB0-F3ADB03E5E03}gajismp_detil', 367),
	(11, '{3C64794E-EF73-47B1-9AB0-F3ADB03E5E03}gajitk', 359),
	(11, '{3C64794E-EF73-47B1-9AB0-F3ADB03E5E03}gajitk_detil', 367),
	(11, '{3C64794E-EF73-47B1-9AB0-F3ADB03E5E03}gajitunjangan', 367),
	(11, '{3C64794E-EF73-47B1-9AB0-F3ADB03E5E03}gaji_karyawan_sd', 359),
	(11, '{3C64794E-EF73-47B1-9AB0-F3ADB03E5E03}gaji_karyawan_sma', 367),
	(11, '{3C64794E-EF73-47B1-9AB0-F3ADB03E5E03}gaji_karyawan_smk', 359),
	(11, '{3C64794E-EF73-47B1-9AB0-F3ADB03E5E03}gaji_karyawan_smp', 359),
	(11, '{3C64794E-EF73-47B1-9AB0-F3ADB03E5E03}gaji_karyawan_tk', 359),
	(11, '{3C64794E-EF73-47B1-9AB0-F3ADB03E5E03}gaji_pokok', 367),
	(11, '{3C64794E-EF73-47B1-9AB0-F3ADB03E5E03}gaji_pokok_kayawan', 367),
	(11, '{3C64794E-EF73-47B1-9AB0-F3ADB03E5E03}gaji_pokok_tu', 367),
	(11, '{3C64794E-EF73-47B1-9AB0-F3ADB03E5E03}gaji_sma', 495),
	(11, '{3C64794E-EF73-47B1-9AB0-F3ADB03E5E03}gaji_smk', 359),
	(11, '{3C64794E-EF73-47B1-9AB0-F3ADB03E5E03}gaji_smp', 359),
	(11, '{3C64794E-EF73-47B1-9AB0-F3ADB03E5E03}gaji_tk', 359),
	(11, '{3C64794E-EF73-47B1-9AB0-F3ADB03E5E03}gaji_tu_sd', 359),
	(11, '{3C64794E-EF73-47B1-9AB0-F3ADB03E5E03}gaji_tu_sma', 367),
	(11, '{3C64794E-EF73-47B1-9AB0-F3ADB03E5E03}gaji_tu_smk', 359),
	(11, '{3C64794E-EF73-47B1-9AB0-F3ADB03E5E03}gaji_tu_smp', 359),
	(11, '{3C64794E-EF73-47B1-9AB0-F3ADB03E5E03}gaji_tu_tk', 359),
	(11, '{3C64794E-EF73-47B1-9AB0-F3ADB03E5E03}gender', 367),
	(11, '{3C64794E-EF73-47B1-9AB0-F3ADB03E5E03}generate_perbulan', 256),
	(11, '{3C64794E-EF73-47B1-9AB0-F3ADB03E5E03}generate_pertahun', 495),
	(11, '{3C64794E-EF73-47B1-9AB0-F3ADB03E5E03}generate_pertahun_sd', 256),
	(11, '{3C64794E-EF73-47B1-9AB0-F3ADB03E5E03}generate_pertahun_smk', 256),
	(11, '{3C64794E-EF73-47B1-9AB0-F3ADB03E5E03}generate_pertahun_smp', 256),
	(11, '{3C64794E-EF73-47B1-9AB0-F3ADB03E5E03}generate_pertahun_tk', 256),
	(11, '{3C64794E-EF73-47B1-9AB0-F3ADB03E5E03}hapus_barang', 367),
	(11, '{3C64794E-EF73-47B1-9AB0-F3ADB03E5E03}hapus_barangnew', 367),
	(11, '{3C64794E-EF73-47B1-9AB0-F3ADB03E5E03}home.php', 495),
	(11, '{3C64794E-EF73-47B1-9AB0-F3ADB03E5E03}ijazah', 367),
	(11, '{3C64794E-EF73-47B1-9AB0-F3ADB03E5E03}ijin', 367),
	(11, '{3C64794E-EF73-47B1-9AB0-F3ADB03E5E03}jabatan', 367),
	(11, '{3C64794E-EF73-47B1-9AB0-F3ADB03E5E03}jenis_barang', 367),
	(11, '{3C64794E-EF73-47B1-9AB0-F3ADB03E5E03}jenis_dinasluar', 367),
	(11, '{3C64794E-EF73-47B1-9AB0-F3ADB03E5E03}jenis_grup_berita', 367),
	(11, '{3C64794E-EF73-47B1-9AB0-F3ADB03E5E03}jenis_grup_ilmu', 367),
	(11, '{3C64794E-EF73-47B1-9AB0-F3ADB03E5E03}jenis_ijin', 367),
	(11, '{3C64794E-EF73-47B1-9AB0-F3ADB03E5E03}jenis_jabatan', 367),
	(11, '{3C64794E-EF73-47B1-9AB0-F3ADB03E5E03}jenis_lembur', 367),
	(11, '{3C64794E-EF73-47B1-9AB0-F3ADB03E5E03}komentar', 367),
	(11, '{3C64794E-EF73-47B1-9AB0-F3ADB03E5E03}laporan_gaji_all.php', 256),
	(11, '{3C64794E-EF73-47B1-9AB0-F3ADB03E5E03}laporan_pajak_all.php', 256),
	(11, '{3C64794E-EF73-47B1-9AB0-F3ADB03E5E03}lembur', 367),
	(11, '{3C64794E-EF73-47B1-9AB0-F3ADB03E5E03}login_bendahara.php', 256),
	(11, '{3C64794E-EF73-47B1-9AB0-F3ADB03E5E03}login_pegawai.php', 256),
	(11, '{3C64794E-EF73-47B1-9AB0-F3ADB03E5E03}mpendidikan', 367),
	(11, '{3C64794E-EF73-47B1-9AB0-F3ADB03E5E03}m_bpjs', 367),
	(11, '{3C64794E-EF73-47B1-9AB0-F3ADB03E5E03}m_inval', 495),
	(11, '{3C64794E-EF73-47B1-9AB0-F3ADB03E5E03}m_iuran_hari_tua', 256),
	(11, '{3C64794E-EF73-47B1-9AB0-F3ADB03E5E03}m_jaminan_pensiun', 256),
	(11, '{3C64794E-EF73-47B1-9AB0-F3ADB03E5E03}m_jp_pegawai', 495),
	(11, '{3C64794E-EF73-47B1-9AB0-F3ADB03E5E03}m_karyawan_sd', 355),
	(11, '{3C64794E-EF73-47B1-9AB0-F3ADB03E5E03}m_karyawan_sma', 367),
	(11, '{3C64794E-EF73-47B1-9AB0-F3ADB03E5E03}m_karyawan_smk', 355),
	(11, '{3C64794E-EF73-47B1-9AB0-F3ADB03E5E03}m_karyawan_smp', 355),
	(11, '{3C64794E-EF73-47B1-9AB0-F3ADB03E5E03}m_karyawan_tk', 355),
	(11, '{3C64794E-EF73-47B1-9AB0-F3ADB03E5E03}m_kehadiran', 367),
	(11, '{3C64794E-EF73-47B1-9AB0-F3ADB03E5E03}m_lembur', 367),
	(11, '{3C64794E-EF73-47B1-9AB0-F3ADB03E5E03}m_penyesuaian', 495),
	(11, '{3C64794E-EF73-47B1-9AB0-F3ADB03E5E03}m_piket', 367),
	(11, '{3C64794E-EF73-47B1-9AB0-F3ADB03E5E03}m_potongan', 256),
	(11, '{3C64794E-EF73-47B1-9AB0-F3ADB03E5E03}m_potongan_sd', 256),
	(11, '{3C64794E-EF73-47B1-9AB0-F3ADB03E5E03}m_potongan_sma', 495),
	(11, '{3C64794E-EF73-47B1-9AB0-F3ADB03E5E03}m_potongan_smk', 256),
	(11, '{3C64794E-EF73-47B1-9AB0-F3ADB03E5E03}m_potongan_smp', 256),
	(11, '{3C64794E-EF73-47B1-9AB0-F3ADB03E5E03}m_pph21', 256),
	(11, '{3C64794E-EF73-47B1-9AB0-F3ADB03E5E03}m_pulangcepat', 367),
	(11, '{3C64794E-EF73-47B1-9AB0-F3ADB03E5E03}m_reward', 256),
	(11, '{3C64794E-EF73-47B1-9AB0-F3ADB03E5E03}m_sakit', 367),
	(11, '{3C64794E-EF73-47B1-9AB0-F3ADB03E5E03}m_sd', 355),
	(11, '{3C64794E-EF73-47B1-9AB0-F3ADB03E5E03}m_sma', 495),
	(11, '{3C64794E-EF73-47B1-9AB0-F3ADB03E5E03}m_smk', 355),
	(11, '{3C64794E-EF73-47B1-9AB0-F3ADB03E5E03}m_smp', 355),
	(11, '{3C64794E-EF73-47B1-9AB0-F3ADB03E5E03}m_tahun', 256),
	(11, '{3C64794E-EF73-47B1-9AB0-F3ADB03E5E03}m_tidakhadir', 367),
	(11, '{3C64794E-EF73-47B1-9AB0-F3ADB03E5E03}m_tk', 355),
	(11, '{3C64794E-EF73-47B1-9AB0-F3ADB03E5E03}m_tu_sd', 355),
	(11, '{3C64794E-EF73-47B1-9AB0-F3ADB03E5E03}m_tu_sma', 367),
	(11, '{3C64794E-EF73-47B1-9AB0-F3ADB03E5E03}m_tu_smk', 355),
	(11, '{3C64794E-EF73-47B1-9AB0-F3ADB03E5E03}m_tu_smp', 355),
	(11, '{3C64794E-EF73-47B1-9AB0-F3ADB03E5E03}m_tu_tk', 355),
	(11, '{3C64794E-EF73-47B1-9AB0-F3ADB03E5E03}m_yayasan', 256),
	(11, '{3C64794E-EF73-47B1-9AB0-F3ADB03E5E03}payrols.php', 256),
	(11, '{3C64794E-EF73-47B1-9AB0-F3ADB03E5E03}pegawai', 495),
	(11, '{3C64794E-EF73-47B1-9AB0-F3ADB03E5E03}peg_dokumen', 367),
	(11, '{3C64794E-EF73-47B1-9AB0-F3ADB03E5E03}peg_keluarga', 367),
	(11, '{3C64794E-EF73-47B1-9AB0-F3ADB03E5E03}peg_skill', 367),
	(11, '{3C64794E-EF73-47B1-9AB0-F3ADB03E5E03}penempatan', 367),
	(11, '{3C64794E-EF73-47B1-9AB0-F3ADB03E5E03}pengetahuan', 359),
	(11, '{3C64794E-EF73-47B1-9AB0-F3ADB03E5E03}penyesuaian', 495),
	(11, '{3C64794E-EF73-47B1-9AB0-F3ADB03E5E03}potongan_sd', 359),
	(11, '{3C64794E-EF73-47B1-9AB0-F3ADB03E5E03}potongan_sma', 495),
	(11, '{3C64794E-EF73-47B1-9AB0-F3ADB03E5E03}potongan_smk', 359),
	(11, '{3C64794E-EF73-47B1-9AB0-F3ADB03E5E03}potongan_smp', 359),
	(11, '{3C64794E-EF73-47B1-9AB0-F3ADB03E5E03}potongan_tk', 359),
	(11, '{3C64794E-EF73-47B1-9AB0-F3ADB03E5E03}proyek', 367),
	(11, '{3C64794E-EF73-47B1-9AB0-F3ADB03E5E03}reimbursh', 367),
	(11, '{3C64794E-EF73-47B1-9AB0-F3ADB03E5E03}semester', 256),
	(11, '{3C64794E-EF73-47B1-9AB0-F3ADB03E5E03}sertif', 367),
	(11, '{3C64794E-EF73-47B1-9AB0-F3ADB03E5E03}setuju', 367),
	(11, '{3C64794E-EF73-47B1-9AB0-F3ADB03E5E03}set_password', 256),
	(11, '{3C64794E-EF73-47B1-9AB0-F3ADB03E5E03}slipgaji.php', 256),
	(11, '{3C64794E-EF73-47B1-9AB0-F3ADB03E5E03}status_kepeg', 256),
	(11, '{3C64794E-EF73-47B1-9AB0-F3ADB03E5E03}status_npwp', 256),
	(11, '{3C64794E-EF73-47B1-9AB0-F3ADB03E5E03}status_pekerjaan', 256),
	(11, '{3C64794E-EF73-47B1-9AB0-F3ADB03E5E03}tambahan_tugas', 367),
	(11, '{3C64794E-EF73-47B1-9AB0-F3ADB03E5E03}terlambat', 367),
	(11, '{3C64794E-EF73-47B1-9AB0-F3ADB03E5E03}testtable', 367),
	(11, '{3C64794E-EF73-47B1-9AB0-F3ADB03E5E03}test_api.php', 367),
	(11, '{3C64794E-EF73-47B1-9AB0-F3ADB03E5E03}test_pdf.php', 256),
	(11, '{3C64794E-EF73-47B1-9AB0-F3ADB03E5E03}totalgaji', 367),
	(11, '{3C64794E-EF73-47B1-9AB0-F3ADB03E5E03}tpendidikan', 367),
	(11, '{3C64794E-EF73-47B1-9AB0-F3ADB03E5E03}tunjangan_berkala', 367),
	(11, '{3C64794E-EF73-47B1-9AB0-F3ADB03E5E03}tunjangan_tambahan', 367),
	(11, '{3C64794E-EF73-47B1-9AB0-F3ADB03E5E03}uangmuka', 367),
	(11, '{3C64794E-EF73-47B1-9AB0-F3ADB03E5E03}userlevelpermissions', 359),
	(11, '{3C64794E-EF73-47B1-9AB0-F3ADB03E5E03}userlevels', 359),
	(11, '{3C64794E-EF73-47B1-9AB0-F3ADB03E5E03}vgaji_guru_sd', 256),
	(11, '{3C64794E-EF73-47B1-9AB0-F3ADB03E5E03}vgaji_guru_sma', 256),
	(11, '{3C64794E-EF73-47B1-9AB0-F3ADB03E5E03}vgaji_guru_smk', 256),
	(11, '{3C64794E-EF73-47B1-9AB0-F3ADB03E5E03}vgaji_guru_smp', 256),
	(11, '{3C64794E-EF73-47B1-9AB0-F3ADB03E5E03}vgaji_guru_tk', 256),
	(11, '{3C64794E-EF73-47B1-9AB0-F3ADB03E5E03}vgaji_karyawan_sd', 256),
	(11, '{3C64794E-EF73-47B1-9AB0-F3ADB03E5E03}vgaji_karyawan_sma', 256),
	(11, '{3C64794E-EF73-47B1-9AB0-F3ADB03E5E03}vgaji_karyawan_smk', 256),
	(11, '{3C64794E-EF73-47B1-9AB0-F3ADB03E5E03}vgaji_karyawan_smp', 256),
	(11, '{3C64794E-EF73-47B1-9AB0-F3ADB03E5E03}vgaji_karyawan_tk', 256),
	(11, '{3C64794E-EF73-47B1-9AB0-F3ADB03E5E03}vgaji_tu_sd', 256),
	(11, '{3C64794E-EF73-47B1-9AB0-F3ADB03E5E03}vgaji_tu_sma', 256),
	(11, '{3C64794E-EF73-47B1-9AB0-F3ADB03E5E03}vgaji_tu_smk', 256),
	(11, '{3C64794E-EF73-47B1-9AB0-F3ADB03E5E03}vgaji_tu_smp', 256),
	(11, '{3C64794E-EF73-47B1-9AB0-F3ADB03E5E03}vgaji_tu_tk', 256),
	(11, '{3C64794E-EF73-47B1-9AB0-F3ADB03E5E03}v_gajisd', 256),
	(11, '{3C64794E-EF73-47B1-9AB0-F3ADB03E5E03}v_gajisma', 384),
	(11, '{3C64794E-EF73-47B1-9AB0-F3ADB03E5E03}v_gaji_guru_smk', 256),
	(11, '{3C64794E-EF73-47B1-9AB0-F3ADB03E5E03}v_gaji_karyawan_sd', 256),
	(11, '{3C64794E-EF73-47B1-9AB0-F3ADB03E5E03}v_gaji_karyawan_sma', 256),
	(11, '{3C64794E-EF73-47B1-9AB0-F3ADB03E5E03}v_gaji_karyawan_smk', 256),
	(11, '{3C64794E-EF73-47B1-9AB0-F3ADB03E5E03}v_gaji_karyawan_smp', 384),
	(11, '{3C64794E-EF73-47B1-9AB0-F3ADB03E5E03}v_gaji_karyawan_tk', 256),
	(11, '{3C64794E-EF73-47B1-9AB0-F3ADB03E5E03}v_gaji_smp', 256),
	(11, '{3C64794E-EF73-47B1-9AB0-F3ADB03E5E03}v_gaji_tk', 256),
	(11, '{3C64794E-EF73-47B1-9AB0-F3ADB03E5E03}v_gaji_tu_sd', 256),
	(11, '{3C64794E-EF73-47B1-9AB0-F3ADB03E5E03}v_gaji_tu_sma', 256),
	(11, '{3C64794E-EF73-47B1-9AB0-F3ADB03E5E03}v_gaji_tu_smk', 256),
	(11, '{3C64794E-EF73-47B1-9AB0-F3ADB03E5E03}v_gaji_tu_smp', 256),
	(11, '{3C64794E-EF73-47B1-9AB0-F3ADB03E5E03}v_gaji_tu_tk', 256),
	(11, '{3C64794E-EF73-47B1-9AB0-F3ADB03E5E03}v_karyawan_sd', 256),
	(11, '{3C64794E-EF73-47B1-9AB0-F3ADB03E5E03}v_karyawan_sma', 256),
	(11, '{3C64794E-EF73-47B1-9AB0-F3ADB03E5E03}v_karyawan_smk', 256),
	(11, '{3C64794E-EF73-47B1-9AB0-F3ADB03E5E03}v_karyawan_smp', 256),
	(11, '{3C64794E-EF73-47B1-9AB0-F3ADB03E5E03}v_karyawan_tk', 256),
	(11, '{3C64794E-EF73-47B1-9AB0-F3ADB03E5E03}v_m_sd', 256),
	(11, '{3C64794E-EF73-47B1-9AB0-F3ADB03E5E03}v_m_sma', 256),
	(11, '{3C64794E-EF73-47B1-9AB0-F3ADB03E5E03}v_m_smk', 256),
	(11, '{3C64794E-EF73-47B1-9AB0-F3ADB03E5E03}v_m_smp', 256),
	(11, '{3C64794E-EF73-47B1-9AB0-F3ADB03E5E03}v_m_tk', 256),
	(11, '{3C64794E-EF73-47B1-9AB0-F3ADB03E5E03}v_pegawai_sd', 256),
	(11, '{3C64794E-EF73-47B1-9AB0-F3ADB03E5E03}v_pegawai_sma', 256),
	(11, '{3C64794E-EF73-47B1-9AB0-F3ADB03E5E03}v_pegawai_smk', 256),
	(11, '{3C64794E-EF73-47B1-9AB0-F3ADB03E5E03}v_pegawai_smp', 256),
	(11, '{3C64794E-EF73-47B1-9AB0-F3ADB03E5E03}v_pegawai_tk', 256),
	(11, '{3C64794E-EF73-47B1-9AB0-F3ADB03E5E03}v_pengurus_yayasan', 256),
	(11, '{3C64794E-EF73-47B1-9AB0-F3ADB03E5E03}v_totalgaji', 359),
	(11, '{3C64794E-EF73-47B1-9AB0-F3ADB03E5E03}v_totalgajikaryawan', 359),
	(11, '{3C64794E-EF73-47B1-9AB0-F3ADB03E5E03}v_totalgajikaryawansma', 367),
	(11, '{3C64794E-EF73-47B1-9AB0-F3ADB03E5E03}v_totalgajikaryawansmk', 359),
	(11, '{3C64794E-EF73-47B1-9AB0-F3ADB03E5E03}v_totalgajikaryawansmp', 359),
	(11, '{3C64794E-EF73-47B1-9AB0-F3ADB03E5E03}v_totalgajikaryawantk', 359),
	(11, '{3C64794E-EF73-47B1-9AB0-F3ADB03E5E03}v_totalgajisma', 495),
	(11, '{3C64794E-EF73-47B1-9AB0-F3ADB03E5E03}v_totalgajismk', 359),
	(11, '{3C64794E-EF73-47B1-9AB0-F3ADB03E5E03}v_totalgajismp', 359),
	(11, '{3C64794E-EF73-47B1-9AB0-F3ADB03E5E03}v_totalgajitk', 359),
	(11, '{3C64794E-EF73-47B1-9AB0-F3ADB03E5E03}v_totalgajitu', 359),
	(11, '{3C64794E-EF73-47B1-9AB0-F3ADB03E5E03}v_totalgajitusma', 7),
	(11, '{3C64794E-EF73-47B1-9AB0-F3ADB03E5E03}v_totalgajitusmk', 359),
	(11, '{3C64794E-EF73-47B1-9AB0-F3ADB03E5E03}v_totalgajitusmp', 359),
	(11, '{3C64794E-EF73-47B1-9AB0-F3ADB03E5E03}v_totalgajitutk', 359),
	(11, '{3C64794E-EF73-47B1-9AB0-F3ADB03E5E03}v_tu_sd', 256),
	(11, '{3C64794E-EF73-47B1-9AB0-F3ADB03E5E03}v_tu_sma', 256),
	(11, '{3C64794E-EF73-47B1-9AB0-F3ADB03E5E03}v_tu_smk', 256),
	(11, '{3C64794E-EF73-47B1-9AB0-F3ADB03E5E03}v_tu_smp', 256),
	(11, '{3C64794E-EF73-47B1-9AB0-F3ADB03E5E03}v_tu_tk', 256),
	(11, '{3C64794E-EF73-47B1-9AB0-F3ADB03E5E03}v_yayasan', 256),
	(11, '{3C64794E-EF73-47B1-9AB0-F3ADB03E5E03}yayasan', 256),
	(12, '{3C64794E-EF73-47B1-9AB0-F3ADB03E5E03}absen', 367),
	(12, '{3C64794E-EF73-47B1-9AB0-F3ADB03E5E03}absen_detil', 367),
	(12, '{3C64794E-EF73-47B1-9AB0-F3ADB03E5E03}agama', 367),
	(12, '{3C64794E-EF73-47B1-9AB0-F3ADB03E5E03}audittrail', 367),
	(12, '{3C64794E-EF73-47B1-9AB0-F3ADB03E5E03}barang', 367),
	(12, '{3C64794E-EF73-47B1-9AB0-F3ADB03E5E03}barangnew', 367),
	(12, '{3C64794E-EF73-47B1-9AB0-F3ADB03E5E03}berita', 367),
	(12, '{3C64794E-EF73-47B1-9AB0-F3ADB03E5E03}bulan', 367),
	(12, '{3C64794E-EF73-47B1-9AB0-F3ADB03E5E03}daftarbarang', 367),
	(12, '{3C64794E-EF73-47B1-9AB0-F3ADB03E5E03}dinasluar', 367),
	(12, '{3C64794E-EF73-47B1-9AB0-F3ADB03E5E03}gaji', 359),
	(12, '{3C64794E-EF73-47B1-9AB0-F3ADB03E5E03}gajisd', 367),
	(12, '{3C64794E-EF73-47B1-9AB0-F3ADB03E5E03}gajisd_detil', 367),
	(12, '{3C64794E-EF73-47B1-9AB0-F3ADB03E5E03}gajisma', 367),
	(12, '{3C64794E-EF73-47B1-9AB0-F3ADB03E5E03}gajisma_detil', 367),
	(12, '{3C64794E-EF73-47B1-9AB0-F3ADB03E5E03}gajismk', 367),
	(12, '{3C64794E-EF73-47B1-9AB0-F3ADB03E5E03}gajismk_detil', 367),
	(12, '{3C64794E-EF73-47B1-9AB0-F3ADB03E5E03}gajismp', 367),
	(12, '{3C64794E-EF73-47B1-9AB0-F3ADB03E5E03}gajismp_detil', 367),
	(12, '{3C64794E-EF73-47B1-9AB0-F3ADB03E5E03}gajitk', 367),
	(12, '{3C64794E-EF73-47B1-9AB0-F3ADB03E5E03}gajitk_detil', 367),
	(12, '{3C64794E-EF73-47B1-9AB0-F3ADB03E5E03}gajitunjangan', 367),
	(12, '{3C64794E-EF73-47B1-9AB0-F3ADB03E5E03}gaji_karyawan_sd', 359),
	(12, '{3C64794E-EF73-47B1-9AB0-F3ADB03E5E03}gaji_karyawan_sma', 359),
	(12, '{3C64794E-EF73-47B1-9AB0-F3ADB03E5E03}gaji_karyawan_smk', 367),
	(12, '{3C64794E-EF73-47B1-9AB0-F3ADB03E5E03}gaji_karyawan_smp', 359),
	(12, '{3C64794E-EF73-47B1-9AB0-F3ADB03E5E03}gaji_karyawan_tk', 359),
	(12, '{3C64794E-EF73-47B1-9AB0-F3ADB03E5E03}gaji_pokok', 367),
	(12, '{3C64794E-EF73-47B1-9AB0-F3ADB03E5E03}gaji_pokok_kayawan', 367),
	(12, '{3C64794E-EF73-47B1-9AB0-F3ADB03E5E03}gaji_pokok_tu', 367),
	(12, '{3C64794E-EF73-47B1-9AB0-F3ADB03E5E03}gaji_sma', 359),
	(12, '{3C64794E-EF73-47B1-9AB0-F3ADB03E5E03}gaji_smk', 367),
	(12, '{3C64794E-EF73-47B1-9AB0-F3ADB03E5E03}gaji_smp', 359),
	(12, '{3C64794E-EF73-47B1-9AB0-F3ADB03E5E03}gaji_tk', 359),
	(12, '{3C64794E-EF73-47B1-9AB0-F3ADB03E5E03}gaji_tu_sd', 367),
	(12, '{3C64794E-EF73-47B1-9AB0-F3ADB03E5E03}gaji_tu_sma', 367),
	(12, '{3C64794E-EF73-47B1-9AB0-F3ADB03E5E03}gaji_tu_smk', 367),
	(12, '{3C64794E-EF73-47B1-9AB0-F3ADB03E5E03}gaji_tu_smp', 367),
	(12, '{3C64794E-EF73-47B1-9AB0-F3ADB03E5E03}gaji_tu_tk', 367),
	(12, '{3C64794E-EF73-47B1-9AB0-F3ADB03E5E03}gender', 367),
	(12, '{3C64794E-EF73-47B1-9AB0-F3ADB03E5E03}generate_pertahun', 0),
	(12, '{3C64794E-EF73-47B1-9AB0-F3ADB03E5E03}generate_pertahun_sd', 0),
	(12, '{3C64794E-EF73-47B1-9AB0-F3ADB03E5E03}generate_pertahun_smk', 495),
	(12, '{3C64794E-EF73-47B1-9AB0-F3ADB03E5E03}generate_pertahun_smp', 0),
	(12, '{3C64794E-EF73-47B1-9AB0-F3ADB03E5E03}generate_pertahun_tk', 0),
	(12, '{3C64794E-EF73-47B1-9AB0-F3ADB03E5E03}hapus_barang', 367),
	(12, '{3C64794E-EF73-47B1-9AB0-F3ADB03E5E03}hapus_barangnew', 367),
	(12, '{3C64794E-EF73-47B1-9AB0-F3ADB03E5E03}home.php', 495),
	(12, '{3C64794E-EF73-47B1-9AB0-F3ADB03E5E03}ijazah', 367),
	(12, '{3C64794E-EF73-47B1-9AB0-F3ADB03E5E03}ijin', 367),
	(12, '{3C64794E-EF73-47B1-9AB0-F3ADB03E5E03}jabatan', 367),
	(12, '{3C64794E-EF73-47B1-9AB0-F3ADB03E5E03}jenis_barang', 367),
	(12, '{3C64794E-EF73-47B1-9AB0-F3ADB03E5E03}jenis_dinasluar', 367),
	(12, '{3C64794E-EF73-47B1-9AB0-F3ADB03E5E03}jenis_grup_berita', 367),
	(12, '{3C64794E-EF73-47B1-9AB0-F3ADB03E5E03}jenis_grup_ilmu', 367),
	(12, '{3C64794E-EF73-47B1-9AB0-F3ADB03E5E03}jenis_ijin', 367),
	(12, '{3C64794E-EF73-47B1-9AB0-F3ADB03E5E03}jenis_jabatan', 367),
	(12, '{3C64794E-EF73-47B1-9AB0-F3ADB03E5E03}jenis_lembur', 367),
	(12, '{3C64794E-EF73-47B1-9AB0-F3ADB03E5E03}komentar', 367),
	(12, '{3C64794E-EF73-47B1-9AB0-F3ADB03E5E03}lembur', 367),
	(12, '{3C64794E-EF73-47B1-9AB0-F3ADB03E5E03}mpendidikan', 367),
	(12, '{3C64794E-EF73-47B1-9AB0-F3ADB03E5E03}m_bpjs', 367),
	(12, '{3C64794E-EF73-47B1-9AB0-F3ADB03E5E03}m_inval', 495),
	(12, '{3C64794E-EF73-47B1-9AB0-F3ADB03E5E03}m_karyawan_sd', 359),
	(12, '{3C64794E-EF73-47B1-9AB0-F3ADB03E5E03}m_karyawan_sma', 359),
	(12, '{3C64794E-EF73-47B1-9AB0-F3ADB03E5E03}m_karyawan_smk', 367),
	(12, '{3C64794E-EF73-47B1-9AB0-F3ADB03E5E03}m_karyawan_smp', 359),
	(12, '{3C64794E-EF73-47B1-9AB0-F3ADB03E5E03}m_karyawan_tk', 359),
	(12, '{3C64794E-EF73-47B1-9AB0-F3ADB03E5E03}m_kehadiran', 367),
	(12, '{3C64794E-EF73-47B1-9AB0-F3ADB03E5E03}m_lembur', 367),
	(12, '{3C64794E-EF73-47B1-9AB0-F3ADB03E5E03}m_penyesuaian', 495),
	(12, '{3C64794E-EF73-47B1-9AB0-F3ADB03E5E03}m_piket', 367),
	(12, '{3C64794E-EF73-47B1-9AB0-F3ADB03E5E03}m_pulangcepat', 367),
	(12, '{3C64794E-EF73-47B1-9AB0-F3ADB03E5E03}m_sakit', 367),
	(12, '{3C64794E-EF73-47B1-9AB0-F3ADB03E5E03}m_sd', 359),
	(12, '{3C64794E-EF73-47B1-9AB0-F3ADB03E5E03}m_sma', 359),
	(12, '{3C64794E-EF73-47B1-9AB0-F3ADB03E5E03}m_smk', 367),
	(12, '{3C64794E-EF73-47B1-9AB0-F3ADB03E5E03}m_smp', 359),
	(12, '{3C64794E-EF73-47B1-9AB0-F3ADB03E5E03}m_tidakhadir', 367),
	(12, '{3C64794E-EF73-47B1-9AB0-F3ADB03E5E03}m_tk', 359),
	(12, '{3C64794E-EF73-47B1-9AB0-F3ADB03E5E03}m_tu_sd', 359),
	(12, '{3C64794E-EF73-47B1-9AB0-F3ADB03E5E03}m_tu_sma', 359),
	(12, '{3C64794E-EF73-47B1-9AB0-F3ADB03E5E03}m_tu_smk', 367),
	(12, '{3C64794E-EF73-47B1-9AB0-F3ADB03E5E03}m_tu_smp', 359),
	(12, '{3C64794E-EF73-47B1-9AB0-F3ADB03E5E03}m_tu_tk', 359),
	(12, '{3C64794E-EF73-47B1-9AB0-F3ADB03E5E03}pegawai', 359),
	(12, '{3C64794E-EF73-47B1-9AB0-F3ADB03E5E03}peg_dokumen', 367),
	(12, '{3C64794E-EF73-47B1-9AB0-F3ADB03E5E03}peg_keluarga', 367),
	(12, '{3C64794E-EF73-47B1-9AB0-F3ADB03E5E03}peg_skill', 367),
	(12, '{3C64794E-EF73-47B1-9AB0-F3ADB03E5E03}penempatan', 367),
	(12, '{3C64794E-EF73-47B1-9AB0-F3ADB03E5E03}pengetahuan', 367),
	(12, '{3C64794E-EF73-47B1-9AB0-F3ADB03E5E03}penyesuaian', 495),
	(12, '{3C64794E-EF73-47B1-9AB0-F3ADB03E5E03}potongan_sd', 359),
	(12, '{3C64794E-EF73-47B1-9AB0-F3ADB03E5E03}potongan_sma', 359),
	(12, '{3C64794E-EF73-47B1-9AB0-F3ADB03E5E03}potongan_smk', 367),
	(12, '{3C64794E-EF73-47B1-9AB0-F3ADB03E5E03}potongan_smp', 359),
	(12, '{3C64794E-EF73-47B1-9AB0-F3ADB03E5E03}potongan_tk', 359),
	(12, '{3C64794E-EF73-47B1-9AB0-F3ADB03E5E03}proyek', 367),
	(12, '{3C64794E-EF73-47B1-9AB0-F3ADB03E5E03}reimbursh', 367),
	(12, '{3C64794E-EF73-47B1-9AB0-F3ADB03E5E03}sertif', 367),
	(12, '{3C64794E-EF73-47B1-9AB0-F3ADB03E5E03}setuju', 367),
	(12, '{3C64794E-EF73-47B1-9AB0-F3ADB03E5E03}tambahan_tugas', 367),
	(12, '{3C64794E-EF73-47B1-9AB0-F3ADB03E5E03}terlambat', 367),
	(12, '{3C64794E-EF73-47B1-9AB0-F3ADB03E5E03}testtable', 367),
	(12, '{3C64794E-EF73-47B1-9AB0-F3ADB03E5E03}test_api.php', 367),
	(12, '{3C64794E-EF73-47B1-9AB0-F3ADB03E5E03}totalgaji', 367),
	(12, '{3C64794E-EF73-47B1-9AB0-F3ADB03E5E03}tpendidikan', 367),
	(12, '{3C64794E-EF73-47B1-9AB0-F3ADB03E5E03}tunjangan_berkala', 367),
	(12, '{3C64794E-EF73-47B1-9AB0-F3ADB03E5E03}tunjangan_tambahan', 367),
	(12, '{3C64794E-EF73-47B1-9AB0-F3ADB03E5E03}uangmuka', 367),
	(12, '{3C64794E-EF73-47B1-9AB0-F3ADB03E5E03}userlevelpermissions', 359),
	(12, '{3C64794E-EF73-47B1-9AB0-F3ADB03E5E03}userlevels', 359),
	(12, '{3C64794E-EF73-47B1-9AB0-F3ADB03E5E03}v_gaji_karyawan_smk', 0),
	(12, '{3C64794E-EF73-47B1-9AB0-F3ADB03E5E03}v_totalgaji', 359),
	(12, '{3C64794E-EF73-47B1-9AB0-F3ADB03E5E03}v_totalgajikaryawan', 359),
	(12, '{3C64794E-EF73-47B1-9AB0-F3ADB03E5E03}v_totalgajikaryawansma', 359),
	(12, '{3C64794E-EF73-47B1-9AB0-F3ADB03E5E03}v_totalgajikaryawansmk', 367),
	(12, '{3C64794E-EF73-47B1-9AB0-F3ADB03E5E03}v_totalgajikaryawansmp', 359),
	(12, '{3C64794E-EF73-47B1-9AB0-F3ADB03E5E03}v_totalgajikaryawantk', 359),
	(12, '{3C64794E-EF73-47B1-9AB0-F3ADB03E5E03}v_totalgajisma', 359),
	(12, '{3C64794E-EF73-47B1-9AB0-F3ADB03E5E03}v_totalgajismk', 367),
	(12, '{3C64794E-EF73-47B1-9AB0-F3ADB03E5E03}v_totalgajismp', 359),
	(12, '{3C64794E-EF73-47B1-9AB0-F3ADB03E5E03}v_totalgajitk', 359),
	(12, '{3C64794E-EF73-47B1-9AB0-F3ADB03E5E03}v_totalgajitu', 359),
	(12, '{3C64794E-EF73-47B1-9AB0-F3ADB03E5E03}v_totalgajitusma', 359),
	(12, '{3C64794E-EF73-47B1-9AB0-F3ADB03E5E03}v_totalgajitusmk', 367),
	(12, '{3C64794E-EF73-47B1-9AB0-F3ADB03E5E03}v_totalgajitusmp', 359),
	(12, '{3C64794E-EF73-47B1-9AB0-F3ADB03E5E03}v_totalgajitutk', 359);

-- Dumping structure for table sigap2.userlevels
CREATE TABLE IF NOT EXISTS `userlevels` (
  `userlevelid` int NOT NULL,
  `userlevelname` varchar(80) NOT NULL,
  PRIMARY KEY (`userlevelid`) USING BTREE
) ENGINE=InnoDB DEFAULT CHARSET=latin1 ROW_FORMAT=DYNAMIC;

-- Dumping data for table sigap2.userlevels: ~0 rows (approximately)
INSERT INTO `userlevels` (`userlevelid`, `userlevelname`) VALUES
	(-2, 'Anonymous'),
	(-1, 'Administrator'),
	(0, 'Default'),
	(1, 'Pegawai'),
	(2, 'Admin & Keuangan'),
	(3, 'Bendahara'),
	(4, 'unit sd'),
	(5, 'unit smp'),
	(6, 'unit sma'),
	(7, 'unit smk'),
	(8, 'Unit TK'),
	(9, 'Unit SD'),
	(10, 'Unit SMP'),
	(11, 'Unit SMA'),
	(12, 'Unit SMK');

-- Dumping structure for view sigap2.vgaji_guru_sd
-- Creating temporary table to overcome VIEW dependency errors
CREATE TABLE `vgaji_guru_sd` (
	`id` INT(10) NOT NULL,
	`pid` INT(10) NULL,
	`pegawai` VARCHAR(50) NULL COLLATE 'utf8mb4_general_ci',
	`jenjang_id` INT(10) NULL,
	`jabatan_id` INT(10) NULL,
	`lama_kerja` INT(10) NULL,
	`type` INT(10) NULL,
	`jenis_guru` INT(10) NULL,
	`tambahan` INT(10) NULL,
	`periode` INT(10) NULL,
	`tunjangan_periode` BIGINT(19) NULL,
	`kehadiran` INT(10) NULL,
	`jp` INT(10) NULL,
	`value_kehadiran` BIGINT(19) NULL,
	`gapok` BIGINT(19) NULL,
	`total_gapok` BIGINT(19) NULL,
	`lembur` INT(10) NULL,
	`value_lembur` BIGINT(19) NULL,
	`value_reward` BIGINT(19) NULL,
	`value_inval` BIGINT(19) NULL,
	`piket_count` INT(10) NULL,
	`value_piket` BIGINT(19) NULL,
	`tugastambahan` BIGINT(19) NULL,
	`tj_jabatan` BIGINT(19) NULL,
	`sub_total` BIGINT(19) NULL,
	`potongan` BIGINT(19) NULL,
	`penyesuaian` BIGINT(19) NULL,
	`total` BIGINT(19) NULL,
	`voucher` BIGINT(19) NULL,
	`tahun` YEAR NULL,
	`bulan` INT(10) NULL,
	`rekbank` VARCHAR(255) NULL COLLATE 'latin1_swedish_ci',
	`potongan_bendahara` BIGINT(19) NULL
) ENGINE=MyISAM;

-- Dumping structure for view sigap2.vgaji_guru_sma
-- Creating temporary table to overcome VIEW dependency errors
CREATE TABLE `vgaji_guru_sma` (
	`id` INT(10) NOT NULL,
	`pegawai` VARCHAR(50) NULL COLLATE 'utf8mb4_general_ci',
	`jenjang_id` INT(10) NULL,
	`jabatan_id` INT(10) NULL,
	`lama_kerja` INT(10) NULL,
	`type` INT(10) NULL,
	`jenis_guru` INT(10) NULL,
	`tambahan` INT(10) NULL,
	`periode` INT(10) NULL,
	`tunjangan_periode` BIGINT(19) NULL,
	`kehadiran` INT(10) NULL,
	`value_kehadiran` INT(10) NULL,
	`lembur` INT(10) NULL,
	`value_lembur` BIGINT(19) NULL,
	`jp` INT(10) NULL,
	`gapok` BIGINT(19) NULL,
	`total_gapok` BIGINT(19) NULL,
	`value_reward` BIGINT(19) NULL,
	`value_inval` BIGINT(19) NULL,
	`piket_count` INT(10) NULL,
	`value_piket` BIGINT(19) NULL,
	`tugastambahan` BIGINT(19) NULL,
	`tj_jabatan` BIGINT(19) NULL,
	`sub_total` BIGINT(19) NULL,
	`potongan` BIGINT(19) NULL,
	`penyesuaian` BIGINT(19) NULL,
	`total` BIGINT(19) NULL,
	`voucher` BIGINT(19) NULL,
	`pid` INT(10) NULL,
	`tahun` INT(10) NULL,
	`bulan` INT(10) NULL,
	`rekbank` VARCHAR(255) NULL COLLATE 'latin1_swedish_ci',
	`potongan_bendahara` BIGINT(19) NULL
) ENGINE=MyISAM;

-- Dumping structure for view sigap2.vgaji_guru_smk
-- Creating temporary table to overcome VIEW dependency errors
CREATE TABLE `vgaji_guru_smk` (
	`id` INT(10) NOT NULL,
	`pegawai` VARCHAR(50) NULL COLLATE 'utf8mb4_general_ci',
	`jenjang_id` INT(10) NULL,
	`jabatan_id` INT(10) NULL,
	`lama_kerja` INT(10) NULL,
	`type` INT(10) NULL,
	`jenis_guru` INT(10) NULL,
	`tambahan` INT(10) NULL,
	`periode` INT(10) NULL,
	`tunjangan_periode` BIGINT(19) NULL,
	`kehadiran` INT(10) NULL,
	`value_kehadiran` BIGINT(19) NULL,
	`lembur` INT(10) NULL,
	`value_lembur` BIGINT(19) NULL,
	`jp` INT(10) NULL,
	`gapok` BIGINT(19) NULL,
	`total_gapok` BIGINT(19) NULL,
	`value_reward` BIGINT(19) NULL,
	`value_inval` BIGINT(19) NULL,
	`piket_count` INT(10) NULL,
	`value_piket` BIGINT(19) NULL,
	`tugastambahan` BIGINT(19) NULL,
	`tj_jabatan` BIGINT(19) NULL,
	`sub_total` BIGINT(19) NULL,
	`potongan` BIGINT(19) NULL,
	`penyesuaian` BIGINT(19) NULL,
	`total` BIGINT(19) NULL,
	`voucher` BIGINT(19) NULL,
	`tahun` YEAR NULL,
	`bulan` INT(10) NULL,
	`rekbank` VARCHAR(255) NULL COLLATE 'latin1_swedish_ci',
	`potongan_bendahara` BIGINT(19) NULL
) ENGINE=MyISAM;

-- Dumping structure for view sigap2.vgaji_guru_smp
-- Creating temporary table to overcome VIEW dependency errors
CREATE TABLE `vgaji_guru_smp` (
	`id` INT(10) NOT NULL,
	`pid` INT(10) NULL,
	`pegawai` VARCHAR(50) NULL COLLATE 'utf8mb4_general_ci',
	`jenjang_id` INT(10) NULL,
	`jabatan_id` INT(10) NULL,
	`lama_kerja` INT(10) NULL,
	`type` INT(10) NULL,
	`jenis_guru` INT(10) NULL,
	`tambahan` INT(10) NULL,
	`periode` INT(10) NULL,
	`tunjangan_periode` BIGINT(19) NULL,
	`kehadiran` INT(10) NULL,
	`value_kehadiran` BIGINT(19) NULL,
	`lembur` INT(10) NULL,
	`value_lembur` BIGINT(19) NULL,
	`jp` INT(10) NULL,
	`gapok` BIGINT(19) NULL,
	`total_gapok` BIGINT(19) NULL,
	`value_reward` BIGINT(19) NULL,
	`value_inval` BIGINT(19) NULL,
	`piket_count` INT(10) NULL,
	`value_piket` BIGINT(19) NULL,
	`tugastambahan` BIGINT(19) NULL,
	`tj_jabatan` BIGINT(19) NULL,
	`sub_total` BIGINT(19) NULL,
	`potongan` BIGINT(19) NULL,
	`penyesuaian` BIGINT(19) NULL,
	`total` BIGINT(19) NULL,
	`voucher` BIGINT(19) NULL,
	`tahun` YEAR NULL,
	`bulan` INT(10) NULL,
	`rekbank` VARCHAR(255) NULL COLLATE 'latin1_swedish_ci',
	`potongan_bendahara` BIGINT(19) NULL
) ENGINE=MyISAM;

-- Dumping structure for view sigap2.vgaji_guru_tk
-- Creating temporary table to overcome VIEW dependency errors
CREATE TABLE `vgaji_guru_tk` (
	`id` INT(10) NOT NULL,
	`pid` INT(10) NULL,
	`pegawai` VARCHAR(50) NULL COLLATE 'utf8mb4_general_ci',
	`jenjang_id` INT(10) NULL,
	`jabatan_id` INT(10) NULL,
	`type` INT(10) NULL,
	`lama_kerja` INT(10) NULL,
	`jenis_guru` INT(10) NULL,
	`tambahan` INT(10) NULL,
	`periode` INT(10) NULL,
	`tunjangan_periode` BIGINT(19) NULL,
	`kehadiran` INT(10) NULL,
	`value_kehadiran` BIGINT(19) NULL,
	`lembur` INT(10) NULL,
	`value_lembur` BIGINT(19) NULL,
	`jp` INT(10) NULL,
	`gapok` BIGINT(19) NULL,
	`total_gapok` BIGINT(19) NULL,
	`value_reward` BIGINT(19) NULL,
	`value_inval` BIGINT(19) NULL,
	`piket_count` INT(10) NULL,
	`value_piket` BIGINT(19) NULL,
	`tugastambahan` BIGINT(19) NULL,
	`tj_jabatan` BIGINT(19) NULL,
	`sub_total` BIGINT(19) NULL,
	`potongan` BIGINT(19) NULL,
	`penyesuaian` BIGINT(19) NULL,
	`total` BIGINT(19) NULL,
	`voucher` BIGINT(19) NULL,
	`tahun` YEAR NULL,
	`bulan` INT(10) NULL,
	`rekbank` VARCHAR(255) NULL COLLATE 'latin1_swedish_ci',
	`potongan_bendahara` BIGINT(19) NULL
) ENGINE=MyISAM;

-- Dumping structure for view sigap2.vgaji_karyawan_sd
-- Creating temporary table to overcome VIEW dependency errors
CREATE TABLE `vgaji_karyawan_sd` (
	`id` INT(10) NOT NULL,
	`tahun` SMALLINT(5) NULL,
	`bulan` INT(10) NULL,
	`pegawai` VARCHAR(50) NULL COLLATE 'utf8mb4_general_ci',
	`jenjang_id` INT(10) NULL,
	`jabatan_id` INT(10) NULL,
	`kehadiran` INT(10) NULL,
	`value_kehadiran` BIGINT(19) NULL,
	`gapok` BIGINT(19) NULL,
	`value_reward` BIGINT(19) NULL,
	`value_inval` BIGINT(19) NULL,
	`sub_total` BIGINT(19) NULL,
	`potongan` BIGINT(19) NULL,
	`penyesuaian` BIGINT(19) NULL,
	`total` BIGINT(19) NULL,
	`voucher` BIGINT(19) NULL,
	`status` INT(10) NULL,
	`rekbank` VARCHAR(255) NULL COLLATE 'latin1_swedish_ci',
	`potongan_bendahara` BIGINT(19) NULL
) ENGINE=MyISAM;

-- Dumping structure for view sigap2.vgaji_karyawan_sma
-- Creating temporary table to overcome VIEW dependency errors
CREATE TABLE `vgaji_karyawan_sma` (
	`id` INT(10) NOT NULL,
	`pegawai` VARCHAR(50) NULL COLLATE 'utf8mb4_general_ci',
	`jenjang_id` INT(10) NULL,
	`jabatan_id` INT(10) NULL,
	`kehadiran` INT(10) NULL,
	`gapok` BIGINT(19) NULL,
	`value_kehadiran` BIGINT(19) NULL,
	`value_reward` BIGINT(19) NULL,
	`value_inval` BIGINT(19) NULL,
	`sub_total` BIGINT(19) NULL,
	`potongan` BIGINT(19) NULL,
	`penyesuaian` BIGINT(19) NULL,
	`total` BIGINT(19) NULL,
	`status` INT(10) NULL,
	`voucher` BIGINT(19) NULL,
	`tahun` SMALLINT(5) NULL,
	`bulan` INT(10) NULL,
	`pid` INT(10) NULL,
	`rekbank` VARCHAR(255) NULL COLLATE 'latin1_swedish_ci',
	`potongan_bendahara` BIGINT(19) NULL
) ENGINE=MyISAM;

-- Dumping structure for view sigap2.vgaji_karyawan_smk
-- Creating temporary table to overcome VIEW dependency errors
CREATE TABLE `vgaji_karyawan_smk` (
	`id` INT(10) NOT NULL,
	`tahun` SMALLINT(5) NULL,
	`bulan` INT(10) NULL,
	`pegawai` VARCHAR(50) NULL COLLATE 'utf8mb4_general_ci',
	`jenjang_id` INT(10) NULL,
	`jabatan_id` INT(10) NULL,
	`kehadiran` INT(10) NULL,
	`gapok` BIGINT(19) NULL,
	`value_kehadiran` BIGINT(19) NULL,
	`value_reward` BIGINT(19) NULL,
	`value_inval` BIGINT(19) NULL,
	`sub_total` BIGINT(19) NULL,
	`potongan` BIGINT(19) NULL,
	`penyesuaian` BIGINT(19) NULL,
	`total` BIGINT(19) NULL,
	`voucher` BIGINT(19) NULL,
	`rekbank` VARCHAR(255) NULL COLLATE 'latin1_swedish_ci',
	`potongan_bendahara` BIGINT(19) NULL
) ENGINE=MyISAM;

-- Dumping structure for view sigap2.vgaji_karyawan_smp
-- Creating temporary table to overcome VIEW dependency errors
CREATE TABLE `vgaji_karyawan_smp` (
	`id` INT(10) NOT NULL,
	`tahun` SMALLINT(5) NULL,
	`bulan` INT(10) NULL,
	`pegawai` VARCHAR(50) NULL COLLATE 'utf8mb4_general_ci',
	`jenjang_id` INT(10) NULL,
	`jabatan_id` INT(10) NULL,
	`kehadiran` INT(10) NULL,
	`gapok` BIGINT(19) NULL,
	`value_kehadiran` BIGINT(19) NULL,
	`value_reward` BIGINT(19) NULL,
	`value_inval` BIGINT(19) NULL,
	`sub_total` BIGINT(19) NULL,
	`potongan` BIGINT(19) NULL,
	`penyesuaian` BIGINT(19) NULL,
	`total` BIGINT(19) NULL,
	`status` INT(10) NULL,
	`voucher` INT(10) NULL,
	`rekbank` VARCHAR(255) NULL COLLATE 'latin1_swedish_ci',
	`potongan_bendahara` BIGINT(19) NULL
) ENGINE=MyISAM;

-- Dumping structure for view sigap2.vgaji_karyawan_tk
-- Creating temporary table to overcome VIEW dependency errors
CREATE TABLE `vgaji_karyawan_tk` (
	`tahun` SMALLINT(5) NULL,
	`bulan` INT(10) NULL,
	`id` INT(10) NOT NULL,
	`jenjang_id` INT(10) NULL,
	`pegawai` VARCHAR(50) NULL COLLATE 'utf8mb4_general_ci',
	`jabatan_id` INT(10) NULL,
	`kehadiran` INT(10) NULL,
	`gapok` BIGINT(19) NULL,
	`value_kehadiran` BIGINT(19) NULL,
	`value_reward` BIGINT(19) NULL,
	`sub_total` BIGINT(19) NULL,
	`value_inval` BIGINT(19) NULL,
	`potongan` BIGINT(19) NULL,
	`penyesuaian` BIGINT(19) NULL,
	`total` BIGINT(19) NULL,
	`voucher` INT(10) NULL,
	`status` INT(10) NULL,
	`rekbank` VARCHAR(255) NULL COLLATE 'latin1_swedish_ci',
	`potongan_bendahara` BIGINT(19) NULL
) ENGINE=MyISAM;

-- Dumping structure for view sigap2.vgaji_tu_sd
-- Creating temporary table to overcome VIEW dependency errors
CREATE TABLE `vgaji_tu_sd` (
	`id` INT(10) NOT NULL,
	`pid` INT(10) NULL,
	`pegawai` VARCHAR(50) NULL COLLATE 'utf8mb4_general_ci',
	`jenjang_id` INT(10) NULL,
	`jabatan_id` INT(10) NULL,
	`type_jabatan` INT(10) NULL,
	`sertif` INT(10) NULL,
	`tambahan` INT(10) NULL,
	`month` DATE NULL,
	`lama_kerja` INT(10) NULL,
	`gapok` BIGINT(19) NULL,
	`ijasah` INT(10) NULL,
	`kehadiran` INT(10) NULL,
	`value_kehadiran` BIGINT(19) NULL,
	`lembur` INT(10) NULL,
	`value_lembur` BIGINT(19) NULL,
	`value_reward` BIGINT(19) NULL,
	`value_inval` BIGINT(19) NULL,
	`piket_count` INT(10) NULL,
	`value_piket` BIGINT(19) NULL,
	`tugastambahan` BIGINT(19) NULL,
	`tj_jabatan` BIGINT(19) NULL,
	`tunjangan2` BIGINT(19) NULL,
	`potongan` BIGINT(19) NULL,
	`sub_total` BIGINT(19) NULL,
	`penyesuaian` BIGINT(19) NULL,
	`total` BIGINT(19) NULL,
	`voucher` BIGINT(19) NULL,
	`tahun` YEAR NULL,
	`bulan` INT(10) NULL,
	`rekbank` VARCHAR(255) NULL COLLATE 'latin1_swedish_ci',
	`potongan_bendahara` BIGINT(19) NULL
) ENGINE=MyISAM;

-- Dumping structure for view sigap2.vgaji_tu_sma
-- Creating temporary table to overcome VIEW dependency errors
CREATE TABLE `vgaji_tu_sma` (
	`id` INT(10) NOT NULL,
	`datetime` DATETIME NULL,
	`pid` INT(10) NULL,
	`pegawai` VARCHAR(50) NULL COLLATE 'utf8mb4_general_ci',
	`jenjang_id` INT(10) NULL,
	`jabatan_id` INT(10) NULL,
	`type_jabatan` INT(10) NULL,
	`tambahan` INT(10) NULL,
	`ijasah` INT(10) NULL,
	`sertif` INT(10) NULL,
	`lama_kerja` INT(10) NULL,
	`gapok` BIGINT(19) NULL,
	`kehadiran` INT(10) NULL,
	`value_kehadiran` BIGINT(19) NULL,
	`lembur` INT(10) NULL,
	`value_lembur` BIGINT(19) NULL,
	`value_reward` BIGINT(19) NULL,
	`value_inval` BIGINT(19) NULL,
	`piket_count` INT(10) NULL,
	`value_piket` BIGINT(19) NULL,
	`tugastambahan` BIGINT(19) NULL,
	`tj_jabatan` BIGINT(19) NULL,
	`tunjangan2` BIGINT(19) NULL,
	`potongan` BIGINT(19) NULL,
	`sub_total` BIGINT(19) NULL,
	`penyesuaian` BIGINT(19) NULL,
	`total` BIGINT(19) NULL,
	`voucher` BIGINT(19) NULL,
	`tahun` YEAR NULL,
	`bulan` INT(10) NULL,
	`rekbank` VARCHAR(255) NULL COLLATE 'latin1_swedish_ci',
	`potongan_bendahara` BIGINT(19) NULL
) ENGINE=MyISAM;

-- Dumping structure for view sigap2.vgaji_tu_smk
-- Creating temporary table to overcome VIEW dependency errors
CREATE TABLE `vgaji_tu_smk` (
	`id` INT(10) NOT NULL,
	`pid` INT(10) NULL,
	`pegawai` VARCHAR(50) NULL COLLATE 'utf8mb4_general_ci',
	`jenjang_id` INT(10) NULL,
	`jabatan_id` INT(10) NULL,
	`type_jabatan` INT(10) NULL,
	`tambahan` INT(10) NULL,
	`sertif` INT(10) NULL,
	`lama_kerja` INT(10) NULL,
	`kehadiran` INT(10) NULL,
	`value_kehadiran` INT(10) NULL,
	`gapok` BIGINT(19) NULL,
	`lembur` INT(10) NULL,
	`value_lembur` BIGINT(19) NULL,
	`value_reward` BIGINT(19) NULL,
	`value_inval` BIGINT(19) NULL,
	`piket_count` INT(10) NULL,
	`value_piket` BIGINT(19) NULL,
	`tugastambahan` BIGINT(19) NULL,
	`tj_jabatan` BIGINT(19) NULL,
	`tunjangan2` BIGINT(19) NULL,
	`potongan` BIGINT(19) NULL,
	`sub_total` BIGINT(19) NULL,
	`penyesuaian` BIGINT(19) NULL,
	`total` BIGINT(19) NULL,
	`ijasah` INT(10) NULL,
	`voucher` BIGINT(19) NULL,
	`tahun` YEAR NULL,
	`bulan` INT(10) NULL,
	`rekbank` VARCHAR(255) NULL COLLATE 'latin1_swedish_ci',
	`potongan_bendahara` BIGINT(19) NULL
) ENGINE=MyISAM;

-- Dumping structure for view sigap2.vgaji_tu_smp
-- Creating temporary table to overcome VIEW dependency errors
CREATE TABLE `vgaji_tu_smp` (
	`id` INT(10) NOT NULL,
	`pid` INT(10) NULL,
	`pegawai` VARCHAR(50) NULL COLLATE 'utf8mb4_general_ci',
	`jenjang_id` INT(10) NULL,
	`jabatan_id` INT(10) NULL,
	`lama_kerja` INT(10) NULL,
	`ijasah` INT(10) NULL,
	`type_jabatan` INT(10) NULL,
	`tambahan` INT(10) NULL,
	`sertif` INT(10) NULL,
	`gapok` BIGINT(19) NULL,
	`kehadiran` INT(10) NULL,
	`value_kehadiran` BIGINT(19) NULL,
	`lembur` INT(10) NULL,
	`value_lembur` BIGINT(19) NULL,
	`value_reward` BIGINT(19) NULL,
	`value_inval` BIGINT(19) NULL,
	`piket_count` INT(10) NULL,
	`value_piket` BIGINT(19) NULL,
	`tugastambahan` BIGINT(19) NULL,
	`tj_jabatan` BIGINT(19) NULL,
	`tunjangan2` BIGINT(19) NULL,
	`sub_total` BIGINT(19) NULL,
	`potongan` BIGINT(19) NULL,
	`penyesuaian` BIGINT(19) NULL,
	`total` BIGINT(19) NULL,
	`voucher` BIGINT(19) NULL,
	`tahun` YEAR NULL,
	`bulan` INT(10) NULL,
	`rekbank` VARCHAR(255) NULL COLLATE 'latin1_swedish_ci',
	`potongan_bendahara` BIGINT(19) NULL
) ENGINE=MyISAM;

-- Dumping structure for view sigap2.vgaji_tu_tk
-- Creating temporary table to overcome VIEW dependency errors
CREATE TABLE `vgaji_tu_tk` (
	`id` INT(10) NOT NULL,
	`pid` INT(10) NULL,
	`pegawai` VARCHAR(50) NULL COLLATE 'utf8mb4_general_ci',
	`jenjang_id` INT(10) NULL,
	`jabatan_id` INT(10) NULL,
	`ijasah` INT(10) NULL,
	`type_jabatan` INT(10) NULL,
	`tambahan` INT(10) NULL,
	`lama_kerja` INT(10) NULL,
	`sertif` INT(10) NULL,
	`kehadiran` INT(10) NULL,
	`value_kehadiran` BIGINT(19) NULL,
	`gapok` BIGINT(19) NULL,
	`lembur` INT(10) NULL,
	`value_lembur` BIGINT(19) NULL,
	`value_reward` BIGINT(19) NULL,
	`value_inval` BIGINT(19) NULL,
	`piket_count` INT(10) NULL,
	`value_piket` BIGINT(19) NULL,
	`tugastambahan` BIGINT(19) NULL,
	`tj_jabatan` BIGINT(19) NULL,
	`tunjangan2` BIGINT(19) NULL,
	`potongan` BIGINT(19) NULL,
	`sub_total` BIGINT(19) NULL,
	`penyesuaian` BIGINT(19) NULL,
	`total` BIGINT(19) NULL,
	`voucher` BIGINT(19) NULL,
	`tahun` YEAR NULL,
	`bulan` INT(10) NULL,
	`rekbank` VARCHAR(255) NULL COLLATE 'latin1_swedish_ci',
	`potongan_bendahara` BIGINT(19) NULL
) ENGINE=MyISAM;

-- Dumping structure for view sigap2.v_gajisd
-- Creating temporary table to overcome VIEW dependency errors
CREATE TABLE `v_gajisd` (
	`pegawai` VARCHAR(50) NULL COLLATE 'utf8mb4_general_ci',
	`rekbank` VARCHAR(255) NULL COLLATE 'latin1_swedish_ci',
	`total` BIGINT(19) NULL,
	`potongan` BIGINT(19) NULL,
	`pid` INT(10) NULL
) ENGINE=MyISAM;

-- Dumping structure for view sigap2.v_gajisma
-- Creating temporary table to overcome VIEW dependency errors
CREATE TABLE `v_gajisma` (
	`pegawai` VARCHAR(50) NULL COLLATE 'utf8mb4_general_ci',
	`rekbank` VARCHAR(255) NULL COLLATE 'latin1_swedish_ci',
	`total` BIGINT(19) NULL,
	`potongan` BIGINT(19) NULL,
	`pid` INT(10) NULL
) ENGINE=MyISAM;

-- Dumping structure for view sigap2.v_gaji_guru_smk
-- Creating temporary table to overcome VIEW dependency errors
CREATE TABLE `v_gaji_guru_smk` (
	`pegawai` VARCHAR(50) NULL COLLATE 'utf8mb4_general_ci',
	`rekbank` VARCHAR(255) NULL COLLATE 'latin1_swedish_ci',
	`total` BIGINT(19) NULL,
	`potongan` BIGINT(19) NULL,
	`pid` INT(10) NULL
) ENGINE=MyISAM;

-- Dumping structure for view sigap2.v_gaji_karyawan_sd
-- Creating temporary table to overcome VIEW dependency errors
CREATE TABLE `v_gaji_karyawan_sd` (
	`pegawai` VARCHAR(50) NULL COLLATE 'utf8mb4_general_ci',
	`rekbank` VARCHAR(255) NULL COLLATE 'latin1_swedish_ci',
	`total` BIGINT(19) NULL,
	`potongan` BIGINT(19) NULL,
	`pid` INT(10) NULL
) ENGINE=MyISAM;

-- Dumping structure for view sigap2.v_gaji_karyawan_sma
-- Creating temporary table to overcome VIEW dependency errors
CREATE TABLE `v_gaji_karyawan_sma` (
	`pegawai` VARCHAR(50) NULL COLLATE 'utf8mb4_general_ci',
	`rekbank` VARCHAR(255) NULL COLLATE 'latin1_swedish_ci',
	`total` BIGINT(19) NULL,
	`potongan` BIGINT(19) NULL,
	`pid` INT(10) NULL
) ENGINE=MyISAM;

-- Dumping structure for view sigap2.v_gaji_karyawan_smk
-- Creating temporary table to overcome VIEW dependency errors
CREATE TABLE `v_gaji_karyawan_smk` (
	`pegawai` VARCHAR(50) NULL COLLATE 'utf8mb4_general_ci',
	`rekbank` VARCHAR(255) NULL COLLATE 'latin1_swedish_ci',
	`total` BIGINT(19) NULL,
	`potongan` BIGINT(19) NULL,
	`pid` INT(10) NULL
) ENGINE=MyISAM;

-- Dumping structure for view sigap2.v_gaji_karyawan_smp
-- Creating temporary table to overcome VIEW dependency errors
CREATE TABLE `v_gaji_karyawan_smp` (
	`pegawai` VARCHAR(50) NULL COLLATE 'utf8mb4_general_ci',
	`rekbank` VARCHAR(255) NULL COLLATE 'latin1_swedish_ci',
	`total` BIGINT(19) NULL,
	`potongan` BIGINT(19) NULL,
	`pid` INT(10) NULL
) ENGINE=MyISAM;

-- Dumping structure for view sigap2.v_gaji_karyawan_tk
-- Creating temporary table to overcome VIEW dependency errors
CREATE TABLE `v_gaji_karyawan_tk` (
	`pegawai` VARCHAR(50) NULL COLLATE 'utf8mb4_general_ci',
	`rekbank` VARCHAR(255) NULL COLLATE 'latin1_swedish_ci',
	`total` BIGINT(19) NULL,
	`potongan` BIGINT(19) NULL,
	`pid` INT(10) NULL
) ENGINE=MyISAM;

-- Dumping structure for view sigap2.v_gaji_smp
-- Creating temporary table to overcome VIEW dependency errors
CREATE TABLE `v_gaji_smp` (
	`pegawai` VARCHAR(50) NULL COLLATE 'utf8mb4_general_ci',
	`rekbank` VARCHAR(255) NULL COLLATE 'latin1_swedish_ci',
	`total` BIGINT(19) NULL,
	`potongan` BIGINT(19) NULL,
	`pid` INT(10) NULL
) ENGINE=MyISAM;

-- Dumping structure for view sigap2.v_gaji_tk
-- Creating temporary table to overcome VIEW dependency errors
CREATE TABLE `v_gaji_tk` (
	`pegawai` VARCHAR(50) NULL COLLATE 'utf8mb4_general_ci',
	`rekbank` VARCHAR(255) NULL COLLATE 'latin1_swedish_ci',
	`total` BIGINT(19) NULL,
	`potongan` BIGINT(19) NULL,
	`pid` INT(10) NULL
) ENGINE=MyISAM;

-- Dumping structure for view sigap2.v_gaji_tu_sd
-- Creating temporary table to overcome VIEW dependency errors
CREATE TABLE `v_gaji_tu_sd` (
	`pegawai` VARCHAR(50) NULL COLLATE 'utf8mb4_general_ci',
	`rekbank` VARCHAR(255) NULL COLLATE 'latin1_swedish_ci',
	`total` BIGINT(19) NULL,
	`potongan` BIGINT(19) NULL,
	`pid` INT(10) NULL
) ENGINE=MyISAM;

-- Dumping structure for view sigap2.v_gaji_tu_sma
-- Creating temporary table to overcome VIEW dependency errors
CREATE TABLE `v_gaji_tu_sma` (
	`pegawai` VARCHAR(50) NULL COLLATE 'utf8mb4_general_ci',
	`total` BIGINT(19) NULL,
	`rekbank` VARCHAR(255) NULL COLLATE 'latin1_swedish_ci',
	`potongan` BIGINT(19) NULL,
	`pid` INT(10) NULL
) ENGINE=MyISAM;

-- Dumping structure for view sigap2.v_gaji_tu_smk
-- Creating temporary table to overcome VIEW dependency errors
CREATE TABLE `v_gaji_tu_smk` (
	`pegawai` VARCHAR(50) NULL COLLATE 'utf8mb4_general_ci',
	`rekbank` VARCHAR(255) NULL COLLATE 'latin1_swedish_ci',
	`total` BIGINT(19) NULL,
	`potongan` BIGINT(19) NULL,
	`pid` INT(10) NULL
) ENGINE=MyISAM;

-- Dumping structure for view sigap2.v_gaji_tu_smp
-- Creating temporary table to overcome VIEW dependency errors
CREATE TABLE `v_gaji_tu_smp` (
	`rekbank` VARCHAR(255) NULL COLLATE 'latin1_swedish_ci',
	`total` BIGINT(19) NULL,
	`potongan` BIGINT(19) NULL,
	`pid` INT(10) NULL,
	`pegawai` VARCHAR(50) NULL COLLATE 'utf8mb4_general_ci'
) ENGINE=MyISAM;

-- Dumping structure for view sigap2.v_gaji_tu_tk
-- Creating temporary table to overcome VIEW dependency errors
CREATE TABLE `v_gaji_tu_tk` (
	`pegawai` VARCHAR(50) NULL COLLATE 'utf8mb4_general_ci',
	`rekbank` VARCHAR(255) NULL COLLATE 'latin1_swedish_ci',
	`total` BIGINT(19) NULL,
	`potongan` BIGINT(19) NULL,
	`pid` INT(10) NULL
) ENGINE=MyISAM;

-- Dumping structure for view sigap2.v_karyawan_sd
-- Creating temporary table to overcome VIEW dependency errors
CREATE TABLE `v_karyawan_sd` (
	`id` INT(10) NOT NULL,
	`datetime` DATETIME NULL,
	`createby` INT(10) NULL,
	`tahun` SMALLINT(5) NULL,
	`bulan` INT(10) NULL
) ENGINE=MyISAM;

-- Dumping structure for view sigap2.v_karyawan_sma
-- Creating temporary table to overcome VIEW dependency errors
CREATE TABLE `v_karyawan_sma` (
	`id` INT(10) NOT NULL,
	`datetime` DATETIME NULL,
	`createby` INT(10) NULL,
	`tahun` SMALLINT(5) NULL,
	`bulan` INT(10) NULL
) ENGINE=MyISAM;

-- Dumping structure for view sigap2.v_karyawan_smk
-- Creating temporary table to overcome VIEW dependency errors
CREATE TABLE `v_karyawan_smk` (
	`id` INT(10) NOT NULL,
	`datetime` DATETIME NULL,
	`createby` INT(10) NULL,
	`tahun` SMALLINT(5) NULL,
	`bulan` INT(10) NULL
) ENGINE=MyISAM;

-- Dumping structure for view sigap2.v_karyawan_smp
-- Creating temporary table to overcome VIEW dependency errors
CREATE TABLE `v_karyawan_smp` (
	`id` INT(10) NOT NULL,
	`datetime` DATETIME NULL,
	`createby` INT(10) NULL,
	`tahun` SMALLINT(5) NULL,
	`bulan` INT(10) NULL
) ENGINE=MyISAM;

-- Dumping structure for view sigap2.v_karyawan_tk
-- Creating temporary table to overcome VIEW dependency errors
CREATE TABLE `v_karyawan_tk` (
	`id` INT(10) NOT NULL,
	`datetime` DATETIME NULL,
	`createby` INT(10) NULL,
	`tahun` SMALLINT(5) NULL,
	`bulan` INT(10) NULL
) ENGINE=MyISAM;

-- Dumping structure for view sigap2.v_m_sd
-- Creating temporary table to overcome VIEW dependency errors
CREATE TABLE `v_m_sd` (
	`id` INT(10) NOT NULL,
	`datetime` DATETIME NULL,
	`createby` INT(10) NULL,
	`tahun` YEAR NULL,
	`bulan` INT(10) NULL
) ENGINE=MyISAM;

-- Dumping structure for view sigap2.v_m_sma
-- Creating temporary table to overcome VIEW dependency errors
CREATE TABLE `v_m_sma` (
	`id` INT(10) NOT NULL,
	`datetime` DATETIME NULL,
	`createby` INT(10) NULL,
	`tahun` INT(10) NULL,
	`bulan` INT(10) NULL
) ENGINE=MyISAM;

-- Dumping structure for view sigap2.v_m_smk
-- Creating temporary table to overcome VIEW dependency errors
CREATE TABLE `v_m_smk` (
	`id` INT(10) NOT NULL,
	`datetime` DATETIME NULL,
	`createby` INT(10) NULL,
	`tahun` YEAR NULL,
	`bulan` INT(10) NULL
) ENGINE=MyISAM;

-- Dumping structure for view sigap2.v_m_smp
-- Creating temporary table to overcome VIEW dependency errors
CREATE TABLE `v_m_smp` (
	`id` INT(10) NOT NULL,
	`datetime` DATETIME NULL,
	`createby` INT(10) NULL,
	`tahun` YEAR NULL,
	`bulan` INT(10) NULL
) ENGINE=MyISAM;

-- Dumping structure for view sigap2.v_m_tk
-- Creating temporary table to overcome VIEW dependency errors
CREATE TABLE `v_m_tk` (
	`id` INT(10) NOT NULL,
	`datetime` DATETIME NULL,
	`createby` INT(10) NULL,
	`tahun` YEAR NULL,
	`bulan` INT(10) NULL
) ENGINE=MyISAM;

-- Dumping structure for view sigap2.v_pegawai_sd
-- Creating temporary table to overcome VIEW dependency errors
CREATE TABLE `v_pegawai_sd` (
	`id` INT(10) NOT NULL,
	`pid` INT(10) NULL,
	`nip` VARCHAR(50) NULL COLLATE 'latin1_swedish_ci',
	`username` VARCHAR(255) NULL COLLATE 'latin1_swedish_ci',
	`password` VARCHAR(255) NULL COLLATE 'latin1_swedish_ci',
	`jenjang_id` INT(10) NULL,
	`jabatan` INT(10) NULL,
	`periode_jabatan` INT(10) NULL,
	`jjm` INT(10) NULL,
	`status_peg` INT(10) NULL,
	`type` INT(10) NULL,
	`sertif` INT(10) NULL,
	`tambahan` INT(10) NULL,
	`lama_kerja` INT(10) NULL,
	`nama` VARCHAR(255) NULL COLLATE 'latin1_swedish_ci',
	`alamat` VARCHAR(255) NULL COLLATE 'latin1_swedish_ci',
	`email` VARCHAR(255) NULL COLLATE 'latin1_swedish_ci',
	`wa` VARCHAR(255) NULL COLLATE 'latin1_swedish_ci',
	`hp` VARCHAR(255) NULL COLLATE 'latin1_swedish_ci',
	`tgllahir` DATE NULL,
	`rekbank` VARCHAR(255) NULL COLLATE 'latin1_swedish_ci',
	`pendidikan` INT(10) NULL,
	`jurusan` VARCHAR(50) NULL COLLATE 'latin1_swedish_ci',
	`agama` VARCHAR(20) NULL COLLATE 'latin1_swedish_ci',
	`status` VARCHAR(20) NULL COLLATE 'latin1_swedish_ci',
	`jenkel` VARCHAR(20) NULL COLLATE 'latin1_swedish_ci',
	`foto` VARCHAR(255) NULL COLLATE 'latin1_swedish_ci',
	`file_cv` VARCHAR(255) NULL COLLATE 'latin1_swedish_ci',
	`mulai_bekerja` YEAR NULL,
	`keterangan` VARCHAR(255) NULL COLLATE 'latin1_swedish_ci',
	`level` INT(10) NULL,
	`aktif` TINYINT(3) NULL,
	`kehadiran` INT(10) NULL
) ENGINE=MyISAM;

-- Dumping structure for view sigap2.v_pegawai_sma
-- Creating temporary table to overcome VIEW dependency errors
CREATE TABLE `v_pegawai_sma` (
	`id` INT(10) NOT NULL,
	`pid` INT(10) NULL,
	`nip` VARCHAR(50) NULL COLLATE 'latin1_swedish_ci',
	`username` VARCHAR(255) NULL COLLATE 'latin1_swedish_ci',
	`password` VARCHAR(255) NULL COLLATE 'latin1_swedish_ci',
	`jenjang_id` INT(10) NULL,
	`jabatan` INT(10) NULL,
	`periode_jabatan` INT(10) NULL,
	`jjm` INT(10) NULL,
	`status_peg` INT(10) NULL,
	`type` INT(10) NULL,
	`sertif` INT(10) NULL,
	`tambahan` INT(10) NULL,
	`lama_kerja` INT(10) NULL,
	`nama` VARCHAR(255) NULL COLLATE 'latin1_swedish_ci',
	`alamat` VARCHAR(255) NULL COLLATE 'latin1_swedish_ci',
	`wa` VARCHAR(255) NULL COLLATE 'latin1_swedish_ci',
	`email` VARCHAR(255) NULL COLLATE 'latin1_swedish_ci',
	`hp` VARCHAR(255) NULL COLLATE 'latin1_swedish_ci',
	`tgllahir` DATE NULL,
	`rekbank` VARCHAR(255) NULL COLLATE 'latin1_swedish_ci',
	`pendidikan` INT(10) NULL,
	`jurusan` VARCHAR(50) NULL COLLATE 'latin1_swedish_ci',
	`agama` VARCHAR(20) NULL COLLATE 'latin1_swedish_ci',
	`jenkel` VARCHAR(20) NULL COLLATE 'latin1_swedish_ci',
	`status` VARCHAR(20) NULL COLLATE 'latin1_swedish_ci',
	`foto` VARCHAR(255) NULL COLLATE 'latin1_swedish_ci',
	`file_cv` VARCHAR(255) NULL COLLATE 'latin1_swedish_ci',
	`mulai_bekerja` YEAR NULL,
	`keterangan` VARCHAR(255) NULL COLLATE 'latin1_swedish_ci',
	`level` INT(10) NULL,
	`aktif` TINYINT(3) NULL,
	`kehadiran` INT(10) NULL
) ENGINE=MyISAM;

-- Dumping structure for view sigap2.v_pegawai_smk
-- Creating temporary table to overcome VIEW dependency errors
CREATE TABLE `v_pegawai_smk` (
	`id` INT(10) NOT NULL,
	`pid` INT(10) NULL,
	`nip` VARCHAR(50) NULL COLLATE 'latin1_swedish_ci',
	`username` VARCHAR(255) NULL COLLATE 'latin1_swedish_ci',
	`password` VARCHAR(255) NULL COLLATE 'latin1_swedish_ci',
	`jenjang_id` INT(10) NULL,
	`jabatan` INT(10) NULL,
	`periode_jabatan` INT(10) NULL,
	`jjm` INT(10) NULL,
	`status_peg` INT(10) NULL,
	`type` INT(10) NULL,
	`sertif` INT(10) NULL,
	`tambahan` INT(10) NULL,
	`lama_kerja` INT(10) NULL,
	`nama` VARCHAR(255) NULL COLLATE 'latin1_swedish_ci',
	`alamat` VARCHAR(255) NULL COLLATE 'latin1_swedish_ci',
	`email` VARCHAR(255) NULL COLLATE 'latin1_swedish_ci',
	`wa` VARCHAR(255) NULL COLLATE 'latin1_swedish_ci',
	`hp` VARCHAR(255) NULL COLLATE 'latin1_swedish_ci',
	`tgllahir` DATE NULL,
	`rekbank` VARCHAR(255) NULL COLLATE 'latin1_swedish_ci',
	`pendidikan` INT(10) NULL,
	`jurusan` VARCHAR(50) NULL COLLATE 'latin1_swedish_ci',
	`agama` VARCHAR(20) NULL COLLATE 'latin1_swedish_ci',
	`jenkel` VARCHAR(20) NULL COLLATE 'latin1_swedish_ci',
	`status` VARCHAR(20) NULL COLLATE 'latin1_swedish_ci',
	`foto` VARCHAR(255) NULL COLLATE 'latin1_swedish_ci',
	`file_cv` VARCHAR(255) NULL COLLATE 'latin1_swedish_ci',
	`mulai_bekerja` YEAR NULL,
	`keterangan` VARCHAR(255) NULL COLLATE 'latin1_swedish_ci',
	`level` INT(10) NULL,
	`aktif` TINYINT(3) NULL,
	`kehadiran` INT(10) NULL
) ENGINE=MyISAM;

-- Dumping structure for view sigap2.v_pegawai_smp
-- Creating temporary table to overcome VIEW dependency errors
CREATE TABLE `v_pegawai_smp` (
	`id` INT(10) NOT NULL,
	`pid` INT(10) NULL,
	`nip` VARCHAR(50) NULL COLLATE 'latin1_swedish_ci',
	`username` VARCHAR(255) NULL COLLATE 'latin1_swedish_ci',
	`password` VARCHAR(255) NULL COLLATE 'latin1_swedish_ci',
	`jenjang_id` INT(10) NULL,
	`jabatan` INT(10) NULL,
	`periode_jabatan` INT(10) NULL,
	`jjm` INT(10) NULL,
	`status_peg` INT(10) NULL,
	`type` INT(10) NULL,
	`sertif` INT(10) NULL,
	`tambahan` INT(10) NULL,
	`lama_kerja` INT(10) NULL,
	`nama` VARCHAR(255) NULL COLLATE 'latin1_swedish_ci',
	`alamat` VARCHAR(255) NULL COLLATE 'latin1_swedish_ci',
	`email` VARCHAR(255) NULL COLLATE 'latin1_swedish_ci',
	`wa` VARCHAR(255) NULL COLLATE 'latin1_swedish_ci',
	`hp` VARCHAR(255) NULL COLLATE 'latin1_swedish_ci',
	`tgllahir` DATE NULL,
	`rekbank` VARCHAR(255) NULL COLLATE 'latin1_swedish_ci',
	`pendidikan` INT(10) NULL,
	`jurusan` VARCHAR(50) NULL COLLATE 'latin1_swedish_ci',
	`agama` VARCHAR(20) NULL COLLATE 'latin1_swedish_ci',
	`jenkel` VARCHAR(20) NULL COLLATE 'latin1_swedish_ci',
	`status` VARCHAR(20) NULL COLLATE 'latin1_swedish_ci',
	`foto` VARCHAR(255) NULL COLLATE 'latin1_swedish_ci',
	`file_cv` VARCHAR(255) NULL COLLATE 'latin1_swedish_ci',
	`mulai_bekerja` YEAR NULL,
	`keterangan` VARCHAR(255) NULL COLLATE 'latin1_swedish_ci',
	`level` INT(10) NULL,
	`aktif` TINYINT(3) NULL,
	`kehadiran` INT(10) NULL
) ENGINE=MyISAM;

-- Dumping structure for view sigap2.v_pegawai_tk
-- Creating temporary table to overcome VIEW dependency errors
CREATE TABLE `v_pegawai_tk` (
	`id` INT(10) NOT NULL,
	`pid` INT(10) NULL,
	`nip` VARCHAR(50) NULL COLLATE 'latin1_swedish_ci',
	`username` VARCHAR(255) NULL COLLATE 'latin1_swedish_ci',
	`password` VARCHAR(255) NULL COLLATE 'latin1_swedish_ci',
	`jenjang_id` INT(10) NULL,
	`jabatan` INT(10) NULL,
	`periode_jabatan` INT(10) NULL,
	`jjm` INT(10) NULL,
	`status_peg` INT(10) NULL,
	`type` INT(10) NULL,
	`sertif` INT(10) NULL,
	`tambahan` INT(10) NULL,
	`lama_kerja` INT(10) NULL,
	`nama` VARCHAR(255) NULL COLLATE 'latin1_swedish_ci',
	`alamat` VARCHAR(255) NULL COLLATE 'latin1_swedish_ci',
	`email` VARCHAR(255) NULL COLLATE 'latin1_swedish_ci',
	`wa` VARCHAR(255) NULL COLLATE 'latin1_swedish_ci',
	`hp` VARCHAR(255) NULL COLLATE 'latin1_swedish_ci',
	`tgllahir` DATE NULL,
	`rekbank` VARCHAR(255) NULL COLLATE 'latin1_swedish_ci',
	`pendidikan` INT(10) NULL,
	`jurusan` VARCHAR(50) NULL COLLATE 'latin1_swedish_ci',
	`agama` VARCHAR(20) NULL COLLATE 'latin1_swedish_ci',
	`jenkel` VARCHAR(20) NULL COLLATE 'latin1_swedish_ci',
	`status` VARCHAR(20) NULL COLLATE 'latin1_swedish_ci',
	`foto` VARCHAR(255) NULL COLLATE 'latin1_swedish_ci',
	`file_cv` VARCHAR(255) NULL COLLATE 'latin1_swedish_ci',
	`mulai_bekerja` YEAR NULL,
	`keterangan` VARCHAR(255) NULL COLLATE 'latin1_swedish_ci',
	`level` INT(10) NULL,
	`aktif` TINYINT(3) NULL,
	`kehadiran` INT(10) NULL
) ENGINE=MyISAM;

-- Dumping structure for view sigap2.v_pengurus_yayasan
-- Creating temporary table to overcome VIEW dependency errors
CREATE TABLE `v_pengurus_yayasan` (
	`id` INT(10) NOT NULL,
	`nip` VARCHAR(50) NULL COLLATE 'latin1_swedish_ci',
	`username` VARCHAR(255) NULL COLLATE 'latin1_swedish_ci',
	`password` VARCHAR(255) NULL COLLATE 'latin1_swedish_ci',
	`jenjang_id` INT(10) NULL,
	`jabatan` INT(10) NULL,
	`periode_jabatan` INT(10) NULL,
	`jjm` INT(10) NULL,
	`status_peg` INT(10) NULL,
	`type` INT(10) NULL,
	`sertif` INT(10) NULL,
	`tambahan` INT(10) NULL,
	`lama_kerja` INT(10) NULL,
	`nama` VARCHAR(255) NULL COLLATE 'latin1_swedish_ci',
	`alamat` VARCHAR(255) NULL COLLATE 'latin1_swedish_ci',
	`email` VARCHAR(255) NULL COLLATE 'latin1_swedish_ci',
	`wa` VARCHAR(255) NULL COLLATE 'latin1_swedish_ci',
	`hp` VARCHAR(255) NULL COLLATE 'latin1_swedish_ci',
	`tgllahir` DATE NULL,
	`rekbank` VARCHAR(255) NULL COLLATE 'latin1_swedish_ci',
	`pendidikan` INT(10) NULL,
	`jurusan` VARCHAR(50) NULL COLLATE 'latin1_swedish_ci',
	`agama` VARCHAR(20) NULL COLLATE 'latin1_swedish_ci',
	`jenkel` VARCHAR(20) NULL COLLATE 'latin1_swedish_ci',
	`status` VARCHAR(20) NULL COLLATE 'latin1_swedish_ci',
	`foto` VARCHAR(255) NULL COLLATE 'latin1_swedish_ci',
	`file_cv` VARCHAR(255) NULL COLLATE 'latin1_swedish_ci',
	`mulai_bekerja` YEAR NULL,
	`keterangan` VARCHAR(255) NULL COLLATE 'latin1_swedish_ci',
	`level` INT(10) NULL,
	`aktif` TINYINT(3) NULL,
	`kehadiran` INT(10) NULL
) ENGINE=MyISAM;

-- Dumping structure for view sigap2.v_totalgaji
-- Creating temporary table to overcome VIEW dependency errors
CREATE TABLE `v_totalgaji` (
	`id` INT(10) NOT NULL,
	`tahun` YEAR NULL,
	`bulan` INT(10) NULL,
	`datetime` DATETIME NULL,
	`pegawai` VARCHAR(50) NULL COLLATE 'utf8mb4_general_ci',
	`total` BIGINT(19) NULL,
	`id1` INT(10) NOT NULL,
	`status` VARCHAR(50) NULL COLLATE 'utf8mb4_general_ci'
) ENGINE=MyISAM;

-- Dumping structure for view sigap2.v_totalgajikaryawan
-- Creating temporary table to overcome VIEW dependency errors
CREATE TABLE `v_totalgajikaryawan` (
	`id1` INT(10) NOT NULL,
	`datetime` DATETIME NULL,
	`pegawai` VARCHAR(50) NULL COLLATE 'utf8mb4_general_ci',
	`total` BIGINT(19) NULL,
	`tahun` SMALLINT(5) NULL,
	`bulan` INT(10) NULL,
	`id` INT(10) NOT NULL,
	`status` INT(10) NULL
) ENGINE=MyISAM;

-- Dumping structure for view sigap2.v_totalgajikaryawansma
-- Creating temporary table to overcome VIEW dependency errors
CREATE TABLE `v_totalgajikaryawansma` (
	`id` INT(10) NOT NULL,
	`tahun` SMALLINT(5) NULL,
	`bulan` INT(10) NULL,
	`pegawai` VARCHAR(50) NULL COLLATE 'utf8mb4_general_ci',
	`total` BIGINT(19) NULL,
	`datetime` DATETIME NULL
) ENGINE=MyISAM;

-- Dumping structure for view sigap2.v_totalgajikaryawansmk
-- Creating temporary table to overcome VIEW dependency errors
CREATE TABLE `v_totalgajikaryawansmk` (
	`id1` INT(10) NOT NULL,
	`tahun` SMALLINT(5) NULL,
	`bulan` INT(10) NULL,
	`datetime` DATETIME NULL,
	`pegawai` VARCHAR(50) NULL COLLATE 'utf8mb4_general_ci',
	`total` BIGINT(19) NULL,
	`id` INT(10) NOT NULL,
	`status` INT(10) NULL
) ENGINE=MyISAM;

-- Dumping structure for view sigap2.v_totalgajikaryawansmp
-- Creating temporary table to overcome VIEW dependency errors
CREATE TABLE `v_totalgajikaryawansmp` (
	`id` INT(10) NOT NULL,
	`datetime` DATETIME NULL,
	`tahun` SMALLINT(5) NULL,
	`bulan` INT(10) NULL,
	`pegawai` VARCHAR(50) NULL COLLATE 'utf8mb4_general_ci',
	`total` BIGINT(19) NULL,
	`id1` INT(10) NOT NULL,
	`status` INT(10) NULL
) ENGINE=MyISAM;

-- Dumping structure for view sigap2.v_totalgajikaryawantk
-- Creating temporary table to overcome VIEW dependency errors
CREATE TABLE `v_totalgajikaryawantk` (
	`id` INT(10) NOT NULL,
	`datetime` DATETIME NULL,
	`tahun` SMALLINT(5) NULL,
	`bulan` INT(10) NULL,
	`pegawai` VARCHAR(50) NULL COLLATE 'utf8mb4_general_ci',
	`total` BIGINT(19) NULL,
	`id1` INT(10) NOT NULL,
	`status` INT(10) NULL
) ENGINE=MyISAM;

-- Dumping structure for view sigap2.v_totalgajisma
-- Creating temporary table to overcome VIEW dependency errors
CREATE TABLE `v_totalgajisma` (
	`id` INT(10) NOT NULL,
	`tahun` INT(10) NULL,
	`bulan` INT(10) NULL,
	`pegawai` VARCHAR(50) NULL COLLATE 'utf8mb4_general_ci',
	`total` BIGINT(19) NULL,
	`id1` INT(10) NOT NULL,
	`status` INT(10) NULL
) ENGINE=MyISAM;

-- Dumping structure for view sigap2.v_totalgajismk
-- Creating temporary table to overcome VIEW dependency errors
CREATE TABLE `v_totalgajismk` (
	`id` INT(10) NOT NULL,
	`tahun` YEAR NULL,
	`bulan` INT(10) NULL,
	`datetime` DATETIME NULL,
	`pegawai` VARCHAR(50) NULL COLLATE 'utf8mb4_general_ci',
	`total` BIGINT(19) NULL,
	`id1` INT(10) NOT NULL,
	`status` INT(10) NULL
) ENGINE=MyISAM;

-- Dumping structure for view sigap2.v_totalgajismp
-- Creating temporary table to overcome VIEW dependency errors
CREATE TABLE `v_totalgajismp` (
	`id` INT(10) NOT NULL,
	`datetime` DATETIME NULL,
	`tahun` YEAR NULL,
	`bulan` INT(10) NULL,
	`pegawai` VARCHAR(50) NULL COLLATE 'utf8mb4_general_ci',
	`total` BIGINT(19) NULL,
	`id1` INT(10) NOT NULL,
	`status` INT(10) NULL
) ENGINE=MyISAM;

-- Dumping structure for view sigap2.v_totalgajitk
-- Creating temporary table to overcome VIEW dependency errors
CREATE TABLE `v_totalgajitk` (
	`id` INT(10) NOT NULL,
	`tahun` YEAR NULL,
	`bulan` INT(10) NULL,
	`datetime` DATETIME NULL,
	`pegawai` VARCHAR(50) NULL COLLATE 'utf8mb4_general_ci',
	`total` BIGINT(19) NULL,
	`id1` INT(10) NOT NULL,
	`status` INT(10) NULL
) ENGINE=MyISAM;

-- Dumping structure for view sigap2.v_totalgajitu
-- Creating temporary table to overcome VIEW dependency errors
CREATE TABLE `v_totalgajitu` (
	`id1` INT(10) NOT NULL,
	`tahun` YEAR NULL,
	`bulan` INT(10) NULL,
	`datetime` DATETIME NULL,
	`pegawai` VARCHAR(50) NULL COLLATE 'utf8mb4_general_ci',
	`total` BIGINT(19) NULL,
	`id` INT(10) NOT NULL,
	`status` INT(10) NULL
) ENGINE=MyISAM;

-- Dumping structure for view sigap2.v_totalgajitusma
-- Creating temporary table to overcome VIEW dependency errors
CREATE TABLE `v_totalgajitusma` (
	`id` INT(10) NOT NULL,
	`datetime` DATETIME NULL,
	`tahun` YEAR NULL,
	`bulan` INT(10) NULL,
	`pegawai` VARCHAR(50) NULL COLLATE 'utf8mb4_general_ci',
	`total` BIGINT(19) NULL,
	`id1` INT(10) NOT NULL,
	`status` INT(10) NULL
) ENGINE=MyISAM;

-- Dumping structure for view sigap2.v_totalgajitusmk
-- Creating temporary table to overcome VIEW dependency errors
CREATE TABLE `v_totalgajitusmk` (
	`id` INT(10) NOT NULL,
	`tahun` YEAR NULL,
	`bulan` INT(10) NULL,
	`datetime` DATETIME NULL,
	`pegawai` VARCHAR(50) NULL COLLATE 'utf8mb4_general_ci',
	`total` BIGINT(19) NULL,
	`id1` INT(10) NOT NULL,
	`status` INT(10) NULL
) ENGINE=MyISAM;

-- Dumping structure for view sigap2.v_totalgajitusmp
-- Creating temporary table to overcome VIEW dependency errors
CREATE TABLE `v_totalgajitusmp` (
	`id` INT(10) NOT NULL,
	`tahun` YEAR NULL,
	`bulan` INT(10) NULL,
	`pegawai` VARCHAR(50) NULL COLLATE 'utf8mb4_general_ci',
	`total` BIGINT(19) NULL,
	`datetime` DATETIME NULL,
	`status` INT(10) NULL,
	`id1` INT(10) NOT NULL
) ENGINE=MyISAM;

-- Dumping structure for view sigap2.v_totalgajitutk
-- Creating temporary table to overcome VIEW dependency errors
CREATE TABLE `v_totalgajitutk` (
	`id` INT(10) NOT NULL,
	`tahun` YEAR NULL,
	`bulan` INT(10) NULL,
	`datetime` DATETIME NULL,
	`pegawai` VARCHAR(50) NULL COLLATE 'utf8mb4_general_ci',
	`total` BIGINT(19) NULL,
	`id1` INT(10) NOT NULL,
	`status` INT(10) NULL
) ENGINE=MyISAM;

-- Dumping structure for view sigap2.v_tu_sd
-- Creating temporary table to overcome VIEW dependency errors
CREATE TABLE `v_tu_sd` (
	`id` INT(10) NOT NULL,
	`datetime` DATETIME NULL,
	`createby` INT(10) NULL,
	`tahun` YEAR NULL,
	`bulan` INT(10) NULL
) ENGINE=MyISAM;

-- Dumping structure for view sigap2.v_tu_sma
-- Creating temporary table to overcome VIEW dependency errors
CREATE TABLE `v_tu_sma` (
	`id` INT(10) NOT NULL,
	`datetime` DATETIME NULL,
	`createby` INT(10) NULL,
	`tahun` YEAR NULL,
	`bulan` INT(10) NULL
) ENGINE=MyISAM;

-- Dumping structure for view sigap2.v_tu_smk
-- Creating temporary table to overcome VIEW dependency errors
CREATE TABLE `v_tu_smk` (
	`id` INT(10) NOT NULL,
	`datetime` DATETIME NULL,
	`createby` INT(10) NULL,
	`tahun` YEAR NULL,
	`bulan` INT(10) NULL
) ENGINE=MyISAM;

-- Dumping structure for view sigap2.v_tu_smp
-- Creating temporary table to overcome VIEW dependency errors
CREATE TABLE `v_tu_smp` (
	`id` INT(10) NOT NULL,
	`datetime` DATETIME NULL,
	`createby` INT(10) NULL,
	`tahun` YEAR NULL,
	`bulan` INT(10) NULL
) ENGINE=MyISAM;

-- Dumping structure for view sigap2.v_tu_tk
-- Creating temporary table to overcome VIEW dependency errors
CREATE TABLE `v_tu_tk` (
	`id` INT(10) NOT NULL,
	`datetime` DATETIME NULL,
	`createby` INT(10) NULL,
	`tahun` YEAR NULL,
	`bulan` INT(10) NULL
) ENGINE=MyISAM;

-- Dumping structure for view sigap2.v_yayasan
-- Creating temporary table to overcome VIEW dependency errors
CREATE TABLE `v_yayasan` (
	`id` INT(10) NOT NULL,
	`bulan` INT(10) NULL,
	`tahun` INT(10) NULL,
	`m_id` INT(10) NULL,
	`id_pegawai` INT(10) NULL,
	`gaji_pokok` BIGINT(19) NULL,
	`potongan` BIGINT(19) NULL,
	`total` BIGINT(19) NULL,
	`rekbank` VARCHAR(255) NULL COLLATE 'latin1_swedish_ci'
) ENGINE=MyISAM;

-- Dumping structure for table sigap2.yayasan
CREATE TABLE IF NOT EXISTS `yayasan` (
  `id` int NOT NULL AUTO_INCREMENT,
  `m_id` int DEFAULT NULL,
  `id_pegawai` int DEFAULT NULL,
  `datetime` datetime DEFAULT NULL,
  `gaji_pokok` bigint DEFAULT NULL,
  `potongan` bigint DEFAULT NULL,
  `total` bigint DEFAULT NULL,
  `tahun` int DEFAULT NULL,
  `bulan` int DEFAULT NULL,
  PRIMARY KEY (`id`) USING BTREE
) ENGINE=InnoDB AUTO_INCREMENT=17 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- Dumping data for table sigap2.yayasan: ~0 rows (approximately)
INSERT INTO `yayasan` (`id`, `m_id`, `id_pegawai`, `datetime`, `gaji_pokok`, `potongan`, `total`, `tahun`, `bulan`) VALUES
	(15, 10, 269, '2023-02-13 03:30:07', 7000000, 350000, 6650000, 2023, 4),
	(16, 10, 49, '2023-02-13 03:30:07', 900000, 1000, 899000, 2023, 4);

-- Dumping structure for view sigap2.m_jp_pegawai
-- Removing temporary table and create final VIEW structure
DROP TABLE IF EXISTS `m_jp_pegawai`;
CREATE ALGORITHM=UNDEFINED SQL SECURITY DEFINER VIEW `m_jp_pegawai` AS select `pegawai`.`id` AS `id`,`pegawai`.`nip` AS `nip`,`pegawai`.`jenjang_id` AS `jenjang_id`,`pegawai`.`nama` AS `nama`,`pegawai`.`kehadiran` AS `kehadiran`,`pegawai`.`jjm` AS `jjm`,`pegawai`.`jabatan` AS `jabatan`,`pegawai`.`type` AS `type` from `pegawai`;

-- Dumping structure for view sigap2.set_password
-- Removing temporary table and create final VIEW structure
DROP TABLE IF EXISTS `set_password`;
CREATE ALGORITHM=UNDEFINED SQL SECURITY DEFINER VIEW `set_password` AS select `pegawai`.`id` AS `id`,`pegawai`.`nip` AS `nip`,`pegawai`.`username` AS `username`,`pegawai`.`password` AS `password`,`pegawai`.`nama` AS `nama` from `pegawai`;

-- Dumping structure for view sigap2.slip_gaji_yayasan
-- Removing temporary table and create final VIEW structure
DROP TABLE IF EXISTS `slip_gaji_yayasan`;
CREATE ALGORITHM=UNDEFINED SQL SECURITY DEFINER VIEW `slip_gaji_yayasan` AS select `m_yayasan`.`id` AS `id`,`m_yayasan`.`bulan` AS `bulan`,`m_yayasan`.`tahun` AS `tahun`,`yayasan`.`id_pegawai` AS `id_pegawai`,`yayasan`.`total` AS `total`,`yayasan`.`id` AS `id1` from (`yayasan` join `m_yayasan` on((`m_yayasan`.`id` = `yayasan`.`m_id`)));

-- Dumping structure for view sigap2.vgaji_guru_sd
-- Removing temporary table and create final VIEW structure
DROP TABLE IF EXISTS `vgaji_guru_sd`;
CREATE ALGORITHM=UNDEFINED SQL SECURITY DEFINER VIEW `vgaji_guru_sd` AS select `gaji`.`id` AS `id`,`gaji`.`pid` AS `pid`,`gaji`.`pegawai` AS `pegawai`,`gaji`.`jenjang_id` AS `jenjang_id`,`gaji`.`jabatan_id` AS `jabatan_id`,`gaji`.`lama_kerja` AS `lama_kerja`,`gaji`.`type` AS `type`,`gaji`.`jenis_guru` AS `jenis_guru`,`gaji`.`tambahan` AS `tambahan`,`gaji`.`periode` AS `periode`,`gaji`.`tunjangan_periode` AS `tunjangan_periode`,`gaji`.`kehadiran` AS `kehadiran`,`gaji`.`jp` AS `jp`,`gaji`.`value_kehadiran` AS `value_kehadiran`,`gaji`.`gapok` AS `gapok`,`gaji`.`total_gapok` AS `total_gapok`,`gaji`.`lembur` AS `lembur`,`gaji`.`value_lembur` AS `value_lembur`,`gaji`.`value_reward` AS `value_reward`,`gaji`.`value_inval` AS `value_inval`,`gaji`.`piket_count` AS `piket_count`,`gaji`.`value_piket` AS `value_piket`,`gaji`.`tugastambahan` AS `tugastambahan`,`gaji`.`tj_jabatan` AS `tj_jabatan`,`gaji`.`sub_total` AS `sub_total`,`gaji`.`potongan` AS `potongan`,`gaji`.`penyesuaian` AS `penyesuaian`,`gaji`.`total` AS `total`,`gaji`.`voucher` AS `voucher`,`m_sd`.`tahun` AS `tahun`,`m_sd`.`bulan` AS `bulan`,`pegawai`.`rekbank` AS `rekbank`,`gaji`.`potongan_bendahara` AS `potongan_bendahara` from ((`gaji` join `m_sd` on(((`m_sd`.`id` = `gaji`.`pid`) and (`m_sd`.`tahun` = `gaji`.`tahun`) and (`m_sd`.`bulan` = `gaji`.`bulan`)))) join `pegawai` on((`gaji`.`pegawai` = `pegawai`.`nip`)));

-- Dumping structure for view sigap2.vgaji_guru_sma
-- Removing temporary table and create final VIEW structure
DROP TABLE IF EXISTS `vgaji_guru_sma`;
CREATE ALGORITHM=UNDEFINED SQL SECURITY DEFINER VIEW `vgaji_guru_sma` AS select `gaji_sma`.`id` AS `id`,`gaji_sma`.`pegawai` AS `pegawai`,`gaji_sma`.`jenjang_id` AS `jenjang_id`,`gaji_sma`.`jabatan_id` AS `jabatan_id`,`gaji_sma`.`lama_kerja` AS `lama_kerja`,`gaji_sma`.`type` AS `type`,`gaji_sma`.`jenis_guru` AS `jenis_guru`,`gaji_sma`.`tambahan` AS `tambahan`,`gaji_sma`.`periode` AS `periode`,`gaji_sma`.`tunjangan_periode` AS `tunjangan_periode`,`gaji_sma`.`kehadiran` AS `kehadiran`,`gaji_sma`.`value_kehadiran` AS `value_kehadiran`,`gaji_sma`.`lembur` AS `lembur`,`gaji_sma`.`value_lembur` AS `value_lembur`,`gaji_sma`.`jp` AS `jp`,`gaji_sma`.`gapok` AS `gapok`,`gaji_sma`.`total_gapok` AS `total_gapok`,`gaji_sma`.`value_reward` AS `value_reward`,`gaji_sma`.`value_inval` AS `value_inval`,`gaji_sma`.`piket_count` AS `piket_count`,`gaji_sma`.`value_piket` AS `value_piket`,`gaji_sma`.`tugastambahan` AS `tugastambahan`,`gaji_sma`.`tj_jabatan` AS `tj_jabatan`,`gaji_sma`.`sub_total` AS `sub_total`,`gaji_sma`.`potongan` AS `potongan`,`gaji_sma`.`penyesuaian` AS `penyesuaian`,`gaji_sma`.`total` AS `total`,`gaji_sma`.`voucher` AS `voucher`,`gaji_sma`.`pid` AS `pid`,`m_sma`.`tahun` AS `tahun`,`m_sma`.`bulan` AS `bulan`,`pegawai`.`rekbank` AS `rekbank`,`gaji_sma`.`potongan_bendahara` AS `potongan_bendahara` from ((`gaji_sma` join `m_sma` on(((`m_sma`.`bulan` = `gaji_sma`.`bulan`) and (`m_sma`.`id` = `gaji_sma`.`pid`) and (`m_sma`.`tahun` = `gaji_sma`.`tahun`)))) join `pegawai` on((`gaji_sma`.`pegawai` = `pegawai`.`nip`)));

-- Dumping structure for view sigap2.vgaji_guru_smk
-- Removing temporary table and create final VIEW structure
DROP TABLE IF EXISTS `vgaji_guru_smk`;
CREATE ALGORITHM=UNDEFINED SQL SECURITY DEFINER VIEW `vgaji_guru_smk` AS select `gaji_smk`.`id` AS `id`,`gaji_smk`.`pegawai` AS `pegawai`,`gaji_smk`.`jenjang_id` AS `jenjang_id`,`gaji_smk`.`jabatan_id` AS `jabatan_id`,`gaji_smk`.`lama_kerja` AS `lama_kerja`,`gaji_smk`.`type` AS `type`,`gaji_smk`.`jenis_guru` AS `jenis_guru`,`gaji_smk`.`tambahan` AS `tambahan`,`gaji_smk`.`periode` AS `periode`,`gaji_smk`.`tunjangan_periode` AS `tunjangan_periode`,`gaji_smk`.`kehadiran` AS `kehadiran`,`gaji_smk`.`value_kehadiran` AS `value_kehadiran`,`gaji_smk`.`lembur` AS `lembur`,`gaji_smk`.`value_lembur` AS `value_lembur`,`gaji_smk`.`jp` AS `jp`,`gaji_smk`.`gapok` AS `gapok`,`gaji_smk`.`total_gapok` AS `total_gapok`,`gaji_smk`.`value_reward` AS `value_reward`,`gaji_smk`.`value_inval` AS `value_inval`,`gaji_smk`.`piket_count` AS `piket_count`,`gaji_smk`.`value_piket` AS `value_piket`,`gaji_smk`.`tugastambahan` AS `tugastambahan`,`gaji_smk`.`tj_jabatan` AS `tj_jabatan`,`gaji_smk`.`sub_total` AS `sub_total`,`gaji_smk`.`potongan` AS `potongan`,`gaji_smk`.`penyesuaian` AS `penyesuaian`,`gaji_smk`.`total` AS `total`,`gaji_smk`.`voucher` AS `voucher`,`m_smk`.`tahun` AS `tahun`,`m_smk`.`bulan` AS `bulan`,`pegawai`.`rekbank` AS `rekbank`,`gaji_smk`.`potongan_bendahara` AS `potongan_bendahara` from ((`gaji_smk` join `m_smk` on(((`m_smk`.`id` = `gaji_smk`.`pid`) and (`m_smk`.`tahun` = `gaji_smk`.`tahun`) and (`m_smk`.`bulan` = `gaji_smk`.`bulan`)))) join `pegawai` on((`gaji_smk`.`pegawai` = `pegawai`.`nip`)));

-- Dumping structure for view sigap2.vgaji_guru_smp
-- Removing temporary table and create final VIEW structure
DROP TABLE IF EXISTS `vgaji_guru_smp`;
CREATE ALGORITHM=UNDEFINED SQL SECURITY DEFINER VIEW `vgaji_guru_smp` AS select `gaji_smp`.`id` AS `id`,`gaji_smp`.`pid` AS `pid`,`gaji_smp`.`pegawai` AS `pegawai`,`gaji_smp`.`jenjang_id` AS `jenjang_id`,`gaji_smp`.`jabatan_id` AS `jabatan_id`,`gaji_smp`.`lama_kerja` AS `lama_kerja`,`gaji_smp`.`type` AS `type`,`gaji_smp`.`jenis_guru` AS `jenis_guru`,`gaji_smp`.`tambahan` AS `tambahan`,`gaji_smp`.`periode` AS `periode`,`gaji_smp`.`tunjangan_periode` AS `tunjangan_periode`,`gaji_smp`.`kehadiran` AS `kehadiran`,`gaji_smp`.`value_kehadiran` AS `value_kehadiran`,`gaji_smp`.`lembur` AS `lembur`,`gaji_smp`.`value_lembur` AS `value_lembur`,`gaji_smp`.`jp` AS `jp`,`gaji_smp`.`gapok` AS `gapok`,`gaji_smp`.`total_gapok` AS `total_gapok`,`gaji_smp`.`value_reward` AS `value_reward`,`gaji_smp`.`value_inval` AS `value_inval`,`gaji_smp`.`piket_count` AS `piket_count`,`gaji_smp`.`value_piket` AS `value_piket`,`gaji_smp`.`tugastambahan` AS `tugastambahan`,`gaji_smp`.`tj_jabatan` AS `tj_jabatan`,`gaji_smp`.`sub_total` AS `sub_total`,`gaji_smp`.`potongan` AS `potongan`,`gaji_smp`.`penyesuaian` AS `penyesuaian`,`gaji_smp`.`total` AS `total`,`gaji_smp`.`voucher` AS `voucher`,`m_smp`.`tahun` AS `tahun`,`m_smp`.`bulan` AS `bulan`,`pegawai`.`rekbank` AS `rekbank`,`gaji_smp`.`potongan_bendahara` AS `potongan_bendahara` from ((`gaji_smp` join `m_smp` on(((`m_smp`.`id` = `gaji_smp`.`pid`) and (`m_smp`.`tahun` = `gaji_smp`.`tahun`) and (`m_smp`.`bulan` = `gaji_smp`.`bulan`)))) join `pegawai` on((`gaji_smp`.`pegawai` = `pegawai`.`nip`)));

-- Dumping structure for view sigap2.vgaji_guru_tk
-- Removing temporary table and create final VIEW structure
DROP TABLE IF EXISTS `vgaji_guru_tk`;
CREATE ALGORITHM=UNDEFINED SQL SECURITY DEFINER VIEW `vgaji_guru_tk` AS select `gaji_tk`.`id` AS `id`,`gaji_tk`.`pid` AS `pid`,`gaji_tk`.`pegawai` AS `pegawai`,`gaji_tk`.`jenjang_id` AS `jenjang_id`,`gaji_tk`.`jabatan_id` AS `jabatan_id`,`gaji_tk`.`type` AS `type`,`gaji_tk`.`lama_kerja` AS `lama_kerja`,`gaji_tk`.`jenis_guru` AS `jenis_guru`,`gaji_tk`.`tambahan` AS `tambahan`,`gaji_tk`.`periode` AS `periode`,`gaji_tk`.`tunjangan_periode` AS `tunjangan_periode`,`gaji_tk`.`kehadiran` AS `kehadiran`,`gaji_tk`.`value_kehadiran` AS `value_kehadiran`,`gaji_tk`.`lembur` AS `lembur`,`gaji_tk`.`value_lembur` AS `value_lembur`,`gaji_tk`.`jp` AS `jp`,`gaji_tk`.`gapok` AS `gapok`,`gaji_tk`.`total_gapok` AS `total_gapok`,`gaji_tk`.`value_reward` AS `value_reward`,`gaji_tk`.`value_inval` AS `value_inval`,`gaji_tk`.`piket_count` AS `piket_count`,`gaji_tk`.`value_piket` AS `value_piket`,`gaji_tk`.`tugastambahan` AS `tugastambahan`,`gaji_tk`.`tj_jabatan` AS `tj_jabatan`,`gaji_tk`.`sub_total` AS `sub_total`,`gaji_tk`.`potongan` AS `potongan`,`gaji_tk`.`penyesuaian` AS `penyesuaian`,`gaji_tk`.`total` AS `total`,`gaji_tk`.`voucher` AS `voucher`,`m_tk`.`tahun` AS `tahun`,`m_tk`.`bulan` AS `bulan`,`pegawai`.`rekbank` AS `rekbank`,`gaji_tk`.`potongan_bendahara` AS `potongan_bendahara` from ((`gaji_tk` join `m_tk` on(((`m_tk`.`id` = `gaji_tk`.`pid`) and (`m_tk`.`tahun` = `gaji_tk`.`tahun`) and (`m_tk`.`bulan` = `gaji_tk`.`bulan`)))) join `pegawai` on((`gaji_tk`.`pegawai` = `pegawai`.`nip`)));

-- Dumping structure for view sigap2.vgaji_karyawan_sd
-- Removing temporary table and create final VIEW structure
DROP TABLE IF EXISTS `vgaji_karyawan_sd`;
CREATE ALGORITHM=UNDEFINED SQL SECURITY DEFINER VIEW `vgaji_karyawan_sd` AS select `m_karyawan_sd`.`id` AS `id`,`m_karyawan_sd`.`tahun` AS `tahun`,`m_karyawan_sd`.`bulan` AS `bulan`,`gaji_karyawan_sd`.`pegawai` AS `pegawai`,`gaji_karyawan_sd`.`jenjang_id` AS `jenjang_id`,`gaji_karyawan_sd`.`jabatan_id` AS `jabatan_id`,`gaji_karyawan_sd`.`kehadiran` AS `kehadiran`,`gaji_karyawan_sd`.`value_kehadiran` AS `value_kehadiran`,`gaji_karyawan_sd`.`gapok` AS `gapok`,`gaji_karyawan_sd`.`value_reward` AS `value_reward`,`gaji_karyawan_sd`.`value_inval` AS `value_inval`,`gaji_karyawan_sd`.`sub_total` AS `sub_total`,`gaji_karyawan_sd`.`potongan` AS `potongan`,`gaji_karyawan_sd`.`penyesuaian` AS `penyesuaian`,`gaji_karyawan_sd`.`total` AS `total`,`gaji_karyawan_sd`.`voucher` AS `voucher`,`gaji_karyawan_sd`.`status` AS `status`,`pegawai`.`rekbank` AS `rekbank`,`gaji_karyawan_sd`.`potongan_bendahara` AS `potongan_bendahara` from ((`m_karyawan_sd` join `gaji_karyawan_sd` on(((`m_karyawan_sd`.`id` = `gaji_karyawan_sd`.`pid`) and (`m_karyawan_sd`.`tahun` = `gaji_karyawan_sd`.`tahun`) and (`m_karyawan_sd`.`bulan` = `gaji_karyawan_sd`.`bulan`)))) join `pegawai` on((`gaji_karyawan_sd`.`pegawai` = `pegawai`.`nip`)));

-- Dumping structure for view sigap2.vgaji_karyawan_sma
-- Removing temporary table and create final VIEW structure
DROP TABLE IF EXISTS `vgaji_karyawan_sma`;
CREATE ALGORITHM=UNDEFINED SQL SECURITY DEFINER VIEW `vgaji_karyawan_sma` AS select `gaji_karyawan_sma`.`id` AS `id`,`gaji_karyawan_sma`.`pegawai` AS `pegawai`,`gaji_karyawan_sma`.`jenjang_id` AS `jenjang_id`,`gaji_karyawan_sma`.`jabatan_id` AS `jabatan_id`,`gaji_karyawan_sma`.`kehadiran` AS `kehadiran`,`gaji_karyawan_sma`.`gapok` AS `gapok`,`gaji_karyawan_sma`.`value_kehadiran` AS `value_kehadiran`,`gaji_karyawan_sma`.`value_reward` AS `value_reward`,`gaji_karyawan_sma`.`value_inval` AS `value_inval`,`gaji_karyawan_sma`.`sub_total` AS `sub_total`,`gaji_karyawan_sma`.`potongan` AS `potongan`,`gaji_karyawan_sma`.`penyesuaian` AS `penyesuaian`,`gaji_karyawan_sma`.`total` AS `total`,`gaji_karyawan_sma`.`status` AS `status`,`gaji_karyawan_sma`.`voucher` AS `voucher`,`m_karyawan_sma`.`tahun` AS `tahun`,`m_karyawan_sma`.`bulan` AS `bulan`,`gaji_karyawan_sma`.`pid` AS `pid`,`pegawai`.`rekbank` AS `rekbank`,`gaji_karyawan_sma`.`potongan_bendahara` AS `potongan_bendahara` from ((`gaji_karyawan_sma` join `m_karyawan_sma` on(((`m_karyawan_sma`.`id` = `gaji_karyawan_sma`.`pid`) and (`m_karyawan_sma`.`tahun` = `gaji_karyawan_sma`.`tahun`) and (`m_karyawan_sma`.`bulan` = `gaji_karyawan_sma`.`bulan`)))) join `pegawai` on((`gaji_karyawan_sma`.`pegawai` = `pegawai`.`nip`)));

-- Dumping structure for view sigap2.vgaji_karyawan_smk
-- Removing temporary table and create final VIEW structure
DROP TABLE IF EXISTS `vgaji_karyawan_smk`;
CREATE ALGORITHM=UNDEFINED SQL SECURITY DEFINER VIEW `vgaji_karyawan_smk` AS select `m_karyawan_smk`.`id` AS `id`,`m_karyawan_smk`.`tahun` AS `tahun`,`m_karyawan_smk`.`bulan` AS `bulan`,`gaji_karyawan_smk`.`pegawai` AS `pegawai`,`gaji_karyawan_smk`.`jenjang_id` AS `jenjang_id`,`gaji_karyawan_smk`.`jabatan_id` AS `jabatan_id`,`gaji_karyawan_smk`.`kehadiran` AS `kehadiran`,`gaji_karyawan_smk`.`gapok` AS `gapok`,`gaji_karyawan_smk`.`value_kehadiran` AS `value_kehadiran`,`gaji_karyawan_smk`.`value_reward` AS `value_reward`,`gaji_karyawan_smk`.`value_inval` AS `value_inval`,`gaji_karyawan_smk`.`sub_total` AS `sub_total`,`gaji_karyawan_smk`.`potongan` AS `potongan`,`gaji_karyawan_smk`.`penyesuaian` AS `penyesuaian`,`gaji_karyawan_smk`.`total` AS `total`,`gaji_karyawan_smk`.`voucher` AS `voucher`,`pegawai`.`rekbank` AS `rekbank`,`gaji_karyawan_smk`.`potongan_bendahara` AS `potongan_bendahara` from ((`gaji_karyawan_smk` join `m_karyawan_smk` on(((`m_karyawan_smk`.`id` = `gaji_karyawan_smk`.`pid`) and (`m_karyawan_smk`.`tahun` = `gaji_karyawan_smk`.`tahun`) and (`m_karyawan_smk`.`bulan` = `gaji_karyawan_smk`.`bulan`)))) join `pegawai` on((`gaji_karyawan_smk`.`pegawai` = `pegawai`.`nip`)));

-- Dumping structure for view sigap2.vgaji_karyawan_smp
-- Removing temporary table and create final VIEW structure
DROP TABLE IF EXISTS `vgaji_karyawan_smp`;
CREATE ALGORITHM=UNDEFINED SQL SECURITY DEFINER VIEW `vgaji_karyawan_smp` AS select `m_karyawan_smp`.`id` AS `id`,`m_karyawan_smp`.`tahun` AS `tahun`,`m_karyawan_smp`.`bulan` AS `bulan`,`gaji_karyawan_smp`.`pegawai` AS `pegawai`,`gaji_karyawan_smp`.`jenjang_id` AS `jenjang_id`,`gaji_karyawan_smp`.`jabatan_id` AS `jabatan_id`,`gaji_karyawan_smp`.`kehadiran` AS `kehadiran`,`gaji_karyawan_smp`.`gapok` AS `gapok`,`gaji_karyawan_smp`.`value_kehadiran` AS `value_kehadiran`,`gaji_karyawan_smp`.`value_reward` AS `value_reward`,`gaji_karyawan_smp`.`value_inval` AS `value_inval`,`gaji_karyawan_smp`.`sub_total` AS `sub_total`,`gaji_karyawan_smp`.`potongan` AS `potongan`,`gaji_karyawan_smp`.`penyesuaian` AS `penyesuaian`,`gaji_karyawan_smp`.`total` AS `total`,`gaji_karyawan_smp`.`status` AS `status`,`gaji_karyawan_smp`.`voucher` AS `voucher`,`pegawai`.`rekbank` AS `rekbank`,`gaji_karyawan_smp`.`potongan_bendahara` AS `potongan_bendahara` from ((`m_karyawan_smp` join `gaji_karyawan_smp` on(((`m_karyawan_smp`.`id` = `gaji_karyawan_smp`.`pid`) and (`m_karyawan_smp`.`tahun` = `gaji_karyawan_smp`.`tahun`) and (`m_karyawan_smp`.`bulan` = `gaji_karyawan_smp`.`bulan`)))) join `pegawai` on((`gaji_karyawan_smp`.`pegawai` = `pegawai`.`nip`)));

-- Dumping structure for view sigap2.vgaji_karyawan_tk
-- Removing temporary table and create final VIEW structure
DROP TABLE IF EXISTS `vgaji_karyawan_tk`;
CREATE ALGORITHM=UNDEFINED SQL SECURITY DEFINER VIEW `vgaji_karyawan_tk` AS select `m_karyawan_tk`.`tahun` AS `tahun`,`m_karyawan_tk`.`bulan` AS `bulan`,`gaji_karyawan_tk`.`id` AS `id`,`gaji_karyawan_tk`.`jenjang_id` AS `jenjang_id`,`gaji_karyawan_tk`.`pegawai` AS `pegawai`,`gaji_karyawan_tk`.`jabatan_id` AS `jabatan_id`,`gaji_karyawan_tk`.`kehadiran` AS `kehadiran`,`gaji_karyawan_tk`.`gapok` AS `gapok`,`gaji_karyawan_tk`.`value_kehadiran` AS `value_kehadiran`,`gaji_karyawan_tk`.`value_reward` AS `value_reward`,`gaji_karyawan_tk`.`sub_total` AS `sub_total`,`gaji_karyawan_tk`.`value_inval` AS `value_inval`,`gaji_karyawan_tk`.`potongan` AS `potongan`,`gaji_karyawan_tk`.`penyesuaian` AS `penyesuaian`,`gaji_karyawan_tk`.`total` AS `total`,`gaji_karyawan_tk`.`voucher` AS `voucher`,`gaji_karyawan_tk`.`status` AS `status`,`pegawai`.`rekbank` AS `rekbank`,`gaji_karyawan_tk`.`potongan_bendahara` AS `potongan_bendahara` from ((`m_karyawan_tk` join `gaji_karyawan_tk` on(((`m_karyawan_tk`.`id` = `gaji_karyawan_tk`.`pid`) and (`m_karyawan_tk`.`tahun` = `gaji_karyawan_tk`.`tahun`) and (`m_karyawan_tk`.`bulan` = `gaji_karyawan_tk`.`bulan`)))) join `pegawai` on((`gaji_karyawan_tk`.`pegawai` = `pegawai`.`nip`)));

-- Dumping structure for view sigap2.vgaji_tu_sd
-- Removing temporary table and create final VIEW structure
DROP TABLE IF EXISTS `vgaji_tu_sd`;
CREATE ALGORITHM=UNDEFINED SQL SECURITY DEFINER VIEW `vgaji_tu_sd` AS select `gaji_tu_sd`.`id` AS `id`,`gaji_tu_sd`.`pid` AS `pid`,`gaji_tu_sd`.`pegawai` AS `pegawai`,`gaji_tu_sd`.`jenjang_id` AS `jenjang_id`,`gaji_tu_sd`.`jabatan_id` AS `jabatan_id`,`gaji_tu_sd`.`type_jabatan` AS `type_jabatan`,`gaji_tu_sd`.`sertif` AS `sertif`,`gaji_tu_sd`.`tambahan` AS `tambahan`,`gaji_tu_sd`.`month` AS `month`,`gaji_tu_sd`.`lama_kerja` AS `lama_kerja`,`gaji_tu_sd`.`gapok` AS `gapok`,`gaji_tu_sd`.`ijasah` AS `ijasah`,`gaji_tu_sd`.`kehadiran` AS `kehadiran`,`gaji_tu_sd`.`value_kehadiran` AS `value_kehadiran`,`gaji_tu_sd`.`lembur` AS `lembur`,`gaji_tu_sd`.`value_lembur` AS `value_lembur`,`gaji_tu_sd`.`value_reward` AS `value_reward`,`gaji_tu_sd`.`value_inval` AS `value_inval`,`gaji_tu_sd`.`piket_count` AS `piket_count`,`gaji_tu_sd`.`value_piket` AS `value_piket`,`gaji_tu_sd`.`tugastambahan` AS `tugastambahan`,`gaji_tu_sd`.`tj_jabatan` AS `tj_jabatan`,`gaji_tu_sd`.`tunjangan2` AS `tunjangan2`,`gaji_tu_sd`.`potongan` AS `potongan`,`gaji_tu_sd`.`sub_total` AS `sub_total`,`gaji_tu_sd`.`penyesuaian` AS `penyesuaian`,`gaji_tu_sd`.`total` AS `total`,`gaji_tu_sd`.`voucher` AS `voucher`,`m_tu_sd`.`tahun` AS `tahun`,`m_tu_sd`.`bulan` AS `bulan`,`pegawai`.`rekbank` AS `rekbank`,`gaji_tu_sd`.`potongan_bendahara` AS `potongan_bendahara` from ((`gaji_tu_sd` join `m_tu_sd` on(((`m_tu_sd`.`id` = `gaji_tu_sd`.`pid`) and (`m_tu_sd`.`tahun` = `gaji_tu_sd`.`tahun`) and (`m_tu_sd`.`bulan` = `gaji_tu_sd`.`bulan`)))) join `pegawai` on((`gaji_tu_sd`.`pegawai` = `pegawai`.`nip`)));

-- Dumping structure for view sigap2.vgaji_tu_sma
-- Removing temporary table and create final VIEW structure
DROP TABLE IF EXISTS `vgaji_tu_sma`;
CREATE ALGORITHM=UNDEFINED SQL SECURITY DEFINER VIEW `vgaji_tu_sma` AS select `gaji_tu_sma`.`id` AS `id`,`gaji_tu_sma`.`datetime` AS `datetime`,`gaji_tu_sma`.`pid` AS `pid`,`gaji_tu_sma`.`pegawai` AS `pegawai`,`gaji_tu_sma`.`jenjang_id` AS `jenjang_id`,`gaji_tu_sma`.`jabatan_id` AS `jabatan_id`,`gaji_tu_sma`.`type_jabatan` AS `type_jabatan`,`gaji_tu_sma`.`tambahan` AS `tambahan`,`gaji_tu_sma`.`ijasah` AS `ijasah`,`gaji_tu_sma`.`sertif` AS `sertif`,`gaji_tu_sma`.`lama_kerja` AS `lama_kerja`,`gaji_tu_sma`.`gapok` AS `gapok`,`gaji_tu_sma`.`kehadiran` AS `kehadiran`,`gaji_tu_sma`.`value_kehadiran` AS `value_kehadiran`,`gaji_tu_sma`.`lembur` AS `lembur`,`gaji_tu_sma`.`value_lembur` AS `value_lembur`,`gaji_tu_sma`.`value_reward` AS `value_reward`,`gaji_tu_sma`.`value_inval` AS `value_inval`,`gaji_tu_sma`.`piket_count` AS `piket_count`,`gaji_tu_sma`.`value_piket` AS `value_piket`,`gaji_tu_sma`.`tugastambahan` AS `tugastambahan`,`gaji_tu_sma`.`tj_jabatan` AS `tj_jabatan`,`gaji_tu_sma`.`tunjangan2` AS `tunjangan2`,`gaji_tu_sma`.`potongan` AS `potongan`,`gaji_tu_sma`.`sub_total` AS `sub_total`,`gaji_tu_sma`.`penyesuaian` AS `penyesuaian`,`gaji_tu_sma`.`total` AS `total`,`gaji_tu_sma`.`voucher` AS `voucher`,`m_tu_sma`.`tahun` AS `tahun`,`m_tu_sma`.`bulan` AS `bulan`,`pegawai`.`rekbank` AS `rekbank`,`gaji_tu_sma`.`potongan_bendahara` AS `potongan_bendahara` from ((`gaji_tu_sma` join `m_tu_sma` on(((`m_tu_sma`.`id` = `gaji_tu_sma`.`pid`) and (`m_tu_sma`.`tahun` = `gaji_tu_sma`.`tahun`) and (`m_tu_sma`.`bulan` = `gaji_tu_sma`.`bulan`)))) join `pegawai` on((`gaji_tu_sma`.`pegawai` = `pegawai`.`nip`)));

-- Dumping structure for view sigap2.vgaji_tu_smk
-- Removing temporary table and create final VIEW structure
DROP TABLE IF EXISTS `vgaji_tu_smk`;
CREATE ALGORITHM=UNDEFINED SQL SECURITY DEFINER VIEW `vgaji_tu_smk` AS select `gaji_tu_smk`.`id` AS `id`,`gaji_tu_smk`.`pid` AS `pid`,`gaji_tu_smk`.`pegawai` AS `pegawai`,`gaji_tu_smk`.`jenjang_id` AS `jenjang_id`,`gaji_tu_smk`.`jabatan_id` AS `jabatan_id`,`gaji_tu_smk`.`type_jabatan` AS `type_jabatan`,`gaji_tu_smk`.`tambahan` AS `tambahan`,`gaji_tu_smk`.`sertif` AS `sertif`,`gaji_tu_smk`.`lama_kerja` AS `lama_kerja`,`gaji_tu_smk`.`kehadiran` AS `kehadiran`,`gaji_tu_smk`.`value_kehadiran` AS `value_kehadiran`,`gaji_tu_smk`.`gapok` AS `gapok`,`gaji_tu_smk`.`lembur` AS `lembur`,`gaji_tu_smk`.`value_lembur` AS `value_lembur`,`gaji_tu_smk`.`value_reward` AS `value_reward`,`gaji_tu_smk`.`value_inval` AS `value_inval`,`gaji_tu_smk`.`piket_count` AS `piket_count`,`gaji_tu_smk`.`value_piket` AS `value_piket`,`gaji_tu_smk`.`tugastambahan` AS `tugastambahan`,`gaji_tu_smk`.`tj_jabatan` AS `tj_jabatan`,`gaji_tu_smk`.`tunjangan2` AS `tunjangan2`,`gaji_tu_smk`.`potongan` AS `potongan`,`gaji_tu_smk`.`sub_total` AS `sub_total`,`gaji_tu_smk`.`penyesuaian` AS `penyesuaian`,`gaji_tu_smk`.`total` AS `total`,`gaji_tu_smk`.`ijasah` AS `ijasah`,`gaji_tu_smk`.`voucher` AS `voucher`,`m_tu_smk`.`tahun` AS `tahun`,`m_tu_smk`.`bulan` AS `bulan`,`pegawai`.`rekbank` AS `rekbank`,`gaji_tu_smk`.`potongan_bendahara` AS `potongan_bendahara` from ((`gaji_tu_smk` join `m_tu_smk` on(((`m_tu_smk`.`id` = `gaji_tu_smk`.`pid`) and (`m_tu_smk`.`tahun` = `gaji_tu_smk`.`tahun`) and (`m_tu_smk`.`bulan` = `gaji_tu_smk`.`bulan`)))) join `pegawai` on((`gaji_tu_smk`.`pegawai` = `pegawai`.`nip`)));

-- Dumping structure for view sigap2.vgaji_tu_smp
-- Removing temporary table and create final VIEW structure
DROP TABLE IF EXISTS `vgaji_tu_smp`;
CREATE ALGORITHM=UNDEFINED SQL SECURITY DEFINER VIEW `vgaji_tu_smp` AS select `gaji_tu_smp`.`id` AS `id`,`gaji_tu_smp`.`pid` AS `pid`,`gaji_tu_smp`.`pegawai` AS `pegawai`,`gaji_tu_smp`.`jenjang_id` AS `jenjang_id`,`gaji_tu_smp`.`jabatan_id` AS `jabatan_id`,`gaji_tu_smp`.`lama_kerja` AS `lama_kerja`,`gaji_tu_smp`.`ijasah` AS `ijasah`,`gaji_tu_smp`.`type_jabatan` AS `type_jabatan`,`gaji_tu_smp`.`tambahan` AS `tambahan`,`gaji_tu_smp`.`sertif` AS `sertif`,`gaji_tu_smp`.`gapok` AS `gapok`,`gaji_tu_smp`.`kehadiran` AS `kehadiran`,`gaji_tu_smp`.`value_kehadiran` AS `value_kehadiran`,`gaji_tu_smp`.`lembur` AS `lembur`,`gaji_tu_smp`.`value_lembur` AS `value_lembur`,`gaji_tu_smp`.`value_reward` AS `value_reward`,`gaji_tu_smp`.`value_inval` AS `value_inval`,`gaji_tu_smp`.`piket_count` AS `piket_count`,`gaji_tu_smp`.`value_piket` AS `value_piket`,`gaji_tu_smp`.`tugastambahan` AS `tugastambahan`,`gaji_tu_smp`.`tj_jabatan` AS `tj_jabatan`,`gaji_tu_smp`.`tunjangan2` AS `tunjangan2`,`gaji_tu_smp`.`sub_total` AS `sub_total`,`gaji_tu_smp`.`potongan` AS `potongan`,`gaji_tu_smp`.`penyesuaian` AS `penyesuaian`,`gaji_tu_smp`.`total` AS `total`,`gaji_tu_smp`.`voucher` AS `voucher`,`m_tu_smp`.`tahun` AS `tahun`,`m_tu_smp`.`bulan` AS `bulan`,`pegawai`.`rekbank` AS `rekbank`,`gaji_tu_smp`.`potongan_bendahara` AS `potongan_bendahara` from ((`gaji_tu_smp` join `m_tu_smp` on(((`m_tu_smp`.`id` = `gaji_tu_smp`.`pid`) and (`m_tu_smp`.`tahun` = `gaji_tu_smp`.`tahun`) and (`m_tu_smp`.`bulan` = `gaji_tu_smp`.`bulan`)))) join `pegawai` on((`gaji_tu_smp`.`pegawai` = `pegawai`.`nip`)));

-- Dumping structure for view sigap2.vgaji_tu_tk
-- Removing temporary table and create final VIEW structure
DROP TABLE IF EXISTS `vgaji_tu_tk`;
CREATE ALGORITHM=UNDEFINED SQL SECURITY DEFINER VIEW `vgaji_tu_tk` AS select `gaji_tu_tk`.`id` AS `id`,`gaji_tu_tk`.`pid` AS `pid`,`gaji_tu_tk`.`pegawai` AS `pegawai`,`gaji_tu_tk`.`jenjang_id` AS `jenjang_id`,`gaji_tu_tk`.`jabatan_id` AS `jabatan_id`,`gaji_tu_tk`.`ijasah` AS `ijasah`,`gaji_tu_tk`.`type_jabatan` AS `type_jabatan`,`gaji_tu_tk`.`tambahan` AS `tambahan`,`gaji_tu_tk`.`lama_kerja` AS `lama_kerja`,`gaji_tu_tk`.`sertif` AS `sertif`,`gaji_tu_tk`.`kehadiran` AS `kehadiran`,`gaji_tu_tk`.`value_kehadiran` AS `value_kehadiran`,`gaji_tu_tk`.`gapok` AS `gapok`,`gaji_tu_tk`.`lembur` AS `lembur`,`gaji_tu_tk`.`value_lembur` AS `value_lembur`,`gaji_tu_tk`.`value_reward` AS `value_reward`,`gaji_tu_tk`.`value_inval` AS `value_inval`,`gaji_tu_tk`.`piket_count` AS `piket_count`,`gaji_tu_tk`.`value_piket` AS `value_piket`,`gaji_tu_tk`.`tugastambahan` AS `tugastambahan`,`gaji_tu_tk`.`tj_jabatan` AS `tj_jabatan`,`gaji_tu_tk`.`tunjangan2` AS `tunjangan2`,`gaji_tu_tk`.`potongan` AS `potongan`,`gaji_tu_tk`.`sub_total` AS `sub_total`,`gaji_tu_tk`.`penyesuaian` AS `penyesuaian`,`gaji_tu_tk`.`total` AS `total`,`gaji_tu_tk`.`voucher` AS `voucher`,`m_tu_tk`.`tahun` AS `tahun`,`m_tu_tk`.`bulan` AS `bulan`,`pegawai`.`rekbank` AS `rekbank`,`gaji_tu_tk`.`potongan_bendahara` AS `potongan_bendahara` from ((`gaji_tu_tk` join `m_tu_tk` on(((`m_tu_tk`.`id` = `gaji_tu_tk`.`pid`) and (`m_tu_tk`.`tahun` = `gaji_tu_tk`.`tahun`) and (`m_tu_tk`.`bulan` = `gaji_tu_tk`.`bulan`)))) join `pegawai` on((`gaji_tu_tk`.`pegawai` = `pegawai`.`nip`))) where ((`pegawai`.`jenjang_id` = '1') and (`pegawai`.`type` = '2'));

-- Dumping structure for view sigap2.v_gajisd
-- Removing temporary table and create final VIEW structure
DROP TABLE IF EXISTS `v_gajisd`;
CREATE ALGORITHM=UNDEFINED SQL SECURITY DEFINER VIEW `v_gajisd` AS select `gaji`.`pegawai` AS `pegawai`,`pegawai`.`rekbank` AS `rekbank`,`gaji`.`total` AS `total`,`gaji`.`potongan` AS `potongan`,`gaji`.`pid` AS `pid` from (`pegawai` join `gaji` on((`gaji`.`pegawai` = `pegawai`.`nip`)));

-- Dumping structure for view sigap2.v_gajisma
-- Removing temporary table and create final VIEW structure
DROP TABLE IF EXISTS `v_gajisma`;
CREATE ALGORITHM=UNDEFINED SQL SECURITY DEFINER VIEW `v_gajisma` AS select `gaji_sma`.`pegawai` AS `pegawai`,`pegawai`.`rekbank` AS `rekbank`,`gaji_sma`.`total` AS `total`,`gaji_sma`.`potongan` AS `potongan`,`gaji_sma`.`pid` AS `pid` from (`pegawai` join `gaji_sma` on((`gaji_sma`.`pegawai` = `pegawai`.`nip`)));

-- Dumping structure for view sigap2.v_gaji_guru_smk
-- Removing temporary table and create final VIEW structure
DROP TABLE IF EXISTS `v_gaji_guru_smk`;
CREATE ALGORITHM=UNDEFINED SQL SECURITY DEFINER VIEW `v_gaji_guru_smk` AS select `gaji_smk`.`pegawai` AS `pegawai`,`pegawai`.`rekbank` AS `rekbank`,`gaji_smk`.`total` AS `total`,`gaji_smk`.`potongan` AS `potongan`,`gaji_smk`.`pid` AS `pid` from (`gaji_smk` join `pegawai` on((`gaji_smk`.`pegawai` = `pegawai`.`nip`)));

-- Dumping structure for view sigap2.v_gaji_karyawan_sd
-- Removing temporary table and create final VIEW structure
DROP TABLE IF EXISTS `v_gaji_karyawan_sd`;
CREATE ALGORITHM=UNDEFINED SQL SECURITY DEFINER VIEW `v_gaji_karyawan_sd` AS select `gaji_karyawan_sd`.`pegawai` AS `pegawai`,`pegawai`.`rekbank` AS `rekbank`,`gaji_karyawan_sd`.`total` AS `total`,`gaji_karyawan_sd`.`potongan` AS `potongan`,`gaji_karyawan_sd`.`pid` AS `pid` from (`pegawai` join `gaji_karyawan_sd` on((`gaji_karyawan_sd`.`pegawai` = `pegawai`.`nip`)));

-- Dumping structure for view sigap2.v_gaji_karyawan_sma
-- Removing temporary table and create final VIEW structure
DROP TABLE IF EXISTS `v_gaji_karyawan_sma`;
CREATE ALGORITHM=UNDEFINED SQL SECURITY DEFINER VIEW `v_gaji_karyawan_sma` AS select `gaji_karyawan_sma`.`pegawai` AS `pegawai`,`pegawai`.`rekbank` AS `rekbank`,`gaji_karyawan_sma`.`total` AS `total`,`gaji_karyawan_sma`.`potongan` AS `potongan`,`gaji_karyawan_sma`.`pid` AS `pid` from (`pegawai` join `gaji_karyawan_sma` on((`gaji_karyawan_sma`.`pegawai` = `pegawai`.`nip`)));

-- Dumping structure for view sigap2.v_gaji_karyawan_smk
-- Removing temporary table and create final VIEW structure
DROP TABLE IF EXISTS `v_gaji_karyawan_smk`;
CREATE ALGORITHM=UNDEFINED SQL SECURITY DEFINER VIEW `v_gaji_karyawan_smk` AS select `gaji_karyawan_smk`.`pegawai` AS `pegawai`,`pegawai`.`rekbank` AS `rekbank`,`gaji_karyawan_smk`.`total` AS `total`,`gaji_karyawan_smk`.`potongan` AS `potongan`,`gaji_karyawan_smk`.`pid` AS `pid` from (`gaji_karyawan_smk` join `pegawai` on((`gaji_karyawan_smk`.`pegawai` = `pegawai`.`nip`)));

-- Dumping structure for view sigap2.v_gaji_karyawan_smp
-- Removing temporary table and create final VIEW structure
DROP TABLE IF EXISTS `v_gaji_karyawan_smp`;
CREATE ALGORITHM=UNDEFINED SQL SECURITY DEFINER VIEW `v_gaji_karyawan_smp` AS select `gaji_karyawan_smp`.`pegawai` AS `pegawai`,`pegawai`.`rekbank` AS `rekbank`,`gaji_karyawan_smp`.`total` AS `total`,`gaji_karyawan_smp`.`potongan` AS `potongan`,`gaji_karyawan_smp`.`pid` AS `pid` from (`gaji_karyawan_smp` join `pegawai` on((`gaji_karyawan_smp`.`pegawai` = `pegawai`.`nip`)));

-- Dumping structure for view sigap2.v_gaji_karyawan_tk
-- Removing temporary table and create final VIEW structure
DROP TABLE IF EXISTS `v_gaji_karyawan_tk`;
CREATE ALGORITHM=UNDEFINED SQL SECURITY DEFINER VIEW `v_gaji_karyawan_tk` AS select `gaji_karyawan_tk`.`pegawai` AS `pegawai`,`pegawai`.`rekbank` AS `rekbank`,`gaji_karyawan_tk`.`total` AS `total`,`gaji_karyawan_tk`.`potongan` AS `potongan`,`gaji_karyawan_tk`.`pid` AS `pid` from (`pegawai` join `gaji_karyawan_tk` on((`gaji_karyawan_tk`.`pegawai` = `pegawai`.`nip`)));

-- Dumping structure for view sigap2.v_gaji_smp
-- Removing temporary table and create final VIEW structure
DROP TABLE IF EXISTS `v_gaji_smp`;
CREATE ALGORITHM=UNDEFINED SQL SECURITY DEFINER VIEW `v_gaji_smp` AS select `gaji_smp`.`pegawai` AS `pegawai`,`pegawai`.`rekbank` AS `rekbank`,`gaji_smp`.`total` AS `total`,`gaji_smp`.`potongan` AS `potongan`,`gaji_smp`.`pid` AS `pid` from (`gaji_smp` join `pegawai` on((`gaji_smp`.`pegawai` = `pegawai`.`nip`)));

-- Dumping structure for view sigap2.v_gaji_tk
-- Removing temporary table and create final VIEW structure
DROP TABLE IF EXISTS `v_gaji_tk`;
CREATE ALGORITHM=UNDEFINED SQL SECURITY DEFINER VIEW `v_gaji_tk` AS select `gaji_tk`.`pegawai` AS `pegawai`,`pegawai`.`rekbank` AS `rekbank`,`gaji_tk`.`total` AS `total`,`gaji_tk`.`potongan` AS `potongan`,`gaji_tk`.`pid` AS `pid` from (`pegawai` join `gaji_tk` on((`gaji_tk`.`pegawai` = `pegawai`.`nip`)));

-- Dumping structure for view sigap2.v_gaji_tu_sd
-- Removing temporary table and create final VIEW structure
DROP TABLE IF EXISTS `v_gaji_tu_sd`;
CREATE ALGORITHM=UNDEFINED SQL SECURITY DEFINER VIEW `v_gaji_tu_sd` AS select `gaji_tu_sd`.`pegawai` AS `pegawai`,`pegawai`.`rekbank` AS `rekbank`,`gaji_tu_sd`.`total` AS `total`,`gaji_tu_sd`.`potongan` AS `potongan`,`gaji_tu_sd`.`pid` AS `pid` from (`pegawai` join `gaji_tu_sd` on((`gaji_tu_sd`.`pegawai` = `pegawai`.`nip`)));

-- Dumping structure for view sigap2.v_gaji_tu_sma
-- Removing temporary table and create final VIEW structure
DROP TABLE IF EXISTS `v_gaji_tu_sma`;
CREATE ALGORITHM=UNDEFINED SQL SECURITY DEFINER VIEW `v_gaji_tu_sma` AS select `gaji_tu_sma`.`pegawai` AS `pegawai`,`gaji_tu_sma`.`total` AS `total`,`pegawai`.`rekbank` AS `rekbank`,`gaji_tu_sma`.`potongan` AS `potongan`,`gaji_tu_sma`.`pid` AS `pid` from (`pegawai` join `gaji_tu_sma` on((`gaji_tu_sma`.`pegawai` = `pegawai`.`nip`)));

-- Dumping structure for view sigap2.v_gaji_tu_smk
-- Removing temporary table and create final VIEW structure
DROP TABLE IF EXISTS `v_gaji_tu_smk`;
CREATE ALGORITHM=UNDEFINED SQL SECURITY DEFINER VIEW `v_gaji_tu_smk` AS select `gaji_tu_smk`.`pegawai` AS `pegawai`,`pegawai`.`rekbank` AS `rekbank`,`gaji_tu_smk`.`total` AS `total`,`gaji_tu_smk`.`potongan` AS `potongan`,`gaji_tu_smk`.`pid` AS `pid` from (`gaji_tu_smk` join `pegawai` on((`gaji_tu_smk`.`pegawai` = `pegawai`.`nip`)));

-- Dumping structure for view sigap2.v_gaji_tu_smp
-- Removing temporary table and create final VIEW structure
DROP TABLE IF EXISTS `v_gaji_tu_smp`;
CREATE ALGORITHM=UNDEFINED SQL SECURITY DEFINER VIEW `v_gaji_tu_smp` AS select `pegawai`.`rekbank` AS `rekbank`,`gaji_tu_smp`.`total` AS `total`,`gaji_tu_smp`.`potongan` AS `potongan`,`gaji_tu_smp`.`pid` AS `pid`,`gaji_tu_smp`.`pegawai` AS `pegawai` from (`pegawai` join `gaji_tu_smp` on((`gaji_tu_smp`.`pegawai` = `pegawai`.`nip`)));

-- Dumping structure for view sigap2.v_gaji_tu_tk
-- Removing temporary table and create final VIEW structure
DROP TABLE IF EXISTS `v_gaji_tu_tk`;
CREATE ALGORITHM=UNDEFINED SQL SECURITY DEFINER VIEW `v_gaji_tu_tk` AS select `gaji_tu_tk`.`pegawai` AS `pegawai`,`pegawai`.`rekbank` AS `rekbank`,`gaji_tu_tk`.`total` AS `total`,`gaji_tu_tk`.`potongan` AS `potongan`,`gaji_tu_tk`.`pid` AS `pid` from (`pegawai` join `gaji_tu_tk` on((`gaji_tu_tk`.`pegawai` = `pegawai`.`nip`)));

-- Dumping structure for view sigap2.v_karyawan_sd
-- Removing temporary table and create final VIEW structure
DROP TABLE IF EXISTS `v_karyawan_sd`;
CREATE ALGORITHM=UNDEFINED SQL SECURITY DEFINER VIEW `v_karyawan_sd` AS select `m_karyawan_sd`.`id` AS `id`,`m_karyawan_sd`.`datetime` AS `datetime`,`m_karyawan_sd`.`createby` AS `createby`,`m_karyawan_sd`.`tahun` AS `tahun`,`m_karyawan_sd`.`bulan` AS `bulan` from `m_karyawan_sd`;

-- Dumping structure for view sigap2.v_karyawan_sma
-- Removing temporary table and create final VIEW structure
DROP TABLE IF EXISTS `v_karyawan_sma`;
CREATE ALGORITHM=UNDEFINED SQL SECURITY DEFINER VIEW `v_karyawan_sma` AS select `m_karyawan_sma`.`id` AS `id`,`m_karyawan_sma`.`datetime` AS `datetime`,`m_karyawan_sma`.`createby` AS `createby`,`m_karyawan_sma`.`tahun` AS `tahun`,`m_karyawan_sma`.`bulan` AS `bulan` from `m_karyawan_sma`;

-- Dumping structure for view sigap2.v_karyawan_smk
-- Removing temporary table and create final VIEW structure
DROP TABLE IF EXISTS `v_karyawan_smk`;
CREATE ALGORITHM=UNDEFINED SQL SECURITY DEFINER VIEW `v_karyawan_smk` AS select `m_karyawan_smk`.`id` AS `id`,`m_karyawan_smk`.`datetime` AS `datetime`,`m_karyawan_smk`.`createby` AS `createby`,`m_karyawan_smk`.`tahun` AS `tahun`,`m_karyawan_smk`.`bulan` AS `bulan` from `m_karyawan_smk`;

-- Dumping structure for view sigap2.v_karyawan_smp
-- Removing temporary table and create final VIEW structure
DROP TABLE IF EXISTS `v_karyawan_smp`;
CREATE ALGORITHM=UNDEFINED SQL SECURITY DEFINER VIEW `v_karyawan_smp` AS select `m_karyawan_smp`.`id` AS `id`,`m_karyawan_smp`.`datetime` AS `datetime`,`m_karyawan_smp`.`createby` AS `createby`,`m_karyawan_smp`.`tahun` AS `tahun`,`m_karyawan_smp`.`bulan` AS `bulan` from `m_karyawan_smp`;

-- Dumping structure for view sigap2.v_karyawan_tk
-- Removing temporary table and create final VIEW structure
DROP TABLE IF EXISTS `v_karyawan_tk`;
CREATE ALGORITHM=UNDEFINED SQL SECURITY DEFINER VIEW `v_karyawan_tk` AS select `m_karyawan_tk`.`id` AS `id`,`m_karyawan_tk`.`datetime` AS `datetime`,`m_karyawan_tk`.`createby` AS `createby`,`m_karyawan_tk`.`tahun` AS `tahun`,`m_karyawan_tk`.`bulan` AS `bulan` from `m_karyawan_tk`;

-- Dumping structure for view sigap2.v_m_sd
-- Removing temporary table and create final VIEW structure
DROP TABLE IF EXISTS `v_m_sd`;
CREATE ALGORITHM=UNDEFINED SQL SECURITY DEFINER VIEW `v_m_sd` AS select `m_sd`.`id` AS `id`,`m_sd`.`datetime` AS `datetime`,`m_sd`.`createby` AS `createby`,`m_sd`.`tahun` AS `tahun`,`m_sd`.`bulan` AS `bulan` from `m_sd`;

-- Dumping structure for view sigap2.v_m_sma
-- Removing temporary table and create final VIEW structure
DROP TABLE IF EXISTS `v_m_sma`;
CREATE ALGORITHM=UNDEFINED SQL SECURITY DEFINER VIEW `v_m_sma` AS select `m_sma`.`id` AS `id`,`m_sma`.`datetime` AS `datetime`,`m_sma`.`createby` AS `createby`,`m_sma`.`tahun` AS `tahun`,`m_sma`.`bulan` AS `bulan` from `m_sma`;

-- Dumping structure for view sigap2.v_m_smk
-- Removing temporary table and create final VIEW structure
DROP TABLE IF EXISTS `v_m_smk`;
CREATE ALGORITHM=UNDEFINED SQL SECURITY DEFINER VIEW `v_m_smk` AS select `m_smk`.`id` AS `id`,`m_smk`.`datetime` AS `datetime`,`m_smk`.`createby` AS `createby`,`m_smk`.`tahun` AS `tahun`,`m_smk`.`bulan` AS `bulan` from `m_smk`;

-- Dumping structure for view sigap2.v_m_smp
-- Removing temporary table and create final VIEW structure
DROP TABLE IF EXISTS `v_m_smp`;
CREATE ALGORITHM=UNDEFINED SQL SECURITY DEFINER VIEW `v_m_smp` AS select `m_smp`.`id` AS `id`,`m_smp`.`datetime` AS `datetime`,`m_smp`.`createby` AS `createby`,`m_smp`.`tahun` AS `tahun`,`m_smp`.`bulan` AS `bulan` from `m_smp`;

-- Dumping structure for view sigap2.v_m_tk
-- Removing temporary table and create final VIEW structure
DROP TABLE IF EXISTS `v_m_tk`;
CREATE ALGORITHM=UNDEFINED SQL SECURITY DEFINER VIEW `v_m_tk` AS select `m_tk`.`id` AS `id`,`m_tk`.`datetime` AS `datetime`,`m_tk`.`createby` AS `createby`,`m_tk`.`tahun` AS `tahun`,`m_tk`.`bulan` AS `bulan` from `m_tk`;

-- Dumping structure for view sigap2.v_pegawai_sd
-- Removing temporary table and create final VIEW structure
DROP TABLE IF EXISTS `v_pegawai_sd`;
CREATE ALGORITHM=UNDEFINED SQL SECURITY DEFINER VIEW `v_pegawai_sd` AS select `pegawai`.`id` AS `id`,`pegawai`.`pid` AS `pid`,`pegawai`.`nip` AS `nip`,`pegawai`.`username` AS `username`,`pegawai`.`password` AS `password`,`pegawai`.`jenjang_id` AS `jenjang_id`,`pegawai`.`jabatan` AS `jabatan`,`pegawai`.`periode_jabatan` AS `periode_jabatan`,`pegawai`.`jjm` AS `jjm`,`pegawai`.`status_peg` AS `status_peg`,`pegawai`.`type` AS `type`,`pegawai`.`sertif` AS `sertif`,`pegawai`.`tambahan` AS `tambahan`,`pegawai`.`lama_kerja` AS `lama_kerja`,`pegawai`.`nama` AS `nama`,`pegawai`.`alamat` AS `alamat`,`pegawai`.`email` AS `email`,`pegawai`.`wa` AS `wa`,`pegawai`.`hp` AS `hp`,`pegawai`.`tgllahir` AS `tgllahir`,`pegawai`.`rekbank` AS `rekbank`,`pegawai`.`pendidikan` AS `pendidikan`,`pegawai`.`jurusan` AS `jurusan`,`pegawai`.`agama` AS `agama`,`pegawai`.`status` AS `status`,`pegawai`.`jenkel` AS `jenkel`,`pegawai`.`foto` AS `foto`,`pegawai`.`file_cv` AS `file_cv`,`pegawai`.`mulai_bekerja` AS `mulai_bekerja`,`pegawai`.`keterangan` AS `keterangan`,`pegawai`.`level` AS `level`,`pegawai`.`aktif` AS `aktif`,`pegawai`.`kehadiran` AS `kehadiran` from `pegawai` where (`pegawai`.`jenjang_id` = '2');

-- Dumping structure for view sigap2.v_pegawai_sma
-- Removing temporary table and create final VIEW structure
DROP TABLE IF EXISTS `v_pegawai_sma`;
CREATE ALGORITHM=UNDEFINED SQL SECURITY DEFINER VIEW `v_pegawai_sma` AS select `pegawai`.`id` AS `id`,`pegawai`.`pid` AS `pid`,`pegawai`.`nip` AS `nip`,`pegawai`.`username` AS `username`,`pegawai`.`password` AS `password`,`pegawai`.`jenjang_id` AS `jenjang_id`,`pegawai`.`jabatan` AS `jabatan`,`pegawai`.`periode_jabatan` AS `periode_jabatan`,`pegawai`.`jjm` AS `jjm`,`pegawai`.`status_peg` AS `status_peg`,`pegawai`.`type` AS `type`,`pegawai`.`sertif` AS `sertif`,`pegawai`.`tambahan` AS `tambahan`,`pegawai`.`lama_kerja` AS `lama_kerja`,`pegawai`.`nama` AS `nama`,`pegawai`.`alamat` AS `alamat`,`pegawai`.`wa` AS `wa`,`pegawai`.`email` AS `email`,`pegawai`.`hp` AS `hp`,`pegawai`.`tgllahir` AS `tgllahir`,`pegawai`.`rekbank` AS `rekbank`,`pegawai`.`pendidikan` AS `pendidikan`,`pegawai`.`jurusan` AS `jurusan`,`pegawai`.`agama` AS `agama`,`pegawai`.`jenkel` AS `jenkel`,`pegawai`.`status` AS `status`,`pegawai`.`foto` AS `foto`,`pegawai`.`file_cv` AS `file_cv`,`pegawai`.`mulai_bekerja` AS `mulai_bekerja`,`pegawai`.`keterangan` AS `keterangan`,`pegawai`.`level` AS `level`,`pegawai`.`aktif` AS `aktif`,`pegawai`.`kehadiran` AS `kehadiran` from `pegawai` where (`pegawai`.`jenjang_id` = '4');

-- Dumping structure for view sigap2.v_pegawai_smk
-- Removing temporary table and create final VIEW structure
DROP TABLE IF EXISTS `v_pegawai_smk`;
CREATE ALGORITHM=UNDEFINED SQL SECURITY DEFINER VIEW `v_pegawai_smk` AS select `pegawai`.`id` AS `id`,`pegawai`.`pid` AS `pid`,`pegawai`.`nip` AS `nip`,`pegawai`.`username` AS `username`,`pegawai`.`password` AS `password`,`pegawai`.`jenjang_id` AS `jenjang_id`,`pegawai`.`jabatan` AS `jabatan`,`pegawai`.`periode_jabatan` AS `periode_jabatan`,`pegawai`.`jjm` AS `jjm`,`pegawai`.`status_peg` AS `status_peg`,`pegawai`.`type` AS `type`,`pegawai`.`sertif` AS `sertif`,`pegawai`.`tambahan` AS `tambahan`,`pegawai`.`lama_kerja` AS `lama_kerja`,`pegawai`.`nama` AS `nama`,`pegawai`.`alamat` AS `alamat`,`pegawai`.`email` AS `email`,`pegawai`.`wa` AS `wa`,`pegawai`.`hp` AS `hp`,`pegawai`.`tgllahir` AS `tgllahir`,`pegawai`.`rekbank` AS `rekbank`,`pegawai`.`pendidikan` AS `pendidikan`,`pegawai`.`jurusan` AS `jurusan`,`pegawai`.`agama` AS `agama`,`pegawai`.`jenkel` AS `jenkel`,`pegawai`.`status` AS `status`,`pegawai`.`foto` AS `foto`,`pegawai`.`file_cv` AS `file_cv`,`pegawai`.`mulai_bekerja` AS `mulai_bekerja`,`pegawai`.`keterangan` AS `keterangan`,`pegawai`.`level` AS `level`,`pegawai`.`aktif` AS `aktif`,`pegawai`.`kehadiran` AS `kehadiran` from `pegawai` where (`pegawai`.`jenjang_id` = '5');

-- Dumping structure for view sigap2.v_pegawai_smp
-- Removing temporary table and create final VIEW structure
DROP TABLE IF EXISTS `v_pegawai_smp`;
CREATE ALGORITHM=UNDEFINED SQL SECURITY DEFINER VIEW `v_pegawai_smp` AS select `pegawai`.`id` AS `id`,`pegawai`.`pid` AS `pid`,`pegawai`.`nip` AS `nip`,`pegawai`.`username` AS `username`,`pegawai`.`password` AS `password`,`pegawai`.`jenjang_id` AS `jenjang_id`,`pegawai`.`jabatan` AS `jabatan`,`pegawai`.`periode_jabatan` AS `periode_jabatan`,`pegawai`.`jjm` AS `jjm`,`pegawai`.`status_peg` AS `status_peg`,`pegawai`.`type` AS `type`,`pegawai`.`sertif` AS `sertif`,`pegawai`.`tambahan` AS `tambahan`,`pegawai`.`lama_kerja` AS `lama_kerja`,`pegawai`.`nama` AS `nama`,`pegawai`.`alamat` AS `alamat`,`pegawai`.`email` AS `email`,`pegawai`.`wa` AS `wa`,`pegawai`.`hp` AS `hp`,`pegawai`.`tgllahir` AS `tgllahir`,`pegawai`.`rekbank` AS `rekbank`,`pegawai`.`pendidikan` AS `pendidikan`,`pegawai`.`jurusan` AS `jurusan`,`pegawai`.`agama` AS `agama`,`pegawai`.`jenkel` AS `jenkel`,`pegawai`.`status` AS `status`,`pegawai`.`foto` AS `foto`,`pegawai`.`file_cv` AS `file_cv`,`pegawai`.`mulai_bekerja` AS `mulai_bekerja`,`pegawai`.`keterangan` AS `keterangan`,`pegawai`.`level` AS `level`,`pegawai`.`aktif` AS `aktif`,`pegawai`.`kehadiran` AS `kehadiran` from `pegawai` where (`pegawai`.`jenjang_id` = '3');

-- Dumping structure for view sigap2.v_pegawai_tk
-- Removing temporary table and create final VIEW structure
DROP TABLE IF EXISTS `v_pegawai_tk`;
CREATE ALGORITHM=UNDEFINED SQL SECURITY DEFINER VIEW `v_pegawai_tk` AS select `pegawai`.`id` AS `id`,`pegawai`.`pid` AS `pid`,`pegawai`.`nip` AS `nip`,`pegawai`.`username` AS `username`,`pegawai`.`password` AS `password`,`pegawai`.`jenjang_id` AS `jenjang_id`,`pegawai`.`jabatan` AS `jabatan`,`pegawai`.`periode_jabatan` AS `periode_jabatan`,`pegawai`.`jjm` AS `jjm`,`pegawai`.`status_peg` AS `status_peg`,`pegawai`.`type` AS `type`,`pegawai`.`sertif` AS `sertif`,`pegawai`.`tambahan` AS `tambahan`,`pegawai`.`lama_kerja` AS `lama_kerja`,`pegawai`.`nama` AS `nama`,`pegawai`.`alamat` AS `alamat`,`pegawai`.`email` AS `email`,`pegawai`.`wa` AS `wa`,`pegawai`.`hp` AS `hp`,`pegawai`.`tgllahir` AS `tgllahir`,`pegawai`.`rekbank` AS `rekbank`,`pegawai`.`pendidikan` AS `pendidikan`,`pegawai`.`jurusan` AS `jurusan`,`pegawai`.`agama` AS `agama`,`pegawai`.`jenkel` AS `jenkel`,`pegawai`.`status` AS `status`,`pegawai`.`foto` AS `foto`,`pegawai`.`file_cv` AS `file_cv`,`pegawai`.`mulai_bekerja` AS `mulai_bekerja`,`pegawai`.`keterangan` AS `keterangan`,`pegawai`.`level` AS `level`,`pegawai`.`aktif` AS `aktif`,`pegawai`.`kehadiran` AS `kehadiran` from `pegawai` where (`pegawai`.`jenjang_id` = '1');

-- Dumping structure for view sigap2.v_pengurus_yayasan
-- Removing temporary table and create final VIEW structure
DROP TABLE IF EXISTS `v_pengurus_yayasan`;
CREATE ALGORITHM=UNDEFINED SQL SECURITY DEFINER VIEW `v_pengurus_yayasan` AS select `pegawai`.`id` AS `id`,`pegawai`.`nip` AS `nip`,`pegawai`.`username` AS `username`,`pegawai`.`password` AS `password`,`pegawai`.`jenjang_id` AS `jenjang_id`,`pegawai`.`jabatan` AS `jabatan`,`pegawai`.`periode_jabatan` AS `periode_jabatan`,`pegawai`.`jjm` AS `jjm`,`pegawai`.`status_peg` AS `status_peg`,`pegawai`.`type` AS `type`,`pegawai`.`sertif` AS `sertif`,`pegawai`.`tambahan` AS `tambahan`,`pegawai`.`lama_kerja` AS `lama_kerja`,`pegawai`.`nama` AS `nama`,`pegawai`.`alamat` AS `alamat`,`pegawai`.`email` AS `email`,`pegawai`.`wa` AS `wa`,`pegawai`.`hp` AS `hp`,`pegawai`.`tgllahir` AS `tgllahir`,`pegawai`.`rekbank` AS `rekbank`,`pegawai`.`pendidikan` AS `pendidikan`,`pegawai`.`jurusan` AS `jurusan`,`pegawai`.`agama` AS `agama`,`pegawai`.`jenkel` AS `jenkel`,`pegawai`.`status` AS `status`,`pegawai`.`foto` AS `foto`,`pegawai`.`file_cv` AS `file_cv`,`pegawai`.`mulai_bekerja` AS `mulai_bekerja`,`pegawai`.`keterangan` AS `keterangan`,`pegawai`.`level` AS `level`,`pegawai`.`aktif` AS `aktif`,`pegawai`.`kehadiran` AS `kehadiran` from `pegawai` where (`pegawai`.`jenjang_id` is null);

-- Dumping structure for view sigap2.v_totalgaji
-- Removing temporary table and create final VIEW structure
DROP TABLE IF EXISTS `v_totalgaji`;
CREATE ALGORITHM=UNDEFINED SQL SECURITY DEFINER VIEW `v_totalgaji` AS select `m_sd`.`id` AS `id`,`m_sd`.`tahun` AS `tahun`,`m_sd`.`bulan` AS `bulan`,`m_sd`.`datetime` AS `datetime`,`gaji`.`pegawai` AS `pegawai`,`gaji`.`total` AS `total`,`gaji`.`id` AS `id1`,`gaji`.`status` AS `status` from (`m_sd` join `gaji` on((`m_sd`.`id` = `gaji`.`pid`)));

-- Dumping structure for view sigap2.v_totalgajikaryawan
-- Removing temporary table and create final VIEW structure
DROP TABLE IF EXISTS `v_totalgajikaryawan`;
CREATE ALGORITHM=UNDEFINED SQL SECURITY DEFINER VIEW `v_totalgajikaryawan` AS select `m_karyawan_sd`.`id` AS `id1`,`m_karyawan_sd`.`datetime` AS `datetime`,`gaji_karyawan_sd`.`pegawai` AS `pegawai`,`gaji_karyawan_sd`.`total` AS `total`,`m_karyawan_sd`.`tahun` AS `tahun`,`m_karyawan_sd`.`bulan` AS `bulan`,`gaji_karyawan_sd`.`id` AS `id`,`gaji_karyawan_sd`.`status` AS `status` from (`gaji_karyawan_sd` join `m_karyawan_sd` on((`m_karyawan_sd`.`id` = `gaji_karyawan_sd`.`pid`)));

-- Dumping structure for view sigap2.v_totalgajikaryawansma
-- Removing temporary table and create final VIEW structure
DROP TABLE IF EXISTS `v_totalgajikaryawansma`;
CREATE ALGORITHM=UNDEFINED SQL SECURITY DEFINER VIEW `v_totalgajikaryawansma` AS select `m_karyawan_sma`.`id` AS `id`,`m_karyawan_sma`.`tahun` AS `tahun`,`m_karyawan_sma`.`bulan` AS `bulan`,`gaji_karyawan_sma`.`pegawai` AS `pegawai`,`gaji_karyawan_sma`.`total` AS `total`,`m_karyawan_sma`.`datetime` AS `datetime` from (`gaji_karyawan_sma` join `m_karyawan_sma` on((`m_karyawan_sma`.`id` = `gaji_karyawan_sma`.`pid`)));

-- Dumping structure for view sigap2.v_totalgajikaryawansmk
-- Removing temporary table and create final VIEW structure
DROP TABLE IF EXISTS `v_totalgajikaryawansmk`;
CREATE ALGORITHM=UNDEFINED SQL SECURITY DEFINER VIEW `v_totalgajikaryawansmk` AS select `m_karyawan_smk`.`id` AS `id1`,`m_karyawan_smk`.`tahun` AS `tahun`,`m_karyawan_smk`.`bulan` AS `bulan`,`m_karyawan_smk`.`datetime` AS `datetime`,`gaji_karyawan_smk`.`pegawai` AS `pegawai`,`gaji_karyawan_smk`.`total` AS `total`,`gaji_karyawan_smk`.`id` AS `id`,`gaji_karyawan_smk`.`status` AS `status` from (`gaji_karyawan_smk` join `m_karyawan_smk` on((`m_karyawan_smk`.`id` = `gaji_karyawan_smk`.`pid`)));

-- Dumping structure for view sigap2.v_totalgajikaryawansmp
-- Removing temporary table and create final VIEW structure
DROP TABLE IF EXISTS `v_totalgajikaryawansmp`;
CREATE ALGORITHM=UNDEFINED SQL SECURITY DEFINER VIEW `v_totalgajikaryawansmp` AS select `m_karyawan_smp`.`id` AS `id`,`m_karyawan_smp`.`datetime` AS `datetime`,`m_karyawan_smp`.`tahun` AS `tahun`,`m_karyawan_smp`.`bulan` AS `bulan`,`gaji_karyawan_smp`.`pegawai` AS `pegawai`,`gaji_karyawan_smp`.`total` AS `total`,`gaji_karyawan_smp`.`id` AS `id1`,`gaji_karyawan_smp`.`status` AS `status` from (`m_karyawan_smp` join `gaji_karyawan_smp` on((`m_karyawan_smp`.`id` = `gaji_karyawan_smp`.`pid`)));

-- Dumping structure for view sigap2.v_totalgajikaryawantk
-- Removing temporary table and create final VIEW structure
DROP TABLE IF EXISTS `v_totalgajikaryawantk`;
CREATE ALGORITHM=UNDEFINED SQL SECURITY DEFINER VIEW `v_totalgajikaryawantk` AS select `m_karyawan_tk`.`id` AS `id`,`m_karyawan_tk`.`datetime` AS `datetime`,`m_karyawan_tk`.`tahun` AS `tahun`,`m_karyawan_tk`.`bulan` AS `bulan`,`gaji_karyawan_tk`.`pegawai` AS `pegawai`,`gaji_karyawan_tk`.`total` AS `total`,`gaji_karyawan_tk`.`id` AS `id1`,`gaji_karyawan_tk`.`status` AS `status` from (`m_karyawan_tk` join `gaji_karyawan_tk` on((`m_karyawan_tk`.`id` = `gaji_karyawan_tk`.`pid`)));

-- Dumping structure for view sigap2.v_totalgajisma
-- Removing temporary table and create final VIEW structure
DROP TABLE IF EXISTS `v_totalgajisma`;
CREATE ALGORITHM=UNDEFINED SQL SECURITY DEFINER VIEW `v_totalgajisma` AS select `m_sma`.`id` AS `id`,`m_sma`.`tahun` AS `tahun`,`m_sma`.`bulan` AS `bulan`,`gaji_sma`.`pegawai` AS `pegawai`,`gaji_sma`.`total` AS `total`,`gaji_sma`.`id` AS `id1`,`gaji_sma`.`status` AS `status` from (`m_sma` join `gaji_sma` on((`m_sma`.`id` = `gaji_sma`.`pid`)));

-- Dumping structure for view sigap2.v_totalgajismk
-- Removing temporary table and create final VIEW structure
DROP TABLE IF EXISTS `v_totalgajismk`;
CREATE ALGORITHM=UNDEFINED SQL SECURITY DEFINER VIEW `v_totalgajismk` AS select `m_smk`.`id` AS `id`,`m_smk`.`tahun` AS `tahun`,`m_smk`.`bulan` AS `bulan`,`m_smk`.`datetime` AS `datetime`,`gaji_smk`.`pegawai` AS `pegawai`,`gaji_smk`.`total` AS `total`,`gaji_smk`.`id` AS `id1`,`gaji_smk`.`status` AS `status` from (`m_smk` join `gaji_smk` on((`m_smk`.`id` = `gaji_smk`.`pid`)));

-- Dumping structure for view sigap2.v_totalgajismp
-- Removing temporary table and create final VIEW structure
DROP TABLE IF EXISTS `v_totalgajismp`;
CREATE ALGORITHM=UNDEFINED SQL SECURITY DEFINER VIEW `v_totalgajismp` AS select `m_smp`.`id` AS `id`,`m_smp`.`datetime` AS `datetime`,`m_smp`.`tahun` AS `tahun`,`m_smp`.`bulan` AS `bulan`,`gaji_smp`.`pegawai` AS `pegawai`,`gaji_smp`.`total` AS `total`,`gaji_smp`.`id` AS `id1`,`gaji_smp`.`status` AS `status` from (`m_smp` join `gaji_smp` on((`m_smp`.`id` = `gaji_smp`.`pid`)));

-- Dumping structure for view sigap2.v_totalgajitk
-- Removing temporary table and create final VIEW structure
DROP TABLE IF EXISTS `v_totalgajitk`;
CREATE ALGORITHM=UNDEFINED SQL SECURITY DEFINER VIEW `v_totalgajitk` AS select `m_tk`.`id` AS `id`,`m_tk`.`tahun` AS `tahun`,`m_tk`.`bulan` AS `bulan`,`m_tk`.`datetime` AS `datetime`,`gaji_tk`.`pegawai` AS `pegawai`,`gaji_tk`.`total` AS `total`,`gaji_tk`.`id` AS `id1`,`gaji_tk`.`status` AS `status` from (`m_tk` join `gaji_tk` on((`m_tk`.`id` = `gaji_tk`.`pid`)));

-- Dumping structure for view sigap2.v_totalgajitu
-- Removing temporary table and create final VIEW structure
DROP TABLE IF EXISTS `v_totalgajitu`;
CREATE ALGORITHM=UNDEFINED SQL SECURITY DEFINER VIEW `v_totalgajitu` AS select `m_tu_sd`.`id` AS `id1`,`m_tu_sd`.`tahun` AS `tahun`,`m_tu_sd`.`bulan` AS `bulan`,`m_tu_sd`.`datetime` AS `datetime`,`gaji_tu_sd`.`pegawai` AS `pegawai`,`gaji_tu_sd`.`total` AS `total`,`gaji_tu_sd`.`id` AS `id`,`gaji_tu_sd`.`status` AS `status` from (`gaji_tu_sd` join `m_tu_sd` on((`m_tu_sd`.`id` = `gaji_tu_sd`.`pid`)));

-- Dumping structure for view sigap2.v_totalgajitusma
-- Removing temporary table and create final VIEW structure
DROP TABLE IF EXISTS `v_totalgajitusma`;
CREATE ALGORITHM=UNDEFINED SQL SECURITY DEFINER VIEW `v_totalgajitusma` AS select `m_tu_sma`.`id` AS `id`,`m_tu_sma`.`datetime` AS `datetime`,`m_tu_sma`.`tahun` AS `tahun`,`m_tu_sma`.`bulan` AS `bulan`,`gaji_tu_sma`.`pegawai` AS `pegawai`,`gaji_tu_sma`.`total` AS `total`,`gaji_tu_sma`.`id` AS `id1`,`gaji_tu_sma`.`status` AS `status` from (`m_tu_sma` join `gaji_tu_sma` on((`m_tu_sma`.`id` = `gaji_tu_sma`.`pid`)));

-- Dumping structure for view sigap2.v_totalgajitusmk
-- Removing temporary table and create final VIEW structure
DROP TABLE IF EXISTS `v_totalgajitusmk`;
CREATE ALGORITHM=UNDEFINED SQL SECURITY DEFINER VIEW `v_totalgajitusmk` AS select `m_tu_smk`.`id` AS `id`,`m_tu_smk`.`tahun` AS `tahun`,`m_tu_smk`.`bulan` AS `bulan`,`m_tu_smk`.`datetime` AS `datetime`,`gaji_tu_smk`.`pegawai` AS `pegawai`,`gaji_tu_smk`.`total` AS `total`,`gaji_tu_smk`.`id` AS `id1`,`gaji_tu_smk`.`status` AS `status` from (`m_tu_smk` join `gaji_tu_smk` on((`m_tu_smk`.`id` = `gaji_tu_smk`.`pid`)));

-- Dumping structure for view sigap2.v_totalgajitusmp
-- Removing temporary table and create final VIEW structure
DROP TABLE IF EXISTS `v_totalgajitusmp`;
CREATE ALGORITHM=UNDEFINED SQL SECURITY DEFINER VIEW `v_totalgajitusmp` AS select `m_tu_smp`.`id` AS `id`,`m_tu_smp`.`tahun` AS `tahun`,`m_tu_smp`.`bulan` AS `bulan`,`gaji_tu_smp`.`pegawai` AS `pegawai`,`gaji_tu_smp`.`total` AS `total`,`m_tu_smp`.`datetime` AS `datetime`,`gaji_tu_smp`.`status` AS `status`,`gaji_tu_smp`.`id` AS `id1` from (`m_tu_smp` join `gaji_tu_smp` on((`m_tu_smp`.`id` = `gaji_tu_smp`.`pid`)));

-- Dumping structure for view sigap2.v_totalgajitutk
-- Removing temporary table and create final VIEW structure
DROP TABLE IF EXISTS `v_totalgajitutk`;
CREATE ALGORITHM=UNDEFINED SQL SECURITY DEFINER VIEW `v_totalgajitutk` AS select `m_tu_tk`.`id` AS `id`,`m_tu_tk`.`tahun` AS `tahun`,`m_tu_tk`.`bulan` AS `bulan`,`m_tu_tk`.`datetime` AS `datetime`,`gaji_tu_tk`.`pegawai` AS `pegawai`,`gaji_tu_tk`.`total` AS `total`,`gaji_tu_tk`.`id` AS `id1`,`gaji_tu_tk`.`status` AS `status` from (`m_tu_tk` join `gaji_tu_tk` on((`m_tu_tk`.`id` = `gaji_tu_tk`.`pid`)));

-- Dumping structure for view sigap2.v_tu_sd
-- Removing temporary table and create final VIEW structure
DROP TABLE IF EXISTS `v_tu_sd`;
CREATE ALGORITHM=UNDEFINED SQL SECURITY DEFINER VIEW `v_tu_sd` AS select `m_tu_sd`.`id` AS `id`,`m_tu_sd`.`datetime` AS `datetime`,`m_tu_sd`.`createby` AS `createby`,`m_tu_sd`.`tahun` AS `tahun`,`m_tu_sd`.`bulan` AS `bulan` from `m_tu_sd`;

-- Dumping structure for view sigap2.v_tu_sma
-- Removing temporary table and create final VIEW structure
DROP TABLE IF EXISTS `v_tu_sma`;
CREATE ALGORITHM=UNDEFINED SQL SECURITY DEFINER VIEW `v_tu_sma` AS select `m_tu_sma`.`id` AS `id`,`m_tu_sma`.`datetime` AS `datetime`,`m_tu_sma`.`createby` AS `createby`,`m_tu_sma`.`tahun` AS `tahun`,`m_tu_sma`.`bulan` AS `bulan` from `m_tu_sma`;

-- Dumping structure for view sigap2.v_tu_smk
-- Removing temporary table and create final VIEW structure
DROP TABLE IF EXISTS `v_tu_smk`;
CREATE ALGORITHM=UNDEFINED SQL SECURITY DEFINER VIEW `v_tu_smk` AS select `m_tu_smk`.`id` AS `id`,`m_tu_smk`.`datetime` AS `datetime`,`m_tu_smk`.`createby` AS `createby`,`m_tu_smk`.`tahun` AS `tahun`,`m_tu_smk`.`bulan` AS `bulan` from `m_tu_smk`;

-- Dumping structure for view sigap2.v_tu_smp
-- Removing temporary table and create final VIEW structure
DROP TABLE IF EXISTS `v_tu_smp`;
CREATE ALGORITHM=UNDEFINED SQL SECURITY DEFINER VIEW `v_tu_smp` AS select `m_tu_smp`.`id` AS `id`,`m_tu_smp`.`datetime` AS `datetime`,`m_tu_smp`.`createby` AS `createby`,`m_tu_smp`.`tahun` AS `tahun`,`m_tu_smp`.`bulan` AS `bulan` from `m_tu_smp`;

-- Dumping structure for view sigap2.v_tu_tk
-- Removing temporary table and create final VIEW structure
DROP TABLE IF EXISTS `v_tu_tk`;
CREATE ALGORITHM=UNDEFINED SQL SECURITY DEFINER VIEW `v_tu_tk` AS select `m_tu_tk`.`id` AS `id`,`m_tu_tk`.`datetime` AS `datetime`,`m_tu_tk`.`createby` AS `createby`,`m_tu_tk`.`tahun` AS `tahun`,`m_tu_tk`.`bulan` AS `bulan` from `m_tu_tk`;

-- Dumping structure for view sigap2.v_yayasan
-- Removing temporary table and create final VIEW structure
DROP TABLE IF EXISTS `v_yayasan`;
CREATE ALGORITHM=UNDEFINED SQL SECURITY DEFINER VIEW `v_yayasan` AS select `m_yayasan`.`id` AS `id`,`m_yayasan`.`bulan` AS `bulan`,`m_yayasan`.`tahun` AS `tahun`,`yayasan`.`m_id` AS `m_id`,`yayasan`.`id_pegawai` AS `id_pegawai`,`yayasan`.`gaji_pokok` AS `gaji_pokok`,`yayasan`.`potongan` AS `potongan`,`yayasan`.`total` AS `total`,`pegawai`.`rekbank` AS `rekbank` from ((`m_yayasan` join `yayasan` on((`m_yayasan`.`id` = `yayasan`.`m_id`))) join `pegawai` on((`yayasan`.`id_pegawai` = `pegawai`.`id`)));

/*!40103 SET TIME_ZONE=IFNULL(@OLD_TIME_ZONE, 'system') */;
/*!40101 SET SQL_MODE=IFNULL(@OLD_SQL_MODE, '') */;
/*!40014 SET FOREIGN_KEY_CHECKS=IFNULL(@OLD_FOREIGN_KEY_CHECKS, 1) */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40111 SET SQL_NOTES=IFNULL(@OLD_SQL_NOTES, 1) */;
