-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1:3306
-- Tiempo de generación: 10-05-2024 a las 18:37:41
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
) ENGINE=MyISAM AUTO_INCREMENT=76 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Volcado de datos para la tabla `log_actividades`
--

INSERT INTO `log_actividades` (`id`, `email`, `actividad`, `fecha`, `hora`, `ip`, `exitoso`) VALUES
(42, 'marco.conde@ucb.edu.bo', 'Crear cuenta', '2024-05-09', '15:31:23', '::1', 1),
(43, 'marco.conde@ucb.edu.bo', 'Crear cuenta', '2024-05-09', '15:31:56', '::1', 1),
(44, 'marco.conde@ucb.edu.bo', 'Crear cuenta', '2024-05-09', '15:32:51', '::1', 1),
(45, 'macvcdls@gmail.com', 'Crear cuenta', '2024-05-09', '15:33:08', '::1', 0),
(46, 'macvcdls@gmail.com', 'Correo contraseña', '2024-05-09', '15:39:38', '::1', 1),
(47, 'macvcdls@gmail.com', 'Correo contraseña', '2024-05-09', '15:40:23', '::1', 1),
(48, 'macvcdls@gmail.com', 'Iniciar sesión', '2024-05-09', '17:29:29', '::1', 0),
(49, 'macvcdls@gmail.com', 'Crear cuenta', '2024-05-09', '17:30:01', '::1', 0),
(50, 'macvcdls@gmail.com', 'Iniciar sesión', '2024-05-09', '17:31:05', '::1', 1),
(51, 'macvcdls@gmail.com', 'Correo contraseña', '2024-05-09', '17:31:39', '::1', 1),
(52, 'macvcdls@gmail.com', 'Restablecer la contraseña', '2024-05-09', '17:32:34', '::1', 1),
(53, 'macvcdls@gmail.com', 'Iniciar sesión', '2024-05-09', '17:32:57', '::1', 1),
(54, 'macvcdls@gmail.com', 'Correo contraseña', '2024-05-09', '17:51:12', '::1', 1),
(55, 'macvcdls@gmail.com', 'Restablecer la contraseña', '2024-05-09', '17:52:18', '::1', 1),
(56, 'macvcdls@gmail.com', 'Iniciar sesión', '2024-05-09', '18:13:34', '::1', 0),
(57, 'macvcdls@gmail.com', 'Correo contraseña', '2024-05-09', '18:13:45', '::1', 1),
(58, 'macvcdls@gmail.com', 'Restablecer la contraseña', '2024-05-09', '18:14:25', '::1', 1),
(59, 'macvcdls@gmail.com', 'Restablecer la contraseña', '2024-05-09', '18:14:25', '::1', 1),
(60, 'macvcdls@gmail.com', 'Iniciar sesión', '2024-05-09', '18:14:42', '::1', 1),
(61, 'marco.conde@ucb.edu.bo', 'Crear cuenta', '2024-05-09', '18:17:01', '::1', 1),
(62, 'marco.conde@ucb.edu.bo', 'Crear cuenta', '2024-05-09', '18:17:32', '::1', 1),
(63, 'marco.conde@ucb.edu.bo', 'Crear cuenta', '2024-05-09', '18:18:18', '::1', 0),
(64, 'macvcdls@gmail.com', 'Iniciar sesión', '2024-05-09', '19:29:33', '::1', 0),
(65, 'macvcdls@gmail.com', 'Crear cuenta', '2024-05-09', '19:29:55', '::1', 1),
(66, 'marco.conde@ucb.edu.bo', 'Crear cuenta', '2024-05-09', '19:31:58', '::1', 1),
(67, 'macvcdls@gmail.com', 'Correo contraseña', '2024-05-09', '19:33:18', '::1', 1),
(68, 'macvcdls@gmail.com', 'Restablecer la contraseña', '2024-05-09', '19:33:53', '::1', 1),
(69, 'macvcdls@gmail.com', 'Iniciar sesión', '2024-05-09', '19:34:04', '::1', 1),
(70, 'slklskdfmsdf@gmail.com', 'Iniciar sesión', '2024-05-09', '19:39:00', '::1', 0),
(71, 'marco@gmail.com', 'Iniciar sesión', '2024-05-09', '19:39:16', '::1', 0),
(72, 'macvcdls@gmail.com', 'Iniciar sesión', '2024-05-09', '19:39:44', '::1', 0),
(73, 'macvcdls@gmail.com', 'Iniciar sesión', '2024-05-09', '19:39:57', '::1', 0),
(74, 'macvcdls@gmail.com', 'Iniciar sesión', '2024-05-09', '19:40:09', '::1', 0),
(75, 'macvcdls@gmail.com', 'Iniciar sesión', '2024-05-09', '19:41:09', '::1', 0);

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
) ENGINE=MyISAM AUTO_INCREMENT=6 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Volcado de datos para la tabla `usuario`
--

INSERT INTO `usuario` (`id`, `ci`, `nombre`, `apellido`, `direccion`, `celular`, `email`, `contrasena`, `activa`, `hash`, `intentos`) VALUES
(5, NULL, '1111', '11111', NULL, NULL, 'marco.conde@ucb.edu.bo', '123456', 0, 'f7f82942e7061cec52cacab151296e97', 0),
(4, NULL, 'marco', 'conde', NULL, NULL, 'macvcdls@gmail.com', '123456', 1, '24718e01d9cec61d9c24d78f261761d5', 0);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
