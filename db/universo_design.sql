-- phpMyAdmin SQL Dump
-- version 5.1.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Tempo de geração: 26-Out-2021 às 13:43
-- Versão do servidor: 10.4.18-MariaDB
-- versão do PHP: 8.0.3

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Banco de dados: `universo_design`
--

-- --------------------------------------------------------

--
-- Estrutura da tabela `tbl_cliente`
--

CREATE TABLE `tbl_cliente` (
  `id_cliente` int(8) NOT NULL,
  `nome` varchar(100) DEFAULT NULL,
  `cpf_cnpj` varchar(20) DEFAULT NULL,
  `endereco` varchar(150) DEFAULT NULL,
  `bairro` varchar(30) DEFAULT NULL,
  `cidade_uf` varchar(100) DEFAULT NULL,
  `tel_fixo` varchar(40) DEFAULT NULL,
  `tel_cel` varchar(40) DEFAULT NULL,
  `email` varchar(60) DEFAULT NULL,
  `data_cadastro` datetime DEFAULT NULL,
  `data_atualizacao` datetime DEFAULT NULL,
  `usuario` varchar(60) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Extraindo dados da tabela `tbl_cliente`
--

INSERT INTO `tbl_cliente` (`id_cliente`, `nome`, `cpf_cnpj`, `endereco`, `bairro`, `cidade_uf`, `tel_fixo`, `tel_cel`, `email`, `data_cadastro`, `data_atualizacao`, `usuario`) VALUES
(3, 'IVONILSON DE J. CARDOSO', '70959692134', 'QUADRA 02, MR 08', 'SETOR OESTE', 'PLANALTINA/GO', '8888', '9999', 'ivonilsoncardoso@hotmail.com', NULL, NULL, NULL);

-- --------------------------------------------------------

--
-- Estrutura da tabela `tbl_itens_orcamento`
--

CREATE TABLE `tbl_itens_orcamento` (
  `id` int(8) NOT NULL,
  `id_orcamento` int(8) DEFAULT NULL,
  `descricao` varchar(100) DEFAULT NULL,
  `valor_unitario` decimal(10,2) DEFAULT NULL,
  `quantidade` decimal(6,2) DEFAULT NULL,
  `valor_total` decimal(10,2) DEFAULT NULL,
  `desconto` decimal(10,2) DEFAULT NULL,
  `total_pagar` decimal(10,2) DEFAULT NULL,
  `data_cadastro` datetime DEFAULT NULL,
  `usuario` varchar(60) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Extraindo dados da tabela `tbl_itens_orcamento`
--

INSERT INTO `tbl_itens_orcamento` (`id`, `id_orcamento`, `descricao`, `valor_unitario`, `quantidade`, `valor_total`, `desconto`, `total_pagar`, `data_cadastro`, `usuario`) VALUES
(1, 38, 'LONA (m²)  (12 larg. X 10 alt.)', '2.00', '1.00', '240.00', '72.00', '168.00', '2021-10-11 00:00:00', 'FABRICIO'),
(2, 38, 'TOLDO LISO (m²)  (10 larg. X 10 alt.)', '9.85', '1.00', '985.00', '197.00', '788.00', '2021-10-11 00:00:00', 'FABRICIO'),
(3, 39, 'COPO 200 ML (un.) ', '1.00', '1.00', '1.00', '0.00', '1.00', '2021-10-11 00:00:00', 'FABRICIO'),
(4, 39, 'COPOS FESTA MÉDIO (un.) ', '2.00', '4.00', '8.00', '3.20', '4.80', '2021-10-11 00:00:00', 'FABRICIO'),
(5, 39, 'TOLDO LISO (m²)  (10 larg. X 30 alt.)', '9.85', '1.00', '2955.00', '325.05', '2629.95', '2021-10-11 00:00:00', 'FABRICIO'),
(6, 39, 'TOLDO LISO (m²)  (10 larg. X 30 alt.)', '9.85', '1.00', '2955.00', '325.05', '2629.95', '2021-10-11 00:00:00', 'FABRICIO'),
(7, 39, 'COPOS FESTA MÉDIO (un.)  (10 larg. X 30 alt.)', '2.00', '1.00', '600.00', '66.00', '534.00', '2021-10-11 00:00:00', 'FABRICIO'),
(8, 40, 'COPO 200 ML (un.) ', '1.00', '4.00', '4.00', '0.44', '3.56', '2021-10-11 00:00:00', 'IVONILSON'),
(9, 40, 'FITA (m) ', '3.25', '1.00', '3.25', '0.39', '2.86', '2021-10-11 00:00:00', 'IVONILSON'),
(10, 40, 'LONA (m²)  (55 larg. X 112 alt.)', '2.00', '1.00', '12320.00', '2464.00', '9856.00', '2021-10-11 00:00:00', 'IVONILSON'),
(11, 40, 'TOLDO LISO (m²)  (20 larg. X 20 alt.)', '9.85', '5.00', '19700.00', '3940.00', '15760.00', '2021-10-11 00:00:00', 'IVONILSON'),
(12, 40, 'COPO 200 ML (un.) ', '1.00', '100.00', '100.00', '30.00', '70.00', '2021-10-11 00:00:00', 'IVONILSON'),
(13, 41, 'COPO 200 ML (un.) ', '1.00', '4.00', '4.00', '0.32', '3.68', '2021-10-12 00:00:00', 'FABRICIO'),
(14, 41, 'LONA (m²)  (10 larg. X 20 alt.)', '2.00', '3.00', '1200.00', '120.00', '1080.00', '2021-10-12 00:00:00', 'FABRICIO'),
(15, 41, 'FITA (m) ', '3.25', '5.00', '16.25', '0.81', '15.44', '2021-10-12 00:00:00', 'FABRICIO'),
(16, 41, 'COPO 200 ML (un.) ', '1.00', '10.00', '10.00', '0.00', '10.00', '2021-10-12 00:00:00', 'FABRICIO'),
(17, 41, 'TOLDO LISO (m²)  (20 larg. X 30 alt.)', '9.85', '1.00', '5910.00', '1773.00', '4137.00', '2021-10-12 00:00:00', 'FABRICIO'),
(18, 41, 'COPO 200 ML (un.) ', '1.00', '1.00', '1.00', '0.30', '0.70', '2021-10-12 00:00:00', 'FABRICIO'),
(19, 41, 'COPO 200 ML (un.) ', '1.00', '1.00', '1.00', '0.30', '0.70', '2021-10-12 00:00:00', 'FABRICIO'),
(20, 41, 'COPO 200 ML (un.) ', '1.00', '1.00', '1.00', '0.30', '0.70', '2021-10-12 00:00:00', 'FABRICIO'),
(21, 41, 'FITA (m) ', '3.25', '1.00', '3.25', '0.97', '2.27', '2021-10-12 00:00:00', 'FABRICIO'),
(22, 41, 'FITA (m) ', '3.25', '1.00', '3.25', '0.97', '2.27', '2021-10-12 00:00:00', 'FABRICIO'),
(23, 41, 'FITA (m) ', '3.25', '1.00', '3.25', '0.97', '2.27', '2021-10-12 00:00:00', 'FABRICIO'),
(24, 41, 'FITA (m) ', '3.25', '1.00', '3.25', '0.97', '2.27', '2021-10-12 00:00:00', 'FABRICIO');

-- --------------------------------------------------------

--
-- Estrutura da tabela `tbl_notificacoes`
--

CREATE TABLE `tbl_notificacoes` (
  `id_notificacao` int(8) NOT NULL,
  `tipo` varchar(30) DEFAULT NULL,
  `remetente` varchar(60) DEFAULT NULL,
  `destinatario` varchar(60) DEFAULT NULL,
  `descricao` varchar(100) DEFAULT NULL,
  `status` varchar(40) NOT NULL DEFAULT 'PENDENTE',
  `data_emissao` timestamp NULL DEFAULT NULL,
  `data_limite` timestamp NULL DEFAULT NULL,
  `data_programada_resolver` timestamp NULL DEFAULT NULL,
  `prioridade` varchar(15) DEFAULT NULL,
  `arquivo_cobranca` blob DEFAULT NULL,
  `comprovante_pagamento` blob DEFAULT NULL,
  `meio_notificacao` varchar(40) DEFAULT NULL,
  `meio_pagamento` varchar(30) DEFAULT NULL,
  `pago_por` varchar(50) DEFAULT NULL,
  `observacoes` varchar(2000) DEFAULT NULL,
  `usuario` varchar(30) DEFAULT NULL,
  `data_cadastro` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Extraindo dados da tabela `tbl_notificacoes`
--

INSERT INTO `tbl_notificacoes` (`id_notificacao`, `tipo`, `remetente`, `destinatario`, `descricao`, `status`, `data_emissao`, `data_limite`, `data_programada_resolver`, `prioridade`, `arquivo_cobranca`, `comprovante_pagamento`, `meio_notificacao`, `meio_pagamento`, `pago_por`, `observacoes`, `usuario`, `data_cadastro`) VALUES
(1, 'AVISOS', 'UNIVERSO DESIGN', 'UNIVERSO DESIGN', 'BOLETO', 'RESOLVIDO', '2020-12-20 02:00:00', '2020-12-20 02:00:00', '2020-12-20 02:00:00', 'NORMAL', NULL, NULL, 'E-MAIL', NULL, NULL, 'TESTE', 'FABRICIO', '2020-12-20 13:01:38'),
(2, 'CONTAS A PAGAR', 'UNIVERSO DESIGN', 'UNIVERSO DESIGN', 'BOLETO', 'ADIAR', '2020-12-20 02:00:00', '2020-12-20 02:00:00', '2020-12-21 02:00:00', 'NORMAL', NULL, NULL, 'E-MAIL', NULL, NULL, '', 'FABRICIO', '2020-12-20 13:13:45');

-- --------------------------------------------------------

--
-- Estrutura da tabela `tbl_orcamento`
--

CREATE TABLE `tbl_orcamento` (
  `id_orcamento` int(8) NOT NULL,
  `id_cliente` int(8) DEFAULT NULL,
  `trabalho_servico` varchar(100) NOT NULL,
  `data_validade` date DEFAULT NULL,
  `valor_total` decimal(8,2) DEFAULT NULL,
  `desconto` decimal(6,2) DEFAULT NULL,
  `valor_final` decimal(8,2) DEFAULT NULL,
  `status` varchar(80) NOT NULL DEFAULT 'Em Análise',
  `condicao_pagamento` varchar(60) NOT NULL,
  `meio_pagamento` varchar(40) NOT NULL,
  `solicitante` varchar(100) NOT NULL,
  `observacao` varchar(100) DEFAULT NULL,
  `data_cadastro` datetime DEFAULT NULL,
  `usuario` varchar(60) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Extraindo dados da tabela `tbl_orcamento`
--

INSERT INTO `tbl_orcamento` (`id_orcamento`, `id_cliente`, `trabalho_servico`, `data_validade`, `valor_total`, `desconto`, `valor_final`, `status`, `condicao_pagamento`, `meio_pagamento`, `solicitante`, `observacao`, `data_cadastro`, `usuario`) VALUES
(38, 3, 'SERVIÇO DE COLOCAÇÃO DE BANNER', '2021-10-11', '1225.00', '269.00', '956.00', 'Em Análise', '-', '-', '', '', '2021-10-11 00:00:00', 'FABRICIO'),
(39, 3, 'SERVIÇO DE COLOCAÇÃO DE BANNER', '2021-10-11', '6519.00', '719.30', '5799.70', 'Em Análise', 'A VISTA', 'DINHEIRO', 'REGINA (ESPOSA)', '', '2021-10-11 00:00:00', 'FABRICIO'),
(40, 3, 'SERVIÇO DE COLOCAÇÃO DE BANNER', '2021-10-11', '32127.25', '6434.83', '25692.42', 'Em Análise', '-', '-', '', '', '2021-10-11 00:00:00', 'IVONILSON'),
(41, 3, 'SERVIÇO DE COLOCAÇÃO DE BANNER', '2021-10-12', '7156.25', '1898.91', '5257.30', 'Em Análise', 'A VISTA', 'DINHEIRO', 'REGINA (ESPOSA)', '', '2021-10-12 00:00:00', 'FABRICIO');

-- --------------------------------------------------------

--
-- Estrutura da tabela `tbl_os`
--

CREATE TABLE `tbl_os` (
  `id_os` int(8) NOT NULL,
  `id_orcamento` int(8) NOT NULL,
  `cod_os` varchar(20) NOT NULL,
  `contato` varchar(200) DEFAULT NULL,
  `endereco` varchar(200) NOT NULL,
  `cidade_uf` varchar(100) NOT NULL,
  `data_cadastro` datetime DEFAULT NULL,
  `data_agendamento` datetime DEFAULT NULL,
  `sit_pagamento` varchar(50) DEFAULT NULL,
  `status` varchar(20) NOT NULL DEFAULT 'PENDENTE',
  `observacao` varchar(1000) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Estrutura da tabela `tbl_produto`
--

CREATE TABLE `tbl_produto` (
  `id_prod` varchar(12) NOT NULL,
  `descricao` varchar(60) NOT NULL,
  `unidade_medida` varchar(20) NOT NULL,
  `preco_unitario` decimal(8,2) DEFAULT NULL,
  `quantidade_estoque` int(8) DEFAULT NULL,
  `data_cadastro` datetime DEFAULT NULL,
  `data_atualizacao` datetime DEFAULT NULL,
  `usuario` varchar(60) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Extraindo dados da tabela `tbl_produto`
--

INSERT INTO `tbl_produto` (`id_prod`, `descricao`, `unidade_medida`, `preco_unitario`, `quantidade_estoque`, `data_cadastro`, `data_atualizacao`, `usuario`) VALUES
('131', 'COPO 200 ML', 'un.', '1.00', NULL, '2021-02-18 00:00:00', NULL, NULL),
('131313', 'COPOS FESTA MÉDIO', 'un.', '2.00', NULL, '2021-05-29 00:00:00', NULL, NULL),
('54252', 'TOLDO LISO', 'm²', '9.85', NULL, '2021-02-18 00:00:00', NULL, NULL),
('8888', 'FITA', 'm', '3.25', NULL, '2020-12-30 00:00:00', NULL, NULL),
('999', 'LONA', 'm²', '2.00', NULL, '2020-12-30 00:00:00', NULL, NULL);

-- --------------------------------------------------------

--
-- Estrutura da tabela `tbl_user`
--

CREATE TABLE `tbl_user` (
  `id_user` int(8) NOT NULL,
  `user` varchar(15) DEFAULT NULL,
  `pass` varchar(8) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Extraindo dados da tabela `tbl_user`
--

INSERT INTO `tbl_user` (`id_user`, `user`, `pass`) VALUES
(1, 'IVONILSON', 'mmh999'),
(3, 'FABRICIO', '9999');

-- --------------------------------------------------------

--
-- Estrutura da tabela `tb_cidades`
--

CREATE TABLE `tb_cidades` (
  `nome_cidade` varchar(100) CHARACTER SET utf8 NOT NULL DEFAULT '',
  `uf` char(2) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Extraindo dados da tabela `tb_cidades`
--

INSERT INTO `tb_cidades` (`nome_cidade`, `uf`) VALUES
('BRASÍLIA', 'DF'),
('PLANALTINA', 'GO'),
('FORMOSA', 'GO'),
('PLANALTINA', 'DF'),
('SOBRADINHO', 'DF'),
('PARANOÁ', 'DF'),
('CRUZEIRO', 'DF'),
('CEILÂNDIA', 'DF'),
('TAGUATINGA', 'DF'),
('ÁGUAS CLARAS', 'DF'),
('ÁGUAS LINDAS DE GOIÁS', 'GO'),
('VALPARAÍSO DE GOIÁS', 'GO'),
('GOIÂNIA', 'GO'),
('ANÁPOLIS', 'GO');

-- --------------------------------------------------------

--
-- Estrutura da tabela `teste`
--

CREATE TABLE `teste` (
  `data` varchar(60) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Extraindo dados da tabela `teste`
--

INSERT INTO `teste` (`data`) VALUES
('adfadf'),
('123'),
('777'),
('5555'),
('teste'),
('teste'),
('adfaf'),
('44444'),
('teste'),
('7878'),
('78988'),
('teste'),
('foda-se'),
('teste');

--
-- Índices para tabelas despejadas
--

--
-- Índices para tabela `tbl_cliente`
--
ALTER TABLE `tbl_cliente`
  ADD PRIMARY KEY (`id_cliente`);

--
-- Índices para tabela `tbl_itens_orcamento`
--
ALTER TABLE `tbl_itens_orcamento`
  ADD PRIMARY KEY (`id`),
  ADD KEY `fk_id_orcamento` (`id_orcamento`);

--
-- Índices para tabela `tbl_notificacoes`
--
ALTER TABLE `tbl_notificacoes`
  ADD PRIMARY KEY (`id_notificacao`);

--
-- Índices para tabela `tbl_orcamento`
--
ALTER TABLE `tbl_orcamento`
  ADD PRIMARY KEY (`id_orcamento`),
  ADD KEY `fk_id_cliente` (`id_cliente`);

--
-- Índices para tabela `tbl_os`
--
ALTER TABLE `tbl_os`
  ADD PRIMARY KEY (`id_os`),
  ADD KEY `fk_id_orcamento_os` (`id_orcamento`);

--
-- Índices para tabela `tbl_produto`
--
ALTER TABLE `tbl_produto`
  ADD PRIMARY KEY (`id_prod`);

--
-- Índices para tabela `tbl_user`
--
ALTER TABLE `tbl_user`
  ADD PRIMARY KEY (`id_user`);

--
-- AUTO_INCREMENT de tabelas despejadas
--

--
-- AUTO_INCREMENT de tabela `tbl_cliente`
--
ALTER TABLE `tbl_cliente`
  MODIFY `id_cliente` int(8) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT de tabela `tbl_itens_orcamento`
--
ALTER TABLE `tbl_itens_orcamento`
  MODIFY `id` int(8) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=25;

--
-- AUTO_INCREMENT de tabela `tbl_notificacoes`
--
ALTER TABLE `tbl_notificacoes`
  MODIFY `id_notificacao` int(8) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT de tabela `tbl_orcamento`
--
ALTER TABLE `tbl_orcamento`
  MODIFY `id_orcamento` int(8) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=42;

--
-- AUTO_INCREMENT de tabela `tbl_os`
--
ALTER TABLE `tbl_os`
  MODIFY `id_os` int(8) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de tabela `tbl_user`
--
ALTER TABLE `tbl_user`
  MODIFY `id_user` int(8) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- Restrições para despejos de tabelas
--

--
-- Limitadores para a tabela `tbl_itens_orcamento`
--
ALTER TABLE `tbl_itens_orcamento`
  ADD CONSTRAINT `fk_id_orcamento` FOREIGN KEY (`id_orcamento`) REFERENCES `tbl_orcamento` (`id_orcamento`);

--
-- Limitadores para a tabela `tbl_orcamento`
--
ALTER TABLE `tbl_orcamento`
  ADD CONSTRAINT `fk_id_cliente` FOREIGN KEY (`id_cliente`) REFERENCES `tbl_cliente` (`id_cliente`);

--
-- Limitadores para a tabela `tbl_os`
--
ALTER TABLE `tbl_os`
  ADD CONSTRAINT `fk_id_orcamento_os` FOREIGN KEY (`id_orcamento`) REFERENCES `tbl_orcamento` (`id_orcamento`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
