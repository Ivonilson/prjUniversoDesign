<?php
require "model/CadastrarProduto.php";
require "model/Cidade.php";


	class crtCadastrarProduto {

		public function cadastrarProduto()
		{	
			$usuario = new Conn();

			if(filter_input(INPUT_POST, 'ipt-codigo-produto') != '' && filter_input(INPUT_POST, 'ipt-descricao') != '-') {
				$usuario = new CadastrarProduto();

				if($usuario->cadProduto()) {

					return "Produto Cadastrado com sucesso!";

				} else {
					return "ERRO. Verifique se o código que está tentando cadastrar já exista no sistema ou contate o Suporte.";
				}

			} elseif(filter_input(INPUT_POST, 'ipt-descricao') == '-') {
				return "Erro ao cadastrar. Verifique se o campo PRODUTO possui uma descrição válida. Caso o problema persista, contate o Suporte.";
			} else {
				return "-";
			}
		}

		public function ultimoProduto(){
			$ult_produto = new CadastrarProduto();
			$ultimo = $ult_produto->ultimoProdutoCadastrado();
			return $ultimo;
		}
	}

	$crtl = new crtCadastrarProduto();

	$mensagem_erro = $crtl->cadastrarProduto();
	$UltimoProdutoCadastrado = $crtl->ultimoProduto();

?>
