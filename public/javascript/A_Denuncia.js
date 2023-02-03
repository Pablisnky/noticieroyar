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
    //Muestra las miniaturas de las imagenes de una noticia
    function Llamar_VerMiniatura(ID_ImagenMiniatura){
        console.log("______Desde Llamar_VerMiniatura()______", ID_ImagenMiniatura)
        
        var url = "../muestraImagenSeleccionada/" + ID_ImagenMiniatura
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

// *************************************************************************************************