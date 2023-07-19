-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Waktu pembuatan: 30 Nov 2022 pada 23.09
-- Versi server: 10.4.22-MariaDB
-- Versi PHP: 7.4.27

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `monitor`
--

-- --------------------------------------------------------

--
-- Struktur dari tabel `chat`
--

CREATE TABLE `chat` (
  `id_chat` int(11) NOT NULL,
  `out_msg` int(11) NOT NULL,
  `in_msg` int(11) NOT NULL,
  `isi_chat` varchar(1000) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `chat`
--

INSERT INTO `chat` (`id_chat`, `out_msg`, `in_msg`, `isi_chat`) VALUES
(1, 16, 19, 'halo bg'),
(2, 16, 19, 'halo ngab'),
(3, 16, 19, 'halo dek'),
(4, 19, 16, 'halo halo');

-- --------------------------------------------------------

--
-- Struktur dari tabel `departement`
--

CREATE TABLE `departement` (
  `id_departement` int(11) NOT NULL,
  `nama_departement` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `departement`
--

INSERT INTO `departement` (`id_departement`, `nama_departement`) VALUES
(1, 'Coding'),
(3, 'Database');

-- --------------------------------------------------------

--
-- Struktur dari tabel `dokumen`
--

CREATE TABLE `dokumen` (
  `id_dokumen` int(11) NOT NULL,
  `id_projek` int(11) NOT NULL,
  `dokumen` varchar(200) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `dokumen`
--

INSERT INTO `dokumen` (`id_dokumen`, `id_projek`, `dokumen`) VALUES
(12, 31, '_DSC0884.JPG'),
(13, 32, '_DSC0884.JPG'),
(14, 33, ''),
(15, 34, '47055-75676666491-1-PB.pdf'),
(16, 35, '277162-none-3e323083.pdf'),
(17, 36, 'LactobacillusfermentumKP-3-fermentedginsengamelioratesalcohol-inducedliverdiseaseD0FO02396E_(1).pdf'),
(18, 38, '277162-none-3e3230831.pdf'),
(19, 39, '192-Article_Text-928-1-10-20180713_(1).pdf');

-- --------------------------------------------------------

--
-- Struktur dari tabel `employee`
--

CREATE TABLE `employee` (
  `id` int(11) NOT NULL,
  `id_departement` int(11) NOT NULL,
  `nama_lengkap` varchar(50) NOT NULL,
  `nama_panggilan` varchar(50) NOT NULL,
  `tahun_masuk` int(4) NOT NULL,
  `jabatan` varchar(50) NOT NULL,
  `grade` varchar(50) NOT NULL,
  `skill` varchar(200) NOT NULL,
  `email` varchar(50) NOT NULL,
  `nomor_hp` varchar(20) NOT NULL,
  `input_by` varchar(50) NOT NULL,
  `edit_by` varchar(50) DEFAULT NULL,
  `date_create` date NOT NULL DEFAULT current_timestamp(),
  `date_edit` date DEFAULT NULL,
  `delet` int(11) NOT NULL DEFAULT 0,
  `akun` int(11) NOT NULL DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `employee`
--

INSERT INTO `employee` (`id`, `id_departement`, `nama_lengkap`, `nama_panggilan`, `tahun_masuk`, `jabatan`, `grade`, `skill`, `email`, `nomor_hp`, `input_by`, `edit_by`, `date_create`, `date_edit`, `delet`, `akun`) VALUES
(1, 1, 'yo shandy hermawan gg', 'shandy', 2022, 'Junior Programmer', 'a', 'MySQL,php,JAVA', 'yo@gmail.com', '08123456789', 'Super Admin', 'Super Admin', '2022-10-10', '2022-10-10', 0, 1),
(19, 1, 'raka', 'raka', 2022, 'Junior Programmer', 'a', 'php', 'customer@gmail.com', '0812345561', 'Super Admin', NULL, '2022-11-21', NULL, 1, 0),
(20, 1, 'randy', 'randy', 2021, 'Junior Programmer', 'a', 'sql', 'customer@gmail.com', '0822123123123', 'Super Admin', NULL, '2022-11-21', NULL, 1, 0),
(21, 1, 'raka', 'raka', 2022, 'Junior Programmer', 'a', 'php', 'customer@gmail.com', '082288812003', 'Super Admin', NULL, '2022-11-21', NULL, 0, 1),
(22, 1, 'shandy', 'shandy', 2022, 'Junior Programmer', 'a', 'php', 'customer@gmail.com', '082212345678', 'Super Admin', NULL, '2022-11-21', NULL, 0, 0),
(23, 1, 'jordan', 'jordan', 2022, 'Junior Programmer', 'a', 'php', 'lol@lol', '082212345678', 'Super Admin', NULL, '2022-11-28', NULL, 0, 0),
(24, 1, 'bogik', 'ogi', 2022, 'Junior Programmer', 'a', 'php', 'lol@lol', '082212345678', 'Super Admin', NULL, '2022-11-28', '2022-12-01', 0, 0);

-- --------------------------------------------------------

--
-- Struktur dari tabel `master_projek`
--

CREATE TABLE `master_projek` (
  `id_projek` int(11) NOT NULL,
  `id_owner` int(11) NOT NULL,
  `judul` varchar(50) NOT NULL,
  `start_projek` date NOT NULL DEFAULT current_timestamp(),
  `deadline_projek` date NOT NULL,
  `status` int(11) DEFAULT 0,
  `progres_projek` int(11) DEFAULT 0,
  `bhs_pemograman` varchar(200) NOT NULL,
  `input_by` varchar(50) NOT NULL,
  `input_by_id` int(11) NOT NULL,
  `edit_by` varchar(50) DEFAULT NULL,
  `date_create` date NOT NULL DEFAULT current_timestamp(),
  `date_edit` date DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `master_projek`
--

INSERT INTO `master_projek` (`id_projek`, `id_owner`, `judul`, `start_projek`, `deadline_projek`, `status`, `progres_projek`, `bhs_pemograman`, `input_by`, `input_by_id`, `edit_by`, `date_create`, `date_edit`) VALUES
(35, 8, 'Sistem Antrian', '2022-11-27', '2022-12-03', 0, 0, 'php', 'Super Admin', 0, NULL, '2022-11-27', NULL),
(36, 8, 'Sistem absen', '2022-11-28', '2022-12-10', 0, 0, 'php', 'Super Admin', 0, NULL, '2022-11-28', NULL),
(37, 8, 'Sistem Antrian', '2022-11-28', '2022-12-10', 0, 0, 'php', 'Super Admin', 0, NULL, '2022-11-28', NULL),
(38, 8, 'Sistem Antrian', '2022-11-28', '2022-12-10', 0, 0, 'php', 'Super Admin', 0, NULL, '2022-11-28', NULL),
(39, 8, 'Sistem Antrian', '2022-11-28', '2022-12-10', 1, 0, 'php', 'Super Admin', 8, NULL, '2022-11-28', NULL);

-- --------------------------------------------------------

--
-- Struktur dari tabel `pic`
--

CREATE TABLE `pic` (
  `id_pic` int(11) NOT NULL,
  `id_projek` int(11) NOT NULL,
  `id_user` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `pic`
--

INSERT INTO `pic` (`id_pic`, `id_projek`, `id_user`) VALUES
(19, 35, 16),
(20, 36, 16),
(21, 38, 1),
(22, 39, 19),
(23, 39, 16);

-- --------------------------------------------------------

--
-- Struktur dari tabel `task`
--

CREATE TABLE `task` (
  `id` int(11) NOT NULL,
  `id_projek` int(11) NOT NULL,
  `judul` varchar(50) NOT NULL,
  `deskripsi` varchar(200) NOT NULL,
  `jenis` int(11) NOT NULL,
  `status` int(11) NOT NULL DEFAULT 0,
  `link` varchar(200) NOT NULL,
  `code` varchar(200) NOT NULL,
  `deadline` date NOT NULL,
  `pic` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `task`
--

INSERT INTO `task` (`id`, `id_projek`, `judul`, `deskripsi`, `jenis`, `status`, `link`, `code`, `deadline`, `pic`) VALUES
(1, 35, 'Buat Controller', 'buat pakai bahasa ci', 0, 0, '', '', '2022-11-28', 16);

-- --------------------------------------------------------

--
-- Struktur dari tabel `user`
--

CREATE TABLE `user` (
  `id_user` int(11) NOT NULL,
  `unique_id` int(11) NOT NULL,
  `id_employee` int(11) NOT NULL,
  `complete_name` varchar(100) NOT NULL,
  `role` varchar(20) NOT NULL,
  `img` varchar(20) NOT NULL DEFAULT 'default.jpg',
  `username` varchar(100) NOT NULL,
  `password` varchar(100) NOT NULL,
  `edit_by` varchar(50) DEFAULT NULL,
  `date_create` date NOT NULL DEFAULT current_timestamp(),
  `date_edit` date DEFAULT NULL,
  `delet` int(11) NOT NULL DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `user`
--

INSERT INTO `user` (`id_user`, `unique_id`, `id_employee`, `complete_name`, `role`, `img`, `username`, `password`, `edit_by`, `date_create`, `date_edit`, `delet`) VALUES
(8, 0, 0, 'Super Admin', 'admin', 'default.jpg', 'admin', 'admin', 'admin', '2022-10-10', '2022-10-10', 0),
(10, 0, 1, 'yo shandy hermawan gg', 'Supervisor', '0', 'sans', 'sans', NULL, '2022-10-10', NULL, 0),
(16, 0, 21, 'raka', 'Programmer', '16.jpg', 'raka', 'dedek', NULL, '2022-11-21', NULL, 0),
(17, 0, 1, 'shandy', 'Operator', '0', 'shandy', 'shandy', NULL, '2022-11-21', NULL, 0),
(18, 0, 1, 'jordan', 'PinDiv', '0', 'jordan', 'jordan', NULL, '2022-11-28', NULL, 0),
(19, 0, 24, 'bogik', 'Programmer', '19.jpg', 'ogi', 'ogi', NULL, '2022-11-28', NULL, 0);

--
-- Indexes for dumped tables
--

--
-- Indeks untuk tabel `chat`
--
ALTER TABLE `chat`
  ADD PRIMARY KEY (`id_chat`);

--
-- Indeks untuk tabel `departement`
--
ALTER TABLE `departement`
  ADD PRIMARY KEY (`id_departement`);

--
-- Indeks untuk tabel `dokumen`
--
ALTER TABLE `dokumen`
  ADD PRIMARY KEY (`id_dokumen`);

--
-- Indeks untuk tabel `employee`
--
ALTER TABLE `employee`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `master_projek`
--
ALTER TABLE `master_projek`
  ADD PRIMARY KEY (`id_projek`);

--
-- Indeks untuk tabel `pic`
--
ALTER TABLE `pic`
  ADD PRIMARY KEY (`id_pic`);

--
-- Indeks untuk tabel `task`
--
ALTER TABLE `task`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`id_user`);

--
-- AUTO_INCREMENT untuk tabel yang dibuang
--

--
-- AUTO_INCREMENT untuk tabel `chat`
--
ALTER TABLE `chat`
  MODIFY `id_chat` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT untuk tabel `departement`
--
ALTER TABLE `departement`
  MODIFY `id_departement` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT untuk tabel `dokumen`
--
ALTER TABLE `dokumen`
  MODIFY `id_dokumen` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=20;

--
-- AUTO_INCREMENT untuk tabel `employee`
--
ALTER TABLE `employee`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=25;

--
-- AUTO_INCREMENT untuk tabel `master_projek`
--
ALTER TABLE `master_projek`
  MODIFY `id_projek` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=40;

--
-- AUTO_INCREMENT untuk tabel `pic`
--
ALTER TABLE `pic`
  MODIFY `id_pic` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=24;

--
-- AUTO_INCREMENT untuk tabel `task`
--
ALTER TABLE `task`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT untuk tabel `user`
--
ALTER TABLE `user`
  MODIFY `id_user` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=20;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
