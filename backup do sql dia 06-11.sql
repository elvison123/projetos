-- phpMyAdmin SQL Dump
-- version 4.5.5.1
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: 06-Nov-2016 às 23:00
-- Versão do servidor: 5.7.11
-- PHP Version: 5.6.19

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `projetos`
--
CREATE DATABASE IF NOT EXISTS `projetos` DEFAULT CHARACTER SET latin1 COLLATE latin1_swedish_ci;
USE `projetos`;

-- --------------------------------------------------------

--
-- Estrutura da tabela `classificacao`
--

CREATE TABLE `classificacao` (
  `id_classificacao` int(11) NOT NULL,
  `nome` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Extraindo dados da tabela `classificacao`
--

INSERT INTO `classificacao` (`id_classificacao`, `nome`) VALUES
(6, 'classificacao impressora'),
(7, 'impressora'),
(8, 'WINDOWS 1O'),
(9, 'LINUX');

-- --------------------------------------------------------

--
-- Estrutura da tabela `cliente`
--

CREATE TABLE `cliente` (
  `id_cliente` int(11) NOT NULL,
  `nome` varchar(80) NOT NULL,
  `email` varchar(80) NOT NULL,
  `login` varchar(80) NOT NULL,
  `telefone` varchar(30) NOT NULL,
  `cpf` varchar(14) NOT NULL,
  `empresa` varchar(80) NOT NULL,
  `endereco` varchar(100) NOT NULL,
  `senha` varchar(80) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Extraindo dados da tabela `cliente`
--

INSERT INTO `cliente` (`id_cliente`, `nome`, `email`, `login`, `telefone`, `cpf`, `empresa`, `endereco`, `senha`) VALUES
(1, 'elvis123ff', 'elvis@mail.com', '', '(11)11111-1111', '111.111.111-11', '11111111111', '111111111111', '1234'),
(2, 'zezeddd11', 'zeze@hotmail.com', 'zeze', '(11)11111-1111', '111.111.111-11', 'ltda', 'centro', '1234'),
(3, 'dddd', 'dddd@mail.com', 'ddd', '(11)11111-1111', '111.111.111-11', '1111111111', '111111111', '1234');

-- --------------------------------------------------------

--
-- Estrutura da tabela `funcaomodulo`
--

CREATE TABLE `funcaomodulo` (
  `id_funcao` int(11) NOT NULL,
  `nome` varchar(100) NOT NULL,
  `codigo` varchar(50) NOT NULL,
  `id_modulo_fk` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Estrutura da tabela `login`
--

CREATE TABLE `login` (
  `id_login` int(11) NOT NULL,
  `login` varchar(80) NOT NULL,
  `senha` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Estrutura da tabela `modulo`
--

CREATE TABLE `modulo` (
  `id_modulo` int(11) NOT NULL,
  `nomeModulo` varchar(100) NOT NULL,
  `id_classificacao_fk` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Extraindo dados da tabela `modulo`
--

INSERT INTO `modulo` (`id_modulo`, `nomeModulo`, `id_classificacao_fk`) VALUES
(7, 'modo feijaosaDASDAS', 6),
(8, 'fiscal', 6),
(9, 'dafdsaf', 6),
(12, 'NETBEANS ASDFAFFDSA', 9);

-- --------------------------------------------------------

--
-- Estrutura da tabela `titulo`
--

CREATE TABLE `titulo` (
  `id_titulo` int(11) NOT NULL,
  `valor_documento` varchar(100) NOT NULL,
  `documento` varchar(100) NOT NULL,
  `situacao` varchar(100) NOT NULL,
  `parcela` varchar(100) NOT NULL,
  `data_operacao` varchar(100) NOT NULL,
  `forma_pagamento` varchar(100) NOT NULL,
  `descricao` varchar(100) NOT NULL,
  `id_cliente_fk` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Extraindo dados da tabela `titulo`
--

INSERT INTO `titulo` (`id_titulo`, `valor_documento`, `documento`, `situacao`, `parcela`, `data_operacao`, `forma_pagamento`, `descricao`, `id_cliente_fk`) VALUES
(2, '1111', '11111', 'Nao devedor', '1', '08/10/2016', '11/11/1111', '1111', 1);

-- --------------------------------------------------------

--
-- Estrutura da tabela `usuario`
--

CREATE TABLE `usuario` (
  `id_usuario` int(11) NOT NULL,
  `nome` varchar(80) NOT NULL,
  `email` varchar(80) NOT NULL,
  `login` varchar(80) NOT NULL,
  `cpf` varchar(80) NOT NULL,
  `empresa` varchar(80) NOT NULL,
  `senha` varchar(80) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Extraindo dados da tabela `usuario`
--

INSERT INTO `usuario` (`id_usuario`, `nome`, `email`, `login`, `cpf`, `empresa`, `senha`) VALUES
(1, 'geisadd', 'geisa@mail.comdd', 'geisadd', '111.111.111-11', '55555555555', '12345'),
(2, 'elvis', 'elvison@mail.com', 'elvis', '111.111.111-11', 'daudau', '1234');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `classificacao`
--
ALTER TABLE `classificacao`
  ADD PRIMARY KEY (`id_classificacao`);

--
-- Indexes for table `cliente`
--
ALTER TABLE `cliente`
  ADD PRIMARY KEY (`id_cliente`);

--
-- Indexes for table `funcaomodulo`
--
ALTER TABLE `funcaomodulo`
  ADD PRIMARY KEY (`id_funcao`),
  ADD KEY `id_modulo_fk` (`id_modulo_fk`);

--
-- Indexes for table `login`
--
ALTER TABLE `login`
  ADD PRIMARY KEY (`id_login`);

--
-- Indexes for table `modulo`
--
ALTER TABLE `modulo`
  ADD PRIMARY KEY (`id_modulo`),
  ADD KEY `id_classificacao_fk` (`id_classificacao_fk`);

--
-- Indexes for table `titulo`
--
ALTER TABLE `titulo`
  ADD PRIMARY KEY (`id_titulo`),
  ADD KEY `id_cliente_fk` (`id_cliente_fk`);

--
-- Indexes for table `usuario`
--
ALTER TABLE `usuario`
  ADD PRIMARY KEY (`id_usuario`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `classificacao`
--
ALTER TABLE `classificacao`
  MODIFY `id_classificacao` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;
--
-- AUTO_INCREMENT for table `cliente`
--
ALTER TABLE `cliente`
  MODIFY `id_cliente` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
--
-- AUTO_INCREMENT for table `funcaomodulo`
--
ALTER TABLE `funcaomodulo`
  MODIFY `id_funcao` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `login`
--
ALTER TABLE `login`
  MODIFY `id_login` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `modulo`
--
ALTER TABLE `modulo`
  MODIFY `id_modulo` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;
--
-- AUTO_INCREMENT for table `titulo`
--
ALTER TABLE `titulo`
  MODIFY `id_titulo` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT for table `usuario`
--
ALTER TABLE `usuario`
  MODIFY `id_usuario` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
--
-- Constraints for dumped tables
--

--
-- Limitadores para a tabela `funcaomodulo`
--
ALTER TABLE `funcaomodulo`
  ADD CONSTRAINT `fk_funcaomodulo_modulo` FOREIGN KEY (`id_modulo_fk`) REFERENCES `modulo` (`id_modulo`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Limitadores para a tabela `modulo`
--
ALTER TABLE `modulo`
  ADD CONSTRAINT `fk_modulo_classificacao` FOREIGN KEY (`id_classificacao_fk`) REFERENCES `classificacao` (`id_classificacao`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Limitadores para a tabela `titulo`
--
ALTER TABLE `titulo`
  ADD CONSTRAINT `fk_titulo_cliente` FOREIGN KEY (`id_cliente_fk`) REFERENCES `cliente` (`id_cliente`) ON DELETE CASCADE ON UPDATE CASCADE;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
