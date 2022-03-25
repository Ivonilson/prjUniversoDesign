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
	<title>Cadastro de orçamentos</title>
	<?php require_once 'includes/bootstrap-css.php'; ?>

</head>
<body class="bg-dark fixed-nav sticky-footer" id="page-top">
	<!-- NAVEGAÇÃO -->
	<?php require_once 'includes/navegacao.php';?>
	
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
					Cadastrar Orçamento
				</li>
			</ol>

			<div class="row justify-content-center">

				<div class="col-3">
					<a href="?pagina=cadastrar-os" class="botoes-atalho-cad" title="Nova O.S"><i class="fa fa-plus " aria-hidden="true"></i> O.S </a>
				</div>

				<div class="col-3">
					<a href="?pagina=cadastrar-cliente" class="botoes-atalho-cad" title="Novo Cliente"><i class="fa fa-plus " aria-hidden="true"></i> Cliente </a>
				</div>

			</div>

			<br>
	
			<div class="row" id="background-tela-cadastro">
				
				<form class="container background-form-cadastro" method="post" id="cadItens">

					<div id="jumbotron_telas_cadastro">
						<div class="container">
							<h4>Cadastrar Orçamento</h4>
						</div>
					</div>

						<?php
							if($mensagem_erro == "Orçamento Cadastrado com sucesso!")

							{
						?>

						<div class="alert alert-success font-weight-bold alertaCadOsOk col-12 text-center" role="alert">
 							<img src="../assets/ok.png"><h5><strong><?=$mensagem_erro?></strong></h5>
						</div>

						<?php 
							} elseif($mensagem_erro == "ERRO. Contate o Suporte.") {
						?>

						<div class="alert alert-warning font-weight-bold text-danger alertaCadOsNoOk col-12 text-center" role="alert">
 							<img src="../assets/error.png"><h5><strong><?=$mensagem_erro?></strong></h5>
						</div>

						<?php

							} elseif($mensagem_erro == "Erro ao cadastrar. Verifique se o CLIENTE foi selecionado tente novamente. Caso o problema persista, contate o Suporte.") {
						?>

						<div class="alert alert-warning font-weight-bold text-danger alertaCadOsNoOk col-12 text-center" role="alert">
 							<img src="../assets/error.png"><h5><strong><?=$mensagem_erro?></strong></h5>
						</div>

						<?php 
							}
						?>

					<div class="form-row align-items-center">

						<div class="col-lg-2 col-md-12 col-sm-12 col-xs-12">
							<label class="text-dark" for="inlineFormInputOrcamentoHidden">N° ORÇAMENTO</label>

							<input type="hidden" class="form-control" id="inlineFormInputOrcamentoHidden" value="<?=$codigoOrcamento?>" name="ipt-cod-orcamento" required>

							<?php //var_dump($codigoOrcamento);?>

							<input type="text" class="form-control  mb-2" id="inlineFormInputOrcamento" value="<?=$codigoOrcamento?>" disabled>

						</div>

						<div class="col-lg-4 col-md-12 col-sm-12 col-xs-12">
							<label class="text-dark" for="select-cliente">
								CLIENTE
							</label>
							<select class="custom-select  mb-2" name="sel-cliente" id="select-cliente">
								<option value="-">Selecione</option>
								<?php
									foreach ($clientes as $cliente) {
											
									?>
								<option value="<?=$cliente->id_cliente?>"><?=$cliente->id_cliente." - ".$cliente->nome?></option>
								<?php 
										}
								?>
							</select>
						</div>

						<div class="col-lg-4 col-md-12 col-sm-12 col-xs-12">
							<label class="text-dark" for="inlineFormInputTrabalhoServico">TRABALHO/SERVIÇO</label>

							<input type="text" class="form-control  mb-2" id="inlineFormInputTrabalhoServico" name="ipt-trabalho-servico" placeholder="digite" required>


						</div>

						<div class="col-lg-2 col-md-12 col-sm-12 col-xs-12">
							<label class="text-dark" for="inlineFormInputDataValidade">VALIDADE</label>

							<input type="date" class="form-control  mb-2" name="ipt-data-validade-orc" id="inlineFormInputDataValidade">
						</div>

						<!--<div class="col-lg-1 col-md-12 col-sm-12 col-xs-12">
							<input type="button" class="col-12 btn btn-success text-white mt-4" value="Atualizar" name="btnAtualizarItens" onclick="totalSemDesc()">
						</div>-->

						<!--<div class="col-lg-2 col-md-12 col-sm-12 col-xs-12">
							<input type="button" class="col-12 btn btn-dark text-white mt-4" value="Limpar" name="btnFinalizarItens" onclick="zerar()">
						</div>-->

						<div class="col-lg-6 col-md-12 col-sm-12 col-xs-12" id="divIptItens">
							<label class="text-dark" for="select-prod">
								PRODUTO/SERVIÇO
							</label>
							<select class="form-control mb-2" id="select-prod" name="sel-produto">
								<!--<option value="Generico">Selecione</option>-->
								<?php
									foreach ($produto as $carregaProduto) {
										
								 ?>
								<option value="<?=$carregaProduto->descricao.' ('.$carregaProduto->unidade_medida.') '.'/ '.$carregaProduto->preco_unitario?>" id="preco"><?=$carregaProduto->descricao.' ('.$carregaProduto->unidade_medida.') - Valor Unit.(R$) '.$carregaProduto->preco_unitario?>
								<?php 
									}
								?>
								<!--<option value="NÃO CADASTRADO">NÃO CADASTRADO</option>-->
							</select>
						</div>

						<div class="col-lg-1 col-md-12 col-sm-12 col-xs-12">
							<label class="text-dark" for="inlineFormInputLargura" id="lblLargura">LARGURA</label>
							<input type="text" class="form-control mb-2" id="inlineFormInputLargura" placeholder="digite" name="ipt-largura" required>
						</div>

						<div class="col-lg-1 col-md-12 col-sm-12 col-xs-12">
							<label class="text-dark" for="inlineFormInputAltura" id="lblAltura">ALTURA</label>
							<input type="text" class="form-control mb-2" id="inlineFormInputAltura" placeholder="digite" name="ipt-altura" required>
						</div>

						<div class="col-lg-1 col-md-12 col-sm-12 col-xs-12">
							<label class="text-dark" for="inlineFormInputQuant">QUANT.</label>
							<input type="number" class="form-control mb-2 iptQuant" id="inlineFormInputQuant" name="ipt-quantidade-itens" value="1" min="1">
						</div>

						<div class="col-lg-1 col-md-12 col-sm-12 col-xs-12">
							<label class="text-dark" for="percentualDesconto">DESC.(%)</label>
							<input type="text" class="form-control mb-2 iptDesconto" id="percentualDesconto" placeholder="digite" name="ipt-percentual-desconto" value="0">
						</div>

						<div class="col-lg-2 col-md-12 col-sm-12 col-xs-12">
							<input type="button" class="col-12 btn btn-success text-white mt-4 btnAdd" value="Adicionar" name="btnAdicionarItem" onclick="addItem()" id="btnAdicionar">
						</div>


						<!-- criada dinamicamente -->
						<div class="col-12 d-none" id="itens">

								<div class="d-inline" id="divDescricao">
									<label class="text-danger col-2 text-left ml-0 pl-0">Descrição</label>
								</div>

								<div class="d-inline" id="divValorUnit">
									<label class="text-danger col-2 text-left">Vl. Unit.(R$)</label>
								</div>

								<div class="d-inline-block" id="divQuant">
									<label class="text-danger col-1 text-left">Quant.</label>
								</div>

								<div class="d-inline" id="divTotal">
									<label class="text-danger col-2 text-left">Total (R$)</label>
								</div>

								<div class="d-inline" id="divDesconto">
									<label class="text-danger col-1 text-left">Desc.(R$)</label>
								</div>

								<div class="d-inline" id="divTotalPagar">
									<label class="text-danger col-2 text-left">Total a pagar (R$)</label>
								</div>

								<div class="d-inline-block" id="divIconeExcluir">
									<label class="text-danger col-2 text-center"></label>
								</div>
						</div>

						<!-- DIV DE RESUMO DE VALORES -->
						<div class="border col-12 mt-2">
							
							<h5 class="text-center text-danger pt-2">Resumo do orçamento</h5>

							<div class="row p-2">
								<div class="col-lg-4 col-md-12 col-sm-12 col-xs-12 mt-2">
									<label class="text-primary" for="valorTotal">VALOR TOTAL (R$)</label>
									<input type="text" class="form-control mb-2" id="valorTotal" aria-describedby="inlineFormInputValorTotal" placeholder="-" name="ipt-valor-servico-global">
								</div>

								<div class="col-lg-4 col-md-12 col-sm-12 col-xs-12 mt-2">
									<label class="text-primary" for="valorFinal">DESCONTOS (R$)</label>
									<input type="text" class="form-control mb-2" id="Desconto" placeholder="-" name="ipt-valor-desconto-global" aria-describedby="inlineFormInputValorFinal">
								</div>

								<!-- no DB o campo está como "valor_final" -->
								<div class="col-lg-4 col-md-12 col-sm-12 col-xs-12 mt-2">
									<label class="text-primary" for="valorTotal">VALOR A PAGAR (R$)</label>
									<input type="text" class="form-control mb-2" id="valorTotalPagar" aria-describedby="inlineFormInputValorTotal" placeholder="-" name="ipt-valor-pagar-global">
								</div>
							</div>
							
						</div>
						<!-- FIM DA DIV DE RESUMO DE VALORES -->
						
						<div class="col-lg-3 col-md-12 col-sm-12 col-xs-12 mt-4">
							<label class="text-dark" for="select-condicao-pagamento">
								CONDIÇÕES PAGAMENTO
							</label>
							<select class="form-control mb-2" id="select-condicao-pagamento" name="sel-condicao-pagamento">
								<option value="-">Selecione</option>
								<option value="A VISTA">A VISTA</option>
								<option value="ADIANT. DE 50%">ADIANT. DE 50%</option>
								<option value="PARCELADO CARTÃO DE CRÉDITO">PARCELADO CARTÃO DE CRÉDITO</option>
								<option value="OUTRO">OUTRO</option>
							</select>
						</div>

						<div class="col-lg-3 col-md-12 col-sm-12 col-xs-12 mt-4">
							<label class="text-dark" for="select-meio-pag">
								MEIO PAGAMENTO
							</label>
							<select class="form-control mb-2" id="select-meio-pag" name="sel-meio-pag">
								<option value="-">Selecione</option>
								<option value="DINHEIRO">DINHEIRO</option>
								<option value="CARTÃO DÉBITO">CARTÃO DÉBITO</option>
								<option value="CARTÃO CRÉDITO">CARTÃO CRÉDITO</option>
								<option value="TRANSFERÊNCIA ON-LINE">TRANSFERÊNCIA ON-LINE</option>
								<option value="PIX">PIX</option>
								<option value="DEPÓSITO">DEPÓSITO</option>
							</select>
						</div>

						<div class="col-lg-6 col-md-12 col-sm-12 col-xs-12 mt-4">
							<label class="text-dark" for="inlineFormInputSolicitante">SOLICITADO POR</label>
							<input type="text" class="form-control mb-2" id="inlineFormInputSolicitante" placeholder="Nome e telefone" name="ipt-solicitante">
						</div>

						<!--<div class="col-lg-6 col-md-12 col-sm-12 col-xs-12">
							<div class="input-group mb-2">
								<div class="input-group-prepend">
									<div class="input-group-text bg-secondary text-white">
										DIGITE O NOME DA PESSOA QUE SOLICITOU O ORÇAMENTO:
									</div>
								</div>
								<input type="text" class="form-control" name="ipt-solicitante" placeholder="Digite...">
							</div>
						</div>-->

					</div>

					<div class="form-row align-items-center">

						<div class="col-12">
							<label class="sr-only" for="inlineFormInputObservacoesComplementares">OBSERVAÇÕES COMPLEMENTARES</label>
							<textarea type="text" class="form-control mb-2" id="inlineFormInputObservacoesComplementares" cols="100" rows="3" placeholder="Observações" name="ta-observacao"></textarea>
						</div>

						<!--CONSOLIDADO--->
						<input type="hidden" class="form-control" name="ipt-consolidado" placeholder="..." id="consolidado">

						<div class="col-12">
							<input type="submit" name="" value="Fechar Orçamento" name="btnCadastrarOrcamento" id="botoesGravarCad">
						</div>
						

					</div>
				</form>
			</div>

			<?php require_once 'includes/rodape.php';?>
			
		</div>
	</div>

	
<?php require_once 'includes/bootstrap-js.php'; ?>
</body>
</html>