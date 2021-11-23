-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Nov 23, 2021 at 02:29 AM
-- Server version: 10.4.20-MariaDB
-- PHP Version: 8.0.9

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `jardin`
--

-- --------------------------------------------------------

--
-- Table structure for table `admin`
--

CREATE TABLE `admin` (
  `id_admin` int(11) NOT NULL,
  `Admin` varchar(20) COLLATE utf8mb4_spanish2_ci NOT NULL,
  `Contraseña` varchar(60) COLLATE utf8mb4_spanish2_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_spanish2_ci;

--
-- Dumping data for table `admin`
--

INSERT INTO `admin` (`id_admin`, `Admin`, `Contraseña`) VALUES
(0, 'Admin', '12345'),
(0, 'Cristian', '12345'),
(0, 'Daniel', '12345'),
(0, 'Nicolas', '12345');

-- --------------------------------------------------------

--
-- Table structure for table `alumno`
--

CREATE TABLE `alumno` (
  `TI` int(11) NOT NULL,
  `NombreAl` varchar(30) COLLATE utf8mb4_spanish2_ci NOT NULL,
  `ApellidoAl` varchar(20) COLLATE utf8mb4_spanish2_ci NOT NULL,
  `Edad` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_spanish2_ci;

-- --------------------------------------------------------

--
-- Table structure for table `citas`
--

CREATE TABLE `citas` (
  `IDFec` int(11) NOT NULL,
  `Fecha` date NOT NULL,
  `Hora` varchar(20) COLLATE utf8mb4_spanish2_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_spanish2_ci;

-- --------------------------------------------------------

--
-- Table structure for table `profesores`
--

CREATE TABLE `profesores` (
  `NombreP` varchar(20) COLLATE utf8mb4_spanish2_ci NOT NULL,
  `ApellidoP` varchar(20) COLLATE utf8mb4_spanish2_ci NOT NULL,
  `Curso` varchar(20) COLLATE utf8mb4_spanish2_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_spanish2_ci;

--
-- Dumping data for table `profesores`
--

INSERT INTO `profesores` (`NombreP`, `ApellidoP`, `Curso`) VALUES
('Liliana', 'Villñanueva', 'Avanzado'),
('Sandra', 'Mora', 'Caminadores'),
('Paola', 'Rodriguez', 'Jardin'),
('Milena', 'Robles', 'Parvulos'),
('Yomaira', 'Linarez', 'Pre jardin');

-- --------------------------------------------------------

--
-- Table structure for table `usuarios`
--

CREATE TABLE `usuarios` (
  `Id_usuario` int(11) NOT NULL,
  `Nombre` varchar(60) COLLATE utf8mb4_spanish2_ci NOT NULL,
  `Apellido` varchar(60) COLLATE utf8mb4_spanish2_ci NOT NULL,
  `Direccion` text COLLATE utf8mb4_spanish2_ci NOT NULL,
  `Telefono` bigint(20) NOT NULL,
  `Correo` varchar(30) COLLATE utf8mb4_spanish2_ci NOT NULL,
  `IDFec` int(11) NOT NULL,
  `Curso` varchar(30) COLLATE utf8mb4_spanish2_ci NOT NULL,
  `TI` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_spanish2_ci;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `alumno`
--
ALTER TABLE `alumno`
  ADD PRIMARY KEY (`TI`);

--
-- Indexes for table `citas`
--
ALTER TABLE `citas`
  ADD PRIMARY KEY (`IDFec`);

--
-- Indexes for table `profesores`
--
ALTER TABLE `profesores`
  ADD PRIMARY KEY (`Curso`);

--
-- Indexes for table `usuarios`
--
ALTER TABLE `usuarios`
  ADD PRIMARY KEY (`Id_usuario`),
  ADD KEY `Fecha` (`TI`),
  ADD KEY `Curso` (`Curso`),
  ADD KEY `IDFec` (`IDFec`);

--
-- Constraints for dumped tables
--

--
-- Constraints for table `usuarios`
--
ALTER TABLE `usuarios`
  ADD CONSTRAINT `usuarios_ibfk_1` FOREIGN KEY (`TI`) REFERENCES `alumno` (`TI`),
  ADD CONSTRAINT `usuarios_ibfk_3` FOREIGN KEY (`Curso`) REFERENCES `profesores` (`Curso`),
  ADD CONSTRAINT `usuarios_ibfk_4` FOREIGN KEY (`IDFec`) REFERENCES `citas` (`IDFec`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
