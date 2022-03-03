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
	<title>Atualizar cliente</title>
	<?php require_once 'includes/bootstrap-css.php'; ?>
</head>

<body class="bg-dark fixed-nav sticky-footer" id="page-top">
	<!-- NAVEGAÇÃO -->
	<?php require_once 'includes/navegacao.php';?>
	
	<div class="content-wrapper" id="background-tela-edicao">
		<div class="container-fluid">
			<ol class="breadcrumb">
				<li class="breadcrumb-item">
					<a href="?pagina=os-do-dia" class="text-decoration-none">Home</a>
				</li>
				<li class="breadcrumb-item">
					Registros
				</li>
				<li class="breadcrumb-item">
					Atualizar Cliente
				</li>
			</ol>
	
			<div id="row-form-edicao">
				
				<form class="container background-form-edicao" method="post">

					<div id="jumbotron_telas_edicao">
						<div class="container">
							<h4>Atualizar cliente</h4>
						</div>
					</div>

					<div class="form-row align-items-center">

						<div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
							<label class="sr-only" for="inlineFormInputNome">Código</label>
							<input type="hidden" class="form-control mb-2" id="inlineFormInputNome" name="ipt-id-cliente" value="<?=$registro->id_cliente?>">
						</div>

						<div class="col-lg-2 col-md-12 col-sm-12 col-xs-12">
							<div class="input-group mb-2">
								<div class="input-group-prepend">
									<div class="input-group-text bg-secondary text-white">
										Código
									</div>
								</div>
								<input type="input" class="form-control" name="ipt-id-cliente" value="<?=$registro->id_cliente?>" disabled>
							</div>
						</div>

						<div class="col-lg-7 col-md-12 col-sm-12 col-xs-12">
							<div class="input-group mb-2">
								<div class="input-group-prepend">
									<div class="input-group-text bg-secondary text-white">
										Nome
									</div>
								</div>
								<input type="input" class="form-control" name="ipt-nome" value="<?=$registro->nome?>">
							</div>
						</div>

						<div class="col-lg-3 col-md-12 col-sm-12 col-xs-12">
							<div class="input-group mb-2">
								<div class="input-group-prepend">
									<div class="input-group-text bg-secondary text-white">
										CPF/CNPJ
									</div>
								</div>
								<input type="input" class="form-control" name="ipt-cpf-cnpj" value="<?=$registro->cpf_cnpj?>">
							</div>
						</div>

						<div class="col-lg-5 col-md-12 col-sm-12 col-xs-12">
							<div class="input-group mb-2">
								<div class="input-group-prepend">
									<div class="input-group-text bg-secondary text-white">
										Endereço
									</div>
								</div>
								<input type="input" class="form-control" name="ipt-endereco" value="<?=$registro->endereco?>">
							</div>
						</div>

						<div class="col-lg-3 col-md-12 col-sm-12 col-xs-12">
							<div class="input-group mb-2">
								<div class="input-group-prepend">
									<div class="input-group-text bg-secondary text-white">
										Bairro
									</div>
								</div>
								<input type="input" class="form-control" name="ipt-bairro" value="<?=$registro->bairro?>">
							</div>
						</div>

						<div class="col-lg-4 col-md-12 col-sm-12 col-xs-12">
							<div class="input-group mb-2">
								<div class="input-group-prepend">
									<label class="input-group-text bg-secondary text-white" for="select-cidade">
										Cidade
									</label>
								</div>
								<select class="custom-select" name="sel-cidade-uf" id="select-cidade">
									<option value="<?=$registro->cidade_uf?>"><?=$registro->cidade_uf?></option>

									<?php 
										$cidade = new Cidade();
										$cidades = $cidade->carregaCidades();

										foreach ($cidades as $value) {
												
									?>
									<option value="<?=$value['nome_cidade'].'/'.$value['uf']?>"><?=$value['nome_cidade'].'/'.$value['uf']?></option>

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
										Tel. Fixo
									</div>
								</div>
								<input type="input" class="form-control" name="ipt-tel-fixo" value="<?=$registro->tel_fixo?>">
							</div>
						</div>

						<div class="col-lg-4 col-md-12 col-sm-12 col-xs-12">
							<div class="input-group mb-2">
								<div class="input-group-prepend">
									<div class="input-group-text bg-secondary text-white">
										Tel. Celular
									</div>
								</div>
								<input type="input" class="form-control" name="ipt-tel-cel" value="<?=$registro->tel_cel?>">
							</div>
						</div>

						<div class="col-lg-4 col-md-12 col-sm-12 col-xs-12">
							<div class="input-group mb-2">
								<div class="input-group-prepend">
									<div class="input-group-text bg-secondary text-white">
										E-mail
									</div>
								</div>
								<input type="input" class="form-control" name="ipt-email" value="<?=$registro->email?>">
							</div>
						</div>

						<input type="submit" id="btnGravarEdicao" value="GRAVAR" name="btnEditarCliente">

					<?php
						if($mensagem_erro == "Cliente atualizado com Sucesso!")
						{
					?>

					<div class="alert alert-success font-weight-bold alertaCadOsOk col-12 text-center" role="alert">
 						<img src="../assets/ok.png"><h5><strong><?=$mensagem_erro?></strong></h5>
					</div>

					<?php   
						if($_GET['form']  == 'os-do-dia' || $_GET['form'] == 'lista-agendamentos'){
					?>

					<a href="/?pagina=<?=$_GET['form']?>" class="btn btn-success btn-lg mt-1 mb-1">Retornar</a>		

					<?php  
					    }
					?>		


					<?php 

						} else if($mensagem_erro == "ERRO. Verifique se você REALMENTE alterou alguma coisa ou Contate o Suporte.") {
					?>

					<div class="alert alert-warning font-weight-bold text-danger alertaCadOsNoOk col-12 text-center" role="alert">
 						<img src="../assets/error.png"><h5><strong><?=$mensagem_erro?></strong></h5>
					</div>

					<?php
						}
					?>

					</div>
				</form>
			</div>	
		</div>
	</div>

		<?php require_once 'includes/rodape.php';?>
	</div>

	<?php require_once 'includes/bootstrap-js.php'; ?>
</body>
</html>