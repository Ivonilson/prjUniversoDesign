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
	<!--<link rel="stylesheet" type="text/css" href="../bibliotecas/bootstrap/css/bootstrap.min.css">-->
	<link rel="stylesheet" type="text/css" href="../css/bootstrap2.min.css">
	<link rel="stylesheet" type="text/css" href="../bibliotecas/font-awesome/css/font-awesome.min.css">
	<link rel="stylesheet" type="text/css" href="../css/sb-admin.min.css">
</head>
<body class="bg-dark fixed-nav sticky-footer" id="page-top">
	<!-- NAVEGAÇÃO -->
	<?php
		include('includes/navegacao.php');
	?>
	
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
					Atualizar Produto
				</li>
			</ol>
	
			<div class="row bg-secondary">
				
				<form class="container" method="post">

					<div class="jumbotron jumbotron-fluid bg-dark text-white">
						<div class="container">
							<h4>Atualizar Produto</h4>
						</div>
					</div>

					<div class="form-row align-items-center">

						<div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
							<label class="sr-only" for="inlineFormInputProduto">Código do Produto</label>
							<input type="hidden" class="form-control mb-2" id="inlineFormInputProduto" placeholder="Código do Produto" name="ipt-id-produto" value="<?=$registro->id_prod?>">
						</div>

						<div class="col-lg-2 col-md-12 col-sm-12 col-xs-12">
							<label class="sr-only" for="inlineFormInputProduto">Código do Produto</label>
							<input type="input" class="form-control mb-2" id="inlineFormInputProduto" placeholder="Código do Produto" value="<?=$registro->id_prod?>" disabled>
						</div>

						<div class="col-lg-10 col-md-12 col-sm-12 col-xs-12">
							<label class="sr-only" for="inlineFormInputDescricao">Descrição</label>
							<input type="text" class="form-control mb-2" id="inlineFormInputDescricao" placeholder="Descrição do produto" name="ipt-descricao" value="<?=$registro->descricao?>">
						</div>

						<div class="col-lg-4 col-md-12 col-sm-12 col-xs-12">
							<div class="input-group mb-2">
								<div class="input-group-prepend">
									<label class="input-group-text bg-secondary text-white" for="select-unidade-medida">
										UNIDADE DE MEDIDA
									</label>
								</div>
									<select class="custom-select" name="sel-unidade-medida" id="select-unidade-medida">
									<option value="<?=$registro->unidade_medida?>"><?=$registro->unidade_medida?></option>
									<option value="un.">Unidade</option>
									<option value="m">Metro</option>
									<option value="m²">Metro quadrado</option>
								</select>
							</div>
						</div>

						<div class="col-lg-4 col-md-12 col-sm-12 col-xs-12">
							<label class="sr-only" for="inlineFormInputValorUnitario">Valor Unitário (R$)</label>
							<input type="text" class="form-control mb-2" id="inlineFormInputValorUnitario" placeholder="Valor unitário" name="ipt-preco-unitario" value="<?=$registro->preco_unitario?>">
						</div>

						<div class="col-lg-4 col-md-12 col-sm-12 col-xs-12">
							<label class="sr-only" for="inlineFormInputQuantidadeEstoque">Quantidade em Estoque</label>
							<input type="text" class="form-control mb-2" id="inlineFormInputQuantidadeEstoque" placeholder="Quantidade em Estoque" name="ipt-quantidade-estoque" disabled>
						</div>

						<input type="submit" class="col-12 btn btn-dark btn-block text-white" value="GRAVAR" name="btnEditarProduto">
					</div>
				</form>
			</div>
		</div>

			<?php  
				include ('includes/rodape.php');
			?>
	</div>

	<script src="../bibliotecas/jquery/jquery.min.js"></script>
	<script src="../bibliotecas/bootstrap/js/bootstrap.bundle.min.js"></script>
	<script src="../bibliotecas/jquery-easing/jquery.easing.min.js"></script>
	<script type="text/javascript" src="../js/sb-admin.min.js"></script>
</body>
</html>