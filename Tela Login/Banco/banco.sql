-- --------------------------------------------------------
-- Servidor:                     127.0.0.1
-- Versão do servidor:           5.5.55-log - MySQL Community Server (GPL)
-- OS do Servidor:               Win64
-- HeidiSQL Versão:              9.3.0.4984
-- --------------------------------------------------------

/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET NAMES utf8mb4 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;

-- Copiando estrutura do banco de dados para aulas
CREATE DATABASE IF NOT EXISTS `aulas` /*!40100 DEFAULT CHARACTER SET utf8 */;
USE `aulas`;


-- Copiando estrutura para tabela aulas.itensmidiagenero
CREATE TABLE IF NOT EXISTS `itensmidiagenero` (
  `iditemmidiagenero` int(11) NOT NULL AUTO_INCREMENT,
  `idMidia` int(11) NOT NULL,
  `idGenero` int(11) NOT NULL,
  PRIMARY KEY (`iditemmidiagenero`),
  KEY `FK_item_midia` (`idMidia`),
  KEY `FK_item_genero` (`idGenero`),
  CONSTRAINT `FK_item_genero` FOREIGN KEY (`idGenero`) REFERENCES `midiagenero` (`idMidiaGenero`),
  CONSTRAINT `FK_item_midia` FOREIGN KEY (`idMidia`) REFERENCES `midia` (`idMidia`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- Exportação de dados foi desmarcado.


-- Copiando estrutura para tabela aulas.midia
CREATE TABLE IF NOT EXISTS `midia` (
  `idMidia` int(11) NOT NULL AUTO_INCREMENT,
  `idTipoMidia` int(11) DEFAULT NULL,
  `idMidiaClassificacao` int(11) DEFAULT NULL,
  `idUsuario` int(11) DEFAULT NULL,
  `titulo` varchar(50) DEFAULT NULL,
  `duracao` varchar(10) DEFAULT NULL,
  `elenco` varchar(500) DEFAULT NULL,
  `nacionalidade` varchar(20) DEFAULT NULL,
  `sinopse` varchar(500) DEFAULT NULL,
  `dataCadastro` timestamp NULL DEFAULT CURRENT_TIMESTAMP,
  `dataLancamento` date DEFAULT NULL,
  `qtdEpisodios` int(11) DEFAULT NULL,
  `qtdTemporadas` int(11) DEFAULT NULL,
  PRIMARY KEY (`idMidia`),
  KEY `FK_tipomidia` (`idTipoMidia`),
  KEY `FK_midiaclassificacao` (`idMidiaClassificacao`),
  CONSTRAINT `FK_midiaclassificacao` FOREIGN KEY (`idMidiaClassificacao`) REFERENCES `midiaclassificacao` (`idMidiaClassificacao`),
  CONSTRAINT `FK_tipomidia` FOREIGN KEY (`idTipoMidia`) REFERENCES `tipomidia` (`idTipoMidia`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- Exportação de dados foi desmarcado.


-- Copiando estrutura para tabela aulas.midiaclassificacao
CREATE TABLE IF NOT EXISTS `midiaclassificacao` (
  `idMidiaClassificacao` int(11) NOT NULL AUTO_INCREMENT,
  `nome` varchar(20) NOT NULL,
  `dataCadastro` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `status` char(1) NOT NULL DEFAULT '1',
  PRIMARY KEY (`idMidiaClassificacao`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- Exportação de dados foi desmarcado.


-- Copiando estrutura para tabela aulas.midiagenero
CREATE TABLE IF NOT EXISTS `midiagenero` (
  `idMidiaGenero` int(11) NOT NULL AUTO_INCREMENT,
  `nome` varchar(20) NOT NULL,
  PRIMARY KEY (`idMidiaGenero`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- Exportação de dados foi desmarcado.


-- Copiando estrutura para tabela aulas.tipomidia
CREATE TABLE IF NOT EXISTS `tipomidia` (
  `idTipoMidia` int(11) NOT NULL AUTO_INCREMENT,
  `nome` varchar(35) NOT NULL,
  `dataCadastro` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `status` char(1) NOT NULL DEFAULT '1',
  PRIMARY KEY (`idTipoMidia`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- Exportação de dados foi desmarcado.


-- Copiando estrutura para tabela aulas.usuario
CREATE TABLE IF NOT EXISTS `usuario` (
  `idUsuario` int(3) NOT NULL AUTO_INCREMENT,
  `usuario` varchar(20) NOT NULL DEFAULT '0',
  `senha` varchar(32) NOT NULL DEFAULT '',
  `nivel` char(2) NOT NULL DEFAULT '',
  `dataCadastro` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `imagemPerfil` blob,
  `email` varchar(60) NOT NULL DEFAULT '',
  PRIMARY KEY (`idUsuario`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- Exportação de dados foi desmarcado.
/*!40101 SET SQL_MODE=IFNULL(@OLD_SQL_MODE, '') */;
/*!40014 SET FOREIGN_KEY_CHECKS=IF(@OLD_FOREIGN_KEY_CHECKS IS NULL, 1, @OLD_FOREIGN_KEY_CHECKS) */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
