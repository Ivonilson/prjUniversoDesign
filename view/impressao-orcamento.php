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

				<div class="row informacoes_iniciais">
					<div class="col-12 divProposta text-center">
						<h3 class="font-weight-bold">Proposta Comercial</h3>
					</div>
					<div class="col-5 divLogo pb-1">
						<img src="../assets/universo.jpg" style="width: 70%; height: 60%";">
					</div>
					<div class="offset-1 col-6 pt-3 pr-0">
						<h5 class="font-weight-bold text-dark text-left  pl-5 pr-0 mr-0" style="font-size: 15px text-left;">Fabrício Pereira Betinardi Guimarães</h5>
						<h6 class="text-dark text-left pl-5 pr-0 ml-0"> CNPJ: 29.173.145/0001-76 <br> Fone: 61 3637-1820 <br> End: QA 05, Mr, Lote 09, Setor Norte, Planaltina/GO <br> E-mail: universodesign@universodesigncv.com.br</h6>
					</div>
				</div>
				<div class="row pt-2 pb-2 mt-2">

					<div class="col-12">
						<div class="input-group mb-2">
							<div class="input-group-prepend">
								<div class="input-group-text font-weight-bold bordasImpressao">
									Orç. n°
								</div>
							</div>
							<input type="text" disabled class="form-control bg-light bordasImpressao " value="<?= $resultado != null ? $resultado[0]['id_orcamento'] : $_GET['id_orcamento'] ?>">
						</div>
					</div>

					<div class="col-12">
						<div class="input-group mb-2">
							<div class="input-group-prepend">
								<div class="input-group-text font-weight-bold bordasImpressao">
									Cliente
								</div>
							</div>
							<?php if($resultado[0]['cpf_cnpj'] == '' || $resultado[0]['cpf_cnpj'] == '') { ?>
								<input type="text" disabled class="form-control bg-light bordasImpressao " value="<?= $resultado != null ? $resultado[0]['nome_cliente'] : 'Orçamento sem itens' ?>">
							<?php } else { ?>
								<input type="text" disabled class="form-control bg-light bordasImpressao " value="<?= $resultado != null ? $resultado[0]['nome_cliente'].' (CPF/CNPJ: '.$resultado[0]['cpf_cnpj'].')' : 'Orçamento sem itens' ?>">
							<?php } ?>
						</div>
					</div>

					<div class="col-12">
						<div class="input-group mb-2">
							<div class="input-group-prepend">
								<div class="input-group-text font-weight-bold bordasImpressao">
									Registrado em
								</div>
							</div>
							<input type="text" disabled class="form-control bg-light bordasImpressao" value="<?= $resultado != null ? date_format(date_create($resultado[0]['data_cadastro']), "d/m/Y") : '-' ?>">
						</div>
					</div>

					<div class="col-12">
						<div class="input-group mb-2">
							<div class="input-group-prepend">
								<div class="input-group-text font-weight-bold bordasImpressao">
									Validade
								</div>
							</div>
							<input type="text" disabled class="form-control bg-light bordasImpressao " value="<?= $resultado != null ? date_format(date_create($resultado[0]['data_validade']), "d/m/Y") : '-' ?>">
						</div>
					</div>

					<table class="table table-bordered table-hover tabela-impressao table-sm table-responsive borda-impressao" width="100%" cellspacing="0">
						<thead class="thead-light">
							<tr>
								<th class="bordasImpressao">Descrição</th>
								<th class="bordasImpressao">Valor unit.(R$)</th>
								<th class="bordasImpressao">Quant.</th>
								<th class="bordasImpressao">Valor Total(R$)</th>
								<th class="bordasImpressao">Desconto(R$)</th>
								<th class="bordasImpressao">Total a Pagar(R$)</th>
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

							if ($resultado != NULL) {
								foreach ($resultado as  $item) {

								if($item['tipo'] == 'OPERACIONAL') {
									continue;
								}

							?>
									<tr class="table-light bordasImpressao">

										<td class="text-dark bordasImpressao" style="border: 1px solid black"><?= $item['descricao'] ?></td>
										<td class="text-dark bordasImpressao" style="border: 1px solid black"><?= number_format($item['valor_unitario'], 2, ",", ".") ?></td>
										<td class="text-dark bordasImpressao" style="border: 1px solid black"><?= number_format($item['quantidade'], 2, ",", ".") ?></td>
										<td class="text-dark bordasImpressao" style="border: 1px solid black"><?= number_format($item['valor_total'], 3, ",", ".") ?></td>
										<td class="text-dark bordasImpressao" style="border: 1px solid black"><?= number_format($item['desconto'], 3, ",", ".") ?></td>
										<td class="text-dark bordasImpressao" style="border: 1px solid black"><?= number_format($item['total_pagar'], 3, ",", ".") ?></td>
									</tr>
							<?php
									$contador++;
									$conexao = null;
								}
							} 

							if($resultadoServico[0]['valor_total_serv'] != 0) {

							?>
									<tr class="table-light">
										<td class="text-dark bordasImpressao"><?= 'SERVIÇOS/INSTALAÇÕES' ?></td>
										<td class="text-dark bordasImpressao"><?= '-' ?></td>
										<td class="text-dark bordasImpressao"><?= '-' ?></td>
										<td class="text-dark bordasImpressao"><?= number_format($resultadoServico[0]['valor_total_serv'], 3, ",", ".") ?></td>
										<td class="text-dark bordasImpressao"><?= number_format($resultadoServico[0]['valor_desconto_serv'], 3, ",", ".") ?></td>
										<td class="text-dark bordasImpressao"><?= number_format($resultadoServico[0]['total_pagar_serv'], 3, ",", ".")?></td>
									</tr>

							<?php

								}

							?>
						</tbody>
					</table>

					<div class="col-12">
						<div class="input-group mb-2">
							<div class="input-group-prepend">
								<div class="input-group-text font-weight-bold bordasImpressao">
									Valor total (R$)
								</div>
							</div>
							<input type="text" disabled class="form-control bg-light bordasImpressao " value="<?= $resultado != null ? number_format($totalizador[0]['sum_valor_total'], 2, ",", ".") : 0 ?>">
						</div>
					</div>

					<div class="col-12">
						<div class="input-group mb-2">
							<div class="input-group-prepend">
								<div class="input-group-text font-weight-bold bordasImpressao">
									Descontos (R$)
								</div>
							</div>
							<input type="text" disabled class="form-control bg-light bordasImpressao " value="<?= $resultado != null ? number_format($totalizador[0]['sum_desconto'], 2, ",", ".") . ' (' . number_format(100 - (($totalizador[0]['sum_total_pagar'] / $totalizador[0]['sum_valor_total']) * 100), 2, ',', '')  . '%)' : 0 ?>">
						</div>
					</div>

					<div class="col-12">
						<div class="input-group mb-2">
							<div class="input-group-prepend">
								<div class="input-group-text font-weight-bold bordasImpressao">
									Valor a Pagar (R$)
								</div>
							</div>
							<input type="text" disabled class="form-control bg-light bordasImpressao " value="<?= $resultado != null ? number_format($totalizador[0]['sum_total_pagar'], 2, ",", ".") : 0 ?>">
						</div>
					</div>
					
					<?php 
						if($item['observacoes'] != '' && $item['observacoes'] != null) {
					?>

					<div class="col-12">
						<div class="input-group mb-2">
							<div class="input-group-prepend">
								<div class="input-group-text font-weight-bold bordasImpressao">
									Observações
								</div>
							</div>
							<textarea type="text" disabled class="bg-light bordasImpressao col" id="inlineFormInputObservacoes" cols="100" rows="8"><?= $item['observacoes']?></textarea>
						</div>
					</div>

					<div class="col-3">
						<div class="input-group mb-2">
							<div class="input-group-prepend">
								<div class="input-group-text font-weight-bold bordasImpressao">
									Prazo de Entrega
								</div>
							</div>
							<input type="text" disabled class="form-control bg-light bordasImpressao " value="<?= $resultado != null ? $item['prazo'].' dia(s)' : '0' ?>">
						</div>
					</div>

					<?php 
						}
					?>

					<div class="col-12 mt-5">
						<span class="text-dark h5">Responsável:</span> <span class="text-dark h5"><?= $resultado != null ? $resultado[0]['usuario'] : $_SESSION['user'] ?></span>
					</div>
				    
					<!-- 
					<div class="col mt-5 pl-5 text-left d-print-none">
						<a href="#"><img src="../assets/whatsapp.png" width="50" height="50" alt="Whatsapp" title="Compartilhar por Whatsapp"></a>
						&nbsp&nbsp
						<a href="#"><img src="../assets/email.png" class="img-fluid" width="50" height="50" alt="Enviar por e-mail" title="E-mail"></a>
					</div>
					-->

					<div class="col text-right mt-5">
						<span>Planaltina/GO, <?php echo date("d/m/Y") . "."; ?></span>
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