-- phpMyAdmin SQL Dump
-- version 4.8.1
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 27-06-2018 a las 22:25:07
-- Versión del servidor: 10.1.33-MariaDB
-- Versión de PHP: 7.2.6

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `futbol`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `reserva`
--

CREATE TABLE `reserva` (
  `id_reserva` int(11) NOT NULL,
  `total_a_pagar` int(11) DEFAULT NULL,
  `saldo_pendiente` int(11) DEFAULT NULL,
  `fecha_pago_saldo` date DEFAULT NULL,
  `fecha_abono` date DEFAULT NULL,
  `rut` varchar(10) DEFAULT NULL,
  `abono_pago` int(11) DEFAULT NULL,
  `horario` time NOT NULL,
  `cancha` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `reserva`
--

INSERT INTO `reserva` (`id_reserva`, `total_a_pagar`, `saldo_pendiente`, `fecha_pago_saldo`, `fecha_abono`, `rut`, `abono_pago`, `horario`, `cancha`) VALUES
(12, 0, -100, '0012-12-12', '2018-06-27', '123', 100, '12:12:00', 1),
(13, 0, -100, '1992-12-12', '2018-06-27', '18623018-3', 100, '12:12:00', 4),
(14, 10000, 9900, '1992-12-12', '2018-06-27', '18623018-3', 100, '12:12:00', 1),
(15, 10000, 9900, '1992-12-12', '2018-06-27', '18623018-3', 100, '12:12:00', 1),
(16, 10000, 9900, '1991-12-12', '2018-06-27', '18623018-3', 100, '12:12:00', 1),
(17, 10000, 9679, '0012-12-12', '2018-06-27', '18623018-3', 321, '12:12:00', 1),
(18, 10000, 9000, '0323-02-23', '2018-06-27', '18623018-3', 1000, '12:12:00', 4),
(19, 10000, 9988, '0000-00-00', '2018-06-27', '18623018-3', 12, '12:12:00', 1),
(20, 10000, 8000, '2001-12-12', '2018-06-27', '18623018-3', 2000, '12:12:00', 1),
(21, 10000, 9900, '1994-02-20', '2018-06-27', '18623018-3', 100, '12:12:00', 1),
(22, 20000, 18000, '1993-12-12', '2018-06-27', '18623018-3', 2000, '00:17:00', 3),
(23, 10000, 9000, '2018-06-27', '2018-06-27', '18623018-3', 1000, '12:12:00', 1),
(24, 10000, 9000, '0012-12-12', '2018-06-27', '18623018-3', 1000, '12:12:00', 1),
(25, 10000, 9000, '0012-06-27', '2018-06-27', '18623018-3', 1000, '12:12:00', 1);

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `reserva`
--
ALTER TABLE `reserva`
  ADD PRIMARY KEY (`id_reserva`),
  ADD KEY `rut` (`rut`),
  ADD KEY `cancha` (`cancha`),
  ADD KEY `horario` (`horario`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `reserva`
--
ALTER TABLE `reserva`
  MODIFY `id_reserva` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=26;

--
-- Restricciones para tablas volcadas
--

--
-- Filtros para la tabla `reserva`
--
ALTER TABLE `reserva`
  ADD CONSTRAINT `cancha` FOREIGN KEY (`cancha`) REFERENCES `cancha` (`id_cancha`),
  ADD CONSTRAINT `horario` FOREIGN KEY (`horario`) REFERENCES `horario` (`hora`),
  ADD CONSTRAINT `reserva_ibfk_1` FOREIGN KEY (`rut`) REFERENCES `usuario` (`rut`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
