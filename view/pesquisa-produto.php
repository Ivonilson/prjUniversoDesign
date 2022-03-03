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
	<!--<link rel="stylesheet" type="text/css" href="../bibliotecas/bootstrap/css/bootstrap.min.css">-->
	<link rel="stylesheet" type="text/css" href="../css/bootstrap2.min.css">
	<link rel="stylesheet" type="text/css" href="../bibliotecas/font-awesome/css/font-awesome.min.css">
	<link rel="stylesheet" type="text/css" href="../bibliotecas/datatables/dataTables.bootstrap4.css">
	<link rel="stylesheet" type="text/css" href="../css/sb-admin.min.css">
	<link rel="stylesheet" type="text/css" href="../css/abg.css">
</head>
<body class="bg-dark fixed-nav sticky-footer" id="page-top">
	<!-- NAVEGAÇÃO -->
	<?php require 'includes/navegacao.php';?>
	
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
					Produtos
				</li>
			</ol>

			<div class="row mb-3">

				<div class="col">
					<a href="?pagina=pesquisa-por-os" class="botoes-atalho-cons" title="Pesq. O.S. por código"><i class="fa fa-search" aria-hidden="true"></i> Pesq. O.S. por código </a>
				</div>

				<div class="col">
					<a href="?pagina=pesquisa-por-data-agendamento" class="botoes-atalho-cons" title="Pesq. por data de agendamento"><i class="fa fa-search " aria-hidden="true"></i> O.S(s) por data de agendamento </a>
				</div>

				<div class="col">
					<a href="?pagina=pesquisa-por-data-receb" class="botoes-atalho-cons" title="Pesq. por data de recebimento"><i class="fa fa-search " aria-hidden="true"></i> O.S(s) por data de recebimento  </a>
				</div>

				<div class="col">
					<a href="?pagina=pesquisa-por-orcamento" class="botoes-atalho-cons" title="Orçamentos cadastrados"><i class="fa fa-search " aria-hidden="true"></i> Orçamentos </a>
				</div>

				<div class="col">
					<a href="?pagina=pesquisa-cliente" class="botoes-atalho-cons" title="Clientes cadastrados"><i class="fa fa-search " aria-hidden="true"></i> Clientes </a>
				</div>

			</div>

			<div class="card mb-1">
				<div class="card-header">
					<i class="fa fa-table"></i> Pesquisa de produtos
					<br>
					<br>
					<form method="post"  class="background-form-cons">

						<div id="div-ipt-data-form-cons">
							<div class="input-group mb-2">
								<div class="input-group-prepend">
									<div class="input-group-text bg-secondary text-white">
										Pesquisar
									</div>
								</div>
								<input type="text" class="form-control" name="ipt-descricao" placeholder="Digite uma palavra chave ou TODOS">
							</div>
						</div>

						<div id="div-btn-form-cons">
							<input type="submit" value="Buscar" id="botoesCons">
						</div>

						<!--<div barra-progresso="barraProgresso" class="progresso pr-3 pl-3 pt-1 pb-1 ml-3 float-right  rounded" title="Percentual de serviços finalizados">
							<div></div>-->
						</div>
					</form>
				</div>
			</div>
			<div id="row-tbl-consulta">
				<div class="card-body">
					<table class="tbl-consulta" id="dataTable" width="100%" cellspacing="0">
						<thead class="thead-light">
							<tr>
								<th>Código</th>
								<th>Descrição</th>
								<th>Unidade de medida</th>
								<th>Preço Unitário (R$)</th>
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
								<td><?=$value['preco_unitario']?></td>
								<td><?=date_format(date_create($value['data_cadastro']), "d/m/Y")?></td>
								<td align="center"><a href="/?pagina=editar-produto&id_prod=<?=$value['id_prod']?>&form=editar-produto" title="Atualizar" target="_blank"><i class="fa fa-pencil" aria-hidden="true"></i></a></td>
								<!--<td align="center"><a href="/?pagina=historico&cod_os=<?=$value['cod_os']?>&form=pesquisa-por-data-receb" title="Histórico" target="_blank"><i class="fa fa-history" aria-hidden="true"></a></td>-->
							</tr>
							
							<?php 
								$conexao = null;
								}
							} else {
								echo "<span class='text-danger'>NENHUM DADO RETORNADO.</span><br><br>";
							} 
							?>
						</tbody>
					</table>
				</div>
			</div>
		</div>
		<!-- rodapé -->
		<?php require 'includes/rodape.php';?>
	</div>
	<script src="../bibliotecas/jquery/jquery.min.js"></script>
	<script src="../bibliotecas/bootstrap/js/bootstrap.bundle.min.js"></script>
	<script src="../bibliotecas/jquery-easing/jquery.easing.min.js"></script>
	<script src="../bibliotecas/datatables/jquery.dataTables.js"></script>
	<script src="../bibliotecas/datatables/dataTables.bootstrap4.js"></script>
	<script src="../js/sb-admin.min.js"></script>
	<script src="../js/sb-admin-datatables.min.js"></script>
	<script src="../js/abg.js"></script>

	<!-- BARRA DE PROGRESSO DOS SERVIÇOS EXECUTADOS -->
	<script type="text/javascript">
      //Redirect();
	</script>
</body>
</html>