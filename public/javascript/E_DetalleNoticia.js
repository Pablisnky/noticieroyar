document.addEventListener('DOMContentLoaded',function(){resize('Contenido')}, false)

document.getElementById("CerrarVentana").addEventListener('click', Cerrar, false)

document.getElementById("CerrarVentanaModal").addEventListener('click', function(){CerrarModal('VentanaModal--Publicidad')}, false)

document.getElementById("Comentario").addEventListener('keyup', function(){autosize('Comentario')}, false)

//************************************************************************************************
//Función autoejecuble que muestra la ventana modal que contiene la publicidad
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
    console.log("______Desde CerrarModal()______", id) 
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

//************************************************************************************************ 
 //Confirma si se desea eliminar un comentario
 function EliminarComentario(ID_Comentario){
    // console.log("______Desde EliminarComentario()______", ID_Comentario)
    let ConfirmaEliminar = confirm("Desea eliminar el comentario");
    
    if(ConfirmaEliminar == true){
        Llamar_EliminarComentario(ID_Comentario)
                    
        // Quita la noticia de pantalla
        //Se detecta  el contenedor que contiene el comentario a eliminar
        let DivEliminar = document.getElementById(ID_Comentario)
        console.log(DivEliminar)

        //Se detecta el elemento padre que contiene el elemento a eliminar
        let Padre = DivEliminar.parentElement
        // console.log(Padre)

        //Se elimina el elemento
        Padre.removeChild(DivEliminar)
    } 
    else{
        return
    }
}

//************************************************************************************************
function EliminarComentarioNuevo(ID_Comentario){
    
    Llamar_EliminarComentario(ID_Comentario)
    document.getElementById("Contenedor_Padre").style.display = "none"

}

//************************************************************************************************
    //Ajusta la altura del texarea según se vaya escribiendo en el mismo                
    function autosize(id){
        console.log("______Desde autosize()______", id)
        var el = document.getElementById(id);
        
        setTimeout(function(){
            el.style.cssText = 'height:auto; padding:0';
            el.style.cssText = 'height:' + el.scrollHeight + 'px';
        },0);
    }

