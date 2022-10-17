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
    //Muestra 
document.getElementById("SeccionPublicar").addEventListener('click', Llamar_ActualizarseccionesDisponible, false)
document.getElementById("SeccionPublicar").addEventListener('keydown', Llamar_ActualizarseccionesDisponible, false)

//************************************************************************************************
function Llamar_ActualizarseccionesDisponible(){
    console.log("_____ Desde Llamar_ActualizarseccionesDisponible() _____ ")
    var url = "../../Panel_C/Secciones"
    http_request.open('GET', url, true)  
    peticion.onreadystatechange = respuesta_ActualizarseccionesDisponible
    peticion.setRequestHeader("content-type","application/x-www-form-urlencoded")
    peticion.send("null")
}                                                           
function respuesta_ActualizarseccionesDisponible(){
    if(peticion.readyState == 4){
        if(peticion.status == 200){    
            //Coloca el cursor en el top de la pagina
            window.scroll(0, 0)
            
            document.getElementById("Contenedor_90").innerHTML = peticion.responseText
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