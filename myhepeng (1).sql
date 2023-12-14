-- phpMyAdmin SQL Dump
-- version 5.1.3
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Dec 14, 2023 at 08:51 AM
-- Server version: 10.4.24-MariaDB
-- PHP Version: 8.2.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `myhepeng`
--

-- --------------------------------------------------------

--
-- Table structure for table `lapkeu`
--

CREATE TABLE `lapkeu` (
  `id` int(11) NOT NULL,
  `date` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `deskripsi` text NOT NULL,
  `tipe` varchar(100) NOT NULL,
  `total` int(11) NOT NULL,
  `act_name` varchar(255) NOT NULL,
  `id_user` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `lapkeu`
--

INSERT INTO `lapkeu` (`id`, `date`, `deskripsi`, `tipe`, `total`, `act_name`, `id_user`) VALUES
(7, '2023-12-14 06:55:36', 'Gaji UTOR yang sangat berharga', 'pemasukan', 500000, 'Gaji dari UTOR', 5),
(9, '2023-12-14 07:05:19', 'Biaya bulanan wifi indihome ', 'pengeluaran', 125000, 'Biaya Wifi Indihome', 5);

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `saldo` int(100) NOT NULL,
  `password` varchar(255) NOT NULL,
  `pendapatan` int(11) NOT NULL,
  `pengeluaran` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `name`, `email`, `saldo`, `password`, `pendapatan`, `pengeluaran`) VALUES
(5, 'putra harifin', 'putraharifin@gmail.com', -125000, '$2y$10$tkvpSjsFncRSKD2JHFSxc.3nJ98yE4adk7TjqD7vKXpwga9KPKDo.', 500000, 125000);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `lapkeu`
--
ALTER TABLE `lapkeu`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `lapkeu`
--
ALTER TABLE `lapkeu`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
