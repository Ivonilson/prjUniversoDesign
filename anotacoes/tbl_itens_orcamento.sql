CREATE TABLE IF NOT EXISTS tbl_itens_orcamento (
	
	id int(8) AUTO_INCREMENT PRIMARY KEY, 
	id_orcamento int(8),
	descricao varchar(100),
	valor_unitario decimal(10,2),
	quantidade decimal (6,2),
	valor_total decimal(10,2),
	desconto decimal (10,2),
	total_pagar decimal(10,2),
	data_cadastro datetime,
	usuario varchar(60),
	CONSTRAINT fk_id_orcamento_itens FOREIGN KEY (id_orcamento)
	REFERENCES tbl_orcamento(id_orcamento)

) engine = InnoDB;