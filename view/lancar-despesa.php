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
	<title>Lançar Despesa</title>
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
					<mark class="p-2 font-weight-bold">Lançar Despesa</mark>
				</li>
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
							<h4>Lançar Despesa</h4>
						</div>

						<div class="col text-right mb-0">
								<button type="button" class="text-light btn btn-secondary" data-toggle="modal" data-target="#md-ultima-despesa">Ver última despesa lançada</button>
						</div>

					</div>

					<?php
						if ($mensagem_erro == "Despesa lançada com sucesso!") {
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

					<!-- Modal -->
					<div class="modal fade offset-0 col-12 offset-0" id="md-ultima-despesa" tabindex="-1" role="dialog" aria-labelledby="exampleModalLongTitle" aria-hidden="true">
						<div class="modal-dialog" role="document">
							<div class="modal-content">
								<div class="modal-header">
									<h5 class="modal-title" id="exampleModalLongTitle">Despesa: <?= $UltimaDespesaCadastrada != null ? $UltimaDespesaCadastrada['id_despesa'] : '- Nenhuma despesa cadastrada.';  ?></h5>
									<button type="button" class="close" data-dismiss="modal" aria-label="Close">
										<span aria-hidden="true">&times;</span>
									</button>
								</div>
								<div class="modal-body">

									<div class="card">
										<div class="card-body col">

											<br><span class="font-weight-bold text-dark" style="font-size: 20px">Tipo: </span><span style="font-size: 22px"><?= $UltimaDespesaCadastrada != null ?  $UltimaDespesaCadastrada['tipo'] : '-'; ?></span><br>

											<br><span class="font-weight-bold text-dark" style="font-size: 20px">Grupo: </span><span style="font-size: 22px"><?= $UltimaDespesaCadastrada != null ?  $UltimaDespesaCadastrada['grupo'] : '-'; ?></span><br>

											<br><span class="font-weight-bold text-dark" style="font-size: 20px">Detalhamento: </span><span style="font-size: 22px"><?= $UltimaDespesaCadastrada != null ?  $UltimaDespesaCadastrada['detalhamento'] : '-'; ?></span><br>

											<br><span class="font-weight-bold text-dark" style="font-size: 20px">Valor(R$): </span><span style="font-size: 22px"><?= $UltimaDespesaCadastrada != null ?  number_format($UltimaDespesaCadastrada['valor'], 2, ',' , '.') : '-'; ?></span><br>

											<br><span class="font-weight-bold text-dark" style="font-size: 20px">Forma de pagamento: </span><span style="font-size: 22px"><?= $UltimaDespesaCadastrada != null ?  $UltimaDespesaCadastrada['forma_pagamento'] : '-'; ?></span><br>

											<br><span class="font-weight-bold text-dark" style="font-size: 20px">Data de Ref.: </span><span style="font-size: 22px"><?= $UltimaDespesaCadastrada != null ? date_format(date_create($UltimaDespesaCadastrada['data_referencia']), "d/m/Y") : '-'; ?></span><br>

											<span class="font-weight-bold text-dark" style="font-size: 20px">Cadastrado em: </span><span style="font-size: 22px"><?= $UltimaDespesaCadastrada != null ? date_format(date_create($UltimaDespesaCadastrada['data_processamento']), "d/m/Y") : '-'; ?></span><br><br>

											<div class="row">
												<a href="/?pagina=editar-despesa&cod_os=<?=$UltimaDespesaCadastrada['id_despesa'] ?>&form=lancar-despesa" class="card-link btn btn-danger  col-sm col-xs col">Editar</a>

												<a href="/?pagina=pesquisa-despesa" class="card-link btn btn-info  col-sm col-xs col">Pesquisar Despesas</a>
											</div>

										</div>
									</div>

								</div>

								<!--  <div class="modal-footer col-5">
					        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
					        <button type="button" class="btn btn-primary">Save changes</button>
					      </div> -->


							</div>
						</div>
					</div>

					<div class="form-row align-items-center">

						<div class="col-lg-2 col-md-12 col-sm-12 col-xs-12">
							<label class="sr-only" for="inlineFormInputOs">Nº O.S</label>

							<input type="hidden" class="form-control mb-2" id="inlineFormInputOs" placeholder="Nº O.S" value="<?= $codigo ?>" name="ipt-cod" required>

							<?php //var_dump($codigo); 
							?>

							<input type="text" class="form-control mb-2" id="inlineFormInputOs" placeholder="Nº O.S" value="<?= $codigo ?>" disabled>

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
									<option value="FIXA">FIXA</option>
									<option value="VARIÁVEL">VARIÁVEL</option>
								</select>
							</div>
						</div>

						<div class="col-lg-6 col-md-12 col-sm-12 col-xs-12">
							<div class="input-group mb-2">
								<div class="input-group-prepend">
									<label class="input-group-text bg-secondary text-white" for="select-grupo">
										GRUPO
									</label>
								</div>
								<select class="custom-select" name="sel-grupo-lancar">
									<option value="-">Selecione</option>
									<option value="CONTA DE ENERGIA ELÉTRICA">CONTA DE ENERGIA ELÉTRICA</option>
									<option value="CONTA DE ÁGUA">CONTA DE ÁGUA</option>
									<option value="SUPRIMENTOS">SUPRIMENTOS</option>
									<option value="MANUTENÇÃO">MANUTENÇÃO</option>
									<option value="COMBUSTÍVEL">COMBUSTÍVEL</option>
								</select>
							</div>
						</div>

						<div class="form-row align-items-center">

							<div class="col-12">
								<label class="sr-only" for="inlineFormInputDetalhamento">Detalhamento da despesa</label>
								<textarea type="text" class="form-control mb-2" id="inlineFormInputDetalhamento" cols="140" rows="6" placeholder="Digite aqui o detalhamento da despesa..." name="ta-detalhamento"></textarea>
							</div>

						</div>

						<div class="col-lg-3 col-md-12 col-sm-12 col-xs-12">
							<label class="sr-only" for="inlineFormInputEndereco">VALOR(R$)</label>
							<input type="text" class="form-control mb-2" id="inlineFormInputEndereco" placeholder="Valor em R$ " name="ipt-valor" required>
						</div>

						<!-- FALTA IMPLEMENTAR ESSE ITEM ABAIXO -->
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

			<?php require_once 'includes/rodape.php'; ?>

		</div>
	</div>

	<?php require_once 'includes/bootstrap-js.php'; ?>
</body>

</html>