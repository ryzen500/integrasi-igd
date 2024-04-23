-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Waktu pembuatan: 28 Des 2022 pada 06.40
-- Versi server: 10.4.25-MariaDB
-- Versi PHP: 8.1.10

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `db_helpdesk`
--

-- --------------------------------------------------------

--
-- Struktur dari tabel `departemen`
--

CREATE TABLE `departemen` (
  `ID_DEPARTEMEN` int(11) NOT NULL,
  `NAMA_DEPARTEMEN` varchar(50) DEFAULT NULL,
  `DELETED_AT` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `departemen`
--

INSERT INTO `departemen` (`ID_DEPARTEMEN`, `NAMA_DEPARTEMEN`, `DELETED_AT`) VALUES
(1, 'Poli Gigi', '0000-00-00'),
(2, 'Poli Jantung', '0000-00-00'),
(3, 'Ruang IGD', '0000-00-00'),
(4, 'Poli Radiologi', '0000-00-00'),
(6, 'Poli Kandungan', '0000-00-00');

-- --------------------------------------------------------

--
-- Struktur dari tabel `inventory`
--

CREATE TABLE `inventory` (
  `ID_INVENTORY` int(11) NOT NULL,
  `ID_DEPARTEMEN` int(11) DEFAULT NULL,
  `NAMA_INVENTORY` varchar(100) DEFAULT NULL,
  `STATUS` varchar(12) NOT NULL,
  `DELETED_AT` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `inventory`
--

INSERT INTO `inventory` (`ID_INVENTORY`, `ID_DEPARTEMEN`, `NAMA_INVENTORY`, `STATUS`, `DELETED_AT`) VALUES
(4, 1, 'Laptop Lenovo Slim5i', 'Baik', '2022-12-19'),
(5, 2, 'Printer EPSON 3110', 'Baik', '0000-00-00'),
(6, 3, 'Komputer Admin', 'Baik', '0000-00-00'),
(7, 4, 'Komputer Lenovo', 'Baik', '0000-00-00'),
(8, 6, 'Laptop Omen Hp 14', 'Status', '0000-00-00');

-- --------------------------------------------------------

--
-- Struktur dari tabel `level`
--

CREATE TABLE `level` (
  `ID_LEVEL` int(11) NOT NULL,
  `NAMA_LEVEL` varchar(20) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `level`
--

INSERT INTO `level` (`ID_LEVEL`, `NAMA_LEVEL`) VALUES
(1, 'Administrator'),
(2, 'Pengguna'),
(3, 'IT Support');

-- --------------------------------------------------------

--
-- Struktur dari tabel `status_tiket`
--

CREATE TABLE `status_tiket` (
  `ID_STATUS` int(2) NOT NULL,
  `STATUS_TIKET` varchar(20) CHARACTER SET utf8 NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `status_tiket`
--

INSERT INTO `status_tiket` (`ID_STATUS`, `STATUS_TIKET`) VALUES
(1, 'Tiket Masuk'),
(2, 'Baru saja di ambil'),
(3, 'Dalam Proses'),
(4, 'Sudah Ditangani'),
(6, 'Ganti Teknisi'),
(7, 'Dikonfirmasi');

-- --------------------------------------------------------

--
-- Struktur dari tabel `tiket`
--

CREATE TABLE `tiket` (
  `ID_TIKET` varchar(15) NOT NULL,
  `ID_USER` int(11) DEFAULT NULL,
  `ID_INVENTORY` int(11) DEFAULT NULL,
  `MASALAH` text DEFAULT NULL,
  `SUB_MASALAH` varchar(8) NOT NULL,
  `TANGGAL` datetime DEFAULT NULL,
  `STATUS_TIKET` int(11) DEFAULT NULL,
  `SOLUSI` text DEFAULT NULL,
  `TEKNISI` text DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `tiket`
--

INSERT INTO `tiket` (`ID_TIKET`, `ID_USER`, `ID_INVENTORY`, `MASALAH`, `SUB_MASALAH`, `TANGGAL`, `STATUS_TIKET`, `SOLUSI`, `TEKNISI`) VALUES
('T-20221220220', 121212, 5, 'Pada scanning printer tidak berjalan dengan normal', 'Hardware', '2022-12-20 13:16:58', 2, NULL, '874817'),
('T-20221220345', 121212, 4, 'Terjadi kerusakan driver keyboard', 'Hardware', '2022-12-20 13:14:41', 7, 'Harus ada penanganan lebih serius dalam perangkat tersebut', '933405'),
('T-20221220914', 121212, 6, 'Software terjadi penyerangan virus', 'Software', '2022-12-20 13:15:12', 3, NULL, '933405'),
('T-20221223797', 121212, 4, 'Terjadi ada bug', 'Software', '2022-12-23 09:49:26', 1, NULL, NULL);

-- --------------------------------------------------------

--
-- Struktur dari tabel `tiket_detail`
--

CREATE TABLE `tiket_detail` (
  `ID_TIKET_DETAIL` int(15) NOT NULL,
  `ID_TIKET` varchar(15) NOT NULL,
  `ID_STATUS` int(10) NOT NULL,
  `ID_TEKNISI` int(11) NOT NULL,
  `TANGGAL` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `tiket_detail`
--

INSERT INTO `tiket_detail` (`ID_TIKET_DETAIL`, `ID_TIKET`, `ID_STATUS`, `ID_TEKNISI`, `TANGGAL`) VALUES
(141, 'T-20221220345', 2, 874817, '2022-12-20 13:17:38'),
(142, 'T-20221220345', 3, 874817, '2022-12-20 13:17:40'),
(143, 'T-20221220345', 4, 874817, '2022-12-20 13:19:16'),
(144, 'T-20221220220', 2, 874817, '2022-12-20 13:20:42'),
(145, 'T-20221220220', 3, 874817, '2022-12-20 13:20:44'),
(146, 'T-20221220220', 6, 874817, '2022-12-20 13:20:45'),
(147, 'T-20221220345', 7, 121212, '2022-12-20 22:51:49'),
(148, 'T-20221220220', 2, 874817, '2022-12-21 20:58:30'),
(149, 'T-20221220345', 3, 874817, '2022-12-21 21:02:56'),
(150, 'T-20221220345', 6, 874817, '2022-12-21 21:02:57'),
(151, 'T-20221220345', 2, 933405, '2022-12-21 21:03:26'),
(152, 'T-20221220345', 3, 933405, '2022-12-21 21:03:40'),
(153, 'T-20221220345', 4, 933405, '2022-12-21 21:08:05'),
(154, 'T-20221220345', 7, 121212, '2022-12-21 21:08:28'),
(155, 'T-20221220914', 2, 933405, '2022-12-21 21:57:58'),
(156, 'T-20221220914', 3, 933405, '2022-12-21 21:58:00');

-- --------------------------------------------------------

--
-- Struktur dari tabel `user`
--

CREATE TABLE `user` (
  `id_user` int(11) NOT NULL,
  `id_level` int(11) DEFAULT NULL,
  `id_departemen` int(11) DEFAULT NULL,
  `nama_user` varchar(100) DEFAULT NULL,
  `password_user` varchar(100) DEFAULT NULL,
  `email` varchar(100) DEFAULT NULL,
  `no_telp` varchar(15) DEFAULT NULL,
  `user_status` int(11) NOT NULL,
  `DELETED_AT` date DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `user`
--

INSERT INTO `user` (`id_user`, `id_level`, `id_departemen`, `nama_user`, `password_user`, `email`, `no_telp`, `user_status`, `DELETED_AT`) VALUES
(121212, 2, 4, 'Bu Diema', '$2y$10$ZP6LiRorpPrEFO06csaA2.gvMIocspy.nVNiNAoq0LXWydiIlpNJ2', 'harithhakim13@gmail.com', '081337169987', 1, NULL),
(131313, 1, 4, 'Aufa Ardilla', '$2y$10$8mMNCTgjp0i65/MGH8KR.uDoKAzm5fzvXxchYOxVvgrp8e5puTD0O', 'harithhakim13@gmail.com', '081337169049', 1, NULL),
(169976, 2, 2, 'Oktafian Dwi Cahyono', '$2y$10$XhxwDt2ooAIdpnYWMyLgGu3X7jpd.FvkGweHs9miGJiBP92KKx9M6', 'oktafian510@gmail.com', '082334739813', 1, NULL),
(874817, 3, 2, 'Bayu Cahya', '$2y$10$HNFrDjDEbVIJ3i6LapUVke0u1F6TjCUQOnvFzSiEQeQcA8K9nguPK', 'teknisi2@gmail.com', '082334739813', 1, NULL),
(933405, 3, 1, 'Aura Febriyanti', '$2y$10$6bGIJ0GA0vG7bnIuww8k6O7w7qoVRzPeki71wKuzBuQIEUb0sroaC', 'teknisi@gmail.com', '082334739813', 1, NULL);

--
-- Indexes for dumped tables
--

--
-- Indeks untuk tabel `departemen`
--
ALTER TABLE `departemen`
  ADD PRIMARY KEY (`ID_DEPARTEMEN`);

--
-- Indeks untuk tabel `inventory`
--
ALTER TABLE `inventory`
  ADD PRIMARY KEY (`ID_INVENTORY`),
  ADD KEY `ID_DEPARTEMEN` (`ID_DEPARTEMEN`);

--
-- Indeks untuk tabel `level`
--
ALTER TABLE `level`
  ADD PRIMARY KEY (`ID_LEVEL`);

--
-- Indeks untuk tabel `status_tiket`
--
ALTER TABLE `status_tiket`
  ADD PRIMARY KEY (`ID_STATUS`);

--
-- Indeks untuk tabel `tiket`
--
ALTER TABLE `tiket`
  ADD PRIMARY KEY (`ID_TIKET`),
  ADD KEY `ID_INVENTORY` (`ID_INVENTORY`),
  ADD KEY `ID_USER` (`ID_USER`),
  ADD KEY `STATUS_TIKET` (`STATUS_TIKET`);

--
-- Indeks untuk tabel `tiket_detail`
--
ALTER TABLE `tiket_detail`
  ADD PRIMARY KEY (`ID_TIKET_DETAIL`),
  ADD KEY `ID_STATUS` (`ID_STATUS`),
  ADD KEY `ID_TEKNISI` (`ID_TEKNISI`),
  ADD KEY `ID_TIKET` (`ID_TIKET`);

--
-- Indeks untuk tabel `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`id_user`),
  ADD KEY `ID_DEPARTEMEN` (`id_departemen`),
  ADD KEY `ID_LEVEL` (`id_level`);

--
-- AUTO_INCREMENT untuk tabel yang dibuang
--

--
-- AUTO_INCREMENT untuk tabel `departemen`
--
ALTER TABLE `departemen`
  MODIFY `ID_DEPARTEMEN` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT untuk tabel `inventory`
--
ALTER TABLE `inventory`
  MODIFY `ID_INVENTORY` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT untuk tabel `status_tiket`
--
ALTER TABLE `status_tiket`
  MODIFY `ID_STATUS` int(2) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT untuk tabel `tiket_detail`
--
ALTER TABLE `tiket_detail`
  MODIFY `ID_TIKET_DETAIL` int(15) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=157;

--
-- Ketidakleluasaan untuk tabel pelimpahan (Dumped Tables)
--

--
-- Ketidakleluasaan untuk tabel `inventory`
--
ALTER TABLE `inventory`
  ADD CONSTRAINT `inventory_ibfk_1` FOREIGN KEY (`ID_DEPARTEMEN`) REFERENCES `departemen` (`ID_DEPARTEMEN`);

--
-- Ketidakleluasaan untuk tabel `tiket`
--
ALTER TABLE `tiket`
  ADD CONSTRAINT `tiket_ibfk_1` FOREIGN KEY (`ID_USER`) REFERENCES `user` (`id_user`),
  ADD CONSTRAINT `tiket_ibfk_2` FOREIGN KEY (`ID_INVENTORY`) REFERENCES `inventory` (`ID_INVENTORY`),
  ADD CONSTRAINT `tiket_ibfk_3` FOREIGN KEY (`ID_USER`) REFERENCES `user` (`id_user`),
  ADD CONSTRAINT `tiket_ibfk_4` FOREIGN KEY (`STATUS_TIKET`) REFERENCES `status_tiket` (`ID_STATUS`);

--
-- Ketidakleluasaan untuk tabel `tiket_detail`
--
ALTER TABLE `tiket_detail`
  ADD CONSTRAINT `tiket_detail_ibfk_1` FOREIGN KEY (`ID_STATUS`) REFERENCES `status_tiket` (`ID_STATUS`),
  ADD CONSTRAINT `tiket_detail_ibfk_3` FOREIGN KEY (`ID_TEKNISI`) REFERENCES `user` (`id_user`),
  ADD CONSTRAINT `tiket_detail_ibfk_4` FOREIGN KEY (`ID_TIKET`) REFERENCES `tiket` (`ID_TIKET`);

--
-- Ketidakleluasaan untuk tabel `user`
--
ALTER TABLE `user`
  ADD CONSTRAINT `user_ibfk_1` FOREIGN KEY (`id_departemen`) REFERENCES `departemen` (`ID_DEPARTEMEN`),
  ADD CONSTRAINT `user_ibfk_2` FOREIGN KEY (`id_level`) REFERENCES `level` (`ID_LEVEL`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
