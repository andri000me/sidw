-- phpMyAdmin SQL Dump
-- version 4.8.5
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Waktu pembuatan: 23 Jul 2019 pada 17.29
-- Versi server: 10.1.38-MariaDB
-- Versi PHP: 7.3.4

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `sidw`
--

-- --------------------------------------------------------

--
-- Struktur dari tabel `tbl_hak_akses`
--

CREATE TABLE `tbl_hak_akses` (
  `id` int(11) NOT NULL,
  `id_user_level` int(11) NOT NULL,
  `id_menu` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `tbl_hak_akses`
--

INSERT INTO `tbl_hak_akses` (`id`, `id_user_level`, `id_menu`) VALUES
(1, 1, 1),
(2, 1, 2),
(3, 1, 3),
(4, 1, 10),
(5, 1, 20),
(6, 1, 22),
(7, 1, 21);

-- --------------------------------------------------------

--
-- Struktur dari tabel `tbl_kartu_keluarga`
--

CREATE TABLE `tbl_kartu_keluarga` (
  `no_kk` varchar(16) NOT NULL,
  `nama_kepkel` varchar(50) NOT NULL,
  `alamat` text NOT NULL,
  `id_rt` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `tbl_kartu_keluarga`
--

INSERT INTO `tbl_kartu_keluarga` (`no_kk`, `nama_kepkel`, `alamat`, `id_rt`) VALUES
('3175100701091308', 'Heri Nopriadi', 'Jl Masjid Al Umar', 7),
('3175100701097038', 'Syarif Hidayat', 'JL Masjid Al Umar', 7);

-- --------------------------------------------------------

--
-- Struktur dari tabel `tbl_menu`
--

CREATE TABLE `tbl_menu` (
  `id_menu` int(11) NOT NULL,
  `title` varchar(50) NOT NULL,
  `url` varchar(30) NOT NULL,
  `icon` varchar(50) NOT NULL,
  `is_main_menu` int(11) NOT NULL,
  `is_aktif` enum('y','n') NOT NULL COMMENT 'y=yes,n=no'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `tbl_menu`
--

INSERT INTO `tbl_menu` (`id_menu`, `title`, `url`, `icon`, `is_main_menu`, `is_aktif`) VALUES
(1, 'Dashboard', 'dashboard', 'fas fa-fw fa-tachometer-alt', 0, 'y'),
(2, 'Data Warga', 'warga', 'fas fa-fw fa-id-card', 0, 'y'),
(3, 'Data Kepala Keluarga', 'kepalakeluarga', 'fas fa-fw fa-id-card-alt', 0, 'y'),
(10, 'Kelola Data RT', 'rukuntetangga', 'fas fa-fw fa-chalkboard-teacher', 0, 'y'),
(20, 'Kelola User', 'user', 'fas fa-fw fa-user-alt', 0, 'y'),
(21, 'Kelola Menu', 'kelolamenu', 'fas fa-fw fa-server', 0, 'y'),
(22, 'Level User', 'userlevel', 'fas fa-fw fa-users-cog', 0, 'y');

-- --------------------------------------------------------

--
-- Struktur dari tabel `tbl_rt`
--

CREATE TABLE `tbl_rt` (
  `id_rt` int(11) NOT NULL,
  `rt` varchar(6) NOT NULL,
  `nama_rt` varchar(50) NOT NULL,
  `no_hp` varchar(13) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `tbl_rt`
--

INSERT INTO `tbl_rt` (`id_rt`, `rt`, `nama_rt`, `no_hp`) VALUES
(1, 'RT 001', 'Ali Akbar', '08111558737'),
(2, 'RT 002', 'Budi Rahrajo', '08111558738'),
(3, 'RT 003', 'Cecep cahyadi', '08111558739'),
(4, 'RT 004', 'Dodi Darmadi', '08111558740'),
(5, 'RT 005', 'Eko Prima', '08111558741'),
(6, 'RT 006', 'Feri Lukman', '08111558742'),
(7, 'RT 007', 'Gatot Ginanjar', '08111558743'),
(8, 'RT 008', 'Hery Pramono', '08111558744');

-- --------------------------------------------------------

--
-- Struktur dari tabel `tbl_setting`
--

CREATE TABLE `tbl_setting` (
  `id_setting` int(11) NOT NULL,
  `nama_setting` varchar(50) NOT NULL,
  `value` varchar(40) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `tbl_setting`
--

INSERT INTO `tbl_setting` (`id_setting`, `nama_setting`, `value`) VALUES
(1, 'Tampil Menu', 'ya');

-- --------------------------------------------------------

--
-- Struktur dari tabel `tbl_user`
--

CREATE TABLE `tbl_user` (
  `id_users` int(11) NOT NULL,
  `full_name` varchar(50) NOT NULL,
  `username` varchar(128) NOT NULL,
  `email` varchar(50) NOT NULL,
  `password` varchar(255) NOT NULL,
  `images` text NOT NULL,
  `id_user_level` int(11) NOT NULL,
  `is_aktif` enum('y','n') NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `tbl_user`
--

INSERT INTO `tbl_user` (`id_users`, `full_name`, `username`, `email`, `password`, `images`, `id_user_level`, `is_aktif`) VALUES
(1, 'Indra basuki', 'indrabas', 'indrabasuki@gmail.com', '$2y$04$Wbyfv4xwihb..POfhxY5Y.jHOJqEFIG3dLfBYwAmnOACpH0EWCCdq', 'atomix_user31.png', 1, 'y'),
(3, 'Adit', 'adit', 'adit@gmail.com', '$2y$04$Wbyfv4xwihb..POfhxY5Y.jHOJqEFIG3dLfBYwAmnOACpH0EWCCdq', '7.png', 2, 'y'),
(7, 'anisa Mutiara Oktafia', 'anisa', 'Anisamutiara@gmail.com', '$2y$04$oic1L4Kh/4bp.B3pfXnA4Oe2kCSWn8ZvLIOzFDlFBQqvO2hfPRnHe', '', 3, 'y');

-- --------------------------------------------------------

--
-- Struktur dari tabel `tbl_user_level`
--

CREATE TABLE `tbl_user_level` (
  `id_user_level` int(11) NOT NULL,
  `nama_level` varchar(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `tbl_user_level`
--

INSERT INTO `tbl_user_level` (`id_user_level`, `nama_level`) VALUES
(1, 'Admin'),
(2, 'Ketua RW'),
(3, 'Ketua RT');

-- --------------------------------------------------------

--
-- Struktur dari tabel `tbl_warga`
--

CREATE TABLE `tbl_warga` (
  `no_kk` varchar(16) NOT NULL,
  `nik` varchar(16) NOT NULL,
  `id_rt` int(11) NOT NULL,
  `nama` varchar(50) NOT NULL,
  `tempat_lahir` varchar(50) NOT NULL,
  `tanggal_lahir` date NOT NULL,
  `jenis_kelamin` enum('laki-laki','perempuan','','') NOT NULL,
  `pendidikan` enum('tidak sekolah','SD','SMP','SMA','Diploma','S1','S2','S3') NOT NULL,
  `pekerjaan` varchar(50) NOT NULL,
  `status_kawin` enum('kawin','belum kawin','','') NOT NULL,
  `status_keluarga` enum('Kepala keluarga','Istri','Anak','') NOT NULL,
  `nama_ayah` varchar(50) NOT NULL,
  `nama_ibu` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `tbl_warga`
--

INSERT INTO `tbl_warga` (`no_kk`, `nik`, `id_rt`, `nama`, `tempat_lahir`, `tanggal_lahir`, `jenis_kelamin`, `pendidikan`, `pekerjaan`, `status_kawin`, `status_keluarga`, `nama_ayah`, `nama_ibu`) VALUES
('3175100701097038', '3175101603700004', 7, 'Syarif Hidayat', 'Jakarta', '1970-03-16', 'laki-laki', 'SMA', 'Karyawan Swasta', 'kawin', 'Kepala keluarga', 'Abdullah', 'Endjum'),
('3175100701097038', '3175104706770008', 7, 'Nina Anda Yanih', 'Jakarta', '1977-06-07', 'perempuan', 'SMA', 'Mengurus Rumah Tangga', 'kawin', 'Istri', 'Edy Abdullah', 'Maryati');

--
-- Indexes for dumped tables
--

--
-- Indeks untuk tabel `tbl_hak_akses`
--
ALTER TABLE `tbl_hak_akses`
  ADD PRIMARY KEY (`id`),
  ADD KEY `id_user_level` (`id_user_level`),
  ADD KEY `id_menu` (`id_menu`);

--
-- Indeks untuk tabel `tbl_kartu_keluarga`
--
ALTER TABLE `tbl_kartu_keluarga`
  ADD PRIMARY KEY (`no_kk`),
  ADD KEY `id_rt` (`id_rt`);

--
-- Indeks untuk tabel `tbl_menu`
--
ALTER TABLE `tbl_menu`
  ADD PRIMARY KEY (`id_menu`);

--
-- Indeks untuk tabel `tbl_rt`
--
ALTER TABLE `tbl_rt`
  ADD PRIMARY KEY (`id_rt`);

--
-- Indeks untuk tabel `tbl_setting`
--
ALTER TABLE `tbl_setting`
  ADD PRIMARY KEY (`id_setting`);

--
-- Indeks untuk tabel `tbl_user`
--
ALTER TABLE `tbl_user`
  ADD PRIMARY KEY (`id_users`),
  ADD KEY `id_user_level` (`id_user_level`);

--
-- Indeks untuk tabel `tbl_user_level`
--
ALTER TABLE `tbl_user_level`
  ADD PRIMARY KEY (`id_user_level`);

--
-- Indeks untuk tabel `tbl_warga`
--
ALTER TABLE `tbl_warga`
  ADD PRIMARY KEY (`nik`),
  ADD KEY `id_rt` (`id_rt`),
  ADD KEY `no_kk` (`no_kk`);

--
-- AUTO_INCREMENT untuk tabel yang dibuang
--

--
-- AUTO_INCREMENT untuk tabel `tbl_hak_akses`
--
ALTER TABLE `tbl_hak_akses`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT untuk tabel `tbl_menu`
--
ALTER TABLE `tbl_menu`
  MODIFY `id_menu` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=23;

--
-- AUTO_INCREMENT untuk tabel `tbl_setting`
--
ALTER TABLE `tbl_setting`
  MODIFY `id_setting` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT untuk tabel `tbl_user`
--
ALTER TABLE `tbl_user`
  MODIFY `id_users` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT untuk tabel `tbl_user_level`
--
ALTER TABLE `tbl_user_level`
  MODIFY `id_user_level` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- Ketidakleluasaan untuk tabel pelimpahan (Dumped Tables)
--

--
-- Ketidakleluasaan untuk tabel `tbl_hak_akses`
--
ALTER TABLE `tbl_hak_akses`
  ADD CONSTRAINT `tbl_hak_akses_ibfk_1` FOREIGN KEY (`id_user_level`) REFERENCES `tbl_user_level` (`id_user_level`),
  ADD CONSTRAINT `tbl_hak_akses_ibfk_2` FOREIGN KEY (`id_menu`) REFERENCES `tbl_menu` (`id_menu`);

--
-- Ketidakleluasaan untuk tabel `tbl_kartu_keluarga`
--
ALTER TABLE `tbl_kartu_keluarga`
  ADD CONSTRAINT `tbl_kartu_keluarga_ibfk_1` FOREIGN KEY (`id_rt`) REFERENCES `tbl_rt` (`id_rt`);

--
-- Ketidakleluasaan untuk tabel `tbl_user`
--
ALTER TABLE `tbl_user`
  ADD CONSTRAINT `tbl_user_ibfk_1` FOREIGN KEY (`id_user_level`) REFERENCES `tbl_user_level` (`id_user_level`);

--
-- Ketidakleluasaan untuk tabel `tbl_warga`
--
ALTER TABLE `tbl_warga`
  ADD CONSTRAINT `tbl_warga_ibfk_1` FOREIGN KEY (`no_kk`) REFERENCES `tbl_kartu_keluarga` (`no_kk`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `tbl_warga_ibfk_2` FOREIGN KEY (`id_rt`) REFERENCES `tbl_rt` (`id_rt`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
