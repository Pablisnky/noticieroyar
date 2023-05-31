<div class="cont_adn">
    <div class="cont_adn--div">
        <div class="cont_adn--titulo-ADN"> 
            <div>
                <h1 class="cont_adn--titulo">Nuestro ADN</h1>
            </div>
            <div>
                <img class="Default_quitarEscritorio" style="margin-left: 20px; width: 2em;" id="IconoExpandir" src="<?php echo RUTA_URL . '/public/iconos/chevron/outline_expand_more_black_24dp.png'?>" onclick="mostrarMision()"/>
            </div>
        </div>
        <div class="cont_adn--perfiles"">
            <?php 
            foreach($Datos['founder'] as $Row) :   ?>
                <div class="cont_adn--div--item">
                    <figure>
                        <img class="cont_adn_imagen--perfil" alt="Fotografia Perfil" src="<?php echo RUTA_URL?>/public/images/equipo/<?php echo $Row['imagenPerfilAdmin']?>"/>  
                    </figure>         
                    <div class="cont_adn-informacion">
                        <p class="cont_Artista--leyenda_1"><?php echo $Row['nombreAdmin'] . ' ' . $Row['apellidoAdmin']?></p>
                        <label class="cont_adn--cargo"><?php echo $Row['cargoAdmin']?></label>
                        <div class="cont_adn--iconos">
                            <img style="width: 1.5em; margin-right: 5px;" src="<?php echo RUTA_URL . '/public/iconos/correo/outline_email_black_24dp.png'?>"/>
                            <label><?php echo $Row['correoAdmin']?></label> 
                        </div>
                        <div class="cont_adn--iconos">
                            <img style="margin-left: -4px; margin-right: 5px; cursor: pointer" src="<?php echo RUTA_URL?>/public/images/Whatsapp.png" width="27" height="27" alt="Whatsapp" onclick="window.location.href='https://wa.me/<?php echo $Row['telefonoAdmin']?>?text=<?php echo $Row['cargoAdmin']?>%20NoticieroYaracuy;%20¿En%20que%20podemos%20ayudarte?'"/>
                            <label>Contacto directo</label>
                        </div>
                    </div>
                </div>
                <?php
            endforeach; ?>
        </div>
        
        <p class="p_1 cont_adn--texto Default--final" id="Texto_1">Una sociedad prospera, civilizada y justa, existe cuando casi la totalidad de sus miembros forman parte activa de su desarrollo, es la razón por la que en NoticieroYaracuy fomentamos la actitud colaborativa de nuestros paisanos. 
        <br><br>
        Para ello, nos hemos enfocado en abordar noticias locales, o noticias fuera de nuestro territorio si un yaracuyano forma parte de su contexto, siguiendo una linea editorial de informar textualmente hechos y eventos que estan sucediendo, estan por suceder, o van a suceder en nuestro estado, sin emitir juicios u opiniones al respecto, y una línea social haciendo enfasis en la integración regional, por medio de una serie de servicios disponibles en nuestro portal web que hemos desarrollados para que los usuarios interactuan con la dinamica citadina comercial, politica y cultural.
        <br><br>
        Se han desarrollado tres secciónes actualmente en servicio; una para interactuar con la compra, venta y despacho de productos comercializados en las ciudades de nuestro estado, otra para interactuar con la contraloria social y reportar fallos y deficiencias en los servicios publicos o situaciones no convencionales, otra sección cultural para la adquisición de obras de artistas plasticos del estado por medio de subastas o compra directa, y una cuarta sección que se encuentra en desarrollo que pretende prestar el servcio de gestión de turnos de esperas sin estar presente in situs.</p>
    </div>   
</div>


<script src="<?php echo RUTA_URL . '/public/javascript/funcionesVarias.js?v='. rand();?>"></script>
<script src="<?php echo RUTA_URL . '/public/javascript/E_nuestroADN.js?v='. rand();?>"></script>

</body>
</html>