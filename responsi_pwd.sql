-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Waktu pembuatan: 13 Jan 2023 pada 06.50
-- Versi server: 10.4.24-MariaDB
-- Versi PHP: 8.1.6

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `responsi_pwd`
--

-- --------------------------------------------------------

--
-- Struktur dari tabel `admin`
--

CREATE TABLE `admin` (
  `admin_id` int(20) NOT NULL,
  `admin_name` varchar(50) NOT NULL,
  `username` varchar(20) NOT NULL,
  `password` varchar(50) NOT NULL,
  `admin_telp` varchar(20) NOT NULL,
  `admin_email` varchar(50) NOT NULL,
  `admin_adress` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `admin`
--

INSERT INTO `admin` (`admin_id`, `admin_name`, `username`, `password`, `admin_telp`, `admin_email`, `admin_adress`) VALUES
(1, 'Nurfan', 'admin', 'admin', '0895640123773', 'nurfan22@gmail.com', 'Legundi kec-ketapang lampung selatan, Lampung');

-- --------------------------------------------------------

--
-- Struktur dari tabel `pembelian`
--

CREATE TABLE `pembelian` (
  `id_beli` int(12) NOT NULL,
  `Nama_User` varchar(50) NOT NULL,
  `email` varchar(50) NOT NULL,
  `no_hp` varchar(12) NOT NULL,
  `nama_barang` varchar(50) NOT NULL,
  `harga_barang` varchar(50) NOT NULL,
  `tgl_pembelian` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `pembelian`
--

INSERT INTO `pembelian` (`id_beli`, `Nama_User`, `email`, `no_hp`, `nama_barang`, `harga_barang`, `tgl_pembelian`) VALUES
(1, 'nurfan rahmat berlian', 'nurfan22@gmail.com', '0890909090', 'Paket1', '100000', '2023-01-13 04:13:05'),
(2, 'nurfan rahmat berlian', 'nurfan22@gmail.com', '0890909090', 'Paket2', '200000', '2023-01-13 04:13:05');

-- --------------------------------------------------------

--
-- Struktur dari tabel `produk`
--

CREATE TABLE `produk` (
  `produk_id` int(11) NOT NULL,
  `produk_name` varchar(100) NOT NULL,
  `produk_pice` int(11) NOT NULL,
  `produk_deskripsi` text NOT NULL,
  `produk_image` varchar(100) NOT NULL,
  `produk_status` int(10) NOT NULL,
  `data_created` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `produk`
--

INSERT INTO `produk` (`produk_id`, `produk_name`, `produk_pice`, `produk_deskripsi`, `produk_image`, `produk_status`, `data_created`) VALUES
(4, 'Daia Bunga', 15000, 'sabun cuci baju terkemuka  ', 'produk1641544663.jpg', 7, '2022-01-07 08:37:43'),
(8, 'handphone Black-Shark 4', 6000000, 'Hp gaming terbaru dari Black shark yang pasti kualitas joss gandoss...', 'produk1641647503.jpg', 8, '2022-01-08 13:11:43'),
(9, 'handphone OPPO Reno 6', 6500000, 'HP dengan spesifikasi tinggi ini bisa melibas game berat dengan normal dan sekaligus memiliki kamera yang mantap cocok bagi anda yang menyukai selfi ;)', 'produk1641647693.jpg', 11, '2022-01-08 13:14:53'),
(10, 'handphone POCO F3 ', 5800000, 'anda inin libas game berat silahkan coba dengan hp ini ( coba = membeli) ...', 'produk1641647770.jpg', 12, '2022-01-08 13:16:10'),
(11, 'handphone POCO X3 NFC', 2800000, 'udah lah beli aja spek coba sendiri ( tidak terima pengembalian barang ) ;)', 'produk1641647879.jpg', 10, '2022-01-08 13:17:59'),
(12, 'handphone REDMI NOT 10 PRO', 3500000, 'mau main game gasak mau foto-foto gasak mau d buang jangan ;)', 'produk1641647958.jpg', 10, '2022-01-08 13:19:18'),
(13, 'laptop 1', 18000000, 'Laptop dengan spesifikasi gaming yang menggugah selera', 'produk1641649423.jpg', 9, '2022-01-08 13:43:43'),
(14, 'Headset 1', 1000000, ' buat dengerin langkah kaki di epep aja mantep apa lagi dengerin kamu bilang i lop you <3', 'produk1641649516.jpg', 12, '2022-01-08 13:45:16'),
(15, 'keyboard 1', 1200000, 'ada lampunya bree kalo di klik ada suara mamang bakso boraxxnya lagi', 'produk1641649609.jpg', 10, '2022-01-08 13:46:49'),
(16, 'monitor 1', 4000000, 'yang nanya spesifikasi ga usah di tanya lagi buat nonton sepiderman juga jaring nya bisa sampe keluar', 'produk1641649685.jpg', 9, '2022-01-08 13:48:05'),
(17, 'shampo 1', 6000, 'ga usah banyak tanya kalo mau beli ;0', 'produk1641649874.jpg', 10, '2022-01-08 13:51:14'),
(18, 'sunlight', 150000, 'kalo udah di pake buat cuci piring behhh piring nya bisa di pake buat makan', 'produk1641649947.jpg', 1, '2022-01-08 13:52:27');

-- --------------------------------------------------------

--
-- Struktur dari tabel `user`
--

CREATE TABLE `user` (
  `id_user` int(20) NOT NULL,
  `nama_user` varchar(50) NOT NULL,
  `username` varchar(20) NOT NULL,
  `password` varchar(20) NOT NULL,
  `email` varchar(50) NOT NULL,
  `no_hp` int(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `user`
--

INSERT INTO `user` (`id_user`, `nama_user`, `username`, `password`, `email`, `no_hp`) VALUES
(14, 'ngentotretrrww', 'us223', 'Nurfan1234', 'intsetshu22@gmail.com', 2147483647),
(15, 'ngentotretrrww', 'us223qq', 'Nurfan1234', 'intsetshu22@gmail.com', 2147483647),
(16, 'nurfan rahmat  berlian', 'Nurfan1234', 'Nurfann1234', 'intsetshu27@gmail.com', 2147483647),
(17, 'nurfan', 'nurfan1236', 'Nurfann1234', 'nurfanrahmat22@gmail.com', 2147483647),
(18, 'nurfan berlian', 'nurfan1230', 'Nurfann1234', 'nurfanrahmat22@gmail.com', 2147483647),
(19, 'nurfan berlian', 'nurfan123888', 'Nurfann1234', 'nurfanrahmat22@gmail.com', 2147483647),
(20, 'nurfan rahmat  berlian', 'nurfan', 'Nurfan1234', 'intsetshu27@gmail.com', 2147483647);

--
-- Indexes for dumped tables
--

--
-- Indeks untuk tabel `admin`
--
ALTER TABLE `admin`
  ADD PRIMARY KEY (`admin_id`);

--
-- Indeks untuk tabel `pembelian`
--
ALTER TABLE `pembelian`
  ADD PRIMARY KEY (`id_beli`);

--
-- Indeks untuk tabel `produk`
--
ALTER TABLE `produk`
  ADD PRIMARY KEY (`produk_id`);

--
-- Indeks untuk tabel `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`id_user`);

--
-- AUTO_INCREMENT untuk tabel yang dibuang
--

--
-- AUTO_INCREMENT untuk tabel `admin`
--
ALTER TABLE `admin`
  MODIFY `admin_id` int(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT untuk tabel `pembelian`
--
ALTER TABLE `pembelian`
  MODIFY `id_beli` int(12) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT untuk tabel `produk`
--
ALTER TABLE `produk`
  MODIFY `produk_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=23;

--
-- AUTO_INCREMENT untuk tabel `user`
--
ALTER TABLE `user`
  MODIFY `id_user` int(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=21;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
