
//Por medio de funcion autoejecutable se svalua si el carrito de compras esta cargado
// (function(){ 
//     if(localStorage.getItem('ContenidoCarrito')){
//         //Se crea el elemento que contendra el nombre del proyecto 
//         var Nombre_Proyect = document.createElement("label")

//         // Se añaden propiedades al elemento creado
//         Nombre_Proyect.innerHTML = 1 
//         Nombre_Proyect.style.color = "white;"
//         // Nombre_Proyect.classList.add("label_2")
        
//         //Se especifica el elemento donde se va a insertar el nuevo elemento
//         var ElementoPadreTarjetaFrontal = document.getElementById("Carrito")
        
//         //Se especifica la posicón donde se inerta el nuevo elemento
//         ElementoPadreTarjetaFrontal.appendChild(Nombre_Proyect)
//     }
// })();


//************************************************************************************************
//Por medio de delegación de eventos se detectan los item del submenu para oculatrlo al hacer click
document.getElementById("MenuContenedor").addEventListener('click', function(e){
    if(e.target.classList[2] == "enlace_JS"){
        var ID_Elemento = e.target
        console.log(ID_Elemento)
        document.getElementById("MenuContenedor_3").style.visibility = "hidden"
        document.getElementById("MenuContenedor_4").style.visibility = "hidden"
    }
}, false)

//************************************************************************************************
//Por medio de delegación de eventos se detecta click en una noticia para ver sus detalles
document.getElementById("Cont_Portada").addEventListener('click', function(e){
    if(e.target.classList[1] == "imagen_2--JS"){
        var ID_Pintura = e.target.id
        console.log("ID_Noticia", ID_Noticia)
        
        window.location.replace("../Noticias_C/detalleNoticia/" + ID_Pintura);
    }
}, false)

//************************************************************************************************
