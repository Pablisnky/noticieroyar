    //Confirma si se desea eliminar una noticia
    function EliminarAnuncio(ID_Anuncio){
        // console.log("______Desde EliminarAnuncio()______", ID_Anuncio)
        let ConfirmaEliminar = confirm("Desea eliminar el anuncio");
        
        if(ConfirmaEliminar == true){
            Llamar_EliminarAnuncio(ID_Anuncio)
                        
            // Quita la noticia de pantalla
            //Se detecta  el contenedor que contiene la noticia a eliminar
            let DivEliminar = document.getElementById(ID_Anuncio)
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