<?php
require "model/EditarCliente.php";
require "model/Cidade.php";

	class crtEditarCliente {

		public function editarCliente()
		{	

			if(filter_input(INPUT_POST, 'ipt-nome') != 'INDEFINIDO' && filter_input(INPUT_POST, 'ipt-nome') != '') {
				$usuario = new EditarCliente();
				if($usuario->edCliente()) {
					return "Cliente atualizado com Sucesso!";
				} else {
					return "ERRO. Verifique se você REALMENTE alterou alguma coisa ou Contate o Suporte.";
				}

			}
		}

	}

	$id_cliente = filter_input(INPUT_GET, 'id_cliente');
	$usuario = new EditarCliente();
	$crtl = new crtEditarCliente();
	
	$mensagem_erro = $crtl->editarCliente();
	$registro = $usuario->registroCliente($id_cliente);

?>
