<?php
require "model/CadastrarOs.php";
require "model/Cidade.php";


	class crtCadastrarOs {

		public function cadastrarOs()
		{	
			$usuario = new CadastrarOs();
			return  $usuario->cadOs();
 
		}
	}

	$crtl = new crtCadastrarOs();
	$codigoDisponivel = new CadastrarOs();
	$codigo = $codigoDisponivel->gerarCodigoOs();


	$orcamentos = new DadosAuxiliares();
	$carregaOrcamento = $orcamentos->carregaOrcamento();

	$mensagem_erro = '';

	if(filter_input(INPUT_POST, 'sel-orcamento') != '' && filter_input(INPUT_POST, 'sel-orcamento') != '-') {
		if($crtl->cadastrarOs()){
			$codigo = $codigoDisponivel->gerarCodigoOs();
			$mensagem_erro = "Ordem de Serviço cadastrada com Sucesso!";
		} else {
			$mensagem_erro = "ERRO. Contate do Suporte.";
		}
		
	} elseif(filter_input(INPUT_POST, 'sel-orcamento') == '-') { 
		$mensagem_erro = "Um Orçamento precisa ser selecionado para a ordem de serviço. Selecione um orçamento e Tente Novamente.";
	} 		

?>