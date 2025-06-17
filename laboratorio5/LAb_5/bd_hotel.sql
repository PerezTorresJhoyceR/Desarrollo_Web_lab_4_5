-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 05-06-2025 a las 04:56:06
-- Versión del servidor: 10.4.32-MariaDB
-- Versión de PHP: 8.0.30

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `bd_hotel`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `fotos_habitacion`
--

CREATE TABLE `fotos_habitacion` (
  `id` int(11) NOT NULL,
  `habitacion_id` int(11) DEFAULT NULL,
  `imagen` varchar(250) DEFAULT NULL,
  `descripcion` varchar(250) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `fotos_habitacion`
--

INSERT INTO `fotos_habitacion` (`id`, `habitacion_id`, `imagen`, `descripcion`) VALUES
(1, 1, 'suite_presidencial_1.jpg', 'Vista principal de la suite presidencial'),
(2, 1, 'suite_presidencial_2.jpg', 'Baño de lujo'),
(3, 2, 'suite_ejecutiva_1.jpg', 'Sala de estar'),
(4, 3, 'doble_1.jpg', 'Vista de la habitación doble'),
(5, 4, 'doble_2.jpg', 'Habitación doble con vista al mar'),
(6, 5, 'individual_1.jpg', 'Habitación individual estándar'),
(7, 6, 'familiar_1.jpg', 'Habitación familiar con dos camas'),
(8, 7, 'suite_presidencial_3.jpg', 'Suite presidencial piso 3'),
(9, 8, 'suite_ejecutiva_2.jpg', 'Suite ejecutiva piso 3'),
(10, 9, 'doble_3.jpg', 'Habitación doble piso 3'),
(11, 1, 'suite_presidencial_1.jpg', 'Vista principal de la suite presidencial'),
(12, 1, 'suite_presidencial_2.jpg', 'Baño de lujo'),
(13, 2, 'suite_ejecutiva_1.jpg', 'Sala de estar'),
(14, 3, 'doble_1.jpg', 'Vista de la habitación doble'),
(15, 4, 'doble_2.jpg', 'Habitación doble con vista al mar'),
(16, 5, 'individual_1.jpg', 'Habitación individual estándar'),
(17, 6, 'familiar_1.jpg', 'Habitación familiar con dos camas'),
(18, 7, 'suite_presidencial_3.jpg', 'Suite presidencial piso 3'),
(19, 8, 'suite_ejecutiva_2.jpg', 'Suite ejecutiva piso 3'),
(20, 9, 'doble_3.jpg', 'Habitación doble piso 3');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `habitaciones`
--

CREATE TABLE `habitaciones` (
  `id` int(11) NOT NULL,
  `numero` varchar(10) DEFAULT NULL,
  `piso` int(11) DEFAULT NULL,
  `tipo_id` int(11) DEFAULT NULL,
  `estado` enum('disponible','ocupada') DEFAULT 'disponible'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `habitaciones`
--

INSERT INTO `habitaciones` (`id`, `numero`, `piso`, `tipo_id`, `estado`) VALUES
(1, '101', 1, 1, 'disponible'),
(2, '102', 1, 2, 'disponible'),
(3, '103', 1, 3, 'ocupada'),
(4, '201', 2, 3, 'disponible'),
(5, '202', 2, 4, ''),
(6, '203', 2, 5, 'disponible'),
(7, '301', 3, 1, ''),
(8, '302', 3, 2, 'disponible'),
(9, '303', 3, 3, 'ocupada'),
(10, '101', 1, 1, 'disponible'),
(11, '102', 1, 2, 'disponible'),
(12, '103', 1, 3, 'ocupada'),
(13, '201', 2, 3, 'disponible'),
(14, '202', 2, 4, ''),
(15, '203', 2, 5, 'disponible'),
(16, '301', 3, 1, ''),
(17, '302', 3, 2, 'disponible'),
(18, '303', 3, 3, 'ocupada');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `reservas`
--

CREATE TABLE `reservas` (
  `id` int(11) NOT NULL,
  `usuario_id` int(11) DEFAULT NULL,
  `habitacion_id` int(11) DEFAULT NULL,
  `fecha_inicio` date DEFAULT NULL,
  `fecha_fin` date DEFAULT NULL,
  `estado` enum('pendiente','rechazado','reservado') DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `reservas`
--

INSERT INTO `reservas` (`id`, `usuario_id`, `habitacion_id`, `fecha_inicio`, `fecha_fin`, `estado`) VALUES
(6, 3, 1, '2023-10-15', '2023-10-20', 'reservado'),
(7, 4, 3, '2023-10-16', '2023-10-18', 'reservado'),
(8, 3, 6, '2023-10-25', '2023-10-30', 'pendiente'),
(9, 4, 2, '2023-11-01', '2023-11-05', 'reservado'),
(10, 5, 4, '2023-10-20', '2023-10-25', 'rechazado');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tipos_habitacion`
--

CREATE TABLE `tipos_habitacion` (
  `id` int(11) NOT NULL,
  `nombre` varchar(100) DEFAULT NULL,
  `superficie` float DEFAULT NULL,
  `max_personas` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `tipos_habitacion`
--

INSERT INTO `tipos_habitacion` (`id`, `nombre`, `superficie`, `max_personas`) VALUES
(1, 'Habitación Individual', 15.5, 1),
(2, 'Estandar Doble', 60.5, 4),
(3, 'Suite Presidencial', 45, 2),
(4, 'Suite Ejecutiva', 35, 2),
(5, 'Habitación Doble', 30, 2),
(6, 'Habitación Individual', 25, 1),
(7, 'Habitación Familiar', 40, 4),
(8, 'Suite Presidencial', 45, 2),
(9, 'Suite Ejecutiva', 35, 2),
(10, 'Habitación Doble', 30, 2),
(11, 'Habitación Individual', 25, 1),
(12, 'Habitación Familiar', 40, 4),
(13, 'Habitación Familiar', 0, 0),
(14, 'Habitación Individual', 15, 1),
(15, 'Habitación Doble', 15, 1),
(16, 'Habitación Doble', 0, 0);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `usuarios`
--

CREATE TABLE `usuarios` (
  `id` int(11) NOT NULL,
  `nombre` varchar(100) DEFAULT NULL,
  `correo` varchar(100) DEFAULT NULL,
  `password` varchar(255) DEFAULT NULL,
  `rol` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `usuarios`
--

INSERT INTO `usuarios` (`id`, `nombre`, `correo`, `password`, `rol`) VALUES
(1, 'admin', 'admin@hotel.com', '209d5fae8b2ba427d30650dd0250942af944a0c9', 1),
(2, 'usuario', 'usuario@hotel.com', '7110eda4d09e062aa5e4a390b0a572ac0d2c0220', 2),
(3, 'Admin Principal', 'admin@hotelxxx.com', 'e4abae53cc1cebe5fe89ea93882c699a5e71ab0bbf42a83b7d833975b61c4a41', 1),
(4, 'Recepcionista Ana', 'ana@hotelxxx.com', '9e2d79391442064b1f2442dd9f7aee93768319bba9680dfca699b2ca03a87027', 2),
(5, 'Cliente Juan Pérez', 'juan.perez@example.com', '168c5d1ff929f6074df17cc530d991f9f53b305fb31b4eb151a6efd2ed01c02e', 3),
(6, 'Cliente María Gómez', 'maria.gomez@example.com', '80e05981ef2b673b1d0d1d28557339321910edfe12fa7e31792ab7a9669fdf83', 3),
(7, 'Cliente Inactivo', 'inactivo@example.com', 'bc1319474ee290bf55af9fbb85dda66bd367d26cc0c81becb17425c5b8261577', 3);

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `fotos_habitacion`
--
ALTER TABLE `fotos_habitacion`
  ADD PRIMARY KEY (`id`),
  ADD KEY `habitacion_id` (`habitacion_id`);

--
-- Indices de la tabla `habitaciones`
--
ALTER TABLE `habitaciones`
  ADD PRIMARY KEY (`id`),
  ADD KEY `tipo_id` (`tipo_id`);

--
-- Indices de la tabla `reservas`
--
ALTER TABLE `reservas`
  ADD PRIMARY KEY (`id`),
  ADD KEY `usuario_id` (`usuario_id`),
  ADD KEY `habitacion_id` (`habitacion_id`);

--
-- Indices de la tabla `tipos_habitacion`
--
ALTER TABLE `tipos_habitacion`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `usuarios`
--
ALTER TABLE `usuarios`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `correo` (`correo`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `fotos_habitacion`
--
ALTER TABLE `fotos_habitacion`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=21;

--
-- AUTO_INCREMENT de la tabla `habitaciones`
--
ALTER TABLE `habitaciones`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=19;

--
-- AUTO_INCREMENT de la tabla `reservas`
--
ALTER TABLE `reservas`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT de la tabla `tipos_habitacion`
--
ALTER TABLE `tipos_habitacion`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;

--
-- AUTO_INCREMENT de la tabla `usuarios`
--
ALTER TABLE `usuarios`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- Restricciones para tablas volcadas
--

--
-- Filtros para la tabla `fotos_habitacion`
--
ALTER TABLE `fotos_habitacion`
  ADD CONSTRAINT `fotos_habitacion_ibfk_1` FOREIGN KEY (`habitacion_id`) REFERENCES `habitaciones` (`id`);

--
-- Filtros para la tabla `habitaciones`
--
ALTER TABLE `habitaciones`
  ADD CONSTRAINT `habitaciones_ibfk_1` FOREIGN KEY (`tipo_id`) REFERENCES `tipos_habitacion` (`id`);

--
-- Filtros para la tabla `reservas`
--
ALTER TABLE `reservas`
  ADD CONSTRAINT `reservas_ibfk_1` FOREIGN KEY (`usuario_id`) REFERENCES `usuarios` (`id`),
  ADD CONSTRAINT `reservas_ibfk_2` FOREIGN KEY (`habitacion_id`) REFERENCES `habitaciones` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
