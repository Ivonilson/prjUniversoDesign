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
	<title>Atualizar Orçamento</title>
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
					Atualizar Orçamento
				</li>
			</ol>
	
			<div class="row bg-secondary">
				
				<form class="container" method="post">

					<div class="jumbotron jumbotron-fluid bg-dark text-white">
						<div class="container">
							<h4>Atualizar Orçamento</h4>
						</div>
					</div>

					<div class="form-row align-items-center">

						<div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
							<label class="sr-only" for="inlineFormInputOrcamento">Código do Orçamento</label>
							<input type="hidden" class="form-control mb-2" id="inlineFormInputOrcamento" name="ipt-codigo-orcamento" value="<?=$registro->id_orcamento?>">
						</div>

						<!-- Foi criado o input hidden para não alterar os dados originais, pois não será 
						permitida alteração nesse inpt. O disabled foi criado para permitir a leitura dos dados-->
						<div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
							<label class="sr-only" for="inlineFormInputOrcamento">Valor Total</label>
							<input type="hidden" class="form-control mb-2" id="inlineFormInputOrcamento" name="ipt-valor-total" value="<?=$registro->valor_total?>">
						</div>

						<!-- Foi criado o input hidden para não alterar os dados originais, pois não será 
						permitida alteração nesse inpt. O disabled foi criado para permitir a leitura dos dados-->
						<div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
							<label class="sr-only" for="inlineFormInputOrcamento">Produtos</label>
							<input type="hidden" class="form-control mb-2" id="inlineFormInputOrcamento" name="ta-produtos" value="<?=$registro->produtos?>">
						</div>

						<!-- Foi criado o input hidden para não alterar os dados originais, pois não será 
						permitida alteração nesse inpt. O disabled foi criado para permitir a leitura dos dados-->
						<div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
							<label class="sr-only" for="inlineFormInputOrcamento">Desconto</label>
							<input type="hidden" class="form-control mb-2" id="inlineFormInputOrcamento" name="ipt-desconto" value="<?=$registro->desconto?>">
						</div>

						<!-- Foi criado o input hidden para não alterar os dados originais, pois não será 
						permitida alteração nesse inpt. O disabled foi criado para permitir a leitura dos dados-->
						<div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
							<label class="sr-only" for="inlineFormInputOrcamento">Valor Final</label>
							<input type="hidden" class="form-control mb-2" id="inlineFormInputOrcamento" name="ipt-valor-final" value="<?=$registro->valor_final?>">
						</div>

						<div class="col-lg-3 col-md-12 col-sm-12 col-xs-12">
							<div class="input-group mb-2">
								<div class="input-group-prepend">
									<div class="input-group-text bg-secondary text-white">
										Código
									</div>
								</div>
								<input type="text" class="form-control"  value="<?=$registro->id_orcamento?>" disabled>
							</div>	
						</div>

						<div class="col-lg-9 col-md-12 col-sm-12 col-xs-12">
							<div class="input-group mb-2">
								<div class="input-group-prepend">
									<label class="input-group-text bg-secondary text-white" for="select-nome-cliente">
										Cliente
									</label>
								</div>
									<select class="custom-select" name="sel-nome-cliente" id="select-nome-cliente">
									<option value="<?=$registro->id_cliente?>"><?=$registro->nome?></option>
									<?php
										foreach ($nomesClientes as $value) {
									?>

									<option value="<?=$value->id_cliente?>"><?=$value->nome?></option>

									<?php
										}
									 ?>
								</select>
							</div>
						</div>

						<div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
							<div class="input-group mb-2">
								<div class="input-group-prepend">
									<div class="input-group-text bg-secondary text-white">
										Produtos
									</div>
								</div>	
								<textarea type="text" class="form-control" id="inlineFormInputProdutos" cols="100" rows="3" placeholder="Observações" disabled><?=$registro->produtos?></textarea>
							</div>
						</div>

						<div class="col-lg-4 col-md-12 col-sm-12 col-xs-12">
							<div class="input-group mb-2">
								<div class="input-group-prepend">
									<div class="input-group-text bg-secondary text-white">
										Valor Total (R$)
									</div>
								</div>
								<input type="text" class="form-control"  name="ipt-valor-total" value="<?=$registro->valor_total?>" disabled>
							</div>	
						</div>

						<div class="col-lg-4 col-md-12 col-sm-12 col-xs-12">
							<div class="input-group mb-2">
								<div class="input-group-prepend">
									<div class="input-group-text bg-secondary text-white">
										Desconto (%)
									</div>
								</div>
								<input type="text" class="form-control"  name="ipt-desconto" value="<?=$registro->desconto?>" disabled>
							</div>	
						</div>

						<div class="col-lg-4 col-md-12 col-sm-12 col-xs-12">
							<div class="input-group mb-2">
								<div class="input-group-prepend">
									<div class="input-group-text bg-secondary text-white">
										Valor Final (R$)
									</div>
								</div>
								<input type="text" class="form-control"  name="ipt-valor-final" value="<?=$registro->valor_final?>" disabled>
							</div>	
						</div>

						<div class="col-lg-8 col-md-12 col-sm-12 col-xs-12">
							<div class="input-group mb-2">
								<div class="input-group-prepend">
									<label class="input-group-text bg-secondary text-white" for="select-meio-pag">
										Meio de pagamento
									</label>
								</div>
								<select class="custom-select" id="select-meio-pag" name="sel-meio-pag">
									<option value="<?=$registro->meio_pagamento?>"><?=$registro->meio_pagamento?></option>
									<option value="DINHEIRO">DINHEIRO</option>
									<option value="CARTÃO DÉBITO">CARTÃO DÉBITO</option>
									<option value="CARTÃO CRÉDITO">CARTÃO CRÉDITO</option>
									<option value="TRANSFERÊNCIA ON-LINE">TRANSFERÊNCIA ON-LINE</option>
									<option value="PIX">PIX</option>
									<option value="DEPÓSITO">DEPÓSITO</option>
								</select>
							</div>
						</div>

						<div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
							<div class="input-group mb-2">
								<div class="input-group-prepend">
									<div class="input-group-text bg-secondary text-white">
										DIGITE O NOME DA PESSOA QUE SOLICITOU O ORÇAMENTO:
									</div>
								</div>
								<input type="text" class="form-control" name="ipt-solicitante" value="<?=$registro->solicitante?>">
							</div>
						</div>

						<div class="col-lg-4 col-md-12 col-sm-12 col-xs-12">
							<div class="input-group mb-2">
								<div class="input-group-prepend">
									<div class="input-group-text bg-secondary text-white">
										Data de Validade
									</div>
								</div>
								<input type="text" class="form-control" name="ipt-data-validade" value="<?=date_format(date_create($registro->data_validade), "d-m-Y")?>">
							</div>
						</div>

						<div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
							<div class="input-group mb-2">
								<div class="input-group-prepend">
									<div class="input-group-text bg-secondary text-white">
										Observações
									</div>
								</div>	
								<textarea type="text" class="form-control" id="inlineFormInputProdutos" cols="100" rows="3" placeholder="Observações" name="ta-observacao"><?=$registro->observacao?></textarea>
							</div>
						</div>

						<input type="submit" class="col-12 btn btn-dark btn-block text-white" value="GRAVAR" name="btnEditarOrcamento">
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