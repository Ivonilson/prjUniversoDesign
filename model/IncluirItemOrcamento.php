<?php
require_once "Conn.php";
require_once "DadosAuxiliares.php";

class IncluirItemOrcamento {

	public function incluirItemOrcamento()
	{
			$conn = new Conn();

			$dados = filter_input_array(INPUT_POST, FILTER_DEFAULT);
			$descricao_e_valor_unit = explode('/', $dados['sel-produto']);

			if(isset($dados['ipt-largura']) && isset($dados['ipt-altura'])){
				$tamanho = (float) str_replace(',' , '.' , $dados['ipt-largura']) * (float) str_replace(',' , '.' , $dados['ipt-altura']); 
				$descricao_e_valor_unit[0] = $descricao_e_valor_unit[0]." - (".$dados['ipt-largura']." larg. X ".$dados['ipt-altura']. " alt. = ".number_format($tamanho, 2, ',' , '.')." m²)";

				$desconto = ((float) $dados['ipt-percentual-desconto'] / 100) * ((float) $dados['ipt-quantidade-itens'] * ((float) $descricao_e_valor_unit[1]) * str_replace(',' , '.' , $tamanho));

				$valor_total = (float) $dados['ipt-quantidade-itens'] * ((float) $descricao_e_valor_unit[1] * str_replace(',' , '.' , $tamanho));
				$total_a_pagar = $valor_total - ($valor_total * ((float) $dados['ipt-percentual-desconto'] / 100));
			} else {

				$desconto = ((float) $dados['ipt-percentual-desconto'] / 100) * ((float) $dados['ipt-quantidade-itens'] * (float) $descricao_e_valor_unit[1]);

				$valor_total = (float) $dados['ipt-quantidade-itens'] * (float) $descricao_e_valor_unit[1];
				$total_a_pagar = $valor_total - ($valor_total * ((float) $dados['ipt-percentual-desconto'] / 100));
			}

			if (!empty($dados['btnCadastrarOrcamento'])) {
				unset($dados['btnCadastrarOrcamento']);
			}

			try {

			$statement = "INSERT INTO tbl_itens_orcamento (id_orcamento, descricao, valor_unitario, valor_total, desconto, total_pagar, quantidade, data_cadastro, usuario) VALUES (:id_orcamento, :descricao, :valor_unitario, :valor_total, :desconto, :total_pagar, :quantidade, CURDATE(), :usuario)";

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

			$usuario = $_SESSION['user'];

			$dados_cadastrar->bindParam(':id_orcamento', $dados['ipt-id-orcamento']);
			$dados_cadastrar->bindParam(':descricao', $descricao_e_valor_unit[0]);
			$dados_cadastrar->bindParam(':valor_unitario', $descricao_e_valor_unit[1]);
			$dados_cadastrar->bindParam(':quantidade', $dados['ipt-quantidade-itens']);
			$dados_cadastrar->bindParam(':valor_total', $valor_total);
			$dados_cadastrar->bindParam(':desconto', $desconto);
			$dados_cadastrar->bindParam(':total_pagar', $total_a_pagar);
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
