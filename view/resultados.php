<?php
if ($_SESSION['user'] == NULL) {
	header('Location: index.php');
}
?>

<!DOCTYPE html>
<html lang="pt-br">

<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
	<title>Resultados</title>
	<?php require_once 'includes/bootstrap-css.php'; ?>
	<script src="../js/abg2.js"></script>
</head>

<body class="bg-dark fixed-nav sticky-footer" id="page-top">
	<!-- NAVEGAÇÃO -->
	<?php require_once 'includes/navegacao.php'; ?>

	<div class="content-wrapper" id="background-tela-consulta">
		<div class="container-fluid">
			<ol class="breadcrumb">
				<li class="breadcrumb-item">
					<a href="?pagina=os-do-dia" class="text-decoration-none">Início</a>
				</li>
				<li class="breadcrumb-item">
					Financeiro
				</li>
				<li class="breadcrumb-item">
					Fluxo de Caixa
				</li>
				<li class="breadcrumb-item">
					<mark class="p-2 font-weight-bold">Resultados</mark>
				</li>
				<div class="col">
					<a href="/?pagina=lancar-planejamento" class="btn btn-danger text-light float-right font-weight-bold rounded" data-bs-toggle="tooltip" data-bs-placement="bottom" title="Incluir mês/ano"><i class="fa fa-plus"></i> Lançar planejamento</a>
				</div>
			</ol>

			<div class="row justify-content-md-center">
				<div class="col-2">
					<div class="input-group">
						<div class="input-group-prepend">
							<label class="text-dark float-right input-group-text font-weight-bold">Ano referência</label>
						</div>
						<select class="float-right custom-select" name="" id="">
							<?php 
								foreach($anoRetornado as $value){ 
							?>
							<option value=""><?= $value['ano'] ?></option>
							<?php
								}
							?>
						</select>
					</div>
				</div>
					<div class="col-1">
						<button class="btn btn-info col form-control">Carregar</button>
					</div>
			</div>

			<!--
			<div class="row mb-3">

				<div class="col mb-1">
					<a href="?pagina=pesquisa-por-os" data-bs-toggle="tooltip" data-bs-placement="bottom" class="botoes-atalho-cons" title="Pesq. O.S. por código"><i class="fa fa-search" aria-hidden="true"></i> Pesq. O.S. por código </a>
				</div>

				<div class="col mb-1">
					<a href="?pagina=pesquisa-por-data-agendamento" class="botoes-atalho-cons" data-bs-toggle="tooltip" data-bs-placement="bottom" title="Pesq. por data de agendamento"><i class="fa fa-search " aria-hidden="true"></i> O.S(s) por data de agendamento </a>
				</div>

				<div class="col mb-1">
					<a href="?pagina=pesquisa-por-orcamento" class="botoes-atalho-cons" data-bs-toggle="tooltip" data-bs-placement="bottom" title="Orçamentos cadastrados"><i class="fa fa-search " aria-hidden="true"></i> Orçamentos </a>
				</div>

				<div class="col mb-1">
					<a href="?pagina=pesquisa-produto" class="botoes-atalho-cons" data-bs-toggle="tooltip" data-bs-placement="bottom" title="Produtos cadastrados"><i class="fa fa-search " aria-hidden="true"></i> Produtos </a>
				</div>

				<div class="col mb-1">
					<a href="?pagina=pesquisa-cliente" class="botoes-atalho-cons" data-bs-toggle="tooltip" data-bs-placement="bottom" title="Clientes cadastrados"><i class="fa fa-search " aria-hidden="true"></i> Clientes </a>
				</div>

			</div>
            -->

			<div id="row-tbl-consulta">
				<div class="col">

					<table class="table table-bordered table-hover display" id="dataTable" width="100%" cellspacing="0">
						<thead class="thead-light">
							<tr>
                                <th>ID</th>
								<th>Mês/Ano</th>
								<th>Receita Planejada (R$)</th>
                                <th>Receita Executada (R$)</th>
                                <th>Meta Receitas</th>
                                <th></th>
                                <th>Despesa Planejada (R$)</th>
                                <th>Despesa Executada (R$)</th>
								<th>Meta Despesas</th>
                                <th></th>
								<th>Retorno (R$)</th>
								<th>Status</th>
							</tr>
						</thead>
						<tfoot class="thead-light">
                            <tr>
                                <th>ID</th>
                                <th>Mês/Ano</th>
								<th>Receita Planejada (R$)</th>
                                <th>Receita Executada (R$)</th>
                                <th>Meta Receitas</th>
                                <th></th>
                                <th>Despesa Planejada (R$)</th>
                                <th>Despesa Executada (R$)</th>
								<th>Meta Despesas</th>
                                <th></th>
								<th>Retorno (R$)</th>
								<th>Status</th>
							</tr>
						</tfoot>
						<tbody>
							<?php

							 $mes = ["01" => "JANEIRO", "02" => "FEVEREIRO", "03" => "MARÇO", "04" => "ABRIL",
									   "05" => "MAIO", "06" => "JUNHO", "07" => "JULHO", "08" => "AGOSTO", "09" => "SETEMBRO",
									   "10" => "OUTUBRO", "11" => "NOVEMBRO", "12" => "DEZEMBRO"
									  ];

							$contadorReceitas = count($receitasExecutadas);
							$contadorDespesas = count($despesasExecutadas);

							$total_rec_planejadas = 0;
							$total_rec_executadas = 0;
							$meta_card_receitas = 0;

							$total_desp_planejadas = 0;
							$total_desp_executadas = 0;
							$meta_card_despesas = 0;
							

							if ($resultados != NULL) {

								foreach ($resultados as $value) {
									//$numero_mes = substr($receitasExecutadas[$controle]['data_referencia'], 5, 2);

									$controleReceita = 0;
									$valorReceita = 0;

									$controleDespesa = 0;
									$valorDespesa = 0;									

									while($controleReceita < $contadorReceitas) {

										if($mes[substr($receitasExecutadas[$controleReceita]['data_referencia'], 5, 2)].'/'.
										substr($receitasExecutadas[$controleReceita]['data_referencia'], 0, 4) == $value['mes_ano_planejado']){
											$valorReceita += $receitasExecutadas[$controleReceita]['valor'];
										}

										//echo "<br>";
										//echo $valor;
										//echo "<br>";
										//echo $controle;
										//echo "<br>";
										//echo $mes[substr($receitasExecutadas[$controle]['data_referencia'], 5, 2)].'/'.
										//substr($receitasExecutadas[$controle]['data_referencia'], 0, 4);
										//echo "<br>";
										//echo $mes[substr($receitasExecutadas[$controle]['data_referencia'], 5, 2)].'/'.
										//substr($receitasExecutadas[$controle]['data_referencia'], 0, 4);
										//echo "<br>";
										
										$controleReceita++;
									}

									while($controleDespesa < $contadorDespesas) {

										if($mes[substr($despesasExecutadas[$controleDespesa]['data_referencia'], 5, 2)].'/'.
										substr($despesasExecutadas[$controleDespesa]['data_referencia'], 0, 4) == $value['mes_ano_planejado']){
											$valorDespesa += $despesasExecutadas[$controleDespesa]['valor'];
										}

										//echo "<br>";
										//echo $valor;
										//echo "<br>";
										//echo $controle;
										//echo "<br>";
										//echo $mes[substr($receitasExecutadas[$controle]['data_referencia'], 5, 2)].'/'.
										//substr($receitasExecutadas[$controle]['data_referencia'], 0, 4);
										//echo "<br>";
										//echo $mes[substr($receitasExecutadas[$controle]['data_referencia'], 5, 2)].'/'.
										//substr($receitasExecutadas[$controle]['data_referencia'], 0, 4);
										//echo "<br>";
										
										$controleDespesa++;
									}

								?>
									<tr>
                                        <td class="sr-only"><?= $value['id_plan_rec_desp'] ?></td>
										<td><?= $value['mes_ano_planejado'] ?></td>
										<td><?= number_format($value['valor_receita_planejada'], 2, ',', '.') ?></td>

										<td><?=number_format($valorReceita, 2, ',', '.');?></td>

										<td><?= number_format((($valorReceita / $value['valor_receita_planejada']) * 100), 2, ',' , '.').'%' ?>
										</td>

                                        <td></td>
                                        <td><?= number_format($value['valor_despesa_planejada'], 2, ',', '.') ?></td>

										<td><?=number_format($valorDespesa, 2, ',', '.');?></td>

										<td><?= number_format((($valorDespesa / $value['valor_despesa_planejada']) * 100), 2, ',' , '.').'%' ?>
										</td>

                                        <td></td>
										<td><?= number_format(($valorReceita -$valorDespesa), 2, ',', '.') ?></td>
										<td>Fazer via JS</td>
									</tr>

							<?php
									$conexao = null;

									$total_rec_planejadas += $value['valor_receita_planejada'];
									$total_rec_executadas += $valorReceita;
									$meta_card_receitas = ($total_rec_executadas / $total_rec_planejadas) * 100;

									$total_desp_planejadas += $value['valor_despesa_planejada'];
									$total_desp_executadas += $valorDespesa;
									$meta_card_despesas = ($total_desp_executadas / $total_desp_planejadas) * 100;

									$meta_card_lucro_anual = (($total_rec_executadas - $total_desp_executadas) / ($total_rec_planejadas - $total_desp_planejadas)) * 100;

									$meta_card_lucro_mensal = ((($total_rec_executadas - $total_desp_executadas)/12) / 
									(($total_rec_planejadas - $total_desp_planejadas)/12)) * 100;

								}

							} else {
								echo "<span class='text-danger'></span><br><br>";
							}
							?>
						</tbody>
					</table>

					<br>

					<div class="card-deck">
						<div class="card">
							<!--<img class="card-img-top" src=".../100px180/" alt="Card image cap">-->
							<div class="card-body">
								<h5 class="card-title">Total de receitas planejadas: R$ <?=  $total_rec_planejadas != null ? number_format($total_rec_planejadas, 2, ',', '.') : '0' ?></h5>
								<h5 class="card-title">Total de receitas executadas: R$ <?= $total_rec_executadas != null ? number_format($total_rec_executadas, 2, ',', '.') : '0' ?></h5>
                                <h5 class="card-title">Percentual anual atingido nas metas de receitas:  <?= $meta_card_receitas != null ? number_format($meta_card_receitas, 2, ',', '.').'%' : '0%' ?></h5>
                                <!--<p class="card-text">This is a wider card with supporting text below as a natural lead-in to additional content. This content is a little bit longer.</p>-->
							</div>
							<div class="card-footer">
								<small class="text-muted">&copyAbg Soluções  </small>
							</div>
						</div>
						<div class="card">
							<!--<img class="card-img-top" src=".../100px180/" alt="Card image cap">-->
							<div class="card-body">
								<h5 class="card-title">Total de despesas planejadas: R$ <?=  $total_desp_planejadas != null ? number_format( $total_desp_planejadas, 2, ',', '.') : '0' ?></h5>
								<h5 class="card-title">Total de despesa executadas: R$ <?= $total_desp_executadas != null ? number_format($total_desp_executadas, 2, ',', '.') : '0' ?></h5>
								<h5 class="card-title">Percentual anual atingido nas metas de despesas:  <?= $meta_card_despesas != null ? number_format($meta_card_despesas, 2, ',', '.').'%' : '0%' ?></h5>
                                <!--<p class="card-text">This is a wider card with supporting text below as a natural lead-in to additional content. This content is a little bit longer.</p>-->
							</div>
							<div class="card-footer">
								<small class="text-muted">&copyAbg Soluções  </small>
							</div>
						</div>
						<div class="card">
							<!--<img class="card-img-top" src=".../100px180/" alt="Card image cap">-->
							<div class="card-body">
								<h5 class="card-title">Lucro anual planejado: R$ <?=  $total_rec_planejadas != null ? number_format(($total_rec_planejadas - $total_desp_planejadas), 2, ',', '.') : '0' ?></h5>
								<h5 class="card-title">Lucro anual executado: R$ <?= $total_rec_executadas != null ? number_format($total_rec_executadas - $total_desp_executadas, 2, ',', '.') : '0' ?></h5>
                                <h5 class="card-title">Percentual anual atingido na meta de lucro: <?= $meta_card_lucro_anual != null ? number_format($meta_card_lucro_anual, 2, ',', '.').'%' : '0%' ?></h5>
                                <!--<p class="card-text">This is a wider card with supporting text below as a natural lead-in to additional content. This content is a little bit longer.</p>-->
							</div>
							<div class="card-footer">
								<small class="text-muted">&copyAbg Soluções  </small>
							</div>
						</div>
						<div class="card">
							<!--<img class="card-img-top" src=".../100px180/" alt="Card image cap">-->
							<div class="card-body">
								<h5 class="card-title">Lucro mensal planejado: R$ <?= $total_rec_planejadas != null ? number_format(($total_rec_planejadas - $total_desp_planejadas)/12, 2, ',', '.') : '0' ?></h5>
								<h5 class="card-title">Lucro mensal executado: R$ <?=$total_rec_executadas != null ? number_format(($total_rec_executadas - $total_desp_executadas)/12, 2, ',', '.') : '0' ?></h5>
								<h5 class="card-title">Percentual mensal atingido na meta de lucro: <?= $meta_card_lucro_mensal != null ? number_format($meta_card_lucro_mensal, 2, ',', '.').'%' : '0%' ?></h5>
                                <!--<p class="card-text">This is a wider card with supporting text below as a natural lead-in to additional content. This content is a little bit longer.</p>-->
							</div>
							<div class="card-footer">
								<small class="text-muted">&copyAbg Soluções  </small>
							</div>
						</div>
					</div>

					<br>
				</div>
			</div>
		</div>

		<?php require_once 'includes/bootstrap-js.php'; ?>

		<!-- rodapé -->
		<?php require_once 'includes/rodape.php'; ?>
	</div>
</body>

</html>