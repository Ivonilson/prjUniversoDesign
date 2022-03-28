<?php
require_once "Conn.php";


class PesquisaProduto {

	function pesqProduto()
	{
		
		$descricao = filter_input(INPUT_GET, 'palavra_chave');

		if($descricao != ''){
			$querySelect = "SELECT id_prod, descricao, unidade_medida, preco_unitario, quantidade_estoque, data_cadastro  FROM tbl_produto WHERE descricao LIKE '%$descricao%' || id_prod LIKE '%$descricao%'  || '$descricao' = 'TODOS' ORDER BY descricao";

			$conn = new Conn();
			$dadosProduto = $conn->getConn()->query($querySelect);

			$resultadoProduto = $dadosProduto->fetchAll(PDO::FETCH_ASSOC);

			return $resultadoProduto;
		}
	}
}

?>