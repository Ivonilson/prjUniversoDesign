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
                                <th></th>
                                <th></th>
                                <th>Despesa Planejada (R$)</th>
                                <th>Despesa Executada (R$)</th>
                                <th></th>
                                <th></th>
								<th>Saldo (R$)</th>
								<th>Status</th>
							</tr>
						</thead>
						<tfoot class="thead-light">
                            <tr>
                                <th>ID</th>
                                <th>Mês/Ano</th>
								<th>Receita Planejada (R$)</th>
                                <th>Receita Executada (R$)</th>
                                <th></th>
                                <th></th>
                                <th>Despesa Planejada (R$)</th>
                                <th>Despesa Executada (R$)</th>
                                <th></th>
                                <th></th>
								<th>Saldo (R$)</th>
								<th>Status</th>
							</tr>
						</tfoot>
						<tbody>
							<?php

							 $mes = ["01" => "JANEIRO", "02" => "FEVEREIRO", "03" => "MARÇO", "04" => "ABRIL",
									   "05" => "MAIO", "06" => "JUNHO", "07" => "JULHO", "08" => "AGOSTO", "09" => "SETEMBRO",
									   "10" => "OUTUBRO", "11" => "NOVEMBRO", "12" => "DEZEMBRO"
									  ];

							$contador = count($receitasExecutadas);
							$controle = 0;
							$valor = 0;

							if ($resultados != NULL) {

								foreach ($resultados as $value) {
									//$numero_mes = substr($receitasExecutadas[$controle]['data_referencia'], 5, 2);

									while($controle < $contador) {

										if($mes[substr($receitasExecutadas[$controle]['data_referencia'], 5, 2)].'/'.
										substr($receitasExecutadas[$controle]['data_referencia'], 0, 4) == $value['mes_ano_planejado']){
											$valor += $receitasExecutadas[$controle]['valor'];
										}

										echo "<br>";
										//echo $valor;
										echo "<br>";
										echo $controle;
										echo "<br>";
										//echo $mes[substr($receitasExecutadas[$controle]['data_referencia'], 5, 2)].'/'.
										//substr($receitasExecutadas[$controle]['data_referencia'], 0, 4);
										echo "<br>";
										//echo $mes[substr($receitasExecutadas[$controle]['data_referencia'], 5, 2)].'/'.
										//substr($receitasExecutadas[$controle]['data_referencia'], 0, 4);
										echo "<br>";
										
										$controle++;
									}

								?>
									<tr>
                                        <td class="sr-only"><?= $value['id_plan_rec_desp'] ?></td>
										<td><?= $value['mes_ano_planejado'] ?></td>
										<td><?= number_format($value['valor_receita_planejada'], 2, ',', '.') ?></td>

										<td><?=number_format($valor, 2, ',', '.');?></td>

                                        <td><?= number_format($value['saldo_despesa'], 2, ',', '.') ?></td>
                                        <td></td>
                                        <td><?= number_format($value['valor_despesa_planejada'], 2, ',', '.') ?></td>
										<td><?= number_format($value['valor'], 2, ',', '.') ?></td>
                                        <td><?= number_format($value['saldo_receita'], 2, ',', '.') ?></td>
                                        <td></td>
										<td><?= number_format($value['saldo'], 2, ',', '.') ?></td>
										<td>Fazer via JS</td>
									</tr>

							<?php
									$conexao = null;

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
								<h5 class="card-title">Total de receitas planejadas: R$ <?=  $valor_total_receita_planejada != null ? number_format( $valor_total_receita_planejada, 2, ',', '.') : '0' ?></h5>
								<h5 class="card-title">Total de receitas executadas: R$ <?= $valor_total_receita_executada != null ? number_format($valor_total_receita_executada, 2, ',', '.') : '0' ?></h5>
                                <h5 class="card-title">Saldo: R$ <?= $saldo != null ? number_format($saldo, 2, ',', '.') : '0' ?></h5>
                                <!--<p class="card-text">This is a wider card with supporting text below as a natural lead-in to additional content. This content is a little bit longer.</p>-->
							</div>
							<div class="card-footer">
								<small class="text-muted">&copyAbg Soluções  </small>
							</div>
						</div>
						<div class="card">
							<!--<img class="card-img-top" src=".../100px180/" alt="Card image cap">-->
							<div class="card-body">
								<h5 class="card-title">Total de despesas planejadas: R$ <?=  $valor_total_despesa_planejada != null ? number_format( $valor_total_receita_planejada, 2, ',', '.') : '0' ?></h5>
								<h5 class="card-title">Total de despesa executadas: R$ <?= $valor_total_receita_executada != null ? number_format($valor_total_receita_executada, 2, ',', '.') : '0' ?></h5>
                                <!--<p class="card-text">This is a wider card with supporting text below as a natural lead-in to additional content. This content is a little bit longer.</p>-->
							</div>
							<div class="card-footer">
								<small class="text-muted">&copyAbg Soluções  </small>
							</div>
						</div>
						<div class="card">
							<!--<img class="card-img-top" src=".../100px180/" alt="Card image cap">-->
							<div class="card-body">
								<h5 class="card-title">Lucro anual planejado: R$ <?= $valor_total_receita_planejada != null ? number_format($valor_total_receita_planejada - $valor_total_despesa_planejada, 2, ',', '.') : '0' ?></h5>
								<h5 class="card-title">Lucro anual executado: R$ <?= $valor_total_receita_executada != null ? number_format($valor_total_receita_executada - $valor_total_despesa_planejada, 2, ',', '.') : '0' ?></h5>
                                <h5 class="card-title">Saldo: R$ <?= $saldo != null ? number_format($saldo, 2, ',', '.') : '0' ?></h5>
                                <!--<p class="card-text">This is a wider card with supporting text below as a natural lead-in to additional content. This content is a little bit longer.</p>-->
							</div>
							<div class="card-footer">
								<small class="text-muted">&copyAbg Soluções  </small>
							</div>
						</div>
						<div class="card">
							<!--<img class="card-img-top" src=".../100px180/" alt="Card image cap">-->
							<div class="card-body">
								<h5 class="card-title">Saldo mensal planejado: R$ <?= $valor_total_receita_planejada != null ? number_format($valor_total_receita_planejada - $valor_total_despesa_planejada, 2, ',', '.') : '0' ?></h5>
								<h5 class="card-title">Saldo mensal executado: R$ <?= $valor_total_receita_executada != null ? number_format($valor_total_receita_executada - $valor_total_despesa_planejada, 2, ',', '.') : '0' ?></h5>
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