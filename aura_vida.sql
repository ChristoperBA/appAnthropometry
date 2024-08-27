-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Aug 26, 2024 at 08:02 AM
-- Server version: 8.0.30
-- PHP Version: 8.1.25

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `aura_vida`
--

-- --------------------------------------------------------

--
-- Table structure for table `anthropometry`
--

CREATE TABLE `anthropometry` (
  `idMetric` int NOT NULL,
  `idUser` int NOT NULL,
  `date` date NOT NULL,
  `height_m` decimal(5,2) NOT NULL,
  `weight_Kg` decimal(5,2) NOT NULL,
  `fat_pct` decimal(5,2) NOT NULL,
  `water_L` decimal(5,2) NOT NULL,
  `muscle_Kg` decimal(5,2) NOT NULL,
  `bone_Kg` decimal(5,2) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `anthropometry`
--

INSERT INTO `anthropometry` (`idMetric`, `idUser`, `date`, `height_m`, `weight_Kg`, `fat_pct`, `water_L`, `muscle_Kg`, `bone_Kg`) VALUES
(1, 1, '2024-08-23', 1.61, 59.00, 25.00, 32.00, 24.00, 3.00),
(2, 2, '2024-08-17', 1.60, 55.00, 26.00, 28.00, 20.00, 2.00);

-- --------------------------------------------------------

--
-- Table structure for table `usuario_login`
--

CREATE TABLE `usuario_login` (
  `Id` int NOT NULL,
  `nombre_usuario` varchar(50) COLLATE utf8mb4_general_ci NOT NULL,
  `correo` varchar(50) COLLATE utf8mb4_general_ci NOT NULL,
  `contrasena` varchar(50) COLLATE utf8mb4_general_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `usuario_login`
--

INSERT INTO `usuario_login` (`Id`, `nombre_usuario`, `correo`, `contrasena`) VALUES
(1, 'Rogerfps', 'roger.rps06@gmail.com', 'roger');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `anthropometry`
--
ALTER TABLE `anthropometry`
  ADD PRIMARY KEY (`idMetric`);

--
-- Indexes for table `usuario_login`
--
ALTER TABLE `usuario_login`
  ADD PRIMARY KEY (`Id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `anthropometry`
--
ALTER TABLE `anthropometry`
  MODIFY `idMetric` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `usuario_login`
--
ALTER TABLE `usuario_login`
  MODIFY `Id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
