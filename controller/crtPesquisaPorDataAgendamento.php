<?php
require "model/PesquisaPorDataAgendamento.php";
require "model/OsDoDia.php";

class crtPesquisaPorDataAgendamento {

	public function PesquisaPorDataAgendamento()
	{	
		include "view/pesquisa-por-data-agendamento.php";
	}
}

$deletar = new OsDoDia();

if(isset($_POST['ipt-cod-delete']) && $_POST['ipt-cod-delete'] != '' && $_POST['ipt-confirmacao'] == 'true'){
	$deletar->deletarOs();
}

?>