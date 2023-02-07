document.addEventListener('DOMContentLoaded', ajustarTexarea(), false)

function ajustarTexarea(){
    
    var elemento = document.getElementsByClassName('Efemeride--JS')
    var cantidadELementos = elemento.length
    // console.log(cantidadELementos)
    
    for(let i = 0; i < cantidadELementos; i++){
        // console.log() 
        var text = elemento[i];
        text.style.height = 'auto';
        text.style.height = text.scrollHeight+'px';
    }
}