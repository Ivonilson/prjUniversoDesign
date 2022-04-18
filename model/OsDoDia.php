<?php
require_once "Conn.php";

class OsDoDia {

	public function dadosDoDia()
	{
		
		try {

		$querySelect = "SELECT tbl_os.cod_os AS cod_os, tbl_orcamento.id_orcamento AS numeroOrcamento, tbl_cliente.nome AS nome, tbl_os.data_cadastro AS data_cadastro, tbl_os.data_agendamento AS data_agendamento, tbl_os.sit_pagamento AS sit_pagamento, tbl_os.status AS status, tbl_os.observacao AS observacao, tbl_orcamento.valor_final AS valor_final FROM tbl_os INNER JOIN tbl_orcamento ON tbl_os.id_orcamento = tbl_orcamento.id_orcamento INNER JOIN tbl_cliente ON tbl_orcamento.id_cliente = tbl_cliente.id_cliente WHERE DATE(tbl_os.data_agendamento) = CURDATE() ORDER BY tbl_orcamento.id_orcamento";

		$conn = new Conn();
		$dadosSelect = $conn->getConn()->query($querySelect);
		$resultados = $dadosSelect->fetchAll(PDO::FETCH_ASSOC);

		return $resultados;

		} catch(PDOException $erro){
			//echo "Erro: ".$erro->getMessage();
		}

	}
}

?>
