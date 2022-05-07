<?php
require "model/DadosAuxiliares.php";
require "model/ItensOrcamento.php";

class crtImpressaoOrcamento {

	public function impressaoOrcamento()

	{	
		$itensOrcamento = new ItensOrcamento();
		$resultado = $itensOrcamento->pesqItensOrcamento();
		$resultadoServico = $itensOrcamento->pesqItensDeServico();
		$totalizador = $itensOrcamento->totalizadorOrcamento();
		include "view/impressao-orcamento.php";
	}
}

?>
