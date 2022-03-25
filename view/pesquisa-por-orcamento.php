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
	<title>Orçamentos</title>
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
					Pesquisa de Orçamentos
				</li>
			</ol>

			<div class="row mb-3">

				<div class="col">
					<a href="?pagina=pesquisa-por-data-receb" class="botoes-atalho-cons" title="Pesq. por data receb."><i class="fa fa-search" aria-hidden="true"></i> O.S(s) por data de recebimento </a>
				</div>

				<div class="col">
					<a href="?pagina=pesquisa-por-data-agendamento" class="botoes-atalho-cons" title="Pesq. por data de agendamento"><i class="fa fa-search " aria-hidden="true"></i> O.S(s) por data de agendamento </a>
				</div>

				<div class="col">
					<a href="?pagina=pesquisa-por-os" class="botoes-atalho-cons" title="Pesq. O.S. por código"><i class="fa fa-search " aria-hidden="true"></i> Pesq. O.S. por código </a>
				</div>

				<div class="col">
					<a href="?pagina=pesquisa-produto" class="botoes-atalho-cons" title="Produtos cadastrados"><i class="fa fa-search " aria-hidden="true"></i> Produtos </a>
				</div>

				<div class="col">
					<a href="?pagina=pesquisa-cliente" class="botoes-atalho-cons" title="Clientes cadastrados"><i class="fa fa-search " aria-hidden="true"></i> Clientes </a>
				</div>

			</div>

			<div class="card mb-1 col">
				<div class="card-header">
					<i class="fa fa-table"></i> Orçamentos
					<br>
					<br>
					<form method="get" class="background-form-cons">

						<div id="div-ipt-data-form-cons">
							<div class="input-group m-3">
								<div class="input-group-prepend">
									<div class="input-group-text bg-secondary text-white">
										Pesquisar
									</div>
								</div>

								<input type="hidden" name="pagina" value="pesquisa-por-orcamento">


								<input type="text" class="form-control" name="ipt-pesquisa-orcamento" placeholder="Digite uma palavra chave ou TODOS">

							</div>
						</div>

						<div id="div-btn-form-cons">
							<input type="submit" value="Buscar" id="botoesCons">
						</div>
					</form>
				</div>
			</div>

			<div id="row-tbl-consulta">
				<div class="col">
					<br>
					<table class="table table-bordered table-hover display" id="dataTable" width="100%" cellspacing="0">
						<thead class="thead-light">
							<tr>
								<th>Código</th>
								<th>Cliente</th>
								<th>Serviço</th>
								<th>Data Cadastro</th>
								<th>Data Validade</th>
								<th>Status</th>
								<th>Observação</th>
								<th>Ver Itens</th>
								<th>Imprimir</th>
								<th>Excluir</th>
							</tr>
						</thead>
						<tfoot class="thead-light">
							<tr>
								<th>Código</th>
								<th>Cliente</th>
								<th>Serviço</th>
								<th>Data Cadastro</th>
								<th>Data Validade</th>
								<th>Status</th>
								<th>Observação</th>
								<th>Ver Itens</th>
								<th>Imprimir</th>
								<th>Excluir</th>
							</tr>
						</tfoot>
						<tbody>
							<?php 

								$contador = 0;

								if($resultado != NULL){
	
								foreach ($resultado as  $value) {	
							?>
							<tr>
								<td id="valor_id"><?=$value['id_orcamento']?></td>
								<td><?=$value['nome']?></td>
								<td><?=$value['servico']?></td>
								<td><?=date_format(date_create($value['data_cadastro']), "d/m/Y")?></td>
								<td><?=date_format(date_create($value['data_validade']), "d/m/Y")?></td>
								<td><?=$value['status']?></td>
								<td><?=$value['observacao']?></td>

								<!--<td align="center"  data-toggle="modal" data-target=".modal-ver-itens"><a href="#" title="Atualizar"><i class="fa fa-check-square-o" aria-hidden="true"></i></a></td>--->

								<td align="center">
									<a href="/?pagina=itens-orcamento&id_orcamento=<?=$value['id_orcamento']?>" title="Itens orçamento" target="_blank" class="btn btn-default"><i class="fa fa-search" aria-hidden="true"></i></a>
								</td>
								
								<td align="center"><a href="/?pagina=impressao-orcamento&id_orcamento=<?=$value['id_orcamento']?>&form=pesquisa-por-orcamento" title="Imprimir" target="_blank" class="btn btn-default"><i class="fa fa-print" aria-hidden="true"></i></a></td>

								<form method="post">

									<input type="hidden" name="ipt-orcamento-deletar" value="<?=$value['id_orcamento']?>">

									<input type="hidden" id="orcamento-deletar" name="ipt-confirma-orcamento-deletar">

									<td align="center"><button class="btn btn-default" name="btn-deletar-orcamento" id="btn-del-orcamento"><i class="fa fa-trash" aria-hidden="true"></i></button></td>

								</form>

								<!--<td align="center"><a href="/?pagina=historico&cod_os=<?=$value['cod_os']?>&form=pesquisa-por-data-receb" title="Histórico" target="_blank"><i class="fa fa-history" aria-hidden="true"></a></td>-->
							</tr>
							
							<?php 
								$conexao = null;

							} }else {
								//echo "<span class='text-danger'>NENHUM DADO RETORNADO.</span><br><br>";
							} 

							?>
						</tbody>
					</table>
					<br>
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
	</script>
</body>
</html>