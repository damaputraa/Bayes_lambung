-- phpMyAdmin SQL Dump
-- version 4.2.11
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: Jun 06, 2017 at 08:34 AM
-- Server version: 5.6.21
-- PHP Version: 5.6.3

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `bayes_lambung`
--

-- --------------------------------------------------------

--
-- Table structure for table `basis_aturan`
--

CREATE TABLE IF NOT EXISTS `basis_aturan` (
  `id_gejala` varchar(10) NOT NULL DEFAULT '',
  `pertanyaan` varchar(300) DEFAULT NULL,
  `fakta_ya` varchar(150) DEFAULT NULL,
  `fakta_tidak` varchar(150) DEFAULT NULL,
  `rute` varchar(10) NOT NULL,
  `id_penyakit` varchar(10) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `basis_aturan`
--

INSERT INTO `basis_aturan` (`id_gejala`, `pertanyaan`, `fakta_ya`, `fakta_tidak`, `rute`, `id_penyakit`) VALUES
('g01', 'Apakah ada rasa panas di dada ?', 'Rasa panas di dada', 'Tidak ada rasa panas di dada', 'g02', 'p1'),
('g02', 'Apakah ada rasa sakit waktu menelan ?', 'Rasa sakit waktu menelan', 'Tidak ada rasa sakit waktu menelan', 'g03', 'p1'),
('g03', 'Apakah perut gembung ?', 'Perut gembung', 'Tidak mengalami perut gembung', 'g04', 'p1'),
('g04', 'Apakah mengalami nyeri pada ulu hati ?', 'Mengalami nyeri pada ulu hati', 'Tidak mengalami nyeri pada ulu hati', 'g05', 'p1'),
('g05', 'Apakah sering merasa lapar ?', 'Sering merasa lapar', 'Tidak sering merasa lapar', 'g06', 'p1'),
('g06', 'Apakah mengalami mual dan muntah ?', 'Mual dan muntah', 'Tidak ada mual dan muntah', 'g07', 'p1'),
('g07', 'Apakah terasa nyeri dibelakang tulang dada ?', 'Nyeri dibelakang tulang dada', 'Tidak mengalami nyeri dibelakang tulang dada', 'g08', 'p5'),
('g08', 'Apakah sakit atau nyeri pada perut ?', 'Sakit atau nyeri pada perut', 'Tidak merasa sakit atau nyeri pada perut', 'final', 'p5');

-- --------------------------------------------------------

--
-- Table structure for table `daftar_admin`
--

CREATE TABLE IF NOT EXISTS `daftar_admin` (
  `username` varchar(30) NOT NULL,
  `password` varchar(30) NOT NULL,
  `nama_lengkap` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `daftar_admin`
--

INSERT INTO `daftar_admin` (`username`, `password`, `nama_lengkap`) VALUES
('admin', 'admin', 'Administrator');

-- --------------------------------------------------------

--
-- Table structure for table `daftar_gejala`
--

CREATE TABLE IF NOT EXISTS `daftar_gejala` (
  `id_gejala` varchar(10) NOT NULL DEFAULT '',
  `gejala` varchar(150) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `daftar_gejala`
--

INSERT INTO `daftar_gejala` (`id_gejala`, `gejala`) VALUES
('g01', 'Rasa panas di dada'),
('g02', 'Rasa sakit waktu menelan'),
('g03', 'Perut gembung'),
('g04', 'Mengalami nyeri pada ulu hati'),
('g05', 'Sering merasa lapar'),
('g06', 'Mual dan muntah'),
('g07', 'Nyeri dibelakang tulang dada'),
('g08', 'Sakit atau nyeri pada perut');

-- --------------------------------------------------------

--
-- Table structure for table `daftar_penyakit`
--

CREATE TABLE IF NOT EXISTS `daftar_penyakit` (
  `id_penyakit` varchar(10) NOT NULL DEFAULT '',
  `nama_penyakit` varchar(50) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `daftar_penyakit`
--

INSERT INTO `daftar_penyakit` (`id_penyakit`, `nama_penyakit`) VALUES
('p1', 'Gastritis (Maag) Akut'),
('p2', 'Gastritis (Maag) Kronis'),
('p3', 'Dispepsia'),
('p4', 'Gastroesophageal Reflux Disease'),
('p5', 'Kanker Lambung');

-- --------------------------------------------------------

--
-- Table structure for table `daftar_solusi`
--

CREATE TABLE IF NOT EXISTS `daftar_solusi` (
  `id_solusi` varchar(10) NOT NULL,
  `solusi` varchar(300) DEFAULT NULL,
  `id_penyakit` varchar(10) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `daftar_solusi`
--

INSERT INTO `daftar_solusi` (`id_solusi`, `solusi`, `id_penyakit`) VALUES
('s0', 'Anda tidak terdeteksi menderita penyakit lambung', 'p0'),
('s1', 'Dapat menggunakan obat-obatan asma inhaler nebulizer atau suntikan', 'p1'),
('s10', 'Dapat diberikan obat Montelukast (Singulair) dan obat antagonis reseptor leukotrin yang dapat mencegah leukotrin agar tidak dapat bekerja secara normal.', 'p5'),
('s2', 'Hindari penyebab asma, minum obat  asma saat terasa sesak, olahraga, dan jangan terlalu lelah', 'p1'),
('s3', 'Hindari penyebab asma, minum obat asma jika kambuh, olah raga, hidari stres, dan jangan terlalu lelah', 'p1'),
('s4', 'Hindari penyebab alergi misalnya debu, tepung sari, makanan tertentu, terkadang sembuh sendiri tanpa obat, desensitiasi', 'p3'),
('s5', 'Obat penyebab infeksi misalnya dengan antibiotik, dan minum obat asma', 'p2'),
('s6', 'Dapat diberikan nebulizer, beri oksigen, dan suntik obat-obatan asma.', 'p1'),
('s7', 'Dapat diberikan nebulizer, beri oksigen, dan obat-obatan oral.', 'p1'),
('s8', 'Dapat diberikan nebulizer dan obat-obatan oral.', 'p4'),
('s9', 'Ubahlah kondisi kerja. Hal ini dapat berupa dipindahkan kebagian lain.', 'p5');

-- --------------------------------------------------------

--
-- Table structure for table `daftar_user`
--

CREATE TABLE IF NOT EXISTS `daftar_user` (
  `id_user` int(15) NOT NULL,
  `nama` varchar(35) DEFAULT NULL,
  `password` varchar(15) DEFAULT NULL,
  `username` varchar(15) DEFAULT NULL,
  `usia` varchar(5) DEFAULT NULL,
  `tgl_diagnosa` date DEFAULT NULL,
  `keterangan` varchar(35) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `daftar_user`
--

INSERT INTO `daftar_user` (`id_user`, `nama`, `password`, `username`, `usia`, `tgl_diagnosa`, `keterangan`) VALUES
(1, 'naufal adyan asyrah', '123', 'naufal', '1', '2017-06-06', 'GASTRITIS (MAAG) AKUT'),
(99, 'jojon', '123', 'jojon', '40', '2017-06-04', '-');

-- --------------------------------------------------------

--
-- Table structure for table `detail_konsul`
--

CREATE TABLE IF NOT EXISTS `detail_konsul` (
`id` int(10) NOT NULL,
  `iduser` varchar(10) NOT NULL,
  `idgejala` varchar(10) NOT NULL,
  `rand` varchar(10) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `detail_konsul`
--

INSERT INTO `detail_konsul` (`id`, `iduser`, `idgejala`, `rand`) VALUES
(1, '1', 'g02', '70'),
(2, '1', 'g03', '70'),
(3, '1', 'g04', '70');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `basis_aturan`
--
ALTER TABLE `basis_aturan`
 ADD PRIMARY KEY (`id_gejala`);

--
-- Indexes for table `daftar_admin`
--
ALTER TABLE `daftar_admin`
 ADD PRIMARY KEY (`username`);

--
-- Indexes for table `daftar_gejala`
--
ALTER TABLE `daftar_gejala`
 ADD PRIMARY KEY (`id_gejala`);

--
-- Indexes for table `daftar_penyakit`
--
ALTER TABLE `daftar_penyakit`
 ADD PRIMARY KEY (`id_penyakit`);

--
-- Indexes for table `daftar_solusi`
--
ALTER TABLE `daftar_solusi`
 ADD PRIMARY KEY (`id_solusi`);

--
-- Indexes for table `daftar_user`
--
ALTER TABLE `daftar_user`
 ADD PRIMARY KEY (`id_user`), ADD KEY `id_user` (`id_user`);

--
-- Indexes for table `detail_konsul`
--
ALTER TABLE `detail_konsul`
 ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `detail_konsul`
--
ALTER TABLE `detail_konsul`
MODIFY `id` int(10) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=4;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
