<?php

require "model/ListaAgendamentos.php";

class crtListaAgendamento {

	public function listaAgendamento()
	{	
		$usuario = new ListaAgendamentos();
		$resultado = $usuario->dadosListaAgendamento();
		include_once "view/lista-agendamentos.php";

		return $resultado;
	}
}

$crtl = new crtListaAgendamento();
$crtl->listaAgendamento();
