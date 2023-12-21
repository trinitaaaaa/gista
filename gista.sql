-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Waktu pembuatan: 21 Des 2023 pada 12.16
-- Versi server: 10.4.28-MariaDB
-- Versi PHP: 8.2.4

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

--
-- Dumping data untuk tabel `gunung`
--

INSERT INTO `gunung` (`id_gunung`, `gambar_gunung`, `nama_gunung`, `ketinggian_mdpl`, `ketinggian_ft`, `pulau`) VALUES
(1, 'sindoro.jpg', 'sindoro', 3153, 10335, 'Jawa'),
(3, 'sumbing.jpg', 'Gunung Sumbing', 7858, 6557, 'Jawa'),
(4, 'slamet.jpg', 'Gunung Slamet', 7867, 4343, 'Bali'),
(5, 'sindoro.jpg', 'Gunung Sindoro', 3153, 1213, 'Kalimantan'),
(9, 'yay', 'prau', 8696, 88585, 'Papua'),
(10, 'yay', 'test', 223, 868, 'Sumatra'),
(11, 'yay', 'test', 879779, 877, 'Jawa'),
(12, 'yay', 'Gunung Slamet', 968, 97969, 'Sulawesi'),
(13, 'slamet.jpg', 'TEST', 9726824, 927792, 'Papua');

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

--
-- Dumping data untuk tabel `jalur`
--

INSERT INTO `jalur` (`id_jalur`, `data_peta`, `nama_jalur`, `alamat`, `detail`, `id_gunung`) VALUES
(3, 'hero_1', 'VIA ALANG-ALANG SEWU', 'Jl. Campur Salam No.7, Kledung, Kec. Kledung, Kabupaten Temanggung, Jawa Tengah 56264', 'Gunung Sindoro, biasa disebut Sindara, atau juga Sundoro (Ketinggian puncak 3.150 mdpl) (bahasa Jawa: Gunung Sindara) merupakan sebuah gunung volkano aktif yang terletak di Jawa Tengah, Indonesia, dengan Temanggung sebagai kota terdekat. Gunung Sindoro terletak berdampingan dengan Gunung Sumbing.Gunung sindara dapat terlihat jelas dari puncak sikunir dieng  Kawah yang disertai jurang dapat ditemukan di sisi barat laut ke selatan gunung, dan yang terbesar disebut Kembang. Sebuah kubah lava kecil menempati puncak gunung berapi. Sejarah letusan Gunung Sindara yang telah terjadi sebagian besar berjenis ringan sampai sedang (letusan freatik).  Hutan di kawasan Gunung Sundoro mempunyai bertipe hutan Dipterokarp Bukit, hutan Dipterokarp Atas, hutan Montane, dan Hutan Ericaceous atau hutan gunung.', 1),
(4, 'hero_1', 'VIA NDORO ARUM', 'Banaran, Kayugiyang, Kec. Garung, Kabupaten Wonosobo, Jawa Tengah 56353', 'Untuk mencapai puncaknya terdapat beberapa basecamp yang bisa di tempuh, antaralain Jalur Kledung yang paling ramai, Basecamp Sigedang, Basecamp Bangsri, Basecamp Tambi dan terakhir Basecamp Ndoro Arum yang rata-rata semua basecamp masuk ke dalam wilayah Wonosobo kecuali Kledung merupakan perbatasan dari Kabupaten Temanggung dan Kabupaten Wonosobo.  Basecamp Ndoro Arum sendiri termasuk Banaran, Kayu Giang, Garung yang merupakan wilayah Wonosobo yang berada di sebelah barat gunung Sindoro.', 1);

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
(1, 'bengbeng.png', 'bengbeng', 71331),
(2, 'cokicoki.png', 'cokicoki', 71331),
(3, 'indomie.png', 'indomie', 71331),
(4, 'oatmeal.png', 'oatmeal', 71331),
(5, 'oatmeal.png', 'oatmeal', 9778),
(6, 'oatmeal.png', 'oatmeal', 9778),
(7, 'oatmeal.png', 'oatmeal', 9778),
(8, 'oatmeal.png', 'oatmeal', 9778),
(9, 'oatmeal.png', 'oatmeal', 9778),
(10, 'oatmeal.png', 'oatmeal', 9778);

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
  `gambar_gunung` varchar(255) NOT NULL,
  `nama_gunung` varchar(100) NOT NULL,
  `ketinggian_mdpl` int(11) NOT NULL,
  `ketinggian_ft` int(11) NOT NULL,
  `pulau` varchar(100) NOT NULL,
  `data_peta` varchar(255) NOT NULL,
  `nama_jalur` varchar(100) NOT NULL,
  `alamat` varchar(255) NOT NULL,
  `detail` text NOT NULL,
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

--
-- Dumping data untuk tabel `request_data`
--

INSERT INTO `request_data` (`id_request`, `gambar_gunung`, `nama_gunung`, `ketinggian_mdpl`, `ketinggian_ft`, `pulau`, `data_peta`, `nama_jalur`, `alamat`, `detail`, `pos`, `gambar_pos`, `kebutuhan_kalori`, `sumber_mata_air`, `flora_fauna`, `ketinggian_pos`, `waktu`, `status_gunung`, `status_jalur`, `status_pos`, `alasan_gunung`, `alasan_jalur`, `alasan_pos`) VALUES
(1, 'slamet.jpg', 'sindoro', 76, 768, 'Kalimantan', 'uyiy', 'jalur', 'gjhg', 'ggjg', 0, 'gjg', 0, 'on', 'jhjkh', NULL, 0, 'ditolak', 'request', 'request', 'aneh', '', ''),
(2, 'slamet.jpg', 'TEST', 9726824, 927792, 'Papua', 'TEST', 'TEST', 'TEST', 'TEST', 5, 'TEST', 0, 'on', 'TEST', NULL, 8986, 'ditolak', 'request', 'request', '', '', ''),
(3, 'slamet.jpg', 'tgf', 56465, 5646, 'Jawa', 'hgnfu', '675', 'ghh', 'ghf', 67, 'hv', 0, 'on', 'nhv', NULL, 0, 'ditolak', 'request', 'request', '', '', ''),
(4, '13074695188326.jpg', 'fikka', 343, 354, 'Jawa', 'eer', 'et', 'ete', 'ffter', 3, 'sfs', 0, 'on', 'sf', NULL, 34, 'ditolak', 'request', 'request', '', '', ''),
(5, 'aaaaaa.PNG', 'gfgf', 65, 432, 'Jawa', 're', 'ewt', 'dgsg', 'sdg', 0, 'dsg', 0, 'on', 'sdgs', NULL, 0, 'disetujui', 'request', 'request', '', '', '');

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
(2, 'Taehyung', 'trinitong61@gmail.com', 'winterbeaaar_', 'bts123', 'Penginput');

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
  MODIFY `id_gunung` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

--
-- AUTO_INCREMENT untuk tabel `jalur`
--
ALTER TABLE `jalur`
  MODIFY `id_jalur` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT untuk tabel `kalori`
--
ALTER TABLE `kalori`
  MODIFY `id_kalori` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT untuk tabel `makanan`
--
ALTER TABLE `makanan`
  MODIFY `id_makanan` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT untuk tabel `porter`
--
ALTER TABLE `porter`
  MODIFY `id_porter` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT untuk tabel `pos`
--
ALTER TABLE `pos`
  MODIFY `id_pos` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT untuk tabel `request_data`
--
ALTER TABLE `request_data`
  MODIFY `id_request` int(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

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
  ADD CONSTRAINT `id_gunung` FOREIGN KEY (`id_gunung`) REFERENCES `gunung` (`id_gunung`);

--
-- Ketidakleluasaan untuk tabel `pos`
--
ALTER TABLE `pos`
  ADD CONSTRAINT `id_jalur` FOREIGN KEY (`id_jalur`) REFERENCES `jalur` (`id_jalur`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
