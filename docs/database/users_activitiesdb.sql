-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 07-08-2022 a las 20:34:32
-- Versión del servidor: 10.4.22-MariaDB
-- Versión de PHP: 8.1.2

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `users_activitiesdb`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `activities`
--

CREATE TABLE `activities` (
  `Activity_ID` int(11) NOT NULL,
  `Company_ID` int(11) NOT NULL,
  `Facility_ID` int(11) NOT NULL,
  `Department_ID` int(11) NOT NULL,
  `State_ID` int(11) NOT NULL,
  `Date_Creation` datetime NOT NULL,
  `Date_Modification` datetime NOT NULL,
  `Start_Date` datetime NOT NULL,
  `End_Date` datetime NOT NULL,
  `Activity_Name` varchar(2000) COLLATE utf8_spanish_ci NOT NULL,
  `Number_Hours` varchar(50) COLLATE utf8_spanish_ci NOT NULL,
  `Start_Time` varchar(50) COLLATE utf8_spanish_ci NOT NULL,
  `End_Time` varchar(50) COLLATE utf8_spanish_ci NOT NULL,
  `Purpose` varchar(2000) COLLATE utf8_spanish_ci NOT NULL,
  `Responsible` varchar(100) COLLATE utf8_spanish_ci NOT NULL,
  `Cost` decimal(19,2) NOT NULL,
  `Location_Activity` varchar(3000) COLLATE utf8_spanish_ci NOT NULL,
  `Created_By` int(11) DEFAULT NULL,
  `Modified_By` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

--
-- Volcado de datos para la tabla `activities`
--

INSERT INTO `activities` (`Activity_ID`, `Company_ID`, `Facility_ID`, `Department_ID`, `State_ID`, `Date_Creation`, `Date_Modification`, `Start_Date`, `End_Date`, `Activity_Name`, `Number_Hours`, `Start_Time`, `End_Time`, `Purpose`, `Responsible`, `Cost`, `Location_Activity`, `Created_By`, `Modified_By`) VALUES
(4, 1, 1, 1, 1, '2022-07-18 02:30:18', '0000-00-00 00:00:00', '0000-00-00 00:00:00', '0000-00-00 00:00:00', 'Velada Navidenia Familiar', '48', '8:00 AM', '5:00 PM', 'Evento familiar para reunir a los familiares y amigos. Como por igual generar fondos.', 'Profesor. Andres Guerrero Cordero', '1000.00', 'Colegio Santa Rosa De Lima', 1, NULL),
(5, 1, 1, 1, 1, '2022-07-20 01:24:20', '0000-00-00 00:00:00', '0000-00-00 00:00:00', '0000-00-00 00:00:00', 'Kermes ', '48', '8:23 AM', '5:24 PM', 'Evento familiar para reunir a los familiares y amigos. Como por igual generar fondos.', 'Profesor. Andres Guerrero Cordero', '5000.00', 'Colegio Santa Rosa De Lima', 1, NULL),
(6, 1, 1, 1, 1, '2022-07-20 01:29:49', '0000-00-00 00:00:00', '2022-07-20 00:00:00', '2022-07-22 00:00:00', 'Kermes ', '48', '8:00 AM', '5:00 PM', 'Evento familiar para reunir a los familiares y amigos. Como por igual generar fondos.', 'Profesor. Andres Guerrero Cordero', '5000.00', 'Colegio Santa Rosa De Lima', 1, NULL);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `addresses`
--

CREATE TABLE `addresses` (
  `Address_ID` int(11) NOT NULL,
  `Employee_ID` int(11) NOT NULL,
  `Country_ID` int(11) NOT NULL,
  `Province_ID` int(11) NOT NULL,
  `Municipality_ID` int(11) NOT NULL,
  `City_ID` int(11) NOT NULL,
  `Sector_ID` int(11) NOT NULL,
  `Address` mediumtext COLLATE utf8_spanish_ci NOT NULL,
  `No_Residential` varchar(100) COLLATE utf8_spanish_ci NOT NULL,
  `Reference_Point` mediumtext COLLATE utf8_spanish_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `cities`
--

CREATE TABLE `cities` (
  `City_ID` int(11) NOT NULL,
  `Country_ID` int(11) NOT NULL,
  `Date_Creation` datetime DEFAULT NULL,
  `Date_Modification` datetime DEFAULT NULL,
  `City_Name` varchar(200) COLLATE utf8_spanish_ci NOT NULL,
  `Created_By` int(11) DEFAULT NULL,
  `Modified_By` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

--
-- Volcado de datos para la tabla `cities`
--

INSERT INTO `cities` (`City_ID`, `Country_ID`, `Date_Creation`, `Date_Modification`, `City_Name`, `Created_By`, `Modified_By`) VALUES
(1, 1, '2022-07-31 12:40:44', NULL, 'Santo Domingo', 1, NULL),
(2, 1, '2022-07-31 15:08:51', NULL, 'La Romana', 1, NULL);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `companies`
--

CREATE TABLE `companies` (
  `Company_ID` int(11) NOT NULL,
  `State_ID` int(11) NOT NULL,
  `Date_Creation` datetime NOT NULL,
  `Date_Modification` datetime NOT NULL,
  `Company_Name` varchar(500) COLLATE utf8_spanish_ci NOT NULL,
  `Abbreviation_Company` varchar(100) COLLATE utf8_spanish_ci NOT NULL,
  `Created_By` int(11) DEFAULT NULL,
  `Modified_By` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

--
-- Volcado de datos para la tabla `companies`
--

INSERT INTO `companies` (`Company_ID`, `State_ID`, `Date_Creation`, `Date_Modification`, `Company_Name`, `Abbreviation_Company`, `Created_By`, `Modified_By`) VALUES
(1, 1, '2022-07-13 05:39:12', '2022-07-13 05:39:12', 'Districto Escolar', 'DE', NULL, NULL),
(9, 1, '2022-07-15 00:17:38', '0000-00-00 00:00:00', 'Districto Escolar 2', 'DE2', 1, NULL),
(10, 1, '2022-07-15 00:18:41', '0000-00-00 00:00:00', 'Districto Escolar 3', 'DE3', 1, NULL),
(11, 1, '2022-07-15 00:19:29', '0000-00-00 00:00:00', 'Districto Escolar 4', 'DE4', 1, NULL),
(12, 1, '2022-07-15 00:30:07', '0000-00-00 00:00:00', 'Districto Escolar 5', 'DE5', 1, NULL),
(13, 1, '2022-07-15 00:33:59', '0000-00-00 00:00:00', 'Districto Escolar 6', 'DE6', 1, NULL),
(14, 1, '2022-07-15 00:40:54', '0000-00-00 00:00:00', 'Districto Escolar 7', 'DE7', 1, NULL),
(15, 1, '2022-07-15 00:42:48', '0000-00-00 00:00:00', 'Districto Escolar 8', 'DE8', 1, NULL),
(16, 1, '2022-07-15 00:58:59', '0000-00-00 00:00:00', 'Districto Escolar 8', 'DE8', 1, NULL),
(17, 1, '2022-07-15 01:01:49', '0000-00-00 00:00:00', '', '', 1, NULL),
(18, 1, '2022-07-15 01:01:49', '0000-00-00 00:00:00', '', '', 1, NULL),
(19, 1, '2022-07-15 01:02:24', '0000-00-00 00:00:00', 'Districto Escolar 9', 'DE9', 1, NULL),
(20, 1, '2022-07-15 19:49:32', '0000-00-00 00:00:00', 'Districto Escolar 10', 'DE10', 1, NULL),
(21, 1, '2022-07-15 19:51:43', '0000-00-00 00:00:00', 'Districto Escolar 11', 'DE11', 1, NULL),
(22, 1, '2022-07-15 19:53:11', '0000-00-00 00:00:00', 'Districto Escolar 12', 'DE12', 1, NULL);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `countries`
--

CREATE TABLE `countries` (
  `Country_ID` int(11) NOT NULL,
  `Date_Creation` datetime DEFAULT NULL,
  `Date_Modification` datetime DEFAULT NULL,
  `Country_Name` varchar(200) COLLATE utf8_spanish_ci NOT NULL,
  `Created_By` int(11) DEFAULT NULL,
  `Modified_By` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

--
-- Volcado de datos para la tabla `countries`
--

INSERT INTO `countries` (`Country_ID`, `Date_Creation`, `Date_Modification`, `Country_Name`, `Created_By`, `Modified_By`) VALUES
(1, '2022-07-31 12:38:13', NULL, 'Republica Dominicana', 1, NULL);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `departments`
--

CREATE TABLE `departments` (
  `Department_ID` int(11) NOT NULL,
  `Company_ID` int(11) NOT NULL,
  `Facility_ID` int(11) NOT NULL,
  `State_ID` int(11) NOT NULL,
  `Date_Creation` datetime NOT NULL,
  `Date_Modification` datetime NOT NULL,
  `Department_Name` varchar(150) COLLATE utf8_spanish_ci NOT NULL,
  `Abbreviation_Department` varchar(100) COLLATE utf8_spanish_ci NOT NULL,
  `Created_By` int(11) DEFAULT NULL,
  `Modified_By` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

--
-- Volcado de datos para la tabla `departments`
--

INSERT INTO `departments` (`Department_ID`, `Company_ID`, `Facility_ID`, `State_ID`, `Date_Creation`, `Date_Modification`, `Department_Name`, `Abbreviation_Department`, `Created_By`, `Modified_By`) VALUES
(1, 1, 1, 1, '2022-07-13 05:42:10', '2022-07-13 05:42:10', 'Tecnologia de la informacion', 'TIC', NULL, NULL),
(2, 1, 2, 1, '2022-07-16 22:28:52', '0000-00-00 00:00:00', 'Tecnologia de la Informacion', 'TIC', 1, NULL);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `employees`
--

CREATE TABLE `employees` (
  `Employee_ID` int(11) NOT NULL,
  `Company_ID` int(11) NOT NULL,
  `Facility_ID` int(11) NOT NULL,
  `Department_ID` int(11) NOT NULL,
  `Profession_ID` int(11) NOT NULL,
  `Position_ID` int(11) NOT NULL,
  `State_ID` int(11) NOT NULL,
  `Date_Creation` datetime DEFAULT NULL,
  `Date_Modification` datetime DEFAULT NULL,
  `Employee_Code` mediumtext COLLATE utf8_spanish_ci NOT NULL,
  `First_Name` varchar(50) COLLATE utf8_spanish_ci NOT NULL,
  `Second_Name` varchar(50) COLLATE utf8_spanish_ci DEFAULT NULL,
  `First_Surname` varchar(50) COLLATE utf8_spanish_ci NOT NULL,
  `Second_Surname` varchar(50) COLLATE utf8_spanish_ci NOT NULL,
  `Sex` tinyint(1) NOT NULL,
  `Identification_Card` varchar(20) COLLATE utf8_spanish_ci NOT NULL,
  `Birth_Date` date NOT NULL,
  `Age` int(11) NOT NULL,
  `Phone` varchar(20) COLLATE utf8_spanish_ci NOT NULL,
  `Cell_Phone` varchar(20) COLLATE utf8_spanish_ci NOT NULL,
  `Admission_Date` date NOT NULL,
  `Picture_URL` mediumtext COLLATE utf8_spanish_ci DEFAULT NULL,
  `Created _By` int(11) DEFAULT NULL,
  `Modified_By` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

--
-- Volcado de datos para la tabla `employees`
--

INSERT INTO `employees` (`Employee_ID`, `Company_ID`, `Facility_ID`, `Department_ID`, `Profession_ID`, `Position_ID`, `State_ID`, `Date_Creation`, `Date_Modification`, `Employee_Code`, `First_Name`, `Second_Name`, `First_Surname`, `Second_Surname`, `Sex`, `Identification_Card`, `Birth_Date`, `Age`, `Phone`, `Cell_Phone`, `Admission_Date`, `Picture_URL`, `Created _By`, `Modified_By`) VALUES
(1, 1, 1, 1, 1, 1, 1, '2022-07-13 06:18:00', '2022-07-13 06:18:00', 'TIC-0001', 'Andres', 'Eugenio', 'Guerrero', 'Cordero', 0, '402-2793654-5', '1997-07-04', 25, '(829) 556 4777', '(809) 341 8220', '2022-07-13', '', NULL, NULL);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `facilities`
--

CREATE TABLE `facilities` (
  `Facility_ID` int(11) NOT NULL,
  `Company_ID` int(11) NOT NULL,
  `State_ID` int(11) NOT NULL,
  `Date_Created` datetime NOT NULL,
  `Date_Modification` datetime NOT NULL,
  `Facility_Name` varchar(500) COLLATE utf8_spanish_ci NOT NULL,
  `Abbreviation_Facility` varchar(100) COLLATE utf8_spanish_ci NOT NULL,
  `Created_By` int(11) DEFAULT NULL,
  `Modified_By` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

--
-- Volcado de datos para la tabla `facilities`
--

INSERT INTO `facilities` (`Facility_ID`, `Company_ID`, `State_ID`, `Date_Created`, `Date_Modification`, `Facility_Name`, `Abbreviation_Facility`, `Created_By`, `Modified_By`) VALUES
(1, 1, 1, '2022-07-13 05:41:39', '2022-07-13 05:41:39', 'Districto Escolar Santo Domingo', 'DESD', NULL, NULL),
(2, 1, 1, '2022-07-16 19:14:06', '0000-00-00 00:00:00', 'Districto Escolar La Romana', 'DELR', 1, NULL);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `municipalities`
--

CREATE TABLE `municipalities` (
  `Municipality_ID` int(11) NOT NULL,
  `Province_ID` int(11) NOT NULL,
  `Date_Creation` datetime DEFAULT NULL,
  `Date_Modification` datetime DEFAULT NULL,
  `Municipality_Name` varchar(200) COLLATE utf8_spanish_ci NOT NULL,
  `Created_By` int(11) DEFAULT NULL,
  `Modified_By` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

--
-- Volcado de datos para la tabla `municipalities`
--

INSERT INTO `municipalities` (`Municipality_ID`, `Province_ID`, `Date_Creation`, `Date_Modification`, `Municipality_Name`, `Created_By`, `Modified_By`) VALUES
(1, 3, '2022-07-31 15:07:58', NULL, 'La Romana', 1, NULL);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `positions`
--

CREATE TABLE `positions` (
  `Position_ID` int(11) NOT NULL,
  `State_ID` int(11) NOT NULL,
  `Date_Creation` datetime NOT NULL,
  `Date_Modification` datetime NOT NULL,
  `Position` varchar(100) COLLATE utf8_spanish_ci NOT NULL,
  `Created_By` int(11) DEFAULT NULL,
  `Modified_By` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

--
-- Volcado de datos para la tabla `positions`
--

INSERT INTO `positions` (`Position_ID`, `State_ID`, `Date_Creation`, `Date_Modification`, `Position`, `Created_By`, `Modified_By`) VALUES
(1, 1, '2022-07-13 05:45:00', '2022-07-13 05:45:00', 'Programador FullStack', NULL, NULL),
(2, 1, '2022-07-30 23:46:48', '0000-00-00 00:00:00', 'Programador Junior', 1, NULL),
(3, 1, '2022-07-30 23:46:59', '0000-00-00 00:00:00', 'Programador Senior', 1, NULL),
(4, 1, '2022-07-30 23:47:11', '0000-00-00 00:00:00', 'Encargado de Proyectos', 1, NULL);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `professions`
--

CREATE TABLE `professions` (
  `Profession_ID` int(11) NOT NULL,
  `State_ID` int(11) NOT NULL,
  `Date_Creation` datetime NOT NULL,
  `Date_Modification` datetime NOT NULL,
  `Profession` varchar(100) COLLATE utf8_spanish_ci NOT NULL,
  `Created_By` int(11) DEFAULT NULL,
  `Modified_By` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

--
-- Volcado de datos para la tabla `professions`
--

INSERT INTO `professions` (`Profession_ID`, `State_ID`, `Date_Creation`, `Date_Modification`, `Profession`, `Created_By`, `Modified_By`) VALUES
(1, 1, '2022-07-13 05:44:30', '2022-07-13 05:44:30', 'Ingenieria de Software', NULL, NULL),
(2, 1, '2022-07-28 00:16:25', '0000-00-00 00:00:00', 'Ingenieria de Software', 1, NULL),
(3, 1, '2022-07-30 12:41:31', '0000-00-00 00:00:00', 'Ingenieria Civil', 1, NULL);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `provinces`
--

CREATE TABLE `provinces` (
  `Province_ID` int(11) NOT NULL,
  `City_ID` int(11) NOT NULL,
  `Date_Creation` datetime DEFAULT NULL,
  `Date_Modification` datetime DEFAULT NULL,
  `Province_Name` varchar(200) COLLATE utf8_spanish_ci NOT NULL,
  `Created_By` int(11) DEFAULT NULL,
  `Modified_By` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

--
-- Volcado de datos para la tabla `provinces`
--

INSERT INTO `provinces` (`Province_ID`, `City_ID`, `Date_Creation`, `Date_Modification`, `Province_Name`, `Created_By`, `Modified_By`) VALUES
(3, 2, '2022-07-31 14:07:14', NULL, 'La Romana', 1, NULL);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `roles`
--

CREATE TABLE `roles` (
  `Rol_ID` int(11) NOT NULL,
  `State_ID` int(11) NOT NULL,
  `Date_Creation` datetime NOT NULL,
  `Date_Modification` datetime NOT NULL,
  `Rol` mediumtext COLLATE utf8_spanish_ci NOT NULL,
  `Created_By` int(11) DEFAULT NULL,
  `Modified_By` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

--
-- Volcado de datos para la tabla `roles`
--

INSERT INTO `roles` (`Rol_ID`, `State_ID`, `Date_Creation`, `Date_Modification`, `Rol`, `Created_By`, `Modified_By`) VALUES
(1, 1, '2022-07-13 05:36:19', '2022-07-13 05:36:19', 'Admin', NULL, NULL),
(2, 1, '2022-07-30 15:08:35', '0000-00-00 00:00:00', '1', 1, NULL),
(3, 1, '2022-07-30 15:09:14', '0000-00-00 00:00:00', 'Tecnico', 1, NULL);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `sectors`
--

CREATE TABLE `sectors` (
  `Sector_ID` int(11) NOT NULL,
  `Municipality_ID` int(11) NOT NULL,
  `Date_Creation` datetime DEFAULT NULL,
  `Date_Modification` datetime DEFAULT NULL,
  `Sector_Name` varchar(1000) COLLATE utf8_spanish_ci NOT NULL,
  `Created_By` int(11) DEFAULT NULL,
  `Modified_By` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

--
-- Volcado de datos para la tabla `sectors`
--

INSERT INTO `sectors` (`Sector_ID`, `Municipality_ID`, `Date_Creation`, `Date_Modification`, `Sector_Name`, `Created_By`, `Modified_By`) VALUES
(2, 1, '2022-07-31 18:25:26', NULL, 'Bancola', 1, NULL),
(3, 1, '2022-07-31 18:26:56', NULL, 'Papagayo', 1, NULL),
(4, 1, '2022-07-31 18:29:57', NULL, 'Altos de Rio Dulce', 1, NULL);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `states`
--

CREATE TABLE `states` (
  `State_ID` int(11) NOT NULL,
  `Date_Creation` datetime NOT NULL,
  `Date_Modification` datetime NOT NULL,
  `State` varchar(100) COLLATE utf8_spanish_ci NOT NULL,
  `Created_By` int(11) DEFAULT NULL,
  `Modified_By` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

--
-- Volcado de datos para la tabla `states`
--

INSERT INTO `states` (`State_ID`, `Date_Creation`, `Date_Modification`, `State`, `Created_By`, `Modified_By`) VALUES
(1, '2022-07-13 05:34:42', '2022-07-13 05:34:42', 'Activo', NULL, NULL),
(2, '2022-07-30 22:26:47', '0000-00-00 00:00:00', 'En Proceso', 1, NULL),
(3, '2022-07-30 22:27:08', '0000-00-00 00:00:00', 'Completado', 1, NULL),
(4, '2022-07-30 22:27:19', '0000-00-00 00:00:00', 'Cancelado', 1, NULL),
(5, '2022-07-30 22:27:45', '0000-00-00 00:00:00', 'Inhabilitado', 1, NULL),
(6, '2022-07-30 22:28:04', '0000-00-00 00:00:00', 'Eliminado', 1, NULL);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `systems`
--

CREATE TABLE `systems` (
  `System_ID` int(11) NOT NULL,
  `State_ID` int(11) NOT NULL,
  `Date_Creation` datetime NOT NULL,
  `Date_Modification` datetime NOT NULL,
  `System_Name` mediumtext COLLATE utf8_spanish_ci NOT NULL,
  `Created_By` int(11) NOT NULL,
  `Modified_By` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `users`
--

CREATE TABLE `users` (
  `User_ID` int(11) NOT NULL,
  `Company_ID` int(11) NOT NULL,
  `Facility_ID` int(11) NOT NULL,
  `Department_ID` int(11) NOT NULL,
  `Rol_ID` int(11) NOT NULL,
  `Employee_ID` int(11) NOT NULL,
  `State_ID` int(11) NOT NULL,
  `User_Name` varchar(200) COLLATE utf8_spanish_ci NOT NULL,
  `Password` varchar(200) COLLATE utf8_spanish_ci NOT NULL,
  `Email` varchar(200) COLLATE utf8_spanish_ci NOT NULL,
  `Picture_Profile` mediumtext COLLATE utf8_spanish_ci DEFAULT NULL,
  `Date_Creation` datetime NOT NULL,
  `Date_Modification` datetime NOT NULL,
  `Created_By` int(11) DEFAULT NULL,
  `Modified_By` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

--
-- Volcado de datos para la tabla `users`
--

INSERT INTO `users` (`User_ID`, `Company_ID`, `Facility_ID`, `Department_ID`, `Rol_ID`, `Employee_ID`, `State_ID`, `User_Name`, `Password`, `Email`, `Picture_Profile`, `Date_Creation`, `Date_Modification`, `Created_By`, `Modified_By`) VALUES
(1, 1, 1, 1, 1, 1, 1, 'AndresGc1997', 'Ag%04071997/*', 'andresgc1997@outlook.com', NULL, '2022-07-13 06:19:54', '2022-07-13 06:19:54', NULL, NULL);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `users_systems`
--

CREATE TABLE `users_systems` (
  `User_System_ID` int(11) NOT NULL,
  `State_ID` int(11) NOT NULL,
  `Date_Creation` datetime NOT NULL,
  `Date_Modification` datetime NOT NULL,
  `User_ID` int(11) NOT NULL,
  `System_ID` int(11) NOT NULL,
  `Created_By` int(11) NOT NULL,
  `Modified_By` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `activities`
--
ALTER TABLE `activities`
  ADD PRIMARY KEY (`Activity_ID`),
  ADD KEY `Activities_Companies` (`Company_ID`),
  ADD KEY `Activities_States` (`State_ID`),
  ADD KEY `Activities_Facilities` (`Facility_ID`),
  ADD KEY `Activities_Departments` (`Department_ID`),
  ADD KEY `Activities_Users_Created_By` (`Created_By`),
  ADD KEY `Activities_Users_Modified_By` (`Modified_By`);

--
-- Indices de la tabla `addresses`
--
ALTER TABLE `addresses`
  ADD PRIMARY KEY (`Address_ID`),
  ADD KEY `Employee_ID` (`Employee_ID`),
  ADD KEY `Country_ID` (`Country_ID`),
  ADD KEY `Province_ID` (`Province_ID`),
  ADD KEY `Municipality_ID` (`Municipality_ID`),
  ADD KEY `City_ID` (`City_ID`),
  ADD KEY `Sector_ID` (`Sector_ID`);

--
-- Indices de la tabla `cities`
--
ALTER TABLE `cities`
  ADD PRIMARY KEY (`City_ID`),
  ADD KEY `Created_By` (`Created_By`),
  ADD KEY `Modified_By` (`Modified_By`),
  ADD KEY `Country_ID` (`Country_ID`);

--
-- Indices de la tabla `companies`
--
ALTER TABLE `companies`
  ADD PRIMARY KEY (`Company_ID`),
  ADD KEY `State_ID` (`State_ID`),
  ADD KEY `Created_By` (`Created_By`),
  ADD KEY `Modified_By` (`Modified_By`);

--
-- Indices de la tabla `countries`
--
ALTER TABLE `countries`
  ADD PRIMARY KEY (`Country_ID`),
  ADD KEY `Countries_Users_Created_By` (`Created_By`),
  ADD KEY `Countries_Users_Modified_By` (`Modified_By`);

--
-- Indices de la tabla `departments`
--
ALTER TABLE `departments`
  ADD PRIMARY KEY (`Department_ID`),
  ADD KEY `Departments_Company` (`Company_ID`),
  ADD KEY `Departments_Facility` (`Facility_ID`),
  ADD KEY `Departments_Users_Created_By` (`Created_By`),
  ADD KEY `Departments_Users_Modified_By` (`Modified_By`),
  ADD KEY `Departments_States` (`State_ID`);

--
-- Indices de la tabla `employees`
--
ALTER TABLE `employees`
  ADD PRIMARY KEY (`Employee_ID`),
  ADD KEY `Company_ID` (`Company_ID`),
  ADD KEY `Facility_ID` (`Facility_ID`),
  ADD KEY `Position_ID` (`Position_ID`),
  ADD KEY `Profession_ID` (`Profession_ID`),
  ADD KEY `Department_ID` (`Department_ID`),
  ADD KEY `State_ID` (`State_ID`),
  ADD KEY `Created _By` (`Created _By`),
  ADD KEY `Modified_By` (`Modified_By`);

--
-- Indices de la tabla `facilities`
--
ALTER TABLE `facilities`
  ADD PRIMARY KEY (`Facility_ID`),
  ADD KEY `Company_ID` (`Company_ID`),
  ADD KEY `State_ID` (`State_ID`),
  ADD KEY `Created_By` (`Created_By`),
  ADD KEY `Modified_By` (`Modified_By`);

--
-- Indices de la tabla `municipalities`
--
ALTER TABLE `municipalities`
  ADD PRIMARY KEY (`Municipality_ID`),
  ADD KEY `Created_By` (`Created_By`),
  ADD KEY `Modified_By` (`Modified_By`),
  ADD KEY `Province_ID` (`Province_ID`);

--
-- Indices de la tabla `positions`
--
ALTER TABLE `positions`
  ADD PRIMARY KEY (`Position_ID`),
  ADD KEY `State_ID` (`State_ID`),
  ADD KEY `Created_By` (`Created_By`),
  ADD KEY `Modified_By` (`Modified_By`);

--
-- Indices de la tabla `professions`
--
ALTER TABLE `professions`
  ADD PRIMARY KEY (`Profession_ID`),
  ADD KEY `State_ID` (`State_ID`),
  ADD KEY `Created_By` (`Created_By`),
  ADD KEY `Modified_By` (`Modified_By`);

--
-- Indices de la tabla `provinces`
--
ALTER TABLE `provinces`
  ADD PRIMARY KEY (`Province_ID`),
  ADD KEY `Created_By` (`Created_By`),
  ADD KEY `Modified_By` (`Modified_By`),
  ADD KEY `City_ID` (`City_ID`);

--
-- Indices de la tabla `roles`
--
ALTER TABLE `roles`
  ADD PRIMARY KEY (`Rol_ID`),
  ADD KEY `State_ID` (`State_ID`),
  ADD KEY `Created_By` (`Created_By`),
  ADD KEY `Modified_By` (`Modified_By`);

--
-- Indices de la tabla `sectors`
--
ALTER TABLE `sectors`
  ADD PRIMARY KEY (`Sector_ID`),
  ADD KEY `Created_By` (`Created_By`),
  ADD KEY `Modified_By` (`Modified_By`),
  ADD KEY `Municipality_ID` (`Municipality_ID`);

--
-- Indices de la tabla `states`
--
ALTER TABLE `states`
  ADD PRIMARY KEY (`State_ID`),
  ADD KEY `Created_By` (`Created_By`),
  ADD KEY `Modified_By` (`Modified_By`);

--
-- Indices de la tabla `systems`
--
ALTER TABLE `systems`
  ADD PRIMARY KEY (`System_ID`),
  ADD KEY `State_ID` (`State_ID`),
  ADD KEY `Created_By` (`Created_By`),
  ADD KEY `Modified_By` (`Modified_By`);

--
-- Indices de la tabla `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`User_ID`),
  ADD KEY `Company_ID` (`Company_ID`),
  ADD KEY `Facility_ID` (`Facility_ID`),
  ADD KEY `Department_ID` (`Department_ID`),
  ADD KEY `Rol_ID` (`Rol_ID`),
  ADD KEY `Employee_ID` (`Employee_ID`),
  ADD KEY `State_ID` (`State_ID`),
  ADD KEY `Created_By` (`Created_By`),
  ADD KEY `Modified_By` (`Modified_By`);

--
-- Indices de la tabla `users_systems`
--
ALTER TABLE `users_systems`
  ADD PRIMARY KEY (`User_System_ID`),
  ADD KEY `State_ID` (`State_ID`),
  ADD KEY `User_ID` (`User_ID`),
  ADD KEY `System_ID` (`System_ID`),
  ADD KEY `Created_By` (`Created_By`),
  ADD KEY `Modified_By` (`Modified_By`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `activities`
--
ALTER TABLE `activities`
  MODIFY `Activity_ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT de la tabla `addresses`
--
ALTER TABLE `addresses`
  MODIFY `Address_ID` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `cities`
--
ALTER TABLE `cities`
  MODIFY `City_ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT de la tabla `companies`
--
ALTER TABLE `companies`
  MODIFY `Company_ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=23;

--
-- AUTO_INCREMENT de la tabla `countries`
--
ALTER TABLE `countries`
  MODIFY `Country_ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT de la tabla `departments`
--
ALTER TABLE `departments`
  MODIFY `Department_ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT de la tabla `employees`
--
ALTER TABLE `employees`
  MODIFY `Employee_ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT de la tabla `facilities`
--
ALTER TABLE `facilities`
  MODIFY `Facility_ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT de la tabla `municipalities`
--
ALTER TABLE `municipalities`
  MODIFY `Municipality_ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT de la tabla `positions`
--
ALTER TABLE `positions`
  MODIFY `Position_ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT de la tabla `professions`
--
ALTER TABLE `professions`
  MODIFY `Profession_ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT de la tabla `provinces`
--
ALTER TABLE `provinces`
  MODIFY `Province_ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT de la tabla `roles`
--
ALTER TABLE `roles`
  MODIFY `Rol_ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT de la tabla `sectors`
--
ALTER TABLE `sectors`
  MODIFY `Sector_ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT de la tabla `states`
--
ALTER TABLE `states`
  MODIFY `State_ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT de la tabla `systems`
--
ALTER TABLE `systems`
  MODIFY `System_ID` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `users`
--
ALTER TABLE `users`
  MODIFY `User_ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT de la tabla `users_systems`
--
ALTER TABLE `users_systems`
  MODIFY `User_System_ID` int(11) NOT NULL AUTO_INCREMENT;

--
-- Restricciones para tablas volcadas
--

--
-- Filtros para la tabla `activities`
--
ALTER TABLE `activities`
  ADD CONSTRAINT `Activities_Companies` FOREIGN KEY (`Company_ID`) REFERENCES `companies` (`Company_ID`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `Activities_Departments` FOREIGN KEY (`Department_ID`) REFERENCES `departments` (`Department_ID`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `Activities_Facilities` FOREIGN KEY (`Facility_ID`) REFERENCES `facilities` (`Facility_ID`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `Activities_States` FOREIGN KEY (`State_ID`) REFERENCES `states` (`State_ID`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `Activities_Users_Created_By` FOREIGN KEY (`Created_By`) REFERENCES `users` (`User_ID`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `Activities_Users_Modified_By` FOREIGN KEY (`Modified_By`) REFERENCES `users` (`User_ID`);

--
-- Filtros para la tabla `addresses`
--
ALTER TABLE `addresses`
  ADD CONSTRAINT `Address_Cities` FOREIGN KEY (`City_ID`) REFERENCES `cities` (`City_ID`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `Address_Countries` FOREIGN KEY (`Country_ID`) REFERENCES `countries` (`Country_ID`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `Address_Employees` FOREIGN KEY (`Employee_ID`) REFERENCES `employees` (`Employee_ID`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `Address_Municipalities` FOREIGN KEY (`Municipality_ID`) REFERENCES `municipalities` (`Municipality_ID`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `Address_Provinces` FOREIGN KEY (`Province_ID`) REFERENCES `provinces` (`Province_ID`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `Address_Sectors` FOREIGN KEY (`Sector_ID`) REFERENCES `sectors` (`Sector_ID`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Filtros para la tabla `cities`
--
ALTER TABLE `cities`
  ADD CONSTRAINT `Cities_Countries` FOREIGN KEY (`Country_ID`) REFERENCES `countries` (`Country_ID`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `Cities_Created_By` FOREIGN KEY (`Created_By`) REFERENCES `users` (`User_ID`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `Cities_Modified_By` FOREIGN KEY (`Modified_By`) REFERENCES `users` (`User_ID`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Filtros para la tabla `companies`
--
ALTER TABLE `companies`
  ADD CONSTRAINT `Companies_States` FOREIGN KEY (`State_ID`) REFERENCES `states` (`State_ID`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `Companies_Users_Created_By` FOREIGN KEY (`Created_By`) REFERENCES `users` (`User_ID`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `Companies_Users_Modified_By` FOREIGN KEY (`Modified_By`) REFERENCES `users` (`User_ID`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Filtros para la tabla `countries`
--
ALTER TABLE `countries`
  ADD CONSTRAINT `Countries_Users_Created_By` FOREIGN KEY (`Created_By`) REFERENCES `users` (`User_ID`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `Countries_Users_Modified_By` FOREIGN KEY (`Modified_By`) REFERENCES `users` (`User_ID`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Filtros para la tabla `departments`
--
ALTER TABLE `departments`
  ADD CONSTRAINT `Departments_Company` FOREIGN KEY (`Company_ID`) REFERENCES `companies` (`Company_ID`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `Departments_Facility` FOREIGN KEY (`Facility_ID`) REFERENCES `facilities` (`Facility_ID`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `Departments_States` FOREIGN KEY (`State_ID`) REFERENCES `states` (`State_ID`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `Departments_Users_Created_By` FOREIGN KEY (`Created_By`) REFERENCES `users` (`User_ID`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `Departments_Users_Modified_By` FOREIGN KEY (`Modified_By`) REFERENCES `users` (`User_ID`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Filtros para la tabla `employees`
--
ALTER TABLE `employees`
  ADD CONSTRAINT `Employees_Companies` FOREIGN KEY (`Company_ID`) REFERENCES `companies` (`Company_ID`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `Employees_Departments` FOREIGN KEY (`Department_ID`) REFERENCES `departments` (`Department_ID`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `Employees_Facilities` FOREIGN KEY (`Facility_ID`) REFERENCES `facilities` (`Facility_ID`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `Employees_Positions` FOREIGN KEY (`Position_ID`) REFERENCES `positions` (`Position_ID`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `Employees_Professions` FOREIGN KEY (`Profession_ID`) REFERENCES `professions` (`Profession_ID`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `Employees_States` FOREIGN KEY (`State_ID`) REFERENCES `states` (`State_ID`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `Employees_Users_Created_By` FOREIGN KEY (`Created _By`) REFERENCES `users` (`User_ID`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `Employees_Users_Modified_By` FOREIGN KEY (`Modified_By`) REFERENCES `users` (`User_ID`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Filtros para la tabla `facilities`
--
ALTER TABLE `facilities`
  ADD CONSTRAINT `Facilities_Companies` FOREIGN KEY (`Company_ID`) REFERENCES `companies` (`Company_ID`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `Facilities_States` FOREIGN KEY (`State_ID`) REFERENCES `states` (`State_ID`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `Facilities_Users_Created_By` FOREIGN KEY (`Created_By`) REFERENCES `users` (`User_ID`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `Facilities_Users_Modified_By` FOREIGN KEY (`Modified_By`) REFERENCES `users` (`User_ID`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Filtros para la tabla `municipalities`
--
ALTER TABLE `municipalities`
  ADD CONSTRAINT `Municipalities_Provinces` FOREIGN KEY (`Province_ID`) REFERENCES `provinces` (`Province_ID`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `Municipalities_Users_Created_By` FOREIGN KEY (`Created_By`) REFERENCES `users` (`User_ID`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `Municipalities_Users_Modified_By` FOREIGN KEY (`Modified_By`) REFERENCES `users` (`User_ID`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Filtros para la tabla `positions`
--
ALTER TABLE `positions`
  ADD CONSTRAINT `Positions_States` FOREIGN KEY (`State_ID`) REFERENCES `states` (`State_ID`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `Positions_Users_Created_By` FOREIGN KEY (`Created_By`) REFERENCES `users` (`User_ID`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `Positions_Users_Modified_By` FOREIGN KEY (`Modified_By`) REFERENCES `users` (`User_ID`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Filtros para la tabla `professions`
--
ALTER TABLE `professions`
  ADD CONSTRAINT `Professions_States` FOREIGN KEY (`State_ID`) REFERENCES `states` (`State_ID`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `Professions_Users_Created_By` FOREIGN KEY (`Created_By`) REFERENCES `users` (`User_ID`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `Professions_Users_Modified_By` FOREIGN KEY (`Modified_By`) REFERENCES `users` (`User_ID`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Filtros para la tabla `provinces`
--
ALTER TABLE `provinces`
  ADD CONSTRAINT `Provinces_Cities` FOREIGN KEY (`City_ID`) REFERENCES `cities` (`City_ID`),
  ADD CONSTRAINT `Provinces_Users_Created_BY` FOREIGN KEY (`Created_By`) REFERENCES `users` (`User_ID`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `Provinces_Users_Modified_By` FOREIGN KEY (`Modified_By`) REFERENCES `users` (`User_ID`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Filtros para la tabla `roles`
--
ALTER TABLE `roles`
  ADD CONSTRAINT `Roles_States` FOREIGN KEY (`State_ID`) REFERENCES `states` (`State_ID`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `Roles_Users_Created_By` FOREIGN KEY (`Created_By`) REFERENCES `users` (`User_ID`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `Roles_Users_Modified_By` FOREIGN KEY (`Modified_By`) REFERENCES `users` (`User_ID`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Filtros para la tabla `sectors`
--
ALTER TABLE `sectors`
  ADD CONSTRAINT `Sectors_Municipalities` FOREIGN KEY (`Municipality_ID`) REFERENCES `municipalities` (`Municipality_ID`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `Sectors_Users_Created_By` FOREIGN KEY (`Created_By`) REFERENCES `users` (`User_ID`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `Sectors_Users_Modified_By` FOREIGN KEY (`Modified_By`) REFERENCES `users` (`User_ID`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Filtros para la tabla `states`
--
ALTER TABLE `states`
  ADD CONSTRAINT `States_Users_Created_By` FOREIGN KEY (`Created_By`) REFERENCES `users` (`User_ID`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `States_Users_Modified_By` FOREIGN KEY (`Modified_By`) REFERENCES `users` (`User_ID`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Filtros para la tabla `systems`
--
ALTER TABLE `systems`
  ADD CONSTRAINT `Systems_States` FOREIGN KEY (`State_ID`) REFERENCES `states` (`State_ID`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `Systems_Users_Created_By` FOREIGN KEY (`Created_By`) REFERENCES `users` (`User_ID`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `Systems_Users_Modified_By` FOREIGN KEY (`Modified_By`) REFERENCES `users` (`User_ID`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Filtros para la tabla `users`
--
ALTER TABLE `users`
  ADD CONSTRAINT `Users_Companies` FOREIGN KEY (`Company_ID`) REFERENCES `companies` (`Company_ID`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `Users_Departments` FOREIGN KEY (`Department_ID`) REFERENCES `departments` (`Department_ID`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `Users_Employees` FOREIGN KEY (`Employee_ID`) REFERENCES `employees` (`Employee_ID`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `Users_Facilities` FOREIGN KEY (`Facility_ID`) REFERENCES `facilities` (`Facility_ID`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `Users_Roles` FOREIGN KEY (`Rol_ID`) REFERENCES `roles` (`Rol_ID`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `Users_States` FOREIGN KEY (`State_ID`) REFERENCES `states` (`State_ID`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Filtros para la tabla `users_systems`
--
ALTER TABLE `users_systems`
  ADD CONSTRAINT `Users_Systems_States` FOREIGN KEY (`State_ID`) REFERENCES `states` (`State_ID`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `Users_Systems_Systems` FOREIGN KEY (`System_ID`) REFERENCES `systems` (`System_ID`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `Users_Systems_Users` FOREIGN KEY (`User_ID`) REFERENCES `users` (`User_ID`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `Users_Systems_Users_Created_By` FOREIGN KEY (`Created_By`) REFERENCES `users` (`User_ID`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `Users_Systems_Users_Modified_By` FOREIGN KEY (`Modified_By`) REFERENCES `users` (`User_ID`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
