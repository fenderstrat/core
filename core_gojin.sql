-- phpMyAdmin SQL Dump
-- version 4.1.6
-- http://www.phpmyadmin.net
--
-- Host: localhost
-- Generation Time: Jul 21, 2014 at 04:45 
-- Server version: 5.6.16
-- PHP Version: 5.5.9

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `core_gojin`
--

-- --------------------------------------------------------

--
-- Table structure for table `album`
--

CREATE TABLE IF NOT EXISTS `album` (
  `album_id` int(11) NOT NULL AUTO_INCREMENT,
  `judul` text NOT NULL,
  PRIMARY KEY (`album_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=20 ;

--
-- Dumping data for table `album`
--

INSERT INTO `album` (`album_id`, `judul`) VALUES
(19, 'Senandung Rindu');

-- --------------------------------------------------------

--
-- Table structure for table `artikel`
--

CREATE TABLE IF NOT EXISTS `artikel` (
  `artikel_id` bigint(12) NOT NULL AUTO_INCREMENT,
  `judul` varchar(250) NOT NULL,
  `isi` longtext NOT NULL,
  `deskripsi` text NOT NULL,
  `keyword` varchar(250) NOT NULL,
  `tag` text NOT NULL,
  `status` varchar(8) NOT NULL,
  `tanggal` datetime NOT NULL,
  `image` varchar(100) DEFAULT NULL,
  `post_type` text NOT NULL,
  PRIMARY KEY (`artikel_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=160 ;

--
-- Dumping data for table `artikel`
--

INSERT INTO `artikel` (`artikel_id`, `judul`, `isi`, `deskripsi`, `keyword`, `tag`, `status`, `tanggal`, `image`, `post_type`) VALUES
(129, 'TATA CARA PENCOBLOSAN PADA PEMILU ANGGOTA DPR, DPD DAN DPRD TAHUN 2014', '<p>Berdasarkan Peraturan &nbsp;Komisi Pemilihan Umum Nomor 05 Tahun 2014 Tentang Perubahan Atas&nbsp;Peraturan Komisi Pemilihan Umum Nomor 26 Tahun 2013 Tentang Pemungutan Dan Penghitungan Suara Di Tempat Pemungutan Suara Dalam Pemilihan Umum Angota Dewan Perwakilan Rakyat, Dewan Perwakilan Daerah Dan Dewan Perwakilan Rakyat Daerah Provinsi Dan Dewan Perwakilan Rakyat Daerah Kabupaten/ Kota</p>\n<p>Surat Suara untuk Anggota DPR, DPRD Provinsi dan DPRD Kabupaten/Kota:</p>\n<ol>\n<li>1 (satu) surat suara hanya dapat untuk dihitung 1 (satu) suara;</li>\n<li>Surat suara sebagaimana dimaksud pada angka 1 dinyatakan sah atau tidak sah;</li>\n<li>tanda coblos pada kolom yang memuat nomor urut, tanda gambar, dan nama Partai Politik, suaranya dinyatakan sah untuk Partai Politik;</li>\n<li>tanda coblos pada kolom yang memuat nomor urut dan nama calon anggota, suaranya dinyatakan sah untuk nama calon yang bersangkutan dari Partai Politik yang mencalonkan;</li>\n<li>tanda coblos pada kolom yang memuat nomor urut, tanda gambar dan nama Partai Politik, serta tanda coblos pada kolom yang memuat nomor urut dan nama calon dari Partai Politik yang bersangkutan, suaranya dinyatakan sah untuk nama calon yang bersangkutan dari Partai Politik yang mencalonkan;</li>\n<li>tanda coblos pada kolom yang memuat nomor urut, tanda gambar, dan nama Partai Politik, serta tanda coblos lebih dari 1 (satu) calon pada kolom yang memuat nomor urut dan nama calon dari Partai Politik yang sama, suaranya dinyatakan sah 1 (satu) suara untuk Partai Politik;</li>\n<li>tanda coblos lebih dari 1 (satu) calon pada kolom yang memuat nomor urut dan nama calon dari Partai Politik yang sama, suaranya dinyatakan sah 1 (satu) suara untuk Partai Politik;</li>\n<li>tanda coblos lebih dari 1 (satu) kali pada kolom yang memuat nomor urut, tanda gambar, dan nama Partai Politik, tanpa mencoblos salah satu calon pada kolom yang memuat nomor urut dan nama calon dari</li>\n<li>Partai Politik yang sama, suaranya dinyatakan sah 1 (satu) suara untuk Partai Politik;</li>\n<li>tanda coblos pada surat suara yang diblok warna abu-abu dibawah nomor urut dan nama calon terakhir, suaranya dinyatakan sah 1 (satu) suara untuk Partai Politik;</li>\n<li>tanda coblos tepat pada garis kolom yang memuat nomor urut, tanda gambar dan nama Partai Politik tanpa mencoblos salah satu calon pada kolom yang memuat nomor urut dan nama calon dari Partai Politik yang sama, suaranya dinyatakan sah 1 (satu) suara untuk Partai Politik;</li>\n<li>tanda coblos tepat pada garis kolom yang memuat 1 (satu) nomor urut dan nama calon suaranya dinyatakan sah untuk nama calon yang bersangkutan;</li>\n<li>tanda coblos tepat pada garis yang memisahkan antara nomor urut dan nama calon dengan nomor urut dan nama calon lain dari Partai Politik yang sama, sehingga tidak dapat dipastikan tanda coblos tersebut mengarah pada 1 (satu) nomor urut dan nama calon, suaranya dinyatakan sah 1 (satu) suara untuk Partai Politik;</li>\n<li>tanda coblos pada satu kolom yang memuat nomor urut tanpa nama calon disebabkan calon tersebut tidak lagi memenuhi syarat, dinyatakan sah 1 (satu) suara untuk Partai Politik;</li>\n<li>tanda coblos pada satu kolom yang memuat nomor urut dan nama calon atau tanpa nama calon yang disebabkan calon tersebut meninggal dunia/tidak lagi memenuhi syaratdan tanda coblos pada satu kolom nomor urut dan nama calon dari satu Partai politik, dinyatakan sah 1 (satu) suara untuk calon yang masih memenuhi syarat;</li>\n<li>tanda coblos lebih dari 1 (satu) kali pada kolom yang memuat nomor urut dan nama calon, dinyatakan sah 1 (satu) suara untuk calon yang bersangkutan;</li>\n<li>tanda coblos pada satu kolom yang memuat nomor dan nama calon dan tanda coblos pada kolom abu-abu, dinyatakan sah untuk 1 (satu) calon yang memenuhi syarat;</li>\n<li>tanda coblos pada kolom yang memuat nomor, nama dan gambar Partai Politik yang tidak mempunyai daftar calon, dinyatakan sah 1 (satu) suara untuk Partai Politik.</li>\n</ol>\n<p>&nbsp;</p>\n<p>b. Surat Suara sah untuk Anggota DPD:</p>\n<ol>\n<li>1 (satu) surat suara hanya dapat dihitung untuk 1 (satu) suara;</li>\n<li>Surat suara sebagaimana dimaksud pada angka 1 dinyatakan sah atau tidak sah;</li>\n<li>tanda coblos pada kolom 1 (satu) calon yang memuat nomor urut, nama calon dan foto calon anggota DPD, dinyatakan sah 1 (satu) suara untuk Calon Anggota DPD yang bersangkutan;</li>\n<li>tanda coblos lebih dari satu kali pada kolom 1 (satu) calon yang memuat nomor urut, nama alon dan foto calon anggota DPD, dinyatakan sah 1 (satu) suara untuk Calon Anggota DPD yang bersangkutan;</li>\n<li>tanda coblos tepat pada garis kolom 1 (satu) calon yang memuat nomor urut, nama calon dan foto calon anggota DPD, dinyatakan sah 1</li>\n<li>(satu) suara untuk Calon Anggota DPD yang bersangkutan.</li>\n</ol>', 'Berdasarkan Peraturan  Komisi Pemilihan Umum Nomor 05 Tahun 2014 Tentang Perubahan Atas Peraturan Komisi Pemilihan Umum Nomor 26 Tahun 2013 Tentang Pemungutan Dan Penghitungan Suara Di Tempat Pemungutan Suara Dalam Pemilihan Umum Angota Dewan Perwakilan Rakyat, Dewan Perwakilan Daerah Dan Dewan Perwakilan Rakyat Daerah Provinsi Dan Dewan Perwakilan Rakyat Daerah Kabupaten/ Kota', '', 'tata cara pencoblosan, pemilu 2014, kabupaten muko muko', 'publish', '2014-03-31 06:03:00', '76d5ec4fd03377a63801c3b7f201b1de.jpg', ''),
(130, 'PERSYARATAN PEMANTAU PEMILU ANGGOTA DPR, DPD DAN DPRD TAHUN 2014', '<p>Berdasarkan Undang-Undang Nomor 15 Tahun 2011 dan Peraturan KPU Nomor 10 Tahun 2012 Tentang Pemantau dan Tata Cara Pemantau Pemilihan Umum Anggota DPR, DPD dan DPRD Tahun 2014.</p>\n<p>Dalam rangka melaksanakan Pemilihan Umum Anggota DPR, DPD dan DPRD Tahun 2014, maka KPU Kota Bengkulu membuka Pendaftaran Pemantau se-Kota Bengkulu meliputi Lembaga Swadaya Masyarakat, Badan Hukum Dalam Negeri, Pemantau Pemilu dari Perwakilan Negara Lain dan perseorangan dalam negeri yang tidak berkedudukan sebagai pengurus dan/atau anggota partai politik, serta perseorangan dari luar negeri. dengan persyaratan sebagai berikut :</p>\n<p>1. Persyaratan Umum :</p>\n<p>a) Bersifat Independent</p>\n<p>b) Mempunyai Sumber Dana Yang Jelas</p>\n<p>c) Terdaftar dan Memperoleh Akreditasi dari KPU, KPU Provinsi dan KPU Kab/Kota sesuai dengan cakupan wilayah pemantaunya.</p>\n<p>d) Bersifat Sukarela (Menanggung sendiri biaya pemantauan)</p>\n<p>2. Pengambilan blanko tanggal 14 Agustus 2012 s/d 02 April 2014 (pada hari kerja) di Sekretariat KPU Kota Bengkulu, Jln. WR. Supratman No.08 Kel. Bentiring Permai Kota Bengkulu pada pukul 08.00 WIB s/d 14.00 WIB.</p>\n<p>3. Blanko pendaftaran diserahkan paling lambat tanggal 02 April 2014 pukul 14.00 WIB di Sekretariat KPU Kota Bengkulu, Jln. WR. Supratman No.08 Kel. Bentiring Permai Kota Bengkulu dengan menyerahkan kelengkapan administrasi meliputi :</p>\n<p>a. Profil organisasi/lembaga;</p>\n<p>b. Nama dan jumlah anggota pemantau;</p>\n<p>c. Alokasi anggota pemantau yang akan ditempatkan ke daerah;</p>\n<p>d. Rencana dan jadwal kegiatan pemantauan serta daerah yang akan dipantau;</p>\n<p>e. Nama, alamat dan pekerjaan penanggung jawab pemantau yang dilampiri 2 (dua) buah pas foto diri terbaru 4&times;6 berwarna;</p>\n<p>f. Surat Pernyataan mengenai sumber dana yang ditandatangani oleh ketua lembaga Pemantau Pemilu;</p>\n<p>g. Surat pernyataan mengenai independensi lembaga pemantau yang ditandatangani oleh ketua lembaga Pemantau Pemilu;</p>\n<p>h. Surat pernyataan atau pengalaman dibidang pemantauan dari organisasi pemantau yang bersangkutan atau dari pemerintah negara lain tempat yang bersangkutan pernah melakukan pemantauan bagi pemantau pemilu luar negeri;</p>\n<p>i. Surat pernyataan atau pengalaman dibidang pemantauan dari pemantau perseorangan yang bersangkutan atau dari pemerintah negara lain tempat yang bersangkutan pernah melakukan pemantauan bagi pemantau pemilu perseorangan yang berasal dari luar negeri;</p>\n<p>j. Surat pernyataan mengenai independensi pemantau Pemilu perseorangan yang ditandatangani oleh pemantau Pemilu yang bersangkutan;</p>\n<p>k. Surat rekomendasi dari Menteri Luar Negeri Republik Indonesia bagi pemantau pemilu yang berasal dari perwakilan negara sahabat.</p>\n<p>4. Persyaratan dibuat dalam rangkap 3 (tiga), map plastik warna hijau.</p>\n<p>Demikian pengumuman ini, agar dapat menjadi perhatian.</p>', 'Berdasarkan Undang-Undang Nomor 15 Tahun 2011 dan Peraturan KPU Nomor 10 Tahun 2012 Tentang Pemantau dan Tata Cara Pemantau Pemilihan Umum Anggota DPR, DPD dan DPRD Tahun 2014.', '', 'PERSYARATAN PEMANTAU PEMILU', 'publish', '2014-03-31 04:03:00', 'a34f3f3187d34985bd2e2c787d93e701.png', ''),
(131, 'DISTRIBUSI LOGISTIK KPU KABUPATEN MUKOMUKO', '<p>Mukomuko, Distribusi logistik keperluan pemilu di kabupaten mukomuko tahun 2014 telah mulai didistribusikan mulai hari ini sabtu tanggal 5 april 2014. proses pendistribusian logistik ini mendapat pengawalan yang ketat baik dari pihak kepolisian maupun dari pihak panwas yang telah berada di kpu sejak pagi hari. adapun logistik yang dikirim hari ini adalah logistik untuk kecamatan di seluruh wilayah kabupaten mukomuko.&nbsp; Proses distribusi logistik dibuka langsung oleh BUPATI mukomuko yang disampaikan oleh sekretaris daerah kabupaten mukomuko, ditandai dengan pelepasan balon sebagai tanda telah dimulainya tahapan pendistribusian logistik pemilu tahun 2014. Sehubungan dengan hal tersebut, dana untuk seluruh tahapan pemilu juga telah disalurkan ke rekening masing-masing kecamatan. (Bpoh)</p>', 'Mukomuko, Distribusi logistik keperluan pemilu di kabupaten mukomuko tahun 2014 telah mulai didistribusikan mulai hari ini sabtu tanggal 5 april 2014. proses pendistribusian logistik ini mendapat pengawalan yang ketat baik dari pihak kepolisian maupun dari pihak panwas yang telah berada di kpu sejak pagi hari. adapun logistik yang dikirim hari ini adalah logistik untuk kecamatan di seluruh wilayah kabupaten ', '', 'DISTRIBUSI LOGISTIK KPU KABUPATEN MUKOMUKO', 'publish', '2014-04-05 04:04:00', 'a5a9726317983320f9d22f0ffd3c5695.png', ''),
(132, 'REKAPITULASI HASIL PENGHITUNGAN SUARA', '<p style="text-align: center;"><strong>REKAPITULASI HASIL PENGHITUNGAN SUARA&nbsp;</strong></p>\n<p style="text-align: center;"><strong>KPU KABUPATEN MUKOMUKO</strong></p>\n<p style="text-align: center;"><strong><a href="http://pemilu2014.kpu.go.id/c1.php" target="_blank">KLIK DISINI</a>&nbsp;</strong></p>\n\n<iframe style="height:1000px; width:100%;" src="http://pemilu2014.kpu.go.id/c1.php" seamless></iframe>', 'REKAPITULASI HASIL PENGHITUNGAN SUARA', '', 'REKAPITULASI HASIL PENGHITUNGAN SUARA', 'publish', '2014-04-20 20:05:40', '00072efb863e13b0aa4773d3d99ac65f.png', ''),
(133, 'judul', '<p>saya</p>', 'saya juga', '', 'tags', 'publish', '2014-06-24 17:04:46', NULL, ''),
(134, 'dshysdfh', '<p>dfhdfh</p>', 'dfhdfh', '', '', 'publish', '2014-07-05 20:00:21', NULL, 'post'),
(135, 'afasfg', '<p>sdfasd</p>', 'sdfasd', '', '', 'publish', '2014-07-05 20:00:38', NULL, 'post'),
(136, 'asefas', '<p>asdfasdf</p>', 'asdfasdf', '', '', 'publish', '2014-07-05 20:00:42', NULL, 'post'),
(137, 'asefasd', '<p>asdfasdf</p>', 'asdfasdf', '', '', 'publish', '2014-07-05 20:00:47', NULL, 'post'),
(138, 'awfas', '<p>asfasf</p>', 'asfasf', '', '', 'publish', '2014-07-05 20:00:51', NULL, 'post'),
(139, 'afas', '<p>asdfasdf</p>', 'asdfasdf', '', '', 'publish', '2014-07-05 20:00:54', NULL, 'post'),
(140, 'awefasdf', '<p>asdfasdf</p>', 'asdfasdf', '', '', 'publish', '2014-07-05 20:00:56', NULL, 'post'),
(141, 'sdfasdf', '<p>asdfasdf</p>', 'asdfasdf', '', '', 'publish', '2014-07-05 20:00:59', NULL, 'post'),
(142, 'asfasd', '<p>asdfasd</p>', 'asdfasd', '', '', 'publish', '2014-07-05 20:01:01', NULL, 'post'),
(143, 'asdfasdf', '<p>asdfasdf</p>', 'asdfasdf', '', '', 'publish', '2014-07-05 20:01:04', NULL, 'post'),
(144, 'asdfasdf', '<p>asdfasdf</p>', 'asdfasdf', '', '', 'publish', '2014-07-05 20:01:06', NULL, 'post'),
(145, 'dfhsdf', '<p>dfhsdf</p>', 'dfhsdf', '', '', 'publish', '2014-07-05 20:02:41', NULL, 'post'),
(146, 'sdfhsdf', '<p>dfhsdf</p>', 'dfhsdf', '', '', 'publish', '2014-07-05 20:02:44', NULL, 'post'),
(147, 'sdfhsdf', '<p>dsfhsdfh</p>', 'dsfhsdfh', '', '', 'publish', '2014-07-05 20:02:46', NULL, 'post'),
(148, 'sdfhsdf', '<p>dfhsdf</p>', 'dfhsdf', '', '', 'publish', '2014-07-05 20:02:44', NULL, 'post'),
(149, 'fgsdfg', '<p>sdfgasdg</p>', 'sdfgasdg', '', '', 'publish', '2014-07-05 20:03:25', NULL, 'post'),
(150, 'sdfgasdg', '<p>sdfgsdg</p>\n<p>&nbsp;</p>', 'sdfgsdg\n&nbsp;', '', '', 'publish', '2014-07-05 20:03:28', NULL, 'post'),
(151, 'sdgsadg', '<p>sdggsdg</p>', 'sdggsdg', '', '', 'publish', '2014-07-05 20:03:31', NULL, 'post'),
(152, 'sdgasdg', '<p>sdgsdg</p>', 'sdgsdg', '', '', 'publish', '2014-07-05 20:03:33', NULL, 'post'),
(153, 'sdgasdg', '<p>sdgsdag</p>', 'sdgsdag', '', '', 'publish', '2014-07-05 20:03:35', NULL, 'post'),
(154, 'sdfgad', '<p>sdgasdg</p>', 'sdgasdg', '', '', 'publish', '2014-07-05 20:03:37', NULL, 'post'),
(155, 'sdgads', '<p>sdgsd</p>', 'sdgsd', '', '', 'publish', '2014-07-05 20:03:40', NULL, 'post'),
(156, 'sdgasdg', '<p>sdgsdg</p>', 'sdgsdg', '', '', 'publish', '2014-07-05 20:03:42', NULL, 'post'),
(157, 'sdgsdg', '<p>sdgsdg</p>', 'sdgsdg', '', '', 'publish', '2014-07-05 20:03:45', NULL, 'post'),
(158, 'sdgsdg', '<p>sdgsdg</p>', 'sdgsdg', '', '', 'publish', '2014-07-05 20:03:47', NULL, 'post'),
(159, 'fghsdfgh', '<p>tghdfgh</p>', 'tghdfgh', '', '', 'publish', '2014-07-12 18:46:59', NULL, 'post');

-- --------------------------------------------------------

--
-- Table structure for table `galeri`
--

CREATE TABLE IF NOT EXISTS `galeri` (
  `galeri_id` int(11) NOT NULL AUTO_INCREMENT,
  `caption` text NOT NULL,
  `image` text NOT NULL,
  `album_id` int(11) NOT NULL,
  PRIMARY KEY (`galeri_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=45 ;

--
-- Dumping data for table `galeri`
--

INSERT INTO `galeri` (`galeri_id`, `caption`, `image`, `album_id`) VALUES
(43, 'dasdfasdfaf', 'dasdfasdfaf.jpg', 19),
(44, 'dasdfasdfaf1', 'dasdfasdfaf1.jpg', 19);

-- --------------------------------------------------------

--
-- Table structure for table `halaman`
--

CREATE TABLE IF NOT EXISTS `halaman` (
  `halaman_id` bigint(12) NOT NULL AUTO_INCREMENT,
  `judul` varchar(250) NOT NULL,
  `isi` longtext NOT NULL,
  `deskripsi` text NOT NULL,
  `tag` text NOT NULL,
  `status` varchar(8) NOT NULL,
  `tanggal` datetime NOT NULL,
  PRIMARY KEY (`halaman_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=3 ;

--
-- Dumping data for table `halaman`
--

INSERT INTO `halaman` (`halaman_id`, `judul`, `isi`, `deskripsi`, `tag`, `status`, `tanggal`) VALUES
(1, 'About Us', '<p>About Us</p>', 'About Us', 'About Us', 'publish', '2014-04-20 19:34:04'),
(2, 'PROFIL ANGGOTA KPU KABUPATEN MUKOMUKO', '<p>1. DAWUD, S.Ag ( KETUA)</p>\n<p>2. ABDUL HAMID SIREGAR (ANGGOTA)</p>\n<p>3. SYOFIA DIANA (ANGGOTA)</p>\n<p>4. KHAIRANZAR (ANGGOTA)</p>\n<p>5. DEDI DESPONSORI (ANGGOTA)</p>', 'kpumukomuko;kpukabupatenmukomuko', 'mukomuko,kpu, pemilu,dprd,kabupaten,dpr,dpt,calon,kampanye,', 'publish', '2014-04-25 13:11:46');

-- --------------------------------------------------------

--
-- Table structure for table `kategori`
--

CREATE TABLE IF NOT EXISTS `kategori` (
  `kategori_id` int(12) NOT NULL AUTO_INCREMENT,
  `kategori` varchar(250) NOT NULL,
  PRIMARY KEY (`kategori_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=6 ;

--
-- Dumping data for table `kategori`
--

INSERT INTO `kategori` (`kategori_id`, `kategori`) VALUES
(1, 'uncategorized'),
(3, 'Berita'),
(5, 'Peraturan');

-- --------------------------------------------------------

--
-- Table structure for table `kategori_artikel`
--

CREATE TABLE IF NOT EXISTS `kategori_artikel` (
  `kategori_artikel_id` int(12) NOT NULL AUTO_INCREMENT,
  `artikel_id` bigint(12) NOT NULL,
  `kategori_id` int(12) NOT NULL,
  PRIMARY KEY (`kategori_artikel_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=317 ;

--
-- Dumping data for table `kategori_artikel`
--

INSERT INTO `kategori_artikel` (`kategori_artikel_id`, `artikel_id`, `kategori_id`) VALUES
(281, 130, 3),
(283, 132, 3),
(284, 131, 3),
(288, 129, 3),
(290, 133, 5),
(291, 133, 3),
(292, 134, 1),
(293, 135, 1),
(294, 136, 1),
(295, 137, 1),
(296, 138, 1),
(297, 139, 1),
(298, 140, 1),
(299, 141, 1),
(300, 142, 1),
(301, 143, 1),
(302, 144, 1),
(303, 145, 1),
(304, 146, 1),
(305, 147, 1),
(306, 149, 1),
(307, 150, 1),
(308, 151, 1),
(309, 152, 1),
(310, 153, 1),
(311, 154, 1),
(312, 155, 1),
(313, 156, 1),
(314, 157, 1),
(315, 158, 1),
(316, 159, 1);

-- --------------------------------------------------------

--
-- Table structure for table `kontak`
--

CREATE TABLE IF NOT EXISTS `kontak` (
  `kontak_id` int(11) NOT NULL AUTO_INCREMENT,
  `judul` varchar(255) NOT NULL,
  `deskripsi` text NOT NULL,
  `email` varchar(255) NOT NULL,
  `phone` varchar(13) NOT NULL,
  `logitude` varchar(20) NOT NULL,
  `latitude` varchar(20) NOT NULL,
  PRIMARY KEY (`kontak_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=2 ;

--
-- Dumping data for table `kontak`
--

INSERT INTO `kontak` (`kontak_id`, `judul`, `deskripsi`, `email`, `phone`, `logitude`, `latitude`) VALUES
(1, 'Senandung Rindu', '<p>sdfasfasf</p>', 'bangkitapri@gmail.com', '32523452345', '110.369827', '-7.794167');

-- --------------------------------------------------------

--
-- Table structure for table `menu`
--

CREATE TABLE IF NOT EXISTS `menu` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `rang` int(11) NOT NULL,
  `parent_id` int(11) NOT NULL,
  `name` varchar(256) NOT NULL,
  `link` text NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=19 ;

--
-- Dumping data for table `menu`
--

INSERT INTO `menu` (`id`, `rang`, `parent_id`, `name`, `link`) VALUES
(13, 0, 0, 'BERANDA', '#'),
(14, 2, 0, 'PROFIL', '#'),
(15, 1, 0, 'BERITA', 'http://kpu-mukomukokab.go.id/artikel/'),
(16, 3, 0, 'DAFTAR CALON TETAP', '#'),
(17, 4, 0, 'KONTAK', '#'),
(18, 5, 0, 'GALLERY', '#');

-- --------------------------------------------------------

--
-- Table structure for table `setting`
--

CREATE TABLE IF NOT EXISTS `setting` (
  `id` tinyint(4) NOT NULL AUTO_INCREMENT,
  `web_title` varchar(250) NOT NULL,
  `web_description` text NOT NULL,
  `web_keyword` text,
  `logo` varchar(100) DEFAULT NULL,
  `favicon` varchar(100) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=2 ;

--
-- Dumping data for table `setting`
--

INSERT INTO `setting` (`id`, `web_title`, `web_description`, `web_keyword`, `logo`, `favicon`) VALUES
(1, 'Test Seo titles', 'ini descriptions', 'ini keyword', '94f7285c623dad4e96b9941aee5453e2.gif', 'b686baea4e1096dbaa20f8313a6ed505.gif');

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE IF NOT EXISTS `user` (
  `username` varchar(50) NOT NULL,
  `password` varchar(50) NOT NULL,
  `level` int(1) NOT NULL,
  `last_login` datetime NOT NULL,
  `nama` varchar(255) NOT NULL,
  `email` varchar(100) NOT NULL,
  `photo` text NOT NULL,
  PRIMARY KEY (`username`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`username`, `password`, `level`, `last_login`, `nama`, `email`, `photo`) VALUES
('barpohan', '370194ff6e0f93a7432e16cc9badd9427e8b4e13', 2, '0000-00-00 00:00:00', 'bardansyah pohan', 'pohan@kpu-mukomukokab.go.id', ''),
('jhond', '44e420bf6bcca067d9a00abd95e2ce8954b57bdf', 2, '0000-00-00 00:00:00', 'jhon domanov', 'domanovjuventini@gmail.com', ''),
('mradmin', '337193a7f6275e9f27deb8b4b8d894fc34aac684', 1, '0000-00-00 00:00:00', 'admin kpu', 'adminkpu@admin.com', 'b6efab8449c51384e5b2820beb648098.png');

-- --------------------------------------------------------

--
-- Table structure for table `widget`
--

CREATE TABLE IF NOT EXISTS `widget` (
  `widget_id` int(11) NOT NULL AUTO_INCREMENT,
  `widget_position` varchar(100) NOT NULL,
  `widget_sort` int(11) NOT NULL DEFAULT '0',
  `widget_name` varchar(100) NOT NULL,
  `widget_data` text NOT NULL,
  PRIMARY KEY (`widget_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=24 ;

--
-- Dumping data for table `widget`
--

INSERT INTO `widget` (`widget_id`, `widget_position`, `widget_sort`, `widget_name`, `widget_data`) VALUES
(15, 'widget1', 0, 'recent_post', 'a:3:{s:12:"widget_title";s:15:"Artikel Terbaru";s:17:"widget_limit_post";s:1:"5";s:16:"widget_show_date";b:0;}'),
(16, 'widget2', 0, 'recent_post', 'a:3:{s:12:"widget_title";s:16:"Artikel Teranyar";s:17:"widget_limit_post";s:1:"2";s:16:"widget_show_date";b:0;}'),
(19, 'widget1', 0, 'recent_post', 'a:3:{s:12:"widget_title";s:15:"Artikel Terbaru";s:17:"widget_limit_post";s:1:"5";s:16:"widget_show_date";b:0;}'),
(20, 'widget2', 0, 'text_widget', 'a:2:{s:12:"widget_title";s:6:"Jossss";s:14:"widget_content";s:500:"<p>skguiashdg sdjkhsudfsd jasd asdasdhns djasd asdvjhnasdvnasdj jasdvj asdjvnasdhjasdv asdj vjhnasdvjasdvjsdhn vjasdvhnasdjassdhnv sjkdnvhnas dvjnDASNDVA SDVJN &nbsp;ASDNV JASDVJHNASDJV ASDN VJNASDV ASDJKazn &nbsp;NJN Nnjdbnsd vj sdhnv sdj vsd sdjvsdn sdjvnsdvjknsdn sdjvjksd vjksdvjsdnv sdjkvnsdvjsdvnsdjnsdnv sdjvnsd vjksd vsdjvsdnvsdvsd vjksdvjksjkdvjknsdvjn sdvsdjnvjksdv sdjkvsdkjvsd&nbsp;<img src="/CORE_GOJIN/assets/fileman/Uploads/roxy-fileman-logo.gif" alt="" width="289" height="127" /></p>";}'),
(23, 'widget1', 0, 'recent_post', 'a:3:{s:12:"widget_title";s:33:"sssssssssssssssssssssssssssssssss";s:17:"widget_limit_post";s:1:"5";s:16:"widget_show_date";b:0;}');

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
