-- phpMyAdmin SQL Dump
-- version 4.5.1
-- http://www.phpmyadmin.net
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 12-03-2017 a las 23:10:01
-- Versión del servidor: 10.1.16-MariaDB
-- Versión de PHP: 5.6.24

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `practicoajax`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `contactos`
--

CREATE TABLE `contactos` (
  `IdContacto` int(11) NOT NULL,
  `Nombre` varchar(200) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `Empresa` varchar(200) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `Telefono` varchar(20) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `Mail` varchar(50) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `Comentario` text CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `estados`
--

CREATE TABLE `estados` (
  `id` int(5) UNSIGNED NOT NULL,
  `descripcion` varchar(100) NOT NULL,
  `idPais` int(3) UNSIGNED NOT NULL DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `estados`
--

INSERT INTO `estados` (`id`, `descripcion`, `idPais`) VALUES
(1, 'Buenos Aires', 1),
(2, 'Capital Federal', 1),
(3, 'Catamarca', 1),
(4, 'Chaco', 1),
(5, 'Chubut', 1),
(6, 'Cordoba', 1),
(7, 'Corrientes', 1),
(8, 'Entre Rios', 1),
(9, 'Formosa', 1),
(10, 'Jujuy', 1),
(11, 'La Pampa', 1),
(12, 'La Rioja', 1),
(13, 'Mendoza', 1),
(14, 'Misiones', 1),
(15, 'Neuquen', 1),
(16, 'Rio Negro', 1),
(17, 'Salta', 1),
(18, 'San Juan', 1),
(19, 'San Luis', 1),
(20, 'Santa Cruz', 1),
(21, 'Santa Fe', 1),
(22, 'Santiago del Estero', 1),
(23, 'Tierra del Fuego', 1),
(24, 'Tucuman', 1),
(25, 'Chuquisaca', 2),
(26, 'Cochabamba', 2),
(27, 'Beni', 2),
(28, 'La Paz', 2),
(29, 'Oruro', 2),
(30, 'Pando', 2),
(31, 'Potosi', 2),
(32, 'Santa Cruz', 2),
(33, 'Tarija', 2),
(34, 'Acre', 3),
(35, 'Alagoas', 3),
(36, 'Amapa', 3),
(37, 'Amazonas', 3),
(38, 'Bahia', 3),
(39, 'Ceara', 3),
(40, 'Distrito Federal', 3),
(41, 'Espirito Santo', 3),
(42, 'Goias', 3),
(43, 'Maranhao', 3),
(44, 'Mato Grosso', 3),
(45, 'Mato Grosso do Sul', 3),
(46, 'Minas Gerais', 3),
(47, 'Para', 3),
(48, 'Paraiba', 3),
(49, 'Parana', 3),
(50, 'Pernambuco', 3),
(51, 'Piaui', 3),
(52, 'Rio de Janeiro', 3),
(53, 'Rio Grande do Norte', 3),
(54, 'Rio Grande do Sul', 3),
(55, 'Rondonia', 3),
(56, 'Roraima', 3),
(57, 'Santa Catarina', 3),
(58, 'Sao Paulo', 3),
(59, 'Sergipe', 3),
(60, 'Tocantins', 3),
(61, 'Alberta', 4),
(62, 'British Columbia', 4),
(63, 'Manitoba', 4),
(64, 'New Brunswick', 4),
(65, 'Newfoundland and Labrador', 4),
(66, 'Northwest Territories', 4),
(67, 'Nova Scotia', 4),
(68, 'Nunavut', 4),
(69, 'Ontario', 4),
(70, 'Prince Edward Island', 4),
(71, 'Quebec', 4),
(72, 'Saskatchewan', 4),
(73, 'Yukon Territory', 4),
(74, 'Antofagasta', 5),
(75, 'Araucania', 5),
(76, 'Atacama', 5),
(77, 'Bio-Bio', 5),
(78, 'Coquimbo', 5),
(79, 'Libertador General B.', 5),
(80, 'Los Lagos', 5),
(81, 'Magallanes', 5),
(82, 'Maule', 5),
(83, 'Santiago', 5),
(84, 'Tarapaca', 5),
(85, 'Valparaiso', 5),
(86, 'Amazonas', 6),
(87, 'Antioquia', 6),
(88, 'Arauca', 6),
(89, 'Atlantico', 6),
(90, 'Distrito Capital de Bogota', 6),
(91, 'Bolivar', 6),
(92, 'Boyaca', 6),
(93, 'Caldas', 6),
(94, 'Caqueta', 6),
(95, 'Casanare', 6),
(96, 'Cauca', 6),
(97, 'Cesar', 6),
(98, 'Choco', 6),
(99, 'Cordoba', 6),
(100, 'Cundinamarca', 6),
(101, 'Guainia', 6),
(102, 'Guaviare', 6),
(103, 'Huila', 6),
(104, 'La Guajira', 6),
(105, 'Magdalena', 6),
(106, 'Meta', 6),
(107, 'Narino', 6),
(108, 'Norte de Santander', 6),
(109, 'Putumayo', 6),
(110, 'Quindio', 6),
(111, 'Risaralda', 6),
(112, 'San Andres y Providencia', 6),
(113, 'Santander', 6),
(114, 'Sucre', 6),
(115, 'Tolima', 6),
(116, 'Valle del Cauca', 6),
(117, 'Vaupes', 6),
(118, 'Vichada', 6),
(119, 'Alibori', 7),
(120, 'Atakora', 7),
(121, 'Atlantique', 7),
(122, 'Borgou', 7),
(123, 'Collines', 7),
(124, 'Kouffo', 7),
(125, 'Donga', 7),
(126, 'Littoral', 7),
(127, 'Mono', 7),
(128, 'Oueme', 7),
(129, 'Plateau', 7),
(130, 'Zou', 7),
(131, 'Camaguey', 8),
(132, 'Ciego de Avila', 8),
(133, 'Cienfuegos', 8),
(134, 'Ciudad de La Habana', 8),
(135, 'Granma', 8),
(136, 'Guantanamo', 8),
(137, 'Holguin', 8),
(138, 'Isla de la Juventud', 8),
(139, 'La Habana', 8),
(140, 'Las Tunas', 8),
(141, 'Matanzas', 8),
(142, 'Pinar del Rio', 8),
(143, 'Sancti Spiritus', 8),
(144, 'Santiago de Cuba', 8),
(145, 'Villa Clara', 8),
(146, 'Azuay', 9),
(147, 'Bolivar', 9),
(148, 'Canar', 9),
(149, 'Carchi', 9),
(150, 'Chimborazo', 9),
(151, 'Cotopaxi', 9),
(152, 'El Oro', 9),
(153, 'Esmeraldas', 9),
(154, 'Galapagos', 9),
(155, 'Guayas', 9),
(156, 'Imbabura', 9),
(157, 'Loja', 9),
(158, 'Los Rios', 9),
(159, 'Manabi', 9),
(160, 'Morona-Santiago', 9),
(161, 'Napo', 9),
(162, 'Orellana', 9),
(163, 'Pastaza', 9),
(164, 'Pichincha', 9),
(165, 'Sucumbios', 9),
(166, 'Tungurahua', 9),
(167, 'Zamora-Chinchipe', 9),
(168, 'Ahuachapan', 10),
(169, 'Cabanas', 10),
(170, 'Chalatenango', 10),
(171, 'Cuscatlan', 10),
(172, 'La Libertad', 10),
(173, 'La Paz', 10),
(174, 'La Union', 10),
(175, 'Morazan', 10),
(176, 'San Miguel', 10),
(177, 'San Salvador', 10),
(178, 'Santa Ana', 10),
(179, 'San Vicente', 10),
(180, 'Sonsonate', 10),
(181, 'Usulutan', 10),
(182, 'Andalucia', 11),
(183, 'Aragon', 11),
(184, 'Asturias', 11),
(185, 'Baleares', 11),
(186, 'Ceuta', 11),
(187, 'Canarias', 11),
(188, 'Cantabria', 11),
(189, 'Castilla-La Mancha', 11),
(190, 'Castilla y Leon', 11),
(191, 'Cataluña', 11),
(192, 'Comunidad Valenciana', 11),
(193, 'Extremadura', 11),
(194, 'Galicia', 11),
(195, 'La Rioja', 11),
(196, 'Madrid', 11),
(197, 'Melilla', 11),
(198, 'Murcia', 11),
(199, 'Navarra', 11),
(200, 'Pais Vasco', 11),
(201, 'Alabama', 12),
(202, 'Alaska', 12),
(203, 'Arizona', 12),
(204, 'Arkansas', 12),
(205, 'California', 12),
(206, 'Colorado', 12),
(207, 'Connecticut', 12),
(208, 'Delaware', 12),
(209, 'District of Columbia', 12),
(210, 'Florida', 12),
(211, 'Georgia', 12),
(212, 'Hawaii', 12),
(213, 'Idaho', 12),
(214, 'Illinois', 12),
(215, 'Indiana', 12),
(216, 'Iowa', 12),
(217, 'Kansas', 12),
(218, 'Kentucky', 12),
(219, 'Louisiana', 12),
(220, 'Maine', 12),
(221, 'Maryland', 12),
(222, 'Massachusetts', 12),
(223, 'Michigan', 12),
(224, 'Minnesota', 12),
(225, 'Mississippi', 12),
(226, 'Missouri', 12),
(227, 'Montana', 12),
(228, 'Nebraska', 12),
(229, 'Nevada', 12),
(230, 'New Hampshire', 12),
(231, 'New Jersey', 12),
(232, 'New Mexico', 12),
(233, 'New York', 12),
(234, 'North Carolina', 12),
(235, 'North Dakota', 12),
(236, 'Ohio', 12),
(237, 'Oklahoma', 12),
(238, 'Oregon', 12),
(239, 'Pennsylvania', 12),
(240, 'Rhode Island', 12),
(241, 'South Carolina', 12),
(242, 'South Dakota', 12),
(243, 'Tennessee', 12),
(244, 'Texas', 12),
(245, 'Utah', 12),
(246, 'Vermont', 12),
(247, 'Virginia', 12),
(248, 'Washington', 12),
(249, 'West Virginia', 12),
(250, 'Wisconsin', 12),
(251, 'Wyoming', 12),
(252, 'Alta Verapaz', 13),
(253, 'Baja Verapaz', 13),
(254, 'Chimaltenango', 13),
(255, 'Chiquimula', 13),
(256, 'El Progreso', 13),
(257, 'Escuintla', 13),
(258, 'Guatemala', 13),
(259, 'Huehuetenango', 13),
(260, 'Izabal, Jalapa', 13),
(261, 'Jutiapa', 13),
(262, 'Peten', 13),
(263, 'Quetzaltenango', 13),
(264, 'Quiche', 13),
(265, 'Retalhuleu', 13),
(266, 'Sacatepequez', 13),
(267, 'San Marcos', 13),
(268, 'Santa Rosa', 13),
(269, 'Solola', 13),
(270, 'Suchitepequez', 13),
(271, 'Totonicapan', 13),
(272, 'Zacapa', 13),
(273, 'Atlantida', 14),
(274, 'Choluteca', 14),
(275, 'Colon', 14),
(276, 'Comayagua', 14),
(277, 'Copan', 14),
(278, 'Cortes', 14),
(279, 'El Paraiso', 14),
(280, 'Francisco Morazan', 14),
(281, 'Gracias a Dios', 14),
(282, 'Intibuca', 14),
(283, 'Islas de la Bahia', 14),
(284, 'La Paz', 14),
(285, 'Lempira', 14),
(286, 'Ocotepeque', 14),
(287, 'Olancho', 14),
(288, 'Santa Barbara', 14),
(289, 'Valle', 14),
(290, 'Yoro', 14),
(291, 'Aguascalientes', 15),
(292, 'Baja California', 15),
(293, 'Baja California Sur', 15),
(294, 'Campeche', 15),
(295, 'Chiapas', 15),
(296, 'Chihuahua', 15),
(297, 'Coahuila de Zaragoza', 15),
(298, 'Colima', 15),
(299, 'Distrito Federal', 15),
(300, 'Durango', 15),
(301, 'Guanajuato', 15),
(302, 'Guerrero', 15),
(303, 'Hidalgo', 15),
(304, 'Jalisco', 15),
(305, 'Mexico', 15),
(306, 'Michoacan de Ocampo', 15),
(307, 'Morelos', 15),
(308, 'Nayarit', 15),
(309, 'Nuevo Leon', 15),
(310, 'Oaxaca', 15),
(311, 'Puebla', 15),
(312, 'Queretaro de Arteaga', 15),
(313, 'Quintana Roo', 15),
(314, 'San Luis Potosi', 15),
(315, 'Sinaloa', 15),
(316, 'Sonora', 15),
(317, 'Tabasco', 15),
(318, 'Tamaulipas', 15),
(319, 'Tlaxcala', 15),
(320, 'Veracruz-Llave', 15),
(321, 'Yucatan', 15),
(322, 'Zacatecas', 15),
(323, 'Atlantico Norte', 16),
(324, 'Atlantico Sur', 16),
(325, 'Boaco', 16),
(326, 'Carazo', 16),
(327, 'Chinandega', 16),
(328, 'Chontales', 16),
(329, 'Esteli', 16),
(330, 'Granada', 16),
(331, 'Jinotega', 16),
(332, 'Leon', 16),
(333, 'Madriz', 16),
(334, 'Managua', 16),
(335, 'Masaya', 16),
(336, 'Matagalpa', 16),
(337, 'Nueva Segovia', 16),
(338, 'Rio San Juan', 16),
(339, 'Rivas', 16),
(340, 'Bocas del Toro', 17),
(341, 'Chiriqui', 17),
(342, 'Cocle', 17),
(343, 'Colon', 17),
(344, 'Darien', 17),
(345, 'Herrera', 17),
(346, 'Los Santos', 17),
(347, 'Panama', 17),
(348, 'San Blas', 17),
(349, 'Kuna Yala', 17),
(350, 'Veraguas', 17),
(351, 'Alto Paraguay', 18),
(352, 'Alto Parana', 18),
(353, 'Amambay', 18),
(354, 'Asuncion', 18),
(355, 'Boqueron', 18),
(356, 'Caaguazu', 18),
(357, 'Caazapa', 18),
(358, 'Canindeyu', 18),
(359, 'Central', 18),
(360, 'Concepcion', 18),
(361, 'Cordillera', 18),
(362, 'Guaira', 18),
(363, 'Itapua', 18),
(364, 'Misiones', 18),
(365, 'Neembucu', 18),
(366, 'Paraguari', 18),
(367, 'Presidente Hayes', 18),
(368, 'San Pedro', 18),
(369, 'Amazonas', 19),
(370, 'Ancash', 19),
(371, 'Apurimac', 19),
(372, 'Arequipa', 19),
(373, 'Ayacucho', 19),
(374, 'Cajamarca', 19),
(375, 'Callao', 19),
(376, 'Cusco', 19),
(377, 'Huancavelica', 19),
(378, 'Huanuco', 19),
(379, 'Ica', 19),
(380, 'Junin', 19),
(381, 'La Libertad', 19),
(382, 'Lambayeque', 19),
(383, 'Lima', 19),
(384, 'Madre de Dios', 19),
(385, 'Moquegua', 19),
(386, 'Pasco', 19),
(387, 'Piura', 19),
(388, 'Puno', 19),
(389, 'San Martin', 19),
(390, 'Tacna', 19),
(391, 'Tumbes', 19),
(392, 'Ucayali', 19),
(393, 'Adjuntas', 20),
(394, 'Aguada', 20),
(395, 'Aguadilla', 20),
(396, 'Aguas Buenas', 20),
(397, 'Aibonito', 20),
(398, 'Anasco', 20),
(399, 'Arecibo', 20),
(400, 'Arroyo', 20),
(401, 'Barceloneta', 20),
(402, 'Barranquitas', 20),
(403, 'Bayamon', 20),
(404, 'Cabo Rojo', 20),
(405, 'Caguas', 20),
(406, 'Camuy', 20),
(407, 'Canovanas', 20),
(408, 'Carolina', 20),
(409, 'Catano', 20),
(410, 'Cayey', 20),
(411, 'Ceiba', 20),
(412, 'Ciales', 20),
(413, 'Cidra', 20),
(414, 'Coamo', 20),
(415, 'Comerio', 20),
(416, 'Corozal', 20),
(417, 'Culebra', 20),
(418, 'Dorado', 20),
(419, 'Fajardo', 20),
(420, 'Florida', 20),
(421, 'Guanica', 20),
(422, 'Guayama', 20),
(423, 'Guayanilla', 20),
(424, 'Guaynabo', 20),
(425, 'Gurabo', 20),
(426, 'Hatillo', 20),
(427, 'Hormigueros', 20),
(428, 'Humacao', 20),
(429, 'Isabela', 20),
(430, 'Jayuya', 20),
(431, 'Juana Diaz', 20),
(432, 'Juncos', 20),
(433, 'Lajas', 20),
(434, 'Lares', 20),
(435, 'Las Marias', 20),
(436, 'Las Piedras', 20),
(437, 'Loiza', 20),
(438, 'Luquillo', 20),
(439, 'Manati', 20),
(440, 'Maricao', 20),
(441, 'Maunabo', 20),
(442, 'Mayaguez', 20),
(443, 'Moca', 20),
(444, 'Morovis', 20),
(445, 'Naguabo', 20),
(446, 'Naranjito', 20),
(447, 'Orocovis', 20),
(448, 'Patillas', 20),
(449, 'Penuelas', 20),
(450, 'Ponce', 20),
(451, 'Quebradillas', 20),
(452, 'Rincon', 20),
(453, 'Rio Grande', 20),
(454, 'Sabana Grande', 20),
(455, 'Salinas', 20),
(456, 'San German', 20),
(457, 'San Juan', 20),
(458, 'San Lorenzo', 20),
(459, 'San Sebastian', 20),
(460, 'Santa Isabel', 20),
(461, 'Toa Alta', 20),
(462, 'Toa Baja', 20),
(463, 'Trujillo Alto', 20),
(464, 'Utuado', 20),
(465, 'Vega Alta', 20),
(466, 'Vega Baja', 20),
(467, 'Vieques', 20),
(468, 'Villalba', 20),
(469, 'Yabucoa', 20),
(470, 'Yauco', 20),
(471, 'Artigas', 21),
(472, 'Canelones', 21),
(473, 'Cerro Largo', 21),
(474, 'Colonia', 21),
(475, 'Durazno', 21),
(476, 'Flores', 21),
(477, 'Florida', 21),
(478, 'Lavalleja', 21),
(479, 'Maldonado', 21),
(480, 'Montevideo', 21),
(481, 'Paysandu', 21),
(482, 'Rio Negro', 21),
(483, 'Rivera', 21),
(484, 'Rocha', 21),
(485, 'Salto', 21),
(486, 'San Jose', 21),
(487, 'Soriano', 21),
(488, 'Tacuarembo', 21),
(489, 'Treinta y Tres', 21);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `paises`
--

CREATE TABLE `paises` (
  `id` int(3) UNSIGNED NOT NULL DEFAULT '0',
  `descripcion` varchar(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `paises`
--

INSERT INTO `paises` (`id`, `descripcion`) VALUES
(0, 'Elige'),
(1, 'Argentina'),
(2, 'Bolivia'),
(3, 'Brasil'),
(4, 'Canada'),
(5, 'Chile'),
(6, 'Colombia'),
(7, 'Costa Rica'),
(8, 'Cuba'),
(9, 'Ecuador'),
(10, 'El Salvador'),
(11, 'España'),
(12, 'Estados Unidos'),
(13, 'Guatemala'),
(14, 'Honduras'),
(15, 'Mexico'),
(16, 'Nicaragua'),
(17, 'Panama'),
(18, 'Paraguay'),
(19, 'Peru'),
(20, 'Puerto Rico'),
(21, 'Uruguay');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tabs`
--

CREATE TABLE `tabs` (
  `idTab` int(10) UNSIGNED NOT NULL,
  `Contenido` text CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `tabs`
--

INSERT INTO `tabs` (`idTab`, `Contenido`) VALUES
(1, '<h3>AJAX</h3>\r\n<p>AJAX, acrónimo de Asynchronous JavaScript And XML (JavaScript asíncrono y XML), es una técnica de desarrollo web para crear aplicaciones interactivas o RIA (Rich Internet Applications). Estas aplicaciones se ejecutan en el cliente, es decir, en el navegador de los usuarios mientras se mantiene la comunicación asíncrona con el servidor en segundo plano. De esta forma es posible realizar cambios sobre las páginas sin necesidad de recargarlas, lo que significa aumentar la interactividad, velocidad y usabilidad en las aplicaciones.</p>'),
(2, '<h3>JAVASCRIPT</h3><p>JavaScript es un lenguaje de programación interpretado, es decir, que no requiere compilación, utilizado principalmente en páginas web, con una sintaxis semejante a la del lenguaje Java y el lenguaje C.\r\n<br />\r\nAl igual que Java, JavaScript es un lenguaje orientado a objetos propiamente dicho, ya que dispone de Herencia, si bien esta se realiza siguiendo el paradigma de programación basada en prototipos, ya que las nuevas clases se generan clonando las clases base (prototipos) y extendiendo su funcionalidad.</p>'),
(3, '<h3>PHP</h3>\r\n<p>PHP es un lenguaje de programación interpretado, diseñado originalmente para la creación de páginas web dinámicas.<br />PHP es un acrónimo recursivo que significa PHP Hypertext Pre-processor (inicialmente PHP Tools, o, Personal Home Page Tools). Fue creado originalmente por Rasmus Lerdorf en 1994; sin embargo la implementación principal de PHP es producida ahora por The PHP Group y sirve como el estándar de facto para PHP al no haber una especificación formal. Publicado bajo la PHP License, la Free Software Foundation considera esta licencia como software libre.</p>');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `usuarios`
--

CREATE TABLE `usuarios` (
  `IdUsuario` int(11) NOT NULL,
  `Usuario` varchar(50) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `Clave` varchar(100) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `Nombre` varchar(200) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `Apellido` varchar(200) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `usuarios`
--

INSERT INTO `usuarios` (`IdUsuario`, `Usuario`, `Clave`, `Nombre`, `Apellido`) VALUES
(1, 'pmartinez', 'e10adc3949ba59abbe56e057f20f883e', 'Pablo', 'Martinez'),
(2, 'aperez', 'e10adc3949ba59abbe56e057f20f883e', 'Adriana', 'Perez'),
(3, 'malonso', 'e10adc3949ba59abbe56e057f20f883e', 'Martín', 'Alonso'),
(4, 'vortiz', 'e10adc3949ba59abbe56e057f20f883e', 'Valeria', 'Ortiz');

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `contactos`
--
ALTER TABLE `contactos`
  ADD PRIMARY KEY (`IdContacto`);

--
-- Indices de la tabla `estados`
--
ALTER TABLE `estados`
  ADD PRIMARY KEY (`id`),
  ADD KEY `codigo_pais` (`idPais`);

--
-- Indices de la tabla `paises`
--
ALTER TABLE `paises`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `tabs`
--
ALTER TABLE `tabs`
  ADD PRIMARY KEY (`idTab`);

--
-- Indices de la tabla `usuarios`
--
ALTER TABLE `usuarios`
  ADD PRIMARY KEY (`IdUsuario`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `contactos`
--
ALTER TABLE `contactos`
  MODIFY `IdContacto` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT de la tabla `estados`
--
ALTER TABLE `estados`
  MODIFY `id` int(5) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=490;
--
-- AUTO_INCREMENT de la tabla `tabs`
--
ALTER TABLE `tabs`
  MODIFY `idTab` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
--
-- AUTO_INCREMENT de la tabla `usuarios`
--
ALTER TABLE `usuarios`
  MODIFY `IdUsuario` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
--
-- Restricciones para tablas volcadas
--

--
-- Filtros para la tabla `estados`
--
ALTER TABLE `estados`
  ADD CONSTRAINT `cf_paises` FOREIGN KEY (`idPais`) REFERENCES `paises` (`id`);

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;



-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `actividad`
--

CREATE TABLE `actividad` (
  `id_actividad` int(11) NOT NULL,
  `nombreActividad` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `actividad`
--

INSERT INTO `actividad` (`id_actividad`, `nombreActividad`) VALUES
(1, 'Yoga'),
(2, 'Bicicleta'),
(3, 'Correr');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `beneficio`
--

CREATE TABLE `beneficio` (
  `id_beneficio` int(11) NOT NULL,
  `nombreBeneficio` varchar(50) NOT NULL,
  `id_actividad` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `beneficio`
--

INSERT INTO `beneficio` (`id_beneficio`, `nombreBeneficio`, `id_actividad`) VALUES
(1, 'Relajación', 1),
(2, 'Coordinación', 1),
(3, 'Oxigenación', 2),
(4, 'Endorfinas', 3),
(5, 'Confianza', 1),
(6, 'Fortaleza', 2);

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `actividad`
--
ALTER TABLE `actividad`
  ADD PRIMARY KEY (`id_actividad`);

--
-- Indices de la tabla `beneficio`
--
ALTER TABLE `beneficio`
  ADD PRIMARY KEY (`id_beneficio`),
  ADD KEY `id_actividad` (`id_actividad`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `actividad`
--
ALTER TABLE `actividad`
  MODIFY `id_actividad` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=91;

--
-- AUTO_INCREMENT de la tabla `beneficio`
--
ALTER TABLE `beneficio`
  MODIFY `id_beneficio` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=182;

--
-- Restricciones para tablas volcadas
--

--
-- Filtros para la tabla `beneficio`
--
ALTER TABLE `beneficio`
  ADD CONSTRAINT `beneficio_ibfk_1` FOREIGN KEY (`id_actividad`) REFERENCES `actividad` (`id_actividad`);
COMMIT;
