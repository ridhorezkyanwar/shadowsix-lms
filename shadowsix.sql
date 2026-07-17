-- phpMyAdmin SQL Dump
-- version 5.2.2
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3306
-- Generation Time: Jun 09, 2026 at 09:53 AM
-- Server version: 10.11.16-MariaDB
-- PHP Version: 8.4.20

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `ridho10_shadowsix`
--

-- --------------------------------------------------------

--
-- Table structure for table `kontak`
--

CREATE TABLE `kontak` (
  `id` int(10) UNSIGNED NOT NULL,
  `nama` varchar(100) NOT NULL,
  `email` varchar(191) NOT NULL,
  `pesan` text NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `kontak`
--

INSERT INTO `kontak` (`id`, `nama`, `email`, `pesan`, `created_at`) VALUES
(1, 'testing', 'testing@gmail.com', 'Lorem Ipsum Dolor Sit Amet', '2026-05-22 04:18:34'),
(2, 'testing', 'testing@gmail.com', 'efasadasdsadsa', '2026-05-22 15:54:30'),
(3, 'login', 'login@gmail.com', 'bisa login mantep euyy', '2026-05-22 15:55:39'),
(4, 'testing', 'testing@gmail.com', 'HALLOWWW', '2026-05-24 01:04:03'),
(5, 'testing', 'testing@gmail.com', 'Lagi di sekolah', '2026-05-26 04:09:11');

-- --------------------------------------------------------

--
-- Table structure for table `materi`
--

CREATE TABLE `materi` (
  `id` int(10) UNSIGNED NOT NULL,
  `nama_pelajaran` varchar(100) NOT NULL,
  `judul_materi` varchar(191) NOT NULL,
  `isi_materi` text NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `login`
--

CREATE TABLE `login` (
  `id` int(10) UNSIGNED NOT NULL,
  `fullname` varchar(100) NOT NULL,
  `email` varchar(191) NOT NULL,
  `password` varchar(255) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `login`
--

INSERT INTO `login` (`id`, `fullname`, `email`, `password`, `created_at`) VALUES
(1, 'testing', 'testing@gmail.com', '$2y$10$7HXIMM49HEbX9nb5DZT.Bef9wmqYSyoaqEAbCLLOpQ5lz1BaiLcPq', '2026-05-20 10:14:50'),
(2, 'loremipsum', 'loremipsum@gmail.com', '$2y$10$CFE6JeMwvrozzSMqcqekAeWunbkKSHcPnK/uuWWPyRe2kAswOuaqy', '2026-05-22 04:20:25'),
(3, 'login', 'login@gmail.com', '$2y$10$w8NCnA1RsdaJBAAprEu6/.aEh8Ak2QMYEQhlSQkJibS75hDz1P0pK', '2026-05-22 15:55:16'),
(4, 'yuhuuwww', 'yuhuww@gmail.com', '$2y$10$kuf8B8/CfdkABLt8LzDlteP9AvQU5vVy3JxwutA0xqpaBnrDsz3QK', '2026-05-24 13:03:30'),
(5, 'svylmgqwsh', 'iuoxzryp@immenseignite.info', '$2y$10$NgS3MYUSwEcTk3UoY4Q1WuFSRi0jH.uR/Hyg7EK3mbjmWk67G41OK', '2026-05-24 14:17:11'),
(6, 'slebew', 'example@gmail.com', '$2y$10$mUs.M3.WV8psYIrLOUJ/eO4Rq4PlhY6HsB60Risl6YL6hJ5TuoBVy', '2026-06-01 22:15:44'),
(7, 'TES', 'smkn6ukkrpl@gmail.com', '$2y$10$Rr5zhntDP690KRfzQfalg.Q6qzkO59zzeBhigelB8jNxj1N9.PPWi', '2026-06-06 01:45:32'),
(8, 'TES1', 'mr.purnama83@gmail.com', '$2y$10$36e2QjQT22UqamxHbh8Kc.5pCaGpXpCivAyqw16M85xOeMV/j6Rwi', '2026-06-06 01:46:25'),
(9, 'imlyhqiprw', 'uhyhexhl@immenseignite.info', '$2y$10$ciZb.dltzXySWHeTgl3Rpef0j3x4Q2xRJbpeZY.jFG/NRglgi/jjy', '2026-06-06 12:14:35'),
(10, 'pvyqhyozyy', 'pymwnrii@immenseignite.info', '$2y$10$Ro0QZkzuPEL6K7asyLTkJuDt5.LqhtrXvSgWx8BGcoj0NQnF60KdK', '2026-06-06 12:14:49');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `kontak`
--
ALTER TABLE `kontak`
  ADD PRIMARY KEY (`id`),
  ADD KEY `idx_kontak_email` (`email`);

--
-- Indexes for table `materi`
--
ALTER TABLE `materi`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `login`
--
ALTER TABLE `login`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `uq_login_email` (`email`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `kontak`
--
ALTER TABLE `kontak`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `materi`
--
ALTER TABLE `materi`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `login`
--
ALTER TABLE `login`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
