<?php
require "model/Conn.php";
$conn = new Conn();

if(filter_input(INPUT_POST, 'usuario')!= NULL) {

	$u = filter_input(INPUT_POST, 'usuario');
	$p =  filter_input(INPUT_POST, 'senha');

	try {

		$retorno = $conn->getConn()->query("SELECT user, pass FROM tbl_user WHERE user = '$u' AND pass = '$p'");

		$resultado = $retorno->fetchAll(PDO::FETCH_OBJ);

		if($resultado != NULL){
			$_SESSION['user'] = $resultado[0]->user;
		} else {
			$_SESSION['user'] = NULL;
		}

		} catch (PDOException $erro) {
			echo "ERRO: ".$erro->getMessage();
		}
}

?>
