-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Waktu pembuatan: 12 Bulan Mei 2022 pada 18.40
-- Versi server: 10.4.20-MariaDB
-- Versi PHP: 8.0.9

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `pelayanan_surat`
--

-- --------------------------------------------------------

--
-- Struktur dari tabel `detail_user`
--

CREATE TABLE `detail_user` (
  `id_detail_user` int(11) NOT NULL,
  `nomor_ktp` varchar(50) NOT NULL,
  `nama_lengkap` varchar(100) NOT NULL,
  `nip` varchar(100) NOT NULL,
  `nomor_telepon` varchar(20) NOT NULL,
  `alamat` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `detail_user`
--

INSERT INTO `detail_user` (`id_detail_user`, `nomor_ktp`, `nama_lengkap`, `nip`, `nomor_telepon`, `alamat`) VALUES
(1, '13769420', 'Arif Farinos', '66600999', '089507834430', 'Jl Padang'),
(2, '123123123', 'Budi Budis', '', '089507834430', 'Jl 123'),
(5, '123321', 'Kipli', '123123', '08116688224', 'Jl Padang');

-- --------------------------------------------------------

--
-- Struktur dari tabel `laporan_surat_izin`
--

CREATE TABLE `laporan_surat_izin` (
  `id_pengajuan_surat_izin` int(11) NOT NULL,
  `id_user` int(11) NOT NULL,
  `file_surat_izin` varchar(100) NOT NULL,
  `kategori_surat` varchar(100) NOT NULL,
  `keterangan` varchar(100) NOT NULL,
  `tanggall` date DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Struktur dari tabel `laporan_surat_rekomendasi`
--

CREATE TABLE `laporan_surat_rekomendasi` (
  `id_pengajuan_surat_rekomendasi` int(11) NOT NULL,
  `id_user` int(11) NOT NULL,
  `file_surat_rekomendasi` varchar(100) DEFAULT NULL,
  `kategori_surat` varchar(100) DEFAULT NULL,
  `keterangan` varchar(100) DEFAULT NULL,
  `tanggall` date DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Struktur dari tabel `pengajuan_surat_izin`
--

CREATE TABLE `pengajuan_surat_izin` (
  `id_pengajuan_surat_izin` int(11) NOT NULL,
  `id_user` int(11) NOT NULL,
  `ktp` varchar(100) NOT NULL,
  `kartu_keluarga` varchar(100) NOT NULL,
  `bukti_kepemilikan_tanah` varchar(100) NOT NULL,
  `denah_lokasi` varchar(100) NOT NULL,
  `rencana_bangunan` varchar(100) NOT NULL,
  `persetujuan_tetangga` varchar(100) NOT NULL,
  `pas_foto` varchar(100) NOT NULL,
  `lunas_pbb` varchar(100) NOT NULL,
  `biaya` int(11) NOT NULL,
  `surat_pengantar` varchar(100) NOT NULL,
  `formulir_surat` varchar(100) NOT NULL,
  `kategori_surat` varchar(100) NOT NULL,
  `status` varchar(50) NOT NULL,
  `tgl` varchar(25) NOT NULL,
  `tanggal` date DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Struktur dari tabel `pengajuan_surat_rekomendasi`
--

CREATE TABLE `pengajuan_surat_rekomendasi` (
  `id_pengajuan_surat_rekomendasi` int(11) NOT NULL,
  `id_user` int(11) NOT NULL,
  `surat_pengantar` varchar(100) NOT NULL,
  `kartu_keluarga` varchar(100) NOT NULL,
  `ktp` varchar(100) NOT NULL,
  `pas_foto` varchar(100) NOT NULL,
  `lunas_pbb` varchar(100) NOT NULL,
  `kategori_surat` varchar(100) NOT NULL,
  `tgl` varchar(25) NOT NULL,
  `tanggal` date DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Struktur dari tabel `surat_izin`
--

CREATE TABLE `surat_izin` (
  `id_surat_izin` int(11) NOT NULL,
  `syarat_surat` text NOT NULL,
  `kategori_surat` varchar(100) NOT NULL,
  `formulir_surat` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Struktur dari tabel `surat_rekomendasi`
--

CREATE TABLE `surat_rekomendasi` (
  `id_surat_rekomendasi` int(11) NOT NULL,
  `syarat_surat` text NOT NULL,
  `kategori_surat` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Struktur dari tabel `user`
--

CREATE TABLE `user` (
  `id_user` int(11) NOT NULL,
  `nomor_ktp` varchar(50) NOT NULL,
  `password` varchar(100) NOT NULL,
  `status` varchar(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `user`
--

INSERT INTO `user` (`id_user`, `nomor_ktp`, `password`, `status`) VALUES
(1, '13769420', '123', 'admin'),
(2, '123123123', '123', 'user'),
(8, '123321', '321', 'camat');

--
-- Indexes for dumped tables
--

--
-- Indeks untuk tabel `detail_user`
--
ALTER TABLE `detail_user`
  ADD PRIMARY KEY (`id_detail_user`),
  ADD KEY `nomor_ktp` (`nomor_ktp`);

--
-- Indeks untuk tabel `laporan_surat_izin`
--
ALTER TABLE `laporan_surat_izin`
  ADD PRIMARY KEY (`id_pengajuan_surat_izin`);

--
-- Indeks untuk tabel `laporan_surat_rekomendasi`
--
ALTER TABLE `laporan_surat_rekomendasi`
  ADD PRIMARY KEY (`id_pengajuan_surat_rekomendasi`);

--
-- Indeks untuk tabel `pengajuan_surat_izin`
--
ALTER TABLE `pengajuan_surat_izin`
  ADD PRIMARY KEY (`id_pengajuan_surat_izin`);

--
-- Indeks untuk tabel `pengajuan_surat_rekomendasi`
--
ALTER TABLE `pengajuan_surat_rekomendasi`
  ADD PRIMARY KEY (`id_pengajuan_surat_rekomendasi`);

--
-- Indeks untuk tabel `surat_izin`
--
ALTER TABLE `surat_izin`
  ADD PRIMARY KEY (`id_surat_izin`),
  ADD KEY `kategori_surat` (`kategori_surat`);

--
-- Indeks untuk tabel `surat_rekomendasi`
--
ALTER TABLE `surat_rekomendasi`
  ADD PRIMARY KEY (`id_surat_rekomendasi`),
  ADD KEY `kategori_surat` (`kategori_surat`);

--
-- Indeks untuk tabel `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`id_user`),
  ADD KEY `nomor_ktp` (`nomor_ktp`);

--
-- AUTO_INCREMENT untuk tabel yang dibuang
--

--
-- AUTO_INCREMENT untuk tabel `detail_user`
--
ALTER TABLE `detail_user`
  MODIFY `id_detail_user` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT untuk tabel `pengajuan_surat_izin`
--
ALTER TABLE `pengajuan_surat_izin`
  MODIFY `id_pengajuan_surat_izin` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT untuk tabel `pengajuan_surat_rekomendasi`
--
ALTER TABLE `pengajuan_surat_rekomendasi`
  MODIFY `id_pengajuan_surat_rekomendasi` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT untuk tabel `surat_izin`
--
ALTER TABLE `surat_izin`
  MODIFY `id_surat_izin` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT untuk tabel `surat_rekomendasi`
--
ALTER TABLE `surat_rekomendasi`
  MODIFY `id_surat_rekomendasi` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT untuk tabel `user`
--
ALTER TABLE `user`
  MODIFY `id_user` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
