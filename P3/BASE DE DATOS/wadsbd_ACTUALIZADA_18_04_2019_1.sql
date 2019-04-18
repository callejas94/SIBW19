-- phpMyAdmin SQL Dump
-- version 4.8.5
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 18-04-2019 a las 11:59:56
-- Versión del servidor: 10.1.38-MariaDB
-- Versión de PHP: 7.3.3

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `wadsbd`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `comentario`
--

CREATE TABLE `comentario` (
  `idEvento` int(11) NOT NULL,
  `ip` varchar(30) CHARACTER SET utf8mb4 COLLATE utf8mb4_spanish_ci NOT NULL,
  `nombre` varchar(100) CHARACTER SET utf8mb4 COLLATE utf8mb4_spanish_ci NOT NULL,
  `email` varchar(100) CHARACTER SET utf8mb4 COLLATE utf8mb4_spanish_ci NOT NULL,
  `fecha` datetime NOT NULL,
  `texto` text CHARACTER SET utf8mb4 COLLATE utf8mb4_spanish_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `comentario`
--

INSERT INTO `comentario` (`idEvento`, `ip`, `nombre`, `email`, `fecha`, `texto`) VALUES
(0, '127.0.0.1', 'Pepito Grillo', 'pepitogrillo@mail.com', '2019-04-02 00:00:00', 'Paquete es mi segundo nombre nena'),
(1, '127.0.0.1', 'Pepito Grillo', 'pepitogrillo@mail.com', '2019-04-05 00:00:00', 'O mi otro nombre  quien lo sabe en realidad');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `eventos`
--

CREATE TABLE `eventos` (
  `nombre` varchar(100) CHARACTER SET utf8mb4 COLLATE utf8mb4_spanish_ci NOT NULL,
  `fecha` datetime NOT NULL,
  `imagen` varchar(100) CHARACTER SET utf8mb4 COLLATE utf8mb4_spanish_ci NOT NULL,
  `descripcion` text CHARACTER SET utf8mb4 COLLATE utf8mb4_spanish_ci NOT NULL,
  `id` int(11) NOT NULL,
  `piefoto` varchar(100) CHARACTER SET utf8mb4 COLLATE utf8mb4_spanish_ci NOT NULL,
  `fotoPortada` varchar(100) CHARACTER SET utf8mb4 COLLATE utf8mb4_spanish_ci NOT NULL,
  `link` varchar(100) DEFAULT NULL,
  `etiqueta` varchar(1000) DEFAULT NULL,
  `fecha_publicacion` date DEFAULT NULL,
  `ultima_modificacion` date DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `eventos`
--

INSERT INTO `eventos` (`nombre`, `fecha`, `imagen`, `descripcion`, `id`, `piefoto`, `fotoPortada`, `link`, `etiqueta`, `fecha_publicacion`, `ultima_modificacion`) VALUES
('Fireside Gathering en Granada', '2019-04-04 00:00:00', '/P3/imgs/evento.jpg,/P3/imgs/evento.jpg,/P3/imgs/evento.jpg,/P3/imgs/evento.jpg,/P3/imgs/evento.jpg', 'Reunete con mas gente para jugar al famoso juego de Hearthstone, donde te lo pasaras genial. Ademas disfrutaras de deliciosa comida y bebida. Primeras consumiciones gratis, para mas informacian vaya al siguiente link.', 0, 'Imagen banner del juego. Blizzard Entertaintment', '/P3/imgs/hs.jpg', 'https://firesidegatherings.com/es-es/?lat=37.14374&lng=-3.598988800000029#fireside-gatherings', 'HS,Cartas', '2019-04-04', '2019-04-04'),
('Otro Evento', '2019-04-04 00:00:00', '/P3/imgs/evento.jpg', 'Reunete con mas gente para jugar al famoso juego de Hearthstone, donde te lo pasaras genial. Ademas disfrutaras de deliciosa comida y bebida. Primeras consumiciones gratis, para mas informacian vaya al siguiente link.', 1, 'Imagen banner del juego. Blizzard Entertaintment', '/P3/imgs/hs.jpg', 'https://firesidegatherings.com/es-es/?lat=37.14374&lng=-3.598988800000029#fireside-gatherings', 'Magic,Cartas', '2019-04-04', '2019-04-04');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `menu`
--

CREATE TABLE `menu` (
  `id` int(10) NOT NULL,
  `menu` varchar(50) CHARACTER SET utf8mb4 COLLATE utf8mb4_spanish2_ci NOT NULL,
  `path` varchar(50) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `menu`
--

INSERT INTO `menu` (`id`, `menu`, `path`) VALUES
(1, 'Indice', 'indice'),
(2, 'Menu', 'indice/#menu'),
(3, 'Acerca de', 'indice/#acerca_de');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `prohibidas`
--

CREATE TABLE `prohibidas` (
  `palabra` varchar(30) CHARACTER SET utf8mb4 COLLATE utf8mb4_spanish_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `prohibidas`
--

INSERT INTO `prohibidas` (`palabra`) VALUES
(' tonto '),
(' feo '),
(' caca '),
(' culo '),
(' pedo '),
(' pis ');

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `comentario`
--
ALTER TABLE `comentario`
  ADD PRIMARY KEY (`idEvento`),
  ADD UNIQUE KEY `idEvento` (`idEvento`);

--
-- Indices de la tabla `eventos`
--
ALTER TABLE `eventos`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `id` (`id`);

--
-- Indices de la tabla `menu`
--
ALTER TABLE `menu`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `menu` (`menu`);

--
-- Restricciones para tablas volcadas
--

--
-- Filtros para la tabla `eventos`
--
ALTER TABLE `eventos`
  ADD CONSTRAINT `eventos_ibfk_1` FOREIGN KEY (`id`) REFERENCES `comentario` (`idEvento`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
