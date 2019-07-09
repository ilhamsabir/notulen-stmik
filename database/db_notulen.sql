-- phpMyAdmin SQL Dump
-- version 4.8.4
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jul 09, 2019 at 12:06 PM
-- Server version: 10.1.37-MariaDB
-- PHP Version: 7.3.1

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `db_notulen`
--

-- --------------------------------------------------------

--
-- Table structure for table `acara`
--

CREATE TABLE `acara` (
  `kode` varchar(15) NOT NULL,
  `id_notulis` int(20) DEFAULT NULL,
  `id_pembuat` int(20) NOT NULL,
  `nomor_surat` varchar(150) DEFAULT NULL,
  `pemimpin` varchar(100) DEFAULT NULL,
  `penanggung_jawab` varchar(300) DEFAULT NULL,
  `pengaju` varchar(100) NOT NULL,
  `tempat` varchar(100) NOT NULL,
  `tanggal` date NOT NULL,
  `tanggal_selesai` date DEFAULT NULL,
  `tanggal_deadline` date DEFAULT NULL,
  `pukul` varchar(10) NOT NULL,
  `acara` text NOT NULL,
  `jenis` varchar(100) NOT NULL,
  `status` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `acara`
--

INSERT INTO `acara` (`kode`, `id_notulis`, `id_pembuat`, `nomor_surat`, `pemimpin`, `penanggung_jawab`, `pengaju`, `tempat`, `tanggal`, `tanggal_selesai`, `tanggal_deadline`, `pukul`, `acara`, `jenis`, `status`) VALUES
('AC0001', NULL, 2, 'BPK001/DIKTI-505/2018', NULL, 'Alice Eutik', 'Ryoma Sutisna', 'ITB', '2018-12-26', '2018-12-29', '2019-01-03', '10:30', '<!DOCTYPE html>\r\n<html>\r\n<head>\r\n</head>\r\n<body>\r\n<ul>\r\n<li>A</li>\r\n<li>B</li>\r\n<li>C</li>\r\n</ul>\r\n</body>\r\n</html>', 'Eksternal', 'Undangan Terkirim'),
('AC0002', 21, 21, 'BPK001/DIKTI-500/2018', NULL, 'Udung Wukong', 'Ikin Maloch', 'UNPAD', '2018-12-28', '2018-12-31', '2019-01-05', '11:00', '<!DOCTYPE html>\r\n<html>\r\n<head>\r\n</head>\r\n<body>\r\n<ol>\r\n<li>A</li>\r\n<li>B</li>\r\n<li>C</li>\r\n</ol>\r\n</body>\r\n</html>', 'Eksternal', 'Undangan Terkirim'),
('AC0003', 3200, 3200, NULL, 'Bas', NULL, 'coba', 'asda', '2019-01-31', NULL, NULL, '01:00', '<!DOCTYPE html>\r\n<html>\r\n<head>\r\n</head>\r\n<body>\r\n<p>asdsa</p>\r\n</body>\r\n</html>', 'Internal', 'Undangan Terkirim');

-- --------------------------------------------------------

--
-- Table structure for table `eksternal`
--

CREATE TABLE `eksternal` (
  `id` int(11) NOT NULL,
  `kode_notulen` varchar(50) NOT NULL,
  `kode_acara` varchar(100) NOT NULL,
  `notulen` text NOT NULL,
  `tujuan` varchar(200) NOT NULL,
  `pic` varchar(50) NOT NULL,
  `due_date` date NOT NULL,
  `status_not` varchar(100) NOT NULL,
  `keterangan` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `eksternal`
--

INSERT INTO `eksternal` (`id`, `kode_notulen`, `kode_acara`, `notulen`, `tujuan`, `pic`, `due_date`, `status_not`, `keterangan`) VALUES
(10, 'NT0001', 'AC0003', 'Makan Bakso', 'Biar Enak', 'YJ', '2018-12-04', 'Done', 'Enak'),
(11, 'NT0001', 'AC0003', 'Makan Pentol', 'Biar Mantep', 'YJ', '2018-12-05', 'Running', 'Mantep'),
(12, 'NT0001', 'AC0003', 'Makan Indomie', 'Biar Kenyang', 'YJ', '2018-12-06', 'Done', 'Kenyang'),
(13, 'NT0003', 'AC0006', 'Straight', 'Poker', 'YJ', '2018-12-04', 'Running', 'Straight'),
(14, 'NT0003', 'AC0006', 'Three of a Kind', 'Poker', 'YJ', '2018-12-05', 'Canceled', 'Three of a Kind'),
(15, 'NT0003', 'AC0006', 'Flush', 'Poker', 'YJ', '2018-12-06', 'Done', 'Flush'),
(16, 'NT0003', 'AC0006', 'Full House', 'Poker', 'YJ', '2018-12-07', 'Running', 'Full House'),
(17, 'NT0004', 'AC0007', 'Makan Pentol', 'Biar Kenyang', 'Yus Jayusman', '2018-12-21', 'Done', 'Udah Kenyang');

-- --------------------------------------------------------

--
-- Table structure for table `files`
--

CREATE TABLE `files` (
  `id` int(11) NOT NULL,
  `kode_acara` varchar(20) NOT NULL,
  `file` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `gambar`
--

CREATE TABLE `gambar` (
  `id` int(11) NOT NULL,
  `kode_notulen` varchar(15) NOT NULL,
  `kode_acara` varchar(20) NOT NULL,
  `gambar` varchar(500) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `kehadiran`
--

CREATE TABLE `kehadiran` (
  `id` int(11) NOT NULL,
  `kode_notulen` varchar(20) NOT NULL,
  `kode_acara` varchar(20) NOT NULL,
  `email_peserta` varchar(100) NOT NULL,
  `status` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `notulen`
--

CREATE TABLE `notulen` (
  `kode` varchar(15) NOT NULL,
  `id_notulis` int(20) DEFAULT NULL,
  `nama_notulis` varchar(200) NOT NULL,
  `kode_acara` varchar(15) NOT NULL,
  `isi` text NOT NULL,
  `tanggal_buat` date NOT NULL,
  `status` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `undangan`
--

CREATE TABLE `undangan` (
  `id` int(11) NOT NULL,
  `kode_acara` varchar(20) NOT NULL,
  `nama_peserta` varchar(150) DEFAULT NULL,
  `jabatan_peserta` varchar(200) DEFAULT NULL,
  `email_peserta` varchar(150) NOT NULL,
  `status` varchar(150) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `undangan`
--

INSERT INTO `undangan` (`id`, `kode_acara`, `nama_peserta`, `jabatan_peserta`, `email_peserta`, `status`) VALUES
(77, 'AC0001', 'Mina Ismu Rahayu', 'Kaprodi Teknik Informatika', 'ismurahayu@gmail.com', 'Diundang'),
(78, 'AC0001', 'Yus Jayusman', 'Dosen', 'yusjayusman@gmail.com', 'Diundang'),
(79, 'AC0002', 'Rini Nuraini Sukmana, M.T', 'Dosen', 'rinisukmana@gmail.com', 'Diundang'),
(80, 'AC0002', 'Siti Yulianti, M. Kom', 'Dosen', 'heositi@gmail.com', 'Diundang'),
(83, 'AC0003', NULL, NULL, 'illankasik@gmail.com', 'Diundang');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `email` varchar(50) NOT NULL,
  `password` text NOT NULL,
  `nama` varchar(100) NOT NULL,
  `alamat` text NOT NULL,
  `no_telp` varchar(15) NOT NULL,
  `role` varchar(30) NOT NULL,
  `foto` varchar(500) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `email`, `password`, `nama`, `alamat`, `no_telp`, `role`, `foto`) VALUES
(2, 'admin@stmik-bandung.ac.id', '7c4a8d09ca3762af61e59520943dc26494f8941b', 'Admin STMIK Bandung', 'Jl. Jalan 100', '+620000000000', 'Admin', ''),
(22, 'biksugame@gmail.com', 'dcddbbfbecf490d79e8758c290ddb27b01837f53', 'Mary-Beth Gaskill', 'Jl. Strawberry 50', '+6281444333222', 'Dosen', '00938fd0cb63340b458b78da428dba88.png'),
(23, 'rzkyirmwn@gmail.com', 'dcddbbfbecf490d79e8758c290ddb27b01837f53', 'Susan Grimshaw', 'Jl. Saint Denis 80', '+6269000888999', 'Akademik', 'bfae469cb1c633a510b68bc3fa4b65e3.jpg'),
(24, 'indrianayusni@gmail.com', 'dcddbbfbecf490d79e8758c290ddb27b01837f53', 'Inggitia Pradita', 'Jl. Pasteur 10', '+6287666555444', 'BEM', '5a1192244fbeec6af13f41c2c6548e85.jpg'),
(3200, 'admin@admin.com', '7c4a8d09ca3762af61e59520943dc26494f8941b', 'Admin', 'Jl. Cikutra', '+620000000001', 'Admin', ''),
(3201, 'illankasik@gmail.com', '7c4a8d09ca3762af61e59520943dc26494f8941b', 'Joni', 'ala,a', '+62089899989', 'General', '');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `acara`
--
ALTER TABLE `acara`
  ADD PRIMARY KEY (`kode`);

--
-- Indexes for table `eksternal`
--
ALTER TABLE `eksternal`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `files`
--
ALTER TABLE `files`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `gambar`
--
ALTER TABLE `gambar`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `kehadiran`
--
ALTER TABLE `kehadiran`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `notulen`
--
ALTER TABLE `notulen`
  ADD PRIMARY KEY (`kode`);

--
-- Indexes for table `undangan`
--
ALTER TABLE `undangan`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `eksternal`
--
ALTER TABLE `eksternal`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=18;

--
-- AUTO_INCREMENT for table `files`
--
ALTER TABLE `files`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `gambar`
--
ALTER TABLE `gambar`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `kehadiran`
--
ALTER TABLE `kehadiran`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `undangan`
--
ALTER TABLE `undangan`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=84;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3202;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
