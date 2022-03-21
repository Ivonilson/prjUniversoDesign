<?php

class crtValidarUsuario {

	public function valUsuario(){

		$validacao = new Conn();

		if(filter_input(INPUT_POST, 'usuario') != NULL) {

			try {

			$resultado = $validacao->validarUsuario();

			if($resultado){
				$_SESSION['user'] = $resultado[0]->user;
				echo $resultado[0]->user;

			} else {
				$_SESSION['user'] = '-';
			}

			} catch (PDOException $erro) {
				echo "ERRO: ".$erro->getMessage();

			}

		}

		if(isset($_SESSION['user']) && $_SESSION['user'] == '-'){
			return "Usuário ou Senha inválidos!";
		}
	}
}
	$valida = new crtValidarUsuario();
	$mensagem_erro = $valida->valUsuario();
?>
