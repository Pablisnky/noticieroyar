document.getElementById("Cerrar").addEventListener('click', cerrarRegresar, false)

// ************************************************************************************************** 
    //Abre la ventana de detalles de producto
    function mostrarDetalles(ContadorLabel, Producto, Opcion, PrecioBolivar, Fotografia, ID_Producto, PrecioDolar, Existencia, ID_Suscriptor, Nuevo, Bandera){
        console.log("______Desde mostrarDetalles()______", ContadorLabel +"/"+ Producto +"/"+ Opcion +"/"+ PrecioBolivar +"/"+ Fotografia +"/"+ ID_Producto +"/"+ PrecioDolar +"/"+ ID_Suscriptor +"/"+ Nuevo +"/"+ Bandera)

        window.open(`../../Clasificados_C/productoAmpliado/${'Etiqueta_' + ContadorLabel},${Producto},${Opcion},${PrecioBolivar},${Fotografia},${ID_Producto},${PrecioDolar},${Existencia},${ID_Suscriptor},${Nuevo},${Bandera}`, "ventana1", "scrollbars=YES")    
    }

//************************************************************************************************
  
    function cerrarRegresar(){     
        window.close()
    }