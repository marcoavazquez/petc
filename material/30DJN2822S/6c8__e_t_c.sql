-- phpMyAdmin SQL Dump
-- version 3.4.5
-- http://www.phpmyadmin.net
--
-- Servidor: localhost
-- Tiempo de generación: 18-06-2012 a las 11:41:40
-- Versión del servidor: 5.5.16
-- Versión de PHP: 5.3.8

SET SQL_MODE="NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Base de datos: `e_t_c`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `talumnos`
--

CREATE TABLE IF NOT EXISTS `talumnos` (
  `idAlumnos` int(5) NOT NULL AUTO_INCREMENT,
  `sClaveEscuelaAl` varchar(10) NOT NULL,
  `sCicloAl` int(2) NOT NULL,
  PRIMARY KEY (`idAlumnos`),
  KEY `sClaveEscuelaAl` (`sClaveEscuelaAl`),
  KEY `sCicloAl` (`sCicloAl`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=41 ;

--
-- Volcado de datos para la tabla `talumnos`
--

INSERT INTO `talumnos` (`idAlumnos`, `sClaveEscuelaAl`, `sCicloAl`) VALUES
(1, '30DJN0214A', 2),
(2, '30DPB0011W', 2),
(3, '30EPR8UY76', 2),
(4, '30DPN8U7Y6', 2),
(5, '30DJN0214B', 2),
(6, '30DJN2434S', 2),
(7, '30DJN2822S', 2),
(8, '30DJN2823G', 2),
(9, '30DJN3425D', 2),
(10, '30DPB0075G', 2),
(11, '30DPB5352F', 2),
(12, '30DPB9875L', 2),
(13, '30DPN8U7Y6', 2),
(14, '30DTV0515N', 2),
(15, '30DJN1664M', 2),
(16, '30DJN1665N', 2),
(17, '30DJN9878I', 2),
(18, '30DPB0006K', 2),
(19, '30DPB0045B', 2),
(20, '30DPB0056S', 2),
(21, '30DPB0435G', 2),
(22, '30DPB0556P', 2),
(23, '30DPB4456H', 2),
(24, '30EPR8UY76', 2),
(25, '30DPB0044S', 2),
(26, '30DPB0044T', 2),
(27, '30DPB0053V', 2),
(28, '30DPB0095U', 2),
(29, '30DPB0103M', 2),
(30, '30DPB0136D', 2),
(31, '30DPB1223A', 2),
(32, '30DPB4136O', 2),
(33, '30DPB4153J', 2),
(34, '30DPB4332R', 2),
(35, '30DPB4434P', 2),
(36, '30DPB5343L', 2),
(37, '30DPB5553C', 2),
(38, '30DPB9895E', 2),
(39, '30DJN1665N', 2),
(40, '30DJN1665N', 2);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tapoyos_economicos`
--

CREATE TABLE IF NOT EXISTS `tapoyos_economicos` (
  `idApoyosEcon` int(5) NOT NULL AUTO_INCREMENT,
  `nCiclo` int(2) NOT NULL,
  `nBrutoMensual` float NOT NULL,
  `nIsrMensual` float NOT NULL,
  `sRFCae` varchar(13) NOT NULL,
  `nFechaInicio` int(2) NOT NULL,
  `nFechaFinal` int(2) NOT NULL,
  PRIMARY KEY (`idApoyosEcon`),
  KEY `nCiclo` (`nCiclo`),
  KEY `sRFCae` (`sRFCae`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=164 ;

--
-- Volcado de datos para la tabla `tapoyos_economicos`
--

INSERT INTO `tapoyos_economicos` (`idApoyosEcon`, `nCiclo`, `nBrutoMensual`, `nIsrMensual`, `sRFCae`, `nFechaInicio`, `nFechaFinal`) VALUES
(1, 1, 1001, 102, 'AAFI820619646', 1, 5),
(2, 1, 2001, 204, 'AEPJ7606188P0', 1, 5),
(4, 1, 1002, 102, 'FOMJ850126', 1, 5),
(5, 1, 2002, 204, 'HEGE710611HH7', 1, 5),
(7, 1, 1003, 102, 'HEQN8701194G9', 1, 5),
(8, 1, 2003, 204, 'HEVE120886', 1, 5),
(9, 1, 3003, 306, 'LAGM910528', 1, 5),
(10, 1, 1004, 102, 'PAOS840623LI3', 1, 5),
(11, 1, 2004, 204, 'RAVJ740926RH4', 1, 5),
(12, 1, 3004, 306, 'VASG870727', 1, 5),
(13, 1, 1005, 102, 'VEVG680108ML4', 1, 5),
(14, 1, 2005, 204, 'BAPA921212T54', 1, 5),
(15, 1, 3005, 306, 'CAGE730509SP7', 1, 5),
(16, 1, 1006, 102, 'JIPM880226', 1, 5),
(17, 1, 2006, 204, 'RIVA710112', 1, 5),
(18, 1, 3006, 306, 'ROMC811027CL3', 1, 5),
(19, 1, 1007, 102, 'VAME780124EK7', 1, 5),
(20, 1, 2007, 204, 'AOGD860226', 1, 5),
(21, 1, 3007, 306, 'COBA660918', 1, 5),
(22, 1, 1008, 102, 'LORG780708', 1, 5),
(23, 1, 2008, 204, 'SALV570310', 1, 5),
(24, 1, 3008, 306, 'SOGL920919', 1, 5),
(25, 1, 1009, 102, 'TIRJ640509', 1, 5),
(26, 1, 2009, 204, 'DAAD841119SV9', 1, 5),
(27, 1, 3009, 306, 'GORC860511AFO', 1, 5),
(28, 1, 1010, 102, 'LERP830316', 1, 5),
(29, 1, 2010, 204, 'LORE8606141P1', 1, 5),
(30, 1, 3010, 306, 'SOCG631107HV9', 1, 5),
(31, 1, 3010, 306, 'BUSL8001259LO', 1, 5),
(32, 1, 3010, 306, 'VANE870316', 1, 5),
(33, 1, 3010, 306, 'ZEMV871103HB6', 1, 5),
(34, 1, 0, 0, 'AACA770128JU2', 1, 5),
(35, 1, 0, 0, 'AALC85061471A', 1, 5),
(36, 1, 0, 0, 'AACA770128JU2', 1, 5),
(37, 1, 0, 0, 'AALC85061471A', 1, 5),
(38, 1, 6217, 553, 'AAMA8205291A2', 1, 5),
(39, 1, 7105, 632, 'AEGA840830SK1', 1, 5),
(40, 1, 7993, 711, 'AUCJ731122617', 1, 5),
(41, 1, 8881, 790, 'BEIC600520232', 1, 5),
(42, 1, 9769, 869, 'BEVA8607227W4', 1, 5),
(43, 1, 890, 79, 'CAAE530930MM7', 1, 5),
(44, 1, 1778, 158, 'CACC611103RV7', 1, 5),
(45, 1, 2666, 237, 'CAGX600216TZ7', 1, 5),
(46, 1, 3554, 316, 'CAMV690810QP5', 1, 5),
(47, 1, 4442, 395, 'CAVM600508R75', 1, 5),
(48, 1, 5330, 474, 'COCM660316CQ9', 1, 5),
(49, 1, 6218, 553, 'COGA740515', 1, 5),
(50, 1, 7106, 632, 'COPD831017KA1', 1, 5),
(51, 1, 7994, 711, 'COPF8402191I1', 1, 5),
(52, 1, 8882, 790, 'CORL651106Q7A', 1, 5),
(53, 1, 9770, 869, 'CUAY860427937', 1, 5),
(54, 1, 891, 79, 'CUCF740204AI2', 1, 5),
(55, 1, 1779, 158, 'CUJA7604102Y3', 1, 5),
(56, 1, 2667, 237, 'DOMA590102FP6', 1, 5),
(57, 1, 3555, 316, 'EIGL840724TZ4', 1, 5),
(58, 1, 4443, 395, 'FABA560327QF7', 1, 5),
(59, 1, 5331, 474, 'FOBA840316V99', 1, 5),
(60, 1, 6219, 553, 'FOIL7111271I8', 1, 5),
(61, 1, 7107, 632, 'GAAJ830112A83', 1, 5),
(62, 1, 7995, 711, 'GACA770808SK5', 1, 5),
(63, 1, 8883, 790, 'GACB841208923', 1, 5),
(64, 1, 9771, 869, 'GAES680120RL2', 1, 5),
(65, 1, 892, 79, 'GAET611117EN1', 1, 5),
(66, 1, 1780, 158, 'GAEV6406187G9', 1, 5),
(67, 1, 2668, 237, 'GAGE620210537', 1, 5),
(68, 1, 3556, 316, 'GAGE820226Q77', 1, 5),
(69, 1, 4444, 395, 'GAGM840714HJA', 1, 5),
(70, 1, 5332, 474, 'GAHL7302271N2', 1, 5),
(71, 1, 6220, 553, 'GAMR650830943', 1, 5),
(72, 1, 7108, 632, 'GARL690819CT9', 1, 5),
(73, 1, 7996, 711, 'GOGD580804BE8', 1, 5),
(74, 1, 8884, 790, 'GOGN900612RF8', 1, 5),
(75, 1, 9772, 869, 'GOVT671023I51', 1, 5),
(76, 1, 893, 79, 'GUSS550504QX5', 1, 5),
(77, 1, 1781, 158, 'HEHP700505K62', 1, 5),
(78, 1, 2669, 237, 'HEJR830831GA2', 1, 5),
(79, 1, 3557, 316, 'HERA421218GU8', 1, 5),
(80, 1, 4445, 395, 'HETF820513DC0', 1, 5),
(81, 1, 5333, 474, 'JUBJ670914F9A', 1, 5),
(82, 1, 6221, 553, 'JUGY680908KA1', 1, 5),
(83, 1, 7109, 632, 'LUAW8010036Q6', 1, 5),
(84, 1, 7997, 711, 'MABJ710128ST7', 1, 5),
(85, 1, 8885, 790, 'MAJA640226EY9', 1, 5),
(86, 1, 9773, 869, 'MARL681202JFA', 1, 5),
(87, 1, 894, 79, 'MAVA891018QWE', 1, 5),
(88, 1, 1782, 158, 'MAVK67092', 1, 5),
(89, 1, 2670, 237, 'MEJG6601136V4', 1, 5),
(90, 1, 3558, 316, 'MELM780717', 1, 5),
(91, 1, 4446, 395, 'MIMM740720582', 1, 5),
(92, 1, 5334, 474, 'MOMG790727GQ4', 1, 5),
(93, 1, 6222, 553, 'MOMT650529V54', 1, 5),
(94, 1, 7110, 632, 'MONA660318624', 1, 5),
(95, 1, 7998, 711, 'MOVP750317IIA', 1, 5),
(96, 1, 8886, 790, 'NUSA7002197V7', 1, 5),
(97, 1, 9774, 869, 'OEZA7008251E5', 1, 5),
(98, 1, 895, 79, 'PEMC630817T3A', 1, 5),
(99, 1, 1783, 158, 'PEMG831118KK1', 1, 5),
(100, 1, 2671, 237, 'PEOB6805143P1', 1, 5),
(101, 1, 3559, 316, 'PEPM6411115D5', 1, 5),
(102, 1, 4447, 395, 'PERE851107LB7', 1, 5),
(103, 1, 5335, 474, 'PESE6707154CA', 1, 5),
(104, 1, 6223, 553, 'PESH6306084IA', 1, 5),
(105, 1, 7111, 632, 'PEVF7704237N3', 1, 5),
(106, 1, 7999, 711, 'POHR810411RBO', 1, 5),
(107, 1, 8887, 790, 'POQR6107126E8', 1, 5),
(108, 1, 9775, 869, 'POSL580905CL2', 1, 5),
(109, 1, 896, 79, 'QUPA890127EG4', 1, 5),
(110, 1, 1784, 158, 'RASS860202IJ6', 1, 5),
(111, 1, 2672, 237, 'REAA690830RI5', 1, 5),
(112, 1, 3560, 316, 'RECX7710167U1', 1, 5),
(113, 1, 4448, 395, 'REJL860405MJ2', 1, 5),
(114, 1, 5336, 474, 'RESP60082988A', 1, 5),
(115, 1, 6224, 553, 'RIVA660101K14', 1, 5),
(116, 1, 7112, 632, 'ROGJ700414464', 1, 5),
(117, 1, 8000, 711, 'ROTV8308276B4', 1, 5),
(118, 1, 8888, 790, 'ROVE820406', 1, 5),
(119, 1, 9776, 869, 'SAGA610117CF6', 1, 5),
(120, 1, 897, 79, 'SAML530214LH7', 1, 5),
(121, 1, 1785, 158, 'SONE680501859', 1, 5),
(122, 1, 2673, 237, 'SOVE590630IX4', 1, 5),
(123, 1, 3561, 316, 'TAXM750817RR2', 1, 5),
(124, 1, 4449, 395, 'TEOR8005017W3', 1, 5),
(125, 1, 5337, 474, 'VAAN721207913', 1, 5),
(126, 1, 6225, 553, 'VAPA770425R25', 1, 5),
(127, 1, 7113, 632, 'VAPT7003155BO', 1, 5),
(128, 1, 8001, 711, 'VEBP660628UEA', 1, 5),
(129, 1, 8889, 790, 'XOCC641208M88', 1, 5),
(130, 1, 9777, 869, 'XOOE710522179', 1, 5),
(131, 1, 898, 79, 'ZACJ800822KJ9', 1, 5),
(132, 1, 1786, 158, 'ZERR7708305I6', 1, 5),
(133, 1, 2674, 237, 'AARI6705067A3', 1, 5),
(134, 1, 3562, 316, 'AOZC8509184C3', 1, 5),
(135, 1, 4450, 395, 'CACS810606963', 1, 5),
(136, 1, 5338, 474, 'DIJM8808101W6', 1, 5),
(137, 1, 6226, 553, 'GAMB690721GQ4', 1, 5),
(138, 1, 7114, 632, 'GOMI821017EX9', 1, 5),
(139, 1, 8002, 711, 'HEVP550811SF5', 1, 5),
(140, 1, 8890, 790, 'LIHL811015NC9', 1, 5),
(141, 1, 9778, 869, 'MACL800804G46', 1, 5),
(142, 1, 0, 0, 'MEMA770803IF8', 1, 5),
(143, 1, 0, 0, 'OOHI890309L95', 1, 5),
(144, 1, 0, 0, 'PAAL6812049', 1, 5),
(145, 1, 0, 0, 'PAVJ8305207C7', 1, 5),
(146, 1, 0, 0, 'PESH600505TS7', 1, 5),
(147, 1, 0, 0, 'REPM640702LY2', 1, 5),
(148, 1, 0, 0, 'SAGA630115G56', 1, 5),
(149, 1, 0, 0, 'VAGX620913ER7', 1, 5),
(150, 2, 2000, 200, 'CAMV690810QP5', 1, 1),
(151, 2, 2000, 200, 'CAMV690810QP5', 1, 3),
(152, 2, 2000, 200, 'CAMV690810QP5', 1, 1),
(153, 2, 2000, 200, 'CAMV690810QP5', 1, 3),
(154, 2, 2000, 200, 'CAMV690810QP5', 1, 1),
(155, 2, 10000, 2, 'CAMV690810QP5', 1, 12),
(159, 2, 34234, 2344, 'HEGE710611HH7', 1, 9),
(160, 2, 324234, 3432, 'OOHI890309L95', 1, 4),
(161, 2, 333, 33, 'MEMA770803IF8', 1, 1),
(162, 2, 2333, 333, 'SALV570310', 1, 2),
(163, 2, 2222, 123, 'SMGT920722TQM', 1, 3);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tcapacitacion`
--

CREATE TABLE IF NOT EXISTS `tcapacitacion` (
  `idCapacitacion` int(2) NOT NULL AUTO_INCREMENT,
  `sCapacitacion` text NOT NULL,
  PRIMARY KEY (`idCapacitacion`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=4 ;

--
-- Volcado de datos para la tabla `tcapacitacion`
--

INSERT INTO `tcapacitacion` (`idCapacitacion`, `sCapacitacion`) VALUES
(1, 'Capacitación para una mejor educación cultural dentro de las escuelas'),
(2, 'Mejora en la higiene de los alumnos'),
(3, 'Capacitación nueva para las escuelas');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tcapacitaciones`
--

CREATE TABLE IF NOT EXISTS `tcapacitaciones` (
  `idCapacitaciones` int(5) NOT NULL AUTO_INCREMENT,
  `sClaveEscuelaCap` varchar(10) NOT NULL,
  `nCapacitacion` int(2) NOT NULL,
  `sFechaCap` date NOT NULL,
  PRIMARY KEY (`idCapacitaciones`),
  KEY `sClaveEscuelaCap` (`sClaveEscuelaCap`),
  KEY `nCapacitacion` (`nCapacitacion`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=6 ;

--
-- Volcado de datos para la tabla `tcapacitaciones`
--

INSERT INTO `tcapacitaciones` (`idCapacitaciones`, `sClaveEscuelaCap`, `nCapacitacion`, `sFechaCap`) VALUES
(1, '30DJN2822S', 1, '2012-05-02'),
(2, '30DPB0045B', 2, '2012-05-10'),
(3, '30DPB1223A', 1, '2012-06-23'),
(4, '30DJN2822S', 1, '2012-06-23'),
(5, '30DJN2822S', 3, '2012-06-23');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tciclos`
--

CREATE TABLE IF NOT EXISTS `tciclos` (
  `idCiclo` int(2) NOT NULL AUTO_INCREMENT,
  `sCiclo` varchar(9) NOT NULL,
  PRIMARY KEY (`idCiclo`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=12 ;

--
-- Volcado de datos para la tabla `tciclos`
--

INSERT INTO `tciclos` (`idCiclo`, `sCiclo`) VALUES
(1, '2010-2011'),
(2, '2011-2012'),
(3, '2012-2013'),
(4, '2013-2014'),
(5, '2014-2015'),
(6, '2015-2016'),
(7, '2016-2017'),
(8, '2017-2018'),
(9, '2018-2019'),
(10, '2019-2020'),
(11, '2020-2021');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tcoordinacion`
--

CREATE TABLE IF NOT EXISTS `tcoordinacion` (
  `idCoordinacion` int(5) NOT NULL AUTO_INCREMENT,
  `sActividad` text NOT NULL,
  `sFecha` date NOT NULL,
  `sHora` varchar(8) NOT NULL,
  PRIMARY KEY (`idCoordinacion`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tescuelas`
--

CREATE TABLE IF NOT EXISTS `tescuelas` (
  `sClaveEscuela` varchar(12) NOT NULL,
  `sNombre` varchar(60) NOT NULL,
  `sLocalidad` varchar(60) NOT NULL,
  `sMunicipio` varchar(60) NOT NULL,
  `nZona` int(3) NOT NULL,
  `nSector` int(3) NOT NULL,
  `nModalidad` int(1) NOT NULL,
  `nNivel` int(1) NOT NULL,
  `sEmail` varchar(30) NOT NULL,
  `sTelefono` varchar(16) NOT NULL,
  `sCalle` varchar(30) NOT NULL,
  `nCP` int(5) NOT NULL,
  `sNumero` varchar(10) NOT NULL,
  `sColonia` varchar(20) NOT NULL,
  `nAfiliada` int(1) NOT NULL,
  PRIMARY KEY (`sClaveEscuela`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `tescuelas`
--

INSERT INTO `tescuelas` (`sClaveEscuela`, `sNombre`, `sLocalidad`, `sMunicipio`, `nZona`, `nSector`, `nModalidad`, `nNivel`, `sEmail`, `sTelefono`, `sCalle`, `nCP`, `sNumero`, `sColonia`, `nAfiliada`) VALUES
('30DJN0214A', 'Igancio Allenda', 'El Castillo', 'Xalapa ', 11, 0, 1, 1, '', '0', '0', 0, '0', '', 1),
('30DJN0214B', 'Graciela Rivera de Pozos ', 'Xalapa', 'Xalapa ', 11, 0, 1, 1, '', '0', '0', 0, '0', '', 1),
('30DJN1664M', 'Alfonso Arroyo Flores', 'Banderilla', 'Banderilla', 116, 0, 2, 1, '', '0', '0', 0, '0', '', 1),
('30DJN1665N', 'Antonio de Santanna', 'Banderilla', 'Banderilla ', 116, 0, 2, 1, 'dp@mija.com', '32323233', 'Av. Ruíz Cortínez', 33333, '0', 'Represa del Carmene', 1),
('30DJN2434S', 'Gomez Farias', 'Pacho Viejo', 'Coatepec ', 51, 0, 1, 2, '', '0', '0', 0, '0', '', 1),
('30DJN2822S', 'Gabriela Mistral', 'Coatepec', 'Coatepec ', 51, 0, 1, 2, '', '0', '0', 0, '0', '', 1),
('30DJN2823G', 'Valentin Gómez Farias', 'Pacho Nuevi', 'Coatepec ', 51, 0, 1, 2, '', '0', '0', 0, '0', '', 1),
('30DJN3425D', 'Igancio Perez', 'El Castillo', 'Xalapa ', 11, 0, 1, 1, '', '0', '0', 0, '0', '', 1),
('30DJN9878I', 'Antonio Banderas', 'Banderilla', 'Banderilla ', 116, 0, 2, 1, '', '0', '0', 0, '0', '', 1),
('30DPB0006K', 'Xa Sasti Kilhtamaku', 'Fracc. Lizardi', 'Papantla', 585, 5, 2, 2, '', '0', '0', 0, '0', '', 1),
('30DPB0011W', 'Francisco I. Madero', 'Zozocolco de Guerrero', 'Zozocolco de Hidalgo', 675, 11, 3, 3, '', '0', '0', 0, '0', '', 1),
('30DPB0044S', 'Francisco Villa', 'Naolinco', 'Naolinco', 675, 11, 3, 3, '', '0', '0', 0, '0', '', 0),
('30DPB0044T', 'Benito Juarez', 'Santa Ana', 'Playa Esmeralda', 637, 6, 3, 2, '', '0', '0', 0, '0', '', 1),
('30DPB0045B', 'Jose Maria Morelos y Pavon', 'Lizardo', 'Papantla', 585, 5, 2, 2, '', '0', '0', 0, '0', '', 0),
('30DPB0053V', 'Jacinto López', 'Arenal Santa Ana', 'Playa Vicente', 637, 6, 3, 2, '', '0', '0', 0, '0', '', 1),
('30DPB0056S', 'Gral. Hilario C. Salas', 'San Andrés Chamilpa', 'Mecayapan', 848, 8, 2, 3, '', '0', '0', 0, '0', '', 1),
('30DPB0075G', 'El Progreso', 'Tlanempa Común', 'Chicontepec', 627, 9, 1, 3, '', '0', '0', 0, '0', '', 1),
('30DPB0095U', '18 de Marzo', 'Chicomapa', 'Zongolica', 603, 7, 3, 1, '', '0', '0', 0, '0', '', 1),
('30DPB0103M', 'Gustavo Díaz Ordaz', 'Úrsulo Galván', 'Tatahuicapan de Juárez', 634, 8, 3, 1, '', '0', '0', 0, '0', '', 1),
('30DPB0136D', 'Gral. Lázaro Cárdenas del Río', 'Xochiojca', 'Zongolica', 603, 7, 3, 2, 'm@m.com', '2798765678', 'Av. Ruíz Cortínez', 91000, '345', 'Represa del Carmen', 1),
('30DPB0435G', 'Miguel Hidalgo', 'San Andrés Tuxtla', 'San Andres Tuxtla', 848, 8, 2, 3, '', '0', '0', 0, '0', '', 1),
('30DPB0556P', 'Morelos y Pavon', 'Fracc. Lizardo', 'Papantla', 585, 5, 2, 2, '', '0', '0', 0, '0', '', 1),
('30DPB1223A', '18 de Mayo', 'Zongolica', 'Zongolica', 603, 7, 3, 1, '', '0', '0', 0, '0', '', 1),
('30DPB4136O', 'Ruiz Cortinez', 'Actopan', 'Actopan', 603, 7, 3, 2, '', '0', '0', 0, '0', '', 0),
('30DPB4153J', 'Porfirio Díaz Ordaz', 'Juchique', 'Juchique', 634, 8, 3, 1, '', '0', '0', 0, '0', '', 0),
('30DPB4332R', 'Gustavo Díaz Ordaz', 'Galván', 'Juárez', 634, 8, 3, 1, '', '0', '0', 0, '0', '', 1),
('30DPB4434P', 'Francisco I. Madero', 'Alto Lucero', 'Alto Lucero', 675, 11, 3, 3, '', '0', '0', 0, '0', '', 1),
('30DPB4456H', 'Miguel Hidalgo y Costilla', 'San Andrés Tlanelhuayocan', 'San Andres Tlanelhuayocan', 848, 8, 2, 3, '', '0', '0', 0, '0', '', 0),
('30DPB5343L', 'Cárdenas del Río', 'Xochiojca', 'Actopan', 603, 7, 3, 2, '', '0', '0', 0, '0', '', 1),
('30DPB5352F', 'Progreso Mac', 'Tlanempa', 'Chicontepec', 627, 9, 1, 3, '', '0', '0', 0, '0', '', 1),
('30DPB5553C', 'Benito Juarez Garcia', 'Boca del Rio', 'Boca del Rio', 637, 6, 3, 2, '', '0', '0', 0, '0', '', 0),
('30DPB9875L', 'Sor Juana Ines de la Cruz', 'Tepetlan', 'Tepetlan', 627, 9, 1, 3, '', '0', '0', 0, '0', '', 0),
('30DPB9895E', 'Morelos', 'La huerta', 'Zongolica', 603, 7, 3, 1, '', '0', '0', 0, '0', '', 0),
('30DPN8U7Y6', 'Ignacio Zaragosa', 'Cardel', 'La antigua', 8, 9, 1, 1, 'algo@gmail.com', '229', '0', 98765, '888', 'Primero de Mayo', 1),
('30DTV0515N', 'Ricardo Flores Magón', 'Xalapa', 'Xalapa', 43, 23, 1, 1, 'moil@htomail.com', '4345435', '0', 34554, '34', 'Del Carmen', 1),
('30EPR8UY76', 'Fernando Irving', 'Veracruz', 'Veracruz', 3, 4, 2, 2, 'irv@hotmail.com', '767876546', '0', 91000, '67', 'Centro', 1);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tescuelas_ciclo`
--

CREATE TABLE IF NOT EXISTS `tescuelas_ciclo` (
  `idEscuelaCiclo` int(5) NOT NULL AUTO_INCREMENT,
  `sClaveEscuelaCiclo` varchar(12) NOT NULL,
  `nCiclo` int(2) NOT NULL,
  PRIMARY KEY (`idEscuelaCiclo`),
  KEY `sClaveEscuelaCiclo` (`sClaveEscuelaCiclo`),
  KEY `nCiclo` (`nCiclo`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=38 ;

--
-- Volcado de datos para la tabla `tescuelas_ciclo`
--

INSERT INTO `tescuelas_ciclo` (`idEscuelaCiclo`, `sClaveEscuelaCiclo`, `nCiclo`) VALUES
(1, '30DTV0515N', 2),
(2, '30DJN0214A', 2),
(3, '30DJN0214B', 2),
(4, '30DJN2434S', 2),
(5, '30DJN2822S', 2),
(6, '30DJN2823G', 2),
(7, '30DJN3425D', 2),
(8, '30DPB0075G', 2),
(9, '30DPB5352F', 2),
(10, '30DPB9875L', 2),
(11, '30DPN8U7Y6', 2),
(12, '30DTV0515N', 2),
(13, '30DJN1664M', 2),
(14, '30DJN1665N', 2),
(15, '30DJN9878I', 2),
(16, '30DPB0006K', 2),
(17, '30DPB0045B', 2),
(18, '30DPB0056S', 2),
(19, '30DPB0435G', 2),
(20, '30DPB0556P', 2),
(21, '30DPB4456H', 2),
(22, '30EPR8UY76', 2),
(23, '30DPB0011W', 2),
(24, '30DPB0044S', 2),
(25, '30DPB0044T', 2),
(26, '30DPB0053V', 2),
(27, '30DPB0095U', 2),
(28, '30DPB0103M', 2),
(29, '30DPB0136D', 2),
(30, '30DPB1223A', 2),
(31, '30DPB4136O', 2),
(32, '30DPB4153J', 2),
(33, '30DPB4332R', 2),
(34, '30DPB4434P', 2),
(35, '30DPB5343L', 2),
(36, '30DPB5553C', 2),
(37, '30DPB9895E', 2);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tespecialidad`
--

CREATE TABLE IF NOT EXISTS `tespecialidad` (
  `idEspecialidad` int(2) NOT NULL AUTO_INCREMENT,
  `sEspecialidad` varchar(65) NOT NULL,
  PRIMARY KEY (`idEspecialidad`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=7 ;

--
-- Volcado de datos para la tabla `tespecialidad`
--

INSERT INTO `tespecialidad` (`idEspecialidad`, `sEspecialidad`) VALUES
(1, 'Fortalecimiento del aprendizaje sobre contenidos curriculares'),
(2, 'Uso didáctico de las tecnologías de la información y comunicacion'),
(3, 'Aprendizaje de una lengua adicional'),
(4, 'Arte y cultura'),
(5, 'Alimentación saludable'),
(6, 'Recreación y desarrollo físico');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `testado`
--

CREATE TABLE IF NOT EXISTS `testado` (
  `idEstado` int(2) NOT NULL AUTO_INCREMENT,
  `sEstado` varchar(15) NOT NULL,
  PRIMARY KEY (`idEstado`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=3 ;

--
-- Volcado de datos para la tabla `testado`
--

INSERT INTO `testado` (`idEstado`, `sEstado`) VALUES
(1, 'Activo'),
(2, 'Inactivo');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tmodalidad`
--

CREATE TABLE IF NOT EXISTS `tmodalidad` (
  `idModalidad` int(1) NOT NULL AUTO_INCREMENT,
  `sModalidad` varchar(12) NOT NULL,
  PRIMARY KEY (`idModalidad`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=4 ;

--
-- Volcado de datos para la tabla `tmodalidad`
--

INSERT INTO `tmodalidad` (`idModalidad`, `sModalidad`) VALUES
(1, 'Federalizada'),
(2, 'Estatal'),
(3, 'Indígena');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tnivel`
--

CREATE TABLE IF NOT EXISTS `tnivel` (
  `idNivel` int(1) NOT NULL AUTO_INCREMENT,
  `sNivel` varchar(10) NOT NULL,
  PRIMARY KEY (`idNivel`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=4 ;

--
-- Volcado de datos para la tabla `tnivel`
--

INSERT INTO `tnivel` (`idNivel`, `sNivel`) VALUES
(1, 'Preescolar'),
(2, 'Primaria'),
(3, 'Especial');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tnivel_estudios`
--

CREATE TABLE IF NOT EXISTS `tnivel_estudios` (
  `idNivelEstudios` int(1) NOT NULL AUTO_INCREMENT,
  `sNivelEstudios` varchar(15) NOT NULL,
  PRIMARY KEY (`idNivelEstudios`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=2 ;

--
-- Volcado de datos para la tabla `tnivel_estudios`
--

INSERT INTO `tnivel_estudios` (`idNivelEstudios`, `sNivelEstudios`) VALUES
(1, 'Licenciatura');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tnum_alum`
--

CREATE TABLE IF NOT EXISTS `tnum_alum` (
  `idNumAlum` int(5) NOT NULL,
  `nAlumnos` int(3) NOT NULL,
  `nGrupos` int(2) NOT NULL,
  `nGrado` int(1) NOT NULL,
  KEY `idNumAlum` (`idNumAlum`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `tnum_alum`
--

INSERT INTO `tnum_alum` (`idNumAlum`, `nAlumnos`, `nGrupos`, `nGrado`) VALUES
(1, 34, 2, 1),
(1, 34, 2, 2),
(1, 45, 2, 3),
(1, 65, 2, 4),
(1, 54, 2, 5),
(1, 45, 2, 6),
(2, 89, 3, 1),
(2, 56, 2, 2),
(2, 52, 2, 3),
(2, 55, 2, 4),
(2, 23, 1, 5),
(2, 42, 2, 6),
(9, 58, 2, 1),
(10, 60, 2, 1),
(11, 62, 2, 1),
(12, 64, 2, 1),
(13, 66, 2, 1),
(14, 68, 2, 1),
(15, 70, 2, 1),
(16, 72, 2, 1),
(17, 74, 2, 1),
(18, 76, 2, 1),
(19, 78, 2, 1),
(20, 80, 2, 1),
(21, 82, 2, 1),
(22, 84, 2, 1),
(23, 86, 2, 1),
(24, 88, 2, 1),
(25, 90, 2, 1),
(26, 92, 2, 1),
(27, 94, 2, 1),
(29, 98, 2, 1),
(30, 100, 2, 1),
(31, 102, 2, 1),
(32, 104, 2, 1),
(33, 106, 2, 1),
(9, 60, 2, 2),
(10, 62, 2, 2),
(11, 64, 2, 2),
(12, 66, 2, 2),
(13, 68, 2, 2),
(14, 70, 2, 2),
(15, 72, 2, 2),
(16, 74, 2, 2),
(17, 76, 2, 2),
(18, 78, 2, 2),
(19, 80, 2, 2),
(20, 82, 2, 2),
(21, 84, 2, 2),
(22, 86, 2, 2),
(23, 88, 2, 2),
(24, 90, 2, 2),
(25, 92, 2, 2),
(26, 94, 2, 2),
(27, 96, 2, 2),
(29, 100, 2, 2),
(30, 102, 2, 2),
(31, 104, 2, 2),
(32, 106, 2, 2),
(33, 108, 2, 2),
(9, 62, 2, 3),
(10, 64, 2, 3),
(11, 66, 2, 3),
(12, 68, 2, 3),
(13, 70, 2, 3),
(14, 72, 2, 3),
(15, 74, 2, 3),
(16, 76, 2, 3),
(17, 78, 2, 3),
(18, 80, 2, 3),
(19, 82, 2, 3),
(20, 84, 2, 3),
(21, 86, 2, 3),
(22, 88, 2, 3),
(23, 90, 2, 3),
(24, 92, 2, 3),
(25, 94, 2, 3),
(26, 96, 2, 3),
(27, 98, 2, 3),
(29, 102, 2, 3),
(30, 104, 2, 3),
(31, 106, 2, 3),
(32, 108, 2, 3),
(33, 110, 2, 3),
(9, 64, 2, 4),
(10, 66, 2, 4),
(11, 68, 2, 4),
(12, 70, 2, 4),
(13, 72, 2, 4),
(14, 74, 2, 4),
(15, 76, 2, 4),
(17, 80, 2, 4),
(18, 82, 2, 4),
(19, 84, 2, 4),
(20, 86, 2, 4),
(21, 88, 2, 4),
(22, 90, 2, 4),
(23, 92, 2, 4),
(24, 94, 2, 4),
(25, 96, 2, 4),
(26, 98, 2, 4),
(27, 100, 2, 4),
(29, 104, 2, 4),
(30, 106, 2, 4),
(31, 108, 2, 4),
(32, 110, 2, 4),
(33, 112, 2, 4),
(9, 66, 2, 5),
(10, 68, 2, 5),
(11, 70, 2, 5),
(12, 72, 2, 5),
(13, 74, 2, 5),
(14, 76, 2, 5),
(15, 78, 2, 5),
(17, 82, 2, 5),
(18, 84, 2, 5),
(19, 86, 2, 5),
(20, 88, 2, 5),
(21, 90, 2, 5),
(22, 92, 2, 5),
(23, 94, 2, 5),
(24, 96, 2, 5),
(25, 98, 2, 5),
(26, 100, 2, 5),
(27, 102, 2, 5),
(29, 106, 2, 5),
(30, 108, 2, 5),
(31, 110, 2, 5),
(32, 112, 2, 5),
(33, 114, 2, 5),
(9, 68, 2, 6),
(10, 70, 2, 6),
(11, 72, 2, 6),
(12, 74, 2, 6),
(13, 76, 2, 6),
(14, 78, 2, 6),
(15, 80, 2, 6),
(17, 84, 2, 6),
(18, 86, 2, 6),
(19, 88, 2, 6),
(20, 90, 2, 6),
(21, 92, 2, 6),
(22, 94, 2, 6),
(23, 96, 2, 6),
(24, 98, 2, 6),
(25, 100, 2, 6),
(26, 102, 2, 6),
(27, 104, 2, 6),
(29, 108, 2, 6),
(30, 110, 2, 6),
(31, 112, 2, 6),
(32, 114, 2, 6),
(33, 116, 2, 6),
(33, 87, 2, 1),
(33, 76, 2, 2),
(40, 65, 1, 1),
(40, 45, 2, 2),
(40, 67, 1, 3);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tprivilegios`
--

CREATE TABLE IF NOT EXISTS `tprivilegios` (
  `idPrivilegio` int(11) NOT NULL AUTO_INCREMENT,
  `sPrivilegio` varchar(10) NOT NULL,
  PRIMARY KEY (`idPrivilegio`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tpuestos`
--

CREATE TABLE IF NOT EXISTS `tpuestos` (
  `idPuesto` int(1) NOT NULL AUTO_INCREMENT,
  `sPuesto` varchar(12) NOT NULL,
  PRIMARY KEY (`idPuesto`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=4 ;

--
-- Volcado de datos para la tabla `tpuestos`
--

INSERT INTO `tpuestos` (`idPuesto`, `sPuesto`) VALUES
(1, 'Docente'),
(2, 'Director'),
(3, 'Especialista');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `trecursos_humanos`
--

CREATE TABLE IF NOT EXISTS `trecursos_humanos` (
  `sRFC` varchar(13) NOT NULL,
  `sNombreRH` varchar(30) NOT NULL,
  `sApellidoPaternoRH` varchar(30) NOT NULL,
  `sApellidoMaternoRH` varchar(30) NOT NULL,
  `nDoblePlaza` int(1) DEFAULT NULL,
  `nPuesto` int(1) NOT NULL,
  `sFechaIngreso` date NOT NULL,
  `sFechaNacimiento` date NOT NULL,
  `nNivelEsctudios` int(1) DEFAULT NULL,
  `nEspecialidad` int(2) DEFAULT NULL,
  PRIMARY KEY (`sRFC`),
  KEY `nPuesto` (`nPuesto`),
  KEY `nNivelEsctudios` (`nNivelEsctudios`),
  KEY `nEspecialidad` (`nEspecialidad`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `trecursos_humanos`
--

INSERT INTO `trecursos_humanos` (`sRFC`, `sNombreRH`, `sApellidoPaternoRH`, `sApellidoMaternoRH`, `nDoblePlaza`, `nPuesto`, `sFechaIngreso`, `sFechaNacimiento`, `nNivelEsctudios`, `nEspecialidad`) VALUES
('AACA770128JU2', 'Alma Rosa', 'Alfaro', 'Xochicale', 1, 1, '1987-05-01', '2012-05-02', 1, NULL),
('AAFI820619646', 'Irvin Alberto', 'Andrade', 'Flores', NULL, 3, '0000-00-00', '0000-00-00', NULL, 1),
('AALC85061471A', 'Chritian Giovanni', 'Alarcón', 'Luna', 0, 1, '2012-05-01', '1987-05-02', 1, NULL),
('AAMA8205291A2', 'Ambrosio', 'Aparicio', 'Márquez', 0, 1, '1980-05-01', '2012-05-02', 1, NULL),
('AARI6705067A3', 'Israel', 'Ricardo', 'Amador', 0, 2, '1980-05-01', '2012-05-02', 1, NULL),
('AEGA840830SK1', 'Andrés', 'Del Ángel', 'Gaspar', 0, 1, '1987-05-01', '2012-05-02', 1, NULL),
('AEPJ7606188P0', 'Jeanette', 'Del Ángel', 'Palacios', NULL, 3, '0000-00-00', '0000-00-00', NULL, 2),
('AOGD860226', 'Diana Ivonne', 'Ambrosio', 'Guzman', NULL, 3, '0000-00-00', '0000-00-00', NULL, 4),
('AOZC8509184C3', 'Carla Sofía', 'Antonio', 'Zavaleta', 0, 2, '1980-05-01', '2012-05-02', 1, NULL),
('AUCJ731122617', 'Juan Manuel', 'Uscanga', 'Carvajal', 0, 1, '1980-05-01', '2012-05-02', 1, NULL),
('BAPA921212T54', 'Patricia', 'Baez', 'Alarcon', NULL, 3, '0000-00-00', '0000-00-00', NULL, 3),
('BEIC600520232', 'Carlos', 'Beristain', 'Ibarra', 0, 1, '1980-05-01', '2012-05-02', 1, NULL),
('BEVA8607227W4', 'Abigahil', 'Bernabé', 'Vázquez', 0, 1, '1987-05-01', '2012-05-02', 1, NULL),
('BUSL8001259LO', 'Liliana', 'Bustos', 'Sanchez', NULL, 3, '0000-00-00', '0000-00-00', NULL, 6),
('CAAE530930MM7', 'Eduardo', 'Castillo', 'Álvarez', 0, 1, '1987-05-01', '2012-05-02', 1, NULL),
('CACC611103RV7', 'Crescencio', 'Calihua', 'Calihua', 0, 1, '1980-05-01', '2012-05-02', 1, NULL),
('CACS810606963', 'Sinuhe', 'Canales', 'Cortes', 0, 1, '1987-05-01', '2012-05-02', 1, NULL),
('CAGE730509SP7', 'Esther', 'Castelan', 'García', NULL, 3, '0000-00-00', '0000-00-00', NULL, 3),
('CAGX600216TZ7', 'Onésimo', 'Cano', 'Gonzales', 0, 1, '1980-05-01', '2012-05-02', 1, NULL),
('CAMV690810QP5', 'Victorino', 'Cano', 'Méndez', 0, 1, '1980-05-01', '2012-05-02', 1, NULL),
('CAVM600508R75', 'Miguel Ángel', 'Campos', 'Velazco', 0, 1, '1980-05-01', '2012-05-02', 1, NULL),
('COBA660918', 'Adriana', 'Contreras', 'Brito', NULL, 3, '0000-00-00', '0000-00-00', NULL, 4),
('COCM660316CQ9', 'Modesto', 'Cocotle', 'Cocotle', 0, 2, '1980-05-01', '2012-05-02', 1, NULL),
('COGA740515', 'José Alfredo', 'Cobos', 'García', 0, 1, '1987-05-01', '2012-05-02', 1, NULL),
('COPD831017KA1', 'Dalia', 'Cosmes', 'Pérez', 1, 1, '1987-05-01', '2012-05-02', 1, NULL),
('COPF8402191I1', 'Freddy', 'Cortes', 'Pérez', 1, 1, '1987-05-01', '2012-05-02', 1, NULL),
('CORL651106Q7A', 'Leonardo F.', 'Cortes', 'de Rojas', 0, 1, '1980-05-01', '2012-05-02', 1, NULL),
('CUAY860427937', 'Yoloxochitl', 'Cueyactle', 'Amador', 0, 1, '1980-05-01', '2012-05-02', 1, NULL),
('CUCF740204AI2', 'Fernando', 'De la Cruz', 'De la Cruz', 0, 1, '1987-05-01', '2012-05-02', 1, NULL),
('CUJA7604102Y3', 'Anell', 'Cruz', 'Juárez', 0, 1, '1987-05-01', '2012-05-02', 1, NULL),
('DAAD841119SV9', 'Diana Anel', 'Davila', 'Alarcon', NULL, 3, '0000-00-00', '0000-00-00', NULL, 5),
('DIJM8808101W6', 'Macedonio Edsai', 'Díaz', 'Juárez', 0, 1, '1980-05-01', '2012-05-02', 1, NULL),
('DOMA590102FP6', 'Araceli', 'Domínguez', 'Moreno', 0, 1, '1987-05-01', '2012-05-02', 1, NULL),
('EIGL840724TZ4', 'Lucrecia', 'Espinoza', 'Gaona', 0, 1, '1987-05-01', '2012-05-02', 1, NULL),
('FABA560327QF7', 'Ananias', 'Franco', 'Bernabé', 0, 1, '1980-05-01', '2012-05-02', 1, NULL),
('FOBA840316V99', 'Anel', 'Flores', 'Barragán', 0, 1, '1987-05-01', '2012-05-02', 1, NULL),
('FOIL7111271I8', 'Leonardo F.', 'Flores', 'Ibáñez', 0, 1, '1980-05-01', '2012-05-02', 1, NULL),
('FOMJ850126', 'Julio Cesar', 'Flores', 'Malpica', NULL, 3, '0000-00-00', '0000-00-00', NULL, 1),
('GAAJ830112A83', 'Jantce Ali', 'García', 'Aldana', 0, 1, '1980-05-01', '2012-05-02', 1, NULL),
('GACA770808SK5', 'Abraham', 'García', 'Castillo', 0, 1, '1987-05-01', '2012-05-02', 1, NULL),
('GACB841208923', 'Berenice', 'Galeana', 'Cruz', 0, 1, '1980-05-01', '2012-05-02', 1, NULL),
('GAES680120RL2', 'Sebastián', 'Gálvez', 'Espindola', 0, 1, '1987-05-01', '2012-05-02', 1, NULL),
('GAET611117EN1', 'Teodora', 'Gerelli', 'Espinoza', 0, 1, '1987-05-01', '2012-05-02', 1, NULL),
('GAEV6406187G9', 'Vicente', 'Grande', 'Espinoza', 0, 1, '1987-05-01', '2012-05-02', 1, NULL),
('GAGE620210537', 'Eleuterio', 'García', 'Gómez', 0, 1, '1987-05-01', '2012-05-02', 1, NULL),
('GAGE820226Q77', 'Erika Edith', 'García', 'González', 0, 1, '2012-05-01', '2012-05-02', 1, NULL),
('GAGM840714HJA', 'José Miguel', 'García', 'García', 0, 1, '1980-05-01', '2012-05-02', 1, NULL),
('GAHL7302271N2', 'Leandro', 'García', 'Hernández', 0, 1, '1980-05-01', '2012-05-02', 1, NULL),
('GAMB690721GQ4', 'Blance E.', 'Gaspar', 'Moreno', 0, 2, '1987-05-01', '2012-05-02', 1, NULL),
('GAMR650830943', 'Ramón', 'García', 'Muñoz', 0, 1, '1987-05-01', '2012-05-02', 1, NULL),
('GARL690819CT9', 'Luisa', 'Reyes', 'Garcés', 0, 1, '1987-05-01', '2012-05-02', 1, NULL),
('GOGD580804BE8', 'Ma. Dominga', 'González', 'García', 0, 2, '1980-05-01', '2012-05-02', 1, NULL),
('GOGN900612RF8', 'Nazaria', 'Gómez', 'Gómez', 1, 1, '1987-05-01', '2012-05-02', 1, NULL),
('GOMI821017EX9', 'Ignacio', 'González', 'Méndez', 1, 1, '1987-05-01', '2012-05-02', 1, NULL),
('GORC860511AFO', 'Carlos Omar', 'González', 'Rodríguez', NULL, 3, '0000-00-00', '0000-00-00', NULL, 5),
('GOVT671023I51', 'Teresa', 'González', 'Vicente', 0, 1, '1980-05-01', '2012-05-02', 1, NULL),
('GUSS550504QX5', 'Salvador', 'Guzmán', 'Sánchez', 0, 1, '1980-05-01', '2012-05-02', 1, NULL),
('HEGE710611HH7', 'Elisa', 'Herrera', 'Gonzales', NULL, 3, '0000-00-00', '0000-00-00', NULL, 1),
('HEHP700505K62', 'Pio Valente', 'Hernández', 'Hernández', 0, 1, '1987-05-01', '2012-05-02', 1, NULL),
('HEJR830831GA2', 'Raúl', 'Hernández', 'de Jesús', 0, 1, '1980-05-01', '2012-05-02', 1, NULL),
('HEQN8701194G9', 'Niltiie', 'Herrera', 'Quintero', NULL, 3, '0000-00-00', '0000-00-00', NULL, 1),
('HERA421218GU8', 'Ausencia', 'Hernández', 'Rodríguez', 0, 1, '1987-05-01', '2012-05-02', 1, NULL),
('HETF820513DC0', 'Fátima', 'Hernández', 'Temoxtle', 0, 1, '1980-05-01', '2012-05-02', 1, NULL),
('HEVE120886', 'Karime Lizett', 'Duran', 'Ramírez', NULL, 3, '0000-00-00', '0000-00-00', NULL, 2),
('HEVP550811SF5', 'Paula', 'Hernández', 'Velázquez', 0, 2, '1987-05-01', '2012-05-02', 1, NULL),
('JIPM880226', 'Moises', 'Jimenez', 'Pérez', NULL, 3, '0000-00-00', '0000-00-00', NULL, 3),
('JUBJ670914F9A', 'José', 'Julían', 'Bonilla', 1, 2, '1987-05-01', '2012-05-02', 1, NULL),
('JUGY680908KA1', 'Yolanda', 'Juárez', 'Gómez', 0, 1, '1980-05-01', '2012-05-02', 1, NULL),
('LAGM910528', 'Monserrat', 'Lara', 'Guerrero', NULL, 3, '0000-00-00', '0000-00-00', NULL, 2),
('LERP830316', 'Pamela Susan', 'Arcudia', 'Mc. Donald', NULL, 3, '0000-00-00', '0000-00-00', NULL, 5),
('LIHL811015NC9', 'Lidia', 'Librado', 'Hernández', 0, 1, '1987-05-01', '2012-05-02', 1, NULL),
('LORE8606141P1', 'Emanuel', 'López', 'Rodríguez', NULL, 3, '0000-00-00', '0000-00-00', NULL, 5),
('LORG780708', 'Guadalupe Isabel', 'López', 'Rebolledo', NULL, 3, '0000-00-00', '0000-00-00', NULL, 4),
('LUAW8010036Q6', 'Wiselyn', 'Luna', 'Avalos', 0, 1, '1980-05-01', '2012-05-02', 1, NULL),
('MABJ710128ST7', 'Julián', 'Mapel', 'Boquiño', 0, 1, '1980-05-01', '1987-05-02', 1, NULL),
('MACL800804G46', 'Laida', 'Márquez', 'Castillo', 0, 1, '1987-05-01', '2012-05-02', 1, NULL),
('MAJA640226EY9', 'Alejandro', 'Martínez', 'Juárez', 0, 1, '1987-05-01', '2012-05-02', 1, NULL),
('MARL681202JFA', 'Libia', 'Martínez', 'Ramos', 0, 2, '1987-05-01', '2012-05-02', 1, NULL),
('MAVA180689123', 'Marco Antonio', 'Vazquez', 'Alonso', 0, 2, '2012-01-12', '1983-12-23', 1, NULL),
('MAVA891018QWE', 'Marco ', 'Salas', 'Domínguez', 0, 2, '2012-05-01', '2012-05-02', 1, NULL),
('MAVK67092', 'Katy', 'Martínez', 'Vergara', 0, 1, '1980-05-01', '2012-05-02', 1, NULL),
('MEJG6601136V4', 'Guadalupe A.', 'Mendoza', 'Jaramillo', 0, 1, '1987-05-01', '2012-05-02', 1, NULL),
('MELM780717', 'Morayma', 'Medina', 'León', 0, 1, '1987-05-01', '2012-05-02', 1, NULL),
('MEMA770803IF8', 'Ana Lidia', 'Mejía', 'Marín', 0, 2, '1980-05-01', '2012-05-02', 1, NULL),
('MIMM740720582', 'María', 'Miguel', 'Montes', 0, 1, '1987-05-01', '2012-05-02', 1, NULL),
('MOMG790727GQ4', 'Graciana', 'Moreno', 'Martinez', 0, 1, '1980-05-01', '2012-05-02', 1, NULL),
('MOMT650529V54', 'Trinidad', 'Morales', 'Morales', 0, 1, '1980-05-01', '2012-05-02', 1, NULL),
('MONA660318624', 'Ana Rosa', 'Morales', 'Nogueira', 0, 1, '1987-05-01', '2012-05-02', 1, NULL),
('MOVP750317IIA', 'Patricia', 'Mora', 'Velásquez', 0, 1, '1980-05-01', '1987-05-02', 1, NULL),
('NUSA7002197V7', 'Arnoldo Adán', 'Núñez', 'Saldivar', 0, 1, '1980-05-01', '2012-05-02', 1, NULL),
('OEZA7008251E5', 'Arsenio Adalid', 'Olmedo', 'Zapata', 0, 1, '1980-05-01', '2012-05-02', 1, NULL),
('OOHI890309L95', 'Isaura', 'Osorio', 'Hernández', 0, 1, '1982-05-01', '1987-05-02', 1, NULL),
('PAAL6812049', 'Lilia de los A.', 'Panamá', 'Alcántara', 0, 2, '1980-05-01', '2012-05-02', 1, NULL),
('PAOS840623LI3', 'Sergio', 'Pando', 'Osorio', NULL, 3, '0000-00-00', '0000-00-00', NULL, 2),
('PAVJ8305207C7', 'Johnny', 'Palomino', 'Vicente', 1, 2, '1980-05-01', '2012-05-02', 1, NULL),
('PEMC630817T3A', 'Clemencia', 'Pérez', 'Manzano', 0, 1, '1987-05-01', '2012-05-02', 1, NULL),
('PEMG831118KK1', 'Gladi Yuri', 'Pérez', 'Martín', 0, 1, '1987-05-01', '2012-05-02', 1, NULL),
('PEOB6805143P1', 'Bonifacio', 'Pérez', 'Olarte', 0, 1, '1980-05-01', '2012-05-02', 1, NULL),
('PEPM6411115D5', 'Martina', 'Pérez', 'Pérez', 0, 1, '1987-05-01', '2012-05-02', 1, NULL),
('PERE851107LB7', 'Edher', 'Pérez', 'Romero', 0, 1, '1980-05-01', '2012-05-02', 1, NULL),
('PESE6707154CA', 'Ernesto', 'Pérez', 'Santiago', 0, 1, '1980-05-01', '2012-05-02', 1, NULL),
('PESH600505TS7', 'Hilario', 'Pérez', 'Santos', 0, 2, '1987-05-01', '2012-05-02', 1, NULL),
('PESH6306084IA', 'Heraclio', 'Pérez', 'Santiago', 0, 1, '1980-05-01', '2012-05-02', 1, NULL),
('PEVF7704237N3', 'Flor Dalila', 'Pérez', 'Venoso', 0, 1, '1987-05-01', '2012-05-02', 1, NULL),
('POHR810411RBO', 'Luis Enrique', 'Pozos', 'Hernández', 0, 1, '1980-05-01', '2012-05-02', 1, NULL),
('POQR6107126E8', 'Rubén', 'Pomares', 'Quiñones', 0, 1, '1980-05-01', '2012-05-02', 1, NULL),
('POSL580905CL2', 'José Lorenzo', 'Pozos', 'Suárez', 0, 1, '2012-05-01', '2012-05-02', 1, NULL),
('QUPA890127EG4', 'Ángel Aarón', 'Quiahua', 'Pérez', 0, 1, '1980-05-01', '2012-05-02', 1, NULL),
('RASS860202IJ6', 'Saúl', 'Ramírez', 'Salas', 0, 1, '1987-05-01', '1987-05-02', 1, NULL),
('RAVJ740926RH4', 'Jesús Joaquin', 'Ramirez', 'Vallejo', NULL, 3, '0000-00-00', '0000-00-00', NULL, 2),
('REAA690830RI5', 'Ariadna', 'Real Pozo', 'Aguilar', 0, 1, '1980-05-01', '1987-05-02', 1, NULL),
('RECX7710167U1', 'Xanat', 'Reyes', 'Cruz', 0, 1, '1980-05-01', '2012-05-02', 1, NULL),
('REJL860405MJ2', 'Laura Esmeralda', 'Reyes', 'Jiménez', 0, 1, '1980-05-01', '2012-05-02', 1, NULL),
('REPM640702LY2', 'Martiniano', 'Reyes', 'Pérez', 0, 2, '1987-05-01', '2012-05-02', 1, NULL),
('RESP60082988A', 'Pedro', 'Reyes', 'Santes', 0, 1, '1980-05-01', '2012-05-02', 1, NULL),
('RIVA660101K14', 'Albertin', 'Rivera', 'Vega', 0, 1, '1987-05-01', '2012-05-02', 1, NULL),
('RIVA710112', 'José Alfredo', 'Rivera', 'Verdin', NULL, 3, '0000-00-00', '0000-00-00', NULL, 3),
('ROGJ700414464', 'José', 'Roque', 'García', 0, 1, '1987-05-01', '2012-05-02', 1, NULL),
('ROMC811027CL3', 'Christian', 'Rodriguez', 'Marin', NULL, 3, '0000-00-00', '0000-00-00', NULL, 3),
('ROTV8308276B4', 'Verónica', 'Rojas', 'Tiburcio', 0, 1, '1980-05-01', '2012-05-02', 1, NULL),
('ROVE820406', 'Elsa', 'Romero', 'Vázquez', 0, 1, '1980-05-01', '2012-05-02', 1, NULL),
('SAGA610117CF6', 'Antonio', 'Salazar', 'García', 1, 1, '1980-05-01', '2012-05-02', 1, NULL),
('SAGA630115G56', 'Apolinar', 'Salazar', 'García', 1, 2, '1987-05-01', '2012-05-02', 1, NULL),
('SALV570310', 'Victor', 'Santos', 'López', NULL, 3, '0000-00-00', '0000-00-00', NULL, 4),
('SAML530214LH7', 'Leonor', 'Sánchez', 'Méndez', 0, 1, '1980-05-01', '2012-05-02', 1, NULL),
('sdsp910330sds', 'Selena', 'Dominguez', 'de Todos', NULL, 3, '2002-12-12', '2012-12-12', NULL, 3),
('SMGT920722TQM', '', 'Dominguez', 'sanchez', NULL, 3, '2002-12-12', '2012-12-12', NULL, 1),
('SOCG631107HV9', 'Gloria Leticia', 'Sosa', 'Cortes', NULL, 3, '0000-00-00', '0000-00-00', NULL, 5),
('SOGL920919', 'Lucia', 'Sosa', 'Gaytan', NULL, 3, '0000-00-00', '0000-00-00', NULL, 4),
('SONE680501859', 'Ma. Eugenia', 'Solis', 'Nieves', 0, 1, '1987-05-01', '2012-05-02', 1, NULL),
('SOVE590630IX4', 'Everardo', 'Sotero', 'Vega', 0, 1, '1980-05-01', '2012-05-02', 1, NULL),
('TAXM750817RR2', 'Miguel Ángel', 'Tadeo', 'Xochicale', 0, 1, '1980-05-01', '2012-05-02', 1, NULL),
('TEOR8005017W3', 'Rafaela', 'Tepole', 'Ortega', 0, 1, '1987-05-01', '2012-05-02', 1, NULL),
('TIRJ640509', 'Jesús', 'Triunfo', 'Rangel', NULL, 3, '0000-00-00', '0000-00-00', NULL, 4),
('trsa890618trs', 'Talix', 'Rivera', 'Rodriguez', 0, 1, '2012-01-12', '1983-12-23', 1, NULL),
('VAAN721207913', 'José Antonio', 'Vázquez', 'Juárez', 0, 1, '1980-05-01', '2012-05-02', 1, NULL),
('VAGX620913ER7', 'Amado', 'Vázquez', 'García', 0, 2, '1980-05-01', '2012-05-02', 1, NULL),
('VAME780124EK7', 'Maria Elena', 'Valdéz', 'Martínez', NULL, 3, '0000-00-00', '0000-00-00', NULL, 3),
('VANE870316', 'Ever Daniel', 'Del Valle', 'Noguera', NULL, 3, '0000-00-00', '0000-00-00', NULL, 6),
('VAPA770425R25', 'Aracely', 'Vázquez', 'Patiño', 0, 1, '1987-05-01', '2012-05-02', 1, NULL),
('VAPT7003155BO', 'Teresa', 'Vázquez', 'Pulido', 0, 1, '1980-05-01', '2012-05-02', 1, NULL),
('VASG870727', 'Gladys Leivy', 'Vázquez', 'Sanchez', NULL, 3, '0000-00-00', '0000-00-00', NULL, 2),
('VEBP660628UEA', 'Pablo', 'Velázquez', 'Bernabé', 0, 1, '1987-05-01', '2012-05-02', 1, NULL),
('VEVG680108ML4', 'Gaspar', 'Vera', 'Valdés', NULL, 3, '0000-00-00', '0000-00-00', NULL, 2),
('XOCC641208M88', 'Ma. Concepción', 'Xocua', 'Coyohua', 0, 1, '1987-05-01', '2012-05-02', 1, NULL),
('XOOE710522179', 'José Emilio', 'Xochicale', 'Ortega', 0, 1, '1987-05-01', '2012-05-02', 1, NULL),
('ZACJ800822KJ9', 'Joel', 'Zarrabal', 'Caldelas', 1, 1, '1987-05-01', '2012-05-02', 1, NULL),
('ZEMV871103HB6', 'Valentin', 'Zendejas', 'Murrieta', NULL, 3, '0000-00-00', '0000-00-00', NULL, 6),
('ZERR7708305I6', 'Rosaldo', 'Zainos', 'Reyes', 0, 1, '1980-05-01', '2012-05-02', 1, NULL);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `trecursos_hum_ciclo`
--

CREATE TABLE IF NOT EXISTS `trecursos_hum_ciclo` (
  `idRecHumCiclo` int(6) NOT NULL AUTO_INCREMENT,
  `sRFCrhc` varchar(13) NOT NULL,
  `sCicloRhc` int(2) NOT NULL,
  `nPuestoRhc` int(1) NOT NULL,
  `sClaveEscuelaRhc` varchar(10) NOT NULL,
  `nEstado` int(2) NOT NULL,
  PRIMARY KEY (`idRecHumCiclo`),
  UNIQUE KEY `sRFCrhc_2` (`sRFCrhc`,`sCicloRhc`,`sClaveEscuelaRhc`),
  KEY `sRFCrhc` (`sRFCrhc`),
  KEY `nPuestoRhc` (`nPuestoRhc`),
  KEY `sClaveEscuelaRhc` (`sClaveEscuelaRhc`),
  KEY `sCicloRhc` (`sCicloRhc`),
  KEY `nEstado` (`nEstado`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=146 ;

--
-- Volcado de datos para la tabla `trecursos_hum_ciclo`
--

INSERT INTO `trecursos_hum_ciclo` (`idRecHumCiclo`, `sRFCrhc`, `sCicloRhc`, `nPuestoRhc`, `sClaveEscuelaRhc`, `nEstado`) VALUES
(1, 'AACA770128JU2', 2, 1, '30DJN0214A', 1),
(2, 'AALC85061471A', 2, 1, '30DJN0214B', 1),
(3, 'AAMA8205291A2', 2, 1, '30DJN1664M', 1),
(4, 'AEGA840830SK1', 2, 1, '30DJN1665N', 1),
(5, 'AUCJ731122617', 2, 1, '30DJN2434S', 1),
(6, 'BEIC600520232', 2, 1, '30DJN2822S', 1),
(7, 'BEVA8607227W4', 2, 1, '30DJN2823G', 1),
(8, 'CAAE530930MM7', 2, 1, '30DJN3425D', 1),
(9, 'CACC611103RV7', 2, 1, '30DJN9878I', 1),
(10, 'CAGX600216TZ7', 2, 1, '30DPB0006K', 1),
(11, 'CAMV690810QP5', 2, 1, '30DPB0011W', 1),
(12, 'CAVM600508R75', 2, 1, '30DPB0044S', 1),
(13, 'COCM660316CQ9', 2, 1, '30DPB0044T', 1),
(14, 'COGA740515', 2, 1, '30DPB0045B', 1),
(15, 'COPD831017KA1', 2, 1, '30DPB0053V', 1),
(16, 'COPF8402191I1', 2, 1, '30DPB0056S', 1),
(17, 'CORL651106Q7A', 2, 1, '30DPB0075G', 1),
(18, 'CUAY860427937', 2, 1, '30DPB0095U', 1),
(19, 'CUCF740204AI2', 2, 1, '30DPB0103M', 1),
(20, 'CUJA7604102Y3', 2, 1, '30DPB0136D', 1),
(21, 'DOMA590102FP6', 2, 1, '30DPB0435G', 1),
(22, 'EIGL840724TZ4', 2, 1, '30DPB0556P', 1),
(23, 'FABA560327QF7', 2, 1, '30DPB1223A', 1),
(24, 'FOBA840316V99', 2, 1, '30DPB4136O', 1),
(25, 'FOIL7111271I8', 2, 1, '30DPB4153J', 1),
(26, 'GAAJ830112A83', 2, 1, '30DPB4332R', 1),
(27, 'GACA770808SK5', 2, 1, '30DPB4434P', 1),
(28, 'GACB841208923', 2, 1, '30DPB4456H', 1),
(29, 'GAES680120RL2', 2, 1, '30DPB5343L', 1),
(30, 'GAET611117EN1', 2, 1, '30DPB5352F', 1),
(31, 'GAEV6406187G9', 2, 1, '30DPB5553C', 1),
(32, 'GAGE620210537', 2, 1, '30DPB9875L', 1),
(33, 'GAGE820226Q77', 2, 1, '30DPB9895E', 1),
(34, 'GAGM840714HJA', 2, 1, '30DPN8U7Y6', 1),
(35, 'GAHL7302271N2', 2, 1, '30DTV0515N', 1),
(36, 'GAMR650830943', 2, 1, '30EPR8UY76', 1),
(37, 'GARL690819CT9', 2, 1, '30DPB0044T', 1),
(38, 'GOGD580804BE8', 2, 1, '30DPB0044T', 1),
(39, 'GOGN900612RF8', 2, 1, '30DPB0044T', 1),
(40, 'GOVT671023I51', 2, 1, '30DPB0045B', 1),
(41, 'GUSS550504QX5', 2, 1, '30DPB0045B', 1),
(42, 'HEHP700505K62', 2, 1, '30DPB0045B', 1),
(43, 'HEJR830831GA2', 2, 1, '30DPB0053V', 1),
(44, 'HERA421218GU8', 2, 1, '30DPB0053V', 1),
(45, 'HETF820513DC0', 2, 1, '30DPB0053V', 1),
(46, 'JUBJ670914F9A', 2, 1, '30DPB0056S', 1),
(47, 'JUGY680908KA1', 2, 1, '30DPB0056S', 1),
(48, 'LUAW8010036Q6', 2, 1, '30DPB0056S', 1),
(49, 'MABJ710128ST7', 2, 1, '30DPB0075G', 1),
(50, 'MAJA640226EY9', 2, 1, '30DPB0075G', 1),
(51, 'MARL681202JFA', 2, 1, '30DPB0075G', 1),
(52, 'MAVA891018QWE', 2, 1, '30DPB0095U', 1),
(53, 'MAVK67092', 2, 1, '30DPB0095U', 1),
(54, 'MEJG6601136V4', 2, 1, '30DPB0095U', 1),
(55, 'MELM780717', 2, 1, '30DPB0103M', 1),
(56, 'MIMM740720582', 2, 1, '30DPB0103M', 1),
(57, 'MOMG790727GQ4', 2, 1, '30DPB0103M', 1),
(58, 'MOMT650529V54', 2, 1, '30DPB0136D', 1),
(59, 'MONA660318624', 2, 1, '30DPB0136D', 1),
(60, 'MOVP750317IIA', 2, 1, '30DPB0136D', 1),
(61, 'NUSA7002197V7', 2, 1, '30DPB0435G', 1),
(62, 'OEZA7008251E5', 2, 1, '30DPB0435G', 1),
(63, 'PEMC630817T3A', 2, 1, '30DPB0435G', 1),
(64, 'PEMG831118KK1', 2, 1, '30DPB0556P', 1),
(65, 'PEOB6805143P1', 2, 1, '30DPB0556P', 1),
(66, 'PEPM6411115D5', 2, 1, '30DPB0556P', 1),
(67, 'PERE851107LB7', 2, 1, '30DPB1223A', 1),
(68, 'PESE6707154CA', 2, 1, '30DPB1223A', 1),
(69, 'PESH6306084IA', 2, 1, '30DPB1223A', 1),
(70, 'PEVF7704237N3', 2, 1, '30DPB4136O', 1),
(71, 'POHR810411RBO', 2, 1, '30DPB4136O', 1),
(72, 'POQR6107126E8', 2, 1, '30DPB4136O', 1),
(73, 'POSL580905CL2', 2, 1, '30DPB4153J', 1),
(74, 'QUPA890127EG4', 2, 1, '30DPB4153J', 1),
(75, 'RASS860202IJ6', 2, 1, '30DPB4153J', 1),
(76, 'REAA690830RI5', 2, 1, '30DPB4332R', 1),
(77, 'RECX7710167U1', 2, 1, '30DPB4332R', 1),
(78, 'REJL860405MJ2', 2, 1, '30DPB4332R', 1),
(79, 'RESP60082988A', 2, 1, '30DPB4434P', 1),
(80, 'RIVA660101K14', 2, 1, '30DPB4434P', 1),
(81, 'ROGJ700414464', 2, 1, '30DPB4434P', 1),
(82, 'ROTV8308276B4', 2, 1, '30DPB4456H', 1),
(83, 'ROVE820406', 2, 1, '30DPB4456H', 1),
(84, 'SAGA610117CF6', 2, 1, '30DPB4456H', 1),
(85, 'SAML530214LH7', 2, 1, '30DPB5343L', 1),
(86, 'SONE680501859', 2, 1, '30DPB5343L', 1),
(87, 'SOVE590630IX4', 2, 1, '30DPB5343L', 1),
(88, 'TAXM750817RR2', 2, 1, '30DPB5352F', 1),
(89, 'TEOR8005017W3', 2, 1, '30DPB5352F', 1),
(90, 'VAAN721207913', 2, 1, '30DPB5352F', 1),
(91, 'VAPA770425R25', 2, 1, '30DPB5553C', 1),
(92, 'VAPT7003155BO', 2, 1, '30DPB5553C', 1),
(93, 'VEBP660628UEA', 2, 1, '30DPB5553C', 1),
(94, 'XOCC641208M88', 2, 1, '30DPB9875L', 1),
(95, 'XOOE710522179', 2, 1, '30DPB9875L', 1),
(96, 'ZACJ800822KJ9', 2, 1, '30DPB9875L', 1),
(97, 'ZERR7708305I6', 2, 1, '30DPB9895E', 1),
(98, 'AARI6705067A3', 2, 2, '30DPB9895E', 1),
(99, 'AOZC8509184C3', 2, 2, '30DPB9895E', 1),
(100, 'CACS810606963', 2, 2, '30DPN8U7Y6', 1),
(101, 'DIJM8808101W6', 2, 2, '30DPN8U7Y6', 1),
(102, 'GAMB690721GQ4', 2, 2, '30DPN8U7Y6', 1),
(103, 'GOMI821017EX9', 2, 2, '30DTV0515N', 1),
(104, 'HEVP550811SF5', 2, 2, '30DTV0515N', 1),
(105, 'LIHL811015NC9', 2, 2, '30DTV0515N', 1),
(106, 'MACL800804G46', 2, 2, '30EPR8UY76', 1),
(107, 'MEMA770803IF8', 2, 2, '30EPR8UY76', 1),
(108, 'OOHI890309L95', 2, 2, '30EPR8UY76', 1),
(109, 'AAFI820619646', 2, 3, '30DJN0214A', 1),
(110, 'AEPJ7606188P0', 2, 3, '30DJN0214B', 1),
(111, 'AOGD860226', 2, 3, '30DJN1664M', 1),
(112, 'BAPA921212T54', 2, 3, '30DJN1665N', 1),
(113, 'BUSL8001259LO', 2, 3, '30DJN2434S', 1),
(114, 'CAGE730509SP7', 2, 3, '30DJN2822S', 1),
(115, 'COBA660918', 2, 3, '30DJN2823G', 1),
(116, 'DAAD841119SV9', 2, 3, '30DJN3425D', 1),
(117, 'FOMJ850126', 2, 3, '30DJN9878I', 1),
(118, 'GORC860511AFO', 2, 3, '30DPB0006K', 1),
(119, 'HEGE710611HH7', 2, 3, '30DPB0011W', 1),
(120, 'HEQN8701194G9', 2, 3, '30DPB0044S', 1),
(121, 'HEVE120886', 2, 3, '30DPB0044T', 1),
(122, 'JIPM880226', 2, 3, '30DPB0045B', 1),
(123, 'LAGM910528', 2, 3, '30DPB0053V', 1),
(124, 'LERP830316', 2, 3, '30DPB0056S', 1),
(125, 'LORE8606141P1', 2, 3, '30DPB0075G', 1),
(126, 'LORG780708', 2, 3, '30DPB0095U', 1),
(127, 'PAOS840623LI3', 2, 3, '30DPB0103M', 1),
(128, 'RAVJ740926RH4', 2, 3, '30DPB0136D', 1),
(129, 'RIVA710112', 2, 3, '30DPB0435G', 1),
(130, 'ROMC811027CL3', 2, 3, '30DPB0556P', 1),
(131, 'SALV570310', 2, 3, '30DPB1223A', 1),
(132, 'SOCG631107HV9', 2, 3, '30DPB4136O', 1),
(133, 'SOGL920919', 2, 3, '30DPB4153J', 1),
(134, 'TIRJ640509', 2, 3, '30DPB4332R', 1),
(135, 'VAME780124EK7', 2, 3, '30DPB4434P', 1),
(136, 'VANE870316', 2, 3, '30DPB4456H', 1),
(137, 'VASG870727', 2, 3, '30DPB5343L', 1),
(138, 'VEVG680108ML4', 2, 3, '30DPB5352F', 1),
(139, 'ZEMV871103HB6', 2, 3, '30DPB5553C', 1),
(140, 'MAVA180689123', 2, 2, '30DJN2822S', 1),
(141, 'trsa890618trs', 2, 1, '30DJN2822S', 1),
(144, 'SMGT920722TQM', 2, 3, '30DJN2822S', 2),
(145, 'sdsp910330sds', 2, 3, '30DJN2822S', 1);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tusuarios`
--

CREATE TABLE IF NOT EXISTS `tusuarios` (
  `idUsuario` int(11) NOT NULL AUTO_INCREMENT,
  `sNombreUsr` varchar(30) NOT NULL,
  `sApellidoPaternoUsr` varchar(30) NOT NULL,
  `sApellidoMaternoUsr` varchar(30) NOT NULL,
  `sUsuario` varchar(10) NOT NULL,
  `sContrasena` varchar(15) NOT NULL,
  `nPrivilegio` int(2) NOT NULL,
  PRIMARY KEY (`idUsuario`),
  KEY `nPrivilegio` (`nPrivilegio`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

--
-- Restricciones para tablas volcadas
--

--
-- Filtros para la tabla `talumnos`
--
ALTER TABLE `talumnos`
  ADD CONSTRAINT `talumnos_ibfk_1` FOREIGN KEY (`sClaveEscuelaAl`) REFERENCES `tescuelas` (`sClaveEscuela`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `talumnos_ibfk_2` FOREIGN KEY (`sCicloAl`) REFERENCES `tciclos` (`idCiclo`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Filtros para la tabla `tapoyos_economicos`
--
ALTER TABLE `tapoyos_economicos`
  ADD CONSTRAINT `tapoyos_economicos_ibfk_1` FOREIGN KEY (`nCiclo`) REFERENCES `tciclos` (`idCiclo`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `tapoyos_economicos_ibfk_2` FOREIGN KEY (`sRFCae`) REFERENCES `trecursos_humanos` (`sRFC`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Filtros para la tabla `tcapacitaciones`
--
ALTER TABLE `tcapacitaciones`
  ADD CONSTRAINT `tcapacitaciones_ibfk_1` FOREIGN KEY (`sClaveEscuelaCap`) REFERENCES `tescuelas` (`sClaveEscuela`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `tcapacitaciones_ibfk_2` FOREIGN KEY (`nCapacitacion`) REFERENCES `tcapacitacion` (`idCapacitacion`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Filtros para la tabla `tescuelas_ciclo`
--
ALTER TABLE `tescuelas_ciclo`
  ADD CONSTRAINT `tescuelas_ciclo_ibfk_1` FOREIGN KEY (`sClaveEscuelaCiclo`) REFERENCES `tescuelas` (`sClaveEscuela`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `tescuelas_ciclo_ibfk_2` FOREIGN KEY (`nCiclo`) REFERENCES `tciclos` (`idCiclo`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Filtros para la tabla `tnum_alum`
--
ALTER TABLE `tnum_alum`
  ADD CONSTRAINT `tnum_alum_ibfk_1` FOREIGN KEY (`idNumAlum`) REFERENCES `talumnos` (`idAlumnos`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Filtros para la tabla `trecursos_humanos`
--
ALTER TABLE `trecursos_humanos`
  ADD CONSTRAINT `trecursos_humanos_ibfk_1` FOREIGN KEY (`nPuesto`) REFERENCES `tpuestos` (`idPuesto`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `trecursos_humanos_ibfk_2` FOREIGN KEY (`nNivelEsctudios`) REFERENCES `tnivel_estudios` (`idNivelEstudios`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `trecursos_humanos_ibfk_3` FOREIGN KEY (`nEspecialidad`) REFERENCES `tespecialidad` (`idEspecialidad`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Filtros para la tabla `trecursos_hum_ciclo`
--
ALTER TABLE `trecursos_hum_ciclo`
  ADD CONSTRAINT `trecursos_hum_ciclo_ibfk_1` FOREIGN KEY (`sRFCrhc`) REFERENCES `trecursos_humanos` (`sRFC`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `trecursos_hum_ciclo_ibfk_2` FOREIGN KEY (`nPuestoRhc`) REFERENCES `tpuestos` (`idPuesto`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `trecursos_hum_ciclo_ibfk_3` FOREIGN KEY (`sClaveEscuelaRhc`) REFERENCES `tescuelas` (`sClaveEscuela`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `trecursos_hum_ciclo_ibfk_4` FOREIGN KEY (`nEstado`) REFERENCES `testado` (`idEstado`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `trecursos_hum_ciclo_ibfk_5` FOREIGN KEY (`sCicloRhc`) REFERENCES `tciclos` (`idCiclo`) ON DELETE CASCADE ON UPDATE CASCADE;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
