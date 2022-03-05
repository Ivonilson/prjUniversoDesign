<?php
require_once "Conn.php";

class EditarProduto {

	public function registroProduto($id_prod)
	{
		$queryEdicao = "SELECT id_prod, descricao, unidade_medida, preco_unitario, quantidade_estoque FROM tbl_produto WHERE id_prod = '$id_prod'";

		$conn = new Conn();

		$dadoEdicao = $conn->getConn()->query($queryEdicao);

		$resultado = $dadoEdicao->fetch(PDO::FETCH_OBJ);

		return $resultado;
	}

	public function edProduto()
	{
			$dados = filter_input_array(INPUT_POST, FILTER_DEFAULT);
			$form = filter_input(INPUT_GET, 'form');

			if (!empty($dados['btnEditarProduto'])) {
				unset($dados['btnEditarProduto']);
			}

			try {

			$conn = new Conn();

			$statement = "UPDATE tbl_produto SET descricao = :descricao, unidade_medida = :unidade_medida, preco_unitario = :preco_unitario, data_atualizacao = CURDATE() WHERE id_prod = :id_prod";

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

			//$valor_unitario = number_format( (float) $dados['ipt-preco-unitario'], 2, '.' , '');
			//$valor_unitario = $dados['ipt-preco-unitario'];
			
			//$valor_puro = $dados['ipt-preco-unit'];

			//echo "<script>alert($valor_puro)</script>";

			$dados_editar->bindParam(':id_prod', $dados['ipt-id-produto']);
			$dados_editar->bindParam(':descricao', $dados['ipt-descricao']);
			$dados_editar->bindParam(':unidade_medida', $dados['sel-unidade-medida']);
			$dados_editar->bindParam(':preco_unitario', $dados['ipt-preco-unit']);
			//$dados_editar->bindParam(':quantidade_estoque', $dados['ipt-quantidade-estoque']);

			$dados_editar->execute();

			} catch (PDOException $erro) {
				echo "ERRO: ".$erro->getMessage();
			}	

			if($dados_editar->rowCount()) {
				//echo "<script>alert('Registro ATUALIZADO com SUCESSO.')</script>";
				//echo "<script>window.location.href = '/?pagina=editar-produto&id_prod=".$dados['ipt-id-produto']."'</script>";
					//echo "<script>window.location.href = '../view/demandas-do-dia.php'</script>";
				return true;
				

			} else {
				//echo "<script>alert('ERRO ao ATUALIZAR Registro.')</script>";
				//print_r($dados_editar->errorInfo());
				return false;
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