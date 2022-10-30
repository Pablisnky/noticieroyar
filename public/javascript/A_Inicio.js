var http_request = false
var peticion= conexionAJAX()
function conexionAJAX(){
    http_request = false
    if(window.XMLHttpRequest){ // Mozilla, Safari,...
        http_request = new XMLHttpRequest()
        if (http_request.overrideMimeType){
            http_request.overrideMimeType('text/xml')
        }
    }
    else if(window.ActiveXObject){ // IE
        try{
            http_request = new ActiveXObject("Msxml2.XMLHTTP")
        }
            catch(e){
                try{
                    http_request = new ActiveXObject("Microsoft.XMLHTTP")
                } 
                catch(e){}
            }
        }
        if(!http_request){
            alert('No es posible crear una instancia XMLHTTP')
            return false
        }
        //   else{
        //     alert("Instancia creada exitosamente ok")
        // }
        return http_request
    } 

// *************************************************************************************************
    //
    function Llamar_NoticiaAnterior(ID_Noticia){
        console.log("______Desde Llamar_NoticiaAnterior()______", ID_Noticia)
        
        var url = "Inicio_C/NoticiaAnterior/" + ID_Noticia
        http_request.open('GET', url, true)  
        peticion.onreadystatechange = respuesta_NoticiaAnterior
        peticion.setRequestHeader("content-type","application/x-www-form-urlencoded")
        peticion.send("null")
    }                                                                        
    function respuesta_NoticiaAnterior(){
        if(peticion.readyState == 4){
            if(peticion.status == 200){  
                document.getElementById('Cont_Portada').innerHTML = peticion.responseText 
            } 
            else{
                alert('Problemas con la petición.')
            }
        }
        else{ //en caso contrario, mostramos un gif simulando una precarga
            // document.getElementById('Mostrar_Maquinas').innerHTML='Cargando registros';
        }
    }

// *************************************************************************************************
    //
    function Llamar_NoticiaPosterior(ID_Noticia){
        console.log("______Desde Llamar_NoticiaPosterior()______", ID_Noticia)
        
        var url = "Inicio_C/NoticiaPosterior/" + ID_Noticia
        http_request.open('GET', url, true)  
        peticion.onreadystatechange = respuesta_NoticiaPosterior
        peticion.setRequestHeader("content-type","application/x-www-form-urlencoded")
        peticion.send("null")
    }                                                                        
    function respuesta_NoticiaPosterior(){
        if(peticion.readyState == 4){
            if(peticion.status == 200){  
                document.getElementById('Cont_Portada').innerHTML = peticion.responseText 
            } 
            else{
                alert('Problemas con la petición.')
            }
        }
        else{ //en caso contrario, mostramos un gif simulando una precarga
            // document.getElementById('Mostrar_Maquinas').innerHTML='Cargando registros';
        }
    }

// *************************************************************************************************
 //Muestra 
 function Llamar_VerMiniatura(ID_ImagenMiniatura){
    // console.log("______Desde Llamar_VerMiniatura()______", ID_ImagenMiniatura)
    
    var url = "Inicio_C/muestraImagenSeleccionada/" + ID_ImagenMiniatura
    http_request.open('GET', url, true)  
    peticion.onreadystatechange = respuesta_VerMiniatura
    peticion.setRequestHeader("content-type","application/x-www-form-urlencoded")
    peticion.send("null")
}                                                                        
function respuesta_VerMiniatura(){
    if(peticion.readyState == 4){
        if(peticion.status == 200){  
            document.getElementById('Contenedor_Imagen').innerHTML = peticion.responseText 
        } 
        else{
            alert('Problemas con la petición.')
        }
    }
    else{ //en caso contrario, mostramos un gif simulando una precarga
        // document.getElementById('Mostrar_Maquinas').innerHTML='Cargando registros';
    }
}