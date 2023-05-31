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
function validarRegistroPeriodista(){
    // console.log("_____Desde validarRegistroPeriodista()_____")

    let Nombre = document.getElementById('Nombre').value
    let Apellido = document.getElementById('Apellido').value 
    let Correo = document.getElementById('Correo').value 
    let Telefono = document.getElementById('Telefono').value
    let CNP = document.getElementById('CNP').value
    let Clave = document.getElementById('Clave').value   
    let ConfirmarClave = document.getElementById('ConfirmarClave').value   
    
    //Patron de entrada solo acepta letras
    let P_Letras = /^[A-Za-zÁÉÍÓÚáéíóúñÑ _]*[A-Za-zÁÉÍÓÚáéíóúñÑ][A-Za-zÁÉÍÓÚáéíóúñÑ _]*$/
    
    //Patron de entrada para correos electronicos
    let P_Correo = /^[-\w.%+]{1,64}@(?:[A-Z0-9-]{1,63}\.){1,125}[A-Z]{2,63}$/i;

    document.getElementById("Boton_Enviar").value = "Procesando..."
    document.getElementById("Boton_Enviar").disabled = true
    document.getElementById("Boton_Enviar").style.backgroundColor = "var(--OficialClaro)"
    document.getElementById("Boton_Enviar").style.color = "var(--OficialOscuro)"
    document.getElementById("Boton_Enviar").style.cursor = "wait"
    document.getElementById("Boton_Enviar").classList.add('borde_1')
                
    if(Nombre =="" || Nombre.indexOf(" ") == 0 || Nombre.length > 20 || P_Letras.test(Nombre) == false){
        alert ("Ingrese su nombre");
        document.getElementById("Nombre").value = "";
        document.getElementById("Nombre").focus();
        document.getElementById("Nombre").style.backgroundColor = "var(--Fallos)"
        document.getElementById("Boton_Enviar").value = "Enviar"
        document.getElementById("Boton_Enviar").disabled = false
        document.getElementById("Boton_Enviar").style.backgroundColor = "var(--OficialOscuro)"
        document.getElementById("Boton_Enviar").style.color = "var(--OficialClaro)"
        document.getElementById("Boton_Enviar").style.cursor = "pointer"
        document.getElementById("Boton_Enviar").classList.remove('borde_1')
        return false;
    }
    else if(Apellido =="" || Apellido.indexOf(" ") == 0 || Apellido.length > 20 || P_Letras.test(Apellido) == false){
        alert ("Ingrese su Apellido");
        document.getElementById("Apellido").value = "";
        document.getElementById("Apellido").focus();
        document.getElementById("Apellido").style.backgroundColor = "var(--Fallos)"
        document.getElementById("Boton_Enviar").value = "Enviar"
        document.getElementById("Boton_Enviar").disabled = false
        document.getElementById("Boton_Enviar").style.backgroundColor = "var(--OficialOscuro)"
        document.getElementById("Boton_Enviar").style.color = "var(--OficialClaro)"
        document.getElementById("Boton_Enviar").style.cursor = "pointer"
        document.getElementById("Boton_Enviar").classList.remove('borde_1')
        return false;
    }
    else if(Correo == "" || Correo.indexOf(" ") == 0 || Correo.length > 70 || P_Correo.test(Correo) == false){
        alert ("Introduzca un correo valido")
        document.getElementById("Correo").value = ""
        document.getElementById("Correo").focus()
        document.getElementById("Correo").style.backgroundColor = "var(--Fallos)"
        document.getElementById("Boton_Enviar").value = "Enviar"
        document.getElementById("Boton_Enviar").disabled = false
        document.getElementById("Boton_Enviar").style.backgroundColor = "var(--OficialOscuro)"
        document.getElementById("Boton_Enviar").style.color = "var(--OficialClaro)"
        document.getElementById("Boton_Enviar").style.cursor = "pointer"
        document.getElementById("Boton_Enviar").classList.remove('borde_1')
        return false;
    }
    else if(Telefono =="" || Telefono.indexOf(" ") == 0 || Telefono.length > 15){
        alert ("Ingrese el Telefono");
        document.getElementById("Telefono").value = "";
        document.getElementById("Telefono").focus();
        document.getElementById("Telefono").style.backgroundColor = "var(--Fallos)"
        document.getElementById("Boton_Enviar").value = "Enviar"
        document.getElementById("Boton_Enviar").disabled = false
        document.getElementById("Boton_Enviar").style.backgroundColor = "var(--OficialOscuro)"
        document.getElementById("Boton_Enviar").style.color = "var(--OficialClaro)"
        document.getElementById("Boton_Enviar").style.cursor = "pointer"
        document.getElementById("Boton_Enviar").classList.remove('borde_1')
        return false;
    }
    else if(CNP =="" || CNP.indexOf(" ") == 0 || CNP.length > 15){
        alert ("Ingrese el CNP");
        document.getElementById("CNP").value = "";
        document.getElementById("CNP").focus();
        document.getElementById("CNP").style.backgroundColor = "var(--Fallos)"
        document.getElementById("Boton_Enviar").value = "Enviar"
        document.getElementById("Boton_Enviar").disabled = false
        document.getElementById("Boton_Enviar").style.backgroundColor = "var(--OficialOscuro)"
        document.getElementById("Boton_Enviar").style.color = "var(--OficialClaro)"
        document.getElementById("Boton_Enviar").style.cursor = "pointer"
        document.getElementById("Boton_Enviar").classList.remove('borde_1')
        return false;
    }
    else if(Clave == "" || Clave.indexOf(" ") == 0 || Clave.length > 10){
        alert ("Introduzca una clave no mayor a 10 caracteres")
        document.getElementById("Clave").value = ""
        document.getElementById("Clave").focus()
        document.getElementById("Clave").style.backgroundColor = "var(--Fallos)"
        document.getElementById("Boton_Enviar").value = "Enviar"
        document.getElementById("Boton_Enviar").disabled = false
        document.getElementById("Boton_Enviar").style.backgroundColor = "var(--OficialOscuro)"
        document.getElementById("Boton_Enviar").style.color = "var(--OficialClaro)"
        document.getElementById("Boton_Enviar").style.cursor = "pointer"
        document.getElementById("Boton_Enviar").classList.remove('borde_1')
        return false;
    }
    else if(ConfirmarClave == "" || ConfirmarClave.indexOf(" ") == 0 || ConfirmarClave.length > 10){
        alert ("Introduzca la confirmación de la clave")
        document.getElementById("ConfirmarClave").value = ""
        document.getElementById("ConfirmarClave").focus()
        document.getElementById("ConfirmarClave").style.backgroundColor = "var(--Fallos)"
        document.getElementById("Boton_Enviar").value = "Enviar"
        document.getElementById("Boton_Enviar").disabled = false
        document.getElementById("Boton_Enviar").style.backgroundColor = "var(--OficialOscuro)"
        document.getElementById("Boton_Enviar").style.color = "var(--OficialClaro)"
        document.getElementById("Boton_Enviar").style.cursor = "pointer"
        document.getElementById("Boton_Enviar").classList.remove('borde_1')
        return false;
    }
    else if(Clave != ConfirmarClave){
        alert ("La clave no coincide")
        document.getElementById("ConfirmarClave").value = ""
        document.getElementById("ConfirmarClave").focus()
        document.getElementById("ConfirmarClave").style.backgroundColor = "var(--Fallos)"
        document.getElementById("Boton_Enviar").value = "Enviar"
        document.getElementById("Boton_Enviar").disabled = false
        document.getElementById("Boton_Enviar").style.backgroundColor = "var(--OficialOscuro)"
        document.getElementById("Boton_Enviar").style.color = "var(--OficialClaro)"
        document.getElementById("Boton_Enviar").style.cursor = "pointer"
        document.getElementById("Boton_Enviar").classList.remove('borde_1')
        return false;
    }
    //Si se superan todas las validaciones la función devuelve verdadero
    return true
}

//************************************************************************************************