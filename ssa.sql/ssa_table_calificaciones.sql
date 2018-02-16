
-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `calificaciones`
--

DROP TABLE IF EXISTS `calificaciones`;
CREATE TABLE IF NOT EXISTS `calificaciones` (
  `id` int(11) NOT NULL,
  `idCurso` int(11) NOT NULL,
  `idAlumno` varchar(10) NOT NULL,
  `parcial` float DEFAULT NULL,
  `parcial2` float DEFAULT NULL,
  `parcial3` float DEFAULT NULL,
  `tareas` float DEFAULT NULL,
  `practicas` float DEFAULT NULL,
  `proyecto` float DEFAULT NULL,
  `otro` float DEFAULT NULL,
  `Promedio` float DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `fk_calificaciones_cursos1_idx` (`idCurso`),
  KEY `fk_calificaciones_alumno1_idx` (`idAlumno`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;
