<?php
require "model/PesquisaPorDataReceb.php";
require "model/OsDoDia.php";


class crtPesquisaPorDataReceb {

	public function PesquisaPorDataReceb()
	{	
		include "view/pesquisa-por-data-receb.php";
	}
}

	$deletar = new OsDoDia();

	if(isset($_POST['ipt-cod-delete']) && $_POST['ipt-cod-delete'] != '' && $_POST['ipt-confirmacao'] == 'true'){
		$deletar->deletarOs();
	}
?>