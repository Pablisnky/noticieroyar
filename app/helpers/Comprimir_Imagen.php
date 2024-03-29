<?php
    //Clase para comprimir imagenes	
    class Comprimir_Imagen{
        // private $ID_Suscriptor;
        // private $NombreArtista;
        // private $ApellidoArtista;

        public function index($Bandera, $Nombre_Imagen, $Tipo_Imagen, $Tamanio_Imagen, $Temporal_Imagen, $ID_Suscriptor = null, $NombreArtista = null, $ApellidoArtista = null){
            // echo 'Bandera: ' . $Bandera . '<br>';
            // echo 'Nombre_Imagen: ' .  $Nombre_Imagen . '<br>';
            // echo 'Tipo_Imagen: ' .  $Tipo_Imagen . '<br>';
            // echo 'Tamanio_Imagen: ' .  $Tamanio_Imagen . '<br>';
            // echo 'Temporal_Imagen: ' .  $Temporal_Imagen . '<br>';
            // echo 'ID_Suscriptor: ' .  $ID_Suscriptor . '<br>';
            // echo 'NombreArtista: ' .  $NombreArtista . '<br>';
            // echo 'ApellidoArtista: ' .  $ApellidoArtista . '<br>';
            // echo '<br>';
            // exit;

            if($Bandera == 'ImagenPublicidad'){ //viene de Panel_C/recibePublicidadAgregada
                
                // Usar en remoto
                $Patch = $_SERVER['DOCUMENT_ROOT'] . '/public/images/publicidad/';
                
                // usar en local
                // $Patch = $_SERVER['DOCUMENT_ROOT'] . '/proyectos/NoticieroYaracuy/public/images/publicidad/';
            } 
            else if($Bandera == 'ImagenPerfilArtista'){ //viene de Panel_C/recibeArtistaAgregado
                
                // Usar en remoto
                $Patch = $_SERVER['DOCUMENT_ROOT'] . '/public/images/galeria/'. $ID_Suscriptor . '_' . $NombreArtista . '_' . $ApellidoArtista. '/perfil/';

                // usar en local
                // $Patch = $_SERVER['DOCUMENT_ROOT'] . '/proyectos/NoticieroYaracuy/public/images/galeria/' . $ID_Suscriptor . '_' . $NombreArtista . '_' . $ApellidoArtista . '/perfil/';
            }
            else if($Bandera == 'ImagenPrincipalNoticia'){ //viene de Panel_C/recibeNotiAgregada
                
                //Usar en remoto        
                $Patch = $_SERVER['DOCUMENT_ROOT'] . '/public/images/noticias/';
                
                // usar en local        
                // $Patch = $_SERVER['DOCUMENT_ROOT'] . '/proyectos/NoticieroYaracuy/public/images/noticias/';
            }
            else if($Bandera == 'imagenesSecUndariaNoticia'){ //viene de Panel_C/recibeNotiAgregada
                
                //Usar en remoto        
                $Patch = $_SERVER['DOCUMENT_ROOT'] . '/public/images/noticias/';
                
                // usar en local        
                // $Patch = $_SERVER['DOCUMENT_ROOT'] . '/proyectos/NoticieroYaracuy/public/images/noticias/';
            }
            else if($Bandera == 'imagenProducto'){ //viene de CuentaComercial_C/recibeProductoPublicar
                
                //Usar en remoto         
                $Patch = $_SERVER['DOCUMENT_ROOT'] . '/public/images/clasificados/'. $_SESSION['ID_Suscriptor'] . '/productos/';

                //usar en local        
                // $Patch = $_SERVER['DOCUMENT_ROOT'] . '/proyectos/NoticieroYaracuy/public/images/clasificados/'. $_SESSION['ID_Suscriptor'] . '/productos/';             
            }
            else if($Bandera == 'imagenSecundariiaProducto'){ //viene de CuentaComercial_C/recibeProductoPublicar
                
                //Usar en remoto         
                $Patch = $_SERVER['DOCUMENT_ROOT'] . '/public/images/clasificados/'. $_SESSION['ID_Suscriptor'] . '/productos/';

                // usar en local        
                // $Patch = $_SERVER['DOCUMENT_ROOT'] . '/proyectos/NoticieroYaracuy/public/images/clasificados/'. $_SESSION['ID_Suscriptor'] . '/productos/';             
            }
            else if($Bandera == 'imagenAgenda'){ //viene de CuentaComercial_C/recibeAgendaAgregada
                
                //Usar en remoto        
                $Patch = $_SERVER['DOCUMENT_ROOT'] . '/public/images/agenda/';

                //usar en local         
                // $Patch = $_SERVER['DOCUMENT_ROOT'] . '/proyectos/NoticieroYaracuy/public/images/agenda/';             
            } 
            else if($Bandera == 'imagenCatalogo'){ //viene de Suscriptor_C/actualizaNombreComercial
                
                //Usar en remoto        
                $Patch = $_SERVER['DOCUMENT_ROOT'] . '/public/images/clasificados/' . $_SESSION['ID_Suscriptor'] . '/';

                //usar en local         
                // $Patch = $_SERVER['DOCUMENT_ROOT'] . '/proyectos/NoticieroYaracuy/public/images/clasificados/' . $_SESSION['ID_Suscriptor'] . '/';             
            }
            else if($Bandera == 'imagenSecundariiaProdActualizar'){                
                //Usar en remoto        
                $Patch = $_SERVER['DOCUMENT_ROOT'] . '/public/images/clasificados/'. $_SESSION['ID_Suscriptor'] . '/productos/';

                //usar en local         
                // $Patch = $_SERVER['DOCUMENT_ROOT'] . '/proyectos/NoticieroYaracuy/public/images/clasificados/'. $_SESSION['ID_Suscriptor'] . '/productos/'; 
            }   
            else if($Bandera == 'ActualizaImagenPrincipalNoticia'){
                //Usar en remoto        
                $Patch = $_SERVER['DOCUMENT_ROOT'] . '/public/images/noticias/';

                //usar en local         
                // $Patch = $_SERVER['DOCUMENT_ROOT'] . '/proyectos/NoticieroYaracuy/public/images/noticias/';
            }
            else if($Bandera == 'imagenPortafolio'){
                //Usar en remoto        
                $Patch = $_SERVER['DOCUMENT_ROOT'] . '/public/images/galeria/' . $ID_Suscriptor . '_' . $NombreArtista . '_' . $ApellidoArtista . '/perfil/';

                //usar en local         
                // $Patch = $_SERVER['DOCUMENT_ROOT'] . '/proyectos/NoticieroYaracuy/public/images/galeria/' . $ID_Suscriptor . '_' . $NombreArtista . '_' . $ApellidoArtista . '/perfil/';
            } 
            else if($Bandera == 'imagenObra'){
                //Usar en remoto        
                $Patch = $_SERVER['DOCUMENT_ROOT'] . '/public/images/galeria/' . $ID_Suscriptor . '_' . $NombreArtista . '_' . $ApellidoArtista . '/';

                //usar en local         
                // $Patch = $_SERVER['DOCUMENT_ROOT'] . '/proyectos/NoticieroYaracuy/public/images/galeria/' . $ID_Suscriptor . '_' . $NombreArtista . '_' . $ApellidoArtista . '/';
            } 
            if(isset($Nombre_Imagen)){
                                
                //Parámetros optimización, resolución máxima permitida
                $max_ancho = 1280;
                $max_alto = 900;
                
                if($Tipo_Imagen == 'image/png' || $Tipo_Imagen == 'image/jpeg' || $Tipo_Imagen == 'image/gif'){
                
                    $medidasimagen= getimagesize($Temporal_Imagen);
            
                    //Si las imagenes tienen una resolución y un peso aceptable se suben tal cual
                    if($medidasimagen[0] < 1280 && $Tamanio_Imagen < 300000){

                        move_uploaded_file($Temporal_Imagen, $Patch . '/' . $Nombre_Imagen);	
                    }
                    else{	//Si no, se generan nuevas imagenes optimizadas	
                        //Redimensionar
                        $rtOriginal = $Temporal_Imagen;
            
                        if($Tipo_Imagen == 'image/jpeg'){
                            $original = imagecreatefromjpeg($rtOriginal);
                        }
                        else if($Tipo_Imagen =='image/png'){
                            $original = imagecreatefrompng($rtOriginal);
                        }	
                        else if($Tipo_Imagen =='image/gif'){
                            $original = imagecreatefromgif($rtOriginal);
                        }
            
                        list($ancho,$alto) = getimagesize($rtOriginal);
            
                        $x_ratio = $max_ancho / $ancho;
                        $y_ratio = $max_alto / $alto;
            
            
                        if( ($ancho <= $max_ancho) && ($alto <= $max_alto) ){
                            $ancho_final = $ancho;
                            $alto_final = $alto;
                        }
                        elseif (($x_ratio * $alto) < $max_alto){
                            $alto_final = ceil($x_ratio * $alto);
                            $ancho_final = $max_ancho;
                        }
                        else{
                            $ancho_final = ceil($y_ratio * $ancho);
                            $alto_final = $max_alto;
                        }
            
                        $lienzo = imagecreatetruecolor($ancho_final, $alto_final); 
            
                        imagecopyresampled($lienzo,$original,0,0,0,0,$ancho_final,$alto_final,$ancho,$alto);
                            
                        $cal = 8;
                        
                        if($Tipo_Imagen == 'image/jpeg'){
                            imagejpeg($lienzo, $Patch . '/' . $Nombre_Imagen);
                        }
                        else if($Tipo_Imagen == 'image/png'){
                            imagepng($lienzo, $Patch . '/' . $Nombre_Imagen);
                        }
                        else if($Tipo_Imagen=='image/gif'){
                            imagegif($lienzo, $Patch . '/' . $Nombre_Imagen);
                        }

                        // echo 'fichero comprimido exitosamente';
                        // exit;
                    }
                }
                else{
                    // echo 'fichero no soportado';
                    // exit;
                } 
            }
        }
    }
