    //Si en la página existe el footer 
    if(document.getElementById('Aplicacion_PWA')){
        document.getElementById('Aplicacion_PWA').addEventListener('click', Documentacion_PWA, false)
    }

//************************************************************************************************
    //obtiendo informacion del DOM para identificar el elemento donde se hizo click 
    window.addEventListener("click", function(e){   
        var click = e.target
        console.log("Se hizo click en: ", click)
    }, false)

//************************************************************************************************
   //Oculta el menu principal en responsive haciendo click por fuera del boton menu
    let div = document.getElementById("MenuResponsive")
    let span= document.getElementById("Span_6")
    let B = document.getElementById("Tapa")
    let C = document.getElementById("Tapa_Logo")
    window.addEventListener("click", function(e){
        // console.log("_____Desde función anonima para ocultar menu_____")
        //obtiendo informacion del DOM del elemento donde se hizo click 
        var click = e.target
        // console.log("Click en: ", click)
        AltoVitrina = document.body.scrollHeight
        if((div.style.marginLeft == "0%") && (click != div) && (click != span)){
            div.style.marginLeft = "-80%"
            C.style.marginLeft = "100%"
            // B.style.display = "none"
            setTimeout(() => {
                B.style.display = "none"
              }, 250);
            
            //Se detiene la propagación de los eventos en caso de hacer click en un elemento que contenga algun evento
            e.stopPropagation();
        }
    }, true)

//************************************************************************************************
    //Muestra y oculta el menu principal en formato movil y tablet al hacer click en menu amburguesa
    function mostrarMenu(){  
        console.log("______Desde mostrarMenu()______")
        let A = document.getElementById("MenuResponsive")
        let B = document.getElementById("Tapa") 
        let C = document.getElementById("Tapa_Logo")

        if(A.style.marginLeft < "0%"){//Se muestra el menu
            A.style.marginLeft = "0%"
            B.style.display = "block"
            C.style.marginLeft = "20%"
        }
        else if(A.style.marginLeft = "0%"){//Se oculta el menu
            A.style.marginLeft = "-80%"
            B.style.backgroundColor = "none"
            C.style.marginLeft = "-100%"
        }
    }

//************************************************************************************************ 