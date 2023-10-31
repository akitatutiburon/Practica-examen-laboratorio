-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 31-10-2023 a las 16:40:20
-- Versión del servidor: 10.4.28-MariaDB
-- Versión de PHP: 8.0.28

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `tienda_mascotas`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `adopciones`
--

CREATE TABLE `adopciones` (
  `id_adopciones` int(11) NOT NULL,
  `id_mascota` int(11) NOT NULL,
  `id_cliente` int(11) NOT NULL,
  `fecha` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `estado_legal_adopcion` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `clientes`
--

CREATE TABLE `clientes` (
  `id_cliente` int(11) NOT NULL,
  `nombres` varchar(50) NOT NULL,
  `apellidos` varchar(50) NOT NULL,
  `numero_ci` int(11) NOT NULL,
  `edad` int(2) NOT NULL,
  `ingreso_bruto_mensual` int(9) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `mascotas`
--

CREATE TABLE `mascotas` (
  `id_mascota` int(11) NOT NULL,
  `nombre` varchar(30) NOT NULL,
  `especie` varchar(30) NOT NULL,
  `raza` varchar(30) NOT NULL,
  `edad` int(3) NOT NULL,
  `genero` int(1) NOT NULL,
  `imagen` blob NOT NULL,
  `descripcion` varchar(512) NOT NULL,
  `estado_salud` int(2) NOT NULL,
  `estado_legal_mascota` int(1) NOT NULL,
  `precio` float(5,2) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `productos`
--

CREATE TABLE `productos` (
  `id_producto` int(11) NOT NULL,
  `nombre_producto` varchar(50) NOT NULL,
  `descripcion_producto` varchar(512) NOT NULL,
  `imagen` blob NOT NULL,
  `id_categoria` int(11) NOT NULL,
  `cantidad` int(3) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tabla_categoria`
--

CREATE TABLE `tabla_categoria` (
  `id_categoria` int(11) NOT NULL,
  `nombre_categoria` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `tabla_categoria`
--

INSERT INTO `tabla_categoria` (`id_categoria`, `nombre_categoria`) VALUES
(1, 'Comidas'),
(2, 'Juguetes'),
(3, 'Cuidados');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tabla_estado_legal_adopcion`
--

CREATE TABLE `tabla_estado_legal_adopcion` (
  `id_estado_legal_adopcion` int(11) NOT NULL,
  `nombre_estado_legal_adopcion` varchar(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `tabla_estado_legal_adopcion`
--

INSERT INTO `tabla_estado_legal_adopcion` (`id_estado_legal_adopcion`, `nombre_estado_legal_adopcion`) VALUES
(1, 'Finalizada'),
(2, 'En proceso'),
(3, 'Cancelada');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tabla_estado_legal_mascota`
--

CREATE TABLE `tabla_estado_legal_mascota` (
  `id_estado_legal_mascota` int(11) NOT NULL,
  `nombre_estado_legal_mascota` varchar(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `tabla_estado_legal_mascota`
--

INSERT INTO `tabla_estado_legal_mascota` (`id_estado_legal_mascota`, `nombre_estado_legal_mascota`) VALUES
(1, 'Adoptada'),
(2, 'En proceso de adopción'),
(3, 'Pendiente de adopción');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tabla_estado_salud`
--

CREATE TABLE `tabla_estado_salud` (
  `id_estado_salud` int(11) NOT NULL,
  `nombre_estado_salud` varchar(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `tabla_estado_salud`
--

INSERT INTO `tabla_estado_salud` (`id_estado_salud`, `nombre_estado_salud`) VALUES
(1, 'Sano'),
(2, 'Débil'),
(3, 'Enfermo'),
(4, 'Muerto'),
(5, 'En rehabilitación'),
(6, 'En cuidados intensivos');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tabla_genero`
--

CREATE TABLE `tabla_genero` (
  `id_genero` int(11) NOT NULL,
  `nombre_genero` varchar(15) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `tabla_genero`
--

INSERT INTO `tabla_genero` (`id_genero`, `nombre_genero`) VALUES
(1, 'Macho'),
(2, 'Hembra');

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `adopciones`
--
ALTER TABLE `adopciones`
  ADD PRIMARY KEY (`id_adopciones`),
  ADD KEY `id_mascota` (`id_mascota`),
  ADD KEY `id_cliente` (`id_cliente`),
  ADD KEY `estado_legal_adopcion` (`estado_legal_adopcion`);

--
-- Indices de la tabla `clientes`
--
ALTER TABLE `clientes`
  ADD PRIMARY KEY (`id_cliente`),
  ADD KEY `id_cliente` (`id_cliente`);

--
-- Indices de la tabla `mascotas`
--
ALTER TABLE `mascotas`
  ADD PRIMARY KEY (`id_mascota`),
  ADD KEY `id_mascota` (`id_mascota`),
  ADD KEY `genero` (`genero`),
  ADD KEY `estado_salud` (`estado_salud`),
  ADD KEY `estado_legal_mascota` (`estado_legal_mascota`);

--
-- Indices de la tabla `productos`
--
ALTER TABLE `productos`
  ADD PRIMARY KEY (`id_producto`),
  ADD KEY `id_producto` (`id_producto`),
  ADD KEY `id_categoria` (`id_categoria`);

--
-- Indices de la tabla `tabla_categoria`
--
ALTER TABLE `tabla_categoria`
  ADD PRIMARY KEY (`id_categoria`),
  ADD KEY `id_categoria` (`id_categoria`);

--
-- Indices de la tabla `tabla_estado_legal_adopcion`
--
ALTER TABLE `tabla_estado_legal_adopcion`
  ADD PRIMARY KEY (`id_estado_legal_adopcion`),
  ADD KEY `id_estado_legal_adopcion` (`id_estado_legal_adopcion`);

--
-- Indices de la tabla `tabla_estado_legal_mascota`
--
ALTER TABLE `tabla_estado_legal_mascota`
  ADD PRIMARY KEY (`id_estado_legal_mascota`),
  ADD KEY `id_estado_legal_mascota` (`id_estado_legal_mascota`);

--
-- Indices de la tabla `tabla_estado_salud`
--
ALTER TABLE `tabla_estado_salud`
  ADD PRIMARY KEY (`id_estado_salud`),
  ADD KEY `id_estado_salud` (`id_estado_salud`);

--
-- Indices de la tabla `tabla_genero`
--
ALTER TABLE `tabla_genero`
  ADD PRIMARY KEY (`id_genero`),
  ADD KEY `id_genero` (`id_genero`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `adopciones`
--
ALTER TABLE `adopciones`
  MODIFY `id_adopciones` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `clientes`
--
ALTER TABLE `clientes`
  MODIFY `id_cliente` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `mascotas`
--
ALTER TABLE `mascotas`
  MODIFY `id_mascota` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `productos`
--
ALTER TABLE `productos`
  MODIFY `id_producto` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `tabla_categoria`
--
ALTER TABLE `tabla_categoria`
  MODIFY `id_categoria` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT de la tabla `tabla_estado_legal_adopcion`
--
ALTER TABLE `tabla_estado_legal_adopcion`
  MODIFY `id_estado_legal_adopcion` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT de la tabla `tabla_estado_legal_mascota`
--
ALTER TABLE `tabla_estado_legal_mascota`
  MODIFY `id_estado_legal_mascota` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT de la tabla `tabla_estado_salud`
--
ALTER TABLE `tabla_estado_salud`
  MODIFY `id_estado_salud` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT de la tabla `tabla_genero`
--
ALTER TABLE `tabla_genero`
  MODIFY `id_genero` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- Restricciones para tablas volcadas
--

--
-- Filtros para la tabla `adopciones`
--
ALTER TABLE `adopciones`
  ADD CONSTRAINT `adopciones_ibfk_1` FOREIGN KEY (`estado_legal_adopcion`) REFERENCES `tabla_estado_legal_adopcion` (`id_estado_legal_adopcion`),
  ADD CONSTRAINT `adopciones_ibfk_2` FOREIGN KEY (`id_mascota`) REFERENCES `mascotas` (`id_mascota`),
  ADD CONSTRAINT `adopciones_ibfk_3` FOREIGN KEY (`id_cliente`) REFERENCES `clientes` (`id_cliente`);

--
-- Filtros para la tabla `mascotas`
--
ALTER TABLE `mascotas`
  ADD CONSTRAINT `mascotas_ibfk_1` FOREIGN KEY (`estado_legal_mascota`) REFERENCES `tabla_estado_legal_mascota` (`id_estado_legal_mascota`),
  ADD CONSTRAINT `mascotas_ibfk_2` FOREIGN KEY (`estado_salud`) REFERENCES `tabla_estado_salud` (`id_estado_salud`),
  ADD CONSTRAINT `mascotas_ibfk_3` FOREIGN KEY (`genero`) REFERENCES `tabla_genero` (`id_genero`);

--
-- Filtros para la tabla `productos`
--
ALTER TABLE `productos`
  ADD CONSTRAINT `productos_ibfk_1` FOREIGN KEY (`id_categoria`) REFERENCES `tabla_categoria` (`id_categoria`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
