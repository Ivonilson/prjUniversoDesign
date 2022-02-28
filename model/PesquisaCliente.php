<?php
require_once "Conn.php";


class PesquisaCliente {

	function pesquisaCliente()
	{

		$nome = filter_input(INPUT_POST, 'ipt-nome-cliente');

		If($nome != ''){

		try {
				$querySelect = "SELECT id_cliente, nome, cpf_cnpj, endereco, bairro, cidade_uf, tel_fixo, tel_cel, email, data_cadastro FROM tbl_cliente  WHERE nome LIKE '%$nome%' || '$nome' = 'TODOS'";

				/*$querySelect = "SELECT cod_os, id_orcamento, contato, endereco, cidade_uf, data_cadastro, data_agendamento, sit_pagamento, status, observacao  FROM tbl_os WHERE data_cadastro >= '$data_inicial' AND data_cadastro <= '$data_final'";*/

				$conn = new Conn();
				$dadosCliente = $conn->getConn()->query($querySelect);

				/* bindParam não está funcionando, verificar o por que.
				$dadosPorDataRecb->bindParam(':dataInicial', $data_inicial);
				$dadosPorDataReceb->bindParam(':dataFinal', $data_final);
				*/

				$resultado = $dadosCliente->fetchAll(PDO::FETCH_ASSOC);

				return $resultado;

		} catch(PDOException $e) {
			echo "ERRO: ".$e->getMessage();
		}

		}
		
	}
}


?>