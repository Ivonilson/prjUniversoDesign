<?php
require "model/CadastrarDespesa.php";


	class crtLancarDespesa {

		public function CadastrarDespesa()
		{	
			$usuario = new CadastrarDespesa();
			return  $usuario->cadDespesa();
 
		}
	}

	$crtl = new crtLancarDespesa();
	$codigoDisponivel = new CadastrarDespesa();
	$codigo = $codigoDisponivel->gerarCodigoDespesa();

	$mensagem_erro = '';

	if(filter_input(INPUT_POST, 'sel-tipo') != '' && filter_input(INPUT_POST, 'sel-descricao') != '-') {
		if($crtl->CadastrarDespesa()){
			$codigo = $codigoDisponivel->gerarCodigoDespesa();
			$mensagem_erro = "Despesa lançada com sucesso!";
		} else {
			$mensagem_erro = "ERRO. Tente novamente. Caso o problema persista, contate o Suporte.";
		}
		
	} elseif(filter_input(INPUT_POST, 'sel-orcamento') == '-') { 
		$mensagem_erro = "ERRO. Tente novamente. Caso o problema persista, contate o Suporte.";
	}

	$ultimaDespesa = new CadastrarDespesa();
	$UltimaDespesaCadastrada = $ultimaDespesa->ultimaDespesaCadastrada();

?>
