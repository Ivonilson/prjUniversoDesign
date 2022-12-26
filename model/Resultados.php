<?php
require_once "Conn.php";
//require_once "DadosAuxiliares.php";

class Resultados {

	function anosDisponiveis(){
		try  {

			$querySelect = "SELECT DISTINCT ano from tbl_receita ORDER BY ano";
			$conn = new Conn();
			$execucao = $conn->getConn()->query($querySelect);
			$resultados =$execucao->fetchAll(PDO::FETCH_ASSOC);
			return $resultados;
		} catch(PDOException $e) {
			echo "Erro: ".$e->getMessage();
		}
	}

    function pesquisaReceitasExecutadas()
    {
		if(filter_input(INPUT_POST, 'sel-carregar-ano') != null){
			$ano = filter_input(INPUT_POST, 'sel-carregar-ano');
		} else {
			$ano = date('Y');
		}
		
        try {

            $querySelect = "SELECT  valor, data_referencia, ano from tbl_receita WHERE ano = $ano";

            $conn = new Conn();
            $dadosResultados = $conn->getConn()->query($querySelect);

            /* bindParam não está funcionando, verificar o por que.
            $dadosPorDataRecb->bindParam(':dataInicial', $data_inicial);
            $dadosPorDataReceb->bindParam(':dataFinal', $data_final);
            */

            $resultados = $dadosResultados->fetchAll(PDO::FETCH_ASSOC);
            
            return $resultados;

   		 } catch(PDOException $e) {
       		 echo "ERRO: ".$e->getMessage();
    	}
    }

	function pesquisaDespesasExecutadas()
    {
		if(filter_input(INPUT_POST, 'sel-carregar-ano') != null){
			$ano = filter_input(INPUT_POST, 'sel-carregar-ano');
		} else {
			$ano = date('Y');
		}

        try {

            $querySelect = "SELECT  valor, data_referencia, ano from tbl_despesa WHERE ano = $ano";

            $conn = new Conn();
            $dadosResultados = $conn->getConn()->query($querySelect);

            /* bindParam não está funcionando, verificar o por que.
            $dadosPorDataRecb->bindParam(':dataInicial', $data_inicial);
            $dadosPorDataReceb->bindParam(':dataFinal', $data_final);
            */

            $resultados = $dadosResultados->fetchAll(PDO::FETCH_ASSOC);
            
            return $resultados;

   		 } catch(PDOException $e) {
       		 echo "ERRO: ".$e->getMessage();
    	}
    }

}
?>
