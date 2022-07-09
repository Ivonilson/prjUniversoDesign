
	<nav class="navbar navbar-expand-lg navbar-light fixed-top" id="mainNav" style="background-color: #2F4F4F;">
		<a href="/?pagina=os-do-dia" class="navbar-brand text-light font-weight-bold text-lg" style="font-size: 22px; font-family: Bradley Hand, cursive">Universo Design</a>
		
		<div class="bg-light mb-2">
			<button class="navbar-toggler navbar-toggler-right" type="button" data-toggle="collapse" data-target="#navbarCurso" aria-control="navbarCurso" aria-expanded="false" aria-label="Navegação Toggle">
			<span class="navbar-toggler-icon"></span>
		</button>
		</div>

		<div id="navbarCurso" class="collapse navbar-collapse" id="linksaccordion">
			<ul class="navbar-nav navbar-sidenav accordion bg-light pl-1 pr-1">

				<li class="nav-item" id="navegacao">
					<a href="#" class="nav-link nav-link-collapse" data-toggle="collapse" data-target="#collapseRegistro">
						<i class="fa fa-sticky-note-o"></i>
						<span class="nav-link-text">Registros</span>
					</a>

					<ul class="sidenav-second-level collapse" id="collapseRegistro" data-parent="#linksaccordion" style="background-color: #F5FFFA">

						<li>
							<a href="/?pagina=cadastrar-orcamento" target="opcoes-menu" >Novo Orçamento</a>
						</li>

						<li>
							<a href="/?pagina=cadastrar-os" target="opcoes-menu" >Cadastrar O.S.</a>
						</li>

						<li>
							<a href="/?pagina=cadastrar-produto" target="opcoes-menu" >Cadastrar Produto</a>
						</li>

						<li>
							<a href="/?pagina=cadastrar-cliente" target="opcoes-menu" >Cadastrar Cliente</a>
						</li>

						<li>
							<a href="/?pagina=cadastrar-notificacao" target="opcoes-menu" >Cadastrar Notificação</a>
						</li>

					</ul>
				</li>

				<li class="nav-item" id="navegacao">
					<a href="#" class="nav-link nav-link-collapse" data-toggle="collapse" data-target="#collapsePesquisas">
						<i  class="fa fa-search" aria-hidden="true"></i>
						<span class="nav-link-text">Consultas</span>
					</a>
					<ul class="sidenav-second-level collapse" id="collapsePesquisas" data-parent="#linksaccordion" style="background-color: #F5FFFA">
						<li>
							<a href="/?pagina=pesquisa-por-orcamento">Orçamentos</a>
						</li>
						<li>
							<a href="/?pagina=os-do-dia">O.S(s) Vencendo Hoje</a>
						</li>
						<li>
							<a href="/?pagina=pesquisa-por-data-receb">Ordens de serviço por data de recebimento</a>
						</li>
						<li>
							<a href="/?pagina=pesquisa-por-data-agendamento">Ordens de serviço por data de agendamento</a>
						</li>
						<li>
							<a href="/?pagina=pesquisa-por-os">O.S por código</a>
						</li>
						<li>
							<a href="/?pagina=pesquisa-cliente">Clientes</a>
						</li>
						<li>
							<a href="/?pagina=pesquisa-produto">Produtos</a>
						</li>
						<!--<li>
							<a href="">Histórico da Ordem de Serviço</a>
						</li>-->
					</ul>
				</li>

				<li class="nav-item" id="navegacao">
					<a href="#" class="nav-link nav-link-collapse" data-toggle="collapse" data-target="#collapseListas">
						<i class="fa fa-tasks"></i>
						<span class="nav-link-text">Agendamentos</span>
					</a>

					<ul class="sidenav-second-level collapse" id="collapseListas" data-parent="#linksaccordion" style="background-color: #F5FFFA">

						<li>
							<a href="/?pagina=lista-agendamentos">Visitas agendadas</a>
						</li>

					</ul>
				</li>

				<li class="nav-item" id="navegacao">
					<a href="#" class="nav-link nav-link-collapse" data-toggle="collapse" data-target="#collapseFinaceiro">
						<i class="fa fa-tasks"></i>
						<span class="nav-link-text">Financeiro</span>
					</a>

					<ul class="sidenav-second-level collapse" id="collapseFinaceiro" data-parent="#linksaccordion" style="background-color: #F5FFFA">

						<li>
							<a href="#" class="nav-link nav-link-collapse" data-toggle="collapse" data-target="#collapseDespesa">Controle de Caixa</a>

							<ul class="sidenav-second-level collapse" id="collapseDespesa" data-parent="#linksaccordion" style="background-color: #F5FFFA">

								<li>
									<a href="/?pagina=lancar-despesa">Lançar Despesa</a>
								</li>

								<li>
									<a href="/?pagina=lancar-receita">Lançar Receita</a>
								</li>

							</ul>

						</li>

						<li>
							<a href="/?pagina=fluxo-de-caixa" href="#" class="nav-link nav-link-collapse" data-toggle="collapse" data-target="#collapseResultados">Fluxo de Caixa</a>

							<ul class="sidenav-second-level collapse" id="collapseResultados" data-parent="#linksaccordion" style="background-color: #F5FFFA">

								<li>
									<a href="/?pagina=resultados-caixa">Resultados</a>
								</li>

							</ul>

						</li>

					</ul>
				</li>

				<!--
				<li class="nav-item">
					<a href="#" class="nav-link nav-link-collapse" data-toggle="collapse" data-target="#collapseFerramentas">
						<i class="fa fa-suitcase"></i>
						<span class="nav-link-text">Ferramentas</span>
					</a>

					<ul class="sidenav-second-level collapse" id="collapseFerramentas" data-parent="#linksaccordion">

						<li>
							<a href="/?pagina=nfe" target="opcoes-menu" >NFe</a>
						</li>

					</ul>
				</li>
				-->

			</ul>

			<ul class="navbar-nav sidenav-toggler">
				<li class="nav-item">
					<a href="#" id="sidenavToggler" class="nav-link text-center">
						<i class="fa fa-fw fa-angle-left"></i>
					</a>
				</li>	
			</ul>

			<?php
				$buscaNotificacoes = new CadastrarNotificacao();
				$resultadoNotificacoes = $buscaNotificacoes->carregaNotificacoes();

			?>

			<ul class="navbar-nav ml-auto col">
				<li class="nav-item dropdown">
					<a href="#" class="nav-link mr-lg-2" data-toggle="modal" data-target="#modalNotificacoes">
						<?php 
							if($resultadoNotificacoes){
							$total = 0;
							foreach ($resultadoNotificacoes as $value) {
								$total++;
							}
							$total;
						?>
						<!--<span class="indicator text-warning d-none d-lg-block">
							<i class="fa fa-fw fa-circle"></i>
						</span>-->
						<i class="fa fa-fw fa-bell fa-blink" style="color: #FFFF00;" title="Notificações"></i>
						<span class=" indicator badge badge-warning"><?=$total?></span>
						<?php
							} else {

						?>
						<i class="fa fa-fw fa-bell text-muted large" title="Notificações"></i>
						<span class=" indicator badge badge-light">0</span>
						<?php
							}
						?>
					</a>
				</li>
				<?php 
				if(@$total > 0 && date('H') > '13' && date('H') < '16') {

				?>

				<style type="text/css">

					@keyframes fa-blink {
    				 0% { opacity: 1; }
    			 	50% { opacity: 0.5; }
     				100% { opacity: 0; }
 					}

					.fa-blink {
   						-webkit-animation: fa-blink .75s linear infinite;
  				 		-moz-animation: fa-blink .75s linear infinite;
   						-ms-animation: fa-blink .75s linear infinite;
   						-o-animation: fa-blink .75s linear infinite;
   						animation: fa-blink .75s linear infinite;
						}
				</style>
					<span class="large text-light text-left font-weight-bold bg-danger p-1 border border-white">Alerta(s) pendente(s)</span>

				<?php
					} elseif(@$total > 0 && date('s') > '0' && date('s') < '21'){

				?>

				<style type="text/css">

					@keyframes fa-blink {
     				0% { opacity: 1; }
     				50% { opacity: 0.5; }
     				100% { opacity: 0; }
 					}

					.fa-blink {
   						-webkit-animation: fa-blink .75s linear infinite;
  						-moz-animation: fa-blink .75s linear infinite;
   						-ms-animation: fa-blink .75s linear infinite;
   						-o-animation: fa-blink .75s linear infinite;
   						animation: fa-blink .75s linear infinite;
					}
				</style>
					<!--<span class="text-light font-weight-bold btn-danger p-1 border border-white">Alerta(s) pendente(s)</span>-->

				<?php
					}
				?>
				
				<!--<li class="nav-item">
					<form class="form-inline my-2 my-lg-0 mr-lg-2">
						<div class="input-group">
							<input type="text" class="form-control" placeholder="Pesquisar por...">
							<span class="input-group-btn">
								<button class="btn btn-primary" type="button">
									<i class="fa fa-search"></i>
								</button>
							</span>
						</div>
					</form>
				</li>-->

				<li class="nav-item col-lg-10">
					<a href="#" class="nav-link text-light col-3"> 
						<i class="fa fa-user float-left" title="Usuário"><span style="font-size: 15px; font-family: Arial, sans-serif">&nbsp&nbsp<?= $_SESSION['user']?></span></i>
					</a>
				</li>
				<li>
					<a href="/?pagina=logout" class="nav-link text-light col-2">
						<i class="fa fa-sign-out float-right" title="Sair do Sistema" style="font-family: "><span style="font-size: 15px; font-family: Arial, sans-serif">Logout</span></i>
					</a>
				</li>
			</ul>

		</div>
	</nav>

	<!-- MODAL DAS NOTIFICAÇÕES -->
	<div class="modal fade offset-0 col-12 offset-0" tabindex="-1" id="modalNotificacoes" role="dialog" aria-labelledby="notificacoes" aria-hidden="true">
		<div class="modal-dialog" role="document">
			<div class="modal-content">
				<div class="modal-header">
					<h5 class="modal-title text-center text-danger" id="notificacoes"><?="Pendências programadas para resolver em ".date('d/m/Y')?></h5>
					<button class="close" data-dismiss="modal" aria-label="Close">
							<span aria-hidden="true">&times;</span>
					</button>
				</div>

				<?php 

					foreach ($resultadoNotificacoes as $dados) {

				?>

				<div class="modal-body">
					<span class="text-info">
						<strong>
							<?=$dados->descricao?>
						</strong>
					</span>
					<br>

					<span class="small text-danger">Cadastrado em: </span><p class="text-muted"> <?=date_format(date_create($dados->data_cadastro), 'd/m/Y H:i:s')
							?></p>
					<span class="small text-danger">Cadastrado por:</span><p class="text-muted"> <?=$dados->usuario
							?></p>
							
					<span class="small text-danger" >Remetente: </span><p class="text-muted"><?=$dados->remetente?></p>

					<span class="small text-danger" >Destinatário: </span><p class="text-muted"><?=$dados->destinatario?></p>

					<span class="small text-danger" >Meio da notificação: </span><p class="text-muted"><?=$dados->meio_notificacao?></p>

					<!--<span class="small text-danger">Data de emissão: </span><p class="text-muted"> <?=date_format(date_create($dados->data_emissao), 'd/m/Y')
							?></p>-->

					<span class="text-danger font-weight-bold">Data limite: </span><p class="text-muted font-weight-bold"> <?=date_format(date_create($dados->data_limite), 'd/m/Y')
							?></p>

					<span class="small text-danger">Prioridade: </span><p class="text-muted"><?=$dados->prioridade?></p>

					<span class="small text-danger">Observações: </span><p class="text-muted"><?=$dados->observacoes?></p>

					<form method="get">

							<input type="hidden" name="ipt-id-notificacao" value="<?=$dados->id_notificacao?>">
							<input type="hidden" name="pagina" value="editar-notificacao">

							<div class="input-group col mb-2" >
								<div class="input-group-prepend">
									<label class="input-group-text bg-info text-white">Ação</label>
								</div>
								<select name="sel-resolver" class="custom-select" id="sel-status-notificacao">
									<option value="-">Selecione</option>
									<option value="RESOLVIDO">RESOLVIDO</option>
									<option value="ADIAR">ADIAR</option>
								</select>	
							</div>

							<div class="input-group col mb-2 d-none" id="div-adiar">
								<div class="input-group-prepend">
									<label class="input-group-text bg-info text-white">Adiar para</label>
								</div>
								<input type="date" class="form-control" name="ipt-data-adiada">
							</div>

							<div class="input-group col mt-1">
								<input type="submit" class="btn btn-info text-white btn-block" name="btnGravar" value="Gravar">
							</div>
						</form>

					<hr>
				</div>

				<?php

					}

				?>
			</div>
		</div>
	</div>