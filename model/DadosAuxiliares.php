<?php  
	require_once 'Conn.php';

	class DadosAuxiliares {

		//Cadastro de O.S
		function carregaOs()
		{

		try{
			$conn = new Conn();
			$statement = "SELECT MAX(id_os) as ultima FROM tbl_os";
			$dado = $conn->getConn()->query($statement);
			$resultado = $dado->fetch(PDO::FETCH_ASSOC);
			return $resultado;

			} catch(PDOException $erro){
				echo "ERRO: ".$erro->getMessage();
			}

		}

		//Cadastro de Orçamento
		function carregaIdOrcamento()
		{

		try{
			$conn = new Conn();
			$statement = "SELECT MAX(id_orcamento) FROM tbl_orcamento";
			$dado = $conn->getConn()->query($statement);
			$resultado = $dado->fetch(); 
			return ++$resultado[0];

			} catch(PDOException $erro){
				echo "ERRO: ".$erro->getMessage();
			}

		}

		 function carregaCliente()
		 {	
			try{
				$conn = new Conn();
				$statement = "SELECT id_cliente, nome, cidade_uf FROM tbl_cliente ORDER BY nome";
				$dado = $conn->getConn()->query($statement);
				$cliente = $dado->fetchAll(PDO::FETCH_OBJ);
				return $cliente;

			} catch (PDOException $e){
				echo "Erro: ".$e->getMessage();
			}
			
		}

		function carregaOrcamento()
		{
			$conn = new Conn();
			$statement = "SELECT tbl_orcamento.id_orcamento AS orcamento, tbl_cliente.nome AS nome, tbl_orcamento.solicitante AS solicitante FROM tbl_orcamento INNER JOIN tbl_cliente ON tbl_orcamento.id_cliente = tbl_cliente.id_cliente ORDER BY tbl_orcamento.id_orcamento DESC";
			$dado = $conn->getConn()->query($statement);
			$orcamento = $dado->fetchAll(PDO::FETCH_OBJ);
			return $orcamento;
		}

		//Não está pronto, está em verificação...
		/*function carregaOrcamentoImpressao()
		{
			$conn = new Conn();
			$statement = "SELECT tbl_orcamento.produtos AS produtos FROM tbl_orcamento INNER JOIN tbl_cliente ON tbl_orcamento.id_cliente = tbl_cliente.id_cliente ORDER BY tbl_orcamento.id_orcamento DESC";
			$dado = $conn->getConn()->query($statement);
			$orcamento = $dado->fetchAll(PDO::FETCH_OBJ);
			return $orcamento;
		}*/

		function orcamentoImpressao(){
			$idOrcamento = $_GET['id_orcamento'];
			$conn = new Conn();
			$statement = "SELECT tbl_orcamento.id_orcamento AS orcamento, tbl_orcamento.produtos AS produtos, tbl_orcamento.solicitante AS solicitante, tbl_cliente.nome AS nome FROM tbl_orcamento INNER JOIN tbl_cliente ON tbl_orcamento.id_cliente = tbl_cliente.id_cliente WHERE tbl_orcamento.id_orcamento = $idOrcamento";
			$dado = $conn->getConn()->query($statement);
			$orcamento = $dado->fetch(PDO::FETCH_OBJ);
			return $orcamento;
		}

		function carregaProduto()
		{
			$conn = new Conn();
			$statement = "SELECT id_prod, descricao, preco_unitario, unidade_medida FROM tbl_produto ORDER BY descricao";
			$dado = $conn->getConn()->query($statement);
			$produtos = $dado->fetchAll(PDO::FETCH_OBJ);
			return $produtos;
		}

	}
