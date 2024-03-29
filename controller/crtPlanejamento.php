<?php
require "model/Planejamento.php";


	class crtPlanejamento {

		public function CadastrarPlanejamento()
		{	
			$usuario = new Planejamento();
			return  $usuario->cadPlanejamento();
 
		}

		public function pesqPlanejamento()
		{	

			$dados = new Planejamento();
			$dataSet = $dados->pesquisaPlanejamento();
			return $dataSet;

		}

		public function editarPlanejamento()
		{	
			if(filter_input(INPUT_POST, 'ipt-id-planejamento-edicao') != 'INDEFINIDO' && filter_input(INPUT_POST, 'ipt-id-planejamento-edicao') != '') {
			$usuario = new Planejamento();

				if($usuario->edPlanejamento()) {
					$recarregar = new Planejamento();
					$resultado = $recarregar->pesquisaPlanejamento();
					$retorno = [$resultado , "Planejamento atualizado com sucesso!"];
					return $retorno;
				
				} else {
					$recarregar = new Planejamento();
					$resultado = $recarregar->pesquisaPlanejamento();
					$retorno = [$resultado , "ERRO. Verifique se você REALMENTE alterou alguma coisa ou Contate o Suporte."];
				return $retorno;
				}
			}
		}
	}

	$mensagem_erro = '';

    $editarPlanejamento = new crtPlanejamento();
	$crtl = new crtPlanejamento();
	$deletar = new crtPlanejamento();
	$ultimoPlanejamento = new Planejamento();
	$mes_ano = new Planejamento();
	$ano = new Planejamento();

	$anoRetornado = $ano->pesquisaAnoPlanejamento();

	$mes_ano_existe = $mes_ano->MesAnoJaExiste(filter_input(INPUT_POST, 'sel-form-sel-mes')."/".filter_input(INPUT_POST, 'sel-form-sel-ano'));

    if(!$mes_ano_existe  && filter_input(INPUT_POST, 'sel-form-sel-mes') != '' && filter_input(INPUT_POST, 'sel-form-sel-mes') != '-') {
		if($crtl->CadastrarPlanejamento()){
			$mensagem_erro = "Planejamento lançado com sucesso!";
		} else {
			$mensagem_erro = "ERRO. Verifique se o mês/ano que está tentando cadastrar já exista no sistema e tente novamente. Caso o problema persista, contate o Suporte.";
		}
	} elseif(filter_input(INPUT_POST, 'sel-form-sel-mes') != null) {
		$mensagem_erro = "ERRO. Verifique se o mês/ano que está tentando cadastrar já exista no sistema e tente novamente. Caso o problema persista, contate o Suporte.";
	}

	$UltimoPlanejamentoCadastrado = $ultimoPlanejamento->ultimoPlanejamentoCadastrado();

	$retorno [0] = $crtl->pesqPlanejamento();
	$retorno [1] = "";

	if($editarPlanejamento->editarPlanejamento()){
		$UltimoPlanejamentoCadastrado = $ultimoPlanejamento->ultimoPlanejamentoCadastrado();
        $mensagem_erro = '';
		$retorno = $editarPlanejamento->editarPlanejamento();
	}

	if(isset($_POST['ipt-id-rec_desp']) && $_POST['ipt-id-rec_desp'] != '' && isset($_POST['ipt-confirmacao']) && $_POST['ipt-confirmacao'] == 'true'){
		$recarregar = new Planejamento();
		$deletar = new Planejamento();

		if($deletar->deletarPlanejamento()) {
		$resultado = $recarregar->pesquisaPlanejamento();
		$retorno  = [$resultado , "Registro deletado com sucesso..."];
		};
	}


?>
