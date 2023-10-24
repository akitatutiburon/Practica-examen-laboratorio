-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 24-10-2023 a las 21:53:17
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
-- Base de datos: `tienda de mascotas`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `genders`
--

CREATE TABLE `genders` (
  `id` int(11) NOT NULL,
  `gender-name` varchar(6) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `genders`
--

INSERT INTO `genders` (`id`, `gender-name`) VALUES
(1, 'Male'),
(2, 'Female');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `mascotas-disponibles`
--

CREATE TABLE `mascotas-disponibles` (
  `id` int(11) NOT NULL,
  `species` varchar(50) NOT NULL,
  `breed` varchar(50) DEFAULT NULL,
  `name` varchar(50) NOT NULL,
  `age` varchar(50) DEFAULT NULL,
  `gender` int(11) NOT NULL,
  `price` float(5,2) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `mascotas-disponibles`
--

INSERT INTO `mascotas-disponibles` (`id`, `species`, `breed`, `name`, `age`, `gender`, `price`) VALUES
(1, 'Perro', 'Chihuahua', 'Pancho', '5', 1, 3.99),
(2, 'Gato', 'Dell-mer', 'Gato', '7', 1, 999.99),
(3, 'Totuga', 'Morrocoy', 'Tortu', '70', 2, 25.99),
(4, 'Perro', 'Yorkshire', 'Kusco', '3', 1, 35.55),
(5, 'Perro', 'Shitzu', 'Molly', '4', 2, 49.99),
(6, 'Dragon', 'Furia nocturna', 'Chimuelo', '21', 1, 689.99),
(7, 'Roedor', 'Hamster', 'Rhino', '5', 1, 54.99),
(8, 'Mosquito', 'Paraguayo', 'Puchi', '1', 2, 0.99),
(9, 'Gato', 'Dell-mer', 'Simon', '6', 1, 67.99),
(11, 'Loro', 'Calopsita', 'Perla', '6', 2, 704.99);

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `genders`
--
ALTER TABLE `genders`
  ADD PRIMARY KEY (`id`),
  ADD KEY `gender-name` (`id`),
  ADD KEY `id` (`id`);

--
-- Indices de la tabla `mascotas-disponibles`
--
ALTER TABLE `mascotas-disponibles`
  ADD PRIMARY KEY (`id`),
  ADD KEY `gender` (`gender`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `genders`
--
ALTER TABLE `genders`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT de la tabla `mascotas-disponibles`
--
ALTER TABLE `mascotas-disponibles`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- Restricciones para tablas volcadas
--

--
-- Filtros para la tabla `mascotas-disponibles`
--
ALTER TABLE `mascotas-disponibles`
  ADD CONSTRAINT `mascotas-disponibles_ibfk_1` FOREIGN KEY (`gender`) REFERENCES `genders` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
