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
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8;

-- Copiando dados para a tabela aulas.itensmidiagenero: ~3 rows (aproximadamente)
DELETE FROM `itensmidiagenero`;
/*!40000 ALTER TABLE `itensmidiagenero` DISABLE KEYS */;
INSERT INTO `itensmidiagenero` (`iditemmidiagenero`, `idMidia`, `idGenero`) VALUES
	(1, 10, 2),
	(2, 10, 3),
	(3, 10, 4);
/*!40000 ALTER TABLE `itensmidiagenero` ENABLE KEYS */;


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
) ENGINE=InnoDB AUTO_INCREMENT=11 DEFAULT CHARSET=utf8;

-- Copiando dados para a tabela aulas.midia: ~10 rows (aproximadamente)
DELETE FROM `midia`;
/*!40000 ALTER TABLE `midia` DISABLE KEYS */;
INSERT INTO `midia` (`idMidia`, `idTipoMidia`, `idMidiaClassificacao`, `idUsuario`, `titulo`, `duracao`, `elenco`, `nacionalidade`, `sinopse`, `dataCadastro`, `dataLancamento`, `qtdEpisodios`, `qtdTemporadas`) VALUES
	(1, 1, 1, 2, 'teste1', 'teste3', 'ASD', 'teste4', 'ASD', '2018-09-21 22:34:22', NULL, 5, 2),
	(2, 1, 1, 2, 'teste1', 'teste3', '2', 'teste4', '2', '2018-09-21 22:40:04', NULL, 1, 1),
	(3, 1, 1, 2, 'teste1', 'teste3', '2', 'teste4', '2', '2018-09-21 22:40:54', NULL, 1, 1),
	(4, 1, 1, 2, 'teste1', 'teste3', '2', 'teste4', '2', '2018-09-21 22:41:19', NULL, 1, 1),
	(5, 1, 1, 2, 'teste1', 'teste3', '2', 'teste4', '2', '2018-09-21 22:41:34', NULL, 1, 1),
	(6, 1, 1, 2, 'teste1', 'teste3', '2', 'teste4', '2', '2018-09-21 22:42:57', NULL, 1, 1),
	(7, 1, 1, 2, 'teste1', 'teste3', '2', 'teste4', '2', '2018-09-21 22:43:16', NULL, 1, 1),
	(8, 1, 1, 2, 'teste1', 'teste3', '2', 'teste4', '2', '2018-09-21 22:43:45', NULL, 1, 1),
	(9, 1, 1, 2, 'teste1', 'teste3', '2', 'teste4', '2', '2018-09-21 22:44:32', NULL, 1, 1),
	(10, 1, 1, 2, 'teste1', 'teste3', '2', 'teste4', '2', '2018-09-21 22:45:10', NULL, 1, 1);
/*!40000 ALTER TABLE `midia` ENABLE KEYS */;


-- Copiando estrutura para tabela aulas.midiaclassificacao
CREATE TABLE IF NOT EXISTS `midiaclassificacao` (
  `idMidiaClassificacao` int(11) NOT NULL AUTO_INCREMENT,
  `nome` varchar(20) NOT NULL,
  `dataCadastro` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `status` char(1) NOT NULL DEFAULT '1',
  PRIMARY KEY (`idMidiaClassificacao`)
) ENGINE=InnoDB AUTO_INCREMENT=7 DEFAULT CHARSET=utf8;

-- Copiando dados para a tabela aulas.midiaclassificacao: ~6 rows (aproximadamente)
DELETE FROM `midiaclassificacao`;
/*!40000 ALTER TABLE `midiaclassificacao` DISABLE KEYS */;
INSERT INTO `midiaclassificacao` (`idMidiaClassificacao`, `nome`, `dataCadastro`, `status`) VALUES
	(1, 'LIVRE', '2018-08-19 16:08:11', '1'),
	(2, '10+', '2018-08-19 16:08:21', '1'),
	(3, '12+', '2018-08-19 16:08:31', '1'),
	(4, '14+', '2018-08-19 16:08:35', '1'),
	(5, '16+', '2018-08-19 16:08:39', '1'),
	(6, '18+', '2018-08-19 16:08:42', '1');
/*!40000 ALTER TABLE `midiaclassificacao` ENABLE KEYS */;


-- Copiando estrutura para tabela aulas.midiagenero
CREATE TABLE IF NOT EXISTS `midiagenero` (
  `idMidiaGenero` int(11) NOT NULL AUTO_INCREMENT,
  `nome` varchar(20) NOT NULL,
  PRIMARY KEY (`idMidiaGenero`)
) ENGINE=InnoDB AUTO_INCREMENT=36 DEFAULT CHARSET=utf8;

-- Copiando dados para a tabela aulas.midiagenero: ~35 rows (aproximadamente)
DELETE FROM `midiagenero`;
/*!40000 ALTER TABLE `midiagenero` DISABLE KEYS */;
INSERT INTO `midiagenero` (`idMidiaGenero`, `nome`) VALUES
	(1, 'Ação'),
	(2, 'Animação'),
	(3, 'Aventura'),
	(4, 'Cinema de arte'),
	(5, 'Chanchada'),
	(6, 'Cinema catástrofe'),
	(7, 'Comédia'),
	(8, 'Comédia romântica'),
	(9, 'Comédia dramática'),
	(10, 'Comédia de ação'),
	(11, 'Cult'),
	(12, 'Dança'),
	(13, 'Documentário'),
	(14, 'Docuficção'),
	(15, 'Drama'),
	(16, 'Espionagem'),
	(17, 'Erótico'),
	(18, 'Fantasia'),
	(19, 'Faroeste'),
	(20, 'Ficção científica'),
	(21, 'Franchise/Séries'),
	(22, 'Guerra'),
	(23, 'Machinima'),
	(24, 'Masala'),
	(25, 'Musical'),
	(26, 'Filme noir'),
	(27, 'Policial'),
	(28, 'Pornochanchada'),
	(29, 'Pornográfico'),
	(30, 'Robologia'),
	(31, 'Romance'),
	(32, 'Seriado'),
	(33, 'Suspense'),
	(34, 'Terror'),
	(35, 'Trash');
/*!40000 ALTER TABLE `midiagenero` ENABLE KEYS */;


-- Copiando estrutura para tabela aulas.tipomidia
CREATE TABLE IF NOT EXISTS `tipomidia` (
  `idTipoMidia` int(11) NOT NULL AUTO_INCREMENT,
  `nome` varchar(35) NOT NULL,
  `dataCadastro` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `status` char(1) NOT NULL DEFAULT '1',
  PRIMARY KEY (`idTipoMidia`)
) ENGINE=InnoDB AUTO_INCREMENT=7 DEFAULT CHARSET=utf8;

-- Copiando dados para a tabela aulas.tipomidia: ~6 rows (aproximadamente)
DELETE FROM `tipomidia`;
/*!40000 ALTER TABLE `tipomidia` DISABLE KEYS */;
INSERT INTO `tipomidia` (`idTipoMidia`, `nome`, `dataCadastro`, `status`) VALUES
	(1, 'Filme', '2018-08-19 16:20:39', '1'),
	(2, 'Série', '2018-08-19 16:20:47', '1'),
	(3, 'Anime', '2018-08-19 16:21:10', '1'),
	(4, 'Curta metragem', '2018-08-19 16:21:15', '1'),
	(5, 'Longa metragem', '2018-08-19 16:21:23', '1'),
	(6, 'Mini série', '2018-08-19 16:21:29', '1');
/*!40000 ALTER TABLE `tipomidia` ENABLE KEYS */;


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
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8;

-- Copiando dados para a tabela aulas.usuario: ~1 rows (aproximadamente)
DELETE FROM `usuario`;
/*!40000 ALTER TABLE `usuario` DISABLE KEYS */;
INSERT INTO `usuario` (`idUsuario`, `usuario`, `senha`, `nivel`, `dataCadastro`, `imagemPerfil`, `email`) VALUES
	(2, 'blacksheep', 'f58945dc8106fbba1a086f71f11453b3', '0', '2018-09-14 22:03:52', NULL, 'lukas_jacoby@hotmail.com');
/*!40000 ALTER TABLE `usuario` ENABLE KEYS */;
/*!40101 SET SQL_MODE=IFNULL(@OLD_SQL_MODE, '') */;
/*!40014 SET FOREIGN_KEY_CHECKS=IF(@OLD_FOREIGN_KEY_CHECKS IS NULL, 1, @OLD_FOREIGN_KEY_CHECKS) */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
