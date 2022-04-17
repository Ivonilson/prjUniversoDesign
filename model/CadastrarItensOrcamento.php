<?php
require_once "Conn.php";
require_once "DadosAuxiliares.php";

class CadastrarItensOrcamento
{

	public function cadItensOrcamento()
	{
		$conn = new Conn();

		$itens = filter_input(INPUT_POST, 'ipt-consolidado');
		$id_orcamento = filter_input(INPUT_POST, 'ipt-cod-orcamento');

		$itens_array = explode("/", $itens, -1);

		foreach ($itens_array as $linha) {

			$dados = explode("-", $linha);

			try {

				$statement = "INSERT INTO tbl_itens_orcamento (id_orcamento, descricao, valor_unitario, quantidade, valor_total, desconto, total_pagar, data_cadastro, usuario) VALUES (:id_orcamento, :descricao, :valor_unitario, :quantidade, :valor_total, :desconto, :total_pagar, CURDATE(), :usuario)";

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

				$dados_cadastrar->bindParam(':id_orcamento', $id_orcamento);
				$dados_cadastrar->bindParam(':descricao', $dados[0]);
				$dados_cadastrar->bindParam(':valor_unitario', $dados[1]);
				$dados_cadastrar->bindParam(':quantidade', $dados[2]);
				$dados_cadastrar->bindParam(':valor_total', $dados[3]);
				$dados_cadastrar->bindParam(':desconto', $dados[4]);
				$dados_cadastrar->bindParam(':total_pagar', $dados[5]);
				$dados_cadastrar->bindParam(':usuario', $usuario);

				$dados_cadastrar->execute();
			} catch (PDOException $erro) {
				//echo "ERRO: ".$erro->getMessage();
			}
		}

		if ($dados_cadastrar->rowCount()) {
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
