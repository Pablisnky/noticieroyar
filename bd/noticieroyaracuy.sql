-- phpMyAdmin SQL Dump
-- version 4.9.7
-- https://www.phpmyadmin.net/
--
-- Servidor: localhost:3306
-- Tiempo de generación: 08-10-2022 a las 15:05:17
-- Versión del servidor: 10.5.17-MariaDB
-- Versión de PHP: 7.4.30

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `noticie2_not_Yar`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `imagenes`
--

CREATE TABLE `imagenes` (
  `ID_Imagen` int(11) NOT NULL,
  `ID_Noticia` int(11) NOT NULL,
  `nombre_imagenNoticia` varchar(250) NOT NULL DEFAULT 'imagen.png',
  `tamanio_imagenNoticia` varchar(50) NOT NULL,
  `tipo_imagenNoticia` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `imagenes`
--

INSERT INTO `imagenes` (`ID_Imagen`, `ID_Noticia`, `nombre_imagenNoticia`, `tamanio_imagenNoticia`, `tipo_imagenNoticia`) VALUES
(1, 1, 'delegacion san felipe.jpg', '34641', 'image/jpeg'),
(2, 2, 'IMG-20220930-WA0153.jpg', '93064', 'image/jpeg'),
(3, 3, '20200203_134401.jpg', '40130', 'image/jpeg'),
(6, 6, '1664830614921.jpg', '115987', 'image/jpeg'),
(7, 8, 'IMG-20220930-WA0021.jpg', '75002', 'image/jpeg'),
(8, 9, 'IMG-20221001-WA0030.jpg', '115335', 'image/jpeg'),
(9, 10, 'IMG_20221004_102844.jpg', '119348', 'image/jpeg'),
(10, 11, 'angora.jpg', 'image/jpeg', '4651'),
(11, 12, 'angora_2.jpg', 'image/jpeg', '14576'),
(12, 13, 'angora_4.jpg', 'image/jpeg', '8210'),
(13, 14, 'criollo_2.jpg', 'image/jpeg', '3163'),
(14, 15, 'index.jpg', 'image/jpeg', '7336'),
(15, 16, 'Aceite_Motocicleta_2T_1.jpg', 'image/jpeg', '5746'),
(16, 17, 'Aceite_Motor_Gasolina_1.jpg', 'image/jpeg', '35362'),
(17, 18, 'Aceite_Motor_Gasolina_3.jpg', 'image/jpeg', '30876'),
(18, 19, 'Aceite_Motor_Gasolina_5.jpg', 'image/jpeg', '38714'),
(19, 20, 'jugo de fresa.jpg', 'image/jpeg', '6111'),
(20, 21, 'jugo de parchita.jpg', 'image/jpeg', '3824'),
(21, 22, 'jugo de piña.jpg', 'image/jpeg', '5824'),
(22, 23, 'jugoMora.jpg', 'image/jpeg', '6534'),
(23, 24, 'empanada_1.jpg', 'image/jpeg', '10558'),
(24, 25, 'empanada_3.jpg', 'image/jpeg', '7365'),
(25, 26, 'empanada_4.jpg', 'image/jpeg', '8907'),
(26, 27, 'empanada_2.jpg', 'image/jpeg', '7960'),
(27, 28, 'f51c1839-2c36-41c2-a45a-587c8e8eecbf.jpeg', '110073', 'image/jpeg'),
(28, 29, 'FeVOP6vWQAA7-ni.jpeg', '104941', 'image/jpeg');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `noticias`
--

CREATE TABLE `noticias` (
  `ID_Noticia` int(11) NOT NULL,
  `ID_Seccion` int(11) NOT NULL,
  `ID_Periodista` int(11) NOT NULL,
  `titulo` varchar(150) COLLATE utf8_spanish_ci NOT NULL,
  `subtitulo` varchar(250) COLLATE utf8_spanish_ci NOT NULL,
  `contenido` text COLLATE utf8_spanish_ci NOT NULL,
  `portada` int(11) NOT NULL,
  `fecha` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

--
-- Volcado de datos para la tabla `noticias`
--

INSERT INTO `noticias` (`ID_Noticia`, `ID_Seccion`, `ID_Periodista`, `titulo`, `subtitulo`, `contenido`, `portada`, `fecha`) VALUES
(1, 1, 0, ' Detenida por presunto porte ilícito de arma de fuego ', 'En el marco de la Gran Misión Cuadrantes de Paz, funcionarios adscritos al Cuerpo de investigaciones científicas, penales y criminalísticas, de  la delegación municipal San Felipe, practicaron la aprehensión de la ciudadana.', '', 1, '2022-10-06'),
(2, 2, 0, ' Remodelación de la Plaza Simón Bolívar en Bruzual ', 'En aras de mejorar los espacios públicos y recreativos de la entidad Bruzualense, ultiman detalles para la entrega de la plaza Bolívar de Chivacoa,indica una nota de prensa .', '', 1, '2022-10-06'),
(3, 3, 0, ' Inician inscripciones online para nuevo ingreso en la Uptyab ', 'La Universidad Politécnica Territorial de Yaracuy “Arístides Bastidas” (Uptyab) dio inicio este miércoles 16 de septiembre al proceso de inscripción de manera Online para estudiantes nuevo ingreso, quienes fueron asignados a través del Sistema Nacion', '', 1, '2022-10-06'),
(6, 2, 0, ' Abren sus puertas 81 centros educativos en el municipio Bolivar para iniciar nuevo año escolar 2022-2023. ', 'Llenos de emoción, miles de niños, niñas y adolescentes del municipio Bolívar, se incorporaron a las aulas de clases en este nuevo periodo escolar 2022-2023, la actividad central de bienvenida se efectuó en la Escuela Primaria Carmelo Fernández y fue', '', 1, '2022-10-06'),
(8, 1, 0, ' Inaugurada Sala de Resguardo de Cadáveres en San Felipe ', ' Dando cumplimiento a la normativa existente sobre el manejo de Cementerios en las capitales de estado, la ciudad de San Felipe se coloca a la vanguardia con la inauguración de la primera Sala de Resguardo de Cadáveres en proceso de Descomposición, i', '', 1, '2022-10-06'),
(9, 1, 0, ' La Navidad llegó poniéndole color a Independencia ', 'Con la entrega de pinturas para el embellecimiento de 900 viviendas en 16 comunidades, la Navidad llegó poniéndole color al municipio Independencia, a través del programa \"Mi Comunidad Más Bonita\", enmarcado en el arranque de la festividad en el país', '', 1, '2022-10-06'),
(10, 1, 0, ' Inces certifica a jóvenes emprendedores del municipio San Felipe ', 'Como parte del trabajo articulado que realiza el Instituto Nacional de Capacitación y Educación (Inces), y la Misión Robert Serra, en el estado Yaracuy, se cumplió de manera exitosa jornada de certificación de saberes por experiencia a jóvenes empren', '', 1, '2022-10-06'),
(11, 1, 0, 'Los gatos blancos son los mas bonitos en la tierra.', 'gggggggggggg gggggggggg ggggggggg', '', 1, '2022-10-01'),
(12, 1, 0, 'Los gatos Siameses son los mas bonitos en la tierra.', 'rrrrrrrrrrrrrr rrrrrrrrrrrrr rrrrrrrrrrrrrrrr', '', 1, '2022-10-03'),
(13, 1, 0, 'Los gatos Angoras son los mas bonitos en la tierra.', 'kkkkkkkkkk kkkkkkkkk kkkkkkkkkkk kkkkkkk', '', 1, '2022-10-04'),
(14, 1, 0, 'Los gatos criollos son los mas bonitos en la tierra.', 'hhhhhhhhhhh hhhhhhhhhhhhhhh hhhhhhhhhhh', '', 1, '0000-00-00'),
(15, 1, 0, 'Los gatos con ojos grandes son los mas bonitos en la tierra.', 'ddddddddddd ddddddddddd ddddddddd ddddddd', '', 1, '2022-09-09'),
(16, 2, 0, 'Use aceite lubricante para el motor de combustion interna.', 'wwwwwww wwwwwwwwww wwwwwwwww', '', 1, '2022-09-01'),
(17, 2, 0, 'Use aceite lubricante para el motor de combustion interna.', 'yyyyyyyyy yyyyyyyyyyy yyyyyyyyyyy yyyy', '', 1, '2022-09-05'),
(18, 2, 0, 'Use aceite lubricante para el motor de combustion interna.', 'rrrrrrrrrrr rrrrrrrrrrrrrr rrrrrrrrrrr', '', 1, '2022-09-07'),
(19, 2, 0, 'Use aceite lubricante para el motor de combustion interna.', 'vvvvvvvvvv vvvvvvvvvvvvv vvvvvvvvvvvvvvvvv vvvvvvvvvv', '', 1, '2022-01-12'),
(20, 3, 0, 'Un Jugo de fresa sabrosisimo en menos de dos minutos.', 'ffffffffffff ffffffffffffff ffffffffffffffff', '', 1, '2022-03-03'),
(21, 3, 0, 'Un Jugo de parchita sabrosisimo en menos de dos minutos.', 'xxxxxxxxxxx xxxxxxxxxxxxxx xxxxxxxxxxxx xxxxxxxxx', '', 1, '2022-01-08'),
(22, 3, 0, 'Un Jugo de piña sabrosisimo en menos de dos minutos.', 'hhhhhhhhhhhh hhhhhhhhhhhhhh hhhhhhhhhh', '', 1, '2022-01-20'),
(23, 3, 0, 'Un Jugo de mora sabrosisimo en menos de dos minutos.', 'zzzzzzzzzzzz zzzzzzzzzzzz zzzzzzzzzzzz zzzzzzz', '', 1, '2022-09-10'),
(24, 4, 0, 'Empanadas de queso preparadas en cas, son la mejor alternativa.', 'ccccccccccc ccccccccccccccccc ccccccccccccccc', '', 1, '2022-01-03'),
(25, 4, 0, 'Empanadas de caraota preparadas en cas, son la mejor alternativa.', 'aaaaaaaaaaa aaaaaaaaaaa aaaaaaaaaaaa a', '', 1, '0000-00-00'),
(26, 4, 0, 'Empanadas de carne molida preparadas en cas, son la mejor alternativa.', 'rjjjjjjjjjj jjjjjjjjjjjjjjjj jjjjjjjjjjjjjjj jjjjjjjjjjjj', '', 1, '2022-01-30'),
(27, 4, 0, 'Empanadas decaraota con queso preparadas en cas, son la mejor alternativa.', 'lllllllllllllll lllllllllllllllll llllllllllllllllllll llllllllllllllllllll llllllllllllll', '', 1, '2022-01-06'),
(28, 1, 1, 'Gente Emergente nombra autoridades en Bolivar', 'Este pasado sábado, se realizó la juramentación, en  Aroa, capital del municipio Bolívar, del equipo de Gente Emergente.', 'hhhhh', 1, '2022-10-06'),
(29, 1, 1, 'Asamblea de Salud fortalece la atención a través del sistema 1×10 del Buen Gobierno', '  Personal del sector salud de los estados   Carabobo, Aragua y Yaracuy, se reunieron este 5 de octubre en el gimnasio cubierto Nicolas Ojeda Parra en Independencia con la ministra Magaly Gutiérrez. Abrió el evento,    un golpe tocuyano a', 'Contenido', 1, '2022-10-06');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `periodista`
--

CREATE TABLE `periodista` (
  `ID_Periodista` int(11) NOT NULL,
  `nombrePeriodista` varchar(100) COLLATE utf8_spanish_ci NOT NULL,
  `apellidoPeriodista` varchar(100) COLLATE utf8_spanish_ci NOT NULL,
  `CNP` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `secciones`
--

CREATE TABLE `secciones` (
  `ID_Seccion` int(11) NOT NULL,
  `seccion` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `secciones`
--

INSERT INTO `secciones` (`ID_Seccion`, `seccion`) VALUES
(1, 'Cultura'),
(2, 'Politica'),
(3, 'Sucesos'),
(4, 'Infraestructura'),
(5, 'Salud'),
(6, 'Deporte'),
(7, 'Comunidad');

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `imagenes`
--
ALTER TABLE `imagenes`
  ADD PRIMARY KEY (`ID_Imagen`);

--
-- Indices de la tabla `noticias`
--
ALTER TABLE `noticias`
  ADD PRIMARY KEY (`ID_Noticia`);

--
-- Indices de la tabla `periodista`
--
ALTER TABLE `periodista`
  ADD PRIMARY KEY (`ID_Periodista`);

--
-- Indices de la tabla `secciones`
--
ALTER TABLE `secciones`
  ADD PRIMARY KEY (`ID_Seccion`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `imagenes`
--
ALTER TABLE `imagenes`
  MODIFY `ID_Imagen` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=29;

--
-- AUTO_INCREMENT de la tabla `noticias`
--
ALTER TABLE `noticias`
  MODIFY `ID_Noticia` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=30;

--
-- AUTO_INCREMENT de la tabla `periodista`
--
ALTER TABLE `periodista`
  MODIFY `ID_Periodista` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `secciones`
--
ALTER TABLE `secciones`
  MODIFY `ID_Seccion` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
