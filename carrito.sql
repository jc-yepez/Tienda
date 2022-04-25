-- phpMyAdmin SQL Dump
-- version 4.5.1
-- http://www.phpmyadmin.net
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 25-04-2022 a las 23:31:42
-- Versión del servidor: 10.1.9-MariaDB
-- Versión de PHP: 5.6.15

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `carrito`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `carrito`
--

CREATE TABLE `carrito` (
  `codigo_item` int(11) NOT NULL,
  `sesion` varchar(100) COLLATE utf8_spanish_ci NOT NULL,
  `codigo_producto_fk` int(11) NOT NULL,
  `cantidad` int(11) NOT NULL,
  `precio` decimal(6,2) NOT NULL,
  `fecha` varchar(40) COLLATE utf8_spanish_ci NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

--
-- Volcado de datos para la tabla `carrito`
--

INSERT INTO `carrito` (`codigo_item`, `sesion`, `codigo_producto_fk`, `cantidad`, `precio`, `fecha`) VALUES
(1, '1803459450', 7, 1, '5.00', '2016-7-28 18:34:25'),
(2, '1803459450', 5, 2, '100.00', '2016-7-28 18:34:25'),
(3, '1803459450', 11, 1, '455.00', '2016-7-28 18:34:25'),
(4, '1803459450', 9, 1, '15.00', '2016-7-28 18:38:29'),
(5, 'ubacpjjoft4atmogcqf8hktfv2', 7, 5, '5.00', '');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `clientes`
--

CREATE TABLE `clientes` (
  `CED_CLI` varchar(10) NOT NULL,
  `NOM_CLI` varchar(20) NOT NULL,
  `APE_CLI` varchar(20) NOT NULL,
  `DIR_CLI` varchar(50) NOT NULL,
  `EMAIL_CLI` varchar(50) NOT NULL,
  `TEL_CLI` varchar(10) NOT NULL,
  `IMA_CLI` varchar(50) NOT NULL,
  `PAIS_CLI` varchar(20) CHARACTER SET utf8 NOT NULL,
  `SEXO_CLI` char(9) CHARACTER SET utf8 NOT NULL,
  `CLA_CLI` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `clientes`
--

INSERT INTO `clientes` (`CED_CLI`, `NOM_CLI`, `APE_CLI`, `DIR_CLI`, `EMAIL_CLI`, `TEL_CLI`, `IMA_CLI`, `PAIS_CLI`, `SEXO_CLI`, `CLA_CLI`) VALUES
('1803459450', 'Carlos', 'NuÃ±ez', 'Ambato', 'carlos', '0998761155', 'fotosClientes/1803459450.jpg', 'ECUADOR', 'MASCULINO', '827ccb0eea8a706c4c34a16891f84e7b'),
('1804728903', 'Brayan', 'Cujano', 'Cumanda', 'brayancujano@gmail.com', '0995557478', 'fotosClientes/1804728903.jpg', 'ECUADOR', 'MASCULINO', '8c1de74bdafeeb7bc94fc0172cb96cca');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `items`
--

CREATE TABLE `items` (
  `codigo_item` int(11) NOT NULL,
  `factura` int(11) NOT NULL,
  `codigo_producto` int(11) NOT NULL,
  `cantidad` int(11) NOT NULL,
  `precio` decimal(6,2) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `productos`
--

CREATE TABLE `productos` (
  `codigo_producto` int(11) NOT NULL,
  `nombre` varchar(50) COLLATE utf8_spanish_ci NOT NULL,
  `precio` decimal(6,2) NOT NULL,
  `descripcion` varchar(50) COLLATE utf8_spanish_ci NOT NULL,
  `foto` varchar(100) COLLATE utf8_spanish_ci NOT NULL,
  `foto2` varchar(50) COLLATE utf8_spanish_ci DEFAULT NULL,
  `foto3` varchar(50) COLLATE utf8_spanish_ci DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

--
-- Volcado de datos para la tabla `productos`
--

INSERT INTO `productos` (`codigo_producto`, `nombre`, `precio`, `descripcion`, `foto`, `foto2`, `foto3`) VALUES
(1, 'SILOEv', '12.00', 'Fibra dietetica SILOE contra el estrenimiento', 'fotosProductos/siloe.jpg', 'fotosProductos/siloe1.png', 'fotosProductos/siloe2.jpg'),
(2, 'Plantas hornamentales', '22.00', 'De varios colores', 'fotosProductos/plantas.png', 'fotosProductos/plantas1.jpg', 'fotosProductos/plantas2.png'),
(8, 'LINAZA', '5.00', 'LINAZA', 'fotosProductos/Linaza.png', 'fotosProductos/Linaza1.png', 'fotosProductos/Linaza2.png'),
(11, 'COMPUTADORA', '455.00', 'laptop 1.8 Mhzhd 150 GBram 2GB', 'fotosProductos/milaptop.jpg', 'fotosProductos/Laptop1.jpg', 'fotosProductos/Laptop2.jpg'),
(3, 'melcochas', '0.50', 'dulce de Banios', 'fotosProductos/melcochas.png', 'fotosProductos/melcochas1.png', 'fotosProductos/melcochas2.png'),
(9, 'Hojas de Te', '15.00', 'hojas de te con sabores de frutas, viene 24 uninad', 'fotosProductos/te.png', 'fotosProductos/te1.png', 'fotosProductos/te2.png'),
(4, 'Dendur', '55.00', 'Perfume de Yambal', 'fotosProductos/dendur.jpg', 'fotosProductos/dendur1.jpg', 'fotosProductos/dendur2.jpg'),
(10, 'Tequila', '52.00', 'Botella importada directamente desde Mexico', 'fotosProductos/tequila.png', 'fotosProductos/tequila1.png', 'fotosProductos/tequila2.png'),
(7, 'besitos', '5.00', 'en caja', 'fotosProductos/besitos.jpg', 'fotosProductos/besitos1.jpg', 'fotosProductos/besitos2.jpg'),
(5, 'camisetas', '100.00', 'en talla M', 'fotosProductos/CamisetaRoja.png', 'fotosProductos/Camiseta1.png', 'fotosProductos/Camiseta2.png'),
(6, 'jalea real', '5.00', 'jalea real litro\r\n', 'fotosProductos/jalea_real.jpg', 'fotosProductos/jalea_real1.jpg', 'fotosProductos/jalea_real2.jpg'),
(12, 'Papas Rufles', '0.35', 'natural', 'fotosProductos/rufles.jpg', 'fotosProductos/rufles1.jpg', 'fotosProductos/rufles2.jpg'),
(13, 'Kataboom', '0.10', 'sabor a cereza', 'fotosProductos/kataboom.jpg', 'fotosProductos/kataboom1.jpg', 'fotosProductos/kataboom2.jpg'),
(14, 'Controlador DJ', '990.00', 'marca numark nv', 'fotosProductos/Numark_NV_Wallpaper_HD.jpg', 'fotosProductos/Numark_NV.jpg', 'fotosProductos/Numark_NV2.jpg'),
(15, 'Numark mixtrack pro II', '325.00', 'Nueva compatible con serato', 'fotosProductos/mixtrack_pro_2.jpg', 'fotosProductos/mixtrack_pro_2_1.jpg', 'fotosProductos/mixtrack_pro_2_2.jpg'),
(16, 'Doritos Desafio', '0.50', 'Picantes', 'fotosProductos/Doritos.png', 'fotosProductos/Doritos1.png', 'fotosProductos/Doritos2.png'),
(17, 'Pionner ddj Rx', '1600.00', 'Compatible con Recordbox', 'fotosProductos/pioneer_ddj_rx.png', 'fotosProductos/pioneer_ddj_rx1.png', 'fotosProductos/pioneer_ddj_rx2.png'),
(18, 'Queso', '5.40', 'Lacteos Perecible', 'fotosProductos/descarga_(4).jpg', NULL, NULL);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `usuarios`
--

CREATE TABLE `usuarios` (
  `login` varchar(20) COLLATE utf8_spanish_ci NOT NULL,
  `nombre` varchar(20) COLLATE utf8_spanish_ci NOT NULL,
  `apellido` varchar(20) COLLATE utf8_spanish_ci NOT NULL,
  `clave` varchar(50) COLLATE utf8_spanish_ci NOT NULL,
  `perfil` varchar(15) COLLATE utf8_spanish_ci NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

--
-- Volcado de datos para la tabla `usuarios`
--

INSERT INTO `usuarios` (`login`, `nombre`, `apellido`, `clave`, `perfil`) VALUES
('ycarrillo', 'Yessenia', 'Carrillo', '12345', 'Asistente'),
('josej', 'Jose', 'Jaramillo', 'pepemillo', 'Asistente'),
('rgavilanez', 'Ricardo', 'Gavilanez', 'rgm', 'Secretario'),
('bcujano', 'Brayan', 'Cujano', '4321', 'Administrador');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `ventas`
--

CREATE TABLE `ventas` (
  `factura` int(11) NOT NULL,
  `emai` varchar(50) COLLATE utf8_spanish_ci NOT NULL,
  `fecha` date NOT NULL,
  `fpago` varchar(2) COLLATE utf8_spanish_ci NOT NULL,
  `ttarjeta` varchar(30) COLLATE utf8_spanish_ci DEFAULT NULL,
  `ntarjeta` varchar(20) COLLATE utf8_spanish_ci DEFAULT NULL,
  `ctarjeta` varchar(100) COLLATE utf8_spanish_ci DEFAULT NULL,
  `ftarjeta` varchar(7) COLLATE utf8_spanish_ci DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `carrito`
--
ALTER TABLE `carrito`
  ADD PRIMARY KEY (`codigo_item`);

--
-- Indices de la tabla `clientes`
--
ALTER TABLE `clientes`
  ADD PRIMARY KEY (`CED_CLI`);

--
-- Indices de la tabla `items`
--
ALTER TABLE `items`
  ADD PRIMARY KEY (`codigo_item`);

--
-- Indices de la tabla `productos`
--
ALTER TABLE `productos`
  ADD PRIMARY KEY (`codigo_producto`);

--
-- Indices de la tabla `usuarios`
--
ALTER TABLE `usuarios`
  ADD PRIMARY KEY (`login`);

--
-- Indices de la tabla `ventas`
--
ALTER TABLE `ventas`
  ADD PRIMARY KEY (`factura`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `carrito`
--
ALTER TABLE `carrito`
  MODIFY `codigo_item` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;
--
-- AUTO_INCREMENT de la tabla `items`
--
ALTER TABLE `items`
  MODIFY `codigo_item` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT de la tabla `productos`
--
ALTER TABLE `productos`
  MODIFY `codigo_producto` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=19;
--
-- AUTO_INCREMENT de la tabla `ventas`
--
ALTER TABLE `ventas`
  MODIFY `factura` int(11) NOT NULL AUTO_INCREMENT;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
