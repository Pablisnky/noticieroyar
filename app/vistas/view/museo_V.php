    
    <section style="overflow: hidden;">
        <div class="cont_Museo">

            <!-- IMAGEN PRINCIPAL -->
            <figure class="" id="Inicio">
                <img class="cont_Museo--img" name="imagenNoticia" alt="Fotografia Artista" src="<?php echo RUTA_URL?>/public/images/museo/imag_01.jpeg"/>
            </figure>

            <!-- IMAGENES MINIATURAS -->
            <div class="cont_Museo--imgSecundaria">
                <figure class="">
                <img class="Museo--imgSecundaria borde_1 borde_4 Default_pointer" name="imagenNoticia" alt="Fotografia Artista" src="<?php echo RUTA_URL?>/public/images/museo/imag_01.jpeg" id="imag_01"
                onclick="Llamar_VerMiniatura('imag_01.jpeg')"/>
                <img class="Museo--imgSecundaria borde_1 borde_4 Default_pointer" name="imagenNoticia" alt="Fotografia Artista" src="<?php echo RUTA_URL?>/public/images/museo/imag_02.jpeg" id="imag_02.jpeg" onclick="Llamar_VerMiniatura('imag_02.jpeg')"/>
                <img class="Museo--imgSecundaria borde_1 borde_4 Default_pointer" name="imagenNoticia" alt="Fotografia Artista" src="<?php echo RUTA_URL?>/public/images/museo/imag_03.png" id="imag_03.png" onclick="Llamar_VerMiniatura('imag_03.png')"/>
                <img class="Museo--imgSecundaria borde_1 borde_4 Default_pointer" name="imagenNoticia" alt="Fotografia Artista" src="<?php echo RUTA_URL?>/public/images/museo/imag_04.jpg" id="imag_04.jpg" onclick="Llamar_VerMiniatura('imag_04.jpg')"/>
                <img class="Museo--imgSecundaria borde_1 borde_4 Default_pointer" name="imagenNoticia" alt="Fotografia Artista" src="<?php echo RUTA_URL?>/public/images/museo/imag_05.jpg" id="imag_05.jpg" onclick="Llamar_VerMiniatura('imag_05.jpg')"/>
                </figure>            
            </div>
            
            <!-- MEMBRETE -->
            <div class="cont_Museo--membrete">
                <h1 class="h_1">Museo Carmelo Fernandez</h1>
                <small class="small_3">San Felipe - Yaracuy</small>
                <label>Lunes a viernes</label>
                <br>
                <label>8:00 am - 4:00 pm</label>
                <br>
                <small>2da Avenida entre calles 14 y 15.</small>
            </div>
        </div> 

        <!-- SALAS DE EXPOSICION-->
        <?php
        foreach($Datos['exposiciones'] as $Key) :   ?>
            <div class="cont_Museo cont_Museo--div" id="<?php echo $Key['ID_Sala']?>">
                <div class="cont_Museo--div--item">
                    <div style="flex-grow: 1;flex-shrink: 1;">
                        <figure class="">
                            <!-- <img class="Museo--imgPerfil borde_1" name="imagenNoticia" alt="Fotografia Artista" src="<?php //echo RUTA_URL?>/public/images/museo/06.jpeg"/> -->
                        </figure> 
                        <label class="cont_museo--label_1">Artista</label>
                        <p class="cont_museo--p"><?php echo $Key['autorExposicion']?></p> 
                        
                        <label class="cont_museo--label_1">Colección</label>
                        <p class="cont_museo--p"><?php echo $Key['nombreExposicion']?>.</p>
                        
                        <label class="cont_museo--label_1">Obras de la colección</label> 
                        <?php
                        foreach($Datos['nroObras'] as $Row)   :
                            if($Key['ID_Exposicion'] == $Row['ID_Exposicion']){ ?>
                                <p class="cont_museo--p"><?php echo $Row['Nro_Obras']?></p>
                                <?php
                            }  
                        endforeach; ?>

                        <div class="cont_museo--fecha">
                            <div class="cont_museo--fecha--item">
                                <label class="cont_museo--label_1">Desde</label>
                                <p class="cont_museo--p"><?php echo $Key['fechaInicio']?></p> 
                            </div>
                            <div class="cont_museo--fecha--item">
                                <label class="cont_museo--label_1">hasta</label> 
                                <p class="cont_museo--p"><?php echo $Key['fechaCulmina']?></p>
                            </div>
                            <div class="cont_museo--fecha--item">
                                <label class="cont_museo--label_1">Culmina</label> 
                                <?php
                                foreach($Datos['diasExposicion'] as $Row_2)   :
                                    if($Key['ID_Sala'] == $Row_2['ID_Sala']){ ?>
                                        <p class="cont_museo--p"> <?php echo $Row_2['dias_restantes']?> dias</p>
                                        <?php
                                    }  
                                endforeach; ?>
                            </div>
                        </div>
                    
                        <textarea class="cont_museo--textarea" readonly><?php echo $Key['TextoEspacio']?></textarea>
                    </div>

                    <div class="cont_Museo--div--item--boton">
                        <div style="display: flex; justify-content: center; flex-grow: 1;flex-shrink: 1;">
                            <a class="boton" style="display: block; width: 30%;" href="<?php echo RUTA_URL . '/Museo_C/salaExposicion/' . $Key['ID_Sala'];?>" rel="noopener noreferrer">Obras de la colección</a>
                        </div>

                        <div style="background-color: red; position: relative; bottom: 10%">

                             <!-- FLECHAS ARRIBA -->	
                            <div style="transform: rotate(90deg);"> 
                                <img onclick="pantalla('<?php echo $Key['ID_Sala']?>', 'Arriba')" src="<?php echo RUTA_URL . '/public/iconos/chevron/outline_arrow_back_ios_new_black_24dp.png'?>" oncl/>
                            </div>

                             <!-- FLECHAS ABAJO -->	
                            <div style="transform: rotate(90deg);"> 
                                <img onclick="pantalla('<?php echo $Key['ID_Sala']?>', 'Abajo')" src="<?php echo RUTA_URL . '/public/iconos/chevron/outline_arrow_forward_ios_black_24dp.png'?>"/>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="cont_Museo--div--img">
                    <div class="cont_Museo--imagen ">
                        <figure class="">
                            <img class="Museo--imgSala borde_5" name="imagenNoticia" alt="Fotografia Principal de la colección" src="<?php echo RUTA_URL?>/public/images/museo/<?php echo $Key['ID_Sala']?>/<?php echo $Key['nombreImagenSala']?>"/>
                        </figure> 
                    </div>
                    <p class="cont_museo--sala Default--textoVertical"><?php echo $Key['ID_Sala']?></p>
                </div>

                
            </div>
            <?php
        endforeach; ?>
    </section>
    
<script src="<?php echo RUTA_URL.'/public/javascript/funcionesVarias.js?v='. rand();?>"></script>
<script src="<?php echo RUTA_URL.'/public/javascript/E_Museo.js?v='. rand();?>"></script>
<script src="<?php echo RUTA_URL.'/public/javascript/A_Museo.js?v='. rand();?>"></script>