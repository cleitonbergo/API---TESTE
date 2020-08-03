-- phpMyAdmin SQL Dump
-- version 4.9.0.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Tempo de geração: 03-Ago-2020 às 22:15
-- Versão do servidor: 10.4.6-MariaDB
-- versão do PHP: 7.3.8

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Banco de dados: `admin`
--

-- --------------------------------------------------------

--
-- Estrutura da tabela `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `usuario` varchar(50) NOT NULL,
  `senha` varchar(50) NOT NULL,
  `email` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Extraindo dados da tabela `users`
--

INSERT INTO `users` (`id`, `usuario`, `senha`, `email`) VALUES
(1, 'admin', '21232f297a57a5a743894a0e4a801fc3', 'admin@admin.com.br');

-- --------------------------------------------------------

--
-- Estrutura da tabela `vendas`
--

CREATE TABLE `vendas` (
  `id` int(11) NOT NULL,
  `id_vendedor` int(11) DEFAULT NULL,
  `valor_venda` float DEFAULT NULL,
  `comissao` float DEFAULT NULL,
  `data_venda` varchar(50) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Extraindo dados da tabela `vendas`
--

INSERT INTO `vendas` (`id`, `id_vendedor`, `valor_venda`, `comissao`, `data_venda`) VALUES
(26, 1, 22, 1.87, '02/08/2020'),
(27, 1, 22, 1.87, '02/08/2020'),
(28, 1, 22, 1.87, '02/08/2020'),
(29, 1, 22, 1.87, '02/08/2020'),
(30, 1, 22, 1.87, '02/08/2020'),
(31, 1, 22, 1.87, '02/08/2020'),
(32, 1, 22, 1.87, '02/08/2020'),
(33, 1, 22, 1.87, '02/08/2020'),
(34, 1, 1, 1.87, '02/08/2020'),
(35, 1, 22, 0.17, '02/08/2020'),
(36, 1, 22, 1.87, '02/08/2020'),
(37, 1, 22.75, 1.87, '02/08/2020'),
(38, 1, 22.75, 1.93, '02/08/2020'),
(39, 1, 22.75, 1.93375, '02/08/2020'),
(40, 1, 22.75, 1.93, '02/08/2020'),
(41, 1, 22.75, 1.93, '02/08/2020'),
(42, 1, 22.75, 1.93, '02/08/2020'),
(43, 1, 22.75, 1.93, '02/08/2020'),
(44, 1, 22.75, 1.93, '02/08/2020'),
(45, 1, 22.75, 1.93, '02/08/2020'),
(46, 1, 22.75, 1.93, '02/08/2020'),
(62, 2, 22.92, 1.95, '03/08/2020'),
(63, 2, 22.92, 1.95, '03/08/2020');

-- --------------------------------------------------------

--
-- Estrutura da tabela `vendedores`
--

CREATE TABLE `vendedores` (
  `id` int(11) NOT NULL,
  `nome` varchar(50) NOT NULL,
  `email` varchar(50) NOT NULL,
  `comissao` float NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Extraindo dados da tabela `vendedores`
--

INSERT INTO `vendedores` (`id`, `nome`, `email`, `comissao`) VALUES
(1, 'asdfaddfasdfasdfa2', 'asdfasdf@asdf.com.br', 4.26),
(2, 'sdfg', 'sdfg@asdf.com.br', 10.11),
(3, 'asdf', 'asdf@asdf.com.br', 0),
(4, 'ateste', 'tete@testes.com.br', 0),
(5, 'testes', 'testes111@testes.com.br', 1.25),
(8, ':nome', ':email', 0),
(9, 'cleiton', 'cleiton.bergo@gmail.com', 0),
(10, 'cleiton2', 'cleiton.bergo@gmail.com', 0),
(11, 'cleiton3', 'cleiton.bergo@gmail.com', 0),
(12, 'teste', 'teste@teste.com.br', 0),
(13, 'teste2', 'testes@testes.com.br', 0),
(14, 'testes444', 'testes@testes.com.br', 0),
(15, 'testes555', 'testes@testes.com', 0),
(16, 'testes555', 'testes@testes.com', 0),
(17, 'testes666', 'testes@testes.com', 0),
(18, 'teste7', 'testeste@testes.com.br', 0),
(19, 'testes888', 'testes@testes.com.br', 0),
(20, 'teste99', 'testes@testes.com.br', 0);

--
-- Índices para tabelas despejadas
--

--
-- Índices para tabela `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`);

--
-- Índices para tabela `vendas`
--
ALTER TABLE `vendas`
  ADD PRIMARY KEY (`id`),
  ADD KEY `id_vendedor` (`id_vendedor`);

--
-- Índices para tabela `vendedores`
--
ALTER TABLE `vendedores`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT de tabelas despejadas
--

--
-- AUTO_INCREMENT de tabela `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT de tabela `vendas`
--
ALTER TABLE `vendas`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=64;

--
-- AUTO_INCREMENT de tabela `vendedores`
--
ALTER TABLE `vendedores`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=21;

--
-- Restrições para despejos de tabelas
--

--
-- Limitadores para a tabela `vendas`
--
ALTER TABLE `vendas`
  ADD CONSTRAINT `vendas_ibfk_1` FOREIGN KEY (`id_vendedor`) REFERENCES `vendedores` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
