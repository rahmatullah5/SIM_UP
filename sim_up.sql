/*
SQLyog Ultimate v11.11 (64 bit)
MySQL - 5.6.21 : Database - db_sim_up
*********************************************************************
*/

/*!40101 SET NAMES utf8 */;

/*!40101 SET SQL_MODE=''*/;

/*!40014 SET @OLD_UNIQUE_CHECKS=@@UNIQUE_CHECKS, UNIQUE_CHECKS=0 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;
/*!40111 SET @OLD_SQL_NOTES=@@SQL_NOTES, SQL_NOTES=0 */;
CREATE DATABASE /*!32312 IF NOT EXISTS*/`db_sim_up` /*!40100 DEFAULT CHARACTER SET latin1 */;

USE `db_sim_up`;

/*Table structure for table `su_admin` */

DROP TABLE IF EXISTS `su_admin`;

CREATE TABLE `su_admin` (
  `id_admin` int(11) NOT NULL AUTO_INCREMENT,
  `user` varchar(15) DEFAULT NULL,
  `pass` varchar(15) DEFAULT NULL,
  `gambar` varchar(255) DEFAULT 'assets\\images\\admin\\a.jpg',
  `nama` varchar(50) DEFAULT 'admin',
  `tentang` varchar(50) DEFAULT 'admin',
  PRIMARY KEY (`id_admin`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=latin1;

/*Data for the table `su_admin` */

insert  into `su_admin`(`id_admin`,`user`,`pass`,`gambar`,`nama`,`tentang`) values (1,'admin','admin','assets/images/admin/1/profil_smkn-1-cimahi-800px.png','Test1','test2');

/*Table structure for table `su_cart` */

DROP TABLE IF EXISTS `su_cart`;

CREATE TABLE `su_cart` (
  `id_cart` varchar(50) NOT NULL,
  `harga` int(10) NOT NULL,
  `banyak_produk` int(10) NOT NULL,
  `id_produk` int(10) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

/*Data for the table `su_cart` */

insert  into `su_cart`(`id_cart`,`harga`,`banyak_produk`,`id_produk`) values ('mhoumftmhn3evmjh0c1dkg8ka5',25000,1,4),('8l0770c4e9n27eo7uhdjb66i32',20000,2,9),('jd8t975p6p2p6l7gllr95vqh05',25000,1,3),('jd8t975p6p2p6l7gllr95vqh05',1500,5,8),('jd8t975p6p2p6l7gllr95vqh05',25000,1,3),('jd8t975p6p2p6l7gllr95vqh05',1500,1,8),('ehn8fieha7o0ahd7465oj95r62',25000,2,2),('8otk43ckh5ncpk5g53bg4e2882',25000,1,2);

/*Table structure for table `su_cart_ref` */

DROP TABLE IF EXISTS `su_cart_ref`;

CREATE TABLE `su_cart_ref` (
  `id_cart` varchar(50) NOT NULL,
  `id_produk` int(10) NOT NULL,
  `harga` int(10) NOT NULL,
  `banyak_produk` int(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

/*Data for the table `su_cart_ref` */

insert  into `su_cart_ref`(`id_cart`,`id_produk`,`harga`,`banyak_produk`) values ('9njhbvljer23tqqlr0kfrutjs6',3,25000,1);

/*Table structure for table `su_cek` */

DROP TABLE IF EXISTS `su_cek`;

CREATE TABLE `su_cek` (
  `id_cek` int(10) NOT NULL AUTO_INCREMENT,
  `id_pesanan` int(10) DEFAULT NULL,
  `email` varchar(50) DEFAULT NULL,
  `jumlah` int(10) DEFAULT NULL,
  `tujuan` varchar(50) DEFAULT NULL,
  `via` varchar(50) DEFAULT NULL,
  `nama` varchar(50) DEFAULT NULL,
  `tgl` varchar(50) DEFAULT NULL,
  `status_cek` int(100) DEFAULT '0',
  `gambar` text,
  PRIMARY KEY (`id_cek`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=latin1;

/*Data for the table `su_cek` */

insert  into `su_cek`(`id_cek`,`id_pesanan`,`email`,`jumlah`,`tujuan`,`via`,`nama`,`tgl`,`status_cek`,`gambar`) values (3,1,'R@gmai.com',2400000,'BCA','BCA','RAhmat','2 Oktober 2015',1,'images/asset/cek_pesan/1/yeah.jpg'),(4,5,'cibabat@gmail.com',500000,'BCA','BNI','Rahmat','2 Oktober 2016',1,'images/asset/cek_pesan/5/1.png');

/*Table structure for table `su_customer` */

DROP TABLE IF EXISTS `su_customer`;

CREATE TABLE `su_customer` (
  `id_cart` varchar(50) NOT NULL,
  `id_customer` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

/*Data for the table `su_customer` */

/*Table structure for table `su_developer` */

DROP TABLE IF EXISTS `su_developer`;

CREATE TABLE `su_developer` (
  `id_developer` int(11) NOT NULL AUTO_INCREMENT,
  `id_user` int(11) NOT NULL,
  `tentang` text NOT NULL,
  PRIMARY KEY (`id_developer`),
  UNIQUE KEY `id_user` (`id_user`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=latin1;

/*Data for the table `su_developer` */

insert  into `su_developer`(`id_developer`,`id_user`,`tentang`) values (1,1,'Tentang Penjual Lol');

/*Table structure for table `su_kategori` */

DROP TABLE IF EXISTS `su_kategori`;

CREATE TABLE `su_kategori` (
  `id_kategori` int(11) NOT NULL AUTO_INCREMENT,
  `deskripsi` text NOT NULL,
  `kategori` varchar(50) NOT NULL,
  PRIMARY KEY (`id_kategori`,`kategori`)
) ENGINE=InnoDB AUTO_INCREMENT=16 DEFAULT CHARSET=latin1;

/*Data for the table `su_kategori` */

insert  into `su_kategori`(`id_kategori`,`deskripsi`,`kategori`) values (7,'Beli Spanduk Disini Aja ','Spanduk'),(8,'Pesan Design Kesini aja','Design Grafis'),(9,'Butuh Pin Tinggal Pesan Disini aja ','Pin'),(10,'Buat Design Mug bilang langsung pakai','Mug'),(11,'Buat Kartu Nama nggak usah ribet tinggal pilih','Kartu Nama'),(12,'Stiker itu bisa ditempel ','Stiker'),(13,'Kaos bukan sembarang kaos apalagi KW ','Kaos'),(14,'Bros tidak sama dengan pin ','Bros'),(15,'Gantungan , tidak terpikir yang lebih simple  ','Gantungan');

/*Table structure for table `su_order` */

DROP TABLE IF EXISTS `su_order`;

CREATE TABLE `su_order` (
  `id_order` int(11) NOT NULL AUTO_INCREMENT,
  `id_user` int(11) DEFAULT NULL,
  `nama` varchar(50) DEFAULT NULL,
  `telp` varchar(50) DEFAULT NULL,
  `email` varchar(50) DEFAULT NULL,
  `desk` text,
  PRIMARY KEY (`id_order`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=latin1;

/*Data for the table `su_order` */

insert  into `su_order`(`id_order`,`id_user`,`nama`,`telp`,`email`,`desk`) values (1,1,'Rendy','089501289411','r@gmail.com','Buatkan saya web'),(2,1,'Rendy','089501289411','r@gmail.com','Buatkan saya web');

/*Table structure for table `su_pesanan` */

DROP TABLE IF EXISTS `su_pesanan`;

CREATE TABLE `su_pesanan` (
  `id_pesanan` int(11) NOT NULL AUTO_INCREMENT,
  `id_cart` varchar(50) NOT NULL,
  `nama_d` varchar(50) DEFAULT NULL,
  `nama_b` varchar(50) DEFAULT NULL,
  `nama_p` varchar(50) DEFAULT NULL,
  `email` varchar(50) DEFAULT NULL,
  `telp` varchar(50) DEFAULT NULL,
  `negara` varchar(50) DEFAULT NULL,
  `alamat_1` text,
  `alamat_2` text,
  `kota` varchar(50) DEFAULT NULL,
  `provinsi` varchar(50) DEFAULT NULL,
  `zip` int(10) DEFAULT NULL,
  `tgl` datetime DEFAULT CURRENT_TIMESTAMP,
  `catatan` text NOT NULL,
  PRIMARY KEY (`id_pesanan`)
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=latin1;

/*Data for the table `su_pesanan` */

insert  into `su_pesanan`(`id_pesanan`,`id_cart`,`nama_d`,`nama_b`,`nama_p`,`email`,`telp`,`negara`,`alamat_1`,`alamat_2`,`kota`,`provinsi`,`zip`,`tgl`,`catatan`) values (1,'8l0770c4e9n27eo7uhdjb66i32','Rendy','Anggara','SMKN 1 CIMAHI','Rendy@gmail.com','8950129411','Indonesia','Jl.Haji Gofur','gg.Karya Bhakti','Cibabat','Cibabat',40522,'2016-02-14 20:51:50',''),(2,'jd8t975p6p2p6l7gllr95vqh05','Wisnu ','Adinegoro','SMKN 1 Cimahi','w@gmail.com','89501200000','Indonesia','Jl.Kamarung','Kelurahan Cibabat','Cimahi','Cibabat',40522,'2016-02-15 09:27:03','Good Lah'),(3,'jd8t975p6p2p6l7gllr95vqh05','Fajar','Saputro','SMKN 2 Cimahi','F@gmail.com','89501289411','Indonesia','Jl.Raya Cibabat','Gg.Karya Bhakti 5','Cimahi','Cibabat',40522,'2016-02-15 15:01:56','None'),(4,'ehn8fieha7o0ahd7465oj95r62','Subandi','Edi','Pemkot CIMAHI','S@gmail.com','895000000','Indonesia','Gg.Karya Bhakti ','Rt.02','Cimai','Cibabat',40522,'2016-02-15 22:43:51','tidak ada'),(5,'8otk43ckh5ncpk5g53bg4e2882','Muhammad','Rahmatullah','SMKN 1 Cimahi','Cibabat@gmail.com','8999','Indonesia','CImahi','Cibabat','Bandung','Cibabat',40522,'2016-04-11 11:34:05','Test');

/*Table structure for table `su_produk` */

DROP TABLE IF EXISTS `su_produk`;

CREATE TABLE `su_produk` (
  `id_produk` int(11) NOT NULL AUTO_INCREMENT,
  `diskon` int(11) NOT NULL DEFAULT '0',
  `harga` int(11) NOT NULL,
  `id_kategori` int(11) NOT NULL,
  `nama` text NOT NULL,
  `deskripsi` text NOT NULL,
  `status_produk` int(11) NOT NULL DEFAULT '1',
  `tgl` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `id_user` int(11) NOT NULL DEFAULT '1',
  `stok` int(11) DEFAULT '1',
  `gambar` text,
  KEY `id_produk` (`id_produk`)
) ENGINE=InnoDB AUTO_INCREMENT=11 DEFAULT CHARSET=latin1;

/*Data for the table `su_produk` */

insert  into `su_produk`(`id_produk`,`diskon`,`harga`,`id_kategori`,`nama`,`deskripsi`,`status_produk`,`tgl`,`id_user`,`stok`,`gambar`) values (2,0,25000,10,'Mug Pepsi','Mug Dengan Design Logo Pepsi',6,'2016-04-11 11:34:06',1,2,'images/asset/produk/2/m1.png'),(3,0,25000,10,'Mug Spongebob','Mug dengan design gambar spongebob',4,'2016-02-15 15:01:56',1,3,'images/asset/produk/3/m3.jpg'),(4,0,25000,10,'Mug Mickey Mouse','Mug Dengan Design gambar Mickey Mouse',4,'2016-02-15 02:56:00',1,5,'images/asset/produk/4/m2.jpg'),(5,10,5000,9,'Pin Kujang','Pin dengan bentuk dan motif kujang khas jawa barat',6,'2016-02-15 03:04:45',1,10,'images/asset/produk/5/p1.jpg'),(6,0,4500,9,'Pin Smile Face','Pin dengan bentuk Smile Face sangat cocok dipakai untuk aksesoris',6,'2016-02-15 03:05:43',1,4,'images/asset/produk/6/p2.jpg'),(7,0,1500,9,'Pin Hijab','Pin dengan gambar karikatur hijaber sangat lucu',6,'2016-02-29 11:45:40',3,5,'images/asset/produk/7/p3.JPG'),(8,0,1500,9,'Pin Garuda','Pin dengan bentuk burung garuda sangat gagah',6,'2016-02-15 15:01:56',1,4,'images/asset/produk/8/p4.jpg'),(9,25,25000,10,'Mug Axix','Mug Dengan Design Gambar Logo Axis',6,'2016-02-15 02:58:48',1,10,'images/asset/produk/9/m4.jpg'),(10,0,1000,14,'ini barang user 1','ini barang user 1',6,'2016-03-06 17:45:06',1,10,'images/asset/produk/kga97en5dimj37dikj5lrqsl02/FireShot Capture 121 - Data Referensi Pendidika_ - http___referensi.data.kemdikbud.go.id_index11.php.png');

/*Table structure for table `su_status_produk` */

DROP TABLE IF EXISTS `su_status_produk`;

CREATE TABLE `su_status_produk` (
  `id_status` int(11) NOT NULL AUTO_INCREMENT,
  `deskripsi` text NOT NULL,
  `status` varchar(50) DEFAULT NULL,
  PRIMARY KEY (`id_status`)
) ENGINE=InnoDB AUTO_INCREMENT=7 DEFAULT CHARSET=latin1;

/*Data for the table `su_status_produk` */

insert  into `su_status_produk`(`id_status`,`deskripsi`,`status`) values (1,'Barang Sedang Kehabisan Stok','Out Of Stok'),(3,'Barang Sedang Sale','Sale'),(4,'Barang Sedang promo','Promo'),(5,'Barang Ini Gratis','Gratis'),(6,'Barang Tidak Dalam Kondisi Apapun','normal');

/*Table structure for table `su_user` */

DROP TABLE IF EXISTS `su_user`;

CREATE TABLE `su_user` (
  `id_user` int(11) NOT NULL AUTO_INCREMENT,
  `user_level` int(11) NOT NULL DEFAULT '0',
  `user_login` varchar(50) NOT NULL,
  `user_password` varchar(50) NOT NULL,
  `nama_d` varchar(50) DEFAULT NULL,
  `nis` int(15) DEFAULT NULL,
  `nama_b` varchar(50) DEFAULT NULL,
  `gambar` varchar(255) DEFAULT 'images/asset/user.png',
  PRIMARY KEY (`id_user`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=latin1;

/*Data for the table `su_user` */

insert  into `su_user`(`id_user`,`user_level`,`user_login`,`user_password`,`nama_d`,`nis`,`nama_b`,`gambar`) values (1,1,'smkn1','smkn1','SMKN 1 Cimahi',131010712,'','images/asset/user/1/10351234_806807042694861_3781369942171371938_n.jpg'),(3,1,'c','d','a',2,'b','images/asset/user.png');

/*Table structure for table `su_wish_ref` */

DROP TABLE IF EXISTS `su_wish_ref`;

CREATE TABLE `su_wish_ref` (
  `id_wish` varchar(50) DEFAULT NULL,
  `id_produk` int(11) DEFAULT NULL,
  `harga` int(11) DEFAULT NULL,
  `banyak` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

/*Data for the table `su_wish_ref` */

insert  into `su_wish_ref`(`id_wish`,`id_produk`,`harga`,`banyak`) values ('9njhbvljer23tqqlr0kfrutjs6',10,1000,1);

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;
