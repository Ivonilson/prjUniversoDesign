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
	<title>Contr. Caixa - Relatórios</title>
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
					Financeiro
				</li>
                <li class="breadcrumb-item">
					Controle de Caixa - Consultas
				</li>
				<li class="breadcrumb-item">
					<mark class="p-2 font-weight-bold">Relatórios</mark>
				</li>

				<div class="col">
					<a href="/?pagina=cadastrar-os" class="btn btn-danger text-light float-right font-weight-bold rounded" data-bs-toggle="tooltip" data-bs-placement="bottom" title="Incluir nova despesa"><i class="fa fa-plus"></i> Despesa</a>
				</div>

			</ol>

            <!--
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
            -->

			<div class="card mb-1">
				<div class="card-header">
					<i class="fa fa-table"></i> <span class="font-weight-bold text-lg">Despesas por período</span>
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

					<table class="table table-bordered table-hover display" id="dataTable" width="100%" cellspacing="0">
						<thead class="thead-light">
							<tr>
								<th>Cod. Despesa</th>
								<th>Tipo</th>
								<th>Descrição</th>
								<th>Detalhamento</th>
								<th>Valor(R$)</th>
								<th>Forma de Pagamento</th>
								<th>Data de referência</th>
								<th>Data do lançamento</th>
                                <th>Usuário</th>
								<th>Atualizar</th>
								<th class="d-xs-none">Deletar</th>
							</tr>
						</thead>
						<tfoot class="thead-light">
							<tr>
                                <th>Cod. Despesa</th>
								<th>Tipo</th>
								<th>Descrição</th>
								<th>Detalhamento</th>
								<th>Valor(R$)</th>
								<th>Forma de Pagamento</th>
								<th>Data de referência</th>
								<th>Data do lançamento</th>
                                <th>Usuário</th>
								<th>Atualizar</th>
								<th class="d-xs-none">Deletar</th>
							</tr>
						</tfoot>
						<tbody>
							<?php

							$dados = new PesquisaControleCaixaPorPeriodo();
							$valor_total = 0;

							$data_inicial = filter_input(INPUT_POST, 'data_inicial');
							$data_final = filter_input(INPUT_POST, 'data_final');


							$resultado = $dados->pesquisaControleCaixaPorPeriodo();

							if ($resultado || isset($_POST['data_inicial'])){
								echo "<strong>Periodo de Pesquisa: <mark>" . date_format(date_create($data_inicial), "d/m/Y") . " a " . date_format(date_create($data_final), "d/m/Y") . "</mark></strong><br><br>";
							}

							if ($resultado != NULL) {

								foreach ($resultado as  $value) {
                                
                                $valor_total += $value['valor'];
							?>
								<tr>
									<form method="post">
										<td><?= $value['id_despesa'] ?>&nbsp&nbsp<button class="btn btn-light d-md-none d-lg-none d-xl-none" value='Excluir' data-bs-toggle="tooltip" data-bs-placement="bottom" title="Excluir" name="btnDeletarOs" id="btnDeletarItem"><i class="fa fa-trash" aria-hidden="true"></i></button></td>
										<td><?= $value['tipo'] ?></td>
										<td><?= $value['descricao'] ?></td>
										<td><?= $value['detalhamento'] ?></td>
										<td><?= number_format($value['valor'], 2, ',' , '.') ?></td>
                                        <td><?= $value['forma_pagamento'] ?></td>
										<td><?= date_format(date_create($value['data_referencia']), "d/m/Y") ?></td>
										<td><?= date_format(date_create($value['data_processamento']), "d/m/Y") ?></td>
                                        <td><?= $value['usuario'] ?></td>
			
										<td align="center"><a href="/?pagina=editar-os&id_despesa=<?= $value['id_despesa'] ?>&form=pesquisa-por-data-receb" data-bs-toggle="tooltip" data-bs-placement="bottom" title="Atualizar" target="_blank"><i class="fa fa-pencil" aria-hidden="true"></i></a></td>

										<td align="center">
												<input type="hidden" name="ipt-cod-delete" value="<?=  $value['id_despesa'] ?>">

												<input type="hidden" name="ipt-confirmacao" id="ipt-confirma">

												<button class="btn btn-light d-xs-none" value='Excluir' data-bs-toggle="tooltip" data-bs-placement="bottom" title="Excluir" name="btnDeletarOs" id="btnDeletarItem"><i class="fa fa-trash" aria-hidden="true"></i></button>
										</td>
									</form>

										<!--<td align="center"><a href="/?pagina=historico&cod_os=<?= $value['cod_os'] ?>&form=pesquisa-por-data-receb" title="Histórico" target="_blank"><i class="fa fa-history" aria-hidden="true"></a></td>-->
								</tr>

							<?php
									$conexao = null;
								}
							} else {
								echo "<span class='text-danger'></span><br><br>";
							}
							?>
						</tbody>
					</table>
                    <div>
                    <span style="font-weight: bold;">
                        Valor total para o período: R$ <?= number_format($valor_total, 2, ',' , '.') ?>
                    </span>
                </div>
					<br>
				</div>
			</div>
		</div>

		<?php require_once 'includes/bootstrap-js.php'; ?>

		<!-- rodapé -->
		<?php require_once 'includes/rodape.php'; ?>
	</div>
</body>

</html>