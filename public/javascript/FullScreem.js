	//Muestra el sitio web en pantalla completa
	var imagen = document.getElementById("Cont_galeria_agenda");
	
	function getFullscreen(element){
		console.log("Elemento ", element)
		if(element.requestFullscreen) {
			element.requestFullscreen();
		} 
		else if(element.mozRequestFullScreen) {
		element.mozRequestFullScreen();
		} 
		else if(element.webkitRequestFullscreen) {
		element.webkitRequestFullscreen();
		} 
		else if(element.msRequestFullscreen) {
		element.msRequestFullscreen();
		}
	}

	// getFullscreen(imagen);

	document.getElementById("Abrir").addEventListener("click", function(){//E= el id dela fotografia donde se hizo click  DOMContentLoaded
		getFullscreen(imagen);
	},false);