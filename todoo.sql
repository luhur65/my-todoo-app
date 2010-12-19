-- phpMyAdmin SQL Dump
-- version 4.8.4
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Waktu pembuatan: 19 Des 2010 pada 19.20
-- Versi server: 10.1.37-MariaDB
-- Versi PHP: 7.3.1

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `todoo`
--

-- --------------------------------------------------------

--
-- Struktur dari tabel `access`
--

CREATE TABLE `access` (
  `id_access` int(11) NOT NULL,
  `access` varchar(200) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `access`
--

INSERT INTO `access` (`id_access`, `access`) VALUES
(1, 'private'),
(2, 'public');

-- --------------------------------------------------------

--
-- Struktur dari tabel `navigation`
--

CREATE TABLE `navigation` (
  `id` int(11) NOT NULL,
  `title` varchar(255) NOT NULL,
  `info` varchar(255) NOT NULL,
  `styling` varchar(255) NOT NULL,
  `icon` varchar(255) NOT NULL,
  `url` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `navigation`
--

INSERT INTO `navigation` (`id`, `title`, `info`, `styling`, `icon`, `url`) VALUES
(1, 'My Todoo', 'Looking all my todoo list .', '', 'fa-folder-o', 'mytodo'),
(2, 'New Todoo', 'Create a new todoo for me .', '', 'fa-pencil', 'newtodo'),
(3, 'Acomplished', 'Looking my all acomplished todoo .', '', 'fa-check', 'acomplished'),
(4, 'Public Todoo', 'Look other people todoo and share yours', '', 'fa-users', 'publictodo'),
(5, 'Setting', 'Setting , User info and change account', '', 'fa-cog', 'setting');

-- --------------------------------------------------------

--
-- Struktur dari tabel `status`
--

CREATE TABLE `status` (
  `id_status` int(11) NOT NULL,
  `status` varchar(200) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `status`
--

INSERT INTO `status` (`id_status`, `status`) VALUES
(1, 'Acomplished'),
(2, 'Cancelled'),
(3, 'Working'),
(4, 'New');

-- --------------------------------------------------------

--
-- Struktur dari tabel `todoo`
--

CREATE TABLE `todoo` (
  `id_todoo` int(11) NOT NULL,
  `title` varchar(255) NOT NULL,
  `slug` varchar(250) NOT NULL,
  `info` text NOT NULL,
  `id_user` int(11) NOT NULL,
  `id_access` int(1) NOT NULL,
  `id_status` int(1) NOT NULL,
  `date_created` int(11) NOT NULL,
  `date_finished` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `todoo`
--

INSERT INTO `todoo` (`id_todoo`, `title`, `slug`, `info`, `id_user`, `id_access`, `id_status`, `date_created`, `date_finished`) VALUES
(2, 'Push Rank Sampai ke Master di Game Free Fire & Top Kill', 'push-rank-sampai-ke-master-di-game-free-fire-top-kill', 'Saya ingin bermain Game free fire dan mencapai rank master serta bisa top kill dengan banyak .', 1, 2, 1, 1596515912, 1292808954),
(6, 'Todoo Title', 'todoo-title', 'Todoo Info', 1, 1, 1, 1596544911, 1292809904),
(7, 'Belajar Framework Django', 'belajar-framework-django', 'Ingin Belajar Framework Django', 1, 1, 1, 1596545683, 1292800429),
(9, 'Dharma', 'dharma', 'Papipapipum ..... !!!', 2, 2, 2, 1292803534, 0),
(10, '21 August , Mukbang Gawr Gura', '21-august-mukbang-gawr-gura', 'Mukbang with Gawr Gura , Sharkkk', 1, 1, 3, 1292803292, 0),
(11, 'Mukbang with Gawr Gura', 'mukbang-with-gawr-gura', 'Yeaaah colaborating mukbang with gawr gura !!', 2, 2, 4, 1292804231, 0);

-- --------------------------------------------------------

--
-- Struktur dari tabel `user`
--

CREATE TABLE `user` (
  `id` int(11) NOT NULL,
  `full_name` varchar(255) NOT NULL,
  `nickname` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `identify` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `user`
--

INSERT INTO `user` (`id`, `full_name`, `nickname`, `password`, `identify`) VALUES
(1, 'Dharma Bakti Situmorang', 'luhur65', '$2y$10$Jr1bosVE0wJytlgSJQLnj.YWZ0NJHP1CVvDPDlLNjHh5ptB5lKNzO', 'real'),
(2, 'Anonymous User', 'user@oauth3113', '4dnpsMA=', 'guest');

--
-- Indexes for dumped tables
--

--
-- Indeks untuk tabel `access`
--
ALTER TABLE `access`
  ADD PRIMARY KEY (`id_access`);

--
-- Indeks untuk tabel `navigation`
--
ALTER TABLE `navigation`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `status`
--
ALTER TABLE `status`
  ADD PRIMARY KEY (`id_status`);

--
-- Indeks untuk tabel `todoo`
--
ALTER TABLE `todoo`
  ADD PRIMARY KEY (`id_todoo`);

--
-- Indeks untuk tabel `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT untuk tabel yang dibuang
--

--
-- AUTO_INCREMENT untuk tabel `navigation`
--
ALTER TABLE `navigation`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT untuk tabel `status`
--
ALTER TABLE `status`
  MODIFY `id_status` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT untuk tabel `todoo`
--
ALTER TABLE `todoo`
  MODIFY `id_todoo` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT untuk tabel `user`
--
ALTER TABLE `user`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
