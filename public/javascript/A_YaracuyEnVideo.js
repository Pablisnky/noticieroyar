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
    //Muestra cada obra individualmente en un slider
    function Llamar_YaracuyVideo(ID_Video, Recorrido){
        // console.log("______Desde Llamar_YaracuyVideo()______", ID_Video + "/" + Recorrido)

        // remoto
        var url = "https://www.noticieroyaracuy.com/YaracuyEnVideo_C/recorridoVideos/" + ID_Video  + "," + Recorrido
        
        // local
        // var url = "http://localhost/proyectos/noticieroyaracuy/YaracuyEnVideo_C/recorridoVideos/" + ID_Video  + "," + Recorrido
        http_request.open('GET', url, true)  
        peticion.onreadystatechange = respuesta_detalleObra
        peticion.setRequestHeader("content-type","application/x-www-form-urlencoded")
        peticion.send("null")
    }                                                                        
    function respuesta_detalleObra(){
        if(peticion.readyState == 4){
            if(peticion.status == 200){  
                document.getElementById('Slider_Videos').innerHTML = peticion.responseText 
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