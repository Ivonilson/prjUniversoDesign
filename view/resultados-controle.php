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
	<title>Resultados Controle de Caixa</title>
	<?php require_once 'includes/bootstrap-css.php'; ?>
	<script src="../js/abg2.js"></script>
</head>

<body class="bg-dark fixed-nav sticky-footer" id="page-top">
	<!-- NAVEGAÇÃO -->
	<?php require_once 'includes/navegacao.php'; ?>

	<!-- Abertura da DIV de impressão-->
	<div id="imprimir">

	<div class="content-wrapper" id="background-tela-consulta">
		<div class="container-fluid">
			<ol class="breadcrumb d-print-none">
				<li class="breadcrumb-item">
					<a href="?pagina=os-do-dia" class="text-decoration-none">Início</a>
				</li>
				<li class="breadcrumb-item">
					Financeiro
				</li>
				<li class="breadcrumb-item">
					<mark class="p-2 font-weight-bold">Resultados</mark>
				</li>
				<div class="col mt-2">
                <a href="/?pagina=despesa-por-periodo" class="btn btn-info text-light float-right font-weight-bold rounded mt-2 ml-1" data-bs-toggle="tooltip" data-bs-placement="bottom" title="Despesas por período"><i class="fa fa-search"></i> Despesas por período</a>
                <a href="/?pagina=receita-por-periodo" class="btn btn-info text-light float-right font-weight-bold rounded mt-2 ml-1" data-bs-toggle="tooltip" data-bs-placement="bottom" title="Receitas por período"><i class="fa fa-search"></i> Receitas por período</a>
                <a href="/?pagina=lancar-despesa" class="btn btn-danger text-light float-right font-weight-bold rounded mt-2 ml-1" data-bs-toggle="tooltip" data-bs-placement="bottom" title="Lançar despesa"><i class="fa fa-plus"></i> Lançar despesa</a>
                <a href="/?pagina=lancar-receita" class="btn btn-danger text-light float-right font-weight-bold rounded mt-2 ml-1" data-bs-toggle="tooltip" data-bs-placement="bottom" title="Lançar receita"><i class="fa fa-plus"></i> Lançar receita</a>
				</div>
			</ol>

			<div class="row justify-content-center mb-3">
				<div class="col-10 float-left ml-0">
				
				<form method="post">
					<div class="input-group col-lg-4 col-md-4 col-sm-6 col-xs-6">
						<div class="input-group-prepend">
							<label class="text-dark float-right input-group-text font-weight-bold">Ano referência</label>
						</div>
						<select class=" custom-select" name="sel-carregar-ano" id="">
							<option value="<?= $receitasExecutadas != null ? $receitasExecutadas[0]['ano'] : date('Y') ?>"><?= $receitasExecutadas != null ? $receitasExecutadas[0]['ano'] : date('Y') ?></option>

							<?php 
								foreach($anos as $value){ 
							?>
							<option value="<?= $value['ano'] ?>"><?= $value['ano'] ?></option>
							<?php
								}
							?>
						</select>
					</div>
					<div class="col-lg-4 col-md-4 col-sm-6 col-xs-6 mt-1">
						<button class="btn btn-info btn-block d-print-none mb-2">Carregar</button>
					</div>
				</div>
				</form>
						<div class="col-md-2 col-lg-2 col-sm-8 col-xs-8 ">
							<button class="btn btn-danger btn-block d-print-none" onclick="window.print()">Imprimir</button>
						</div>
			</div>

			<div id="row-tbl-consulta">
				<div class="col">

					<table class="table table-bordered table-hover display" id="dataTable" width="100%" cellspacing="0">
						<thead class="thead-light">
							<tr>
								<th class="sr-only"></th>
								<th>Mês</th>
                                <th>Receitas Executadas (R$)</th>
                                <th>Despesas Executadas (R$)</th>
								<th>Retorno (R$)</th>
								<!-- <th>Status</th> -->
							</tr>
						</thead>
						<tfoot class="thead-light">
                            <tr>
								<th class="sr-only"></th>
                                <th>Mês</th>
                                <th>Receitas Executadas (R$)</th>
                                <th>Despesas Executadas (R$)</th>
								<th>Retorno (R$)</th>
								<!-- <th>Status</th> -->
							</tr>
						</tfoot>
						<tbody>
							<?php

							 $mes = ["01" => "JANEIRO", "02" => "FEVEREIRO", "03" => "MARCO", "04" => "ABRIL",
									   "05" => "MAIO", "06" => "JUNHO", "07" => "JULHO", "08" => "AGOSTO", "09" => "SETEMBRO",
									   "10" => "OUTUBRO", "11" => "NOVEMBRO", "12" => "DEZEMBRO"
									  ];

							$contadorReceitas = count($receitasExecutadas) > 0 ? count($receitasExecutadas) : 0 ;
							$contadorDespesas = count($despesasExecutadas) > 0 ? count($despesasExecutadas) : 0;
							$valorReceita = 0;
							$valorDespesa = 0;	
							$controleReceita = 0;
							$controleDespesa = 0;

							$receitaJaneiro = 0;
							$receitaFevereiro = 0;
							$receitaMarco = 0;
							$receitaAbril = 0;
							$receitaMaio = 0;
							$receitaJunho = 0;
							$receitaJulho = 0;
							$receitaAgosto = 0;
							$receitaSetembro = 0;
							$receitaOutubro = 0;
							$receitaNovembro = 0;
							$receitaDezembro = 0;
	
							$despesaJaneiro = 0;
							$despesaFevereiro = 0;
							$despesaMarco = 0;
							$despesaAbril = 0;
							$despesaMaio = 0;
							$despesaJunho = 0;
							$despesaJulho = 0;
							$despesaAgosto = 0;
							$despesaSetembro = 0;
							$despesaOutubro = 0;
							$despesaNovembro = 0;
							$despesaDezembro = 0;

							$total_rec_executadas = 0;

							$total_desp_executadas = 0;

							$meta_card_lucro_mensal = 0;

							if ($receitasExecutadas != NULL) {

								foreach ($receitasExecutadas as $value) {

									switch($mes[substr($receitasExecutadas[$controleReceita]['data_referencia'], 5, 2)]) {
										case 'JANEIRO':
											$receitaJaneiro += $value['valor'];
											break;

										case 'FEVEREIRO':
											$receitaFevereiro += $value['valor'];
											break;

										case 'MARCO':
												$receitaMarco += $value['valor'];
												break;

										case 'ABRIL':
											$receitaAbril += $value['valor'];
											break;

										case 'MAIO':
											$receitaMaio += $value['valor'];
											break;

										case 'JUNHO':
											$receitaJunho += $value['valor'];
											break;

										case 'JULHO':
											$receitaJulho += $value['valor'];
											break;

										case 'AGOSTO':
											$receitaAgosto += $value['valor'];
											break;

										case 'SETEMBRO':
											$receitaSetembro += $value['valor'];
											break;

										case 'OUTUBRO':
											$receitaOutubro += $value['valor'];
											break;

										case 'NOVEMBRO':
											$receitaNovembro += $value['valor'];
											break;

										case 'DEZEMBRO':
												$receitaDezembro += $value['valor'];
												break;

									}
									$valorReceita += $value['valor'];
									$controleReceita++;

								}
									$total_rec_executadas += $valorReceita;

								foreach($despesasExecutadas as $value){

									switch($mes[substr($despesasExecutadas[$controleDespesa]['data_referencia'], 5, 2)]) {
										case 'JANEIRO':
											$despesaJaneiro += $value['valor'];
											break;

										case 'FEVEREIRO':
											$despesaFevereiro += $value['valor'];
											break;

										case 'MARCO':
												$despesaMarco += $value['valor'];
												break;

										case 'ABRIL':
											$despesaAbril += $value['valor'];
											break;

										case 'MAIO':
											$despesaMaio += $value['valor'];
											break;

										case 'JUNHO':
											$despesaJunho += $value['valor'];
											break;

										case 'JULHO':
											$despesaJulho += $value['valor'];
											break;

										case 'AGOSTO':
											$despesaAgosto += $value['valor'];
											break;

										case 'SETEMBRO':
											$despesaSetembro += $value['valor'];
											break;

										case 'OUTUBRO':
											$despesaOutubro += $value['valor'];
											break;

										case 'NOVEMBRO':
											$despesaNovembro += $value['valor'];
											break;

										case 'DEZEMBRO':
												$despesaDezembro += $value['valor'];
												break;
									}

									$valorDespesa += $value['valor'];
									$controleDespesa++;
								}
								
									$total_desp_executadas += $valorDespesa;

								} else {
									echo "<span class='text-danger'></span><br><br>";
								}
							?>

							<tr>
								<td class="sr-only">01</td>
								<td>JANEIRO</td>

								<td><?=number_format($receitaJaneiro, 2, ',', '.');?></td>

								<td><?=number_format($despesaJaneiro, 2, ',', '.');?></td>

								<td><?= number_format(($receitaJaneiro - $despesaJaneiro), 2, ',', '.') ?></td>
								<!-- <td>Fazer via JS</td> -->
							</tr>

							<tr>
								<td class="sr-only">02</td>
								<td>FEVEREIRO</td>

								<td><?=number_format($receitaFevereiro, 2, ',', '.');?></td>

								<td><?=number_format($despesaFevereiro, 2, ',', '.');?></td>

								<td><?= number_format(($receitaFevereiro - $despesaFevereiro), 2, ',', '.') ?></td>
								<!-- <td>Fazer via JS</td> -->
							</tr>

							<tr>
								<td class="sr-only">03</td>
								<td>MARÇO</td>

								<td><?=number_format($receitaMarco, 2, ',', '.');?></td>

								<td><?=number_format($despesaMarco, 2, ',', '.');?></td>

								<td><?= number_format(($receitaMarco - $despesaMarco), 2, ',', '.') ?></td>
								<!-- <td>Fazer via JS</td> -->
							</tr>

							<tr>
								<td class="sr-only">04</td>
								<td>ABRIL</td>

								<td><?=number_format($receitaAbril, 2, ',', '.');?></td>

								<td><?=number_format($despesaAbril, 2, ',', '.');?></td>

								<td><?= number_format(($receitaAbril - $despesaAbril), 2, ',', '.') ?></td>
								<!-- <td>Fazer via JS</td> -->
							</tr>

							<tr>
								<td class="sr-only">05</td>
								<td>MAIO</td>

								<td><?=number_format($receitaMaio, 2, ',', '.');?></td>

								<td><?=number_format($despesaMaio, 2, ',', '.');?></td>

								<td><?= number_format(($receitaMaio - $despesaMaio), 2, ',', '.') ?></td>
								<!-- <td>Fazer via JS</td> -->
							</tr>

							<tr>
								<td class="sr-only">06</td>
								<td>JUNHO</td>

								<td><?=number_format($receitaJunho, 2, ',', '.');?></td>

								<td><?=number_format($despesaJunho, 2, ',', '.');?></td>

								<td><?= number_format(($receitaJunho - $despesaJunho), 2, ',', '.') ?></td>
								<!-- <td>Fazer via JS</td> -->
							</tr>

							<tr>
								<td class="sr-only">07</td>
								<td>JULHO</td>

								<td><?=number_format($receitaJulho, 2, ',', '.');?></td>

								<td><?=number_format($despesaJulho, 2, ',', '.');?></td>

								<td><?= number_format(($receitaJulho - $despesaJulho), 2, ',', '.') ?></td>
								<!-- <td>Fazer via JS</td> -->
							</tr>

							<tr>
								<td class="sr-only">08</td>
								<td>AGOSTO</td>

								<td><?=number_format($receitaAgosto, 2, ',', '.');?></td>

								<td><?=number_format($despesaAgosto, 2, ',', '.');?></td>

								<td><?= number_format(($receitaAgosto - $despesaAgosto), 2, ',', '.') ?></td>
								<!-- <td>Fazer via JS</td> -->
							</tr>

							<tr>
								<td class="sr-only">09</td>
								<td>SETEMBRO</td>

								<td><?=number_format($receitaSetembro, 2, ',', '.');?></td>

								<td><?=number_format($despesaSetembro, 2, ',', '.');?></td>

								<td><?= number_format(($receitaSetembro - $despesaSetembro), 2, ',', '.') ?></td>
								<!-- <td>Fazer via JS</td> -->
							</tr>

							<tr>
								<td class="sr-only">10</td>
								<td>OUTUBRO</td>

								<td><?=number_format($receitaOutubro, 2, ',', '.');?></td>

								<td><?=number_format($despesaOutubro, 2, ',', '.');?></td>

								<td><?= number_format(($receitaOutubro - $despesaOutubro), 2, ',', '.') ?></td>
								<!-- <td>Fazer via JS</td> -->
							</tr>

							<tr>
								<td class="sr-only">11</td>
								<td>NOVEMBRO</td>

								<td><?=number_format($receitaNovembro, 2, ',', '.');?></td>

								<td><?=number_format($despesaNovembro, 2, ',', '.');?></td>

								<td><?= number_format(($receitaNovembro - $despesaNovembro), 2, ',', '.') ?></td>
								<!-- <td>Fazer via JS</td> -->
							</tr>

							<tr>
								<td class="sr-only">12</td>
								<td>DEZEMBRO</td>

								<td><?=number_format($receitaDezembro, 2, ',', '.');?></td>

								<td><?=number_format($despesaDezembro, 2, ',', '.');?></td>

								<td><?= number_format(($receitaDezembro - $despesaDezembro), 2, ',', '.') ?></td>
								<!-- <td>Fazer via JS</td> -->
							</tr>

						</tbody>
					</table>

					<br>

					<div class="card-deck">
						<div class="card">
							<!--<img class="card-img-top" src=".../100px180/" alt="Card image cap">-->
							<div class="card-body">
								<h6 class="card-title text-info">Total de receitas: R$ <?= $total_rec_executadas != null ? number_format($total_rec_executadas, 2, ',', '.') : '0' ?></h6>
							</div>
							<div class="card-footer">
								<small class="text-muted">&copyUniverso Design - <?= date('Y') ?>  </small>
							</div>
						</div>
						<div class="card">
							<!--<img class="card-img-top" src=".../100px180/" alt="Card image cap">-->
							<div class="card-body">
								<h6 class="card-title text-danger">Total de despesas: R$ <?= $total_desp_executadas != null ? number_format($total_desp_executadas, 2, ',', '.') : '0' ?></h6>
							</div>
							<div class="card-footer">
								<small class="text-muted">&copyUniverso Design - <?= date('Y') ?>  </small>
							</div>
						</div>
						<div class="card">
							<!--<img class="card-img-top" src=".../100px180/" alt="Card image cap">-->
							<div class="card-body">
								<h6 class="card-title text-success">Lucro anual: R$ <?=number_format($total_rec_executadas - $total_desp_executadas, 2, ',', '.') ?></h6>
							</div>
							<div class="card-footer">
								<small class="text-muted">&copyUniverso Design - <?= date('Y') ?>  </small>
							</div>
						</div>
						<div class="card">
							<!--<img class="card-img-top" src=".../100px180/" alt="Card image cap">-->
							<div class="card-body">
								<h6 class="card-title text-success">Lucro mensal médio: R$ <?=number_format(($total_rec_executadas - $total_desp_executadas)/12, 2, ',', '.') ?></h6>
							</div>
							<div class="card-footer">
								<small class="text-muted">&copyUniverso Design - <?= date('Y') ?>  </small>
							</div>
						</div>
					</div>

					<br>
				</div>
			</div>

		</div>
	</div>

	</div>
	<!-- fechamento da DIV de impressão-->

</div>
	<?php require_once 'includes/bootstrap-js.php'; ?>
	<!-- rodapé -->
	<?php require_once 'includes/rodape.php'; ?>
</body>

</html>