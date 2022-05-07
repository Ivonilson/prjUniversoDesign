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
	<title>Nova Cidade</title>
	<?php require_once 'includes/bootstrap-css.php'; ?>
</head>
<body class="bg-dark fixed-nav sticky-footer" id="page-top">
	<!-- NAVEGAÇÃO -->
	<?php require_once 'includes/navegacao.php';?>
	
	<div class="content-wrapper">
		<div class="container-fluid">
			<ol class="breadcrumb">
				<li class="breadcrumb-item">
					Início
				</li>
				<li class="breadcrumb-item">
					Registros
				</li>
				<li class="breadcrumb-item">
					<mark class="p-2 font-weight-bold">Cadastrar Cidade</mark>
				</li>

				<div class="col">
					<a href="/?pagina=cadastrar-cliente" class="btn btn-danger text-light float-right font-weight-bold rounded" data-bs-toggle="tooltip" data-bs-placement="bottom" title="Incluir novo Cliente"><i class="fa fa-plus"></i> Cliente</a>
				</div>
				
			</ol>

					<!--Feedback do Cadastro -->
					<?php

						if($mensagem_erro == "Nova cidade cadastrada com Sucesso!")
						{
					?>

					<div class="alert alert-success font-weight-bold alertaCadOsOk col-12 text-center" role="alert">
 						<img src="../assets/ok.png"><h5><strong><?=$mensagem_erro?></strong></h5>
					</div>

					<?php 
						} elseif($mensagem_erro == "ERRO. Verifique se a cidade que está tentando cadastrar já exista no sistema ou contate o Suporte.") {
					?>

					<div class="alert alert-warning font-weight-bold text-danger alertaCadOsNoOk col-12 text-center" role="alert">
 						<img src="../assets/error.png"><h5><strong><?=$mensagem_erro?></strong></h5>
					</div>

					<?php 
						} 
					?>
	
			<div id="background-tela-cadastro">
				
				<form class="container background-form-cadastro" method="post">

					<div id="jumbotron_telas_cadastro">
						<div class="container ">
							<h4>Cadastrar Cidade</h4>
						</div>
					</div>

					<div class="form-row align-items-center">

						<div class="col-lg-6 col-md-12 col-sm-12 col-xs-12">
							<label class="sr-only" for="inlineFormInputOs">Nome da cidade</label>
							<input type="text" class="form-control mb-2" id="inlineFormInputOs" placeholder="Nome da cidade" name="ipt-cidade" required>
						</div>

						<div class="col-lg-6 col-md-12 col-sm-12 col-xs-12">
							<label class="sr-only" for="inlineFormInputOs">UF</label>
							<input type="text" class="form-control mb-2" id="inlineFormInputOs" placeholder="UF" name="ipt-uf" required>
						</div>

						<input type="submit" name="" id="botoesGravarCad" value="Gravar Cidade/UF" name="btnCadastrar" onmouseover="hoverOverBtnGravarCad()" onmouseout="hoverOutBtnGravarCad()">

					</div>
				</form>
			</div>

			<?php require_once 'includes/rodape.php';?>
			
		</div>
	</div>

	<?php require_once 'includes/bootstrap-js.php'; ?>
</body>
</html>