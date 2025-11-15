-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1:3306
-- Tiempo de generación: 15-11-2025 a las 14:48:29
-- Versión del servidor: 9.1.0
-- Versión de PHP: 8.3.14

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `agrocana`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `actividades`
--

DROP TABLE IF EXISTS `actividades`;
CREATE TABLE IF NOT EXISTS `actividades` (
  `CVE_ACTIVIDAD` int NOT NULL AUTO_INCREMENT,
  `CVE_RESPONSABLE` int DEFAULT NULL,
  `CVE_CULTIVO` int DEFAULT NULL,
  `FECHA` date DEFAULT NULL,
  `OBSERVACIONES` varchar(100) DEFAULT NULL,
  `TIPO` varchar(30) DEFAULT NULL,
  `COSTO` float DEFAULT NULL,
  PRIMARY KEY (`CVE_ACTIVIDAD`),
  KEY `FK_REFERENCE_2` (`CVE_RESPONSABLE`),
  KEY `FK_REFERENCE_3` (`CVE_CULTIVO`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `bodegas`
--

DROP TABLE IF EXISTS `bodegas`;
CREATE TABLE IF NOT EXISTS `bodegas` (
  `CVE_BODEGA` int NOT NULL AUTO_INCREMENT,
  `CVE_COLONIA` int DEFAULT NULL,
  `NOMBRE` varchar(50) DEFAULT NULL,
  `UBICACION` varchar(70) DEFAULT NULL,
  PRIMARY KEY (`CVE_BODEGA`),
  KEY `FK_REFERENCE_10` (`CVE_COLONIA`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `ciudades`
--

DROP TABLE IF EXISTS `ciudades`;
CREATE TABLE IF NOT EXISTS `ciudades` (
  `CVE_CIUDAD` int NOT NULL AUTO_INCREMENT,
  `NOMBRE` varchar(50) DEFAULT NULL,
  PRIMARY KEY (`CVE_CIUDAD`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `colonias`
--

DROP TABLE IF EXISTS `colonias`;
CREATE TABLE IF NOT EXISTS `colonias` (
  `CVE_COLONIA` int NOT NULL AUTO_INCREMENT,
  `CVE_CIUDAD` int DEFAULT NULL,
  `NOMBRE` varchar(50) DEFAULT NULL,
  `CP` varchar(5) DEFAULT NULL,
  PRIMARY KEY (`CVE_COLONIA`),
  KEY `FK_REFERENCE_11` (`CVE_CIUDAD`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `compradores`
--

DROP TABLE IF EXISTS `compradores`;
CREATE TABLE IF NOT EXISTS `compradores` (
  `CVE_COMPRADOR` int NOT NULL AUTO_INCREMENT,
  `NOMBRE` varchar(50) DEFAULT NULL,
  `TELEFONO` varchar(10) DEFAULT NULL,
  `CORREO` varchar(50) DEFAULT NULL,
  `TIPO` varchar(50) DEFAULT NULL,
  `NOTAS` varchar(100) DEFAULT NULL,
  PRIMARY KEY (`CVE_COMPRADOR`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `cultivos`
--

DROP TABLE IF EXISTS `cultivos`;
CREATE TABLE IF NOT EXISTS `cultivos` (
  `CVE_CULTIVO` int NOT NULL AUTO_INCREMENT,
  `CVE_TERRENO` int DEFAULT NULL,
  `FECHASIEMBRA` date DEFAULT NULL,
  `FECHACOSECHA` date DEFAULT NULL,
  `ESTADO` varchar(30) DEFAULT NULL,
  `OBSERVACIONES` varchar(100) DEFAULT NULL,
  PRIMARY KEY (`CVE_CULTIVO`),
  KEY `FK_REFERENCE_1` (`CVE_TERRENO`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `encarga`
--

DROP TABLE IF EXISTS `encarga`;
CREATE TABLE IF NOT EXISTS `encarga` (
  `CVE_PEDIDO` int DEFAULT NULL,
  `CVE_ITEM` int DEFAULT NULL,
  KEY `FK_REFERENCE_16` (`CVE_PEDIDO`),
  KEY `FK_REFERENCE_17` (`CVE_ITEM`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `envios`
--

DROP TABLE IF EXISTS `envios`;
CREATE TABLE IF NOT EXISTS `envios` (
  `CVE_ENVIO` int NOT NULL AUTO_INCREMENT,
  `PLACA` varchar(8) DEFAULT NULL,
  `CVE_CONDUCTOR` int DEFAULT NULL,
  `COLONIAORIGEN` int DEFAULT NULL,
  `COLONIADESTINO` int DEFAULT NULL,
  `CVE_PEDIDO` int DEFAULT NULL,
  `ORIGEN` varchar(100) DEFAULT NULL,
  `DESTINO` varchar(100) DEFAULT NULL,
  `FECHASALIDA` datetime DEFAULT NULL,
  `FECHALLEGADA` datetime DEFAULT NULL,
  `OBSERVACIONES` varchar(100) DEFAULT NULL,
  `COSTO` float DEFAULT NULL,
  PRIMARY KEY (`CVE_ENVIO`),
  KEY `FK_REFERENCE_18` (`PLACA`),
  KEY `FK_REFERENCE_19` (`CVE_CONDUCTOR`),
  KEY `FK_REFERENCE_21` (`COLONIAORIGEN`),
  KEY `FK_REFERENCE_22` (`COLONIADESTINO`),
  KEY `FK_REFERENCE_26` (`CVE_PEDIDO`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `items`
--

DROP TABLE IF EXISTS `items`;
CREATE TABLE IF NOT EXISTS `items` (
  `CVE_ITEM` int NOT NULL AUTO_INCREMENT,
  `CVE_COMPRADOR` int DEFAULT NULL,
  `NOMBRE` varchar(30) DEFAULT NULL,
  `CATEGORIA` varchar(50) DEFAULT NULL,
  `CANTIDAD` float DEFAULT NULL,
  `UNIDAD` varchar(3) DEFAULT NULL,
  `ESTADO` varchar(30) DEFAULT NULL,
  `PRECIOU` float DEFAULT NULL,
  `PRECIOV` float DEFAULT NULL,
  PRIMARY KEY (`CVE_ITEM`),
  KEY `FK_REFERENCE_12` (`CVE_COMPRADOR`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `mantenimientos`
--

DROP TABLE IF EXISTS `mantenimientos`;
CREATE TABLE IF NOT EXISTS `mantenimientos` (
  `CVE_MANTENIMIENTO` int NOT NULL AUTO_INCREMENT,
  `CVE_USUARIO` int DEFAULT NULL,
  `PLACA` varchar(8) DEFAULT NULL,
  `FECHA` date DEFAULT NULL,
  `COSTO` float DEFAULT NULL,
  `OBSERVACIONES` varchar(100) DEFAULT NULL,
  PRIMARY KEY (`CVE_MANTENIMIENTO`),
  KEY `FK_REFERENCE_23` (`PLACA`),
  KEY `FK_REFERENCE_7` (`CVE_USUARIO`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `marcas`
--

DROP TABLE IF EXISTS `marcas`;
CREATE TABLE IF NOT EXISTS `marcas` (
  `CVE_MARCA` int NOT NULL AUTO_INCREMENT,
  `NOMBRE` varchar(30) DEFAULT NULL,
  PRIMARY KEY (`CVE_MARCA`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `modelos`
--

DROP TABLE IF EXISTS `modelos`;
CREATE TABLE IF NOT EXISTS `modelos` (
  `CVE_MODELO` int NOT NULL AUTO_INCREMENT,
  `CVE_MARCA` int DEFAULT NULL,
  `NOMBRE` varchar(30) DEFAULT NULL,
  PRIMARY KEY (`CVE_MODELO`),
  KEY `FK_REFERENCE_4` (`CVE_MARCA`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `pedidos`
--

DROP TABLE IF EXISTS `pedidos`;
CREATE TABLE IF NOT EXISTS `pedidos` (
  `CVE_PEDIDO` int NOT NULL AUTO_INCREMENT,
  `CVE_COMPRADOR` int DEFAULT NULL,
  `CANTIDAD` float DEFAULT NULL,
  `INGRESO` tinyint(1) DEFAULT NULL,
  `FECHAPEDIDO` date DEFAULT NULL,
  `FECHAENTREGA` date DEFAULT NULL,
  PRIMARY KEY (`CVE_PEDIDO`),
  KEY `FK_REFERENCE_13` (`CVE_COMPRADOR`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `terrenos`
--

DROP TABLE IF EXISTS `terrenos`;
CREATE TABLE IF NOT EXISTS `terrenos` (
  `CVE_TERRENO` int NOT NULL AUTO_INCREMENT,
  `NOMBRE` varchar(30) DEFAULT NULL,
  `HECTAREAS` float DEFAULT NULL,
  PRIMARY KEY (`CVE_TERRENO`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tiene`
--

DROP TABLE IF EXISTS `tiene`;
CREATE TABLE IF NOT EXISTS `tiene` (
  `CVE_BODEGA` int DEFAULT NULL,
  `CVE_ITEM` int DEFAULT NULL,
  KEY `FK_REFERENCE_14` (`CVE_BODEGA`),
  KEY `FK_REFERENCE_20` (`CVE_ITEM`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `usuarios`
--

DROP TABLE IF EXISTS `usuarios`;
CREATE TABLE IF NOT EXISTS `usuarios` (
  `CVE_USUARIO` int NOT NULL AUTO_INCREMENT,
  `NOMBRE` varchar(30) DEFAULT NULL,
  `APELLIDO_P` varchar(30) DEFAULT NULL,
  `APELLIDO_M` varchar(30) DEFAULT NULL,
  `TIPO` varchar(40) DEFAULT NULL,
  `NUMEROTELEFONICO` varchar(10) DEFAULT NULL,
  `USER` varchar(30) DEFAULT NULL,
  `PASSWORD` varchar(30) DEFAULT NULL,
  `ROL` varchar(30) DEFAULT NULL,
  `ACTIVO` tinyint(1) DEFAULT NULL,
  PRIMARY KEY (`CVE_USUARIO`)
) ENGINE=MyISAM AUTO_INCREMENT=2 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Volcado de datos para la tabla `usuarios`
--

INSERT INTO `usuarios` (`CVE_USUARIO`, `NOMBRE`, `APELLIDO_P`, `APELLIDO_M`, `TIPO`, `NUMEROTELEFONICO`, `USER`, `PASSWORD`, `ROL`, `ACTIVO`) VALUES
(1, 'Daniel', 'Lara', 'Martinez', 'Admin', '9374837234', 'Danlm', '123', '', 1);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `utiliza`
--

DROP TABLE IF EXISTS `utiliza`;
CREATE TABLE IF NOT EXISTS `utiliza` (
  `CVE_ACTIVIDAD` int DEFAULT NULL,
  `CVE_ITEM` int DEFAULT NULL,
  `CANTIDAD` int DEFAULT NULL,
  KEY `FK_REFERENCE_24` (`CVE_ACTIVIDAD`),
  KEY `FK_REFERENCE_25` (`CVE_ITEM`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `vehiculos`
--

DROP TABLE IF EXISTS `vehiculos`;
CREATE TABLE IF NOT EXISTS `vehiculos` (
  `PLACA` varchar(8) NOT NULL,
  `CVE_MODELO` int DEFAULT NULL,
  `TIPO` varchar(30) DEFAULT NULL,
  `OBSERVACIONES` varchar(100) DEFAULT NULL,
  `FECHA` date DEFAULT NULL,
  PRIMARY KEY (`PLACA`),
  KEY `FK_REFERENCE_5` (`CVE_MODELO`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
