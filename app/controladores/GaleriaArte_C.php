<?php    
    class GaleriaArte_C extends Controlador{
        private $ConsultaGaleriaArte_M;
        
        public function __construct(){           
            $this->ConsultaGaleriaArte_M = $this->modelo("GaleriaArte_M");
        }

        // Muestra todos los artistas con obras publicadas
        public function index(){            
            //Se CONSULTA los artistas en BD
            $Artistas = $this->ConsultaGaleriaArte_M->ConsultarArtistas();
            
            $Datos = [
                'datosArtistas' => $Artistas,
            ];

            // echo '<pre>';
            // print_r($Datos);
            // echo '</pre>';
            // exit;
            
            $this->vista("header/header_noticia");
            $this->vista("view/galeriaArte_V", $Datos);
        }

        public function artistas($ID_Suscriptor){
            //Se CONSULTA un artista especifico
            $Artistas = $this->ConsultaGaleriaArte_M->ConsultarArtista($ID_Suscriptor);

            //Se CONSULTA las obras de un artista especifico
            $ObraArtista = $this->ConsultaGaleriaArte_M->ConsultarObraArtista($ID_Suscriptor);
            
            $Datos = [
                'datosArtistas' => $Artistas, 
                'obraArtista' => $ObraArtista 
            ];
            
            // echo '<pre>';
            // print_r($Datos);
            // echo '</pre>';
            // exit;
            
            $this->vista("header/header_Artista", $Datos);
            $this->vista("view/artistas_V", $Datos);
        }        

        public function detalleObra($ID_Obra){
            
            //CONSULTA los detalles de la obra seleccionada
            $Detalle_Obra = $this->ConsultaGaleriaArte_M->consultarObra($ID_Obra);
            
            $Datos = [
                'detalleObra' => $Detalle_Obra
            ];

            // echo '<pre>';
            // print_r($Datos);
            // echo '</pre>';
            // exit;

            $this->vista("header/header_Obra", $Datos);
            $this->vista("view/detalleObra_V", $Datos);
        }
        
        //recorre obra a obra en un slider segun el artista seleccionado
        public function diapositivaObra($ID_Obra, $ID_Suscriptor, $Recorrido){
            if($Recorrido == 'Retroceder'){
                // Se consulta el nombre de la imagen anterior que se va amostrar en detalle
                $DiapositivaObra = $this->ConsultaGaleriaArte_M->consultarObraAnterior($ID_Obra, $ID_Suscriptor);
            }
            else if($Recorrido == 'Avanzar'){
                // Se consulta el nombre de la imagen posterior que se va amostrar en detalle
                $DiapositivaObra = $this->ConsultaGaleriaArte_M->consultarObraPosterior($ID_Obra, $ID_Suscriptor);
            }
            
            //Se CONSULTA un artista especifico
            $Artistas = $this->ConsultaGaleriaArte_M->ConsultarArtista($ID_Suscriptor);

            $Datos = [
                'diapositivaObra' => $DiapositivaObra,
                'artista' => $Artistas
            ];				
                
            // echo '<pre>';
            // print_r($Datos);
            // echo '</pre>';
            // exit;

            //Si la imagen llegua al extremo izquierdo o derecho, en este caso arrojará un array vacio
            if($DiapositivaObra != Array()){
                // El metodo vista() se encuentra en el archivo app/clases/Controlador.php
                $this->vista('view/ajax/A_detalleObra_V', $Datos);		
            }
            else{ //Cuando el slider llega a un extremo
     
                //Se consulta cual es el ultimo ID_Obra de la tabla "obra" de un artista especifico
                $UltimoID_Obra = $this->ConsultaGaleriaArte_M->consultarUltimoID_Obra($ID_Suscriptor);

                //Se consulta cual es el primer ID_Obra de la tabla "obra" de un artista especifico
                $PrimerID_Obra = $this->ConsultaGaleriaArte_M->consultarprimerID_Obra($ID_Suscriptor);

                // Se consulta el nombre de la imagen que se va amostrar en detalle
                $DiapositivaObra = $this->ConsultaGaleriaArte_M->consultarObra($ID_Obra);
                            
                $Datos = [
                    'diapositivaObra' => $DiapositivaObra, 
                    'primerID_Obra' =>  $PrimerID_Obra, 
                    'ultimoID_Obra' => $UltimoID_Obra
                ];

                // echo '<pre style="color:white">';
                // print_r($Datos);
                // echo '<pre>';
                // exit;

                //Si llega al extremo de lado derecho
                if($UltimoID_Obra['ID_Obra'] == $Datos['diapositivaObra']['ID_Obra']){
                    //Se reconstruye el array $Datos para cambiar el ID_Obra que se debe enviar
                    $DiapositivaObra['ID_Obra'] = $PrimerID_Obra['ID_Obra'];

                    $Datos = [
                        'diapositivaObra' => $PrimerID_Obra,
                        'primerID_Obra' => $PrimerID_Obra, 	
                        'artista' => $Artistas,
                    ];
        
                
                    // echo '<pre style="color:white">';
                    // print_r($Datos);
                    // echo '<pre>';
                    // exit;
                    
                    // El metodo vista() se encuentra en el archivo app/clases/Controlador.php
                    $this->vista('view/ajax/A_detalleObra_V', $Datos);
                }
                //Si llega al extremo de lado izquierdo
                else if($PrimerID_Obra['ID_Obra'] == $Datos['diapositivaObra']['ID_Obra']){
                    
                    $Datos = [
                        'diapositivaObra' => $UltimoID_Obra,
                        'ultimoID_Obra' => $UltimoID_Obra, 		
                        'artista' => $Artistas		
                    ];
                            
                    // echo '<pre style="color:yellow">';
                    // print_r($Datos);
                    // echo '<pre>';
                    // exit;
                    
                    // El metodo vista() se encuentra en el archivo app/clases/Controlador.php
                    $this->vista('view/ajax/A_detalleObra_V', $Datos);
                }
            }
        }       
    }