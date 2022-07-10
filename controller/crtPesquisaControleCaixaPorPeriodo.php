<?php
require "model/PesquisaControleCaixaPorPeriodo.php";

class crtPesquisaControleCaixaPorPeriodo {

	public function pesqControleCaixaPorPeriodo()
	{	
		include "view/controle-caixa-relatorio.php";
	}
}

	/*$deletar = new OsDoDia();

	if(isset($_POST['ipt-cod-delete']) && $_POST['ipt-cod-delete'] != '' && $_POST['ipt-confirmacao'] == 'true'){
		$deletar->deletarOs();
	}*/
?>