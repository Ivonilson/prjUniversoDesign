<?php
require "model/CadastrarCliente.php";
require "model/Cidade.php";


class crtCadastrarCliente {

	public function cadastrarCliente()
		{	
			$usuario = new Conn();

			if(filter_input(INPUT_POST, 'ipt-nome') != '') {
				$usuario = new CadastrarCliente();

				if($usuario->cadCliente()) {

					return "Cadastrado realizado com sucesso!";

				} else {

					return "ERRO. Provavelmente o cliente com este CPF/CNPJ já esteja cadastrado. Por favor verifique o CPF que está tentando cadastrar. Caso o problema persista, contate o Suporte.";
				}
				
			} else {
				return "-";
		}
	}
}

$crtl = new crtCadastrarCliente();
$mensagem_erro = $crtl->cadastrarCliente();
