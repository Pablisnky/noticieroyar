//Por medio de delegación de eventos se detecta cada input donde se debe aplicar la funcion blanquearInput()
document.getElementsByTagName("body")[0].addEventListener('keydown', function(e){
    // console.log("______Desde función anonima que detecta INPUTS______")   
    if(e.target.tagName == "INPUT"){
        var ID_Input = e.target.id
        
        document.getElementById(ID_Input).addEventListener('keyup', function(){blanquearInput(ID_Input)}, false)
    } 
}, false)

//************************************************************************************************
//Validar el formulario de afiliación 
function validarRegistro(){
    // console.log("_____Desde validarRegistro()_____")

    let Nombre = document.getElementById('Nombre').value
    let Apellido = document.getElementById('Apellido').value 
    let Correo = document.getElementById('Correo').value 
    let Municipio = document.getElementById('Municipio').value
    let Clave = document.getElementById('Clave').value  
    let ConfirmarClave = document.getElementById('ConfirmarClave').value 
    
    //Patron de entrada solo acepta letras
    // let P_Letras = /^[A-Za-zÁÉÍÓÚáéíóúñÑ _]*[A-Za-zÁÉÍÓÚáéíóúñÑ][A-Za-zÁÉÍÓÚáéíóúñÑ _]*$/
    
    //Patron de entrada para correos electronicos
    let P_Correo = /^[-\w.%+]{1,64}@(?:[A-Z0-9-]{1,63}\.){1,125}[A-Z]{2,63}$/i;

    document.getElementsByClassName("boton")[0].value = "Procesando..."
    document.getElementsByClassName("boton")[0].disabled = true
    document.getElementsByClassName("boton")[0].style.backgroundColor = "var(--OficialClaro)"
    document.getElementsByClassName("boton")[0].style.color = "var(--OficialOscuro)"
    document.getElementsByClassName("boton")[0].style.cursor = "wait"
    document.getElementsByClassName("boton")[0].classList.add('borde_1')
                
    if(Nombre =="" || Nombre.indexOf(" ") == 0 || Nombre.length > 20){
        alert ("Ingrese su nombre");
        document.getElementById("Nombre").value = "";
        document.getElementById("Nombre").focus();
        document.getElementById("Nombre").style.backgroundColor = "var(--Fallos)"
        document.getElementsByClassName("boton")[0].value = "Enviar"
        document.getElementsByClassName("boton")[0].disabled = false
        document.getElementsByClassName("boton")[0].style.backgroundColor = "var(--OficialOscuro)"
        document.getElementsByClassName("boton")[0].style.color = "var(--OficialClaro)"
        document.getElementsByClassName("boton")[0].style.cursor = "pointer"
        document.getElementsByClassName("boton")[0].classList.remove('borde_1')
        return false;
    }
    else if(Apellido =="" || Apellido.indexOf(" ") == 0 || Apellido.length > 20){
        alert ("Ingrese su Apellido");
        document.getElementById("Apellido").value = "";
        document.getElementById("Apellido").focus();
        document.getElementById("Apellido").style.backgroundColor = "var(--Fallos)"
        document.getElementsByClassName("boton")[0].value = "Enviar"
        document.getElementsByClassName("boton")[0].disabled = false
        document.getElementsByClassName("boton")[0].style.backgroundColor = "var(--OficialOscuro)"
        document.getElementsByClassName("boton")[0].style.color = "var(--OficialClaro)"
        document.getElementsByClassName("boton")[0].style.cursor = "pointer"
        document.getElementsByClassName("boton")[0].classList.remove('borde_1')
        return false;
    }
    else if(Correo == "" || Correo.indexOf(" ") == 0 || Correo.length > 70 || P_Correo.test(Correo) == false){
        alert ("Introduzca un correo valido")
        document.getElementById("Correo").value = ""
        document.getElementById("Correo").focus()
        document.getElementById("Correo").style.backgroundColor = "var(--Fallos)"
        document.getElementsByClassName("boton")[0].value = "Crear tienda"
        document.getElementsByClassName("boton")[0].disabled = false
        document.getElementsByClassName("boton")[0].style.backgroundColor = "var(--OficialOscuro)"
        document.getElementsByClassName("boton")[0].style.color = "var(--OficialClaro)"
        document.getElementsByClassName("boton")[0].style.cursor = "pointer"
        document.getElementsByClassName("boton")[0].classList.remove('borde_1')
        return false;
    }
    else if(Municipio =="" || Municipio.indexOf(" ") == 0 || Municipio.length > 250){
        alert ("Ingrese el Municipio");
        document.getElementById("Municipio").value = "";
        document.getElementById("Municipio").focus();
        document.getElementById("Municipio").style.backgroundColor = "var(--Fallos)"
        document.getElementsByClassName("boton")[0].value = "Enviar"
        document.getElementsByClassName("boton")[0].disabled = false
        document.getElementsByClassName("boton")[0].style.backgroundColor = "var(--OficialOscuro)"
        document.getElementsByClassName("boton")[0].style.color = "var(--OficialClaro)"
        document.getElementsByClassName("boton")[0].style.cursor = "pointer"
        document.getElementsByClassName("boton")[0].classList.remove('borde_1')
        return false;
    }
    else if(Clave == "" || Clave.indexOf(" ") == 0 || Clave.length > 10){
        alert ("Introduzca una clave no mayor a 10 caracteres")
        document.getElementById("Clave").value = ""
        document.getElementById("Clave").focus()
        document.getElementById("Clave").style.backgroundColor = "var(--Fallos)"
        document.getElementsByClassName("boton")[0].value = "Crear tienda"
        document.getElementsByClassName("boton")[0].disabled = false
        document.getElementsByClassName("boton")[0].style.backgroundColor = "var(--OficialOscuro)"
        document.getElementsByClassName("boton")[0].style.color = "var(--OficialClaro)"
        document.getElementsByClassName("boton")[0].style.cursor = "pointer"
        document.getElementsByClassName("boton")[0].classList.remove('borde_1')
        return false;
    }
    else if(ConfirmarClave == "" || ConfirmarClave.indexOf(" ") == 0 || ConfirmarClave.length > 10){
        alert ("Introduzca la confirmación de la clave")
        document.getElementById("ConfirmarClave").value = ""
        document.getElementById("ConfirmarClave").focus()
        document.getElementById("ConfirmarClave").style.backgroundColor = "var(--Fallos)"
        document.getElementsByClassName("boton")[0].value = "Crear tienda"
        document.getElementsByClassName("boton")[0].disabled = false
        document.getElementsByClassName("boton")[0].style.backgroundColor = "var(--OficialOscuro)"
        document.getElementsByClassName("boton")[0].style.color = "var(--OficialClaro)"
        document.getElementsByClassName("boton")[0].style.cursor = "pointer"
        document.getElementsByClassName("boton")[0].classList.remove('borde_1')
        return false;
    }
    else if(Clave != ConfirmarClave){
        alert ("La clave no coincide")
        document.getElementById("ConfirmarClave").value = ""
        document.getElementById("ConfirmarClave").focus()
        document.getElementById("ConfirmarClave").style.backgroundColor = "var(--Fallos)"
        document.getElementsByClassName("boton")[0].value = "Crear tienda"
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