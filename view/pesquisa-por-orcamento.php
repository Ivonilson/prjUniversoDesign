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
	<title>Orçamentos</title>
	<?php require_once 'includes/bootstrap-css.php'; ?>

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
					Orçamentos
				</li>
				<li class="breadcrumb-item">
					<mark class="p-2 font-weight-bold">Consultar Orçamento</mark>
				</li>

				<div class="col">
					<a href="/?pagina=cadastrar-orcamento" class="btn btn-danger text-light float-right font-weight-bold rounded" data-bs-toggle="tooltip" data-bs-placement="bottom" title="Incluir novo Orçamento"><i class="fa fa-plus"></i> Orçamento</a>
				</div>

			</ol>

			<div class="row mb-3">

				<div class="col">
					<a href="?pagina=pesquisa-por-data-receb" class="botoes-atalho-cons" data-bs-toggle="tooltip" data-bs-placement="bottom" title="Pesq. por data receb."><i class="fa fa-search" aria-hidden="true"></i> O.S(s) por data de recebimento </a>
				</div>

				<div class="col">
					<a href="?pagina=pesquisa-por-data-agendamento" class="botoes-atalho-cons" data-bs-toggle="tooltip" data-bs-placement="bottom" title="Pesq. por data de agendamento"><i class="fa fa-search " aria-hidden="true"></i> O.S(s) por data de agendamento </a>
				</div>

				<div class="col">
					<a href="?pagina=pesquisa-por-os" class="botoes-atalho-cons" data-bs-toggle="tooltip" data-bs-placement="bottom" title="Pesq. O.S. por código"><i class="fa fa-search " aria-hidden="true"></i> Pesq. O.S. por código </a>
				</div>

				<div class="col">
					<a href="?pagina=pesquisa-produto" class="botoes-atalho-cons" data-bs-toggle="tooltip" data-bs-placement="bottom" title="Produtos cadastrados"><i class="fa fa-search " aria-hidden="true"></i> Produtos </a>
				</div>

				<div class="col">
					<a href="?pagina=pesquisa-cliente" class="botoes-atalho-cons" data-bs-toggle="tooltip" data-bs-placement="bottom" title="Clientes cadastrados"><i class="fa fa-search " aria-hidden="true"></i> Clientes </a>
				</div>

			</div>

			<div class="card mb-1 col">
				<div class="card-header">
					<i class="fa fa-table"></i> <span class="font-weight-bold text-lg">Orçamentos</span>
					<br>
					<br>
					<form method="get" class="background-form-cons">

						<div id="div-ipt-data-form-cons">
							<div class="input-group mt-3 mb-3">
								<div class="input-group-prepend">
									<div class="input-group-text bg-secondary text-white">
										Pesquisar
									</div>
								</div>

								<input type="hidden" name="pagina" value="pesquisa-por-orcamento">

								<input type="text" class="form-control col" name="ipt-pesquisa-orcamento" placeholder="Digite uma palavra chave ou TODOS">

							</div>
						</div>

						<div id="div-btn-form-cons">
							<input type="submit" value="Buscar" id="botoesCons">
						</div>
					</form>
				</div>
			</div>

			<div id="row-tbl-consulta">
				<div class="col">
					<br>
					<table class="table table-bordered table-hover display" id="dataTable" width="100%" cellspacing="0">
						<thead class="thead-light">
							<tr>
								<th>Código</th>
								<th>Cliente</th>
								<th>Serviço</th>
								<th>Data Cadastro</th>
								<th>Data Validade</th>
								<th>Status</th>
								<th>Observação</th>
								<th>Ver Itens</th>
								<th>Editar</th>
								<th>Imprimir</th>
								<th class="d-xs-none">Excluir</th>
							</tr>
						</thead>
						<tfoot class="thead-light">
							<tr>
								<th>Código</th>
								<th>Cliente</th>
								<th>Serviço</th>
								<th>Data Cadastro</th>
								<th>Data Validade</th>
								<th>Status</th>
								<th>Observação</th>
								<th>Ver Itens</th>
								<th>Editar</th>
								<th>Imprimir</th>
								<th class="d-xs-none">Excluir</th>
							</tr>
						</tfoot>
						<tbody>
							<?php

							$contador = 0;

							if ($resultado != NULL) {

								foreach ($resultado as  $value) {
							?>

									<tr>
										<form method="post">
											<td id="valor_id"><?= $value['id_orcamento'] ?>&nbsp&nbsp<button class="btn btn-light d-lg-none" name="btn-deletar-orcamento" id="btn-del-orcamento" data-bs-toggle="tooltip" data-bs-placement="bottom" title="Excluir"><i class="fa fa-trash" aria-hidden="true"></i></button></td>
											<td><?= $value['nome'] ?></td>
											<td><?= $value['servico'] ?></td>
											<td><?= date_format(date_create($value['data_cadastro']), "d/m/Y") ?></td>
											<td><?= date_format(date_create($value['data_validade']), "d/m/Y") ?></td>
											<td><?= $value['status'] ?></td>
											<td><?= $value['observacao'] ?></td>

											<!--<td align="center"  data-toggle="modal" data-target=".modal-ver-itens"><a href="#" title="Atualizar"><i class="fa fa-check-square-o" aria-hidden="true"></i></a></td>--->

											<td align="center">
												<a href="/?pagina=itens-orcamento&id_orcamento=<?= $value['id_orcamento'] ?>" data-bs-toggle="tooltip" data-bs-placement="bottom" title="Itens orçamento" target="_blank" class="btn btn-default"><i class="fa fa-search" aria-hidden="true"></i></a>
											</td>

											<td align="center">
												<a href="#" class="btn btn-default" data-toggle="modal" data-target="#<?= $contador ?>"><i class="fa fa-pencil" aria-hidden="true"></i></a>
											</td>

											<td align="center"><a href="/?pagina=impressao-orcamento&id_orcamento=<?= $value['id_orcamento'] ?>&form=pesquisa-por-orcamento" data-bs-toggle="tooltip" data-bs-placement="bottom" title="Imprimir" target="_blank" class="btn btn-default"><i class="fa fa-print" aria-hidden="true"></i></a></td>



											<input type="hidden" name="ipt-orcamento-deletar" value="<?= $value['id_orcamento'] ?>">

											<input type="hidden" id="orcamento-deletar" name="ipt-confirma-orcamento-deletar">

											<td align="center"><button class="btn btn-default d-xs-none" name="btn-deletar-orcamento" id="btn-del-orcamento" data-bs-toggle="tooltip" data-bs-placement="bottom" title="Excluir"><i class="fa fa-trash" aria-hidden="true"></i></button></td>
										</form>

										<!--<td align="center"><a href="/?pagina=historico&cod_os=<?= $value['cod_os'] ?>&form=pesquisa-por-data-receb" title="Histórico" target="_blank"><i class="fa fa-history" aria-hidden="true"></a></td>-->
									</tr>


									<!-- MODAL EDITAR ORÇAMENTO --->
									<div class="modal fade" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel" aria-hidden="true" id="<?= $contador ?>">
										<div class="modal-dialog modal-sm">
											<div class="modal-content">

												<div class="modal-body">
													<div class="row justify-content-center">

														<h3 class="text-primary col-12 text-center mt-5">Alterando o orçamento n° <label class="border p-3 text-danger font-weight-bold"><?= $value['id_orcamento'] ?></label></h3>

														<form method="post">

															<div class="col-lg-12 col-md-12 col-sm-12 col-xs-12 mt-2">
																<input type="hidden" class="form-control mb-2"  name="ipt-id-orcamento"  value="<?=$value['id_orcamento']?>">
															</div>

															<div class="col-lg-12 col-md-12 col-sm-12 col-xs-12 mt-2">
																<label for="servico">Serviço</label>
																<input type="text" class="form-control mb-2" placeholder="-" name="ipt-servico" aria-describedby="servico" value="<?=$value['trabalho_servico'] ?>">
															</div>

															<div class="col-lg-12 col-md-12 col-sm-12 col-xs-12 mt-4">
																<label class="text-dark" for="select-status">
																	Status
																</label>
																<select class="form-control mb-2" id="select-status" name="sel-status">
																	<option value="<?= $value['status'] ?>"><?= $value['status'] ?></option>
																	<option value="EM ANÁLISE">EM ANÁLISE</option>
																	<option value="APROVADO">APROVADO</option>
																	<option value="SUSPENSO">SUSPENSO</option>
																	<option value="CANCELADO">CANCELADO</option>
																</select>
															</div>

															<div class="col-lg-12 col-md-12 col-sm-12 col-xs-12 mt-2">
																<label for="validade">Validade</label>
																<input type="date" class="form-control mb-2" placeholder="-" name="ipt-validade" aria-describedby="validade" value="<?=$value['data_validade']?>">
															</div>

															<div class="col-lg-12 col-md-12 col-sm-12 col-xs-12 mt-2">
																<label for="prazo">Prazo de entrega</label>
																<input type="number" min="1" class="form-control mb-2" placeholder="-" name="ipt-prazo" aria-describedby="prazo" value="<?=$value['prazo'] != null ? $value['prazo'] : 0 ?>">
															</div>

															<div class="col-12">
																<label for="inlineFormInputObservacoes">Observações</label>
																<textarea type="text" class="form-control mb-2" id="inlineFormInputObservacoes" cols="100" rows="3" placeholder="Observações" name="ta-observacao"><?= $value['observacao'] ?></textarea>
															</div>

															<div class="col-lg-12 col-md-12 col-sm-12 col-xs-12 mt-4">
																<label class="text-danger text-light">-</label>
																<br>
																<input class="form-control btn-success" type="submit" name="btnEditarOrcamento" value="Gravar">
															</div>

														</form>

													</div>

												</div>

											</div>
										</div>
									</div>
									<!-- FIM MODAL EDITAR ORÇAMENTO-->


							<?php
									$contador++;
									$conexao = null;
								}
							} else {
								//echo "<span class='text-danger'>NENHUM DADO RETORNADO.</span><br><br>";
							}

							?>
						</tbody>
					</table>
					<br>
				</div>
			</div>
		</div>

		<!-- rodapé -->
		<?php require_once 'includes/rodape.php'; ?>
	</div>

	<?php require_once 'includes/bootstrap-js.php'; ?>

	<!-- BARRA DE PROGRESSO DOS SERVIÇOS EXECUTADOS -->
	<script type="text/javascript">
		//Redirect();
	</script>
</body>

</html>