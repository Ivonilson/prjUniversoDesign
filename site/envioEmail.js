$(function () {
    // Executa assim que o botão de salvar for clicado
    $('#btn_enviar').click(function (e) {

        // Cancela o envio do formulário
        e.preventDefault();

        // Pega os valores dos inputs e coloca nas variáveis
        var nome = $('#nome').val();
        var email = $('#email').val();
        var telefone = $('#telefone').val();
        var assunto = $('#assunto').val();
        var mensagem = $('#mensagem').val();

        if ($('#nome').val() == '' || $('#email').val() == '' || $('#telefone').val() == '' || $('#assunto').val() == ''  || $('#mensagem').val() == '') {
            alert('Preencha todos os campos para prosseguir.');
        }  else {

            aguarde()
    
            $.post('../model/phpMailer.php', {
                nome: nome,
                email: email,
                telefone: telefone,
                assunto: assunto,
                mensagem: mensagem
            }, function (resposta) {
                // Valida a resposta
                if (resposta != 'ERRO') {
                    // Limpa os inputs
                    $('input, textarea').val('');
                    document.getElementById('retorno').setAttribute("class", "text-center alert alert-success")
                    document.getElementById('retorno').innerHTML = 'Sua mensagem foi enviada. Agradecemos pelo contato!';
                    $('#retorno').fadeIn(300).delay(4000).fadeOut(400);
                } else {
                    alert(resposta.value);
                    alert('erro');
                }
            });

        }
    });
});

$(document).ready(function () {
    $(".alertaCadOsOk").fadeIn(300).delay(2000).fadeOut(400);
});

$(document).ready(function () {
    $(".alertaCadOsNoOk").fadeIn(300).delay(8000).fadeOut(400);
});

function aguarde() {
    document.getElementById('aguarde').innerHTML = 'Processando...';
    document.getElementById('aguarde').setAttribute("class", "text-center alert alert-warning");
    $("#aguarde").fadeIn(300).delay(3000).fadeOut(300);
}