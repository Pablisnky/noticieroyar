<?php    
    class Panel_Denuncias_C extends Controlador{
        private $Consulta_PanelDenuncia_M;
        
        public function __construct(){       
            session_start();
                
            $this->Consulta_PanelDenuncia_M = $this->modelo("Panel_Denuncia_M");
        }

        // Muestra el panel de todas las denuncias realiadas por un usuario
        public function index($ID_Suscriptor){            

            //se consultan las denuncias realizadas por un suscriptor
            $DenunciasSuscriptor = $this->Consulta_PanelDenuncia_M->consultarDenuncias($ID_Suscriptor);
            
            //se consultan las imagenes de las denuncias realizadas por un suscriptor
            $DenunciasImagenesSuscriptor = $this->Consulta_PanelDenuncia_M->consultarImagenePrincipalDenuncias($ID_Suscriptor);
            
            $Datos = [
                'denuncias' => $DenunciasSuscriptor, 
                'denunciasImagenes' => $DenunciasImagenesSuscriptor 
            ];

            // echo "<pre>";
            // print_r($Datos);
            // echo "</pre>";
            // exit();
            
            $this->vista("header/header_suscriptor");
            $this->vista("suscriptores/suscrip_denuncias_V", $Datos);

        }
        
        //Da la cantidad de denuncias que ha realizado un suscriptor especifico
        public function denunciasSuscriptor($ID_Suscriptor){
            
            //se consultan los anuncios clasificados de un suscriptor
            $DenunciasSuscriptor = $this->Consulta_PanelDenuncia_M->consultarCantidadDenuncias($ID_Suscriptor);
            
            // echo "<pre>";
            // print_r($ClasificadosSuscriptor);
            // echo "</pre>";
            // exit();

            return $DenunciasSuscriptor;
        }
        
        //MUestra el formulario de denuncias
        public function denuncias(){
            $this->vista("header/header_suscriptor");
            $this->vista("suscriptores/suscrip_agregarDenuncia_V");
        }
        
        public function verDenuncias(){
            //Se CONSULTA las denuncias realizadas 
            $Denuncias = $this->Consulta_PanelDenuncia_M->consultarDenuncia();
            
            //Se CONSULTA la imagen principal de denuncias realizadas             
            $DenunciasImagenesPricipales = $this->Consulta_PanelDenuncia_M->consultarDenunciaImagenes();
            
            //Se CONSULTA la cantidad de imagenes secundarias en cada denuncia realizada            
            $DenunciasImagenesSecundarias = $this->Consulta_PanelDenuncia_M->consultarDenunciaCantidadImagenes();
            
            // CONSULTA cuantos ias lleva una denuncia
            $diasDenunciaActiva = $this->Consulta_PanelDenuncia_M->diasDenunciaActiva();
            
            // CONSULTA el suscriptor que realizo una denuncia
            $DenunciaSuscriptor = $this->Consulta_PanelDenuncia_M->denunciaSuscriptor();

            //Se CONSULTA los videos de denuncias realizadas 
            // $DenunciasVideo = $this->Consulta_PanelDenuncia_M->consultarDenunciaVideo();
            
            //Se CONSULTA los comentarios de denuncias realizadas 
            // $DenunciasComentarios = $this->Consulta_PanelDenuncia_M->consultarDenunciaCOmentarios();

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
            $Denuncia = $this->Consulta_PanelDenuncia_M->consultarDetalleDenuncia($ID_Denuncia);
            
            //Se CONSULTA la imagene principal de una denuncia especifica
            $DenunciaImagenPrncipal = $this->Consulta_PanelDenuncia_M->consultarDenunciaImagenPrincipal($ID_Denuncia);

            //Se CONSULTA las imagenes secundarias de una denuncia especifica
            $DenunciaImagenesSecundarias = $this->Consulta_PanelDenuncia_M->consultarDenunciaImagenesSecundarias($ID_Denuncia);
            
            // CONSULTA cuantos dias lleva una denuncia especifica
            $diasDenunciaActiva = $this->Consulta_PanelDenuncia_M->diasDenunciaActivaEspecifica($ID_Denuncia);

            // CONSULTA el suscriptor que realizo una denuncia
            $DenunciaSuscriptor = $this->Consulta_PanelDenuncia_M->denunciaSuscriptorEspecifica($ID_Denuncia);

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
            
            $this->vista("header/header_SinMembrete");
            $this->vista("view/detalleDenuncia_V", $Datos);
        }
        
        // muestra formulario para actualizar una denuncia especifica
        public function actualizarDenuncia($ID_Denuncia){
            
            //CONSULTA la informacion de la denuncia determinada
            $InformacionDenuncia = $this->Consulta_PanelDenuncia_M->consultarDescripcionDen($ID_Denuncia);

            //CONSULTAN la imagen principal de la denuncia
            $ImagenPrinDenuncia = $this->Consulta_PanelDenuncia_M->consultarDenunciaImagenPrincipal($ID_Denuncia);
            
            //CONSULTAN las imagenes secundarias de la denuncia
            $ImagenSecDenuncia = $this->Consulta_PanelDenuncia_M->consultarDenunciaImagenesSecundarias($ID_Denuncia);

            $Datos = [
                'ID_Suscriptor' => $_SESSION['ID_Suscriptor'],
                'informacionDenuncia' => $InformacionDenuncia, 
                'imagenPrin' => $ImagenPrinDenuncia, 
                'imagenSec' => $ImagenSecDenuncia,      
            ];

            // echo '<pre>';
            // print_r($Datos);
            // echo '</pre>';
            // exit();

            $this->vista('header/header_suscriptor'); 
            $this->vista('suscriptores/suscrip_editar_denuncia_V', $Datos);
        } 
        
        //
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
            $ID_Denuncia = $this->Consulta_PanelDenuncia_M->InsertarDenuncia($_SESSION["ID_Suscriptor"], $Descripcion, $Ubicacion, $Municipio);

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
                    $this->Consulta_PanelDenuncia_M->InsertarImagenlDenuncia($ID_Denuncia, $Nombre_imagenDenunciaPrincipal, $Tipo_imagenDenunciaPrincipal, $Tamanio_imagenDenunciaPrincipal,$ImagenPrincipal);
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
                    $this->Consulta_PanelDenuncia_M->InsertarImagenlDenuncia($ID_Denuncia, $Nombre_imagenSecundaria, $tipo_imagenSecundaria, $tamanio_imagenSecundaria, $ImagenPrincipal);
                }

                //Se consulta el correo a donde llegara la notificación de nueva denuncia
                $CorreoAdmin = $this->Consulta_PanelDenuncia_M->ConsultaCorreoAdministrador();       
                // echo $CorreoAdmin['correoAdmin'];
                // exit();
                
                //Se envia al correo la notificación de nueva denuncia introducida
                $email_subject = 'Nueva denuncia de usuario'; 
                $email_to = $CorreoAdmin['correoAdmin']; 
                $headers = 'From: NoticieroYaracuy<administrador@noticieroyaracuy.com>';
                $email_message = $Descripcion . '; ' . $Ubicacion . '; ' . $Municipio . '; ';
                
                mail($email_to, $email_subject, $email_message, $headers); 
            }

			header("Location:" . RUTA_URL . "/Contraloria_C/verDenuncias");
			die();
        }
        
        //recibe formulario que actualiza una denuncia
        public function recibeAtualizarDenuncia(){
            //Se reciben todos los campos del formulario, se verifica que son enviados por POST y que no estan vacios
            if($_SERVER['REQUEST_METHOD'] == 'POST'&& !empty($_POST['producto']) && !empty($_POST['descripcion']) && !empty($_POST['precioBolivar']) && (!empty($_POST['precioDolar']) || $_POST['precioDolar'] == 0)){

                //Recibe datos del producto a actualizar
                $RecibeProducto = [
                    'condicion' => !empty($_POST['grupo']) ? $_POST['grupo'] : 'NoAsignado',
                    'ID_Producto' => $_POST['id_producto'],
                    'ID_Opcion' => $_POST['id_opcion'],
                    'Producto' => $_POST['producto'],
                    'Descripcion' => $_POST['descripcion'],
                    // 'Descripcion' => preg_replace('[\n|\r|\n\r|\]','',$_POST, "descripcion", ), //evita los saltos de lineas realizados por el usuario al separar parrafos
                    'PrecioBs' => $_POST["precioBolivar"],
                    'PrecioDolar' => $_POST["precioDolar"],
                    'Cantidad' => empty($_POST['uni_existencia']) ? 0 : $_POST['uni_existencia'],
                    'ID_Suscriptor' => $_POST["id_suscriptor"],
                    'ID_Seccion' => $_POST["id_seccion"] 
                ];
                // echo '<pre>';
                // print_r($RecibeProducto);
                // echo '</pre>';
                // exit;
            }
            else{
                echo 'Llene todos los campos obligatorios' . '<br>';
                echo '<a href="javascript: history.go(-1)">Regresar</a>';
                exit();
            }

            require(RUTA_APP . '/helpers/Comprimir_Imagen.php');
            $this->Comprimir = new Comprimir_Imagen();

            //IMAGEN PRINCIPAL
            // ********************************************************
            // Si se selecionó alguna nueva imagen
            if(!empty($_FILES['imagenPrinci_Denuncia']["name"]) != ''){
                $nombre_imgProductoActualizar = $_FILES['imagenPrinci_Denuncia']['name'];
                $tipo_imgProductoActualizar = $_FILES['imagenPrinci_Denuncia']['type'];
                $tamanio_imgProductoActualizar = $_FILES['imagenPrinci_Denuncia']['size'];
                $Temporal_imgProductoActualizar = $_FILES['imagenPrinci_Denuncia']['tmp_name'];

                // echo "Nombre de la imagen = " . $nombre_imgProducto . "<br>";
                // echo "Tipo de archivo = " . $tipo .  "<br>";
                // echo "Tamaño = " . $tamanio . "<br>";
                // //se muestra el directorio temporal donde se guarda el archivo
                // echo $_FILES['imagen']['tmp_name'];
                // exit;
                    
                //Quitar de la cadena del nombre de la imagen todo lo que no sean números, letras o puntos
                $nombre_imgProductoActualizar = preg_replace('([^A-Za-z0-9.])', '', $nombre_imgProductoActualizar);

                // Se coloca nuumero randon al principio del nombrde de la imagen para evitar que existan imagenes duplicadas
                $nombre_imgProductoActualizar = mt_rand() . '_' . $nombre_imgProductoActualizar;

                // ACTUALIZA IMAGEN PRINCIPAL DE NOTICIA EN SERVIDOR
                // se comprime y se inserta el archivo en el directorio de servidor 
                $Bandera = 'imagenProducto';
                $this->Comprimir->index($Bandera, $nombre_imgProductoActualizar, $tipo_imgProductoActualizar, $tamanio_imgProductoActualizar, $Temporal_imgProductoActualizar);

                //Se ACTUALIZA la fotografia principal del producto
                $this->Consulta_PanelDenuncia_M->actualizarImagenPrincipalProducto($RecibeProducto['ID_Producto'], $nombre_imgProductoActualizar, $tipo_imgProductoActualizar, $tamanio_imgProductoActualizar);
            }
            
            //ACTUALIZAR IMAGENES SECUNDARIAS PRODUCTO
            if($_FILES['imagenSecundariiaProdActualizar']['name'][0] != ''){
                $Cantidad = count($_FILES['imagenSecundariiaProdActualizar']['name']);
                for($i = 0; $i < $Cantidad; $i++){
                    //nombre original del fichero en la máquina cliente.
                    $Nombre_imagenSecundaria = $_FILES['imagenSecundariiaProdActualizar']['name'][$i];
                    $Ruta_Temporal_imagenSecundaria = $_FILES['imagenSecundariiaProdActualizar']['tmp_name'][$i];
                    $tipo_imagenSecundaria = $_FILES['imagenSecundariiaProdActualizar']['type'][$i];
                    $tamanio_imagenSecundaria = $_FILES['imagenSecundariiaProdActualizar']['size'][$i];
                    // echo "Nombre_imagen : " . $Nombre_imagenSecundaria . '<br>';
                    // echo "Tipo_imagen : " .  $Ruta_Temporal_imagenSecundaria . '<br>';
                    // echo "Tamanio_imagen : " .  $tipo_imagenSecundaria . '<br>';
                    // echo "Tamanio_imagen : " .  $tamanio_imagenSecundaria . '<br>';
                    // echo '<br>';
                    // exit;
                    
                    //Quitar de la cadena del nombre de la imagen todo lo que no sean números, letras o puntos
                    $Nombre_imagenSecundaria = preg_replace('([^A-Za-z0-9.])', '', $Nombre_imagenSecundaria);

                    // Se coloca nuumero randon al principio del nombrde de la imagen para evitar que existan imagenes duplicadas
                    $Nombre_imagenSecundaria = mt_rand() . '_' . $Nombre_imagenSecundaria;

                    // ACTUALIZA IMAGEN SECUNDARIA DE PRODUCTO EN SERVIDOR
                    // se comprime y se inserta el archivo en el directorio de servidor 
                    $Bandera = 'imagenSecundariiaProdActualizar';
                    $this->Comprimir->index($Bandera, $Nombre_imagenSecundaria, $tipo_imagenSecundaria,$tamanio_imagenSecundaria, $Ruta_Temporal_imagenSecundaria);	
                    
                    //Se INSERTAN las fotografias secundarias del producto en BD
                    $this->Consulta_PanelDenuncia_M->insertaImagenSecundariaProducto($RecibeProducto['ID_Producto'], $Nombre_imagenSecundaria, $tipo_imagenSecundaria, $tamanio_imagenSecundaria);
                }
            }
        
            // ********************************************************
            //Estas sentencias de actualización deben realizarce por medio de transsacciones

            $this->Consulta_PanelDenuncia_M->actualizarOpcion($RecibeProducto);
            $this->Consulta_PanelDenuncia_M->actualizarProducto($RecibeProducto);
            
            //ACTUALIZA la dependencia transitiva entre el producto y la seccions a la que pertenece
            $this->Consulta_PanelDenuncia_M->actualizarDT_SecPro($RecibeProducto);

            $this->Productos($RecibeProducto['ID_Suscriptor']);
        }
    }