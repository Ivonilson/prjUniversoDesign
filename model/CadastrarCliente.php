<?php
require_once "Conn.php";

class CadastrarCliente
{

	public function cadCliente()
	{
		$dados = filter_input_array(INPUT_POST, FILTER_DEFAULT);

		if (!empty($dados['btnCadastrarCliente'])) {
			unset($dados['btnCadastrarCliente']);
		}

		try {

			$conn = new Conn();

			$statement = "INSERT INTO tbl_cliente (nome, cpf_cnpj, endereco, bairro, cidade_uf, tel_fixo, tel_cel, email, data_cadastro) VALUES (:nome, :cpf_cnpj, :endereco, :bairro, :cidade_uf, :tel_fixo, :tel_cel, :email, CURDATE())";

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

			$dados_cadastrar->bindParam(':nome', $dados['ipt-nome']);
			$dados_cadastrar->bindParam(':cpf_cnpj', $dados['ipt-cpf-cnpj']);
			$dados_cadastrar->bindParam(':endereco', $dados['ipt-endereco']);
			$dados_cadastrar->bindParam(':bairro', $dados['ipt-bairro']);
			$dados_cadastrar->bindParam(':cidade_uf', $dados['sel-cidade-uf']);
			$dados_cadastrar->bindParam(':tel_fixo', $dados['ipt-tel-fixo']);
			$dados_cadastrar->bindParam(':tel_cel', $dados['ipt-tel-cel']);
			$dados_cadastrar->bindParam(':email', $dados['ipt-email']);

			$dados_cadastrar->execute();
		} catch (PDOException $erro) {
			//echo "ERRO: ".$erro->getMessage();
		}

		if ($dados_cadastrar->rowCount()) {
			//echo "<script>alert('Registro Incluído com Sucesso!!!')</script>";
			//echo "<script>window.location.href = '/?pagina=cadastrar-cliente'</script>";
			return true;
		} else {
			//echo "<script>alert('Erro ao Incluir Registro!!!')</script>";
			//print_r($dados_cadastrar->errorInfo());
			return false;
		}
	}
}

?>
