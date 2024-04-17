-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Tempo de geração: 17-Abr-2024 às 20:32
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
-- Estrutura da tabela `cadastro_empresa`
--

CREATE TABLE `cadastro_empresa` (
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
-- Estrutura da tabela `comercial`
--

CREATE TABLE `comercial` (
  `id_comercial` int(11) NOT NULL,
  `nome` int(11) NOT NULL,
  `descricao` int(11) NOT NULL,
  `numerodopedido` int(11) NOT NULL,
  `numerodafatura` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

-- --------------------------------------------------------

--
-- Estrutura da tabela `contas`
--

CREATE TABLE `contas` (
  `id_conta` int(11) NOT NULL,
  `fatura` varchar(255) NOT NULL,
  `condicoes` varchar(255) NOT NULL,
  `historico` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

-- --------------------------------------------------------

--
-- Estrutura da tabela `controleestoque`
--

CREATE TABLE `controleestoque` (
  `id_estoque` int(11) NOT NULL,
  `nomedoproduto` varchar(255) NOT NULL,
  `quantidade` varchar(255) NOT NULL,
  `preco` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

-- --------------------------------------------------------

--
-- Estrutura da tabela `controlefiscal`
--

CREATE TABLE `controlefiscal` (
  `id_fiscal` int(11) NOT NULL,
  `transacoes` varchar(255) NOT NULL,
  `fatura` varchar(255) NOT NULL,
  `imposto` varchar(255) NOT NULL,
  `orcamentos` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

-- --------------------------------------------------------

--
-- Estrutura da tabela `controlefrota`
--

CREATE TABLE `controlefrota` (
  `id_frota` int(11) NOT NULL,
  `marca` varchar(255) NOT NULL,
  `anodoveiculo` varchar(255) NOT NULL,
  `modelo` varchar(255) NOT NULL,
  `tipodeveiculo` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

-- --------------------------------------------------------

--
-- Estrutura da tabela `controlepessoas`
--

CREATE TABLE `controlepessoas` (
  `id_pessoas` int(11) NOT NULL,
  `nome` varchar(255) NOT NULL,
  `datadenascimento` varchar(255) NOT NULL,
  `sexo` varchar(255) NOT NULL,
  `telefone` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

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
-- Índices para tabela `cadastro_empresa`
--
ALTER TABLE `cadastro_empresa`
  ADD PRIMARY KEY (`id_empresa`);

--
-- Índices para tabela `comercial`
--
ALTER TABLE `comercial`
  ADD PRIMARY KEY (`id_comercial`);

--
-- Índices para tabela `contas`
--
ALTER TABLE `contas`
  ADD PRIMARY KEY (`id_conta`);

--
-- Índices para tabela `controleestoque`
--
ALTER TABLE `controleestoque`
  ADD PRIMARY KEY (`id_estoque`);

--
-- Índices para tabela `controlefiscal`
--
ALTER TABLE `controlefiscal`
  ADD PRIMARY KEY (`id_fiscal`);

--
-- Índices para tabela `controlefrota`
--
ALTER TABLE `controlefrota`
  ADD PRIMARY KEY (`id_frota`);

--
-- Índices para tabela `controlepessoas`
--
ALTER TABLE `controlepessoas`
  ADD PRIMARY KEY (`id_pessoas`);

--
-- Índices para tabela `usuariosadm`
--
ALTER TABLE `usuariosadm`
  ADD PRIMARY KEY (`id_usuario`);

--
-- AUTO_INCREMENT de tabelas despejadas
--

--
-- AUTO_INCREMENT de tabela `cadastro_empresa`
--
ALTER TABLE `cadastro_empresa`
  MODIFY `id_empresa` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de tabela `comercial`
--
ALTER TABLE `comercial`
  MODIFY `id_comercial` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de tabela `contas`
--
ALTER TABLE `contas`
  MODIFY `id_conta` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de tabela `controleestoque`
--
ALTER TABLE `controleestoque`
  MODIFY `id_estoque` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de tabela `controlefiscal`
--
ALTER TABLE `controlefiscal`
  MODIFY `id_fiscal` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de tabela `controlefrota`
--
ALTER TABLE `controlefrota`
  MODIFY `id_frota` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de tabela `controlepessoas`
--
ALTER TABLE `controlepessoas`
  MODIFY `id_pessoas` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de tabela `usuariosadm`
--
ALTER TABLE `usuariosadm`
  MODIFY `id_usuario` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
