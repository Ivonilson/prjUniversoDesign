<!DOCTYPE html>
<html lang="pt-BR">
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
	<link href="css/signin.css" rel="stylesheet">
	<link rel="icon" href="assets/abgoficial.ico">
  <?php require_once 'includes/bootstrap-css.php'; ?>
	<title>Login</title>
</head>
<body class="text-center">

  <div class="div-login">

	<form class="form-signin bg-light border rounded" method="post">
      <img class="mb-4" src="assets/abgoficial.png" alt="Abg Soluções" width="72" height="72">
      <h1 class="h3 mb-3 font-weight-normal text">Área Restrita</h1>

     <div class="form-group">
        <label for="exampleInputEmail1" class="sr-only">Usuário</label>
        <input type="text" class="form-control" id="exampleInputEmail1" name="usuario" aria-describedby="Usuário" placeholder="Usuário" required>
      </div>

      <div class="form-group">
        <label for="exampleInputPassword1" class="sr-only">Senha</label>
        <input type="password" class="form-control" id="exampleInputPassword1"  name="senha" placeholder="Senha" required>
      </div>

      <button class="btn btn-lg btn-primary btn-block" type="submit">Acessar</button>

        <?php 
          if ($mensagem_erro == "Usuário ou Senha inválidos!"){
        ?>

        <div class="mt-1 alert alert-danger msgErroLogin font-weight-bold" role="alert">
          <?= $mensagem_erro ?>
        </div>
      <?php 
          } 
      ?>

      <p class="mt-5 mb-3 text-muted">&copy;AbgSoluções 2022</p>
  </form>
</div>

<?php require_once 'includes/bootstrap-js.php'; ?>
</body>
</html>