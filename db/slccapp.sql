-- phpMyAdmin SQL Dump
-- version 5.0.3
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Waktu pembuatan: 04 Mar 2021 pada 01.44
-- Versi server: 10.4.14-MariaDB
-- Versi PHP: 7.4.11

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `slccapp`
--

-- --------------------------------------------------------

--
-- Struktur dari tabel `berita`
--

CREATE TABLE `berita` (
  `id` int(8) NOT NULL,
  `judul` varchar(255) DEFAULT NULL,
  `berita` text DEFAULT NULL,
  `tgl_berita` varchar(255) DEFAULT NULL,
  `title` varchar(255) DEFAULT NULL,
  `news` text DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Struktur dari tabel `bidang`
--

CREATE TABLE `bidang` (
  `id` int(11) NOT NULL,
  `bidang` varchar(190) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Struktur dari tabel `campus_hiring`
--

CREATE TABLE `campus_hiring` (
  `id` int(11) NOT NULL,
  `judul` varchar(255) DEFAULT NULL,
  `isi` text DEFAULT NULL,
  `tgl` timestamp NULL DEFAULT current_timestamp(),
  `status` int(10) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Struktur dari tabel `city`
--

CREATE TABLE `city` (
  `id` char(4) COLLATE utf8_unicode_ci NOT NULL,
  `province_id` char(2) COLLATE utf8_unicode_ci NOT NULL,
  `name` varchar(255) COLLATE utf8_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Struktur dari tabel `contact`
--

CREATE TABLE `contact` (
  `id` int(11) NOT NULL,
  `name` varchar(100) DEFAULT NULL,
  `email` varchar(100) DEFAULT NULL,
  `phone` varchar(20) DEFAULT NULL,
  `message` text DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Struktur dari tabel `data_pendidikan`
--

CREATE TABLE `data_pendidikan` (
  `id` int(10) NOT NULL,
  `id_user` int(10) DEFAULT NULL,
  `id_kat_pendidikan` int(3) DEFAULT NULL,
  `nama` varchar(100) DEFAULT NULL,
  `tahun_lulus` varchar(5) DEFAULT NULL,
  `type` int(2) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Struktur dari tabel `data_sertifikasi`
--

CREATE TABLE `data_sertifikasi` (
  `id` int(11) NOT NULL,
  `id_user` int(11) NOT NULL,
  `level` int(10) DEFAULT NULL,
  `nomor` varchar(40) DEFAULT NULL,
  `id_lembaga_sertifikasi` int(11) DEFAULT NULL,
  `judul_sertifikasi` varchar(255) DEFAULT NULL,
  `id_bidang_sertifikasi` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Struktur dari tabel `external_link`
--

CREATE TABLE `external_link` (
  `id` int(11) NOT NULL,
  `title` varchar(255) DEFAULT NULL,
  `url` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `external_link`
--

INSERT INTO `external_link` (`id`, `title`, `url`) VALUES
(2, 'Google', 'www.google.co.id'),
(3, 'Wikipedia', 'www.wikipedia.org');

-- --------------------------------------------------------

--
-- Struktur dari tabel `faq`
--

CREATE TABLE `faq` (
  `id` int(11) NOT NULL,
  `question` varchar(255) DEFAULT NULL,
  `answer` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Struktur dari tabel `feature_section`
--

CREATE TABLE `feature_section` (
  `id` int(11) NOT NULL,
  `title` varchar(100) DEFAULT NULL,
  `icon` varchar(255) DEFAULT NULL,
  `link` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Struktur dari tabel `files`
--

CREATE TABLE `files` (
  `id` int(11) NOT NULL,
  `file` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Struktur dari tabel `gallery`
--

CREATE TABLE `gallery` (
  `id` int(11) NOT NULL,
  `title` varchar(255) DEFAULT NULL,
  `description` text DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Struktur dari tabel `groups`
--

CREATE TABLE `groups` (
  `id` mediumint(8) UNSIGNED NOT NULL,
  `name` varchar(20) NOT NULL,
  `description` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data untuk tabel `groups`
--

INSERT INTO `groups` (`id`, `name`, `description`) VALUES
(1, 'admin', 'Administrator');

-- --------------------------------------------------------

--
-- Struktur dari tabel `header`
--

CREATE TABLE `header` (
  `id` int(11) NOT NULL,
  `gambar` text DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Struktur dari tabel `images_gallery`
--

CREATE TABLE `images_gallery` (
  `id` int(11) NOT NULL,
  `id_gallery` int(11) DEFAULT NULL,
  `title` varchar(255) DEFAULT NULL,
  `images` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Struktur dari tabel `kategori_pendidikan`
--

CREATE TABLE `kategori_pendidikan` (
  `id` int(11) NOT NULL,
  `pendidikan` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Struktur dari tabel `kat_perusahaan`
--

CREATE TABLE `kat_perusahaan` (
  `id` int(11) NOT NULL,
  `jenis` varchar(35) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Struktur dari tabel `kat_sertifikasi`
--

CREATE TABLE `kat_sertifikasi` (
  `id` int(11) NOT NULL,
  `sertifikasi` varchar(255) DEFAULT NULL,
  `jenis` int(3) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Struktur dari tabel `login_attempts`
--

CREATE TABLE `login_attempts` (
  `id` int(11) UNSIGNED NOT NULL,
  `ip_address` varchar(45) NOT NULL,
  `login` varchar(100) NOT NULL,
  `time` int(11) UNSIGNED DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Struktur dari tabel `lowongan`
--

CREATE TABLE `lowongan` (
  `id` int(10) NOT NULL,
  `id_perusahaan` int(10) DEFAULT NULL,
  `lowongan` varchar(255) DEFAULT NULL,
  `min_pendidikan` varchar(100) DEFAULT NULL,
  `penempatan` varchar(255) DEFAULT NULL,
  `batas_waktu` date DEFAULT NULL,
  `detail_lowongan` text DEFAULT NULL,
  `butuh_orang` int(10) DEFAULT NULL,
  `status` int(10) DEFAULT NULL,
  `tgl` timestamp NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Struktur dari tabel `menu`
--

CREATE TABLE `menu` (
  `id` int(11) NOT NULL,
  `menu` varchar(255) DEFAULT NULL,
  `slug` varchar(255) DEFAULT NULL,
  `is_url` int(11) NOT NULL,
  `parameter` varchar(200) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `menu`
--

INSERT INTO `menu` (`id`, `menu`, `slug`, `is_url`, `parameter`) VALUES
(1, 'Beranda', 'beranda', 0, ''),
(2, 'Program', 'program', 0, 'target=\'_blank\''),
(3, 'Struktur', 'struktur', 0, 'target=\'_blank\''),
(4, 'SKGB', 'skgb', 0, 'target=\'_blank\''),
(5, 'BIMTEK', 'bimtek', 0, ''),
(6, 'Pengumuman', 'pengumuman', 0, 'target=\'_blank\'');

-- --------------------------------------------------------

--
-- Struktur dari tabel `news_section`
--

CREATE TABLE `news_section` (
  `id` int(11) NOT NULL,
  `title` varchar(100) DEFAULT NULL,
  `id_kategori` int(3) DEFAULT NULL,
  `arrange` int(3) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `news_section`
--

INSERT INTO `news_section` (`id`, `title`, `id_kategori`, `arrange`) VALUES
(1, 'Widget A', 1, 1),
(2, 'Widget B', 1, 2),
(3, 'Widget C', 2, 3),
(4, 'Widget D', 3, 4),
(5, 'Widget E', 4, 6),
(6, 'Widget F', 5, 5);

-- --------------------------------------------------------

--
-- Struktur dari tabel `page`
--

CREATE TABLE `page` (
  `id` int(11) NOT NULL,
  `judul` varchar(255) DEFAULT NULL,
  `isi` text DEFAULT NULL,
  `created` timestamp NULL DEFAULT current_timestamp(),
  `updated` timestamp NULL DEFAULT NULL ON UPDATE current_timestamp(),
  `slug` varchar(255) DEFAULT NULL,
  `title` varchar(255) DEFAULT NULL,
  `content` text DEFAULT NULL,
  `template` int(2) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `page`
--

INSERT INTO `page` (`id`, `judul`, `isi`, `created`, `updated`, `slug`, `title`, `content`, `template`) VALUES
(25, 'Halaman A', '<p>Ini isi Halaman A</p>', '2021-03-03 06:06:06', NULL, 'halaman-a', '', '', 0),
(26, 'Halaman B', '<p>Ini isi Halaman B</p>', '2021-03-03 06:06:20', NULL, 'halaman-b', '', '', 1);

-- --------------------------------------------------------

--
-- Struktur dari tabel `panel_berita`
--

CREATE TABLE `panel_berita` (
  `id` int(11) NOT NULL,
  `id_kategori` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Struktur dari tabel `pengalaman`
--

CREATE TABLE `pengalaman` (
  `id` int(11) NOT NULL,
  `nama_perusahaan` varchar(60) DEFAULT NULL,
  `jabatan` varchar(255) DEFAULT NULL,
  `tahun_masuk` varchar(255) DEFAULT NULL,
  `tahun_keluar` varchar(255) DEFAULT NULL,
  `id_user` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Struktur dari tabel `perusahaan`
--

CREATE TABLE `perusahaan` (
  `id` int(11) NOT NULL,
  `perusahaan` varchar(255) DEFAULT NULL,
  `jenis_perusahaan` int(3) DEFAULT NULL,
  `bergabung_sejak` date DEFAULT NULL,
  `logo` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Struktur dari tabel `post`
--

CREATE TABLE `post` (
  `id` int(11) NOT NULL,
  `judul` varchar(255) DEFAULT NULL,
  `isi` text DEFAULT NULL,
  `created` timestamp NULL DEFAULT current_timestamp(),
  `updated` timestamp NULL DEFAULT NULL ON UPDATE current_timestamp(),
  `slug` varchar(255) DEFAULT NULL,
  `featured_image` varchar(255) DEFAULT NULL,
  `title` varchar(255) DEFAULT NULL,
  `content` text DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `post`
--

INSERT INTO `post` (`id`, `judul`, `isi`, `created`, `updated`, `slug`, `featured_image`, `title`, `content`) VALUES
(1, 'Tulisan A', '<p>Ini isi Tulisan A</p>', '2021-03-03 06:04:41', NULL, 'tulisan-a', '', '', ''),
(2, 'Tulisan B', '<p>Ini isi Tulisan B</p>', '2021-03-03 06:05:22', NULL, 'tulisan-b', '', '', '');

-- --------------------------------------------------------

--
-- Struktur dari tabel `post_detail`
--

CREATE TABLE `post_detail` (
  `id` int(11) NOT NULL,
  `id_post` int(11) DEFAULT NULL,
  `id_kategori` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `post_detail`
--

INSERT INTO `post_detail` (`id`, `id_post`, `id_kategori`) VALUES
(1, 1, 4),
(2, 2, 2);

-- --------------------------------------------------------

--
-- Struktur dari tabel `post_kategori`
--

CREATE TABLE `post_kategori` (
  `id` int(11) NOT NULL,
  `kategori` varchar(255) DEFAULT NULL,
  `slug` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `post_kategori`
--

INSERT INTO `post_kategori` (`id`, `kategori`, `slug`) VALUES
(1, 'Berita', 'berita'),
(2, 'Pengumuman', 'pengumuman'),
(3, 'Event', 'Event'),
(4, 'Info Pendaftaran', 'Info-Pendaftaran'),
(5, 'Info Penting', 'Info-Penting');

-- --------------------------------------------------------

--
-- Struktur dari tabel `program_studi`
--

CREATE TABLE `program_studi` (
  `id` int(11) NOT NULL,
  `nama_program` varchar(255) DEFAULT NULL,
  `deskripsi` text DEFAULT NULL,
  `program_name` varchar(255) DEFAULT NULL,
  `description` text DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Struktur dari tabel `provinces`
--

CREATE TABLE `provinces` (
  `id` char(2) COLLATE utf8_unicode_ci NOT NULL,
  `name` varchar(255) COLLATE utf8_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data untuk tabel `provinces`
--

INSERT INTO `provinces` (`id`, `name`) VALUES
('11', 'ACEH'),
('12', 'SUMATERA UTARA'),
('13', 'SUMATERA BARAT'),
('14', 'RIAU'),
('15', 'JAMBI'),
('16', 'SUMATERA SELATAN'),
('17', 'BENGKULU'),
('18', 'LAMPUNG'),
('19', 'KEPULAUAN BANGKA BELITUNG'),
('21', 'KEPULAUAN RIAU'),
('31', 'DKI JAKARTA'),
('32', 'JAWA BARAT'),
('33', 'JAWA TENGAH'),
('34', 'DI YOGYAKARTA'),
('35', 'JAWA TIMUR'),
('36', 'BANTEN'),
('51', 'BALI'),
('52', 'NUSA TENGGARA BARAT'),
('53', 'NUSA TENGGARA TIMUR'),
('61', 'KALIMANTAN BARAT'),
('62', 'KALIMANTAN TENGAH'),
('63', 'KALIMANTAN SELATAN'),
('64', 'KALIMANTAN TIMUR'),
('65', 'KALIMANTAN UTARA'),
('71', 'SULAWESI UTARA'),
('72', 'SULAWESI TENGAH'),
('73', 'SULAWESI SELATAN'),
('74', 'SULAWESI TENGGARA'),
('75', 'GORONTALO'),
('76', 'SULAWESI BARAT'),
('81', 'MALUKU'),
('82', 'MALUKU UTARA'),
('91', 'PAPUA BARAT'),
('94', 'PAPUA');

-- --------------------------------------------------------

--
-- Struktur dari tabel `settings`
--

CREATE TABLE `settings` (
  `id` int(11) NOT NULL,
  `website_name` varchar(100) DEFAULT NULL,
  `website_url` varchar(100) DEFAULT NULL,
  `facebook_url` varchar(100) DEFAULT NULL,
  `instagram_url` varchar(100) DEFAULT NULL,
  `twitter_url` varchar(100) DEFAULT NULL,
  `email` varchar(100) DEFAULT NULL,
  `about_section` varchar(100) DEFAULT NULL,
  `carousel` int(11) DEFAULT NULL,
  `feature_section` varchar(100) DEFAULT NULL,
  `foot1` varchar(100) DEFAULT NULL,
  `foot2` varchar(100) DEFAULT NULL,
  `foot3` varchar(100) DEFAULT NULL,
  `foot4` varchar(100) DEFAULT NULL,
  `logo` varchar(100) DEFAULT NULL,
  `alamat` varchar(255) DEFAULT NULL,
  `fax` varchar(30) DEFAULT NULL,
  `telp` varchar(30) DEFAULT NULL,
  `about_text` text DEFAULT NULL,
  `about_images` varchar(255) DEFAULT NULL,
  `lbanner_images` varchar(125) NOT NULL,
  `lbanner_tagline` varchar(125) NOT NULL,
  `site_tagline` varchar(125) NOT NULL,
  `permalink` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `settings`
--

INSERT INTO `settings` (`id`, `website_name`, `website_url`, `facebook_url`, `instagram_url`, `twitter_url`, `email`, `about_section`, `carousel`, `feature_section`, `foot1`, `foot2`, `foot3`, `foot4`, `logo`, `alamat`, `fax`, `telp`, `about_text`, `about_images`, `lbanner_images`, `lbanner_tagline`, `site_tagline`, `permalink`) VALUES
(0, 'SLCC PGRI Wonosobo', 'www.slccpgriwonosobo.org', '#', '#', '#', 'slccpgriwonosobo@pgri.or.id', '', 1, '', '', '', '', '', 'SLCC-removebg-preview.png', 'Jl Sunan Kalijaga Berkoh, Purwokerto Selatan, Banyumas Jawa Tengah, Indonesia 53146', '', '(0281) 6512290', '<p>Ini Greeting</p>', 'Koala.jpg', 'banner-left.png', 'Smart Learning Character Center', 'Smart Learning Character Center', 2);

-- --------------------------------------------------------

--
-- Struktur dari tabel `sidebar`
--

CREATE TABLE `sidebar` (
  `id` int(11) NOT NULL,
  `title` varchar(255) DEFAULT NULL,
  `jenis` int(3) DEFAULT NULL,
  `id_kategori` int(3) DEFAULT NULL,
  `table` varchar(255) DEFAULT NULL,
  `isi` text DEFAULT NULL,
  `limit` int(3) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `sidebar`
--

INSERT INTO `sidebar` (`id`, `title`, `jenis`, `id_kategori`, `table`, `isi`, `limit`) VALUES
(1, 'Side Widget A', 2, 1, NULL, '', 0),
(2, 'Side Widget B', 2, 1, NULL, '', 0),
(3, 'Side Widget C', 3, 1, NULL, '<p>Ini isi Side Widget C</p>', 0),
(4, 'Side Widget D', 1, 1, NULL, '', 100);

-- --------------------------------------------------------

--
-- Struktur dari tabel `sidebar_arrange`
--

CREATE TABLE `sidebar_arrange` (
  `id` int(11) NOT NULL,
  `id_sidebar` int(3) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `sidebar_arrange`
--

INSERT INTO `sidebar_arrange` (`id`, `id_sidebar`) VALUES
(1, 1),
(2, 2),
(3, 3),
(4, 4);

-- --------------------------------------------------------

--
-- Struktur dari tabel `sidebar_opsi`
--

CREATE TABLE `sidebar_opsi` (
  `id` int(11) NOT NULL,
  `jenis` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `sidebar_opsi`
--

INSERT INTO `sidebar_opsi` (`id`, `jenis`) VALUES
(1, 'Artikel'),
(2, 'Kategori'),
(3, 'Pengumuman');

-- --------------------------------------------------------

--
-- Struktur dari tabel `sliders`
--

CREATE TABLE `sliders` (
  `id` int(11) NOT NULL,
  `image` varchar(255) DEFAULT NULL,
  `url` text NOT NULL,
  `level` int(11) DEFAULT NULL,
  `title` varchar(150) NOT NULL,
  `content` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Struktur dari tabel `submenu`
--

CREATE TABLE `submenu` (
  `id` int(11) NOT NULL,
  `id_menu` int(10) DEFAULT NULL,
  `submenu` varchar(255) DEFAULT NULL,
  `slug` varchar(255) DEFAULT NULL,
  `is_url` int(11) NOT NULL,
  `parameter` varchar(200) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `submenu`
--

INSERT INTO `submenu` (`id`, `id_menu`, `submenu`, `slug`, `is_url`, `parameter`) VALUES
(1, 5, 'AKM', 'akm', 0, 'target=\'_blank\'');

-- --------------------------------------------------------

--
-- Struktur dari tabel `tb_brosur`
--

CREATE TABLE `tb_brosur` (
  `id_brosur` int(11) NOT NULL,
  `nama_brosur` varchar(200) DEFAULT NULL,
  `link_brosur` varchar(200) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Struktur dari tabel `tb_organisasi`
--

CREATE TABLE `tb_organisasi` (
  `id` int(11) NOT NULL,
  `nama_organisasi` varchar(200) DEFAULT NULL,
  `nama_singkat` varchar(200) DEFAULT NULL,
  `web_url` varchar(200) DEFAULT NULL,
  `slug_organisasi` varchar(200) DEFAULT NULL,
  `status_organisasi` int(11) DEFAULT 1
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Struktur dari tabel `testimoni`
--

CREATE TABLE `testimoni` (
  `id` int(11) NOT NULL,
  `id_user` int(11) DEFAULT NULL,
  `isi` text DEFAULT NULL,
  `tanggal` timestamp NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Struktur dari tabel `top_menu`
--

CREATE TABLE `top_menu` (
  `id` int(3) NOT NULL,
  `title` varchar(255) NOT NULL,
  `url` varchar(255) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Struktur dari tabel `users`
--

CREATE TABLE `users` (
  `id` int(11) UNSIGNED NOT NULL,
  `ip_address` varchar(45) NOT NULL,
  `username` varchar(100) DEFAULT NULL,
  `password` varchar(255) NOT NULL,
  `salt` varchar(255) DEFAULT NULL,
  `email` varchar(254) NOT NULL,
  `activation_code` varchar(40) DEFAULT NULL,
  `forgotten_password_code` varchar(40) DEFAULT NULL,
  `forgotten_password_time` int(11) UNSIGNED DEFAULT NULL,
  `remember_code` varchar(40) DEFAULT NULL,
  `created_on` int(11) UNSIGNED NOT NULL,
  `last_login` int(11) UNSIGNED DEFAULT NULL,
  `active` tinyint(1) UNSIGNED DEFAULT NULL,
  `first_name` varchar(50) DEFAULT NULL,
  `last_name` varchar(50) DEFAULT NULL,
  `company` varchar(100) DEFAULT NULL,
  `phone` varchar(20) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data untuk tabel `users`
--

INSERT INTO `users` (`id`, `ip_address`, `username`, `password`, `salt`, `email`, `activation_code`, `forgotten_password_code`, `forgotten_password_time`, `remember_code`, `created_on`, `last_login`, `active`, `first_name`, `last_name`, `company`, `phone`) VALUES
(1, '127.0.0.1', 'administrator', '$2y$12$0Os7zz3d28mM/StrSK6xM.JDuKSllI6AqodCqu.KHgMc2qNl4Pg.e', '', 'admin@admin.com', '', NULL, NULL, 'JIQTvL22C28l6soX5V.mTO', 1268889823, 1614818023, 1, 'Admin', 'istrator', 'ADMIN', '0');

-- --------------------------------------------------------

--
-- Struktur dari tabel `users_groups`
--

CREATE TABLE `users_groups` (
  `id` int(11) UNSIGNED NOT NULL,
  `user_id` int(11) UNSIGNED NOT NULL,
  `group_id` mediumint(8) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data untuk tabel `users_groups`
--

INSERT INTO `users_groups` (`id`, `user_id`, `group_id`) VALUES
(1, 1, 1);

--
-- Indexes for dumped tables
--

--
-- Indeks untuk tabel `berita`
--
ALTER TABLE `berita`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `bidang`
--
ALTER TABLE `bidang`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `campus_hiring`
--
ALTER TABLE `campus_hiring`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `city`
--
ALTER TABLE `city`
  ADD PRIMARY KEY (`id`),
  ADD KEY `regencies_province_id_index` (`province_id`);

--
-- Indeks untuk tabel `contact`
--
ALTER TABLE `contact`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `data_pendidikan`
--
ALTER TABLE `data_pendidikan`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `data_sertifikasi`
--
ALTER TABLE `data_sertifikasi`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `external_link`
--
ALTER TABLE `external_link`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `faq`
--
ALTER TABLE `faq`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `feature_section`
--
ALTER TABLE `feature_section`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `files`
--
ALTER TABLE `files`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `gallery`
--
ALTER TABLE `gallery`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `groups`
--
ALTER TABLE `groups`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `header`
--
ALTER TABLE `header`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `images_gallery`
--
ALTER TABLE `images_gallery`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `kategori_pendidikan`
--
ALTER TABLE `kategori_pendidikan`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `kat_perusahaan`
--
ALTER TABLE `kat_perusahaan`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `kat_sertifikasi`
--
ALTER TABLE `kat_sertifikasi`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `login_attempts`
--
ALTER TABLE `login_attempts`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `lowongan`
--
ALTER TABLE `lowongan`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `menu`
--
ALTER TABLE `menu`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `news_section`
--
ALTER TABLE `news_section`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `page`
--
ALTER TABLE `page`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `unique` (`slug`);

--
-- Indeks untuk tabel `panel_berita`
--
ALTER TABLE `panel_berita`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `pengalaman`
--
ALTER TABLE `pengalaman`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `perusahaan`
--
ALTER TABLE `perusahaan`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `post`
--
ALTER TABLE `post`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `post_detail`
--
ALTER TABLE `post_detail`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `post_kategori`
--
ALTER TABLE `post_kategori`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `program_studi`
--
ALTER TABLE `program_studi`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `provinces`
--
ALTER TABLE `provinces`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `settings`
--
ALTER TABLE `settings`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `sidebar`
--
ALTER TABLE `sidebar`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `sidebar_arrange`
--
ALTER TABLE `sidebar_arrange`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `sidebar_opsi`
--
ALTER TABLE `sidebar_opsi`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `sliders`
--
ALTER TABLE `sliders`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `submenu`
--
ALTER TABLE `submenu`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `tb_brosur`
--
ALTER TABLE `tb_brosur`
  ADD PRIMARY KEY (`id_brosur`);

--
-- Indeks untuk tabel `tb_organisasi`
--
ALTER TABLE `tb_organisasi`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `testimoni`
--
ALTER TABLE `testimoni`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `top_menu`
--
ALTER TABLE `top_menu`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `users_groups`
--
ALTER TABLE `users_groups`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `uc_users_groups` (`user_id`,`group_id`),
  ADD KEY `fk_users_groups_users1_idx` (`user_id`),
  ADD KEY `fk_users_groups_groups1_idx` (`group_id`);

--
-- AUTO_INCREMENT untuk tabel yang dibuang
--

--
-- AUTO_INCREMENT untuk tabel `berita`
--
ALTER TABLE `berita`
  MODIFY `id` int(8) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT untuk tabel `bidang`
--
ALTER TABLE `bidang`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT untuk tabel `campus_hiring`
--
ALTER TABLE `campus_hiring`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT untuk tabel `contact`
--
ALTER TABLE `contact`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT untuk tabel `data_pendidikan`
--
ALTER TABLE `data_pendidikan`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT untuk tabel `data_sertifikasi`
--
ALTER TABLE `data_sertifikasi`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT untuk tabel `external_link`
--
ALTER TABLE `external_link`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT untuk tabel `faq`
--
ALTER TABLE `faq`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT untuk tabel `feature_section`
--
ALTER TABLE `feature_section`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT untuk tabel `files`
--
ALTER TABLE `files`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT untuk tabel `gallery`
--
ALTER TABLE `gallery`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=47;

--
-- AUTO_INCREMENT untuk tabel `groups`
--
ALTER TABLE `groups`
  MODIFY `id` mediumint(8) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT untuk tabel `images_gallery`
--
ALTER TABLE `images_gallery`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT untuk tabel `kategori_pendidikan`
--
ALTER TABLE `kategori_pendidikan`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT untuk tabel `kat_perusahaan`
--
ALTER TABLE `kat_perusahaan`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT untuk tabel `kat_sertifikasi`
--
ALTER TABLE `kat_sertifikasi`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT untuk tabel `login_attempts`
--
ALTER TABLE `login_attempts`
  MODIFY `id` int(11) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT untuk tabel `lowongan`
--
ALTER TABLE `lowongan`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT untuk tabel `menu`
--
ALTER TABLE `menu`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT untuk tabel `news_section`
--
ALTER TABLE `news_section`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT untuk tabel `page`
--
ALTER TABLE `page`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=27;

--
-- AUTO_INCREMENT untuk tabel `panel_berita`
--
ALTER TABLE `panel_berita`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT untuk tabel `pengalaman`
--
ALTER TABLE `pengalaman`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT untuk tabel `perusahaan`
--
ALTER TABLE `perusahaan`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT untuk tabel `post`
--
ALTER TABLE `post`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT untuk tabel `post_detail`
--
ALTER TABLE `post_detail`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT untuk tabel `post_kategori`
--
ALTER TABLE `post_kategori`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT untuk tabel `sidebar`
--
ALTER TABLE `sidebar`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT untuk tabel `sidebar_arrange`
--
ALTER TABLE `sidebar_arrange`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT untuk tabel `sidebar_opsi`
--
ALTER TABLE `sidebar_opsi`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT untuk tabel `sliders`
--
ALTER TABLE `sliders`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=49;

--
-- AUTO_INCREMENT untuk tabel `submenu`
--
ALTER TABLE `submenu`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT untuk tabel `tb_brosur`
--
ALTER TABLE `tb_brosur`
  MODIFY `id_brosur` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT untuk tabel `tb_organisasi`
--
ALTER TABLE `tb_organisasi`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT untuk tabel `testimoni`
--
ALTER TABLE `testimoni`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT untuk tabel `top_menu`
--
ALTER TABLE `top_menu`
  MODIFY `id` int(3) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT untuk tabel `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT untuk tabel `users_groups`
--
ALTER TABLE `users_groups`
  MODIFY `id` int(11) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- Ketidakleluasaan untuk tabel pelimpahan (Dumped Tables)
--

--
-- Ketidakleluasaan untuk tabel `city`
--
ALTER TABLE `city`
  ADD CONSTRAINT `city_ibfk_1` FOREIGN KEY (`province_id`) REFERENCES `provinces` (`id`);

--
-- Ketidakleluasaan untuk tabel `users_groups`
--
ALTER TABLE `users_groups`
  ADD CONSTRAINT `fk_users_groups_groups1` FOREIGN KEY (`group_id`) REFERENCES `groups` (`id`) ON DELETE CASCADE ON UPDATE NO ACTION,
  ADD CONSTRAINT `fk_users_groups_users1` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE ON UPDATE NO ACTION;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
