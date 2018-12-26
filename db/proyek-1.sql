-- phpMyAdmin SQL Dump
-- version 4.6.6deb5
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3306
-- Generation Time: Dec 26, 2018 at 02:31 PM
-- Server version: 5.7.24-0ubuntu0.18.04.1
-- PHP Version: 7.2.10-0ubuntu0.18.04.1

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `proyek-1`
--

-- --------------------------------------------------------

--
-- Table structure for table `admin`
--

CREATE TABLE `admin` (
  `username` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `admin`
--

INSERT INTO `admin` (`username`, `password`) VALUES
('hatente', '$2y$10$PV1iiXCzPQ0wogt6.UBH/u4NYiSKLlH4EepEJvlm3ON94.26A0dom');

-- --------------------------------------------------------

--
-- Table structure for table `admin_access`
--

CREATE TABLE `admin_access` (
  `username` varchar(255) NOT NULL,
  `token` varchar(255) NOT NULL,
  `time` bigint(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `admin_access`
--

INSERT INTO `admin_access` (`username`, `token`, `time`) VALUES
('hatente', 'b7aa9c3266a8c8f447178ce9e9d6a49d', 1545813059);

-- --------------------------------------------------------

--
-- Table structure for table `products`
--

CREATE TABLE `products` (
  `id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `description` text,
  `image` varchar(255) NOT NULL,
  `time` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `cost` bigint(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `products`
--

INSERT INTO `products` (`id`, `name`, `description`, `image`, `time`, `cost`) VALUES
(2, 'Taffware UV5RE', '- 2 buah frekuensi radio yaitu VHF 136-174MHz dan UHF 400-480MHz \r\n- baterai 1800mAh \r\n- dilengkapi FM Radio,\r\n- selectable wide/narrow, \r\n- battery save function, \r\n- VOX, \r\n- DCS/CTCSS encode, \r\n- key lock & built in flashlight', 'assets/images/a1545758843.png;assets/images/b1545758843.png;assets/images/c1545758843.png', '2018-12-25 17:27:23', 20000),
(3, 'SKY_MAX UV-8R', '- Radio Transceiver (radio pemancar dan penerima) dengan gelombang ganda \r\n- Monitor LCD \r\n- Pengkodean DTMF\r\n- Baterai lithium-ion berkapasitas tinggi\r\n- Dilengkapi dengan penerima radio FM komersial\r\n- FOX\r\n- alarm\r\n- memori mampu menampung 128 chanel/saluran\r\n- Dengan Gelombang panjang/pendek yang dapat dipilih\r\n- Tersedia pilihan Daya Tinggi?rendah (5W/1W)\r\n- Dual watch/dual reception\r\n- Fungsi OFFSET\r\n- Fungsi Penghemat Bateraidengan Fungsi Save\r\n- Fungsi penguncian signal Sibuk â€˜BCLOâ€™\r\n- Lampu senter LED yang telah terpasang\r\n- Dapat menerima Gelombang dari mana saja', 'assets/images/a1545759100.png;assets/images/b1545759100.png;assets/images/c1545759100.png', '2018-12-25 17:31:40', 20000),
(4, 'BAOFENG', '- Frequency Range: 136-174 / 400-520 MHz\r\n- Dual-Band Display, Dual Freq. Display, Dual-Standby\r\n- Output Power: 5 Watts max\r\n- 128 Channels\r\n- 50 CTCSS and 104 CDCSS\r\n- Built-in VOX Function\r\n- 1750Hz Burst Tone\r\n- FM Radio Receiver (65.0MHz-108.0MHz)\r\n- LED Flashlight\r\n- High /Low RF Power\r\n- Wide/ Narrow FM mode: 25KHz/12.5KHz\r\n- Emergency Alert\r\n- Low Battery Alert\r\n- Battery Saver\r\n- Time-out Timer\r\n- Keypad Lock\r\n- Channel Step: 2.5/5/6.25/10/12.5/25KHz\r\n- ROGER Beep\r\n- Channel bisa diberi nama melalui kabel data - software Baofeng - komputer\r\n- Antena type: SMA Female', 'assets/images/a1545759343.png;assets/images/b1545759343.png;assets/images/c1545759343.png', '2018-12-25 17:35:43', 20000);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admin`
--
ALTER TABLE `admin`
  ADD PRIMARY KEY (`username`);

--
-- Indexes for table `products`
--
ALTER TABLE `products`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `products`
--
ALTER TABLE `products`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
