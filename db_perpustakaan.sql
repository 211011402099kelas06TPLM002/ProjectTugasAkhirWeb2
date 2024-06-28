-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jun 28, 2024 at 03:44 PM
-- Server version: 10.4.27-MariaDB
-- PHP Version: 8.0.25

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `db_perpustakaan`
--

-- --------------------------------------------------------

--
-- Table structure for table `tb_anggota`
--

CREATE TABLE `tb_anggota` (
  `nis` varchar(255) NOT NULL,
  `nama` varchar(200) NOT NULL,
  `tempat_lahir` varchar(100) NOT NULL,
  `tgl_lahir` date NOT NULL,
  `jk` enum('L','P') NOT NULL,
  `kelas` varchar(255) NOT NULL,
  `tgl_input` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=MyISAM DEFAULT CHARSET=latin1 COLLATE=latin1_general_ci;

--
-- Dumping data for table `tb_anggota`
--

INSERT INTO `tb_anggota` (`nis`, `nama`, `tempat_lahir`, `tgl_lahir`, `jk`, `kelas`, `tgl_input`) VALUES
('211011402099', 'Hakim Ageng Maulana', 'Tangerang Selatan', '2003-05-04', 'L', '06TPLM002', '2024-06-27 16:32:41'),
('211011401549', 'Rajashira Tan Philiang', 'Cidokom', '2002-05-12', 'L', '06TPLM002', '2024-06-27 16:50:15'),
('211011400263', 'Muhammad Khoirul Isya', 'Pluto', '2000-04-12', 'L', '06TPLM005', '2024-06-27 16:52:15'),
('211011402000', 'Mars', 'Mars', '1000-12-01', 'P', '06TPLM001', '2024-06-27 16:54:11');

-- --------------------------------------------------------

--
-- Table structure for table `tb_buku`
--

CREATE TABLE `tb_buku` (
  `id_buku` int(11) NOT NULL,
  `judul` varchar(200) NOT NULL,
  `pengarang` varchar(100) NOT NULL,
  `penerbit` varchar(100) NOT NULL,
  `tahun_terbit` varchar(4) NOT NULL,
  `isbn` varchar(25) NOT NULL,
  `jumlah_buku` int(11) NOT NULL,
  `lokasi` enum('Rak 1','Rak 2','Rak 3') NOT NULL,
  `tgl_input` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=MyISAM DEFAULT CHARSET=latin1 COLLATE=latin1_general_ci;

--
-- Dumping data for table `tb_buku`
--

INSERT INTO `tb_buku` (`id_buku`, `judul`, `pengarang`, `penerbit`, `tahun_terbit`, `isbn`, `jumlah_buku`, `lokasi`, `tgl_input`) VALUES
(38, 'Pengembangan aplikasi Web', 'Noor Ifada', 'Media Nusa Creative', '2008', '978-602-462-331-9', 200, 'Rak 3', '2024-06-27 07:36:07'),
(37, 'Pengembangan sistem pelaporan penyuluhan online berbasis web', 'Dahlan Abdullah, Reza Dian Rasyada', 'Sefa Bumi Persada', '2002', '978-623-6983-08-9', 1000, 'Rak 3', '2024-06-28 12:59:21'),
(36, 'Pengembangan web pembelajaran statistik bisnis', 'tim penyusun, Agus Sukoco, Santrianingrum Soebandhi', 'Narotama University Press', '1998', '978-602-14153-4-4', 500, 'Rak 2', '2024-06-28 13:13:37'),
(39, 'Pengembangan aplikasi web menggunakan codeigniter : konsep dan implementasi', 'Moch Kautsar Sophan', 'Deepublish', '2010', '978-602-401-608-1', 49, 'Rak 2', '2024-06-28 13:37:50'),
(40, 'Pengembangan aplikasi e-commerce berbasis web', 'Ahmad Hanafi', 'Deepublish', '1995', '978-623-02-0277-3', 100, 'Rak 3', '2024-06-27 07:44:31'),
(41, 'Pengembangan aplikasi web berbasis PHP dan sqlite menggunakan replit cloud-based service', 'Noor Ifada, Bihubbil Choir Aidifta', 'Deepublish', '1995', '978-623-02-7214-1', 50, 'Rak 3', '2024-06-27 07:44:58'),
(42, 'Pengembangan koleksi perpustakaan berbasis local content', 'Sudjono ; editor, Wahyu Kuncoro', 'Alpha', '2012', '978-602-6681-38-6', 20, 'Rak 1', '2024-06-28 13:30:35'),
(43, 'Pengembangan perpustakaan perguruan tinggi dan pembentukan etika pustakawan', 'Dra. Dedeh Ayu Firna Prihatini MS.T ; editor, Dr. Rizal, SP.MP.', 'Elite Media Kreazi (Elmarkazi)', '2008', '978-623-331-432-9', 52, 'Rak 2', '2024-06-27 07:47:22'),
(44, 'Membuat web dengan framework Codeignter : studi kasus sistem informasi perpustakaan', 'Gunawan Budi Sulistyo, Pudji Widodo', 'Graha Ilmu', '2004', '978-623-228-403-6', 33, 'Rak 2', '2024-06-28 13:30:33'),
(45, 'Web programing : membangun aplikasi perpustakaan dengan Framework Codeigniter', 'Maruloh, Nining Suryani, Evy Priyanti', 'Graha Ilmu', '2018', '978-623-228-220-9', 278, 'Rak 1', '2024-06-28 13:14:12'),
(46, 'Sistem informasi perpustakaan berbasis web menggunakan Framework Codeigniter', 'Ayu Pariyandani, Eka Pirdia Wanti dan Nurani El Furqani ; editor, Muhathir', 'Station It', '2020', '978-623-96504-3-8', 487, 'Rak 1', '2024-06-28 13:01:24');

-- --------------------------------------------------------

--
-- Table structure for table `tb_kembali`
--

CREATE TABLE `tb_kembali` (
  `id_kembali` int(5) NOT NULL,
  `nis` varchar(255) NOT NULL,
  `nama` varchar(44) NOT NULL,
  `judul` varchar(55) NOT NULL,
  `tgl_pinjam` varchar(30) NOT NULL,
  `tgl_kembali` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=MyISAM DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data for table `tb_kembali`
--

INSERT INTO `tb_kembali` (`id_kembali`, `nis`, `nama`, `judul`, `tgl_pinjam`, `tgl_kembali`) VALUES
(80, '211011400263', 'Muhammad Khoirul Isya', 'Membuat web dengan framework Codeignter : studi kasus s', '28-06-2024', '2024-06-28 13:30:33'),
(78, '211011400263', 'Muhammad Khoirul Isya', 'Pengembangan web pembelajaran statistik bisnis', '28-06-2024', '2024-06-28 13:13:37'),
(79, '211011402099', 'Hakim Ageng Maulana', 'Web programing : membangun aplikasi perpustakaan dengan', '28-06-2024', '2024-06-28 13:14:12'),
(81, '211011401549', 'Rajashira Tan Philiang', 'Pengembangan koleksi perpustakaan berbasis local conten', '28-06-2024', '2024-06-28 13:30:35');

-- --------------------------------------------------------

--
-- Table structure for table `tb_transaksi`
--

CREATE TABLE `tb_transaksi` (
  `id` int(11) NOT NULL,
  `id_buku` int(11) NOT NULL,
  `judul` varchar(200) NOT NULL,
  `nis` varchar(255) NOT NULL,
  `nama` varchar(200) NOT NULL,
  `tgl_pinjam` varchar(30) NOT NULL,
  `tgl_kembali` varchar(30) NOT NULL,
  `status` varchar(100) NOT NULL,
  `tgl_input` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=MyISAM DEFAULT CHARSET=latin1 COLLATE=latin1_general_ci;

--
-- Dumping data for table `tb_transaksi`
--

INSERT INTO `tb_transaksi` (`id`, `id_buku`, `judul`, `nis`, `nama`, `tgl_pinjam`, `tgl_kembali`, `status`, `tgl_input`) VALUES
(461, 39, 'Pengembangan aplikasi web menggunakan codeigniter : konsep dan implementasi', '211011402099', 'Hakim Ageng Maulana', '28-06-2024', '05-07-2024', 'Pinjam', '2024-06-28 13:37:50');

-- --------------------------------------------------------

--
-- Table structure for table `tb_user`
--

CREATE TABLE `tb_user` (
  `id` int(11) NOT NULL,
  `username` varchar(100) NOT NULL,
  `password` varchar(100) NOT NULL,
  `nama` varchar(200) NOT NULL,
  `level` enum('admin','anggota','perpustakawan') NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1 COLLATE=latin1_general_ci;

--
-- Dumping data for table `tb_user`
--

INSERT INTO `tb_user` (`id`, `username`, `password`, `nama`, `level`) VALUES
(1, 'Hakim', 'hakim123', 'Hakim Ageng Maulana', 'anggota'),
(2, 'admin', 'admin', 'admin', 'admin'),
(3, 'Nurhasanah', 'Nurhasanah123', 'Nurhasanah', 'perpustakawan');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `tb_anggota`
--
ALTER TABLE `tb_anggota`
  ADD PRIMARY KEY (`nis`);

--
-- Indexes for table `tb_buku`
--
ALTER TABLE `tb_buku`
  ADD PRIMARY KEY (`id_buku`),
  ADD UNIQUE KEY `isbn` (`isbn`);

--
-- Indexes for table `tb_kembali`
--
ALTER TABLE `tb_kembali`
  ADD PRIMARY KEY (`id_kembali`);

--
-- Indexes for table `tb_transaksi`
--
ALTER TABLE `tb_transaksi`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tb_user`
--
ALTER TABLE `tb_user`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `tb_buku`
--
ALTER TABLE `tb_buku`
  MODIFY `id_buku` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=47;

--
-- AUTO_INCREMENT for table `tb_kembali`
--
ALTER TABLE `tb_kembali`
  MODIFY `id_kembali` int(5) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=82;

--
-- AUTO_INCREMENT for table `tb_transaksi`
--
ALTER TABLE `tb_transaksi`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=462;

--
-- AUTO_INCREMENT for table `tb_user`
--
ALTER TABLE `tb_user`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
