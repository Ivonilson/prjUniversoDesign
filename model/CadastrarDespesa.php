<?php
require_once "Conn.php";
require_once "DadosAuxiliares.php";

class CadastrarDespesa {

	public function gerarCodigoDespesa()
		{
			$ultimaDespesa = new DadosAuxiliares();
			$resultado = $ultimaDespesa->carregaDespesa();
			
			$arr_cod = explode("/", $resultado['ultima']);
			$codigo = $arr_cod[0];
			$anoAtual = date('Y');
			$CodDespesa = ++$codigo.'/'.$anoAtual;
			return $CodDespesa;
		}

	public function cadDespesa()

	{
			
			$dados = filter_input_array(INPUT_POST, FILTER_DEFAULT);

			$valor = str_replace(',' , '.', $dados['ipt-valor']);
			$detalhamento = strtoupper($dados['ta-detalhamento']);

			if (!empty($dados['btnCadastrar'])) {
				unset($dados['btnCadastrar']);
			}

			try {

			$conn = new Conn();

			$statement = "INSERT INTO tbl_despesa (id_despesa, tipo, descricao, detalhamento, valor, data_referencia, data_processamento, usuario) VALUES (:id_despesa, :tipo, :descricao, :detalhamento, :valor, :data_referencia, CURRENT_TIMESTAMP, :usuario)";

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

			$dados_cadastrar->bindParam(':id_despesa', $dados['ipt-cod']);
			$dados_cadastrar->bindParam(':tipo', $dados['sel-tipo']);
			$dados_cadastrar->bindParam(':descricao', $dados['sel-descricao']);
			$dados_cadastrar->bindParam(':detalhamento', $detalhamento);
			$dados_cadastrar->bindParam(':valor', $valor);
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

		function ultimaDespesaCadastrada()
		{
			$conn = new Conn();

			$statement = "SELECT id_despesa, tipo, descricao, detalhamento, valor, data_referencia, data_processamento, usuario FROM tbl_despesa ORDER BY data_processamento DESC LIMIT 1";

			$ultimo = $conn->getConn()->query($statement);
			$resultado = $ultimo->fetch(PDO::FETCH_ASSOC);
			return $resultado;
		}

	}
?>
