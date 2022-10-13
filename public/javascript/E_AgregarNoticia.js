// document.getElementById("Contenido").addEventListener('click', resize, false)

document.getElementById("Contenido").addEventListener('click', function(){resize('Contenido')}, false)
document.getElementById("Contenido").addEventListener('bluhr', function(){autosize('Contenido')}, false)

//************************************************************************************************
//Función autoejecuble que muestra la ventana modal
// var VentanaModal = (function(){ 
//     setTimeout(function(){mostrarModal();}, 1500)
// })();

//************************************************************************************************
    //Muestra la cantidad de caracteres que quedan mientras se escribe
    function contarCaracteres(ID_Contador, ID_Contenido, Max){
        // console.log("______Desde contarCaracteres()______", ID_Contador + " / " + ID_Contenido + " / " + Max) 
        var max = Max; 
        var cadena = document.getElementById(ID_Contenido).value; 
        var longitud = cadena.length; 

        if(longitud <= max) { 
            document.getElementById(ID_Contador).value = max-longitud; 
        } else { 
            document.getElementById(ID_Contador).value = cadena.subtring(0, max);
        } 
    } 

//************************************************************************************************
    //Muestra la cantidad de caracteres que ya tiene el campo; invocado en cuenta_editar_V.php
    function CaracteresAlcanzados(ID_Contenido, ID_Contador){
        // console.log("______Desde CaracteresAlcanzados()______",ID_Contenido + " / " + ID_Contador) 

        var Contenido = document.getElementById(ID_Contenido).value
        var ContadorContenido = document.getElementById(ID_Contador).value

        var CaracteresDisponibles = ContadorContenido - Contenido.length

        document.getElementById(ID_Contador).value = CaracteresDisponibles
    } 

//************************************************************************************************ 
    //Impide que se sigan introduciendo caracteres al alcanzar el limite maximo en un elmento; invocado en quienesSomos_V.php - cuenta_publicar_V.php - registroCom_V.php - cuenta_editar_V.php
    var contenidoControlado = "";    
    function valida_LongitudDes(Max, ID_Contenido){
        // console.log("______Desde valida_LongitudDes()______", Max + " / "+ ID_Contenido) 
                
        var num_caracteres_permitidos = Max;

        //se averigua la cantidad de caracteres escritos 
        num_caracteresEscritos = document.getElementById(ID_Contenido).value.length

        if(num_caracteresEscritos > num_caracteres_permitidos){ 
            document.getElementById(ID_Contenido).value = contenidoControlado; 
        }
        else{ 
            contenidoControlado = document.getElementById(ID_Contenido).value; 
        } 
    } 

//************************************************************************************************
    //Ajusta la altura del texarea según se vaya escribiendo en el mismo                
    function autosize(id){
        console.log("______Desde autosize()______", id)
        var el = document.getElementById(id);
        
        setTimeout(function(){
            el.style.cssText = 'height:auto; padding:0';
            el.style.cssText = 'height:' + el.scrollHeight + 'px';
        },0);
    }

//************************************************************************************************ 
    //ajusta la altura de un texarea con respecto al contenido que trae de la BD
    function resize(id){
        console.log("______Desde resize()______", id) 
        var text = document.getElementById(id);
        text.style.height = 'auto';
        text.style.height = text.scrollHeight+'px';
    }

//************************************************************************************************   
