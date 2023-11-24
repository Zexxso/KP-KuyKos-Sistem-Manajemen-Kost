-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Waktu pembuatan: 24 Nov 2023 pada 05.25
-- Versi server: 10.4.25-MariaDB
-- Versi PHP: 7.4.30

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `kuy-kos`
--

-- --------------------------------------------------------

--
-- Struktur dari tabel `admin`
--

CREATE TABLE `admin` (
  `id_admin` int(11) NOT NULL,
  `username_admin` varchar(50) NOT NULL,
  `password` varchar(300) NOT NULL,
  `role` varchar(255) NOT NULL DEFAULT 'user'
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data untuk tabel `admin`
--

INSERT INTO `admin` (`id_admin`, `username_admin`, `password`, `role`) VALUES
(1, 'admin', '12345', 'user'),
(2, 'kasir', 'amba', 'kasir');

-- --------------------------------------------------------

--
-- Struktur dari tabel `data_kamar`
--

CREATE TABLE `data_kamar` (
  `id_kamar` int(11) NOT NULL,
  `lantaikamar` varchar(20) NOT NULL,
  `hargakamar` varchar(50) NOT NULL,
  `fasilitaskamar` varchar(200) NOT NULL,
  `tipe_kamar` varchar(11) NOT NULL,
  `status` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data untuk tabel `data_kamar`
--

INSERT INTO `data_kamar` (`id_kamar`, `lantaikamar`, `hargakamar`, `fasilitaskamar`, `tipe_kamar`, `status`) VALUES
(100, '1', '2000000', '1 Kasur, 1 AC , 1 WiFi, Kamar Mandi Dalam,1 Lemari', 'B', ''),
(101, '1', '2000000', '1 Kasur, 1 AC , 1 WiFi, Kamar Mandi Dalam,1 Lemari', 'B', ''),
(102, '1', '2000000', '1 Kasur, 1 AC , 1 WiFi, Kamar Mandi Dalam, 1 Lemari', 'B', ''),
(106, '1', '500000', '1 Kasur,Kipas Angin,Kamar Mandi Luar', 'A', ''),
(107, '1', '2000000', '1 Kasur, 1 AC , 1 WiFi, Kamar Mandi Dalam,1 Lemari', 'C', ''),
(201, '2', '4500000', '1 Kasur, 1 AC , 1 WiFi, Kamar Mandi Dalam, 1 Lemari, Dapur, Ruang Tamu,1 Set PC', 'D', ''),
(202, '2', '4500000', '1 Kasur, 1 AC , 1 WiFi, Kamar Mandi Dalam, 1 Lemari, Dapur, Ruang Tamu,1 Set PC	', 'D', ''),
(205, '2', '4500000', '1 Kasur, 1 AC , 1 WiFi, Kamar Mandi Dalam, 1 Lemari, Dapur, Ruang Tamu,1 Set PC	', 'D', '');

-- --------------------------------------------------------

--
-- Struktur dari tabel `data_penghuni`
--

CREATE TABLE `data_penghuni` (
  `id_penghuni` int(11) NOT NULL,
  `id_kamar` int(11) NOT NULL,
  `nama_penghuni` varchar(50) NOT NULL,
  `no_hp` varchar(50) NOT NULL,
  `no_ktp` varchar(50) NOT NULL,
  `asal_kota` varchar(50) NOT NULL,
  `tgl_registrasi` date NOT NULL,
  `tgl_keluar` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data untuk tabel `data_penghuni`
--

INSERT INTO `data_penghuni` (`id_penghuni`, `id_kamar`, `nama_penghuni`, `no_hp`, `no_ktp`, `asal_kota`, `tgl_registrasi`, `tgl_keluar`) VALUES
(10, 107, 'Repan', '87834210982', '220103012010301', 'Tambun', '2023-11-20', '2024-07-20'),
(13, 201, 'Zexxso', '85703027774', '22010301201030', 'Bekasi', '2023-11-21', '2024-06-22'),
(16, 106, 'Sugi', '85703027774', '22010301201030', 'Bekasi', '2023-11-21', '2023-12-21'),
(18, 100, 'Rohman', '85703027774', '22010301201030', 'Bekasi', '2023-11-23', '2024-06-19'),
(19, 101, 'Rohman', '85703027774', '22010301201030', 'Tambun', '2023-11-23', '2024-06-23'),
(20, 202, 'Servant', '0111290391029', '2232313091389832', 'Semarang', '2023-11-23', '2024-07-23');

-- --------------------------------------------------------

--
-- Struktur dari tabel `data_tagihan`
--

CREATE TABLE `data_tagihan` (
  `id_pembayaran` int(11) NOT NULL,
  `nama_penghuni` varchar(50) NOT NULL,
  `id_kamar` int(11) NOT NULL,
  `id_penghuni` int(11) NOT NULL,
  `hargakamar` varchar(50) NOT NULL,
  `jumlah_total` varchar(50) NOT NULL,
  `jumlah_uang` varchar(50) NOT NULL,
  `tgl_registrasi` date NOT NULL DEFAULT current_timestamp(),
  `tgl_keluar` date NOT NULL,
  `keterangan` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data untuk tabel `data_tagihan`
--

INSERT INTO `data_tagihan` (`id_pembayaran`, `nama_penghuni`, `id_kamar`, `id_penghuni`, `hargakamar`, `jumlah_total`, `jumlah_uang`, `tgl_registrasi`, `tgl_keluar`, `keterangan`) VALUES
(12, 'Rohman', 100, 18, '2000000', '14000000', '', '2023-11-23', '2024-06-20', 'Bayar'),
(13, 'Sugi', 106, 16, '500000', '500000', '', '2023-11-21', '2023-12-22', 'Bayar'),
(14, 'Repan', 107, 10, '2000000', '16000000', '', '2023-11-20', '2024-07-21', 'Bayar'),
(15, 'Servant', 202, 20, '4500000', '36000000', '', '2023-11-23', '2024-07-23', '');

--
-- Indexes for dumped tables
--

--
-- Indeks untuk tabel `admin`
--
ALTER TABLE `admin`
  ADD PRIMARY KEY (`id_admin`);

--
-- Indeks untuk tabel `data_kamar`
--
ALTER TABLE `data_kamar`
  ADD PRIMARY KEY (`id_kamar`);

--
-- Indeks untuk tabel `data_penghuni`
--
ALTER TABLE `data_penghuni`
  ADD PRIMARY KEY (`id_penghuni`);

--
-- Indeks untuk tabel `data_tagihan`
--
ALTER TABLE `data_tagihan`
  ADD PRIMARY KEY (`id_pembayaran`);

--
-- AUTO_INCREMENT untuk tabel yang dibuang
--

--
-- AUTO_INCREMENT untuk tabel `admin`
--
ALTER TABLE `admin`
  MODIFY `id_admin` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT untuk tabel `data_kamar`
--
ALTER TABLE `data_kamar`
  MODIFY `id_kamar` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=233;

--
-- AUTO_INCREMENT untuk tabel `data_penghuni`
--
ALTER TABLE `data_penghuni`
  MODIFY `id_penghuni` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=21;

--
-- AUTO_INCREMENT untuk tabel `data_tagihan`
--
ALTER TABLE `data_tagihan`
  MODIFY `id_pembayaran` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
