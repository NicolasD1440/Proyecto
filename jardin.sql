-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 19-11-2021 a las 22:46:24
-- Versión del servidor: 10.4.20-MariaDB
-- Versión de PHP: 8.0.9

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `jardin`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `admin`
--

CREATE TABLE `admin` (
  `id_admin` int(11) NOT NULL,
  `Admin` varchar(20) COLLATE utf8mb4_spanish2_ci NOT NULL,
  `Contraseña` varchar(60) COLLATE utf8mb4_spanish2_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_spanish2_ci;

--
-- Volcado de datos para la tabla `admin`
--

INSERT INTO `admin` (`id_admin`, `Admin`, `Contraseña`) VALUES
(0, 'Admin', '12345'),
(0, 'Cristian', '12345');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `alumno`
--

CREATE TABLE `alumno` (
  `TI` int(11) NOT NULL,
  `NombreAl` varchar(30) COLLATE utf8mb4_spanish2_ci NOT NULL,
  `ApellidoAl` varchar(20) COLLATE utf8mb4_spanish2_ci NOT NULL,
  `Edad` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_spanish2_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `citas`
--

CREATE TABLE `citas` (
  `Fecha` date NOT NULL,
  `Hora` time NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_spanish2_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `profesores`
--

CREATE TABLE `profesores` (
  `NombreP` varchar(20) COLLATE utf8mb4_spanish2_ci NOT NULL,
  `ApellidoP` varchar(20) COLLATE utf8mb4_spanish2_ci NOT NULL,
  `Curso` varchar(20) COLLATE utf8mb4_spanish2_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_spanish2_ci;

--
-- Volcado de datos para la tabla `profesores`
--

INSERT INTO `profesores` (`NombreP`, `ApellidoP`, `Curso`) VALUES
('Liliana', 'Villñanueva', 'Avanzado'),
('Sandra', 'Mora', 'Caminadores'),
('Paola', 'Rodriguez', 'Jardin'),
('Milena', 'Robles', 'Parvulos'),
('Yomaira', 'Linarez', 'Pre jardin');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `usuarios`
--

CREATE TABLE `usuarios` (
  `Id_usuario` int(11) NOT NULL,
  `Nombre` varchar(60) COLLATE utf8mb4_spanish2_ci NOT NULL,
  `Apellido` varchar(60) COLLATE utf8mb4_spanish2_ci NOT NULL,
  `Direccion` text COLLATE utf8mb4_spanish2_ci NOT NULL,
  `Telefono` bigint(20) NOT NULL,
  `Correo` varchar(30) COLLATE utf8mb4_spanish2_ci NOT NULL,
  `Curso` varchar(30) COLLATE utf8mb4_spanish2_ci NOT NULL,
  `Fecha` date NOT NULL,
  `TI` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_spanish2_ci;

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `alumno`
--
ALTER TABLE `alumno`
  ADD PRIMARY KEY (`TI`);

--
-- Indices de la tabla `citas`
--
ALTER TABLE `citas`
  ADD PRIMARY KEY (`Fecha`);

--
-- Indices de la tabla `profesores`
--
ALTER TABLE `profesores`
  ADD PRIMARY KEY (`Curso`);

--
-- Indices de la tabla `usuarios`
--
ALTER TABLE `usuarios`
  ADD PRIMARY KEY (`Id_usuario`),
  ADD KEY `Fecha` (`Fecha`,`TI`),
  ADD KEY `TI` (`TI`),
  ADD KEY `Curso` (`Curso`);

--
-- Restricciones para tablas volcadas
--

--
-- Filtros para la tabla `usuarios`
--
ALTER TABLE `usuarios`
  ADD CONSTRAINT `usuarios_ibfk_1` FOREIGN KEY (`TI`) REFERENCES `alumno` (`TI`),
  ADD CONSTRAINT `usuarios_ibfk_2` FOREIGN KEY (`Fecha`) REFERENCES `citas` (`Fecha`),
  ADD CONSTRAINT `usuarios_ibfk_3` FOREIGN KEY (`Curso`) REFERENCES `profesores` (`Curso`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
