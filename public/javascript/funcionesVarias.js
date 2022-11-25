    //Si en la página existe el footer 
    if(document.getElementById('Aplicacion_PWA')){
        document.getElementById('Aplicacion_PWA').addEventListener('click', Documentacion_PWA, false)
    }

//************************************************************************************************
    //obtiendo informacion del DOM para identificar el elemento donde se hizo click 
    // window.addEventListener("click", function(e){   
    //     var click = e.target
    //     console.log("Se hizo click en: ", click)
    // }, false)

//************************************************************************************************
    //Muestra el menu principal al hacer click en menu amburguesa
    function mostrarMenu(){  
        let A = document.getElementById("MenuResponsive")
        let C = document.getElementById("Tapa_Logo")

        if(A.style.marginTop != "0%"){
            A.style.marginTop = "0%"
            C.style.marginLeft = "60%"
            if(screen.width < 350){
                C.style.marginLeft = "22%"
            }
            else if(screen.width > 351 && screen.width < 800){
                C.style.marginLeft = "33%"
            }
            C.style.transitionDelay = "0.3s"
        }
    }

//************************************************************************************************
    //Oculta el menu principal en responsive haciendo click por fuera del boton menu
    if(document.getElementById("MenuResponsive")){
        let div = document.getElementById("MenuResponsive")
        let span = document.getElementById("Span_6")
        let C = document.getElementById("Tapa_Logo")

        window.addEventListener("click", function(e){
            //obtiendo informacion del DOM del elemento donde se hizo click 
            // var click = e.target
            // console.log(click)
            AltoVitrina = document.body.scrollHeight
            if(div.style.marginTop == "0%"){
                div.style.marginTop = "-250%"
                C.style.marginLeft = "100%"
                C.style.transitionDelay = "0s"
                
                //Se detiene la propagación de los eventos en caso de hacer click en un elemento que contenga algun evento
                e.stopPropagation();
            }
        }, true)
    }
    
    
 //************************************************************************************************
    //coloca los guiones automaticamente mientras se ingresa la fecha  
    function mascaraFecha(FechaRecibida, id){
        if(FechaRecibida.length == 2){
            document.getElementById(id).value += "-"; 
        }
        else if(FechaRecibida.length == 5){
            document.getElementById(id).value += "-";  
        }
        else if(FechaRecibida.length == 11){
            document.getElementById(id).value += ".";  
        }
        else if(FechaRecibida.length >= 10){
            alert("Fecha con Formato Incorrecto");
            document.getElementById(id).value = "";
            document.getElementById(id).focus();
            // document.getElementById(id).style.backgroundColor = 'var(--Fallos)'; 
            return false;
        }
    }
    
//************************************************************************************************ 
    //permite añadir una fuente de redaccion nueva
    function especificarFuente(){
        // console.log("______Desde especificarFuente()______")

        let Fuente = document.getElementById("Fuente").value
        // console.log(Fuente)
        
        if(Fuente == "Otra"){//si se selecciono la opcion "Otra"

            //Se oculta el select que contiene las fuentes existentes en BD
            document.getElementById("Fuente").style.display = "none"

            //Se crean el input que cargara la nueva fuente
            var NuevoElemento = document.createElement("input")
            // console.log("Nuevo elemento= ", NuevoElemento)
            
            //Se añaden propiedades al input creado
            NuevoElemento.classList.add("cont_panel--titulo")
            NuevoElemento.name = "fuente"
            NuevoElemento.id = "Input"
            NuevoElemento.focus()

            // //Se especifica el elemento donde se va a insertar el nuevo elemento
            var ElementoPadre = document.getElementById("InsertarFuente")
            // // console.log("Elemento padre= ", ElementoPadre)

            // //Se inserta en el DOM el input creado
            inputNuevo = ElementoPadre.appendChild(NuevoElemento) 
            // // console.log("Elemento Añadido= ", inputNuevo)

            // //Se especifica el elemento que sera la referencia para insertar el nuevo nodo
            let Ref_Ubicacion= document.getElementById("AgregarNoticia")
            // // console.log("Elemento referencia= ", Ref_Ubicacion)
            
            // //Se especifica el div padre y la posición donde se insertará el nuevo nodo
            ElementoPadre.insertBefore(NuevoElemento, Ref_Ubicacion)
        }
    }

//************************************************************************************************ 
    //ajusta la altura de un texarea con respecto al contenido que trae de la BD
    function resize(id){
        console.log("______Desde resize()______", id) 
        var text = document.getElementById(id);
        text.style.height = 'auto';
        text.style.height = text.scrollHeight+'px';
    }
    
//************************************************************************************************ 
    // function CerrarModalAnuncios(id){
    //     document.getElementById(id).style.display = "none"
    // } 