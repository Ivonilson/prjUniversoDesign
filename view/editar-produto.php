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
	<title>Atualizar Produto</title>
	<?php require_once 'includes/bootstrap-css.php'; ?>
</head>

<body class="bg-dark fixed-nav sticky-footer" id="page-top">
	<!-- NAVEGAÇÃO -->
	<?php require_once 'includes/navegacao.php'; ?>

	<div class="content-wrapper" id="background-tela-edicao">
		<div class="container-fluid">
			<ol class="breadcrumb">
				<li class="breadcrumb-item">
					<a href="?pagina=os-do-dia" class="text-decoration-none">Início</a>
				</li>
				<li class="breadcrumb-item">
					Registros
				</li>
				<li class="breadcrumb-item">
					<mark class="p-2 font-weight-bold">Atualizar Produto</mark>
				</li>
			</ol>

			<div id="row-form-edicao">

				<form class="container background-form-edicao" method="post">

					<div id="jumbotron_telas_edicao">
						<div class="container">
							<h4>Atualizar Produto</h4>
						</div>
					</div>

					<div class="form-row align-items-center">

						<div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
							<label class="sr-only" for="inlineFormInputProduto">Código do Produto</label>
							<input type="hidden" class="form-control mb-2" id="inlineFormInputProduto" placeholder="Código do Produto" name="ipt-id-produto" value="<?= $registro->id_prod ?>">
						</div>

						<div class="col-lg-2 col-md-12 col-sm-12 col-xs-12">
							<label class="sr-only" for="inlineFormInputProduto">Código do Produto</label>
							<input type="input" class="form-control mb-2" id="inlineFormInputProduto" placeholder="Código do Produto" value="<?= $registro->id_prod ?>" disabled>
						</div>

						<div class="col-lg-10 col-md-12 col-sm-12 col-xs-12">
							<label class="sr-only" for="inlineFormInputDescricao">Descrição</label>
							<input type="text" class="form-control mb-2" id="inlineFormInputDescricao" placeholder="Descrição do produto" name="ipt-descricao" value="<?= $registro->descricao ?>">
						</div>

						<div class="col-lg-4 col-md-12 col-sm-12 col-xs-12">
							<div class="input-group mb-2">
								<div class="input-group-prepend">
									<label class="input-group-text bg-secondary text-white" for="select-unidade-medida">
										UNIDADE DE MEDIDA
									</label>
								</div>
								<select class="custom-select" name="sel-unidade-medida" id="select-unidade-medida">
									<option value="<?= $registro->unidade_medida ?>"><?= $registro->unidade_medida ?></option>
									<option value="un.">Unidade</option>
									<option value="m">Metro</option>
									<option value="m²">Metro quadrado</option>
								</select>
							</div>
						</div>

						<div class="col-lg-4 col-md-12 col-sm-12 col-xs-12">
							<label class="sr-only" for="inlineFormInputValorUnitario">Valor Unitário (R$)</label>
							<input type="text" name="ipt-preco-unit" class="form-control mb-2 ipt-princ" id="inlineFormInputValorUnitario" placeholder="Valor unitário" value="<?= number_format($registro->preco_unitario, 2, ',', '.') ?>">
							<input type="hidden" id="valor_unit">
						</div>

						<div class="col-lg-4 col-md-12 col-sm-12 col-xs-12">
							<label class="sr-only" for="inlineFormInputQuantidadeEstoque">Quantidade em Estoque</label>
							<input type="text" class="form-control mb-2" id="inlineFormInputQuantidadeEstoque" placeholder="Quantidade em Estoque" name="ipt-quantidade-estoque" value="<?= number_format($registro->quantidade_estoque, 2, ',', '.') ?>" disabled>
						</div>

						<input type="submit" id="btnGravarEdicao" value="GRAVAR" name="btnEditarProduto">

						<?php
						if ($mensagem_erro == "Produto atualizado com Sucesso!") {
						?>

							<div class="alert alert-success font-weight-bold alertaCadOsOk col-12 text-center" role="alert">
								<img src="../assets/ok.png">
								<h5><strong><?= $mensagem_erro ?></strong></h5>
							</div>

							<script>
								setInterval(function() {
									window.location.href = "/?pagina=<?= $_GET['form'] ?>&palavra_chave=todos"
								}, 3000)
							</script>

						<?php

						} else if ($mensagem_erro == "ERRO. Verifique se você REALMENTE alterou alguma coisa ou Contate o Suporte.") {
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