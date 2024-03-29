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
	<?php require_once 'includes/navegacao.php'; ?>

	<div class="content-wrapper" id="background-tela-consulta">
		<div class="container-fluid">
			<ol class="breadcrumb">
				<li class="breadcrumb-item">
					<a href="?pagina=os-do-dia" class="text-decoration-none">Início</a>
				</li>
				<li class="breadcrumb-item">
					Produtos
				</li>
				<li class="breadcrumb-item">
					<mark class="p-2 font-weight-bold">Consultar Produtos</mark>
				</li>

				<div class="col">
					<a href="/?pagina=cadastrar-produto" class="btn btn-danger text-light float-right font-weight-bold rounded" data-bs-toggle="tooltip" data-bs-placement="bottom" title="Incluir novo produto"><i class="fa fa-plus"></i> Produto</a>
				</div>

			</ol>

			<div class="row mb-3">

				<div class="col mb-1">
					<a href="?pagina=pesquisa-por-os" class="botoes-atalho-cons" data-bs-toggle="tooltip" data-bs-placement="bottom" title="Pesq. O.S. por código"><i class="fa fa-search" aria-hidden="true"></i> Pesq. O.S. por código </a>
				</div>

				<div class="col mb-1">
					<a href="?pagina=pesquisa-por-data-agendamento" class="botoes-atalho-cons" data-bs-toggle="tooltip" data-bs-placement="bottom" title="Pesq. por data de agendamento"><i class="fa fa-search " aria-hidden="true"></i> O.S(s) por data de agendamento </a>
				</div>

				<div class="col mb-1">
					<a href="?pagina=pesquisa-por-data-receb" class="botoes-atalho-cons" data-bs-toggle="tooltip" data-bs-placement="bottom" title="Pesq. por data de recebimento"><i class="fa fa-search " aria-hidden="true"></i> O.S(s) por data de recebimento </a>
				</div>

				<div class="col mb-1">
					<a href="?pagina=pesquisa-por-orcamento" class="botoes-atalho-cons" data-bs-toggle="tooltip" data-bs-placement="bottom" title="Orçamentos cadastrados"><i class="fa fa-search " aria-hidden="true"></i> Orçamentos </a>
				</div>

				<div class="col mb-1">
					<a href="?pagina=pesquisa-cliente" class="botoes-atalho-cons" data-bs-toggle="tooltip" data-bs-placement="bottom" title="Clientes cadastrados"><i class="fa fa-search " aria-hidden="true"></i> Clientes </a>
				</div>

			</div>

			<div class="card mb-1">
				<div class="card-header">
					<i class="fa fa-table"></i> <span class="font-weight-bold text-lg">Pesquisa de produtos</span>
					<br>
					<br>
					<form method="get" class="background-form-cons">

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
								<th class="d-xs-none">Deletar</th>
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
								<th class="d-xs-none">Deletar</th>
							</tr>
						</tfoot>
						<tbody>
							<?php

							if ($produtos != NULL) {

								foreach ($produtos as  $value) {
							?>	
								
									<tr>
									<form method="post">
										<td><?= $value['id_prod'] ?>&nbsp&nbsp<button class="btn btn-light btn-sm d-lg-none d-md-none d-xl-none" name="btnDeletarProduto" id="btnDeletarItem" data-bs-toggle="tooltip" data-bs-placement="bottom" title="Excluir"><i class="fa fa-trash" aria-hidden="true"></i></button></td>
										<td><?= $value['descricao'] ?></td>
										<td><?= $value['unidade_medida'] ?></td>
										<td><?= number_format($value['preco_unitario'], 2, ',', '.') ?></td>
										<!--<td><?= number_format($value['quantidade_estoque'], 2, ',', '.') ?></td>-->
										
										<td><?= date_format(date_create($value['data_cadastro']), "d/m/Y") ?></td>
										
										<td align="center"><a href="/?pagina=editar-produto&id_prod=<?= $value['id_prod'] ?>&form=pesquisa-produto" title="Atualizar" data-bs-toggle="tooltip" data-bs-placement="bottom"><i class="fa fa-pencil" aria-hidden="true"></i></a></td>

										
										<td align="center d-xs-none">
											
											
											<input type="hidden" name="ipt-cod-delete" value="<?= $value['id_prod'] ?>">

											<input type="hidden" name="ipt-confirmacao" id="ipt-confirma">

											<button class="btn btn-light d-xs-none" value='Excluir' data-bs-toggle="tooltip" data-bs-placement="bottom" title="Excluir" name="btnDeletarProduto" id="btnDeletarItem"><i class="fa fa-trash" aria-hidden="true"></i></button>
											
										</td>
									</form>

										<!--<td align="center"><a href="/?pagina=historico&cod_os=<?= $value['cod_os'] ?>&form=pesquisa-por-data-receb" title="Histórico" target="_blank"><i class="fa fa-history" aria-hidden="true"></a></td>-->
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
		<?php require_once 'includes/rodape.php'; ?>
	</div>
	<?php require_once 'includes/bootstrap-js.php'; ?>

	<!-- BARRA DE PROGRESSO DOS SERVIÇOS EXECUTADOS -->
	<script type="text/javascript">
		//Redirect();
	</script>
</body>

</html>