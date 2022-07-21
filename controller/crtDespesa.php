<?php
require "model/Despesa.php";


	class crtDespesa {

		public function CadastrarDespesa()
		{	
			$usuario = new Despesa();
			return  $usuario->cadDespesa();
 
		}

		public function pesqControleCaixaPorPeriodo()
		{	

			$dados = new Despesa();
			$dataSet = $dados->pesquisaControleCaixaPorPeriodo();
			return $dataSet;

		}

		public function editarDespesa()
		{	
			if(filter_input(INPUT_POST, 'ipt-id-despesa-edicao') != 'INDEFINIDO' && filter_input(INPUT_POST, 'sel-tipo-edicao') != '') {
			$usuario = new Despesa();

				if($usuario->edDespesa()) {
					$recarregar = new Despesa();
					$resultado = $recarregar->pesquisaControleCaixaPorPeriodo();
					$retorno = [$resultado , "Despesa atualizada com sucesso!"];
					return $retorno;
				
				} else {
					$recarregar = new Despesa();
					$resultado = $recarregar->pesquisaControleCaixaPorPeriodo();
					$retorno = [$resultado , "ERRO. Verifique se você REALMENTE alterou alguma coisa ou Contate o Suporte."];
				return $retorno;
				}
			}
		}
	}

	$crtl = new crtDespesa();
	$codigoDisponivel = new Despesa();
	$codigo = $codigoDisponivel->gerarCodigoDespesa();

	$mensagem_erro = '';

	if(filter_input(INPUT_POST, 'sel-tipo-lancar') != '' && filter_input(INPUT_POST, 'sel-grupo-lancar') != '-') {
		if($crtl->CadastrarDespesa()){
			$codigo = $codigoDisponivel->gerarCodigoDespesa();
			$mensagem_erro = "Despesa lançada com sucesso!";
		} else {
			$mensagem_erro = "ERRO. Tente novamente. Caso o problema persista, contate o Suporte.";
		}
		
	} elseif(filter_input(INPUT_POST, 'sel-orcamento') == '-') { 
		$mensagem_erro = "ERRO. Tente novamente. Caso o problema persista, contate o Suporte.";
	}

	$ultimaDespesa = new Despesa();
	$UltimaDespesaCadastrada = $ultimaDespesa->ultimaDespesaCadastrada();

	$editarDespesa = new crtDespesa();
	$crtl = new crtDespesa();
	$deletar = new crtDespesa();

	$retorno [0] = $crtl->pesqControleCaixaPorPeriodo();
	$retorno [1] = "";

	if($editarDespesa->editarDespesa()){
		$retorno = $editarDespesa->editarDespesa();
	}

	if(isset($_POST['ipt-id-despesa']) && $_POST['ipt-id-despesa'] != '' && isset($_POST['ipt-confirmacao']) && $_POST['ipt-confirmacao'] == 'true'){
		$recarregar = new Despesa();
		$deletar = new Despesa();

	if($deletar->deletarDespesa()) {
		$resultado = $recarregar->pesquisaControleCaixaPorPeriodo();
		$retorno  = [$resultado , "Registro deletado com sucesso..."];
	};
}

?>
