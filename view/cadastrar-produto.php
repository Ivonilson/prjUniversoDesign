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
	<?php require_once 'includes/navegacao.php';?>

	<div class="content-wrapper">
		<div class="container-fluid">
			<ol class="breadcrumb">
				<li class="breadcrumb-item">
					<a href="?pagina=os-do-dia" class="text-decoration-none">Home</a>
				</li>
				<li class="breadcrumb-item">
					Registros
				</li>
				<li class="breadcrumb-item">
					Cadastrar Produto
				</li>
			</ol>
	
			<div class="row" id="background-tela-cadastro">
				
				<form class="container background-form-cadastro" method="post">

					<div id="jumbotron_telas_cadastro">
						<div class="container">
							<h4>Cadastrar Produto</h4>
						</div>
					</div>

					<div class="form-row align-items-center">

						<div class="col-lg-2 col-md-12 col-sm-12 col-xs-12">
							<label class="sr-only" for="inlineFormInputProduto">Código do Produto</label>
							<input type="number" class="form-control mb-2" id="inlineFormInputProduto" placeholder="Código do Produto" name="ipt-codigo-produto" required>

						</div>

						<div class="col-lg-10 col-md-12 col-sm-12 col-xs-12">
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
							if($mensagem_erro == "Orçamento Cadastrado com sucesso!")

							{
						?>

						<div class="alert alert-success font-weight-bold alertaCadOsOk col-12 text-center" role="alert">
 							<img src="../assets/ok.png"><h5><strong><?=$mensagem_erro?></strong></h5>
						</div>

						<?php 
							} elseif($mensagem_erro == "ERRO. Verifique se o código que está tentando cadastrar já exista no sistema ou contate o Suporte.") {
						?>

						<div class="alert alert-warning font-weight-bold text-danger alertaCadOsNoOk col-12 text-center" role="alert">
 							<img src="../assets/error.png"><h5><strong><?=$mensagem_erro?></strong></h5>
						</div>

						<?php

							} elseif($mensagem_erro == "Erro ao cadastrar. Verifique se o campo PRODUTO possui uma descrição válida. Caso o problema persista, contate o Suporte.") {
						?>

						<div class="alert alert-warning font-weight-bold text-danger alertaCadOsNoOk col-12 text-center" role="alert">
 							<img src="../assets/error.png"><h5><strong><?=$mensagem_erro?></strong></h5>
						</div>

						<?php 
							}
						?>

					</div>
				</form>
			</div>
		</div>

		<?php require_once 'includes/rodape.php';?>
	</div>

<?php require_once 'includes/bootstrap-js.php'; ?>
</body>
</html>