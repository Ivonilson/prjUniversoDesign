<?php
require "model/OsDoDia.php";

class crtOsDoDia {

	public function osDoDia()
		{
			$dados = new OsDoDia();
			$resultado = $dados->dadosDoDia();
			include "view/os-do-dia.php";
			return $resultado;
		}
	}

	$crtl = new crtOsDoDia();
	$deletar = new OsDoDia();

	if(isset($_POST['ipt-cod-delete']) && $_POST['ipt-cod-delete'] != '' && $_POST['ipt-confirmacao'] == 'true'){
		$deletar->deletarOs();
	}


	$crtl->osDoDia();

?>