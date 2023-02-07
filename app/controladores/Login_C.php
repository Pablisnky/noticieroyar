<?php 
    declare(strict_types = 1);

    class Login_C extends Controlador{
        
        public function __construct(){  
            session_start();

            $this->ConsultaLogin_M = $this->modelo("Login_M");

            //La función ocultarErrores() se encuantra en la carpeta helpers, es accecible debido a que en iniciador.php se realizó el require respectivo
            ocultarErrores();
        }

        public function index($DatosAgrupados){
            //$DatosAgrupados contiene una cadena con el ID_Noticia y el string "SinLogin" separados por coma, se convierte en array para separar los elementos
            $DatosAgrupados = explode(',', $DatosAgrupados);
            $ID_Noticia = $DatosAgrupados[0];
            $Bandera = $DatosAgrupados[1];

            $ID_Comentario = !empty($DatosAgrupados[2]) ? $DatosAgrupados[2]: 'NoAplica';
            
            // echo "ID_Noticia =" .  $ID_Noticia ."<br>";
            // echo "Bandera =" .  $Bandera ."<br>";
            // echo "ID_Comentario =" .  $ID_Comentario ."<br>";
            // exit;


            // unset($_COOKIE ["id_usuario"]);
            // unset($_COOKIE ["clave"]);
            //Se verifica si el usuario esta memorizado en las cookie de su computadora y las compara con la BD, para recuperar sus datos y autorellenar el formulario de inicio de sesion, las cookies de registro de usuario se crearon en validarSesion.php
            if(isset($_COOKIE["id_usuario"]) AND isset($_COOKIE["clave"])){//Si la variable $_COOKIE esta establecida o creada
                // echo "Cookie afiliado =" . $_COOKIE["id_usuario"] ."<br>";
                // echo "Cookie clave =" .  $_COOKIE["clave"] ."<br>";
                
                $Cookie_usuario = $_COOKIE["id_usuario"];
                $Cookie_clave = $_COOKIE["clave"];
                            
                //Se CONSULTA el correo guardado como Cookie con el ID_Usuario como argumento, se consulta en todos los tipos de usuario que existe
                $CorreoRecord_Com = $this->ConsultaLogin_M->consultarUsuarioRecordado_Com($Cookie_usuario);
                $CorreoRecord_May = $this->ConsultaLogin_M->consultarUsuarioRecordado_May($Cookie_usuario);
                $CorreoRecord_Ven = $this->ConsultaLogin_M->consultarUsuarioRecordado_Ven($Cookie_usuario);
                $CorreoRecord_Des = $this->ConsultaLogin_M->consultarUsuarioRecordado_Des($Cookie_usuario);

                if(!empty($CorreoRecord_Com)){
                    $Correo = $CorreoRecord_Com[0]['correo_AfiCom'];
                }
                else if(!empty($CorreoRecord_May)){
                    $Correo = $CorreoRecord_May[0]['correo_AfiMay'];
                }
                else if(!empty($CorreoRecord_Ven)){
                    $Correo = $CorreoRecord_Ven[0]['correo_AfiVen'];
                }
                else if(!empty($CorreoRecord_Des)){
                    $Correo = $CorreoRecord_Des[0]['correo_AfiDes'];
                }

                $Datos=[
                    'correoRecord' => $Correo,
                    'claveRecord' => $Cookie_clave,
                    'bandera' => $Bandera
                ];

                //Se entra al formulario de sesion que esta rellenado con los datos del usuario
                $this->vista("header/header_noticia");
                $this->vista("view/login_Vrecord", $Datos);
            }
            else if($Bandera == 'SinLogin' || $Bandera == 'panelSuscriptor'){//Entra cuando viene de una noticia y desea hacer comentario o cambio de contraseña
                
                $Datos=[
                    'id_noticia' => $ID_Noticia,
                    'id_comentario' => $ID_Comentario,
                    'bandera' => $Bandera
                ];

                // echo "<pre>";
                // print_r($Datos);
                // echo "</pre>";          
                // exit();
                
                //carga la vista login_V en formulario login
                $this->vista("header/header_noticia");
                $this->vista("view/login_V", $Datos);
            }
            else if($Bandera == 'responder'){//Entra cuando viene de una noticia y desea responder un comentario existente
                
                $Datos=[
                    'id_noticia' => $ID_Noticia,
                    'id_comentario' => $ID_Comentario,
                    'bandera' => $Bandera
                ];

                // echo "<pre>";
                // print_r($Datos);
                // echo "</pre>";          
                // exit();
                
                //carga la vista login_V en formulario login
                $this->vista("header/header_noticia");
                $this->vista("view/login_V", $Datos);
            }   
            else if($Bandera == 'denuncia'){//Bamdera creada en Contraloria_C/VerificaLogin Entra cuando se desea realizar una denuncia
                
                $Datos=[
                    'id_noticia' => 'NoAPlica',
                    'id_comentario' => 'NoAPlica',
                    'bandera' => $Bandera
                ];

                // echo "<pre>";
                // print_r($Datos);
                // echo "</pre>";          
                // exit();
                
                //carga la vista login_V en formulario login
                $this->vista("header/header_noticia");
                $this->vista("view/login_V", $Datos);
            }
            else{//Enra cuando inicia sesion desde el menu hamburguesa 
                //carga la vista login_V en formulario login
                $this->vista("header/header_noticia");
                $this->vista("view/login_V");
            }
        }

        //Invocado desde login_V
        public function ValidarSesion(){

            $Recordar = isset($_POST["recordar"]);
            $No_Recordar = isset($_POST["no_recordar"]);
            $Clave = $_POST["clave_Arr"];
            $Correo = $_POST["correo_Arr"];
            $Bandera = !empty($_POST["bandera"]) ? $_POST["bandera"]: 'NoAplica';
            $ID_Noticia = !empty($_POST["id_noticia"]) ? $_POST["id_noticia"]: 'NoAplica';
            $ID_Comentario = !empty($_POST["id_comentario"]) ? $_POST["id_comentario"]: 'NoAplica';

            // echo 'Recordar: ' . $Recordar . '<br>';
            // echo 'No_Recordar: ' . $No_Recordar . '<br>';
            // echo 'Clave: ' . $Clave . '<br>';
            // echo 'Correo: ' . $Correo . '<br>';
            // echo 'Bandera: ' . $Bandera . '<br>';
            // echo 'ID_Noticia: ' . $ID_Noticia . '<br>';
            // echo 'ID_Comentario: ' . $ID_Comentario . '<br>';
            // exit;
 
            //Se CONSULTA si el correo existe como usuario suscrito
            $Suscriptor = $this->ConsultaLogin_M->consultarSuscriptores($Correo);

            // echo "<pre>";
            // print_r($Suscriptor);
            // echo "</pre>";
            // exit;

            if($Suscriptor != Array() ){//Existe como suscriptor
                $ID_Suscriptor = $Suscriptor[0]['ID_Suscriptor'];
                $CorreoBD = $Suscriptor[0]['correoSuscriptor'];
                $Nombre = $Suscriptor[0]['nombreSuscriptor'];
                $Apellido = $Suscriptor[0]['apellidoSuscriptor'];

                $_SESSION["nombreSuscriptor"] = $Nombre;
                $_SESSION["apellidoSuscriptor"] = $Apellido;

                $CuentaCom = true;
            }
            else{                        
                header('location:' . RUTA_URL . '/Login_C/loginIncorrecto');
            }
            
            //Se crean las cookies para recordar al usuario en caso de que $Recordar exista
            if($Recordar == 1){ //si pidió memorizar el usuario, se recibe desde principal.php           
                // Se introduce una cookie en el ordenador del usuario con el identificador del usuario y la cookie aleatoria porque el usuario marca la casilla de recordar
                setcookie('id_usuario', $ID_Suscriptor, time()+365*24*60*60, '/');
                setcookie('clave', $Clave, time()+365*24*60*60, '/');
            }
                // Se destruyen las cookie para dejar de recordar a usuario
            if($No_Recordar == 1){ 
                setcookie('id_usuario','',time() - 3600,'/');
                setcookie('clave','',time() - 3600,'/');
            }
                        
            //Verifica si los campos que se van a recibir estan vacios
            if(empty($_POST['correo_Arr']) || empty($_POST['clave_Arr'])){        
                echo 'Debe Llenar todos los campos vacios'. '<br>';
                echo '<a href="javascript:history.back()">Regresar</a>';
            }
            else{        
                //Se CONSULTA la contraseña enviada, que sea igual a la contraseña de la BD
                $Hash = $this->ConsultaLogin_M->consultarContrasena($ID_Suscriptor);
                
                // echo '<pre>';
                // print_r($Hash);
                // echo '</pre>';
                // exit;

                // LOGEADO
                //se descifra la contraseña con un algoritmo de desencriptado.
                if($Correo == $CorreoBD AND $Clave == password_verify($Clave, $Hash[0]['claveCifrada'])){
                    
                    //Se crea la sesion exigida en las páginas de una cuenta de suscriptores           
                    $_SESSION["ID_Suscriptor"] = $ID_Suscriptor;
                    
                    if($Bandera == 'SinLogin'){// si va a hacer un comentario y esta logeado
                        header('Location:'. RUTA_URL . '/Noticias_C/detalleNoticia/'.$ID_Noticia.',sinAnuncio,#ContedorComentario'); 
                    }
                    else if($Bandera == 'responder'){// si va a responder un comentario y esta logeado
                        header('Location:'. RUTA_URL . '/Noticias_C/detalleNoticia/'.$ID_Noticia.',sinAnuncio,#'.$ID_Comentario); 
                    }
                    else if($Bandera == 'denuncia'){// si va a realizar una denuncia
                        header('Location:'. RUTA_URL . '/Contraloria_C/denuncias'); 
                    }
                    else if($Bandera == 'panelSuscriptor'){// si va a realizar una denuncia
                    //     header('Location:'. RUTA_URL . '/Contraloria_C'); 
                    // }
                    // else{//carga el panel de suscriptores  NoAplica
                        $Datos = [                            
                            'nombre' => $Nombre,
                            'apellido' => $Apellido
                        ];

                        // echo '<pre>';
                        // print_r($Datos);
                        // echo '</pre>';
                        // exit;
                        
                        $this->vista("header/header_SoloEstilos");
                        $this->vista("suscriptores/suscrip_Inicio_V", $Datos);
                    }
                }
                else{
                    $this->vista("header/header_noticia");
                    $this->vista("modal/modal_falloLogin_V");
                }                   
            }   
        }
        
        public function RecuperarClave(){
            $Correo = $_POST['correo'];
            //echo 'Correo= ' . $Correo . '<br>';
        
            //Se genera un numero aleatorio que será el código de recuperación de contraseña
            //alimentamos el generador de aleatorios
            mt_srand (time());
            //generamos un número aleatorio
            $Aleatorio = mt_rand(100000,999999); 
                    
            //Se INSERTA el código aleatorio en la tabla "codigo-recuperacion" para asociarlo al correo del usuario
            $this->ConsultaLogin_M->insertarCodigoAleatorio($Correo, $Aleatorio);
            
            //Se envia correo al usuario informandole el código que debe insertar para verificar
            $email_to = $Correo;
            $email_subject = 'Recuperación de contraseña';  
            $email_message = 'Código de recuperación de contraseña: ' . $Aleatorio;
            $headers = 'From: NoticieroYaracuy<administrador@noticieroyaracuy.com>';
            // $headers .= '\r\n X-Mailer: PHP/' . phpversion();
        
            // @mail($email_to, $email_subject, $email_message, $headers);
            
            $Datos = [
                'correo' => $Correo,
                'bandera' => 'aleatorioinsertado'
            ];

            // echo '<pre>';
            // print_r($Datos);
            // echo '</pre>';
            // exit;

            $this->vista('header/header_SoloEstilos'); 
            $this->vista('modal/modal_recuperarCorreo_V', $Datos); 
        }

        //LLamado desde modal_recuperarCorreo_V.php
        public function recibeCodigoRecuperacion(){
            $CodigoUsuario = $_POST["ingresarCodigo"];
            $Correo= $_POST["correo"];

            // EL numero aleatorio es de tipo string se debe cambiar a entero
            // echo gettype($CodigoUsuario) . "<br>";
            settype($CodigoUsuario,"integer");
            // echo gettype($CodigoUsuario) . "<br>";
            
            //Se comprueba el código enviado por el usuario con el código que hay en la BD
            $VerificaCodigo = $this->ConsultaLogin_M->consultarCodigoAleatorio($Correo, $CodigoUsuario);

            if($VerificaCodigo == 0){//Si el codigo que envia el usuario es diferente al del sistema             
                
                $Datos = [
                    'correo' => $Correo,
                    'bandera' => 'nuevoIntento'
                ];

                $this->vista("header/header_Modal"); 
                $this->vista("modal/modal_recuperarCorreo_V", $Datos);

                // echo "<p class='Inicio_16'>Código invalido</p>";
                // echo "<a class='Inicio_16' href='javascript:history.go(-1)'>Regresar</a>";
                // exit();            
            }
            else{//Si los códigos coinciden se permite hacer el cambio de contraseña
                // echo "cambie la contraseña";

                //Se confirma en la BD que el codigo ha sido usado y verificado
                $this->ConsultaLogin_M->actualizarcodigoVerificado($CodigoUsuario);
                
                $Datos = [
                    'correo' => $Correo,
                    'bandera' => 'verificado'
                ];

                $this->vista("header/header_SoloEstilos", $Datos); 
                $this->vista("modal/modal_recuperarCorreo_V", $Datos); 
            }
        }

        public function recibeCambioClave(){
            $ClaveNueva = $_POST["clave"];
            $RepiteClaveNueva = $_POST["repiteClave"];
            $Correo = $_POST["correo"];

            // echo "Clave nueva= " . $ClaveNueva . "<br>";
            // echo "Repite clave nueva= " . $RepiteClaveNueva . "<br>";
            // echo "Correo= " . $Correo . "<br>";

            //Se verifica que las claves recibidas sean iguales
            if($ClaveNueva == $RepiteClaveNueva){
                //se cifra la contraseña con un algoritmo de encriptación
                $ClaveCifrada = password_hash($ClaveNueva, PASSWORD_DEFAULT);
                // echo "Clave cifrada= " . $ClaveCifrada . "<br>";
                // exit;
                
                //Se consulta el ID_Suscriptor correspondiente al correo 
                $ID_Suscriptor = $this->ConsultaLogin_M->consultarSuscriptor($Correo);
                // echo "<pre>";
                // print_r($ID_Suscriptor);
                // echo "</pre>";          

                // echo 'ID_Suscriptor' . $ID_Suscriptor['ID_Suscriptor'];
                // exit();

                if($ID_Suscriptor != Array()){
                    //Se actualiza en la base de datos la clave del usuario
                    $this->ConsultaLogin_M->actualizarClaveSuscriptor($ID_Suscriptor, $ClaveCifrada);

                    //Se destruyen las cookies que recuerdan la contraseña antigua, creadas en validarSesion.php
                    // echo "Cookie_usuario= " . $_COOKIE["id_usuario"] . "<br>";
                    // echo "Cookie_clave= " . $_COOKIE["clave"] . "<br>";

                    // setcookie("id_usuario",'',time()-100);
                    // setcookie("clave",'',time()-100);
                    
                    $this->vista('header/header_SoloEstilos'); 
                    $this->vista('modal/modal_recuperarCorreo_V'); 
                }
                else{
                    echo 'No exist el correo';
                    echo "<a class='Inicio_16' href='javascript:history.go(-3)'>Regresar</a>";
                    exit;
                }
            } 
            else{
                echo 'Las contraseñas no coinciden';
                echo '<br>';
                echo "<a href='javascript: history.go(-1)'>Regresar</a>";
            }
        }

        public function loginIncorrecto(){
            $this->vista("header/header_noticia");
            $this->vista("modal/modal_falloLogin_V");
        }
        
        public function suscripcion($ID_Noticia){
            
            $Datos = [
                'id_noticia' => $ID_Noticia
            ];

            // echo "<pre>";
            // print_r($Datos);
            // echo "</pre>";
            // exit;

            $this->vista("header/header_noticia");
            $this->vista("view/registro_V", $Datos );
        }

        public function recibeRegistroSuscriptor(){         
            //Se reciben todos los campos del formulario de suscripcion, desde registro_V.php se verifica que son enviados por POST y que no estan vacios
            if($_SERVER["REQUEST_METHOD"] == "POST" && !empty($_POST["nombre"]) && !empty($_POST["correo"]) && !empty($_POST["clave"]) && !empty($_POST["confirmarClave"])){               
                // $RecibeDatos = [
                //     //Recibe datos de la persona responsable
                //     'nombre' => filter_input(INPUT_POST, "nombre", FILTER_SANITIZE_STRING),
                //     'correo' => filter_input(INPUT_POST, "correo", FILTER_SANITIZE_STRING),
                //     'clave' => filter_input(INPUT_POST, "clave", FILTER_SANITIZE_STRING),
                //     'confirmarClave' => filter_input(INPUT_POST, "confirmarClave", FILTER_SANITIZE_STRING)
                // ];
                //Recibe datos de la persona responsable
                $RecibeDatos = [
                        'id_noticia' => $_POST['id_noticia'],
                        'nombre' => ucwords($_POST['nombre']),    
                        'apellido' => ucwords($_POST['apellido']),                      
                        'correo' => mb_strtolower($_POST['correo']),                       
                        'municipio' => mb_strtolower($_POST['municipio']),
                        'clave' => $_POST['clave'],
                        'repiteClave' => $_POST['confirmarClave']
                ];
                
                // echo "<pre>";
                // print_r($RecibeDatos);
                // echo "</pre>";
                // exit;
            }
            else{      
                // echo "Debe Llenar todos los campos vacios". "<br>";
                // echo "<a href='javascript:history.back()'>Regresar</a>";
                exit();
            }
            
            // /SE inserta el suscriptor nuevo y se recupera su ID_Suscriptor
            $ID_Suscriptor = $this->ConsultaLogin_M->InsertarSuscriptor($RecibeDatos);

            $options = ['memory_cost' => 1<<10, 'time_cost' => 4, 'threads' => 2];
            //se cifra la contraseña del afiliado con un algoritmo de encriptación
            $ClaveCifrada = password_hash($RecibeDatos["clave"], PASSWORD_DEFAULT, $options);
                            
            $this->ConsultaLogin_M->InsertarClave($ID_Suscriptor, $ClaveCifrada);

            //Se envia al correo pcabeza7@gmail.com la notificación de nuevo cliente registrado
            // $email_subject = ''; 
            // $email_to = 'pcabeza7@gmail.com'; 
            // $headers = 'From: noticieroyaracuy<master@noticieroyaracuy.com>';
            // $email_message = 'Suscripcion satisfactoria' . ' ' . $RecibeDatos['Nombre'];

            // mail($email_to, $email_subject, $email_message, $headers); 

            //Se crea la sesion exigida en las páginas de una cuenta de suscriptores           
            $_SESSION["ID_Suscriptor"] = $ID_Suscriptor;

            $ID_Noticia = $RecibeDatos['id_noticia']; 
            header('Location:'. RUTA_URL . '/Noticias_C/detalleNoticia/' . $ID_Noticia  .   ',sinAnuncio,#ContedorComentario'); 
        }

        public function accesoSuscriptor(){
            if($_SESSION["ID_Suscriptor"]){
                //Se consultan datos del suscriptor
                $Suscriptor = $this->ConsultaLogin_M->DatosSuscriptor($_SESSION["ID_Suscriptor"]);
              
                $Datos = [
                    'nombre' => $Suscriptor[0]['nombreSuscriptor'],
                    'apellido' => $Suscriptor[0]['apellidoSuscriptor']
                ];

                // echo "<pre>";
                // print_r($Datos);
                // echo "</pre>";
                // exit;

                $this->vista("header/header_suscriptor");
                $this->vista("suscriptores/suscrip_Inicio_V", $Datos);
            }
        }
    }