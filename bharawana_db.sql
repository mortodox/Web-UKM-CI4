-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jun 30, 2025 at 03:06 PM
-- Server version: 10.4.32-MariaDB
-- PHP Version: 8.2.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `bharawana_db`
--

-- --------------------------------------------------------

--
-- Table structure for table `artikel`
--

CREATE TABLE `artikel` (
  `id` int(11) NOT NULL,
  `judul` varchar(255) NOT NULL,
  `isi` text NOT NULL,
  `penulis` varchar(100) DEFAULT NULL,
  `tanggal_publikasi` date NOT NULL DEFAULT curdate(),
  `views` int(11) DEFAULT 0,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `thumbnail` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `artikel`
--

INSERT INTO `artikel` (`id`, `judul`, `isi`, `penulis`, `tanggal_publikasi`, `views`, `created_at`, `updated_at`, `thumbnail`) VALUES
(1, 'Ekpedisi Balease', 'Bal', 'Lep', '2025-06-30', 30, '2025-06-30 00:47:00', '2025-06-30 12:37:39', NULL),
(2, 'MABIM HG', 'GGGG', 'GG', '2025-06-30', 0, '2025-06-30 12:39:02', '2025-06-30 12:39:02', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `artikel_foto`
--

CREATE TABLE `artikel_foto` (
  `id` int(11) NOT NULL,
  `artikel_id` int(11) NOT NULL,
  `file_path` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `artikel_foto`
--

INSERT INTO `artikel_foto` (`id`, `artikel_id`, `file_path`) VALUES
(1, 1, 'uploads/artikel_galeri/1751283695_a0e53c84cd42f96901b3.jpg'),
(2, 1, 'uploads/artikel_galeri/1751283695_674c22c66cde76c9bd50.jpg'),
(3, 1, 'uploads/artikel_galeri/1751283695_b1f2a14047a967b1cca1.jpg'),
(4, 1, 'uploads/artikel_galeri/1751283695_e95eb998a78f80537913.jpg'),
(5, 2, 'uploads/artikel_galeri/1751287142_7a8dfbefeb8efbd9ac45.png'),
(6, 2, 'uploads/artikel_galeri/1751287143_ab93b46e06a7d5fb7913.jpg'),
(7, 2, 'uploads/artikel_galeri/1751287143_accec6e7d6e2ec89c4ad.jpg'),
(8, 2, 'uploads/artikel_galeri/1751287143_2073c094f5baaec4f269.jpg');

-- --------------------------------------------------------

--
-- Table structure for table `kegiatan`
--

CREATE TABLE `kegiatan` (
  `id` int(11) NOT NULL,
  `judul` varchar(255) NOT NULL,
  `deskripsi` text NOT NULL,
  `tanggal_mulai` date NOT NULL,
  `tanggal_selesai` date DEFAULT NULL,
  `lokasi_gunung` varchar(255) NOT NULL,
  `provinsi` varchar(100) DEFAULT NULL,
  `koordinat_puncak` varchar(100) DEFAULT NULL,
  `tim_ekspeditor` text DEFAULT NULL,
  `gpx_file` varchar(255) DEFAULT NULL,
  `foto_dokumentasi` text DEFAULT NULL,
  `laporan_kegiatan` varchar(255) DEFAULT NULL,
  `dibuat_oleh` varchar(100) DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `kegiatan`
--

INSERT INTO `kegiatan` (`id`, `judul`, `deskripsi`, `tanggal_mulai`, `tanggal_selesai`, `lokasi_gunung`, `provinsi`, `koordinat_puncak`, `tim_ekspeditor`, `gpx_file`, `foto_dokumentasi`, `laporan_kegiatan`, `dibuat_oleh`, `created_at`, `updated_at`) VALUES
(1, 'Ekpedisi Balease', 'Balease', '2025-06-11', '2025-06-28', 'Balease', 'Sulawesi Selatan', '-7.1234, 110.1234', 'Asep, Agus, Anti', NULL, NULL, NULL, 'Admin Bharawana', '2025-06-29 23:40:03', '2025-06-29 23:40:03'),
(6, 'Gede Pangrango', 'Gede Pangrango', '2025-06-11', '2025-07-12', 'Gede Pangrango', 'Jawa Barat', '7.1234, 110.1234', 'GUGUGAGA', '1751287663_495ed44724815825fd0c.xml', NULL, NULL, '', '2025-06-30 12:47:43', '2025-06-30 12:47:43');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `nama` varchar(100) NOT NULL,
  `email` varchar(100) NOT NULL,
  `password` varchar(255) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `nama`, `email`, `password`, `created_at`, `updated_at`) VALUES
(1, 'Admin Bharawana', 'admin@bharawana.com', 'admin123', '2025-06-29 23:21:55', '2025-06-29 23:21:55');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `artikel`
--
ALTER TABLE `artikel`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `artikel_foto`
--
ALTER TABLE `artikel_foto`
  ADD PRIMARY KEY (`id`),
  ADD KEY `artikel_id` (`artikel_id`);

--
-- Indexes for table `kegiatan`
--
ALTER TABLE `kegiatan`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `email` (`email`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `artikel`
--
ALTER TABLE `artikel`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `artikel_foto`
--
ALTER TABLE `artikel_foto`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `kegiatan`
--
ALTER TABLE `kegiatan`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `artikel_foto`
--
ALTER TABLE `artikel_foto`
  ADD CONSTRAINT `artikel_foto_ibfk_1` FOREIGN KEY (`artikel_id`) REFERENCES `artikel` (`id`) ON DELETE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
