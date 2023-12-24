-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3307
-- Waktu pembuatan: 24 Des 2023 pada 10.33
-- Versi server: 10.4.32-MariaDB
-- Versi PHP: 8.2.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `gista`
--

-- --------------------------------------------------------

--
-- Struktur dari tabel `gunung`
--

CREATE TABLE `gunung` (
  `id_gunung` int(11) NOT NULL,
  `gambar_gunung` varchar(255) NOT NULL,
  `nama_gunung` varchar(100) NOT NULL,
  `ketinggian_mdpl` int(11) NOT NULL,
  `ketinggian_ft` int(11) NOT NULL,
  `pulau` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Struktur dari tabel `jalur`
--

CREATE TABLE `jalur` (
  `id_jalur` int(11) NOT NULL,
  `data_peta` varchar(255) NOT NULL,
  `nama_jalur` varchar(100) NOT NULL,
  `alamat` varchar(255) NOT NULL,
  `detail` text NOT NULL,
  `id_gunung` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Struktur dari tabel `kalori`
--

CREATE TABLE `kalori` (
  `id_kalori` int(11) NOT NULL,
  `usia` int(11) NOT NULL,
  `berat_badan` int(11) NOT NULL,
  `jenis_kelamin` varchar(255) NOT NULL,
  `ketinggian` int(11) NOT NULL,
  `waktu` int(11) NOT NULL,
  `berat_bawaan` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Struktur dari tabel `makanan`
--

CREATE TABLE `makanan` (
  `id_makanan` int(11) NOT NULL,
  `gambar` varchar(255) NOT NULL,
  `nama` varchar(100) NOT NULL,
  `kalori` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data untuk tabel `makanan`
--

INSERT INTO `makanan` (`id_makanan`, `gambar`, `nama`, `kalori`) VALUES
(2, 'cokicoki.png', 'cokicoki', 12);

-- --------------------------------------------------------

--
-- Struktur dari tabel `porter`
--

CREATE TABLE `porter` (
  `id_porter` int(11) NOT NULL,
  `nama_porter` varchar(255) NOT NULL,
  `umur` int(11) NOT NULL,
  `gambar` varchar(255) NOT NULL,
  `nomer_telepon` varchar(15) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Struktur dari tabel `pos`
--

CREATE TABLE `pos` (
  `id_pos` int(11) NOT NULL,
  `pos` int(11) NOT NULL,
  `gambar_pos` varchar(255) NOT NULL,
  `kebutuhan_kalori` int(11) NOT NULL,
  `sumber_mata_air` varchar(255) NOT NULL,
  `flora_fauna` text NOT NULL,
  `ketinggian_pos` int(11) NOT NULL,
  `waktu` int(11) NOT NULL,
  `id_jalur` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Struktur dari tabel `request_data`
--

CREATE TABLE `request_data` (
  `id_request` int(20) NOT NULL,
  `id_user` int(11) NOT NULL,
  `gambar_gunung` varchar(255) NOT NULL,
  `nama_gunung` varchar(100) NOT NULL,
  `ketinggian_mdpl` int(11) NOT NULL,
  `ketinggian_ft` int(11) NOT NULL,
  `pulau` varchar(100) NOT NULL,
  `data_peta` varchar(255) DEFAULT NULL,
  `nama_jalur` varchar(100) DEFAULT NULL,
  `alamat` varchar(255) DEFAULT NULL,
  `detail` text DEFAULT NULL,
  `pos` int(11) DEFAULT NULL,
  `gambar_pos` varchar(255) DEFAULT NULL,
  `kebutuhan_kalori` int(11) DEFAULT NULL,
  `sumber_mata_air` varchar(255) DEFAULT NULL,
  `flora_fauna` text DEFAULT NULL,
  `ketinggian_pos` int(11) DEFAULT NULL,
  `waktu` int(11) DEFAULT NULL,
  `status_gunung` enum('disetujui','ditolak','request','') NOT NULL,
  `status_jalur` enum('disetujui','ditolak','request','') NOT NULL,
  `status_pos` enum('disetujui','ditolak','request','') NOT NULL,
  `alasan_gunung` varchar(255) NOT NULL,
  `alasan_jalur` text NOT NULL,
  `alasan_pos` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Struktur dari tabel `user`
--

CREATE TABLE `user` (
  `id_user` int(11) NOT NULL,
  `nama` varchar(100) NOT NULL,
  `email` varchar(50) NOT NULL,
  `username` varchar(255) NOT NULL,
  `password` varchar(100) NOT NULL,
  `role` enum('Admin','Penginput','','') NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data untuk tabel `user`
--

INSERT INTO `user` (`id_user`, `nama`, `email`, `username`, `password`, `role`) VALUES
(1, 'admin', 'admin@gmail.com', 'admin', 'admin', 'Admin'),
(2, 'Taehyung', 'trinitong61@gmail.com', 'penginput', 'penginput', 'Penginput');

--
-- Indexes for dumped tables
--

--
-- Indeks untuk tabel `gunung`
--
ALTER TABLE `gunung`
  ADD PRIMARY KEY (`id_gunung`);

--
-- Indeks untuk tabel `jalur`
--
ALTER TABLE `jalur`
  ADD PRIMARY KEY (`id_jalur`),
  ADD KEY `id_gunung` (`id_gunung`);

--
-- Indeks untuk tabel `kalori`
--
ALTER TABLE `kalori`
  ADD PRIMARY KEY (`id_kalori`);

--
-- Indeks untuk tabel `makanan`
--
ALTER TABLE `makanan`
  ADD PRIMARY KEY (`id_makanan`);

--
-- Indeks untuk tabel `porter`
--
ALTER TABLE `porter`
  ADD PRIMARY KEY (`id_porter`);

--
-- Indeks untuk tabel `pos`
--
ALTER TABLE `pos`
  ADD PRIMARY KEY (`id_pos`),
  ADD KEY `id_jalur` (`id_jalur`);

--
-- Indeks untuk tabel `request_data`
--
ALTER TABLE `request_data`
  ADD PRIMARY KEY (`id_request`);

--
-- Indeks untuk tabel `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`id_user`);

--
-- AUTO_INCREMENT untuk tabel yang dibuang
--

--
-- AUTO_INCREMENT untuk tabel `gunung`
--
ALTER TABLE `gunung`
  MODIFY `id_gunung` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=59;

--
-- AUTO_INCREMENT untuk tabel `jalur`
--
ALTER TABLE `jalur`
  MODIFY `id_jalur` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- AUTO_INCREMENT untuk tabel `kalori`
--
ALTER TABLE `kalori`
  MODIFY `id_kalori` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT untuk tabel `makanan`
--
ALTER TABLE `makanan`
  MODIFY `id_makanan` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT untuk tabel `porter`
--
ALTER TABLE `porter`
  MODIFY `id_porter` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT untuk tabel `pos`
--
ALTER TABLE `pos`
  MODIFY `id_pos` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT untuk tabel `request_data`
--
ALTER TABLE `request_data`
  MODIFY `id_request` int(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=27;

--
-- AUTO_INCREMENT untuk tabel `user`
--
ALTER TABLE `user`
  MODIFY `id_user` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- Ketidakleluasaan untuk tabel pelimpahan (Dumped Tables)
--

--
-- Ketidakleluasaan untuk tabel `jalur`
--
ALTER TABLE `jalur`
  ADD CONSTRAINT `id_gunung` FOREIGN KEY (`id_gunung`) REFERENCES `gunung` (`id_gunung`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Ketidakleluasaan untuk tabel `pos`
--
ALTER TABLE `pos`
  ADD CONSTRAINT `id_jalur` FOREIGN KEY (`id_jalur`) REFERENCES `jalur` (`id_jalur`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
