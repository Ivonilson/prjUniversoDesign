<?php
require_once "Conn.php";

class EditarOs {

	public function registroEdicao($cod_os)
	{
		$queryEdicao = "SELECT cod_os, id_orcamento, data_agendamento, cidade_uf, endereco, sit_pagamento, status, contato, observacao FROM tbl_os WHERE cod_os = '$cod_os'";

		$conn = new Conn();

		$dadoEdicao = $conn->getConn()->query($queryEdicao);

		$resultado = $dadoEdicao->fetch(PDO::FETCH_OBJ);

		return $resultado;
	}

	public function edOs()
	{
			$dados = filter_input_array(INPUT_POST, FILTER_DEFAULT);
			$form = filter_input(INPUT_GET, 'form');

			if (!empty($dados['btnEditarOs'])) {
				unset($dados['btnEditarOs']);
			}

			try {

			$conn = new Conn();

			$statement = "UPDATE tbl_os SET cod_os = :cod_os, id_orcamento = :id_orcamento, cidade_uf = :cidade_uf, endereco = :endereco, sit_pagamento = :sit_pagamento, data_agendamento = :data_agendamento, status = :status, contato = :contato, observacao = :observacao WHERE cod_os = :cod_os";

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

			$dados_editar->bindParam(':cod_os', $dados['ipt-os']);
			$dados_editar->bindParam(':id_orcamento', $dados['ipt-orcamento']);
			$dados_editar->bindParam(':data_agendamento', date_format(date_create($dados['ipt-data-agendamento']), "Y-m-d"));
			$dados_editar->bindParam(':cidade_uf', $dados['sel-cidade-uf']);
			$dados_editar->bindParam(':endereco', $dados['ipt-endereco']);
			$dados_editar->bindParam(':sit_pagamento', $dados['sel-pagamento']);
			$dados_editar->bindParam(':status', $dados['sel-status-servico']);
			$dados_editar->bindParam(':contato', $dados['ipt-contato']);
			$dados_editar->bindParam(':observacao', $dados['ta-observacao']);

			$dados_editar->execute();

			} catch (PDOException $erro) {
				echo "ERRO: ".$erro->getMessage();
			}	

			if($dados_editar->rowCount()) {
				echo "<script>alert('Registro ATUALIZADO com SUCESSO.')</script>";

				
					echo "<script>window.location.href = '/?pagina=".$form."'</script>";
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