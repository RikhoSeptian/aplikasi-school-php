-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Waktu pembuatan: 21 Jan 2023 pada 03.33
-- Versi server: 10.4.25-MariaDB
-- Versi PHP: 8.1.10

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `db_smakpmargahayu`
--

-- --------------------------------------------------------

--
-- Struktur dari tabel `tb_absen`
--

CREATE TABLE `tb_absen` (
  `id_absen` int(11) NOT NULL,
  `nama_siswa` varchar(100) NOT NULL,
  `masuk` time NOT NULL,
  `terlambat` decimal(6,2) DEFAULT NULL,
  `pulang` time DEFAULT NULL,
  `lembur` decimal(6,2) DEFAULT NULL,
  `tgl_absen` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Struktur dari tabel `tb_admin`
--

CREATE TABLE `tb_admin` (
  `id_admin` int(11) NOT NULL,
  `nama_lengkap` varchar(50) NOT NULL,
  `username` varchar(50) NOT NULL,
  `password` varchar(100) NOT NULL,
  `aktif` varchar(5) NOT NULL,
  `foto` varchar(225) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `tb_admin`
--

INSERT INTO `tb_admin` (`id_admin`, `nama_lengkap`, `username`, `password`, `aktif`, `foto`) VALUES
(1, 'Admin', 'admin@gmail.com', 'd033e22ae348aeb5660fc2140aec35850c4da997', 'Y', 'admin.png');

-- --------------------------------------------------------

--
-- Struktur dari tabel `tb_guru`
--

CREATE TABLE `tb_guru` (
  `id_guru` int(11) NOT NULL,
  `nip` varchar(20) NOT NULL,
  `nama_guru` varchar(120) NOT NULL,
  `email` varchar(65) NOT NULL,
  `password` varchar(100) NOT NULL,
  `foto` varchar(255) NOT NULL,
  `status` varchar(5) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `tb_guru`
--

INSERT INTO `tb_guru` (`id_guru`, `nip`, `nama_guru`, `email`, `password`, `foto`, `status`) VALUES
(15, '3204121905710002', 'Dedi Suhendar', 'dedisuhendar@gmail.com', '19a7028acca1cd3d9f46cd4d0258bcb80946893a', 'guru.jpg', 'Y'),
(16, '3204376502780005', 'Diah Rodiah', 'diahr@gmail.com', 'e1832edbe5a0385b540167457b149c4ead540a84', 'guru.png', 'Y'),
(17, '3277015502860005', 'Dian Nurhayati', 'dian15021986@gmail.com', 'aa9d7aa84e5acf67e08840527086491189f59796', 'guru.png', 'Y'),
(18, '3204146206660001', 'Dian Wulan Trisna', 'dianwulantrisna@gmail.com', 'b5a405d4e2e62caf4b462a9113df1419f74ec6fb', 'guru.png', 'Y'),
(19, '3204094102660003', 'Dwi Wagijati', 'sakuracleody.kp@gmail.com', '2bfd4235c66ddbd68d52015235af8f1826fe5ffa', 'guru.png', 'Y'),
(20, '3273104404710003', 'Elisyah', 'elisyahhan@gmail.com', '8007e3b9b69a7b741cebfd87b2031978d7bbb7c7', 'guru.png', 'Y'),
(21, '3204375510940003', 'Eneng Leni Nurlayina', 'leninurlayina9@gmail.com', '9736e8858d4208374cc29d56edaf2771af1c4ad4', 'guru.png', 'Y'),
(22, '3204106803760002', 'Herni Herawati', 'herniherawati746@gmail.com', '421a9ab583a42440cea592e720d42a3063019823', 'guru.png', 'Y'),
(23, '3204325805780003', 'Ida Widaningsih', 'ida.iw44@gmail.com', 'a6d3ce3c239a2d4791e1659633af9863ffc5a7a3', 'guru.png', 'Y'),
(24, ' 3204102007930003', 'Muhammad Iqbal Kusmana', 'IQBAL20071993@GMAIL.COM', 'bf060ee2d03a831710e3755dae6d2240bc5e4d5e', 'guru.jpg', 'Y'),
(25, '3204095203730001', 'Neneng Hermawati', 'nenghermawati@gmail.com', 'd418b79205fa1ee091196fb06bb61ff3c2e87c20', 'guru.png', 'Y'),
(26, '3273136504730006', 'Nurjanah', 'nurjanahzakaria73@gmail.com', 'c48149eec592d7aff7a0cdf7953b18514969b64d', 'guru.png', 'Y'),
(27, '3204090510970001', 'Octavio Pratama', 'octavpm@gmail.com', '34aeb3a551ad7adaf8a7ce9d745b9fe5e2d91efd', 'guru.jpg', 'Y'),
(28, '3204320205900005', 'Rony Yachya', 'ronaraii11@gmail.com', '0172c5cf78d7e7f9b954a5564d17830b1a1ca7c0', 'guru.jpg', 'Y'),
(29, '3204374409770006', 'Siti Akmalah', 'sitiakmalah@gmail.com', '3b320fb4d7d262eb464caa7440acd24174ee0de0', 'guru.png', 'Y'),
(30, '3273046401750001', 'Sri Mulyani', 'srimulyanisag66@gmail.com', '4ce2885f7d890531a0539639ab93dab043460e71', 'guru.png', 'Y');

-- --------------------------------------------------------

--
-- Struktur dari tabel `tb_kepsek`
--

CREATE TABLE `tb_kepsek` (
  `id_kepsek` int(11) NOT NULL,
  `nip` varchar(15) NOT NULL,
  `nama_kepsek` varchar(120) NOT NULL,
  `email` varchar(65) NOT NULL,
  `password` varchar(100) NOT NULL,
  `foto` varchar(255) NOT NULL,
  `status` varchar(5) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `tb_kepsek`
--

INSERT INTO `tb_kepsek` (`id_kepsek`, `nip`, `nama_kepsek`, `email`, `password`, `foto`, `status`) VALUES
(2, '196403261991031', 'Dr. Budi Kusmana, SE., M.si', '.@gmail.com', 'e6eb8b303d98c230b4307ab79bfd5f217a6b7490', 'kepala.png', 'Y');

-- --------------------------------------------------------

--
-- Struktur dari tabel `tb_master_mapel`
--

CREATE TABLE `tb_master_mapel` (
  `id_mapel` int(11) NOT NULL,
  `kode_mapel` varchar(40) NOT NULL,
  `mapel` varchar(60) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Struktur dari tabel `tb_mengajar`
--

CREATE TABLE `tb_mengajar` (
  `id_mengajar` int(11) NOT NULL,
  `kode_pelajaran` varchar(30) NOT NULL,
  `hari` varchar(40) NOT NULL,
  `jam_mengajar` varchar(60) NOT NULL,
  `jamke` varchar(11) NOT NULL,
  `id_guru` int(11) NOT NULL,
  `id_mapel` int(11) NOT NULL,
  `id_mkelas` int(11) NOT NULL,
  `id_semester` int(11) NOT NULL,
  `id_thajaran` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `tb_mengajar`
--

INSERT INTO `tb_mengajar` (`id_mengajar`, `kode_pelajaran`, `hari`, `jam_mengajar`, `jamke`, `id_guru`, `id_mapel`, `id_mkelas`, `id_semester`, `id_thajaran`) VALUES
(11, 'MPL-1670324240', 'Selasa', '12.12 - 13.13', '1', 51, 9, 8, 6, 9),
(12, 'MPL-1670324403', 'Selasa', '12.12 - 13.13', '1', 37, 7, 8, 6, 9),
(13, 'MPL-1670327752', 'Selasa', '12.12 - 13.13', '1', 38, 2, 8, 6, 9),
(14, 'MPL-1670334830', 'Senin', '12.12 - 13.13', '2', 38, 2, 8, 6, 9),
(15, 'MPL-1671196888', 'Senin', '12.12 - 13.13', '1', 2, 1, 8, 6, 9),
(16, 'MPL-1672295697', 'Senin', '12.00 - 14.00', '1', 11, 2, 8, 6, 9),
(17, 'MPL-1672298941', 'Selasa', '10.00 - 11.00', '2', 11, 2, 9, 6, 9),
(18, 'MPL-1672383955', 'Senin', '08.00 - 09.00', '2', 11, 2, 11, 6, 9);

-- --------------------------------------------------------

--
-- Struktur dari tabel `tb_mkelas`
--

CREATE TABLE `tb_mkelas` (
  `id_mkelas` int(11) NOT NULL,
  `kd_kelas` varchar(40) NOT NULL,
  `nama_kelas` varchar(40) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `tb_mkelas`
--

INSERT INTO `tb_mkelas` (`id_mkelas`, `kd_kelas`, `nama_kelas`) VALUES
(8, 'KL-1670236972', 'X (IPA)'),
(9, 'KL-1670236982', 'X (IPS)'),
(11, 'KL-1670237015', 'XI (IPA)'),
(12, 'KL-1670237040', 'XI (IPS)'),
(13, 'KL-1670237051', 'XII (IPA)'),
(14, 'KL-1670237068', 'XII (IPS)');

-- --------------------------------------------------------

--
-- Struktur dari tabel `tb_semester`
--

CREATE TABLE `tb_semester` (
  `id_semester` int(11) NOT NULL,
  `semester` varchar(45) NOT NULL,
  `status` int(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `tb_semester`
--

INSERT INTO `tb_semester` (`id_semester`, `semester`, `status`) VALUES
(6, 'Ganjil', 1),
(7, 'Genap', 0);

-- --------------------------------------------------------

--
-- Struktur dari tabel `tb_siswa`
--

CREATE TABLE `tb_siswa` (
  `id_siswa` int(11) NOT NULL,
  `nis` varchar(60) NOT NULL,
  `nama_siswa` varchar(120) NOT NULL,
  `tempat_lahir` varchar(100) NOT NULL,
  `tgl_lahir` date NOT NULL,
  `jk` varchar(30) NOT NULL,
  `alamat` text NOT NULL,
  `password` varchar(255) NOT NULL,
  `foto` varchar(255) NOT NULL,
  `status` varchar(15) NOT NULL,
  `th_angkatan` year(4) NOT NULL,
  `id_mkelas` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `tb_siswa`
--

INSERT INTO `tb_siswa` (`id_siswa`, `nis`, `nama_siswa`, `tempat_lahir`, `tgl_lahir`, `jk`, `alamat`, `password`, `foto`, `status`, `th_angkatan`, `id_mkelas`) VALUES
(23, '0056922440', 'A. ZULFAN ADSUBHAN', 'Bandung', '2005-07-14', 'L', 'SAYATI HILIR RT:3	RW:7 MARGAHAYU SELATAN Kec. Margahayu', '3bce93316aec817eba57148cd92b45d2bb929e43', 'siswa.png', '1', 2021, 11),
(24, '0058214010', 'Abdul rohman', 'Bandung', '2005-10-07', 'L', 'Sampora	RT:2 RW:17 Sukamenak Kec. Margahayu 40227', '1ecc752f54967ca5d17b5b192f2557b25f05cb51', 'siswa.png', '1', 2021, 11),
(25, '0038394379', 'ABDUL ROHMAN', 'Bandung', '2005-10-07', 'L', 'Griya Antariksa no 21 RT:2 RW:6 Sangkanhurip Kec. Katapang 40218', '0cbb1ee37390f68e85942d29fa37c8a0fd1bc8f9', 'siswa.png', '1', 2020, 14),
(26, '0079054455', 'Adi Kusnadi', 'Bandung', '2023-07-03', 'L', 'KP. Kebon Kalapa RT:4 RW:6 Sukamenak	Kec. Margahayu 40227', '922e361a28c8b3ece8eb87f7dad1bd1044ad166e', 'siswa.png', '1', 2021, 11),
(27, '0067871503', 'Adila Chika Septiani', 'Bandung', '2006-09-26', 'P', 'Sayati Hilir RT:2 RW:15		Sayati Kec. Margahayu 40227', 'e7c8a1dd45d6203888c9834532f144574cd89a7e', 'siswi.png', '1', 2021, 12),
(28, '0043706240', 'Adinda Dwi Maharani', 'Sumedang', '2004-03-16', 'L', 'Kp. Cikambuy Tengah Sangkanhurip Kec. Katapang', '69a0ff6ae87266691d4f871f34a77889e94fc9f8', 'siswi.png', '1', 2020, 11),
(29, '0051361325', 'Adit Mukhamad Iqbal', 'Bandung', '2005-01-19', 'L', 'Muara Ciwidey RT:3 RW:1 Cilampeni Kec. Katapang 40971', '2b7b1b5871db0741ee45180ffcf2fa91168e6075', 'siswa.png', '1', 2020, 13),
(30, '0047717788', 'Aditia Permana Putra', 'Bandung', '2004-08-30', 'L', 'Kebon kalapa RT:4 RW:6 Sukamenak Kec. Margahayu 40227', 'f67c591bd5310857bed5717fa84830c09c9f049d', 'siswa.png', '1', 2020, 14),
(31, '0072201215', 'Aditya Riziq Saputra', 'Bandung', '2007-05-23', 'L', 'Jln. Pasawahan RT:1 RW:17 Sayati Kec. Margahayu 40228', '68ee7a06240e3e7ed2c8c6ae34fe2570b759ecfc', 'siswa.png', '1', 2022, 8),
(32, '0044542488', 'Afilla Kurnia Hasanah', 'Bandung', '2004-12-16', 'P', 'Kp Bojong Buah RT:1 RW:4 Pangauban Kec. Katapang', '53eed686ed6a47869002da76a3b6f61c3a1b7d36', 'siswi.png', '1', 2020, 14),
(33, '0058824869', 'AFRIZAL FAADILLAH RACHMADI', 'Bandung', '2005-11-01', 'L', 'Jl. Pasundan No. 81 RT:1 RW:2 DERWATI Kec. Rancasari 40296', 'e678d51f5ddb0de3ad7ad3d11ca0ecdcece59f49', 'siswa.png', '1', 2022, 8),
(34, '0058620327', 'Agung Sanjaya', 'Bandung', '2005-01-20', 'L', 'Kp. Sayati Hilir RT:5 RW:7 Sayati Kec. Margahayu', '2e02830b8bd68cdc37a3bde93e3210de4a0111e9', 'siswa.png', '1', 2020, 14),
(35, '0077595190', 'Ahmad Ganny Darmawan', 'Bandung', '2007-04-29', 'L', 'Sayati Hilir RT:4 RW:10 Sayati Kec. Margahayu 40228', '1075ecb25c51fbfb27f741c3b684b9d2941a2952', 'siswa.png', '1', 2022, 8),
(36, '0054750723', 'Aif Nira Daya', 'Bandung', '2005-12-20', 'L', 'Blok Kenari RT:5 RW:5 Pangauban Kec. Katapang 40971', 'e1fee668b7118a652dd99b9ffb61447f6a0bb9ba', 'siswa.png', '1', 2021, 12),
(37, '0056341804', 'ALYA SITI MARINA', 'Bandung', '2005-02-18', 'P', 'Kp. Muara Ciwidey RT:8 RW:4 CILAMPENI Kec. Katapang', '619ef3362bfa6b6311877fc5949b9eceb8a1e92d', 'siswa.png', '1', 2020, 13),
(38, '3071349424', 'AMELIA CAHYA', 'Bandung', '2007-05-26', 'P', 'MUARA CIWIDEY RT:1 RW:4 CILAMPENI Kec. Katapang 40971', '8c41ecdc12caca9e3d8feba30c98d0f43401bc6a', 'siswi.png', '1', 2022, 8),
(39, '0068833477', 'Ana Tahiyah', 'Bandung', '2006-12-10', 'P', 'Kp Manglid RT:1 RW:1 Margahayu Selatan Kec. Margahayu 40226', 'a7219cda304a80c8abdf61f9e3cb2c150ff95e9a', 'siswi.png', '1', 2022, 9),
(40, '0042066984', 'ANGGA FERDIAN', 'Bandung', '2004-10-22', 'L', 'PALGENEP KULON RT:4 RW:5 MARGAHAYU SELATAN Kec. Margahayu', '261fd404f4998bba853f7fd2534db82cb50929ba', 'siswa.png', '1', 2021, 12),
(41, '0061391014', 'Angga Prawira Dipraja', 'Bandung', '2006-01-31', 'L', 'Kp cibogo no.2 RT:1 RW:10	Cangkuang Kulon Kec. Dayeuhkolot	', '5b6b6c7f5576f21c64047eaa297fd6856f6d585a', 'siswa.png', '1', 2021, 12),
(42, '0067671551', 'ANISA WIRA BUANITA', 'Cimahi', '2006-10-28', 'P', 'Kp. Pasawahan RT:1 RW:12 Sayati Kec. Margahayu 40228', '2ad546ae005379f8255e3ebe37683868cf10ebab', 'siswi.png', '1', 2022, 0),
(43, '0067671551', 'ANISA WIRA BUANITA', 'Cimahi', '2006-10-28', 'P', 'Kp. Pasawahan RT:1 RW:12 Sayati Kec. Margahayu 40228', '2ad546ae005379f8255e3ebe37683868cf10ebab', 'siswi.png', '1', 2022, 8),
(44, '0061189705', 'Arba Nur Hikmah', 'Bandung', '2006-03-24', 'L', 'Sayati RT:4 RW:8 Sayati Kec. Margahayu 40228', 'b61a8787d2ef5b693e943a05f13e462260cc8584', 'siswa.png', '1', 2021, 11),
(45, '0055239010', 'Ardan Diva Algandi', 'Bandung', '2005-07-02', 'L', 'Kp. Pasawahan RT:1 RW:12 Sayati Kec. Margahayu 40228', '3eb67bcabd8d01669b05c95fcf2037bb71b4baa3', 'siswa.png', '1', 2020, 13),
(46, '0051720903', 'ARJUNA BICS SAPUTRA', 'Bandung', '2005-05-15', 'L', 'CIJAGRA RT:5 RW:11 CILAMPENI Kec. Katapang', 'e1ac51277af7afe58ce0515f404da10df32f3677', 'siswa.png', '1', 2020, 13),
(47, '0068237908', 'Arti Febrianti', 'Bandung', '2006-02-16', 'P', 'Cikambuy Tengah RT:3 RW:7 Sangkanhurip Kec. Katapang 40971', 'cd15572f0583121cb48ba933bffe03cc2ecc0c80', 'siswi.png', '1', 2021, 12),
(48, '0074465861', 'Arum Mawarni', 'Bandung', '2008-08-06', 'P', 'Kp. Baraja RT:3 RW:20	Cilampeni Kec. Katapang', 'ae2a92e6ded3185c8680347968783c2879e96ff1', 'siswi.png', '1', 2022, 9),
(49, '0056952632', 'Asep Sonjaya', 'Bandung', '2005-09-20', 'L', 'Jl. Pasar Sayati Lama RT:5 RW:5 Sayati Kec. Margahayu 40226', '0ab14205ee2d12b841c1f7e7bedfebe9a03139db', 'siswa.png', '1', 2021, 12),
(50, '0065753240', 'Christianoval Xaverius F', 'Bandung', '2006-02-11', 'L', 'Jln Terusan Kopo Sayati no 274 RT:1 RW:7 Sayati Kec. Margahayu 40228', '159846deb12e6d24e3d747b1f1075321b26ea20b', 'siswa.png', '1', 2021, 8),
(51, '0072745563', 'Dani Setiawan', 'Bandung', '2007-02-02', 'L', 'Cilisung RT:1 RW:5 Sukamenak Kec. Margahayu 40227', '95deb6990c6c67593a03a2838974827d3a22e3ca', 'siswa.png', '1', 2022, 9),
(52, '0068875687', 'Danniel Jonas. PH', 'Bandung', '2006-05-25', 'L', 'Jln Cibolerang Sawargi RT:2 RW:7 Margasuka Kec. Babakan Ciparay', '07073de9f3ab7e0e2280410405f97e70f4c163b7', 'siswa.png', '1', 2021, 11),
(53, '0054402634', 'David Robiansyah', 'Bandung', '2005-12-24', 'L', 'Cilampeni RT:1 RW:5 Cilampeni Kec. Katapang 40726', '108c26a905bf3253d1450665da25d3987d080baa', 'siswa.png', '1', 2021, 12),
(54, '0059311473', 'Dean Octavian Ramadhan', 'Bandung', '2005-10-25', 'L', 'Kp. Sampora RT:1 RW:17 Sukamenak Kec. Margahayu 40227', '34b85099f8a20784a293fb3cd2f1a560d311ddc2', 'siswa.png', '1', 2021, 11),
(55, '0052263928', 'Deka Sbastian', 'Bandung', '2005-05-13', 'L', 'Kp. Baraja RT:3 RW:19 Cilampeni Kec. Kutawaringin 40971', '2db556c6ed1de9bc2ade23a1d73677bf2d3f9b6e', 'siswa.png', '1', 2022, 9),
(56, '0051528171', 'Delia Cahyani', 'Bandung', '2005-05-05', 'P', 'CILISUNG RT:5 RW:16 Sukamenak Kec. Margahayu 40227', 'eb4ddec5524096a018ae3ce12bc13aeade73a5c8', 'siswi.png', '1', 2020, 13),
(57, '0065716992', 'Desta Rexa Putra', 'Bandung', '2006-02-16', 'L', 'Cilokotot RT:4 RW:3 Margahayu Selatan Kec. Margahayu 40226', 'c064b466278a61440ac673691e139dce518d4471', 'siswa.png', '1', 2022, 9),
(58, '0074824303', 'Dewi Yulianti', 'Bandung', '2007-06-05', 'P', 'Kp. Daraulin RT::3 RW:6 Nanjung Kec. Margaasih 40217', '6e2734ba2d38c214ec5ad0bf7b31f48fc3e3ec04', 'siswi.png', '1', 2022, 8),
(59, '0064136428', 'Dhina Soviana', 'Bandung', '2006-05-17', 'P', 'Kp Bojong buah RT:1 RW:4 Pangauban Kec. Katapang 40971', '6ce7907f7742c646ce3d190fd762431e5f0f0cce', 'siswi.png', '1', 2022, 8),
(60, '0046168028', 'Diana Siti Komariah', 'Bandung', '2004-12-27', 'P', 'Kp. Pojok RT:1 RW:11 Cigindewah Hilir Kec. Margaasih 40214', 'dd35be321447f867e33f30bf5d0ff90e4d772ce3', 'siswi.png', '1', 2020, 14),
(61, '0053446666', 'DIENA PUTRI KAMILAIN', 'Bandung', '2005-08-17', 'P', 'Marken RT:2 RW:12 MARGAHAYU SELATAN Kec. Margahayu 40226', '73464215439cd56611c1e383862164847c1de20d', 'siswi.png', '1', 2021, 11),
(62, '0054580396', 'Dika Bagja Juliansyah', 'Bandung', '0005-07-24', 'L', 'Jl.peta	9	4	Sukaasih	Kec. Bojong Loa Kaler\r\n', '84c0b41fe47237b6a42134f95f2a6e4db5f0d315', 'siswa.png', '1', 2021, 12),
(63, '0067334667', 'DISMA AULA AGUSTIANSYAH', 'Bandung', '2006-11-18', 'L', 'Kp. Muara Ciwidey RT:1 RW:1 Cilampeni Kec. Katapang 40971', '05fdca9ab084429d6d8a84fa91e0242ea8ca5610', 'siswa.png', '1', 2022, 9),
(64, '0052287130', 'Edpan Nurdiansyah', 'Bandung', '2005-09-11', 'L', 'Cikambuy Hilir RT:1 RW:11 Sangkanhurip Kec. Katapangc40971', '23b98c51bc3c5fd13bb2381046b6759d62360895', 'siswa.png', '1', 2021, 12),
(65, '0079850089', 'EFRONSINA BEATRIXS NAUW', 'Seya', '2007-01-12', 'P', 'KAMPUNG WABAN RT:0 RW:0 MARE Kec. Mare', 'd3ba3edecb244048a6447d59c2d13b2369d62599', 'siswi.png', '1', 2022, 8),
(66, '0047249274', 'Erik Nugraha', 'Bandung', '2004-11-30', 'L', 'Kebon Kalapa RT:1 RW:6 Sukamenak Kec. Margahayu', '25a535265009dde91f8563a50bcb61ff75d77b08', 'siswa.png', '1', 2021, 12),
(67, '0078913236', 'Fadli Nugraha', 'Bandung', '2007-02-12', 'L', 'gg h abbas RT:1 RW:3 sayati Kec. Margahayu 40228', '85ab1194b2c568f52b3a859981bf8dd093f533b6', 'siswa.png', '1', 2022, 9),
(68, '0043190490', 'FAHMI TRI HAMDANI', 'Bandung', '2004-02-23', 'L', 'Kp. Bojong Buah	0	0	Pangauban	Kec. Katapang	40971\r\n', '8b5c6128f0e7289f1bf87164121e86b404e1313b', 'siswa.png', '1', 2020, 14),
(69, '0055662780', 'Fathur Rohman', 'Bandung', '2005-12-05', 'L', 'KP. KEBON KALAPA RT:1 RW:6 Sukamenak Kec. Margahayu 40227', '425bf7d4a429fb035aaefd5480991c180924e564', 'siswa.png', '1', 0000, 14),
(70, '0058132066', 'FAUZI RAHMAN RAMADAN', 'Bandung', '2005-10-29', 'L', 'Kp. Lemah Luhur RT:1 RW:4 Sukamukti Kec. Katapang 40971', '6ceacbefadc79e4559bc4351e92cc5caadfc4ac9', 'siswa.png', '1', 2021, 12),
(71, '0058484592', 'FRANSISKA D GOO', 'Godide', '2005-12-13', 'P', 'Jln Terusan Kopo RT:1 RW:4 Margahayu Selatan Kec. Margahayu 40226', '108f3f8fdcdf3449636d589829e8fccf86d5095d', 'siswi.png', '1', 2020, 14),
(72, '0078774437', 'FRISKA NISSA KHOIRRIN', 'Bandung', '2007-02-27', 'L', 'KP. CIKUNDUL RT:3 RW:9 KOPO Kec. Kutawaringin 40951', '60b1882f73c7a8c455b40908bc5aca05a17dc596', 'siswi.png', '1', 2022, 9),
(73, '0068822316', 'GENTA BUANA ATTAYA LAYSI', 'Bandung', '2006-09-06', 'L', 'Cikambuy Hilir RT:1 RW:11 Sangkanhurip Kec. Katapang 40971', '13a0f2b16f803789944f157ff9af6d67903faba8', 'siswa.png', '1', 2020, 0),
(74, '0068822316', 'GENTA BUANA ATTAYA LAYSI', 'Bandung', '2006-09-06', 'L', 'Cikambuy Hilir RT:1 RW:11 Sangkanhurip Kec. Katapang 40971', '13a0f2b16f803789944f157ff9af6d67903faba8', 'siswa.png', '1', 2020, 8),
(75, '0054088844', 'GITA MAHRANI', 'Bandung', '2005-03-06', 'P', 'JALAN MADESA RT:1 RW:12 KOPO Kec. Bojong Loa Kaler 40233', 'a83309ed027d83d365b1dce0dbe0324fb39925a4', 'siswi.png', '1', 2022, 8),
(76, '0077438677', 'Greysia Agniezka', 'Belinyu', '2007-12-29', 'P', 'PERUM PDP RT:9 RW:5 RENGASDENGKLOK UTARA Kec. Rengasdengklok 41352', '3084af4b1297e6bbfacb71ba7edda8556dd65bd0', 'siswi.png', '1', 2022, 8),
(77, '0042220456', 'Imam Fauzi Kurniawan', 'Bandung', '2004-12-23', 'L', 'Jl. Kopo Bihbul GG. Hj Idris No. 154 RT:2 RW:1 Sayati Kec. Margahayu 40228', 'b3ccf2aacd55110260836b89e5157a25d9596ffd', 'siswa.png', '1', 2020, 14),
(78, '0044935365', 'Indra Cahyadi', 'Bandung', '2004-03-23', 'L', 'Kp. Cilokotot RT:1 RW:3	Margahayu	Kec. Margahayu	40229', 'c06aa36f5895dbd914487515174b3d97de287bc2', 'siswa.png', '1', 2021, 12),
(79, '0048352825', 'INTAN RAMANDHA ALFARYSA', 'Bandung', '2004-10-30', 'P', 'Kp. Pasawahan RT:1 RW:12 Sayati Kec. Margahayu 40228', 'f7d64923801542a278b799897efa8669117c8211', 'siswi.png', '1', 2021, 12),
(80, '0073992800', 'JULIANA PUTRI INSAINI', 'Bandung', '2007-07-10', 'L', 'KP. MANGLID	RT:2 RW:10	MARGAHAYU SELATAN	Kec. Margahayu	40226', '02b6caddbe05ec29726aa18f290d734c8fd48bfc', 'siswi.png', '1', 2022, 8),
(81, '0068653219', 'Kania Nur Rachma Virgianti', 'Bandung', '2006-02-05', 'P', 'Kp. Muara Ciwidey RT:8 RW:4	Cilampeni	Kec. Katapang	40971', 'd45771514152f7783922673be419b7fe7b8cbc68', 'siswi.png', '1', 2021, 11),
(82, '0077399841', 'Kayla Syahranie', 'Bandung', '2007-09-12', 'P', 'Sayati Hilir RT:4 RW:8	Sayati 	Kec. Margahayu 40228', '9e126e2ae3cd63764192c6cc8e94240fc7342f14', 'siswi.png', '1', 2022, 9),
(83, '0043464255', 'LENNY KRISDAYANTI MARPAUNG', 'Medan', '2004-06-19', 'L', 'KMP PASAWAHAN	RT:3 RW:12	SAYATI	Kec. Margahayu	40230\r\n', '78bfa08b4f0a3a9c984969a5a1da80c6480934c8', 'siswi.png', '1', 2020, 13),
(84, '0065232450', 'LEVINA MARWA', 'Samanente', '2006-03-23', 'P', 'Jalan Seser RT:1 RW:1	Samanente	Kec. Tor Atas	99373', 'a5c3c9fd378f5d5dd631aef5e19e624d67febea5', 'siswi.png', '1', 2022, 9),
(85, '0062295754', 'Lisandy Aditya', 'Bandung', '2006-09-05', 'L', 'Cibedug Girang RT:6 RW:2	Cangkuang Wetan	Kec. Dayeuhkolot	40238', 'd0b1db800a99a4e9050b08b2ff0ffbfb05576566', 'siswa.png', '1', 2022, 9),
(86, '0056204005', 'LUCKY BAYU FIRMANSYAH', 'Bandung', '2005-06-09', 'L', 'Jl Sukamenak no 176	RT:0	RW:0	Sukamenak	Kec. Margahayu', '3934330a85357538b7588e343d91ab7cfda25911', 'siswa.png', '1', 2020, 14),
(87, '0046330734', 'M. ZIDAN DARMAWAN', 'Bandung', '2004-05-21', 'L', 'Jalan Saluyu Selatan	RT:4	RW:14	Sayati	Kec. Margahayu	40228', '2f66629c6ec37b84991cf01424d6cb3529b74789', 'siswa.png', '1', 2020, 14),
(88, '0057700438', 'Marissa Aulia', 'Bandung', '2005-03-17', 'L', 'Kp. Pasawahan RT:1 RW:12	Sayati	Kec. Margahayu	40228', 'f320bf5579bb7168cfe50b0731dacbb50c57e786', 'siswi.png', '1', 2020, 13),
(89, '0055469030', 'Marsha Aidina', 'Bandung', '2005-04-06', 'P', 'JL. MENGGER GIRANG RT:9 RW:8 Pasirluyu	Kec. Regol	40254', '66339c4ade8720f2b70a607af730450c0fe25ad4', 'siswi.png', '1', 2020, 14),
(90, '0054990344', 'MELSA ANETA', 'Bandung', '2005-09-11', 'P', 'Kp. Bojong Buah RT:2 RW:2	Pangauban	Kec. Katapang	40971', 'ca373fe544cf640576ae6dcb3adf5449d898133f', 'siswi.png', '1', 2021, 11),
(91, '0038206521', 'Miftahudin', 'Bandung', '2003-12-23', 'L', 'Sayati Lama	RT:5	RW:5	Sayati	Kec. Margahayu	40228', '776d8c91dddb00578c584f755ed6b32ccfcd4770', 'siswa.png', '1', 2020, 13),
(92, '0059325095', 'Moch Rival Mulyadi', 'Bandung', '2005-04-20', 'L', 'Gg. Manglid	RT:2	RW:10	Margahayu Selatan	Kec. Margahayu', '974ed776325cc77968440486bd1fd1cd34eb84f0', 'siswa.png', '1', 2020, 14),
(93, '0056002047', 'Moudi Dzahra Aprilianti', 'Bandung', '2005-04-17', 'P', 'Panyingkuran	RT:4	RW:8	Margahayu Selatan	Kec. Margahayu	40226', '9fd37ebf20b6de66610d82d56e6aa7f17aa67596', 'siswi.png', '1', 2021, 11),
(94, '0051296424', 'Mubarok Saefullatif', 'Bandung', '2005-12-15', 'L', 'Kp. Simpang Wetan	RT:3	RW:6	Sekarwangi	Kec. Soreang	40922', '038bbd29d4f7ef1690ee4fdde9810212eeb4a9bc', 'siswa.png', '1', 2020, 13),
(95, '0054875969', 'Muhamad Arya Saputra', 'Bandung', '2005-01-04', 'L', 'Citamiang Kaler	RT:2	RW:6	Cangkuang Kulon	Kec. Dayeuhkolot	40239', '6eab2c8c7e2ebd8a9a6bf332eb970f0c25d85139', 'siswa.png', '1', 2020, 13),
(96, '0057768019', 'Muhamad Evan Hadafid', 'Bandung', '2005-12-11', 'L', 'Kp. Junti Girang	RT:2	RW:9	Banyusari	Kec. Katapang	40971', 'c5c60f0bfd1c3935b7ac0eee8137b66c8ff6ae16', 'siswa.png', '1', 2022, 8),
(97, '0058870323', 'MUHAMAD FIRMAN ZULPIQRI', 'Bandung', '2005-06-01', 'L', 'Kopo Sayati	RT:2 RW:5 Sayati	Kec. Margahayu', 'ec727520d93413c12a93ace4118ddfa5f7e265b8', 'siswa.png', '1', 2020, 14),
(98, '0056579447', 'Muhamad Haikal Ramadhan', 'Garut', '2005-09-23', 'L', 'Cikambuy Hilir Perum Sukagalih			Sangkanhurip	Kec. Katapang\r\n', '840920293e7165aa52f9c23a76b4424d1090b269', 'siswa.png', '1', 2020, 14),
(99, '0048842663', 'Muhamad Wandy Gunawan', 'Bandung', '2004-05-06', 'L', 'Bojongkoneng	RT:1	RW:10	Rancamanyar	Kec. Baleendah	40375', 'b2536ccf83b3f57e4f0822c092b9efc8ed895667', 'siswa.png', '1', 2022, 9),
(100, '0065867283', 'Muhammad Akbar Wijaya', 'Bandung', '2006-01-17', 'L', 'Permata Kopo Blok A-114	RT:4	RW:9	Sayati	Kec. Margahayu', '595736778dd33eef1f174e80f13126df33e4291c', 'siswa.png', '1', 2022, 8),
(101, '0069331958', 'Muhammad Febriansyah', 'Bandung', '2006-02-11', 'L', 'JL. PAMOYANAN	RT:8	RW:3	PAMOYANAN	Kec. Cicendo	40173', '2c5f2f6d1427ed6e46e189777cc6fc79f810e693', 'siswa.png', '1', 2021, 12),
(102, '0051217037', 'MUHAMMAD GHATAN FADHILAH', 'Bandung', '2005-10-04', 'L', 'TERUSAN KOPO	RT:4	RW:4	SAYATI	Kec. Margahayu', 'a4de2b90f29829e44a0980a2202caf9cbb8fdb44', 'siswa.png', '1', 2021, 12),
(103, '0074695187', 'MUHAMMAD ILHAM AL-JAELANI', 'Bandung', '2007-07-19', 'L', 'CIBADUYUT RAYA	RT:3	RW:10	KEBON LEGA	Kec. Bojong Loa Kidul	40235', 'dae2b426595425a3e680941ff47d8b256e1dcba3', 'siswa.png', '1', 2022, 8),
(104, '0045377978', 'Muhammad Khoiruzzaman', 'Cimahi', '2004-12-01', 'L', 'Taman Bunga Sukamukti Blok H No. 13	RT:1	RW:15	Sukamukti	Kec. Katapang	40971', 'ad42124257d5c1308bde6d614c8328bc6994c073', 'siswa.png', '1', 2020, 13),
(105, '0071600187', 'MUHAMMAD RIVAN ORTEGA', 'Bandung', '2007-05-28', 'L', 'Margahayu kencana Rt/Rw, 06/14 Marsel 06/14 Marsel 			margahayu Selatan	Kec. Margahayu\r\n', '4fa0624f6c349587bb1eb47a30aac065420933e8', 'siswa.png', '1', 2022, 8),
(106, '0044100021', 'Nadia Wijayanti', 'Bandung', '2004-10-31', 'P', 'Gg H. Idris	RT:1	RW:1	Sayati	Kec. Margahayu	40228', '6c845b3f19c1eb0b3c37602f60d9ccb1c0337199', 'siswi.png', '1', 2021, 13),
(107, '0054271088', 'NAIA AULIA FITRIA', 'Bandung', '2005-11-05', 'P', 'Griya Antariksa Asri no 21	RT:0	RW:0	Sangkanhurip	Kec. Katapang', 'a5a63740b16b64250e921346a5890e349a9060c1', 'siswi.png', '1', 2020, 14),
(108, '0065464131', 'Naila Fika Abelia', 'Bandung', '2006-07-26', 'P', 'Kp. Lebak Muncang	RT:3	RW:17	Pameuntasan	Kec. Kutawaringin	40951', '8e1cfc241beaa50d0a6a9d180ad6efd9d8f7a614', 'siswi.png', '1', 2022, 9),
(109, '0074566620', 'Nailah Salsabila Adhwa', 'Bandung', '2007-01-07', 'P', 'Kp. Sukamulya	RT:3	RW:8	Pangauban	Kec. Katapang', 'aa31b7cff070ec137ce9847c3bcfac3d478e4880', 'siswi.png', '1', 2022, 8),
(110, '0066211946', 'NAJLA NOER KHALIDAH', 'Bandung', '2006-08-17', 'P', 'Komplek Gading Junti Asri	RT:3	RW:5	Sangkanhurip	Kec. Katapang	40971', '1b250207d819445bbe927fbc66b55104d5c20a0c', 'siswi.png', '1', 2022, 9),
(111, '0045880275', 'NATASYA ALVANI JUARIA', 'Bandung', '2003-05-26', 'P', 'Cicukang	RT:1	RW:3	Mekarrahayu	Kec. Margaasih', '4cdf266de64e37d4730b6216ba958f633542ad93', 'siswi.png', '1', 2020, 13),
(112, '0075407042', 'Naya Trihapsari', 'Bandung', '2007-01-29', 'P', 'g h sobandi	RT:0	RW:0	margahayu	Kec. Margahayu', '27ed7c70e0b1899574e7efc9aadc94fc4b043d59', 'siswi.png', '1', 2022, 9),
(113, '0074513271', 'Nayla Syahranie', 'Bandung', '2007-09-12', 'P', 'Sayati Hilir	RT:4	RW:8	Sayati	Kec. Margahayu	40228', '2389803c295db0e2cbb951830fda16fa32bc78e1', 'siswi.png', '1', 2022, 9),
(114, '0069681590', 'NAZWA FEBRIYANTHI', 'Bandung', '2006-02-20', 'P', 'Kp. Sukasari	RT:4	RW:12	Sangkanhurip	Kec. Katapang	40971', 'a7ea221047e2a329c5d698bbf34de75c6a98a956', 'siswi.png', '1', 2021, 11),
(115, '0076342702', 'Nazwa Kania Maharani', 'Bandung', '2007-01-10', 'P', 'Kp Bojong Buah RT:4	RW:2	Panguban	Kec. Katapang	40971', '164334a4fe3006396906233f48e5bbb902cc6fe5', 'siswi.png', '1', 2022, 9),
(116, '0073600995', 'Nelza Fitri Pebriani', 'Bandung', '2007-02-19', 'P', 'Kp. Bojong Tanjung	RT:1	RW:12	Cangkuang Kulon	Kec. Dayeuhkolot	40238', '3463c098d22f8dc007602903153948374310920c', 'siswi.png', '1', 2022, 8),
(117, '0049094359', 'NOVA DESSY KURNIAWAN', 'Bandung', '2004-12-01', 'P', 'CIJAGRA	RT:5	RW:11	CILAMPENI	Kec. Katapang', '841ae75949604aac9de17a1f2564dcd4a18b8d00', 'siswi.png', '1', 2021, 11),
(118, '0073775210', 'NOVA RAMA DAYANTI', 'Bandung', '2003-11-01', 'P', 'Jalan Sayati Lama Gg. resmi	RT:5	RW:5	Sayati	Kec. Margahayu	40228', 'b38cf1ee688a8e9f5f55656de2a3efa4ba9b924a', 'siswi.png', '1', 2020, 14),
(119, '0047044204', 'Nugi Solihin', 'Bandung', '2004-08-16', 'L', 'Kp. Panyingkuran	RT:4	RW:8	Margahayu Selatan	Kec. Margahayu', '40bbd494cb63c0dac9750898fa2419e127263fc5', 'siswa.png', '1', 2020, 13),
(120, '0035703185', 'OKE LEGINA', 'Bandung', '2003-10-03', 'L', 'PALGENEP	RT:5	RW:5	MARGAHAYU SELATAN	Kec. Margahayu', '1c60612317aa9c53417b7e0fdc7e4abee3c29f8c', 'siswa.png', '1', 2020, 14),
(121, '0050819385', 'OLIVIA LATIFAH', 'Tangerang', '2005-07-15', 'P', 'PALGENAP KULON NO 107	RT:4	RW:5	Margahayu Selatan	Kec. Margahayu	40226', '2b20314a24e4780a943e48471d7fbc06409e0259', 'siswi.png', '1', 2020, 14),
(122, '0068014012', 'PEBRIYANTI FATIMAH HERDIANI', 'Ciamis', '2006-02-03', 'P', 'GEREWING	RT:11	RW:3	PASIRGEULIS	KEC. PADAHERANG	46384', '54ecf97b2021685b4cbec53b8cb545ed9645b683', 'siswi.png', '1', 2022, 11),
(123, '0079863596', 'PEDRO ARMANDO SITORUS', 'Bandung', '2007-03-21', 'L', 'KP. SEKELOA	RT:0	RW:0	MARGAHAYU SELATAN	Kec. Margahayu	40226', '20d9370e33e0e7cfa808ee40e4162419dd0f28e1', 'siswa.png', '1', 2022, 9),
(124, '0072817779', 'Pikri Cahya Pratama', 'Bandung', '2007-03-23', 'L', 'KP Bojong buah	RT:4	RW:3	Pangauban	Kec. Katapang	40971', 'ae53848e6a22a42542fcea151bb5be304ed6a803', 'siswa.png', '1', 2022, 9),
(125, '0063075322', 'Puput Rahmawati', 'Bandung', '2006-09-24', 'P', 'Kp. Pasawahan 	Sayati	Kec. Margahayu', '75526bbeb9775dd8bc91e8d40b73a20a665684c3', 'siswi.png', '1', 2022, 8),
(126, '0055725386', 'Putri Magdalena', 'Bandung', '2005-03-31', 'P', 'Jl. Kopo Cirangrang Gg. Melati I	RT:5	RW:3	Margasuka	Kec. Babakan Ciparay	40225', '03ce642f8996e417f873716d6a54dfad5fb618ed', 'siswi.png', '1', 2020, 13),
(127, '0069888407', 'Radith Sangkya Rajasha', 'Bandung', '2006-06-19', 'L', 'Gading	RT:1	RW:1	Cingcin	Kec. Soreang	40921', '1f29f8618c8859064fb032883cdd5e5280917f8a', 'siswa.png', '1', 2022, 8),
(128, '0069596769', 'RAFAEL ADITYA KUSBINTORO', 'Cimahi', '2006-08-23', 'L', 'Cilisung Kulon	RT:6	RW:16	Sukamenak	Kec. Medan Selayang	20227', '13627caeb4df76cdda3a4dc712524a6adf0e0456', 'siswa.png', '1', 2021, 12),
(129, '0078790818', 'Raihan Firdaus', 'Bandung', '2007-07-27', 'L', 'Kp.Cimareme	2	10	Cibodas	Kec. Kutawaringin	40951\r\n', '991af7a2b08a87cb84cce8e48da5c36fec6a2222', 'siswa.png', '1', 2022, 8),
(130, '0065047409', 'Raynald Fauzi Arifin', 'Bandung', '2006-12-07', 'L', 'Sayati	RT:7	RW:5	Margahayu Selatan	Kec. Margahayu	40228', '732d25b9db2d74220f3f11942d048eec4d24dc3e', 'siswa.png', '1', 2022, 9),
(131, '0066029630', 'RESMAYANTI', 'Cianjur', '2006-05-01', 'P', 'Kp. Muara Ciwidey RT.8 RW.4	Cilampeni	Kec. Katapang	40971', 'd04723540b1ac586428c5bdd18172c63721e45fe', 'siswi.png', '1', 2021, 11),
(132, '0065360375', 'Retno Astuti', 'Bandung', '2006-11-02', 'P', 'Pasawahan	RT:4	RW:0	Sayati	Kec. Margahayu	40228', 'b91b4b2ee9baa8d7015724a89078e703587bf5ea', 'siswi.png', '1', 2022, 8),
(133, '0062574292', 'Rhadit Umarli', 'Bandung', '2006-03-10', 'L', 'Kp Muara Ciwidey	RT:2	RW:1	Cilamoeni	Kec. Katapang	40971', 'b49739f90811ce104ccf5363bf1669b9bd612e2d', 'siswa.png', '1', 2021, 12),
(134, '0071478652', 'Ridho Rukmantara', 'Bandung', '2007-04-27', 'L', 'Kp Bojong buah	RT:4	RW:3	Pangauban	Kec. Katapang	40971', '9bc4f6ff946cefde564cab6fb978cece1d1aef4e', 'siswa.png', '1', 2022, 9),
(135, '0078098054', 'Rifani Agustina', 'Sumedang', '2007-08-26', 'P', 'Sukaluyu	RT:4	RW:7	Girimukti	Kec. Sumedang Utara	45352', '66125c9036825b880648a2307402754e5a52ea3c', 'siswa.png', '1', 2020, 9),
(136, '0075406897', 'RIFFA DWI AMELIA PUTRI', 'Bandung', '2007-01-26', 'P', 'PASAWAHAN	RT:4	RW:11	SAYATI	Kec. Margahayu	40228', '50da1a9089ca08107014171da971eebb6be042f8', 'siswi.png', '1', 2022, 9),
(137, '0068041032', 'RIFQI MUHAMAD FAHREZI', 'Bandung', '2005-10-03', 'L', 'Muara Ciwidey	RT:3	RW:1	Cilampeni	Kec. Katapang	40971', 'cf9a4122096fb054613db03ed1a16814bbb8c037', 'siswa.png', '1', 2021, 11),
(138, '0041527492', 'RINANGGA DHARMESTA ATYANTA', 'Bandung', '2004-11-01', 'L', 'Gading Junti Asri no 30	RT:0	RW:0	Sangkanhurip	Kec. Katapang', 'dec9344508fbd6edc461fc1d7f5c4d5ed04f3591', 'siswa.png', '1', 2020, 13),
(139, '0064114354', 'Rio Shagara', 'Bandung', '2006-04-21', 'L', 'Jl. Babakan Tarogong Gg. Bojong Asih 4	RT:8	RW:4	Babakan Tarogong	Kec. Bojong Loa Kaler	40232', 'd78ce3770ad0537dc8d6d8efa528f7b2880a9419', 'siswa.png', '1', 2022, 8),
(140, '0045842481', 'RISA RACHMAWATI DEWI', 'Bandung', '2004-09-13', 'P', 'Margahayu Permai Gg Ibrahim no 39	RT:0	RW:0	Mekarrahayu	Kec. Margaasih', '2aac41b7953f7a40c0b77dfc2448e40d3e8a87c4', 'siswi.png', '1', 2020, 14),
(141, '0064690535', 'Risma Fitria', 'Bandung', '2006-10-21', 'P', 'Saluyu Selatan	RT:3	RW:9	Sayati	Kec. Margahayu	40228', '2210539d7f081f4cf775583ef8180f00459a09ca', 'siswi.png', '1', 2022, 9),
(142, '0065940406', 'Rita', 'Cianjur', '2005-11-23', 'P', 'Taman Kopo Indah 1	RT:0	RW:0	Margahayu Selatan	Kec. Margahayu', 'dc1681626dafe3d2edf0de5e850d87db42ed329d', 'siswi.png', '1', 2020, 14),
(143, '0054631621', 'Robby Maulana Hendri', 'Jakarta', '2005-09-21', 'L', 'Gg. Hj Naweng no 17	RT:0	RW:0	Margahayu Selatan	Kec. Margahayu	40226', '4e765d7a83e5d4547c549f931407c59e48689035', 'siswa.png', '1', 2020, 14),
(144, '0065726927', 'ROBBY PERMANA', 'Bandung', '2006-07-26', 'L', 'Mulyasari	RT:2	RW:4	Gandasari	Kec. Katapang	40971', '03d00fcb09e8d8c7eddb0fdad58dfcc6f2221ffc', 'siswa.png', '1', 2021, 12),
(145, '0051882160', 'Saadah Nuraeni', 'Bandung', '2005-11-19', 'P', 'Sayati	RT:3	RW:6	Sayati	Kec. Margahayu	40227', 'c97344edaab2b960f3276e941b6a7091f4609575', 'siswi.png', '1', 2021, 12),
(146, '0078215300', 'Sahni Firansyah', 'Garut', '2007-04-16', 'L', 'Palgenep	RT:1	RW:5	Margahayu Selatan	Kec. Margahayu	40228', '1821ad86994d93c8ba521eb7f851581d3d59cfde', 'siswa.png', '1', 2022, 9),
(147, '0069459847', 'SALIM ABDULRAHMAN', 'Garut', '2006-05-27', 'L', 'Bojongbuah	RT:4	RW:4	Pangauban	Kec. Katapang	40971', '769a2b9c7853266ca6e1172d98bd590d9f6ff1fa', 'siswa.png', '1', 2022, 9),
(148, '0079312161', 'SALMA AZKIA NURLELI', 'Cianjur', '2007-03-29', 'P', 'KP.BONGAS	RT:4	RW:2	MEKARJAYA	Kec. Campaka	43263', '82d8528fd71d0c68f4739a8891cb617220c2c69a', 'siswi.png', '1', 2022, 8),
(149, '0053414771', 'Salma Destiyana Putri', 'Bandung', '2005-01-03', 'P', 'Cikambuy tengah	RT:2	RW:8	Sangkanhurip	Kec. Katapang	40971', 'b28b854c5d48cd38aabd2ebd072d629508c80f51', 'siswi.png', '1', 2020, 13),
(150, '0058044521', 'SALMA PUTRI HADIANI', 'Bandung', '2005-03-27', 'P', 'GG. H. SYUKUR	RT:5	RW:7	SAYATI	Kec. Margahayu	40226', '7cee1e4dfb344708bf01d27d9853c9b1d7c022a6', 'siswi.png', '1', 2022, 9),
(151, '0042586367', 'Salsa Dwi Rahmadiani', 'Bandung', '2004-12-05', 'P', 'Kp. Pasawahan	RT:0	RW:0	Sayati	Kec. Margahayu', 'b5414c5ede5199ea366f00d54a753788b0994153', 'siswi.png', '1', 2020, 13),
(152, '0052478481', 'SAMUEL LAMSOLEH SIMANJUNTAK', 'Bandung', '2005-03-13', 'L', 'KP. CILEBAK	RT:4	RW:2	RANCAMANYAR	Kec. Baleendah	40375', '67ba50cbd83ee5b7c0e8895a6e876201be0fbed4', 'siswa.png', '1', 2021, 12),
(153, '0085659321', 'SANGARA PUTRA WIWAHA', 'Bandung', '2008-01-05', 'L', 'JL. KARANGTINEUNG INDAH	RT:7	RW:1	CIPEDES	Kec. Sukajadi	40162', 'dcca41b131fbe8ac75cf3947e7917532db150d01', 'siswa.png', '1', 2022, 8),
(154, '0067606554', 'Satrio Ramadhan', 'Bandung', '2006-10-02', 'L', 'Pasawahan	RT:1	RW:12	Sayati	Kec. Margahayu	40228', '88230f56beb74133820d6b84cb43420c42d813b3', 'siswa.png', '1', 2022, 8),
(155, '0045152549', 'Sefa Aidil Herdiansyah S', 'Bandung', '2004-11-14', 'L', 'Citamiang Kaler	RT:2	RW:6	Cangkuang Kulon	Kec. Dayeuhkolot	40239', 'd55223dd418eeb162643aa240a7644aaa753773e', 'siswa.png', '1', 2020, 13),
(156, '0046555450', 'Seli Indah Purnama', 'Bandung', '2004-08-02', 'P', 'Pasawahan	4	11	Sayati	Kec. Margahayu\r\n', 'f6c201c904c6b60ee4ff6395505da56c2331526b', 'siswi.png', '1', 2020, 14),
(157, '0058612813', 'Sendi Rizki Saputra', 'Bandung', '2005-06-03', 'L', 'Kp. Sampora	RT:4	RW:17	Sukamenak	Kec. Margahayu', '59ae4d030612a05418810d7d8ada7391c86c29f5', 'siswa.png', '1', 2021, 11),
(158, '0038640661', 'Sidik Fajar', 'Bandung', '2003-07-16', 'L', 'Kp. Cicukang Gg H Ibrahim	RT:1	RW:1	Mekarrahayu	Kec. Margaasih', '74f7591e8729bf9fc12be82eb49095d689416d23', 'siswa.png', '1', 2020, 13),
(159, '3051916154', 'Silvi Nurlianti', 'Bandung', '2005-04-24', 'P', 'Kp. Malayu RT:01 RW:03 Mekarrahayu	Kec. Margaasih', 'f1e206b5512e6d6a7b590d3e9814f2e2d75fbf38', 'siswi.png', '1', 2020, 13),
(160, '0051537944', 'SILVIA ANGGRAENI', 'Bandung', '2005-06-05', 'P', 'Kp. Wangun	RT:2	RW:7	Weninggalih	Kec. Sindangkerta	40563', 'f17ce202edbe8c2cbe697b508aeaaf765f3a2b03', 'siswi.png', '1', 2021, 11),
(161, '0054831540', 'SIONITA TIRZA MNIBER', 'Payem', '2006-11-27', 'P', 'Jln Terusan Kopo no 399 A Margahayu	RT:1	RW:4	Margahayu Selatan	Kec. Margahayu	40226', '1a4162f7d18f2ad2d960f53b9ce4a73a7644bd78', 'siswi.png', '1', 2021, 11),
(162, '0053952062', 'Sipa Nurlatipah', 'Bandung', '2005-01-14', 'P', 'Sayati hilir	RT:4	RW:8	Sayati	Kec. Margahayu	40228', '3e7fa22ecf6fba6082984ccf71c64907405e4691', 'siswi.png', '1', 2021, 12),
(163, '0056814109', 'Siti Andriyani', 'Bandung', '2005-10-20', 'P', 'Jl. Sukamenak Kp. Curug dogdog	RT:5	RW:2	Sukamenak	Kec. Margahayu	40227', '20987759f136f063e0a57c47ea921c359601eb2d', 'siswi.png', '1', 2021, 12),
(164, '0062446749', 'Sri Nadila Septiani', 'Bandung', '2006-09-04', 'P', 'SUKAJADI	RT:5	RW:8	PANANJUNG	Kec. Cangkuang	40377', 'f2d625afffbe3f6622532c265eb6b53c0e801d16', 'siswi.png', '1', 2022, 8),
(165, '0054409232', 'Sukma Auliya Nata Buwana', 'Bogor', '2005-05-04', 'L', 'Cibogo Indah	RT:0	RW:0	Cangkuang Kulon	Kec. Dayeuhkolot', 'f902a297bc26cfd18f7dccda9e8526af08922e74', 'siswi.png', '1', 2020, 14),
(166, '3066635699', 'SYAHREZA DIANDRA DIRGANTARA', 'Bandung', '2006-09-13', 'L', 'KP. Cicukang	RT:2	RW:1	Mekarrahayu	Kec. Margaasih	40218', '1f27bee7b910b46af971a7cc0853039ef89ae717', 'siswa.png', '1', 2022, 8),
(167, '0065560700', 'Syfha Nuraeni', 'Bandung', '2006-07-17', 'P', 'Palgenep Kulon	RT:3	RW:5	Margahayu Selatan	Kec. Margahayu	40226', '989a5024cd6f0d843268f4e7d8cff2a1067fe929', 'siswi.png', '1', 2022, 8),
(168, '0061967025', 'Syifa Nurhotimah Rohdiansyah', 'Bandung', '2006-09-18', 'P', 'Kp Bojong buah RT:4	RW:1	Pangauban	Kec. Katapang	40971', '99d3da6a0ebdaddfd6f81133506b05b042201d07', 'siswi.png', '1', 2022, 9),
(169, '0065019305', 'TAZQIA CANTIKA ANANDA DEKA', 'Bandung', '2006-01-28', 'L', 'KP.BOJONG TANJUNG	RT:1	RW:25	SANGKANHURIP	Kec. Katapang	40971', 'f15806671d5191bc9fb6ac2480705142a53e72e8', 'siswi.png', '1', 2022, 9),
(170, '3063282022', 'Tsania Fauziah Karina', 'Bandung', '2006-12-02', 'P', 'Bojong Buah	RT:4	RW:1	PANGAUBAN	Kec. Katapang	40971', '4ad25632eba9a59287234adb7e95d86f55728629', 'siswi.png', '1', 2022, 8),
(171, '0057546245', 'VERONIKA GOO', 'Godide', '2005-02-01', 'P', 'Palgenep	RT:1	RW:4	Margahayu Selatan	Kec. Margahayu', 'defe7fc99067de019d923095c0d4e79049877d20', 'siswi.png', '1', 2020, 14),
(172, '0062703037', 'VILYA GRAZIANI ABABIL', 'Bandung', '2006-11-29', 'P', 'Kp Bojong	RT:3	RW:1	Sukamukti	Kec. Katapang	40971', '051cb2e8cfa89a920d97508c0ac5653d2ce93bea', 'siswi.png', '1', 2022, 8),
(173, '0065986597', 'Windi Indriani', 'Bandung', '2006-02-03', 'L', 'Kebon kalapa	RT:3	RW:6	Sukamenak	Kec. Margahayu	40227\r\n', '341ff96f421e1c982ab71865bda14356ac38e8ee', 'siswi.png', '1', 2021, 12),
(174, '0062409110', 'Wulan Suhaemi', 'Bandung', '2006-02-11', 'P', 'Gang Ukiran	RT:5	RW:6	Sayati	Kec. Margahayu	40228', 'b798784377fd8b24b3a7e91741ad3d0a4be0ef63', 'siswi.png', '1', 2021, 11),
(175, '0068899661', 'Yunus Nur Hakim', 'Bandung', '2006-07-30', 'L', 'Sindang Palay	RT:3	RW:5	Pangauban	Kec. Katapang	40971', '1cf2ee95c1bd146b2432c2056d4d9a0b1317291a', 'siswa.png', '1', 2021, 12),
(176, '0056740088', 'Zahra Fitri Nurdiyah', 'Bandung', '2005-07-28', 'P', 'Pasawahan	RT3	RW:12	Sayati	Kec. Margahayu	40228', '0b5b020373cf820b75e4be34ecaf4b6dff8d8612', 'siswi.png', '1', 2020, 13),
(177, '0054535733', 'Zakharia Yadias Surya Dwi Wibowo', 'Bandung', '2005-01-09', 'L', 'Komp. Permata Kopo Blok B No.79	RT:6	RW:11	Sayati	Kec. Margahayu	40228', 'ed36e0f9051e7e25a434405a8ed17f14f724de8f', 'siswa.png', '1', 2021, 12);

-- --------------------------------------------------------

--
-- Struktur dari tabel `tb_thajaran`
--

CREATE TABLE `tb_thajaran` (
  `id_thajaran` int(11) NOT NULL,
  `tahun_ajaran` varchar(30) NOT NULL,
  `status` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Struktur dari tabel `tb_walikelas`
--

CREATE TABLE `tb_walikelas` (
  `id_walikelas` int(11) NOT NULL,
  `id_guru` int(11) NOT NULL,
  `id_mkelas` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `tb_walikelas`
--

INSERT INTO `tb_walikelas` (`id_walikelas`, `id_guru`, `id_mkelas`) VALUES
(6, 9, 8),
(7, 38, 8),
(8, 37, 9),
(9, 11, 8),
(10, 8, 11);

-- --------------------------------------------------------

--
-- Struktur dari tabel `_logabsensi`
--

CREATE TABLE `_logabsensi` (
  `id_presensi` int(11) NOT NULL,
  `id_mengajar` int(11) NOT NULL,
  `id_siswa` int(11) NOT NULL,
  `tgl_absen` date NOT NULL,
  `ket` enum('H','I','S','T','A') NOT NULL,
  `pertemuan_ke` varchar(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `_logabsensi`
--

INSERT INTO `_logabsensi` (`id_presensi`, `id_mengajar`, `id_siswa`, `tgl_absen`, `ket`, `pertemuan_ke`) VALUES
(14, 16, 5, '2023-01-01', 'H', '3'),
(15, 16, 9, '2023-01-01', 'H', '3'),
(16, 16, 11, '2023-01-01', 'H', '3'),
(17, 16, 12, '2023-01-01', 'I', '3'),
(18, 16, 5, '2023-01-02', 'H', '4'),
(19, 16, 9, '2023-01-02', 'H', '4'),
(20, 16, 11, '2023-01-02', 'H', '4'),
(21, 16, 12, '2023-01-02', 'H', '4'),
(22, 17, 13, '2023-01-02', 'H', '3'),
(23, 18, 14, '2023-01-02', 'H', '2'),
(24, 16, 5, '2023-01-05', '', '5'),
(25, 16, 9, '2023-01-05', '', '5'),
(26, 16, 12, '2023-01-05', '', '5');

--
-- Indexes for dumped tables
--

--
-- Indeks untuk tabel `tb_absen`
--
ALTER TABLE `tb_absen`
  ADD PRIMARY KEY (`id_absen`);

--
-- Indeks untuk tabel `tb_admin`
--
ALTER TABLE `tb_admin`
  ADD PRIMARY KEY (`id_admin`);

--
-- Indeks untuk tabel `tb_guru`
--
ALTER TABLE `tb_guru`
  ADD PRIMARY KEY (`id_guru`);

--
-- Indeks untuk tabel `tb_kepsek`
--
ALTER TABLE `tb_kepsek`
  ADD PRIMARY KEY (`id_kepsek`);

--
-- Indeks untuk tabel `tb_master_mapel`
--
ALTER TABLE `tb_master_mapel`
  ADD PRIMARY KEY (`id_mapel`);

--
-- Indeks untuk tabel `tb_mengajar`
--
ALTER TABLE `tb_mengajar`
  ADD PRIMARY KEY (`id_mengajar`),
  ADD KEY `id_mapel` (`id_mapel`),
  ADD KEY `id_guru` (`id_guru`);

--
-- Indeks untuk tabel `tb_mkelas`
--
ALTER TABLE `tb_mkelas`
  ADD PRIMARY KEY (`id_mkelas`);

--
-- Indeks untuk tabel `tb_semester`
--
ALTER TABLE `tb_semester`
  ADD PRIMARY KEY (`id_semester`);

--
-- Indeks untuk tabel `tb_siswa`
--
ALTER TABLE `tb_siswa`
  ADD PRIMARY KEY (`id_siswa`);

--
-- Indeks untuk tabel `tb_thajaran`
--
ALTER TABLE `tb_thajaran`
  ADD PRIMARY KEY (`id_thajaran`);

--
-- Indeks untuk tabel `tb_walikelas`
--
ALTER TABLE `tb_walikelas`
  ADD PRIMARY KEY (`id_walikelas`),
  ADD KEY `id_guru` (`id_guru`);

--
-- Indeks untuk tabel `_logabsensi`
--
ALTER TABLE `_logabsensi`
  ADD PRIMARY KEY (`id_presensi`);

--
-- AUTO_INCREMENT untuk tabel yang dibuang
--

--
-- AUTO_INCREMENT untuk tabel `tb_absen`
--
ALTER TABLE `tb_absen`
  MODIFY `id_absen` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=21;

--
-- AUTO_INCREMENT untuk tabel `tb_admin`
--
ALTER TABLE `tb_admin`
  MODIFY `id_admin` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT untuk tabel `tb_guru`
--
ALTER TABLE `tb_guru`
  MODIFY `id_guru` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=31;

--
-- AUTO_INCREMENT untuk tabel `tb_kepsek`
--
ALTER TABLE `tb_kepsek`
  MODIFY `id_kepsek` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT untuk tabel `tb_master_mapel`
--
ALTER TABLE `tb_master_mapel`
  MODIFY `id_mapel` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT untuk tabel `tb_mengajar`
--
ALTER TABLE `tb_mengajar`
  MODIFY `id_mengajar` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=19;

--
-- AUTO_INCREMENT untuk tabel `tb_mkelas`
--
ALTER TABLE `tb_mkelas`
  MODIFY `id_mkelas` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- AUTO_INCREMENT untuk tabel `tb_semester`
--
ALTER TABLE `tb_semester`
  MODIFY `id_semester` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT untuk tabel `tb_siswa`
--
ALTER TABLE `tb_siswa`
  MODIFY `id_siswa` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=178;

--
-- AUTO_INCREMENT untuk tabel `tb_thajaran`
--
ALTER TABLE `tb_thajaran`
  MODIFY `id_thajaran` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT untuk tabel `tb_walikelas`
--
ALTER TABLE `tb_walikelas`
  MODIFY `id_walikelas` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT untuk tabel `_logabsensi`
--
ALTER TABLE `_logabsensi`
  MODIFY `id_presensi` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=27;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
