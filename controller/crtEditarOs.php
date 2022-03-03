<?php
require "model/EditarOs.php";
require "model/Cidade.php";

class crtEditarOs {

	public function editarOs()
	{	
		$usuario = new EditarOs();
		if(filter_input(INPUT_POST, 'ipt-os') != 'INDEFINIDO' && filter_input(INPUT_POST, 'ipt-os') != '') {
			if($usuario->edOs()) {
				return  "Ordem de Serviço atualizada com Sucesso!";
			} else {
				return  "ERRO. Verifique se você REALMENTE alterou alguma coisa ou Contate o Suporte.";
			}
		} 
	}
}

$crtl = new crtEditarOs();
$mensagem_erro = $crtl->editarOs();












	

	

	

	


?>