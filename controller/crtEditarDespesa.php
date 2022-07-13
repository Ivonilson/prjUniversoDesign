<?php
require "model/EditarDespesa.php";

	class crtEditarDespesa {

		public function editarDespesa()
		{	

			if(filter_input(INPUT_POST, 'ipt-id-despesa') != 'INDEFINIDO' && filter_input(INPUT_POST, 'sel-tipo') != '') {
				$usuario = new EditarDespesa();
				if($usuario->edDespesa()) {
					return "Despesa atualizada com sucesso!";
				} else {
					return "ERRO. Verifique se você REALMENTE alterou alguma coisa ou Contate o Suporte.";
				}

			} else {
                $mensagem_erro = "";
            }
		}

	}

	$crtl = new crtEditarDespesa();
	$mensagem_erro = $crtl->editarDespesa();
	

?>
