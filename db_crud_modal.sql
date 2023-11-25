-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Waktu pembuatan: 25 Nov 2023 pada 07.36
-- Versi server: 10.4.28-MariaDB
-- Versi PHP: 8.1.17

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `db_crud_modal`
--

-- --------------------------------------------------------

--
-- Struktur dari tabel `tguru`
--

CREATE TABLE `tguru` (
  `id_guru` int(11) NOT NULL,
  `nip` varchar(11) NOT NULL,
  `nama` varchar(150) NOT NULL,
  `jenis_kelamin` varchar(11) NOT NULL,
  `alamat` varchar(150) NOT NULL,
  `nohp` varchar(12) NOT NULL,
  `foto` varchar(150) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data untuk tabel `tguru`
--

INSERT INTO `tguru` (`id_guru`, `nip`, `nama`, `jenis_kelamin`, `alamat`, `nohp`, `foto`) VALUES
(7, '3456733221', 'Dana Sutomo', 'Laki-laki', 'Jember-Umbulrejo', '087756431122', 'robo3.png'),
(8, '9918326433', 'Cindy Syntia', 'Perempuan', 'Jember-Umbulsari', '081122661822', 'robo2.png'),
(9, '5566778899', 'Yanto Setiawan', 'Laki-laki', 'Jember-Paleran', '085510204080', 'robo.jpg'),
(10, '1133557799', 'Ryan Prasetyo', 'Laki-laki', 'Jember-Curah Sawah', '086655442211', 'robo3.png'),
(11, '4455667788', 'Wanti Zanar', 'Perempuan', 'Jember-Gambirono', '087744553222', 'robo3.png');

-- --------------------------------------------------------

--
-- Struktur dari tabel `tsiswa`
--

CREATE TABLE `tsiswa` (
  `id_siswa` int(11) NOT NULL,
  `nisn` varchar(11) NOT NULL,
  `nama` varchar(150) NOT NULL,
  `jenis_kelamin` varchar(11) NOT NULL,
  `alamat` varchar(150) NOT NULL,
  `kelas` varchar(11) NOT NULL,
  `jurusan` varchar(50) NOT NULL,
  `id_guru` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data untuk tabel `tsiswa`
--

INSERT INTO `tsiswa` (`id_siswa`, `nisn`, `nama`, `jenis_kelamin`, `alamat`, `kelas`, `jurusan`, `id_guru`) VALUES
(12, '1234567890', 'Mocha Zaki', 'Laki-laki', 'Jember-Paleran', 'XI(11)', 'RPL - Rekayasa Perangkat Lunak', 9),
(13, '0987654321', 'Feren Prasetya', 'Laki-laki', 'Jember-Umbulsari', 'X(10)', 'DKV - Desain Komunikasi Visual', 10),
(14, '2233445566', 'Fajar Awan', 'Laki-laki', 'Jember-Umbulsari', 'XII(12)', 'TKJ - Teknik Komputer & jaringan', 10),
(15, '7788669955', 'Guido Hariyanto', 'Laki-laki', 'Jember-Umbulrejo', 'X(10)', 'ATP - Agribisnis Tanaman Perkebunan', 7),
(16, '2255778899', 'Chantika Sari', 'Perempuan', 'Jember-Gambirono', 'XII(12)', 'DKV - Desain Komunikasi Visual', 10);

--
-- Indexes for dumped tables
--

--
-- Indeks untuk tabel `tguru`
--
ALTER TABLE `tguru`
  ADD PRIMARY KEY (`id_guru`);

--
-- Indeks untuk tabel `tsiswa`
--
ALTER TABLE `tsiswa`
  ADD PRIMARY KEY (`id_siswa`),
  ADD KEY `walikelas` (`id_guru`),
  ADD KEY `id_guru` (`id_guru`);

--
-- AUTO_INCREMENT untuk tabel yang dibuang
--

--
-- AUTO_INCREMENT untuk tabel `tguru`
--
ALTER TABLE `tguru`
  MODIFY `id_guru` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT untuk tabel `tsiswa`
--
ALTER TABLE `tsiswa`
  MODIFY `id_siswa` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;

--
-- Ketidakleluasaan untuk tabel pelimpahan (Dumped Tables)
--

--
-- Ketidakleluasaan untuk tabel `tsiswa`
--
ALTER TABLE `tsiswa`
  ADD CONSTRAINT `ujian` FOREIGN KEY (`id_guru`) REFERENCES `tguru` (`id_guru`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
