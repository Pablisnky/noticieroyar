<?php
    session_start();
    
    class Contraloria_C extends Controlador{
        
        public function __construct(){           
            $this->ConsultaContraloria_M = $this->modelo("Contraloria_M");
        }

        public function index(){            
            //Se CONSULTA la cantidad de denuncias realizadas el día de hoy
            $Denuncias = $this->ConsultaContraloria_M->consultarDenunciaDiaria();

            // echo '<pre>';
            // print_r($Denuncias);
            // echo '</pre>';
            // exit;

            foreach($Denuncias as $arr) :
                $Num_Deuncias = $arr['Total'];
            endforeach;
            
            $this->vista("header/header_noticia");
            $this->vista("view/contraloria_V", $Num_Deuncias);
        }
        
        //Verifica que el usuario haya hecho login para poder reportar una denuncia
        public function VerificaLogin(){
            //Sesion creada en Login_C sino existe se muestra el formulario para logearse
            if(!isset($_SESSION['ID_Suscriptor'])){ 

                header('Location:'. RUTA_URL . '/Login_C/index/NoAplica,denuncia');                
                // terminamos inmediatamente la ejecución del script, evitando que se envíe más salida al cliente.
                die(); 
            }    
            else{
                $Datos=[
                    'id_noticia' => 'NoAplica',
                    'id_comentario' => 'NoAplica',
                    'bandera' => 'denuncia'
                ];

                // echo "<pre>";
                // print_r($Datos);
                // echo "</pre>";          
                // exit();
                
                //carga la vista login_V en formulario login
                $this->vista("header/header_noticia");
                $this->vista("view/login_V", $Datos);
            }
        }

        //Metodo cargado desde header_V - inicio_V
        public function denuncias(){
            $this->vista("header/header_noticia");
            $this->vista("view/agregarDenuncia_V");
        }
        
        //Metodo cargado desde agregarDenuncias_V.php
        public function recibeDenunciaAgregada(){
            $Descripcion = $_POST['descripcion'];
            $Ubicacion = $_POST['ubicacion'];
            $Municipio = $_POST['municipio'];	
            $UsuarioSeguimineto = !empty($_POST["usuarioSeguimineto"]) ? $_POST["usuarioSeguimineto"]: 0;

            // echo "Descripcion : " . $Descripcion . '<br>';
            // echo "Ubicacion : " . $Ubicacion . '<br>';
            // echo "Municipio : " . $Municipio . '<br>';
            // echo "UsuarioSeguimineto : " . $UsuarioSeguimineto . '<br>';
            // exit;

            //Se INSERTA la denuncia y se retorna el ID de la inserción 
            //$_SESSION["ID_Suscriptor"] sesion creada en Login_C/ValidarSesion
            $ID_Denuncia = $this->ConsultaContraloria_M->InsertarDenuncia($_SESSION["ID_Suscriptor"], $Descripcion, $Ubicacion, $Municipio);

            // echo '<pre>';
            // print_r($ID_Denuncia);
            // echo '</pre>';
            // exit;

            // INSERTAR IMAGEN PRINCIPAL DENUNCIA
            //Si existe imagenDenunciaPrincipal y tiene un tamaño correcto se procede a recibirla y guardar en BD
            if($_FILES['imagenDenunciaPrincipal']["name"] != ""){
                $Nombre_imagenDenunciaPrincipal = $_FILES['imagenDenunciaPrincipal']['name'];
                $Tipo_imagenDenunciaPrincipal = $_FILES['imagenDenunciaPrincipal']['type'];
                $Tamanio_imagenDenunciaPrincipal = $_FILES['imagenDenunciaPrincipal']['size'];
                // echo "Nombre_imagen : " . $Nombre_imagenDenunciaPrincipal . '<br>';
                // echo "Tipo_imagen : " . $Tipo_imagenDenunciaPrincipal . '<br>';
                // echo "Tamanio_imagen : " . $Tamanio_imagenDenunciaPrincipal . '<br>';
                // exit;

                //Usar en remoto
                $Directorio = $_SERVER['DOCUMENT_ROOT'] . '/public/images/denuncias/';
                
                // usar en local
                // $Directorio = $_SERVER['DOCUMENT_ROOT'] . '/proyectos/NoticieroYaracuy/public/images/denuncias/';
                
                //Se mueve la imagen desde el directorio temporal a la ruta indicada anteriormente utilizando la función move_uploaded_files
                move_uploaded_file($_FILES['imagenDenunciaPrincipal']['tmp_name'], $Directorio.$Nombre_imagenDenunciaPrincipal);

                $ImagenPrincipal = 1;

                //Se INSERTA la imagen principal de la noticia
                try{
                    $this->ConsultaContraloria_M->InsertarImagenlDenuncia($ID_Denuncia, $Nombre_imagenDenunciaPrincipal, $Tipo_imagenDenunciaPrincipal, $Tamanio_imagenDenunciaPrincipal,$ImagenPrincipal);
                }
                catch(PDOException $exepcion){
                    $this->error = $exepcion->getMessage();
                    echo 'Error al conectarse con BD: ' . $this->error;
                }
            }

            //INSERTAR IMAGENES SECUNDARIAS
            if($_FILES['imagenesDenunciaSecundaria']['name'][0] != ''){
                $Cantidad = count($_FILES['imagenesDenunciaSecundaria']['name']);
                for($i = 0; $i < $Cantidad; $i++){
                    //nombre original del fichero en la máquina cliente.
                    $Nombre_imagenSecundaria = $_FILES['imagenesDenunciaSecundaria']['name'][$i];
                    $Ruta_Temporal_imagenSecundaria = $_FILES['imagenesDenunciaSecundaria']['tmp_name'][$i];
                    $tipo_imagenSecundaria = $_FILES['imagenesDenunciaSecundaria']['type'][$i];
                    $tamanio_imagenSecundaria = $_FILES['imagenesDenunciaSecundaria']['size'][$i];
                    // echo "Nombre_imagen : " . $Nombre_imagenSecundaria . '<br>';
                    // echo "Tipo_imagen : " .  $Ruta_Temporal_imagenSecundaria . '<br>';
                    // echo "Tamanio_imagen : " .  $tipo_imagenSecundaria . '<br>';
                    // echo "Tamanio_imagen : " .  $tamanio_imagenSecundaria . '<br>';
                    // exit;
                    
                    //Usar en remoto
                    $directorio_3 = $_SERVER['DOCUMENT_ROOT'] . '/public/images/denuncias/';

                    //usar en local
                    // $directorio_3 = $_SERVER['DOCUMENT_ROOT'] . '/proyectos/NoticieroYaracuy/public/images/denuncias/';

                    //Subimos el fichero al servidor
                    move_uploaded_file($Ruta_Temporal_imagenSecundaria, $directorio_3.$_FILES['imagenesDenunciaSecundaria']['name'][$i]);

                    $ImagenPrincipal = 0;

                    //Se INSERTAN las imagenes secundarias de la noticia
                    $this->ConsultaContraloria_M->InsertarImagenlDenuncia($ID_Denuncia, $Nombre_imagenSecundaria, $tipo_imagenSecundaria, $tamanio_imagenSecundaria, $ImagenPrincipal);
                }
            }

			header("Location:" . RUTA_URL . "/Contraloria_C/verDenuncias");
			die();
        }

        public function verDenuncias(){
            //Se CONSULTA las denuncias realizadas 
            $Denuncias = $this->ConsultaContraloria_M->consultarDenuncia();
            
            //Se CONSULTA la imagen principal de denuncias realizadas             
            $DenunciasImagenesPricipales = $this->ConsultaContraloria_M->consultarDenunciaImagenes();
            
            //Se CONSULTA la cantidad de imagenes secundarias en cada denuncia realizada            
            $DenunciasImagenesSecundarias = $this->ConsultaContraloria_M->consultarDenunciaCantidadImagenes();
            
            // CONSULTA cuantos ias lleva una denuncia
            $diasDenunciaActiva = $this->ConsultaContraloria_M->diasDenunciaActiva();
            
            // CONSULTA el suscriptor que realizo una denuncia
            $DenunciaSuscriptor = $this->ConsultaContraloria_M->denunciaSuscriptor();

            //Se CONSULTA los videos de denuncias realizadas 
            // $DenunciasVideo = $this->ConsultaContraloria_M->consultarDenunciaVideo();
            
            //Se CONSULTA los comentarios de denuncias realizadas 
            // $DenunciasComentarios = $this->ConsultaContraloria_M->consultarDenunciaCOmentarios();

            $Datos = [
                'descripcion' => $Denuncias, //ID_Denuncia, ID_Suscriptor, descripcionDenuncia, ubicacionDenuncia, solucionado,municipioDenuncia, fecha_denuncia
                'imagenesDenunciaPrincipal' => $DenunciasImagenesPricipales, //ID_Denuncia, ID_imagDenuncia, nombre_imgDenuncia, ImagenPrincipalDenuncia
                'imagenesDenunciaSecundaria' => $DenunciasImagenesSecundarias, //cantidad
                'diasDenuncia' => $diasDenunciaActiva, //ID_Denuncia, dias
                'denunciaSuscriptor' => $DenunciaSuscriptor //ID_Suscriptor, nombreSuscriptor, apellidoSuscriptor
            ];
            
            // echo '<pre>';
            // print_r($Datos);
            // echo '</pre>';
            // exit;
            
            $this->vista("header/header_noticia");
            $this->vista("view/denuncias_V", $Datos);
        }

        public function detalleDenuncia($ID_Denuncia){
            //Se CONSULTA los detalles de una denuncia especifica
            $Denuncia = $this->ConsultaContraloria_M->consultarDetalleDenuncia($ID_Denuncia);
            
            //Se CONSULTA la imagene principal de una denuncia especifica
            $DenunciaImagenPrncipal = $this->ConsultaContraloria_M->consultarDenunciaImagenPrincipal($ID_Denuncia);

            //Se CONSULTA las imagenes secundarias de una denuncia especifica
            $DenunciaImagenesSecundarias = $this->ConsultaContraloria_M->consultarDenunciaImagenesSecundarias($ID_Denuncia);
            
            // CONSULTA cuantos dias lleva una denuncia especifica
            $diasDenunciaActiva = $this->ConsultaContraloria_M->diasDenunciaActivaEspecifica($ID_Denuncia);

            // CONSULTA el suscriptor que realizo una denuncia
            $DenunciaSuscriptor = $this->ConsultaContraloria_M->denunciaSuscriptorEspecifica($ID_Denuncia);

            $Datos = [
                'descripcion' => $Denuncia, //ID_Denuncia, descripcionDenuncia, ubicacionDenuncia, solucionado,municipioDenuncia, fecha_denuncia
                'imagenDenunciaPrincipal' => $DenunciaImagenPrncipal, //ID_Denuncia, nombre_imgDenuncia
                'imagenesDenunciaSecundaria' => $DenunciaImagenesSecundarias, //ID_imagDenuncia, nombre_imgDenuncia
                'diasDenuncia' => $diasDenunciaActiva, //ID_Denuncia, dias
                'denunciaSuscriptor' => $DenunciaSuscriptor //ID_Suscriptor, nombreSuscriptor, apellidoSuscriptor
            ];
            
            // echo '<pre>';
            // print_r($Datos);
            // echo '</pre>';
            // exit;
            
            $this->vista("header/header_SoloEstilos");
            $this->vista("view/detalleDenuncia_V", $Datos);
        }
        
        // muestra la imagen seleccionada en la miniatura de una denuncia
        public function muestraImagenSeleccionada($ID_ImagenMiniatura){
            //Se CONSULTA la imagen que se solicito en detalle
             $DetalleImagen = $this->ConsultaContraloria_M->consultarDetalleImagen($ID_ImagenMiniatura);
           
            $Datos = [
                'ImagenSeleccionada' => $DetalleImagen, //nombre_imgDenuncia
            ];

            // echo "<pre>";
            // print_r($Datos);
            // echo "</pre>";          
            // exit();
            
            //No se cargan los estilos porque es una llamada Ajax
            $this->vista("view/ajax/ImagenDenunciaSeleccionada_V", $Datos ); 
        }
    }