-- phpMyAdmin SQL Dump
-- version 3.2.0.1
-- http://www.phpmyadmin.net
--
-- Servidor: localhost
-- Tiempo de generación: 30-03-2017 a las 18:36:52
-- Versión del servidor: 5.1.36
-- Versión de PHP: 5.3.0

SET FOREIGN_KEY_CHECKS=0;

SET SQL_MODE="NO_AUTO_VALUE_ON_ZERO";

SET AUTOCOMMIT=0;
START TRANSACTION;


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Base de datos: `agenda`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `datos`
--

DROP TABLE IF EXISTS `datos`;
CREATE TABLE IF NOT EXISTS `datos` (
  `Id_Campo` int(2) NOT NULL,
  `Nombre` varchar(25) NOT NULL,
  `Edad` int(2) NOT NULL,
  `Direccion` varchar(50) NOT NULL,
  `Telefono` int(12) NOT NULL,
  PRIMARY KEY (`Id_Campo`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Volcar la base de datos para la tabla `datos`
--

REPLACE INTO `datos` (`Id_Campo`, `Nombre`, `Edad`, `Direccion`, `Telefono`) VALUES
(1, 'Juan Perez Avila', 34, 'Ecatepec', 12345678),
(2, 'Monica Diaz Mejia', 21, 'Tultitlan', 87654321),
(3, 'Francisco Saenz Diaz', 25, 'Coacalco', 12378456),
(4, 'Jesus Munjia Trejo', 36, 'Ecatepec', 87321654),
(5, 'Diana Vazquez Perez', 38, 'Tultepec', 21654378),
(6, 'Aranza Chong Ching', 26, 'Coacalco', 87231456),
(7, 'Diego Castro Silva', 28, 'Ecatepec', 56478213);

SET FOREIGN_KEY_CHECKS=1;

COMMIT;
