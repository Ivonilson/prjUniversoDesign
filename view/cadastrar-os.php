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
	<!--<link rel="stylesheet" type="text/css" href="../bibliotecas/bootstrap/css/bootstrap.min.css">-->
	<link rel="stylesheet" type="text/css" href="../css/bootstrap2.min.css">
	<link rel="stylesheet" type="text/css" href="../bibliotecas/font-awesome/css/font-awesome.min.css">
	<link rel="stylesheet" type="text/css" href="../css/sb-admin.min.css">
	<link rel="stylesheet" type="text/css" href="../css/abg.css">
</head>
<body class="bg-dark fixed-nav sticky-footer" id="page-top">
	<!-- NAVEGAÇÃO -->
	<?php
		include('includes/navegacao.php');
	?>
	
	<div class="content-wrapper">
		<div class="container-fluid">
			<ol class="breadcrumb">
				<li class="breadcrumb-item">
					<a href="?pagina=os-do-dia" class="text-decoration-none">Home</a>
				</li>
				<li class="breadcrumb-item">
					Registros
				</li>
				<li class="breadcrumb-item">
					Cadastrar O.S.
				</li>
			</ol>

			<div class="row">
				<!-- so pra ocupar espaço -->
				<div class="col-4">
					
				</div>

				<div class="col">
					<a href="?pagina=cadastrar-orcamento" class="botoes-atalho-cad" title="Novo Orçamento"><i class="fa fa-plus " aria-hidden="true"></i> Orçamento </a>
				</div>

				<div class="col">
					<a href="?pagina=cadastrar-cliente" class="botoes-atalho-cad" title="Novo Cliente"><i class="fa fa-plus " aria-hidden="true"></i> Cliente </a>
				</div>

				<div class="col-4">
					
				</div>

			</div>

			<br>
	
			<div class="row" id="background-tela-cadastro">
				
				<form class="container background-form-cadastro" method="post">

					<div id="jumbotron_telas_cadastro">
						<div class="container">
							<h4>Cadastrar O.S</h4>
						</div>
					</div>

					<div class="form-row align-items-center">

						<div class="col-lg-2 col-md-12 col-sm-12 col-xs-12">
							<label class="sr-only" for="inlineFormInputOs">Nº O.S</label>

							<input type="hidden" class="form-control mb-2" id="inlineFormInputOs" placeholder="Nº O.S" value="<?=$codigo?>" name="ipt-os" required>

							<?php //var_dump($codigo); ?>

							<input type="text" class="form-control mb-2" id="inlineFormInputOs" placeholder="Nº O.S" value="<?=$codigo?>" disabled>

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
									<option value="<?=$orcamentos->orcamento?>"><?=$orcamentos->orcamento.' - '.$orcamentos->nome?></option>
										<?php 
										}
										?>	
								</select>
							</div>
						</div>

						<!--
						<div class="col-lg-4 col-md-12 col-sm-12 col-xs-12">
							<div class="input-group mb-2">
								<div class="input-group-prepend">
									<label class="input-group-text bg-secondary text-white" for="select-orcamento">
										ORÇAMENTO
									</label>
								</div>
								<select class="custom-select" name="sel-orcamento" id="select-orcamento">
									<option value="-">Selecione</option>
									<?php
										//foreach ($orcamento as $carregaOrcamento) {
											
									 ?>
									<option value="<?=$carregaOrcamento->id_orcamento?>"><?=$carregaOrcamento->id_orcamento?></option>
									<?php 
										//}
									?>
									<option value="0">NÃO CADASTRADO</option>
								</select>
							</div>
						</div>
						-->

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
									<option value="<?=$value['nome_cidade'].'/'.$value['uf']?>"><?=$value['nome_cidade'].'/'.$value['uf']?></option>

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

					<?php
						if($mensagem_erro == "Orçamento Cadastrado com Sucesso!")
						{
					?>

					<div class="alert alert-success font-weight-bold alertaCadOsOk col-12 text-center" role="alert">
 						<img src="../assets/ok.png"><h5><strong><?=$mensagem_erro?></strong></h5>
					</div>

					<?php 
						} elseif($mensagem_erro == "ERRO. Contate do Suporte.") {
					?>

					<div class="alert alert-warning font-weight-bold text-danger alertaCadOsNoOk col-12 text-center" role="alert">
 						<img src="../assets/error.png"><h5><strong><?=$mensagem_erro?></strong></h5>
					</div>

					<?php
						} elseif($mensagem_erro == "Um Orçamento precisa ser selecionado para a ordem de serviço. Selecione um orçamento e Tente Novamente.") {
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

			<?php  
				include ('includes/rodape.php');
			?>
			
		</div>
	</div>

	<script src="../bibliotecas/jquery/jquery.min.js"></script>
	<script src="../bibliotecas/bootstrap/js/bootstrap.bundle.min.js"></script>
	<script src="../bibliotecas/jquery-easing/jquery.easing.min.js"></script>
	<script src="../js/sb-admin.min.js"></script>
	<script src="../js/abg.js"></script>
</body>
</html>