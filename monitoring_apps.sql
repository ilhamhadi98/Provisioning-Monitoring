-- phpMyAdmin SQL Dump
-- version 5.0.4
-- https://www.phpmyadmin.net/
--
-- Host: localhost
-- Generation Time: Jan 15, 2021 at 02:06 AM
-- Server version: 10.4.16-MariaDB
-- PHP Version: 7.4.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `monitoring_apps`
--

-- --------------------------------------------------------

--
-- Table structure for table `m_area`
--

CREATE TABLE `m_area` (
  `id_area` int(11) NOT NULL,
  `area_name` varchar(512) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `m_area`
--

INSERT INTO `m_area` (`id_area`, `area_name`) VALUES
(1, 'Cikampek'),
(2, 'Karawang'),
(3, 'Klari'),
(4, 'Purwakarta 1'),
(5, 'Purwakarta 2'),
(6, 'Subang 1'),
(7, 'Subang 2'),
(8, 'Teluk Jambe');

-- --------------------------------------------------------

--
-- Table structure for table `m_status`
--

CREATE TABLE `m_status` (
  `id_status` int(11) NOT NULL,
  `status` varchar(256) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `m_status`
--

INSERT INTO `m_status` (`id_status`, `status`) VALUES
(1, 'Selesai');

-- --------------------------------------------------------

--
-- Table structure for table `m_sto`
--

CREATE TABLE `m_sto` (
  `id_sto` int(11) NOT NULL,
  `sto_name` varchar(256) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `m_sto`
--

INSERT INTO `m_sto` (`id_sto`, `sto_name`) VALUES
(1, 'KRW'),
(2, 'CPL'),
(3, 'TLJ'),
(4, 'KLI'),
(5, 'WDS'),
(6, 'CKP'),
(7, 'JTS'),
(8, 'CLM'),
(9, 'PLD'),
(10, 'PWK'),
(11, 'CBU'),
(12, 'CAS'),
(13, 'PMN'),
(14, 'KIA'),
(15, 'PGD'),
(16, 'SUB'),
(17, 'JCG'),
(18, 'PBS'),
(19, '--');

-- --------------------------------------------------------

--
-- Table structure for table `m_teknisi`
--

CREATE TABLE `m_teknisi` (
  `id_teknisi` int(11) NOT NULL,
  `crew` varchar(512) NOT NULL,
  `teknisi_name` varchar(512) NOT NULL,
  `mitra_name` varchar(512) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `m_teknisi`
--

INSERT INTO `m_teknisi` (`id_teknisi`, `crew`, `teknisi_name`, `mitra_name`) VALUES
(1, '', 'Acep', 'Gemilang Optima Lestari'),
(2, '', 'Acim', 'Gemilang Optima Lestari'),
(3, '', 'Dede Mukhtar', 'Ainiah Indomitra Sejahtera');

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE `user` (
  `id_user` int(11) NOT NULL,
  `name` varchar(512) NOT NULL,
  `username` varchar(512) NOT NULL,
  `password` varchar(512) NOT NULL,
  `level` varchar(128) NOT NULL,
  `picture` varchar(512) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`id_user`, `name`, `username`, `password`, `level`, `picture`) VALUES
(1, 'iam', 'admin', '21232f297a57a5a743894a0e4a801fc3', '1', ''),
(2, 'ilham', 'ilham', 'b63d204bf086017e34d8bd27ab969f28', '1', ''),
(3, 'user 2', 'user2', '7e58d63b60197ceb55a1c487989a3720', '2', '');

-- --------------------------------------------------------

--
-- Table structure for table `user_log`
--

CREATE TABLE `user_log` (
  `id_log` int(11) NOT NULL,
  `user_id` varchar(512) NOT NULL,
  `action` varchar(512) NOT NULL,
  `timestamp` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `user_log`
--

INSERT INTO `user_log` (`id_log`, `user_id`, `action`, `timestamp`) VALUES
(1, '1', '1', '2021-01-14 13:40:55'),
(2, 'admin', 'has been log out', '2021-01-14 13:42:48'),
(3, 'admin', 'has been log in', '2021-01-14 13:42:53'),
(4, 'admin', 'has been log out', '2021-01-14 13:43:58'),
(5, 'user2', 'has been log in', '2021-01-14 13:44:04'),
(6, 'user2', 'has been log out', '2021-01-14 14:31:12'),
(7, 'admin', 'has been log in', '2021-01-14 14:40:45'),
(8, 'admin', 'has been log out', '2021-01-14 14:44:52'),
(9, 'admin', 'has been log in', '2021-01-14 14:44:57');

-- --------------------------------------------------------

--
-- Table structure for table `work_order`
--

CREATE TABLE `work_order` (
  `id_wo` int(11) NOT NULL,
  `order_input` date NOT NULL,
  `sc_no` varchar(512) NOT NULL,
  `wfm_id` varchar(512) NOT NULL,
  `customer_name` varchar(512) NOT NULL,
  `customer_address` varchar(512) NOT NULL,
  `customer_phone` varchar(128) NOT NULL,
  `sto_id` int(11) NOT NULL,
  `area_id` int(11) NOT NULL,
  `status_id` int(11) NOT NULL,
  `teknisi_id` int(11) NOT NULL,
  `timestamp` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `work_order`
--

INSERT INTO `work_order` (`id_wo`, `order_input`, `sc_no`, `wfm_id`, `customer_name`, `customer_address`, `customer_phone`, `sto_id`, `area_id`, `status_id`, `teknisi_id`, `timestamp`) VALUES
(1, '2021-01-14', '1234567', 'WO1234567', 'Alan Ruslan', 'Pamulang Cikampek, Karawang', '+621234567', 1, 1, 1, 2, '2021-01-15 00:52:17'),
(2, '2021-01-13', '2345678', 'WO2345678', 'Cipta Ibnu', 'Sanangan Adiarsa Barat, Karawang', '+08222345678', 1, 1, 1, 1, '2021-01-14 16:21:23'),
(3, '2021-01-13', '4567890', 'WO567890', 'Ira Nopiah', 'Klari, Karawang', '+822567890', 1, 1, 1, 3, '2021-01-15 00:53:28');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `m_area`
--
ALTER TABLE `m_area`
  ADD PRIMARY KEY (`id_area`);

--
-- Indexes for table `m_status`
--
ALTER TABLE `m_status`
  ADD PRIMARY KEY (`id_status`);

--
-- Indexes for table `m_sto`
--
ALTER TABLE `m_sto`
  ADD PRIMARY KEY (`id_sto`);

--
-- Indexes for table `m_teknisi`
--
ALTER TABLE `m_teknisi`
  ADD PRIMARY KEY (`id_teknisi`);

--
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`id_user`);

--
-- Indexes for table `user_log`
--
ALTER TABLE `user_log`
  ADD PRIMARY KEY (`id_log`);

--
-- Indexes for table `work_order`
--
ALTER TABLE `work_order`
  ADD PRIMARY KEY (`id_wo`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `m_area`
--
ALTER TABLE `m_area`
  MODIFY `id_area` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `m_status`
--
ALTER TABLE `m_status`
  MODIFY `id_status` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `m_sto`
--
ALTER TABLE `m_sto`
  MODIFY `id_sto` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=20;

--
-- AUTO_INCREMENT for table `m_teknisi`
--
ALTER TABLE `m_teknisi`
  MODIFY `id_teknisi` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
  MODIFY `id_user` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `user_log`
--
ALTER TABLE `user_log`
  MODIFY `id_log` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `work_order`
--
ALTER TABLE `work_order`
  MODIFY `id_wo` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
