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
	<title>Atualizar O.S</title>
	<!--<link rel="stylesheet" type="text/css" href="../bibliotecas/bootstrap/css/bootstrap.min.css">-->
	<link rel="stylesheet" type="text/css" href="../css/bootstrap2.min.css">
	<link rel="stylesheet" type="text/css" href="../bibliotecas/font-awesome/css/font-awesome.min.css">
	<link rel="stylesheet" type="text/css" href="../css/sb-admin.min.css">
</head>
<body class="bg-dark fixed-nav sticky-footer" id="page-top">
	<!-- NAVEGAÇÃO -->
	<?php
		include('navegacao.php');
	?>
	
	<div class="content-wrapper" id="background-tela-edicao">
		<div class="container-fluid">
			<ol class="breadcrumb">
				<li class="breadcrumb-item">
					<a href="?pagina=os-do-dia" class="text-decoration-none">Home</a>
				</li>
				<li class="breadcrumb-item">
					Registros O.S
				</li>
				<li class="breadcrumb-item">
					Atualizar O.S
				</li>
			</ol>
	
			<div id="row-form-edicao">
				
				<form class="container background-form-edicao" method="post">

					<div id="jumbotron_telas_edicao">
						<div class="container">
							<h4>O.S em atualização</h4>
							<?php $cod_os = filter_input(INPUT_GET, 'cod_os');?>
							<span>
								<!--<a href="/?pagina=historico&cod_os=<?=$cod_os?>&form=demandas-do-dia" class="text-light text-decoration-none float-right p-2 border-rouded" target="_blank" title="Histórico"><i class="fa fa-history"></i></a>-->
							</span>
						</div>
					</div>

					<?php 

						if ($_SESSION['user']){
						$os = filter_input(INPUT_GET, 'cod_os');
						if($os != '' && $os != NULL) {

						$usuario = new EditarOs();
						$registro = $usuario->registroEdicao($os);					
					?>

					<div class="form-row align-items-center">

						<div class="col-lg-3 col-md-12 col-sm-12 col-xs-12">
							<label class="sr-only" for="inlineFormInputOs">Nº O.S</label>

							<input type="hidden" class="form-control mb-2" id="inlineFormInputOs" placeholder="Nº O.S" value="<?=$registro->cod_os?>" name="ipt-os" required>

							<input type="text" class="form-control mb-2" id="inlineFormInputOs" placeholder="Nº O.S" value="<?=$registro->cod_os?>" disabled>

						</div>

						<div class="col-lg-5 col-md-12 col-sm-12 col-xs-12">
							<div class="input-group mb-2">
								<div class="input-group-prepend">
									<div class="input-group-text bg-secondary text-white">
										N° ORCAMENTO
									</div>
								</div>
								<input type="text" class="form-control" name="ipt-orcamento" value="<?=$registro->id_orcamento?>">
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
								<input type="text" class="form-control" name="ipt-data-agendamento" value="<?=date_format(date_create($registro->data_agendamento), "d-m-Y")?>">
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

						<div class="col-lg-7 col-md-12 col-sm-12 col-xs-12">
							<label class="sr-only" for="inlineFormInputEndereco">ENDEREÇO</label>
							<input type="text" class="form-control mb-2" id="inlineFormInputEndereco" placeholder="Digite o endereço" name="ipt-endereco" value="<?=$registro->endereco?>" required>
						</div>

						<div class="col-lg-5 col-md-12 col-sm-12 col-xs-12">
							<label class="sr-only" for="inlineFormInputContato">CONTATO</label>
							<input type="text" class="form-control mb-2" id="inlineFormInputContato" placeholder="Contato/Telefone" name="ipt-contato" value="<?=$registro->contato?>" required>
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
									<option value="<?=$registro->sit_pagamento?>"><?=$registro->sit_pagamento?></option>
									<option value="PENDENTE">PENDENTE</option>
									<option value="PAGO">PAGO</option>
								</select>
							</div>
						</div>

						<div class="col-lg-4 col-md-12 col-sm-12 col-xs-12">
							<div class="input-group mb-2">
								<div class="input-group-prepend">
									<label class="input-group-text bg-secondary text-white" for="sel-status">
										STATUS SERVIÇO
									</label>
								</div>
								<select class="custom-select" name="sel-status-servico" id="sel-status">
									<option value="<?=$registro->status?>"><?=$registro->status?></option>
									<option value="PENDENTE">PENDENTE</option>
									<option value="FINALIZADO">FINALIZADO</option>
									<option value="SUSPENSO">SUSPENSO</option>
									<option value="CANCELADO">CANCELADO</option>
								</select>
							</div>
						</div>

					</div>

					<div class="form-row align-items-center">

						<div class="col-12">
							<label class="sr-only" for="inlineFormInputObservacoesComplementares">OBSERVAÇÕES COMPLEMENTARES</label>
							<textarea type="text" class="form-control mb-2" id="inlineFormInputObservacoesComplementares" cols="100" rows="3" placeholder="Observações" name="ta-observacao"><?=$registro->observacao?></textarea>
						</div>

						<input type="submit" name="btnEditarOs" value="GRAVAR" id="btnGravarEdicao">
					</div>

				</form>
			</div>	
					
			<?php  

			} else {
				echo "<h4 style='color:white'>NENHUM DADO RETORNADO!!!</h>";
			}

			} else {

				echo "<h4 style='color:white'>USUÁRIO NÃO AUTORIZADO!!!</h>";
				var_dump($_SESSION['user']);
				//var_dump($_SESSION['pass']);
				//echo $_SESSION['user'];
				//echo $_SESSION['pass'];
				
				}

			?>

			<?php  
				include ('rodape.php');
			?>
			
		</div>
	</div>

	<script src="../bibliotecas/jquery/jquery.min.js"></script>
	<script src="../bibliotecas/bootstrap/js/bootstrap.bundle.min.js"></script>
	<script src="../bibliotecas/jquery-easing/jquery.easing.min.js"></script>
	<script type="text/javascript" src="../js/sb-admin.min.js"></script>
	<script src="../js/abg.js"></script>
</body>
</html>