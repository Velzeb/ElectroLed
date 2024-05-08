-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1:3306
-- Tiempo de generación: 07-05-2024 a las 20:14:29
-- Versión del servidor: 8.2.0
-- Versión de PHP: 8.2.13

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `electroled`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `log_actividades`
--

DROP TABLE IF EXISTS `log_actividades`;
CREATE TABLE IF NOT EXISTS `log_actividades` (
  `id` int NOT NULL AUTO_INCREMENT,
  `email` varchar(30) NOT NULL,
  `actividad` varchar(30) NOT NULL,
  `fecha` date NOT NULL,
  `hora` time NOT NULL,
  `ip` varchar(30) NOT NULL,
  `exitoso` tinyint(1) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=20 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Volcado de datos para la tabla `log_actividades`
--

INSERT INTO `log_actividades` (`id`, `email`, `actividad`, `fecha`, `hora`, `ip`, `exitoso`) VALUES
(1, 'asd@gmail.com', 'Inicio de sesion', '2024-05-07', '02:26:25', '::1', 0),
(2, 'asd2@gmail.com', 'Inicio de sesion', '2024-05-07', '02:28:40', '::1', 0),
(3, 'macvcdls@gmail.com', 'Inicio de sesion', '2024-05-07', '02:45:29', '::1', 0),
(4, 'macvcdls@gmail.com', 'Inicio de sesion', '2024-05-07', '02:46:13', '::1', 0),
(5, 'macvcdls@gmail.com', 'Inicio de sesion', '2024-05-07', '02:46:17', '::1', 0),
(6, 'macvcdls@gmail.com', 'Inicio de sesion', '2024-05-07', '02:46:24', '::1', 0),
(7, 'macvcdls@gmail.com', 'Inicio de sesion', '2024-05-07', '02:46:39', '::1', 0),
(8, 'macvcdls@gmail.com', 'Inicio de sesion', '2024-05-07', '02:46:45', '::1', 0),
(9, 'macvcdls@gmail.com', 'Inicio de sesion', '2024-05-07', '02:47:41', '::1', 0),
(10, 'macvcdls@gmail.com', 'Inicio de sesion', '2024-05-07', '02:47:50', '::1', 0),
(11, 'macvcdls@gmail.com', 'Inicio de sesion', '2024-05-07', '02:48:00', '::1', 0),
(12, 'macvcdls@gmail.com', 'Inicio de sesion', '2024-05-07', '02:48:23', '::1', 0),
(13, 'macvcdls@gmail.com', 'Inicio de sesion', '2024-05-07', '02:49:13', '::1', 0),
(14, 'macvcdls@gmail.com', 'Inicio de sesion', '2024-05-07', '02:49:54', '::1', 0),
(15, 'macvcdls@gmail.com', 'Inicio de sesion', '2024-05-07', '02:50:18', '::1', 0),
(16, 'macvcdls@gmail.com', 'Inicio de sesion', '2024-05-07', '02:52:25', '::1', 1),
(17, 'macvcdls@gmail.com', 'Inicio de sesion', '2024-05-07', '02:52:58', '::1', 0),
(18, 'macvcdls@gmail.com', 'Inicio de sesion', '2024-05-07', '02:54:36', '::1', 0),
(19, 'macvcdls@gmail.com', 'Inicio de sesion', '2024-05-07', '19:55:45', '::1', 1);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `usuario`
--

DROP TABLE IF EXISTS `usuario`;
CREATE TABLE IF NOT EXISTS `usuario` (
  `id` int NOT NULL AUTO_INCREMENT,
  `ci` int DEFAULT NULL,
  `nombre` varchar(30) DEFAULT NULL,
  `apellido` varchar(30) DEFAULT NULL,
  `direccion` varchar(30) DEFAULT NULL,
  `celular` varchar(30) DEFAULT NULL,
  `email` varchar(100) DEFAULT NULL,
  `contrasena` varchar(100) DEFAULT NULL,
  `activa` tinyint(1) DEFAULT NULL,
  `hash` varchar(100) DEFAULT NULL,
  `intentos` int DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=2 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Volcado de datos para la tabla `usuario`
--

INSERT INTO `usuario` (`id`, `ci`, `nombre`, `apellido`, `direccion`, `celular`, `email`, `contrasena`, `activa`, `hash`, `intentos`) VALUES
(1, NULL, 'marco', 'conde', NULL, NULL, 'macvcdls@gmail.com', '123456789', 1, '2d3f767ed9ca1d896090abe71b60ca05', 0);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
