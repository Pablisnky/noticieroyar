statu = false
function mostrarMision(){
    // console.log("_____ Desde mostrarMision() _____ ")
    if(statu == false){
        document.getElementById("Texto_1").classList.add("mostrarMision");
        document.getElementById("IconoExpandir").classList.add("rotar");
        statu = true
    }
    else{
        document.getElementById("Texto_1").classList.remove("mostrarMision");
        document.getElementById("IconoExpandir").classList.remove("rotar");
        statu = false
    }
}