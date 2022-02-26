<!DOCTYPE html>
<htm lang="pt-br">
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
	<title>Login</title>
	<link rel="stylesheet" type="text/css" href="../bibliotecas/bootstrap/css/bootstrap.min.css">
	<link rel="stylesheet" type="text/css" href="../bibliotecas/font-awesome/css/font-awesome.min.css">
	<link rel="stylesheet" type="text/css" href="../css/sb-admin.min.css">
</head>
<body class="bg-dark">

	<div class="container">
		<div class="card card-login mx-auto mt-5">
			<div class="card-header text-center bg-info	 text-light">Abg</div>
			<div class="card-body">
				<form method="post" action="../index.php/?pagina=os-do-dia">
					<div class="form-group">
						<i class="fa fa-user-circle" aria-hidden="true"></i>
						<!--<label for="usuario">Usuário</label>-->
						<input type="text" class="form-control" name="usuario" id="email" placeholder="Usuário">
					</div>
					<div class="form-group">
						<!--<label for="senha">Senha</label>-->
						<i class="fa fa-key" aria-hidden="true"></i>
						<input type="password" class="form-control" name="senha" id="senha" placeholder="Senha">
					</div>
					<!--<div class="form-group">
						<div class="form-check">
							<label class="form-check-label">
								<input type="checkbox" class="form-check-input">
								Lembrar minha senha.
							</label>
						</div>-->
					</div>
					<input type="submit" class="btn btn-info btn-block" value="Entrar">
					<!--<div class="text-center">
						<a href="#" class="d-block small mt-3">Criar uma Conta</a>
						<a href="#" class="d-block small">Esqueceu a senha?</a>
					</div>-->
				</form>
			</div>
		</div>
	</div>

	<script src="../bibliotecas/jquery/jquery.min.js"></script>
	<script src="../bibliotecas/bootstrap/js/bootstrap.bundle.min.js"></script>
	<script src="../bibliotecas/jquery-easing/jquery.easing.min.js"></script>
</body>
</html>