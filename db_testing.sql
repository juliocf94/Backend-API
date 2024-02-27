-- phpMyAdmin SQL Dump
-- version 4.6.6deb5ubuntu0.5
-- https://www.phpmyadmin.net/
--
-- Servidor: localhost:3306
-- Tiempo de generación: 27-02-2024 a las 15:58:46
-- Versión del servidor: 5.7.42-0ubuntu0.18.04.1
-- Versión de PHP: 7.4.2

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `db_testing`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `MenuItems`
--

CREATE TABLE `MenuItems` (
  `id` int(11) NOT NULL,
  `item_name` varchar(255) COLLATE utf8_spanish_ci DEFAULT NULL,
  `url` varchar(255) COLLATE utf8_spanish_ci DEFAULT NULL,
  `parent_id` int(11) DEFAULT NULL,
  `is_active` enum('A','I') COLLATE utf8_spanish_ci NOT NULL DEFAULT 'A'
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

--
-- Volcado de datos para la tabla `MenuItems`
--

INSERT INTO `MenuItems` (`id`, `item_name`, `url`, `parent_id`, `is_active`) VALUES
(1, 'Home', NULL, NULL, 'A'),
(2, 'Calendarios', '/calendario', 1, 'A'),
(3, 'Documentos nuevo', NULL, NULL, 'A'),
(4, 'OSS', '/documentos/oss', 3, 'A'),
(5, 'MUI', NULL, 3, 'A'),
(6, 'Index.js', '/documentos/mui/index', 5, 'A'),
(7, 'Configuración', NULL, NULL, 'A'),
(8, 'Usuarios', '/configuracion/usuarios', 7, 'A'),
(9, 'Permisos', '/configuracion/permisos', 7, 'A'),
(10, 'Ajustes', NULL, NULL, 'A'),
(11, 'General', '/ajustes/general', 10, 'A'),
(12, 'Avanzado', NULL, 10, 'A'),
(13, 'Red', '/ajustes/avanzado/red', 12, 'A'),
(14, 'Seguridad', '/ajustes/avanzado/seguridad', 12, 'I'),
(15, 'Sistema', '/ajustes/avanzado/sistema', 12, 'I'),
(16, 'Otros', '/otros', NULL, 'A'),
(17, 'Opción 1', '/otros/opcion-1', 16, 'A'),
(18, 'Opción 2', '/otros/opcion-2', 16, 'A'),
(19, 'Opción 3', '/otros/opcion-3', 16, 'A'),
(21, 'ITEM1', 'URL1', 1, 'I'),
(22, 'ITEM2', 'URL2', 1, 'I'),
(23, 'Cableado', 'https://www.google.com/', 12, 'A'),
(24, 'Servidores', 'www.google.com', 12, 'I'),
(25, 'Opción', 'www.google.com', 12, 'I'),
(26, 'Opción 4', 'www.google.com', 16, 'A');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `Visitors`
--

CREATE TABLE `Visitors` (
  `id` int(11) NOT NULL,
  `dui` varchar(20) COLLATE utf8_spanish_ci NOT NULL,
  `name` varchar(100) COLLATE utf8_spanish_ci NOT NULL,
  `email` varchar(100) COLLATE utf8_spanish_ci DEFAULT NULL,
  `birth_date` date DEFAULT NULL,
  `phone` varchar(20) COLLATE utf8_spanish_ci DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

--
-- Volcado de datos para la tabla `Visitors`
--

INSERT INTO `Visitors` (`id`, `dui`, `name`, `email`, `birth_date`, `phone`) VALUES
(1, '123456789', 'John Doe', 'john@example.com', '1990-01-01', '123-456-7890'),
(2, '33', '33', 'desarrollo@proteccionycontrol.com', '2024-02-26', '333'),
(3, '123456789-0', 'Juan Pérez', 'juan@example.com', '1985-05-15', '12345678'),
(4, '987654321-0', 'María González', 'maria@example.com', '1990-10-25', '87654321'),
(5, '456789123-0', 'Carlos Rodríguez', 'carlos@example.com', '1980-02-28', '45678912'),
(6, '789123456-0', 'Ana Martínez', 'ana@example.com', '1975-09-12', '78912345'),
(7, '654321987-0', 'Pedro Sánchez', 'pedro@example.com', '2000-03-20', '65432198'),
(8, '321654987-0', 'Laura López', 'laura@example.com', '2005-11-08', '32165498'),
(9, '852963741-0', 'David García', 'david@example.com', '1995-07-03', '85296374'),
(10, '147258369-0', 'Sofía Hernández', 'sofia@example.com', '2010-08-18', '14725836'),
(11, '369258147-0', 'Jorge Fernández', 'jorge@example.com', '1988-12-30', '36925814'),
(12, '258369147-0', 'Elena Pérez', 'elena@example.com', '1993-04-05', '25836914'),
(13, '159263748-0', 'Marcela Torres', 'marcela@example.com', '1970-06-22', '15926374'),
(14, '785412369-0', 'Andrés Gómez', 'andres@example.com', '1982-01-10', '78541236'),
(15, '951357486-0', 'Luisa Ramírez', 'luisa@example.com', '2002-09-03', '95135748'),
(16, '236589147-0', 'Roberto Díaz', 'roberto@example.com', '1998-12-15', '23658914'),
(17, '741852963-0', 'Sara Navarro', 'sara@example.com', '1978-04-30', '74185296'),
(18, '3333', 'Julio Flores', 'cesar@gmail.com', '2024-02-27', '74547817'),
(19, '4555', 'Cesar Flores Fuentes', 'cesar@gmail.com', '2024-02-27', '74546767'),
(20, '22223333-1', 'JULIO CESAR FLORES', 'desarrollo@proteccionycontrol.com', '2024-02-27', '22232223'),
(21, '00009999-1', 'JULIO CESAR FLORES', 'gmail@gmail.com', '2009-02-11', '74546767'),
(22, '88888887-6', 'ELIZABETH REYES', 'gmail@gmail.com', '1990-12-11', '44443332');

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `MenuItems`
--
ALTER TABLE `MenuItems`
  ADD PRIMARY KEY (`id`),
  ADD KEY `parent_id` (`parent_id`);

--
-- Indices de la tabla `Visitors`
--
ALTER TABLE `Visitors`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `MenuItems`
--
ALTER TABLE `MenuItems`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=27;
--
-- AUTO_INCREMENT de la tabla `Visitors`
--
ALTER TABLE `Visitors`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=23;
--
-- Restricciones para tablas volcadas
--

--
-- Filtros para la tabla `MenuItems`
--
ALTER TABLE `MenuItems`
  ADD CONSTRAINT `MenuItems_ibfk_1` FOREIGN KEY (`parent_id`) REFERENCES `MenuItems` (`id`);

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
