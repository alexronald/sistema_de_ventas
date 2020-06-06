-- --------------------------------------------------------
-- Host:                         127.0.0.1
-- Versión del servidor:         10.1.37-MariaDB - mariadb.org binary distribution
-- SO del servidor:              Win32
-- HeidiSQL Versión:             9.5.0.5295
-- --------------------------------------------------------

/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET NAMES utf8 */;
/*!50503 SET NAMES utf8mb4 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;


-- Volcando estructura de base de datos para ventas
CREATE DATABASE IF NOT EXISTS `ventas` /*!40100 DEFAULT CHARACTER SET utf8 COLLATE utf8_bin */;
USE `ventas`;

-- Volcando estructura para tabla ventas.cliente
CREATE TABLE IF NOT EXISTS `cliente` (
  `id_cliente` int(5) NOT NULL AUTO_INCREMENT,
  `tipo_persona` varchar(45) COLLATE utf8_bin DEFAULT 'persona natural',
  `nombre` varchar(25) COLLATE utf8_bin NOT NULL,
  `tipo_documento` varchar(20) COLLATE utf8_bin DEFAULT 'DNI',
  `num_documento` varchar(15) COLLATE utf8_bin NOT NULL,
  `direccion` varchar(70) COLLATE utf8_bin NOT NULL,
  `celular` varchar(15) COLLATE utf8_bin DEFAULT NULL,
  `email` varchar(50) COLLATE utf8_bin DEFAULT NULL,
  `estado` int(1) DEFAULT '1',
  PRIMARY KEY (`id_cliente`),
  UNIQUE KEY `num_documento` (`num_documento`)
) ENGINE=InnoDB AUTO_INCREMENT=44 DEFAULT CHARSET=utf8 COLLATE=utf8_bin;

-- La exportación de datos fue deseleccionada.
-- Volcando estructura para tabla ventas.compra
CREATE TABLE IF NOT EXISTS `compra` (
  `num_compra` int(5) NOT NULL AUTO_INCREMENT,
  `fecha` date NOT NULL,
  `fecha_pago` date NOT NULL,
  `sub_total` float(5,2) DEFAULT NULL,
  `descuento` float(5,2) DEFAULT NULL,
  `total` float(5,2) DEFAULT NULL,
  `id_proveedor` int(5) DEFAULT NULL,
  `id_usuario` int(5) DEFAULT NULL,
  `estado` int(1) DEFAULT '1',
  PRIMARY KEY (`num_compra`),
  KEY `id_proveedor` (`id_proveedor`),
  KEY `id_usuario` (`id_usuario`),
  CONSTRAINT `compra_ibfk_1` FOREIGN KEY (`id_proveedor`) REFERENCES `proveedor` (`id_proveedor`) ON DELETE CASCADE,
  CONSTRAINT `compra_ibfk_2` FOREIGN KEY (`id_usuario`) REFERENCES `usuario` (`id_usuario`) ON DELETE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin;

-- La exportación de datos fue deseleccionada.
-- Volcando estructura para tabla ventas.detalle_compra
CREATE TABLE IF NOT EXISTS `detalle_compra` (
  `id_venta` int(5) NOT NULL AUTO_INCREMENT,
  `cantidad` int(5) NOT NULL,
  `precio` float(5,2) DEFAULT NULL,
  `descuento` float(5,2) DEFAULT NULL,
  `total` float(5,2) DEFAULT NULL,
  `num_compra` int(5) DEFAULT NULL,
  `id_producto` int(5) DEFAULT NULL,
  PRIMARY KEY (`id_venta`),
  KEY `num_compra` (`num_compra`),
  KEY `id_producto` (`id_producto`),
  CONSTRAINT `detalle_compra_ibfk_1` FOREIGN KEY (`num_compra`) REFERENCES `compra` (`num_compra`) ON DELETE CASCADE,
  CONSTRAINT `detalle_compra_ibfk_2` FOREIGN KEY (`id_producto`) REFERENCES `producto` (`id_producto`) ON DELETE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin;

-- La exportación de datos fue deseleccionada.
-- Volcando estructura para tabla ventas.detalle_venta
CREATE TABLE IF NOT EXISTS `detalle_venta` (
  `id_venta` int(5) NOT NULL AUTO_INCREMENT,
  `cantidad` int(5) NOT NULL,
  `precio` float(5,2) DEFAULT NULL,
  `descuento` float(5,2) DEFAULT NULL,
  `sub_total` float(5,2) DEFAULT NULL,
  `num_venta` int(5) DEFAULT NULL,
  `id_producto` int(5) DEFAULT NULL,
  PRIMARY KEY (`id_venta`),
  KEY `num_venta` (`num_venta`),
  KEY `id_producto` (`id_producto`),
  CONSTRAINT `detalle_venta_ibfk_1` FOREIGN KEY (`num_venta`) REFERENCES `venta` (`num_venta`) ON DELETE CASCADE,
  CONSTRAINT `detalle_venta_ibfk_2` FOREIGN KEY (`id_producto`) REFERENCES `producto` (`id_producto`) ON DELETE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=18 DEFAULT CHARSET=utf8 COLLATE=utf8_bin;

-- La exportación de datos fue deseleccionada.
-- Volcando estructura para tabla ventas.producto
CREATE TABLE IF NOT EXISTS `producto` (
  `id_producto` int(5) NOT NULL AUTO_INCREMENT,
  `nombre` varchar(25) COLLATE utf8_bin NOT NULL,
  `fecha_vec` date NOT NULL,
  `stock` int(5) DEFAULT NULL,
  `descripcion` text COLLATE utf8_bin NOT NULL,
  `precio_venta` float(5,2) DEFAULT NULL,
  `marca` varchar(25) COLLATE utf8_bin DEFAULT NULL,
  `estado` int(1) DEFAULT '1',
  PRIMARY KEY (`id_producto`)
) ENGINE=InnoDB AUTO_INCREMENT=8 DEFAULT CHARSET=utf8 COLLATE=utf8_bin;

-- La exportación de datos fue deseleccionada.
-- Volcando estructura para tabla ventas.proveedor
CREATE TABLE IF NOT EXISTS `proveedor` (
  `id_proveedor` int(5) NOT NULL AUTO_INCREMENT,
  `compania` varchar(45) COLLATE utf8_bin NOT NULL,
  `contacto` varchar(25) COLLATE utf8_bin NOT NULL,
  `estado` int(1) DEFAULT '1',
  PRIMARY KEY (`id_proveedor`)
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=utf8 COLLATE=utf8_bin;

-- La exportación de datos fue deseleccionada.
-- Volcando estructura para tabla ventas.usuario
CREATE TABLE IF NOT EXISTS `usuario` (
  `id_usuario` int(5) NOT NULL AUTO_INCREMENT,
  `nombre` varchar(25) COLLATE utf8_bin NOT NULL,
  `tipo_usuario` varchar(45) COLLATE utf8_bin NOT NULL,
  `PASSWORD` varchar(255) COLLATE utf8_bin DEFAULT NULL,
  `celular` varchar(15) COLLATE utf8_bin DEFAULT NULL,
  `email` varchar(50) COLLATE utf8_bin DEFAULT NULL,
  `estado` int(1) DEFAULT '1',
  PRIMARY KEY (`id_usuario`)
) ENGINE=InnoDB AUTO_INCREMENT=13 DEFAULT CHARSET=utf8 COLLATE=utf8_bin;

-- La exportación de datos fue deseleccionada.
-- Volcando estructura para tabla ventas.venta
CREATE TABLE IF NOT EXISTS `venta` (
  `num_venta` int(5) NOT NULL AUTO_INCREMENT,
  `fecha` date NOT NULL,
  `total` float(9,2) DEFAULT NULL,
  `id_cliente` int(5) DEFAULT NULL,
  `id_usuario` int(5) DEFAULT NULL,
  PRIMARY KEY (`num_venta`),
  KEY `id_usuario` (`id_usuario`),
  KEY `id_cliente` (`id_cliente`),
  CONSTRAINT `venta_ibfk_1` FOREIGN KEY (`id_usuario`) REFERENCES `usuario` (`id_usuario`) ON DELETE CASCADE,
  CONSTRAINT `venta_ibfk_2` FOREIGN KEY (`id_cliente`) REFERENCES `cliente` (`id_cliente`) ON DELETE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=23 DEFAULT CHARSET=utf8 COLLATE=utf8_bin;

-- La exportación de datos fue deseleccionada.
/*!40101 SET SQL_MODE=IFNULL(@OLD_SQL_MODE, '') */;
/*!40014 SET FOREIGN_KEY_CHECKS=IF(@OLD_FOREIGN_KEY_CHECKS IS NULL, 1, @OLD_FOREIGN_KEY_CHECKS) */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
