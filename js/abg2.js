function statusOs() {
	let valor = document.querySelector(".status").innerHTML;

	switch (valor) {
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
};

function verificaStatusLista() {

	let valor = document.querySelector(".statusLista").innerHTML;

	switch (valor) {
		case "PENDENTE":
			document.querySelector(".statusLista").className = "text-danger";
			break;
		default:
			document.querySelector(".statusLista").className = "text-dark";
			break;
	}
}