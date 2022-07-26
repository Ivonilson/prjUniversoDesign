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
	<title>Lançar Planejamento</title>
	<?php require_once 'includes/bootstrap-css.php'; ?>
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
					Financeiro
				</li>
				<li class="breadcrumb-item">
					<mark class="p-2 font-weight-bold">Planejamento</mark>
				</li>

				<div class="col">
					<a href="/?pagina=planejamento" class="btn btn-danger text-light float-right font-weight-bold rounded" data-bs-toggle="tooltip" data-bs-placement="bottom" title="Incluir mês/ano"><i class="fa fa-search"></i>  Ver planejamento</a>
				</div>

			</ol>

			<div class="row justify-content-center">

				<!--<div class="col">
					<a href="?pagina=cadastrar-orcamento" class="botoes-atalho-cad" data-bs-toggle="tooltip" data-bs-placement="bottom" title="Novo Orçamento"><i class="fa fa-plus " aria-hidden="true"></i> Orçamento </a>
				</div>

				<div class="col">
					<a href="?pagina=cadastrar-cliente" class="botoes-atalho-cad" data-bs-toggle="tooltip" data-bs-placement="bottom" title="Novo Cliente"><i class="fa fa-plus " aria-hidden="true"></i> Cliente </a>
				</div>

				<div class="col">
					<a href="?pagina=cadastrar-produto" class="botoes-atalho-cad" data-bs-toggle="tooltip" data-bs-placement="bottom" title="Novo Produto"><i class="fa fa-plus " aria-hidden="true"></i> Produto </a>
				</div>

				<div class="col">
					<a href="?pagina=cadastrar-notificacao" class="botoes-atalho-cad" data-bs-toggle="tooltip" data-bs-placement="bottom" title="Cadastrar Notificação"><i class="fa fa-plus " aria-hidden="true"></i> Notificação </a>
				</div>

			</div> 

		-->

				<br>

				<div class="row" id="background-tela-cadastro">

					<form class="container background-form-cadastro" method="post">

						<div id="jumbotron_telas_cadastro">
							<div class="container">
								<h4>Lançar planejamento</h4>
							</div>

							<div class="col text-right mb-0">
								<button type="button" class="text-light btn btn-secondary" data-toggle="modal" data-target="#md-ultimo-planejamento">Ver último planejamento lançado</button>
							</div>

						</div>

						<?php
						if ($mensagem_erro == "Planejamento lançado com sucesso!") {
						?>

							<div class="alert alert-success font-weight-bold alertaCadOsOk col-12 text-center" role="alert">
								<img src="../assets/ok.png">
								<h5><strong><?= $mensagem_erro ?></strong></h5>
							</div>

						<?php
						} elseif ($mensagem_erro == "ERRO. Verifique se o mês/ano que está tentando cadastrar já exista no sistema e tente novamente. Caso o problema persista, contate o Suporte.") {
						?>

							<div class="alert alert-warning font-weight-bold text-danger alertaCadOsNoOk col-12 text-center" role="alert">
								<img src="../assets/error.png">
								<h5><strong><?= $mensagem_erro ?></strong></h5>
							</div>

						<?php
						} 
						?>

						<!-- Modal último planejamento lançado -->
						<div class="modal fade offset-0 col-12 offset-0" id="md-ultimo-planejamento" tabindex="-1" role="dialog" aria-labelledby="exampleModalLongTitle" aria-hidden="true">
							<div class="modal-dialog" role="document">
								<div class="modal-content">
									<div class="modal-header">
										<h5 class="modal-title" id="exampleModalLongTitle">ID: <?= $UltimoPlanejamentoCadastrado != null ? $UltimoPlanejamentoCadastrado['id_plan_rec_desp'] : '- Nenhum planejamento cadastrado.';  ?></h5>
										<button type="button" class="close" data-dismiss="modal" aria-label="Close">
											<span aria-hidden="true">&times;</span>
										</button>
									</div>
									<div class="modal-body">

										<div class="card">
											<div class="card-body col">

												<br><span class="font-weight-bold text-dark" style="font-size: 20px">Mês/Ano: </span><span style="font-size: 22px"><?= $UltimoPlanejamentoCadastrado != null ?  $UltimoPlanejamentoCadastrado['mes_ano_planejado'] : '-'; ?></span><br>

												<br><span class="font-weight-bold text-dark" style="font-size: 20px">Valor Receita (R$): </span><span style="font-size: 22px"><?= $UltimoPlanejamentoCadastrado != null ?  number_format($UltimoPlanejamentoCadastrado['valor_receita'], 2, ',', '.') : '-'; ?></span><br>

												<br><span class="font-weight-bold text-dark" style="font-size: 20px">Valor Despesa (R$): </span><span style="font-size: 22px"><?= $UltimoPlanejamentoCadastrado != null ?  number_format($UltimoPlanejamentoCadastrado['valor_despesa'], 2, ',', '.') : '-'; ?></span><br>

												<br><span class="font-weight-bold text-dark" style="font-size: 20px">Cadastrado em: </span><span style="font-size: 22px"><?= $UltimoPlanejamentoCadastrado != null ? date_format(date_create($UltimoPlanejamentoCadastrado['data_processamento']), "d/m/Y") : '-'; ?></span><br><br>

												<div class="row">
													<a href="#" class="card-link btn btn-danger  col-sm col-xs col " data-toggle="modal" data-target="#md-editar">Editar</a>
												</div>

											</div>
										</div>

									</div>

									<!--  <div class="modal-footer col-5">
					        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
					        <button type="button" class="btn btn-primary">Save changes</button>
					      </div> -->


								</div>
							</div>
						</div>

						<div class="form-row align-items-center">

                            <div class="col-lg-3 col-md-12 col-sm-12 col-xs-12">
								<label class="sr-only" for="inlineFormInputEndereco">MÊS/ANO</label>
								<input type="text" class="form-control mb-2" id="inlineFormInputEndereco" placeholder="Ex: JANEIRO/2022 " name="ipt-mes-ano-planejado" required>
							</div>

							<div class="col-lg-3 col-md-12 col-sm-12 col-xs-12">
								<label class="sr-only" for="inlineFormInputEndereco">VALOR RECEITA (R$)</label>
								<input type="text" class="form-control mb-2" id="inlineFormInputEndereco" placeholder="Valor em R$ " name="ipt-valor-receita" required>
							</div>

                            <div class="col-lg-3 col-md-12 col-sm-12 col-xs-12">
								<label class="sr-only" for="inlineFormInputEndereco">VALOR DESPESA (R$)</label>
								<input type="text" class="form-control mb-2" id="inlineFormInputEndereco" placeholder="Valor em R$ " name="ipt-valor-despesa" required>
							</div>

							<input type="submit" value="Gravar" name="btnCadastrar" id="botoesGravarCad">

							<?php 
							
								//var_dump($UltimoPlanejamentoCadastrado); 
								//echo "<br>";
								//var_dump($mes_ano_existe);
							
							?>

					</form>
				</div>

				<?php require_once 'includes/rodape.php'; ?>

			</div>
		</div>

		<!-- MODAL EDITAR PLANEJAMENTO --->
		<div class="modal fade" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel" aria-hidden="true" id="md-editar">
			<div class="modal-dialog modal-lg">
				<div class="modal-content">

					<div class="modal-body">
						<div class="row justify-content-center">

							<h3 class="text-primary col-12 text-center mt-5">Alterando planejamento <label class="border p-3 text-danger font-weight-bold"><?= $UltimoPlanejamentoCadastrado['id_plan_rec_desp'] ?></label></h3>

							<form method="post">

								<div class="col-12">
									<label class="text-danger font-weight-bold readonly">ID</label>
									<br>
									<input class="form-control" type="text" value="<?= $UltimoPlanejamentoCadastrado['id_plan_rec_desp'] ?>" disabled>
									<input class="form-control" type="hidden" name="ipt-id-planejamento-edicao" value="<?= $UltimoPlanejamentoCadastrado['id_plan_rec_desp'] ?>">
								</div>

                                <div class="col-12">
									<label class="text-danger font-weight-bold">Mês/Ano</label>
									<br>
									<input class="form-control" type="text" name="ipt-mes-ano-planejado-edicao" value="<?= $UltimoPlanejamentoCadastrado['mes_ano_planejado'] ?>">
								</div>

								<div class="col-12">
									<label class="text-danger font-weight-bold">Valor Receita (R$)</label>
									<br>
									<input class="form-control" type="text" name="ipt-valor-receita" value="<?= number_format($UltimoPlanejamentoCadastrado['valor_receita'], 2, ',' , '') ?>">
								</div>

                                <div class="col-12">
									<label class="text-danger font-weight-bold">Valor Despesa (R$)</label>
									<br>
									<input class="form-control" type="text" name="ipt-valor-despesa" value="<?= number_format($UltimoPlanejamentoCadastrado['valor_despesa'], 2, ',', '') ?>">
								</div>

								<div class="col-12">
									<label class="text-danger text-light">-</label>
									<br>
									<input class="form-control btn btn-success" type="submit" name="btnEditarPlanejado" value="Gravar" style="font-weight: bold !important;">
								</div>

							</form>

						</div>

					</div>

				</div>
			</div>
		</div>

		<?php require_once 'includes/bootstrap-js.php'; ?>
</body>

</html>