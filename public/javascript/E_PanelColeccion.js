    //Confirma si se desea eliminar una noticia
    function EliminarColeccion(ID_Coleccion){
        // console.log("______Desde EliminarColeccion()______", ID_Coleccion)
        let ConfirmaEliminar = confirm("Desea eliminar la colección");
        
        if(ConfirmaEliminar == true){
            Llamar_EliminarColeccion(ID_Coleccion)
                        
            // Quita la noticia de pantalla
            //Se detecta  el contenedor que contiene la coleccion a eliminar
            let DivEliminar = document.getElementById(ID_Coleccion)
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