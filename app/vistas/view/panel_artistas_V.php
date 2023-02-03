<!-- MENU LATERAL -->
<?php require(RUTA_APP . '/vistas/view/PanelAdministrador_V.php');?>

<div style="margin-left: 20%;">
    <fieldset class="fieldset_1" id="Rowcipales"> 
        <a href="<?php echo RUTA_URL?>/Panel_C/agregar_artista" rel="noopener noreferrer"><span class="material-icons-outlined cont_modal--agregar Default_pointer" id="Cerrar--modal">add_circle_outline</span></a>
        
        <legend class="legend_1">Artista y artesanos</legend>
        <?php
        $Iterador = 0;
        foreach($Datos['artistas'] as $Row) : ?>
            <div style="display: flex; margin-bottom: 5%;" id="<?php echo $Row['ID_Artista'];?>">                
                <!-- IMAGEN ARTISTA -->
                <div class="cont_panel__agenda--imagen">       
                    <figure>
                        <img class="cont_panel--imagen" name="imagenPrincipal" alt="Fotografia Principal" src="<?php echo RUTA_URL . '/public/images/galeria/' . $Datos['artistas'][$Iterador]['ID_Artista'] . '_' . $Datos['artistas'][$Iterador]['nombreArtista'] . '_' . $Datos['artistas'][$Iterador]['apellidoArtista']. '/perfil/' . $Row['imagenArtista'];?>"/> 
                    </figure>
                </div>
                <div>                            
                    <!-- NOMBRE ARTISTA -->
                    <label class="cont_panel--label">Artista:</label>
                    <label><?php echo $Row['nombreArtista'] . ' ' . $Row['apellidoArtista'];?></label>
                    <br>
                    
                    <!-- CATEGORIA ARTISTA -->
                    <label class="cont_panel--label">Categoria:</label>
                    <label><?php echo $Row['catgeoriaArtista'];?></label>
                    
                    <!-- MUNICIPIO ARTISTA -->
                    <label class="cont_panel--label">Municipio:</label>
                    <label><?php echo $Row['municipioArtista'];?></label>

                    <div style="width: 100%;">
                        <!-- ACTUALIZAR ARTISTA -->
                        <a href="<?php echo RUTA_URL?>/Panel_C/actualizar_artista/<?php echo $Row['ID_Artista'];?>" rel="noopener noreferrer">Actualizar</a>

                        <!-- AGREGAR OBRA -->
                        <!-- <a href="<?php echo RUTA_URL?>/Panel_C/actualizar_artista/<?php echo $Row['ID_Artista'];?>" rel="noopener noreferrer">Agregar obra</a> -->
                        
                        <!-- ELIMINAR ARTISTA -->
                        <label class="Default_pointer" style="color: blue; margin-left: 50px" onclick="EliminarArtista('<?php echo $Row['ID_Artista'];?>')">Eliminar</label>
                    </div>
                </div> 
            </div>
            <?php
            $Iterador ++;
        endforeach  ?>     
    </fieldset>
</div>

<script src="<?php echo RUTA_URL.'/public/javascript/E_PanelArtista.js?v=' . rand();?>"></script>
<script src="<?php echo RUTA_URL.'/public/javascript/A_PanelArtista.js?v=' . rand();?>"></script>

<!-- FOOTER -->
<?php //require(RUTA_APP . '/vistas/footer/footer.php');?>