<?php
require "model/Receita.php";


	class crtReceita {

		public function CadastrarReceita()
		{	
			$usuario = new Receita();
			return  $usuario->cadReceita();
 
		}

		public function pesqControleCaixaPorPeriodo()
		{	

			$dados = new Receita();
			$dataSet = $dados->pesquisaControleCaixaPorPeriodo();
			return $dataSet;

		}

		public function editarReceita()
		{	
			if(filter_input(INPUT_POST, 'ipt-id-receita-edicao') != 'INDEFINIDO' && filter_input(INPUT_POST, 'sel-tipo-edicao') != '') {
			$usuario = new Receita();

				if($usuario->edReceita()) {
					$recarregar = new Receita();
					$resultado = $recarregar->pesquisaControleCaixaPorPeriodo();
					$retorno = [$resultado , "Receita atualizada com sucesso!"];
					return $retorno;
				
				} else {
					$recarregar = new Receita();
					$resultado = $recarregar->pesquisaControleCaixaPorPeriodo();
					$retorno = [$resultado , "ERRO. Verifique se você REALMENTE alterou alguma coisa ou Contate o Suporte."];
				return $retorno;
				}
			}
		}
	}

	$crtl = new crtReceita();
	$codigoDisponivel = new Receita();
	$codigo = $codigoDisponivel->gerarCodigoReceita();

	$mensagem_erro = '';

	if(filter_input(INPUT_POST, 'sel-tipo-lancar') != '' && filter_input(INPUT_POST, 'sel-descricao-lancar') != '-') {
		if($crtl->CadastrarReceita()){
			$codigo = $codigoDisponivel->gerarCodigoReceita();
			$mensagem_erro = "Receita lançada com sucesso!";
		} else {
			$mensagem_erro = "ERRO. Tente novamente. Caso o problema persista, contate o Suporte.";
		}
		
	} elseif(filter_input(INPUT_POST, 'sel-orcamento') == '-') { 
		$mensagem_erro = "ERRO. Tente novamente. Caso o problema persista, contate o Suporte.";
	}

	$ultimaReceita = new Receita();
	$UltimaReceitaCadastrada = $ultimaReceita->ultimaReceitaCadastrada();

	$editarReceita = new crtReceita();
	$crtl = new crtReceita();
	$deletar = new crtReceita();

	$retorno [0] = $crtl->pesqControleCaixaPorPeriodo();
	$retorno [1] = "";

	if($editarReceita->editarReceita()){
		$retorno = $editarReceita->editarReceita();
	}

	if(isset($_POST['ipt-id-receita']) && $_POST['ipt-id-receita'] != '' && isset($_POST['ipt-confirmacao']) && $_POST['ipt-confirmacao'] == 'true'){
		$recarregar = new Receita();
		$deletar = new Receita();

	if($deletar->deletarReceita()) {
		$resultado = $recarregar->pesquisaControleCaixaPorPeriodo();
		$retorno  = [$resultado , "Registro deletado com sucesso..."];
	};
}

?>
