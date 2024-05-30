-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 30-05-2024 a las 23:03:46
-- Versión del servidor: 10.4.32-MariaDB
-- Versión de PHP: 8.2.12

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
-- Estructura de tabla para la tabla `caracteristica`
--

CREATE TABLE `caracteristica` (
  `id` int(11) NOT NULL,
  `nombre` varchar(30) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `caracteristica`
--

INSERT INTO `caracteristica` (`id`, `nombre`) VALUES
(1, 'Característica A'),
(2, 'Característica B'),
(3, 'Característica C');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `caracteristica_producto`
--

CREATE TABLE `caracteristica_producto` (
  `valor` int(11) DEFAULT NULL,
  `producto_id` int(11) NOT NULL,
  `caracteristica_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `caracteristica_producto`
--

INSERT INTO `caracteristica_producto` (`valor`, `producto_id`, `caracteristica_id`) VALUES
(1, 1, 1),
(2, 2, 2),
(3, 3, 3);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `carrito`
--

CREATE TABLE `carrito` (
  `id` int(11) NOT NULL,
  `cantidad` int(11) DEFAULT NULL,
  `producto_id` int(11) DEFAULT NULL,
  `usuario_id` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `categoria`
--

CREATE TABLE `categoria` (
  `id` int(11) NOT NULL,
  `nombre` varchar(30) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `categoria`
--

INSERT INTO `categoria` (`id`, `nombre`) VALUES
(1, 'Electrónica'),
(2, 'Ropa'),
(3, 'Hogar'),
(4, 'Libros'),
(5, 'Juguetes'),
(6, 'Categoría A'),
(7, 'Categoría B'),
(8, 'Categoría C');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `compra`
--

CREATE TABLE `compra` (
  `id` int(11) NOT NULL,
  `fecha` date DEFAULT NULL,
  `total` float DEFAULT NULL,
  `proveedor_id` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `compra`
--

INSERT INTO `compra` (`id`, `fecha`, `total`, `proveedor_id`) VALUES
(1, '2024-05-17', 250, 3),
(2, '2024-05-20', 105, 1),
(3, '2024-05-21', 400, 2),
(4, '2024-05-22', 922.5, 3),
(5, '2024-05-23', 0, 1),
(6, '2024-05-10', 0, 2),
(7, '2024-05-02', 0, 2),
(8, '2024-05-02', 0, 2),
(9, '2024-05-02', 3, 2),
(10, '2024-05-01', 7, 2),
(11, '2024-05-11', 141, 2),
(12, '2024-05-11', 141, 2),
(13, '2024-05-11', 141, 2),
(14, '2024-05-11', 141, 2),
(15, '2024-05-11', 141, 2),
(16, '2024-05-11', 141, 2),
(17, '2024-05-11', 141, 2),
(18, '2024-05-11', 141, 2),
(19, '2024-05-11', 141, 2),
(20, '2024-05-11', 141, 2),
(21, '2024-05-11', 141, 2),
(22, '2024-05-11', 141, 2),
(23, '2024-05-11', 141, 2),
(24, '2024-05-11', 141, 2),
(25, '2024-05-11', 141, 2),
(26, '2024-05-11', 141, 2),
(27, '2024-05-11', 141, 2),
(28, '2024-05-11', 141, 2),
(29, '2024-05-11', 141, 2),
(30, '2024-05-11', 141, 2),
(31, '2024-05-10', 111, 2),
(32, '2024-06-01', 555, 7),
(33, '2024-02-01', 9, 7),
(34, '2024-02-01', 9, 7),
(35, '2024-02-01', 9, 7),
(36, '2024-02-01', 9, 7),
(37, '2024-05-31', 22, 7),
(38, '2024-05-31', 22, 7),
(39, '2024-05-31', 22, 7),
(40, '2024-05-31', 22, 7),
(41, '2024-05-31', 22, 7),
(42, '2024-05-31', 22, 7),
(43, '2024-05-31', 22, 7),
(44, '2024-05-31', 33, 7),
(45, '2024-05-09', 3, 7),
(46, '2024-05-08', 1, 7),
(47, '2024-05-08', 1, 7),
(48, '2024-05-08', 1, 7),
(49, '2024-05-08', 1, 7),
(50, '2024-05-08', 1, 7),
(51, '2024-05-08', 1, 7),
(52, '2024-05-10', 1, 7),
(53, '2024-05-11', 12, 7),
(54, '2024-05-02', 55, 7),
(55, '2024-05-09', 2000, 7),
(56, '2024-05-02', 3, 7),
(57, '2024-05-17', 2, 1),
(58, '2024-05-01', 2, 1),
(59, '2024-05-02', 12, 1),
(60, '2024-05-08', 44, 1),
(61, '2024-05-04', 6, 1),
(62, '2024-05-03', 2, 1),
(63, '2024-05-01', 6, 1),
(64, '2024-05-05', 2, 1),
(65, '2024-05-05', 2, 1),
(66, '2024-05-05', 2, 1),
(67, '2024-05-16', 44, 1),
(68, '2024-05-17', 6, 1),
(69, '2024-05-10', 2, 1),
(70, '2024-05-11', 77, 1),
(71, '2024-05-01', 22, 1),
(72, '2024-05-09', 7, 1),
(73, '2024-05-03', 13, 1),
(74, '2024-05-09', 131, 1),
(75, '2024-05-09', 7, 1),
(76, '2024-05-02', 2, 1),
(77, '2024-06-09', 5, 1),
(78, '2024-05-05', 2, 1),
(79, '2024-05-05', 2, 1),
(80, '2024-05-10', 1, 1),
(81, '2024-05-10', 1, 1),
(82, '2024-05-11', 1, 1),
(83, '2024-05-11', 1, 1),
(84, '2024-05-04', 1, 1),
(85, '2024-05-02', 1, 1),
(86, '2024-05-02', 1, 1),
(87, '2024-05-02', 1, 1),
(88, '2024-05-04', 1, 1),
(89, '2024-05-10', 1, 1),
(90, '2024-05-03', 1, 1),
(91, '2024-05-03', 33, 1),
(92, '2024-05-02', 11, 1),
(93, '2024-05-04', 33, 1),
(94, '2024-05-09', 1, 1),
(95, '2024-05-09', 110, 1),
(96, '2024-05-02', 222, 1),
(97, '2024-05-09', 300, 1),
(98, '2024-05-02', 11, 13),
(99, '2024-05-03', 1000, 14),
(100, '2024-05-11', 1000, 15),
(101, '2024-05-01', 100, 1),
(102, '2024-05-03', 100, 1),
(103, '2024-05-02', 11, 1),
(104, '2024-05-01', 11, 1),
(105, '2024-05-03', 1, 1),
(106, '2024-05-04', 1, 1),
(107, '2024-05-02', 1, 1),
(108, '2024-05-09', 6, 1);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `detalle_compra`
--

CREATE TABLE `detalle_compra` (
  `id` int(11) NOT NULL,
  `cantidad` int(11) DEFAULT NULL,
  `subtotal` float DEFAULT NULL,
  `compra_id` int(11) DEFAULT NULL,
  `producto_id` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `detalle_compra`
--

INSERT INTO `detalle_compra` (`id`, `cantidad`, `subtotal`, `compra_id`, `producto_id`) VALUES
(3, 20, 400, 2, 2),
(4, 30, 922.5, 3, 3),
(9, 4, 6, 73, 6),
(10, 5, 7, 73, 9),
(11, 33, 44, 74, 1),
(12, 32, 22, 74, 2),
(13, 54, 23, 74, 3),
(14, 43, 42, 74, 4),
(15, 1, 2, 75, 1),
(16, 1, 2, 75, 2),
(17, 1, 1, 76, 1),
(18, 1, 1, 76, 2),
(19, 1, 1, 94, 19),
(20, 33, 44, 95, 20),
(21, 55, 66, 95, 21),
(22, 111, 222, 96, 6),
(23, 100, 100, 97, 20),
(24, 200, 200, 97, 22),
(25, 22, 11, 98, 3),
(26, 123, 1000, 99, 23),
(27, 100, 1000, 100, 23),
(28, 1000, 100, 101, 23),
(29, 1, 1, 107, 24),
(30, 1, 2, 108, 25),
(31, 1, 2, 108, 26),
(32, 1, 2, 108, 27);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `detalle_venta`
--

CREATE TABLE `detalle_venta` (
  `id` int(11) NOT NULL,
  `cantidad` int(11) DEFAULT NULL,
  `subtotal` float DEFAULT NULL,
  `producto_id` int(11) DEFAULT NULL,
  `venta_id` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `detalle_venta`
--

INSERT INTO `detalle_venta` (`id`, `cantidad`, `subtotal`, `producto_id`, `venta_id`) VALUES
(1, 2, 19.98, 5, 2),
(2, 2, 14.5, 3, 3),
(3, 2, 19.98, 5, 3),
(4, 2, 14.5, 3, 4),
(5, 3, 21.75, 3, 4),
(6, 4, 39.96, 5, 4),
(7, 5, 49.95, 5, 4);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `log_actividades`
--

CREATE TABLE `log_actividades` (
  `id` int(11) NOT NULL,
  `email` varchar(30) NOT NULL,
  `actividad` varchar(30) NOT NULL,
  `fecha` date NOT NULL,
  `hora` time NOT NULL,
  `ip` varchar(30) NOT NULL,
  `exitoso` tinyint(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

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
-- Estructura de tabla para la tabla `marca`
--

CREATE TABLE `marca` (
  `id` int(11) NOT NULL,
  `nombre` varchar(30) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `marca`
--

INSERT INTO `marca` (`id`, `nombre`) VALUES
(1, 'Marca A'),
(2, 'Marca B'),
(3, 'Marca C');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `permisos`
--

CREATE TABLE `permisos` (
  `id` int(11) NOT NULL,
  `permiso` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `permisos`
--

INSERT INTO `permisos` (`id`, `permiso`) VALUES
(1, 1),
(2, 0),
(4, 2);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `permisos_usuario`
--

CREATE TABLE `permisos_usuario` (
  `usuario_id` int(11) NOT NULL,
  `permisos_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `permisos_usuario`
--

INSERT INTO `permisos_usuario` (`usuario_id`, `permisos_id`) VALUES
(5, 1),
(6, 1),
(7, 2),
(8, 2),
(9, 2),
(10, 2),
(11, 4),
(12, 4),
(13, 4),
(14, 4),
(15, 4),
(23, 2),
(24, 4);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `producto`
--

CREATE TABLE `producto` (
  `id` int(11) NOT NULL,
  `nombre` varchar(30) DEFAULT NULL,
  `descripcion` varchar(250) DEFAULT NULL,
  `precio` float DEFAULT NULL,
  `cantidad` int(11) DEFAULT NULL,
  `categoria_id` int(11) DEFAULT NULL,
  `imagen` varchar(255) DEFAULT NULL,
  `marca_id` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `producto`
--

INSERT INTO `producto` (`id`, `nombre`, `descripcion`, `precio`, `cantidad`, `categoria_id`, `imagen`, `marca_id`) VALUES
(1, 'Producto A', 'Descripción 8', 2, 1111, 3, 'uploads/proyecto parte 1.png', 3),
(2, 'Producto B', 'Descripción del Producto B', 15.49, 200, 2, NULL, NULL),
(3, 'Producto C', 'Descripción del Producto C', 7.25, 143, 1, NULL, NULL),
(4, 'Producto D', 'Descripción del Producto D', 12, 300, 3, NULL, NULL),
(5, 'Producto E', 'Descripción del Producto E', 9.99, 37, 2, NULL, NULL),
(6, 'asd', 'asddsa', 22, 11, 1, NULL, NULL),
(7, 'prueba', 'prue', 111, 11, 2, 'uploads/ESTANTERIA-LIVIANA.jpg', NULL),
(8, 'prueba', 'prue', 111, 11, 2, 'uploads/ESTANTERIA-LIVIANA.jpg', NULL),
(9, 'qew', 'ewq', 222, 2, 1, 'uploads/ESTANTERIA-LIVIANA.jpg', NULL),
(10, 'ss', 'ewqss', 2223, 2, 1, 'uploads/Imagen de WhatsApp 2024-05-10 a las 14.20.56_f2b9da6b.jpg', NULL),
(11, 'Producto A', 'Descripción de Producto A', 10.5, 100, 1, 'imagenA.jpg', 1),
(12, 'Producto B', 'Descripción de Producto B', 20, 200, 2, 'imagenB.jpg', 2),
(13, 'Producto C', 'Descripción de Producto C', 30.75, 300, 3, 'imagenC.jpg', 3),
(14, 'cable Nro 44', NULL, 0, 0, 3, NULL, 2),
(15, 'caable nuevo', NULL, NULL, 0, 3, NULL, 3),
(16, 'aaaaaa', NULL, NULL, 0, 1, NULL, 1),
(17, 'prueba nueva', NULL, NULL, 0, 5, NULL, 2),
(18, 'nuevo 1', NULL, NULL, 3, 3, NULL, 2),
(19, 'fadsf', NULL, 0, 0, 1, NULL, 1),
(20, 'hola 1', NULL, 0, 0, 2, NULL, 1),
(21, 'hola 2 ', NULL, 0, 0, 2, NULL, 3),
(22, 'hola 3', NULL, 0, 0, 3, NULL, 3),
(23, 'new pr', NULL, 0, 1223, 3, NULL, 3),
(24, 'a', NULL, 0, 1, 1, 'uploads/proyecto parte 1.png', 1),
(25, 'a1', NULL, 0, 1, 1, 'uploads/proyecto parte 1.png', 1),
(26, 'a2', NULL, 0, 1, 2, 'uploads/proyecto parte 1-1.png', 1),
(27, 'a3', NULL, 0, 1, 3, 'uploads/proyecto parte 1-1.png', 1);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `proveedor`
--

CREATE TABLE `proveedor` (
  `id` int(11) NOT NULL,
  `nombre` varchar(30) DEFAULT NULL,
  `contacto` varchar(30) DEFAULT NULL,
  `celular` varchar(30) DEFAULT NULL,
  `direccion` varchar(30) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `proveedor`
--

INSERT INTO `proveedor` (`id`, `nombre`, `contacto`, `celular`, `direccion`) VALUES
(1, 'carlos', 'carlos@gmail.com', '12312312', 'direccion 1'),
(2, 'Proveedor A', 'Juan Pérez', '123-456-7890', 'Calle 123, Ciudad A'),
(3, 'Proveedor B', 'María López', '234-567-8901', 'Avenida 456, Ciudad B'),
(4, 'Proveedor C', 'Carlos Gómez', '345-678-9012', 'Boulevard 789, Ciudad C'),
(7, 'carlos 1', 'carlos@car.com', '323123', 'direccion 1'),
(8, 'carlos 2 ', 'carlos2@carlos2 ', '323231311', 'direccion carlos 2'),
(9, 'Proveedor A', 'Contacto A', '123456789', 'Dirección A'),
(10, 'Proveedor B', 'Contacto B', '987654321', 'Dirección B'),
(11, 'Proveedor C', 'Contacto C', '456123789', 'Dirección C'),
(12, 'provedor hola', 'hola@hola', '1314', 'direccion hola'),
(13, 'pr 1', 'asd', '32313 ', 'dasdfa'),
(14, 'pr 1', 'asd', '32313 ', 'dasdfa'),
(15, 'pr 1', 'asd', '32313 ', 'dasdfa'),
(16, 'pr 1', 'asd', '32313 ', 'dasdfa'),
(17, 'pr 1', 'asd', '32313 ', 'dasdfa'),
(18, 'pr 2', 'eqw', '32323', 'sdafasd'),
(19, 'pr 2', 'eqw', '32323', 'sdafasd'),
(20, 'pr3', 'adsf', '3123', 'asdf'),
(21, 'pr4 ', 'dasdf', '3324 ', 'dfasdas'),
(22, 'pr 5 ', 'dasf', '324', 'fdasdf'),
(23, 'pr 6 ', 'asdf', '23', 'asdf'),
(24, 'pr 7 ', 'dsaf', '234', 'dasf'),
(25, 'pr 8', 'asdf', '2342', 'asfasd');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `usuario`
--

CREATE TABLE `usuario` (
  `id` int(11) NOT NULL,
  `ci` int(11) DEFAULT NULL,
  `nombre` varchar(30) DEFAULT NULL,
  `apellido` varchar(30) DEFAULT NULL,
  `direccion` varchar(30) DEFAULT NULL,
  `celular` varchar(30) DEFAULT NULL,
  `email` varchar(100) DEFAULT NULL,
  `contrasena` varchar(100) DEFAULT NULL,
  `activa` tinyint(1) DEFAULT NULL,
  `hash` varchar(100) DEFAULT NULL,
  `intentos` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `usuario`
--

INSERT INTO `usuario` (`id`, `ci`, `nombre`, `apellido`, `direccion`, `celular`, `email`, `contrasena`, `activa`, `hash`, `intentos`) VALUES
(4, NULL, 'marco', 'conde', NULL, NULL, 'macvcdls@gmail.com', '123456', 1, '24718e01d9cec61d9c24d78f261761d5', 0),
(5, NULL, '1111', '11111', NULL, NULL, 'marco.conde@ucb.edu.bo', '123456', 0, 'f7f82942e7061cec52cacab151296e97', 0),
(6, 12345678, 'Juan', 'Perez', 'Calle Falsa 123', '5551234', 'juan.perez@example.com', 'password123', 1, 'hashvalue1', 0),
(7, 87654321, 'Maria', 'Gomez', 'Avenida Siempre Viva 742', '5555678', 'maria.gomez@example.com', 'password456', 1, 'hashvalue2', 0),
(8, 11223344, 'Luis', 'Martinez', 'Calle Luna 456', '5558765', 'luis.martinez@example.com', 'password789', 0, 'hashvalue3', 1),
(9, 44332211, 'Ana', 'Lopez', 'Calle Sol 789', '5554321', 'ana.lopez@example.com', 'password012', 1, 'hashvalue4', 2),
(10, 99887766, 'Carlos', 'Hernandez', 'Calle Estrella 101', '5556543', 'carlos.hernandez@example.com', 'password345', 0, 'hashvalue5', 0),
(11, 22334455, 'Jose', 'Garcia', 'Calle Nueva 123', '5559876', 'jose.garcia@example.com', 'password234', 1, 'hashvalue6', 0),
(12, 55443322, 'Elena', 'Mendez', 'Avenida Norte 456', '5556789', 'elena.mendez@example.com', 'password567', 0, 'hashvalue7', 1),
(13, 66778899, 'Ricardo', 'Ortega', 'Calle Oeste 789', '5553456', 'ricardo.ortega@example.com', 'password890', 1, 'hashvalue8', 0),
(14, 99887744, 'Lucia', 'Fernandez', 'Calle Este 321', '5558765', 'lucia.fernandez@example.com', 'password1234', 0, 'hashvalue9', 1),
(15, 11112222, 'Miguel', 'Diaz', 'Calle Sur 654', '5554321', 'miguel.diaz@example.com', 'password5678', 1, 'hashvalue10', 0),
(16, 33334444, 'Laura', 'Ramirez', 'Calle Centro 987', '5556543', 'laura.ramirez@example.com', 'password91011', 1, 'hashvalue11', 1),
(17, 55556666, 'David', 'Lopez', 'Calle Ancha 741', '5558764', 'david.lopez@example.com', 'password1213', 0, 'hashvalue12', 2),
(18, 77778888, 'Sandra', 'Torres', 'Calle Larga 852', '5553457', 'sandra.torres@example.com', 'password1415', 1, 'hashvalue13', 0),
(19, 99990000, 'Pedro', 'Martinez', 'Calle Curva 963', '5556784', 'pedro.martinez@example.com', 'password1617', 1, 'hashvalue14', 0),
(20, 11223355, 'Carla', 'Gomez', 'Calle Pequeña 147', '5558763', 'carla.gomez@example.com', 'password1819', 0, 'hashvalue15', 1),
(21, 2134213, 'clie pr', NULL, NULL, '3412341', NULL, NULL, NULL, NULL, NULL),
(22, 313, 'c 1', NULL, NULL, '3123', NULL, NULL, NULL, NULL, NULL),
(23, 132321, 'c2', NULL, NULL, '312', NULL, NULL, NULL, NULL, NULL),
(24, 3231, 'cliente local', NULL, NULL, '2323', NULL, NULL, NULL, NULL, NULL);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `venta`
--

CREATE TABLE `venta` (
  `id` int(11) NOT NULL,
  `fecha` date DEFAULT NULL,
  `total` float DEFAULT NULL,
  `usuario_id` int(11) DEFAULT NULL,
  `usuario_2_id` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `venta`
--

INSERT INTO `venta` (`id`, `fecha`, `total`, `usuario_id`, `usuario_2_id`) VALUES
(1, '2024-05-02', 14.5, 6, 9),
(2, '2024-05-09', 19.98, 6, 8),
(3, '2024-05-11', 34.48, 6, 9),
(4, '2024-05-02', 126.16, 6, 10);

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `caracteristica`
--
ALTER TABLE `caracteristica`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `caracteristica_producto`
--
ALTER TABLE `caracteristica_producto`
  ADD PRIMARY KEY (`producto_id`,`caracteristica_id`),
  ADD KEY `caracteristica_id` (`caracteristica_id`);

--
-- Indices de la tabla `carrito`
--
ALTER TABLE `carrito`
  ADD PRIMARY KEY (`id`),
  ADD KEY `producto_id` (`producto_id`),
  ADD KEY `usuario_id` (`usuario_id`);

--
-- Indices de la tabla `categoria`
--
ALTER TABLE `categoria`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `compra`
--
ALTER TABLE `compra`
  ADD PRIMARY KEY (`id`),
  ADD KEY `proveedor_id` (`proveedor_id`);

--
-- Indices de la tabla `detalle_compra`
--
ALTER TABLE `detalle_compra`
  ADD PRIMARY KEY (`id`),
  ADD KEY `compra_id` (`compra_id`),
  ADD KEY `producto_id` (`producto_id`);

--
-- Indices de la tabla `detalle_venta`
--
ALTER TABLE `detalle_venta`
  ADD PRIMARY KEY (`id`),
  ADD KEY `producto_id` (`producto_id`),
  ADD KEY `venta_id` (`venta_id`);

--
-- Indices de la tabla `log_actividades`
--
ALTER TABLE `log_actividades`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `marca`
--
ALTER TABLE `marca`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `permisos`
--
ALTER TABLE `permisos`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `permisos_usuario`
--
ALTER TABLE `permisos_usuario`
  ADD PRIMARY KEY (`usuario_id`,`permisos_id`),
  ADD KEY `permisos_id` (`permisos_id`);

--
-- Indices de la tabla `producto`
--
ALTER TABLE `producto`
  ADD PRIMARY KEY (`id`),
  ADD KEY `categoria_id` (`categoria_id`),
  ADD KEY `marca_id` (`marca_id`);

--
-- Indices de la tabla `proveedor`
--
ALTER TABLE `proveedor`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `usuario`
--
ALTER TABLE `usuario`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `venta`
--
ALTER TABLE `venta`
  ADD PRIMARY KEY (`id`),
  ADD KEY `usuario_id` (`usuario_id`),
  ADD KEY `usuario_2_id` (`usuario_2_id`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `caracteristica`
--
ALTER TABLE `caracteristica`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT de la tabla `carrito`
--
ALTER TABLE `carrito`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `categoria`
--
ALTER TABLE `categoria`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT de la tabla `compra`
--
ALTER TABLE `compra`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=109;

--
-- AUTO_INCREMENT de la tabla `detalle_compra`
--
ALTER TABLE `detalle_compra`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=33;

--
-- AUTO_INCREMENT de la tabla `detalle_venta`
--
ALTER TABLE `detalle_venta`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT de la tabla `log_actividades`
--
ALTER TABLE `log_actividades`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=76;

--
-- AUTO_INCREMENT de la tabla `marca`
--
ALTER TABLE `marca`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT de la tabla `permisos`
--
ALTER TABLE `permisos`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT de la tabla `producto`
--
ALTER TABLE `producto`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=28;

--
-- AUTO_INCREMENT de la tabla `proveedor`
--
ALTER TABLE `proveedor`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=26;

--
-- AUTO_INCREMENT de la tabla `usuario`
--
ALTER TABLE `usuario`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=25;

--
-- AUTO_INCREMENT de la tabla `venta`
--
ALTER TABLE `venta`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- Restricciones para tablas volcadas
--

--
-- Filtros para la tabla `caracteristica_producto`
--
ALTER TABLE `caracteristica_producto`
  ADD CONSTRAINT `caracteristica_producto_ibfk_1` FOREIGN KEY (`producto_id`) REFERENCES `producto` (`id`),
  ADD CONSTRAINT `caracteristica_producto_ibfk_2` FOREIGN KEY (`caracteristica_id`) REFERENCES `caracteristica` (`id`);

--
-- Filtros para la tabla `carrito`
--
ALTER TABLE `carrito`
  ADD CONSTRAINT `carrito_ibfk_1` FOREIGN KEY (`producto_id`) REFERENCES `producto` (`id`),
  ADD CONSTRAINT `carrito_ibfk_2` FOREIGN KEY (`usuario_id`) REFERENCES `usuario` (`id`);

--
-- Filtros para la tabla `compra`
--
ALTER TABLE `compra`
  ADD CONSTRAINT `compra_ibfk_1` FOREIGN KEY (`proveedor_id`) REFERENCES `proveedor` (`id`);

--
-- Filtros para la tabla `detalle_compra`
--
ALTER TABLE `detalle_compra`
  ADD CONSTRAINT `detalle_compra_ibfk_1` FOREIGN KEY (`compra_id`) REFERENCES `compra` (`id`),
  ADD CONSTRAINT `detalle_compra_ibfk_2` FOREIGN KEY (`producto_id`) REFERENCES `producto` (`id`);

--
-- Filtros para la tabla `detalle_venta`
--
ALTER TABLE `detalle_venta`
  ADD CONSTRAINT `detalle_venta_ibfk_1` FOREIGN KEY (`producto_id`) REFERENCES `producto` (`id`),
  ADD CONSTRAINT `detalle_venta_ibfk_2` FOREIGN KEY (`venta_id`) REFERENCES `venta` (`id`);

--
-- Filtros para la tabla `permisos_usuario`
--
ALTER TABLE `permisos_usuario`
  ADD CONSTRAINT `permisos_usuario_ibfk_1` FOREIGN KEY (`usuario_id`) REFERENCES `usuario` (`id`),
  ADD CONSTRAINT `permisos_usuario_ibfk_2` FOREIGN KEY (`permisos_id`) REFERENCES `permisos` (`id`);

--
-- Filtros para la tabla `producto`
--
ALTER TABLE `producto`
  ADD CONSTRAINT `producto_ibfk_1` FOREIGN KEY (`categoria_id`) REFERENCES `categoria` (`id`),
  ADD CONSTRAINT `producto_ibfk_2` FOREIGN KEY (`marca_id`) REFERENCES `marca` (`id`);

--
-- Filtros para la tabla `venta`
--
ALTER TABLE `venta`
  ADD CONSTRAINT `venta_ibfk_1` FOREIGN KEY (`usuario_id`) REFERENCES `usuario` (`id`),
  ADD CONSTRAINT `venta_ibfk_2` FOREIGN KEY (`usuario_2_id`) REFERENCES `usuario` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
