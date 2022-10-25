document.addEventListener('DOMContentLoaded',function(){resize('Contenido')}, false)

// document.getElementById("Contenido").addEventListener('click', function(){resize('Contenido')}, false)
// document.getElementById("Contenido").addEventListener('keydown', function(){autosize('Contenido')}, false)

//************************************************************************************************
    //obtiendo informacion del DOM para identificar el elemento donde se hizo click 
    window.addEventListener("click", function(e){   
        var click = e.target
        console.log("Se hizo click en: ", click)
    }, false)