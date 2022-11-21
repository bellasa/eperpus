-- phpMyAdmin SQL Dump
-- version 5.0.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Nov 21, 2022 at 05:35 AM
-- Server version: 10.4.13-MariaDB
-- PHP Version: 7.4.8

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `perpus`
--

-- --------------------------------------------------------

--
-- Table structure for table `absen`
--

CREATE TABLE `absen` (
  `nis` int(4) NOT NULL,
  `tanggal` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `absen`
--

INSERT INTO `absen` (`nis`, `tanggal`) VALUES
(1001, '2020-03-09'),
(1002, '2020-03-09'),
(1003, '2020-03-09'),
(1001, '2022-11-12'),
(1002, '2022-11-12');

-- --------------------------------------------------------

--
-- Table structure for table `buku`
--

CREATE TABLE `buku` (
  `id_buku` int(11) NOT NULL,
  `no_buku` text NOT NULL,
  `judul` text NOT NULL,
  `tahun_terbit` int(4) NOT NULL,
  `penulis` text NOT NULL,
  `penerbit` text NOT NULL,
  `jml_hal` int(3) NOT NULL,
  `jml_buku` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `buku`
--

INSERT INTO `buku` (`id_buku`, `no_buku`, `judul`, `tahun_terbit`, `penulis`, `penerbit`, `jml_hal`, `jml_buku`) VALUES
(6, 'asb-11-in-8888', 'Pengetahuan Umum', 2011, 'Andrean', 'CV. Mulia', 114, 12),
(7, '78912-99999', 'Buku Matematika Kelas 12', 2015, 'Team MTK', 'CV. Percetakaan', 245, 35),
(8, 'abab-1111', 'Buku Fisika Kelas 10', 2009, 'Ahmad D.', 'CV. ABADI', 178, 40);

-- --------------------------------------------------------

--
-- Table structure for table `pinjam`
--

CREATE TABLE `pinjam` (
  `id` int(11) NOT NULL,
  `id_buku` int(11) NOT NULL,
  `nis` int(4) NOT NULL,
  `tgl_pinjam` date NOT NULL,
  `tgl_kembali` date NOT NULL,
  `status` varchar(5) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `pinjam`
--

INSERT INTO `pinjam` (`id`, `id_buku`, `nis`, `tgl_pinjam`, `tgl_kembali`, `status`) VALUES
(16, 8, 1002, '2020-03-09', '2020-03-14', 'sudah'),
(17, 8, 1002, '2020-03-09', '2020-03-14', 'sudah'),
(18, 8, 1003, '2020-03-09', '2020-03-14', 'sudah'),
(19, 6, 1001, '2022-11-12', '2022-11-17', 'belum');

-- --------------------------------------------------------

--
-- Table structure for table `siswa`
--

CREATE TABLE `siswa` (
  `nis` int(4) NOT NULL,
  `nama` text NOT NULL,
  `password` text NOT NULL,
  `kelas` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `siswa`
--

INSERT INTO `siswa` (`nis`, `nama`, `password`, `kelas`) VALUES
(1001, 'Siswa 1', '*1001', '12 TKJ 2'),
(1002, 'Siswa 2', '*1002', '10 TEI 1'),
(1003, 'Siswa 3', '*1003', '11 TBSM 3'),
(1004, 'Siswa 4', '*1004', '11 TAV 1'),
(1005, 'Siswa 5', '*1005', '12 TITL 3'),
(1006, 'Siswa 6', '*1006', '10 TKJ 1'),
(1007, 'Siswa 7', '*1007', '13 TKJ 2'),
(1008, 'Siswa 8', '*1008', '11 TEI 1'),
(1009, 'Siswa 9', '*1009', '12 TBSM 3'),
(1010, 'Siswa 10', '*1010', '12 TAV 1');

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE `user` (
  `id` int(11) NOT NULL,
  `nama` text NOT NULL,
  `password` text NOT NULL,
  `jabatan` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`id`, `nama`, `password`, `jabatan`) VALUES
(3, 'Saya Admin', '123', 'Administrator'),
(4, 'Saya Petugas 1', '123', 'Petugas'),
(5, 'Saya Petugas 2', '123', 'Petugas');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `absen`
--
ALTER TABLE `absen`
  ADD KEY `nis` (`nis`);

--
-- Indexes for table `buku`
--
ALTER TABLE `buku`
  ADD PRIMARY KEY (`id_buku`);

--
-- Indexes for table `pinjam`
--
ALTER TABLE `pinjam`
  ADD PRIMARY KEY (`id`),
  ADD KEY `id_buku` (`id_buku`),
  ADD KEY `nis` (`nis`);

--
-- Indexes for table `siswa`
--
ALTER TABLE `siswa`
  ADD PRIMARY KEY (`nis`);

--
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `buku`
--
ALTER TABLE `buku`
  MODIFY `id_buku` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `pinjam`
--
ALTER TABLE `pinjam`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=20;

--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `absen`
--
ALTER TABLE `absen`
  ADD CONSTRAINT `absen_ibfk_1` FOREIGN KEY (`nis`) REFERENCES `siswa` (`nis`);

--
-- Constraints for table `pinjam`
--
ALTER TABLE `pinjam`
  ADD CONSTRAINT `pinjam_ibfk_1` FOREIGN KEY (`id_buku`) REFERENCES `buku` (`id_buku`),
  ADD CONSTRAINT `pinjam_ibfk_2` FOREIGN KEY (`nis`) REFERENCES `siswa` (`nis`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
