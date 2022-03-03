<?php
require_once "Conn.php";

class Cidade {

	function carregaCidades()
	{
		$conn = new Conn();
		$queryCidades = "SELECT nome_cidade, uf FROM tb_cidades GROUP BY nome_cidade";
		$dadosCidades = $conn->getConn()->query($queryCidades);
		$cidades = $dadosCidades->fetchAll(PDO::FETCH_ASSOC);
		return $cidades;
	}

}

?>