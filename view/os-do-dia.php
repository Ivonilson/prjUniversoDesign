<?php
if ($_SESSION['user'] == null) {
	header('Location: index.php');
}
?>
<!DOCTYPE html>
<html lang="pt-br">

<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
	<title>Ordens de Serviço do Dia</title>
	<link rel="stylesheet" type="text/css" href="../bootstrap-4.1.3/css/bootstrap.min.css">
	<!-- <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/responsive/2.2.5/css/responsive.bootstrap.min.css"> -->
	<?php require_once 'includes/bootstrap-css.php'; ?>
	<script src="../js/abg2.js"></script>
</head>

<body class="bg-dark fixed-nav sticky-footer" id="page-top">
	<!-- NAVEGAÇÃO -->
	<?php require_once 'includes/navegacao.php'; ?>

	<div class="content-wrapper">
		<div class="container-fluid">
			<ol class="breadcrumb">
				<li class="breadcrumb-item">
					<a href="?pagina=os-do-dia" class="text-decoration-none">Início</a>
				</li>
				<li class="breadcrumb-item">
					Pesquisa
				</li>
				<li class="breadcrumb-item">
					<mark class="p-2 font-weight-bold">O.S(s) do dia</mark>
				</li>
				
			</ol>

			<div class="row">

				<div class="col mb-1">
					<a href="?pagina=cadastrar-orcamento" class="btn btn-secondary btn-block font-weight-bold" data-bs-toggle="tooltip" data-bs-placement="bottom" title="Novo Orçamento"><i class="fa fa-plus " aria-hidden="true"></i> Orçamento </a>
				</div>

				<div class="col">
					<a href="?pagina=cadastrar-os" class="btn btn-secondary btn-block font-weight-bold" data-bs-toggle="tooltip" data-bs-placement="bottom" title="Nova O.S"><i class="fa fa-plus " aria-hidden="true"></i> O.S </a>
				</div>

				<div class="col">
					<a href="?pagina=cadastrar-cliente" class="btn btn-secondary btn-block font-weight-bold" data-bs-toggle="tooltip" data-bs-placement="bottom" title="Novo Cliente"><i class="fa fa-plus " aria-hidden="true"></i> Cliente </a>
				</div>
			</div>

			<br>

			<div class="card mb-1 border border-light">
				<div class="card-header">
					<i class="fa fa-table"></i> <span class="font-weight-bold text-lg">O.S(s) do dia</span> - <?php $hoje = date('d/m/Y');
					echo $hoje;
					echo " - (última atualização às " . date('H') . " h " . date('i') . " m)"; ?><a href="/?pagina=pesquisa-por-os" class=" btn btn-info pr-3 pl-3 pt-2 pb-2 ml-3 float-right text-light rounded"><i class="fa fa-search" aria-hidden="true"></i> Pesquisa por O.S</a>

					<div barra-progresso="barraProgresso" class="col progresso pr-3 pl-3 pt-1 pb-1 ml-3 float-right  rounded" title="Percentual de serviços finalizados">
						<div></div>
					</div>

				</div>
			</div>
			<!-- <div class="container"> -->
			<div class="row">
				<div class="col">
					<table class="table table-bordered table-hover display" id="dataTable" width="100%" cellspacing="0">
						<thead class="thead-light">
							<tr>
								<th>O.S</th>
								<th>Cliente</th>
								<th>N° Orçamento</th>
								<th>Data solicitação</th>
								<th>Data agendamento</th>
								<th>Situação Pagto.</th>
								<th>Status Serviço</th>
								<th>Observações</th>
								<th>Visualizar Itens Orc.</th>
								<th>Atualizar</th>
							    <th class="d-xs-none">Deletar</th>
							</tr>
						</thead>
						<tfoot class="thead-light">
							<tr>
								<th>O.S</th>
								<th>Cliente</th>
								<th>N° Orçamento</th>
								<th>Data solicitação</th>
								<th>Data agendamento</th>
								<th>Situação Pagto.</th>
								<th>Status Serviço</th>
								<th>Observações</th>
								<th>Visualizar Itens Orc.</th>
								<th>Atualizar</th>
								<th class="d-xs-none">Deletar</th>
							</tr>
						</tfoot>
						<tbody>

							<?php
							if ($_SESSION['user'] == "FABRICIO") {

								$quant = 0;
								$quantOsFinalizada = 0;

								//var_dump($resultado);

								if (isset($resultado[0]['cod_os']) != NULL) {

									foreach ($resultado as  $value) {
										$quant++;
										if ($value['status'] != "PENDENTE") {
											$quantOsFinalizada++;
										}

								?>

									<tr class="itensTabela">
										<form method="post">
											<td><?= $value['cod_os'] ?>&nbsp&nbsp<button class="btn btn-light d-md-none d-lg-none d-xl-none"  value='Excluir' data-bs-toggle="tooltip" data-bs-placement="bottom" title="Excluir" title="Excluir" name="btnDeletarOs" id="btnDeletarItem"><i class="fa fa-trash" aria-hidden="true"></i></button></td>
											<td><?= $value['nome'] ?></td>
											<td><?= $value['numeroOrcamento'] ?></td>
											<td><?= date_format(date_create($value['data_cadastro']), "d/m/Y") ?></td>
											<td><?= date_format(date_create($value['data_agendamento']), "d/m/Y") ?></td>
											<td><?= $value['sit_pagamento'] ?></td>

											<td class="status"><?= $value['status']?></td>

											<td class="text-justify"><?= $value['observacao'] ?></td>

																						<td align="center">
											<a href="/?pagina=itens-orcamento&id_orcamento=<?= $value['numeroOrcamento'] ?>" title="Itens orçamento" target="_blank" class="btn btn-default"><i class="fa fa-search" aria-hidden="true"></i></a>
											</td>

											<td align="center"><a href="/?pagina=editar-os&cod_os=<?= $value['cod_os'] ?>&form=os-do-dia" data-bs-toggle="tooltip" data-bs-placement="bottom" title="Editar"><i class="fa fa-pencil" aria-hidden="true"></a></td>

											<td align="center">
													<input type="hidden" name="ipt-cod-delete" value="<?=  $value['cod_os'] ?>">

													<input type="hidden" name="ipt-confirmacao" id="ipt-confirma">

													<button disabled class="btn btn-light d-xs-none"  value='Excluir' data-bs-toggle="tooltip" data-bs-placement="bottom" title="Excluir" name="btnDeletarOs" id="btnDeletarItem"><i class="fa fa-trash" aria-hidden="true"></i></button>
											</td>
										</form>

											<!--<td align="center"><a href="/?pagina=historico&cod_os=<?= $value['cod_os'] ?>&form=os-do-dia" title="Histórico" target="_blank"><i class="fa fa-history" aria-hidden="true"></a></td>-->
									</tr>

									<script>statusOs()</script>

							<?php
									}
								}
							} else {
								echo "<span class='text-danger'>USUÁRIO SEM PERMISSÃO PARA VISUALIZAR AS INFORMAÇÕES DESTA PÁGINA.</span><br><br>";
							}

							?>

						</tbody>
					</table>
					<br>
				</div>
				<span id="qtdDemandas" class="status sr-only"><?= $quant ?></span>
				<span id="quantOsFinalizada" class="status sr-only"><?= $quantOsFinalizada ?></span>
			</div>
			<!-- </div> -->
		</div>
	</div>

	<!-- <script src="https://cdn.datatables.net/responsive/2.2.5/js/dataTables.responsive.min.js"></script>-->

	<?php require_once 'includes/bootstrap-js.php'; ?>

	<!-- rodapé -->
	<?php require_once 'includes/rodape.php'; ?>
	<script type="text/javascript">
		//REFRESH AUTOMÁTICO 
		Redirect();
		//BARRA DE PROGRESSO DOS SERVIÇOS EXECUTADOS
		configurarBarra();
	</script>
</body>
</html>