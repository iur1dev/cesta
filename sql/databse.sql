-- --------------------------------------------------------
-- Host:                         127.0.0.1
-- Server version:               10.4.25-MariaDB - mariadb.org binary distribution
-- Server OS:                    Win64
-- HeidiSQL Version:             12.0.0.6468
-- --------------------------------------------------------

/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET NAMES utf8 */;
/*!50503 SET NAMES utf8mb4 */;
/*!40103 SET @OLD_TIME_ZONE=@@TIME_ZONE */;
/*!40103 SET TIME_ZONE='+00:00' */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;
/*!40111 SET @OLD_SQL_NOTES=@@SQL_NOTES, SQL_NOTES=0 */;


-- Dumping database structure for cesta
CREATE DATABASE IF NOT EXISTS `cesta` /*!40100 DEFAULT CHARACTER SET utf8mb4 */;
USE `cesta`;

-- Dumping structure for table cesta.clientes
CREATE TABLE IF NOT EXISTS `clientes` (
  `id_clientes` int(11) NOT NULL AUTO_INCREMENT,
  `nome` varchar(50) DEFAULT NULL,
  `cpf` varchar(50) DEFAULT NULL,
  `rg` varchar(50) DEFAULT NULL,
  `data_nasc` varchar(50) DEFAULT NULL,
  `celular` varchar(50) DEFAULT NULL,
  `cep` varchar(50) DEFAULT NULL,
  `cidade` varchar(50) DEFAULT NULL,
  `bairro` varchar(50) DEFAULT NULL,
  `rua` varchar(50) DEFAULT NULL,
  `numero` varchar(50) DEFAULT NULL,
  `cep_` varchar(50) DEFAULT NULL,
  `cidade_` varchar(50) DEFAULT NULL,
  `bairro_` varchar(50) DEFAULT NULL,
  `rua_` varchar(50) DEFAULT NULL,
  `numero_` varchar(50) DEFAULT NULL,
  `update` datetime DEFAULT NULL ON UPDATE current_timestamp(),
  `criado` datetime DEFAULT current_timestamp(),
  PRIMARY KEY (`id_clientes`)
) ENGINE=InnoDB AUTO_INCREMENT=44 DEFAULT CHARSET=utf8mb4;

-- Dumping data for table cesta.clientes: ~1 rows (approximately)
INSERT INTO `clientes` (`id_clientes`, `nome`, `cpf`, `rg`, `data_nasc`, `celular`, `cep`, `cidade`, `bairro`, `rua`, `numero`, `cep_`, `cidade_`, `bairro_`, `rua_`, `numero_`, `update`, `criado`) VALUES
	(42, 'Reiciendis aliquam d', '', 'Minima proident qui', '', '(', '', 'Consequatur aliquam ', 'Quo officiis ipsam v', 'Odio qui qui ut laud', 'Sunt aut quasi possi', '', 'Praesentium sunt ali', 'Temporibus voluptas ', 'Officiis magni iusto', 'Commodi amet elit ', NULL, '2022-11-22 22:45:24');

-- Dumping structure for table cesta.produtos
CREATE TABLE IF NOT EXISTS `produtos` (
  `id_produtos` int(11) NOT NULL AUTO_INCREMENT,
  `nome` varchar(50) DEFAULT NULL,
  `valor` decimal(20,6) DEFAULT NULL,
  PRIMARY KEY (`id_produtos`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8mb4;

-- Dumping data for table cesta.produtos: ~2 rows (approximately)
INSERT INTO `produtos` (`id_produtos`, `nome`, `valor`) VALUES
	(1, 'cesta 1', 100.000000),
	(2, 'cesta 2', 200.000000),
	(3, 'cesta 3', 300.000000);

-- Dumping structure for table cesta.vendas
CREATE TABLE IF NOT EXISTS `vendas` (
  `id_vendas` int(11) NOT NULL AUTO_INCREMENT,
  `id_clientes` int(11) DEFAULT NULL,
  `id_produtos` int(11) DEFAULT NULL,
  PRIMARY KEY (`id_vendas`),
  KEY `FK_vendas_clientes` (`id_clientes`),
  KEY `FK_vendas_produtos` (`id_produtos`),
  CONSTRAINT `FK_vendas_clientes` FOREIGN KEY (`id_clientes`) REFERENCES `clientes` (`id_clientes`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  CONSTRAINT `FK_vendas_produtos` FOREIGN KEY (`id_produtos`) REFERENCES `produtos` (`id_produtos`) ON DELETE NO ACTION ON UPDATE NO ACTION
) ENGINE=InnoDB AUTO_INCREMENT=65 DEFAULT CHARSET=utf8mb4;

-- Dumping data for table cesta.vendas: ~0 rows (approximately)

/*!40103 SET TIME_ZONE=IFNULL(@OLD_TIME_ZONE, 'system') */;
/*!40101 SET SQL_MODE=IFNULL(@OLD_SQL_MODE, '') */;
/*!40014 SET FOREIGN_KEY_CHECKS=IFNULL(@OLD_FOREIGN_KEY_CHECKS, 1) */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40111 SET SQL_NOTES=IFNULL(@OLD_SQL_NOTES, 1) */;
