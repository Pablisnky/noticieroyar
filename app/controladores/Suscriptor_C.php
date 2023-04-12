<?php
    class Suscriptor_C extends Controlador{
        private $ConsultaSuscriptor_M;
        private $ID_Suscriptor;
        private $Suscriptor;

        public function __construct(){
            session_start();
            
            // $this->ID_Suscriptor = $_SESSION["ID_Suscriptor"];

            $this->ConsultaSuscriptor_M = $this->modelo("Suscriptor_M");
            
            // require(RUTA_APP . "/controladores/Clasificados_C.php");
            // $DatosComerciante = new Clasificados_C();

            //La función ocultarErrores() se encuantra en la carpeta helpers, es accecible debido a que en iniciador.php se realizó el require respectivo
            ocultarErrores();
        }
    
        //CONSULTA los datos de un suscriptor especifico
        public function index($ID_Suscriptor){          

            $this->Suscriptor = $this->ConsultaSuscriptor_M->consultarSuscriptor($ID_Suscriptor);

            // echo "<pre>";
            // print_r($Suscriptor);
            // echo "</pre>";
            // exit();

            return $this->Suscriptor;
        } 
        
        public function perfil_dashboard($ID_Suscriptor){       
            
            $this->Suscriptor = $this->ConsultaSuscriptor_M->consultarSuscriptor($ID_Suscriptor);
           
            $Datos = [       
                'suscriptor' => $this->Suscriptor,                     
                'ID_Suscriptor' => $this->Suscriptor['ID_Suscriptor'],
                'nombre' => $this->Suscriptor['nombreSuscriptor'],
                'apellido' => $this->Suscriptor['apellidoSuscriptor'],
                'Pseudonimmo' => $this->Suscriptor['pseudonimoSuscripto'],
                'telefono' => $this->Suscriptor['telefonoSuscriptor'],
            ];

			// echo '<pre>';
			// print_r($Datos);
			// echo '</pre>';
			// exit;   
            
            $this->vista("header/header_suscriptor");
            $this->vista("suscriptores/suscrip_perfil_V", $Datos);
        } 
        
        //carga la vista panel_suscriptor porque el usuario ya inicio sesion, se llega aqui por medio de la carita del header
        public function accesoSuscriptor($ID_Suscriptor){
            //Se consultan datos del suscriptor
            $Suscriptor = $this->ConsultaSuscriptor_M->consultarSuscriptor($ID_Suscriptor);
            
            //Se CONSULTA al controlador Clasificado_C la cantidad de nuncios clasificados que tiene el suscriptor.
            require(RUTA_APP . "/controladores/Clasificados_C.php");
            $DatosComerciante = new Clasificados_C();
            $Comerciante = $DatosComerciante->clasificadoSuscriptor($ID_Suscriptor);

            $Datos = [
                'ID_Suscriptor' => $Suscriptor['ID_Suscriptor'],
                'nombre' => $Suscriptor['nombreSuscriptor'],
                'apellido' => $Suscriptor['apellidoSuscriptor'],
                'Pseudonimmo' => $Suscriptor['pseudonimoSuscripto'],
                'telefono' => $Suscriptor['telefonoSuscriptor'],
                'clasificados' => $Comerciante
            ];

            // echo "<pre>";
            // print_r($Datos);
            // echo "</pre>";
            // exit;

            $this->vista("header/header_suscriptor");
            $this->vista("suscriptores/suscrip_Inicio_V", $Datos);
        }

        public function suscriptores(){          

            //CONSULTA los datos de un suscriptor especifico
            $Suscriptor = $this->ConsultaSuscriptor_M->consultarTodosSuscriptor();

            // echo "<pre>";
            // print_r($Suscriptor);
            // echo "</pre>";
            // exit();

            return $Suscriptor;
        } 

        public function InsertarNombreComercial($RecibNombreComercial){
            
            $this->ConsultaSuscriptor_M->insertarNombreComercial($RecibNombreComercial);
        }
                
        //recibe el nombre comercial, telefono y formas de pago de un suscriptor que va a publicar un clasificado
        public function actualizaNombreComercial(){
            //Se reciben el campo del formulario, se verifica que son enviados por POST y que no estan vacios
            if($_SERVER['REQUEST_METHOD'] == 'POST' && !empty($_POST['nombreSuscriptor']) && !empty($_POST['apellidoSuscriptor']) && !empty($_POST['correoSuscriptor']) && !empty($_POST['municipio']) && !empty($_POST['parroquia']) && !empty($_POST['telefono']) && !empty($_POST['pseudonimo']) && (!empty($_POST['transferencia']) || !empty($_POST['pago_movil']) || !empty($_POST['paypal']) || !empty($_POST['zelle']) || !empty($_POST['bolivar']) || !empty($_POST['dolar']) || !empty($_POST['acordado']))){
                $RecibeDatosSuscriptor = [
                    'ID_Suscriptor' => $_SESSION["ID_Suscriptor"], 
                    'nombreSuscriptor' =>  $_POST["nombreSuscriptor"],
                    'apellidoSuscriptor' =>  $_POST['apellidoSuscriptor'],
                    'correoSuscriptor' =>  $_POST['correoSuscriptor'],
                    'pseudonimo' =>  $_POST['pseudonimo'],
                    'municipio' =>  $_POST["municipio"],
                    'parroquia' =>  $_POST["parroquia"],
                    'telefono' =>  $_POST["telefono"],
                    'transferencia' =>  empty($_POST["transferencia"]) ? 0 : 1,
                    'pago_movil' =>  empty($_POST["pago_movil"]) ? 0 : 1,
                    'paypal' =>  empty($_POST["paypal"]) ? 0 : 1,
                    'zelle' =>  empty($_POST["zelle"]) ? 0 : 1,
                    'criptomoneda' =>  empty($_POST["criptomoneda"]) ? 0 : 1,
                    'efectivo_Bs' =>  empty($_POST["bolivar"]) ? 0 : 1,
                    'efectivo_dol' =>  empty($_POST["dolar"]) ? 0 : 1,
                    'acordado' =>  empty($_POST["acordado"]) ? 0 : 1,
                ];
                
                // echo '<pre>';
                // print_r($RecibeDatosSuscriptor);
                // echo '</pre>';
                // exit;
                
                //Se actualizan datos del suscriptor
                $this->ConsultaSuscriptor_M->actualizarDatosSuscriptor($RecibeDatosSuscriptor);
                
                //IMAGEN CATALOGO
                // Si se selecionó alguna nueva imagen
                if($_FILES['imagenCatalogo']["name"] != ''){
                    $nombre_imgCatalogo = $_FILES['imagenCatalogo']['name'];
                    $tipo_imgCatalogo = $_FILES['imagenCatalogo']['type'];
                    $tamanio_imgCatalogo = $_FILES['imagenCatalogo']['size'];
                    $Temporal_imgCatalogo = $_FILES['imagenCatalogo']['tmp_name'];

                    // echo "Nombre de la imagen = " . $nombre_imgCatalogo . "<br>";
                    // echo "Tipo de archivo = " . $tipo_imgCatalogo .  "<br>";
                    // echo "Tamaño = " . $tamanio_imgCatalogo . "<br>";
                    //se muestra el directorio temporal donde se guarda el archivo
                    // echo $Temporal_imgCatalogo;
                    // exit;
                        
                    //Quitar de la cadena del nombre de la imagen todo lo que no sean números, letras o puntos
                    $nombre_imgCatalogo = preg_replace('([^A-Za-z0-9.])', '', $nombre_imgCatalogo);

                    // Se coloca nuumero randon al principio del nombrde de la imagen para evitar que existan imagenes duplicadas
                    $nombre_imgCatalogo = mt_rand() . '_' . $nombre_imgCatalogo;

                    // ACTUALIZA IMAGEN PRINCIPAL DE NOTICIA EN SERVIDOR
                    // se comprime y se inserta el archivo en el directorio de servidor 
                    $Bandera = 'imagenCatalogo';
                    require(RUTA_APP . '/helpers/Comprimir_Imagen.php');
                    $Comprimir = new Comprimir_Imagen();

                    $Comprimir->index($Bandera, $nombre_imgCatalogo, $tipo_imgCatalogo, $tamanio_imgCatalogo, $Temporal_imgCatalogo);

                    //Se actualiza imagen de catalogo 
                    $this->ConsultaSuscriptor_M->actualizarImagenCatalogo($RecibeDatosSuscriptor, $nombre_imgCatalogo, $tipo_imgCatalogo, $tamanio_imgCatalogo);
                }

                //Se insertan los datos del suscriptor em BD
                // $this->InformacionSuscriptor->actualizarNombreComercial($RecibNombreComercial);
            }
            else{
                echo 'Llene todos los campos obligatorios' . '<br>';
                echo '<a href="javascript: history.go(-1)">Regresar</a>';
                exit();
            }
            
            $this->perfil_dashboard($_SESSION["ID_Suscriptor"]);
        }

        public function consultarFormasPago($ID_Suscriptor){            
            //Se consultan datos del suscriptor
            $MetodoPago = $this->ConsultaSuscriptor_M->consultarMetodoPago($ID_Suscriptor);
            
            // echo "<pre>";
            // print_r($MetodoPago);
            // echo "</pre>";
            // exit();

            return $MetodoPago;
        }
    }