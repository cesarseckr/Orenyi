-- phpMyAdmin SQL Dump
-- version 4.6.6
-- https://www.phpmyadmin.net/
--
-- Servidor: localhost
-- Tiempo de generación: 05-12-2020 a las 05:58:42
-- Versión del servidor: 5.7.17-log
-- Versión de PHP: 5.6.30

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `orenyi_base_v1`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `clientes`
--

CREATE TABLE `clientes` (
  `id_cliente` int(11) NOT NULL,
  `nombre` varchar(250) COLLATE utf8_spanish2_ci NOT NULL,
  `apaterno` varchar(250) COLLATE utf8_spanish2_ci NOT NULL,
  `amaterno` varchar(250) COLLATE utf8_spanish2_ci NOT NULL,
  `telefono` varchar(10) COLLATE utf8_spanish2_ci NOT NULL,
  `direccion` varchar(500) COLLATE utf8_spanish2_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish2_ci;

--
-- Volcado de datos para la tabla `clientes`
--

INSERT INTO `clientes` (`id_cliente`, `nombre`, `apaterno`, `amaterno`, `telefono`, `direccion`) VALUES
(1, 'Pedido', 'Abierto', '', '', ''),
(4, 'Julio Alejandro', 'Vazquez', 'Mora', '4431713081', 'Dirección'),
(5, 'Diego', 'Zamora', 'Ortiz ', '2222222', 'Direccion zamora'),
(6, 'Sandra', 'Lopéz', 'Perez', '555 55', 'Direccion'),
(7, 'Eduardo', 'Villa ', 'Guzman ', '44444', 'direccion'),
(8, 'Carina', 'Avila ', 'Maldonado', '777777', 'Direccion Avila'),
(9, 'Nadia', 'Patiño', 'Rosales', '8888888', 'Direccion'),
(10, 'Christian', 'Piñon ', 'Torres', '222', 'direccion'),
(11, 'Lucero', 'Ortega', 'Rios', '555', 'direccion'),
(12, 'Monserrate', 'Valera', 'Becerril', '22 2222', 'Direccion 2'),
(13, 'Yesai', 'Oseguera', 'Arizaga', '4434023016', 'Francisco primo de verdad 119');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `contenido_orden`
--

CREATE TABLE `contenido_orden` (
  `id_contenido_orden` int(11) NOT NULL,
  `id_orden` int(11) NOT NULL,
  `tipo_promocion` int(11) NOT NULL,
  `id_tipo_promocion` int(11) NOT NULL,
  `id_platillo` int(11) NOT NULL,
  `cantidad` int(11) NOT NULL,
  `precio` double NOT NULL,
  `comentarios` text COLLATE utf8_spanish2_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish2_ci;

--
-- Volcado de datos para la tabla `contenido_orden`
--

INSERT INTO `contenido_orden` (`id_contenido_orden`, `id_orden`, `tipo_promocion`, `id_tipo_promocion`, `id_platillo`, `cantidad`, `precio`, `comentarios`) VALUES
(1, 214, 5, 1, 2, 1, 42.5, 'comentarios 2x85 camaron n'),
(2, 214, 5, 1, 10, 1, 42.5, 'comentarios 2x85 pollo e'),
(5, 214, 3, 3, 3, 1, 18, 'comentarios bebida 18'),
(6, 214, 1, 1, 5, 1, 55, 'comentarios maki 55'),
(7, 214, 1, 2, 12, 1, 60, 'comentarios maki calif e 60'),
(8, 214, 5, 2, 10, 1, 42.5, 'comentarios 2x85 pollo e\r\n'),
(9, 214, 5, 2, 10, 1, 42.5, 'comentarios 2x85 pollo e'),
(10, 214, 5, 3, 2, 1, 42.5, ''),
(11, 214, 5, 3, 10, 1, 42.5, '');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `menu_bebidas`
--

CREATE TABLE `menu_bebidas` (
  `id_bebida` int(11) NOT NULL,
  `nombre` varchar(200) COLLATE utf8_spanish2_ci NOT NULL,
  `precio` double NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish2_ci;

--
-- Volcado de datos para la tabla `menu_bebidas`
--

INSERT INTO `menu_bebidas` (`id_bebida`, `nombre`, `precio`) VALUES
(1, 'Coca-Cola', 20),
(2, 'Calpico', 20),
(3, 'Agua de sabor', 18);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `menu_kushiages`
--

CREATE TABLE `menu_kushiages` (
  `id_kushiage` int(11) NOT NULL,
  `nombre` varchar(200) COLLATE utf8_spanish2_ci NOT NULL,
  `precio` double NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish2_ci;

--
-- Volcado de datos para la tabla `menu_kushiages`
--

INSERT INTO `menu_kushiages` (`id_kushiage`, `nombre`, `precio`) VALUES
(26, 'camaron', 22),
(27, 'pollo', 20),
(28, 'res', 20),
(29, 'philadelphia', 25),
(30, 'manchego', 25),
(31, 'philad y camarón', 25),
(32, 'philad y pollo', 25),
(33, 'philad y res', 25),
(34, 'manch y camarón', 25),
(35, 'manch y pollo', 25),
(36, 'mach y res', 25);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `menu_makis_clasicos`
--

CREATE TABLE `menu_makis_clasicos` (
  `id_maki_clasico` int(11) NOT NULL,
  `nombre` varchar(100) COLLATE utf8_spanish2_ci NOT NULL,
  `ingredientes` text COLLATE utf8_spanish2_ci NOT NULL,
  `tipo` int(11) NOT NULL,
  `precio` double NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish2_ci;

--
-- Volcado de datos para la tabla `menu_makis_clasicos`
--

INSERT INTO `menu_makis_clasicos` (`id_maki_clasico`, `nombre`, `ingredientes`, `tipo`, `precio`) VALUES
(2, 'Maki natural camaron', 'philadelphia-manchego-aguacate-camaron', 1, 55),
(3, 'Maki natural salmon', 'philadelphia-manchego-aguacate-salmon', 1, 55),
(4, 'Maki natural pollo', 'philadelphia-manchego-aguacate-pollo', 1, 55),
(5, 'Maki natural res', 'philadelphia-manchego-aguacate-res', 1, 55),
(6, 'Maki natural california', 'philadelphia-pepino-aguacate-camaron-cangrejo', 1, 55),
(7, 'Maki natural vegetariano', 'philadelphia-zanahoria-aguacate-calabaza', 1, 50),
(8, 'Maki empanizado camaron', 'philadelphia-manchego-aguacate-camaron', 2, 60),
(9, 'Maki empanizado salmon', 'philadelphia-manchego-aguacate-salmon', 2, 60),
(10, 'Maki empanizado pollo', 'philadelphia-manchego-aguacate-pollo', 2, 60),
(11, 'Maki empanizado res', 'philadelphia-manchego-aguacate-res', 2, 60),
(12, 'Maki empanizado california', 'philadelphia-pepino-aguacate-camaron-cangrejo', 2, 60),
(13, 'Maki empanizado vegetariano', 'philadelphia-zanahoria-aguacate-calabaza', 2, 55);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `menu_makis_especiales`
--

CREATE TABLE `menu_makis_especiales` (
  `id_maki_especial` int(11) NOT NULL,
  `nombre` varchar(200) COLLATE utf8_spanish2_ci NOT NULL,
  `ingredientes` text COLLATE utf8_spanish2_ci NOT NULL,
  `tipo` int(11) NOT NULL,
  `precio` double NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish2_ci;

--
-- Volcado de datos para la tabla `menu_makis_especiales`
--

INSERT INTO `menu_makis_especiales` (`id_maki_especial`, `nombre`, `ingredientes`, `tipo`, `precio`) VALUES
(2, 'Maki natural mexicano', 'philadelphia-manchego-chile serrano-pollo-res', 1, 60),
(3, 'Maki natural titanic', 'philadelphia-pepino-aguacate-salmon-camaron-cangrejo', 1, 70),
(4, 'Maki natural anaconda', 'philadelphia-manchego-aguacate-chile serrano-camar?n-pollo-res-cangrejo', 1, 75),
(5, 'Maki empanizado mexicano', 'philadelphia-manchego-chile serrano-pollo-res', 2, 65),
(6, 'Maki empanizado titanic', 'philadelphia-pepino-aguacate-salmon-camaron-cangrejo', 2, 75),
(7, 'Maki empanizado anaconda', 'philadelphia-manchego-aguacate-chile serrano-camar?n-pollo-res-cangrejo', 2, 80);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `orden`
--

CREATE TABLE `orden` (
  `id_orden` int(11) NOT NULL,
  `id_cliente` int(11) NOT NULL,
  `direccion` varchar(600) COLLATE utf8_spanish2_ci NOT NULL,
  `telefono` varchar(100) COLLATE utf8_spanish2_ci NOT NULL,
  `fecha` date NOT NULL,
  `hora` time NOT NULL,
  `tipo` int(11) NOT NULL,
  `clase` int(11) NOT NULL,
  `estado` int(11) NOT NULL,
  `detalles` text COLLATE utf8_spanish2_ci NOT NULL,
  `total` double NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish2_ci;

--
-- Volcado de datos para la tabla `orden`
--

INSERT INTO `orden` (`id_orden`, `id_cliente`, `direccion`, `telefono`, `fecha`, `hora`, `tipo`, `clase`, `estado`, `detalles`, `total`) VALUES
(214, 4, 'Dirección', '4431713081', '2020-11-28', '15:18:05', 2, 1, 1, '', 0),
(243, 0, '', '', '2020-11-28', '16:37:36', 0, 0, 0, '', 0);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `usuarios`
--

CREATE TABLE `usuarios` (
  `id_usuario` int(11) NOT NULL,
  `id_tipo` int(11) NOT NULL,
  `usuario` varchar(100) COLLATE utf8_spanish2_ci NOT NULL,
  `pass` varchar(100) COLLATE utf8_spanish2_ci NOT NULL,
  `estatus` int(11) NOT NULL,
  `ps` int(11) NOT NULL,
  `url_img` varchar(250) COLLATE utf8_spanish2_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish2_ci;

--
-- Volcado de datos para la tabla `usuarios`
--

INSERT INTO `usuarios` (`id_usuario`, `id_tipo`, `usuario`, `pass`, `estatus`, `ps`, `url_img`) VALUES
(1, 1, 'admin', 'MTIzNDU2', 1, 2, 'administrativos/admin/perfil.png');

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `clientes`
--
ALTER TABLE `clientes`
  ADD PRIMARY KEY (`id_cliente`);

--
-- Indices de la tabla `contenido_orden`
--
ALTER TABLE `contenido_orden`
  ADD PRIMARY KEY (`id_contenido_orden`);

--
-- Indices de la tabla `menu_bebidas`
--
ALTER TABLE `menu_bebidas`
  ADD PRIMARY KEY (`id_bebida`);

--
-- Indices de la tabla `menu_kushiages`
--
ALTER TABLE `menu_kushiages`
  ADD PRIMARY KEY (`id_kushiage`);

--
-- Indices de la tabla `menu_makis_clasicos`
--
ALTER TABLE `menu_makis_clasicos`
  ADD PRIMARY KEY (`id_maki_clasico`);

--
-- Indices de la tabla `menu_makis_especiales`
--
ALTER TABLE `menu_makis_especiales`
  ADD PRIMARY KEY (`id_maki_especial`);

--
-- Indices de la tabla `orden`
--
ALTER TABLE `orden`
  ADD PRIMARY KEY (`id_orden`);

--
-- Indices de la tabla `usuarios`
--
ALTER TABLE `usuarios`
  ADD PRIMARY KEY (`id_usuario`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `clientes`
--
ALTER TABLE `clientes`
  MODIFY `id_cliente` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;
--
-- AUTO_INCREMENT de la tabla `contenido_orden`
--
ALTER TABLE `contenido_orden`
  MODIFY `id_contenido_orden` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;
--
-- AUTO_INCREMENT de la tabla `menu_bebidas`
--
ALTER TABLE `menu_bebidas`
  MODIFY `id_bebida` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
--
-- AUTO_INCREMENT de la tabla `menu_kushiages`
--
ALTER TABLE `menu_kushiages`
  MODIFY `id_kushiage` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=37;
--
-- AUTO_INCREMENT de la tabla `menu_makis_clasicos`
--
ALTER TABLE `menu_makis_clasicos`
  MODIFY `id_maki_clasico` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;
--
-- AUTO_INCREMENT de la tabla `menu_makis_especiales`
--
ALTER TABLE `menu_makis_especiales`
  MODIFY `id_maki_especial` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;
--
-- AUTO_INCREMENT de la tabla `orden`
--
ALTER TABLE `orden`
  MODIFY `id_orden` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=244;
--
-- AUTO_INCREMENT de la tabla `usuarios`
--
ALTER TABLE `usuarios`
  MODIFY `id_usuario` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
