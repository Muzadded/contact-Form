-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jun 29, 2024 at 03:56 AM
-- Server version: 10.4.32-MariaDB
-- PHP Version: 8.2.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `contact_form`
--

-- --------------------------------------------------------

--
-- Table structure for table `contact_list`
--

CREATE TABLE `contact_list` (
  `id` int(11) NOT NULL,
  `first_Name` varchar(255) NOT NULL,
  `last_Name` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `image` varchar(500) NOT NULL,
  `user_file` varchar(500) NOT NULL,
  `comment` text NOT NULL,
  `date_created` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `contact_list`
--

INSERT INTO `contact_list` (`id`, `first_Name`, `last_Name`, `email`, `image`, `user_file`, `comment`, `date_created`) VALUES
(1, 'Rifat', 'Kalam', 'rh@gmail.com', '', '654b2cf2222a4667b1323196-great-value-vegetable-oil-48-fl-oz.jpg', 'Niceee', '2024-06-27'),
(3, 'abdus', 'Salam', '', '', 'Document.docx', 'Great Work\r\n', '2024-06-27'),
(4, 'ifty', 'molla', 'im@mail.com', '', 'DRAMA (G.O SON).docx', 'hahaha', '2024-06-27'),
(6, 'Roman ', 'Rahman', 'ri@mail.com', '', 'F23_EarningsNeutralBlue_02[1].svg', 'Areee Broo', '2024-06-29');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `contact_list`
--
ALTER TABLE `contact_list`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `contact_list`
--
ALTER TABLE `contact_list`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
