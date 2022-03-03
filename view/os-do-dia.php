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
	<title>Ordens de Serviço do Dia</title>
	<?php require_once 'includes/bootstrap-css.php'; ?>
	<link rel="stylesheet" type="text/css" href="../css/abg.css">

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
					Pesquisa
				</li>
				<li class="breadcrumb-item">
					O.S(s) do dia
				</li>	
			</ol>

			<div class="row">
				<!-- so pra ocupar espaço -->
				<div class="col-6">
					
				</div>

				<div class="col">
					<a href="?pagina=cadastrar-orcamento" class="btn btn-info btn-block font-weight-bold" title="Novo Orçamento"><i class="fa fa-plus " aria-hidden="true"></i> Orçamento </a>
				</div>

				<div class="col">
					<a href="?pagina=cadastrar-os" class="btn btn-info btn-block font-weight-bold" title="Nova O.S"><i class="fa fa-plus " aria-hidden="true"></i> O.S </a>
				</div>

				<div class="col">
					<a href="?pagina=cadastrar-cliente" class="btn btn-info btn-block font-weight-bold" title="Novo Cliente"><i class="fa fa-plus " aria-hidden="true"></i> Cliente </a>
				</div>
			</div>

			<br>
			
			<div class="card mb-1 border border-light">
				<div class="card-header">
					<i class="fa fa-table"></i> O.S(s) do dia - <?php $hoje = date('d/m/Y'); echo $hoje; echo " - (última atualização às ".date('H')." h ".date('i')." m)"; ?><a href="/?pagina=pesquisa-por-os" class=" btn btn-secondary pr-3 pl-3 pt-2 pb-2 ml-3 float-right text-light rounded">Pesquisa por O.S</a>

					<div barra-progresso="barraProgresso" class="progresso pr-3 pl-3 pt-1 pb-1 ml-3 float-right  rounded" title="Percentual de serviços finalizados">
						<div></div>
					</div>

				</div>
			</div>
			<div class="row border-light bg-light m-2">
				<div class="card-body">
					<table class="table table-bordered table-hover" id="dataTable" width="100%" cellspacing="0">
						<thead class="thead-light">
							<tr>
								<th>O.S</th>
								<th>Cliente</th>
								<th>N° Orçamento</th>
								<th>Data solicitação</th>
								<th>Data agendamento</th>
								<th>Valor Final(R$)</th>
								<th>Situação Pagto.</th>
								<th>Status Serviço</th>
								<th>Observações</th>
								<th>Atualizar O.S</th>
								<th>Visualizar Itens Orc.</th>
							</tr>
						</thead>
						<tfoot class="thead-light">
							<tr>
								<th>O.S</th>
								<th>Cliente</th>
								<th>N° Orçamento</th>
								<th>Data solicitação</th>
								<th>Data agendamento</th>
								<th>Valor Final(R$)</th>
								<th>Situação Pagto.</th>
								<th>Status Serviço</th>
								<th>Observações</th>
								<th>Atualizar O.S</th>
								<th>Visualizar Itens Orc.</th>
							</tr>
						</tfoot>
						<tbody>

							<?php 
								if($_SESSION['user'] == "IVONILSON" || $_SESSION['user'] == "FABRICIO"){
								
								$quant = 0;
								$quantOsFinalizada = 0;

								//var_dump($resultado);

								if(isset($resultado[0]['cod_os']) != NULL) {

								foreach ($resultado as  $value) {
								$quant++;
								if($value['status'] != "PENDENTE") {
									$quantOsFinalizada++;
								}
									
							?>
							
							<tr class="itensTabela">
								<td><?=$value['cod_os']?></td>
								<td><?=$value['nome']?></td>
								<td><?=$value['numeroOrcamento']?></td>
								<td><?=date_format(date_create($value['data_cadastro']), "d/m/Y")?></td>
								<td><?=date_format(date_create($value['data_agendamento']), "d/m/Y")?></td>
								<td><?=$value['valor_final']?></td>
								<td><?=$value['sit_pagamento']?></td>
								<td class="status"><?=$value['status']?></td>
								<td class="text-justify"><?=$value['observacao']?></td>
								<td align="center"><a href="/?pagina=editar-os&cod_os=<?=$value['cod_os']?>&form=os-do-dia" title="Editar"><i class="fa fa-pencil" aria-hidden="true"></a></td>

								<td align="center">
									<a href="/?pagina=itens-orcamento&id_orcamento=<?=$value['numeroOrcamento']?>" title="Itens orçamento" target="_blank" class="btn btn-default"><i class="fa fa-search" aria-hidden="true"></i></a>
								</td>
									
								<!--<td align="center"><a href="/?pagina=historico&cod_os=<?=$value['cod_os']?>&form=os-do-dia" title="Histórico" target="_blank"><i class="fa fa-history" aria-hidden="true"></a></td>-->
							</tr>

							<script>verificaStatus()</script>
							<?php 
								}
							}

							} else {
								echo "<span class='text-danger'>USUÁRIO SEM PERMISSÃO PARA VISUALIZAR AS INFORMAÇÕES DESTA PÁGINA.</span><br><br>";
							} 


							?>
							
						</tbody>
					</table>
					<span id="qtdDemandas" class="status sr-only"><?=$quant?></span>
					<span id="quantOsFinalizada" class="status sr-only"><?=$quantOsFinalizada?></span>
				</div>
			</div>
		</div>
		<!-- rodapé -->
		<?php require_once 'includes/rodape.php';?>
	</div>
	
	<link rel="stylesheet" type="text/css" href="bootstrap-4.1.3/css/bootstrap.min.css">
	<link rel="stylesheet" type="text/css" href="../bibliotecas/font-awesome/css/font-awesome.min.css">
	<link rel="stylesheet" type="text/css" href="../bibliotecas/datatables/dataTables.bootstrap4.css">
	<link rel="stylesheet" type="text/css" href="../css/sb-admin.min.css">
	<link rel="stylesheet" type="text/css" href="../css/sb-admin.min.css">
	
	<script type="text/javascript">
	  //REFRESH AUTOMÁTICO 
      Redirect();

      //BARRA DE PROGRESSO DOS SERVIÇOS EXECUTADOS
      configurarBarra();
	</script>

</body>
</html>