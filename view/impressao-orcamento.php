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
	<?php require_once 'includes/bootstrap-css.php'; ?>
</head>

<body class="bg-dark" id="page-top">

	<div class="content-wrapper">

		<!-- Abertura da DIV de impressão-->
		<div id="imprimir">

		<div class="container containerGeralImpressao">
			<div class="row">
				<div class="col divLogo">
					<img src="../assets/logo.jpg" style="width: 100%; height: 100%;">
				</div>
				<div class="col-6 divProposta p-3 text-center">
					<h3>PROPOSTA</h3>
					<h3>ORÇAMENTO / SERVIÇO</h3>
				</div>
			</div>

			<div class="row">
				<div class="card-body">
					<div class="row">

						<div class="col-lg-2 col-md-12 col-sm-12 col-xs-12">
							<div class="input-group mb-2">
								<div class="input-group-prepend">
									<div class="input-group-text font-weight-bold">
										Orç. n° 
									</div>
								</div>
								<input type="text" disabled class="form-control bg-light" value="<?=$resultado[0]['id_orcamento']?>">
							</div>
						</div>

						<!--<div class="col-2">
							<span class="text-danger h5">N° Orç.: <?=$resultado[0]['id_orcamento']?></span>
						</div>-->

						<div class="col-lg-4 col-md-12 col-sm-12 col-xs-12">
							<div class="input-group mb-2">
								<div class="input-group-prepend">
									<div class="input-group-text font-weight-bold">
										Cliente
									</div>
								</div>
								<input type="text" disabled class="form-control bg-light" value="<?=$resultado[0]['nome_cliente']?>">
							</div>
						</div>

						<!---<div class="col-5">
							<span class="text-danger h5">Cliente: <?=$resultado[0]['nome_cliente']?></span>
						</div>-->

						<div class="col-lg-3 col-md-12 col-sm-12 col-xs-12">
							<div class="input-group mb-2">
								<div class="input-group-prepend">
									<div class="input-group-text font-weight-bold">
										Registrado em
									</div>
								</div>
								<input type="text" disabled class="form-control bg-light" value="<?=date_format(date_create($resultado[0]['data_cadastro']), "d/m/Y")?>">
							</div>
						</div>

						<div class="col-lg-3 col-md-12 col-sm-12 col-xs-12">
							<div class="input-group mb-2">
								<div class="input-group-prepend">
									<div class="input-group-text font-weight-bold">
										Validade
									</div>
								</div>
								<input type="text" disabled class="form-control bg-light" value="<?=date_format(date_create($resultado[0]['data_validade']), "d/m/Y")?>">
							</div>
						</div>
						
					</div>
					
					<table class="table table-bordered table-hover table-sm" width="100%" cellspacing="0">
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
								<td><?=number_format($item['valor_unitario'], 2 , "," , ".")?></td>
								<td><?=number_format($item['quantidade'], 2 , "," , ".")?></td>
								<td><?=number_format($item['valor_total'], 2 , "," , ".")?></td>
								<td><?=number_format($item['desconto'], 2 , "," , ".")?></td>
								<td><?=number_format($item['total_pagar'], 2 , "," , ".")?></td>
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
									<div class="input-group-text font-weight-bold">
										Valor total (R$)
									</div>
								</div>
								<input type="text" disabled class="form-control bg-light" value="<?=number_format($totalizador[0]['sum_valor_total'], 2 , "," , ".")?>">
							</div>
						</div>

						<!--<div class="col-4">
							<span class="text-danger h5">Valor Total do Orçamento (R$): <?=$totalizador[0]['sum_valor_total']?></span>
						</div>-->

						<div class="col-lg-4 col-md-12 col-sm-12 col-xs-12">
							<div class="input-group mb-2">
								<div class="input-group-prepend">
									<div class="input-group-text font-weight-bold">
										Descontos (R$)
									</div>
								</div>
								<input type="text" disabled class="form-control bg-light" value="<?php echo number_format($totalizador[0]['sum_desconto'], 2, "," , ".") . ' ('. number_format(100 - (($totalizador[0]['sum_total_pagar'] / $totalizador[0]['sum_valor_total']) * 100) , 2 , ',' , '')  .'%)'?>">
							</div>
						</div>

						<!--<div class="col-3">
							<span class="text-danger h5">Total de Descontos (R$): <?=$totalizador[0]['sum_desconto']?></span>
						</div>-->

						<div class="col-lg-4 col-md-12 col-sm-12 col-xs-12">
							<div class="input-group mb-2">
								<div class="input-group-prepend">
									<div class="input-group-text font-weight-bold">
										Valor a Pagar (R$)
									</div>
								</div>
								<input type="text" disabled class="form-control bg-light" value="<?=number_format($totalizador[0]['sum_total_pagar'], 2 , "," , ".")?>">
							</div>
						</div>

						<!--<div class="col-3">
							<span class="text-danger h5">Valor a Pagar (R$): <?=$totalizador[0]['sum_total_pagar']?></span>
						</div>-->
						
						<div class="col-10 mt-5">
							<span class="text-danger h5">Vendedor:</span> <span class="text-primary h5"><?=$resultado[0]['usuario']?></span>
						</div>

						<div class="col mt-5 pl-5 text-left d-print-none">
							<a href="#"><img src="../assets/whatsapp.png" width="50" height="50" alt="Whatsapp" title="Compartilhar por Whatsapp"></a>
							&nbsp&nbsp
							<a href="#"><img  src="../assets/email.png" class="img-fluid" width="50" height="50" alt="Enviar por e-mail" title="E-mail"></a>
						</div>

						<div class="col text-right mt-5">
							<span>Planaltina/GO, <?php echo date("d/m/Y") . ".";?></span>
						</div>	
					</div>

				</div>
			</div>
			
		</div>

		<!-- fechamento da DIV de impressão-->
		</div>
		<div class="container text-center">
			<button class="btn btn-secondary btn-lg btn-center mt-2" onclick="window.print()">Gerar Impressão</button>
		</div>

	</div>
			
	<?php require_once 'includes/bootstrap-js.php'; ?>
</body>
</html>