/*
SQLyog Community v13.1.6 (64 bit)
MySQL - 10.1.37-MariaDB : Database - chatbot
*********************************************************************
*/

/*!40101 SET NAMES utf8 */;

/*!40101 SET SQL_MODE=''*/;

/*!40014 SET @OLD_UNIQUE_CHECKS=@@UNIQUE_CHECKS, UNIQUE_CHECKS=0 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;
/*!40111 SET @OLD_SQL_NOTES=@@SQL_NOTES, SQL_NOTES=0 */;
CREATE DATABASE /*!32312 IF NOT EXISTS*/`chatbot` /*!40100 DEFAULT CHARACTER SET latin1 */;

USE `chatbot`;

/*Table structure for table `aplikasi` */

DROP TABLE IF EXISTS `aplikasi`;

CREATE TABLE `aplikasi` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `nama` varchar(255) NOT NULL,
  `deskripsi` varchar(255) DEFAULT NULL,
  `alamat` varchar(255) NOT NULL,
  `nowaserver` varchar(255) NOT NULL,
  `ipaplikasi` varchar(255) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8mb4;

/*Data for the table `aplikasi` */

insert  into `aplikasi`(`id`,`nama`,`deskripsi`,`alamat`,`nowaserver`,`ipaplikasi`) values 
(1,'Klinik Indag','','Jl. Semolowaru No.84','6285707209373',NULL),
(2,'Tes',NULL,'Jl ','2193210392103',NULL),
(3,'TEs1','','','','192.123');

/*Table structure for table `customer` */

DROP TABLE IF EXISTS `customer`;

CREATE TABLE `customer` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` longtext NOT NULL,
  `name_temp` longtext,
  `number` longtext NOT NULL,
  `create_date` longtext NOT NULL,
  `update_date` longtext NOT NULL,
  `ktp` varchar(20) NOT NULL,
  `ktp_temp` varchar(20) NOT NULL,
  `idaplikasi` int(11) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=44 DEFAULT CHARSET=utf8mb4;

/*Data for the table `customer` */

insert  into `customer`(`id`,`name`,`name_temp`,`number`,`create_date`,`update_date`,`ktp`,`ktp_temp`,`idaplikasi`) values 
(2,'David','','David C099','05/28/2020 17:54:24','05/28/2020 17:54:24','123','',1),
(5,'Sekar','','+62 811-3473-333','05/29/2020 19:59:54','05/29/2020 19:59:54','','',2),
(6,'Achmad Choiron','','+62 817-0331-1567','05/29/2020 20:06:05','05/29/2020 20:06:05','','',NULL),
(8,'Iwan','','+62 813-3100-5758','06/02/2020 11:51:21','06/02/2020 11:51:21','','',NULL),
(11,'Mendin','','Pasar Online Jatim','06/07/2020 15:48:43','06/07/2020 15:48:43','','',NULL),
(12,'',NULL,'+62 857-0720-9373','06/07/2020 16:06:29','06/07/2020 16:06:29','','',NULL),
(14,'Jovanito','','+62 831-0946-1216','07/22/2020 09:21:40','07/22/2020 09:21:40','','',NULL),
(15,'Endi','','+62 856-4800-9133','01/23/2021 07:12:33','01/23/2021 07:12:33','12345678901234','',NULL),
(17,'Ahmad Bagya Cahyadi','','+62 813-3155-9863','01/23/2021 07:45:20','01/23/2021 07:45:20','23422222123453','',NULL),
(18,'',NULL,'+62 818-0606-2629','01/23/2021 10:42:28','01/23/2021 10:42:28','','',NULL),
(20,'Endi','','Endi nug','01/23/2021 18:20:31','01/23/2021 18:20:31','12345','',NULL),
(21,'Dani','','+62 855-3692-8693','01/24/2021 03:41:15','01/24/2021 03:41:15','09876543212341','',NULL),
(22,'62956106542312','','+62 822-3301-3348','01/24/2021 13:18:48','01/24/2021 13:18:48','12345678901234','',NULL),
(23,'Sugeng Rahayu','','+62 812-1684-5757','01/24/2021 13:31:20','01/24/2021 13:31:20','12344678901234','',NULL),
(25,'Putri','','+62 877-8116-5558','01/25/2021 05:04:36','01/25/2021 05:04:36','12345678901234','',NULL),
(32,'Tora Agastarenda','','Tora','01/25/2021 07:39:12','01/25/2021 07:39:12','3522152609870001','',NULL),
(34,'Apk','','+62 812-3187-801','01/26/2021 04:22:01','01/26/2021 04:22:01','12345678910112','',NULL),
(35,'Eddi','','+62 816-5415-549','01/27/2021 09:09:35','01/27/2021 09:09:35','12345678912345','',NULL),
(36,'Joni','','+62 813-5779-4383','01/27/2021 09:12:37','01/27/2021 09:12:37','12345678912345','',NULL),
(37,'Sumaji','','+62 888-0302-8889','01/27/2021 10:17:54','01/27/2021 10:17:54','','',NULL),
(38,'Saputro','','+62 812-1667-8883','01/27/2021 10:20:38','01/27/2021 10:20:38','12345678901234','',NULL),
(39,'3512897654321','','+62 815-5387-5971','01/27/2021 10:36:20','01/27/2021 10:36:20','12345678911234','',NULL),
(40,'Budi Sekarjati 4689063408830004','','+62 813-3028-8567','01/27/2021 10:38:30','01/27/2021 10:38:30','4689063408830004','',NULL),
(41,'Rani, 123456789101111','','+62 821-3186-5566','01/27/2021 10:57:56','01/27/2021 10:57:56','Rani, 12345678901111','',NULL),
(42,'Anamm',NULL,'083108763291','','','21','',NULL),
(43,'ANAM1',NULL,'910390','02/14/2021 19:50:25','02/14/2021 19:50:25','12121','',NULL);

/*Table structure for table `menu` */

DROP TABLE IF EXISTS `menu`;

CREATE TABLE `menu` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `pertanyaan` varchar(255) NOT NULL,
  `jawaban` longtext NOT NULL,
  `command` varchar(10) NOT NULL,
  `idaplikasi` int(11) NOT NULL,
  `idparent` int(11) NOT NULL,
  `isjawaban` tinyint(1) NOT NULL,
  PRIMARY KEY (`id`),
  KEY `idsekolah` (`idaplikasi`),
  CONSTRAINT `menu_ibfk_1` FOREIGN KEY (`idaplikasi`) REFERENCES `aplikasi` (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=40 DEFAULT CHARSET=utf8mb4;

/*Data for the table `menu` */

insert  into `menu`(`id`,`pertanyaan`,`jawaban`,`command`,`idaplikasi`,`idparent`,`isjawaban`) values 
(19,'Export','Tuliskan nomor pilihan informasi EKSPOR yang anda perlukan :1. Dokumen yang diperlukan2. Prosedur ekspor3. Registrasi Nomer Induk Berusaha (NIB)4. Ketentuan umum ekspor5. Persyaratan Ekspor','1',1,0,0),
(20,'Import','Tuliskan nomor pilihan informasi impor bagi :\r\n1. Perorangan\r\n2. Badan Usaha','2',1,0,0),
(21,'Promosi Ekspor','Tuliskan nomor pilihan informasi promosi yanga ingin anda ketahui :\r\n1. Syarat mengikuti event promosi\r\n2. Jadwal pelaksanaan event promosi','3',2,0,0),
(22,'Dokumen yang diperlukan','Dokumen yang diperlukan untuk EKSPOR \r\n\r\n1. Kontrak penjualan (sales contract)\r\n2. Faktur perdagangan (commercial invoice)\r\n3. Packing list\r\n4. Pemberitahuan Ekspor Barang (PEB)\r\n5. Bill of Lading (B/L)\r\n6. Polis asuransi\r\n7. Airwill Bill (AWB)\r\n8. Letter of Credit (L/C)->Jika diperlukan\r\n9. Surat pernyataan mutu (quality statement)->Jika diperlukan oleh importir\r\n10. Certificate of Origin (COO) / Surat Keterangan Asal (SKA) -> Jika diperlukan oleh importir','1.1',1,19,1),
(23,'Prosedur ekspor','Prosedur ekspor sesuai gambar ','1.2',1,19,1),
(24,'Registrasi Nomor Induk Berusaha','','1.3',1,19,0),
(25,'Ketentuan Umum dibidang Ekspor','berdasarkan PERATURAN MENTERI PERDAGANGAN NOMOR : 13/M-DAG/PER/3/2012 TENTANG KETENTUAN UMUM DIBIDANG EKSPOR, ada 3 kategori barang EKSPOR :\r\n\r\n1. BARANG DIBATASI, di antaranya : Beras, Sarang burung walet ke China, Timah, Sisa dan Skrap Logam, Perak dan Emas, Prekusor Non Farmasi, Produk Industri Kehutanan, Produk Pertambangan Hasil Pengolahan dan Pemurnian,Tumbuhan Alam dan Satwa Liar Yang Tidak Dilingungin Undang-Undang, Hewan dan Produk Hewan, Minyak dan Gas Bumi, Kopi , Rotan dan Produk Rotan\r\n\r\n2. BARANG DILARANG EKSPOR, dalam bidang bidang berikut :\r\na. Bidang Pertanian : Karet Alam yang tidak memenuhi SNI,Karet Alam Dalam bentuk Lain selain smoked sheet dan  TSNR (SIR)\r\nb. Bidang Kehutanan : Kayu bulat, Bantalan rel kereta api dari kayu\r\nc. Bidang Perikanan dan Kelautan : Anak Ikan Arwana ukuran dibawah 10 cm, Benih Ikan Sidat\r\nd. Bidang Industri : Sisa Skrap Fero, Ingot hasil peleburan kembali atau baja (kecuali berasal dari wilayah pulau Batam)\r\ne. Bidang Pertambangan : Bijih Tmah, Tinslag dan Tailing Pasir alam termasuk pasir laut, pasir sungai, pasir danau dan pasir tambang (Pasir Quari), tanah dan top soil.\r\n\r\n3. BARANG BEBAS EKSPOR : adalah Selain barang yang DIBATASI dan Barang yang DILARANG','1.4',1,19,1),
(26,'Persyaratan Export','','1.5',1,19,0),
(27,'Perorangan','Dokumen untuk persyaratan NIB Perorangan nya adalah :\r\n1. Surat Domisili Usaha\r\n2. NPWP Pribadi\r\n3. Laporan SPT Pribadi tahunan','1.3.1',1,24,1),
(28,'Non Perorangan','Dokumen persyaratan nya NIB Non Perorangan adalah :\r\n1. Surat Domisili Usaha\r\n2. NPWP Pribadi dan Badan \r\n3. Laporan SPT Pribadi Tahunan\r\n4. Akta Pendirian Perusahaan \r\n5. Terdaftar di AHU','1.3.2',1,24,1),
(29,'Perorangan','Dokumen yang dibutuhkan untuk persyaratan ekspor perorangan nya adalah :\r\n1. NPWP\r\n2. NIB','1.5.1',1,26,1),
(30,'Non Perorangan','Dokumen yang dibutuhkan untuk persyaratan ekspor non perorangan nya adalah :\r\n1. AKTE PENDIRIAN\r\n2. NPWP BADAN\r\n3. NIB','1.5.2',1,26,1),
(31,'Badan Usaha','Syarat Menjadi Importir : 1. Berbadan Hukum2. Mempunyai NIB (Nomor Ijin Berusaha) yang dikeluarkan oleh lembaga OSSCara Pembuatan Persetujuan Impor :1. Memiliki NIB2. Perusahaan harus memiliki hak akses inatrade (inatrade.kemendag.go.id)Jika Belum Memiliki Akses Inatrade1. Silahkan mendaftar terlebih dahulu di website inatrade.kemendag.go.id 2. Kemudian klik registrasi inatrade3. Masukkan data-data yang diperlukan4. Klik register','2.1',1,20,1),
(32,'Perorangan','Ketentuan Nilai Barang\r\n1. Nilai barang impor kurang dari FOB US$ 3.00 bebas Bea Masuk, jika nilainya lebih akan dipungut Bea Masuk\r\n2.Nilai barang sd FOB US$ 1500.00 dipungut PPN tidak dipungut PPh, jika lebih dikenakan pembebanan tarif bea masuk umum\r\n\r\nKetentuan Nilai Kepabeanan\r\n1. Nilai pabean barang kiriman lebih dari US$ 1500 diberitahukan dengan dokumen PIB, akan diberlakukan ketentuan kepabeanan yang akan dihitung oleh petugas Bea dan Cukai berdasarkan data harga pembanding, jika nilainya kurang atau sama dengan US$ 3.00 tidak dikenakan Bea Masuk, namun jika nilainya lebih dari US$ 3.00 akan dikenakan Bea Masuk.','2.2',1,20,1),
(33,'Syarat mengikuti event promosi','SYARAT MENGIKUTI EVENT\r\n1. Mengikuti Seleksi\r\n2. Mengikuti Tekhnical Meeting\r\n3. Sanggup sebagai peserta event','3.1',1,21,1),
(34,'Jadwal pelaksanaan event promosi','JADWAL PELAKSANAAN EVENT\r\n1. Sesuai tanggal pelaksanaan\r\n2. Sesuai Tema','3.2',1,21,1),
(35,'Ketik \'menu\' untuk kembali ke menu utama','','',1,19,0),
(37,'Menu Sebelumnya','','1',1,24,0),
(38,'Menu Sebelumnya','','1',1,26,0);

/*Table structure for table `menuapp` */

DROP TABLE IF EXISTS `menuapp`;

CREATE TABLE `menuapp` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `judul_menu` varchar(45) DEFAULT NULL,
  `url` varchar(255) DEFAULT NULL,
  `ismainmenu` varchar(45) DEFAULT NULL,
  `icon` varchar(45) DEFAULT NULL,
  `roleapp` varchar(10) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=10 DEFAULT CHARSET=utf8mb4;

/*Data for the table `menuapp` */

insert  into `menuapp`(`id`,`judul_menu`,`url`,`ismainmenu`,`icon`,`roleapp`) values 
(1,'Menu','http://localhost/chatbot/index.php/menu','0','glyphicon glyphicon-menu-hamburger',''),
(2,'User','http://localhost/chatbot/index.php/user','0','glyphicon glyphicon-user','ADMIN'),
(5,'Aplikasi','http://localhost/chatbot/index.php/aplikasi','0','fa fa-windows','ADMIN'),
(6,'Customer','http://localhost/chatbot/index.php/customer','0','\r\nglyphicon glyphicon-user',''),
(7,'Transaksi','http://localhost/chatbot/index.php/transaksi','0','fa fa-dashboard',''),
(8,'Grafik','http://localhost/chatbot/index.php/grafik','0','fa fa-bar-chart','');

/*Table structure for table `superadmin` */

DROP TABLE IF EXISTS `superadmin`;

CREATE TABLE `superadmin` (
  `id` int(12) NOT NULL AUTO_INCREMENT,
  `nama` varchar(255) NOT NULL,
  `login` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `peranapp` varchar(20) NOT NULL,
  `idaplikasi` int(12) NOT NULL,
  `idparent` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=utf8mb4;

/*Data for the table `superadmin` */

insert  into `superadmin`(`id`,`nama`,`login`,`password`,`peranapp`,`idaplikasi`,`idparent`) values 
(2,'Admin2','admin2','admin2','ADMIN',0,0),
(3,'user','user123','user123','ANGGOTA',1,0),
(4,'demo','demoo','demoo','ADMIN',0,0);

/*Table structure for table `transaksi` */

DROP TABLE IF EXISTS `transaksi`;

CREATE TABLE `transaksi` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `idcustomer` int(11) NOT NULL,
  `tanggaljam` datetime NOT NULL,
  `message` varchar(255) DEFAULT NULL,
  `idaplikasi` int(11) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=22 DEFAULT CHARSET=utf8mb4;

/*Data for the table `transaksi` */

insert  into `transaksi`(`id`,`idcustomer`,`tanggaljam`,`message`,`idaplikasi`) values 
(11,21,'2020-07-21 04:39:17','1',1),
(12,21,'2020-07-22 03:21:12','2',1),
(13,21,'2020-07-22 04:26:51','3',1),
(14,21,'2020-07-22 09:02:03','4',1),
(15,14,'2020-07-22 09:22:44','2',1),
(16,14,'2020-07-22 09:24:48','3',1),
(17,14,'2020-07-22 09:25:10','1',2),
(18,14,'2020-07-22 09:25:32','2',2),
(19,14,'2020-07-22 09:28:40','2',2),
(20,20,'2020-07-22 09:33:30','3',2),
(21,20,'2020-07-22 12:34:05','1',2);

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;
