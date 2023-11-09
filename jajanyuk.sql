-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Nov 02, 2023 at 07:58 PM
-- Server version: 10.4.28-MariaDB
-- PHP Version: 8.2.4

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `jajanyuk`
--

-- --------------------------------------------------------

--
-- Table structure for table `data_admin`
--

CREATE TABLE `data_admin` (
  `nama_admin` varchar(100) NOT NULL,
  `ID_Admin` int(5) NOT NULL,
  `email_admin` varchar(100) NOT NULL,
  `password_admin` varchar(6) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `data_admin`
--

INSERT INTO `data_admin` (`nama_admin`, `ID_Admin`, `email_admin`, `password_admin`) VALUES
('delia', 3, 'delia@gmail.com', 'delia'),
('lily', 4, 'lily@gmail.com', 'lily3');

-- --------------------------------------------------------

--
-- Table structure for table `data_customer`
--

CREATE TABLE `data_customer` (
  `id_customer` int(11) NOT NULL,
  `nama_cust` varchar(100) NOT NULL,
  `email_cust` varchar(100) NOT NULL,
  `password_cust` varchar(6) NOT NULL,
  `no_telp` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `data_customer`
--

INSERT INTO `data_customer` (`id_customer`, `nama_cust`, `email_cust`, `password_cust`, `no_telp`) VALUES
(1, 'delia', 'delia@gmail.com', '12345', '087884065808'),
(2, 'putri', 'putri24@gmail.com', 'putri1', '081237735677'),
(3, 'sarah', 'sarah21@gmail.com', 'sarah2', '081237735677'),
(4, 'rizki', 'rizki@gmail.com', 'rizki1', '086234780022'),
(5, 'aisyah', 'aisyah44@gmail.com', 'ica123', '081237735677'),
(6, 'aurora', 'aurora@gmail.com', 'rara1', '087546773089'),
(8, 'ines', 'ines4@gmail.com', 'ines22', '081124556099'),
(9, 'ilham', 'ilham90@gmail.com', 'ilham1', '081278609901'),
(10, 'raka', 'raka@gmail.com', 'raka11', '081245678766'),
(11, 'reza', 'reza22@gmail.com', 'reza11', '081123457888'),
(12, 'aca', 'aca77@gmail.com', 'aca123', '089976452389');

-- --------------------------------------------------------

--
-- Table structure for table `data_menu`
--

CREATE TABLE `data_menu` (
  `id_menu` int(11) NOT NULL,
  `nama_menu` varchar(100) NOT NULL,
  `stok_menu` int(5) NOT NULL,
  `harga_menu` int(20) NOT NULL,
  `deskripsi_menu` text NOT NULL,
  `foto_menu` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `data_menu`
--

INSERT INTO `data_menu` (`id_menu`, `nama_menu`, `stok_menu`, `harga_menu`, `deskripsi_menu`, `foto_menu`) VALUES
(1, 'Sandwich Buah', 17, 15000, 'sandwich buah adalah makanan dari Jepang yang bentuknya seperti sandwich atau roti tangkup. Namun, isiannya adalah whipped cream dan buah segar. Sandwich asal Jepang ini sekarang ini sedang naik daun di Indonesia. Selain rasanya yang manis dengan buah yang segar, bentuknya juga cantik.', 'download.jpeg'),
(2, 'Strw Cheesecake', 17, 15000, 'Strawberry cheese cake Es krim rasa keju dengan potongan buah stroberi dan kue keju.', 'strawberry cheesecakee.jpg'),
(3, 'waffle', 8, 10000, 'Wafel adalah hidangan penutup yang terbuat dari adonan beragi atau adonan yang dimasak di antara dua piring yang diberi pola untuk memberikan ukuran, bentuk, dan kesan permukaan yang khas', 'waffle.jpeg'),
(4, 'blry cheesecake', 8, 17000, 'Blueberry Cheese Cake ini rasanya cheesy dan creamy banget. Dengan topping selai blueberry yang asam segar', 'bluberry compote cheesecake.jpg');

-- --------------------------------------------------------

--
-- Table structure for table `data_pembayaran`
--

CREATE TABLE `data_pembayaran` (
  `id_pesanan` int(11) NOT NULL,
  `keterangan` varchar(100) NOT NULL,
  `no_meja` int(2) NOT NULL,
  `tanggal` date NOT NULL,
  `note` text NOT NULL,
  `id_customer` int(5) NOT NULL,
  `jumlah_menu` int(10) NOT NULL,
  `total_harga` int(100) NOT NULL,
  `status_pesanan` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `data_pembayaran`
--

INSERT INTO `data_pembayaran` (`id_pesanan`, `keterangan`, `no_meja`, `tanggal`, `note`, `id_customer`, `jumlah_menu`, `total_harga`, `status_pesanan`) VALUES
(1, 'Dine In', 1, '2023-10-28', '-', 5, 1, 10000, 'in process'),
(5, 'Dine In', 2, '2023-10-28', 'less sweet', 2, 1, 10000, 'paid'),
(6, 'Dine In', 5, '2023-10-28', 'manis', 5, 1, 17000, 'accepted'),
(12, 'Dine In', 6, '2023-10-30', '-', 9, 2, 30000, 'in process'),
(0, 'Dine In', 8, '2023-10-30', '-', 2, 2, 27000, 'in process'),
(0, 'Dine In', 9, '2023-11-02', '-', 5, 2, 25000, 'in process'),
(14, 'Dine In', 10, '2023-10-28', 'less sweet', 2, 1, 17000, 'paid'),
(15, 'Dine In', 12, '2023-10-28', '-', 6, 1, 10000, 'paid'),
(16, 'Dine In', 32, '2023-11-02', '-', 5, 1, 10000, 'Menunggu Pembayaran'),
(0, 'Dine In', 40, '2023-11-02', 'less sweet', 5, 1, 10000, ''),
(0, 'Take Away', 41, '2023-11-02', '-', 5, 1, 15000, '');

-- --------------------------------------------------------

--
-- Table structure for table `data_pesanan`
--

CREATE TABLE `data_pesanan` (
  `id_pesanan` int(11) NOT NULL,
  `id_menu` int(11) NOT NULL,
  `jumlah_menu` int(11) NOT NULL,
  `nama` varchar(100) NOT NULL,
  `harga` int(11) NOT NULL,
  `subharga` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `data_pesanan`
--

INSERT INTO `data_pesanan` (`id_pesanan`, `id_menu`, `jumlah_menu`, `nama`, `harga`, `subharga`) VALUES
(1, 3, 1, 'waffle', 10000, 10000),
(5, 4, 1, 'blry cheesecake', 17000, 17000),
(6, 1, 1, 'Sandwich Buah', 15000, 15000),
(7, 3, 1, 'waffle', 10000, 10000),
(8, 3, 1, 'waffle', 10000, 10000),
(9, 2, 1, 'Strw Cheesecake', 15000, 15000),
(12, 3, 1, 'waffle', 10000, 10000),
(14, 2, 1, 'Strw Cheesecake', 15000, 15000),
(15, 3, 1, 'waffle', 10000, 10000);

-- --------------------------------------------------------

--
-- Table structure for table `meja`
--

CREATE TABLE `meja` (
  `no_meja` int(2) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `status_pemesanan`
--

CREATE TABLE `status_pemesanan` (
  `no_meja` int(2) NOT NULL,
  `status_pesanan` varchar(100) NOT NULL,
  `id_customer` int(5) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `data_admin`
--
ALTER TABLE `data_admin`
  ADD PRIMARY KEY (`ID_Admin`);

--
-- Indexes for table `data_customer`
--
ALTER TABLE `data_customer`
  ADD PRIMARY KEY (`id_customer`);

--
-- Indexes for table `data_menu`
--
ALTER TABLE `data_menu`
  ADD PRIMARY KEY (`id_menu`);

--
-- Indexes for table `data_pembayaran`
--
ALTER TABLE `data_pembayaran`
  ADD PRIMARY KEY (`no_meja`);

--
-- Indexes for table `data_pesanan`
--
ALTER TABLE `data_pesanan`
  ADD PRIMARY KEY (`id_pesanan`);

--
-- Indexes for table `meja`
--
ALTER TABLE `meja`
  ADD PRIMARY KEY (`no_meja`);

--
-- Indexes for table `status_pemesanan`
--
ALTER TABLE `status_pemesanan`
  ADD PRIMARY KEY (`no_meja`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `data_admin`
--
ALTER TABLE `data_admin`
  MODIFY `ID_Admin` int(5) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `data_customer`
--
ALTER TABLE `data_customer`
  MODIFY `id_customer` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT for table `data_menu`
--
ALTER TABLE `data_menu`
  MODIFY `id_menu` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `data_pembayaran`
--
ALTER TABLE `data_pembayaran`
  MODIFY `no_meja` int(2) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=42;

--
-- AUTO_INCREMENT for table `meja`
--
ALTER TABLE `meja`
  MODIFY `no_meja` int(2) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `status_pemesanan`
--
ALTER TABLE `status_pemesanan`
  MODIFY `no_meja` int(2) NOT NULL AUTO_INCREMENT;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
