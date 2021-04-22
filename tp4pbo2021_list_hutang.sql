-- phpMyAdmin SQL Dump
-- version 5.0.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Apr 22, 2021 at 06:39 PM
-- Server version: 10.4.14-MariaDB
-- PHP Version: 7.4.9

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `tp4pbo2021_list_hutang`
--

-- --------------------------------------------------------

--
-- Table structure for table `list_penghutang`
--

CREATE TABLE `list_penghutang` (
  `id` int(255) NOT NULL,
  `nama` varchar(255) NOT NULL,
  `no_hp` varchar(255) NOT NULL,
  `jumlah` bigint(255) NOT NULL,
  `deadline` date NOT NULL,
  `detail` varchar(255) NOT NULL,
  `status` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `list_penghutang`
--

INSERT INTO `list_penghutang` (`id`, `nama`, `no_hp`, `jumlah`, `deadline`, `detail`, `status`) VALUES
(1, 'Andria', '083927492387', 20000000, '2021-05-01', 'Untuk beli komik', 'Belum Lunas'),
(3, 'Rio', '08342423423', 2000000, '2021-04-27', 'Beli Game', 'Lunas'),
(4, 'Farras', '0834234234', 300000, '2021-04-29', 'Beli Quran', 'Belum Lunas'),
(5, 'Fachri', '0834726643', 1500000, '2021-05-05', 'Beli HP', 'Lunas'),
(6, 'Azka', '0827632842', 600000, '2021-04-07', 'Beli Tasbih', 'Belum Lunas'),
(8, 'Imam F D', '081221044512', 1000000, '2021-05-05', 'Beli Figure', 'Lunas');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `list_penghutang`
--
ALTER TABLE `list_penghutang`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `list_penghutang`
--
ALTER TABLE `list_penghutang`
  MODIFY `id` int(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
