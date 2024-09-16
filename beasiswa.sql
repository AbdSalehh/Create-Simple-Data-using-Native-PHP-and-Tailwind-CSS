-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Sep 16, 2024 at 08:48 AM
-- Server version: 10.4.32-MariaDB
-- PHP Version: 8.1.25

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `beasiswa`
--

-- --------------------------------------------------------

--
-- Table structure for table `daftar_beasiswa`
--

CREATE TABLE `daftar_beasiswa` (
  `id` int(11) NOT NULL,
  `image` varchar(255) NOT NULL,
  `name` varchar(255) NOT NULL,
  `descriptions` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `daftar_beasiswa`
--

INSERT INTO `daftar_beasiswa` (`id`, `image`, `name`, `descriptions`) VALUES
(1, './src/assets/Beasiswa1.webp', 'Beasiswa Indonesia Maju', 'Beasiswa Indonesia Maju (BIM) adalah program beasiswa yang diberikan kepada peserta didik/lulusan yang berprestasi pada bidang akademik dan non-akademik. BIM terdiri dari program beasiswa bergelar (degree) dan beasiswa non gelar (non degree).'),
(2, './src/assets/Beasiswa2.webp', 'Beasiswa LPDP', 'LPDP berfokus pada pengembangan kualitas sumber daya manusia di berbagai bidang yang menunjang percepatan pembangunan Indonesia. Beberapa di antara prioritas yang menjadi fokus LPDP antara lain; teknik, sains, pertanian, hukum, ekonomi, keuangan, kedokter'),
(3, './src/assets/Beasiswa3.jpg', 'Beasiswa Unggulan', 'Beasiswa Unggulan adalah pemberian biaya pendidikan oleh pemerintah Indonesia kepada putra-putri terbaik bangsa Indonesia pada perguruan tinggi penerima peserta didik program Beasiswa Unggulan pada jenjang S1, S2, dan S3. easiswa Unggulan terdiri atas Bea'),
(4, './src/assets/Beasiswa4.png', 'Beasiswa Djarum Plus', 'Sejak 1984, Djarum Foundation terus konsisten dalam memberikan kontribusi terhadap dunia pendidikan di Indonesia. Langkah ini diawali kesadaran bahwa pendidikan merupakan salah satu upaya untuk meningkatkan kesejahteraan masyarakat dan bangsa dalam mewuju'),
(5, './src/assets/Beasiswa5.png', 'Beasiswa BCA', 'Beasiswa BCA Merupakan salah satu program Corporate Social Responsibility, beasiswa BCA ditujukan kepada para lulusan SMA/SMK/sederajat yang berprestasi. Beasiswa ini diberikan dalam bentuk Program Pendidikan Bisnis dan Perbankan (PPBP) dan Program Pendid'),
(6, './src/assets/Beasiswa6.jpg', 'Beasiswa Indonesia Bangkit', 'Beasiswa Indonesia Bangkit (BIB) adalah program beasiswa yang merupakan kerja sama antara Kementerian Agama dan Lembaga Pengelola Dana Pendidikan (LPDP) Kementerian Keuangan. Program ini bertujuan untuk membantu masyarakat Indonesia mengembangkan karier, ');

-- --------------------------------------------------------

--
-- Table structure for table `detail_beasiswa`
--

CREATE TABLE `detail_beasiswa` (
  `id` int(11) NOT NULL,
  `nama_beasiswa` varchar(255) NOT NULL,
  `nama_pendaftar` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `nomor_hp` varchar(255) DEFAULT NULL,
  `ipk` varchar(255) DEFAULT NULL,
  `pilihan` varchar(255) DEFAULT NULL,
  `berkas` varchar(255) DEFAULT NULL,
  `status_ajuan` varchar(255) DEFAULT 'Belum di verifikasi'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `detail_beasiswa`
--

INSERT INTO `detail_beasiswa` (`id`, `nama_beasiswa`, `nama_pendaftar`, `email`, `nomor_hp`, `ipk`, `pilihan`, `berkas`, `status_ajuan`) VALUES
(6, 'Beasiswa Indonesia Maju', 'Dandi', 'abdshaleh124@gmail.com', '380230229', '3', 'Beasiswa Utama', 'd6f8f-04_fr.ia.02-tugas-praktik-demonstrasi_v3-esron (1).pdf', 'Sudah di verifikasi'),
(7, 'Beasiswa LPDP', 'Saleh', 'saleh@gmail.com', '082245099542', '3', 'Beasiswa Utama', 'Model.pdf', 'Belum di verifikasi'),
(8, 'Beasiswa Indonesia Maju', 'Wahyu', 'wahyu@gmail.com', '089850005466', '3', 'Beasiswa Biasa', 'd6f8f-04_fr.ia.02-tugas-praktik-demonstrasi_v3-esron (1).pdf', 'Belum di verifikasi'),
(9, 'Beasiswa BCA', 'Andy', 'andy@gmail.com', '082345678910', '3', 'Beasiswa Utama', 'UU Nomor 5 Tahun 2018 (4).pdf', 'Belum di verifikasi');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `daftar_beasiswa`
--
ALTER TABLE `daftar_beasiswa`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `detail_beasiswa`
--
ALTER TABLE `detail_beasiswa`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `daftar_beasiswa`
--
ALTER TABLE `daftar_beasiswa`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `detail_beasiswa`
--
ALTER TABLE `detail_beasiswa`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
