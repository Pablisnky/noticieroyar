// document.getElementById("Contenido").addEventListener('click', function(){resize('Contenido')}, false)
// document.getElementById("Contenido").addEventListener('keydown', function(){autosize('Contenido')}, false)

//************************************************************************************************
    //obtiendo informacion del DOM para identificar el elemento donde se hizo click 
    // window.addEventListener("click", function(e){   
    //     var click = e.target
    //     console.log("Se hizo click en: ", click)
    // }, false)
    
//************************************************************************************************
    //Confirma si se desea eliminar una noticia
    function EliminarNoticia(ID_Noticia){
        // console.log("______Desde EliminarNoticia()______", ID_Noticia)
        let ConfirmaEliminar = confirm("Desea eliminar la noticia");
        
        if(ConfirmaEliminar == true){
            Llamar_EliminarNoticia(ID_Noticia)
                        
            // Quita la noticia de pantalla
            //Se detecta  el contenedor que contiene la noticia a eliminar
            let DivEliminar = document.getElementById(ID_Noticia)
            // console.log(DivEliminar)

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
    //, esta fue eliminada del servidor evia AJAX en Llamar_EliminarNoticia()
   
// document.getElementById('PanelEdicion').addEventListener('click', function(event){ 
//     if((event.target.id == "Domicilio_No") || (event.target.id == "Domicilio_Si")){ 

//     }
// }, false); 