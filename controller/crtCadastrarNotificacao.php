<?php

	class crtCadastrarNotificacao {

		public function cadastrarNotificacao()
		{	
			$usuario = new Conn();

			if(filter_input(INPUT_POST, 'sel-tipo') != '-' && filter_input(INPUT_POST, 'sel-tipo') != '') {
				$usuario = new CadastrarNotificacao();
				if($usuario->cadNotificacao()){
					return "Notificação cadastrada com sucesso!";
				} else {
					return "ERRO. Contate o Suporte.";
				}
					
			} else {
				$mensagem_erro = "-";
			}
		}
	}

	$crtl = new crtCadastrarNotificacao();
	$mensagem_erro = $crtl->cadastrarNotificacao();
?>