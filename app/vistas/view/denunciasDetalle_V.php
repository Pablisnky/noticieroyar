<div class="cont_portada" id="Cont_Portada" style="background-color:">
    <div class="cont_portada--noticia contenedor_tarjeta">
        <div class="tarjeta" id="Tarjeta_<?php echo $Iterador?>">

            <div class="borde_1 adelante" id="adelante_<?php echo $Iterador?>">

                <!-- IMAGEN PRINCIPAL-->
                <?php 
                $Datos['imagenesDenunciaPrincipal'] as $Key_1) :  
                    if($Key['ID_Denuncia'] == $Key_1['ID_Denuncia']){   ?>
                        <div class="cont_portada--imagen Default_pointer">
                            <a href="<?php echo RUTA_URL . '/Contraloria_C/detalleDenuncia/' . $Key['ID_Denuncia'];?>" rel="noopener noreferrer" target="_blank"><img class="imagen--portada efectoBrillo" alt="Fotografia Principal" src="<?php echo RUTA_URL?>/public/images/denuncias/<?php echo $Key_1['nombre_imgDenuncia'];?>"/></a>
                        </div>
                        <?php
                    }
                endforeach; ?>
                                    
                <!-- IMAGENES SECUNDARIAS EN MINIATURAS -->

                <!-- DESCRIPCION -->
                <div class="cont_portada--titular">                   
                    <h2 class="titular--texto"><?php echo $Key['descripcionDenuncia'];?></h2>
                </div>
                
                <!-- UBICACION -->
                <div class="denuncias--texto">                   
                    <h2 class="cont_portada--resumen"><?php echo $Key['ubicacionDenuncia'];?></h2>
                </div>

                <!-- MUNICIPIO Y FECHA--> 
                <div class="denuncias--texto">                   
                    <small><?php echo $Key['municipioDenuncia'];?>&nbsp&nbsp&nbsp</small><small><?php echo $Key['fecha_denuncia'];?></small>
                </div>
            </div>
            
    <!-- COMENTARIO --> 
    <div id="ContedorComentario">
        <label class="marcador" id="Marcador">Comentarios</label>
        </br>

        <!-- Se escribe el nuevo comentario -->
        <textarea class="textarea--comentario" id="Comentario" nome="comentario" onfocus="Llamar_VerificarSuscripcion('<?php echo $Datos['detalleNoticia'][0]['ID_Noticia']?>','comentar','NA')"></textarea>
        <?php
        if(isset($_SESSION['ID_Suscriptor'])){   ?>
            <label class="boton boton--comentar" onclick="Llamar_InsertarComentario('<?php echo $Datos['detalleNoticia'][0]['ID_Noticia']?>')">Comentar</label>
            <?php
        }   ?>
    
        <!-- div carga el nuevo comentario -->
        <div class="cont_comentario--BD" style="margin-top: 2%" id="ComentarioInsertado"></div>

        <!-- Se cargan los comentarios existentes en BD -->
        <div class="">
            <?php
            foreach($Datos['comentarios'] as $Row)   :   ?>
                <div class="cont_comentario--BD" id="<?php echo $Row['ID_Comentario'];?>">
                    <p class="detalle_cont--p--comentario" readonly><?php echo $Row['comentario']?></p>
                    <div class="comentario--informacion">
                        <label class="comentario--fecha"><?php echo $Row['nombreSuscriptor']?></label>
                        <label class="comentario--fecha"><?php echo $Row['apellidoSuscriptor']?></label>&nbsp&nbsp&nbsp
                        <label class="comentario--fecha"><?php echo $Row['fechaComentario']?></label>&nbsp&nbsp&nbsp<label class="comentario--fecha"><?php echo $Row['horaComentario']?></label>
                    </div> 

                    <!-- Respuesta a comentario -->
                    <div class="cont_comentario--respuesta Default_ocultar" id="Respuesta_<?php echo $Row['ID_Comentario'];?>">
                        <!-- se escribe la respuesta -->
                        <textarea class="textarea--comentario" id="TextoRespuesta_<?php echo $Row['ID_Comentario'];?>" onfocus = "Llamar_VerificarSuscripcion('<?php echo $Datos['detalleNoticia'][0]['ID_Noticia']?>','responder',',<?php echo $Row['ID_Comentario'];?>')"></textarea>

                        <!-- se muestra la respuesesta junto al usuario la fecha y la hora -->
                        <p id="insertaRespuesta_<?php echo $Row['ID_Comentario'];?>"></p>
                        
                        <!-- BOTON ENVIAR -->
                        <?php
                        if(isset($_SESSION['ID_Suscriptor'])){   ?>
                            <label class="detalle_cont--edicion detalle_cont--label Default_pointer" id="labelEnviar_<?php echo $Row['ID_Comentario'];?>" onclick="Llamar_InsertarRespuesta('<?php echo $Row['ID_Comentario']?>','TextoRespuesta_<?php echo $Row['ID_Comentario'];?>','labelEnviar_<?php echo $Row['ID_Comentario'];?>','insertaRespuesta_<?php echo $Row['ID_Comentario'];?>','<?php echo $Datos['detalleNoticia'][0]['ID_Noticia']?>')">Enviar</label>

                            <div class="comentario--informacion">
                                <label class="comentario--fecha"><?php echo $Datos['nombre']?></label>
                                <label class="comentario--fecha"><?php echo $Datos['apellido']?></label>&nbsp&nbsp&nbsp
                                <!-- <label class="comentario--fecha"><?php echo $Datos['']?></label>&nbsp&nbsp&nbsp<label class="comentario--fecha"><?php echo $Datos['horaComentario']?></label> -->
                            </div> 
                            <?php
                        }   ?>
                    </div>                    

                    <!-- BOTONES DE ELIMINAR - RESPONDER -->
                    <?php
                    if($Row['ID_Suscriptor'] == $Datos['id_suscriptor']){   ?>
                        <div> 
                            <label class="detalle_cont--edicion Default_pointer" onclick="EliminarComentario('<?php echo $Row['ID_Comentario'];?>')">ELiminar</label>
                            <!-- <label class="detalle_cont--edicion Default_pointer">Actualizar</label> -->
                        </div>
                        <?php
                    }
                    else{   ?>
                        <label class="detalle_cont--edicion Default_pointer" id="botonRespuesta_<?php echo $Row['ID_Comentario'];?>" onclick="mostrar_DivRespuesta('Respuesta_<?php echo $Row['ID_Comentario'];?>','botonRespuesta_<?php echo $Row['ID_Comentario'];?>')">Responder</label>
                        <?php
                    }   ?>
                </div>
                
                <!-- Se cargan las respuestas a los comentarios existentes en BD -->
                <div class="">
                    <?php
                    foreach($Datos['respuestas'] as $Row_2)   : 
                        if($Row['ID_Comentario'] == $Row_2['ID_Comentario']){  ?>
                            <div class="cont_respuesta--BD" id="<?php echo $Row_2['ID_Comentario'];?>">
                                <p class="detalle_cont--p--comentario" readonly><?php echo $Row_2['respuesta']?></p>
                                <div class="comentario--informacion">
                                    <label class="comentario--fecha"><?php echo $Row_2['nombreSuscriptor']?></label>
                                    <label class="comentario--fecha"><?php echo $Row_2['apellidoSuscriptor']?></label>&nbsp&nbsp&nbsp
                                    <label class="comentario--fecha"><?php echo $Row_2['fecha_Respuesta']?></label>&nbsp&nbsp&nbsp<label class="comentario--fecha"><?php echo $Row_2['hora_Respuesta']?></label>
                                </div>               

                                <!-- BOTON DE ELIMINAR RESPUESTA -->
                                <?php
                                // if($Row_2['ID_Suscriptor'] == $Datos['id_suscriptor']){   ?>
                                    <!-- <div> 
                                        <label class="detalle_cont--edicion Default_pointer" onclick="EliminarRespuesta('<?php echo $Row_2['ID_Respuesta'];?>')">ELiminar</label>
                                    </div> -->
                                    <?php
                                // } ?>
                            </div>
                            <?php
                        }
                    endforeach;
                    ?>      
                </div> 
                <?php
            endforeach;
            ?>      
        </div>   
    </div>
        </div>
    </div>     
</div>  

<script src="<?php echo RUTA_URL.'/public/javascript/funcionesVarias.js?v='. rand();?>"></script>
<script src="<?php echo RUTA_URL.'/public/javascript/A_Denuncia.js?v=' . rand();?>"></script>