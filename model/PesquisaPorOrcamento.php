<?php
require_once "Conn.php";


class PesquisaPorOrcamento
{

	public function pesqPorOrcamento()
	{

		$palavraChave = filter_input(INPUT_GET, 'ipt-pesquisa-orcamento');
		//$palavraChave = '';

		if ($palavraChave != '' || $palavraChave != NULL) {

			$querySelect = "SELECT tbl_orcamento.id_orcamento AS id_orcamento, tbl_cliente.nome AS nome, tbl_orcamento.trabalho_servico AS servico, tbl_orcamento.status AS status, tbl_orcamento.prazo AS prazo, tbl_orcamento.trabalho_servico AS trabalho_servico, tbl_orcamento.data_cadastro AS data_cadastro, tbl_orcamento.data_validade AS data_validade, tbl_orcamento.observacao AS observacao FROM tbl_orcamento INNER JOIN tbl_cliente ON tbl_orcamento.id_cliente = tbl_cliente.id_cliente WHERE tbl_orcamento.id_orcamento LIKE '%$palavraChave%' || '$palavraChave' = 'TODOS' || tbl_cliente.nome LIKE '%$palavraChave%' GROUP BY id_orcamento";

			$conn = new Conn();
			$dadosPorOrcamento = $conn->getConn()->query($querySelect);

			$resultadoPorOrcamento = $dadosPorOrcamento->fetchAll(PDO::FETCH_ASSOC);

			return $resultadoPorOrcamento;
		}
	}

	public function deletarOrcamento()

	{

		try {

			$orcamento_deletar = filter_input_array(INPUT_POST, FILTER_DEFAULT);

			$queryDeletarOrcamento = "DELETE FROM tbl_orcamento WHERE id_orcamento = :id_orcamento";
			$conn = new Conn();
			$orcamento = $conn->getConn()->prepare($queryDeletarOrcamento);

			$orcamento->bindParam(':id_orcamento', $orcamento_deletar['ipt-orcamento-deletar']);
			$orcamento->execute();
		} catch (PDOException $error) {
			//echo "Erro: ".$error->getMessage();
		}

		if ($orcamento->rowCount()) {
			echo "<script>alert('Orçamento EXCLUÍDO com SUCESSO!!!')</script>";
			//echo "window.location.href='/?pagina=pesquisa-por-orcamento";
		} else {
			//echo "<script>alert('ERRO ao excluir orçamento.')</script>";
			echo "<script>alert('Existem Itens e/ou Ordens de Serviço vinculados ao Orçamento. Para excluir todo o orçamento EXCLUA todos os itens e/ou ordens de serviço vinculados ao mesmo e tente novamente.')</script>";
			//echo "window.location.href='/?pagina=pesquisa-por-orcamento";

			//print_r($orcamento->errorInfo());
		}
	}

	public function editarOrcamento()
	{
		try {

			$dados = filter_input_array(INPUT_POST, FILTER_DEFAULT);

			if (!empty($dados['btnEditarOrcamento'])) {
				unset($dados['btnEditarOrcamento']);
			}

			$queryEditar = "UPDATE tbl_orcamento SET status = :status, data_validade = :data_validade, prazo = :prazo, trabalho_servico = :trabalho_servico, observacao = :observacao WHERE id_orcamento = :id_orcamento";


			$conn = new Conn();
			$dadosOrcamento = $conn->getConn()->prepare($queryEditar);

			$dadosOrcamento->bindParam(':trabalho_servico', $dados['ipt-servico']);
			$dadosOrcamento->bindParam(':status', $dados['sel-status']);
			$dadosOrcamento->bindParam(':data_validade', $dados['ipt-validade']);
			$dadosOrcamento->bindParam(':prazo', $dados['ipt-prazo']);
			$dadosOrcamento->bindParam(':observacao', $dados['ta-observacao']);
			$dadosOrcamento->bindParam(':id_orcamento', $dados['ipt-id-orcamento']);

			$dadosOrcamento->execute();
			return true;

		} catch (PDOException $erro) {
			//echo "ERRO: ".$erro->getMessage();
		}
	}
}
