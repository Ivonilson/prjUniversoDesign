<?php
require "model/PesquisaPorOrcamento.php";

class crtPesquisaPorOrcamento {

	public function pesquisaPorOrcamento()
	{	
		$orcamentos = new PesquisaPorOrcamento();
		//$resultado = $orcamentos->pesqOrcSemItens();
		$resultado = $orcamentos->pesqPorOrcamento();
		include "view/pesquisa-por-orcamento.php";
		
	}

}

$del_orcamento = new PesquisaPorOrcamento();

if(isset($_POST['ipt-orcamento-deletar']) && $_POST['ipt-orcamento-deletar'] != '' && $_POST['ipt-confirma-orcamento-deletar'] == true)
{
	$del_orcamento->deletarOrcamento();
	unset($_POST);

}

if(isset($_POST['ipt-id-orcamento']) && $_POST['ipt-id-orcamento'] != null){
	$editar = new PesquisaPorOrcamento();
	$retorno = $editar->editarOrcamento();
	if($retorno){
		echo "<script>alert('Registro atualizado com sucesso!')</script>";
	} else {
		echo "<script>alert('ERRO! Tente novamente ou contate o SUPORTE.')</script>";
	}
}

?>
