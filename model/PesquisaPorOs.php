<?php
require_once "Conn.php";


class PesquisaPorOs {

	function pesqPorOs()
	{
		
		$numero_os = filter_input(INPUT_POST, 'ipt-cod-os');

		$querySelect = "SELECT tbl_os.cod_os AS cod_os, tbl_os.id_orcamento AS id_orcamento, tbl_os.contato AS contato, tbl_os.endereco AS endereco, tbl_os.cidade_uf AS cidade_uf, tbl_os.data_agendamento AS data_agendamento, tbl_os.data_cadastro AS data_cadastro, tbl_os.sit_pagamento AS sit_pagamento, tbl_os.status AS status, tbl_os.observacao AS observacao, tbl_cliente.nome AS nome FROM tbl_os INNER JOIN tbl_orcamento ON tbl_os.id_orcamento = tbl_orcamento.id_orcamento INNER JOIN tbl_cliente ON tbl_orcamento.id_cliente = tbl_cliente.id_cliente WHERE tbl_os.cod_os = '$numero_os'";

		$conn = new Conn();
		$dadosPorOs = $conn->getConn()->query($querySelect);

		$resultadoPorOs = $dadosPorOs->fetchAll(PDO::FETCH_ASSOC);

		return $resultadoPorOs;

	}
}

?>