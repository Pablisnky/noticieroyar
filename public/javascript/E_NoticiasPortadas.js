    // elimina una noticia
    function EliminarNoticia(ID_Noticia, NombreImagen){
        // console.log("______Desde EliminarNoticia()______", ID_Noticia + '-' + NombreImagen)
        
        let ConfirmaEliminar = confirm("Desea eliminar la noticia");
        
        //Se confirma si se desea eliminar la noticia
        if(ConfirmaEliminar == true){                        
            // Quita la noticia de pantalla
            //Se detecta  el contenedor que contiene la noticia a eliminar
            let DivEliminar = document.getElementById(ID_Noticia)
            // console.log(DivEliminar)

            //Se detecta el elemento padre que contiene el elemento a eliminar
            let Padre = DivEliminar.parentElement
            // console.log(Padre)

            //Se elimina el elemento
            Padre.removeChild(DivEliminar)

            Llamar_EliminarNoticia(ID_Noticia, NombreImagen)
        } 
        else{
            return
        }
    }
    
//************************************************************************************************
  