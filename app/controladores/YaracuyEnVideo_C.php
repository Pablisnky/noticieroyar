<?php
    class YaracuyEnVideo_C extends Controlador{
        private $ConsultaYaracuyEnVideo_M;

        public function __construct(){
            $this->ConsultaYaracuyEnVideo_M = $this->modelo("YaracuyEnVideo_M");

            //La función ocultarErrores() se encuantra en la carpeta helpers, es accecible debido a que en iniciador.php se realizó el require respectivo
            ocultarErrores();
        }
        
        public function index(){              
            //consulta los videos cargados en la seccion YaracuyEnVideo
			$VideosYaracuy = $this->ConsultaYaracuyEnVideo_M->consultarVideosYaracuy();

            $Datos = [
                'yaracuyVideo' => $VideosYaracuy 
            ];

			// echo '<pre>';
			// print_r($Datos);
			// echo '</pre>';
			// exit;

            $this->vista("header/header_yaracuyEnVideo", $Datos); 
            $this->vista("view/yaracuyEnVideos_V", $Datos);   
        }

        public function recorridoVideos($DatosAgrupados){
            //$DatosAgrupados contiene una cadena con el ID_Video y el tipo de recorrido separados por coma, se convierte en array para separar los elementos

            $DatosAgrupados = explode(",", $DatosAgrupados);
            
            $ID_Video = $DatosAgrupados[0];
            $Recorrido = $DatosAgrupados[1];

            // echo $ID_Video . '<br>';
            // echo $Recorrido . '<br>';
            // exit;

            if($Recorrido == 'Retroceder'){
                // Se consulta el nombre de la imagen anterior que se va amostrar en detalle
                $VideoYaracuy = $this->ConsultaYaracuyEnVideo_M->consultarVideoAnterior($ID_Video);
            }
            else if($Recorrido == 'Avanzar'){
                // Se consulta el nombre de la imagen posterior que se va amostrar en detalle
                $VideoYaracuy = $this->ConsultaYaracuyEnVideo_M->consultarVideoPosterior($ID_Video);
            }
            
            $Datos = [
                'yaracuyVideo' => $VideoYaracuy
            ];				
                
            // echo '<pre>';
            // print_r($Datos);
            // echo '</pre>';
            // exit;

            //Si la imagen llegua al extremo izquierdo o derecho, en este caso arrojará un array vacio
            if($VideoYaracuy != Array()){
                // El metodo vista() se encuentra en el archivo app/clases/Controlador.php
                $this->vista('view/ajax/A_yaracuyEnVideo_V', $Datos);		
            }
            else{ //Cuando el slider llega a un extremo
                //Se consulta cual es el ultimo ID_Video de la tabla "obra" de un artista especifico
                $UltimoID_Video = $this->ConsultaYaracuyEnVideo_M->consultarUltimoID_Video();

                //Se consulta cual es el primer ID_Video de la tabla "obra" de un artista especifico
                $PrimerID_Video = $this->ConsultaYaracuyEnVideo_M->consultarprimerID_Video();
                            
                $Datos = [
                    'yaracuyVideo' =>  $ID_Video, 
                    'primerID_Video' =>  $PrimerID_Video, 
                    'ultimoID_Video' => $UltimoID_Video
                ];

                // echo '<pre style="color:white">';
                // print_r($Datos);
                // echo '<pre>';
                // exit;

                //Si llega al extremo de lado derecho
                if($Datos['ultimoID_Video']['ID_YaracuyEnVideo'] == $Datos['yaracuyVideo']){
                    
                    $Datos = [
                        'yaracuyVideo' => $PrimerID_Video
                    ];
                    // echo '<p style="color:yellow">Entra en el IF</p>';
                    // echo '<pre style="color:white">';
                    // print_r($Datos);
                    // echo '<pre>';
                    // exit;
                    
                    // El metodo vista() se encuentra en el archivo app/clases/Controlador.php
                    $this->vista('view/ajax/A_yaracuyEnVideo_V', $Datos);
                }
                //Si llega al extremo de lado izquierdo
                else if($Datos['primerID_Video']['ID_YaracuyEnVideo'] == $Datos['yaracuyVideo']){
                    
                    $Datos = [
                        'yaracuyVideo' => $UltimoID_Video
                    ];
                    // echo '<p style="color:yellow">Entra en el ELSE IF</p>';
                    // echo '<pre style="color:yellow">';
                    // print_r($Datos);
                    // echo '<pre>';
                    // exit;
                    
                    // El metodo vista() se encuentra en el archivo app/clases/Controlador.php
                    $this->vista('view/ajax/A_yaracuyEnVideo_V', $Datos);
                }
            }
        }

        public function redesSociales($ID_Video){
            //consulta un video especifico de la seccion YaracuyEnVideo
			$VideosYaracuy = $this->ConsultaYaracuyEnVideo_M->consultaVideoYaracuy($ID_Video);

            $Datos = [
                'yaracuyVideo' => $VideosYaracuy 
            ];
            
            // echo '<pre>';
            // print_r($Datos);
            // echo '<pre>';
            // exit;

            $this->vista("header/header_yaracuyEnVideo", $Datos);
            $this->vista('view/yaracuyEnVideos_V', $Datos);
        }
    }