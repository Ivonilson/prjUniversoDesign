<?php
require "model/IncluirItemOrcamento.php";

	class crtIncluirItemOrcamento {

		public function incluirItemOrcamento()
		{	

				if(filter_input(INPUT_POST, 'sel-produto') != '' && filter_input(INPUT_POST, 'ipt-quantidade-itens') != 0) {

					$incluirItemOrcamento = new IncluirItemOrcamento();

					if($incluirItemOrcamento->incluirItemOrcamento()){
						return "Item Cadastrado com sucesso!";
					} else {
						return "Erro ao cadastrar. Verifique se um PRODUTO foi selecionado tente novamente. Caso o problema persista, contate o Suporte.";
					}

				} else {
					return "-";
				}
		}
	}

	$crtl = new crtIncluirItemOrcamento();
	$produtos = new DadosAuxiliares();

	$mensagem_erro = $crtl->incluirItemOrcamento();
	$produto = $produtos->carregaProduto();

?>