-- phpMyAdmin SQL Dump
-- version 5.0.4
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Feb 22, 2021 at 01:42 PM
-- Server version: 10.4.17-MariaDB
-- PHP Version: 7.4.15

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `tms`
--

-- --------------------------------------------------------

--
-- Table structure for table `analisa_elliott`
--

CREATE TABLE `analisa_elliott` (
  `ID` int(11) NOT NULL,
  `AnalisaID` varchar(12) NOT NULL,
  `SymbolID` varchar(6) DEFAULT NULL,
  `JangkaWaktuID` varchar(24) DEFAULT NULL,
  `ArahID` varchar(24) DEFAULT NULL,
  `RangkaianID` varchar(24) DEFAULT NULL,
  `StrukturID` varchar(24) DEFAULT NULL,
  `TipeID` varchar(24) DEFAULT NULL,
  `PolaID` varchar(24) DEFAULT NULL,
  `PosisiID` varchar(24) DEFAULT NULL,
  `DerajatID` varchar(24) DEFAULT NULL,
  `Aturan` text DEFAULT NULL,
  `Nilai` text DEFAULT NULL,
  `CatatanSebelum` text DEFAULT NULL,
  `CatatanSesudah` text NOT NULL,
  `CaptureSebelum` varchar(360) DEFAULT NULL,
  `CaptureSesudah` varchar(360) DEFAULT NULL,
  `StatusID` int(11) DEFAULT 1,
  `UserBuat` int(11) NOT NULL,
  `TglBuat` datetime NOT NULL DEFAULT current_timestamp(),
  `TglEdit` datetime DEFAULT NULL,
  `UserEdit` int(11) DEFAULT NULL,
  `Publish` enum('Private','Public') NOT NULL DEFAULT 'Private'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `analisa_simple`
--

CREATE TABLE `analisa_simple` (
  `ID` int(11) NOT NULL,
  `AnalisaID` varchar(12) NOT NULL,
  `SymbolID` varchar(6) DEFAULT NULL,
  `JangkaWaktuID` varchar(24) DEFAULT NULL,
  `ArahID` varchar(24) DEFAULT NULL,
  `AnalisaSimple` text NOT NULL,
  `CatatanSebelum` text DEFAULT NULL,
  `CatatanSesudah` text NOT NULL,
  `CaptureSebelum` varchar(360) DEFAULT NULL,
  `CaptureSesudah` varchar(360) DEFAULT NULL,
  `StatusID` int(11) DEFAULT 1,
  `UserBuat` int(11) NOT NULL,
  `TglBuat` datetime NOT NULL DEFAULT current_timestamp(),
  `TglEdit` datetime DEFAULT NULL,
  `UserEdit` int(11) DEFAULT NULL,
  `Publish` enum('Private','Public') NOT NULL DEFAULT 'Private'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `analisa_snd`
--

CREATE TABLE `analisa_snd` (
  `ID` int(11) NOT NULL,
  `AnalisaID` varchar(12) NOT NULL,
  `SymbolID` varchar(6) DEFAULT NULL,
  `JangkaWaktuID` varchar(24) DEFAULT NULL,
  `ArahID` varchar(24) DEFAULT NULL,
  `AreaSupply` varchar(128) DEFAULT NULL,
  `TglAreaSupply` datetime DEFAULT NULL,
  `TestAreaSupply` varchar(128) DEFAULT NULL,
  `AreaDemand` varchar(128) DEFAULT NULL,
  `TglAreaDemand` datetime DEFAULT NULL,
  `TestAreaDemand` varchar(128) DEFAULT NULL,
  `CatatanSebelum` text DEFAULT NULL,
  `CatatanSesudah` text DEFAULT NULL,
  `CaptureSebelum` varchar(360) DEFAULT NULL,
  `CaptureSesudah` varchar(360) DEFAULT NULL,
  `StatusID` int(11) DEFAULT 1,
  `UserBuat` int(11) NOT NULL,
  `TglBuat` datetime NOT NULL DEFAULT current_timestamp(),
  `TglEdit` datetime DEFAULT NULL,
  `UserEdit` int(11) DEFAULT NULL,
  `Publish` enum('Private','Public') NOT NULL DEFAULT 'Private'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `analisa_snr`
--

CREATE TABLE `analisa_snr` (
  `ID` int(11) NOT NULL,
  `AnalisaID` varchar(12) NOT NULL,
  `SymbolID` varchar(6) DEFAULT NULL,
  `JangkaWaktuID` varchar(24) DEFAULT NULL,
  `ArahID` varchar(24) DEFAULT NULL,
  `AreaResisten` varchar(128) DEFAULT NULL,
  `TglAreaResisten` datetime DEFAULT NULL,
  `TestAreaResisten` varchar(128) DEFAULT NULL,
  `AreaSupport` varchar(128) DEFAULT NULL,
  `TglAreaSupport` datetime DEFAULT NULL,
  `TestAreaSupport` varchar(128) DEFAULT NULL,
  `CatatanSebelum` text DEFAULT NULL,
  `CatatanSesudah` text NOT NULL,
  `CaptureSebelum` varchar(360) DEFAULT NULL,
  `CaptureSesudah` varchar(360) DEFAULT NULL,
  `StatusID` int(11) DEFAULT 1,
  `UserBuat` int(11) NOT NULL,
  `TglBuat` datetime NOT NULL DEFAULT current_timestamp(),
  `TglEdit` datetime DEFAULT NULL,
  `UserEdit` int(11) DEFAULT NULL,
  `Publish` enum('Private','Public') NOT NULL DEFAULT 'Private'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `app_modul`
--

CREATE TABLE `app_modul` (
  `ModulID` int(11) NOT NULL,
  `GroupModul` int(11) DEFAULT NULL,
  `Modul` varchar(50) NOT NULL,
  `Menu` varchar(50) DEFAULT NULL,
  `Link` varchar(255) NOT NULL,
  `Lokasi` varchar(255) NOT NULL,
  `Urutan` int(11) DEFAULT NULL,
  `UserBuat` int(11) NOT NULL,
  `TglBuat` datetime NOT NULL DEFAULT current_timestamp(),
  `UserEdit` int(11) DEFAULT NULL,
  `TglEdit` datetime DEFAULT NULL,
  `StatusID` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `app_modul`
--

INSERT INTO `app_modul` (`ModulID`, `GroupModul`, `Modul`, `Menu`, `Link`, `Lokasi`, `Urutan`, `UserBuat`, `TglBuat`, `UserEdit`, `TglEdit`, `StatusID`) VALUES
(1, 1, 'Analisa', 'Analisa', 'index.php?page=analisa', '/main/analisa', 1, 1, '2021-02-14 14:11:00', NULL, NULL, 11),
(2, 1, 'Rencana', 'Rencana', 'index.php?page=rencana', '/main/rencana', 2, 1, '2021-02-14 14:11:00', NULL, NULL, 11),
(3, 1, 'Jurnal', 'Jurnal', 'index.php?page=jurnal', '/main/jurnal', 3, 1, '2021-02-14 14:11:00', NULL, NULL, 11),
(4, 2, 'Analisa', 'Analisa', 'index.php?page=setting-analisa', '/setting/analisa', 1, 1, '2021-02-14 14:11:00', NULL, NULL, 11),
(5, 2, 'Akun', 'Akun', 'index.php?page=akun', '/setting/akun', 1, 1, '2021-02-14 14:11:00', NULL, NULL, 11);

-- --------------------------------------------------------

--
-- Table structure for table `app_modul_group`
--

CREATE TABLE `app_modul_group` (
  `GroupModulID` int(11) NOT NULL,
  `GroupModul` varchar(50) NOT NULL,
  `Urutan` int(11) DEFAULT NULL,
  `UserBuat` int(11) NOT NULL,
  `TglBuat` datetime NOT NULL DEFAULT current_timestamp(),
  `UserEdit` int(11) DEFAULT NULL,
  `TglEdit` datetime DEFAULT NULL,
  `StatusID` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `app_modul_group`
--

INSERT INTO `app_modul_group` (`GroupModulID`, `GroupModul`, `Urutan`, `UserBuat`, `TglBuat`, `UserEdit`, `TglEdit`, `StatusID`) VALUES
(1, 'Dashboard', 1, 1, '2021-02-14 13:54:49', NULL, NULL, 11),
(2, 'Pengaturan', 1, 1, '2021-02-14 13:55:25', NULL, NULL, 11);

-- --------------------------------------------------------

--
-- Table structure for table `app_modul_sub`
--

CREATE TABLE `app_modul_sub` (
  `SubModulID` int(11) NOT NULL,
  `ModulID` int(11) DEFAULT NULL,
  `SubModul` varchar(50) NOT NULL,
  `Slug` varchar(128) NOT NULL,
  `DataTable` varchar(255) NOT NULL,
  `Urutan` int(11) DEFAULT NULL,
  `UserBuat` int(11) NOT NULL,
  `TglBuat` datetime NOT NULL DEFAULT current_timestamp(),
  `UserEdit` int(11) DEFAULT NULL,
  `TglEdit` datetime DEFAULT NULL,
  `StatusID` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `app_modul_sub`
--

INSERT INTO `app_modul_sub` (`SubModulID`, `ModulID`, `SubModul`, `Slug`, `DataTable`, `Urutan`, `UserBuat`, `TglBuat`, `UserEdit`, `TglEdit`, `StatusID`) VALUES
(1, 1, 'Sederhana', 'simple', 'No,No. Analisa,Symbol,Jangka<br/>Waktu,Arah<br/>Dominan,Status,Aksi', 1, 1, '2021-02-19 23:19:24', NULL, NULL, 11),
(2, 1, 'Penawaran & Permintan', 'snd', '', 2, 1, '2021-02-19 23:19:24', NULL, NULL, 11),
(3, 1, 'Support & Resisten', 'snr', '', 3, 1, '2021-02-19 23:21:12', NULL, NULL, 11),
(4, 1, 'Gelombang Elliott', 'elliott', '', 4, 1, '2021-02-19 23:21:12', NULL, NULL, 11);

-- --------------------------------------------------------

--
-- Table structure for table `arah`
--

CREATE TABLE `arah` (
  `ArahID` int(11) NOT NULL,
  `Arah` varchar(50) NOT NULL,
  `Urutan` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `arah`
--

INSERT INTO `arah` (`ArahID`, `Arah`, `Urutan`) VALUES
(1, 'Bullish', NULL),
(2, 'Bearish', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `broker`
--

CREATE TABLE `broker` (
  `BrokerID` int(11) NOT NULL,
  `Broker` varchar(255) NOT NULL,
  `UserBuat` int(11) NOT NULL,
  `TglBuat` datetime NOT NULL DEFAULT current_timestamp(),
  `UserEdit` int(11) DEFAULT NULL,
  `TglEdit` datetime DEFAULT NULL,
  `Status` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `broker`
--

INSERT INTO `broker` (`BrokerID`, `Broker`, `UserBuat`, `TglBuat`, `UserEdit`, `TglEdit`, `Status`) VALUES
(1, 'XM', 1, '2021-02-16 12:09:17', NULL, NULL, 11),
(2, 'FBS', 1, '2021-02-16 12:09:17', NULL, NULL, 11);

-- --------------------------------------------------------

--
-- Table structure for table `jangkawaktu`
--

CREATE TABLE `jangkawaktu` (
  `JangkaWaktuID` int(11) NOT NULL,
  `JangkaWaktu` varchar(50) NOT NULL,
  `Urutan` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `jangkawaktu`
--

INSERT INTO `jangkawaktu` (`JangkaWaktuID`, `JangkaWaktu`, `Urutan`) VALUES
(1, 'M1', NULL),
(2, 'M5', NULL),
(3, 'M15', NULL),
(4, 'M30', NULL),
(5, 'H1', NULL),
(6, 'H4', NULL),
(7, 'Daily', NULL),
(8, 'Weekly', NULL),
(9, 'Monthly', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `jurnal`
--

CREATE TABLE `jurnal` (
  `ID` int(11) NOT NULL,
  `JurnalID` varchar(12) NOT NULL,
  `RencanaID` varchar(12) NOT NULL,
  `SymbolID` int(11) NOT NULL,
  `JangkaWaktuID` int(11) NOT NULL,
  `AksiID` int(11) NOT NULL,
  `WaktuMasuk` datetime DEFAULT NULL,
  `HargaMasuk` varchar(10) NOT NULL,
  `BatasRugi` varchar(10) NOT NULL,
  `AmbilUntung` varchar(10) NOT NULL,
  `SaldoAwal` varchar(10) NOT NULL,
  `Resiko` varchar(10) NOT NULL,
  `Lot` varchar(10) NOT NULL,
  `WaktuKeluar` datetime DEFAULT NULL,
  `AlasanKeluar` varchar(10) NOT NULL,
  `HargaKeluar` varchar(10) NOT NULL,
  `RugiPoint` varchar(10) NOT NULL,
  `UntungPoint` varchar(10) NOT NULL,
  `Kerugian` int(10) NOT NULL,
  `Keuntungan` int(10) NOT NULL,
  `Rasio` varchar(12) NOT NULL,
  `SaldoAkhir` varchar(10) NOT NULL,
  `CatatanSebelum` text NOT NULL,
  `CatatanSesudah` text NOT NULL,
  `CaptureSebelum` varchar(255) NOT NULL,
  `CaptureSesudah` varchar(255) NOT NULL,
  `StatusID` int(11) NOT NULL DEFAULT 1,
  `UserBuat` int(11) NOT NULL,
  `TglBuat` datetime NOT NULL DEFAULT current_timestamp(),
  `UserEdit` int(11) DEFAULT NULL,
  `TglEdit` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Triggers `jurnal`
--
DELIMITER $$
CREATE TRIGGER `update_saldoakhir_after_delete_jurnal` AFTER DELETE ON `jurnal` FOR EACH ROW BEGIN
IF OLD.Kerugian != 0 THEN
UPDATE user_akun_saldo SET SaldoAkhir = SaldoAkhir + ABS(OLD.Kerugian);
ELSEIF OLD.Keuntungan != 0 THEN
UPDATE user_akun_saldo SET SaldoAkhir = SaldoAkhir - OLD.Keuntungan;
END IF;
END
$$
DELIMITER ;
DELIMITER $$
CREATE TRIGGER `update_saldoakhir_after_insert_jurnal` AFTER INSERT ON `jurnal` FOR EACH ROW BEGIN
UPDATE user_akun_saldo SET SaldoAkhir = NEW.SaldoAkhir;
END
$$
DELIMITER ;
DELIMITER $$
CREATE TRIGGER `update_saldoakhir_after_update_jurnal` AFTER UPDATE ON `jurnal` FOR EACH ROW BEGIN
UPDATE user_akun_saldo SET SaldoAkhir = NEW.SaldoAkhir;
END
$$
DELIMITER ;

-- --------------------------------------------------------

--
-- Table structure for table `pasar`
--

CREATE TABLE `pasar` (
  `PasarID` int(11) NOT NULL,
  `Pasar` varchar(50) NOT NULL,
  `Urutan` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `pasar`
--

INSERT INTO `pasar` (`PasarID`, `Pasar`, `Urutan`) VALUES
(1, 'Forex', 1),
(2, 'Komoditas', 2),
(3, 'Saham', 3),
(4, 'Indeks', 4),
(5, 'Mata Uang Kripto', 5);

-- --------------------------------------------------------

--
-- Table structure for table `rencana`
--

CREATE TABLE `rencana` (
  `ID` int(11) NOT NULL,
  `RencanaID` varchar(12) NOT NULL,
  `AnalisaID` varchar(12) NOT NULL,
  `SymbolID` int(11) NOT NULL,
  `JangkaWaktuID` int(11) NOT NULL,
  `RencanaTipeID` int(11) NOT NULL,
  `RencanaAksiID` int(11) NOT NULL,
  `Harga` varchar(10) NOT NULL,
  `BatasRugi` varchar(10) NOT NULL,
  `AmbilUntung` varchar(10) NOT NULL,
  `RugiPoint` varchar(10) NOT NULL,
  `UntungPoint` varchar(10) NOT NULL,
  `SaldoAwal` varchar(10) NOT NULL,
  `Resiko` varchar(10) NOT NULL,
  `Lot` varchar(10) NOT NULL,
  `Rasio` varchar(12) NOT NULL,
  `Kerugian` int(10) NOT NULL,
  `Keuntungan` int(10) NOT NULL,
  `CatatanSebelum` text NOT NULL,
  `CatatanSesudah` text NOT NULL,
  `CaptureSebelum` varchar(255) NOT NULL,
  `CaptureSesudah` varchar(255) NOT NULL,
  `StatusID` int(11) NOT NULL DEFAULT 1,
  `UserBuat` int(11) NOT NULL,
  `TglBuat` datetime NOT NULL DEFAULT current_timestamp(),
  `TglEdit` datetime DEFAULT NULL,
  `UserEdit` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `rencana_aksi`
--

CREATE TABLE `rencana_aksi` (
  `RencanaAksiID` int(11) NOT NULL,
  `RencanaTipeID` int(11) NOT NULL,
  `RencanaAksi` varchar(50) NOT NULL,
  `Urutan` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `rencana_aksi`
--

INSERT INTO `rencana_aksi` (`RencanaAksiID`, `RencanaTipeID`, `RencanaAksi`, `Urutan`) VALUES
(1, 1, 'Buy / Pembelian', NULL),
(2, 1, 'Sell / Penjualan', NULL),
(3, 2, 'Buy Limit / Pembelian Dibawah', NULL),
(4, 2, 'Buy Stop / Pembelian Diatas', NULL),
(5, 2, 'Sell Limit / Penjualan Diatas', NULL),
(6, 2, 'Sell Stop / Penjualan Dibawah', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `rencana_tipe`
--

CREATE TABLE `rencana_tipe` (
  `RencanaTipeID` int(11) NOT NULL,
  `RencanaTipe` varchar(50) NOT NULL,
  `Urutan` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `rencana_tipe`
--

INSERT INTO `rencana_tipe` (`RencanaTipeID`, `RencanaTipe`, `Urutan`) VALUES
(1, 'Market Execution / Eksekusi Pasar', NULL),
(2, 'Pending Order / Order Tunda', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `status`
--

CREATE TABLE `status` (
  `StatusID` int(11) NOT NULL,
  `Status` varchar(50) NOT NULL,
  `KategoriStatusID` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `status`
--

INSERT INTO `status` (`StatusID`, `Status`, `KategoriStatusID`) VALUES
(1, 'Terbuka', 1),
(2, 'Ditutup', 1),
(3, 'Terbuka', 2),
(4, 'Tertutup', 2),
(5, 'Terbuka', 3),
(6, 'Tertutup', 3),
(7, 'Manual', 3),
(8, 'Impas', 3),
(9, 'Untung', 3),
(10, 'Rugi', 3),
(11, 'Aktif', 4),
(12, 'Tidak Aktif', 4);

-- --------------------------------------------------------

--
-- Table structure for table `status_kategori`
--

CREATE TABLE `status_kategori` (
  `KategoriStatusID` int(11) NOT NULL,
  `KategoriStatus` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `status_kategori`
--

INSERT INTO `status_kategori` (`KategoriStatusID`, `KategoriStatus`) VALUES
(1, 'Analisa'),
(2, 'Rencana'),
(3, 'Jurnal'),
(4, 'User');

-- --------------------------------------------------------

--
-- Table structure for table `symbol`
--

CREATE TABLE `symbol` (
  `SymbolID` int(11) NOT NULL,
  `PasarID` int(11) UNSIGNED NOT NULL,
  `Symbol` varchar(50) NOT NULL,
  `Mask` varchar(10) NOT NULL,
  `Units` int(11) NOT NULL,
  `Urutan` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `symbol`
--

INSERT INTO `symbol` (`SymbolID`, `PasarID`, `Symbol`, `Mask`, `Units`, `Urutan`) VALUES
(1, 1, 'AUDCAD', '9.99999', 100000, NULL),
(2, 1, 'AUDCHF', '9.99999', 100000, NULL),
(3, 1, 'AUDJPY', '99.999', 100000, NULL),
(4, 1, 'AUDNZD', '9.99999', 100000, NULL),
(5, 1, 'AUDUSD', '9.999', 100000, 1),
(6, 1, 'CADCHF', '9.99999', 100000, NULL),
(7, 1, 'CADJPY', '99.999', 100000, NULL),
(8, 1, 'CHFJPY', '999.999', 100000, NULL),
(9, 1, 'EURAUD', '9.99999', 100000, NULL),
(10, 1, 'EURCAD', '9.99999', 100000, NULL),
(11, 1, 'EURCHF', '9.99999', 100000, NULL),
(12, 1, 'EURGBP', '9.99999', 100000, NULL),
(13, 1, 'EURJPY', '999.999', 100000, NULL),
(14, 1, 'EURNZD', '9.99999', 100000, NULL),
(15, 1, 'EURUSD', '9.99999', 100000, 2),
(16, 1, 'GBPAUD', '9.99999', 100000, NULL),
(17, 1, 'GBPCAD', '9.99999', 100000, NULL),
(18, 1, 'GBPCHF', '9.99999', 100000, NULL),
(19, 1, 'GBPJPY', '999.999', 100000, NULL),
(20, 1, 'GBPNZD', '9.99999', 100000, NULL),
(21, 1, 'GBPUSD', '9.99999', 100000, 3),
(22, 1, 'NZDCAD', '9.99999', 100000, NULL),
(23, 1, 'NZDCHF', '9.99999', 100000, NULL),
(24, 1, 'NZDJPY', '99.999', 100000, NULL),
(25, 1, 'NZDUSD', '9.99999', 100000, 4),
(26, 1, 'USDCAD', '9.99999', 100000, 5),
(27, 1, 'USDCHF', '9.99999', 100000, 6),
(28, 1, 'USDJPY', '9.999', 100000, 7),
(29, 1, 'USDSGD', '9.99999', 100000, NULL),
(30, 2, 'Brent_Oil', '99.99', 1000, NULL),
(31, 2, 'Palladium', '9999.99', 100, NULL),
(32, 2, 'Platinum', '9999.99', 100, NULL),
(33, 2, 'WTI_Oil', '99.99', 1000, NULL),
(34, 2, 'XAGUSD', '99.999', 5000, NULL),
(35, 2, 'XAUUSD', '9999.99', 100, NULL),
(36, 2, 'XBRUSD', '99.99', 1000, NULL),
(37, 2, 'XNGUSD', '9.999', 10000, NULL),
(38, 2, 'XTIUSD', '99.99', 1000, NULL),
(39, 4, 'Dow Jones', '9.999', 100, NULL),
(40, 4, 'Nasdaq 100', '9.999', 100, NULL),
(41, 4, 'S&P 500', '9.999', 100, NULL),
(42, 4, 'FTSE 100', '9.999', 100, NULL),
(43, 4, 'DAX', '9.999', 100, NULL),
(44, 4, 'CAC 40', '9.999', 100, NULL),
(45, 4, 'IHSG', '9.999', 100, NULL),
(46, 3, 'FREN', '9.999', 100, NULL),
(47, 3, 'BBRI', '9.999', 100, NULL),
(48, 3, 'HMSP', '9.999', 100, NULL),
(49, 3, 'TLKM', '9.999', 100, NULL),
(50, 3, 'BRPT', '9.999', 100, NULL),
(51, 3, 'BNII', '9.999', 100, NULL),
(52, 3, 'BHIT', '9.999', 100, NULL),
(53, 3, 'LPKR', '9.999', 100, NULL),
(54, 3, 'BKSL', '9.999', 100, NULL),
(55, 3, 'PPRO', '9.999', 100, NULL),
(56, 3, 'CPRO', '9.999', 100, NULL),
(57, 3, 'EMTK', '9.999', 100, NULL),
(58, 3, 'TOWR', '9.999', 100, NULL),
(59, 3, 'TRAM', '9.999', 100, NULL),
(60, 3, 'DMAS', '9.999', 100, NULL),
(61, 3, 'PWON', '9.999', 100, NULL),
(62, 3, 'KLBF', '9.999', 100, NULL),
(63, 3, 'BMRI', '9.999', 100, NULL),
(64, 3, 'ELTY', '9.999', 100, NULL),
(65, 3, 'BCAP', '9.999', 100, NULL),
(66, 3, 'AMRT', '9.999', 100, NULL),
(67, 3, 'IPTV', '9.999', 100, NULL),
(68, 3, 'BRIS', '9.999', 100, NULL),
(69, 3, 'ASII', '9.999', 100, NULL),
(70, 3, 'MDIA', '9.999', 100, NULL),
(71, 3, 'PNBS', '9.999', 100, NULL),
(72, 3, 'UNVR', '9.999', 100, NULL),
(73, 3, 'MCOR', '9.999', 100, NULL),
(74, 3, 'BTEL', '9.999', 100, NULL),
(75, 3, 'RMBA', '9.999', 100, NULL),
(76, 3, 'TOPS', '9.999', 100, NULL),
(77, 3, 'BBKP', '9.999', 100, NULL),
(78, 3, 'PNLF', '9.999', 100, NULL),
(79, 3, 'ADRO', '9.999', 100, NULL),
(80, 3, 'BWPT', '9.999', 100, NULL),
(81, 3, 'SIDO', '9.999', 100, NULL),
(82, 3, 'GMFI', '9.999', 100, NULL),
(83, 3, 'BNLI', '9.999', 100, NULL),
(84, 3, 'WSBP', '9.999', 100, NULL),
(85, 3, 'TRIO', '9.999', 100, NULL),
(86, 3, 'BLTA', '9.999', 100, NULL),
(87, 3, 'GIAA', '9.999', 100, NULL),
(88, 3, 'MEDC', '9.999', 100, NULL),
(89, 3, 'BNGA', '9.999', 100, NULL),
(90, 3, 'BBCA', '9.999', 100, NULL),
(91, 3, 'PGAS', '9.999', 100, NULL),
(92, 3, 'ANTM', '9.999', 100, NULL),
(93, 3, 'PNBN', '9.999', 100, NULL),
(94, 3, 'NISP', '9.999', 100, NULL),
(95, 3, 'APLN', '9.999', 100, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `transaksi`
--

CREATE TABLE `transaksi` (
  `TransaksiID` int(11) NOT NULL,
  `Transaksi` varchar(255) NOT NULL,
  `UserBuat` int(11) NOT NULL,
  `TglBuat` datetime NOT NULL DEFAULT current_timestamp(),
  `UserEdit` int(11) DEFAULT NULL,
  `TglEdit` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `transaksi`
--

INSERT INTO `transaksi` (`TransaksiID`, `Transaksi`, `UserBuat`, `TglBuat`, `UserEdit`, `TglEdit`) VALUES
(1, 'Tambah Dana', 1, '2021-02-16 16:21:32', NULL, NULL),
(2, 'Tarik Dana', 1, '2021-02-16 16:21:32', NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE `user` (
  `UserID` int(11) NOT NULL,
  `Nama` varchar(126) NOT NULL,
  `Email` varchar(50) NOT NULL,
  `Username` varchar(25) NOT NULL,
  `Password` varchar(32) NOT NULL,
  `NoTelp` varchar(12) NOT NULL,
  `TglDaftar` datetime NOT NULL DEFAULT current_timestamp(),
  `UserLevel` int(11) NOT NULL,
  `StatusID` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `user_akun`
--

CREATE TABLE `user_akun` (
  `AkunID` int(11) NOT NULL,
  `UserID` int(11) NOT NULL,
  `BrokerID` int(11) NOT NULL,
  `NoAkun` varchar(50) NOT NULL,
  `Leverage` varchar(20) NOT NULL,
  `UserBuat` int(11) NOT NULL,
  `TglBuat` datetime DEFAULT NULL,
  `UserEdit` int(11) DEFAULT NULL,
  `TglEdit` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `user_akun_saldo`
--

CREATE TABLE `user_akun_saldo` (
  `AkunID` int(11) NOT NULL,
  `UserID` int(11) NOT NULL,
  `SaldoAkhir` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `user_akun_transaksi`
--

CREATE TABLE `user_akun_transaksi` (
  `AkunTransaksiID` int(11) NOT NULL,
  `AkunID` int(11) NOT NULL,
  `UserID` int(11) NOT NULL,
  `TransaksiID` int(11) NOT NULL,
  `Nominal` int(11) NOT NULL,
  `TglTransaksi` datetime DEFAULT NULL,
  `UserBuat` int(11) NOT NULL,
  `TglBuat` datetime NOT NULL DEFAULT current_timestamp(),
  `UserEdit` int(11) DEFAULT NULL,
  `TglEdit` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Triggers `user_akun_transaksi`
--
DELIMITER $$
CREATE TRIGGER `update_saldoakhir_after_delete_transaksi` AFTER DELETE ON `user_akun_transaksi` FOR EACH ROW BEGIN
IF OLD.TransaksiID = 1 THEN
UPDATE user_akun_saldo SET SaldoAkhir = SaldoAkhir - OLD.Nominal;
ELSEIF OLD.TransaksiID = 2 THEN
UPDATE user_akun_saldo SET SaldoAkhir = SaldoAkhir + OLD.Nominal;
END IF;
END
$$
DELIMITER ;
DELIMITER $$
CREATE TRIGGER `update_saldoakhir_after_insert_transaksi` AFTER INSERT ON `user_akun_transaksi` FOR EACH ROW BEGIN
IF NEW.TransaksiID = 1 THEN
UPDATE user_akun_saldo SET SaldoAkhir = SaldoAkhir + NEW.Nominal;
ELSEIF NEW.TransaksiID = 2 THEN
UPDATE user_akun_saldo SET SaldoAkhir = SaldoAkhir - 
NEW.Nominal;
END IF;
END
$$
DELIMITER ;
DELIMITER $$
CREATE TRIGGER `update_saldoakhir_after_update_transaksi` AFTER UPDATE ON `user_akun_transaksi` FOR EACH ROW BEGIN
IF NEW.TransaksiID = 1 THEN
UPDATE user_akun_saldo SET SaldoAkhir = SaldoAkhir + (NEW.Nominal - OLD.Nominal);
ELSEIF NEW.TransaksiID = 2 THEN
UPDATE user_akun_saldo SET SaldoAkhir = SaldoAkhir - (NEW.Nominal - OLD.Nominal);
END IF;
END
$$
DELIMITER ;

-- --------------------------------------------------------

--
-- Table structure for table `user_hakakses`
--

CREATE TABLE `user_hakakses` (
  `HakAksesID` int(11) NOT NULL,
  `UserLevelID` int(11) NOT NULL,
  `ModulID` varchar(250) NOT NULL,
  `UserBuat` int(11) NOT NULL,
  `TglBuat` datetime NOT NULL DEFAULT current_timestamp(),
  `UserEdit` int(11) DEFAULT NULL,
  `TglEdit` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `user_hakakses`
--

INSERT INTO `user_hakakses` (`HakAksesID`, `UserLevelID`, `ModulID`, `UserBuat`, `TglBuat`, `UserEdit`, `TglEdit`) VALUES
(1, 1, '1,2,3,4,5', 1, '2021-02-14 15:56:54', NULL, NULL),
(2, 2, '1,2,3,4,5', 1, '2021-02-14 15:56:54', NULL, NULL),
(3, 3, '1,2,3', 1, '2021-02-14 15:56:54', NULL, NULL),
(4, 4, '1,2,3', 1, '2021-02-14 15:56:54', NULL, NULL),
(5, 5, '1,2,3,5', 1, '2021-02-14 15:56:54', NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `user_level`
--

CREATE TABLE `user_level` (
  `ID` int(11) NOT NULL,
  `UserLevelID` int(11) NOT NULL,
  `UserLevel` varchar(50) NOT NULL,
  `Status` int(11) NOT NULL,
  `UserBuat` int(11) NOT NULL,
  `TglBuat` datetime NOT NULL DEFAULT current_timestamp(),
  `UserEdit` int(11) DEFAULT NULL,
  `TglEdit` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `user_level`
--

INSERT INTO `user_level` (`ID`, `UserLevelID`, `UserLevel`, `Status`, `UserBuat`, `TglBuat`, `UserEdit`, `TglEdit`) VALUES
(1, 1, 'Superadmin', 11, 1, '2021-02-14 13:23:18', NULL, NULL),
(2, 2, 'Admin', 11, 1, '2021-02-14 13:23:18', NULL, NULL),
(3, 3, 'Manager', 11, 1, '2021-02-14 13:28:47', NULL, NULL),
(4, 4, 'Analis', 11, 1, '2021-02-14 13:28:47', NULL, NULL),
(5, 5, 'Member', 11, 1, '2021-02-14 13:28:47', NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `wave_aturan`
--

CREATE TABLE `wave_aturan` (
  `AturanID` int(11) NOT NULL,
  `AturanKategoriID` int(11) NOT NULL,
  `Aturan` text NOT NULL,
  `Urutan` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `wave_aturan`
--

INSERT INTO `wave_aturan` (`AturanID`, `AturanKategoriID`, `Aturan`, `Urutan`) VALUES
(1, 1, 'Wave 1 harus berbentuk Impulse atau Leading Diagonals', 1),
(2, 1, 'Wave 1 harus menjadi yang terpanjang diantara wave impulsif (1,3,5)', 2),
(3, 1, 'Wave 1 harus menjadi yang terpendek diantara wave impulsif (1,3,5)', 3),
(4, 1, 'Wave 1 harus berbentuk Zigzag / Double Zigzag / Triple Zigzag', 4),
(5, 1, 'Tidak boleh ada bagian wave 2 melewati awal wave 1', 5),
(6, 2, 'Rasio Fib. Retracement wave 2 berkisar antara 23.60% ~ 88.60% wave 1', 6),
(7, 2, 'Rasio Fib. Retracement wave 2 berkisar antara 50.00% ~ 88.60% wave 1', 7),
(8, 3, 'Waktu pembentukan wave 2 minimum 10% atau maksimum 9x waktu pembentukan wave 1', 8),
(9, 1, 'Wave 3 tidak boleh menjadi yang terpendek diantara wave impulsif (1, 3, 5)', 9),
(10, 1, 'Wave 3 lebih pendek dari wave 1 dan lebih panjang dari wave 5', 10),
(11, 1, 'Wave 3 lebih panjang dari wave 1 dan lebih pendek dari wave 5', 11),
(12, 2, 'Rasio Fib. Expansion wave 3 berkisar antara 61.80% ~ 658.70% wave 1 dari akhir wave 2', 12),
(13, 2, 'Rasio Fib. Expansion wave 3 berkisar antara 61.80% ~ 100.00% wave 1 dari akhir wave 2', 13),
(14, 3, 'Waktu pembentukan wave 3 maksimum 7x waktu pembentukan wave 1', 14),
(15, 1, 'Akhir wave 4 tidak boleh memasuki area akhir wave 1', 15),
(16, 1, 'Akhir wave 4 tidak boleh melewati akhir wave 2', 16),
(17, 1, 'Wave 4 lebih panjang dari wave 2', 17),
(18, 1, 'Wave 4 lebih pendek dari wave 2', 18),
(19, 2, 'Rasio Fib. Retracement wave 4 berkisar antara 23.60% ~ 50.00% wave 3', 19),
(20, 2, 'Rasio Fib. Retracement wave 4 berkisar antara 50.00% ~ 88.60% wave 3', 20),
(21, 3, 'Waktu pembentukan wave 4 maksimum 2x waktu pembentukan wave 3', 21),
(22, 3, 'Waktu pembentukan wave 4 minimum 20% dan maksimum 2x waktu pembentukan wave 3', 22),
(23, 1, 'Wave 5 harus berbentuk Impulsif atau Ending Diagonal', 23),
(24, 1, 'Wave 5 harus menjadi yang terpanjang diantara wave impulsif (1,3,5)', 24),
(25, 1, 'Wave 5 harus menjadi yang terpendek diantara wave impulsif (1,3,5)', 25),
(26, 1, 'Wave 5 harus berbentuk Zigzag / Double Zigzag / Triple Zigzag', 26),
(27, 1, 'Wave 5 tidak boleh terpotong dan selalu lebih tinggi dari akhir wave 3', 27),
(28, 1, 'Wave 5 boleh terpotong dan boleh lebih rendah dari akhir wave 3', 28),
(29, 2, 'Rasio Fib. Retracement wave 5 berkisar  antara 76.80% ~ 127.2% wave 4', 29),
(30, 2, 'Rasio Fib. Expansion wave 5 berkisar  antara 38.20% ~ 61.80% wave 3 dari akhir wave 4', 30),
(31, 2, 'Rasio Fib. Expansion wave 5 berkisar  antara 61.80% ~ 78.60% wave 3 dari akhir wave 4', 31),
(32, 3, 'Waktu pembentukan wave 5 maksimum 6x waktu pembentukan wave 3', 32),
(33, 1, 'Salah satu wave impulsif (1 / 3 / 5) biasanya diperpanjang', 33),
(34, 4, 'Jika wave 1 diperpanjang, total rasio Fib. Expansion wave 3 dan wave 5 berkisar 161.80%', 34),
(35, 4, 'Jika wave 3 diperpanjang, rasio Fib. Expansion  wave 3 harus lebih dari 161.8% wave 1', 35),
(36, 4, 'Jika wave 3 diperpanjang rasio Fib. Expansion wave 5 adalah 61.80% / 100.00% / 161.80%', 36),
(37, 4, 'Jika wave 5 lebih panjang dari wave 3, maka harus bentuk impulsif', 37),
(38, 1, 'Wave 1 dan wave 3 tidak boleh memiliki kegagalan dalam subwave 5', 38),
(39, 1, 'Jika wave 1 berbentuk Leading Diagonal, maka wave 5 tidak boleh berbentuk Ending Diagonal', 39),
(40, 1, 'Wave A harus berbentuk Impulsif atau Leading Diagonal', 40),
(41, 1, 'Subwave 5 dalam wave A tidak boleh terpotong', 41),
(42, 1, 'Tidak boleh ada bagian wave B melewati awal wave A', 42),
(43, 2, 'Rasio Fib. Retracement wave B adalah berkisar antara 23.60% ~  88.6% dari wave A', 43),
(44, 3, 'Waktu pembentukan wave B maksimum 10x waktu pembentukan wave A', 44),
(45, 1, 'Wave C harus berbentuk Impulsif atau Ending Diagonal', 45),
(46, 2, 'Rasio Fib. Expansion wave C berkisar antara 38.20%  ~ 161.80 % wave A ', 46),
(47, 2, 'Rasio Fib. Retracement wave C berkisar antara 88.60%  ~ 423.60 % wave B', 47),
(48, 3, 'Waktu pembentukan wave C maksimum 10x waktu pembentukan wave A+B', 48),
(49, 4, 'Panjang wave C terkadang sama dengan panjang wave A', 49),
(50, 4, 'Walaupun jarang terjadi, kemungkinan wave C terpotong adalah hal yang diperbolehkan', 50),
(51, 1, 'Jika wave A berbentuk Leading Diagonal, maka wave C tidak boleh berbentuk Ending Diagonal', 51),
(52, 1, 'Wave W harus berbentuk Zigzag', 52),
(53, 1, 'Subwave C dalam wave W tidak boleh terpotong', 53),
(54, 1, 'Tidak boleh ada bagian wave X melewati awal wave W', 54),
(55, 2, 'Rasio Fib. Retracement wave X adalah berkisar antara 23.60% ~  61.8% dari wave W', 55),
(56, 3, 'Waktu pembentukan wave X maksimum 5x waktu pembentukan wave W', 56),
(57, 1, 'Wave Y harus berbentuk Zigzag ', 57),
(58, 2, 'Rasio Fib. Expansion wave Y berkisar antara 38.20%  ~ 161.80 % wave W ', 58),
(59, 2, 'Rasio Fib. Retracement wave Y berkisar antara 88.60%  ~ 423.60 % wave X', 59),
(60, 3, 'Waktu pembentukan wave Y maksimum 5x waktu pembentukan wave W', 60),
(61, 4, 'Panjang wave Y terkadang sama dengan panjang wave W', 61),
(62, 1, 'Subwave C dalam wave Y tidak boleh terpotong', 62),
(63, 1, 'Tidak boleh ada bagian wave XX melewati awal Y', 63),
(64, 2, 'Rasio Fib. Retracement wave XX adalah berkisar antara 23.60% ~  61.8% dari wave Y', 64),
(65, 3, 'Waktu pembentukan wave XX maksimum 5x waktu pembentukan wave Y', 65),
(66, 1, 'Rasio Fib. Expansion wave Z berisar antara 38.20% ~ 161.80% wave W', 66),
(67, 1, 'Wave Z harus berbentuk Zigzag', 67),
(68, 1, 'Wave A pada umumnya berbentuk Zigzag', 68),
(69, 1, 'Wave B pada umumnya berbentuk Zigzag ', 69),
(70, 2, 'Rasio Fib. Retracement wave B berkisar antara 78.60% ~ 88.60% wave A', 70),
(71, 3, 'Waktu pembentukan wave B maksimum 10x waktu  pembentukan wave A', 71),
(72, 2, 'RasioFib. Retracement wave C berkisar antara 100.00% ~ 112.70% wave B', 72),
(73, 2, 'Rasio Fib. Expansion wave C berkisar antara 61.80% ~ 127.2% wave A', 73),
(74, 1, 'Akhir wave C umumnya sama dengan akhir wave A', 74),
(75, 2, 'Rasio Fib. Retracement wave B berkisar antara 100.00% ~ 127.20% wave A', 75),
(76, 2, 'Rasio Fib. Expansion wave C berkisar antara 100.80% ~ 161.80% wave A', 76),
(77, 1, 'Akhir wave C umumnya melewati akhir wave A', 77),
(78, 2, 'Rasio Fib. Expansion wave C berkisar antara 61.80% ~ 100.00% wave A', 78),
(79, 1, 'Akhir wave C umumnya tidak dapat melewati akhir wave A', 79),
(80, 2, 'Rasio Fib. Retracement wave B berkisar antara 50.00% ~ 100.00% wave A', 80),
(81, 1, 'Tidak ada batasan waktu pembentukan wave B', 81),
(82, 1, 'Wave C pada umumnya berbentuk zigzag', 82),
(83, 2, 'Rasio Fib. Retracement wave C berkisar antara 50.00% ~ 100.00% wave B', 83),
(84, 1, 'Umumnya waktu pembentukan wave C adalah yang terpanjang', 84),
(85, 1, 'Wave D pada umumnya berbentuk zigzag', 85),
(86, 2, 'Rasio Fib. Retracement wave C berkisar antara 50.00% ~ 100.00% wave C', 86),
(87, 1, 'Tidak ada batasan waktu pembentukan wave D', 87),
(88, 1, 'Wave E pada umumnya berbentuk zigzag', 88),
(89, 2, 'Rasio Fib. Retracement wave E berkisar antara 50.00% ~ 100.00% wave D', 89),
(90, 1, 'Tidak ada batasan waktu pembentukan wave E', 90),
(91, 2, 'Rasio Fib. Retracement wave B berkisar antara 100.00% ~ 161.80% wave A', 91),
(92, 2, 'Rasio Fib. Retracement wave C berkisar antara 100.00% ~ 161.800% wave B', 92),
(93, 2, 'Rasio Fib. Retracement wave D berkisar antara 100.00% ~ 161.80% wave C', 93),
(94, 2, 'Rasio Fib. Retracement wave E berkisar antara 100.00% ~ 161.80% wave D', 94),
(95, 0, 'Rasio Fib. Retracement wave Z berisar antara 88.60% ~ 423.60% wave XX', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `wave_aturanjoin`
--

CREATE TABLE `wave_aturanjoin` (
  `AturanJoinID` int(11) NOT NULL,
  `NamaAturan` varchar(150) NOT NULL,
  `RangkaianID` varchar(150) NOT NULL,
  `StrukturID` varchar(150) NOT NULL,
  `TipeID` varchar(150) NOT NULL,
  `PolaID` varchar(150) NOT NULL,
  `PosisiID` varchar(150) NOT NULL,
  `AturanID` varchar(250) NOT NULL,
  `Deskripsi` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `wave_aturanjoin`
--

INSERT INTO `wave_aturanjoin` (`AturanJoinID`, `NamaAturan`, `RangkaianID`, `StrukturID`, `TipeID`, `PolaID`, `PosisiID`, `AturanID`, `Deskripsi`) VALUES
(1, 'Impulse Wave', '1', '1', '14', '1', '1,3,5,6,8', '1,5,6,8,9,12,14,15,19,22,23,29,32,33,34,35,36,37,38,39', ''),
(2, 'Diagonal Leading - Contracting', '1', '2', '1', '1,2', '1,6', '1,2,5,6,8,9,10,13,14,16,18,20,22,23,25,27,30,32,39', ''),
(4, 'Diagonal Leading - Expanding', '1', '2', '2', '1,2', '1,6', '1,3,5,7,8,9,11,13,14,16,17,20,22,23,24,27,31,32,39', ''),
(8, 'Diagonal Ending - Contracting', '1', '2', '3', '2', '5,8', '2,4,5,7,8,9,10,13,14,16,18,20,22,25,26,28,30,32,39', ''),
(9, 'Diagonal Ending - Expanding', '1', '2', '4', '2', '5,8', '3,4,5,7,8,9,11,13,14,16,17,20,22,24,26,28,30,32,39', ''),
(10, 'Single Zigzag', '2', '3', '5', '3', '2,4,7', '40,41,42,43,44,45,46,47,48,49,50,51', ''),
(11, 'Double Zigzag', '2', '3', '6', '5', '2,7', '52,53,54,55,56,57,58,59,60,61,62', ''),
(12, 'Triple Zigzag', '2', '3', '7', '2', '2,4,6,7,8', '52,53,54,55,56,57,58,59,60,61,62,63,64,65,66,67,95', ''),
(13, 'Expanded Flat', '2', '4', '8', '4', '2,4,7,14,15', '45,50,68,69,71,75,76,77', ''),
(14, 'Regular Flat', '2', '4', '9', '4', '2,4,7,14,15', '44,45,50,68,69,70,71,72,73,74', ''),
(15, 'Running Flat', '2', '4', '10', '4', '2,4,7,14,15', '45,68,69,71,75,78,79', ''),
(16, 'Barrier Triangle', '2', '5', '11', '2', '4,7,14,15', '68,69,80,81,82,83,84,85,86,87,88,89,90', ''),
(19, 'Contracting Triangle', '2', '5', '12', '2', '4,7,14,15', '68,69,80,81,82,83,84,85,86,87,88,89,90', ''),
(20, 'Expanding Triangle', '2', '5', '13', '2', '4,7,14,15', '68,69,81,82,84,85,87,88,90,91,92,93,94', '');

-- --------------------------------------------------------

--
-- Table structure for table `wave_aturankategori`
--

CREATE TABLE `wave_aturankategori` (
  `AturanKategoriID` int(11) NOT NULL,
  `AturanKategori` varchar(120) NOT NULL,
  `Urutan` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `wave_aturankategori`
--

INSERT INTO `wave_aturankategori` (`AturanKategoriID`, `AturanKategori`, `Urutan`) VALUES
(1, 'Utama', 1),
(2, 'Rasio', 2),
(3, 'Waktu', 3),
(4, 'Ekstensi', 4);

-- --------------------------------------------------------

--
-- Table structure for table `wave_derajat`
--

CREATE TABLE `wave_derajat` (
  `DerajatID` int(11) NOT NULL,
  `Derajat` varchar(50) NOT NULL,
  `Urutan` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `wave_derajat`
--

INSERT INTO `wave_derajat` (`DerajatID`, `Derajat`, `Urutan`) VALUES
(1, 'Amat Kecil', 0),
(2, 'Submikro', 0),
(3, 'Mikro', 0),
(4, 'Subminuette', 0),
(5, 'Minuette', 0),
(6, 'Menit', 0),
(7, 'Minor', 0),
(8, 'Menengah', 0),
(9, 'Primer', 0),
(10, 'Siklus', 0);

-- --------------------------------------------------------

--
-- Table structure for table `wave_pola`
--

CREATE TABLE `wave_pola` (
  `PolaID` int(11) NOT NULL,
  `Pola` varchar(50) NOT NULL,
  `Urutan` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `wave_pola`
--

INSERT INTO `wave_pola` (`PolaID`, `Pola`, `Urutan`) VALUES
(1, '5-3-5-3-5', NULL),
(2, '3-3-3-3-3', NULL),
(3, '5-3-5', NULL),
(4, '3-3-5', NULL),
(5, '3-3-3', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `wave_posisi`
--

CREATE TABLE `wave_posisi` (
  `PosisiID` int(11) NOT NULL,
  `Posisi` varchar(50) NOT NULL,
  `Urutan` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `wave_posisi`
--

INSERT INTO `wave_posisi` (`PosisiID`, `Posisi`, `Urutan`) VALUES
(1, 'Wave 1', 0),
(2, 'Wave 2', 0),
(3, 'Wave 3', 0),
(4, 'Wave 4', 0),
(5, 'Wave 5', 0),
(6, 'Wave A', 0),
(7, 'Wave B', 0),
(8, 'Wave C', 0),
(9, 'Wave D', 0),
(10, 'Wave E', 0),
(11, 'Wave W', 0),
(12, 'Wave Y', 0),
(13, 'Wave Z', 0),
(14, 'Wave X', 0),
(15, 'Wave XX', 0);

-- --------------------------------------------------------

--
-- Table structure for table `wave_rangkaian`
--

CREATE TABLE `wave_rangkaian` (
  `RangkaianID` int(11) NOT NULL,
  `Rangkaian` varchar(50) NOT NULL,
  `Urutan` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `wave_rangkaian`
--

INSERT INTO `wave_rangkaian` (`RangkaianID`, `Rangkaian`, `Urutan`) VALUES
(1, 'Motive', 1),
(2, 'Correctives', 2);

-- --------------------------------------------------------

--
-- Table structure for table `wave_struktur`
--

CREATE TABLE `wave_struktur` (
  `StrukturID` int(11) NOT NULL,
  `RangkaianID` int(11) NOT NULL,
  `Struktur` varchar(50) NOT NULL,
  `Urutan` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `wave_struktur`
--

INSERT INTO `wave_struktur` (`StrukturID`, `RangkaianID`, `Struktur`, `Urutan`) VALUES
(1, 1, 'Impulse', 1),
(2, 1, 'Diagonal', 2),
(3, 2, 'Zigzag', 3),
(4, 2, 'Flat', 4),
(5, 2, 'Triangle', 5);

-- --------------------------------------------------------

--
-- Table structure for table `wave_tipe`
--

CREATE TABLE `wave_tipe` (
  `TipeID` int(11) NOT NULL,
  `StrukturID` int(11) NOT NULL,
  `Tipe` varchar(50) NOT NULL,
  `Urutan` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `wave_tipe`
--

INSERT INTO `wave_tipe` (`TipeID`, `StrukturID`, `Tipe`, `Urutan`) VALUES
(1, 2, 'Leading - Contracting', 2),
(2, 2, 'Leading - Expanding', 3),
(3, 2, 'Ending - Contracting', 4),
(4, 2, 'Ending - Expanding', 5),
(5, 3, 'Single Zigzag', 6),
(6, 3, 'Double Zigzag', 7),
(7, 3, 'Triple Zigzag', 8),
(8, 4, 'Expanding', 9),
(9, 4, 'Reguler', 10),
(10, 4, 'Running', 11),
(11, 5, 'Barrier', 12),
(12, 5, 'Contracting', 13),
(13, 5, 'Expanding', 14),
(14, 1, 'Impulse', 1);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `analisa_elliott`
--
ALTER TABLE `analisa_elliott`
  ADD PRIMARY KEY (`ID`);

--
-- Indexes for table `analisa_simple`
--
ALTER TABLE `analisa_simple`
  ADD PRIMARY KEY (`ID`);

--
-- Indexes for table `analisa_snd`
--
ALTER TABLE `analisa_snd`
  ADD PRIMARY KEY (`ID`);

--
-- Indexes for table `analisa_snr`
--
ALTER TABLE `analisa_snr`
  ADD PRIMARY KEY (`ID`);

--
-- Indexes for table `app_modul`
--
ALTER TABLE `app_modul`
  ADD PRIMARY KEY (`ModulID`),
  ADD UNIQUE KEY `Link` (`Link`);

--
-- Indexes for table `app_modul_group`
--
ALTER TABLE `app_modul_group`
  ADD PRIMARY KEY (`GroupModulID`);

--
-- Indexes for table `app_modul_sub`
--
ALTER TABLE `app_modul_sub`
  ADD PRIMARY KEY (`SubModulID`);

--
-- Indexes for table `arah`
--
ALTER TABLE `arah`
  ADD PRIMARY KEY (`ArahID`);

--
-- Indexes for table `broker`
--
ALTER TABLE `broker`
  ADD PRIMARY KEY (`BrokerID`);

--
-- Indexes for table `jangkawaktu`
--
ALTER TABLE `jangkawaktu`
  ADD PRIMARY KEY (`JangkaWaktuID`);

--
-- Indexes for table `jurnal`
--
ALTER TABLE `jurnal`
  ADD PRIMARY KEY (`ID`);

--
-- Indexes for table `pasar`
--
ALTER TABLE `pasar`
  ADD PRIMARY KEY (`PasarID`);

--
-- Indexes for table `rencana`
--
ALTER TABLE `rencana`
  ADD PRIMARY KEY (`ID`);

--
-- Indexes for table `rencana_aksi`
--
ALTER TABLE `rencana_aksi`
  ADD PRIMARY KEY (`RencanaAksiID`);

--
-- Indexes for table `rencana_tipe`
--
ALTER TABLE `rencana_tipe`
  ADD PRIMARY KEY (`RencanaTipeID`);

--
-- Indexes for table `status`
--
ALTER TABLE `status`
  ADD PRIMARY KEY (`StatusID`);

--
-- Indexes for table `status_kategori`
--
ALTER TABLE `status_kategori`
  ADD PRIMARY KEY (`KategoriStatusID`);

--
-- Indexes for table `symbol`
--
ALTER TABLE `symbol`
  ADD PRIMARY KEY (`SymbolID`);

--
-- Indexes for table `transaksi`
--
ALTER TABLE `transaksi`
  ADD PRIMARY KEY (`TransaksiID`);

--
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`UserID`);

--
-- Indexes for table `user_akun`
--
ALTER TABLE `user_akun`
  ADD PRIMARY KEY (`AkunID`),
  ADD UNIQUE KEY `UserID` (`UserID`);

--
-- Indexes for table `user_akun_saldo`
--
ALTER TABLE `user_akun_saldo`
  ADD PRIMARY KEY (`AkunID`),
  ADD UNIQUE KEY `UserID` (`UserID`);

--
-- Indexes for table `user_akun_transaksi`
--
ALTER TABLE `user_akun_transaksi`
  ADD PRIMARY KEY (`AkunTransaksiID`);

--
-- Indexes for table `user_hakakses`
--
ALTER TABLE `user_hakakses`
  ADD PRIMARY KEY (`HakAksesID`);

--
-- Indexes for table `user_level`
--
ALTER TABLE `user_level`
  ADD PRIMARY KEY (`ID`),
  ADD UNIQUE KEY `ID` (`UserLevelID`);

--
-- Indexes for table `wave_aturan`
--
ALTER TABLE `wave_aturan`
  ADD PRIMARY KEY (`AturanID`);

--
-- Indexes for table `wave_aturanjoin`
--
ALTER TABLE `wave_aturanjoin`
  ADD PRIMARY KEY (`AturanJoinID`);

--
-- Indexes for table `wave_aturankategori`
--
ALTER TABLE `wave_aturankategori`
  ADD PRIMARY KEY (`AturanKategoriID`);

--
-- Indexes for table `wave_derajat`
--
ALTER TABLE `wave_derajat`
  ADD PRIMARY KEY (`DerajatID`);

--
-- Indexes for table `wave_pola`
--
ALTER TABLE `wave_pola`
  ADD PRIMARY KEY (`PolaID`);

--
-- Indexes for table `wave_posisi`
--
ALTER TABLE `wave_posisi`
  ADD PRIMARY KEY (`PosisiID`);

--
-- Indexes for table `wave_rangkaian`
--
ALTER TABLE `wave_rangkaian`
  ADD PRIMARY KEY (`RangkaianID`);

--
-- Indexes for table `wave_struktur`
--
ALTER TABLE `wave_struktur`
  ADD PRIMARY KEY (`StrukturID`);

--
-- Indexes for table `wave_tipe`
--
ALTER TABLE `wave_tipe`
  ADD PRIMARY KEY (`TipeID`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `analisa_elliott`
--
ALTER TABLE `analisa_elliott`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `analisa_simple`
--
ALTER TABLE `analisa_simple`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `analisa_snd`
--
ALTER TABLE `analisa_snd`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `analisa_snr`
--
ALTER TABLE `analisa_snr`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `app_modul`
--
ALTER TABLE `app_modul`
  MODIFY `ModulID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `app_modul_group`
--
ALTER TABLE `app_modul_group`
  MODIFY `GroupModulID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `app_modul_sub`
--
ALTER TABLE `app_modul_sub`
  MODIFY `SubModulID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `arah`
--
ALTER TABLE `arah`
  MODIFY `ArahID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `broker`
--
ALTER TABLE `broker`
  MODIFY `BrokerID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `jangkawaktu`
--
ALTER TABLE `jangkawaktu`
  MODIFY `JangkaWaktuID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `jurnal`
--
ALTER TABLE `jurnal`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `pasar`
--
ALTER TABLE `pasar`
  MODIFY `PasarID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `rencana`
--
ALTER TABLE `rencana`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `rencana_aksi`
--
ALTER TABLE `rencana_aksi`
  MODIFY `RencanaAksiID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `rencana_tipe`
--
ALTER TABLE `rencana_tipe`
  MODIFY `RencanaTipeID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `status`
--
ALTER TABLE `status`
  MODIFY `StatusID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT for table `status_kategori`
--
ALTER TABLE `status_kategori`
  MODIFY `KategoriStatusID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `symbol`
--
ALTER TABLE `symbol`
  MODIFY `SymbolID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=96;

--
-- AUTO_INCREMENT for table `transaksi`
--
ALTER TABLE `transaksi`
  MODIFY `TransaksiID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
  MODIFY `UserID` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `user_akun`
--
ALTER TABLE `user_akun`
  MODIFY `AkunID` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `user_akun_transaksi`
--
ALTER TABLE `user_akun_transaksi`
  MODIFY `AkunTransaksiID` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `user_hakakses`
--
ALTER TABLE `user_hakakses`
  MODIFY `HakAksesID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `user_level`
--
ALTER TABLE `user_level`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `wave_aturan`
--
ALTER TABLE `wave_aturan`
  MODIFY `AturanID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=96;

--
-- AUTO_INCREMENT for table `wave_aturanjoin`
--
ALTER TABLE `wave_aturanjoin`
  MODIFY `AturanJoinID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=21;

--
-- AUTO_INCREMENT for table `wave_aturankategori`
--
ALTER TABLE `wave_aturankategori`
  MODIFY `AturanKategoriID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `wave_derajat`
--
ALTER TABLE `wave_derajat`
  MODIFY `DerajatID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `wave_pola`
--
ALTER TABLE `wave_pola`
  MODIFY `PolaID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `wave_posisi`
--
ALTER TABLE `wave_posisi`
  MODIFY `PosisiID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;

--
-- AUTO_INCREMENT for table `wave_rangkaian`
--
ALTER TABLE `wave_rangkaian`
  MODIFY `RangkaianID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT for table `wave_struktur`
--
ALTER TABLE `wave_struktur`
  MODIFY `StrukturID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `wave_tipe`
--
ALTER TABLE `wave_tipe`
  MODIFY `TipeID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=19;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
