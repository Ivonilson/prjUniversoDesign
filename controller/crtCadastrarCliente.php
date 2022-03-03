<?php
require "model/CadastrarCliente.php";
require "model/Cidade.php";


class crtCadastrarCliente {

	public function cadastrarCliente()
		{	
			$usuario = new Conn();

			if(filter_input(INPUT_POST, 'ipt-nome') != '') {
				$usuario = new CadastrarCliente();

				if($usuario->cadCliente(filter_input(INPUT_POST, 'ipt-nome'), filter_input(INPUT_POST, 'ipt-cpf-cnpj'), filter_input(INPUT_POST, 'ipt-endereco'), filter_input(INPUT_POST, 'ipt-bairro'), filter_input(INPUT_POST, 'sel-cidade-uf'), filter_input(INPUT_POST, 'ipt-tel-fixo'), filter_input(INPUT_POST, 'ipt-tel-cel'), filter_input(INPUT_POST, 'ipt-email'))) {

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

?>