<?php
require_once "Conn.php";
//require_once "DadosAuxiliares.php";

class Resultados {

	function pesquisaResultados()
	{
		if(filter_input(INPUT_POST, 'sel-carregar-ano') != null){
			$ano = filter_input(INPUT_POST, 'sel-carregar-ano');
		} else {
			$ano = date('Y');
		}
		
		try {
				$querySelect = "SELECT  id_plan_rec_desp, mes_ano_planejado, valor_receita as valor_receita_planejada, valor_despesa as valor_despesa_planejada, ano from tbl_planejamento_anual_receita_despesa WHERE ano = $ano ORDER BY id_plan_rec_desp ASC";

				/*$querySelect = "SELECT cod_os, id_orcamento, contato, endereco, cidade_uf, data_cadastro, data_agendamento, sit_pagamento, status, observacao  FROM tbl_os WHERE data_cadastro >= '$data_inicial' AND data_cadastro <= '$data_final'";*/

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

	function pesquisaAnoResultados()
	{
		
		try {
				$querySelect = "SELECT DISTINCT ano from tbl_receita";

				$conn = new Conn();
				$buscaAno = $conn->getConn()->query($querySelect);

				$resultado = $buscaAno->fetchAll(PDO::FETCH_ASSOC);
				
				return $resultado;

		} catch(PDOException $e) {
			echo "ERRO: ".$e->getMessage();
		}

	}

    function pesquisaReceitasExecutadas()
    {
        try {

            $querySelect = "SELECT  valor, data_referencia, ano from tbl_receita";

            /*$querySelect = "SELECT cod_os, id_orcamento, contato, endereco, cidade_uf, data_cadastro, data_agendamento, sit_pagamento, status, observacao  FROM tbl_os WHERE data_cadastro >= '$data_inicial' AND data_cadastro <= '$data_final'";*/

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
        try {

            $querySelect = "SELECT  valor, data_referencia from tbl_despesa";

            /*$querySelect = "SELECT cod_os, id_orcamento, contato, endereco, cidade_uf, data_cadastro, data_agendamento, sit_pagamento, status, observacao  FROM tbl_os WHERE data_cadastro >= '$data_inicial' AND data_cadastro <= '$data_final'";*/

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
