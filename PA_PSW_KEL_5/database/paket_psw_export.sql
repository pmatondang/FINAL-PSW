-- phpMyAdmin SQL Dump
-- version 4.5.1
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: Jun 04, 2020 at 01:53 PM
-- Server version: 10.1.13-MariaDB
-- PHP Version: 5.6.20

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `paket_psw`
--

-- --------------------------------------------------------

--
-- Table structure for table `akun`
--

CREATE TABLE `akun` (
  `id_akun` int(11) NOT NULL,
  `username` varchar(50) NOT NULL,
  `email` varchar(50) NOT NULL,
  `password` varchar(50) NOT NULL,
  `role` int(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `akun`
--

INSERT INTO `akun` (`id_akun`, `username`, `email`, `password`, `role`) VALUES
(1, 'admin', 'proyekpsw2@gmail.com', 'admin', 2),
(2, 'poibe', 'poibematondang30@gmail.com', 'poibe', 1);

-- --------------------------------------------------------

--
-- Table structure for table `data_jadwal`
--

CREATE TABLE `data_jadwal` (
  `id_jadwal` int(20) NOT NULL,
  `nama_paket` varchar(20) DEFAULT NULL,
  `harga` int(20) DEFAULT NULL,
  `jam_berangkat` time DEFAULT NULL,
  `kapasitas` int(20) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `data_jadwal`
--

INSERT INTO `data_jadwal` (`id_jadwal`, `nama_paket`, `harga`, `jam_berangkat`, `kapasitas`) VALUES
(1, 'Bukit Holbung tour', 2000000, '08:00:00', 15),
(2, 'Danau Sidihoni', 950000, '10:00:00', 8),
(3, 'Menara Pandang Tele', 750000, '09:00:00', 10),
(4, 'Air Terjun Sampuran ', 1500000, '07:00:00', 20),
(5, 'Desa Lumban Suhi-suh', 850000, '20:00:00', 10);

-- --------------------------------------------------------

--
-- Table structure for table `paket`
--

CREATE TABLE `paket` (
  `id_paket` int(11) NOT NULL,
  `nama_paket` varchar(100) NOT NULL,
  `deskripsi` varchar(200) NOT NULL,
  `gambar` varchar(200) NOT NULL,
  `harga` int(11) NOT NULL,
  `jadwal` date NOT NULL,
  `jadwal2` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `paket`
--

INSERT INTO `paket` (`id_paket`, `nama_paket`, `deskripsi`, `gambar`, `harga`, `jadwal`, `jadwal2`) VALUES
(1, 'Bukit Holbung tour', 'Bukit Holbung merupakan salah satu destinasi wisata di Samosir yang paling tepat untuk menikmati keindahan alam Danau Toba dari ketinggian. Dari bukit nan asri ini, Toppers bisa melihat aktivitas nela', 'bukit_holbung.jpeg', 2000000, '2020-06-05', '2020-06-10'),
(2, 'Pusuk Buhit tour', 'Daerah perbukitan yang dikenal dengan nama Pusuk Buhit ini dipercaya sebagai tempat asal muasal orang-orang Batak yang ada sekarang.', 'pusuk_buhit2.jpg', 800000, '2020-06-20', '2020-06-22'),
(3, 'Air Terjun Situmurun Binangalom', 'Air Terjun Situmurun Binangalom yang berlokasi di Desa Binangalom, Samosir, keunikan dari wisata air terjun satu ini adalah aliran airnya yang mengalir deras langsung ke Danau Toba. Pemandangan unik y', 'air_terjun_situmurun_binangalom.jpg', 1500000, '2020-07-09', '2020-07-11'),
(4, 'Aek Sipitu Dai', 'Berlokasi di Desa Aek Sipitu Dai, Toppers bisa mengunjungi sebuah mata air alami yang menghasilkan air dengan tujuh rasa berbeda. Asal muasal dari sumber mata air ini sendiri sangat erat dengan legend', 'aek_sipitu_dai.jpg', 1000000, '2020-07-12', '2020-07-14');

-- --------------------------------------------------------

--
-- Table structure for table `pemesanan`
--

CREATE TABLE `pemesanan` (
  `id_pesanan` int(11) NOT NULL,
  `id_tiket` int(11) NOT NULL,
  `nama` varchar(50) NOT NULL,
  `gender` varchar(10) NOT NULL,
  `email` varchar(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `pemesanan`
--

INSERT INTO `pemesanan` (`id_pesanan`, `id_tiket`, `nama`, `gender`, `email`) VALUES
(1, 1, 'Candra', 'Laki-laki', 'candra@gmail.com'),
(2, 3, 'Novita', 'Perempuan', 'novita@gmail.com'),
(3, 4, 'Rani Surianti', 'Perempuan', 'ranisri@gmail.com'),
(4, 5, 'Poibe', 'Perempuan', 'poibematondang30@gmail.com');

-- --------------------------------------------------------

--
-- Table structure for table `pengunjung`
--

CREATE TABLE `pengunjung` (
  `id_pengunjung` int(11) NOT NULL,
  `nama_paket` varchar(50) NOT NULL,
  `jumlah` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `pengunjung`
--

INSERT INTO `pengunjung` (`id_pengunjung`, `nama_paket`, `jumlah`) VALUES
(1, 'Samosir', 50),
(2, 'Bukit Holbung', 30),
(3, 'Aek Sipitu Dai', 35),
(4, 'Tele', 10),
(5, 'Meat', 20),
(7, 'Pusuk Buhit', 45),
(8, 'Air Terjun Situmurun Binangalom', 21),
(9, 'Danau Sidihoni', 13),
(10, 'Air Terjun Sampuran Efrata', 24);

-- --------------------------------------------------------

--
-- Table structure for table `tbl_comment`
--

CREATE TABLE `tbl_comment` (
  `comment_id` int(11) NOT NULL,
  `parent_comment_id` int(11) NOT NULL,
  `comment` varchar(200) NOT NULL,
  `comment_sender_name` varchar(40) NOT NULL,
  `date` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_comment`
--

INSERT INTO `tbl_comment` (`comment_id`, `parent_comment_id`, `comment`, `comment_sender_name`, `date`) VALUES
(1, 0, 'Liburan yang menyenangkan, meskipun waktunya singkat namun momennya dapat dikenang', 'Rani Surianti', '2020-05-25 03:32:54'),
(2, 1, 'Benar sekali, meskipun singkat tetap terasa nikmat ditambah dengan harga yang terjangkau, pokoknya terbaik...', 'Novita', '2020-05-25 03:34:19');

-- --------------------------------------------------------

--
-- Table structure for table `tiket`
--

CREATE TABLE `tiket` (
  `id_tiket` int(11) NOT NULL,
  `stok` int(11) NOT NULL,
  `harga` int(11) NOT NULL,
  `nama_paket` varchar(50) NOT NULL,
  `jadwal` date NOT NULL,
  `jadwal2` date NOT NULL,
  `gambar` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tiket`
--

INSERT INTO `tiket` (`id_tiket`, `stok`, `harga`, `nama_paket`, `jadwal`, `jadwal2`, `gambar`) VALUES
(1, 10, 200000, 'Bukit Holbung tour', '2020-06-05', '2020-06-10', 'bukit_holbung.jpeg'),
(2, 20, 800000, 'Pusuk Buhit tour', '2020-06-20', '2020-06-22', 'pusuk_buhit2.jpg'),
(3, 12, 1500000, 'Air Terjun Situmurun Binangalom', '2020-07-09', '2020-06-11', 'air_terjun_situmurun_binangalom.jpg'),
(4, 5, 1000000, 'Aek Sipitu Dai', '2020-07-12', '2020-07-14', 'aek_sipitu_dai.jpg'),
(5, 15, 850000, 'Danau Sidihoni', '2020-07-16', '2020-07-18', 'danau_sidihoni.jpg'),
(6, 6, 1500000, 'Air Terjun Sampuran Efrata', '2020-07-20', '2020-07-22', 'air_terjun_sampuran_efrata.jpg');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `akun`
--
ALTER TABLE `akun`
  ADD PRIMARY KEY (`id_akun`);

--
-- Indexes for table `data_jadwal`
--
ALTER TABLE `data_jadwal`
  ADD PRIMARY KEY (`id_jadwal`);

--
-- Indexes for table `paket`
--
ALTER TABLE `paket`
  ADD PRIMARY KEY (`id_paket`);

--
-- Indexes for table `pemesanan`
--
ALTER TABLE `pemesanan`
  ADD PRIMARY KEY (`id_pesanan`),
  ADD KEY `id_tiket` (`id_tiket`);

--
-- Indexes for table `pengunjung`
--
ALTER TABLE `pengunjung`
  ADD PRIMARY KEY (`id_pengunjung`);

--
-- Indexes for table `tbl_comment`
--
ALTER TABLE `tbl_comment`
  ADD PRIMARY KEY (`comment_id`);

--
-- Indexes for table `tiket`
--
ALTER TABLE `tiket`
  ADD PRIMARY KEY (`id_tiket`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `akun`
--
ALTER TABLE `akun`
  MODIFY `id_akun` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT for table `data_jadwal`
--
ALTER TABLE `data_jadwal`
  MODIFY `id_jadwal` int(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;
--
-- AUTO_INCREMENT for table `paket`
--
ALTER TABLE `paket`
  MODIFY `id_paket` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
--
-- AUTO_INCREMENT for table `pemesanan`
--
ALTER TABLE `pemesanan`
  MODIFY `id_pesanan` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
--
-- AUTO_INCREMENT for table `pengunjung`
--
ALTER TABLE `pengunjung`
  MODIFY `id_pengunjung` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;
--
-- AUTO_INCREMENT for table `tbl_comment`
--
ALTER TABLE `tbl_comment`
  MODIFY `comment_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
--
-- AUTO_INCREMENT for table `tiket`
--
ALTER TABLE `tiket`
  MODIFY `id_tiket` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;
--
-- Constraints for dumped tables
--

--
-- Constraints for table `pemesanan`
--
ALTER TABLE `pemesanan`
  ADD CONSTRAINT `pemesanan_ibfk_1` FOREIGN KEY (`id_tiket`) REFERENCES `tiket` (`id_tiket`);

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
