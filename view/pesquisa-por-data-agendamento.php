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
	<title>Pesquisa por data de agendamento</title>
	<?php require_once 'includes/bootstrap-css.php'; ?>
</head>

<body class="bg-dark fixed-nav sticky-footer" id="page-top">
	<!-- NAVEGAÇÃO -->
	<?php require_once 'includes/navegacao.php';?>
	
	<div class="content-wrapper" id="background-tela-consulta">
		<div class="container-fluid">
			<ol class="breadcrumb">
				<li class="breadcrumb-item">
					<a href="?pagina=os-do-dia" class="text-decoration-none">Home</a>
				</li>
				<li class="breadcrumb-item">
					Pesquisas
				</li>
				<li class="breadcrumb-item">
					Ordens de serviço por data de agendamento
				</li>
			</ol>

			<div class="row mb-3">

				<div class="col mb-1">
					<a href="?pagina=pesquisa-por-os" class="botoes-atalho-cons" title="Pesq. O.S. por código"><i class="fa fa-search" aria-hidden="true"></i> Pesq. O.S. por código </a>
				</div>

				<div class="col mb-1">
					<a href="?pagina=pesquisa-por-data-receb" class="botoes-atalho-cons" title="Pesq. por data de recebimento"><i class="fa fa-search " aria-hidden="true"></i> O.S(s) por data de recebimento </a>
				</div>

				<div class="col mb-1">
					<a href="?pagina=pesquisa-por-orcamento" class="botoes-atalho-cons" title="Orçamentos cadastrados"><i class="fa fa-search " aria-hidden="true"></i> Orçamentos </a>
				</div>

				<div class="col mb-1">
					<a href="?pagina=pesquisa-produto" class="botoes-atalho-cons" title="Produtos cadastrados"><i class="fa fa-search " aria-hidden="true"></i> Produtos </a>
				</div>

				<div class="col mb-1">
					<a href="?pagina=pesquisa-cliente" class="botoes-atalho-cons" title="Clientes cadastrados"><i class="fa fa-search " aria-hidden="true"></i> Clientes </a>
				</div>

			</div>

			<div class="card mb-1">

				<div class="card-header">
					<i class="fa fa-table"></i> Pesquisa por Data de Agendamento
					<br>
					<br>
					<form method="post" class="background-form-cons">
						<div id="div-ipt-data-form-cons">
							<span>Data Inicial:&nbsp&nbsp</span><input type="date" name="data_inicial">&nbsp&nbsp&nbsp<span>Data final:&nbsp&nbsp</span><input type="date" name="data_final">
							<br><br>
						</div>
						<div id="div-btn-form-cons">
							<input type="submit" value="Buscar" id="botoesCons">
						</div>

					</form>
				</div>
			</div>

			<div id="row-tbl-consulta">
				<div class="col">

					<!-- barra de progresso -->
					<div barra-progresso="barraProgresso" class="col progresso pr-3 pl-3 pt-1 pb-1 ml-3 mb-1 mr-3 float-right  rounded" title="Percentual de serviços finalizados">
					<div></div>
					</div>
					<!-- fim da barra de progresso -->

					<table class="table table-bordered table-hover display" id="dataTable" width="100%" cellspacing="0">
						<thead class="thead-light">
							<tr>
								<th>Cod. O.S</th>
								<th>N° Orçamento</th>
								<th>Cliente</th>
								<th>Contato</th>
								<th>Endereço</th>
								<th>Cidade/UF</th>
								<th>Data Cadastro</th>
								<th>Data Agendamento</th>
								<th>Sit.Pagamento</th>
								<th>Status</th>
								<th>Observação</th>
								<th>Atualizar</th>
							</tr>
						</thead>
						<tfoot class="thead-light">
							<tr>
								<th>Cod. O.S</th>
								<th>N° Orçamento</th>
								<th>Cliente</th>
								<th>Contato</th>
								<th>Endereço</th>
								<th>Cidade/UF</th>
								<th>Data Cadastro</th>
								<th>Data Agendamento</th>
								<th>Sit.Pagamento</th>
								<th>Status</th>
								<th>Observação</th>
								<th>Atualizar</th>
							</tr>
						</tfoot>
						<tbody>
							<?php 

								$dados = new PesquisaPorDataAgendamento();
								$quant = 0;
								$quantLaudoPronto = 0;
								
								$data_inicial = filter_input(INPUT_POST, 'data_inicial');
								$data_final = filter_input(INPUT_POST, 'data_final');
								
								
								$resultado = $dados->pesquisaDataAgendamento();

								if($resultado) {
									echo "".date_format(date_create($data_inicial), "d/m/Y")." a ".date_format(date_create($data_final), "d/m/Y")."<br><br>";
								}

								if($resultado != NULL){
	
								foreach ($resultado as  $value) {
								$quant++;
								if($value['status'] != "PENDENTE" && $value['status'] != "-") {
									$quantLaudoPronto++;
								}
									
							?>
							<tr>
								<td><?=$value['cod_os']?></td>
								<td><?=$value['id_orcamento']?></td>
								<td><?=$value['nome']?></td>
								<td><?=$value['contato']?></td>
								<td><?=$value['endereco']?></td>
								<td><?=$value['cidade_uf']?></td>
								<td><?=date_format(date_create($value['data_cadastro']), "d/m/Y")?></td>
								<td><?=date_format(date_create($value['data_agendamento']), "d/m/Y")?></td>
								<td><?=$value['sit_pagamento']?></td>
								<td class="status"><?=$value['status']?></td>
								<td><?=$value['observacao']?></td>
								<td align="center"><a href="/?pagina=editar-os&cod_os=<?=$value['cod_os']?>&form=pesquisa-por-data-receb" title="Atualizar" target=""><i class="fa fa-pencil" aria-hidden="true"></i></a></td>
								<!--<td align="center"><a href="/?pagina=historico&cod_os=<?=$value['cod_os']?>&form=pesquisa-por-data-entrega" title="Histórico" target="_blank"><i class="fa fa-history" aria-hidden="true"></a></td>-->
							</tr>
							<script>verificaStatus()</script>
							<?php 
								$conexao = null;
								}
							} else {
								echo "<span class='text-danger'></span><br><br>";
							} 
							?>
						</tbody>
					</table>
					<br>
					<span id="qtdDemandas" class="status sr-only"><?=$quant?></span>
					<span id="quantOsFinalizada" class="status sr-only"><?=$quantLaudoPronto?></span>
				</div>
			</div>
		</div>
		<!-- rodapé -->
		<?php require_once 'includes/rodape.php';?>
	</div>
	<?php require_once 'includes/bootstrap-js.php'; ?>

	<!-- BARRA DE PROGRESSO DOS SERVIÇOS EXECUTADOS -->
	<script type="text/javascript">
      //Redirect();
      configurarBarra();
	</script>
</body>
</html>