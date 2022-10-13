// document.getElementById("Cerrar--modal").addEventListener('click', CerrarModal, false)

// document.getElementById("Contenedor_34").addEventListener('click', function(){autofocus('Input_9')}, false)
                              
// document.getElementById("Span_5").addEventListener('click', function(){CerrarModal_X('Busqueda')})

//************************************************************************************************
//Por medio de delegación de eventos se detecta click en una noticia para ver sus detalles
document.getElementById("Cont_Noticia").addEventListener('click', function(e){
    if(e.target.classList[1] == "imagenNoticia--JS"){
        var ID_Noticia = e.target.id
        // console.log("ID_Noticia", ID_Noticia)
        
        // redirecciona, (se prefirio usar window open)
        // window.location.replace("Noticias_C/detalleNoticia/" + ID_Noticia);
        
        window.open(`../Noticias_C/detalleNoticia/${ID_Noticia}`, "ventana1", "width=1300,height=650,scrollbars=YES") 
    }
}, false)

//************************************************************************************************    