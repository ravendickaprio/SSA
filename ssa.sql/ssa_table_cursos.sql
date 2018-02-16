
-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `cursos`
--

DROP TABLE IF EXISTS `cursos`;
CREATE TABLE IF NOT EXISTS `cursos` (
  `idClave` int(11) NOT NULL AUTO_INCREMENT,
  `idProfesor` int(11) NOT NULL,
  `idMateria` int(11) NOT NULL,
  `parcial` int(3) DEFAULT NULL,
  `parcial2` int(3) DEFAULT NULL,
  `parcial3` int(3) DEFAULT NULL,
  `tareas` int(3) DEFAULT NULL,
  `practicas` int(3) DEFAULT NULL,
  `proyecto` int(3) DEFAULT NULL,
  `otro` int(3) DEFAULT NULL,
  `Seccion` int(11) NOT NULL,
  `NRC` int(11) NOT NULL,
  `Preiodo` varchar(20) NOT NULL,
  `FechaInicio` date NOT NULL,
  `FechaFIn` date NOT NULL,
  `Salon` varchar(10) NOT NULL,
  `Horario` varchar(10) NOT NULL,
  PRIMARY KEY (`idClave`),
  KEY `fk_cursos_profesor_idx` (`idProfesor`),
  KEY `fk_cursos_materia1_idx` (`idMateria`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;
