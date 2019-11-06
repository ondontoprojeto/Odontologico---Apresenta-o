-- phpMyAdmin SQL Dump
-- version 4.8.5
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: 06-Nov-2019 às 22:18
-- Versão do servidor: 10.1.38-MariaDB
-- versão do PHP: 7.1.27

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `odonto1`
--

-- --------------------------------------------------------

--
-- Estrutura da tabela `atendimento`
--

CREATE TABLE `atendimento` (
  `id` int(11) NOT NULL,
  `paciente_id` int(11) DEFAULT NULL,
  `dentista_id` int(11) DEFAULT NULL,
  `data` date DEFAULT NULL,
  `descricao` text,
  `hora` time DEFAULT '00:00:00',
  `situacao` varchar(30) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 ROW_FORMAT=DYNAMIC;

--
-- Extraindo dados da tabela `atendimento`
--

INSERT INTO `atendimento` (`id`, `paciente_id`, `dentista_id`, `data`, `descricao`, `hora`, `situacao`) VALUES
(9, 10, 5, '2019-11-05', 'Nenhuma', '13:00:00', NULL),
(10, 9, 5, '2019-11-05', 'Nenhuma', '11:00:00', NULL),
(11, 11, 6, '2019-11-05', 'Nenhuma', '10:00:00', NULL),
(12, 9, 5, '2019-11-06', 'Nenhuma', '12:00:00', 'Confirmado'),
(13, 10, 6, '2019-11-06', 'Nenhuma', '11:00:00', 'Agendado'),
(15, 11, 6, '2019-11-06', 'Nenhuma', '10:00:00', 'Agendado'),
(16, 9, 6, '2019-11-08', 'Nenhuma\r\n', '12:00:00', 'Agendado'),
(18, 10, 5, '2019-11-22', 'Nenhuma', '22:00:00', 'Agendado');

-- --------------------------------------------------------

--
-- Estrutura da tabela `atendimento_tipo`
--

CREATE TABLE `atendimento_tipo` (
  `atendimentotipo_id` int(11) NOT NULL,
  `atendimentonome` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Extraindo dados da tabela `atendimento_tipo`
--

INSERT INTO `atendimento_tipo` (`atendimentotipo_id`, `atendimentonome`) VALUES
(2, 'Cirurgia'),
(3, 'Rotina'),
(5, 'Bucomaxilo');

-- --------------------------------------------------------

--
-- Estrutura da tabela `dentista`
--

CREATE TABLE `dentista` (
  `id` int(11) NOT NULL,
  `nome` varchar(255) DEFAULT NULL,
  `cro` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 ROW_FORMAT=DYNAMIC;

--
-- Extraindo dados da tabela `dentista`
--

INSERT INTO `dentista` (`id`, `nome`, `cro`) VALUES
(5, 'Cristiane', '12345678'),
(6, 'Adriane', '12345678');

-- --------------------------------------------------------

--
-- Estrutura da tabela `estoque`
--

CREATE TABLE `estoque` (
  `estoque_id` int(11) NOT NULL,
  `numeroproduto` int(11) DEFAULT NULL,
  `nomeproduto` varchar(200) NOT NULL,
  `categoria` varchar(100) NOT NULL,
  `quantidade` int(11) NOT NULL,
  `fornecedor` varchar(100) DEFAULT NULL,
  `vencimento` date NOT NULL,
  `complemento` varchar(100) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Extraindo dados da tabela `estoque`
--

INSERT INTO `estoque` (`estoque_id`, `numeroproduto`, `nomeproduto`, `categoria`, `quantidade`, `fornecedor`, `vencimento`, `complemento`) VALUES
(1, 252, 'Gaze', 'X', 200, 'Y', '2024-12-22', 'Nenhuma');

-- --------------------------------------------------------

--
-- Estrutura da tabela `login`
--

CREATE TABLE `login` (
  `id_user` int(11) NOT NULL,
  `nome` varchar(100) DEFAULT NULL,
  `login` varchar(100) DEFAULT NULL,
  `senha` char(8) DEFAULT NULL,
  `perfil` varchar(50) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Extraindo dados da tabela `login`
--

INSERT INTO `login` (`id_user`, `nome`, `login`, `senha`, `perfil`) VALUES
(2, 'Matheus Ribeiro Figueiredo', 'harury', '123', 'Administrativo'),
(3, 'Jorcelane Teixeira', 'jor46', 'mup2390', 'Visitante');

-- --------------------------------------------------------

--
-- Estrutura da tabela `paciente`
--

CREATE TABLE `paciente` (
  `id` int(11) NOT NULL,
  `nome` varchar(255) DEFAULT NULL,
  `email` varchar(255) DEFAULT NULL,
  `cpf` varchar(15) NOT NULL,
  `rg` varchar(15) NOT NULL,
  `telefone` varchar(15) NOT NULL,
  `celular` varchar(15) NOT NULL,
  `cep` varchar(15) NOT NULL,
  `endereco` varchar(100) NOT NULL,
  `bairro` varchar(50) NOT NULL,
  `nascimento` date NOT NULL,
  `cidade` varchar(30) NOT NULL,
  `uf` varchar(5) DEFAULT NULL,
  `doencabase` varchar(255) DEFAULT NULL,
  `alergia` varchar(255) DEFAULT NULL,
  `medicamentos` varchar(255) DEFAULT NULL,
  `cirurgia` varchar(255) DEFAULT NULL,
  `internacoes` varchar(255) DEFAULT NULL,
  `pa` varchar(255) DEFAULT NULL,
  `queixaprinc` varchar(255) DEFAULT NULL,
  `situacaoficha` varchar(10) NOT NULL,
  `orcamento` varchar(5) NOT NULL,
  `complemento` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 ROW_FORMAT=DYNAMIC;

--
-- Extraindo dados da tabela `paciente`
--

INSERT INTO `paciente` (`id`, `nome`, `email`, `cpf`, `rg`, `telefone`, `celular`, `cep`, `endereco`, `bairro`, `nascimento`, `cidade`, `uf`, `doencabase`, `alergia`, `medicamentos`, `cirurgia`, `internacoes`, `pa`, `queixaprinc`, `situacaoficha`, `orcamento`, `complemento`) VALUES
(9, 'Matheus Ribeiro Figueiredo', 'matheusribeirofg1@gmail.com', '17362020732', '12345678', '26627474', '994606169', '25550590', 'Rua Belkiss', 'Coelho da Rocha', '1999-11-16', 'Rio de Janeiro', 'RJ', 'Não', 'Não', 'Não', 'Não', 'Não', 'Não', 'Não', 'ativa', 'Não', 'Lote 224 Quadra 41'),
(10, 'Jorcelane', 'jorcelane46@gmail.com', '03650842718', '12345678', '26627474', '992969980', '25550590', 'Rua belkiss', 'Coelho da Rocha', '1999-11-16', 'Rio de Janeiro', 'RJ', 'Não', 'Não', 'Não', 'Não', 'Não', 'Não', 'Nenhuma\r\n', 'ativa', 'Não', 'Lote 224 Quadra 41'),
(11, 'Bruno Santos', 'bruno@gmail.com', '21828357254', '12345678', '25871777', '9123456789', '12345678', 'Vasco da Gama', 'Cosme damião', '1997-09-17', 'Nova iguaçu', 'IG', 'n', 'Não', 'Não', 'Não', 'Não', 'Não', 'Nenhuma', 'ativa', 'Não', 'Puta que pariu');

-- --------------------------------------------------------

--
-- Estrutura da tabela `procedimento`
--

CREATE TABLE `procedimento` (
  `id` int(11) NOT NULL,
  `atendimento_id` int(11) DEFAULT NULL,
  `procedimento_tipo_id` int(11) DEFAULT NULL,
  `valor` double DEFAULT NULL,
  `obs` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 ROW_FORMAT=DYNAMIC;

--
-- Extraindo dados da tabela `procedimento`
--

INSERT INTO `procedimento` (`id`, `atendimento_id`, `procedimento_tipo_id`, `valor`, `obs`) VALUES
(5, 9, 2, 150, '123\r\n'),
(6, 10, 9, 150, 'Nenhuma\r\n'),
(7, 10, 2, 20, 'Nenhuma\r\n'),
(8, 11, 9, 150, 'Nenhuma'),
(9, 9, 2, 250, 'Nenhuma'),
(10, 12, 2, 150, 'Nenhuma'),
(11, 13, 1, 15, 'Exame de Revisão, valor fixo.'),
(12, 11, 2, 300, 'Nenhuma\r\n'),
(13, 12, 1, 100, 'Nada'),
(14, 12, 9, 250, 'Nada');

-- --------------------------------------------------------

--
-- Estrutura da tabela `procedimento_tipo`
--

CREATE TABLE `procedimento_tipo` (
  `id` int(11) NOT NULL,
  `nome` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 ROW_FORMAT=DYNAMIC;

--
-- Extraindo dados da tabela `procedimento_tipo`
--

INSERT INTO `procedimento_tipo` (`id`, `nome`) VALUES
(1, 'Revisão'),
(2, 'Limpeza'),
(9, 'Clareamento');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `atendimento`
--
ALTER TABLE `atendimento`
  ADD PRIMARY KEY (`id`) USING BTREE,
  ADD KEY `fk_a_paciente_id` (`paciente_id`) USING BTREE,
  ADD KEY `fk_a_dentista_id` (`dentista_id`) USING BTREE;

--
-- Indexes for table `atendimento_tipo`
--
ALTER TABLE `atendimento_tipo`
  ADD PRIMARY KEY (`atendimentotipo_id`);

--
-- Indexes for table `dentista`
--
ALTER TABLE `dentista`
  ADD PRIMARY KEY (`id`) USING BTREE;

--
-- Indexes for table `estoque`
--
ALTER TABLE `estoque`
  ADD PRIMARY KEY (`estoque_id`);

--
-- Indexes for table `login`
--
ALTER TABLE `login`
  ADD PRIMARY KEY (`id_user`);

--
-- Indexes for table `paciente`
--
ALTER TABLE `paciente`
  ADD PRIMARY KEY (`id`) USING BTREE;

--
-- Indexes for table `procedimento`
--
ALTER TABLE `procedimento`
  ADD PRIMARY KEY (`id`) USING BTREE,
  ADD KEY `fk_p_procedimento_tipo_id` (`procedimento_tipo_id`) USING BTREE,
  ADD KEY `fk_p_atendimento_id` (`atendimento_id`) USING BTREE;

--
-- Indexes for table `procedimento_tipo`
--
ALTER TABLE `procedimento_tipo`
  ADD PRIMARY KEY (`id`) USING BTREE;

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `atendimento`
--
ALTER TABLE `atendimento`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=19;

--
-- AUTO_INCREMENT for table `atendimento_tipo`
--
ALTER TABLE `atendimento_tipo`
  MODIFY `atendimentotipo_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `dentista`
--
ALTER TABLE `dentista`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `estoque`
--
ALTER TABLE `estoque`
  MODIFY `estoque_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `login`
--
ALTER TABLE `login`
  MODIFY `id_user` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `paciente`
--
ALTER TABLE `paciente`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT for table `procedimento`
--
ALTER TABLE `procedimento`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- AUTO_INCREMENT for table `procedimento_tipo`
--
ALTER TABLE `procedimento_tipo`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- Constraints for dumped tables
--

--
-- Limitadores para a tabela `atendimento`
--
ALTER TABLE `atendimento`
  ADD CONSTRAINT `fk_a_dentista_id` FOREIGN KEY (`dentista_id`) REFERENCES `dentista` (`id`),
  ADD CONSTRAINT `fk_a_paciente_id` FOREIGN KEY (`paciente_id`) REFERENCES `paciente` (`id`);

--
-- Limitadores para a tabela `procedimento`
--
ALTER TABLE `procedimento`
  ADD CONSTRAINT `fk_p_atendimento_id` FOREIGN KEY (`atendimento_id`) REFERENCES `atendimento` (`id`),
  ADD CONSTRAINT `fk_p_procedimento_tipo_id` FOREIGN KEY (`procedimento_tipo_id`) REFERENCES `procedimento_tipo` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
