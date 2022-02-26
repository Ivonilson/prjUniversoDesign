<?php
require "model/EditarProduto.php";
require "model/Cidade.php";

	class crtEditarProduto {

		public function editarProduto()
		{	

			if(filter_input(INPUT_POST, 'ipt-descricao') != 'INDEFINIDO' && filter_input(INPUT_POST, 'ipt-descricao') != '') {
				$usuario = new EditarProduto();
				$usuario->edProduto(filter_input(INPUT_GET, 'form'), filter_input(INPUT_POST, 'ipt-id-produto'), filter_input(INPUT_POST, 'ipt-descricao'), filter_input(INPUT_POST, 'sel-unidade-medida'), filter_input(INPUT_POST, 'ipt-preco-unitario'), filter_input(INPUT_POST, 'ipt-quantidade-estoque'));

			} else {
				echo "NENHUM DADO ENVIADO.";
			}

		}
	}

	$id_produto = filter_input(INPUT_GET, 'id_prod');
	$usuario = new EditarProduto();
	$registro = $usuario->registroProduto($id_produto);
	include "view/editar-produto.php";


?>