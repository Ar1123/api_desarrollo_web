-- phpMyAdmin SQL Dump
-- version 5.0.2
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 24-08-2021 a las 04:03:48
-- Versión del servidor: 10.4.14-MariaDB
-- Versión de PHP: 7.4.10

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `drinksdb`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `bebida`
--

CREATE TABLE `bebida` (
  `id_bebida` int(11) NOT NULL,
  `cod_categoria` int(11) DEFAULT NULL,
  `cantidad` int(11) DEFAULT NULL,
  `descripcion` text NOT NULL,
  `nombre_bebida` varchar(40) NOT NULL,
  `volumen` int(11) DEFAULT 0,
  `marca` varchar(40) NOT NULL,
  `descuento` int(11) DEFAULT 0,
  `url` text NOT NULL,
  `puntuacion` int(11) DEFAULT 0,
  `grado_acohol` int(11) DEFAULT 0,
  `precio` int(11) NOT NULL DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `bebida`
--

INSERT INTO `bebida` (`id_bebida`, `cod_categoria`, `cantidad`, `descripcion`, `nombre_bebida`, `volumen`, `marca`, `descuento`, `url`, `puntuacion`, `grado_acohol`, `precio`) VALUES
(5, 11, 20, 'Lorem ipsum dolor sit amet consectetur adipisicing elit. Accusamus vel corporis qui perspiciatis doloribus, illo perferendis laboriosam velit quo tenetur voluptas nemo ad nesciunt voluptates provident eius quasi neque placeat.Lorem ipsum dolor sit amet consectetur adipisicing elit. Accusamus vel corporis qui perspiciatis doloribus, illo perferendis laboriosam velit quo tenetur voluptas nemo ad nesciunt voluptates provident eius quasi neque placeat.', 'Hennessy V.S Cognac', 490, 'Hannessy', 0, 'https://products3.imgix.drizly.com/ci-hennessy-vs-cognac-4386a392a6b94b18.jpeg?auto=format%2Ccompress&ch=Width%2CDPR&fm=jpg&q=20', 10, 45, 100),
(7, 11, 85, 'Lorem ipsum dolor sit amet consectetur adipisicing elit. Accusamus vel corporis qui perspiciatis doloribus, illo perferendis laboriosam velit quo tenetur voluptas nemo ad nesciunt voluptates provident eius quasi neque placeat.Lorem ipsum dolor sit amet consectetur adipisicing elit. Accusamus vel corporis qui perspiciatis doloribus, illo perferendis laboriosam velit quo tenetur voluptas nemo ad nesciunt voluptates provident eius quasi neque placeat.', 'Hennessy Black', 500, 'Hennessy', 0, 'https://products3.imgix.drizly.com/ci-hennessy-black-c1449d2b4ec759a3.jpeg?auto=format%2Ccompress&ch=Width%2CDPR&fm=jpg&q=20', 10, 40, 60),
(8, 13, 10, 'Lorem ipsum dolor sit amet consectetur adipisicing elit. Accusamus vel corporis qui perspiciatis doloribus, illo perferendis laboriosam velit quo tenetur voluptas nemo ad nesciunt voluptates provident eius quasi neque placeat.\n\nLorem ipsum dolor sit amet consectetur adipisicing elit. Accusamus vel corporis qui perspiciatis doloribus, illo perferendis laboriosam velit quo tenetur voluptas nemo ad nesciunt voluptates provident eius quasi neque placeat.', 'Camarena Reposado', 500, 'Camarena', 5, 'https://products0.imgix.drizly.com/ci-familia-camarena-reposado-270814a06a872d9d.png?auto=format%2Ccompress&ch=Width%2CDPR&fm=jpg&q=20', 10, 40, 50);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `categoria`
--

CREATE TABLE `categoria` (
  `cod_categoria` int(11) NOT NULL,
  `nombre_categoria` varchar(40) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `categoria`
--

INSERT INTO `categoria` (`cod_categoria`, `nombre_categoria`) VALUES
(7, 'wine'),
(8, 'whisky'),
(9, 'vodka'),
(10, 'ginebra'),
(11, 'cognac'),
(12, 'beer'),
(13, 'tequilla'),
(14, 'alcoholfree');

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `bebida`
--
ALTER TABLE `bebida`
  ADD PRIMARY KEY (`id_bebida`),
  ADD KEY `cod_categoria` (`cod_categoria`);

--
-- Indices de la tabla `categoria`
--
ALTER TABLE `categoria`
  ADD PRIMARY KEY (`cod_categoria`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `bebida`
--
ALTER TABLE `bebida`
  MODIFY `id_bebida` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=25;

--
-- AUTO_INCREMENT de la tabla `categoria`
--
ALTER TABLE `categoria`
  MODIFY `cod_categoria` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- Restricciones para tablas volcadas
--

--
-- Filtros para la tabla `bebida`
--
ALTER TABLE `bebida`
  ADD CONSTRAINT `bebida_ibfk_1` FOREIGN KEY (`cod_categoria`) REFERENCES `categoria` (`cod_categoria`) ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
