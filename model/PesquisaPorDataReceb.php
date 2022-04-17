<?php
require_once "Conn.php";


class PesquisaPorDataReceb {

	function pesquisaDataReceb()
	{
		
		$data_inicial = filter_input(INPUT_POST, 'data_inicial');
		$data_final = filter_input(INPUT_POST, 'data_final');

		try {
				$querySelect = "SELECT tbl_os.cod_os AS cod_os, tbl_os.id_orcamento AS id_orcamento, tbl_os.contato AS contato, tbl_os.endereco AS endereco, tbl_os.cidade_uf AS cidade_uf, tbl_os.data_cadastro AS data_cadastro, tbl_os.data_agendamento AS data_agendamento, tbl_os.sit_pagamento AS sit_pagamento, tbl_os.status AS status, tbl_os.observacao AS observacao, tbl_cliente.nome AS nome FROM tbl_os INNER JOIN tbl_orcamento ON tbl_os.id_orcamento = tbl_orcamento.id_orcamento INNER JOIN tbl_cliente ON tbl_orcamento.id_cliente = tbl_cliente.id_cliente WHERE tbl_os.data_cadastro >= '$data_inicial' AND tbl_os.data_cadastro <= '$data_final'";

				/*$querySelect = "SELECT cod_os, id_orcamento, contato, endereco, cidade_uf, data_cadastro, data_agendamento, sit_pagamento, status, observacao  FROM tbl_os WHERE data_cadastro >= '$data_inicial' AND data_cadastro <= '$data_final'";*/

				$conn = new Conn();
				$dadosPorDataReceb = $conn->getConn()->query($querySelect);

				/* bindParam não está funcionando, verificar o por que.
				$dadosPorDataRecb->bindParam(':dataInicial', $data_inicial);
				$dadosPorDataReceb->bindParam(':dataFinal', $data_final);
				*/

				$resultadoPorDataReceb = $dadosPorDataReceb->fetchAll(PDO::FETCH_ASSOC);

				return $resultadoPorDataReceb;

		} catch(PDOException $e) {
			echo "ERRO: ".$e->getMessage();
		}
		

	}
}
