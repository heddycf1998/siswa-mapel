-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Waktu pembuatan: 15 Jul 2026 pada 11.31
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
-- Database: `db_siswa`
--

-- --------------------------------------------------------

--
-- Struktur dari tabel `mapel`
--

CREATE TABLE `mapel` (
  `id_mapel` int(11) NOT NULL,
  `nama` varchar(50) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data untuk tabel `mapel`
--

INSERT INTO `mapel` (`id_mapel`, `nama`) VALUES
(5, 'Inggris'),
(6, 'Matematika'),
(7, 'Bahasa Inggris'),
(9, 'Ilmu Pengetahuan Sosial'),
(12, 'Ilmu Pengetahuan Alam'),
(13, 'Pendidikan Agama Islam'),
(21, 'Hoyoverse'),
(34, 'Bahasa Sunda'),
(50, 'Minum'),
(53, 'Singer'),
(61, 'Aljabar'),
(62, 'Bahasa Jepang          '),
(63, 'Bahasa Belanda'),
(64, 'Bahasa Jerman'),
(65, 'Coding'),
(66, 'Makan'),
(73, 'Bercerita'),
(75, 'Berhitung'),
(79, 'Menerjemahkan'),
(90, 'Matematika Peminatan');

-- --------------------------------------------------------

--
-- Struktur dari tabel `siswa`
--

CREATE TABLE `siswa` (
  `id` int(11) NOT NULL,
  `nis` varchar(20) DEFAULT NULL,
  `nama` varchar(100) DEFAULT NULL,
  `umur` int(11) DEFAULT NULL,
  `alamat` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data untuk tabel `siswa`
--

INSERT INTO `siswa` (`id`, `nis`, `nama`, `umur`, `alamat`) VALUES
(44, '10116309', 'Hey Hey', 29, 'Jepang'),
(46, '10116310', 'Andy fenry', 18, 'cimahi'),
(47, '10116301', 'Gentar', 18, 'cimahi'),
(48, '10116302', 'Henhen', 18, 'cimahi'),
(50, '10116303', 'andy jen', 18, 'cimahi'),
(51, '10116304', 'andy ken', 18, 'cimahi'),
(52, '10116308', 'andy len', 18, 'cimahi'),
(70, '10116329', 'Hayo Loh', 39, 'Birhingham Inggris Benua Eropa'),
(311, '10116315', 'Tom & Jerry', 21, 'Norway'),
(319, '10116316', 'dada', 23, 'sasa'),
(320, '10116317', 'mamak', 32, 'bandung'),
(322, '10116319', 'bamal', 34, 'cimahi'),
(323, '10116320', 'andy centik', 18, 'cimahi'),
(324, '10116321', 'nan', 100, 'One Piece'),
(330, '10116324', 'Bambank', 33, 'Bandung'),
(336, '10116325', 'Lauma', 24, 'Nod Krai'),
(339, '10116327', 'Mas Bambang', 38, 'Jogja'),
(340, '10116328', 'Mogamoga', 38, 'Aceh'),
(343, '10116300', 'Kimchi', 29, 'Jepang'),
(346, '10116331', 'Satu Dua', 23, 'Indonesia');

-- --------------------------------------------------------

--
-- Struktur dari tabel `siswa_mapel`
--

CREATE TABLE `siswa_mapel` (
  `id` int(11) NOT NULL,
  `id_siswa` int(11) DEFAULT NULL,
  `id_mapel` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data untuk tabel `siswa_mapel`
--

INSERT INTO `siswa_mapel` (`id`, `id_siswa`, `id_mapel`) VALUES
(187, 319, 5),
(188, 320, 6),
(189, 320, 7),
(190, 320, 9),
(191, 320, 12),
(192, 320, 13),
(193, 322, 6),
(194, 322, 7),
(195, 322, 12),
(198, 324, 6),
(238, 311, 7),
(239, 47, 5),
(240, 47, 6),
(241, 47, 7),
(242, 47, 9),
(243, 47, 12),
(244, 47, 13),
(245, 47, 21),
(284, 336, 7),
(285, 336, 9),
(286, 336, 21),
(298, 339, 5),
(299, 339, 13),
(300, 339, 21),
(302, 340, 5),
(303, 340, 6),
(304, 340, 7),
(305, 340, 9),
(321, 48, 5),
(322, 48, 6),
(323, 48, 7),
(324, 48, 9),
(325, 48, 12),
(358, 51, 5),
(359, 51, 7),
(360, 51, 13),
(361, 51, 21),
(362, 51, 34),
(363, 50, 7),
(364, 50, 9),
(365, 50, 12),
(366, 50, 13),
(367, 50, 21),
(368, 52, 6),
(443, 46, 13),
(468, 70, 6),
(469, 70, 9),
(470, 70, 13),
(471, 44, 6),
(472, 44, 7),
(473, 44, 9),
(474, 44, 21),
(475, 44, 34),
(476, 44, 64);

-- --------------------------------------------------------

--
-- Struktur dari tabel `user`
--

CREATE TABLE `user` (
  `id` int(11) NOT NULL,
  `username` varchar(50) NOT NULL,
  `password` varchar(255) NOT NULL,
  `role` enum('admin','guru','siswa') NOT NULL,
  `id_siswa` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data untuk tabel `user`
--

INSERT INTO `user` (`id`, `username`, `password`, `role`, `id_siswa`) VALUES
(6, 'admin', '$2y$10$rX3uFOEFMLNaQosIOm7QZOuSQp2Dg0GVNuCwZ9FnProhBzWikyzYS', 'admin', NULL),
(10, '10116309', '$2y$10$Nuk8ezNTFcJTHbHmTFkc6OO3kwO7vZV./RULZfYPKrEL.cenlZItq', 'siswa', 44),
(11, '10116310', '$2y$10$9.RvX9zpC6w9RbtmfOSBl.3HNBlvhwSB.j6VBwXJoYA/6XWLkcvR2', 'siswa', 46),
(12, '10116301', '$2y$10$mX59RX4aQgPN7bd2dZbCheo9SCBEZjHU2Yp4BrWNgpJ4jyBU28Un6', 'siswa', 47),
(13, '10116302', '$2y$10$EB.Y2qtSZh8XCVj2gwHli.G1Fje1WtNL51QDvN7NcBXZM3LjQUTYS', 'siswa', 48),
(14, '10116303', '$2y$10$3knmgpnk9OyC3AXYBEpuKuEzYgPpXnrb.aV/ZzQiM9oSFIwKqRDgK', 'siswa', 50),
(15, '10116304', '$2y$10$.EIlfgQcnx5v9rg5rL7SSeB4H3IaPMkEGM8q4Rni2zqwZLBETtSla', 'siswa', 51),
(19, '10116308', '$2y$10$5iPIEuhsNOxuQJNSuHPEYusaQuEnjruAxEc0GyPlXXY5GJrfZUuK6', 'siswa', 52),
(20, 'guru1', '$2y$10$xljOBFy8w6nfelEZIwDbreUujKZ131e6hbBz5YEXAOHz5ZVc/Zrv.', 'guru', NULL),
(21, 'guru2', '$2y$10$94maZekeM7r248wbmXFHVeDBuADRJ.1jb2cllTfdsd5BGDbUwyMOq', 'guru', NULL),
(22, 'guru3', '$2y$10$/dLJE.jWw9ftLKFxOeAiUeOA2fhZcLznwjwtCDFu79ySuYOeKiVAu', 'guru', NULL),
(23, 'guru4', '$2y$10$vqCHjKgKU.dej5rSQ/TisuD0Qk29QCot4TMyttx.Wkjd0BahsSqNK', 'guru', NULL),
(24, 'guru5', '$2y$10$1rjlofeNHWXrUE/fCf0A9OAlzes3hkicwfmoKUqPnpONvDcxpNw/W', 'guru', NULL),
(39, '10116300', '$2y$10$dsEAurqGP8Z2PncSOW0d0eV3klSjAnMbNzeharymIHuTorA0mrdqm', 'siswa', 343),
(44, '10116315', '$2y$10$NPWD1sw1J9jljiA6haUlbe3giPm3hdzTFRICfIu1MbpZVgU.UWbv2', 'siswa', 311),
(45, '10116316', '$2y$10$7KymV0.f1.YvZRwehAD0Z.IOTME56DKpVgALHf8ES9xZgZ919HWDi', 'siswa', 319),
(46, '10116317', '$2y$10$no8kZxfiwJrksr1t4Cu5hexfZEqI.R8vUBJLcHJjNhk9iaKagJDAG', 'siswa', 320),
(48, '10116319', '$2y$10$Y3zwlpIbrTfkbBhc0OUJ9uDsyyb6QeydFlGKqnvJOyGUUQJhWWDJa', 'siswa', 322),
(49, '10116320', '$2y$10$Ym5Nk3J3cP3F3niUpRjEJ..O2TDN82gNnZWjGr4LUGaU/oslFEufe', 'siswa', 323),
(50, '10116321', '$2y$10$ELCxUYji9iNJ.kWr22BlyekQMi3enVOmASfu9e9belGZLddFjCduy', 'siswa', 324),
(53, '10116324', '$2y$10$eF/6DIYAJx7wep3jweSanuC1hYhw/IU2yPnNvN7jX89E8A3bhoZa.', 'siswa', 330),
(54, '10116325', '$2y$10$Eu4dvvuE20BCy4smPQvV5OlD6bIUWxndxj7ullwr3ZkBSUBOuSsfm', 'siswa', 336),
(56, '10116327', '$2y$10$IBniAimDNbBdD1z2yEBHxeymyNKGA52ote18LHSahX3oPfFHD5OPS', 'siswa', 339),
(57, '10116328', '$2y$10$HdmhUmd6FqHuoLLAjUHfAuPR5Gz9ru8KgmESCOzsUrLm0wP680FIm', 'siswa', 340),
(58, '10116329', '$2y$10$ZRu1tsX1x/jxj26QzSLFuOee4LNjG0Kl.bRuavKfgUkwXYIVgjByG', 'siswa', 70),
(60, '10116331', '$2y$10$IOCVHU./uzGj.cddkU2qRuKQSJw6Ow2kja6OYF4sqfPBoxF/waps6', 'siswa', 346),
(63, 'admin2', '$2y$10$YOHwLyEfRiJhc1IFmx22y.0RfZzgaNZuvGLKtWxYyWmTuXEGh//Ja', 'admin', NULL),
(64, 'admin3', '$2y$10$vSQBsTGBpoptftoH4DlRbeZn6vAda9hVewYflhVVADSCE5IkqSGqK', 'admin', NULL);

--
-- Indexes for dumped tables
--

--
-- Indeks untuk tabel `mapel`
--
ALTER TABLE `mapel`
  ADD PRIMARY KEY (`id_mapel`);

--
-- Indeks untuk tabel `siswa`
--
ALTER TABLE `siswa`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `nis` (`nis`);

--
-- Indeks untuk tabel `siswa_mapel`
--
ALTER TABLE `siswa_mapel`
  ADD PRIMARY KEY (`id`),
  ADD KEY `siswa_mapel_ibfk_1` (`id_siswa`),
  ADD KEY `siswa_mapel_ibfk_2` (`id_mapel`);

--
-- Indeks untuk tabel `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`id`),
  ADD KEY `fk_user_siswa` (`id_siswa`);

--
-- AUTO_INCREMENT untuk tabel yang dibuang
--

--
-- AUTO_INCREMENT untuk tabel `mapel`
--
ALTER TABLE `mapel`
  MODIFY `id_mapel` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=93;

--
-- AUTO_INCREMENT untuk tabel `siswa`
--
ALTER TABLE `siswa`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=377;

--
-- AUTO_INCREMENT untuk tabel `siswa_mapel`
--
ALTER TABLE `siswa_mapel`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=477;

--
-- AUTO_INCREMENT untuk tabel `user`
--
ALTER TABLE `user`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=84;

--
-- Ketidakleluasaan untuk tabel pelimpahan (Dumped Tables)
--

--
-- Ketidakleluasaan untuk tabel `siswa_mapel`
--
ALTER TABLE `siswa_mapel`
  ADD CONSTRAINT `siswa_mapel_ibfk_1` FOREIGN KEY (`id_siswa`) REFERENCES `siswa` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `siswa_mapel_ibfk_2` FOREIGN KEY (`id_mapel`) REFERENCES `mapel` (`id_mapel`) ON DELETE CASCADE;

--
-- Ketidakleluasaan untuk tabel `user`
--
ALTER TABLE `user`
  ADD CONSTRAINT `fk_user_siswa` FOREIGN KEY (`id_siswa`) REFERENCES `siswa` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
