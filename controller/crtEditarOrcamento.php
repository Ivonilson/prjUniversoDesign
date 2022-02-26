<?php
require "model/EditarOrcamento.php";
require "model/DadosAuxiliares.php";
require "model/Cidade.php";

	class crtEditarOrcamento {

		public function editarOrcamento()
		{	

			if(filter_input(INPUT_POST, 'ipt-codigo-orcamento') != '' && filter_input(INPUT_POST, 'ipt-codigo-orcamento') != NULL) {
				$usuario = new EditarOrcamento();
				$usuario->edOrcamento(filter_input(INPUT_GET, 'form'), filter_input(INPUT_POST, 'ipt-codigo-orcamento'), filter_input(INPUT_POST, 'sel-nome-cliente'), filter_input(INPUT_POST, 'ta-produtos'), filter_input(INPUT_POST, 'ipt-valor-total'), filter_input(INPUT_POST, 'ipt-desconto'), filter_input(INPUT_POST, 'ipt-valor-final'), filter_input(INPUT_POST, 'sel-meio-pag'), filter_input(INPUT_POST, 'ipt-solicitante'), filter_input(INPUT_POST, 'ipt-data-validade'), filter_input(INPUT_POST, 'ta-observacao'));

			} else {
				echo "NENHUM DADO ENVIADO.";
			}

		}
	}

	$id_orcamento = filter_input(INPUT_GET, 'id_orcamento');
	$usuario = new EditarOrcamento();
	$registro = $usuario->registroOrcamento($id_orcamento);

	$cliente = new DadosAuxiliares();
	$nomesClientes = $cliente->carregaCliente();

	include "view/editar-orcamento.php";


?>