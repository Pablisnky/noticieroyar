    //Confirma si se desea eliminar un artista
    function EliminarArtista(ID_Suscriptor){
        // console.log("______Desde EliminarArtista()______", ID_Suscriptor)
        let ConfirmaEliminar = confirm("Desea eliminar artista");
        
        if(ConfirmaEliminar == true){
            Llamar_EliminarArtista(ID_Suscriptor)
                        
            // Quita a el artista de pantalla
            //Se detecta  el contenedor que contiene la Artista a eliminar
            let DivEliminar = document.getElementById(ID_Suscriptor)
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