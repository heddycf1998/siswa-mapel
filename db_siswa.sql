-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Waktu pembuatan: 16 Sep 2025 pada 17.08
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
(5, 'Bahasa Inggris'),
(6, 'Matematika'),
(7, 'Bahasa Inggris'),
(9, 'Ilmu Pengetahuan Sosial'),
(12, 'Ilmu Pengetahuan Alam'),
(13, 'Pendidikan Agama'),
(21, 'Hoyoverse'),
(34, 'Bahasa Sunda'),
(37, 'Lauma');

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
(44, '10116309', 'andy centul', 24, 'cimahi'),
(46, '10116310', 'andy fenry', 18, 'cimahi'),
(47, '10116301', 'Gentar', 18, 'cimahi'),
(48, '10116302', 'Henhen', 18, 'cimahi'),
(50, '10116303', 'andy jen', 18, 'cimahi'),
(51, '10116304', 'andy ken', 18, 'cimahi'),
(52, '10116308', 'andy len', 18, 'cimahi'),
(53, '10116305', 'andy len', 18, 'cimahi'),
(54, '10116306', 'andy men', 18, 'cimahi'),
(55, '10116307', 'andy nen', 18, 'cimahi'),
(56, NULL, 'andy oin', 18, 'cimahi'),
(57, NULL, 'andy pin', 18, 'cimahi'),
(58, NULL, 'andy qin', 18, 'cimahi'),
(61, NULL, 'aaa', 34, 's'),
(62, NULL, 'ddd', 32, 'd'),
(63, NULL, 'ddd', 32, 'd'),
(67, NULL, 'b', 32, 'd'),
(68, NULL, 'aaa', 23, 'ddd'),
(69, NULL, 'aaa', 32, 'ddd'),
(70, NULL, 'aww', 32, 'ded'),
(71, NULL, 'Argono', 20, 'Cimahi'),
(72, NULL, 'Argono', 20, 'Cimahi'),
(73, NULL, 'Argono', 20, 'Cimahi'),
(74, NULL, 'Argono', 20, 'Cimahi'),
(75, NULL, 'Argono', 20, 'Cimahi'),
(76, NULL, 'Argono', 20, 'Cimahi'),
(77, NULL, 'Argono', 20, 'Cimahi'),
(78, NULL, 'Tom B. Erichsen', 21, 'Norway'),
(79, NULL, 'Tom B. Erichsen', 21, 'Norway'),
(80, NULL, 'Tom B. Erichsen', 21, 'Norway'),
(81, NULL, 'Tom B. Erichsen', 21, 'Norway'),
(82, NULL, 'Tom B. Erichsen', 21, 'Norway'),
(83, NULL, 'Tom B. Erichsen', 21, 'Norway'),
(84, NULL, 'Tom B. Erichsen', 21, 'Norway'),
(85, NULL, 'Tom B. Erichsen', 21, 'Norway'),
(86, NULL, 'Tom B. Erichsen', 21, 'Norway'),
(87, NULL, 'Tom B. Erichsen', 21, 'Norway'),
(88, NULL, 'Tom B. Erichsen', 21, 'Norway'),
(89, NULL, 'Tom B. Erichsen', 21, 'Norway'),
(90, NULL, 'Tom B. Erichsen', 21, 'Norway'),
(91, NULL, 'Tom B. Erichsen', 21, 'Norway'),
(92, NULL, 'Tom B. Erichsen', 21, 'Norway'),
(93, NULL, 'Tom B. Erichsen', 21, 'Norway'),
(94, NULL, 'Tom B. Erichsen', 21, 'Norway'),
(95, NULL, 'Tom B. Erichsen', 21, 'Norway'),
(96, NULL, 'Tom B. Erichsen', 21, 'Norway'),
(97, NULL, 'Tom B. Erichsen', 21, 'Norway'),
(98, NULL, 'Tom B. Erichsen', 21, 'Norway'),
(99, NULL, 'Tom B. Erichsen', 21, 'Norway'),
(100, NULL, 'Tom B. Erichsen', 21, 'Norway'),
(101, NULL, 'Tom B. Erichsen', 21, 'Norway'),
(102, NULL, 'Tom B. Erichsen', 21, 'Norway'),
(103, NULL, 'Tom B. Erichsen', 21, 'Norway'),
(104, NULL, 'Tom B. Erichsen', 21, 'Norway'),
(105, NULL, 'Tom B. Erichsen', 21, 'Norway'),
(106, NULL, 'Tom B. Erichsen', 21, 'Norway'),
(107, NULL, 'Tom B. Erichsen', 21, 'Norway'),
(108, NULL, 'Tom B. Erichsen', 21, 'Norway'),
(109, NULL, 'Tom B. Erichsen', 21, 'Norway'),
(110, NULL, 'Tom B. Erichsen', 21, 'Norway'),
(111, NULL, 'Tom B. Erichsen', 21, 'Norway'),
(112, NULL, 'Tom B. Erichsen', 21, 'Norway'),
(113, NULL, 'Tom B. Erichsen', 21, 'Norway'),
(114, NULL, 'Tom B. Erichsen', 21, 'Norway'),
(115, NULL, 'Tom B. Erichsen', 21, 'Norway'),
(116, NULL, 'Tom B. Erichsen', 21, 'Norway'),
(117, NULL, 'Tom B. Erichsen', 21, 'Norway'),
(118, NULL, 'Tom B. Erichsen', 21, 'Norway'),
(119, NULL, 'Tom B. Erichsen', 21, 'Norway'),
(120, NULL, 'Tom B. Erichsen', 21, 'Norway'),
(121, NULL, 'Tom B. Erichsen', 21, 'Norway'),
(122, NULL, 'Tom B. Erichsen', 21, 'Norway'),
(123, NULL, 'Tom B. Erichsen', 21, 'Norway'),
(124, NULL, 'Tom B. Erichsen', 21, 'Norway'),
(125, NULL, 'Tom B. Erichsen', 21, 'Norway'),
(126, NULL, 'Tom B. Erichsen', 21, 'Norway'),
(127, NULL, 'Tom B. Erichsen', 21, 'Norway'),
(128, NULL, 'Tom B. Erichsen', 21, 'Norway'),
(129, NULL, 'Tom B. Erichsen', 21, 'Norway'),
(130, NULL, 'Tom B. Erichsen', 21, 'Norway'),
(131, NULL, 'Tom B. Erichsen', 21, 'Norway'),
(132, NULL, 'Tom B. Erichsen', 21, 'Norway'),
(133, NULL, 'Tom B. Erichsen', 21, 'Norway'),
(134, NULL, 'Tom B. Erichsen', 21, 'Norway'),
(135, NULL, 'Tom B. Erichsen', 21, 'Norway'),
(136, NULL, 'Tom B. Erichsen', 21, 'Norway'),
(137, NULL, 'Tom B. Erichsen', 21, 'Norway'),
(138, NULL, 'Tom B. Erichsen', 21, 'Norway'),
(139, NULL, 'Tom B. Erichsen', 21, 'Norway'),
(140, NULL, 'Tom B. Erichsen', 21, 'Norway'),
(141, NULL, 'Tom B. Erichsen', 21, 'Norway'),
(142, NULL, 'Tom B. Erichsen', 21, 'Norway'),
(143, NULL, 'Tom B. Erichsen', 21, 'Norway'),
(144, NULL, 'Tom B. Erichsen', 21, 'Norway'),
(145, NULL, 'Tom B. Erichsen', 21, 'Norway'),
(146, NULL, 'Tom B. Erichsen', 21, 'Norway'),
(147, NULL, 'Tom B. Erichsen', 21, 'Norway'),
(148, NULL, 'Tom B. Erichsen', 21, 'Norway'),
(149, NULL, 'Tom B. Erichsen', 21, 'Norway'),
(150, NULL, 'Tom B. Erichsen', 21, 'Norway'),
(151, NULL, 'Tom B. Erichsen', 21, 'Norway'),
(152, NULL, 'Tom B. Erichsen', 21, 'Norway'),
(153, NULL, 'Tom B. Erichsen', 21, 'Norway'),
(154, NULL, 'Tom B. Erichsen', 21, 'Norway'),
(155, NULL, 'Tom B. Erichsen', 21, 'Norway'),
(156, NULL, 'Tom B. Erichsen', 21, 'Norway'),
(157, NULL, 'Tom B. Erichsen', 21, 'Norway'),
(158, NULL, 'Tom B. Erichsen', 21, 'Norway'),
(159, NULL, 'Tom B. Erichsen', 21, 'Norway'),
(160, NULL, 'Tom B. Erichsen', 21, 'Norway'),
(161, NULL, 'Tom B. Erichsen', 21, 'Norway'),
(162, NULL, 'Tom B. Erichsen', 21, 'Norway'),
(163, NULL, 'Tom B. Erichsen', 21, 'Norway'),
(164, NULL, 'Tom B. Erichsen', 21, 'Norway'),
(165, NULL, 'Tom B. Erichsen', 21, 'Norway'),
(166, NULL, 'Tom B. Erichsen', 21, 'Norway'),
(167, NULL, 'Tom B. Erichsen', 21, 'Norway'),
(168, NULL, 'Tom B. Erichsen', 21, 'Norway'),
(169, NULL, 'Tom B. Erichsen', 21, 'Norway'),
(170, NULL, 'Tom B. Erichsen', 21, 'Norway'),
(171, NULL, 'Tom B. Erichsen', 21, 'Norway'),
(172, NULL, 'Tom B. Erichsen', 21, 'Norway'),
(173, NULL, 'Tom B. Erichsen', 21, 'Norway'),
(174, NULL, 'Tom B. Erichsen', 21, 'Norway'),
(175, NULL, 'Tom B. Erichsen', 21, 'Norway'),
(176, NULL, 'Tom B. Erichsen', 21, 'Norway'),
(177, NULL, 'Tom B. Erichsen', 21, 'Norway'),
(178, NULL, 'Tom B. Erichsen', 21, 'Norway'),
(179, NULL, 'Tom B. Erichsen', 21, 'Norway'),
(180, NULL, 'Tom B. Erichsen', 21, 'Norway'),
(181, NULL, 'Tom B. Erichsen', 21, 'Norway'),
(182, NULL, 'Tom B. Erichsen', 21, 'Norway'),
(183, NULL, 'Tom B. Erichsen', 21, 'Norway'),
(184, NULL, 'Tom B. Erichsen', 21, 'Norway'),
(185, NULL, 'Tom B. Erichsen', 21, 'Norway'),
(186, NULL, 'Tom B. Erichsen', 21, 'Norway'),
(187, NULL, 'Tom B. Erichsen', 21, 'Norway'),
(188, NULL, 'Tom B. Erichsen', 21, 'Norway'),
(189, NULL, 'Tom B. Erichsen', 21, 'Norway'),
(190, NULL, 'Tom B. Erichsen', 21, 'Norway'),
(191, NULL, 'Tom B. Erichsen', 21, 'Norway'),
(192, NULL, 'Tom B. Erichsen', 21, 'Norway'),
(193, NULL, 'Tom B. Erichsen', 21, 'Norway'),
(194, NULL, 'Tom B. Erichsen', 21, 'Norway'),
(195, NULL, 'Tom B. Erichsen', 21, 'Norway'),
(196, NULL, 'Tom B. Erichsen', 21, 'Norway'),
(197, NULL, 'Tom B. Erichsen', 21, 'Norway'),
(198, NULL, 'Tom B. Erichsen', 21, 'Norway'),
(199, NULL, 'Tom B. Erichsen', 21, 'Norway'),
(200, NULL, 'Tom B. Erichsen', 21, 'Norway'),
(201, NULL, 'Tom B. Erichsen', 21, 'Norway'),
(202, NULL, 'Tom B. Erichsen', 21, 'Norway'),
(203, NULL, 'Tom B. Erichsen', 21, 'Norway'),
(204, NULL, 'Tom B. Erichsen', 21, 'Norway'),
(205, NULL, 'Tom B. Erichsen', 21, 'Norway'),
(206, NULL, 'Tom B. Erichsen', 21, 'Norway'),
(207, NULL, 'Tom B. Erichsen', 21, 'Norway'),
(208, NULL, 'Tom B. Erichsen', 21, 'Norway'),
(209, NULL, 'Tom B. Erichsen', 21, 'Norway'),
(210, NULL, 'Tom B. Erichsen', 21, 'Norway'),
(211, NULL, 'Tom B. Erichsen', 21, 'Norway'),
(212, NULL, 'Tom B. Erichsen', 21, 'Norway'),
(213, NULL, 'Tom B. Erichsen', 21, 'Norway'),
(214, NULL, 'Tom B. Erichsen', 21, 'Norway'),
(215, NULL, 'Tom B. Erichsen', 21, 'Norway'),
(216, NULL, 'Tom B. Erichsen', 21, 'Norway'),
(217, NULL, 'Tom B. Erichsen', 21, 'Norway'),
(218, NULL, 'Tom B. Erichsen', 21, 'Norway'),
(219, NULL, 'Tom B. Erichsen', 21, 'Norway'),
(220, NULL, 'Tom B. Erichsen', 21, 'Norway'),
(221, NULL, 'Tom B. Erichsen', 21, 'Norway'),
(222, NULL, 'Tom B. Erichsen', 21, 'Norway'),
(223, NULL, 'Tom B. Erichsen', 21, 'Norway'),
(224, NULL, 'Tom B. Erichsen', 21, 'Norway'),
(225, NULL, 'Tom B. Erichsen', 21, 'Norway'),
(226, NULL, 'Tom B. Erichsen', 21, 'Norway'),
(227, NULL, 'Tom B. Erichsen', 21, 'Norway'),
(228, NULL, 'Tom B. Erichsen', 21, 'Norway'),
(229, NULL, 'Tom B. Erichsen', 21, 'Norway'),
(230, NULL, 'Tom B. Erichsen', 21, 'Norway'),
(231, NULL, 'Tom B. Erichsen', 21, 'Norway'),
(232, NULL, 'Tom B. Erichsen', 21, 'Norway'),
(233, NULL, 'Tom B. Erichsen', 21, 'Norway'),
(234, NULL, 'Tom B. Erichsen', 21, 'Norway'),
(235, NULL, 'Tom B. Erichsen', 21, 'Norway'),
(236, NULL, 'Tom B. Erichsen', 21, 'Norway'),
(237, NULL, 'Tom B. Erichsen', 21, 'Norway'),
(238, NULL, 'Tom B. Erichsen', 21, 'Norway'),
(239, NULL, 'Tom B. Erichsen', 21, 'Norway'),
(240, NULL, 'Tom B. Erichsen', 21, 'Norway'),
(241, NULL, 'Tom B. Erichsen', 21, 'Norway'),
(242, NULL, 'Tom B. Erichsen', 21, 'Norway'),
(243, NULL, 'Tom B. Erichsen', 21, 'Norway'),
(244, NULL, 'Tom B. Erichsen', 21, 'Norway'),
(245, NULL, 'Tom B. Erichsen', 21, 'Norway'),
(246, NULL, 'Tom B. Erichsen', 21, 'Norway'),
(247, NULL, 'Tom B. Erichsen', 21, 'Norway'),
(248, NULL, 'Tom B. Erichsen', 21, 'Norway'),
(249, NULL, 'Tom B. Erichsen', 21, 'Norway'),
(250, NULL, 'Tom B. Erichsen', 21, 'Norway'),
(251, NULL, 'Tom B. Erichsen', 21, 'Norway'),
(252, NULL, 'Tom B. Erichsen', 21, 'Norway'),
(253, NULL, 'Tom B. Erichsen', 21, 'Norway'),
(254, NULL, 'Tom B. Erichsen', 21, 'Norway'),
(255, NULL, 'Tom B. Erichsen', 21, 'Norway'),
(256, NULL, 'Tom B. Erichsen', 21, 'Norway'),
(257, NULL, 'Tom B. Erichsen', 21, 'Norway'),
(258, NULL, 'Tom B. Erichsen', 21, 'Norway'),
(259, NULL, 'Tom B. Erichsen', 21, 'Norway'),
(260, NULL, 'Tom B. Erichsen', 21, 'Norway'),
(261, NULL, 'Tom B. Erichsen', 21, 'Norway'),
(262, NULL, 'Tom B. Erichsen', 21, 'Norway'),
(263, NULL, 'Tom B. Erichsen', 21, 'Norway'),
(264, NULL, 'Tom B. Erichsen', 21, 'Norway'),
(265, NULL, 'Tom B. Erichsen', 21, 'Norway'),
(266, NULL, 'Tom B. Erichsen', 21, 'Norway'),
(267, NULL, 'Tom B. Erichsen', 21, 'Norway'),
(268, NULL, 'Tom B. Erichsen', 21, 'Norway'),
(269, NULL, 'Tom B. Erichsen', 21, 'Norway'),
(270, NULL, 'Tom B. Erichsen', 21, 'Norway'),
(271, NULL, 'Tom B. Erichsen', 21, 'Norway'),
(272, NULL, 'Tom B. Erichsen', 21, 'Norway'),
(273, NULL, 'Tom B. Erichsen', 21, 'Norway'),
(274, NULL, 'Tom B. Erichsen', 21, 'Norway'),
(275, NULL, 'Tom B. Erichsen', 21, 'Norway'),
(276, NULL, 'Tom B. Erichsen', 21, 'Norway'),
(277, NULL, 'Tom B. Erichsen', 21, 'Norway'),
(278, NULL, 'Tom B. Erichsen', 21, 'Norway'),
(279, NULL, 'Tom B. Erichsen', 21, 'Norway'),
(280, NULL, 'Tom B. Erichsen', 21, 'Norway'),
(281, NULL, 'Tom B. Erichsen', 21, 'Norway'),
(282, NULL, 'Tom B. Erichsen', 21, 'Norway'),
(283, NULL, 'Tom B. Erichsen', 21, 'Norway'),
(284, NULL, 'Tom B. Erichsen', 21, 'Norway'),
(285, NULL, 'Tom B. Erichsen', 21, 'Norway'),
(286, NULL, 'Tom B. Erichsen', 21, 'Norway'),
(287, NULL, 'Tom B. Erichsen', 21, 'Norway'),
(288, NULL, 'Tom B. Erichsen', 21, 'Norway'),
(289, NULL, 'Tom B. Erichsen', 21, 'Norway'),
(290, NULL, 'Tom B. Erichsen', 21, 'Norway'),
(291, NULL, 'Tom B. Erichsen', 21, 'Norway'),
(292, NULL, 'Tom B. Erichsen', 21, 'Norway'),
(293, NULL, 'Tom B. Erichsen', 21, 'Norway'),
(294, NULL, 'Tom B. Erichsen', 21, 'Norway'),
(295, NULL, 'Tom B. Erichsen', 21, 'Norway'),
(296, NULL, 'Tom B. Erichsen', 21, 'Norway'),
(297, NULL, 'Tom B. Erichsen', 21, 'Norway'),
(298, NULL, 'Tom B. Erichsen', 21, 'Norway'),
(299, NULL, 'Tom B. Erichsen', 21, 'Norway'),
(300, NULL, 'Tom B. Erichsen', 21, 'Norway'),
(301, NULL, 'Tom B. Erichsen', 21, 'Norway'),
(302, NULL, 'Tom B. Erichsen', 21, 'Norway'),
(303, NULL, 'Tom B. Erichsen', 21, 'Norway'),
(304, NULL, 'Tom B. Erichsen', 21, 'Norway'),
(305, NULL, 'Tom B. Erichsen', 21, 'Norway'),
(306, NULL, 'Tom B. Erichsen', 21, 'Norway'),
(307, NULL, 'Tom B. Erichsen', 21, 'Norway'),
(308, NULL, 'Tom B. Erichsen', 21, 'Norway'),
(309, NULL, 'Tom B. Erichsen', 21, 'Norway'),
(310, NULL, 'Tom B. Erichsen', 21, 'Norway'),
(311, NULL, 'Tom & Jerry', 21, 'Norway'),
(312, NULL, 'Tom B. Erichsen', 21, 'Norway'),
(313, NULL, 'Tom B. Erichsen', 21, 'Norway'),
(314, NULL, 'Tom B. Erichsen', 21, 'Norway'),
(319, NULL, 'dada', 23, 'sasa'),
(320, NULL, 'mamak', 32, 'bandung'),
(321, NULL, 'anri', 39, 'Jepang'),
(322, NULL, 'bamal', 34, 'cimahi'),
(323, NULL, 'andy centik', 18, 'cimahi'),
(324, NULL, 'nan', 100, 'One Piece'),
(325, NULL, 'Naenen', 23, 'jepang'),
(328, NULL, 'Daidai', 32, 'China'),
(330, NULL, 'Bambank', 33, 'Bandung'),
(336, NULL, 'Lauma', 24, 'Nod Krai'),
(337, NULL, 'Anr', 39, 'Jepang'),
(339, NULL, 'Mas Bambang', 38, 'Jogja'),
(340, NULL, 'Mogamoga', 38, 'Aceh');

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
(237, 46, 13),
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
(289, 337, 6),
(290, 337, 7),
(298, 339, 5),
(299, 339, 13),
(300, 339, 21),
(302, 340, 5),
(303, 340, 6),
(304, 340, 7),
(305, 340, 9),
(316, 44, 6),
(317, 44, 9),
(318, 44, 13),
(319, 44, 21),
(320, 44, 34),
(321, 48, 5),
(322, 48, 6),
(323, 48, 7),
(324, 48, 9),
(325, 48, 12),
(358, 51, 5),
(359, 51, 7),
(360, 51, 13),
(361, 51, 21),
(362, 51, 34);

-- --------------------------------------------------------

--
-- Struktur dari tabel `user`
--

CREATE TABLE `user` (
  `id` int(11) NOT NULL,
  `username` varchar(50) NOT NULL,
  `password` varchar(255) NOT NULL,
  `role` enum('admin','guru','siswa') NOT NULL,
  `id_siswa` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data untuk tabel `user`
--

INSERT INTO `user` (`id`, `username`, `password`, `role`, `id_siswa`) VALUES
(6, 'admin', '$2y$10$rX3uFOEFMLNaQosIOm7QZOuSQp2Dg0GVNuCwZ9FnProhBzWikyzYS', 'admin', 0),
(10, '10116309', '$2y$10$uAQgBGqsU80hkOHipsXJN.0ytetNBCN4HaLfwVvUSdUR1Jsy1HwK.', 'siswa', 44),
(11, '10116310', '$2y$10$9.RvX9zpC6w9RbtmfOSBl.3HNBlvhwSB.j6VBwXJoYA/6XWLkcvR2', 'siswa', 46),
(12, '10116301', '$2y$10$mX59RX4aQgPN7bd2dZbCheo9SCBEZjHU2Yp4BrWNgpJ4jyBU28Un6', 'siswa', 47),
(13, '10116302', '$2y$10$EB.Y2qtSZh8XCVj2gwHli.G1Fje1WtNL51QDvN7NcBXZM3LjQUTYS', 'siswa', 48),
(14, '10116303', '$2y$10$3knmgpnk9OyC3AXYBEpuKuEzYgPpXnrb.aV/ZzQiM9oSFIwKqRDgK', 'siswa', 50),
(15, '10116304', '$2y$10$.EIlfgQcnx5v9rg5rL7SSeB4H3IaPMkEGM8q4Rni2zqwZLBETtSla', 'siswa', 51),
(16, '10116305', '$2y$10$kS6pjwI8tonhZ4aM8qq4Ue.0sfK5jAlCBEUZ0AvKdYC/viOlq9ftu', 'siswa', 53),
(17, '10116306', '$2y$10$f6BQOPjufb0faccnuJDaHeXgLmoXxpLhFHn6ZVwgiYeQ7YNMIgEI2', 'siswa', 54),
(18, '10116307', '$2y$10$VXmxt1.CtfXW3VYPSfwwzO.nnuZdiPWW39ZJhd1YNzge2mBjDZjIK', 'siswa', 55),
(19, '10116308', '$2y$10$5iPIEuhsNOxuQJNSuHPEYusaQuEnjruAxEc0GyPlXXY5GJrfZUuK6', 'siswa', 52),
(20, 'guru1', '$2y$10$gnFBEb6WBqshSkPOKq9vH.xp5gGELb8WKURlqCGMdVWwBbCzoi8ci', 'guru', 0),
(21, 'guru2', '$2y$10$94maZekeM7r248wbmXFHVeDBuADRJ.1jb2cllTfdsd5BGDbUwyMOq', 'guru', 0),
(22, 'guru3', '$2y$10$/dLJE.jWw9ftLKFxOeAiUeOA2fhZcLznwjwtCDFu79ySuYOeKiVAu', 'guru', 0),
(23, 'guru4', '$2y$10$vqCHjKgKU.dej5rSQ/TisuD0Qk29QCot4TMyttx.Wkjd0BahsSqNK', 'guru', 0),
(24, 'guru5', '$2y$10$1rjlofeNHWXrUE/fCf0A9OAlzes3hkicwfmoKUqPnpONvDcxpNw/W', 'guru', 0);

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
  MODIFY `id_mapel` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=39;

--
-- AUTO_INCREMENT untuk tabel `siswa`
--
ALTER TABLE `siswa`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=343;

--
-- AUTO_INCREMENT untuk tabel `siswa_mapel`
--
ALTER TABLE `siswa_mapel`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=363;

--
-- AUTO_INCREMENT untuk tabel `user`
--
ALTER TABLE `user`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=25;

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
