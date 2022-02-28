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
	<title>Agendamentos</title>
	<!--<link rel="stylesheet" type="text/css" href="../bibliotecas/bootstrap/css/bootstrap.min.css">-->
	<link rel="stylesheet" type="text/css" href="../css/bootstrap2.min.css">
	<link rel="stylesheet" type="text/css" href="../bibliotecas/font-awesome/css/font-awesome.min.css">
	<link rel="stylesheet" type="text/css" href="../bibliotecas/datatables/dataTables.bootstrap4.css">
	<link rel="stylesheet" type="text/css" href="../css/sb-admin.min.css">
	<link rel="stylesheet" type="text/css" href="../css/abg.css">
	<script src="../js/abg.js"></script>
</head>
<body class="bg-dark fixed-nav sticky-footer" id="page-top">
	<!-- NAVEGAÇÃO -->
	<?php require 'navegacao.php';?>
	
	<div class="content-wrapper">
		<div class="container-fluid">
			<ol class="breadcrumb">
				<li class="breadcrumb-item">
					<a href="?pagina=demandas-do-dia" class="text-decoration-none">Home</a>
				</li>
				<li class="breadcrumb-item">
					Pesquisas
				</li>
				<li class="breadcrumb-item">
					Lista de agendamentos
				</li>
			</ol>
			<div id="imprimir">
			<div class="card mb-1">
				<?php  

					if ($_SESSION['user'] == "FABRICIO"){
								
						$dados = new ListaAgendamentos();
						$quant = new ListaAgendamentos();

						$contador = $quant->quantListaAgendamento();

						$resultado = $dados->dadosListaAgendamento();

				?>
				<div class="card-header">
					<i class="fa fa-table"></i> Agendamentos - <strong>UNIVERSO DESIGN</strong> - <?php $hoje = date('d/m/Y');echo $hoje; echo " (última atualização às ".date('H')." h ".date('i')." m)"; echo "<br>TOTAL: <strong>".$contador[0]['total']."</strong>";?>

					<!-- DISPARADOR DO MODAL DO WHATSAPP-->
					<button type="button" class="btn btn-success float-right p-2 border-rouded" data-toggle="modal" data-target="#modalListaAgendamento">
						Envio Whatsapp
					</button>

				</div>
			</div>

			<div class="row">
				<div class="card-body">
					<table class="table table-bordered table-hove" id="#" width="100%" cellspacing="0">
						<thead class="thead-dark">
							<tr>
								<th>O.S</th>
								<th>CLIENTE</th>
								<th>CONTATO</th>
								<th>ENDEREÇO</th>
								<th>CIDADE/UF</th>
								<th>DATA DE AGENDAMENTO</th>
								<th>SITUAÇÃO PAGAMENTO</th>
								<th>STATUS</th>
								<th>OBS.</th>
								<th>ATUALIZAR</th>
								<!--<th id="esconder">EDITAR</th>-->
							</tr>
						</thead>
						<!--<tfoot class="thead-dark">
							<tr>
								<th>O.S</th>
								<th>CLIENTE</th>
								<th>CONTATO</th>
								<th>ENDEREÇO</th>
								<th>CIDADE/UF</th>
								<th>DATA DE AGENDAMENTO</th>
								<th>SITUAÇÃO PAGAMENTO</th>
								<th>STATUS</th>
								<th>OBS.</th>
								<th id="esconder">EDITAR</th>
							</tr>
						</tfoot>-->
						<tbody>

							<?php 

								foreach ($resultado as  $value) {
									
							?>
							
							<tr>
								<td><?=$value['cod_os']?></td>
								<td><?=$value['nome']?></td>
								<td><?=$value['contato']?></td>
								<td><?=$value['endereco']?></td>
								<td><?=$value['cidade_uf']?></td>
								<td><?=date_format(date_create($value['data_agendamento']), "d/m/Y")?></td>
								<td><?=$value['sit_pagamento']?></td>
								<td><strong class="statusLista"><?=$value['status']?></strong></td>
								<td><?=$value['observacao']?></td>
								<td align="center" id="esconder"><a href="/?pagina=editar-os&cod_os=<?=$value['cod_os']?>&form=lista-agendamentos" title="Editar"><i class="fa fa-pencil" aria-hidden="true"></a></td>
							</tr>
							<script>verificaStatusLista()</script>
							<?php 
								$conexao = null;
								}
							} else {
								echo "<span class='text-danger'>USUÁRIO SEM PERMISSÃO PARA VISUALIZAR AS INFORMAÇÕES DESTA PÁGINA.</span><br><br>";
							} 
							?>
						</tbody>
					</table>
				</div>
				</div>
			</div>

			<!--- MODAL DE DADOS PARA WHATSAPP -->
			<div class="modal fade" id="modalListaAgendamento" tabindex="-1" role="dialog" aria-labelledby="ModalLista" aria-hidden="true">
				<div class="modal-dialog" role="document">
					<div class="modal-content">
						<div class="modal-header">
							<h5 class="modal-title text-primary">AGENDAMENTOS - UNIVERSO DESIGN</h5>
							<button type="button" class="close" data-dismiss="modal" aria-label="Close">
								<span aria-hidden="true">&times;</span>
							</button>
						</div>
						<div class="modal-body">

							<?php 

								foreach ($resultado as  $value) {
									
							?>

							<span>O.S <?=$value['cod_os']?> - <?=$value['nome']?> -  📞*<?=$value['contato']?>* - <?=$value['endereco']?> - *<?=$value['cidade_uf']?>* - *AGENDADO PARA: <?=date_format(date_create($value['data_agendamento']), "d/m/Y")?>* - *<?=$value['observacao']?>*</span>
							<br>
							<hr>


							<?php  
								$conexao = null;
								}
							?>

						</div>
						<div class="modal-footer">
							<button type="button" class="btn btn-secondary" data-dismiss="modal">Fechar</button>
						</div>
					</div>
				</div>
			</div>

		</div>
	</div>

	<script src="../bibliotecas/jquery/jquery.min.js"></script>
	<script src="../bibliotecas/bootstrap/js/bootstrap.bundle.min.js"></script>
	<script src="../bibliotecas/jquery-easing/jquery.easing.min.js"></script>
	<script src="../bibliotecas/datatables/jquery.dataTables.js"></script>
	<script src="../bibliotecas/datatables/dataTables.bootstrap4.js"></script>
	<script src="../js/sb-admin.min.js"></script>
	<script src="../js/sb-admin-dataTables.min.js"></script>
</body>
</html>