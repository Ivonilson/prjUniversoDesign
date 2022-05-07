<?php
require "model/PesquisaCliente.php";

class crtPesquisaCliente {


	public function pesquisaCliente()
	{	
		$dados = new PesquisaCliente();											
		$resultado = $dados->pesquisaCliente();
		include "view/pesquisa-cliente.php";
		return $resultado;
	}
}

$deletar = new PesquisaCliente();
$crtl = new crtPesquisaCliente();

if(isset($_POST['ipt-cod-delete']) && $_POST['ipt-cod-delete'] != '' && $_POST['ipt-confirmacao'] == 'true'){
	$deletar->deletarCliente();
}

$crtl->pesquisaCliente();

?>
