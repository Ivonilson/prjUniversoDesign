<?php
require_once "Conn.php";


class PesquisaCliente {

	function pesquisaCliente()
	{

		$palavra_chave = filter_input(INPUT_GET, 'palavra_chave');

		If($palavra_chave != ''){

		try {
				$querySelect = "SELECT id_cliente, nome, cpf_cnpj, endereco, bairro, cidade_uf, tel_fixo, tel_cel, email, data_cadastro FROM tbl_cliente  WHERE nome LIKE '%$palavra_chave%' || '$palavra_chave' = 'TODOS'";

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


	function deletarCliente() {

		try {

			$dados = filter_input_array(INPUT_POST, FILTER_DEFAULT);
			//$form = filter_input(INPUT_POST, 'formEditarIntesOrcamento');

			if (!empty($dados['btnDeletarCliente'])) {
				unset($dados['btnDeletarCliente']);
			}

				$queryDeletar = "DELETE FROM tbl_cliente WHERE id_cliente = :id_cliente";

				$conn = new Conn();
				$cliente = $conn->getConn()->prepare($queryDeletar);

				$cliente->bindParam(':id_cliente', $dados['ipt-cod-delete']);

				$cliente->execute();

			} catch(PDOException $erro){
				//echo "ERRO: ".$erro->getMessage();
			}

			if($cliente->rowCount()) {
				//echo "window.location.href = '/?pagina=pesquisa-cliente&palavra_chave=".$palavra_chave;
				echo "<script>alert('Registro DELETADO com SUCESSO.')</script>";
				
				
			} else {
				echo "<script>alert('ERRO ao DELETAR registro. Verifique se o cliente não está vinculado com algum orçamento. Caso esteja, a desvinculação é necessária para possibilitar a deleção do mesmo.')</script>";
				//print_r($cliente->errorInfo());
			}

	}
}

?>
