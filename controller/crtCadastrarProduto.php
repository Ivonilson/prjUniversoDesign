<?php
require "model/CadastrarProduto.php";
require "model/Cidade.php";


	class crtCadastrarProduto {

		public function cadastrarProduto()
		{	
			$usuario = new Conn();

			if(filter_input(INPUT_POST, 'ipt-codigo-produto') != '' && filter_input(INPUT_POST, 'ipt-descricao') != '-') {
				$usuario = new CadastrarProduto();

				if($usuario->cadProduto(filter_input(INPUT_POST, 'ipt-codigo-produto'), filter_input(INPUT_POST, 'ipt-descricao'), filter_input(INPUT_POST, 'sel-unidade-medida'), filter_input(INPUT_POST, 'ipt-preco-unitario'), filter_input(INPUT_POST, 'ipt-quantidade-estoque'))) {

					return "Orçamento Cadastrado com sucesso!";

				} else {
					return "ERRO. Verifique se o código que está tentando cadastrar já exista no sistema ou contate o Suporte.";
				}

			} elseif(filter_input(INPUT_POST, 'ipt-descricao') == '-') {
				return "Erro ao cadastrar. Verifique se o campo PRODUTO possui uma descrição válida. Caso o problema persista, contate o Suporte.";
			} else {
				return "-";
			}
		}
	}

	$crtl = new crtCadastrarProduto();
	$mensagem_erro = $crtl->cadastrarProduto();

?>