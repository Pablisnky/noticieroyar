<?php
    //Clase para comprimir imagenes	
    class Comprimir_Imagen{
        // private $ID_Artista;
        // private $NombreArtista;
        // private $ApellidoArtista;

        public function index($Bandera, $Nombre_Imagen, $Tipo_Imagen, $Tamanio_Imagen, $Temporal_Imagen, $ID_Artista = null, $NombreArtista = null, $ApellidoArtista = null){
            // echo $Nombre_Imagen . '<br>';
            // echo $Tipo_Imagen . '<br>';
            // echo $Tamanio_Imagen . '<br>';
            // echo $Temporal_Imagen . '<br>';
            // exit;
            if($Bandera == 'ImagenPublicidad'){ //viene de Panel_C/recibePublicidadAgregada
                // $Nombre_Imagen = $Nombre_Imagen;
                // $Tipo_Imagen = $_FILES['ImagenPublicidad']['type'];
                // $Tamanio_Imagen = $_FILES['ImagenPublicidad']['size'];
                // $Temporal_Imagen = $_FILES['ImagenPublicidad']['tmp_name'];

                // Ruta de la carpeta donde se guardarán las imagenenes de publicidad
                // Usar en remoto
                // $patch = $_SERVER['DOCUMENT_ROOT'] . '/public/images/publicidad/';
                
                // usar en local
                $patch = $_SERVER['DOCUMENT_ROOT'] . '/proyectos/NoticieroYaracuy/public/images/publicidad/';
            } 
            else if($Bandera == 'ImagenPerfilArtista'){ //viene de Panel_C/recibeArtistaAgregado
                // $Nombre_Imagen = $Nombre_Imagen;
                // $Tipo_Imagen = $_FILES['ImagenPerfilArtista']['type'];
                // $Tamanio_Imagen = $_FILES['ImagenPerfilArtista']['size'];
                // $Temporal_Imagen = $_FILES['ImagenPerfilArtista']['tmp_name'];
                
                // Ruta de la carpeta donde se guardarán las imagen de perfil del artista
                // Usar en remoto
                // $patch = $_SERVER['DOCUMENT_ROOT'] . '/public/images/galeria/'. $ID_Artista . '_' . $NombreArtista . '_' . $ApellidoArtista. '/perfil/';

                // usar en local
                $patch = $_SERVER['DOCUMENT_ROOT'] . '/proyectos/NoticieroYaracuy/public/images/galeria/' . $ID_Artista . '_' . $NombreArtista . '_' . $ApellidoArtista . '/perfil/';
            }
            else if($Bandera == 'ImagenPrincipalNoticia'){ //viene de Panel_C/recibeNotiAgregada
                // $Nombre_Imagen = $_FILES['ImagenPrincipalNoticia']['name'];
                // $Tipo_Imagen = $_FILES['ImagenPrincipalNoticia']['type'];
                // $Tamanio_Imagen = $_FILES['ImagenPrincipalNoticia']['size'];
                // $Temporal_Imagen = $_FILES['ImagenPrincipalNoticia']['tmp_name'];
                
                // Ruta de la carpeta donde se guardarán las imagen de perfil del artista
                //Usar en remoto
                // $patch = $_SERVER['DOCUMENT_ROOT'] . '/public/images/noticias/';
                
                // usar en local
                $patch = $_SERVER['DOCUMENT_ROOT'] . '/proyectos/NoticieroYaracuy/public/images/noticias/';
            }
            else if($Bandera == 'imagenProducto'){ //viene de CUentaComercial_C/recibeProductoPublicar
                // $Nombre_Imagen = $Nombre_Imagen;
                // $Tipo_Imagen = $_FILES['imagenProducto']['type'];
                // $Tamanio_Imagen = $_FILES['imagenProducto']['size'];
                // $Temporal_Imagen = $_FILES['imagenProducto']['tmp_name'];
                
                //Usar en remoto
                // $patch = $_SERVER['DOCUMENT_ROOT'] . '/public/images/clasificados/'. $_SESSION['ID_Suscriptor'] . '/productos/';

                //usar en local
                $patch = $_SERVER['DOCUMENT_ROOT'] . '/proyectos/NoticieroYaracuy/public/images/clasificados/'. $_SESSION['ID_Suscriptor'] . '/productos/';             
            }

            // echo $patch . '<br>';
            // echo $Nombre_Imagen . '<br>';
            // echo $Tipo_Imagen . '<br>';
            // exit;

            if(isset($Nombre_Imagen)){
                                
                //Parámetros optimización, resolución máxima permitida
                $max_ancho = 1280;
                $max_alto = 900;
                
                if($Tipo_Imagen == 'image/png' || $Tipo_Imagen == 'image/jpeg' || $Tipo_Imagen == 'image/gif'){
                
                    $medidasimagen= getimagesize($Temporal_Imagen);
            
                    //Si las imagenes tienen una resolución y un peso aceptable se suben tal cual
                    if($medidasimagen[0] < 1280 && $Tamanio_Imagen < 300000){

                        move_uploaded_file($Temporal_Imagen, $patch. '/' . $Nombre_Imagen);	
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
                            imagejpeg($lienzo, $patch . '/' . $Nombre_Imagen);
                        }
                        else if($Tipo_Imagen == 'image/png'){
                            imagepng($lienzo, $patch . '/' . $Nombre_Imagen);
                        }
                        else if($Tipo_Imagen=='image/gif'){
                            imagegif($lienzo, $patch . '/' . $Nombre_Imagen);
                        }

                        // echo 'fichero comprimido exitosamente';
                    }
                }
                else{
                    // echo 'fichero no soportado';
                } 
            }
        }
    }
