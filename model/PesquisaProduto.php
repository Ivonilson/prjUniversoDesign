<?php
require_once "Conn.php";


class PesquisaProduto {

	function pesqProduto()
	{
		
		$descricao = filter_input(INPUT_GET, 'palavra_chave');

		if($descricao != ''){
			$querySelect = "SELECT id_prod, descricao, tipo, unidade_medida, preco_unitario, quantidade_estoque, data_cadastro  FROM tbl_produto WHERE descricao LIKE '%$descricao%' || id_prod LIKE '%$descricao%'  || '$descricao' = 'TODOS' ORDER BY descricao";

			$conn = new Conn();
			$dadosProduto = $conn->getConn()->query($querySelect);

			$resultadoProduto = $dadosProduto->fetchAll(PDO::FETCH_ASSOC);

			return $resultadoProduto;
		}
	}


	function deletarProduto() {

		try {

			$dados = filter_input_array(INPUT_POST, FILTER_DEFAULT);
			//$form = filter_input(INPUT_POST, 'formEditarIntesOrcamento');

			if (!empty($dados['btnDeletarProduto'])) {
				unset($dados['btnDeletarProduto']);
			}

				$queryDeletar = "DELETE FROM tbl_produto WHERE id_prod = :id_prod";

				$conn = new Conn();
				$produto = $conn->getConn()->prepare($queryDeletar);

				$produto->bindParam(':id_prod', $dados['ipt-cod-delete']);

				$produto->execute();

			} catch(PDOException $erro){
				//echo "ERRO: ".$erro->getMessage();
			}

			if($produto->rowCount()) {
				//echo "window.location.href = '/?pagina=pesquisa-cliente&palavra_chave=".$palavra_chave;
				echo "<script>alert('Registro DELETADO com SUCESSO.')</script>";
				
				
			} else {
				echo "<script>alert('ERRO ao DELETAR registro. CONTATE O SUPORTE.')</script>";
				//print_r($produto->errorInfo());
			}

	}
}

?>