<?php
require "model/Resultados.php";


	class crtResultados {

		public function pesqResultados()
		{	

			$dados = new Resultados();
			$dataSet = $dados->pesquisaResultados();
			return $dataSet;

		}

	}

	$crtl = new crtResultados();
	$mes_ano = new Resultados();
	$ano = new Resultados();
    $receitas = new Resultados();

	$anoRetornado = $ano->pesquisaAnoResultados();
    $resultados = $crtl->pesqResultados();
    $receitasExecutadas = $receitas->pesquisaReceitasExecutadas();


?>
