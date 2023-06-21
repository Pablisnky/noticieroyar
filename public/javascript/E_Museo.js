statu = false
function Expandir_SubMenu(){
    console.log("_____ Desde Expandir_SubMenu() _____ ", statu)

    if(statu == false){
        document.getElementById("MenuSecundario").classList.add("mostrar_MenuSec");
        document.getElementById("IconoExpandir").classList.add("rotarArriba");
        statu = true
    }
    else{
        document.getElementById("MenuSecundario").classList.remove("mostrar_MenuSec");
        statu = false
    }
}

//************************************************************************************************
//Oculta el menu secundario haciendo click por fuera del boton de expanción
window.addEventListener("click", function(e){
    //obtiendo informacion del DOM del elemento donde se hizo click
    // var click = e.target MenuSec_JS
    // console.log(click)
    if(e.target.id != 'MenuSecundario' || e.target.classList[0]('MenuSec_JS')){
        if(statu == true){
            document.getElementById("MenuSecundario").classList.remove("mostrar_MenuSec");
            document.getElementById("IconoExpandir").classList.remove("rotarArriba");
            statu = false
        }
    }
}, true)

//************************************************************************************************
//Coloca el fondo a los iconos y texto del header en pantalla inicial
window.addEventListener("click", function(e){
    //obtiendo informacion del DOM del elemento donde se hizo click
    // var click = e.target.classList[0]("MenuSec_JS")
    // console.log(click)
    if(e.target.classList[0] == 'MenuSec_JS'){
        document.getElementById("ComandoMenu").classList.add("header--menu--museo")
        document.getElementById("MembreteFitjo").classList.add("header--titulo--museo")
        document.getElementById("IconoExpandir").classList.add("header--menu--museo")
    }
}, true)

// *******************************************************************************************
//Se cambia el color de fondo de la sala
    window.addEventListener("scroll",function(){
        console.log("_____ Desde CambioColor() _____ ")

        document.getElementById("ComandoMenu").classList.remove("header--menu--museo")
        document.getElementById("MembreteFitjo").classList.remove("header--titulo--museo")
        document.getElementById("IconoExpandir").classList.remove("header--menu--museo")

        //Se consulta la distancia en px desde el top de la pantalla hasta el borde superior de cada cont_Museo--div"
        let ProfundidadSala_1 = document.getElementById("Sala_1")
        let sala_1 = ProfundidadSala_1.getBoundingClientRect().top

        let ProfundidadSala_2 = document.getElementById("Sala_2")
        let sala_2 = ProfundidadSala_2.getBoundingClientRect().top

        let ProfundidadSala_3 = document.getElementById("Sala_3")
        let sala_3 = ProfundidadSala_3.getBoundingClientRect().top
        // console.log("C= ", C)

        let ProfundidadSala_4 = document.getElementById("Sala_4")
        let sala_4 = ProfundidadSala_4.getBoundingClientRect().top
        // console.log("D= ", D)

        if(sala_1 == 0){//55 es la altura del header
            document.getElementById("Sala_1").style.backgroundColor = "rgb(153, 162, 165)"
            document.getElementById("Sala_1").style.transitionDuration = "1s"
            document.getElementById("Sala_2").style.backgroundColor = "initial"
            document.getElementById("Sala_3").style.backgroundColor = "initial"
            document.getElementById("Sala_4").style.backgroundColor = "initial"
            document.getElementById("ComandoMenu").src = 'http://localhost/proyectos/noticieroyaracuy/public/iconos/menu/outline_menu_black_24dp.png'
            document.getElementById("IconoExpandir").src = 'http://localhost/proyectos/noticieroyaracuy/public/iconos/menu/outline_more_vert_black_24dp.png'

            // let a = document.getElementsByTagName("a")
            // for(let i = 0; i < a.length; i++){
            //     a[i].style.color = "white"
            // }

            let Texto = document.getElementsByTagName("p")
            for(let i = 0; i < Texto.length; i++){
                Texto[i].style.color = "black"
            }

            let label = document.getElementsByTagName("label")
            for(let i = 0; i < label.length; i++){
                label[i].style.color = "black"
            }

            let textarea = document.getElementsByTagName("textarea")
            for(let i = 0; i < textarea.length; i++){
                textarea[i].style.color = "black"
            }

            let small = document.getElementsByTagName("small")
            for(let i = 0; i < small.length; i++){
                small[i].style.color = "black"
            }
        }
        else if(sala_2 == 0){
            document.getElementById("Sala_2").style.backgroundColor = "rgb(0, 0, 0)"
            document.getElementById("Sala_2").style.transitionDuration = "1s"
            document.getElementById("Sala_1").style.backgroundColor = "initial"
            document.getElementById("Sala_3").style.backgroundColor = "initial"
            document.getElementById("Sala_4").style.backgroundColor = "initial"
            document.getElementById("ComandoMenu").src = 'http://localhost/proyectos/noticieroyaracuy/public/iconos/menu/outline_menu_white_24dp.png'
            document.getElementById("IconoExpandir").src = 'http://localhost/proyectos/noticieroyaracuy/public/iconos/menu/outline_more_vert_white_24dp.png'

            let Texto = document.getElementsByTagName("p")
            for(let i = 0; i < Texto.length; i++){
                Texto[i].style.color = "white"
            }

            let label = document.getElementsByTagName("label")
            for(let i = 0; i < label.length; i++){
                label[i].style.color = "white"
            }

            let textarea = document.getElementsByTagName("textarea")
            for(let i = 0; i < textarea.length; i++){
                textarea[i].style.color = "white"
            }

            let small = document.getElementsByTagName("small")
            for(let i = 0; i < small.length; i++){
                small[i].style.color = "white"
            }
        }
        else if(sala_3 == 0){
            document.getElementById("Sala_3").style.backgroundColor = "rgb(172, 181, 178)"
            document.getElementById("Sala_3").style.transitionDuration = "1s"
            document.getElementById("Sala_1").style.backgroundColor = "initial"
            document.getElementById("Sala_2").style.backgroundColor = "initial"
            document.getElementById("Sala_4").style.backgroundColor = "initial"
            document.getElementById("ComandoMenu").src = 'http://localhost/proyectos/noticieroyaracuy/public/iconos/menu/outline_menu_black_24dp.png'
            document.getElementById("IconoExpandir").src = 'http://localhost/proyectos/noticieroyaracuy/public/iconos/menu/outline_more_vert_black_24dp.png'

            let Texto = document.getElementsByTagName("p")
            for(let i = 0; i < Texto.length; i++){
                Texto[i].style.color = "black"
            }

            let label = document.getElementsByTagName("label")
            for(let i = 0; i < label.length; i++){
                label[i].style.color = "black"
            }

            let textarea = document.getElementsByTagName("textarea")
            for(let i = 0; i < textarea.length; i++){
                textarea[i].style.color = "black"
            }

            let small = document.getElementsByTagName("small")
            for(let i = 0; i < small.length; i++){
                small[i].style.color = "black"
            }
        }
        else if(sala_4 == 0){
            document.getElementById("Sala_4").style.backgroundColor = "rgb(177, 177, 169)"
            document.getElementById("Sala_4").style.transitionDuration = "1s"
            document.getElementById("Sala_1").style.backgroundColor = "initial"
            document.getElementById("Sala_2").style.backgroundColor = "initial"
            document.getElementById("Sala_3").style.backgroundColor = "initial"
            document.getElementById("ComandoMenu").src = 'http://localhost/proyectos/noticieroyaracuy/public/iconos/menu/outline_menu_black_24dp.png'
            document.getElementById("IconoExpandir").src = 'http://localhost/proyectos/noticieroyaracuy/public/iconos/menu/outline_more_vert_black_24dp.png'

            let Texto = document.getElementsByTagName("p")
            for(let i = 0; i < Texto.length; i++){
                Texto[i].style.color = "black"
            }

            let label = document.getElementsByTagName("label")
            for(let i = 0; i < label.length; i++){
                label[i].style.color = "black"
            }

            let textarea = document.getElementsByTagName("textarea")
            for(let i = 0; i < textarea.length; i++){
                textarea[i].style.color = "black"
            }

            let small = document.getElementsByTagName("small")
            for(let i = 0; i < small.length; i++){
                small[i].style.color = "black"
            }
        }
    })

// *******************************************************************************************
//Se cambia el color de fondo de la sala
    function pantalla(ID_Sala, Movimiento){
        console.log("_____ Desde pantalla() _____ ", ID_Sala, Movimiento)

        // se obtiene el Numero de sala
        let text = ID_Sala
        text = text.slice(-1)
        // console.log(text)

        if(Movimiento == 'Arriba'){
            // Se construye el ID_Sala solicitado
            text = parseInt(text) - 1
            // console.log(text)

            let VerSala = 'Sala_' + text
            console.log(VerSala)
            
        }
        else if(Movimiento == 'Abajo'){
            // Se construye el ID_Sala solicitado
            text = parseInt(text) + 1
            // console.log(text)
            
            let VerSala = 'Sala_' + text
            console.log(VerSala)
        }
    }