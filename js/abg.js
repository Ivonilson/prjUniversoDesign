function verificaStatus(){

	   let valor = document.querySelector(".status").innerHTML;

	   switch(valor) {
	   	case "FINALIZADO":
	   		document.querySelector(".status").className = "bg-success text-white";
	   		break;
	   	case "CANCELADA":
	   		document.querySelector(".status").className = "bg-secondary text-white";
	   		break;
	   	case "PENDENTE":
	   		document.querySelector(".status").className = "bg-danger text-white";
	   		break;
	   	default:
	   		document.querySelector(".status").className = "bg-secondary text-white";
	   }

}

function verificaStatusLista(){

	   let valor = document.querySelector(".statusLista").innerHTML;

	   switch(valor) {
	   	case "PENDENTE":
	   		document.querySelector(".statusLista").className = "text-danger";
	   		break;
	   	default:
	   		document.querySelector(".statusLista").className = "text-danger";
	   		break;
	   }
}

/*$(document).ready(function(){
	$(".valor").on("input", function(){
		var textoDigitado = $(this).val();
		var inputCusto = $(this).attr("custo");
		$("#"+ inputCusto).val(textoDigitado);
	})
})*/

function Redirect(){
    setTimeout("location.reload(true);",600000);   
 }

function configurarBarra(){
   setInterval(() => {
   		let percentual = ((parseInt(document.getElementById('quantOsFinalizada').innerHTML)) / (parseInt(document.getElementById('qtdDemandas').innerHTML))) *  100 ;
   		if(isNaN(percentual)){
   			 percentual = 100;
   		}
      	const valorDiv = document.querySelector(`[barra-progresso] > div`);
      	const valorDivExterna = document.querySelector(`[barra-progresso]`);
      	valorDiv.style.width = `${percentual}%`;
      	valorDiv.innerHTML = `${percentual.toFixed(2)}%`;
      		if(percentual == 100){
      			valorDiv.style.backgroundColor = '#3CB371';
      			valorDivExterna.style.borderColor = '#3CB371';
      		}
      		if(percentual <= 9){
      			valorDiv.style.backgroundColor = '#F8F8FF';
      			valorDiv.style.color = '#DC143C';
      		}
     }, 500)
}

var contador = 0;

function addItem(){


	let produto = document.getElementById('select-prod').value;
	let valor_produto = produto.split('/', 2);
	let nome_produto = produto.split('/', 1);
	//produto = produto.split('/', 1);
	let qtdItens = document.getElementById('inlineFormInputQuant').value;
	//let preco_unitario = document.getElementById('preco').value;
	let altura = document.getElementById('inlineFormInputAltura').value;
	altura = altura.replace(',' , '.');
	let largura = document.getElementById('inlineFormInputLargura').value;
	largura = largura.replace(',' , '.');
	let ipt = document.createElement('input');	

	let iptProduto = document.createElement('input');
	iptProduto.className = 'form-control mb-3';
	iptProduto.setAttribute('id', 'ipt_prod');
	iptProduto.setAttribute('name', 'iptProduto');
	iptProduto.setAttribute('readonly', '');
	//iptProduto.setAttribute('disabled', 'disabled');

	let iptValorUnit = document.createElement('input');
	iptValorUnit.className = 'form-control mb-3 float-left';
	iptValorUnit.setAttribute('id', 'ipt_valor_unit');
	iptValorUnit.setAttribute('name', 'iptValorUnit');
	iptValorUnit.setAttribute('readonly', '');


	let iptQuant = document.createElement('input');
	iptQuant.className = 'form-control mb-3';
	iptQuant.setAttribute('id', 'ipt_quant');
	iptQuant.setAttribute('name', 'iptQuant');
	iptQuant.setAttribute('readonly', '');


	let iptTotal = document.createElement('input');
	iptTotal.className = 'form-control mb-3';
	iptTotal.setAttribute('id', 'ipt_total');
	iptTotal.setAttribute('name', 'iptTotal');
	iptTotal.setAttribute('readonly', '');

	let iptDesconto = document.createElement('input');
	iptDesconto.className = 'form-control mb-3';
	iptDesconto.setAttribute('id', 'ipt_desconto');
	iptDesconto.setAttribute('name', 'iptDesconto');
	iptDesconto.setAttribute('readonly', '');

	let iptTotalPagar = document.createElement('input');
	iptTotalPagar.className = 'form-control mb-3';
	iptTotalPagar.setAttribute('id', 'ipt_total_pagar');
	iptTotalPagar.setAttribute('name', 'iptTotalPagar');
	iptTotalPagar.setAttribute('readonly', '');

	let iconeExcluir = document.createElement('button');
	iconeExcluir.className = 'form-control text-center btn btn-danger text-light';
	iconeExcluir.setAttribute('type' , 'button');
	//iconeExcluir.setAttribute('title' , 'Excluir');
	iconeExcluir.setAttribute('id', 'botaoExcluir');
	iconeExcluir.innerHTML = 'Excluir';

	let divDescricao = document.createElement('div');
	divDescricao.className = 'col-3';
	divDescricao.setAttribute('id', 'divDescricao');
	let labelDescricao = document.createElement('label');
	labelDescricao.className = 'text-light text-left ml-0';
	labelDescricao.innerHTML = 'Descrição';

	let divValorUnitario = document.createElement('div');
	divValorUnitario.className = 'col-1';
	divValorUnitario.setAttribute('id', 'divValorUnitario');
	let labelValorUnitario = document.createElement('label');
	labelValorUnitario.className = 'text-light text-left ml-0';
	labelValorUnitario.innerHTML = 'Vl. Unit.(R$)';

	let divQuant = document.createElement('div');
	divQuant.className = 'col-1';
	divQuant.setAttribute('id', 'divQuant');
	let labelQuant = document.createElement('label');
	labelQuant.className = 'text-light text-left ml-0';
	labelQuant.innerHTML = 'Quant.';


	let divTotal = document.createElement('div');
	divTotal.className = 'col-2';
	divTotal.setAttribute('id', 'divTotal');
	let labelTotal = document.createElement('label');
	labelTotal.className = 'text-light text-left ml-0';
	labelTotal.innerHTML = 'Total (R$)';


	let divDesconto = document.createElement('div');
	divDesconto.className = 'col-2';
	divDesconto.setAttribute('id', 'divDesconto');
	let labelDesconto = document.createElement('label');
	labelDesconto.className = 'text-light text-left ml-0';
	labelDesconto.innerHTML = 'Desconto (R$)';

	let divTotalPagar = document.createElement('div');
	divTotalPagar.className = 'col-2';
	divTotalPagar.setAttribute('id', 'divTotalPagar');
	let labelTotalPagar = document.createElement('label');
	labelTotalPagar.className = 'text-light text-left ml-0';
	labelTotalPagar.innerHTML = 'A pagar (R$)';

	let divIconeExcluir = document.createElement('div');
	divIconeExcluir.className = 'col-1 botaoExcluir';
	divIconeExcluir.setAttribute('id', 'divIconeExcluir');
	let labelIconeExcluir = document.createElement('label');
	labelIconeExcluir.className = 'text-light text-left ml-0';
	labelIconeExcluir.innerHTML = 'Ação';


	let rowItem = document.createElement('div');
	rowItem.className = 'row produtos';

	let divItens = document.getElementById('itens');

	divDescricao.appendChild(iptProduto);
	divValorUnitario.appendChild(iptValorUnit);
	divQuant.appendChild(iptQuant);
	divTotal.appendChild(iptTotal);
	divDesconto.appendChild(iptDesconto);
	divTotalPagar.appendChild(iptTotalPagar);
	divIconeExcluir.appendChild(iconeExcluir);

	divItens.appendChild(rowItem);
	rowItem.appendChild(divDescricao);
	rowItem.appendChild(divValorUnitario);
	rowItem.appendChild(divQuant);
	rowItem.appendChild(divTotal);
	rowItem.appendChild(divDesconto);
	rowItem.appendChild(divTotalPagar);
	rowItem.appendChild(divIconeExcluir);

	if(altura > 0){
		let subtotal = (((parseFloat(altura) * parseFloat(largura)) * parseFloat(valor_produto[1])) * parseFloat(qtdItens));
		ipt.value = nome_produto; 
		iptProduto.value = nome_produto + ' (' + largura + ' larg. X ' + altura + ' alt.)';
		iptValorUnit.value = valor_produto[1];
		iptQuant.value = qtdItens;
		let desconto = document.getElementById('percentualDesconto').value / 100;

		//Valor total do item sem desconto
		iptTotal.value = subtotal.toFixed(2);

		if(desconto > 0){
			let valorDesconto = subtotal * desconto;
			subtotal = subtotal - (subtotal * desconto);
			iptDesconto.value = valorDesconto.toFixed(2) + ' (' + (desconto * 100) + '%)';
			iptTotalPagar.value = subtotal.toFixed(2);
			iconeExcluir.value = 'Excluir';

		} else {
			iptDesconto.value = 0.00;
			iptTotalPagar.value = subtotal.toFixed(2);
			iconeExcluir.value = 'Excluir';

		}
		
	} else {
		let subtotal = parseFloat(qtdItens) * parseFloat(valor_produto[1]);
		ipt.value = nome_produto; 
		iptProduto.value = nome_produto;
		iptValorUnit.value = valor_produto[1];
		iptQuant.value = qtdItens;
		//ipt.value += ' / Valor unit: ' + valor_produto[1] + ' / Qtd: '+ qtdItens + ' / Total sem desc.: ' + subtotal.toFixed(2);
		
		let desconto = document.getElementById('percentualDesconto').value;
		desconto = desconto.replace(',' , '.');
		desconto = parseFloat(desconto) / 100;

		//Valor total do item sem desconto
		iptTotal.value = subtotal.toFixed(2);

		if(desconto > 0){
			let valorDesconto = subtotal * desconto;
			subtotal = subtotal - (subtotal * desconto);
			//ipt.value += ' / Total com desc.: ' + subtotal.toFixed(2) + '<br>' ;
			iptDesconto.value = valorDesconto.toFixed(2) + ' (' + (desconto * 100) + '%)';
			iptTotalPagar.value = subtotal.toFixed(2);
			iconeExcluir.value = 'Excluir';

		} else {
			//ipt.value += ' / Total com desc.: ' + subtotal.toFixed(2) + '<br>' ;
			iptDesconto.value = 0.00;
			iptTotalPagar.value = subtotal.toFixed(2);
			iconeExcluir.value = 'Excluir';

		}
		
	}

	//ipt.disabled = 'disabled';
	ipt.className = 'form-control col-12 mb-1 produtosRelacionados';
	ipt.setAttribute('id', 'itensLancados');
	ipt.setAttribute('name', 'ipt-produtos[]');

	//ipt.setAttribute('onclick', 'remover()');
	
	//div.appendChild(ipt);
	//divProdutos.appendChild(iptValorUnit);
	//div.appendChild(iptProduto);
	//div.appendChild(iptValorUnit);
	//total += subtotal;
	//document.getElementById('valorTotal').value = total.toFixed(2);
	//mostraItensLancados();
	document.getElementById('inlineFormInputQuant').value = 1;
	//document.getElementById('select-prod').value = 0;

	let elemento = document.querySelectorAll('.produtos');
	let clickBotao = document.querySelectorAll('.botaoExcluir');
	let contador = 0;

	for(let item of elemento){

		clickBotao[contador].onclick = function(){

			if(confirm('Confirma a Exclusão?')){
				item.remove();
				valorTotal();
				Descontos();
				TotalPagar();
				retornaItensConsolidado();
		 	}

		}
		contador++;
	}

	valorTotal();
	Descontos();
	TotalPagar();
	retornaItensConsolidado();
}

function zerar(){
	document.getElementById('valorTotal').value = 0;
	document.getElementById('valorFinal').value = 0;
}

function alturaLarguraPadrao(){
	document.getElementById('inlineFormInputAltura').value = 1;
	document.getElementById('inlineFormInputLargura').value = 1;
}

function zerarAlturaLargura(){
	document.getElementById('inlineFormInputAltura').value = "-";
	document.getElementById('inlineFormInputLargura').value = "-";
}

function desativarDimensoes(){
	$("#select-prod").on('change', function(){
		let iptAltura = document.querySelector("#inlineFormInputAltura");
		let iptLargura = document.querySelector("#inlineFormInputLargura");
		let iptAlvo = document.querySelectorAll('#select-prod');
		let lblAltura = document.querySelector('#lblAltura');
		let lblLargura = document.querySelector('#lblLargura');
		let divIptItens = document.querySelector('#divIptItens');

		for(let itens of iptAlvo){
			let item = itens.value;
			let unidade = item.split('(', 2);

			if(unidade[1].substring(0, 2) != 'm²'){
				zerarAlturaLargura();
				iptAltura.setAttribute("disabled", "");
				iptLargura.setAttribute("disabled", "");

			} else {
				alturaLarguraPadrao();
				iptAltura.removeAttribute("disabled");
				iptLargura.removeAttribute("disabled");
			}
			//alert(unidade[1].substring(0,1));
		}
		//let unidadeMedida = iptAlvo.substring(36, 40);
		//alert(iptAlvo);
	});
}

function valorTotal()
{
	var conteudo;	
	let totais = document.querySelectorAll('#ipt_total');
	let soma = 0;
	let indice = 0;

	totais.forEach(function(valor, indice){
		soma += parseFloat(valor.value);
	});

	//alert(totais.length);
	document.getElementById('valorTotal').value = new Intl.NumberFormat('pt-BR', {minimumFractionDigits: 2}).format(soma);
}

function Descontos()
{
	var conteudo;	
	let totais = document.querySelectorAll('#ipt_desconto');
	let soma = 0;
	let indice = 0;
	let valorTotalItens = document.getElementById('valorTotal').value;

	let percentual = 0;

	totais.forEach(function(desconto, indice){
		soma += parseFloat(desconto.value);
		percentual = ((soma / valorTotalItens.replace('.', '').replace(',' , '.')) * 100).toFixed(2);
	});

	//alert(totais.length);
	document.getElementById('Desconto').value = new Intl.NumberFormat('pt-BR', {minimumFractionDigits: 2}).format(soma) + ' (' + percentual + '%)';
}

function TotalPagar()
{
	var conteudo;	
	let totais = document.querySelectorAll('#ipt_total_pagar');
	let soma = 0;
	let indice = 0;

	totais.forEach(function(valor, indice){
		soma += parseFloat(valor.value);
	});

	//alert(totais.length);
	document.getElementById('valorTotalPagar').value = new Intl.NumberFormat('pt-BR', {minimumFractionDigits: 2} ).format(soma);
}

function retornaItensConsolidado() {
	let descricao = document.querySelectorAll('#ipt_prod');
	let valor_unit = document.querySelectorAll('#ipt_valor_unit');
	let quant = document.querySelectorAll('#ipt_quant');
	let valor_total = document.querySelectorAll('#ipt_total');
	let desconto = document.querySelectorAll('#ipt_desconto');
	let total_pagar = document.querySelectorAll('#ipt_total_pagar');
	let produtos = "";
	let cont = 0;

	for (let itens of descricao){
		produtos += descricao[cont].value + "-" + valor_unit[cont].value + "-" + quant[cont].value + "-" + valor_total[cont].value +
		"-" + desconto[cont].value + "-" + total_pagar[cont].value + "/";
		cont++;
	}
	document.getElementById('consolidado').value = produtos;
}

desativarDimensoes();

function confirmarDelecaoItem()
{
	let botaoDeletar = document.querySelectorAll("#btnDeletarItem");
	let confirma = document.querySelectorAll('#ipt-confirma'); 

	botaoDeletar.forEach(clique =>{

		$(clique).click(function(){

			if(confirm('Tem certeza que deseja EXCLUIR este item?')){
				let contador = 0;
				confirma.forEach(function(){
					confirma[contador].setAttribute('value', 'true');
					contador++;
				});
			}

		});
		
	});

}

function confirmarDelecaoOrcamento()
{
	let botaoDeletar = document.querySelectorAll("#btn-del-orcamento");
	let confirmaDeletarOrcamento = document.querySelectorAll('#orcamento-deletar'); 

	botaoDeletar.forEach(orcamento =>{

		$(orcamento).click(function(){

			if(confirm('Tem certeza que deseja EXCLUIR este ORÇAMENTO PERMANENTEMENTE?')){
				let contador = 0;
				confirmaDeletarOrcamento.forEach(function(){
					confirmaDeletarOrcamento[contador].setAttribute('value', 'true');
					contador++;
				});
			}

		});
		
	});

}

$(document).ready(function(){
   $(".alertaCadOsOk").fadeIn(300).delay(2000).fadeOut(400);
});

$(document).ready(function(){
   $(".alertaCadOsNoOk").fadeIn(300).delay(8000).fadeOut(400);
});

$(document).ready(function(){
   $(".msgErroLogin").fadeIn(100).delay(2000).fadeOut(200);
});



/*Faz a leitura do clique no botão Adicionar para incluir o cabeçalho da relação de itens que estão sendo
inseridas no orçamento*/
$(document).ready(function(){
	$("#btnAdicionar").click(function(){
		let divItens = document.querySelector("#itens");
		divItens.setAttribute("class", "col-12 p-2");
		divItens.setAttribute("style", "background-color:#FFFFF0");
	});
});

/*Cores padrão das telas de cadastro**/
$(document).ready(function(){

	let botoes_atalho_cad = document.querySelectorAll(".botoes-atalho-cad");
	
	botoes_atalho_cad.forEach(item =>{
		item.setAttribute("class", "btn btn-secondary btn-block font-weight-bold rounded");
	});
	
	let jumbotron_tela_cadastro = document.querySelector("#jumbotron_telas_cadastro");
	jumbotron_tela_cadastro.setAttribute("class", "jumbotron jumbotron-fluid text-white bg-secondary");

	let background_tela_cadastro = document.querySelector("#background-tela-cadastro");
	background_tela_cadastro.setAttribute("style", "background-color: #DCDCDC");
	//background_tela_cadastro.setAttribute("style",  "background-image: url('../assets/logo.png');");

	let background_form_cad = document.querySelector(".background-form-cadastro");
	background_form_cad.setAttribute("style", "background-color: #FFFFF0; border-style: outset; padding-bottom: 3px");

	let botoes_gravar_cad = document.querySelector("#botoesGravarCad");
	botoes_gravar_cad.setAttribute("class", "btn btn-lg btn-secondary btn-block text-white font-weight-bold rounded")

});

/*Cores padrão das telas de consulta**/
$(document).ready(function(){

	let botoes_atalho_cons = document.querySelectorAll(".botoes-atalho-cons");
	

	botoes_atalho_cons.forEach(item =>{
		item.setAttribute("class", "btn btn-secondary btn-block font-weight-bold rounded");
	});
	
	/*por enquanto a função abaixo está sem uso, pois a telas de consulta não tem jumbotrom
	let jumbotron_tela_consulta = document.querySelector("#jumbotron_telas_consulta");
	jumbotron_tela_consulta.setAttribute("class", "jumbotron jumbotron-fluid text-white bg-info");*/

	let background_tela_consulta = document.querySelector("#background-tela-consulta");
	background_tela_consulta.setAttribute("style", "background-color: #DCDCDC");
	//background_tela_cadastro.setAttribute("style",  "background-image: url('../assets/logo.png');");

	let background_form_cons = document.querySelector(".background-form-cons");
	background_form_cons.setAttribute("style", "background-color: #FFFFF0; border-style: outset; padding-bottom: 3px");

	/*Setando as rows das tabelas propriedades das tabelas de consulta*/
	let row_tbl_consulta = document.querySelector("#row-tbl-consulta");
	row_tbl_consulta.setAttribute("class", "row border-light bg-light m-1");

	/*Ajuste das divs dos inputs de data das consultas*/
	let div_ipt_data_cons = document.querySelector("#div-ipt-data-form-cons");
	div_ipt_data_cons.setAttribute("class", "col-lg-5 col-md-4 col-sm-12 col-xs-12 mt-3");

	/*Ajuste das divs dos botoes de busca das consultas*/
	let div_btn_form_cons = document.querySelector("#div-btn-form-cons");
	div_btn_form_cons.setAttribute("class", "col-lg-5 col-md-5 col-sm-12 col-xs-12 mb-3");

	let botoes_cons = document.querySelector("#botoesCons");
	botoes_cons.setAttribute("class", "btn btn-lg btn-secondary btn-block text-white font-weight-bold rounded");
	//botoes_cons.setAttribute("style", "background-color: #483D8B");
});


/*Cores padrão das telas de edição*/
$(document).ready(function(){

	let background_tela_edicao = document.querySelector("#background-tela-edicao");
	background_tela_edicao.setAttribute("style", "background-color: #DCDCDC");

	let background_form_edicao = document.querySelector(".background-form-edicao");
	background_form_edicao.setAttribute("style", "background-color: #FFFFF0; border-style: outset; padding-bottom: 3px");

	/*background jumbotron telas de edição*/
	let background_jumbotron_telas_ed = document.querySelector("#jumbotron_telas_edicao");
	background_jumbotron_telas_ed.setAttribute("class", "jumbotron jumbotron-fluid text-white");
	background_jumbotron_telas_ed.setAttribute("style", "background-color: #2F4F4F");

	/*background das rows dos forms de edição*/
	let background_row_form_edicao = document.querySelector("#row-form-edicao");
	background_row_form_edicao.setAttribute("class", "row");
	background_row_form_edicao.setAttribute("style", "background-color: #E6E6FA");


	/*botões de gravar alterações de edições*/
	let btn_edicao = document.querySelector("#btnGravarEdicao");
	btn_edicao.setAttribute("class", "btn btn-info btn-block font-weight-bold rounded");
});

//mascaras campos inputs CADASTRAR CLIENTE
$(document).ready(function(){
	let inputCpfCnpj = document.querySelector("#inlineFormInputCpfCnpj");

	$("#inlineRadioPF").on('change', function(){

		$(".reset").bind("click", function() {
  			$("input[type=text], textarea").val("");
		});
		
		inputCpfCnpj.setAttribute("placeholder", "Digite o CPF (apenas os números)");
		$("#inlineFormInputCpfCnpj").mask("999.999.999-99");
		$("#inlineFormInputCpfCnpj").reset();
	});

	$("#inlineRadioPJ").on('change', function(){
		$("input[type=text], textarea").val("");
		inputCpfCnpj.setAttribute("placeholder", "Digite o CNPJ (apenas os números)");
		$("#inlineFormInputCpfCnpj").mask("99.999.999/9999-99");
		$("#inlineFormInputCpfCnpj").reset();
	});

	//$("#inlineFormInputCpfCnpj").mask("999.999.999-99");
	$("#inlineFormInputTelFixo").mask("(99) 9999-9999");
	$("#inlineFormInputTelCel").mask("(99) 99999-9999");
});

/*formatando os números do campo input de valor unitário da view editar-produto para o formato 
com ponto flutante padrão aceito no banco de dados MYSQL*/
$(document).ready(function(){
	$('.ipt-princ').on('input', function(){
		let valor_digitado = $(this).val();
		valor_digitado = valor_digitado.replace("." , "");
		valor_digitado = valor_digitado.replace("," , "." );
		let ipt_aux = $(this).attr("valor_unitario");
		$("#"+ ipt_aux).val(valor_digitado);
	});
	//let valor_unitario = document.querySelector("#inlineFormInputValorUnitario").value;
	//let valor_formatado = valor_unitario.replace("." , "");
	//valor_formatado = valor_formatado.replace("," , ".");

	//let input_recebe_formatado = document.querySelector("#unitarioFormatado");
	//input_recebe_formatado.setAttribute("value", valor_formatado);

});

confirmarDelecaoItem();
confirmarDelecaoOrcamento();



	




