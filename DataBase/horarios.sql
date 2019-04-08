-- phpMyAdmin SQL Dump
-- version 4.8.4
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 28-03-2019 a las 23:59:19
-- Versión del servidor: 10.1.37-MariaDB
-- Versión de PHP: 7.3.1

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `horarios`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `aulas`
--

CREATE TABLE `aulas` (
  `id` varchar(10) NOT NULL,
  `nombre` varchar(100) NOT NULL,
  `tipo` varchar(20) NOT NULL,
  `capacidad` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `aulas`
--

INSERT INTO `aulas` (`id`, `nombre`, `tipo`, `capacidad`) VALUES
('IGR', 'ingeniería requerimientos', 'Aula', 30);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `aula_equipo`
--

CREATE TABLE `aula_equipo` (
  `id` int(11) DEFAULT NULL,
  `id_equipo` int(11) NOT NULL,
  `id_aula` varchar(10) NOT NULL,
  `cantidad` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `carrera`
--

CREATE TABLE `carrera` (
  `idcarrera` tinyint(4) NOT NULL,
  `nombre_carrera` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `carrera`
--

INSERT INTO `carrera` (`idcarrera`, `nombre_carrera`) VALUES
(1, 'Ingeniería en Tecnologías de la Información'),
(2, 'Ingeniería en Mecatrónica'),
(3, 'Ingeniería en Sistemas Automotrices'),
(4, 'Ingeniería en Manufactura'),
(5, 'Licenciatura en Administración y Gestión de PyMEs'),
(6, 'Maestria en Ingenieria');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `categorias_equipo`
--

CREATE TABLE `categorias_equipo` (
  `id` int(11) NOT NULL,
  `nombre` varchar(100) NOT NULL,
  `descripcion` varchar(300) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `categorias_equipo`
--

INSERT INTO `categorias_equipo` (`id`, `nombre`, `descripcion`) VALUES
(9, 'Lab', 'Lab Equipment');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `disponibilidad`
--

CREATE TABLE `disponibilidad` (
  `dia` tinyint(4) NOT NULL DEFAULT '1',
  `espacio_tiempo` tinyint(4) NOT NULL,
  `clv_usuario` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `disponibilidad`
--

INSERT INTO `disponibilidad` (`dia`, `espacio_tiempo`, `clv_usuario`) VALUES
(2, 14, 'yhernandezm@upv.edu.mx'),
(1, 13, 'yhernandezm@upv.edu.mx'),
(1, 12, 'yhernandezm@upv.edu.mx'),
(1, 3, 'yhernandezm@upv.edu.mx'),
(1, 4, 'yhernandezm@upv.edu.mx'),
(2, 2, 'yhernandezm@upv.edu.mx'),
(2, 3, 'yhernandezm@upv.edu.mx'),
(4, 2, 'yhernandezm@upv.edu.mx'),
(4, 3, 'yhernandezm@upv.edu.mx'),
(2, 4, 'jfidenciol@upv.edu.mx'),
(2, 7, 'jfidenciol@upv.edu.mx'),
(5, 9, 'jfidenciol@upv.edu.mx'),
(1, 1, 'yhernandezm@upv.edu.mx'),
(1, 2, 'yhernandezm@upv.edu.mx'),
(3, 2, 'yhernandezm@upv.edu.mx'),
(3, 3, 'yhernandezm@upv.edu.mx'),
(5, 2, 'yhernandezm@upv.edu.mx'),
(5, 3, 'yhernandezm@upv.edu.mx'),
(6, 2, 'yhernandezm@upv.edu.mx'),
(6, 3, 'yhernandezm@upv.edu.mx'),
(1, 5, 'Orozco@upv.edu.mx'),
(1, 10, 'Orozco@upv.edu.mx'),
(5, 10, 'Orozco@upv.edu.mx'),
(2, 10, 'Orozco@upv.edu.mx'),
(6, 10, 'Orozco@upv.edu.mx'),
(6, 5, 'Orozco@upv.edu.mx'),
(4, 14, 'Orozco@upv.edu.mx'),
(3, 1, 'Orozco@upv.edu.mx'),
(4, 1, 'Orozco@upv.edu.mx'),
(2, 3, 'Orozco@upv.edu.mx'),
(5, 3, 'Orozco@upv.edu.mx'),
(3, 5, 'jfidenciol@upv.edu.mx'),
(4, 9, 'jfidenciol@upv.edu.mx'),
(1, 10, 'jfidenciol@upv.edu.mx'),
(1, 4, 'jfidenciol@upv.edu.mx'),
(3, 4, 'jfidenciol@upv.edu.mx'),
(4, 4, 'jfidenciol@upv.edu.mx'),
(5, 4, 'jfidenciol@upv.edu.mx'),
(3, 9, 'Orozco@upv.edu.mx'),
(4, 9, 'Orozco@upv.edu.mx'),
(6, 14, 'Orozco@upv.edu.mx'),
(2, 14, 'Orozco@upv.edu.mx'),
(5, 13, 'Orozco@upv.edu.mx');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `equipo`
--

CREATE TABLE `equipo` (
  `id` int(11) NOT NULL,
  `nombre` varchar(100) NOT NULL,
  `descripcion` varchar(300) NOT NULL,
  `id_categoria` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `equipo`
--

INSERT INTO `equipo` (`id`, `nombre`, `descripcion`, `id_categoria`) VALUES
(5, 'Termos Perdidos', 'El que se le perdió a paola jasjasjajs', 9);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `materias`
--

CREATE TABLE `materias` (
  `clv_materia` varchar(10) NOT NULL,
  `nombre_materia` varchar(50) NOT NULL,
  `creditos` tinyint(4) DEFAULT NULL,
  `cuatrimestre` tinyint(4) NOT NULL,
  `posicion` tinyint(4) NOT NULL,
  `clv_plan` varchar(10) NOT NULL,
  `tipo_materia` char(3) NOT NULL DEFAULT 'ESP'
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `materia_usuario`
--

CREATE TABLE `materia_usuario` (
  `clv_materia` varchar(10) NOT NULL,
  `clv_plan` varchar(10) NOT NULL,
  `clv_usuario` varchar(50) NOT NULL,
  `puntos_confianza` tinyint(4) DEFAULT '0',
  `puntos_director` tinyint(4) DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `plan_estudios`
--

CREATE TABLE `plan_estudios` (
  `clv_plan` varchar(10) NOT NULL,
  `nombre_plan` varchar(45) NOT NULL,
  `nivel` varchar(3) NOT NULL DEFAULT 'ING',
  `idcarrera` tinyint(4) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `plan_estudios`
--

INSERT INTO `plan_estudios` (`clv_plan`, `nombre_plan`, `nivel`, `idcarrera`) VALUES
('iti-2010', 'Ingenierío en Tecnologías de la Información', 'ING', 1),
('PAR-2010', 'Profesional Asociado en redes y programación', 'PA', 1);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `usuarios`
--

CREATE TABLE `usuarios` (
  `clv_usuario` varchar(50) NOT NULL,
  `pass_usuario` char(41) NOT NULL,
  `tipo_usuario` char(4) NOT NULL DEFAULT 'PROF',
  `idcarrera` tinyint(4) NOT NULL,
  `nombre_usuario` varchar(50) NOT NULL,
  `nivel_ads` varchar(5) NOT NULL DEFAULT 'Ing.',
  `contrato` varchar(3) NOT NULL DEFAULT 'PA'
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `usuarios`
--

INSERT INTO `usuarios` (`clv_usuario`, `pass_usuario`, `tipo_usuario`, `idcarrera`, `nombre_usuario`, `nivel_ads`, `contrato`) VALUES
('1630082@upv.edu.mx', '*91BC1288328411CD91142AFF54640EF8C2C6F169', 'DIRE', 2, 'sdzxfcbgnvhj', 'Ing.', 'PTC'),
('admin@upv.edu.mx', '*3F50515DDEE62F18A2B1CE3BE819CFB2F3C869F1', 'ADMI', 1, 'Admin', 'Dr.', 'PTC'),
('jfidenciol@upv.edu.mx', '*48E6BEFFCEC37B0ADB973920E5B5BD164AA5C5D8', 'PROF', 1, 'José FIdencio López Luna', 'M.C', 'PTC'),
('mfloref@upv.edu.mx', '*A0621487AD1362296849869B72843CF4E2B96FAA', 'PROF', 1, 'Marina Flores', 'M.C', 'PA'),
('Orozco@upv.edu.mx', '*8C0F268C9AB9B131EF3386FEA662E6E0F0765342', 'DIRE', 1, 'Orozco', 'Dr.', 'PA'),
('yhernandezm@upv.edu.mx', '*C2103782757CDB9423F71C3884603496C807B9B9', 'DIRE', 6, 'Yahir Hernandez', 'Dr.', 'PTC');

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `aulas`
--
ALTER TABLE `aulas`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `aula_equipo`
--
ALTER TABLE `aula_equipo`
  ADD PRIMARY KEY (`id_equipo`,`id_aula`),
  ADD KEY `id_aula` (`id_aula`);

--
-- Indices de la tabla `carrera`
--
ALTER TABLE `carrera`
  ADD PRIMARY KEY (`idcarrera`);

--
-- Indices de la tabla `categorias_equipo`
--
ALTER TABLE `categorias_equipo`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `disponibilidad`
--
ALTER TABLE `disponibilidad`
  ADD KEY `usuarios_disponibilidad_FK` (`clv_usuario`);

--
-- Indices de la tabla `equipo`
--
ALTER TABLE `equipo`
  ADD PRIMARY KEY (`id`),
  ADD KEY `id_categoria` (`id_categoria`);

--
-- Indices de la tabla `materias`
--
ALTER TABLE `materias`
  ADD PRIMARY KEY (`clv_plan`,`clv_materia`);

--
-- Indices de la tabla `materia_usuario`
--
ALTER TABLE `materia_usuario`
  ADD PRIMARY KEY (`clv_plan`,`clv_materia`,`clv_usuario`),
  ADD KEY `usuario_materiaUsuario_FK` (`clv_usuario`);

--
-- Indices de la tabla `plan_estudios`
--
ALTER TABLE `plan_estudios`
  ADD PRIMARY KEY (`clv_plan`),
  ADD KEY `carrera_planEstudios_FK` (`idcarrera`);

--
-- Indices de la tabla `usuarios`
--
ALTER TABLE `usuarios`
  ADD PRIMARY KEY (`clv_usuario`),
  ADD KEY `carrera_usuario_FK` (`idcarrera`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `carrera`
--
ALTER TABLE `carrera`
  MODIFY `idcarrera` tinyint(4) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT de la tabla `categorias_equipo`
--
ALTER TABLE `categorias_equipo`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT de la tabla `equipo`
--
ALTER TABLE `equipo`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- Restricciones para tablas volcadas
--

--
-- Filtros para la tabla `aula_equipo`
--
ALTER TABLE `aula_equipo`
  ADD CONSTRAINT `aula_equipo_ibfk_1` FOREIGN KEY (`id_equipo`) REFERENCES `equipo` (`id`),
  ADD CONSTRAINT `aula_equipo_ibfk_2` FOREIGN KEY (`id_aula`) REFERENCES `aulas` (`id`);

--
-- Filtros para la tabla `disponibilidad`
--
ALTER TABLE `disponibilidad`
  ADD CONSTRAINT `usuarios_disponibilidad_FK` FOREIGN KEY (`clv_usuario`) REFERENCES `usuarios` (`clv_usuario`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Filtros para la tabla `equipo`
--
ALTER TABLE `equipo`
  ADD CONSTRAINT `equipo_ibfk_1` FOREIGN KEY (`id_categoria`) REFERENCES `categorias_equipo` (`id`);

--
-- Filtros para la tabla `materias`
--
ALTER TABLE `materias`
  ADD CONSTRAINT `planEstudios_materia_FK` FOREIGN KEY (`clv_plan`) REFERENCES `plan_estudios` (`clv_plan`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Filtros para la tabla `materia_usuario`
--
ALTER TABLE `materia_usuario`
  ADD CONSTRAINT `materia_materiaUsiario_FK` FOREIGN KEY (`clv_plan`,`clv_materia`) REFERENCES `materias` (`clv_plan`, `clv_materia`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `usuario_materiaUsuario_FK` FOREIGN KEY (`clv_usuario`) REFERENCES `usuarios` (`clv_usuario`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Filtros para la tabla `plan_estudios`
--
ALTER TABLE `plan_estudios`
  ADD CONSTRAINT `carrera_planEstudios_FK` FOREIGN KEY (`idcarrera`) REFERENCES `carrera` (`idcarrera`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Filtros para la tabla `usuarios`
--
ALTER TABLE `usuarios`
  ADD CONSTRAINT `carrera_usuario_FK` FOREIGN KEY (`idcarrera`) REFERENCES `carrera` (`idcarrera`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
