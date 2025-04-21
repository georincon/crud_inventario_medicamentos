-- phpMyAdmin SQL Dump
-- version 4.8.3
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 07-02-2025 a las 01:16:27
-- Versión del servidor: 5.6.17
-- Versión de PHP: 5.5.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `crud_2025`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `medicamentos`
--

CREATE TABLE `medicamentos` (
  `id` INT NOT NULL,
  `nombre` VARCHAR(30) NOT NULL,
  `descripcion` VARCHAR(100) NOT NULL,
  `codigo` INT NOT NULL,
  `precio` DOUBLE NOT NULL,
  `stock` INT NOT NULL,
  `vencimiento` DATE NOT NULL,
  `laboratorio` VARCHAR(30) NOT NULL,
  `receta` TINYINT(1) NOT NULL
)ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

--
-- Volcado de datos para la tabla `medicamentos`
--

INSERT INTO `medicamentos` (`nombre`, `descripcion`, `codigo`, `precio`, `stock`, `vencimiento`, `laboratorio`, `receta`) VALUES 
('Paracetamol', 'Analgésico y antipirético', 10001, 3500.0, 200, '2026-12-31', 'Genfar', 0),
('Ibuprofeno', 'Antiinflamatorio no esteroideo', 10002, 4800.0, 150, '2025-11-15', 'MK', 0),
('Amoxicilina', 'Antibiótico penicilínico de amplio espectro', 10003, 12000.0, 100, '2025-09-30', 'Sandoz', 1),
('Losartán', 'Antihipertensivo', 10004, 8900.0, 80, '2027-01-10', 'Pfizer', 1),  
('Omeprazol', 'Inhibidor de la bomba de protones', 10005, 7600.0, 120, '2026-05-20', 'Tecnoquímicas', 0);
('Simvastatina', 'Hipolipemiante', 10006, 9500.0, 60, '2025-08-15', 'Bago', 1),
('Metformina', 'Antidiabético oral', 10007, 4300.0, 90, '2026-03-25', 'Bristol Myers Squibb', 0),
('Amlodipino', 'Antihipertensivo', 10008, 5400.0, 110, '2025-12-01', 'Novartis', 1),
('Cetirizina', 'Antihistamínico', 10009, 3200.0, 130, '2027-02-28', 'Sanofi', 0),
('Loratadina', 'Antihistamínico de segunda generación', 10010, 3700.0, 140, '2026-11-20', 'Roche', 0);
('Clonazepam', 'Ansiolítico', 10011, 4100.0, 70, '2025-07-15', 'Laboratorios LKM', 1),
('Sertralina', 'Antidepresivo ISRS', 10012, 5600.0, 50, '2026-04-10', 'Laboratorios Gador', 1);
--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `personas`
--
ALTER TABLE `medicamentos`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `medicamentos`
--
ALTER TABLE `medicamentos`
  MODIFY `id` INT NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
