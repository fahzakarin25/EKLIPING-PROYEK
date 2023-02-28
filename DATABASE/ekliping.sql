-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3306
-- Generation Time: Feb 28, 2023 at 03:59 AM
-- Server version: 5.7.33
-- PHP Version: 7.4.19

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `ekliping`
--

-- --------------------------------------------------------

--
-- Table structure for table `berita_jurnalis`
--

CREATE TABLE `berita_jurnalis` (
  `id_berita_jurnalis` int(11) NOT NULL,
  `id_jurnalis` int(25) NOT NULL,
  `tanggal_publis` date NOT NULL,
  `nilai_kontrak` double NOT NULL,
  `status` int(11) NOT NULL,
  `url_berita` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `berita_jurnalis`
--

INSERT INTO `berita_jurnalis` (`id_berita_jurnalis`, `id_jurnalis`, `tanggal_publis`, `nilai_kontrak`, `status`, `url_berita`) VALUES
(1, 2, '2022-12-20', 100, 1, 'https://pariamankota.go.id/berita/hadiri-pelantikan-dpd-knpi-kota-pariaman-periode-2022-2025-genius-umar-jadilah-pemuda-berperan-bukan-baperan'),
(2, 1, '2022-12-27', 100, 1, 'https://pariamankota.go.id/berita/hadiri-pelantikan-dpd-knpi-kota-pariaman-periode-2022-2025-genius-umar-jadilah-pemuda-berperan-bukan-baperan');

-- --------------------------------------------------------

--
-- Table structure for table `berita_online`
--

CREATE TABLE `berita_online` (
  `id_berita` int(111) NOT NULL,
  `judul_berita` varchar(100) NOT NULL,
  `url_berita` varchar(255) NOT NULL,
  `tanggal_publis` date NOT NULL,
  `status` int(11) NOT NULL,
  `media` int(11) NOT NULL,
  `create_at` datetime DEFAULT NULL,
  `update_at` datetime DEFAULT NULL,
  `create_by` int(11) DEFAULT NULL,
  `update_by` int(11) DEFAULT NULL,
  `verifikator` int(11) DEFAULT NULL,
  `tanggal_verifikasi` date DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `berita_online`
--

INSERT INTO `berita_online` (`id_berita`, `judul_berita`, `url_berita`, `tanggal_publis`, `status`, `media`, `create_at`, `update_at`, `create_by`, `update_by`, `verifikator`, `tanggal_verifikasi`) VALUES
(2, 'Pantau kondisi kebakaran SMK N 2 Pariaman, ini harapan Mardison Mahyuddin', 'https://minangkabaunews.com/pantau-kondisi-kebakaran-smk-n-2-pariaman-ini-harapan-mardison-mahyuddin/', '2022-12-31', 2, 17, '2022-12-26 15:09:12', '2023-02-02 15:58:35', 6, 6, 8, '2023-01-14'),
(3, 'Genius Umar Serahkan 111 Unit Bantuan Rumah Swadaya untuk masyarakat Prasejahtera', 'https://minangkabaunews.com/genius-umar-serahkan-111-unit-bantuan-rumah-swadaya-untuk-masyarakat-prasejahtera/', '2022-12-23', 2, 17, '2022-12-27 14:38:07', '2023-02-07 15:03:19', 7, 6, 8, '2023-01-16'),
(4, 'Wawako Pariaman Ajak Masyarakat Kembali Lestarikan Budaya Daerah', 'https://minangkabaunews.com/wawako-pariaman-ajak-masyarakat-kembali-lestarikan-budaya-daerah/', '2022-12-31', 2, 17, '2023-01-16 09:53:03', '2023-02-02 15:59:17', 6, 6, 8, '2023-02-02'),
(5, 'Genius Umar Kukuhkan Bunda Literasi Kota Pariaman', 'https://minangkabaunews.com/genius-umar-kukuhkan-bunda-literasi-kota-pariaman/', '2022-12-28', 2, 17, '2023-02-02 15:59:50', NULL, 6, NULL, 8, '2023-02-02'),
(6, 'Genius Umar Pimpin Penertiban PKL Pasar Pariaman', 'https://minangkabaunews.com/genius-umar-pimpin-penertiban-pkl-pasar-pariaman/', '2022-12-27', 2, 17, '2023-02-02 16:00:21', NULL, 6, NULL, 8, '2023-02-02'),
(7, 'Mardison Mahyuddin Sampaikan Potensi Wisata Kota Pariaman Ke Raffi Ahmad', 'https://minangkabaunews.com/mardison-mahyuddin-sampaikan-potensi-wisata-kota-pariaman-ke-raffi-ahmad/', '2022-12-26', 2, 17, '2023-02-02 16:01:00', NULL, 6, NULL, 8, '2023-02-02'),
(8, 'Terima Kunker Komisi V DPR RI, Genius Umar Usulkan Sejumlah Pembangunan Infrastruktur', 'https://www.padangtime.com/terima-kunker-komisi-v-dpr-ri-genius-umar-usulkan-sejumlah-pembangunan-infrastruktur/21/', '2023-01-19', 2, 1, '2023-02-07 15:14:23', NULL, 9, NULL, 8, '2023-02-07');

-- --------------------------------------------------------

--
-- Table structure for table `jurnalis`
--

CREATE TABLE `jurnalis` (
  `id_pers` int(11) NOT NULL,
  `nama_jurnalis` varchar(100) NOT NULL,
  `tempat_lahir` varchar(50) NOT NULL,
  `tanggal_lahir` date NOT NULL,
  `alamat` text NOT NULL,
  `hp_wa` varchar(15) NOT NULL,
  `media_jurnalis` varchar(100) NOT NULL,
  `wilayah` varchar(100) NOT NULL,
  `jabatan` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `jurnalis`
--

INSERT INTO `jurnalis` (`id_pers`, `nama_jurnalis`, `tempat_lahir`, `tanggal_lahir`, `alamat`, `hp_wa`, `media_jurnalis`, `wilayah`, `jabatan`) VALUES
(1, 'Tachi', 'Pariaman', '1960-07-20', 'jln. bunda yanti no.22e', '081234567890', '1', 'Pariaman', 'penulis'),
(2, 'Erwin', 'Pariaman', '1801-07-15', 'jln. lubuak pantai no.54', '081231234556', '1', 'Pariaman', 'penulis'),
(3, 'Dewi', 'Pariaman', '1987-03-11', 'jln. bagindo bundo no.23 f', '081299876434', '1', 'Pariaman', 'penulis');

-- --------------------------------------------------------

--
-- Table structure for table `kategori_kliping`
--

CREATE TABLE `kategori_kliping` (
  `id_kategori` int(11) NOT NULL,
  `jenis_kategori` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `kategori_kliping`
--

INSERT INTO `kategori_kliping` (`id_kategori`, `jenis_kategori`) VALUES
(1, 'PELAYANAN UMUM'),
(2, 'KEAMANAN, HUKUM & POLITIK'),
(3, 'EKONOMI & BISNIS'),
(4, 'LINGKUNGAN HIDUP'),
(5, 'FASILITAS UMUM'),
(6, 'KESEHATAN'),
(7, 'PARIWISATA & BUDAYA'),
(8, 'PENDIDIKAN'),
(9, 'SOSIAL & AGAMA'),
(10, 'TEKNOLOGI'),
(11, 'SPORT'),
(13, 'KPOP');

-- --------------------------------------------------------

--
-- Table structure for table `kliping`
--

CREATE TABLE `kliping` (
  `id_kliping` int(11) NOT NULL,
  `judul` varchar(255) NOT NULL,
  `tanggal` date NOT NULL,
  `kategori` int(11) NOT NULL,
  `media` varchar(100) NOT NULL,
  `jurnalis` varchar(100) NOT NULL,
  `lokasi_upload` varchar(255) NOT NULL,
  `status_publis` int(11) NOT NULL,
  `create_time` datetime DEFAULT NULL,
  `update_time` datetime DEFAULT NULL,
  `create_by` int(11) DEFAULT NULL,
  `update_by` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `kliping`
--

INSERT INTO `kliping` (`id_kliping`, `judul`, `tanggal`, `kategori`, `media`, `jurnalis`, `lokasi_upload`, `status_publis`, `create_time`, `update_time`, `create_by`, `update_by`) VALUES
(1, 'Hadiri Maulid Nabi, Inilah Pesan Genius Umar', '2022-10-30', 9, '1', '2', '/uploads/filepdf/20221121101500.png', 1, '2022-10-31 08:28:38', '2022-12-15 11:19:25', NULL, 1),
(2, 'Walikota Sampaikan Pandangan Umum Fraksi RAPBD TA 2023', '2022-10-25', 3, '1', '3', '/uploads/filepdf/20221121101623.png', 1, '2022-10-31 16:00:11', '2022-12-08 11:18:55', NULL, 1),
(3, 'Genius Umar Ajak Pemuda Bangun Kota Pariaman', '2022-10-28', 2, '1', '2', '/uploads/filepdf/20221121101721.png', 1, '2022-10-31 21:02:30', '2022-12-02 11:31:41', 1, 1),
(4, ' Ketua BNK Sosialiasikan Bahaya Narkoba di SMKN 1 Pariaman', '2022-10-31', 8, '1', '1', '/uploads/filepdf/20221121101807.png', 1, '2022-11-01 09:53:03', '2022-12-02 11:32:06', 1, 1),
(5, 'Peringatan Maulid Nabi, Momentum untuk introspeksi diri', '2022-11-01', 9, '1', '2', '/uploads/filepdf/20221121101902.png', 1, '2022-11-02 11:37:56', '2022-12-02 11:32:45', 1, 1),
(6, '187 Orang Mustahik Terima Zakat Program Pariaman Makmur', '2022-11-01', 9, '1', '1', '/uploads/filepdf/20221121101936.png', 1, '2022-11-02 14:34:56', '2022-11-21 10:19:36', 1, 1),
(7, 'Pengusaha Muda Asal Pariaman, Fauzi Sukses Berkat Berbagi', '2022-11-09', 9, '1', '2', '/uploads/filepdf/20221121102143.png', 1, '2022-11-07 10:46:43', '2022-11-21 19:25:43', 1, 1),
(8, 'Pemain Persikopa Dapat Sepatu Baru', '2022-11-09', 3, '1', '1', '/uploads/filepdf/20221121102216.png', 1, '2022-11-10 10:56:40', '2022-11-21 10:22:16', 1, 1),
(9, 'Genius Umar Minta KONI Kota Pariaman Dukung Sport Tourism ', '2022-11-14', 11, '1', '3', '/uploads/filepdf/20221121102258.png', 1, '2022-11-14 08:52:16', '2022-12-02 11:34:13', 1, 1),
(10, 'Cetak Sejarah, Persikopa Kalahkan Semen Padang', '2022-11-12', 11, '1', '3', '/uploads/filepdf/20221121102442.png', 1, '2022-11-14 10:15:58', '2022-11-22 11:12:03', NULL, 1),
(11, '30 KPM PKH Ikuti Pelatihan Usaha Khas Pariaman', '2022-11-18', 3, '2', '3', '/uploads/filepdf/20221118042707.png', 1, '2022-11-14 10:34:44', '2022-12-08 14:03:28', 1, 1),
(12, 'Wako Pariaman Genius Umar Buka Bimtek SIPD', '2022-11-16', 8, '3', '1', '/uploads/filepdf/20221121102524.png', 1, '2022-11-18 00:00:00', '2022-12-08 14:03:19', 1, 1),
(13, 'Gelar Pelatihan Wisata', '2022-11-17', 7, '3', '3', '/uploads/filepdf/20221121102557.png', 1, '2022-11-18 00:00:00', '2022-12-08 14:48:50', 1, 1),
(14, 'Genius Umar Sampaikan Keberhasilan Pembangunan Kota Pariaman Untuk Masyarakat', '2023-02-12', 5, '22', '3', '/uploads/filepdf/20230222113149.jpeg', 1, '2023-02-22 11:31:49', NULL, 1, NULL),
(15, 'Pemko Pariaman akan Rampungkan Mesjid Terapung di 2023', '2023-02-13', 5, '17', '2', '/uploads/filepdf/20230222113346.jpeg', 1, '2023-02-22 11:33:46', NULL, 1, NULL),
(16, 'Puluhan Pejabat Eselon Tandatangani Kontrak Kerja', '2023-02-16', 3, '17', '3', '/uploads/filepdf/20230222113531.jpeg', 1, '2023-02-22 11:35:31', NULL, 1, NULL),
(17, 'Genius Bahas Matrilinialisme di Forum Internasional CSW 67', '2023-01-28', 3, '2', '1', '/uploads/filepdf/20230222113808.jpeg', 1, '2023-02-22 11:38:08', NULL, 1, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `kwitansi`
--

CREATE TABLE `kwitansi` (
  `id_kwitansi` int(11) NOT NULL,
  `id_media` int(11) NOT NULL,
  `nilai_kontrak` double NOT NULL,
  `jumlah_berita` int(11) NOT NULL,
  `minimal_berita` int(11) NOT NULL,
  `harga_perberita` double NOT NULL,
  `total_bayar` double DEFAULT NULL,
  `bulan` int(11) NOT NULL,
  `tahun` int(11) NOT NULL,
  `status_cetak` int(11) NOT NULL,
  `hash_data` text NOT NULL,
  `create_at` int(11) NOT NULL,
  `create_by` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `kwitansi`
--

INSERT INTO `kwitansi` (`id_kwitansi`, `id_media`, `nilai_kontrak`, `jumlah_berita`, `minimal_berita`, `harga_perberita`, `total_bayar`, `bulan`, `tahun`, `status_cetak`, `hash_data`, `create_at`, `create_by`) VALUES
(1, 17, 1000000, 5, 30, 50000, 250000, 12, 2022, 1, 'GQpFQayx6hJHan5D4VgLqOuTMFTkfX', 2023, 10),
(2, 1, 750000, 1, 30, 50000, 50000, 1, 2023, 1, 'p0dr0jaJumbWt8c31IzfIT9KCEL320', 2023, 9);

-- --------------------------------------------------------

--
-- Table structure for table `media`
--

CREATE TABLE `media` (
  `id_media` int(11) NOT NULL,
  `nama_media` varchar(50) NOT NULL,
  `jenis_media` int(11) NOT NULL,
  `nilai_kontrak` double NOT NULL,
  `minimal_berita` int(11) NOT NULL,
  `harga_perberita` double NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `media`
--

INSERT INTO `media` (`id_media`, `nama_media`, `jenis_media`, `nilai_kontrak`, `minimal_berita`, `harga_perberita`) VALUES
(1, 'padangtime.com', 2, 750000, 30, 50000),
(2, 'pariamantoday.com', 2, 2000000, 30, 50000),
(3, 'kongkrit.com', 2, 750000, 30, 50000),
(4, 'kabardaerah.com', 2, 750000, 30, 50000),
(5, 'lancangkuning.com', 2, 750000, 30, 50000),
(6, 'covesia.com', 2, 2000000, 30, 50000),
(7, 'lintasmedia', 2, 750000, 30, 50000),
(8, 'padangkita.com', 2, 1000000, 30, 50000),
(9, 'lintasSumbar.com', 2, 1000000, 30, 50000),
(10, 'fokussumatera.com', 2, 750000, 30, 50000),
(11, 'langgam.id', 2, 1500000, 30, 50000),
(12, 'klikpositif', 2, 1000000, 30, 50000),
(13, 'scientia.id', 2, 750000, 30, 50000),
(14, 'bentengsumbar.com', 2, 1000000, 30, 50000),
(15, 'padek.jawapos.com', 2, 1500000, 30, 50000),
(16, 'bangunpiaman.com', 2, 750000, 30, 50000),
(17, 'minangkabaunews.com', 2, 1000000, 30, 50000),
(18, 'tribunsumbar.com', 2, 1000000, 30, 50000),
(19, 'arunala.com', 2, 750000, 30, 50000),
(20, 'sumbar.antaranews.com', 2, 2000000, 30, 50000),
(21, 'sumbartoday.net', 2, 750000, 30, 50000),
(22, 'harianhaluan.com', 2, 1500000, 30, 50000),
(23, 'topsatu.com', 2, 1500000, 30, 50000),
(24, 'padang.tribunnews.com', 2, 1500000, 30, 50000),
(25, 'fajarharapan.id', 2, 750000, 30, 50000),
(26, 'beritamerdekaonline.com', 2, 750000, 30, 50000),
(27, 'reportaseinvestigasi.com', 2, 750000, 30, 50000),
(28, 'sumbarsatu.com', 2, 750000, 30, 50000),
(29, 'Singgalang', 1, 0, 0, 0);

-- --------------------------------------------------------

--
-- Table structure for table `migration`
--

CREATE TABLE `migration` (
  `version` varchar(180) NOT NULL,
  `apply_time` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `migration`
--

INSERT INTO `migration` (`version`, `apply_time`) VALUES
('m000000_000000_base', 1667180269),
('m130524_201442_init', 1667180271),
('m150214_044831_init_user', 1667180903),
('m190124_110200_add_verification_token_column_to_user_table', 1667180272);

-- --------------------------------------------------------

--
-- Table structure for table `profile`
--

CREATE TABLE `profile` (
  `id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `full_name` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `timezone` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `media` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `profile`
--

INSERT INTO `profile` (`id`, `user_id`, `created_at`, `updated_at`, `full_name`, `timezone`, `media`) VALUES
(1, 1, '2022-10-30 18:48:23', '2022-11-07 20:43:47', 'Fahza Syafira Karin', 'Asia/Jakarta', NULL),
(2, 2, '2022-12-18 20:08:01', '2022-12-18 20:08:01', 'Tachi', NULL, NULL),
(3, 3, '2022-12-18 20:10:07', '2022-12-18 20:10:07', 'Erwin', NULL, NULL),
(4, 4, '2022-12-18 20:11:16', '2022-12-18 20:11:16', 'Dewi', NULL, NULL),
(5, 5, '2022-12-22 00:14:25', '2023-01-16 01:55:14', 'Bambang', NULL, NULL),
(6, 6, '2022-12-25 20:50:18', '2023-02-02 01:56:50', 'MinangKabauNews', NULL, 17),
(8, 8, '2022-12-29 21:21:08', '2023-01-15 19:54:50', 'Verifikator', NULL, NULL),
(9, 9, '2023-02-07 01:09:45', '2023-02-07 01:16:28', 'PadangTime', NULL, 1);

-- --------------------------------------------------------

--
-- Table structure for table `role`
--

CREATE TABLE `role` (
  `id` int(11) NOT NULL,
  `name` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `can_admin` smallint(6) NOT NULL DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `role`
--

INSERT INTO `role` (`id`, `name`, `created_at`, `updated_at`, `can_admin`) VALUES
(1, 'Admin', '2022-10-30 18:48:23', NULL, 1),
(2, 'User', '2022-10-30 18:48:23', NULL, 0),
(3, 'Verifikator', '2022-12-19 03:01:49', NULL, 0),
(4, 'Jurnalis', '2022-12-22 07:17:05', NULL, 1),
(5, 'Media', '2022-12-26 03:48:49', NULL, 0);

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE `user` (
  `id` int(11) NOT NULL,
  `role_id` int(11) NOT NULL,
  `status` smallint(6) NOT NULL,
  `email` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `username` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `password` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `auth_key` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `access_token` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `logged_in_ip` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `logged_in_at` timestamp NULL DEFAULT NULL,
  `created_ip` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `banned_at` timestamp NULL DEFAULT NULL,
  `banned_reason` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`id`, `role_id`, `status`, `email`, `username`, `password`, `auth_key`, `access_token`, `logged_in_ip`, `logged_in_at`, `created_ip`, `created_at`, `updated_at`, `banned_at`, `banned_reason`) VALUES
(1, 1, 1, 'neo@neo.com', 'neo', '$2y$13$dyVw4WkZGkABf2UrGWrhHO4ZmVBv.K4puhOL59Y9jQhIdj63TlV.O', 'F1eHoZ4qmRrV8Xp_s_8DbTcSzL7Lbl-2', 'ZxP1440x4_xHF4SErf8b2lxPx_0OJGMq', '::1', '2023-02-27 20:55:03', NULL, '2022-10-30 18:48:23', NULL, NULL, NULL),
(2, 4, 1, 'Tachi@gmail.com', 'Tachi', '$2y$13$lkix8vgnaKv/.Kd8YphVnOxAiGy.ICBCs7tioXY1G/Ut6AB96xidC', NULL, NULL, '::1', '2022-12-25 23:15:23', NULL, '2022-12-18 20:08:01', '2022-12-22 00:17:51', NULL, NULL),
(3, 4, 1, 'Erwin@gmail.com', 'Erwin', '$2y$13$GnvZrOpytCR7oCT4C7wOEOZ1YvICWtNuEm6failIXKbPeeRMlMNA.', NULL, NULL, '::1', '2022-12-22 00:30:45', NULL, '2022-12-18 20:10:07', '2022-12-22 00:18:00', NULL, NULL),
(4, 4, 1, 'Dewi@gmail.com', 'Dewi', '$2y$13$56LQP5jWfP4Qwe6HuuAVaewJ5r1DySRTBeqk/fCdZyQUw2DkkNwmq', NULL, NULL, NULL, NULL, NULL, '2022-12-18 20:11:16', '2022-12-22 00:18:08', NULL, NULL),
(5, 3, 0, 'Bambang@gmail.com', 'Bam', '$2y$13$fisOSDXgzwcUv4CfztWiC.2FhsH2oHtXR6ryq/lsxmrEBnFHISCiO', NULL, NULL, '::1', '2022-12-22 00:14:48', NULL, '2022-12-22 00:14:25', '2023-01-16 01:55:14', NULL, NULL),
(6, 5, 1, 'minangkabaunews@gmail.com', 'minangkabaunews', '$2y$13$3mLDvSnfDRBTjjMM3h0ie.t3OiMdTd28f4NVdA/IjIwL.wBwL/Axy', NULL, NULL, '::1', '2023-02-27 20:55:37', NULL, '2022-12-25 20:50:18', '2023-02-02 01:56:50', NULL, NULL),
(8, 3, 1, 'verifikator@gmail.com', 'Verifikator', '$2y$13$y.JgAIYmKrerFExKc/OQM.VRpsxpLcNc0Mn2j2qnqa3U.sfaBe87a', NULL, NULL, '::1', '2023-02-20 19:13:22', NULL, '2022-12-29 21:21:08', '2023-01-15 19:54:50', NULL, NULL),
(9, 5, 1, 'padangtime@gmail.com', 'padangtime', '$2y$13$IO89T5SrdUBXFzOiNT7KhetKK4NhK14TVLk1tvkienrBhoSd1CEZW', NULL, NULL, '::1', '2023-02-08 00:35:11', NULL, '2023-02-07 01:09:45', '2023-02-07 01:16:28', NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `user_auth`
--

CREATE TABLE `user_auth` (
  `id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `provider` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `provider_id` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `provider_attributes` text COLLATE utf8_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `user_token`
--

CREATE TABLE `user_token` (
  `id` int(11) NOT NULL,
  `user_id` int(11) DEFAULT NULL,
  `type` smallint(6) NOT NULL,
  `token` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `data` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `expired_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `user_token`
--

INSERT INTO `user_token` (`id`, `user_id`, `type`, `token`, `data`, `created_at`, `expired_at`) VALUES
(1, 8, 1, 'AMPRa-nVA0rM37AloLo7dGg7kSQTx-Qe', NULL, '2022-12-29 21:38:28', NULL);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `berita_jurnalis`
--
ALTER TABLE `berita_jurnalis`
  ADD PRIMARY KEY (`id_berita_jurnalis`);

--
-- Indexes for table `berita_online`
--
ALTER TABLE `berita_online`
  ADD PRIMARY KEY (`id_berita`);

--
-- Indexes for table `jurnalis`
--
ALTER TABLE `jurnalis`
  ADD PRIMARY KEY (`id_pers`);

--
-- Indexes for table `kategori_kliping`
--
ALTER TABLE `kategori_kliping`
  ADD PRIMARY KEY (`id_kategori`);

--
-- Indexes for table `kliping`
--
ALTER TABLE `kliping`
  ADD PRIMARY KEY (`id_kliping`);

--
-- Indexes for table `kwitansi`
--
ALTER TABLE `kwitansi`
  ADD PRIMARY KEY (`id_kwitansi`);

--
-- Indexes for table `media`
--
ALTER TABLE `media`
  ADD PRIMARY KEY (`id_media`);

--
-- Indexes for table `migration`
--
ALTER TABLE `migration`
  ADD PRIMARY KEY (`version`);

--
-- Indexes for table `profile`
--
ALTER TABLE `profile`
  ADD PRIMARY KEY (`id`),
  ADD KEY `profile_user_id` (`user_id`);

--
-- Indexes for table `role`
--
ALTER TABLE `role`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `user_email` (`email`),
  ADD UNIQUE KEY `user_username` (`username`),
  ADD KEY `user_role_id` (`role_id`);

--
-- Indexes for table `user_auth`
--
ALTER TABLE `user_auth`
  ADD PRIMARY KEY (`id`),
  ADD KEY `user_auth_provider_id` (`provider_id`),
  ADD KEY `user_auth_user_id` (`user_id`);

--
-- Indexes for table `user_token`
--
ALTER TABLE `user_token`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `user_token_token` (`token`),
  ADD KEY `user_token_user_id` (`user_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `berita_jurnalis`
--
ALTER TABLE `berita_jurnalis`
  MODIFY `id_berita_jurnalis` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `berita_online`
--
ALTER TABLE `berita_online`
  MODIFY `id_berita` int(111) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `kategori_kliping`
--
ALTER TABLE `kategori_kliping`
  MODIFY `id_kategori` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT for table `kliping`
--
ALTER TABLE `kliping`
  MODIFY `id_kliping` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=18;

--
-- AUTO_INCREMENT for table `kwitansi`
--
ALTER TABLE `kwitansi`
  MODIFY `id_kwitansi` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `media`
--
ALTER TABLE `media`
  MODIFY `id_media` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=30;

--
-- AUTO_INCREMENT for table `profile`
--
ALTER TABLE `profile`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `role`
--
ALTER TABLE `role`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `user_auth`
--
ALTER TABLE `user_auth`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `user_token`
--
ALTER TABLE `user_token`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `profile`
--
ALTER TABLE `profile`
  ADD CONSTRAINT `profile_user_id` FOREIGN KEY (`user_id`) REFERENCES `user` (`id`);

--
-- Constraints for table `user`
--
ALTER TABLE `user`
  ADD CONSTRAINT `user_role_id` FOREIGN KEY (`role_id`) REFERENCES `role` (`id`);

--
-- Constraints for table `user_auth`
--
ALTER TABLE `user_auth`
  ADD CONSTRAINT `user_auth_user_id` FOREIGN KEY (`user_id`) REFERENCES `user` (`id`);

--
-- Constraints for table `user_token`
--
ALTER TABLE `user_token`
  ADD CONSTRAINT `user_token_user_id` FOREIGN KEY (`user_id`) REFERENCES `user` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
