-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Tempo de geração: 13/05/2023 às 03:42
-- Versão do servidor: 10.4.28-MariaDB
-- Versão do PHP: 8.2.4

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Banco de dados: `revisao`
--

-- --------------------------------------------------------

--
-- Estrutura para tabela `cliente`
--

CREATE TABLE `cliente` (
  `id` int(11) NOT NULL,
  `nome` varchar(200) NOT NULL,
  `celular` varchar(30) NOT NULL,
  `idade` varchar(5) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Despejando dados para a tabela `cliente`
--

INSERT INTO `cliente` (`id`, `nome`, `celular`, `idade`) VALUES
(3, 'Teste2', '8888-0000', '33'),
(4, 'Teste3', '9999-1111', '44');

-- --------------------------------------------------------

--
-- Estrutura para tabela `estaciona`
--

CREATE TABLE `estaciona` (
  `id` int(11) NOT NULL,
  `placa` varchar(55) NOT NULL,
  `hora_entrada` time NOT NULL,
  `data_entrada` date NOT NULL,
  `hora_saida` time NOT NULL,
  `data_saida` date NOT NULL,
  `valor` double NOT NULL,
  `situacao` varchar(25) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Despejando dados para a tabela `estaciona`
--

INSERT INTO `estaciona` (`id`, `placa`, `hora_entrada`, `data_entrada`, `hora_saida`, `data_saida`, `valor`, `situacao`) VALUES
(2, 'THF9078', '08:36:00', '2023-05-06', '14:10:09', '2023-05-06', 83.54, 'OK'),
(3, 'AJK8899', '13:50:26', '2023-05-05', '13:51:52', '2023-05-06', 0.35, ''),
(4, 'ADAF8908', '13:56:53', '2023-05-06', '14:10:00', '2023-05-06', 3.28, 'OK'),
(5, 'AHH1122', '14:12:01', '2023-05-06', '14:12:05', '2023-05-06', 207, 'OK'),
(6, 'ADF6782', '20:45:44', '2023-05-08', '21:15:53', '2023-05-08', 0.2, 'OK'),
(7, 'APY2898', '21:16:08', '2023-05-08', '22:18:34', '2023-05-08', 15.58, 'OK'),
(14, 'PET4R31', '19:32:48', '2023-05-12', '21:52:43', '2023-05-12', 276.8, 'OK'),
(15, 'CIE3L20', '21:53:25', '2023-05-12', '00:00:00', '0000-00-00', 0, 'Aberto');

-- --------------------------------------------------------

--
-- Estrutura para tabela `estacionaok`
--

CREATE TABLE `estacionaok` (
  `id` int(11) NOT NULL,
  `placa` varchar(55) NOT NULL,
  `hora_entrada` time NOT NULL,
  `data_entrada` date NOT NULL,
  `hora_saida` time NOT NULL,
  `data_saida` date NOT NULL,
  `valor` double NOT NULL,
  `situacao` varchar(35) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Despejando dados para a tabela `estacionaok`
--

INSERT INTO `estacionaok` (`id`, `placa`, `hora_entrada`, `data_entrada`, `hora_saida`, `data_saida`, `valor`, `situacao`) VALUES
(0, 'ASD45G67', '08:32:39', '2023-05-06', '16:14:32', '2023-05-06', 115.47, 'OK'),
(0, 'MYPK3040', '06:54:15', '2023-05-10', '07:01:37', '2023-05-10', 76.44, 'OK'),
(0, 'CMP2728', '20:01:24', '2023-05-10', '20:18:39', '2023-05-10', 299.65, 'OK'),
(0, 'KGB6Y215', '20:19:11', '2023-05-10', '20:26:39', '2023-05-10', 295.2, 'OK'),
(0, 'MYP3K33', '22:18:53', '2023-05-10', '22:19:53', '2023-05-10', 325.28, 'OK'),
(0, '', '00:00:00', '0000-00-00', '00:00:00', '0000-00-00', 0, ''),
(0, '', '00:00:00', '0000-00-00', '00:00:00', '0000-00-00', 0, ''),
(0, 'VBB3R25', '19:16:17', '2023-05-11', '19:31:18', '2023-05-11', 280.93, 'OK'),
(0, 'ITS4A24', '19:31:37', '2023-05-11', '22:19:45', '2023-05-11', 277.1, 'OK');

-- --------------------------------------------------------

--
-- Estrutura para tabela `funcionarios`
--

CREATE TABLE `funcionarios` (
  `id` int(11) NOT NULL,
  `nome` varchar(200) NOT NULL,
  `cpf` varchar(20) NOT NULL,
  `celular` varchar(25) NOT NULL,
  `login` varchar(30) NOT NULL,
  `senha` varchar(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Despejando dados para a tabela `funcionarios`
--

INSERT INTO `funcionarios` (`id`, `nome`, `cpf`, `celular`, `login`, `senha`) VALUES
(2, 'Bruno', '92321903209', '9999-9999', 'bruno', 'senha');

-- --------------------------------------------------------

--
-- Estrutura para tabela `mensalistas`
--

CREATE TABLE `mensalistas` (
  `id_mensalista` int(10) NOT NULL,
  `nome` varchar(50) NOT NULL,
  `cpf` varchar(10) NOT NULL,
  `endereco` varchar(50) NOT NULL,
  `data_inicio` date NOT NULL,
  `data_final` date NOT NULL,
  `placa` varchar(50) NOT NULL,
  `Valor` double NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Despejando dados para a tabela `mensalistas`
--

INSERT INTO `mensalistas` (`id_mensalista`, `nome`, `cpf`, `endereco`, `data_inicio`, `data_final`, `placa`, `Valor`) VALUES
(1, 'Kauan', '0538302500', 'Rua Tuiuiu, N106', '0000-00-00', '0000-00-00', 'BGD8A90', 0),
(2, 'Teste', '1234567891', 'Este mesmo, 23', '0000-00-00', '0000-00-00', 'ATT3412', 0),
(3, 'Teste2', '1234567890', 'Aquele, 23', '2023-05-06', '0000-00-00', 'AGH4455', 0),
(4, 'teste3', '1234567890', 'Rua do Piu, 11', '2023-05-06', '2023-05-06', 'AHH1122', 0),
(5, 'teste4', '1234567890', 'Rua do Piu, 11', '2023-05-06', '2023-06-05', 'AHH1122', 0),
(6, 'teste5', '1234567899', 'Aquele, 24', '2023-05-06', '2023-06-05', 'AGU4785', 650);

--
-- Índices para tabelas despejadas
--

--
-- Índices de tabela `estaciona`
--
ALTER TABLE `estaciona`
  ADD PRIMARY KEY (`id`);

--
-- Índices de tabela `funcionarios`
--
ALTER TABLE `funcionarios`
  ADD PRIMARY KEY (`id`);

--
-- Índices de tabela `mensalistas`
--
ALTER TABLE `mensalistas`
  ADD PRIMARY KEY (`id_mensalista`);

--
-- AUTO_INCREMENT para tabelas despejadas
--

--
-- AUTO_INCREMENT de tabela `estaciona`
--
ALTER TABLE `estaciona`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

--
-- AUTO_INCREMENT de tabela `funcionarios`
--
ALTER TABLE `funcionarios`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT de tabela `mensalistas`
--
ALTER TABLE `mensalistas`
  MODIFY `id_mensalista` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
