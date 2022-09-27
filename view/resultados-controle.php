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
					Controle de Caixa
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
				<div class="col-3">

				<form method="post">
					<div class="input-group">
						<div class="input-group-prepend">
							<label class="text-dark float-right input-group-text font-weight-bold">Ano referência</label>
						</div>
						<select class="float-right custom-select col-3" name="sel-carregar-ano" id="" style="min-width: 100px">
							<option value="<?= $resultados[0]['ano'] ?>"><?= $resultados[0]['ano'] ?></option>

							<?php 
								foreach($anoRetornado as $value){ 
							?>
							<option value="<?= $value['ano'] ?>"><?= $value['ano'] ?></option>
							<?php
								}
							?>
						</select>
					</div>
				</div>
						<div class="col-3 ml-5">
							<button class="btn btn-info btn-block">Carregar</button>
						</div>
				</form>
			</div>

			<!--
			<div class="row mb-4">

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
                                <th>Receitas Executadas (R$)</th>
                                <th>Despesas Executadas (R$)</th>
								<th>Retorno (R$)</th>
								<!-- <th>Status</th> -->
							</tr>
						</thead>
						<tfoot class="thead-light">
                            <tr>
                                <th>ID</th>
                                <th>Mês/Ano</th>
                                <th>Receitas Executadas (R$)</th>
                                <th>Despesas Executadas (R$)</th>
								<th>Retorno (R$)</th>
								<!-- <th>Status</th> -->
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

							$total_rec_executadas = 0;

							$total_desp_executadas = 0;

							$meta_card_lucro_mensal = 0;

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

										$controleReceita++;
									}

									while($controleDespesa < $contadorDespesas) {

										if($mes[substr($despesasExecutadas[$controleDespesa]['data_referencia'], 5, 2)].'/'.
										substr($despesasExecutadas[$controleDespesa]['data_referencia'], 0, 4) == $value['mes_ano_planejado']){
											$valorDespesa += $despesasExecutadas[$controleDespesa]['valor'];
										}
										
										$controleDespesa++;
									}

								?>
									<tr>
                                        <td class="sr-only"><?= $value['id_plan_rec_desp'] ?></td>
										<td><?= $value['mes_ano_planejado'] ?></td>

										<td><?=number_format($valorReceita, 2, ',', '.');?></td>

										<td><?=number_format($valorDespesa, 2, ',', '.');?></td>

										<td><?= number_format(($valorReceita -$valorDespesa), 2, ',', '.') ?></td>
										<!-- <td>Fazer via JS</td> -->
									</tr>

							<?php
									$conexao = null;
								
									$total_rec_executadas += $valorReceita;
									$total_desp_executadas += $valorDespesa;

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
								<h5 class="card-title text-info">Total de receitas: R$ <?= $total_rec_executadas != null ? number_format($total_rec_executadas, 2, ',', '.') : '0' ?></h5>
							</div>
							<div class="card-footer">
								<small class="text-muted">&copyAbg Soluções  </small>
							</div>
						</div>
						<div class="card">
							<!--<img class="card-img-top" src=".../100px180/" alt="Card image cap">-->
							<div class="card-body">
								<h5 class="card-title text-danger">Total de despesas: R$ <?= $total_desp_executadas != null ? number_format($total_desp_executadas, 2, ',', '.') : '0' ?></h5>
							</div>
							<div class="card-footer">
								<small class="text-muted">&copyAbg Soluções  </small>
							</div>
						</div>
						<div class="card">
							<!--<img class="card-img-top" src=".../100px180/" alt="Card image cap">-->
							<div class="card-body">
								<h5 class="card-title text-success">Lucro anual: R$ <?=number_format($total_rec_executadas - $total_desp_executadas, 2, ',', '.') ?></h5>
							</div>
							<div class="card-footer">
								<small class="text-muted">&copyAbg Soluções  </small>
							</div>
						</div>
						<div class="card">
							<!--<img class="card-img-top" src=".../100px180/" alt="Card image cap">-->
							<div class="card-body">
								<h5 class="card-title text-success">Lucro mensal médio: R$ <?=number_format(($total_rec_executadas - $total_desp_executadas)/12, 2, ',', '.') ?></h5>
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