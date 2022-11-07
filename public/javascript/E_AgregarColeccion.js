
document.getElementById("Descripcion").addEventListener('keydown', function(){contarCaracteres("ContadorColeccion", "Descripcion", 120)}, false)
document.getElementById("Descripcion").addEventListener('keydown', function(){valida_LongitudDes(150, "Descripcion")}, false)
//************************************************************************************************
    //Muestra la cantidad de caracteres que quedan mientras se escribe
    function contarCaracteres(ID_Contador, ID_Descripcion, Max){
        console.log("______Desde contarCaracteres()______", ID_Contador + " / " + ID_Descripcion + " / " + Max) 
        let max = Max; 
        // console.log(max) 
        let cadena = document.getElementById(ID_Descripcion).value; 
        // console.log(cadena)
        let longitud = cadena.length; 

        if(longitud <= max) { 
            document.getElementById(ID_Contador).value = max-longitud; 
        } 
        else{ //Si se escribe mas de lo permitido no permite continuar
            // document.getElementById(ID_Contador).value = cadena.subtring(0, max);
            alert("Limite de caracteres alcanzado")
            // document.getElementById(ID_Descripcion).addEventListener('blur', function(){blaquearInput("Titulo")}, false)
        } 
    } 

//************************************************************************************************ 
    //Impide que se sigan introduciendo caracteres al alcanzar el limite maximo en un elmento
    let contenidoControlado = "";    
    function valida_LongitudDes(Max, ID_Descripcion){
        console.log("______Desde valida_LongitudDes()______", Max + " / "+ ID_Descripcion) 
                
        let num_caracteres_permitidos = Max;

        //se detecta la cantidad de caracteres escritos 
        let num_caracteresEscritos = document.getElementById(ID_Descripcion).value.length

        if(num_caracteresEscritos > num_caracteres_permitidos){ 
            document.getElementById(ID_Descripcion).value = contenidoControlado; 
        }
        else{ 
            contenidoControlado = document.getElementById(ID_Descripcion).value; 
        } 
    } 
