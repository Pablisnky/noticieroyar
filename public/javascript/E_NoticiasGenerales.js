    //obtiendo informacion del DOM para identificar el elemento donde se hizo click 
    // window.addEventListener("click", function(e){   
    //     var click = e.target
    //     console.log("Se hizo click en: ", click)
    // }, false)
    
//************************************************************************************************
    //Confirma si se desea eliminar una noticia
    function EliminarNoticia(ID_Noticia, Nombre_Imagen){
        console.log("______Desde EliminarNoticia()______", ID_Noticia + '-' + Nombre_Imagen)
        let ConfirmaEliminar = confirm("Desea eliminar la noticia");
        
        if(ConfirmaEliminar == true){
                        
            // Quita la noticia de pantalla
            //Se detecta  el contenedor que contiene la noticia a eliminar
            let DivEliminar = document.getElementById(ID_Noticia, Nombre_Imagen)
            // console.log(DivEliminar)

            //Se detecta el elemento padre que contiene el elemento a eliminar
            let Padre = DivEliminar.parentElement
            // console.log(Padre)

            //Se elimina el elemento
            Padre.removeChild(DivEliminar)
            
            Llamar_EliminarNoticia(ID_Noticia, Nombre_Imagen)
        } 
        else{
            return
        }
    }