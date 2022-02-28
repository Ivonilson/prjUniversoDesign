<?php
require_once "Conn.php";
require_once "DadosAuxiliares.php";

class CadastrarOrcamento {

	public function cadOrcamento()
	{
			$dados = filter_input_array(INPUT_POST, FILTER_DEFAULT);

			if (!empty($dados['btnCadastrarOrcamento'])) {
				unset($dados['btnCadastrarOrcamento']);
			}

			try {

			$conn = new Conn();

			$statement = "INSERT INTO tbl_orcamento (id_cliente, trabalho_servico, data_validade, valor_total, desconto, valor_final, condicao_pagamento, meio_pagamento, solicitante, observacao, data_cadastro, usuario) VALUES (:id_cliente, :trabalho_servico, :data_validade, :valor_total, :desconto, :valor_final, :condicao_pagamento, :meio_pagamento, :solicitante, :observacao, CURDATE(), :usuario)";

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

			//$produtos = implode('<br>', ($dados['ipt_prod']));
			$usuario = $_SESSION['user'];

			$dados_cadastrar->bindParam(':id_cliente', $dados['sel-cliente']);
			$dados_cadastrar->bindParam(':trabalho_servico', $dados['ipt-trabalho-servico']);
			$dados_cadastrar->bindParam(':data_validade', $dados['ipt-data-validade-orc']);
			$dados_cadastrar->bindParam(':valor_total', $dados['ipt-valor-servico-global']);
			$dados_cadastrar->bindParam(':desconto', $dados['ipt-valor-desconto-global']);
			$dados_cadastrar->bindParam(':valor_final', $dados['ipt-valor-pagar-global']);
			$dados_cadastrar->bindParam(':condicao_pagamento', $dados['sel-condicao-pagamento']);
			$dados_cadastrar->bindParam(':meio_pagamento', $dados['sel-meio-pag']);
			$dados_cadastrar->bindParam(':solicitante', $dados['ipt-solicitante']);
			$dados_cadastrar->bindParam(':observacao', $dados['ta-observacao']);
			$dados_cadastrar->bindParam(':usuario', $usuario);
		
			$dados_cadastrar->execute();

			} catch (PDOException $erro) {
				//echo "ERRO: ".$erro->getMessage();
			}

			if($dados_cadastrar->rowCount()) {
				//echo "<script>alert('Registro Incluído com Sucesso!!!')</script>";
				//echo "<script>window.location.href = '/?pagina=cadastrar-orcamento'</script>";
				return true;
				

			} else {
				//echo "<script>alert('Erro ao Incluir Registro!!!')</script>";
				//print_r($dados_cadastrar->errorInfo());
				return false;
			}

		}
	}

?>