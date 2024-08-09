-- phpMyAdmin SQL Dump
-- version 4.7.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jun 12, 2024 at 04:51 AM
-- Server version: 10.1.25-MariaDB
-- PHP Version: 5.6.31

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `db_rspm`
--

-- --------------------------------------------------------

--
-- Table structure for table `gaji`
--

CREATE TABLE `gaji` (
  `id` int(11) NOT NULL,
  `kode_transaksi` varchar(100) NOT NULL,
  `bulan` varchar(50) NOT NULL,
  `tahun` varchar(50) NOT NULL,
  `no_gaji` varchar(1000) NOT NULL,
  `tgl_gaji` date NOT NULL,
  `nopeg` varchar(25) NOT NULL,
  `upah_awal` int(11) NOT NULL,
  `revisi` int(11) NOT NULL,
  `bpjs_kerja` int(11) NOT NULL,
  `bpjs_kes` int(11) NOT NULL,
  `pph21` int(11) NOT NULL,
  `ppni` int(11) NOT NULL,
  `lain` int(11) NOT NULL,
  `tj_jbtn` int(11) NOT NULL,
  `tj_fungsional` int(11) NOT NULL,
  `tj_resiko` int(11) NOT NULL,
  `fee_for_servis` int(11) NOT NULL,
  `tj_tpbri` int(11) NOT NULL,
  `lembur` int(11) NOT NULL,
  `thr` int(11) NOT NULL,
  `tj_lain` int(11) NOT NULL,
  `penyesuaian` int(11) NOT NULL,
  `bruto` int(11) NOT NULL,
  `total_pendapatan` int(11) NOT NULL,
  `total_potongan` int(11) NOT NULL,
  `obat` int(11) NOT NULL,
  `seragam` int(11) NOT NULL,
  `kredit` int(11) NOT NULL,
  `pelatihan` int(11) NOT NULL,
  `total_potongan_slip` int(11) NOT NULL,
  `transfer` int(11) NOT NULL,
  `status` varchar(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `master_pegawai`
--

CREATE TABLE `master_pegawai` (
  `id` int(11) NOT NULL,
  `jabatan` varchar(43) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `master_pegawai`
--

INSERT INTO `master_pegawai` (`id`, `jabatan`) VALUES
(1, 'PELAKSANA CASEMIX'),
(2, 'PELAKSANA PERAWAT'),
(3, 'KEPALA INSTALASI IT&SIM RS'),
(4, 'KEPALA RUANG'),
(5, 'PELAKSANA SEKURITY'),
(6, 'PELAKSANA TEHNISI'),
(7, 'PELAKSANA ASPER'),
(8, 'KOORDINATOR  IPSRS'),
(9, 'PELAKSANA TTK'),
(10, 'PELAKSANA ANALIS'),
(11, 'PELAKSANA LOGISTIK GIZI'),
(12, 'PELAKSANA ASISTEN KOKI'),
(13, 'PELAKSANA PERAWAT GIGI'),
(14, 'PELAKSANA LAUNDRY'),
(15, 'WAKIL KOORDINATOR'),
(16, 'PELAKSANA TEKNISI'),
(17, 'PELAKSANA DRIVER'),
(18, 'PELAKSANA PENYAJI'),
(19, 'PELAKSANA OPERATOR'),
(20, 'PELAKSANA ADMINISTRASI'),
(21, 'PELAKSANA ADMINISTRASI INVENTARIS MEDIS'),
(22, 'ADMIN KEPERAWATAN'),
(23, 'PELAKSANA GARDENER'),
(24, 'PELAKSANA BIDAN'),
(25, 'PELAKSANA PENDAFTARAN'),
(26, 'PELAKSANA KOKI'),
(27, 'KOORDINATOR KOKI'),
(28, 'SEKRETARIS'),
(29, 'KOORDINATOR'),
(30, 'PELAKSANA STERILISATOR'),
(31, 'KOORDINATOR PIUTANG'),
(32, 'KOORDINATOR TEHNISI'),
(33, 'PELAKSANA CUSTOMER SERVICE'),
(34, 'PELAKSANA RADIOGRAFER'),
(35, 'KOORDINATOR MARKETING'),
(36, 'PELAKSANA KURIR / FILLING'),
(37, 'KA.KOMITE KEPERAWATAN DAN KEBIDANNA'),
(38, 'PELAKSANA HOUSEKEEPING'),
(39, 'KOORDINATOR CASEMIX'),
(40, 'PELAKSANA KASIR'),
(41, 'BAGIAN MOBILISASI DANA DAN PIUTANG'),
(42, 'KOORDINATOR PIUTANG/PERBANTUAN KEBAG. KEUAN'),
(43, 'PELAKSANA FISIOTERAPI'),
(44, 'KA. SIE. KEPERAWATAN DAN KEBIDANAN'),
(45, 'PELAKSANA PERAWAT ANASTESI'),
(46, 'KERJASAMA BISNIS'),
(47, 'AHLI GIZI'),
(48, 'KA.INST RAWAT INAP'),
(49, 'KOORDINATOR ADMIN DAN LAUNDRY'),
(50, 'PELAKSANA PORTIR'),
(51, 'KOORDINATOR KEBERSIHAN DAN PERTAMANAN'),
(52, 'SUB. BAG. MOBILISASI DANA'),
(53, 'PELAKSANA  STERILISATOR'),
(54, 'PELAKSANA OB'),
(55, 'DIREKTUR RSPM'),
(56, 'KOORDINATOR LAUNDRY DAN ADMINISTRASI LINEN'),
(57, 'PELAKSANA PERAWAT IPCN'),
(58, 'SUPERVISOR KEPERAWATAN'),
(59, 'KA. KOMITE PMKP'),
(60, 'KA.INSTALASI ICU'),
(61, 'APOTEKER  SATELIT'),
(62, 'PELAKSANA MEDIS'),
(63, 'KOMITE PPI & KABID. MEDIS'),
(64, 'DIREKTUR PT. PPU / WADIR KEUANGAN'),
(65, 'KA.INSTALASI HEMODIALISA'),
(66, 'DR.SPESIALIS'),
(67, 'KA. KOMITE MEDIK &KA. INSTALASI IBS'),
(68, 'PELAKSANA'),
(69, 'KA. INSTALASI FARMASI'),
(70, 'KA.HUMASDAN SIM RS'),
(71, 'KA. KOMITE ETIK DAN HUKUM'),
(72, 'KASIE PENUNJANG MEDIS'),
(73, 'KOORDINATOR TEKNISI MEDIS'),
(74, 'KOORDINATOR FARMASI RAWAT JALAN'),
(75, 'PELKSANA TTK'),
(76, 'FISIKAWAN MEDIS'),
(77, 'APOTEKER'),
(78, 'BIDANG ADMINITRASI DAN KEPEGAWAIAN'),
(79, 'KOORDINATOR BAGIAN UMUM'),
(80, 'PELAKASANA REKAM MEDIS'),
(81, 'KEPALA SEKSI PELAYANAN MEDIS'),
(82, 'DOKTER SPESIALIS ANAK'),
(83, 'KA. INS RAWAT JALAN'),
(84, 'PELAKSANA RM'),
(85, 'PELAKSANA APOTEKER'),
(86, 'DOKTER UMUM'),
(87, 'DR. SP.PK / KA.INS LABORAT'),
(88, 'PELAKSANA RADIOLOGI'),
(89, 'KOORDINATOR PAJAK & TARIF'),
(90, 'KOOR. ADMINISTRASI KEPEGAWAIAN'),
(91, 'PELAKSANA IT'),
(92, 'KOORDINATOR PIUTANG/PERBANTUAN KEBAG. KEUAN'),
(93, 'KA. BAGIAN HUMAS DAN MARKETING DAN SIM RS');

-- --------------------------------------------------------

--
-- Table structure for table `master_unit`
--

CREATE TABLE `master_unit` (
  `id` int(11) NOT NULL,
  `unit_kerja` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `master_unit`
--

INSERT INTO `master_unit` (`id`, `unit_kerja`) VALUES
(1, 'CASEMIX'),
(2, 'IBS'),
(3, 'POLIKLINIK'),
(4, 'IT'),
(5, 'LABORATORIUM'),
(6, 'ARIMBI'),
(7, 'DEWI KUNTHI'),
(8, 'RAMA SHINTA'),
(9, 'SECURITY'),
(10, 'IPSRS'),
(11, 'IKB'),
(12, 'ICU'),
(13, 'IPRS'),
(14, 'FARMASI'),
(15, 'GIZI'),
(16, 'LAUNDRY'),
(17, 'DRIVER'),
(18, 'HUMAS'),
(19, 'BAGIAN UMUM'),
(20, 'HEMODIALISA'),
(21, 'KEPERAWATAN'),
(22, 'GARDENER'),
(23, 'PERISTI'),
(24, 'RADIOLOGI'),
(25, 'PENDAFTARAN'),
(26, 'SEKRETARIAT'),
(27, 'KASIR'),
(28, 'CSSU'),
(29, 'REKAM MEDIS'),
(30, 'KOMITE KEPERAWATAN'),
(31, 'HOUSEKEEPING'),
(32, 'KEUANGAN'),
(33, 'IGD'),
(34, 'FISIOTERAPI'),
(35, 'PELAYANAN MEDIS'),
(36, 'OB'),
(37, 'DIREKSI'),
(38, 'BIDANG UMUM'),
(39, 'IPCN'),
(40, 'KOMITE PMKP'),
(41, 'HRD'),
(42, 'KOMITE PPI'),
(43, 'TEKNISI MEDIS'),
(44, 'FISIKAWAN MEDIS'),
(45, 'BIDANG PENUNJANG- RM'),
(46, 'BIDANG PELAYAN MEDIS'),
(47, 'IBS ANASTESI'),
(48, 'INFORMASI'),
(49, 'MEDIS'),
(50, 'BIDANG KOMITE PMKP'),
(51, 'PENUNJANG MEDIS');

-- --------------------------------------------------------

--
-- Table structure for table `pegawai`
--

CREATE TABLE `pegawai` (
  `id` int(11) NOT NULL,
  `nopeg` varchar(100) NOT NULL,
  `nama` varchar(100) NOT NULL,
  `nik` varchar(20) NOT NULL,
  `gender` varchar(15) NOT NULL,
  `tmpt_lahir` varchar(100) NOT NULL,
  `tgl_lahir` date NOT NULL,
  `umur` varchar(11) NOT NULL,
  `jabatan` varchar(100) NOT NULL,
  `unit` varchar(100) NOT NULL,
  `tmt` int(11) NOT NULL,
  `skpt` int(11) NOT NULL,
  `masa` varchar(100) NOT NULL,
  `ijazah` varchar(50) NOT NULL,
  `alamat` varchar(1000) NOT NULL,
  `email` varchar(100) NOT NULL,
  `telpon` varchar(20) NOT NULL,
  `status_kawin` varchar(100) NOT NULL,
  `status_pegawai` varchar(20) NOT NULL,
  `username` varchar(100) NOT NULL,
  `password` varchar(100) NOT NULL,
  `foto` varchar(1000) NOT NULL,
  `admin` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `pegawai`
--

INSERT INTO `pegawai` (`id`, `nopeg`, `nama`, `nik`, `gender`, `tmpt_lahir`, `tgl_lahir`, `umur`, `jabatan`, `unit`, `tmt`, `skpt`, `masa`, `ijazah`, `alamat`, `email`, `telpon`, `status_kawin`, `status_pegawai`, `username`, `password`, `foto`, `admin`) VALUES
(140, '123', 'Super Admin App', '132123123', 'Laki-laki', 'RSPM', '2024-06-05', '0', 'PELAKSANA', 'IT', 20240606, 20240605, '0 Th 0 bln', 'DIII', 'RSPM', 'rspm_admin@gmail.com', '0123123123132', 'Belum Kawin', 'RESIGN', 'admin', '21232f297a57a5a743894a0e4a801fc3', 'man.png', 1),
(5555, '0010749', 'DR. UTOMO DS, SP OG', '', 'Laki-laki', 'Purwokerto', '1950-08-05', '73 Th 10 bl', 'DIREKTUR PT. PPU / WADIR KEUANGAN', 'DIREKSI', 2007, 2007, '17 Th ', '', 'Jl. Hayam Wuruk No. 24 Palembahan Rt 001 Rw 006 Kalongan Purwodadi Grobogan', '', '', '', 'KONTRAK', '0010749', 'fd6b52a91b36a1e6c3d8cf643a6abb5a', 'man.png', 0),
(5556, '0020770', 'DR. ARLIS HASYIM M, SP. OG', '', 'Laki-laki', 'Magelang', '1972-04-07', '52 Th 2 bln', 'DR.SPESIALIS', 'PELAYANAN MEDIS', 2007, 2007, '17 Th ', '', 'Jl. Bukit Barisan Blok B I/2 Rt 015 Rw 008 Bringin Ngaliyan Semarang', '', '', '', 'KONTRAK', '0020770', 'd620e9a205ff35232d6704d7a7853e7e', 'man.png', 0),
(5557, '0040779', 'DEDY SETIAWAN', '', 'Laki-laki', 'Banyumas', '1979-01-13', '45 Th 4 bln', 'KEPALA INSTALASI IT&SIM RS', 'IT', 2007, 2007, '17 Th ', '', ' Dusun Karang Tengah Rt 001 Rw 005 Penaruhan Weleri Kendal ', '', '', '', 'TETAP', '0040779', '301ea2f7ef0196061b417f9709f93a25', 'man.png', 1),
(5558, '0060771', 'NUR PRASETYO', '', 'Laki-laki', 'Semarang', '1971-07-10', '52 Th 11 bl', 'KOORDINATOR  IPSRS', 'IPSRS', 2007, 2007, '17 Th ', '', ' Jl. Potrosari Tangah No. 6 Rt 001 Rw 007 Srondol Kulon Banyumanik ', '', '', '', 'TETAP', '0060771', '305dd7e2eee0adcdb3b63c19edb26466', 'man.png', 0),
(5559, '0070777', 'KARYATI', '', 'Perempuan', 'Cilacap', '1977-06-19', '46 Th 11 bl', 'PELAKSANA CASEMIX', 'CASEMIX', 2007, 2007, '17 Th ', '', 'Jl. Jangli No. 201 A Jatingaleh Candisari Smg', '', '', 'kawin', 'TETAP', '0070777', '98e4e55803381ee5a3916873d2f75a6f', 'woman.png', 0),
(5560, '0090778', 'DAKIRIN', '', 'Laki-laki', 'Demak', '1978-05-14', '46 Th 0 bln', 'PELAKSANA PERAWAT', 'IBS', 2007, 2007, '17 Th ', '', 'Jl. Wahyu Asri Utara III No. Ngaliyan Semarang', '', '', '', 'TETAP', '0090778', 'd8fb6609509ce5fbb456f5dd08375a62', 'man.png', 0),
(5561, '0100780', 'HENY TRI PAMULARSIH', '', 'Perempuan', 'Grobogan', '1980-02-21', '44 Th 3 bln', 'PELAKSANA PERAWAT', 'POLIKLINIK', 2007, 2007, '17 Th ', '', ' BSB Village Aurora Boulevard 31 No 3 Rt 001 Rw 005 Bubakan Mijen Semarang ', '', '', '', 'TETAP', '0100780', '6bf50155b31105270bba91ef244ed24e', 'woman.png', 0),
(5562, '0180784', 'WIDI PARAMITA AYUNINGTIYAS', '', 'Perempuan', ' Grobogan ', '1984-07-11', '39 Th 10 bl', 'PELAKSANA PERAWAT', 'POLIKLINIK', 2007, 2007, '17 Th ', '', 'Jl. Karonsih Timur V No. 307 Rt. 11 / 05 Ngalian Semarang', '', '', '', 'TETAP', '0180784', '49240982ec283db74c20b79e83788028', 'woman.png', 0),
(5563, '0210784', 'DIANA SARI', '', 'Perempuan', 'Brebes', '1984-03-14', '40 Th 2 bln', 'PELAKSANA PERAWAT', 'POLIKLINIK', 2007, 2007, '17 Th ', '', 'Wonosari Rt. 001 / 010 Wonosari Ngaliyan  Smg', '', '', '', 'TETAP', '0210784', '1ed4bc64af88addb27eae513d49e9390', 'woman.png', 0),
(5564, '0380784', 'KAMDIYAH', '', 'Perempuan', ' Jepara ', '1984-04-07', '40 Th 2 bln', 'PELAKSANA PERAWAT', 'ARIMBI', 2007, 2007, '17 Th ', '', ' Jl. Puspowarno VIII/18 Salamanmloyo Semarang ', '', '', '', 'TETAP', '0380784', 'ac3e595a366b3dc813138d60e7fbe389', 'woman.png', 0),
(5565, '0430784', 'ARRI IKA NURYANTO', '', 'Laki-laki', 'Jepara', '1984-11-14', '39 Th 6 bln', 'PELAKSANA PERAWAT', 'IBS', 2007, 2007, '17 Th ', '', 'Jl. Wisma Sari Selatan No. 24 Rt. 03 / 01 Ngalian Semarang', '', '', '', 'TETAP', '0430784', 'fd7523197d02d52aa0fc2d37daebcfd5', 'man.png', 0),
(5566, '0480782', 'WULIANA SARI', '', 'Perempuan', 'Semarang', '1984-12-27', '39 Th 5 bln', 'PELAKSANA PERAWAT', 'DEWI KUNTHI', 2007, 2007, '17 Th ', '', 'Jl. Sendang Indah B.60 Rt. 02 / 04 Muktiharjo Lor Genuk Smg', '', '', '', 'TETAP', '0480782', 'c75071fa68f87ef5f4e6cbd1ce2d2abe', 'woman.png', 0),
(5567, '0510783', 'LUCKY DARMAYANTI', '', 'Perempuan', 'Semarang', '1983-11-09', '40 Th 7 bln', 'PELAKSANA PERAWAT', 'RAMA SHINTA', 2007, 2007, '17 Th ', '', 'Gemah Raya Rt. 06 / 06 Pedurungan Semarang 50191', '', '', '', 'TETAP', '0510783', '36011c705e6c023d65b4a840169bdca0', 'woman.png', 0),
(5568, '0580785', 'HARIYANTI', '', 'Perempuan', 'Semarang', '1985-03-10', '39 Th 3 bln', 'PELAKSANA ASPER', 'IBS', 2007, 2007, '17 Th ', '', 'Jl. Cempaka Sari Timur No. 15  Rt.03 /01 Sekaran Gn.pati Smg', '', '', '', 'TETAP', '0580785', '690d6a5775d37e5970ab224082c497d0', 'woman.png', 0),
(5569, '0590786', 'DIAN PANCAWATI', '', 'Perempuan', 'Grobogan', '1986-01-11', '38 Th 4 bln', 'PELAKSANA ASPER', 'IKB', 2007, 2007, '17 Th ', '', 'Sambak Rt. 005 / 005 Ds. Danyang Purwodadi Grob', '', '', '', 'TETAP', '0590786', '9806d4201a875734e3925a27b0a0b1eb', 'woman.png', 0),
(5570, '0600786', 'DATI SELOWARNI', '', 'Perempuan', 'Purbalingga', '1986-01-22', '38 Th 4 bln', 'PELAKSANA ASPER', 'ICU', 2007, 2007, '17 Th ', '', 'Dsn Dotakan Rt. 05 / 03 Candiroto Temanggung', '', '', '', 'TETAP', '0600786', '141f3cc9c84c6b15101b15b99bfa183f', 'woman.png', 0),
(5571, '0610785', 'SITI CHANIFAH', '', 'Perempuan', 'Jepara', '1986-09-08', '37 Th 9 bln', 'PELAKSANA ASPER', 'POLIKLINIK', 2007, 2007, '17 Th ', '', 'Jl. Welahan Gotri  Rt. 11 / 02 Bakalan Kalinyamatan Jepara', '', '', '', 'TETAP', '0610785', '2f01df4587ade02e3bf0b7a73dbf1674', 'woman.png', 0),
(5572, '0630784', 'ABNITA PUSPA SARI', '', 'Perempuan', 'Semarang', '1984-04-14', '40 Th 1 bln', 'KEPALA RUANG', 'LABORATORIUM', 2007, 2007, '17 Th ', '', 'Jl. Pisang II / 11 Rt. 005 / 003 Lamper Tengah Smg ', '', '', '', 'TETAP', '0630784', '8201f6ca26611fee8dbe166a97f208ba', 'woman.png', 0),
(5573, '0660784', 'NURUL HIDAYANTI', '', 'Perempuan', 'Semarang', '1984-09-22', '39 Th 8 bln', 'PELAKSANA ANALIS', 'LABORATORIUM', 2007, 2007, '17 Th ', '', 'Tugurejo Rt. 008 / 001 Kel. Tugurejo Kec. Tugu Smg 50151', '', '', '', 'TETAP', '0660784', '10475e66873a85602ffb3a471f63b4e2', 'woman.png', 0),
(5574, '0690787', 'PAVIEKA DYSA RESMIATOVI', '', 'Perempuan', 'Semarang', '1987-12-17', '36 Th 5 bln', 'PELAKSANA TTK', 'FARMASI', 2007, 2007, '17 Th ', '', 'Pondok Raden Patah Blok B 2 / 26  Sriwulan Sayung Demak', '', '', '', 'TETAP', '0690787', 'd9d4a5019f09ae4d9dfe63f6266a739f', 'woman.png', 0),
(5575, '0730784', 'DWI PARYANTI', '', 'Perempuan', 'Semarang', '1984-10-30', '39 Th 7 bln', 'PELAKSANA PERAWAT', 'ARIMBI', 2007, 2007, '17 Th ', '', 'Pengilon III Beringin Rt. 003 / 002 Beringin Ngaliyan Semarang ', '', '', '', 'TETAP', '0730784', '76b827d90b47c6656dfdae68240ba73c', 'woman.png', 0),
(5576, '0740781', 'SUMINEM', '', 'Perempuan', 'Grobogan', '1981-10-02', '42 Th 8 bln', 'PELAKSANA LOGISTIK GIZI', 'GIZI', 2007, 2007, '17 Th ', '', 'Ds. Gedangan Rt.08/ Rw. 06 Boja Kendal', '', '', '', 'TETAP', '0740781', 'd32a059fe8562e7cf5e5a5d95b5eabdb', 'woman.png', 0),
(5577, '0770783', 'PRATIWI ITA YULIASTANTI*', '', 'Perempuan', 'Semarang', '1983-09-26', '40 Th 8 bln', 'PELAKSANA PERAWAT GIGI', 'POLIKLINIK', 2007, 2007, '17 Th ', '', 'Jl. Wahyu Asri VIII / A. 14 Rt. 004 / VI Tambakaji  Ngaliyan Smg', '', '', '', 'TETAP', '0770783', 'a3a9cea1d102220b77267bd6461652a7', 'woman.png', 0),
(5578, '0790771', 'HARYADI', '', 'Laki-laki', 'Kudus', '1971-08-09', '52 Th 10 bl', 'PELAKSANA SEKURITY', 'SECURITY', 2007, 2007, '17 Th ', '', 'Pengilon II Rt. 003 / 002 Beringin Ngaliyan Smg', '', '', '', 'TETAP', '0790771', '8dd85c9977efe497300775fb7370f849', 'man.png', 0),
(5579, '0800778', 'ALI SUPRIYATNO', '', 'Laki-laki', 'semarang', '1978-10-19', '45 Th 7 bln', 'PELAKSANA SEKURITY', 'SECURITY', 2007, 2007, '17 Th ', '', 'Kp. Kedungpane Rt. 006 / 010 Ngaliyan Smg', '', '', '', 'TETAP', '0800778', '861876ef898690ae33e3d33d9bec01c9', 'man.png', 0),
(5580, '0820767', 'MASCHUT', '', 'Laki-laki', 'Grobogan', '1967-04-14', '57 Th 1 bln', 'PELAKSANA SEKURITY', 'SECURITY', 2007, 2007, '17 Th ', '', 'Jl. Purwoyoso II/17 Rt. 002 / 012 Purwoyoso Ngaliyan Smg', '', '', '', 'TETAP', '0820767', '84e1513059e0468d9301610aa8af94cb', 'man.png', 0),
(5581, '0830775', 'EKO SUTRISNO', '', 'Laki-laki', 'Semarang', '1975-12-27', '48 Th 5 bln', 'PELAKSANA SEKURITY', 'SECURITY', 2007, 2007, '17 Th ', '', 'Jl. Honggowongso No. 16 Rt. 02 / 09 Purwoyoso Ngaliyan Smg', '', '', '', 'KONTRAK', '0830775', '6cf143dfaf4ccf508dcf1b611670fa76', 'man.png', 0),
(5582, '0840777', 'YATIN', '', 'Laki-laki', 'Grobogan', '1977-11-24', '46 Th 6 bln', 'PELAKSANA SEKURITY', 'SECURITY', 2007, 2007, '17 Th ', '', 'Pulutan Rt. 003 / 003 Penawangan Grobogan', '', '', '', 'TETAP', '0840777', '5d125d87a5fa87e7d6d40edb7c0ec537', 'man.png', 0),
(5583, '0860770', 'MUHAMAD BAHRUM', '', 'Laki-laki', 'Kendal', '1970-10-14', '53 Th 7 bln', 'WAKIL KOORDINATOR', 'SECURITY', 2007, 2007, '17 Th ', '', 'Kliwonan Rt. 06 / VII Tambakaji Ngaliyan Semarang', '', '', '', 'TETAP', '0860770', '881039faaefacfe2b1a99083fb6ee7b4', 'man.png', 0),
(5584, '0880769', 'AGUNG', '', 'Laki-laki', 'Gresik', '1969-03-15', '55 Th 2 bln', 'WAKIL KOORDINATOR', 'SECURITY', 2007, 2007, '17 Th ', '', 'Pengilon II  / 12 Rt. 02 / 02 Beringin Ngaliyan Smg', '', '', '', 'TETAP', '0880769', 'bc1d3ce217395485af9b96109f503752', 'man.png', 0),
(5585, '0900777', 'JOKO PRIANDONO NURWAHYUDI', '', 'Laki-laki', 'Purwokerto', '1977-05-14', '47 Th 0 bln', 'PELAKSANA TEKNISI', 'IPSRS', 2007, 2007, '17 Th ', '', 'Bringin Lestari Blok C Jl. B. Beringin Brt III No. 73 Ngaliyan Smg', '', '', '', 'TETAP', '0900777', '66ec533f33974e692295ef3061090dcc', 'man.png', 0),
(5586, '0920779', 'RURY MAHARDHIKA GINUNG P.', '', 'Perempuan', 'Semarang', '1979-12-17', '44 Th 5 bln', 'PELAKSANA LAUNDRY', 'LAUNDRY', 2007, 2007, '17 Th ', '', 'Jl. Wahyu Asri VII E 97 RT. 03 / 06 Tambakaji Ngalian Semarang', '', '', '', 'TETAP', '0920779', 'cfa580c2589100736d3af35c36fec246', 'woman.png', 0),
(5587, '1030777', 'LOKASTHITI, Amd', '', 'Perempuan', 'Cilacap', '1977-05-14', '47 Th 0 bln', 'PELAKSANA TTK', 'FARMASI', 2007, 2007, '17 Th ', '', 'Jl. Slamet No. 340 Rt. 03 / 03 Sidanegara Cilacap ', '', '', '', 'TETAP', '1030777', '64a0603fd2ced166af79fa854622348c', 'woman.png', 0),
(5588, '1100779', 'NURYANTO ADI WIBOWO', '', 'Laki-laki', 'Semarang', '1979-02-21', '45 Th 3 bln', 'PELAKSANA DRIVER', 'DRIVER', 2007, 2007, '17 Th ', '', 'Duwet Ngalian Rt. 005 Rw. 010 Ngaliyan Semarang', '', '', '', 'TETAP', '1100779', '403ae58b5fdd512be39c07da9824e9d4', 'man.png', 0),
(5589, '1110779', 'ATIK MARIYANI', '', 'Perempuan', 'semarang', '1979-09-06', '44 Th 9 bln', 'PELAKSANA LAUNDRY', 'LAUNDRY', 2007, 2007, '17 Th ', '', 'Jl. Pengilon II No. 10 Rt. 002 Rw. 002 Bringin Ngalian Smg', '', '', '', 'TETAP', '1110779', 'b488f89999a8cf91ace365677816463b', 'woman.png', 0),
(5590, '1120769', 'HARTINI', '', 'Perempuan', 'Sukoharjo', '1969-06-12', '54 Th 11 bl', 'PELAKSANA ASISTEN KOKI', 'GIZI', 2007, 2007, '17 Th ', '', 'Jl. Wismasari Selatan No. 24 Rt. 003 RW. 001 Kel. Ngaliyan Smg', '', '', '', 'TETAP', '1120769', 'b2057eff235fa7a9ccd02478892d0fa9', 'woman.png', 0),
(5591, '1130780', 'UMI RUSWATI', '', 'Perempuan', 'Semarang', '1980-10-01', '43 Th 8 bln', 'PELAKSANA ASISTEN KOKI', 'GIZI', 2007, 2007, '17 Th ', '', 'Persilan Rt. 001 Rw. 001 No. 03 Ngalian Semarang', '', '', '', 'TETAP', '1130780', '76a9bbc7efe5c6c8ac1e3db8ce5e8df1', 'woman.png', 0),
(5592, '1140773', 'JURIYAH', '', 'Perempuan', 'Kendal', '1973-11-02', '50 Th 7 bln', 'PELAKSANA PENYAJI', 'GIZI', 2007, 2007, '17 Th ', '', 'Jl. Pengilon II No. 23 Rt. 04 Rw. 02 Kel. BeringinNgaliyan Smg', '', '', '', 'TETAP', '1140773', 'b6b4c5cc568df6a7e6ca4d07c38fce37', 'woman.png', 0),
(5593, '1160781', 'FITRIYONO', '', 'Laki-laki', 'semarang', '1981-03-16', '43 Th 2 bln', 'PELAKSANA LAUNDRY', 'LAUNDRY', 2007, 2007, '17 Th ', '', 'Taman Condrokusumo VIII Rt. 006 / 004 Kel. Bonsari Smg Brt', '', '', '', 'TETAP', '1160781', 'e6c5428aa1626a073c83f26499dff821', 'man.png', 0),
(5594, '1210783', 'SUMIATI', '', 'Perempuan', 'Semarang', '1983-04-18', '41 Th 1 bln', 'PELAKSANA PENYAJI', 'GIZI', 2007, 2007, '17 Th ', '', 'Pengilon V No. 11 Rt. 003 / 002 Kel. Beringin Ngalian Smg', '', '', '', 'TETAP', '1210783', 'e303edabc5e202e3cba745c1e4bec897', 'woman.png', 0),
(5595, '1220787', 'KUTI INDRAWATI', '', 'Perempuan', 'Sukoharjo', '1987-05-04', '37 Th 1 bln', 'PELAKSANA PENYAJI', 'GIZI', 2007, 2007, '17 Th ', '', 'Dk Persilan No. 30 Rt. 001 / 001 Kel. Ngaliyan Smg', '', '', '', 'TETAP', '1220787', '4a21cb93abd436ee8a59fb641ff4caaf', 'woman.png', 0),
(5596, '1240778', 'SRIWATI', '', 'Perempuan', 'Semarang', '1978-03-30', '46 Th 2 bln', 'PELAKSANA PENYAJI', 'GIZI', 2007, 2007, '17 Th ', '', 'Kedungpane Rt. 003 / 010 Kel. Ngalian Smg', '', '', '', 'TETAP', '1240778', '653739950daf026ad1d7fd1160c8c4b1', 'woman.png', 0),
(5597, '1250780', 'NGATEMAH', '', 'Perempuan', 'Semarang', '1980-04-14', '44 Th 1 bln', 'PELAKSANA ASISTEN KOKI', 'GIZI', 2007, 2007, '17 Th ', '', 'Ngadirgo Rt. 001 / 003 Kel. Ngadirgo Kec. Mijen Semarang', '', '', '', 'TETAP', '1250780', '4ab9571f1b7062ba5167c8abdced3ad0', 'woman.png', 0),
(5598, '1260772', 'SRI WAHYUNI/gizi', '', 'Perempuan', 'Cilacap', '1972-07-13', '51 Th 10 bl', 'PELAKSANA ASISTEN KOKI', 'GIZI', 2007, 2007, '17 Th ', '', 'Puri Arga Golf C-1 No. 7 BSb Semarang', '', '', '', 'TETAP', '1260772', '5783d30f24525f024884a6fa66fe0ed5', 'woman.png', 0),
(5599, '1300788', 'MA\'RIFAH BUDI KHASANAH', '', 'Perempuan', 'Batang', '1988-06-12', '35 Th 11 bl', 'PELAKSANA ASPER', 'RAMA SHINTA', 2007, 2007, '17 Th ', '', 'Wirosari III Blok A1 No. 11 RT. 02/09 Sambong Batang', '', '', '', 'TETAP', '1300788', '6f64dacc72cf1d705f1913333b3f1536', 'woman.png', 0),
(5600, '1320788', 'NURA LUTFIANA', '', 'Perempuan', 'Kab Semarang', '1988-02-17', '36 Th 3 bln', 'PELAKSANA ASPER', 'POLIKLINIK', 2007, 2007, '17 Th ', '', 'Tempel Rt 006 Rw 004 Jatisari mijen Semarang', '', '', '', 'TETAP', '1320788', '8a5b9895cec62b6475697ea49d016ebb', 'woman.png', 0),
(5601, '1350789', 'WENNY PARAMITA MAHMUD', '', 'Perempuan', 'Gresik', '1988-11-29', '35 Th 6 bln', 'PELAKSANA ASPER', 'DEWI KUNTHI', 2007, 2007, '17 Th ', '', 'P. Pondok Raden Patah Thp II Blok H.9 Rt. 05 / 06 Sayung Dmk', '', '', '', 'TETAP', '1350789', '3024bb91689890a900a51e28c0d3172d', 'woman.png', 0),
(5602, '1370785', 'BENY MACHFURI', '', 'Laki-laki', 'semarang', '1985-03-05', '39 Th 3 bln', 'PELAKSANA SEKURITY', 'SECURITY', 2007, 2007, '17 Th ', '', 'Jl. Purwoyoso V B Rt. 004 / 12 Kel. Purwoyoso Smg', '', '', '', 'TETAP', '1370785', '3ca5c2e513042640b1d135e95683ade6', 'man.png', 0),
(5603, '1380774', 'TAUFIK ARIFIANTO', '', 'Laki-laki', 'Purwokerto', '1974-05-24', '50 Th 0 bln', 'PELAKSANA TEHNISI', 'IPSRS', 2007, 2007, '17 Th ', '', 'Gg Cempaka I No. 13 Rt. 01 / XIII Purwodadi Grob', '', '', '', 'TETAP', '1380774', '68babce64ab9bca892fcbbf3027ba4b3', 'man.png', 0),
(5604, '1400784', 'TEGUH IMAN LAKSONO', '', 'Laki-laki', 'Semarang', '1969-03-28', '55 Th 2 bln', 'PELAKSANA TEHNISI', 'IPSRS', 2007, 2007, '17 Th ', '', 'Jangli Krajan Rt. 007 / 003 Jatingaleh Candisari Smg', '', '', '', 'TETAP', '1400784', 'c0e274553ff217cbc9b2532b0be8e4ac', 'man.png', 0),
(5605, '1480779', 'ENTRY KURNIA WIDYASTUTI', '', 'Perempuan', 'Yogyakarta', '1979-09-15', '44 Th 8 bln', 'PELAKSANA OPERATOR', 'INFORMASI', 2007, 2007, '17 Th ', '', 'Jl. Berdikari Raya I / 7 Rt. 05 / 07 Srondol Kulon Banyumanik Smg', '', '', '', 'TETAP', '1480779', 'f918681431d9522d8d362c121186cf15', 'woman.png', 0),
(5606, '1540768', 'SUPRASETYO', '', 'Laki-laki', 'Semarang', '1968-07-18', '55 Th 10 bl', 'PELAKSANA ADMINISTRASI', 'FARMASI', 2007, 2007, '17 Th ', '', 'Jl. Jatisari III Rt. 02 / 04 Jatingaleh Candisari Semarang', '', '', '', 'TETAP', '1540768', '080a207376bece1a2d723e14b6ef6548', 'man.png', 0),
(5607, '1660787', 'HINDRI SAYUTI', '', 'Perempuan', 'Wonogiri', '1987-03-27', '37 Th 2 bln', 'PELAKSANA ASPER', 'IBS', 2007, 2007, '17 Th ', '', 'Kebondalem Rt. 01 / 03 Brangsong Kendal 51371', '', '', '', 'TETAP', '1660787', 'b4ce90a36dcd607a9fdbdfce3dd7cfed', 'woman.png', 0),
(5608, '1750881', 'HERI SUSANTO', '', 'Laki-laki', 'Kudus', '1981-06-13', '42 Th 11 bl', 'PELAKSANA TEHNISI', 'IPSRS', 2008, 2008, '16 Th ', '', 'Jl. Boom Lama Rt. 04 / 03 No. 99 Kuningan Semarang Utara', '', '', '', 'TETAP', '1750881', '3a1d323feea700ecbcac9a13da86a3b8', 'man.png', 0),
(5609, '1780873', 'SUDARSONO', '', 'Laki-laki', 'Grobogan', '1973-12-10', '50 Th 6 bln', 'PELAKSANA DRIVER', 'DRIVER', 2008, 2008, '16 Th ', '', 'Rejosari Rt. 02 / 01 Tampingan Boja', '', '', '', 'TETAP', '1780873', 'a5952acb441aead13ce2b95985779443', 'man.png', 0),
(5610, '1790885', 'TRI WAHYUDI', '', 'Laki-laki', 'Kendal', '1985-12-26', '38 Th 5 bln', 'PELAKSANA ADMINISTRASI INVENTARIS MEDIS', 'BAGIAN UMUM', 2008, 2008, '16 Th ', '', 'Purwogondo Rt. 02/ 06 Boja Kendal', '', '', '', 'TETAP', '1790885', 'bf9435fe06b576da5b59af4cbc734e92', 'man.png', 0),
(5611, '1830884', 'HERKI DAMAYANTI', '', 'Perempuan', 'Tegal', '1984-01-25', '40 Th 4 bln', 'KEPALA RUANG', 'HEMODIALISA', 2008, 2008, '16 Th ', '', 'Kedungpani Rt. 01 / 02 Mijen Semarang 50211', '', '', '', 'TETAP', '1830884', '6493e5541c9b57e1950396d14006b186', 'woman.png', 0),
(5612, '1840886', 'ITA YULIANTI', '', 'Perempuan', 'Maros', '1986-07-24', '37 Th 10 bl', 'KEPALA RUANG', 'ICU', 2008, 2008, '16 Th ', '', 'Jl. Bukit Beringin Selatan F-27 B Rt.013 Rw.010 Gondoriyo Ngaliyan Smg', '', '', '', 'TETAP', '1840886', '4ab485112699074512bb21eee27a0754', 'woman.png', 0),
(5613, '1910882', 'UMI CHOYUMAH', '', 'Perempuan', 'Pati', '1982-07-25', '41 Th 10 bl', 'PELAKSANA PERAWAT', 'ICU', 2008, 2008, '16 Th ', '', 'Desa Dukuh Rt. 03 / 02 Kec. Tugu Semarang', '', '', '', 'TETAP', '1910882', '89f18f0e9ab9602a422222d640ca5066', 'woman.png', 0),
(5614, '1930885', 'HARRI KARTIKA CANDRA', '', 'Laki-laki', 'semarang', '1985-04-21', '39 Th 1 bln', 'ADMIN KEPERAWATAN', 'KEPERAWATAN', 2008, 2008, '16 Th ', '', 'Jl. Wahyu Asri Selatan II No. 1 Rt. 09 / 06 Tambakaji  Smg', '', '', '', 'TETAP', '1930885', '82e54d063e48d1eb5824e1a4c606dd12', 'man.png', 0),
(5615, '1940883', 'PUJI RAHAYU', '', 'Perempuan', 'Kendal', '1983-12-05', '40 Th 6 bln', 'PELAKSANA PERAWAT', 'DEWI KUNTHI', 2008, 2008, '16 Th ', '', 'Jl. Menur Rt. 05 / III KarangAyu Cepiring Kendal', '', '', '', 'TETAP', '1940883', '78b25890fda5d98574638a5ab006485a', 'woman.png', 0),
(5616, '1960882', 'INDRIA SULISTYANTO', '', 'Laki-laki', 'semarang', '1982-06-17', '41 Th 11 bl', 'PELAKSANA TEHNISI', 'IPSRS', 2008, 2008, '16 Th ', '', 'Jl. Plumbon II Rt. 03 / III Kel. Wonosari Ngaliyan Semarang', '', '', '', 'TETAP', '1960882', '82566032881802266ef4c3c65f47ac24', 'man.png', 0),
(5617, '1990874', 'DR. MAGY JULIA RACHMAWATI, Sp.PD', '', 'Perempuan', 'Semarang', '1975-12-07', '48 Th 6 bln', 'KA.INSTALASI HEMODIALISA', 'MEDIS', 2008, 2008, '16 Th ', '', 'Bukit Barisan Blok A4 No.2 Permata Puri Ngaliyan Semarang', '', '', '', 'KONTRAK', '1990874', '48b267ad5d0a92d8bb5560996c07d73a', 'woman.png', 0),
(5618, '2020883', 'SIWI HANDAYANI', '', 'Perempuan', 'Semarang', '1983-09-02', '40 Th 9 bln', 'PELAKSANA ANALIS', 'LABORATORIUM', 2008, 2008, '16 Th ', '', 'Jl. Sentiaki Tengah II No.8 Rt.006 Rw.007 Bulu Lor Smg Utara', '', '', '', 'TETAP', '2020883', '7b184cf0df03fe7d48dd5fb793fa5d92', 'woman.png', 0),
(5619, '2030882', 'WAHYUNI', '', 'Perempuan', 'Semarang', '1982-09-15', '41 Th 8 bln', 'PELAKSANA ANALIS', 'LABORATORIUM', 2008, 2008, '16 Th ', '', 'Ds. Penaruban Rt. 01 / 05 Weleri Kendal', '', '', '', 'TETAP', '2030882', '5474c1d46a6226817994c4679a5e334e', 'woman.png', 0),
(5620, '2090887', 'VERA LUTHFI DAMAYANTI', '', 'Perempuan', 'Semarang', '1987-05-12', '37 Th 0 bln', 'PELAKSANA TTK', 'FARMASI', 2008, 2008, '16 Th ', '', 'Jl. Karonsih Selatan X / 859 Rt. 007 / 006 Ngaliyan Smg', '', '', '', 'TETAP', '2090887', '6a410e113907b3f1950e0707943f9956', 'woman.png', 0),
(5621, '2120869', 'TEGUH IMAM SANTOSO', '', 'Laki-laki', 'Semarang', '1969-03-28', '55 Th 2 bln', 'PELAKSANA GARDENER', 'GARDENER', 2008, 2008, '16 Th ', '', 'Jangli Krajan Rt. 007 / 003 Jatingaleh Candisari Smg', '', '', '', 'TETAP', '2120869', 'bb77fde7627f8ab7f2b088eb681843b4', 'man.png', 0),
(5622, '2160882', 'DWI SAPARTIWI', '', 'Perempuan', 'Pati', '1982-12-09', '41 Th 6 bln', 'PELAKSANA PERAWAT', 'RAMA SHINTA', 2008, 2008, '16 Th ', '', 'Perum Ketileng Indah Blok M 174 Rt. 08/ 13 Sendang Mulyo Tembalang Smg', '', '', '', 'TETAP', '2160882', '998b9d5ef40383357f2527ce0da5a732', 'woman.png', 0),
(5623, '2220862', 'SRI HENDRANINGSIH', '', 'Perempuan', 'Semarang', '1962-05-05', '62 Th 1 bln', 'PELAKSANA ASISTEN KOKI', 'GIZI', 2008, 2008, '16 Th ', '', 'Bukit Beringin Asri Raya Rt. 003 / 005 Gondoriyo Ngaliyan Smg', '', '', '', 'TETAP', '2220862', 'b19f341c861066770600532f18b65eed', 'woman.png', 0),
(5624, '2270884', 'SITI ZUBAIDAH', '', 'Perempuan', 'Smg', '1984-07-20', '39 Th 10 bl', 'KEPALA RUANG', 'DEWI KUNTHI', 2008, 2008, '16 Th ', '', 'Petengan Utara No. 22 Rt. 04/08 Bintoro Demak', '', '', '', 'TETAP', '2270884', '0009ab9200bd887f46b98da1764b4e9a', 'woman.png', 0),
(5625, '2310884', 'YULI AGUSTINA', '', 'Perempuan', 'Semarang', '1984-08-17', '39 Th 9 bln', 'PELAKSANA BIDAN', 'IKB', 2008, 2008, '16 Th ', '', 'Jl. Kaligawe Kp. Tbk Mulyo Rt. 04 Rw. XV No. 11 T. Mas Smg', '', '', '', 'TETAP', '2310884', 'c214784e370968e87ac27a4ae255c25c', 'woman.png', 0),
(5626, '2350881', 'WAHYU GRIYANINGSIH', '', 'Perempuan', 'Blora', '1981-11-21', '42 Th 6 bln', 'PELAKSANA PERAWAT', 'PERISTI', 2008, 2008, '16 Th ', '', 'Jl. Gunung Lawu II / 62 A Tegalgunung Blora', '', '', '', 'TETAP', '2350881', '8fbfc94417a876eb9de66310950db134', 'woman.png', 0),
(5627, '2420889', 'NUR IRIYANTI', '', 'Perempuan', 'Grobogan', '1989-12-25', '34 Th 5 bln', 'PELAKSANA ASISTEN KOKI', 'GIZI', 2008, 2008, '16 Th ', '', 'Dsn Kr.asem Rt. 05/3 Kr.anyar Purwodadi - Grobogan', '', '', '', 'TETAP', '2420889', '5099ec4c9cfc1ceec6ac45957b840fec', 'woman.png', 0),
(5628, '2600982', 'LILIS SETYAWATI', '', 'Perempuan', 'Magelang', '1982-09-13', '41 Th 8 bln', 'KEPALA RUANG', 'RADIOLOGI', 2009, 2009, '15 Th ', '', 'Paten Jurang Rt. 04 / 16 Magelang', '', '', '', 'TETAP', '2600982', '3825d88b6a70cbc22405b46aa1c5d1e9', 'woman.png', 0),
(5629, '2650986', 'DEBORA SARASWATI PUJIHASTUTI, S.KM', '', 'Perempuan', 'semarang', '1986-02-04', '38 Th 4 bln', 'PELAKSANA PENDAFTARAN', 'PENDAFTARAN', 2009, 2009, '15 Th ', '', 'Ds. Jangkrikan Rt. 02 / 01 Rogomulyo Semarang', '', '', '', 'TETAP', '2650986', '6e8f0715546305f8ac25fc0dbf7534e3', 'woman.png', 0),
(5630, '2830981', 'SUNARTO', '', 'Laki-laki', 'Kendal', '1981-07-28', '42 Th 10 bl', 'PELAKSANA PERAWAT', 'HEMODIALISA', 2009, 2009, '15 Th ', '', 'Tratemulyo Rt. 04 / 03 Weleri Kendal', '', '', '', 'TETAP', '2830981', '86178172647d2336012d5b29b260255a', 'man.png', 0),
(5631, '2860982', 'KASMURI', '', 'Laki-laki', 'Blora', '1982-11-05', '41 Th 7 bln', 'PELAKSANA KOKI', 'GIZI', 2009, 2009, '15 Th ', '', 'Jl. Talang Barat II Rt. 03 / 04', '', '', '', 'TETAP', '2860982', 'f62f90077f47ec37618f1efcf3c7e798', 'man.png', 0),
(5632, '2900967', 'WAGIMIN', '', 'Laki-laki', 'Boyolali', '1967-02-16', '57 Th 3 bln', 'KOORDINATOR KOKI', 'GIZI', 2009, 2009, '15 Th ', '', 'Klimas Rt. 02 / 05 Sendang Karanggede Boyolali', '', '', '', 'TETAP', '2900967', '06f5ee437573a189c855f467865adade', 'man.png', 0),
(5633, '3030977', 'UPIT MURWANINGRUM', '', 'Perempuan', 'Semarang', '1977-10-24', '46 Th 7 bln', 'PELAKSANA TTK', 'FARMASI', 2009, 2009, '15 Th ', '', 'Jl. Srikaton Timur Rt. 5/5 Purwoyoso Ngaliyan Semarang', '', '', '', 'TETAP', '3030977', '8b29592b1056bc153ab466ed8547de89', 'woman.png', 0),
(5634, '3050980', 'CITRA PUSPA SARI DEWI', '', 'Perempuan', 'Pekalongan', '1980-11-24', '43 Th 6 bln', 'PELAKSANA PERAWAT', 'HEMODIALISA', 2009, 2009, '15 Th ', '', 'Jl. Mahesa Timur I No. 460 Pedurungan Tengah Smg', 'maulanafajar751@gmail.com', '08980022735', 'Belum Kawin', 'TETAP', '3050980', '0565a97f014ba4312a13579248b4d050', 'woman.png', 0),
(5635, '3081077', 'JUMADI', '', 'Laki-laki', 'Sragen', '1977-09-23', '46 Th 8 bln', 'PELAKSANA SEKURITY', 'SECURITY', 2010, 2010, '14 Th ', '', 'Jl. Puncak Sari Rt. 08 / 13 Tambak Aji Ngaliyan Smg', '', '', '', 'TETAP', '3081077', '383e539d1fb41c252a1b97e3472ec8dc', 'man.png', 0),
(5636, '3101089', 'EKA HENDRATMAKA', '', 'Laki-laki', 'Boyolali', '1989-07-03', '34 Th 11 bl', 'PELAKSANA SEKURITY', 'SECURITY', 2010, 2010, '14 Th ', '', 'Bukit Beringin Lestari B.259, Rt. 05 / 16 Wonosari Ngaliyan Smg', '', '', '', 'TETAP', '3101089', 'afc84da6926e75ade079069a2cb00d74', 'man.png', 0),
(5637, '3111074', 'TRIMO MARTONO', '', 'Laki-laki', 'Semarang', '1974-09-14', '49 Th 8 bln', 'PELAKSANA SEKURITY', 'SECURITY', 2010, 2010, '14 Th ', '', 'Jl. Papandayan No. 6 Kel. Bendan Ngisor Kec. Gajah Mungkur Smg', '', '', '', 'TETAP', '3111074', 'af2d93f6fc583adf4e0dde2ccf77ff7c', 'man.png', 0),
(5638, '3131083', 'BUDI SUSANTI,A.MD', '', 'Perempuan', 'Kendal', '1983-06-15', '40 Th 11 bl', 'SEKRETARIS', 'SEKRETARIAT', 2010, 2010, '14 Th ', '', 'Bukit Beringin ASRI Blok D - 41 Ngaliyan Smg', '', '', '', 'TETAP', '3131083', 'aee1be8c0d7e728fefce0b2b0fe21d8c', 'woman.png', 0),
(5639, '3141066', 'JASMANI', '', 'Laki-laki', 'semarang', '1966-10-22', '57 Th 7 bln', 'PELAKSANA TEHNISI', 'IPSRS', 2010, 2010, '14 Th ', '', 'Jl. Papandayan Rt. 03 /  08 Gajah Mungkur', '', '', '', 'TETAP', '3141066', 'b0cd563126016a6973367fde376d358b', 'man.png', 0),
(5640, '3161083', 'SITI ROKHMAWATI', '', 'Perempuan', 'Demak', '1983-09-02', '40 Th 9 bln', 'KOORDINATOR', 'KASIR', 2010, 2010, '14 Th ', '', 'Pucanggede timur 7 No. 10 Pucanggading Demak', '', '', '', 'TETAP', '3161083', '8374f6fe364eaa9af855c0cf5da47db7', 'woman.png', 0),
(5641, '3181087', 'CAHYONINGRUM', '', 'Perempuan', 'semarang', '1987-09-19', '36 Th 8 bln', 'PELAKSANA PERAWAT', 'PERISTI', 2010, 2010, '14 Th ', '', 'Ds. Kuripan Rt. 01 Rw. 01 Kel. Wonopolo Kec. Mijen Smg 50215', '', '', '', 'TETAP', '3181087', '09ffc56ed27550a769f4de3836b4e881', 'woman.png', 0),
(5642, '3241090', 'KURNIAWAN ZUHRI', '', 'Laki-laki', 'Semarang', '1990-02-22', '34 Th 3 bln', 'PELAKSANA PENYAJI', 'GIZI', 2010, 2010, '14 Th ', '', 'Jl. Jatibarang Rt.01/01 Kedungpane Mijen Smg', '', '', '', 'TETAP', '3241090', '1f34aa30a4a4836ad9e6eeb7e29222a8', 'man.png', 0),
(5643, '3321078', 'MINTARNO', '', 'Laki-laki', 'Semarang', '1978-06-04', '46 Th 0 bln', 'PELAKSANA HOUSEKEEPING', 'HOUSEKEEPING', 2010, 2010, '14 Th ', '', 'Jl. Wologito Barat XIII Rt.03/05 Kembangarum Smg', '', '', '', 'TETAP', '3321078', '90d801f8e88ea8173f7c4c747d55e21e', 'man.png', 0),
(5644, '3401082', 'SYAIFUL MUHAJIRIN', '', 'Laki-laki', 'Semarang', '1982-07-05', '41 Th 11 bl', 'PELAKSANA STERILISATOR', 'CSSU', 2010, 2010, '14 Th ', '', 'Jl. Pramuka Kauman Rt.01/05 Boja Kendal', '', '', '', 'TETAP', '3401082', '90a23824094be6bb107f9720396a5fb4', 'man.png', 0),
(5645, '3411083', 'TRI WIJIANTO', '', 'Laki-laki', 'Semarang', '1983-02-20', '41 Th 3 bln', 'PELAKSANA TEHNISI', 'IPSRS', 2010, 2010, '14 Th ', '', 'Jl. Pengilon V Rt.05/02 Bringin Ngaliyan', '', '', '', 'TETAP', '3411083', 'e2f104f35eba9eb7b7d50873601cdc7f', 'man.png', 0),
(5646, '3491088', 'S.UMI NURUL KHADLONAH', '', 'Perempuan', 'Kendal', '1988-09-12', '35 Th 8 bln', 'PELAKSANA PERAWAT', 'ARIMBI', 2010, 2010, '14 Th ', '', 'Kaligetas RT. 01 RW. 04 Purwosari Mijen Smg', '', '', '', 'TETAP', '3491088', 'a49213e7077d46d6a188a3ab3a7c9ec3', 'woman.png', 0),
(5647, '3521072', 'RINI HASTUTI', '', 'Perempuan', 'Semarang', '1972-08-09', '51 Th 10 bl', 'KOORDINATOR PIUTANG', 'KASIR', 2010, 2010, '14 Th ', '', 'Jl. Tmn Candi Tembaga No. 944 Smg', '', '', '', 'TETAP', '3521072', '37719927b4ae5f386bc361b46fa4de16', 'woman.png', 0),
(5648, '3571085', 'ISTIQOMAH/I', '', 'Perempuan', 'semarang', '1985-09-25', '38 Th 8 bln', 'PELAKSANA PERAWAT', 'PERISTI', 2010, 2010, '14 Th ', '', 'Jl. Candisari Tengah II Rt. 02 / IV  Bambankerep Ngaliyan', '', '', '', 'TETAP', '3571085', 'd33662612614256dce6828347d0fbd41', 'woman.png', 0),
(5649, '3661082', 'SRI SUPARTINI', '', 'Perempuan', 'Kendal', '1982-03-06', '42 Th 3 bln', 'PELAKSANA PERAWAT', 'PERISTI', 2010, 2010, '14 Th ', '', 'Ds. Trompo Rt. 11/03 Kendal 51317', '', '', '', 'TETAP', '3661082', '4e5cbecd161ef601c4478665ab4bd029', 'woman.png', 0),
(5650, '3941089', 'SUBIYANTO', '', 'Laki-laki', 'Semarang', '1987-09-07', '36 Th 9 bln', 'KOORDINATOR TEHNISI', 'IPSRS', 2010, 2010, '14 Th ', '', 'Jl. Anyar Duwet Bringin Rt. 03 / Rw. 04 Bringin Ngaliyan Smg', '', '', '', 'TETAP', '3941089', '1e8b07d54c2af4c58be524f570e0f1f7', 'man.png', 0),
(5651, '4021183', 'IDAYATU SOLIKIYAH', '', 'Perempuan', 'Pati', '1983-10-10', '40 Th 8 bln', 'PELAKSANA CUSTOMER SERVICE', 'HUMAS', 2011, 2011, '13 Th ', '', 'Persilan Rt. 01 / 01 Ngaliyan Smg', '', '', '', 'TETAP', '4021183', 'ed01c71ee5886a807762bc2387651aee', 'woman.png', 0),
(5652, '4161177', 'NURDJANAH', '', 'Perempuan', 'Klaten', '1977-12-08', '46 Th 6 bln', 'PELAKSANA PERAWAT', 'PERISTI', 2011, 2011, '13 Th ', '', 'Jl. Irigasi Krajan I Rt. 02 / Rw. 03 Mangkang Kulon Tugu Smg', '', '', '', 'TETAP', '4161177', '3b3689b8ad0a15c57897cc612accc763', 'woman.png', 0),
(5653, '4181182', 'YULI ARINI', '', 'Perempuan', 'Wonogiri', '1982-07-26', '41 Th 10 bl', 'PELAKSANA CASEMIX', 'REKAM MEDIS', 2011, 2011, '13 Th ', '', 'Jl. Wismasari No. 5B Ngaliyan Smg', '', '', '', 'TETAP', '4181182', 'e1f1bcbae8de98437be1491df4a09a48', 'woman.png', 0),
(5654, '4201183', 'EDY PURWANTO', '', 'Laki-laki', 'semarang', '1983-02-06', '41 Th 4 bln', 'PELAKSANA RADIOGRAFER', 'RADIOLOGI', 2011, 2011, '13 Th ', '', 'Kalialang Lama Rt. 03 Rw. 01 Sukorejo Gunung Pati Smg', '', '', '', 'TETAP', '4201183', '67ed7f42361223cc57e6a4ce5ec52921', 'man.png', 0),
(5655, '4211187', 'DENI HANDAYANI', '', 'Perempuan', 'Boyolali', '1987-08-09', '36 Th 10 bl', 'PELAKSANA ANALIS', 'LABORATORIUM', 2011, 2011, '13 Th ', '', 'Jl. Borobudur Timur 10 Rt. 05 Rw. IX Kembang Arum Smg', '', '', '', 'TETAP', '4211187', 'f5869fdad72c955ba2ac6fe697443dbb', 'woman.png', 0),
(5656, '4241181', 'SUTRISNO', '', 'Laki-laki', 'Semarang', '1981-04-18', '43 Th 1 bln', 'PELAKSANA PENDAFTARAN', 'PENDAFTARAN', 2011, 2011, '13 Th ', '', 'Jl. Plumbon II Rt. 05 / III Kel. Wonosari Ngaliyan Semarang', '', '', '', 'TETAP', '4241181', '274656c16d80b667642b72751d0d8ef0', 'man.png', 0),
(5657, '4251187', 'BAYU WIDHIASMARA', '', 'Laki-laki', 'semarang', '1987-08-12', '36 Th 9 bln', 'KOORDINATOR MARKETING', 'HUMAS', 2011, 2011, '13 Th ', '', 'Jl. Mandasia I/309 Perumnas Krapyak Smg', '', '', '', 'TETAP', '4251187', '667643ae37fb785b92febf7409206feb', 'man.png', 0),
(5658, '4261185', 'TRI SUSILO', '', 'Laki-laki', 'Klaten', '1985-01-23', '39 Th 4 bln', 'PELAKSANA KURIR / FILLING', 'REKAM MEDIS', 2011, 2011, '13 Th ', '', 'Perumahan Sinar Waluyo Raya No. 118 Rt.02 / Rw. 01', '', '', '', 'TETAP', '4261185', 'b4d87f12f108be844700738f8e918113', 'man.png', 0),
(5659, '4331182', 'MEIRITA PRANAWATI', '', 'Perempuan', 'Kendal', '1982-05-01', '42 Th 1 bln', 'KA.KOMITE KEPERAWATAN DAN KEBIDANNA', 'KEPERAWATAN', 2011, 2011, '13 Th ', '', 'Perum Sarirejo Indah Blok A No. 19 Kaliwungu Kendal', '', '', '', 'TETAP', '4331182', '059112da565c854f82e1e824dad82bab', 'woman.png', 0),
(5660, '4381189', 'ANIES FRANSISKA WIDHI I', '', 'Perempuan', 'Blora', '1989-07-01', '34 Th 11 bl', 'PELAKSANA PERAWAT', 'DEWI KUNTHI', 2011, 2011, '13 Th ', '', 'Bukit Beringin Utara Blok D No. 152 Rt. 05/ Rw. XV Wonosari Ngaliyan', '', '', '', 'TETAP', '4381189', 'bd8167d6090d452afc8a84de6a487341', 'woman.png', 0),
(5661, '4391187', 'ARUM RATNA FATMAWATI', '', 'Perempuan', 'Kendal', '1987-10-04', '36 Th 8 bln', 'PELAKSANA PERAWAT', 'DEWI KUNTHI', 2011, 2011, '13 Th ', '', 'Rejosari Rt. 005 / R2 003 Brangsong Kendal', '', '', '', 'TETAP', '4391187', 'cafb1b938c13a264429c5e54c6ea364f', 'woman.png', 0),
(5662, '4411186', 'HANA PRAMITA', '', 'Perempuan', 'Purwokerto', '1986-05-07', '38 Th 1 bln', 'PELAKSANA BIDAN', 'IKB', 2011, 2011, '13 Th ', '', 'Perumahan Taman Bringin 2 No.7 Tambakaji Ngaliyan Smg', '', '', '', 'TETAP', '4411186', '2d02fc3fb6dd9c393b8a0a0d925b2da9', 'woman.png', 0),
(5663, '4421188', 'DWI WINARSI', '', 'Perempuan', ' Semarang ', '1988-03-24', '36 Th 2 bln', 'PELAKSANA BIDAN', 'IKB', 2011, 2011, '13 Th ', '', 'Jl. Wr. Supartman Rt. 06/ Rw. XII Gisik Drono Semarang', '', '', '', 'TETAP', '4421188', '0803b75dc83659fcf8ed8849605c94bf', 'woman.png', 0),
(5664, '4431189', 'RIYAN MULIANI', '', 'Perempuan', 'Blora', '1989-07-28', '34 Th 10 bl', 'PELAKSANA PERAWAT', 'ICU', 2011, 2011, '13 Th ', '', 'Jl. Tawang Rejosari No. 57 Rt. 03/01 Smg', '', '', '', 'TETAP', '4431189', '5bcdc9d9548c8d64c120c5c8b0e93050', 'woman.png', 0),
(5665, '4441185', 'RIANA', '', 'Perempuan', 'Semarang', '1985-01-17', '39 Th 4 bln', 'PELAKSANA PERAWAT', 'ICU', 2011, 2011, '13 Th ', '', 'Podorejo Rt. 01 / II Kec. Ngalian Semarang', '', '', '', 'TETAP', '4441185', '18c6a726036e6bf4a4ed75372ca58b95', 'woman.png', 0),
(5666, '4451173', 'BROTOJOYO MIRSODI', '', 'Laki-laki', 'Kendal', '1973-05-07', '51 Th 1 bln', 'PELAKSANA DRIVER', 'DRIVER', 2011, 2011, '13 Th ', '', 'Dsn. Kaliman Rt. 03/ 05 Boja Kendal', '', '', '', 'TETAP', '4451173', '01603faaf4c522cb5f2dde18cb5b60bd', 'man.png', 0),
(5667, '4571189', 'NOFIANA', '', 'Perempuan', 'Kendal', '1989-11-05', '34 Th 7 bln', 'KEPALA RUANG', 'RAMA SHINTA', 2011, 2011, '13 Th ', '', 'Jl. Kyai Mukhibin Rt. 03/02 Brongsong Kendal', '', '', '', 'TETAP', '4571189', '3cb4d9adb95b03c32a885da187349e83', 'woman.png', 0),
(5668, '4781277', 'FAHLEVI PUJI ASTUTI', '', 'Perempuan', 'semarang', '1977-03-07', '47 Th 3 bln', 'PELAKSANA LAUNDRY', 'LAUNDRY', 2012, 2012, '12 Th ', '', 'Jl. Margoyoso II Rt. 05/IV Tambak Aji Ngaliyan Smg', '', '', '', 'TETAP', '4781277', 'e28e7ee21d84646b306086608f5f3dab', 'woman.png', 0),
(5669, '4791268', 'MUNJANAH', '', 'Perempuan', 'Kendal', '1968-08-22', '55 Th 9 bln', 'PELAKSANA HOUSEKEEPING', 'HOUSEKEEPING', 2012, 2012, '12 Th ', '', 'Jatisari Rt. 03/02 mijen', '', '', '', 'TETAP', '4791268', '1992eb1d04342d9a004c489c79dc79c3', 'woman.png', 0),
(5670, '4811285', 'HERLIAN ERVIZ', '', 'Laki-laki', 'Jakarta', '1985-07-10', '38 Th 11 bl', 'PELAKSANA KOKI', 'GIZI', 2012, 2012, '12 Th ', '', 'Jl. Gunung Jati Tengah No. 461 Rt. 07/02', '', '', '', 'TETAP', '4811285', '9f8555b5954ecf4a6509b975d2f311e8', 'man.png', 0),
(5671, '4881283', 'MAKMUN ATIQA', '', 'Perempuan', 'Demak', '1983-03-06', '41 Th 3 bln', 'PELAKSANA BIDAN', 'IKB', 2012, 2012, '12 Th ', '', 'Jamus Karang Sambung Rt. 09 Rw. 03 Kec. Mranggen', '', '', '', 'TETAP', '4881283', '62bba6f74726bf54ee16bd4c6d02980f', 'woman.png', 0),
(5672, '4961289', 'EVITA CAHYA RIANI', '', 'Perempuan', 'Demak', '1989-06-09', '35 Th 0 bln', 'PELAKSANA PERAWAT', 'POLIKLINIK', 2012, 2012, '12 Th ', '', 'Ds. Megonten Rt. 03 Rw. 01 Kec. Kebonagung Kab. Demak', '', '', '', 'TETAP', '4961289', '5a4b0e5fbdea9b3dd49955ae0d95d3ce', 'woman.png', 0),
(5673, '4981289', 'AWANG REZA PRASETYA', '', 'Laki-laki', 'Grobogan', '1989-03-13', '35 Th 2 bln', 'PELAKSANA PERAWAT', 'IBS', 2012, 2012, '12 Th ', '', 'Dsn. Krajan Rt. 03 Rw. 01 Ds. Sumberagung Kec. Ngaringan Kab. Grobogan', '', '', '', 'TETAP', '4981289', 'd0b08106bd881ce6c2c5cec1baff00ee', 'man.png', 0),
(5674, '5001290', 'RATIH KUMALA DEVI', '', 'Perempuan', 'Semarang', '1990-02-24', '34 Th 3 bln', 'KOORDINATOR CASEMIX', 'REKAM MEDIS', 2012, 2012, '12 Th ', '', 'Jl. Margoyoso 1 No.12 Rt.04/04 Tambakaji Ngaliyan', '', '', '', 'TETAP', '5001290', '9c14e708a4976e5a3c0b22f4f907cb01', 'woman.png', 0),
(5675, '5031281', 'DWI DARYANTI', '', 'Perempuan', 'Semarang', '1981-11-26', '42 Th 6 bln', 'PELAKSANA PERAWAT GIGI', 'POLIKLINIK', 2012, 2012, '12 Th ', '', 'Perum Puri Sartika Blok E No. 524 Rt.007 Rw.012 Sukorejo Gunung Pati Smg', '', '', '', 'TETAP', '5031281', '7adf382d9da3d91a1aa221e1f29ab366', 'woman.png', 0),
(5676, '5051293', 'ASTARINA HARPHITA SETIAWAN', '', 'Perempuan', 'semarang', '1993-06-12', '30 Th 11 bl', 'PELAKSANA TTK', 'FARMASI', 2012, 2012, '12 Th ', '', 'Jl. Wahyu asri Utara VIII AA 33 Rt.010 Rw.006 Ngaliyan Smg', '', '', '', 'TETAP', '5051293', '46212d7fa666a54fcd682f87d56f8d91', 'woman.png', 0),
(5677, '5131287', 'DESI ARIYANTI', '', 'Perempuan', 'semarang', '1987-12-27', '36 Th 5 bln', 'PELAKSANA ASPER', 'ARIMBI', 2007, 2007, '17 Th ', '', 'Jl. Taman Gedongsongo Timur Rt.10 Rw.01 Manyaran Smg', '', '', '', 'TETAP', '5131287', 'e6332a465ae5d035008b95df210ec2f6', 'woman.png', 0),
(5678, '5261287', 'TRI DIAN HERLAMBANG SAKTI', '', 'Laki-laki', 'Pemalang', '1987-07-20', '36 Th 10 bl', 'PELAKSANA PERAWAT', 'HEMODIALISA', 2012, 2012, '12 Th ', '', 'Perum Brangsong Jl. Dieng I No. 21 Rt.01 Rw. 08 Sidorejo Kendal', '', '', '', 'TETAP', '5261287', '816945be294747f2ea34cc898d81d63c', 'man.png', 0),
(5679, '5291290', 'ULI ULIYA', '', 'Perempuan', 'Ungaran', '1990-07-13', '33 Th 10 bl', 'PELAKSANA PERAWAT', 'IBS', 2012, 2012, '12 Th ', '', 'Ds. Nongko Sawit Rt.02 Rw.01 Gunung Pati Smg', '', '', '', 'TETAP', '5291290', 'be9e43bcfc7d3998dfd8d4288c76b1e4', 'woman.png', 0),
(5680, '5301285', 'IS RIANIKA', '', 'Perempuan', 'Demak', '1985-08-04', '38 Th 10 bl', 'PELAKSANA PERAWAT', 'RAMA SHINTA', 2012, 2012, '12 Th ', '', 'Dolog Rt.03 Rw.04 Kembangarum Mranggen Demak 59567', '', '', '', 'TETAP', '5301285', '44a8871f204de7459df7dd68fefc1e87', 'woman.png', 0),
(5681, '5371288', 'ANISA EMANIAR', '', 'Perempuan', 'Kendal', '1988-01-04', '36 Th 5 bln', 'PELAKSANA KASIR', 'KASIR', 2012, 2012, '12 Th ', '', 'Jl. Raya Timur No. 121/C KDL Rt.021 Rw. 005  Kebondalem Kendal', '', '', '', 'TETAP', '5371288', '4db4d82074b83122aebaa713d9bb7a6d', 'woman.png', 0),
(5682, '5381272', 'BENEDICTA ESTINING KUSUMAWARDHANI', '', 'Perempuan', 'Yogyakarta', '1972-10-09', '51 Th 8 bln', 'BAGIAN MOBILISASI DANA DAN PIUTANG', 'KEUANGAN', 2012, 2012, '12 Th ', '', 'Perum BPI Blok I/125 RT 08 / RW 10 Ngaliyan', '', '', '', 'TETAP', '5381272', 'edf8b20a1d38bde4ad279d18a793daaf', 'woman.png', 0),
(5683, '5401287', 'ROSITA DEVI KRISTIANA', '', 'Perempuan', 'Semarang', '1987-12-24', '36 Th 5 bln', 'PELAKSANA ANALIS', 'LABORATORIUM', 2012, 2012, '12 Th ', '', 'Jl. Tugurejo Gang A9 Rt.009 Rw.001  Semarang', '', '', '', 'TETAP', '5401287', '05308f2cac54adbcf8bd6017243e2a01', 'woman.png', 0),
(5684, '5461282', 'FRISCA APRILIANINGTYAS EKA SAPUTRA', '', 'Perempuan', 'semarang', '1982-04-16', '42 Th 1 bln', 'PELAKSANA ADMINISTRASI', 'LABORATORIUM', 2012, 2012, '12 Th ', '', 'Jl. Bulu Magersari I/13 Pindrikan kidul Semarang', '', '', '', 'TETAP', '5461282', 'c4fe021aa1c4319a97c6586e77caa4ff', 'woman.png', 0),
(5685, '5501291', 'ULYATUSHOLIKHAH', '', 'Perempuan', 'Kendal', '1991-09-10', '32 Th 9 bln', 'PELAKSANA PERAWAT', 'HEMODIALISA', 2012, 2012, '12 Th ', '', 'Ds. Cepiring Rt.003 Rw.004 Cepiring Kendal', '', '', '', 'TETAP', '5501291', 'b70051d9048caa7594e5782c37190d2c', 'woman.png', 0),
(5686, '5551288', 'SLAMET RIYADI', '', 'Laki-laki', 'Grobogan', '1988-04-26', '36 Th 1 bln', 'PELAKSANA PERAWAT', 'IGD', 2012, 2012, '12 Th ', '', 'Ds. Pepe Rt. 002/001 Tegowanu Grobogan', '', '', '', 'TETAP', '5551288', '4b4e2bee252b875743d1f4c5408d4725', 'man.png', 0),
(5687, '5591388', 'AAN DWI KUNCORO AZIS S', '', 'Laki-laki', 'Ngawi', '1988-06-03', '36 Th 0 bln', 'PELAKSANA PERAWAT', 'IGD', 2013, 2013, '11 Th ', '', 'Ds. Gerih Rt/Rw. 009/003 Gerih Kab.Ngawi', '', '', '', 'TETAP', '5591388', '11484b3a13fb70169d0cf8575a9c5b06', 'man.png', 0),
(5688, '5651390', 'RANI SEKAR ARUM', '', 'Perempuan', 'Semarang', '1990-09-18', '33 Th 8 bln', 'PELAKSANA ASISTEN KOKI', 'GIZI', 2013, 2013, '11 Th ', '', 'Perum Roworejo Asri II No.2 Rt.03 Rw.07 Mijen Smg', '', '', '', 'TETAP', '5651390', '678b4c5b0442ad9676ff7fc661550ef1', 'woman.png', 0),
(5689, '5691392', 'DEWI KHOLIFAH', '', 'Perempuan', 'Kendal', '1992-07-28', '31 Th 10 bl', 'PELAKSANA PENDAFTARAN', 'PENDAFTARAN', 2013, 2013, '11 Th ', '', 'Dsn. Gedangan Rt.004 Rw.006 Boja Kendal', '', '', '', 'TETAP', '5691392', '6448c5378ac1f97277dc20af49a9ccf6', 'woman.png', 0),
(5690, '5711382', 'PUJI LESTARI', '', 'Perempuan', 'Kebumen', '1982-09-16', '41 Th 8 bln', 'PELAKSANA PENDAFTARAN', 'PENDAFTARAN', 2013, 2013, '11 Th ', '', 'Bukit Jatisari Asri Blok A 4 / 6 Rt.008 Rw.006 Jatisari Mijen Semarang', '', '', '', 'TETAP', '5711382', 'abc260e6fa801efa708d7cdee82f3d87', 'woman.png', 0),
(5691, '5751391', 'DAIQ HITLERRIYANA', '', 'Perempuan', 'Kendal', '1991-10-30', '32 Th 7 bln', 'PELAKSANA BIDAN', 'IKB', 2013, 2013, '11 Th ', '', 'Dk Gladak Sari 2/12 Plantaran Kaliwungu Kendal', '', '', '', 'TETAP', '5751391', '20a444df49ed10c315a3c755e4307937', 'woman.png', 0),
(5692, '5851389', 'FERIS INTAN PARAMITA', '', 'Perempuan', 'Magelang', '1989-02-09', '35 Th 4 bln', 'KEPALA RUANG', 'PERISTI', 2013, 2013, '11 Th ', '', 'Perum Pratama Green Residence Blok j-8 Rt/Rw.004/005 Kedung Pani Mijen', '', '', '', 'TETAP', '5851389', '3bc83a1e778b55adae6711409433bca0', 'woman.png', 0),
(5693, '5981382', 'DIAN SUTRISNI', '', 'Perempuan', 'semarang', '1982-12-15', '41 Th 5 bln', 'PELAKSANA TTK', 'FARMASI', 2013, 2013, '11 Th ', '', 'Jl. Karang Sawo Rt/Rw.005/002 Bongsari Smg Brt', '', '', '', 'TETAP', '5981382', '83fc5d2c30f36d5e1d78effe78d692dc', 'woman.png', 0),
(5694, '6021390', 'NUR HIDAYAH', '', 'Perempuan', 'Semarang', '1991-06-11', '32 Th 11 bl', 'KOORDINATOR PIUTANG/PERBANTUAN KEBAG. KEUANGAN', 'KASIR', 2013, 2013, '11 Th ', '', 'Dk. Dawung Rt.001 Rw.003 Kedungpani Mijen', '', '', '', 'TETAP', '6021390', 'd7b829a8d8f9c9327caed55adaf02094', 'woman.png', 0),
(5695, '6031380', 'BEKTI SUHARTI', '', 'Perempuan', 'semarang', '1982-01-10', '42 Th 5 bln', 'PELAKSANA FISIOTERAPI', 'FISIOTERAPI', 2013, 2013, '11 Th ', '', 'Jl. Karonsih selatan IX No.681 Ngaliyan Smg', '', '', '', 'TETAP', '6031380', 'b44880a03999951b975deb6a20d992a1', 'woman.png', 0),
(5696, '6221382', 'NANIK SULISTYAWATI', '', 'Perempuan', 'Semarang', '1982-10-05', '41 Th 8 bln', 'PELAKSANA PERAWAT', 'ARIMBI', 2013, 2013, '11 Th ', '', 'Genuk Kel. Tambangan Rt.001 Rw.002 Tambangan Mijen  Smg', '', '', '', 'TETAP', '6221382', 'e86050d5a746558129fb45f962206be6', 'woman.png', 0),
(5697, '6241379', 'SULASTRI', '', 'Perempuan', 'Kendal', '1979-04-09', '45 Th 2 bln', 'PELAKSANA PENYAJI', 'GIZI', 2013, 2013, '11 Th ', '', 'Jl. Bukit Beringin Timur VII Blok E/97 Rt.003 Rw.010 Gondoriyo Ngaliyan Smg', '', '', '', 'TETAP', '6241379', '7204193c98e60406b6be73f8849eb789', 'woman.png', 0),
(5698, '6311395', 'ADIP FIKRI', '', 'Laki-laki', 'Batang', '1995-07-02', '28 Th 11 bl', 'PELAKSANA PENDAFTARAN', 'HUMAS', 2013, 2013, '11 Th ', '', 'Dk. Kedawung Rt.005 Rw. 001 Kedawung banyuputih Batang', '', '', '', 'TETAP', '6311395', '655db0a18df1c22e56c5fbf61eb5f2cb', 'man.png', 0),
(5699, '6361389', 'ANISFATUR RAHMAWATI', '', 'Perempuan', 'Grobogan', '1990-11-08', '33 Th 7 bln', 'PELAKSANA PERAWAT', 'PERISTI', 2013, 2013, '11 Th ', '', 'Pranten Rt.003 Rw.001 Pranten Gubug Grobogan', '', '', '', 'TETAP', '6361389', '24362bbd3d423fd3736467f72b6294cb', 'woman.png', 0),
(5700, '6381390', 'LINA YULIANI', '', 'Perempuan', 'Kendal', '1990-12-12', '33 Th 5 bln', 'KA. SIE. KEPERAWATAN DAN KEBIDANAN', 'KEPERAWATAN', 2013, 2013, '11 Th ', '', 'Wonorejo Rt.003 Rw.001 Wonotenggang Rowosari Kendal', '', '', '', 'TETAP', '6381390', '551d4a1fcfb2cb1dea824260ae456dd5', 'woman.png', 0),
(5701, '6411389', 'MUHAMAD MALIQ', '', 'Laki-laki', 'Semarang', '1990-09-11', '33 Th 8 bln', 'PELAKSANA PERAWAT', 'IBS', 2013, 2013, '11 Th ', '', 'Bangetayu Wetan Rt.003 rw.003 Genuk Smg', '', '', '', 'TETAP', '6411389', 'd5b3fc0ae4f42c13a9606ae035bcf3a7', 'man.png', 0),
(5702, '6421391', 'NOVIANI ELZAWATI', '', 'Perempuan', 'Semarang', '1991-03-01', '33 Th 3 bln', 'PELAKSANA PERAWAT', 'IGD', 2013, 2013, '11 Th ', '', 'Jl. Candi Tembaga Tengah I/918 rt.008 Rw.005 Kalipancur Ngaliyan smg', '', '', '', 'TETAP', '6421391', '8e3b4a85d0ed09e38df7bab0da27d8b9', 'woman.png', 0),
(5703, '6431389', 'RAHMAT NANDA Z', '', 'Laki-laki', 'Kendal', '1990-06-11', '33 Th 11 bl', 'PELAKSANA PERAWAT ANASTESI', 'IBS', 2013, 2013, '11 Th ', '', 'KP.Kandangan Timur Rt.002 Rw.007 Krajankulon Kaliwungu Kendal', '', '', '', 'TETAP', '6431389', '5f1ee3405fbd4b5fb7b877cacee31a20', 'man.png', 0),
(5704, '6451386', 'NOVITA TRI WIDYANINGSIH', '', 'Perempuan', 'Semarang', '1986-11-24', '37 Th 6 bln', 'KEPALA RUANG', 'IKB', 2013, 2013, '11 Th ', '', 'Jl. Plamongan Elok 1/540 Pedurungan Smg', '', '', '', 'TETAP', '6451386', '516c014d18e639264da451d9085b69aa', 'woman.png', 0),
(5705, '6461380', 'WIM PRAMUDIANTO', '', 'Laki-laki', 'Ambarawa', '1980-04-01', '44 Th 2 bln', 'PELAKSANA PERAWAT', 'IGD', 2013, 2013, '11 Th ', '', 'Kupang Lor Rt.003 Rw.003 Kupang Ambarawa', '', '', '', 'TETAP', '6461380', '427b84c28b3eca21ecae58de6b8d4b6b', 'man.png', 0),
(5706, '6541490', 'DETIKA WAHYU SETYANI', '', 'Perempuan', 'Kendal', '1991-10-12', '32 Th 7 bln', 'PELAKSANA PERAWAT', 'ARIMBI', 2014, 2014, '10 Th ', '', 'Tabet Rt.003 Rw.001 Tabet Limbangan Kendal', '', '', '', 'TETAP', '6541490', 'fc3cb09d807ef6eebacb1cba07ddac40', 'woman.png', 0),
(5707, '6551492', 'OKTO PRIYASDHIKA ZAELANI', '', 'Laki-laki', 'Semarang', '1993-05-10', '31 Th 1 bln', 'PELAKSANA PERAWAT', 'ICU', 2014, 2014, '10 Th ', '', 'Wologito Utara Rt.001 Rw.006 Kembangarum semarang Barat', '', '', '', 'TETAP', '6551492', '1f2a3fe33f2076573d588e05f36e9bcd', 'man.png', 0),
(5708, '6581491', 'DIWANGGA ADJI PRATITIS', '', 'Laki-laki', 'semarang', '1991-03-10', '33 Th 3 bln', 'KEPALA RUANG', 'FISIOTERAPI', 2014, 2014, '10 Th ', '', 'Pandana Merdeka Blok R-18 Rt. 005 Rw.003 Bringin Ngaliayn', '', '', '', 'TETAP', '6581491', '36ab64bc3e7c9f247b737c6f50c512c5', 'man.png', 0),
(5709, '6671491', 'RANY OKTYVIANA', '', 'Perempuan', 'Semarang', '1993-07-10', '30 Th 11 bl', 'PELAKSANA PERAWAT', 'ICU', 2014, 2014, '10 Th ', '', 'Dk. Dawung Rt.003 Rw.003 Kedungpani Mijen Smg', '', '', '', 'TETAP', '6671491', '9828bf1424c76e75876229723c5e7cc7', 'woman.png', 0),
(5710, '6681492', 'SOFIA LADIBA', '', 'Perempuan', 'Semarang', '1992-05-11', '32 Th 0 bln', 'PELAKSANA PERAWAT', 'IGD', 2014, 2014, '10 Th ', '', 'Sanggrahan Rt.001 Rw.006 Banyubiru Dukun Magelang', '', '', '', 'TETAP', '6681492', '190f493a478a9a2c4f5afcef02bcb7d5', 'woman.png', 0),
(5711, '6721490', 'TITI NUGRAHAYU HARIASIH', '', 'Perempuan', 'Pati', '1990-01-02', '34 Th 5 bln', 'PELAKSANA BIDAN', 'IKB', 2014, 2014, '10 Th ', '', 'Jl. Tumpang I No. 106 Rt.003 Rw.009 Gajahmungkur Smg', '', '', '', 'TETAP', '6721490', '6843f2216d04b2a4f07febc694c1f97f', 'woman.png', 0),
(5712, '6731493', 'NUR WAHYU RACHMAWATI', '', 'Perempuan', 'Semarang', '1993-09-12', '30 Th 8 bln', 'PELAKSANA ASPER', 'IGD', 2014, 2014, '10 Th ', '', 'Griya Beringin Asri Blok G No.86 Rt.001 Rw.013 Wonosari Ngaliyan Smg', '', '', '', 'TETAP', '6731493', '97e5b1fe595cd1d5c51013c68e0acb81', 'woman.png', 0),
(5713, '6741489', 'ANJAR KRISTIANTO', '', 'Laki-laki', 'Banyumas', '1990-04-12', '34 Th 1 bln', 'PELAKSANA CUSTOMER SERVICE', 'HUMAS', 2014, 2014, '10 Th ', '', 'Kanding Rt.001 Rw.001 Somagede Banyumas', '', '', '', 'TETAP', '6741489', '04578be56a543470f30253f7d04a6041', 'man.png', 0),
(5714, '6791495', 'WIDYA SETYANINGSIH', '', 'Perempuan', 'Semarang', '1996-11-10', '27 Th 7 bln', 'PELAKSANA PENDAFTARAN', 'PENDAFTARAN', 2014, 2014, '10 Th ', '', 'Sadeng Rt.004 Rw.002 Gunungpati semarang', '', '', '', 'TETAP', '6791495', 'fe4f7cab6102a31d65ba022daee95c69', 'woman.png', 0),
(5715, '6801494', 'DENNY PRASETYO WIBOWO', '', 'Laki-laki', 'semarang', '1994-11-12', '29 Th 6 bln', 'KERJASAMA BISNIS', 'HUMAS', 2014, 2014, '10 Th ', '', 'Beringin Asri Rt.005 RW.011 Wonosari Ngaliyan Smg', '', '', '', 'TETAP', '6801494', '8f19cf8b3a92c6b0f45f06a9536c7b6c', 'man.png', 0),
(5716, '6831485', 'OKTARINA MUKTI UTAMI', '', 'Perempuan', 'Kendal', '1994-10-10', '29 Th 8 bln', 'PELAKSANA PENDAFTARAN', 'PENDAFTARAN', 2014, 2014, '10 Th ', '', 'Dsn. Badaan Rt.006 Rw.006 Bebengan Boja Kendal', '', '', '', 'TETAP', '6831485', '2a6a0623b2222c293b78e6f1ba70fbce', 'woman.png', 0),
(5717, '6891492', 'ESTRI JAYANTI', '', 'Perempuan', 'Kendal', '1993-02-01', '31 Th 4 bln', 'PELAKSANA ANALIS', 'LABORATORIUM', 2014, 2014, '10 Th ', '', 'Tabet Rt.003 Rw.001 Tabet Limbangan Kendal', '', '', '', 'TETAP', '6891492', '21719df65747036bce4e57c17c7d3da9', 'woman.png', 0),
(5718, '6931491', 'DEWI MULAD SARI', '', 'Perempuan', 'Pati', '1992-08-09', '31 Th 10 bl', 'AHLI GIZI', 'GIZI', 2014, 2014, '10 Th ', '', 'Ds. Trimulyo Rt.002 Rw.004 Juwana Pati', '', '', '', 'TETAP', '6931491', 'cfe3bf4746347a392293bcf532b7ce83', 'woman.png', 0),
(5719, '7071585', 'TRI KARTIKANINGSIH', '', 'Perempuan', 'Blora', '1985-12-04', '38 Th 6 bln', 'PELAKSANA PERAWAT', 'PERISTI', 2015, 2015, '9 Th ', '', 'Jl. Candisari Rt.010 Rw.004 Bambankerep ngaliyan', '', '', '', 'TETAP', '7071585', '65fde4eb9959dc9615255a3b7ff674fe', 'woman.png', 0),
(5720, '7081593', 'APRILIA FINA SARI', '', 'Perempuan', 'Semarang', '1994-07-04', '29 Th 11 bl', 'PELAKSANA PERAWAT', 'RAMA SHINTA', 2015, 2015, '9 Th ', '', 'Perum Jatisari Asabri Blok B3/03 Rt.007 Rw.010 Jatisari Mijen Smg', '', '', '', 'TETAP', '7081593', '37ee52705ad1a706800ad2b196348159', 'woman.png', 0),
(5721, '7091593', 'CANDRA PUSPITA DEWI', '', 'Perempuan', 'semarang', '1994-03-07', '30 Th 3 bln', 'KEPALA RUANG', 'POLIKLINIK', 2015, 2015, '9 Th ', '', 'Parang Klitik Raya No.15 Rt.002 Rw.019 Tlogosari Kulon Pedurungan Semarang', '', '', '', 'TETAP', '7091593', '78c1794e0068260fcbd825530790b564', 'woman.png', 0),
(5722, '7101583', 'DWI PUJI ASTUTIK', '', 'Perempuan', 'Demak', '1985-01-05', '39 Th 5 bln', 'PELAKSANA PERAWAT', 'ARIMBI', 2015, 2015, '9 Th ', '', 'Perum Beringin Permai No.1 Rt.002 Rw.015 Bringin Ngaliyan Smg', '', '', '', 'TETAP', '7101583', 'f23b0f8582f946d04188bbb9b4ae7cd5', 'woman.png', 0),
(5723, '7121593', 'CHOYRIA SETYA ULAFA', '', 'Perempuan', 'Kendal', '1993-08-07', '30 Th 10 bl', 'PELAKSANA PERAWAT', 'POLIKLINIK', 2015, 2015, '9 Th ', '', 'Ds. Bebengan Rt.006 Rw.005 Boja Kendal', '', '', '', 'TETAP', '7121593', '89b8d2e91b5e1d62c19e948623b59dbf', 'woman.png', 0),
(5724, '7151592', 'FERINTA DEWI', '', 'Perempuan', 'Temanggung', '1992-11-02', '31 Th 7 bln', 'PELAKSANA PERAWAT', 'IBS', 2015, 2015, '9 Th ', '', 'Dsn. Wunut Rt.007 Rw.001 WonoTirto Bulu Temanggung', '', '', '', 'TETAP', '7151592', '48887ebe30dcf5ed428f6d19b8bbff84', 'woman.png', 0);
INSERT INTO `pegawai` (`id`, `nopeg`, `nama`, `nik`, `gender`, `tmpt_lahir`, `tgl_lahir`, `umur`, `jabatan`, `unit`, `tmt`, `skpt`, `masa`, `ijazah`, `alamat`, `email`, `telpon`, `status_kawin`, `status_pegawai`, `username`, `password`, `foto`, `admin`) VALUES
(5725, '7161593', 'DEVI WULAN SARI', '', 'Perempuan', 'semarang', '1994-03-12', '30 Th 2 bln', 'PELAKSANA PERAWAT', 'POLIKLINIK', 2015, 2015, '9 Th ', '', 'Kp. Kalipancur Rt.001 Rw.003 Bambankerep Ngaliyan Smg', '', '', '', 'TETAP', '7161593', 'e30ca7d2f7000030014d16b3492a1c02', 'woman.png', 0),
(5726, '7201579', 'DEWI NOVITASARI', '', 'Perempuan', 'Jepara', '1979-11-11', '44 Th 6 bln', 'PELAKSANA PERAWAT', 'DEWI KUNTHI', 2015, 2015, '9 Th ', '', 'Jatisari Asabri D-7 No.12 B Rt.002 Rw.010 Jatisari Mijen Smg', '', '', '', 'TETAP', '7201579', '9d7ee27dd25731b06624c4061abf0025', 'woman.png', 0),
(5727, '7271590', 'AGUNG PRABOWO', '', 'Laki-laki', 'semarang', '1991-02-03', '33 Th 4 bln', 'KEPALA RUANG', 'IGD', 2015, 2015, '9 Th ', '', 'Seruni V/20 Rt.004 Rw.010 Tlogosari Kulon Pedurungan Smg', '', '', '', 'TETAP', '7271590', '7f3baacb9357c302760bc88a955413e6', 'man.png', 0),
(5728, '7321591', 'ELA FADHILAH', '', 'Perempuan', 'Boyolali', '1991-11-10', '32 Th 7 bln', 'PELAKSANA ASPER', 'DEWI KUNTHI', 2015, 2015, '9 Th ', '', 'Tambakaji Rt.013 Rw.012 Ngaliyan Smg', '', '', '', 'TETAP', '7321591', '4873de7d902d0a903ee5526b613f2599', 'woman.png', 0),
(5729, '7341591', 'LENA SOFIATUN KHASANAH', '', 'Perempuan', 'Semarang', '1992-02-07', '32 Th 4 bln', 'PELAKSANA PERAWAT', 'POLIKLINIK', 2015, 2015, '9 Th ', '', 'Jl. Wonosari Raya No.3 Rt.006 Rw.009 Wonosari Ngaliyan Smg', '', '', '', 'TETAP', '7341591', '9cc0719bb47b0798d2372a9d8dda4afc', 'woman.png', 0),
(5730, '7391581', 'DENI ASTRI FARIDA', '', 'Perempuan', 'semarang', '1981-12-09', '42 Th 6 bln', 'PELAKSANA ANALIS', 'LABORATORIUM', 2015, 2015, '9 Th ', '', 'Jl. Pemuda No. 56 Rt.002 Rw.007 Bintoro Demak', '', '', '', 'TETAP', '7391581', '784266e3e0963e8fbdd6ef50912d2a33', 'woman.png', 0),
(5731, '7441594', 'SOFYAN MAKRUF', '', 'Laki-laki', 'Kendal', '1994-02-04', '30 Th 4 bln', 'PELAKSANA LAUNDRY', 'LAUNDRY', 2015, 2015, '9 Th ', '', 'Dsn. Mlandang Rt.002 RW.006 Kaligading Boja Kendal', '', '', '', 'TETAP', '7441594', '33ab62389dc2832fccadce4f74c278bc', 'man.png', 0),
(5732, '7481590', 'DR. LITA NOVIANI', '', 'Perempuan', 'Semarang', '1992-07-07', '31 Th 11 bl', 'KA.INST RAWAT INAP', 'PELAYANAN MEDIS', 2015, 2015, '9 Th ', '', 'Jl. Galungan II/66 Rt 002 Rw 006 Krapyak Semarang', '', '', '', 'TETAP', '7481590', 'e0ee7cfeca257ff2c93ec662c36c5c51', 'woman.png', 0),
(5733, '7511593', 'NUR ALIFAH', '', 'Perempuan', 'Semarang', '1993-08-03', '30 Th 10 bl', 'PELAKSANA PENDAFTARAN', 'PENDAFTARAN', 2015, 2015, '9 Th ', '', 'Ds. Sriwulan Rt.004 Rw.001 Sayung Demak', '', '', '', 'TETAP', '7511593', '47ab9cdd5775d0589d35c2c6b0575be2', 'woman.png', 0),
(5734, '7561581', 'VERONIKA TYAS YANUARSIH', '', 'Perempuan', 'Semarang', '1982-05-01', '42 Th 1 bln', 'PELAKSANA PERAWAT', 'ICU', 2015, 2015, '9 Th ', '', 'Asmil 412 BTC Rt.003 Rw.004 Sindurjan Purworejo', '', '', '', 'TETAP', '7561581', 'b665dde14d06c6ef36637f673e07fd4b', 'woman.png', 0),
(5735, '7641594', 'TRI ISMAWATI', '', 'Perempuan', 'Pemalang', '1994-12-12', '29 Th 5 bln', 'PELAKSANA PERAWAT', 'POLIKLINIK', 2015, 2015, '9 Th ', '', 'Ds. Kalitorong Rt.003 Rw.001 Randudongkal Pemalang', '', '', '', 'TETAP', '7641594', '207765176142f678c93f67b6a09acfc8', 'woman.png', 0),
(5736, '7721584', 'ABDUL AZIS', '', 'Laki-laki', 'Semarang', '1984-04-03', '40 Th 2 bln', 'WAKIL KOORDINATOR', 'HOUSEKEEPING', 2015, 2015, '9 Th ', '', 'Jl. Gondosari Rt. 04/04 Ngaliyan Smg', '', '', '', 'KONTRAK', '7721584', '86491a5c01241800fcc3427612fdb8cf', 'man.png', 0),
(5737, '7731582', 'SODIKIN', '', 'Laki-laki', 'Kendal', '1982-07-12', '41 Th 10 bl', 'PELAKSANA PORTIR', 'SECURITY', 2015, 2015, '9 Th ', '', 'Campurejo rt3/3 boja. Kendal', '', '', '', 'KONTRAK', '7731582', '97e88250e22e5d9fbf1afc28fa4f15cd', 'man.png', 0),
(5738, '7761585', 'PUJIATI', '', 'Perempuan', 'Semarang', '1985-09-09', '38 Th 9 bln', 'PELAKSANA HOUSEKEEPING', 'HOUSEKEEPING', 2015, 2015, '9 Th ', '', 'Jl.Borobudur barat 3 RT 03/14 purwoyoso_ngaliyan', '', '', '', 'KONTRAK', '7761585', '640a2e697af1af4478e786cdda02b23c', 'woman.png', 0),
(5739, '7771582', 'RIYANTI', '', 'Perempuan', 'Semarang', '1984-07-10', '39 Th 11 bl', 'KOORDINATOR KEBERSIHAN DAN PERTAMANAN', 'BAGIAN UMUM', 2015, 2015, '9 Th ', '', 'Jl gedongsongo timur rt 10/01 manyaran', '', '', '', 'KONTRAK', '7771582', '0709d370683dbc8a833cb0abe4c2b7b5', 'woman.png', 0),
(5740, '7821593', 'ANDI GUNAWAN', '', 'Laki-laki', 'semarang', '1993-08-05', '30 Th 10 bl', 'PELAKSANA TEHNISI', 'IPSRS', 2015, 2015, '9 Th ', '', 'Tambangan Rt.003 Rw.001 Mijen', '', '', '', 'KONTRAK', '7821593', '14be358487b2a32770c9fd21d64ba6f1', 'man.png', 0),
(5741, '7831578', 'ABIDIN', '', 'Laki-laki', 'Kendal', '1978-06-10', '46 Th 0 bln', 'PELAKSANA HOUSEKEEPING', 'HOUSEKEEPING', 2015, 2015, '9 Th ', '', 'Dempelrejo Rt.003 Rw.002 Ngampel Kendal', '', '', '', 'KONTRAK', '7831578', '12e60a75a6d5e776ae92d8a3365a5686', 'man.png', 0),
(5742, '7851597', 'DANU RAHMAN', '', 'Laki-laki', 'semarang', '1997-07-04', '26 Th 11 bl', 'PELAKSANA PORTIR', 'SECURITY', 2015, 2015, '9 Th ', '', 'Karang Kimpul Rt 003 Rw 001 Tambakrejo Gayamsari Semarang', '', '', '', 'KONTRAK', '7851597', 'e070c8c9c36ca9ee85283709c2609ff2', 'man.png', 0),
(5743, '7861579', 'AENY', '', 'Perempuan', 'semarang', '1980-06-11', '43 Th 11 bl', 'PELAKSANA HOUSEKEEPING', 'HOUSEKEEPING', 2015, 2015, '9 Th ', '', 'Kliwonan Rt.004 Rw.007 Tambakaji Ngaliyan Smg', '', '', '', 'TETAP', '7861579', '45294a31d99eec5d8f207cdc04e7d61e', 'woman.png', 0),
(5744, '7981580', 'SUPRIYANTO', '', 'Laki-laki', 'Boyolali', '1981-04-05', '43 Th 2 bln', 'PELAKSANA KURIR / FILLING', 'REKAM MEDIS', 2015, 2015, '9 Th ', '', ' Ds. Sewuni Rt 008 Rw 002 Gempol Sewu Rowosari Kendal ', '', '', '', 'KONTRAK', '7981580', 'ca3b3369153b41d3bfcb2b1f1612c24b', 'man.png', 0),
(5745, '8041677', 'SUMADI', '', 'Laki-laki', 'Kendal', '1978-07-06', '45 Th 11 bl', 'PELAKSANA LAUNDRY', 'LAUNDRY', 2016, 2016, '8 Th ', '', 'Kp. Kandangan Barat Rt.004 Rw.007 Krajan Kulon Kaliwungu Kendal', '', '', '', 'KONTRAK', '8041677', '584704ee55dc053d260303e1a2caa9c7', 'man.png', 0),
(5746, '8111698', 'DIAN PRATIWI', '', 'Perempuan', 'semarang', '1999-03-06', '25 Th 3 bln', 'PELAKSANA PENDAFTARAN', 'PENDAFTARAN', 2016, 2016, '8 Th ', '', 'Karang Kimpul Rt.003 Rw.001 Tambakrejo Gayamsari Smg', '', '', '', 'KONTRAK', '8111698', '5320f3cefc0f424a591cf1122b04b3fb', 'woman.png', 0),
(5747, '8191684', 'VERA SETYARINI', '', 'Perempuan', 'Semarang', '1985-07-02', '38 Th 11 bl', 'KOORDINATOR ADMIN DAN LAUNDRY', 'BAGIAN UMUM', 2016, 2016, '8 Th ', '', 'Jl. Sriwibowo II/9 Rt.003 Rw.003 Purwoyoso  Ngaliyan Smg', '', '', '', 'TETAP', '8191684', '075427463442afba0b212825e94a1db4', 'woman.png', 0),
(5748, '8201680', 'EKO SULISTIYONO', '', 'Laki-laki', 'Wonosobo', '1980-07-02', '43 Th 11 bl', 'PELAKSANA OPERATOR', 'HUMAS', 2016, 2016, '8 Th ', '', 'Klilin Rt.006 Rw.003 Sindupaten Kertek Wonosobo', '', '', '', 'TETAP', '8201680', '4dd80e78280d0ab85b1a892ca35b0c6a', 'man.png', 0),
(5749, '8211687', 'DANAR SETIAWAN', '', 'Laki-laki', 'semarang', '1988-09-02', '35 Th 9 bln', 'PELAKSANA PORTIR', 'SECURITY', 2016, 2016, '8 Th ', '', 'WONOPLUMBON RT03 RW01 KEC.MIJEN KOTA SEMARANG', '', '', '', 'KONTRAK', '8211687', '68ce41e5b9d981b2606484936fada0bf', 'man.png', 0),
(5750, '8301688', 'HUTI KARTINA', '', 'Perempuan', 'semarang', '1989-09-04', '34 Th 9 bln', 'PELAKSANA PENDAFTARAN', 'PENDAFTARAN', 2016, 2016, '8 Th ', '', 'Dsn. Grenden RT 2/rw2 Campurejo, Boja, kabupaten kendal', '', '', '', 'KONTRAK', '8301688', 'f7e761cfc22f3fa7f6beaece929c5891', 'woman.png', 0),
(5751, '8381688', 'ROHMI HIDAYATI', '', 'Perempuan', 'Semarang', '1989-07-11', '34 Th 10 bl', 'PELAKSANA KASIR', 'KASIR', 2016, 2016, '8 Th ', '', ' Jl. Dworowati V Rt 002 Rt 008 Krobokan Semarang Barat Semarang ', '', '', '', 'KONTRAK', '8381688', '157a6f739ae06b1fa7b55a930a64debf', 'woman.png', 0),
(5752, '8401687', 'MOHAMAD EKO RIYADI', '', 'Laki-laki', ' Semarang ', '1989-05-07', '35 Th 1 bln', 'PELAKSANA CUSTOMER SERVICE', 'HUMAS', 2016, 2016, '8 Th ', '', 'Jl. Kaba Baru Rt.009 Rw.013 Tandang Tembalang Smg', '', '', '', 'TETAP', '8401687', '780ffcb60313c0359d7a9ab2fcf30851', 'man.png', 0),
(5753, '8501683', 'AENUL CHAKIM', '', 'Laki-laki', 'Kendal', '1984-11-04', '39 Th 7 bln', 'PELAKSANA LAUNDRY', 'LAUNDRY', 2016, 2016, '8 Th ', '', 'Jl. Pengilon II Rt.003 Rw.002 Bringin Ngaliyan Smg', '', '', '', 'KONTRAK', '8501683', '3a770117f238d0855680a246483368fb', 'man.png', 0),
(5754, '8531684', 'PURWANTI', '', 'Perempuan', 'Semarang', '1985-01-11', '39 Th 4 bln', 'PELAKSANA HOUSEKEEPING', 'HOUSEKEEPING', 2016, 2016, '8 Th ', '', 'Dusun Krajan rt 003 rw 002,Bebengan, Boja,Kendal', '', '', '', 'KONTRAK', '8531684', 'a7cd659b22928c0d2835c90c2b7e9b18', 'woman.png', 0),
(5755, '8541686', 'SITI MAGHFIROH', '', 'Perempuan', 'Semarang', '1987-10-04', '36 Th 8 bln', 'PELAKSANA HOUSEKEEPING', 'HOUSEKEEPING', 2016, 2016, '8 Th ', '', 'Kalikangkung Rt.004 Rw.001 Gondoriyo Ngaliyan Smg', '', '', '', 'KONTRAK', '8541686', '9ae48637c7e9a56091e7bb180b754b8c', 'woman.png', 0),
(5756, '8591693', 'YURIESTA SUKMI P.', '', 'Perempuan', 'Semarang', '1993-01-07', '31 Th 5 bln', 'PELAKSANA TTK', 'FARMASI', 2016, 2016, '8 Th ', '', 'Jl. Sentiaki Raya No.38 Rt.001 Rw.010 Bulu Lor Smg Utara', '', '', '', 'KONTRAK', '8591693', '693cfeeb1d52c095dff7023e7413b321', 'woman.png', 0),
(5757, '8641686', 'CANDRA PRASETIAWAN', '', 'Perempuan', 'Kendal', '1987-09-04', '36 Th 9 bln', 'PELAKSANA PERAWAT', 'HEMODIALISA', 2016, 2016, '8 Th ', '', 'DUSUN KRAJAN 002/002 PUGUH . KEC BOJA . KAB KENDAL 51381', '', '', '', 'KONTRAK', '8641686', '29a6d2a469e59ff4881cfb7ec8f310d7', 'woman.png', 0),
(5758, '8661694', 'TRISHA WIDYA A.', '', 'Perempuan', 'Semarang', '1996-06-10', '28 Th 0 bln', 'PELAKSANA PERAWAT', 'DEWI KUNTHI', 2016, 2016, '8 Th ', '', 'Jl. Sawah Besar VII Rt 006 Rw 004 Kaligawe Gayamsari Semarang', '', '', '', 'KONTRAK', '8661694', 'dd00562f5f0d6eda52eef979eff5ee00', 'woman.png', 0),
(5759, '8671694', 'ELYA RIFANI', '', 'Perempuan', 'Demak', '1996-03-02', '28 Th 3 bln', 'PELAKSANA PERAWAT', 'POLIKLINIK', 2016, 2016, '8 Th ', '', 'Dusun Krajan RT 02 RW 02 puguh, boja', '', '', '', 'KONTRAK', '8671694', '588a0c5500fb1beaeb9b1f30a19e5efd', 'woman.png', 0),
(5760, '8681698', 'ARFIAN ASTRA YUDA', '', 'Laki-laki', 'Kendal', '1999-01-06', '25 Th 5 bln', 'WAKIL KOORDINATOR', 'HOUSEKEEPING', 2016, 2016, '8 Th ', '', 'Dsn. Jonjang Rt.002 Rw.006 Merbuh Singorojo Kendal', '', '', '', 'KONTRAK', '8681698', '3a7c7c093166dff2f63289ad6993f01a', 'man.png', 0),
(5761, '8841693', 'HANUM FIRDA PRABAWATI', '', 'Perempuan', 'Kendal', '1994-04-01', '30 Th 2 bln', 'KOORDINATOR', 'PENDAFTARAN', 2016, 2016, '8 Th ', '', 'Jl. Rejotaruno No. 33 Rt 003 Rw 003 Tamanrejo Limbangan Kendal', '', '', '', 'KONTRAK', '8841693', '94ce169d17842b96c093047a993811cc', 'woman.png', 0),
(5762, '8851684', 'AGUS SURYA PRABOWO', '', 'Laki-laki', 'Pati', '1986-01-03', '38 Th 5 bln', 'PELAKSANA PORTIR', 'SECURITY', 2016, 2016, '8 Th ', '', 'Tanjungsari Rt.002 Rw.002 Sumurbroto Banyumanik Smg', '', '', '', 'KONTRAK', '8851684', '4369e8843330823ac74eb6340144373f', 'man.png', 0),
(5763, '8861695', 'NARLINDA PUTRI WILANDARI', '', 'Perempuan', 'Kendal', '1995-10-05', '28 Th 8 bln', 'PELAKSANA PENDAFTARAN', 'PENDAFTARAN', 2016, 2016, '8 Th ', '', 'Jatisari RT 002 RW 004, Sukodadi, Singorojo, Kendal', '', '', '', 'KONTRAK', '8861695', '0d89639cfad55fe4118979df592d11da', 'woman.png', 0),
(5764, '8881693', 'LUPIKA WULAN OVIANA', '', 'Perempuan', 'Kebumen', '1993-07-10', '30 Th 11 bl', 'PELAKSANA PERAWAT', 'ICU', 2016, 2016, '8 Th ', '', 'Dk panjer RT 003/002 kambangsari alian kebumen', '', '', '', 'KONTRAK', '8881693', 'd2c8bd021a1d3fe73f660db1a0653f66', 'woman.png', 0),
(5765, '8911692', 'ENDANG FAJAR NOVITA SARI', '', 'Perempuan', 'Grobogan', '1993-07-11', '30 Th 10 bl', 'SUB. BAG. MOBILISASI DANA', 'KEUANGAN', 2016, 2016, '8 Th ', '', 'JL BOROBUDUR RAYA III RT 07/ RW 011', '', '', '', 'KONTRAK', '8911692', '5068771fad27aee83a44640ca18044bd', 'woman.png', 0),
(5766, '8921695', 'ELSA INGGITA ANUGRAH S.', '', 'Perempuan', 'semarang', '1995-01-02', '29 Th 5 bln', 'PELAKSANA KASIR', 'KASIR', 2016, 2016, '8 Th ', '', 'Jl. Jangli Tlawah Rt 004 Rw 005 Karanganyar Gunung Candisari Semarang', '', '', '', 'KONTRAK', '8921695', 'd1cac327d26a8afce9012e067681e60a', 'woman.png', 0),
(5767, '8941691', 'BAYU SETYO WICAKSONO', '', 'Laki-laki', 'Kendal', '1991-09-05', '32 Th 9 bln', 'PELAKSANA  STERILISATOR', 'CSSU', 2016, 2016, '8 Th ', '', 'Dsn. Krajan Timur Rt. 004 Rw.003 Meteseh Boja Kendal', '', '', '', 'KONTRAK', '8941691', 'f67fb9c81fb53e1283e54c291795031f', 'man.png', 0),
(5768, '8961697', 'MUHNI', '', 'Laki-laki', 'Wonosobo', '1998-02-03', '26 Th 4 bln', 'PELAKSANA KURIR / FILLING', 'REKAM MEDIS', 2016, 2016, '8 Th ', '', 'bandungsari rt02 rw 04 tambangan', '', '', '', 'KONTRAK', '8961697', '8eb773a694f2d4127c51de633f4f1a34', 'man.png', 0),
(5769, '8981694', 'MEGA WULANDARI', '', 'Perempuan', 'Semarang', '1995-01-05', '29 Th 5 bln', 'PELAKSANA PERAWAT', 'IBS', 2016, 2016, '8 Th ', '', 'Jl. Kauman Barat III/22 Rt. 005 Rw. 008 Palebon Pedurungan Smg', '', '', '', 'KONTRAK', '8981694', '15c5a8e7ba23d167b8cfecfa08a141e0', 'woman.png', 0),
(5770, '9061795', 'DWI YULIAN PURWADANI', '', 'Perempuan', 'semarang', '1997-07-07', '26 Th 11 bl', 'PELAKSANA RADIOGRAFER', 'RADIOLOGI', 2017, 2017, '7 Th ', '', 'Karanggeneng Rt.003 Rw.001 Sumurejo Gunungpati Semarang', '', '', '', 'KONTRAK', '9061795', '41b931ed9a9989967e02fd09fc4bb141', 'woman.png', 0),
(5771, '9131798', 'SUHARTINI', '', 'Perempuan', 'Semarang', '1976-05-11', '48 Th 0 bln', 'PELAKSANA HOUSEKEEPING', 'HOUSEKEEPING', 2017, 2017, '7 Th ', '', 'Jl.srikaton timur III rt 5 rw 6', '', '', '', 'KONTRAK', '9131798', 'facfeda9a1d4903e8ead20eb31ccecf5', 'woman.png', 0),
(5772, '9141794', 'AGUS FATONI', '', 'Laki-laki', 'Kendal', '1995-06-03', '29 Th 0 bln', 'PELAKSANA OB', 'OB', 2017, 2017, '7 Th ', '', ' Dsn. Kedungdowo Rt 001 Rw 004 Campurejo Boja Kendal ', '', '', '', 'KONTRAK', '9141794', 'a548dd43e382acc2a74e6ffae6ddf9a8', 'man.png', 0),
(5773, '9201791', 'DR. INDAH MUTIARA', '', 'Perempuan', 'Semarang', '1991-12-08', '32 Th 6 bln', 'DIREKTUR RSPM', 'DIREKSI', 2017, 2017, '7 Th ', '', 'jl. Jati Raya No. 770 Kelurahan Plamongan, Kecamatan Pedurungan, Semarang', '', '', '', 'KONTRAK', '9201791', 'adfc51489bad95a315fd485cf0d96408', 'woman.png', 0),
(5774, '9241781', 'PUJI RISTANTI', '', 'Perempuan', 'Pati', '1982-01-10', '42 Th 5 bln', 'KEPALA RUANG', 'IBS', 2017, 2017, '7 Th ', '', 'Jalan Bukit Limau 8 Blok FC No. 6 RT 9 RW 11', '', '', '', 'KONTRAK', '9241781', '08741f96c2059aa2036d43e48cee968c', 'woman.png', 0),
(5775, '9301786', 'ANIEK SUSENOWATI', '', 'Perempuan', 'Semarang', '1984-02-06', '40 Th 4 bln', 'PELAKSANA HOUSEKEEPING', 'HOUSEKEEPING', 2017, 2017, '7 Th ', '', 'Bandungsari Rt.002 Rw.004 Tambangan Mijen', '', '', '', 'KONTRAK', '9301786', '7afb330dfec88ed3f5e525f39e6b03c2', 'woman.png', 0),
(5776, '9311780', 'ASEP AWALUDIN NOOR', '', 'Laki-laki', 'Kendal', '1980-03-07', '44 Th 3 bln', 'KOORDINATOR', 'DRIVER', 2017, 2017, '7 Th ', '', 'Krajan Limbangan Rt.001 Rw.005 Kendal', '', '', '', 'KONTRAK', '9311780', 'e99909a1d5b886d2da7df3dcbbd78cc7', 'man.png', 0),
(5777, '9351793', 'NURUL FANDILLAH', '', 'Perempuan', 'Semarang', '1994-03-04', '30 Th 3 bln', 'PELAKSANA BIDAN', 'IKB', 2017, 2017, '7 Th ', '', 'Jl. Gunung Jati Timur Rt.007 Rw.002  Wonosari Ngaliyan', '', '', '', 'KONTRAK', '9351793', '1a21c6d66c842a935795b035bae2f51f', 'woman.png', 0),
(5778, '9361788', 'MEI PUJI ASTUTI', '', 'Perempuan', 'Semarang', '1988-05-05', '36 Th 1 bln', 'KOORDINATOR LAUNDRY DAN ADMINISTRASI LINEN', 'BIDANG UMUM', 2017, 2017, '7 Th ', '', 'Jl. Lebdosari Rt.003 Rw.006  Kalibanteng Kulon Smg Brt', '', '', '', 'KONTRAK', '9361788', '44c1ce15b0759e7f8c2e40b65f9cade4', 'woman.png', 0),
(5779, '9371794', 'ULFA LUTFIYANI', '', 'Perempuan', 'Kendal', '1995-10-02', '28 Th 8 bln', 'PELAKSANA BIDAN', 'IKB', 2017, 2017, '7 Th ', '', 'Kendayaan Rt.002 Rw.002 Penyangkringan Weleri Kendal', '', '', '', 'KONTRAK', '9371794', '292449310dab09360d647af9082e422d', 'woman.png', 0),
(5780, '9401782', 'SRI MARTINI', '', 'Perempuan', 'Semarang', '1983-04-03', '41 Th 2 bln', 'PELAKSANA HOUSEKEEPING', 'HOUSEKEEPING', 2017, 2017, '7 Th ', '', ' Jl. Borobudur Rt 009 Rw 012 Kembangarum Semarang Barat Semarang ', '', '', '', 'KONTRAK', '9401782', '26ba6b943b5f4bd2b292c13754d21cc9', 'woman.png', 0),
(5781, '9431794', 'NOFALIA BONITA', '', 'Perempuan', 'Semarang', '1996-06-11', '27 Th 11 bl', 'PELAKSANA PERAWAT', 'POLIKLINIK', 2017, 2017, '7 Th ', '', 'Jl. Tambakaji Rt.003 Rw.XI Ngaliyan Smg', '', '', '', 'KONTRAK', '9431794', 'f8104092136d2ab21679f5ff2680d790', 'woman.png', 0),
(5782, '9471790', 'RUDDY HERMAWAN S', '', 'Laki-laki', 'Semarang', '1990-11-07', '33 Th 7 bln', 'PELAKSANA FISIOTERAPI', 'FISIOTERAPI', 2017, 2017, '7 Th ', '', 'Asrama Brimob Simongan 5168 Rt.001 Rw.009gisikdrono smg barat', '', '', '', 'KONTRAK', '9471790', 'ee3f2b7de99601c1cee4b5bdb1715f78', 'man.png', 0),
(5783, '9481788', 'FITRIA ERY SRI BUDIHARTI', '', 'Perempuan', 'semarang', '1989-05-05', '35 Th 1 bln', 'PELAKSANA PERAWAT IPCN', 'IPCN', 2017, 2017, '7 Th ', '', 'Perbalan Purwosari I No. 631 D Rt.009 Rw.002 Purwosari Smg Utara', '', '', '', 'KONTRAK', '9481788', '8ef861e0fa1b7c8fcc37063544be5d49', 'woman.png', 0),
(5784, '9491798', 'IKA DEWI IRFANTI', '', 'Perempuan', 'Kendal', '1999-08-06', '24 Th 10 bl', 'PELAKSANA HOUSEKEEPING', 'HOUSEKEEPING', 2017, 2017, '7 Th ', '', ' Krajan Rt 004 Rw 001 Matgosari Limbangan Kendal ', '', '', '', 'KONTRAK', '9491798', '659791ee005dc59984f8e611cc7eafbe', 'woman.png', 0),
(5785, '9501794', 'FANI PURWANTI', '', 'Perempuan', 'Kendal', '1996-04-10', '28 Th 2 bln', 'PELAKSANA PERAWAT', 'ARIMBI', 2017, 2017, '7 Th ', '', 'Dsn. Krajan Rt.003 Rw.002 Bebengan Boja Kendal', '', '', '', 'KONTRAK', '9501794', '91025ca6bf891507763a22460e7e42b0', 'woman.png', 0),
(5786, '9511797', 'TIARA LATHIFA', '', 'Perempuan', 'Semarang', '1997-02-05', '27 Th 4 bln', 'PELAKSANA TTK', 'FARMASI', 2017, 2017, '7 Th ', '', 'Dsn. Pandansari Rt.003 Rw.005 Tampingan Boja Kendal', '', '', '', 'KONTRAK', '9511797', 'dd293b77b227578617a0bcc173583513', 'woman.png', 0),
(5787, '9531782', 'ACHFANDI', '', 'Perempuan', 'semarang', '1982-08-12', '41 Th 9 bln', 'PELAKSANA HOUSEKEEPING', 'HOUSEKEEPING', 2017, 2017, '7 Th ', '', 'Jl. Sadewa V/15 Rt.004 Rw.003 Pendrikan Kidul Semarang Tengah', '', '', '', 'KONTRAK', '9531782', '577a33e5918897c619c47da09f433874', 'woman.png', 0),
(5788, '9601895', 'INTAN OCTAVIA WURI I', '', 'Perempuan', 'Kendal', '1997-01-10', '27 Th 5 bln', 'PELAKSANA BIDAN', 'IKB', 2018, 2018, '6 Th ', '', 'Perum Griya Praja Mukti Blok B No.11 Rt.002 Rw.006 Langenharjo Kendal', '', '', '', 'KONTRAK', '9601895', '9b8bf5eb42b7972f20c5971f840af5fa', 'woman.png', 0),
(5789, '9641892', 'TRIYOGA', '', 'Laki-laki', 'Kendal', '1992-10-07', '31 Th 8 bln', 'SUPERVISOR KEPERAWATAN', 'IGD', 2018, 2018, '6 Th ', '', ' Griya Praja Mukti E.11 Rt 001 Rw 007 Kendal ', '', '', '', 'KONTRAK', '9641892', '49bcec953a6e28fbbdd97e543ccde806', 'man.png', 0),
(5790, '9741891', 'NOPRITA LIYA KUSUMA', '', 'Perempuan', 'Kendal', '1991-06-11', '32 Th 11 bl', 'SUPERVISOR KEPERAWATAN', 'DEWI KUNTHI', 2018, 2018, '6 Th ', '', 'Jl. Raya 336 Kaliwungu  Rt. 008 Rw.001 Sarirejo Kaliwungu Kendal', '', '', '', 'KONTRAK', '9741891', '097d3eb7fcec76f98a06f2d451319543', 'woman.png', 0),
(5791, '9751893', 'ULFAH NUR HANIFAH', '', 'Perempuan', 'Pati', '1993-07-07', '30 Th 11 bl', 'SUPERVISOR KEPERAWATAN', 'POLIKLINIK', 2018, 2018, '6 Th ', '', 'Jl. Bukit Beringin Elok IX/ B-587 Rt. 003 Rw.014 Wonosari Ngaliyan Semarang', '', '', '', 'KONTRAK', '9751893', 'dee7f21440279bdbbb2b1703683a8149', 'woman.png', 0),
(5792, '9821893', 'SEKAR RAHMA ANDHINI', '', 'Perempuan', 'Semarang', '1995-02-12', '29 Th 3 bln', 'PELAKSANA PENDAFTARAN', 'PENDAFTARAN', 2018, 2018, '6 Th ', '', 'Wonosari Tengah II No.8 Rt.003 Rw.009 Wonosari Ngaliyan Semarang', '', '', '', 'KONTRAK', '9821893', '611e7b8340b5c8e92b9f0566e20a6454', 'woman.png', 0),
(5793, '9831892', 'CHOLIFATUN NISAK', '', 'Perempuan', 'Semarang', '1994-02-02', '30 Th 4 bln', 'KOORDINATOR PIUTANG', 'KASIR', 2018, 2018, '6 Th ', '', ' Jl. Nusa Indah 1 No. 52 Rt 002 Rw 005 Tambakaji Ngaliyan Semarang ', '', '', '', 'KONTRAK', '9831892', 'd8eaf20a9c2c2300e5682e66c1036004', 'woman.png', 0),
(5794, '9861894', 'DHITA ARMITASARI', '', 'Perempuan', 'Kendal', '1994-10-09', '29 Th 8 bln', 'SUPERVISOR KEPERAWATAN', 'RAMA SHINTA', 2018, 2018, '6 Th ', '', 'Perumahan Patebon Indah No.28 Rt.002 Rw.008 Patebon Kendal', '', '', '', 'KONTRAK', '9861894', 'ace5a6e6cd0f9a5476616b1f5db3654c', 'woman.png', 0),
(5795, '9871891', 'BAHARUDIN HERMAWANTO', '', 'Laki-laki', 'Rembang', '1991-05-06', '33 Th 1 bln', 'SUPERVISOR KEPERAWATAN', 'ICU', 2018, 2018, '6 Th ', '', 'Dsn. Rejowinangun Rt.004 Rw.002 Banjarejo Boja Kendal', '', '', '', 'KONTRAK', '9871891', '6ba51b8cb2e2e25f77fbecb32d8fd7f7', 'man.png', 0),
(5796, '9891890', 'DRG. HANA MURSALINA', '', 'Perempuan', 'Semarang', '1991-12-06', '32 Th 6 bln', 'KA. KOMITE PMKP', 'BIDANG KOMITE PMKP', 2018, 2018, '6 Th ', '', 'Jl. Ronggolawe III/8 Rt.001 Rw.008 GisikDrono Semarang Barat', '', '', '', 'KONTRAK', '9891890', 'b7fbbb038ecc1ed1dffb854e6ad04baf', 'woman.png', 0),
(5797, '9901895', 'MAULANA RANDY PRASETIYA', '', 'Laki-laki', 'Grobogan', '1997-05-08', '27 Th 1 bln', 'PELAKSANA PENDAFTARAN', 'PENDAFTARAN', 2018, 2018, '6 Th ', '', 'Lingkungan Nglejok Rt. 003 Rw. 014 Kuripan Purwodadi', '', '', '', 'KONTRAK', '9901895', 'd29eed85ca02cb91fe5d13ace904edf2', 'man.png', 0),
(5798, '9931875', 'ENY SULISTIYOWATI', '', 'Perempuan', 'Boyolali', '1975-10-06', '48 Th 8 bln', 'PELAKSANA BIDAN', 'POLIKLINIK', 2018, 2018, '6 Th ', '', 'Jl. Telasih No. 13 Rt.002 Rw.005 Pulisen Boyolali', '', '', '', 'KONTRAK', '9931875', 'c44b39a543393d9b1062840ee3cf91c8', 'woman.png', 0),
(5799, '9961894', 'LINA RAHMA F', '', 'Perempuan', 'Kendal', '1995-10-03', '28 Th 8 bln', 'SUPERVISOR KEPERAWATAN', 'IBS', 2018, 2018, '6 Th ', '', ' Griya Praja Mukti E.11 Rt 001 Rw 007 Kendal ', '', '', '', 'KONTRAK', '9961894', '7dec5dd95fd628677e900778788e1c7c', 'woman.png', 0),
(5800, '9971897', 'PUSPA AYU ARIYANANDA', '', 'Perempuan', 'Temanggung', '1997-12-01', '26 Th 6 bln', 'PELAKSANA PERAWAT', 'POLIKLINIK', 2018, 2018, '6 Th ', '', 'Bukit Beringin Asri D-36 Rt.003 Rw.016 Ngaliyan Semarang', '', '', '', 'KONTRAK', '9971897', 'efe50f8338ec4052cea8c2544ab77759', 'woman.png', 0),
(5801, '9991893', 'LUCIA DESI PRATIWI', '', 'Perempuan', 'Semarang', '1993-07-12', '30 Th 10 bl', 'SUPERVISOR KEPERAWATAN', 'HRD', 2018, 2018, '6 Th ', '', 'Jl. Subali Makam No. 36 Rt.001 Rw.002 Krapyak Semarang', '', '', '', 'KONTRAK', '9991893', '82a7f08a8af53903e438d09cfe50f287', 'woman.png', 0),
(5802, '10001899', 'MAURIEN ASTIZA CANDRA DEVANI', '', 'Perempuan', 'Pemalang', '2000-04-06', '24 Th 2 bln', 'PELAKSANA ASPER', 'RAMA SHINTA', 2018, 2018, '6 Th ', '', 'Winong Lor Rt.001 Rw.002 Gebang Purworejo', '', '', '', 'KONTRAK', '10001899', '5387a648c4a2160be7831af28c43d29b', 'woman.png', 0),
(5803, '10011899', 'SOFIYA ULUL AZMI', '', 'Perempuan', 'Grobogan', '2000-03-10', '24 Th 3 bln', 'PELAKSANA ASPER', 'ICU', 2018, 2018, '6 Th ', '', 'Dsn. Kayumas Rt.002 Rw.007 Menawan Klambu Grobogan', '', '', '', 'KONTRAK', '10011899', '9b2ddb043cb4c6255be948e9b54969bc', 'woman.png', 0),
(5804, '10031971', 'NOVI HERLINA', '', 'Perempuan', 'Semarang', '1971-10-11', '52 Th 7 bln', 'PELAKSANA PERAWAT', 'POLIKLINIK', 2019, 2019, '5 Th ', '', ' Jl. Anggraeni V/7 Rt 001 Rw 004 Bulu Lor Semarang Utara Semarang ', '', '', '', 'KONTRAK', '10031971', 'e2c30385367c7329ade617502e22e56f', 'woman.png', 0),
(5805, '10041995', 'KHOIRUN ANISAK S', '', 'Perempuan', 'Bantul', '1995-03-12', '29 Th 2 bln', 'PELAKSANA ASPER', 'IBS', 2019, 2019, '5 Th ', '', 'Geger Rt.001 Rw- Seloharjo Pundong Bantul DIY', '', '', '', 'KONTRAK', '10041995', '14c97793734d53373596a55d5ec2ae93', 'woman.png', 0),
(5806, '10051900', 'HILDA WIDI ASTUTI', '', 'Perempuan', 'Magelang', '2001-07-07', '22 Th 11 bl', 'PELAKSANA ASPER', 'IGD', 2019, 2019, '5 Th ', '', 'Dsn. Sampang Rt.005 Rw.002 Gondangrejo Windusari Magelang', '', '', '', 'KONTRAK', '10051900', '6097c59550e1996dd20d857f4b806283', 'woman.png', 0),
(5807, '10081997', 'EKA AYU YULIANTI', '', 'Perempuan', 'Grobogan', '1997-02-07', '27 Th 4 bln', 'PELAKSANA ASPER', 'POLIKLINIK', 2019, 2019, '5 Th ', '', 'Dsn. Mangonan Rt.002 Rw.005 Ds. Karangsari Brati Grobogan', '', '', '', 'KONTRAK', '10081997', '4deb2096627957b6974ff14c51a8e466', 'woman.png', 0),
(5808, '10091999', 'NUNUNG NUR AENI', '', 'Perempuan', 'Magelang', '1999-10-09', '24 Th 8 bln', 'PELAKSANA ADMINISTRASI', 'POLIKLINIK', 2019, 2019, '5 Th ', '', 'Susukan Rt.006 Rw.002 Grabag Magelang', '', '', '', 'KONTRAK', '10091999', 'fc65c2d47864bb5d542f608c3ef22872', 'woman.png', 0),
(5809, '10131991', 'FITRIYA NUR HAYATI', '', 'Perempuan', 'Semarang', '1992-08-04', '31 Th 10 bl', 'PELAKSANA RADIOGRAFER', 'RADIOLOGI', 2019, 2019, '5 Th ', '', 'Kp. Cepersari Rt.003 Rw.005 Srondol Kulon Banyumanik Semarang', '', '', '', 'KONTRAK', '10131991', 'c38fbe7974c18c15b73cbcf8965d970a', 'woman.png', 0),
(5810, '10141994', 'INDAH NUR ANIYAH', '', 'Perempuan', 'Semarang', '1995-06-06', '29 Th 0 bln', 'SUPERVISOR KEPERAWATAN', 'POLIKLINIK', 2019, 2019, '5 Th ', '', 'Jl. Tmn Karonsih Dlm No.969 Rt.001 Rw.004 Ngaliyan Semarang', '', '', '', 'KONTRAK', '10141994', '43f697149bd44585fb8bf4259cf4b44c', 'woman.png', 0),
(5811, '10161993', 'ERIN PRASTITI', '', 'Perempuan', 'Semarang', '1994-09-06', '29 Th 9 bln', 'PELAKSANA PERAWAT', 'IGD', 2019, 2019, '5 Th ', '', 'Jl. Sendang Indah Timur Rt.003 Rw.002 Muktiharjo Lor Genuk Semarang', '', '', '', 'KONTRAK', '10161993', '45b8f3a1f26e1cf8aa9d3db13ec41f52', 'woman.png', 0),
(5812, '10191987', 'BUDI LESTARI', '', 'Perempuan', 'Blora', '1987-05-03', '37 Th 1 bln', 'KOORDINATOR', 'REKAM MEDIS', 2019, 2019, '5 Th ', '', 'Jl. Candi Kencana Raya No. E 46 Ngaliyan Semarang', '', '', '', 'KONTRAK', '10191987', 'f52e77013f9a1dea91d881800e09b2c5', 'woman.png', 0),
(5813, '10201998', 'ARIANA KIKI WULANDARI', '', 'Perempuan', 'Magelang', '2000-07-08', '23 Th 11 bl', 'PELAKSANA ASPER', 'POLIKLINIK', 2019, 2019, '5 Th ', '', 'Kanci I Rt.002 Rw.003 Salamkanci Bandongan Magelang', '', '', '', 'KONTRAK', '10201998', '8b95a6ca5f62cf1cd29e75c906d40d8d', 'woman.png', 0),
(5814, '10221999', 'RISKI YULIANA', '', 'Perempuan', 'Kab.Semarang', '2000-02-07', '24 Th 4 bln', 'PELAKSANA ASPER', 'IKB', 2019, 2019, '5 Th ', '', 'Dusun Sruwen Rt.008 Rw.004 Ds. Bergas Kidul Kec. Bergas', '', '', '', 'KONTRAK', '10221999', '79e486ec2407984ecf3012cb058bc0aa', 'woman.png', 0),
(5815, '10261998', 'FINTANA MEILA WIGATI', '', 'Perempuan', 'Magelang', '1999-10-05', '24 Th 8 bln', 'PELAKSANA ASPER', 'POLIKLINIK', 2019, 2019, '5 Th ', '', 'Salakan Rt.002 Rw.008 Kwaderan Kejoran Magelang', '', '', '', 'KONTRAK', '10261998', '003b997ff3e17f067fec29a13aa78eb4', 'woman.png', 0),
(5816, '10321992', 'DEWI RISTYANING YULIASTUTI', '', 'Perempuan', 'Jepara', '1992-08-07', '31 Th 10 bl', 'PELAKSANA ADMINISTRASI', 'ARIMBI', 2019, 2019, '5 Th ', '', 'Ds. Banyumanik Rt 001/06 Kec. Donorojo Jepara', '', '', '', 'KONTRAK', '10321992', 'eba82a77da9e607fa7af7b95e5a8eeba', 'woman.png', 0),
(5817, '10351982', 'SRI REJEKI', '', 'Perempuan', 'Semarang', '1984-04-12', '40 Th 1 bln', 'PELAKSANA HOUSEKEEPING', 'HOUSEKEEPING', 2019, 2019, '5 Th ', '', 'Jl. Klampisan Rt.006 Rw.002 Ngaliyan Semarang', '', '', '', 'KONTRAK', '10351982', 'c656045705cd5fdf72f0ba374e865efd', 'woman.png', 0),
(5818, '10361987', 'ABDUL BASIT', '', 'Laki-laki', 'Kendal', '1989-05-03', '35 Th 1 bln', 'PELAKSANA HOUSEKEEPING', 'HOUSEKEEPING', 2019, 2019, '5 Th ', '', 'Desa Leban Rt 03 Rw 01 Kec. Boja Kab.Kendal', '', '', '', 'KONTRAK', '10361987', '16b127553f15256bc34c37c28f015874', 'man.png', 0),
(5819, '10391997', 'NANDA RIZKI APRILIA', '', 'Perempuan', 'Semarang', '1998-01-04', '26 Th 5 bln', 'PELAKSANA PERAWAT', 'RAMA SHINTA', 2019, 2019, '5 Th ', '', 'Jl. Sadeng Rt 06 Rw 01 Kec Gunungpati', '', '', '', 'KONTRAK', '10391997', '9c707fa32c5841dc18392536d2327993', 'woman.png', 0),
(5820, '10451996', 'KHOIRUR ROZIQIN', '', 'Laki-laki', 'Kab. Semarang', '1996-07-05', '27 Th 11 bl', 'PELAKSANA HOUSEKEEPING', 'HOUSEKEEPING', 2019, 2019, '5 Th ', '', 'Dsn Cemanggah Kidul RT 002 RW 004 Branjang Ungaran Barat', '', '', '', 'KONTRAK', '10451996', '4b6ca32fd915842e2c296c56b9a04a82', 'man.png', 0),
(5821, '10571995', 'ARINI FIRDANINGRUM', '', 'Perempuan', 'Semarang', '1997-02-11', '27 Th 3 bln', 'PELAKSANA PERAWAT', 'ICU', 2019, 2019, '5 Th ', '', 'Ds. Mangunharjo RT 003 RW 001 Kec. Tugu Semarang', '', '', '', 'KONTRAK', '10571995', '749a373e03e888c9b4d421b558a0b9db', 'woman.png', 0),
(5822, '10601984', 'DR. ARIA WINDY MAHARDHIKA SP AN', '', 'Laki-laki', 'Semarang', '1985-02-11', '39 Th 3 bln', 'KA.INSTALASI ICU', 'PELAYANAN MEDIS', 2019, 2019, '5 Th ', '', 'Jl. Pamularsih No. 109 Rt 001 Rw 003 Gisikdrono Semarang', '', '', '', 'KONTRAK', '10601984', 'd88e737a45aff316bbcde2da2f1a05d4', 'man.png', 0),
(5823, '10611986', 'ANI AGUSTRIANI', '', 'Perempuan', 'Semarang', '1987-03-08', '37 Th 3 bln', 'APOTEKER  SATELIT', 'FARMASI', 2019, 2019, '5 Th ', '', 'Jl. Sriwidodo Utara RT 007 RW 001 Purwoyoso Ngaliyan Semarang', '', '', '', 'KONTRAK', '10611986', '7769638ebfd8a2abe1de190f3eed7039', 'woman.png', 0),
(5824, '10741998', 'ANINDITA GALUH FITRIANA', '', 'Perempuan', 'semarang', '2000-07-01', '23 Th 11 bl', 'PELAKSANA TTK', 'FARMASI', 2019, 2019, '5 Th ', '', 'Jl. Purwosari II/3 RT 05/RW 07 Kelurahan Rejosari Kecamatan Semarang Timur', '', '', '', 'KONTRAK', '10741998', 'aa7176a62eea0652a487cd7543ea3e12', 'woman.png', 0),
(5825, '10792091', 'TONI WIBOWO', '', 'Laki-laki', 'Semarang', '1991-09-09', '32 Th 9 bln', 'PELAKSANA TEHNISI', 'IPSRS', 2020, 2020, '4 Th ', '', 'Gg. Santer RT 02 RW 06 Kel. Weleri Kec. Weleri Kab. Kendal', '', '', '', 'KONTRAK', '10792091', '16b3d7f5653a9d6d67fda0576c6e07c5', 'man.png', 0),
(5826, '10842092', 'ARQY WIDYA PRATAMA', '', 'Perempuan', 'Surakarta', '1992-06-06', '32 Th 0 bln', 'PELAKSANA RADIOGRAFER', 'RADIOLOGI', 2020, 2020, '4 Th ', '', 'Jl. Sri Rejeki II No. 4 Semarang Barat', '', '', '', 'KONTRAK', '10842092', '2d1dc3ede32bb825cb450c513e9dcdc0', 'woman.png', 0),
(5827, '10872099', 'KINTAN MAY PRATIWI', '', 'Perempuan', 'Semarang', '2000-08-05', '23 Th 10 bl', 'PELAKSANA CASEMIX', 'PENDAFTARAN', 2020, 2020, '4 Th ', '', 'Kp. Duwet RT 05 RW 10 Ngaliyan Semarang', '', '', '', 'KONTRAK', '10872099', '6f324cec1017c3420d462b5d4c8befd4', 'woman.png', 0),
(5828, '10962188', 'DR. MIRANTIKA EMMA YUSUF RESTUMINA, SP.PD', '', 'Perempuan', 'Semarang', '1990-03-05', '34 Th 3 bln', 'PELAKSANA MEDIS', 'PELAYANAN MEDIS', 2018, 2018, '6 Th ', '', 'Pusponjolo Selatan IV/5 Rt.005 Rw.005 Bojongsalaman Semarang Barat', '', '', '', 'KONTRAK', '10962188', 'acf928caa2fcdec4c19beaedf5322dd2', 'woman.png', 0),
(5829, '10991895', 'MEGA ARUM SARI', '', 'Perempuan', 'Boyolali', '1996-02-08', '28 Th 4 bln', 'PELAKSANA BIDAN', 'IKB', 2018, 2018, '6 Th ', '', 'Sidorejo RT 02 RW 01, Mojolegi, Teras, Boyolali', '', '', '', 'KONTRAK', '10991895', 'd3c71acb576e2de6636ada93dd6e2a8f', 'woman.png', 0),
(5830, '11002079', 'ABDUL KARIM', '', 'Laki-laki', 'Semarang', '1979-02-02', '45 Th 4 bln', 'PELAKSANA DRIVER', 'DRIVER', 2020, 2020, '4 Th ', '', 'Kedungwinong RT 02 RW 03 Meteseh Tembalang', '', '', '', 'KONTRAK', '11002079', '5288d446e41824b97b50f6fc922eb1cf', 'man.png', 0),
(5831, '11020752', 'SUPADI', '', 'Laki-laki', 'Semarang', '1952-04-05', '72 Th 2 bln', 'PELAKSANA GARDENER', 'GARDENER', 2007, 2007, '17 Th ', '', ' Ngaliyan Rt 001 Rw 001 Ngaliyan Semarang ', '', '', '', 'KONTRAK', '11020752', '9172c1bba56ea9cbb093006a8818de81', 'man.png', 0),
(5832, '11030869', 'JUPRI', '', 'Laki-laki', 'Kendal', '1970-05-06', '54 Th 1 bln', 'PELAKSANA GARDENER', 'GARDENER', 2008, 2008, '16 Th ', '', ' Kaliancar Rt 002 Rw 001 Podorejo Ngaliyan Semarang ', '', '', '', 'KONTRAK', '11030869', '13ec3d0c52ad417927d504ecdb92ae1d', 'man.png', 0),
(5833, '11092193', 'SEPTIAN BATARA', '', 'Laki-laki', 'Kendal', '1994-01-09', '30 Th 5 bln', 'SUPERVISOR KEPERAWATAN', 'IGD', 2021, 2021, '3 Th ', '', 'Kebonagung Rt.001 Rw.002 Ngampel Kendal', '', '', '', 'KONTRAK', '11092193', 'e67bced06f828b39455f40e303ebea5c', 'man.png', 0),
(5834, '11172296', 'DR. NUZULA FIKRIN NABILA', '', 'Perempuan', 'Malang', '1996-07-02', '27 Th 11 bl', 'KOMITE PPI & KABID. MEDIS', 'KOMITE PPI', 2022, 2022, '2 Th ', '', 'Jl. Julung Wangi I/249 Rt.001 Rw.005 Krapyak Semarang Barat', '', '', '', 'KONTRAK', '11172296', '6e2d15a7f74cd5a0e9dc4ae774f4a9d8', 'woman.png', 0),
(5835, '11182297', 'NUR KUMALADEWI', '', 'Perempuan', 'Semarang', '1999-02-06', '25 Th 4 bln', 'PELAKSANA FISIOTERAPI', 'FISIOTERAPI', 2022, 2022, '2 Th ', '', 'Wonosari Rt.004 Rw.008 WonosariNgaliyan Semarang', '', '', '', 'KONTRAK', '11182297', '9a9dcc039ff70628b71d62534ee3c6b8', 'woman.png', 0),
(5836, '11192299', 'ALFAMAY LIFIA KUSUMA', '', 'Perempuan', 'Semarang', '1999-07-05', '24 Th 11 bl', 'PELAKSANA PERAWAT', 'POLIKLINIK', 2022, 2022, '2 Th ', '', 'Perum Bukit Mandiri Beringin Blok T/I Rt.014 Rw.016 Bringin Ngaliyan Semarang', '', '', '', 'KONTRAK', '11192299', '95f1fd5f32cb7267bfd21e50fbd6fc15', 'woman.png', 0),
(5837, '11202286', 'SRI WAHYUNINGSIH', '', 'Perempuan', 'Kendal', '1986-11-07', '37 Th 7 bln', 'SUPERVISOR KEPERAWATAN', 'DEWI KUNTHI', 2022, 2022, '2 Th ', '', 'Ds. Blorok Sembung Rt.001 Rw.002 Brangsong Kendal', '', '', '', 'KONTRAK', '11202286', '5a36f952edf09e392421bfa31f817dbb', 'woman.png', 0),
(5838, '11232297', 'ANI MAFTUCHAH', '', 'Perempuan', 'Kendal', '1999-06-03', '25 Th 0 bln', 'SUPERVISOR KEPERAWATAN', 'IGD', 2022, 2022, '2 Th ', '', 'Dsn. Seklotok Rt.008 Rw.001 Getas Singorojo Kendal', '', '', '', 'KONTRAK', '11232297', '127b8a186469086c0f529875162192f8', 'woman.png', 0),
(5839, '11242298', 'RIDAYA SIS QOMARULLAH', '', 'Laki-laki', 'Kendal', '2000-07-05', '23 Th 11 bl', 'SUPERVISOR KEPERAWATAN', 'IGD', 2022, 2022, '2 Th ', '', 'Dk. Sembung Rt.001 Rw.002 Ds. Blorok Brangsong Kendal', '', '', '', 'KONTRAK', '11242298', '7eb9a6197eafbe580d95e901a8a4a24c', 'man.png', 0),
(5840, '11252283', 'YATIMAN', '', 'Laki-laki', 'Semarang', '1985-02-06', '39 Th 4 bln', 'PELAKSANA PORTIR', 'SECURITY', 2022, 2022, '2 Th ', '', 'Randugarut Rt.001 Rw.002 Kel. Randu Garut Tugu Semarang', '', '', '', 'KONTRAK', '11252283', 'ea7e9821848773f8ed0b2e323f2240c3', 'man.png', 0),
(5841, '11262284', 'AHMAD SAEFODIN', '', 'Laki-laki', 'Semarang', '1985-03-06', '39 Th 3 bln', 'PELAKSANA HOUSEKEEPING', 'HOUSEKEEPING', 2022, 2022, '2 Th ', '', 'Dk. Jatibarang RT/RW.001/001 Kedungpani Mijen Semarang', '', '', '', 'KONTRAK', '11262284', '49df07850cf2c19c141f267613f41a55', 'man.png', 0),
(5842, '11272294', 'BAHAR WIDAYANTO', '', 'Laki-laki', 'Kendal', '1994-06-06', '30 Th 0 bln', 'PELAKSANA KURIR / FILLING', 'REKAM MEDIS', 2022, 2022, '2 Th ', '', 'Dsn. Simbang Rt.001 Rw.005 Bebengan Boja Kendal', '', '', '', 'KONTRAK', '11272294', 'a944c396b3976539974507f0e183bee3', 'man.png', 0),
(5843, '11282200', 'ASTI DIAH SAFITRI', '', 'Perempuan', 'Semarang', '2001-07-06', '22 Th 11 bl', 'PELAKSANA PERAWAT', 'RAMA SHINTA', 2022, 2022, '2 Th ', '', 'Mangunharjo Rt.009 Rw. 003 Mangunharjo Tugu Semarang', '', '', '', 'KONTRAK', '11282200', 'f3e5c0499410ce51d6321f79dde7579c', 'woman.png', 0),
(5844, '11292200', 'MAULUDA FITRIYANA', '', 'Perempuan', 'Semarang', '2000-08-01', '23 Th 10 bl', 'PELAKSANA PERAWAT', 'DEWI KUNTHI', 2022, 2022, '2 Th ', '', 'Jl. Kalikangkung No. 85 Rt.001 Rw.001 Ngaliyan Semarang', '', '', '', 'KONTRAK', '11292200', '88a73f7278ff5d0c045be89d8d9033b4', 'woman.png', 0),
(5845, '11302294', 'INNA MUSFIRATUN', '', 'Perempuan', 'Demak', '1994-11-04', '29 Th 7 bln', 'PELAKSANA CASEMIX', 'CASEMIX', 2022, 2022, '2 Th ', '', 'Kedungpani Rt.001 Rw.011 Ngaliyan Semarang', '', '', '', 'KONTRAK', '11302294', 'c7740bcadb923702264b9d0f40d59627', 'woman.png', 0),
(5846, '11312295', 'GIAT', '', 'Laki-laki', 'Pekalongan', '1996-08-08', '27 Th 10 bl', 'PELAKSANA CASEMIX', 'CASEMIX', 2022, 2022, '2 Th ', '', 'Dk. Karangwringin Rt.004 Rw.002 Trajumas Kandangserang Pekalongan', '', '', '', 'KONTRAK', '11312295', '8ea7ad608f63fd35f85d52d4c66f4f99', 'man.png', 0),
(5847, '11322288', 'WIRAWAN MUKTI JAYANTO', '', 'Laki-laki', 'Semarang', '1990-03-05', '34 Th 3 bln', 'AHLI GIZI', 'GIZI', 2022, 2022, '2 Th ', '', 'Jl. Raya Wates Rt.005 Rw.003 Wates Ngaliyan Semarang', '', '', '', 'KONTRAK', '11322288', 'a03879c0ac2e230aecd5250175fffb17', 'man.png', 0),
(5848, '11332200', 'WIWIK SAFITRI', '', 'Perempuan', 'Kendal', '2002-01-09', '22 Th 5 bln', 'PELAKSANA PERAWAT', 'RAMA SHINTA', 2022, 2022, '2 Th ', '', 'Ds. Medono Rt.004 Rw.002 Kec. Boja Kab. Kendal', '', '', '', 'KONTRAK', '11332200', '1f83d42202ff82d48c4c40aee5d5eaf8', 'woman.png', 0),
(5849, '11342298', 'ERISKA SUSILOWATI', '', 'Perempuan', 'Kendal. 03 Januari 1998', '1998-03-01', '26 Th 3 bln', 'PELAKSANA PERAWAT', 'DEWI KUNTHI', 2022, 2022, '2 Th ', '', 'Ds. Ngareanak Rt.002 Rw.006 Singorojo Kendal', '', '', '', 'KONTRAK', '11342298', '4e30c7a3ac4ba989708efbf17f7e9c26', 'woman.png', 0),
(5850, '11362295', 'AHADIYAH NORMA FELAYATI', '', 'Perempuan', 'Kendal', '1996-03-04', '28 Th 3 bln', 'PELAKSANA PERAWAT', 'ARIMBI', 2022, 2022, '2 Th ', '', 'Ds. Lanji Rt.007 rw.001 patebon kendal', '', '', '', 'KONTRAK', '11362295', '6dd8392e2c2850d3c2b1a54233e1176e', 'woman.png', 0),
(5851, '11372294', 'VIVY SETYANI W', '', 'Perempuan', 'Semarang', '1995-07-10', '28 Th 11 bl', 'SUPERVISOR KEPERAWATAN', 'DEWI KUNTHI', 2022, 2022, '2 Th ', '', 'Jl. Lobak Rt.007 Rw.005 Sendangguwo Tembalang Semarang', '', '', '', 'KONTRAK', '11372294', '9044a1fa84cea137000689e1311f1b79', 'woman.png', 0),
(5852, '11432299', 'ARUM ROCHIMA', '', 'Perempuan', 'Semarang', '1999-09-10', '24 Th 9 bln', 'PELAKSANA ADMINISTRASI', 'FARMASI', 2022, 2022, '2 Th ', '', 'Jl. Srikaton Barat Rt.007 Rw.007 Purwoyoso Ngaliyan Semarang', '', '', '', 'KONTRAK', '11432299', 'b9071ab6929311464a17852fdbe21b36', 'woman.png', 0),
(5853, '11462290', 'DR. RACHMA PURNAM,A SARI, Sp.THT.KL', '', 'Perempuan', 'Semarang', '1990-04-04', '34 Th 2 bln', 'KA. KOMITE MEDIK &KA. INSTALASI IBS', 'PELAYANAN MEDIS', 2022, 2022, '2 Th ', '', 'Jl. Menoreh III No. 25 Rt.001 Rw.007 Sampangan gajahmungkur Semarang 50236', '', '', '', 'KONTRAK', '11462290', 'cb9018fd3844dc9543d179954e17faeb', 'woman.png', 0),
(5854, '11492200', 'EKA APRILIA NURAIDA', '', 'Perempuan', 'Semarang', '2000-10-04', '23 Th 8 bln', 'PELAKSANA TTK', 'FARMASI', 2022, 2022, '2 Th ', '', 'Jl. Margosari Baru Rt.007 Rw.007 Sawah Besar Gayamsari Semarang', '', '', '', 'KONTRAK', '11492200', '9e4295f27cbe3fb0f641c9b50dea04b9', 'woman.png', 0),
(5855, '11542297', 'DIYAS MAUIDLOTUL HASANAH', '', 'Perempuan', 'Kendal', '1997-07-03', '26 Th 11 bl', 'PELAKSANA PERAWAT', 'DEWI KUNTHI', 2022, 2022, '2 Th ', '', 'Ds. Campurejo Rt.003 Rw.004 Boja Kendal', '', '', '', 'KONTRAK', '11542297', '2481f3693354fbeec982c201e2da9167', 'woman.png', 0),
(5856, '11572298', 'FENI RACHMAWATI', '', 'Perempuan', 'Semarang', '1998-02-01', '26 Th 4 bln', 'PELAKSANA PERAWAT', 'DEWI KUNTHI', 2022, 2022, '2 Th ', '', 'Ngadirgo Rt.002 Rw.005 Mijen Semarang', '', '', '', 'KONTRAK', '11572298', '0b8f445d953a371eb0c9ea505115ff17', 'woman.png', 0),
(5857, '11592298', 'MESI DAYANI', '', 'Perempuan', 'Semarang', '2000-02-02', '24 Th 4 bln', 'PELAKSANA PERAWAT', 'ARIMBI', 2022, 2022, '2 Th ', '', 'Jl. Cilosari No.570 Rt.001 Rw.002 Bugangan Semarang Timur Semarang', '', '', '', 'KONTRAK', '11592298', '994372fbb39ab15671a624293a1e3f8f', 'woman.png', 0),
(5858, '11622299', 'TAMARA ELOK SAPUTRI', '', 'Perempuan', 'Kendal', '2001-01-07', '23 Th 5 bln', 'PELAKSANA ANALIS', 'LABORATORIUM', 2022, 2022, '2 Th ', '', 'Dsn. Nglorok Rt.001 Rw.003 Campurejo Boja Kendal', '', '', '', 'KONTRAK', '11622299', 'bea8d45092ae6169ed23dd1d69e7e5d2', 'woman.png', 0),
(5859, '11662299', 'ULIL AMRI', '', 'Laki-laki', 'Semarang', '1998-04-01', '26 Th 2 bln', 'PELAKSANA OB', 'OB', 2022, 2022, '2 Th ', '', 'Tugurejo Rt.009 Rw.001 Tugurejo Tugu Semarang', '', '', '', 'KONTRAK', '11662299', '7a16344b1a3e7e6fee0afefaaf28f5ea', 'man.png', 0),
(5860, '11682286', 'RUBIYANTO', '', 'Laki-laki', 'Kendal', '1985-07-08', '38 Th 11 bl', 'PELAKSANA HOUSEKEEPING', 'HOUSEKEEPING', 2022, 2022, '2 Th ', '', 'Bentur Rt.003 Rw.005 Purwosari Mijen Semarang', '', '', '', 'KONTRAK', '11682286', 'e99ae6ad4e5b7bb75d9341757326f004', 'man.png', 0),
(5861, '11692296', 'ARIEF MUTTAQIEN', '', 'Laki-laki', 'Salatiga', '1996-08-05', '27 Th 10 bl', 'PELAKSANA HOUSEKEEPING', 'HOUSEKEEPING', 2022, 2022, '2 Th ', '', 'Wonosari Rt.002 Rw.009 WonosariNgaliyan Semarang', '', '', '', 'KONTRAK', '11692296', '0d131310b6a7300d7df55418bdeae564', 'man.png', 0),
(5862, '11702269', 'ISHAK SAMUEL LEMA', '', 'Laki-laki', 'Kupang', '1970-01-08', '54 Th 5 bln', 'KOORDINATOR', 'SECURITY', 2022, 2022, '2 Th ', '', 'Jatisari Asabri D6/2 Rt.009 Rw.010 Jatisari Mijen Semarang', '', '', '', 'KONTRAK', '11702269', 'e8e3023b8ed0990188a61fce0397a12c', 'man.png', 0),
(5863, '11712278', 'YETI WIDYANINGSIH', '', 'Perempuan', 'Surakarta', '1979-06-03', '45 Th 0 bln', 'PELAKSANA', 'POLIKLINIK', 2022, 2022, '2 Th ', '', 'Surtikanti Tengah V No.11 Rt.002 Rw.001 Bulu Lor Semarang Utara Smg', '', '', '', 'KONTRAK', '11712278', '862d018a63f529ac2f5c564d77999138', 'woman.png', 0),
(5864, '11722295', 'SHELLY SETIANS FEBRIANTI', '', 'Perempuan', 'Denpasar', '1995-11-06', '28 Th 7 bln', 'PELAKSANA RADIOLOGI', 'RADIOLOGI', 2024, 2024, '0 Th ', '', 'Jl. Wismasari IV No. 15 Rt.001 Rw.008 Kel. Ngaliyan Kec. Ngaliyan Semarang', '', '', '', 'KONTRAK', '11722295', '18446c79bcc1acd90126364504991a70', 'woman.png', 0),
(5865, '11732200', 'DEVI SINTA DEWI', '', 'Perempuan', 'Semarang', '2000-12-10', '23 Th 6 bln', 'PELAKSANA', 'FISIOTERAPI', 2022, 2022, '2 Th ', '', 'Jl. Srikaton Utara Rt.001 Rw.005 Purwoyoso Ngaliyan Semarang', '', '', '', 'KONTRAK', '11732200', 'c137c9940ead8ac97649668ee454d10f', 'woman.png', 0),
(5866, '11752294', 'RETTY DIAH HAPSARI', '', 'Perempuan', 'Semarang', '1996-06-03', '28 Th 0 bln', 'KA. INSTALASI FARMASI', 'FARMASI', 2022, 2022, '2 Th ', '', 'Banyumanik Timur Rt.007 Rw.002 Banyumanik Semarang', '', '', '', 'KONTRAK', '11752294', '5e43f62909e17351e12e4cfb11a25040', 'woman.png', 0),
(5867, '11772203', 'CELLIA PUPUT SUTINA', '', 'Perempuan', 'Semarang', '2004-09-06', '19 Th 9 bln', 'PELAKSANA TTK', 'FARMASI', 2022, 2022, '2 Th ', '', 'Jl. Pengilon V Rt.005 Rw.002 Beringin Ngaliyan Semarang', '', '', '', 'KONTRAK', '11772203', '595c8684e70fd26f998e7f274d34a4fc', 'woman.png', 0),
(5868, '11782296', 'YUNIKA AFIANTI', '', 'Perempuan', 'Sleman', '1998-04-06', '26 Th 2 bln', 'PELAKSANA TTK', 'FARMASI', 2022, 2022, '2 Th ', '', 'Perum CGS Blok E. 8 No. 32 Rt.003 Rw.016 Simpangan Cikarang Utara Bekasi', '', '', '', 'KONTRAK', '11782296', 'fc658d7415fe8315559c8ca9cbfeb217', 'woman.png', 0),
(5869, '11792298', 'DR. MUHAMMAD FAIZ HAIDAR RAFI', '', 'Laki-laki', 'Semarang', '1998-02-05', '26 Th 4 bln', 'KA. BAGIAN HUMAS DAN MARKETING DAN SIM RS', 'PELAYANAN MEDIS', 2022, 2022, '2 Th ', '', 'Dk. Dondong Rt.001 Rw.006 Wonosari Ngaliyan', '', '', '', 'KONTRAK', '11792298', '187d8ad3291f4499f678affa834ab9ab', 'man.png', 0),
(5870, '11802262', 'DR. GRANGSANG IMAM PURWOHADI', '', 'Laki-laki', 'Yogyakarta', '1962-09-24', '61 Th 8 bln', 'KA. KOMITE ETIK DAN HUKUM', 'PELAYANAN MEDIS', 2022, 2022, '2 Th ', '', 'Jl. Jatingaleh III No.37 Rt.002 Rw.004 Jatingaleh Candisari Semarang', '', '', '', 'KONTRAK', '11802262', 'c619219a5d00e1fec9c799ce79f10cf8', 'man.png', 0),
(5871, '11812299', 'DR. TIARA AUGUSTINA PUTRI', '', 'Perempuan', 'Malang', '1999-08-17', '24 Th 9 bln', 'KASIE PENUNJANG MEDIS', 'PENUNJANG MEDIS', 2022, 2022, '2 Th ', '', 'Pondok Blimbing Indah D3/3 Malang', '', '', '', 'KONTRAK', '11812299', 'c7d8b2a256c76b9438194371cda7ea23', 'woman.png', 0),
(5872, '11822297', 'AGUSTIAN DWI PRADANA', '', 'Laki-laki', 'Semarang', '1997-08-04', '26 Th 10 bl', 'KOORDINATOR TEKNISI MEDIS', 'TEKNISI MEDIS', 2022, 2022, '2 Th ', '', 'Jl. Jatiluhur No.391 Rt.002 Rw.004 Ngesrep Banyumanik Semarang', '', '', '', 'KONTRAK', '11822297', '94ed1230ab96310f2cec6cf05a6c9231', 'man.png', 0),
(5873, '11832297', 'ALDEA AMALIA KHOIRUNNISA', '', 'Perempuan', 'Semarang', '1997-09-18', '26 Th 8 bln', 'KOORDINATOR FARMASI RAWAT JALAN', 'FARMASI', 2022, 2022, '2 Th ', '', 'Jl. Wahyu Asri XI/D-47 Rt.006 Rw.006 Tambakaji Ngaliyan Semarang', '', '', '', 'KONTRAK', '11832297', 'ec0600afb2939111a25ac1fae946e06b', 'woman.png', 0),
(5874, '11842200', 'SALSABILA NUR ZAIYANA', '', 'Perempuan', 'Cilacap', '2000-10-17', '23 Th 7 bln', 'PELAKSANA TTK', 'FARMASI', 2022, 2022, '2 Th ', '', 'Jl. Letkol Sudarsono Rt.006 Rw.001 Bajing Kroya Cilacap', '', '', '', 'KONTRAK', '11842200', '6c2fcba4d3944f99985427dd62da8bfa', 'woman.png', 0),
(5875, '11852201', 'NOVITA AGUSTINA', '', 'Perempuan', 'Kendal', '2001-08-01', '22 Th 10 bl', 'PELKSANA TTK', 'FARMASI', 2022, 2022, '2 Th ', '', 'Ds. Tambakrejo RT.001 Rw.001 Tambakrejo Patebon Kendal', '', '', '', 'KONTRAK', '11852201', '3c4b302a6b6f8700db1290976fb93577', 'woman.png', 0),
(5876, '11862292', 'PANDU KURNIANTO', '', 'Laki-laki', 'Blora', '1992-10-20', '31 Th 7 bln', 'FISIKAWAN MEDIS', 'FISIKAWAN MEDIS', 2022, 2022, '2 Th ', '', 'Jl. Lodan 3 Rt 003 Rw 003 Bandarharjo Semarang Utara Semarang', '', '', '', 'KONTRAK', '11862292', '7851c8bbcdad0aa0b32d70339ba4ecb9', 'man.png', 0),
(5877, '11882297', 'Diana', '', 'Perempuan', 'Kendal', '1997-07-14', '26 Th 10 bl', 'PELAKSANA PERAWAT', 'RAMA SHINTA', 2022, 2022, '2 Th ', '', 'Rembes Rt.005 Rw.003 Sidodadi Patean Kendal', '', '', '', 'KONTRAK', '11882297', '2ca17ba422e12bc4a162fd0d18b3eb97', 'woman.png', 0),
(5878, '11892298', 'Elvica Sari', '', 'Perempuan', 'Lawang', '1998-10-23', '25 Th 7 bln', 'PELAKSANA PERAWAT', 'DEWI KUNTHI', 2022, 2022, '2 Th ', '', 'Jl. Rivera II AE-2 No.16 Rt.001 Rw.017 Beringin Ngaliyan Semarang', '', '', '', 'KONTRAK', '11892298', 'ea62bcc2f369475436c473c514e6ce2c', 'woman.png', 0),
(5879, '11902298', 'Shely Vionica', '', 'Perempuan', 'Kendal', '1998-09-13', '25 Th 8 bln', 'PELAKSANA PERAWAT', 'IGD', 2022, 2022, '2 Th ', '', 'Dsn. Kebonadem Rt.003 Rw.003 Merbuh Singorojo Kendal', '', '', '', 'KONTRAK', '11902298', '21cddb2dfc6a548c65336a2a0c0f78da', 'woman.png', 0),
(5880, '11922297', 'Aditya Dwi Meilani, S.Farm, Apt', '', 'Perempuan', 'Ketapang', '1997-05-02', '27 Th 1 bln', 'APOTEKER', 'FARMASI', 2022, 2022, '2 Th ', '', 'Bukit Beringin Asri Blok B.7 Rt.001 Rw.015 Tambakaji Ngaliyan Semarang', '', '', '', 'KONTRAK', '11922297', '7a64bbc170c5890523f06c56f838dea2', 'woman.png', 0),
(5881, '11952200', 'FEBRI ARUM SAPUTRI', '', 'Perempuan', 'Kendal', '2000-02-19', '24 Th 3 bln', 'PELAKSANA KASIR', 'KASIR', 2022, 2022, '2 Th ', '', 'Jl. Pramuka No.16 Rt.005 Rw.007 Boja Kendal', '', '', '', 'KONTRAK', '11952200', '116956bbda2a9a3b6b6e3e967bfa6875', 'woman.png', 0),
(5882, '11962201', 'FARAH NADZIRUL HIKMAH', '', 'Perempuan', 'Sleman', '2001-01-25', '23 Th 4 bln', 'PELAKSANA RADIOGRAFER', 'RADIOLOGI', 2022, 2022, '2 Th ', '', 'Sambak Rt.004 Rw.005 Danyang Purwodadi Grobogan ', '', '', '', 'KONTRAK', '11962201', '6a70d1b95a0d21502c7db23f60271ef1', 'woman.png', 0),
(5883, '11972299', 'Eric Bayu Arianto', '', 'Laki-laki', 'Semarang', '1999-09-23', '24 Th 8 bln', 'PELAKSANA RADIOGRAFER', 'RADIOLOGI', 2022, 2022, '2 Th ', '', 'Medoho Seruni Rt.002 Rw.004 Sambirejo Gayamsari Semarang', '', '', '', 'KONTRAK', '11972299', 'ee7034372acc177d2050e5ea98bd34f0', 'man.png', 0),
(5884, '11992200', 'ANISA AYU FEBRIALMA', '', 'Perempuan', 'Grobogan', '2000-02-03', '24 Th 4 bln', 'BIDANG ADMINITRASI DAN KEPEGAWAIAN', 'HRD', 2022, 2022, '2 Th ', '', 'Jl. Soponyono V/51 Rt.010 Rw.021 Purwodadi Grobogan', '', '', '', 'KONTRAK', '11992200', 'aedb15e979775a652bb762b06820894c', 'woman.png', 2),
(5885, '12012201', 'NADIA LAILITA PUTRI FATIN', '', 'Perempuan', 'Semarang', '2001-12-26', '22 Th 5 bln', 'PELAKSANA PERAWAT', 'ICU', 2022, 2022, '2 Th ', '', 'Jl. Kri Dewaruci Rumdin TNI-AL Rt. 002 Rw. 005 Kalibannteng Kidul Semarang Barat Semarang', '', '', '', 'KONTRAK', '12012201', 'a2c69a5d93c5d85a914ffc0a9af27d33', 'woman.png', 0),
(5886, '12022293', 'AJENG PRASASTI', '', 'Perempuan', 'Semarang', '1993-06-06', '31 Th 0 bln', 'PELAKSANA PERAWAT', 'POLIKLINIK', 2022, 2022, '2 Th ', '', 'Dk. Jatibarang Rt. 003 Rw. 001 Kedungpani Mijen Semarang', '', '', '', 'KONTRAK', '12022293', 'f2608f4d651b4b82b50c9088d4283865', 'woman.png', 0),
(5887, '12032298', 'TRI SETYANINGSIH', '', 'Perempuan', 'Kendal', '1998-05-15', '26 Th 0 bln', 'PELAKSANA PERAWAT', 'ARIMBI', 2022, 2022, '2 Th ', '', 'Kradenan Rt. 003 Rw. 004 Kebonadem Brangsong Kendal', '', '', '', 'KONTRAK', '12032298', 'b66d52036b2aa920b2f655024a1d73e1', 'woman.png', 0),
(5888, '12042299', 'EVITA AGUSTIARA NUGROHO', '', 'Perempuan', 'Semarang', '1999-08-01', '24 Th 10 bl', 'PELAKSANA PERAWAT', 'DEWI KUNTHI', 2022, 2022, '2 Th ', '', 'Dk. Kedungpani Rt. 001Rw. 002 Pesantren Mijen Semarang', '', '', '', 'KONTRAK', '12042299', '284e2b120281d557782501e2ea388521', 'woman.png', 0),
(5889, '12052295', 'IMA OCTAVIANA', '', 'Perempuan', 'Semarang', '1995-10-29', '28 Th 7 bln', 'PELAKSANA PERAWAT', 'ARIMBI', 2022, 2022, '2 Th ', '', 'Jl. Bukit Beringin Asri V-A/131 Rt. 003 Rw. 006 Gondoriyo Ngaliyan Semarang', '', '', '', 'KONTRAK', '12052295', '7f5424a51c3e46d012293d0db177c7ce', 'woman.png', 0),
(5890, '12062288', 'VINA INDRIANA', '', 'Perempuan', 'Kendal', '1988-09-01', '35 Th 9 bln', 'PELAKSANA PERAWAT', 'IGD', 2022, 2022, '2 Th ', '', 'Perumahan Kaliwungu Indah Blok G 95/45 Rt. 005 Rw. 011 Protomulyo Kaliwungu Selatan Kendal', '', '', '', 'KONTRAK', '12062288', '0260b29bd95647fd4de2af81da7e929f', 'woman.png', 0);
INSERT INTO `pegawai` (`id`, `nopeg`, `nama`, `nik`, `gender`, `tmpt_lahir`, `tgl_lahir`, `umur`, `jabatan`, `unit`, `tmt`, `skpt`, `masa`, `ijazah`, `alamat`, `email`, `telpon`, `status_kawin`, `status_pegawai`, `username`, `password`, `foto`, `admin`) VALUES
(5891, '12082393', 'SHEILA MUFIDA ARIYANTI', '', 'Perempuan', 'Bojonegoro', '1993-09-07', '30 Th 9 bln', 'KOORDINATOR BAGIAN UMUM', 'IPSRS', 2023, 2023, '1 Th ', '', 'Forest Hill G2 No. 5 Rt 003 Rw 006 Pesantren Mijen Semarang', '', '', '', 'KONTRAK', '12082393', '8a36fd9df5f67265552ae0e4af9fb29c', 'woman.png', 0),
(5892, '12092300', 'AYU WULANDARI', '', 'Perempuan', 'Jaya Bhakti', '2000-01-01', '24 Th 5 bln', 'PELAKSANA PERAWAT', 'IBS', 2023, 2023, '1 Th ', '', 'Dusun III Rt 003 Rw 000 Jaya Bhakti Tuah Negeri Musi Rawas', '', '', '', 'KONTRAK', '12092300', 'f65f28510a6a47ab9c7e42cd28231668', 'woman.png', 0),
(5893, '12102301', 'YUSUF RAFI ALFIAN', '', 'Laki-laki', 'Pemalang', '2001-10-22', '22 Th 7 bln', 'PELAKSANA CASEMIX', 'REKAM MEDIS', 2023, 2023, '1 Th ', '', 'Paduraksa Rt 002 Rw 004 Paduraksa Pemalang', '', '', '', 'KONTRAK', '12102301', '2e2f298ff8ca8891a4d2a6683a30b737', 'man.png', 0),
(5894, '12112301', 'WIDIA PANGESTUTIK', '', 'Perempuan', 'Kabupaten Semarang', '2001-07-10', '22 Th 11 bl', 'PELAKASANA REKAM MEDIS', 'REKAM MEDIS', 2023, 2023, '1 Th ', '', 'Karangsari Rt. 003 Rw. 010 Kupang Ambarawa Kab. Semarang', '', '', '', 'KONTRAK', '12112301', 'ddcd8adfef9a837a871218ba3736bde5', 'woman.png', 0),
(5895, '12122301', 'YANITA SRI MULYANI', '', 'Perempuan', 'Semarang', '2001-06-18', '22 Th 11 bl', 'PELAKSANA PENDAFTARAN', 'PENDAFTARAN', 2023, 2023, '1 Th ', '', 'Kp. Umres Besar 85 Rt. 005 Rw. 006 Dadapsari Semarang Utara', '', '', '', 'KONTRAK', '12122301', '3184e6ef014ea818ff849cf7bf0a5d9d', 'woman.png', 0),
(5896, '12152395', 'OLGA SILVI ALVIARA', '', 'Perempuan', 'Semarang', '1995-12-01', '28 Th 6 bln', 'PELAKSANA PERAWAT', 'IGD', 2023, 2023, '1 Th ', '', 'Bukit Jatisari Indah Blok C 3 No. 7 Rt. 008 Rw. 007 Jatisari Mijen Semarang', '', '', '', 'KONTRAK', '12152395', '05931e239df6e3c75bb2270df49cfb85', 'woman.png', 0),
(5897, '12172301', 'HILYATUL AULIYA', '', 'Perempuan', 'semarang', '2001-02-11', '23 Th 3 bln', 'PELAKSANA PERAWAT GIGI', 'POLIKLINIK', 2023, 2023, '1 Th ', '', 'Ngabean Rt. 002 Rw. 004 Gubungpati Semarang', '', '', '', 'KONTRAK', '12172301', '00507a677b72befaa676b2dabec40418', 'woman.png', 0),
(5898, '12192301', 'AINNA LAILI RAHMA', '', 'Perempuan', 'Kendal', '2001-04-08', '23 Th 2 bln', 'PELAKSANA TTK', 'FARMASI', 2023, 2023, '1 Th ', '', 'Ds. Nolokerto Rt. 001 Rw. 005 Kaliwungu Kendal', '', '', '', 'KONTRAK', '12192301', 'b354b20690cf73aeea3eb5a61fc8c356', 'woman.png', 0),
(5899, '12202397', 'DR. NOVITA PERMATASARI WIHARJO', '', 'Perempuan', 'Banyumas', '1997-11-04', '26 Th 7 bln', 'KEPALA SEKSI PELAYANAN MEDIS', 'PELAYANAN MEDIS', 2023, 2023, '1 Th ', '', 'Perum Graha Padma L5/7 Tambakharjo Semarang Barat Semarang', '', '', '', 'KONTRAK', '12202397', '34afec4fe356959188ccfd798775d5d1', 'woman.png', 0),
(5900, '12222393', 'DR. SAPHIRA AYU SUWANTARI, M.Sc. Sp. A', '', 'Perempuan', 'Surabaya', '1993-09-09', '30 Th 9 bln', 'DOKTER SPESIALIS ANAK', 'PELAYANAN MEDIS', 2023, 2023, '1 Th ', '', 'Perum BPI Blok B-7A Rt 001 Rw. 010 Purwoyoso Ngaliyan Semarang', '', '', '', 'KONTRAK', '12222393', '854655f6d4f3cd8a81dd28a2e86f6cf8', 'woman.png', 0),
(5901, '12242398', 'ANGGI NURAENI', '', 'Perempuan', 'Sleman', '1998-05-01', '26 Th 1 bln', 'PELAKSANA PERAWAT', 'IBS', 2023, 2023, '1 Th ', '', 'Jl. Plumbon Wonosari Rt. 005 Rw. 003 Wonosari Ngaliyan Semarang', '', '', '', 'KONTRAK', '12242398', '195545f0d0de17c9ab811deb58824cb6', 'woman.png', 0),
(5902, '12262398', 'ADELIA MUTIARA DEWI', '', 'Perempuan', 'Salatiga', '1998-09-15', '25 Th 8 bln', 'PELAKSANA PERAWAT', 'PERISTI', 2023, 2023, '1 Th ', '', 'Jl. Candi Pawon Selatan IX Rt. 009 Rw. 001 Kalipancur Ngaliyan Semarang', '', '', '', 'KONTRAK', '12262398', '103bf7b303a069c3af65b6d0b9181bb6', 'woman.png', 0),
(5903, '12282399', 'ASMAHAN NABILA PRADESTI', '', 'Perempuan', 'Kudus', '1999-12-13', '24 Th 5 bln', 'PELAKSANA TTK', 'FARMASI', 2023, 2023, '1 Th ', '', 'Jl. Sri Rejeki Timur VII Rt. 006 Rw. 006 Gisikdrono Semarang', '', '', '', 'KONTRAK', '12282399', '7c9edce176af747404039f98798d5ef7', 'woman.png', 0),
(5904, '12292395', 'DR. HANIFAH RIZKI NUGRAHENI', '', 'Perempuan', 'Kendal', '1995-11-10', '28 Th 7 bln', 'KA. INS RAWAT JALAN', 'PELAYANAN MEDIS', 2023, 2023, '1 Th ', '', 'Pondok Bukit Agung K/I Sumurbroto Banyumanik // Dsn. Rowosari Rt. 003 Rw. 005 Meteseh Boja Kendal', '', '', '', 'KONTRAK', '12292395', '9134fae3054c83fdb7957d200aea0c1c', 'woman.png', 0),
(5905, '12302300', 'MARLINDA WIDYA QONITAH', '', 'Perempuan', 'Semarang', '2000-03-31', '24 Th 2 bln', 'PELAKSANA CASEMIX', 'REKAM MEDIS', 2023, 2023, '1 Th ', '', 'Jl. Sri Rejeki II Rt. 003 Rw. 002 No. 4 Kalibanteng Kidul Semarang Barat', '', '', '', 'KONTRAK', '12302300', 'e6d3f16bb2a515595f9cd1807cace3ed', 'woman.png', 0),
(5906, '12312385', 'DR. NDARU KARTYKA SARI', '', 'Perempuan', 'Semarang', '1985-09-11', '38 Th 8 bln', 'DR. SP.PK / KA.INS LABORAT', 'PELAYANAN MEDIS', 2023, 2023, '1 Th ', '', 'Pakintelan Gunungpati Rt.001 Rw.001 No. 30 Semarang', '', '', '', 'KONTRAK', '12312385', 'f5603febb7d06af79f2808d68c098c80', 'woman.png', 0),
(5907, '12322301', 'TUPLIKHATUN', '', 'Perempuan', 'Brebes', '2001-01-24', '23 Th 4 bln', 'PELAKSANA RM', 'REKAM MEDIS', 2023, 2023, '1 Th ', '', 'Jl. Randu Garut No.41 Rt.004 Rw.001 Tugu Semarang', '', '', '', 'KONTRAK', '12322301', 'b1b1d6205f9ac282bce2e75a0a3ea6d4', 'woman.png', 0),
(5908, '12332396', 'HANIFAH PUTRI RAHMAWATI', '', 'Perempuan', 'Semarang', '1996-09-13', '27 Th 8 bln', 'PELAKSANA PERAWAT', 'RAMA SHINTA', 2023, 2023, '1 Th ', '', 'Jangli Tlawah Rt. 004 Rw. 005 Karanganyar Gunung Candisari Semarang', '', '', '', 'KONTRAK', '12332396', '1d5d5158771536c7762f51983946cf32', 'woman.png', 0),
(5909, '12342398', 'SITI AMINAH', '', 'Perempuan', 'Semarang', '1998-10-07', '25 Th 8 bln', 'PELAKSANA PERAWAT', 'POLIKLINIK', 2023, 2023, '1 Th ', '', 'Kp. Tegalrejo Rt. 006 Rw. 013 Tambakaji Ngaliyan Semarang', '', '', '', 'KONTRAK', '12342398', '88b361210e2de8dd55d05f881eebd650', 'woman.png', 0),
(5910, '12352396', 'GAMPANG FAJAR NUR HARDIYANA', '', 'Laki-laki', 'Boyolali', '1996-11-29', '27 Th 6 bln', 'PELAKSANA PERAWAT', 'ARIMBI', 2023, 2023, '1 Th ', '', 'Wonosari Rt. 002 Rw. 010 Wonosari Ngaliyan Semarang', '', '', '', 'KONTRAK', '12352396', '9ee640c27ccaa3e6b8eeeba36f69bdca', 'man.png', 0),
(5911, '12372399', 'NOVIANA DEWI SETIAWATI', '', 'Perempuan', 'Kendal', '1999-11-18', '24 Th 6 bln', 'PELAKSANA RM', 'REKAM MEDIS', 2023, 2023, '1 Th ', '', 'Dk. Pugowati Rt. 006 Rw. 001 Ds. Margomulyo Pegandon Kendal', '', '', '', 'KONTRAK', '12372399', '6e17bc7804c25872342fde8390d3b993', 'woman.png', 0),
(5912, '12382301', 'DESTYARA SALSABILA RAMADHANI', '', 'Perempuan', 'Semarang', '2001-12-14', '22 Th 5 bln', 'PELAKSANA PENDAFTARAN', 'PENDAFTARAN', 2023, 2023, '1 Th ', '', 'Jatisari Elok Blok F/15 Rt. 002 Rw. 008 Mijen Semarang', '', '', '', 'KONTRAK', '12382301', '537a54a7f3983ed19322db09ab9fd28a', 'woman.png', 0),
(5913, '12392391', 'BINTANG PURWITASARI', '', 'Perempuan', 'Semarang', '1991-08-16', '32 Th 9 bln', 'PELAKSANA APOTEKER', 'FARMASI', 2023, 2023, '1 Th ', '', 'Perum Griya Margosari Blok B-9 Rt. 007 Rw. 008 Sawah Besar Gayamsari Semarang', '', '', '', 'KONTRAK', '12392391', 'a8be1ead22d01b775e946231602d63f3', 'woman.png', 0),
(5914, '12402392', 'ARIS WIBOWO', '', 'Laki-laki', 'Semarang', '1992-04-27', '32 Th 1 bln', 'PELAKSANA TTK', 'FARMASI', 2023, 2023, '1 Th ', '', 'Jl. Panda Utara II Rt. 008 Rw. 005 Palebon Pedurungan Semarang', '', '', '', 'KONTRAK', '12402392', '2fedd1327759cbbf7e2bce5ecc1773e7', 'man.png', 0),
(5915, '12412397', 'DR. IVAN PRATAMA RUSADI', '', 'Laki-laki', 'Semarang', '1997-04-12', '27 Th 1 bln', 'DOKTER UMUM', 'PELAYANAN MEDIS', 2023, 2023, '1 Th ', '', 'Perum Pandana Merdeka Blok S-5 Ngaliyan Semarang', '', '', '', 'KONTRAK', '12412397', 'fd38ae23cb752578fcc35796b764e234', 'man.png', 0),
(5916, '12422385', 'INDRI DESVITA ARIYANTI', '', 'Perempuan', 'Ambon', '1985-12-01', '38 Th 6 bln', 'PELAKSANA PERAWAT', 'IGD', 2023, 2023, '1 Th ', '', 'Perum Kaliwungu Indah Rt.005 Rw.010 Protomulyo Kaliwungu Selatan Kendal', '', '', '', 'KONTRAK', '12422385', '6d8c2805604ed27726b45faebe288acb', 'woman.png', 0),
(5917, '12432302', 'RETNO WINARSIH', '', 'Perempuan', 'Kendal', '2002-10-08', '21 Th 8 bln', 'PELAKSANA PERAWAT', 'KEPERAWATAN', 2023, 2023, '1 Th ', '', 'Ds. Krajan Rt. 003 Rw. 002 Bebengan Boja Kendal', '', '', '', 'KONTRAK', '12432302', 'cce3e4685b5eec2ffa578431f4d2b3ee', 'woman.png', 0),
(5918, '12442302', 'NABILAH IDHA', '', 'Perempuan', 'Kabupaten Semarang', '2002-02-22', '22 Th 3 bln', 'PELAKSANA PERAWAT', 'KEPERAWATAN', 2023, 2023, '1 Th ', '', 'Perum Jatisari Asabri D5/12B Rt.001 Rw.010 Mijen Semarang', '', '', '', 'KONTRAK', '12442302', 'f57d567eeb833fa75bad740924ba57e7', 'woman.png', 0),
(5919, '12452300', 'NISA AULIA VIRGY AGUSTINA SUSILO', '', 'Perempuan', 'Semarang', '2000-08-30', '23 Th 9 bln', 'PELAKSANA KASIR', 'KASIR', 2023, 2023, '1 Th ', '', 'Brayo Timur Rt. 001 Rw. 003 Kertosari Singorojo Kendal', '', '', '', 'KONTRAK', '12452300', '45c8dd0c935124da5dc8d7a7e407ec19', 'woman.png', 0),
(5920, '12462301', 'MUYASYAROH', '', 'Perempuan', 'Semarang', '2001-08-08', '22 Th 10 bl', 'PELAKSANA KASIR', 'KASIR', 2023, 2023, '1 Th ', '', 'Jl. Nusa Indah II Rt.03 Rw.005 Tambakaji Ngaliyan Semarang', '', '', '', 'KONTRAK', '12462301', '32b0f8dd93ed308246e385695df64ed0', 'woman.png', 0),
(5921, '12472391', 'RACHMA APRILIYANTI', '', 'Perempuan', 'Semarang', '1991-04-03', '33 Th 2 bln', 'PELAKSANA PERAWAT', 'ICU', 2023, 2023, '1 Th ', '', 'Wonolopo Rt.002 Rw.004 Mijen Semarang', '', '', '', 'KONTRAK', '12472391', '5d0778c6cab9d400680b6f5ed0fe3703', 'woman.png', 0),
(5922, '12482300', 'FATIKAH NURUL JANAH', '', 'Perempuan', 'Kendal', '2000-09-11', '23 Th 8 bln', 'PELAKSANA PERAWAT', 'KEPERAWATAN', 2023, 2023, '1 Th ', '', 'Jl. Kyai Aluwi Rt.002 Rw.005 Pegandon Kendal', '', '', '', 'KONTRAK', '12482300', 'f1d9c75b54e70fe7e0461bd6860e6c71', 'woman.png', 0),
(5923, '12492393', 'MIRNA AYU', '', 'Perempuan', 'Kendal', '1993-03-29', '31 Th 2 bln', 'PELAKSANA PERAWAT', 'ARIMBI', 2023, 2023, '1 Th ', '', 'Jl. Kusuma Bangsa Perum Sub Inti Gang 1 Rt.001 Rw.009 Pekalongan\\', '', '', '', 'KONTRAK', '12492393', 'e3e810abc1257384b2ba64f90397e504', 'woman.png', 0),
(5924, '12502397', 'SITI PANDELUN', '', 'Perempuan', 'Kendal', '1997-05-04', '27 Th 1 bln', 'PELAKSANA PERAWAT', 'ARIMBI', 2023, 2023, '1 Th ', '', 'Ds. Dadapan Rt. 001 Rw. 004 Singorojo Kendal', '', '', '', 'KONTRAK', '12502397', '5f0ac24c8b0450598c5f8a52fd76d1c3', 'woman.png', 0),
(5925, '12512397', 'RIA RIZKY ELLIDA LILIANA PUTRI', '', 'Perempuan', 'Semarang', '1997-11-24', '26 Th 6 bln', 'PELAKSANA PERAWAT', 'DEWI KUNTHI', 2023, 2023, '1 Th ', '', 'Tambakaji Rt.012 Rw.001 Ngaliyan Semarang', '', '', '', 'KONTRAK', '12512397', 'd966563cd68aec4abd4a84dffa8dbe41', 'woman.png', 0),
(5926, '12522398', 'ERTHA GILANG MUNITHA NINGSIH', '', 'Perempuan', 'Madiun', '1998-08-26', '25 Th 9 bln', 'PELAKSANA PERAWAT', 'KEPERAWATAN', 2023, 2023, '1 Th ', '', 'Jl. Pelem Golek Rt. 006 Rw. 002 Tambakaji Ngaliyan Semarang', '', '', '', 'KONTRAK', '12522398', 'cf993bbb816a27e175b86baf0cf67c26', 'woman.png', 0),
(5927, '12532402', 'FARIDHOTUL IZZA', '', 'Perempuan', 'Demak', '2002-11-27', '21 Th 6 bln', 'PELAKSANA PERAWAT', 'ARIMBI', 2024, 2024, '0 Th ', '', 'Cangkring Rt.006 Rw.002 Katonsari Demak', '', '', '', 'KONTRAK', '12532402', '7ea2b5d335a7a63038fb9459b12b7543', 'woman.png', 0),
(5928, '12542497', 'NELA SAGITHA DEVI', '', 'Perempuan', 'Semarang', '1997-07-14', '26 Th 10 bl', 'PELAKSANA PERAWAT', 'KEPERAWATAN', 2024, 2024, '0 Th ', '', 'Jl. Beringin Asri Barat 6/658 Rt.010 Rw.011 Wonosari Ngaliyan Semarang', '', '', '', 'KONTRAK', '12542497', '2ea17ba28381eb4a1a70ca67ab142b55', 'woman.png', 0),
(5929, '12552400', 'NUR KHAKIM', '', 'Laki-laki', 'Semarang', '2000-11-19', '23 Th 6 bln', 'PELAKSANA HOUSEKEEPING', 'HOUSEKEEPING', 2024, 2024, '0 Th ', '', 'Mangkang Kulon Rt. 004 Rw. 005 Tugu Semarang', '', '', '', 'KONTRAK', '12552400', '0789f2b14b19c2ef21d5f90669384a46', 'man.png', 0),
(5930, '12562404', 'SADAM ALI GHUFFRON', '', 'Laki-laki', 'Kendal', '2004-02-13', '20 Th 3 bln', 'PELAKSANA HOUSEKEEPING', 'HOUSEKEEPING', 2024, 2024, '0 Th ', '', 'Ds. Campurejo Rt.003 Rw.004 Boja Kendal', '', '', '', 'KONTRAK', '12562404', 'ec88bc74de678c164fb6dd52995e71ca', 'man.png', 0),
(5931, '12572402', 'FERDI WIJAYA YUDHA', '', 'Laki-laki', 'Semarang', '2002-03-30', '22 Th 2 bln', 'PELAKSANA HOUSEKEEPING', 'HOUSEKEEPING', 2024, 2024, '0 Th ', '', 'Jl. Karang Kimpul Rt. 004 Rw. 001 Tambakrejo Gayamsari Semarang', '', '', '', 'KONTRAK', '12572402', 'fcd58b4b65c108b846d54e6279f1f104', 'man.png', 0),
(5932, '12582499', 'DIAN FITRIANI', '', 'Perempuan', 'Semarang', '1999-01-21', '25 Th 4 bln', 'PELAKSANA KASIR', 'KASIR', 2024, 2024, '0 Th ', '', 'Jl. Borobudur Raya V Rt. 010 Rw. 011 Kembangarum Semarang Barat Semarang', '', '', '', 'KONTRAK', '12582499', 'ef181e82e2476c95f75de645f576d3c3', 'woman.png', 0),
(5933, '12592497', 'IDVAN LUTHFI', '', 'Laki-laki', 'Kab. Semarang', '1997-02-16', '27 Th 3 bln', 'PELAKSANA FISIOTERAPI', 'FISIOTERAPI', 2024, 2024, '0 Th ', '', 'Ds. Karangkepoh Rt. 015 Rw.006 Pager Kaliwungu Kab Semarang', '', '', '', 'KONTRAK', '12592497', '23dd3615a6df20a3c273a673b9887f1b', 'man.png', 0),
(5934, '12602499', 'MOCHAMAD DAFA IKHSANA', '', 'Laki-laki', 'Grobogan', '1999-10-31', '24 Th 7 bln', 'PELAKSANA PERAWAT', 'IGD', 2024, 2024, '0 Th ', '', 'Karang Malang Kidul Rt. 001 Rw. 006 Sumbersari Ngampel Kendal', '', '', '', 'KONTRAK', '12602499', 'cfff5a40d825475b85c97770b460dc5e', 'man.png', 0),
(5935, '12612490', 'WIDIARTINI', '', 'Perempuan', 'Kendal', '1990-05-18', '34 Th 0 bln', 'PELAKSANA PERAWAT', 'KEPERAWATAN', 2024, 2024, '0 Th ', '', 'Padepokan Ganesa Blok-G No. 6 Rt. 010 Rw. 009 Pandean Lamper Gayamsari', '', '', '', 'KONTRAK', '12612490', '4a600ffe0004e4f6981810252d68ef45', 'woman.png', 0),
(5936, '12642495', 'DHITA RISKYANA', '', 'Perempuan', 'Semarang', '1995-12-20', '28 Th 5 bln', 'SUB. BAG. MOBILISASI DANA', 'KEUANGAN', 2024, 2024, '0 Th ', '', 'Pandawa Residence A77, Mijen', '', '', '', 'KONTRAK', '12642495', 'c5d36d0cda89d547b9df041c936fba12', 'woman.png', 0),
(5937, '12662482', 'SANA ARIZA', '', 'Perempuan', 'Semarang', '1982-11-10', '41 Th 7 bln', 'SEKRETARIS', 'SEKRETARIAT', 2024, 2024, '0 Th ', '', 'Jl. Dewi Sartika Barat I No. 88, Semarang', '', '', '', 'KONTRAK', '12662482', 'd9e141dc85e6e75b6046f329f1a12e47', 'woman.png', 0),
(5938, '12702400', 'NAILA \'IZZANA KAMILA', '', 'Perempuan', 'Semarang', '2000-05-25', '24 Th 0 bln', 'KOOR. ADMINISTRASI KEPEGAWAIAN', 'HRD', 2024, 2024, '0 Th ', '', 'Pancakarya Blok 15/105, Rejosari, Semarang Timur, Kota Semarang', '', '', '', 'KONTRAK', '12702400', '742f51974993f73efee7e517088005a5', 'woman.png', 0),
(5939, '12712497', 'FAJAR MAULANA SHIDIQ', '', 'Laki-laki', 'Madiun', '1997-11-28', '26 Th 6 bln', 'PELAKSANA IT', 'IT', 2024, 2024, '0 Th ', '', 'Desa Tanjungan RT 3 RW 2, Rowosari, Kab. Kendal', '', '', '', 'KONTRAK', 'fajar4561', '053c8bfe77faa40b4d20f680daabd064', 'man.png', 1),
(5940, '12722401', 'ENGGI ANDINI', '', 'Perempuan', 'Kendal', '2001-04-08', '23 Th 2 bln', 'PELAKSANA PERAWAT', 'KEPERAWATAN', 2024, 2024, '0 Th ', '', 'Tabet RT 002 RW 003, Tabet, Limbangan, Kab Kendal ', '', '', '', 'KONTRAK', '12722401', '527cf129c41ddb4c2be63671176b2965', 'woman.png', 0),
(5941, '12732497', 'PANJI AGUNG NUGRAHA', '', 'Laki-laki', 'Bandung', '1997-03-05', '27 Th 3 bln', 'PELAKSANA PERAWAT', 'KEPERAWATAN', 2024, 2024, '0 Th ', '', 'Wonosari RT 004 RW 009, Wonosari, Ngaliyan, Kota Semarang', '', '', '', 'KONTRAK', '12732497', 'b21e0daef81e307b105ba0b7595b98ac', 'man.png', 0),
(5942, '12742478', 'PURYANINGSIH', '', 'Perempuan', 'Kendal', '1978-05-07', '46 Th 1 bln', 'PELAKSANA PERAWAT', 'KEPERAWATAN', 2024, 2024, '0 Th ', '', 'Jatisari Asabri D-6 No. 34 RT 009 RW 010, Jatisari, Mijen, Kota Semarang', '', '', '', 'KONTRAK', '12742478', '5acb6c3ca7b2337d0f05141321defcc3', 'woman.png', 0),
(5943, '12752492', 'VIRONIKA WIDYASTUTI', '', 'Perempuan', 'CILACAP', '1992-03-21', '32 Th 2 bln', 'KOORDINATOR PAJAK & TARIF', 'KEUANGAN', 2024, 2024, '0 Th ', '', 'Walikukun RT 008 RW 004, Japanan, Cawas, Kabupaten Klaten', '', '', '', 'KONTRAK', '12752492', '6295ed1b16fccb3bc3aede09f29528f9', 'woman.png', 0),
(5944, '12762401', 'DESI RATNA AMINAH', '', 'Perempuan', 'KENDAL', '2001-12-10', '22 Th 6 bln', 'PELAKSANA KASIR', 'KASIR', 2024, 2024, '0 Th ', '', 'Montong Kulon RT 002 RW 005, Montongsari, Weleri, Kab Kendal', '', '', '', 'KONTRAK', '12762401', '4dcd859194feaedcc3d7c1dab4ad8800', 'woman.png', 0),
(5945, '12772497', 'FANNY UMAYA VANOPKA', '', 'Perempuan', 'SEMARANG', '1997-11-18', '26 Th 6 bln', 'PELAKSANA PERAWAT', 'KEPERAWATAN', 2024, 2024, '0 Th ', '', 'Wonosari RT 004 RW 009, Wonosari, Ngaliyan, Kota Semarang', '', '', '', 'KONTRAK', '12772497', 'bbd45e598c610c21cb10b5429d4ad527', 'woman.png', 0),
(5946, '12782496', 'JEFRY ANDRYANSYAH', '', 'Laki-laki', 'PAYAKUMBUH', '1996-10-11', '27 Th 7 bln', 'PELAKSANA PERAWAT', 'KEPERAWATAN', 2024, 2024, '0 Th ', '', 'Padang Tinggi Piliang RT 002 RW 002, Padang Tinggi Piliang, Payakumbuh Barat, Kota Payakumbuh', '', '', '', 'KONTRAK', '12782496', '8ad5e77baf71ca55fa72d17c06416216', 'man.png', 0),
(5947, '12792498', 'AYUB IBADURROHMAN', '', 'Laki-laki', 'SUKOHARJO', '1998-05-31', '26 Th 0 bln', 'PELAKSANA PERAWAT', 'KEPERAWATAN', 2024, 2024, '0 Th ', '', 'Ngabean RT 002 RW 001, Jetis, Sukoharjo, Kabupaten Sukoharjo', '', '', '', 'KONTRAK', '12792498', '76800704457b25158e0ce996f7d98507', 'man.png', 0),
(5948, '12802400', 'ELVIN ANGGRIANTI', '', 'Perempuan', 'BLORA', '2000-05-31', '24 Th 0 bln', 'PELAKSANA PERAWAT', 'KEPERAWATAN', 2024, 2024, '0 Th ', '', 'Dukuh Plosorejo RT 007 RW 002, Srigading, Ngawen, Kabupaten Blora', '', '', '', 'KONTRAK', '12802400', 'dfd3ebd5a08b57dbab814bb42462cff2', 'woman.png', 0),
(5949, '12812499', 'LAYLA NUR AZIZAH', '', 'Perempuan', 'JEPARA', '1999-10-08', '24 Th 8 bln', 'PELAKSANA PENDAFTARAN', 'PENDAFTARAN', 2024, 2024, '0 Th ', '', 'Krasak RT 004 RW 004, Krasak, Pecangaan, Kabupaten Jepara', '', '', '', 'KONTRAK', '12812499', '7595e152be0fc87df1c0db29c7c97a0e', 'woman.png', 0),
(5950, '12822496', 'DEWI ASTUTI', '', 'Perempuan', 'Grobogan', '1996-10-31', '27 Th 7 bln', 'PELAKSANA TTK', 'FARMASI', 2024, 2024, '0 Th ', '', 'Dusun Klatak RT 001 RW 005, Tlogomulyo, Gubug, Kabupaten Grobogan', '', '', '', 'KONTRAK', '12822496', '7947080aa6dea4a44c200b14b3fdd55d', 'woman.png', 0),
(5951, '12832402', 'KHUSNUL KHOTIMAH', '', 'Perempuan', 'KENDAL', '2002-07-06', '21 Th 11 bl', 'PELAKSANA PERAWAT', 'KEPERAWATAN', 2024, 2024, '0 Th ', '', 'Desa Sukolilan RT 002 RW 001, Sukolilan, Patebon, Kabupaten Kendal', '', '', '', 'KONTRAK', '12832402', '923bf53065c3f24a4f8fd28e76ba6bd4', 'woman.png', 0),
(5952, '12842498', 'INDAH PUJI AMBARWATI', '', 'Perempuan', 'SEMARANG', '1998-09-01', '25 Th 9 bln', 'PELAKSANA PERAWAT', 'KEPERAWATAN', 2024, 2024, '0 Th ', '', 'Ngadirgo RT 008 RW 004, Ngadirgo, Mijen, Kota Semarang', '', '', '', 'KONTRAK', '12842498', 'f4b68bb511da371cfeb49c66e799afed', 'woman.png', 0),
(5953, '12852400', 'NAVIATUL FADILLA NURROHMAH', '', 'Perempuan', 'SEMARANG', '2000-02-08', '24 Th 4 bln', 'PELAKSANA PERAWAT', 'KEPERAWATAN', 2024, 2024, '0 Th ', '', 'Kedungpane RT 001 RW 010, Ngaliyan, Ngaliyan, Kota Semarang', '', '', '', 'KONTRAK', '12852400', 'c14b027d0ab9860ba9ea091678867975', 'woman.png', 0);

-- --------------------------------------------------------

--
-- Table structure for table `saran`
--

CREATE TABLE `saran` (
  `id` int(11) NOT NULL,
  `nopeg` varchar(100) NOT NULL,
  `tgl_saran` date NOT NULL,
  `jam` varchar(50) NOT NULL,
  `saran` varchar(10000) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `transaksi_gaji`
--

CREATE TABLE `transaksi_gaji` (
  `id` int(11) NOT NULL,
  `kode_transaksi` varchar(100) NOT NULL,
  `tgl_transaksi` date NOT NULL,
  `periode_bulan` varchar(100) NOT NULL,
  `periode_tahun` varchar(100) NOT NULL,
  `jumlah_karyawan` int(11) NOT NULL,
  `proses` int(11) NOT NULL,
  `total_gaji` int(11) NOT NULL,
  `status_transaksi` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `gaji`
--
ALTER TABLE `gaji`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `master_pegawai`
--
ALTER TABLE `master_pegawai`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `master_unit`
--
ALTER TABLE `master_unit`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `pegawai`
--
ALTER TABLE `pegawai`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `saran`
--
ALTER TABLE `saran`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `transaksi_gaji`
--
ALTER TABLE `transaksi_gaji`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `gaji`
--
ALTER TABLE `gaji`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=1996;
--
-- AUTO_INCREMENT for table `master_pegawai`
--
ALTER TABLE `master_pegawai`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=94;
--
-- AUTO_INCREMENT for table `master_unit`
--
ALTER TABLE `master_unit`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=52;
--
-- AUTO_INCREMENT for table `pegawai`
--
ALTER TABLE `pegawai`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5954;
--
-- AUTO_INCREMENT for table `saran`
--
ALTER TABLE `saran`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `transaksi_gaji`
--
ALTER TABLE `transaksi_gaji`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
