let botao = document.getElementById("botao");

/*botao.addEventListener("click", function(){
	$.ajax({
	url: 'arquivo1.php',
	success: function(data) {
		$('div').html(data);
		data.preventDefault();

	}
	});
	//alert('clicado...');
});*/

/*$("#form").submit(function(event){
		var dados = $('#form').serialize();

		$.ajax({
		type: 'POST',
		url: 'db.php',
		contentType: 'application/json',
		dataType: 'json',
		data: dados,
		success: function(data) { 
			$("input[type=text]").val("");
			//window.location.href = 'db.php';
		}
	});
	event.preventDefault();

});*/

$(document).ready(function(){

	$('#submit').click(function(){
		var texto = $("#texto").val();

		$('#alert').html('');

		if (texto == '') {
			$('#alert').html('Preencher o campo de texto');
			$('#alert').addClass("alert-danger");
			return false;
		}

		event.preventDefault();

		$.ajax({

			url:'db.php',
			type:'POST',
			dataType: 'text',
			contentType: 'application/x-www-form-urlencoded',
			data: {'texto' : texto},
			success: function(data){
				console.log(data);
				$('form').trigger("reset");
				$('#alert').html('Dados enviados...');
				$('#alert').removeClass("alert-danger");
				$('#alert').addClass("alert-success");
				//$('#info').addClass("alert-primary");
				//$('#info').html("Informação gravada: " + data);
				/*setTimeout(function(){
					$('#alert').fadeOut('Slow');
					//$('#info').fadeOut('Slow');
				}, 3000);*/

				window.location.href = 'db.php';

			}

		});

		console.log("clicou...");

	});
	
});

