-- phpMyAdmin SQL Dump
-- version 3.5.1
-- http://www.phpmyadmin.net
--
-- Host: localhost
-- Generation Time: Sep 27, 2013 at 12:56 AM
-- Server version: 5.5.24-log
-- PHP Version: 5.4.3

SET SQL_MODE="NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `tarea`
--

-- --------------------------------------------------------

--
-- Table structure for table `empleados`
--

CREATE TABLE IF NOT EXISTS `empleados` (
  `id` varchar(255) NOT NULL,
  `nombre` varchar(255) NOT NULL,
  `direccion` varchar(255) NOT NULL,
  `correo` varchar(255) NOT NULL,
  `telefono` varchar(255) NOT NULL,
  `ocupacion` varchar(255) NOT NULL,
  `estado` varchar(255) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `empleados`
--

INSERT INTO `empleados` (`id`, `nombre`, `direccion`, `correo`, `telefono`, `ocupacion`, `estado`) VALUES
('1234556', 'MARIA PAEX', 'CENTRO UNO', 'MARIA_@HOTMAIL.COM', '6611882', 'ENFERMERA', 'S'),
('3534535', 'MANUEL CORRAL', 'BOCAGRANDE', 'RECORD@HOTAMIK.COM', '2157434', 'ABOJADO', 'S'),
('4345545', 'JULIO MIGUEL ESCOBAR', 'CENTRO UNO', 'JCESAR@HOTAMIL.COM', '6638293', 'PROGRAMADOR', 'S'),
('4543535', 'MALUEL MARTINEZ', 'CALAMARES', 'MANUEL@HOTMAIL.COM', '2345345', 'JUGADOR', 'S'),
('7545663', 'GUILLERMO MARTINEZ', 'CARACOLES', 'GUILLERMO29@GMAIL.COM', '4323456', 'ING DE SISTEMAS', 'S');

-- --------------------------------------------------------

--
-- Table structure for table `ocupaciones`
--

CREATE TABLE IF NOT EXISTS `ocupaciones` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `nombre` varchar(255) NOT NULL,
  `estado` varchar(255) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=11 ;

--
-- Dumping data for table `ocupaciones`
--

INSERT INTO `ocupaciones` (`id`, `nombre`, `estado`) VALUES
(1, 'Programador en Sistemas', 's'),
(2, 'Enfermera', 's'),
(3, 'Ing. de Alimentos', 's'),
(4, 'Ing. de Mecanica', 's'),
(5, 'Diseñador', 's'),
(6, 'Fotografo', 's'),
(7, 'Ing. de Sistemas', 's'),
(8, 'Ing. de Alimentos', 's'),
(9, 'Sin Ocupaciones', 's'),
(10, 'Ing. en diseÃ±o de maquinas', 's');

-- --------------------------------------------------------

--
-- Table structure for table `usuarios`
--

CREATE TABLE IF NOT EXISTS `usuarios` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `nombre` varchar(255) NOT NULL,
  `usu` varchar(255) NOT NULL,
  `con` varchar(255) NOT NULL,
  `tipo` varchar(255) NOT NULL,
  `estado` varchar(255) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=4 ;

--
-- Dumping data for table `usuarios`
--

INSERT INTO `usuarios` (`id`, `nombre`, `usu`, `con`, `tipo`, `estado`) VALUES
(1, 'Jorge Vasquez', 'jorge', 'jorge', 'a', 's'),
(2, 'Marcela', 'marcela', 'marcela', 'u', 's'),
(3, 'jorge marquez', 'jorge222', '123', 'a', 's');

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
