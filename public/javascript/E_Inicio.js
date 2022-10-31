// document.getElementById("Cerrar--modal").addEventListener('click', CerrarModal, false)

//************************************************************************************************
//Función autoejecuble que muestra la ventana modal automaticmente
// var VentanaModal = (function(){ 
//     setTimeout(function(){mostrarModal();}, 1500)
// })();

//************************************************************************************************ 
//obtiendo informacion del DOM para identificar el elemento donde se hizo click 
    // window.addEventListener("click", function(e){   
    //     var click = e.target
    //     console.log("Se hizo click en: ", click)
    // }, false)

//************************************************************************************************
function mostrarModal(){        
    document.getElementById("VentanaModal").classList.add("mostrarModal")
}   

//************************************************************************************************
    function CerrarModal(){
        document.getElementById("VentanaModal").style.display = "none"
    }

//************************************************************************************************ 
    //Voltea la tarjeta para mostrar el reverso
    document.getElementById('Cont_Portada').addEventListener('click', function(e){ 
        if(e.target.classList[0] == 'VerMas_JS'){  
            let Tarjeta = e.target
            // console.log("Tarjeta click ", Tarjeta)
            
            //Se obtiene el elemento padre donde se realizó click
            let current_1 = Tarjeta.parentElement
            let current_2 = current_1.parentElement
            // console.log("Div Padre_2  ", current_2)

            
            // console.log("ID_Padre tarjeta click ", current_2.id)
            document.getElementById(current_2.id).style.transform = "rotateY(180deg)" //Gira la tarjeta
            document.getElementById(current_2.id).style.transformStyle = "preserve-3d" //Voltae para poder leer el lado de atras cuando se pase al frente
            document.getElementById(current_2.id).style.transition = ".5s ease" 
            document.getElementById(current_2.id).style.perspective = "600px"
        }
    }, false)
        
//************************************************************************************************
    //Voltea la tarjeta para mostrar nuevamente el frente
    document.getElementById('Cont_Portada').addEventListener('click', function(e){ 
        if(e.target.classList[0] == 'Cerrar_JS'){  
            let Tarjeta = e.target
            // console.log("Tarjeta click ", Tarjeta)
            
            //Se obtiene el elemento padre donde se realizó click
            let current_1 = Tarjeta.parentElement
            let current_2 = current_1.parentElement
            // console.log("Div Padre ", current_2)

            document.getElementById(current_2.id).style.transform = "rotateY(0deg)" //Gira la tarjeta
            document.getElementById(current_2.id).style.transformStyle = "preserve-3d" //Voltae para poder leer el lado de atras cuando se pase al frente
            document.getElementById(current_2.id).style.transition = ".5s ease"
            document.getElementById(current_2.id).style.perspective = "600px"
        }
    }, false)