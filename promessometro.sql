-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: localhost
-- Generation Time: Jan 26, 2026 at 04:05 PM
-- Server version: 10.4.32-MariaDB
-- PHP Version: 8.2.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `promessometro`
--

-- --------------------------------------------------------

--
-- Table structure for table `candidates`
--

CREATE TABLE `candidates` (
  `id` int(11) NOT NULL,
  `name` varchar(150) NOT NULL,
  `party_id` int(11) DEFAULT NULL,
  `state_id` int(11) NOT NULL,
  `position_id` int(11) NOT NULL,
  `active` tinyint(1) DEFAULT 1,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `parties`
--

CREATE TABLE `parties` (
  `id` int(11) NOT NULL,
  `name` varchar(255) DEFAULT NULL,
  `status` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `parties`
--

INSERT INTO `parties` (`id`, `name`, `status`) VALUES
(5, 'MOVIMENTO DEMOCRÁTICO BRASILEIRO (MDB)', 1),
(6, 'PARTIDO DEMOCRÁTICO TRABALHISTA (PDT)', 1),
(7, 'PARTIDO DOS TRABALHADORES (PT)', 1),
(8, 'PARTIDO COMUNISTA DO BRASIL (PCdoB)', 1),
(9, 'PARTIDO SOCIALISTA BRASILEIRO (PSB)', 1),
(11, 'PARTIDO DA SOCIAL DEMOCRACIA BRASILEIRA (PSDB)', 1),
(12, 'AGIR (AGIR)', 1),
(13, 'MOBILIZAÇÃO NACIONAL (MOBILIZA)', 1),
(14, 'CIDADANIA (CIDADANIA)', 1),
(15, 'PARTIDO VERDE (PV)', 1),
(16, 'AVANTE (AVANTE)', 1),
(17, 'PROGRESSISTAS (PP)', 1),
(18, 'PARTIDO SOCIALISTA DOS TRABALHADORES UNIFICADO (PSTU)', 1),
(19, 'PARTIDO COMUNISTA BRASILEIRO (PCB)', 1),
(20, 'PARTIDO RENOVADOR TRABALHISTA BRASILEIRO (PRTB)', 1),
(21, 'DEMOCRACIA CRISTÃ (DC)', 1),
(22, 'PARTIDO DA CAUSA OPERÁRIA (PCO)', 1),
(23, 'PODEMOS (PODE)', 1),
(24, 'REPUBLICANOS (REPUBLICANOS)', 1),
(25, 'PARTIDO SOCIALISMO E LIBERDADE (PSOL)', 1),
(26, 'PARTIDO LIBERAL (PL)', 1),
(27, 'PARTIDO SOCIAL DEMOCRÁTICO (PSD)', 1),
(28, 'SOLIDARIEDADE (SOLIDARIEDADE)', 1),
(29, 'PARTIDO NOVO (NOVO)', 1),
(30, 'REDE SUSTENTABILIDADE (REDE)', 1),
(31, 'O DEMOCRATA (O DEMOCRATA)', 1),
(32, 'UNIDADE POPULAR (UP)', 1),
(33, 'UNIÃO BRASIL (UNIÃO)', 1),
(34, 'PARTIDO RENOVAÇÃO DEMOCRÁTICA (PRD)', 1),
(35, 'PARTIDO MISSÃO (MISSÃO)', 1),
(36, 'SEM PARTIDO', 1);

-- --------------------------------------------------------

--
-- Table structure for table `positions`
--

CREATE TABLE `positions` (
  `id` int(11) NOT NULL,
  `name` varchar(100) NOT NULL,
  `status` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `positions`
--

INSERT INTO `positions` (`id`, `name`, `status`) VALUES
(1, 'Presidente da república', 1),
(3, 'Governador', 1),
(4, 'Senador', 1),
(5, 'Deputado estadual', 1),
(6, 'Deputado federal', 1),
(7, 'Vice presidente', 1),
(8, 'Vice governador', 1),
(9, '1º Suplente', 1),
(10, '2º Suplente', 1),
(11, 'Deputado distrital', 1);

-- --------------------------------------------------------

--
-- Table structure for table `promises`
--

CREATE TABLE `promises` (
  `id` int(11) NOT NULL,
  `candidate_id` int(11) NOT NULL,
  `title` varchar(255) NOT NULL,
  `description` text DEFAULT NULL,
  `source` varchar(500) DEFAULT NULL,
  `status` enum('pending','fulfilled','in_progress','delayed','not_fulfilled') DEFAULT 'pending',
  `approved` tinyint(1) DEFAULT 0,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `states`
--

CREATE TABLE `states` (
  `id` int(11) NOT NULL,
  `name` varchar(100) NOT NULL,
  `code` char(2) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `states`
--

INSERT INTO `states` (`id`, `name`, `code`) VALUES
(1, 'ACRE', 'AC'),
(2, 'ALAGOAS', 'AL'),
(3, 'AMAPÁ', 'AP'),
(5, 'AMAZONAS', 'AM'),
(6, 'BAHIA', 'BA'),
(7, 'CEARA', 'CE'),
(8, 'DISTRITO FEDERAL', 'DF'),
(9, 'ESPIRITO SANTO', 'ES'),
(10, 'GOIÁS', 'GO'),
(11, 'MARANHÃO', 'MA'),
(12, 'MATO GROSSO', 'MT'),
(13, 'MATO GROSSO DO SUL', 'MS'),
(14, 'MINAS GERAIS', 'MG'),
(15, 'PARÁ', 'PA'),
(16, 'PARAÍBA', 'PB'),
(17, 'PARANÁ', 'PR'),
(18, 'PERNAMBUCO', 'PE'),
(19, 'PIAUÍ', 'PI'),
(20, 'RIO DE JANEIRO', 'RJ'),
(21, 'RIO GRANDE DO NORTE', 'RN'),
(22, 'RIO GRANDE DO SUL', 'RS'),
(23, 'RONDÔNIA', 'RO'),
(24, 'RORAIMA', 'RR'),
(25, 'SANTA CATARINA', 'SC'),
(26, 'SÃO PAULO', 'SP'),
(27, 'SERGIPE', 'SE'),
(29, 'TOCANTINS', 'TO'),
(30, 'TODOS', '00');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `email` varchar(150) NOT NULL,
  `password` varchar(255) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `email`, `password`, `created_at`) VALUES
(1, 'admin', '[your-php-encrypt-password-here]', '2026-01-13 01:26:54');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `candidates`
--
ALTER TABLE `candidates`
  ADD PRIMARY KEY (`id`),
  ADD KEY `fk_candidate_state` (`state_id`),
  ADD KEY `fk_candidate_position` (`position_id`),
  ADD KEY `idx_candidates_name` (`name`);

--
-- Indexes for table `parties`
--
ALTER TABLE `parties`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `positions`
--
ALTER TABLE `positions`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `promises`
--
ALTER TABLE `promises`
  ADD PRIMARY KEY (`id`),
  ADD KEY `fk_promise_candidate` (`candidate_id`);

--
-- Indexes for table `states`
--
ALTER TABLE `states`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `code` (`code`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `email` (`email`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `candidates`
--
ALTER TABLE `candidates`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `parties`
--
ALTER TABLE `parties`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=37;

--
-- AUTO_INCREMENT for table `positions`
--
ALTER TABLE `positions`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT for table `promises`
--
ALTER TABLE `promises`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `states`
--
ALTER TABLE `states`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=31;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `candidates`
--
ALTER TABLE `candidates`
  ADD CONSTRAINT `fk_candidate_position` FOREIGN KEY (`position_id`) REFERENCES `positions` (`id`),
  ADD CONSTRAINT `fk_candidate_state` FOREIGN KEY (`state_id`) REFERENCES `states` (`id`);

--
-- Constraints for table `promises`
--
ALTER TABLE `promises`
  ADD CONSTRAINT `fk_promise_candidate` FOREIGN KEY (`candidate_id`) REFERENCES `candidates` (`id`) ON DELETE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
