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
	<title>Incluir Item Orçamento</title>
	<?php require_once 'includes/bootstrap-css.php'; ?>

</head>
<body class="bg-dark fixed-nav sticky-footer" id="page-top">
	<!-- NAVEGAÇÃO -->
	<?php require_once 'includes/navegacao.php';?>
	
	<div class="content-wrapper">
		<div class="container-fluid">
			<ol class="breadcrumb">
				<li class="breadcrumb-item">
					<a href="?pagina=os-do-dia" class="text-decoration-none">Início</a>
				</li>
				<li class="breadcrumb-item">
					Consultas
				</li>
				<li class="breadcrumb-item">
					Orçamentos
				</li>
				<li class="breadcrumb-item">
					<mark class="p-2 font-weight-bold">Incluir Item em Orçamento</mark>
				</li>
			</ol>

			<br>
	
			<div class="row" id="background-tela-cadastro">
				
				<div class="container background-form-cadastro">

					<div id="jumbotron_telas_cadastro" class="border">
						<div class="container">

							<div class="col">
								<h4>Incluir Item no Orçamento N° <?=filter_input(INPUT_GET,	'id_orcamento')?></h4>
							</div>
						</div>
					</div>					

				<form method="post" id="cadItens">

						<?php
							if($mensagem_erro == "Item Cadastrado com sucesso!")

							{
						?>

						<div class="alert alert-success font-weight-bold alertaCadOsOk col-12 text-center" role="alert">
 							<img src="../assets/ok.png"><h5><strong><?=$mensagem_erro?></strong></h5>
						</div>

						<script>
							setInterval(function(){window.location.href = "/?pagina=itens-orcamento&id_orcamento=<?= $_GET['id_orcamento']?>"}, 3000);
						</script>

						<?php 
							} elseif($mensagem_erro == "ERRO. Contate o Suporte.") {
						?>

						<div class="alert alert-warning font-weight-bold text-danger alertaCadOsNoOk col-12 text-center" role="alert">
 							<img src="../assets/error.png"><h5><strong><?=$mensagem_erro?></strong></h5>
						</div>

						<?php

							} elseif($mensagem_erro == "Erro ao cadastrar. Verifique se o CLIENTE foi selecionado tente novamente. Caso o problema persista, contate o Suporte.") {
						?>

						<div class="alert alert-warning font-weight-bold text-danger alertaCadOsNoOk col-12 text-center" role="alert">
 							<img src="../assets/error.png"><h5><strong><?=$mensagem_erro?></strong></h5>
						</div>

						<?php 
							}
						?>

					<div class="form-row align-items-center">

						<div class="col-lg-2 col-md-12 col-sm-12 col-xs-12">
							<label class="text-dark" for="inlineFormInputOrcamentoHidden">N° ORÇAMENTO</label>

							<input type="hidden" class="form-control" id="inlineFormInputOrcamentoHidden" value="<?=$codigoOrcamento?>" name="ipt-cod-orcamento" required>

							<?php //var_dump($codigoOrcamento);?>

							<input type="text" class="form-control  mb-2" id="inlineFormInputOrcamento" value="<?=filter_input(INPUT_GET,	'id_orcamento')?>" disabled>

							<input type="hidden" value="<?=filter_input(INPUT_GET,	'id_orcamento')?>" name="ipt-id-orcamento">

						</div>

						<div class="col-lg-6 col-md-12 col-sm-12 col-xs-12" id="divIptItens">
							<label class="text-dark" for="select-prod">
								PRODUTO/SERVIÇO
							</label>
							<select class="form-control mb-2" id="select-prod" name="sel-produto">
								<option value="Não Selecionado / 0">Selecione</option>
								<?php
									foreach ($produto as $carregaProduto) {
										
								 ?>
								<option value="<?=$carregaProduto->descricao.' ('.$carregaProduto->unidade_medida.') '.'/ '.$carregaProduto->preco_unitario?>" id="preco"><?=$carregaProduto->descricao.' ('.$carregaProduto->unidade_medida.') - Valor Unit.(R$) '.$carregaProduto->preco_unitario?></option>
								<?php 
									}
								?>
								<!--<option value="NÃO CADASTRADO">NÃO CADASTRADO</option>-->
							</select>
						</div>

						<div class="col-lg-1 col-md-12 col-sm-12 col-xs-12">
							<label class="text-dark" for="inlineFormInputLargura" id="lblLargura">LARGURA</label>
							<input type="text" class="form-control mb-2" id="inlineFormInputLargura" placeholder="digite" name="ipt-largura" required>
						</div>

						<div class="col-lg-1 col-md-12 col-sm-12 col-xs-12">
							<label class="text-dark" for="inlineFormInputAltura" id="lblAltura">ALTURA</label>
							<input type="text" class="form-control mb-2" id="inlineFormInputAltura" placeholder="digite" name="ipt-altura" required>
						</div>

						<div class="col-lg-1 col-md-12 col-sm-12 col-xs-12">
							<label class="text-dark" for="inlineFormInputQuant">QUANT.</label>
							<input type="number" class="form-control mb-2 iptQuant" id="inlineFormInputQuant" name="ipt-quantidade-itens" value="1" min="1">
						</div>

						<div class="col-lg-1 col-md-12 col-sm-12 col-xs-12">
							<label class="text-dark" for="percentualDesconto">DESC.(%)</label>
							<input type="text" class="form-control mb-2 iptDesconto" id="percentualDesconto" placeholder="digite" name="ipt-percentual-desconto" value="0">
						</div>
						
						<div class="col-12">
							<input type="submit" name="" value="Gravar Item" name="btnCadastrarOrcamento" id="botoesGravarCad">
						</div>
						
					</div>
				</form>
				</div>
			</div>

			<?php require_once 'includes/rodape.php';?>
			
		</div>
	</div>

	
<?php require_once 'includes/bootstrap-js.php'; ?>
</body>
</html>