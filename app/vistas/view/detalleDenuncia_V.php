  <!-- MEMBRETE FIJO -->
<div class="detalle_cont--divFijo">
    <a class="detalle_cont--membrete" href="<?php echo RUTA_URL . '/Contraloria_C/verDenuncias';?>">www.NoticieroYaracuy.com</a> 
    <p class="cont_detalleDenuncia--titulo">Contraloría social</p>

    <!-- ICONO CERRAR -->
    <img class="cont_detalleDenuncia--cerrar Default_pointer" style="" id="CerrarVentana" src="<?php echo RUTA_URL . '/public/iconos/cerrar/outline_cancel_black_24dp.png'?>"/>
</div>

<div class="cont_detalleDenuncia--flex">  
    <div class="cont_detalleDenuncia--imagen">
        <!-- IMAGEN PRINCIPAL-->
        <figure id="Contenedor_Imagen">                    
            <img class="cont_detalle--imagen" alt="Fotografia Principal" src="<?php echo RUTA_URL?>/public/images/denuncias/<?php echo $Datos['imagenDenunciaPrincipal']['nombre_imgDenuncia'];?>"/>
        </figure>
        
        <!-- IMAGENES SECUNDARIAS EN MINIATURAS -->  
        <div style="margin-top: 1%; display: flex; justify-content: center;">  
            <?php              
            foreach($Datos['imagenesDenunciaSecundaria'] as $key) :   ?>
                    <figure>
                        <img class="cont_detalle--imagenMiniatura borde_1" alt="Foto no disponible" src="<?php echo RUTA_URL?>/images/denuncias/<?php echo $key['nombre_imgDenuncia'];?>" onclick="Llamar_VerMiniatura('<?php echo $key['ID_imagDenuncia']?>')"/>
                    </figure>
                    <?php
            endforeach; ?>
        </div>
    </div>
                        
    <div class="cont_detalleDenuncia--contenido">
        <!-- DESCRIPCION -->
        <div class="">                   
            <h2 class="detalle_cont--titulo"><?php echo $Datos['descripcion']['descripcionDenuncia'];?></h2>
        </div>
        
        <!-- UBICACION -->
        <div class="detalle_cont--resumen">                   
            <p class=""><?php echo $Datos['descripcion']['ubicacionDenuncia'];?></p>
        </div>

        <hr class="detalle_cont--hr">

        <!-- SUSCRIPTOR Y DIAS-->
        <div class="detalle_cont--resumen">
            <p style="font-weight:bold">Reportado por: </p>
            <small><?php echo $Datos['denunciaSuscriptor']['nombreSuscriptor'];?>&nbsp<?php echo $Datos['denunciaSuscriptor']['apellidoSuscriptor'];?>&nbsp  
                <?php
                if($Datos['diasDenuncia']['dias'] == 0){  ?>            
                    <small>hoy</small>             
                    <?php
                }
                else if($Datos['diasDenuncia']['dias'] == 1){   ?>
                    <small>Hace 1 dia</small>
                    <?php
                }
                else{   ?>
                    <small>hace <?php echo $Datos['diasDenuncia']['dias'];?> dias</small>
                    <?php
                }   ?>
            </small>
        </div>

        <!-- MUNICIPIO, FECHA --> 
        <div class="detalle_cont--resumen">                   
            <small><?php echo $Datos['descripcion']['municipioDenuncia'];?>&nbsp&nbsp&nbsp</small><small><?php echo $Datos['descripcion']['fecha_denuncia'];?></small>
        </div>       
    
        <!-- COMPARTIR REDES SOCIALES -->
        <div class="detalle_cont--redesSociales">
            <div class="detalle_cont--red">
                <a href="https://www.facebook.com/sharer/sharer.php?u=<?php echo RUTA_URL;?>/Contraloria_C/detalleDenuncia/<?php echo $Datos['descripcion']['ID_Denuncia'];?>&text=Compartir%20Facebook" target="_blank"><img class="detalle_cont--redesSociales-facebook" alt="facebook" src="<?php echo RUTA_URL?>/public/images/facebook.png"/></a>
            </div>
            <div class="detalle_cont--red">
                <a href="https://twitter.com/intent/tweet?url=<?php echo RUTA_URL;?>/Contraloria_C/detalleDenuncia/<?php echo $Datos['descripcion']['ID_Denuncia'];?>&text=COmpartir%20Twiter" target="_blank"><img class="detalle_cont--redesSociales-twitter" alt="twitter" src="<?php echo RUTA_URL?>/public/images/twitter.png"/></a>
            </div>          
            <div class="whatsapp detalle_cont--red">
                <a href="whatsapp://send?text=<?php echo $Datos['descripcion']['descripcionDenuncia']?>...<?php echo RUTA_URL?>/Contraloria_C/detalleDenuncia/<?php echo $Datos['descripcion']['ID_Denuncia'];?>" data-action="share/whatsapp/share"><img class="detalle_cont--redesSociales-Whatsapp" alt="Whatsapp" src="<?php echo RUTA_URL?>/public/images/Whatsapp.png"/></a>
            </div> 
        </div>     
    </div>
</div>   

<!-- <script src="<?php //echo RUTA_URL.'/public/javascript/funcionesVarias.js?v='. rand();?>"></script> -->
<script src="<?php echo RUTA_URL.'/public/javascript/E_DetalleDenuncia.js?v=' . rand();?>"></script>
<script src="<?php echo RUTA_URL.'/public/javascript/A_DetalleDenuncia.js?v=' . rand();?>"></script>