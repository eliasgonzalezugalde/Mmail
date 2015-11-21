-- phpMyAdmin SQL Dump
-- version 4.1.14
-- http://www.phpmyadmin.net
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 21-11-2015 a las 21:35:28
-- Versión del servidor: 5.6.17
-- Versión de PHP: 5.5.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Base de datos: `tmaildb`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `email`
--

CREATE TABLE IF NOT EXISTS `email` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `asunto` text NOT NULL,
  `destinatario` text NOT NULL,
  `remitente` text NOT NULL,
  `contenido` text NOT NULL,
  `enviado` tinyint(1) NOT NULL,
  UNIQUE KEY `id` (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=4 ;

--
-- Volcado de datos para la tabla `email`
--

INSERT INTO `email` (`id`, `asunto`, `destinatario`, `remitente`, `contenido`, `enviado`) VALUES
(1, 'Asunto', 'eliasgonzalezugalde@gmail.com', 'elias', 'Contenido.', 0),
(2, 'Asunto dos', 'fidelcastroch@gmail.com', 'elias', 'Contenido dos.', 1),
(3, 'Este es el asunto', 'fcastro@gmail.com', 'elias', 'Este es el contenido.', 0);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `usuario`
--

CREATE TABLE IF NOT EXISTS `usuario` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `email` text NOT NULL,
  `contrasena` text NOT NULL,
  `email_alterno` text NOT NULL,
  `activo` tinyint(1) NOT NULL,
  UNIQUE KEY `id` (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=6 ;

--
-- Volcado de datos para la tabla `usuario`
--

INSERT INTO `usuario` (`id`, `email`, `contrasena`, `email_alterno`, `activo`) VALUES
(3, 'elias', '7815696ecbf1c96e6894b779456d330e', 'eliasgonzalezugalde@gmail.com', 1),
(5, 'fidel', '7815696ecbf1c96e6894b779456d330e', 'eliasgonzalezugalde@gmail.com', 0);

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
