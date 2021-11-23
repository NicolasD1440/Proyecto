-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Nov 20, 2021 at 09:15 PM
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

--
-- Dumping data for table `alumno`
--

INSERT INTO `alumno` (`TI`, `NombreAl`, `ApellidoAl`, `Edad`) VALUES
(1, 'stanlin', 'ghbtdfhf', 7),
(2, 'Smither', 'dgfdgdg', 111),
(8529, 'fgfdgdfg', 'señor', 15),
(33336, 'nose', 'xd', 6),
(125879, 'Mark', 'zukaritas', 5),
(256969, 'Mark', 'comunista', 7),
(658423, 'stanlin', 'xd', 8),
(888962, 'Smither', 'señor', 7),
(1232654, 'fgfdgdfg', 'señor', 5),
(2369147, 'niughujk', 'zukaritas', 8),
(12554466, 'Deyvi', 'Chavez', 5),
(2121254545, 'Sofia', 'Ortegon', 4),
(2147483647, 'fgfdgdfg', 'ghbtdfhf', 5);

-- --------------------------------------------------------

--
-- Table structure for table `citas`
--

CREATE TABLE `citas` (
  `IDFec` int(11) NOT NULL,
  `Fecha` date NOT NULL,
  `Hora` varchar(20) COLLATE utf8mb4_spanish2_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_spanish2_ci;

--
-- Dumping data for table `citas`
--

INSERT INTO `citas` (`IDFec`, `Fecha`, `Hora`) VALUES
(122, '2021-11-04', '9:30'),
(194, '2021-11-26', ''),
(215, '2021-11-22', ''),
(220, '2021-11-12', ''),
(247, '2021-11-17', ''),
(437, '2021-11-15', ''),
(476, '2021-11-23', ''),
(493, '2021-11-11', ''),
(567, '2021-11-09', ''),
(579, '2021-11-11', ''),
(764, '2021-11-08', ''),
(831, '2021-11-04', ''),
(7858, '2021-11-11', '');

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
-- Dumping data for table `usuarios`
--

INSERT INTO `usuarios` (`Id_usuario`, `Nombre`, `Apellido`, `Direccion`, `Telefono`, `Correo`, `IDFec`, `Curso`, `TI`) VALUES
(1093, 'Hitler', 'Fulanito', 'calle no hot', 15249844848, 'nicolas@gmail.com', 567, 'Caminadores', 33336),
(1446, 'Cosme', 'Castiblanco Infante', 'ciodhf9iaf', 8888888, 'cosme@gmail.com', 476, 'Avanzado', 658423),
(1554, 'Cosme ', 'Funalinito', 'Calle siempre viva', 8888889, 'cosme5555@gmail.com', 247, 'Jardin', 888962),
(3708, 'Cosme ', 'Capitalista', 'calle verdadera1', 77777777, 'dad@gmail.com', 493, 'Avanzado', 1232654),
(4501, 'Paola', 'Ortegon', 'Avenida Colombia', 3115563378, 'Paoortegon@gmail.com', 7858, 'Pre jardin', 2121254545),
(6405, 'Cosme', 'fasfa', 'ciodhf9iaf', 1524984, 'cosme5555fgf@gmail.com', 122, 'Caminadores', 2),
(6975, 'fa', 'Capitalista', 'calle verdadera1', 1524984, 'dad@gmail.com', 220, 'Parvulos', 2369147),
(7256, 'Hitler', 'Capitalista', 'Calle hot', 15249844848, 'cosme55556565656@gmail.com', 764, 'Pre jardin', 1),
(7322, 'Deivy Nicolas ', 'Castiblanco Infante', 'calle no hot', 77777777, 'nicolas@gmail.com', 831, 'Parvulos', 125879),
(7704, 'Cosme', 'Jam', 'ciodhf9iaf', 15249844848, 'dad@gmail.com', 194, 'Caminadores', 2147483647),
(7924, 'Niki', 'Castiblanco Infante', 'Calle siempre viva', 15249844848, 'cosme55556565656@gmail.com', 215, 'Parvulos', 8529),
(8519, 'Nicolas', 'Castiblanco', 'Calle las rosas', 3125782745, 'NicoCas@hotmail.com', 579, 'Pre jardin', 12554466),
(9714, 'Niki', 'Jam', 'calle no hot', 1524984, 'cosme@gmail.com', 437, 'Parvulos', 256969);

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
