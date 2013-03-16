SET SQL_MODE="NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";



CREATE TABLE IF NOT EXISTS `candidatos` (
  `id_can` int(11) NOT NULL AUTO_INCREMENT,
  `nom_can` varchar(100) DEFAULT NULL,
  `foto_can` varchar(100) DEFAULT NULL,
  `tipo_can` int(11) NOT NULL,
  `id_grupo_can` int(11) DEFAULT NULL,
  PRIMARY KEY (`id_can`),
  UNIQUE KEY `id_tipo_idx` (`tipo_can`),
  KEY `id_grupo_idx` (`id_grupo_can`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=2 ;



CREATE TABLE IF NOT EXISTS `grado` (
  `idgrado` int(11) NOT NULL AUTO_INCREMENT,
  `cod_grado` varchar(11) NOT NULL,
  `nom_grado` varchar(45) DEFAULT NULL,
  PRIMARY KEY (`idgrado`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=11 ;



INSERT INTO `grado` (`idgrado`, `cod_grado`, `nom_grado`) VALUES
(2, '03', 'TERCERO'),
(3, '04', 'CUARTO'),
(4, '05', 'QUINTO'),
(5, '06', 'SEXTO'),
(6, '07', 'SEPTIMO'),
(7, '08', 'OCTAVO'),
(8, '09', 'NOVENO'),
(9, '10', 'DECIMO'),
(10, '11', 'ONCE');



CREATE TABLE IF NOT EXISTS `grupo` (
  `idgrupo` int(11) NOT NULL AUTO_INCREMENT,
  `cod_grupo` varchar(10) NOT NULL,
  `nom_grupo` varchar(45) DEFAULT NULL,
  `id_grado` int(11) DEFAULT NULL,
  `vot_grupo` int(4) DEFAULT NULL,
  PRIMARY KEY (`idgrupo`),
  KEY `id_grado_idx` (`id_grado`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=4 ;



INSERT INTO `grupo` (`idgrupo`, `cod_grupo`, `nom_grupo`, `id_grado`, `vot_grupo`) VALUES
(1, '0301', 'TERCERO 01', 2, 5),
(2, '1101', 'ONCE 01', 10, 30),
(3, '0201', 'segundo 01', 2, 2);


CREATE TABLE IF NOT EXISTS `tipo` (
  `idtipo` int(11) NOT NULL AUTO_INCREMENT,
  `tipo_candidato` varchar(100) NOT NULL,
  PRIMARY KEY (`idtipo`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;


CREATE TABLE IF NOT EXISTS `votos` (
  `idvotos` int(11) NOT NULL AUTO_INCREMENT,
  `id_candidato` int(11) DEFAULT NULL,
  PRIMARY KEY (`idvotos`),
  KEY `id_can_idx` (`id_candidato`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;



ALTER TABLE `candidatos`
  ADD CONSTRAINT `candidatos_ibfk_1` FOREIGN KEY (`tipo_can`) REFERENCES `tipo` (`idtipo`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `id_grupo` FOREIGN KEY (`id_grupo_can`) REFERENCES `grupo` (`idgrupo`) ON DELETE NO ACTION ON UPDATE NO ACTION;


ALTER TABLE `grupo`
  ADD CONSTRAINT `id_grado` FOREIGN KEY (`id_grado`) REFERENCES `grado` (`idgrado`) ON DELETE NO ACTION ON UPDATE NO ACTION;


ALTER TABLE `votos`
  ADD CONSTRAINT `id_can` FOREIGN KEY (`id_candidato`) REFERENCES `candidatos` (`id_can`) ON DELETE NO ACTION ON UPDATE NO ACTION;

