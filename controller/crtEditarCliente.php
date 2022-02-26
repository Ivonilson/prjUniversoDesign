<?php
require "model/EditarCliente.php";
require "model/Cidade.php";

	class crtEditarCliente {

		public function editarCliente()
		{	

			if(filter_input(INPUT_POST, 'ipt-nome') != 'INDEFINIDO' && filter_input(INPUT_POST, 'ipt-nome') != '') {
				$usuario = new EditarCliente();
				$usuario->edCliente(filter_input(INPUT_GET, 'form'), filter_input(INPUT_POST, 'ipt-id-cliente'), filter_input(INPUT_POST, 'ipt-nome'), filter_input(INPUT_POST, 'ipt-cpf-cnpj'), filter_input(INPUT_POST, 'ipt-endereco'), filter_input(INPUT_POST, 'ipt-bairro'), filter_input(INPUT_POST, 'sel-cidade-uf'), filter_input(INPUT_POST, 'ipt-tel-fixo'), filter_input(INPUT_POST, 'ipt-tel-cel'), filter_input(INPUT_POST, 'ipt-email'));

			} else {
				echo "NENHUM DADO ENVIADO.";
			}

		}
	}

	$id_cliente = filter_input(INPUT_GET, 'id_cliente');
	$usuario = new EditarCliente();
	$registro = $usuario->registroCliente($id_cliente);
	include "view/editar-cliente.php";

	$crtl = new crtEditarCliente();
	$crtl->editarCliente();


?>