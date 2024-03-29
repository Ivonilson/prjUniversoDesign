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
	<title>Cadastro de O.S</title>
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
					Ordem de Serviço
				</li>
				<li class="breadcrumb-item">
					<mark class="p-2 font-weight-bold">Cadastrar O.S.</mark>
				</li>
			</ol>

			<div class="row justify-content-center">

				<div class="col">
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

			<br>

			<div class="row" id="background-tela-cadastro">

				<form class="container background-form-cadastro" method="post">

					<div id="jumbotron_telas_cadastro">
						<div class="container">
							<h4>Cadastrar O.S</h4>
						</div>

						<div class="col text-right mb-0">
								<button type="button" class="text-light btn btn-secondary" data-toggle="modal" data-target="#md-ultima-os">Ver última O.S. cadastrada</button>
						</div>

					</div>

					<?php
						if ($mensagem_erro == "Ordem de Serviço cadastrada com Sucesso!") {
						?>

							<div class="alert alert-success font-weight-bold alertaCadOsOk col-12 text-center" role="alert">
								<img src="../assets/ok.png">
								<h5><strong><?= $mensagem_erro ?></strong></h5>
							</div>

						<?php
						} elseif ($mensagem_erro == "ERRO. Provavelmente a O.S. que está tentando cadastrar já exista no sistema. Caso o problema persista, contate o Suporte.") {
						?>

							<div class="alert alert-warning font-weight-bold text-danger alertaCadOsNoOk col-12 text-center" role="alert">
								<img src="../assets/error.png">
								<h5><strong><?= $mensagem_erro ?></strong></h5>
							</div>

						<?php
						} elseif ($mensagem_erro == "Um Orçamento precisa ser selecionado para a ordem de serviço. Selecione um orçamento e Tente Novamente.") {
						?>

							<div class="alert alert-warning font-weight-bold text-danger alertaCadOsNoOk col-12 text-center" role="alert">
								<img src="../assets/error.png">
								<h5><strong><?= $mensagem_erro ?></strong></h5>
							</div>

						<?php
						}
						?>

					<!-- Modal -->
					<div class="modal fade offset-0 col-12 offset-0" id="md-ultima-os" tabindex="-1" role="dialog" aria-labelledby="exampleModalLongTitle" aria-hidden="true">
						<div class="modal-dialog" role="document">
							<div class="modal-content">
								<div class="modal-header">
									<h5 class="modal-title" id="exampleModalLongTitle">O.S. n°: <?= $UltimaOsCadastrada != null ? $UltimaOsCadastrada['cod_os'] : '- Nenhuma O.S. cadastrada.';  ?></h5>
									<button type="button" class="close" data-dismiss="modal" aria-label="Close">
										<span aria-hidden="true">&times;</span>
									</button>
								</div>
								<div class="modal-body">

									<div class="card">
										<div class="card-body col">

											<h5 class="card-title font-weight-bold text-dark">Ref. orçamento n°: <?= $UltimaOsCadastrada != null ? $UltimaOsCadastrada['id_orcamento']  : '-';  ?></h5>	

											<br><span class="font-weight-bold text-dark" style="font-size: 20px">Contato: </span><span style="font-size: 22px"><?= $UltimaOsCadastrada != null ?  $UltimaOsCadastrada['contato'] : '-'; ?></span><br>

											<br><span class="font-weight-bold text-dark" style="font-size: 20px">Endereço: </span><span style="font-size: 22px"><?= $UltimaOsCadastrada != null ?  $UltimaOsCadastrada['endereco'] : '-'; ?></span><br>

											<br><span class="font-weight-bold text-dark" style="font-size: 20px">Cidade: </span><span style="font-size: 22px"><?= $UltimaOsCadastrada != null ?  $UltimaOsCadastrada['cidade_uf'] : '-'; ?></span><br>

											<br><span class="font-weight-bold text-dark" style="font-size: 20px">Agendado para: </span><span style="font-size: 22px"><?= $UltimaOsCadastrada != null ? date_format(date_create($UltimaOsCadastrada['data_agendamento']), "d/m/Y") : '-'; ?></span><br>

											<span class="font-weight-bold text-dark" style="font-size: 20px">Cadastrado em: </span><span style="font-size: 22px"><?= $UltimaOsCadastrada != null ? date_format(date_create($UltimaOsCadastrada['data_cadastro']), "d/m/Y") : '-'; ?></span><br><br>

											<div class="row">
												<a href="/?pagina=editar-os&cod_os=<?=$UltimaOsCadastrada['cod_os'] ?>&form=cadastrar-os" class="card-link btn btn-danger  col-sm col-xs col">Editar</a>

												<a href="/?pagina=pesquisa-por-os" class="card-link btn btn-info  col-sm col-xs col">Pesquisar O.S</a>
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

						<div class="col-lg-2 col-md-12 col-sm-12 col-xs-12">
							<label class="sr-only" for="inlineFormInputOs">Nº O.S</label>

							<input type="hidden" class="form-control mb-2" id="inlineFormInputOs" placeholder="Nº O.S" value="<?= $codigo ?>" name="ipt-os" required>

							<?php //var_dump($codigo); 
							?>

							<input type="text" class="form-control mb-2" id="inlineFormInputOs" placeholder="Nº O.S" value="<?= $codigo ?>" disabled>

						</div>

						<div class="col-lg-6 col-md-12 col-sm-12 col-xs-12">
							<div class="input-group mb-2">
								<div class="input-group-prepend">
									<label class="input-group-text bg-secondary text-white" for="select-orcamento">
										N° ORÇAMENTO
									</label>
								</div>
								<select class="custom-select" name="sel-orcamento" id="select-orcamento">
									<option value="-">Selecione</option>
									<?php
									foreach ($carregaOrcamento as $orcamentos) {

									?>
										<option value="<?= $orcamentos->orcamento ?>"><?= $orcamentos->orcamento . ' - ' . $orcamentos->nome ?></option>
									<?php
									}
									?>
								</select>
							</div>
						</div>

						<div class="col-lg-4 col-md-12 col-sm-12 col-xs-12">
							<div class="input-group mb-2">
								<div class="input-group-prepend">
									<div class="input-group-text bg-secondary text-white">
										AGENDAR
									</div>
								</div>
								<input type="date" class="form-control" name="ipt-data-agendamento">
							</div>
						</div>

						<div class="col-lg-5 col-md-12 col-sm-12 col-xs-12">
							<div class="input-group mb-2">
								<div class="input-group-prepend">
									<label class="input-group-text bg-secondary text-white" for="select-cidade">
										CIDADE
									</label>
								</div>
								<select class="custom-select" name="sel-cidade-uf" id="select-cidade">
									<option value="-">Selecione</option>

									<?php
									$cidade = new Cidade();
									$cidades = $cidade->carregaCidades();

									foreach ($cidades as $value) {

									?>
										<option value="<?= $value['nome_cidade'] . '/' . $value['uf'] ?>"><?= $value['nome_cidade'] . '/' . $value['uf'] ?></option>

									<?php

									}

									?>

								</select>
							</div>
						</div>

						<div class="col-lg-7 col-md-12 col-sm-12 col-xs-12">
							<label class="sr-only" for="inlineFormInputEndereco">ENDEREÇO</label>
							<input type="text" class="form-control mb-2" id="inlineFormInputEndereco" placeholder="Digite o endereço" name="ipt-endereco" required>
						</div>

						<div class="col-lg-5 col-md-12 col-sm-12 col-xs-12">
							<label class="sr-only" for="inlineFormInputContato">CONTATO</label>
							<input type="text" class="form-control mb-2" id="inlineFormInputContato" placeholder="Contato/Telefone" name="ipt-contato" required>
						</div>

						<!--  Será transportado para o Cadastro de Orçamento
						<div class="col-lg-2 col-md-12 col-sm-12 col-xs-12">
							<label class="sr-only" for="inlineFormInputValorServico">VALOR SERVIÇO</label>
							<input type="text" class="form-control mb-2" id="inlineFormInputValorServico" placeholder="Valor do Serviço" name="ipt-valor-servico" requerid>
						</div>
						-->

						<div class="col-lg-3 col-md-12 col-sm-12 col-xs-12">
							<div class="input-group mb-2">
								<div class="input-group-prepend">
									<label class="input-group-text bg-secondary text-white" for="select-situacao-pag">
										PAGAMENTO
									</label>
								</div>
								<select class="custom-select" name="sel-pagamento" id="select-situacao-pag">
									<option value="-">Selecione</option>
									<option value="PENDENTE">PENDENTE</option>
									<option value="PAGO">PAGO</option>
								</select>
							</div>
						</div>

						<!-- Será transferido para Cadastro de Orçamento
						<div class="col-lg-5 col-md-12 col-sm-12 col-xs-12">
							<div class="input-group mb-2">
								<div class="input-group-prepend">
									<label class="input-group-text bg-secondary text-white" for="select-meio-pag">
										MEIO PAGAMENTO
									</label>
								</div>
								<select class="custom-select" name="sel-meio-pagamento" id="select-meio-pag">
									<option value="-">Selecione</option>
									<option value="DINHEIRO">DINHEIRO</option>
									<option value="CARTÃO CRÉDITO">CARTÃO CRÉDITO</option>
									<option value="CARTÃO DÉBITO">CARTÃO DÉBITO</option>
									<option value="TRANSFERÊNCIA BANCÁRIA">TRANSFERÊNCIA BANCÁRIA</option>
									<option value="BOLETO">BOLETO</option>
								</select>
							</div>
						</div>
					-->

						<div class="col-lg-4 col-md-12 col-sm-12 col-xs-12">
							<div class="input-group mb-2">
								<div class="input-group-prepend">
									<label class="input-group-text bg-secondary text-white" for="sel-status">
										STATUS SERVIÇO
									</label>
								</div>
								<select class="custom-select" name="sel-status-servico" id="sel-status">
									<option value="-">Selecione</option>
									<option value="PENDENTE">PENDENTE</option>
									<option value="FINALIZADO">FINALIZADO</option>
									<option value="SUSPENSO">SUSPENSO</option>
									<option value="CANCELADO">CANCELADO</option>
								</select>
							</div>
						</div>

					</div>

					<div class="form-row align-items-center">


					</div>

					<div class="form-row align-items-center">


					</div>

					<div class="form-row align-items-center">

						<div class="col-12">
							<label class="sr-only" for="inlineFormInputObservacoesComplementares">OBSERVAÇÕES COMPLEMENTARES</label>
							<textarea type="text" class="form-control mb-2" id="inlineFormInputObservacoesComplementares" cols="100" rows="3" placeholder="Observações" name="ta-observacoes"></textarea>
						</div>

						<input type="submit" value="Gravar O.S." name="btnCadastrar" id="botoesGravarCad">

					</div>
				</form>
			</div>

			<?php require_once 'includes/rodape.php'; ?>

		</div>
	</div>

	<?php require_once 'includes/bootstrap-js.php'; ?>
</body>

</html>