 
document.getElementById("PrecioBolivar").addEventListener('keyup', function(){CambioMonetarioBolivar(this.value, "PrecioDolar")}, false)

document.getElementById("PrecioDolar").addEventListener('keyup', function(){CambioMonetarioDolar(this.value, "PrecioBolivar")}, false)

document.getElementById("PrecioBolivar").addEventListener('focus', function(){ReiniciaCampo("PrecioBolivar","PrecioDolar")}, false)

document.getElementById("PrecioDolar").addEventListener('focus', function(){ReiniciaCampo("PrecioBolivar","PrecioDolar")}, false)

//************************************************************************************************
    //Realia el cambio de moneda Dolar a Bolivar
    function CambioMonetarioBolivar(Monto, id){
        // console.log("______Desde CambioMonetarioBolivar______", Monto + " " + id)

        let Dolar = document.getElementById(id)
        let PrecioDolar = document.getElementById("CambioOficial").value
        
        let Cambio_Dolar = Monto / PrecioDolar
       
        Dolar.value = Cambio_Dolar.toFixed(2)
    }

//************************************************************************************************ 
    //Realia el cambio de moneda Bolivar a Dolar
    function CambioMonetarioDolar(Monto, id){
        // console.log("______Desde CambioMonetarioDolar______", Monto + " " + id)

        let Bolivar = document.getElementById(id)
        let PrecioDolar = document.getElementById("CambioOficial").value

        let Cambio_Bolivar = Monto * PrecioDolar

        Bolivar.value = Cambio_Bolivar.toFixed(2)
    }

//************************************************************************************************
    function ReiniciaCampo(id_1, id_2){
        // console.log("______Desde ReiniciaCampo", id_1 + " " + id_2)

        document.getElementById(id_1).value = ''
        document.getElementById(id_2).value = ''
    }

//************************************************************************************************
 //Para distinguir la opción actualmente pulsada en cada grupo
 var pref_opcActual = "opcActual_";

 //Verifica si una variable definida dinámicamente existe o no
 function varExiste(sNombre){
     return (eval("typeof(" + sNombre + ");") != "undefined");
 }

 //Asigna un valor a una variable creada dinámicamente a partir de su nombre
 function asignaVar(sNombre, valor){
     eval(sNombre + " = " + valor + ";");
 }

 //generamos dinámicamente variables globales para contener la opción pulsada en cada uno de los grupos
 console.log("Cantidad elementos en el formulario = ",document.forms.length)
 for(f= 0; f<document.forms.length; f++){
     for(i = 0; i< document.forms[f].elements.length; i++){
         var elementoExistente = document.forms[f].elements[i];
         var exprCrearVariable = "";

         if(elementoExistente.type == "radio"){
             //Si la variable no existe la definimos siempre, pero sólo la redefinimos en caso de que el elemento actual del grupo esté asignado
             if(!varExiste(pref_opcActual + elementoExistente.name)){
                 exprCrearVariable = "var " + pref_opcActual + elementoExistente.name + " = ";
             }
             else{
                 exprCrearVariable = pref_opcActual + elementoExistente.name + " = ";
             }
             
             //El valor será nulo o una referencia al radio actual en función de si está seleccionado o no
             if(elementoExistente.checked)
                 exprCrearVariable += "document.getElementById(‘" + elementoExistente.id + "‘)";
             else
                 exprCrearVariable += "null";

             //Definimos la variable y asignamos el valor sólo si no existe o si el radio actual está marcado 
             if(!varExiste(pref_opcActual + elementoExistente.name) || elementoExistente.checked)
                 eval(exprCrearVariable);
         }
     }
 }

 function gestionarClickRadio(opcPulsada){
    //  console.log("____Desde gestionarClickRadio()____",opcPulsada)
     //El nombre de la variable que contiene el nombre del grupo actual
     var svarOpcAct = pref_opcActual + opcPulsada.name;
     var opcActual = null;
     
     //recupero dinámicamente una referencia al último radio pulsado de este grupo
     opcActual = eval(svarOpcAct);  

     if(opcActual == opcPulsada){
         //deselecciono
         opcPulsada.checked = false; 
         
         //y quito referencia (es como si nunca se hubiera pulsado)
         asignaVar(svarOpcAct, "null");  
     }
     else{
         //Anoto la última opción pulsada de este grupo
         asignaVar(svarOpcAct, "document.getElementById('" + opcPulsada.id + "')");  
     }
 }