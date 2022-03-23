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
	<title>Itens Orc. N° <?=filter_input(INPUT_GET,	'id_orcamento')?> </title>
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
					Pesquisas
				</li>
				<li class="breadcrumb-item">
					Itens de Orçamento
				</li>
			</ol>
			</div>

			<h3 class="text-center">Itens referentes ao Orçamento <span class="text-danger">N° <?=filter_input(INPUT_GET,	'id_orcamento')?></span></h3>
			<div class="row">
				<div class="col-lg-12">
					<table class="table table-bordered table-hover display nowrap" id="dataTable" width="100%" cellspacing="0">
						<thead class="thead-dark">
							<tr>
								<th>Descrição</th>
								<th>Valor unit.(R$)</th>
								<th>Quant.</th>
								<th>Valor Total(R$)</th>
								<th>Desconto(R$)</th>
								<th>Total a Pagar(R$)</th>
								<th>Alterar</th>
								<th>Excluir</th>
							</tr>
						</thead>
						<tfoot class="thead-dark">
							<tr>
								<th>Descrição</th>
								<th>Valor unit.(R$)</th>
								<th>Quant.</th>
								<th>Valor Total(R$)</th>
								<th>Desconto(R$)</th>
								<th>Total a Pagar(R$)</th>
								<th>Alterar</th>
								<th>Excluir</th>
							</tr>
						</tfoot>
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
								<!--<td align="center"  data-toggle="modal" data-target=".modal-ver-itens"><a href="#" title="Atualizar"><i class="fa fa-check-square-o" aria-hidden="true"></i></a></td>--->

								<td align="center">
									<button class="btn btn-default" data-toggle="modal" data-target="#<?=$contador?>"><i class="fa fa-pencil" aria-hidden="true"></i></button>
								</td>
											
								<td align="center">

									<form method="post">
										<input type="hidden" name="ipt-cod-delete" value="<?=$item['id']?>">

										<input type="hidden" name="ipt-confirmacao" id="ipt-confirma">

										<input type="submit" value='Excluir' name="btnDeletarItensOrcamento" id="btnDeletarItem">
									</form>

								</td>
							
							</tr>

					<!-- MODAL EDITAR ITEM --->
					<div class="modal fade modal-ver-itens" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel" aria-hidden="true" id="<?=$contador?>">
 						 <div class="modal-dialog">
   							 <div class="modal-content">

   							 <div class="row mr-2 ml-2 justify-content-center">

   							 <h2 class="text-primary col-12 text-center mt-5">Alterando o item <label class="border p-3 text-danger font-weight-bold"><?=$item['descricao']?></label> do Orçamento N° <?=$item['id_orcamento']?> </h2>

   							 	<form method="post">

   							 	<div class="col-3">
   									<label class="text-danger font-weight-bold readonly">ID</label>
   									<br>
   									<input class="form-control" type="text" readonly name="ipt-id" value="<?=$item['id']?>" id="ipt-codigo">
   								</div>

   								<div class="col-3">
   									<label class="text-danger font-weight-bold readonly">Valor Unitário (R$)</label>
   									<br>
   									<input class="form-control" type="text" readonly name="" value="<?=number_format($item['valor_unitario'], 2, ',' , '.')?>">
   								</div>

   								<div class="col-1">
   									<label class="text-danger font-weight-bold">Quant.</label>
   									<br>
   									<input class="form-control" type="number" min="1" name="ipt-quantidade" value="<?=number_format($item['quantidade'], 0, ' ', ' ') ?>">
   								</div>

   								<div class="col-1">
   									<label class="text-danger font-weight-bold">Desconto (%)</label>
   									<br>
   									<input class="form-control" type="text" name="ipt-desconto" value="<?php echo (number_format(($item['desconto'] / $item['valor_total']) * 100, 2, ',' , '.')) ?>">
   								</div>

   								<div class="col-1">
   									<label class="text-danger font-weight-bold">-</label>
   									<br>
   									<input class="form-control btn-success" type="submit" name="btnEditarItensOrcamento" value="Gravar">
   								</div>
   									

   								</form>
   								
   							</div>

   							</div>
   						</div>
   					</div>
							
							<?php
								$contador++; 
								$conexao = null;


							} }else {
								echo "<span class='text-danger'>NENHUM DADO RETORNADO.</span><br><br>";
							} 


							?>
						</tbody>
					</table>
				</div>
			</div>

		</div>
		<!-- rodapé -->
		<?php require_once 'includes/rodape.php';?>

	<?php require_once 'includes/bootstrap-js.php'; ?>

	<!-- BARRA DE PROGRESSO DOS SERVIÇOS EXECUTADOS -->
	<script type="text/javascript">
      //Redirect();
	</script>
</body>
</html>