-- Estrutura da tabela `tbl_cliente`
--
CREATE TABLE `tbl_cliente` (
  `id_cliente` int(8) NOT NULL PRIMARY KEY AUTO_INCREMENT, 
  `nome` varchar(100) DEFAULT NULL,
  `cpf_cnpj` varchar(20) DEFAULT NULL UNIQUE,
  `endereco` varchar(150) DEFAULT NULL,
  `bairro` varchar(30) DEFAULT NULL,
  `cidade_uf` varchar(100) DEFAULT NULL,
  `tel_fixo` varchar(40) DEFAULT NULL,
  `tel_cel` varchar(40) DEFAULT NULL,
  `email` varchar(60) DEFAULT NULL,
  `data_cadastro` timestamp NULL DEFAULT NULL,
  `data_atualizacao` timestamp NULL DEFAULT NULL,
  `usuario` varchar(60) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

  -*-*-*-*-*-*-*-*-*-*-*-*-*

  -- Estrutura da tabela `tbl_despesa`
--
CREATE TABLE `tbl_despesa` (
  `id` int(8) NOT NULL PRIMARY KEY AUTO_INCREMENT,
  `id_despesa` varchar(10) NOT NULL,
  `tipo` varchar(100) DEFAULT NULL,
  `grupo` varchar(100) DEFAULT NULL,
  `detalhamento` varchar(100) DEFAULT NULL,
  `valor` decimal(20,3) DEFAULT NULL,
  `forma_pagamento` varchar(60) NOT NULL,
  `data_referencia` datetime NOT NULL,
  `data_processamento` timestamp NOT NULL DEFAULT current_timestamp(),
  `usuario` varchar(60) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

  -*-*-*-*-*-*-*-*-*-*-*-*-*

  -- Estrutura da tabela `tbl_itens_orcamento`
--
CREATE TABLE `tbl_itens_orcamento` (
  `id` int(8) NOT NULL PRIMARY KEY AUTO_INCREMENT,
  `id_orcamento` int(8) NOT NULL,
  `tipo` varchar(30) NOT NULL,
  `descricao` varchar(100) DEFAULT NULL,
  `valor_unitario` decimal(10,2) DEFAULT NULL,
  `quantidade` int(5) DEFAULT NULL,
  `valor_total` decimal(20,3) DEFAULT NULL,
  `desconto` decimal(20,3) DEFAULT NULL,
  `total_pagar` decimal(20,3) DEFAULT NULL,
  `data_cadastro` datetime DEFAULT NULL,
  `usuario` varchar(60) DEFAULT NULL,
   FOREIGN KEY (`id_orcamento`) REFERENCES `tbl_orcamento` (`id_orcamento`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

  -*-*-*-*-*-*-*-*-*-*-*-*-*

  CREATE TABLE `tbl_notificacoes` (
  `id_notificacao` int(8) NOT NULL PRIMARY KEY AUTO_INCREMENT,
  `tipo` varchar(30) DEFAULT NULL,
  `remetente` varchar(60) DEFAULT NULL,
  `destinatario` varchar(60) DEFAULT NULL,
  `descricao` varchar(100) DEFAULT NULL,
  `status` varchar(40) NOT NULL DEFAULT 'PENDENTE',
  `data_emissao` timestamp NULL DEFAULT NULL,
  `data_limite` date DEFAULT NULL,
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


  -*-*-*-*-*-*-*-*-*-*-*-*-*

  -- Estrutura da tabela `tbl_orcamento`
--
CREATE TABLE `tbl_orcamento` (
  `id_orcamento` int(8) NOT NULL PRIMARY KEY AUTO_INCREMENT,
  `id_cliente` int(8) DEFAULT NULL,
  `trabalho_servico` varchar(100) NOT NULL,
  `data_validade` date DEFAULT NULL,
  `status` varchar(80) NOT NULL DEFAULT 'Em Análise',
  `condicao_pagamento` varchar(60) NOT NULL,
  `meio_pagamento` varchar(40) NOT NULL,
  `solicitante` varchar(100) NOT NULL,
  `observacao` varchar(100) DEFAULT NULL,
  `data_cadastro` datetime DEFAULT NULL,
  `usuario` varchar(60) DEFAULT NULL,
  FOREIGN KEY (`id_cliente`) REFERENCES `tbl_cliente` (`id_cliente`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

  -*-*-*-*-*-*-*-*-*-*-*-*-*

-- Estrutura da tabela `tbl_os`
--
CREATE TABLE `tbl_os` (
  `id_os` int(8) NOT NULL PRIMARY KEY AUTO_INCREMENT,
  `id_orcamento` int(8) NOT NULL,
  `cod_os` varchar(20) NOT NULL,
  `contato` varchar(200) DEFAULT NULL,
  `endereco` varchar(200) NOT NULL,
  `cidade_uf` varchar(100) NOT NULL,
  `data_cadastro` timestamp NULL DEFAULT NULL,
  `data_agendamento` timestamp NULL DEFAULT NULL,
  `sit_pagamento` varchar(50) DEFAULT NULL,
  `status` varchar(20) NOT NULL DEFAULT 'PENDENTE',
  `observacao` varchar(1000) DEFAULT NULL,
  CONSTRAINT `fk_id_orcamento_os` FOREIGN KEY (`id_orcamento`) REFERENCES `tbl_orcamento` (`id_orcamento`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

  -*-*-*-*-*-*-*-*-*-*-*-*-*

  -- Estrutura da tabela `tbl_planejamento_anual_receita_despesa`
--
CREATE TABLE `tbl_planejamento_anual_receita_despesa` (
  `id_plan_rec_desp` int(8) NOT NULL PRIMARY KEY AUTO_INCREMENT,
  `mes` varchar(30) DEFAULT NULL,
  `ano` varchar(8) DEFAULT NULL,
  `mes_ano_planejado` varchar(60) DEFAULT NULL,
  `valor_receita` decimal(20,3) DEFAULT NULL,
  `valor_despesa` decimal(20,3) DEFAULT NULL,
  `data_processamento` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `usuario` varchar(60) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

  -*-*-*-*-*-*-*-*-*-*-*-*-*

  -- Estrutura da tabela `tbl_produto`
--
CREATE TABLE `tbl_produto` (
  `id_prod` varchar(12) NOT NULL PRIMARY KEY,
  `tipo` varchar(30) NOT NULL,
  `descricao` varchar(60) NOT NULL,
  `unidade_medida` varchar(20) NOT NULL,
  `preco_unitario` decimal(8,2) DEFAULT NULL,
  `quantidade_estoque` decimal(8,2) DEFAULT NULL,
  `data_cadastro` timestamp NULL DEFAULT NULL,
  `data_atualizacao` datetime DEFAULT NULL,
  `usuario` varchar(60) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

  -*-*-*-*-*-*-*-*-*-*-*-*-*

  -- Estrutura da tabela `tbl_receita`
--
CREATE TABLE `tbl_receita` (
  `id` int(8) NOT NULL PRIMARY KEY AUTO_INCREMENT,
  `id_receita` varchar(15) DEFAULT NULL,
  `tipo` varchar(100) DEFAULT NULL,
  `detalhamento` varchar(200) DEFAULT NULL,
  `valor` decimal(20,3) DEFAULT NULL,
  `forma_pagamento` varchar(60) DEFAULT NULL,
  `data_referencia` datetime DEFAULT NULL,
  `data_processamento` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `usuario` varchar(60) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

  -*-*-*-*-*-*-*-*-*-*-*-*-*

  -- Estrutura da tabela `tbl_user`
--CREATE TABLE `tbl_user` (
  `id_user` int(8) NOT NULL PRIMARY KEY AUTO_INCREMENT,
  `user` varchar(15) DEFAULT NULL,
  `pass` varchar(8) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

  -*-*-*-*-*-*-*-*-*-*-*-*-*

  -- Estrutura da tabela `tb_cidades`
--
CREATE TABLE `tb_cidades` (
  `nome_cidade` varchar(100) CHARACTER SET utf8 NOT NULL DEFAULT '',
  `uf` char(2) DEFAULT NULL
) ENGINE=InnoDB DEFAULT  CHARSET=utf8;





