-- phpMyAdmin SQL Dump
-- version 4.8.1
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 27-06-2018 a las 21:21:44
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
-- Estructura de tabla para la tabla `anade`
--

CREATE TABLE `anade` (
  `id_reserva` int(11) DEFAULT NULL,
  `id_producto` int(11) DEFAULT NULL,
  `cantidad` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `cancha`
--

CREATE TABLE `cancha` (
  `id_cancha` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `cancha`
--

INSERT INTO `cancha` (`id_cancha`) VALUES
(1),
(2),
(3),
(4);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `horario`
--

CREATE TABLE `horario` (
  `hora` time NOT NULL,
  `abono_minimo` int(11) DEFAULT NULL,
  `valor` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `horario`
--

INSERT INTO `horario` (`hora`, `abono_minimo`, `valor`) VALUES
('00:17:00', 1000, 20000),
('12:12:00', 5000, 10000);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `producto`
--

CREATE TABLE `producto` (
  `id_producto` int(11) NOT NULL,
  `descripcion` varchar(20) DEFAULT NULL,
  `valor_producto` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `producto`
--

INSERT INTO `producto` (`id_producto`, `descripcion`, `valor_producto`) VALUES
(1, 'Pelota', 1000),
(2, 'Pack 7 petos', 1000);

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
(22, 20000, 18000, '1993-12-12', '2018-06-27', '18623018-3', 2000, '00:17:00', 3);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `user_reservas`
--

CREATE TABLE `user_reservas` (
  `rut` varchar(10) CHARACTER SET utf8 NOT NULL,
  `reserva` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `user_reservas`
--

INSERT INTO `user_reservas` (`rut`, `reserva`) VALUES
('18623018-3', 15),
('18623018-3', 16),
('18623018-3', 17),
('18623018-3', 18),
('18623018-3', 19),
('18623018-3', 20),
('18623018-3', 21),
('18623018-3', 22);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `usuario`
--

CREATE TABLE `usuario` (
  `nombre` varchar(15) NOT NULL,
  `apellido` varchar(15) NOT NULL,
  `correo` varchar(20) NOT NULL,
  `telefono` varchar(15) NOT NULL,
  `rut` varchar(10) NOT NULL,
  `contrasena` varchar(15) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `usuario`
--

INSERT INTO `usuario` (`nombre`, `apellido`, `correo`, `telefono`, `rut`, `contrasena`) VALUES
('', '', '', '', '', ''),
('pedro', 'juan', 'diego@dsa', '123', '123', 'javier'),
('pedro', 'juanito', 'javierjavier@javier.', '', '1233', '123'),
('rodrigo', 'richards', 'rodrigo@gmail.com', '999', '18623018-3', 'rodrigo'),
('javier', 'richards', 'javier@gmail.com', '123', 'kjk', '123');

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `anade`
--
ALTER TABLE `anade`
  ADD KEY `id_reserva` (`id_reserva`),
  ADD KEY `id_producto` (`id_producto`);

--
-- Indices de la tabla `cancha`
--
ALTER TABLE `cancha`
  ADD PRIMARY KEY (`id_cancha`);

--
-- Indices de la tabla `horario`
--
ALTER TABLE `horario`
  ADD PRIMARY KEY (`hora`);

--
-- Indices de la tabla `producto`
--
ALTER TABLE `producto`
  ADD PRIMARY KEY (`id_producto`);

--
-- Indices de la tabla `reserva`
--
ALTER TABLE `reserva`
  ADD PRIMARY KEY (`id_reserva`),
  ADD KEY `rut` (`rut`),
  ADD KEY `cancha` (`cancha`),
  ADD KEY `horario` (`horario`);

--
-- Indices de la tabla `user_reservas`
--
ALTER TABLE `user_reservas`
  ADD KEY `reserva` (`reserva`),
  ADD KEY `rutfk` (`rut`);

--
-- Indices de la tabla `usuario`
--
ALTER TABLE `usuario`
  ADD PRIMARY KEY (`rut`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `reserva`
--
ALTER TABLE `reserva`
  MODIFY `id_reserva` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=23;

--
-- Restricciones para tablas volcadas
--

--
-- Filtros para la tabla `anade`
--
ALTER TABLE `anade`
  ADD CONSTRAINT `anade_ibfk_2` FOREIGN KEY (`id_producto`) REFERENCES `producto` (`id_producto`),
  ADD CONSTRAINT `fk2anade` FOREIGN KEY (`id_reserva`) REFERENCES `reserva` (`id_reserva`);

--
-- Filtros para la tabla `reserva`
--
ALTER TABLE `reserva`
  ADD CONSTRAINT `cancha` FOREIGN KEY (`cancha`) REFERENCES `cancha` (`id_cancha`),
  ADD CONSTRAINT `horario` FOREIGN KEY (`horario`) REFERENCES `horario` (`hora`),
  ADD CONSTRAINT `reserva_ibfk_1` FOREIGN KEY (`rut`) REFERENCES `usuario` (`rut`);

--
-- Filtros para la tabla `user_reservas`
--
ALTER TABLE `user_reservas`
  ADD CONSTRAINT `reserva` FOREIGN KEY (`reserva`) REFERENCES `reserva` (`id_reserva`),
  ADD CONSTRAINT `rutfk` FOREIGN KEY (`rut`) REFERENCES `usuario` (`rut`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
