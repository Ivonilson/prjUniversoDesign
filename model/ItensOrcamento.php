<?php
require_once "Conn.php";


class ItensOrcamento {

		public function pesqItensOrcamento()
		{

			$id = filter_input(INPUT_GET, 'id_orcamento');

			if($id != '' || $id != NULL){

				$querySelect = "SELECT tbl_itens_orcamento.id AS id, tbl_itens_orcamento.id_orcamento AS id_orcamento, tbl_itens_orcamento.tipo AS tipo, tbl_itens_orcamento.descricao AS descricao, tbl_itens_orcamento.valor_unitario AS valor_unitario, tbl_itens_orcamento.quantidade AS quantidade, tbl_itens_orcamento.valor_total AS valor_total, tbl_itens_orcamento.desconto AS desconto, tbl_itens_orcamento.total_pagar AS total_pagar, tbl_orcamento.id_cliente AS id_cliente, tbl_orcamento.data_cadastro AS data_cadastro, tbl_orcamento.data_validade AS data_validade, tbl_orcamento.usuario AS usuario, tbl_cliente.nome AS nome_cliente FROM tbl_itens_orcamento INNER JOIN tbl_orcamento ON tbl_itens_orcamento.id_orcamento = tbl_orcamento.id_orcamento INNER JOIN tbl_cliente ON tbl_orcamento.id_cliente = tbl_cliente.id_cliente WHERE tbl_itens_orcamento.id_orcamento = '$id'";

				$conn = new Conn();
				$dadosItensOrcamento = $conn->getConn()->query($querySelect);

				$resultadoItensOrcamento = $dadosItensOrcamento->fetchAll(PDO::FETCH_ASSOC);

				return $resultadoItensOrcamento;
			}

		}

		public function pesqItensDeServico()
		{

			$id = filter_input(INPUT_GET, 'id_orcamento');

			if($id != '' || $id != NULL){

				$querySelect = "SELECT tbl_itens_orcamento.tipo as tipo, SUM(tbl_itens_orcamento.valor_total) as valor_total_serv, SUM(tbl_itens_orcamento.desconto) as valor_desconto_serv, SUM(tbl_itens_orcamento.total_pagar) as total_pagar_serv FROM tbl_itens_orcamento INNER JOIN tbl_orcamento ON tbl_itens_orcamento.id_orcamento = tbl_orcamento.id_orcamento INNER JOIN tbl_cliente ON tbl_orcamento.id_cliente = tbl_cliente.id_cliente WHERE tbl_itens_orcamento.id_orcamento = '$id' AND tbl_itens_orcamento.tipo = 'OPERACIONAL'";

				$conn = new Conn();
				$dadosItensOrcamento = $conn->getConn()->query($querySelect);

				$resultadoItensServico = $dadosItensOrcamento->fetchAll(PDO::FETCH_ASSOC);

				return $resultadoItensServico;
			}

		}

		public function totalizadorOrcamento()
		{

			$id = filter_input(INPUT_GET, 'id_orcamento');

			if($id != '' || $id != NULL){

				$querySelect = "SELECT SUM(tbl_itens_orcamento.valor_total) AS sum_valor_total, SUM(tbl_itens_orcamento.desconto) AS sum_desconto, SUM(tbl_itens_orcamento.total_pagar) AS sum_total_pagar FROM tbl_itens_orcamento INNER JOIN tbl_orcamento ON tbl_itens_orcamento.id_orcamento = tbl_orcamento.id_orcamento WHERE tbl_itens_orcamento.id_orcamento = '$id'";

				$conn = new Conn();
				$dadosItensOrcamento = $conn->getConn()->query($querySelect);

				$resultadoTotalizadorOrcamento = $dadosItensOrcamento->fetchAll(PDO::FETCH_ASSOC);

				return $resultadoTotalizadorOrcamento;
			}

		}


		public function editarItemOrcamento()
		{
			try {

			$dados = filter_input_array(INPUT_POST, FILTER_DEFAULT);
			$desconto = str_replace(',' , '.' , $dados['ipt-desconto']);

			if (!empty($dados['btnEditarItensOrcamento'])) {
				unset($dados['btnEditarItensOrcamento']);
			}

				$queryEditar = "UPDATE tbl_itens_orcamento SET desconto = ((:desconto/100) * valor_total), total_pagar = (valor_total - (valor_total * (:desconto/100))) WHERE id = :id";

				/*$queryEditar = "UPDATE tbl_itens_orcamento SET quantidade = :quantidade,  desconto = :desconto WHERE id = :id";*/

				$conn = new Conn();
				$dadosItensOrcamento = $conn->getConn()->prepare($queryEditar);

				$dadosItensOrcamento->bindParam(':desconto', $desconto);
				$dadosItensOrcamento->bindParam(':id', $dados['ipt-id']);

				$dadosItensOrcamento->execute();
				
			} catch(PDOException $erro){
				//echo "ERRO: ".$erro->getMessage();
			}

			if($dadosItensOrcamento->rowCount()) {
				echo "<script>alert('Registro ALTERADO com SUCESSO.')</script>";
				//echo "<script>document.location.reload(true)</script>";
				//echo "<script>document.location.href = '/?pagina=itens-orcamento&id_orcamento=</script>".$dados['ipt-id'];
				/*echo "<script>window.location.href = '/?pagina=pesquisa-por-orcamento&id_prod=".$dados['ipt-id-produto']."'</script>";*/
				//echo "<script>window.location.href = '../view/demandas-do-dia.php'</script>";
				
			} else {
				echo "<script>alert('ERRO ao ALTERAR Registro.')</script>";
				//print_r($dadosItensOrcamento->errorInfo());
			}

		}

	public function deletarItemOrcamento()
		{

			try {

			$dados = filter_input_array(INPUT_POST, FILTER_DEFAULT);
			//$form = filter_input(INPUT_POST, 'formEditarIntesOrcamento');

			if (!empty($dados['btnDeletarItensOrcamento'])) {
				unset($dados['btnDeletarItensOrcamento']);
			}

				$queryDeletar = "DELETE FROM tbl_itens_orcamento WHERE id = :id";

				$conn = new Conn();
				$dadosItensOrcamento = $conn->getConn()->prepare($queryDeletar);

				$dadosItensOrcamento->bindParam(':id', $dados['ipt-cod-delete']);

				$dadosItensOrcamento->execute();

			} catch(PDOException $erro){
				//echo "ERRO: ".$erro->getMessage();
			}

			if($dadosItensOrcamento->rowCount()) {
				echo "<script>alert('Item EXCLUÍDO com SUCESSO.')</script>";
				//echo "window.location.href = '/?pagina=itens-orcamento&id_orcamento=".$dados['ipt-cod-delete'];
				
			} else {
				echo "<script>alert('ERRO ao EXCLUÍR Item.')</script>";
				//print_r($dadosItensOrcamento->errorInfo());
			}

		}

}

?>
