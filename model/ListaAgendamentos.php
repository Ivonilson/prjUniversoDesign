<?php
require_once "Conn.php";

class ListaAgendamentos {

	function dadosListaAgendamento()
	{
		
		$querySelect = "SELECT tbl_os.cod_os AS cod_os, tbl_cliente.nome AS nome, tbl_os.contato AS contato, tbl_os.endereco AS endereco, tbl_os.cidade_uf AS cidade_uf, tbl_os.data_agendamento AS data_agendamento, tbl_os.sit_pagamento AS sit_pagamento, tbl_os.status AS status, tbl_os.observacao AS observacao FROM tbl_os INNER JOIN tbl_orcamento ON tbl_os.id_orcamento = tbl_orcamento.id_orcamento INNER JOIN tbl_cliente ON tbl_orcamento.id_cliente = tbl_cliente.id_cliente  WHERE tbl_os.status = 'PENDENTE' ORDER BY tbl_os.cidade_uf ASC";

		//$querySelect = "SELECT * FROM tbl_os WHERE status = 'PENDENTE' ORDER BY cidade_uf ASC";

		$conn = new Conn();
		$dadosSelect = $conn->getConn()->query($querySelect);
		$resultados = $dadosSelect->fetchAll(PDO::FETCH_ASSOC);

		return $resultados;

	}

	function quantListaAgendamento()
	{
		
		$querySelect = "SELECT COUNT(cod_os) AS total  FROM tbl_os WHERE status = 'PENDENTE' ORDER BY cidade_uf ASC";

		//$querySelect = "SELECT cod_os, tipo, banco, empresa, proponente, cidade, bairro, uf, data_receb, data_entrega, status, notas_importantes  FROM controle_demandas LIMIT 50";

		$conn = new Conn();
		$dadosSelect = $conn->getConn()->query($querySelect);
		$quantidade = $dadosSelect->fetchAll(PDO::FETCH_ASSOC);

		return $quantidade;

	}
}

?>
