<div class="cont_portada" id="Cont_Portada">
    <?php
    $Iterador = 1;
    foreach($Datos['descripcion'] as $Key) :  ?>
        <div class="cont_reportes">
            <!-- IMAGEN -->
            <?php 
            foreach($Datos['imagenesDenunciaPrincipal'] as $Key_1) :  
                if($Key['ID_Denuncia'] == $Key_1['ID_Denuncia']){   ?>
                    <div class="cont_portada--imagen Default_pointer">
                        <a href="<?php echo RUTA_URL . '/Contraloria_C/detalleDenuncia/' . $Key['ID_Denuncia'];?>" rel="noopener noreferrer" target="_blank"><img class="imagen--portada efectoBrillo" alt="Fotografia Principal" src="<?php echo RUTA_URL?>/public/images/denuncias/<?php echo $Key_1['nombre_imgDenuncia'];?>"/></a>
                    </div>
                    <?php
                }
            endforeach; ?>
                                
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
            
            <!-- USUARIO--> 
            <div class="denuncias--texto">                   
                    <?php
                foreach($Datos['denunciaSuscriptor'] as $Row_6) :
                    if($Key['ID_Suscriptor'] == $Row_6['ID_Suscriptor']){ ?>
                        <small>Reportado por: </small><small style="font-weight: bold;"><?php echo $Row_6['nombreSuscriptor'];?>&nbsp</small><small style="font-weight: bold;"><?php echo $Row_6['apellidoSuscriptor'];?></small>
                        <?php
                    }
                endforeach;     ?>
            </div>
                                                        
            <!-- LEYENDA -->
            <div class="cont_reportes--leyenda">
                                               
                <!-- SOLUCIONADO -->
                <div class="denuncias--detalles" style="display: flex">
                    <div>
                        <p class="denuncias--detalles--p">Solucionado</p>
                        <?php 
                        if($Key['solucionado'] == 1){    ?>
                            <span class="material-icons-outlined">done</span>
                            <?php
                        }   
                        else{   ?>
                            <img class="denuncias--icono" src="<?php echo RUTA_URL . '/public/iconos/cerrar/outline_cancel_black_24dp.png'?>"/>
                            <?php
                        }   ?>
                    </div>
                                                   
                    <!-- CAMARA -->
                    <div> 
                        <p class="denuncias--detalles--p">imagenes</p> 
                        <div style="display: flex; margin: auto; width: 50%; justify-content: center;">
                            <?php
                        foreach($Datos['imagenesDenunciaSecundaria'] as $Row_7) :
                            if($Key['ID_Denuncia'] == $Row_7['ID_Denuncia']){  ?>
                                <span><?php echo $Row_7['cantidad'];?>&nbsp</span>
                                <?php
                            }
                        endforeach;     ?>
                        <img style="text-align: center; display:inline; margin: auto;" src="<?php echo RUTA_URL . '/public/iconos/imagenes/outline_photo_camera_black_24dp.png'?>"/>
                    </div>
                    </div>         

                    <!-- COMENTARIOS -->
                    <div>
                        <p class="denuncias--detalles--p">comentarios</p>  
                        <div style="display: flex; margin: auto; width: 50%; justify-content: center;">
                            <span>0 </span>
                            <img style="text-align: center; display: inline; margin: auto;" src="<?php echo RUTA_URL . '/public/iconos/comentario/outline_speaker_notes_black_24dp.png'?>"/>
                        </div>
                    </div>
                                                   
                    <!-- DIAS -->
                    <div>
                        <?php 
                        foreach($Datos['diasDenuncia'] as $Row_4) :
                            if($Key['ID_Denuncia'] == $Row_4['ID_Denuncia']){  
                                if($Row_4['dias'] == 0){  ?>            
                                    <p class="denuncias--detalles--p">Desde</p>                            
                                    <p class="denuncia--dias">Hoy</p>
                                    <?php
                                }
                                else if($Row_4['dias'] == 1){   ?>
                                    <p class="denuncias--detalles--p">Hace</p>
                                    <p class="denuncia--dias"><?php echo $Row_4['dias'];?> dia</p>
                                    <?php
                                }
                                else{   ?>
                                    <p class="denuncias--detalles--p">Hace</p>
                                    <p class="denuncia--dias"><?php echo $Row_4['dias'];?> dias</p>
                                    <?php
                                }
                            }
                        endforeach;     ?>
                    </div>
                </div>
            </div>
        </div>     
              
        <?php
        $Iterador++;
    endforeach;     ?>
</div>  

<script src="<?php echo RUTA_URL.'/public/javascript/funcionesVarias.js?v='. rand();?>"></script>
<script src="<?php echo RUTA_URL.'/public/javascript/A_Denuncia.js?v=' . rand();?>"></script>