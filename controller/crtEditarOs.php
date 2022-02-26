<?php
require "model/EditarOs.php";
require "model/Cidade.php";

	class crtEditarOs {

		public function editarOs()
		{	
			include "view/editar-os.php";

			if(filter_input(INPUT_POST, 'ipt-os') != 'INDEFINIDO' && filter_input(INPUT_POST, 'ipt-os') != '') {
				$usuario = new EditarOs();
				$usuario->edOs(filter_input(INPUT_GET, 'form'), filter_input(INPUT_POST, 'ipt-os'), filter_input(INPUT_POST, 'sel-tipo'), filter_input(INPUT_POST, 'sel-banco'), filter_input(INPUT_POST, 'sel-empresa'), filter_input(INPUT_POST, 'ipt-proponente'), filter_input(INPUT_POST, 'ipt-contato'), filter_input(INPUT_POST, 'sel-cidade'), filter_input(INPUT_POST, 'sel-uf'), filter_input(INPUT_POST, 'sel-tipologia'), filter_input(INPUT_POST, 'ipt-endereco'), filter_input(INPUT_POST, 'ipt-condominio'), filter_input(INPUT_POST, 'ipt-bairro'), filter_input(INPUT_POST, 'ipt-cep'), filter_input(INPUT_POST, 'ipt-dataReceb'), filter_input(INPUT_POST, 'ipt-dataEntrega'), filter_input(INPUT_POST, 'ipt-valorServ'), filter_input(INPUT_POST, 'ipt-valorDesloc'), filter_input(INPUT_POST, 'ipt-areaEdif'), filter_input(INPUT_POST, 'ipt-areaTerreno'), filter_input(INPUT_POST, 'sel-padraoAcab'), filter_input(INPUT_POST, 'sel-novo'), filter_input(INPUT_POST, 'sel-laje'), filter_input(INPUT_POST, 'sel-situacao'), filter_input(INPUT_POST, 'sel-status'), filter_input(INPUT_POST, 'sel-statusLista'), filter_input(INPUT_POST, 'ta-observacoes'), filter_input(INPUT_POST, 'ta-observacoesig'));

			} else {
				echo "NENHUM DADO ENVIADO.";
			}	
		}
	}

	$crtl = new crtEditarOs();
	$crtl->editarOs();


?>