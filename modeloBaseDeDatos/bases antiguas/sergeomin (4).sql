-- phpMyAdmin SQL Dump
-- version 4.2.7.1
-- http://www.phpmyadmin.net
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 29-10-2017 a las 21:23:01
-- Versión del servidor: 5.5.39
-- Versión de PHP: 5.4.31

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Base de datos: `sergeomin`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `cliente`
--

CREATE TABLE IF NOT EXISTS `cliente` (
  `id_cliente` int(11) NOT NULL,
  `nombre_empresa` varchar(45) DEFAULT NULL,
  `numero_ci` varchar(15) DEFAULT NULL,
  `nombre_responsable` varchar(45) DEFAULT NULL,
  `nit` varchar(15) DEFAULT NULL,
  `direccion` varchar(255) DEFAULT NULL,
  `numero_celular` varchar(15) DEFAULT NULL,
  `numero_telefono` varchar(15) DEFAULT NULL,
  `departamento` varchar(15) DEFAULT NULL,
  `email` varchar(100) DEFAULT NULL,
  `id_usuario` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `cotizacion`
--

CREATE TABLE IF NOT EXISTS `cotizacion` (
`id_cotizacion` int(11) NOT NULL,
  `tipo_cotizacion` varchar(45) DEFAULT NULL,
  `elemento` varchar(45) DEFAULT NULL,
  `metodo` varchar(45) DEFAULT NULL,
  `limite_deteccion` decimal(8,3) DEFAULT NULL,
  `unidades` varchar(15) DEFAULT NULL,
  `precio_unitario` decimal(5,2) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `empleado`
--

CREATE TABLE IF NOT EXISTS `empleado` (
`id_empleado` int(11) NOT NULL,
  `nombre` varchar(45) NOT NULL,
  `apellido_paterno` varchar(45) DEFAULT NULL,
  `apellido_materno` varchar(45) DEFAULT NULL,
  `estado` char(1) NOT NULL DEFAULT 'A',
  `fecha_creacion` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=6 ;

--
-- Volcado de datos para la tabla `empleado`
--

INSERT INTO `empleado` (`id_empleado`, `nombre`, `apellido_paterno`, `apellido_materno`, `estado`, `fecha_creacion`) VALUES
(1, 'Marina', 'Robles', 'Baltazar', 'A', '0000-00-00 00:00:00'),
(2, 'Juan Carlos', 'Lopez', 'Mamani', 'A', '0000-00-00 00:00:00'),
(3, 'Gladys', 'Villca', 'Chavez', 'A', '0000-00-00 00:00:00'),
(4, 'Prueba', 'Emplead', '', 'I', '0000-00-00 00:00:00'),
(5, 'PruebaB', 'Empleado', '', 'A', '2017-10-29 20:01:01');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `ensayo`
--

CREATE TABLE IF NOT EXISTS `ensayo` (
`id_ensayo` int(11) NOT NULL,
  `id_solicitud_analisis_lq` int(11) NOT NULL,
  `letra_asignacion` char(1) DEFAULT NULL,
  `fecha_registro` timestamp NULL DEFAULT NULL,
  `metodo` varchar(45) DEFAULT NULL,
  `equipo` varchar(45) DEFAULT NULL,
  `id_prueba_lab_quimico` int(11) NOT NULL,
  `id_tecnico` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `prueba_lab_quimico`
--

CREATE TABLE IF NOT EXISTS `prueba_lab_quimico` (
`id_prueba_lab_quimico` int(11) NOT NULL,
  `numero_analisis` int(11) DEFAULT NULL,
  `codigo_muestra_cliente` varchar(45) DEFAULT NULL,
  `id_cotizacion` int(11) NOT NULL,
  `id_cliente` int(11) NOT NULL,
  `id_solicitud_analisis_lq` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `rol`
--

CREATE TABLE IF NOT EXISTS `rol` (
`id_rol` int(11) NOT NULL,
  `rol` varchar(15) NOT NULL
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=3 ;

--
-- Volcado de datos para la tabla `rol`
--

INSERT INTO `rol` (`id_rol`, `rol`) VALUES
(2, 'Jefe Regional'),
(1, 'Recepcionista');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `roles_usuario`
--

CREATE TABLE IF NOT EXISTS `roles_usuario` (
  `id_usuario` int(11) NOT NULL,
  `id_rol` int(11) NOT NULL,
  `fecha_registro` datetime DEFAULT NULL,
  `estado` tinyint(1) NOT NULL DEFAULT '1'
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `roles_usuario`
--

INSERT INTO `roles_usuario` (`id_usuario`, `id_rol`, `fecha_registro`, `estado`) VALUES
(1, 1, '2017-08-20 00:00:00', 1),
(2, 2, '2017-08-20 00:00:00', 1);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `solicitud_analisis_lq`
--

CREATE TABLE IF NOT EXISTS `solicitud_analisis_lq` (
  `id_solicitud_analisis_lq` int(11) NOT NULL,
  `numero_orden` int(11) NOT NULL,
  `cantidad_muestras` int(11) DEFAULT NULL,
  `tipo_muestras` varchar(45) DEFAULT NULL,
  `procedencia` varchar(45) DEFAULT NULL,
  `fecha_recepcion` timestamp NULL DEFAULT NULL,
  `fecha_entrega` timestamp NULL DEFAULT NULL,
  `numero_hoja_ruta` varchar(10) DEFAULT NULL,
  `id_usuario` int(11) NOT NULL,
  `id_cliente` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tecnico`
--

CREATE TABLE IF NOT EXISTS `tecnico` (
`id_tecnico` int(11) NOT NULL,
  `estado` char(1) DEFAULT NULL,
  `fecha_registro` timestamp NULL DEFAULT NULL,
  `id_empleado` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `usuario`
--

CREATE TABLE IF NOT EXISTS `usuario` (
`id_usuario` int(11) NOT NULL,
  `usuario` varchar(15) NOT NULL,
  `clave` varchar(32) NOT NULL,
  `id_empleado` int(11) NOT NULL,
  `estado` tinyint(1) NOT NULL DEFAULT '1',
  `fecha_creacion` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=3 ;

--
-- Volcado de datos para la tabla `usuario`
--

INSERT INTO `usuario` (`id_usuario`, `usuario`, `clave`, `id_empleado`, `estado`, `fecha_creacion`) VALUES
(1, 'marina', 'ce5225d01c39d2567bc229501d9e610d', 1, 1, '0000-00-00 00:00:00'),
(2, 'juan', 'a94652aa97c7211ba8954dd15a3cf838', 2, 1, '0000-00-00 00:00:00');

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `cliente`
--
ALTER TABLE `cliente`
 ADD PRIMARY KEY (`id_cliente`), ADD KEY `fk_cliente_usuario1_idx` (`id_usuario`);

--
-- Indices de la tabla `cotizacion`
--
ALTER TABLE `cotizacion`
 ADD PRIMARY KEY (`id_cotizacion`);

--
-- Indices de la tabla `empleado`
--
ALTER TABLE `empleado`
 ADD PRIMARY KEY (`id_empleado`);

--
-- Indices de la tabla `ensayo`
--
ALTER TABLE `ensayo`
 ADD PRIMARY KEY (`id_ensayo`), ADD KEY `fk_ensayo_solicitud_analisis_lq1_idx` (`id_solicitud_analisis_lq`), ADD KEY `fk_ensayo_prueba_lab_quimico1_idx` (`id_prueba_lab_quimico`), ADD KEY `fk_ensayo_tecnico1_idx` (`id_tecnico`);

--
-- Indices de la tabla `prueba_lab_quimico`
--
ALTER TABLE `prueba_lab_quimico`
 ADD PRIMARY KEY (`id_prueba_lab_quimico`), ADD KEY `fk_prueba_lab_quimico_cotizacion1_idx` (`id_cotizacion`), ADD KEY `fk_prueba_lab_quimico_cliente1_idx` (`id_cliente`), ADD KEY `fk_prueba_lab_quimico_solicitud_analisis_lq1_idx` (`id_solicitud_analisis_lq`);

--
-- Indices de la tabla `rol`
--
ALTER TABLE `rol`
 ADD PRIMARY KEY (`id_rol`), ADD UNIQUE KEY `rol_UNIQUE` (`rol`);

--
-- Indices de la tabla `roles_usuario`
--
ALTER TABLE `roles_usuario`
 ADD KEY `fk_roles_usuario_usuario1_idx` (`id_usuario`), ADD KEY `fk_roles_usuario_rol1_idx` (`id_rol`);

--
-- Indices de la tabla `solicitud_analisis_lq`
--
ALTER TABLE `solicitud_analisis_lq`
 ADD PRIMARY KEY (`id_solicitud_analisis_lq`), ADD UNIQUE KEY `numero_orden_UNIQUE` (`numero_orden`), ADD KEY `fk_solicitud_analisis_lq_usuario1_idx` (`id_usuario`), ADD KEY `fk_solicitud_analisis_lq_cliente1_idx` (`id_cliente`);

--
-- Indices de la tabla `tecnico`
--
ALTER TABLE `tecnico`
 ADD PRIMARY KEY (`id_tecnico`), ADD KEY `fk_tecnico_empleado1_idx` (`id_empleado`);

--
-- Indices de la tabla `usuario`
--
ALTER TABLE `usuario`
 ADD PRIMARY KEY (`id_usuario`), ADD UNIQUE KEY `usuario_UNIQUE` (`usuario`), ADD KEY `fk_usuario_empleado_idx` (`id_empleado`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `cotizacion`
--
ALTER TABLE `cotizacion`
MODIFY `id_cotizacion` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT de la tabla `empleado`
--
ALTER TABLE `empleado`
MODIFY `id_empleado` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=6;
--
-- AUTO_INCREMENT de la tabla `ensayo`
--
ALTER TABLE `ensayo`
MODIFY `id_ensayo` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT de la tabla `prueba_lab_quimico`
--
ALTER TABLE `prueba_lab_quimico`
MODIFY `id_prueba_lab_quimico` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT de la tabla `rol`
--
ALTER TABLE `rol`
MODIFY `id_rol` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT de la tabla `tecnico`
--
ALTER TABLE `tecnico`
MODIFY `id_tecnico` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT de la tabla `usuario`
--
ALTER TABLE `usuario`
MODIFY `id_usuario` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=3;
--
-- Restricciones para tablas volcadas
--

--
-- Filtros para la tabla `cliente`
--
ALTER TABLE `cliente`
ADD CONSTRAINT `fk_cliente_usuario1` FOREIGN KEY (`id_usuario`) REFERENCES `usuario` (`id_usuario`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Filtros para la tabla `ensayo`
--
ALTER TABLE `ensayo`
ADD CONSTRAINT `fk_ensayo_prueba_lab_quimico1` FOREIGN KEY (`id_prueba_lab_quimico`) REFERENCES `prueba_lab_quimico` (`id_prueba_lab_quimico`) ON DELETE NO ACTION ON UPDATE NO ACTION,
ADD CONSTRAINT `fk_ensayo_solicitud_analisis_lq1` FOREIGN KEY (`id_solicitud_analisis_lq`) REFERENCES `solicitud_analisis_lq` (`id_solicitud_analisis_lq`) ON DELETE NO ACTION ON UPDATE NO ACTION,
ADD CONSTRAINT `fk_ensayo_tecnico1` FOREIGN KEY (`id_tecnico`) REFERENCES `tecnico` (`id_tecnico`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Filtros para la tabla `prueba_lab_quimico`
--
ALTER TABLE `prueba_lab_quimico`
ADD CONSTRAINT `fk_prueba_lab_quimico_cliente1` FOREIGN KEY (`id_cliente`) REFERENCES `cliente` (`id_cliente`) ON DELETE NO ACTION ON UPDATE NO ACTION,
ADD CONSTRAINT `fk_prueba_lab_quimico_cotizacion1` FOREIGN KEY (`id_cotizacion`) REFERENCES `cotizacion` (`id_cotizacion`) ON DELETE NO ACTION ON UPDATE NO ACTION,
ADD CONSTRAINT `fk_prueba_lab_quimico_solicitud_analisis_lq1` FOREIGN KEY (`id_solicitud_analisis_lq`) REFERENCES `solicitud_analisis_lq` (`id_solicitud_analisis_lq`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Filtros para la tabla `roles_usuario`
--
ALTER TABLE `roles_usuario`
ADD CONSTRAINT `fk_roles_usuario_rol1` FOREIGN KEY (`id_rol`) REFERENCES `rol` (`id_rol`) ON DELETE NO ACTION ON UPDATE NO ACTION,
ADD CONSTRAINT `fk_roles_usuario_usuario1` FOREIGN KEY (`id_usuario`) REFERENCES `usuario` (`id_usuario`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Filtros para la tabla `solicitud_analisis_lq`
--
ALTER TABLE `solicitud_analisis_lq`
ADD CONSTRAINT `fk_solicitud_analisis_lq_cliente1` FOREIGN KEY (`id_cliente`) REFERENCES `cliente` (`id_cliente`) ON DELETE NO ACTION ON UPDATE NO ACTION,
ADD CONSTRAINT `fk_solicitud_analisis_lq_usuario1` FOREIGN KEY (`id_usuario`) REFERENCES `usuario` (`id_usuario`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Filtros para la tabla `tecnico`
--
ALTER TABLE `tecnico`
ADD CONSTRAINT `fk_tecnico_empleado1` FOREIGN KEY (`id_empleado`) REFERENCES `empleado` (`id_empleado`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Filtros para la tabla `usuario`
--
ALTER TABLE `usuario`
ADD CONSTRAINT `fk_usuario_empleado` FOREIGN KEY (`id_empleado`) REFERENCES `empleado` (`id_empleado`) ON DELETE NO ACTION ON UPDATE NO ACTION;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
