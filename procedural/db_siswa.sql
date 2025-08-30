-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Waktu pembuatan: 30 Agu 2025 pada 16.06
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
(5, 'Bahasa Arab'),
(6, 'Matematika'),
(7, 'Bahasa Inggris'),
(9, 'Ilmu Pengetahuan Sosial'),
(12, 'Ilmu Pengetahuan Alam'),
(13, 'Pendidikan Agama'),
(21, 'Hoyoverse'),
(27, 'Bahasa Jepang');

-- --------------------------------------------------------

--
-- Struktur dari tabel `siswa`
--

CREATE TABLE `siswa` (
  `id` int(11) NOT NULL,
  `nama` varchar(100) DEFAULT NULL,
  `umur` int(11) DEFAULT NULL,
  `alamat` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data untuk tabel `siswa`
--

INSERT INTO `siswa` (`id`, `nama`, `umur`, `alamat`) VALUES
(17, 'namen3', 28, 'One Piece'),
(21, 'Dawen', 38, 'China'),
(43, 'andy bom', 18, 'cimahi'),
(44, 'andy cen', 18, 'cimahi'),
(46, 'andy fen', 18, 'cimahi'),
(47, 'andy gen', 18, 'cimahi'),
(48, 'andy hen', 18, 'cimahi'),
(49, 'andy ien', 18, 'cimahi'),
(50, 'andy jen', 18, 'cimahi'),
(51, 'andy ken', 18, 'cimahi'),
(52, 'andy len', 18, 'cimahi'),
(53, 'andy len', 18, 'cimahi'),
(54, 'andy men', 18, 'cimahi'),
(55, 'andy nen', 18, 'cimahi'),
(56, 'andy oin', 18, 'cimahi'),
(57, 'andy pin', 18, 'cimahi'),
(58, 'andy qin', 18, 'cimahi'),
(61, 'aaa', 34, 's'),
(62, 'ddd', 32, 'd'),
(63, 'ddd', 32, 'd'),
(67, 'b', 32, 'd'),
(68, 'aaa', 23, 'ddd'),
(69, 'aaa', 32, 'ddd'),
(70, 'aww', 32, 'ded'),
(71, 'Argono', 20, 'Cimahi'),
(72, 'Argono', 20, 'Cimahi'),
(73, 'Argono', 20, 'Cimahi'),
(74, 'Argono', 20, 'Cimahi'),
(75, 'Argono', 20, 'Cimahi'),
(76, 'Argono', 20, 'Cimahi'),
(77, 'Argono', 20, 'Cimahi'),
(78, 'Tom B. Erichsen', 21, 'Norway'),
(79, 'Tom B. Erichsen', 21, 'Norway'),
(80, 'Tom B. Erichsen', 21, 'Norway'),
(81, 'Tom B. Erichsen', 21, 'Norway'),
(82, 'Tom B. Erichsen', 21, 'Norway'),
(83, 'Tom B. Erichsen', 21, 'Norway'),
(84, 'Tom B. Erichsen', 21, 'Norway'),
(85, 'Tom B. Erichsen', 21, 'Norway'),
(86, 'Tom B. Erichsen', 21, 'Norway'),
(87, 'Tom B. Erichsen', 21, 'Norway'),
(88, 'Tom B. Erichsen', 21, 'Norway'),
(89, 'Tom B. Erichsen', 21, 'Norway'),
(90, 'Tom B. Erichsen', 21, 'Norway'),
(91, 'Tom B. Erichsen', 21, 'Norway'),
(92, 'Tom B. Erichsen', 21, 'Norway'),
(93, 'Tom B. Erichsen', 21, 'Norway'),
(94, 'Tom B. Erichsen', 21, 'Norway'),
(95, 'Tom B. Erichsen', 21, 'Norway'),
(96, 'Tom B. Erichsen', 21, 'Norway'),
(97, 'Tom B. Erichsen', 21, 'Norway'),
(98, 'Tom B. Erichsen', 21, 'Norway'),
(99, 'Tom B. Erichsen', 21, 'Norway'),
(100, 'Tom B. Erichsen', 21, 'Norway'),
(101, 'Tom B. Erichsen', 21, 'Norway'),
(102, 'Tom B. Erichsen', 21, 'Norway'),
(103, 'Tom B. Erichsen', 21, 'Norway'),
(104, 'Tom B. Erichsen', 21, 'Norway'),
(105, 'Tom B. Erichsen', 21, 'Norway'),
(106, 'Tom B. Erichsen', 21, 'Norway'),
(107, 'Tom B. Erichsen', 21, 'Norway'),
(108, 'Tom B. Erichsen', 21, 'Norway'),
(109, 'Tom B. Erichsen', 21, 'Norway'),
(110, 'Tom B. Erichsen', 21, 'Norway'),
(111, 'Tom B. Erichsen', 21, 'Norway'),
(112, 'Tom B. Erichsen', 21, 'Norway'),
(113, 'Tom B. Erichsen', 21, 'Norway'),
(114, 'Tom B. Erichsen', 21, 'Norway'),
(115, 'Tom B. Erichsen', 21, 'Norway'),
(116, 'Tom B. Erichsen', 21, 'Norway'),
(117, 'Tom B. Erichsen', 21, 'Norway'),
(118, 'Tom B. Erichsen', 21, 'Norway'),
(119, 'Tom B. Erichsen', 21, 'Norway'),
(120, 'Tom B. Erichsen', 21, 'Norway'),
(121, 'Tom B. Erichsen', 21, 'Norway'),
(122, 'Tom B. Erichsen', 21, 'Norway'),
(123, 'Tom B. Erichsen', 21, 'Norway'),
(124, 'Tom B. Erichsen', 21, 'Norway'),
(125, 'Tom B. Erichsen', 21, 'Norway'),
(126, 'Tom B. Erichsen', 21, 'Norway'),
(127, 'Tom B. Erichsen', 21, 'Norway'),
(128, 'Tom B. Erichsen', 21, 'Norway'),
(129, 'Tom B. Erichsen', 21, 'Norway'),
(130, 'Tom B. Erichsen', 21, 'Norway'),
(131, 'Tom B. Erichsen', 21, 'Norway'),
(132, 'Tom B. Erichsen', 21, 'Norway'),
(133, 'Tom B. Erichsen', 21, 'Norway'),
(134, 'Tom B. Erichsen', 21, 'Norway'),
(135, 'Tom B. Erichsen', 21, 'Norway'),
(136, 'Tom B. Erichsen', 21, 'Norway'),
(137, 'Tom B. Erichsen', 21, 'Norway'),
(138, 'Tom B. Erichsen', 21, 'Norway'),
(139, 'Tom B. Erichsen', 21, 'Norway'),
(140, 'Tom B. Erichsen', 21, 'Norway'),
(141, 'Tom B. Erichsen', 21, 'Norway'),
(142, 'Tom B. Erichsen', 21, 'Norway'),
(143, 'Tom B. Erichsen', 21, 'Norway'),
(144, 'Tom B. Erichsen', 21, 'Norway'),
(145, 'Tom B. Erichsen', 21, 'Norway'),
(146, 'Tom B. Erichsen', 21, 'Norway'),
(147, 'Tom B. Erichsen', 21, 'Norway'),
(148, 'Tom B. Erichsen', 21, 'Norway'),
(149, 'Tom B. Erichsen', 21, 'Norway'),
(150, 'Tom B. Erichsen', 21, 'Norway'),
(151, 'Tom B. Erichsen', 21, 'Norway'),
(152, 'Tom B. Erichsen', 21, 'Norway'),
(153, 'Tom B. Erichsen', 21, 'Norway'),
(154, 'Tom B. Erichsen', 21, 'Norway'),
(155, 'Tom B. Erichsen', 21, 'Norway'),
(156, 'Tom B. Erichsen', 21, 'Norway'),
(157, 'Tom B. Erichsen', 21, 'Norway'),
(158, 'Tom B. Erichsen', 21, 'Norway'),
(159, 'Tom B. Erichsen', 21, 'Norway'),
(160, 'Tom B. Erichsen', 21, 'Norway'),
(161, 'Tom B. Erichsen', 21, 'Norway'),
(162, 'Tom B. Erichsen', 21, 'Norway'),
(163, 'Tom B. Erichsen', 21, 'Norway'),
(164, 'Tom B. Erichsen', 21, 'Norway'),
(165, 'Tom B. Erichsen', 21, 'Norway'),
(166, 'Tom B. Erichsen', 21, 'Norway'),
(167, 'Tom B. Erichsen', 21, 'Norway'),
(168, 'Tom B. Erichsen', 21, 'Norway'),
(169, 'Tom B. Erichsen', 21, 'Norway'),
(170, 'Tom B. Erichsen', 21, 'Norway'),
(171, 'Tom B. Erichsen', 21, 'Norway'),
(172, 'Tom B. Erichsen', 21, 'Norway'),
(173, 'Tom B. Erichsen', 21, 'Norway'),
(174, 'Tom B. Erichsen', 21, 'Norway'),
(175, 'Tom B. Erichsen', 21, 'Norway'),
(176, 'Tom B. Erichsen', 21, 'Norway'),
(177, 'Tom B. Erichsen', 21, 'Norway'),
(178, 'Tom B. Erichsen', 21, 'Norway'),
(179, 'Tom B. Erichsen', 21, 'Norway'),
(180, 'Tom B. Erichsen', 21, 'Norway'),
(181, 'Tom B. Erichsen', 21, 'Norway'),
(182, 'Tom B. Erichsen', 21, 'Norway'),
(183, 'Tom B. Erichsen', 21, 'Norway'),
(184, 'Tom B. Erichsen', 21, 'Norway'),
(185, 'Tom B. Erichsen', 21, 'Norway'),
(186, 'Tom B. Erichsen', 21, 'Norway'),
(187, 'Tom B. Erichsen', 21, 'Norway'),
(188, 'Tom B. Erichsen', 21, 'Norway'),
(189, 'Tom B. Erichsen', 21, 'Norway'),
(190, 'Tom B. Erichsen', 21, 'Norway'),
(191, 'Tom B. Erichsen', 21, 'Norway'),
(192, 'Tom B. Erichsen', 21, 'Norway'),
(193, 'Tom B. Erichsen', 21, 'Norway'),
(194, 'Tom B. Erichsen', 21, 'Norway'),
(195, 'Tom B. Erichsen', 21, 'Norway'),
(196, 'Tom B. Erichsen', 21, 'Norway'),
(197, 'Tom B. Erichsen', 21, 'Norway'),
(198, 'Tom B. Erichsen', 21, 'Norway'),
(199, 'Tom B. Erichsen', 21, 'Norway'),
(200, 'Tom B. Erichsen', 21, 'Norway'),
(201, 'Tom B. Erichsen', 21, 'Norway'),
(202, 'Tom B. Erichsen', 21, 'Norway'),
(203, 'Tom B. Erichsen', 21, 'Norway'),
(204, 'Tom B. Erichsen', 21, 'Norway'),
(205, 'Tom B. Erichsen', 21, 'Norway'),
(206, 'Tom B. Erichsen', 21, 'Norway'),
(207, 'Tom B. Erichsen', 21, 'Norway'),
(208, 'Tom B. Erichsen', 21, 'Norway'),
(209, 'Tom B. Erichsen', 21, 'Norway'),
(210, 'Tom B. Erichsen', 21, 'Norway'),
(211, 'Tom B. Erichsen', 21, 'Norway'),
(212, 'Tom B. Erichsen', 21, 'Norway'),
(213, 'Tom B. Erichsen', 21, 'Norway'),
(214, 'Tom B. Erichsen', 21, 'Norway'),
(215, 'Tom B. Erichsen', 21, 'Norway'),
(216, 'Tom B. Erichsen', 21, 'Norway'),
(217, 'Tom B. Erichsen', 21, 'Norway'),
(218, 'Tom B. Erichsen', 21, 'Norway'),
(219, 'Tom B. Erichsen', 21, 'Norway'),
(220, 'Tom B. Erichsen', 21, 'Norway'),
(221, 'Tom B. Erichsen', 21, 'Norway'),
(222, 'Tom B. Erichsen', 21, 'Norway'),
(223, 'Tom B. Erichsen', 21, 'Norway'),
(224, 'Tom B. Erichsen', 21, 'Norway'),
(225, 'Tom B. Erichsen', 21, 'Norway'),
(226, 'Tom B. Erichsen', 21, 'Norway'),
(227, 'Tom B. Erichsen', 21, 'Norway'),
(228, 'Tom B. Erichsen', 21, 'Norway'),
(229, 'Tom B. Erichsen', 21, 'Norway'),
(230, 'Tom B. Erichsen', 21, 'Norway'),
(231, 'Tom B. Erichsen', 21, 'Norway'),
(232, 'Tom B. Erichsen', 21, 'Norway'),
(233, 'Tom B. Erichsen', 21, 'Norway'),
(234, 'Tom B. Erichsen', 21, 'Norway'),
(235, 'Tom B. Erichsen', 21, 'Norway'),
(236, 'Tom B. Erichsen', 21, 'Norway'),
(237, 'Tom B. Erichsen', 21, 'Norway'),
(238, 'Tom B. Erichsen', 21, 'Norway'),
(239, 'Tom B. Erichsen', 21, 'Norway'),
(240, 'Tom B. Erichsen', 21, 'Norway'),
(241, 'Tom B. Erichsen', 21, 'Norway'),
(242, 'Tom B. Erichsen', 21, 'Norway'),
(243, 'Tom B. Erichsen', 21, 'Norway'),
(244, 'Tom B. Erichsen', 21, 'Norway'),
(245, 'Tom B. Erichsen', 21, 'Norway'),
(246, 'Tom B. Erichsen', 21, 'Norway'),
(247, 'Tom B. Erichsen', 21, 'Norway'),
(248, 'Tom B. Erichsen', 21, 'Norway'),
(249, 'Tom B. Erichsen', 21, 'Norway'),
(250, 'Tom B. Erichsen', 21, 'Norway'),
(251, 'Tom B. Erichsen', 21, 'Norway'),
(252, 'Tom B. Erichsen', 21, 'Norway'),
(253, 'Tom B. Erichsen', 21, 'Norway'),
(254, 'Tom B. Erichsen', 21, 'Norway'),
(255, 'Tom B. Erichsen', 21, 'Norway'),
(256, 'Tom B. Erichsen', 21, 'Norway'),
(257, 'Tom B. Erichsen', 21, 'Norway'),
(258, 'Tom B. Erichsen', 21, 'Norway'),
(259, 'Tom B. Erichsen', 21, 'Norway'),
(260, 'Tom B. Erichsen', 21, 'Norway'),
(261, 'Tom B. Erichsen', 21, 'Norway'),
(262, 'Tom B. Erichsen', 21, 'Norway'),
(263, 'Tom B. Erichsen', 21, 'Norway'),
(264, 'Tom B. Erichsen', 21, 'Norway'),
(265, 'Tom B. Erichsen', 21, 'Norway'),
(266, 'Tom B. Erichsen', 21, 'Norway'),
(267, 'Tom B. Erichsen', 21, 'Norway'),
(268, 'Tom B. Erichsen', 21, 'Norway'),
(269, 'Tom B. Erichsen', 21, 'Norway'),
(270, 'Tom B. Erichsen', 21, 'Norway'),
(271, 'Tom B. Erichsen', 21, 'Norway'),
(272, 'Tom B. Erichsen', 21, 'Norway'),
(273, 'Tom B. Erichsen', 21, 'Norway'),
(274, 'Tom B. Erichsen', 21, 'Norway'),
(275, 'Tom B. Erichsen', 21, 'Norway'),
(276, 'Tom B. Erichsen', 21, 'Norway'),
(277, 'Tom B. Erichsen', 21, 'Norway'),
(278, 'Tom B. Erichsen', 21, 'Norway'),
(279, 'Tom B. Erichsen', 21, 'Norway'),
(280, 'Tom B. Erichsen', 21, 'Norway'),
(281, 'Tom B. Erichsen', 21, 'Norway'),
(282, 'Tom B. Erichsen', 21, 'Norway'),
(283, 'Tom B. Erichsen', 21, 'Norway'),
(284, 'Tom B. Erichsen', 21, 'Norway'),
(285, 'Tom B. Erichsen', 21, 'Norway'),
(286, 'Tom B. Erichsen', 21, 'Norway'),
(287, 'Tom B. Erichsen', 21, 'Norway'),
(288, 'Tom B. Erichsen', 21, 'Norway'),
(289, 'Tom B. Erichsen', 21, 'Norway'),
(290, 'Tom B. Erichsen', 21, 'Norway'),
(291, 'Tom B. Erichsen', 21, 'Norway'),
(292, 'Tom B. Erichsen', 21, 'Norway'),
(293, 'Tom B. Erichsen', 21, 'Norway'),
(294, 'Tom B. Erichsen', 21, 'Norway'),
(295, 'Tom B. Erichsen', 21, 'Norway'),
(296, 'Tom B. Erichsen', 21, 'Norway'),
(297, 'Tom B. Erichsen', 21, 'Norway'),
(298, 'Tom B. Erichsen', 21, 'Norway'),
(299, 'Tom B. Erichsen', 21, 'Norway'),
(300, 'Tom B. Erichsen', 21, 'Norway'),
(301, 'Tom B. Erichsen', 21, 'Norway'),
(302, 'Tom B. Erichsen', 21, 'Norway'),
(303, 'Tom B. Erichsen', 21, 'Norway'),
(304, 'Tom B. Erichsen', 21, 'Norway'),
(305, 'Tom B. Erichsen', 21, 'Norway'),
(306, 'Tom B. Erichsen', 21, 'Norway'),
(307, 'Tom B. Erichsen', 21, 'Norway'),
(308, 'Tom B. Erichsen', 21, 'Norway'),
(309, 'Tom B. Erichsen', 21, 'Norway'),
(310, 'Tom B. Erichsen', 21, 'Norway'),
(311, 'Tom B. Erichsen', 21, 'Norway'),
(312, 'Tom B. Erichsen', 21, 'Norway'),
(313, 'Tom B. Erichsen', 21, 'Norway'),
(314, 'Tom B. Erichsen', 21, 'Norway'),
(319, 'dada', 23, 'sasa'),
(320, 'mamak', 32, 'bandung'),
(321, 'anri', 39, 'Jepang'),
(322, 'bamal', 34, 'cimahi'),
(323, 'andy centik', 18, 'cimahi'),
(324, 'nan', 100, 'One Piece'),
(325, 'naen', 23, 'jepang');

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
(85, 21, 5),
(86, 21, 6),
(87, 21, 7),
(88, 21, 12),
(165, 61, 5),
(166, 62, 9),
(168, 63, 6),
(172, 70, 6),
(173, 70, 9),
(174, 70, 13),
(176, 69, 6),
(177, 69, 7),
(178, 69, 12),
(179, 68, 7),
(180, 68, 13),
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
(200, 17, 6),
(201, 17, 21);

-- --------------------------------------------------------

--
-- Struktur dari tabel `user`
--

CREATE TABLE `user` (
  `id` int(11) NOT NULL,
  `username` varchar(50) NOT NULL,
  `password` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data untuk tabel `user`
--

INSERT INTO `user` (`id`, `username`, `password`) VALUES
(6, 'admin', '$2y$10$rX3uFOEFMLNaQosIOm7QZOuSQp2Dg0GVNuCwZ9FnProhBzWikyzYS'),
(7, 'adi', '$2y$10$vKS59txdK7FObiehxUgvweCdaYBpy.uSL5UOXJM76boDYFSpuwf7a'),
(8, 'admon', '$2y$10$AyjZboZ5J.8k2py0/r5useeO./60ERnZ6SYgRTQuGmBQjrNWp8o7S');

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
  ADD PRIMARY KEY (`id`);

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
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT untuk tabel yang dibuang
--

--
-- AUTO_INCREMENT untuk tabel `mapel`
--
ALTER TABLE `mapel`
  MODIFY `id_mapel` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=28;

--
-- AUTO_INCREMENT untuk tabel `siswa`
--
ALTER TABLE `siswa`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=327;

--
-- AUTO_INCREMENT untuk tabel `siswa_mapel`
--
ALTER TABLE `siswa_mapel`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=214;

--
-- AUTO_INCREMENT untuk tabel `user`
--
ALTER TABLE `user`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- Ketidakleluasaan untuk tabel pelimpahan (Dumped Tables)
--

--
-- Ketidakleluasaan untuk tabel `siswa_mapel`
--
ALTER TABLE `siswa_mapel`
  ADD CONSTRAINT `siswa_mapel_ibfk_1` FOREIGN KEY (`id_siswa`) REFERENCES `siswa` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `siswa_mapel_ibfk_2` FOREIGN KEY (`id_mapel`) REFERENCES `mapel` (`id_mapel`) ON DELETE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
