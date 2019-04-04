-- phpMyAdmin SQL Dump
-- version 4.7.9
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 04-04-2019 a las 16:30:33
-- Versión del servidor: 10.1.31-MariaDB
-- Versión de PHP: 7.2.3

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
  `ip` varchar(30) NOT NULL,
  `nombre` varchar(100) CHARACTER SET latin1 COLLATE latin1_spanish_ci NOT NULL,
  `email` varchar(100) CHARACTER SET latin1 COLLATE latin1_spanish_ci NOT NULL,
  `fecha` datetime NOT NULL,
  `texto` text CHARACTER SET latin1 COLLATE latin1_spanish_ci NOT NULL
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
  `nombre` varchar(100) CHARACTER SET latin1 COLLATE latin1_spanish_ci NOT NULL,
  `fecha` datetime NOT NULL,
  `imagen` varchar(100) CHARACTER SET latin1 COLLATE latin1_spanish_ci NOT NULL,
  `descripcion` text CHARACTER SET latin1 COLLATE latin1_spanish_ci NOT NULL,
  `id` int(11) NOT NULL,
  `piefoto` varchar(100) CHARACTER SET latin1 COLLATE latin1_spanish_ci NOT NULL,
  `fotoPortada` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `eventos`
--

INSERT INTO `eventos` (`nombre`, `fecha`, `imagen`, `descripcion`, `id`, `piefoto`, `fotoPortada`) VALUES
('Fireside Gathering en Granada', '2019-04-04 00:00:00', '', 'Reúnete con más gente para jugar al famoso juego de Hearthstone, donde te lo pasarás genial. Además disfrutarás de deliciosa comida y bebida. Primeras consumiciones gratis, para más información vaya al siguiente link.', 0, 'Imagen banner del juego. Blizzard Entertaintment', '');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `generales`
--

CREATE TABLE `generales` (
  `nombre` varchar(100) CHARACTER SET latin1 COLLATE latin1_spanish_ci NOT NULL,
  `enlace` varchar(100) CHARACTER SET latin1 COLLATE latin1_spanish_ci NOT NULL,
  `id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `generales`
--

INSERT INTO `generales` (`nombre`, `enlace`, `id`) VALUES
('Fireside Gathering en Granada', '', 0);

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
-- Indices de la tabla `generales`
--
ALTER TABLE `generales`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `id` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
