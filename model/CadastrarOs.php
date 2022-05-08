<?php
require_once "Conn.php";
require_once "DadosAuxiliares.php";

class CadastrarOS {

	public function gerarCodigoOs()
		{
			$ultimaOs = new DadosAuxiliares();
			$resultado = $ultimaOs->carregaOs();
			$anoAtual = date('Y');

			$Os = ++$resultado['ultima'].'/'.$anoAtual;
			return $Os;
		}

	public function cadOs()

	{
			
			$dados = filter_input_array(INPUT_POST, FILTER_DEFAULT);

			if (!empty($dados['btnCadastrar'])) {
				unset($dados['btnCadastrar']);
			}

			try {

			$conn = new Conn();

			$statement = "INSERT INTO tbl_os (id_orcamento, cod_os, contato, endereco, cidade_uf, data_cadastro, data_agendamento, sit_pagamento, status, observacao) VALUES (:id_orcamento, :cod_os, :contato, :endereco, :cidade_uf, CURRENT_TIMESTAMP, :data_agendamento, :sit_pagamento, :status, :observacao)";

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

			$dados_cadastrar->bindParam(':id_orcamento', $dados['sel-orcamento']);
			$dados_cadastrar->bindParam(':cod_os', $dados['ipt-os']);
			$dados_cadastrar->bindParam(':contato', $dados['ipt-contato']);
			$dados_cadastrar->bindParam(':endereco', $dados['ipt-endereco']);
			$dados_cadastrar->bindParam(':cidade_uf', $dados['sel-cidade-uf']);
			$dados_cadastrar->bindParam(':data_agendamento', $dados['ipt-data-agendamento']);
			$dados_cadastrar->bindParam(':sit_pagamento', $dados['sel-pagamento']);
			$dados_cadastrar->bindParam(':status', $dados['sel-status-servico']);
			$dados_cadastrar->bindParam(':observacao', $dados['ta-observacoes']);
			
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

		function ultimaOsCadastrada()
		{
			$conn = new Conn();

			$statement = "SELECT cod_os, id_orcamento, contato, endereco, cidade_uf, data_cadastro, data_agendamento FROM tbl_os ORDER BY data_cadastro DESC LIMIT 1";

			$ultimo = $conn->getConn()->query($statement);
			$resultado = $ultimo->fetch(PDO::FETCH_ASSOC);
			return $resultado;
		}

	}
?>
