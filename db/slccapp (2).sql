-- phpMyAdmin SQL Dump
-- version 5.0.4
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Mar 04, 2021 at 10:07 AM
-- Server version: 10.4.17-MariaDB
-- PHP Version: 7.3.27

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
-- Table structure for table `berita`
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
-- Table structure for table `bidang`
--

CREATE TABLE `bidang` (
  `id` int(11) NOT NULL,
  `bidang` varchar(190) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `campus_hiring`
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
-- Table structure for table `city`
--

CREATE TABLE `city` (
  `id` char(4) COLLATE utf8_unicode_ci NOT NULL,
  `province_id` char(2) COLLATE utf8_unicode_ci NOT NULL,
  `name` varchar(255) COLLATE utf8_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `contact`
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
-- Table structure for table `data_pendidikan`
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
-- Table structure for table `data_sertifikasi`
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
-- Table structure for table `external_link`
--

CREATE TABLE `external_link` (
  `id` int(11) NOT NULL,
  `title` varchar(255) DEFAULT NULL,
  `url` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `external_link`
--

INSERT INTO `external_link` (`id`, `title`, `url`) VALUES
(2, 'Google', 'www.google.co.id'),
(3, 'Wikipedia', 'www.wikipedia.org');

-- --------------------------------------------------------

--
-- Table structure for table `faq`
--

CREATE TABLE `faq` (
  `id` int(11) NOT NULL,
  `question` varchar(255) DEFAULT NULL,
  `answer` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `feature_section`
--

CREATE TABLE `feature_section` (
  `id` int(11) NOT NULL,
  `title` varchar(100) DEFAULT NULL,
  `icon` varchar(255) DEFAULT NULL,
  `link` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `feature_section`
--

INSERT INTO `feature_section` (`id`, `title`, `icon`, `link`) VALUES
(7, 'Google', '001-search.png', 'www.google.com');

-- --------------------------------------------------------

--
-- Table structure for table `files`
--

CREATE TABLE `files` (
  `id` int(11) NOT NULL,
  `file` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `gallery`
--

CREATE TABLE `gallery` (
  `id` int(11) NOT NULL,
  `title` varchar(255) DEFAULT NULL,
  `description` text DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `groups`
--

CREATE TABLE `groups` (
  `id` mediumint(8) UNSIGNED NOT NULL,
  `name` varchar(20) NOT NULL,
  `description` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `groups`
--

INSERT INTO `groups` (`id`, `name`, `description`) VALUES
(1, 'admin', 'Administrator');

-- --------------------------------------------------------

--
-- Table structure for table `header`
--

CREATE TABLE `header` (
  `id` int(11) NOT NULL,
  `gambar` text DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `images_gallery`
--

CREATE TABLE `images_gallery` (
  `id` int(11) NOT NULL,
  `id_gallery` int(11) DEFAULT NULL,
  `title` varchar(255) DEFAULT NULL,
  `images` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `kategori_pendidikan`
--

CREATE TABLE `kategori_pendidikan` (
  `id` int(11) NOT NULL,
  `pendidikan` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `kat_perusahaan`
--

CREATE TABLE `kat_perusahaan` (
  `id` int(11) NOT NULL,
  `jenis` varchar(35) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `kat_sertifikasi`
--

CREATE TABLE `kat_sertifikasi` (
  `id` int(11) NOT NULL,
  `sertifikasi` varchar(255) DEFAULT NULL,
  `jenis` int(3) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `login_attempts`
--

CREATE TABLE `login_attempts` (
  `id` int(11) UNSIGNED NOT NULL,
  `ip_address` varchar(45) NOT NULL,
  `login` varchar(100) NOT NULL,
  `time` int(11) UNSIGNED DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `lowongan`
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
-- Table structure for table `menu`
--

CREATE TABLE `menu` (
  `id` int(11) NOT NULL,
  `menu` varchar(255) DEFAULT NULL,
  `slug` varchar(255) DEFAULT NULL,
  `is_url` int(11) NOT NULL,
  `parameter` varchar(200) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `menu`
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
-- Table structure for table `news_section`
--

CREATE TABLE `news_section` (
  `id` int(11) NOT NULL,
  `title` varchar(100) DEFAULT NULL,
  `id_kategori` int(3) DEFAULT NULL,
  `arrange` int(3) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `news_section`
--

INSERT INTO `news_section` (`id`, `title`, `id_kategori`, `arrange`) VALUES
(16, 'Widget A', 1, 1),
(17, 'Widget B', 2, 2),
(18, 'Widget C', 3, 5),
(19, 'Widget D', 4, 5),
(20, 'Widget E', 5, 5);

-- --------------------------------------------------------

--
-- Table structure for table `page`
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
-- Dumping data for table `page`
--

INSERT INTO `page` (`id`, `judul`, `isi`, `created`, `updated`, `slug`, `title`, `content`, `template`) VALUES
(25, 'Halaman A', '<p>Ini isi Halaman A</p>', '2021-03-03 06:06:06', NULL, 'halaman-a', '', '', 0),
(26, 'Halaman B', '<p>Ini isi Halaman B</p>', '2021-03-03 06:06:20', NULL, 'halaman-b', '', '', 1);

-- --------------------------------------------------------

--
-- Table structure for table `panel_berita`
--

CREATE TABLE `panel_berita` (
  `id` int(11) NOT NULL,
  `id_kategori` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `pengalaman`
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
-- Table structure for table `perusahaan`
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
-- Table structure for table `post`
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
-- Dumping data for table `post`
--

INSERT INTO `post` (`id`, `judul`, `isi`, `created`, `updated`, `slug`, `featured_image`, `title`, `content`) VALUES
(1, 'Tulisan A', '<p xss=\"removed\">Lorem ipsum dolor sit amet, consectetur adipiscing elit. Nam mollis nisl sit amet sagittis congue. Donec pretium orci mauris, eget volutpat mauris fringilla ut. Nam mollis mattis nisi nec blandit. Aenean dictum congue velit, laoreet iaculis metus cursus a. Nam volutpat interdum arcu tristique tincidunt. Sed mollis ut sem non viverra. Maecenas diam odio, congue nec aliquet nec, tincidunt at ante. Etiam non arcu feugiat, tincidunt nibh vel, mattis leo.</p>\r\n<p xss=\"removed\">Suspendisse gravida risus sit amet facilisis eleifend. Curabitur eu nisi interdum, venenatis lorem sed, imperdiet mauris. Nunc at efficitur eros, quis mattis arcu. Aliquam metus ipsum, mollis eget eros non, sollicitudin ullamcorper est. Duis congue suscipit dolor sit amet bibendum. Etiam ut fringilla augue. Nunc in lorem eget massa dapibus congue quis vel magna. Nunc molestie molestie convallis. Integer ut mollis massa. Etiam a ligula molestie, lobortis lacus sit amet, iaculis urna. Praesent vulputate magna nulla, eget tincidunt justo viverra et. Morbi aliquet leo eu posuere varius. Duis non lacus sit amet quam facilisis mattis. Donec lacus nisi, ullamcorper at ligula vel, aliquam auctor dolor. Nulla et lacus pharetra, accumsan enim ut, blandit odio.</p>', '2021-03-03 06:04:41', '2021-03-04 08:46:31', 'tulisan-a', '', '', ''),
(2, 'Tulisan B', '<p xss=\"removed\">Lorem ipsum dolor sit amet, consectetur adipiscing elit. Nam mollis nisl sit amet sagittis congue. Donec pretium orci mauris, eget volutpat mauris fringilla ut. Nam mollis mattis nisi nec blandit. Aenean dictum congue velit, laoreet iaculis metus cursus a. Nam volutpat interdum arcu tristique tincidunt. Sed mollis ut sem non viverra. Maecenas diam odio, congue nec aliquet nec, tincidunt at ante. Etiam non arcu feugiat, tincidunt nibh vel, mattis leo.</p>\r\n<p xss=\"removed\">Suspendisse gravida risus sit amet facilisis eleifend. Curabitur eu nisi interdum, venenatis lorem sed, imperdiet mauris. Nunc at efficitur eros, quis mattis arcu. Aliquam metus ipsum, mollis eget eros non, sollicitudin ullamcorper est. Duis congue suscipit dolor sit amet bibendum. Etiam ut fringilla augue. Nunc in lorem eget massa dapibus congue quis vel magna. Nunc molestie molestie convallis. Integer ut mollis massa. Etiam a ligula molestie, lobortis lacus sit amet, iaculis urna. Praesent vulputate magna nulla, eget tincidunt justo viverra et. Morbi aliquet leo eu posuere varius. Duis non lacus sit amet quam facilisis mattis. Donec lacus nisi, ullamcorper at ligula vel, aliquam auctor dolor. Nulla et lacus pharetra, accumsan enim ut, blandit odio.</p>', '2021-03-03 06:05:22', '2021-03-04 08:39:49', 'tulisan-b', '', '', ''),
(3, 'Tulisan C', '<p xss=\"removed\">Lorem ipsum dolor sit amet, consectetur adipiscing elit. Nullam cursus ante a felis egestas aliquet. Nam vel posuere arcu. In in aliquet dolor. Vivamus quis tincidunt felis, nec fermentum velit. Morbi nibh ligula, pellentesque quis nunc vel, suscipit dictum massa. Etiam arcu magna, iaculis et ipsum ut, luctus porta ex. Integer sed ex ligula. Praesent gravida tellus ac mi cursus luctus.</p>\r\n<p xss=\"removed\">Duis nisl dui, tristique in nibh ut, ornare dignissim leo. Ut nec metus ac arcu interdum mollis. Orci varius natoque penatibus et magnis dis parturient montes, nascetur ridiculus mus. Donec aliquet porttitor lectus ut laoreet. Donec suscipit sem ut elit venenatis, a tincidunt purus varius. Vestibulum quam metus, posuere id massa non, sodales auctor justo. Aliquam malesuada turpis vitae tempor scelerisque. Ut laoreet suscipit ornare. Mauris ut dapibus purus. Sed dapibus dolor quis quam placerat ornare.</p>', '2021-03-04 02:27:32', '2021-03-04 08:40:09', 'tulisan-c', '', '', ''),
(4, 'Tulisan D', '<p xss=\"removed\">Lorem ipsum dolor sit amet, consectetur adipiscing elit. Nullam cursus ante a felis egestas aliquet. Nam vel posuere arcu. In in aliquet dolor. Vivamus quis tincidunt felis, nec fermentum velit. Morbi nibh ligula, pellentesque quis nunc vel, suscipit dictum massa. Etiam arcu magna, iaculis et ipsum ut, luctus porta ex. Integer sed ex ligula. Praesent gravida tellus ac mi cursus luctus.</p>\r\n<p xss=\"removed\">Duis nisl dui, tristique in nibh ut, ornare dignissim leo. Ut nec metus ac arcu interdum mollis. Orci varius natoque penatibus et magnis dis parturient montes, nascetur ridiculus mus. Donec aliquet porttitor lectus ut laoreet. Donec suscipit sem ut elit venenatis, a tincidunt purus varius. Vestibulum quam metus, posuere id massa non, sodales auctor justo. Aliquam malesuada turpis vitae tempor scelerisque. Ut laoreet suscipit ornare. Mauris ut dapibus purus. Sed dapibus dolor quis quam placerat ornare.</p>', '2021-03-04 02:28:13', '2021-03-04 08:40:51', 'tulisan-d', 'Desert1.jpg', '', ''),
(5, 'Tulisan E', '<p xss=\"removed\">Lorem ipsum dolor sit amet, consectetur adipiscing elit. Nullam cursus ante a felis egestas aliquet. Nam vel posuere arcu. In in aliquet dolor. Vivamus quis tincidunt felis, nec fermentum velit. Morbi nibh ligula, pellentesque quis nunc vel, suscipit dictum massa. Etiam arcu magna, iaculis et ipsum ut, luctus porta ex. Integer sed ex ligula. Praesent gravida tellus ac mi cursus luctus.</p>\r\n<p xss=\"removed\">Duis nisl dui, tristique in nibh ut, ornare dignissim leo. Ut nec metus ac arcu interdum mollis. Orci varius natoque penatibus et magnis dis parturient montes, nascetur ridiculus mus. Donec aliquet porttitor lectus ut laoreet. Donec suscipit sem ut elit venenatis, a tincidunt purus varius. Vestibulum quam metus, posuere id massa non, sodales auctor justo. Aliquam malesuada turpis vitae tempor scelerisque. Ut laoreet suscipit ornare. Mauris ut dapibus purus. Sed dapibus dolor quis quam placerat ornare.</p>', '2021-03-04 02:28:28', '2021-03-04 08:42:30', 'tulisan-e', 'Desert2.jpg', '', '');

-- --------------------------------------------------------

--
-- Table structure for table `post_detail`
--

CREATE TABLE `post_detail` (
  `id` int(11) NOT NULL,
  `id_post` int(11) DEFAULT NULL,
  `id_kategori` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `post_detail`
--

INSERT INTO `post_detail` (`id`, `id_post`, `id_kategori`) VALUES
(6, 1, 1),
(7, 2, 0),
(8, 2, 1),
(9, 3, 0),
(10, 3, 2),
(11, 4, 3),
(12, 5, 4),
(13, 4, 0),
(14, 5, 5),
(15, 4, 1),
(16, 2, 3),
(17, 1, 3);

-- --------------------------------------------------------

--
-- Table structure for table `post_kategori`
--

CREATE TABLE `post_kategori` (
  `id` int(11) NOT NULL,
  `kategori` varchar(255) DEFAULT NULL,
  `slug` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `post_kategori`
--

INSERT INTO `post_kategori` (`id`, `kategori`, `slug`) VALUES
(1, 'Berita', 'berita'),
(2, 'Pengumuman', 'pengumuman'),
(3, 'Event', 'Event'),
(4, 'Info Pendaftaran', 'Info-Pendaftaran'),
(5, 'Info Penting', 'Info-Penting'),
(6, 'Kategori Baru', 'Kategori-Baru');

-- --------------------------------------------------------

--
-- Table structure for table `program_studi`
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
-- Table structure for table `provinces`
--

CREATE TABLE `provinces` (
  `id` char(2) COLLATE utf8_unicode_ci NOT NULL,
  `name` varchar(255) COLLATE utf8_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `provinces`
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
-- Table structure for table `settings`
--

CREATE TABLE `settings` (
  `id` int(11) NOT NULL,
  `website_name` varchar(100) DEFAULT NULL,
  `website_url` varchar(100) DEFAULT NULL,
  `facebook_url` varchar(100) DEFAULT NULL,
  `instagram_url` varchar(100) DEFAULT NULL,
  `twitter_url` varchar(100) DEFAULT NULL,
  `youtube_url` varchar(100) DEFAULT NULL,
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
-- Dumping data for table `settings`
--

INSERT INTO `settings` (`id`, `website_name`, `website_url`, `facebook_url`, `instagram_url`, `twitter_url`, `youtube_url`, `email`, `about_section`, `carousel`, `feature_section`, `foot1`, `foot2`, `foot3`, `foot4`, `logo`, `alamat`, `fax`, `telp`, `about_text`, `about_images`, `lbanner_images`, `lbanner_tagline`, `site_tagline`, `permalink`) VALUES
(0, 'SLCC PGRI Wonosobo', 'www.slccpgriwonosobo.org', '#', '#', '#', 'UCMs_dVz0xItsvgMX6wpmA1Q', 'slccpgriwonosobo@pgri.or.id', NULL, 1, NULL, NULL, NULL, NULL, NULL, 'SLCC-removebg-preview.png', 'Jl Sunan Kalijaga Berkoh, Purwokerto Selatan, Banyumas Jawa Tengah, Indonesia 53146', '', '(0281) 6512290', '<p>Ini Greeting</p>', 'Koala.jpg', 'banner-left.png', 'Smart Learning Character Center', 'Smart Learning Character Center', 2);

-- --------------------------------------------------------

--
-- Table structure for table `sidebar`
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
-- Dumping data for table `sidebar`
--

INSERT INTO `sidebar` (`id`, `title`, `jenis`, `id_kategori`, `table`, `isi`, `limit`) VALUES
(1, 'Side Widget A', 2, 1, NULL, '', 0),
(2, 'Side Widget B', 2, 1, NULL, '', 0);

-- --------------------------------------------------------

--
-- Table structure for table `sidebar_arrange`
--

CREATE TABLE `sidebar_arrange` (
  `id` int(11) NOT NULL,
  `id_sidebar` int(3) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `sidebar_arrange`
--

INSERT INTO `sidebar_arrange` (`id`, `id_sidebar`) VALUES
(1, 1),
(2, 2),
(3, 3),
(4, 4);

-- --------------------------------------------------------

--
-- Table structure for table `sidebar_opsi`
--

CREATE TABLE `sidebar_opsi` (
  `id` int(11) NOT NULL,
  `jenis` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `sidebar_opsi`
--

INSERT INTO `sidebar_opsi` (`id`, `jenis`) VALUES
(1, 'Artikel'),
(2, 'Kategori'),
(3, 'Pengumuman');

-- --------------------------------------------------------

--
-- Table structure for table `sliders`
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
-- Table structure for table `submenu`
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
-- Dumping data for table `submenu`
--

INSERT INTO `submenu` (`id`, `id_menu`, `submenu`, `slug`, `is_url`, `parameter`) VALUES
(1, 5, 'AKM', 'akm', 0, 'target=\'_blank\'');

-- --------------------------------------------------------

--
-- Table structure for table `tb_brosur`
--

CREATE TABLE `tb_brosur` (
  `id_brosur` int(11) NOT NULL,
  `nama_brosur` varchar(200) DEFAULT NULL,
  `link_brosur` varchar(200) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `tb_organisasi`
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
-- Table structure for table `testimoni`
--

CREATE TABLE `testimoni` (
  `id` int(11) NOT NULL,
  `id_user` int(11) DEFAULT NULL,
  `isi` text DEFAULT NULL,
  `tanggal` timestamp NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `top_menu`
--

CREATE TABLE `top_menu` (
  `id` int(3) NOT NULL,
  `title` varchar(255) NOT NULL,
  `url` varchar(255) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `users`
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
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `ip_address`, `username`, `password`, `salt`, `email`, `activation_code`, `forgotten_password_code`, `forgotten_password_time`, `remember_code`, `created_on`, `last_login`, `active`, `first_name`, `last_name`, `company`, `phone`) VALUES
(1, '127.0.0.1', 'administrator', '$2y$12$0Os7zz3d28mM/StrSK6xM.JDuKSllI6AqodCqu.KHgMc2qNl4Pg.e', '', 'admin@admin.com', '', NULL, NULL, 'JIQTvL22C28l6soX5V.mTO', 1268889823, 1614842328, 1, 'Admin', 'istrator', 'ADMIN', '0');

-- --------------------------------------------------------

--
-- Table structure for table `users_groups`
--

CREATE TABLE `users_groups` (
  `id` int(11) UNSIGNED NOT NULL,
  `user_id` int(11) UNSIGNED NOT NULL,
  `group_id` mediumint(8) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `users_groups`
--

INSERT INTO `users_groups` (`id`, `user_id`, `group_id`) VALUES
(1, 1, 1);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `berita`
--
ALTER TABLE `berita`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `bidang`
--
ALTER TABLE `bidang`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `campus_hiring`
--
ALTER TABLE `campus_hiring`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `city`
--
ALTER TABLE `city`
  ADD PRIMARY KEY (`id`),
  ADD KEY `regencies_province_id_index` (`province_id`);

--
-- Indexes for table `contact`
--
ALTER TABLE `contact`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `data_pendidikan`
--
ALTER TABLE `data_pendidikan`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `data_sertifikasi`
--
ALTER TABLE `data_sertifikasi`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `external_link`
--
ALTER TABLE `external_link`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `faq`
--
ALTER TABLE `faq`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `feature_section`
--
ALTER TABLE `feature_section`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `files`
--
ALTER TABLE `files`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `gallery`
--
ALTER TABLE `gallery`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `groups`
--
ALTER TABLE `groups`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `header`
--
ALTER TABLE `header`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `images_gallery`
--
ALTER TABLE `images_gallery`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `kategori_pendidikan`
--
ALTER TABLE `kategori_pendidikan`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `kat_perusahaan`
--
ALTER TABLE `kat_perusahaan`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `kat_sertifikasi`
--
ALTER TABLE `kat_sertifikasi`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `login_attempts`
--
ALTER TABLE `login_attempts`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `lowongan`
--
ALTER TABLE `lowongan`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `menu`
--
ALTER TABLE `menu`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `news_section`
--
ALTER TABLE `news_section`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `page`
--
ALTER TABLE `page`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `unique` (`slug`);

--
-- Indexes for table `panel_berita`
--
ALTER TABLE `panel_berita`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `pengalaman`
--
ALTER TABLE `pengalaman`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `perusahaan`
--
ALTER TABLE `perusahaan`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `post`
--
ALTER TABLE `post`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `post_detail`
--
ALTER TABLE `post_detail`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `post_kategori`
--
ALTER TABLE `post_kategori`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `program_studi`
--
ALTER TABLE `program_studi`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `provinces`
--
ALTER TABLE `provinces`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `settings`
--
ALTER TABLE `settings`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `sidebar`
--
ALTER TABLE `sidebar`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `sidebar_arrange`
--
ALTER TABLE `sidebar_arrange`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `sidebar_opsi`
--
ALTER TABLE `sidebar_opsi`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `sliders`
--
ALTER TABLE `sliders`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `submenu`
--
ALTER TABLE `submenu`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tb_brosur`
--
ALTER TABLE `tb_brosur`
  ADD PRIMARY KEY (`id_brosur`);

--
-- Indexes for table `tb_organisasi`
--
ALTER TABLE `tb_organisasi`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `testimoni`
--
ALTER TABLE `testimoni`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `top_menu`
--
ALTER TABLE `top_menu`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `users_groups`
--
ALTER TABLE `users_groups`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `uc_users_groups` (`user_id`,`group_id`),
  ADD KEY `fk_users_groups_users1_idx` (`user_id`),
  ADD KEY `fk_users_groups_groups1_idx` (`group_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `berita`
--
ALTER TABLE `berita`
  MODIFY `id` int(8) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `bidang`
--
ALTER TABLE `bidang`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `campus_hiring`
--
ALTER TABLE `campus_hiring`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `contact`
--
ALTER TABLE `contact`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `data_pendidikan`
--
ALTER TABLE `data_pendidikan`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `data_sertifikasi`
--
ALTER TABLE `data_sertifikasi`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `external_link`
--
ALTER TABLE `external_link`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `faq`
--
ALTER TABLE `faq`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `feature_section`
--
ALTER TABLE `feature_section`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `files`
--
ALTER TABLE `files`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `gallery`
--
ALTER TABLE `gallery`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=47;

--
-- AUTO_INCREMENT for table `groups`
--
ALTER TABLE `groups`
  MODIFY `id` mediumint(8) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `images_gallery`
--
ALTER TABLE `images_gallery`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `kategori_pendidikan`
--
ALTER TABLE `kategori_pendidikan`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `kat_perusahaan`
--
ALTER TABLE `kat_perusahaan`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `kat_sertifikasi`
--
ALTER TABLE `kat_sertifikasi`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `login_attempts`
--
ALTER TABLE `login_attempts`
  MODIFY `id` int(11) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `lowongan`
--
ALTER TABLE `lowongan`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `menu`
--
ALTER TABLE `menu`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `news_section`
--
ALTER TABLE `news_section`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=21;

--
-- AUTO_INCREMENT for table `page`
--
ALTER TABLE `page`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=27;

--
-- AUTO_INCREMENT for table `panel_berita`
--
ALTER TABLE `panel_berita`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `pengalaman`
--
ALTER TABLE `pengalaman`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `perusahaan`
--
ALTER TABLE `perusahaan`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `post`
--
ALTER TABLE `post`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `post_detail`
--
ALTER TABLE `post_detail`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=18;

--
-- AUTO_INCREMENT for table `post_kategori`
--
ALTER TABLE `post_kategori`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `sidebar`
--
ALTER TABLE `sidebar`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `sidebar_arrange`
--
ALTER TABLE `sidebar_arrange`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `sidebar_opsi`
--
ALTER TABLE `sidebar_opsi`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `sliders`
--
ALTER TABLE `sliders`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=49;

--
-- AUTO_INCREMENT for table `submenu`
--
ALTER TABLE `submenu`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `tb_brosur`
--
ALTER TABLE `tb_brosur`
  MODIFY `id_brosur` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `tb_organisasi`
--
ALTER TABLE `tb_organisasi`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `testimoni`
--
ALTER TABLE `testimoni`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `top_menu`
--
ALTER TABLE `top_menu`
  MODIFY `id` int(3) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT for table `users_groups`
--
ALTER TABLE `users_groups`
  MODIFY `id` int(11) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `city`
--
ALTER TABLE `city`
  ADD CONSTRAINT `city_ibfk_1` FOREIGN KEY (`province_id`) REFERENCES `provinces` (`id`);

--
-- Constraints for table `users_groups`
--
ALTER TABLE `users_groups`
  ADD CONSTRAINT `fk_users_groups_groups1` FOREIGN KEY (`group_id`) REFERENCES `groups` (`id`) ON DELETE CASCADE ON UPDATE NO ACTION,
  ADD CONSTRAINT `fk_users_groups_users1` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE ON UPDATE NO ACTION;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
