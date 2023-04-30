<!-- MENU LATERAL -->
<?php require(RUTA_APP . '/vistas/view/PanelAdministrador_V.php');?>

<div class="cont_panel--main">
    <fieldset class="fieldset_1" id="Rowcipales"> 
        <!-- ICONO AGREGAR -->
        <a href="<?php echo RUTA_URL?>/Panel_C/agregaYaracuyEnVideo" rel="noopener noreferrer"><img class="cont_modal--agregar Default_pointer" src="<?php echo RUTA_URL . '/public/iconos/agregar/outline_add_circle_outline_black_24dp.png';?>"/></a>       
        
        <legend class="legend_1">Yaracuy en videos</legend>
        <?php
        foreach($Datos['yaracuyEnVdeo'] as $Row) : ?>
            <div class="cont_panel--agregaYaracuyEnVideo">                
                <div>
                    <div class="cont_edit">
                        <label class="Default_pointer" for="imgVideo"><img class="Default_pointer" src="<?php echo RUTA_URL . '/public/iconos/edit/outline_edit_black_24dp.png';?>"/></label>
                    </div> 
                    <video class="cont_panel--imagen" id="video-tag" controls src="<?php echo RUTA_URL?>/public/video/YaracuyEnVideo/<?php echo $Row['nombreVideo'];?>">
                        <source id = "video-source"/>
                    </video>

                    <div style="display:flex; justify-content: space-around">
                        <button style="padding:0% 3%" class="Default_ocultar" id="Reproducir" onclick="reproducir()">Reproducir</button>
                        <button style="padding:0% 3%" class="Default_ocultar" id="Pausar" onclick="pausar()">Pausar</button>
                    </div>
                </div>
                <div style="width: 100%;">                  
                    <textarea class="login_cont--input borde--input" type="text" name="descripcion"><?php echo $Row['decripcionVideo']; ?></textarea>
                    <input class="Default_ocultar" type="file" accept="video/*" name="video" id="imgVideo"/>          
                    <input class="Default_ocultar" type="text" value="<?php echo $Row['ID_YaracuyEnVideo'];?>" name="id_video"/>
                    <div style="width: 100%;">
                        <!-- COMPARTIR FACEBOOK-->             
                        <!-- <a href="https://www.facebook.com/sharer/sharer.php?u=<?php echo RUTA_URL?>/public/images/<?php echo $Row['nombre_imagenAgenda'];?>" target="_blank">Facebook</a> -->
                        
                        <!-- ACTUALIZAR -->
                        <!-- <a class="" href="<?php echo RUTA_URL?>/Panel_C/actualizar_agenda/<?php echo $Row['ID_Agenda'];?>" rel="noopener noreferrer">Actualizar</a> -->
                        
                        <!-- PUBLICIDAD -->
                        <!-- <a href="<?php //echo RUTA_URL?>/Panel_C/<?php //echo $Row['ID_Agenda'];?>" rel="noopener noreferrer">Publicidad</a> -->
                        
                        <!-- ELIMINAR -->
                        <!-- <a href="<?php echo RUTA_URL?>/Panel_C/eliminar_agenda/<?php echo $Row['ID_Agenda'];?>,<?php echo $Row['nombre_imagenAgenda'];?>" rel="noopener noreferrer">Eliminar</a> -->
                    </div>
                </div> 
            </div>
            <?php
        endforeach  ?>     
    </fieldset>
</div>

<script src="<?php echo RUTA_URL . '/public/javascript/funcionesVarias.js?v='. rand();?>"></script>

<!-- FOOTER -->
<?php //require(RUTA_APP . '/vistas/footer/footer.php');?>