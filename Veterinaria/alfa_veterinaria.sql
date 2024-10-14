-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 29-08-2024 a las 22:16:53
-- Versión del servidor: 10.4.32-MariaDB
-- Versión de PHP: 8.2.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `alfa_veterinaria`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `administradores`
--

CREATE TABLE `administradores` (
  `id_admin` int(20) NOT NULL,
  `Nombre` varchar(25) DEFAULT NULL,
  `Apellido_p` varchar(25) DEFAULT NULL,
  `Apellido_m` varchar(25) DEFAULT NULL,
  `Correo` varchar(30) DEFAULT NULL,
  `Contraseña` varchar(20) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `administradores`
--

INSERT INTO `administradores` (`id_admin`, `Nombre`, `Apellido_p`, `Apellido_m`, `Correo`, `Contraseña`) VALUES
(123, 'Zaid', 'Orozco', 'Sanchez', 'zaid@gmail.com', '12345');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `diagnostico`
--

CREATE TABLE `diagnostico` (
  `Num_diagnostico` int(10) NOT NULL,
  `P_codigo` int(10) NOT NULL,
  `id_dueño` int(10) NOT NULL,
  `id_medico` int(10) NOT NULL,
  `Fecha` date DEFAULT NULL,
  `Padecimiento` varchar(100) DEFAULT NULL,
  `Sintomas` varchar(100) DEFAULT NULL,
  `Comentarios` varchar(100) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `dueños`
--

CREATE TABLE `dueños` (
  `id_dueño` int(10) NOT NULL,
  `Nombre` varchar(25) DEFAULT NULL,
  `Apellido_p` varchar(25) DEFAULT NULL,
  `Apellido_m` varchar(25) DEFAULT NULL,
  `Num_cuenta` int(20) DEFAULT NULL,
  `Direccion` varchar(60) DEFAULT NULL,
  `Telefono` bigint(15) DEFAULT NULL,
  `Correo` varchar(40) DEFAULT NULL,
  `Codigo_postal` int(10) DEFAULT NULL,
  `RFC` varchar(15) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `medico`
--

CREATE TABLE `medico` (
  `id_medico` int(10) NOT NULL,
  `Nombre` varchar(25) DEFAULT NULL,
  `Apellido_p` varchar(25) DEFAULT NULL,
  `Apellido_m` varchar(25) DEFAULT NULL,
  `Correo` varchar(30) DEFAULT NULL,
  `Telefono` bigint(15) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `pacientes`
--

CREATE TABLE `pacientes` (
  `P_codigo` int(10) NOT NULL,
  `Alias` varchar(20) NOT NULL,
  `Especie` varchar(20) NOT NULL,
  `Raza` varchar(20) NOT NULL,
  `Color` varchar(20) NOT NULL,
  `Fecha_Nac` date NOT NULL,
  `Peso_medio` int(10) NOT NULL,
  `Peso_actual` int(10) NOT NULL,
  `id_dueño` int(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `receta`
--

CREATE TABLE `receta` (
  `Num_receta` int(10) NOT NULL,
  `P_codigo` int(10) DEFAULT NULL,
  `id_dueño` int(10) DEFAULT NULL,
  `id_medico` int(10) DEFAULT NULL,
  `Fecha` date DEFAULT NULL,
  `Medicamentos` varchar(100) DEFAULT NULL,
  `Tratamiento` varchar(100) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `administradores`
--
ALTER TABLE `administradores`
  ADD PRIMARY KEY (`id_admin`);

--
-- Indices de la tabla `diagnostico`
--
ALTER TABLE `diagnostico`
  ADD PRIMARY KEY (`Num_diagnostico`),
  ADD UNIQUE KEY `P_codigo` (`P_codigo`),
  ADD UNIQUE KEY `id_dueño` (`id_dueño`),
  ADD UNIQUE KEY `id_medico` (`id_medico`);

--
-- Indices de la tabla `dueños`
--
ALTER TABLE `dueños`
  ADD PRIMARY KEY (`id_dueño`);

--
-- Indices de la tabla `medico`
--
ALTER TABLE `medico`
  ADD PRIMARY KEY (`id_medico`);

--
-- Indices de la tabla `pacientes`
--
ALTER TABLE `pacientes`
  ADD PRIMARY KEY (`P_codigo`),
  ADD UNIQUE KEY `id_dueño` (`id_dueño`);

--
-- Indices de la tabla `receta`
--
ALTER TABLE `receta`
  ADD PRIMARY KEY (`Num_receta`),
  ADD UNIQUE KEY `P_codigo` (`P_codigo`),
  ADD UNIQUE KEY `id_dueño` (`id_dueño`),
  ADD UNIQUE KEY `id_medico` (`id_medico`);

--
-- Restricciones para tablas volcadas
--

--
-- Filtros para la tabla `diagnostico`
--
ALTER TABLE `diagnostico`
  ADD CONSTRAINT `diagnostico_ibfk_1` FOREIGN KEY (`P_codigo`) REFERENCES `pacientes` (`P_codigo`) ON UPDATE CASCADE,
  ADD CONSTRAINT `diagnostico_ibfk_2` FOREIGN KEY (`id_dueño`) REFERENCES `dueños` (`id_dueño`) ON UPDATE CASCADE,
  ADD CONSTRAINT `diagnostico_ibfk_3` FOREIGN KEY (`id_medico`) REFERENCES `medico` (`id_medico`) ON UPDATE CASCADE;

--
-- Filtros para la tabla `pacientes`
--
ALTER TABLE `pacientes`
  ADD CONSTRAINT `pacientes_ibfk_1` FOREIGN KEY (`id_dueño`) REFERENCES `dueños` (`id_dueño`) ON UPDATE CASCADE;

--
-- Filtros para la tabla `receta`
--
ALTER TABLE `receta`
  ADD CONSTRAINT `receta_ibfk_1` FOREIGN KEY (`P_codigo`) REFERENCES `pacientes` (`P_codigo`) ON UPDATE CASCADE,
  ADD CONSTRAINT `receta_ibfk_2` FOREIGN KEY (`id_dueño`) REFERENCES `dueños` (`id_dueño`) ON UPDATE CASCADE,
  ADD CONSTRAINT `receta_ibfk_3` FOREIGN KEY (`id_medico`) REFERENCES `medico` (`id_medico`) ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
