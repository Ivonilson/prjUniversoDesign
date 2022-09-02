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
	<title>Lançar Receita</title>
	<?php require_once 'includes/bootstrap-css.php'; ?>
</head>

<body class="bg-dark fixed-nav sticky-footer" id="page-top">
	<!-- NAVEGAÇÃO -->
	<?php require_once 'includes/navegacao.php'; ?>

	<div class="content-wrapper">
		<div class="container-fluid">
			<ol class="breadcrumb">
				<li class="breadcrumb-item">
					<a href="?pagina=os-do-dia" class="text-decoration-none">Início</a>
				</li>
				<li class="breadcrumb-item">
					Financeiro
				</li>
				<li class="breadcrumb-item">
					<mark class="p-2 font-weight-bold">Lançar Receita</mark>
				</li>

				<div class="col mt-2">
					<a href="/?pagina=receita-por-periodo" class="btn btn-info text-light float-right font-weight-bold rounded mt-2 ml-1" data-bs-toggle="tooltip" data-bs-placement="bottom" title="Receitas por período"><i class="fa fa-search"></i> Receitas por período</a>
					<a href="/?pagina=lancar-despesa" class="btn btn-danger text-light float-right font-weight-bold rounded mt-2" data-bs-toggle="tooltip" data-bs-placement="bottom" title="Lançar despesa"><i class="fa fa-plus"></i> Lançar despesa</a>
				</div>
			</ol>

			<div class="row justify-content-center">

				<!--<div class="col">
					<a href="?pagina=cadastrar-orcamento" class="botoes-atalho-cad" data-bs-toggle="tooltip" data-bs-placement="bottom" title="Novo Orçamento"><i class="fa fa-plus " aria-hidden="true"></i> Orçamento </a>
				</div>

				<div class="col">
					<a href="?pagina=cadastrar-cliente" class="botoes-atalho-cad" data-bs-toggle="tooltip" data-bs-placement="bottom" title="Novo Cliente"><i class="fa fa-plus " aria-hidden="true"></i> Cliente </a>
				</div>

				<div class="col">
					<a href="?pagina=cadastrar-produto" class="botoes-atalho-cad" data-bs-toggle="tooltip" data-bs-placement="bottom" title="Novo Produto"><i class="fa fa-plus " aria-hidden="true"></i> Produto </a>
				</div>

				<div class="col">
					<a href="?pagina=cadastrar-notificacao" class="botoes-atalho-cad" data-bs-toggle="tooltip" data-bs-placement="bottom" title="Cadastrar Notificação"><i class="fa fa-plus " aria-hidden="true"></i> Notificação </a>
				</div>

			</div> 

		-->

				<br>

				<div class="row" id="background-tela-cadastro">

					<form class="container background-form-cadastro" method="post">

						<div id="jumbotron_telas_cadastro">
							<div class="container">
								<h4>Lançar Receita</h4>
							</div>

							<div class="col text-right mb-0">
								<button type="button" class="text-light btn btn-secondary" data-toggle="modal" data-target="#md-ultima-despesa">Ver última receita lançada</button>
							</div>

						</div>

						<?php
						if ($mensagem_erro == "Receita lançada com sucesso!") {
						?>

							<div class="alert alert-success font-weight-bold alertaCadOsOk col-12 text-center" role="alert">
								<img src="../assets/ok.png">
								<h5><strong><?= $mensagem_erro ?></strong></h5>
							</div>

						<?php
						} elseif ($mensagem_erro == "ERRO. Tente novamente. Caso o problema persista, contate o Suporte.") {
						?>

							<div class="alert alert-warning font-weight-bold text-danger alertaCadOsNoOk col-12 text-center" role="alert">
								<img src="../assets/error.png">
								<h5><strong><?= $mensagem_erro ?></strong></h5>
							</div>

						<?php
						}
						?>

						<!-- Modal última receita -->
						<div class="modal fade offset-0 col-12 offset-0" id="md-ultima-despesa" tabindex="-1" role="dialog" aria-labelledby="exampleModalLongTitle" aria-hidden="true">
							<div class="modal-dialog" role="document">
								<div class="modal-content">
									<div class="modal-header">
										<h5 class="modal-title" id="exampleModalLongTitle">Receita: <?= $UltimaReceitaCadastrada != null ? $UltimaReceitaCadastrada['id_receita'] : '- Nenhuma receita cadastrada.';  ?></h5>
										<button type="button" class="close" data-dismiss="modal" aria-label="Close">
											<span aria-hidden="true">&times;</span>
										</button>
									</div>
									<div class="modal-body">

										<div class="card">
											<div class="card-body col">

												<br><span class="font-weight-bold text-dark" style="font-size: 20px">Tipo: </span><span style="font-size: 22px"><?= $UltimaReceitaCadastrada != null ?  $UltimaReceitaCadastrada['tipo'] : '-'; ?></span><br>

												<br><span class="font-weight-bold text-dark" style="font-size: 20px">Detalhamento: </span><span style="font-size: 22px"><?= $UltimaReceitaCadastrada != null ?  $UltimaReceitaCadastrada['detalhamento'] : '-'; ?></span><br>

												<br><span class="font-weight-bold text-dark" style="font-size: 20px">Valor(R$): </span><span style="font-size: 22px"><?= $UltimaReceitaCadastrada != null ?  number_format($UltimaReceitaCadastrada['valor'], 2, ',', '.') : '-'; ?></span><br>

												<br><span class="font-weight-bold text-dark" style="font-size: 20px">Forma de pagamento: </span><span style="font-size: 22px"><?= $UltimaReceitaCadastrada != null ?  $UltimaReceitaCadastrada['forma_pagamento'] : '-'; ?></span><br>

												<br><span class="font-weight-bold text-dark" style="font-size: 20px">Data de Ref.: </span><span style="font-size: 22px"><?= $UltimaReceitaCadastrada != null ? date_format(date_create($UltimaReceitaCadastrada['data_referencia']), "d/m/Y") : '-'; ?></span><br>

												<span class="font-weight-bold text-dark" style="font-size: 20px">Cadastrado em: </span><span style="font-size: 22px"><?= $UltimaReceitaCadastrada != null ? date_format(date_create($UltimaReceitaCadastrada['data_processamento']), "d/m/Y") : '-'; ?></span><br><br>

												<div class="row">
													<a href="#" class="card-link btn btn-danger  col-sm col-xs col" data-toggle="modal" data-target="#md-editar">Editar</a>

													<a href="/?pagina=pesquisa-receita" class="card-link btn btn-info  col-sm col-xs col sr-only">Pesquisar Receitas</a>
												</div>

											</div>
										</div>

									</div>

								</div>
							</div>
						</div>

						<div class="form-row align-items-center">

							<div class="col-lg-2 col-md-12 col-sm-12 col-xs-12">
								<label class="sr-only" for="inlineFormInputOs">Id despesa</label>

								<input type="hidden" class="form-control mb-2" id="inlineFormInputOs" placeholder="Nº O.S" value="<?= $codigo ?>" name="ipt-cod" required>

								<?php //var_dump($codigo); 
								?>

								<input type="text" class="form-control mb-2" id="inlineFormInputOs" value="<?= $codigo ?>" disabled>

							</div>

							<div class="col-lg-4 col-md-12 col-sm-12 col-xs-12">
								<div class="input-group mb-2">
									<div class="input-group-prepend">
										<label class="input-group-text bg-secondary text-white" for="select-tipo">
											TIPO
										</label>
									</div>
									<select class="custom-select" name="sel-tipo-lancar">
										<option value="-">Selecione</option>
										<option value="SERVIÇO">SERVIÇO</option>
										<option value="VENDA LOJA">VENDA LOJA</option>
										<option value="VENDA INTERNET">VENDA INTERNET</option>
										<option value="APORTE">APORTE</option>
									</select>
								</div>
							</div>

							<div class="form-row align-items-center">

								<div class="col-12">
									<label class="sr-only" for="inlineFormInputDetalhamento">Detalhamento da receita</label>
									<textarea type="text" class="form-control mb-2" id="inlineFormInputDetalhamento" cols="140" rows="6" placeholder="Digite aqui o detalhamento da receita..." name="ta-detalhamento"></textarea>
								</div>

							</div>

							<div class="col-lg-3 col-md-12 col-sm-12 col-xs-12">
								<label class="sr-only" for="inlineFormInputEndereco">VALOR(R$)</label>
								<input type="text" class="form-control mb-2" id="inlineFormInputEndereco" placeholder="Valor em R$ " name="ipt-valor" required>
							</div>

							<div class="col-lg-5 col-md-12 col-sm-12 col-xs-12">
								<div class="input-group mb-2">
									<div class="input-group-prepend">
										<label class="input-group-text bg-secondary text-white" for="select-descricao">
											FORMA DE PAGAMENTO
										</label>
									</div>
									<select class="custom-select" name="sel-forma-pagamento">
										<option value="-">Selecione</option>
										<option value="DINHEIRO">DINHEIRO</option>
										<option value="PIX">PIX</option>
										<option value="CARTÃO DE CRÉDITO">CARTÃO DE CRÉDITO</option>
										<option value="BOLETO">BOLET</option>
										<option value="TRANSFERÊNCIA BANCÁRIA">TRANSFERÊNCIA BANCÁRIA</option>
									</select>
								</div>
							</div>

							<div class="col-lg-4 col-md-12 col-sm-12 col-xs-12">
								<div class="input-group mb-2">
									<div class="input-group-prepend">
										<div class="input-group-text bg-secondary text-white">
											DATA DE REF.
										</div>
									</div>
									<input type="date" class="form-control" name="ipt-data-referencia">
								</div>
							</div>

							<input type="submit" value="Gravar" name="btnCadastrar" id="botoesGravarCad">

					</form>
				</div>

				<!-- MODAL EDITAR RECEITA --->
				<div class="modal fade" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel" aria-hidden="true" id="md-editar">
					<div class="modal-dialog modal-lg">
						<div class="modal-content">

							<div class="modal-body">
								<div class="row justify-content-center">

									<h3 class="text-primary col-12 text-center mt-5">Alterando a receita <label class="border p-3 text-danger font-weight-bold"><?= $UltimaReceitaCadastrada != NULL ? $UltimaReceitaCadastrada['id_receita'] : 'Nenhuma receita cadastrada.' ?></label></h3>

									<form method="post">

										<div class="col-12">
											<label class="text-danger font-weight-bold readonly">Código</label>
											<br>
											<input class="form-control" type="text" value="<?= $UltimaReceitaCadastrada != NULL ? $UltimaReceitaCadastrada['id_receita'] : 'Nenhuma receita cadastrada.' ?>" disabled>
											<input class="form-control" type="hidden" name="ipt-id-receita-edicao" value="<?= $UltimaReceitaCadastrada != NULL ? $UltimaReceitaCadastrada['id_receita'] : 'Nenhuma receita cadastrada.' ?>">
										</div>

										<div class="col-12">
											<label class="text-danger font-weight-bold readonly">Tipo</label>
											<br>
											<select name="sel-tipo-edicao" class="form-control">
												<option value="<?= $UltimaReceitaCadastrada != NULL ? $UltimaReceitaCadastrada['tipo'] : '-' ?>"><?= $UltimaReceitaCadastrada != NULL ? $UltimaReceitaCadastrada['tipo'] : '-' ?></option>
												<option value="SERVIÇO">SERVIÇO</option>
												<option value="VENDA LOJA">VENDA LOJA</option>
												<option value="VENDA INTERNET">VENDA INTERNET</option>
												<option value="APORTE">APORTE</option>
											</select>
										</div>

										<div class="col-12">
											<label class="text-danger font-weight-bold" for="inlineFormInputDetalhamento">Detalhamento da receita</label>
											<textarea type="text" class="form-control mb-2" id="inlineFormInputDetalhamento" cols="140" rows="6" name="ta-detalhamento"><?= $UltimaReceitaCadastrada != NULL ? $UltimaReceitaCadastrada['detalhamento'] : '-' ?></textarea>
										</div>

										<div class="col-12">
											<label class="text-danger font-weight-bold">Valor (R$)</label>
											<br>
											<input class="form-control" type="text" name="ipt-valor" value="<?= $UltimaReceitaCadastrada != NULL ? number_format($UltimaReceitaCadastrada['valor'], 2, ',', '') : '-' ?>">
										</div>

										<div class="col-12">
											<label class="text-danger font-weight-bold readonly">Forma de Pagamento</label>
											<br>
											<input class="form-control" type="text" name="ipt-forma_pagamento" value="<?= $UltimaReceitaCadastrada != NULL ? $UltimaReceitaCadastrada['forma_pagamento'] : '-' ?>">
										</div>

										<div class="col-12">
											<label class="text-danger font-weight-bold readonly">Data de Referência</label>
											<br>
											<input class="form-control" type="date" name="ipt-data-referencia" value="<?= $UltimaReceitaCadastrada != NULL ? date_format(date_create($UltimaReceitaCadastrada['data_referencia']), "Y-m-d") : '-' ?>">
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

				<?php require_once 'includes/rodape.php'; ?>

			</div>
		</div>

		<?php require_once 'includes/bootstrap-js.php'; ?>
</body>

</html>