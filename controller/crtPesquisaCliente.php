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

$crtl = new crtPesquisaCliente();
$crtl->pesquisaCliente();

?>
