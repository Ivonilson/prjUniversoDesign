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
	<title>Receitas por período</title>
	<?php require_once 'includes/bootstrap-css.php'; ?>
	<script src="../js/abg2.js"></script>
</head>

<body class="bg-dark fixed-nav sticky-footer" id="page-top">
	<!-- NAVEGAÇÃO -->
	<?php require_once 'includes/navegacao.php'; ?>

	<!-- inicio DIV impressão -->
	<div id="imprimir" class="border bg-danger">

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
					<mark class="p-2 font-weight-bold">Receitas por periodo</mark>
				</li>

				<div class="col">
					<a href="/?pagina=resultados-controle" class="btn btn-info text-light float-right font-weight-bold rounded mt-2 ml-1" data-bs-toggle="tooltip" data-bs-placement="bottom" title="Resultados Controle de Caixa"><i class="fa fa-search"></i> Ver resultados</a>
					<a href="/?pagina=despesa-por-periodo" class="btn btn-info text-light float-right font-weight-bold rounded ml-1 mt-2" data-bs-toggle="tooltip" data-bs-placement="bottom" title="Despesas por período"><i class="fa fa-search"></i>  Despesas por período</a>
					<a href="/?pagina=lancar-receita" class="btn btn-danger text-light float-right font-weight-bold rounded mt-2" data-bs-toggle="tooltip" data-bs-placement="bottom" title="Incluir nova receita"><i class="fa fa-plus"></i>  Receita</a>
				</div>

			</ol>
			
			<div class="card mb-1">
				<div class="card-header">
					<i class="fa fa-table"></i> <span class="font-weight-bold text-lg">Receitas por período</span>
					<br>
					<br>
					<form method="post" class="background-form-cons d-print-none">

						<div id="div-ipt-data-form-cons">
							<div class="row">
								<div class="col-6 mt-2 mb-2 xs-col-12">
									<span>Data Inicial:&nbsp&nbsp</span><input type="date" name="data_inicial">
								</div>
								<div class="col-6 mt-2 mb-2 xs-col-12">
									<span>Data final:&nbsp&nbsp</span><input type="date" name="data_final">
								</div>
							</div>

							<div id="div-btn-form-cons">
								<input type="submit" value="Buscar" id="botoesCons">
							</div>

						</div>
						
					</form>
				</div>
			</div>

			<div id="row-tbl-consulta">
				<div class="col">

					<?php

					
					if ($retorno[1] == "Receita atualizada com sucesso!") {
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

					<div class="col-12 text-right d-print-none">
						<button class="btn btn-danger" onclick="window.print()">Imprimir</button>
					</div>

					<table class="table table-bordered table-hover display" id="dataTable" width="100%" cellspacing="0">
						<thead class="thead-light">
							<tr>
								<th>Cod. Receita</th>
								<th>Tipo</th>
								<th>Detalhamento</th>
								<th>Valor(R$)</th>
								<th>Forma de Pagamento</th>
								<th>Data de referência</th>
								<th>Data do lançamento</th>
								<th>Usuário</th>
								<th class="d-print-none">Atualizar</th>
								<th class="d-xs-none d-print-none">Deletar</th>
							</tr>
						</thead>
						<tfoot class="thead-light">
								<th>Cod. Receita</th>
								<th>Tipo</th>
								<th>Detalhamento</th>
								<th>Valor(R$)</th>
								<th>Forma de Pagamento</th>
								<th>Data de referência</th>
								<th>Data do lançamento</th>
								<th>Usuário</th>
								<th class="d-print-none">Atualizar</th>
								<th class="d-xs-none d-print-none">Deletar</th>
							</tr>
						</tfoot>
						<tbody>
							<?php

							
							$valor_total = 0;
							$contador = 0;

							$data_inicial = filter_input(INPUT_POST, 'data_inicial');
							$data_final = filter_input(INPUT_POST, 'data_final');

							if ($retorno[0] || isset($_POST['data_inicial'])) {
								echo "<strong>Periodo de Pesquisa: <mark>" . date_format(date_create($data_inicial), "d/m/Y") . " a " . date_format(date_create($data_final), "d/m/Y") . "</mark></strong><br><br>";
							}

							if ($retorno[0] != NULL) {

								foreach ($retorno[0] as  $value) {

									$contador++;

									$valor_total += $value['valor'];
							?>
									<tr>
										<form method="post">
											<td><?= $value['id_receita'] ?>&nbsp&nbsp<button class="btn btn-light d-md-none d-lg-none d-xl-none" value='Excluir' data-bs-toggle="tooltip" data-bs-placement="bottom" title="Excluir" name="btnDeletarOs" id="btnDeletarItem"><i class="fa fa-trash" aria-hidden="true"></i></button></td>
											<td><?= $value['tipo'] ?></td>
											<td><?= $value['detalhamento'] ?></td>
											<td><?= number_format($value['valor'], 2, ',', '.') ?></td>
											<td><?= $value['forma_pagamento'] ?></td>
											<td><?= date_format(date_create($value['data_referencia']), "d/m/Y") ?></td>
											<td><?= date_format(date_create($value['data_processamento']), "d/m/Y") ?></td>
											<td><?= $value['usuario'] ?></td>

											<td align="center" class="d-print-none"><a href="#" data-bs-toggle="tooltip" data-bs-placement="bottom" title="Atualizar" data-toggle="modal" data-target="#<?= $contador ?>"><i class="fa fa-pencil" aria-hidden="true" id="#<?= $contador ?>"></i></a></td>

											<td align="center">
												<input type="hidden" name="ipt-id-receita" value="<?= $value['id_receita'] ?>">

												<input type="hidden" name="ipt-confirmacao" id="ipt-confirma">

												<input class="form-control " type="hidden" name="data_inicial" value="<?= $data_inicial ?>">
													
												<input class="form-control" type="hidden" name="data_final" value="<?= $data_final ?>">

												<button class="btn btn-light d-xs-none d-print-none" value='Excluir' data-bs-toggle="tooltip" data-bs-placement="bottom" title="Excluir" name="btnDeletarOs" id="btnDeletarItem"><i class="fa fa-trash" aria-hidden="true"></i></button>
											</td>
										</form>

										<!--<td align="center"><a href="/?pagina=historico&cod_os=<?= $value['cod_os'] ?>&form=pesquisa-por-data-receb" title="Histórico" target="_blank"><i class="fa fa-history" aria-hidden="true"></a></td>-->
									</tr>

									<!-- MODAL EDITAR RECEITA --->
									<div class="modal fade" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel" aria-hidden="true" id="<?= $contador ?>">
										<div class="modal-dialog modal-lg">
											<div class="modal-content">

												<div class="modal-body">
													<div class="row justify-content-center">

														<h3 class="text-primary col-12 text-center mt-5">Alterando a receita <label class="border p-3 text-danger font-weight-bold"><?= $value['id_receita'] ?></label></h3>

														<form method="post">

															<input type="hidden" name="data_inicial" value="<?= filter_input(INPUT_POST, 'data_inicial') ?>">
															<input type="hidden" name="data_final" value="<?= filter_input(INPUT_POST, 'data_final') ?>">

															<div class="col-12">
																<label class="text-danger font-weight-bold readonly">Código</label>
																<br>
																<input class="form-control " type="date" name="ipt-data-referencia" value="<?= date_format(date_create($value['data_referencia']), "Y-m-d") ?>">
															</div>

															<div class="col-12">
																<label class="text-danger font-weight-bold readonly">Código</label>
																<br>
																<input class="form-control" type="text" name="ipt-id-receita-edicao" value="<?= $value['id_receita'] ?>">
															</div>

															<div class="col-12">
																<label class="text-danger font-weight-bold readonly">Tipo</label>
																<br>
																<select name="sel-tipo-edicao" class="form-control">
																	<option value="<?= $value['tipo'] ?>"><?= $value['tipo'] ?></option>
																	<option value="SERVIÇO">SERVIÇO</option>
																	<option value="VENDA LOJA">VENDA LOJA</option>
																	<option value="VENDA INTERNET">VENDA INTERNET</option>
																	<option value="APORTE">APORTE</option>
																</select>
															</div>

															<div class="col-12">
																<label class="text-danger font-weight-bold readonly">Detalhamento</label>
																<br>
																<input class="form-control" type="text" name="ta-detalhamento" value="<?= $value['detalhamento'] ?>">
															</div>

															<div class="col-12">
																<label class="text-danger font-weight-bold">Valor (R$)</label>
																<br>
																<input class="form-control" type="text" name="ipt-valor" value="<?= number_format($value['valor'], 2, ',', '') ?>">
															</div>

															<div class="col-12">
																<label class="text-danger font-weight-bold readonly">Forma de Pagamento</label>
																<br>
																<input class="form-control" type="text" name="ipt-forma_pagamento" value="<?= $value['forma_pagamento'] ?>">
															</div>

															<div class="col-12">
																<label class="text-danger text-light">-</label>
																<br>
																<input class="form-control btn btn-success" type="submit" name="btnEditarReceita" value="Gravar" style="font-weight: bold !important;">
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
					<div>
						<span style="font-weight: bold;">
							Total de RECEITAS no período selecionado: R$ <?= number_format($valor_total, 2, ',', '.') ?>
						</span>
					</div>
					<br>
				</div>
			</div>

		</div>

		<?php require_once 'includes/bootstrap-js.php'; ?>

		<!-- rodapé -->
		<?php require_once 'includes/rodape.php'; ?>
	</div>
	</div>
	<!-- fechamento da DIV de impressão> -->
	</div>
</body>

</html>