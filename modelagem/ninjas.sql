-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Tempo de geração: 11/11/2024 às 22:15
-- Versão do servidor: 10.4.32-MariaDB
-- Versão do PHP: 8.0.30

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Banco de dados: `ninjas`
--

-- --------------------------------------------------------

--
-- Estrutura para tabela `pontos_guilda`
--

CREATE TABLE `pontos_guilda` (
  `id` int(11) NOT NULL,
  `ninja` varchar(50) NOT NULL,
  `preco` int(11) NOT NULL,
  `fragmentos_atual` int(11) NOT NULL,
  `fragmentos_total` int(11) NOT NULL,
  `saldo` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Despejando dados para a tabela `pontos_guilda`
--

INSERT INTO `pontos_guilda` (`id`, `ninja`, `preco`, `fragmentos_atual`, `fragmentos_total`, `saldo`) VALUES
(1, 'Naruto sennin', 750, 26, 200, 260),
(2, 'Konan', 150, 26, 200, NULL),
(3, 'Ohnoki', 300, 9, 200, NULL),
(4, 'Sakura ggn', 200, 89, 100, 890);

-- --------------------------------------------------------

--
-- Estrutura para tabela `pontos_lua`
--

CREATE TABLE `pontos_lua` (
  `id` int(11) NOT NULL,
  `ninja` varchar(50) NOT NULL,
  `preco` int(11) NOT NULL,
  `fragmentos_atual` int(11) NOT NULL,
  `fragmentos_total` int(11) NOT NULL,
  `saldo` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Despejando dados para a tabela `pontos_lua`
--

INSERT INTO `pontos_lua` (`id`, `ninja`, `preco`, `fragmentos_atual`, `fragmentos_total`, `saldo`) VALUES
(1, 'Hanzo', 1300, 87, 100, 870),
(2, 'Nagato', 1300, 71, 100, 710);

-- --------------------------------------------------------

--
-- Estrutura para tabela `pontos_sol`
--

CREATE TABLE `pontos_sol` (
  `id` int(11) NOT NULL,
  `ninja` varchar(50) NOT NULL,
  `preco` int(11) NOT NULL,
  `fragmentos_atual` int(11) NOT NULL,
  `fragmentos_total` int(11) NOT NULL,
  `saldo` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Despejando dados para a tabela `pontos_sol`
--

INSERT INTO `pontos_sol` (`id`, `ninja`, `preco`, `fragmentos_atual`, `fragmentos_total`, `saldo`) VALUES
(1, 'Chojuro', 200, 16, 100, 160),
(2, 'Omoi', 200, 31, 100, NULL),
(3, 'Samui', 200, 0, 200, NULL),
(4, 'Kushina', 400, 6, 50, 60),
(5, 'Fuguki', 200, 3, 100, 30),
(6, 'Samui', 200, 0, 200, NULL),
(7, 'Kushina', 400, 6, 50, 60),
(8, 'Utakata', 400, 8, 100, NULL),
(9, 'Jinpachi', 200, 1, 100, 10),
(10, 'Kushimaru', 200, 2, 100, 20),
(11, 'Mangetsu', 200, 6, 100, NULL),
(12, 'Toroi', 150, 80, 80, NULL),
(13, 'Fuguki', 200, 0, 100, NULL);

-- --------------------------------------------------------

--
-- Estrutura para tabela `treino_sobrevivencia`
--

CREATE TABLE `treino_sobrevivencia` (
  `id` int(11) NOT NULL,
  `ninja` varchar(50) NOT NULL,
  `preco` int(11) NOT NULL,
  `fragmentos_atual` int(11) NOT NULL,
  `fragmentos_total` int(11) NOT NULL,
  `saldo` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Despejando dados para a tabela `treino_sobrevivencia`
--

INSERT INTO `treino_sobrevivencia` (`id`, `ninja`, `preco`, `fragmentos_atual`, `fragmentos_total`, `saldo`) VALUES
(1, 'Lee 8 portao', 200, 10, 100, 100),
(2, 'Yagura', 1300, 5, 100, NULL),
(3, 'Zabuza 7 espa', 320, 11, 200, NULL),
(4, 'Gaara', 200, 48, 200, NULL),
(5, 'Pakura', 320, 26, 100, NULL),
(7, 'Lee 8 portao', 200, 11, 100, NULL),
(8, 'Yagura', 1300, 5, 100, NULL),
(9, 'Zabuza 7 espa', 320, 11, 200, NULL),
(10, 'Gaara', 200, 48, 200, NULL),
(11, 'Kabuto', 120, 3, 200, NULL),
(12, 'Shizune', 120, 20, 200, NULL),
(13, 'Enma', 120, 0, 200, NULL),
(14, 'Kisame', 320, 72, 200, NULL),
(15, 'Sasori', 320, 0, 200, NULL),
(17, 'Hidan', 320, 81, 200, NULL),
(18, 'Asuma lamina', 320, 0, 200, NULL),
(19, 'Jiraiya sennin', 1300, 14, 100, NULL),
(20, 'Pain naraka', 320, 26, 100, NULL),
(21, 'Pain Ashura', 320, 33, 100, NULL),
(22, 'Pain Animal', 320, 32, 200, NULL),
(23, 'Shikaku Nara', 200, 4, 100, NULL),
(24, 'Inochi', 200, 0, 100, NULL),
(25, 'Shikamaru (chunnin)', 320, 0, 200, NULL),
(26, 'Danzou', 1300, 5, 200, NULL),
(27, 'Mifune', 1300, 80, 80, NULL),
(28, 'Kurotsuchi', 460, 0, 200, NULL),
(29, 'Mabui', 460, 20, 200, NULL),
(30, 'Temari cupula', 320, 0, 200, NULL),
(31, 'Akatsuchi', 320, 49, 100, NULL),
(32, 'C', 320, 51, 200, NULL),
(33, 'Fuu', 320, 98, 200, NULL),
(34, 'Torune', 320, 30, 200, NULL),
(35, 'Shikamaru ggn', 460, 0, 50, NULL),
(36, 'Neji ggn', 320, 0, 200, NULL),
(37, 'Kiba ggn', 320, 34, 100, 340),
(38, 'Hinata ggn', 460, 6, 200, 60),
(39, 'Kankaru ggn', 320, 17, 200, NULL),
(40, 'Kakashi Decap', 320, 59, 200, NULL),
(41, 'Sai ggn', 320, 17, 100, NULL),
(42, 'Ino ggn', 200, 0, 100, NULL),
(43, 'Choji ggn', 200, 0, 100, NULL),
(44, 'Shino gn', 200, 0, 200, NULL),
(45, 'Lee ggn', 320, 3, 50, NULL),
(46, 'Lee prtao aleg', 320, 4, 50, NULL),
(47, 'Fuu 7 caudas', 1300, 2, 100, NULL),
(48, 'Bee 7 esapadas', 1300, 50, 100, NULL),
(49, 'Bee samehada', 1300, 18, 100, NULL),
(50, 'Kakashi garoto', 200, 1, 100, 10),
(51, 'Obito garoto', 200, 0, 100, NULL),
(52, 'Genguetss', 2600, 29, 50, NULL),
(53, 'Mu', 1300, 2, 200, NULL),
(54, 'Kabuto cobra', 650, 25, 50, NULL),
(55, 'Kingaku ouro', 1300, 0, 100, NULL),
(56, 'Ginkaku prata', 650, 0, 200, NULL),
(57, 'Jinin', 1300, 3, 100, NULL),
(58, 'Zabuza edo', 1300, 55, 100, NULL),
(59, 'Zetsu', 1300, 1, 100, NULL),
(60, 'Ameyuri', 1300, 11, 100, NULL),
(61, 'Pakura', 320, 26, 100, NULL);

--
-- Índices para tabelas despejadas
--

--
-- Índices de tabela `pontos_guilda`
--
ALTER TABLE `pontos_guilda`
  ADD PRIMARY KEY (`id`);

--
-- Índices de tabela `pontos_lua`
--
ALTER TABLE `pontos_lua`
  ADD PRIMARY KEY (`id`);

--
-- Índices de tabela `pontos_sol`
--
ALTER TABLE `pontos_sol`
  ADD PRIMARY KEY (`id`);

--
-- Índices de tabela `treino_sobrevivencia`
--
ALTER TABLE `treino_sobrevivencia`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT para tabelas despejadas
--

--
-- AUTO_INCREMENT de tabela `pontos_guilda`
--
ALTER TABLE `pontos_guilda`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT de tabela `pontos_lua`
--
ALTER TABLE `pontos_lua`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT de tabela `pontos_sol`
--
ALTER TABLE `pontos_sol`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT de tabela `treino_sobrevivencia`
--
ALTER TABLE `treino_sobrevivencia`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=62;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
