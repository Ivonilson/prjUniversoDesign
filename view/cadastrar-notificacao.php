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
	<title>Cadastro de Notificacões</title>
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
					Cadastrar Notificação
				</li>
			</ol>
	
			<div class="row" id="background-tela-cadastro">
				
				<form class="container background-form-cadastro" method="post">

					<div id="jumbotron_telas_cadastro">
						<div class="container">
							<h4>Cadastrar Notificação</h4>
						</div>
					</div>

						<?php
							if($mensagem_erro == "Notificação cadastrada com sucesso!")

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

							} 
						?>

					<div class="form-row align-items-center">

						<div class="input-group col-auto">
							<div class="input-group-prepend">
								<label class="input-group-text bg-secondary text-white" for="lbl-sel-tipo">
									Tipo
								</label>
							</div>
							<select name="sel-tipo" class="custom-select" id="lbl-sel-tipo" >
								<option value="-">Selecione</option>
								<option value="AVISOS">AVISOS</option>
								<option value="CONTAS A PAGAR">CONTAS A PAGAR</option>
								<option value="COBRANÇAS A REALIZAR">COBRANÇAS A REALIZAR</option>
								<option value="AGENDAMENTOS">AGENDAMENTOS</option>
								<option value="ORÇAMENTOS">ORÇAMENTOS</option>
								<option value="OUTROS">OUTROS</option>
							</select>
						</div>

						<div class="input-group col-auto mt-1">
							<div class="input-group-prepend">
								<label class="input-group-text bg-secondary text-white" for="lbl-sel-remetente">
									Remetente
								</label>
							</div>
							<select name="sel-remetente" class="custom-select" id="lbl-sel-remetente" >
								<option value="UNIVERSO DESIGN">UNIVERSO DESIGN</option>
								<option value="TERCEIROS">TERCEIROS</option>
							</select>
						</div>

						<div class="input-group col-auto mt-1">
							<div class="input-group-prepend">
								<label class="input-group-text bg-secondary text-white" for="lbl-sel-destinatario">
									Destinatário
								</label>
							</div>
							<select name="sel-destinatario" class="custom-select" id="lbl-sel-destinatario" >
								<option value="UNIVERSO DESIGN">UNIVERSO DESIGN</option>
								<option value="TERCEIROS">TERCEIROS</option>
							</select>
						</div>

						<div class="input-group col-auto mt-1">
							<div class="input-group-prepend">
								<label class="input-group-text bg-secondary text-white" for="lbl-sel-descricao">
									Descrição
								</label>
							</div>
							<select name="sel-descricao" class="custom-select" id="lbl-sel-descricao" >
								<option value="-">Selecione</option>
								<option value="BOLETO">BOLETO</option>
								<option value="VISITA">VISITA</option>
								<option value="ORÇAMENTO">ORÇAMENTO</option>
								<option value="AGENDAMENTO">AGENDAMENTO</option>
								<option value="OUTROS">OUTROS</option>
							</select>
						</div>

						<div class="input-group col-lg-4 col-md-4 col-xs-12 col-sm-12 mt-1">
							<div class="input-group-prepend">
								<div class="input-group-text bg-secondary text-white">
									Data Limite
								</div>
							</div>
							<input type="date" class="form-control" name="ipt-data-limite" required>
						</div>

						<div class="input-group col-lg-4 col-md-4 col-xs-12 col-sm-12 mt-1">
							<div class="input-group-prepend">
								<div class="input-group-text bg-secondary text-white">
									Alertar em: 								</div>
							</div>
							<input type="date" class="form-control" name="ipt-data-programada" title="Data programada para pagamento/saneamento" required>
						</div>

						<div class="input-group col-auto mt-1">
							<div class="input-group-prepend">
								<label class="input-group-text bg-secondary text-white" for="lbl-sel-prioridade">
									Prioridade
								</label>
							</div>
							<select name="sel-prioridade" class="custom-select" id="lbl-sel-prioridade" >
								<option value="NORMAL">Selecione</option>
								<option value="NORMAL">NORMAL</option>
								<option value="ALTA">ALTA</option>
								<option value="BAIXA">BAIXA</option>
							</select>
						</div>

						<div class="input-group col-auto mt-1">
							<div class="input-group-prepend">
								<label class="input-group-text bg-secondary text-white" for="lbl-sel-meio-notificacao">
									Aviso/Cobrança através de:
								</label>
							</div>
							<select name="sel-meio-notificacao" class="custom-select" id="lbl-sel-meio-notificacao" >
								<option value="<?=$_SESSION['user'].' NÃO INFORMOU'?>">Selecione</option>
								<option value="E-MAIL">E-MAIL</option>
								<option value="VERBAL/TELEFONE">VERBAL/TELEFONE</option>
								<option value="TEXTO WHATSAPP">TEXTO WHATSAPP</option>
								<option value="ÁUDIO WHATSAPP">ÁUDIO WHATSAPP</option>
								<option value="BOLETO/DOCUMENTO IMPRESSO">BOLETO/DOCUMENTO IMPRESSO</option>
								<option value="OUTROS">OUTROS</option>
							</select>
						</div>

						<div class="input-group col-auto mt-1">
							<label class="sr-only" for="lbl-observacoes">OBSERVAÇÕES COMPLEMENTARES</label>
							<textarea type="text" class="form-control mb-2" id="lbl-observacoes" cols="100" rows="3" placeholder="Observações Complementares" name="ta-observacoes"></textarea>
						</div>

					</div>

					<input type="submit" name="" id="botoesGravarCad" value="Gravar Notificação" name="btnCadastrar">
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