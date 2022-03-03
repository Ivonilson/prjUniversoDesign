<!DOCTYPE html>
<htm lang="pt-br">
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
	<title>Registrar</title>
	<link rel="stylesheet" type="text/css" href="../bibliotecas/bootstrap/css/bootstrap.min.css">
	<link rel="stylesheet" type="text/css" href="../bibliotecas/font-awesome/css/font-awesome.min.css">
	<link rel="stylesheet" type="text/css" href="../css/sb-admin.min.css">
</head>
<body class="bg-dark">

	<div class="container">
		<div class="card card-register mx-auto mt-5">
			<div class="card-header">Criar uma Conta</div>
			<div class="card-body">
				<form>
					<div class="form-group">
						<div class="form-row">
							<div class="col-md-6">
								<label for="primeiroNome">Primeiro Nome</label>
								<input type="text" class="form-control" name="primeiroNome" id="primeiroNome" placeholder="Digite seu primeiro nome">
							</div>
							<div class="col-md-6">
								<label for="sobrenome">Sobrenome</label>
								<input type="text" class="form-control" name="sobrenome" id="sobrenome" placeholder="Digite seu sobrenome">
							</div>				
						</div>
					</div>
					<div class="form-group">
						<label for="email">Email</label>
						<input type="email" class="form-control" name="email" id="email" placeholder="Digite seu email">
					</div>
					<div class="form-group">
						<div class="form-row">
							<div class="col-md-6">
								<label for="senha">Senha</label>
								<input type="password" class="form-control" name="senha" id="senha" placeholder="Digite uma senha">
							</div>
							<div class="col-md-6">
								<label for="confirmarSenha">Confirmar senha</label>
								<input type="text" name="confirmarSenha" class="form-control" id="confirmarSenha" placeholder="Confirme sua senha">
							</div>
						</div>
					</div>
					<button class="btn btn-primary btn-block">Registrar-se</button>
					<div class="text-center">
						<a href="#" class="d-block small mt-3">Esqueceu a senha?</a>
						<a href="#" class="d-block small">Página de Login</a>
					</div>
				</form>
			</div>
		</div>
	</div>

	<script src="../bibliotecas/jquery/jquery.min.js"></script>
	<script src="../bibliotecas/bootstrap/js/bootstrap.bundle.min.js"></script>
	<script src="../bibliotecas/jquery-easing/jquery.easing.min.js"></script>
</body>
</html>