-- phpMyAdmin SQL Dump
-- version 5.0.2
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 08-10-2020 a las 23:26:41
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
(23, 'Ciencia ficción'),
(24, 'Comedia'),
(25, 'Acción'),
(26, 'Terror'),
(27, 'Drama');

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
(28, 'Star Wars: episodio III - la venganza de los Sith', 'a trama describe una época en la que los Caballeros Jedi se han esparcido por toda la galaxia, dirigiendo un ejército clon masivo para enfrentar a los Separatistas Galácticos, tres años después del in', '2:00', 23, 3, 500),
(29, 'Swiss Army Man', 'Hank (Paul Dano), un náufrago en una isla del Pacífico que está a punto de ahorcarse, ve llegar a la playa un cadáver (Daniel Radcliffe). Intenta reanimarlo, pero el cadáver lo mira sin dejar de solta', '1:40', 24, 5, 500),
(30, ' Baby Driver', 'Baby es un chofer especializado en fugas que, enamorado, pretende dejar la vida criminal y empezar de cero con la mujer que ama. Cuando el jefe de una banda de gánsters le obliga a trabajar para él y ', '2:00', 25, 5, 300),
(31, ' John Wick', 'Reeves interpreta a John Wick, un sicario retirado que busca venganza por la muerte del perro que le dio su esposa recientemente fallecida', '2:00', 25, 5, 300),
(32, 'Predestinación', 'Un agente temporal se embarca en una misión para viajar en el tiempo y prevenir que un elusivo criminal ataque a miles de personas.', '2:00', 23, 5, 400),
(33, 'Ese es mi hijo', 'Durante su adolescencia, Donny tiene un hijo llamado Todd al que cría como padre soltero hasta los 18 años.', '2:00', 24, 1, 100),
(34, 'American History X', 'Tras ser liberado de la cárcel, un antiguo neonazi trata de evitar que su hermano menor siga sus pasos en la senda del odio.', '2:00', 27, 5, 400),
(35, 'El club de la pelea', 'Un empleado de oficina insomne, harto de su vida, se cruza con un vendedor peculiar. Ambos crean un club de lucha clandestino ', '2:00', 27, 5, 300),
(36, 'Annabelle', 'Una preciosa muñeca antigua llamada Annabelle. Una noche, una secta satánica les ataca brutalmente y provocan que un ente maligno se apodere de Annabelle.', '1:40', 26, 2, 300);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `usuarios`
--

CREATE TABLE `usuarios` (
  `id` int(11) NOT NULL,
  `email` varchar(200) NOT NULL,
  `password` varchar(255) NOT NULL,
  `superUser` tinyint(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `usuarios`
--

INSERT INTO `usuarios` (`id`, `email`, `password`, `superUser`) VALUES
(1, 'user1@mail.com', '$2y$10$.MhrrRPigd7YGHPCaT/exuRUkw3wJMfTTvl3r8wBfknTvGxRsDdkm', 1),
(2, 'user2@mail.com', '$2y$10$Cv4xXgWdHtaBlebtcpGKJ.IS1hwCExFzQ75Vtax42yOT4.eRAMtyS', 0),
(3, 'user3@mail.com', '$2y$10$ojOK66VUjk5lA4oxAKJi1e0JIGvrydONCKiV7K/X/irvAOZdgDtLO', 0);

--
-- Índices para tablas volcadas
--

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
-- AUTO_INCREMENT de la tabla `genero`
--
ALTER TABLE `genero`
  MODIFY `id_genero` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=28;

--
-- AUTO_INCREMENT de la tabla `peliculas`
--
ALTER TABLE `peliculas`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=37;

--
-- AUTO_INCREMENT de la tabla `usuarios`
--
ALTER TABLE `usuarios`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- Restricciones para tablas volcadas
--

--
-- Filtros para la tabla `peliculas`
--
ALTER TABLE `peliculas`
  ADD CONSTRAINT `peliculas_ibfk_1` FOREIGN KEY (`id_genero`) REFERENCES `genero` (`id_genero`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
