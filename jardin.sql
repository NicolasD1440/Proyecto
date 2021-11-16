-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 14-11-2021 a las 06:02:41
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
  `Admin` varchar(20) COLLATE utf8_spanish_ci NOT NULL,
  `Contraseña` varchar(60) COLLATE utf8_spanish_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

--
-- Volcado de datos para la tabla `admin`
--

INSERT INTO `admin` (`id_admin`, `Admin`, `Contraseña`) VALUES
(1, 'Cristian', '201995');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `alumno`
--

CREATE TABLE `alumno` (
  `NombreAl` varchar(30) COLLATE utf8_spanish_ci NOT NULL,
  `ApellidoAl` varchar(20) COLLATE utf8_spanish_ci NOT NULL,
  `Edad` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

--
-- Volcado de datos para la tabla `alumno`
--

INSERT INTO `alumno` (`NombreAl`, `ApellidoAl`, `Edad`) VALUES
('Cristian', 'Wilches', 1),
('Daniel', 'Tocora', 1),
('Ivonne', 'Tocora', 3),
('Lian', 'Suarez', 1),
('Luz', 'Wilches', 12);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `profesores`
--

CREATE TABLE `profesores` (
  `NombreP` varchar(20) COLLATE utf8_spanish_ci NOT NULL,
  `ApellidoP` varchar(20) COLLATE utf8_spanish_ci NOT NULL,
  `Curso` varchar(30) COLLATE utf8_spanish_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

--
-- Volcado de datos para la tabla `profesores`
--

INSERT INTO `profesores` (`NombreP`, `ApellidoP`, `Curso`) VALUES
('Liliana', 'Villanueva', 'Avanzado'),
('Sandra', 'Mora', 'Caminadores'),
('Paola', 'Rodriguez', 'Jardin'),
('Milena', 'Robles', 'Parvulos'),
('Yomaira', 'Linares', 'Pre jardin');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `usuarios`
--

CREATE TABLE `usuarios` (
  `Id_usuario` int(11) NOT NULL,
  `Fecha` date NOT NULL,
  `Nombre` varchar(60) COLLATE utf8_spanish_ci NOT NULL,
  `Apellido` varchar(60) COLLATE utf8_spanish_ci NOT NULL,
  `Direccion` text COLLATE utf8_spanish_ci NOT NULL,
  `Telefono` bigint(20) NOT NULL,
  `Correo` varchar(30) COLLATE utf8_spanish_ci NOT NULL,
  `Curso` varchar(30) COLLATE utf8_spanish_ci NOT NULL,
  `NombreAl` varchar(30) COLLATE utf8_spanish_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

--
-- Volcado de datos para la tabla `usuarios`
--

INSERT INTO `usuarios` (`Id_usuario`, `Fecha`, `Nombre`, `Apellido`, `Direccion`, `Telefono`, `Correo`, `Curso`, `NombreAl`) VALUES
(9, '2021-11-18', 'Cristian', 'cruz', 'calle falsa 123', 3106782242, 'cgcruz@hotmail.com', 'Pre jardin', 'Lian'),
(11, '2021-11-13', 'giovani', 'Castiblanco', 'jhkfjhfksdf', 31330889392, 'Nicolas@hot.com', 'Caminadores', 'Daniel'),
(12, '2021-11-20', 'Daniel', 'Chavez', 'Calle de las flores', 31330889392, 'Nicolas@hot.com', 'Jardin', 'Luz'),
(13, '2021-11-05', 'Nicolas', 'Castiblanco', 'calle hot', 31215487, 'jpcruz@hotm.com', 'Jardin', 'Cristian');

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `admin`
--
ALTER TABLE `admin`
  ADD PRIMARY KEY (`id_admin`);

--
-- Indices de la tabla `alumno`
--
ALTER TABLE `alumno`
  ADD PRIMARY KEY (`NombreAl`);

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
  ADD KEY `NombreAl` (`NombreAl`),
  ADD KEY `Curso` (`Curso`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `admin`
--
ALTER TABLE `admin`
  MODIFY `id_admin` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT de la tabla `usuarios`
--
ALTER TABLE `usuarios`
  MODIFY `Id_usuario` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- Restricciones para tablas volcadas
--

--
-- Filtros para la tabla `usuarios`
--
ALTER TABLE `usuarios`
  ADD CONSTRAINT `usuarios_ibfk_1` FOREIGN KEY (`NombreAl`) REFERENCES `alumno` (`NombreAl`),
  ADD CONSTRAINT `usuarios_ibfk_2` FOREIGN KEY (`Curso`) REFERENCES `profesores` (`curso`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
