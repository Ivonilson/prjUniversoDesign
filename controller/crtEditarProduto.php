<?php
require "model/EditarProduto.php";
require "model/Cidade.php";

	class crtEditarProduto {

		public function editarProduto()
		{	

			if(filter_input(INPUT_POST, 'ipt-descricao') != 'INDEFINIDO' && filter_input(INPUT_POST, 'ipt-descricao') != '') {
				$usuario = new EditarProduto();
				if($usuario->edProduto()) {
					return "Produto atualizado com Sucesso!";
				} else {
					return "ERRO. Verifique se você REALMENTE alterou alguma coisa ou Contate o Suporte.";
				}
			}
		}
	}

	$id_produto = filter_input(INPUT_GET, 'id_prod');
	$usuario = new EditarProduto();
	$crtl = new crtEditarProduto();
			

	$mensagem_erro = $crtl->editarProduto();
	$registro = $usuario->registroProduto($id_produto);
