-- phpMyAdmin SQL Dump
-- version 4.8.3
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 15-11-2018 a las 06:04:39
-- Versión del servidor: 10.1.36-MariaDB
-- Versión de PHP: 7.2.11

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `mydb`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `asignacion_pregunta`
--

CREATE TABLE `asignacion_pregunta` (
  `id_cuestionario` int(11) NOT NULL,
  `id_estudio` int(11) NOT NULL,
  `id_reactivo` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `cuestionario`
--

CREATE TABLE `cuestionario` (
  `id_cuestionario` int(11) NOT NULL,
  `estudio_id_estudio` int(11) NOT NULL,
  `Nombre_cuestionario` varchar(45) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `estudio`
--

CREATE TABLE `estudio` (
  `id_estudio` int(11) NOT NULL,
  `Nombre_estudio` varchar(45) NOT NULL,
  `Descripcion_estudio` varchar(200) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `estudio_asignado`
--

CREATE TABLE `estudio_asignado` (
  `id_usuario` int(11) NOT NULL,
  `id_tipo_usuario` int(11) NOT NULL,
  `id_estudio` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `reactivo`
--

CREATE TABLE `reactivo` (
  `id_reactivo` int(11) NOT NULL,
  `reactivo` varchar(200) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `respuesta`
--

CREATE TABLE `respuesta` (
  `id_respuesta` int(11) NOT NULL,
  `id_reactivo` int(11) NOT NULL,
  `respuesta` varchar(200) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tipo_usuario`
--

CREATE TABLE `tipo_usuario` (
  `id_tipo_usuario` int(11) NOT NULL,
  `Nombre_tipo` varchar(45) NOT NULL,
  `Descripcion_usuario` varchar(200) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `tipo_usuario`
--

INSERT INTO `tipo_usuario` (`id_tipo_usuario`, `Nombre_tipo`, `Descripcion_usuario`) VALUES
(1, 'Administrador', 'El administrador es capaz de manejar el sistema, el tiene los privilegios de dar de alta, baja y cambiar a los usuarios existentes en el mismo.'),
(2, 'Analista', 'El analista ingresa a todos los datos disponibles de las encuestas realizadas, puede crear copias y guardarlas pero no puede cambiar los datos.'),
(3, 'Encuestador', 'El encuestador puede ser asignado por el administrador para realizar encuestas, no puede modificar ningún dato y solo puede visualizar sus estudios asignados.');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `usuario`
--



CREATE TABLE IF NOT EXISTS `usuarios` (
  `id_usuario` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `nombre_usuario` varchar(255) NOT NULL DEFAULT '',
  `email` varchar(255) NOT NULL DEFAULT '',
  `password` varchar(255) NOT NULL DEFAULT '',
  `nombre` varchar(255) NOT NULL DEFAULT '',
  `apellido` varchar(255) NOT NULL DEFAULT '',
  `id_tipo_usuario` int(11) NOT NULL,
  PRIMARY KEY (`id_usuario`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;
--
-- Volcado de datos para la tabla `usuario`
--

INSERT INTO `usuario` (`id_usuario`, `id_tipo_usuario`, `Nombre(s)`, `Apellido(s)`, `password`, `nombre_usuario`, `correo`, `telefono`) VALUES
(5322, 2, 'Javier', 'Arias', 'FoRtNiTe001', 'Javi_Ari', 'javier_arias@gmail.com', 227983333),
(5477, 1, 'Luis Alfredo ', 'Perez Mendoza', 'ingenieria123', 'blsckzero077', 'luis_zerosow7@hotmail.com', 227988454);

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `asignacion_pregunta`
--
ALTER TABLE `asignacion_pregunta`
  ADD PRIMARY KEY (`id_cuestionario`,`id_estudio`,`id_reactivo`),
  ADD KEY `fk_asignacion_pregunta_cuestionario1_idx` (`id_cuestionario`,`id_estudio`),
  ADD KEY `fk_asignacion_pregunta_reactivo1_idx` (`id_reactivo`);

--
-- Indices de la tabla `cuestionario`
--
ALTER TABLE `cuestionario`
  ADD PRIMARY KEY (`id_cuestionario`,`estudio_id_estudio`),
  ADD KEY `fk_cuestionario_estudio1_idx` (`estudio_id_estudio`);

--
-- Indices de la tabla `estudio`
--
ALTER TABLE `estudio`
  ADD PRIMARY KEY (`id_estudio`);

--
-- Indices de la tabla `estudio_asignado`
--
ALTER TABLE `estudio_asignado`
  ADD PRIMARY KEY (`id_usuario`,`id_tipo_usuario`,`id_estudio`),
  ADD KEY `fk_estudio_asignado_usuario1_idx` (`id_usuario`,`id_tipo_usuario`),
  ADD KEY `fk_estudio_asignado_estudio1_idx` (`id_estudio`);

--
-- Indices de la tabla `reactivo`
--
ALTER TABLE `reactivo`
  ADD PRIMARY KEY (`id_reactivo`);

--
-- Indices de la tabla `respuesta`
--
ALTER TABLE `respuesta`
  ADD PRIMARY KEY (`id_respuesta`,`id_reactivo`),
  ADD KEY `fk_respuesta_reactivo1_idx` (`id_reactivo`);

--
-- Indices de la tabla `tipo_usuario`
--
ALTER TABLE `tipo_usuario`
  ADD PRIMARY KEY (`id_tipo_usuario`);

--
-- Indices de la tabla `usuario`
--
ALTER TABLE `usuario`
  ADD PRIMARY KEY (`id_usuario`,`id_tipo_usuario`),
  ADD KEY `fk_usuario_tipo_usuario_idx` (`id_tipo_usuario`);

--
-- Restricciones para tablas volcadas
--

--
-- Filtros para la tabla `asignacion_pregunta`
--
ALTER TABLE `asignacion_pregunta`
  ADD CONSTRAINT `fk_asignacion_pregunta_cuestionario1` FOREIGN KEY (`id_cuestionario`,`id_estudio`) REFERENCES `cuestionario` (`id_cuestionario`, `estudio_id_estudio`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `fk_asignacion_pregunta_reactivo1` FOREIGN KEY (`id_reactivo`) REFERENCES `reactivo` (`id_reactivo`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Filtros para la tabla `cuestionario`
--
ALTER TABLE `cuestionario`
  ADD CONSTRAINT `fk_cuestionario_estudio1` FOREIGN KEY (`estudio_id_estudio`) REFERENCES `estudio` (`id_estudio`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Filtros para la tabla `estudio_asignado`
--
ALTER TABLE `estudio_asignado`
  ADD CONSTRAINT `fk_estudio_asignado_estudio1` FOREIGN KEY (`id_estudio`) REFERENCES `estudio` (`id_estudio`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `fk_estudio_asignado_usuario1` FOREIGN KEY (`id_usuario`,`id_tipo_usuario`) REFERENCES `usuario` (`id_usuario`, `id_tipo_usuario`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Filtros para la tabla `respuesta`
--
ALTER TABLE `respuesta`
  ADD CONSTRAINT `fk_respuesta_reactivo1` FOREIGN KEY (`id_reactivo`) REFERENCES `reactivo` (`id_reactivo`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Filtros para la tabla `usuario`
--
ALTER TABLE `usuario`
  ADD CONSTRAINT `fk_usuario_tipo_usuario` FOREIGN KEY (`id_tipo_usuario`) REFERENCES `tipo_usuario` (`id_tipo_usuario`) ON DELETE NO ACTION ON UPDATE NO ACTION;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
