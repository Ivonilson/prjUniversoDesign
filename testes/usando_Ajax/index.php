<?php  
	require_once "db.php";
?>

<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<title>Teste AJAX com JQUERY</title>
	<!--

		<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
	-->

		<link rel="stylesheet" type="text/css" href="bootstrap.min.css"/>

</head>
<body>

	<form method="post" id="form">
		<div class="alert" id="alert" role="alert"></div>
		<input type="text" id="texto">
		<input type="submit" value="ENVIAR" id="submit" />
		<div class="alert" id="info" role="alert"></div>
	</form>

	
	
	<!--

	<script src="../../bibliotecas/bootstrap/js/bootstrap.bundle.min.js"></script>

	<script src="jquery.min.js"></script>
	
	-->
	<script type="text/javascript" src="https://code.jquery.com/jquery-1.4.3.min.js"></script>
	<script type="text/javascript" src="bootstrap.min.js"></script>
	<script src="funcoes.js"></script>
</body>
</html>