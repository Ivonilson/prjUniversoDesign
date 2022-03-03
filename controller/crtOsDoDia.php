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
	$crtl->osDoDia();

?>