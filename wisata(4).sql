-- phpMyAdmin SQL Dump
-- version 4.8.5
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Waktu pembuatan: 07 Jul 2019 pada 17.44
-- Versi server: 10.1.39-MariaDB
-- Versi PHP: 7.1.29

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `wisata`
--

-- --------------------------------------------------------

--
-- Struktur dari tabel `emergency`
--

CREATE TABLE `emergency` (
  `emergency_id` int(11) NOT NULL,
  `emergency_name` varchar(100) NOT NULL,
  `emergency_phone` varchar(13) NOT NULL,
  `emergency_alamat` varchar(255) NOT NULL,
  `latitude` char(255) NOT NULL,
  `longitude` char(255) NOT NULL,
  `emergency_photo` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `emergency`
--

INSERT INTO `emergency` (`emergency_id`, `emergency_name`, `emergency_phone`, `emergency_alamat`, `latitude`, `longitude`, `emergency_photo`) VALUES
(17, 'SA', 'AD', 'DA', '', '', 'storage/emergency/gpYh4R4lku3MU9jGPyiCX25kKRpZamK1YEJODsBw.png');

-- --------------------------------------------------------

--
-- Struktur dari tabel `event`
--

CREATE TABLE `event` (
  `event_id` int(11) NOT NULL,
  `event_name` varchar(100) NOT NULL,
  `kateven_id` int(11) NOT NULL,
  `wisata_id` int(11) NOT NULL,
  `penyelenggara` varchar(255) NOT NULL,
  `contact_person` varchar(15) NOT NULL,
  `tgl_mulai` date NOT NULL,
  `tgl_selesai` date NOT NULL,
  `open_time` varchar(15) NOT NULL,
  `close_time` varchar(15) NOT NULL,
  `ket` varchar(255) NOT NULL,
  `gambar` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `event`
--

INSERT INTO `event` (`event_id`, `event_name`, `kateven_id`, `wisata_id`, `penyelenggara`, `contact_person`, `tgl_mulai`, `tgl_selesai`, `open_time`, `close_time`, `ket`, `gambar`) VALUES
(22, 'dayu', 32, 0, 'dayeq', '098', '2019-06-12', '2019-06-26', '10.00', '21.00', 'ah', 'zip'),
(302, 'adnd', 0, 0, 'shadnxa', '03612345621', '2019-06-03', '2019-06-11', '10.00', '12.00', 'eaddgz', '-'),
(2906, 'peninsula festival', 32, 202, 'dayubodo', '12345', '2019-06-12', '2019-06-20', '10.00', '17.00', 'haj', '-'),
(2907, 'h', 32, 202, '09999', '89', '2019-06-03', '2019-06-20', '06', '09', '06', '98'),
(2908, 'qaw', 32, 202, '11', '12', '2019-08-01', '2019-08-09', '2', '1', 'fe', '-'),
(2909, 'ef', 32, 202, 'fs', 'fes', '2019-07-15', '2019-07-29', 'sgf', 'sgr', 'gws', 'storage/event/h0fztWMag1G3rJDFkQhjbSogf1N2tmURj7KPa0wy.gif');

-- --------------------------------------------------------

--
-- Struktur dari tabel `kategorinews`
--

CREATE TABLE `kategorinews` (
  `katnews_id` int(11) NOT NULL,
  `katnews_name` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `kategorinews`
--

INSERT INTO `kategorinews` (`katnews_id`, `katnews_name`) VALUES
(31, 'hg1'),
(32, 'o'),
(33, 'o'),
(34, 'o\\io'),
(35, '321');

-- --------------------------------------------------------

--
-- Struktur dari tabel `kategori_event`
--

CREATE TABLE `kategori_event` (
  `kateven_id` int(11) NOT NULL,
  `kateven_name` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `kategori_event`
--

INSERT INTO `kategori_event` (`kateven_id`, `kateven_name`) VALUES
(32, 'budaya'),
(33, 'arta'),
(34, 'p'),
(35, 'f'),
(36, 'qw'),
(37, 'po'),
(38, 'g'),
(39, 'h'),
(40, 'ui'),
(41, 'y'),
(42, 'p');

-- --------------------------------------------------------

--
-- Struktur dari tabel `kategori_wisata`
--

CREATE TABLE `kategori_wisata` (
  `katwis_id` int(11) NOT NULL,
  `katwis_name` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `kategori_wisata`
--

INSERT INTO `kategori_wisata` (`katwis_id`, `katwis_name`) VALUES
(42, 'PANTAI'),
(43, 'Hutan'),
(44, 'alamiah'),
(45, 'aaw');

-- --------------------------------------------------------

--
-- Struktur dari tabel `kecamatan`
--

CREATE TABLE `kecamatan` (
  `kecamatan_id` int(11) NOT NULL,
  `kecamatan_name` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `kecamatan`
--

INSERT INTO `kecamatan` (`kecamatan_id`, `kecamatan_name`) VALUES
(13, 'hh');

-- --------------------------------------------------------

--
-- Struktur dari tabel `migrations`
--

CREATE TABLE `migrations` (
  `id` int(10) UNSIGNED NOT NULL,
  `migration` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `batch` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Struktur dari tabel `news`
--

CREATE TABLE `news` (
  `news_id` int(10) UNSIGNED NOT NULL,
  `news_author` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `news_title` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `katnews_id` int(11) NOT NULL,
  `posted_date` date NOT NULL,
  `news_ket` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `news_photo` text COLLATE utf8mb4_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data untuk tabel `news`
--

INSERT INTO `news` (`news_id`, `news_author`, `news_title`, `katnews_id`, `posted_date`, `news_ket`, `news_photo`) VALUES
(67, 'aw', 'aw12111', 0, '2019-08-08', '-', 'dist/img/noimage.png'),
(69, 'as', 'addw', 31, '2019-07-04', 'da', 'dist/img/noimage.png'),
(70, 'scz', 'sdc', 31, '2019-07-05', 'sdcx', 'storage/news_photo/8HuPYpwTb04brSsyzxA6B3NZa0tmuNsKDXTALVBR.png');

-- --------------------------------------------------------

--
-- Struktur dari tabel `tiket`
--

CREATE TABLE `tiket` (
  `tiket_id` int(11) NOT NULL,
  `tiket_type` enum('Lokal-Anak','Lokal-Dewasa','Asing-Anak','Asing-Dewasa') NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `tiket`
--

INSERT INTO `tiket` (`tiket_id`, `tiket_type`) VALUES
(501, 'Lokal-Anak'),
(502, 'Lokal-Dewasa'),
(503, 'Asing-Anak'),
(504, 'Asing-Dewasa');

-- --------------------------------------------------------

--
-- Struktur dari tabel `users`
--

CREATE TABLE `users` (
  `id` int(10) UNSIGNED NOT NULL,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `jabatan` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL,
  `password` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data untuk tabel `users`
--

INSERT INTO `users` (`id`, `name`, `email`, `jabatan`, `password`, `remember_token`, `created_at`, `updated_at`) VALUES
(2, 'd', 'dayu@gmail.com', 'ADMIN', '$2y$10$3G9KmoRDLgzjvmIOP5wWjenP.1vV8wNGuwqgIEv4B3vBvv4vo1pPC', NULL, '2019-07-01 19:47:10', '2019-07-01 19:47:10'),
(3, 'krisna', 'k@gmail.com', 'PETUGAS', '$2y$10$2YuEFmuWZmmhlvMjq0M2iep5/7S3z3zT8SaZraGzrFslyFTKh6SPq', NULL, '2019-07-01 19:50:23', '2019-07-01 19:50:23'),
(4, 'DC', 'd@gmail.com', 'ADMIN', '$2y$10$saPEsU8AVxCh/2aIvIBiu.3ASCVmEBC/DXqqMBOfT/qXSim.mZf8u', NULL, NULL, NULL),
(5, 'pimpinan', 'pim@gmail.com', 'PIMPINAN', '$2y$10$G7UjJyE/JpsZceZGTyD9Uu9liaoNOiKRllEljPP0TIL0UDcgZXPk2', NULL, NULL, NULL);

-- --------------------------------------------------------

--
-- Struktur dari tabel `wisata`
--

CREATE TABLE `wisata` (
  `wisata_id` int(11) NOT NULL,
  `wisata_name` varchar(50) NOT NULL,
  `kecamatan_id` int(11) NOT NULL,
  `tiket_id` int(11) NOT NULL,
  `katwis_id` int(11) NOT NULL,
  `harga` varchar(15) NOT NULL,
  `wisata_alamat` text NOT NULL,
  `open_time` varchar(10) NOT NULL,
  `close_time` varchar(10) NOT NULL,
  `gambar` text NOT NULL,
  `latitude` varchar(255) NOT NULL,
  `longitude` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `wisata`
--

INSERT INTO `wisata` (`wisata_id`, `wisata_name`, `kecamatan_id`, `tiket_id`, `katwis_id`, `harga`, `wisata_alamat`, `open_time`, `close_time`, `gambar`, `latitude`, `longitude`) VALUES
(202, 'sangeh21', 1, 503, 43, '10.000', 'abiansemal21', '21.00', '24.00', '', '0', '0'),
(203, 'day', 13, 501, 42, 'ae', 'po', 'aw1', '-', 'storage/event/t1MKgc3TtAO9By3aHDZQHRr7rSlApwbYlJlEHeTW.png', '0', '0'),
(204, 'g', 13, 501, 42, 'zg', 'zg', 'zg', 'dg', 'user/img/noimage.png', '0', '0');

--
-- Indexes for dumped tables
--

--
-- Indeks untuk tabel `emergency`
--
ALTER TABLE `emergency`
  ADD PRIMARY KEY (`emergency_id`);

--
-- Indeks untuk tabel `event`
--
ALTER TABLE `event`
  ADD PRIMARY KEY (`event_id`);

--
-- Indeks untuk tabel `kategorinews`
--
ALTER TABLE `kategorinews`
  ADD PRIMARY KEY (`katnews_id`);

--
-- Indeks untuk tabel `kategori_event`
--
ALTER TABLE `kategori_event`
  ADD PRIMARY KEY (`kateven_id`);

--
-- Indeks untuk tabel `kategori_wisata`
--
ALTER TABLE `kategori_wisata`
  ADD PRIMARY KEY (`katwis_id`);

--
-- Indeks untuk tabel `kecamatan`
--
ALTER TABLE `kecamatan`
  ADD PRIMARY KEY (`kecamatan_id`);

--
-- Indeks untuk tabel `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `news`
--
ALTER TABLE `news`
  ADD PRIMARY KEY (`news_id`),
  ADD KEY `katnews_id` (`katnews_id`);

--
-- Indeks untuk tabel `tiket`
--
ALTER TABLE `tiket`
  ADD PRIMARY KEY (`tiket_id`);

--
-- Indeks untuk tabel `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `users_email_unique` (`email`);

--
-- Indeks untuk tabel `wisata`
--
ALTER TABLE `wisata`
  ADD PRIMARY KEY (`wisata_id`);

--
-- AUTO_INCREMENT untuk tabel yang dibuang
--

--
-- AUTO_INCREMENT untuk tabel `emergency`
--
ALTER TABLE `emergency`
  MODIFY `emergency_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=18;

--
-- AUTO_INCREMENT untuk tabel `event`
--
ALTER TABLE `event`
  MODIFY `event_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2910;

--
-- AUTO_INCREMENT untuk tabel `kategorinews`
--
ALTER TABLE `kategorinews`
  MODIFY `katnews_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=36;

--
-- AUTO_INCREMENT untuk tabel `kategori_event`
--
ALTER TABLE `kategori_event`
  MODIFY `kateven_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=43;

--
-- AUTO_INCREMENT untuk tabel `kategori_wisata`
--
ALTER TABLE `kategori_wisata`
  MODIFY `katwis_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=46;

--
-- AUTO_INCREMENT untuk tabel `kecamatan`
--
ALTER TABLE `kecamatan`
  MODIFY `kecamatan_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT untuk tabel `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT untuk tabel `news`
--
ALTER TABLE `news`
  MODIFY `news_id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=71;

--
-- AUTO_INCREMENT untuk tabel `tiket`
--
ALTER TABLE `tiket`
  MODIFY `tiket_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=505;

--
-- AUTO_INCREMENT untuk tabel `users`
--
ALTER TABLE `users`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT untuk tabel `wisata`
--
ALTER TABLE `wisata`
  MODIFY `wisata_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=205;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
