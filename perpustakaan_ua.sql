-- phpMyAdmin SQL Dump
-- version 5.0.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Waktu pembuatan: 28 Sep 2023 pada 12.46
-- Versi server: 10.4.14-MariaDB
-- Versi PHP: 7.4.10

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `perpustakaan_ua`
--

-- --------------------------------------------------------

--
-- Struktur dari tabel `anggota`
--

CREATE TABLE `anggota` (
  `id_anggota` varchar(50) NOT NULL,
  `nis` varchar(50) NOT NULL,
  `nama` varchar(50) NOT NULL,
  `kelas` varchar(50) NOT NULL,
  `tgl_lahir` date NOT NULL,
  `jenkel` varchar(50) NOT NULL,
  `alamat` text NOT NULL,
  `no_hp` varchar(50) NOT NULL,
  `email` varchar(50) NOT NULL,
  `username` varchar(50) NOT NULL,
  `password` varchar(50) NOT NULL,
  `foto_anggota` varchar(2000) NOT NULL,
  `level` varchar(50) NOT NULL,
  `IsActive` int(1) NOT NULL,
  `tgl_gabung` date NOT NULL DEFAULT current_timestamp(),
  `tgl_terakhir_ubah` date NOT NULL,
  `qr_ang` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `anggota`
--

INSERT INTO `anggota` (`id_anggota`, `nis`, `nama`, `kelas`, `tgl_lahir`, `jenkel`, `alamat`, `no_hp`, `email`, `username`, `password`, `foto_anggota`, `level`, `IsActive`, `tgl_gabung`, `tgl_terakhir_ubah`, `qr_ang`) VALUES
('AG00001', '1111111123', 'Ismail Adji Nugroho', 'VI ', '2000-03-18', 'Laki-laki', 'Bantul', '08****', 'ismailadji18@gmail.com', 'ismail adji', '63f0a41fcda20d4aff90a49f596acc39', 'user-icon-jpg-17.jpg', 'Siswa', 2, '2023-03-16', '2023-07-22', ''),
('AG00002', '11111', 'Bambang p', 'Mariam', '2023-03-01', 'Laki-laki', 'Bantul', '08****', 'bambang@gmail.com', 'admin', '21232f297a57a5a743894a0e4a801fc3', 'user-icon-jpg-171.jpg', 'Administrator', 1, '2023-03-18', '2023-05-10', ''),
('AG00003', '129835', 'Yoyo yo', 'Hawa', '2023-03-03', 'Perempuan', 'Sewon', '08****', 'yoyo@gmail.com', 'yoyo', '77e69c137812518e359196bb2f5e9bb9', 'user-icon-jpg-172.jpg', 'Guru', 2, '2023-03-18', '0000-00-00', ''),
('AG00004', '11111', 'Wawan', 'Fatimah', '2002-05-15', 'Laki-laki', 'Pandak', '08****', 'wawan@gmail.com', 'wawan', 'ec6a6536ca304edf844d1d248a4f08dc', 'user-icon-jpg-173.jpg', 'Administrator', 2, '2023-03-23', '2023-03-25', ''),
('AG00005', '1238183', 'Wulan J', 'Guru Bahasa Indonesia', '2023-03-01', 'Perempuan', 'Bantuk', '08****', 'wulan@gmail.com', 'wulan', '7363a0d0604902af7b70b271a0b96480', 'user-icon-jpg-174.jpg', 'Guru', 0, '2023-03-25', '2023-05-01', ''),
('AG00007', '0000012', 'Supri Yanto', 'Guru Olahraga', '1981-03-11', 'Laki-laki', 'Bantul', '08****', 'supri123@gmail.com', 'supri', '5badb16272527859ca8ec41dba46ec34', 'user-icon-jpg-176.jpg', 'Guru', 1, '2023-06-02', '0000-00-00', '');

-- --------------------------------------------------------

--
-- Struktur dari tabel `buku`
--

CREATE TABLE `buku` (
  `id_buku` varchar(50) NOT NULL,
  `judul_buku` varchar(50) NOT NULL,
  `isbn` varchar(50) NOT NULL,
  `id_kategori` varchar(50) NOT NULL,
  `id_rak` varchar(50) NOT NULL,
  `pengarang` varchar(50) NOT NULL,
  `penerbit` varchar(50) DEFAULT NULL,
  `tahun_terbit` int(50) DEFAULT NULL,
  `jumlah_buku` int(50) DEFAULT NULL,
  `tanggal_masuk` date NOT NULL,
  `tanggal_berubah` date NOT NULL,
  `gambar_buku` varchar(50) DEFAULT NULL,
  `qr_code` varchar(50) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `buku`
--

INSERT INTO `buku` (`id_buku`, `judul_buku`, `isbn`, `id_kategori`, `id_rak`, `pengarang`, `penerbit`, `tahun_terbit`, `jumlah_buku`, `tanggal_masuk`, `tanggal_berubah`, `gambar_buku`, `qr_code`) VALUES
('BK00001', 'Bahasa Indonesia', '81273918', 'Buku Paket', 'Buku Paket', 'Sayuti', 'Ganesa', 2020, 3, '2023-07-17', '2023-09-04', 'kertas.jpg', NULL),
('BK00002', 'Sang Kancil', '12312424', 'Cerita Anak', 'Referensi', 'Budi man', 'Surnya', 2008, 0, '2023-07-17', '2023-09-04', 'kertas1.jpg', NULL),
('BK00003', 'Jurnal Informatika', '1231238', 'Jurnal', 'Referensi', 'Budo', 'uad', 2014, 1, '2023-07-17', '0000-00-00', 'kertas2.jpg', NULL);

-- --------------------------------------------------------

--
-- Struktur dari tabel `denda`
--

CREATE TABLE `denda` (
  `id_denda` int(11) NOT NULL,
  `id_anggota` varchar(50) NOT NULL,
  `nama_anggota` varchar(50) NOT NULL,
  `denda` varchar(50) NOT NULL,
  `lama_waktu` varchar(50) NOT NULL,
  `tanggal_denda` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Struktur dari tabel `detail_peminjaman`
--

CREATE TABLE `detail_peminjaman` (
  `id_detail_peminjaman` int(11) NOT NULL,
  `id_peminjaman` varchar(100) NOT NULL,
  `id_buku` varchar(100) NOT NULL,
  `judul_buku` varchar(100) NOT NULL,
  `pengarang` varchar(100) NOT NULL,
  `penerbit` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Struktur dari tabel `kategori`
--

CREATE TABLE `kategori` (
  `id_kategori` varchar(11) NOT NULL,
  `nama_kategori` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `kategori`
--

INSERT INTO `kategori` (`id_kategori`, `nama_kategori`) VALUES
('KT002', 'Novel'),
('KT004', 'Cerita Anak'),
('KT005', 'Jurnal'),
('KT006', 'Modul'),
('KT007', 'Komik'),
('KT008', 'Buku Paket');

-- --------------------------------------------------------

--
-- Struktur dari tabel `peminjaman`
--

CREATE TABLE `peminjaman` (
  `id_peminjaman` varchar(50) NOT NULL,
  `id_anggota` varchar(50) NOT NULL,
  `id_buku` varchar(100) NOT NULL,
  `judul_buku` varchar(100) NOT NULL,
  `pengarang` varchar(100) NOT NULL,
  `penerbit` varchar(100) NOT NULL,
  `tanggal_pinjam` date NOT NULL,
  `tanggal_kembali` date NOT NULL,
  `jumlah_pinjam` int(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `peminjaman`
--

INSERT INTO `peminjaman` (`id_peminjaman`, `id_anggota`, `id_buku`, `judul_buku`, `pengarang`, `penerbit`, `tanggal_pinjam`, `tanggal_kembali`, `jumlah_pinjam`) VALUES
('PM00001', 'Yoyo yo', 'BK00002', 'Sang Kancil', '', '', '2023-07-29', '2023-08-12', 0),
('PM00002', 'Ismail Adji Nugroho', 'BK00002', 'Sang Kancil', 'Budi man', 'Surnya', '2023-09-26', '2023-10-10', 0),
('PM00003', 'Bambang p', 'BK00002', 'Sang Kancil', 'Budi man', 'Surnya', '2023-09-26', '2023-10-10', 0);

--
-- Trigger `peminjaman`
--
DELIMITER $$
CREATE TRIGGER `jml_after_pinjam` AFTER INSERT ON `peminjaman` FOR EACH ROW UPDATE buku SET jumlah_buku = jumlah_buku - NEW.jumlah_pinjam WHERE judul_buku = NEW.id_buku
$$
DELIMITER ;

-- --------------------------------------------------------

--
-- Struktur dari tabel `pengembalian`
--

CREATE TABLE `pengembalian` (
  `id_pengembalian` int(11) NOT NULL,
  `id_anggota` varchar(50) NOT NULL,
  `id_buku` varchar(50) NOT NULL,
  `tanggal_pinjam` date NOT NULL,
  `tanggal_kembali` date NOT NULL,
  `jumlah_pinjam` varchar(50) NOT NULL,
  `tanggal_kembalikan` date NOT NULL,
  `denda` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `pengembalian`
--

INSERT INTO `pengembalian` (`id_pengembalian`, `id_anggota`, `id_buku`, `tanggal_pinjam`, `tanggal_kembali`, `jumlah_pinjam`, `tanggal_kembalikan`, `denda`) VALUES
(7, 'AG00001', 'BK00001', '2023-07-25', '2023-08-08', '0', '2023-07-25', ''),
(8, 'AG00001', 'BK00001', '2023-07-22', '2023-08-05', '0', '2023-07-27', ''),
(21, 'AG00001', 'BK00001', '2023-09-15', '2023-09-29', '', '2023-09-15', ''),
(33, 'AG00002', 'BK00001', '2023-09-27', '2023-10-11', '', '2023-09-27', ''),
(34, 'AG00001', 'BK00001', '2023-09-27', '2023-10-11', '', '2023-09-27', ''),
(35, 'AG00001', 'BK00001', '2023-09-28', '2023-10-12', '', '2023-09-28', '');

-- --------------------------------------------------------

--
-- Struktur dari tabel `pengunjung`
--

CREATE TABLE `pengunjung` (
  `id_pengunjung` int(11) NOT NULL,
  `tanggal_kunjung` date NOT NULL,
  `nama` varchar(50) NOT NULL,
  `kelas` varchar(50) NOT NULL,
  `keperluan` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `pengunjung`
--

INSERT INTO `pengunjung` (`id_pengunjung`, `tanggal_kunjung`, `nama`, `kelas`, `keperluan`) VALUES
(1, '2023-06-30', 'Ismail Adji Nugroho', 'Mariam', 'pinjam'),
(19, '2023-06-30', 'Bambang p', 'Guru Bahasa Indonesia', 'pinjam buku'),
(20, '2023-07-01', 'Yoyo yo', 'Hawa', ''),
(85, '2023-07-16', 'Ismail Adji Nugroho', 'VI ', 'pinjam'),
(87, '2023-07-16', 'Ismail Adji Nugroho', 'VI ', 'berkunjung'),
(93, '2023-07-20', 'Bambang p', 'Mariam', 'berkunjung'),
(94, '2023-08-15', 'Ismail Adji Nugroho', 'VI ', 'berkunjung');

-- --------------------------------------------------------

--
-- Struktur dari tabel `profil`
--

CREATE TABLE `profil` (
  `id_profil` int(11) NOT NULL,
  `visi` varchar(50) NOT NULL,
  `misi` varchar(50) NOT NULL,
  `gambar_profil` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Struktur dari tabel `profil_perpus_ua`
--

CREATE TABLE `profil_perpus_ua` (
  `id_profil_perpus` int(11) NOT NULL,
  `visi` varchar(100) NOT NULL,
  `misi` varchar(100) NOT NULL,
  `alamat_smp` text NOT NULL,
  `email_smp` varchar(50) NOT NULL,
  `no_tlp_smp` varchar(50) NOT NULL,
  `nama_apk` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `profil_perpus_ua`
--

INSERT INTO `profil_perpus_ua` (`id_profil_perpus`, `visi`, `misi`, `alamat_smp`, `email_smp`, `no_tlp_smp`, `nama_apk`) VALUES
(1, 'ada', 'ada', 'Jl. Ir. Juanda Bantul Timur Bantul Trirenggo Bantul', 'smpunggulanaisyiyahbantul@gmail.com', '0274368423', 'Perpus SMP UA');

-- --------------------------------------------------------

--
-- Struktur dari tabel `qr_code`
--

CREATE TABLE `qr_code` (
  `id` int(11) NOT NULL,
  `qr_code` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Struktur dari tabel `rak`
--

CREATE TABLE `rak` (
  `id_rak` varchar(50) NOT NULL,
  `nama_rak` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `rak`
--

INSERT INTO `rak` (`id_rak`, `nama_rak`) VALUES
('R001', 'Buku Paket'),
('R002', 'Referensi'),
('R003', 'Agama'),
('R004', 'Ilmu Sosial'),
('R005', 'Bahasa'),
('R006', 'Ilmu Alam dan Biologi'),
('R010', 'Sejarah dan Geografi'),
('R07', 'Teknologi'),
('R08', 'Olahraga dan Seni'),
('R09', 'Sastra');

-- --------------------------------------------------------

--
-- Struktur dari tabel `tbl_biaya_denda`
--

CREATE TABLE `tbl_biaya_denda` (
  `id_denda` int(11) NOT NULL,
  `rp_denda` int(50) NOT NULL,
  `status` varchar(50) NOT NULL,
  `mulai_tgl` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `tbl_biaya_denda`
--

INSERT INTO `tbl_biaya_denda` (`id_denda`, `rp_denda`, `status`, `mulai_tgl`) VALUES
(1, 2000, '', '0000-00-00'),
(14, 4000, '', '0000-00-00'),
(16, 3000, '', '0000-00-00');

-- --------------------------------------------------------

--
-- Struktur dari tabel `tbl_lampiran`
--

CREATE TABLE `tbl_lampiran` (
  `id_lampiran` varchar(50) NOT NULL,
  `lampiran_buku` varchar(100) NOT NULL,
  `tgl_masuk` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `tbl_lampiran`
--

INSERT INTO `tbl_lampiran` (`id_lampiran`, `lampiran_buku`, `tgl_masuk`) VALUES
('LP001', 'SOAL_TOEFL_UAD_2020.pdf', '2023-05-08'),
('LP002', '_DIVST~1.PDF', '2023-05-08');

-- --------------------------------------------------------

--
-- Struktur dari tabel `tbl_level`
--

CREATE TABLE `tbl_level` (
  `id_level` int(11) NOT NULL,
  `level` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `tbl_level`
--

INSERT INTO `tbl_level` (`id_level`, `level`) VALUES
(1, 'administrator'),
(2, 'anggota'),
(3, 'guru');

-- --------------------------------------------------------

--
-- Struktur dari tabel `tb_login`
--

CREATE TABLE `tb_login` (
  `id_login` int(11) NOT NULL,
  `id_anggota` varchar(50) NOT NULL,
  `nis` varchar(50) NOT NULL,
  `nama` varchar(50) NOT NULL,
  `kelas` varchar(50) NOT NULL,
  `tgl_lahir` date NOT NULL,
  `jenkel` varchar(50) NOT NULL,
  `alamat` text NOT NULL,
  `no_hp` varchar(50) NOT NULL,
  `email` varchar(50) NOT NULL,
  `username` varchar(50) NOT NULL,
  `password` varchar(50) NOT NULL,
  `foto_anggota` varchar(2000) NOT NULL,
  `no` varchar(50) NOT NULL,
  `level` varchar(50) NOT NULL,
  `IsActive` int(11) NOT NULL,
  `tgl_gabung` date NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `tb_login`
--

INSERT INTO `tb_login` (`id_login`, `id_anggota`, `nis`, `nama`, `kelas`, `tgl_lahir`, `jenkel`, `alamat`, `no_hp`, `email`, `username`, `password`, `foto_anggota`, `no`, `level`, `IsActive`, `tgl_gabung`) VALUES
(3, 'AG001', '180009123', 'Ismail Adji Nugroho', 'Fatimah', '2023-03-10', 'Laki-laki', 'Bantul', '08****', 'ismailadji18@gmail.com', 'admin', '202cb962ac59075b964b07152d234b70', 'aku.jpg', '', 'administrator', 1, '2008-03-23');

--
-- Indexes for dumped tables
--

--
-- Indeks untuk tabel `anggota`
--
ALTER TABLE `anggota`
  ADD PRIMARY KEY (`id_anggota`);

--
-- Indeks untuk tabel `buku`
--
ALTER TABLE `buku`
  ADD PRIMARY KEY (`id_buku`);

--
-- Indeks untuk tabel `denda`
--
ALTER TABLE `denda`
  ADD PRIMARY KEY (`id_denda`);

--
-- Indeks untuk tabel `detail_peminjaman`
--
ALTER TABLE `detail_peminjaman`
  ADD PRIMARY KEY (`id_detail_peminjaman`);

--
-- Indeks untuk tabel `kategori`
--
ALTER TABLE `kategori`
  ADD PRIMARY KEY (`id_kategori`);

--
-- Indeks untuk tabel `peminjaman`
--
ALTER TABLE `peminjaman`
  ADD PRIMARY KEY (`id_peminjaman`);

--
-- Indeks untuk tabel `pengembalian`
--
ALTER TABLE `pengembalian`
  ADD PRIMARY KEY (`id_pengembalian`);

--
-- Indeks untuk tabel `pengunjung`
--
ALTER TABLE `pengunjung`
  ADD PRIMARY KEY (`id_pengunjung`);

--
-- Indeks untuk tabel `profil`
--
ALTER TABLE `profil`
  ADD PRIMARY KEY (`id_profil`);

--
-- Indeks untuk tabel `profil_perpus_ua`
--
ALTER TABLE `profil_perpus_ua`
  ADD PRIMARY KEY (`id_profil_perpus`);

--
-- Indeks untuk tabel `qr_code`
--
ALTER TABLE `qr_code`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `rak`
--
ALTER TABLE `rak`
  ADD PRIMARY KEY (`id_rak`);

--
-- Indeks untuk tabel `tbl_biaya_denda`
--
ALTER TABLE `tbl_biaya_denda`
  ADD PRIMARY KEY (`id_denda`);

--
-- Indeks untuk tabel `tbl_lampiran`
--
ALTER TABLE `tbl_lampiran`
  ADD PRIMARY KEY (`id_lampiran`);

--
-- Indeks untuk tabel `tbl_level`
--
ALTER TABLE `tbl_level`
  ADD PRIMARY KEY (`id_level`);

--
-- Indeks untuk tabel `tb_login`
--
ALTER TABLE `tb_login`
  ADD PRIMARY KEY (`id_login`);

--
-- AUTO_INCREMENT untuk tabel yang dibuang
--

--
-- AUTO_INCREMENT untuk tabel `denda`
--
ALTER TABLE `denda`
  MODIFY `id_denda` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT untuk tabel `detail_peminjaman`
--
ALTER TABLE `detail_peminjaman`
  MODIFY `id_detail_peminjaman` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT untuk tabel `pengembalian`
--
ALTER TABLE `pengembalian`
  MODIFY `id_pengembalian` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=36;

--
-- AUTO_INCREMENT untuk tabel `pengunjung`
--
ALTER TABLE `pengunjung`
  MODIFY `id_pengunjung` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=95;

--
-- AUTO_INCREMENT untuk tabel `profil`
--
ALTER TABLE `profil`
  MODIFY `id_profil` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT untuk tabel `profil_perpus_ua`
--
ALTER TABLE `profil_perpus_ua`
  MODIFY `id_profil_perpus` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT untuk tabel `qr_code`
--
ALTER TABLE `qr_code`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT untuk tabel `tbl_biaya_denda`
--
ALTER TABLE `tbl_biaya_denda`
  MODIFY `id_denda` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=19;

--
-- AUTO_INCREMENT untuk tabel `tbl_level`
--
ALTER TABLE `tbl_level`
  MODIFY `id_level` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT untuk tabel `tb_login`
--
ALTER TABLE `tb_login`
  MODIFY `id_login` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
