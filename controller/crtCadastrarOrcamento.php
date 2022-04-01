<?php
require "model/CadastrarOrcamento.php";
require "model/CadastrarItensOrcamento.php";
require "model/Cidade.php";

	class crtCadastrarOrcamento {

		public function cadastrarOrcamento()
		{	
				if(filter_input(INPUT_POST, 'sel-cliente') != '' && filter_input(INPUT_POST, 'sel-cliente') != "-") {
					$cadastrarOrcamento = new CadastrarOrcamento();
					$cadastrarItens = new CadastrarItensOrcamento();

					if($cadastrarOrcamento->cadOrcamento() && $cadastrarItens->cadItensOrcamento()){
						return "Orçamento Cadastrado com sucesso!";
					} else {
						return "ERRO. Contate o Suporte.";
					}

				} elseif(filter_input(INPUT_POST, 'sel-cliente') != '') {
					return "Erro ao cadastrar. Verifique se o CLIENTE foi selecionado tente novamente. Caso o problema persista, contate o Suporte.";
				} else {
					return "-";
				}
		}

		public function ultimoOrcamento(){
			$ult_orcamento = new CadastrarOrcamento();
			$ultimo = $ult_orcamento->ultimoOrc();
			return $ultimo;
		}
	}

	$UltimoIdOrcamento = new DadosAuxiliares();
	$cliente = new DadosAuxiliares();
	$produtos = new DadosAuxiliares();
	$crtl = new crtCadastrarOrcamento();
	$ultimoOrcamento = new crtCadastrarOrcamento();


	$clientes = $cliente->carregaCliente();
	$produto = $produtos->carregaProduto();
	$mensagem_erro = $crtl->cadastrarOrcamento();
	$codigoOrcamento = $UltimoIdOrcamento->carregaIdOrcamento();
	$UltimoOrcCadastrado = $ultimoOrcamento->ultimoOrcamento();

?>