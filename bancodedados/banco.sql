-- MySQL Administrator dump 1.4
--
-- ------------------------------------------------------
-- Server version	5.6.16


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

/*!40014 SET @OLD_UNIQUE_CHECKS=@@UNIQUE_CHECKS, UNIQUE_CHECKS=0 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;


--
-- Create schema multiplayer
--

CREATE DATABASE IF NOT EXISTS multiplayer;
USE multiplayer;

--
-- Definition of table `acoes_log`
--

DROP TABLE IF EXISTS `acoes_log`;
CREATE TABLE `acoes_log` (
  `COD_ACOES_LOG` int(11) NOT NULL,
  `NOME_ACAO` varchar(45) NOT NULL,
  PRIMARY KEY (`COD_ACOES_LOG`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `acoes_log`
--

/*!40000 ALTER TABLE `acoes_log` DISABLE KEYS */;
INSERT INTO `acoes_log` (`COD_ACOES_LOG`,`NOME_ACAO`) VALUES 
 (1,'efetuou Login'),
 (2,'Alterou Foto'),
 (3,'Desativado'),
 (4,'Deletado'),
 (5,'Reativado'),
 (6,'Alterou Senha'),
 (7,'Alterou Email'),
 (8,'Alterou Nome de Perfil'),
 (9,'Comentou'),
 (10,'Cadastro No Site'),
 (11,'efetuou Logout');
/*!40000 ALTER TABLE `acoes_log` ENABLE KEYS */;


--
-- Definition of table `artigo`
--

DROP TABLE IF EXISTS `artigo`;
CREATE TABLE `artigo` (
  `ID_ARTIGO` int(11) NOT NULL AUTO_INCREMENT,
  `TITULO_ARTIGO` varchar(60) NOT NULL,
  `CATEGORIA_ARTIGO` int(11) NOT NULL,
  `DATA_ARTIGO` date NOT NULL,
  `HORA_ARTIGO` time NOT NULL,
  `AUTOR_ARTIGO` int(11) NOT NULL,
  `URL_ARTIGO` varchar(30) NOT NULL,
  `DESCRICAO_ARTIGO` text NOT NULL,
  `DATA_LANCAMENTO` date NOT NULL,
  `SERIE_ARTIGO` varchar(40) DEFAULT NULL,
  `CONTEUDO_ARTIGO` text NOT NULL,
  `TITULO_CONTEUDO_ARTIGO` varchar(100) NOT NULL,
  `CONTEUDO_ARTIGO2` text NOT NULL,
  PRIMARY KEY (`ID_ARTIGO`),
  UNIQUE KEY `ID_ARTIGO_UNIQUE` (`ID_ARTIGO`),
  UNIQUE KEY `TITULO_ARTIGO_UNIQUE` (`TITULO_ARTIGO`),
  UNIQUE KEY `URL_ARTIGO_UNIQUE` (`URL_ARTIGO`),
  KEY `CATEGORIA_ARTIGO_idx` (`CATEGORIA_ARTIGO`),
  KEY `CODIGO_AUTOR_idx` (`AUTOR_ARTIGO`),
  CONSTRAINT `CATEGORIA_ARTIGO` FOREIGN KEY (`CATEGORIA_ARTIGO`) REFERENCES `categoria` (`COD_CATEGORIA`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  CONSTRAINT `CODIGO_AUTOR` FOREIGN KEY (`AUTOR_ARTIGO`) REFERENCES `usuario` (`COD_USUARIO`) ON DELETE NO ACTION ON UPDATE NO ACTION
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8;

--
-- Dumping data for table `artigo`
--

/*!40000 ALTER TABLE `artigo` DISABLE KEYS */;
INSERT INTO `artigo` (`ID_ARTIGO`,`TITULO_ARTIGO`,`CATEGORIA_ARTIGO`,`DATA_ARTIGO`,`HORA_ARTIGO`,`AUTOR_ARTIGO`,`URL_ARTIGO`,`DESCRICAO_ARTIGO`,`DATA_LANCAMENTO`,`SERIE_ARTIGO`,`CONTEUDO_ARTIGO`,`TITULO_CONTEUDO_ARTIGO`,`CONTEUDO_ARTIGO2`) VALUES 
 (1,'TheSims4',4,'2014-11-05','18:13:28',29,'pc/thesims4.php','theSims4theSims4theSims4theSims4theSims4theSims4theSims4theSims4','2014-10-15','TheSims','theSims4theSims4theSims4theSims4','TheSims4','asdasdstheSims4theSims4theSims4');
/*!40000 ALTER TABLE `artigo` ENABLE KEYS */;


--
-- Definition of table `canditado`
--

DROP TABLE IF EXISTS `canditado`;
CREATE TABLE `canditado` (
  `COD_CANDIDATO` int(11) NOT NULL AUTO_INCREMENT,
  `NOME_CANDIDATO` varchar(45) NOT NULL,
  `EMAIL_CANDIDATO` varchar(45) NOT NULL,
  `CURRICULO_CANDIDATO` blob NOT NULL,
  `IDADE_CANDIDATO` char(2) NOT NULL,
  `URL_PORTFOLIO` varchar(65) NOT NULL,
  PRIMARY KEY (`COD_CANDIDATO`),
  UNIQUE KEY `EMAIL_CANDIDATO_UNIQUE` (`EMAIL_CANDIDATO`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `canditado`
--

/*!40000 ALTER TABLE `canditado` DISABLE KEYS */;
/*!40000 ALTER TABLE `canditado` ENABLE KEYS */;


--
-- Definition of table `categoria`
--

DROP TABLE IF EXISTS `categoria`;
CREATE TABLE `categoria` (
  `COD_CATEGORIA` int(11) NOT NULL DEFAULT '0',
  `NOME_CATEGORIA` varchar(20) NOT NULL,
  PRIMARY KEY (`COD_CATEGORIA`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `categoria`
--

/*!40000 ALTER TABLE `categoria` DISABLE KEYS */;
INSERT INTO `categoria` (`COD_CATEGORIA`,`NOME_CATEGORIA`) VALUES 
 (1,'PlayStation'),
 (2,'Nintendo'),
 (3,'XBOX'),
 (4,'PC');
/*!40000 ALTER TABLE `categoria` ENABLE KEYS */;


--
-- Definition of table `coment`
--

DROP TABLE IF EXISTS `coment`;
CREATE TABLE `coment` (
  `COD_COMENT` int(11) NOT NULL AUTO_INCREMENT,
  `COD_USUARIO` int(11) NOT NULL,
  `CONTEUDO_COMENT` text NOT NULL,
  `DATA_COMENT` date NOT NULL,
  `HORA_COMENT` time NOT NULL,
  `CODIGO_MATERIA` int(11) NOT NULL,
  PRIMARY KEY (`COD_COMENT`),
  KEY `COMENT_USUARIO_idx` (`COD_USUARIO`),
  KEY `CODIGO_MATERIA_idx` (`CODIGO_MATERIA`),
  CONSTRAINT `COMENT_USUARIOS` FOREIGN KEY (`COD_USUARIO`) REFERENCES `usuario` (`COD_USUARIO`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  CONSTRAINT `CODIGO_MATERIA` FOREIGN KEY (`CODIGO_MATERIA`) REFERENCES `artigo` (`ID_ARTIGO`) ON DELETE NO ACTION ON UPDATE NO ACTION
) ENGINE=InnoDB AUTO_INCREMENT=39 DEFAULT CHARSET=utf8;

--
-- Dumping data for table `coment`
--

/*!40000 ALTER TABLE `coment` DISABLE KEYS */;
INSERT INTO `coment` (`COD_COMENT`,`COD_USUARIO`,`CONTEUDO_COMENT`,`DATA_COMENT`,`HORA_COMENT`,`CODIGO_MATERIA`) VALUES 
 (1,29,' jow\r\n','2014-11-05','18:13:45',1),
 (2,29,'o jow foi na cozinha\r\n','2014-11-05','18:15:52',1),
 (3,29,'o jow foi na cozinha\r\n','2014-11-05','18:16:01',1),
 (4,29,'o jow foi na cozinha\r\n','2014-11-05','18:16:10',1),
 (5,29,'o jow foi na cozinha\r\n','2014-11-05','18:26:36',1),
 (6,29,' asdas','2014-11-05','18:26:45',1),
 (7,29,' 21312','2014-11-05','18:26:55',1),
 (8,29,' 21312wqeqw','2014-11-05','18:26:58',1),
 (9,29,' 21312wqeqwqweqwe','2014-11-05','18:27:00',1),
 (10,29,' 111','2014-11-05','18:27:14',1),
 (11,29,' 1112','2014-11-05','18:27:16',1),
 (12,29,' 11123','2014-11-05','18:27:18',1),
 (13,29,' 111234','2014-11-05','18:27:20',1),
 (14,29,' 1112345','2014-11-05','18:27:22',1),
 (15,29,' 1112345','2014-11-05','18:27:23',1),
 (16,29,' 11123455','2014-11-05','18:27:26',1),
 (17,29,' 111234555','2014-11-05','18:27:30',1),
 (18,29,' jow\r\n','2014-11-05','18:27:52',1),
 (19,29,' jow foi na cozinha\r\n','2014-11-05','18:27:59',1),
 (20,29,' jhow natan doido\r\n\r\n','2014-11-05','18:36:55',1),
 (21,29,' jhow natan doido\r\n\r\n','2014-11-05','18:36:56',1),
 (22,29,' jhow natan doido\r\n\r\n','2014-11-05','18:36:57',1),
 (23,29,'jihih','2014-11-05','18:37:03',1),
 (24,29,'jihih','2014-11-05','18:37:04',1),
 (25,29,'jihih','2014-11-05','18:37:04',1),
 (26,29,'jihih','2014-11-05','18:37:04',1),
 (27,29,'jihih','2014-11-05','18:37:04',1),
 (28,29,'jihih','2014-11-05','18:37:05',1),
 (29,29,'jihih','2014-11-05','18:37:05',1),
 (30,29,'jihih','2014-11-05','18:37:05',1),
 (31,29,'jihih','2014-11-05','18:37:07',1),
 (32,29,'jihih','2014-11-05','18:37:08',1),
 (33,29,'jihih','2014-11-05','18:37:08',1),
 (34,29,'jihih','2014-11-05','18:37:08',1),
 (35,29,'jihih','2014-11-05','18:37:09',1),
 (36,29,'joo','2014-11-05','18:37:24',1),
 (37,29,'m lkj\r\n','2014-11-05','18:37:31',1),
 (38,29,'hjgvhfç','2014-11-05','18:37:39',1);
/*!40000 ALTER TABLE `coment` ENABLE KEYS */;


--
-- Definition of table `desativados`
--

DROP TABLE IF EXISTS `desativados`;
CREATE TABLE `desativados` (
  `COD_DESATIVADO` int(11) NOT NULL,
  `NOME_DESATIVADO` varchar(45) NOT NULL,
  `EMAIL_DESATIVADO` varchar(45) NOT NULL,
  `SENHA_DESATIVADO` varchar(45) NOT NULL,
  `DATA_NASCIMENTO` date NOT NULL,
  `TEMPO_DESATIVADO` time NOT NULL,
  `MOTIVO_DESATIVADO` varchar(300) NOT NULL,
  PRIMARY KEY (`COD_DESATIVADO`),
  UNIQUE KEY `EMAIL_DESATIVADO_UNIQUE` (`EMAIL_DESATIVADO`),
  UNIQUE KEY `COD_DESATIVADO_UNIQUE` (`COD_DESATIVADO`),
  CONSTRAINT `COD_IMAGEMS` FOREIGN KEY (`COD_DESATIVADO`) REFERENCES `imagem_usuario` (`COD_IMAGEM_USUARIO`) ON DELETE NO ACTION ON UPDATE NO ACTION
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `desativados`
--

/*!40000 ALTER TABLE `desativados` DISABLE KEYS */;
/*!40000 ALTER TABLE `desativados` ENABLE KEYS */;


--
-- Definition of table `imagem_usuario`
--

DROP TABLE IF EXISTS `imagem_usuario`;
CREATE TABLE `imagem_usuario` (
  `COD_IMAGEM` int(11) NOT NULL AUTO_INCREMENT,
  `URL_IMAGEM` varchar(20) NOT NULL,
  `URL_IMAGEM_CAPA` varchar(20) NOT NULL,
  `COD_IMAGEM_USUARIO` int(11) NOT NULL,
  PRIMARY KEY (`COD_IMAGEM`),
  KEY `COD_IMAGEM_USUARIO_idx` (`COD_IMAGEM_USUARIO`),
  CONSTRAINT `COD_IMAGEM_USUARIOS` FOREIGN KEY (`COD_IMAGEM_USUARIO`) REFERENCES `usuario` (`COD_USUARIO`) ON DELETE NO ACTION ON UPDATE NO ACTION
) ENGINE=InnoDB AUTO_INCREMENT=14 DEFAULT CHARSET=utf8;

--
-- Dumping data for table `imagem_usuario`
--

/*!40000 ALTER TABLE `imagem_usuario` DISABLE KEYS */;
INSERT INTO `imagem_usuario` (`COD_IMAGEM`,`URL_IMAGEM`,`URL_IMAGEM_CAPA`,`COD_IMAGEM_USUARIO`) VALUES 
 (8,'default.jpg','defaultCapa.jpg',29),
 (9,'default.jpg','defaultCapa.jpg',30),
 (10,'default.jpg','defaultCapa.jpg',31),
 (11,'default.jpg','defaultCapa.jpg',33),
 (12,'default.jpg','defaultCapa.jpg',34),
 (13,'default.jpg','defaultCapa.jpg',35);
/*!40000 ALTER TABLE `imagem_usuario` ENABLE KEYS */;


--
-- Definition of table `imagens_materia`
--

DROP TABLE IF EXISTS `imagens_materia`;
CREATE TABLE `imagens_materia` (
  `COD_IMAGEM_MATERIA` int(11) NOT NULL AUTO_INCREMENT,
  `COD_MATERIA_IMAGEM` int(11) NOT NULL,
  `IMAGEM_CAPA` varchar(20) NOT NULL,
  `IMAGEM_PRINCIPAL` varchar(20) NOT NULL,
  `IMAGEM_GALERIA` varchar(20) NOT NULL,
  `IMAGEM_GALERIA2` varchar(20) NOT NULL,
  `IMAGEM_GALERIA3` varchar(20) NOT NULL,
  `IMAGEM_MINIATURA` varchar(20) NOT NULL,
  PRIMARY KEY (`COD_IMAGEM_MATERIA`),
  KEY `IMAGENS_MATERIA_idx` (`COD_MATERIA_IMAGEM`),
  CONSTRAINT `IMAGENS_MATERIA` FOREIGN KEY (`COD_MATERIA_IMAGEM`) REFERENCES `artigo` (`ID_ARTIGO`) ON DELETE NO ACTION ON UPDATE NO ACTION
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8;

--
-- Dumping data for table `imagens_materia`
--

/*!40000 ALTER TABLE `imagens_materia` DISABLE KEYS */;
INSERT INTO `imagens_materia` (`COD_IMAGEM_MATERIA`,`COD_MATERIA_IMAGEM`,`IMAGEM_CAPA`,`IMAGEM_PRINCIPAL`,`IMAGEM_GALERIA`,`IMAGEM_GALERIA2`,`IMAGEM_GALERIA3`,`IMAGEM_MINIATURA`) VALUES 
 (1,1,'af627f.jpg','202531.jpg','91dcce.jpg','d85674.jpg','7d8773.jpg','542c94.jpg');
/*!40000 ALTER TABLE `imagens_materia` ENABLE KEYS */;


--
-- Definition of table `like`
--

DROP TABLE IF EXISTS `like`;
CREATE TABLE `like` (
  `COD_LIKE` int(11) NOT NULL AUTO_INCREMENT,
  `USUARIO_LIKE` int(11) DEFAULT NULL,
  `ARTIGO_LIKE` int(11) DEFAULT NULL,
  PRIMARY KEY (`COD_LIKE`),
  KEY `USUARIOS_LIKE_idx` (`USUARIO_LIKE`),
  KEY `ARTIGO_LIKE_idx` (`ARTIGO_LIKE`),
  CONSTRAINT `USUARIOS_LIKE` FOREIGN KEY (`USUARIO_LIKE`) REFERENCES `usuario` (`COD_USUARIO`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  CONSTRAINT `ARTIGO_LIKE` FOREIGN KEY (`ARTIGO_LIKE`) REFERENCES `artigo` (`ID_ARTIGO`) ON DELETE NO ACTION ON UPDATE NO ACTION
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `like`
--

/*!40000 ALTER TABLE `like` DISABLE KEYS */;
/*!40000 ALTER TABLE `like` ENABLE KEYS */;


--
-- Definition of table `log`
--

DROP TABLE IF EXISTS `log`;
CREATE TABLE `log` (
  `COD_LOG` int(11) NOT NULL AUTO_INCREMENT,
  `IP_LOG` varchar(45) NOT NULL,
  `DATA_LOG` date NOT NULL,
  `HORA_LOG` time NOT NULL,
  `MENSAGEM_LOG` varchar(45) NOT NULL,
  `ACAO_LOG` int(11) NOT NULL,
  `AUTOR_LOG` varchar(45) NOT NULL,
  `COD_AUTOR_LOG` int(11) NOT NULL,
  PRIMARY KEY (`COD_LOG`),
  KEY `COD_AUTOR_LOG_idx` (`COD_AUTOR_LOG`),
  KEY `COD_ACAO_idx` (`ACAO_LOG`),
  CONSTRAINT `COD_AUTOR_LOG` FOREIGN KEY (`COD_AUTOR_LOG`) REFERENCES `usuario` (`COD_USUARIO`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  CONSTRAINT `COD_ACAO` FOREIGN KEY (`ACAO_LOG`) REFERENCES `acoes_log` (`COD_ACOES_LOG`) ON DELETE NO ACTION ON UPDATE NO ACTION
) ENGINE=InnoDB AUTO_INCREMENT=19 DEFAULT CHARSET=utf8;

--
-- Dumping data for table `log`
--

/*!40000 ALTER TABLE `log` DISABLE KEYS */;
INSERT INTO `log` (`COD_LOG`,`IP_LOG`,`DATA_LOG`,`HORA_LOG`,`MENSAGEM_LOG`,`ACAO_LOG`,`AUTOR_LOG`,`COD_AUTOR_LOG`) VALUES 
 (9,'::1','2014-11-05','18:04:13','Jow: Realizou Cadastro',10,'jonathan.webitb@hotmail.com',29),
 (10,'::1','2014-11-05','18:11:33','Jow efetuou Login',1,'jonathan.webitb@hotmail.com',29),
 (11,'::1','2014-11-05','19:41:31','Jonathan Efeutou Logout',11,'jonathan.webitb@hotmail.com',29),
 (12,'::1','2014-11-05','19:41:43','ADM: Admin efetuou Login',1,'admin@admin.com',28),
 (13,'::1','2014-11-05','19:44:34','Administrador Efeutou Logout',11,'admin@admin.com',28),
 (14,'::1','2014-11-05','19:44:59','Jão: Realizou Cadastro',10,'jao@hotmail.com',30),
 (15,'::1','2014-11-05','21:22:57','josi: Realizou Cadastro',10,'josimar@gmail.com',31),
 (16,'::1','2014-11-05','21:23:51','josi: Realizou Cadastro',10,'josimar2@gmail.com',33),
 (17,'::1','2014-11-05','21:25:31','josi: Realizou Cadastro',10,'josimar3@gmail.com',34),
 (18,'::1','2014-11-05','21:26:27','josi: Realizou Cadastro',10,'josimar4@gmail.com',35);
/*!40000 ALTER TABLE `log` ENABLE KEYS */;


--
-- Definition of table `tipo`
--

DROP TABLE IF EXISTS `tipo`;
CREATE TABLE `tipo` (
  `COD_TIPO` int(11) NOT NULL,
  `TIPO_USUARIO` char(3) NOT NULL,
  PRIMARY KEY (`COD_TIPO`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `tipo`
--

/*!40000 ALTER TABLE `tipo` DISABLE KEYS */;
INSERT INTO `tipo` (`COD_TIPO`,`TIPO_USUARIO`) VALUES 
 (1,'ADM'),
 (2,'RES'),
 (3,'COL'),
 (4,'DES');
/*!40000 ALTER TABLE `tipo` ENABLE KEYS */;


--
-- Definition of table `usuario`
--

DROP TABLE IF EXISTS `usuario`;
CREATE TABLE `usuario` (
  `COD_USUARIO` int(11) NOT NULL AUTO_INCREMENT,
  `NOME_USUARIO` varchar(45) NOT NULL,
  `APELIDO_USUARIO` varchar(20) NOT NULL,
  `EMAIL_USUARIO` varchar(45) NOT NULL,
  `SENHA_USUARIO` varchar(60) NOT NULL,
  `TIPO_USUARIO` int(11) NOT NULL,
  `DATA_NASCIMENTO` date NOT NULL,
  `USUARIO_DESATIVADO` int(11) DEFAULT NULL,
  `ESTADO_USUARIO` char(2) DEFAULT NULL,
  `DESCRICAO_USUARIO` varchar(100) DEFAULT NULL,
  PRIMARY KEY (`COD_USUARIO`),
  UNIQUE KEY `COD_COLUNISTA_UNIQUE` (`COD_USUARIO`),
  UNIQUE KEY `EMAIL_COLUNISTA_UNIQUE` (`EMAIL_USUARIO`),
  KEY `TIPO_USUARIO_idx` (`TIPO_USUARIO`),
  KEY `USUARIO_DESATIVADO_idx` (`USUARIO_DESATIVADO`),
  CONSTRAINT `TIPO_USUARIOS` FOREIGN KEY (`TIPO_USUARIO`) REFERENCES `tipo` (`COD_TIPO`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  CONSTRAINT `USUARIO_DESATIVADOS` FOREIGN KEY (`USUARIO_DESATIVADO`) REFERENCES `desativados` (`COD_DESATIVADO`) ON DELETE NO ACTION ON UPDATE NO ACTION
) ENGINE=InnoDB AUTO_INCREMENT=36 DEFAULT CHARSET=utf8;

--
-- Dumping data for table `usuario`
--

/*!40000 ALTER TABLE `usuario` DISABLE KEYS */;
INSERT INTO `usuario` (`COD_USUARIO`,`NOME_USUARIO`,`APELIDO_USUARIO`,`EMAIL_USUARIO`,`SENHA_USUARIO`,`TIPO_USUARIO`,`DATA_NASCIMENTO`,`USUARIO_DESATIVADO`,`ESTADO_USUARIO`,`DESCRICAO_USUARIO`) VALUES 
 (28,'Administrador','Admin','admin@admin.com','$2a$08$MTcxOTAwNjA2NzU0NWE1O.LQBhx7eZb3nryfzfJaa50cyDklklb7.',1,'2014-08-12',NULL,NULL,NULL),
 (29,'Jonathan','Jow','jonathan.webitb@hotmail.com','$2a$08$MTcxOTAwNjA2NzU0NWE1O.LQBhx7eZb3nryfzfJaa50cyDklklb7.',3,'0000-00-00',NULL,NULL,NULL),
 (30,'joao','Jão','jao@hotmail.com','$2a$08$MjAzODI0ODE0MTU0NWE3M.sA8mYiDMDqDRWPSDaY7ps0gWroQbcjy',2,'0000-00-00',NULL,NULL,NULL),
 (31,'josimar','josi','josimar@gmail.com','$2a$08$MTAwODE2MDUzMzU0NWE4NujpVl1LaMM4tnyr/N5nLfgpvnmCb.pJy',2,'0000-00-00',NULL,NULL,NULL),
 (33,'josimar','josi','josimar2@gmail.com','$2a$08$MzgxMzMzMDcxNTQ1YTg3NOqpK7CFw1wHM.qBIvhWaXY3CjAL5HqKy',2,'0000-00-00',NULL,NULL,NULL),
 (34,'josimar','josi','josimar3@gmail.com','$2a$08$MTQwMTA5NTY0ODU0NWE4NuTK2mkeghWnBsGMLIgmYR1gte/Zo18im',2,'0000-00-00',NULL,NULL,NULL),
 (35,'josimar','josi','josimar4@gmail.com','$2a$08$MTE1OTcwMTQ1NTQ1YTg3Zebe3XcThAuzVYrZxGomZAjsOU8MKAKMK',2,'0000-00-00',NULL,NULL,NULL);
/*!40000 ALTER TABLE `usuario` ENABLE KEYS */;




/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
