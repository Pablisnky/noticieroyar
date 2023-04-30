
<!-- CDN iconos de font-awesome-->
<link rel='stylesheet' type='text/css' href='https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.2/css/all.min.css'/>

<div class="contenedor_4">
    
    <a class="contenedor_6 borde_1 Default_font--black" href="<?php echo RUTA_URL . '/Suscriptor_C/categoria/Arte';?>" rel="noopener noreferrer">
        <div>
            <h2 class='h2_1'>ARTE Y LITERATURA</h2>
            <i class="fas fa-pen-nib icono_2"></i>      
            <div class="contenedor_106">
                <span class="span_21 borde_1 arte_js">
                    <?php
                        foreach($Datos['cantidadTiendasCategoria'] as $arr) :
                            if($arr['categoria'] == 'Arte'){  
                                $CantidaArte = $arr['cantidad']; 
                                echo $CantidaArte; ?>
                                <style>
                                    .arte_js{
                                        background-color: var(--Aciertos);
                                    }
                                </style>  <?php
                            }
                        endforeach; 
                        if(empty($CantidaArte)){                                     
                            echo 0;     ?>
                            <style>
                                .arte_js{         
                                    background-color: var(--Fallos);
                                }
                            </style>    <?php
                        }  
                    ?>
                </span>
            </div>     
        </div>
    </a>

    <a class="contenedor_6 borde_1 Default_font--black" href="<?php echo RUTA_URL . '/Suscriptor_C/categoria/Bodega';?>" rel="noopener noreferrer">
        <div>
            <h2 class='h2_1'>BODEGAS</h2>
            <i class="fas fa-store icono_2"></i>    
            <div class="contenedor_106">
                <span class="span_21 borde_1 bodega_js">
                    <?php
                        foreach($Datos['cantidadTiendasCategoria'] as $arr) :
                            if($arr['categoria'] == 'Bodega'){  
                                $CantidaBodega = $arr['cantidad']; 
                                echo $CantidaBodega; ?>
                                <style>
                                    .bodega_js{
                                        background-color: var(--Aciertos);
                                    }
                                </style>  <?php
                            }
                        endforeach; 
                        if(empty($CantidaBodega)){                                     
                            echo 0;     ?>
                            <style>
                                .bodega_js{
                                    background-color: var(--Fallos);
                                }
                            </style>    <?php
                        }  
                    ?>
                </span>
            </div>   
        </div>
    </a>
    
    <a class="contenedor_6 borde_1 Default_font--black" href="<?php echo RUTA_URL . '/Suscriptor_C/categoria/ComidaRapida';?>" rel="noopener noreferrer">
        <div>
            <h2 class='h2_1'>COMIDA RAPIDA</h2>
            <i class="fas fa-drumstick-bite icono_2"></i>            
            <div class="contenedor_106">
                <span class="span_21 borde_1 comida_js">
                    <?php
                        foreach($Datos['cantidadTiendasCategoria'] as $arr) :
                            if($arr['categoria'] == 'ComidaRapida'){  
                                $CantidadMascota = $arr['cantidad']; 
                                echo $CantidadMascota; ?>
                                <style>
                                    .comida_js{
                                        background-color: var(--Aciertos);
                                    }
                                </style>  <?php
                            }
                        endforeach; 
                        if(empty($CantidadMascota)){                                     
                            echo 0;     ?>
                            <style>
                                .comida_js{         
                                    background-color: var(--Fallos);
                                }
                            </style>    <?php
                        }  
                    ?>
                </span>
            </div> 
        </div> 
    </a>

    <a class="contenedor_6 borde_1 Default_font--black" href="<?php echo RUTA_URL . '/Suscriptor_C/categoria/Cosmeticos';?>" rel="noopener noreferrer">    
        <div>
            <h2 class='h2_1'>COSMETICOS</h2>  
            <i class="fas fa-female icono_2"></i>    
            <div class="contenedor_106">
                <span class="span_21 borde_1 cosmetico_js">
                    <?php
                        foreach($Datos['cantidadTiendasCategoria'] as $arr) :
                            if($arr['categoria'] == 'Cosmeticos'){  
                                $CantidadCosmetico = $arr['cantidad']; 
                                echo $CantidadCosmetico; ?>
                                <style>
                                    .cosmetico_js{
                                        background-color: var(--Aciertos);
                                    }
                                </style>  <?php
                            }
                        endforeach; 
                        if(empty($CantidadCosmetico)){                                     
                            echo 0;     ?>
                            <style>
                                .cosmetico_js{         
                                    background-color: var(--Fallos);
                                }
                            </style>    <?php
                        }  
                    ?>
                </span>
            </div>  
        </div> 
    </a>

    <a class="contenedor_6 borde_1 Default_font--black" href="<?php echo RUTA_URL . '/Suscriptor_C/categoria/Mascotas';?>" rel="noopener noreferrer">
        <div>
            <h2 class='h2_1'>MASCOTAS</h2>
            <i class="fas fa-cat icono_2"></i>                
            <div class="contenedor_106">
                <span class="span_21 borde_1 mascota_js">
                    <?php
                        foreach($Datos['cantidadTiendasCategoria'] as $arr) :
                            if($arr['categoria'] == 'Mascotas'){  
                                $CantidadMascota = $arr['cantidad']; 
                                echo $CantidadMascota; ?>
                                <style>
                                    .mascota_js {
                                        background-color: var(--Aciertos);
                                    }
                                </style>  <?php
                            }
                        endforeach; 
                        if(empty($CantidadMascota)){                                     
                            echo 0;     ?>
                            <style>
                                .mascota_js{         
                                    background-color: var(--Fallos);
                                }
                            </style>    <?php
                        }  
                    ?>
                </span>
            </div> 
        </div>
    </a>

    <a class="contenedor_6 borde_1 Default_font--black" href="<?php echo RUTA_URL . '/Suscriptor_C/categoria/RepuestoAutomotriz';?>" rel="noopener noreferrer">
        <div>
            <h2 class='h2_1'>REPUESTO AUTOMOTRIZ</h2>
            <i class="fas fa-car-crash icono_2"></i>                
            <div class="contenedor_106">
                <span class="span_21 borde_1 repuesto_js">
                    <?php
                        foreach($Datos['cantidadTiendasCategoria'] as $arr) :
                            if($arr['categoria'] == 'RepuestoAutomotriz'){  
                                $CantidadRepuesto = $arr['cantidad']; 
                                echo $CantidadRepuesto; ?>
                                <style>
                                    .repuesto_js {
                                        background-color: var(--Aciertos);
                                    }
                                </style>  <?php
                            }
                        endforeach; 
                        if(empty($CantidadRepuesto)){                                     
                            echo 0;     ?>
                            <style>
                                .repuesto_js{         
                                    background-color: var(--Fallos);
                                }
                            </style>    <?php
                        }  
                    ?>
                </span>
            </div> 
        </div>
    </a>

    <a class="contenedor_6 borde_1 Default_font--black" href="<?php echo RUTA_URL . '/Suscriptor_C/categoria/MaterialMedicoQuirurgico';?>" rel="noopener noreferrer">
        <div>
            <h2 class='h2_1'>MATERIAL MÉDICO</h2>
            <i class="fas fa-hospital icono_2"></i>              
            <div class="contenedor_106">
                <span class="span_21 borde_1 materialQuirurgco_js">
                    <?php
                        foreach($Datos['cantidadTiendasCategoria'] as $arr) :
                            if($arr['categoria'] == 'MaterialMedicoQuirurgico'){  
                                $CantidadMateerialQuirurgico = $arr['cantidad']; 
                                echo $CantidadMateerialQuirurgico; ?>
                                <style>
                                    .materialQuirurgco_js {
                                        background-color: var(--Aciertos);
                                    }
                                </style>  <?php
                            }
                        endforeach; 
                        if(empty($CantidadMateerialQuirurgico)){                                     
                            echo 0;     ?>
                            <style>
                                .materialQuirurgco_js{
                                    background-color: var(--Fallos);
                                }
                            </style>    <?php
                        }  
                    ?>
                </span>
            </div>     
        </div>
    </a>

    <a class="contenedor_6 borde_1 Default_font--black" href="<?php echo RUTA_URL . '/Suscriptor_C/categoria/Caramelos';?>" rel="noopener noreferrer">    
        <div>
            <h2 class='h2_1'>CHOCOLATES Y CARAMELOS</h2>
            <i class="fas fa-candy-cane icono_2"></i>         
            <div class="contenedor_106">
                <span class="span_21 borde_1 caramelos_js">
                    <?php
                        foreach($Datos['cantidadTiendasCategoria'] as $arr) :
                            if($arr['categoria'] == 'Caramelos'){  
                                $CantidadCaramelos = $arr['cantidad']; 
                                echo $CantidadCaramelos; ?>
                                <style>
                                    .caramelos_js {
                                        background-color: var(--Aciertos);
                                    }
                                </style>  <?php
                            }
                        endforeach; 
                        if(empty($CantidadCaramelos)){                                     
                            echo 0;     ?>
                            <style>
                                .caramelos_js{
                                    background-color: var(--Fallos);
                                }
                            </style>    <?php
                        }  
                    ?>
                </span>
            </div>     
        </div>
    </a>

    <a class="contenedor_6 borde_1 Default_font--black" href="<?php echo RUTA_URL . '/Suscriptor_C/categoria/Merceria';?>" rel="noopener noreferrer">    
        <div>
            <h2 class='h2_1'>MERCERÍA Y TALABARTERÍA</h2>
            <i class="fas fa-hat-cowboy-side icono_2"></i>      
            <div class="contenedor_106">
                <span class="span_21 borde_1 merceria_js">
                    <?php
                        foreach($Datos['cantidadTiendasCategoria'] as $arr) :
                            if($arr['categoria'] == 'Merceria'){  
                                $CantidadMerceria = $arr['cantidad']; 
                                echo $CantidadMerceria; ?>
                                <style>
                                    .merceria_js {
                                        background-color: var(--Aciertos);
                                    }
                                </style>  <?php
                            }
                        endforeach; 
                        if(empty($CantidadMerceria)){                                     
                            echo 0;     ?>
                            <style>
                                .merceria_js{
                                    background-color: var(--Fallos);
                                }
                            </style>    <?php
                        }  
                    ?>
                </span>
            </div> 
        </div>
    </a>

    <a class="contenedor_6 borde_1 Default_font--black" href="<?php echo RUTA_URL . '/Suscriptor_C/categoria/Frutas';?>" rel="noopener noreferrer">
        <div>
            <h2 class='h2_1'>FRUTAS Y VERDURAS</h2>
            <i class="fas fa-carrot icono_2"></i>    
            <div class="contenedor_106">
                <span class="span_21 borde_1 frutas_js">
                    <?php
                        foreach($Datos['cantidadTiendasCategoria'] as $arr) :
                            if($arr['categoria'] == 'Frutas'){  
                                $CantidadFrutas = $arr['cantidad']; 
                                echo $CantidadFrutas; ?>
                                <style>
                                    .frutas_js {
                                        background-color: var(--Aciertos);
                                    }
                                </style>  <?php
                            }
                        endforeach; 
                        if(empty($CantidadFrutas)){                                     
                            echo 0;     ?>
                            <style>
                                .frutas_js{
                                    background-color: var(--Fallos);
                                }
                            </style>    <?php
                        }  
                    ?>
                </span>
            </div>     
        </div>
    </a>

    <a class="contenedor_6 borde_1 Default_font--black" href="<?php echo RUTA_URL . '/Suscriptor_C/categoria/Minimarket';?>" rel="noopener noreferrer">
        <div>
            <h2 class='h2_1'>MINIMARKET</h2>
            <i class="fas fa-shopping-basket icono_2"></i>    
            <div class="contenedor_106">
                <span class="span_21 borde_1 minimarket_js">
                    <?php
                        foreach($Datos['cantidadTiendasCategoria'] as $arr) :
                            if($arr['categoria'] == 'Minimarket'){  
                                $CantidadMinimarket = $arr['cantidad']; 
                                echo $CantidadMinimarket; ?>
                                <style>
                                    .minimarket_js {
                                        background-color: var(--Aciertos);
                                    }
                                </style>  <?php
                            }
                        endforeach; 
                        if(empty($CantidadMinimarket)){                                     
                            echo 0;     ?>
                            <style>
                                .minimarket_js{
                                    background-color: var(--Fallos);
                                }
                            </style>    <?php
                        }  
                    ?>
                </span>
            </div>  
        </div>
    </a>

    <a class="contenedor_6 borde_1 Default_font--black" href="<?php echo RUTA_URL . '/Suscriptor_C/categoria/Ropa';?>" rel="noopener noreferrer">
        <div>
            <h2 class='h2_1'>ROPA Y ZAPATO</h2>
            <i class="fas fa-tshirt icono_2"></i>    
            <div class="contenedor_106">
                <span class="span_21 borde_1 ropa_js">
                    <?php
                        foreach($Datos['cantidadTiendasCategoria'] as $arr) :
                            if($arr['categoria'] == 'Ropa'){  
                                $CantidadRopa = $arr['cantidad']; 
                                echo $CantidadRopa; ?>
                                <style>
                                    .ropa_js {
                                        background-color: var(--Aciertos);
                                    }
                                </style>  <?php
                            }
                        endforeach; 
                        if(empty($CantidadRopa)){                                     
                            echo 0;     ?>
                            <style>
                                .ropa_js{
                                    background-color: var(--Fallos);
                                }
                            </style>    <?php
                        }  
                    ?>
                </span>
            </div>  
        </div>
    </a>

    <a class="contenedor_6 borde_1 Default_font--black" href="<?php echo RUTA_URL . '/Suscriptor_C/categoria/Farmacia';?>" rel="noopener noreferrer">
        <div>
            <h2 class='h2_1'>FARMACIA Y SALUD</h2>
            <i class="fas fa-medkit icono_2"></i>    
            <div class="contenedor_106">
                <span class="span_21 borde_1 farmacia_js">
                    <?php
                        foreach($Datos['cantidadTiendasCategoria'] as $arr) :
                            if($arr['categoria'] == 'Farmacia'){  
                                $CantidadFarmacia = $arr['cantidad']; 
                                echo $CantidadFarmacia; ?>
                                <style>
                                    .farmacia_js {
                                        background-color: var(--Aciertos);
                                    }
                                </style>  <?php
                            }
                        endforeach; 
                        if(empty($CantidadFarmacia)){                                     
                            echo 0;     ?>
                            <style>
                                .farmacia_js{
                                    background-color: var(--Fallos);
                                }
                            </style>    <?php
                        }  
                    ?>
                </span>
            </div>       
        </div>
    </a>

    <a class="contenedor_6 borde_1 Default_font--black" href="<?php echo RUTA_URL . '/Suscriptor_C/categoria/Ferreteria';?>" rel="noopener noreferrer">
        <div>
            <h2 class='h2_1'>FERRETRÍA Y HOGAR</h2>
            <i class="fas fa-screwdriver icono_2"></i>    
            <div class="contenedor_106">
                <span class="span_21 borde_1 ferreteria_js">
                    <?php
                        foreach($Datos['cantidadTiendasCategoria'] as $arr) :
                            if($arr['categoria'] == 'Ferreteria'){  
                                $CantidadFerreteria = $arr['cantidad']; 
                                echo $CantidadFerreteria; ?>
                                <style>
                                    .ferreteria_js {
                                        background-color: var(--Aciertos);
                                    }
                                </style>  <?php
                            }
                        endforeach; 
                        if(empty($CantidadFerreteria)){                                     
                            echo 0;     ?>
                            <style>
                                .ferreteria_js{
                                    background-color: var(--Fallos);
                                }
                            </style>    <?php
                        }  
                    ?>
                </span>
            </div>     
        </div>
    </a>

    <a class="contenedor_6 borde_1 Default_font--black" href="<?php echo RUTA_URL . '/Suscriptor_C/categoria/Panaderia';?>" rel="noopener noreferrer">
        <div>
            <h2 class='h2_1'>PANADERÍA Y PASTELERÍA</h2>
            <i class="fas fa-birthday-cake icono_2"></i>    
            <div class="contenedor_106">
                <span class="span_21 borde_1 panaderia_js">
                    <?php
                        foreach($Datos['cantidadTiendasCategoria'] as $arr) :
                            if($arr['categoria'] == 'Panaderia'){  
                                $CantidadPanaderia = $arr['cantidad']; 
                                echo $CantidadPanaderia; ?>
                                <style>
                                    .panaderia_js {
                                        background-color: var(--Aciertos);
                                    }
                                </style>  <?php
                            }
                        endforeach; 
                        if(empty($CantidadPanaderia)){                                     
                            echo 0;     ?>
                            <style>
                                .panaderia_js{
                                    background-color: var(--Fallos);
                                }
                            </style>    <?php
                        }  
                    ?>
                </span>
            </div>       
        </div> 
    </a>

    <a class="contenedor_6 borde_1 Default_font--black" href="<?php echo RUTA_URL . '/Suscriptor_C/categoria/Licoreria';?>" rel="noopener noreferrer">
        <div>
            <h2 class='h2_1'>LICORES</h2>
            <i class="fas fa-wine-bottle icono_2"></i>    
            <div class="contenedor_106">
                <span class="span_21 borde_1 licores_js">
                    <?php
                        foreach($Datos['cantidadTiendasCategoria'] as $arr) :
                            if($arr['categoria'] == 'Licoreria'){  
                                $CantidadLicoreria = $arr['cantidad']; 
                                echo $CantidadLicoreria; ?>
                                <style>
                                    .licores_js {
                                        background-color: var(--Aciertos);
                                    }
                                </style>  <?php
                            }
                        endforeach; 
                        if(empty($CantidadLicoreria)){                                     
                            echo 0;     ?>
                            <style>
                                .licores_js{
                                    background-color: var(--Fallos);
                                }
                            </style>    <?php
                        }  
                    ?>
                </span>
            </div>          
        </div>
    </a>

    <a class="contenedor_6 borde_1 Default_font--black" href="<?php echo RUTA_URL . '/Suscriptor_C/categoria/JoyasRelojeria';?>" rel="noopener noreferrer">
        <div>
            <h2 class='h2_1'>JOYAS Y RELOJERÍA</h2>
            <i class="fas fa-gem icono_2"></i>    
            <div class="contenedor_106">
                <span class="span_21 borde_1 joyas_js">
                    <?php
                        foreach($Datos['cantidadTiendasCategoria'] as $arr) :
                            if($arr['categoria'] == 'JoyasRelojeria'){  
                                $CantidadJoyas = $arr['cantidad']; 
                                echo $CantidadJoyas; ?>
                                <style>
                                    .joyas_js {
                                        background-color: var(--Aciertos);
                                    }
                                </style>  <?php
                            }
                        endforeach; 
                        if(empty($CantidadJoyas)){                                     
                            echo 0;     ?>
                            <style>
                                .joyas_js{
                                    background-color: var(--Fallos);
                                }
                            </style>    <?php
                        }  
                    ?>
                </span>
            </div>       
        </div>
    </a>

    <a class="contenedor_6 borde_1 Default_font--black" href="<?php echo RUTA_URL . '/Suscriptor_C/categoria/Deportes';?>" rel="noopener noreferrer">
        <div>
            <h2 class='h2_1'>DEPORTES</h2>
            <i class="fas fa-biking icono_2"></i>    
            <div class="contenedor_106">
                <span class="span_21 borde_1 deporte_js">
                    <?php
                        foreach($Datos['cantidadTiendasCategoria'] as $arr) :
                            if($arr['categoria'] == 'Deportes'){  
                                $CantidadDeportes = $arr['cantidad']; 
                                echo $CantidadDeportes; ?>
                                <style>
                                    .deporte_js {
                                        background-color: var(--Aciertos);
                                    }
                                </style>  <?php
                            }
                        endforeach; 
                        if(empty($CantidadDeportes)){                                     
                            echo 0;     ?>
                            <style>
                                .deporte_js{
                                    background-color: var(--Fallos);
                                }
                            </style>    <?php
                        }  
                    ?>
                </span>
            </div>    
        </div>
    </a>

    <a class="contenedor_6 borde_1 Default_font--black" href="<?php echo RUTA_URL . '/Suscriptor_C/categoria/Floristeria';?>" rel="noopener noreferrer">
        <div>
            <h2 class='h2_1'>FLORISTERÍA Y DECORACIÓN</h2>
            <i class="fas fa-leaf icono_2"></i>    
            <div class="contenedor_106">
                <span class="span_21 borde_1 floristeria_js">
                    <?php
                        foreach($Datos['cantidadTiendasCategoria'] as $arr) :
                            if($arr['categoria'] == 'Floristeria'){  
                                $CantidadFloristeria = $arr['cantidad']; 
                                echo $CantidadFloristeria; ?>
                                <style>
                                    .floristeria_js {
                                        background-color: var(--Aciertos);
                                    }
                                </style>  <?php
                            }
                        endforeach; 
                        if(empty($CantidadFloristeria)){                                     
                            echo 0;     ?>
                            <style>
                                .floristeria_js{
                                    background-color: var(--Fallos);
                                }
                            </style>    <?php
                        }  
                    ?>
                </span>
            </div>         
        </div>
    </a>

    <a class="contenedor_6 borde_1 Default_font--black" href="<?php echo RUTA_URL . '/Suscriptor_C/categoria/Construccion';?>" rel="noopener noreferrer">
        <div>
            <h2 class='h2_1'>CONSTRUCCIÓN</h2>
            <i class="fas fa-hard-hat icono_2"></i>    
            <div class="contenedor_106">
                <span class="span_21 borde_1 construccion_js">
                    <?php
                        foreach($Datos['cantidadTiendasCategoria'] as $arr) :
                            if($arr['categoria'] == 'Construccion'){  
                                $CantidadConstruccion = $arr['cantidad']; 
                                echo $CantidadConstruccion; ?>
                                <style>
                                    .construccion_js {
                                        background-color: var(--Aciertos);
                                    }
                                </style>  <?php
                            }
                        endforeach; 
                        if(empty($CantidadConstruccion)){                                     
                            echo 0;     ?>
                            <style>
                                .construccion_js{
                                    background-color: var(--Fallos);
                                }
                            </style>    <?php
                        }  
                    ?>
                </span>
            </div>   
        </div>
    </a>

    <a class="contenedor_6 borde_1 Default_font--black" href="<?php echo RUTA_URL . '/Suscriptor_C/categoria/Telefonos';?>" rel="noopener noreferrer">
        <div>
            <h2 class='h2_1'>TELEFONOS Y COMPUTADORAS</h2>
            <i class="fas fa-mobile-alt icono_2"></i>    
            <div class="contenedor_106">
                <span class="span_21 borde_1 telefono_js">
                    <?php
                        foreach($Datos['cantidadTiendasCategoria'] as $arr) :
                            if($arr['categoria'] == 'Telefonos'){  
                                $CantidadTelefonos = $arr['cantidad']; 
                                echo $CantidadTelefonos; ?>
                                <style>
                                    .telefono_js {
                                        background-color: var(--Aciertos);
                                    }
                                </style>  <?php
                            }
                        endforeach; 
                        if(empty($CantidadTelefonos)){                                     
                            echo 0;     ?>
                            <style>
                                .telefono_js{
                                    background-color: var(--Fallos);
                                }
                            </style>    <?php
                        }  
                    ?>
                </span>
            </div>  
        </div>
    </a>

    <a class="contenedor_6 borde_1 Default_font--black" href="<?php echo RUTA_URL . '/Suscriptor_C/categoria/Papeleria';?>" rel="noopener noreferrer">
        <div>
            <h2 class='h2_1'>PAPELERÍA Y OFICINA</h2>
            <i class="fas fa-paperclip icono_2"></i>    
            <div class="contenedor_106">
                <span class="span_21 borde_1 papeleria_js">
                    <?php
                        foreach($Datos['cantidadTiendasCategoria'] as $arr) :
                            if($arr['categoria'] == 'Papeleria'){  
                                $CantidadPapeleria = $arr['cantidad']; 
                                echo $CantidadPapeleria; ?>
                                <style>
                                    .papeleria_js {
                                        background-color: var(--Aciertos);
                                    }
                                </style>  <?php
                            }
                        endforeach; 
                        if(empty($CantidadPapeleria)){                                     
                            echo 0;     ?>
                            <style>
                                .papeleria_js{
                                    background-color: var(--Fallos);
                                }
                            </style>    <?php
                        }  
                    ?>
                </span>
            </div>   
        </div>
    </a>

    <a class="contenedor_6 borde_1 Default_font--black" href="<?php echo RUTA_URL . '/Suscriptor_C/categoria/Juguetes';?>" rel="noopener noreferrer">
        <div>
            <h2 class='h2_1'>JUGUETES</h2>
            <i class="fas fa-gamepad icono_2"></i>    
            <div class="contenedor_106">
                <span class="span_21 borde_1 juguetes_js">
                    <?php
                        foreach($Datos['cantidadTiendasCategoria'] as $arr) :
                            if($arr['categoria'] == 'Juguetes'){  
                                $CantidadJuguetes = $arr['cantidad']; 
                                echo $CantidadJuguetes; ?>
                                <style>
                                    .juguetes_js {
                                        background-color: var(--Aciertos);
                                    }
                                </style>  <?php
                            }
                        endforeach; 
                        if(empty($CantidadJuguetes)){                                     
                            echo 0;     ?>
                            <style>
                                .juguetes_js{
                                    background-color: var(--Fallos);
                                }
                            </style>    <?php
                        }  
                    ?>
                </span>
            </div> 
        </div>
    </a>

    <a class="contenedor_6 borde_1 Default_font--black" href="<?php echo RUTA_URL . '/Suscriptor_C/categoria/Papeleria';?>" rel="noopener noreferrer">
        <div>
            <h2 class='h2_1'>LIBRERÍAS Y MÚSICA</h2>
            <i class="fas fa-book icono_2"></i>    
            <div class="contenedor_106">
                <span class="span_21 borde_1 papeleria_js">
                    <?php
                        foreach($Datos['cantidadTiendasCategoria'] as $arr) :
                            if($arr['categoria'] == 'Papeleria'){  
                                $CantidadPapeleria = $arr['cantidad']; 
                                echo $CantidadPapeleria; ?>
                                <style>
                                    .papeleria_js {
                                        background-color: var(--Aciertos);
                                    }
                                </style>  <?php
                            }
                        endforeach; 
                        if(empty($CantidadPapeleria)){                                     
                            echo 0;     ?>
                            <style>
                                .papeleria_js{
                                    background-color: var(--Fallos);
                                }
                            </style>    <?php
                        }  
                    ?>
                </span>
            </div> 
        </div>
    </a>
</div>
    
<!-- BOTONES DEL PANEL FRONTAL (solo en dispositivos moviles)-->	
<div class="cont_boton--categoria ">                
    <div>
        <label class="boton boton--corto" style="width: 120%; margin: auto"><a class="Default_font--white boton_a" href="<?php echo RUTA_URL . '/Clasificados_C/';?>" rel="noopener noreferrer">Ver todas las categorías</a></label> 
    </div>         
</div>

<script src="<?php echo RUTA_URL . '/public/javascript/funcionesVarias.js?v='. rand();?>"></script>

</body>
</html>