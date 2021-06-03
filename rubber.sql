CREATE DATABASE  IF NOT EXISTS `sistemarubber` /*!40100 DEFAULT CHARACTER SET utf8 COLLATE utf8_unicode_ci */;
USE `sistemarubber`;
-- MySQL dump 10.13  Distrib 5.7.33, for Win32 (AMD64)
--
-- Host: 127.0.0.1    Database: sistemarubber
-- ------------------------------------------------------
-- Server version	5.7.31

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
-- Table structure for table `cad_parcelas`
--

DROP TABLE IF EXISTS `cad_parcelas`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `cad_parcelas` (
  `id_parcelas` int(11) NOT NULL AUTO_INCREMENT,
  `nr_parcelas` int(11) NOT NULL,
  `data_vencimento_parcelas` date NOT NULL,
  `valor_parcelas` decimal(10,2) NOT NULL DEFAULT '0.00',
  PRIMARY KEY (`id_parcelas`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `cad_parcelas`
--

LOCK TABLES `cad_parcelas` WRITE;
/*!40000 ALTER TABLE `cad_parcelas` DISABLE KEYS */;
/*!40000 ALTER TABLE `cad_parcelas` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `tbborracheiros`
--

DROP TABLE IF EXISTS `tbborracheiros`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `tbborracheiros` (
  `idborracheiros` int(11) NOT NULL AUTO_INCREMENT,
  `nome` varchar(45) DEFAULT NULL,
  `situacao` varchar(15) DEFAULT NULL,
  `data_admissao` date DEFAULT NULL,
  `comissao` decimal(10,2) DEFAULT NULL,
  `observacao` tinyblob,
  PRIMARY KEY (`idborracheiros`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `tbborracheiros`
--

LOCK TABLES `tbborracheiros` WRITE;
/*!40000 ALTER TABLE `tbborracheiros` DISABLE KEYS */;
/*!40000 ALTER TABLE `tbborracheiros` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `tbcaixa`
--

DROP TABLE IF EXISTS `tbcaixa`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `tbcaixa` (
  `idcaixa` int(11) NOT NULL AUTO_INCREMENT,
  `descricao` varchar(45) COLLATE utf8_unicode_ci NOT NULL,
  `banco` varchar(2) COLLATE utf8_unicode_ci NOT NULL,
  `saldo_inicial` decimal(10,2) NOT NULL DEFAULT '0.00',
  `saldo_final` decimal(10,2) DEFAULT '0.00',
  `status` varchar(2) COLLATE utf8_unicode_ci NOT NULL DEFAULT 'A',
  `hora_abertura` datetime DEFAULT NULL,
  `hora_fechamento` datetime DEFAULT NULL,
  PRIMARY KEY (`idcaixa`)
) ENGINE=MyISAM AUTO_INCREMENT=3 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `tbcaixa`
--

LOCK TABLES `tbcaixa` WRITE;
/*!40000 ALTER TABLE `tbcaixa` DISABLE KEYS */;
INSERT INTO `tbcaixa` VALUES (1,'Caixa Vision','C1',0.00,0.00,'A','2020-04-03 16:32:46','2020-04-03 16:32:44'),(2,'Caixa Rhuan','R1',1411.00,0.00,'A','2020-04-03 16:32:46','2020-03-03 15:22:19');
/*!40000 ALTER TABLE `tbcaixa` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `tbcategorias`
--

DROP TABLE IF EXISTS `tbcategorias`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `tbcategorias` (
  `idcategoria` int(11) NOT NULL AUTO_INCREMENT,
  `nome` varchar(255) DEFAULT NULL,
  `habilitado` varchar(1) DEFAULT 'S',
  `modificado` datetime DEFAULT NULL,
  PRIMARY KEY (`idcategoria`)
) ENGINE=MyISAM AUTO_INCREMENT=26 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `tbcategorias`
--

LOCK TABLES `tbcategorias` WRITE;
/*!40000 ALTER TABLE `tbcategorias` DISABLE KEYS */;
INSERT INTO `tbcategorias` VALUES (25,'Recapagem','S',NULL);
/*!40000 ALTER TABLE `tbcategorias` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `tbclientes`
--

DROP TABLE IF EXISTS `tbclientes`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `tbclientes` (
  `reg` int(11) NOT NULL AUTO_INCREMENT,
  `nome` varchar(100) DEFAULT NULL,
  `nomefantasia` varchar(255) DEFAULT NULL,
  `apelido` varchar(45) DEFAULT NULL,
  `tipocad` varchar(1) NOT NULL,
  `tipopessoa` varchar(1) NOT NULL,
  `iss` varchar(2) NOT NULL,
  `cpf` varchar(14) DEFAULT NULL,
  `cnpj` varchar(18) DEFAULT NULL,
  `rg` varchar(20) DEFAULT NULL,
  `telefone` varchar(15) DEFAULT NULL,
  `telefone2` varchar(15) DEFAULT NULL,
  `dt_nascimento` varchar(10) DEFAULT NULL,
  `data_cadastro` datetime DEFAULT NULL,
  `modificado` datetime DEFAULT NULL,
  `usuid` int(11) DEFAULT NULL,
  `habilitado` varchar(1) DEFAULT 'S',
  `cep` varchar(10) DEFAULT NULL,
  `endereco` varchar(100) DEFAULT NULL,
  `bairro` varchar(100) DEFAULT NULL,
  `uf` varchar(2) DEFAULT NULL,
  `cidade` varchar(100) DEFAULT NULL,
  `complemento` varchar(150) DEFAULT NULL,
  `numero` int(11) DEFAULT NULL,
  PRIMARY KEY (`reg`)
) ENGINE=MyISAM AUTO_INCREMENT=107 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `tbclientes`
--

LOCK TABLES `tbclientes` WRITE;
/*!40000 ALTER TABLE `tbclientes` DISABLE KEYS */;
INSERT INTO `tbclientes` VALUES (104,'Rhuan Yago Aragão',NULL,'Rhuan','C','F','N','009.697.219-00',NULL,'126097140','(43) 99626-8534',NULL,'14/10/1998','2020-03-05 00:00:00',NULL,1,'S','86807-360','Rua Emílio de Menezes','Jardim América','PR','Apucarana','Casa',165),(105,'Brasil Rubber Com de Pneus Eireli - ME','Brasil Recapagem',NULL,'F','J','N',NULL,'13.638.479/0001-38',NULL,'(43) 3152-4801','(43) 9962-1234','','2020-03-05 00:00:00',NULL,1,'S','86706-695','Rua Andorinha do Rio','Parque Industrial III','PR','Arapongas',NULL,36),(106,'Beatriz Eduarda Sanches','','Beatriz','C','F','N','158.797.977-79','','125879876','(43) 99687-9797','','03/07/2000','2020-03-05 16:57:48',NULL,1,'S','86807-360','Rua Emílio de Menezes','Jardim América','PR','Apucarana','casa',879);
/*!40000 ALTER TABLE `tbclientes` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `tbcotacao`
--

DROP TABLE IF EXISTS `tbcotacao`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `tbcotacao` (
  `idcotacao` int(11) NOT NULL AUTO_INCREMENT,
  `favorecido` varchar(100) DEFAULT NULL,
  `usuid` int(11) DEFAULT NULL,
  `data_inc` datetime DEFAULT NULL,
  `tipo` varchar(2) DEFAULT NULL,
  `status` varchar(1) DEFAULT 'A',
  PRIMARY KEY (`idcotacao`)
) ENGINE=MyISAM AUTO_INCREMENT=27 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `tbcotacao`
--

LOCK TABLES `tbcotacao` WRITE;
/*!40000 ALTER TABLE `tbcotacao` DISABLE KEYS */;
INSERT INTO `tbcotacao` VALUES (25,'PREFEITURA MUNICIPAL SANTO ANTONIO DA PLATINA',12,'2020-04-27 17:21:49','CT','A'),(24,'dad',1,'2020-04-24 13:58:36','CT','D'),(23,'testeeee',1,'2020-04-24 13:45:21','L','D'),(20,'TESTEE',1,'2020-04-24 13:26:46','CT','D'),(13,'PREFEITURA DE CASCAVEL',1,'2020-04-16 09:22:30','CT','F'),(14,'Prefeitura Municipal de Goioxim',1,'2020-04-16 09:38:48','CT','F'),(22,'ada',1,'2020-04-24 13:42:44','CT','D'),(18,'PREFEITURA DE SANTA HELENA',12,'2020-04-23 17:04:03','CT','A'),(21,'testee',1,'2020-04-24 13:30:24','CT','D'),(16,'LICITAÇÃO - PREFEITURA DE CIANORTE',1,'2020-04-22 17:35:50','L','F'),(19,'dawd',1,'2020-04-24 10:26:59','L','D'),(26,'dsdsa',1,'2021-06-03 10:08:07','L','F');
/*!40000 ALTER TABLE `tbcotacao` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `tbcotacao_precos`
--

DROP TABLE IF EXISTS `tbcotacao_precos`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `tbcotacao_precos` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `idcotacao` int(11) NOT NULL,
  `item` int(11) DEFAULT NULL,
  `descricao` varchar(1000) DEFAULT NULL,
  `tipo` varchar(45) DEFAULT NULL,
  `quantidade` double DEFAULT NULL,
  `valor_unitario` decimal(10,2) DEFAULT NULL,
  `valor_total` decimal(10,2) DEFAULT NULL,
  PRIMARY KEY (`id`,`idcotacao`)
) ENGINE=MyISAM AUTO_INCREMENT=1250 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `tbcotacao_precos`
--

LOCK TABLES `tbcotacao_precos` WRITE;
/*!40000 ALTER TABLE `tbcotacao_precos` DISABLE KEYS */;
INSERT INTO `tbcotacao_precos` VALUES (249,2,13,'Recauchutagem p/ pneu 1400x24, 12 lonas, p/ motoniveladora ','Sv',8,312.00,2496.00),(248,2,12,'Recauchutagem p/ pneu 231x26 Rolo compactador ','Sv',2,487.00,974.00),(247,2,11,'Recauchutagem de pneu liso 900x20, a frio, c/ espessura mínima de 15mm ','Sv',6,697.00,4182.00),(246,2,10,'Recauchutagem de pneu borrachudo 900x20, a frio, c/ espessura mínima de 15mm ','Sv',2,580.00,1160.00),(245,2,9,'Recauchutagem de pneu 19.5x24, mínimo 12 lonas, traseiro p/ retroescavadeira ','Sv',9,1140.00,10260.00),(244,2,8,'Recauchutagem de pneu 17.5x25, L2, mínimo 12 lonas, traseiro p/ retroescavadeira ','Sv',15,1250.00,18750.00),(243,2,7,'Recauchutagem de pneu 17.5x25 Pá Carregadeira','Sv',9,245.00,2205.00),(242,2,6,'Recauchutagem de pneu 1400x24, 20 lonas, altura mínima de 25mm p/ patrola','Sv',8,365.00,2920.00),(241,2,5,'Recauchutagem de pneu 12.5/80/18, c/ garradeiras p/ retroescavadeira ','Sv',2,35.00,70.00),(240,2,4,'Recauchutagem de pneu1000Rx20 ,16 lonas liso, p/ caminhão  ','Sv',5,6570.00,32850.00),(239,2,3,'Recauchutagem de pneu1000Rx20 ,16 lonas radial, borrachudo, p/ caminhão  ','Sv',6,564.00,3384.00),(238,2,2,'Recauchutagem de pneu liso 1000x20, a frio, c/ espessura mínima de 15mm','Sv',4,6970.00,27880.00),(237,2,1,'Recauchutagem de pneu borrachudo 1000x20, a frio, c/ espessura mínima de 15mm ','Sv',20,450.00,9000.00),(230,6,21,'Recauchutagem de pneu 235/75 aro 17.5 ','Sv',3,540.00,1620.00),(229,6,20,'Recauchutagem de pneu 275/80 aro 22.5 radial misto','Sv',3,120.00,360.00),(228,6,19,'Recauchutagem de pneu 215/75/17.5 borrachudo, a frio, c/ espessura mínima de 15mm','Sv',3,647.00,1941.00),(224,6,15,'Recauchutagem de pneu 23.1x30, trator traçado, traseiro ','Sv',4,970.00,3880.00),(225,6,16,'Recauchutagem de pneu agrícola 18.4x34, traseiro ','Sv',3,120.00,360.00),(226,6,17,'Recauchutagem de pneu agrícola 14.9x24, dianteiro,12 lonas ','Sv',3,480.00,1440.00),(227,6,18,'Recauchutagem de pneu borrachudo 7.50x16, 12 lonas p/ veicular para carreta agrícola','Sv',3,6970.00,20910.00),(222,6,13,'Recauchutagem p/ pneu 1400x24, 12 lonas, p/ motoniveladora ','Sv',2,2540.00,5080.00),(223,6,14,'Recauchutagem de pneu agrícola 14.9x28, dianteiro ','Sv',10,698.70,6987.00),(221,6,12,'Recauchutagem p/ pneu 231x26 Rolo compactador ','Sv',3,320.00,960.00),(220,6,11,'Recauchutagem de pneu liso 900x20, a frio, c/ espessura mínima de 15mm ','Sv',3,451.00,1353.00),(219,6,10,'Recauchutagem de pneu borrachudo 900x20, a frio, c/ espessura mínima de 15mm ','Sv',3,6540.00,19620.00),(217,6,8,'Recauchutagem de pneu 17.5x25, L2, mínimo 12 lonas, traseiro p/ retroescavadeira ','Sv',10,439.00,4390.00),(218,6,9,'Recauchutagem de pneu 19.5x24, mínimo 12 lonas, traseiro p/ retroescavadeira ','Sv',4,2540.00,10160.00),(216,6,7,'Recauchutagem de pneu 17.5x25 Pá Carregadeira','Sv',3,245.00,735.00),(215,6,6,'Recauchutagem de pneu 1400x24, 20 lonas, altura mínima de 25mm p/ patrola','Sv',5,625.50,3127.50),(214,6,5,'Recauchutagem de pneu 12.5/80/18, c/ garradeiras p/ retroescavadeira ','Sv',3,150.00,450.00),(213,6,4,'Recauchutagem de pneu1000Rx20 ,16 lonas liso, p/ caminhão  ','Sv',3,415.00,1245.00),(212,6,3,'Recauchutagem de pneu1000Rx20 ,16 lonas radial, borrachudo, p/ caminhão  ','Sv',3,250.00,750.00),(211,6,2,'Recauchutagem de pneu liso 1000x20, a frio, c/ espessura mínima de 15mm','Sv',20,980.00,19600.00),(210,6,1,'Recauchutagem de pneu borrachudo 1000x20, a frio, c/ espessura mínima de 15mm ','Sv',4,450.00,1800.00),(207,1,20,'Serviço de recapagem, a frio, de pneu borrachudo 1000 x20.','Sv',4,1480.00,5920.00),(208,1,30,'Serviço de recapagem, a frio, de pneu borrachudo 750 x 16','Sv',24,150.00,3600.00),(209,1,50,'Serviço de recauchutagem, a quente, para pneu 12.5/80 x 18\" agrícola profundidade mínima de sulco 24,6 mm.','Sv',2,214.65,429.30),(250,2,14,'Recauchutagem de pneu agrícola 14.9x28, dianteiro ','Sv',100,338.00,33800.00),(251,2,15,'Recauchutagem de pneu 23.1x30, trator traçado, traseiro ','Sv',100,143.00,14300.00),(252,2,16,'Recauchutagem de pneu agrícola 18.4x34, traseiro ','Sv',4,587.00,2348.00),(253,2,17,'Recauchutagem de pneu agrícola 14.9x24, dianteiro,12 lonas ','Sv',6,587.00,3522.00),(254,2,18,'Recauchutagem de pneu borrachudo 7.50x16, 12 lonas p/ veicular para carreta agrícola','Sv',3,654.00,1962.00),(255,2,19,'Recauchutagem de pneu 215/75/17.5 borrachudo, a frio, c/ espessura mínima de 15mm','Sv',8,120.00,960.00),(256,2,20,'Recauchutagem de pneu 275/80 aro 22.5 radial misto','Sv',10,1690.00,16900.00),(257,2,21,'Recauchutagem de pneu 235/75 aro 17.5 ','Sv',1,147.00,147.00),(258,5,20,'Serviço de recapagem, a frio, de pneu borrachudo 1000 x20.','Sv',4,250.00,1000.00),(259,5,30,'Serviço de recapagem, a frio, de pneu borrachudo 750 x 16','Sv',24,650.00,15600.00),(260,5,50,'Serviço de recauchutagem, a quente, para pneu 12.5/80 x 18\" agrícola profundidade mínima de sulco 24,6 mm.','Sv',2,0.00,0.00),(261,7,20,'Serviço de recapagem, a frio, de pneu borrachudo 1000 x20.','Sv',4,0.00,0.00),(262,7,30,'Serviço de recapagem, a frio, de pneu borrachudo 750 x 16','Sv',24,0.00,0.00),(263,7,50,'Serviço de recauchutagem, a quente, para pneu 12.5/80 x 18\" agrícola profundidade mínima de sulco 24,6 mm.','Sv',2,0.00,0.00),(264,8,1,'RECAPAGEM A QUENTE DE PNEU 17.5/25 ALTURA MINIMA DO SULCO 32MM L2','SV',28,2100.00,58800.00),(265,8,2,'VULCANIZAÇÃO PNEU 17.5/25','SV',10,410.00,4100.00),(266,8,3,'CONSERTO','SV',40,65.00,2600.00),(267,9,1,'RECAPAGEM A QUENTE DE PNEU 17.5/25 ALTURA MINIMA DO SULCO 32MM L2','SV',12,1950.00,23400.00),(268,9,2,'VULCANIZAÇÃO PNEU 17.5/25','SV',12,450.00,5400.00),(269,9,3,'CONSERTO','SV',10,95.00,950.00),(270,10,1,'RECAPAGEM A QUENTE DE PNEU 17.5/25 ALTURA MINIMA DO SULCO 32MM L2','SV',12,1950.00,23400.00),(271,10,2,'VULCANIZAÇÃO PNEU 17.5/25','SV',12,480.00,5760.00),(272,10,3,'CONSERTO','SV',10,59.00,590.00),(273,11,1,'RECAPAGEM A QUENTE DE PNEU 17.5/25 ALTURA MINIMA DO SULCO 32MM L2','SV',3,458.00,1374.00),(274,11,2,'VULCANIZAÇÃO PNEU 17.5/25','SV',20,980.00,19600.00),(275,11,3,'CONSERTO','SV',15,254.00,3810.00),(276,12,1,'RECAPAGEM A QUENTE DE PNEU 17.5/25 ALTURA MINIMA DO SULCO 32MM L2','SV',50,12000.00,600000.00),(277,12,2,'VULCANIZAÇÃO PNEU 17.5/25','SV',25,154.00,3850.00),(278,12,3,'CONSERTO','SV',5,1400.00,7000.00),(1129,14,46,'SERVIÇO DE MANCHÃO RADIAL RAC 42','UNID',100,47.00,4700.00),(1128,14,45,'SERVIÇO DE MANCHÃO RADIAL RAC 40','UNID',100,31.00,3100.00),(1127,14,44,'SERVIÇO DE MANCHÃO RADIAL RAC 25','UNID',100,27.00,2700.00),(1126,14,43,'SERVIÇO DE MANCHÃO RADIAL RAC 24','UNID',100,20.00,2000.00),(1123,14,40,'SERVIÇO DE MANCHÃO CONVENCIONAL  ND 07','UNID',100,61.00,6100.00),(1124,14,41,'SERVIÇO DE MANCHÃO RADIAL RAC 20','UNID',100,13.20,1320.00),(1122,14,39,'SERVIÇO DE MANCHÃO CONVENCIONAL  ND 06','UNID',100,48.00,4800.00),(1121,14,38,'SERVIÇO DE MANCHÃO CONVENCIONAL  ND 05','UNID',100,20.00,2000.00),(1119,14,36,'SERVIÇO DE MANCHÃO CONVENCIONAL  ND 03','UNID',100,11.00,1100.00),(1120,14,37,'SERVIÇO DE MANCHÃO CONVENCIONAL  ND 04','UNID',100,15.00,1500.00),(1117,14,34,'Recapagem 1.400/24  20 LONAS  RADIAL','UNID',20,1562.00,31240.00),(1118,14,35,'SERVIÇO DE MANCHÃO CONVENCIONAL  ND 02','UNID',100,8.80,880.00),(1115,14,32,'Recapagem 18.4-30  ','UNID',10,2100.00,21000.00),(1116,14,33,'Recapagem 12.4-24  ','UNID',10,812.00,8120.00),(1111,14,28,'RECAPAGEM 275/80R22,5 LISO profundidade mínima de 15mm  ','UNID',5,520.00,2600.00),(1112,14,29,'RECAUCHUTAGEM 275/80R22,5 mínimo 12mm  ','UNID',5,520.00,2600.00),(1113,14,30,'RECAPAGEM 215/75R17,5 BORRACHUDO profundidade mínima de 16mm  ','UNID',5,351.00,1755.00),(1114,14,31,'RECAPAGEM 215/75R17,5 LISO profundidade mínima de 14mm  ','UNID',5,351.00,1755.00),(1109,14,26,'RECAPAGEM 750/16 LISO profundidade mínima de 14mm  ','UNID',5,299.00,1495.00),(1108,14,25,'RECAPAGEM 750/16 RORRACHUDO profundidade mínima de 14mm  ','UNID',5,312.00,1560.00),(1110,14,27,'RECAPAGEM 275/80R22,5 BORRACHUDO, com profundidade mínima de 18mm  ','UNID',5,546.00,2730.00),(1106,14,23,'RECAUCHUTAGEM 12.5/80R18  ','UNID',5,800.00,4000.00),(1107,14,24,'VULCANIZAÇÃO 12.5/80R18  ','UNID',5,280.00,1400.00),(619,13,1,'RECAPAGEM DE PNEU 7.50X16 LISO, COM PROFUNDIDADE MÍNIMA DE SULCO DE 12MM ','UNID',1,286.00,286.00),(620,13,2,'VULCANIZAÇÃO DE PNEU 7.50X16 (ATÉ 5CM)','UNID',1,117.00,117.00),(621,13,3,'RECAPAGEM DE PNEU 7.50X16 BORRACHUDO, COM PROFUNDIDADE MÍNIMA DE SULCO 12,5MM','UNID',1,312.00,312.00),(622,13,4,'VULCANIZAÇÃO DE PNEU 7.50X16 (ATÉ 5CM)','UNID',1,117.00,117.00),(623,13,5,'RECAPAGEM DE PNEU 10X16.5 10 LONAS PARA BOBCAT','UNID',1,625.00,625.00),(624,13,6,'VULCANIZAÇÃO DE PNEU 10x16.5 (ATÉ 5CM)','UNID',1,125.00,125.00),(1194,20,7,'Recauchutagem de pneu 17.5x25 Pá Carregadeira','Sv',1,0.00,0.00),(627,13,9,'RECAPAGEM DE PNEU 12X16.5 10 LONAS PARA BOBCAT','UNID',1,650.00,650.00),(628,13,10,'VULCANIZAÇÃO DE PNEU 12X16.5 10 LONAS PARA BOBCAT','UNID',1,125.00,125.00),(629,13,11,'RECAPAGEM DE PNEU 14.9X24 AGRÍCOLA COM ALTURA MÍNIMA DAS GARRAS DE 35MM','UNID',1,1150.00,1150.00),(630,13,12,'VULCANIZAÇÃO DE PNEU 14.9X24 (ATÉ 5CM)','UNID',1,312.50,312.50),(631,13,13,'RECAPAGEM DE PNEU 16.9X24 COM ALTURA MÍNIMA DAS GARRAS DE 24MM (P/ RETROESCAVADEIRA)','UNID',1,1587.00,1587.00),(632,13,14,'VULCANIZAÇÃO DE PNEU 16.9X24 (ATÉ 5CM)','UNID',1,337.00,337.00),(633,13,15,'RECAPAGEM DE PNEU 17.5X25  (RADIAL) COM ALTURA MÍNIMA DAS GARRAS DE 25MM','UNID',1,1912.00,1912.00),(634,13,16,'VULCANIZAÇÃO DE PNEU 17.5X25 RADIAL (ATÉ 5CM)','UNID',1,487.00,487.00),(635,13,17,'RECAPAGEM DE PNEU 17.5X25 MODELO L2 COM ALTURA MÍNIMA DAS GARRAS DE 25MM','UNID',1,1650.00,1650.00),(636,13,18,'VULCANIZAÇÃO DE PNEU 17.5X25 (ATÉ 5CM','UNID',1,487.00,487.00),(637,13,19,'RECAPAGEM DE PNEU 18.4X30 AGRÍCOLA COM ALTURA MÍNIMA DAS GARRAS DE 35MM ','UNID',1,2100.00,2100.00),(638,13,20,'VULCANIZAÇÃO DE PNEU 18.4X30 (ATÉ 5CM)','UNID',1,375.00,375.00),(639,13,21,'RECAPAGEM DE PNEU 18.4X34 AGRÍCOLA COM ALTURA MÍNIMA DAS GARRAS DE 35MM','UNID',1,2225.00,2225.00),(640,13,22,'VULCANIZAÇÃO DE PNEU 18.4X34 (ATÉ 5CM)','UNID',1,375.00,375.00),(641,13,23,'RECAPAGEM DE PNEU 20.5X25 MODELO L3 COM ALTURA MÍNIMA DAS GARRAS DE 25MM ','UNID',1,3250.00,3250.00),(642,13,24,'VULCANIZAÇÃO DE PNEU 20.5X25 (ATÉ 5CM)','UNID',1,562.00,562.00),(1193,20,6,'Recauchutagem de pneu 1400x24, 20 lonas, altura mínima de 25mm p/ patrola','Sv',1,0.00,0.00),(644,13,26,'VULCANIZAÇÃO DE PNEU 20.5X25 (ATÉ 5CM)','UNID',1,562.00,562.00),(645,13,27,'RECAPAGEM DE PNEU 23.1X26 COM ALTURA MÍNIMA DAS GARRAS DE 36MM (P/ ROLO COMPACTADOR) ','UNID',1,3250.00,3250.00),(646,13,28,'VULCANIZAÇÃO DE PNEU 23.1X26 (ATÉ 5CM)','UNID',1,500.00,500.00),(647,13,29,'RECAPAGEM DE PNEU 215/75R17,5 MISTO, COM PROFUNDIDADE MÍNIMA DE SULCO DE 12MM ','UNID',1,351.00,351.00),(648,13,30,'VULCANIZAÇÃO DE PNEU 215/75R17,5 PARA CAMINHÃO','UNID',1,143.00,143.00),(649,13,31,'RECAPAGEM DE PNEU 235/70R16 RODOVIÁRIO, MISTO, COM PROFUNDIDADE MINIMA DE SULCO DE 12,5MM','UNID',1,350.00,350.00),(650,13,32,'VULCANIZAÇÃO DE PNEU 235/70R16 PARA CAMINHÃO','UNID',1,180.00,180.00),(651,13,33,'RECAPAGEM DE PNEU 275/80R22.5 LISO, PARA CAMINHÃO ','UNID',1,520.00,520.00),(652,13,34,'VULCANIZAÇÃO DE PNEU 275/80R22.5 PARA CAMINHÃO','UNID',1,208.00,208.00),(653,13,35,'RECAPAGEM DE PNEU 275/80R22.5 BORRACHUDO, PARA CAMINHÃO ','UNID',1,546.00,546.00),(654,13,36,'VULCANIZAÇÃO DE PNEU 275/80R22.5 PARA CAMINHÃO','UNID',1,208.00,208.00),(655,13,37,'RECAPAGEM DE PNEU 295/80R22.5 LISO, PARA CAMINHÃO ','UNID',1,520.00,520.00),(656,13,38,'VULCANIZAÇÃO DE PNEU 295/80R22.5 PARA CAMINHÃO','UNID',1,208.00,208.00),(657,13,39,'RECAPAGEM DE PNEU 295/80R22.5 BORRACHUDO, PARA CAMINHÃO ','UNID',1,598.00,598.00),(658,13,40,'VULCANIZAÇÃO DE PNEU 295/80R22.5 PARA CAMINHÃO','UNID',1,208.00,208.00),(1192,20,5,'Recauchutagem de pneu 12.5/80/18, c/ garradeiras p/ retroescavadeira ','Sv',1,0.00,0.00),(1191,20,4,'Recauchutagem de pneu1000Rx20 ,16 lonas liso, p/ caminhão  ','Sv',1,0.00,0.00),(1165,17,50,'Serviço de recauchutagem, a quente, para pneu 12.5/80 x 18\" agrícola profundidade mínima de sulco 24,6 mm.','Sv',2,980.00,1960.00),(663,13,45,'RECAPAGEM DE PNEU 900X16 AGRÍCOLA COM ALTURA MÍNIMA DAS GARRAS DE 14MM ','UNID',1,750.00,750.00),(664,13,46,'VULCANIZAÇÃO DE PNEU 900X16 (ATÉ 5CM)','UNID',1,220.00,220.00),(665,13,47,'RECAPAGEM DE PNEU 900X20 BORRACHUDO COM PROFUNDIDADE MÍNIMA DE SULCO DE 15MM ','UNID',1,429.00,429.00),(666,13,48,'VULCANIZAÇÃO DE PNEU 900X20 (ATÉ 5CM)','UNID',1,169.00,169.00),(667,13,49,'RECAPAGEM DE PNEU 900X20 LISO, COM PROFUNDIDADE MÍNIMA DE SULCO DE 14MM ','UNID',1,416.00,416.00),(668,13,50,'VULCANIZAÇÃO DE PNEU 900X20 (ATÉ 5CM)','UNID',1,169.00,169.00),(669,13,51,'RECAPAGEM DE PNEU 1000X20 LISO COM PROFUNDIDADE MÍNIMA DE SULCO DE 14MM ','UNID',1,468.00,468.00),(670,13,52,'VULCANIZAÇÃO DE PNEU 1000X20 (ATÉ 5CM)','UNID',1,169.00,169.00),(671,13,53,'RECAPAGEM DE PNEU 1000X20 BORRACHUDO, COM PROFUNDIDADE MÍNIMA DE SULCO DE 15MM ','UNID',1,494.00,494.00),(672,13,54,'VULCANIZAÇÃO DE PNEU 1000X20 (ATÉ 5CM)','UNID',1,169.00,169.00),(673,13,55,'RECAPAGEM DE PNEU 1300X24 MODELO L2 COM ALTURA MÍNIMA DAS GARRAS DE 23MM ','UNID',1,1225.00,1225.00),(674,13,56,'VULCANIZAÇÃO DE PNEU 1300X24 (ATÉ 5CM)','UNID',1,350.00,350.00),(675,13,57,'RECAPAGEM DE PNEU 1400X24 LISO MODELO SLICK ','UNID',1,1375.00,1375.00),(676,13,58,'VULCANIZAÇÃO DE PNEU 1400X24 (ATÉ 5CM)','UNID',1,350.00,350.00),(677,13,59,'RECAPAGEM DE PNEU 1400X24 MODELO L2 COM ALTURA MÍNIMA DAS GARRAS DE 25MM ','UNID',1,1375.00,1375.00),(678,13,60,'VULCANIZAÇÃO DE PNEU 1400X24 MODELO L2 COM ALTURA MINIMA DAS GARRAS DE 25MM ','UNID',1,350.00,350.00),(679,13,61,'RECAPAGEM DE PNEU 11L15 12 LONAS I-1','UNID',1,850.00,850.00),(680,13,62,'VULCANIZAÇÃO DE PNEU 11L15 12 LONAS I-1','UNID',1,220.00,220.00),(1164,17,30,'Serviço de recapagem, a frio, de pneu borrachudo 750 x 16','Sv',24,254.00,6096.00),(1163,17,20,'Serviço de recapagem, a frio, de pneu borrachudo 1000 x20.','Sv',4,58.00,232.00),(1189,20,2,'Recauchutagem de pneu liso 1000x20, a frio, c/ espessura mínima de 15mm','Sv',1,0.00,0.00),(1181,19,1,'dwda','UNID',6,687.00,4122.00),(1185,19,2,'testeee','UNID',8,874.00,6992.00),(1184,19,3,'dda','UNID',9,247.00,2223.00),(1186,19,4,'dada','UNID',13,245.00,3185.00),(1188,20,1,'Recauchutagem de pneu borrachudo 1000x20, a frio, c/ espessura mínima de 15mm ','Sv',1,0.00,0.00),(1157,16,7,'Servico de ressolagem quente em pneus de medida 18.4/30','UNID',20,542.00,10840.00),(1156,16,6,'Serviço de duplagem em pneus de medida 17.5x25.','UNID',15,629.00,9435.00),(1155,16,5,'Servico de ressolagem quente em pneus de medida 17.5x25.','UNID',24,316.00,7584.00),(1153,16,3,'Serviço de ressolagem quente em pneus de medida 1.400x24.','UNID',20,588.00,11760.00),(1154,16,4,'Serviço de duplagem em pneus de medida 1.400x24.','UNID',10,810.00,8100.00),(695,13,77,'RECAPAGEM DE PNEU P/UTILITARIO (CAMINHONETE) AT 245/75R16; DIMENSOES DO PNEU: AT 245/75R16; TIPO DE CONSTRUCAO: RADIAL; ESTRUTURA DO PNEU: NORMAL; DIAMETRO DO ARO: 16; CAPACIDADE OU INDICE DE CARGA DO PNEU: IC 113 OU SUPERIOR; ORGAO COMPETENTE PARA CERTIFICAR A QUALI- DADE DO PNEU: INMETRO(DESENHO ATR OU SIMILAR PARA USO ASFALTO E ESTRADAS IRREGULARES - CHÂO)','UNID',1,350.00,350.00),(696,13,78,'VULCANIZAÇÃO DE PNEU P/UTILITARIO (CAMINHONETE) AT 245/75R16; DIMENSOES DO PNEU: AT 245/75R16; TIPO DE CONSTRUCAO: RADIAL; ESTRUTURA DO PNEU: NORMAL; DIAMETRO DO ARO: 16; CAPACIDADE OU INDICE DE CARGA DO PNEU: IC 113 OU SUPERIOR; ORGAO COMPETENTE PARA CERTIFICAR A QUALI- DADE DO PNEU: INMETRO(DESENHO ATR OU SIMILAR PARA USO ASFALTO E ESTRADAS IRREGULARES - CHÂO)','UNID',1,180.00,180.00),(697,13,79,'SERVIÇO DE MANCHÃO CONVENCIONAL  ND 02','UNID',1,8.80,8.80),(698,13,80,'SERVIÇO DE MANCHÃO CONVENCIONAL  ND 03','UNID',1,11.00,11.00),(699,13,81,'SERVIÇO DE MANCHÃO CONVENCIONAL  ND 04','UNID',1,15.00,15.00),(700,13,82,'SERVIÇO DE MANCHÃO CONVENCIONAL  ND 05','UNID',1,20.00,20.00),(701,13,83,'SERVIÇO DE MANCHÃO CONVENCIONAL  ND 06','UNID',1,48.00,48.00),(702,13,84,'SERVIÇO DE MANCHÃO CONVENCIONAL  ND 07','UNID',1,61.00,61.00),(703,13,85,'SERVIÇO DE MANCHÃO RADIAL RAC 20','UNID',1,13.20,13.20),(704,13,86,'SERVIÇO DE MANCHÃO RADIAL RAC 22','UNID',1,15.00,15.00),(705,13,87,'SERVIÇO DE MANCHÃO RADIAL RAC 24','UNID',1,20.00,20.00),(706,13,88,'SERVIÇO DE MANCHÃO RADIAL RAC 25','UNID',1,27.00,27.00),(707,13,89,'SERVIÇO DE MANCHÃO RADIAL RAC 40','UNID',1,31.00,31.00),(708,13,90,'SERVIÇO DE MANCHÃO RADIAL RAC 42','UNID',1,47.00,47.00),(1105,14,22,'RECAPAGEM 12.5/80R18  ','UNID',5,800.00,4000.00),(1104,14,21,'VULCANIZAÇÃO 14.9/28  ','UNID',5,312.00,1560.00),(1103,14,20,'RECAUCHUTAGEM 14.9/28  ','UNID',5,1312.00,6560.00),(1102,14,19,'RECAPAGEM 14.9/28  ','UNID',5,1312.00,6560.00),(1100,14,17,'RECAUCHUTAGEM 17.5/25  ','UNID',10,1650.00,16500.00),(1101,14,18,'VULCANIZAÇÃO 17.5/25  ','UNID',10,487.00,4870.00),(1099,14,16,'RECAPAGEM 17.5/25  ','UNID',20,1650.00,33000.00),(1098,14,15,'VULCANIZAÇÃO 1400/24  ','UNID',10,350.00,3500.00),(1092,14,9,'RECAPAGEM BORRACHUDO 900/20 mínimo 15 mm  ','UNID',80,429.00,34320.00),(1093,14,10,'RECAPAGEM 900/20 LISO  mínimo 13mm  ','UNID',60,416.00,24960.00),(1190,20,3,'Recauchutagem de pneu1000Rx20 ,16 lonas radial, borrachudo, p/ caminhão  ','Sv',1,0.00,0.00),(1152,16,2,'Servico de ressolagem fria em pneus de medida 900x20','UNID',20,702.05,14041.00),(1095,14,12,'VULCANIZAÇÃO 900/20  ','UNID',15,169.00,2535.00),(1096,14,13,'RECAPAGEM 1400/24  ','UNID',50,1375.00,68750.00),(1097,14,14,'RECAUCHUTAGEM 1400/24  ','UNID',10,1375.00,13750.00),(1087,14,4,'RECAPAGEM 1100R22 BORRACHUDO  mínimo 18mm  ','UNID',5,572.00,2860.00),(1088,14,5,'RECAPAGEM 1100R22 LISO mínimo 12,5mm  ','UNID',5,546.00,2730.00),(1089,14,6,'VULCANIZAÇÃO 1100/R22  ','UNID',5,169.00,845.00),(1090,14,7,'RECAUCHUTAGEM 1100/22 mínimo 12,5 mm  ','UNID',5,546.00,2730.00),(1091,14,8,'RECAUCHUTAGEM 1000/20 mínimo 12,5mm  ','UNID',5,494.00,2470.00),(1086,14,3,'VULCANIZAÇÃO 1000R20  ','UNID',5,182.00,910.00),(1084,14,1,'RECAPAGEM BORRACHUDO 1000R20 profundidade mínima de 20mm  ','UNID',100,520.00,52000.00),(1085,14,2,'RECAPAGEM LISA 1000R20 profundidade mínima de 16mm  ','UNID',5,494.00,2470.00),(1130,15,1,'Recauchutagem de pneu borrachudo 1000x20, a frio, c/ espessura mínima de 15mm ','Sv',2,1232.13,2464.26),(1131,15,2,'Recauchutagem de pneu liso 1000x20, a frio, c/ espessura mínima de 15mm','Sv',1,589.70,589.70),(1132,15,3,'Recauchutagem de pneu1000Rx20 ,16 lonas radial, borrachudo, p/ caminhão  ','Sv',1,656.56,656.56),(1133,15,4,'Recauchutagem de pneu1000Rx20 ,16 lonas liso, p/ caminhão  ','Sv',1,15440.00,15440.00),(1134,15,5,'Recauchutagem de pneu 12.5/80/18, c/ garradeiras p/ retroescavadeira ','Sv',46,6.46,297.16),(1135,15,6,'Recauchutagem de pneu 1400x24, 20 lonas, altura mínima de 25mm p/ patrola','Sv',65,89.77,5835.05),(1136,15,7,'Recauchutagem de pneu 17.5x25 Pá Carregadeira','Sv',3,540.00,1620.00),(1137,15,8,'Recauchutagem de pneu 17.5x25, L2, mínimo 12 lonas, traseiro p/ retroescavadeira ','Sv',1,0.00,0.00),(1138,15,9,'Recauchutagem de pneu 19.5x24, mínimo 12 lonas, traseiro p/ retroescavadeira ','Sv',1,0.00,0.00),(1139,15,10,'Recauchutagem de pneu borrachudo 900x20, a frio, c/ espessura mínima de 15mm ','Sv',1,0.00,0.00),(1140,15,11,'Recauchutagem de pneu liso 900x20, a frio, c/ espessura mínima de 15mm ','Sv',1,0.00,0.00),(1141,15,12,'Recauchutagem p/ pneu 231x26 Rolo compactador ','Sv',1,0.00,0.00),(1142,15,13,'Recauchutagem p/ pneu 1400x24, 12 lonas, p/ motoniveladora ','Sv',1,0.00,0.00),(1143,15,14,'Recauchutagem de pneu agrícola 14.9x28, dianteiro ','Sv',1,0.00,0.00),(1144,15,15,'Recauchutagem de pneu 23.1x30, trator traçado, traseiro ','Sv',1,0.00,0.00),(1145,15,16,'Recauchutagem de pneu agrícola 18.4x34, traseiro ','Sv',1,0.00,0.00),(1146,15,17,'Recauchutagem de pneu agrícola 14.9x24, dianteiro,12 lonas ','Sv',1,0.00,0.00),(1147,15,18,'Recauchutagem de pneu borrachudo 7.50x16, 12 lonas p/ veicular para carreta agrícola','Sv',1,0.00,0.00),(1148,15,19,'Recauchutagem de pneu 215/75/17.5 borrachudo, a frio, c/ espessura mínima de 15mm','Sv',1,0.00,0.00),(1149,15,20,'Recauchutagem de pneu 275/80 aro 22.5 radial misto','Sv',1,0.00,0.00),(1150,15,21,'Recauchutagem de pneu 235/75 aro 17.5 ','Sv',1,0.00,0.00),(1195,20,8,'Recauchutagem de pneu 17.5x25, L2, mínimo 12 lonas, traseiro p/ retroescavadeira ','Sv',1,0.00,0.00),(1196,20,9,'Recauchutagem de pneu 19.5x24, mínimo 12 lonas, traseiro p/ retroescavadeira ','Sv',1,0.00,0.00),(1197,20,10,'Recauchutagem de pneu borrachudo 900x20, a frio, c/ espessura mínima de 15mm ','Sv',1,0.00,0.00),(1198,20,11,'Recauchutagem de pneu liso 900x20, a frio, c/ espessura mínima de 15mm ','Sv',1,0.00,0.00),(1199,20,12,'Recauchutagem p/ pneu 231x26 Rolo compactador ','Sv',1,0.00,0.00),(1200,20,13,'Recauchutagem p/ pneu 1400x24, 12 lonas, p/ motoniveladora ','Sv',1,0.00,0.00),(1201,20,14,'Recauchutagem de pneu agrícola 14.9x28, dianteiro ','Sv',1,0.00,0.00),(1202,20,15,'Recauchutagem de pneu 23.1x30, trator traçado, traseiro ','Sv',1,0.00,0.00),(1203,20,16,'Recauchutagem de pneu agrícola 18.4x34, traseiro ','Sv',1,0.00,0.00),(1204,20,17,'Recauchutagem de pneu agrícola 14.9x24, dianteiro,12 lonas ','Sv',1,0.00,0.00),(1205,20,18,'Recauchutagem de pneu borrachudo 7.50x16, 12 lonas p/ veicular para carreta agrícola','Sv',1,0.00,0.00),(1206,20,19,'Recauchutagem de pneu 215/75/17.5 borrachudo, a frio, c/ espessura mínima de 15mm','Sv',1,0.00,0.00),(1207,20,20,'Recauchutagem de pneu 275/80 aro 22.5 radial misto','Sv',1,0.00,0.00),(1208,20,21,'Recauchutagem de pneu 235/75 aro 17.5 ','Sv',1,0.00,0.00),(1209,21,1,'RECAPAGEM A QUENTE DE PNEU 17.5/25 ALTURA MINIMA DO SULCO 32MM L2','SV',3,23.12,69.36),(1210,21,2,'VULCANIZAÇÃO PNEU 17.5/25','SV',5,23.12,115.60),(1211,21,3,'CONSERTO','SV',7,32.31,226.17),(1212,22,1,'RECAPAGEM A QUENTE DE PNEU 17.5/25 ALTURA MINIMA DO SULCO 32MM L2','SV',1,23123.21,23123.21),(1213,22,2,'VULCANIZAÇÃO PNEU 17.5/25','SV',5,232.32,1161.60),(1215,23,1,'dwdwad','UNID',3,2131.23,6393.69),(1216,23,2,'2313','UNID',6,578.00,3468.00),(1217,24,1,'RECAPAGEM A QUENTE DE PNEU 17.5/25 ALTURA MINIMA DO SULCO 32MM L2','SV',1,213.21,213.21),(1218,24,2,'VULCANIZAÇÃO PNEU 17.5/25','SV',5,68.00,340.00),(1219,24,3,'CONSERTO','SV',4,3654.00,14616.00),(1220,25,1,'SERVIÇO DE MANCHÃO CONVENCIONAL  ND 02','UNID',1,0.00,0.00),(1221,25,2,'SERVIÇO DE MANCHÃO CONVENCIONAL  ND 03','UNID',1,0.00,0.00),(1222,25,3,'SERVIÇO DE MANCHÃO CONVENCIONAL  ND 04','UNID',1,0.00,0.00),(1223,25,4,'SERVIÇO DE MANCHÃO CONVENCIONAL  ND 05','UNID',1,0.00,0.00),(1224,25,5,'SERVIÇO DE MANCHÃO CONVENCIONAL  ND 06','UNID',1,0.00,0.00),(1225,25,6,'SERVIÇO DE MANCHÃO CONVENCIONAL  ND 07','UNID',1,0.00,0.00),(1226,25,7,'SERVIÇO DE MANCHÃO RADIAL RAC 20','UNID',1,0.00,0.00),(1227,25,8,'SERVIÇO DE MANCHÃO RADIAL RAC 22','UNID',1,0.00,0.00),(1228,25,9,'SERVIÇO DE MANCHÃO RADIAL RAC 24','UNID',1,0.00,0.00),(1229,25,10,'SERVIÇO DE MANCHÃO RADIAL RAC 25','UNID',1,0.00,0.00),(1230,25,11,'SERVIÇO DE MANCHÃO RADIAL RAC 40','UNID',1,0.00,0.00),(1231,25,12,'SERVIÇO DE MANCHÃO RADIAL RAC 42','UNID',1,0.00,0.00),(1232,25,13,'RESSOLAGEM PNEU 1.000  X 20 A FRIO','UNID',15,0.00,0.00),(1233,25,14,'RESSOLAGEM PNEU 900X20  A FRIO','UNID',6,0.00,0.00),(1234,25,15,'RECAUCHUTAGEM DE PNEU 17.5-25 SGG','UNID',6,0.00,0.00),(1235,25,16,'RECAPAGEM PNEU 2.75 X 80 R 22,5 A FRIO','UNID',10,0.00,0.00),(1236,25,17,'RECAUCHUTAGEM DE PNEU 19.5-24 DESENHO RL2+','UNID',3,0.00,0.00),(1237,25,18,'RECAUCHUTAGEM DE PNEU 1400X24 DESENHO RL2+','UNID',9,0.00,0.00),(1238,25,19,'RESSOLAGEM PNEU 14 X 17,5 A FRIO','UNID',4,0.00,0.00),(1239,25,20,'RECAUCHUTAGEM DE PNEU 12X16,5 SGG','UNID',4,0.00,0.00),(1240,25,21,'VULCANIZAÇÃO 1000X20','UNID',15,0.00,0.00),(1241,25,22,'VULCANIZAÇÃO 900x20','UNID',6,0.00,0.00),(1242,25,23,'VULCANIZAÇÃO 17.5-25','UNID',6,0.00,0.00),(1243,25,24,'VULCANIZAÇÃO 19.5-24','UNID',3,0.00,0.00),(1244,25,25,'VULCANIZAÇÃO 275X80R22,5','UNID',10,0.00,0.00),(1245,25,26,'VULCANIZAÇÃO 1400X24','UNID',9,0.00,0.00),(1246,25,27,'VULCANIZAÇÃO 14X17,5','UNID',4,0.00,0.00),(1247,25,28,'VULCANIZAÇÃO 12X16,5','UNID',4,0.00,0.00),(1248,26,1,'dsadsa','UNID',1,310.00,310.00),(1249,26,2,'dsada','UNID',3,50.00,150.00);
/*!40000 ALTER TABLE `tbcotacao_precos` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `tbfuncoes`
--

DROP TABLE IF EXISTS `tbfuncoes`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `tbfuncoes` (
  `idfuncao` int(11) NOT NULL AUTO_INCREMENT,
  `nome` varchar(45) DEFAULT NULL,
  PRIMARY KEY (`idfuncao`)
) ENGINE=MyISAM AUTO_INCREMENT=4 DEFAULT CHARSET=utf8 COMMENT='		';
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `tbfuncoes`
--

LOCK TABLES `tbfuncoes` WRITE;
/*!40000 ALTER TABLE `tbfuncoes` DISABLE KEYS */;
INSERT INTO `tbfuncoes` VALUES (1,'Administração'),(2,'Produção'),(3,'Faturamento');
/*!40000 ALTER TABLE `tbfuncoes` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `tbpagamento_dia`
--

DROP TABLE IF EXISTS `tbpagamento_dia`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `tbpagamento_dia` (
  `idpag` int(11) NOT NULL AUTO_INCREMENT,
  `favorecido` varchar(255) NOT NULL,
  `dados` varchar(255) NOT NULL,
  `valor` decimal(10,2) NOT NULL DEFAULT '0.00',
  `data_vencimento` date NOT NULL,
  `parcelas` int(11) DEFAULT NULL,
  `ultimo_dia` date DEFAULT NULL,
  `status` varchar(1) DEFAULT 'A',
  `tipo` varchar(2) DEFAULT NULL,
  `data_pagamento` datetime DEFAULT NULL,
  PRIMARY KEY (`idpag`)
) ENGINE=MyISAM AUTO_INCREMENT=148 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `tbpagamento_dia`
--

LOCK TABLES `tbpagamento_dia` WRITE;
/*!40000 ALTER TABLE `tbpagamento_dia` DISABLE KEYS */;
INSERT INTO `tbpagamento_dia` VALUES (36,'NUBANK','01/2020',433.41,'2020-01-10',1,'2020-01-10','P',NULL,'2020-01-10 13:13:40'),(33,'IPVA','GOL 2/3',216.00,'2020-02-20',2,'2020-02-20','A',NULL,NULL),(35,'IPVA','GOL 1/3',216.00,'2020-01-29',1,'2020-03-31','A',NULL,NULL),(38,'Leko Suspensões','Chapeamento',180.00,'2020-02-29',1,'2020-02-29','P',NULL,'2020-03-06 13:13:40'),(39,'IPVA','GOL 3/3',216.00,'2020-03-26',3,'2020-03-26','A',NULL,NULL),(48,'Cartão NUBANK','02/2020',487.76,'2020-03-09',1,'2020-03-09','P',NULL,'2020-03-10 13:13:40'),(52,'Prestes - Viverti Apucarana','CONSTRUÇÃO CASA',253.00,'2020-03-25',1,'2020-03-25','P',NULL,'2020-03-31 14:21:38'),(124,'NUBANK','FATURA MARÇO',387.17,'2020-04-09',1,'2020-04-09','P',NULL,'2020-04-13 17:29:53'),(123,'PERSIS','INTERNET',139.90,'2020-12-11',12,'2020-12-11','A',NULL,NULL),(122,'PERSIS','INTERNET',139.90,'2020-11-11',11,'2020-12-11','A',NULL,NULL),(121,'PERSIS','INTERNET',139.90,'2020-10-11',10,'2020-12-11','A',NULL,NULL),(120,'PERSIS','INTERNET',139.90,'2020-09-11',9,'2020-12-11','A',NULL,NULL),(119,'PERSIS','INTERNET',139.90,'2020-08-11',8,'2020-12-11','A',NULL,NULL),(118,'PERSIS','INTERNET',139.90,'2020-07-11',7,'2020-12-11','A',NULL,NULL),(117,'PERSIS','INTERNET',139.90,'2020-06-11',6,'2020-12-11','P',NULL,'2021-06-03 10:11:48'),(116,'PERSIS','INTERNET',139.90,'2020-05-11',5,'2020-12-11','A',NULL,NULL),(115,'PERSIS','INTERNET',139.90,'2020-04-11',4,'2020-12-11','P',NULL,'2020-04-13 17:29:54'),(112,'PERSIS','INTERNET',139.90,'2020-01-11',1,'2020-12-11','P',NULL,'2020-03-23 13:26:50'),(113,'PERSIS','INTERNET',139.90,'2020-02-11',2,'2020-12-11','P',NULL,'2020-03-23 13:26:53'),(114,'PERSIS','INTERNET',139.90,'2020-03-11',3,'2020-12-11','P',NULL,'2020-03-23 13:26:56'),(126,'TAXA PRESTES','TAXA 04/2020',72.03,'2020-04-22',1,'2020-04-22','P',NULL,'2020-04-24 09:56:33'),(127,'DEB CESTA','TAXA CAIXA CASA',12.40,'2020-04-27',1,'2020-04-27','P',NULL,'2020-04-24 09:56:35'),(128,'PRESTES - VIVERTI APUCARANA','CASA',253.00,'2020-04-25',1,'2020-04-25','P',NULL,'2020-04-28 12:11:09'),(139,'NUBANK','NUBANK',600.00,'2021-07-09',1,'2021-06-09','A',NULL,NULL),(140,'PSICÓLOGA','PSICÓLOGA',280.00,'2021-07-05',1,'2021-06-05','A',NULL,NULL),(141,'TESTE','2312321',900.00,'2021-07-03',1,'2021-06-03','A',NULL,NULL),(142,'TESTE','2312321',900.00,'2021-08-03',2,'2021-06-03','A',NULL,NULL),(143,'TESTE','2312321',900.00,'2021-09-03',3,'2021-06-03','A',NULL,NULL),(144,'TESTE','2312321',900.00,'2021-10-03',4,'2021-06-03','A',NULL,NULL),(145,'TESTE','2312321',900.00,'2021-11-03',5,'2021-06-03','A',NULL,NULL),(146,'TESTE','2312321',900.00,'2021-12-03',6,'2021-06-03','A',NULL,NULL),(147,'TESTE','2312321',900.00,'2022-01-03',7,'2021-06-03','A',NULL,NULL);
/*!40000 ALTER TABLE `tbpagamento_dia` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `tbpedidos`
--

DROP TABLE IF EXISTS `tbpedidos`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `tbpedidos` (
  `idpedido` int(11) NOT NULL AUTO_INCREMENT,
  `idcliente` int(11) DEFAULT NULL,
  `tipo` varchar(20) DEFAULT NULL,
  `usuid` int(11) DEFAULT NULL,
  `data_inc` datetime DEFAULT NULL,
  PRIMARY KEY (`idpedido`)
) ENGINE=MyISAM AUTO_INCREMENT=13 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `tbpedidos`
--

LOCK TABLES `tbpedidos` WRITE;
/*!40000 ALTER TABLE `tbpedidos` DISABLE KEYS */;
INSERT INTO `tbpedidos` VALUES (8,104,'P',1,'2020-03-31 14:24:08'),(7,105,'P',1,'2020-03-23 13:53:46'),(6,106,'P',1,'2020-03-10 15:04:45'),(9,104,'P',1,'2020-03-31 14:31:20');
/*!40000 ALTER TABLE `tbpedidos` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `tbpermissao`
--

DROP TABLE IF EXISTS `tbpermissao`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `tbpermissao` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `idpermissao` int(11) NOT NULL,
  `permissao` varchar(45) DEFAULT NULL,
  PRIMARY KEY (`id`,`idpermissao`)
) ENGINE=InnoDB AUTO_INCREMENT=8 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `tbpermissao`
--

LOCK TABLES `tbpermissao` WRITE;
/*!40000 ALTER TABLE `tbpermissao` DISABLE KEYS */;
INSERT INTO `tbpermissao` VALUES (1,1,'Administrador'),(2,2,'Caixa'),(3,3,'Vendedor'),(7,4,'Gerente');
/*!40000 ALTER TABLE `tbpermissao` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `tbproduto`
--

DROP TABLE IF EXISTS `tbproduto`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `tbproduto` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `referencia` varchar(15) NOT NULL DEFAULT '',
  `idcategoria` int(11) DEFAULT NULL,
  `preco` decimal(10,2) NOT NULL DEFAULT '0.00',
  `descricao` varchar(255) NOT NULL,
  `habilitado` varchar(1) NOT NULL DEFAULT 'S',
  `modificado` datetime DEFAULT NULL,
  PRIMARY KEY (`id`,`referencia`)
) ENGINE=MyISAM AUTO_INCREMENT=31 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `tbproduto`
--

LOCK TABLES `tbproduto` WRITE;
/*!40000 ALTER TABLE `tbproduto` DISABLE KEYS */;
INSERT INTO `tbproduto` VALUES (1,'01.00001',1,3.29,'Cerveja Long Neck Sol','S','2019-12-19 15:01:32'),(2,'01.00002',1,3.49,'Cerveja Long Neck Budweiser','S',NULL),(3,'01.00003',1,2.99,'Cerveja Brahma Lata','S',NULL),(4,'03.00001',3,10.00,'Rosh R$ 10,00','S',NULL),(5,'03.00002',3,15.00,'Rosh R$ 15.00','S',NULL),(6,'03.00003',3,20.00,'Rosh R$ 20.00','S',NULL),(7,'02.00001',2,29.90,'Combo Long Neck Sol','S',NULL),(8,'02.00002',2,25.59,'Combo Long Neck Budweiser','S',NULL),(27,'07.00008',7,5.00,'3 Rosh 5$','S',NULL),(14,'01.00004',1,2.80,'Coca Lata','S',NULL),(15,'01.00005',1,2.30,'Guaraná Antártica Lata','S',NULL),(24,'07.00005',7,18.00,'1 Rosh 18$','S',NULL),(25,'07.00007',7,15.00,'2 Rosh 15$','S',NULL),(19,'07.00001',7,40.00,'Combo Cerveja Long Neck Sol + Rosh','S','2020-01-16 17:05:17'),(20,'07.00002',7,15.00,'Passe Entrada Masculino','S','2020-01-14 09:59:50'),(22,'07.00003',7,5.00,'Passe de Entrada Feminino','S',NULL),(23,'07.00004',7,5.00,'Entrada','S',NULL),(29,'01.00008',25,350.00,'Rec. a frio de pneu borrachudo','S',NULL),(30,'123123',25,12.31,'das','S',NULL);
/*!40000 ALTER TABLE `tbproduto` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `tbvendedores`
--

DROP TABLE IF EXISTS `tbvendedores`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `tbvendedores` (
  `idvendedor` int(11) NOT NULL AUTO_INCREMENT,
  `nome` varchar(60) DEFAULT NULL,
  `rg` varchar(15) DEFAULT NULL,
  `situacao` varchar(45) DEFAULT 'ATIVO',
  `tipo` varchar(45) DEFAULT NULL,
  `classificacao` varchar(45) DEFAULT NULL,
  `meta` decimal(10,2) DEFAULT NULL,
  `data_admissao` date DEFAULT NULL,
  `telefone` varchar(15) DEFAULT NULL,
  `observacao` blob,
  `usuid` int(11) DEFAULT NULL,
  `cep` varchar(10) DEFAULT NULL,
  `endereco` varchar(100) DEFAULT NULL,
  `bairro` varchar(100) DEFAULT NULL,
  `uf` varchar(2) DEFAULT NULL,
  `cidade` varchar(100) DEFAULT NULL,
  `complemento` varchar(150) DEFAULT NULL,
  `numero` int(11) DEFAULT NULL,
  PRIMARY KEY (`idvendedor`)
) ENGINE=MyISAM AUTO_INCREMENT=4 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `tbvendedores`
--

LOCK TABLES `tbvendedores` WRITE;
/*!40000 ALTER TABLE `tbvendedores` DISABLE KEYS */;
INSERT INTO `tbvendedores` VALUES (3,'Rhuan Yago','126097140','ATIVO','INTERNO','Vendedor',60000.00,'2020-03-06','(43) 99626-8534',_binary 'dada',1,'86.807-360','Rua Emílio de Menezes','Jardim América','PR','Apucarana','Casa',165);
/*!40000 ALTER TABLE `tbvendedores` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `usuarios`
--

DROP TABLE IF EXISTS `usuarios`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `usuarios` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `nome` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `senha` varchar(32) NOT NULL,
  `senha_confirma` varchar(32) NOT NULL,
  `rg` varchar(20) NOT NULL,
  `telefone` varchar(15) NOT NULL,
  `dt_nascimento` varchar(10) NOT NULL,
  `Criado` datetime DEFAULT NULL,
  `Modificado` datetime DEFAULT NULL,
  `habilitado` varchar(1) DEFAULT 'S',
  `usuid` int(11) DEFAULT NULL,
  `idpermissao` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=13 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `usuarios`
--

LOCK TABLES `usuarios` WRITE;
/*!40000 ALTER TABLE `usuarios` DISABLE KEYS */;
INSERT INTO `usuarios` VALUES (2,'Beatriz Eduarda','beatriz@teste.com.br','827ccb0eea8a706c4c34a16891f84e7b','827ccb0eea8a706c4c34a16891f84e7b','12.709.314-1','(43) 99344-8595','03/07/2000','2019-11-05 14:41:16','2019-12-11 16:24:45','S',5,2),(3,'Rhuan Yago Aragão','rhuan.yago@teste.com.br','827ccb0eea8a706c4c34a16891f84e7b','827ccb0eea8a706c4c34a16891f84e7b','12.350.890-0','(43) 99187-7147','14/10/1998','2019-11-25 08:20:14','2020-01-15 11:19:21','S',1,3),(1,'Administrador','admin@admin.com.br','827ccb0eea8a706c4c34a16891f84e7b','827ccb0eea8a706c4c34a16891f84e7b','12.609.714-0','(43) 99626-8534','14/10/1998','2019-12-10 10:43:03',NULL,'S',NULL,1),(10,'Guilherme','guilherme@vision.com.br','9246444d94f081e3549803b928260f56','9246444d94f081e3549803b928260f56','130882846','(43) 99861-2872','10/06/1998','2020-01-16 20:21:21',NULL,'S',NULL,1),(11,'timbalaye','timbalaye@teste.com.br','827ccb0eea8a706c4c34a16891f84e7b','827ccb0eea8a706c4c34a16891f84e7b','124879870','(43) 13134-6464','14/10/1998','2020-03-04 10:17:12',NULL,'S',NULL,3),(12,'Franciele','m.mpneus@hotmail.com','e10adc3949ba59abbe56e057f20f883e','e10adc3949ba59abbe56e057f20f883e','1268794701','(43) 03276-2609','14/10/1975','2020-04-09 13:42:42',NULL,'S',NULL,1);
/*!40000 ALTER TABLE `usuarios` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Dumping events for database 'sistemarubber'
--

--
-- Dumping routines for database 'sistemarubber'
--
/*!40103 SET TIME_ZONE=@OLD_TIME_ZONE */;

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;

-- Dump completed on 2021-06-03 10:42:47
