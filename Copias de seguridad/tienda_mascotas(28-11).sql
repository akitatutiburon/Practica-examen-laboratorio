-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Nov 28, 2023 at 04:52 PM
-- Server version: 10.4.28-MariaDB
-- PHP Version: 8.0.28

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `tienda_mascotas`
--

-- --------------------------------------------------------

--
-- Table structure for table `adopciones`
--

CREATE TABLE `adopciones` (
  `id_adopciones` int(11) NOT NULL,
  `id_mascota` int(11) NOT NULL,
  `id_cliente` int(11) NOT NULL,
  `fecha` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `estado_legal_adopcion` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `adopciones`
--

INSERT INTO `adopciones` (`id_adopciones`, `id_mascota`, `id_cliente`, `fecha`, `estado_legal_adopcion`) VALUES
(1, 4, 4, '2023-11-16 23:02:00', 1),
(2, 3, 4, '2023-10-31 17:11:01', 1),
(3, 23, 3, '2023-11-16 22:50:00', 3),
(5, 24, 4, '2023-11-28 14:55:00', 1);

-- --------------------------------------------------------

--
-- Table structure for table `clientes`
--

CREATE TABLE `clientes` (
  `id_cliente` int(11) NOT NULL,
  `nombres` varchar(50) NOT NULL,
  `apellidos` varchar(50) NOT NULL,
  `numero_ci` int(11) NOT NULL,
  `edad` int(2) NOT NULL,
  `ingreso_bruto_mensual` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `clientes`
--

INSERT INTO `clientes` (`id_cliente`, `nombres`, `apellidos`, `numero_ci`, `edad`, `ingreso_bruto_mensual`) VALUES
(1, 'Jose Mauricio', 'Gómez Gomez', 5681624, 17, 2000000),
(2, 'Jonathan Dadiv', 'Aguirre Peralta', 7595416, 18, 500000),
(3, 'Matias ', 'Amadeu', 4561230, 17, 120000),
(4, 'Keisi ', 'Liebich Tacilla', 9854712, 19, 3600000),
(5, 'Rey', 'Amburgües', 1231312, 69, 330000000);

-- --------------------------------------------------------

--
-- Table structure for table `mascotas`
--

CREATE TABLE `mascotas` (
  `id_mascota` int(11) NOT NULL,
  `nombre` varchar(30) NOT NULL,
  `especie` varchar(30) NOT NULL,
  `raza` varchar(30) NOT NULL,
  `edad` int(3) NOT NULL,
  `genero` int(1) NOT NULL,
  `imagen` int(11) NOT NULL,
  `descripcion` varchar(512) NOT NULL,
  `estado_salud` int(2) NOT NULL,
  `estado_legal_mascota` int(1) NOT NULL,
  `precio` float(5,2) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `mascotas`
--

INSERT INTO `mascotas` (`id_mascota`, `nombre`, `especie`, `raza`, `edad`, `genero`, `imagen`, `descripcion`, `estado_salud`, `estado_legal_mascota`, `precio`) VALUES
(3, 'Cuqui', 'Perro', 'Caniche', 2, 1, 0, 'El perro del prota en hay que comer ', 4, 1, 2.99),
(4, 'Tortu', 'Tortuga', 'Morrocoi', 78, 2, 0, 'Tortuga voladora ', 1, 2, 68.99),
(16, 'SPREEN', 'Oso', 'bezudo', 2, 1, 0, 'El amigo de farfadox mas canchero', 6, 3, 38.14),
(17, 'Polo', 'perro', 'labrador', 4, 1, 0, 'El perro de totia', 2, 1, 26.00),
(20, 'Osi', 'Nutria', 'rinaMa', 2, 2, 0, 'El prota del libro Osi la nutria', 3, 3, 25.96),
(22, 'Kitty soft paws', 'gato', 'fold escoces', 5, 2, 0, 'gatete imaginario', 5, 2, 27.26),
(23, 'Chimichurri', 'gato', 'siames', 3, 1, 0, 'Mi último gato que murió', 4, 3, 12.65),
(24, 'Coffee', 'gato', '', 0, 2, 0, 'Mi gata que parió 8 gatetes', 4, 1, 999.99),
(26, 'Fresco', 'gato', '', 9, 1, 0, 'mascota default de soul knight', 1, 2, 0.99),
(32, 'Prueba', 'no c', 'no c', 3, 2, 0, 'La prueba', 5, 2, 12.65);

-- --------------------------------------------------------

--
-- Table structure for table `movimiento_productos`
--

CREATE TABLE `movimiento_productos` (
  `id` int(11) NOT NULL,
  `tipo_movimiento` int(11) NOT NULL,
  `id_cliente` int(11) NOT NULL,
  `cantidad` int(11) NOT NULL,
  `id_producto` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `productos`
--

CREATE TABLE `productos` (
  `id_producto` int(11) NOT NULL,
  `nombre_producto` varchar(50) NOT NULL,
  `descripcion_producto` varchar(512) NOT NULL,
  `imagen` varchar(255) NOT NULL,
  `id_categoria` int(11) NOT NULL,
  `cantidad` int(3) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `productos`
--

INSERT INTO `productos` (`id_producto`, `nombre_producto`, `descripcion_producto`, `imagen`, `id_categoria`, `cantidad`) VALUES
(1, 'Dogwopper', 'Snack para perros de \"Hamburguesa Rey\"', '', 1, 25),
(2, 'Torre para arañar', 'Juguete para gatos ', '', 2, 12),
(3, 'Afilaescamas para dragones', 'Afilador de escamas para dragones raza furia nocturna', '', 3, 3);

-- --------------------------------------------------------

--
-- Table structure for table `tabla_categoria`
--

CREATE TABLE `tabla_categoria` (
  `id_categoria` int(11) NOT NULL,
  `nombre_categoria` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `tabla_categoria`
--

INSERT INTO `tabla_categoria` (`id_categoria`, `nombre_categoria`) VALUES
(1, 'Comidas'),
(2, 'Juguetes'),
(3, 'Cuidados');

-- --------------------------------------------------------

--
-- Table structure for table `tabla_estado_legal_adopcion`
--

CREATE TABLE `tabla_estado_legal_adopcion` (
  `id_estado_legal_adopcion` int(11) NOT NULL,
  `nombre_estado_legal_adopcion` varchar(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `tabla_estado_legal_adopcion`
--

INSERT INTO `tabla_estado_legal_adopcion` (`id_estado_legal_adopcion`, `nombre_estado_legal_adopcion`) VALUES
(1, 'Finalizada'),
(2, 'En proceso'),
(3, 'Cancelada');

-- --------------------------------------------------------

--
-- Table structure for table `tabla_estado_legal_mascota`
--

CREATE TABLE `tabla_estado_legal_mascota` (
  `id_estado_legal_mascota` int(11) NOT NULL,
  `nombre_estado_legal_mascota` varchar(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `tabla_estado_legal_mascota`
--

INSERT INTO `tabla_estado_legal_mascota` (`id_estado_legal_mascota`, `nombre_estado_legal_mascota`) VALUES
(1, 'Adoptada'),
(2, 'En proceso de adopción'),
(3, 'Pendiente de adopción');

-- --------------------------------------------------------

--
-- Table structure for table `tabla_estado_salud`
--

CREATE TABLE `tabla_estado_salud` (
  `id_estado_salud` int(11) NOT NULL,
  `nombre_estado_salud` varchar(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `tabla_estado_salud`
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
-- Table structure for table `tabla_genero`
--

CREATE TABLE `tabla_genero` (
  `id_genero` int(11) NOT NULL,
  `nombre_genero` varchar(15) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `tabla_genero`
--

INSERT INTO `tabla_genero` (`id_genero`, `nombre_genero`) VALUES
(1, 'Macho'),
(2, 'Hembra');

-- --------------------------------------------------------

--
-- Table structure for table `tabla_ingreso_bruto_mensual`
--

CREATE TABLE `tabla_ingreso_bruto_mensual` (
  `id_ingreso_bruto_mensual` int(11) NOT NULL,
  `cantidad_ingreso_bruto_mensual` varchar(25) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `tabla_ingreso_bruto_mensual`
--

INSERT INTO `tabla_ingreso_bruto_mensual` (`id_ingreso_bruto_mensual`, `cantidad_ingreso_bruto_mensual`) VALUES
(1, 'Menor a 1.000.000 PYG'),
(2, 'Mayor a 1.000.000 PYG');

-- --------------------------------------------------------

--
-- Table structure for table `tabla_movimientos_productos`
--

CREATE TABLE `tabla_movimientos_productos` (
  `id_movimiento` int(11) NOT NULL,
  `nombre_movimiento` varchar(25) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `tabla_movimientos_productos`
--

INSERT INTO `tabla_movimientos_productos` (`id_movimiento`, `nombre_movimiento`) VALUES
(1, 'Entrada'),
(2, 'Salida');

-- --------------------------------------------------------

--
-- Table structure for table `tabla_rol_usuario`
--

CREATE TABLE `tabla_rol_usuario` (
  `id_rol_usuario` int(11) NOT NULL,
  `nombre_rol_usuario` varchar(25) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `tabla_rol_usuario`
--

INSERT INTO `tabla_rol_usuario` (`id_rol_usuario`, `nombre_rol_usuario`) VALUES
(1, 'Administrador'),
(2, 'Vendedor');

-- --------------------------------------------------------

--
-- Table structure for table `usuarios`
--

CREATE TABLE `usuarios` (
  `id_usuario` int(11) NOT NULL,
  `nombre_usuario` varchar(50) NOT NULL,
  `correo_electronico` varchar(50) NOT NULL,
  `contrasenia` varchar(25) NOT NULL,
  `rol_usuario` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `usuarios`
--

INSERT INTO `usuarios` (`id_usuario`, `nombre_usuario`, `correo_electronico`, `contrasenia`, `rol_usuario`) VALUES
(1, 'jorge.maronna', 'jorge.maronna@eaportal.org', 'jorge.maronna', 1),
(2, 'carlos.cortes', 'carlos.cortes@eaportal.org', 'carlos.cortes', 2),
(3, 'carlos.lopez', 'carlos.lopez@eaportal.org', 'carlos.lopez', 1);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `adopciones`
--
ALTER TABLE `adopciones`
  ADD PRIMARY KEY (`id_adopciones`),
  ADD KEY `id_mascota` (`id_mascota`),
  ADD KEY `id_cliente` (`id_cliente`),
  ADD KEY `estado_legal_adopcion` (`estado_legal_adopcion`);

--
-- Indexes for table `clientes`
--
ALTER TABLE `clientes`
  ADD PRIMARY KEY (`id_cliente`),
  ADD KEY `id_cliente` (`id_cliente`),
  ADD KEY `ingreso_bruto_mensual` (`ingreso_bruto_mensual`);

--
-- Indexes for table `mascotas`
--
ALTER TABLE `mascotas`
  ADD PRIMARY KEY (`id_mascota`),
  ADD KEY `id_mascota` (`id_mascota`),
  ADD KEY `genero` (`genero`),
  ADD KEY `estado_salud` (`estado_salud`),
  ADD KEY `estado_legal_mascota` (`estado_legal_mascota`),
  ADD KEY `id_mascota_2` (`id_mascota`),
  ADD KEY `genero_2` (`genero`),
  ADD KEY `estado_salud_2` (`estado_salud`);

--
-- Indexes for table `movimiento_productos`
--
ALTER TABLE `movimiento_productos`
  ADD PRIMARY KEY (`id`),
  ADD KEY `id_producto` (`id_producto`),
  ADD KEY `id_cliente` (`id_cliente`),
  ADD KEY `tipo_movimiento` (`tipo_movimiento`);

--
-- Indexes for table `productos`
--
ALTER TABLE `productos`
  ADD PRIMARY KEY (`id_producto`),
  ADD KEY `id_producto` (`id_producto`),
  ADD KEY `id_categoria` (`id_categoria`);

--
-- Indexes for table `tabla_categoria`
--
ALTER TABLE `tabla_categoria`
  ADD PRIMARY KEY (`id_categoria`),
  ADD KEY `id_categoria` (`id_categoria`);

--
-- Indexes for table `tabla_estado_legal_adopcion`
--
ALTER TABLE `tabla_estado_legal_adopcion`
  ADD PRIMARY KEY (`id_estado_legal_adopcion`),
  ADD KEY `id_estado_legal_adopcion` (`id_estado_legal_adopcion`);

--
-- Indexes for table `tabla_estado_legal_mascota`
--
ALTER TABLE `tabla_estado_legal_mascota`
  ADD PRIMARY KEY (`id_estado_legal_mascota`),
  ADD KEY `id_estado_legal_mascota` (`id_estado_legal_mascota`);

--
-- Indexes for table `tabla_estado_salud`
--
ALTER TABLE `tabla_estado_salud`
  ADD PRIMARY KEY (`id_estado_salud`),
  ADD KEY `id_estado_salud` (`id_estado_salud`),
  ADD KEY `id_estado_salud_2` (`id_estado_salud`);

--
-- Indexes for table `tabla_genero`
--
ALTER TABLE `tabla_genero`
  ADD PRIMARY KEY (`id_genero`),
  ADD KEY `id_genero` (`id_genero`),
  ADD KEY `id_genero_2` (`id_genero`);

--
-- Indexes for table `tabla_ingreso_bruto_mensual`
--
ALTER TABLE `tabla_ingreso_bruto_mensual`
  ADD PRIMARY KEY (`id_ingreso_bruto_mensual`),
  ADD KEY `id_ingreso_bruto_mensual` (`id_ingreso_bruto_mensual`);

--
-- Indexes for table `tabla_movimientos_productos`
--
ALTER TABLE `tabla_movimientos_productos`
  ADD PRIMARY KEY (`id_movimiento`),
  ADD KEY `id_movimiento` (`id_movimiento`);

--
-- Indexes for table `tabla_rol_usuario`
--
ALTER TABLE `tabla_rol_usuario`
  ADD PRIMARY KEY (`id_rol_usuario`);

--
-- Indexes for table `usuarios`
--
ALTER TABLE `usuarios`
  ADD PRIMARY KEY (`id_usuario`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `adopciones`
--
ALTER TABLE `adopciones`
  MODIFY `id_adopciones` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `clientes`
--
ALTER TABLE `clientes`
  MODIFY `id_cliente` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `mascotas`
--
ALTER TABLE `mascotas`
  MODIFY `id_mascota` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=34;

--
-- AUTO_INCREMENT for table `movimiento_productos`
--
ALTER TABLE `movimiento_productos`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `productos`
--
ALTER TABLE `productos`
  MODIFY `id_producto` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `tabla_categoria`
--
ALTER TABLE `tabla_categoria`
  MODIFY `id_categoria` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `tabla_estado_legal_adopcion`
--
ALTER TABLE `tabla_estado_legal_adopcion`
  MODIFY `id_estado_legal_adopcion` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `tabla_estado_legal_mascota`
--
ALTER TABLE `tabla_estado_legal_mascota`
  MODIFY `id_estado_legal_mascota` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `tabla_estado_salud`
--
ALTER TABLE `tabla_estado_salud`
  MODIFY `id_estado_salud` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `tabla_genero`
--
ALTER TABLE `tabla_genero`
  MODIFY `id_genero` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `tabla_ingreso_bruto_mensual`
--
ALTER TABLE `tabla_ingreso_bruto_mensual`
  MODIFY `id_ingreso_bruto_mensual` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `tabla_movimientos_productos`
--
ALTER TABLE `tabla_movimientos_productos`
  MODIFY `id_movimiento` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `tabla_rol_usuario`
--
ALTER TABLE `tabla_rol_usuario`
  MODIFY `id_rol_usuario` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `usuarios`
--
ALTER TABLE `usuarios`
  MODIFY `id_usuario` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `adopciones`
--
ALTER TABLE `adopciones`
  ADD CONSTRAINT `adopciones_ibfk_1` FOREIGN KEY (`estado_legal_adopcion`) REFERENCES `tabla_estado_legal_adopcion` (`id_estado_legal_adopcion`),
  ADD CONSTRAINT `adopciones_ibfk_2` FOREIGN KEY (`id_mascota`) REFERENCES `mascotas` (`id_mascota`),
  ADD CONSTRAINT `adopciones_ibfk_3` FOREIGN KEY (`id_cliente`) REFERENCES `clientes` (`id_cliente`);

--
-- Constraints for table `mascotas`
--
ALTER TABLE `mascotas`
  ADD CONSTRAINT `mascotas_ibfk_1` FOREIGN KEY (`genero`) REFERENCES `tabla_genero` (`id_genero`),
  ADD CONSTRAINT `mascotas_ibfk_2` FOREIGN KEY (`estado_salud`) REFERENCES `tabla_estado_salud` (`id_estado_salud`),
  ADD CONSTRAINT `mascotas_ibfk_3` FOREIGN KEY (`estado_legal_mascota`) REFERENCES `tabla_estado_legal_mascota` (`id_estado_legal_mascota`);

--
-- Constraints for table `movimiento_productos`
--
ALTER TABLE `movimiento_productos`
  ADD CONSTRAINT `movimiento_productos_ibfk_1` FOREIGN KEY (`tipo_movimiento`) REFERENCES `tabla_movimientos_productos` (`id_movimiento`),
  ADD CONSTRAINT `movimiento_productos_ibfk_2` FOREIGN KEY (`id_cliente`) REFERENCES `clientes` (`id_cliente`),
  ADD CONSTRAINT `movimiento_productos_ibfk_3` FOREIGN KEY (`id_producto`) REFERENCES `productos` (`id_producto`);

--
-- Constraints for table `productos`
--
ALTER TABLE `productos`
  ADD CONSTRAINT `productos_ibfk_1` FOREIGN KEY (`id_categoria`) REFERENCES `tabla_categoria` (`id_categoria`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
