CREATE SCHEMA IF NOT EXISTS horarios DEFAULT CHARACTER SET utf8 COLLATE utf8_general_ci ;
USE horarios;

-- -----------------------------------------------------
-- DROP TABLES
-- -----------------------------------------------------
DROP TABLE IF EXISTS materia_usuario;
DROP TABLE IF EXISTS materias;
DROP TABLE IF EXISTS plan_estudios;
DROP TABLE IF EXISTS disponibilidad;
DROP TABLE IF EXISTS usuarios;
DROP TABLE IF EXISTS carrera;

-- -----------------------------------------------------
-- Table `carrera`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS carrera (
  idcarrera TINYINT NOT NULL AUTO_INCREMENT PRIMARY KEY,
  nombre_carrera VARCHAR(100) NOT NULL
) ENGINE = InnoDB;

INSERT INTO carrera (idcarrera, nombre_carrera) VALUES (NULL,'Ingeniería en Tecnologías de la Información');
INSERT INTO carrera (idcarrera, nombre_carrera) VALUES (NULL,'Ingeniería en Mecatrónica');
INSERT INTO carrera (idcarrera, nombre_carrera) VALUES (NULL,'Ingeniería en Sistemas Automotrices');
INSERT INTO carrera (idcarrera, nombre_carrera) VALUES (NULL,'Ingeniería en Manufactura');
INSERT INTO carrera (idcarrera, nombre_carrera) VALUES (NULL,'Licenciatura en Administración y Gestión de PyMEs');


-- -----------------------------------------------------
-- Table `usarios`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS usuarios (
  clv_usuario VARCHAR(50) NOT NULL PRIMARY KEY,
  pass_usuario CHAR(41) NOT NULL,
  tipo_usuario CHAR(4) NOT NULL DEFAULT 'PROF' CHECK (tipo_usuario IN ('PROF', 'ADMI', 'DIRE')),
  idcarrera TINYINT NOT NULL,
  nombre_usuario VARCHAR(50) NOT NULL,
  nivel_ads VARCHAR(5) NOT NULL DEFAULT 'Ing.' CHECK (nivel_ads IN ('Dr.', 'M.C', 'Ing.', 'Lic.')),
  contrato VARCHAR(3) NOT NULL DEFAULT 'PA' CHECK (contrato IN ('PTC', 'PA')),
  CONSTRAINT carrera_usuario_FK FOREIGN KEY (idcarrera) REFERENCES carrera (idcarrera) ON DELETE CASCADE ON UPDATE CASCADE)
ENGINE = InnoDB;

INSERT INTO usuarios VALUES ('spolancom@upv.edu.mx', password('hola'), 'ADMI', 1, 'Said Polanco', 'Dr.', 'PTC');
INSERT INTO usuarios VALUES ('mfloref@upv.edu.mx', password('marina'), 'PROF', 1, 'Marina Flores', 'M.C', 'PA');
INSERT INTO usuarios VALUES ('fake1@upv.edu.mx', password('fake1'), 'PROF', 3, 'juan benancio', 'Lic.', 'PA');
INSERT INTO usuarios VALUES ('yhernandezm@upv.edu.mx',password('yahir'), 'DIRE',2, 'Yahir Hernandez', 'Dr.', 'PTC');


-- -----------------------------------------------------
-- Table 'disponibilidad'
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS disponibilidad (
  dia TINYINT NOT NULL DEFAULT 1 CHECK (dia IN (1, 2, 3, 4, 5, 6)),
  espacio_tiempo TINYINT NOT NULL CHECK (espacio_tiempo IN (1, 2, 3, 4, 5, 6, 7, 8, 9, 10, 11, 12, 13, 14)),
  clv_usuario VARCHAR(50) NOT NULL,
  CONSTRAINT usuarios_disponibilidad_FK FOREIGN KEY (clv_usuario) REFERENCES usuarios(clv_usuario) ON DELETE CASCADE ON UPDATE CASCADE
)ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `plan_estudios`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS plan_estudios (
  clv_plan VARCHAR(10) NOT NULL PRIMARY KEY,
  nombre_plan VARCHAR(45) NOT NULL,
  nivel VARCHAR(3) NOT NULL DEFAULT 'ING' CHECK (nivel IN ('ING','LIC','PA','MI')),
  idcarrera TINYINT NOT NULL,
  CONSTRAINT carrera_planEstudios_FK FOREIGN KEY (idcarrera) REFERENCES carrera (idcarrera) ON DELETE NO ACTION ON UPDATE NO ACTION)
ENGINE = InnoDB;

INSERT INTO plan_estudios VALUES ('iti-2010', 'Ingenierío en Tecnologías de la Información','ING',1);
INSERT INTO plan_estudios VALUES ('PAR-2010', 'Profesional Asociado en redes y programación','PA',1);

-- -----------------------------------------------------
-- Table `materias`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS materias (
  clv_materia VARCHAR(10) NOT NULL,
  nombre_materia VARCHAR(50) NOT NULL,
  creditos TINYINT NULL,
  cuatrimestre TINYINT NOT NULL,
  posicion TINYINT NOT NULL,
  clv_plan VARCHAR(10) NOT NULL,
  tipo_materia CHAR(3) NOT NULL DEFAULT 'ESP' CHECK (tipo_materia IN ('ESP','TRC','CIB')),
  PRIMARY KEY (clv_plan, clv_materia),
  CONSTRAINT planEstudios_materia_FK FOREIGN KEY (clv_plan) REFERENCES plan_estudios (clv_plan) ON DELETE CASCADE ON UPDATE CASCADE)
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `materia_usuario`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS materia_usuario (
  clv_materia VARCHAR(10) NOT NULL,
  clv_plan VARCHAR(10) NOT NULL,
  clv_usuario VARCHAR(50) NOT NULL,
  puntos_confianza TINYINT NULL DEFAULT 0,
  puntos_director TINYINT NULL DEFAULT 0,
  PRIMARY KEY (clv_plan, clv_materia, clv_usuario),
  CONSTRAINT materia_materiaUsiario_FK FOREIGN KEY (clv_plan,clv_materia) REFERENCES materias (clv_plan,clv_materia) ON DELETE CASCADE ON UPDATE CASCADE,
  CONSTRAINT usuario_materiaUsuario_FK FOREIGN KEY (clv_usuario) REFERENCES usuarios (clv_usuario) ON DELETE CASCADE ON UPDATE CASCADE
  ) ENGINE = InnoDB;
  
-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `aulas`
--

CREATE TABLE IF NOT EXISTS `aulas` (
  `id` varchar(10) NOT NULL,
  `nombre` varchar(100) NOT NULL,
  `tipo` varchar(20) NOT NULL,
  `capacidad` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `aula_equipo`
--

CREATE TABLE IF NOT EXISTS `aula_equipo` (
  `id_equipo` int(11) NOT NULL,
  `id_aula` varchar(10) NOT NULL,
  `cantidad` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;


-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `categorias_equipo`
--

CREATE TABLE IF NOT EXISTS `categorias_equipo` (
  `id` int(11) NOT NULL,
  `nombre` varchar(100) NOT NULL,
  `descripcion` varchar(300) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `equipo`
--

CREATE TABLE IF NOT EXISTS `equipo` (
  `id` int(11) NOT NULL,
  `nombre` varchar(100) NOT NULL,
  `descripcion` varchar(300) NOT NULL,
  `id_categoria` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

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
  
-- Indices de la tabla `categorias_equipo`
--
ALTER TABLE `categorias_equipo`
  ADD PRIMARY KEY (`id`);
  
-- Indices de la tabla `equipo`
--
ALTER TABLE `equipo`
  ADD PRIMARY KEY (`id`),
  ADD KEY `id_categoria` (`id_categoria`);
  
-- AUTO_INCREMENT de la tabla `categorias_equipo`
--
ALTER TABLE `categorias_equipo`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `equipo`
--
ALTER TABLE `equipo`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

-- Filtros para la tabla `aula_equipo`
--
ALTER TABLE `aula_equipo`
  ADD CONSTRAINT `aula_equipo_ibfk_1` FOREIGN KEY (`id_equipo`) REFERENCES `equipo` (`id`),
  ADD CONSTRAINT `aula_equipo_ibfk_2` FOREIGN KEY (`id_aula`) REFERENCES `aulas` (`id`);

-- Filtros para la tabla `equipo`
--
ALTER TABLE `equipo`
  ADD CONSTRAINT `equipo_ibfk_1` FOREIGN KEY (`id_categoria`) REFERENCES `categorias_equipo` (`id`);


-- --------------------------------------------------------

DROP USER IF EXISTS 'default'@'localhost';
CREATE USER 'default'@'localhost' IDENTIFIED BY 'WV2JLVcY';
REVOKE ALL ON *.* FROM 'default'@'localhost';
GRANT SELECT ON horarios.usuarios TO 'default'@'localhost';

DROP USER IF EXISTS 'admi'@'localhost';
CREATE USER 'admi'@'localhost' IDENTIFIED BY 'TaLs8D3s';
REVOKE ALL ON *.* FROM 'admi'@'localhost';
GRANT ALL ON horarios.* TO 'admi'@'localhost';

DROP USER IF EXISTS 'dire'@'localhost';
CREATE USER 'dire'@'localhost' IDENTIFIED BY 'wTbTyt9D';
REVOKE ALL ON *.* FROM 'dire'@'localhost';
GRANT SELECT, INSERT, UPDATE, DELETE ON horarios.usuarios TO 'dire'@'localhost';
GRANT SELECT, INSERT, UPDATE, DELETE ON horarios.carrera TO 'dire'@'localhost';
GRANT SELECT, INSERT, UPDATE, DELETE ON horarios.disponibilidad TO 'dire'@'localhost';
GRANT SELECT, INSERT, UPDATE, DELETE ON horarios.plan_estudios TO 'dire'@'localhost';
GRANT SELECT, INSERT, UPDATE, DELETE ON horarios.materias TO 'dire'@'localhost';
GRANT SELECT, INSERT, UPDATE, DELETE ON horarios.materia_usuario TO 'dire'@'localhost';
GRANT SELECT, INSERT, UPDATE, DELETE ON horarios.aula_equipo TO 'dire'@'localhost';
GRANT SELECT, INSERT, UPDATE, DELETE ON horarios.aulas TO 'dire'@'localhost';
GRANT SELECT, INSERT, UPDATE, DELETE ON horarios.categorias_equipo TO 'dire'@'localhost';
GRANT SELECT, INSERT, UPDATE, DELETE ON horarios.equipo TO 'dire'@'localhost';

DROP USER IF EXISTS 'prof'@'localhost';
CREATE USER 'prof'@'localhost' IDENTIFIED BY 'vjeB6x7C';
REVOKE ALL ON *.* FROM 'prof'@'localhost';
GRANT SELECT ON horarios.usuarios TO 'prof'@'localhost';
GRANT INSERT, SELECT, UPDATE, DELETE ON horarios.disponibilidad TO 'prof'@'localhost';
GRANT SELECT ON horarios.plan_estudios TO 'prof'@'localhost';
GRANT SELECT ON horarios.materias TO 'prof'@'localhost';
GRANT SELECT, INSERT, UPDATE, DELETE ON horarios.materia_usuario TO 'prof'@'localhost';
