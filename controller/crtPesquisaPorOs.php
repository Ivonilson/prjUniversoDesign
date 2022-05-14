<?php
require "model/PesquisaPorOs.php";
require "model/OsDoDia.php";

class crtPesquisaPorOs {

	public function pesquisaPorOs()
	{	
		include "view/pesquisa-por-os.php";
	}
}

	$deletar = new OsDoDia();

	if(isset($_POST['ipt-cod-delete']) && $_POST['ipt-cod-delete'] != '' && $_POST['ipt-confirmacao'] == 'true'){
		$deletar->deletarOs();
	}

?>