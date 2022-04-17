<?php
require "model/ItensOrcamento.php";

class crtItensOrcamento {

	public function ItensOrcamento()
	{	
		$itensOrcamento = new ItensOrcamento();
		$resultado = $itensOrcamento->pesqItensOrcamento();
		include_once "view/itens-orcamento.php";
	}
}

$Item = new ItensOrcamento();

if(isset($_POST['ipt-id']) && $_POST['ipt-id'] != ''){
	$Item->editarItemOrcamento();
}

if(isset($_POST['ipt-cod-delete']) && $_POST['ipt-cod-delete'] != '' && $_POST['ipt-confirmacao'] == 'true'){
	$Item->deletarItemOrcamento();
}
