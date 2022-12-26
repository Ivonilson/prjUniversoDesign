<?php

require "model/Resultados.php";

	$ano = new Resultados();
    $receitas = new Resultados();
	$despesas = new Resultados();

	$anos = $ano->anosDisponiveis();
    $receitasExecutadas = $receitas->pesquisaReceitasExecutadas();
	$despesasExecutadas = $despesas->pesquisaDespesasExecutadas();

?>
