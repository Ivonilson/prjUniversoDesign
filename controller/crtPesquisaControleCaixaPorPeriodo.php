<?php
require "model/PesquisaControleCaixaPorPeriodo.php";
require "model/EditarDespesa.php";

class crtPesquisaControleCaixaPorPeriodo {

	public function pesqControleCaixaPorPeriodo()
	{	

		$dados = new PesquisaControleCaixaPorPeriodo();
		$dataSet = $dados->pesquisaControleCaixaPorPeriodo();
		return $dataSet;

	}

	public function editarDespesa()
	{	
		if(filter_input(INPUT_POST, 'ipt-id-despesa') != 'INDEFINIDO' && filter_input(INPUT_POST, 'sel-tipo') != '') {
			$usuario = new EditarDespesa();

			if($usuario->edDespesa()) {
				$recarregar = new crtPesquisaControleCaixaPorPeriodo();
				$resultado = $recarregar->pesqControleCaixaPorPeriodo();
				$retorno = [$resultado , "Despesa atualizada com sucesso!"];
				return $retorno;
				
			} else {
				$recarregar = new crtPesquisaControleCaixaPorPeriodo();
				$resultado = $recarregar->pesqControleCaixaPorPeriodo();
				$retorno = [$resultado , "ERRO. Verifique se você REALMENTE alterou alguma coisa ou Contate o Suporte."];
				return $retorno;
			}
		}
	}
}

$editarDespesa = new crtPesquisaControleCaixaPorPeriodo();
$crtl = new crtPesquisaControleCaixaPorPeriodo();
$deletar = new crtPesquisaControleCaixaPorPeriodo();

$retorno [0] = $crtl->pesqControleCaixaPorPeriodo();
$retorno [1] = "";

if($editarDespesa->editarDespesa()){
	$retorno = $editarDespesa->editarDespesa();
}

if(isset($_POST['ipt-id-despesa']) && $_POST['ipt-id-despesa'] != '' && $_POST['ipt-confirmacao'] == 'true'){
	$recarregar = new PesquisaControleCaixaPorPeriodo();
	$deletar = new EditarDespesa();

	if($deletar->deletarDespesa()) {
		$resultado = $recarregar->pesquisaControleCaixaPorPeriodo();
		$retorno  = [$resultado , "Registro deletado com sucesso..."];
	};
}

?>