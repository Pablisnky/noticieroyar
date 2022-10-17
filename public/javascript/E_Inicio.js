document.getElementById("Cerrar--modal").addEventListener('click', CerrarModal, false)

//************************************************************************************************
//Función autoejecuble que muestra la ventana modal automaticmente
var VentanaModal = (function(){ 
    setTimeout(function(){mostrarModal();}, 1500)
})();

//************************************************************************************************
function mostrarModal(){        
    document.getElementById("VentanaModal").classList.add("mostrarModal")
}
                              
// document.getElementById("Span_5").addEventListener('click', function(){CerrarModal_X('Busqueda')})

//obtiendo informacion del DOM para identificar el elemento donde se hizo click 
    // window.addEventListener("click", function(e){   
    //     var click = e.target
    //     console.log("Se hizo click en: ", click)
    // }, false)

//************************************************************************************************    
    //
    function CerrarModal(){
        document.getElementById("VentanaModal").style.display = "none"
    }

//************************************************************************************************ 