<?php
require_once "Conn.php";

class EditarNotificacao {


	public function edNotificacao()
	{
			$dados = filter_input_array(INPUT_GET, FILTER_DEFAULT);
			//$form = filter_input(INPUT_GET, 'pagina');

			if (!empty($dados['btnGravar'])) {
				unset($dados['btnGravar']);
			}

			try {

			$conn = new Conn();

			$queryEditarNotificacao = "UPDATE tbl_notificacoes SET status = :status, data_programada_resolver = :data_programada_resolver WHERE id_notificacao = :id_notificacao";

			$dados_editar = $conn->getConn()->prepare($queryEditarNotificacao);

			$dados_editar->bindParam(':id_notificacao', $dados['ipt-id-notificacao']);
			$dados_editar->bindParam(':status', $dados['sel-resolver']);
			$dados_editar->bindParam(':data_programada_resolver', $dados['ipt-data-adiada']);

			$dados_editar->execute();

			} catch (PDOException $erro) {
				echo "ERRO: ".$erro->getMessage();
			}	

			if($dados_editar->rowCount()) {
				echo "<script>alert('Registro ATUALIZADO com SUCESSO.')</script>";
				unset($dados);
				
				echo "<script>window.location.href ='/?pagina=os-do-dia'</script>";
				
			} else {
				echo "<script>alert('ERRO ao ATUALIZAR Registro.')</script>";
				print_r($dados_editar->errorInfo());
			}

			$conn = NULL;

		}



	}
