-- phpMyAdmin SQL Dump
-- version 4.9.5
-- https://www.phpmyadmin.net/
--
-- Servidor: localhost:3306
-- Tiempo de generación: 05-02-2021 a las 16:12:58
-- Versión del servidor: 5.7.33
-- Versión de PHP: 7.3.6

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `nutrikat_app-v1`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `categoria_plan`
--

CREATE TABLE `categoria_plan` (
  `id` int(11) NOT NULL,
  `nombre` varchar(250) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `categoria_plan`
--

INSERT INTO `categoria_plan` (`id`, `nombre`) VALUES
(1, 'Vegano'),
(2, 'Diabetes'),
(3, 'Musculación'),
(4, 'Vegetariano'),
(5, 'Retención de Líquidos'),
(6, 'Tiroides'),
(7, 'Resistencia a la Insulina'),
(8, 'Normal');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `cobro`
--

CREATE TABLE `cobro` (
  `id` int(11) NOT NULL,
  `id_suscripcion` int(11) NOT NULL,
  `id_paciente` int(11) NOT NULL,
  `fecha_pago` varchar(50) COLLATE utf8_spanish_ci NOT NULL,
  `monto` varchar(50) COLLATE utf8_spanish_ci NOT NULL,
  `id_medio_pago` int(11) NOT NULL,
  `id_cuenta_bancaria` int(11) NOT NULL,
  `numero_operacion` varchar(200) COLLATE utf8_spanish_ci NOT NULL,
  `id_vendedor` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

--
-- Volcado de datos para la tabla `cobro`
--

INSERT INTO `cobro` (`id`, `id_suscripcion`, `id_paciente`, `fecha_pago`, `monto`, `id_medio_pago`, `id_cuenta_bancaria`, `numero_operacion`, `id_vendedor`) VALUES
(11, 11, 44, '2020-11-16', '400', 3, 1, '88888888', 36),
(12, 12, 45, '2020-11-17', '100', 1, 1, '1111', 36),
(13, 13, 46, '2020-11-19', '100', 1, 1, '1111', 0),
(14, 14, 47, '2020-11-19', '100', 1, 1, '2222', 36),
(15, 15, 48, '2020-11-25', '400', 2, 1, '9181991', 36),
(16, 16, 49, '2020-11-25', '444.44444444444', 1, 1, '292992922', 36),
(17, 17, 49, '2020-11-25', '444.44444444444', 1, 1, '292992922', 36),
(18, 18, 49, '2020-11-25', '444.44444444444', 1, 1, '292992922', 36),
(19, 19, 49, '2020-11-25', '444.44444444444', 1, 1, '292992922', 36),
(20, 20, 49, '2020-11-25', '444.44444444444', 1, 1, '292992922', 36),
(21, 21, 49, '2020-11-25', '444.44444444444', 1, 1, '292992922', 36),
(22, 22, 49, '2020-11-25', '444.44444444444', 1, 1, '292992922', 36),
(23, 23, 49, '2020-11-25', '444.44444444444', 1, 1, '292992922', 36),
(24, 24, 49, '2020-11-25', '444.44444444444', 1, 1, '292992922', 36),
(25, 25, 50, '2020-11-28', '50', 1, 1, 'mmmm', 36),
(26, 26, 50, '2020-11-28', '50', 1, 1, 'mmmm', 36),
(27, 27, 51, '2020-11-28', '33.333333333333', 1, 1, '1111', 36),
(28, 28, 51, '2020-11-28', '33.333333333333', 1, 1, '1111', 36),
(29, 29, 51, '2020-11-28', '33.333333333333', 1, 1, '1111', 36),
(30, 30, 52, '2020-11-28', '33.333333333333', 1, 1, 'xxxx', 36),
(31, 31, 52, '2020-11-28', '33.333333333333', 1, 1, 'xxxx', 36),
(32, 32, 52, '2020-11-28', '33.333333333333', 1, 1, 'xxxx', 36);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `control`
--

CREATE TABLE `control` (
  `id` int(11) NOT NULL,
  `codigo` varchar(250) COLLATE utf8_spanish_ci NOT NULL,
  `id_suscripcion` int(11) NOT NULL,
  `id_nutricionista` int(11) NOT NULL,
  `id_paciente` int(11) NOT NULL,
  `fecha` varchar(50) COLLATE utf8_spanish_ci NOT NULL,
  `talla` varchar(50) COLLATE utf8_spanish_ci NOT NULL,
  `peso` varchar(50) COLLATE utf8_spanish_ci NOT NULL,
  `cuello` varchar(50) COLLATE utf8_spanish_ci NOT NULL,
  `brazo` varchar(50) COLLATE utf8_spanish_ci NOT NULL,
  `pecho` varchar(50) COLLATE utf8_spanish_ci NOT NULL,
  `cintura` varchar(50) COLLATE utf8_spanish_ci NOT NULL,
  `gluteo` varchar(50) COLLATE utf8_spanish_ci NOT NULL,
  `muslo` varchar(50) COLLATE utf8_spanish_ci NOT NULL,
  `pantorrilla` varchar(50) COLLATE utf8_spanish_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

--
-- Volcado de datos para la tabla `control`
--

INSERT INTO `control` (`id`, `codigo`, `id_suscripcion`, `id_nutricionista`, `id_paciente`, `fecha`, `talla`, `peso`, `cuello`, `brazo`, `pecho`, `cintura`, `gluteo`, `muslo`, `pantorrilla`) VALUES
(1, 'C-1', 11, 39, 44, '2020-11-16 20:45:41', '154', '50', '24', '31', '110', '69', '90', '54', '33'),
(2, 'C-2', 11, 39, 44, '2020-11-16 20:47:40', '154', '54', '24', '31', '110', '78', '90', '52', '33'),
(3, 'C-3', 11, 39, 44, '2020-11-16 20:49:42', '154', '50', '24', '31', '110', '79', '98', '51', '31'),
(4, 'C-4', 11, 39, 44, '2020-11-16 20:50:55', '154', '50', '24', '31', '110', '79', '98', '51', '31'),
(5, 'C-5', 11, 39, 44, '2020-11-16 20:50:57', '154', '50', '24', '31', '110', '79', '98', '51', '31'),
(6, 'C-6', 11, 39, 44, '2020-11-16 20:51:02', '154', '50', '24', '31', '110', '79', '98', '51', '31'),
(7, 'C-7', 11, 39, 44, '2020-11-16 20:54:09', '150', '50', '24', '31', '110', '94', '110', '45', '33');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `cuenta_bancaria`
--

CREATE TABLE `cuenta_bancaria` (
  `id` int(11) NOT NULL,
  `banco` varchar(250) COLLATE utf8_spanish_ci NOT NULL,
  `numero_cuenta` varchar(250) COLLATE utf8_spanish_ci NOT NULL,
  `numero_cci` varchar(250) COLLATE utf8_spanish_ci NOT NULL,
  `moneda` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

--
-- Volcado de datos para la tabla `cuenta_bancaria`
--

INSERT INTO `cuenta_bancaria` (`id`, `banco`, `numero_cuenta`, `numero_cci`, `moneda`) VALUES
(1, 'INTERBANK', '2543162978137', '00325401316297813701', 1),
(2, 'BCP', '19130996134024', '00219113099613402451', 1);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `empresa`
--

CREATE TABLE `empresa` (
  `id` int(11) NOT NULL,
  `ruc` varchar(50) COLLATE utf8_spanish_ci NOT NULL,
  `razon_social` varchar(250) COLLATE utf8_spanish_ci NOT NULL,
  `nombre_comercial` varchar(250) COLLATE utf8_spanish_ci NOT NULL,
  `direccion_fiscal` varchar(250) COLLATE utf8_spanish_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

--
-- Volcado de datos para la tabla `empresa`
--

INSERT INTO `empresa` (`id`, `ruc`, `razon_social`, `nombre_comercial`, `direccion_fiscal`) VALUES
(1, '10704399974', 'Katherine Alfaro Alarcón', 'Katherine Alfaro - Nutricionista y Coach', '');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `events`
--

CREATE TABLE `events` (
  `id` int(11) NOT NULL,
  `title` varchar(255) NOT NULL,
  `color` varchar(7) DEFAULT NULL,
  `start` datetime NOT NULL,
  `end` datetime DEFAULT NULL,
  `id_vendedor` int(11) NOT NULL,
  `id_nutricionista` int(11) NOT NULL,
  `id_paciente` int(11) NOT NULL,
  `id_suscripcion` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `events`
--

INSERT INTO `events` (`id`, `title`, `color`, `start`, `end`, `id_vendedor`, `id_nutricionista`, `id_paciente`, `id_suscripcion`) VALUES
(21, '', '#95cf32', '2020-11-17 10:30:00', '2020-11-17 11:00:00', 36, 39, 44, 0),
(24, 'Katherine Alfaro', '#95cf32', '2020-11-18 09:00:00', '2020-11-18 09:30:00', 36, 39, 45, 0),
(25, 'Magaly', '#95cf32', '2020-11-22 08:15:00', '2020-11-22 08:45:00', 0, 39, 46, 0),
(26, 'Magaly', '#95cf32', '2020-11-21 11:30:00', '2020-11-21 12:00:00', 36, 39, 47, 0),
(38, 'Luis Alfaro', '#95cf32', '2020-12-01 08:00:00', '2020-12-01 08:30:00', 36, 0, 0, 0),
(39, 'Luis Alfaro', '#95cf32', '2020-11-24 08:00:00', '2020-11-24 08:30:00', 36, 0, 0, 0),
(40, 'Luis Miguel', '#95cf32', '2020-12-16 08:30:00', '2020-12-16 13:00:00', 36, 39, 48, 0),
(41, 'Cita 1', '#95cf32', '2020-11-26 00:00:00', '2020-11-27 00:00:00', 36, 39, 49, 0),
(42, 'Cita 2', '#95cf32', '2020-12-25 00:00:00', '2020-12-26 00:00:00', 36, 39, 49, 0),
(43, 'Cita 3', '#95cf32', '2021-01-07 00:00:00', '2021-01-08 00:00:00', 36, 39, 49, 0),
(44, 'Cita 4', '#95cf32', '2021-02-26 00:00:00', '2021-02-27 00:00:00', 36, 39, 49, 0),
(45, 'Cita 5', '#95cf32', '2021-03-12 00:00:00', '2021-03-13 00:00:00', 36, 39, 49, 0),
(46, 'Cita 6', '#95cf32', '2021-04-17 00:00:00', '2021-04-18 00:00:00', 36, 39, 49, 0),
(47, 'Cita 7', '#95cf32', '2021-05-14 00:00:00', '2021-05-15 00:00:00', 36, 39, 49, 0),
(48, 'Cita 8', '#95cf32', '2021-06-17 00:00:00', '2021-06-18 00:00:00', 36, 39, 49, 0),
(49, 'Cita 9', '#95cf32', '2021-07-23 10:00:00', '2021-07-24 12:00:00', 36, 39, 49, 0),
(50, 'Elena Alfaro', '#95cf32', '2020-11-30 08:00:00', '2020-11-30 08:30:00', 36, 39, 50, 0),
(51, 'holi', '#95cf32', '2020-11-28 07:10:00', '2020-11-28 07:20:00', 36, 0, 0, 0);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `historia`
--

CREATE TABLE `historia` (
  `id` int(11) NOT NULL,
  `id_paciente` int(11) NOT NULL,
  `alimentos_no_gustar` longtext COLLATE utf8_spanish_ci NOT NULL,
  `agua` int(11) NOT NULL,
  `alcohol` int(11) NOT NULL,
  `alcohol_frecuencia` longtext COLLATE utf8_spanish_ci NOT NULL,
  `evacuacion` int(11) NOT NULL,
  `dormir` int(11) NOT NULL,
  `ejercicios` int(11) NOT NULL,
  `ejercicios_frecuencia` longtext COLLATE utf8_spanish_ci NOT NULL,
  `ejercicios_horario` longtext COLLATE utf8_spanish_ci NOT NULL,
  `enfermedad` int(11) NOT NULL,
  `enfermedad_especificar` longtext COLLATE utf8_spanish_ci NOT NULL,
  `analisis_sangre` int(11) NOT NULL,
  `analisis_sangre_especificar` longtext COLLATE utf8_spanish_ci NOT NULL,
  `medicamentos` int(11) NOT NULL,
  `medicamentos_especificar` longtext COLLATE utf8_spanish_ci NOT NULL,
  `horario` int(11) NOT NULL,
  `tiempo` int(11) NOT NULL,
  `date_added` varchar(50) COLLATE utf8_spanish_ci NOT NULL,
  `peso_meta` varchar(50) COLLATE utf8_spanish_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

--
-- Volcado de datos para la tabla `historia`
--

INSERT INTO `historia` (`id`, `id_paciente`, `alimentos_no_gustar`, `agua`, `alcohol`, `alcohol_frecuencia`, `evacuacion`, `dormir`, `ejercicios`, `ejercicios_frecuencia`, `ejercicios_horario`, `enfermedad`, `enfermedad_especificar`, `analisis_sangre`, `analisis_sangre_especificar`, `medicamentos`, `medicamentos_especificar`, `horario`, `tiempo`, `date_added`, `peso_meta`) VALUES
(6, 44, 'arvejas', 2, 2, 'wiskhy\n', 2, 2, 2, '3v/s cardio', '6am a 8 pm', 2, 'diabetes', 2, ' glucosa 150 mg/dl', 2, 'suplementos', 3, 1, '', ''),
(7, 45, '', 0, 0, '', 0, 0, 0, '', '', 0, '', 0, '', 0, '', 0, 0, '', ''),
(8, 46, '', 0, 0, '', 0, 0, 0, '', '', 0, '', 0, '', 0, '', 0, 0, '', ''),
(9, 47, '', 0, 0, '', 0, 0, 0, '', '', 0, '', 0, '', 0, '', 0, 0, '', ''),
(10, 48, '', 0, 0, '', 0, 0, 0, '', '', 0, '', 0, '', 0, '', 0, 0, '', ''),
(11, 49, '', 0, 0, '', 0, 0, 0, '', '', 0, '', 0, '', 0, '', 0, 0, '', ''),
(12, 50, '', 0, 0, '', 0, 0, 0, '', '', 0, '', 0, '', 0, '', 0, 0, '', ''),
(13, 51, '', 0, 0, '', 0, 0, 0, '', '', 0, '', 0, '', 0, '', 0, 0, '', ''),
(14, 52, '', 0, 0, '', 0, 0, 0, '', '', 0, '', 0, '', 0, '', 0, 0, '', '');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `horario_plan_alimentacion`
--

CREATE TABLE `horario_plan_alimentacion` (
  `id` int(11) NOT NULL,
  `nombre` varchar(250) COLLATE utf8_spanish_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `medios_pago`
--

CREATE TABLE `medios_pago` (
  `id` int(11) NOT NULL,
  `nombre` varchar(50) COLLATE utf8_spanish_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

--
-- Volcado de datos para la tabla `medios_pago`
--

INSERT INTO `medios_pago` (`id`, `nombre`) VALUES
(1, 'Efectivo'),
(2, 'Depósito Bancario'),
(3, 'Transferencia Bancaria'),
(4, 'YAPE'),
(5, 'PLIN');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `nutricionista_paciente`
--

CREATE TABLE `nutricionista_paciente` (
  `id` int(11) NOT NULL,
  `id_nutricionista` int(11) NOT NULL,
  `id_paciente` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

--
-- Volcado de datos para la tabla `nutricionista_paciente`
--

INSERT INTO `nutricionista_paciente` (`id`, `id_nutricionista`, `id_paciente`) VALUES
(6, 39, 44),
(7, 39, 45),
(8, 39, 46),
(9, 39, 47),
(10, 39, 48),
(11, 39, 49),
(12, 39, 50),
(13, 39, 51),
(14, 39, 52);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `plan_alimentacion`
--

CREATE TABLE `plan_alimentacion` (
  `id` int(11) NOT NULL,
  `tipo_plan` int(11) NOT NULL,
  `id_categoria` int(11) NOT NULL,
  `codigo` varchar(50) COLLATE utf8_spanish_ci NOT NULL,
  `id_suscripcion` int(11) NOT NULL,
  `id_control` int(11) NOT NULL,
  `id_paciente` int(11) NOT NULL,
  `fecha_realizar` varchar(50) COLLATE utf8_spanish_ci NOT NULL,
  `fecha_envio` varchar(50) COLLATE utf8_spanish_ci NOT NULL,
  `estado_envio` int(11) NOT NULL,
  `date_added` varchar(50) COLLATE utf8_spanish_ci NOT NULL,
  `hora_desayuno` varchar(50) COLLATE utf8_spanish_ci NOT NULL,
  `hora_media_manana` varchar(50) COLLATE utf8_spanish_ci NOT NULL,
  `hora_almuerzo` varchar(50) COLLATE utf8_spanish_ci NOT NULL,
  `hora_media_tarde` varchar(50) COLLATE utf8_spanish_ci NOT NULL,
  `hora_cena` varchar(50) COLLATE utf8_spanish_ci NOT NULL,
  `horario_1` longtext COLLATE utf8_spanish_ci NOT NULL,
  `horario_2` longtext COLLATE utf8_spanish_ci NOT NULL,
  `1_opcion_1_desayuno` longtext COLLATE utf8_spanish_ci NOT NULL,
  `1_opcion_2_desayuno` longtext COLLATE utf8_spanish_ci NOT NULL,
  `1_opcion_1_media_manana` longtext COLLATE utf8_spanish_ci NOT NULL,
  `1_opcion_2_media_manana` longtext COLLATE utf8_spanish_ci NOT NULL,
  `1_opcion_1_almuerzo` longtext COLLATE utf8_spanish_ci NOT NULL,
  `1_opcion_2_almuerzo` longtext COLLATE utf8_spanish_ci NOT NULL,
  `1_opcion_1_media_tarde` longtext COLLATE utf8_spanish_ci NOT NULL,
  `1_opcion_2_media_tarde` longtext COLLATE utf8_spanish_ci NOT NULL,
  `1_opcion_1_cena` longtext COLLATE utf8_spanish_ci NOT NULL,
  `1_opcion_2_cena` longtext COLLATE utf8_spanish_ci NOT NULL,
  `2_opcion_1_desayuno` longtext COLLATE utf8_spanish_ci NOT NULL,
  `2_opcion_2_desayuno` longtext COLLATE utf8_spanish_ci NOT NULL,
  `2_opcion_1_media_manana` longtext COLLATE utf8_spanish_ci NOT NULL,
  `2_opcion_2_media_manana` longtext COLLATE utf8_spanish_ci NOT NULL,
  `2_opcion_1_almuerzo` longtext COLLATE utf8_spanish_ci NOT NULL,
  `2_opcion_2_almuerzo` longtext COLLATE utf8_spanish_ci NOT NULL,
  `2_opcion_1_media_tarde` longtext COLLATE utf8_spanish_ci NOT NULL,
  `2_opcion_2_media_tarde` longtext COLLATE utf8_spanish_ci NOT NULL,
  `2_opcion_1_cena` longtext COLLATE utf8_spanish_ci NOT NULL,
  `2_opcion_2_cena` longtext COLLATE utf8_spanish_ci NOT NULL,
  `indicaciones` longtext COLLATE utf8_spanish_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `programa`
--

CREATE TABLE `programa` (
  `id` int(11) NOT NULL,
  `codigo` varchar(50) COLLATE utf8_spanish_ci NOT NULL,
  `nombre` varchar(250) COLLATE utf8_spanish_ci NOT NULL,
  `nombre_completo` varchar(250) COLLATE utf8_spanish_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

--
-- Volcado de datos para la tabla `programa`
--

INSERT INTO `programa` (`id`, `codigo`, `nombre`, `nombre_completo`) VALUES
(1, 'P1', 'RPF', 'Plan rekupera tu peso y figura'),
(2, 'P2', 'RCF', 'Plan rekupera tu cuerpo fitness'),
(3, 'P3', 'RMV', 'Plan rekupera +Vida'),
(4, 'P4', 'PPG', 'Plan para Gestante');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `receta`
--

CREATE TABLE `receta` (
  `id` int(11) NOT NULL,
  `id_control` int(11) NOT NULL,
  `nombre` longtext COLLATE utf8_spanish_ci NOT NULL,
  `descripcion` longtext COLLATE utf8_spanish_ci NOT NULL,
  `preparacion` longtext COLLATE utf8_spanish_ci NOT NULL,
  `foto` varchar(300) COLLATE utf8_spanish_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `suscripcion_programa`
--

CREATE TABLE `suscripcion_programa` (
  `id` int(11) NOT NULL,
  `id_programa` int(11) NOT NULL,
  `id_nutricionista` int(11) NOT NULL,
  `id_paciente` int(11) NOT NULL,
  `fecha_inicio` varchar(50) COLLATE utf8_spanish_ci NOT NULL,
  `fecha_fin` varchar(50) COLLATE utf8_spanish_ci NOT NULL,
  `estado` int(11) NOT NULL,
  `indicaciones` longtext COLLATE utf8_spanish_ci NOT NULL,
  `id_vendedor` int(11) NOT NULL,
  `id_paquete` int(11) NOT NULL,
  `id_tipo_suscripcion` int(11) NOT NULL,
  `peso_meta` varchar(50) COLLATE utf8_spanish_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

--
-- Volcado de datos para la tabla `suscripcion_programa`
--

INSERT INTO `suscripcion_programa` (`id`, `id_programa`, `id_nutricionista`, `id_paciente`, `fecha_inicio`, `fecha_fin`, `estado`, `indicaciones`, `id_vendedor`, `id_paquete`, `id_tipo_suscripcion`, `peso_meta`) VALUES
(11, 1, 39, 44, '2020-11-17', '2020-11-28', 1, '', 36, 1, 1, '0'),
(12, 1, 39, 45, '2020-11-25', '2020-11-27', 1, '', 36, 1, 1, '0'),
(13, 2, 39, 46, '2020-11-22', '2020-12-21', 1, '', 0, 2, 1, '0'),
(14, 1, 39, 47, '2020-11-25', '2020-11-30', 1, '', 36, 1, 1, '0'),
(15, 1, 39, 48, '2020-12-16', '2021-01-13', 1, '', 36, 1, 1, '0'),
(16, 1, 39, 49, '2020-11-25', '2020-12-24', 1, '', 36, 1, 1, '0'),
(17, 1, 39, 49, '2020-12-25', '2021-01-24', 1, '', 36, 1, 2, '0'),
(18, 1, 39, 49, '2021-01-25', '2021-02-24', 1, '', 36, 1, 2, '0'),
(19, 1, 39, 49, '2021-02-25', '2021-03-24', 1, '', 36, 1, 2, '0'),
(20, 1, 39, 49, '2021-03-25', '2021-04-24', 1, '', 36, 1, 2, '0'),
(21, 1, 39, 49, '2021-04-25', '2021-05-24', 1, '', 36, 1, 2, '0'),
(22, 1, 39, 49, '2021-05-25', '2021-06-24', 1, '', 36, 1, 2, '0'),
(23, 1, 39, 49, '2021-06-25', '2021-07-24', 1, '', 36, 1, 2, '0'),
(24, 1, 39, 49, '2021-07-25', '2021-08-24', 1, '', 36, 1, 2, '0'),
(25, 1, 39, 50, '2020-11-28', '2020-12-27', 1, '', 36, 1, 1, '0'),
(26, 1, 39, 50, '2020-12-28', '2021-01-27', 1, '', 36, 1, 2, '0'),
(27, 1, 39, 51, '2020-11-28', '2020-12-27', 1, '', 36, 1, 1, '0'),
(28, 1, 39, 51, '2020-12-28', '2021-01-27', 1, '', 36, 1, 2, '0'),
(29, 1, 39, 51, '2021-01-28', '2021-02-27', 1, '', 36, 1, 2, '0'),
(30, 1, 39, 52, '2020-11-28', '2020-12-27', 1, '', 36, 1, 1, '0'),
(31, 1, 39, 52, '2020-12-28', '2021-01-27', 1, '', 36, 1, 2, '0'),
(32, 1, 39, 52, '2021-01-28', '2021-02-27', 1, '', 36, 1, 2, '0');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tipo_documento`
--

CREATE TABLE `tipo_documento` (
  `id` int(11) NOT NULL,
  `nombre` varchar(50) COLLATE utf8_spanish_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

--
-- Volcado de datos para la tabla `tipo_documento`
--

INSERT INTO `tipo_documento` (`id`, `nombre`) VALUES
(1, 'DNI'),
(2, 'RUC'),
(3, 'CARNET DE EXTRANJERÍA');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tipo_usuario`
--

CREATE TABLE `tipo_usuario` (
  `id` int(11) NOT NULL,
  `nombre` varchar(250) COLLATE utf8_spanish_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

--
-- Volcado de datos para la tabla `tipo_usuario`
--

INSERT INTO `tipo_usuario` (`id`, `nombre`) VALUES
(1, 'Nutricionista'),
(2, 'Paciente'),
(3, 'Administrador'),
(4, 'Vendedor');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `usuario`
--

CREATE TABLE `usuario` (
  `id` int(11) NOT NULL,
  `id_tipo_usuario` int(11) NOT NULL,
  `codigo` varchar(50) COLLATE utf8_spanish_ci NOT NULL,
  `correo` varchar(250) COLLATE utf8_spanish_ci NOT NULL,
  `clave` varchar(250) COLLATE utf8_spanish_ci NOT NULL,
  `nombres` varchar(250) COLLATE utf8_spanish_ci NOT NULL,
  `apellidos` varchar(250) COLLATE utf8_spanish_ci NOT NULL,
  `fecha_nacimiento` varchar(50) COLLATE utf8_spanish_ci NOT NULL,
  `genero` int(11) NOT NULL,
  `estado` int(11) NOT NULL,
  `activo` int(11) NOT NULL,
  `id_tipo_documento` int(11) NOT NULL,
  `numero_documento` varchar(50) COLLATE utf8_spanish_ci NOT NULL,
  `date_added` varchar(50) COLLATE utf8_spanish_ci NOT NULL,
  `instagram` varchar(250) COLLATE utf8_spanish_ci NOT NULL,
  `direccion` varchar(250) COLLATE utf8_spanish_ci NOT NULL,
  `distrito` varchar(250) COLLATE utf8_spanish_ci NOT NULL,
  `provincia` varchar(250) COLLATE utf8_spanish_ci NOT NULL,
  `departamento` varchar(250) COLLATE utf8_spanish_ci NOT NULL,
  `residencia` varchar(250) COLLATE utf8_spanish_ci NOT NULL,
  `maximo_pacientes` int(11) NOT NULL,
  `peso_meta` varchar(50) COLLATE utf8_spanish_ci NOT NULL,
  `talla` varchar(50) COLLATE utf8_spanish_ci NOT NULL,
  `telefono` varchar(50) COLLATE utf8_spanish_ci NOT NULL,
  `id_vendedor` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

--
-- Volcado de datos para la tabla `usuario`
--

INSERT INTO `usuario` (`id`, `id_tipo_usuario`, `codigo`, `correo`, `clave`, `nombres`, `apellidos`, `fecha_nacimiento`, `genero`, `estado`, `activo`, `id_tipo_documento`, `numero_documento`, `date_added`, `instagram`, `direccion`, `distrito`, `provincia`, `departamento`, `residencia`, `maximo_pacientes`, `peso_meta`, `talla`, `telefono`, `id_vendedor`) VALUES
(1, 3, 'A-1', 'katherine-alfaro@outlook.com', '$2y$10$VWhrYfcFYiFWpX0WVo98.eHmIjNDCZOKdsc7QzvaqYwmI3NwSZrLi', 'Katherine', 'Alfaro Alarcón', '1994-05-04', 2, 1, 1, 1, '', '', '', '', 'Surco', 'Lima', 'Lima', 'PE', 1000, '', '', '', 0),
(36, 4, 'V-1', 'jimena@nutrikatherinealfaro.com.pe', '$2y$10$VWhrYfcFYiFWpX0WVo98.eHmIjNDCZOKdsc7QzvaqYwmI3NwSZrLi', 'Jimena', 'Vargas Gonzalez', '1998-04-05', 2, 1, 1, 1, '71216794', '2020-11-10 12:25:18', '', '', '', '', '', 'PE', 150, '', '', '', 1),
(39, 1, 'N-1', 'katherine-alfaro@outlook.com', '$2y$10$VWhrYfcFYiFWpX0WVo98.eHmIjNDCZOKdsc7QzvaqYwmI3NwSZrLi', 'Katherine Magaly', 'Alfaro Alarcón', '1990-09-19', 2, 1, 1, 1, '88888888', '2020-11-15 19:15:32', '', '', '', '', '', 'PE', 150, '', '', '', 1),
(44, 2, 'P-1', 'luispurizaca.1908@gmail.com', '$2y$10$VWhrYfcFYiFWpX0WVo98.eHmIjNDCZOKdsc7QzvaqYwmI3NwSZrLi', 'Luis Mario', 'Purizaca Martínez', '1996-08-19', 1, 1, 1, 1, '72208325', '2020-11-16 14:41:39', 'Luis.Purizaca', 'Av. Paciente 123', 'Piura', 'Piura', 'Piura', 'PE', 0, '', '', '922804392', 36),
(45, 2, 'P-2', 'katherine-alfaro@outlook.com', '$2y$10$VWhrYfcFYiFWpX0WVo98.eHmIjNDCZOKdsc7QzvaqYwmI3NwSZrLi', 'katherine magaly', 'alfaro alarcón', '1989-08-25', 2, 1, 1, 1, '70439997', '2020-11-17 15:18:57', '', 'santiago de surco', '', 'lima', '', '', 0, '', '', '920399461', 36),
(46, 2, 'P-3', 'katherine-alfaro@outlook.com', '$2y$10$VWhrYfcFYiFWpX0WVo98.eHmIjNDCZOKdsc7QzvaqYwmI3NwSZrLi', 'magaly ', 'alarcon quispe', '11973-03-28', 2, 1, 1, 1, '10009890', '2020-11-19 21:07:21', '', '', '', '', '', '', 0, '', '', '', 0),
(47, 2, 'P-4', 'katherine-alfaro@outlook.com', '$2y$10$VWhrYfcFYiFWpX0WVo98.eHmIjNDCZOKdsc7QzvaqYwmI3NwSZrLi', 'Magaly Elena', 'Alarcon Quispe', '1973-03-28', 2, 1, 1, 1, '10009890', '2020-11-19 21:09:58', '', '', '', '', '', '', 0, '', '', '', 36),
(48, 2, 'P-5', 'luispurizaca.1908@gmail.com', '$2y$10$VWhrYfcFYiFWpX0WVo98.eHmIjNDCZOKdsc7QzvaqYwmI3NwSZrLi', 'Luis', 'Miguel', '1997-07-19', 1, 1, 1, 1, '98918928', '2020-11-25 03:21:27', '', '', '', '', '', '', 0, '', '', '', 36),
(49, 2, 'P-6', 'luispurizaca.1908@gmail.com', '$2y$10$VWhrYfcFYiFWpX0WVo98.eHmIjNDCZOKdsc7QzvaqYwmI3NwSZrLi', 'Roberto', 'Silva', '1990-01-01', 1, 1, 1, 1, '11111111', '2020-11-25 16:49:04', '', '', '', '', '', '', 0, '', '', '', 36),
(50, 2, 'P-7', 'katherine-alfaro@outlook.com', '$2y$10$VWhrYfcFYiFWpX0WVo98.eHmIjNDCZOKdsc7QzvaqYwmI3NwSZrLi', 'elena', 'alfaro alarcón', '1989-08-25', 2, 1, 1, 1, '70439997', '2020-11-28 04:01:25', '', 'santiago de surco', '', 'lima', '', '', 0, '', '', '920399461', 36),
(51, 2, 'P-8', 'katherine-alfaro@outlook.com', '$2y$10$VWhrYfcFYiFWpX0WVo98.eHmIjNDCZOKdsc7QzvaqYwmI3NwSZrLi', 'piero', 'alfaro alarcón', '1989-08-25', 2, 1, 1, 1, '70439997', '2020-11-28 04:15:25', '', 'santiago de surco', '', 'lima', '', '', 0, '', '', '920399461', 36),
(52, 2, 'P-9', 'katherine-alfaro@outlook.com', '$2y$10$VWhrYfcFYiFWpX0WVo98.eHmIjNDCZOKdsc7QzvaqYwmI3NwSZrLi', 'piero', 'alfaro alarcón', '1989-08-25', 1, 1, 1, 1, '7043997', '2020-11-28 04:18:41', '', 'santiago de surco', '', 'lima', '', '', 0, '', '', '920399461', 36);

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `categoria_plan`
--
ALTER TABLE `categoria_plan`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `cobro`
--
ALTER TABLE `cobro`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `control`
--
ALTER TABLE `control`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `cuenta_bancaria`
--
ALTER TABLE `cuenta_bancaria`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `empresa`
--
ALTER TABLE `empresa`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `events`
--
ALTER TABLE `events`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `historia`
--
ALTER TABLE `historia`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `horario_plan_alimentacion`
--
ALTER TABLE `horario_plan_alimentacion`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `medios_pago`
--
ALTER TABLE `medios_pago`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `nutricionista_paciente`
--
ALTER TABLE `nutricionista_paciente`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `plan_alimentacion`
--
ALTER TABLE `plan_alimentacion`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `programa`
--
ALTER TABLE `programa`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `receta`
--
ALTER TABLE `receta`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `suscripcion_programa`
--
ALTER TABLE `suscripcion_programa`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `tipo_documento`
--
ALTER TABLE `tipo_documento`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `tipo_usuario`
--
ALTER TABLE `tipo_usuario`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `usuario`
--
ALTER TABLE `usuario`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `categoria_plan`
--
ALTER TABLE `categoria_plan`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT de la tabla `cobro`
--
ALTER TABLE `cobro`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=33;

--
-- AUTO_INCREMENT de la tabla `control`
--
ALTER TABLE `control`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT de la tabla `cuenta_bancaria`
--
ALTER TABLE `cuenta_bancaria`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT de la tabla `empresa`
--
ALTER TABLE `empresa`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT de la tabla `events`
--
ALTER TABLE `events`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=52;

--
-- AUTO_INCREMENT de la tabla `historia`
--
ALTER TABLE `historia`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- AUTO_INCREMENT de la tabla `horario_plan_alimentacion`
--
ALTER TABLE `horario_plan_alimentacion`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `medios_pago`
--
ALTER TABLE `medios_pago`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT de la tabla `nutricionista_paciente`
--
ALTER TABLE `nutricionista_paciente`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- AUTO_INCREMENT de la tabla `plan_alimentacion`
--
ALTER TABLE `plan_alimentacion`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `programa`
--
ALTER TABLE `programa`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT de la tabla `receta`
--
ALTER TABLE `receta`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `suscripcion_programa`
--
ALTER TABLE `suscripcion_programa`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=33;

--
-- AUTO_INCREMENT de la tabla `tipo_documento`
--
ALTER TABLE `tipo_documento`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT de la tabla `tipo_usuario`
--
ALTER TABLE `tipo_usuario`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT de la tabla `usuario`
--
ALTER TABLE `usuario`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=53;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
