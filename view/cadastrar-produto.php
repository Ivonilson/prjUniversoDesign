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
	<title>Cadastro de Produto</title>
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
					Registros
				</li>
				<li class="breadcrumb-item">
					<mark class="p-2 font-weight-bold">Cadastrar Produto</mark>
				</li>
			</ol>

			<div class="row justify-content-center mb-3">

				<div class="col">
					<a href="?pagina=cadastrar-orcamento" class="botoes-atalho-cad" data-bs-toggle="tooltip" data-bs-placement="bottom" title="Novo Orçamento"><i class="fa fa-plus " aria-hidden="true"></i> Orçamento </a>
				</div>

				<div class="col">
					<a href="?pagina=cadastrar-os" class="botoes-atalho-cad" data-bs-toggle="tooltip" data-bs-placement="bottom" title="Nova O.S."><i class="fa fa-plus " aria-hidden="true"></i> O.S </a>
				</div>

				<div class="col">
					<a href="?pagina=cadastrar-cliente" class="botoes-atalho-cad" data-bs-toggle="tooltip" data-bs-placement="bottom" title="Novo Cliente"><i class="fa fa-plus " aria-hidden="true"></i> Cliente </a>
				</div>

				<div class="col">
					<a href="?pagina=cadastrar-notificacao" class="botoes-atalho-cad" data-bs-toggle="tooltip" data-bs-placement="bottom" title="Cadastrar Notificação"><i class="fa fa-plus " aria-hidden="true"></i> Notificação </a>
				</div>

			</div>

			<div class="row" id="background-tela-cadastro">

				<form class="container background-form-cadastro" method="post">

					<div id="jumbotron_telas_cadastro">
						<div class="container">
							<h4>Cadastrar Produto</h4>

							<div class="col text-right mb-0">
								<button type="button" class="text-light btn btn-secondary" data-toggle="modal" data-target="#md-ultimo-produto">Ver último produto cadastrado</button>
							</div>

						</div>	
					</div>


					<!-- Modal -->
					<div class="modal fade offset-3 col-6 offset-3" id="md-ultimo-produto" tabindex="-1" role="dialog" aria-labelledby="exampleModalLongTitle" aria-hidden="true">
						<div class="modal-dialog" role="document">
							<div class="modal-content">
								<div class="modal-header">
									<h5 class="modal-title" id="exampleModalLongTitle">Código do Produto/Serviço: <?= $UltimoProdutoCadastrado != null ? $UltimoProdutoCadastrado['id_prod'] : '- Nenhum orçamento cadastrado.';  ?></h5>
									<button type="button" class="close" data-dismiss="modal" aria-label="Close">
										<span aria-hidden="true">&times;</span>
									</button>
								</div>
								<div class="modal-body">

									<div class="card">
										<div class="card-body col">

											<h5 class="card-title font-weight-bold text-dark">Descrição: <?= $UltimoProdutoCadastrado != null ? $UltimoProdutoCadastrado['descricao']  : '-'  ?></h5>	

											<h6 class="card-subtitle mb-2 text-muted font-weight-bold text-dark">Tipo: <?= $UltimoProdutoCadastrado != null ? $UltimoProdutoCadastrado['tipo'] : '-' ?></h6>

											<br><span class="font-weight-bold text-dark" style="font-size: 20px">Unidade de medida: </span><span style="font-size: 22px"><?= $UltimoProdutoCadastrado != null ? $UltimoProdutoCadastrado['unidade_medida'] : '-' ?></span><br>

											<br><span class="font-weight-bold text-dark" style="font-size: 20px">Preço unitário (R$): </span><span style="font-size: 22px"><?= $UltimoProdutoCadastrado != null ? number_format($UltimoProdutoCadastrado['preco_unitario'], 2, ',' , '.') : '-' ?></span><br>

											<br><span class="font-weight-bold text-dark" style="font-size: 20px">Cadastrado em: </span><span style="font-size: 22px"><?= $UltimoProdutoCadastrado != null ? date_format(date_create($UltimoProdutoCadastrado['data_cadastro']), "d/m/Y") : '-' ?></span><br>

											<br>

											<div class="row">
												<a href="/?pagina=editar-produto&id_prod=<?=$UltimoProdutoCadastrado['id_prod'] ?>&form=cadastrar-produto" class="card-link btn btn-danger  col-sm col-xs col">Editar</a>

												<a href="/?pagina=pesquisa-produto" class="card-link btn btn-info  col-sm col-xs col">Pesquisar Produtos</a>
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
							<label class="sr-only" for="inlineFormInputProduto">Cód. do Produto</label>
							<input type="number" class="form-control mb-2" id="inlineFormInputProduto" placeholder="Cód. do Produto" name="ipt-codigo-produto" required>
						</div>

						<div class="col-lg-3 col-md-12 col-sm-12 col-xs-12">
							<div class="input-group mb-2">
								<div class="input-group-prepend">
									<label class="input-group-text bg-secondary text-white" for="select-tipo">
										TIPO
									</label>
								</div>
								<select class="custom-select" name="sel-tipo" id="select-tipo">
									<option value="NORMAL">Normal</option>
									<option value="OPERACIONAL">Operacional</option>
								</select>
							</div>
						</div>

						<div class="col-lg-7 col-md-12 col-sm-12 col-xs-12">
							<label class="sr-only" for="inlineFormInputDescricao">Descrição</label>
							<input type="text" class="form-control mb-2" id="inlineFormInputDescricao" placeholder="Descrição do produto" name="ipt-descricao" required>
						</div>

						<div class="col-lg-4 col-md-12 col-sm-12 col-xs-12">
							<div class="input-group mb-2">
								<div class="input-group-prepend">
									<label class="input-group-text bg-secondary text-white" for="select-unidade-medida">
										UNIDADE DE MEDIDA
									</label>
								</div>
								<select class="custom-select" name="sel-unidade-medida" id="select-unidade-medida">
									<option value="un.">Unidade</option>
									<option value="m">Metro</option>
									<option value="m²">Metro quadrado</option>
									<option value="R$ por km">Reais por km</option>
									<option value="R$ por hora">Reais por hora</option>
								</select>
							</div>
						</div>

						<div class="col-lg-4 col-md-12 col-sm-12 col-xs-12">
							<label class="sr-only" for="inlineFormInputValorUnitario">Valor Unitário (R$)</label>
							<input type="text" class="form-control mb-2" id="inlineFormInputValorUnitario" placeholder="Valor unitário" name="ipt-preco-unitario" required>
						</div>

						<div class="col-lg-4 col-md-12 col-sm-12 col-xs-12">
							<label class="sr-only" for="inlineFormInputQuantidadeEstoque">Quantidade em Estoque</label>
							<input type="text" class="form-control mb-2" id="inlineFormInputQuantidadeEstoque" placeholder="Quantidade em Estoque" name="ipt-quantidade-estoque" disabled>
						</div>

						<input type="submit" value="Gravar Produto" name="btnCadastrarProduto" id="botoesGravarCad">

						<?php
						if ($mensagem_erro == "Produto Cadastrado com sucesso!") {
						?>

							<div class="alert alert-success font-weight-bold alertaCadOsOk col-12 text-center" role="alert">
								<img src="../assets/ok.png">
								<h5><strong><?= $mensagem_erro ?></strong></h5>
							</div>

						<?php
						} elseif ($mensagem_erro == "ERRO. Verifique se o código que está tentando cadastrar já exista no sistema ou contate o Suporte.") {
						?>

							<div class="alert alert-warning font-weight-bold text-danger alertaCadOsNoOk col-12 text-center" role="alert">
								<img src="../assets/error.png">
								<h5><strong><?= $mensagem_erro ?></strong></h5>
							</div>

						<?php

						} elseif ($mensagem_erro == "Erro ao cadastrar. Verifique se o campo PRODUTO possui uma descrição válida. Caso o problema persista, contate o Suporte.") {
						?>

							<div class="alert alert-warning font-weight-bold text-danger alertaCadOsNoOk col-12 text-center" role="alert">
								<img src="../assets/error.png">
								<h5><strong><?= $mensagem_erro ?></strong></h5>
							</div>

						<?php
						}
						?>

					</div>
				</form>
			</div>
		</div>

		<?php require_once 'includes/rodape.php'; ?>
	</div>

	<?php require_once 'includes/bootstrap-js.php'; ?>
</body>

</html>