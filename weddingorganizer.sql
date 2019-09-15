# ************************************************************
# Sequel Pro SQL dump
# Version 4541
#
# http://www.sequelpro.com/
# https://github.com/sequelpro/sequelpro
#
# Host: 127.0.0.1 (MySQL 5.6.35)
# Database: weddingorganizer
# Generation Time: 2017-10-04 10:46:06 +0000
# ************************************************************


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;
/*!40111 SET @OLD_SQL_NOTES=@@SQL_NOTES, SQL_NOTES=0 */;


# Dump of table dekorasi
# ------------------------------------------------------------

DROP TABLE IF EXISTS `dekorasi`;

CREATE TABLE `dekorasi` (
  `dekorasi_id` int(11) NOT NULL AUTO_INCREMENT,
  `nama_dekorasi` varchar(15) NOT NULL,
  `deskripsi` varchar(255) NOT NULL,
  `harga_dekorasi` decimal(11,0) NOT NULL,
  `foto` varchar(255) NOT NULL,
  PRIMARY KEY (`dekorasi_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;



# Dump of table dokumentasi
# ------------------------------------------------------------

DROP TABLE IF EXISTS `dokumentasi`;

CREATE TABLE `dokumentasi` (
  `dokumentasi_id` int(11) NOT NULL AUTO_INCREMENT,
  `nama_dokumentasi` varchar(255) NOT NULL,
  `deskripsi` varchar(255) NOT NULL,
  `harga_dokumentasi` decimal(11,0) NOT NULL,
  PRIMARY KEY (`dokumentasi_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;



# Dump of table gedung
# ------------------------------------------------------------

DROP TABLE IF EXISTS `gedung`;

CREATE TABLE `gedung` (
  `gedung_id` int(5) unsigned NOT NULL AUTO_INCREMENT,
  `nama_gedung` varchar(35) NOT NULL,
  `deskripsi` varchar(255) NOT NULL,
  `harga_gedung` decimal(11,0) NOT NULL,
  `foto` varchar(255) NOT NULL,
  KEY `gedung_id` (`gedung_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;



# Dump of table katering
# ------------------------------------------------------------

DROP TABLE IF EXISTS `katering`;

CREATE TABLE `katering` (
  `katering_id` int(11) NOT NULL AUTO_INCREMENT,
  `nama_katering` varchar(25) NOT NULL,
  `deskripsi` varchar(255) NOT NULL,
  `jumlah` decimal(5,0) NOT NULL,
  `harga_katering` decimal(11,0) NOT NULL,
  PRIMARY KEY (`katering_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;



# Dump of table konfirmasi
# ------------------------------------------------------------

DROP TABLE IF EXISTS `konfirmasi`;

CREATE TABLE `konfirmasi` (
  `id` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `pelanggan_id` int(11) DEFAULT NULL,
  `pemesanan_id` int(11) DEFAULT NULL,
  `no_rek` varchar(25) DEFAULT NULL,
  `nama_bank` varchar(25) DEFAULT NULL,
  `pemilik` varchar(25) DEFAULT NULL,
  `foto` varchar(255) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;



# Dump of table migrations
# ------------------------------------------------------------

DROP TABLE IF EXISTS `migrations`;

CREATE TABLE `migrations` (
  `version` bigint(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;



# Dump of table pelanggan
# ------------------------------------------------------------

DROP TABLE IF EXISTS `pelanggan`;

CREATE TABLE `pelanggan` (
  `pelanggan_id` int(11) NOT NULL AUTO_INCREMENT,
  `nama` varchar(50) NOT NULL,
  `no_telp` varchar(12) NOT NULL,
  `alamat` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `password` varchar(11) NOT NULL DEFAULT '',
  PRIMARY KEY (`pelanggan_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;



# Dump of table pemesanan
# ------------------------------------------------------------

DROP TABLE IF EXISTS `pemesanan`;

CREATE TABLE `pemesanan` (
  `id_pemesanan` varchar(15) NOT NULL,
  `user_id` int(11) unsigned NOT NULL,
  `tgl_acara` varchar(10) NOT NULL,
  `status` varchar(15) NOT NULL,
  PRIMARY KEY (`id_pemesanan`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;



# Dump of table pemesanan_dekorasi
# ------------------------------------------------------------

DROP TABLE IF EXISTS `pemesanan_dekorasi`;

CREATE TABLE `pemesanan_dekorasi` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `pemesanan_id` varchar(15) NOT NULL,
  `dekorasi_id` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;



# Dump of table pemesanan_dokumentasi
# ------------------------------------------------------------

DROP TABLE IF EXISTS `pemesanan_dokumentasi`;

CREATE TABLE `pemesanan_dokumentasi` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `pemesanan_id` varchar(15) NOT NULL,
  `dokumentasi_id` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;



# Dump of table pemesanan_gedung
# ------------------------------------------------------------

DROP TABLE IF EXISTS `pemesanan_gedung`;

CREATE TABLE `pemesanan_gedung` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `pemesanan_id` varchar(15) NOT NULL,
  `gedung_id` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;



# Dump of table pemesanan_katering
# ------------------------------------------------------------

DROP TABLE IF EXISTS `pemesanan_katering`;

CREATE TABLE `pemesanan_katering` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `pemesanan_id` varchar(15) NOT NULL,
  `katering_id` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;



# Dump of table pemesanan_rias
# ------------------------------------------------------------

DROP TABLE IF EXISTS `pemesanan_rias`;

CREATE TABLE `pemesanan_rias` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `pemesanan_id` varchar(15) NOT NULL,
  `rias_id` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;



# Dump of table rias
# ------------------------------------------------------------

DROP TABLE IF EXISTS `rias`;

CREATE TABLE `rias` (
  `rias_id` int(11) NOT NULL AUTO_INCREMENT,
  `nama_rias` varchar(50) NOT NULL,
  `gambar` varchar(255) NOT NULL,
  `deskripsi` varchar(255) NOT NULL,
  `harga_rias` decimal(11,0) NOT NULL,
  PRIMARY KEY (`rias_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;



# Dump of table users
# ------------------------------------------------------------

DROP TABLE IF EXISTS `users`;

CREATE TABLE `users` (
  `user_id` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(35) NOT NULL,
  `username` varchar(35) NOT NULL,
  `no_telp` varchar(12) DEFAULT NULL,
  `password` varchar(255) NOT NULL,
  PRIMARY KEY (`user_id`),
  UNIQUE KEY `username` (`username`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

LOCK TABLES `users` WRITE;
/*!40000 ALTER TABLE `users` DISABLE KEYS */;

INSERT INTO `users` (`user_id`, `name`, `username`, `no_telp`, `password`)
VALUES
	(1,'admin','admin','','admin');

/*!40000 ALTER TABLE `users` ENABLE KEYS */;
UNLOCK TABLES;



/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;
/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
