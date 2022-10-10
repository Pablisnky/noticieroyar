document.getElementById("Cerrar--modal").addEventListener('click', CerrarModal, false)

//************************************************************************************************
//Función autoejecuble que muestra la ventana modal
var VentanaModal = (function(){ 
    setTimeout(function(){mostrarModal();}, 1500)
})();

//************************************************************************************************
function mostrarModal(){        
    document.getElementById("VentanaModal").classList.add("mostrarModal")
}
// document.getElementById("Contenedor_34").addEventListener('click', function(){autofocus('Input_9')}, false)
                              
// document.getElementById("Span_5").addEventListener('click', function(){CerrarModal_X('Busqueda')})

//obtiendo informacion del DOM para identificar el elemento donde se hizo click 
    // window.addEventListener("click", function(e){   
    //     var click = e.target
    //     console.log("Se hizo click en: ", click)
    // }, false)

//************************************************************************************************
// //Se cambia el color de la cinta del menu principal
// window.addEventListener("scroll",function(){
//     //Se consulta la distancia en px del borde superior de la segunda imagen  
//     var ProfundidadImagen_2 = document.getElementById("ImgPortada_2")
//     // console.log("Profundidad Imagen_2", ProfundidadImagen_2.getBoundingClientRect().top)
//     let A = ProfundidadImagen_2.getBoundingClientRect().top
        
//     if(A < 35){//35 es la altura del header_inicio
//         document.getElementById("MenuResponsive").style.backgroundColor = "rgb(44, 45, 49)";
//         document.getElementById("MenuResponsive").style.transitionDuration = "1s";
//         let enlacesMenu = document.querySelectorAll("li a.a_3A");
//         for(let i = 0; i < enlacesMenu.length; i++){
//             enlacesMenu[i].style.color = "white";
//         }
//     }
//     else{
//         document.getElementById("MenuResponsive").style.backgroundColor = "rgb(206, 203, 222)";
//         let enlacesMenu = document.querySelectorAll("li a.a_3A");
//         for(let i = 0; i < enlacesMenu.length; i++){
//             enlacesMenu[i].style.color = "black";
//         }
//     }  
// })


//************************************************************************************************
    //Desplaza el viewport a la derecha para mostrar otra noticia principal
    // window.addEventListener("click", function(e){
    //     let Desplazar = e.target
    //     console.log("Se hizo click en: ", Desplazar)

    //     if(Desplazar.id == "Chevron--left"){   
    //         document.getElementById("Cont_Portada").style.marginLeft = "-100%"
    //     }
    //     else if(Desplazar.id == "Chevron--right"){
    //         document.getElementById("Cont_Portada").style.marginLeft = "-200%"
    //     }
    //     // else if(document.getElementById("Cont_Portada").style.marginLeft == "-200%"){
    //     //     document.getElementById("Cont_Portada").style.marginLeft = "-300%"
    //     // }
    // }, true)

//************************************************************************************************    
    //Desplaza el viewport a la derecha para mostrar otra noticia principal
    function CerrarModal(){
        document.getElementById("VentanaModal").style.display = "none"
    }

//************************************************************************************************   