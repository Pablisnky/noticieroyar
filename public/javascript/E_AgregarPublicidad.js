//Validar el formulario de agreagar eventos 
function validarRegistroPublicidad(){
    console.log("_____Desde validarRegistroPublicidad()_____")
        
    document.getElementById("Boton_Agregar").value = "Procesando..."
    document.getElementById("Boton_Agregar").disabled = "disabled"
    document.getElementById("Boton_Agregar").style.backgroundColor = "var(--OficialClaro)"
    document.getElementById("Boton_Agregar").style.color = "var(--OficialOscuro)"
    document.getElementById("Boton_Agregar").style.cursor = "wait"
    document.getElementById("Boton_Agregar").classList.add('borde_1')
    
    let ImagenPrin = document.getElementById('imgInp').value  
    let RazonSocial = document.getElementById('Razon').value.trim()
    let Fecha = document.getElementById('datepicker').value

    //Patron de entrada para archivos de carga permitidos
    var Ext_Permitidas = /^[.jpg|.jpeg|.png]*$/
               
    if(Ext_Permitidas.exec(ImagenPrin) == false || ImagenPrin.size > 2000000){
        alert("Introduzca una imagen con extención .jpeg .jpg .png menor a 2 Mb")
        document.getElementById("imgInp").value = "";
        document.getElementById("Boton_Agregar").value = "Agregar anuncio"
        document.getElementById("Boton_Agregar").disabled = false
        document.getElementById("Boton_Agregar").style.backgroundColor = "var(--OficialOscuro)"
        document.getElementById("Boton_Agregar").style.color = "var(--OficialClaro)"
        document.getElementById("Boton_Agregar").classList.remove('borde_1')
        document.getElementById("Boton_Agregar").style.cursor = "pointer"
        return false;
    }
    else if(Fecha =="" || Fecha.indexOf(" ") == 0){
        alert ("Fecha no valida");
        document.getElementById("datepicker").value = "";
        document.getElementById("datepicker").focus();
        // document.getElementById("datepicker").style.backgroundColor = "var(--Fallos)"
        document.getElementById("Boton_Agregar").value = "Agregar anuncio"
        document.getElementById("Boton_Agregar").disabled = false
        document.getElementById("Boton_Agregar").style.backgroundColor = "var(--OficialOscuro)"
        document.getElementById("Boton_Agregar").style.color = "var(--OficialClaro)"
        document.getElementById("Boton_Agregar").classList.remove('borde_1')
        document.getElementById("Boton_Agregar").style.cursor = "pointer"
        return false;
    }
    else if(RazonSocial =="" || RazonSocial.indexOf(" ") == 0 || RazonSocial.length > 90){
        alert ("La razón social excede el máximo de caracteres");
        document.getElementById("Razon").value = "";
        document.getElementById("Razon").focus();
        // document.getElementById("Titulo").style.backgroundColor = "var(--Fallos)"
        document.getElementById("Boton_Agregar").value = "Agregar anuncio"
        document.getElementById("Boton_Agregar").disabled = false
        document.getElementById("Boton_Agregar").style.backgroundColor = "var(--OficialOscuro)"
        document.getElementById("Boton_Agregar").style.color = "var(--OficialClaro)"
        document.getElementById("Boton_Agregar").classList.remove('borde_1')
        document.getElementById("Boton_Agregar").style.cursor = "pointer"
        return false;
    }
    //Si se superan todas las validaciones la función devuelve verdadero
    return true
}

//************************************************************************************************