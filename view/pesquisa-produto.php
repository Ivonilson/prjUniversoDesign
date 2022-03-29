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
	<title>Produtos</title>
	<?php require_once 'includes/bootstrap-css.php'; ?>
</head>

<body class="bg-dark fixed-nav sticky-footer" id="page-top">
	<!-- NAVEGAÇÃO -->
	<?php require_once 'includes/navegacao.php';?>
	
	<div class="content-wrapper" id="background-tela-consulta">
		<div class="container-fluid">
			<ol class="breadcrumb">
				<li class="breadcrumb-item">
					<a href="?pagina=os-do-dia" class="text-decoration-none">Início</a>
				</li>
				<li class="breadcrumb-item">
					Pesquisas
				</li>
				<li class="breadcrumb-item">
					<mark class="p-2 font-weight-bold">Produtos</mark>
				</li>
			</ol>

			<div class="row mb-3">

				<div class="col mb-1">
					<a href="?pagina=pesquisa-por-os" class="botoes-atalho-cons" title="Pesq. O.S. por código"><i class="fa fa-search" aria-hidden="true"></i> Pesq. O.S. por código </a>
				</div>

				<div class="col mb-1">
					<a href="?pagina=pesquisa-por-data-agendamento" class="botoes-atalho-cons" title="Pesq. por data de agendamento"><i class="fa fa-search " aria-hidden="true"></i> O.S(s) por data de agendamento </a>
				</div>

				<div class="col mb-1">
					<a href="?pagina=pesquisa-por-data-receb" class="botoes-atalho-cons" title="Pesq. por data de recebimento"><i class="fa fa-search " aria-hidden="true"></i> O.S(s) por data de recebimento  </a>
				</div>

				<div class="col mb-1">
					<a href="?pagina=pesquisa-por-orcamento" class="botoes-atalho-cons" title="Orçamentos cadastrados"><i class="fa fa-search " aria-hidden="true"></i> Orçamentos </a>
				</div>

				<div class="col mb-1">
					<a href="?pagina=pesquisa-cliente" class="botoes-atalho-cons" title="Clientes cadastrados"><i class="fa fa-search " aria-hidden="true"></i> Clientes </a>
				</div>

			</div>

			<div class="card mb-1">
				<div class="card-header">
					<i class="fa fa-table"></i> <span class="font-weight-bold text-lg">Pesquisa de produtos</span>
					<br>
					<br>
					<form method="get"  class="background-form-cons">

						<div id="div-ipt-data-form-cons">
							<div class="input-group mb-2">
								<div class="input-group-prepend">
									<div class="input-group-text bg-secondary text-white">
										Pesquisar
									</div>
								</div>
								<input type="hidden" class="form-control" name="pagina" value="pesquisa-produto">
								<input type="text" class="form-control" name="palavra_chave" placeholder="Digite uma palavra chave ou TODOS">	
							</div>
						</div>

						<div id="div-btn-form-cons">
							<input type="submit" value="Buscar" id="botoesCons">
						</div>

						<!--<div barra-progresso="barraProgresso" class="progresso pr-3 pl-3 pt-1 pb-1 ml-3 float-right  rounded" title="Percentual de serviços finalizados">
							<div></div>-->
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
								<th>Descrição</th>
								<th>Unidade de medida</th>
								<th>Preço Unitário (R$)</th>
								<!--<th>Estoque</th>-->
								<th>Data de Cadastro</th>
								<th>Atualizar</th>
							</tr>
						</thead>
						<tfoot class="thead-light">
							<tr>
								<th>Código</th>
								<th>Descrição</th>
								<th>Unidade de medida</th>
								<th>Preço Unitário (R$)</th>
								<!--<th>Estoque</th>-->
								<th>Data de Cadastro</th>
								<th>Atualizar</th>
							</tr>
						</tfoot>
						<tbody>
							<?php 

								if($produtos != NULL){
	
								foreach ($produtos as  $value) {	
							?>
							<tr>
								<td><?=$value['id_prod']?></td>
								<td><?=$value['descricao']?></td>
								<td><?=$value['unidade_medida']?></td>
								<td><?=number_format($value['preco_unitario'], 2, ',' , '.')?></td>
								<!--<td><?=number_format($value['quantidade_estoque'], 2, ',', '.')?></td>-->
								<td><?=date_format(date_create($value['data_cadastro']), "d/m/Y")?></td>
								<td align="center"><a href="/?pagina=editar-produto&id_prod=<?=$value['id_prod']?>&form=pesquisa-produto" title="Atualizar"><i class="fa fa-pencil" aria-hidden="true"></i></a></td>
								<!--<td align="center"><a href="/?pagina=historico&cod_os=<?=$value['cod_os']?>&form=pesquisa-por-data-receb" title="Histórico" target="_blank"><i class="fa fa-history" aria-hidden="true"></a></td>-->
							</tr>
							
							<?php 
								$conexao = null;
								}
							} else {
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