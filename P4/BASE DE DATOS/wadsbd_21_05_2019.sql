-- phpMyAdmin SQL Dump
-- version 4.8.5
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 21-05-2019 a las 13:06:38
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
(25, 2, '127.0.0.1', 'Bueno Vargas', 'guillergood@hotmail.com', '2019-04-23', 'todo bien entonces'),
(26, 1, '127.0.0.1', 'Bueno Vargas', 'guillergood@hotmail.com', '2019-04-23', 'asdfgg'),
(27, 0, '127.0.0.1', 'Bueno Vargas', 'guillergood@hotmail.com', '2019-04-23', 'sdaf'),
(28, 2, '127.0.0.1', 'Bueno Vargas', 'guillergood@hotmail.com', '2019-04-25', 'dsfsaf');

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
('Fireside Gathering en Granada', '2019-04-19 00:00:00', '/P3/imgs/evento.jpg', 'Reunete con mas gente para jugar al famoso juego de Hearthstone, donde te lo pasaras genial. Ademas disfrutaras de deliciosa comida y bebida. Primeras consumiciones gratis, para mas informacion vaya al siguiente link', 0, 'Imagen banner del juego. Blizzard Entertainment', '/P3/imgs/hs.jpg', 'https://firesidegatherings.com/es-es/?lat=37.14374&lng=-3.598988800000029#fireside-gatherings', 'HS,Cartas', '2019-04-19 00:00:00', '2019-04-19 00:00:00', 'https://www.youtube.com/embed/QdXl3QtutQI'),
('Fireside Gathering en Granada', '2019-04-19 00:00:00', '/P3/imgs/evento.jpg,/P3/imgs/evento.jpg,/P3/imgs/evento.jpg', 'Reunete con mas gente para jugar al famoso juego de Hearthstone, donde te lo pasaras genial. Ademas disfrutaras de deliciosa comida y bebida. Primeras consumiciones gratis, para mas informacion vaya al siguiente link', 1, 'Imagen banner del juego. Blizzard Entertainment', '/P3/imgs/hs.jpg', 'https://firesidegatherings.com/es-es/?lat=37.14374&lng=-3.598988800000029#fireside-gatherings', 'HS,Cartas', '2019-04-19 00:00:00', '2019-04-19 00:00:00', 'https://www.youtube.com/embed/QdXl3QtutQI'),
('Otro Evento', '2019-04-19 00:00:00', '/P3/imgs/evento.jpg', 'Reunete con mas gente para jugar al famoso juego de Hearthstone, donde te lo pasaras genial. Ademas disfrutaras de deliciosa comida y bebida. Primeras consumiciones gratis, para mas informacion vaya al siguiente link', 2, 'Imagen banner del juego. Blizzard Entertainment', '/P3/imgs/hs.jpg', 'https://firesidegatherings.com/es-es/?lat=37.14374&lng=-3.598988800000029#fireside-gatherings', 'HS,Cartas', '2019-04-19 00:00:00', '2019-04-23 00:00:00', '');

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
(2, 'Noticias', 'noticias'),
(3, 'Acerca de', 'about'),
(4, 'Login', 'loginScreen'),
(5, 'Busqueda', NULL);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `paginas`
--

CREATE TABLE `paginas` (
  `id` int(11) NOT NULL,
  `pagina` varchar(10000) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `paginas`
--

INSERT INTO `paginas` (`id`, `pagina`) VALUES
(1, '<main class=\"about\">\r\n	<h2>Acerca de nosotros</h2>\r\n  	<h3>Somos dos estudiantes de la ETSIIT de la UGR en Granada, haciendo la 3a practica de la asignatura SIBW</h3>\r\n</main>'),
(2, '<main class=\"noticias\">\r\n	<h2>Noticias</h2>\r\n  	<h3>\r\n  		<p>La taberna se ha puesto sus mejores galas del Jardin Noble y los heroes de Hearthstone rebosan festiva alegria. Pero no estamos ante una fiesta primaveral corriente: la Liga del MAL esta en la ciudad, lo que significa que el mas retorcido de los manitas, el Dr. Bum, se ha ocupado de sabotear los festejos de este mes.</p>\r\n\r\n	\r\n		<p>Las festividades de El Jardin Innoble duraran del 17 al 21 de abril.</p>\r\n	</h3>\r\n</main>');

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

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `usuarios`
--

CREATE TABLE `usuarios` (
  `username` varchar(100) NOT NULL,
  `nombre` varchar(100) NOT NULL,
  `email` varchar(100) NOT NULL,
  `password` varchar(100) NOT NULL,
  `permisos` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `usuarios`
--

INSERT INTO `usuarios` (`username`, `nombre`, `email`, `password`, `permisos`) VALUES
('guillergood', 'asssssssf', 'guillergood@gmail.com', '$2y$10$sHnRCK8WahqTn2cOat.DQeFi5.1adB43N/tYX8nev2aZBAR4R9sAq', 1),
('pepitogrilloGestor', 'pepeGestor', 'pepitogrillogestor@gmail.com', '$2y$10$sHnRCK8WahqTn2cOat.DQeFi5.1adB43N/tYX8nev2aZBAR4R9sAq', 1),
('pepitogrilloModerador', 'pepeModerador', 'pepitogrilloModerador@gmail.com', '$2y$10$sHnRCK8WahqTn2cOat.DQeFi5.1adB43N/tYX8nev2aZBAR4R9sAq', 2),
('pepitogrilloRegistrado', 'pepeRegistrado', 'pepitogrilloRegistrado@gmail.com', '$2y$10$sHnRCK8WahqTn2cOat.DQeFi5.1adB43N/tYX8nev2aZBAR4R9sAq', 3),
('pepitogrilloSuper', 'pepe', 'pepitogrillo@gmail.com', '$2y$10$sHnRCK8WahqTn2cOat.DQeFi5.1adB43N/tYX8nev2aZBAR4R9sAq', 0);

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
-- Indices de la tabla `paginas`
--
ALTER TABLE `paginas`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `usuarios`
--
ALTER TABLE `usuarios`
  ADD PRIMARY KEY (`username`),
  ADD UNIQUE KEY `nickname` (`username`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `comentario`
--
ALTER TABLE `comentario`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=29;

--
-- AUTO_INCREMENT de la tabla `eventos`
--
ALTER TABLE `eventos`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT de la tabla `paginas`
--
ALTER TABLE `paginas`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
