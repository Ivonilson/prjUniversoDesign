<?php
if ($_SESSION['user'] == null) {
	header('Location: index.php');
}
?>
<!DOCTYPE html>
<html lang="pt-br">

<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
	<title>Cadastro de Cliente</title>
	<?php require_once 'includes/bootstrap-css.php' ?>

</head>

<body class="bg-dark fixed-nav sticky-footer" id="page-top">
	<!-- NAVEGAÇÃO -->
	<?php
	require 'includes/navegacao.php';
	?>

	<div class="content-wrapper">
		<div class="container-fluid">
			<ol class="breadcrumb">
				<li class="breadcrumb-item">
					<a href="?pagina=os-do-dia" class="text-decoration-none">Início</a>
				</li>
				<li class="breadcrumb-item">
					Registros
				</li>
				<li class="breadcrumb-item">
					<mark class="p-2 font-weight-bold">Cadastrar Cliente</mark>
				</li>

				<div class="col">
					<a href="/?pagina=cadastrar-cidade" class="btn btn-danger text-light float-right font-weight-bold rounded" data-bs-toggle="tooltip" data-bs-placement="bottom" title="Incluir nova Cidade"><i class="fa fa-plus"></i> Cidade</a>
				</div>
				
			</ol>

			<div class="row justify-content-center">

				<div class="col">
					<a href="?pagina=cadastrar-orcamento" class="botoes-atalho-cad" data-bs-toggle="tooltip" data-bs-placement="bottom" title="Novo Orçamento"><i class="fa fa-plus " aria-hidden="true"></i> Orçamento </a>
				</div>

				<div class="col">
					<a href="?pagina=cadastrar-os" class="botoes-atalho-cad" data-bs-toggle="tooltip" data-bs-placement="bottom" title="Nova O.S"><i class="fa fa-plus " aria-hidden="true"></i> O.S </a>
				</div>

				<div class="col">
					<a href="?pagina=cadastrar-produto" class="botoes-atalho-cad" data-bs-toggle="tooltip" data-bs-placement="bottom" title="Novo produto"><i class="fa fa-plus " aria-hidden="true"></i> Produto</a>
				</div>

				<div class="col">
					<a href="?pagina=cadastrar-notificacao" class="botoes-atalho-cad" data-bs-toggle="tooltip" data-bs-placement="bottom" title="Cadastrar notificação"><i class="fa fa-plus " aria-hidden="true"></i> Notificação</a>
				</div>

			</div>

			<br>

			<div class="row" id="background-tela-cadastro">

				<form class="container background-form-cadastro" method="post">

					<div id="jumbotron_telas_cadastro">
						<div class="container">
							<h4>Cadastrar Cliente</h4>

							<div class="col text-right mb-0">
								<button type="button" class="text-light btn btn-secondary" data-toggle="modal" data-target="#md-ultimo-cliente">Ver último cliente cadastrado</button>
							</div>

						</div>
					</div>


					<!-- Modal -->
					<div class="modal fade offset-3 col-6 offset-3" id="md-ultimo-cliente" tabindex="-1" role="dialog" aria-labelledby="exampleModalLongTitle" aria-hidden="true">
						<div class="modal-dialog" role="document">
							<div class="modal-content">
								<div class="modal-header">
									<h5 class="modal-title" id="exampleModalLongTitle">Código Cliente: <?= $UltimoClienteCadastrado != null ? $UltimoClienteCadastrado['id_cliente'] : '- Nenhum orçamento cadastrado.';  ?></h5>
									<button type="button" class="close" data-dismiss="modal" aria-label="Close">
										<span aria-hidden="true">&times;</span>
									</button>
								</div>
								<div class="modal-body">

									<div class="card">
										<div class="card-body col">

											<h5 class="card-title font-weight-bold text-dark">Nome: <?= $UltimoClienteCadastrado != null ? $UltimoClienteCadastrado['nome']  : '-'  ?></h5>	

											<br><span class="font-weight-bold text-dark" style="font-size: 20px">CPF/CNPJ: </span><span style="font-size: 22px"><?= $UltimoClienteCadastrado != null ? $UltimoClienteCadastrado['cpf_cnpj'] : '-' ?></span><br>

											<br><span class="font-weight-bold text-dark" style="font-size: 20px">Endereço: </span><span style="font-size: 22px"><?= $UltimoClienteCadastrado != null ? $UltimoClienteCadastrado['endereco'] : '-' ?></span><br>

											<br><span class="font-weight-bold text-dark" style="font-size: 20px">Bairro: </span><span style="font-size: 22px"><?= $UltimoClienteCadastrado != null ? $UltimoClienteCadastrado['bairro'] : '-' ?></span><br>

											<br><span class="font-weight-bold text-dark" style="font-size: 20px">Cidade/UF: </span><span style="font-size: 22px"><?= $UltimoClienteCadastrado != null ? $UltimoClienteCadastrado['cidade_uf'] : '-' ?></span><br>

											<br><span class="font-weight-bold text-dark" style="font-size: 20px">Telefone Fixo: </span><span style="font-size: 22px"><?= $UltimoClienteCadastrado != null ? $UltimoClienteCadastrado['tel_fixo'] : '-' ?></span><br>

											<br><span class="font-weight-bold text-dark" style="font-size: 20px">Celular: </span><span style="font-size: 22px"><?= $UltimoClienteCadastrado != null ? $UltimoClienteCadastrado['tel_cel'] : '-' ?></span><br>

											<br><span class="font-weight-bold text-dark" style="font-size: 20px">E-mail: </span><span style="font-size: 22px"><?= $UltimoClienteCadastrado != null ? $UltimoClienteCadastrado['email'] : '-' ?></span><br>

											<br><span class="font-weight-bold text-dark" style="font-size: 20px">Cadastrado em: </span><span style="font-size: 22px"><?= $UltimoClienteCadastrado != null ? date_format(date_create($UltimoClienteCadastrado['data_cadastro']), "d/m/Y") : '-' ?></span><br>

											<br>

											<div class="row">
												<a href="/?pagina=editar-cliente&id_cliente=<?=$UltimoClienteCadastrado['id_cliente'] ?>&form=cadastrar-cliente" class="card-link btn btn-danger  col-sm col-xs col">Editar</a>

												<a href="/?pagina=pesquisa-cliente" class="card-link btn btn-info  col-sm col-xs col">Pesquisar Clientes</a>
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

						<div class="col-lg-5 col-md-12 col-sm-12 col-xs-12">
							<label class="sr-only" for="inlineFormInputNome">Nome</label>
							<input type="text" class="form-control mb-2" id="inlineFormInputNome" placeholder="Nome" name="ipt-nome" required>

						</div>

						<div class="col-lg-2 col-md-12 col-sm-12 col-xs-12">
							<div class="input-group mb-2 border">
								<div class="input-group-prepend">
									<label class="input-group-text bg-secondary text-white" for="inlineRadioPJ">PJ</label>
								</div>
								<input type="radio" class="form-control mt-1 mb-1 reset" id="inlineRadioPJ" name="ipt-radio-pf-pj" value="PJ">
							</div>
						</div>

						<div class="col-lg-2 col-md-12 col-sm-12 col-xs-12">
							<div class="input-group mb-2 border">
								<div class="input-group-prepend">
									<label class="input-group-text bg-secondary text-white" for="inlineRadioPF">PF</label>
								</div>
								<input type="radio" class="form-control mt-1 mb-1 reset" id="inlineRadioPF" name="ipt-radio-pf-pj" value="PF">
							</div>
						</div>

						<div class="col-lg-3 col-md-12 col-sm-12 col-xs-12">
							<label class="sr-only" for="inlineFormInputCpfCnpj">CPF</label>
							<input type="text" class="form-control mb-2" id="inlineFormInputCpfCnpj" name="ipt-cpf-cnpj" required>
						</div>

						<div class="col-lg-6 col-md-12 col-sm-12 col-xs-12">
							<label class="sr-only" for="inlineFormIputEndereco">Endereço</label>
							<input type="text" class="form-control mb-2" id="inlineFormInputEndereco" placeholder="Endereço" name="ipt-endereco" required>
						</div>

						<div class="col-lg-6 col-md-12 col-sm-12 col-xs-12">
							<label class="sr-only" for="inlineFormIputBairro">Bairro</label>
							<input type="text" class="form-control mb-2" id="inlineFormInputBairro" placeholder="Bairro" name="ipt-bairro" required>
						</div>

						<div class="col-lg-6 col-md-12 col-sm-12 col-xs-12">
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

						<div class="col-lg-6 col-md-12 col-sm-12 col-xs-12">
							<label class="sr-only" for="inlineFormInputTelFixo">Telefone Fixo</label>
							<input type="text" class="form-control mb-2" id="inlineFormInputTelFixo" placeholder="Telefone Fixo (opcional)" name="ipt-tel-fixo">
						</div>

						<div class="col-lg-6 col-md-12 col-sm-12 col-xs-12">
							<label class="sr-only" for="inlineFormInputTelCel">Telefone Celular</label>
							<input type="text" class="form-control mb-2" id="inlineFormInputTelCel" placeholder="Telefone Celular" name="ipt-tel-cel" required>
						</div>

						<div class="col-lg-6 col-md-12 col-sm-12 col-xs-12">
							<label class="sr-only" for="inlineFormInputEmail">E-mail</label>
							<input type="email" class="form-control mb-2" id="inlineFormInputEmail" placeholder="E-mail (opcional)" name="ipt-email">
						</div>

						<input type="submit" id="botoesGravarCad" value="Gravar Cliente" name="btnCadastrarCliente">


						<?php
						if ($mensagem_erro == "Cadastrado realizado com sucesso!") {
						?>

							<div class="alert alert-success font-weight-bold alertaCadOsOk col-12 text-center" role="alert">
								<img src="../assets/ok.png">
								<h5><strong><?= $mensagem_erro ?></strong></h5>
							</div>

						<?php
						} elseif ($mensagem_erro == "ERRO. Provavelmente o cliente com este CPF/CNPJ já esteja cadastrado. Por favor verifique o CPF que está tentando cadastrar. Caso o problema persista, contate o Suporte.") {
						?>

							<div class="alert alert-warning font-weight-bold text-danger alertaCadOsNoOk col-12 text-center" role="alert">
								<img src="../assets/error.png">
								<h5><strong><?= $mensagem_erro ?></strong></h5>
							</div>

						<?php

						} elseif ($mensagem_erro == "Erro ao cadastrar. Verifique se o campo PRODUTO possui uma descrição válida. Caso o problema persista, contate o Suporte.") {
						?>

							<div class="alert alert-warning font-weight-bold text-danger alertaCadOsNoOk col-12 text-center" role="alert">
								<img src="../assets/error.png">
								<h5><strong><?= $mensagem_erro ?></strong></h5>
							</div>

						<?php
						}
						?>

					</div>
				</form>
			</div>
		</div>

		<?php
		require_once 'includes/rodape.php';
		?>
	</div>

	<?php require_once 'includes/bootstrap-js.php'; ?>
</body>

</html>