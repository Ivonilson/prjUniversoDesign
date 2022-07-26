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
	<title>Planejamento Receitas/Despesas</title>
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
					<mark class="p-2 font-weight-bold">Planejamento</mark>
				</li>

                <div class="col">
					<a href="/?pagina=lancar-planejamento" class="btn btn-danger text-light float-right font-weight-bold rounded" data-bs-toggle="tooltip" data-bs-placement="bottom" title="Incluir mês/ano"><i class="fa fa-plus"></i>  Lançar planejamento</a>
				</div>

			</ol>

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

					<?php

					
					if ($retorno[1] == "Planejamento atualizado com sucesso!") {
					?>

						<div class="alert alert-success font-weight-bold alertaCadOsOk col-12 text-center" role="alert">
							<img src="../assets/ok.png">
							<h5><strong><?=$retorno[1] ?></strong></h5>
						</div>

						<script>
							/*setInterval(function() {
								window.location.href = "/?pagina=controle-caixa-relatorio"
							}, 3000)*/
						</script>

					<?php

					} else if ($retorno[1] == "ERRO. Verifique se você REALMENTE alterou alguma coisa ou Contate o Suporte.") {
					?>

						<div class="alert alert-warning font-weight-bold text-danger alertaCadOsNoOk col-12 text-center" role="alert">
							<img src="../assets/error.png">
							<h5><strong><?= $retorno[1] ?></strong></h5>
						</div>

					<?php
					}  else if ($retorno[1] == "Registro deletado com sucesso...") {
					?>
						<div class="alert alert-success font-weight-bold alertaCadOsOk col-12 text-center" role="alert">
							<img src="../assets/ok.png">
						<h5><strong><?= $retorno[1] ?></strong></h5>
						</div>

					<?php
						} 
					?>

					<table class="table table-bordered table-hover display" id="dataTable" width="100%" cellspacing="0">
						<thead class="thead-light">
							<tr>
                                <th>ID</th>
								<th>Mês/Ano</th>
								<th>Valor Receita(R$)</th>
								<th>Valor Despesa (R$)</th>
                                <th>Data de Processamento</th>
								<th>Usuário</th>
								<th>Atualizar</th>
								<th class="d-xs-none">Deletar</th>
							</tr>
						</thead>
						<tfoot class="thead-light">
                                <th>ID</th>
                                <th>Mês/Ano</th>
								<th>Valor Receita(R$)</th>
								<th>Valor Despesa (R$)</th>
                                <th>Data de Processamento</th>
								<th>Usuário</th>
								<th>Atualizar</th>
								<th class="d-xs-none">Deletar</th>
							</tr>
						</tfoot>
						<tbody>
							<?php

							
							$valor_total_receita = 0;
                            $valor_total_despesa = 0;
							$contador = 0;

							if ($retorno[0] != NULL) {

								foreach ($retorno[0] as  $value) {

									$contador++;

									$valor_total_receita += $value['valor_receita'];
                                    $valor_total_despesa += $value['valor_despesa'];
							?>
									<tr>
										<form method="post">
                                            <td><?= $value['id_plan_rec_desp'] ?></td>
											<td><?= $value['mes_ano_planejado'] ?></td>
											<td><?= number_format($value['valor_receita'], 2, ',', '.') ?></td>
                                            <td><?= number_format($value['valor_despesa'], 2, ',', '.') ?></td>
											<td><?= date_format(date_create($value['data_processamento']), "d/m/Y") ?></td>
											<td><?= $value['usuario'] ?></td>

											<td align="center"><a href="#" data-bs-toggle="tooltip" data-bs-placement="bottom" title="Atualizar" data-toggle="modal" data-target="#<?= $contador ?>"><i class="fa fa-pencil" aria-hidden="true" id="#<?= $contador ?>"></i></a></td>

											<td align="center">
												<input type="hidden" name="ipt-id-rec_desp" value="<?= $value['id_plan_rec_desp'] ?>">

												<input type="hidden" name="ipt-confirmacao" id="ipt-confirma">

												<button class="btn btn-light d-xs-none" value='Excluir' data-bs-toggle="tooltip" data-bs-placement="bottom" title="Excluir" name="btnDeletarPlan" id="btnDeletarItem"><i class="fa fa-trash" aria-hidden="true"></i></button>
											</td>
										</form>

										<!--<td align="center"><a href="/?pagina=historico&cod_os=<?= $value['cod_os'] ?>&form=pesquisa-por-data-receb" title="Histórico" target="_blank"><i class="fa fa-history" aria-hidden="true"></a></td>-->
									</tr>

									<!-- MODAL EDITAR PLANEJAMENTO --->
									<div class="modal fade" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel" aria-hidden="true" id="<?= $contador ?>">
										<div class="modal-dialog modal-lg">
											<div class="modal-content">

												<div class="modal-body">
													<div class="row justify-content-center">

														<h3 class="text-primary col-12 text-center mt-5">Alterando Planejamento <label class="border p-3 text-danger font-weight-bold"><?= $value['id_plan_rec_desp'] ?></label></h3>

														<form method="post">

															<div class="col-12">
																<label class="text-danger font-weight-bold readonly">ID</label>
																<br>
																<input class="form-control" type="text" name="ipt-id-planejamento-edicao" value="<?= $value['id_plan_rec_desp'] ?>">
															</div>

															<div class="col-12">
																<label class="text-danger font-weight-bold readonly">Mês/Ano</label>
																<br>
																<input class="form-control" type="text" name="ipt-mes-ano-planejado-edicao" value="<?= $value['mes_ano_planejado'] ?>">
															</div>

															<div class="col-12">
																<label class="text-danger font-weight-bold">Valor Receita (R$)</label>
																<br>
																<input class="form-control" type="text" name="ipt-valor-receita" value="<?= number_format($value['valor_receita'], 2, ',', '') ?>">
															</div>

                                                            <div class="col-12">
																<label class="text-danger font-weight-bold">Valor Despesa (R$)</label>
																<br>
																<input class="form-control" type="text" name="ipt-valor-despesa" value="<?= number_format($value['valor_despesa'], 2, ',', '') ?>">
															</div>

															<div class="col-12">
																<label class="text-danger text-light">-</label>
																<br>
																<input class="form-control btn btn-success" type="submit" name="btnEditarPlanejado" value="Gravar" style="font-weight: bold !important;">
															</div>

														</form>

													</div>

												</div>

											</div>
										</div>
									</div>


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
							<h5 class="card-title">Total de receitas planejadas: R$ <?= number_format($valor_total_receita, 2, ',', '.') ?></h5>
							<!--<p class="card-text">This is a wider card with supporting text below as a natural lead-in to additional content. This content is a little bit longer.</p>-->
							</div>
							<div class="card-footer">
							<small class="text-muted">Informações processadas em <?= date_format(date_create($value['data_processamento']), "d/m/Y") ?> </small>
							</div>
						</div>
						<div class="card">
							<!--<img class="card-img-top" src=".../100px180/" alt="Card image cap">-->
							<div class="card-body">
							<h5 class="card-title">Total de despesas planejadas: R$ <?= number_format($valor_total_despesa, 2, ',', '.') ?></h5>
							<!--<p class="card-text">This is a wider card with supporting text below as a natural lead-in to additional content. This content is a little bit longer.</p>-->
							</div>
							<div class="card-footer">
							<small class="text-muted">Informações processadas em <?= date_format(date_create($value['data_processamento']), "d/m/Y") ?> </small>
							</div>
						</div>
						<div class="card">
							<!--<img class="card-img-top" src=".../100px180/" alt="Card image cap">-->
							<div class="card-body">
							<h5 class="card-title">Lucro anual planejado: R$ <?= number_format($valor_total_receita - $valor_total_despesa, 2, ',', '.') ?></h5>
							<!--<p class="card-text">This is a wider card with supporting text below as a natural lead-in to additional content. This content is a little bit longer.</p>-->
							</div>
							<div class="card-footer">
							<span class="text-info font-weight-bold" style="font-size: 18px">Taxa de lucro:  <?= number_format(100 - ($valor_total_despesa / $valor_total_receita) * 100, 2, ',' , '.') ?>% </span>
							</div>
						</div>
						<div class="card">
							<!--<img class="card-img-top" src=".../100px180/" alt="Card image cap">-->
							<div class="card-body">
							<h5 class="card-title">Lucro médio mensal planejado: R$ <?= number_format(($valor_total_receita - $valor_total_despesa) / 12, 2, ',', '.') ?></h5>
							<!--<p class="card-text">This is a wider card with supporting text below as a natural lead-in to additional content. This content is a little bit longer.</p>-->
							</div>
							<div class="card-footer">
							<span class="text-danger font-italic" style="font-size: 18px"> Média referente a 12 meses (Janeiro a Dezembro) </span>
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