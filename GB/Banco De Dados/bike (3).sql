-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Tempo de geração: 10/05/2024 às 15:14
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
-- Estrutura para tabela `cadastro_empresa`
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

--
-- Despejando dados para a tabela `cadastro_empresa`
--

INSERT INTO `cadastro_empresa` (`id_empresa`, `nome`, `servicos`, `cnpj`, `cep`, `estado`, `rua`, `numero`) VALUES
(1, '222', '333', '222', '19703194', 'SP', 'Rua Herculano Azevedo', '132'),
(2, 'Mateus', 'dsds', '1dwer3453', '19703194', 'SP', 'Rua Herculano Azevedo', '194'),
(3, '42', '35454', '000000001', '19703194', 'SP', 'Rua Herculano Azevedo', '143'),
(4, '42', '35454', '000000001', '19703194', 'SP', 'Rua Herculano Azevedo', '143'),
(5, '42', '35454', '000000001', '19703194', 'SP', 'Rua Herculano Azevedo', '143'),
(6, 'ytryutr', 'gyhtrhtr', '576r4', '19703194', 'SP', 'Rua Herculano Azevedo', '987'),
(7, 'ytryutr', 'gyhtrhtr', '576r4', '19703194', 'SP', 'Rua Herculano Azevedo', '987');

-- --------------------------------------------------------

--
-- Estrutura para tabela `comercial`
--

CREATE TABLE `comercial` (
  `id_comercial` int(11) NOT NULL,
  `nome` varchar(255) NOT NULL,
  `descricao` varchar(255) NOT NULL,
  `numerodopedido` varchar(255) NOT NULL,
  `numerodafatura` varchar(255) NOT NULL,
  `id_produto` varchar(255) NOT NULL,
  `nome_produto` varchar(255) NOT NULL,
  `quantidade` varchar(255) NOT NULL,
  `valor_total` varchar(255) NOT NULL,
  `valor_produto` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

-- --------------------------------------------------------

--
-- Estrutura para tabela `contas`
--

CREATE TABLE `contas` (
  `id_conta` int(11) NOT NULL,
  `fatura` varchar(255) NOT NULL,
  `condicoes` varchar(255) NOT NULL,
  `historico` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

-- --------------------------------------------------------

--
-- Estrutura para tabela `controleestoque`
--

CREATE TABLE `controleestoque` (
  `id_estoque` int(11) NOT NULL,
  `nomedoproduto` varchar(255) NOT NULL,
  `quantidade` varchar(255) NOT NULL,
  `preco` varchar(255) NOT NULL,
  `tipo` varchar(255) NOT NULL,
  `data` date NOT NULL,
  `fornecedor` varchar(255) NOT NULL,
  `imagem` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Despejando dados para a tabela `controleestoque`
--

INSERT INTO `controleestoque` (`id_estoque`, `nomedoproduto`, `quantidade`, `preco`, `tipo`, `data`, `fornecedor`, `imagem`) VALUES
(12, 'eueee', '1000', '4000,', 'Eletrica', '2024-05-08', 'Mateus Oggi', '5043127-a-phone-icon-in-a-round-circle-vector-gratis-vetor.jpg');

-- --------------------------------------------------------

--
-- Estrutura para tabela `controlefiscal`
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
-- Estrutura para tabela `controlefrota`
--

CREATE TABLE `controlefrota` (
  `id_frota` int(11) NOT NULL,
  `marca` varchar(255) NOT NULL,
  `ano_fabricado` varchar(255) NOT NULL,
  `modelo` varchar(255) NOT NULL,
  `tipodoproduto` varchar(255) NOT NULL,
  `imagem` longblob NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Despejando dados para a tabela `controlefrota`
--

INSERT INTO `controlefrota` (`id_frota`, `marca`, `ano_fabricado`, `modelo`, `tipodoproduto`, `imagem`) VALUES
(1, '3', '33', '33', '33', ''),
(2, 'dsd', 'sdsd', 'sdsd', 'sds', ''),
(3, 'sasas', '23214', '324', 'ds', '');

-- --------------------------------------------------------

--
-- Estrutura para tabela `usuarios`
--

CREATE TABLE `usuarios` (
  `id_user` int(11) NOT NULL,
  `nome_completo` varchar(255) NOT NULL,
  `nome_usuario` varchar(255) NOT NULL,
  `datadenascimento` date DEFAULT NULL,
  `cpf` varchar(255) NOT NULL,
  `genero` varchar(255) NOT NULL,
  `phone` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `senha` varchar(255) NOT NULL,
  `tipo_funcionario` varchar(255) NOT NULL,
  `cep` varchar(255) DEFAULT NULL,
  `cidade` varchar(255) DEFAULT NULL,
  `rua` varchar(255) DEFAULT NULL,
  `numero` varchar(255) DEFAULT NULL,
  `complemento` varchar(255) DEFAULT NULL,
  `hora_entrada` time DEFAULT NULL,
  `hora_saida` time DEFAULT NULL,
  `carga_horaria` int(11) DEFAULT NULL,
  `remuneracao` varchar(255) DEFAULT NULL,
  `data_contratacao` date DEFAULT NULL,
  `foto_perfil` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Despejando dados para a tabela `usuarios`
--

INSERT INTO `usuarios` (`id_user`, `nome_completo`, `nome_usuario`, `datadenascimento`, `cpf`, `genero`, `phone`, `email`, `senha`, `tipo_funcionario`, `cep`, `cidade`, `rua`, `numero`, `complemento`, `hora_entrada`, `hora_saida`, `carga_horaria`, `remuneracao`, `data_contratacao`, `foto_perfil`) VALUES
(1, 'leonardo', 'leonardo', '0000-00-00', '5646464654', 'Outro', '18997027880', 'leo@gmail.com', '123', '0', '0', '0', '0', '0', '0', '00:00:00', '00:00:00', 0, '0', '0000-00-00', 'icons8-usuário-homem-com-círculo-96.png'),
(2, 'lcd', 'lcd', '0000-00-00', 'jhb', 'Masculino', 'kmnb', 'jkb@lkjvnr', '12', '0', '0', '0', '0', '0', '0', '00:00:00', '00:00:00', 0, '0', '0000-00-00', 'pexels-pixabay-270557.jpg'),
(3, 'cf', 'cf', '0000-00-00', 'bihb', 'Masculino', 'bib', 'cgch@noenfe', 'gyvgu', '0', '0', '0', '0', '0', '0', '00:00:00', '00:00:00', 0, '0', '0000-00-00', 'pexels-luis-gomes-546819.jpg');

--
-- Índices para tabelas despejadas
--

--
-- Índices de tabela `cadastro_empresa`
--
ALTER TABLE `cadastro_empresa`
  ADD PRIMARY KEY (`id_empresa`);

--
-- Índices de tabela `comercial`
--
ALTER TABLE `comercial`
  ADD PRIMARY KEY (`id_comercial`);

--
-- Índices de tabela `contas`
--
ALTER TABLE `contas`
  ADD PRIMARY KEY (`id_conta`);

--
-- Índices de tabela `controleestoque`
--
ALTER TABLE `controleestoque`
  ADD PRIMARY KEY (`id_estoque`);

--
-- Índices de tabela `controlefiscal`
--
ALTER TABLE `controlefiscal`
  ADD PRIMARY KEY (`id_fiscal`);

--
-- Índices de tabela `controlefrota`
--
ALTER TABLE `controlefrota`
  ADD PRIMARY KEY (`id_frota`);

--
-- Índices de tabela `usuarios`
--
ALTER TABLE `usuarios`
  ADD PRIMARY KEY (`id_user`);

--
-- AUTO_INCREMENT para tabelas despejadas
--

--
-- AUTO_INCREMENT de tabela `cadastro_empresa`
--
ALTER TABLE `cadastro_empresa`
  MODIFY `id_empresa` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

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
  MODIFY `id_estoque` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT de tabela `controlefiscal`
--
ALTER TABLE `controlefiscal`
  MODIFY `id_fiscal` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de tabela `controlefrota`
--
ALTER TABLE `controlefrota`
  MODIFY `id_frota` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT de tabela `usuarios`
--
ALTER TABLE `usuarios`
  MODIFY `id_user` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
