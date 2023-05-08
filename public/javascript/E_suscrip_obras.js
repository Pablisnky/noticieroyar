    function EliminarObra(ID_Obra){
        // console.log("______Desde EliminarObra()______", ID_Obra )
        
        let ConfirmaEliminar = confirm("Desea eliminar la obra")
        
        //Se confirma si se desea eliminar el producto
        if(ConfirmaEliminar == true){                    
            
            // Quita el producto de pantalla
            //Se detecta  el contenedor que contiene el producto a eliminar
            let DivEliminar = document.getElementById(ID_Obra)

            //Se detecta el elemento padre que contiene el elemento a eliminar
            let Padre_1 = DivEliminar.parentElement
            
            //Se detecta el elemento padre que contiene el elemento a eliminar
            let Padre_2 = Padre_1.parentElement
            
            //Se detecta el elemento padre que contiene el elemento a eliminar
            let Padre_3 = Padre_2.parentElement           

            //Se elimina el elemento
            Padre_3.removeChild(Padre_2)

            Llamar_EliminarObra(ID_Obra)
        } 
        else{
            return
        }
    }
    
//************************************************************************************************