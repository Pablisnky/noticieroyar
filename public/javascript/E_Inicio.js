// document.getElementById("Mostrar_Promocion").addEventListener('click', MostrarPromocion, false)

// document.getElementById("CerrarVentana").addEventListener('click', function(){CerrarModal('VentanaModal')}, false)
//************************************************************************************************
//Función autoejecuble que muestra la ventana modal automatica inicial
// var VentanaModal = (function(){ 
//     setTimeout(function(){mostrarModal();}, 100)
// })();

//************************************************************************************************ 
//obtiendo informacion del DOM para identificar el elemento donde se hizo click 
    // window.addEventListener("click", function(e){   
    //     var click = e.target
    //     console.log("Se hizo click en: ", click)
    // }, false)

//************************************************************************************************ 
    function MostrarPromocion(){
        document.getElementById("Miimagen").style.display = "block" 
        document.getElementById("Promocion").style.display = "block" 
        // window.location.reload();
    }

//************************************************************************************************
    function mostrarModal(){        
        document.getElementById("VentanaModal").classList.add("mostrarModal")
    }   

//************************************************************************************************
    function CerrarModal(id){
        console.log("______Desde CerrarModal()______", id)
        document.getElementById(id).style.display = "none"
    }

//************************************************************************************************ 
    //Voltea la tarjeta para mostrar el reverso
    // document.getElementById('Cont_Portada').addEventListener('click', function(e){ 
    //     if(e.target.classList[0] == 'VerMas_JS'){  

    //         let Tarjeta = e.target
    //         // console.log("Tarjeta click ", Tarjeta)
            
    //         //Se obtiene el elemento padre donde se realizó click
    //         let current_1 = Tarjeta.parentElement
    //         let current_2 = current_1.parentElement
    //         // console.log("Div Padre_2  ", current_2)
            
    //         // console.log("ID_Padre tarjeta click ", current_2.id)
    //         document.getElementById(current_2.id).style.transform = "rotateY(180deg)" //Gira la tarjeta
    //         document.getElementById(current_2.id).style.transformStyle = "preserve-3d" //Voltae para poder leer el lado de atras cuando se pase al frente
    //         document.getElementById(current_2.id).style.transition = ".5s ease" 
    //         document.getElementById(current_2.id).style.perspective = "600px"
            
    //         //Se oculta el boton de mostrar video promconal            
    //         if(window.screen.width < 1000){
    //             retrasaOcultar_Boton()
    //         }
    //     }
    //     else{
    //         // console.log("Entra en el Else")
    //     }
    // }, false)
        
//************************************************************************************************
    //Voltea la tarjeta para mostrar nuevamente el frente
    // document.getElementById('Cont_Portada').addEventListener('click', function(e){ 
    //     if(e.target.classList[0] == 'Cerrar_JS'){  

    //         let Tarjeta = e.target
    //         // console.log("Tarjeta click ", Tarjeta)
            
    //         //Se obtiene el elemento padre donde se realizó click
    //         let current_1 = Tarjeta.parentElement
    //         let current_2 = current_1.parentElement
    //         // console.log("Div Padre ", current_2)

    //         document.getElementById(current_2.id).style.transform = "rotateY(0deg)" //Gira la tarjeta
    //         document.getElementById(current_2.id).style.transformStyle = "preserve-3d" //Voltae para poder leer el lado de atras cuando se pase al frente
    //         document.getElementById(current_2.id).style.transition = ".5s ease"
    //         document.getElementById(current_2.id).style.perspective = "600px"
            
    //         //Se muestra el boton de mostrar video promconal            
    //         if(window.screen.width < 1000){
    //             retrasaMostar_Boton()
    //         }
    //     }
    // }, false)
//************************************************************************************************
    //oculta el boton de mostrar video promconal
    function retrasaOcultar_Boton(){
        document.getElementById("Mostrar_Promocion").classList.remove("BotonPromocion--mostrar")
        document.getElementById("Mostrar_Promocion").classList.add("BotonPromocion--ocultar")
    }
    

//************************************************************************************************
    //oculta el boton de mostrar video promconal
    function retrasaMostar_Boton(){
        document.getElementById("Mostrar_Promocion").classList.remove("BotonPromocion--ocultar")
        document.getElementById("Mostrar_Promocion").classList.add("BotonPromocion--mostrar")
    }

//************************************************************************************************
    function VerMiniatura(Nombre_imgColeccion){
        console.log(Nombre_imgColeccion)
   }
   
   window.pausar = function(){
        document.getElementById("VideoPromocion").pause();
        document.getElementById("Miimagen").style.display = "none"
    };

//************************************************************************************************
    function marcharRadioButon(){
        alert("HOLA")
    }


//************************************************************************************************
// Realiza el scroll a pantalla completa
const sections = [...document.querySelectorAll("section")];

let options = {
  rootMargin: "0px",
  threshold: 0.75,
};

const callback = (entries, observer) => {
  entries.forEach((entry) => {
    const { target } = entry;

    if (entry.intersectionRatio >= 0.75) {
      target.classList.add("is-visible");
    } else {
      target.classList.remove("is-visible");
    }
  });
};

const observer = new IntersectionObserver(callback, options);

sections.forEach((section, index) => {
  const sectionChildren = [...section.querySelector("[data-content]").children];

  sectionChildren.forEach((el, index) => {
    el.style.setProperty("--delay", `${index * 250}ms`);
  });

  observer.observe(section);
});

//saber posicion del scrool vertical
window.onscroll = function() {
    var y = window.scrollY;
    document.getElementById('y').innerText = y;
    console.log(y);
  };