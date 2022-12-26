<?php

require "model/Resultados.php";

	$mes_ano = new Resultados();
	$ano = new Resultados();
    $receitas = new Resultados();
	$despesas = new Resultados();

	$anoRetornado = $ano->pesquisaAnoResultados();
    $receitasExecutadas = $receitas->pesquisaReceitasExecutadas();
	$despesasExecutadas = $despesas->pesquisaDespesasExecutadas();


?>
