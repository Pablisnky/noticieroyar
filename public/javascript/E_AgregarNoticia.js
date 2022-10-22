document.getElementById("Contenido").addEventListener('keydown', function(){autosize('Contenido')}, false)

document.getElementById("Titulo").addEventListener('keydown', function(){contarCaracteres("ContadorTitulo", "Titulo", 80)}, false)
document.getElementById("Titulo").addEventListener('keydown', function(){valida_LongitudDes(80, "Titulo")}, false)

document.getElementById("Resumen").addEventListener('keydown', function(){contarCaracteres("ContadorResumen", "Resumen", 120)}, false)
document.getElementById("Resumen").addEventListener('keydown', function(){valida_LongitudDes(120, "Resumen")}, false)

document.getElementById("Contenido").addEventListener('keydown', function(){contarCaracteres("ContadorContenido", "Contenido", 2000)}, false)
document.getElementById("Contenido").addEventListener('keydown', function(){valida_LongitudDes(2000, "Contenido")}, false)

//llama a la funcion cuando detecta cambio en el textarea, Ej: al pegar un texto
document.getElementById("Titulo").addEventListener("input", (event) => contarCaracteres("ContadorTitulo", "Titulo", 80));
document.getElementById("Resumen").addEventListener("input", (event) => contarCaracteres("ContadorResumen", "Resumen", 120));
//************************************************************************************************
    //obtiendo informacion del DOM para identificar el elemento donde se hizo click 
    // window.addEventListener("click", function(e){   
    //     var click = e.target
    //     console.log("Se hizo click en: ", click)
    // }, false)
    
//************************************************************************************************
    //Muestra la cantidad de caracteres que quedan mientras se escribe
    function contarCaracteres(ID_Contador, ID_Contenido, Max){
        // console.log("______Desde contarCaracteres()______", ID_Contador + " / " + ID_Contenido + " / " + Max) 
        var max = Max; 
        // console.log(max)
        var cadena = document.getElementById(ID_Contenido).value; 
        // console.log(cadena)
        var longitud = cadena.length; 

        if(longitud <= max) { 
            document.getElementById(ID_Contador).value = max-longitud; 
        } else { 
            document.getElementById(ID_Contador).value = cadena.subtring(0, max);
        } 
    } 

//************************************************************************************************
    //Muestra la cantidad de caracteres que ya tiene el campo; cargado desde BD
    function CaracteresAlcanzados(ID_Contenido, ID_Contador){
        // console.log("______Desde CaracteresAlcanzados()______",ID_Contenido + " / " + ID_Contador) 

        var Contenido = document.getElementById(ID_Contenido).value
        var ContadorContenido = document.getElementById(ID_Contador).value

        var CaracteresDisponibles = ContadorContenido - Contenido.length

        document.getElementById(ID_Contador).value = CaracteresDisponibles
    } 

//************************************************************************************************ 
    //Impide que se sigan introduciendo caracteres al alcanzar el limite maximo en un elmento
    let contenidoControlado = "";    
    function valida_LongitudDes(Max, ID_Contenido){
        console.log("______Desde valida_LongitudDes()______", Max + " / "+ ID_Contenido) 
                
        let num_caracteres_permitidos = Max;

        //se detecta la cantidad de caracteres escritos 
        let num_caracteresEscritos = document.getElementById(ID_Contenido).value.length

        if(num_caracteresEscritos > num_caracteres_permitidos){ 
            document.getElementById(ID_Contenido).value = contenidoControlado; 
        }
        else{ 
            contenidoControlado = document.getElementById(ID_Contenido).value; 
        } 
    } 

//************************************************************************************************
    //Ajusta la altura del texarea según se vaya escribiendo en el mismo                
    function autosize(id){
        console.log("______Desde autosize()______", id)
        var el = document.getElementById(id);
        
        setTimeout(function(){
            el.style.cssText = 'height:auto; padding:0';
            el.style.cssText = 'height:' + el.scrollHeight + 'px';
        },0);
    }

//************************************************************************************************ 
    //ajusta la altura de un texarea con respecto al contenido que trae de la BD
    function resize(id){
        console.log("______Desde resize()______", id) 
        var text = document.getElementById(id);
        text.style.height = 'auto';
        text.style.height = text.scrollHeight+'px';
    }

//************************************************************************************************    
    //
    function CerrarModal(){
        document.getElementById("MostrarSeccion").style.display = "none"

        //Se limpia el input secciones en caso de haber seleccionado alguna
        document.getElementById("SeccionPublicar").value = ""
    } 

//************************************************************************************************    
        //
        function ConfirmarTrasferir(){
            document.getElementById("MostrarSeccion").style.display = "none"
    
        } 

//************************************************************************************************  
     function transferirSeccion(form, id){
        // console.log("______Desde transferirSeccion()______")
        //Se declara el array que contendra la cantidad de categorias seleccionadas
        var TotalCategoria = []

        //Se reciben los elementos del formulario mediante su atributo name
        Seccion = form.seccion

        //Se recorre todos los elementos para encontrar el que esta seleccionado
        for(var i = 0; i<Seccion.length; i++){ 
            if(Seccion[i].checked){
                //Se toma el valor del seleccionado
                Seleccionado = Seccion[i].value
                TotalCategoria.push(Seleccionado );
            }            
        } 

        //Se transfiere el valor del radio boton seleccionado al input del formulario
        document.getElementById(id).value = TotalCategoria
        document.getElementById(id).focus();
    }


//************************************************************************************************  
    function validarAgregarNoticia(){
        document.getElementById("Boton_Agregar").value = "Procesando..."
        document.getElementById("Boton_Agregar").disabled = "disabled"
        document.getElementById("Boton_Agregar").style.backgroundColor = "var(--OficialClaro)"
        document.getElementById("Boton_Agregar").style.color = "var(--OficialOscuro)"
        document.getElementById("Boton_Agregar").classList.add('borde_1')

        let Fecha = document.getElementById('Fecha').value
        let Seccion = document.getElementById('SeccionPublicar').value
                
        if(Seccion =="" || Seccion.indexOf(" ") == 0){
            alert ("Ingrese una sección para la noticia");
            document.getElementById("SeccionPublicar").value = "";
            document.getElementById("SeccionPublicar").focus();
            // document.getElementById("SeccionPublicar").style.backgroundColor = "var(--Fallos)"
            document.getElementById("Boton_Agregar").value = "Agregar noticia"
            document.getElementById("Boton_Agregar").disabled = false
            document.getElementById("Boton_Agregar").style.backgroundColor = "var(--OficialOscuro)"
            document.getElementById("Boton_Agregar").style.color = "var(--OficialClaro)"
            document.getElementById("Boton_Agregar").classList.remove('borde_1')
            return false;
        }
        else if(Fecha =="" || Fecha.indexOf(" ") == 0){
            alert ("Fecha no valida");
            document.getElementById("Fecha").value = "";
            document.getElementById("Fecha").focus();
            // document.getElementById("Fecha").style.backgroundColor = "var(--Fallos)"
            document.getElementById("Boton_Agregar").value = "Agregar noticia"
            document.getElementById("Boton_Agregar").disabled = false
            document.getElementById("Boton_Agregar").style.backgroundColor = "var(--OficialOscuro)"
            document.getElementById("Boton_Agregar").style.color = "var(--OficialClaro)"
            document.getElementById("Boton_Agregar").classList.remove('borde_1')
            return false;
        }
        //Si se superan todas las validaciones la función devuelve verdadero
        return true
    }
