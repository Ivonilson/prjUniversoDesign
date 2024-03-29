<?php
require_once "Conn.php";

class OsDoDia {

	public function dadosDoDia()
	{
		
		try {

		$querySelect = "SELECT tbl_os.cod_os AS cod_os, tbl_orcamento.id_orcamento AS numeroOrcamento, tbl_cliente.nome AS nome, tbl_os.data_cadastro AS data_cadastro, tbl_os.data_agendamento AS data_agendamento, tbl_os.sit_pagamento AS sit_pagamento, tbl_os.status AS status, tbl_os.observacao AS observacao FROM tbl_os INNER JOIN tbl_orcamento ON tbl_os.id_orcamento = tbl_orcamento.id_orcamento INNER JOIN tbl_cliente ON tbl_orcamento.id_cliente = tbl_cliente.id_cliente ORDER BY tbl_os.id_os DESC";

		$conn = new Conn();
		$dadosSelect = $conn->getConn()->query($querySelect);
		$resultados = $dadosSelect->fetchAll(PDO::FETCH_ASSOC);

		return $resultados;

		} catch(PDOException $erro){
			//echo "Erro: ".$erro->getMessage();
		}

	}


	function deletarOs() {

		try {

			$dados = filter_input_array(INPUT_POST, FILTER_DEFAULT);
			//$form = filter_input(INPUT_POST, 'formEditarIntesOrcamento');

			if (!empty($dados['btnDeletarOs'])) {
				unset($dados['btnDeletarOs']);
			}

				$queryDeletar = "DELETE FROM tbl_os WHERE cod_os = :cod_os";

				$conn = new Conn();
				$os = $conn->getConn()->prepare($queryDeletar);

				$os->bindParam(':cod_os', $dados['ipt-cod-delete']);

				$os->execute();

			} catch(PDOException $erro){
				echo "ERRO: ".$erro->getMessage();
			}

			if($os->rowCount()) {
				//echo "window.location.href = '/?pagina=pesquisa-cliente&palavra_chave=".$palavra_chave;
				echo "<script>alert('Registro DELETADO com SUCESSO.')</script>";
				
				
			} else {
				echo "<script>alert('ERRO ao DELETAR registro. CONTATE O SUPORTE.')</script>";
				//print_r($os->errorInfo());
			
			}

	}
}

?>
