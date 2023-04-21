<?php
    class Menu_C extends Controlador{
        public $PrecioDolar;

        public function __construct(){
            // $this->ConsultaMenu_M = $this->modelo("Menu_M");
            //Solicita el precio del dolar SEGUN TASA bcv a la clase Divisas_C 
            // require(RUTA_APP . '/controladores/Divisas_C.php');
            // $PrecioDolar = new Divisas_C();
            
            // $this->PrecioDolar = $PrecioDolar->index();

            // echo 'Perfecto, tasa de dolar actualizada' . '<br>';
            // echo "<a href='javascript: history.go(-1)'>Regresar</a>";

            ocultarErrores();
        }
        
        public function index(){ 
            // require(RUTA_APP . "/controladores/complementos/CambioDolar_C.php");
            // $this->ActualizarPrecio = new CambioDolar_C();
            // $this->ActualizarPrecio->AjusteCambioMonetario($this->Dolar, $this->Reserve);
            
        }

        public function afiliacion(){
            // PRECIO EN DOLARES DE LA PUBLICIDAD
            $Anuncios_7_Dol = 5;
            $Anuncios_15_Dol = 8;
            $Anuncios_30_Dol = 10;

            $Anuncios_7_Bs = $this->PrecioDolar * $Anuncios_7_Dol;
            $Anuncios_15_Bs = $this->PrecioDolar * $Anuncios_15_Dol;
            $Anuncios_30_Bs = $this->PrecioDolar * $Anuncios_30_Dol;

            $Anuncios_7_Bs = number_format($Anuncios_7_Bs, 0, '', '.');
            $Anuncios_15_Bs = number_format($Anuncios_15_Bs, 0, '', '.');
            $Anuncios_30_Bs = number_format($Anuncios_30_Bs, 0, '', '.');

            $Datos = [
                'anuncio_7_Bs' => $Anuncios_7_Bs,
                'anuncio_15_Bs' => $Anuncios_15_Bs,
                'anuncio_30_Bs' => $Anuncios_30_Bs,
                'anuncio_7_Dol' => $Anuncios_7_Dol,
                'anuncio_15_Dol' => $Anuncios_15_Dol,
                'anuncio_30_Dol' => $Anuncios_30_Dol,
            ];
            
            // echo "<pre>";
            // print_r($Datos);
            // echo "</pre>";          
            // exit();

            $this->vista('header/header_noticia');
            $this->vista('view/afiliacion_V', $Datos);
        }

        public function PWA(){
            $this->vista("header/header_Modal");
            $this->vista("view/pwa_V");
        }
        
        public function nuestroADN(){
            $this->vista("header/header");
            $this->vista("view/quienesSomos_V");
        }
                
        public function recibeContactenos(){         
            // Se reciben todos los campos del formulario, desde  
            // if($_SERVER["REQUEST_METHOD"] == "POST" && !empty($_POST["nombreUsuario"]) && !empty($_POST["telefonoUsuario"]) && !empty($_POST["correoUsuario"]) && !empty($_POST["asunto"])){
            //     //si son enviados por POST y sino estan vacios, entra aqui
            //     $RecibeDatos = [
            //         // DATOS DEL USUARIO
            //         'Nombre' => filter_input(INPUT_POST, "nombreUsuario", FILTER_SANITIZE_STRING),
            //         'Telefono' => filter_input(INPUT_POST, "telefonoUsuario", FILTER_SANITIZE_NUMBER_INT),
            //         'Correo' => $_POST['correoUsuario'],
            //         'Asunto' => filter_input(INPUT_POST, "asunto", FILTER_SANITIZE_STRING)
            //     ];
            // }

            // echo "<pre>";
            // print_r($RecibeDatos);
            // echo "</pre>";
            // exit();
            
            // // ****************************************

            //Se envia al correo pcabeza7@gmail.com el mensaje que el usaurio a dejado
            // $email_subject = 'Mensaje desde contactenos'; 
            // $email_to = 'pcabeza7@gmail.com';  
            // $headers = 'From: PedidoRemoto'.'<'.$RecibeDatos['Correo'].'>';
            // $email_message = $RecibeDatos['Asunto'];

            // mail($email_to, $email_subject, $email_message, $headers); 

            // ****************************************

            // $this->vista("header/header");
            // $this->vista("view/quienesSomos_V");
        }
        
        public function descargaApp(){
            $this->vista('header/header');
            $this->vista('view/descargaApp_V');
        }

        public function categorias(){ 
            header('Location: ../Categoria_C');
        }
    }
?>