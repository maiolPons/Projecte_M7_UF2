-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 10-11-2022 a las 23:06:58
-- Versión del servidor: 10.4.25-MariaDB
-- Versión de PHP: 7.4.30

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `libreria`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `administrador`
--

CREATE TABLE `administrador` (
  `nombreUsuario` varchar(40) NOT NULL,
  `contraseña` varchar(60) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `administrador`
--

INSERT INTO `administrador` (`nombreUsuario`, `contraseña`) VALUES
('admin', 'a');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `categorias`
--

CREATE TABLE `categorias` (
  `id` int(11) NOT NULL,
  `nombre` varchar(20) NOT NULL,
  `activo` int(11) NOT NULL DEFAULT 1
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `categorias`
--

INSERT INTO `categorias` (`id`, `nombre`, `activo`) VALUES
(1, 'gas', 1),
(5, 'ola k ase', 0),
(6, 'amor', 0),
(7, 'terror', 0),
(8, 'Aventura', 1);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `clientes`
--

CREATE TABLE `clientes` (
  `id` int(11) NOT NULL,
  `email` varchar(30) NOT NULL,
  `nombre` varchar(20) NOT NULL,
  `apellido` varchar(20) NOT NULL,
  `direccion` varchar(30) NOT NULL,
  `dni` varchar(9) NOT NULL,
  `passwd` varchar(60) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `clientes`
--

INSERT INTO `clientes` (`id`, `email`, `nombre`, `apellido`, `direccion`, `dni`, `passwd`) VALUES
(3, 'salma@', 'salma', 'alami', 'aa', '12345S', 's');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `libros`
--

CREATE TABLE `libros` (
  `ISBN` varchar(20) NOT NULL,
  `titulo` varchar(50) NOT NULL,
  `autor` varchar(20) NOT NULL,
  `editorial` varchar(20) NOT NULL,
  `descripcion` varchar(1000) NOT NULL,
  `foto` varchar(60) NOT NULL,
  `stock` int(5) NOT NULL,
  `precioUni` int(10) NOT NULL,
  `idCategoria` int(11) NOT NULL,
  `destacado` tinyint(1) NOT NULL DEFAULT 0,
  `novedades` date NOT NULL,
  `estadoL` tinyint(1) NOT NULL DEFAULT 1,
  `favorito` tinyint(1) NOT NULL DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `libros`
--

INSERT INTO `libros` (`ISBN`, `titulo`, `autor`, `editorial`, `descripcion`, `foto`, `stock`, `precioUni`, `idCategoria`, `destacado`, `novedades`, `estadoL`, `favorito`) VALUES
('11111', 'Boulevard', 'Flor', 'edit1', 'Buen libro', 'img/boulevard.jpeg', 50, 16, 5, 1, '2022-10-30', 0, 1),
('22222', 'El hijo', 'Cramen', 'edit2', 'Buen libro', 'img/libro.jpg', 100, 15, 1, 0, '2022-10-30', 1, 1),
('33333', 'Amor prohibido', 'Lidia', 'edit3', 'buen libro', 'img/libro.jpg', 250, 10, 1, 0, '2022-10-30', 0, 0),
('44444', 'Pineda', 'Salma', 'edit5', 'Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry\'s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged.', 'img/libro.jpg', 20, 5, 7, 1, '2022-10-30', 1, 1),
('88888', 'Mochila para el universo', 'Elsa', 'edit8', '¿Cuánto debe durar un abrazo? ¿De qué sirve llorar? ¿Qué podemos hacer para cambiar nuestra suerte? ¿Tiene algún propósito el enamoramiento?', 'img/univers.jpeg', 50, 12, 6, 0, '2022-11-02', 1, 1);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `lineapedidos`
--

CREATE TABLE `lineapedidos` (
  `idPedido` int(11) NOT NULL,
  `ISBN` varchar(20) NOT NULL,
  `cantidad` int(200) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `pedidos`
--

CREATE TABLE `pedidos` (
  `id` int(11) NOT NULL,
  `idCliente` int(11) NOT NULL,
  `fechaPeticion` date NOT NULL,
  `estado` varchar(20) NOT NULL DEFAULT 'pendiente',
  `ImporteTotal` float DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `administrador`
--
ALTER TABLE `administrador`
  ADD PRIMARY KEY (`nombreUsuario`);

--
-- Indices de la tabla `categorias`
--
ALTER TABLE `categorias`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `clientes`
--
ALTER TABLE `clientes`
  ADD PRIMARY KEY (`id`,`email`),
  ADD UNIQUE KEY `dni` (`dni`);

--
-- Indices de la tabla `libros`
--
ALTER TABLE `libros`
  ADD PRIMARY KEY (`ISBN`),
  ADD KEY `idCategoria` (`idCategoria`);

--
-- Indices de la tabla `lineapedidos`
--
ALTER TABLE `lineapedidos`
  ADD PRIMARY KEY (`idPedido`,`ISBN`) USING BTREE,
  ADD KEY `lineapedidos_ibfk_1` (`ISBN`);

--
-- Indices de la tabla `pedidos`
--
ALTER TABLE `pedidos`
  ADD PRIMARY KEY (`id`),
  ADD KEY `idCliente` (`idCliente`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `categorias`
--
ALTER TABLE `categorias`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT de la tabla `clientes`
--
ALTER TABLE `clientes`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT de la tabla `pedidos`
--
ALTER TABLE `pedidos`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- Restricciones para tablas volcadas
--

--
-- Filtros para la tabla `libros`
--
ALTER TABLE `libros`
  ADD CONSTRAINT `libros_ibfk_1` FOREIGN KEY (`idCategoria`) REFERENCES `categorias` (`id`);

--
-- Filtros para la tabla `lineapedidos`
--
ALTER TABLE `lineapedidos`
  ADD CONSTRAINT `lineapedidos_ibfk_1` FOREIGN KEY (`ISBN`) REFERENCES `libros` (`ISBN`),
  ADD CONSTRAINT `lineapedidos_ibfk_3` FOREIGN KEY (`idPedido`) REFERENCES `pedidos` (`id`);

--
-- Filtros para la tabla `pedidos`
--
ALTER TABLE `pedidos`
  ADD CONSTRAINT `pedidos_ibfk_1` FOREIGN KEY (`idCliente`) REFERENCES `clientes` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
