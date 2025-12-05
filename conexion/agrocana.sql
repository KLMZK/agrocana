-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1:3306
-- Tiempo de generación: 05-12-2025 a las 01:41:20
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
  `ESTADO` varchar(50) NOT NULL,
  PRIMARY KEY (`CVE_ACTIVIDAD`),
  KEY `FK_REFERENCE_2` (`CVE_RESPONSABLE`),
  KEY `FK_REFERENCE_3` (`CVE_CULTIVO`)
) ENGINE=MyISAM AUTO_INCREMENT=7 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Volcado de datos para la tabla `actividades`
--

INSERT INTO `actividades` (`CVE_ACTIVIDAD`, `CVE_RESPONSABLE`, `CVE_CULTIVO`, `FECHA`, `OBSERVACIONES`, `TIPO`, `COSTO`, `ESTADO`) VALUES
(5, 11, 8, '2025-11-30', '', 'Riego', 40, 'Completada'),
(4, 11, 8, '2025-11-18', '', 'Riego', 300, 'Completada'),
(6, 11, 9, '2025-11-29', '', 'Poda', 89, 'Pendiente');

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
) ENGINE=MyISAM AUTO_INCREMENT=4 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Volcado de datos para la tabla `bodegas`
--

INSERT INTO `bodegas` (`CVE_BODEGA`, `CVE_COLONIA`, `NOMBRE`, `UBICACION`) VALUES
(3, 1241, 'Taller', 'Calle 4');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `colonias`
--

DROP TABLE IF EXISTS `colonias`;
CREATE TABLE IF NOT EXISTS `colonias` (
  `CVE_COLONIA` int NOT NULL AUTO_INCREMENT,
  `CVE_MUNICIPIO` int DEFAULT NULL,
  `NOMBRE` varchar(50) DEFAULT NULL,
  `CP` varchar(5) DEFAULT NULL,
  PRIMARY KEY (`CVE_COLONIA`),
  KEY `FK_REFERENCE_11` (`CVE_MUNICIPIO`)
) ENGINE=MyISAM AUTO_INCREMENT=1348 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Volcado de datos para la tabla `colonias`
--

INSERT INTO `colonias` (`CVE_COLONIA`, `CVE_MUNICIPIO`, `NOMBRE`, `CP`) VALUES
(675, 5, 'Portal del Agua', '86000'),
(676, 5, 'Villahermosa Centro', '86000'),
(677, 5, 'Diroga Premier', '86000'),
(678, 5, 'Medellin y Pigua 1ra. Sección', '86010'),
(679, 5, 'Fideicomiso Ciudad Industrial', '86010'),
(680, 5, 'Indeco Unidad', '86017'),
(681, 5, 'Residencial Real del Norte', '86017'),
(682, 5, 'San Carlos Real de Palmas', '86017'),
(683, 5, 'El Triangulo', '86017'),
(684, 5, 'La Pigua', '86017'),
(685, 5, 'Jardines Del Sol', '86017'),
(686, 5, 'Cosmos', '86017'),
(687, 5, 'Las Garzas', '86017'),
(688, 5, 'San Ángel', '86017'),
(689, 5, 'INFONAVIT', '86018'),
(690, 5, 'Roberto Madrazo Pintado Ciudad Industrial', '86019'),
(691, 5, 'Insurgentes', '86019'),
(692, 5, 'Villa de las Flores', '86019'),
(693, 5, 'Lagunas', '86019'),
(694, 5, 'Olmeca', '86019'),
(695, 5, 'Vicente Guerrero', '86019'),
(696, 5, 'Francisco Villa', '86019'),
(697, 5, 'Lagunas de San José', '86019'),
(698, 5, 'Privada de Lagunas del Maurel', '86019'),
(699, 5, 'El Recreo', '86020'),
(700, 5, 'Framboyanes', '86020'),
(701, 5, 'Universidad Autónoma de Tabasco', '86025'),
(702, 5, 'Privada Golondrinas', '86026'),
(703, 5, 'Villa de las Palmas', '86026'),
(704, 5, 'Valle Marino', '86026'),
(705, 5, 'Las Torres', '86026'),
(706, 5, 'Jardines de Villahermosa', '86027'),
(707, 5, 'José María Pino Suárez', '86029'),
(708, 5, 'Tierra Colorada', '86029'),
(709, 5, 'Kedros', '86029'),
(710, 5, 'Los Sauces', '86029'),
(711, 5, 'Kante', '86029'),
(712, 5, 'Bonanza', '86030'),
(713, 5, 'Heriberto Kehoe Vicent', '86030'),
(714, 5, 'Oropeza', '86030'),
(715, 5, 'Prados de Villahermosa', '86030'),
(716, 5, 'Residencial Los Ángeles', '86030'),
(717, 5, 'Residencial Flamingos', '86030'),
(718, 5, 'Nueva Imagen', '86030'),
(719, 5, 'Bosques de Villahermosa', '86030'),
(720, 5, 'Nances', '86030'),
(721, 5, 'Galaxia/tabasco 2000', '86035'),
(722, 5, 'Paseos Del Usumacinta', '86035'),
(723, 5, 'Galaxia', '86035'),
(724, 5, 'Villa de los Ríos', '86035'),
(725, 5, 'Real de Minas', '86035'),
(726, 5, 'Los Ríos', '86035'),
(727, 5, 'Multiochenta', '86035'),
(728, 5, 'Villas Del Campestre', '86035'),
(729, 5, 'Club de Lago', '86035'),
(730, 5, 'Real de Tabasco', '86035'),
(731, 5, 'La Gran Villa', '86035'),
(732, 5, 'Club Campestre', '86037'),
(733, 5, 'Parque Tabasco', '86037'),
(734, 5, 'La Choca', '86037'),
(735, 5, 'Carrizal', '86038'),
(736, 5, 'Las Giraldas', '86038'),
(737, 5, 'Adolfo López Mateos', '86040'),
(738, 5, 'Florida', '86040'),
(739, 5, 'Jesús García', '86040'),
(740, 5, 'Lago Ilusiones', '86040'),
(741, 5, 'Lidia Esther Mónica de Portilla', '86040'),
(742, 5, 'Magisterial', '86040'),
(743, 5, 'Villahermosa (Cap. P. A. Carlos Rovirosa)', '86049'),
(744, 5, 'José Narciso Rovirosa', '86050'),
(745, 5, 'Lindavista', '86050'),
(746, 5, 'Loma Bonita', '86050'),
(747, 5, 'Loma Linda', '86050'),
(748, 5, 'Militar', '86050'),
(749, 5, 'Residencial Paseo de las Palmas', '86050'),
(750, 5, 'Álvaro Obregón', '86050'),
(751, 5, 'Periodista', '86059'),
(752, 5, 'Casa Blanca 1a Sección', '86060'),
(753, 5, 'Brisas Del Grijalva', '86060'),
(754, 5, 'Fovissste Casa Blanca', '86060'),
(755, 5, 'Casa Blanca 2a Sección', '86060'),
(756, 5, 'Gaviotas Norte Sector Popular', '86067'),
(757, 5, 'Gaviotas Norte', '86068'),
(758, 5, 'La Manga II', '86068'),
(759, 5, 'La Manga III', '86068'),
(760, 5, 'Cedros', '86068'),
(761, 5, 'La Manga I', '86069'),
(762, 5, 'Nueva Villahermosa', '86070'),
(763, 5, 'Arboledas', '86079'),
(764, 5, 'Gil y Sáenz (El Águila)', '86080'),
(765, 5, 'Reforma', '86080'),
(766, 5, 'Secretaria de La Defensa Nacional', '86087'),
(767, 5, 'Guayabal', '86090'),
(768, 5, 'Gaviotas Sur Sección San José', '86090'),
(769, 5, 'Municipal', '86090'),
(770, 5, 'Gaviotas Norte Sector Explanada', '86090'),
(771, 5, 'Las Brisas', '86095'),
(772, 5, 'El Parque', '86096'),
(773, 5, 'Los Tulipanes', '86097'),
(774, 5, 'Mayito', '86098'),
(775, 5, 'Gaviotas Sur Sector Armenia', '86099'),
(776, 5, 'Triunfo La Manga 2', '86099'),
(777, 5, 'Triunfo La Manga 3', '86099'),
(778, 5, 'Gaviotas Sur (El Monal)', '86099'),
(779, 5, 'Triunfo la Manga I', '86099'),
(780, 5, 'Atasta de Serra', '86100'),
(781, 5, 'José Colomo', '86100'),
(782, 5, 'Residencial Bugambilias', '86100'),
(783, 5, 'Madeiras', '86100'),
(784, 5, 'Macuilis', '86100'),
(785, 5, 'Privada Alcatraces', '86100'),
(786, 5, 'Residencial Villas del Sol', '86100'),
(787, 5, 'Brisa del Usumacinta', '86100'),
(788, 5, 'Aurora', '86107'),
(789, 5, 'Tucanes las Quintas', '86107'),
(790, 5, 'Los Pinos', '86108'),
(791, 5, 'El Espejo 1', '86108'),
(792, 5, 'Residencial San Ángel', '86108'),
(793, 5, 'Virginia', '86108'),
(794, 5, 'Conjunto Habitacional Los Álamos', '86108'),
(795, 5, 'Villa de los Trabajadores', '86108'),
(796, 5, 'Carrizal', '86108'),
(797, 5, 'Real Usumacinta', '86108'),
(798, 5, 'El Espejo 2', '86109'),
(799, 5, 'La Joya', '86109'),
(800, 5, 'Villas Del Bosque', '86109'),
(801, 5, 'Guadalupe Borja', '86120'),
(802, 5, 'José Pagés Llergo', '86125'),
(803, 5, 'Nueva Invitab', '86126'),
(804, 5, 'La Isla', '86126'),
(805, 5, 'Carlos A Madrazo', '86126'),
(806, 5, 'Islas Del Mundo', '86126'),
(807, 5, 'Santa Elena', '86126'),
(808, 5, 'Benito Juárez', '86126'),
(809, 5, 'Villa las Torres', '86126'),
(810, 5, 'Manuel Andrade Díaz', '86126'),
(811, 5, 'Estrellas de Buenavista', '86127'),
(812, 5, 'Residencial del Río', '86127'),
(813, 5, 'San Miguel', '86127'),
(814, 5, 'Los Sauces Residencial', '86127'),
(815, 5, 'Terranova', '86127'),
(816, 5, 'Miguel Hidalgo 2da. Sección (La Guaira)', '86127'),
(817, 5, 'Río Viejo 1a Sección', '86127'),
(818, 5, 'Río Viejo 2da. Sección', '86127'),
(819, 5, 'Río Viejo 3ra. Sección', '86127'),
(820, 5, 'Miguel Hidalgo', '86127'),
(821, 5, 'Olimpo', '86127'),
(822, 5, 'Residencial Río Viejo', '86127'),
(823, 5, 'Privada La Mandarina', '86127'),
(824, 5, 'La Ceiba', '86127'),
(825, 5, 'Chichicaste', '86127'),
(826, 5, 'Real del Valle', '86127'),
(827, 5, 'Jardines de Buenavista', '86127'),
(828, 5, 'Bonampak', '86127'),
(829, 5, 'Los Gansos', '86127'),
(830, 5, 'Cotip', '86129'),
(831, 5, 'Artesanos INFONAVIT', '86130'),
(832, 5, 'Villa de los Arcos', '86130'),
(833, 5, 'Palmitas', '86130'),
(834, 5, 'Vista Alegre', '86137'),
(835, 5, '18 de Marzo', '86140'),
(836, 5, 'Las Delicias', '86140'),
(837, 5, 'Conjunto Habitacional Revolución', '86140'),
(838, 5, 'Privanza del Campo', '86143'),
(839, 5, 'Santa Teresa', '86143'),
(840, 5, 'Carlos A Madrazo', '86143'),
(841, 5, 'Ixtacomitán 1ra. Sección', '86143'),
(842, 5, 'América', '86143'),
(843, 5, 'Palma Real', '86143'),
(844, 5, 'Ángeles Ixtacomitan', '86143'),
(845, 5, 'Los Mezquites', '86143'),
(846, 5, 'Ónix', '86144'),
(847, 5, 'Cumbres', '86144'),
(848, 5, 'Ixtacomitán 4ta. Sección', '86144'),
(849, 5, 'Ixtacomitán 2da. Sección', '86144'),
(850, 5, 'Las Huertas', '86144'),
(851, 5, 'Hacienda Esmeralda', '86144'),
(852, 5, 'Las Lomas', '86144'),
(853, 5, 'Nueva Pensiones', '86149'),
(854, 5, 'Punta Brava', '86150'),
(855, 5, 'Tamulte de las Barrancas', '86150'),
(856, 5, 'Jardines Del Sur I y II', '86150'),
(857, 5, 'Santa Karla II', '86150'),
(858, 5, 'Haciendas Residencial y Club Deportivo', '86153'),
(859, 5, 'Sabina', '86153'),
(860, 5, 'Popular Pedro C Colorado', '86153'),
(861, 5, 'Lomas Del Dorado', '86153'),
(862, 5, 'Real del Angel', '86153'),
(863, 5, 'Ixtacomitán 3ra. Sección', '86153'),
(864, 5, 'El Edén', '86153'),
(865, 5, 'Real de Sabina', '86153'),
(866, 5, 'Paso Real', '86153'),
(867, 5, 'Real de San Jorge', '86153'),
(868, 5, 'San Jorge III', '86153'),
(869, 5, 'Edén Premier', '86153'),
(870, 5, 'San José', '86153'),
(871, 5, 'Del Bosque', '86160'),
(872, 5, 'Sánchez Magallanes', '86160'),
(873, 5, 'Villa las Fuentes', '86167'),
(874, 5, 'Pino Suárez', '86168'),
(875, 5, 'Pensiones', '86169'),
(876, 5, 'Fovissste 2a Etapa', '86170'),
(877, 5, 'Loma Diamante', '86170'),
(878, 5, 'Centrópolis', '86170'),
(879, 5, 'Colonial Villahermosa', '86170'),
(880, 5, 'Villa Brisa', '86170'),
(881, 5, 'Militar', '86170'),
(882, 5, 'Real Del Sur', '86170'),
(883, 5, 'Plutarco Elías Calles (Cura Hueso)', '86170'),
(884, 5, 'Plaza Jardín', '86170'),
(885, 5, 'La Gloria', '86170'),
(886, 5, 'Blancas Mariposas', '86170'),
(887, 5, 'Residencial Los Robles', '86170'),
(888, 5, 'Loma Real', '86170'),
(889, 5, 'Plaza Villahermosa', '86179'),
(890, 5, 'Fovissste 1a Etapa', '86180'),
(891, 5, 'Guadalupe', '86180'),
(892, 5, 'La Ceiba', '86180'),
(893, 5, 'Orquidea', '86180'),
(894, 5, 'Deportiva Residencial', '86189'),
(895, 5, 'Residencial Esmeralda', '86190'),
(896, 5, 'Marcos Buendia', '86190'),
(897, 5, 'Primero de Mayo', '86190'),
(898, 5, 'El Amate', '86190'),
(899, 5, 'España', '86190'),
(900, 5, 'Palmeira', '86190'),
(901, 5, 'La Providencia (La Majahua)', '86193'),
(902, 5, 'Buena Vista 2da. Sección', '86250'),
(903, 5, 'Macultepec', '86250'),
(904, 5, 'Tamulté de las Sabanas', '86250'),
(905, 5, 'Tocoal', '86250'),
(906, 5, 'El Novillo', '86250'),
(907, 5, 'Conjunto Habitacional Tercer Milenio', '86250'),
(908, 5, 'Estancia', '86253'),
(909, 5, 'El Alambrado', '86253'),
(910, 5, 'Torno Largo Estancia (El Manguito)', '86253'),
(911, 5, 'Aniceto', '86253'),
(912, 5, 'La Loma', '86253'),
(913, 5, 'García', '86254'),
(914, 5, 'Miramar', '86254'),
(915, 5, 'Rovirosa', '86254'),
(916, 5, 'La Manga', '86254'),
(917, 5, 'La Ceiba', '86254'),
(918, 5, 'Buena Vista 1a Sección', '86254'),
(919, 5, 'Acachapan y Colmena 4ta. Sección', '86255'),
(920, 5, 'Acachapan y Colmena 5ta. Sección', '86255'),
(921, 5, 'Buena Vista 3ra. Sección (Boca de Escoba)', '86255'),
(922, 5, 'Aztlán 4ta. Sección (Corcho y Chilapilla)', '86256'),
(923, 5, 'La Arena', '86257'),
(924, 5, 'Aztlán 5ta. Sección (Palomillal)', '86257'),
(925, 5, 'El Espino', '86258'),
(926, 5, 'Torno Largo 1ra. Sección', '86260'),
(927, 5, 'Gaviotas Sur (El Cedral)', '86260'),
(928, 5, 'Gaviotas Sur (El Chiflón)', '86260'),
(929, 5, 'Torno Largo 2da. Sección', '86260'),
(930, 5, 'Torno Largo 3ra. Sección (Sabanilla)', '86260'),
(931, 5, 'Altozano', '86265'),
(932, 5, 'Coronel Traconis 2da. Sección (El Zapote)', '86265'),
(933, 5, 'Coronel Traconis (Guerrero 3ra. Sección)', '86265'),
(934, 5, 'Coronel Traconis (San Francisco 4ta. Sección)', '86265'),
(935, 5, 'Coronel Traconis (San Diego 5ta. Sección)', '86265'),
(936, 5, 'Miraflores 2da. Sección (Zapotillo)', '86265'),
(937, 5, 'Miraflores 1ra. Sección', '86265'),
(938, 5, 'Coronel Traconis 1ra. Sección (La Isla)', '86265'),
(939, 5, 'Ribera de las Raíces', '86266'),
(940, 5, 'El Censo', '86266'),
(941, 5, 'Tierra Amarilla 3ra. Sección', '86270'),
(942, 5, 'Rincón Azul', '86270'),
(943, 5, 'Jolochero 2da. Sección', '86270'),
(944, 5, 'Medellín y Madero 2da. Sección', '86270'),
(945, 5, 'Ocuiltzapotlán', '86270'),
(946, 5, 'Tierra Amarilla 1ra. Sección', '86270'),
(947, 5, 'Lomas del Encanto', '86270'),
(948, 5, 'Isset', '86270'),
(949, 5, 'Ocuitzapotlán Dos', '86270'),
(950, 5, 'Las Rosas', '86270'),
(951, 5, 'Lomas de Ocuiltzapotlan', '86270'),
(952, 5, 'Paso Real de La Victoria', '86270'),
(953, 5, 'Los Ángeles', '86270'),
(954, 5, 'Reforma', '86270'),
(955, 5, 'Villa Unión', '86270'),
(956, 5, 'La Ceiba', '86270'),
(957, 5, 'Carlos Pellicer Camara', '86270'),
(958, 5, 'Tierra Amarilla 2da. Sección', '86270'),
(959, 5, 'Jolochero (Boca de Culebra)', '86270'),
(960, 5, 'Francisco I. Madero 1ra. Sección', '86270'),
(961, 5, 'Medellín y Madero 3ra. Sección', '86270'),
(962, 5, 'Medellín y Madero 4ta. Sección', '86270'),
(963, 5, 'Colinas de Santo Domingo', '86270'),
(964, 5, 'Santa Isabel', '86270'),
(965, 5, 'Real de Diamante', '86270'),
(966, 5, 'Barrancas y Amate 3ra. Sección', '86273'),
(967, 5, 'Miraflores 3ra. Sección', '86273'),
(968, 5, 'El Corozal', '86273'),
(969, 5, 'Barrancas y Amate 2da. Sección', '86273'),
(970, 5, 'Miraflores 1ra. Sección (Arroyo Grande)', '86273'),
(971, 5, 'Miraflores 2da. Sección', '86273'),
(972, 5, 'Cocoyol (Socialista)', '86274'),
(973, 5, 'Sabanas Nuevas', '86274'),
(974, 5, 'Ismate y Chilapilla 1ra. Sección', '86274'),
(975, 5, 'Chiquiguao 1ra. Sección', '86274'),
(976, 5, 'Ismate y Chilapilla 2da. Sección', '86274'),
(977, 5, 'Ismate y Chilapilla 2da. Sección Jahuactillo', '86274'),
(978, 5, 'La Vuelta (La Jagua)', '86274'),
(979, 5, 'Chacté', '86274'),
(980, 5, 'Chiquiguao 2da. Sección (Chiquiguaíto)', '86274'),
(981, 5, 'Ismate y Chilapilla 1ra. Sección (San Antonio)', '86274'),
(982, 5, 'Las Matillas 4ta. Sección (San Antonio)', '86274'),
(983, 5, 'Las Matillas 4ta. Sección', '86274'),
(984, 5, 'El Bajío', '86275'),
(985, 5, 'Dos Montes', '86275'),
(986, 5, 'Barrancas y Guanal González', '86275'),
(987, 5, 'La Palma', '86275'),
(988, 5, 'La Cruz del Bajío', '86275'),
(989, 5, 'Barrancas y Guanal López Portillo', '86275'),
(990, 5, 'Barrancas y Guanal Tintillo', '86275'),
(991, 5, 'La Manga 2da. Sección (El Jobal)', '86275'),
(992, 5, 'Pajonal', '86275'),
(993, 5, 'San Felipe de Jesús', '86276'),
(994, 5, 'El Zapotal (La Llave)', '86276'),
(995, 5, 'Medellin y Pigua 3ra. Sección', '86276'),
(996, 5, 'Medellín y Pigua 2da. Sección', '86276'),
(997, 5, 'Constitución', '86276'),
(998, 5, 'El Zapotal', '86276'),
(999, 5, 'Lagartera 1ra. Sección', '86276'),
(1000, 5, 'Lagartera 2da. Sección', '86276'),
(1001, 5, 'Medellín y Pigua 4ta. Sección (El Aguacate)', '86276'),
(1002, 5, 'La Huerta Residencial', '86276'),
(1003, 5, 'Acachapan y Colmena 3ra. Sección', '86277'),
(1004, 5, 'Acachapan y Colmena 2da. Sección (La Arena)', '86277'),
(1005, 5, 'Jornaleros y Aparceros (Pajaritos)', '86277'),
(1006, 5, 'Aztlán 1ra. Sección (La Piedad)', '86277'),
(1007, 5, 'Acachapan y Colmena 2da. Sección (El Maluco)', '86277'),
(1008, 5, 'Aztlán 1ra. Sección', '86278'),
(1009, 5, 'Aztlán 1ra. Sección (Sector Majahual)', '86278'),
(1010, 5, 'Boca de Guanal', '86278'),
(1011, 5, 'Boca de Aztlán 2da. Sección', '86278'),
(1012, 5, 'Aztlán 3ra. Sección (Jahuacte)', '86278'),
(1013, 5, 'Aztlán 2da. Sección el Cuy', '86278'),
(1014, 5, 'La Libertad', '86280'),
(1015, 5, 'Buena Vista Río Nuevo 1ra. Sección', '86280'),
(1016, 5, 'Corregidora Ortiz 1ra. Sección', '86280'),
(1017, 5, 'Corregidora Ortiz 3ra. Sección (San Pedrito)', '86280'),
(1018, 5, 'Corregidora Ortiz 5ta. Sección', '86280'),
(1019, 5, 'González 1ra. Sección', '86280'),
(1020, 5, 'González 2da. Sección', '86280'),
(1021, 5, 'González 3ra. Sección', '86280'),
(1022, 5, 'Luis Gil Pérez', '86280'),
(1023, 5, 'Pablo L Sidar (Miramar)', '86280'),
(1024, 5, 'Plátano y Cacao 1ra. Sección', '86280'),
(1025, 5, 'Plátano y Cacao 2da. Sección (La Isla)', '86280'),
(1026, 5, 'Plátano y Cacao 3ra. Sección', '86280'),
(1027, 5, 'Jesús Antonio Sibilla Zurita', '86280'),
(1028, 5, 'Buena Vista Río Nuevo 4ta. Sección', '86280'),
(1029, 5, 'Corregidora Ortiz 4ta. Sección', '86280'),
(1030, 5, 'Plátano y Cacao 4ta. Sección', '86280'),
(1031, 5, 'Hacienda Buena Vista', '86280'),
(1032, 5, 'Joyas de Buena Vista', '86280'),
(1033, 5, 'Lomas de Bella Vista', '86280'),
(1034, 5, 'Alfa y Omega', '86281'),
(1035, 5, 'Acachapan y Colmena 1ra. Sección', '86281'),
(1036, 5, 'Guineo 2da. Sección', '86283'),
(1037, 5, 'Estancia Vieja 1ra. Sección', '86283'),
(1038, 5, 'Guineo 1ra. Sección', '86283'),
(1039, 5, 'Río Tinto 1ra. Sección', '86283'),
(1040, 5, 'Buena Vista Río Nuevo 2da. Sección', '86283'),
(1041, 5, 'Buena Vista Río Nuevo 3ra. Sección', '86283'),
(1042, 5, 'Estancia Vieja 2da. Sección', '86283'),
(1043, 5, 'González 4ta. Sección', '86283'),
(1044, 5, 'Pablo L. Sidar (La Aurora)', '86283'),
(1045, 5, 'Río Tinto 2da. Sección', '86283'),
(1046, 5, 'Río Tinto 3ra. Sección', '86283'),
(1047, 5, 'Campestre Paseo de la Sierra', '86284'),
(1048, 5, 'La Luna', '86284'),
(1049, 5, 'Los Ángeles de Parrilla', '86284'),
(1050, 5, 'Lomas de Esquipulas', '86284'),
(1051, 5, 'Campestre Parrilla', '86284'),
(1052, 5, 'Casas Para Todos', '86284'),
(1053, 5, 'Espinoza Galindo', '86284'),
(1054, 5, 'Fovissste Kilómetro 9', '86284'),
(1055, 5, 'Guapinol', '86284'),
(1056, 5, 'INFONAVIT Parrilla', '86284'),
(1057, 5, 'Parrilla', '86284'),
(1058, 5, 'Policía y Transito', '86284'),
(1059, 5, 'La Unión hace la Fuerza', '86284'),
(1060, 5, 'Parrilla 4ta. Sección (Los Acosta)', '86284'),
(1061, 5, 'Hacienda Del Sol', '86284'),
(1062, 5, 'Villa Floresta', '86284'),
(1063, 5, 'El Árbol', '86284'),
(1064, 5, 'Chilam Balam', '86284'),
(1065, 5, 'Jardines de Huapinol', '86284'),
(1066, 5, 'Santa Cecilia (los Músicos)', '86284'),
(1067, 5, 'Santa Fe', '86284'),
(1068, 5, 'Juchimán', '86284'),
(1069, 5, 'Popular Manuel Silva', '86284'),
(1070, 5, 'Zafiro', '86287'),
(1071, 5, 'Puerta Grande', '86287'),
(1072, 5, 'Puerta de Hierro', '86287'),
(1073, 5, 'Valle del Jaguar', '86287'),
(1074, 5, 'Emiliano Zapata', '86287'),
(1075, 5, 'Jardines del Country', '86287'),
(1076, 5, 'Puerta Madero', '86287'),
(1077, 5, 'Anacleto Canabal 3ra. Sección (Constitución)', '86287'),
(1078, 5, 'Dieciséis de Septiembre', '86287'),
(1079, 5, 'San Marcos', '86287'),
(1080, 5, 'Abrika Residencial', '86287'),
(1081, 5, 'Palmarena Residencial', '86287'),
(1082, 5, 'Sotavento', '86287'),
(1083, 5, 'Lázaro Cárdenas 1ra. Sección', '86287'),
(1084, 5, 'Corregidora Ortiz 2da. Sección', '86287'),
(1085, 5, 'Anacleto Canabal 1ra. Sección', '86287'),
(1086, 5, 'Flores del Trópico', '86287'),
(1087, 5, 'El Country', '86287'),
(1088, 5, 'Santa Catalina (San Marcos)', '86287'),
(1089, 5, 'Lázaro Cárdenas 2a Sección', '86287'),
(1090, 5, 'Anacleto Canabal 2da. Sección', '86287'),
(1091, 5, 'Anacleto Canabal 3ra. Sección', '86287'),
(1092, 5, 'Anacleto Canabal 4ta. Sección', '86287'),
(1093, 5, 'Lázaro Cárdenas 2da. Sección (21 de Marzo)', '86287'),
(1094, 5, 'Puerta Real', '86287'),
(1095, 5, 'Las Hadas', '86287'),
(1096, 5, 'Sol Campestre', '86287'),
(1097, 5, 'Puerta Azul', '86287'),
(1098, 5, 'Parque Logístico Industrial Tabasco', '86287'),
(1099, 5, 'Puerta Magna', '86287'),
(1100, 5, 'Hacienda Casa Blanca', '86287'),
(1101, 5, 'Clara Córdova Moran', '86288'),
(1102, 5, 'Lomas del Palmar', '86288'),
(1103, 5, 'El Rosario y el Quemado', '86288'),
(1104, 5, 'La Lima', '86288'),
(1105, 5, 'Estanzuela 1ra. Sección', '86288'),
(1106, 5, 'El Manzano', '86288'),
(1107, 5, 'Estanzuela 2da. Sección', '86288'),
(1108, 5, 'La Lima', '86288'),
(1109, 5, 'Playas del Rosario (Subteniente García)', '86288'),
(1110, 5, 'Parrilla II', '86288'),
(1111, 5, 'Las Mercedes', '86288'),
(1112, 5, 'El Almendro', '86288'),
(1113, 5, 'Villa los Claustros', '86288'),
(1114, 5, 'Revolución', '86288'),
(1115, 5, 'El Paraíso', '86288'),
(1116, 5, 'Parrilla 5ta. Sección (El Carmen)', '86288'),
(1117, 5, 'Topacio', '86288'),
(1118, 5, 'San Antonio', '86288'),
(1119, 5, 'Santa Rita', '86288'),
(1120, 5, 'La Venta', '86288'),
(1121, 5, 'El Encanto', '86288'),
(1122, 5, '27 de Octubre', '86288'),
(1123, 5, 'Gracias México', '86288'),
(1124, 5, 'San Manuel', '86288'),
(1125, 5, 'Monteceibas', '86288'),
(1126, 5, 'La Isla', '86289'),
(1127, 5, 'Pueblo Nuevo de las Raíces', '86289'),
(1128, 5, 'Agraria (La Isla)', '86289'),
(1129, 5, 'El Recreo', '86289'),
(1130, 5, 'Villa el Cielo', '86290'),
(1131, 5, 'Tumbulushal', '86290'),
(1132, 5, 'La Victoria', '86290'),
(1133, 5, 'La Huasteca 1ra. Sección', '86290'),
(1134, 5, 'La Huasteca 2da. Sección (Alvarado la Raya)', '86290'),
(1135, 5, 'Bicentenario', '86290'),
(1136, 5, 'Alvarado (Colima)', '86291'),
(1137, 5, 'Alvarado Guardacosta', '86291'),
(1138, 5, 'Alvarado Jimbal', '86292'),
(1139, 5, 'Alvarado Santa Irene 1ra. Sección', '86293'),
(1140, 5, 'Boquerón 2da. Sección (El Barquillo)', '86293'),
(1141, 5, 'Las Margaritas', '86293'),
(1142, 5, 'Boquerón 1ra. Sección (San Pedro)', '86294'),
(1143, 5, 'Boquerón 3ra. Sección (El Guanal)', '86294'),
(1144, 5, 'Boquerón 4ta. Sección (Laguna Nueva)', '86294'),
(1145, 5, 'Ixtacomitán 5ta. Sección', '86294'),
(1146, 5, 'Pablo L Sidar', '86294'),
(1147, 5, 'Parrilla 3ra. Sección (La Providencia)', '86294'),
(1148, 5, 'Plutarco Elías Calles (La Majahua)', '86294'),
(1149, 5, 'Bosques de Araba', '86294'),
(1150, 5, 'Boquerón 5ta. Sección (La Lagartera)', '86295'),
(1151, 5, 'Pablo L. Sidar (Guineo)', '86295'),
(1152, 5, 'Alvarado Santa Irene 2da. Sección (El Taizal)', '86297'),
(1153, 5, 'Hueso de Puerco', '86298'),
(1154, 3, 'San Rafael', '86460'),
(1155, 3, 'Pedro Sánchez Magallanes', '86460'),
(1156, 3, 'Cuauhtemoczín', '86460'),
(1157, 3, 'El Barí 1ra. Sección', '86460'),
(1158, 3, 'El Barí 2da. Sección', '86460'),
(1159, 3, 'Ojoshal', '86460'),
(1160, 3, 'Coronel Andrés Sánchez Magallanes', '86460'),
(1161, 3, 'Paylebot', '86460'),
(1162, 3, 'El Yucateco (Paylebot 2da. Sección)', '86460'),
(1163, 3, 'Tomás Brito Lara', '86460'),
(1164, 3, 'Ley Federal de la Reforma Agraria (San Ramón)', '86460'),
(1165, 3, 'El Campo', '86461'),
(1166, 3, 'Chicozapote 1ra. Sección', '86461'),
(1167, 3, 'Chicozapote 2da. Sección (El Retiro)', '86461'),
(1168, 3, 'Benito Juárez (Campo Magallanes)', '86461'),
(1169, 3, 'La Trinidad', '86461'),
(1170, 3, 'El Alacrán (Manatinero)', '86464'),
(1171, 3, 'Sinaloa 2da. Sección (Arjona)', '86464'),
(1172, 3, 'Sinaloa 1ra. Sección', '86464'),
(1173, 3, 'El Alacrán', '86464'),
(1174, 3, 'Ignacio Zaragoza', '86465'),
(1175, 3, 'Las Calzadas', '86465'),
(1176, 3, 'Las Limas', '86465'),
(1177, 3, 'Las Flores (La Palma)', '86465'),
(1178, 3, 'Campo Nuevo', '86465'),
(1179, 3, 'El Capricho', '86465'),
(1180, 3, 'Ignacio Gutiérrez Gómez (San Felipe)', '86465'),
(1181, 3, 'Buenavista 1ra. Sección', '86465'),
(1182, 3, 'El Porvenir', '86465'),
(1183, 3, 'El Bronce', '86465'),
(1184, 3, 'Poblado C-23 General Venustiano Carranza', '86466'),
(1185, 3, 'El Chocho (Boca del Río)', '86467'),
(1186, 3, 'Islas Encantadas 1ra. Sección (El Zapote)', '86467'),
(1187, 3, 'Santana 2da. Sección C', '86470'),
(1188, 3, 'Río Seco 2da. Sección A', '86470'),
(1189, 3, 'Santana 1ra. Sección A', '86470'),
(1190, 3, 'Santana 2da. Sección A', '86470'),
(1191, 3, 'Santana 2da. Sección B (La Palma)', '86470'),
(1192, 3, 'Santana 3ra. Sección A (El Filero)', '86470'),
(1193, 3, 'Julián Montejo Velázquez', '86471'),
(1194, 3, 'El Golpe 2da. Sección (Los Patos)', '86471'),
(1195, 3, 'Santana 3ra. Sección B', '86471'),
(1196, 3, 'El Golpe', '86471'),
(1197, 3, 'El Mingo', '86471'),
(1198, 3, 'Poza Redonda 1ra. Sección', '86471'),
(1199, 3, 'Poza Redonda 2da. Sección', '86471'),
(1200, 3, 'Santuario 3ra. Sección (Piedras Negras)', '86471'),
(1201, 3, 'Santuario 1ra. Sección', '86471'),
(1202, 3, 'Santuario 2da. Sección', '86471'),
(1203, 3, 'Poza Redonda 3ra. Sección', '86471'),
(1204, 3, 'Poblado C-09 Licenciado Francisco I. Madero', '86473'),
(1205, 3, 'Santana 4ta. Sección', '86473'),
(1206, 3, 'Tío Moncho', '86474'),
(1207, 3, 'Francisco Trujillo Gurría', '86474'),
(1208, 3, 'Las Coloradas 1ra. Sección', '86474'),
(1209, 3, 'Las Coloradas 2da. Sección B', '86474'),
(1210, 3, 'Las Coloradas 2da. Sección (Ampliación las Aldeas)', '86474'),
(1211, 3, 'Encrucijada 3ra. Sección (Las Calzadas)', '86475'),
(1212, 3, 'Azucenita 1ra. Sección B', '86475'),
(1213, 3, 'Poza Redonda 4ta. Sección (Rincón Brujo)', '86475'),
(1214, 3, 'Encrucijada 2da. Sección (Los García)', '86475'),
(1215, 3, 'Azucena 1ra. Sección', '86475'),
(1216, 3, 'Naranjeño 1ra. Sección (Colonia la Fe)', '86475'),
(1217, 3, 'Encrucijada 1ra. Sección Rincón Brujo', '86475'),
(1218, 3, 'Azucena 4ta. Sección (Torno Alegre)', '86475'),
(1219, 3, 'Encrucijada 5ta. Sección', '86475'),
(1220, 3, 'Encrucijada 4ta. Sección B (La Lucha)', '86475'),
(1221, 3, 'Azucena 5ta. Sección (El Apompal)', '86475'),
(1222, 3, 'Azucena 6ta. Sección', '86475'),
(1223, 3, 'Santuario 4ta. Sección', '86475'),
(1224, 3, 'Poblado C-10 General Lázaro Cárdenas del Río', '86476'),
(1225, 3, 'Azucena 7ma. Sección (El Lechugal)', '86477'),
(1226, 3, 'Azucena 2da. Sección', '86477'),
(1227, 3, 'Naranjeño 3ra. Sección', '86477'),
(1228, 3, 'Azucena 3ra. Sección (El Triunfo)', '86477'),
(1229, 3, 'El Jobo (Punta Brava)', '86478'),
(1230, 3, 'Congregación Reyes Heroles', '86478'),
(1231, 3, 'Poblado C-11 José María Morelos y Pavón', '86478'),
(1232, 3, 'Nueva Esperanza', '86478'),
(1233, 3, 'Naranjeño 2da. Sección A', '86478'),
(1234, 3, 'Poblado C-14 General Plutarco Elías Calles', '86478'),
(1235, 3, 'Poblado C-22 Licenciado José María Pino Suárez', '86480'),
(1236, 3, 'Poblado C-21 Licenciado Benito Juárez García', '86483'),
(1237, 3, 'Poblado C-15 Adolfo López Mateos', '86483'),
(1238, 3, 'Poblado C-16 General Emiliano Zapata', '86484'),
(1239, 3, 'Poblado C-20 Miguel Hidalgo y Costilla', '86484'),
(1240, 3, 'Ingenio Presidente Benito Juárez', '86485'),
(1241, 3, 'Poblado C-28 Coronel Gregorio Méndez Magaña', '86485'),
(1242, 3, 'Poblado C-27 Ingeniero Eduardo Chávez Ramírez', '86485'),
(1243, 3, 'Las Nuevas Esperanzas', '86486'),
(1244, 3, 'Las Esperanzas', '86486'),
(1245, 3, 'Juan Escutia', '86486'),
(1246, 3, 'Poblado C-33 20 de Noviembre', '86486'),
(1247, 3, 'Luis Donaldo Colosio Murrieta', '86490'),
(1248, 3, 'Celia González de Rovirosa', '86490'),
(1249, 3, 'El Carmen', '86490'),
(1250, 3, 'El Carrizal', '86490'),
(1251, 3, 'Río Seco 2da. Sección (Norte 10)', '86490'),
(1252, 3, 'Miguel Hidalgo 2da. Sección B (La Natividad)', '86490'),
(1253, 3, 'Río Seco 2da. Sección B', '86490'),
(1254, 3, 'Independencia', '86490'),
(1255, 3, 'Santa Rosalía (Miguel Hidalgo 2da. Sección)', '86490'),
(1256, 3, 'Río Seco 1ra. Sección', '86490'),
(1257, 3, 'Santa Rosalía', '86490'),
(1258, 3, 'Río Seco 2da. Sección C', '86490'),
(1259, 3, 'Miguel Hidalgo 1ra. Sección', '86490'),
(1260, 3, 'Zapotal 1ra. Sección', '86490'),
(1261, 3, 'Santa Maria de Guadalupe', '86490'),
(1262, 3, 'De los Santos', '86490'),
(1263, 3, 'Rubén Jaramillo Lazo', '86490'),
(1264, 3, 'Villa San Miguel', '86490'),
(1265, 3, 'Poblado C-17 Independencia', '86493'),
(1266, 3, 'Santana 5ta. Sección (El Espino)', '86493'),
(1267, 3, 'Zapotal 2da. Sección', '86493'),
(1268, 3, 'Poblado C-29 General Vicente Guerrero', '86493'),
(1269, 3, 'Zapotal 3ra. Sección', '86493'),
(1270, 3, 'Miguel Hidalgo Zapotal 2da. Sección', '86493'),
(1271, 3, 'Arroyo Hondo (San Rosendo)', '86495'),
(1272, 3, 'Santa Isidra', '86495'),
(1273, 3, 'Arroyo Hondo 2da. Sección Santa Teresa B', '86495'),
(1274, 3, 'Arroyo Hondo 1ra. Sección (Santa Teresa A)', '86495'),
(1275, 3, 'El Parnaso', '86495'),
(1276, 3, 'Cárdenas Centro', '86500'),
(1277, 3, 'El Gringo', '86500'),
(1278, 3, 'Alameda', '86520'),
(1279, 3, 'Melchor Ocampo 2a Secc', '86520'),
(1280, 3, 'Los Cañales', '86523'),
(1281, 3, 'Río Seco', '86524'),
(1282, 3, 'El Suspiro', '86527'),
(1283, 3, 'Santa Rita INFONAVIT', '86528'),
(1284, 3, 'Nuevo Progreso', '86529'),
(1285, 3, 'Carlos Pellicer Camara', '86530'),
(1286, 3, 'Bajío Loma Bonita INFONAVIT', '86530'),
(1287, 3, 'Sahop', '86530'),
(1288, 3, 'INFONAVIT Loma Bonita', '86530'),
(1289, 3, 'El Toloque', '86533'),
(1290, 3, 'Tabscoob', '86534'),
(1291, 3, 'Vereda', '86534'),
(1292, 3, 'Guadalupe', '86535'),
(1293, 3, 'San Antonio', '86540'),
(1294, 3, 'Puerto Rico', '86540'),
(1295, 3, 'Los Morales', '86540'),
(1296, 3, 'Calzada', '86540'),
(1297, 3, 'Calzada 1ra. Sección Norte A', '86543'),
(1298, 3, 'Carlos Alberto Wilson Gómez', '86544'),
(1299, 3, 'Cárdenas', '86544'),
(1300, 3, 'Melchor Ocampo', '86545'),
(1301, 3, 'Roger Falconi Vera', '86545'),
(1302, 3, 'Nueva Esperanza', '86545'),
(1303, 3, 'Agua Sol', '86545'),
(1304, 3, 'La Alianza', '86546'),
(1305, 3, 'Habanero 2da. Sección (El Castaño)', '86546'),
(1306, 3, 'Cárdenas 2da. Sección', '86546'),
(1307, 3, '5 de Mayo', '86547'),
(1308, 3, 'La Esperanza', '86547'),
(1309, 3, 'Calzada 2da. Sección', '86547'),
(1310, 3, 'Empleados Del Csat', '86550'),
(1311, 3, 'Sarh', '86550'),
(1312, 3, 'Ceiba', '86550'),
(1313, 3, '7 de Octubre', '86550'),
(1314, 3, 'Deportiva INFONAVIT', '86553'),
(1315, 3, 'Jacinto López', '86553'),
(1316, 3, 'Santa María Periférico', '86553'),
(1317, 3, 'Sección 10 de Azucareros', '86555'),
(1318, 3, 'Nueva Zelandia (El Ingenio)', '86555'),
(1319, 3, 'La Península', '86556'),
(1320, 3, 'Benito Juárez (La Playita)', '86556'),
(1321, 3, 'Paso y Playa', '86556'),
(1322, 3, 'Pueblo Nuevo', '86560'),
(1323, 3, 'El Palmar', '86564'),
(1324, 3, 'Los Reyes Loma Alta', '86570'),
(1325, 3, 'Santa Catalina', '86573'),
(1326, 3, 'Emiliano Zapata', '86573'),
(1327, 3, 'Santa Cruz', '86574'),
(1328, 3, 'Villa Esmeralda', '86574'),
(1329, 3, 'San Pedro de los Cedros', '86574'),
(1330, 3, 'El Encanto', '86576'),
(1331, 3, 'Arroyo Hondo Abejonal', '86577'),
(1332, 3, 'Habanero 1ra. Sección (Venustiano Carranza)', '86580'),
(1333, 3, 'Habanero 1ra. Sección', '86583'),
(1334, 3, 'General Francisco Villa', '86584'),
(1335, 3, 'El Bajío 2da. Sección', '86590'),
(1336, 3, 'S.A.R.H.', '86596'),
(1337, 3, 'Prados de Cárdenas', '86596'),
(1338, 3, 'Zolia E. Peña Falcón', '86597'),
(1339, 3, 'Paso y Playa Invitab', '86597'),
(1340, 3, 'Petrolera', '86597'),
(1341, 3, 'José Eduardo de Cárdenas', '86598'),
(1342, 3, 'Obrera', '86598'),
(1343, 3, 'El Bajío 1ra. Sección', '86598'),
(1344, 3, 'Sección 40', '86599'),
(1345, 3, 'Fovissste', '86599'),
(1346, 3, 'El Embudo Fovissste', '86599'),
(1347, 3, 'Jardines de Tabasco', '86599');

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
) ENGINE=MyISAM AUTO_INCREMENT=19 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Volcado de datos para la tabla `compradores`
--

INSERT INTO `compradores` (`CVE_COMPRADOR`, `NOMBRE`, `TELEFONO`, `CORREO`, `TIPO`, `NOTAS`) VALUES
(13, 'Pablo', '9932193891', 'pablo@gmail.com', 'Equipos', ''),
(17, 'Arantxa2', '9931928109', 'Arantxa@gmail.com', 'Cliente', ''),
(15, 'Keila', '9931802324', 'keila@gmail.com', 'Pesticidas', ''),
(18, 'Bengano', '9931802325', 'sdaij@gmail.com', 'Cliente', '');

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
) ENGINE=MyISAM AUTO_INCREMENT=12 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Volcado de datos para la tabla `cultivos`
--

INSERT INTO `cultivos` (`CVE_CULTIVO`, `CVE_TERRENO`, `FECHASIEMBRA`, `FECHACOSECHA`, `ESTADO`, `OBSERVACIONES`) VALUES
(9, 9, '2025-11-14', '2027-02-14', 'Listo para cosecha', ''),
(10, 10, '2025-11-08', '2027-02-08', 'Listo para cosecha', '');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `encarga`
--

DROP TABLE IF EXISTS `encarga`;
CREATE TABLE IF NOT EXISTS `encarga` (
  `CVE_PEDIDO` int DEFAULT NULL,
  `CVE_ITEM` int DEFAULT NULL,
  `CANTIDAD` float DEFAULT NULL,
  KEY `FK_REFERENCE_16` (`CVE_PEDIDO`),
  KEY `FK_REFERENCE_17` (`CVE_ITEM`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Volcado de datos para la tabla `encarga`
--

INSERT INTO `encarga` (`CVE_PEDIDO`, `CVE_ITEM`, `CANTIDAD`) VALUES
(8, 8, 90),
(12, 8, 60),
(11, 8, 50),
(13, 8, 20);

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
  `ENTREGADO` tinyint(1) NOT NULL,
  PRIMARY KEY (`CVE_ENVIO`),
  KEY `FK_REFERENCE_18` (`PLACA`),
  KEY `FK_REFERENCE_19` (`CVE_CONDUCTOR`),
  KEY `FK_REFERENCE_21` (`COLONIAORIGEN`),
  KEY `FK_REFERENCE_22` (`COLONIADESTINO`),
  KEY `FK_REFERENCE_26` (`CVE_PEDIDO`)
) ENGINE=MyISAM AUTO_INCREMENT=9 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Volcado de datos para la tabla `envios`
--

INSERT INTO `envios` (`CVE_ENVIO`, `PLACA`, `CVE_CONDUCTOR`, `COLONIAORIGEN`, `COLONIADESTINO`, `CVE_PEDIDO`, `ORIGEN`, `DESTINO`, `FECHASALIDA`, `FECHALLEGADA`, `OBSERVACIONES`, `COSTO`, `ENTREGADO`) VALUES
(8, 'DSED0239', 12, 1241, 807, 11, 'AgroCaña Lara', 'calle 7', '2025-12-04 08:02:00', '2025-12-04 08:02:00', '', 40, 1),
(5, 'DSED0239', 12, 1240, 1271, 12, 'AgroCaña Lara', 'calle 7', '2025-11-28 07:58:00', '2025-12-04 19:41:00', '', 20, 1),
(7, 'DSED0239', 12, 1240, 1241, 11, 'AgroCaña Lara', 'Benito Juarez', '2026-01-01 22:10:00', '2025-12-04 08:37:47', '', 35, 1);

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
  PRIMARY KEY (`CVE_ITEM`),
  KEY `FK_REFERENCE_12` (`CVE_COMPRADOR`)
) ENGINE=MyISAM AUTO_INCREMENT=9 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Volcado de datos para la tabla `items`
--

INSERT INTO `items` (`CVE_ITEM`, `CVE_COMPRADOR`, `NOMBRE`, `CATEGORIA`, `CANTIDAD`, `UNIDAD`, `ESTADO`, `PRECIOU`) VALUES
(8, 13, 'Caña', 'Vendibles', 20, 'Kg', 'Disponible', 20),
(7, 13, 'Fertilizante', 'Fertilizantes', 13, 'Kg', 'Disponible', 40);

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
) ENGINE=MyISAM AUTO_INCREMENT=4 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Volcado de datos para la tabla `mantenimientos`
--

INSERT INTO `mantenimientos` (`CVE_MANTENIMIENTO`, `CVE_USUARIO`, `PLACA`, `FECHA`, `COSTO`, `OBSERVACIONES`) VALUES
(2, 13, 'DSED0239', '2025-11-06', 89, 'TODO ESTA MAL'),
(3, 13, 'DDDDDDDD', '2025-12-25', 20, '');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `marcas`
--

DROP TABLE IF EXISTS `marcas`;
CREATE TABLE IF NOT EXISTS `marcas` (
  `CVE_MARCA` int NOT NULL AUTO_INCREMENT,
  `NOMBRE` varchar(30) DEFAULT NULL,
  PRIMARY KEY (`CVE_MARCA`)
) ENGINE=MyISAM AUTO_INCREMENT=31 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Volcado de datos para la tabla `marcas`
--

INSERT INTO `marcas` (`CVE_MARCA`, `NOMBRE`) VALUES
(2, 'Toyota'),
(3, 'Honda'),
(4, 'Nissan'),
(5, 'Mazda'),
(6, 'Mitsubishi'),
(7, 'Subaru'),
(8, 'Ford'),
(9, 'Chevrolet'),
(10, 'Dodge'),
(11, 'Jeep'),
(12, 'RAM'),
(13, 'Volkswagen'),
(14, 'BMW'),
(15, 'Mercedes-Benz'),
(16, 'Audi'),
(17, 'Kia'),
(18, 'Hyundai'),
(19, 'Renault'),
(20, 'Peugeot'),
(21, 'Fiat'),
(22, 'Volvo'),
(23, 'Land Rover'),
(24, 'Jaguar'),
(25, 'Porsche'),
(26, 'Ferrari'),
(27, 'Lamborghini'),
(28, 'Bentley'),
(29, 'Aston Martin'),
(30, 'Tesla');

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
) ENGINE=MyISAM AUTO_INCREMENT=11 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Volcado de datos para la tabla `modelos`
--

INSERT INTO `modelos` (`CVE_MODELO`, `CVE_MARCA`, `NOMBRE`) VALUES
(10, 18, '2006'),
(9, 15, '2005'),
(8, 14, 'F-34P Ultra'),
(7, 4, '2008');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `municipios`
--

DROP TABLE IF EXISTS `municipios`;
CREATE TABLE IF NOT EXISTS `municipios` (
  `CVE_MUNICIPIO` int NOT NULL AUTO_INCREMENT,
  `NOMBRE` varchar(50) DEFAULT NULL,
  PRIMARY KEY (`CVE_MUNICIPIO`)
) ENGINE=MyISAM AUTO_INCREMENT=19 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Volcado de datos para la tabla `municipios`
--

INSERT INTO `municipios` (`CVE_MUNICIPIO`, `NOMBRE`) VALUES
(2, 'Balancán'),
(3, 'Cárdenas'),
(4, 'Centla'),
(5, 'Centro'),
(6, 'Comalcalco'),
(7, 'Cunduacán'),
(8, 'Emiliano Zapata'),
(9, 'Huimanguillo'),
(10, 'Jalapa'),
(11, 'Jalpa de Méndez'),
(12, 'Jonuta'),
(13, 'Macuspana'),
(14, 'Nacajuca'),
(15, 'Paraíso'),
(16, 'Tacotalpa'),
(17, 'Teapa'),
(18, 'Tenosique');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `pedidos`
--

DROP TABLE IF EXISTS `pedidos`;
CREATE TABLE IF NOT EXISTS `pedidos` (
  `CVE_PEDIDO` int NOT NULL AUTO_INCREMENT,
  `CVE_COMPRADOR` int DEFAULT NULL,
  `INGRESO` tinyint(1) DEFAULT NULL,
  `FECHAPEDIDO` date DEFAULT NULL,
  PRIMARY KEY (`CVE_PEDIDO`),
  KEY `FK_REFERENCE_13` (`CVE_COMPRADOR`)
) ENGINE=MyISAM AUTO_INCREMENT=14 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Volcado de datos para la tabla `pedidos`
--

INSERT INTO `pedidos` (`CVE_PEDIDO`, `CVE_COMPRADOR`, `INGRESO`, `FECHAPEDIDO`) VALUES
(12, 17, 1, '2025-12-02'),
(11, 13, 0, '2025-11-27'),
(13, 17, 1, '2025-12-04');

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
) ENGINE=MyISAM AUTO_INCREMENT=11 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Volcado de datos para la tabla `terrenos`
--

INSERT INTO `terrenos` (`CVE_TERRENO`, `NOMBRE`, `HECTAREAS`) VALUES
(10, 'A-7', 78),
(9, 'A-2', 95),
(8, 'A-1', 4);

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

--
-- Volcado de datos para la tabla `tiene`
--

INSERT INTO `tiene` (`CVE_BODEGA`, `CVE_ITEM`) VALUES
(3, 6),
(3, 7),
(3, 8);

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
) ENGINE=MyISAM AUTO_INCREMENT=16 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Volcado de datos para la tabla `usuarios`
--

INSERT INTO `usuarios` (`CVE_USUARIO`, `NOMBRE`, `APELLIDO_P`, `APELLIDO_M`, `TIPO`, `NUMEROTELEFONICO`, `USER`, `PASSWORD`, `ROL`, `ACTIVO`) VALUES
(13, 'Pamela', 'Lara', 'Hernandez', 'Mecanico', '9931802325', 'PamLa', '123', 'Temporal', 1),
(10, 'Daniel', 'Lara', 'Mendez', 'Admin', '9283019820', 'Danlm', '123', 'Permanente', 1),
(11, 'Monserrat', 'Aquino', 'Mena', 'Supervisor', '9921381983', 'MP', '123', 'Permanente', 1),
(12, 'Juan', 'Mendez', 'Perez', 'Conductor', '0981092380', 'Jnd2', '231', 'Temporal', 1),
(14, 'Gerardo', 'Hernandez', 'Gomez', 'Supervisor', '9931802326', 'GerarHer', '123', 'Permanente', 1);

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

--
-- Volcado de datos para la tabla `utiliza`
--

INSERT INTO `utiliza` (`CVE_ACTIVIDAD`, `CVE_ITEM`, `CANTIDAD`) VALUES
(4, 6, 20),
(6, 7, 67);

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
  `ESTADO` varchar(50) NOT NULL,
  PRIMARY KEY (`PLACA`),
  KEY `FK_REFERENCE_5` (`CVE_MODELO`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Volcado de datos para la tabla `vehiculos`
--

INSERT INTO `vehiculos` (`PLACA`, `CVE_MODELO`, `TIPO`, `OBSERVACIONES`, `FECHA`, `ESTADO`) VALUES
('DSED0239', 7, 'Tractor', '', '2025-11-10', 'Desocupado'),
('DDDDDDDD', 8, 'Tractor', '', '2025-11-29', 'Desocupado'),
('HFY27899', 10, 'Camioneta', 'holi', '2025-11-14', 'Desocupado');
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
