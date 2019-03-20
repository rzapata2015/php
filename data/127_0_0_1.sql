-- phpMyAdmin SQL Dump
-- version 4.7.0
-- https://www.phpmyadmin.net/
--
-- Servidor: localhost
-- Tiempo de generación: 29-11-2018 a las 01:05:02
-- Versión del servidor: 10.1.21-MariaDB
-- Versión de PHP: 5.6.30

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `bd_hoja_vida_pc`
--
CREATE DATABASE IF NOT EXISTS `bd_hoja_vida_pc` DEFAULT CHARACTER SET utf8 COLLATE utf8_general_ci;
USE `bd_hoja_vida_pc`;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tbl_clientes`
--

CREATE TABLE `tbl_clientes` (
  `id_cliente` int(11) NOT NULL,
  `nombre_completo` varchar(50) NOT NULL,
  `celular` varchar(30) NOT NULL,
  `correo` varchar(120) NOT NULL,
  `nombre_usuario` varchar(20) NOT NULL,
  `clave` varchar(150) NOT NULL,
  `tbl_perfil_id_perfil` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `tbl_clientes`
--

INSERT INTO `tbl_clientes` (`id_cliente`, `nombre_completo`, `celular`, `correo`, `nombre_usuario`, `clave`, `tbl_perfil_id_perfil`) VALUES
(9, 'Alejandro', '576', 'm@.com', 'alejo', '03ac674216f3e15c761ee1a5e255f067953623c8b388b4459e13f978d7c846f4', 2),
(11, 'Juanes', '321', 'juanes@correo.com', 'juanes', 'a665a45920422f9d417e4867efdc4fb8a04a1f3fff1fa07e998e86f7f7a27ae3', 1),
(12, 'Sebastian', '321', 'sebas@correo.com', 'sebas', 'a665a45920422f9d417e4867efdc4fb8a04a1f3fff1fa07e998e86f7f7a27ae3', 2);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tbl_dependencias`
--

CREATE TABLE `tbl_dependencias` (
  `id_dependencia` int(11) NOT NULL,
  `nombre_dependencia` varchar(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `tbl_dependencias`
--

INSERT INTO `tbl_dependencias` (`id_dependencia`, `nombre_dependencia`) VALUES
(2, 'Gerencias'),
(14, 'Tesorería');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tbl_hoja_vida`
--

CREATE TABLE `tbl_hoja_vida` (
  `id_hoja_vida` int(11) NOT NULL,
  `tbl_dependencias_id_dependencia` int(11) NOT NULL,
  `equipo_numero` int(11) DEFAULT '0',
  `tbl_marcas_id_marca` int(11) DEFAULT NULL,
  `tbl_tipo_pc_id_tipo_pc` int(11) NOT NULL,
  `fecha_compra` date DEFAULT NULL,
  `valor` int(11) DEFAULT '0',
  `fecha_expiracion_garantia` date DEFAULT NULL,
  `fecha_registrado` date DEFAULT NULL,
  `tbl_tipo_pc_distribucion_id_tipo_pc_distribucion` int(11) NOT NULL,
  `manija` int(11) DEFAULT '0',
  `panel_frontal` int(11) DEFAULT '0',
  `iluminacion` int(11) DEFAULT '0',
  `unidades_opticas` varchar(50) DEFAULT NULL,
  `lector_multitarjetas` int(11) DEFAULT '0',
  `cantidad_puertos_usb` int(11) DEFAULT NULL,
  `puertos_video` varchar(30) DEFAULT NULL,
  `ethernet` int(11) DEFAULT '0',
  `plug_audio` varchar(20) DEFAULT '0',
  `cantidad_ps2` int(11) DEFAULT NULL,
  `otros_puertos` varchar(50) DEFAULT NULL,
  `tbl_tipo_board_id_tipo_board` int(11) NOT NULL,
  `tbl_tipo_fuente_id_tipo_fuente` int(11) NOT NULL,
  `marca_fuente` varchar(20) DEFAULT NULL,
  `modelo_fuente` varchar(20) DEFAULT NULL,
  `voltaje_fuente` varchar(20) DEFAULT '0',
  `watt_fuente` varchar(20) DEFAULT '0',
  `tamano_monitor` varchar(20) DEFAULT NULL,
  `marca_monitor` varchar(20) DEFAULT NULL,
  `tbl_tipo_monitor_id_tipo_monitor` int(11) NOT NULL,
  `marca_dd` varchar(20) DEFAULT NULL,
  `capacidad_dd` varchar(20) DEFAULT NULL,
  `serial_dd` varchar(20) DEFAULT NULL,
  `tbl_tipo_dd_id_tipo_dd` int(11) NOT NULL,
  `marca_board` varchar(20) DEFAULT NULL,
  `serie_board` varchar(20) DEFAULT NULL,
  `capacidad_ram` int(11) DEFAULT NULL,
  `tbl_tipo_ram_id_tipo_ram` int(11) NOT NULL,
  `velocidad_ram` varchar(30) DEFAULT NULL,
  `ramas_expansion` varchar(100) DEFAULT NULL,
  `tarjetas_expansion` varchar(200) DEFAULT NULL,
  `foto` varchar(120) DEFAULT NULL,
  `software` text,
  `observaciones` text,
  `tbl_clientes_id_cliente` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `tbl_hoja_vida`
--

INSERT INTO `tbl_hoja_vida` (`id_hoja_vida`, `tbl_dependencias_id_dependencia`, `equipo_numero`, `tbl_marcas_id_marca`, `tbl_tipo_pc_id_tipo_pc`, `fecha_compra`, `valor`, `fecha_expiracion_garantia`, `fecha_registrado`, `tbl_tipo_pc_distribucion_id_tipo_pc_distribucion`, `manija`, `panel_frontal`, `iluminacion`, `unidades_opticas`, `lector_multitarjetas`, `cantidad_puertos_usb`, `puertos_video`, `ethernet`, `plug_audio`, `cantidad_ps2`, `otros_puertos`, `tbl_tipo_board_id_tipo_board`, `tbl_tipo_fuente_id_tipo_fuente`, `marca_fuente`, `modelo_fuente`, `voltaje_fuente`, `watt_fuente`, `tamano_monitor`, `marca_monitor`, `tbl_tipo_monitor_id_tipo_monitor`, `marca_dd`, `capacidad_dd`, `serial_dd`, `tbl_tipo_dd_id_tipo_dd`, `marca_board`, `serie_board`, `capacidad_ram`, `tbl_tipo_ram_id_tipo_ram`, `velocidad_ram`, `ramas_expansion`, `tarjetas_expansion`, `foto`, `software`, `observaciones`, `tbl_clientes_id_cliente`) VALUES
(10, 2, 54, 0, 3, '2018-11-06', 0, '2018-11-06', '0000-00-00', 1, 1, 0, 0, '', 0, 0, '', 0, '0', 0, '', 3, 1, '', '', '45', '4554', '', '', 1, '', '', '', 3, '', '', 0, 2, '', '', '', 'fotos/2018_11_22_20_56_32descarga.jpg', 'dsadsad', '', 9),
(11, 14, 5, 0, 3, '2018-11-06', 88000, '2018-11-27', '0000-00-00', 1, 0, 0, 0, '', 0, 0, '', 0, '0', 0, '', 3, 1, '', '', '', '', '', '', 2, 'Multi', '1 Tera', '102', 4, 'asRock', '7474744', 0, 3, '', '', '', NULL, '', '', 12);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tbl_marcas`
--

CREATE TABLE `tbl_marcas` (
  `id_marca` int(11) NOT NULL,
  `nombre_marca` varchar(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `tbl_marcas`
--

INSERT INTO `tbl_marcas` (`id_marca`, `nombre_marca`) VALUES
(5, 'Hewelt - Packard');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tbl_perfil`
--

CREATE TABLE `tbl_perfil` (
  `id_perfil` int(11) NOT NULL,
  `nombre_perfil` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `tbl_perfil`
--

INSERT INTO `tbl_perfil` (`id_perfil`, `nombre_perfil`) VALUES
(1, 'Administrador'),
(2, 'Cliente');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tbl_tipo_board`
--

CREATE TABLE `tbl_tipo_board` (
  `id_tipo_board` int(11) NOT NULL,
  `nombre_tipo_board` varchar(28) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `tbl_tipo_board`
--

INSERT INTO `tbl_tipo_board` (`id_tipo_board`, `nombre_tipo_board`) VALUES
(3, 'Integrada');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tbl_tipo_dd`
--

CREATE TABLE `tbl_tipo_dd` (
  `id_tipo_dd` int(11) NOT NULL,
  `nombre_tipo_dd` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `tbl_tipo_dd`
--

INSERT INTO `tbl_tipo_dd` (`id_tipo_dd`, `nombre_tipo_dd`) VALUES
(3, 'Mecánico'),
(4, 'Estado Sólido - SSD');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tbl_tipo_fuente`
--

CREATE TABLE `tbl_tipo_fuente` (
  `id_tipo_fuente` int(11) NOT NULL,
  `nombre_fuente_poder` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `tbl_tipo_fuente`
--

INSERT INTO `tbl_tipo_fuente` (`id_tipo_fuente`, `nombre_fuente_poder`) VALUES
(1, 'AT'),
(2, 'ATX 20'),
(4, 'ATX');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tbl_tipo_monitor`
--

CREATE TABLE `tbl_tipo_monitor` (
  `id_tipo_monitor` int(11) NOT NULL,
  `nombre_tipo_monitor` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `tbl_tipo_monitor`
--

INSERT INTO `tbl_tipo_monitor` (`id_tipo_monitor`, `nombre_tipo_monitor`) VALUES
(1, 'TRC - CRT'),
(2, 'Flatron');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tbl_tipo_pc`
--

CREATE TABLE `tbl_tipo_pc` (
  `id_tipo_pc` int(11) NOT NULL,
  `nombre_tipo_pc` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `tbl_tipo_pc`
--

INSERT INTO `tbl_tipo_pc` (`id_tipo_pc`, `nombre_tipo_pc`) VALUES
(3, 'Clon');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tbl_tipo_pc_distribucion`
--

CREATE TABLE `tbl_tipo_pc_distribucion` (
  `id_tipo_pc_distribucion` int(11) NOT NULL,
  `nombre_tipo_distribucion` varchar(45) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `tbl_tipo_pc_distribucion`
--

INSERT INTO `tbl_tipo_pc_distribucion` (`id_tipo_pc_distribucion`, `nombre_tipo_distribucion`) VALUES
(1, 'Portátil - Laptop'),
(2, 'Todo en uno - All in One'),
(3, 'Escritorio - Desktop');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tbl_tipo_ram`
--

CREATE TABLE `tbl_tipo_ram` (
  `id_tipo_ram` int(11) NOT NULL,
  `nombre_tipo_ram` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `tbl_tipo_ram`
--

INSERT INTO `tbl_tipo_ram` (`id_tipo_ram`, `nombre_tipo_ram`) VALUES
(2, 'DDR1'),
(3, 'DDR2'),
(7, 'DDR3'),
(8, 'DDR4');

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `tbl_clientes`
--
ALTER TABLE `tbl_clientes`
  ADD PRIMARY KEY (`id_cliente`),
  ADD KEY `fk_tbl_clientes_tbl_perfil1_idx` (`tbl_perfil_id_perfil`);

--
-- Indices de la tabla `tbl_dependencias`
--
ALTER TABLE `tbl_dependencias`
  ADD PRIMARY KEY (`id_dependencia`);

--
-- Indices de la tabla `tbl_hoja_vida`
--
ALTER TABLE `tbl_hoja_vida`
  ADD PRIMARY KEY (`id_hoja_vida`),
  ADD KEY `fk_tbl_hoja_vida_tbl_dependencias_idx` (`tbl_dependencias_id_dependencia`),
  ADD KEY `fk_tbl_hoja_vida_tbl_tipo_pc1_idx` (`tbl_tipo_pc_id_tipo_pc`),
  ADD KEY `fk_tbl_hoja_vida_tbl_tipo_pc_distribucion1_idx` (`tbl_tipo_pc_distribucion_id_tipo_pc_distribucion`),
  ADD KEY `fk_tbl_hoja_vida_tbl_marcas1_idx` (`tbl_marcas_id_marca`),
  ADD KEY `fk_tbl_hoja_vida_tbl_tipo_board1_idx` (`tbl_tipo_board_id_tipo_board`),
  ADD KEY `fk_tbl_hoja_vida_tbl_tipo_fuente1_idx` (`tbl_tipo_fuente_id_tipo_fuente`),
  ADD KEY `fk_tbl_hoja_vida_tbl_tipo_monitor1_idx` (`tbl_tipo_monitor_id_tipo_monitor`),
  ADD KEY `fk_tbl_hoja_vida_tbl_tipo_dd1_idx` (`tbl_tipo_dd_id_tipo_dd`),
  ADD KEY `fk_tbl_hoja_vida_tbl_tipo_ram1_idx` (`tbl_tipo_ram_id_tipo_ram`),
  ADD KEY `fk_tbl_hoja_vida_tbl_clientes1_idx` (`tbl_clientes_id_cliente`);

--
-- Indices de la tabla `tbl_marcas`
--
ALTER TABLE `tbl_marcas`
  ADD PRIMARY KEY (`id_marca`);

--
-- Indices de la tabla `tbl_perfil`
--
ALTER TABLE `tbl_perfil`
  ADD PRIMARY KEY (`id_perfil`);

--
-- Indices de la tabla `tbl_tipo_board`
--
ALTER TABLE `tbl_tipo_board`
  ADD PRIMARY KEY (`id_tipo_board`);

--
-- Indices de la tabla `tbl_tipo_dd`
--
ALTER TABLE `tbl_tipo_dd`
  ADD PRIMARY KEY (`id_tipo_dd`);

--
-- Indices de la tabla `tbl_tipo_fuente`
--
ALTER TABLE `tbl_tipo_fuente`
  ADD PRIMARY KEY (`id_tipo_fuente`);

--
-- Indices de la tabla `tbl_tipo_monitor`
--
ALTER TABLE `tbl_tipo_monitor`
  ADD PRIMARY KEY (`id_tipo_monitor`);

--
-- Indices de la tabla `tbl_tipo_pc`
--
ALTER TABLE `tbl_tipo_pc`
  ADD PRIMARY KEY (`id_tipo_pc`);

--
-- Indices de la tabla `tbl_tipo_pc_distribucion`
--
ALTER TABLE `tbl_tipo_pc_distribucion`
  ADD PRIMARY KEY (`id_tipo_pc_distribucion`);

--
-- Indices de la tabla `tbl_tipo_ram`
--
ALTER TABLE `tbl_tipo_ram`
  ADD PRIMARY KEY (`id_tipo_ram`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `tbl_clientes`
--
ALTER TABLE `tbl_clientes`
  MODIFY `id_cliente` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;
--
-- AUTO_INCREMENT de la tabla `tbl_dependencias`
--
ALTER TABLE `tbl_dependencias`
  MODIFY `id_dependencia` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;
--
-- AUTO_INCREMENT de la tabla `tbl_hoja_vida`
--
ALTER TABLE `tbl_hoja_vida`
  MODIFY `id_hoja_vida` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;
--
-- AUTO_INCREMENT de la tabla `tbl_marcas`
--
ALTER TABLE `tbl_marcas`
  MODIFY `id_marca` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;
--
-- AUTO_INCREMENT de la tabla `tbl_perfil`
--
ALTER TABLE `tbl_perfil`
  MODIFY `id_perfil` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT de la tabla `tbl_tipo_board`
--
ALTER TABLE `tbl_tipo_board`
  MODIFY `id_tipo_board` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
--
-- AUTO_INCREMENT de la tabla `tbl_tipo_dd`
--
ALTER TABLE `tbl_tipo_dd`
  MODIFY `id_tipo_dd` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
--
-- AUTO_INCREMENT de la tabla `tbl_tipo_fuente`
--
ALTER TABLE `tbl_tipo_fuente`
  MODIFY `id_tipo_fuente` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
--
-- AUTO_INCREMENT de la tabla `tbl_tipo_monitor`
--
ALTER TABLE `tbl_tipo_monitor`
  MODIFY `id_tipo_monitor` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT de la tabla `tbl_tipo_pc`
--
ALTER TABLE `tbl_tipo_pc`
  MODIFY `id_tipo_pc` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
--
-- AUTO_INCREMENT de la tabla `tbl_tipo_pc_distribucion`
--
ALTER TABLE `tbl_tipo_pc_distribucion`
  MODIFY `id_tipo_pc_distribucion` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
--
-- AUTO_INCREMENT de la tabla `tbl_tipo_ram`
--
ALTER TABLE `tbl_tipo_ram`
  MODIFY `id_tipo_ram` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;
--
-- Restricciones para tablas volcadas
--

--
-- Filtros para la tabla `tbl_clientes`
--
ALTER TABLE `tbl_clientes`
  ADD CONSTRAINT `fk_tbl_clientes_tbl_perfil1` FOREIGN KEY (`tbl_perfil_id_perfil`) REFERENCES `tbl_perfil` (`id_perfil`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Filtros para la tabla `tbl_hoja_vida`
--
ALTER TABLE `tbl_hoja_vida`
  ADD CONSTRAINT `fk_tbl_hoja_vida_tbl_clientes1` FOREIGN KEY (`tbl_clientes_id_cliente`) REFERENCES `tbl_clientes` (`id_cliente`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `fk_tbl_hoja_vida_tbl_dependencias` FOREIGN KEY (`tbl_dependencias_id_dependencia`) REFERENCES `tbl_dependencias` (`id_dependencia`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `fk_tbl_hoja_vida_tbl_tipo_board1` FOREIGN KEY (`tbl_tipo_board_id_tipo_board`) REFERENCES `tbl_tipo_board` (`id_tipo_board`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `fk_tbl_hoja_vida_tbl_tipo_dd1` FOREIGN KEY (`tbl_tipo_dd_id_tipo_dd`) REFERENCES `tbl_tipo_dd` (`id_tipo_dd`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `fk_tbl_hoja_vida_tbl_tipo_fuente1` FOREIGN KEY (`tbl_tipo_fuente_id_tipo_fuente`) REFERENCES `tbl_tipo_fuente` (`id_tipo_fuente`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `fk_tbl_hoja_vida_tbl_tipo_monitor1` FOREIGN KEY (`tbl_tipo_monitor_id_tipo_monitor`) REFERENCES `tbl_tipo_monitor` (`id_tipo_monitor`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `fk_tbl_hoja_vida_tbl_tipo_pc1` FOREIGN KEY (`tbl_tipo_pc_id_tipo_pc`) REFERENCES `tbl_tipo_pc` (`id_tipo_pc`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `fk_tbl_hoja_vida_tbl_tipo_pc_distribucion1` FOREIGN KEY (`tbl_tipo_pc_distribucion_id_tipo_pc_distribucion`) REFERENCES `tbl_tipo_pc_distribucion` (`id_tipo_pc_distribucion`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `fk_tbl_hoja_vida_tbl_tipo_ram1` FOREIGN KEY (`tbl_tipo_ram_id_tipo_ram`) REFERENCES `tbl_tipo_ram` (`id_tipo_ram`) ON DELETE NO ACTION ON UPDATE NO ACTION;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
