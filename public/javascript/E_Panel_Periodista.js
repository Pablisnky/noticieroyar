//Por medio de delegación de eventos se detecta cada input donde se debe aplicar la funcion blanquearInput()
document.getElementsByTagName("body")[0].addEventListener('keydown', function(e){
    // console.log("______Desde función anonima que detecta INPUTS______")   
    if(e.target.tagName == "INPUT"){
        var ID_Input = e.target.id
        
        document.getElementById(ID_Input).addEventListener('keyup', function(){blanquearInput(ID_Input)}, false)
    } 
}, false)

//************************************************************************************************
//Validar el formulario de perfil de periodista 
function validarPerfil(){
    console.log("_____Desde validarPerfil()_____")

    let Nombre_Per = document.getElementById('NombrePeriodista').value
    let Apellido_Per = document.getElementById('ApellidoPeriodista').value 
    let Correo_Per = document.getElementById('CorreoPeriodista').value 
    let Telefono_Per = document.getElementById('TelefonoPeriodista').value
    let CNP_Per = document.getElementById('CNPPeriodista').value  
    
    //Patron de entrada solo acepta letras
    // let P_Letras = /^[A-Za-zÁÉÍÓÚáéíóúñÑ _]*[A-Za-zÁÉÍÓÚáéíóúñÑ][A-Za-zÁÉÍÓÚáéíóúñÑ _]*$/
    
    //Patron de entrada para correos electronicos
    let P_Correo = /^[-\w.%+]{1,64}@(?:[A-Z0-9-]{1,63}\.){1,125}[A-Z]{2,63}$/i;

    document.getElementsByClassName("boton")[0].value = "Actualizando..."
    document.getElementsByClassName("boton")[0].disabled = true
    document.getElementsByClassName("boton")[0].style.backgroundColor = "var(--OficialClaro)"
    document.getElementsByClassName("boton")[0].style.color = "var(--OficialOscuro)"
    document.getElementsByClassName("boton")[0].style.cursor = "wait"
    document.getElementsByClassName("boton")[0].classList.add('borde_1')
                
    if(Nombre_Per =="" || Nombre_Per.indexOf(" ") == 0 || Nombre_Per.length > 20){
        alert ("Ingrese su nombre");
        document.getElementById("NombrePeriodista").value = "";
        document.getElementById("NombrePeriodista").focus();
        document.getElementById("NombrePeriodista").style.backgroundColor = "var(--Fallos)"
        document.getElementsByClassName("boton")[0].value = "Actualizar"
        document.getElementsByClassName("boton")[0].disabled = false
        document.getElementsByClassName("boton")[0].style.backgroundColor = "var(--OficialOscuro)"
        document.getElementsByClassName("boton")[0].style.color = "var(--OficialClaro)"
        document.getElementsByClassName("boton")[0].style.cursor = "pointer"
        document.getElementsByClassName("boton")[0].classList.remove('borde_1')
        return false;
    }
    else if(Apellido_Per =="" || Apellido_Per.indexOf(" ") == 0 || Apellido_Per.length > 20){
        alert ("Ingrese su apellido");
        document.getElementById("ApellidoPeriodista").value = "";
        document.getElementById("ApellidoPeriodista").focus();
        document.getElementById("ApellidoPeriodista").style.backgroundColor = "var(--Fallos)"
        document.getElementsByClassName("boton")[0].value = "Actualizar"
        document.getElementsByClassName("boton")[0].disabled = false
        document.getElementsByClassName("boton")[0].style.backgroundColor = "var(--OficialOscuro)"
        document.getElementsByClassName("boton")[0].style.color = "var(--OficialClaro)"
        document.getElementsByClassName("boton")[0].style.cursor = "pointer"
        document.getElementsByClassName("boton")[0].classList.remove('borde_1')
        return false;
    }
    else if(Correo_Per == "" || Correo_Per.indexOf(" ") == 0 || Correo_Per.length > 70 || P_Correo.test(Correo_Per) == false){
        alert ("Introduzca un correo valido")
        document.getElementById("CorreoPeriodista").value = ""
        document.getElementById("CorreoPeriodista").focus()
        document.getElementById("CorreoPeriodista").style.backgroundColor = "var(--Fallos)"
        document.getElementsByClassName("boton")[0].value = "Actualizar"
        document.getElementsByClassName("boton")[0].disabled = false
        document.getElementsByClassName("boton")[0].style.backgroundColor = "var(--OficialOscuro)"
        document.getElementsByClassName("boton")[0].style.color = "var(--OficialClaro)"
        document.getElementsByClassName("boton")[0].style.cursor = "pointer"
        document.getElementsByClassName("boton")[0].classList.remove('borde_1')
        return false;
    }
    else if(Telefono_Per =="" || Telefono_Per.indexOf(" ") == 0 || Telefono_Per.length > 250){
        alert ("Ingrese el número de telefono");
        document.getElementById("TelefonoPeriodista").value = "";
        document.getElementById("TelefonoPeriodista").focus();
        document.getElementById("TelefonoPeriodista").style.backgroundColor = "var(--Fallos)"
        document.getElementsByClassName("boton")[0].value = "Actualizar"
        document.getElementsByClassName("boton")[0].disabled = false
        document.getElementsByClassName("boton")[0].style.backgroundColor = "var(--OficialOscuro)"
        document.getElementsByClassName("boton")[0].style.color = "var(--OficialClaro)"
        document.getElementsByClassName("boton")[0].style.cursor = "pointer"
        document.getElementsByClassName("boton")[0].classList.remove('borde_1')
        return false;
    }
    else if(CNP_Per == "" || CNP_Per.indexOf(" ") == 0 || CNP_Per.length > 10){
        alert ("Introduzca su credencial CNP")
        document.getElementById("CNPPeriodista").value = ""
        document.getElementById("CNPPeriodista").focus()
        document.getElementById("CNPPeriodista").style.backgroundColor = "var(--Fallos)"
        document.getElementsByClassName("boton")[0].value = "Actualizar"
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

//************************************************************************************************