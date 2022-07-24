<?php
require_once "Conn.php";
require_once "DadosAuxiliares.php";

class Receita {

	public function gerarCodigoReceita()
		{
			$ultimaReceita = new DadosAuxiliares();
			$resultado = $ultimaReceita->carregaReceita();

			if($resultado['ultima'] == null){
				$resultado['ultima'] = 0;
			}

			$arr_cod = explode("/", $resultado['ultima']);
			$codigo = $arr_cod[0];
			$anoAtual = date('Y');
			$CodReceita = ++$codigo.'/'.$anoAtual;
			return $CodReceita;
		}

	public function cadReceita()

	{
			
			$dados = filter_input_array(INPUT_POST, FILTER_DEFAULT);

			$valor = str_replace(',' , '.', $dados['ipt-valor']);
			$detalhamento = strtoupper($dados['ta-detalhamento']);

			if (!empty($dados['btnCadastrar'])) {
				unset($dados['btnCadastrar']);
			}

			try {

			$conn = new Conn();

			$statement = "INSERT INTO tbl_receita (id_receita, tipo, detalhamento, valor, forma_pagamento, data_referencia, data_processamento, usuario) VALUES (:id_receita, :tipo, :detalhamento, :valor, :forma_pagamento, :data_referencia, CURRENT_TIMESTAMP, :usuario)";

			$dados_cadastrar = $conn->getConn()->prepare($statement);

			/*$dados_alteracoes = "
			
			Alterado por: "."<mark>".$_SESSION['user']."</mark>".'<br>'
			.'Data e Horário: <mark>'.date('d/m/Y H:i:s').'</mark><br>'
			."Cliente: ".$dados['ipt-os'].'<br>'
			.'Banco: '.$dados['sel-cliente'].'<br>'
			.'Endereço: '.$dados['ipt-endereco'].'<br>'
			.'Cidade: '.$dados['sel-cidade'].'<br>'
			.'Produto/Serviço: '.$dados['sel-prod'].'<br>'
			.'Data Agendamento: '.date_format(date_create($dados['ipt-data-agendamento']), 'd/m/Y').'<br>'
			.'Valor do Serviço: '.$dados['ipt-valor-servico'].'<br>'
			.'Situação Pagamento: '.$dados['sel-situacao-pag'].'<br>'
			.'Meio de pagamento: '.$dados['sel-meio-pag'].'<br>'
			.'Status da demanda: '.$dados['sel-status'].'<br>'
			.'Observações: '.$dados['ta-observacoes'].'<br>'
			.'<hr>';*/

			//$produtos = implode('<br> ', ($dados['sel-prod']));

			$dados_cadastrar->bindParam(':id_receita', $dados['ipt-cod']);
			$dados_cadastrar->bindParam(':tipo', $dados['sel-tipo-lancar']);
			$dados_cadastrar->bindParam(':detalhamento', $detalhamento);
			$dados_cadastrar->bindParam(':valor', $valor);
			$dados_cadastrar->bindParam(':forma_pagamento', $dados['sel-forma-pagamento']);
			$dados_cadastrar->bindParam(':data_referencia', $dados['ipt-data-referencia']);
			$dados_cadastrar->bindParam(':usuario', $_SESSION['user']);
			
			$dados_cadastrar->execute();

			} catch (PDOException $erro) {
				//echo "ERRO: ".$erro->getMessage();
			}

			if($dados_cadastrar->rowCount()) {
				return true;
				//echo "<script>window.location.href = '/?pagina=cadastrar-os'</script>";
				//echo "<script>alert('Registro Incluído com Sucesso!!!')</script>";
				
			} else {
				//echo "<script>alert('Erro ao Incluir Registro!!!')</script>";
				//print_r($dados_cadastrar->errorInfo());
				return false;
			}


		}

		function ultimaReceitaCadastrada()
		{
			$conn = new Conn();

			$statement = "SELECT id_receita, tipo, detalhamento, valor, forma_pagamento, data_referencia, data_processamento, usuario FROM tbl_receita ORDER BY data_processamento DESC LIMIT 1";

			$ultimo = $conn->getConn()->query($statement);
			$resultado = $ultimo->fetch(PDO::FETCH_ASSOC);
			return $resultado;
		}

	function pesquisaControleCaixaPorPeriodo()
	{
		
		$data_inicial = filter_input(INPUT_POST, 'data_inicial');
		$data_final = filter_input(INPUT_POST, 'data_final');
		$data_final = $data_final . " 23:59:59";
		//echo $data_final;

		try {
				$querySelect = "SELECT id_receita, tipo, detalhamento, valor, forma_pagamento, data_referencia, data_processamento, usuario from tbl_receita  WHERE data_referencia >= '$data_inicial' AND data_referencia <= '$data_final'";

				/*$querySelect = "SELECT cod_os, id_orcamento, contato, endereco, cidade_uf, data_cadastro, data_agendamento, sit_pagamento, status, observacao  FROM tbl_os WHERE data_cadastro >= '$data_inicial' AND data_cadastro <= '$data_final'";*/

				$conn = new Conn();
				$dadosPorPeriodo = $conn->getConn()->query($querySelect);

				/* bindParam não está funcionando, verificar o por que.
				$dadosPorDataRecb->bindParam(':dataInicial', $data_inicial);
				$dadosPorDataReceb->bindParam(':dataFinal', $data_final);
				*/

				$resultadoPorPeriodo = $dadosPorPeriodo->fetchAll(PDO::FETCH_ASSOC);
				
				return $resultadoPorPeriodo;

		} catch(PDOException $e) {
			echo "ERRO: ".$e->getMessage();
		}
		

	}

	public function edReceita()
	
	{
			$dados = filter_input_array(INPUT_POST, FILTER_DEFAULT);
			//$form = filter_input(INPUT_GET, 'form');

			$valor = str_replace(',' , '.', $dados['ipt-valor']);
			$detalhamento = strtoupper($dados['ta-detalhamento']);			

			if (!empty($dados['btnEditarReceita'])) {
				unset($dados['btnEditarReceita']);
			}

			try {

			$conn = new Conn();

			$statement = "UPDATE tbl_receita SET tipo = :tipo, detalhamento = :detalhamento, valor = :valor, forma_pagamento = :forma_pagamento, data_referencia = :data_referencia WHERE id_receita = :id_receita";

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

			$dados_editar->bindParam(':id_receita', $dados['ipt-id-receita-edicao']);
			$dados_editar->bindParam(':tipo', $dados['sel-tipo-edicao']);
			$dados_editar->bindParam(':detalhamento',$detalhamento);
			$dados_editar->bindParam(':valor', $valor);
			$dados_editar->bindParam(':forma_pagamento', $dados['ipt-forma_pagamento']);
			$dados_editar->bindParam(':data_referencia', $dados['ipt-data-referencia']);

			if($dados_editar->execute()) {
				//echo "<script>alert('Registro ATUALIZADO com SUCESSO.')</script>";
				//echo "<script>window.location.href = '/?pagina=controle-caixa-relatorio&data_inicial=".$dados['data_inicial']."&data_final=".$dados['data_final']."'</script>";
				//echo "<script>window.location.href = '../view/demandas-do-dia.php'</script>";
				return true;
				
			} else {
				//echo "<script>alert('ERRO ao ATUALIZAR Registro.')</script>";
				print_r($dados_editar->errorInfo());
				return false;
			}

			} catch (PDOException $erro) {
				echo "ERRO: ".$erro->getMessage();
			}	

		}
		
		public function deletarReceita()
		{
			$id_receita = filter_input(INPUT_POST, 'ipt-id-receita');

			try {

				$conn = new Conn();
				$statement = "DELETE FROM tbl_receita WHERE id_receita = '$id_receita'";
				$deletar = $conn->getConn()->prepare($statement);
				
				if($deletar->execute()) {
					return true;
					//echo "<script>alert('Registro DELETADO com SUCESSO.')</script>";
				} else {
					return false;
					//echo "<script>alert('ERRO. REGISTRO NÃO FOI DELETADO.')</script>";
				}

			} catch (PDOException $error) {
				echo "Erro: ".$error->getMessage();
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
