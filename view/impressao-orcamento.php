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
	<title>Impressão de Orçamento</title>
	<!--<link rel="stylesheet" type="text/css" href="../bibliotecas/bootstrap/css/bootstrap.min.css">-->
	<!--<link rel="stylesheet" type="text/css" href="../css/bootstrap2.min.css">-->
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
	<link rel="stylesheet" type="text/css" href="../bibliotecas/font-awesome/css/font-awesome.min.css">
	<link rel="stylesheet" type="text/css" href="../css/sb-admin.min.css">
	<link rel="stylesheet" type="text/css" href="../css/abg.css">
</head>
<body class="bg-dark" id="page-top">

	<div class="content-wrapper">

		<!-- Abertura da DIV de impressão-->
		<div id="imprimir">

		<div class="container containerGeralImpressao">
			<div class="row">
				<div class="col divLogo">
					<img src="../assets/logo.jpg">
				</div>
				<div class="col-5 divProposta p-4 text-center">
					<h2>PROPOSTA DE SERVIÇO / ORÇAMENTO</h2>
				</div>
			</div>

			<div class="row">
				<div class="card-body">
					<div class="row">

						<div class="col-lg-2 col-md-12 col-sm-12 col-xs-12">
							<div class="input-group mb-2">
								<div class="input-group-prepend">
									<div class="input-group-text bg-secondary text-white">
										N° Orç.
									</div>
								</div>
								<input type="text" disabled class="form-control" value="<?=$resultado[0]['id_orcamento']?>">
							</div>
						</div>

						<!--<div class="col-2">
							<span class="text-danger h5">N° Orç.: <?=$resultado[0]['id_orcamento']?></span>
						</div>-->

						<div class="col-lg-4 col-md-12 col-sm-12 col-xs-12">
							<div class="input-group mb-2">
								<div class="input-group-prepend">
									<div class="input-group-text bg-secondary text-white">
										Cliente
									</div>
								</div>
								<input type="text" disabled class="form-control" value="<?=$resultado[0]['nome_cliente']?>">
							</div>
						</div>

						<!---<div class="col-5">
							<span class="text-danger h5">Cliente: <?=$resultado[0]['nome_cliente']?></span>
						</div>-->

						<div class="col-lg-3 col-md-12 col-sm-12 col-xs-12">
							<div class="input-group mb-2">
								<div class="input-group-prepend">
									<div class="input-group-text bg-secondary text-white">
										Data orç.
									</div>
								</div>
								<input type="text" disabled class="form-control" value="<?=date_format(date_create($resultado[0]['data_cadastro']), "d/m/Y")?>">
							</div>
						</div>

						<div class="col-lg-3 col-md-12 col-sm-12 col-xs-12">
							<div class="input-group mb-2">
								<div class="input-group-prepend">
									<div class="input-group-text bg-secondary text-white">
										Validade
									</div>
								</div>
								<input type="text" disabled class="form-control" value="<?=date_format(date_create($resultado[0]['data_validade']), "d/m/Y")?>">
							</div>
						</div>
						
					</div>
					
					<table class="table table-bordered table-hover" id="dataTable" width="100%" cellspacing="0">
						<thead class="thead-light">
							<tr>
								<th>Descrição</th>
								<th>Valor unit.(R$)</th>
								<th>Quant.</th>
								<th>Valor Total(R$)</th>
								<th>Desconto(R$)</th>
								<th>Total a Pagar(R$)</th>
							</tr>
						</thead>
						<!--<tfoot class="thead-light">
							<tr>
								<th>Descrição</th>
								<th>Valor unit.(R$)</th>
								<th>Quant.</th>
								<th>Valor Total(R$)</th>
								<th>Desconto(R$)</th>
								<th>Total a Pagar(R$)</th>
							</tr>
						</tfoot>-->
						<tbody>

							<?php 

							$contador = 0;
				
							if($resultado != NULL){
					
								foreach ($resultado as  $item) {	
							?>

							<tr>
								<td><?=$item['descricao']?></td>
								<td><?=$item['valor_unitario']?></td>
								<td><?=$item['quantidade']?></td>
								<td><?=$item['valor_total']?></td>
								<td><?=$item['desconto']?></td>
								<td><?=$item['total_pagar']?></td>
							</tr>
							
							<?php
								$contador++; 
								$conexao = null;


							} }else {
								echo "<span class='text-danger'>NENHUM DADO RETORNADO.</span><br><br>";
							} 


							?>
						</tbody>
					</table>

					<div class="row">

						<div class="col-lg-4 col-md-12 col-sm-12 col-xs-12">
							<div class="input-group mb-2">
								<div class="input-group-prepend">
									<div class="input-group-text bg-secondary text-white">
										Valor total do orçamento (R$)
									</div>
								</div>
								<input type="text" disabled class="form-control" value="<?=$totalizador[0]['sum_valor_total']?>">
							</div>
						</div>

						<!--<div class="col-4">
							<span class="text-danger h5">Valor Total do Orçamento (R$): <?=$totalizador[0]['sum_valor_total']?></span>
						</div>-->

						<div class="col-lg-4 col-md-12 col-sm-12 col-xs-12">
							<div class="input-group mb-2">
								<div class="input-group-prepend">
									<div class="input-group-text bg-secondary text-white">
										Total de Descontos (R$)
									</div>
								</div>
								<input type="text" disabled class="form-control" value="<?=$totalizador[0]['sum_desconto']?>">
							</div>
						</div>

						<!--<div class="col-3">
							<span class="text-danger h5">Total de Descontos (R$): <?=$totalizador[0]['sum_desconto']?></span>
						</div>-->

						<div class="col-lg-4 col-md-12 col-sm-12 col-xs-12">
							<div class="input-group mb-2">
								<div class="input-group-prepend">
									<div class="input-group-text bg-secondary text-white">
										Valor a Pagar (R$)
									</div>
								</div>
								<input type="text" disabled class="form-control" value="<?=$totalizador[0]['sum_total_pagar']?>">
							</div>
						</div>

						<!--<div class="col-3">
							<span class="text-danger h5">Valor a Pagar (R$): <?=$totalizador[0]['sum_total_pagar']?></span>
						</div>-->
							
						<div class="col mt-5">
							<span class="text-danger h5">Vendedor:</span> <span class="text-primary h5"><?=$resultado[0]['usuario']?></span>
						</div>

					</div>

				</div>
			</div>
			
		</div>

		<!-- fechamento da DIV de impressão-->
		</div>
		<div class="container containerBtnImpressao text-center">
			<button class="btn btn-default btn-lg btn-center" onclick="window.print()">Gerar Impressão</button>
		</div>

	</div>
			
	<?php  
		//include ('rodape.php');
	?>


	<script src="../bibliotecas/jquery/jquery.min.js"></script>
	<script src="../bibliotecas/bootstrap/js/bootstrap.bundle.min.js"></script>
	<script src="../bibliotecas/jquery-easing/jquery.easing.min.js"></script>
	<script type="text/javascript" src="../js/sb-admin.min.js"></script>
</body>
</html>