<!--<p> CARGA SDK FONTAWESONE PARA ICONOS DE REDES SOCIALES se uso esta libreria porque los iconos no tienen fondo-->
<script src="https://kit.fontawesome.com/2d6db4c67d.js" crossorigin="anonymous"></script>
<style>
    .mostrarMision{
        margin-top: 470%;
        opacity: 1;
	    transition:all .5s ease-in-out;
    }
    .rotar{        
        transform: rotate(180deg)!important;
	    transition: all 0.4s;
    }
</style>


<div class="cont_adn">
    <div class="cont_adn--div">
        <div class="cont_adn--titulo-ADN"> 
            <div>
                <h1 class="cont_adn--titulo">Nuestro ADN</h1>
            </div>
            <div>
                <img class="Default_quitarEscritorio Default_" style="margin-left: 20px; width: 2em;" id="IconoExpandir" src="<?php echo RUTA_URL . '/public/iconos/chevron/outline_expand_more_black_24dp.png'?>" onclick="mostrarMision()"/>
            </div>
        </div>
        <div class="cont_adn--perfiles"">
            <div class="cont_adn--div--item">
                <figure>
                    <img class="cont_adn_imagen--perfil" alt="Fotografia Perfil" src="<?php echo RUTA_URL?>/public/images/denuncias/imagen.png"/> 
                </figure>
                <div class="cont_adn-informacion">
                    <p class="cont_Artista--leyenda_1">Lisbella Paez</p>
                    <label class="cont_adn--cargo">Dirección de prensa y contenido</label>
                    <div class="cont_adn--iconos">
                        <img style="width: 1.5em; margin-right: 5px" src="<?php echo RUTA_URL . '/public/iconos/correo/outline_email_black_24dp.png'?>"/>
                        <label>lisbellapaez@gmail.com</label>
                    </div>        
                    <div class="cont_adn--iconos">
                        <img style="margin-left: -4px; margin-right: 5px; cursor: pointer" src="<?php echo RUTA_URL?>/public/images/Whatsapp.png" width="27" height="27" alt="Whatsapp"onclick="window.location.href='https://wa.me/584166584057?text=Dirección%20de%20prensa%20NoticieroYaracuy;%20¿En%20que%20podemos%20ayudarte?'">
                        <label>Contacto directo</label>
                    </div>
                </div>
            </div>
    
            <div class="cont_adn--div--item">
                <figure>
                    <img class="cont_adn_imagen--perfil" alt="Fotografia Perfil" src="<?php echo RUTA_URL?>/public/images/denuncias/imagen.png"/>  
                </figure>         
                <div class="cont_adn-informacion">
                    <p class="cont_Artista--leyenda_1">Maria Esther Paez</p>
                    <label class="cont_adn--cargo">Editor de contenido</label>
                    <div class="cont_adn--iconos">
                        <img style="width: 1.5em; margin-right: 5px" src="<?php echo RUTA_URL . '/public/iconos/correo/outline_email_black_24dp.png'?>"/>
                        <label>mariaesther@gmail.com</label>
                    </div>
                    <div class="cont_adn--iconos">
                        <img style="margin-left:-4px; margin-right: 5px; cursor: pointer" src="<?php echo RUTA_URL?>/public/images/Whatsapp.png" width="27" height="27" alt="Whatsapp" onclick="window.location.href='https://wa.me/584120116334?text=Edición%20de%20contenido%20NoticieroYaracuy;%20¿En%20que%20podemos%20ayudarte?'">
                        <label>Contacto directo</label>
                    </div>
                </div>
            </div>

            <div class="cont_adn--div--item">
                <figure>
                    <img class="cont_adn_imagen--perfil" alt="Fotografia Perfil" src="<?php echo RUTA_URL?>/public/images/denuncias/imagen.png"/>  
                </figure>         
                <div class="cont_adn-informacion">
                    <p class="cont_Artista--leyenda_1">Pablo Cabeza</p>
                    <label class="cont_adn--cargo">Portal web y despliegue tecnológico</label>
                    <div class="cont_adn--iconos">
                        <img style="width: 1.5em; margin-right: 5px;" src="<?php echo RUTA_URL . '/public/iconos/correo/outline_email_black_24dp.png'?>"/>
                        <label>pcabeza7@gmail.com</label>
                    </div>
                    <div class="cont_adn--iconos">
                        <img style="margin-left: -4px; margin-right: 5px; cursor: pointer" src="<?php echo RUTA_URL?>/public/images/Whatsapp.png" width="27" height="27" alt="Whatsapp" onclick="window.location.href='https://wa.me/584245374044?text=Soporte%20tecnico%20NoticieroYaracuy;%20¿En%20que%20podemos%20ayudarte?'"/>
                        <label>Contacto directo</label>
                    </div>
                </div>
            </div>
        </div>
        
        <p class="p_1 cont_adn--texto Default--final" id="Texto_1">Una sociedad prospera, civilizada y justa, existe cuando casi la totalidad de sus miembros forman parte activa de su desarrollo, es la razón por la que en NoticieroYaracuy fomentamos la actitud colaborativa de nuestros paisanos. 
        <br><br>
        Para ello, ademas de informar de hechos y eventos que estan sucediendo, estan por suceder, o van a suceder en nuestro estado, hemos desarrollado una serie de servicios en donde los usuarios interactuan con la dinamica citadina comercial, politica y cultural por medio de herramientas tecnologicas disponibles en nuestro portal web.
        <br><br>
        Se han desarrollado tres secciónes actualmente en servicio; una para interactuar con la compra, venta y despacho de productos comercializados en las ciudades de nuestro estado, otra para interactuar con la contraloria social y reportar fallos y deficiencias en los servicios publicos o situaciones no convencionales, otra sección cultural para la adquisición de obras de artistas plasticos del estado por medio de subastas o compra directa, y una cuarta sección que se encuentra en desarrollo que pretende prestar el servcio de gestión de turnos de esperas sin estar presente in situs.</p>
    </div>   
</div>


<script src="<?php echo RUTA_URL.'/public/javascript/funcionesVarias.js?v='. rand();?>"></script>
<script src="<?php echo RUTA_URL.'/public/javascript/E_nuestroADN.js?v='. rand();?>"></script>

</body>
</html>