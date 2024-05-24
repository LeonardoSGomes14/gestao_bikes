-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Tempo de geração: 24-Maio-2024 às 15:06
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

--
-- Extraindo dados da tabela `cadastro_empresa`
--

INSERT INTO `cadastro_empresa` (`id_empresa`, `nome`, `servicos`, `cnpj`, `cep`, `estado`, `rua`, `numero`) VALUES
(1, '222', '333', '222', '19703194', 'SP', 'Rua Herculano Azevedo', '132'),
(2, 'Mateus', 'dsds', '1dwer3453', '19703194', 'SP', 'Rua Herculano Azevedo', '194'),
(3, '42', '35454', '000000001', '19703194', 'SP', 'Rua Herculano Azevedo', '143'),
(4, '42', '35454', '000000001', '19703194', 'SP', 'Rua Herculano Azevedo', '143'),
(5, '42', '35454', '000000001', '19703194', 'SP', 'Rua Herculano Azevedo', '143'),
(6, 'ytryutr', 'gyhtrhtr', '576r4', '19703194', 'SP', 'Rua Herculano Azevedo', '987'),
(7, 'ytryutr', 'gyhtrhtr', '576r4', '19703194', 'SP', 'Rua Herculano Azevedo', '987'),
(8, 'sas', 'asas', '4656', '19703194', 'SP', 'Rua Herculano Azevedo', '195'),
(9, 'sas', 'asas', '4656', '19703194', 'SP', 'Rua Herculano Azevedo', '195'),
(10, '3', '3', '33', '19703-194', 'SP', 'Rua Herculano Azevedo', '195244'),
(11, '3', '3', '33', '19703-194', 'SP', 'Rua Herculano Azevedo', '195244'),
(12, '3', '3', '33', '19703-194', 'SP', 'Rua Herculano Azevedo', '195244'),
(13, '3', '3', '33', '19703-194', 'SP', 'Rua Herculano Azevedo', '195244'),
(14, '3', '3', '33', '19703-194', 'SP', 'Rua Herculano Azevedo', '195244'),
(15, '3', '3', '33', '19703-194', 'SP', 'Rua Herculano Azevedo', '195244'),
(16, '3', '3', '33', '19703-194', 'SP', 'Rua Herculano Azevedo', '195244'),
(17, '3', '3', '33', '19703-194', 'SP', 'Rua Herculano Azevedo', '195244'),
(18, 'Mateus', 'hard', '000000001', '19703194', 'SP', 'Rua Herculano Azevedo', '195');

-- --------------------------------------------------------

--
-- Estrutura da tabela `comercial`
--

CREATE TABLE `comercial` (
  `id_venda` int(11) NOT NULL,
  `comprador` varchar(255) NOT NULL,
  `descricao` varchar(255) NOT NULL,
  `numerodafatura` varchar(255) NOT NULL,
  `id_produto` varchar(255) NOT NULL,
  `nome_produto` varchar(255) NOT NULL,
  `quantidade` varchar(255) NOT NULL,
  `valor_total` varchar(255) NOT NULL,
  `valor_produto` varchar(255) NOT NULL
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
  `preco` varchar(255) NOT NULL,
  `tipo` varchar(255) NOT NULL,
  `data` date NOT NULL,
  `fornecedor` varchar(255) NOT NULL,
  `imagem` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Extraindo dados da tabela `controleestoque`
--

INSERT INTO `controleestoque` (`id_estoque`, `nomedoproduto`, `quantidade`, `preco`, `tipo`, `data`, `fornecedor`, `imagem`) VALUES
(35, 'r3', '434', '434', '434', '2024-05-15', 'asa', '5043127-a-phone-icon-in-a-round-circle-vector-gratis-vetor.jpg'),
(36, 'asas', '34543', '65346', '5467658', '2024-05-08', 'sa', 'facebook-icone-noir-removebg-preview.png'),
(37, 'sdf', '3245676', '444', '46464', '2024-04-29', 'a', '5043127-a-phone-icon-in-a-round-circle-vector-gratis-vetor.jpg');

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

--
-- Extraindo dados da tabela `controlefiscal`
--

INSERT INTO `controlefiscal` (`id_fiscal`, `transacoes`, `fatura`, `imposto`, `orcamentos`) VALUES
(3, '12', '2', '2', '16.00');

-- --------------------------------------------------------

--
-- Estrutura da tabela `controlefrota`
--

CREATE TABLE `controlefrota` (
  `id_frota` int(11) NOT NULL,
  `marca` varchar(255) NOT NULL,
  `ano_fabricado` varchar(255) NOT NULL,
  `modelo` varchar(255) NOT NULL,
  `tipodeveiculo` varchar(255) NOT NULL,
  `placaveiculo` varchar(255) NOT NULL,
  `imagem` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Extraindo dados da tabela `controlefrota`
--

INSERT INTO `controlefrota` (`id_frota`, `marca`, `ano_fabricado`, `modelo`, `tipodeveiculo`, `placaveiculo`, `imagem`) VALUES
(14, 'fiat', '2000', 'celta', 'utilitario', '77t55', 'spider.webp');

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
-- Estrutura da tabela `solicitacao`
--

CREATE TABLE `solicitacao` (
  `id_soli` int(11) NOT NULL,
  `solicitante` varchar(255) NOT NULL,
  `responsavel` varchar(255) NOT NULL,
  `pedido` varchar(255) NOT NULL,
  `situacao` int(11) NOT NULL,
  `criado` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Extraindo dados da tabela `solicitacao`
--

INSERT INTO `solicitacao` (`id_soli`, `solicitante`, `responsavel`, `pedido`, `situacao`, `criado`) VALUES
(34, '4t436', '547', '124545', 0, '2024-05-22'),
(36, 'h jun ju', ' ju ju ', 'j ju ju', 1, '2024-05-22'),
(37, 'afs', 'fsadf', 'adfdsf', 0, '2024-05-22'),
(41, 'eyuq', 'ryt', 'sytu', 1, '2024-05-22');

-- --------------------------------------------------------

--
-- Estrutura da tabela `usuarios`
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
-- Extraindo dados da tabela `usuarios`
--

INSERT INTO `usuarios` (`id_user`, `nome_completo`, `nome_usuario`, `datadenascimento`, `cpf`, `genero`, `phone`, `email`, `senha`, `tipo_funcionario`, `cep`, `cidade`, `rua`, `numero`, `complemento`, `hora_entrada`, `hora_saida`, `carga_horaria`, `remuneracao`, `data_contratacao`, `foto_perfil`) VALUES
(8, 'Mateus oliveira', 'Mateus oliveira', '0000-00-00', '448.547.538-70', 'Masculino', '(18) 99742-9620', 'Mateus@g.com', 'mo123351', '0', '19703194', '0', '0', '1', 'casa', '04:00:00', '05:00:00', 24, '1500', '2024-05-16', NULL);

-- --------------------------------------------------------

--
-- Estrutura da tabela `vendas`
--

CREATE TABLE `vendas` (
  `id_venda` int(11) NOT NULL,
  `produto` varchar(255) NOT NULL,
  `valor` varchar(255) NOT NULL,
  `quantidade` varchar(255) NOT NULL,
  `total` varchar(255) NOT NULL,
  `data` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Extraindo dados da tabela `vendas`
--

INSERT INTO `vendas` (`id_venda`, `produto`, `valor`, `quantidade`, `total`, `data`) VALUES
(1, '121212', '112121212', '2121', '237809090652', '2024-05-24 13:13:29'),
(2, '1', '1', '1', '1', '2024-05-24 13:14:03'),
(3, '1', '30', '1', '30', '2024-05-24 13:14:40'),
(4, '1', '30', '5', '150', '2024-05-24 13:14:52');

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
  ADD PRIMARY KEY (`id_venda`);

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
-- Índices para tabela `solicitacao`
--
ALTER TABLE `solicitacao`
  ADD PRIMARY KEY (`id_soli`);

--
-- Índices para tabela `usuarios`
--
ALTER TABLE `usuarios`
  ADD PRIMARY KEY (`id_user`);

--
-- Índices para tabela `vendas`
--
ALTER TABLE `vendas`
  ADD PRIMARY KEY (`id_venda`);

--
-- AUTO_INCREMENT de tabelas despejadas
--

--
-- AUTO_INCREMENT de tabela `cadastro_empresa`
--
ALTER TABLE `cadastro_empresa`
  MODIFY `id_empresa` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=19;

--
-- AUTO_INCREMENT de tabela `comercial`
--
ALTER TABLE `comercial`
  MODIFY `id_venda` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de tabela `contas`
--
ALTER TABLE `contas`
  MODIFY `id_conta` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de tabela `controleestoque`
--
ALTER TABLE `controleestoque`
  MODIFY `id_estoque` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=38;

--
-- AUTO_INCREMENT de tabela `controlefiscal`
--
ALTER TABLE `controlefiscal`
  MODIFY `id_fiscal` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT de tabela `controlefrota`
--
ALTER TABLE `controlefrota`
  MODIFY `id_frota` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- AUTO_INCREMENT de tabela `controlepessoas`
--
ALTER TABLE `controlepessoas`
  MODIFY `id_pessoas` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de tabela `solicitacao`
--
ALTER TABLE `solicitacao`
  MODIFY `id_soli` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=42;

--
-- AUTO_INCREMENT de tabela `usuarios`
--
ALTER TABLE `usuarios`
  MODIFY `id_user` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT de tabela `vendas`
--
ALTER TABLE `vendas`
  MODIFY `id_venda` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
