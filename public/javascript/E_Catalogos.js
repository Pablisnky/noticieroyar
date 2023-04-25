document.getElementById("Secciones").addEventListener('click',MostrarSecciones, false)

//************************************************************************************************
  
    function cerrarVentana(){     
        window.close()
    }

//************************************************************************************************
    statu = false //CUando carga el archivo le da valor false, solo la primera vez luego el valor cambia al llamar la funcion
    function MostrarSecciones(){        
       
        if(statu == true){
            document.getElementById("Con_Secciones").classList.remove("ocultar");        
            statu = false
        }
        else{
            document.getElementById("Con_Secciones").classList.add("ocultar");
            statu = true
        }
    }