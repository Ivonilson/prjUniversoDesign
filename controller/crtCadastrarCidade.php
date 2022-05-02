<?php
require_once "model/CadastrarCidade.php";

	class crtCadastrarCidade {

		public function cadastrarCidade(){	
			$usuario = new Conn();
			
			if(filter_input(INPUT_POST, 'ipt-cidade') != '' && filter_input(INPUT_POST, 'ipt-uf') != ''){
					$usuario = new CadastrarCidade();
					
					if($usuario->cadCidade()){
						return "Nova cidade cadastrada com Sucesso!";
					} else {
						return  "ERRO. Verifique se a cidade que está tentando cadastrar já exista no sistema ou contate o Suporte.";
					}
		
				}		
			}
		}

	$crtl = new crtCadastrarCidade();
	$mensagem_erro = $crtl->cadastrarCidade();
?>