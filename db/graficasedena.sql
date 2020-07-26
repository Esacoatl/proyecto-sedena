-- phpMyAdmin SQL Dump
-- version 4.8.0
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 12-07-2020 a las 06:48:11
-- Versión del servidor: 10.1.31-MariaDB
-- Versión de PHP: 5.6.35

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `graficasedena`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `ejemplodemo`
--

CREATE TABLE `ejemplodemo` (
  `valor1` varchar(20) NOT NULL,
  `valor2` int(11) NOT NULL,
  `valor3` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `ejemplodemo`
--

INSERT INTO `ejemplodemo` (`valor1`, `valor2`, `valor3`) VALUES
('1', 33, 40),
('2', 117, 100),
('3', 166, 210),
('4', 117, 66),
('5', 66, 21),
('6', 33, 40),
('7', 117, 96),
('8', 150, 190);

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `ejemplodemo`
--
ALTER TABLE `ejemplodemo`
  ADD PRIMARY KEY (`valor1`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
