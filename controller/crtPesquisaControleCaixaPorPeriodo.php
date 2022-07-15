<?php
require "model/PesquisaControleCaixaPorPeriodo.php";
require "model/EditarDespesa.php";

class crtPesquisaControleCaixaPorPeriodo {

	public function pesqControleCaixaPorPeriodo()
	{	
		$mensagem_erro = "";
		
		$dados = new PesquisaControleCaixaPorPeriodo();
		$dataSet = $dados->pesquisaControleCaixaPorPeriodo();
		return $dataSet;

	}

	public function editarDespesa()
	{	
		if(filter_input(INPUT_POST, 'ipt-id-despesa') != 'INDEFINIDO' && filter_input(INPUT_POST, 'sel-tipo') != '') {
			$usuario = new EditarDespesa();
			if($usuario->edDespesa()) {
				return "Despesa atualizada com sucesso!";
			} else {
	
				return "ERRO. Verifique se você REALMENTE alterou alguma coisa ou Contate o Suporte.";
			}
		}

		$recarregar = new crtPesquisaControleCaixaPorPeriodo();
		$resultado = $recarregar->pesqControleCaixaPorPeriodo();

	}

}

$editarDespesa = new crtPesquisaControleCaixaPorPeriodo();
$crtl = new crtPesquisaControleCaixaPorPeriodo();

$resultado = $crtl->pesqControleCaixaPorPeriodo();
$mensagem_erro = $editarDespesa->editarDespesa();



	/*$deletar = new OsDoDia();

	if(isset($_POST['ipt-cod-delete']) && $_POST['ipt-cod-delete'] != '' && $_POST['ipt-confirmacao'] == 'true'){
		$deletar->deletarOs();
	}*/
?>