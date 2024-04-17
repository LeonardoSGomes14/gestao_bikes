-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Tempo de geração: 17/04/2024 às 16:23
-- Versão do servidor: 10.4.32-MariaDB
-- Versão do PHP: 8.2.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Banco de dados: `bike`
--

-- --------------------------------------------------------

--
-- Estrutura para tabela `cadastro empresa`
--

CREATE TABLE `cadastro empresa` (
  `id_empresa` int(11) NOT NULL,
  `nome` varchar(255) NOT NULL,
  `servicos` varchar(255) NOT NULL,
  `cnpj` varchar(255) NOT NULL,
  `cep` varchar(255) NOT NULL,
  `estado` varchar(255) NOT NULL,
  `rua` varchar(255) NOT NULL,
  `numero` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Estrutura para tabela `usuariosadm`
--

CREATE TABLE `usuariosadm` (
  `id_usuario` int(11) NOT NULL,
  `usuario` varchar(255) NOT NULL,
  `senha` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `permissao` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Despejando dados para a tabela `usuariosadm`
--

INSERT INTO `usuariosadm` (`id_usuario`, `usuario`, `senha`, `email`, `permissao`) VALUES
(1, 'Mateus', '$2y$10$uDit8V9bxa.rJ./UdVztfeeIr1vaa7SwCIgQ68Uw798h2zl5Acfkq', 'lealshoes17@gmail.com', ''),
(2, 'Mateussasa', '$2y$10$wnp5/IMoFTs4EWrrVIZRfOwd57JxJZqekjMXUkR2.p0xAcoVWtAcW', 'lealshoes822@gmail.com', ''),
(3, 'Mateussasasfe', '$2y$10$kUPaauRplXSJKXvx6yB0X.JT4GnTZOD1jvpjm/ThaQEk5VGe3lvlu', 'lealshoes17@gmail.com', '');

--
-- Índices para tabelas despejadas
--

--
-- Índices de tabela `cadastro empresa`
--
ALTER TABLE `cadastro empresa`
  ADD PRIMARY KEY (`id_empresa`);

--
-- Índices de tabela `usuariosadm`
--
ALTER TABLE `usuariosadm`
  ADD PRIMARY KEY (`id_usuario`);

--
-- AUTO_INCREMENT para tabelas despejadas
--

--
-- AUTO_INCREMENT de tabela `cadastro empresa`
--
ALTER TABLE `cadastro empresa`
  MODIFY `id_empresa` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de tabela `usuariosadm`
--
ALTER TABLE `usuariosadm`
  MODIFY `id_usuario` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
