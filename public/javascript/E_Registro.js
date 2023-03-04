function validarRegistro(){
    document.getElementsByClassName("boton")[0].value = "Procesando..."
    document.getElementsByClassName("boton")[0].disabled = "disabled"
    document.getElementsByClassName("boton")[0].style.backgroundColor = "var(--OficialClaro)"
    document.getElementsByClassName("boton")[0].style.color = "var(--OficialOscuro)"
    document.getElementsByClassName("boton")[0].style.cursor = "wait"
    document.getElementsByClassName("boton")[0].classList.add('borde_1')
                
    let Nombre = document.getElementById('Nombre').value

    if(Nombre =="" || Nombre.indexOf(" ") == 0 || Nombre.length > 250){
        alert ("Verifique el campo descripción");
        document.getElementById("Nombre").value = "";
        document.getElementById("Nombre").focus();
        // document.getElementById("Nombre").style.backgroundColor = "var(--Fallos)"
        document.getElementsByClassName("boton")[0].value = "Enviar"
        document.getElementsByClassName("boton")[0].disabled = false
        document.getElementsByClassName("boton")[0].style.backgroundColor = "var(--OficialOscuro)"
        document.getElementsByClassName("boton")[0].style.color = "var(--OficialClaro)"
        document.getElementsByClassName("boton")[0].classList.remove('borde_1')
        return false;
    }
    //Si se superan todas las validaciones la función devuelve verdadero
    return true
}