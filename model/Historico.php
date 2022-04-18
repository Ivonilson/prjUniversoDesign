<?php
require_once "Conn.php";

class Historico {


	public function registroAlteracoes()
	{

		$cod_os = filter_input(INPUT_GET, 'cod_os');

		$queryAlteracao = "SELECT cod_os, tipo, banco, empresa, proponente, CONTATO, cidade, uf, tipologia, observacoes, condominio, bairro, data_receb, data_entrega, valor_servico, valor_deslocamento, valor_avaliacao, area_construida, area_terreno, padrao_acabamento, novo, LAJE, situacao, status, obs3, obs2, notas_importantes, resp_cadastro, data_cadastro, alteracoes FROM controle_demandas WHERE cod_os = '$cod_os'";

		$conn = new Conn();

		$dadoAlteracao = $conn->getConn()->query($queryAlteracao);

		$resultadoAlteracao = $dadoAlteracao->fetch(PDO::FETCH_ASSOC);

			return $resultadoAlteracao;
		}

	}

?>
