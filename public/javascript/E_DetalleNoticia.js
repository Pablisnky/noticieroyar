document.addEventListener('DOMContentLoaded',function(){resize('Contenido')}, false)
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

//************************************************************************************************ 
    //ajusta la altura de un texarea con respecto al contenido que trae de la BD
    function resize(id){
        console.log("______Desde resize()______", id) 
        var text = document.getElementById(id);
        text.style.height = 'auto';
        text.style.height = text.scrollHeight+'px';
    }
