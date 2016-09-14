-- phpMyAdmin SQL Dump
-- version 4.2.7.1
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: 10 Mar 2016 pada 09.38
-- Versi Server: 5.6.20
-- PHP Version: 5.5.15

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `db_bima`
--

-- --------------------------------------------------------

--
-- Struktur dari tabel `akses`
--

CREATE TABLE IF NOT EXISTS `akses` (
`id_akses` int(11) NOT NULL,
  `hak` varchar(20) NOT NULL
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=5 ;

--
-- Dumping data untuk tabel `akses`
--

INSERT INTO `akses` (`id_akses`, `hak`) VALUES
(1, 'Admin'),
(2, 'FTC'),
(3, 'Microstodex'),
(4, 'Forexperia');

-- --------------------------------------------------------

--
-- Struktur dari tabel `bank`
--

CREATE TABLE IF NOT EXISTS `bank` (
  `id_bank` varchar(2) NOT NULL,
  `bank` varchar(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `bank`
--

INSERT INTO `bank` (`id_bank`, `bank`) VALUES
('B1', 'Mandiri'),
('B2', 'BCA'),
('B3', 'BRI');

-- --------------------------------------------------------

--
-- Struktur dari tabel `ftc_kelas`
--

CREATE TABLE IF NOT EXISTS `ftc_kelas` (
  `id_kelas` varchar(2) NOT NULL,
  `tipe_kelas` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `ftc_kelas`
--

INSERT INTO `ftc_kelas` (`id_kelas`, `tipe_kelas`) VALUES
('K1', 'Reguler Offline'),
('K2', 'Private Offline'),
('K3', 'Reguler Online'),
('K4', 'Private Online');

-- --------------------------------------------------------

--
-- Struktur dari tabel `ftc_murid`
--

CREATE TABLE IF NOT EXISTS `ftc_murid` (
  `id_murid` varchar(7) NOT NULL,
  `tgl_registrasi` date NOT NULL,
  `nama` varchar(100) NOT NULL,
  `tempat_lahir` varchar(100) NOT NULL,
  `tgl_lahir` date NOT NULL,
  `alamat` text NOT NULL,
  `no_telp` varchar(12) NOT NULL,
  `email` varchar(100) DEFAULT NULL,
  `pin_bb` varchar(8) DEFAULT NULL,
  `pekerjaan` varchar(100) NOT NULL,
  `id_penghasilan` varchar(2) NOT NULL,
  `id_kelas` varchar(2) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `ftc_murid`
--

INSERT INTO `ftc_murid` (`id_murid`, `tgl_registrasi`, `nama`, `tempat_lahir`, `tgl_lahir`, `alamat`, `no_telp`, `email`, `pin_bb`, `pekerjaan`, `id_penghasilan`, `id_kelas`) VALUES
('MR00002', '2014-10-13', 'Nur Lailatull', 'Malangg', '1993-06-22', 'Jalan Teluk Pelabuhan Ratu 53, Blimbingg', '081945908672', 'ilatul3@gmail.co.id', '7B9D0A28', 'Mahasiswa', 'P2', 'K2'),
('MR00003', '2015-12-12', 'Melly', 'Tulung Agung', '1994-01-01', 'Griya Shanta', '085767124524', 'melly@gmail.com', '7jdhsfsd', 'Mahasiswa', 'P1', 'K1'),
('MR00004', '0000-00-00', 'Nur Lailatul', 'Malang', '0000-00-00', 'Jalan Teluk Pelabuhan Ratu 53, Blimbing', '081945908673', 'ilatul3@gmail.com', '7B9D0A29', 'Mahasiswa', '''', 'K1'),
('MR00005', '0000-00-00', 'Melly', 'Tulung Agung', '0000-00-00', 'Griya Shanta', '085767124524', 'melly@gmail.com', '7jdhsfsd', 'Mahasiswa', '<b', 'K2');

-- --------------------------------------------------------

--
-- Struktur dari tabel `ftc_penghasilan`
--

CREATE TABLE IF NOT EXISTS `ftc_penghasilan` (
  `id_penghasilan` varchar(2) NOT NULL,
  `penghasilan` varchar(200) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `ftc_penghasilan`
--

INSERT INTO `ftc_penghasilan` (`id_penghasilan`, `penghasilan`) VALUES
('P1', '10 Juta s/d 50 Juta Per Tahun'),
('P2', '50 Juta s/d 100 Juta Per Tahun'),
('P3', '> 101 Juta');

-- --------------------------------------------------------

--
-- Struktur dari tabel `fxp_client`
--

CREATE TABLE IF NOT EXISTS `fxp_client` (
  `id_client` varchar(7) NOT NULL,
  `tgl_daftar` date NOT NULL,
  `nama` varchar(100) NOT NULL,
  `no_akun` int(8) NOT NULL,
  `alamat` text NOT NULL,
  `no_telp` varchar(12) NOT NULL,
  `email` varchar(150) DEFAULT NULL,
  `id_bank` varchar(2) NOT NULL,
  `no_rek` varchar(30) NOT NULL,
  `id_tipe_akun` varchar(2) NOT NULL,
  `id_ib` varchar(7) NOT NULL,
  `scan_id` text,
  `password` varchar(100) NOT NULL,
  `phone_password` varchar(100) NOT NULL,
  `pin` varchar(7) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `fxp_client`
--

INSERT INTO `fxp_client` (`id_client`, `tgl_daftar`, `nama`, `no_akun`, `alamat`, `no_telp`, `email`, `id_bank`, `no_rek`, `id_tipe_akun`, `id_ib`, `scan_id`, `password`, `phone_password`, `pin`) VALUES
('FXC0001', '2015-06-06', 'Syifaul Hudriyah', 23523513, 'Jalan Merjosari Barat 42', '081378346861', 'leoniest01@yahoo.co.id', 'B1', '73465', 'B2', 'FXI0003', 'B612-2015-07-10-15-37-58.jpg', '1242', '12412', '2412'),
('FXC0002', '2015-12-02', 'Elis Maulidiyah', 146928147, 'Jalan Kertopamuji 34', '089964512748', 'elis@gmail.com', 'B1', '421424', 'B1', 'FXI0002', '412512', 'vsdgst53523', '4124sfasf', '4142421'),
('FXC0003', '2015-12-02', 'Muhammad Wildan Alaudin', 146928147, 'Jalan Sigura-Gura 12', '0341477502', 'mesutwildan@gmail.com', 'B1', '421424', 'B1', 'FXI0002', '125150301111034_Elis Maulidiyah.jpg', '66326', '23523', '2353253'),
('FXC0004', '2015-03-03', 'Winda Nimah', 4122412, 'Gresik', '085778462384', 'winda@gmail.com', 'B1', '4351512', 'B1', 'FXI0001', '125150300111004_Nur Lailatul Choiriyah.jpg', 'winda311', '4321422', '4321423');

-- --------------------------------------------------------

--
-- Struktur dari tabel `fxp_ib`
--

CREATE TABLE IF NOT EXISTS `fxp_ib` (
  `id_ib` varchar(7) NOT NULL,
  `nama_ib` varchar(100) NOT NULL,
  `alamat` text NOT NULL,
  `no_telp` varchar(12) NOT NULL,
  `email` varchar(150) DEFAULT NULL,
  `pin_bb` varchar(8) NOT NULL,
  `id_bank` varchar(2) NOT NULL,
  `no_rek` varchar(30) NOT NULL,
  `website` varchar(200) DEFAULT NULL,
  `scan_id` text
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `fxp_ib`
--

INSERT INTO `fxp_ib` (`id_ib`, `nama_ib`, `alamat`, `no_telp`, `email`, `pin_bb`, `id_bank`, `no_rek`, `website`, `scan_id`) VALUES
('FXI0001', 'Nur Lailatul Choiriyah', 'Arjosarii', '03414785511', 'a@yahoo.com', '2121', 'B2', '8798', '', '13232131'),
('FXI0002', 'Wynda', 'Jalan Teluk Cendrawasih 45', '0341477502', 'wynda@gmail.com', '786969', 'B1', '421424', '', '214124214'),
('FXI0003', 'Elis Maulidiyah', 'Jalan Kertopamuji 34 Dinoyo', '542625353512', 'jhkl@gmail.com', '7889ihlk', 'B3', '421424', '', 'IMG_20150719_195241.jpg'),
('FXI0004', 'Ainin Nur Asiyahh', 'Jalan Sumbersari Gang 3 Dinoyoo', '085772642896', 'ainin@gmail.co.id', '7iahsfhS', 'B2', '43524123', '', 'B612-2015-07-01-21-30-43.jpg');

-- --------------------------------------------------------

--
-- Struktur dari tabel `fxp_transaksi`
--

CREATE TABLE IF NOT EXISTS `fxp_transaksi` (
  `id_transaksi` varchar(7) NOT NULL,
  `id_jenis_transaksi` varchar(2) NOT NULL,
  `tgl_transaksi` date NOT NULL,
  `id_client` varchar(7) NOT NULL,
  `jumlah_transaksi` int(9) NOT NULL,
  `transfer_ke` varchar(100) NOT NULL,
  `laba_rugi` int(11) NOT NULL,
  `id_bank` varchar(2) NOT NULL,
  `id_ib` varchar(7) NOT NULL,
  `id_created` int(11) NOT NULL,
  `id_modified` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `fxp_transaksi`
--

INSERT INTO `fxp_transaksi` (`id_transaksi`, `id_jenis_transaksi`, `tgl_transaksi`, `id_client`, `jumlah_transaksi`, `transfer_ke`, `laba_rugi`, `id_bank`, `id_ib`, `id_created`, `id_modified`) VALUES
('FXT0002', 'B1', '2015-12-12', 'FXC0001', 220000, '200000', 20000, 'B2', 'FXI0002', 0, 0),
('FXT0003', 'B2', '2015-12-12', 'FXC0001', 200000, '240000', -40000, 'B2', 'FXI0001', 0, 0),
('FXT0004', 'B1', '2015-10-11', 'FXC0001', 400000, '350000', 50000, 'B1', 'FXI0001', 0, 0),
('FXT0005', 'B2', '2015-10-11', 'FXC0001', 400000, '', 400000, 'B2', 'FXI0001', 0, 0),
('FXT0006', 'B1', '2015-10-11', 'FXC0002', 400000, '350000', 50000, 'B1', 'FXI0002', 0, 0),
('FXT0007', 'B1', '2016-01-19', 'FXC0001', 255550, '245500', 10050, 'B2', 'FXI0001', 0, 0),
('FXT0008', 'B1', '2016-01-20', 'FXC0002', 255550, '245500', 10050, 'B1', 'FXI0002', 0, 0),
('FXT0009', 'B1', '2016-01-20', 'FXC0001', 255550, '240000', 15550, 'B2', 'FXI0001', 7, 2),
('FXT0010', 'B1', '2014-01-01', 'FXC0003', 200000, '190800', 9200, 'B3', 'FXI0002', 7, 0),
('FXT0011', 'B1', '2014-01-01', 'FXC0002', 355000, '325000', 30000, 'B2', 'FXI0002', 7, 0),
('FXT0012', 'B2', '2014-01-01', 'FXC0004', 246700, '202500', 44200, 'B1', 'FXI0001', 7, 0);

-- --------------------------------------------------------

--
-- Struktur dari tabel `jenis_transaksi`
--

CREATE TABLE IF NOT EXISTS `jenis_transaksi` (
  `id_jenis_transaksi` varchar(2) NOT NULL,
  `jenis_transaksi` varchar(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `jenis_transaksi`
--

INSERT INTO `jenis_transaksi` (`id_jenis_transaksi`, `jenis_transaksi`) VALUES
('B1', 'Depo'),
('B2', 'WD');

-- --------------------------------------------------------

--
-- Struktur dari tabel `komisi`
--

CREATE TABLE IF NOT EXISTS `komisi` (
  `id_komisi` varchar(2) NOT NULL,
  `komisi` varchar(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `komisi`
--

INSERT INTO `komisi` (`id_komisi`, `komisi`) VALUES
('K0', 'Free'),
('K1', '1'),
('K2', '2');

-- --------------------------------------------------------

--
-- Struktur dari tabel `msd_client`
--

CREATE TABLE IF NOT EXISTS `msd_client` (
  `id_client` varchar(7) NOT NULL,
  `tgl_daftar` date NOT NULL,
  `nama` varchar(100) NOT NULL,
  `no_akun` int(8) NOT NULL,
  `alamat` text NOT NULL,
  `no_telp` varchar(12) NOT NULL,
  `email` varchar(150) DEFAULT NULL,
  `id_bank` varchar(2) NOT NULL,
  `no_rek` varchar(30) NOT NULL,
  `id_tipe_akun` varchar(2) NOT NULL,
  `id_komisi` varchar(2) NOT NULL,
  `id_ib` varchar(7) NOT NULL,
  `scan_id` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `msd_client`
--

INSERT INTO `msd_client` (`id_client`, `tgl_daftar`, `nama`, `no_akun`, `alamat`, `no_telp`, `email`, `id_bank`, `no_rek`, `id_tipe_akun`, `id_komisi`, `id_ib`, `scan_id`) VALUES
('MSC0001', '2015-12-12', 'Elis', 124242, 'Kertopamujii', '081945908673', 'elis@gmail.co.id', 'B1', '1241242', 'B1', 'K0', 'MSI0001', 'IMG_20150719_195241.jpg'),
('MSC0002', '2016-01-01', 'Wynda', 12345, 'Kertosentono', '085712345678', 'wynda.aja@gmail.com', 'B2', '54321', 'B2', 'K1', 'MSI0002', '0'),
('MSC0003', '2015-11-14', 'Ainin', 525, 'Sumbersari', '085741874928', 'ainin@gmail.com', 'B1', '421424', 'B2', 'K2', 'MSI0001', '214124214'),
('MSC0004', '2015-02-12', 'Nur Lailatul Choiriyah', 2147483647, 'Jalan Teluk Pelabuhan Ratu 53', '081945908673', 'ilatul3@gmail.com', 'B1', '4115421412412', 'B2', 'K0', 'MSI0001', 'B612-2015-07-15-17-28-44.jpg');

-- --------------------------------------------------------

--
-- Struktur dari tabel `msd_ib`
--

CREATE TABLE IF NOT EXISTS `msd_ib` (
  `id_ib` varchar(7) NOT NULL,
  `nama_ib` varchar(100) NOT NULL,
  `alamat` text NOT NULL,
  `no_telp` varchar(12) NOT NULL,
  `email` varchar(150) DEFAULT NULL,
  `pin_bb` varchar(8) NOT NULL,
  `id_bank` varchar(2) NOT NULL,
  `no_rek` varchar(30) NOT NULL,
  `website` varchar(200) DEFAULT NULL,
  `scan_id` text
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `msd_ib`
--

INSERT INTO `msd_ib` (`id_ib`, `nama_ib`, `alamat`, `no_telp`, `email`, `pin_bb`, `id_bank`, `no_rek`, `website`, `scan_id`) VALUES
('MSI0001', 'Melinda Rahman P', 'Jalan Watu Gong 27', '085772164126', 'melinda01@gmail.com', '7IASUF41', 'B2', '14412412', '', 'Menu 2.png'),
('MSI0002', 'Amie Muntamimahh', 'Jalan M.T Haryono 11', '082373658374', 'amie@gmail.co.id', '5B786FUB', 'B2', '86567576576', 'http://www.dgasd.co.id', 'B612-2015-06-26-21-20-01.jpg'),
('MSI0003', 'Zainul Arifin', 'Jalan Teluk Mandar 87', '089878214628', 'zainul@gmail.com', '5JKASD42', 'B3', '5223523523', '', 'IMG_20150719_195241.jpg'),
('MSI0004', 'Siti Nafiah', 'Jalan Pulosari Gang 4 No 56', '085289147129', 'siti@gmail.com', '5JKHK214', 'B3', '414`24`2', '', '');

-- --------------------------------------------------------

--
-- Struktur dari tabel `msd_transaksi`
--

CREATE TABLE IF NOT EXISTS `msd_transaksi` (
  `id_transaksi` varchar(7) NOT NULL,
  `id_jenis_transaksi` varchar(2) NOT NULL,
  `tgl_transaksi` date NOT NULL,
  `id_client` varchar(7) NOT NULL,
  `jumlah_transaksi` int(9) NOT NULL,
  `id_bank` varchar(2) NOT NULL,
  `id_ib` varchar(7) NOT NULL,
  `id_created` int(11) NOT NULL,
  `id_modified` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `msd_transaksi`
--

INSERT INTO `msd_transaksi` (`id_transaksi`, `id_jenis_transaksi`, `tgl_transaksi`, `id_client`, `jumlah_transaksi`, `id_bank`, `id_ib`, `id_created`, `id_modified`) VALUES
('MST0001', 'B1', '2015-11-02', 'MSC0001', 2200000, 'B1', 'MSI0001', 0, 0),
('MST0002', 'B2', '2015-11-03', 'MSC0002', 150000, 'B2', 'MSI0001', 0, 0),
('MST0003', 'B1', '2015-12-12', 'MSC0001', 100000, 'B2', 'MSI0002', 0, 0),
('MST0004', 'B1', '2016-01-01', 'MSC0002', 220000, 'B2', 'MSI0002', 0, 0),
('MST0005', 'B1', '2015-11-03', 'MSC0002', 400000, 'B1', 'MSI0001', 0, 0),
('MST0006', 'B2', '2015-12-13', 'MSC0001', 150000, 'B2', 'MSI0001', 0, 0),
('MST0007', 'B1', '2015-11-03', 'MSC0001', 150000, 'B1', 'MSI0001', 0, 0),
('MST0008', 'B2', '2015-12-13', 'MSC0002', 1000000, 'B2', 'MSI0002', 0, 0),
('MST0009', 'B1', '2016-01-01', 'MSC0002', 1200000, 'B1', 'MSI0001', 0, 0),
('MST0010', 'B1', '2016-01-01', 'MSC0001', 1350000, 'B1', 'MSI0001', 0, 0),
('MST0011', 'B1', '2015-11-03', 'MSC0001', 200000, 'B1', 'MSI0001', 0, 0),
('MST0012', 'B2', '2013-08-30', 'MSC0002', 1220000, 'B2', 'MSI0002', 0, 2),
('MST0013', 'B1', '2015-10-01', 'MSC0001', 2000000, 'B1', 'MSI0001', 0, 0),
('MST0014', 'B2', '2015-11-03', 'MSC0002', 150000, 'B2', 'MSI0001', 0, 0),
('MST0015', 'B1', '2015-12-12', 'MSC0001', 100000, 'B2', 'MSI0002', 0, 0),
('MST0017', 'B1', '2015-11-03', 'MSC0002', 400000, 'B1', 'MSI0001', 0, 0),
('MST0019', 'B1', '2015-11-03', 'MSC0001', 150000, 'B1', 'MSI0001', 0, 0),
('MST0020', 'B2', '2015-12-13', 'MSC0002', 1000000, 'B2', 'MSI0002', 0, 0),
('MST0021', 'B1', '2016-01-01', 'MSC0002', 1200000, 'B1', 'MSI0001', 0, 0),
('MST0022', 'B1', '2016-01-01', 'MSC0001', 1350000, 'B1', 'MSI0001', 0, 0),
('MST0023', 'B1', '2015-11-03', 'MSC0001', 200000, 'B1', 'MSI0001', 0, 0),
('MST0024', 'B1', '2015-10-01', 'MSC0001', 1220000, 'B1', 'MSI0001', 0, 0),
('MST0026', 'B2', '2015-11-03', 'MSC0002', 150000, 'B2', 'MSI0001', 0, 0),
('MST0027', 'B1', '2015-12-12', 'MSC0001', 100000, 'B2', 'MSI0002', 0, 0),
('MST0029', 'B1', '2015-11-03', 'MSC0002', 400000, 'B1', 'MSI0001', 0, 0),
('MST0031', 'B1', '2015-11-03', 'MSC0001', 150000, 'B1', 'MSI0001', 0, 0),
('MST0032', 'B2', '2015-12-13', 'MSC0002', 1000000, 'B2', 'MSI0002', 0, 0),
('MST0033', 'B1', '2016-01-01', 'MSC0002', 1200000, 'B1', 'MSI0001', 0, 0),
('MST0034', 'B1', '2016-01-01', 'MSC0001', 1350000, 'B1', 'MSI0001', 0, 0),
('MST0035', 'B1', '2015-11-03', 'MSC0001', 200000, 'B1', 'MSI0001', 0, 0),
('MST0036', 'B1', '2015-10-01', 'MSC0001', 220000, 'B2', 'MSI0001', 0, 2),
('MST0037', 'B1', '2015-10-01', 'MSC0001', 200000, 'B2', 'MSI0001', 0, 0),
('MST0038', 'B2', '2015-11-03', 'MSC0002', 150000, 'B2', 'MSI0001', 0, 0),
('MST0039', 'B1', '2015-12-12', 'MSC0001', 100000, 'B2', 'MSI0002', 0, 0),
('MST0041', 'B1', '2015-11-03', 'MSC0002', 400000, 'B1', 'MSI0001', 0, 0),
('MST0042', 'B2', '2015-12-13', 'MSC0001', 150000, 'B2', 'MSI0001', 0, 0),
('MST0043', 'B1', '2015-11-03', 'MSC0001', 150000, 'B1', 'MSI0001', 0, 0),
('MST0044', 'B2', '2015-12-13', 'MSC0002', 1000000, 'B2', 'MSI0002', 0, 0),
('MST0045', 'B1', '2016-01-01', 'MSC0002', 1200000, 'B1', 'MSI0001', 0, 0),
('MST0046', 'B1', '2016-01-01', 'MSC0001', 1350000, 'B1', 'MSI0001', 0, 0),
('MST0047', 'B1', '2015-11-03', 'MSC0001', 200000, 'B1', 'MSI0001', 0, 0),
('MST0048', 'B1', '2015-10-01', 'MSC0002', 220000, 'B1', 'MSI0002', 0, 0),
('MST0049', 'B2', '2015-12-13', 'MSC0001', 200000, 'B1', 'MSI0001', 0, 0),
('MST0050', 'B2', '2016-09-02', 'MSC0001', 255550, 'B1', 'MSI0001', 0, 6),
('MST0051', 'B1', '2015-11-01', 'MSC0001', 400000, 'B1', 'MSI0001', 6, 6);

-- --------------------------------------------------------

--
-- Struktur dari tabel `tipe_akun`
--

CREATE TABLE IF NOT EXISTS `tipe_akun` (
  `id_tipe_akun` varchar(2) NOT NULL,
  `tipe_akun` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `tipe_akun`
--

INSERT INTO `tipe_akun` (`id_tipe_akun`, `tipe_akun`) VALUES
('B1', 'Micro'),
('B2', 'Mini');

-- --------------------------------------------------------

--
-- Struktur dari tabel `user`
--

CREATE TABLE IF NOT EXISTS `user` (
`id_user` int(4) NOT NULL,
  `username` varchar(100) NOT NULL,
  `password` varchar(255) NOT NULL,
  `nama` varchar(255) NOT NULL,
  `email` varchar(100) DEFAULT NULL,
  `level` int(1) NOT NULL,
  `salt` binary(20) NOT NULL
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=9 ;

--
-- Dumping data untuk tabel `user`
--

INSERT INTO `user` (`id_user`, `username`, `password`, `nama`, `email`, `level`, `salt`) VALUES
(2, 'admin', 'e5326c6a08e87d361c52aea3bbb49a3f024823970fe013c9ebe3731c9936a65d', 'Administrator', 'admin@gmail.com', 1, 0x6a253d0ca15b39321ac00f45b09756e902f65e4f),
(5, 'ila', '3ab73d60dba90b3c2746532da86aa35833fa4a8709bb6c5eaf108ee41a737f7e', 'Nur Lailatul', 'ilatul3@gmail.com', 2, 0xc4161e4dc690db0ef350df6e8a73cfd552716ad6),
(6, 'bima', '03adba3fb02c1e1eaab03aa24845572819eb88a6a7ea6758763340ecfc4b68e9', 'Bima', 'bima@gmail.com', 3, 0x5c1d5ba8483a3dac5cad1efeadfceea96be91b67),
(7, 'forex', 'a59dd46a16c986724ee7ca1461e8dd5ca98e6393e2593b8d3f2b75fd33c9b0b8', 'forex', 'forex@gmail.com', 4, 0x73f81694d97c1c9d4862d7bbce9bce0279916f5e),
(8, 'admin', '8fcc5321bb34971960d2b07b5154c1941ec2cbf230f06c114700ae2ba51b52c0', 'Administrator', 'admin@gmail.com', 1, 0x85e56f4869991c2c6cc5509e51206947593b50b1);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `akses`
--
ALTER TABLE `akses`
 ADD PRIMARY KEY (`id_akses`);

--
-- Indexes for table `bank`
--
ALTER TABLE `bank`
 ADD PRIMARY KEY (`id_bank`);

--
-- Indexes for table `ftc_kelas`
--
ALTER TABLE `ftc_kelas`
 ADD PRIMARY KEY (`id_kelas`);

--
-- Indexes for table `ftc_murid`
--
ALTER TABLE `ftc_murid`
 ADD PRIMARY KEY (`id_murid`);

--
-- Indexes for table `ftc_penghasilan`
--
ALTER TABLE `ftc_penghasilan`
 ADD PRIMARY KEY (`id_penghasilan`);

--
-- Indexes for table `fxp_client`
--
ALTER TABLE `fxp_client`
 ADD PRIMARY KEY (`id_client`);

--
-- Indexes for table `fxp_ib`
--
ALTER TABLE `fxp_ib`
 ADD PRIMARY KEY (`id_ib`);

--
-- Indexes for table `fxp_transaksi`
--
ALTER TABLE `fxp_transaksi`
 ADD PRIMARY KEY (`id_transaksi`);

--
-- Indexes for table `jenis_transaksi`
--
ALTER TABLE `jenis_transaksi`
 ADD PRIMARY KEY (`id_jenis_transaksi`);

--
-- Indexes for table `komisi`
--
ALTER TABLE `komisi`
 ADD PRIMARY KEY (`id_komisi`);

--
-- Indexes for table `msd_client`
--
ALTER TABLE `msd_client`
 ADD PRIMARY KEY (`id_client`);

--
-- Indexes for table `msd_ib`
--
ALTER TABLE `msd_ib`
 ADD PRIMARY KEY (`id_ib`);

--
-- Indexes for table `msd_transaksi`
--
ALTER TABLE `msd_transaksi`
 ADD PRIMARY KEY (`id_transaksi`);

--
-- Indexes for table `tipe_akun`
--
ALTER TABLE `tipe_akun`
 ADD PRIMARY KEY (`id_tipe_akun`);

--
-- Indexes for table `user`
--
ALTER TABLE `user`
 ADD PRIMARY KEY (`id_user`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `akses`
--
ALTER TABLE `akses`
MODIFY `id_akses` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=5;
--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
MODIFY `id_user` int(4) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=9;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
