-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 05-02-2022 a las 22:08:49
-- Versión del servidor: 10.4.22-MariaDB
-- Versión de PHP: 8.1.2

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `tidsm51_bd2`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `animal`
--

CREATE TABLE `animal` (
  `pk_animal` int(11) NOT NULL,
  `especie` varchar(40) COLLATE utf8_unicode_ci NOT NULL,
  `sexo` varchar(20) COLLATE utf8_unicode_ci NOT NULL,
  `nacimiento` date NOT NULL,
  `pais_origen` varchar(30) COLLATE utf8_unicode_ci NOT NULL,
  `continente` varchar(20) COLLATE utf8_unicode_ci DEFAULT NULL,
  `fk_zoologico` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Volcado de datos para la tabla `animal`
--

INSERT INTO `animal` (`pk_animal`, `especie`, `sexo`, `nacimiento`, `pais_origen`, `continente`, `fk_zoologico`) VALUES
(2, 'Canino', 'Macho', '2021-10-05', 'España', 'Europa', 1),
(3, 'Porcino', 'Hembra', '2021-03-10', 'Estados Unidos', 'Norteamerica', 3),
(4, 'Gato', 'Hembra', '2020-09-03', 'México', 'Sudamerica', 2);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `especie`
--

CREATE TABLE `especie` (
  `pk_especie` int(11) NOT NULL,
  `nombre_vulgar` varchar(30) COLLATE utf8_unicode_ci NOT NULL,
  `nombre_cientifico` varchar(40) COLLATE utf8_unicode_ci NOT NULL,
  `familia` varchar(20) COLLATE utf8_unicode_ci NOT NULL,
  `peligro_extincion` varchar(10) COLLATE utf8_unicode_ci DEFAULT NULL,
  `fk_animal` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Volcado de datos para la tabla `especie`
--

INSERT INTO `especie` (`pk_especie`, `nombre_vulgar`, `nombre_cientifico`, `familia`, `peligro_extincion`, `fk_animal`) VALUES
(1, 'Gato', 'Felino', 'Felidae', 'No', 4),
(2, 'Javalie', 'Porcino', 'Porcin', 'Si', 3),
(3, 'Coyote', 'Canino', 'Canin', 'No', 2);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `zoologico`
--

CREATE TABLE `zoologico` (
  `pk_zoologico` int(11) NOT NULL,
  `nombre` varchar(40) COLLATE utf8_unicode_ci NOT NULL,
  `ciudad` varchar(35) COLLATE utf8_unicode_ci NOT NULL,
  `pais` varchar(30) COLLATE utf8_unicode_ci NOT NULL,
  `tamanio_metros_cuadrados` int(11) NOT NULL,
  `presupuesto_anual` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Volcado de datos para la tabla `zoologico`
--

INSERT INTO `zoologico` (`pk_zoologico`, `nombre`, `ciudad`, `pais`, `tamanio_metros_cuadrados`, `presupuesto_anual`) VALUES
(1, 'Guadalazoo', 'México', 'Guadalajara', 350, 800000),
(2, 'Tepiczoo', 'México', 'Nayarit', 1000, 300000),
(3, 'Yucazoo', 'México', 'Yucatan', 900, 120000);

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `animal`
--
ALTER TABLE `animal`
  ADD PRIMARY KEY (`pk_animal`),
  ADD KEY `fk_zoologico` (`fk_zoologico`);

--
-- Indices de la tabla `especie`
--
ALTER TABLE `especie`
  ADD PRIMARY KEY (`pk_especie`),
  ADD KEY `fk_animal` (`fk_animal`);

--
-- Indices de la tabla `zoologico`
--
ALTER TABLE `zoologico`
  ADD PRIMARY KEY (`pk_zoologico`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `animal`
--
ALTER TABLE `animal`
  MODIFY `pk_animal` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT de la tabla `especie`
--
ALTER TABLE `especie`
  MODIFY `pk_especie` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT de la tabla `zoologico`
--
ALTER TABLE `zoologico`
  MODIFY `pk_zoologico` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- Restricciones para tablas volcadas
--

--
-- Filtros para la tabla `animal`
--
ALTER TABLE `animal`
  ADD CONSTRAINT `animal_ibfk_1` FOREIGN KEY (`fk_zoologico`) REFERENCES `zoologico` (`pk_zoologico`);

--
-- Filtros para la tabla `especie`
--
ALTER TABLE `especie`
  ADD CONSTRAINT `especie_ibfk_1` FOREIGN KEY (`fk_animal`) REFERENCES `animal` (`pk_animal`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
