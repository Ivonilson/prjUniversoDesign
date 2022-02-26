<?php
require_once "Conn.php";

class EditarOrcamento {

	public function registroOrcamento($id_orcamento)
	{
		$queryEdicao = "SELECT tbl_orcamento.id_orcamento AS id_orcamento, tbl_cliente.id_cliente AS id_cliente, tbl_cliente.nome AS nome, tbl_orcamento.produtos AS produtos, tbl_orcamento.valor_total AS valor_total, tbl_orcamento.desconto AS desconto, tbl_orcamento.valor_final AS valor_final, tbl_orcamento.meio_pagamento AS meio_pagamento, tbl_orcamento.solicitante AS solicitante, tbl_orcamento.data_validade AS data_validade, tbl_orcamento.observacao AS observacao FROM tbl_orcamento INNER JOIN tbl_cliente ON tbl_orcamento.id_cliente = tbl_cliente.id_cliente WHERE id_orcamento = '$id_orcamento'";

		$conn = new Conn();

		$dadoEdicao = $conn->getConn()->query($queryEdicao);

		$resultado = $dadoEdicao->fetch(PDO::FETCH_OBJ);

		return $resultado;
	}

	public function edOrcamento()
	{
			$dados = filter_input_array(INPUT_POST, FILTER_DEFAULT);
			$form = filter_input(INPUT_GET, 'form');

			if (!empty($dados['btnEditarOrcamento'])) {
				unset($dados['btnEditarOrcamento']);
			}

			try {

			$conn = new Conn();

			$statement = "UPDATE tbl_orcamento SET id_cliente = :id_cliente, produtos = :produtos, valor_total = :valor_total, desconto = :desconto, valor_final = :valor_final, meio_pagamento = :meio_pagamento, solicitante = :solicitante, data_validade = :data_validade, observacao = :observacao WHERE id_orcamento = :id_orcamento";

			$dados_editar = $conn->getConn()->prepare($statement);

			/*$dados_alteracoes = "
			
			Alterado por: "."<mark>".$_SESSION['user']."</mark>".'<br>'
			.'Data e Horário: <mark>'.date('d/m/Y H:i:s').'</mark><br>'
			."Tipo: ".$dados['sel-tipo'].'<br>'
			.'Banco: '.$dados['sel-banco'].'<br>'
			.'Empresa: '.$dados['sel-empresa'].'<br>'
			.'Proponente: '.$dados['ipt-proponente'].'<br>'
			.'Contato: '.$dados['ipt-contato'].'<br>'
			.'Cidade/UF: '.$dados['sel-cidade'].'/'.$dados['sel-uf'].'<br>'
			.'Tipologia: '.$dados['sel-tipologia'].'<br>'
			.'Endereço: '.$dados['ipt-endereco'].'<br>'
			.'Condomínio: '.$dados['ipt-condominio'].'<br>'
			.'Bairro: '.$dados['ipt-bairro'].'<br>'
			.'Data Recebimento: '.date_format(date_create($dados['ipt-dataReceb']), 'd/m/Y').'<br>'
			.'Data Entrega: '."<mark>".date_format(date_create($dados['ipt-dataEntrega']), 'd/m/Y')."</mark>".'<br>'
			.'Valor Serviço (R$): '.$dados['ipt-valorServ'].'<br>'
			.'Valor Deslocamento (R$): '.$dados['ipt-valorDesloc'].'<br>'
			.'Valor de Avaliação (R$): '."<mark>".$dados['ipt-valorAvaliacao']."</mark>".'<br>'
			.'Área construída (M²): '.$dados['ipt-areaEdif'].'<br>'
			.'Área terreno (M²): '.$dados['ipt-areaTerreno'].'<br>'
			.'Padrão Acabamento: '.$dados['sel-padraoAcab'].'<br>'
			.'Novo: '.$dados['sel-novo'].'<br>'
			.'Laje: '.$dados['sel-laje'].'<br>'
			.'Situação: '.$dados['sel-situacao'].'<br>'
			.'Status: '."<mark>".$dados['sel-status']."</mark>".'<br>'
			.'Status para a Lista: '.$dados['sel-statusLista'].'<br>'
			.'Observações da Lista: '.$dados['ta-observacoes'].'<br>'
			.'Observações I/G: '."<mark>".$dados['ta-observacoesig']."</mark>".'<br>'
			.'<hr>';*/

			$dados_editar->bindParam(':id_orcamento', $dados['ipt-codigo-orcamento']);
			$dados_editar->bindParam(':id_cliente', $dados['sel-nome-cliente']);
			$dados_editar->bindParam(':produtos', $dados['ta-produtos']);
			$dados_editar->bindParam(':valor_total', $dados['ipt-valor-total']);
			$dados_editar->bindParam(':desconto', $dados['ipt-desconto']);
			$dados_editar->bindParam(':valor_final', $dados['ipt-valor-final']);
			$dados_editar->bindParam(':meio_pagamento', $dados['sel-meio-pag']);
			$dados_editar->bindParam(':solicitante', $dados['ipt-solicitante']);
			$dados_editar->bindParam(':data_validade', date_format(date_create($dados['ipt-data-validade']), "Y-m-d"));
			$dados_editar->bindParam(':observacao', $dados['ta-observacao']);

			$dados_editar->execute();

			} catch (PDOException $erro) {
				echo "ERRO: ".$erro->getMessage();
			}	

			if($dados_editar->rowCount()) {
				echo "<script>alert('Registro ATUALIZADO com SUCESSO.')</script>";

				
					echo "<script>window.location.href = '/?pagina=editar-orcamento&id_orcamento=".$dados['ipt-codigo-orcamento']."'</script>";
					//echo "<script>window.location.href = '../view/demandas-do-dia.php'</script>";
				

			} else {
				echo "<script>alert('ERRO ao ATUALIZAR Registro.')</script>";
				print_r($dados_editar->errorInfo());
			}

		}


			/*public function registroAlteracoes($cod_os_alteracao)
			{
				$queryAlteracao = "SELECT cod_os, tipo, banco, empresa, proponente, CONTATO, cidade, uf, tipologia, observacoes, condominio, bairro, data_receb, data_entrega, valor_servico, valor_deslocamento, valor_avaliacao, area_construida, area_terreno, padrao_acabamento, novo, LAJE, situacao, status, obs3, obs2, notas_importantes, resp_cadastro, data_cadastro, alteracoes FROM controle_demandas WHERE cod_os = '$cod_os_alteracao'";

				$conn = new Conn();

				$dadoAlteracao = $conn->getConn()->query($queryAlteracao);

				$resultadoAlteracao = $dadoAlteracao->fetch(PDO::FETCH_OBJ);

				return $resultadoAlteracao;
			}*/

	}

?>