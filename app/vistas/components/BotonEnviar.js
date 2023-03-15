//Se construye un customer Element
class BotonEnviar extends HTMLElement {

    constructor() {
      super();
    }

    connectedCallback(){
      this.innerHTML = "Boton cmo Web Component"
    }
  
  }
  
//Se declara el elemento a construir
window.customElements.define("NotYar-Boton", BotonEnviar);