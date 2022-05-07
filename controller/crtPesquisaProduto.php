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

$crtl = new crtPesquisaProduto();
$deletar = new PesquisaProduto();


if(isset($_POST['ipt-cod-delete']) && $_POST['ipt-cod-delete'] != '' && $_POST['ipt-confirmacao'] == 'true'){
	$deletar->deletarProduto();
}

$crtl->pesquisaProduto();

?>