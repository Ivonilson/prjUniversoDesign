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
	<title>Histórico O.S.</title>
	<!--<link rel="stylesheet" type="text/css" href="../bibliotecas/bootstrap/css/bootstrap.min.css">-->
	<link rel="stylesheet" type="text/css" href="../css/bootstrap2.min.css">
	<link rel="stylesheet" type="text/css" href="../bibliotecas/font-awesome/css/font-awesome.min.css">
	<link rel="stylesheet" type="text/css" href="../css/sb-admin.min.css">
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
					<a href="?pagina=demandas-do-dia" class="text-decoration-none">Início</a>
				</li>
				<li class="breadcrumb-item">
					<mark class="p-2 font-weight-bold">Histórico O.S.</mark>
				</li>
			</ol>
			<div class="col bg-secondary">

				<div class="container">

					<div class="jumbotron jumbotron-fluid bg-dark text-white">
						<div class="container">
							<h4>Histórico O.S.</h4>
							<!--<a href="/?pagina=<?= filter_input(INPUT_GET, 'form') ?>"><button class="btn btn-info float-right text-light p-2 border-rounded font-weight-bold">VOLTAR</button></a>-->
						</div>
					</div>

					<div class="align-items-center">

						<?php

						if ($_SESSION['user']) {

							$usuarioAlteracao = new Historico();
							$registroAlteracao = $usuarioAlteracao->registroAlteracoes();

							//var_dump($registroAlteracao);	

						}

						?>

						<div class="col bg-light p-3">

							<h5 class="col text-primary text-center">HISTÓRICO DE CADASTRO / ALTERAÇÕES</h5> <br> <span class="text-info font-weight-bold">O.S.: <?= $registroAlteracao['cod_os'] ?> - <?= $registroAlteracao['banco'] ?> - <?= $registroAlteracao['empresa'] ?>
								<br><br>

								<?php
								if ($registroAlteracao['resp_cadastro'] != NULL) {
								?>
									<label class="text-dark">Ordem de Serviço cadastrada por: <label class="text-danger font-weight-bold"><?= $registroAlteracao['resp_cadastro'] ?></label></label><br>
								<?php
								} else {
								?>
									<label class="text-dark">Ordem de Serviço cadastrada por: <label class="text-danger font-weight-bold">Não registrado.</label></label><br>
								<?php
								}
								?>

								<?php
								if ($registroAlteracao['data_cadastro'] != NULL && $registroAlteracao['data_cadastro'] != '0000-00-00 00:00:00') {
								?>
									<label class="text-dark">Data e hora da inclusão: <label class="text-danger"><?= date_format(date_create($registroAlteracao['data_cadastro']), "d/m/Y" . " à\s " . "H:i:s") ?></label></label><br>
								<?php
								} else {
								?>
									<label class="text-dark">Data e hora da inclusão: <label class="text-danger">Não registrado.</label></label><br>
								<?php
								}
								?>
								<br>
								<hr>
								<h6 class="text-danger text-center font-weight-bold">REGISTRO DAS ALTERAÇÕES</h6>
								<hr>
								<br>
								<?= "<div class='bg-light p-2'><span class='text-dark'>" . $registroAlteracao['alteracoes'] . "</span></div>" ?>
								<!--<a href="/?pagina=<?= filter_input(INPUT_GET, 'form') ?>"><button class="btn btn-info float-right text-light p-2 border-rounded font-weight-bold">VOLTAR</button></a>-->
							</span>
						</div>

					</div>
				</div>
			</div>

			<?php
			include('includes/rodape.php');
			?>

		</div>
	</div>

	<script src="../bibliotecas/jquery/jquery.min.js"></script>
	<script src="../bibliotecas/bootstrap/js/bootstrap.bundle.min.js"></script>
	<script src="../bibliotecas/jquery-easing/jquery.easing.min.js"></script>
	<script type="text/javascript" src="../js/sb-admin.min.js"></script>
</body>

</html>