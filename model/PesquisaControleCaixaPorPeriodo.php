<?php
require_once "Conn.php";


class PesquisaControleCaixaPorPeriodo {

	function pesquisaControleCaixaPorPeriodo()
	{
		
		$data_inicial = filter_input(INPUT_POST, 'data_inicial');
		$data_final = filter_input(INPUT_POST, 'data_final');
		$data_final = $data_final . " 23:59:59";
		//echo $data_final;

		try {
				$querySelect = "SELECT id_despesa, tipo, descricao, detalhamento, valor, forma_pagamento, data_referencia, data_processamento, usuario from tbl_despesa  WHERE data_referencia >= '$data_inicial' AND data_referencia <= '$data_final'";

				/*$querySelect = "SELECT cod_os, id_orcamento, contato, endereco, cidade_uf, data_cadastro, data_agendamento, sit_pagamento, status, observacao  FROM tbl_os WHERE data_cadastro >= '$data_inicial' AND data_cadastro <= '$data_final'";*/

				$conn = new Conn();
				$dadosPorPeriodo = $conn->getConn()->query($querySelect);

				/* bindParam não está funcionando, verificar o por que.
				$dadosPorDataRecb->bindParam(':dataInicial', $data_inicial);
				$dadosPorDataReceb->bindParam(':dataFinal', $data_final);
				*/

				$resultadoPorPeriodo = $dadosPorPeriodo->fetchAll(PDO::FETCH_ASSOC);

				return $resultadoPorPeriodo;

		} catch(PDOException $e) {
			echo "ERRO: ".$e->getMessage();
		}
		

	}
}

?>
