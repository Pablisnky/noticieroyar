    <!-- MENU LATERAL -->
    <?php require(RUTA_APP . '/vistas/view/PanelAdministrador_V.php');?>
   
    <div style="margin-left:20%; padding-bottom:10%">
        <!-- PAGINACION -->
        <ul class="cont_archivo--paginacion">
            <!-- BOTON RETROCEDER -->
            <!-- Si la página actual es mayor a uno, se muestra el botón para ir una página atrás -->
            <?php if ($Datos['pagina'] > 1) { ?>
                <li>
                    <a href="<?php echo RUTA_URL . '/Panel_C/Not_Generales/' . $Datos['pagina'] - 1;?>"><img class="Default_pointer" style="margin-right:20px" src="<?php echo RUTA_URL . '/public/iconos/chevronIzquierdo/outline_arrow_back_ios_new_black_24dp.png'?>"/></a>
                </li>
            <?php } ?>

            <!-- Mostramos enlaces para ir a todas las páginas. -->
            <?php for ($i = 1; $i <= $Datos['paginas']; $i++) { ?>
                <li class="<?php if ($i == $Datos['pagina']) echo "active";?>, cont_archivo--paginacion-numeros">
                    <a class="" href="<?php echo RUTA_URL . '/Panel_C/Not_Generales/' . $i;?>"><?php echo $i;?></a>
                </li>
            <?php } ?>

            <!-- BOTON AANZAR -->
            <!-- Si la página actual es menor al total de páginas, se muestra un botón para ir una página adelante -->
            <?php if ($Datos['pagina'] < $Datos['paginas']) { ?>
                <li>
                    <a href="<?php echo RUTA_URL . '/Panel_C/Not_Generales/' . $Datos['pagina'] + 1 ?>"><img class="Default_pointer" style="margin-right:20px" src="<?php echo RUTA_URL . '/public/iconos/chevronDerecha/outline_arrow_forward_ios_black_24dp.png'?>"/></a>
                </li>
            <?php } ?>
        </ul> 

        <fieldset class="fieldset_1">
            <legend class="legend_1">Noticias generales</legend>
            <?php
            foreach($Datos['noticiasGenerales'] as $Not_Gen) : ?>
                <div style="display: flex; margin-bottom: 30px;" id="<?php echo $Not_Gen['ID_Noticia'];?>">
                    <!-- IMAGN NOTICIA -->
                    <div style="width: 30%; margin-right: 1.5%;">          
                        <figure>
                            <?php
                            foreach($Datos['imagenesNoticia'] as $Row)   : 
                                if($Not_Gen['ID_Noticia'] == $Row['ID_Noticia']){  ?>
                                    <img class="cont_panel--imagen" name="imagenPrincipal" alt="Fotografia Principal" src="<?php echo RUTA_URL?>/public/images/<?php echo $Row['nombre_imagenNoticia'];?>"/> 
                                    <?php
                                }
                            endforeach; ?>
                        </figure>
                    </div>
                    <div style="width: 100%">
                        <!-- TITULO -->
                        <label class="cont_panel--label">Titulo</label>
                        <label class="cont_panel--titulo"><?php echo $Not_Gen['titulo'];?></label>
                                                
                        <!-- SECCION -->
                        <label class="cont_panel--label">Seccion</label>
                        <ul class="cont_panel--seccion--ul">
                            <?php
                            foreach($Datos['seccionessNoticiasGenerales'] as $Key)   : 
                                if($Not_Gen['ID_Noticia'] == $Key['ID_Noticia']){  ?>
                                    <li class="cont_panel--seccion--li"><?php echo $Key['seccion'];?></li>
                                    <?php
                                }
                            endforeach; ?>
                        </ul>
                                                
                        <!-- ANUNCIO -->
                        <label class="cont_panel--label">Anuncio publicitario</label>
                        <?php
                            foreach($Datos['publicidad'] as $Row_3)   : 
                                if($Not_Gen['ID_Noticia'] == $Row_3['ID_Noticia']){  ?>
                                    <label class="cont_panel--fecha"><?php echo $Row_3['razonSocial'];?></label>
                                        <?php
                                }
                            endforeach; ?>

                        <!-- FECHA -->
                        <label class="cont_panel--label">Fecha</label>
                        <label class="cont_panel--fecha"><?php echo $Not_Gen['fechaPublicacion'];?></label>

                        <!-- VISITAS -->
                        <label class="cont_panel--label">Visitas</label>
                            <?php
                            foreach($Datos['visitas'] as $Row_2)   : 
                                if($Not_Gen['ID_Noticia'] == $Row_2['ID_Noticia']){     ?>
                                    <label class="cont_panel--fecha"><?php echo $Row_2['visitas'];?></label>
                                        <?php
                                }
                            endforeach; ?>
                            
                        <!-- COMPARTIR -->     
                        <a href="https://www.facebook.com/sharer/sharer.php?u=<?php echo RUTA_URL;?>/Noticias_C/detalleNoticia/<?php echo $Not_Gen['ID_Noticia'];?>" target="_blank" rel="noopener noreferrer">Compartir</a>
                        
                        <!-- EDITAR -->
                        <a style="margin-left: 10%" href="<?php echo RUTA_URL?>/Panel_C/actualizar_noticia/<?php echo $Not_Gen['ID_Noticia'];?>" rel="noopener noreferrer">Editar</a>
                                                
                        <!-- ELIMINAR -->
                        <label style="margin-left: 50px; color: blue;" class="Default_pointer" onclick="EliminarNoticia('<?php echo $Not_Gen['ID_Noticia'];?>')">Eliminar</label>
                    </div>
                </div>
                <?php
            endforeach  ?>             
        </fieldset>
    </div>

<script src="<?php echo RUTA_URL.'/public/javascript/E_NoticiasGenerales.js?v=' . rand();?>"></script>
<script src="<?php echo RUTA_URL.'/public/javascript/A_NoticiasGenerales.js?v=' . rand();?>"></script>

<!-- FOOTER -->
<?php //require(RUTA_APP . '/vistas/footer/footer.php');?>