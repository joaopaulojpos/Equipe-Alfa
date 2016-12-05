-- MySQL dump 10.13  Distrib 5.7.12, for Win64 (x86_64)
--
-- Host: localhost    Database: faculdade
-- ------------------------------------------------------
-- Server version	5.7.16-log

/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;
/*!40103 SET @OLD_TIME_ZONE=@@TIME_ZONE */;
/*!40103 SET TIME_ZONE='+00:00' */;
/*!40014 SET @OLD_UNIQUE_CHECKS=@@UNIQUE_CHECKS, UNIQUE_CHECKS=0 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;
/*!40111 SET @OLD_SQL_NOTES=@@SQL_NOTES, SQL_NOTES=0 */;

--
-- Table structure for table `aluno`
--

DROP TABLE IF EXISTS `aluno`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `aluno` (
  `MATRICULAALUNO` int(11) NOT NULL,
  `DATANASCIMENTO` date DEFAULT NULL,
  `NOMEALUNO` varchar(50) DEFAULT NULL,
  `SEXOALUNO` char(1) DEFAULT NULL,
  `TELEFONE` varchar(15) DEFAULT NULL,
  PRIMARY KEY (`MATRICULAALUNO`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `aluno`
--

LOCK TABLES `aluno` WRITE;
/*!40000 ALTER TABLE `aluno` DISABLE KEYS */;
/*!40000 ALTER TABLE `aluno` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `curso`
--

DROP TABLE IF EXISTS `curso`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `curso` (
  `CODIGOCURSO` int(11) NOT NULL AUTO_INCREMENT,
  `NOMECURSO` varchar(50) DEFAULT NULL,
  `TIPOENSINO` varchar(10) DEFAULT NULL,
  `DURACAO` int(11) DEFAULT NULL,
  PRIMARY KEY (`CODIGOCURSO`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `curso`
--

LOCK TABLES `curso` WRITE;
/*!40000 ALTER TABLE `curso` DISABLE KEYS */;
INSERT INTO `curso` VALUES (2,'ADS - Análise e Desenv. de Sistemas','tecnologo',3);
/*!40000 ALTER TABLE `curso` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `disciplina`
--

DROP TABLE IF EXISTS `disciplina`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `disciplina` (
  `CODIGODISCIPLINA` int(11) NOT NULL AUTO_INCREMENT,
  `NOMEDISCIPLINA` varchar(50) DEFAULT NULL,
  PRIMARY KEY (`CODIGODISCIPLINA`)
) ENGINE=InnoDB AUTO_INCREMENT=14 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `disciplina`
--

LOCK TABLES `disciplina` WRITE;
/*!40000 ALTER TABLE `disciplina` DISABLE KEYS */;
INSERT INTO `disciplina` VALUES (1,'Banco de Dados I'),(3,'Arq. e Redes de Comput.'),(4,'Direito e Ética Prof.'),(5,'Fundamentos de Programação'),(6,'Inglês Instrumental I'),(7,'Engenharia de Software'),(8,'Metod. Desenv. de Soft.'),(9,'Sistemas Operacionais'),(10,'Program. Orient. a Objetos'),(11,'Banco de Dados II'),(12,'Inglês Instrumental II'),(13,'Metodologia Científica');
/*!40000 ALTER TABLE `disciplina` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `disciplinaturma`
--

DROP TABLE IF EXISTS `disciplinaturma`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `disciplinaturma` (
  `CODIGODISCIPLINATURMA` int(11) NOT NULL AUTO_INCREMENT,
  `CODIGODISCIPLINA` int(11) NOT NULL,
  `CODIGOPROFESSOR` int(11) NOT NULL,
  `CODIGOTURMA` int(11) NOT NULL,
  `CODIGONOTA` int(11) NOT NULL,
  PRIMARY KEY (`CODIGODISCIPLINATURMA`),
  KEY `FK_DISCIPLINATURMA_DISCIPLINA` (`CODIGODISCIPLINA`),
  KEY `FK_DISCIPLINATURMA_NOTA` (`CODIGONOTA`),
  KEY `FK_DISCIPLINATURMA_PROFESSOR` (`CODIGOPROFESSOR`),
  KEY `FK_DISCIPLINATURMA_TURMA` (`CODIGOTURMA`),
  CONSTRAINT `FK_DISCIPLINATURMA_DISCIPLINA` FOREIGN KEY (`CODIGODISCIPLINA`) REFERENCES `disciplina` (`CODIGODISCIPLINA`) ON DELETE CASCADE ON UPDATE CASCADE,
  CONSTRAINT `FK_DISCIPLINATURMA_NOTA` FOREIGN KEY (`CODIGONOTA`) REFERENCES `nota` (`CODIGONOTA`) ON DELETE CASCADE ON UPDATE CASCADE,
  CONSTRAINT `FK_DISCIPLINATURMA_PROFESSOR` FOREIGN KEY (`CODIGOPROFESSOR`) REFERENCES `professor` (`CODIGOPROFESSOR`) ON DELETE CASCADE ON UPDATE CASCADE,
  CONSTRAINT `FK_DISCIPLINATURMA_TURMA` FOREIGN KEY (`CODIGOTURMA`) REFERENCES `turma` (`CODIGOTURMA`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `disciplinaturma`
--

LOCK TABLES `disciplinaturma` WRITE;
/*!40000 ALTER TABLE `disciplinaturma` DISABLE KEYS */;
/*!40000 ALTER TABLE `disciplinaturma` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `falta`
--

DROP TABLE IF EXISTS `falta`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `falta` (
  `MATRICULAALUNO` int(11) DEFAULT NULL,
  `CODIGODISCIPLINATURMA` int(11) DEFAULT NULL,
  `MES` varchar(15) DEFAULT NULL,
  `QTDFALTA` int(11) DEFAULT NULL,
  `ABONO` varchar(5) DEFAULT NULL,
  `MOTIVO` varchar(50) DEFAULT NULL,
  KEY `FK_FALTA_ALUNO` (`MATRICULAALUNO`),
  KEY `FK_FALTA_DISCIPLINA` (`CODIGODISCIPLINATURMA`),
  CONSTRAINT `FK_FALTA_ALUNO` FOREIGN KEY (`MATRICULAALUNO`) REFERENCES `aluno` (`MATRICULAALUNO`) ON DELETE CASCADE ON UPDATE CASCADE,
  CONSTRAINT `FK_FALTA_DISCIPLINA` FOREIGN KEY (`CODIGODISCIPLINATURMA`) REFERENCES `disciplinaturma` (`CODIGODISCIPLINATURMA`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `falta`
--

LOCK TABLES `falta` WRITE;
/*!40000 ALTER TABLE `falta` DISABLE KEYS */;
/*!40000 ALTER TABLE `falta` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `frequencia`
--

DROP TABLE IF EXISTS `frequencia`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `frequencia` (
  `MATRICULAALUNO` int(11) DEFAULT NULL,
  `CODIGODISCIPLINATURMA` int(11) DEFAULT NULL,
  KEY `FK_FREQUENCIA_ALUNO` (`MATRICULAALUNO`),
  KEY `FK_FREQUENCIA_DISCIPLINATURMA` (`CODIGODISCIPLINATURMA`),
  CONSTRAINT `FK_FREQUENCIA_ALUNO` FOREIGN KEY (`MATRICULAALUNO`) REFERENCES `aluno` (`MATRICULAALUNO`) ON DELETE CASCADE ON UPDATE CASCADE,
  CONSTRAINT `FK_FREQUENCIA_DISCIPLINATURMA` FOREIGN KEY (`CODIGODISCIPLINATURMA`) REFERENCES `disciplinaturma` (`CODIGODISCIPLINATURMA`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `frequencia`
--

LOCK TABLES `frequencia` WRITE;
/*!40000 ALTER TABLE `frequencia` DISABLE KEYS */;
/*!40000 ALTER TABLE `frequencia` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `grade`
--

DROP TABLE IF EXISTS `grade`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `grade` (
  `CODIGOGRADE` int(11) NOT NULL,
  `CODIGOCURSO` int(11) NOT NULL,
  `CODIGOPERIODO` int(11) NOT NULL,
  `CODIGODISCIPLINA` int(11) NOT NULL,
  PRIMARY KEY (`CODIGOGRADE`),
  KEY `FK_GRADE_CURSO` (`CODIGOCURSO`),
  KEY `FK_GRADE_PERIODO` (`CODIGOPERIODO`),
  KEY `FK_GRADE_DISCIPLINA` (`CODIGODISCIPLINA`),
  CONSTRAINT `FK_GRADE_CURSO` FOREIGN KEY (`CODIGOCURSO`) REFERENCES `curso` (`CODIGOCURSO`) ON DELETE CASCADE ON UPDATE CASCADE,
  CONSTRAINT `FK_GRADE_DISCIPLINA` FOREIGN KEY (`CODIGODISCIPLINA`) REFERENCES `disciplina` (`CODIGODISCIPLINA`) ON DELETE CASCADE ON UPDATE CASCADE,
  CONSTRAINT `FK_GRADE_PERIODO` FOREIGN KEY (`CODIGOPERIODO`) REFERENCES `periodo` (`CODIGOPERIODO`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `grade`
--

LOCK TABLES `grade` WRITE;
/*!40000 ALTER TABLE `grade` DISABLE KEYS */;
/*!40000 ALTER TABLE `grade` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `nota`
--

DROP TABLE IF EXISTS `nota`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `nota` (
  `CODIGONOTA` int(11) NOT NULL AUTO_INCREMENT,
  `MATRICULAALUNO` int(11) NOT NULL,
  `RECUPERACAO` varchar(10) DEFAULT NULL,
  `FINAL` varchar(10) DEFAULT NULL,
  `TIPONOTA` varchar(10) DEFAULT NULL,
  `SITUACAO` varchar(15) DEFAULT NULL,
  PRIMARY KEY (`CODIGONOTA`),
  KEY `FK_NOTA_ALUNO` (`MATRICULAALUNO`),
  CONSTRAINT `FK_NOTA_ALUNO` FOREIGN KEY (`MATRICULAALUNO`) REFERENCES `aluno` (`MATRICULAALUNO`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `nota`
--

LOCK TABLES `nota` WRITE;
/*!40000 ALTER TABLE `nota` DISABLE KEYS */;
/*!40000 ALTER TABLE `nota` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `notaconceito`
--

DROP TABLE IF EXISTS `notaconceito`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `notaconceito` (
  `CODIGONOTA` int(11) NOT NULL,
  `CONCEITO1` varchar(10) DEFAULT NULL,
  `CONCEITO2` varchar(10) DEFAULT NULL,
  KEY `FK_NOTACONCEITO_NOTA` (`CODIGONOTA`),
  CONSTRAINT `FK_NOTACONCEITO_NOTA` FOREIGN KEY (`CODIGONOTA`) REFERENCES `nota` (`CODIGONOTA`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `notaconceito`
--

LOCK TABLES `notaconceito` WRITE;
/*!40000 ALTER TABLE `notaconceito` DISABLE KEYS */;
/*!40000 ALTER TABLE `notaconceito` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `notanumero`
--

DROP TABLE IF EXISTS `notanumero`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `notanumero` (
  `CODIGONOTA` int(11) NOT NULL,
  `NOTA1` varchar(10) DEFAULT NULL,
  `NOTA2` varchar(10) DEFAULT NULL,
  KEY `FK_NOTANUMERO_NOTA` (`CODIGONOTA`),
  CONSTRAINT `FK_NOTANUMERO_NOTA` FOREIGN KEY (`CODIGONOTA`) REFERENCES `nota` (`CODIGONOTA`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `notanumero`
--

LOCK TABLES `notanumero` WRITE;
/*!40000 ALTER TABLE `notanumero` DISABLE KEYS */;
/*!40000 ALTER TABLE `notanumero` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `periodo`
--

DROP TABLE IF EXISTS `periodo`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `periodo` (
  `CODIGOPERIODO` int(11) NOT NULL AUTO_INCREMENT,
  `CODIGOCURSO` int(11) NOT NULL,
  `NUMEROPERIODO` int(11) DEFAULT NULL,
  PRIMARY KEY (`CODIGOPERIODO`),
  KEY `FK_PERIODO_CURSO_idx` (`CODIGOCURSO`),
  CONSTRAINT `FK_PERIODO_CURSO` FOREIGN KEY (`CODIGOCURSO`) REFERENCES `curso` (`CODIGOCURSO`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `periodo`
--

LOCK TABLES `periodo` WRITE;
/*!40000 ALTER TABLE `periodo` DISABLE KEYS */;
INSERT INTO `periodo` VALUES (1,2,1),(2,2,2);
/*!40000 ALTER TABLE `periodo` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `professor`
--

DROP TABLE IF EXISTS `professor`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `professor` (
  `CODIGOPROFESSOR` int(11) NOT NULL AUTO_INCREMENT,
  `NOME` varchar(50) DEFAULT NULL,
  `TELEFONE` varchar(15) DEFAULT NULL,
  PRIMARY KEY (`CODIGOPROFESSOR`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `professor`
--

LOCK TABLES `professor` WRITE;
/*!40000 ALTER TABLE `professor` DISABLE KEYS */;
INSERT INTO `professor` VALUES (1,'Fred Lucena','81 99665-7501');
/*!40000 ALTER TABLE `professor` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `professordisciplina`
--

DROP TABLE IF EXISTS `professordisciplina`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `professordisciplina` (
  `CODIGOPROFESSOR` int(11) DEFAULT NULL,
  `CODIGODISCIPLINA` int(11) DEFAULT NULL,
  `CODIGOPROFESSORDISCIPLINA` int(11) NOT NULL AUTO_INCREMENT,
  PRIMARY KEY (`CODIGOPROFESSORDISCIPLINA`),
  KEY `FK_PROFESSORDISCIPLINA_DISCIPLINA` (`CODIGODISCIPLINA`),
  KEY `FK_PROFESSORDISCIPLINA_PROFESSOR` (`CODIGOPROFESSOR`),
  CONSTRAINT `FK_PROFESSORDISCIPLINA_DISCIPLINA` FOREIGN KEY (`CODIGODISCIPLINA`) REFERENCES `disciplina` (`CODIGODISCIPLINA`) ON DELETE CASCADE ON UPDATE CASCADE,
  CONSTRAINT `FK_PROFESSORDISCIPLINA_PROFESSOR` FOREIGN KEY (`CODIGOPROFESSOR`) REFERENCES `professor` (`CODIGOPROFESSOR`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=13 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `professordisciplina`
--

LOCK TABLES `professordisciplina` WRITE;
/*!40000 ALTER TABLE `professordisciplina` DISABLE KEYS */;
INSERT INTO `professordisciplina` VALUES (NULL,1,1),(NULL,3,2),(NULL,4,3),(NULL,5,4),(NULL,6,5),(NULL,7,6),(NULL,8,7),(NULL,9,8),(NULL,10,9),(NULL,11,10),(NULL,12,11),(NULL,13,12);
/*!40000 ALTER TABLE `professordisciplina` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `sala`
--

DROP TABLE IF EXISTS `sala`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `sala` (
  `CODIGOSALA` int(11) NOT NULL AUTO_INCREMENT,
  `DESCRICAOSALA` varchar(10) DEFAULT NULL,
  `CAPACIDADE` int(11) DEFAULT NULL,
  PRIMARY KEY (`CODIGOSALA`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `sala`
--

LOCK TABLES `sala` WRITE;
/*!40000 ALTER TABLE `sala` DISABLE KEYS */;
INSERT INTO `sala` VALUES (2,'Sala 1',30),(3,'Sala 2',30);
/*!40000 ALTER TABLE `sala` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `tipousuario`
--

DROP TABLE IF EXISTS `tipousuario`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `tipousuario` (
  `CODIGOTIPOUSUARIO` int(11) NOT NULL,
  `DESCRICAOTIPOUSUARIO` varchar(50) DEFAULT NULL,
  PRIMARY KEY (`CODIGOTIPOUSUARIO`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `tipousuario`
--

LOCK TABLES `tipousuario` WRITE;
/*!40000 ALTER TABLE `tipousuario` DISABLE KEYS */;
INSERT INTO `tipousuario` VALUES (1,'administrador'),(2,'professor'),(3,'aluno');
/*!40000 ALTER TABLE `tipousuario` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `turma`
--

DROP TABLE IF EXISTS `turma`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `turma` (
  `CODIGOTURMA` int(11) NOT NULL AUTO_INCREMENT,
  `CODIGOPERIODO` int(11) DEFAULT NULL,
  `ANO` varchar(4) DEFAULT NULL,
  `TURNO` varchar(5) DEFAULT NULL,
  PRIMARY KEY (`CODIGOTURMA`),
  KEY `FK_TURMA_PERIODO` (`CODIGOPERIODO`),
  CONSTRAINT `FK_TURMA_PERIODO` FOREIGN KEY (`CODIGOPERIODO`) REFERENCES `periodo` (`CODIGOPERIODO`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `turma`
--

LOCK TABLES `turma` WRITE;
/*!40000 ALTER TABLE `turma` DISABLE KEYS */;
/*!40000 ALTER TABLE `turma` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `usuario`
--

DROP TABLE IF EXISTS `usuario`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `usuario` (
  `CODIGOUSUARIO` int(11) NOT NULL AUTO_INCREMENT,
  `CODIGOTIPOUSUARIO` int(11) NOT NULL,
  `USUARIOLOGIN` varchar(50) NOT NULL,
  `SENHA` int(11) NOT NULL,
  `CONFIRMARSENHA` int(11) NOT NULL,
  PRIMARY KEY (`CODIGOUSUARIO`),
  KEY `FK_USUARIO_TIPOUSUARIO` (`CODIGOTIPOUSUARIO`),
  CONSTRAINT `FK_USUARIO_TIPOUSUARIO` FOREIGN KEY (`CODIGOTIPOUSUARIO`) REFERENCES `tipousuario` (`CODIGOTIPOUSUARIO`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `usuario`
--

LOCK TABLES `usuario` WRITE;
/*!40000 ALTER TABLE `usuario` DISABLE KEYS */;
INSERT INTO `usuario` VALUES (1,1,'admin',12345,12345),(2,1,'fredlucena',12345,12345);
/*!40000 ALTER TABLE `usuario` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Dumping events for database 'faculdade'
--

--
-- Dumping routines for database 'faculdade'
--
/*!40103 SET TIME_ZONE=@OLD_TIME_ZONE */;

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;

-- Dump completed on 2016-12-05 18:10:58
