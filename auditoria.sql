-- phpMyAdmin SQL Dump
-- version 3.2.0.1
-- http://www.phpmyadmin.net
--
-- Servidor: localhost
-- Tiempo de generación: 01-06-2017 a las 06:16:51
-- Versión del servidor: 5.1.36
-- Versión de PHP: 5.3.0

SET SQL_MODE="NO_AUTO_VALUE_ON_ZERO";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Base de datos: `auditoria`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `controles`
--

CREATE TABLE IF NOT EXISTS `controles` (
  `id_control` int(3) NOT NULL AUTO_INCREMENT,
  `descripcion` varchar(30) NOT NULL,
  PRIMARY KEY (`id_control`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

--
-- Volcar la base de datos para la tabla `controles`
--


-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `funciones`
--

CREATE TABLE IF NOT EXISTS `funciones` (
  `id_funciones` int(3) NOT NULL AUTO_INCREMENT,
  `id_prueba` int(3) NOT NULL,
  `id_sistema` int(3) NOT NULL,
  `v_sist` longtext NOT NULL,
  `v_gral` longtext NOT NULL,
  `plan_p` longtext NOT NULL,
  `planes_p` longtext NOT NULL,
  `descripcion` longtext NOT NULL,
  `v_r` longtext NOT NULL,
  `id_usuario` int(3) NOT NULL,
  PRIMARY KEY (`id_funciones`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

--
-- Volcar la base de datos para la tabla `funciones`
--


-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `metricas`
--

CREATE TABLE IF NOT EXISTS `metricas` (
  `id_metricas` int(3) NOT NULL AUTO_INCREMENT,
  `descripcion` longtext NOT NULL,
  PRIMARY KEY (`id_metricas`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

--
-- Volcar la base de datos para la tabla `metricas`
--


-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `prueba`
--

CREATE TABLE IF NOT EXISTS `prueba` (
  `id_prueba` int(3) NOT NULL AUTO_INCREMENT,
  `tipo` varchar(30) NOT NULL,
  PRIMARY KEY (`id_prueba`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=16 ;

--
-- Volcar la base de datos para la tabla `prueba`
--

REPLACE INTO `prueba` (`id_prueba`, `tipo`) VALUES
(1, 'Usabilidad'),
(2, 'Unitaria'),
(3, 'Humo'),
(4, 'Regresion'),
(5, 'GUI'),
(6, 'Caja Blanca'),
(7, 'Caja Negra'),
(8, 'Integracion'),
(9, 'Aplicacion '),
(10, 'Funcionalidad'),
(11, 'Sistema'),
(12, 'Contenido'),
(13, 'Carga Maxima'),
(14, 'Navegacion '),
(15, 'Estres');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `sistema`
--

CREATE TABLE IF NOT EXISTS `sistema` (
  `id_sistema` int(3) NOT NULL AUTO_INCREMENT,
  `nombre` varchar(30) NOT NULL,
  PRIMARY KEY (`id_sistema`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=3 ;

--
-- Volcar la base de datos para la tabla `sistema`
--

REPLACE INTO `sistema` (`id_sistema`, `nombre`) VALUES
(1, 'Sistema A'),
(2, 'Sistema B');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tipos_controles`
--

CREATE TABLE IF NOT EXISTS `tipos_controles` (
  `id_tc` int(3) NOT NULL AUTO_INCREMENT,
  `id_control` int(3) NOT NULL,
  `id_sistema` int(3) NOT NULL,
  `id_metricas` int(3) NOT NULL,
  `id_usuario` int(3) NOT NULL,
  `objetivo` varchar(50) NOT NULL,
  `correcion` varchar(50) NOT NULL,
  `resultado` varchar(50) NOT NULL,
  PRIMARY KEY (`id_tc`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

--
-- Volcar la base de datos para la tabla `tipos_controles`
--


-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tipos_metrica`
--

CREATE TABLE IF NOT EXISTS `tipos_metrica` (
  `id_tm` int(3) NOT NULL AUTO_INCREMENT,
  `id_metricas` int(3) NOT NULL,
  `id_sistema` int(3) NOT NULL,
  `id_usuario` int(3) NOT NULL,
  `resultado` longtext NOT NULL,
  `comentario` longtext NOT NULL,
  PRIMARY KEY (`id_tm`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

--
-- Volcar la base de datos para la tabla `tipos_metrica`
--


-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `usuario`
--

CREATE TABLE IF NOT EXISTS `usuario` (
  `id_usuario` int(3) NOT NULL AUTO_INCREMENT,
  `nombre` varchar(30) NOT NULL,
  `telefono` int(12) NOT NULL,
  `celular` int(12) NOT NULL,
  `password` varchar(30) NOT NULL,
  `login` varchar(30) NOT NULL,
  PRIMARY KEY (`id_usuario`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=2 ;

--
-- Volcar la base de datos para la tabla `usuario`
--

REPLACE INTO `usuario` (`id_usuario`, `nombre`, `telefono`, `celular`, `password`, `login`) VALUES
(1, 'enrique', 56473738, 2147483647, '123', 'luis');
