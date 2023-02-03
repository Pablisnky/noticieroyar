<div class="cont_portada" id="Cont_Portada" style="background-color:">
    <?php
    $Iterador = 1;
    foreach($Datos['descripcion'] as $Key) :  ?>
        <div class="cont_portada--noticia contenedor_tarjeta">
            <div class="tarjeta" id="Tarjeta_<?php echo $Iterador?>">

                <!-- PARTE FRONTAL DE TARJETA -->
                <div class="borde_1 adelante" id="adelante_<?php echo $Iterador?>">
                    <!-- IMAGEN PRINCIPAL-->
                    <?php 
                    foreach($Datos['imagenesDenunciaPrincipal'] as $Key_1) :  
                        if($Key['ID_Denuncia'] == $Key_1['ID_Denuncia']){   ?>
                            <div class="cont_portada--imagen Default_pointer">
                            <figure>
                                <img class="imagen--portada efectoBrillo" alt="Fotografia Principal" src="<?php echo RUTA_URL?>/public/images/denuncias/<?php echo $Key_1['nombre_imgDenuncia'];?>"/>
                            <figure>
                            </div>
                            <?php
                        }
                    endforeach; ?>
                    
                    <!-- IMAGENES DENUNCIA EN MINIATURAS -->
                    <div style="display: flex; justify-content: center;"> 
                        <?php            
                        foreach($Datos['imagenesDenunciaSecundaria'] as $Row_7) :
                            if($Key['ID_Denuncia'] == $Row_7['ID_Denuncia']){ ?>
                                <div style="margin-top: 1%">    
                                    <figure>
                                        <img class="cont_detalle--imagenMiniatura borde_1" alt="Foto no disponible" src="<?php echo RUTA_URL?>/public/images/denuncias/<?php echo $Row_7['nombre_imgDenuncia'];?>" onclick="Llamar_VerMiniatura('<?php echo $Row_7['ID_imagDenuncia']?>')"/>
                                    </figure>
                                </div> 
                                <?php
                            }
                        endforeach; 
                        ?>
                    </div> 
                    
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
                                   
                    <!-- <small>En curso</small><small>Solucionado</small> -->
                                   
                    <!-- DIAS Y COMENTARIOS -->
                    <div class="denuncias--footer">
                        <div class="denuncias--detalles" style="display: flex">
                            <div>
                                <p>Solucionado</p>
                                <?php 
                                if($Key['solucionado'] == 1){    ?>
                                    <span class="material-icons-outlined">done</span>
                                    <?php
                                }   
                                else{   ?>
                                    <span class="material-icons-outlined">close</span>
                                    <?php
                                }   ?>

                            </div>
                            <div>
                                <p class="cont_portada_informacion--span">4 comentarios</p>  
                                <span class="Default_pointer material-icons-outlined ">switch_left</span>
                            </div>
                            <div>
                                <?php 
                                foreach($Datos['diasDenuncia'] as $Row_4) :
                                    if($Key['ID_Denuncia'] == $Row_4['ID_Denuncia']){  
                                        if($Row_4['dias'] == 0){  ?>            
                                            <p>Desde</p>                            
                                            <p class="denuncia--dias">Hoy</p>
                                            <?php
                                        }
                                        else if($Row_4['dias'] == 1){   ?>
                                            <p>Hace</p>
                                            <p class="denuncia--dias"><?php echo $Row_4['dias'];?> dia</p>
                                            <?php
                                        }
                                        else{   ?>
                                            <p>Hace</p>
                                            <p class="denuncia--dias"><?php echo $Row_4['dias'];?> dias</p>
                                            <?php
                                        }
                                    }
                                endforeach;     ?>
                            </div>
                        </div>
                    </div>
                </div>

                
                <!-- PARTE POSTERIOR DE TARJETA -->
                <div class="atras borde_1" id="atras_<?php echo $Iterador?>">                       

                    <!-- BOTON DE GIRO 180! -->
                    <span class="Cerrar_JS Default_pointer cont_portada_giro cont_portada_giro--atras material-icons-outlined">switch_right</span>

                </div>
            </div>
        </div>     
              
        <?php
        $Iterador++;
    endforeach;     ?>
</div>  

<script src="<?php echo RUTA_URL.'/public/javascript/funcionesVarias.js?v='. rand();?>"></script>
<!-- <script src="<?php echo RUTA_URL.'/public/javascript/E_Inicio.js?v=' . rand();?>"></script> -->
<script src="<?php echo RUTA_URL.'/public/javascript/A_Denuncia.js?v=' . rand();?>"></script>