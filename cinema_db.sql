-- phpMyAdmin SQL Dump
-- version 5.0.2
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 25-11-2020 a las 13:24:27
-- Versión del servidor: 10.4.13-MariaDB
-- Versión de PHP: 7.2.31

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `cinema_db`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `comentarios`
--

CREATE TABLE `comentarios` (
  `id` int(11) NOT NULL,
  `id_pelicula` int(11) NOT NULL,
  `id_usuario` int(11) NOT NULL,
  `puntaje` int(1) NOT NULL,
  `comentario` varchar(200) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `comentarios`
--

INSERT INTO `comentarios` (`id`, `id_pelicula`, `id_usuario`, `puntaje`, `comentario`) VALUES
(2, 29, 4, 4, 'Tremenda pelicula soy Angi, saludos. xd'),
(3, 36, 1, 2, 'Pelicula de terror chota, no se muere nadie'),
(6, 29, 1, 3, 'comentario desde js'),
(7, 29, 5, 2, 'Nuevo comentario desde js'),
(8, 29, 5, 3, 'tercer intento'),
(9, 36, 5, 1, 'Alta pelicula de miarda');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `genero`
--

CREATE TABLE `genero` (
  `id_genero` int(11) NOT NULL,
  `nombre` varchar(200) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `genero`
--

INSERT INTO `genero` (`id_genero`, `nombre`) VALUES
(24, 'Comedia'),
(26, 'Terror'),
(28, 'Drama'),
(29, 'Ciencia ficción');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `peliculas`
--

CREATE TABLE `peliculas` (
  `id` int(11) NOT NULL,
  `titulo` varchar(200) NOT NULL,
  `sinopsis` varchar(200) NOT NULL,
  `duracion` varchar(10) NOT NULL,
  `id_genero` int(11) NOT NULL,
  `puntuacion` int(11) NOT NULL,
  `precio` float NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `peliculas`
--

INSERT INTO `peliculas` (`id`, `titulo`, `sinopsis`, `duracion`, `id_genero`, `puntuacion`, `precio`) VALUES
(29, 'Swiss Army Man', 'Hank (Paul Dano), un náufrago en una isla del Pacífico que está a punto de ahorcarse, ve llegar a la playa un cadáver (Daniel Radcliffe). Intenta reanimarlo, pero el cadáver lo mira sin dejar de solta', '1:40', 24, 5, 500),
(36, 'Annabelle', 'Una preciosa muñeca antigua llamada Annabelle. Una noche, una secta satánica les ataca brutalmente y provocan que un ente maligno se apodere de Annabelle.', '1:40', 26, 2, 300);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `usuarios`
--

CREATE TABLE `usuarios` (
  `id` int(11) NOT NULL,
  `userName` varchar(200) NOT NULL,
  `email` varchar(200) NOT NULL,
  `password` varchar(255) NOT NULL,
  `superUser` tinyint(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `usuarios`
--

INSERT INTO `usuarios` (`id`, `userName`, `email`, `password`, `superUser`) VALUES
(1, 'User1', 'user1@mail.com', '$2y$10$.MhrrRPigd7YGHPCaT/exuRUkw3wJMfTTvl3r8wBfknTvGxRsDdkm', 1),
(2, 'User2', 'user2@mail.com', '$2y$10$Cv4xXgWdHtaBlebtcpGKJ.IS1hwCExFzQ75Vtax42yOT4.eRAMtyS', 0),
(3, 'User3', 'user3@mail.com', '$2y$10$ojOK66VUjk5lA4oxAKJi1e0JIGvrydONCKiV7K/X/irvAOZdgDtLO', 1),
(4, 'Angi', 'angi@mail.com', '$2y$10$RlVOLr7UyhWQiRY/QiutveT2kk5Tz9U5pYaDSM.emVM4nWroQx.Hm', 0),
(5, 'Nico', 'nico@mail.com', '$2y$10$xz6oOS5yQbZqhjmdS8kFruEQR0hR8MHLaZOjTWGwesPkbPVL4wza2', 1),
(7, 'User5', 'user5@mail.com', '$2y$10$sziISyAncVmjDjbSNo8/dut7Nhi7ySikZ8G1Sp5I4E6X8kuvt7lpa', 0);

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `comentarios`
--
ALTER TABLE `comentarios`
  ADD PRIMARY KEY (`id`),
  ADD KEY `id_pelicula` (`id_pelicula`),
  ADD KEY `id_usuario` (`id_usuario`);

--
-- Indices de la tabla `genero`
--
ALTER TABLE `genero`
  ADD PRIMARY KEY (`id_genero`);

--
-- Indices de la tabla `peliculas`
--
ALTER TABLE `peliculas`
  ADD PRIMARY KEY (`id`),
  ADD KEY `id_genero` (`id_genero`);

--
-- Indices de la tabla `usuarios`
--
ALTER TABLE `usuarios`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `comentarios`
--
ALTER TABLE `comentarios`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT de la tabla `genero`
--
ALTER TABLE `genero`
  MODIFY `id_genero` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=32;

--
-- AUTO_INCREMENT de la tabla `peliculas`
--
ALTER TABLE `peliculas`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=39;

--
-- AUTO_INCREMENT de la tabla `usuarios`
--
ALTER TABLE `usuarios`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- Restricciones para tablas volcadas
--

--
-- Filtros para la tabla `comentarios`
--
ALTER TABLE `comentarios`
  ADD CONSTRAINT `comentarios_ibfk_1` FOREIGN KEY (`id_pelicula`) REFERENCES `peliculas` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `comentarios_ibfk_2` FOREIGN KEY (`id_usuario`) REFERENCES `usuarios` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Filtros para la tabla `peliculas`
--
ALTER TABLE `peliculas`
  ADD CONSTRAINT `peliculas_ibfk_1` FOREIGN KEY (`id_genero`) REFERENCES `genero` (`id_genero`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
