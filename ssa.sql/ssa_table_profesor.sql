
-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `profesor`
--

DROP TABLE IF EXISTS `profesor`;
CREATE TABLE IF NOT EXISTS `profesor` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(50) NOT NULL,
  `mail` varchar(30) NOT NULL,
  `cube` varchar(10) DEFAULT NULL,
  `ext` bigint(8) DEFAULT NULL,
  `pass` varchar(100) NOT NULL,
  `level` tinyint(4) NOT NULL DEFAULT '1',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=2015 DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `profesor`
--

INSERT INTO `profesor` (`id`, `name`, `mail`, `cube`, `ext`, `pass`, `level`) VALUES
(2014, 'Lic Odón David', 'odon@gmail', 'sn', 2221451667, '12345', 2);
