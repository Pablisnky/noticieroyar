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

//Se detecta si se sube o se baja en la busqueda de noticia
window.addEventListener('click', function(e){
    console.log("______Desde Slider vertical noticias______", e)
    
    let Noticias = document.getElementsByClassName('flecha_Arriba_JS')
    // console.log("🚀 ~ file: E_Inicio.js:120 ~ window.addEventListener ~ F:", F)

    var ElementoSeleccionado = e.target.id
    console.log(ElementoSeleccionado)

    CantidadNoticias = Noticias.length
    for(let i = 0; i<CantidadNoticias; i++){ 
        // if(CantidadNoticias != ElementoSeleccionado){
    
            var CLaseElementoSeleccionado = e.target.classList[1]
            
            if(CLaseElementoSeleccionado == "flecha_Arriba_JS"){
                
                // Se consulta la distancia en px desde el top de la pantalla hasta el borde superior de cada sección
                // let Prueba = document.getElementById(ElementoSeleccionado).offsetTop;
                // console.log("🚀 ~ file: E_Inicio.js:120 ~ NoticiaArriba ~ Prueba:", Prueba)
                
                // let T = document.getElementById(ElementoSeleccionado).getBoundingClientRect().top
                // console.log("🚀 ~ file: E_Inicio.js:121 ~ NoticiaArriba ~ T:", T)
                
                let A = document.getElementById(ElementoSeleccionado).parentElement
                // console.log("🚀 ~ file: E_Inicio.js:122 ~ NoticiaArriba ~ A:", A)

                let B = A.parentElement
                // console.log("🚀 ~ file: E_Inicio.js:139 ~ window.addEventListener ~ B:", B)
                
                let C = B.parentElement
                // console.log("🚀 ~ file: E_Inicio.js:139 ~ window.addEventListener ~ B:", C)

                let D = parseInt(ElementoSeleccionado) + 1
                // console.log("🚀 ~ file: E_Inicio.js:152 ~ window.addEventListener ~ D:", D)

                //Se obtiene el icono de la proxima noticia que se quiere mostrar en pantalla
                let IconoNotiiciaMostrar = document.getElementById(D)

                //Se procede a buscar el DIV padre de la noticia
                let A_I = IconoNotiiciaMostrar.parentElement
                let A_II = A_I.parentElement
                let A_III = A_II.parentElement

                let ID_ElementoSUbir = A_III.id

                window.scroll(0, Position(document.getElementById(ID_ElementoSUbir)))
                function Position(obj){
                    var currenttop = -50;// aqui s 60 px que hay que bajar el div que contiene la noticia, para que el membrete y el menu hambuerguesa no tape parte de la fotografia
                    if(obj.offsetParent){
                        do{
                            currenttop += obj.offsetTop;
                        }
                        while((obj = obj.offsetParent));
                            return [currenttop];
                    }
                }
            }  
            else if(CLaseElementoSeleccionado == "flecha_Abajo_JS"){
                
                let A = document.getElementById(ElementoSeleccionado).parentElement

                let B = A.parentElement
                
                let C = B.parentElement

                let D = parseInt(ElementoSeleccionado) - 1

                //Se obtiene el icono de la proxima noticia que se quiere mostrar en pantalla
                let IconoNotiiciaMostrar = document.getElementById(D)

                //Se procede a buscar el DIV padre de la noticia
                let A_I = IconoNotiiciaMostrar.parentElement
                let A_II = A_I.parentElement
                let A_III = A_II.parentElement

                let ID_ElementoSUbir = A_III.id

                window.scroll(0, Position(document.getElementById(ID_ElementoSUbir)))
                function Position(obj){
                    var currentBottom = -50;// aqui s 60 px que hay que bajar el div que contiene la noticia, para que el membrete y el menu hambuerguesa no tape parte de la fotografia
                    if (obj.offsetParent){
                    console.log("🚀 ~ file: E_Inicio.js:202 ~ Position ~ obj.offsetParent:", obj.offsetParent)
                    do{
                        currentBottom -= obj.offsetTop;
                    }
                    while ((obj = obj.offsetParent));
                    return [currentBottom];
                    }
                }
            }
        // }
        // else{
            //SE muestra el icono de que no hay mas noticias para seguir avanzando
            // document.getElementById().classList.add("Default_Mostrar")
            // document.getElementById().classList.add("Default_ocultar")
            // alert("no hay mas noticias")
            // return
        // }
    }    
}, false)    