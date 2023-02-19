document.getElementById("Contenido").addEventListener('keydown', function(){autosize('Contenido')}, false)

document.getElementById("Titulo").addEventListener('keydown', function(){contarCaracteres("ContadorTitulo", "Titulo", 90)}, false)

//************************************************************************************************
    //obtiendo informacion del DOM para identificar el elemento donde se hizo click 
    // window.addEventListener("click", function(e){   
    //     var click = e.target
    //     console.log("Se hizo click en: ", click)
    // }, false)
    
//************************************************************************************************  
    function blaquearInput(ID_Contenido){
        // console.log("______Desde blaquearInput()______") 
        document.getElementById(ID_Contenido).value = ""
    }
    
//************************************************************************************************  
    function validarAgregarDenuncia(){
        document.getElementById("Boton_Agregar").value = "Procesando..."
        document.getElementById("Boton_Agregar").disabled = "disabled"
        document.getElementById("Boton_Agregar").style.backgroundColor = "var(--OficialClaro)"
        document.getElementById("Boton_Agregar").style.color = "var(--OficialOscuro)"
        document.getElementById("Boton_Agregar").style.cursor = "wait"
        document.getElementById("Boton_Agregar").classList.add('borde_1')

        let Descripcion = document.getElementById('Descripcion').value
                   
        if(Descripcion =="" || Descripcion.indexOf(" ") == 0 || Descripcion.length > 250){
            alert ("Verifique el campo descripción");
            document.getElementById("Descripcion").value = "";
            document.getElementById("Descripcion").focus();
            // document.getElementById("Descripcion").style.backgroundColor = "var(--Fallos)"
            document.getElementById("Boton_Agregar").value = "Enviar"
            document.getElementById("Boton_Agregar").disabled = false
            document.getElementById("Boton_Agregar").style.backgroundColor = "var(--OficialOscuro)"
            document.getElementById("Boton_Agregar").style.color = "var(--OficialClaro)"
            document.getElementById("Boton_Agregar").classList.remove('borde_1')
            return false;
        }
        //Si se superan todas las validaciones la función devuelve verdadero
        return true
    }