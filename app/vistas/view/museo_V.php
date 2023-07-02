
		<!-- estilos parametrizados -->
		<?php
			if($Datos['bandera'] == 'Sala_1'){                
				$background_content = '#A0AEB1';
			}
            else if($Datos['bandera'] == 'Sala_2'){   
				$background_content = 'rgb(0, 0, 0)';
            }
            else if($Datos['bandera'] == 'Sala_3'){   
				$background_content = 'rgb(190, 201, 203)';
            }
            else if($Datos['bandera'] == 'Sala_4'){   
				$background_content = 'rgb(219, 205, 196)';
            }
		?>
		<style>
			/* Se parameretriza la clase CSS segun el valor de la bandera */
			.Param_content{
				background-color: <?php echo $background_content?>;
			}
		</style>

   <section style="scroll-snap-type: y mandatory;">
        <div class="cont_Museo" id="Sala_0">

            <!-- IMAGEN PRINCIPAL -->
            <figure id="Inicio">
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
                <label>Lunes a viernes</label>
                <br>
                <label>8:00 am - 4:00 pm</label>
                <br>
                <!-- <small>Complejo Cultural Andres Bello</small>
                <br> -->
                <small>2da Avenida entre calles 13 y 15. &nbsp;&nbsp; San Felipe - Yaracuy</small>
            </div>
            
            <!-- FLECHA ABAJO -->	
            <div class="cont_Museo--flechaUnica Default_pointer"> 
                <img style="background-color: black; border-radius: 50%; width: 3vw; display: block; margin: auto; transform: rotate(90deg);" onclick="pantalla('Sala_0','Abajo')" src="<?php echo RUTA_URL . '/public/iconos/chevron/outline_arrow_forward_ios_white_24dp.png'?>"/>
            </div>
        </div> 


        <!-- SALAS DE EXPOSICION-->
        <?php
        foreach($Datos['exposiciones'] as $Key) :   ?>
            <div class="cont_Museo cont_Museo--div Param_content" style="scroll-snap-align: center;" id="<?php echo $Key['ID_Sala']?>">
                <div class="cont_Museo--div--item">
                    <div style="flex-grow: 1;flex-shrink: 1;">
                        <figure class="">
                            <!-- <img class="Museo--imgPerfil borde_1" name="imagenNoticia" alt="Fotografia Artista" src="<?php //echo RUTA_URL?>/public/images/museo/06.jpeg"/> -->
                        </figure> 
                        <label class="cont_museo--label_1">Artista</label>
                        <p class="cont_museo--p"><?php echo $Key['autorExposicion']?></p> 
                        
                        <label class="cont_museo--label_1">Colección</label>
                        <p class="cont_museo--p"><?php echo $Key['nombreExposicion']?>.</p>
                        
                        <label class="cont_museo--label_1">Obras en exposición</label> 
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
                                <p class="cont_museo--p"><?php echo $Key['fecha_Inicio']?></p> 
                            </div>
                            <div class="cont_museo--fecha--item">
                                <label class="cont_museo--label_1">hasta</label> 
                                <p class="cont_museo--p"><?php echo $Key['fecha_Culmina']?></p>
                            </div>

                            <!-- DIAS -->
                            <div class="cont_museo--fecha--item">
                                <label class="cont_museo--label_1">Culmina</label> 
                                <?php
                                foreach($Datos['diasExposicion'] as $Row_2)   :
                                    if($Key['ID_Sala'] == $Row_2['ID_Sala']){ 
                                        if($Row_2['dias_restantes'] <= 0){  ?>
                                            <p class="cont_museo--p cont_museo--p--concluida">Muestra concluida</p>
                                            <?php
                                        }
                                        else{   ?>
                                            <p class="cont_museo--p"> <?php echo $Row_2['dias_restantes']?> dias</p>
                                            <?php
                                        }
                                    }   
                                endforeach; ?>
                            </div>
                        </div>
                    
                        <p class="cont_museo--textarea" readonly><?php echo $Key['TextoEspacio']?></p>
                    </div>

                    <div class="cont_Museo--div--item--boton">
                        <div style="display: flex; justify-content: center; flex-grow: 1;flex-shrink: 1;">
                            <a class="boton" style="display: block; width: 30%;" href="<?php echo RUTA_URL . '/Museo_C/salaExposicion/' . $Key['ID_Sala'];?>" rel="noopener noreferrer">Obras de la colección</a>
                        </div>

                        <div style="position: relative; bottom: 10%">

                             <!-- FLECHAS ARRIBA -->	
                            <div class="cont_Museo--FelchaArriba Default_pointer" style="transform: rotate(90deg);"> 
                                <img style="width: 2em;" onclick="pantalla('<?php echo $Key['ID_Sala']?>', 'Arriba')" src="<?php echo RUTA_URL . '/public/iconos/chevron/outline_arrow_back_ios_white_24dp.png'?>"/>
                            </div>

                             <!-- FLECHAS ABAJO -->	
                            <div class="cont_Museo--FelchaArriba Default_pointer" style="transform: rotate(90deg); margin-bottom: 0%;"> 
                                <img style="width: 2em;" onclick="pantalla('<?php echo $Key['ID_Sala']?>', 'Abajo')" src="<?php echo RUTA_URL . '/public/iconos/chevron/outline_arrow_forward_ios_white_24dp.png'?>"/>
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