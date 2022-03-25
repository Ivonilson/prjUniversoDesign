<?php

class crtValidarUsuario {

	public function valUsuario(){

		$validacao = new Conn();

			try {

			$resultado = $validacao->validarUsuario();

			if($resultado){
				$_SESSION['user'] = $resultado[0]->user;
				echo "<script>window.location.href = '/?pagina=os-do-dia'</script>";

			} else {
				$_SESSION['user'] = null;
				return "Usuário ou Senha inválidos!";
			}

			} catch (PDOException $erro) {
				echo "ERRO: ".$erro->getMessage();

			}
	}
}
	$valida = new crtValidarUsuario();

	if(filter_input(INPUT_POST, 'usuario') != null){
		$mensagem_erro = $valida->valUsuario();
	} else {
		$mensagem_erro = "";
	}
	
?>
