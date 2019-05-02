-- phpMyAdmin SQL Dump
-- version 4.8.5
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 21-04-2019 a las 20:24:41
-- Versión del servidor: 10.1.38-MariaDB
-- Versión de PHP: 7.3.4

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
  `id` int(11) NOT NULL,
  `idEvento` int(11) NOT NULL,
  `ip` varchar(100) NOT NULL,
  `nombre` varchar(100) DEFAULT NULL,
  `email` varchar(100) NOT NULL,
  `fecha` date NOT NULL,
  `texto` varchar(1000) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `comentario`
--

INSERT INTO `comentario` (`id`, `idEvento`, `ip`, `nombre`, `email`, `fecha`, `texto`) VALUES
(1, 0, '127.0.0.1', 'Pepito Grillo', 'pepitogrillo@gmail.com', '2019-04-19', 'QUe dise compaguer'),
(2, 1, '127.0.0.1', 'Pepito Grillo', 'pepitogrillo@gmail.com', '2019-04-19', 'Otro comentario'),
(8, 0, '127.0.0.1', 'Bueno Vargas', 'guillergood@hotmail.com', '2019-04-21', 'texto'),
(9, 0, '127.0.0.1', 'Alberto Bueno Vargas', 'guillergood@gmail.com', '2019-04-21', 'texto'),
(10, 1, '127.0.0.1', 'Alberto Bueno Vargas', 'guillergood@gmail.com', '2019-04-21', 'texto'),
(11, 0, '127.0.0.1', 'Alberto Bueno Vargas', 'guillergood@gmail.com', '2019-04-21', 'ya era hora'),
(12, 0, '127.0.0.1', 'Alberto Bueno Vargas', 'guillergood@gmail.com', '2019-04-21', 'genial ****'),
(13, 0, '127.0.0.1', 'Alberto Bueno Vargas', 'guillergood@gmail.com', '2019-04-21', 'adsf'),
(14, 0, '127.0.0.1', 'Alberto Bueno Vargas', 'guillergood@gmail.com', '2019-04-21', 'asdf'),
(15, 0, '127.0.0.1', 'Alberto Bueno Vargas', 'guillergood@gmail.com', '2019-04-21', 'funca'),
(16, 0, '127.0.0.1', 'Alberto Bueno Vargas', 'guillergood@gmail.com', '2019-04-21', 'asdf'),
(17, 0, '127.0.0.1', 'Alberto Bueno Vargas', 'guillergood@gmail.com', '2019-04-21', 'jejeje'),
(18, 0, '127.0.0.1', 'Alberto Bueno Vargas', 'guillergood@gmail.com', '2019-04-21', 'funciona'),
(19, 0, '127.0.0.1', 'Alberto Bueno Vargas', 'guillergood@gmail.com', '2019-04-21', 'dafs'),
(20, 0, '127.0.0.1', 'Alberto Bueno Vargas', 'guillergood@gmail.com', '2019-04-21', 'dsaf');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `eventos`
--

CREATE TABLE `eventos` (
  `nombre` varchar(100) NOT NULL,
  `fecha` datetime DEFAULT NULL,
  `imagen` varchar(100) NOT NULL,
  `descripcion` varchar(1000) NOT NULL,
  `id` int(11) NOT NULL,
  `piefoto` varchar(100) DEFAULT NULL,
  `fotoPortada` varchar(100) DEFAULT NULL,
  `link` varchar(100) DEFAULT NULL,
  `etiqueta` varchar(100) DEFAULT NULL,
  `fecha_publicacion` datetime DEFAULT NULL,
  `ultima_modificacion` datetime DEFAULT NULL,
  `video` varchar(1000) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `eventos`
--

INSERT INTO `eventos` (`nombre`, `fecha`, `imagen`, `descripcion`, `id`, `piefoto`, `fotoPortada`, `link`, `etiqueta`, `fecha_publicacion`, `ultima_modificacion`, `video`) VALUES
('Fireside Gathering en Granada', '2019-04-19 00:00:00', '/P3/imgs/evento.jpg', 'Reunete con mas gente para jugar al famoso juego; para mas informacion pincha en el link', 0, 'Imagen banner del juego. Blizzard Entertainment', '/P3/imgs/hs.jpg', 'google.com', 'HS,Cartas', '2019-04-19 00:00:00', '2019-04-19 00:00:00', 'https://www.youtube.com/embed/QdXl3QtutQI'),
('Fireside Gathering en Granada', '2019-04-19 00:00:00', '/P3/imgs/evento.jpg,/P3/imgs/evento.jpg,/P3/imgs/evento.jpg', 'Reunete con mas gente para jugar al famoso juego; para mas informacion pincha en el link', 1, 'Imagen banner del juego. Blizzard Entertainment', '/P3/imgs/hs.jpg', 'google.com', 'HS,Cartas', '2019-04-19 00:00:00', '2019-04-19 00:00:00', 'https://www.youtube.com/embed/QdXl3QtutQI'),
('Otro Evento', '2019-04-19 00:00:00', '/P3/imgs/evento.jpg', 'Reunete con mas gente para jugar al famoso juego; para mas informacion pincha en el link', 2, 'Imagen banner del juego. Blizzard Entertainment', '/P3/imgs/hs.jpg', 'google.com', 'HS,Cartas', '2019-04-19 00:00:00', '2019-04-19 00:00:00', '');

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
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `eventos`
--
ALTER TABLE `eventos`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `menu`
--
ALTER TABLE `menu`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `menu` (`menu`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `comentario`
--
ALTER TABLE `comentario`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=21;

--
-- AUTO_INCREMENT de la tabla `eventos`
--
ALTER TABLE `eventos`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
