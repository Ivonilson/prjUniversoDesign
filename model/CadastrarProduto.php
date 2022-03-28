<?php
require_once "Conn.php";

class CadastrarProduto {

	public function cadProduto()
	{
			$dados = filter_input_array(INPUT_POST, FILTER_DEFAULT);

			if (!empty($dados['btnCadastrarProduto'])) {
				unset($dados['btnCadastrarProduto']);
			}

			$preco_unit = str_replace("," , ".", $dados['ipt-preco-unitario']);

			try {

			$conn = new Conn();

			$statement = "INSERT INTO tbl_produto (id_prod, descricao, unidade_medida, preco_unitario, data_cadastro) VALUES (:id_prod, :descricao, :unidade_medida, :preco_unitario, CURDATE())";

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

			$dados_cadastrar->bindParam(':id_prod', $dados['ipt-codigo-produto']);
			$dados_cadastrar->bindParam(':descricao', $dados['ipt-descricao']);
			$dados_cadastrar->bindParam(':unidade_medida', $dados['sel-unidade-medida']);
			$dados_cadastrar->bindParam(':preco_unitario', $preco_unit);
			//$dados_cadastrar->bindParam(':quantidade_estoque', $dados['ipt-quantidade-estoque']);
			
			$dados_cadastrar->execute();

			} catch (PDOException $erro) {
				//echo "ERRO: ".$erro->getMessage();
			}

			if($dados_cadastrar->rowCount()) {
				//echo "<script>alert('Registro Incluído com Sucesso!!!')</script>";
				//echo "<script>window.location.href = '/?pagina=cadastrar-produto'</script>";
				return true;
			} else {
				//echo "<script>alert('Erro ao Incluir Registro!!!')</script>";
				//print_r($dados_cadastrar->errorInfo());
				return false;
			}

		}
	}

?>