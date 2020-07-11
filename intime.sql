-- phpMyAdmin SQL Dump
-- version 5.0.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Tempo de geração: 10-Jul-2020 às 23:00
-- Versão do servidor: 10.4.13-MariaDB
-- versão do PHP: 7.4.7

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Banco de dados: `intime`
--

-- --------------------------------------------------------

--
-- Estrutura da tabela `atividade_funcionario_projeto`
--

CREATE TABLE `atividade_funcionario_projeto` (
  `id_atividade` int(11) NOT NULL,
  `id_funcionario` varchar(14) NOT NULL,
  `id_projeto` int(11) NOT NULL,
  `dt_atividade` date NOT NULL,
  `tempo_atividade` int(11) NOT NULL,
  `desc_atividade` varchar(50) NOT NULL,
  `ativo` int(11) NOT NULL DEFAULT 1
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Extraindo dados da tabela `atividade_funcionario_projeto`
--

INSERT INTO `atividade_funcionario_projeto` (`id_atividade`, `id_funcionario`, `id_projeto`, `dt_atividade`, `tempo_atividade`, `desc_atividade`, `ativo`) VALUES
(1, '463.831.488-00', 1, '2020-06-27', 200, 'Descrição de modelo lógico', 1),
(2, '463.831.488-00', 1, '2020-06-27', 239, 'Analise Modelo Lógico', 1),
(3, '463.831.488-00', 1, '2020-06-29', 230, 'Consulta Intercep', 1),
(4, '463.831.488-00', 2, '2020-06-29', 230, 'Análise de Requisitos', 1),
(6, '463.831.488-00', 2, '2020-06-29', 172, 'Construção de Estrutura', 1),
(7, '463.831.488-00', 1, '2020-07-03', 120, 'Teste', 0),
(8, '463.831.488-00', 2, '2020-07-02', 121, 'Automação Gerencial', 0),
(9, '463.831.488-00', 8, '2020-07-09', 230, 'Analise Inicial', 0),
(10, '463.831.488-00', 8, '2020-07-09', 320, 'Consulta Mestre', 1);

-- --------------------------------------------------------

--
-- Estrutura da tabela `cadastro_funcionario`
--

CREATE TABLE `cadastro_funcionario` (
  `cpf` varchar(14) NOT NULL,
  `nome_completo` varchar(50) NOT NULL,
  `cargo` varchar(50) NOT NULL,
  `dt_inicio` varchar(20) NOT NULL,
  `dt_fim` varchar(20) NOT NULL,
  `dt_nascimento` varchar(10) NOT NULL,
  `email` varchar(100) NOT NULL,
  `senha` varchar(100) NOT NULL,
  `ativo` int(11) NOT NULL DEFAULT 1,
  `nova_senha` int(11) NOT NULL DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Extraindo dados da tabela `cadastro_funcionario`
--

INSERT INTO `cadastro_funcionario` (`cpf`, `nome_completo`, `cargo`, `dt_inicio`, `dt_fim`, `dt_nascimento`, `email`, `senha`, `ativo`, `nova_senha`) VALUES
('463.831.488-00', 'Rafael Santana Arruda', 'Analista Pleno', '2020-06-23 22:16:11', '2020-06-23 22:16:11', '21/12/1998', 'rafaelsantanaarruda98@hotmail.com', 'c7f62d389f071073157cecd304258ba3', 1, 0),
('430.770.098-89', 'Leonardo Santana Arruda', 'Analista Jr', '2020-06-25 22:13:10', '2020-06-25 22:13:10', '21/03/1994', 'leo@hotmail.com', 'aba799c87d8bb18f7ea1c62205173347', 1, 0);

-- --------------------------------------------------------

--
-- Estrutura da tabela `cadastro_gestor`
--

CREATE TABLE `cadastro_gestor` (
  `cpf` varchar(14) NOT NULL,
  `nome_completo` varchar(50) NOT NULL,
  `dt_inicio` date NOT NULL,
  `dt_fim` date NOT NULL,
  `dt_nascimento` varchar(10) NOT NULL,
  `senha` varchar(40) NOT NULL,
  `email` varchar(100) NOT NULL,
  `ativo` int(11) NOT NULL DEFAULT 1,
  `nova_senha` int(11) NOT NULL DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Extraindo dados da tabela `cadastro_gestor`
--

INSERT INTO `cadastro_gestor` (`cpf`, `nome_completo`, `dt_inicio`, `dt_fim`, `dt_nascimento`, `senha`, `email`, `ativo`, `nova_senha`) VALUES
('129.753.738-64', 'Joelma Silva Santana Arrudinha', '2020-06-25', '2020-06-25', '21/05/1995', 'c7f62d389f071073157cecd304258ba3', 'jo2009.santana@hotmail.com', 1, 0);

-- --------------------------------------------------------

--
-- Estrutura da tabela `projeto`
--

CREATE TABLE `projeto` (
  `id_projeto` int(11) NOT NULL,
  `nome_projeto` varchar(50) NOT NULL,
  `data_inicio` datetime DEFAULT NULL,
  `data_fim` datetime DEFAULT NULL,
  `descricao` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Extraindo dados da tabela `projeto`
--

INSERT INTO `projeto` (`id_projeto`, `nome_projeto`, `data_inicio`, `data_fim`, `descricao`) VALUES
(1, 'Intime', '2020-06-29 00:00:00', '2020-07-09 22:11:53', 'Criação projeto PHP'),
(2, 'Projeto Sandrinha', '2020-06-23 00:00:00', '2020-06-23 00:00:00', 'Criação de software'),
(3, 'Pegasus', '2020-07-09 00:00:00', '2020-07-09 00:00:00', 'Treinamento de ovnis'),
(7, 'Orion', '2020-07-09 00:00:00', '2020-07-09 00:00:00', 'Analise Forense'),
(8, 'Kronos', '2020-07-09 00:00:00', '2020-07-09 00:00:00', 'Análise temporal'),
(10, 'Alfa ', '2020-07-10 00:00:00', '2020-07-10 00:00:00', 'Criação Dashboard ');

-- --------------------------------------------------------

--
-- Estrutura da tabela `projeto_funcionario`
--

CREATE TABLE `projeto_funcionario` (
  `cpf` varchar(14) NOT NULL,
  `id_projeto` int(11) NOT NULL,
  `ativo` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Extraindo dados da tabela `projeto_funcionario`
--

INSERT INTO `projeto_funcionario` (`cpf`, `id_projeto`, `ativo`) VALUES
('430.770.098-89', 1, 0),
('430.770.098-89', 2, 0),
('430.770.098-89', 8, 0),
('430.770.098-89', 10, 1),
('463.831.488-00', 1, 1),
('463.831.488-00', 2, 1),
('463.831.488-00', 7, 1),
('463.831.488-00', 8, 1),
('463.831.488-00', 10, 1);

-- --------------------------------------------------------

--
-- Estrutura da tabela `projeto_gestor`
--

CREATE TABLE `projeto_gestor` (
  `id` int(11) NOT NULL,
  `cpf` varchar(14) NOT NULL,
  `id_projeto` int(11) NOT NULL,
  `ativo` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Extraindo dados da tabela `projeto_gestor`
--

INSERT INTO `projeto_gestor` (`id`, `cpf`, `id_projeto`, `ativo`) VALUES
(1, '129.753.738-64', 1, 1),
(2, '129.753.738-64', 2, 1),
(6, '129.753.738-64', 7, 1),
(7, '129.753.738-64', 8, 1),
(8, '129.753.738-64', 0, 1),
(9, '129.753.738-64', 0, 1),
(10, '129.753.738-64', 9, 1),
(11, '129.753.738-64', 10, 1);

--
-- Índices para tabelas despejadas
--

--
-- Índices para tabela `atividade_funcionario_projeto`
--
ALTER TABLE `atividade_funcionario_projeto`
  ADD PRIMARY KEY (`id_atividade`);

--
-- Índices para tabela `projeto`
--
ALTER TABLE `projeto`
  ADD PRIMARY KEY (`id_projeto`);

--
-- Índices para tabela `projeto_funcionario`
--
ALTER TABLE `projeto_funcionario`
  ADD PRIMARY KEY (`cpf`,`id_projeto`);

--
-- Índices para tabela `projeto_gestor`
--
ALTER TABLE `projeto_gestor`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT de tabelas despejadas
--

--
-- AUTO_INCREMENT de tabela `atividade_funcionario_projeto`
--
ALTER TABLE `atividade_funcionario_projeto`
  MODIFY `id_atividade` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT de tabela `projeto`
--
ALTER TABLE `projeto`
  MODIFY `id_projeto` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT de tabela `projeto_gestor`
--
ALTER TABLE `projeto_gestor`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
