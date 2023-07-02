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
    function cambiaColor(ID_Sala){
        if(ID_Sala == 'Sala_1'){
            document.getElementById("Sala_1").style.backgroundColor = "#A0AEB1"
            document.getElementById("Header").style.backgroundColor = "transparent"
            
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
        else if(ID_Sala == 'Sala_2'){
            document.getElementById("Sala_2").style.backgroundColor = "rgb(0, 0, 0)"
            document.getElementById("Header").style.backgroundColor = "transparent"

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
        else if(ID_Sala == 'Sala_3'){
            document.getElementById("Sala_3").style.backgroundColor = "rgb(190, 201, 203)"
            document.getElementById("Header").style.backgroundColor = "transparent"

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
        else if(ID_Sala == 'Sala_4'){
            document.getElementById("Sala_4").style.backgroundColor = "rgb(219, 205, 196)"
            document.getElementById("Header").style.backgroundColor = "transparent"

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
    }

// *******************************************************************************************
//hace scroll a la pantalla de las salas
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

            var VerSala = 'Sala_' + text
            // console.log(VerSala)
            

            if(VerSala == 'Sala_0'){
                // remoto
                // location.replace('https://www.noticieroyaracuy.com/Museo_C');
                
                // local
                location.replace('http://localhost/proyectos/noticieroyaracuy/Museo_C');
            }
            else{
                //Coloca el curso en el ancla
                window.location.hash = '#'+VerSala; 
            }
        }
        else if(Movimiento == 'Abajo'){
            // Se construye el ID_Sala solicitado
            text = parseInt(text) + 1
            // console.log(text)
            
            var VerSala = 'Sala_' + text
            console.log(VerSala)

            //Coloca el curso en el ancla
            window.location.hash = '#'+VerSala; 
        }

        // Se cambian colores de fondo, texto e icono
        if(VerSala == 'Sala_1'){
            document.getElementById("Sala_1").style.backgroundColor = "#A0AEB1"
            document.getElementById("Header").style.backgroundColor = "transparent"
            
        
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
        else if(VerSala == 'Sala_2'){
            document.getElementById("Sala_2").style.backgroundColor = "rgb(0, 0, 0)"
            document.getElementById("Header").style.backgroundColor = "transparent"
            
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
        else if(VerSala == 'Sala_3'){
            document.getElementById("Sala_3").style.backgroundColor = "rgb(190, 201, 203)"
            document.getElementById("Header").style.backgroundColor = "transparent"
            
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
        else if(VerSala == 'Sala_4'){
            document.getElementById("Sala_4").style.backgroundColor = "rgb(219, 205, 196)"
            document.getElementById("Header").style.backgroundColor = "transparent"
            
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
    }