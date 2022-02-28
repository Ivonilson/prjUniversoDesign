<?php
session_start();
include "controller/crtValidarUsuario.php";
require "model/CadastrarNotificacao.php";
require "model/EditarNotificacao.php";

$pagina = isset($_GET['pagina']) ? $_GET['pagina'] : "login";

	switch ($pagina) {

		case 'os-do-dia':
			require "controller/crtOsDoDia.php";
			break;

		case 'pesquisa-cliente':
			require "controller/crtPesquisaCliente.php";
			break;

		case 'cadastrar-orcamento':
			require "controller/crtCadastrarOrcamento.php";
			include_once "view/cadastrar-orcamento.php";
			break;

		case 'cadastrar-os':
			require "controller/crtCadastrarOs.php";
			require_once "model/CadastrarOs.php";
			include_once "view/cadastrar-os.php";
			break;

		case 'cadastrar-produto':
			require "controller/crtCadastrarProduto.php";
			require_once "model/CadastrarProduto.php";

			include_once "view/cadastrar-produto.php";
			break;

		case 'cadastrar-cliente':
			require "controller/crtCadastrarCliente.php";
			require_once "model/CadastrarCliente.php";
			include_once "view/cadastrar-cliente.php";
			break;

		case 'cadastrar-notificacao':
			require "controller/crtCadastrarNotificacao.php";
			include "view/cadastrar-notificacao.php";
			break;

		case 'editar-notificacao':
			require "controller/crtEditarNotificacao.php";
			break;

		case 'editar-os':
			require "controller/crtEditarOs.php";
			break;

		case 'editar-cliente':
			require "controller/crtEditarCliente.php";
			break;

		case 'editar-produto':
			require "controller/crtEditarProduto.php";
			$crtl = new crtEditarProduto();
			$crtl->editarProduto();
			break;

		case 'editar-orcamento':
			require "controller/crtEditarOrcamento.php";
			$crtl = new crtEditarOrcamento();
			$crtl->editarOrcamento();
			break;

		case 'pesquisa-por-data-receb':
			require "controller/crtPesquisaPorDataReceb.php";
			$crtl = new crtPesquisaPorDataReceb();
			$crtl->pesquisaPorDataReceb();
			break;

		case 'pesquisa-por-data-agendamento':
			require "controller/crtPesquisaPorDataAgendamento.php";
			$crtl = new crtPesquisaPorDataAgendamento();
			$crtl->pesquisaPorDataAgendamento();
			break;

		case 'pesquisa-por-os':
			require "controller/crtPesquisaPorOs.php";
			$crtl = new crtPesquisaPorOs();
			$crtl->pesquisaPorOs();
			break;

		case 'pesquisa-por-orcamento':
			require "controller/crtPesquisaPorOrcamento.php";
			$crtl = new crtPesquisaPorOrcamento();
			$crtl->pesquisaPorOrcamento();
			break;

		case 'itens-orcamento':
			require "controller/crtItensOrcamento.php";
			$crtl = new crtItensOrcamento();
			$crtl->itensOrcamento();
			break;

		case 'pesquisa-produto':
			require "controller/crtPesquisaProduto.php";
			$crtl = new crtPesquisaProduto();
			$crtl->pesquisaProduto();
			break;

		case 'lista-agendamentos':
			require "controller/crtListaAgendamento.php";
			break;

		case 'impressao-orcamento':
			require "controller/crtImpressaoOrcamento.php";
			$crtl = new crtImpressaoOrcamento();
			$crtl->impressaoOrcamento();
			break;

		case 'historico':
			require "controller/crtHistorico.php";
			$crtl = new crtHistorico();
			$crtl->historico();
			break;
			
		case 'logout':
			require "controller/crtLogout.php";
			$crtl = new crtLogout();
			$crtl->Logout();
			break;

		case 'login':
			require "view/login.php";
			break;

		case 'form_teste':
			require "controller/crtFormTeste.php";
			$crtl = new crtFormTeste();
			$crtl->formTeste();
			break;
	}

?>