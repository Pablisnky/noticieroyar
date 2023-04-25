<section class="section_9" id="Section_3"> 
        
    <header>
        <div class="cont_clasificados">    
            <div class="cont_clasificados--item-4">
                <h1 class="h1_1"><?php echo str_replace("_", " ", $Datos['tiendasCategorias'][0]['categoria'])?></h1> 
            </div>
        </div>
    </header>
    <!-- <h3 class="contenedor_13--clasificados h3_1 bandaAlerta">Periodo de prueba (simulación)</h3> -->
    
    <div class="cont_catalogosCateg"> 
        <?php   
        foreach($Datos['tiendasCategorias'] as $row) :
            $Categoria = $row['categoria']; ?>  
            
            <div class="cont_catalogosCateg--item"> 

                <!-- IMAGEN -->
                <div class="">
                    <?php
                    if($row['nombreImgCatalogo'] == ''){   ?>
                        <figure>  
                            <a href="<?php echo RUTA_URL . '/Catalogos_C/index/' . $row['ID_Suscriptor'] . ',' , $row['pseudonimoSuscripto']?>" rel="noopener noreferrer" target="_blank"><img class="cont_catalogosCateg_imgDefault" id="blah" alt="Fotografia del producto" src="<?php echo RUTA_URL?>/public/images/clasificados/tienda.png"/></a>
                        </figure>
                        <?php
                    }
                    else{   ?>
                        <a href="<?php echo RUTA_URL . '/Catalogos_C/index/' . $row['ID_Suscriptor'] . ',' , $row['pseudonimoSuscripto']?>" rel="noopener noreferrer" target="_blank"><img class="cont_catalogosCateg_img" alt="Portada de catalogo" src="<?php echo RUTA_URL?>/public/images/clasificados/<?php echo $row['ID_Suscriptor'];?>/<?php echo $row['nombreImgCatalogo'];?>"/></a>
                        <?php
                    }   ?>
                </div>     
              
                <!-- VEDEDOR -->
                <div class="">                                         
                    <span class="cont_catalogosCateg_tienda"><?php echo $row['pseudonimoSuscripto'];?></span> 
                </div>
            </div>
            <?php   
        endforeach;   ?>                    
    </div>
    
    <!-- BOTONES DEL PANEL FRONTAL (solo en dispositivos moviles)-->	
    <div class="cont_portada--botones">                
        <div>
            <label class="boton boton--corto"><a class="Default_font--white boton_a" href="<?php echo RUTA_URL . '/Categoria_C/';?>" rel="noopener noreferrer">Categorias</a></label> 
        </div>        
        <div>
            <label class="boton boton--corto"><a class="Default_font--white boton_a" href="<?php echo RUTA_URL . '/Login_C/index/SinID_Noticia,SinBandera';?>" rel="noopener noreferrer">Publicar</a></label> 
        </div>        
    </div>
</section>

</body>

<script src="<?php echo RUTA_URL . '/public/javascript/funcionesVarias.js?v='. rand();?>"></script>
<!-- <script src="<?php //echo RUTA_URL . '/public/javascript/E_Clasificados.js?v='. rand();?>"></script> -->
<!-- <script src="<?php //echo RUTA_URL . '/public/javascript/A_Clasificados.js?v='. rand();?>"></script> -->

</html>