/*
SQLyog - Free MySQL GUI v5.0
Host - 5.5.5-10.1.13-MariaDB : Database - proyek_psw
*********************************************************************
Server version : 5.5.5-10.1.13-MariaDB
*/
/*drop database paket_psw;*/
CREATE DATABASE IF NOT EXISTS `paket_psw`;

USE `paket_psw`;

/*Table structure for table `akun` */
DROP TABLE IF EXISTS `akun`;

CREATE TABLE `akun` (
  `id_akun` INT(11) NOT NULL AUTO_INCREMENT,
  `username` VARCHAR(50) NOT NULL,
  `email` VARCHAR(50) NOT NULL,
  `password` VARCHAR(50) NOT NULL,
  `role` INT(1) NOT NULL,
  PRIMARY KEY (`id_akun`)
) ENGINE=INNODB DEFAULT CHARSET=latin1;

/*Data for the table `akun` */
INSERT INTO `akun` (`id_akun`, `username`, `email`, `password`, `role`) VALUES
(1, 'admin', 'proyekpsw2@gmail.com', 'admin', 2),
(2, 'poibe', 'poibematondang30@gmail.com', 'poibe', 1);


/*Table structure for table `paket` */
DROP TABLE IF EXISTS `paket`;

CREATE TABLE `paket` (
  `id_paket` INT(11) NOT NULL AUTO_INCREMENT,
  `nama_paket` VARCHAR(100) NOT NULL,
  `deskripsi` VARCHAR(200) NOT NULL,
  `gambar` VARCHAR(200) NOT NULL,
  `harga` INT(11) NOT NULL,
  `jadwal` DATE NOT NULL,
  `jadwal2` DATE NOT NULL,
  PRIMARY KEY (`id_paket`)
) ENGINE=INNODB DEFAULT CHARSET=latin1;

/*Data for the table `paket` */
INSERT INTO `paket` (`id_paket`, `nama_paket`, `deskripsi`, `gambar`, `harga`, `jadwal`, `jadwal2`) VALUES
(1, 'Bukit Holbung tour', 'Bukit Holbung merupakan salah satu destinasi wisata di Samosir yang paling tepat untuk menikmati keindahan alam Danau Toba dari ketinggian. Dari bukit nan asri ini, Toppers bisa melihat aktivitas nelayan yang tengah mencari ikan di perairan Danau Toba ataupun eksotisme bentang alam di Samosir dan sekitarnya.', 'bukit_holbung.jpeg', 2000000, '2020-06-05', '2020-06-10'),
(2, 'Pusuk Buhit tour', 'Daerah perbukitan yang dikenal dengan nama Pusuk Buhit ini dipercaya sebagai tempat asal muasal orang-orang Batak yang ada sekarang.', 'pusuk_buhit2.jpg', 800000, '2020-06-20', '2020-06-22'),
(3, 'Air Terjun Situmurun Binangalom', 'Air Terjun Situmurun Binangalom yang berlokasi di Desa Binangalom, Samosir, keunikan dari wisata air terjun satu ini adalah aliran airnya yang mengalir deras langsung ke Danau Toba. Pemandangan unik yang jarang ditawarkan oleh wisata-wisata air terjun lainnya.', 'air_terjun_situmurun_binangalom.jpg', 1500000, '2020-07-09', '2020-07-11'),
(4, 'Aek Sipitu Dai', 'Berlokasi di Desa Aek Sipitu Dai, Toppers bisa mengunjungi sebuah mata air alami yang menghasilkan air dengan tujuh rasa berbeda. Asal muasal dari sumber mata air ini sendiri sangat erat dengan legenda masyarakat lokal.', 'aek_sipitu_dai.jpg', 1000000, '2020-07-12', '2020-07-14');


/*Table structure for table `tiket` */
DROP TABLE IF EXISTS `data_jadwal`;

CREATE TABLE `data_jadwal` (
  `id_jadwal` INT(20) NOT NULL AUTO_INCREMENT,
  `nama_paket` VARCHAR(20) DEFAULT NULL,
  `harga` INT(20) DEFAULT NULL,
  `jam_berangkat` TIME DEFAULT NULL,
  `kapasitas` INT(20) DEFAULT NULL,
  PRIMARY KEY (`id_jadwal`)
) ENGINE=INNODB DEFAULT CHARSET=latin1;

/*Data for the table `data_jadwal` */
INSERT INTO `data_jadwal` (`id_jadwal`, `nama_paket`, `harga`, `jam_berangkat`, `kapasitas`) VALUES
(1, 'Bukit Holbung tour', 2000000, '08:00:00', 15),
(2, 'Danau Sidihoni', 950000, '10:00:00', 8),
(3, 'Menara Pandang Tele', 750000, '09:00:00', 10),
(4, 'Air Terjun Sampuran Efrata', 1500000, '07:00:00', 20),
(5, 'Desa Lumban Suhi-suhi', 850000, '20:00:00', 10);


/*Table structure for table `tiket` */
DROP TABLE IF EXISTS `tiket`;

CREATE TABLE `tiket` (
  `id_tiket` INT(11) NOT NULL AUTO_INCREMENT PRIMARY KEY,
  `stok` INT(11) NOT NULL,
  `harga` INT(11) NOT NULL,
  `nama_paket` VARCHAR(50) NOT NULL,
  `jadwal` DATE NOT NULL,
  `jadwal2` DATE NOT NULL,
  `gambar` VARCHAR(100) NOT NULL
)ENGINE=INNODB DEFAULT CHARSET=latin1;

/*Data for the table `tiket` */
INSERT INTO `tiket` (`id_tiket`, `stok`, `harga`, `nama_paket`, `jadwal`, `jadwal2`, `gambar`) VALUES
(1, 10, 200000, 'Bukit Holbung tour', '2020-06-05', '2020-06-10', 'bukit_holbung.jpeg'),
(2, 20, 800000, 'Pusuk Buhit tour', '2020-06-20', '2020-06-22', 'pusuk_buhit2.jpg'),
(3, 12, 1500000, 'Air Terjun Situmurun Binangalom', '2020-07-09', '2020-06-11', 'air_terjun_situmurun_binangalom.jpg'),
(4, 5, 1000000, 'Aek Sipitu Dai', '2020-07-12', '2020-07-14', 'aek_sipitu_dai.jpg'),
(5, 15, 850000, 'Danau Sidihoni', '2020-07-16', '2020-07-18', 'danau_sidihoni.jpg'),
(6, 6, 1500000, 'Air Terjun Sampuran Efrata', '2020-07-20', '2020-07-22', 'air_terjun_sampuran_efrata.jpg');v


/*Table structure for table `testimoni` */
DROP TABLE IF EXISTS `tbl_comment`;

CREATE TABLE IF NOT EXISTS `tbl_comment` (
  `comment_id` INT(11) NOT NULL,
  `parent_comment_id` INT(11) NOT NULL,
  `comment` VARCHAR(200) NOT NULL,
  `comment_sender_name` VARCHAR(40) NOT NULL,
  `date` TIMESTAMP NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=INNODB DEFAULT CHARSET=latin1;

ALTER TABLE `tbl_comment`
  ADD PRIMARY KEY (`comment_id`);

ALTER TABLE `tbl_comment`
  MODIFY `comment_id` INT(11) NOT NULL AUTO_INCREMENT;
/*Data for the table `tiket` */

INSERT INTO `tbl_comment` (`comment_id`, `parent_comment_id`, `comment`, `comment_sender_name`, `date`) VALUES
(1, 0, 'Liburan yang menyenangkan, meskipun waktunya singkat namun momennya dapat dikenang', 'Rani Surianti', '2020-05-25 10:32:54'),
(2, 1, 'Benar sekali, meskipun singkat tetap terasa nikmat ditambah dengan harga yang terjangkau, pokoknya terbaik...', 'Novita', '2020-05-25 10:34:19');


/*Table structure for table `pengunjung` */
DROP TABLE IF EXISTS `pengunjung`;

CREATE TABLE `pengunjung` (
  `id_pengunjung` INT(11) NOT NULL AUTO_INCREMENT PRIMARY KEY,
  `nama_paket` VARCHAR(50) NOT NULL,
  `jumlah` INT(11) NOT NULL
)ENGINE=INNODB DEFAULT CHARSET=latin1;

/*Data for the table `pengunjung` */
INSERT  INTO `pengunjung`(`id_pengunjung`,`nama_paket`,`jumlah`) VALUES 
(1,'Samosir', 50),
(2,'Bukit Holbung',30),
(3,'Aek Sipitu Dai',35),
(4,'Tele',10),
(5,'Meat',20),
(7,'Pusuk Buhit',45),
(8,'Air Terjun Situmurun Binangalom',21),
(9,'Danau Sidihoni',13),
(10,'Air Terjun Sampuran Efrata',24);


/*Table structure for table `pemesanan` */
DROP TABLE IF EXISTS `pemesanan`;

CREATE TABLE `pemesanan` (
  `id_pesanan` INT(11) NOT NULL AUTO_INCREMENT PRIMARY KEY,
  `id_tiket` INT(11) NOT NULL,
  `nama` VARCHAR(50) NOT NULL,
  `gender` VARCHAR(10) NOT NULL,
  `email` VARCHAR(30) NOT NULL,
  FOREIGN KEY (id_tiket) REFERENCES tiket(id_tiket)
);

/*Data for the table `pengunjung` */
INSERT INTO `pemesanan` (`id_pesanan`, `id_tiket`, `nama`, `gender`, `email`) VALUES
(1, 1, 'Candra', 'Laki-laki', 'candra@gmail.com'),
(2, 3, 'Novita', 'Perempuan', 'novita@gmail.com'),
(3, 4, 'Rani Surianti', 'Perempuan', 'ranisri@gmail.com'),
(4, 5, 'Poibe', 'Perempuan', 'poibematondang30@gmail.com');


