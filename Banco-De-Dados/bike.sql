-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Tempo de geração: 17-Abr-2024 às 13:25
-- Versão do servidor: 10.4.27-MariaDB
-- versão do PHP: 8.2.0

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
-- Estrutura da tabela `usuariosadm`
--

CREATE TABLE `usuariosadm` (
  `id_usuario` int(11) NOT NULL,
  `usuario` varchar(255) NOT NULL,
  `senha` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `permissao` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Extraindo dados da tabela `usuariosadm`
--

INSERT INTO `usuariosadm` (`id_usuario`, `usuario`, `senha`, `email`, `permissao`) VALUES
(1, 'Mateus', '$2y$10$uDit8V9bxa.rJ./UdVztfeeIr1vaa7SwCIgQ68Uw798h2zl5Acfkq', 'lealshoes17@gmail.com', ''),
(2, 'Mateussasa', '$2y$10$wnp5/IMoFTs4EWrrVIZRfOwd57JxJZqekjMXUkR2.p0xAcoVWtAcW', 'lealshoes822@gmail.com', ''),
(3, 'Mateussasasfe', '$2y$10$kUPaauRplXSJKXvx6yB0X.JT4GnTZOD1jvpjm/ThaQEk5VGe3lvlu', 'lealshoes17@gmail.com', '');

--
-- Índices para tabelas despejadas
--

--
-- Índices para tabela `usuariosadm`
--
ALTER TABLE `usuariosadm`
  ADD PRIMARY KEY (`id_usuario`);

--
-- AUTO_INCREMENT de tabelas despejadas
--

--
-- AUTO_INCREMENT de tabela `usuariosadm`
--
ALTER TABLE `usuariosadm`
  MODIFY `id_usuario` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
