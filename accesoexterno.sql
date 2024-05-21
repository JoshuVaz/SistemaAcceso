-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 21-05-2024 a las 20:19:25
-- Versión del servidor: 10.4.28-MariaDB
-- Versión de PHP: 8.2.4

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `accesoexterno`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `aperturas`
--

CREATE TABLE `aperturas` (
  `id` int(11) NOT NULL,
  `numero_tarjeta` varchar(11) DEFAULT NULL,
  `fecha_hora` datetime NOT NULL DEFAULT current_timestamp(),
  `nota` text DEFAULT NULL,
  `puerta` varchar(25) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `aperturas`
--

INSERT INTO `aperturas` (`id`, `numero_tarjeta`, `fecha_hora`, `nota`, `puerta`) VALUES
(1, 'B3-70-A0-16', '2024-05-21 12:18:03', 'aperturado por sistema', 'chapaexterna/externa'),
(2, 'B3-70-A0-16', '2024-05-21 12:18:05', 'aperturado por sistema', 'chapaexterna/externa');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `banner`
--

CREATE TABLE `banner` (
  `id_banner` int(11) NOT NULL,
  `img_banner` text NOT NULL,
  `archivo` text DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `banner`
--

INSERT INTO `banner` (`id_banner`, `img_banner`, `archivo`, `created_at`, `updated_at`) VALUES
(632, 'img/banner/194.png', NULL, '2022-08-17 19:48:11', '2022-08-17 19:48:11'),
(634, 'img/banner/721.png', NULL, '2022-08-17 19:49:56', '2022-08-17 19:49:56'),
(636, 'img/banner/884.png', NULL, '2022-08-24 03:54:06', '2022-08-24 03:54:06'),
(637, 'img/banner/864.png', NULL, '2022-08-24 03:54:17', '2022-08-24 03:54:17'),
(638, 'img/banner/644.png', NULL, '2022-08-24 03:54:25', '2022-08-24 03:54:25');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `chapas`
--

CREATE TABLE `chapas` (
  `id` int(11) NOT NULL,
  `identificador` varchar(8) DEFAULT NULL,
  `password` varchar(8) DEFAULT NULL,
  `nombre` varchar(20) DEFAULT NULL,
  `ubicacion` varchar(20) DEFAULT NULL,
  `topico` text DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `chapas`
--

INSERT INTO `chapas` (`id`, `identificador`, `password`, `nombre`, `ubicacion`, `topico`) VALUES
(1, 'ESP-6618', 'zv39cLTF', 'Externa', 'Chabacano', 'chapaexterna/externa'),
(2, 'ESP-8096', 'QMLmQGmB', 'Chapa oficina', 'Chabacano', 'chapa/sensor1'),
(3, 'ESP-8058', 'kWn9JHqo', 'Chapa almacen', 'Chabacano', 'chapa/sensor2'),
(5, 'ESP-6635', 'QH60RTMw', 'Chapa entrada', 'Chabacano', 'chapa/sensor3'),
(6, 'ESP-2335', 'QYWWercn', 'chapa prueba', 'chabacano', 'chapa/prueba');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `credenciales`
--

CREATE TABLE `credenciales` (
  `id` int(11) NOT NULL,
  `id_usuario` text DEFAULT NULL,
  `token_usuario` text DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `credenciales`
--

INSERT INTO `credenciales` (`id`, `id_usuario`, `token_usuario`) VALUES
(1, 'a2aa07aafartwyweidAD52356FED.keKr8pjfvHqN827mwZSdSC.GIcabdg6', 'o2ao07oafajgasdetsdAD52356FE.AQz0UZfyiFk1Slg8w7NoW3fbZMDx1zS');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `generadores`
--

CREATE TABLE `generadores` (
  `id` int(11) NOT NULL,
  `identificador` varchar(8) DEFAULT NULL,
  `password` varchar(8) DEFAULT NULL,
  `nombre` varchar(20) DEFAULT NULL,
  `ubicacion` varchar(20) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `generadores`
--

INSERT INTO `generadores` (`id`, `identificador`, `password`, `nombre`, `ubicacion`) VALUES
(1, 'ESP-9040', 'xuwsSLKJ', 'unit', 'chabacano 65'),
(2, 'ESP-3639', 'aRuQ2Xl3', 'Generador Altas', 'Chabacano 65');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `menu`
--

CREATE TABLE `menu` (
  `id` int(11) NOT NULL,
  `nombre` varchar(50) NOT NULL,
  `icono` varchar(50) NOT NULL,
  `ruta` varchar(50) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `menu`
--

INSERT INTO `menu` (`id`, `nombre`, `icono`, `ruta`) VALUES
(28, 'Registro Usuarios', 'fa-solid fa-users-gear', 'registro-usuarios'),
(29, 'Tarjetas', 'fa-solid fa-id-card', 'tarjetas'),
(30, 'Herramientas', 'fa-solid fa-gears', 'herramientas'),
(31, 'Camaras', 'fa-solid fa-video', 'camaras'),
(32, 'Historial Acceso', 'fa-solid fa-clock-rotate-left', 'historial-acceso');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `permisos`
--

CREATE TABLE `permisos` (
  `id` int(11) NOT NULL,
  `id_user` int(11) NOT NULL,
  `id_menu` int(11) NOT NULL,
  `id_submenu` int(11) NOT NULL,
  `acceso` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `permisos`
--

INSERT INTO `permisos` (`id`, `id_user`, `id_menu`, `id_submenu`, `acceso`) VALUES
(4, 32, 25, 0, 0),
(5, 32, 26, 0, 0),
(6, 32, 27, 0, 0),
(44, 34, 25, 0, 1),
(45, 34, 26, 0, 1),
(46, 34, 27, 0, 1),
(47, 34, 28, 0, 0),
(48, 34, 28, 5, 0),
(49, 34, 28, 6, 0),
(50, 34, 29, 0, 0),
(51, 34, 29, 7, 0),
(52, 34, 29, 8, 0),
(53, 34, 30, 0, 0),
(54, 34, 30, 9, 0),
(55, 34, 30, 10, 0),
(56, 34, 31, 0, 0),
(57, 34, 32, 0, 0),
(58, 37, 25, 0, 0),
(59, 37, 26, 0, 0),
(60, 37, 27, 0, 0),
(61, 37, 28, 0, 0),
(62, 37, 28, 5, 0),
(63, 37, 28, 6, 0),
(64, 37, 29, 0, 0),
(65, 37, 29, 7, 0),
(66, 37, 29, 8, 0),
(67, 37, 30, 0, 0),
(68, 37, 30, 9, 0),
(69, 37, 30, 10, 0),
(70, 37, 31, 0, 0),
(71, 37, 32, 0, 0),
(72, 33, 25, 0, 0),
(73, 33, 26, 0, 0),
(74, 33, 27, 0, 0),
(75, 33, 28, 0, 0),
(76, 33, 28, 5, 0),
(77, 33, 28, 6, 0),
(78, 33, 29, 0, 0),
(79, 33, 29, 7, 0),
(80, 33, 29, 8, 0),
(81, 33, 30, 0, 0),
(82, 33, 30, 9, 0),
(83, 33, 30, 10, 0),
(84, 33, 31, 0, 0),
(85, 33, 32, 0, 0),
(86, 36, 28, 0, 0),
(87, 36, 28, 5, 0),
(88, 36, 28, 6, 1),
(89, 36, 29, 0, 1),
(90, 36, 29, 7, 1),
(91, 36, 29, 8, 1),
(92, 36, 30, 0, 1),
(93, 36, 30, 9, 1),
(94, 36, 30, 10, 1),
(95, 36, 31, 0, 0),
(96, 36, 32, 0, 0);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `registro_usuarios`
--

CREATE TABLE `registro_usuarios` (
  `id` int(11) NOT NULL,
  `nombre` text NOT NULL,
  `apellidoPaterno` text NOT NULL,
  `apellidoMaterno` text NOT NULL,
  `idTarjeta` int(11) NOT NULL,
  `statusAcceso` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `registro_usuarios`
--

INSERT INTO `registro_usuarios` (`id`, `nombre`, `apellidoPaterno`, `apellidoMaterno`, `idTarjeta`, `statusAcceso`) VALUES
(1, 'Arturo', 'Ponce', 'De Leon', 58, 0),
(2, 'Veronica', 'Martin', 'Vazquez', 2, 0),
(3, 'Luis Humberto', 'Jurado', 'Ramirez', 3, 0),
(4, 'Joshua', 'Vazquez', 'Cruz', 4, 0),
(5, 'Cesar Fabian', 'Ayala', 'Catalan', 6, 0),
(6, 'Miguel', 'Guerrero', 'Choperena', 5, 0),
(7, 'María Isabel', 'Arciga', 'Fernández', 38, 1),
(8, 'Mirell', 'Pérez', 'Domínguez', 59, 0),
(9, 'Luis Arturo', 'Chávez', 'García', 39, 1),
(10, 'Luis', 'Martinez', 'Maldonado', 12, 0),
(11, 'Mary', 'Ortega', 'Martinez', 8, 0),
(12, 'Claudia Berenice', 'Aguirre', 'Plata', 10, 0),
(13, 'Jorge Manuel', 'Diaz', 'Rentería', 11, 0),
(14, 'Samuel', 'Salinas', 'Canseco', 13, 0),
(15, 'Federico Antonio', 'Hidalgo', 'Mendoza', 14, 0),
(16, 'Diana', 'Rodríguez', 'Castro', 15, 0),
(17, 'Amayrani Abigail', 'Galindo', 'Barbosa', 16, 0),
(18, 'Felipe de Jesus', 'Flores', 'Diaz', 17, 0),
(19, 'Adrian', 'Rabadan', 'Ortiz', 18, 0),
(20, 'Raul Leonardo', 'Ortiz', 'Nieto', 19, 0),
(21, 'Juan Diego', 'Olguín', 'Santana', 9, 0),
(22, 'Brandon Alejandro', 'Cruz', 'Parada', 21, 0),
(23, 'Alberto Eduardo', 'Villanueva', 'Esquivel', 22, 0),
(24, 'Carlos Ivan', 'Martinez', 'Dominguez', 23, 0),
(25, 'Victor Manuel', 'Martinez', 'Vazquez', 24, 0),
(26, 'Amelia Joselin', 'Islas', 'Álvarez', 60, 0),
(27, 'Tomas Benjamin', 'Ceron', 'Lopez', 26, 0),
(28, 'Andres', 'Ortega', 'Cuamatzi', 27, 0),
(29, 'Juan Luis', 'Ballesteros', 'Martinez', 28, 0),
(30, 'Angel Alexis', 'Hernandez', 'Cuevas', 29, 0),
(31, 'Vania Lizbeth', 'Castellanos', 'Villegas', 30, 0),
(32, 'Brayan', 'Martínez', 'Rodríguez', 31, 0),
(33, 'Julio Cesar', 'Bautista', 'Rosas', 32, 0),
(34, 'Ana Belen', 'Quintanar', 'Sanchez', 33, 0),
(35, 'Ernesto', 'Leal', 'Arellano', 34, 0),
(36, 'José Carlos', 'Serrato', 'Perez', 35, 0),
(37, 'Alitzel', 'Acosta', 'Huerta', 36, 0),
(38, 'Salvador', 'Castelan', 'Diaz', 37, 0),
(39, 'Jesus Emmanuel', 'Jimenez', 'Jimenez', 20, 0),
(40, 'Iván', 'Vélez', 'Vega', 40, 1),
(41, 'Efrén Mariano', 'González', 'Martínez', 41, 1),
(42, 'Mario Abed Nego', 'Lara', 'Reséndiz', 42, 1),
(43, 'Beatriz', 'Vázquez', 'Espejel', 43, 1),
(44, 'María Sandra', 'Landa ', 'Vargas', 44, 1),
(45, 'Eduardo', 'Horihuela', 'Vázquez', 45, 1),
(46, 'Xiang1', 'Xiang1', 'Xiang1', 46, 1),
(47, 'Xiang2', 'Xiang2', 'Xiang2', 47, 1),
(48, 'Xiang3', 'Xiang3', 'Xiang3', 48, 1),
(49, 'Xiang4', 'Xiang4', 'Xiang4', 49, 1),
(50, 'Xiang5', 'Xiang5', 'Xiang5', 50, 1),
(51, 'Bernardo', 'Moncada', 'Ballesteros', 51, 1),
(52, 'Elena', 'Pimentel', 'Infante', 52, 1),
(53, 'Jose Sergio', 'Pimentel', 'Escobar', 53, 1),
(54, 'Javier', 'Ramirez', 'Monroy', 54, 1),
(55, 'Daniel', 'Martinez', 'Osornio', 55, 1),
(56, 'Johann', 'Reséndiz', 'Gutiérrez', 63, 0);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `rfid_temp`
--

CREATE TABLE `rfid_temp` (
  `id` int(11) NOT NULL,
  `modo` int(1) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `rfid_temp`
--

INSERT INTO `rfid_temp` (`id`, `modo`) VALUES
(1, 0);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `submenu`
--

CREATE TABLE `submenu` (
  `id` int(11) NOT NULL,
  `id_menu` int(11) NOT NULL,
  `nombre` varchar(50) NOT NULL,
  `icono` varchar(50) NOT NULL,
  `ruta` varchar(50) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `submenu`
--

INSERT INTO `submenu` (`id`, `id_menu`, `nombre`, `icono`, `ruta`) VALUES
(5, 28, 'Usuarios Internos', 'fa-solid fa-circle-user', 'usuarios-internos'),
(6, 28, 'Usuarios Externos', 'fa-regular fa-circle-user', 'usuarios-externos'),
(7, 29, 'Alta Tarjetas', 'fa-solid fa-id-card-clip', 'alta-tarjetas'),
(8, 29, 'Asginar Tarjetas', 'fa-solid fa-address-card', 'asignar-tarjetas'),
(9, 30, 'Chapas', 'fa-solid fa-building-lock', 'chapas'),
(10, 30, 'Generadores', 'fa-solid fa-microchip', 'generadores');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tarjetas`
--

CREATE TABLE `tarjetas` (
  `id` int(11) NOT NULL,
  `numero_tarjeta` text NOT NULL,
  `asignado` int(11) DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `tarjetas`
--

INSERT INTO `tarjetas` (`id`, `numero_tarjeta`, `asignado`) VALUES
(1, '53-7B-A9-16', 0),
(2, 'D3-93-9B-16', 1),
(3, 'E3-2F-8F-16', 1),
(4, 'D3-28-55-94', 1),
(5, '53-18-A2-16', 1),
(6, 'C3-9A-7C-16', 1),
(8, '83-1B-6D-16', 1),
(9, '13-72-A4-16', 1),
(10, '73-22-B6-16', 1),
(11, 'D3-50-FA-2B', 1),
(12, '23-01-87-16', 1),
(13, '46-8B-BD-89', 1),
(14, 'C3-47-B8-16', 1),
(15, 'F3-7C-B7-16', 1),
(16, 'F3-5E-09-94', 1),
(17, 'A3-83-0F-15', 1),
(18, '43-AA-BC-16', 1),
(19, '53-71-68-16', 1),
(20, 'C3-63-0D-2C', 1),
(21, 'F3-95-B5-16', 1),
(22, '33-F6-AE-16', 1),
(23, '73-3C-BC-16', 1),
(24, '13-21-68-17', 1),
(26, '31-35-EF-9D', 1),
(27, '43-B7-FF-2B', 1),
(28, '53-60-80-2B', 1),
(29, 'D3-2C-71-90', 1),
(30, 'E4-BF-BD-89', 1),
(31, '10-23-BD-89', 1),
(32, '87-F3-BC-89', 1),
(33, '37-C8-B1-89', 1),
(34, '1D-A0-B1-89', 1),
(35, '83-E4-BD-89', 1),
(36, '15-CD-BD-89', 1),
(37, 'BA-99-BD-89', 1),
(38, '33-4D-A1-AC', 1),
(39, '33-7B-40-94', 1),
(40, '74-7E-4E-DB', 1),
(41, 'A3-F5-FB-1D', 1),
(42, 'A3-01-A6-89', 1),
(43, 'D3-39-35-94', 1),
(44, '93-2F-A5-89', 1),
(45, '36-57-A4-89', 1),
(46, '13-E5-A6-A9', 1),
(47, '93-5B-55-94', 1),
(48, '53-52-6A-A9', 1),
(49, 'C3-C0-4B-10', 1),
(50, '73-55-D3-95', 1),
(51, '9D-8C-B1-89', 1),
(52, 'F2-74-BD-89', 1),
(53, '75-0F-BE-89', 1),
(54, '91-EA-BC-89', 1),
(55, '03-48-BD-89', 1),
(58, '43-B6-A5-A9', 1),
(59, '63-B6-09-2A', 1),
(60, 'B3-1C-36-29', 1),
(61, '43-4E-E9-27', 0),
(62, '93-D8-CB-26', 0),
(63, '33-6A-E2-27', 1);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `usuarios`
--

CREATE TABLE `usuarios` (
  `id` int(11) NOT NULL,
  `nombre` text DEFAULT NULL,
  `usuario` text DEFAULT NULL,
  `password` text DEFAULT NULL,
  `perfil` text DEFAULT NULL,
  `foto` text NOT NULL,
  `estado` int(11) DEFAULT NULL,
  `ultimo_login` datetime DEFAULT NULL,
  `fecha` timestamp NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

--
-- Volcado de datos para la tabla `usuarios`
--

INSERT INTO `usuarios` (`id`, `nombre`, `usuario`, `password`, `perfil`, `foto`, `estado`, `ultimo_login`, `fecha`) VALUES
(1, 'admin', 'admin', '$2a$07$asxx54ahjppf45sd87a5au.6zUWJ2loJpowTAsimtoPTysOKql05a', 'admin', 'vistas/img/usuarios/admin/267.jpg', 1, '2024-05-21 12:18:59', '2024-05-21 18:18:59'),
(32, 'Victor Martinez', 'victormartinez', '$2a$07$asxx54ahjppf45sd87a5aucX9QLrX7LqE08N/8cMP1co8xJ6TGTSS', 'Administrador', '', 1, '2023-06-08 16:06:44', '2023-06-08 21:06:44'),
(33, 'Felipe Flores', 'felipeflores', '$2a$07$asxx54ahjppf45sd87a5auiuxYVD9LF.bHKR0ihQ371OAK1TGlf1O', 'Administrador', '', 1, '2024-04-23 16:09:22', '2024-04-23 21:09:22'),
(34, 'Joshua Vazquez', 'joshuavazquez', '$2a$07$asxx54ahjppf45sd87a5au.6zUWJ2loJpowTAsimtoPTysOKql05a', 'Administrador', '', 1, '2024-05-21 11:21:53', '2024-05-21 17:21:53'),
(36, 'Mirel Perez', 'mirell', '$2a$07$asxx54ahjppf45sd87a5auItxjmuKc/feQ0EjihcQ2jkXZCdBjUmW', 'Administrador', '', 1, '2024-05-21 10:34:30', '2024-05-21 15:34:30'),
(37, 'Luis Maldonado', 'luismaldonado', '$2a$07$asxx54ahjppf45sd87a5auXx.bNW08WCCUshVqHdBjn5cnYZr8ObO', 'Administrador', '', 1, '2024-04-23 13:57:48', '2024-04-23 18:57:48');

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `aperturas`
--
ALTER TABLE `aperturas`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `banner`
--
ALTER TABLE `banner`
  ADD PRIMARY KEY (`id_banner`);

--
-- Indices de la tabla `chapas`
--
ALTER TABLE `chapas`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `credenciales`
--
ALTER TABLE `credenciales`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `generadores`
--
ALTER TABLE `generadores`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `menu`
--
ALTER TABLE `menu`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `permisos`
--
ALTER TABLE `permisos`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `registro_usuarios`
--
ALTER TABLE `registro_usuarios`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `rfid_temp`
--
ALTER TABLE `rfid_temp`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `submenu`
--
ALTER TABLE `submenu`
  ADD PRIMARY KEY (`id`),
  ADD KEY `id_menu` (`id_menu`);

--
-- Indices de la tabla `tarjetas`
--
ALTER TABLE `tarjetas`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `usuarios`
--
ALTER TABLE `usuarios`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `aperturas`
--
ALTER TABLE `aperturas`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT de la tabla `banner`
--
ALTER TABLE `banner`
  MODIFY `id_banner` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=639;

--
-- AUTO_INCREMENT de la tabla `chapas`
--
ALTER TABLE `chapas`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT de la tabla `credenciales`
--
ALTER TABLE `credenciales`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT de la tabla `generadores`
--
ALTER TABLE `generadores`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT de la tabla `menu`
--
ALTER TABLE `menu`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=33;

--
-- AUTO_INCREMENT de la tabla `permisos`
--
ALTER TABLE `permisos`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=97;

--
-- AUTO_INCREMENT de la tabla `registro_usuarios`
--
ALTER TABLE `registro_usuarios`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=57;

--
-- AUTO_INCREMENT de la tabla `rfid_temp`
--
ALTER TABLE `rfid_temp`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT de la tabla `submenu`
--
ALTER TABLE `submenu`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT de la tabla `tarjetas`
--
ALTER TABLE `tarjetas`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=64;

--
-- AUTO_INCREMENT de la tabla `usuarios`
--
ALTER TABLE `usuarios`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=38;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
