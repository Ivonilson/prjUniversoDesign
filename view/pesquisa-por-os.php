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
	<title>Pesquisa por O.S.</title>
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
					Pesquisas
				</li>
				<li class="breadcrumb-item">
					<mark class="p-2 font-weight-bold">Por O.S</mark>
				</li>

				<div class="col">
					<a href="/?pagina=cadastrar-os" class="btn btn-danger text-light float-right font-weight-bold rounded" data-bs-toggle="tooltip" data-bs-placement="bottom" title="Incluir nova O.S."><i class="fa fa-plus"></i> O.S.</a>
				</div>

			</ol>

			<div class="row mb-3">

				<div class="col mb-1">
					<a href="?pagina=pesquisa-por-data-receb" class="botoes-atalho-cons" data-bs-toggle="tooltip" data-bs-placement="bottom" title="Pesq. por data receb."><i class="fa fa-search" aria-hidden="true"></i> O.S(s) por data de recebimento </a>
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

			<div class="card mb-1 col">
				<div class="card-header">
					<i class="fa fa-table"></i> <span class="font-weight-bold text-lg">Pesquisa por Ordem de Serviço</span>
					<br>
					<br>
					<form method="post" class="background-form-cons">
						<div class="row">
							<div class="input-group-prepend m-2 col-lg-5 col-md-5 col-sm-12 col-xs-12">
								<div class="input-group-text">Número da O.S.</div>
								<input type="text" name="ipt-cod-os" class="form-control"><span>
							</div>
						</div>

						<br>

						<div class="col-lg-5 col-md-5 col-sm-12 col-xs-12 mb-3">
							<input type="submit" value="Buscar" class="btn btn-lg btn-info btn-block text-white font-weight-bold rounded" id="botoesCons">
						</div>

					</form>
				</div>
			</div>

			<div class="row">
				<div class="card-body">
					<?php

					if (filter_input(INPUT_POST, 'ipt-cod-os') != '') {
						//RESULTADOS DA PESQUISA
						$dados = new PesquisaPorOs;
						$resultado = $dados->pesqPorOs();

						if ($resultado) {

					?>
							<div class='bg-success text-light p-2'><strong>RESULTADO DA PESQUISA</strong></div><br>

							<div class="row">

								<div class="col-12">

									<div class="bg-light pr-2 pl-2 rounded text-dark font-weight-bold col-12">
										<!--<span>
									<a href="/?pagina=historico&cod_os=<?= $resultado[0]['cod_os'] ?>&form=pesquisa-por-os" class="text-dark text-decoration-none float-right border-rouded" target="_blank"  title="Histórico"><i class="fa fa-history" aria-hidden="true"></i></a>
								</span>-->
										<span>
											<form method="post">
												<a href="/?pagina=editar-os&cod_os=<?= $resultado[0]['cod_os'] ?>&form=pesquisa-por-os" class="mt-1 text-dark text-decoration-none float-right border-rouded" target="_blank" data-bs-toggle="tooltip" data-bs-placement="bottom" title="Atualizar">
													<i class="fa fa-pencil" aria-hidden="true"></i></a>&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp

												<input type="hidden" name="ipt-cod-delete" value="<?=  $resultado[0]['cod_os'] ?>">

												<input type="hidden" name="ipt-confirmacao" id="ipt-confirma">

												<button class="btn btn-light float-right" value='Excluir' data-bs-toggle="tooltip" data-bs-placement="bottom" title="Excluir" name="btnDeletarOs" id="btnDeletarItem"><i class="fa fa-trash" aria-hidden="true"></i></button>
											</form>
										</span>
									</div>

									<div class="bg-light pr-2 pl-2 rounded text-dark font-weight-bold">O.S</div>
									<p class="form-control bg-light text-dark pl-2 pr-2 h-auto"> <?= $resultado[0]['cod_os'] ?>
									</p>
								</div>

								<div class="col-12">
									<div class="bg-light pr-2 pl-2 rounded text-dark font-weight-bold">N° ORÇAMENTO</div>
									<p class="form-control bg-light text-dark pl-2 pr-2 h-auto"> <?= $resultado[0]['id_orcamento'] ?>
									</p>
								</div>

								<div class="col-12">
									<div class="bg-light pr-2 pl-2 rounded text-dark font-weight-bold">CLIENTE</div>
									<p class="form-control bg-light text-dark pl-2 pr-2 h-auto"> <?= $resultado[0]['nome'] ?>
									</p>
								</div>

								<div class="col-12">
									<div class="bg-light pr-2 pl-2 rounded text-dark font-weight-bold">CONTATO</div>
									<p class="form-control bg-light text-dark pl-2 pr-2 h-auto"> <?= $resultado[0]['contato'] ?>
									</p>
								</div>

								<div class="col-12">
									<div class="bg-light pr-2 pl-2 rounded text-dark font-weight-bold">ENDEREÇO</div>
									<p class="form-control bg-light text-dark pl-2 pr-2 h-auto"> <?= $resultado[0]['endereco'] ?>
									</p>
								</div>

								<div class="col-12">
									<div class="bg-light pr-2 pl-2 rounded text-dark font-weight-bold">CIDADE/UF</div>
									<p class="form-control bg-light text-dark pl-2 pr-2 h-auto"> <?= $resultado[0]['cidade_uf'] ?>
									</p>
								</div>

								<div class="col-12">
									<div class="bg-light pr-2 pl-2 rounded text-dark font-weight-bold">DATA CADASTRO</div>
									<p class="form-control bg-light text-dark pl-2 pr-2 h-auto"> <?= date_format(date_create($resultado[0]['data_cadastro']), "d/m/Y") ?>
									</p>
								</div>

								<div class="col-12">
									<div class="bg-light pr-2 pl-2 rounded text-dark font-weight-bold">DATA AGENDAMENTO</div>
									<p class="form-control bg-light text-dark pl-2 pr-2 h-auto"> <?= date_format(date_create($resultado[0]['data_agendamento']), "d/m/Y") ?>
									</p>
								</div>

								<div class="col-12">
									<div class="bg-light pr-2 pl-2 rounded text-dark font-weight-bold">SITUAÇÃO PAGAMENTO</div>
									<p class="form-control bg-light text-dark pl-2 pr-2 h-auto"><?= $resultado[0]['sit_pagamento'] ?>
									</p>
								</div>


								<div class="col-12">
									<div class="bg-light pr-2 pl-2 rounded text-dark font-weight-bold">STATUS</div>
									<p class="form-control bg-light text-dark pl-2 pr-2 h-auto"><?= $resultado[0]['status'] ?>
									</p>
								</div>

								<div class="col-12">
									<div class="bg-light pr-2 pl-2 rounded text-dark font-weight-bold">OBSERVAÇÃO</div>
									<p class="form-control bg-light text-dark pl-2 pr-2 h-auto"> <?= $resultado[0]['observacao'] ?>
									</p>
								</div>

							</div>

					<?php

						} else {
							echo "<div class='bg-danger text-light p-2'><strong>REGISTRO NÃO ENCONTRADO.</strong></div>";
						}
					}

					?>
				</div>
			</div>
		</div>
		<!-- rodapé -->
		<?php require_once 'includes/rodape.php'; ?>
	</div>
	<?php require_once 'includes/bootstrap-js.php'; ?>
</body>

</html>