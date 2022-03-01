<?php
require_once "Conn.php";

class EditarOs {

	public function registroEdicao($cod_os)
	{
		$queryEdicao = "SELECT cod_os, id_orcamento, data_agendamento, cidade_uf, endereco, sit_pagamento,
		 status, contato, observacao FROM tbl_os WHERE cod_os = '$cod_os'";

		$conn = new Conn();

		$dadoEdicao = $conn->getConn()->query($queryEdicao);

		$resultado = $dadoEdicao->fetch(PDO::FETCH_OBJ);

		return $resultado;
	}

	public function edOs()
	{
			$dados = filter_input_array(INPUT_POST, FILTER_DEFAULT);
			//$form = filter_input(INPUT_GET, 'form');
			$data_editada = date_format(date_create($dados['ipt-data-agendamento']), "Y-d-m");

			if (!empty($dados['btnEditarOs'])) {
				unset($dados['btnEditarOs']);
			}

			try {

			$conn = new Conn();

			$statement = "UPDATE tbl_os SET cod_os = :cod_os, id_orcamento = :id_orcamento, 
			cidade_uf = :cidade_uf, endereco = :endereco,
			sit_pagamento = :sit_pagamento, data_agendamento = :data_agendamento, 
			status = :status, contato = :contato, observacao = :observacao WHERE cod_os = :cod_os";

			$dados_editar = $conn->getConn()->prepare($statement);

			$dados_editar->bindParam(':cod_os', $dados['ipt-os']);
			$dados_editar->bindParam(':id_orcamento', $dados['ipt-orcamento']);
			$dados_editar->bindParam(':data_agendamento', $data_editada);
			$dados_editar->bindParam(':cidade_uf', $dados['sel-cidade-uf']);
			$dados_editar->bindParam(':endereco', $dados['ipt-endereco']);
			$dados_editar->bindParam(':sit_pagamento', $dados['sel-pagamento']);
			$dados_editar->bindParam(':status', $dados['sel-status-servico']);
			$dados_editar->bindParam(':contato', $dados['ipt-contato']);
			$dados_editar->bindParam(':observacao', $dados['ta-observacao']);

			$dados_editar->execute();
				

			} catch (PDOException $erro) {
				echo "ERRO: ".$erro->getMessage();
			}	

			if($dados_editar->rowCount()) {
				//echo "<script>alert('Registro ATUALIZADO com SUCESSO.')</script>";
				//echo "<script>window.location.href = '/?pagina=".$form."'</script>";
				return true;
				//echo "<script>window.location.href = '../view/demandas-do-dia.php'</script>";
			
			} else {
				//echo "<script>alert('ERRO ao ATUALIZAR Registro.')</script>";
				//print_r($dados_editar->errorInfo());
				return false;
			}

		}

	}

?>