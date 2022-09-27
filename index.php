<?php
session_start();
require "model/Conn.php";
include "controller/crtValidarUsuario.php";
require "model/CadastrarNotificacao.php";
require "model/EditarNotificacao.php";

//$pagina = isset($_GET['pagina']) ? $_GET['pagina'] : "login";
 $pagina = isset($_GET['pagina']) ? $_GET['pagina'] : $pagina = 'site';

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

	case 'incluir-item-orcamento':
		require "controller/crtIncluirItemOrcamento.php";
		include_once "view/incluir-item-orcamento.php";
		break;

	case 'cadastrar-os':
		require "controller/crtCadastrarOs.php";
		require_once "model/CadastrarOs.php";
		include_once "view/cadastrar-os.php";
		break;

	case 'lancar-despesa':
		require "controller/crtDespesa.php";
		include_once "view/lancar-despesa.php";
		break;

	case 'lancar-receita':
		require "controller/crtReceita.php";
		include_once "view/lancar-receita.php";
		break;

	case 'lancar-planejamento':
		require "controller/crtPlanejamento.php";
		include_once "view/lancar-planejamento.php";
		break;

	case 'planejamento':
		require_once "controller/crtPlanejamento.php";
		include_once "view/planejamento.php";
		break;

	case 'resultados':
		require_once "controller/crtResultados.php";
		include_once "view/resultados.php";
		break;

	case 'resultados-controle':
		require_once "controller/crtResultados.php";
		include_once "view/resultados-controle.php";
		break;

	case 'cadastrar-cidade':
		require "controller/crtCadastrarCidade.php";
		include_once "view/cadastrar-cidade.php";
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
		require_once "controller/crtEditarOs.php";
		include_once "view/editar-os.php";
		break;

	case 'editar-cliente':
		require "controller/crtEditarCliente.php";
		include "view/editar-cliente.php";
		break;

	case 'editar-produto':
		require "controller/crtEditarProduto.php";
		include "view/editar-produto.php";
		break;

	case 'pesquisa-por-data-receb':
		require "controller/crtPesquisaPorDataReceb.php";
		$crtl = new crtPesquisaPorDataReceb();
		$crtl->pesquisaPorDataReceb();
		break;

	case 'despesa-por-periodo':
		require_once "controller/crtDespesa.php";
		include "view/despesa-por-periodo.php";
		break;

	case 'receita-por-periodo':
		require_once "controller/crtReceita.php";
		include "view/receita-por-periodo.php";
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

	case 'login':
		include "view/login.php";
		break;

	case 'logout':
		unset($_SESSION['user']);
		include_once "view/login.php";
		break;
	
	case 'site': 
		include "site/index.html";
		break;
}
