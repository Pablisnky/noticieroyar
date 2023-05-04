<?php
// declare(strict_types = 1);
    class Login_C extends Controlador{
        private $ConsultaLogin_M;
        
        public function __construct(){  
            session_start();

            $this->ConsultaLogin_M = $this->modelo("Login_M");

            //La función ocultarErrores() se encuantra en la carpeta helpers, es accecible debido a que en iniciador.php se realizó el require respectivo
            ocultarErrores();
        }

        //Recibe dos parametros (ID_Noticia y un string bandera de donde viene) en una cadena separados por coma
        public function index($DatosAgrupados){
            // $DatosAgrupados se convierte en array para separar los elementos
            $DatosAgrupados = explode(',', $DatosAgrupados);
            $ID_Noticia = $DatosAgrupados[0];
            $Bandera = $DatosAgrupados[1];

            $ID_Comentario = !empty($DatosAgrupados[2]) ? $DatosAgrupados[2]: 'SinID_Comentario';
            
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

                if(!empty($CorreoRecord_Com)){
                    $Correo = $CorreoRecord_Com[0]['correo_AfiCom'];
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
                    'id_noticia' => 'SinID_Denuncia',
                    'id_comentario' => 'SinID_Comentario',
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
            else{//cuando viene de iniciar sesion en menu hamburguesa
                //carga la vista login_V en formulario login

                $Datos=[
                    'id_noticia' => 'SinID_Denuncia',
                    'id_comentario' => 'SinID_Comentario',
                    'bandera' => 'SinBandera'
                ];

                // echo "<pre>";
                // print_r($Datos);
                // echo "</pre>";          
                // exit();

                $this->vista("header/header_noticia");
                $this->vista("view/login_V", $Datos);
            }
        }

        //Invocado desde login_V, verfica información de ingreso enviada por el usuario e inicia sesion
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
 
            //Se crean las cookies para recordar al usuario en caso de que $Recordar exista
            // if($Recordar == 1){ //si pidió memorizar el usuario, se recibe desde principal.php           
                // Se introduce una cookie en el ordenador del usuario con el identificador del usuario y la cookie aleatoria porque el usuario marca la casilla de recordar
            //     setcookie('id_usuario', $ID_Suscriptor, time()+365*24*60*60, '/');
            //     setcookie('clave', $Clave, time()+365*24*60*60, '/');
            // }
                // Se destruyen las cookie para dejar de recordar a usuario
            // if($No_Recordar == 1){ 
            //     setcookie('id_usuario','',time() - 3600,'/');
            //     setcookie('clave','',time() - 3600,'/');
            // }

            //Se CONSULTA si el correo existe como suscritor
            $Suscriptor = $this->ConsultaLogin_M->consultarSuscriptores($Correo);
            
            // echo "<pre>";
            // print_r($Suscriptor);
            // echo "</pre>";
            
            if($Suscriptor != Array()){// Existe como suscriptor 
                $ID_Suscriptor = $Suscriptor[0]['ID_Suscriptor'];
                $CorreoBD = $Suscriptor[0]['correoSuscriptor'];
                $Nombre = $Suscriptor[0]['nombreSuscriptor'];
                $Apellido = $Suscriptor[0]['apellidoSuscriptor'];

                $_SESSION["nombreSuscriptor"] = $Nombre;
                $_SESSION["apellidoSuscriptor"] = $Apellido;

                //Se CONSULTA la contraseña enviada, que sea igual a la contraseña de la BD
                $Hash = $this->ConsultaLogin_M->consultarContrasena($ID_Suscriptor);
                
                // echo '<pre>';
                // print_r($Hash);
                // echo '</pre>';
                // exit;

                // LOGEADO Y REDIRECIONAMIENTO
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
                    else if($Bandera == 'SinBandera'){// entra al panel de suscriptor
                        
                        //Se CONSULTA al controlador Panel_Clasificados_C la cantidad de anuncios clasificados que tiene el suscriptor.
                        require_once(RUTA_APP . "/controladores/Panel_Clasificados_C.php");
                        $DatosComerciante = new Panel_Clasificados_C();
                        $Comerciante = $DatosComerciante->clasificadoSuscriptor($ID_Suscriptor);
                        
                        //Se CONSULTA al controlador Panel_Artista_C la cantidad de obras que tiene el suscriptor.
                        require_once(RUTA_APP . "/controladores/Panel_Artista_C.php");
                        $Obras = new Panel_Artista_C();
                        $Cant_Obras = $Obras->cantidadObras($ID_Suscriptor);
                        
                        $Datos = [                
                            'ID_Suscriptor' => $ID_Suscriptor,            
                            'nombre' => $Nombre,
                            'apellido' => $Apellido,
                            'clasificados' => $Comerciante,
                            'obras' => $Cant_Obras
                        ];

                        // echo '<pre>';
                        // print_r($Datos);
                        // echo '</pre>';
                        // exit;
                    
                        $this->vista("header/header_suscriptor");
                        $this->vista("suscriptores/suscrip_Inicio_V", $Datos);
                    }
                }
                else{ //en caso de clave o usuario incorrecto                    
                    $Datos = [                 
                        'id_noticia' => $ID_Noticia,           
                        'bandera' => $Bandera
                    ];

                    // echo '<pre>';
                    // print_r($Datos);
                    // echo '</pre>';
                    // exit;

                    $this->vista("header/header_noticia");
                    $this->vista("modal/modal_falloLogin_V", $Datos);
                }    
            }
            else{  //en caso de clave o usuario incorrecto                    
                $Datos = [                 
                    'id_noticia' => 'SInID_Noticia',           
                    'bandera' => $Bandera
                ];

                // echo '<pre>';
                // print_r($Datos);
                // echo '</pre>';
                // exit;

                $this->vista("header/header_noticia");
                $this->vista("modal/modal_falloLogin_V", $Datos);                
            }
        }
        
        public function RecuperarClave(){
            $Correo = $_POST['correo'];
            // echo 'Correo= ' . $Correo . '<br>';
        
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
                //  echo $email_to . '<br>';
                //  echo $email_subject . '<br>';
                //  echo $email_message . '<br>';
                //  echo $headers . '<br>'; 
            mail($email_to, $email_subject, $email_message, $headers);
                
            // try{    
            //     if(mail($email_to, $email_subject, $email_message, $headers)){
            //       throw new Exception("Configuration file not found.");
            //       echo 'Correo enviado' . '<br>';
            //     }
                
            // } 
            // catch (Exception $e) {                
            //     echo $e->getMessage();  
            //     echo "Error en el envío" . '<br>';              
            //     die();                
            // }
                
            // if (mail($email_to, $email_subject, $email_message, $headers)){
            //      echo 'Correo enviado' . '<br>';
            // }
            // else{
            //     echo "Error en el envío" . '<br>';
            // }
            
            $Datos = [
                'correo' => $Correo,
                'bandera' => 'aleatorioinsertado'
            ];

            // echo '<pre>';
            // print_r($Datos);
            // echo '</pre>';
            // exit;

            $this->vista('header/header_SinMembrete'); 
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
           
            if($VerificaCodigo == Array() ){//Si el codigo que envia el usuario es diferente al del sistema             
                
                $Datos = [
                    'correo' => $Correo,
                    'bandera' => 'nuevoIntento'
                ];

                $this->vista("header/header_SinMembrete"); 
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

                $this->vista("header/header_SinMembrete", $Datos); 
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
                    
                    $this->vista('header/header_SinMembrete'); 
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
        
        //Invocado desde login_V.php
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

        //Recibe los datos de un usurio que a llenado el formulario de suscripcion
        public function recibeRegistroSuscriptor(){         
            //Se reciben todos los campos del formulario de suscripcion, se verifica que son enviados por POST y que no estan vacios
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
                    'parroquia' => mb_strtolower($_POST['parroquia']),
                    'clave' => $_POST['clave'],
                    'repiteClave' => $_POST['confirmarClave']
                ];
                
                // echo "<pre>";
                // print_r($RecibeDatos);
                // echo "</pre>";
                // exit;
            }
            else{      
                echo "Debe Llenar todos los campos vacios". "<br>";
                echo "<a href='javascript:history.back()'>Regresar</a>";
                exit();
            }
            
            // Se inserta el suscriptor nuevo y se recupera su ID_Suscriptor
            $ID_Suscriptor = $this->ConsultaLogin_M->InsertarSuscriptor($RecibeDatos);

            //se cifra la contraseña del afiliado con un algoritmo de encriptación
            $options = ['memory_cost' => 1<<10, 'time_cost' => 4, 'threads' => 2];
            $ClaveCifrada = password_hash($RecibeDatos["clave"], PASSWORD_DEFAULT, $options);
                            
            $this->ConsultaLogin_M->InsertarClave($ID_Suscriptor, $ClaveCifrada);
            
            //Se consulta el correo a donde llegara la notificación de nueva denuncia
            $CorreoAdmin = $this->ConsultaLogin_M->ConsultaCorreoAdministrador();       
            // echo $CorreoAdmin['correoAdmin'];
            // exit();

            //Se envia al correo  la notificación de nuevo cliente registrado
            $email_subject = 'Suscripción de nuevo usuario'; 
            $email_to = $CorreoAdmin['correoAdmin']; 
            $headers = 'From: NoticieroYaracuy<administrador@noticieroyaracuy.com>';
            $email_message = $RecibeDatos['nombre'] . ' ' . $RecibeDatos['apellido'] . ' se ha registrado en la plataforma';

            mail($email_to, $email_subject, $email_message, $headers); 

            // echo "<pre>";
            // print_r($Datos);
            // echo "</pre>";          
            // exit();

            $this->vista("header/header_noticia");
            $this->vista("modal/modal_bienvenida_V");
        }
    }