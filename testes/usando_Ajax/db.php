<?php 

	require_once "Connection.php";

	/*if($_SERVER["REQUEST_METHOD"] == "POST") {
		echo "O método é POST";
	} else {
		echo "Não é POST";
	}*/

/*$texto = $_POST['texto'];
echo $texto;*/

echo $_POST['texto'];

if(isset($_POST['texto'])){
		$data = $_POST['texto'];
		
		try {

		$conn = new Conn();
		//Só a partir da chamada da função getConn que o PHP vai interpretar a conexão
		//$conectado = $conn->getConn();

		$statement = "INSERT INTO teste (data) VALUES ('$data')";

		$inserir = $conn->getConn()->prepare($statement);

		$inserir->execute();

	} catch(PDOException $erro){
		echo "Erro: ".$erro->getMessage();
	}

	if($inserir->rowCount()){
		//Só funciona quando não há a prevenção do refresh
		//echo "<script>alert('Registro Incluído com Sucesso!!!')</script>";
	} else {
		//Só funciona quando não há a prevenção do refresh
		//echo "<script>alert('Erro ao Incluir Registro!!!')</script>";
		print_r($dados_cadastrar->errorInfo());
	}
}


?>
