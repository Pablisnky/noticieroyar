
// document.getElementById("Cerrar--modal").addEventListener('click', CerrarModal, false)
document.getElementById("CerrarVentana").addEventListener('click', Cerrar, false)

document.getElementById("Cerrar--modal").addEventListener('click', function(){CerrarModal('VentanaModal--Publicidad')}, false)

//************************************************************************************************
//Función autoejecuble que muestra la ventana modal
var VentanaModal = (function(){ 
    setTimeout(function(){mostrarModal();}, 500)
})();

//************************************************************************************************
function mostrarModal(){        
    document.getElementById("VentanaModal--Publicidad").classList.add("mostrarModal--publicidad")
}

//************************************************************************************************ 
    //Cierra ventana window donde se abrio la noticia
    function Cerrar(){            
        window.close();
    }

//************************************************************************************************   
//cierra ventana modal que contiene la publicidad
function CerrarModal(id){
    document.getElementById(id).style.display = "none"
}
