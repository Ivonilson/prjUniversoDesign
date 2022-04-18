<?php
require "model/PesquisaProduto.php";

class crtPesquisaProduto {

	public function pesquisaProduto()
	{	
		$produto = new PesquisaProduto();
		$produtos = $produto->pesqProduto();
		include "view/pesquisa-produto.php";
		return $produtos;
	}
}

?>