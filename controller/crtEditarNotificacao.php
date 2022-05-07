<?php

	class crtEditarNotificacao {

		public function editarNotificacao()
		{	
			$usuario = new Conn();
			$usuario = new EditarNotificacao();

				if(filter_input(INPUT_GET, 'sel-resolver') == "RESOLVIDO"){
					$usuario->edNotificacao();
				} elseif (filter_input(INPUT_GET, 'sel-resolver') == 'ADIAR' && filter_input(INPUT_GET, 'ipt-data-adiada') > date("Y-m-d")) {
					$usuario->edNotificacao();
				} else {
					echo "<script>alert('ERRO AO ADIAR... Verifique se não está passando uma data MENOR ou IGUAL a atual...')</script>";
					echo "<script>window.location.href ='/?pagina=os-do-dia'</script>";
				}
		}
	}

	$crtl = new crtEditarNotificacao();
	$crtl->editarNotificacao();

?>
