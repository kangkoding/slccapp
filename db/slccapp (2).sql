-- phpMyAdmin SQL Dump
-- version 5.0.4
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Mar 08, 2021 at 09:45 AM
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
(1, 'Beranda', 'home', 1, ''),
(15, 'Struktur', 'page/sumber-daya-slcc-pgri-jawa-tengah', 0, 'target=\'_blank\''),
(16, 'SKGB', 'page/surat-kabar-guru-belajar', 0, 'target=\'_blank\''),
(17, 'Gabung', 'page/gabung', 0, 'target=\'_blank\'');

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
(26, 'Berita', 13, NULL),
(27, 'Pelatihan', 14, NULL),
(28, 'Parenting', 15, NULL),
(29, 'Webinar', 16, NULL);

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
(27, 'Sumber Daya SLCC PGRI Jawa Tengah', '<p>Berikut susunan struktur SLCC PGRI Kabupaten Wonosobo</p>', '2021-03-08 08:11:51', NULL, 'sumber-daya-slcc-pgri-jawa-tengah', '', '', 1),
(28, 'Surat Kabar Guru Belajar', '<p>Ini adalah beberapa list Surat Kabar Guru Belajar</p>', '2021-03-08 08:17:43', NULL, 'surat-kabar-guru-belajar', '', '', 1),
(29, 'Gabung', '<p><a href=\"https://t.me/joinchat/IZshSMJdCa_fb_jC\">Grup Telegram</a></p>\r\n<p><a href=\"http://anggota.pgri.or.id/keanggotaan.php\">Menjadi Anggota PGRI</a></p>', '2021-03-08 08:24:40', NULL, 'gabung', '', '', 1);

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
(24, 'Belajar Materi Seleksi PPPK', '', '2021-03-08 07:23:28', NULL, 'belajar-materi-seleksi-pppk', '', '', ''),
(25, 'Pemerintah Harus Pastikan Daerah Mana Yang Siap Tatap Muka', '', '2021-03-08 07:24:06', NULL, 'pemerintah-harus-pastikan-daerah-mana-yang-siap-tatap-muka', '', '', ''),
(26, 'Puncak Acara HUT Ke-75 PGRI dan HGN Tahun 2020', '', '2021-03-08 07:24:47', NULL, 'puncak-acara-hut-ke-75-pgri-dan-hgn-tahun-2020', '', '', ''),
(27, 'PGRI Jawa Tengah SLCC Turut Berduka Cita Atas Meninggalnya Prie GS', '<p>Inna lillahi wainna ilaihi roji\'un. PGRI Jawa Tengah SLCC turut berduka cita atas meninggalnya Prie GS. Semoga keluarga yang ditinggalkan diberi ketabahan. Aamiin YRA.</p>', '2021-03-08 07:26:26', NULL, 'pgri-jawa-tengah-slcc-turut-berduka-cita-atas-meninggalnya-prie-gs', 'WhatsApp_Image_2021-02-12_at_09_54_48.jpeg', '', ''),
(28, 'PGRI Wonosobo Satu-Satunya PGRI di Jateng yang Telah Bertali-kasih dengan Guru Wiyata Bakti', '<p style=\"box-sizing: border-box; margin: 0px; font-family: Tahoma, sans-serif; color: #5f5f5f; padding: 5px 0px 10px;\">Dari Konferensi XXII PGRI Kabupaten Wonosobo.</p>\r\n<p style=\"box-sizing: border-box; margin: 0px; font-family: Tahoma, sans-serif; color: #5f5f5f; padding: 5px 0px 10px;\"><span style=\"box-sizing: border-box; font-weight: bold;\">Suratman SPd MMPd Ketua PGRI XXII Kab Wonosobo</span></p>\r\n<p style=\"box-sizing: border-box; margin: 0px; font-family: Tahoma, sans-serif; color: #5f5f5f; padding: 5px 0px 10px;\">Wonosobo, Infokom PGRI Jateng.<br style=\"box-sizing: border-box;\" />Dibingkai melalui tema \'Peran PGRI Mewujudkan SDM Unggul untuk Indonesia\', Konferensi PGRI Kabupaten Wonosobo masa bakti XXII berlangsung hidmat, tertib dan lancar bertempat di gedung PGRI Wonosobo, Sabtu (4/1/2020).</p>\r\n<p style=\"box-sizing: border-box; margin: 0px; font-family: Tahoma, sans-serif; color: #5f5f5f; padding: 5px 0px 10px;\">Diawali dengan laporan Ketua PGRI Wonosobo XXI H. Mustangin SPd MSi yang melaporkan Konferensi Kabupaten Wonosobo diikuti oleh 15 cabang teroterial dan 1 cabang khusus PGRI Kemenag Kabupaten Wonosobo. Konferensi juga dihadiri Bupati, Ketua DPRD, Ketua Dewan Pendidikan, Kemenag, dan Jajaran Penasihat PGRI Kab Wonosobo serta Ketua Pengurus PGRI Profinsi. Tiga agenda konferensi Kabupaten Wonosobo adalah pertanggungjawaban kepengurusan masa bakti XXI, penyusunan program kerja, dan pemilihan pengurus baru masa bakti XXII.</p>', '2021-03-08 07:28:18', NULL, 'pgri-wonosobo-satu-satunya-pgri-di-jateng-yang-telah-bertali-kasih-dengan-guru-wiyata-bakti', 'Wonosobo3.jpeg', '', ''),
(29, 'Belajar dari Rumah tentang Pengolahan data (modus, median, mean)', '<p><span style=\"color: #656565; font-family: \'Open Sans\', sans-serif;\">PGRI Jawa Tengah SLCC pada ?&nbsp;</span><b style=\"padding: 0px; border: 0px; outline: 0px; vertical-align: baseline; background-image: initial; background-position: 0px 0px; background-size: initial; background-repeat: initial; background-attachment: initial; background-origin: initial; background-clip: initial; color: #656565; font-family: \'Open Sans\', sans-serif;\">Senin, 15 Februari 2021</b><span style=\"color: #656565; font-family: \'Open Sans\', sans-serif;\">&nbsp;siap hadir menemani waktu belajar siswa kelas VI belajar tentang&nbsp;</span><b style=\"padding: 0px; border: 0px; outline: 0px; vertical-align: baseline; background-image: initial; background-position: 0px 0px; background-size: initial; background-repeat: initial; background-attachment: initial; background-origin: initial; background-clip: initial; color: #656565; font-family: \'Open Sans\', sans-serif;\">Pengolahan data (modus, median, mean)</b></p>', '2021-03-08 07:29:37', NULL, 'belajar-dari-rumah-tentang-pengolahan-data-modus-median-mean', '', '', ''),
(30, 'Belajar dari Rumah tentang Ungkapan Petunjuk, Perintah, dan Pemberitahuan', '<p><span style=\"color: #656565; font-family: \'Open Sans\', sans-serif;\">PGRI Jawa Tengah SLCC pada ?&nbsp;</span><b style=\"padding: 0px; border: 0px; outline: 0px; vertical-align: baseline; background-image: initial; background-position: 0px 0px; background-size: initial; background-repeat: initial; background-attachment: initial; background-origin: initial; background-clip: initial; color: #656565; font-family: \'Open Sans\', sans-serif;\">Senin, 15 Februari 2021</b><span style=\"color: #656565; font-family: \'Open Sans\', sans-serif;\">&nbsp;siap hadir menemani waktu belajar&nbsp;</span><b style=\"padding: 0px; border: 0px; outline: 0px; vertical-align: baseline; background-image: initial; background-position: 0px 0px; background-size: initial; background-repeat: initial; background-attachment: initial; background-origin: initial; background-clip: initial; color: #656565; font-family: \'Open Sans\', sans-serif;\">siswa kelas I</b><span style=\"color: #656565; font-family: \'Open Sans\', sans-serif;\">&nbsp;belajar tentang&nbsp;</span><b style=\"padding: 0px; border: 0px; outline: 0px; vertical-align: baseline; background-image: initial; background-position: 0px 0px; background-size: initial; background-repeat: initial; background-attachment: initial; background-origin: initial; background-clip: initial; color: #656565; font-family: \'Open Sans\', sans-serif;\">Berbagai Ungkapan : Ungkapan Petunjuk, Perintah, dan Pemberitahuan</b></p>', '2021-03-08 07:30:18', NULL, 'belajar-dari-rumah-tentang-ungkapan-petunjuk-perintah-dan-pemberitahuan', 'wINASTI.png', '', ''),
(31, 'Kapan Anak Boleh Mandi Hujan?', '', '2021-03-08 07:30:53', NULL, 'kapan-anak-boleh-mandi-hujan', '', '', ''),
(32, 'Izza Rufaida, S.Si : Guru-guru Hebat, Harus Mampu Menjadi Role Model', '<p><span style=\"padding: 0px; border: 0px; outline: 0px; vertical-align: baseline; background-image: initial; background-position: 0px 0px; background-size: initial; background-repeat: initial; background-attachment: initial; background-origin: initial; background-clip: initial; font-family: \'Open Sans\', sans-serif; color: #050505; white-space: pre-wrap;\">SLCCNews. Lomba Gurulympics PGRI 2020 yang dilakukan secara online baru saja selesai digelar dan hasilnya pun telah diumumkan. Ada 14 jenis lomba olah ilmu dan 8 jenis lomba olah karya. </span><span style=\"padding: 0px; border: 0px; outline: 0px; vertical-align: baseline; background-image: initial; background-position: 0px 0px; background-size: initial; background-repeat: initial; background-attachment: initial; background-origin: initial; background-clip: initial; font-family: \'Open Sans\', sans-serif; color: #050505; white-space: pre-wrap;\">Takkan pernah habis cerita dari Jawa Tengah tentang Gurulympics, karena ada 118 guru dari Provinsi Jawa Tengah terdaftar sebagai peserta. Mereka berasal dari berbagai satuan pendidikan baik negeri maupun swasta. Demikian diungkapkan Wakil Sekretaris Umum PGRI Jateng, Dr. Saptono Nugrohadi, M.Pd, M.Si. yang juga bertindak selaku leader organizer delegasi Jawa Tengah. Dikatakan, untuk memimpin delegasi tersebut, Dr. Saptono menemani Dr. Listyaning Sumardiyani, M.,Hum, Ketua Biro Diklat dan Pengabdian Masyarakat PGRI Jateng. </span></p>\r\n<p><span style=\"padding: 0px; border: 0px; outline: 0px; vertical-align: baseline; background-image: initial; background-position: 0px 0px; background-size: initial; background-repeat: initial; background-attachment: initial; background-origin: initial; background-clip: initial; font-family: \'Open Sans\', sans-serif; color: #050505; white-space: pre-wrap;\">&nbsp;</span></p>\r\n<div class=\"o9v6fnle cxmmr5t8 oygrvhab hcukyx3x c1et5uql ii04i59q\" style=\"padding: 0px; border: 0px; outline: 0px; vertical-align: baseline; background-image: initial; background-position: 0px 0px; background-size: initial; background-repeat: initial; background-attachment: initial; background-origin: initial; background-clip: initial; font-family: \'Open Sans\', sans-serif; color: #050505; margin: 0.5em 0px 0px; overflow-wrap: break-word; white-space: pre-wrap;\">\r\n<div dir=\"auto\" style=\"padding: 0px; border: 0px; outline: 0px; vertical-align: baseline; background: 0px 0px;\"><span style=\"padding: 0px; border: 0px; outline: 0px; vertical-align: baseline; background: 0px 0px; font-family: inherit;\"><b style=\"padding: 0px; border: 0px; outline: 0px; vertical-align: baseline; background: 0px 0px;\">Izza Rufaida, SS</b></span></div>\r\n<div dir=\"auto\" style=\"padding: 0px; border: 0px; outline: 0px; vertical-align: baseline; background: 0px 0px;\"><span style=\"padding: 0px; border: 0px; outline: 0px; vertical-align: baseline; background: 0px 0px; font-family: inherit;\">Salah satu delegasi Jawa Tengah yang turut menyumbang medali adalah Nur Izza Rufaida, S.Si. Guru SD Al-Irsyad 02 Cilacap berusia 40 tahun yang mengikuti 6 cabang lomba gurulympics ini memperoleh 2 medali emas, 1 medali perak, dan 2 medali Perunggu. </span></div>\r\n</div>\r\n<p><span style=\"padding: 0px; border: 0px; outline: 0px; vertical-align: baseline; background-image: initial; background-position: 0px 0px; background-size: initial; background-repeat: initial; background-attachment: initial; background-origin: initial; background-clip: initial; font-family: \'Open Sans\', sans-serif; color: #050505; white-space: pre-wrap;\"></span></p>\r\n<div class=\"o9v6fnle cxmmr5t8 oygrvhab hcukyx3x c1et5uql ii04i59q\" style=\"padding: 0px; border: 0px; outline: 0px; vertical-align: baseline; background-image: initial; background-position: 0px 0px; background-size: initial; background-repeat: initial; background-attachment: initial; background-origin: initial; background-clip: initial; font-family: \'Open Sans\', sans-serif; color: #050505; margin: 0.5em 0px 0px; overflow-wrap: break-word; white-space: pre-wrap;\">\r\n<div dir=\"auto\" style=\"padding: 0px; border: 0px; outline: 0px; vertical-align: baseline; background: 0px 0px;\"><span style=\"padding: 0px; border: 0px; outline: 0px; vertical-align: baseline; background: 0px 0px; font-family: inherit;\">Kepada Infokom PGRI Jateng, Izza Rufaida menjelaskan dua Medali emas itu diperoleh dari Olah Karya cabang Q, Informatika dan Inovasi, dan Olah karya cabang U, Perguruan Tinggi dan Globalisasi. Dan satu Medali perak diperoleh dari Olah Karya cabang V, Sekolah Dasar. Sedangkan untuk Olah ilmu cabang L, Distance Education and X-Learning dan Olah ilmu cabang N, Deep Learning and Online Evaluation, Izza Rufaida baru berhasil mendapatkan Medali perunggu. </span></div>\r\n<div dir=\"auto\" style=\"padding: 0px; border: 0px; outline: 0px; vertical-align: baseline; background: 0px 0px;\"><span style=\"padding: 0px; border: 0px; outline: 0px; vertical-align: baseline; background: 0px 0px; font-family: inherit;\"></span></div>\r\n<div dir=\"auto\" style=\"padding: 0px; border: 0px; outline: 0px; vertical-align: baseline; background: 0px 0px;\">\r\n<div dir=\"auto\" style=\"padding: 0px; border: 0px; outline: 0px; vertical-align: baseline; background: 0px 0px;\"><span style=\"padding: 0px; border: 0px; outline: 0px; vertical-align: baseline; background: 0px 0px; font-family: inherit;\"><b style=\"padding: 0px; border: 0px; outline: 0px; vertical-align: baseline; background: 0px 0px;\">Kesulitan </b></span></div>\r\n<div dir=\"auto\" style=\"padding: 0px; border: 0px; outline: 0px; vertical-align: baseline; background: 0px 0px;\"><span style=\"padding: 0px; border: 0px; outline: 0px; vertical-align: baseline; background: 0px 0px; font-family: inherit;\">Keberhasilan Izza Rufaida meraih 2 Medali Emas, 1 Medali Perak dan 2 Medali Perunggu bukan tanpa kesulitan. Isteri dari dr. Maskur ini mengungkapkan adanya kesulitan menghadapi lomba tersebut. Menurut Ibu dari M. Yusuf Farhani (15 thn), M. Aufaqul Himam (11 thn), Aqila Aufinida Rakhma(7 thn), dan Khilya Najwa Kamila (4 thn) ini kesulitanya adalah membagi waktu untuk belajar dan untuk kepentingan keluarga. </span></div>\r\n</div>\r\n</div>', '2021-03-08 07:32:36', NULL, 'izza-rufaida-ssi-guru-guru-hebat-harus-mampu-menjadi-role-model', 'iZZA.png', '', ''),
(33, 'Jurus Jitu Menulis Artikel Ilmiah dan Artikel Populer', '<div style=\"padding: 0px; border: 0px; outline: 0px; vertical-align: baseline; background-image: initial; background-position: 0px 0px; background-size: initial; background-repeat: initial; background-attachment: initial; background-origin: initial; background-clip: initial; color: #656565; font-family: \'Open Sans\', sans-serif;\">\r\n<p style=\"padding: 0px; border: 0px; outline: 0px; vertical-align: baseline; background: 0px 0px;\"><span style=\"padding: 0px; border: 0px; outline: 0px; vertical-align: baseline; background: 0px 0px; font-family: inherit;\"><iframe width=\"560\" height=\"314\" src=\"//www.youtube.com/embed/v_g0dCvgv70\" allowfullscreen=\"allowfullscreen\"></iframe></span></p>\r\n<p style=\"padding: 0px; border: 0px; outline: 0px; vertical-align: baseline; background: 0px 0px;\"><span style=\"padding: 0px; border: 0px; outline: 0px; vertical-align: baseline; background: 0px 0px; font-family: inherit;\">SLCCEvent. Temukan jurus jitu menulis Artikel Ilmiah dan Artikel Populer bersama&nbsp;</span></p>\r\n<span style=\"padding: 0px; border: 0px; outline: 0px; vertical-align: baseline; background: 0px 0px; font-family: inherit;\"><b style=\"padding: 0px; border: 0px; outline: 0px; vertical-align: baseline; background: 0px 0px;\">Pemateri</b><br />Aris Kukuh Prasetyo, S.Pd. M.Pd --- Top 50 Global Teacher Prize&nbsp;<br />Johan Wahyudi, M.Pd --- Juara Nasional Lomba Esai&nbsp;<br /><br /></span></div>\r\n<div style=\"padding: 0px; border: 0px; outline: 0px; vertical-align: baseline; background-image: initial; background-position: 0px 0px; background-size: initial; background-repeat: initial; background-attachment: initial; background-origin: initial; background-clip: initial; color: #656565; font-family: \'Open Sans\', sans-serif;\"><span style=\"padding: 0px; border: 0px; outline: 0px; vertical-align: baseline; background: 0px 0px; font-family: inherit;\"><b style=\"padding: 0px; border: 0px; outline: 0px; vertical-align: baseline; background: 0px 0px;\">Penguatan</b><br />Dr. Dyah Nugrahani, S.Pd., , M.Hum --- SLCC PGRI Jawa Tengah</span></div>', '2021-03-08 07:35:27', NULL, 'jurus-jitu-menulis-artikel-ilmiah-dan-artikel-populer', '', '', ''),
(34, 'PGRI Dorong GTK Menolak Menyerah Kepada Corona', '<p><span style=\"color: #656565; font-family: \'Open Sans\', sans-serif;\">Virus Corona memang telah mendunia Virus Corona mengancam kesehatan kita Virus Corona membatasi sekolah dan sebagian kegiatannya Tapi akankah kita biarkan Virus Corona menghentikan proses belajar anak-anak kita? Tinggal di rumah, bukan berarti menyerah, untuk memberikan kesempatan belajar bagi murid, guru dan orangtua!</span></p>\r\n<p><span style=\"color: #656565; font-family: \'Open Sans\', sans-serif;\">&nbsp;</span></p>', '2021-03-08 07:36:06', NULL, 'pgri-dorong-gtk-menolak-menyerah-kepada-corona', 'Flyer_Sekadar_5_November.jpeg', '', ''),
(35, 'Pengembangan Keprofesian Guru Pada Masa Kebiasaan Baru Pembelajaran', '', '2021-03-08 07:37:00', NULL, 'pengembangan-keprofesian-guru-pada-masa-kebiasaan-baru-pembelajaran', 'Flyer_Sekadar_10_Oktober_2020.jpeg', '', ''),
(36, 'Temu Dewan Pakar PGRI Jawa Tengah', '<p><iframe width=\"560\" height=\"314\" src=\"//www.youtube.com/embed/bPfKKKgAEpA\" allowfullscreen=\"allowfullscreen\"></iframe></p>', '2021-03-08 07:37:21', NULL, 'temu-dewan-pakar-pgri-jawa-tengah', '', '', '');

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
(1, 24, 14),
(2, 25, 13),
(3, 26, 13),
(4, 27, 13),
(5, 28, 13),
(6, 29, 15),
(7, 30, 15),
(8, 31, 15),
(9, 32, 15),
(10, 33, 16),
(11, 34, 16),
(12, 35, 16),
(13, 36, 16);

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
(13, 'Berita', 'Berita'),
(14, 'Pelatihan', 'Pelatihan'),
(15, 'Parenting', 'Parenting'),
(16, 'Webinar', 'Webinar');

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
(0, 'SLCC PGRI Wonosobo', 'www.slccpgriwonosobo.org', 'https://www.facebook.com/pgrijateng.lontar/', 'https://www.instagram.com/pgriwonosobo/', 'https://twitter.com/pgriwonosobo', 'https://www.youtube.com/embed/SHpa1LB-1A8', 'slccpgriwonosobo@pgri.or.id', NULL, 1, NULL, 'Navigasi', 'Internal Link', 'Ikuti Kami', 'Hubungi Kami', 'SLCC-removebg-preview.png', 'Pagerkukuh, 1, Sukoyoso, Pagerkukuh, Kec. Wonosobo, Kabupaten Wonosobo, Jawa Tengah 56314', '', '(0286) 321625', '<p>Ini Greeting</p>', 'Koala.jpg', 'banner-left.png', 'Smart Learning Character Center', 'Smart Learning Character Center', 2);

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
(5, 'Kategori', 2, 13, NULL, '', 0),
(6, 'Artikel', 1, 13, NULL, '', 100),
(7, 'Percobaan Launching Website SLCC Kabupaten Wonosobo', 3, 13, NULL, '<p>Selamat datang di website SLCC PGRI Kabupaten Wonosobo</p>', 0);

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
(1, 5),
(2, 6),
(3, 7);

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
(1, '127.0.0.1', 'administrator', '$2y$12$0Os7zz3d28mM/StrSK6xM.JDuKSllI6AqodCqu.KHgMc2qNl4Pg.e', '', 'admin@admin.com', '', NULL, NULL, 'JIQTvL22C28l6soX5V.mTO', 1268889823, 1615190672, 1, 'Admin', 'istrator', 'ADMIN', '0');

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
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=18;

--
-- AUTO_INCREMENT for table `news_section`
--
ALTER TABLE `news_section`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=30;

--
-- AUTO_INCREMENT for table `page`
--
ALTER TABLE `page`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=30;

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
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=37;

--
-- AUTO_INCREMENT for table `post_detail`
--
ALTER TABLE `post_detail`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT for table `post_kategori`
--
ALTER TABLE `post_kategori`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;

--
-- AUTO_INCREMENT for table `sidebar`
--
ALTER TABLE `sidebar`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `sidebar_arrange`
--
ALTER TABLE `sidebar_arrange`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `sidebar_opsi`
--
ALTER TABLE `sidebar_opsi`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `sliders`
--
ALTER TABLE `sliders`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=55;

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
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
