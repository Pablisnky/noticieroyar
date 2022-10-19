
// document.getElementById("Contenido").addEventListener('click', function(){resize('Contenido')}, false)
document.getElementById("Contenido").addEventListener('keydown', function(){autosize('Contenido')}, false)

//************************************************************************************************
    //obtiendo informacion del DOM para identificar el elemento donde se hizo click 
    window.addEventListener("click", function(e){   
        var click = e.target
        console.log("Se hizo click en: ", click)
    }, false)
    
//************************************************************************************************
    //Cobfirma si se desea eliminar una noticia
    function EliminarNoticia(ID_Noticia){
    let ConfirmaEliminar = confirm("Desea eliminar la noticia");
        
        if(ConfirmaEliminar == true){
            alert("ENtra en el true")
            // Llamar_EliminarNoticia(ID_Noticia)
        } 
        else{
            alert(ID_Noticia)
            // return
        }
    }