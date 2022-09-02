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
	<title>Pesquisa por data de recebimento</title>
	<?php require_once 'includes/bootstrap-css.php'; ?>
	<script src="../js/abg2.js"></script>
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
					Pesquisas
				</li>
				<li class="breadcrumb-item">
					<mark class="p-2 font-weight-bold">Ordens de serviço por data de recebimento</mark>
				</li>

				<div class="col">
					<a href="/?pagina=cadastrar-os" class="btn btn-danger text-light float-right font-weight-bold rounded" data-bs-toggle="tooltip" data-bs-placement="bottom" title="Incluir nova O.S."><i class="fa fa-plus"></i> O.S.</a>
				</div>

			</ol>

			<div class="row mb-3">

				<div class="col mb-1">
					<a href="?pagina=pesquisa-por-os" data-bs-toggle="tooltip" data-bs-placement="bottom" class="botoes-atalho-cons" title="Pesq. O.S. por código"><i class="fa fa-search" aria-hidden="true"></i> Pesq. O.S. por código </a>
				</div>

				<div class="col mb-1">
					<a href="?pagina=pesquisa-por-data-agendamento" class="botoes-atalho-cons" data-bs-toggle="tooltip" data-bs-placement="bottom" title="Pesq. por data de agendamento"><i class="fa fa-search " aria-hidden="true"></i> O.S(s) por data de agendamento </a>
				</div>

				<div class="col mb-1">
					<a href="?pagina=pesquisa-por-orcamento" class="botoes-atalho-cons" data-bs-toggle="tooltip" data-bs-placement="bottom" title="Orçamentos cadastrados"><i class="fa fa-search " aria-hidden="true"></i> Orçamentos </a>
				</div>

				<div class="col mb-1">
					<a href="?pagina=pesquisa-produto" class="botoes-atalho-cons" data-bs-toggle="tooltip" data-bs-placement="bottom" title="Produtos cadastrados"><i class="fa fa-search " aria-hidden="true"></i> Produtos </a>
				</div>

				<div class="col mb-1">
					<a href="?pagina=pesquisa-cliente" class="botoes-atalho-cons" data-bs-toggle="tooltip" data-bs-placement="bottom" title="Clientes cadastrados"><i class="fa fa-search " aria-hidden="true"></i> Clientes </a>
				</div>

			</div>

			<div class="card mb-1">
				<div class="card-header">
					<i class="fa fa-table"></i> <span class="font-weight-bold text-lg">Pesquisa por Data de Recebimento</span>
					<br>
					<br>
					<form method="post" class="background-form-cons">
						<div id="div-ipt-data-form-cons">

							<div class="row">

								<div class="col-6 mt-2 mb-2 xs-col-12">
									<span>Data Inicial:&nbsp&nbsp</span><input type="date" name="data_inicial">
								</div>

								<div class="col-6 mt-2 mb-2 xs-col-12">
									<span>Data final:&nbsp&nbsp</span><input type="date" name="data_final">
								</div>

							</div>

							<div id="div-btn-form-cons">
								<input type="submit" value="Buscar" id="botoesCons">
							</div>

						</div>

					</form>
				</div>
			</div>

			<div id="row-tbl-consulta">
				<div class="col">

					<!-- barra de progresso -->
					<div barra-progresso="barraProgresso" class="col progresso  pl-3 pt-2 pb-1 ml-3 mb-1 float-right  rounded" title="Percentual de serviços finalizados">
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
								<th class="d-xs-none">Deletar</th>
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
								<th class="d-xs-none">Deletar</th>
							</tr>
						</tfoot>
						<tbody>
							<?php

							$dados = new PesquisaPorDataReceb();
							$quant = 0;
							$quantLaudoPronto = 0;

							$data_inicial = filter_input(INPUT_POST, 'data_inicial');
							$data_final = filter_input(INPUT_POST, 'data_final');


							$resultado = $dados->pesquisaDataReceb();

							if ($resultado) {
								echo "" . date_format(date_create($data_inicial), "d/m/Y") . " a " . date_format(date_create($data_final), "d/m/Y") . "<br><br>";
							}

							if ($resultado != NULL) {

								foreach ($resultado as  $value) {

									$quant++;

									if ($value['status'] != "PENDENTE" && $value['status'] != "-") {
										$quantLaudoPronto++;
									}

							?>
								<tr>
									<form method="post">
										<td><?= $value['cod_os'] ?>&nbsp&nbsp<button class="btn btn-light d-md-none d-lg-none d-xl-none" value='Excluir' data-bs-toggle="tooltip" data-bs-placement="bottom" title="Excluir" name="btnDeletarOs" id="btnDeletarItem"><i class="fa fa-trash" aria-hidden="true"></i></button></td>
										<td><?= $value['id_orcamento'] ?></td>
										<td><?= $value['nome'] ?></td>
										<td><?= $value['contato'] ?></td>
										<td><?= $value['endereco'] ?></td>
										<td><?= $value['cidade_uf'] ?></td>
										<td><?= date_format(date_create($value['data_cadastro']), "d/m/Y") ?></td>
										<td><?= date_format(date_create($value['data_agendamento']), "d/m/Y") ?></td>
										<td><?= $value['sit_pagamento'] ?></td>
										<td class="status"><?= $value['status'] ?></td>
										<td><?= $value['observacao'] ?></td>
										<td align="center"><a href="/?pagina=editar-os&cod_os=<?= $value['cod_os'] ?>&form=pesquisa-por-data-receb" data-bs-toggle="tooltip" data-bs-placement="bottom" title="Atualizar" target="_blank"><i class="fa fa-pencil" aria-hidden="true"></i></a></td>

										<td align="center">
												<input type="hidden" name="ipt-cod-delete" value="<?=  $value['cod_os'] ?>">

												<input type="hidden" name="ipt-confirmacao" id="ipt-confirma">

												<button class="btn btn-light d-xs-none" value='Excluir' data-bs-toggle="tooltip" data-bs-placement="bottom" title="Excluir" name="btnDeletarOs" id="btnDeletarItem"><i class="fa fa-trash" aria-hidden="true"></i></button>
										</td>
									</form>

										<!--<td align="center"><a href="/?pagina=historico&cod_os=<?= $value['cod_os'] ?>&form=pesquisa-por-data-receb" title="Histórico" target="_blank"><i class="fa fa-history" aria-hidden="true"></a></td>-->
								</tr>

									<script>statusOs();</script>

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
					<span id="qtdDemandas" class="status sr-only"><?= $quant != 0 ? $quant : '' ?></span>
					<span id="quantOsFinalizada" class="status sr-only"><?= $quantLaudoPronto ?></span>
				</div>
			</div>
		</div>

		<?php require_once 'includes/bootstrap-js.php'; ?>

		<!-- rodapé -->
		<?php require_once 'includes/rodape.php'; ?>
	</div>

	<!-- BARRA DE PROGRESSO DOS SERVIÇOS EXECUTADOS -->
	<script type="text/javascript">
		//Redirect();
		configurarBarra();
	</script>
</body>

</html>