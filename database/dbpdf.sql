-- phpMyAdmin SQL Dump
-- version 4.8.4
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jan 26, 2019 at 09:07 AM
-- Server version: 10.1.37-MariaDB
-- PHP Version: 7.3.0

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `dbpdf`
--

-- --------------------------------------------------------

--
-- Table structure for table `admin`
--

CREATE TABLE `admin` (
  `id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `username` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `admin`
--

INSERT INTO `admin` (`id`, `name`, `username`, `email`, `password`) VALUES
(1, 'Admin Moeldoko', 'muldoko', 'muldoko@gmail.com', '$2y$10$WmzthieM8CNdNVP0PTJ.k.H3eC0Y/20pO0aFaQgPo6eXpCcI1v2FW');

-- --------------------------------------------------------

--
-- Table structure for table `filepdf`
--

CREATE TABLE `filepdf` (
  `id` int(11) NOT NULL,
  `judul` varchar(255) NOT NULL,
  `namafile` varchar(100) NOT NULL,
  `user_id` int(11) NOT NULL,
  `tanggal` varchar(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `filepdf`
--

INSERT INTO `filepdf` (`id`, `judul`, `namafile`, `user_id`, `tanggal`) VALUES
(9, 'Tips Jalan jalan ke japan', '4Tips Jalan jalan ke japan.pdf', 4, ''),
(10, 'Pemrograman WEB', '5Pemrograman WEB.pdf', 5, ''),
(12, 'Ebook Bahasa Inggris', '5Ebook Bahasa Inggris.pdf', 5, ''),
(13, 'Jurnal Cloud Computing', '5Jurnal Cloud Computing.pdf', 5, ''),
(14, 'Materi Sistem Pakar', '5Materi Sistem Pakar.pdf', 5, ''),
(15, 'Pemrograman JAVA', '4Pemrograman JAVA.pdf', 4, '');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `username` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `name` varchar(255) NOT NULL,
  `photo` varchar(255) NOT NULL DEFAULT 'default.svg'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `username`, `email`, `password`, `name`, `photo`) VALUES
(4, 'try333', 'triumpar@gmail.com', '$2y$10$/qbPNMb0MJwa4jM.GaJvE.oSsKZ0ozUgS6FOhAa29cvSbWvlrFfWm', 'Tri Hariadi Purnomo', '4-48422608_304728340167623_3331749875472662528_n.jpg'),
(5, '8man', '8mannn@gmail.com', '$2y$10$G83QEm7Z5mWNskjFsPyPqewBD68xnr3/7t/snZYyoOJ5BeKh2uw9q', 'Andi Taufik', 'default.svg');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admin`
--
ALTER TABLE `admin`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `username` (`username`),
  ADD UNIQUE KEY `email` (`email`);

--
-- Indexes for table `filepdf`
--
ALTER TABLE `filepdf`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `username` (`username`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `admin`
--
ALTER TABLE `admin`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `filepdf`
--
ALTER TABLE `filepdf`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
