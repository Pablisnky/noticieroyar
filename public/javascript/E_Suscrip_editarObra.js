document.getElementById("PrecioBs").addEventListener('keyup', function(){CambioMonetarioBolivar(this.value, "PrecioDolar")}, false)

document.getElementById("PrecioDolar").addEventListener('keyup', function(){CambioMonetarioDolar(this.value, "PrecioBs")}, false)

document.getElementById("PrecioBs").addEventListener('focus', function(){ReiniciaCampo("PrecioBs","PrecioDolar")}, false)

document.getElementById("PrecioDolar").addEventListener('focus', function(){ReiniciaCampo("PrecioBs","PrecioDolar")}, false)

document.getElementById("NombreObra").addEventListener('keydown', function(){contarCaracteres('ContadorObra','NombreObra', 50)}, false)

document.getElementById("NombreObra").addEventListener('keydown', function(){valida_LongitudDes(50,'NombreObra')}, false)

document.getElementById("ContenidoDes").addEventListener('keydown', function(){contarCaracteres('ContadorDes','ContenidoDes', 100)}, false)

document.getElementById("ContenidoDes").addEventListener('keydown', function(){valida_LongitudDes(100,'ContenidoDes')}, false)  

document.getElementById("ContenidoDes").addEventListener('keydown', function(){autosize('ContenidoDes')}, false)

//************************************************************************************************
///Escucha el keydown sobre los inputs y textarea, para colocarlos en color blanco y quitar el color de fallo
    document.getElementsByTagName("body")[0].addEventListener('click',function(e){   
        if(e.target.tagName == "INPUT" || e.target.tagName == "TEXTAREA"){
            let ID_Input = e.target.id
            
            document.getElementById(ID_Input).addEventListener('keydown', function(){blanquearInput(ID_Input)}, false)
        } 
    }, false) 

//************************************************************************************************
    //Muestra la cantidad de caracteres que quedan mientras se escribe
    function contarCaracteres(ID_Contador, ID_Contenido, Max){
        // console.log("______Desde contarCaracteres()______", ID_Contador + " / " + ID_Contenido + " / " + Max) 
        var max = Max; 
        var cadena = document.getElementById(ID_Contenido).value; 
        var longitud = cadena.length; 

        if(longitud <= max) { 
            document.getElementById(ID_Contador).value = max-longitud; 
        } else { 
            document.getElementById(ID_Contador).value = cadena.subtring(0, max);
        } 
    } 

//************************************************************************************************ 
    //Impide que se sigan introduciendo caracteres al alcanzar el limite maximo en un elmento; invocado en quienesSomos_V.php - cuenta_publicar_V.php - registroCom_V.php - cuenta_editar_V.php
    var contenidoControlado = "";    
    function valida_LongitudDes(Max, ID_Contenido){
        // console.log("______Desde valida_LongitudDes()______", Max + " / "+ ID_Contenido) 
                
        var num_caracteres_permitidos = Max;

        //se averigua la cantidad de caracteres escritos 
        num_caracteresEscritos = document.getElementById(ID_Contenido).value.length

        if(num_caracteresEscritos > num_caracteres_permitidos){ 
            document.getElementById(ID_Contenido).value = contenidoControlado; 
        }
        else{ 
            contenidoControlado = document.getElementById(ID_Contenido).value; 
        } 
    } 

//************************************************************************************************
    //Realia el cambio de moneda Dolar a Bolivar
    function CambioMonetarioBolivar(Monto, id){
        // console.log("______Desde CambioMonetarioBolivar______", Monto + " " + id)

        let Dolar = document.getElementById(id)
        let PrecioDolar = document.getElementById("CambioOficial").value
        
        let Cambio_Dolar = Monto / PrecioDolar
       
        Dolar.value = Cambio_Dolar.toFixed(2)
    }

//************************************************************************************************ 
    //Realia el cambio de moneda Bolivar a Dolar
    function CambioMonetarioDolar(Monto, id){
        // console.log("______Desde CambioMonetarioDolar______", Monto + " " + id)

        let Bolivar = document.getElementById(id)
        let PrecioDolar = document.getElementById("CambioOficial").value

        let Cambio_Bolivar = Monto * PrecioDolar

        Bolivar.value = Cambio_Bolivar.toFixed(2)
    }

//************************************************************************************************
    function ReiniciaCampo(id_1, id_2){
        document.getElementById(id_1).value = ''
        document.getElementById(id_2).value = ''
    }

// -------------------------------------------------------------------------------------------
//Impide que se sigan introduciendo caracteres al alcanzar el limite maximo, llamada desde index.php 
    // var contenido_producto = "";    
    // function valida_Longitud(){  
    //     var num_caracteres_permitidos = 20;

    //     //se averigua la cantidad de caracteres escritos
    //     num_caracteres = document.forms[0].producto.value.length; 

    //     if(num_caracteres > num_caracteres_permitidos){ 
    //         document.forms[0].producto.value = contenido_producto; 
    //     }
    //     else{ 
    //         contenido_producto = document.forms[0].producto.value; 
    //     } 
    // } 

//************************************************************************************************
// indica la cantidad de caracteres que quedan mientra se escribe, llamada desde cuenta_publicar.php
    // function contarDes(){
    //     var max = 20; 
    //     var cadena = document.getElementById("ContenidoDes").value; 
    //     var longitud = cadena.length; 

    //         if(longitud <= max) { 
    //             document.getElementById("ContadorDes").value = max-longitud; 
    //         } else { 
    //             document.getElementById("ContenidoDes").value = cadena.subtring(0, max);
    //         } 
    // } 
      
//************************************************************************************************
    //Valida el formulario de cargar producto
    function validarObra(){
        // let ImagenObra = document.getElementById('imgObra').value 
        let NombreObra = document.getElementById('NombreObra').value
        let PrecioDolar = document.getElementById('PrecioDolar').value 
        let Anio = document.getElementById('Anio').value 
        
        // //Patron de entrada solo acepta numeros y punto
        let Pat_Numeros = /^[0-9.]*$/

        //Patron de entrada para archivos de carga permitidos
        var Ext_Permitidas = /^[.jpg|.jpeg|.png]*$/

        document.getElementsByClassName("boton")[0].value = "Actualizando ..."
        document.getElementsByClassName("boton")[0].disabled = true
        document.getElementsByClassName("boton")[0].style.backgroundColor = "var(--OficialClaro)"
        document.getElementsByClassName("boton")[0].style.color = "var(--OficialOscuro)"
        document.getElementsByClassName("boton")[0].style.cursor = "wait"
        document.getElementsByClassName("boton")[0].classList.add('borde_1')    

                
        if(Ext_Permitidas.exec(ImagenObra) == false || ImagenObra.size > 3000000){
            alert("Introduzca una imagen con extención .jpeg .jpg .png menor a 2 Mb")
            document.getElementById("imgObra").value = "";
            document.getElementsByClassName("boton")[0].value = "Actualizar obra"
            document.getElementsByClassName("boton")[0].disabled = false
            document.getElementsByClassName("boton")[0].style.backgroundColor = "var(--OficialOscuro)"
            document.getElementsByClassName("boton")[0].style.color = "var(--OficialClaro)"
            document.getElementsByClassName("boton")[0].style.cursor = "pointer"
            document.getElementsByClassName("boton")[0].classList.remove('borde_1')
            return false;
        }        
        else if(NombreObra == "" || NombreObra.indexOf(" ") == 0 || NombreObra.length > 100){
            alert ("Necesita introducir el nobre de la obra")
            document.getElementById("NombreObra").value = "";
            document.getElementById("NombreObra").focus()
            document.getElementById("NombreObra").style.backgroundColor = "var(--Fallos)"
            document.getElementsByClassName("boton")[0].value = "Actualizar obra"
            document.getElementsByClassName("boton")[0].disabled = false
            document.getElementsByClassName("boton")[0].style.backgroundColor = "var(--OficialOscuro)"
            document.getElementsByClassName("boton")[0].style.color = "var(--OficialClaro)"
            document.getElementsByClassName("boton")[0].style.cursor = "pointer"
            document.getElementsByClassName("boton")[0].classList.remove('borde_1')
            return false;
        }  
        else if(PrecioDolar == "" || PrecioDolar.indexOf(" ") == 0 || PrecioDolar.length > 100){
            alert ("Introduzca un Precio")
            document.getElementById("PrecioDolar").value = ""
            document.getElementById("PrecioDolar").focus()
            document.getElementById("PrecioDolar").style.backgroundColor = "var(--Fallos)"
            document.getElementsByClassName("boton")[0].value = "Actualizar obra"
            document.getElementsByClassName("boton")[0].disabled = false
            document.getElementsByClassName("boton")[0].style.backgroundColor = "var(--OficialOscuro)"
            document.getElementsByClassName("boton")[0].style.color = "var(--OficialClaro)"
            document.getElementsByClassName("boton")[0].style.cursor = "pointer"
            document.getElementsByClassName("boton")[0].classList.remove('borde_1')
            return false;
        }
        else if(Pat_Numeros.exec(Anio) == false || Anio == "" || Anio.indexOf(" ") == 0 || Anio.length > 4){
            alert ("Introduzca un año")
            document.getElementById("Anio").value = ""
            document.getElementById("Anio").focus()
            document.getElementById("Anio").style.backgroundColor = "var(--Fallos)"
            document.getElementsByClassName("boton")[0].value = "Actualizar obra"
            document.getElementsByClassName("boton")[0].disabled = false
            document.getElementsByClassName("boton")[0].style.backgroundColor = "var(--OficialOscuro)"
            document.getElementsByClassName("boton")[0].style.color = "var(--OficialClaro)"
            document.getElementsByClassName("boton")[0].style.cursor = "pointer"
            document.getElementsByClassName("boton")[0].classList.remove('borde_1')
            return false;
        }
        //Si se superan todas las validaciones la función devuelve verdadero
        return true
    }