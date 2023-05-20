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

//************************************************************************************************
// document.getElementById("Secciones").addEventListener('click', Llamar_secciones, false)

//************************************************************************************************
function Llamar_seccion(ID_Suscriptor,ID_Seccion){
    // console.log("_____ Desde Llamar_seccion() _____ ", ID_Suscriptor + ',' + ID_Seccion)
    var url = "../../Catalogos_C/Secciones/" + ID_Suscriptor + ',' + ID_Seccion
    http_request.open('GET', url, true)  
    peticion.onreadystatechange = respuesta_secciones
    peticion.setRequestHeader("content-type","application/x-www-form-urlencoded")
    peticion.send("null")
}                                                           
function respuesta_secciones(){
    if(peticion.readyState == 4){
        if(peticion.status == 200){    
            //Oculta el menu que muestra las secciones           
            document.getElementById("Con_Secciones").classList.remove("ocultar");                   
            statu = false

            //Coloca el div que se va a mostrar en el borde superior del viewport
            // document.getElementById("Contenedor_13Js").scroll(0,0)

            document.getElementById("Contenedor_13Js").innerHTML = peticion.responseText
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
function Llamar_Todasseccion(ID_Suscriptor, Pseudonimo){
    console.log("_____ Desde Llamar_Todasseccion() _____ ", ID_Suscriptor + ',' + Pseudonimo)
    var url = "../../Catalogos_C/Secciones/" + ID_Suscriptor + ',' + Pseudonimo
    http_request.open('GET', url, true)  
    peticion.onreadystatechange = respuesta_secciones
    peticion.setRequestHeader("content-type","application/x-www-form-urlencoded")
    peticion.send("null")
}                                                           
function respuesta_secciones(){
    if(peticion.readyState == 4){
        if(peticion.status == 200){    
            //Oculta el menu que muestra las secciones           
            document.getElementById("Con_Secciones").classList.remove("ocultar");                   
            statu = false

            document.getElementById("Contenedor_13Js").innerHTML = peticion.responseText
        } 
        else{
            alert('Problemas con la petición.')
        }
    }
    else{ //en caso contrario, mostramos un gif simulando una precarga
        // document.getElementById('Mostrar_Maquinas').innerHTML='Cargando registros';
    }
}

//****************************************************************************************************
//Muestra la orden de compra
function llamar_PedidoEnCarrito(ID_Suscriptor, ValorDolar){
    // console.log("______Desde llamar_PedidoEnCarrito()______",ID_Suscriptor + "/" + ValorDolar)

    var url="../../Carrito_C/index/" + ID_Suscriptor
    http_request.open('GET', url, true);    
    peticion.onreadystatechange = respuesta_PedidoEnCarrito;
    peticion.setRequestHeader("content-type","application/x-www-form-urlencoded")
    peticion.send("null");
    
    localStorage.setItem('ValorDolarHoy', ValorDolar)         
    Local_ValorDolarHoy = localStorage.getItem('ValorDolarHoy')
}                                                           
function respuesta_PedidoEnCarrito(){
    if(peticion.readyState == 4){
        if(peticion.status == 200){            
            document.getElementById("Mostrar_Orden").style.display="block"
            //Coloca el cursor en el top de la pagina
            window.scroll(0,0)            

            document.getElementById('Mostrar_Orden').innerHTML=peticion.responseText
    
            PedidoEnCarrito(Local_ValorDolarHoy)           
        } 
        else{
            alert('Hubo problemas con la petición en llamar_PedidoEnCarrito()')
        }
    }
    else{ //en caso contrario, mostramos un gif simulando una precarga
        // document.getElementById('Mostrar_Maquinas').innerHTML='Cargando registros';
    }    
}

//****************************************************************************************************